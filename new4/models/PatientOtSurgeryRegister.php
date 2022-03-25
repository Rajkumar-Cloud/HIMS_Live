<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for patient_ot_surgery_register
 */
class PatientOtSurgeryRegister extends DbTable
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
    public $PatID;
    public $PatientName;
    public $mrnno;
    public $MobileNumber;
    public $Age;
    public $Gender;
    public $profilePic;
    public $diagnosis;
    public $proposedSurgery;
    public $surgeryProcedure;
    public $typeOfAnaesthesia;
    public $RecievedTime;
    public $AnaesthesiaStarted;
    public $AnaesthesiaEnded;
    public $surgeryStarted;
    public $surgeryEnded;
    public $RecoveryTime;
    public $ShiftedTime;
    public $Duration;
    public $Surgeon;
    public $Anaesthetist;
    public $AsstSurgeon1;
    public $AsstSurgeon2;
    public $paediatric;
    public $ScrubNurse1;
    public $ScrubNurse2;
    public $FloorNurse;
    public $Technician;
    public $HouseKeeping;
    public $countsCheckedMops;
    public $gauze;
    public $needles;
    public $bloodloss;
    public $bloodtransfusion;
    public $implantsUsed;
    public $MaterialsForHPE;
    public $status;
    public $createdby;
    public $createddatetime;
    public $modifiedby;
    public $modifieddatetime;
    public $HospID;
    public $PatientSearch;
    public $Reception;
    public $PatientID;
    public $PId;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'patient_ot_surgery_register';
        $this->TableName = 'patient_ot_surgery_register';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`patient_ot_surgery_register`";
        $this->Dbid = 'DB';
        $this->ExportAll = true;
        $this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
        $this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
        $this->ExportPageSize = "a4"; // Page size (PDF only)
        $this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
        $this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
        $this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
        $this->ExportWordColumnWidth = null; // Cell width (PHPWord only)
        $this->DetailAdd = false; // Allow detail add
        $this->DetailEdit = false; // Allow detail edit
        $this->DetailView = false; // Allow detail view
        $this->ShowMultipleDetails = false; // Show multiple details
        $this->GridAddRowCount = 5;
        $this->AllowAddDeleteRow = true; // Allow add/delete row
        $this->UserIDAllowSecurity = Config("DEFAULT_USER_ID_ALLOW_SECURITY"); // Default User ID allowed permissions
        $this->BasicSearch = new BasicSearch($this->TableVar);

        // id
        $this->id = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // PatID
        $this->PatID = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_PatID', 'PatID', '`PatID`', '`PatID`', 200, 45, -1, false, '`PatID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatID->Sortable = true; // Allow sort
        $this->PatID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatID->Param, "CustomMsg");
        $this->Fields['PatID'] = &$this->PatID;

        // PatientName
        $this->PatientName = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, false, '`PatientName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientName->Sortable = true; // Allow sort
        $this->PatientName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientName->Param, "CustomMsg");
        $this->Fields['PatientName'] = &$this->PatientName;

        // mrnno
        $this->mrnno = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_mrnno', 'mrnno', '`mrnno`', '`mrnno`', 200, 45, -1, false, '`mrnno`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->mrnno->IsForeignKey = true; // Foreign key field
        $this->mrnno->Sortable = true; // Allow sort
        $this->mrnno->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->mrnno->Param, "CustomMsg");
        $this->Fields['mrnno'] = &$this->mrnno;

        // MobileNumber
        $this->MobileNumber = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_MobileNumber', 'MobileNumber', '`MobileNumber`', '`MobileNumber`', 200, 45, -1, false, '`MobileNumber`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MobileNumber->Sortable = true; // Allow sort
        $this->MobileNumber->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MobileNumber->Param, "CustomMsg");
        $this->Fields['MobileNumber'] = &$this->MobileNumber;

        // Age
        $this->Age = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_Age', 'Age', '`Age`', '`Age`', 200, 45, -1, false, '`Age`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Age->Sortable = true; // Allow sort
        $this->Age->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Age->Param, "CustomMsg");
        $this->Fields['Age'] = &$this->Age;

        // Gender
        $this->Gender = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_Gender', 'Gender', '`Gender`', '`Gender`', 200, 45, -1, false, '`Gender`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Gender->Sortable = true; // Allow sort
        $this->Gender->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Gender->Param, "CustomMsg");
        $this->Fields['Gender'] = &$this->Gender;

        // profilePic
        $this->profilePic = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_profilePic', 'profilePic', '`profilePic`', '`profilePic`', 201, 450, -1, false, '`profilePic`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->profilePic->Sortable = true; // Allow sort
        $this->profilePic->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->profilePic->Param, "CustomMsg");
        $this->Fields['profilePic'] = &$this->profilePic;

        // diagnosis
        $this->diagnosis = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_diagnosis', 'diagnosis', '`diagnosis`', '`diagnosis`', 201, 450, -1, false, '`diagnosis`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->diagnosis->Sortable = true; // Allow sort
        $this->diagnosis->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->diagnosis->Param, "CustomMsg");
        $this->Fields['diagnosis'] = &$this->diagnosis;

        // proposedSurgery
        $this->proposedSurgery = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_proposedSurgery', 'proposedSurgery', '`proposedSurgery`', '`proposedSurgery`', 201, 450, -1, false, '`proposedSurgery`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->proposedSurgery->Sortable = true; // Allow sort
        $this->proposedSurgery->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->proposedSurgery->Param, "CustomMsg");
        $this->Fields['proposedSurgery'] = &$this->proposedSurgery;

        // surgeryProcedure
        $this->surgeryProcedure = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_surgeryProcedure', 'surgeryProcedure', '`surgeryProcedure`', '`surgeryProcedure`', 201, 450, -1, false, '`surgeryProcedure`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->surgeryProcedure->Sortable = true; // Allow sort
        $this->surgeryProcedure->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->surgeryProcedure->Param, "CustomMsg");
        $this->Fields['surgeryProcedure'] = &$this->surgeryProcedure;

        // typeOfAnaesthesia
        $this->typeOfAnaesthesia = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_typeOfAnaesthesia', 'typeOfAnaesthesia', '`typeOfAnaesthesia`', '`typeOfAnaesthesia`', 201, 450, -1, false, '`typeOfAnaesthesia`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->typeOfAnaesthesia->Sortable = true; // Allow sort
        $this->typeOfAnaesthesia->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->typeOfAnaesthesia->Param, "CustomMsg");
        $this->Fields['typeOfAnaesthesia'] = &$this->typeOfAnaesthesia;

        // RecievedTime
        $this->RecievedTime = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_RecievedTime', 'RecievedTime', '`RecievedTime`', CastDateFieldForLike("`RecievedTime`", 11, "DB"), 135, 19, 11, false, '`RecievedTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RecievedTime->Sortable = true; // Allow sort
        $this->RecievedTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->RecievedTime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RecievedTime->Param, "CustomMsg");
        $this->Fields['RecievedTime'] = &$this->RecievedTime;

        // AnaesthesiaStarted
        $this->AnaesthesiaStarted = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_AnaesthesiaStarted', 'AnaesthesiaStarted', '`AnaesthesiaStarted`', CastDateFieldForLike("`AnaesthesiaStarted`", 11, "DB"), 135, 19, 11, false, '`AnaesthesiaStarted`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AnaesthesiaStarted->Sortable = true; // Allow sort
        $this->AnaesthesiaStarted->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->AnaesthesiaStarted->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AnaesthesiaStarted->Param, "CustomMsg");
        $this->Fields['AnaesthesiaStarted'] = &$this->AnaesthesiaStarted;

        // AnaesthesiaEnded
        $this->AnaesthesiaEnded = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_AnaesthesiaEnded', 'AnaesthesiaEnded', '`AnaesthesiaEnded`', CastDateFieldForLike("`AnaesthesiaEnded`", 11, "DB"), 135, 19, 11, false, '`AnaesthesiaEnded`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AnaesthesiaEnded->Sortable = true; // Allow sort
        $this->AnaesthesiaEnded->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->AnaesthesiaEnded->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AnaesthesiaEnded->Param, "CustomMsg");
        $this->Fields['AnaesthesiaEnded'] = &$this->AnaesthesiaEnded;

        // surgeryStarted
        $this->surgeryStarted = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_surgeryStarted', 'surgeryStarted', '`surgeryStarted`', CastDateFieldForLike("`surgeryStarted`", 11, "DB"), 135, 19, 11, false, '`surgeryStarted`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->surgeryStarted->Sortable = true; // Allow sort
        $this->surgeryStarted->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->surgeryStarted->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->surgeryStarted->Param, "CustomMsg");
        $this->Fields['surgeryStarted'] = &$this->surgeryStarted;

        // surgeryEnded
        $this->surgeryEnded = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_surgeryEnded', 'surgeryEnded', '`surgeryEnded`', CastDateFieldForLike("`surgeryEnded`", 17, "DB"), 135, 19, 17, false, '`surgeryEnded`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->surgeryEnded->Sortable = true; // Allow sort
        $this->surgeryEnded->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectShortDateDMY"));
        $this->surgeryEnded->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->surgeryEnded->Param, "CustomMsg");
        $this->Fields['surgeryEnded'] = &$this->surgeryEnded;

        // RecoveryTime
        $this->RecoveryTime = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_RecoveryTime', 'RecoveryTime', '`RecoveryTime`', CastDateFieldForLike("`RecoveryTime`", 11, "DB"), 135, 19, 11, false, '`RecoveryTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RecoveryTime->Sortable = true; // Allow sort
        $this->RecoveryTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->RecoveryTime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RecoveryTime->Param, "CustomMsg");
        $this->Fields['RecoveryTime'] = &$this->RecoveryTime;

        // ShiftedTime
        $this->ShiftedTime = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_ShiftedTime', 'ShiftedTime', '`ShiftedTime`', CastDateFieldForLike("`ShiftedTime`", 11, "DB"), 135, 19, 11, false, '`ShiftedTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ShiftedTime->Sortable = true; // Allow sort
        $this->ShiftedTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->ShiftedTime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ShiftedTime->Param, "CustomMsg");
        $this->Fields['ShiftedTime'] = &$this->ShiftedTime;

        // Duration
        $this->Duration = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_Duration', 'Duration', '`Duration`', '`Duration`', 200, 50, 3, false, '`Duration`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Duration->Sortable = true; // Allow sort
        $this->Duration->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Duration->Param, "CustomMsg");
        $this->Fields['Duration'] = &$this->Duration;

        // Surgeon
        $this->Surgeon = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_Surgeon', 'Surgeon', '`Surgeon`', '`Surgeon`', 200, 50, -1, false, '`Surgeon`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Surgeon->Sortable = true; // Allow sort
        $this->Surgeon->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Surgeon->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Surgeon->Lookup = new Lookup('Surgeon', 'doctors', false, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
        $this->Surgeon->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Surgeon->Param, "CustomMsg");
        $this->Fields['Surgeon'] = &$this->Surgeon;

        // Anaesthetist
        $this->Anaesthetist = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_Anaesthetist', 'Anaesthetist', '`Anaesthetist`', '`Anaesthetist`', 200, 50, -1, false, '`Anaesthetist`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Anaesthetist->Sortable = true; // Allow sort
        $this->Anaesthetist->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Anaesthetist->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Anaesthetist->Lookup = new Lookup('Anaesthetist', 'doctors', false, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
        $this->Anaesthetist->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Anaesthetist->Param, "CustomMsg");
        $this->Fields['Anaesthetist'] = &$this->Anaesthetist;

        // AsstSurgeon1
        $this->AsstSurgeon1 = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_AsstSurgeon1', 'AsstSurgeon1', '`AsstSurgeon1`', '`AsstSurgeon1`', 200, 50, -1, false, '`AsstSurgeon1`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->AsstSurgeon1->Sortable = true; // Allow sort
        $this->AsstSurgeon1->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->AsstSurgeon1->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->AsstSurgeon1->Lookup = new Lookup('AsstSurgeon1', 'doctors', false, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
        $this->AsstSurgeon1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AsstSurgeon1->Param, "CustomMsg");
        $this->Fields['AsstSurgeon1'] = &$this->AsstSurgeon1;

        // AsstSurgeon2
        $this->AsstSurgeon2 = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_AsstSurgeon2', 'AsstSurgeon2', '`AsstSurgeon2`', '`AsstSurgeon2`', 200, 50, -1, false, '`AsstSurgeon2`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->AsstSurgeon2->Sortable = true; // Allow sort
        $this->AsstSurgeon2->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->AsstSurgeon2->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->AsstSurgeon2->Lookup = new Lookup('AsstSurgeon2', 'doctors', false, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
        $this->AsstSurgeon2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AsstSurgeon2->Param, "CustomMsg");
        $this->Fields['AsstSurgeon2'] = &$this->AsstSurgeon2;

        // paediatric
        $this->paediatric = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_paediatric', 'paediatric', '`paediatric`', '`paediatric`', 200, 50, -1, false, '`paediatric`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->paediatric->Sortable = true; // Allow sort
        $this->paediatric->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->paediatric->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->paediatric->Lookup = new Lookup('paediatric', 'doctors', false, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
        $this->paediatric->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->paediatric->Param, "CustomMsg");
        $this->Fields['paediatric'] = &$this->paediatric;

        // ScrubNurse1
        $this->ScrubNurse1 = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_ScrubNurse1', 'ScrubNurse1', '`ScrubNurse1`', '`ScrubNurse1`', 200, 50, -1, false, '`ScrubNurse1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ScrubNurse1->Sortable = true; // Allow sort
        $this->ScrubNurse1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ScrubNurse1->Param, "CustomMsg");
        $this->Fields['ScrubNurse1'] = &$this->ScrubNurse1;

        // ScrubNurse2
        $this->ScrubNurse2 = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_ScrubNurse2', 'ScrubNurse2', '`ScrubNurse2`', '`ScrubNurse2`', 200, 50, -1, false, '`ScrubNurse2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ScrubNurse2->Sortable = true; // Allow sort
        $this->ScrubNurse2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ScrubNurse2->Param, "CustomMsg");
        $this->Fields['ScrubNurse2'] = &$this->ScrubNurse2;

        // FloorNurse
        $this->FloorNurse = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_FloorNurse', 'FloorNurse', '`FloorNurse`', '`FloorNurse`', 200, 50, -1, false, '`FloorNurse`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FloorNurse->Sortable = true; // Allow sort
        $this->FloorNurse->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FloorNurse->Param, "CustomMsg");
        $this->Fields['FloorNurse'] = &$this->FloorNurse;

        // Technician
        $this->Technician = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_Technician', 'Technician', '`Technician`', '`Technician`', 200, 50, -1, false, '`Technician`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Technician->Sortable = true; // Allow sort
        $this->Technician->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Technician->Param, "CustomMsg");
        $this->Fields['Technician'] = &$this->Technician;

        // HouseKeeping
        $this->HouseKeeping = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_HouseKeeping', 'HouseKeeping', '`HouseKeeping`', '`HouseKeeping`', 200, 50, -1, false, '`HouseKeeping`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HouseKeeping->Sortable = true; // Allow sort
        $this->HouseKeeping->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HouseKeeping->Param, "CustomMsg");
        $this->Fields['HouseKeeping'] = &$this->HouseKeeping;

        // countsCheckedMops
        $this->countsCheckedMops = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_countsCheckedMops', 'countsCheckedMops', '`countsCheckedMops`', '`countsCheckedMops`', 200, 50, -1, false, '`countsCheckedMops`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->countsCheckedMops->Sortable = true; // Allow sort
        $this->countsCheckedMops->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->countsCheckedMops->Param, "CustomMsg");
        $this->Fields['countsCheckedMops'] = &$this->countsCheckedMops;

        // gauze
        $this->gauze = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_gauze', 'gauze', '`gauze`', '`gauze`', 200, 50, -1, false, '`gauze`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->gauze->Sortable = true; // Allow sort
        $this->gauze->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->gauze->Param, "CustomMsg");
        $this->Fields['gauze'] = &$this->gauze;

        // needles
        $this->needles = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_needles', 'needles', '`needles`', '`needles`', 200, 50, -1, false, '`needles`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->needles->Sortable = true; // Allow sort
        $this->needles->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->needles->Param, "CustomMsg");
        $this->Fields['needles'] = &$this->needles;

        // bloodloss
        $this->bloodloss = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_bloodloss', 'bloodloss', '`bloodloss`', '`bloodloss`', 200, 50, -1, false, '`bloodloss`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->bloodloss->Sortable = true; // Allow sort
        $this->bloodloss->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->bloodloss->Param, "CustomMsg");
        $this->Fields['bloodloss'] = &$this->bloodloss;

        // bloodtransfusion
        $this->bloodtransfusion = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_bloodtransfusion', 'bloodtransfusion', '`bloodtransfusion`', '`bloodtransfusion`', 200, 50, -1, false, '`bloodtransfusion`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->bloodtransfusion->Sortable = true; // Allow sort
        $this->bloodtransfusion->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->bloodtransfusion->Param, "CustomMsg");
        $this->Fields['bloodtransfusion'] = &$this->bloodtransfusion;

        // implantsUsed
        $this->implantsUsed = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_implantsUsed', 'implantsUsed', '`implantsUsed`', '`implantsUsed`', 201, 450, -1, false, '`implantsUsed`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->implantsUsed->Sortable = true; // Allow sort
        $this->implantsUsed->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->implantsUsed->Param, "CustomMsg");
        $this->Fields['implantsUsed'] = &$this->implantsUsed;

        // MaterialsForHPE
        $this->MaterialsForHPE = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_MaterialsForHPE', 'MaterialsForHPE', '`MaterialsForHPE`', '`MaterialsForHPE`', 201, 450, -1, false, '`MaterialsForHPE`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->MaterialsForHPE->Sortable = true; // Allow sort
        $this->MaterialsForHPE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MaterialsForHPE->Param, "CustomMsg");
        $this->Fields['MaterialsForHPE'] = &$this->MaterialsForHPE;

        // status
        $this->status = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_status', 'status', '`status`', '`status`', 3, 11, -1, false, '`status`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->status->Sortable = true; // Allow sort
        $this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->status->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->status->Param, "CustomMsg");
        $this->Fields['status'] = &$this->status;

        // createdby
        $this->createdby = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, 11, -1, false, '`createdby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdby->Sortable = true; // Allow sort
        $this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->createdby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createdby->Param, "CustomMsg");
        $this->Fields['createdby'] = &$this->createdby;

        // createddatetime
        $this->createddatetime = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, false, '`createddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddatetime->Sortable = true; // Allow sort
        $this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->createddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createddatetime->Param, "CustomMsg");
        $this->Fields['createddatetime'] = &$this->createddatetime;

        // modifiedby
        $this->modifiedby = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, 11, -1, false, '`modifiedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifiedby->Sortable = true; // Allow sort
        $this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->modifiedby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifiedby->Param, "CustomMsg");
        $this->Fields['modifiedby'] = &$this->modifiedby;

        // modifieddatetime
        $this->modifieddatetime = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, false, '`modifieddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifieddatetime->Sortable = true; // Allow sort
        $this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->modifieddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifieddatetime->Param, "CustomMsg");
        $this->Fields['modifieddatetime'] = &$this->modifieddatetime;

        // HospID
        $this->HospID = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospID->Param, "CustomMsg");
        $this->Fields['HospID'] = &$this->HospID;

        // PatientSearch
        $this->PatientSearch = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_PatientSearch', 'PatientSearch', '\'\'', '\'\'', 201, 65530, -1, false, '\'\'', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->PatientSearch->IsCustom = true; // Custom field
        $this->PatientSearch->Sortable = true; // Allow sort
        $this->PatientSearch->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->PatientSearch->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->PatientSearch->Lookup = new Lookup('PatientSearch', 'ip_admission', false, 'id', ["mrnNo","patient_name","patient_id","mobileno"], [], [], [], [], [], [], '`id` DESC', '');
        $this->PatientSearch->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientSearch->Param, "CustomMsg");
        $this->Fields['PatientSearch'] = &$this->PatientSearch;

        // Reception
        $this->Reception = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_Reception', 'Reception', '`Reception`', '`Reception`', 3, 11, -1, false, '`Reception`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Reception->IsForeignKey = true; // Foreign key field
        $this->Reception->Sortable = true; // Allow sort
        $this->Reception->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Reception->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Reception->Param, "CustomMsg");
        $this->Fields['Reception'] = &$this->Reception;

        // PatientID
        $this->PatientID = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_PatientID', 'PatientID', '`PatientID`', '`PatientID`', 200, 45, -1, false, '`PatientID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientID->Sortable = true; // Allow sort
        $this->PatientID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientID->Param, "CustomMsg");
        $this->Fields['PatientID'] = &$this->PatientID;

        // PId
        $this->PId = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_PId', 'PId', '`PId`', '`PId`', 3, 11, -1, false, '`PId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PId->IsForeignKey = true; // Foreign key field
        $this->PId->Sortable = true; // Allow sort
        $this->PId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->PId->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PId->Param, "CustomMsg");
        $this->Fields['PId'] = &$this->PId;
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
        } else {
            $fld->setSort("");
        }
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
            if ($this->mrnno->getSessionValue() != "") {
                $masterFilter .= " AND " . GetForeignKeySql("`mrnNo`", $this->mrnno->getSessionValue(), DATATYPE_STRING, "DB");
            } else {
                return "";
            }
            if ($this->PId->getSessionValue() != "") {
                $masterFilter .= " AND " . GetForeignKeySql("`patient_id`", $this->PId->getSessionValue(), DATATYPE_NUMBER, "DB");
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
            if ($this->mrnno->getSessionValue() != "") {
                $detailFilter .= " AND " . GetForeignKeySql("`mrnno`", $this->mrnno->getSessionValue(), DATATYPE_STRING, "DB");
            } else {
                return "";
            }
            if ($this->PId->getSessionValue() != "") {
                $detailFilter .= " AND " . GetForeignKeySql("`PId`", $this->PId->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
        }
        return $detailFilter;
    }

    // Master filter
    public function sqlMasterFilter_ip_admission()
    {
        return "`id`=@id@ AND `mrnNo`='@mrnNo@' AND `patient_id`=@patient_id@";
    }
    // Detail filter
    public function sqlDetailFilter_ip_admission()
    {
        return "`Reception`=@Reception@ AND `mrnno`='@mrnno@' AND `PId`=@PId@";
    }

    // Table level SQL
    public function getSqlFrom() // From
    {
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`patient_ot_surgery_register`";
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
        $select = $this->getSqlSelect();
        $from = $this->getSqlFrom();
        $sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
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
        $sort = $this->getSessionOrderBy();
        if ($orderBy != "" && $sort != "") {
            $orderBy .= ", " . $sort;
        } elseif ($sort != "") {
            $orderBy = $sort;
        }
        return $orderBy;
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
        $sql = $this->buildSelectSql($select, $this->getSqlFrom(), $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
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
        $this->PatID->DbValue = $row['PatID'];
        $this->PatientName->DbValue = $row['PatientName'];
        $this->mrnno->DbValue = $row['mrnno'];
        $this->MobileNumber->DbValue = $row['MobileNumber'];
        $this->Age->DbValue = $row['Age'];
        $this->Gender->DbValue = $row['Gender'];
        $this->profilePic->DbValue = $row['profilePic'];
        $this->diagnosis->DbValue = $row['diagnosis'];
        $this->proposedSurgery->DbValue = $row['proposedSurgery'];
        $this->surgeryProcedure->DbValue = $row['surgeryProcedure'];
        $this->typeOfAnaesthesia->DbValue = $row['typeOfAnaesthesia'];
        $this->RecievedTime->DbValue = $row['RecievedTime'];
        $this->AnaesthesiaStarted->DbValue = $row['AnaesthesiaStarted'];
        $this->AnaesthesiaEnded->DbValue = $row['AnaesthesiaEnded'];
        $this->surgeryStarted->DbValue = $row['surgeryStarted'];
        $this->surgeryEnded->DbValue = $row['surgeryEnded'];
        $this->RecoveryTime->DbValue = $row['RecoveryTime'];
        $this->ShiftedTime->DbValue = $row['ShiftedTime'];
        $this->Duration->DbValue = $row['Duration'];
        $this->Surgeon->DbValue = $row['Surgeon'];
        $this->Anaesthetist->DbValue = $row['Anaesthetist'];
        $this->AsstSurgeon1->DbValue = $row['AsstSurgeon1'];
        $this->AsstSurgeon2->DbValue = $row['AsstSurgeon2'];
        $this->paediatric->DbValue = $row['paediatric'];
        $this->ScrubNurse1->DbValue = $row['ScrubNurse1'];
        $this->ScrubNurse2->DbValue = $row['ScrubNurse2'];
        $this->FloorNurse->DbValue = $row['FloorNurse'];
        $this->Technician->DbValue = $row['Technician'];
        $this->HouseKeeping->DbValue = $row['HouseKeeping'];
        $this->countsCheckedMops->DbValue = $row['countsCheckedMops'];
        $this->gauze->DbValue = $row['gauze'];
        $this->needles->DbValue = $row['needles'];
        $this->bloodloss->DbValue = $row['bloodloss'];
        $this->bloodtransfusion->DbValue = $row['bloodtransfusion'];
        $this->implantsUsed->DbValue = $row['implantsUsed'];
        $this->MaterialsForHPE->DbValue = $row['MaterialsForHPE'];
        $this->status->DbValue = $row['status'];
        $this->createdby->DbValue = $row['createdby'];
        $this->createddatetime->DbValue = $row['createddatetime'];
        $this->modifiedby->DbValue = $row['modifiedby'];
        $this->modifieddatetime->DbValue = $row['modifieddatetime'];
        $this->HospID->DbValue = $row['HospID'];
        $this->PatientSearch->DbValue = $row['PatientSearch'];
        $this->Reception->DbValue = $row['Reception'];
        $this->PatientID->DbValue = $row['PatientID'];
        $this->PId->DbValue = $row['PId'];
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
        return $_SESSION[$name] ?? GetUrl("PatientOtSurgeryRegisterList");
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
        if ($pageName == "PatientOtSurgeryRegisterView") {
            return $Language->phrase("View");
        } elseif ($pageName == "PatientOtSurgeryRegisterEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "PatientOtSurgeryRegisterAdd") {
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
                return "PatientOtSurgeryRegisterView";
            case Config("API_ADD_ACTION"):
                return "PatientOtSurgeryRegisterAdd";
            case Config("API_EDIT_ACTION"):
                return "PatientOtSurgeryRegisterEdit";
            case Config("API_DELETE_ACTION"):
                return "PatientOtSurgeryRegisterDelete";
            case Config("API_LIST_ACTION"):
                return "PatientOtSurgeryRegisterList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "PatientOtSurgeryRegisterList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("PatientOtSurgeryRegisterView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("PatientOtSurgeryRegisterView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "PatientOtSurgeryRegisterAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "PatientOtSurgeryRegisterAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("PatientOtSurgeryRegisterEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("PatientOtSurgeryRegisterAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("PatientOtSurgeryRegisterDelete", $this->getUrlParm());
    }

    // Add master url
    public function addMasterUrl($url)
    {
        if ($this->getCurrentMasterTable() == "ip_admission" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
            $url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
            $url .= "&" . GetForeignKeyUrl("fk_id", $this->Reception->CurrentValue ?? $this->Reception->getSessionValue());
            $url .= "&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnno->CurrentValue ?? $this->mrnno->getSessionValue());
            $url .= "&" . GetForeignKeyUrl("fk_patient_id", $this->PId->CurrentValue ?? $this->PId->getSessionValue());
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
        $this->PatID->setDbValue($row['PatID']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->MobileNumber->setDbValue($row['MobileNumber']);
        $this->Age->setDbValue($row['Age']);
        $this->Gender->setDbValue($row['Gender']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->diagnosis->setDbValue($row['diagnosis']);
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
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->HospID->setDbValue($row['HospID']);
        $this->PatientSearch->setDbValue($row['PatientSearch']);
        $this->Reception->setDbValue($row['Reception']);
        $this->PatientID->setDbValue($row['PatientID']);
        $this->PId->setDbValue($row['PId']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // PatID

        // PatientName

        // mrnno

        // MobileNumber

        // Age

        // Gender

        // profilePic

        // diagnosis

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

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // HospID

        // PatientSearch

        // Reception

        // PatientID

        // PId

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

        // profilePic
        $this->profilePic->ViewValue = $this->profilePic->CurrentValue;
        $this->profilePic->ViewCustomAttributes = "";

        // diagnosis
        $this->diagnosis->ViewValue = $this->diagnosis->CurrentValue;
        $this->diagnosis->ViewCustomAttributes = "";

        // proposedSurgery
        $this->proposedSurgery->ViewValue = $this->proposedSurgery->CurrentValue;
        $this->proposedSurgery->ViewCustomAttributes = "";

        // surgeryProcedure
        $this->surgeryProcedure->ViewValue = $this->surgeryProcedure->CurrentValue;
        $this->surgeryProcedure->ViewCustomAttributes = "";

        // typeOfAnaesthesia
        $this->typeOfAnaesthesia->ViewValue = $this->typeOfAnaesthesia->CurrentValue;
        $this->typeOfAnaesthesia->ViewCustomAttributes = "";

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
        $this->surgeryEnded->ViewValue = FormatDateTime($this->surgeryEnded->ViewValue, 17);
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

        // implantsUsed
        $this->implantsUsed->ViewValue = $this->implantsUsed->CurrentValue;
        $this->implantsUsed->ViewCustomAttributes = "";

        // MaterialsForHPE
        $this->MaterialsForHPE->ViewValue = $this->MaterialsForHPE->CurrentValue;
        $this->MaterialsForHPE->ViewCustomAttributes = "";

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

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewCustomAttributes = "";

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

        // Reception
        $this->Reception->ViewValue = $this->Reception->CurrentValue;
        $this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
        $this->Reception->ViewCustomAttributes = "";

        // PatientID
        $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
        $this->PatientID->ViewCustomAttributes = "";

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

        // profilePic
        $this->profilePic->LinkCustomAttributes = "";
        $this->profilePic->HrefValue = "";
        $this->profilePic->TooltipValue = "";

        // diagnosis
        $this->diagnosis->LinkCustomAttributes = "";
        $this->diagnosis->HrefValue = "";
        $this->diagnosis->TooltipValue = "";

        // proposedSurgery
        $this->proposedSurgery->LinkCustomAttributes = "";
        $this->proposedSurgery->HrefValue = "";
        $this->proposedSurgery->TooltipValue = "";

        // surgeryProcedure
        $this->surgeryProcedure->LinkCustomAttributes = "";
        $this->surgeryProcedure->HrefValue = "";
        $this->surgeryProcedure->TooltipValue = "";

        // typeOfAnaesthesia
        $this->typeOfAnaesthesia->LinkCustomAttributes = "";
        $this->typeOfAnaesthesia->HrefValue = "";
        $this->typeOfAnaesthesia->TooltipValue = "";

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

        // implantsUsed
        $this->implantsUsed->LinkCustomAttributes = "";
        $this->implantsUsed->HrefValue = "";
        $this->implantsUsed->TooltipValue = "";

        // MaterialsForHPE
        $this->MaterialsForHPE->LinkCustomAttributes = "";
        $this->MaterialsForHPE->HrefValue = "";
        $this->MaterialsForHPE->TooltipValue = "";

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

        // HospID
        $this->HospID->LinkCustomAttributes = "";
        $this->HospID->HrefValue = "";
        $this->HospID->TooltipValue = "";

        // PatientSearch
        $this->PatientSearch->LinkCustomAttributes = "";
        $this->PatientSearch->HrefValue = "";
        $this->PatientSearch->TooltipValue = "";

        // Reception
        $this->Reception->LinkCustomAttributes = "";
        $this->Reception->HrefValue = "";
        $this->Reception->TooltipValue = "";

        // PatientID
        $this->PatientID->LinkCustomAttributes = "";
        $this->PatientID->HrefValue = "";
        $this->PatientID->TooltipValue = "";

        // PId
        $this->PId->LinkCustomAttributes = "";
        $this->PId->HrefValue = "";
        $this->PId->TooltipValue = "";

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

        // PatID
        $this->PatID->EditAttrs["class"] = "form-control";
        $this->PatID->EditCustomAttributes = "";
        if (!$this->PatID->Raw) {
            $this->PatID->CurrentValue = HtmlDecode($this->PatID->CurrentValue);
        }
        $this->PatID->EditValue = $this->PatID->CurrentValue;
        $this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

        // PatientName
        $this->PatientName->EditAttrs["class"] = "form-control";
        $this->PatientName->EditCustomAttributes = "";
        if (!$this->PatientName->Raw) {
            $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
        }
        $this->PatientName->EditValue = $this->PatientName->CurrentValue;
        $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

        // mrnno
        $this->mrnno->EditAttrs["class"] = "form-control";
        $this->mrnno->EditCustomAttributes = "";
        if ($this->mrnno->getSessionValue() != "") {
            $this->mrnno->CurrentValue = GetForeignKeyValue($this->mrnno->getSessionValue());
            $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";
        } else {
            if (!$this->mrnno->Raw) {
                $this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
            }
            $this->mrnno->EditValue = $this->mrnno->CurrentValue;
            $this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());
        }

        // MobileNumber
        $this->MobileNumber->EditAttrs["class"] = "form-control";
        $this->MobileNumber->EditCustomAttributes = "";
        if (!$this->MobileNumber->Raw) {
            $this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
        }
        $this->MobileNumber->EditValue = $this->MobileNumber->CurrentValue;
        $this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

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

        // profilePic
        $this->profilePic->EditAttrs["class"] = "form-control";
        $this->profilePic->EditCustomAttributes = "";
        $this->profilePic->EditValue = $this->profilePic->CurrentValue;
        $this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

        // diagnosis
        $this->diagnosis->EditAttrs["class"] = "form-control";
        $this->diagnosis->EditCustomAttributes = "";
        $this->diagnosis->EditValue = $this->diagnosis->CurrentValue;
        $this->diagnosis->PlaceHolder = RemoveHtml($this->diagnosis->caption());

        // proposedSurgery
        $this->proposedSurgery->EditAttrs["class"] = "form-control";
        $this->proposedSurgery->EditCustomAttributes = "";
        $this->proposedSurgery->EditValue = $this->proposedSurgery->CurrentValue;
        $this->proposedSurgery->PlaceHolder = RemoveHtml($this->proposedSurgery->caption());

        // surgeryProcedure
        $this->surgeryProcedure->EditAttrs["class"] = "form-control";
        $this->surgeryProcedure->EditCustomAttributes = "";
        $this->surgeryProcedure->EditValue = $this->surgeryProcedure->CurrentValue;
        $this->surgeryProcedure->PlaceHolder = RemoveHtml($this->surgeryProcedure->caption());

        // typeOfAnaesthesia
        $this->typeOfAnaesthesia->EditAttrs["class"] = "form-control";
        $this->typeOfAnaesthesia->EditCustomAttributes = "";
        $this->typeOfAnaesthesia->EditValue = $this->typeOfAnaesthesia->CurrentValue;
        $this->typeOfAnaesthesia->PlaceHolder = RemoveHtml($this->typeOfAnaesthesia->caption());

        // RecievedTime
        $this->RecievedTime->EditAttrs["class"] = "form-control";
        $this->RecievedTime->EditCustomAttributes = "";
        $this->RecievedTime->EditValue = FormatDateTime($this->RecievedTime->CurrentValue, 11);
        $this->RecievedTime->PlaceHolder = RemoveHtml($this->RecievedTime->caption());

        // AnaesthesiaStarted
        $this->AnaesthesiaStarted->EditAttrs["class"] = "form-control";
        $this->AnaesthesiaStarted->EditCustomAttributes = "";
        $this->AnaesthesiaStarted->EditValue = FormatDateTime($this->AnaesthesiaStarted->CurrentValue, 11);
        $this->AnaesthesiaStarted->PlaceHolder = RemoveHtml($this->AnaesthesiaStarted->caption());

        // AnaesthesiaEnded
        $this->AnaesthesiaEnded->EditAttrs["class"] = "form-control";
        $this->AnaesthesiaEnded->EditCustomAttributes = "";
        $this->AnaesthesiaEnded->EditValue = FormatDateTime($this->AnaesthesiaEnded->CurrentValue, 11);
        $this->AnaesthesiaEnded->PlaceHolder = RemoveHtml($this->AnaesthesiaEnded->caption());

        // surgeryStarted
        $this->surgeryStarted->EditAttrs["class"] = "form-control";
        $this->surgeryStarted->EditCustomAttributes = "";
        $this->surgeryStarted->EditValue = FormatDateTime($this->surgeryStarted->CurrentValue, 11);
        $this->surgeryStarted->PlaceHolder = RemoveHtml($this->surgeryStarted->caption());

        // surgeryEnded
        $this->surgeryEnded->EditAttrs["class"] = "form-control";
        $this->surgeryEnded->EditCustomAttributes = "";
        $this->surgeryEnded->EditValue = FormatDateTime($this->surgeryEnded->CurrentValue, 17);
        $this->surgeryEnded->PlaceHolder = RemoveHtml($this->surgeryEnded->caption());

        // RecoveryTime
        $this->RecoveryTime->EditAttrs["class"] = "form-control";
        $this->RecoveryTime->EditCustomAttributes = "";
        $this->RecoveryTime->EditValue = FormatDateTime($this->RecoveryTime->CurrentValue, 11);
        $this->RecoveryTime->PlaceHolder = RemoveHtml($this->RecoveryTime->caption());

        // ShiftedTime
        $this->ShiftedTime->EditAttrs["class"] = "form-control";
        $this->ShiftedTime->EditCustomAttributes = "";
        $this->ShiftedTime->EditValue = FormatDateTime($this->ShiftedTime->CurrentValue, 11);
        $this->ShiftedTime->PlaceHolder = RemoveHtml($this->ShiftedTime->caption());

        // Duration
        $this->Duration->EditAttrs["class"] = "form-control";
        $this->Duration->EditCustomAttributes = "";
        if (!$this->Duration->Raw) {
            $this->Duration->CurrentValue = HtmlDecode($this->Duration->CurrentValue);
        }
        $this->Duration->EditValue = $this->Duration->CurrentValue;
        $this->Duration->PlaceHolder = RemoveHtml($this->Duration->caption());

        // Surgeon
        $this->Surgeon->EditAttrs["class"] = "form-control";
        $this->Surgeon->EditCustomAttributes = "";
        $this->Surgeon->PlaceHolder = RemoveHtml($this->Surgeon->caption());

        // Anaesthetist
        $this->Anaesthetist->EditAttrs["class"] = "form-control";
        $this->Anaesthetist->EditCustomAttributes = "";
        $this->Anaesthetist->PlaceHolder = RemoveHtml($this->Anaesthetist->caption());

        // AsstSurgeon1
        $this->AsstSurgeon1->EditAttrs["class"] = "form-control";
        $this->AsstSurgeon1->EditCustomAttributes = "";
        $this->AsstSurgeon1->PlaceHolder = RemoveHtml($this->AsstSurgeon1->caption());

        // AsstSurgeon2
        $this->AsstSurgeon2->EditAttrs["class"] = "form-control";
        $this->AsstSurgeon2->EditCustomAttributes = "";
        $this->AsstSurgeon2->PlaceHolder = RemoveHtml($this->AsstSurgeon2->caption());

        // paediatric
        $this->paediatric->EditAttrs["class"] = "form-control";
        $this->paediatric->EditCustomAttributes = "";
        $this->paediatric->PlaceHolder = RemoveHtml($this->paediatric->caption());

        // ScrubNurse1
        $this->ScrubNurse1->EditAttrs["class"] = "form-control";
        $this->ScrubNurse1->EditCustomAttributes = "";
        if (!$this->ScrubNurse1->Raw) {
            $this->ScrubNurse1->CurrentValue = HtmlDecode($this->ScrubNurse1->CurrentValue);
        }
        $this->ScrubNurse1->EditValue = $this->ScrubNurse1->CurrentValue;
        $this->ScrubNurse1->PlaceHolder = RemoveHtml($this->ScrubNurse1->caption());

        // ScrubNurse2
        $this->ScrubNurse2->EditAttrs["class"] = "form-control";
        $this->ScrubNurse2->EditCustomAttributes = "";
        if (!$this->ScrubNurse2->Raw) {
            $this->ScrubNurse2->CurrentValue = HtmlDecode($this->ScrubNurse2->CurrentValue);
        }
        $this->ScrubNurse2->EditValue = $this->ScrubNurse2->CurrentValue;
        $this->ScrubNurse2->PlaceHolder = RemoveHtml($this->ScrubNurse2->caption());

        // FloorNurse
        $this->FloorNurse->EditAttrs["class"] = "form-control";
        $this->FloorNurse->EditCustomAttributes = "";
        if (!$this->FloorNurse->Raw) {
            $this->FloorNurse->CurrentValue = HtmlDecode($this->FloorNurse->CurrentValue);
        }
        $this->FloorNurse->EditValue = $this->FloorNurse->CurrentValue;
        $this->FloorNurse->PlaceHolder = RemoveHtml($this->FloorNurse->caption());

        // Technician
        $this->Technician->EditAttrs["class"] = "form-control";
        $this->Technician->EditCustomAttributes = "";
        if (!$this->Technician->Raw) {
            $this->Technician->CurrentValue = HtmlDecode($this->Technician->CurrentValue);
        }
        $this->Technician->EditValue = $this->Technician->CurrentValue;
        $this->Technician->PlaceHolder = RemoveHtml($this->Technician->caption());

        // HouseKeeping
        $this->HouseKeeping->EditAttrs["class"] = "form-control";
        $this->HouseKeeping->EditCustomAttributes = "";
        if (!$this->HouseKeeping->Raw) {
            $this->HouseKeeping->CurrentValue = HtmlDecode($this->HouseKeeping->CurrentValue);
        }
        $this->HouseKeeping->EditValue = $this->HouseKeeping->CurrentValue;
        $this->HouseKeeping->PlaceHolder = RemoveHtml($this->HouseKeeping->caption());

        // countsCheckedMops
        $this->countsCheckedMops->EditAttrs["class"] = "form-control";
        $this->countsCheckedMops->EditCustomAttributes = "";
        if (!$this->countsCheckedMops->Raw) {
            $this->countsCheckedMops->CurrentValue = HtmlDecode($this->countsCheckedMops->CurrentValue);
        }
        $this->countsCheckedMops->EditValue = $this->countsCheckedMops->CurrentValue;
        $this->countsCheckedMops->PlaceHolder = RemoveHtml($this->countsCheckedMops->caption());

        // gauze
        $this->gauze->EditAttrs["class"] = "form-control";
        $this->gauze->EditCustomAttributes = "";
        if (!$this->gauze->Raw) {
            $this->gauze->CurrentValue = HtmlDecode($this->gauze->CurrentValue);
        }
        $this->gauze->EditValue = $this->gauze->CurrentValue;
        $this->gauze->PlaceHolder = RemoveHtml($this->gauze->caption());

        // needles
        $this->needles->EditAttrs["class"] = "form-control";
        $this->needles->EditCustomAttributes = "";
        if (!$this->needles->Raw) {
            $this->needles->CurrentValue = HtmlDecode($this->needles->CurrentValue);
        }
        $this->needles->EditValue = $this->needles->CurrentValue;
        $this->needles->PlaceHolder = RemoveHtml($this->needles->caption());

        // bloodloss
        $this->bloodloss->EditAttrs["class"] = "form-control";
        $this->bloodloss->EditCustomAttributes = "";
        if (!$this->bloodloss->Raw) {
            $this->bloodloss->CurrentValue = HtmlDecode($this->bloodloss->CurrentValue);
        }
        $this->bloodloss->EditValue = $this->bloodloss->CurrentValue;
        $this->bloodloss->PlaceHolder = RemoveHtml($this->bloodloss->caption());

        // bloodtransfusion
        $this->bloodtransfusion->EditAttrs["class"] = "form-control";
        $this->bloodtransfusion->EditCustomAttributes = "";
        if (!$this->bloodtransfusion->Raw) {
            $this->bloodtransfusion->CurrentValue = HtmlDecode($this->bloodtransfusion->CurrentValue);
        }
        $this->bloodtransfusion->EditValue = $this->bloodtransfusion->CurrentValue;
        $this->bloodtransfusion->PlaceHolder = RemoveHtml($this->bloodtransfusion->caption());

        // implantsUsed
        $this->implantsUsed->EditAttrs["class"] = "form-control";
        $this->implantsUsed->EditCustomAttributes = "";
        $this->implantsUsed->EditValue = $this->implantsUsed->CurrentValue;
        $this->implantsUsed->PlaceHolder = RemoveHtml($this->implantsUsed->caption());

        // MaterialsForHPE
        $this->MaterialsForHPE->EditAttrs["class"] = "form-control";
        $this->MaterialsForHPE->EditCustomAttributes = "";
        $this->MaterialsForHPE->EditValue = $this->MaterialsForHPE->CurrentValue;
        $this->MaterialsForHPE->PlaceHolder = RemoveHtml($this->MaterialsForHPE->caption());

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // HospID

        // PatientSearch
        $this->PatientSearch->EditAttrs["class"] = "form-control";
        $this->PatientSearch->EditCustomAttributes = "";
        $this->PatientSearch->PlaceHolder = RemoveHtml($this->PatientSearch->caption());

        // Reception
        $this->Reception->EditAttrs["class"] = "form-control";
        $this->Reception->EditCustomAttributes = "";
        if ($this->Reception->getSessionValue() != "") {
            $this->Reception->CurrentValue = GetForeignKeyValue($this->Reception->getSessionValue());
            $this->Reception->ViewValue = $this->Reception->CurrentValue;
            $this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
            $this->Reception->ViewCustomAttributes = "";
        } else {
            $this->Reception->EditValue = $this->Reception->CurrentValue;
            $this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());
        }

        // PatientID
        $this->PatientID->EditAttrs["class"] = "form-control";
        $this->PatientID->EditCustomAttributes = "";
        if (!$this->PatientID->Raw) {
            $this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
        }
        $this->PatientID->EditValue = $this->PatientID->CurrentValue;
        $this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

        // PId
        $this->PId->EditAttrs["class"] = "form-control";
        $this->PId->EditCustomAttributes = "";
        if ($this->PId->getSessionValue() != "") {
            $this->PId->CurrentValue = GetForeignKeyValue($this->PId->getSessionValue());
            $this->PId->ViewValue = $this->PId->CurrentValue;
            $this->PId->ViewValue = FormatNumber($this->PId->ViewValue, 0, -2, -2, -2);
            $this->PId->ViewCustomAttributes = "";
        } else {
            $this->PId->EditValue = $this->PId->CurrentValue;
            $this->PId->PlaceHolder = RemoveHtml($this->PId->caption());
        }

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
                    $doc->exportCaption($this->PatID);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->mrnno);
                    $doc->exportCaption($this->MobileNumber);
                    $doc->exportCaption($this->Age);
                    $doc->exportCaption($this->Gender);
                    $doc->exportCaption($this->profilePic);
                    $doc->exportCaption($this->diagnosis);
                    $doc->exportCaption($this->proposedSurgery);
                    $doc->exportCaption($this->surgeryProcedure);
                    $doc->exportCaption($this->typeOfAnaesthesia);
                    $doc->exportCaption($this->RecievedTime);
                    $doc->exportCaption($this->AnaesthesiaStarted);
                    $doc->exportCaption($this->AnaesthesiaEnded);
                    $doc->exportCaption($this->surgeryStarted);
                    $doc->exportCaption($this->surgeryEnded);
                    $doc->exportCaption($this->RecoveryTime);
                    $doc->exportCaption($this->ShiftedTime);
                    $doc->exportCaption($this->Duration);
                    $doc->exportCaption($this->Surgeon);
                    $doc->exportCaption($this->Anaesthetist);
                    $doc->exportCaption($this->AsstSurgeon1);
                    $doc->exportCaption($this->AsstSurgeon2);
                    $doc->exportCaption($this->paediatric);
                    $doc->exportCaption($this->ScrubNurse1);
                    $doc->exportCaption($this->ScrubNurse2);
                    $doc->exportCaption($this->FloorNurse);
                    $doc->exportCaption($this->Technician);
                    $doc->exportCaption($this->HouseKeeping);
                    $doc->exportCaption($this->countsCheckedMops);
                    $doc->exportCaption($this->gauze);
                    $doc->exportCaption($this->needles);
                    $doc->exportCaption($this->bloodloss);
                    $doc->exportCaption($this->bloodtransfusion);
                    $doc->exportCaption($this->implantsUsed);
                    $doc->exportCaption($this->MaterialsForHPE);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->PatientSearch);
                    $doc->exportCaption($this->Reception);
                    $doc->exportCaption($this->PatientID);
                    $doc->exportCaption($this->PId);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->PatID);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->mrnno);
                    $doc->exportCaption($this->MobileNumber);
                    $doc->exportCaption($this->Age);
                    $doc->exportCaption($this->Gender);
                    $doc->exportCaption($this->RecievedTime);
                    $doc->exportCaption($this->AnaesthesiaStarted);
                    $doc->exportCaption($this->AnaesthesiaEnded);
                    $doc->exportCaption($this->surgeryStarted);
                    $doc->exportCaption($this->surgeryEnded);
                    $doc->exportCaption($this->RecoveryTime);
                    $doc->exportCaption($this->ShiftedTime);
                    $doc->exportCaption($this->Duration);
                    $doc->exportCaption($this->Surgeon);
                    $doc->exportCaption($this->Anaesthetist);
                    $doc->exportCaption($this->AsstSurgeon1);
                    $doc->exportCaption($this->AsstSurgeon2);
                    $doc->exportCaption($this->paediatric);
                    $doc->exportCaption($this->ScrubNurse1);
                    $doc->exportCaption($this->ScrubNurse2);
                    $doc->exportCaption($this->FloorNurse);
                    $doc->exportCaption($this->Technician);
                    $doc->exportCaption($this->HouseKeeping);
                    $doc->exportCaption($this->countsCheckedMops);
                    $doc->exportCaption($this->gauze);
                    $doc->exportCaption($this->needles);
                    $doc->exportCaption($this->bloodloss);
                    $doc->exportCaption($this->bloodtransfusion);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->Reception);
                    $doc->exportCaption($this->PatientID);
                    $doc->exportCaption($this->PId);
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
                        $doc->exportField($this->PatID);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->mrnno);
                        $doc->exportField($this->MobileNumber);
                        $doc->exportField($this->Age);
                        $doc->exportField($this->Gender);
                        $doc->exportField($this->profilePic);
                        $doc->exportField($this->diagnosis);
                        $doc->exportField($this->proposedSurgery);
                        $doc->exportField($this->surgeryProcedure);
                        $doc->exportField($this->typeOfAnaesthesia);
                        $doc->exportField($this->RecievedTime);
                        $doc->exportField($this->AnaesthesiaStarted);
                        $doc->exportField($this->AnaesthesiaEnded);
                        $doc->exportField($this->surgeryStarted);
                        $doc->exportField($this->surgeryEnded);
                        $doc->exportField($this->RecoveryTime);
                        $doc->exportField($this->ShiftedTime);
                        $doc->exportField($this->Duration);
                        $doc->exportField($this->Surgeon);
                        $doc->exportField($this->Anaesthetist);
                        $doc->exportField($this->AsstSurgeon1);
                        $doc->exportField($this->AsstSurgeon2);
                        $doc->exportField($this->paediatric);
                        $doc->exportField($this->ScrubNurse1);
                        $doc->exportField($this->ScrubNurse2);
                        $doc->exportField($this->FloorNurse);
                        $doc->exportField($this->Technician);
                        $doc->exportField($this->HouseKeeping);
                        $doc->exportField($this->countsCheckedMops);
                        $doc->exportField($this->gauze);
                        $doc->exportField($this->needles);
                        $doc->exportField($this->bloodloss);
                        $doc->exportField($this->bloodtransfusion);
                        $doc->exportField($this->implantsUsed);
                        $doc->exportField($this->MaterialsForHPE);
                        $doc->exportField($this->status);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->PatientSearch);
                        $doc->exportField($this->Reception);
                        $doc->exportField($this->PatientID);
                        $doc->exportField($this->PId);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->PatID);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->mrnno);
                        $doc->exportField($this->MobileNumber);
                        $doc->exportField($this->Age);
                        $doc->exportField($this->Gender);
                        $doc->exportField($this->RecievedTime);
                        $doc->exportField($this->AnaesthesiaStarted);
                        $doc->exportField($this->AnaesthesiaEnded);
                        $doc->exportField($this->surgeryStarted);
                        $doc->exportField($this->surgeryEnded);
                        $doc->exportField($this->RecoveryTime);
                        $doc->exportField($this->ShiftedTime);
                        $doc->exportField($this->Duration);
                        $doc->exportField($this->Surgeon);
                        $doc->exportField($this->Anaesthetist);
                        $doc->exportField($this->AsstSurgeon1);
                        $doc->exportField($this->AsstSurgeon2);
                        $doc->exportField($this->paediatric);
                        $doc->exportField($this->ScrubNurse1);
                        $doc->exportField($this->ScrubNurse2);
                        $doc->exportField($this->FloorNurse);
                        $doc->exportField($this->Technician);
                        $doc->exportField($this->HouseKeeping);
                        $doc->exportField($this->countsCheckedMops);
                        $doc->exportField($this->gauze);
                        $doc->exportField($this->needles);
                        $doc->exportField($this->bloodloss);
                        $doc->exportField($this->bloodtransfusion);
                        $doc->exportField($this->status);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->Reception);
                        $doc->exportField($this->PatientID);
                        $doc->exportField($this->PId);
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
