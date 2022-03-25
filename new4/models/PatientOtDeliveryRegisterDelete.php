<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PatientOtDeliveryRegisterDelete extends PatientOtDeliveryRegister
{
    use MessagesTrait;

    // Page ID
    public $PageID = "delete";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'patient_ot_delivery_register';

    // Page object name
    public $PageObjName = "PatientOtDeliveryRegisterDelete";

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

        // Table object (patient_ot_delivery_register)
        if (!isset($GLOBALS["patient_ot_delivery_register"]) || get_class($GLOBALS["patient_ot_delivery_register"]) == PROJECT_NAMESPACE . "patient_ot_delivery_register") {
            $GLOBALS["patient_ot_delivery_register"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_ot_delivery_register');
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
                $doc = new $class(Container("patient_ot_delivery_register"));
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
        $this->PatID->setVisibility();
        $this->PatientName->setVisibility();
        $this->mrnno->setVisibility();
        $this->MobileNumber->setVisibility();
        $this->Age->setVisibility();
        $this->Gender->setVisibility();
        $this->profilePic->Visible = false;
        $this->ObstetricsHistryMale->Visible = false;
        $this->ObstetricsHistryFeMale->setVisibility();
        $this->Abortion->setVisibility();
        $this->ChildBirthDate->setVisibility();
        $this->ChildBirthTime->setVisibility();
        $this->ChildSex->setVisibility();
        $this->ChildWt->setVisibility();
        $this->ChildDay->setVisibility();
        $this->ChildOE->setVisibility();
        $this->TypeofDelivery->Visible = false;
        $this->ChildBlGrp->setVisibility();
        $this->ApgarScore->setVisibility();
        $this->birthnotification->setVisibility();
        $this->formno->setVisibility();
        $this->dte->setVisibility();
        $this->motherReligion->setVisibility();
        $this->bloodgroup->setVisibility();
        $this->status->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->PatientID->setVisibility();
        $this->HospID->setVisibility();
        $this->ChildBirthDate1->setVisibility();
        $this->ChildBirthTime1->setVisibility();
        $this->ChildSex1->setVisibility();
        $this->ChildWt1->setVisibility();
        $this->ChildDay1->setVisibility();
        $this->ChildOE1->setVisibility();
        $this->TypeofDelivery1->Visible = false;
        $this->ChildBlGrp1->setVisibility();
        $this->ApgarScore1->setVisibility();
        $this->birthnotification1->setVisibility();
        $this->formno1->setVisibility();
        $this->proposedSurgery->Visible = false;
        $this->surgeryProcedure->Visible = false;
        $this->typeOfAnaesthesia->Visible = false;
        $this->RecievedTime->setVisibility();
        $this->AnaesthesiaStarted->setVisibility();
        $this->AnaesthesiaEnded->setVisibility();
        $this->surgeryStarted->setVisibility();
        $this->surgeryEnded->setVisibility();
        $this->RecoveryTime->setVisibility();
        $this->ShiftedTime->setVisibility();
        $this->Duration->setVisibility();
        $this->DrVisit1->Visible = false;
        $this->DrVisit2->Visible = false;
        $this->DrVisit3->Visible = false;
        $this->DrVisit4->Visible = false;
        $this->Surgeon->setVisibility();
        $this->Anaesthetist->setVisibility();
        $this->AsstSurgeon1->setVisibility();
        $this->AsstSurgeon2->setVisibility();
        $this->paediatric->setVisibility();
        $this->ScrubNurse1->setVisibility();
        $this->ScrubNurse2->setVisibility();
        $this->FloorNurse->setVisibility();
        $this->Technician->setVisibility();
        $this->HouseKeeping->setVisibility();
        $this->countsCheckedMops->setVisibility();
        $this->gauze->setVisibility();
        $this->needles->setVisibility();
        $this->bloodloss->setVisibility();
        $this->bloodtransfusion->setVisibility();
        $this->implantsUsed->Visible = false;
        $this->MaterialsForHPE->Visible = false;
        $this->Reception->setVisibility();
        $this->PId->setVisibility();
        $this->PatientSearch->Visible = false;
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
        $this->setupLookupOptions($this->DrVisit1);
        $this->setupLookupOptions($this->DrVisit2);
        $this->setupLookupOptions($this->DrVisit3);
        $this->setupLookupOptions($this->DrVisit4);
        $this->setupLookupOptions($this->Surgeon);
        $this->setupLookupOptions($this->Anaesthetist);
        $this->setupLookupOptions($this->AsstSurgeon1);
        $this->setupLookupOptions($this->AsstSurgeon2);
        $this->setupLookupOptions($this->paediatric);
        $this->setupLookupOptions($this->PatientSearch);

        // Set up master/detail parameters
        $this->setupMasterParms();

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Load key parameters
        $this->RecKeys = $this->getRecordKeys(); // Load record keys
        $filter = $this->getFilterFromRecordKeys();
        if ($filter == "") {
            $this->terminate("PatientOtDeliveryRegisterList"); // Prevent SQL injection, return to list
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
                $this->terminate("PatientOtDeliveryRegisterList"); // Return to list
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
        $this->PatID->setDbValue($row['PatID']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->MobileNumber->setDbValue($row['MobileNumber']);
        $this->Age->setDbValue($row['Age']);
        $this->Gender->setDbValue($row['Gender']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->ObstetricsHistryMale->setDbValue($row['ObstetricsHistryMale']);
        $this->ObstetricsHistryFeMale->setDbValue($row['ObstetricsHistryFeMale']);
        $this->Abortion->setDbValue($row['Abortion']);
        $this->ChildBirthDate->setDbValue($row['ChildBirthDate']);
        $this->ChildBirthTime->setDbValue($row['ChildBirthTime']);
        $this->ChildSex->setDbValue($row['ChildSex']);
        $this->ChildWt->setDbValue($row['ChildWt']);
        $this->ChildDay->setDbValue($row['ChildDay']);
        $this->ChildOE->setDbValue($row['ChildOE']);
        $this->TypeofDelivery->setDbValue($row['TypeofDelivery']);
        $this->ChildBlGrp->setDbValue($row['ChildBlGrp']);
        $this->ApgarScore->setDbValue($row['ApgarScore']);
        $this->birthnotification->setDbValue($row['birthnotification']);
        $this->formno->setDbValue($row['formno']);
        $this->dte->setDbValue($row['dte']);
        $this->motherReligion->setDbValue($row['motherReligion']);
        $this->bloodgroup->setDbValue($row['bloodgroup']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->PatientID->setDbValue($row['PatientID']);
        $this->HospID->setDbValue($row['HospID']);
        $this->ChildBirthDate1->setDbValue($row['ChildBirthDate1']);
        $this->ChildBirthTime1->setDbValue($row['ChildBirthTime1']);
        $this->ChildSex1->setDbValue($row['ChildSex1']);
        $this->ChildWt1->setDbValue($row['ChildWt1']);
        $this->ChildDay1->setDbValue($row['ChildDay1']);
        $this->ChildOE1->setDbValue($row['ChildOE1']);
        $this->TypeofDelivery1->setDbValue($row['TypeofDelivery1']);
        $this->ChildBlGrp1->setDbValue($row['ChildBlGrp1']);
        $this->ApgarScore1->setDbValue($row['ApgarScore1']);
        $this->birthnotification1->setDbValue($row['birthnotification1']);
        $this->formno1->setDbValue($row['formno1']);
        $this->proposedSurgery->setDbValue($row['proposedSurgery']);
        $this->surgeryProcedure->setDbValue($row['surgeryProcedure']);
        $this->typeOfAnaesthesia->setDbValue($row['typeOfAnaesthesia']);
        $this->RecievedTime->setDbValue($row['RecievedTime']);
        $this->AnaesthesiaStarted->setDbValue($row['AnaesthesiaStarted']);
        $this->AnaesthesiaEnded->setDbValue($row['AnaesthesiaEnded']);
        $this->surgeryStarted->setDbValue($row['surgeryStarted']);
        $this->surgeryEnded->setDbValue($row['surgeryEnded']);
        $this->RecoveryTime->setDbValue($row['RecoveryTime']);
        $this->ShiftedTime->setDbValue($row['ShiftedTime']);
        $this->Duration->setDbValue($row['Duration']);
        $this->DrVisit1->setDbValue($row['DrVisit1']);
        $this->DrVisit2->setDbValue($row['DrVisit2']);
        $this->DrVisit3->setDbValue($row['DrVisit3']);
        $this->DrVisit4->setDbValue($row['DrVisit4']);
        $this->Surgeon->setDbValue($row['Surgeon']);
        $this->Anaesthetist->setDbValue($row['Anaesthetist']);
        $this->AsstSurgeon1->setDbValue($row['AsstSurgeon1']);
        $this->AsstSurgeon2->setDbValue($row['AsstSurgeon2']);
        $this->paediatric->setDbValue($row['paediatric']);
        $this->ScrubNurse1->setDbValue($row['ScrubNurse1']);
        $this->ScrubNurse2->setDbValue($row['ScrubNurse2']);
        $this->FloorNurse->setDbValue($row['FloorNurse']);
        $this->Technician->setDbValue($row['Technician']);
        $this->HouseKeeping->setDbValue($row['HouseKeeping']);
        $this->countsCheckedMops->setDbValue($row['countsCheckedMops']);
        $this->gauze->setDbValue($row['gauze']);
        $this->needles->setDbValue($row['needles']);
        $this->bloodloss->setDbValue($row['bloodloss']);
        $this->bloodtransfusion->setDbValue($row['bloodtransfusion']);
        $this->implantsUsed->setDbValue($row['implantsUsed']);
        $this->MaterialsForHPE->setDbValue($row['MaterialsForHPE']);
        $this->Reception->setDbValue($row['Reception']);
        $this->PId->setDbValue($row['PId']);
        $this->PatientSearch->setDbValue($row['PatientSearch']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['PatID'] = null;
        $row['PatientName'] = null;
        $row['mrnno'] = null;
        $row['MobileNumber'] = null;
        $row['Age'] = null;
        $row['Gender'] = null;
        $row['profilePic'] = null;
        $row['ObstetricsHistryMale'] = null;
        $row['ObstetricsHistryFeMale'] = null;
        $row['Abortion'] = null;
        $row['ChildBirthDate'] = null;
        $row['ChildBirthTime'] = null;
        $row['ChildSex'] = null;
        $row['ChildWt'] = null;
        $row['ChildDay'] = null;
        $row['ChildOE'] = null;
        $row['TypeofDelivery'] = null;
        $row['ChildBlGrp'] = null;
        $row['ApgarScore'] = null;
        $row['birthnotification'] = null;
        $row['formno'] = null;
        $row['dte'] = null;
        $row['motherReligion'] = null;
        $row['bloodgroup'] = null;
        $row['status'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['PatientID'] = null;
        $row['HospID'] = null;
        $row['ChildBirthDate1'] = null;
        $row['ChildBirthTime1'] = null;
        $row['ChildSex1'] = null;
        $row['ChildWt1'] = null;
        $row['ChildDay1'] = null;
        $row['ChildOE1'] = null;
        $row['TypeofDelivery1'] = null;
        $row['ChildBlGrp1'] = null;
        $row['ApgarScore1'] = null;
        $row['birthnotification1'] = null;
        $row['formno1'] = null;
        $row['proposedSurgery'] = null;
        $row['surgeryProcedure'] = null;
        $row['typeOfAnaesthesia'] = null;
        $row['RecievedTime'] = null;
        $row['AnaesthesiaStarted'] = null;
        $row['AnaesthesiaEnded'] = null;
        $row['surgeryStarted'] = null;
        $row['surgeryEnded'] = null;
        $row['RecoveryTime'] = null;
        $row['ShiftedTime'] = null;
        $row['Duration'] = null;
        $row['DrVisit1'] = null;
        $row['DrVisit2'] = null;
        $row['DrVisit3'] = null;
        $row['DrVisit4'] = null;
        $row['Surgeon'] = null;
        $row['Anaesthetist'] = null;
        $row['AsstSurgeon1'] = null;
        $row['AsstSurgeon2'] = null;
        $row['paediatric'] = null;
        $row['ScrubNurse1'] = null;
        $row['ScrubNurse2'] = null;
        $row['FloorNurse'] = null;
        $row['Technician'] = null;
        $row['HouseKeeping'] = null;
        $row['countsCheckedMops'] = null;
        $row['gauze'] = null;
        $row['needles'] = null;
        $row['bloodloss'] = null;
        $row['bloodtransfusion'] = null;
        $row['implantsUsed'] = null;
        $row['MaterialsForHPE'] = null;
        $row['Reception'] = null;
        $row['PId'] = null;
        $row['PatientSearch'] = null;
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

        // PatID

        // PatientName

        // mrnno

        // MobileNumber

        // Age

        // Gender

        // profilePic

        // ObstetricsHistryMale

        // ObstetricsHistryFeMale

        // Abortion

        // ChildBirthDate

        // ChildBirthTime

        // ChildSex

        // ChildWt

        // ChildDay

        // ChildOE

        // TypeofDelivery

        // ChildBlGrp

        // ApgarScore

        // birthnotification

        // formno

        // dte

        // motherReligion

        // bloodgroup

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // PatientID

        // HospID

        // ChildBirthDate1

        // ChildBirthTime1

        // ChildSex1

        // ChildWt1

        // ChildDay1

        // ChildOE1

        // TypeofDelivery1

        // ChildBlGrp1

        // ApgarScore1

        // birthnotification1

        // formno1

        // proposedSurgery

        // surgeryProcedure

        // typeOfAnaesthesia

        // RecievedTime

        // AnaesthesiaStarted

        // AnaesthesiaEnded

        // surgeryStarted

        // surgeryEnded

        // RecoveryTime

        // ShiftedTime

        // Duration

        // DrVisit1

        // DrVisit2

        // DrVisit3

        // DrVisit4

        // Surgeon

        // Anaesthetist

        // AsstSurgeon1

        // AsstSurgeon2

        // paediatric

        // ScrubNurse1

        // ScrubNurse2

        // FloorNurse

        // Technician

        // HouseKeeping

        // countsCheckedMops

        // gauze

        // needles

        // bloodloss

        // bloodtransfusion

        // implantsUsed

        // MaterialsForHPE

        // Reception

        // PId

        // PatientSearch
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // PatID
            $this->PatID->ViewValue = $this->PatID->CurrentValue;
            $this->PatID->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // MobileNumber
            $this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
            $this->MobileNumber->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // Gender
            $this->Gender->ViewValue = $this->Gender->CurrentValue;
            $this->Gender->ViewCustomAttributes = "";

            // ObstetricsHistryFeMale
            $this->ObstetricsHistryFeMale->ViewValue = $this->ObstetricsHistryFeMale->CurrentValue;
            $this->ObstetricsHistryFeMale->ViewCustomAttributes = "";

            // Abortion
            $this->Abortion->ViewValue = $this->Abortion->CurrentValue;
            $this->Abortion->ViewCustomAttributes = "";

            // ChildBirthDate
            $this->ChildBirthDate->ViewValue = $this->ChildBirthDate->CurrentValue;
            $this->ChildBirthDate->ViewValue = FormatDateTime($this->ChildBirthDate->ViewValue, 7);
            $this->ChildBirthDate->ViewCustomAttributes = "";

            // ChildBirthTime
            $this->ChildBirthTime->ViewValue = $this->ChildBirthTime->CurrentValue;
            $this->ChildBirthTime->ViewCustomAttributes = "";

            // ChildSex
            $this->ChildSex->ViewValue = $this->ChildSex->CurrentValue;
            $this->ChildSex->ViewCustomAttributes = "";

            // ChildWt
            $this->ChildWt->ViewValue = $this->ChildWt->CurrentValue;
            $this->ChildWt->ViewCustomAttributes = "";

            // ChildDay
            $this->ChildDay->ViewValue = $this->ChildDay->CurrentValue;
            $this->ChildDay->ViewCustomAttributes = "";

            // ChildOE
            $this->ChildOE->ViewValue = $this->ChildOE->CurrentValue;
            $this->ChildOE->ViewCustomAttributes = "";

            // ChildBlGrp
            $this->ChildBlGrp->ViewValue = $this->ChildBlGrp->CurrentValue;
            $this->ChildBlGrp->ViewCustomAttributes = "";

            // ApgarScore
            $this->ApgarScore->ViewValue = $this->ApgarScore->CurrentValue;
            $this->ApgarScore->ViewCustomAttributes = "";

            // birthnotification
            $this->birthnotification->ViewValue = $this->birthnotification->CurrentValue;
            $this->birthnotification->ViewCustomAttributes = "";

            // formno
            $this->formno->ViewValue = $this->formno->CurrentValue;
            $this->formno->ViewCustomAttributes = "";

            // dte
            $this->dte->ViewValue = $this->dte->CurrentValue;
            $this->dte->ViewValue = FormatDateTime($this->dte->ViewValue, 0);
            $this->dte->ViewCustomAttributes = "";

            // motherReligion
            $this->motherReligion->ViewValue = $this->motherReligion->CurrentValue;
            $this->motherReligion->ViewCustomAttributes = "";

            // bloodgroup
            $this->bloodgroup->ViewValue = $this->bloodgroup->CurrentValue;
            $this->bloodgroup->ViewCustomAttributes = "";

            // status
            $this->status->ViewValue = $this->status->CurrentValue;
            $this->status->ViewValue = FormatNumber($this->status->ViewValue, 0, -2, -2, -2);
            $this->status->ViewCustomAttributes = "";

            // createdby
            $this->createdby->ViewValue = $this->createdby->CurrentValue;
            $this->createdby->ViewValue = FormatNumber($this->createdby->ViewValue, 0, -2, -2, -2);
            $this->createdby->ViewCustomAttributes = "";

            // createddatetime
            $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
            $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
            $this->createddatetime->ViewCustomAttributes = "";

            // modifiedby
            $this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
            $this->modifiedby->ViewValue = FormatNumber($this->modifiedby->ViewValue, 0, -2, -2, -2);
            $this->modifiedby->ViewCustomAttributes = "";

            // modifieddatetime
            $this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
            $this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
            $this->modifieddatetime->ViewCustomAttributes = "";

            // PatientID
            $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
            $this->PatientID->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewCustomAttributes = "";

            // ChildBirthDate1
            $this->ChildBirthDate1->ViewValue = $this->ChildBirthDate1->CurrentValue;
            $this->ChildBirthDate1->ViewValue = FormatDateTime($this->ChildBirthDate1->ViewValue, 0);
            $this->ChildBirthDate1->ViewCustomAttributes = "";

            // ChildBirthTime1
            $this->ChildBirthTime1->ViewValue = $this->ChildBirthTime1->CurrentValue;
            $this->ChildBirthTime1->ViewCustomAttributes = "";

            // ChildSex1
            $this->ChildSex1->ViewValue = $this->ChildSex1->CurrentValue;
            $this->ChildSex1->ViewCustomAttributes = "";

            // ChildWt1
            $this->ChildWt1->ViewValue = $this->ChildWt1->CurrentValue;
            $this->ChildWt1->ViewCustomAttributes = "";

            // ChildDay1
            $this->ChildDay1->ViewValue = $this->ChildDay1->CurrentValue;
            $this->ChildDay1->ViewCustomAttributes = "";

            // ChildOE1
            $this->ChildOE1->ViewValue = $this->ChildOE1->CurrentValue;
            $this->ChildOE1->ViewCustomAttributes = "";

            // ChildBlGrp1
            $this->ChildBlGrp1->ViewValue = $this->ChildBlGrp1->CurrentValue;
            $this->ChildBlGrp1->ViewCustomAttributes = "";

            // ApgarScore1
            $this->ApgarScore1->ViewValue = $this->ApgarScore1->CurrentValue;
            $this->ApgarScore1->ViewCustomAttributes = "";

            // birthnotification1
            $this->birthnotification1->ViewValue = $this->birthnotification1->CurrentValue;
            $this->birthnotification1->ViewCustomAttributes = "";

            // formno1
            $this->formno1->ViewValue = $this->formno1->CurrentValue;
            $this->formno1->ViewCustomAttributes = "";

            // RecievedTime
            $this->RecievedTime->ViewValue = $this->RecievedTime->CurrentValue;
            $this->RecievedTime->ViewValue = FormatDateTime($this->RecievedTime->ViewValue, 11);
            $this->RecievedTime->ViewCustomAttributes = "";

            // AnaesthesiaStarted
            $this->AnaesthesiaStarted->ViewValue = $this->AnaesthesiaStarted->CurrentValue;
            $this->AnaesthesiaStarted->ViewValue = FormatDateTime($this->AnaesthesiaStarted->ViewValue, 11);
            $this->AnaesthesiaStarted->ViewCustomAttributes = "";

            // AnaesthesiaEnded
            $this->AnaesthesiaEnded->ViewValue = $this->AnaesthesiaEnded->CurrentValue;
            $this->AnaesthesiaEnded->ViewValue = FormatDateTime($this->AnaesthesiaEnded->ViewValue, 11);
            $this->AnaesthesiaEnded->ViewCustomAttributes = "";

            // surgeryStarted
            $this->surgeryStarted->ViewValue = $this->surgeryStarted->CurrentValue;
            $this->surgeryStarted->ViewValue = FormatDateTime($this->surgeryStarted->ViewValue, 11);
            $this->surgeryStarted->ViewCustomAttributes = "";

            // surgeryEnded
            $this->surgeryEnded->ViewValue = $this->surgeryEnded->CurrentValue;
            $this->surgeryEnded->ViewValue = FormatDateTime($this->surgeryEnded->ViewValue, 11);
            $this->surgeryEnded->ViewCustomAttributes = "";

            // RecoveryTime
            $this->RecoveryTime->ViewValue = $this->RecoveryTime->CurrentValue;
            $this->RecoveryTime->ViewValue = FormatDateTime($this->RecoveryTime->ViewValue, 11);
            $this->RecoveryTime->ViewCustomAttributes = "";

            // ShiftedTime
            $this->ShiftedTime->ViewValue = $this->ShiftedTime->CurrentValue;
            $this->ShiftedTime->ViewValue = FormatDateTime($this->ShiftedTime->ViewValue, 11);
            $this->ShiftedTime->ViewCustomAttributes = "";

            // Duration
            $this->Duration->ViewValue = $this->Duration->CurrentValue;
            $this->Duration->ViewCustomAttributes = "";

            // Surgeon
            $this->Surgeon->ViewValue = $this->Surgeon->CurrentValue;
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

            // Anaesthetist
            $this->Anaesthetist->ViewValue = $this->Anaesthetist->CurrentValue;
            $curVal = trim(strval($this->Anaesthetist->CurrentValue));
            if ($curVal != "") {
                $this->Anaesthetist->ViewValue = $this->Anaesthetist->lookupCacheOption($curVal);
                if ($this->Anaesthetist->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Anaesthetist->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Anaesthetist->Lookup->renderViewRow($rswrk[0]);
                        $this->Anaesthetist->ViewValue = $this->Anaesthetist->displayValue($arwrk);
                    } else {
                        $this->Anaesthetist->ViewValue = $this->Anaesthetist->CurrentValue;
                    }
                }
            } else {
                $this->Anaesthetist->ViewValue = null;
            }
            $this->Anaesthetist->ViewCustomAttributes = "";

            // AsstSurgeon1
            $this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->CurrentValue;
            $curVal = trim(strval($this->AsstSurgeon1->CurrentValue));
            if ($curVal != "") {
                $this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->lookupCacheOption($curVal);
                if ($this->AsstSurgeon1->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->AsstSurgeon1->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->AsstSurgeon1->Lookup->renderViewRow($rswrk[0]);
                        $this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->displayValue($arwrk);
                    } else {
                        $this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->CurrentValue;
                    }
                }
            } else {
                $this->AsstSurgeon1->ViewValue = null;
            }
            $this->AsstSurgeon1->ViewCustomAttributes = "";

            // AsstSurgeon2
            $this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->CurrentValue;
            $curVal = trim(strval($this->AsstSurgeon2->CurrentValue));
            if ($curVal != "") {
                $this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->lookupCacheOption($curVal);
                if ($this->AsstSurgeon2->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->AsstSurgeon2->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->AsstSurgeon2->Lookup->renderViewRow($rswrk[0]);
                        $this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->displayValue($arwrk);
                    } else {
                        $this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->CurrentValue;
                    }
                }
            } else {
                $this->AsstSurgeon2->ViewValue = null;
            }
            $this->AsstSurgeon2->ViewCustomAttributes = "";

            // paediatric
            $this->paediatric->ViewValue = $this->paediatric->CurrentValue;
            $curVal = trim(strval($this->paediatric->CurrentValue));
            if ($curVal != "") {
                $this->paediatric->ViewValue = $this->paediatric->lookupCacheOption($curVal);
                if ($this->paediatric->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->paediatric->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->paediatric->Lookup->renderViewRow($rswrk[0]);
                        $this->paediatric->ViewValue = $this->paediatric->displayValue($arwrk);
                    } else {
                        $this->paediatric->ViewValue = $this->paediatric->CurrentValue;
                    }
                }
            } else {
                $this->paediatric->ViewValue = null;
            }
            $this->paediatric->ViewCustomAttributes = "";

            // ScrubNurse1
            $this->ScrubNurse1->ViewValue = $this->ScrubNurse1->CurrentValue;
            $this->ScrubNurse1->ViewCustomAttributes = "";

            // ScrubNurse2
            $this->ScrubNurse2->ViewValue = $this->ScrubNurse2->CurrentValue;
            $this->ScrubNurse2->ViewCustomAttributes = "";

            // FloorNurse
            $this->FloorNurse->ViewValue = $this->FloorNurse->CurrentValue;
            $this->FloorNurse->ViewCustomAttributes = "";

            // Technician
            $this->Technician->ViewValue = $this->Technician->CurrentValue;
            $this->Technician->ViewCustomAttributes = "";

            // HouseKeeping
            $this->HouseKeeping->ViewValue = $this->HouseKeeping->CurrentValue;
            $this->HouseKeeping->ViewCustomAttributes = "";

            // countsCheckedMops
            $this->countsCheckedMops->ViewValue = $this->countsCheckedMops->CurrentValue;
            $this->countsCheckedMops->ViewCustomAttributes = "";

            // gauze
            $this->gauze->ViewValue = $this->gauze->CurrentValue;
            $this->gauze->ViewCustomAttributes = "";

            // needles
            $this->needles->ViewValue = $this->needles->CurrentValue;
            $this->needles->ViewCustomAttributes = "";

            // bloodloss
            $this->bloodloss->ViewValue = $this->bloodloss->CurrentValue;
            $this->bloodloss->ViewCustomAttributes = "";

            // bloodtransfusion
            $this->bloodtransfusion->ViewValue = $this->bloodtransfusion->CurrentValue;
            $this->bloodtransfusion->ViewCustomAttributes = "";

            // Reception
            $this->Reception->ViewValue = $this->Reception->CurrentValue;
            $this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
            $this->Reception->ViewCustomAttributes = "";

            // PId
            $this->PId->ViewValue = $this->PId->CurrentValue;
            $this->PId->ViewValue = FormatNumber($this->PId->ViewValue, 0, -2, -2, -2);
            $this->PId->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";
            $this->PatID->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
            $this->mrnno->TooltipValue = "";

            // MobileNumber
            $this->MobileNumber->LinkCustomAttributes = "";
            $this->MobileNumber->HrefValue = "";
            $this->MobileNumber->TooltipValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";
            $this->Age->TooltipValue = "";

            // Gender
            $this->Gender->LinkCustomAttributes = "";
            $this->Gender->HrefValue = "";
            $this->Gender->TooltipValue = "";

            // ObstetricsHistryFeMale
            $this->ObstetricsHistryFeMale->LinkCustomAttributes = "";
            $this->ObstetricsHistryFeMale->HrefValue = "";
            $this->ObstetricsHistryFeMale->TooltipValue = "";

            // Abortion
            $this->Abortion->LinkCustomAttributes = "";
            $this->Abortion->HrefValue = "";
            $this->Abortion->TooltipValue = "";

            // ChildBirthDate
            $this->ChildBirthDate->LinkCustomAttributes = "";
            $this->ChildBirthDate->HrefValue = "";
            $this->ChildBirthDate->TooltipValue = "";

            // ChildBirthTime
            $this->ChildBirthTime->LinkCustomAttributes = "";
            $this->ChildBirthTime->HrefValue = "";
            $this->ChildBirthTime->TooltipValue = "";

            // ChildSex
            $this->ChildSex->LinkCustomAttributes = "";
            $this->ChildSex->HrefValue = "";
            $this->ChildSex->TooltipValue = "";

            // ChildWt
            $this->ChildWt->LinkCustomAttributes = "";
            $this->ChildWt->HrefValue = "";
            $this->ChildWt->TooltipValue = "";

            // ChildDay
            $this->ChildDay->LinkCustomAttributes = "";
            $this->ChildDay->HrefValue = "";
            $this->ChildDay->TooltipValue = "";

            // ChildOE
            $this->ChildOE->LinkCustomAttributes = "";
            $this->ChildOE->HrefValue = "";
            $this->ChildOE->TooltipValue = "";

            // ChildBlGrp
            $this->ChildBlGrp->LinkCustomAttributes = "";
            $this->ChildBlGrp->HrefValue = "";
            $this->ChildBlGrp->TooltipValue = "";

            // ApgarScore
            $this->ApgarScore->LinkCustomAttributes = "";
            $this->ApgarScore->HrefValue = "";
            $this->ApgarScore->TooltipValue = "";

            // birthnotification
            $this->birthnotification->LinkCustomAttributes = "";
            $this->birthnotification->HrefValue = "";
            $this->birthnotification->TooltipValue = "";

            // formno
            $this->formno->LinkCustomAttributes = "";
            $this->formno->HrefValue = "";
            $this->formno->TooltipValue = "";

            // dte
            $this->dte->LinkCustomAttributes = "";
            $this->dte->HrefValue = "";
            $this->dte->TooltipValue = "";

            // motherReligion
            $this->motherReligion->LinkCustomAttributes = "";
            $this->motherReligion->HrefValue = "";
            $this->motherReligion->TooltipValue = "";

            // bloodgroup
            $this->bloodgroup->LinkCustomAttributes = "";
            $this->bloodgroup->HrefValue = "";
            $this->bloodgroup->TooltipValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";
            $this->status->TooltipValue = "";

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

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";
            $this->PatientID->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // ChildBirthDate1
            $this->ChildBirthDate1->LinkCustomAttributes = "";
            $this->ChildBirthDate1->HrefValue = "";
            $this->ChildBirthDate1->TooltipValue = "";

            // ChildBirthTime1
            $this->ChildBirthTime1->LinkCustomAttributes = "";
            $this->ChildBirthTime1->HrefValue = "";
            $this->ChildBirthTime1->TooltipValue = "";

            // ChildSex1
            $this->ChildSex1->LinkCustomAttributes = "";
            $this->ChildSex1->HrefValue = "";
            $this->ChildSex1->TooltipValue = "";

            // ChildWt1
            $this->ChildWt1->LinkCustomAttributes = "";
            $this->ChildWt1->HrefValue = "";
            $this->ChildWt1->TooltipValue = "";

            // ChildDay1
            $this->ChildDay1->LinkCustomAttributes = "";
            $this->ChildDay1->HrefValue = "";
            $this->ChildDay1->TooltipValue = "";

            // ChildOE1
            $this->ChildOE1->LinkCustomAttributes = "";
            $this->ChildOE1->HrefValue = "";
            $this->ChildOE1->TooltipValue = "";

            // ChildBlGrp1
            $this->ChildBlGrp1->LinkCustomAttributes = "";
            $this->ChildBlGrp1->HrefValue = "";
            $this->ChildBlGrp1->TooltipValue = "";

            // ApgarScore1
            $this->ApgarScore1->LinkCustomAttributes = "";
            $this->ApgarScore1->HrefValue = "";
            $this->ApgarScore1->TooltipValue = "";

            // birthnotification1
            $this->birthnotification1->LinkCustomAttributes = "";
            $this->birthnotification1->HrefValue = "";
            $this->birthnotification1->TooltipValue = "";

            // formno1
            $this->formno1->LinkCustomAttributes = "";
            $this->formno1->HrefValue = "";
            $this->formno1->TooltipValue = "";

            // RecievedTime
            $this->RecievedTime->LinkCustomAttributes = "";
            $this->RecievedTime->HrefValue = "";
            $this->RecievedTime->TooltipValue = "";

            // AnaesthesiaStarted
            $this->AnaesthesiaStarted->LinkCustomAttributes = "";
            $this->AnaesthesiaStarted->HrefValue = "";
            $this->AnaesthesiaStarted->TooltipValue = "";

            // AnaesthesiaEnded
            $this->AnaesthesiaEnded->LinkCustomAttributes = "";
            $this->AnaesthesiaEnded->HrefValue = "";
            $this->AnaesthesiaEnded->TooltipValue = "";

            // surgeryStarted
            $this->surgeryStarted->LinkCustomAttributes = "";
            $this->surgeryStarted->HrefValue = "";
            $this->surgeryStarted->TooltipValue = "";

            // surgeryEnded
            $this->surgeryEnded->LinkCustomAttributes = "";
            $this->surgeryEnded->HrefValue = "";
            $this->surgeryEnded->TooltipValue = "";

            // RecoveryTime
            $this->RecoveryTime->LinkCustomAttributes = "";
            $this->RecoveryTime->HrefValue = "";
            $this->RecoveryTime->TooltipValue = "";

            // ShiftedTime
            $this->ShiftedTime->LinkCustomAttributes = "";
            $this->ShiftedTime->HrefValue = "";
            $this->ShiftedTime->TooltipValue = "";

            // Duration
            $this->Duration->LinkCustomAttributes = "";
            $this->Duration->HrefValue = "";
            $this->Duration->TooltipValue = "";

            // Surgeon
            $this->Surgeon->LinkCustomAttributes = "";
            $this->Surgeon->HrefValue = "";
            $this->Surgeon->TooltipValue = "";

            // Anaesthetist
            $this->Anaesthetist->LinkCustomAttributes = "";
            $this->Anaesthetist->HrefValue = "";
            $this->Anaesthetist->TooltipValue = "";

            // AsstSurgeon1
            $this->AsstSurgeon1->LinkCustomAttributes = "";
            $this->AsstSurgeon1->HrefValue = "";
            $this->AsstSurgeon1->TooltipValue = "";

            // AsstSurgeon2
            $this->AsstSurgeon2->LinkCustomAttributes = "";
            $this->AsstSurgeon2->HrefValue = "";
            $this->AsstSurgeon2->TooltipValue = "";

            // paediatric
            $this->paediatric->LinkCustomAttributes = "";
            $this->paediatric->HrefValue = "";
            $this->paediatric->TooltipValue = "";

            // ScrubNurse1
            $this->ScrubNurse1->LinkCustomAttributes = "";
            $this->ScrubNurse1->HrefValue = "";
            $this->ScrubNurse1->TooltipValue = "";

            // ScrubNurse2
            $this->ScrubNurse2->LinkCustomAttributes = "";
            $this->ScrubNurse2->HrefValue = "";
            $this->ScrubNurse2->TooltipValue = "";

            // FloorNurse
            $this->FloorNurse->LinkCustomAttributes = "";
            $this->FloorNurse->HrefValue = "";
            $this->FloorNurse->TooltipValue = "";

            // Technician
            $this->Technician->LinkCustomAttributes = "";
            $this->Technician->HrefValue = "";
            $this->Technician->TooltipValue = "";

            // HouseKeeping
            $this->HouseKeeping->LinkCustomAttributes = "";
            $this->HouseKeeping->HrefValue = "";
            $this->HouseKeeping->TooltipValue = "";

            // countsCheckedMops
            $this->countsCheckedMops->LinkCustomAttributes = "";
            $this->countsCheckedMops->HrefValue = "";
            $this->countsCheckedMops->TooltipValue = "";

            // gauze
            $this->gauze->LinkCustomAttributes = "";
            $this->gauze->HrefValue = "";
            $this->gauze->TooltipValue = "";

            // needles
            $this->needles->LinkCustomAttributes = "";
            $this->needles->HrefValue = "";
            $this->needles->TooltipValue = "";

            // bloodloss
            $this->bloodloss->LinkCustomAttributes = "";
            $this->bloodloss->HrefValue = "";
            $this->bloodloss->TooltipValue = "";

            // bloodtransfusion
            $this->bloodtransfusion->LinkCustomAttributes = "";
            $this->bloodtransfusion->HrefValue = "";
            $this->bloodtransfusion->TooltipValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->TooltipValue = "";

            // PId
            $this->PId->LinkCustomAttributes = "";
            $this->PId->HrefValue = "";
            $this->PId->TooltipValue = "";
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
            if ($masterTblVar == "ip_admission") {
                $validMaster = true;
                $masterTbl = Container("ip_admission");
                if (($parm = Get("fk_id", Get("Reception"))) !== null) {
                    $masterTbl->id->setQueryStringValue($parm);
                    $this->Reception->setQueryStringValue($masterTbl->id->QueryStringValue);
                    $this->Reception->setSessionValue($this->Reception->QueryStringValue);
                    if (!is_numeric($masterTbl->id->QueryStringValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
                if (($parm = Get("fk_mrnNo", Get("mrnno"))) !== null) {
                    $masterTbl->mrnNo->setQueryStringValue($parm);
                    $this->mrnno->setQueryStringValue($masterTbl->mrnNo->QueryStringValue);
                    $this->mrnno->setSessionValue($this->mrnno->QueryStringValue);
                } else {
                    $validMaster = false;
                }
                if (($parm = Get("fk_patient_id", Get("PId"))) !== null) {
                    $masterTbl->patient_id->setQueryStringValue($parm);
                    $this->PId->setQueryStringValue($masterTbl->patient_id->QueryStringValue);
                    $this->PId->setSessionValue($this->PId->QueryStringValue);
                    if (!is_numeric($masterTbl->patient_id->QueryStringValue)) {
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
            if ($masterTblVar == "ip_admission") {
                $validMaster = true;
                $masterTbl = Container("ip_admission");
                if (($parm = Post("fk_id", Post("Reception"))) !== null) {
                    $masterTbl->id->setFormValue($parm);
                    $this->Reception->setFormValue($masterTbl->id->FormValue);
                    $this->Reception->setSessionValue($this->Reception->FormValue);
                    if (!is_numeric($masterTbl->id->FormValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
                if (($parm = Post("fk_mrnNo", Post("mrnno"))) !== null) {
                    $masterTbl->mrnNo->setFormValue($parm);
                    $this->mrnno->setFormValue($masterTbl->mrnNo->FormValue);
                    $this->mrnno->setSessionValue($this->mrnno->FormValue);
                } else {
                    $validMaster = false;
                }
                if (($parm = Post("fk_patient_id", Post("PId"))) !== null) {
                    $masterTbl->patient_id->setFormValue($parm);
                    $this->PId->setFormValue($masterTbl->patient_id->FormValue);
                    $this->PId->setSessionValue($this->PId->FormValue);
                    if (!is_numeric($masterTbl->patient_id->FormValue)) {
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
            if ($masterTblVar != "ip_admission") {
                if ($this->Reception->CurrentValue == "") {
                    $this->Reception->setSessionValue("");
                }
                if ($this->mrnno->CurrentValue == "") {
                    $this->mrnno->setSessionValue("");
                }
                if ($this->PId->CurrentValue == "") {
                    $this->PId->setSessionValue("");
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PatientOtDeliveryRegisterList"), "", $this->TableVar, true);
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
                case "x_DrVisit1":
                    break;
                case "x_DrVisit2":
                    break;
                case "x_DrVisit3":
                    break;
                case "x_DrVisit4":
                    break;
                case "x_Surgeon":
                    break;
                case "x_Anaesthetist":
                    break;
                case "x_AsstSurgeon1":
                    break;
                case "x_AsstSurgeon2":
                    break;
                case "x_paediatric":
                    break;
                case "x_PatientSearch":
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
