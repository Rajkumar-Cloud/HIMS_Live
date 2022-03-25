<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for patient_ot_delivery_register
 */
class PatientOtDeliveryRegister extends DbTable
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
    public $ObstetricsHistryMale;
    public $ObstetricsHistryFeMale;
    public $Abortion;
    public $ChildBirthDate;
    public $ChildBirthTime;
    public $ChildSex;
    public $ChildWt;
    public $ChildDay;
    public $ChildOE;
    public $TypeofDelivery;
    public $ChildBlGrp;
    public $ApgarScore;
    public $birthnotification;
    public $formno;
    public $dte;
    public $motherReligion;
    public $bloodgroup;
    public $status;
    public $createdby;
    public $createddatetime;
    public $modifiedby;
    public $modifieddatetime;
    public $PatientID;
    public $HospID;
    public $ChildBirthDate1;
    public $ChildBirthTime1;
    public $ChildSex1;
    public $ChildWt1;
    public $ChildDay1;
    public $ChildOE1;
    public $TypeofDelivery1;
    public $ChildBlGrp1;
    public $ApgarScore1;
    public $birthnotification1;
    public $formno1;
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
    public $DrVisit1;
    public $DrVisit2;
    public $DrVisit3;
    public $DrVisit4;
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
    public $Reception;
    public $PId;
    public $PatientSearch;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'patient_ot_delivery_register';
        $this->TableName = 'patient_ot_delivery_register';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`patient_ot_delivery_register`";
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
        $this->id = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // PatID
        $this->PatID = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_PatID', 'PatID', '`PatID`', '`PatID`', 200, 45, -1, false, '`PatID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatID->Sortable = true; // Allow sort
        $this->PatID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatID->Param, "CustomMsg");
        $this->Fields['PatID'] = &$this->PatID;

        // PatientName
        $this->PatientName = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, false, '`PatientName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientName->Sortable = true; // Allow sort
        $this->PatientName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientName->Param, "CustomMsg");
        $this->Fields['PatientName'] = &$this->PatientName;

        // mrnno
        $this->mrnno = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_mrnno', 'mrnno', '`mrnno`', '`mrnno`', 200, 45, -1, false, '`mrnno`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->mrnno->IsForeignKey = true; // Foreign key field
        $this->mrnno->Sortable = true; // Allow sort
        $this->mrnno->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->mrnno->Param, "CustomMsg");
        $this->Fields['mrnno'] = &$this->mrnno;

        // MobileNumber
        $this->MobileNumber = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_MobileNumber', 'MobileNumber', '`MobileNumber`', '`MobileNumber`', 200, 45, -1, false, '`MobileNumber`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MobileNumber->Sortable = true; // Allow sort
        $this->MobileNumber->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MobileNumber->Param, "CustomMsg");
        $this->Fields['MobileNumber'] = &$this->MobileNumber;

        // Age
        $this->Age = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_Age', 'Age', '`Age`', '`Age`', 200, 45, -1, false, '`Age`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Age->Sortable = true; // Allow sort
        $this->Age->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Age->Param, "CustomMsg");
        $this->Fields['Age'] = &$this->Age;

        // Gender
        $this->Gender = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_Gender', 'Gender', '`Gender`', '`Gender`', 200, 45, -1, false, '`Gender`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Gender->Sortable = true; // Allow sort
        $this->Gender->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Gender->Param, "CustomMsg");
        $this->Fields['Gender'] = &$this->Gender;

        // profilePic
        $this->profilePic = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_profilePic', 'profilePic', '`profilePic`', '`profilePic`', 201, 450, -1, false, '`profilePic`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->profilePic->Sortable = true; // Allow sort
        $this->profilePic->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->profilePic->Param, "CustomMsg");
        $this->Fields['profilePic'] = &$this->profilePic;

        // ObstetricsHistryMale
        $this->ObstetricsHistryMale = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ObstetricsHistryMale', 'ObstetricsHistryMale', '`ObstetricsHistryMale`', '`ObstetricsHistryMale`', 200, 50, -1, false, '`ObstetricsHistryMale`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ObstetricsHistryMale->Sortable = false; // Allow sort
        $this->ObstetricsHistryMale->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ObstetricsHistryMale->Param, "CustomMsg");
        $this->Fields['ObstetricsHistryMale'] = &$this->ObstetricsHistryMale;

        // ObstetricsHistryFeMale
        $this->ObstetricsHistryFeMale = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ObstetricsHistryFeMale', 'ObstetricsHistryFeMale', '`ObstetricsHistryFeMale`', '`ObstetricsHistryFeMale`', 200, 50, -1, false, '`ObstetricsHistryFeMale`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ObstetricsHistryFeMale->Sortable = true; // Allow sort
        $this->ObstetricsHistryFeMale->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ObstetricsHistryFeMale->Param, "CustomMsg");
        $this->Fields['ObstetricsHistryFeMale'] = &$this->ObstetricsHistryFeMale;

        // Abortion
        $this->Abortion = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_Abortion', 'Abortion', '`Abortion`', '`Abortion`', 200, 50, -1, false, '`Abortion`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Abortion->Sortable = true; // Allow sort
        $this->Abortion->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Abortion->Param, "CustomMsg");
        $this->Fields['Abortion'] = &$this->Abortion;

        // ChildBirthDate
        $this->ChildBirthDate = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ChildBirthDate', 'ChildBirthDate', '`ChildBirthDate`', CastDateFieldForLike("`ChildBirthDate`", 7, "DB"), 135, 19, 7, false, '`ChildBirthDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ChildBirthDate->Sortable = true; // Allow sort
        $this->ChildBirthDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->ChildBirthDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ChildBirthDate->Param, "CustomMsg");
        $this->Fields['ChildBirthDate'] = &$this->ChildBirthDate;

        // ChildBirthTime
        $this->ChildBirthTime = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ChildBirthTime', 'ChildBirthTime', '`ChildBirthTime`', '`ChildBirthTime`', 200, 50, 3, false, '`ChildBirthTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ChildBirthTime->Sortable = true; // Allow sort
        $this->ChildBirthTime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ChildBirthTime->Param, "CustomMsg");
        $this->Fields['ChildBirthTime'] = &$this->ChildBirthTime;

        // ChildSex
        $this->ChildSex = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ChildSex', 'ChildSex', '`ChildSex`', '`ChildSex`', 200, 50, -1, false, '`ChildSex`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ChildSex->Sortable = true; // Allow sort
        $this->ChildSex->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ChildSex->Param, "CustomMsg");
        $this->Fields['ChildSex'] = &$this->ChildSex;

        // ChildWt
        $this->ChildWt = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ChildWt', 'ChildWt', '`ChildWt`', '`ChildWt`', 200, 50, -1, false, '`ChildWt`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ChildWt->Sortable = true; // Allow sort
        $this->ChildWt->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ChildWt->Param, "CustomMsg");
        $this->Fields['ChildWt'] = &$this->ChildWt;

        // ChildDay
        $this->ChildDay = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ChildDay', 'ChildDay', '`ChildDay`', '`ChildDay`', 200, 50, -1, false, '`ChildDay`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ChildDay->Sortable = true; // Allow sort
        $this->ChildDay->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ChildDay->Param, "CustomMsg");
        $this->Fields['ChildDay'] = &$this->ChildDay;

        // ChildOE
        $this->ChildOE = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ChildOE', 'ChildOE', '`ChildOE`', '`ChildOE`', 200, 50, -1, false, '`ChildOE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ChildOE->Sortable = true; // Allow sort
        $this->ChildOE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ChildOE->Param, "CustomMsg");
        $this->Fields['ChildOE'] = &$this->ChildOE;

        // TypeofDelivery
        $this->TypeofDelivery = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_TypeofDelivery', 'TypeofDelivery', '`TypeofDelivery`', '`TypeofDelivery`', 201, 450, -1, false, '`TypeofDelivery`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->TypeofDelivery->Sortable = true; // Allow sort
        $this->TypeofDelivery->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TypeofDelivery->Param, "CustomMsg");
        $this->Fields['TypeofDelivery'] = &$this->TypeofDelivery;

        // ChildBlGrp
        $this->ChildBlGrp = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ChildBlGrp', 'ChildBlGrp', '`ChildBlGrp`', '`ChildBlGrp`', 200, 50, -1, false, '`ChildBlGrp`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ChildBlGrp->Sortable = true; // Allow sort
        $this->ChildBlGrp->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ChildBlGrp->Param, "CustomMsg");
        $this->Fields['ChildBlGrp'] = &$this->ChildBlGrp;

        // ApgarScore
        $this->ApgarScore = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ApgarScore', 'ApgarScore', '`ApgarScore`', '`ApgarScore`', 200, 50, -1, false, '`ApgarScore`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ApgarScore->Sortable = true; // Allow sort
        $this->ApgarScore->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ApgarScore->Param, "CustomMsg");
        $this->Fields['ApgarScore'] = &$this->ApgarScore;

        // birthnotification
        $this->birthnotification = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_birthnotification', 'birthnotification', '`birthnotification`', '`birthnotification`', 200, 50, -1, false, '`birthnotification`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->birthnotification->Sortable = true; // Allow sort
        $this->birthnotification->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->birthnotification->Param, "CustomMsg");
        $this->Fields['birthnotification'] = &$this->birthnotification;

        // formno
        $this->formno = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_formno', 'formno', '`formno`', '`formno`', 200, 50, -1, false, '`formno`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->formno->Sortable = true; // Allow sort
        $this->formno->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->formno->Param, "CustomMsg");
        $this->Fields['formno'] = &$this->formno;

        // dte
        $this->dte = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_dte', 'dte', '`dte`', CastDateFieldForLike("`dte`", 0, "DB"), 135, 19, 0, false, '`dte`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->dte->Sortable = true; // Allow sort
        $this->dte->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->dte->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->dte->Param, "CustomMsg");
        $this->Fields['dte'] = &$this->dte;

        // motherReligion
        $this->motherReligion = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_motherReligion', 'motherReligion', '`motherReligion`', '`motherReligion`', 200, 50, -1, false, '`motherReligion`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->motherReligion->Sortable = true; // Allow sort
        $this->motherReligion->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->motherReligion->Param, "CustomMsg");
        $this->Fields['motherReligion'] = &$this->motherReligion;

        // bloodgroup
        $this->bloodgroup = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_bloodgroup', 'bloodgroup', '`bloodgroup`', '`bloodgroup`', 200, 50, -1, false, '`bloodgroup`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->bloodgroup->Sortable = true; // Allow sort
        $this->bloodgroup->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->bloodgroup->Param, "CustomMsg");
        $this->Fields['bloodgroup'] = &$this->bloodgroup;

        // status
        $this->status = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_status', 'status', '`status`', '`status`', 3, 11, -1, false, '`status`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->status->Sortable = true; // Allow sort
        $this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->status->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->status->Param, "CustomMsg");
        $this->Fields['status'] = &$this->status;

        // createdby
        $this->createdby = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, 11, -1, false, '`createdby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdby->Sortable = true; // Allow sort
        $this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->createdby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createdby->Param, "CustomMsg");
        $this->Fields['createdby'] = &$this->createdby;

        // createddatetime
        $this->createddatetime = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, false, '`createddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddatetime->Sortable = true; // Allow sort
        $this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->createddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createddatetime->Param, "CustomMsg");
        $this->Fields['createddatetime'] = &$this->createddatetime;

        // modifiedby
        $this->modifiedby = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, 11, -1, false, '`modifiedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifiedby->Sortable = true; // Allow sort
        $this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->modifiedby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifiedby->Param, "CustomMsg");
        $this->Fields['modifiedby'] = &$this->modifiedby;

        // modifieddatetime
        $this->modifieddatetime = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, false, '`modifieddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifieddatetime->Sortable = true; // Allow sort
        $this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->modifieddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifieddatetime->Param, "CustomMsg");
        $this->Fields['modifieddatetime'] = &$this->modifieddatetime;

        // PatientID
        $this->PatientID = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_PatientID', 'PatientID', '`PatientID`', '`PatientID`', 200, 45, -1, false, '`PatientID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientID->Sortable = true; // Allow sort
        $this->PatientID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientID->Param, "CustomMsg");
        $this->Fields['PatientID'] = &$this->PatientID;

        // HospID
        $this->HospID = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospID->Param, "CustomMsg");
        $this->Fields['HospID'] = &$this->HospID;

        // ChildBirthDate1
        $this->ChildBirthDate1 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ChildBirthDate1', 'ChildBirthDate1', '`ChildBirthDate1`', CastDateFieldForLike("`ChildBirthDate1`", 0, "DB"), 135, 19, 0, false, '`ChildBirthDate1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ChildBirthDate1->Sortable = true; // Allow sort
        $this->ChildBirthDate1->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->ChildBirthDate1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ChildBirthDate1->Param, "CustomMsg");
        $this->Fields['ChildBirthDate1'] = &$this->ChildBirthDate1;

        // ChildBirthTime1
        $this->ChildBirthTime1 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ChildBirthTime1', 'ChildBirthTime1', '`ChildBirthTime1`', '`ChildBirthTime1`', 200, 50, -1, false, '`ChildBirthTime1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ChildBirthTime1->Sortable = true; // Allow sort
        $this->ChildBirthTime1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ChildBirthTime1->Param, "CustomMsg");
        $this->Fields['ChildBirthTime1'] = &$this->ChildBirthTime1;

        // ChildSex1
        $this->ChildSex1 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ChildSex1', 'ChildSex1', '`ChildSex1`', '`ChildSex1`', 200, 50, -1, false, '`ChildSex1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ChildSex1->Sortable = true; // Allow sort
        $this->ChildSex1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ChildSex1->Param, "CustomMsg");
        $this->Fields['ChildSex1'] = &$this->ChildSex1;

        // ChildWt1
        $this->ChildWt1 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ChildWt1', 'ChildWt1', '`ChildWt1`', '`ChildWt1`', 200, 50, -1, false, '`ChildWt1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ChildWt1->Sortable = true; // Allow sort
        $this->ChildWt1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ChildWt1->Param, "CustomMsg");
        $this->Fields['ChildWt1'] = &$this->ChildWt1;

        // ChildDay1
        $this->ChildDay1 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ChildDay1', 'ChildDay1', '`ChildDay1`', '`ChildDay1`', 200, 50, -1, false, '`ChildDay1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ChildDay1->Sortable = true; // Allow sort
        $this->ChildDay1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ChildDay1->Param, "CustomMsg");
        $this->Fields['ChildDay1'] = &$this->ChildDay1;

        // ChildOE1
        $this->ChildOE1 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ChildOE1', 'ChildOE1', '`ChildOE1`', '`ChildOE1`', 200, 50, -1, false, '`ChildOE1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ChildOE1->Sortable = true; // Allow sort
        $this->ChildOE1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ChildOE1->Param, "CustomMsg");
        $this->Fields['ChildOE1'] = &$this->ChildOE1;

        // TypeofDelivery1
        $this->TypeofDelivery1 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_TypeofDelivery1', 'TypeofDelivery1', '`TypeofDelivery1`', '`TypeofDelivery1`', 201, 450, -1, false, '`TypeofDelivery1`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->TypeofDelivery1->Sortable = true; // Allow sort
        $this->TypeofDelivery1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TypeofDelivery1->Param, "CustomMsg");
        $this->Fields['TypeofDelivery1'] = &$this->TypeofDelivery1;

        // ChildBlGrp1
        $this->ChildBlGrp1 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ChildBlGrp1', 'ChildBlGrp1', '`ChildBlGrp1`', '`ChildBlGrp1`', 200, 50, -1, false, '`ChildBlGrp1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ChildBlGrp1->Sortable = true; // Allow sort
        $this->ChildBlGrp1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ChildBlGrp1->Param, "CustomMsg");
        $this->Fields['ChildBlGrp1'] = &$this->ChildBlGrp1;

        // ApgarScore1
        $this->ApgarScore1 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ApgarScore1', 'ApgarScore1', '`ApgarScore1`', '`ApgarScore1`', 200, 50, -1, false, '`ApgarScore1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ApgarScore1->Sortable = true; // Allow sort
        $this->ApgarScore1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ApgarScore1->Param, "CustomMsg");
        $this->Fields['ApgarScore1'] = &$this->ApgarScore1;

        // birthnotification1
        $this->birthnotification1 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_birthnotification1', 'birthnotification1', '`birthnotification1`', '`birthnotification1`', 200, 50, -1, false, '`birthnotification1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->birthnotification1->Sortable = true; // Allow sort
        $this->birthnotification1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->birthnotification1->Param, "CustomMsg");
        $this->Fields['birthnotification1'] = &$this->birthnotification1;

        // formno1
        $this->formno1 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_formno1', 'formno1', '`formno1`', '`formno1`', 200, 50, -1, false, '`formno1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->formno1->Sortable = true; // Allow sort
        $this->formno1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->formno1->Param, "CustomMsg");
        $this->Fields['formno1'] = &$this->formno1;

        // proposedSurgery
        $this->proposedSurgery = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_proposedSurgery', 'proposedSurgery', '`proposedSurgery`', '`proposedSurgery`', 201, 450, -1, false, '`proposedSurgery`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->proposedSurgery->Sortable = true; // Allow sort
        $this->proposedSurgery->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->proposedSurgery->Param, "CustomMsg");
        $this->Fields['proposedSurgery'] = &$this->proposedSurgery;

        // surgeryProcedure
        $this->surgeryProcedure = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_surgeryProcedure', 'surgeryProcedure', '`surgeryProcedure`', '`surgeryProcedure`', 201, 450, -1, false, '`surgeryProcedure`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->surgeryProcedure->Sortable = true; // Allow sort
        $this->surgeryProcedure->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->surgeryProcedure->Param, "CustomMsg");
        $this->Fields['surgeryProcedure'] = &$this->surgeryProcedure;

        // typeOfAnaesthesia
        $this->typeOfAnaesthesia = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_typeOfAnaesthesia', 'typeOfAnaesthesia', '`typeOfAnaesthesia`', '`typeOfAnaesthesia`', 201, 450, -1, false, '`typeOfAnaesthesia`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->typeOfAnaesthesia->Sortable = true; // Allow sort
        $this->typeOfAnaesthesia->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->typeOfAnaesthesia->Param, "CustomMsg");
        $this->Fields['typeOfAnaesthesia'] = &$this->typeOfAnaesthesia;

        // RecievedTime
        $this->RecievedTime = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_RecievedTime', 'RecievedTime', '`RecievedTime`', CastDateFieldForLike("`RecievedTime`", 11, "DB"), 135, 19, 11, false, '`RecievedTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RecievedTime->Sortable = true; // Allow sort
        $this->RecievedTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->RecievedTime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RecievedTime->Param, "CustomMsg");
        $this->Fields['RecievedTime'] = &$this->RecievedTime;

        // AnaesthesiaStarted
        $this->AnaesthesiaStarted = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_AnaesthesiaStarted', 'AnaesthesiaStarted', '`AnaesthesiaStarted`', CastDateFieldForLike("`AnaesthesiaStarted`", 11, "DB"), 135, 19, 11, false, '`AnaesthesiaStarted`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AnaesthesiaStarted->Sortable = true; // Allow sort
        $this->AnaesthesiaStarted->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->AnaesthesiaStarted->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AnaesthesiaStarted->Param, "CustomMsg");
        $this->Fields['AnaesthesiaStarted'] = &$this->AnaesthesiaStarted;

        // AnaesthesiaEnded
        $this->AnaesthesiaEnded = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_AnaesthesiaEnded', 'AnaesthesiaEnded', '`AnaesthesiaEnded`', CastDateFieldForLike("`AnaesthesiaEnded`", 11, "DB"), 135, 19, 11, false, '`AnaesthesiaEnded`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AnaesthesiaEnded->Sortable = true; // Allow sort
        $this->AnaesthesiaEnded->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->AnaesthesiaEnded->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AnaesthesiaEnded->Param, "CustomMsg");
        $this->Fields['AnaesthesiaEnded'] = &$this->AnaesthesiaEnded;

        // surgeryStarted
        $this->surgeryStarted = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_surgeryStarted', 'surgeryStarted', '`surgeryStarted`', CastDateFieldForLike("`surgeryStarted`", 11, "DB"), 135, 19, 11, false, '`surgeryStarted`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->surgeryStarted->Sortable = true; // Allow sort
        $this->surgeryStarted->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->surgeryStarted->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->surgeryStarted->Param, "CustomMsg");
        $this->Fields['surgeryStarted'] = &$this->surgeryStarted;

        // surgeryEnded
        $this->surgeryEnded = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_surgeryEnded', 'surgeryEnded', '`surgeryEnded`', CastDateFieldForLike("`surgeryEnded`", 11, "DB"), 135, 19, 11, false, '`surgeryEnded`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->surgeryEnded->Sortable = true; // Allow sort
        $this->surgeryEnded->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->surgeryEnded->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->surgeryEnded->Param, "CustomMsg");
        $this->Fields['surgeryEnded'] = &$this->surgeryEnded;

        // RecoveryTime
        $this->RecoveryTime = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_RecoveryTime', 'RecoveryTime', '`RecoveryTime`', CastDateFieldForLike("`RecoveryTime`", 11, "DB"), 135, 19, 11, false, '`RecoveryTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RecoveryTime->Sortable = true; // Allow sort
        $this->RecoveryTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->RecoveryTime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RecoveryTime->Param, "CustomMsg");
        $this->Fields['RecoveryTime'] = &$this->RecoveryTime;

        // ShiftedTime
        $this->ShiftedTime = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ShiftedTime', 'ShiftedTime', '`ShiftedTime`', CastDateFieldForLike("`ShiftedTime`", 11, "DB"), 135, 19, 11, false, '`ShiftedTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ShiftedTime->Sortable = true; // Allow sort
        $this->ShiftedTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->ShiftedTime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ShiftedTime->Param, "CustomMsg");
        $this->Fields['ShiftedTime'] = &$this->ShiftedTime;

        // Duration
        $this->Duration = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_Duration', 'Duration', '`Duration`', '`Duration`', 200, 50, -1, false, '`Duration`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Duration->Sortable = true; // Allow sort
        $this->Duration->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Duration->Param, "CustomMsg");
        $this->Fields['Duration'] = &$this->Duration;

        // DrVisit1
        $this->DrVisit1 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_DrVisit1', 'DrVisit1', '`DrVisit1`', '`DrVisit1`', 201, 500, -1, false, '`DrVisit1`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->DrVisit1->Sortable = true; // Allow sort
        $this->DrVisit1->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->DrVisit1->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->DrVisit1->Lookup = new Lookup('DrVisit1', 'doctors', false, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
        $this->DrVisit1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DrVisit1->Param, "CustomMsg");
        $this->Fields['DrVisit1'] = &$this->DrVisit1;

        // DrVisit2
        $this->DrVisit2 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_DrVisit2', 'DrVisit2', '`DrVisit2`', '`DrVisit2`', 201, 500, -1, false, '`DrVisit2`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->DrVisit2->Sortable = true; // Allow sort
        $this->DrVisit2->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->DrVisit2->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->DrVisit2->Lookup = new Lookup('DrVisit2', 'doctors', false, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
        $this->DrVisit2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DrVisit2->Param, "CustomMsg");
        $this->Fields['DrVisit2'] = &$this->DrVisit2;

        // DrVisit3
        $this->DrVisit3 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_DrVisit3', 'DrVisit3', '`DrVisit3`', '`DrVisit3`', 201, 500, -1, false, '`DrVisit3`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->DrVisit3->Sortable = true; // Allow sort
        $this->DrVisit3->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->DrVisit3->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->DrVisit3->Lookup = new Lookup('DrVisit3', 'doctors', false, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
        $this->DrVisit3->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DrVisit3->Param, "CustomMsg");
        $this->Fields['DrVisit3'] = &$this->DrVisit3;

        // DrVisit4
        $this->DrVisit4 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_DrVisit4', 'DrVisit4', '`DrVisit4`', '`DrVisit4`', 201, 500, -1, false, '`DrVisit4`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->DrVisit4->Sortable = true; // Allow sort
        $this->DrVisit4->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->DrVisit4->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->DrVisit4->Lookup = new Lookup('DrVisit4', 'doctors', false, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
        $this->DrVisit4->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DrVisit4->Param, "CustomMsg");
        $this->Fields['DrVisit4'] = &$this->DrVisit4;

        // Surgeon
        $this->Surgeon = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_Surgeon', 'Surgeon', '`Surgeon`', '`Surgeon`', 200, 50, -1, false, '`Surgeon`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Surgeon->Sortable = true; // Allow sort
        $this->Surgeon->Lookup = new Lookup('Surgeon', 'doctors', false, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
        $this->Surgeon->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Surgeon->Param, "CustomMsg");
        $this->Fields['Surgeon'] = &$this->Surgeon;

        // Anaesthetist
        $this->Anaesthetist = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_Anaesthetist', 'Anaesthetist', '`Anaesthetist`', '`Anaesthetist`', 200, 50, -1, false, '`Anaesthetist`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Anaesthetist->Sortable = true; // Allow sort
        $this->Anaesthetist->Lookup = new Lookup('Anaesthetist', 'doctors', false, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
        $this->Anaesthetist->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Anaesthetist->Param, "CustomMsg");
        $this->Fields['Anaesthetist'] = &$this->Anaesthetist;

        // AsstSurgeon1
        $this->AsstSurgeon1 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_AsstSurgeon1', 'AsstSurgeon1', '`AsstSurgeon1`', '`AsstSurgeon1`', 200, 50, -1, false, '`AsstSurgeon1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AsstSurgeon1->Sortable = true; // Allow sort
        $this->AsstSurgeon1->Lookup = new Lookup('AsstSurgeon1', 'doctors', false, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
        $this->AsstSurgeon1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AsstSurgeon1->Param, "CustomMsg");
        $this->Fields['AsstSurgeon1'] = &$this->AsstSurgeon1;

        // AsstSurgeon2
        $this->AsstSurgeon2 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_AsstSurgeon2', 'AsstSurgeon2', '`AsstSurgeon2`', '`AsstSurgeon2`', 200, 50, -1, false, '`AsstSurgeon2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AsstSurgeon2->Sortable = true; // Allow sort
        $this->AsstSurgeon2->Lookup = new Lookup('AsstSurgeon2', 'doctors', false, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
        $this->AsstSurgeon2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AsstSurgeon2->Param, "CustomMsg");
        $this->Fields['AsstSurgeon2'] = &$this->AsstSurgeon2;

        // paediatric
        $this->paediatric = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_paediatric', 'paediatric', '`paediatric`', '`paediatric`', 200, 50, -1, false, '`paediatric`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->paediatric->Sortable = true; // Allow sort
        $this->paediatric->Lookup = new Lookup('paediatric', 'doctors', false, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
        $this->paediatric->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->paediatric->Param, "CustomMsg");
        $this->Fields['paediatric'] = &$this->paediatric;

        // ScrubNurse1
        $this->ScrubNurse1 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ScrubNurse1', 'ScrubNurse1', '`ScrubNurse1`', '`ScrubNurse1`', 200, 50, -1, false, '`ScrubNurse1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ScrubNurse1->Sortable = true; // Allow sort
        $this->ScrubNurse1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ScrubNurse1->Param, "CustomMsg");
        $this->Fields['ScrubNurse1'] = &$this->ScrubNurse1;

        // ScrubNurse2
        $this->ScrubNurse2 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ScrubNurse2', 'ScrubNurse2', '`ScrubNurse2`', '`ScrubNurse2`', 200, 50, -1, false, '`ScrubNurse2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ScrubNurse2->Sortable = true; // Allow sort
        $this->ScrubNurse2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ScrubNurse2->Param, "CustomMsg");
        $this->Fields['ScrubNurse2'] = &$this->ScrubNurse2;

        // FloorNurse
        $this->FloorNurse = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_FloorNurse', 'FloorNurse', '`FloorNurse`', '`FloorNurse`', 200, 50, -1, false, '`FloorNurse`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FloorNurse->Sortable = true; // Allow sort
        $this->FloorNurse->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FloorNurse->Param, "CustomMsg");
        $this->Fields['FloorNurse'] = &$this->FloorNurse;

        // Technician
        $this->Technician = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_Technician', 'Technician', '`Technician`', '`Technician`', 200, 50, -1, false, '`Technician`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Technician->Sortable = true; // Allow sort
        $this->Technician->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Technician->Param, "CustomMsg");
        $this->Fields['Technician'] = &$this->Technician;

        // HouseKeeping
        $this->HouseKeeping = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_HouseKeeping', 'HouseKeeping', '`HouseKeeping`', '`HouseKeeping`', 200, 50, -1, false, '`HouseKeeping`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HouseKeeping->Sortable = true; // Allow sort
        $this->HouseKeeping->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HouseKeeping->Param, "CustomMsg");
        $this->Fields['HouseKeeping'] = &$this->HouseKeeping;

        // countsCheckedMops
        $this->countsCheckedMops = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_countsCheckedMops', 'countsCheckedMops', '`countsCheckedMops`', '`countsCheckedMops`', 200, 50, -1, false, '`countsCheckedMops`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->countsCheckedMops->Sortable = true; // Allow sort
        $this->countsCheckedMops->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->countsCheckedMops->Param, "CustomMsg");
        $this->Fields['countsCheckedMops'] = &$this->countsCheckedMops;

        // gauze
        $this->gauze = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_gauze', 'gauze', '`gauze`', '`gauze`', 200, 50, -1, false, '`gauze`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->gauze->Sortable = true; // Allow sort
        $this->gauze->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->gauze->Param, "CustomMsg");
        $this->Fields['gauze'] = &$this->gauze;

        // needles
        $this->needles = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_needles', 'needles', '`needles`', '`needles`', 200, 50, -1, false, '`needles`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->needles->Sortable = true; // Allow sort
        $this->needles->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->needles->Param, "CustomMsg");
        $this->Fields['needles'] = &$this->needles;

        // bloodloss
        $this->bloodloss = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_bloodloss', 'bloodloss', '`bloodloss`', '`bloodloss`', 200, 50, -1, false, '`bloodloss`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->bloodloss->Sortable = true; // Allow sort
        $this->bloodloss->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->bloodloss->Param, "CustomMsg");
        $this->Fields['bloodloss'] = &$this->bloodloss;

        // bloodtransfusion
        $this->bloodtransfusion = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_bloodtransfusion', 'bloodtransfusion', '`bloodtransfusion`', '`bloodtransfusion`', 200, 50, -1, false, '`bloodtransfusion`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->bloodtransfusion->Sortable = true; // Allow sort
        $this->bloodtransfusion->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->bloodtransfusion->Param, "CustomMsg");
        $this->Fields['bloodtransfusion'] = &$this->bloodtransfusion;

        // implantsUsed
        $this->implantsUsed = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_implantsUsed', 'implantsUsed', '`implantsUsed`', '`implantsUsed`', 201, 450, -1, false, '`implantsUsed`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->implantsUsed->Sortable = true; // Allow sort
        $this->implantsUsed->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->implantsUsed->Param, "CustomMsg");
        $this->Fields['implantsUsed'] = &$this->implantsUsed;

        // MaterialsForHPE
        $this->MaterialsForHPE = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_MaterialsForHPE', 'MaterialsForHPE', '`MaterialsForHPE`', '`MaterialsForHPE`', 201, 450, -1, false, '`MaterialsForHPE`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->MaterialsForHPE->Sortable = true; // Allow sort
        $this->MaterialsForHPE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MaterialsForHPE->Param, "CustomMsg");
        $this->Fields['MaterialsForHPE'] = &$this->MaterialsForHPE;

        // Reception
        $this->Reception = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_Reception', 'Reception', '`Reception`', '`Reception`', 3, 11, -1, false, '`Reception`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Reception->IsForeignKey = true; // Foreign key field
        $this->Reception->Sortable = true; // Allow sort
        $this->Reception->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Reception->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Reception->Param, "CustomMsg");
        $this->Fields['Reception'] = &$this->Reception;

        // PId
        $this->PId = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_PId', 'PId', '`PId`', '`PId`', 3, 11, -1, false, '`PId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PId->IsForeignKey = true; // Foreign key field
        $this->PId->Sortable = true; // Allow sort
        $this->PId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->PId->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PId->Param, "CustomMsg");
        $this->Fields['PId'] = &$this->PId;

        // PatientSearch
        $this->PatientSearch = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_PatientSearch', 'PatientSearch', '\'\'', '\'\'', 201, 65530, -1, false, '\'\'', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->PatientSearch->IsCustom = true; // Custom field
        $this->PatientSearch->Sortable = true; // Allow sort
        $this->PatientSearch->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->PatientSearch->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->PatientSearch->Lookup = new Lookup('PatientSearch', 'ip_admission', false, 'id', ["patient_id","patient_name","mrnNo","mobileno"], [], [], [], [], [], [], '`id` DESC', '');
        $this->PatientSearch->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientSearch->Param, "CustomMsg");
        $this->Fields['PatientSearch'] = &$this->PatientSearch;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`patient_ot_delivery_register`";
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
        $this->ObstetricsHistryMale->DbValue = $row['ObstetricsHistryMale'];
        $this->ObstetricsHistryFeMale->DbValue = $row['ObstetricsHistryFeMale'];
        $this->Abortion->DbValue = $row['Abortion'];
        $this->ChildBirthDate->DbValue = $row['ChildBirthDate'];
        $this->ChildBirthTime->DbValue = $row['ChildBirthTime'];
        $this->ChildSex->DbValue = $row['ChildSex'];
        $this->ChildWt->DbValue = $row['ChildWt'];
        $this->ChildDay->DbValue = $row['ChildDay'];
        $this->ChildOE->DbValue = $row['ChildOE'];
        $this->TypeofDelivery->DbValue = $row['TypeofDelivery'];
        $this->ChildBlGrp->DbValue = $row['ChildBlGrp'];
        $this->ApgarScore->DbValue = $row['ApgarScore'];
        $this->birthnotification->DbValue = $row['birthnotification'];
        $this->formno->DbValue = $row['formno'];
        $this->dte->DbValue = $row['dte'];
        $this->motherReligion->DbValue = $row['motherReligion'];
        $this->bloodgroup->DbValue = $row['bloodgroup'];
        $this->status->DbValue = $row['status'];
        $this->createdby->DbValue = $row['createdby'];
        $this->createddatetime->DbValue = $row['createddatetime'];
        $this->modifiedby->DbValue = $row['modifiedby'];
        $this->modifieddatetime->DbValue = $row['modifieddatetime'];
        $this->PatientID->DbValue = $row['PatientID'];
        $this->HospID->DbValue = $row['HospID'];
        $this->ChildBirthDate1->DbValue = $row['ChildBirthDate1'];
        $this->ChildBirthTime1->DbValue = $row['ChildBirthTime1'];
        $this->ChildSex1->DbValue = $row['ChildSex1'];
        $this->ChildWt1->DbValue = $row['ChildWt1'];
        $this->ChildDay1->DbValue = $row['ChildDay1'];
        $this->ChildOE1->DbValue = $row['ChildOE1'];
        $this->TypeofDelivery1->DbValue = $row['TypeofDelivery1'];
        $this->ChildBlGrp1->DbValue = $row['ChildBlGrp1'];
        $this->ApgarScore1->DbValue = $row['ApgarScore1'];
        $this->birthnotification1->DbValue = $row['birthnotification1'];
        $this->formno1->DbValue = $row['formno1'];
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
        $this->DrVisit1->DbValue = $row['DrVisit1'];
        $this->DrVisit2->DbValue = $row['DrVisit2'];
        $this->DrVisit3->DbValue = $row['DrVisit3'];
        $this->DrVisit4->DbValue = $row['DrVisit4'];
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
        $this->Reception->DbValue = $row['Reception'];
        $this->PId->DbValue = $row['PId'];
        $this->PatientSearch->DbValue = $row['PatientSearch'];
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
        return $_SESSION[$name] ?? GetUrl("PatientOtDeliveryRegisterList");
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
        if ($pageName == "PatientOtDeliveryRegisterView") {
            return $Language->phrase("View");
        } elseif ($pageName == "PatientOtDeliveryRegisterEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "PatientOtDeliveryRegisterAdd") {
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
                return "PatientOtDeliveryRegisterView";
            case Config("API_ADD_ACTION"):
                return "PatientOtDeliveryRegisterAdd";
            case Config("API_EDIT_ACTION"):
                return "PatientOtDeliveryRegisterEdit";
            case Config("API_DELETE_ACTION"):
                return "PatientOtDeliveryRegisterDelete";
            case Config("API_LIST_ACTION"):
                return "PatientOtDeliveryRegisterList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "PatientOtDeliveryRegisterList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("PatientOtDeliveryRegisterView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("PatientOtDeliveryRegisterView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "PatientOtDeliveryRegisterAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "PatientOtDeliveryRegisterAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("PatientOtDeliveryRegisterEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("PatientOtDeliveryRegisterAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("PatientOtDeliveryRegisterDelete", $this->getUrlParm());
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

        // ObstetricsHistryMale
        $this->ObstetricsHistryMale->ViewValue = $this->ObstetricsHistryMale->CurrentValue;
        $this->ObstetricsHistryMale->ViewCustomAttributes = "";

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

        // TypeofDelivery
        $this->TypeofDelivery->ViewValue = $this->TypeofDelivery->CurrentValue;
        $this->TypeofDelivery->ViewCustomAttributes = "";

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

        // TypeofDelivery1
        $this->TypeofDelivery1->ViewValue = $this->TypeofDelivery1->CurrentValue;
        $this->TypeofDelivery1->ViewCustomAttributes = "";

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

        // DrVisit1
        $curVal = trim(strval($this->DrVisit1->CurrentValue));
        if ($curVal != "") {
            $this->DrVisit1->ViewValue = $this->DrVisit1->lookupCacheOption($curVal);
            if ($this->DrVisit1->ViewValue === null) { // Lookup from database
                $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->DrVisit1->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->DrVisit1->Lookup->renderViewRow($rswrk[0]);
                    $this->DrVisit1->ViewValue = $this->DrVisit1->displayValue($arwrk);
                } else {
                    $this->DrVisit1->ViewValue = $this->DrVisit1->CurrentValue;
                }
            }
        } else {
            $this->DrVisit1->ViewValue = null;
        }
        $this->DrVisit1->ViewCustomAttributes = "";

        // DrVisit2
        $curVal = trim(strval($this->DrVisit2->CurrentValue));
        if ($curVal != "") {
            $this->DrVisit2->ViewValue = $this->DrVisit2->lookupCacheOption($curVal);
            if ($this->DrVisit2->ViewValue === null) { // Lookup from database
                $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->DrVisit2->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->DrVisit2->Lookup->renderViewRow($rswrk[0]);
                    $this->DrVisit2->ViewValue = $this->DrVisit2->displayValue($arwrk);
                } else {
                    $this->DrVisit2->ViewValue = $this->DrVisit2->CurrentValue;
                }
            }
        } else {
            $this->DrVisit2->ViewValue = null;
        }
        $this->DrVisit2->ViewCustomAttributes = "";

        // DrVisit3
        $curVal = trim(strval($this->DrVisit3->CurrentValue));
        if ($curVal != "") {
            $this->DrVisit3->ViewValue = $this->DrVisit3->lookupCacheOption($curVal);
            if ($this->DrVisit3->ViewValue === null) { // Lookup from database
                $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->DrVisit3->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->DrVisit3->Lookup->renderViewRow($rswrk[0]);
                    $this->DrVisit3->ViewValue = $this->DrVisit3->displayValue($arwrk);
                } else {
                    $this->DrVisit3->ViewValue = $this->DrVisit3->CurrentValue;
                }
            }
        } else {
            $this->DrVisit3->ViewValue = null;
        }
        $this->DrVisit3->ViewCustomAttributes = "";

        // DrVisit4
        $curVal = trim(strval($this->DrVisit4->CurrentValue));
        if ($curVal != "") {
            $this->DrVisit4->ViewValue = $this->DrVisit4->lookupCacheOption($curVal);
            if ($this->DrVisit4->ViewValue === null) { // Lookup from database
                $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->DrVisit4->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->DrVisit4->Lookup->renderViewRow($rswrk[0]);
                    $this->DrVisit4->ViewValue = $this->DrVisit4->displayValue($arwrk);
                } else {
                    $this->DrVisit4->ViewValue = $this->DrVisit4->CurrentValue;
                }
            }
        } else {
            $this->DrVisit4->ViewValue = null;
        }
        $this->DrVisit4->ViewCustomAttributes = "";

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

        // implantsUsed
        $this->implantsUsed->ViewValue = $this->implantsUsed->CurrentValue;
        $this->implantsUsed->ViewCustomAttributes = "";

        // MaterialsForHPE
        $this->MaterialsForHPE->ViewValue = $this->MaterialsForHPE->CurrentValue;
        $this->MaterialsForHPE->ViewCustomAttributes = "";

        // Reception
        $this->Reception->ViewValue = $this->Reception->CurrentValue;
        $this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
        $this->Reception->ViewCustomAttributes = "";

        // PId
        $this->PId->ViewValue = $this->PId->CurrentValue;
        $this->PId->ViewValue = FormatNumber($this->PId->ViewValue, 0, -2, -2, -2);
        $this->PId->ViewCustomAttributes = "";

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

        // ObstetricsHistryMale
        $this->ObstetricsHistryMale->LinkCustomAttributes = "";
        $this->ObstetricsHistryMale->HrefValue = "";
        $this->ObstetricsHistryMale->TooltipValue = "";

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

        // TypeofDelivery
        $this->TypeofDelivery->LinkCustomAttributes = "";
        $this->TypeofDelivery->HrefValue = "";
        $this->TypeofDelivery->TooltipValue = "";

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

        // TypeofDelivery1
        $this->TypeofDelivery1->LinkCustomAttributes = "";
        $this->TypeofDelivery1->HrefValue = "";
        $this->TypeofDelivery1->TooltipValue = "";

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

        // DrVisit1
        $this->DrVisit1->LinkCustomAttributes = "";
        $this->DrVisit1->HrefValue = "";
        $this->DrVisit1->TooltipValue = "";

        // DrVisit2
        $this->DrVisit2->LinkCustomAttributes = "";
        $this->DrVisit2->HrefValue = "";
        $this->DrVisit2->TooltipValue = "";

        // DrVisit3
        $this->DrVisit3->LinkCustomAttributes = "";
        $this->DrVisit3->HrefValue = "";
        $this->DrVisit3->TooltipValue = "";

        // DrVisit4
        $this->DrVisit4->LinkCustomAttributes = "";
        $this->DrVisit4->HrefValue = "";
        $this->DrVisit4->TooltipValue = "";

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

        // Reception
        $this->Reception->LinkCustomAttributes = "";
        $this->Reception->HrefValue = "";
        $this->Reception->TooltipValue = "";

        // PId
        $this->PId->LinkCustomAttributes = "";
        $this->PId->HrefValue = "";
        $this->PId->TooltipValue = "";

        // PatientSearch
        $this->PatientSearch->LinkCustomAttributes = "";
        $this->PatientSearch->HrefValue = "";
        $this->PatientSearch->TooltipValue = "";

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

        // ObstetricsHistryMale
        $this->ObstetricsHistryMale->EditAttrs["class"] = "form-control";
        $this->ObstetricsHistryMale->EditCustomAttributes = "";
        if (!$this->ObstetricsHistryMale->Raw) {
            $this->ObstetricsHistryMale->CurrentValue = HtmlDecode($this->ObstetricsHistryMale->CurrentValue);
        }
        $this->ObstetricsHistryMale->EditValue = $this->ObstetricsHistryMale->CurrentValue;
        $this->ObstetricsHistryMale->PlaceHolder = RemoveHtml($this->ObstetricsHistryMale->caption());

        // ObstetricsHistryFeMale
        $this->ObstetricsHistryFeMale->EditAttrs["class"] = "form-control";
        $this->ObstetricsHistryFeMale->EditCustomAttributes = "";
        if (!$this->ObstetricsHistryFeMale->Raw) {
            $this->ObstetricsHistryFeMale->CurrentValue = HtmlDecode($this->ObstetricsHistryFeMale->CurrentValue);
        }
        $this->ObstetricsHistryFeMale->EditValue = $this->ObstetricsHistryFeMale->CurrentValue;
        $this->ObstetricsHistryFeMale->PlaceHolder = RemoveHtml($this->ObstetricsHistryFeMale->caption());

        // Abortion
        $this->Abortion->EditAttrs["class"] = "form-control";
        $this->Abortion->EditCustomAttributes = "";
        if (!$this->Abortion->Raw) {
            $this->Abortion->CurrentValue = HtmlDecode($this->Abortion->CurrentValue);
        }
        $this->Abortion->EditValue = $this->Abortion->CurrentValue;
        $this->Abortion->PlaceHolder = RemoveHtml($this->Abortion->caption());

        // ChildBirthDate
        $this->ChildBirthDate->EditAttrs["class"] = "form-control";
        $this->ChildBirthDate->EditCustomAttributes = "";
        $this->ChildBirthDate->EditValue = FormatDateTime($this->ChildBirthDate->CurrentValue, 7);
        $this->ChildBirthDate->PlaceHolder = RemoveHtml($this->ChildBirthDate->caption());

        // ChildBirthTime
        $this->ChildBirthTime->EditAttrs["class"] = "form-control";
        $this->ChildBirthTime->EditCustomAttributes = "";
        if (!$this->ChildBirthTime->Raw) {
            $this->ChildBirthTime->CurrentValue = HtmlDecode($this->ChildBirthTime->CurrentValue);
        }
        $this->ChildBirthTime->EditValue = $this->ChildBirthTime->CurrentValue;
        $this->ChildBirthTime->PlaceHolder = RemoveHtml($this->ChildBirthTime->caption());

        // ChildSex
        $this->ChildSex->EditAttrs["class"] = "form-control";
        $this->ChildSex->EditCustomAttributes = "";
        if (!$this->ChildSex->Raw) {
            $this->ChildSex->CurrentValue = HtmlDecode($this->ChildSex->CurrentValue);
        }
        $this->ChildSex->EditValue = $this->ChildSex->CurrentValue;
        $this->ChildSex->PlaceHolder = RemoveHtml($this->ChildSex->caption());

        // ChildWt
        $this->ChildWt->EditAttrs["class"] = "form-control";
        $this->ChildWt->EditCustomAttributes = "";
        if (!$this->ChildWt->Raw) {
            $this->ChildWt->CurrentValue = HtmlDecode($this->ChildWt->CurrentValue);
        }
        $this->ChildWt->EditValue = $this->ChildWt->CurrentValue;
        $this->ChildWt->PlaceHolder = RemoveHtml($this->ChildWt->caption());

        // ChildDay
        $this->ChildDay->EditAttrs["class"] = "form-control";
        $this->ChildDay->EditCustomAttributes = "";
        if (!$this->ChildDay->Raw) {
            $this->ChildDay->CurrentValue = HtmlDecode($this->ChildDay->CurrentValue);
        }
        $this->ChildDay->EditValue = $this->ChildDay->CurrentValue;
        $this->ChildDay->PlaceHolder = RemoveHtml($this->ChildDay->caption());

        // ChildOE
        $this->ChildOE->EditAttrs["class"] = "form-control";
        $this->ChildOE->EditCustomAttributes = "";
        if (!$this->ChildOE->Raw) {
            $this->ChildOE->CurrentValue = HtmlDecode($this->ChildOE->CurrentValue);
        }
        $this->ChildOE->EditValue = $this->ChildOE->CurrentValue;
        $this->ChildOE->PlaceHolder = RemoveHtml($this->ChildOE->caption());

        // TypeofDelivery
        $this->TypeofDelivery->EditAttrs["class"] = "form-control";
        $this->TypeofDelivery->EditCustomAttributes = "";
        $this->TypeofDelivery->EditValue = $this->TypeofDelivery->CurrentValue;
        $this->TypeofDelivery->PlaceHolder = RemoveHtml($this->TypeofDelivery->caption());

        // ChildBlGrp
        $this->ChildBlGrp->EditAttrs["class"] = "form-control";
        $this->ChildBlGrp->EditCustomAttributes = "";
        if (!$this->ChildBlGrp->Raw) {
            $this->ChildBlGrp->CurrentValue = HtmlDecode($this->ChildBlGrp->CurrentValue);
        }
        $this->ChildBlGrp->EditValue = $this->ChildBlGrp->CurrentValue;
        $this->ChildBlGrp->PlaceHolder = RemoveHtml($this->ChildBlGrp->caption());

        // ApgarScore
        $this->ApgarScore->EditAttrs["class"] = "form-control";
        $this->ApgarScore->EditCustomAttributes = "";
        if (!$this->ApgarScore->Raw) {
            $this->ApgarScore->CurrentValue = HtmlDecode($this->ApgarScore->CurrentValue);
        }
        $this->ApgarScore->EditValue = $this->ApgarScore->CurrentValue;
        $this->ApgarScore->PlaceHolder = RemoveHtml($this->ApgarScore->caption());

        // birthnotification
        $this->birthnotification->EditAttrs["class"] = "form-control";
        $this->birthnotification->EditCustomAttributes = "";
        if (!$this->birthnotification->Raw) {
            $this->birthnotification->CurrentValue = HtmlDecode($this->birthnotification->CurrentValue);
        }
        $this->birthnotification->EditValue = $this->birthnotification->CurrentValue;
        $this->birthnotification->PlaceHolder = RemoveHtml($this->birthnotification->caption());

        // formno
        $this->formno->EditAttrs["class"] = "form-control";
        $this->formno->EditCustomAttributes = "";
        if (!$this->formno->Raw) {
            $this->formno->CurrentValue = HtmlDecode($this->formno->CurrentValue);
        }
        $this->formno->EditValue = $this->formno->CurrentValue;
        $this->formno->PlaceHolder = RemoveHtml($this->formno->caption());

        // dte
        $this->dte->EditAttrs["class"] = "form-control";
        $this->dte->EditCustomAttributes = "";
        $this->dte->EditValue = FormatDateTime($this->dte->CurrentValue, 8);
        $this->dte->PlaceHolder = RemoveHtml($this->dte->caption());

        // motherReligion
        $this->motherReligion->EditAttrs["class"] = "form-control";
        $this->motherReligion->EditCustomAttributes = "";
        if (!$this->motherReligion->Raw) {
            $this->motherReligion->CurrentValue = HtmlDecode($this->motherReligion->CurrentValue);
        }
        $this->motherReligion->EditValue = $this->motherReligion->CurrentValue;
        $this->motherReligion->PlaceHolder = RemoveHtml($this->motherReligion->caption());

        // bloodgroup
        $this->bloodgroup->EditAttrs["class"] = "form-control";
        $this->bloodgroup->EditCustomAttributes = "";
        if (!$this->bloodgroup->Raw) {
            $this->bloodgroup->CurrentValue = HtmlDecode($this->bloodgroup->CurrentValue);
        }
        $this->bloodgroup->EditValue = $this->bloodgroup->CurrentValue;
        $this->bloodgroup->PlaceHolder = RemoveHtml($this->bloodgroup->caption());

        // status
        $this->status->EditAttrs["class"] = "form-control";
        $this->status->EditCustomAttributes = "";
        $this->status->EditValue = $this->status->CurrentValue;
        $this->status->PlaceHolder = RemoveHtml($this->status->caption());

        // createdby
        $this->createdby->EditAttrs["class"] = "form-control";
        $this->createdby->EditCustomAttributes = "";
        $this->createdby->EditValue = $this->createdby->CurrentValue;
        $this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

        // createddatetime
        $this->createddatetime->EditAttrs["class"] = "form-control";
        $this->createddatetime->EditCustomAttributes = "";
        $this->createddatetime->EditValue = FormatDateTime($this->createddatetime->CurrentValue, 8);
        $this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

        // modifiedby
        $this->modifiedby->EditAttrs["class"] = "form-control";
        $this->modifiedby->EditCustomAttributes = "";
        $this->modifiedby->EditValue = $this->modifiedby->CurrentValue;
        $this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

        // modifieddatetime
        $this->modifieddatetime->EditAttrs["class"] = "form-control";
        $this->modifieddatetime->EditCustomAttributes = "";
        $this->modifieddatetime->EditValue = FormatDateTime($this->modifieddatetime->CurrentValue, 8);
        $this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

        // PatientID
        $this->PatientID->EditAttrs["class"] = "form-control";
        $this->PatientID->EditCustomAttributes = "";
        if (!$this->PatientID->Raw) {
            $this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
        }
        $this->PatientID->EditValue = $this->PatientID->CurrentValue;
        $this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

        // HospID

        // ChildBirthDate1
        $this->ChildBirthDate1->EditAttrs["class"] = "form-control";
        $this->ChildBirthDate1->EditCustomAttributes = "";
        $this->ChildBirthDate1->EditValue = FormatDateTime($this->ChildBirthDate1->CurrentValue, 8);
        $this->ChildBirthDate1->PlaceHolder = RemoveHtml($this->ChildBirthDate1->caption());

        // ChildBirthTime1
        $this->ChildBirthTime1->EditAttrs["class"] = "form-control";
        $this->ChildBirthTime1->EditCustomAttributes = "";
        if (!$this->ChildBirthTime1->Raw) {
            $this->ChildBirthTime1->CurrentValue = HtmlDecode($this->ChildBirthTime1->CurrentValue);
        }
        $this->ChildBirthTime1->EditValue = $this->ChildBirthTime1->CurrentValue;
        $this->ChildBirthTime1->PlaceHolder = RemoveHtml($this->ChildBirthTime1->caption());

        // ChildSex1
        $this->ChildSex1->EditAttrs["class"] = "form-control";
        $this->ChildSex1->EditCustomAttributes = "";
        if (!$this->ChildSex1->Raw) {
            $this->ChildSex1->CurrentValue = HtmlDecode($this->ChildSex1->CurrentValue);
        }
        $this->ChildSex1->EditValue = $this->ChildSex1->CurrentValue;
        $this->ChildSex1->PlaceHolder = RemoveHtml($this->ChildSex1->caption());

        // ChildWt1
        $this->ChildWt1->EditAttrs["class"] = "form-control";
        $this->ChildWt1->EditCustomAttributes = "";
        if (!$this->ChildWt1->Raw) {
            $this->ChildWt1->CurrentValue = HtmlDecode($this->ChildWt1->CurrentValue);
        }
        $this->ChildWt1->EditValue = $this->ChildWt1->CurrentValue;
        $this->ChildWt1->PlaceHolder = RemoveHtml($this->ChildWt1->caption());

        // ChildDay1
        $this->ChildDay1->EditAttrs["class"] = "form-control";
        $this->ChildDay1->EditCustomAttributes = "";
        if (!$this->ChildDay1->Raw) {
            $this->ChildDay1->CurrentValue = HtmlDecode($this->ChildDay1->CurrentValue);
        }
        $this->ChildDay1->EditValue = $this->ChildDay1->CurrentValue;
        $this->ChildDay1->PlaceHolder = RemoveHtml($this->ChildDay1->caption());

        // ChildOE1
        $this->ChildOE1->EditAttrs["class"] = "form-control";
        $this->ChildOE1->EditCustomAttributes = "";
        if (!$this->ChildOE1->Raw) {
            $this->ChildOE1->CurrentValue = HtmlDecode($this->ChildOE1->CurrentValue);
        }
        $this->ChildOE1->EditValue = $this->ChildOE1->CurrentValue;
        $this->ChildOE1->PlaceHolder = RemoveHtml($this->ChildOE1->caption());

        // TypeofDelivery1
        $this->TypeofDelivery1->EditAttrs["class"] = "form-control";
        $this->TypeofDelivery1->EditCustomAttributes = "";
        $this->TypeofDelivery1->EditValue = $this->TypeofDelivery1->CurrentValue;
        $this->TypeofDelivery1->PlaceHolder = RemoveHtml($this->TypeofDelivery1->caption());

        // ChildBlGrp1
        $this->ChildBlGrp1->EditAttrs["class"] = "form-control";
        $this->ChildBlGrp1->EditCustomAttributes = "";
        if (!$this->ChildBlGrp1->Raw) {
            $this->ChildBlGrp1->CurrentValue = HtmlDecode($this->ChildBlGrp1->CurrentValue);
        }
        $this->ChildBlGrp1->EditValue = $this->ChildBlGrp1->CurrentValue;
        $this->ChildBlGrp1->PlaceHolder = RemoveHtml($this->ChildBlGrp1->caption());

        // ApgarScore1
        $this->ApgarScore1->EditAttrs["class"] = "form-control";
        $this->ApgarScore1->EditCustomAttributes = "";
        if (!$this->ApgarScore1->Raw) {
            $this->ApgarScore1->CurrentValue = HtmlDecode($this->ApgarScore1->CurrentValue);
        }
        $this->ApgarScore1->EditValue = $this->ApgarScore1->CurrentValue;
        $this->ApgarScore1->PlaceHolder = RemoveHtml($this->ApgarScore1->caption());

        // birthnotification1
        $this->birthnotification1->EditAttrs["class"] = "form-control";
        $this->birthnotification1->EditCustomAttributes = "";
        if (!$this->birthnotification1->Raw) {
            $this->birthnotification1->CurrentValue = HtmlDecode($this->birthnotification1->CurrentValue);
        }
        $this->birthnotification1->EditValue = $this->birthnotification1->CurrentValue;
        $this->birthnotification1->PlaceHolder = RemoveHtml($this->birthnotification1->caption());

        // formno1
        $this->formno1->EditAttrs["class"] = "form-control";
        $this->formno1->EditCustomAttributes = "";
        if (!$this->formno1->Raw) {
            $this->formno1->CurrentValue = HtmlDecode($this->formno1->CurrentValue);
        }
        $this->formno1->EditValue = $this->formno1->CurrentValue;
        $this->formno1->PlaceHolder = RemoveHtml($this->formno1->caption());

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
        $this->surgeryEnded->EditValue = FormatDateTime($this->surgeryEnded->CurrentValue, 11);
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

        // DrVisit1
        $this->DrVisit1->EditAttrs["class"] = "form-control";
        $this->DrVisit1->EditCustomAttributes = "";
        $this->DrVisit1->PlaceHolder = RemoveHtml($this->DrVisit1->caption());

        // DrVisit2
        $this->DrVisit2->EditAttrs["class"] = "form-control";
        $this->DrVisit2->EditCustomAttributes = "";
        $this->DrVisit2->PlaceHolder = RemoveHtml($this->DrVisit2->caption());

        // DrVisit3
        $this->DrVisit3->EditAttrs["class"] = "form-control";
        $this->DrVisit3->EditCustomAttributes = "";
        $this->DrVisit3->PlaceHolder = RemoveHtml($this->DrVisit3->caption());

        // DrVisit4
        $this->DrVisit4->EditAttrs["class"] = "form-control";
        $this->DrVisit4->EditCustomAttributes = "";
        $this->DrVisit4->PlaceHolder = RemoveHtml($this->DrVisit4->caption());

        // Surgeon
        $this->Surgeon->EditAttrs["class"] = "form-control";
        $this->Surgeon->EditCustomAttributes = "";
        if (!$this->Surgeon->Raw) {
            $this->Surgeon->CurrentValue = HtmlDecode($this->Surgeon->CurrentValue);
        }
        $this->Surgeon->EditValue = $this->Surgeon->CurrentValue;
        $this->Surgeon->PlaceHolder = RemoveHtml($this->Surgeon->caption());

        // Anaesthetist
        $this->Anaesthetist->EditAttrs["class"] = "form-control";
        $this->Anaesthetist->EditCustomAttributes = "";
        if (!$this->Anaesthetist->Raw) {
            $this->Anaesthetist->CurrentValue = HtmlDecode($this->Anaesthetist->CurrentValue);
        }
        $this->Anaesthetist->EditValue = $this->Anaesthetist->CurrentValue;
        $this->Anaesthetist->PlaceHolder = RemoveHtml($this->Anaesthetist->caption());

        // AsstSurgeon1
        $this->AsstSurgeon1->EditAttrs["class"] = "form-control";
        $this->AsstSurgeon1->EditCustomAttributes = "";
        if (!$this->AsstSurgeon1->Raw) {
            $this->AsstSurgeon1->CurrentValue = HtmlDecode($this->AsstSurgeon1->CurrentValue);
        }
        $this->AsstSurgeon1->EditValue = $this->AsstSurgeon1->CurrentValue;
        $this->AsstSurgeon1->PlaceHolder = RemoveHtml($this->AsstSurgeon1->caption());

        // AsstSurgeon2
        $this->AsstSurgeon2->EditAttrs["class"] = "form-control";
        $this->AsstSurgeon2->EditCustomAttributes = "";
        if (!$this->AsstSurgeon2->Raw) {
            $this->AsstSurgeon2->CurrentValue = HtmlDecode($this->AsstSurgeon2->CurrentValue);
        }
        $this->AsstSurgeon2->EditValue = $this->AsstSurgeon2->CurrentValue;
        $this->AsstSurgeon2->PlaceHolder = RemoveHtml($this->AsstSurgeon2->caption());

        // paediatric
        $this->paediatric->EditAttrs["class"] = "form-control";
        $this->paediatric->EditCustomAttributes = "";
        if (!$this->paediatric->Raw) {
            $this->paediatric->CurrentValue = HtmlDecode($this->paediatric->CurrentValue);
        }
        $this->paediatric->EditValue = $this->paediatric->CurrentValue;
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

        // PatientSearch
        $this->PatientSearch->EditAttrs["class"] = "form-control";
        $this->PatientSearch->EditCustomAttributes = "";
        $this->PatientSearch->PlaceHolder = RemoveHtml($this->PatientSearch->caption());

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
                    $doc->exportCaption($this->ObstetricsHistryFeMale);
                    $doc->exportCaption($this->Abortion);
                    $doc->exportCaption($this->ChildBirthDate);
                    $doc->exportCaption($this->ChildBirthTime);
                    $doc->exportCaption($this->ChildSex);
                    $doc->exportCaption($this->ChildWt);
                    $doc->exportCaption($this->ChildDay);
                    $doc->exportCaption($this->ChildOE);
                    $doc->exportCaption($this->TypeofDelivery);
                    $doc->exportCaption($this->ChildBlGrp);
                    $doc->exportCaption($this->ApgarScore);
                    $doc->exportCaption($this->birthnotification);
                    $doc->exportCaption($this->formno);
                    $doc->exportCaption($this->dte);
                    $doc->exportCaption($this->motherReligion);
                    $doc->exportCaption($this->bloodgroup);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->PatientID);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->ChildBirthDate1);
                    $doc->exportCaption($this->ChildBirthTime1);
                    $doc->exportCaption($this->ChildSex1);
                    $doc->exportCaption($this->ChildWt1);
                    $doc->exportCaption($this->ChildDay1);
                    $doc->exportCaption($this->ChildOE1);
                    $doc->exportCaption($this->TypeofDelivery1);
                    $doc->exportCaption($this->ChildBlGrp1);
                    $doc->exportCaption($this->ApgarScore1);
                    $doc->exportCaption($this->birthnotification1);
                    $doc->exportCaption($this->formno1);
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
                    $doc->exportCaption($this->DrVisit1);
                    $doc->exportCaption($this->DrVisit2);
                    $doc->exportCaption($this->DrVisit3);
                    $doc->exportCaption($this->DrVisit4);
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
                    $doc->exportCaption($this->Reception);
                    $doc->exportCaption($this->PId);
                    $doc->exportCaption($this->PatientSearch);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->PatID);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->mrnno);
                    $doc->exportCaption($this->MobileNumber);
                    $doc->exportCaption($this->Age);
                    $doc->exportCaption($this->Gender);
                    $doc->exportCaption($this->ObstetricsHistryFeMale);
                    $doc->exportCaption($this->Abortion);
                    $doc->exportCaption($this->ChildBirthDate);
                    $doc->exportCaption($this->ChildBirthTime);
                    $doc->exportCaption($this->ChildSex);
                    $doc->exportCaption($this->ChildWt);
                    $doc->exportCaption($this->ChildDay);
                    $doc->exportCaption($this->ChildOE);
                    $doc->exportCaption($this->ChildBlGrp);
                    $doc->exportCaption($this->ApgarScore);
                    $doc->exportCaption($this->birthnotification);
                    $doc->exportCaption($this->formno);
                    $doc->exportCaption($this->dte);
                    $doc->exportCaption($this->motherReligion);
                    $doc->exportCaption($this->bloodgroup);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->PatientID);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->ChildBirthDate1);
                    $doc->exportCaption($this->ChildBirthTime1);
                    $doc->exportCaption($this->ChildSex1);
                    $doc->exportCaption($this->ChildWt1);
                    $doc->exportCaption($this->ChildDay1);
                    $doc->exportCaption($this->ChildOE1);
                    $doc->exportCaption($this->ChildBlGrp1);
                    $doc->exportCaption($this->ApgarScore1);
                    $doc->exportCaption($this->birthnotification1);
                    $doc->exportCaption($this->formno1);
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
                    $doc->exportCaption($this->Reception);
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
                        $doc->exportField($this->ObstetricsHistryFeMale);
                        $doc->exportField($this->Abortion);
                        $doc->exportField($this->ChildBirthDate);
                        $doc->exportField($this->ChildBirthTime);
                        $doc->exportField($this->ChildSex);
                        $doc->exportField($this->ChildWt);
                        $doc->exportField($this->ChildDay);
                        $doc->exportField($this->ChildOE);
                        $doc->exportField($this->TypeofDelivery);
                        $doc->exportField($this->ChildBlGrp);
                        $doc->exportField($this->ApgarScore);
                        $doc->exportField($this->birthnotification);
                        $doc->exportField($this->formno);
                        $doc->exportField($this->dte);
                        $doc->exportField($this->motherReligion);
                        $doc->exportField($this->bloodgroup);
                        $doc->exportField($this->status);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->PatientID);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->ChildBirthDate1);
                        $doc->exportField($this->ChildBirthTime1);
                        $doc->exportField($this->ChildSex1);
                        $doc->exportField($this->ChildWt1);
                        $doc->exportField($this->ChildDay1);
                        $doc->exportField($this->ChildOE1);
                        $doc->exportField($this->TypeofDelivery1);
                        $doc->exportField($this->ChildBlGrp1);
                        $doc->exportField($this->ApgarScore1);
                        $doc->exportField($this->birthnotification1);
                        $doc->exportField($this->formno1);
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
                        $doc->exportField($this->DrVisit1);
                        $doc->exportField($this->DrVisit2);
                        $doc->exportField($this->DrVisit3);
                        $doc->exportField($this->DrVisit4);
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
                        $doc->exportField($this->Reception);
                        $doc->exportField($this->PId);
                        $doc->exportField($this->PatientSearch);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->PatID);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->mrnno);
                        $doc->exportField($this->MobileNumber);
                        $doc->exportField($this->Age);
                        $doc->exportField($this->Gender);
                        $doc->exportField($this->ObstetricsHistryFeMale);
                        $doc->exportField($this->Abortion);
                        $doc->exportField($this->ChildBirthDate);
                        $doc->exportField($this->ChildBirthTime);
                        $doc->exportField($this->ChildSex);
                        $doc->exportField($this->ChildWt);
                        $doc->exportField($this->ChildDay);
                        $doc->exportField($this->ChildOE);
                        $doc->exportField($this->ChildBlGrp);
                        $doc->exportField($this->ApgarScore);
                        $doc->exportField($this->birthnotification);
                        $doc->exportField($this->formno);
                        $doc->exportField($this->dte);
                        $doc->exportField($this->motherReligion);
                        $doc->exportField($this->bloodgroup);
                        $doc->exportField($this->status);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->PatientID);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->ChildBirthDate1);
                        $doc->exportField($this->ChildBirthTime1);
                        $doc->exportField($this->ChildSex1);
                        $doc->exportField($this->ChildWt1);
                        $doc->exportField($this->ChildDay1);
                        $doc->exportField($this->ChildOE1);
                        $doc->exportField($this->ChildBlGrp1);
                        $doc->exportField($this->ApgarScore1);
                        $doc->exportField($this->birthnotification1);
                        $doc->exportField($this->formno1);
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
                        $doc->exportField($this->Reception);
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
