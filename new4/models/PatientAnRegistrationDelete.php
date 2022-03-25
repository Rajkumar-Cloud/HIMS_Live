<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PatientAnRegistrationDelete extends PatientAnRegistration
{
    use MessagesTrait;

    // Page ID
    public $PageID = "delete";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'patient_an_registration';

    // Page object name
    public $PageObjName = "PatientAnRegistrationDelete";

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

        // Table object (patient_an_registration)
        if (!isset($GLOBALS["patient_an_registration"]) || get_class($GLOBALS["patient_an_registration"]) == PROJECT_NAMESPACE . "patient_an_registration") {
            $GLOBALS["patient_an_registration"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_an_registration');
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
                $doc = new $class(Container("patient_an_registration"));
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
        $this->pid->setVisibility();
        $this->fid->setVisibility();
        $this->G->setVisibility();
        $this->P->setVisibility();
        $this->L->setVisibility();
        $this->A->setVisibility();
        $this->E->setVisibility();
        $this->M->setVisibility();
        $this->LMP->setVisibility();
        $this->EDO->setVisibility();
        $this->MenstrualHistory->setVisibility();
        $this->MaritalHistory->setVisibility();
        $this->ObstetricHistory->setVisibility();
        $this->PreviousHistoryofGDM->setVisibility();
        $this->PreviousHistorofPIH->setVisibility();
        $this->PreviousHistoryofIUGR->setVisibility();
        $this->PreviousHistoryofOligohydramnios->setVisibility();
        $this->PreviousHistoryofPreterm->setVisibility();
        $this->G1->setVisibility();
        $this->G2->setVisibility();
        $this->G3->setVisibility();
        $this->DeliveryNDLSCS1->setVisibility();
        $this->DeliveryNDLSCS2->setVisibility();
        $this->DeliveryNDLSCS3->setVisibility();
        $this->BabySexweight1->setVisibility();
        $this->BabySexweight2->setVisibility();
        $this->BabySexweight3->setVisibility();
        $this->PastMedicalHistory->setVisibility();
        $this->PastSurgicalHistory->setVisibility();
        $this->FamilyHistory->setVisibility();
        $this->Viability->setVisibility();
        $this->ViabilityDATE->setVisibility();
        $this->ViabilityREPORT->setVisibility();
        $this->Viability2->setVisibility();
        $this->Viability2DATE->setVisibility();
        $this->Viability2REPORT->setVisibility();
        $this->NTscan->setVisibility();
        $this->NTscanDATE->setVisibility();
        $this->NTscanREPORT->setVisibility();
        $this->EarlyTarget->setVisibility();
        $this->EarlyTargetDATE->setVisibility();
        $this->EarlyTargetREPORT->setVisibility();
        $this->Anomaly->setVisibility();
        $this->AnomalyDATE->setVisibility();
        $this->AnomalyREPORT->setVisibility();
        $this->Growth->setVisibility();
        $this->GrowthDATE->setVisibility();
        $this->GrowthREPORT->setVisibility();
        $this->Growth1->setVisibility();
        $this->Growth1DATE->setVisibility();
        $this->Growth1REPORT->setVisibility();
        $this->ANProfile->setVisibility();
        $this->ANProfileDATE->setVisibility();
        $this->ANProfileINHOUSE->setVisibility();
        $this->ANProfileREPORT->setVisibility();
        $this->DualMarker->setVisibility();
        $this->DualMarkerDATE->setVisibility();
        $this->DualMarkerINHOUSE->setVisibility();
        $this->DualMarkerREPORT->setVisibility();
        $this->Quadruple->setVisibility();
        $this->QuadrupleDATE->setVisibility();
        $this->QuadrupleINHOUSE->setVisibility();
        $this->QuadrupleREPORT->setVisibility();
        $this->A5month->setVisibility();
        $this->A5monthDATE->setVisibility();
        $this->A5monthINHOUSE->setVisibility();
        $this->A5monthREPORT->setVisibility();
        $this->A7month->setVisibility();
        $this->A7monthDATE->setVisibility();
        $this->A7monthINHOUSE->setVisibility();
        $this->A7monthREPORT->setVisibility();
        $this->A9month->setVisibility();
        $this->A9monthDATE->setVisibility();
        $this->A9monthINHOUSE->setVisibility();
        $this->A9monthREPORT->setVisibility();
        $this->INJ->setVisibility();
        $this->INJDATE->setVisibility();
        $this->INJINHOUSE->setVisibility();
        $this->INJREPORT->setVisibility();
        $this->Bleeding->setVisibility();
        $this->Hypothyroidism->setVisibility();
        $this->PICMENumber->setVisibility();
        $this->Outcome->setVisibility();
        $this->DateofAdmission->setVisibility();
        $this->DateodProcedure->setVisibility();
        $this->Miscarriage->setVisibility();
        $this->ModeOfDelivery->setVisibility();
        $this->ND->setVisibility();
        $this->NDS->setVisibility();
        $this->NDP->setVisibility();
        $this->Vaccum->setVisibility();
        $this->VaccumS->setVisibility();
        $this->VaccumP->setVisibility();
        $this->Forceps->setVisibility();
        $this->ForcepsS->setVisibility();
        $this->ForcepsP->setVisibility();
        $this->Elective->setVisibility();
        $this->ElectiveS->setVisibility();
        $this->ElectiveP->setVisibility();
        $this->Emergency->setVisibility();
        $this->EmergencyS->setVisibility();
        $this->EmergencyP->setVisibility();
        $this->Maturity->setVisibility();
        $this->Baby1->setVisibility();
        $this->Baby2->setVisibility();
        $this->sex1->setVisibility();
        $this->sex2->setVisibility();
        $this->weight1->setVisibility();
        $this->weight2->setVisibility();
        $this->NICU1->setVisibility();
        $this->NICU2->setVisibility();
        $this->Jaundice1->setVisibility();
        $this->Jaundice2->setVisibility();
        $this->Others1->setVisibility();
        $this->Others2->setVisibility();
        $this->SpillOverReasons->setVisibility();
        $this->ANClosed->setVisibility();
        $this->ANClosedDATE->setVisibility();
        $this->PastMedicalHistoryOthers->setVisibility();
        $this->PastSurgicalHistoryOthers->setVisibility();
        $this->FamilyHistoryOthers->setVisibility();
        $this->PresentPregnancyComplicationsOthers->setVisibility();
        $this->ETdate->setVisibility();
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

        // Set up master/detail parameters
        $this->setupMasterParms();

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Load key parameters
        $this->RecKeys = $this->getRecordKeys(); // Load record keys
        $filter = $this->getFilterFromRecordKeys();
        if ($filter == "") {
            $this->terminate("PatientAnRegistrationList"); // Prevent SQL injection, return to list
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
                $this->terminate("PatientAnRegistrationList"); // Return to list
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
        $this->pid->setDbValue($row['pid']);
        $this->fid->setDbValue($row['fid']);
        $this->G->setDbValue($row['G']);
        $this->P->setDbValue($row['P']);
        $this->L->setDbValue($row['L']);
        $this->A->setDbValue($row['A']);
        $this->E->setDbValue($row['E']);
        $this->M->setDbValue($row['M']);
        $this->LMP->setDbValue($row['LMP']);
        $this->EDO->setDbValue($row['EDO']);
        $this->MenstrualHistory->setDbValue($row['MenstrualHistory']);
        $this->MaritalHistory->setDbValue($row['MaritalHistory']);
        $this->ObstetricHistory->setDbValue($row['ObstetricHistory']);
        $this->PreviousHistoryofGDM->setDbValue($row['PreviousHistoryofGDM']);
        $this->PreviousHistorofPIH->setDbValue($row['PreviousHistorofPIH']);
        $this->PreviousHistoryofIUGR->setDbValue($row['PreviousHistoryofIUGR']);
        $this->PreviousHistoryofOligohydramnios->setDbValue($row['PreviousHistoryofOligohydramnios']);
        $this->PreviousHistoryofPreterm->setDbValue($row['PreviousHistoryofPreterm']);
        $this->G1->setDbValue($row['G1']);
        $this->G2->setDbValue($row['G2']);
        $this->G3->setDbValue($row['G3']);
        $this->DeliveryNDLSCS1->setDbValue($row['DeliveryNDLSCS1']);
        $this->DeliveryNDLSCS2->setDbValue($row['DeliveryNDLSCS2']);
        $this->DeliveryNDLSCS3->setDbValue($row['DeliveryNDLSCS3']);
        $this->BabySexweight1->setDbValue($row['BabySexweight1']);
        $this->BabySexweight2->setDbValue($row['BabySexweight2']);
        $this->BabySexweight3->setDbValue($row['BabySexweight3']);
        $this->PastMedicalHistory->setDbValue($row['PastMedicalHistory']);
        $this->PastSurgicalHistory->setDbValue($row['PastSurgicalHistory']);
        $this->FamilyHistory->setDbValue($row['FamilyHistory']);
        $this->Viability->setDbValue($row['Viability']);
        $this->ViabilityDATE->setDbValue($row['ViabilityDATE']);
        $this->ViabilityREPORT->setDbValue($row['ViabilityREPORT']);
        $this->Viability2->setDbValue($row['Viability2']);
        $this->Viability2DATE->setDbValue($row['Viability2DATE']);
        $this->Viability2REPORT->setDbValue($row['Viability2REPORT']);
        $this->NTscan->setDbValue($row['NTscan']);
        $this->NTscanDATE->setDbValue($row['NTscanDATE']);
        $this->NTscanREPORT->setDbValue($row['NTscanREPORT']);
        $this->EarlyTarget->setDbValue($row['EarlyTarget']);
        $this->EarlyTargetDATE->setDbValue($row['EarlyTargetDATE']);
        $this->EarlyTargetREPORT->setDbValue($row['EarlyTargetREPORT']);
        $this->Anomaly->setDbValue($row['Anomaly']);
        $this->AnomalyDATE->setDbValue($row['AnomalyDATE']);
        $this->AnomalyREPORT->setDbValue($row['AnomalyREPORT']);
        $this->Growth->setDbValue($row['Growth']);
        $this->GrowthDATE->setDbValue($row['GrowthDATE']);
        $this->GrowthREPORT->setDbValue($row['GrowthREPORT']);
        $this->Growth1->setDbValue($row['Growth1']);
        $this->Growth1DATE->setDbValue($row['Growth1DATE']);
        $this->Growth1REPORT->setDbValue($row['Growth1REPORT']);
        $this->ANProfile->setDbValue($row['ANProfile']);
        $this->ANProfileDATE->setDbValue($row['ANProfileDATE']);
        $this->ANProfileINHOUSE->setDbValue($row['ANProfileINHOUSE']);
        $this->ANProfileREPORT->setDbValue($row['ANProfileREPORT']);
        $this->DualMarker->setDbValue($row['DualMarker']);
        $this->DualMarkerDATE->setDbValue($row['DualMarkerDATE']);
        $this->DualMarkerINHOUSE->setDbValue($row['DualMarkerINHOUSE']);
        $this->DualMarkerREPORT->setDbValue($row['DualMarkerREPORT']);
        $this->Quadruple->setDbValue($row['Quadruple']);
        $this->QuadrupleDATE->setDbValue($row['QuadrupleDATE']);
        $this->QuadrupleINHOUSE->setDbValue($row['QuadrupleINHOUSE']);
        $this->QuadrupleREPORT->setDbValue($row['QuadrupleREPORT']);
        $this->A5month->setDbValue($row['A5month']);
        $this->A5monthDATE->setDbValue($row['A5monthDATE']);
        $this->A5monthINHOUSE->setDbValue($row['A5monthINHOUSE']);
        $this->A5monthREPORT->setDbValue($row['A5monthREPORT']);
        $this->A7month->setDbValue($row['A7month']);
        $this->A7monthDATE->setDbValue($row['A7monthDATE']);
        $this->A7monthINHOUSE->setDbValue($row['A7monthINHOUSE']);
        $this->A7monthREPORT->setDbValue($row['A7monthREPORT']);
        $this->A9month->setDbValue($row['A9month']);
        $this->A9monthDATE->setDbValue($row['A9monthDATE']);
        $this->A9monthINHOUSE->setDbValue($row['A9monthINHOUSE']);
        $this->A9monthREPORT->setDbValue($row['A9monthREPORT']);
        $this->INJ->setDbValue($row['INJ']);
        $this->INJDATE->setDbValue($row['INJDATE']);
        $this->INJINHOUSE->setDbValue($row['INJINHOUSE']);
        $this->INJREPORT->setDbValue($row['INJREPORT']);
        $this->Bleeding->setDbValue($row['Bleeding']);
        $this->Hypothyroidism->setDbValue($row['Hypothyroidism']);
        $this->PICMENumber->setDbValue($row['PICMENumber']);
        $this->Outcome->setDbValue($row['Outcome']);
        $this->DateofAdmission->setDbValue($row['DateofAdmission']);
        $this->DateodProcedure->setDbValue($row['DateodProcedure']);
        $this->Miscarriage->setDbValue($row['Miscarriage']);
        $this->ModeOfDelivery->setDbValue($row['ModeOfDelivery']);
        $this->ND->setDbValue($row['ND']);
        $this->NDS->setDbValue($row['NDS']);
        $this->NDP->setDbValue($row['NDP']);
        $this->Vaccum->setDbValue($row['Vaccum']);
        $this->VaccumS->setDbValue($row['VaccumS']);
        $this->VaccumP->setDbValue($row['VaccumP']);
        $this->Forceps->setDbValue($row['Forceps']);
        $this->ForcepsS->setDbValue($row['ForcepsS']);
        $this->ForcepsP->setDbValue($row['ForcepsP']);
        $this->Elective->setDbValue($row['Elective']);
        $this->ElectiveS->setDbValue($row['ElectiveS']);
        $this->ElectiveP->setDbValue($row['ElectiveP']);
        $this->Emergency->setDbValue($row['Emergency']);
        $this->EmergencyS->setDbValue($row['EmergencyS']);
        $this->EmergencyP->setDbValue($row['EmergencyP']);
        $this->Maturity->setDbValue($row['Maturity']);
        $this->Baby1->setDbValue($row['Baby1']);
        $this->Baby2->setDbValue($row['Baby2']);
        $this->sex1->setDbValue($row['sex1']);
        $this->sex2->setDbValue($row['sex2']);
        $this->weight1->setDbValue($row['weight1']);
        $this->weight2->setDbValue($row['weight2']);
        $this->NICU1->setDbValue($row['NICU1']);
        $this->NICU2->setDbValue($row['NICU2']);
        $this->Jaundice1->setDbValue($row['Jaundice1']);
        $this->Jaundice2->setDbValue($row['Jaundice2']);
        $this->Others1->setDbValue($row['Others1']);
        $this->Others2->setDbValue($row['Others2']);
        $this->SpillOverReasons->setDbValue($row['SpillOverReasons']);
        $this->ANClosed->setDbValue($row['ANClosed']);
        $this->ANClosedDATE->setDbValue($row['ANClosedDATE']);
        $this->PastMedicalHistoryOthers->setDbValue($row['PastMedicalHistoryOthers']);
        $this->PastSurgicalHistoryOthers->setDbValue($row['PastSurgicalHistoryOthers']);
        $this->FamilyHistoryOthers->setDbValue($row['FamilyHistoryOthers']);
        $this->PresentPregnancyComplicationsOthers->setDbValue($row['PresentPregnancyComplicationsOthers']);
        $this->ETdate->setDbValue($row['ETdate']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['pid'] = null;
        $row['fid'] = null;
        $row['G'] = null;
        $row['P'] = null;
        $row['L'] = null;
        $row['A'] = null;
        $row['E'] = null;
        $row['M'] = null;
        $row['LMP'] = null;
        $row['EDO'] = null;
        $row['MenstrualHistory'] = null;
        $row['MaritalHistory'] = null;
        $row['ObstetricHistory'] = null;
        $row['PreviousHistoryofGDM'] = null;
        $row['PreviousHistorofPIH'] = null;
        $row['PreviousHistoryofIUGR'] = null;
        $row['PreviousHistoryofOligohydramnios'] = null;
        $row['PreviousHistoryofPreterm'] = null;
        $row['G1'] = null;
        $row['G2'] = null;
        $row['G3'] = null;
        $row['DeliveryNDLSCS1'] = null;
        $row['DeliveryNDLSCS2'] = null;
        $row['DeliveryNDLSCS3'] = null;
        $row['BabySexweight1'] = null;
        $row['BabySexweight2'] = null;
        $row['BabySexweight3'] = null;
        $row['PastMedicalHistory'] = null;
        $row['PastSurgicalHistory'] = null;
        $row['FamilyHistory'] = null;
        $row['Viability'] = null;
        $row['ViabilityDATE'] = null;
        $row['ViabilityREPORT'] = null;
        $row['Viability2'] = null;
        $row['Viability2DATE'] = null;
        $row['Viability2REPORT'] = null;
        $row['NTscan'] = null;
        $row['NTscanDATE'] = null;
        $row['NTscanREPORT'] = null;
        $row['EarlyTarget'] = null;
        $row['EarlyTargetDATE'] = null;
        $row['EarlyTargetREPORT'] = null;
        $row['Anomaly'] = null;
        $row['AnomalyDATE'] = null;
        $row['AnomalyREPORT'] = null;
        $row['Growth'] = null;
        $row['GrowthDATE'] = null;
        $row['GrowthREPORT'] = null;
        $row['Growth1'] = null;
        $row['Growth1DATE'] = null;
        $row['Growth1REPORT'] = null;
        $row['ANProfile'] = null;
        $row['ANProfileDATE'] = null;
        $row['ANProfileINHOUSE'] = null;
        $row['ANProfileREPORT'] = null;
        $row['DualMarker'] = null;
        $row['DualMarkerDATE'] = null;
        $row['DualMarkerINHOUSE'] = null;
        $row['DualMarkerREPORT'] = null;
        $row['Quadruple'] = null;
        $row['QuadrupleDATE'] = null;
        $row['QuadrupleINHOUSE'] = null;
        $row['QuadrupleREPORT'] = null;
        $row['A5month'] = null;
        $row['A5monthDATE'] = null;
        $row['A5monthINHOUSE'] = null;
        $row['A5monthREPORT'] = null;
        $row['A7month'] = null;
        $row['A7monthDATE'] = null;
        $row['A7monthINHOUSE'] = null;
        $row['A7monthREPORT'] = null;
        $row['A9month'] = null;
        $row['A9monthDATE'] = null;
        $row['A9monthINHOUSE'] = null;
        $row['A9monthREPORT'] = null;
        $row['INJ'] = null;
        $row['INJDATE'] = null;
        $row['INJINHOUSE'] = null;
        $row['INJREPORT'] = null;
        $row['Bleeding'] = null;
        $row['Hypothyroidism'] = null;
        $row['PICMENumber'] = null;
        $row['Outcome'] = null;
        $row['DateofAdmission'] = null;
        $row['DateodProcedure'] = null;
        $row['Miscarriage'] = null;
        $row['ModeOfDelivery'] = null;
        $row['ND'] = null;
        $row['NDS'] = null;
        $row['NDP'] = null;
        $row['Vaccum'] = null;
        $row['VaccumS'] = null;
        $row['VaccumP'] = null;
        $row['Forceps'] = null;
        $row['ForcepsS'] = null;
        $row['ForcepsP'] = null;
        $row['Elective'] = null;
        $row['ElectiveS'] = null;
        $row['ElectiveP'] = null;
        $row['Emergency'] = null;
        $row['EmergencyS'] = null;
        $row['EmergencyP'] = null;
        $row['Maturity'] = null;
        $row['Baby1'] = null;
        $row['Baby2'] = null;
        $row['sex1'] = null;
        $row['sex2'] = null;
        $row['weight1'] = null;
        $row['weight2'] = null;
        $row['NICU1'] = null;
        $row['NICU2'] = null;
        $row['Jaundice1'] = null;
        $row['Jaundice2'] = null;
        $row['Others1'] = null;
        $row['Others2'] = null;
        $row['SpillOverReasons'] = null;
        $row['ANClosed'] = null;
        $row['ANClosedDATE'] = null;
        $row['PastMedicalHistoryOthers'] = null;
        $row['PastSurgicalHistoryOthers'] = null;
        $row['FamilyHistoryOthers'] = null;
        $row['PresentPregnancyComplicationsOthers'] = null;
        $row['ETdate'] = null;
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

        // pid

        // fid

        // G

        // P

        // L

        // A

        // E

        // M

        // LMP

        // EDO

        // MenstrualHistory

        // MaritalHistory

        // ObstetricHistory

        // PreviousHistoryofGDM

        // PreviousHistorofPIH

        // PreviousHistoryofIUGR

        // PreviousHistoryofOligohydramnios

        // PreviousHistoryofPreterm

        // G1

        // G2

        // G3

        // DeliveryNDLSCS1

        // DeliveryNDLSCS2

        // DeliveryNDLSCS3

        // BabySexweight1

        // BabySexweight2

        // BabySexweight3

        // PastMedicalHistory

        // PastSurgicalHistory

        // FamilyHistory

        // Viability

        // ViabilityDATE

        // ViabilityREPORT

        // Viability2

        // Viability2DATE

        // Viability2REPORT

        // NTscan

        // NTscanDATE

        // NTscanREPORT

        // EarlyTarget

        // EarlyTargetDATE

        // EarlyTargetREPORT

        // Anomaly

        // AnomalyDATE

        // AnomalyREPORT

        // Growth

        // GrowthDATE

        // GrowthREPORT

        // Growth1

        // Growth1DATE

        // Growth1REPORT

        // ANProfile

        // ANProfileDATE

        // ANProfileINHOUSE

        // ANProfileREPORT

        // DualMarker

        // DualMarkerDATE

        // DualMarkerINHOUSE

        // DualMarkerREPORT

        // Quadruple

        // QuadrupleDATE

        // QuadrupleINHOUSE

        // QuadrupleREPORT

        // A5month

        // A5monthDATE

        // A5monthINHOUSE

        // A5monthREPORT

        // A7month

        // A7monthDATE

        // A7monthINHOUSE

        // A7monthREPORT

        // A9month

        // A9monthDATE

        // A9monthINHOUSE

        // A9monthREPORT

        // INJ

        // INJDATE

        // INJINHOUSE

        // INJREPORT

        // Bleeding

        // Hypothyroidism

        // PICMENumber

        // Outcome

        // DateofAdmission

        // DateodProcedure

        // Miscarriage

        // ModeOfDelivery

        // ND

        // NDS

        // NDP

        // Vaccum

        // VaccumS

        // VaccumP

        // Forceps

        // ForcepsS

        // ForcepsP

        // Elective

        // ElectiveS

        // ElectiveP

        // Emergency

        // EmergencyS

        // EmergencyP

        // Maturity

        // Baby1

        // Baby2

        // sex1

        // sex2

        // weight1

        // weight2

        // NICU1

        // NICU2

        // Jaundice1

        // Jaundice2

        // Others1

        // Others2

        // SpillOverReasons

        // ANClosed

        // ANClosedDATE

        // PastMedicalHistoryOthers

        // PastSurgicalHistoryOthers

        // FamilyHistoryOthers

        // PresentPregnancyComplicationsOthers

        // ETdate
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // pid
            $this->pid->ViewValue = $this->pid->CurrentValue;
            $this->pid->ViewValue = FormatNumber($this->pid->ViewValue, 0, -2, -2, -2);
            $this->pid->ViewCustomAttributes = "";

            // fid
            $this->fid->ViewValue = $this->fid->CurrentValue;
            $this->fid->ViewValue = FormatNumber($this->fid->ViewValue, 0, -2, -2, -2);
            $this->fid->ViewCustomAttributes = "";

            // G
            $this->G->ViewValue = $this->G->CurrentValue;
            $this->G->ViewCustomAttributes = "";

            // P
            $this->P->ViewValue = $this->P->CurrentValue;
            $this->P->ViewCustomAttributes = "";

            // L
            $this->L->ViewValue = $this->L->CurrentValue;
            $this->L->ViewCustomAttributes = "";

            // A
            $this->A->ViewValue = $this->A->CurrentValue;
            $this->A->ViewCustomAttributes = "";

            // E
            $this->E->ViewValue = $this->E->CurrentValue;
            $this->E->ViewCustomAttributes = "";

            // M
            $this->M->ViewValue = $this->M->CurrentValue;
            $this->M->ViewCustomAttributes = "";

            // LMP
            $this->LMP->ViewValue = $this->LMP->CurrentValue;
            $this->LMP->ViewCustomAttributes = "";

            // EDO
            $this->EDO->ViewValue = $this->EDO->CurrentValue;
            $this->EDO->ViewCustomAttributes = "";

            // MenstrualHistory
            if (strval($this->MenstrualHistory->CurrentValue) != "") {
                $this->MenstrualHistory->ViewValue = $this->MenstrualHistory->optionCaption($this->MenstrualHistory->CurrentValue);
            } else {
                $this->MenstrualHistory->ViewValue = null;
            }
            $this->MenstrualHistory->ViewCustomAttributes = "";

            // MaritalHistory
            $this->MaritalHistory->ViewValue = $this->MaritalHistory->CurrentValue;
            $this->MaritalHistory->ViewCustomAttributes = "";

            // ObstetricHistory
            $this->ObstetricHistory->ViewValue = $this->ObstetricHistory->CurrentValue;
            $this->ObstetricHistory->ViewCustomAttributes = "";

            // PreviousHistoryofGDM
            if (strval($this->PreviousHistoryofGDM->CurrentValue) != "") {
                $this->PreviousHistoryofGDM->ViewValue = $this->PreviousHistoryofGDM->optionCaption($this->PreviousHistoryofGDM->CurrentValue);
            } else {
                $this->PreviousHistoryofGDM->ViewValue = null;
            }
            $this->PreviousHistoryofGDM->ViewCustomAttributes = "";

            // PreviousHistorofPIH
            if (strval($this->PreviousHistorofPIH->CurrentValue) != "") {
                $this->PreviousHistorofPIH->ViewValue = $this->PreviousHistorofPIH->optionCaption($this->PreviousHistorofPIH->CurrentValue);
            } else {
                $this->PreviousHistorofPIH->ViewValue = null;
            }
            $this->PreviousHistorofPIH->ViewCustomAttributes = "";

            // PreviousHistoryofIUGR
            if (strval($this->PreviousHistoryofIUGR->CurrentValue) != "") {
                $this->PreviousHistoryofIUGR->ViewValue = $this->PreviousHistoryofIUGR->optionCaption($this->PreviousHistoryofIUGR->CurrentValue);
            } else {
                $this->PreviousHistoryofIUGR->ViewValue = null;
            }
            $this->PreviousHistoryofIUGR->ViewCustomAttributes = "";

            // PreviousHistoryofOligohydramnios
            if (strval($this->PreviousHistoryofOligohydramnios->CurrentValue) != "") {
                $this->PreviousHistoryofOligohydramnios->ViewValue = $this->PreviousHistoryofOligohydramnios->optionCaption($this->PreviousHistoryofOligohydramnios->CurrentValue);
            } else {
                $this->PreviousHistoryofOligohydramnios->ViewValue = null;
            }
            $this->PreviousHistoryofOligohydramnios->ViewCustomAttributes = "";

            // PreviousHistoryofPreterm
            if (strval($this->PreviousHistoryofPreterm->CurrentValue) != "") {
                $this->PreviousHistoryofPreterm->ViewValue = $this->PreviousHistoryofPreterm->optionCaption($this->PreviousHistoryofPreterm->CurrentValue);
            } else {
                $this->PreviousHistoryofPreterm->ViewValue = null;
            }
            $this->PreviousHistoryofPreterm->ViewCustomAttributes = "";

            // G1
            $this->G1->ViewValue = $this->G1->CurrentValue;
            $this->G1->ViewCustomAttributes = "";

            // G2
            $this->G2->ViewValue = $this->G2->CurrentValue;
            $this->G2->ViewCustomAttributes = "";

            // G3
            $this->G3->ViewValue = $this->G3->CurrentValue;
            $this->G3->ViewCustomAttributes = "";

            // DeliveryNDLSCS1
            $this->DeliveryNDLSCS1->ViewValue = $this->DeliveryNDLSCS1->CurrentValue;
            $this->DeliveryNDLSCS1->ViewCustomAttributes = "";

            // DeliveryNDLSCS2
            $this->DeliveryNDLSCS2->ViewValue = $this->DeliveryNDLSCS2->CurrentValue;
            $this->DeliveryNDLSCS2->ViewCustomAttributes = "";

            // DeliveryNDLSCS3
            $this->DeliveryNDLSCS3->ViewValue = $this->DeliveryNDLSCS3->CurrentValue;
            $this->DeliveryNDLSCS3->ViewCustomAttributes = "";

            // BabySexweight1
            $this->BabySexweight1->ViewValue = $this->BabySexweight1->CurrentValue;
            $this->BabySexweight1->ViewCustomAttributes = "";

            // BabySexweight2
            $this->BabySexweight2->ViewValue = $this->BabySexweight2->CurrentValue;
            $this->BabySexweight2->ViewCustomAttributes = "";

            // BabySexweight3
            $this->BabySexweight3->ViewValue = $this->BabySexweight3->CurrentValue;
            $this->BabySexweight3->ViewCustomAttributes = "";

            // PastMedicalHistory
            if (strval($this->PastMedicalHistory->CurrentValue) != "") {
                $this->PastMedicalHistory->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->PastMedicalHistory->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->PastMedicalHistory->ViewValue->add($this->PastMedicalHistory->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->PastMedicalHistory->ViewValue = null;
            }
            $this->PastMedicalHistory->ViewCustomAttributes = "";

            // PastSurgicalHistory
            if (strval($this->PastSurgicalHistory->CurrentValue) != "") {
                $this->PastSurgicalHistory->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->PastSurgicalHistory->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->PastSurgicalHistory->ViewValue->add($this->PastSurgicalHistory->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->PastSurgicalHistory->ViewValue = null;
            }
            $this->PastSurgicalHistory->ViewCustomAttributes = "";

            // FamilyHistory
            if (strval($this->FamilyHistory->CurrentValue) != "") {
                $this->FamilyHistory->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->FamilyHistory->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->FamilyHistory->ViewValue->add($this->FamilyHistory->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->FamilyHistory->ViewValue = null;
            }
            $this->FamilyHistory->ViewCustomAttributes = "";

            // Viability
            $this->Viability->ViewValue = $this->Viability->CurrentValue;
            $this->Viability->ViewCustomAttributes = "";

            // ViabilityDATE
            $this->ViabilityDATE->ViewValue = $this->ViabilityDATE->CurrentValue;
            $this->ViabilityDATE->ViewCustomAttributes = "";

            // ViabilityREPORT
            $this->ViabilityREPORT->ViewValue = $this->ViabilityREPORT->CurrentValue;
            $this->ViabilityREPORT->ViewCustomAttributes = "";

            // Viability2
            $this->Viability2->ViewValue = $this->Viability2->CurrentValue;
            $this->Viability2->ViewCustomAttributes = "";

            // Viability2DATE
            $this->Viability2DATE->ViewValue = $this->Viability2DATE->CurrentValue;
            $this->Viability2DATE->ViewCustomAttributes = "";

            // Viability2REPORT
            $this->Viability2REPORT->ViewValue = $this->Viability2REPORT->CurrentValue;
            $this->Viability2REPORT->ViewCustomAttributes = "";

            // NTscan
            $this->NTscan->ViewValue = $this->NTscan->CurrentValue;
            $this->NTscan->ViewCustomAttributes = "";

            // NTscanDATE
            $this->NTscanDATE->ViewValue = $this->NTscanDATE->CurrentValue;
            $this->NTscanDATE->ViewCustomAttributes = "";

            // NTscanREPORT
            $this->NTscanREPORT->ViewValue = $this->NTscanREPORT->CurrentValue;
            $this->NTscanREPORT->ViewCustomAttributes = "";

            // EarlyTarget
            $this->EarlyTarget->ViewValue = $this->EarlyTarget->CurrentValue;
            $this->EarlyTarget->ViewCustomAttributes = "";

            // EarlyTargetDATE
            $this->EarlyTargetDATE->ViewValue = $this->EarlyTargetDATE->CurrentValue;
            $this->EarlyTargetDATE->ViewCustomAttributes = "";

            // EarlyTargetREPORT
            $this->EarlyTargetREPORT->ViewValue = $this->EarlyTargetREPORT->CurrentValue;
            $this->EarlyTargetREPORT->ViewCustomAttributes = "";

            // Anomaly
            $this->Anomaly->ViewValue = $this->Anomaly->CurrentValue;
            $this->Anomaly->ViewCustomAttributes = "";

            // AnomalyDATE
            $this->AnomalyDATE->ViewValue = $this->AnomalyDATE->CurrentValue;
            $this->AnomalyDATE->ViewCustomAttributes = "";

            // AnomalyREPORT
            $this->AnomalyREPORT->ViewValue = $this->AnomalyREPORT->CurrentValue;
            $this->AnomalyREPORT->ViewCustomAttributes = "";

            // Growth
            $this->Growth->ViewValue = $this->Growth->CurrentValue;
            $this->Growth->ViewCustomAttributes = "";

            // GrowthDATE
            $this->GrowthDATE->ViewValue = $this->GrowthDATE->CurrentValue;
            $this->GrowthDATE->ViewCustomAttributes = "";

            // GrowthREPORT
            $this->GrowthREPORT->ViewValue = $this->GrowthREPORT->CurrentValue;
            $this->GrowthREPORT->ViewCustomAttributes = "";

            // Growth1
            $this->Growth1->ViewValue = $this->Growth1->CurrentValue;
            $this->Growth1->ViewCustomAttributes = "";

            // Growth1DATE
            $this->Growth1DATE->ViewValue = $this->Growth1DATE->CurrentValue;
            $this->Growth1DATE->ViewCustomAttributes = "";

            // Growth1REPORT
            $this->Growth1REPORT->ViewValue = $this->Growth1REPORT->CurrentValue;
            $this->Growth1REPORT->ViewCustomAttributes = "";

            // ANProfile
            $this->ANProfile->ViewValue = $this->ANProfile->CurrentValue;
            $this->ANProfile->ViewCustomAttributes = "";

            // ANProfileDATE
            $this->ANProfileDATE->ViewValue = $this->ANProfileDATE->CurrentValue;
            $this->ANProfileDATE->ViewCustomAttributes = "";

            // ANProfileINHOUSE
            $this->ANProfileINHOUSE->ViewValue = $this->ANProfileINHOUSE->CurrentValue;
            $this->ANProfileINHOUSE->ViewCustomAttributes = "";

            // ANProfileREPORT
            $this->ANProfileREPORT->ViewValue = $this->ANProfileREPORT->CurrentValue;
            $this->ANProfileREPORT->ViewCustomAttributes = "";

            // DualMarker
            $this->DualMarker->ViewValue = $this->DualMarker->CurrentValue;
            $this->DualMarker->ViewCustomAttributes = "";

            // DualMarkerDATE
            $this->DualMarkerDATE->ViewValue = $this->DualMarkerDATE->CurrentValue;
            $this->DualMarkerDATE->ViewCustomAttributes = "";

            // DualMarkerINHOUSE
            $this->DualMarkerINHOUSE->ViewValue = $this->DualMarkerINHOUSE->CurrentValue;
            $this->DualMarkerINHOUSE->ViewCustomAttributes = "";

            // DualMarkerREPORT
            $this->DualMarkerREPORT->ViewValue = $this->DualMarkerREPORT->CurrentValue;
            $this->DualMarkerREPORT->ViewCustomAttributes = "";

            // Quadruple
            $this->Quadruple->ViewValue = $this->Quadruple->CurrentValue;
            $this->Quadruple->ViewCustomAttributes = "";

            // QuadrupleDATE
            $this->QuadrupleDATE->ViewValue = $this->QuadrupleDATE->CurrentValue;
            $this->QuadrupleDATE->ViewCustomAttributes = "";

            // QuadrupleINHOUSE
            $this->QuadrupleINHOUSE->ViewValue = $this->QuadrupleINHOUSE->CurrentValue;
            $this->QuadrupleINHOUSE->ViewCustomAttributes = "";

            // QuadrupleREPORT
            $this->QuadrupleREPORT->ViewValue = $this->QuadrupleREPORT->CurrentValue;
            $this->QuadrupleREPORT->ViewCustomAttributes = "";

            // A5month
            $this->A5month->ViewValue = $this->A5month->CurrentValue;
            $this->A5month->ViewCustomAttributes = "";

            // A5monthDATE
            $this->A5monthDATE->ViewValue = $this->A5monthDATE->CurrentValue;
            $this->A5monthDATE->ViewCustomAttributes = "";

            // A5monthINHOUSE
            $this->A5monthINHOUSE->ViewValue = $this->A5monthINHOUSE->CurrentValue;
            $this->A5monthINHOUSE->ViewCustomAttributes = "";

            // A5monthREPORT
            $this->A5monthREPORT->ViewValue = $this->A5monthREPORT->CurrentValue;
            $this->A5monthREPORT->ViewCustomAttributes = "";

            // A7month
            $this->A7month->ViewValue = $this->A7month->CurrentValue;
            $this->A7month->ViewCustomAttributes = "";

            // A7monthDATE
            $this->A7monthDATE->ViewValue = $this->A7monthDATE->CurrentValue;
            $this->A7monthDATE->ViewCustomAttributes = "";

            // A7monthINHOUSE
            $this->A7monthINHOUSE->ViewValue = $this->A7monthINHOUSE->CurrentValue;
            $this->A7monthINHOUSE->ViewCustomAttributes = "";

            // A7monthREPORT
            $this->A7monthREPORT->ViewValue = $this->A7monthREPORT->CurrentValue;
            $this->A7monthREPORT->ViewCustomAttributes = "";

            // A9month
            $this->A9month->ViewValue = $this->A9month->CurrentValue;
            $this->A9month->ViewCustomAttributes = "";

            // A9monthDATE
            $this->A9monthDATE->ViewValue = $this->A9monthDATE->CurrentValue;
            $this->A9monthDATE->ViewCustomAttributes = "";

            // A9monthINHOUSE
            $this->A9monthINHOUSE->ViewValue = $this->A9monthINHOUSE->CurrentValue;
            $this->A9monthINHOUSE->ViewCustomAttributes = "";

            // A9monthREPORT
            $this->A9monthREPORT->ViewValue = $this->A9monthREPORT->CurrentValue;
            $this->A9monthREPORT->ViewCustomAttributes = "";

            // INJ
            $this->INJ->ViewValue = $this->INJ->CurrentValue;
            $this->INJ->ViewCustomAttributes = "";

            // INJDATE
            $this->INJDATE->ViewValue = $this->INJDATE->CurrentValue;
            $this->INJDATE->ViewCustomAttributes = "";

            // INJINHOUSE
            $this->INJINHOUSE->ViewValue = $this->INJINHOUSE->CurrentValue;
            $this->INJINHOUSE->ViewCustomAttributes = "";

            // INJREPORT
            $this->INJREPORT->ViewValue = $this->INJREPORT->CurrentValue;
            $this->INJREPORT->ViewCustomAttributes = "";

            // Bleeding
            if (strval($this->Bleeding->CurrentValue) != "") {
                $this->Bleeding->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->Bleeding->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->Bleeding->ViewValue->add($this->Bleeding->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->Bleeding->ViewValue = null;
            }
            $this->Bleeding->ViewCustomAttributes = "";

            // Hypothyroidism
            $this->Hypothyroidism->ViewValue = $this->Hypothyroidism->CurrentValue;
            $this->Hypothyroidism->ViewCustomAttributes = "";

            // PICMENumber
            $this->PICMENumber->ViewValue = $this->PICMENumber->CurrentValue;
            $this->PICMENumber->ViewCustomAttributes = "";

            // Outcome
            $this->Outcome->ViewValue = $this->Outcome->CurrentValue;
            $this->Outcome->ViewCustomAttributes = "";

            // DateofAdmission
            $this->DateofAdmission->ViewValue = $this->DateofAdmission->CurrentValue;
            $this->DateofAdmission->ViewCustomAttributes = "";

            // DateodProcedure
            $this->DateodProcedure->ViewValue = $this->DateodProcedure->CurrentValue;
            $this->DateodProcedure->ViewCustomAttributes = "";

            // Miscarriage
            if (strval($this->Miscarriage->CurrentValue) != "") {
                $this->Miscarriage->ViewValue = $this->Miscarriage->optionCaption($this->Miscarriage->CurrentValue);
            } else {
                $this->Miscarriage->ViewValue = null;
            }
            $this->Miscarriage->ViewCustomAttributes = "";

            // ModeOfDelivery
            if (strval($this->ModeOfDelivery->CurrentValue) != "") {
                $this->ModeOfDelivery->ViewValue = $this->ModeOfDelivery->optionCaption($this->ModeOfDelivery->CurrentValue);
            } else {
                $this->ModeOfDelivery->ViewValue = null;
            }
            $this->ModeOfDelivery->ViewCustomAttributes = "";

            // ND
            $this->ND->ViewValue = $this->ND->CurrentValue;
            $this->ND->ViewCustomAttributes = "";

            // NDS
            if (strval($this->NDS->CurrentValue) != "") {
                $this->NDS->ViewValue = $this->NDS->optionCaption($this->NDS->CurrentValue);
            } else {
                $this->NDS->ViewValue = null;
            }
            $this->NDS->ViewCustomAttributes = "";

            // NDP
            if (strval($this->NDP->CurrentValue) != "") {
                $this->NDP->ViewValue = $this->NDP->optionCaption($this->NDP->CurrentValue);
            } else {
                $this->NDP->ViewValue = null;
            }
            $this->NDP->ViewCustomAttributes = "";

            // Vaccum
            $this->Vaccum->ViewValue = $this->Vaccum->CurrentValue;
            $this->Vaccum->ViewCustomAttributes = "";

            // VaccumS
            if (strval($this->VaccumS->CurrentValue) != "") {
                $this->VaccumS->ViewValue = $this->VaccumS->optionCaption($this->VaccumS->CurrentValue);
            } else {
                $this->VaccumS->ViewValue = null;
            }
            $this->VaccumS->ViewCustomAttributes = "";

            // VaccumP
            if (strval($this->VaccumP->CurrentValue) != "") {
                $this->VaccumP->ViewValue = $this->VaccumP->optionCaption($this->VaccumP->CurrentValue);
            } else {
                $this->VaccumP->ViewValue = null;
            }
            $this->VaccumP->ViewCustomAttributes = "";

            // Forceps
            $this->Forceps->ViewValue = $this->Forceps->CurrentValue;
            $this->Forceps->ViewCustomAttributes = "";

            // ForcepsS
            if (strval($this->ForcepsS->CurrentValue) != "") {
                $this->ForcepsS->ViewValue = $this->ForcepsS->optionCaption($this->ForcepsS->CurrentValue);
            } else {
                $this->ForcepsS->ViewValue = null;
            }
            $this->ForcepsS->ViewCustomAttributes = "";

            // ForcepsP
            if (strval($this->ForcepsP->CurrentValue) != "") {
                $this->ForcepsP->ViewValue = $this->ForcepsP->optionCaption($this->ForcepsP->CurrentValue);
            } else {
                $this->ForcepsP->ViewValue = null;
            }
            $this->ForcepsP->ViewCustomAttributes = "";

            // Elective
            $this->Elective->ViewValue = $this->Elective->CurrentValue;
            $this->Elective->ViewCustomAttributes = "";

            // ElectiveS
            if (strval($this->ElectiveS->CurrentValue) != "") {
                $this->ElectiveS->ViewValue = $this->ElectiveS->optionCaption($this->ElectiveS->CurrentValue);
            } else {
                $this->ElectiveS->ViewValue = null;
            }
            $this->ElectiveS->ViewCustomAttributes = "";

            // ElectiveP
            if (strval($this->ElectiveP->CurrentValue) != "") {
                $this->ElectiveP->ViewValue = $this->ElectiveP->optionCaption($this->ElectiveP->CurrentValue);
            } else {
                $this->ElectiveP->ViewValue = null;
            }
            $this->ElectiveP->ViewCustomAttributes = "";

            // Emergency
            $this->Emergency->ViewValue = $this->Emergency->CurrentValue;
            $this->Emergency->ViewCustomAttributes = "";

            // EmergencyS
            if (strval($this->EmergencyS->CurrentValue) != "") {
                $this->EmergencyS->ViewValue = $this->EmergencyS->optionCaption($this->EmergencyS->CurrentValue);
            } else {
                $this->EmergencyS->ViewValue = null;
            }
            $this->EmergencyS->ViewCustomAttributes = "";

            // EmergencyP
            if (strval($this->EmergencyP->CurrentValue) != "") {
                $this->EmergencyP->ViewValue = $this->EmergencyP->optionCaption($this->EmergencyP->CurrentValue);
            } else {
                $this->EmergencyP->ViewValue = null;
            }
            $this->EmergencyP->ViewCustomAttributes = "";

            // Maturity
            if (strval($this->Maturity->CurrentValue) != "") {
                $this->Maturity->ViewValue = $this->Maturity->optionCaption($this->Maturity->CurrentValue);
            } else {
                $this->Maturity->ViewValue = null;
            }
            $this->Maturity->ViewCustomAttributes = "";

            // Baby1
            $this->Baby1->ViewValue = $this->Baby1->CurrentValue;
            $this->Baby1->ViewCustomAttributes = "";

            // Baby2
            $this->Baby2->ViewValue = $this->Baby2->CurrentValue;
            $this->Baby2->ViewCustomAttributes = "";

            // sex1
            $this->sex1->ViewValue = $this->sex1->CurrentValue;
            $this->sex1->ViewCustomAttributes = "";

            // sex2
            $this->sex2->ViewValue = $this->sex2->CurrentValue;
            $this->sex2->ViewCustomAttributes = "";

            // weight1
            $this->weight1->ViewValue = $this->weight1->CurrentValue;
            $this->weight1->ViewCustomAttributes = "";

            // weight2
            $this->weight2->ViewValue = $this->weight2->CurrentValue;
            $this->weight2->ViewCustomAttributes = "";

            // NICU1
            $this->NICU1->ViewValue = $this->NICU1->CurrentValue;
            $this->NICU1->ViewCustomAttributes = "";

            // NICU2
            $this->NICU2->ViewValue = $this->NICU2->CurrentValue;
            $this->NICU2->ViewCustomAttributes = "";

            // Jaundice1
            $this->Jaundice1->ViewValue = $this->Jaundice1->CurrentValue;
            $this->Jaundice1->ViewCustomAttributes = "";

            // Jaundice2
            $this->Jaundice2->ViewValue = $this->Jaundice2->CurrentValue;
            $this->Jaundice2->ViewCustomAttributes = "";

            // Others1
            $this->Others1->ViewValue = $this->Others1->CurrentValue;
            $this->Others1->ViewCustomAttributes = "";

            // Others2
            $this->Others2->ViewValue = $this->Others2->CurrentValue;
            $this->Others2->ViewCustomAttributes = "";

            // SpillOverReasons
            if (strval($this->SpillOverReasons->CurrentValue) != "") {
                $this->SpillOverReasons->ViewValue = $this->SpillOverReasons->optionCaption($this->SpillOverReasons->CurrentValue);
            } else {
                $this->SpillOverReasons->ViewValue = null;
            }
            $this->SpillOverReasons->ViewCustomAttributes = "";

            // ANClosed
            if (strval($this->ANClosed->CurrentValue) != "") {
                $this->ANClosed->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->ANClosed->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->ANClosed->ViewValue->add($this->ANClosed->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->ANClosed->ViewValue = null;
            }
            $this->ANClosed->ViewCustomAttributes = "";

            // ANClosedDATE
            $this->ANClosedDATE->ViewValue = $this->ANClosedDATE->CurrentValue;
            $this->ANClosedDATE->ViewCustomAttributes = "";

            // PastMedicalHistoryOthers
            $this->PastMedicalHistoryOthers->ViewValue = $this->PastMedicalHistoryOthers->CurrentValue;
            $this->PastMedicalHistoryOthers->ViewCustomAttributes = "";

            // PastSurgicalHistoryOthers
            $this->PastSurgicalHistoryOthers->ViewValue = $this->PastSurgicalHistoryOthers->CurrentValue;
            $this->PastSurgicalHistoryOthers->ViewCustomAttributes = "";

            // FamilyHistoryOthers
            $this->FamilyHistoryOthers->ViewValue = $this->FamilyHistoryOthers->CurrentValue;
            $this->FamilyHistoryOthers->ViewCustomAttributes = "";

            // PresentPregnancyComplicationsOthers
            $this->PresentPregnancyComplicationsOthers->ViewValue = $this->PresentPregnancyComplicationsOthers->CurrentValue;
            $this->PresentPregnancyComplicationsOthers->ViewCustomAttributes = "";

            // ETdate
            $this->ETdate->ViewValue = $this->ETdate->CurrentValue;
            $this->ETdate->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // pid
            $this->pid->LinkCustomAttributes = "";
            $this->pid->HrefValue = "";
            $this->pid->TooltipValue = "";

            // fid
            $this->fid->LinkCustomAttributes = "";
            $this->fid->HrefValue = "";
            $this->fid->TooltipValue = "";

            // G
            $this->G->LinkCustomAttributes = "";
            $this->G->HrefValue = "";
            $this->G->TooltipValue = "";

            // P
            $this->P->LinkCustomAttributes = "";
            $this->P->HrefValue = "";
            $this->P->TooltipValue = "";

            // L
            $this->L->LinkCustomAttributes = "";
            $this->L->HrefValue = "";
            $this->L->TooltipValue = "";

            // A
            $this->A->LinkCustomAttributes = "";
            $this->A->HrefValue = "";
            $this->A->TooltipValue = "";

            // E
            $this->E->LinkCustomAttributes = "";
            $this->E->HrefValue = "";
            $this->E->TooltipValue = "";

            // M
            $this->M->LinkCustomAttributes = "";
            $this->M->HrefValue = "";
            $this->M->TooltipValue = "";

            // LMP
            $this->LMP->LinkCustomAttributes = "";
            $this->LMP->HrefValue = "";
            $this->LMP->TooltipValue = "";

            // EDO
            $this->EDO->LinkCustomAttributes = "";
            $this->EDO->HrefValue = "";
            $this->EDO->TooltipValue = "";

            // MenstrualHistory
            $this->MenstrualHistory->LinkCustomAttributes = "";
            $this->MenstrualHistory->HrefValue = "";
            $this->MenstrualHistory->TooltipValue = "";

            // MaritalHistory
            $this->MaritalHistory->LinkCustomAttributes = "";
            $this->MaritalHistory->HrefValue = "";
            $this->MaritalHistory->TooltipValue = "";

            // ObstetricHistory
            $this->ObstetricHistory->LinkCustomAttributes = "";
            $this->ObstetricHistory->HrefValue = "";
            $this->ObstetricHistory->TooltipValue = "";

            // PreviousHistoryofGDM
            $this->PreviousHistoryofGDM->LinkCustomAttributes = "";
            $this->PreviousHistoryofGDM->HrefValue = "";
            $this->PreviousHistoryofGDM->TooltipValue = "";

            // PreviousHistorofPIH
            $this->PreviousHistorofPIH->LinkCustomAttributes = "";
            $this->PreviousHistorofPIH->HrefValue = "";
            $this->PreviousHistorofPIH->TooltipValue = "";

            // PreviousHistoryofIUGR
            $this->PreviousHistoryofIUGR->LinkCustomAttributes = "";
            $this->PreviousHistoryofIUGR->HrefValue = "";
            $this->PreviousHistoryofIUGR->TooltipValue = "";

            // PreviousHistoryofOligohydramnios
            $this->PreviousHistoryofOligohydramnios->LinkCustomAttributes = "";
            $this->PreviousHistoryofOligohydramnios->HrefValue = "";
            $this->PreviousHistoryofOligohydramnios->TooltipValue = "";

            // PreviousHistoryofPreterm
            $this->PreviousHistoryofPreterm->LinkCustomAttributes = "";
            $this->PreviousHistoryofPreterm->HrefValue = "";
            $this->PreviousHistoryofPreterm->TooltipValue = "";

            // G1
            $this->G1->LinkCustomAttributes = "";
            $this->G1->HrefValue = "";
            $this->G1->TooltipValue = "";

            // G2
            $this->G2->LinkCustomAttributes = "";
            $this->G2->HrefValue = "";
            $this->G2->TooltipValue = "";

            // G3
            $this->G3->LinkCustomAttributes = "";
            $this->G3->HrefValue = "";
            $this->G3->TooltipValue = "";

            // DeliveryNDLSCS1
            $this->DeliveryNDLSCS1->LinkCustomAttributes = "";
            $this->DeliveryNDLSCS1->HrefValue = "";
            $this->DeliveryNDLSCS1->TooltipValue = "";

            // DeliveryNDLSCS2
            $this->DeliveryNDLSCS2->LinkCustomAttributes = "";
            $this->DeliveryNDLSCS2->HrefValue = "";
            $this->DeliveryNDLSCS2->TooltipValue = "";

            // DeliveryNDLSCS3
            $this->DeliveryNDLSCS3->LinkCustomAttributes = "";
            $this->DeliveryNDLSCS3->HrefValue = "";
            $this->DeliveryNDLSCS3->TooltipValue = "";

            // BabySexweight1
            $this->BabySexweight1->LinkCustomAttributes = "";
            $this->BabySexweight1->HrefValue = "";
            $this->BabySexweight1->TooltipValue = "";

            // BabySexweight2
            $this->BabySexweight2->LinkCustomAttributes = "";
            $this->BabySexweight2->HrefValue = "";
            $this->BabySexweight2->TooltipValue = "";

            // BabySexweight3
            $this->BabySexweight3->LinkCustomAttributes = "";
            $this->BabySexweight3->HrefValue = "";
            $this->BabySexweight3->TooltipValue = "";

            // PastMedicalHistory
            $this->PastMedicalHistory->LinkCustomAttributes = "";
            $this->PastMedicalHistory->HrefValue = "";
            $this->PastMedicalHistory->TooltipValue = "";

            // PastSurgicalHistory
            $this->PastSurgicalHistory->LinkCustomAttributes = "";
            $this->PastSurgicalHistory->HrefValue = "";
            $this->PastSurgicalHistory->TooltipValue = "";

            // FamilyHistory
            $this->FamilyHistory->LinkCustomAttributes = "";
            $this->FamilyHistory->HrefValue = "";
            $this->FamilyHistory->TooltipValue = "";

            // Viability
            $this->Viability->LinkCustomAttributes = "";
            $this->Viability->HrefValue = "";
            $this->Viability->TooltipValue = "";

            // ViabilityDATE
            $this->ViabilityDATE->LinkCustomAttributes = "";
            $this->ViabilityDATE->HrefValue = "";
            $this->ViabilityDATE->TooltipValue = "";

            // ViabilityREPORT
            $this->ViabilityREPORT->LinkCustomAttributes = "";
            $this->ViabilityREPORT->HrefValue = "";
            $this->ViabilityREPORT->TooltipValue = "";

            // Viability2
            $this->Viability2->LinkCustomAttributes = "";
            $this->Viability2->HrefValue = "";
            $this->Viability2->TooltipValue = "";

            // Viability2DATE
            $this->Viability2DATE->LinkCustomAttributes = "";
            $this->Viability2DATE->HrefValue = "";
            $this->Viability2DATE->TooltipValue = "";

            // Viability2REPORT
            $this->Viability2REPORT->LinkCustomAttributes = "";
            $this->Viability2REPORT->HrefValue = "";
            $this->Viability2REPORT->TooltipValue = "";

            // NTscan
            $this->NTscan->LinkCustomAttributes = "";
            $this->NTscan->HrefValue = "";
            $this->NTscan->TooltipValue = "";

            // NTscanDATE
            $this->NTscanDATE->LinkCustomAttributes = "";
            $this->NTscanDATE->HrefValue = "";
            $this->NTscanDATE->TooltipValue = "";

            // NTscanREPORT
            $this->NTscanREPORT->LinkCustomAttributes = "";
            $this->NTscanREPORT->HrefValue = "";
            $this->NTscanREPORT->TooltipValue = "";

            // EarlyTarget
            $this->EarlyTarget->LinkCustomAttributes = "";
            $this->EarlyTarget->HrefValue = "";
            $this->EarlyTarget->TooltipValue = "";

            // EarlyTargetDATE
            $this->EarlyTargetDATE->LinkCustomAttributes = "";
            $this->EarlyTargetDATE->HrefValue = "";
            $this->EarlyTargetDATE->TooltipValue = "";

            // EarlyTargetREPORT
            $this->EarlyTargetREPORT->LinkCustomAttributes = "";
            $this->EarlyTargetREPORT->HrefValue = "";
            $this->EarlyTargetREPORT->TooltipValue = "";

            // Anomaly
            $this->Anomaly->LinkCustomAttributes = "";
            $this->Anomaly->HrefValue = "";
            $this->Anomaly->TooltipValue = "";

            // AnomalyDATE
            $this->AnomalyDATE->LinkCustomAttributes = "";
            $this->AnomalyDATE->HrefValue = "";
            $this->AnomalyDATE->TooltipValue = "";

            // AnomalyREPORT
            $this->AnomalyREPORT->LinkCustomAttributes = "";
            $this->AnomalyREPORT->HrefValue = "";
            $this->AnomalyREPORT->TooltipValue = "";

            // Growth
            $this->Growth->LinkCustomAttributes = "";
            $this->Growth->HrefValue = "";
            $this->Growth->TooltipValue = "";

            // GrowthDATE
            $this->GrowthDATE->LinkCustomAttributes = "";
            $this->GrowthDATE->HrefValue = "";
            $this->GrowthDATE->TooltipValue = "";

            // GrowthREPORT
            $this->GrowthREPORT->LinkCustomAttributes = "";
            $this->GrowthREPORT->HrefValue = "";
            $this->GrowthREPORT->TooltipValue = "";

            // Growth1
            $this->Growth1->LinkCustomAttributes = "";
            $this->Growth1->HrefValue = "";
            $this->Growth1->TooltipValue = "";

            // Growth1DATE
            $this->Growth1DATE->LinkCustomAttributes = "";
            $this->Growth1DATE->HrefValue = "";
            $this->Growth1DATE->TooltipValue = "";

            // Growth1REPORT
            $this->Growth1REPORT->LinkCustomAttributes = "";
            $this->Growth1REPORT->HrefValue = "";
            $this->Growth1REPORT->TooltipValue = "";

            // ANProfile
            $this->ANProfile->LinkCustomAttributes = "";
            $this->ANProfile->HrefValue = "";
            $this->ANProfile->TooltipValue = "";

            // ANProfileDATE
            $this->ANProfileDATE->LinkCustomAttributes = "";
            $this->ANProfileDATE->HrefValue = "";
            $this->ANProfileDATE->TooltipValue = "";

            // ANProfileINHOUSE
            $this->ANProfileINHOUSE->LinkCustomAttributes = "";
            $this->ANProfileINHOUSE->HrefValue = "";
            $this->ANProfileINHOUSE->TooltipValue = "";

            // ANProfileREPORT
            $this->ANProfileREPORT->LinkCustomAttributes = "";
            $this->ANProfileREPORT->HrefValue = "";
            $this->ANProfileREPORT->TooltipValue = "";

            // DualMarker
            $this->DualMarker->LinkCustomAttributes = "";
            $this->DualMarker->HrefValue = "";
            $this->DualMarker->TooltipValue = "";

            // DualMarkerDATE
            $this->DualMarkerDATE->LinkCustomAttributes = "";
            $this->DualMarkerDATE->HrefValue = "";
            $this->DualMarkerDATE->TooltipValue = "";

            // DualMarkerINHOUSE
            $this->DualMarkerINHOUSE->LinkCustomAttributes = "";
            $this->DualMarkerINHOUSE->HrefValue = "";
            $this->DualMarkerINHOUSE->TooltipValue = "";

            // DualMarkerREPORT
            $this->DualMarkerREPORT->LinkCustomAttributes = "";
            $this->DualMarkerREPORT->HrefValue = "";
            $this->DualMarkerREPORT->TooltipValue = "";

            // Quadruple
            $this->Quadruple->LinkCustomAttributes = "";
            $this->Quadruple->HrefValue = "";
            $this->Quadruple->TooltipValue = "";

            // QuadrupleDATE
            $this->QuadrupleDATE->LinkCustomAttributes = "";
            $this->QuadrupleDATE->HrefValue = "";
            $this->QuadrupleDATE->TooltipValue = "";

            // QuadrupleINHOUSE
            $this->QuadrupleINHOUSE->LinkCustomAttributes = "";
            $this->QuadrupleINHOUSE->HrefValue = "";
            $this->QuadrupleINHOUSE->TooltipValue = "";

            // QuadrupleREPORT
            $this->QuadrupleREPORT->LinkCustomAttributes = "";
            $this->QuadrupleREPORT->HrefValue = "";
            $this->QuadrupleREPORT->TooltipValue = "";

            // A5month
            $this->A5month->LinkCustomAttributes = "";
            $this->A5month->HrefValue = "";
            $this->A5month->TooltipValue = "";

            // A5monthDATE
            $this->A5monthDATE->LinkCustomAttributes = "";
            $this->A5monthDATE->HrefValue = "";
            $this->A5monthDATE->TooltipValue = "";

            // A5monthINHOUSE
            $this->A5monthINHOUSE->LinkCustomAttributes = "";
            $this->A5monthINHOUSE->HrefValue = "";
            $this->A5monthINHOUSE->TooltipValue = "";

            // A5monthREPORT
            $this->A5monthREPORT->LinkCustomAttributes = "";
            $this->A5monthREPORT->HrefValue = "";
            $this->A5monthREPORT->TooltipValue = "";

            // A7month
            $this->A7month->LinkCustomAttributes = "";
            $this->A7month->HrefValue = "";
            $this->A7month->TooltipValue = "";

            // A7monthDATE
            $this->A7monthDATE->LinkCustomAttributes = "";
            $this->A7monthDATE->HrefValue = "";
            $this->A7monthDATE->TooltipValue = "";

            // A7monthINHOUSE
            $this->A7monthINHOUSE->LinkCustomAttributes = "";
            $this->A7monthINHOUSE->HrefValue = "";
            $this->A7monthINHOUSE->TooltipValue = "";

            // A7monthREPORT
            $this->A7monthREPORT->LinkCustomAttributes = "";
            $this->A7monthREPORT->HrefValue = "";
            $this->A7monthREPORT->TooltipValue = "";

            // A9month
            $this->A9month->LinkCustomAttributes = "";
            $this->A9month->HrefValue = "";
            $this->A9month->TooltipValue = "";

            // A9monthDATE
            $this->A9monthDATE->LinkCustomAttributes = "";
            $this->A9monthDATE->HrefValue = "";
            $this->A9monthDATE->TooltipValue = "";

            // A9monthINHOUSE
            $this->A9monthINHOUSE->LinkCustomAttributes = "";
            $this->A9monthINHOUSE->HrefValue = "";
            $this->A9monthINHOUSE->TooltipValue = "";

            // A9monthREPORT
            $this->A9monthREPORT->LinkCustomAttributes = "";
            $this->A9monthREPORT->HrefValue = "";
            $this->A9monthREPORT->TooltipValue = "";

            // INJ
            $this->INJ->LinkCustomAttributes = "";
            $this->INJ->HrefValue = "";
            $this->INJ->TooltipValue = "";

            // INJDATE
            $this->INJDATE->LinkCustomAttributes = "";
            $this->INJDATE->HrefValue = "";
            $this->INJDATE->TooltipValue = "";

            // INJINHOUSE
            $this->INJINHOUSE->LinkCustomAttributes = "";
            $this->INJINHOUSE->HrefValue = "";
            $this->INJINHOUSE->TooltipValue = "";

            // INJREPORT
            $this->INJREPORT->LinkCustomAttributes = "";
            $this->INJREPORT->HrefValue = "";
            $this->INJREPORT->TooltipValue = "";

            // Bleeding
            $this->Bleeding->LinkCustomAttributes = "";
            $this->Bleeding->HrefValue = "";
            $this->Bleeding->TooltipValue = "";

            // Hypothyroidism
            $this->Hypothyroidism->LinkCustomAttributes = "";
            $this->Hypothyroidism->HrefValue = "";
            $this->Hypothyroidism->TooltipValue = "";

            // PICMENumber
            $this->PICMENumber->LinkCustomAttributes = "";
            $this->PICMENumber->HrefValue = "";
            $this->PICMENumber->TooltipValue = "";

            // Outcome
            $this->Outcome->LinkCustomAttributes = "";
            $this->Outcome->HrefValue = "";
            $this->Outcome->TooltipValue = "";

            // DateofAdmission
            $this->DateofAdmission->LinkCustomAttributes = "";
            $this->DateofAdmission->HrefValue = "";
            $this->DateofAdmission->TooltipValue = "";

            // DateodProcedure
            $this->DateodProcedure->LinkCustomAttributes = "";
            $this->DateodProcedure->HrefValue = "";
            $this->DateodProcedure->TooltipValue = "";

            // Miscarriage
            $this->Miscarriage->LinkCustomAttributes = "";
            $this->Miscarriage->HrefValue = "";
            $this->Miscarriage->TooltipValue = "";

            // ModeOfDelivery
            $this->ModeOfDelivery->LinkCustomAttributes = "";
            $this->ModeOfDelivery->HrefValue = "";
            $this->ModeOfDelivery->TooltipValue = "";

            // ND
            $this->ND->LinkCustomAttributes = "";
            $this->ND->HrefValue = "";
            $this->ND->TooltipValue = "";

            // NDS
            $this->NDS->LinkCustomAttributes = "";
            $this->NDS->HrefValue = "";
            $this->NDS->TooltipValue = "";

            // NDP
            $this->NDP->LinkCustomAttributes = "";
            $this->NDP->HrefValue = "";
            $this->NDP->TooltipValue = "";

            // Vaccum
            $this->Vaccum->LinkCustomAttributes = "";
            $this->Vaccum->HrefValue = "";
            $this->Vaccum->TooltipValue = "";

            // VaccumS
            $this->VaccumS->LinkCustomAttributes = "";
            $this->VaccumS->HrefValue = "";
            $this->VaccumS->TooltipValue = "";

            // VaccumP
            $this->VaccumP->LinkCustomAttributes = "";
            $this->VaccumP->HrefValue = "";
            $this->VaccumP->TooltipValue = "";

            // Forceps
            $this->Forceps->LinkCustomAttributes = "";
            $this->Forceps->HrefValue = "";
            $this->Forceps->TooltipValue = "";

            // ForcepsS
            $this->ForcepsS->LinkCustomAttributes = "";
            $this->ForcepsS->HrefValue = "";
            $this->ForcepsS->TooltipValue = "";

            // ForcepsP
            $this->ForcepsP->LinkCustomAttributes = "";
            $this->ForcepsP->HrefValue = "";
            $this->ForcepsP->TooltipValue = "";

            // Elective
            $this->Elective->LinkCustomAttributes = "";
            $this->Elective->HrefValue = "";
            $this->Elective->TooltipValue = "";

            // ElectiveS
            $this->ElectiveS->LinkCustomAttributes = "";
            $this->ElectiveS->HrefValue = "";
            $this->ElectiveS->TooltipValue = "";

            // ElectiveP
            $this->ElectiveP->LinkCustomAttributes = "";
            $this->ElectiveP->HrefValue = "";
            $this->ElectiveP->TooltipValue = "";

            // Emergency
            $this->Emergency->LinkCustomAttributes = "";
            $this->Emergency->HrefValue = "";
            $this->Emergency->TooltipValue = "";

            // EmergencyS
            $this->EmergencyS->LinkCustomAttributes = "";
            $this->EmergencyS->HrefValue = "";
            $this->EmergencyS->TooltipValue = "";

            // EmergencyP
            $this->EmergencyP->LinkCustomAttributes = "";
            $this->EmergencyP->HrefValue = "";
            $this->EmergencyP->TooltipValue = "";

            // Maturity
            $this->Maturity->LinkCustomAttributes = "";
            $this->Maturity->HrefValue = "";
            $this->Maturity->TooltipValue = "";

            // Baby1
            $this->Baby1->LinkCustomAttributes = "";
            $this->Baby1->HrefValue = "";
            $this->Baby1->TooltipValue = "";

            // Baby2
            $this->Baby2->LinkCustomAttributes = "";
            $this->Baby2->HrefValue = "";
            $this->Baby2->TooltipValue = "";

            // sex1
            $this->sex1->LinkCustomAttributes = "";
            $this->sex1->HrefValue = "";
            $this->sex1->TooltipValue = "";

            // sex2
            $this->sex2->LinkCustomAttributes = "";
            $this->sex2->HrefValue = "";
            $this->sex2->TooltipValue = "";

            // weight1
            $this->weight1->LinkCustomAttributes = "";
            $this->weight1->HrefValue = "";
            $this->weight1->TooltipValue = "";

            // weight2
            $this->weight2->LinkCustomAttributes = "";
            $this->weight2->HrefValue = "";
            $this->weight2->TooltipValue = "";

            // NICU1
            $this->NICU1->LinkCustomAttributes = "";
            $this->NICU1->HrefValue = "";
            $this->NICU1->TooltipValue = "";

            // NICU2
            $this->NICU2->LinkCustomAttributes = "";
            $this->NICU2->HrefValue = "";
            $this->NICU2->TooltipValue = "";

            // Jaundice1
            $this->Jaundice1->LinkCustomAttributes = "";
            $this->Jaundice1->HrefValue = "";
            $this->Jaundice1->TooltipValue = "";

            // Jaundice2
            $this->Jaundice2->LinkCustomAttributes = "";
            $this->Jaundice2->HrefValue = "";
            $this->Jaundice2->TooltipValue = "";

            // Others1
            $this->Others1->LinkCustomAttributes = "";
            $this->Others1->HrefValue = "";
            $this->Others1->TooltipValue = "";

            // Others2
            $this->Others2->LinkCustomAttributes = "";
            $this->Others2->HrefValue = "";
            $this->Others2->TooltipValue = "";

            // SpillOverReasons
            $this->SpillOverReasons->LinkCustomAttributes = "";
            $this->SpillOverReasons->HrefValue = "";
            $this->SpillOverReasons->TooltipValue = "";

            // ANClosed
            $this->ANClosed->LinkCustomAttributes = "";
            $this->ANClosed->HrefValue = "";
            $this->ANClosed->TooltipValue = "";

            // ANClosedDATE
            $this->ANClosedDATE->LinkCustomAttributes = "";
            $this->ANClosedDATE->HrefValue = "";
            $this->ANClosedDATE->TooltipValue = "";

            // PastMedicalHistoryOthers
            $this->PastMedicalHistoryOthers->LinkCustomAttributes = "";
            $this->PastMedicalHistoryOthers->HrefValue = "";
            $this->PastMedicalHistoryOthers->TooltipValue = "";

            // PastSurgicalHistoryOthers
            $this->PastSurgicalHistoryOthers->LinkCustomAttributes = "";
            $this->PastSurgicalHistoryOthers->HrefValue = "";
            $this->PastSurgicalHistoryOthers->TooltipValue = "";

            // FamilyHistoryOthers
            $this->FamilyHistoryOthers->LinkCustomAttributes = "";
            $this->FamilyHistoryOthers->HrefValue = "";
            $this->FamilyHistoryOthers->TooltipValue = "";

            // PresentPregnancyComplicationsOthers
            $this->PresentPregnancyComplicationsOthers->LinkCustomAttributes = "";
            $this->PresentPregnancyComplicationsOthers->HrefValue = "";
            $this->PresentPregnancyComplicationsOthers->TooltipValue = "";

            // ETdate
            $this->ETdate->LinkCustomAttributes = "";
            $this->ETdate->HrefValue = "";
            $this->ETdate->TooltipValue = "";
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

    // Set up master/detail based on QueryString
    protected function setupMasterParms()
    {
        $validMaster = false;
        // Get the keys for master table
        if (($master = Get(Config("TABLE_SHOW_MASTER"), Get(Config("TABLE_MASTER")))) !== null) {
            $masterTblVar = $master;
            if ($masterTblVar == "") {
                $validMaster = true;
                $this->DbMasterFilter = "";
                $this->DbDetailFilter = "";
            }
            if ($masterTblVar == "patient_opd_follow_up") {
                $validMaster = true;
                $masterTbl = Container("patient_opd_follow_up");
                if (($parm = Get("fk_PatientId", Get("pid"))) !== null) {
                    $masterTbl->PatientId->setQueryStringValue($parm);
                    $this->pid->setQueryStringValue($masterTbl->PatientId->QueryStringValue);
                    $this->pid->setSessionValue($this->pid->QueryStringValue);
                    if (!is_numeric($masterTbl->PatientId->QueryStringValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
                if (($parm = Get("fk_id", Get("fid"))) !== null) {
                    $masterTbl->id->setQueryStringValue($parm);
                    $this->fid->setQueryStringValue($masterTbl->id->QueryStringValue);
                    $this->fid->setSessionValue($this->fid->QueryStringValue);
                    if (!is_numeric($masterTbl->id->QueryStringValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
            }
        } elseif (($master = Post(Config("TABLE_SHOW_MASTER"), Post(Config("TABLE_MASTER")))) !== null) {
            $masterTblVar = $master;
            if ($masterTblVar == "") {
                    $validMaster = true;
                    $this->DbMasterFilter = "";
                    $this->DbDetailFilter = "";
            }
            if ($masterTblVar == "patient_opd_follow_up") {
                $validMaster = true;
                $masterTbl = Container("patient_opd_follow_up");
                if (($parm = Post("fk_PatientId", Post("pid"))) !== null) {
                    $masterTbl->PatientId->setFormValue($parm);
                    $this->pid->setFormValue($masterTbl->PatientId->FormValue);
                    $this->pid->setSessionValue($this->pid->FormValue);
                    if (!is_numeric($masterTbl->PatientId->FormValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
                if (($parm = Post("fk_id", Post("fid"))) !== null) {
                    $masterTbl->id->setFormValue($parm);
                    $this->fid->setFormValue($masterTbl->id->FormValue);
                    $this->fid->setSessionValue($this->fid->FormValue);
                    if (!is_numeric($masterTbl->id->FormValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
            }
        }
        if ($validMaster) {
            // Save current master table
            $this->setCurrentMasterTable($masterTblVar);

            // Reset start record counter (new master key)
            if (!$this->isAddOrEdit()) {
                $this->StartRecord = 1;
                $this->setStartRecordNumber($this->StartRecord);
            }

            // Clear previous master key from Session
            if ($masterTblVar != "patient_opd_follow_up") {
                if ($this->pid->CurrentValue == "") {
                    $this->pid->setSessionValue("");
                }
                if ($this->fid->CurrentValue == "") {
                    $this->fid->setSessionValue("");
                }
            }
        }
        $this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
        $this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PatientAnRegistrationList"), "", $this->TableVar, true);
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
                case "x_MenstrualHistory":
                    break;
                case "x_PreviousHistoryofGDM":
                    break;
                case "x_PreviousHistorofPIH":
                    break;
                case "x_PreviousHistoryofIUGR":
                    break;
                case "x_PreviousHistoryofOligohydramnios":
                    break;
                case "x_PreviousHistoryofPreterm":
                    break;
                case "x_PastMedicalHistory":
                    break;
                case "x_PastSurgicalHistory":
                    break;
                case "x_FamilyHistory":
                    break;
                case "x_Bleeding":
                    break;
                case "x_Miscarriage":
                    break;
                case "x_ModeOfDelivery":
                    break;
                case "x_NDS":
                    break;
                case "x_NDP":
                    break;
                case "x_VaccumS":
                    break;
                case "x_VaccumP":
                    break;
                case "x_ForcepsS":
                    break;
                case "x_ForcepsP":
                    break;
                case "x_ElectiveS":
                    break;
                case "x_ElectiveP":
                    break;
                case "x_EmergencyS":
                    break;
                case "x_EmergencyP":
                    break;
                case "x_Maturity":
                    break;
                case "x_SpillOverReasons":
                    break;
                case "x_ANClosed":
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
