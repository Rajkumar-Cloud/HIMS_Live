<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_patient_clinical_summary
 */
class ViewPatientClinicalSummary extends DbTable
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
    public $PatientID;
    public $HospID;
    public $mrnNo;
    public $patient_id;
    public $patient_name;
    public $profilePic;
    public $gender;
    public $age;
    public $physician_id;
    public $typeRegsisteration;
    public $PaymentCategory;
    public $admission_consultant_id;
    public $leading_consultant_id;
    public $cause;
    public $admission_date;
    public $release_date;
    public $PaymentStatus;
    public $status;
    public $createdby;
    public $createddatetime;
    public $modifiedby;
    public $modifieddatetime;
    public $provisional_diagnosis;
    public $Treatments;
    public $FinalDiagnosis;
    public $courseinhospital;
    public $procedurenotes;
    public $conditionatdischarge;
    public $BP;
    public $Pulse;
    public $Resp;
    public $SPO2;
    public $FollowupAdvice;
    public $NextReviewDate;
    public $History;
    public $vitals;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'view_patient_clinical_summary';
        $this->TableName = 'view_patient_clinical_summary';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_patient_clinical_summary`";
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
        $this->id = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Nullable = false; // NOT NULL field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // PatientID
        $this->PatientID = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_PatientID', 'PatientID', '`PatientID`', '`PatientID`', 200, 45, -1, false, '`PatientID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientID->Sortable = true; // Allow sort
        $this->PatientID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientID->Param, "CustomMsg");
        $this->Fields['PatientID'] = &$this->PatientID;

        // HospID
        $this->HospID = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 200, 45, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospID->Param, "CustomMsg");
        $this->Fields['HospID'] = &$this->HospID;

        // mrnNo
        $this->mrnNo = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_mrnNo', 'mrnNo', '`mrnNo`', '`mrnNo`', 200, 45, -1, false, '`mrnNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->mrnNo->Nullable = false; // NOT NULL field
        $this->mrnNo->Required = true; // Required field
        $this->mrnNo->Sortable = true; // Allow sort
        $this->mrnNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->mrnNo->Param, "CustomMsg");
        $this->Fields['mrnNo'] = &$this->mrnNo;

        // patient_id
        $this->patient_id = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_patient_id', 'patient_id', '`patient_id`', '`patient_id`', 3, 11, -1, false, '`patient_id`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->patient_id->Nullable = false; // NOT NULL field
        $this->patient_id->Required = true; // Required field
        $this->patient_id->Sortable = true; // Allow sort
        $this->patient_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->patient_id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->patient_id->Param, "CustomMsg");
        $this->Fields['patient_id'] = &$this->patient_id;

        // patient_name
        $this->patient_name = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_patient_name', 'patient_name', '`patient_name`', '`patient_name`', 200, 45, -1, false, '`patient_name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->patient_name->Sortable = true; // Allow sort
        $this->patient_name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->patient_name->Param, "CustomMsg");
        $this->Fields['patient_name'] = &$this->patient_name;

        // profilePic
        $this->profilePic = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_profilePic', 'profilePic', '`profilePic`', '`profilePic`', 201, 450, -1, false, '`profilePic`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->profilePic->Sortable = true; // Allow sort
        $this->profilePic->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->profilePic->Param, "CustomMsg");
        $this->Fields['profilePic'] = &$this->profilePic;

        // gender
        $this->gender = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_gender', 'gender', '`gender`', '`gender`', 200, 45, -1, false, '`gender`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->gender->Sortable = true; // Allow sort
        $this->gender->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->gender->Param, "CustomMsg");
        $this->Fields['gender'] = &$this->gender;

        // age
        $this->age = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_age', 'age', '`age`', '`age`', 200, 45, -1, false, '`age`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->age->Sortable = true; // Allow sort
        $this->age->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->age->Param, "CustomMsg");
        $this->Fields['age'] = &$this->age;

        // physician_id
        $this->physician_id = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_physician_id', 'physician_id', '`physician_id`', '`physician_id`', 3, 11, -1, false, '`physician_id`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->physician_id->Sortable = true; // Allow sort
        $this->physician_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->physician_id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->physician_id->Param, "CustomMsg");
        $this->Fields['physician_id'] = &$this->physician_id;

        // typeRegsisteration
        $this->typeRegsisteration = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_typeRegsisteration', 'typeRegsisteration', '`typeRegsisteration`', '`typeRegsisteration`', 200, 45, -1, false, '`typeRegsisteration`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->typeRegsisteration->Sortable = true; // Allow sort
        $this->typeRegsisteration->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->typeRegsisteration->Param, "CustomMsg");
        $this->Fields['typeRegsisteration'] = &$this->typeRegsisteration;

        // PaymentCategory
        $this->PaymentCategory = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_PaymentCategory', 'PaymentCategory', '`PaymentCategory`', '`PaymentCategory`', 200, 45, -1, false, '`PaymentCategory`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PaymentCategory->Sortable = true; // Allow sort
        $this->PaymentCategory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PaymentCategory->Param, "CustomMsg");
        $this->Fields['PaymentCategory'] = &$this->PaymentCategory;

        // admission_consultant_id
        $this->admission_consultant_id = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_admission_consultant_id', 'admission_consultant_id', '`admission_consultant_id`', '`admission_consultant_id`', 3, 11, -1, false, '`admission_consultant_id`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->admission_consultant_id->Sortable = true; // Allow sort
        $this->admission_consultant_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->admission_consultant_id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->admission_consultant_id->Param, "CustomMsg");
        $this->Fields['admission_consultant_id'] = &$this->admission_consultant_id;

        // leading_consultant_id
        $this->leading_consultant_id = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_leading_consultant_id', 'leading_consultant_id', '`leading_consultant_id`', '`leading_consultant_id`', 3, 11, -1, false, '`leading_consultant_id`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->leading_consultant_id->Sortable = true; // Allow sort
        $this->leading_consultant_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->leading_consultant_id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->leading_consultant_id->Param, "CustomMsg");
        $this->Fields['leading_consultant_id'] = &$this->leading_consultant_id;

        // cause
        $this->cause = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_cause', 'cause', '`cause`', '`cause`', 201, 65535, -1, false, '`cause`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->cause->Sortable = true; // Allow sort
        $this->cause->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->cause->Param, "CustomMsg");
        $this->Fields['cause'] = &$this->cause;

        // admission_date
        $this->admission_date = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_admission_date', 'admission_date', '`admission_date`', CastDateFieldForLike("`admission_date`", 0, "DB"), 135, 19, 0, false, '`admission_date`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->admission_date->Sortable = true; // Allow sort
        $this->admission_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->admission_date->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->admission_date->Param, "CustomMsg");
        $this->Fields['admission_date'] = &$this->admission_date;

        // release_date
        $this->release_date = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_release_date', 'release_date', '`release_date`', CastDateFieldForLike("`release_date`", 0, "DB"), 135, 19, 0, false, '`release_date`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->release_date->Sortable = true; // Allow sort
        $this->release_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->release_date->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->release_date->Param, "CustomMsg");
        $this->Fields['release_date'] = &$this->release_date;

        // PaymentStatus
        $this->PaymentStatus = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_PaymentStatus', 'PaymentStatus', '`PaymentStatus`', '`PaymentStatus`', 3, 11, -1, false, '`PaymentStatus`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PaymentStatus->Sortable = true; // Allow sort
        $this->PaymentStatus->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->PaymentStatus->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PaymentStatus->Param, "CustomMsg");
        $this->Fields['PaymentStatus'] = &$this->PaymentStatus;

        // status
        $this->status = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_status', 'status', '`status`', '`status`', 3, 11, -1, false, '`status`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->status->Sortable = true; // Allow sort
        $this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->status->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->status->Param, "CustomMsg");
        $this->Fields['status'] = &$this->status;

        // createdby
        $this->createdby = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, 11, -1, false, '`createdby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdby->Sortable = true; // Allow sort
        $this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->createdby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createdby->Param, "CustomMsg");
        $this->Fields['createdby'] = &$this->createdby;

        // createddatetime
        $this->createddatetime = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, false, '`createddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddatetime->Sortable = true; // Allow sort
        $this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->createddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createddatetime->Param, "CustomMsg");
        $this->Fields['createddatetime'] = &$this->createddatetime;

        // modifiedby
        $this->modifiedby = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, 11, -1, false, '`modifiedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifiedby->Sortable = true; // Allow sort
        $this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->modifiedby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifiedby->Param, "CustomMsg");
        $this->Fields['modifiedby'] = &$this->modifiedby;

        // modifieddatetime
        $this->modifieddatetime = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, false, '`modifieddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifieddatetime->Sortable = true; // Allow sort
        $this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->modifieddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifieddatetime->Param, "CustomMsg");
        $this->Fields['modifieddatetime'] = &$this->modifieddatetime;

        // provisional_diagnosis
        $this->provisional_diagnosis = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_provisional_diagnosis', 'provisional_diagnosis', '`provisional_diagnosis`', '`provisional_diagnosis`', 201, -1, -1, false, '`provisional_diagnosis`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->provisional_diagnosis->Sortable = true; // Allow sort
        $this->provisional_diagnosis->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->provisional_diagnosis->Param, "CustomMsg");
        $this->Fields['provisional_diagnosis'] = &$this->provisional_diagnosis;

        // Treatments
        $this->Treatments = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_Treatments', 'Treatments', '`Treatments`', '`Treatments`', 201, -1, -1, false, '`Treatments`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Treatments->Sortable = true; // Allow sort
        $this->Treatments->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Treatments->Param, "CustomMsg");
        $this->Fields['Treatments'] = &$this->Treatments;

        // FinalDiagnosis
        $this->FinalDiagnosis = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_FinalDiagnosis', 'FinalDiagnosis', '`FinalDiagnosis`', '`FinalDiagnosis`', 201, -1, -1, false, '`FinalDiagnosis`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->FinalDiagnosis->Sortable = true; // Allow sort
        $this->FinalDiagnosis->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FinalDiagnosis->Param, "CustomMsg");
        $this->Fields['FinalDiagnosis'] = &$this->FinalDiagnosis;

        // courseinhospital
        $this->courseinhospital = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_courseinhospital', 'courseinhospital', '`courseinhospital`', '`courseinhospital`', 201, -1, -1, false, '`courseinhospital`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->courseinhospital->Sortable = true; // Allow sort
        $this->courseinhospital->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->courseinhospital->Param, "CustomMsg");
        $this->Fields['courseinhospital'] = &$this->courseinhospital;

        // procedurenotes
        $this->procedurenotes = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_procedurenotes', 'procedurenotes', '`procedurenotes`', '`procedurenotes`', 201, -1, -1, false, '`procedurenotes`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->procedurenotes->Sortable = true; // Allow sort
        $this->procedurenotes->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->procedurenotes->Param, "CustomMsg");
        $this->Fields['procedurenotes'] = &$this->procedurenotes;

        // conditionatdischarge
        $this->conditionatdischarge = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_conditionatdischarge', 'conditionatdischarge', '`conditionatdischarge`', '`conditionatdischarge`', 201, -1, -1, false, '`conditionatdischarge`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->conditionatdischarge->Sortable = true; // Allow sort
        $this->conditionatdischarge->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->conditionatdischarge->Param, "CustomMsg");
        $this->Fields['conditionatdischarge'] = &$this->conditionatdischarge;

        // BP
        $this->BP = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_BP', 'BP', '`BP`', '`BP`', 200, 45, -1, false, '`BP`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BP->Sortable = true; // Allow sort
        $this->BP->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BP->Param, "CustomMsg");
        $this->Fields['BP'] = &$this->BP;

        // Pulse
        $this->Pulse = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_Pulse', 'Pulse', '`Pulse`', '`Pulse`', 200, 45, -1, false, '`Pulse`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Pulse->Sortable = true; // Allow sort
        $this->Pulse->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Pulse->Param, "CustomMsg");
        $this->Fields['Pulse'] = &$this->Pulse;

        // Resp
        $this->Resp = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_Resp', 'Resp', '`Resp`', '`Resp`', 200, 45, -1, false, '`Resp`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Resp->Sortable = true; // Allow sort
        $this->Resp->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Resp->Param, "CustomMsg");
        $this->Fields['Resp'] = &$this->Resp;

        // SPO2
        $this->SPO2 = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_SPO2', 'SPO2', '`SPO2`', '`SPO2`', 200, 45, -1, false, '`SPO2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SPO2->Sortable = true; // Allow sort
        $this->SPO2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SPO2->Param, "CustomMsg");
        $this->Fields['SPO2'] = &$this->SPO2;

        // FollowupAdvice
        $this->FollowupAdvice = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_FollowupAdvice', 'FollowupAdvice', '`FollowupAdvice`', '`FollowupAdvice`', 201, -1, -1, false, '`FollowupAdvice`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->FollowupAdvice->Sortable = true; // Allow sort
        $this->FollowupAdvice->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FollowupAdvice->Param, "CustomMsg");
        $this->Fields['FollowupAdvice'] = &$this->FollowupAdvice;

        // NextReviewDate
        $this->NextReviewDate = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_NextReviewDate', 'NextReviewDate', '`NextReviewDate`', CastDateFieldForLike("`NextReviewDate`", 0, "DB"), 135, 19, 0, false, '`NextReviewDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NextReviewDate->Sortable = true; // Allow sort
        $this->NextReviewDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->NextReviewDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->NextReviewDate->Param, "CustomMsg");
        $this->Fields['NextReviewDate'] = &$this->NextReviewDate;

        // History
        $this->History = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_History', 'History', '`History`', '`History`', 201, 65535, -1, false, '`History`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->History->Sortable = true; // Allow sort
        $this->History->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->History->Param, "CustomMsg");
        $this->Fields['History'] = &$this->History;

        // vitals
        $this->vitals = new DbField('view_patient_clinical_summary', 'view_patient_clinical_summary', 'x_vitals', 'vitals', '`vitals`', '`vitals`', 201, 65535, -1, false, '`vitals`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->vitals->Sortable = true; // Allow sort
        $this->vitals->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->vitals->Param, "CustomMsg");
        $this->Fields['vitals'] = &$this->vitals;
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

    // Table level SQL
    public function getSqlFrom() // From
    {
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_patient_clinical_summary`";
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
        return $this->SqlSelect ?? $this->getQueryBuilder()->select("*");
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
        $this->DefaultFilter = "";
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
        $this->PatientID->DbValue = $row['PatientID'];
        $this->HospID->DbValue = $row['HospID'];
        $this->mrnNo->DbValue = $row['mrnNo'];
        $this->patient_id->DbValue = $row['patient_id'];
        $this->patient_name->DbValue = $row['patient_name'];
        $this->profilePic->DbValue = $row['profilePic'];
        $this->gender->DbValue = $row['gender'];
        $this->age->DbValue = $row['age'];
        $this->physician_id->DbValue = $row['physician_id'];
        $this->typeRegsisteration->DbValue = $row['typeRegsisteration'];
        $this->PaymentCategory->DbValue = $row['PaymentCategory'];
        $this->admission_consultant_id->DbValue = $row['admission_consultant_id'];
        $this->leading_consultant_id->DbValue = $row['leading_consultant_id'];
        $this->cause->DbValue = $row['cause'];
        $this->admission_date->DbValue = $row['admission_date'];
        $this->release_date->DbValue = $row['release_date'];
        $this->PaymentStatus->DbValue = $row['PaymentStatus'];
        $this->status->DbValue = $row['status'];
        $this->createdby->DbValue = $row['createdby'];
        $this->createddatetime->DbValue = $row['createddatetime'];
        $this->modifiedby->DbValue = $row['modifiedby'];
        $this->modifieddatetime->DbValue = $row['modifieddatetime'];
        $this->provisional_diagnosis->DbValue = $row['provisional_diagnosis'];
        $this->Treatments->DbValue = $row['Treatments'];
        $this->FinalDiagnosis->DbValue = $row['FinalDiagnosis'];
        $this->courseinhospital->DbValue = $row['courseinhospital'];
        $this->procedurenotes->DbValue = $row['procedurenotes'];
        $this->conditionatdischarge->DbValue = $row['conditionatdischarge'];
        $this->BP->DbValue = $row['BP'];
        $this->Pulse->DbValue = $row['Pulse'];
        $this->Resp->DbValue = $row['Resp'];
        $this->SPO2->DbValue = $row['SPO2'];
        $this->FollowupAdvice->DbValue = $row['FollowupAdvice'];
        $this->NextReviewDate->DbValue = $row['NextReviewDate'];
        $this->History->DbValue = $row['History'];
        $this->vitals->DbValue = $row['vitals'];
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
        return $_SESSION[$name] ?? GetUrl("ViewPatientClinicalSummaryList");
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
        if ($pageName == "ViewPatientClinicalSummaryView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewPatientClinicalSummaryEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewPatientClinicalSummaryAdd") {
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
                return "ViewPatientClinicalSummaryView";
            case Config("API_ADD_ACTION"):
                return "ViewPatientClinicalSummaryAdd";
            case Config("API_EDIT_ACTION"):
                return "ViewPatientClinicalSummaryEdit";
            case Config("API_DELETE_ACTION"):
                return "ViewPatientClinicalSummaryDelete";
            case Config("API_LIST_ACTION"):
                return "ViewPatientClinicalSummaryList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewPatientClinicalSummaryList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewPatientClinicalSummaryView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewPatientClinicalSummaryView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewPatientClinicalSummaryAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewPatientClinicalSummaryAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewPatientClinicalSummaryEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewPatientClinicalSummaryAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewPatientClinicalSummaryDelete", $this->getUrlParm());
    }

    // Add master url
    public function addMasterUrl($url)
    {
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
        $this->PatientID->setDbValue($row['PatientID']);
        $this->HospID->setDbValue($row['HospID']);
        $this->mrnNo->setDbValue($row['mrnNo']);
        $this->patient_id->setDbValue($row['patient_id']);
        $this->patient_name->setDbValue($row['patient_name']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->gender->setDbValue($row['gender']);
        $this->age->setDbValue($row['age']);
        $this->physician_id->setDbValue($row['physician_id']);
        $this->typeRegsisteration->setDbValue($row['typeRegsisteration']);
        $this->PaymentCategory->setDbValue($row['PaymentCategory']);
        $this->admission_consultant_id->setDbValue($row['admission_consultant_id']);
        $this->leading_consultant_id->setDbValue($row['leading_consultant_id']);
        $this->cause->setDbValue($row['cause']);
        $this->admission_date->setDbValue($row['admission_date']);
        $this->release_date->setDbValue($row['release_date']);
        $this->PaymentStatus->setDbValue($row['PaymentStatus']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->provisional_diagnosis->setDbValue($row['provisional_diagnosis']);
        $this->Treatments->setDbValue($row['Treatments']);
        $this->FinalDiagnosis->setDbValue($row['FinalDiagnosis']);
        $this->courseinhospital->setDbValue($row['courseinhospital']);
        $this->procedurenotes->setDbValue($row['procedurenotes']);
        $this->conditionatdischarge->setDbValue($row['conditionatdischarge']);
        $this->BP->setDbValue($row['BP']);
        $this->Pulse->setDbValue($row['Pulse']);
        $this->Resp->setDbValue($row['Resp']);
        $this->SPO2->setDbValue($row['SPO2']);
        $this->FollowupAdvice->setDbValue($row['FollowupAdvice']);
        $this->NextReviewDate->setDbValue($row['NextReviewDate']);
        $this->History->setDbValue($row['History']);
        $this->vitals->setDbValue($row['vitals']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // PatientID

        // HospID

        // mrnNo

        // patient_id

        // patient_name

        // profilePic

        // gender

        // age

        // physician_id

        // typeRegsisteration

        // PaymentCategory

        // admission_consultant_id

        // leading_consultant_id

        // cause

        // admission_date

        // release_date

        // PaymentStatus

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // provisional_diagnosis

        // Treatments

        // FinalDiagnosis

        // courseinhospital

        // procedurenotes

        // conditionatdischarge

        // BP

        // Pulse

        // Resp

        // SPO2

        // FollowupAdvice

        // NextReviewDate

        // History

        // vitals

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewValue = FormatNumber($this->id->ViewValue, 0, -2, -2, -2);
        $this->id->ViewCustomAttributes = "";

        // PatientID
        $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
        $this->PatientID->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewCustomAttributes = "";

        // mrnNo
        $this->mrnNo->ViewValue = $this->mrnNo->CurrentValue;
        $this->mrnNo->ViewCustomAttributes = "";

        // patient_id
        $this->patient_id->ViewValue = $this->patient_id->CurrentValue;
        $this->patient_id->ViewValue = FormatNumber($this->patient_id->ViewValue, 0, -2, -2, -2);
        $this->patient_id->ViewCustomAttributes = "";

        // patient_name
        $this->patient_name->ViewValue = $this->patient_name->CurrentValue;
        $this->patient_name->ViewCustomAttributes = "";

        // profilePic
        $this->profilePic->ViewValue = $this->profilePic->CurrentValue;
        $this->profilePic->ViewCustomAttributes = "";

        // gender
        $this->gender->ViewValue = $this->gender->CurrentValue;
        $this->gender->ViewCustomAttributes = "";

        // age
        $this->age->ViewValue = $this->age->CurrentValue;
        $this->age->ViewCustomAttributes = "";

        // physician_id
        $this->physician_id->ViewValue = $this->physician_id->CurrentValue;
        $this->physician_id->ViewValue = FormatNumber($this->physician_id->ViewValue, 0, -2, -2, -2);
        $this->physician_id->ViewCustomAttributes = "";

        // typeRegsisteration
        $this->typeRegsisteration->ViewValue = $this->typeRegsisteration->CurrentValue;
        $this->typeRegsisteration->ViewCustomAttributes = "";

        // PaymentCategory
        $this->PaymentCategory->ViewValue = $this->PaymentCategory->CurrentValue;
        $this->PaymentCategory->ViewCustomAttributes = "";

        // admission_consultant_id
        $this->admission_consultant_id->ViewValue = $this->admission_consultant_id->CurrentValue;
        $this->admission_consultant_id->ViewValue = FormatNumber($this->admission_consultant_id->ViewValue, 0, -2, -2, -2);
        $this->admission_consultant_id->ViewCustomAttributes = "";

        // leading_consultant_id
        $this->leading_consultant_id->ViewValue = $this->leading_consultant_id->CurrentValue;
        $this->leading_consultant_id->ViewValue = FormatNumber($this->leading_consultant_id->ViewValue, 0, -2, -2, -2);
        $this->leading_consultant_id->ViewCustomAttributes = "";

        // cause
        $this->cause->ViewValue = $this->cause->CurrentValue;
        $this->cause->ViewCustomAttributes = "";

        // admission_date
        $this->admission_date->ViewValue = $this->admission_date->CurrentValue;
        $this->admission_date->ViewValue = FormatDateTime($this->admission_date->ViewValue, 0);
        $this->admission_date->ViewCustomAttributes = "";

        // release_date
        $this->release_date->ViewValue = $this->release_date->CurrentValue;
        $this->release_date->ViewValue = FormatDateTime($this->release_date->ViewValue, 0);
        $this->release_date->ViewCustomAttributes = "";

        // PaymentStatus
        $this->PaymentStatus->ViewValue = $this->PaymentStatus->CurrentValue;
        $this->PaymentStatus->ViewValue = FormatNumber($this->PaymentStatus->ViewValue, 0, -2, -2, -2);
        $this->PaymentStatus->ViewCustomAttributes = "";

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

        // provisional_diagnosis
        $this->provisional_diagnosis->ViewValue = $this->provisional_diagnosis->CurrentValue;
        $this->provisional_diagnosis->ViewCustomAttributes = "";

        // Treatments
        $this->Treatments->ViewValue = $this->Treatments->CurrentValue;
        $this->Treatments->ViewCustomAttributes = "";

        // FinalDiagnosis
        $this->FinalDiagnosis->ViewValue = $this->FinalDiagnosis->CurrentValue;
        $this->FinalDiagnosis->ViewCustomAttributes = "";

        // courseinhospital
        $this->courseinhospital->ViewValue = $this->courseinhospital->CurrentValue;
        $this->courseinhospital->ViewCustomAttributes = "";

        // procedurenotes
        $this->procedurenotes->ViewValue = $this->procedurenotes->CurrentValue;
        $this->procedurenotes->ViewCustomAttributes = "";

        // conditionatdischarge
        $this->conditionatdischarge->ViewValue = $this->conditionatdischarge->CurrentValue;
        $this->conditionatdischarge->ViewCustomAttributes = "";

        // BP
        $this->BP->ViewValue = $this->BP->CurrentValue;
        $this->BP->ViewCustomAttributes = "";

        // Pulse
        $this->Pulse->ViewValue = $this->Pulse->CurrentValue;
        $this->Pulse->ViewCustomAttributes = "";

        // Resp
        $this->Resp->ViewValue = $this->Resp->CurrentValue;
        $this->Resp->ViewCustomAttributes = "";

        // SPO2
        $this->SPO2->ViewValue = $this->SPO2->CurrentValue;
        $this->SPO2->ViewCustomAttributes = "";

        // FollowupAdvice
        $this->FollowupAdvice->ViewValue = $this->FollowupAdvice->CurrentValue;
        $this->FollowupAdvice->ViewCustomAttributes = "";

        // NextReviewDate
        $this->NextReviewDate->ViewValue = $this->NextReviewDate->CurrentValue;
        $this->NextReviewDate->ViewValue = FormatDateTime($this->NextReviewDate->ViewValue, 0);
        $this->NextReviewDate->ViewCustomAttributes = "";

        // History
        $this->History->ViewValue = $this->History->CurrentValue;
        $this->History->ViewCustomAttributes = "";

        // vitals
        $this->vitals->ViewValue = $this->vitals->CurrentValue;
        $this->vitals->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // PatientID
        $this->PatientID->LinkCustomAttributes = "";
        $this->PatientID->HrefValue = "";
        $this->PatientID->TooltipValue = "";

        // HospID
        $this->HospID->LinkCustomAttributes = "";
        $this->HospID->HrefValue = "";
        $this->HospID->TooltipValue = "";

        // mrnNo
        $this->mrnNo->LinkCustomAttributes = "";
        $this->mrnNo->HrefValue = "";
        $this->mrnNo->TooltipValue = "";

        // patient_id
        $this->patient_id->LinkCustomAttributes = "";
        $this->patient_id->HrefValue = "";
        $this->patient_id->TooltipValue = "";

        // patient_name
        $this->patient_name->LinkCustomAttributes = "";
        $this->patient_name->HrefValue = "";
        $this->patient_name->TooltipValue = "";

        // profilePic
        $this->profilePic->LinkCustomAttributes = "";
        $this->profilePic->HrefValue = "";
        $this->profilePic->TooltipValue = "";

        // gender
        $this->gender->LinkCustomAttributes = "";
        $this->gender->HrefValue = "";
        $this->gender->TooltipValue = "";

        // age
        $this->age->LinkCustomAttributes = "";
        $this->age->HrefValue = "";
        $this->age->TooltipValue = "";

        // physician_id
        $this->physician_id->LinkCustomAttributes = "";
        $this->physician_id->HrefValue = "";
        $this->physician_id->TooltipValue = "";

        // typeRegsisteration
        $this->typeRegsisteration->LinkCustomAttributes = "";
        $this->typeRegsisteration->HrefValue = "";
        $this->typeRegsisteration->TooltipValue = "";

        // PaymentCategory
        $this->PaymentCategory->LinkCustomAttributes = "";
        $this->PaymentCategory->HrefValue = "";
        $this->PaymentCategory->TooltipValue = "";

        // admission_consultant_id
        $this->admission_consultant_id->LinkCustomAttributes = "";
        $this->admission_consultant_id->HrefValue = "";
        $this->admission_consultant_id->TooltipValue = "";

        // leading_consultant_id
        $this->leading_consultant_id->LinkCustomAttributes = "";
        $this->leading_consultant_id->HrefValue = "";
        $this->leading_consultant_id->TooltipValue = "";

        // cause
        $this->cause->LinkCustomAttributes = "";
        $this->cause->HrefValue = "";
        $this->cause->TooltipValue = "";

        // admission_date
        $this->admission_date->LinkCustomAttributes = "";
        $this->admission_date->HrefValue = "";
        $this->admission_date->TooltipValue = "";

        // release_date
        $this->release_date->LinkCustomAttributes = "";
        $this->release_date->HrefValue = "";
        $this->release_date->TooltipValue = "";

        // PaymentStatus
        $this->PaymentStatus->LinkCustomAttributes = "";
        $this->PaymentStatus->HrefValue = "";
        $this->PaymentStatus->TooltipValue = "";

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

        // provisional_diagnosis
        $this->provisional_diagnosis->LinkCustomAttributes = "";
        $this->provisional_diagnosis->HrefValue = "";
        $this->provisional_diagnosis->TooltipValue = "";

        // Treatments
        $this->Treatments->LinkCustomAttributes = "";
        $this->Treatments->HrefValue = "";
        $this->Treatments->TooltipValue = "";

        // FinalDiagnosis
        $this->FinalDiagnosis->LinkCustomAttributes = "";
        $this->FinalDiagnosis->HrefValue = "";
        $this->FinalDiagnosis->TooltipValue = "";

        // courseinhospital
        $this->courseinhospital->LinkCustomAttributes = "";
        $this->courseinhospital->HrefValue = "";
        $this->courseinhospital->TooltipValue = "";

        // procedurenotes
        $this->procedurenotes->LinkCustomAttributes = "";
        $this->procedurenotes->HrefValue = "";
        $this->procedurenotes->TooltipValue = "";

        // conditionatdischarge
        $this->conditionatdischarge->LinkCustomAttributes = "";
        $this->conditionatdischarge->HrefValue = "";
        $this->conditionatdischarge->TooltipValue = "";

        // BP
        $this->BP->LinkCustomAttributes = "";
        $this->BP->HrefValue = "";
        $this->BP->TooltipValue = "";

        // Pulse
        $this->Pulse->LinkCustomAttributes = "";
        $this->Pulse->HrefValue = "";
        $this->Pulse->TooltipValue = "";

        // Resp
        $this->Resp->LinkCustomAttributes = "";
        $this->Resp->HrefValue = "";
        $this->Resp->TooltipValue = "";

        // SPO2
        $this->SPO2->LinkCustomAttributes = "";
        $this->SPO2->HrefValue = "";
        $this->SPO2->TooltipValue = "";

        // FollowupAdvice
        $this->FollowupAdvice->LinkCustomAttributes = "";
        $this->FollowupAdvice->HrefValue = "";
        $this->FollowupAdvice->TooltipValue = "";

        // NextReviewDate
        $this->NextReviewDate->LinkCustomAttributes = "";
        $this->NextReviewDate->HrefValue = "";
        $this->NextReviewDate->TooltipValue = "";

        // History
        $this->History->LinkCustomAttributes = "";
        $this->History->HrefValue = "";
        $this->History->TooltipValue = "";

        // vitals
        $this->vitals->LinkCustomAttributes = "";
        $this->vitals->HrefValue = "";
        $this->vitals->TooltipValue = "";

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
        $this->id->PlaceHolder = RemoveHtml($this->id->caption());

        // PatientID
        $this->PatientID->EditAttrs["class"] = "form-control";
        $this->PatientID->EditCustomAttributes = "";
        if (!$this->PatientID->Raw) {
            $this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
        }
        $this->PatientID->EditValue = $this->PatientID->CurrentValue;
        $this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

        // HospID
        $this->HospID->EditAttrs["class"] = "form-control";
        $this->HospID->EditCustomAttributes = "";
        if (!$this->HospID->Raw) {
            $this->HospID->CurrentValue = HtmlDecode($this->HospID->CurrentValue);
        }
        $this->HospID->EditValue = $this->HospID->CurrentValue;
        $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

        // mrnNo
        $this->mrnNo->EditAttrs["class"] = "form-control";
        $this->mrnNo->EditCustomAttributes = "";
        if (!$this->mrnNo->Raw) {
            $this->mrnNo->CurrentValue = HtmlDecode($this->mrnNo->CurrentValue);
        }
        $this->mrnNo->EditValue = $this->mrnNo->CurrentValue;
        $this->mrnNo->PlaceHolder = RemoveHtml($this->mrnNo->caption());

        // patient_id
        $this->patient_id->EditAttrs["class"] = "form-control";
        $this->patient_id->EditCustomAttributes = "";
        $this->patient_id->EditValue = $this->patient_id->CurrentValue;
        $this->patient_id->PlaceHolder = RemoveHtml($this->patient_id->caption());

        // patient_name
        $this->patient_name->EditAttrs["class"] = "form-control";
        $this->patient_name->EditCustomAttributes = "";
        if (!$this->patient_name->Raw) {
            $this->patient_name->CurrentValue = HtmlDecode($this->patient_name->CurrentValue);
        }
        $this->patient_name->EditValue = $this->patient_name->CurrentValue;
        $this->patient_name->PlaceHolder = RemoveHtml($this->patient_name->caption());

        // profilePic
        $this->profilePic->EditAttrs["class"] = "form-control";
        $this->profilePic->EditCustomAttributes = "";
        $this->profilePic->EditValue = $this->profilePic->CurrentValue;
        $this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

        // gender
        $this->gender->EditAttrs["class"] = "form-control";
        $this->gender->EditCustomAttributes = "";
        if (!$this->gender->Raw) {
            $this->gender->CurrentValue = HtmlDecode($this->gender->CurrentValue);
        }
        $this->gender->EditValue = $this->gender->CurrentValue;
        $this->gender->PlaceHolder = RemoveHtml($this->gender->caption());

        // age
        $this->age->EditAttrs["class"] = "form-control";
        $this->age->EditCustomAttributes = "";
        if (!$this->age->Raw) {
            $this->age->CurrentValue = HtmlDecode($this->age->CurrentValue);
        }
        $this->age->EditValue = $this->age->CurrentValue;
        $this->age->PlaceHolder = RemoveHtml($this->age->caption());

        // physician_id
        $this->physician_id->EditAttrs["class"] = "form-control";
        $this->physician_id->EditCustomAttributes = "";
        $this->physician_id->EditValue = $this->physician_id->CurrentValue;
        $this->physician_id->PlaceHolder = RemoveHtml($this->physician_id->caption());

        // typeRegsisteration
        $this->typeRegsisteration->EditAttrs["class"] = "form-control";
        $this->typeRegsisteration->EditCustomAttributes = "";
        if (!$this->typeRegsisteration->Raw) {
            $this->typeRegsisteration->CurrentValue = HtmlDecode($this->typeRegsisteration->CurrentValue);
        }
        $this->typeRegsisteration->EditValue = $this->typeRegsisteration->CurrentValue;
        $this->typeRegsisteration->PlaceHolder = RemoveHtml($this->typeRegsisteration->caption());

        // PaymentCategory
        $this->PaymentCategory->EditAttrs["class"] = "form-control";
        $this->PaymentCategory->EditCustomAttributes = "";
        if (!$this->PaymentCategory->Raw) {
            $this->PaymentCategory->CurrentValue = HtmlDecode($this->PaymentCategory->CurrentValue);
        }
        $this->PaymentCategory->EditValue = $this->PaymentCategory->CurrentValue;
        $this->PaymentCategory->PlaceHolder = RemoveHtml($this->PaymentCategory->caption());

        // admission_consultant_id
        $this->admission_consultant_id->EditAttrs["class"] = "form-control";
        $this->admission_consultant_id->EditCustomAttributes = "";
        $this->admission_consultant_id->EditValue = $this->admission_consultant_id->CurrentValue;
        $this->admission_consultant_id->PlaceHolder = RemoveHtml($this->admission_consultant_id->caption());

        // leading_consultant_id
        $this->leading_consultant_id->EditAttrs["class"] = "form-control";
        $this->leading_consultant_id->EditCustomAttributes = "";
        $this->leading_consultant_id->EditValue = $this->leading_consultant_id->CurrentValue;
        $this->leading_consultant_id->PlaceHolder = RemoveHtml($this->leading_consultant_id->caption());

        // cause
        $this->cause->EditAttrs["class"] = "form-control";
        $this->cause->EditCustomAttributes = "";
        $this->cause->EditValue = $this->cause->CurrentValue;
        $this->cause->PlaceHolder = RemoveHtml($this->cause->caption());

        // admission_date
        $this->admission_date->EditAttrs["class"] = "form-control";
        $this->admission_date->EditCustomAttributes = "";
        $this->admission_date->EditValue = FormatDateTime($this->admission_date->CurrentValue, 8);
        $this->admission_date->PlaceHolder = RemoveHtml($this->admission_date->caption());

        // release_date
        $this->release_date->EditAttrs["class"] = "form-control";
        $this->release_date->EditCustomAttributes = "";
        $this->release_date->EditValue = FormatDateTime($this->release_date->CurrentValue, 8);
        $this->release_date->PlaceHolder = RemoveHtml($this->release_date->caption());

        // PaymentStatus
        $this->PaymentStatus->EditAttrs["class"] = "form-control";
        $this->PaymentStatus->EditCustomAttributes = "";
        $this->PaymentStatus->EditValue = $this->PaymentStatus->CurrentValue;
        $this->PaymentStatus->PlaceHolder = RemoveHtml($this->PaymentStatus->caption());

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

        // provisional_diagnosis
        $this->provisional_diagnosis->EditAttrs["class"] = "form-control";
        $this->provisional_diagnosis->EditCustomAttributes = "";
        $this->provisional_diagnosis->EditValue = $this->provisional_diagnosis->CurrentValue;
        $this->provisional_diagnosis->PlaceHolder = RemoveHtml($this->provisional_diagnosis->caption());

        // Treatments
        $this->Treatments->EditAttrs["class"] = "form-control";
        $this->Treatments->EditCustomAttributes = "";
        $this->Treatments->EditValue = $this->Treatments->CurrentValue;
        $this->Treatments->PlaceHolder = RemoveHtml($this->Treatments->caption());

        // FinalDiagnosis
        $this->FinalDiagnosis->EditAttrs["class"] = "form-control";
        $this->FinalDiagnosis->EditCustomAttributes = "";
        $this->FinalDiagnosis->EditValue = $this->FinalDiagnosis->CurrentValue;
        $this->FinalDiagnosis->PlaceHolder = RemoveHtml($this->FinalDiagnosis->caption());

        // courseinhospital
        $this->courseinhospital->EditAttrs["class"] = "form-control";
        $this->courseinhospital->EditCustomAttributes = "";
        $this->courseinhospital->EditValue = $this->courseinhospital->CurrentValue;
        $this->courseinhospital->PlaceHolder = RemoveHtml($this->courseinhospital->caption());

        // procedurenotes
        $this->procedurenotes->EditAttrs["class"] = "form-control";
        $this->procedurenotes->EditCustomAttributes = "";
        $this->procedurenotes->EditValue = $this->procedurenotes->CurrentValue;
        $this->procedurenotes->PlaceHolder = RemoveHtml($this->procedurenotes->caption());

        // conditionatdischarge
        $this->conditionatdischarge->EditAttrs["class"] = "form-control";
        $this->conditionatdischarge->EditCustomAttributes = "";
        $this->conditionatdischarge->EditValue = $this->conditionatdischarge->CurrentValue;
        $this->conditionatdischarge->PlaceHolder = RemoveHtml($this->conditionatdischarge->caption());

        // BP
        $this->BP->EditAttrs["class"] = "form-control";
        $this->BP->EditCustomAttributes = "";
        if (!$this->BP->Raw) {
            $this->BP->CurrentValue = HtmlDecode($this->BP->CurrentValue);
        }
        $this->BP->EditValue = $this->BP->CurrentValue;
        $this->BP->PlaceHolder = RemoveHtml($this->BP->caption());

        // Pulse
        $this->Pulse->EditAttrs["class"] = "form-control";
        $this->Pulse->EditCustomAttributes = "";
        if (!$this->Pulse->Raw) {
            $this->Pulse->CurrentValue = HtmlDecode($this->Pulse->CurrentValue);
        }
        $this->Pulse->EditValue = $this->Pulse->CurrentValue;
        $this->Pulse->PlaceHolder = RemoveHtml($this->Pulse->caption());

        // Resp
        $this->Resp->EditAttrs["class"] = "form-control";
        $this->Resp->EditCustomAttributes = "";
        if (!$this->Resp->Raw) {
            $this->Resp->CurrentValue = HtmlDecode($this->Resp->CurrentValue);
        }
        $this->Resp->EditValue = $this->Resp->CurrentValue;
        $this->Resp->PlaceHolder = RemoveHtml($this->Resp->caption());

        // SPO2
        $this->SPO2->EditAttrs["class"] = "form-control";
        $this->SPO2->EditCustomAttributes = "";
        if (!$this->SPO2->Raw) {
            $this->SPO2->CurrentValue = HtmlDecode($this->SPO2->CurrentValue);
        }
        $this->SPO2->EditValue = $this->SPO2->CurrentValue;
        $this->SPO2->PlaceHolder = RemoveHtml($this->SPO2->caption());

        // FollowupAdvice
        $this->FollowupAdvice->EditAttrs["class"] = "form-control";
        $this->FollowupAdvice->EditCustomAttributes = "";
        $this->FollowupAdvice->EditValue = $this->FollowupAdvice->CurrentValue;
        $this->FollowupAdvice->PlaceHolder = RemoveHtml($this->FollowupAdvice->caption());

        // NextReviewDate
        $this->NextReviewDate->EditAttrs["class"] = "form-control";
        $this->NextReviewDate->EditCustomAttributes = "";
        $this->NextReviewDate->EditValue = FormatDateTime($this->NextReviewDate->CurrentValue, 8);
        $this->NextReviewDate->PlaceHolder = RemoveHtml($this->NextReviewDate->caption());

        // History
        $this->History->EditAttrs["class"] = "form-control";
        $this->History->EditCustomAttributes = "";
        $this->History->EditValue = $this->History->CurrentValue;
        $this->History->PlaceHolder = RemoveHtml($this->History->caption());

        // vitals
        $this->vitals->EditAttrs["class"] = "form-control";
        $this->vitals->EditCustomAttributes = "";
        $this->vitals->EditValue = $this->vitals->CurrentValue;
        $this->vitals->PlaceHolder = RemoveHtml($this->vitals->caption());

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
                    $doc->exportCaption($this->PatientID);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->mrnNo);
                    $doc->exportCaption($this->patient_id);
                    $doc->exportCaption($this->patient_name);
                    $doc->exportCaption($this->profilePic);
                    $doc->exportCaption($this->gender);
                    $doc->exportCaption($this->age);
                    $doc->exportCaption($this->physician_id);
                    $doc->exportCaption($this->typeRegsisteration);
                    $doc->exportCaption($this->PaymentCategory);
                    $doc->exportCaption($this->admission_consultant_id);
                    $doc->exportCaption($this->leading_consultant_id);
                    $doc->exportCaption($this->cause);
                    $doc->exportCaption($this->admission_date);
                    $doc->exportCaption($this->release_date);
                    $doc->exportCaption($this->PaymentStatus);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->provisional_diagnosis);
                    $doc->exportCaption($this->Treatments);
                    $doc->exportCaption($this->FinalDiagnosis);
                    $doc->exportCaption($this->courseinhospital);
                    $doc->exportCaption($this->procedurenotes);
                    $doc->exportCaption($this->conditionatdischarge);
                    $doc->exportCaption($this->BP);
                    $doc->exportCaption($this->Pulse);
                    $doc->exportCaption($this->Resp);
                    $doc->exportCaption($this->SPO2);
                    $doc->exportCaption($this->FollowupAdvice);
                    $doc->exportCaption($this->NextReviewDate);
                    $doc->exportCaption($this->History);
                    $doc->exportCaption($this->vitals);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->PatientID);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->mrnNo);
                    $doc->exportCaption($this->patient_id);
                    $doc->exportCaption($this->patient_name);
                    $doc->exportCaption($this->gender);
                    $doc->exportCaption($this->age);
                    $doc->exportCaption($this->physician_id);
                    $doc->exportCaption($this->typeRegsisteration);
                    $doc->exportCaption($this->PaymentCategory);
                    $doc->exportCaption($this->admission_consultant_id);
                    $doc->exportCaption($this->leading_consultant_id);
                    $doc->exportCaption($this->admission_date);
                    $doc->exportCaption($this->release_date);
                    $doc->exportCaption($this->PaymentStatus);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->BP);
                    $doc->exportCaption($this->Pulse);
                    $doc->exportCaption($this->Resp);
                    $doc->exportCaption($this->SPO2);
                    $doc->exportCaption($this->NextReviewDate);
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
                        $doc->exportField($this->PatientID);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->mrnNo);
                        $doc->exportField($this->patient_id);
                        $doc->exportField($this->patient_name);
                        $doc->exportField($this->profilePic);
                        $doc->exportField($this->gender);
                        $doc->exportField($this->age);
                        $doc->exportField($this->physician_id);
                        $doc->exportField($this->typeRegsisteration);
                        $doc->exportField($this->PaymentCategory);
                        $doc->exportField($this->admission_consultant_id);
                        $doc->exportField($this->leading_consultant_id);
                        $doc->exportField($this->cause);
                        $doc->exportField($this->admission_date);
                        $doc->exportField($this->release_date);
                        $doc->exportField($this->PaymentStatus);
                        $doc->exportField($this->status);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->provisional_diagnosis);
                        $doc->exportField($this->Treatments);
                        $doc->exportField($this->FinalDiagnosis);
                        $doc->exportField($this->courseinhospital);
                        $doc->exportField($this->procedurenotes);
                        $doc->exportField($this->conditionatdischarge);
                        $doc->exportField($this->BP);
                        $doc->exportField($this->Pulse);
                        $doc->exportField($this->Resp);
                        $doc->exportField($this->SPO2);
                        $doc->exportField($this->FollowupAdvice);
                        $doc->exportField($this->NextReviewDate);
                        $doc->exportField($this->History);
                        $doc->exportField($this->vitals);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->PatientID);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->mrnNo);
                        $doc->exportField($this->patient_id);
                        $doc->exportField($this->patient_name);
                        $doc->exportField($this->gender);
                        $doc->exportField($this->age);
                        $doc->exportField($this->physician_id);
                        $doc->exportField($this->typeRegsisteration);
                        $doc->exportField($this->PaymentCategory);
                        $doc->exportField($this->admission_consultant_id);
                        $doc->exportField($this->leading_consultant_id);
                        $doc->exportField($this->admission_date);
                        $doc->exportField($this->release_date);
                        $doc->exportField($this->PaymentStatus);
                        $doc->exportField($this->status);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->BP);
                        $doc->exportField($this->Pulse);
                        $doc->exportField($this->Resp);
                        $doc->exportField($this->SPO2);
                        $doc->exportField($this->NextReviewDate);
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
    public function rowInserting($rsold, &$rsnew)
    {
        // Enter your code here
        // To cancel, set return value to false
        return true;
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
