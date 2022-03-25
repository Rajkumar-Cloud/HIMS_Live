<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for patient_vitals
 */
class PatientVitals extends DbTable
{
    protected $SqlFrom = "";
    protected $SqlSelect = null;
    protected $SqlSelectList = null;
    protected $SqlWhere = "";
    protected $SqlGroupBy = "";
    protected $SqlHaving = "";
    protected $SqlOrderBy = "";
    public $UseSessionForListSql = true;

    // Column CSS classes
    public $LeftColumnClass = "col-sm-2 col-form-label ew-label";
    public $RightColumnClass = "col-sm-10";
    public $OffsetColumnClass = "col-sm-10 offset-sm-2";
    public $TableLeftColumnClass = "w-col-2";

    // Export
    public $ExportDoc;

    // Fields
    public $id;
    public $mrnno;
    public $PatientName;
    public $PatID;
    public $MobileNumber;
    public $profilePic;
    public $HT;
    public $WT;
    public $SurfaceArea;
    public $BodyMassIndex;
    public $ClinicalFindings;
    public $ClinicalDiagnosis;
    public $AnticoagulantifAny;
    public $FoodAllergies;
    public $GenericAllergies;
    public $GroupAllergies;
    public $Temp;
    public $Pulse;
    public $BP;
    public $PR;
    public $CNS;
    public $RSA;
    public $CVS;
    public $PA;
    public $PS;
    public $PV;
    public $clinicaldetails;
    public $status;
    public $createdby;
    public $createddatetime;
    public $modifiedby;
    public $modifieddatetime;
    public $Age;
    public $Gender;
    public $PatientSearch;
    public $PatientId;
    public $Reception;
    public $HospID;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'patient_vitals';
        $this->TableName = 'patient_vitals';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`patient_vitals`";
        $this->Dbid = 'DB';
        $this->ExportAll = true;
        $this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
        $this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
        $this->ExportPageSize = "a4"; // Page size (PDF only)
        $this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
        $this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
        $this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
        $this->ExportWordColumnWidth = null; // Cell width (PHPWord only)
        $this->DetailAdd = true; // Allow detail add
        $this->DetailEdit = true; // Allow detail edit
        $this->DetailView = true; // Allow detail view
        $this->ShowMultipleDetails = false; // Show multiple details
        $this->GridAddRowCount = 5;
        $this->AllowAddDeleteRow = true; // Allow add/delete row
        $this->UserIDAllowSecurity = Config("DEFAULT_USER_ID_ALLOW_SECURITY"); // Default User ID allowed permissions
        $this->BasicSearch = new BasicSearch($this->TableVar);

        // id
        $this->id = new DbField('patient_vitals', 'patient_vitals', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // mrnno
        $this->mrnno = new DbField('patient_vitals', 'patient_vitals', 'x_mrnno', 'mrnno', '`mrnno`', '`mrnno`', 200, 45, -1, false, '`mrnno`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->mrnno->IsForeignKey = true; // Foreign key field
        $this->mrnno->Sortable = true; // Allow sort
        $this->mrnno->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->mrnno->Param, "CustomMsg");
        $this->Fields['mrnno'] = &$this->mrnno;

        // PatientName
        $this->PatientName = new DbField('patient_vitals', 'patient_vitals', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, false, '`PatientName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientName->Sortable = true; // Allow sort
        $this->PatientName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientName->Param, "CustomMsg");
        $this->Fields['PatientName'] = &$this->PatientName;

        // PatID
        $this->PatID = new DbField('patient_vitals', 'patient_vitals', 'x_PatID', 'PatID', '`PatID`', '`PatID`', 200, 45, -1, false, '`PatID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatID->Sortable = true; // Allow sort
        $this->PatID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatID->Param, "CustomMsg");
        $this->Fields['PatID'] = &$this->PatID;

        // MobileNumber
        $this->MobileNumber = new DbField('patient_vitals', 'patient_vitals', 'x_MobileNumber', 'MobileNumber', '`MobileNumber`', '`MobileNumber`', 200, 45, -1, false, '`MobileNumber`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MobileNumber->Sortable = true; // Allow sort
        $this->MobileNumber->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MobileNumber->Param, "CustomMsg");
        $this->Fields['MobileNumber'] = &$this->MobileNumber;

        // profilePic
        $this->profilePic = new DbField('patient_vitals', 'patient_vitals', 'x_profilePic', 'profilePic', '`profilePic`', '`profilePic`', 201, 450, -1, false, '`profilePic`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->profilePic->Sortable = true; // Allow sort
        $this->profilePic->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->profilePic->Param, "CustomMsg");
        $this->Fields['profilePic'] = &$this->profilePic;

        // HT
        $this->HT = new DbField('patient_vitals', 'patient_vitals', 'x_HT', 'HT', '`HT`', '`HT`', 200, 45, -1, false, '`HT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HT->Sortable = true; // Allow sort
        $this->HT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HT->Param, "CustomMsg");
        $this->Fields['HT'] = &$this->HT;

        // WT
        $this->WT = new DbField('patient_vitals', 'patient_vitals', 'x_WT', 'WT', '`WT`', '`WT`', 200, 45, -1, false, '`WT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->WT->Sortable = true; // Allow sort
        $this->WT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->WT->Param, "CustomMsg");
        $this->Fields['WT'] = &$this->WT;

        // SurfaceArea
        $this->SurfaceArea = new DbField('patient_vitals', 'patient_vitals', 'x_SurfaceArea', 'SurfaceArea', '`SurfaceArea`', '`SurfaceArea`', 200, 45, -1, false, '`SurfaceArea`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SurfaceArea->Sortable = true; // Allow sort
        $this->SurfaceArea->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SurfaceArea->Param, "CustomMsg");
        $this->Fields['SurfaceArea'] = &$this->SurfaceArea;

        // BodyMassIndex
        $this->BodyMassIndex = new DbField('patient_vitals', 'patient_vitals', 'x_BodyMassIndex', 'BodyMassIndex', '`BodyMassIndex`', '`BodyMassIndex`', 200, 45, -1, false, '`BodyMassIndex`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BodyMassIndex->Sortable = true; // Allow sort
        $this->BodyMassIndex->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BodyMassIndex->Param, "CustomMsg");
        $this->Fields['BodyMassIndex'] = &$this->BodyMassIndex;

        // ClinicalFindings
        $this->ClinicalFindings = new DbField('patient_vitals', 'patient_vitals', 'x_ClinicalFindings', 'ClinicalFindings', '`ClinicalFindings`', '`ClinicalFindings`', 201, 450, -1, false, '`ClinicalFindings`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->ClinicalFindings->Sortable = true; // Allow sort
        $this->ClinicalFindings->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ClinicalFindings->Param, "CustomMsg");
        $this->Fields['ClinicalFindings'] = &$this->ClinicalFindings;

        // ClinicalDiagnosis
        $this->ClinicalDiagnosis = new DbField('patient_vitals', 'patient_vitals', 'x_ClinicalDiagnosis', 'ClinicalDiagnosis', '`ClinicalDiagnosis`', '`ClinicalDiagnosis`', 201, 450, -1, false, '`ClinicalDiagnosis`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->ClinicalDiagnosis->Sortable = true; // Allow sort
        $this->ClinicalDiagnosis->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ClinicalDiagnosis->Param, "CustomMsg");
        $this->Fields['ClinicalDiagnosis'] = &$this->ClinicalDiagnosis;

        // AnticoagulantifAny
        $this->AnticoagulantifAny = new DbField('patient_vitals', 'patient_vitals', 'x_AnticoagulantifAny', 'AnticoagulantifAny', '`AnticoagulantifAny`', '`AnticoagulantifAny`', 200, 45, -1, false, '`AnticoagulantifAny`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AnticoagulantifAny->Sortable = true; // Allow sort
        $this->AnticoagulantifAny->Lookup = new Lookup('AnticoagulantifAny', 'pres_categoryallergy', false, 'Genericname', ["Genericname","","",""], [], [], [], [], [], [], '', '');
        $this->AnticoagulantifAny->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AnticoagulantifAny->Param, "CustomMsg");
        $this->Fields['AnticoagulantifAny'] = &$this->AnticoagulantifAny;

        // FoodAllergies
        $this->FoodAllergies = new DbField('patient_vitals', 'patient_vitals', 'x_FoodAllergies', 'FoodAllergies', '`FoodAllergies`', '`FoodAllergies`', 200, 45, -1, false, '`FoodAllergies`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FoodAllergies->Sortable = true; // Allow sort
        $this->FoodAllergies->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FoodAllergies->Param, "CustomMsg");
        $this->Fields['FoodAllergies'] = &$this->FoodAllergies;

        // GenericAllergies
        $this->GenericAllergies = new DbField('patient_vitals', 'patient_vitals', 'x_GenericAllergies', 'GenericAllergies', '`GenericAllergies`', '`GenericAllergies`', 200, 45, -1, false, '`GenericAllergies`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->GenericAllergies->Sortable = true; // Allow sort
        $this->GenericAllergies->SelectMultiple = true; // Multiple select
        $this->GenericAllergies->Lookup = new Lookup('GenericAllergies', 'pres_categoryallergy', false, 'Genericname', ["Genericname","","",""], [], [], [], [], [], [], '', '');
        $this->GenericAllergies->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GenericAllergies->Param, "CustomMsg");
        $this->Fields['GenericAllergies'] = &$this->GenericAllergies;

        // GroupAllergies
        $this->GroupAllergies = new DbField('patient_vitals', 'patient_vitals', 'x_GroupAllergies', 'GroupAllergies', '`GroupAllergies`', '`GroupAllergies`', 200, 45, -1, false, '`EV__GroupAllergies`', true, true, false, 'FORMATTED TEXT', 'SELECT');
        $this->GroupAllergies->Sortable = true; // Allow sort
        $this->GroupAllergies->SelectMultiple = true; // Multiple select
        $this->GroupAllergies->Lookup = new Lookup('GroupAllergies', 'pres_categoryallergy', false, 'CategoryDrug', ["CategoryDrug","","",""], [], [], [], [], [], [], '', '');
        $this->GroupAllergies->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GroupAllergies->Param, "CustomMsg");
        $this->Fields['GroupAllergies'] = &$this->GroupAllergies;

        // Temp
        $this->Temp = new DbField('patient_vitals', 'patient_vitals', 'x_Temp', 'Temp', '`Temp`', '`Temp`', 200, 45, -1, false, '`Temp`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Temp->Sortable = true; // Allow sort
        $this->Temp->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Temp->Param, "CustomMsg");
        $this->Fields['Temp'] = &$this->Temp;

        // Pulse
        $this->Pulse = new DbField('patient_vitals', 'patient_vitals', 'x_Pulse', 'Pulse', '`Pulse`', '`Pulse`', 200, 45, -1, false, '`Pulse`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Pulse->Sortable = true; // Allow sort
        $this->Pulse->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Pulse->Param, "CustomMsg");
        $this->Fields['Pulse'] = &$this->Pulse;

        // BP
        $this->BP = new DbField('patient_vitals', 'patient_vitals', 'x_BP', 'BP', '`BP`', '`BP`', 200, 45, -1, false, '`BP`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BP->Sortable = true; // Allow sort
        $this->BP->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BP->Param, "CustomMsg");
        $this->Fields['BP'] = &$this->BP;

        // PR
        $this->PR = new DbField('patient_vitals', 'patient_vitals', 'x_PR', 'PR', '`PR`', '`PR`', 200, 45, -1, false, '`PR`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PR->Sortable = true; // Allow sort
        $this->PR->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PR->Param, "CustomMsg");
        $this->Fields['PR'] = &$this->PR;

        // CNS
        $this->CNS = new DbField('patient_vitals', 'patient_vitals', 'x_CNS', 'CNS', '`CNS`', '`CNS`', 200, 45, -1, false, '`CNS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CNS->Sortable = true; // Allow sort
        $this->CNS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CNS->Param, "CustomMsg");
        $this->Fields['CNS'] = &$this->CNS;

        // RSA
        $this->RSA = new DbField('patient_vitals', 'patient_vitals', 'x_RSA', 'RSA', '`RSA`', '`RSA`', 200, 45, -1, false, '`RSA`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RSA->Sortable = true; // Allow sort
        $this->RSA->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RSA->Param, "CustomMsg");
        $this->Fields['RSA'] = &$this->RSA;

        // CVS
        $this->CVS = new DbField('patient_vitals', 'patient_vitals', 'x_CVS', 'CVS', '`CVS`', '`CVS`', 200, 45, -1, false, '`CVS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CVS->Sortable = true; // Allow sort
        $this->CVS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CVS->Param, "CustomMsg");
        $this->Fields['CVS'] = &$this->CVS;

        // PA
        $this->PA = new DbField('patient_vitals', 'patient_vitals', 'x_PA', 'PA', '`PA`', '`PA`', 200, 45, -1, false, '`PA`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PA->Sortable = true; // Allow sort
        $this->PA->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PA->Param, "CustomMsg");
        $this->Fields['PA'] = &$this->PA;

        // PS
        $this->PS = new DbField('patient_vitals', 'patient_vitals', 'x_PS', 'PS', '`PS`', '`PS`', 200, 45, -1, false, '`PS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PS->Sortable = true; // Allow sort
        $this->PS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PS->Param, "CustomMsg");
        $this->Fields['PS'] = &$this->PS;

        // PV
        $this->PV = new DbField('patient_vitals', 'patient_vitals', 'x_PV', 'PV', '`PV`', '`PV`', 200, 45, -1, false, '`PV`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PV->Sortable = true; // Allow sort
        $this->PV->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PV->Param, "CustomMsg");
        $this->Fields['PV'] = &$this->PV;

        // clinicaldetails
        $this->clinicaldetails = new DbField('patient_vitals', 'patient_vitals', 'x_clinicaldetails', 'clinicaldetails', '`clinicaldetails`', '`clinicaldetails`', 200, 45, -1, false, '`clinicaldetails`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->clinicaldetails->Sortable = true; // Allow sort
        $this->clinicaldetails->Lookup = new Lookup('clinicaldetails', 'mas_clinicaldetails', false, 'ClinicalDetails', ["ClinicalDetails","","",""], [], [], [], [], [], [], '', '');
        $this->clinicaldetails->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->clinicaldetails->Param, "CustomMsg");
        $this->Fields['clinicaldetails'] = &$this->clinicaldetails;

        // status
        $this->status = new DbField('patient_vitals', 'patient_vitals', 'x_status', 'status', '`status`', '`status`', 3, 11, -1, false, '`status`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->status->Sortable = true; // Allow sort
        $this->status->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->status->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->status->Lookup = new Lookup('status', 'sys_status', false, 'id', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->status->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->status->Param, "CustomMsg");
        $this->Fields['status'] = &$this->status;

        // createdby
        $this->createdby = new DbField('patient_vitals', 'patient_vitals', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 200, 45, -1, false, '`createdby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdby->Sortable = true; // Allow sort
        $this->createdby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createdby->Param, "CustomMsg");
        $this->Fields['createdby'] = &$this->createdby;

        // createddatetime
        $this->createddatetime = new DbField('patient_vitals', 'patient_vitals', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, false, '`createddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddatetime->Sortable = true; // Allow sort
        $this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->createddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createddatetime->Param, "CustomMsg");
        $this->Fields['createddatetime'] = &$this->createddatetime;

        // modifiedby
        $this->modifiedby = new DbField('patient_vitals', 'patient_vitals', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 200, 45, -1, false, '`modifiedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifiedby->Sortable = true; // Allow sort
        $this->modifiedby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifiedby->Param, "CustomMsg");
        $this->Fields['modifiedby'] = &$this->modifiedby;

        // modifieddatetime
        $this->modifieddatetime = new DbField('patient_vitals', 'patient_vitals', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, false, '`modifieddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifieddatetime->Sortable = true; // Allow sort
        $this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->modifieddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifieddatetime->Param, "CustomMsg");
        $this->Fields['modifieddatetime'] = &$this->modifieddatetime;

        // Age
        $this->Age = new DbField('patient_vitals', 'patient_vitals', 'x_Age', 'Age', '`Age`', '`Age`', 200, 45, -1, false, '`Age`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Age->Sortable = true; // Allow sort
        $this->Age->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Age->Param, "CustomMsg");
        $this->Fields['Age'] = &$this->Age;

        // Gender
        $this->Gender = new DbField('patient_vitals', 'patient_vitals', 'x_Gender', 'Gender', '`Gender`', '`Gender`', 200, 45, -1, false, '`Gender`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Gender->Sortable = true; // Allow sort
        $this->Gender->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Gender->Param, "CustomMsg");
        $this->Fields['Gender'] = &$this->Gender;

        // PatientSearch
        $this->PatientSearch = new DbField('patient_vitals', 'patient_vitals', 'x_PatientSearch', 'PatientSearch', '\'\'', '\'\'', 201, 65530, -1, false, '\'\'', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->PatientSearch->IsCustom = true; // Custom field
        $this->PatientSearch->Sortable = true; // Allow sort
        $this->PatientSearch->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->PatientSearch->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->PatientSearch->Lookup = new Lookup('PatientSearch', 'ip_admission', false, 'id', ["PatientID","patient_name","mobileno","mrnNo"], [], [], [], [], [], [], '`id` DESC', '');
        $this->PatientSearch->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientSearch->Param, "CustomMsg");
        $this->Fields['PatientSearch'] = &$this->PatientSearch;

        // PatientId
        $this->PatientId = new DbField('patient_vitals', 'patient_vitals', 'x_PatientId', 'PatientId', '`PatientId`', '`PatientId`', 3, 11, -1, false, '`PatientId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientId->IsForeignKey = true; // Foreign key field
        $this->PatientId->Sortable = true; // Allow sort
        $this->PatientId->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientId->Param, "CustomMsg");
        $this->Fields['PatientId'] = &$this->PatientId;

        // Reception
        $this->Reception = new DbField('patient_vitals', 'patient_vitals', 'x_Reception', 'Reception', '`Reception`', '`Reception`', 3, 11, -1, false, '`Reception`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Reception->IsForeignKey = true; // Foreign key field
        $this->Reception->Sortable = true; // Allow sort
        $this->Reception->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Reception->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Reception->Param, "CustomMsg");
        $this->Fields['Reception'] = &$this->Reception;

        // HospID
        $this->HospID = new DbField('patient_vitals', 'patient_vitals', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->HospID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospID->Param, "CustomMsg");
        $this->Fields['HospID'] = &$this->HospID;
    }

    // Field Visibility
    public function getFieldVisibility($fldParm)
    {
        global $Security;
        return $this->$fldParm->Visible; // Returns original value
    }

    // Set left column class (must be predefined col-*-* classes of Bootstrap grid system)
    public function setLeftColumnClass($class)
    {
        if (preg_match('/^col\-(\w+)\-(\d+)$/', $class, $match)) {
            $this->LeftColumnClass = $class . " col-form-label ew-label";
            $this->RightColumnClass = "col-" . $match[1] . "-" . strval(12 - (int)$match[2]);
            $this->OffsetColumnClass = $this->RightColumnClass . " " . str_replace("col-", "offset-", $class);
            $this->TableLeftColumnClass = preg_replace('/^col-\w+-(\d+)$/', "w-col-$1", $class); // Change to w-col-*
        }
    }

    // Single column sort
    public function updateSort(&$fld)
    {
        if ($this->CurrentOrder == $fld->Name) {
            $sortField = $fld->Expression;
            $lastSort = $fld->getSort();
            if (in_array($this->CurrentOrderType, ["ASC", "DESC", "NO"])) {
                $curSort = $this->CurrentOrderType;
            } else {
                $curSort = $lastSort;
            }
            $fld->setSort($curSort);
            $orderBy = in_array($curSort, ["ASC", "DESC"]) ? $sortField . " " . $curSort : "";
            $this->setSessionOrderBy($orderBy); // Save to Session
            $sortFieldList = ($fld->VirtualExpression != "") ? $fld->VirtualExpression : $sortField;
            $orderBy = in_array($curSort, ["ASC", "DESC"]) ? $sortFieldList . " " . $curSort : "";
            $this->setSessionOrderByList($orderBy); // Save to Session
        } else {
            $fld->setSort("");
        }
    }

    // Session ORDER BY for List page
    public function getSessionOrderByList()
    {
        return Session(PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_ORDER_BY_LIST"));
    }

    public function setSessionOrderByList($v)
    {
        $_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_ORDER_BY_LIST")] = $v;
    }

    // Current master table name
    public function getCurrentMasterTable()
    {
        return Session(PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_MASTER_TABLE"));
    }

    public function setCurrentMasterTable($v)
    {
        $_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_MASTER_TABLE")] = $v;
    }

    // Session master WHERE clause
    public function getMasterFilter()
    {
        // Master filter
        $masterFilter = "";
        if ($this->getCurrentMasterTable() == "ip_admission") {
            if ($this->Reception->getSessionValue() != "") {
                $masterFilter .= "" . GetForeignKeySql("`id`", $this->Reception->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
            if ($this->PatientId->getSessionValue() != "") {
                $masterFilter .= " AND " . GetForeignKeySql("`patient_id`", $this->PatientId->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
            if ($this->mrnno->getSessionValue() != "") {
                $masterFilter .= " AND " . GetForeignKeySql("`mrnNo`", $this->mrnno->getSessionValue(), DATATYPE_STRING, "DB");
            } else {
                return "";
            }
        }
        return $masterFilter;
    }

    // Session detail WHERE clause
    public function getDetailFilter()
    {
        // Detail filter
        $detailFilter = "";
        if ($this->getCurrentMasterTable() == "ip_admission") {
            if ($this->Reception->getSessionValue() != "") {
                $detailFilter .= "" . GetForeignKeySql("`Reception`", $this->Reception->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
            if ($this->PatientId->getSessionValue() != "") {
                $detailFilter .= " AND " . GetForeignKeySql("`PatientId`", $this->PatientId->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
            if ($this->mrnno->getSessionValue() != "") {
                $detailFilter .= " AND " . GetForeignKeySql("`mrnno`", $this->mrnno->getSessionValue(), DATATYPE_STRING, "DB");
            } else {
                return "";
            }
        }
        return $detailFilter;
    }

    // Master filter
    public function sqlMasterFilter_ip_admission()
    {
        return "`id`=@id@ AND `patient_id`=@patient_id@ AND `mrnNo`='@mrnNo@'";
    }
    // Detail filter
    public function sqlDetailFilter_ip_admission()
    {
        return "`Reception`=@Reception@ AND `PatientId`=@PatientId@ AND `mrnno`='@mrnno@'";
    }

    // Table level SQL
    public function getSqlFrom() // From
    {
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`patient_vitals`";
    }

    public function sqlFrom() // For backward compatibility
    {
        return $this->getSqlFrom();
    }

    public function setSqlFrom($v)
    {
        $this->SqlFrom = $v;
    }

    public function getSqlSelect() // Select
    {
        return $this->SqlSelect ?? $this->getQueryBuilder()->select("*, '' AS `PatientSearch`");
    }

    public function sqlSelect() // For backward compatibility
    {
        return $this->getSqlSelect();
    }

    public function setSqlSelect($v)
    {
        $this->SqlSelect = $v;
    }

    public function getSqlSelectList() // Select for List page
    {
        if ($this->SqlSelectList) {
            return $this->SqlSelectList;
        }
        $from = "(SELECT *, '' AS `PatientSearch`, (SELECT `CategoryDrug` FROM `pres_categoryallergy` `TMP_LOOKUPTABLE` WHERE `TMP_LOOKUPTABLE`.`CategoryDrug` = `patient_vitals`.`GroupAllergies` LIMIT 1) AS `EV__GroupAllergies` FROM `patient_vitals`)";
        return $from . " `TMP_TABLE`";
    }

    public function sqlSelectList() // For backward compatibility
    {
        return $this->getSqlSelectList();
    }

    public function setSqlSelectList($v)
    {
        $this->SqlSelectList = $v;
    }

    public function getSqlWhere() // Where
    {
        $where = ($this->SqlWhere != "") ? $this->SqlWhere : "";
        $this->DefaultFilter = "`HospID`='".HospitalID()."'";
        AddFilter($where, $this->DefaultFilter);
        return $where;
    }

    public function sqlWhere() // For backward compatibility
    {
        return $this->getSqlWhere();
    }

    public function setSqlWhere($v)
    {
        $this->SqlWhere = $v;
    }

    public function getSqlGroupBy() // Group By
    {
        return ($this->SqlGroupBy != "") ? $this->SqlGroupBy : "";
    }

    public function sqlGroupBy() // For backward compatibility
    {
        return $this->getSqlGroupBy();
    }

    public function setSqlGroupBy($v)
    {
        $this->SqlGroupBy = $v;
    }

    public function getSqlHaving() // Having
    {
        return ($this->SqlHaving != "") ? $this->SqlHaving : "";
    }

    public function sqlHaving() // For backward compatibility
    {
        return $this->getSqlHaving();
    }

    public function setSqlHaving($v)
    {
        $this->SqlHaving = $v;
    }

    public function getSqlOrderBy() // Order By
    {
        return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : $this->DefaultSort;
    }

    public function sqlOrderBy() // For backward compatibility
    {
        return $this->getSqlOrderBy();
    }

    public function setSqlOrderBy($v)
    {
        $this->SqlOrderBy = $v;
    }

    // Apply User ID filters
    public function applyUserIDFilters($filter)
    {
        return $filter;
    }

    // Check if User ID security allows view all
    public function userIDAllow($id = "")
    {
        $allow = $this->UserIDAllowSecurity;
        switch ($id) {
            case "add":
            case "copy":
            case "gridadd":
            case "register":
            case "addopt":
                return (($allow & 1) == 1);
            case "edit":
            case "gridedit":
            case "update":
            case "changepassword":
            case "resetpassword":
                return (($allow & 4) == 4);
            case "delete":
                return (($allow & 2) == 2);
            case "view":
                return (($allow & 32) == 32);
            case "search":
                return (($allow & 64) == 64);
            default:
                return (($allow & 8) == 8);
        }
    }

    /**
     * Get record count
     *
     * @param string|QueryBuilder $sql SQL or QueryBuilder
     * @param mixed $c Connection
     * @return int
     */
    public function getRecordCount($sql, $c = null)
    {
        $cnt = -1;
        $rs = null;
        if ($sql instanceof \Doctrine\DBAL\Query\QueryBuilder) { // Query builder
            $sqlwrk = clone $sql;
            $sqlwrk = $sqlwrk->resetQueryPart("orderBy")->getSQL();
        } else {
            $sqlwrk = $sql;
        }
        $pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';
        // Skip Custom View / SubQuery / SELECT DISTINCT / ORDER BY
        if (
            ($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
            preg_match($pattern, $sqlwrk) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sqlwrk) &&
            !preg_match('/^\s*select\s+distinct\s+/i', $sqlwrk) && !preg_match('/\s+order\s+by\s+/i', $sqlwrk)
        ) {
            $sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sqlwrk);
        } else {
            $sqlwrk = "SELECT COUNT(*) FROM (" . $sqlwrk . ") COUNT_TABLE";
        }
        $conn = $c ?? $this->getConnection();
        $rs = $conn->executeQuery($sqlwrk);
        $cnt = $rs->fetchColumn();
        if ($cnt !== false) {
            return (int)$cnt;
        }

        // Unable to get count by SELECT COUNT(*), execute the SQL to get record count directly
        return ExecuteRecordCount($sql, $conn);
    }

    // Get SQL
    public function getSql($where, $orderBy = "")
    {
        return $this->buildSelectSql(
            $this->getSqlSelect(),
            $this->getSqlFrom(),
            $this->getSqlWhere(),
            $this->getSqlGroupBy(),
            $this->getSqlHaving(),
            $this->getSqlOrderBy(),
            $where,
            $orderBy
        )->getSQL();
    }

    // Table SQL
    public function getCurrentSql()
    {
        $filter = $this->CurrentFilter;
        $filter = $this->applyUserIDFilters($filter);
        $sort = $this->getSessionOrderBy();
        return $this->getSql($filter, $sort);
    }

    /**
     * Table SQL with List page filter
     *
     * @return QueryBuilder
     */
    public function getListSql()
    {
        $filter = $this->UseSessionForListSql ? $this->getSessionWhere() : "";
        AddFilter($filter, $this->CurrentFilter);
        $filter = $this->applyUserIDFilters($filter);
        $this->recordsetSelecting($filter);
        if ($this->useVirtualFields()) {
            $select = "*";
            $from = $this->getSqlSelectList();
            $sort = $this->UseSessionForListSql ? $this->getSessionOrderByList() : "";
        } else {
            $select = $this->getSqlSelect();
            $from = $this->getSqlFrom();
            $sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
        }
        $this->Sort = $sort;
        return $this->buildSelectSql(
            $select,
            $from,
            $this->getSqlWhere(),
            $this->getSqlGroupBy(),
            $this->getSqlHaving(),
            $this->getSqlOrderBy(),
            $filter,
            $sort
        );
    }

    // Get ORDER BY clause
    public function getOrderBy()
    {
        $orderBy = $this->getSqlOrderBy();
        $sort = ($this->useVirtualFields()) ? $this->getSessionOrderByList() : $this->getSessionOrderBy();
        if ($orderBy != "" && $sort != "") {
            $orderBy .= ", " . $sort;
        } elseif ($sort != "") {
            $orderBy = $sort;
        }
        return $orderBy;
    }

    // Check if virtual fields is used in SQL
    protected function useVirtualFields()
    {
        $where = $this->UseSessionForListSql ? $this->getSessionWhere() : $this->CurrentFilter;
        $orderBy = $this->UseSessionForListSql ? $this->getSessionOrderByList() : "";
        if ($where != "") {
            $where = " " . str_replace(["(", ")"], ["", ""], $where) . " ";
        }
        if ($orderBy != "") {
            $orderBy = " " . str_replace(["(", ")"], ["", ""], $orderBy) . " ";
        }
        if ($this->BasicSearch->getKeyword() != "") {
            return true;
        }
        if (
            $this->GroupAllergies->AdvancedSearch->SearchValue != "" ||
            $this->GroupAllergies->AdvancedSearch->SearchValue2 != "" ||
            ContainsString($where, " " . $this->GroupAllergies->VirtualExpression . " ")
        ) {
            return true;
        }
        if (ContainsString($orderBy, " " . $this->GroupAllergies->VirtualExpression . " ")) {
            return true;
        }
        return false;
    }

    // Get record count based on filter (for detail record count in master table pages)
    public function loadRecordCount($filter)
    {
        $origFilter = $this->CurrentFilter;
        $this->CurrentFilter = $filter;
        $this->recordsetSelecting($this->CurrentFilter);
        $select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : $this->getQueryBuilder()->select("*");
        $groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
        $having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
        $sql = $this->buildSelectSql($select, $this->getSqlFrom(), $this->getSqlWhere(), $groupBy, $having, "", $this->CurrentFilter, "");
        $cnt = $this->getRecordCount($sql);
        $this->CurrentFilter = $origFilter;
        return $cnt;
    }

    // Get record count (for current List page)
    public function listRecordCount()
    {
        $filter = $this->getSessionWhere();
        AddFilter($filter, $this->CurrentFilter);
        $filter = $this->applyUserIDFilters($filter);
        $this->recordsetSelecting($filter);
        $select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : $this->getQueryBuilder()->select("*");
        $groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
        $having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
        if ($this->useVirtualFields()) {
            $sql = $this->buildSelectSql("*", $this->getSqlSelectList(), $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
        } else {
            $sql = $this->buildSelectSql($select, $this->getSqlFrom(), $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
        }
        $cnt = $this->getRecordCount($sql);
        return $cnt;
    }

    /**
     * INSERT statement
     *
     * @param mixed $rs
     * @return QueryBuilder
     */
    protected function insertSql(&$rs)
    {
        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->insert($this->UpdateTable);
        foreach ($rs as $name => $value) {
            if (!isset($this->Fields[$name]) || $this->Fields[$name]->IsCustom) {
                continue;
            }
            $type = GetParameterType($this->Fields[$name], $value, $this->Dbid);
            $queryBuilder->setValue($this->Fields[$name]->Expression, $queryBuilder->createPositionalParameter($value, $type));
        }
        return $queryBuilder;
    }

    // Insert
    public function insert(&$rs)
    {
        $conn = $this->getConnection();
        $success = $this->insertSql($rs)->execute();
        if ($success) {
            // Get insert id if necessary
            $this->id->setDbValue($conn->lastInsertId());
            $rs['id'] = $this->id->DbValue;
        }
        return $success;
    }

    /**
     * UPDATE statement
     *
     * @param array $rs Data to be updated
     * @param string|array $where WHERE clause
     * @param string $curfilter Filter
     * @return QueryBuilder
     */
    protected function updateSql(&$rs, $where = "", $curfilter = true)
    {
        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->update($this->UpdateTable);
        foreach ($rs as $name => $value) {
            if (!isset($this->Fields[$name]) || $this->Fields[$name]->IsCustom || $this->Fields[$name]->IsAutoIncrement) {
                continue;
            }
            $type = GetParameterType($this->Fields[$name], $value, $this->Dbid);
            $queryBuilder->set($this->Fields[$name]->Expression, $queryBuilder->createPositionalParameter($value, $type));
        }
        $filter = ($curfilter) ? $this->CurrentFilter : "";
        if (is_array($where)) {
            $where = $this->arrayToFilter($where);
        }
        AddFilter($filter, $where);
        if ($filter != "") {
            $queryBuilder->where($filter);
        }
        return $queryBuilder;
    }

    // Update
    public function update(&$rs, $where = "", $rsold = null, $curfilter = true)
    {
        // If no field is updated, execute may return 0. Treat as success
        $success = $this->updateSql($rs, $where, $curfilter)->execute();
        $success = ($success > 0) ? $success : true;
        return $success;
    }

    /**
     * DELETE statement
     *
     * @param array $rs Key values
     * @param string|array $where WHERE clause
     * @param string $curfilter Filter
     * @return QueryBuilder
     */
    protected function deleteSql(&$rs, $where = "", $curfilter = true)
    {
        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->delete($this->UpdateTable);
        if (is_array($where)) {
            $where = $this->arrayToFilter($where);
        }
        if ($rs) {
            if (array_key_exists('id', $rs)) {
                AddFilter($where, QuotedName('id', $this->Dbid) . '=' . QuotedValue($rs['id'], $this->id->DataType, $this->Dbid));
            }
        }
        $filter = ($curfilter) ? $this->CurrentFilter : "";
        AddFilter($filter, $where);
        return $queryBuilder->where($filter != "" ? $filter : "0=1");
    }

    // Delete
    public function delete(&$rs, $where = "", $curfilter = false)
    {
        $success = true;
        if ($success) {
            $success = $this->deleteSql($rs, $where, $curfilter)->execute();
        }
        return $success;
    }

    // Load DbValue from recordset or array
    protected function loadDbValues($row)
    {
        if (!is_array($row)) {
            return;
        }
        $this->id->DbValue = $row['id'];
        $this->mrnno->DbValue = $row['mrnno'];
        $this->PatientName->DbValue = $row['PatientName'];
        $this->PatID->DbValue = $row['PatID'];
        $this->MobileNumber->DbValue = $row['MobileNumber'];
        $this->profilePic->DbValue = $row['profilePic'];
        $this->HT->DbValue = $row['HT'];
        $this->WT->DbValue = $row['WT'];
        $this->SurfaceArea->DbValue = $row['SurfaceArea'];
        $this->BodyMassIndex->DbValue = $row['BodyMassIndex'];
        $this->ClinicalFindings->DbValue = $row['ClinicalFindings'];
        $this->ClinicalDiagnosis->DbValue = $row['ClinicalDiagnosis'];
        $this->AnticoagulantifAny->DbValue = $row['AnticoagulantifAny'];
        $this->FoodAllergies->DbValue = $row['FoodAllergies'];
        $this->GenericAllergies->DbValue = $row['GenericAllergies'];
        $this->GroupAllergies->DbValue = $row['GroupAllergies'];
        $this->Temp->DbValue = $row['Temp'];
        $this->Pulse->DbValue = $row['Pulse'];
        $this->BP->DbValue = $row['BP'];
        $this->PR->DbValue = $row['PR'];
        $this->CNS->DbValue = $row['CNS'];
        $this->RSA->DbValue = $row['RSA'];
        $this->CVS->DbValue = $row['CVS'];
        $this->PA->DbValue = $row['PA'];
        $this->PS->DbValue = $row['PS'];
        $this->PV->DbValue = $row['PV'];
        $this->clinicaldetails->DbValue = $row['clinicaldetails'];
        $this->status->DbValue = $row['status'];
        $this->createdby->DbValue = $row['createdby'];
        $this->createddatetime->DbValue = $row['createddatetime'];
        $this->modifiedby->DbValue = $row['modifiedby'];
        $this->modifieddatetime->DbValue = $row['modifieddatetime'];
        $this->Age->DbValue = $row['Age'];
        $this->Gender->DbValue = $row['Gender'];
        $this->PatientSearch->DbValue = $row['PatientSearch'];
        $this->PatientId->DbValue = $row['PatientId'];
        $this->Reception->DbValue = $row['Reception'];
        $this->HospID->DbValue = $row['HospID'];
    }

    // Delete uploaded files
    public function deleteUploadedFiles($row)
    {
        $this->loadDbValues($row);
    }

    // Record filter WHERE clause
    protected function sqlKeyFilter()
    {
        return "`id` = @id@";
    }

    // Get Key
    public function getKey($current = false)
    {
        $keys = [];
        $val = $current ? $this->id->CurrentValue : $this->id->OldValue;
        if (EmptyValue($val)) {
            return "";
        } else {
            $keys[] = $val;
        }
        return implode(Config("COMPOSITE_KEY_SEPARATOR"), $keys);
    }

    // Set Key
    public function setKey($key, $current = false)
    {
        $this->OldKey = strval($key);
        $keys = explode(Config("COMPOSITE_KEY_SEPARATOR"), $this->OldKey);
        if (count($keys) == 1) {
            if ($current) {
                $this->id->CurrentValue = $keys[0];
            } else {
                $this->id->OldValue = $keys[0];
            }
        }
    }

    // Get record filter
    public function getRecordFilter($row = null)
    {
        $keyFilter = $this->sqlKeyFilter();
        if (is_array($row)) {
            $val = array_key_exists('id', $row) ? $row['id'] : null;
        } else {
            $val = $this->id->OldValue !== null ? $this->id->OldValue : $this->id->CurrentValue;
        }
        if (!is_numeric($val)) {
            return "0=1"; // Invalid key
        }
        if ($val === null) {
            return "0=1"; // Invalid key
        } else {
            $keyFilter = str_replace("@id@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
        }
        return $keyFilter;
    }

    // Return page URL
    public function getReturnUrl()
    {
        $referUrl = ReferUrl();
        $referPageName = ReferPageName();
        $name = PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL");
        // Get referer URL automatically
        if ($referUrl != "" && $referPageName != CurrentPageName() && $referPageName != "login") { // Referer not same page or login page
            $_SESSION[$name] = $referUrl; // Save to Session
        }
        return $_SESSION[$name] ?? GetUrl("PatientVitalsList");
    }

    // Set return page URL
    public function setReturnUrl($v)
    {
        $_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL")] = $v;
    }

    // Get modal caption
    public function getModalCaption($pageName)
    {
        global $Language;
        if ($pageName == "PatientVitalsView") {
            return $Language->phrase("View");
        } elseif ($pageName == "PatientVitalsEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "PatientVitalsAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // API page name
    public function getApiPageName($action)
    {
        switch (strtolower($action)) {
            case Config("API_VIEW_ACTION"):
                return "PatientVitalsView";
            case Config("API_ADD_ACTION"):
                return "PatientVitalsAdd";
            case Config("API_EDIT_ACTION"):
                return "PatientVitalsEdit";
            case Config("API_DELETE_ACTION"):
                return "PatientVitalsDelete";
            case Config("API_LIST_ACTION"):
                return "PatientVitalsList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "PatientVitalsList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("PatientVitalsView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("PatientVitalsView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "PatientVitalsAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "PatientVitalsAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("PatientVitalsEdit", $this->getUrlParm($parm));
        return $this->addMasterUrl($url);
    }

    // Inline edit URL
    public function getInlineEditUrl()
    {
        $url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=edit"));
        return $this->addMasterUrl($url);
    }

    // Copy URL
    public function getCopyUrl($parm = "")
    {
        $url = $this->keyUrl("PatientVitalsAdd", $this->getUrlParm($parm));
        return $this->addMasterUrl($url);
    }

    // Inline copy URL
    public function getInlineCopyUrl()
    {
        $url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=copy"));
        return $this->addMasterUrl($url);
    }

    // Delete URL
    public function getDeleteUrl()
    {
        return $this->keyUrl("PatientVitalsDelete", $this->getUrlParm());
    }

    // Add master url
    public function addMasterUrl($url)
    {
        if ($this->getCurrentMasterTable() == "ip_admission" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
            $url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
            $url .= "&" . GetForeignKeyUrl("fk_id", $this->Reception->CurrentValue ?? $this->Reception->getSessionValue());
            $url .= "&" . GetForeignKeyUrl("fk_patient_id", $this->PatientId->CurrentValue ?? $this->PatientId->getSessionValue());
            $url .= "&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnno->CurrentValue ?? $this->mrnno->getSessionValue());
        }
        return $url;
    }

    public function keyToJson($htmlEncode = false)
    {
        $json = "";
        $json .= "id:" . JsonEncode($this->id->CurrentValue, "number");
        $json = "{" . $json . "}";
        if ($htmlEncode) {
            $json = HtmlEncode($json);
        }
        return $json;
    }

    // Add key value to URL
    public function keyUrl($url, $parm = "")
    {
        if ($this->id->CurrentValue !== null) {
            $url .= "/" . rawurlencode($this->id->CurrentValue);
        } else {
            return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
        }
        if ($parm != "") {
            $url .= "?" . $parm;
        }
        return $url;
    }

    // Render sort
    public function renderSort($fld)
    {
        $classId = $fld->TableVar . "_" . $fld->Param;
        $scriptId = str_replace("%id%", $classId, "tpc_%id%");
        $scriptStart = $this->UseCustomTemplate ? "<template id=\"" . $scriptId . "\">" : "";
        $scriptEnd = $this->UseCustomTemplate ? "</template>" : "";
        $jsSort = " class=\"ew-pointer\" onclick=\"ew.sort(event, '" . $this->sortUrl($fld) . "', 1);\"";
        if ($this->sortUrl($fld) == "") {
            $html = <<<NOSORTHTML
{$scriptStart}<div class="ew-table-header-caption">{$fld->caption()}</div>{$scriptEnd}
NOSORTHTML;
        } else {
            if ($fld->getSort() == "ASC") {
                $sortIcon = '<i class="fas fa-sort-up"></i>';
            } elseif ($fld->getSort() == "DESC") {
                $sortIcon = '<i class="fas fa-sort-down"></i>';
            } else {
                $sortIcon = '';
            }
            $html = <<<SORTHTML
{$scriptStart}<div{$jsSort}><div class="ew-table-header-btn"><span class="ew-table-header-caption">{$fld->caption()}</span><span class="ew-table-header-sort">{$sortIcon}</span></div></div>{$scriptEnd}
SORTHTML;
        }
        return $html;
    }

    // Sort URL
    public function sortUrl($fld)
    {
        if (
            $this->CurrentAction || $this->isExport() ||
            in_array($fld->Type, [128, 204, 205])
        ) { // Unsortable data type
                return "";
        } elseif ($fld->Sortable) {
            $urlParm = $this->getUrlParm("order=" . urlencode($fld->Name) . "&amp;ordertype=" . $fld->getNextSort());
            return $this->addMasterUrl(CurrentPageName() . "?" . $urlParm);
        } else {
            return "";
        }
    }

    // Get record keys from Post/Get/Session
    public function getRecordKeys()
    {
        $arKeys = [];
        $arKey = [];
        if (Param("key_m") !== null) {
            $arKeys = Param("key_m");
            $cnt = count($arKeys);
        } else {
            if (($keyValue = Param("id") ?? Route("id")) !== null) {
                $arKeys[] = $keyValue;
            } elseif (IsApi() && (($keyValue = Key(0) ?? Route(2)) !== null)) {
                $arKeys[] = $keyValue;
            } else {
                $arKeys = null; // Do not setup
            }

            //return $arKeys; // Do not return yet, so the values will also be checked by the following code
        }
        // Check keys
        $ar = [];
        if (is_array($arKeys)) {
            foreach ($arKeys as $key) {
                if (!is_numeric($key)) {
                    continue;
                }
                $ar[] = $key;
            }
        }
        return $ar;
    }

    // Get filter from record keys
    public function getFilterFromRecordKeys($setCurrent = true)
    {
        $arKeys = $this->getRecordKeys();
        $keyFilter = "";
        foreach ($arKeys as $key) {
            if ($keyFilter != "") {
                $keyFilter .= " OR ";
            }
            if ($setCurrent) {
                $this->id->CurrentValue = $key;
            } else {
                $this->id->OldValue = $key;
            }
            $keyFilter .= "(" . $this->getRecordFilter() . ")";
        }
        return $keyFilter;
    }

    // Load recordset based on filter
    public function &loadRs($filter)
    {
        $sql = $this->getSql($filter); // Set up filter (WHERE Clause)
        $conn = $this->getConnection();
        $stmt = $conn->executeQuery($sql);
        return $stmt;
    }

    // Load row values from record
    public function loadListRowValues(&$rs)
    {
        if (is_array($rs)) {
            $row = $rs;
        } elseif ($rs && property_exists($rs, "fields")) { // Recordset
            $row = $rs->fields;
        } else {
            return;
        }
        $this->id->setDbValue($row['id']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->PatID->setDbValue($row['PatID']);
        $this->MobileNumber->setDbValue($row['MobileNumber']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->HT->setDbValue($row['HT']);
        $this->WT->setDbValue($row['WT']);
        $this->SurfaceArea->setDbValue($row['SurfaceArea']);
        $this->BodyMassIndex->setDbValue($row['BodyMassIndex']);
        $this->ClinicalFindings->setDbValue($row['ClinicalFindings']);
        $this->ClinicalDiagnosis->setDbValue($row['ClinicalDiagnosis']);
        $this->AnticoagulantifAny->setDbValue($row['AnticoagulantifAny']);
        $this->FoodAllergies->setDbValue($row['FoodAllergies']);
        $this->GenericAllergies->setDbValue($row['GenericAllergies']);
        $this->GroupAllergies->setDbValue($row['GroupAllergies']);
        $this->Temp->setDbValue($row['Temp']);
        $this->Pulse->setDbValue($row['Pulse']);
        $this->BP->setDbValue($row['BP']);
        $this->PR->setDbValue($row['PR']);
        $this->CNS->setDbValue($row['CNS']);
        $this->RSA->setDbValue($row['RSA']);
        $this->CVS->setDbValue($row['CVS']);
        $this->PA->setDbValue($row['PA']);
        $this->PS->setDbValue($row['PS']);
        $this->PV->setDbValue($row['PV']);
        $this->clinicaldetails->setDbValue($row['clinicaldetails']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->Age->setDbValue($row['Age']);
        $this->Gender->setDbValue($row['Gender']);
        $this->PatientSearch->setDbValue($row['PatientSearch']);
        $this->PatientId->setDbValue($row['PatientId']);
        $this->Reception->setDbValue($row['Reception']);
        $this->HospID->setDbValue($row['HospID']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // mrnno

        // PatientName

        // PatID

        // MobileNumber

        // profilePic

        // HT

        // WT

        // SurfaceArea

        // BodyMassIndex

        // ClinicalFindings

        // ClinicalDiagnosis

        // AnticoagulantifAny

        // FoodAllergies

        // GenericAllergies

        // GroupAllergies

        // Temp

        // Pulse

        // BP

        // PR

        // CNS

        // RSA

        // CVS

        // PA

        // PS

        // PV

        // clinicaldetails

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // Age

        // Gender

        // PatientSearch

        // PatientId

        // Reception

        // HospID

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // mrnno
        $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
        $this->mrnno->ViewCustomAttributes = "";

        // PatientName
        $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
        $this->PatientName->ViewCustomAttributes = "";

        // PatID
        $this->PatID->ViewValue = $this->PatID->CurrentValue;
        $this->PatID->ViewCustomAttributes = "";

        // MobileNumber
        $this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
        $this->MobileNumber->ViewCustomAttributes = "";

        // profilePic
        $this->profilePic->ViewValue = $this->profilePic->CurrentValue;
        $this->profilePic->CssClass = "font-weight-bold";
        $this->profilePic->ViewCustomAttributes = "";

        // HT
        $this->HT->ViewValue = $this->HT->CurrentValue;
        $this->HT->ViewCustomAttributes = "";

        // WT
        $this->WT->ViewValue = $this->WT->CurrentValue;
        $this->WT->ViewCustomAttributes = "";

        // SurfaceArea
        $this->SurfaceArea->ViewValue = $this->SurfaceArea->CurrentValue;
        $this->SurfaceArea->ViewCustomAttributes = "";

        // BodyMassIndex
        $this->BodyMassIndex->ViewValue = $this->BodyMassIndex->CurrentValue;
        $this->BodyMassIndex->ViewCustomAttributes = "";

        // ClinicalFindings
        $this->ClinicalFindings->ViewValue = $this->ClinicalFindings->CurrentValue;
        $this->ClinicalFindings->ViewCustomAttributes = "";

        // ClinicalDiagnosis
        $this->ClinicalDiagnosis->ViewValue = $this->ClinicalDiagnosis->CurrentValue;
        $this->ClinicalDiagnosis->ViewCustomAttributes = "";

        // AnticoagulantifAny
        $this->AnticoagulantifAny->ViewValue = $this->AnticoagulantifAny->CurrentValue;
        $curVal = trim(strval($this->AnticoagulantifAny->CurrentValue));
        if ($curVal != "") {
            $this->AnticoagulantifAny->ViewValue = $this->AnticoagulantifAny->lookupCacheOption($curVal);
            if ($this->AnticoagulantifAny->ViewValue === null) { // Lookup from database
                $filterWrk = "`Genericname`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->AnticoagulantifAny->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->AnticoagulantifAny->Lookup->renderViewRow($rswrk[0]);
                    $this->AnticoagulantifAny->ViewValue = $this->AnticoagulantifAny->displayValue($arwrk);
                } else {
                    $this->AnticoagulantifAny->ViewValue = $this->AnticoagulantifAny->CurrentValue;
                }
            }
        } else {
            $this->AnticoagulantifAny->ViewValue = null;
        }
        $this->AnticoagulantifAny->ViewCustomAttributes = "";

        // FoodAllergies
        $this->FoodAllergies->ViewValue = $this->FoodAllergies->CurrentValue;
        $this->FoodAllergies->ViewCustomAttributes = "";

        // GenericAllergies
        $curVal = trim(strval($this->GenericAllergies->CurrentValue));
        if ($curVal != "") {
            $this->GenericAllergies->ViewValue = $this->GenericAllergies->lookupCacheOption($curVal);
            if ($this->GenericAllergies->ViewValue === null) { // Lookup from database
                $arwrk = explode(",", $curVal);
                $filterWrk = "";
                foreach ($arwrk as $wrk) {
                    if ($filterWrk != "") {
                        $filterWrk .= " OR ";
                    }
                    $filterWrk .= "`Genericname`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                }
                $sqlWrk = $this->GenericAllergies->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $this->GenericAllergies->ViewValue = new OptionValues();
                    foreach ($rswrk as $row) {
                        $arwrk = $this->GenericAllergies->Lookup->renderViewRow($row);
                        $this->GenericAllergies->ViewValue->add($this->GenericAllergies->displayValue($arwrk));
                    }
                } else {
                    $this->GenericAllergies->ViewValue = $this->GenericAllergies->CurrentValue;
                }
            }
        } else {
            $this->GenericAllergies->ViewValue = null;
        }
        $this->GenericAllergies->ViewCustomAttributes = "";

        // GroupAllergies
        if ($this->GroupAllergies->VirtualValue != "") {
            $this->GroupAllergies->ViewValue = $this->GroupAllergies->VirtualValue;
        } else {
            $curVal = trim(strval($this->GroupAllergies->CurrentValue));
            if ($curVal != "") {
                $this->GroupAllergies->ViewValue = $this->GroupAllergies->lookupCacheOption($curVal);
                if ($this->GroupAllergies->ViewValue === null) { // Lookup from database
                    $arwrk = explode(",", $curVal);
                    $filterWrk = "";
                    foreach ($arwrk as $wrk) {
                        if ($filterWrk != "") {
                            $filterWrk .= " OR ";
                        }
                        $filterWrk .= "`CategoryDrug`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                    }
                    $sqlWrk = $this->GroupAllergies->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $this->GroupAllergies->ViewValue = new OptionValues();
                        foreach ($rswrk as $row) {
                            $arwrk = $this->GroupAllergies->Lookup->renderViewRow($row);
                            $this->GroupAllergies->ViewValue->add($this->GroupAllergies->displayValue($arwrk));
                        }
                    } else {
                        $this->GroupAllergies->ViewValue = $this->GroupAllergies->CurrentValue;
                    }
                }
            } else {
                $this->GroupAllergies->ViewValue = null;
            }
        }
        $this->GroupAllergies->ViewCustomAttributes = "";

        // Temp
        $this->Temp->ViewValue = $this->Temp->CurrentValue;
        $this->Temp->ViewCustomAttributes = "";

        // Pulse
        $this->Pulse->ViewValue = $this->Pulse->CurrentValue;
        $this->Pulse->ViewCustomAttributes = "";

        // BP
        $this->BP->ViewValue = $this->BP->CurrentValue;
        $this->BP->ViewCustomAttributes = "";

        // PR
        $this->PR->ViewValue = $this->PR->CurrentValue;
        $this->PR->ViewCustomAttributes = "";

        // CNS
        $this->CNS->ViewValue = $this->CNS->CurrentValue;
        $this->CNS->ViewCustomAttributes = "";

        // RSA
        $this->RSA->ViewValue = $this->RSA->CurrentValue;
        $this->RSA->ViewCustomAttributes = "";

        // CVS
        $this->CVS->ViewValue = $this->CVS->CurrentValue;
        $this->CVS->ViewCustomAttributes = "";

        // PA
        $this->PA->ViewValue = $this->PA->CurrentValue;
        $this->PA->ViewCustomAttributes = "";

        // PS
        $this->PS->ViewValue = $this->PS->CurrentValue;
        $this->PS->ViewCustomAttributes = "";

        // PV
        $this->PV->ViewValue = $this->PV->CurrentValue;
        $this->PV->ViewCustomAttributes = "";

        // clinicaldetails
        $curVal = trim(strval($this->clinicaldetails->CurrentValue));
        if ($curVal != "") {
            $this->clinicaldetails->ViewValue = $this->clinicaldetails->lookupCacheOption($curVal);
            if ($this->clinicaldetails->ViewValue === null) { // Lookup from database
                $arwrk = explode(",", $curVal);
                $filterWrk = "";
                foreach ($arwrk as $wrk) {
                    if ($filterWrk != "") {
                        $filterWrk .= " OR ";
                    }
                    $filterWrk .= "`ClinicalDetails`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                }
                $sqlWrk = $this->clinicaldetails->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $this->clinicaldetails->ViewValue = new OptionValues();
                    foreach ($rswrk as $row) {
                        $arwrk = $this->clinicaldetails->Lookup->renderViewRow($row);
                        $this->clinicaldetails->ViewValue->add($this->clinicaldetails->displayValue($arwrk));
                    }
                } else {
                    $this->clinicaldetails->ViewValue = $this->clinicaldetails->CurrentValue;
                }
            }
        } else {
            $this->clinicaldetails->ViewValue = null;
        }
        $this->clinicaldetails->ViewCustomAttributes = "";

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

        // createdby
        $this->createdby->ViewValue = $this->createdby->CurrentValue;
        $this->createdby->ViewCustomAttributes = "";

        // createddatetime
        $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
        $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
        $this->createddatetime->ViewCustomAttributes = "";

        // modifiedby
        $this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
        $this->modifiedby->ViewCustomAttributes = "";

        // modifieddatetime
        $this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
        $this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
        $this->modifieddatetime->ViewCustomAttributes = "";

        // Age
        $this->Age->ViewValue = $this->Age->CurrentValue;
        $this->Age->ViewCustomAttributes = "";

        // Gender
        $this->Gender->ViewValue = $this->Gender->CurrentValue;
        $this->Gender->ViewCustomAttributes = "";

        // PatientSearch
        $curVal = trim(strval($this->PatientSearch->CurrentValue));
        if ($curVal != "") {
            $this->PatientSearch->ViewValue = $this->PatientSearch->lookupCacheOption($curVal);
            if ($this->PatientSearch->ViewValue === null) { // Lookup from database
                $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                $sqlWrk = $this->PatientSearch->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->PatientSearch->Lookup->renderViewRow($rswrk[0]);
                    $this->PatientSearch->ViewValue = $this->PatientSearch->displayValue($arwrk);
                } else {
                    $this->PatientSearch->ViewValue = $this->PatientSearch->CurrentValue;
                }
            }
        } else {
            $this->PatientSearch->ViewValue = null;
        }
        $this->PatientSearch->ViewCustomAttributes = "";

        // PatientId
        $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
        $this->PatientId->ViewCustomAttributes = "";

        // Reception
        $this->Reception->ViewValue = $this->Reception->CurrentValue;
        $this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
        $this->Reception->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // mrnno
        $this->mrnno->LinkCustomAttributes = "";
        $this->mrnno->HrefValue = "";
        $this->mrnno->TooltipValue = "";

        // PatientName
        $this->PatientName->LinkCustomAttributes = "";
        $this->PatientName->HrefValue = "";
        $this->PatientName->TooltipValue = "";

        // PatID
        $this->PatID->LinkCustomAttributes = "";
        $this->PatID->HrefValue = "";
        $this->PatID->TooltipValue = "";

        // MobileNumber
        $this->MobileNumber->LinkCustomAttributes = "";
        $this->MobileNumber->HrefValue = "";
        $this->MobileNumber->TooltipValue = "";

        // profilePic
        $this->profilePic->LinkCustomAttributes = "";
        $this->profilePic->HrefValue = "";
        $this->profilePic->TooltipValue = "";

        // HT
        $this->HT->LinkCustomAttributes = "";
        $this->HT->HrefValue = "";
        $this->HT->TooltipValue = "";

        // WT
        $this->WT->LinkCustomAttributes = "";
        $this->WT->HrefValue = "";
        $this->WT->TooltipValue = "";

        // SurfaceArea
        $this->SurfaceArea->LinkCustomAttributes = "";
        $this->SurfaceArea->HrefValue = "";
        $this->SurfaceArea->TooltipValue = "";

        // BodyMassIndex
        $this->BodyMassIndex->LinkCustomAttributes = "";
        $this->BodyMassIndex->HrefValue = "";
        $this->BodyMassIndex->TooltipValue = "";

        // ClinicalFindings
        $this->ClinicalFindings->LinkCustomAttributes = "";
        $this->ClinicalFindings->HrefValue = "";
        $this->ClinicalFindings->TooltipValue = "";

        // ClinicalDiagnosis
        $this->ClinicalDiagnosis->LinkCustomAttributes = "";
        $this->ClinicalDiagnosis->HrefValue = "";
        $this->ClinicalDiagnosis->TooltipValue = "";

        // AnticoagulantifAny
        $this->AnticoagulantifAny->LinkCustomAttributes = "";
        $this->AnticoagulantifAny->HrefValue = "";
        $this->AnticoagulantifAny->TooltipValue = "";

        // FoodAllergies
        $this->FoodAllergies->LinkCustomAttributes = "";
        $this->FoodAllergies->HrefValue = "";
        $this->FoodAllergies->TooltipValue = "";

        // GenericAllergies
        $this->GenericAllergies->LinkCustomAttributes = "";
        $this->GenericAllergies->HrefValue = "";
        $this->GenericAllergies->TooltipValue = "";

        // GroupAllergies
        $this->GroupAllergies->LinkCustomAttributes = "";
        $this->GroupAllergies->HrefValue = "";
        $this->GroupAllergies->TooltipValue = "";

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

        // PR
        $this->PR->LinkCustomAttributes = "";
        $this->PR->HrefValue = "";
        $this->PR->TooltipValue = "";

        // CNS
        $this->CNS->LinkCustomAttributes = "";
        $this->CNS->HrefValue = "";
        $this->CNS->TooltipValue = "";

        // RSA
        $this->RSA->LinkCustomAttributes = "";
        $this->RSA->HrefValue = "";
        $this->RSA->TooltipValue = "";

        // CVS
        $this->CVS->LinkCustomAttributes = "";
        $this->CVS->HrefValue = "";
        $this->CVS->TooltipValue = "";

        // PA
        $this->PA->LinkCustomAttributes = "";
        $this->PA->HrefValue = "";
        $this->PA->TooltipValue = "";

        // PS
        $this->PS->LinkCustomAttributes = "";
        $this->PS->HrefValue = "";
        $this->PS->TooltipValue = "";

        // PV
        $this->PV->LinkCustomAttributes = "";
        $this->PV->HrefValue = "";
        $this->PV->TooltipValue = "";

        // clinicaldetails
        $this->clinicaldetails->LinkCustomAttributes = "";
        $this->clinicaldetails->HrefValue = "";
        $this->clinicaldetails->TooltipValue = "";

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

        // Age
        $this->Age->LinkCustomAttributes = "";
        $this->Age->HrefValue = "";
        $this->Age->TooltipValue = "";

        // Gender
        $this->Gender->LinkCustomAttributes = "";
        $this->Gender->HrefValue = "";
        $this->Gender->TooltipValue = "";

        // PatientSearch
        $this->PatientSearch->LinkCustomAttributes = "";
        $this->PatientSearch->HrefValue = "";
        $this->PatientSearch->TooltipValue = "";

        // PatientId
        $this->PatientId->LinkCustomAttributes = "";
        $this->PatientId->HrefValue = "";
        $this->PatientId->TooltipValue = "";

        // Reception
        $this->Reception->LinkCustomAttributes = "";
        $this->Reception->HrefValue = "";
        $this->Reception->TooltipValue = "";

        // HospID
        $this->HospID->LinkCustomAttributes = "";
        $this->HospID->HrefValue = "";
        $this->HospID->TooltipValue = "";

        // Call Row Rendered event
        $this->rowRendered();

        // Save data for Custom Template
        $this->Rows[] = $this->customTemplateFieldValues();
    }

    // Render edit row values
    public function renderEditRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // id
        $this->id->EditAttrs["class"] = "form-control";
        $this->id->EditCustomAttributes = "";
        $this->id->EditValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // mrnno
        $this->mrnno->EditAttrs["class"] = "form-control";
        $this->mrnno->EditCustomAttributes = "";
        $this->mrnno->EditValue = $this->mrnno->CurrentValue;
        $this->mrnno->ViewCustomAttributes = "";

        // PatientName
        $this->PatientName->EditAttrs["class"] = "form-control";
        $this->PatientName->EditCustomAttributes = "";
        $this->PatientName->EditValue = $this->PatientName->CurrentValue;
        $this->PatientName->ViewCustomAttributes = "";

        // PatID
        $this->PatID->EditAttrs["class"] = "form-control";
        $this->PatID->EditCustomAttributes = "";
        $this->PatID->EditValue = $this->PatID->CurrentValue;
        $this->PatID->ViewCustomAttributes = "";

        // MobileNumber
        $this->MobileNumber->EditAttrs["class"] = "form-control";
        $this->MobileNumber->EditCustomAttributes = "";
        if (!$this->MobileNumber->Raw) {
            $this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
        }
        $this->MobileNumber->EditValue = $this->MobileNumber->CurrentValue;
        $this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

        // profilePic
        $this->profilePic->EditAttrs["class"] = "form-control";
        $this->profilePic->EditCustomAttributes = "";
        if (!$this->profilePic->Raw) {
            $this->profilePic->CurrentValue = HtmlDecode($this->profilePic->CurrentValue);
        }
        $this->profilePic->EditValue = $this->profilePic->CurrentValue;
        $this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

        // HT
        $this->HT->EditAttrs["class"] = "form-control";
        $this->HT->EditCustomAttributes = "";
        if (!$this->HT->Raw) {
            $this->HT->CurrentValue = HtmlDecode($this->HT->CurrentValue);
        }
        $this->HT->EditValue = $this->HT->CurrentValue;
        $this->HT->PlaceHolder = RemoveHtml($this->HT->caption());

        // WT
        $this->WT->EditAttrs["class"] = "form-control";
        $this->WT->EditCustomAttributes = "";
        if (!$this->WT->Raw) {
            $this->WT->CurrentValue = HtmlDecode($this->WT->CurrentValue);
        }
        $this->WT->EditValue = $this->WT->CurrentValue;
        $this->WT->PlaceHolder = RemoveHtml($this->WT->caption());

        // SurfaceArea
        $this->SurfaceArea->EditAttrs["class"] = "form-control";
        $this->SurfaceArea->EditCustomAttributes = "";
        if (!$this->SurfaceArea->Raw) {
            $this->SurfaceArea->CurrentValue = HtmlDecode($this->SurfaceArea->CurrentValue);
        }
        $this->SurfaceArea->EditValue = $this->SurfaceArea->CurrentValue;
        $this->SurfaceArea->PlaceHolder = RemoveHtml($this->SurfaceArea->caption());

        // BodyMassIndex
        $this->BodyMassIndex->EditAttrs["class"] = "form-control";
        $this->BodyMassIndex->EditCustomAttributes = "";
        if (!$this->BodyMassIndex->Raw) {
            $this->BodyMassIndex->CurrentValue = HtmlDecode($this->BodyMassIndex->CurrentValue);
        }
        $this->BodyMassIndex->EditValue = $this->BodyMassIndex->CurrentValue;
        $this->BodyMassIndex->PlaceHolder = RemoveHtml($this->BodyMassIndex->caption());

        // ClinicalFindings
        $this->ClinicalFindings->EditAttrs["class"] = "form-control";
        $this->ClinicalFindings->EditCustomAttributes = "";
        $this->ClinicalFindings->EditValue = $this->ClinicalFindings->CurrentValue;
        $this->ClinicalFindings->PlaceHolder = RemoveHtml($this->ClinicalFindings->caption());

        // ClinicalDiagnosis
        $this->ClinicalDiagnosis->EditAttrs["class"] = "form-control";
        $this->ClinicalDiagnosis->EditCustomAttributes = "";
        $this->ClinicalDiagnosis->EditValue = $this->ClinicalDiagnosis->CurrentValue;
        $this->ClinicalDiagnosis->PlaceHolder = RemoveHtml($this->ClinicalDiagnosis->caption());

        // AnticoagulantifAny
        $this->AnticoagulantifAny->EditAttrs["class"] = "form-control";
        $this->AnticoagulantifAny->EditCustomAttributes = "";
        if (!$this->AnticoagulantifAny->Raw) {
            $this->AnticoagulantifAny->CurrentValue = HtmlDecode($this->AnticoagulantifAny->CurrentValue);
        }
        $this->AnticoagulantifAny->EditValue = $this->AnticoagulantifAny->CurrentValue;
        $this->AnticoagulantifAny->PlaceHolder = RemoveHtml($this->AnticoagulantifAny->caption());

        // FoodAllergies
        $this->FoodAllergies->EditAttrs["class"] = "form-control";
        $this->FoodAllergies->EditCustomAttributes = "";
        if (!$this->FoodAllergies->Raw) {
            $this->FoodAllergies->CurrentValue = HtmlDecode($this->FoodAllergies->CurrentValue);
        }
        $this->FoodAllergies->EditValue = $this->FoodAllergies->CurrentValue;
        $this->FoodAllergies->PlaceHolder = RemoveHtml($this->FoodAllergies->caption());

        // GenericAllergies
        $this->GenericAllergies->EditAttrs["class"] = "form-control";
        $this->GenericAllergies->EditCustomAttributes = "";
        $this->GenericAllergies->PlaceHolder = RemoveHtml($this->GenericAllergies->caption());

        // GroupAllergies
        $this->GroupAllergies->EditAttrs["class"] = "form-control";
        $this->GroupAllergies->EditCustomAttributes = "";
        $this->GroupAllergies->PlaceHolder = RemoveHtml($this->GroupAllergies->caption());

        // Temp
        $this->Temp->EditAttrs["class"] = "form-control";
        $this->Temp->EditCustomAttributes = "";
        if (!$this->Temp->Raw) {
            $this->Temp->CurrentValue = HtmlDecode($this->Temp->CurrentValue);
        }
        $this->Temp->EditValue = $this->Temp->CurrentValue;
        $this->Temp->PlaceHolder = RemoveHtml($this->Temp->caption());

        // Pulse
        $this->Pulse->EditAttrs["class"] = "form-control";
        $this->Pulse->EditCustomAttributes = "";
        if (!$this->Pulse->Raw) {
            $this->Pulse->CurrentValue = HtmlDecode($this->Pulse->CurrentValue);
        }
        $this->Pulse->EditValue = $this->Pulse->CurrentValue;
        $this->Pulse->PlaceHolder = RemoveHtml($this->Pulse->caption());

        // BP
        $this->BP->EditAttrs["class"] = "form-control";
        $this->BP->EditCustomAttributes = "";
        if (!$this->BP->Raw) {
            $this->BP->CurrentValue = HtmlDecode($this->BP->CurrentValue);
        }
        $this->BP->EditValue = $this->BP->CurrentValue;
        $this->BP->PlaceHolder = RemoveHtml($this->BP->caption());

        // PR
        $this->PR->EditAttrs["class"] = "form-control";
        $this->PR->EditCustomAttributes = "";
        if (!$this->PR->Raw) {
            $this->PR->CurrentValue = HtmlDecode($this->PR->CurrentValue);
        }
        $this->PR->EditValue = $this->PR->CurrentValue;
        $this->PR->PlaceHolder = RemoveHtml($this->PR->caption());

        // CNS
        $this->CNS->EditAttrs["class"] = "form-control";
        $this->CNS->EditCustomAttributes = "";
        if (!$this->CNS->Raw) {
            $this->CNS->CurrentValue = HtmlDecode($this->CNS->CurrentValue);
        }
        $this->CNS->EditValue = $this->CNS->CurrentValue;
        $this->CNS->PlaceHolder = RemoveHtml($this->CNS->caption());

        // RSA
        $this->RSA->EditAttrs["class"] = "form-control";
        $this->RSA->EditCustomAttributes = "";
        if (!$this->RSA->Raw) {
            $this->RSA->CurrentValue = HtmlDecode($this->RSA->CurrentValue);
        }
        $this->RSA->EditValue = $this->RSA->CurrentValue;
        $this->RSA->PlaceHolder = RemoveHtml($this->RSA->caption());

        // CVS
        $this->CVS->EditAttrs["class"] = "form-control";
        $this->CVS->EditCustomAttributes = "";
        if (!$this->CVS->Raw) {
            $this->CVS->CurrentValue = HtmlDecode($this->CVS->CurrentValue);
        }
        $this->CVS->EditValue = $this->CVS->CurrentValue;
        $this->CVS->PlaceHolder = RemoveHtml($this->CVS->caption());

        // PA
        $this->PA->EditAttrs["class"] = "form-control";
        $this->PA->EditCustomAttributes = "";
        if (!$this->PA->Raw) {
            $this->PA->CurrentValue = HtmlDecode($this->PA->CurrentValue);
        }
        $this->PA->EditValue = $this->PA->CurrentValue;
        $this->PA->PlaceHolder = RemoveHtml($this->PA->caption());

        // PS
        $this->PS->EditAttrs["class"] = "form-control";
        $this->PS->EditCustomAttributes = "";
        if (!$this->PS->Raw) {
            $this->PS->CurrentValue = HtmlDecode($this->PS->CurrentValue);
        }
        $this->PS->EditValue = $this->PS->CurrentValue;
        $this->PS->PlaceHolder = RemoveHtml($this->PS->caption());

        // PV
        $this->PV->EditAttrs["class"] = "form-control";
        $this->PV->EditCustomAttributes = "";
        if (!$this->PV->Raw) {
            $this->PV->CurrentValue = HtmlDecode($this->PV->CurrentValue);
        }
        $this->PV->EditValue = $this->PV->CurrentValue;
        $this->PV->PlaceHolder = RemoveHtml($this->PV->caption());

        // clinicaldetails
        $this->clinicaldetails->EditCustomAttributes = "";
        $this->clinicaldetails->PlaceHolder = RemoveHtml($this->clinicaldetails->caption());

        // status
        $this->status->EditAttrs["class"] = "form-control";
        $this->status->EditCustomAttributes = "";
        $this->status->PlaceHolder = RemoveHtml($this->status->caption());

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // Age
        $this->Age->EditAttrs["class"] = "form-control";
        $this->Age->EditCustomAttributes = "";
        if (!$this->Age->Raw) {
            $this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
        }
        $this->Age->EditValue = $this->Age->CurrentValue;
        $this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

        // Gender
        $this->Gender->EditAttrs["class"] = "form-control";
        $this->Gender->EditCustomAttributes = "";
        if (!$this->Gender->Raw) {
            $this->Gender->CurrentValue = HtmlDecode($this->Gender->CurrentValue);
        }
        $this->Gender->EditValue = $this->Gender->CurrentValue;
        $this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

        // PatientSearch
        $this->PatientSearch->EditAttrs["class"] = "form-control";
        $this->PatientSearch->EditCustomAttributes = "";
        $this->PatientSearch->PlaceHolder = RemoveHtml($this->PatientSearch->caption());

        // PatientId
        $this->PatientId->EditAttrs["class"] = "form-control";
        $this->PatientId->EditCustomAttributes = "";
        $this->PatientId->EditValue = $this->PatientId->CurrentValue;
        $this->PatientId->ViewCustomAttributes = "";

        // Reception
        $this->Reception->EditAttrs["class"] = "form-control";
        $this->Reception->EditCustomAttributes = "";
        $this->Reception->EditValue = $this->Reception->CurrentValue;
        $this->Reception->EditValue = FormatNumber($this->Reception->EditValue, 0, -2, -2, -2);
        $this->Reception->ViewCustomAttributes = "";

        // HospID

        // Call Row Rendered event
        $this->rowRendered();
    }

    // Aggregate list row values
    public function aggregateListRowValues()
    {
    }

    // Aggregate list row (for rendering)
    public function aggregateListRow()
    {
        // Call Row Rendered event
        $this->rowRendered();
    }

    // Export data in HTML/CSV/Word/Excel/Email/PDF format
    public function exportDocument($doc, $recordset, $startRec = 1, $stopRec = 1, $exportPageType = "")
    {
        if (!$recordset || !$doc) {
            return;
        }
        if (!$doc->ExportCustom) {
            // Write header
            $doc->exportTableHeader();
            if ($doc->Horizontal) { // Horizontal format, write header
                $doc->beginExportRow();
                if ($exportPageType == "view") {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->mrnno);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->PatID);
                    $doc->exportCaption($this->MobileNumber);
                    $doc->exportCaption($this->profilePic);
                    $doc->exportCaption($this->HT);
                    $doc->exportCaption($this->WT);
                    $doc->exportCaption($this->SurfaceArea);
                    $doc->exportCaption($this->BodyMassIndex);
                    $doc->exportCaption($this->ClinicalFindings);
                    $doc->exportCaption($this->ClinicalDiagnosis);
                    $doc->exportCaption($this->AnticoagulantifAny);
                    $doc->exportCaption($this->FoodAllergies);
                    $doc->exportCaption($this->GenericAllergies);
                    $doc->exportCaption($this->GroupAllergies);
                    $doc->exportCaption($this->Temp);
                    $doc->exportCaption($this->Pulse);
                    $doc->exportCaption($this->BP);
                    $doc->exportCaption($this->PR);
                    $doc->exportCaption($this->CNS);
                    $doc->exportCaption($this->RSA);
                    $doc->exportCaption($this->CVS);
                    $doc->exportCaption($this->PA);
                    $doc->exportCaption($this->PS);
                    $doc->exportCaption($this->PV);
                    $doc->exportCaption($this->clinicaldetails);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->Age);
                    $doc->exportCaption($this->Gender);
                    $doc->exportCaption($this->PatientSearch);
                    $doc->exportCaption($this->PatientId);
                    $doc->exportCaption($this->Reception);
                    $doc->exportCaption($this->HospID);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->mrnno);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->PatID);
                    $doc->exportCaption($this->MobileNumber);
                    $doc->exportCaption($this->HT);
                    $doc->exportCaption($this->WT);
                    $doc->exportCaption($this->SurfaceArea);
                    $doc->exportCaption($this->BodyMassIndex);
                    $doc->exportCaption($this->AnticoagulantifAny);
                    $doc->exportCaption($this->FoodAllergies);
                    $doc->exportCaption($this->GenericAllergies);
                    $doc->exportCaption($this->GroupAllergies);
                    $doc->exportCaption($this->Temp);
                    $doc->exportCaption($this->Pulse);
                    $doc->exportCaption($this->BP);
                    $doc->exportCaption($this->PR);
                    $doc->exportCaption($this->CNS);
                    $doc->exportCaption($this->RSA);
                    $doc->exportCaption($this->CVS);
                    $doc->exportCaption($this->PA);
                    $doc->exportCaption($this->PS);
                    $doc->exportCaption($this->PV);
                    $doc->exportCaption($this->clinicaldetails);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->Age);
                    $doc->exportCaption($this->Gender);
                    $doc->exportCaption($this->PatientId);
                    $doc->exportCaption($this->Reception);
                    $doc->exportCaption($this->HospID);
                }
                $doc->endExportRow();
            }
        }

        // Move to first record
        $recCnt = $startRec - 1;
        $stopRec = ($stopRec > 0) ? $stopRec : PHP_INT_MAX;
        while (!$recordset->EOF && $recCnt < $stopRec) {
            $row = $recordset->fields;
            $recCnt++;
            if ($recCnt >= $startRec) {
                $rowCnt = $recCnt - $startRec + 1;

                // Page break
                if ($this->ExportPageBreakCount > 0) {
                    if ($rowCnt > 1 && ($rowCnt - 1) % $this->ExportPageBreakCount == 0) {
                        $doc->exportPageBreak();
                    }
                }
                $this->loadListRowValues($row);

                // Render row
                $this->RowType = ROWTYPE_VIEW; // Render view
                $this->resetAttributes();
                $this->renderListRow();
                if (!$doc->ExportCustom) {
                    $doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
                    if ($exportPageType == "view") {
                        $doc->exportField($this->id);
                        $doc->exportField($this->mrnno);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->PatID);
                        $doc->exportField($this->MobileNumber);
                        $doc->exportField($this->profilePic);
                        $doc->exportField($this->HT);
                        $doc->exportField($this->WT);
                        $doc->exportField($this->SurfaceArea);
                        $doc->exportField($this->BodyMassIndex);
                        $doc->exportField($this->ClinicalFindings);
                        $doc->exportField($this->ClinicalDiagnosis);
                        $doc->exportField($this->AnticoagulantifAny);
                        $doc->exportField($this->FoodAllergies);
                        $doc->exportField($this->GenericAllergies);
                        $doc->exportField($this->GroupAllergies);
                        $doc->exportField($this->Temp);
                        $doc->exportField($this->Pulse);
                        $doc->exportField($this->BP);
                        $doc->exportField($this->PR);
                        $doc->exportField($this->CNS);
                        $doc->exportField($this->RSA);
                        $doc->exportField($this->CVS);
                        $doc->exportField($this->PA);
                        $doc->exportField($this->PS);
                        $doc->exportField($this->PV);
                        $doc->exportField($this->clinicaldetails);
                        $doc->exportField($this->status);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->Age);
                        $doc->exportField($this->Gender);
                        $doc->exportField($this->PatientSearch);
                        $doc->exportField($this->PatientId);
                        $doc->exportField($this->Reception);
                        $doc->exportField($this->HospID);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->mrnno);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->PatID);
                        $doc->exportField($this->MobileNumber);
                        $doc->exportField($this->HT);
                        $doc->exportField($this->WT);
                        $doc->exportField($this->SurfaceArea);
                        $doc->exportField($this->BodyMassIndex);
                        $doc->exportField($this->AnticoagulantifAny);
                        $doc->exportField($this->FoodAllergies);
                        $doc->exportField($this->GenericAllergies);
                        $doc->exportField($this->GroupAllergies);
                        $doc->exportField($this->Temp);
                        $doc->exportField($this->Pulse);
                        $doc->exportField($this->BP);
                        $doc->exportField($this->PR);
                        $doc->exportField($this->CNS);
                        $doc->exportField($this->RSA);
                        $doc->exportField($this->CVS);
                        $doc->exportField($this->PA);
                        $doc->exportField($this->PS);
                        $doc->exportField($this->PV);
                        $doc->exportField($this->clinicaldetails);
                        $doc->exportField($this->status);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->Age);
                        $doc->exportField($this->Gender);
                        $doc->exportField($this->PatientId);
                        $doc->exportField($this->Reception);
                        $doc->exportField($this->HospID);
                    }
                    $doc->endExportRow($rowCnt);
                }
            }

            // Call Row Export server event
            if ($doc->ExportCustom) {
                $this->rowExport($row);
            }
            $recordset->moveNext();
        }
        if (!$doc->ExportCustom) {
            $doc->exportTableFooter();
        }
    }

    // Get file data
    public function getFileData($fldparm, $key, $resize, $width = 0, $height = 0, $plugins = [])
    {
        // No binary fields
        return false;
    }

    // Table level events

    // Recordset Selecting event
    public function recordsetSelecting(&$filter)
    {
        // Enter your code here
    }

    // Recordset Selected event
    public function recordsetSelected(&$rs)
    {
        //Log("Recordset Selected");
    }

    // Recordset Search Validated event
    public function recordsetSearchValidated()
    {
        // Example:
        //$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value
    }

    // Recordset Searching event
    public function recordsetSearching(&$filter)
    {
        // Enter your code here
    }

    // Row_Selecting event
    public function rowSelecting(&$filter)
    {
        // Enter your code here
    }

    // Row Selected event
    public function rowSelected(&$rs)
    {
        //Log("Row Selected");
    }

    // Row Inserting event
    public function rowInserting($rsold, &$rsnew) {
    	// Enter your code here
    	// To cancel, set return value to FALSE
    		if($rsnew["PatID"]=="")
    		{
    				$dbhelper = &DbHelper();
    				$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$rsnew["PatientId"]."'; ";
    				$results2 = $dbhelper->ExecuteRows($sql);
    				$rsnew["PatientName"] = $results2[0]["first_name"];
    				$rsnew["Age"] = $results2[0]["Age"];
    				$rsnew["Gender"] = $results2[0]["gender"];
    				$rsnew["profilePic"] = $results2[0]["profilePic"];
    				$rsnew["PatID"] = $results2[0]["PatientID"];
    				$rsnew["MobileNumber"] = $results2[0]["mobile_no"];
    		}
    	return TRUE;
    }

    // Row Inserted event
    public function rowInserted($rsold, &$rsnew)
    {
        //Log("Row Inserted");
    }

    // Row Updating event
    public function rowUpdating($rsold, &$rsnew)
    {
        // Enter your code here
        // To cancel, set return value to false
        return true;
    }

    // Row Updated event
    public function rowUpdated($rsold, &$rsnew)
    {
        //Log("Row Updated");
    }

    // Row Update Conflict event
    public function rowUpdateConflict($rsold, &$rsnew)
    {
        // Enter your code here
        // To ignore conflict, set return value to false
        return true;
    }

    // Grid Inserting event
    public function gridInserting()
    {
        // Enter your code here
        // To reject grid insert, set return value to false
        return true;
    }

    // Grid Inserted event
    public function gridInserted($rsnew)
    {
        //Log("Grid Inserted");
    }

    // Grid Updating event
    public function gridUpdating($rsold)
    {
        // Enter your code here
        // To reject grid update, set return value to false
        return true;
    }

    // Grid Updated event
    public function gridUpdated($rsold, $rsnew)
    {
        //Log("Grid Updated");
    }

    // Row Deleting event
    public function rowDeleting(&$rs)
    {
        // Enter your code here
        // To cancel, set return value to False
        return true;
    }

    // Row Deleted event
    public function rowDeleted(&$rs)
    {
        //Log("Row Deleted");
    }

    // Email Sending event
    public function emailSending($email, &$args)
    {
        //var_dump($email); var_dump($args); exit();
        return true;
    }

    // Lookup Selecting event
    public function lookupSelecting($fld, &$filter)
    {
        //var_dump($fld->Name, $fld->Lookup, $filter); // Uncomment to view the filter
        // Enter your code here
    }

    // Row Rendering event
    public function rowRendering()
    {
        // Enter your code here
    }

    // Row Rendered event
    public function rowRendered()
    {
        // To view properties of field class, use:
        //var_dump($this-><FieldName>);
    }

    // User ID Filtering event
    public function userIdFiltering(&$filter)
    {
        // Enter your code here
    }
}
