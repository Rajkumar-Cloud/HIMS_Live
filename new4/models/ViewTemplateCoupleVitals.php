<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_template_couple_vitals
 */
class ViewTemplateCoupleVitals extends DbTable
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
    public $Male;
    public $Female;
    public $status;
    public $createdby;
    public $createddatetime;
    public $modifiedby;
    public $modifieddatetime;
    public $malepropic;
    public $femalepropic;
    public $HusbandEducation;
    public $WifeEducation;
    public $HusbandWorkHours;
    public $WifeWorkHours;
    public $PatientLanguage;
    public $ReferedBy;
    public $ReferPhNo;
    public $WifeCell;
    public $HusbandCell;
    public $WifeEmail;
    public $HusbandEmail;
    public $ARTCYCLE;
    public $RESULT;
    public $CoupleID;
    public $HospID;
    public $PatientName;
    public $PatientID;
    public $PartnerName;
    public $PartnerID;
    public $DrID;
    public $DrDepartment;
    public $Doctor;
    public $hid;
    public $RIDNO;
    public $Name;
    public $Age;
    public $SEX;
    public $Religion;
    public $Address;
    public $IdentificationMark;
    public $DoublewitnessName1;
    public $DoublewitnessName2;
    public $Chiefcomplaints;
    public $MenstrualHistory;
    public $ObstetricHistory;
    public $MedicalHistory;
    public $SurgicalHistory;
    public $Generalexaminationpallor;
    public $PR;
    public $CVS;
    public $PA;
    public $PROVISIONALDIAGNOSIS;
    public $Investigations;
    public $Fheight;
    public $Fweight;
    public $FBMI;
    public $FBloodgroup;
    public $Mheight;
    public $Mweight;
    public $MBMI;
    public $MBloodgroup;
    public $FBuild;
    public $MBuild;
    public $FSkinColor;
    public $MSkinColor;
    public $FEyesColor;
    public $MEyesColor;
    public $FHairColor;
    public $MhairColor;
    public $FhairTexture;
    public $MHairTexture;
    public $Fothers;
    public $Mothers;
    public $PGE;
    public $PPR;
    public $PBP;
    public $Breast;
    public $PPA;
    public $PPSV;
    public $PPAPSMEAR;
    public $PTHYROID;
    public $MTHYROID;
    public $SecSexCharacters;
    public $PenisUM;
    public $VAS;
    public $EPIDIDYMIS;
    public $Varicocele;
    public $FertilityTreatmentHistory;
    public $SurgeryHistory;
    public $FamilyHistory;
    public $PInvestigations;
    public $Addictions;
    public $Medications;
    public $Medical;
    public $Surgical;
    public $CoitalHistory;
    public $SemenAnalysis;
    public $MInsvestications;
    public $PImpression;
    public $MIMpression;
    public $PPlanOfManagement;
    public $MPlanOfManagement;
    public $PReadMore;
    public $MReadMore;
    public $MariedFor;
    public $CMNCM;
    public $TidNo;
    public $pFamilyHistory;
    public $pTemplateMedications;
    public $AntiTPO;
    public $AntiTG;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'view_template_couple_vitals';
        $this->TableName = 'view_template_couple_vitals';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_template_couple_vitals`";
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
        $this->id = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // Male
        $this->Male = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Male', 'Male', '`Male`', '`Male`', 3, 11, -1, false, '`Male`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Male->Nullable = false; // NOT NULL field
        $this->Male->Required = true; // Required field
        $this->Male->Sortable = true; // Allow sort
        $this->Male->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Male->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Male->Param, "CustomMsg");
        $this->Fields['Male'] = &$this->Male;

        // Female
        $this->Female = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Female', 'Female', '`Female`', '`Female`', 3, 11, -1, false, '`Female`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Female->Nullable = false; // NOT NULL field
        $this->Female->Required = true; // Required field
        $this->Female->Sortable = true; // Allow sort
        $this->Female->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Female->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Female->Param, "CustomMsg");
        $this->Fields['Female'] = &$this->Female;

        // status
        $this->status = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_status', 'status', '`status`', '`status`', 3, 11, -1, false, '`status`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->status->Sortable = true; // Allow sort
        $this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->status->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->status->Param, "CustomMsg");
        $this->Fields['status'] = &$this->status;

        // createdby
        $this->createdby = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, 11, -1, false, '`createdby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdby->Sortable = true; // Allow sort
        $this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->createdby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createdby->Param, "CustomMsg");
        $this->Fields['createdby'] = &$this->createdby;

        // createddatetime
        $this->createddatetime = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, false, '`createddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddatetime->Sortable = true; // Allow sort
        $this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->createddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createddatetime->Param, "CustomMsg");
        $this->Fields['createddatetime'] = &$this->createddatetime;

        // modifiedby
        $this->modifiedby = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, 11, -1, false, '`modifiedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifiedby->Sortable = true; // Allow sort
        $this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->modifiedby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifiedby->Param, "CustomMsg");
        $this->Fields['modifiedby'] = &$this->modifiedby;

        // modifieddatetime
        $this->modifieddatetime = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, false, '`modifieddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifieddatetime->Sortable = true; // Allow sort
        $this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->modifieddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifieddatetime->Param, "CustomMsg");
        $this->Fields['modifieddatetime'] = &$this->modifieddatetime;

        // malepropic
        $this->malepropic = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_malepropic', 'malepropic', '`malepropic`', '`malepropic`', 201, 450, -1, false, '`malepropic`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->malepropic->Sortable = true; // Allow sort
        $this->malepropic->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->malepropic->Param, "CustomMsg");
        $this->Fields['malepropic'] = &$this->malepropic;

        // femalepropic
        $this->femalepropic = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_femalepropic', 'femalepropic', '`femalepropic`', '`femalepropic`', 201, 450, -1, false, '`femalepropic`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->femalepropic->Sortable = true; // Allow sort
        $this->femalepropic->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->femalepropic->Param, "CustomMsg");
        $this->Fields['femalepropic'] = &$this->femalepropic;

        // HusbandEducation
        $this->HusbandEducation = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_HusbandEducation', 'HusbandEducation', '`HusbandEducation`', '`HusbandEducation`', 200, 45, -1, false, '`HusbandEducation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HusbandEducation->Sortable = true; // Allow sort
        $this->HusbandEducation->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HusbandEducation->Param, "CustomMsg");
        $this->Fields['HusbandEducation'] = &$this->HusbandEducation;

        // WifeEducation
        $this->WifeEducation = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_WifeEducation', 'WifeEducation', '`WifeEducation`', '`WifeEducation`', 200, 45, -1, false, '`WifeEducation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->WifeEducation->Sortable = true; // Allow sort
        $this->WifeEducation->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->WifeEducation->Param, "CustomMsg");
        $this->Fields['WifeEducation'] = &$this->WifeEducation;

        // HusbandWorkHours
        $this->HusbandWorkHours = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_HusbandWorkHours', 'HusbandWorkHours', '`HusbandWorkHours`', '`HusbandWorkHours`', 200, 45, -1, false, '`HusbandWorkHours`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HusbandWorkHours->Sortable = true; // Allow sort
        $this->HusbandWorkHours->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HusbandWorkHours->Param, "CustomMsg");
        $this->Fields['HusbandWorkHours'] = &$this->HusbandWorkHours;

        // WifeWorkHours
        $this->WifeWorkHours = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_WifeWorkHours', 'WifeWorkHours', '`WifeWorkHours`', '`WifeWorkHours`', 200, 45, -1, false, '`WifeWorkHours`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->WifeWorkHours->Sortable = true; // Allow sort
        $this->WifeWorkHours->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->WifeWorkHours->Param, "CustomMsg");
        $this->Fields['WifeWorkHours'] = &$this->WifeWorkHours;

        // PatientLanguage
        $this->PatientLanguage = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PatientLanguage', 'PatientLanguage', '`PatientLanguage`', '`PatientLanguage`', 200, 45, -1, false, '`PatientLanguage`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientLanguage->Sortable = true; // Allow sort
        $this->PatientLanguage->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientLanguage->Param, "CustomMsg");
        $this->Fields['PatientLanguage'] = &$this->PatientLanguage;

        // ReferedBy
        $this->ReferedBy = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_ReferedBy', 'ReferedBy', '`ReferedBy`', '`ReferedBy`', 200, 45, -1, false, '`ReferedBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReferedBy->Sortable = true; // Allow sort
        $this->ReferedBy->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ReferedBy->Param, "CustomMsg");
        $this->Fields['ReferedBy'] = &$this->ReferedBy;

        // ReferPhNo
        $this->ReferPhNo = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_ReferPhNo', 'ReferPhNo', '`ReferPhNo`', '`ReferPhNo`', 200, 45, -1, false, '`ReferPhNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReferPhNo->Sortable = true; // Allow sort
        $this->ReferPhNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ReferPhNo->Param, "CustomMsg");
        $this->Fields['ReferPhNo'] = &$this->ReferPhNo;

        // WifeCell
        $this->WifeCell = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_WifeCell', 'WifeCell', '`WifeCell`', '`WifeCell`', 200, 45, -1, false, '`WifeCell`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->WifeCell->Sortable = true; // Allow sort
        $this->WifeCell->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->WifeCell->Param, "CustomMsg");
        $this->Fields['WifeCell'] = &$this->WifeCell;

        // HusbandCell
        $this->HusbandCell = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_HusbandCell', 'HusbandCell', '`HusbandCell`', '`HusbandCell`', 200, 45, -1, false, '`HusbandCell`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HusbandCell->Sortable = true; // Allow sort
        $this->HusbandCell->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HusbandCell->Param, "CustomMsg");
        $this->Fields['HusbandCell'] = &$this->HusbandCell;

        // WifeEmail
        $this->WifeEmail = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_WifeEmail', 'WifeEmail', '`WifeEmail`', '`WifeEmail`', 200, 45, -1, false, '`WifeEmail`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->WifeEmail->Sortable = true; // Allow sort
        $this->WifeEmail->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->WifeEmail->Param, "CustomMsg");
        $this->Fields['WifeEmail'] = &$this->WifeEmail;

        // HusbandEmail
        $this->HusbandEmail = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_HusbandEmail', 'HusbandEmail', '`HusbandEmail`', '`HusbandEmail`', 200, 45, -1, false, '`HusbandEmail`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HusbandEmail->Sortable = true; // Allow sort
        $this->HusbandEmail->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HusbandEmail->Param, "CustomMsg");
        $this->Fields['HusbandEmail'] = &$this->HusbandEmail;

        // ARTCYCLE
        $this->ARTCYCLE = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_ARTCYCLE', 'ARTCYCLE', '`ARTCYCLE`', '`ARTCYCLE`', 200, 45, -1, false, '`ARTCYCLE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ARTCYCLE->Sortable = true; // Allow sort
        $this->ARTCYCLE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ARTCYCLE->Param, "CustomMsg");
        $this->Fields['ARTCYCLE'] = &$this->ARTCYCLE;

        // RESULT
        $this->RESULT = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_RESULT', 'RESULT', '`RESULT`', '`RESULT`', 200, 45, -1, false, '`RESULT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RESULT->Sortable = true; // Allow sort
        $this->RESULT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RESULT->Param, "CustomMsg");
        $this->Fields['RESULT'] = &$this->RESULT;

        // CoupleID
        $this->CoupleID = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_CoupleID', 'CoupleID', '`CoupleID`', '`CoupleID`', 200, 45, -1, false, '`CoupleID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CoupleID->Sortable = true; // Allow sort
        $this->CoupleID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CoupleID->Param, "CustomMsg");
        $this->Fields['CoupleID'] = &$this->CoupleID;

        // HospID
        $this->HospID = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->HospID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospID->Param, "CustomMsg");
        $this->Fields['HospID'] = &$this->HospID;

        // PatientName
        $this->PatientName = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, false, '`PatientName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientName->Sortable = true; // Allow sort
        $this->PatientName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientName->Param, "CustomMsg");
        $this->Fields['PatientName'] = &$this->PatientName;

        // PatientID
        $this->PatientID = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PatientID', 'PatientID', '`PatientID`', '`PatientID`', 200, 45, -1, false, '`PatientID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientID->Sortable = true; // Allow sort
        $this->PatientID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientID->Param, "CustomMsg");
        $this->Fields['PatientID'] = &$this->PatientID;

        // PartnerName
        $this->PartnerName = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PartnerName', 'PartnerName', '`PartnerName`', '`PartnerName`', 200, 45, -1, false, '`PartnerName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PartnerName->Sortable = true; // Allow sort
        $this->PartnerName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PartnerName->Param, "CustomMsg");
        $this->Fields['PartnerName'] = &$this->PartnerName;

        // PartnerID
        $this->PartnerID = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PartnerID', 'PartnerID', '`PartnerID`', '`PartnerID`', 200, 45, -1, false, '`PartnerID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PartnerID->Sortable = true; // Allow sort
        $this->PartnerID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PartnerID->Param, "CustomMsg");
        $this->Fields['PartnerID'] = &$this->PartnerID;

        // DrID
        $this->DrID = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_DrID', 'DrID', '`DrID`', '`DrID`', 3, 11, -1, false, '`DrID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DrID->Sortable = true; // Allow sort
        $this->DrID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->DrID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DrID->Param, "CustomMsg");
        $this->Fields['DrID'] = &$this->DrID;

        // DrDepartment
        $this->DrDepartment = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_DrDepartment', 'DrDepartment', '`DrDepartment`', '`DrDepartment`', 200, 45, -1, false, '`DrDepartment`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DrDepartment->Sortable = true; // Allow sort
        $this->DrDepartment->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DrDepartment->Param, "CustomMsg");
        $this->Fields['DrDepartment'] = &$this->DrDepartment;

        // Doctor
        $this->Doctor = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Doctor', 'Doctor', '`Doctor`', '`Doctor`', 200, 45, -1, false, '`Doctor`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Doctor->Sortable = true; // Allow sort
        $this->Doctor->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Doctor->Param, "CustomMsg");
        $this->Fields['Doctor'] = &$this->Doctor;

        // hid
        $this->hid = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_hid', 'hid', '`hid`', '`hid`', 3, 11, -1, false, '`hid`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->hid->IsAutoIncrement = true; // Autoincrement field
        $this->hid->IsPrimaryKey = true; // Primary key field
        $this->hid->Sortable = true; // Allow sort
        $this->hid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->hid->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->hid->Param, "CustomMsg");
        $this->Fields['hid'] = &$this->hid;

        // RIDNO
        $this->RIDNO = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_RIDNO', 'RIDNO', '`RIDNO`', '`RIDNO`', 3, 11, -1, false, '`RIDNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RIDNO->Sortable = true; // Allow sort
        $this->RIDNO->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->RIDNO->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RIDNO->Param, "CustomMsg");
        $this->Fields['RIDNO'] = &$this->RIDNO;

        // Name
        $this->Name = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Name', 'Name', '`Name`', '`Name`', 200, 45, -1, false, '`Name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Name->Sortable = true; // Allow sort
        $this->Name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Name->Param, "CustomMsg");
        $this->Fields['Name'] = &$this->Name;

        // Age
        $this->Age = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Age', 'Age', '`Age`', '`Age`', 200, 45, -1, false, '`Age`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Age->Sortable = true; // Allow sort
        $this->Age->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Age->Param, "CustomMsg");
        $this->Fields['Age'] = &$this->Age;

        // SEX
        $this->SEX = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_SEX', 'SEX', '`SEX`', '`SEX`', 200, 45, -1, false, '`SEX`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SEX->Sortable = true; // Allow sort
        $this->SEX->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SEX->Param, "CustomMsg");
        $this->Fields['SEX'] = &$this->SEX;

        // Religion
        $this->Religion = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Religion', 'Religion', '`Religion`', '`Religion`', 200, 45, -1, false, '`Religion`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Religion->Sortable = true; // Allow sort
        $this->Religion->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Religion->Param, "CustomMsg");
        $this->Fields['Religion'] = &$this->Religion;

        // Address
        $this->Address = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Address', 'Address', '`Address`', '`Address`', 200, 45, -1, false, '`Address`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Address->Sortable = true; // Allow sort
        $this->Address->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Address->Param, "CustomMsg");
        $this->Fields['Address'] = &$this->Address;

        // IdentificationMark
        $this->IdentificationMark = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_IdentificationMark', 'IdentificationMark', '`IdentificationMark`', '`IdentificationMark`', 200, 45, -1, false, '`IdentificationMark`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IdentificationMark->Sortable = true; // Allow sort
        $this->IdentificationMark->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IdentificationMark->Param, "CustomMsg");
        $this->Fields['IdentificationMark'] = &$this->IdentificationMark;

        // DoublewitnessName1
        $this->DoublewitnessName1 = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_DoublewitnessName1', 'DoublewitnessName1', '`DoublewitnessName1`', '`DoublewitnessName1`', 201, 444, -1, false, '`DoublewitnessName1`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->DoublewitnessName1->Sortable = true; // Allow sort
        $this->DoublewitnessName1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DoublewitnessName1->Param, "CustomMsg");
        $this->Fields['DoublewitnessName1'] = &$this->DoublewitnessName1;

        // DoublewitnessName2
        $this->DoublewitnessName2 = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_DoublewitnessName2', 'DoublewitnessName2', '`DoublewitnessName2`', '`DoublewitnessName2`', 201, 444, -1, false, '`DoublewitnessName2`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->DoublewitnessName2->Sortable = true; // Allow sort
        $this->DoublewitnessName2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DoublewitnessName2->Param, "CustomMsg");
        $this->Fields['DoublewitnessName2'] = &$this->DoublewitnessName2;

        // Chiefcomplaints
        $this->Chiefcomplaints = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Chiefcomplaints', 'Chiefcomplaints', '`Chiefcomplaints`', '`Chiefcomplaints`', 201, 800, -1, false, '`Chiefcomplaints`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Chiefcomplaints->Sortable = true; // Allow sort
        $this->Chiefcomplaints->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Chiefcomplaints->Param, "CustomMsg");
        $this->Fields['Chiefcomplaints'] = &$this->Chiefcomplaints;

        // MenstrualHistory
        $this->MenstrualHistory = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_MenstrualHistory', 'MenstrualHistory', '`MenstrualHistory`', '`MenstrualHistory`', 201, 65535, -1, false, '`MenstrualHistory`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->MenstrualHistory->Sortable = true; // Allow sort
        $this->MenstrualHistory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MenstrualHistory->Param, "CustomMsg");
        $this->Fields['MenstrualHistory'] = &$this->MenstrualHistory;

        // ObstetricHistory
        $this->ObstetricHistory = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_ObstetricHistory', 'ObstetricHistory', '`ObstetricHistory`', '`ObstetricHistory`', 201, 65535, -1, false, '`ObstetricHistory`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->ObstetricHistory->Sortable = true; // Allow sort
        $this->ObstetricHistory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ObstetricHistory->Param, "CustomMsg");
        $this->Fields['ObstetricHistory'] = &$this->ObstetricHistory;

        // MedicalHistory
        $this->MedicalHistory = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_MedicalHistory', 'MedicalHistory', '`MedicalHistory`', '`MedicalHistory`', 200, 45, -1, false, '`MedicalHistory`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MedicalHistory->Sortable = true; // Allow sort
        $this->MedicalHistory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MedicalHistory->Param, "CustomMsg");
        $this->Fields['MedicalHistory'] = &$this->MedicalHistory;

        // SurgicalHistory
        $this->SurgicalHistory = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_SurgicalHistory', 'SurgicalHistory', '`SurgicalHistory`', '`SurgicalHistory`', 200, 45, -1, false, '`SurgicalHistory`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SurgicalHistory->Sortable = true; // Allow sort
        $this->SurgicalHistory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SurgicalHistory->Param, "CustomMsg");
        $this->Fields['SurgicalHistory'] = &$this->SurgicalHistory;

        // Generalexaminationpallor
        $this->Generalexaminationpallor = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Generalexaminationpallor', 'Generalexaminationpallor', '`Generalexaminationpallor`', '`Generalexaminationpallor`', 200, 45, -1, false, '`Generalexaminationpallor`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Generalexaminationpallor->Sortable = true; // Allow sort
        $this->Generalexaminationpallor->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Generalexaminationpallor->Param, "CustomMsg");
        $this->Fields['Generalexaminationpallor'] = &$this->Generalexaminationpallor;

        // PR
        $this->PR = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PR', 'PR', '`PR`', '`PR`', 200, 45, -1, false, '`PR`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PR->Sortable = true; // Allow sort
        $this->PR->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PR->Param, "CustomMsg");
        $this->Fields['PR'] = &$this->PR;

        // CVS
        $this->CVS = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_CVS', 'CVS', '`CVS`', '`CVS`', 200, 45, -1, false, '`CVS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CVS->Sortable = true; // Allow sort
        $this->CVS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CVS->Param, "CustomMsg");
        $this->Fields['CVS'] = &$this->CVS;

        // PA
        $this->PA = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PA', 'PA', '`PA`', '`PA`', 200, 45, -1, false, '`PA`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PA->Sortable = true; // Allow sort
        $this->PA->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PA->Param, "CustomMsg");
        $this->Fields['PA'] = &$this->PA;

        // PROVISIONALDIAGNOSIS
        $this->PROVISIONALDIAGNOSIS = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PROVISIONALDIAGNOSIS', 'PROVISIONALDIAGNOSIS', '`PROVISIONALDIAGNOSIS`', '`PROVISIONALDIAGNOSIS`', 200, 45, -1, false, '`PROVISIONALDIAGNOSIS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PROVISIONALDIAGNOSIS->Sortable = true; // Allow sort
        $this->PROVISIONALDIAGNOSIS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PROVISIONALDIAGNOSIS->Param, "CustomMsg");
        $this->Fields['PROVISIONALDIAGNOSIS'] = &$this->PROVISIONALDIAGNOSIS;

        // Investigations
        $this->Investigations = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Investigations', 'Investigations', '`Investigations`', '`Investigations`', 200, 45, -1, false, '`Investigations`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Investigations->Sortable = true; // Allow sort
        $this->Investigations->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Investigations->Param, "CustomMsg");
        $this->Fields['Investigations'] = &$this->Investigations;

        // Fheight
        $this->Fheight = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Fheight', 'Fheight', '`Fheight`', '`Fheight`', 200, 45, -1, false, '`Fheight`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Fheight->Sortable = true; // Allow sort
        $this->Fheight->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Fheight->Param, "CustomMsg");
        $this->Fields['Fheight'] = &$this->Fheight;

        // Fweight
        $this->Fweight = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Fweight', 'Fweight', '`Fweight`', '`Fweight`', 200, 45, -1, false, '`Fweight`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Fweight->Sortable = true; // Allow sort
        $this->Fweight->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Fweight->Param, "CustomMsg");
        $this->Fields['Fweight'] = &$this->Fweight;

        // FBMI
        $this->FBMI = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_FBMI', 'FBMI', '`FBMI`', '`FBMI`', 200, 45, -1, false, '`FBMI`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FBMI->Sortable = true; // Allow sort
        $this->FBMI->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FBMI->Param, "CustomMsg");
        $this->Fields['FBMI'] = &$this->FBMI;

        // FBloodgroup
        $this->FBloodgroup = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_FBloodgroup', 'FBloodgroup', '`FBloodgroup`', '`FBloodgroup`', 200, 45, -1, false, '`FBloodgroup`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FBloodgroup->Sortable = true; // Allow sort
        $this->FBloodgroup->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FBloodgroup->Param, "CustomMsg");
        $this->Fields['FBloodgroup'] = &$this->FBloodgroup;

        // Mheight
        $this->Mheight = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Mheight', 'Mheight', '`Mheight`', '`Mheight`', 200, 45, -1, false, '`Mheight`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Mheight->Sortable = true; // Allow sort
        $this->Mheight->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Mheight->Param, "CustomMsg");
        $this->Fields['Mheight'] = &$this->Mheight;

        // Mweight
        $this->Mweight = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Mweight', 'Mweight', '`Mweight`', '`Mweight`', 200, 45, -1, false, '`Mweight`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Mweight->Sortable = true; // Allow sort
        $this->Mweight->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Mweight->Param, "CustomMsg");
        $this->Fields['Mweight'] = &$this->Mweight;

        // MBMI
        $this->MBMI = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_MBMI', 'MBMI', '`MBMI`', '`MBMI`', 200, 45, -1, false, '`MBMI`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MBMI->Sortable = true; // Allow sort
        $this->MBMI->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MBMI->Param, "CustomMsg");
        $this->Fields['MBMI'] = &$this->MBMI;

        // MBloodgroup
        $this->MBloodgroup = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_MBloodgroup', 'MBloodgroup', '`MBloodgroup`', '`MBloodgroup`', 200, 45, -1, false, '`MBloodgroup`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MBloodgroup->Sortable = true; // Allow sort
        $this->MBloodgroup->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MBloodgroup->Param, "CustomMsg");
        $this->Fields['MBloodgroup'] = &$this->MBloodgroup;

        // FBuild
        $this->FBuild = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_FBuild', 'FBuild', '`FBuild`', '`FBuild`', 200, 45, -1, false, '`FBuild`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FBuild->Sortable = true; // Allow sort
        $this->FBuild->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FBuild->Param, "CustomMsg");
        $this->Fields['FBuild'] = &$this->FBuild;

        // MBuild
        $this->MBuild = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_MBuild', 'MBuild', '`MBuild`', '`MBuild`', 200, 45, -1, false, '`MBuild`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MBuild->Sortable = true; // Allow sort
        $this->MBuild->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MBuild->Param, "CustomMsg");
        $this->Fields['MBuild'] = &$this->MBuild;

        // FSkinColor
        $this->FSkinColor = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_FSkinColor', 'FSkinColor', '`FSkinColor`', '`FSkinColor`', 200, 45, -1, false, '`FSkinColor`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FSkinColor->Sortable = true; // Allow sort
        $this->FSkinColor->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FSkinColor->Param, "CustomMsg");
        $this->Fields['FSkinColor'] = &$this->FSkinColor;

        // MSkinColor
        $this->MSkinColor = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_MSkinColor', 'MSkinColor', '`MSkinColor`', '`MSkinColor`', 200, 45, -1, false, '`MSkinColor`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MSkinColor->Sortable = true; // Allow sort
        $this->MSkinColor->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MSkinColor->Param, "CustomMsg");
        $this->Fields['MSkinColor'] = &$this->MSkinColor;

        // FEyesColor
        $this->FEyesColor = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_FEyesColor', 'FEyesColor', '`FEyesColor`', '`FEyesColor`', 200, 45, -1, false, '`FEyesColor`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FEyesColor->Sortable = true; // Allow sort
        $this->FEyesColor->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FEyesColor->Param, "CustomMsg");
        $this->Fields['FEyesColor'] = &$this->FEyesColor;

        // MEyesColor
        $this->MEyesColor = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_MEyesColor', 'MEyesColor', '`MEyesColor`', '`MEyesColor`', 200, 45, -1, false, '`MEyesColor`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MEyesColor->Sortable = true; // Allow sort
        $this->MEyesColor->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MEyesColor->Param, "CustomMsg");
        $this->Fields['MEyesColor'] = &$this->MEyesColor;

        // FHairColor
        $this->FHairColor = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_FHairColor', 'FHairColor', '`FHairColor`', '`FHairColor`', 200, 45, -1, false, '`FHairColor`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FHairColor->Sortable = true; // Allow sort
        $this->FHairColor->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FHairColor->Param, "CustomMsg");
        $this->Fields['FHairColor'] = &$this->FHairColor;

        // MhairColor
        $this->MhairColor = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_MhairColor', 'MhairColor', '`MhairColor`', '`MhairColor`', 200, 45, -1, false, '`MhairColor`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MhairColor->Sortable = true; // Allow sort
        $this->MhairColor->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MhairColor->Param, "CustomMsg");
        $this->Fields['MhairColor'] = &$this->MhairColor;

        // FhairTexture
        $this->FhairTexture = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_FhairTexture', 'FhairTexture', '`FhairTexture`', '`FhairTexture`', 200, 45, -1, false, '`FhairTexture`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FhairTexture->Sortable = true; // Allow sort
        $this->FhairTexture->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FhairTexture->Param, "CustomMsg");
        $this->Fields['FhairTexture'] = &$this->FhairTexture;

        // MHairTexture
        $this->MHairTexture = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_MHairTexture', 'MHairTexture', '`MHairTexture`', '`MHairTexture`', 200, 45, -1, false, '`MHairTexture`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MHairTexture->Sortable = true; // Allow sort
        $this->MHairTexture->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MHairTexture->Param, "CustomMsg");
        $this->Fields['MHairTexture'] = &$this->MHairTexture;

        // Fothers
        $this->Fothers = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Fothers', 'Fothers', '`Fothers`', '`Fothers`', 200, 45, -1, false, '`Fothers`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Fothers->Sortable = true; // Allow sort
        $this->Fothers->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Fothers->Param, "CustomMsg");
        $this->Fields['Fothers'] = &$this->Fothers;

        // Mothers
        $this->Mothers = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Mothers', 'Mothers', '`Mothers`', '`Mothers`', 200, 45, -1, false, '`Mothers`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Mothers->Sortable = true; // Allow sort
        $this->Mothers->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Mothers->Param, "CustomMsg");
        $this->Fields['Mothers'] = &$this->Mothers;

        // PGE
        $this->PGE = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PGE', 'PGE', '`PGE`', '`PGE`', 200, 45, -1, false, '`PGE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PGE->Sortable = true; // Allow sort
        $this->PGE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PGE->Param, "CustomMsg");
        $this->Fields['PGE'] = &$this->PGE;

        // PPR
        $this->PPR = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PPR', 'PPR', '`PPR`', '`PPR`', 200, 45, -1, false, '`PPR`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PPR->Sortable = true; // Allow sort
        $this->PPR->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PPR->Param, "CustomMsg");
        $this->Fields['PPR'] = &$this->PPR;

        // PBP
        $this->PBP = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PBP', 'PBP', '`PBP`', '`PBP`', 200, 45, -1, false, '`PBP`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PBP->Sortable = true; // Allow sort
        $this->PBP->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PBP->Param, "CustomMsg");
        $this->Fields['PBP'] = &$this->PBP;

        // Breast
        $this->Breast = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Breast', 'Breast', '`Breast`', '`Breast`', 200, 45, -1, false, '`Breast`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Breast->Sortable = true; // Allow sort
        $this->Breast->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Breast->Param, "CustomMsg");
        $this->Fields['Breast'] = &$this->Breast;

        // PPA
        $this->PPA = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PPA', 'PPA', '`PPA`', '`PPA`', 200, 45, -1, false, '`PPA`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PPA->Sortable = true; // Allow sort
        $this->PPA->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PPA->Param, "CustomMsg");
        $this->Fields['PPA'] = &$this->PPA;

        // PPSV
        $this->PPSV = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PPSV', 'PPSV', '`PPSV`', '`PPSV`', 200, 45, -1, false, '`PPSV`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PPSV->Sortable = true; // Allow sort
        $this->PPSV->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PPSV->Param, "CustomMsg");
        $this->Fields['PPSV'] = &$this->PPSV;

        // PPAPSMEAR
        $this->PPAPSMEAR = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PPAPSMEAR', 'PPAPSMEAR', '`PPAPSMEAR`', '`PPAPSMEAR`', 200, 45, -1, false, '`PPAPSMEAR`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PPAPSMEAR->Sortable = true; // Allow sort
        $this->PPAPSMEAR->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PPAPSMEAR->Param, "CustomMsg");
        $this->Fields['PPAPSMEAR'] = &$this->PPAPSMEAR;

        // PTHYROID
        $this->PTHYROID = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PTHYROID', 'PTHYROID', '`PTHYROID`', '`PTHYROID`', 200, 45, -1, false, '`PTHYROID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PTHYROID->Sortable = true; // Allow sort
        $this->PTHYROID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PTHYROID->Param, "CustomMsg");
        $this->Fields['PTHYROID'] = &$this->PTHYROID;

        // MTHYROID
        $this->MTHYROID = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_MTHYROID', 'MTHYROID', '`MTHYROID`', '`MTHYROID`', 200, 45, -1, false, '`MTHYROID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MTHYROID->Sortable = true; // Allow sort
        $this->MTHYROID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MTHYROID->Param, "CustomMsg");
        $this->Fields['MTHYROID'] = &$this->MTHYROID;

        // SecSexCharacters
        $this->SecSexCharacters = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_SecSexCharacters', 'SecSexCharacters', '`SecSexCharacters`', '`SecSexCharacters`', 200, 45, -1, false, '`SecSexCharacters`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SecSexCharacters->Sortable = true; // Allow sort
        $this->SecSexCharacters->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SecSexCharacters->Param, "CustomMsg");
        $this->Fields['SecSexCharacters'] = &$this->SecSexCharacters;

        // PenisUM
        $this->PenisUM = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PenisUM', 'PenisUM', '`PenisUM`', '`PenisUM`', 200, 45, -1, false, '`PenisUM`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PenisUM->Sortable = true; // Allow sort
        $this->PenisUM->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PenisUM->Param, "CustomMsg");
        $this->Fields['PenisUM'] = &$this->PenisUM;

        // VAS
        $this->VAS = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_VAS', 'VAS', '`VAS`', '`VAS`', 200, 45, -1, false, '`VAS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->VAS->Sortable = true; // Allow sort
        $this->VAS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->VAS->Param, "CustomMsg");
        $this->Fields['VAS'] = &$this->VAS;

        // EPIDIDYMIS
        $this->EPIDIDYMIS = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_EPIDIDYMIS', 'EPIDIDYMIS', '`EPIDIDYMIS`', '`EPIDIDYMIS`', 200, 45, -1, false, '`EPIDIDYMIS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EPIDIDYMIS->Sortable = true; // Allow sort
        $this->EPIDIDYMIS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EPIDIDYMIS->Param, "CustomMsg");
        $this->Fields['EPIDIDYMIS'] = &$this->EPIDIDYMIS;

        // Varicocele
        $this->Varicocele = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Varicocele', 'Varicocele', '`Varicocele`', '`Varicocele`', 200, 45, -1, false, '`Varicocele`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Varicocele->Sortable = true; // Allow sort
        $this->Varicocele->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Varicocele->Param, "CustomMsg");
        $this->Fields['Varicocele'] = &$this->Varicocele;

        // FertilityTreatmentHistory
        $this->FertilityTreatmentHistory = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_FertilityTreatmentHistory', 'FertilityTreatmentHistory', '`FertilityTreatmentHistory`', '`FertilityTreatmentHistory`', 201, 65535, -1, false, '`FertilityTreatmentHistory`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->FertilityTreatmentHistory->Sortable = true; // Allow sort
        $this->FertilityTreatmentHistory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FertilityTreatmentHistory->Param, "CustomMsg");
        $this->Fields['FertilityTreatmentHistory'] = &$this->FertilityTreatmentHistory;

        // SurgeryHistory
        $this->SurgeryHistory = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_SurgeryHistory', 'SurgeryHistory', '`SurgeryHistory`', '`SurgeryHistory`', 201, 65535, -1, false, '`SurgeryHistory`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->SurgeryHistory->Sortable = true; // Allow sort
        $this->SurgeryHistory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SurgeryHistory->Param, "CustomMsg");
        $this->Fields['SurgeryHistory'] = &$this->SurgeryHistory;

        // FamilyHistory
        $this->FamilyHistory = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_FamilyHistory', 'FamilyHistory', '`FamilyHistory`', '`FamilyHistory`', 200, 45, -1, false, '`FamilyHistory`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FamilyHistory->Sortable = true; // Allow sort
        $this->FamilyHistory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FamilyHistory->Param, "CustomMsg");
        $this->Fields['FamilyHistory'] = &$this->FamilyHistory;

        // PInvestigations
        $this->PInvestigations = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PInvestigations', 'PInvestigations', '`PInvestigations`', '`PInvestigations`', 201, 65535, -1, false, '`PInvestigations`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->PInvestigations->Sortable = true; // Allow sort
        $this->PInvestigations->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PInvestigations->Param, "CustomMsg");
        $this->Fields['PInvestigations'] = &$this->PInvestigations;

        // Addictions
        $this->Addictions = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Addictions', 'Addictions', '`Addictions`', '`Addictions`', 200, 45, -1, false, '`Addictions`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Addictions->Sortable = true; // Allow sort
        $this->Addictions->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Addictions->Param, "CustomMsg");
        $this->Fields['Addictions'] = &$this->Addictions;

        // Medications
        $this->Medications = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Medications', 'Medications', '`Medications`', '`Medications`', 201, 805, -1, false, '`Medications`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Medications->Sortable = true; // Allow sort
        $this->Medications->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Medications->Param, "CustomMsg");
        $this->Fields['Medications'] = &$this->Medications;

        // Medical
        $this->Medical = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Medical', 'Medical', '`Medical`', '`Medical`', 200, 45, -1, false, '`Medical`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Medical->Sortable = true; // Allow sort
        $this->Medical->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Medical->Param, "CustomMsg");
        $this->Fields['Medical'] = &$this->Medical;

        // Surgical
        $this->Surgical = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Surgical', 'Surgical', '`Surgical`', '`Surgical`', 200, 45, -1, false, '`Surgical`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Surgical->Sortable = true; // Allow sort
        $this->Surgical->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Surgical->Param, "CustomMsg");
        $this->Fields['Surgical'] = &$this->Surgical;

        // CoitalHistory
        $this->CoitalHistory = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_CoitalHistory', 'CoitalHistory', '`CoitalHistory`', '`CoitalHistory`', 200, 45, -1, false, '`CoitalHistory`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CoitalHistory->Sortable = true; // Allow sort
        $this->CoitalHistory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CoitalHistory->Param, "CustomMsg");
        $this->Fields['CoitalHistory'] = &$this->CoitalHistory;

        // SemenAnalysis
        $this->SemenAnalysis = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_SemenAnalysis', 'SemenAnalysis', '`SemenAnalysis`', '`SemenAnalysis`', 201, 65535, -1, false, '`SemenAnalysis`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->SemenAnalysis->Sortable = true; // Allow sort
        $this->SemenAnalysis->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SemenAnalysis->Param, "CustomMsg");
        $this->Fields['SemenAnalysis'] = &$this->SemenAnalysis;

        // MInsvestications
        $this->MInsvestications = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_MInsvestications', 'MInsvestications', '`MInsvestications`', '`MInsvestications`', 201, 65535, -1, false, '`MInsvestications`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->MInsvestications->Sortable = true; // Allow sort
        $this->MInsvestications->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MInsvestications->Param, "CustomMsg");
        $this->Fields['MInsvestications'] = &$this->MInsvestications;

        // PImpression
        $this->PImpression = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PImpression', 'PImpression', '`PImpression`', '`PImpression`', 201, 65535, -1, false, '`PImpression`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->PImpression->Sortable = true; // Allow sort
        $this->PImpression->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PImpression->Param, "CustomMsg");
        $this->Fields['PImpression'] = &$this->PImpression;

        // MIMpression
        $this->MIMpression = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_MIMpression', 'MIMpression', '`MIMpression`', '`MIMpression`', 201, 65535, -1, false, '`MIMpression`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->MIMpression->Sortable = true; // Allow sort
        $this->MIMpression->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MIMpression->Param, "CustomMsg");
        $this->Fields['MIMpression'] = &$this->MIMpression;

        // PPlanOfManagement
        $this->PPlanOfManagement = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PPlanOfManagement', 'PPlanOfManagement', '`PPlanOfManagement`', '`PPlanOfManagement`', 201, 65535, -1, false, '`PPlanOfManagement`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->PPlanOfManagement->Sortable = true; // Allow sort
        $this->PPlanOfManagement->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PPlanOfManagement->Param, "CustomMsg");
        $this->Fields['PPlanOfManagement'] = &$this->PPlanOfManagement;

        // MPlanOfManagement
        $this->MPlanOfManagement = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_MPlanOfManagement', 'MPlanOfManagement', '`MPlanOfManagement`', '`MPlanOfManagement`', 201, 65535, -1, false, '`MPlanOfManagement`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->MPlanOfManagement->Sortable = true; // Allow sort
        $this->MPlanOfManagement->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MPlanOfManagement->Param, "CustomMsg");
        $this->Fields['MPlanOfManagement'] = &$this->MPlanOfManagement;

        // PReadMore
        $this->PReadMore = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PReadMore', 'PReadMore', '`PReadMore`', '`PReadMore`', 201, 65535, -1, false, '`PReadMore`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->PReadMore->Sortable = true; // Allow sort
        $this->PReadMore->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PReadMore->Param, "CustomMsg");
        $this->Fields['PReadMore'] = &$this->PReadMore;

        // MReadMore
        $this->MReadMore = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_MReadMore', 'MReadMore', '`MReadMore`', '`MReadMore`', 201, 65535, -1, false, '`MReadMore`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->MReadMore->Sortable = true; // Allow sort
        $this->MReadMore->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MReadMore->Param, "CustomMsg");
        $this->Fields['MReadMore'] = &$this->MReadMore;

        // MariedFor
        $this->MariedFor = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_MariedFor', 'MariedFor', '`MariedFor`', '`MariedFor`', 200, 45, -1, false, '`MariedFor`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MariedFor->Sortable = true; // Allow sort
        $this->MariedFor->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MariedFor->Param, "CustomMsg");
        $this->Fields['MariedFor'] = &$this->MariedFor;

        // CMNCM
        $this->CMNCM = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_CMNCM', 'CMNCM', '`CMNCM`', '`CMNCM`', 200, 45, -1, false, '`CMNCM`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CMNCM->Sortable = true; // Allow sort
        $this->CMNCM->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CMNCM->Param, "CustomMsg");
        $this->Fields['CMNCM'] = &$this->CMNCM;

        // TidNo
        $this->TidNo = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_TidNo', 'TidNo', '`TidNo`', '`TidNo`', 3, 11, -1, false, '`TidNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TidNo->Sortable = true; // Allow sort
        $this->TidNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->TidNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TidNo->Param, "CustomMsg");
        $this->Fields['TidNo'] = &$this->TidNo;

        // pFamilyHistory
        $this->pFamilyHistory = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_pFamilyHistory', 'pFamilyHistory', '`pFamilyHistory`', '`pFamilyHistory`', 200, 45, -1, false, '`pFamilyHistory`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->pFamilyHistory->Sortable = true; // Allow sort
        $this->pFamilyHistory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->pFamilyHistory->Param, "CustomMsg");
        $this->Fields['pFamilyHistory'] = &$this->pFamilyHistory;

        // pTemplateMedications
        $this->pTemplateMedications = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_pTemplateMedications', 'pTemplateMedications', '`pTemplateMedications`', '`pTemplateMedications`', 201, 65535, -1, false, '`pTemplateMedications`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->pTemplateMedications->Sortable = true; // Allow sort
        $this->pTemplateMedications->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->pTemplateMedications->Param, "CustomMsg");
        $this->Fields['pTemplateMedications'] = &$this->pTemplateMedications;

        // AntiTPO
        $this->AntiTPO = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_AntiTPO', 'AntiTPO', '`AntiTPO`', '`AntiTPO`', 200, 45, -1, false, '`AntiTPO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AntiTPO->Sortable = true; // Allow sort
        $this->AntiTPO->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AntiTPO->Param, "CustomMsg");
        $this->Fields['AntiTPO'] = &$this->AntiTPO;

        // AntiTG
        $this->AntiTG = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_AntiTG', 'AntiTG', '`AntiTG`', '`AntiTG`', 200, 45, -1, false, '`AntiTG`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AntiTG->Sortable = true; // Allow sort
        $this->AntiTG->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AntiTG->Param, "CustomMsg");
        $this->Fields['AntiTG'] = &$this->AntiTG;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_template_couple_vitals`";
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
            // Get insert id if necessary
            $this->id->setDbValue($conn->lastInsertId());
            $rs['id'] = $this->id->DbValue;

            // Get insert id if necessary
            $this->hid->setDbValue($conn->lastInsertId());
            $rs['hid'] = $this->hid->DbValue;
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
            if (array_key_exists('hid', $rs)) {
                AddFilter($where, QuotedName('hid', $this->Dbid) . '=' . QuotedValue($rs['hid'], $this->hid->DataType, $this->Dbid));
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
        $this->Male->DbValue = $row['Male'];
        $this->Female->DbValue = $row['Female'];
        $this->status->DbValue = $row['status'];
        $this->createdby->DbValue = $row['createdby'];
        $this->createddatetime->DbValue = $row['createddatetime'];
        $this->modifiedby->DbValue = $row['modifiedby'];
        $this->modifieddatetime->DbValue = $row['modifieddatetime'];
        $this->malepropic->DbValue = $row['malepropic'];
        $this->femalepropic->DbValue = $row['femalepropic'];
        $this->HusbandEducation->DbValue = $row['HusbandEducation'];
        $this->WifeEducation->DbValue = $row['WifeEducation'];
        $this->HusbandWorkHours->DbValue = $row['HusbandWorkHours'];
        $this->WifeWorkHours->DbValue = $row['WifeWorkHours'];
        $this->PatientLanguage->DbValue = $row['PatientLanguage'];
        $this->ReferedBy->DbValue = $row['ReferedBy'];
        $this->ReferPhNo->DbValue = $row['ReferPhNo'];
        $this->WifeCell->DbValue = $row['WifeCell'];
        $this->HusbandCell->DbValue = $row['HusbandCell'];
        $this->WifeEmail->DbValue = $row['WifeEmail'];
        $this->HusbandEmail->DbValue = $row['HusbandEmail'];
        $this->ARTCYCLE->DbValue = $row['ARTCYCLE'];
        $this->RESULT->DbValue = $row['RESULT'];
        $this->CoupleID->DbValue = $row['CoupleID'];
        $this->HospID->DbValue = $row['HospID'];
        $this->PatientName->DbValue = $row['PatientName'];
        $this->PatientID->DbValue = $row['PatientID'];
        $this->PartnerName->DbValue = $row['PartnerName'];
        $this->PartnerID->DbValue = $row['PartnerID'];
        $this->DrID->DbValue = $row['DrID'];
        $this->DrDepartment->DbValue = $row['DrDepartment'];
        $this->Doctor->DbValue = $row['Doctor'];
        $this->hid->DbValue = $row['hid'];
        $this->RIDNO->DbValue = $row['RIDNO'];
        $this->Name->DbValue = $row['Name'];
        $this->Age->DbValue = $row['Age'];
        $this->SEX->DbValue = $row['SEX'];
        $this->Religion->DbValue = $row['Religion'];
        $this->Address->DbValue = $row['Address'];
        $this->IdentificationMark->DbValue = $row['IdentificationMark'];
        $this->DoublewitnessName1->DbValue = $row['DoublewitnessName1'];
        $this->DoublewitnessName2->DbValue = $row['DoublewitnessName2'];
        $this->Chiefcomplaints->DbValue = $row['Chiefcomplaints'];
        $this->MenstrualHistory->DbValue = $row['MenstrualHistory'];
        $this->ObstetricHistory->DbValue = $row['ObstetricHistory'];
        $this->MedicalHistory->DbValue = $row['MedicalHistory'];
        $this->SurgicalHistory->DbValue = $row['SurgicalHistory'];
        $this->Generalexaminationpallor->DbValue = $row['Generalexaminationpallor'];
        $this->PR->DbValue = $row['PR'];
        $this->CVS->DbValue = $row['CVS'];
        $this->PA->DbValue = $row['PA'];
        $this->PROVISIONALDIAGNOSIS->DbValue = $row['PROVISIONALDIAGNOSIS'];
        $this->Investigations->DbValue = $row['Investigations'];
        $this->Fheight->DbValue = $row['Fheight'];
        $this->Fweight->DbValue = $row['Fweight'];
        $this->FBMI->DbValue = $row['FBMI'];
        $this->FBloodgroup->DbValue = $row['FBloodgroup'];
        $this->Mheight->DbValue = $row['Mheight'];
        $this->Mweight->DbValue = $row['Mweight'];
        $this->MBMI->DbValue = $row['MBMI'];
        $this->MBloodgroup->DbValue = $row['MBloodgroup'];
        $this->FBuild->DbValue = $row['FBuild'];
        $this->MBuild->DbValue = $row['MBuild'];
        $this->FSkinColor->DbValue = $row['FSkinColor'];
        $this->MSkinColor->DbValue = $row['MSkinColor'];
        $this->FEyesColor->DbValue = $row['FEyesColor'];
        $this->MEyesColor->DbValue = $row['MEyesColor'];
        $this->FHairColor->DbValue = $row['FHairColor'];
        $this->MhairColor->DbValue = $row['MhairColor'];
        $this->FhairTexture->DbValue = $row['FhairTexture'];
        $this->MHairTexture->DbValue = $row['MHairTexture'];
        $this->Fothers->DbValue = $row['Fothers'];
        $this->Mothers->DbValue = $row['Mothers'];
        $this->PGE->DbValue = $row['PGE'];
        $this->PPR->DbValue = $row['PPR'];
        $this->PBP->DbValue = $row['PBP'];
        $this->Breast->DbValue = $row['Breast'];
        $this->PPA->DbValue = $row['PPA'];
        $this->PPSV->DbValue = $row['PPSV'];
        $this->PPAPSMEAR->DbValue = $row['PPAPSMEAR'];
        $this->PTHYROID->DbValue = $row['PTHYROID'];
        $this->MTHYROID->DbValue = $row['MTHYROID'];
        $this->SecSexCharacters->DbValue = $row['SecSexCharacters'];
        $this->PenisUM->DbValue = $row['PenisUM'];
        $this->VAS->DbValue = $row['VAS'];
        $this->EPIDIDYMIS->DbValue = $row['EPIDIDYMIS'];
        $this->Varicocele->DbValue = $row['Varicocele'];
        $this->FertilityTreatmentHistory->DbValue = $row['FertilityTreatmentHistory'];
        $this->SurgeryHistory->DbValue = $row['SurgeryHistory'];
        $this->FamilyHistory->DbValue = $row['FamilyHistory'];
        $this->PInvestigations->DbValue = $row['PInvestigations'];
        $this->Addictions->DbValue = $row['Addictions'];
        $this->Medications->DbValue = $row['Medications'];
        $this->Medical->DbValue = $row['Medical'];
        $this->Surgical->DbValue = $row['Surgical'];
        $this->CoitalHistory->DbValue = $row['CoitalHistory'];
        $this->SemenAnalysis->DbValue = $row['SemenAnalysis'];
        $this->MInsvestications->DbValue = $row['MInsvestications'];
        $this->PImpression->DbValue = $row['PImpression'];
        $this->MIMpression->DbValue = $row['MIMpression'];
        $this->PPlanOfManagement->DbValue = $row['PPlanOfManagement'];
        $this->MPlanOfManagement->DbValue = $row['MPlanOfManagement'];
        $this->PReadMore->DbValue = $row['PReadMore'];
        $this->MReadMore->DbValue = $row['MReadMore'];
        $this->MariedFor->DbValue = $row['MariedFor'];
        $this->CMNCM->DbValue = $row['CMNCM'];
        $this->TidNo->DbValue = $row['TidNo'];
        $this->pFamilyHistory->DbValue = $row['pFamilyHistory'];
        $this->pTemplateMedications->DbValue = $row['pTemplateMedications'];
        $this->AntiTPO->DbValue = $row['AntiTPO'];
        $this->AntiTG->DbValue = $row['AntiTG'];
    }

    // Delete uploaded files
    public function deleteUploadedFiles($row)
    {
        $this->loadDbValues($row);
    }

    // Record filter WHERE clause
    protected function sqlKeyFilter()
    {
        return "`id` = @id@ AND `hid` = @hid@";
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
        $val = $current ? $this->hid->CurrentValue : $this->hid->OldValue;
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
        if (count($keys) == 2) {
            if ($current) {
                $this->id->CurrentValue = $keys[0];
            } else {
                $this->id->OldValue = $keys[0];
            }
            if ($current) {
                $this->hid->CurrentValue = $keys[1];
            } else {
                $this->hid->OldValue = $keys[1];
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
        if (is_array($row)) {
            $val = array_key_exists('hid', $row) ? $row['hid'] : null;
        } else {
            $val = $this->hid->OldValue !== null ? $this->hid->OldValue : $this->hid->CurrentValue;
        }
        if (!is_numeric($val)) {
            return "0=1"; // Invalid key
        }
        if ($val === null) {
            return "0=1"; // Invalid key
        } else {
            $keyFilter = str_replace("@hid@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
        return $_SESSION[$name] ?? GetUrl("ViewTemplateCoupleVitalsList");
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
        if ($pageName == "ViewTemplateCoupleVitalsView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewTemplateCoupleVitalsEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewTemplateCoupleVitalsAdd") {
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
                return "ViewTemplateCoupleVitalsView";
            case Config("API_ADD_ACTION"):
                return "ViewTemplateCoupleVitalsAdd";
            case Config("API_EDIT_ACTION"):
                return "ViewTemplateCoupleVitalsEdit";
            case Config("API_DELETE_ACTION"):
                return "ViewTemplateCoupleVitalsDelete";
            case Config("API_LIST_ACTION"):
                return "ViewTemplateCoupleVitalsList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewTemplateCoupleVitalsList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewTemplateCoupleVitalsView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewTemplateCoupleVitalsView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewTemplateCoupleVitalsAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewTemplateCoupleVitalsAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewTemplateCoupleVitalsEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewTemplateCoupleVitalsAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewTemplateCoupleVitalsDelete", $this->getUrlParm());
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
        $json .= ",hid:" . JsonEncode($this->hid->CurrentValue, "number");
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
        if ($this->hid->CurrentValue !== null) {
            $url .= "/" . rawurlencode($this->hid->CurrentValue);
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
            for ($i = 0; $i < $cnt; $i++) {
                $arKeys[$i] = explode(Config("COMPOSITE_KEY_SEPARATOR"), $arKeys[$i]);
            }
        } else {
            if (($keyValue = Param("id") ?? Route("id")) !== null) {
                $arKey[] = $keyValue;
            } elseif (IsApi() && (($keyValue = Key(0) ?? Route(2)) !== null)) {
                $arKey[] = $keyValue;
            } else {
                $arKeys = null; // Do not setup
            }
            if (($keyValue = Param("hid") ?? Route("hid")) !== null) {
                $arKey[] = $keyValue;
            } elseif (IsApi() && (($keyValue = Key(1) ?? Route(3)) !== null)) {
                $arKey[] = $keyValue;
            } else {
                $arKeys = null; // Do not setup
            }
            if (is_array($arKeys)) {
                $arKeys[] = $arKey;
            }

            //return $arKeys; // Do not return yet, so the values will also be checked by the following code
        }
        // Check keys
        $ar = [];
        if (is_array($arKeys)) {
            foreach ($arKeys as $key) {
                if (!is_array($key) || count($key) != 2) {
                    continue; // Just skip so other keys will still work
                }
                if (!is_numeric($key[0])) { // id
                    continue;
                }
                if (!is_numeric($key[1])) { // hid
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
                $this->id->CurrentValue = $key[0];
            } else {
                $this->id->OldValue = $key[0];
            }
            if ($setCurrent) {
                $this->hid->CurrentValue = $key[1];
            } else {
                $this->hid->OldValue = $key[1];
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
        $this->Male->setDbValue($row['Male']);
        $this->Female->setDbValue($row['Female']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->malepropic->setDbValue($row['malepropic']);
        $this->femalepropic->setDbValue($row['femalepropic']);
        $this->HusbandEducation->setDbValue($row['HusbandEducation']);
        $this->WifeEducation->setDbValue($row['WifeEducation']);
        $this->HusbandWorkHours->setDbValue($row['HusbandWorkHours']);
        $this->WifeWorkHours->setDbValue($row['WifeWorkHours']);
        $this->PatientLanguage->setDbValue($row['PatientLanguage']);
        $this->ReferedBy->setDbValue($row['ReferedBy']);
        $this->ReferPhNo->setDbValue($row['ReferPhNo']);
        $this->WifeCell->setDbValue($row['WifeCell']);
        $this->HusbandCell->setDbValue($row['HusbandCell']);
        $this->WifeEmail->setDbValue($row['WifeEmail']);
        $this->HusbandEmail->setDbValue($row['HusbandEmail']);
        $this->ARTCYCLE->setDbValue($row['ARTCYCLE']);
        $this->RESULT->setDbValue($row['RESULT']);
        $this->CoupleID->setDbValue($row['CoupleID']);
        $this->HospID->setDbValue($row['HospID']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->PatientID->setDbValue($row['PatientID']);
        $this->PartnerName->setDbValue($row['PartnerName']);
        $this->PartnerID->setDbValue($row['PartnerID']);
        $this->DrID->setDbValue($row['DrID']);
        $this->DrDepartment->setDbValue($row['DrDepartment']);
        $this->Doctor->setDbValue($row['Doctor']);
        $this->hid->setDbValue($row['hid']);
        $this->RIDNO->setDbValue($row['RIDNO']);
        $this->Name->setDbValue($row['Name']);
        $this->Age->setDbValue($row['Age']);
        $this->SEX->setDbValue($row['SEX']);
        $this->Religion->setDbValue($row['Religion']);
        $this->Address->setDbValue($row['Address']);
        $this->IdentificationMark->setDbValue($row['IdentificationMark']);
        $this->DoublewitnessName1->setDbValue($row['DoublewitnessName1']);
        $this->DoublewitnessName2->setDbValue($row['DoublewitnessName2']);
        $this->Chiefcomplaints->setDbValue($row['Chiefcomplaints']);
        $this->MenstrualHistory->setDbValue($row['MenstrualHistory']);
        $this->ObstetricHistory->setDbValue($row['ObstetricHistory']);
        $this->MedicalHistory->setDbValue($row['MedicalHistory']);
        $this->SurgicalHistory->setDbValue($row['SurgicalHistory']);
        $this->Generalexaminationpallor->setDbValue($row['Generalexaminationpallor']);
        $this->PR->setDbValue($row['PR']);
        $this->CVS->setDbValue($row['CVS']);
        $this->PA->setDbValue($row['PA']);
        $this->PROVISIONALDIAGNOSIS->setDbValue($row['PROVISIONALDIAGNOSIS']);
        $this->Investigations->setDbValue($row['Investigations']);
        $this->Fheight->setDbValue($row['Fheight']);
        $this->Fweight->setDbValue($row['Fweight']);
        $this->FBMI->setDbValue($row['FBMI']);
        $this->FBloodgroup->setDbValue($row['FBloodgroup']);
        $this->Mheight->setDbValue($row['Mheight']);
        $this->Mweight->setDbValue($row['Mweight']);
        $this->MBMI->setDbValue($row['MBMI']);
        $this->MBloodgroup->setDbValue($row['MBloodgroup']);
        $this->FBuild->setDbValue($row['FBuild']);
        $this->MBuild->setDbValue($row['MBuild']);
        $this->FSkinColor->setDbValue($row['FSkinColor']);
        $this->MSkinColor->setDbValue($row['MSkinColor']);
        $this->FEyesColor->setDbValue($row['FEyesColor']);
        $this->MEyesColor->setDbValue($row['MEyesColor']);
        $this->FHairColor->setDbValue($row['FHairColor']);
        $this->MhairColor->setDbValue($row['MhairColor']);
        $this->FhairTexture->setDbValue($row['FhairTexture']);
        $this->MHairTexture->setDbValue($row['MHairTexture']);
        $this->Fothers->setDbValue($row['Fothers']);
        $this->Mothers->setDbValue($row['Mothers']);
        $this->PGE->setDbValue($row['PGE']);
        $this->PPR->setDbValue($row['PPR']);
        $this->PBP->setDbValue($row['PBP']);
        $this->Breast->setDbValue($row['Breast']);
        $this->PPA->setDbValue($row['PPA']);
        $this->PPSV->setDbValue($row['PPSV']);
        $this->PPAPSMEAR->setDbValue($row['PPAPSMEAR']);
        $this->PTHYROID->setDbValue($row['PTHYROID']);
        $this->MTHYROID->setDbValue($row['MTHYROID']);
        $this->SecSexCharacters->setDbValue($row['SecSexCharacters']);
        $this->PenisUM->setDbValue($row['PenisUM']);
        $this->VAS->setDbValue($row['VAS']);
        $this->EPIDIDYMIS->setDbValue($row['EPIDIDYMIS']);
        $this->Varicocele->setDbValue($row['Varicocele']);
        $this->FertilityTreatmentHistory->setDbValue($row['FertilityTreatmentHistory']);
        $this->SurgeryHistory->setDbValue($row['SurgeryHistory']);
        $this->FamilyHistory->setDbValue($row['FamilyHistory']);
        $this->PInvestigations->setDbValue($row['PInvestigations']);
        $this->Addictions->setDbValue($row['Addictions']);
        $this->Medications->setDbValue($row['Medications']);
        $this->Medical->setDbValue($row['Medical']);
        $this->Surgical->setDbValue($row['Surgical']);
        $this->CoitalHistory->setDbValue($row['CoitalHistory']);
        $this->SemenAnalysis->setDbValue($row['SemenAnalysis']);
        $this->MInsvestications->setDbValue($row['MInsvestications']);
        $this->PImpression->setDbValue($row['PImpression']);
        $this->MIMpression->setDbValue($row['MIMpression']);
        $this->PPlanOfManagement->setDbValue($row['PPlanOfManagement']);
        $this->MPlanOfManagement->setDbValue($row['MPlanOfManagement']);
        $this->PReadMore->setDbValue($row['PReadMore']);
        $this->MReadMore->setDbValue($row['MReadMore']);
        $this->MariedFor->setDbValue($row['MariedFor']);
        $this->CMNCM->setDbValue($row['CMNCM']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->pFamilyHistory->setDbValue($row['pFamilyHistory']);
        $this->pTemplateMedications->setDbValue($row['pTemplateMedications']);
        $this->AntiTPO->setDbValue($row['AntiTPO']);
        $this->AntiTG->setDbValue($row['AntiTG']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

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

        // CoupleID

        // HospID

        // PatientName

        // PatientID

        // PartnerName

        // PartnerID

        // DrID

        // DrDepartment

        // Doctor

        // hid

        // RIDNO

        // Name

        // Age

        // SEX

        // Religion

        // Address

        // IdentificationMark

        // DoublewitnessName1

        // DoublewitnessName2

        // Chiefcomplaints

        // MenstrualHistory

        // ObstetricHistory

        // MedicalHistory

        // SurgicalHistory

        // Generalexaminationpallor

        // PR

        // CVS

        // PA

        // PROVISIONALDIAGNOSIS

        // Investigations

        // Fheight

        // Fweight

        // FBMI

        // FBloodgroup

        // Mheight

        // Mweight

        // MBMI

        // MBloodgroup

        // FBuild

        // MBuild

        // FSkinColor

        // MSkinColor

        // FEyesColor

        // MEyesColor

        // FHairColor

        // MhairColor

        // FhairTexture

        // MHairTexture

        // Fothers

        // Mothers

        // PGE

        // PPR

        // PBP

        // Breast

        // PPA

        // PPSV

        // PPAPSMEAR

        // PTHYROID

        // MTHYROID

        // SecSexCharacters

        // PenisUM

        // VAS

        // EPIDIDYMIS

        // Varicocele

        // FertilityTreatmentHistory

        // SurgeryHistory

        // FamilyHistory

        // PInvestigations

        // Addictions

        // Medications

        // Medical

        // Surgical

        // CoitalHistory

        // SemenAnalysis

        // MInsvestications

        // PImpression

        // MIMpression

        // PPlanOfManagement

        // MPlanOfManagement

        // PReadMore

        // MReadMore

        // MariedFor

        // CMNCM

        // TidNo

        // pFamilyHistory

        // pTemplateMedications

        // AntiTPO

        // AntiTG

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // Male
        $this->Male->ViewValue = $this->Male->CurrentValue;
        $this->Male->ViewValue = FormatNumber($this->Male->ViewValue, 0, -2, -2, -2);
        $this->Male->ViewCustomAttributes = "";

        // Female
        $this->Female->ViewValue = $this->Female->CurrentValue;
        $this->Female->ViewValue = FormatNumber($this->Female->ViewValue, 0, -2, -2, -2);
        $this->Female->ViewCustomAttributes = "";

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

        // malepropic
        $this->malepropic->ViewValue = $this->malepropic->CurrentValue;
        $this->malepropic->ViewCustomAttributes = "";

        // femalepropic
        $this->femalepropic->ViewValue = $this->femalepropic->CurrentValue;
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
        $this->ReferedBy->ViewValue = $this->ReferedBy->CurrentValue;
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
        $this->ARTCYCLE->ViewValue = $this->ARTCYCLE->CurrentValue;
        $this->ARTCYCLE->ViewCustomAttributes = "";

        // RESULT
        $this->RESULT->ViewValue = $this->RESULT->CurrentValue;
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
        $this->DrID->ViewValue = $this->DrID->CurrentValue;
        $this->DrID->ViewValue = FormatNumber($this->DrID->ViewValue, 0, -2, -2, -2);
        $this->DrID->ViewCustomAttributes = "";

        // DrDepartment
        $this->DrDepartment->ViewValue = $this->DrDepartment->CurrentValue;
        $this->DrDepartment->ViewCustomAttributes = "";

        // Doctor
        $this->Doctor->ViewValue = $this->Doctor->CurrentValue;
        $this->Doctor->ViewCustomAttributes = "";

        // hid
        $this->hid->ViewValue = $this->hid->CurrentValue;
        $this->hid->ViewCustomAttributes = "";

        // RIDNO
        $this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
        $this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
        $this->RIDNO->ViewCustomAttributes = "";

        // Name
        $this->Name->ViewValue = $this->Name->CurrentValue;
        $this->Name->ViewCustomAttributes = "";

        // Age
        $this->Age->ViewValue = $this->Age->CurrentValue;
        $this->Age->ViewCustomAttributes = "";

        // SEX
        $this->SEX->ViewValue = $this->SEX->CurrentValue;
        $this->SEX->ViewCustomAttributes = "";

        // Religion
        $this->Religion->ViewValue = $this->Religion->CurrentValue;
        $this->Religion->ViewCustomAttributes = "";

        // Address
        $this->Address->ViewValue = $this->Address->CurrentValue;
        $this->Address->ViewCustomAttributes = "";

        // IdentificationMark
        $this->IdentificationMark->ViewValue = $this->IdentificationMark->CurrentValue;
        $this->IdentificationMark->ViewCustomAttributes = "";

        // DoublewitnessName1
        $this->DoublewitnessName1->ViewValue = $this->DoublewitnessName1->CurrentValue;
        $this->DoublewitnessName1->ViewCustomAttributes = "";

        // DoublewitnessName2
        $this->DoublewitnessName2->ViewValue = $this->DoublewitnessName2->CurrentValue;
        $this->DoublewitnessName2->ViewCustomAttributes = "";

        // Chiefcomplaints
        $this->Chiefcomplaints->ViewValue = $this->Chiefcomplaints->CurrentValue;
        $this->Chiefcomplaints->ViewCustomAttributes = "";

        // MenstrualHistory
        $this->MenstrualHistory->ViewValue = $this->MenstrualHistory->CurrentValue;
        $this->MenstrualHistory->ViewCustomAttributes = "";

        // ObstetricHistory
        $this->ObstetricHistory->ViewValue = $this->ObstetricHistory->CurrentValue;
        $this->ObstetricHistory->ViewCustomAttributes = "";

        // MedicalHistory
        $this->MedicalHistory->ViewValue = $this->MedicalHistory->CurrentValue;
        $this->MedicalHistory->ViewCustomAttributes = "";

        // SurgicalHistory
        $this->SurgicalHistory->ViewValue = $this->SurgicalHistory->CurrentValue;
        $this->SurgicalHistory->ViewCustomAttributes = "";

        // Generalexaminationpallor
        $this->Generalexaminationpallor->ViewValue = $this->Generalexaminationpallor->CurrentValue;
        $this->Generalexaminationpallor->ViewCustomAttributes = "";

        // PR
        $this->PR->ViewValue = $this->PR->CurrentValue;
        $this->PR->ViewCustomAttributes = "";

        // CVS
        $this->CVS->ViewValue = $this->CVS->CurrentValue;
        $this->CVS->ViewCustomAttributes = "";

        // PA
        $this->PA->ViewValue = $this->PA->CurrentValue;
        $this->PA->ViewCustomAttributes = "";

        // PROVISIONALDIAGNOSIS
        $this->PROVISIONALDIAGNOSIS->ViewValue = $this->PROVISIONALDIAGNOSIS->CurrentValue;
        $this->PROVISIONALDIAGNOSIS->ViewCustomAttributes = "";

        // Investigations
        $this->Investigations->ViewValue = $this->Investigations->CurrentValue;
        $this->Investigations->ViewCustomAttributes = "";

        // Fheight
        $this->Fheight->ViewValue = $this->Fheight->CurrentValue;
        $this->Fheight->ViewCustomAttributes = "";

        // Fweight
        $this->Fweight->ViewValue = $this->Fweight->CurrentValue;
        $this->Fweight->ViewCustomAttributes = "";

        // FBMI
        $this->FBMI->ViewValue = $this->FBMI->CurrentValue;
        $this->FBMI->ViewCustomAttributes = "";

        // FBloodgroup
        $this->FBloodgroup->ViewValue = $this->FBloodgroup->CurrentValue;
        $this->FBloodgroup->ViewCustomAttributes = "";

        // Mheight
        $this->Mheight->ViewValue = $this->Mheight->CurrentValue;
        $this->Mheight->ViewCustomAttributes = "";

        // Mweight
        $this->Mweight->ViewValue = $this->Mweight->CurrentValue;
        $this->Mweight->ViewCustomAttributes = "";

        // MBMI
        $this->MBMI->ViewValue = $this->MBMI->CurrentValue;
        $this->MBMI->ViewCustomAttributes = "";

        // MBloodgroup
        $this->MBloodgroup->ViewValue = $this->MBloodgroup->CurrentValue;
        $this->MBloodgroup->ViewCustomAttributes = "";

        // FBuild
        $this->FBuild->ViewValue = $this->FBuild->CurrentValue;
        $this->FBuild->ViewCustomAttributes = "";

        // MBuild
        $this->MBuild->ViewValue = $this->MBuild->CurrentValue;
        $this->MBuild->ViewCustomAttributes = "";

        // FSkinColor
        $this->FSkinColor->ViewValue = $this->FSkinColor->CurrentValue;
        $this->FSkinColor->ViewCustomAttributes = "";

        // MSkinColor
        $this->MSkinColor->ViewValue = $this->MSkinColor->CurrentValue;
        $this->MSkinColor->ViewCustomAttributes = "";

        // FEyesColor
        $this->FEyesColor->ViewValue = $this->FEyesColor->CurrentValue;
        $this->FEyesColor->ViewCustomAttributes = "";

        // MEyesColor
        $this->MEyesColor->ViewValue = $this->MEyesColor->CurrentValue;
        $this->MEyesColor->ViewCustomAttributes = "";

        // FHairColor
        $this->FHairColor->ViewValue = $this->FHairColor->CurrentValue;
        $this->FHairColor->ViewCustomAttributes = "";

        // MhairColor
        $this->MhairColor->ViewValue = $this->MhairColor->CurrentValue;
        $this->MhairColor->ViewCustomAttributes = "";

        // FhairTexture
        $this->FhairTexture->ViewValue = $this->FhairTexture->CurrentValue;
        $this->FhairTexture->ViewCustomAttributes = "";

        // MHairTexture
        $this->MHairTexture->ViewValue = $this->MHairTexture->CurrentValue;
        $this->MHairTexture->ViewCustomAttributes = "";

        // Fothers
        $this->Fothers->ViewValue = $this->Fothers->CurrentValue;
        $this->Fothers->ViewCustomAttributes = "";

        // Mothers
        $this->Mothers->ViewValue = $this->Mothers->CurrentValue;
        $this->Mothers->ViewCustomAttributes = "";

        // PGE
        $this->PGE->ViewValue = $this->PGE->CurrentValue;
        $this->PGE->ViewCustomAttributes = "";

        // PPR
        $this->PPR->ViewValue = $this->PPR->CurrentValue;
        $this->PPR->ViewCustomAttributes = "";

        // PBP
        $this->PBP->ViewValue = $this->PBP->CurrentValue;
        $this->PBP->ViewCustomAttributes = "";

        // Breast
        $this->Breast->ViewValue = $this->Breast->CurrentValue;
        $this->Breast->ViewCustomAttributes = "";

        // PPA
        $this->PPA->ViewValue = $this->PPA->CurrentValue;
        $this->PPA->ViewCustomAttributes = "";

        // PPSV
        $this->PPSV->ViewValue = $this->PPSV->CurrentValue;
        $this->PPSV->ViewCustomAttributes = "";

        // PPAPSMEAR
        $this->PPAPSMEAR->ViewValue = $this->PPAPSMEAR->CurrentValue;
        $this->PPAPSMEAR->ViewCustomAttributes = "";

        // PTHYROID
        $this->PTHYROID->ViewValue = $this->PTHYROID->CurrentValue;
        $this->PTHYROID->ViewCustomAttributes = "";

        // MTHYROID
        $this->MTHYROID->ViewValue = $this->MTHYROID->CurrentValue;
        $this->MTHYROID->ViewCustomAttributes = "";

        // SecSexCharacters
        $this->SecSexCharacters->ViewValue = $this->SecSexCharacters->CurrentValue;
        $this->SecSexCharacters->ViewCustomAttributes = "";

        // PenisUM
        $this->PenisUM->ViewValue = $this->PenisUM->CurrentValue;
        $this->PenisUM->ViewCustomAttributes = "";

        // VAS
        $this->VAS->ViewValue = $this->VAS->CurrentValue;
        $this->VAS->ViewCustomAttributes = "";

        // EPIDIDYMIS
        $this->EPIDIDYMIS->ViewValue = $this->EPIDIDYMIS->CurrentValue;
        $this->EPIDIDYMIS->ViewCustomAttributes = "";

        // Varicocele
        $this->Varicocele->ViewValue = $this->Varicocele->CurrentValue;
        $this->Varicocele->ViewCustomAttributes = "";

        // FertilityTreatmentHistory
        $this->FertilityTreatmentHistory->ViewValue = $this->FertilityTreatmentHistory->CurrentValue;
        $this->FertilityTreatmentHistory->ViewCustomAttributes = "";

        // SurgeryHistory
        $this->SurgeryHistory->ViewValue = $this->SurgeryHistory->CurrentValue;
        $this->SurgeryHistory->ViewCustomAttributes = "";

        // FamilyHistory
        $this->FamilyHistory->ViewValue = $this->FamilyHistory->CurrentValue;
        $this->FamilyHistory->ViewCustomAttributes = "";

        // PInvestigations
        $this->PInvestigations->ViewValue = $this->PInvestigations->CurrentValue;
        $this->PInvestigations->ViewCustomAttributes = "";

        // Addictions
        $this->Addictions->ViewValue = $this->Addictions->CurrentValue;
        $this->Addictions->ViewCustomAttributes = "";

        // Medications
        $this->Medications->ViewValue = $this->Medications->CurrentValue;
        $this->Medications->ViewCustomAttributes = "";

        // Medical
        $this->Medical->ViewValue = $this->Medical->CurrentValue;
        $this->Medical->ViewCustomAttributes = "";

        // Surgical
        $this->Surgical->ViewValue = $this->Surgical->CurrentValue;
        $this->Surgical->ViewCustomAttributes = "";

        // CoitalHistory
        $this->CoitalHistory->ViewValue = $this->CoitalHistory->CurrentValue;
        $this->CoitalHistory->ViewCustomAttributes = "";

        // SemenAnalysis
        $this->SemenAnalysis->ViewValue = $this->SemenAnalysis->CurrentValue;
        $this->SemenAnalysis->ViewCustomAttributes = "";

        // MInsvestications
        $this->MInsvestications->ViewValue = $this->MInsvestications->CurrentValue;
        $this->MInsvestications->ViewCustomAttributes = "";

        // PImpression
        $this->PImpression->ViewValue = $this->PImpression->CurrentValue;
        $this->PImpression->ViewCustomAttributes = "";

        // MIMpression
        $this->MIMpression->ViewValue = $this->MIMpression->CurrentValue;
        $this->MIMpression->ViewCustomAttributes = "";

        // PPlanOfManagement
        $this->PPlanOfManagement->ViewValue = $this->PPlanOfManagement->CurrentValue;
        $this->PPlanOfManagement->ViewCustomAttributes = "";

        // MPlanOfManagement
        $this->MPlanOfManagement->ViewValue = $this->MPlanOfManagement->CurrentValue;
        $this->MPlanOfManagement->ViewCustomAttributes = "";

        // PReadMore
        $this->PReadMore->ViewValue = $this->PReadMore->CurrentValue;
        $this->PReadMore->ViewCustomAttributes = "";

        // MReadMore
        $this->MReadMore->ViewValue = $this->MReadMore->CurrentValue;
        $this->MReadMore->ViewCustomAttributes = "";

        // MariedFor
        $this->MariedFor->ViewValue = $this->MariedFor->CurrentValue;
        $this->MariedFor->ViewCustomAttributes = "";

        // CMNCM
        $this->CMNCM->ViewValue = $this->CMNCM->CurrentValue;
        $this->CMNCM->ViewCustomAttributes = "";

        // TidNo
        $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
        $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
        $this->TidNo->ViewCustomAttributes = "";

        // pFamilyHistory
        $this->pFamilyHistory->ViewValue = $this->pFamilyHistory->CurrentValue;
        $this->pFamilyHistory->ViewCustomAttributes = "";

        // pTemplateMedications
        $this->pTemplateMedications->ViewValue = $this->pTemplateMedications->CurrentValue;
        $this->pTemplateMedications->ViewCustomAttributes = "";

        // AntiTPO
        $this->AntiTPO->ViewValue = $this->AntiTPO->CurrentValue;
        $this->AntiTPO->ViewCustomAttributes = "";

        // AntiTG
        $this->AntiTG->ViewValue = $this->AntiTG->CurrentValue;
        $this->AntiTG->ViewCustomAttributes = "";

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

        // malepropic
        $this->malepropic->LinkCustomAttributes = "";
        $this->malepropic->HrefValue = "";
        $this->malepropic->TooltipValue = "";

        // femalepropic
        $this->femalepropic->LinkCustomAttributes = "";
        $this->femalepropic->HrefValue = "";
        $this->femalepropic->TooltipValue = "";

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

        // hid
        $this->hid->LinkCustomAttributes = "";
        $this->hid->HrefValue = "";
        $this->hid->TooltipValue = "";

        // RIDNO
        $this->RIDNO->LinkCustomAttributes = "";
        $this->RIDNO->HrefValue = "";
        $this->RIDNO->TooltipValue = "";

        // Name
        $this->Name->LinkCustomAttributes = "";
        $this->Name->HrefValue = "";
        $this->Name->TooltipValue = "";

        // Age
        $this->Age->LinkCustomAttributes = "";
        $this->Age->HrefValue = "";
        $this->Age->TooltipValue = "";

        // SEX
        $this->SEX->LinkCustomAttributes = "";
        $this->SEX->HrefValue = "";
        $this->SEX->TooltipValue = "";

        // Religion
        $this->Religion->LinkCustomAttributes = "";
        $this->Religion->HrefValue = "";
        $this->Religion->TooltipValue = "";

        // Address
        $this->Address->LinkCustomAttributes = "";
        $this->Address->HrefValue = "";
        $this->Address->TooltipValue = "";

        // IdentificationMark
        $this->IdentificationMark->LinkCustomAttributes = "";
        $this->IdentificationMark->HrefValue = "";
        $this->IdentificationMark->TooltipValue = "";

        // DoublewitnessName1
        $this->DoublewitnessName1->LinkCustomAttributes = "";
        $this->DoublewitnessName1->HrefValue = "";
        $this->DoublewitnessName1->TooltipValue = "";

        // DoublewitnessName2
        $this->DoublewitnessName2->LinkCustomAttributes = "";
        $this->DoublewitnessName2->HrefValue = "";
        $this->DoublewitnessName2->TooltipValue = "";

        // Chiefcomplaints
        $this->Chiefcomplaints->LinkCustomAttributes = "";
        $this->Chiefcomplaints->HrefValue = "";
        $this->Chiefcomplaints->TooltipValue = "";

        // MenstrualHistory
        $this->MenstrualHistory->LinkCustomAttributes = "";
        $this->MenstrualHistory->HrefValue = "";
        $this->MenstrualHistory->TooltipValue = "";

        // ObstetricHistory
        $this->ObstetricHistory->LinkCustomAttributes = "";
        $this->ObstetricHistory->HrefValue = "";
        $this->ObstetricHistory->TooltipValue = "";

        // MedicalHistory
        $this->MedicalHistory->LinkCustomAttributes = "";
        $this->MedicalHistory->HrefValue = "";
        $this->MedicalHistory->TooltipValue = "";

        // SurgicalHistory
        $this->SurgicalHistory->LinkCustomAttributes = "";
        $this->SurgicalHistory->HrefValue = "";
        $this->SurgicalHistory->TooltipValue = "";

        // Generalexaminationpallor
        $this->Generalexaminationpallor->LinkCustomAttributes = "";
        $this->Generalexaminationpallor->HrefValue = "";
        $this->Generalexaminationpallor->TooltipValue = "";

        // PR
        $this->PR->LinkCustomAttributes = "";
        $this->PR->HrefValue = "";
        $this->PR->TooltipValue = "";

        // CVS
        $this->CVS->LinkCustomAttributes = "";
        $this->CVS->HrefValue = "";
        $this->CVS->TooltipValue = "";

        // PA
        $this->PA->LinkCustomAttributes = "";
        $this->PA->HrefValue = "";
        $this->PA->TooltipValue = "";

        // PROVISIONALDIAGNOSIS
        $this->PROVISIONALDIAGNOSIS->LinkCustomAttributes = "";
        $this->PROVISIONALDIAGNOSIS->HrefValue = "";
        $this->PROVISIONALDIAGNOSIS->TooltipValue = "";

        // Investigations
        $this->Investigations->LinkCustomAttributes = "";
        $this->Investigations->HrefValue = "";
        $this->Investigations->TooltipValue = "";

        // Fheight
        $this->Fheight->LinkCustomAttributes = "";
        $this->Fheight->HrefValue = "";
        $this->Fheight->TooltipValue = "";

        // Fweight
        $this->Fweight->LinkCustomAttributes = "";
        $this->Fweight->HrefValue = "";
        $this->Fweight->TooltipValue = "";

        // FBMI
        $this->FBMI->LinkCustomAttributes = "";
        $this->FBMI->HrefValue = "";
        $this->FBMI->TooltipValue = "";

        // FBloodgroup
        $this->FBloodgroup->LinkCustomAttributes = "";
        $this->FBloodgroup->HrefValue = "";
        $this->FBloodgroup->TooltipValue = "";

        // Mheight
        $this->Mheight->LinkCustomAttributes = "";
        $this->Mheight->HrefValue = "";
        $this->Mheight->TooltipValue = "";

        // Mweight
        $this->Mweight->LinkCustomAttributes = "";
        $this->Mweight->HrefValue = "";
        $this->Mweight->TooltipValue = "";

        // MBMI
        $this->MBMI->LinkCustomAttributes = "";
        $this->MBMI->HrefValue = "";
        $this->MBMI->TooltipValue = "";

        // MBloodgroup
        $this->MBloodgroup->LinkCustomAttributes = "";
        $this->MBloodgroup->HrefValue = "";
        $this->MBloodgroup->TooltipValue = "";

        // FBuild
        $this->FBuild->LinkCustomAttributes = "";
        $this->FBuild->HrefValue = "";
        $this->FBuild->TooltipValue = "";

        // MBuild
        $this->MBuild->LinkCustomAttributes = "";
        $this->MBuild->HrefValue = "";
        $this->MBuild->TooltipValue = "";

        // FSkinColor
        $this->FSkinColor->LinkCustomAttributes = "";
        $this->FSkinColor->HrefValue = "";
        $this->FSkinColor->TooltipValue = "";

        // MSkinColor
        $this->MSkinColor->LinkCustomAttributes = "";
        $this->MSkinColor->HrefValue = "";
        $this->MSkinColor->TooltipValue = "";

        // FEyesColor
        $this->FEyesColor->LinkCustomAttributes = "";
        $this->FEyesColor->HrefValue = "";
        $this->FEyesColor->TooltipValue = "";

        // MEyesColor
        $this->MEyesColor->LinkCustomAttributes = "";
        $this->MEyesColor->HrefValue = "";
        $this->MEyesColor->TooltipValue = "";

        // FHairColor
        $this->FHairColor->LinkCustomAttributes = "";
        $this->FHairColor->HrefValue = "";
        $this->FHairColor->TooltipValue = "";

        // MhairColor
        $this->MhairColor->LinkCustomAttributes = "";
        $this->MhairColor->HrefValue = "";
        $this->MhairColor->TooltipValue = "";

        // FhairTexture
        $this->FhairTexture->LinkCustomAttributes = "";
        $this->FhairTexture->HrefValue = "";
        $this->FhairTexture->TooltipValue = "";

        // MHairTexture
        $this->MHairTexture->LinkCustomAttributes = "";
        $this->MHairTexture->HrefValue = "";
        $this->MHairTexture->TooltipValue = "";

        // Fothers
        $this->Fothers->LinkCustomAttributes = "";
        $this->Fothers->HrefValue = "";
        $this->Fothers->TooltipValue = "";

        // Mothers
        $this->Mothers->LinkCustomAttributes = "";
        $this->Mothers->HrefValue = "";
        $this->Mothers->TooltipValue = "";

        // PGE
        $this->PGE->LinkCustomAttributes = "";
        $this->PGE->HrefValue = "";
        $this->PGE->TooltipValue = "";

        // PPR
        $this->PPR->LinkCustomAttributes = "";
        $this->PPR->HrefValue = "";
        $this->PPR->TooltipValue = "";

        // PBP
        $this->PBP->LinkCustomAttributes = "";
        $this->PBP->HrefValue = "";
        $this->PBP->TooltipValue = "";

        // Breast
        $this->Breast->LinkCustomAttributes = "";
        $this->Breast->HrefValue = "";
        $this->Breast->TooltipValue = "";

        // PPA
        $this->PPA->LinkCustomAttributes = "";
        $this->PPA->HrefValue = "";
        $this->PPA->TooltipValue = "";

        // PPSV
        $this->PPSV->LinkCustomAttributes = "";
        $this->PPSV->HrefValue = "";
        $this->PPSV->TooltipValue = "";

        // PPAPSMEAR
        $this->PPAPSMEAR->LinkCustomAttributes = "";
        $this->PPAPSMEAR->HrefValue = "";
        $this->PPAPSMEAR->TooltipValue = "";

        // PTHYROID
        $this->PTHYROID->LinkCustomAttributes = "";
        $this->PTHYROID->HrefValue = "";
        $this->PTHYROID->TooltipValue = "";

        // MTHYROID
        $this->MTHYROID->LinkCustomAttributes = "";
        $this->MTHYROID->HrefValue = "";
        $this->MTHYROID->TooltipValue = "";

        // SecSexCharacters
        $this->SecSexCharacters->LinkCustomAttributes = "";
        $this->SecSexCharacters->HrefValue = "";
        $this->SecSexCharacters->TooltipValue = "";

        // PenisUM
        $this->PenisUM->LinkCustomAttributes = "";
        $this->PenisUM->HrefValue = "";
        $this->PenisUM->TooltipValue = "";

        // VAS
        $this->VAS->LinkCustomAttributes = "";
        $this->VAS->HrefValue = "";
        $this->VAS->TooltipValue = "";

        // EPIDIDYMIS
        $this->EPIDIDYMIS->LinkCustomAttributes = "";
        $this->EPIDIDYMIS->HrefValue = "";
        $this->EPIDIDYMIS->TooltipValue = "";

        // Varicocele
        $this->Varicocele->LinkCustomAttributes = "";
        $this->Varicocele->HrefValue = "";
        $this->Varicocele->TooltipValue = "";

        // FertilityTreatmentHistory
        $this->FertilityTreatmentHistory->LinkCustomAttributes = "";
        $this->FertilityTreatmentHistory->HrefValue = "";
        $this->FertilityTreatmentHistory->TooltipValue = "";

        // SurgeryHistory
        $this->SurgeryHistory->LinkCustomAttributes = "";
        $this->SurgeryHistory->HrefValue = "";
        $this->SurgeryHistory->TooltipValue = "";

        // FamilyHistory
        $this->FamilyHistory->LinkCustomAttributes = "";
        $this->FamilyHistory->HrefValue = "";
        $this->FamilyHistory->TooltipValue = "";

        // PInvestigations
        $this->PInvestigations->LinkCustomAttributes = "";
        $this->PInvestigations->HrefValue = "";
        $this->PInvestigations->TooltipValue = "";

        // Addictions
        $this->Addictions->LinkCustomAttributes = "";
        $this->Addictions->HrefValue = "";
        $this->Addictions->TooltipValue = "";

        // Medications
        $this->Medications->LinkCustomAttributes = "";
        $this->Medications->HrefValue = "";
        $this->Medications->TooltipValue = "";

        // Medical
        $this->Medical->LinkCustomAttributes = "";
        $this->Medical->HrefValue = "";
        $this->Medical->TooltipValue = "";

        // Surgical
        $this->Surgical->LinkCustomAttributes = "";
        $this->Surgical->HrefValue = "";
        $this->Surgical->TooltipValue = "";

        // CoitalHistory
        $this->CoitalHistory->LinkCustomAttributes = "";
        $this->CoitalHistory->HrefValue = "";
        $this->CoitalHistory->TooltipValue = "";

        // SemenAnalysis
        $this->SemenAnalysis->LinkCustomAttributes = "";
        $this->SemenAnalysis->HrefValue = "";
        $this->SemenAnalysis->TooltipValue = "";

        // MInsvestications
        $this->MInsvestications->LinkCustomAttributes = "";
        $this->MInsvestications->HrefValue = "";
        $this->MInsvestications->TooltipValue = "";

        // PImpression
        $this->PImpression->LinkCustomAttributes = "";
        $this->PImpression->HrefValue = "";
        $this->PImpression->TooltipValue = "";

        // MIMpression
        $this->MIMpression->LinkCustomAttributes = "";
        $this->MIMpression->HrefValue = "";
        $this->MIMpression->TooltipValue = "";

        // PPlanOfManagement
        $this->PPlanOfManagement->LinkCustomAttributes = "";
        $this->PPlanOfManagement->HrefValue = "";
        $this->PPlanOfManagement->TooltipValue = "";

        // MPlanOfManagement
        $this->MPlanOfManagement->LinkCustomAttributes = "";
        $this->MPlanOfManagement->HrefValue = "";
        $this->MPlanOfManagement->TooltipValue = "";

        // PReadMore
        $this->PReadMore->LinkCustomAttributes = "";
        $this->PReadMore->HrefValue = "";
        $this->PReadMore->TooltipValue = "";

        // MReadMore
        $this->MReadMore->LinkCustomAttributes = "";
        $this->MReadMore->HrefValue = "";
        $this->MReadMore->TooltipValue = "";

        // MariedFor
        $this->MariedFor->LinkCustomAttributes = "";
        $this->MariedFor->HrefValue = "";
        $this->MariedFor->TooltipValue = "";

        // CMNCM
        $this->CMNCM->LinkCustomAttributes = "";
        $this->CMNCM->HrefValue = "";
        $this->CMNCM->TooltipValue = "";

        // TidNo
        $this->TidNo->LinkCustomAttributes = "";
        $this->TidNo->HrefValue = "";
        $this->TidNo->TooltipValue = "";

        // pFamilyHistory
        $this->pFamilyHistory->LinkCustomAttributes = "";
        $this->pFamilyHistory->HrefValue = "";
        $this->pFamilyHistory->TooltipValue = "";

        // pTemplateMedications
        $this->pTemplateMedications->LinkCustomAttributes = "";
        $this->pTemplateMedications->HrefValue = "";
        $this->pTemplateMedications->TooltipValue = "";

        // AntiTPO
        $this->AntiTPO->LinkCustomAttributes = "";
        $this->AntiTPO->HrefValue = "";
        $this->AntiTPO->TooltipValue = "";

        // AntiTG
        $this->AntiTG->LinkCustomAttributes = "";
        $this->AntiTG->HrefValue = "";
        $this->AntiTG->TooltipValue = "";

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

        // Male
        $this->Male->EditAttrs["class"] = "form-control";
        $this->Male->EditCustomAttributes = "";
        $this->Male->EditValue = $this->Male->CurrentValue;
        $this->Male->PlaceHolder = RemoveHtml($this->Male->caption());

        // Female
        $this->Female->EditAttrs["class"] = "form-control";
        $this->Female->EditCustomAttributes = "";
        $this->Female->EditValue = $this->Female->CurrentValue;
        $this->Female->PlaceHolder = RemoveHtml($this->Female->caption());

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

        // malepropic
        $this->malepropic->EditAttrs["class"] = "form-control";
        $this->malepropic->EditCustomAttributes = "";
        $this->malepropic->EditValue = $this->malepropic->CurrentValue;
        $this->malepropic->PlaceHolder = RemoveHtml($this->malepropic->caption());

        // femalepropic
        $this->femalepropic->EditAttrs["class"] = "form-control";
        $this->femalepropic->EditCustomAttributes = "";
        $this->femalepropic->EditValue = $this->femalepropic->CurrentValue;
        $this->femalepropic->PlaceHolder = RemoveHtml($this->femalepropic->caption());

        // HusbandEducation
        $this->HusbandEducation->EditAttrs["class"] = "form-control";
        $this->HusbandEducation->EditCustomAttributes = "";
        if (!$this->HusbandEducation->Raw) {
            $this->HusbandEducation->CurrentValue = HtmlDecode($this->HusbandEducation->CurrentValue);
        }
        $this->HusbandEducation->EditValue = $this->HusbandEducation->CurrentValue;
        $this->HusbandEducation->PlaceHolder = RemoveHtml($this->HusbandEducation->caption());

        // WifeEducation
        $this->WifeEducation->EditAttrs["class"] = "form-control";
        $this->WifeEducation->EditCustomAttributes = "";
        if (!$this->WifeEducation->Raw) {
            $this->WifeEducation->CurrentValue = HtmlDecode($this->WifeEducation->CurrentValue);
        }
        $this->WifeEducation->EditValue = $this->WifeEducation->CurrentValue;
        $this->WifeEducation->PlaceHolder = RemoveHtml($this->WifeEducation->caption());

        // HusbandWorkHours
        $this->HusbandWorkHours->EditAttrs["class"] = "form-control";
        $this->HusbandWorkHours->EditCustomAttributes = "";
        if (!$this->HusbandWorkHours->Raw) {
            $this->HusbandWorkHours->CurrentValue = HtmlDecode($this->HusbandWorkHours->CurrentValue);
        }
        $this->HusbandWorkHours->EditValue = $this->HusbandWorkHours->CurrentValue;
        $this->HusbandWorkHours->PlaceHolder = RemoveHtml($this->HusbandWorkHours->caption());

        // WifeWorkHours
        $this->WifeWorkHours->EditAttrs["class"] = "form-control";
        $this->WifeWorkHours->EditCustomAttributes = "";
        if (!$this->WifeWorkHours->Raw) {
            $this->WifeWorkHours->CurrentValue = HtmlDecode($this->WifeWorkHours->CurrentValue);
        }
        $this->WifeWorkHours->EditValue = $this->WifeWorkHours->CurrentValue;
        $this->WifeWorkHours->PlaceHolder = RemoveHtml($this->WifeWorkHours->caption());

        // PatientLanguage
        $this->PatientLanguage->EditAttrs["class"] = "form-control";
        $this->PatientLanguage->EditCustomAttributes = "";
        if (!$this->PatientLanguage->Raw) {
            $this->PatientLanguage->CurrentValue = HtmlDecode($this->PatientLanguage->CurrentValue);
        }
        $this->PatientLanguage->EditValue = $this->PatientLanguage->CurrentValue;
        $this->PatientLanguage->PlaceHolder = RemoveHtml($this->PatientLanguage->caption());

        // ReferedBy
        $this->ReferedBy->EditAttrs["class"] = "form-control";
        $this->ReferedBy->EditCustomAttributes = "";
        if (!$this->ReferedBy->Raw) {
            $this->ReferedBy->CurrentValue = HtmlDecode($this->ReferedBy->CurrentValue);
        }
        $this->ReferedBy->EditValue = $this->ReferedBy->CurrentValue;
        $this->ReferedBy->PlaceHolder = RemoveHtml($this->ReferedBy->caption());

        // ReferPhNo
        $this->ReferPhNo->EditAttrs["class"] = "form-control";
        $this->ReferPhNo->EditCustomAttributes = "";
        if (!$this->ReferPhNo->Raw) {
            $this->ReferPhNo->CurrentValue = HtmlDecode($this->ReferPhNo->CurrentValue);
        }
        $this->ReferPhNo->EditValue = $this->ReferPhNo->CurrentValue;
        $this->ReferPhNo->PlaceHolder = RemoveHtml($this->ReferPhNo->caption());

        // WifeCell
        $this->WifeCell->EditAttrs["class"] = "form-control";
        $this->WifeCell->EditCustomAttributes = "";
        if (!$this->WifeCell->Raw) {
            $this->WifeCell->CurrentValue = HtmlDecode($this->WifeCell->CurrentValue);
        }
        $this->WifeCell->EditValue = $this->WifeCell->CurrentValue;
        $this->WifeCell->PlaceHolder = RemoveHtml($this->WifeCell->caption());

        // HusbandCell
        $this->HusbandCell->EditAttrs["class"] = "form-control";
        $this->HusbandCell->EditCustomAttributes = "";
        if (!$this->HusbandCell->Raw) {
            $this->HusbandCell->CurrentValue = HtmlDecode($this->HusbandCell->CurrentValue);
        }
        $this->HusbandCell->EditValue = $this->HusbandCell->CurrentValue;
        $this->HusbandCell->PlaceHolder = RemoveHtml($this->HusbandCell->caption());

        // WifeEmail
        $this->WifeEmail->EditAttrs["class"] = "form-control";
        $this->WifeEmail->EditCustomAttributes = "";
        if (!$this->WifeEmail->Raw) {
            $this->WifeEmail->CurrentValue = HtmlDecode($this->WifeEmail->CurrentValue);
        }
        $this->WifeEmail->EditValue = $this->WifeEmail->CurrentValue;
        $this->WifeEmail->PlaceHolder = RemoveHtml($this->WifeEmail->caption());

        // HusbandEmail
        $this->HusbandEmail->EditAttrs["class"] = "form-control";
        $this->HusbandEmail->EditCustomAttributes = "";
        if (!$this->HusbandEmail->Raw) {
            $this->HusbandEmail->CurrentValue = HtmlDecode($this->HusbandEmail->CurrentValue);
        }
        $this->HusbandEmail->EditValue = $this->HusbandEmail->CurrentValue;
        $this->HusbandEmail->PlaceHolder = RemoveHtml($this->HusbandEmail->caption());

        // ARTCYCLE
        $this->ARTCYCLE->EditAttrs["class"] = "form-control";
        $this->ARTCYCLE->EditCustomAttributes = "";
        if (!$this->ARTCYCLE->Raw) {
            $this->ARTCYCLE->CurrentValue = HtmlDecode($this->ARTCYCLE->CurrentValue);
        }
        $this->ARTCYCLE->EditValue = $this->ARTCYCLE->CurrentValue;
        $this->ARTCYCLE->PlaceHolder = RemoveHtml($this->ARTCYCLE->caption());

        // RESULT
        $this->RESULT->EditAttrs["class"] = "form-control";
        $this->RESULT->EditCustomAttributes = "";
        if (!$this->RESULT->Raw) {
            $this->RESULT->CurrentValue = HtmlDecode($this->RESULT->CurrentValue);
        }
        $this->RESULT->EditValue = $this->RESULT->CurrentValue;
        $this->RESULT->PlaceHolder = RemoveHtml($this->RESULT->caption());

        // CoupleID
        $this->CoupleID->EditAttrs["class"] = "form-control";
        $this->CoupleID->EditCustomAttributes = "";
        if (!$this->CoupleID->Raw) {
            $this->CoupleID->CurrentValue = HtmlDecode($this->CoupleID->CurrentValue);
        }
        $this->CoupleID->EditValue = $this->CoupleID->CurrentValue;
        $this->CoupleID->PlaceHolder = RemoveHtml($this->CoupleID->caption());

        // HospID
        $this->HospID->EditAttrs["class"] = "form-control";
        $this->HospID->EditCustomAttributes = "";
        $this->HospID->EditValue = $this->HospID->CurrentValue;
        $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

        // PatientName
        $this->PatientName->EditAttrs["class"] = "form-control";
        $this->PatientName->EditCustomAttributes = "";
        if (!$this->PatientName->Raw) {
            $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
        }
        $this->PatientName->EditValue = $this->PatientName->CurrentValue;
        $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

        // PatientID
        $this->PatientID->EditAttrs["class"] = "form-control";
        $this->PatientID->EditCustomAttributes = "";
        if (!$this->PatientID->Raw) {
            $this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
        }
        $this->PatientID->EditValue = $this->PatientID->CurrentValue;
        $this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

        // PartnerName
        $this->PartnerName->EditAttrs["class"] = "form-control";
        $this->PartnerName->EditCustomAttributes = "";
        if (!$this->PartnerName->Raw) {
            $this->PartnerName->CurrentValue = HtmlDecode($this->PartnerName->CurrentValue);
        }
        $this->PartnerName->EditValue = $this->PartnerName->CurrentValue;
        $this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

        // PartnerID
        $this->PartnerID->EditAttrs["class"] = "form-control";
        $this->PartnerID->EditCustomAttributes = "";
        if (!$this->PartnerID->Raw) {
            $this->PartnerID->CurrentValue = HtmlDecode($this->PartnerID->CurrentValue);
        }
        $this->PartnerID->EditValue = $this->PartnerID->CurrentValue;
        $this->PartnerID->PlaceHolder = RemoveHtml($this->PartnerID->caption());

        // DrID
        $this->DrID->EditAttrs["class"] = "form-control";
        $this->DrID->EditCustomAttributes = "";
        $this->DrID->EditValue = $this->DrID->CurrentValue;
        $this->DrID->PlaceHolder = RemoveHtml($this->DrID->caption());

        // DrDepartment
        $this->DrDepartment->EditAttrs["class"] = "form-control";
        $this->DrDepartment->EditCustomAttributes = "";
        if (!$this->DrDepartment->Raw) {
            $this->DrDepartment->CurrentValue = HtmlDecode($this->DrDepartment->CurrentValue);
        }
        $this->DrDepartment->EditValue = $this->DrDepartment->CurrentValue;
        $this->DrDepartment->PlaceHolder = RemoveHtml($this->DrDepartment->caption());

        // Doctor
        $this->Doctor->EditAttrs["class"] = "form-control";
        $this->Doctor->EditCustomAttributes = "";
        if (!$this->Doctor->Raw) {
            $this->Doctor->CurrentValue = HtmlDecode($this->Doctor->CurrentValue);
        }
        $this->Doctor->EditValue = $this->Doctor->CurrentValue;
        $this->Doctor->PlaceHolder = RemoveHtml($this->Doctor->caption());

        // hid
        $this->hid->EditAttrs["class"] = "form-control";
        $this->hid->EditCustomAttributes = "";
        $this->hid->EditValue = $this->hid->CurrentValue;
        $this->hid->ViewCustomAttributes = "";

        // RIDNO
        $this->RIDNO->EditAttrs["class"] = "form-control";
        $this->RIDNO->EditCustomAttributes = "";
        $this->RIDNO->EditValue = $this->RIDNO->CurrentValue;
        $this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());

        // Name
        $this->Name->EditAttrs["class"] = "form-control";
        $this->Name->EditCustomAttributes = "";
        if (!$this->Name->Raw) {
            $this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
        }
        $this->Name->EditValue = $this->Name->CurrentValue;
        $this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

        // Age
        $this->Age->EditAttrs["class"] = "form-control";
        $this->Age->EditCustomAttributes = "";
        if (!$this->Age->Raw) {
            $this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
        }
        $this->Age->EditValue = $this->Age->CurrentValue;
        $this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

        // SEX
        $this->SEX->EditAttrs["class"] = "form-control";
        $this->SEX->EditCustomAttributes = "";
        if (!$this->SEX->Raw) {
            $this->SEX->CurrentValue = HtmlDecode($this->SEX->CurrentValue);
        }
        $this->SEX->EditValue = $this->SEX->CurrentValue;
        $this->SEX->PlaceHolder = RemoveHtml($this->SEX->caption());

        // Religion
        $this->Religion->EditAttrs["class"] = "form-control";
        $this->Religion->EditCustomAttributes = "";
        if (!$this->Religion->Raw) {
            $this->Religion->CurrentValue = HtmlDecode($this->Religion->CurrentValue);
        }
        $this->Religion->EditValue = $this->Religion->CurrentValue;
        $this->Religion->PlaceHolder = RemoveHtml($this->Religion->caption());

        // Address
        $this->Address->EditAttrs["class"] = "form-control";
        $this->Address->EditCustomAttributes = "";
        if (!$this->Address->Raw) {
            $this->Address->CurrentValue = HtmlDecode($this->Address->CurrentValue);
        }
        $this->Address->EditValue = $this->Address->CurrentValue;
        $this->Address->PlaceHolder = RemoveHtml($this->Address->caption());

        // IdentificationMark
        $this->IdentificationMark->EditAttrs["class"] = "form-control";
        $this->IdentificationMark->EditCustomAttributes = "";
        if (!$this->IdentificationMark->Raw) {
            $this->IdentificationMark->CurrentValue = HtmlDecode($this->IdentificationMark->CurrentValue);
        }
        $this->IdentificationMark->EditValue = $this->IdentificationMark->CurrentValue;
        $this->IdentificationMark->PlaceHolder = RemoveHtml($this->IdentificationMark->caption());

        // DoublewitnessName1
        $this->DoublewitnessName1->EditAttrs["class"] = "form-control";
        $this->DoublewitnessName1->EditCustomAttributes = "";
        $this->DoublewitnessName1->EditValue = $this->DoublewitnessName1->CurrentValue;
        $this->DoublewitnessName1->PlaceHolder = RemoveHtml($this->DoublewitnessName1->caption());

        // DoublewitnessName2
        $this->DoublewitnessName2->EditAttrs["class"] = "form-control";
        $this->DoublewitnessName2->EditCustomAttributes = "";
        $this->DoublewitnessName2->EditValue = $this->DoublewitnessName2->CurrentValue;
        $this->DoublewitnessName2->PlaceHolder = RemoveHtml($this->DoublewitnessName2->caption());

        // Chiefcomplaints
        $this->Chiefcomplaints->EditAttrs["class"] = "form-control";
        $this->Chiefcomplaints->EditCustomAttributes = "";
        $this->Chiefcomplaints->EditValue = $this->Chiefcomplaints->CurrentValue;
        $this->Chiefcomplaints->PlaceHolder = RemoveHtml($this->Chiefcomplaints->caption());

        // MenstrualHistory
        $this->MenstrualHistory->EditAttrs["class"] = "form-control";
        $this->MenstrualHistory->EditCustomAttributes = "";
        $this->MenstrualHistory->EditValue = $this->MenstrualHistory->CurrentValue;
        $this->MenstrualHistory->PlaceHolder = RemoveHtml($this->MenstrualHistory->caption());

        // ObstetricHistory
        $this->ObstetricHistory->EditAttrs["class"] = "form-control";
        $this->ObstetricHistory->EditCustomAttributes = "";
        $this->ObstetricHistory->EditValue = $this->ObstetricHistory->CurrentValue;
        $this->ObstetricHistory->PlaceHolder = RemoveHtml($this->ObstetricHistory->caption());

        // MedicalHistory
        $this->MedicalHistory->EditAttrs["class"] = "form-control";
        $this->MedicalHistory->EditCustomAttributes = "";
        if (!$this->MedicalHistory->Raw) {
            $this->MedicalHistory->CurrentValue = HtmlDecode($this->MedicalHistory->CurrentValue);
        }
        $this->MedicalHistory->EditValue = $this->MedicalHistory->CurrentValue;
        $this->MedicalHistory->PlaceHolder = RemoveHtml($this->MedicalHistory->caption());

        // SurgicalHistory
        $this->SurgicalHistory->EditAttrs["class"] = "form-control";
        $this->SurgicalHistory->EditCustomAttributes = "";
        if (!$this->SurgicalHistory->Raw) {
            $this->SurgicalHistory->CurrentValue = HtmlDecode($this->SurgicalHistory->CurrentValue);
        }
        $this->SurgicalHistory->EditValue = $this->SurgicalHistory->CurrentValue;
        $this->SurgicalHistory->PlaceHolder = RemoveHtml($this->SurgicalHistory->caption());

        // Generalexaminationpallor
        $this->Generalexaminationpallor->EditAttrs["class"] = "form-control";
        $this->Generalexaminationpallor->EditCustomAttributes = "";
        if (!$this->Generalexaminationpallor->Raw) {
            $this->Generalexaminationpallor->CurrentValue = HtmlDecode($this->Generalexaminationpallor->CurrentValue);
        }
        $this->Generalexaminationpallor->EditValue = $this->Generalexaminationpallor->CurrentValue;
        $this->Generalexaminationpallor->PlaceHolder = RemoveHtml($this->Generalexaminationpallor->caption());

        // PR
        $this->PR->EditAttrs["class"] = "form-control";
        $this->PR->EditCustomAttributes = "";
        if (!$this->PR->Raw) {
            $this->PR->CurrentValue = HtmlDecode($this->PR->CurrentValue);
        }
        $this->PR->EditValue = $this->PR->CurrentValue;
        $this->PR->PlaceHolder = RemoveHtml($this->PR->caption());

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

        // PROVISIONALDIAGNOSIS
        $this->PROVISIONALDIAGNOSIS->EditAttrs["class"] = "form-control";
        $this->PROVISIONALDIAGNOSIS->EditCustomAttributes = "";
        if (!$this->PROVISIONALDIAGNOSIS->Raw) {
            $this->PROVISIONALDIAGNOSIS->CurrentValue = HtmlDecode($this->PROVISIONALDIAGNOSIS->CurrentValue);
        }
        $this->PROVISIONALDIAGNOSIS->EditValue = $this->PROVISIONALDIAGNOSIS->CurrentValue;
        $this->PROVISIONALDIAGNOSIS->PlaceHolder = RemoveHtml($this->PROVISIONALDIAGNOSIS->caption());

        // Investigations
        $this->Investigations->EditAttrs["class"] = "form-control";
        $this->Investigations->EditCustomAttributes = "";
        if (!$this->Investigations->Raw) {
            $this->Investigations->CurrentValue = HtmlDecode($this->Investigations->CurrentValue);
        }
        $this->Investigations->EditValue = $this->Investigations->CurrentValue;
        $this->Investigations->PlaceHolder = RemoveHtml($this->Investigations->caption());

        // Fheight
        $this->Fheight->EditAttrs["class"] = "form-control";
        $this->Fheight->EditCustomAttributes = "";
        if (!$this->Fheight->Raw) {
            $this->Fheight->CurrentValue = HtmlDecode($this->Fheight->CurrentValue);
        }
        $this->Fheight->EditValue = $this->Fheight->CurrentValue;
        $this->Fheight->PlaceHolder = RemoveHtml($this->Fheight->caption());

        // Fweight
        $this->Fweight->EditAttrs["class"] = "form-control";
        $this->Fweight->EditCustomAttributes = "";
        if (!$this->Fweight->Raw) {
            $this->Fweight->CurrentValue = HtmlDecode($this->Fweight->CurrentValue);
        }
        $this->Fweight->EditValue = $this->Fweight->CurrentValue;
        $this->Fweight->PlaceHolder = RemoveHtml($this->Fweight->caption());

        // FBMI
        $this->FBMI->EditAttrs["class"] = "form-control";
        $this->FBMI->EditCustomAttributes = "";
        if (!$this->FBMI->Raw) {
            $this->FBMI->CurrentValue = HtmlDecode($this->FBMI->CurrentValue);
        }
        $this->FBMI->EditValue = $this->FBMI->CurrentValue;
        $this->FBMI->PlaceHolder = RemoveHtml($this->FBMI->caption());

        // FBloodgroup
        $this->FBloodgroup->EditAttrs["class"] = "form-control";
        $this->FBloodgroup->EditCustomAttributes = "";
        if (!$this->FBloodgroup->Raw) {
            $this->FBloodgroup->CurrentValue = HtmlDecode($this->FBloodgroup->CurrentValue);
        }
        $this->FBloodgroup->EditValue = $this->FBloodgroup->CurrentValue;
        $this->FBloodgroup->PlaceHolder = RemoveHtml($this->FBloodgroup->caption());

        // Mheight
        $this->Mheight->EditAttrs["class"] = "form-control";
        $this->Mheight->EditCustomAttributes = "";
        if (!$this->Mheight->Raw) {
            $this->Mheight->CurrentValue = HtmlDecode($this->Mheight->CurrentValue);
        }
        $this->Mheight->EditValue = $this->Mheight->CurrentValue;
        $this->Mheight->PlaceHolder = RemoveHtml($this->Mheight->caption());

        // Mweight
        $this->Mweight->EditAttrs["class"] = "form-control";
        $this->Mweight->EditCustomAttributes = "";
        if (!$this->Mweight->Raw) {
            $this->Mweight->CurrentValue = HtmlDecode($this->Mweight->CurrentValue);
        }
        $this->Mweight->EditValue = $this->Mweight->CurrentValue;
        $this->Mweight->PlaceHolder = RemoveHtml($this->Mweight->caption());

        // MBMI
        $this->MBMI->EditAttrs["class"] = "form-control";
        $this->MBMI->EditCustomAttributes = "";
        if (!$this->MBMI->Raw) {
            $this->MBMI->CurrentValue = HtmlDecode($this->MBMI->CurrentValue);
        }
        $this->MBMI->EditValue = $this->MBMI->CurrentValue;
        $this->MBMI->PlaceHolder = RemoveHtml($this->MBMI->caption());

        // MBloodgroup
        $this->MBloodgroup->EditAttrs["class"] = "form-control";
        $this->MBloodgroup->EditCustomAttributes = "";
        if (!$this->MBloodgroup->Raw) {
            $this->MBloodgroup->CurrentValue = HtmlDecode($this->MBloodgroup->CurrentValue);
        }
        $this->MBloodgroup->EditValue = $this->MBloodgroup->CurrentValue;
        $this->MBloodgroup->PlaceHolder = RemoveHtml($this->MBloodgroup->caption());

        // FBuild
        $this->FBuild->EditAttrs["class"] = "form-control";
        $this->FBuild->EditCustomAttributes = "";
        if (!$this->FBuild->Raw) {
            $this->FBuild->CurrentValue = HtmlDecode($this->FBuild->CurrentValue);
        }
        $this->FBuild->EditValue = $this->FBuild->CurrentValue;
        $this->FBuild->PlaceHolder = RemoveHtml($this->FBuild->caption());

        // MBuild
        $this->MBuild->EditAttrs["class"] = "form-control";
        $this->MBuild->EditCustomAttributes = "";
        if (!$this->MBuild->Raw) {
            $this->MBuild->CurrentValue = HtmlDecode($this->MBuild->CurrentValue);
        }
        $this->MBuild->EditValue = $this->MBuild->CurrentValue;
        $this->MBuild->PlaceHolder = RemoveHtml($this->MBuild->caption());

        // FSkinColor
        $this->FSkinColor->EditAttrs["class"] = "form-control";
        $this->FSkinColor->EditCustomAttributes = "";
        if (!$this->FSkinColor->Raw) {
            $this->FSkinColor->CurrentValue = HtmlDecode($this->FSkinColor->CurrentValue);
        }
        $this->FSkinColor->EditValue = $this->FSkinColor->CurrentValue;
        $this->FSkinColor->PlaceHolder = RemoveHtml($this->FSkinColor->caption());

        // MSkinColor
        $this->MSkinColor->EditAttrs["class"] = "form-control";
        $this->MSkinColor->EditCustomAttributes = "";
        if (!$this->MSkinColor->Raw) {
            $this->MSkinColor->CurrentValue = HtmlDecode($this->MSkinColor->CurrentValue);
        }
        $this->MSkinColor->EditValue = $this->MSkinColor->CurrentValue;
        $this->MSkinColor->PlaceHolder = RemoveHtml($this->MSkinColor->caption());

        // FEyesColor
        $this->FEyesColor->EditAttrs["class"] = "form-control";
        $this->FEyesColor->EditCustomAttributes = "";
        if (!$this->FEyesColor->Raw) {
            $this->FEyesColor->CurrentValue = HtmlDecode($this->FEyesColor->CurrentValue);
        }
        $this->FEyesColor->EditValue = $this->FEyesColor->CurrentValue;
        $this->FEyesColor->PlaceHolder = RemoveHtml($this->FEyesColor->caption());

        // MEyesColor
        $this->MEyesColor->EditAttrs["class"] = "form-control";
        $this->MEyesColor->EditCustomAttributes = "";
        if (!$this->MEyesColor->Raw) {
            $this->MEyesColor->CurrentValue = HtmlDecode($this->MEyesColor->CurrentValue);
        }
        $this->MEyesColor->EditValue = $this->MEyesColor->CurrentValue;
        $this->MEyesColor->PlaceHolder = RemoveHtml($this->MEyesColor->caption());

        // FHairColor
        $this->FHairColor->EditAttrs["class"] = "form-control";
        $this->FHairColor->EditCustomAttributes = "";
        if (!$this->FHairColor->Raw) {
            $this->FHairColor->CurrentValue = HtmlDecode($this->FHairColor->CurrentValue);
        }
        $this->FHairColor->EditValue = $this->FHairColor->CurrentValue;
        $this->FHairColor->PlaceHolder = RemoveHtml($this->FHairColor->caption());

        // MhairColor
        $this->MhairColor->EditAttrs["class"] = "form-control";
        $this->MhairColor->EditCustomAttributes = "";
        if (!$this->MhairColor->Raw) {
            $this->MhairColor->CurrentValue = HtmlDecode($this->MhairColor->CurrentValue);
        }
        $this->MhairColor->EditValue = $this->MhairColor->CurrentValue;
        $this->MhairColor->PlaceHolder = RemoveHtml($this->MhairColor->caption());

        // FhairTexture
        $this->FhairTexture->EditAttrs["class"] = "form-control";
        $this->FhairTexture->EditCustomAttributes = "";
        if (!$this->FhairTexture->Raw) {
            $this->FhairTexture->CurrentValue = HtmlDecode($this->FhairTexture->CurrentValue);
        }
        $this->FhairTexture->EditValue = $this->FhairTexture->CurrentValue;
        $this->FhairTexture->PlaceHolder = RemoveHtml($this->FhairTexture->caption());

        // MHairTexture
        $this->MHairTexture->EditAttrs["class"] = "form-control";
        $this->MHairTexture->EditCustomAttributes = "";
        if (!$this->MHairTexture->Raw) {
            $this->MHairTexture->CurrentValue = HtmlDecode($this->MHairTexture->CurrentValue);
        }
        $this->MHairTexture->EditValue = $this->MHairTexture->CurrentValue;
        $this->MHairTexture->PlaceHolder = RemoveHtml($this->MHairTexture->caption());

        // Fothers
        $this->Fothers->EditAttrs["class"] = "form-control";
        $this->Fothers->EditCustomAttributes = "";
        if (!$this->Fothers->Raw) {
            $this->Fothers->CurrentValue = HtmlDecode($this->Fothers->CurrentValue);
        }
        $this->Fothers->EditValue = $this->Fothers->CurrentValue;
        $this->Fothers->PlaceHolder = RemoveHtml($this->Fothers->caption());

        // Mothers
        $this->Mothers->EditAttrs["class"] = "form-control";
        $this->Mothers->EditCustomAttributes = "";
        if (!$this->Mothers->Raw) {
            $this->Mothers->CurrentValue = HtmlDecode($this->Mothers->CurrentValue);
        }
        $this->Mothers->EditValue = $this->Mothers->CurrentValue;
        $this->Mothers->PlaceHolder = RemoveHtml($this->Mothers->caption());

        // PGE
        $this->PGE->EditAttrs["class"] = "form-control";
        $this->PGE->EditCustomAttributes = "";
        if (!$this->PGE->Raw) {
            $this->PGE->CurrentValue = HtmlDecode($this->PGE->CurrentValue);
        }
        $this->PGE->EditValue = $this->PGE->CurrentValue;
        $this->PGE->PlaceHolder = RemoveHtml($this->PGE->caption());

        // PPR
        $this->PPR->EditAttrs["class"] = "form-control";
        $this->PPR->EditCustomAttributes = "";
        if (!$this->PPR->Raw) {
            $this->PPR->CurrentValue = HtmlDecode($this->PPR->CurrentValue);
        }
        $this->PPR->EditValue = $this->PPR->CurrentValue;
        $this->PPR->PlaceHolder = RemoveHtml($this->PPR->caption());

        // PBP
        $this->PBP->EditAttrs["class"] = "form-control";
        $this->PBP->EditCustomAttributes = "";
        if (!$this->PBP->Raw) {
            $this->PBP->CurrentValue = HtmlDecode($this->PBP->CurrentValue);
        }
        $this->PBP->EditValue = $this->PBP->CurrentValue;
        $this->PBP->PlaceHolder = RemoveHtml($this->PBP->caption());

        // Breast
        $this->Breast->EditAttrs["class"] = "form-control";
        $this->Breast->EditCustomAttributes = "";
        if (!$this->Breast->Raw) {
            $this->Breast->CurrentValue = HtmlDecode($this->Breast->CurrentValue);
        }
        $this->Breast->EditValue = $this->Breast->CurrentValue;
        $this->Breast->PlaceHolder = RemoveHtml($this->Breast->caption());

        // PPA
        $this->PPA->EditAttrs["class"] = "form-control";
        $this->PPA->EditCustomAttributes = "";
        if (!$this->PPA->Raw) {
            $this->PPA->CurrentValue = HtmlDecode($this->PPA->CurrentValue);
        }
        $this->PPA->EditValue = $this->PPA->CurrentValue;
        $this->PPA->PlaceHolder = RemoveHtml($this->PPA->caption());

        // PPSV
        $this->PPSV->EditAttrs["class"] = "form-control";
        $this->PPSV->EditCustomAttributes = "";
        if (!$this->PPSV->Raw) {
            $this->PPSV->CurrentValue = HtmlDecode($this->PPSV->CurrentValue);
        }
        $this->PPSV->EditValue = $this->PPSV->CurrentValue;
        $this->PPSV->PlaceHolder = RemoveHtml($this->PPSV->caption());

        // PPAPSMEAR
        $this->PPAPSMEAR->EditAttrs["class"] = "form-control";
        $this->PPAPSMEAR->EditCustomAttributes = "";
        if (!$this->PPAPSMEAR->Raw) {
            $this->PPAPSMEAR->CurrentValue = HtmlDecode($this->PPAPSMEAR->CurrentValue);
        }
        $this->PPAPSMEAR->EditValue = $this->PPAPSMEAR->CurrentValue;
        $this->PPAPSMEAR->PlaceHolder = RemoveHtml($this->PPAPSMEAR->caption());

        // PTHYROID
        $this->PTHYROID->EditAttrs["class"] = "form-control";
        $this->PTHYROID->EditCustomAttributes = "";
        if (!$this->PTHYROID->Raw) {
            $this->PTHYROID->CurrentValue = HtmlDecode($this->PTHYROID->CurrentValue);
        }
        $this->PTHYROID->EditValue = $this->PTHYROID->CurrentValue;
        $this->PTHYROID->PlaceHolder = RemoveHtml($this->PTHYROID->caption());

        // MTHYROID
        $this->MTHYROID->EditAttrs["class"] = "form-control";
        $this->MTHYROID->EditCustomAttributes = "";
        if (!$this->MTHYROID->Raw) {
            $this->MTHYROID->CurrentValue = HtmlDecode($this->MTHYROID->CurrentValue);
        }
        $this->MTHYROID->EditValue = $this->MTHYROID->CurrentValue;
        $this->MTHYROID->PlaceHolder = RemoveHtml($this->MTHYROID->caption());

        // SecSexCharacters
        $this->SecSexCharacters->EditAttrs["class"] = "form-control";
        $this->SecSexCharacters->EditCustomAttributes = "";
        if (!$this->SecSexCharacters->Raw) {
            $this->SecSexCharacters->CurrentValue = HtmlDecode($this->SecSexCharacters->CurrentValue);
        }
        $this->SecSexCharacters->EditValue = $this->SecSexCharacters->CurrentValue;
        $this->SecSexCharacters->PlaceHolder = RemoveHtml($this->SecSexCharacters->caption());

        // PenisUM
        $this->PenisUM->EditAttrs["class"] = "form-control";
        $this->PenisUM->EditCustomAttributes = "";
        if (!$this->PenisUM->Raw) {
            $this->PenisUM->CurrentValue = HtmlDecode($this->PenisUM->CurrentValue);
        }
        $this->PenisUM->EditValue = $this->PenisUM->CurrentValue;
        $this->PenisUM->PlaceHolder = RemoveHtml($this->PenisUM->caption());

        // VAS
        $this->VAS->EditAttrs["class"] = "form-control";
        $this->VAS->EditCustomAttributes = "";
        if (!$this->VAS->Raw) {
            $this->VAS->CurrentValue = HtmlDecode($this->VAS->CurrentValue);
        }
        $this->VAS->EditValue = $this->VAS->CurrentValue;
        $this->VAS->PlaceHolder = RemoveHtml($this->VAS->caption());

        // EPIDIDYMIS
        $this->EPIDIDYMIS->EditAttrs["class"] = "form-control";
        $this->EPIDIDYMIS->EditCustomAttributes = "";
        if (!$this->EPIDIDYMIS->Raw) {
            $this->EPIDIDYMIS->CurrentValue = HtmlDecode($this->EPIDIDYMIS->CurrentValue);
        }
        $this->EPIDIDYMIS->EditValue = $this->EPIDIDYMIS->CurrentValue;
        $this->EPIDIDYMIS->PlaceHolder = RemoveHtml($this->EPIDIDYMIS->caption());

        // Varicocele
        $this->Varicocele->EditAttrs["class"] = "form-control";
        $this->Varicocele->EditCustomAttributes = "";
        if (!$this->Varicocele->Raw) {
            $this->Varicocele->CurrentValue = HtmlDecode($this->Varicocele->CurrentValue);
        }
        $this->Varicocele->EditValue = $this->Varicocele->CurrentValue;
        $this->Varicocele->PlaceHolder = RemoveHtml($this->Varicocele->caption());

        // FertilityTreatmentHistory
        $this->FertilityTreatmentHistory->EditAttrs["class"] = "form-control";
        $this->FertilityTreatmentHistory->EditCustomAttributes = "";
        $this->FertilityTreatmentHistory->EditValue = $this->FertilityTreatmentHistory->CurrentValue;
        $this->FertilityTreatmentHistory->PlaceHolder = RemoveHtml($this->FertilityTreatmentHistory->caption());

        // SurgeryHistory
        $this->SurgeryHistory->EditAttrs["class"] = "form-control";
        $this->SurgeryHistory->EditCustomAttributes = "";
        $this->SurgeryHistory->EditValue = $this->SurgeryHistory->CurrentValue;
        $this->SurgeryHistory->PlaceHolder = RemoveHtml($this->SurgeryHistory->caption());

        // FamilyHistory
        $this->FamilyHistory->EditAttrs["class"] = "form-control";
        $this->FamilyHistory->EditCustomAttributes = "";
        if (!$this->FamilyHistory->Raw) {
            $this->FamilyHistory->CurrentValue = HtmlDecode($this->FamilyHistory->CurrentValue);
        }
        $this->FamilyHistory->EditValue = $this->FamilyHistory->CurrentValue;
        $this->FamilyHistory->PlaceHolder = RemoveHtml($this->FamilyHistory->caption());

        // PInvestigations
        $this->PInvestigations->EditAttrs["class"] = "form-control";
        $this->PInvestigations->EditCustomAttributes = "";
        $this->PInvestigations->EditValue = $this->PInvestigations->CurrentValue;
        $this->PInvestigations->PlaceHolder = RemoveHtml($this->PInvestigations->caption());

        // Addictions
        $this->Addictions->EditAttrs["class"] = "form-control";
        $this->Addictions->EditCustomAttributes = "";
        if (!$this->Addictions->Raw) {
            $this->Addictions->CurrentValue = HtmlDecode($this->Addictions->CurrentValue);
        }
        $this->Addictions->EditValue = $this->Addictions->CurrentValue;
        $this->Addictions->PlaceHolder = RemoveHtml($this->Addictions->caption());

        // Medications
        $this->Medications->EditAttrs["class"] = "form-control";
        $this->Medications->EditCustomAttributes = "";
        $this->Medications->EditValue = $this->Medications->CurrentValue;
        $this->Medications->PlaceHolder = RemoveHtml($this->Medications->caption());

        // Medical
        $this->Medical->EditAttrs["class"] = "form-control";
        $this->Medical->EditCustomAttributes = "";
        if (!$this->Medical->Raw) {
            $this->Medical->CurrentValue = HtmlDecode($this->Medical->CurrentValue);
        }
        $this->Medical->EditValue = $this->Medical->CurrentValue;
        $this->Medical->PlaceHolder = RemoveHtml($this->Medical->caption());

        // Surgical
        $this->Surgical->EditAttrs["class"] = "form-control";
        $this->Surgical->EditCustomAttributes = "";
        if (!$this->Surgical->Raw) {
            $this->Surgical->CurrentValue = HtmlDecode($this->Surgical->CurrentValue);
        }
        $this->Surgical->EditValue = $this->Surgical->CurrentValue;
        $this->Surgical->PlaceHolder = RemoveHtml($this->Surgical->caption());

        // CoitalHistory
        $this->CoitalHistory->EditAttrs["class"] = "form-control";
        $this->CoitalHistory->EditCustomAttributes = "";
        if (!$this->CoitalHistory->Raw) {
            $this->CoitalHistory->CurrentValue = HtmlDecode($this->CoitalHistory->CurrentValue);
        }
        $this->CoitalHistory->EditValue = $this->CoitalHistory->CurrentValue;
        $this->CoitalHistory->PlaceHolder = RemoveHtml($this->CoitalHistory->caption());

        // SemenAnalysis
        $this->SemenAnalysis->EditAttrs["class"] = "form-control";
        $this->SemenAnalysis->EditCustomAttributes = "";
        $this->SemenAnalysis->EditValue = $this->SemenAnalysis->CurrentValue;
        $this->SemenAnalysis->PlaceHolder = RemoveHtml($this->SemenAnalysis->caption());

        // MInsvestications
        $this->MInsvestications->EditAttrs["class"] = "form-control";
        $this->MInsvestications->EditCustomAttributes = "";
        $this->MInsvestications->EditValue = $this->MInsvestications->CurrentValue;
        $this->MInsvestications->PlaceHolder = RemoveHtml($this->MInsvestications->caption());

        // PImpression
        $this->PImpression->EditAttrs["class"] = "form-control";
        $this->PImpression->EditCustomAttributes = "";
        $this->PImpression->EditValue = $this->PImpression->CurrentValue;
        $this->PImpression->PlaceHolder = RemoveHtml($this->PImpression->caption());

        // MIMpression
        $this->MIMpression->EditAttrs["class"] = "form-control";
        $this->MIMpression->EditCustomAttributes = "";
        $this->MIMpression->EditValue = $this->MIMpression->CurrentValue;
        $this->MIMpression->PlaceHolder = RemoveHtml($this->MIMpression->caption());

        // PPlanOfManagement
        $this->PPlanOfManagement->EditAttrs["class"] = "form-control";
        $this->PPlanOfManagement->EditCustomAttributes = "";
        $this->PPlanOfManagement->EditValue = $this->PPlanOfManagement->CurrentValue;
        $this->PPlanOfManagement->PlaceHolder = RemoveHtml($this->PPlanOfManagement->caption());

        // MPlanOfManagement
        $this->MPlanOfManagement->EditAttrs["class"] = "form-control";
        $this->MPlanOfManagement->EditCustomAttributes = "";
        $this->MPlanOfManagement->EditValue = $this->MPlanOfManagement->CurrentValue;
        $this->MPlanOfManagement->PlaceHolder = RemoveHtml($this->MPlanOfManagement->caption());

        // PReadMore
        $this->PReadMore->EditAttrs["class"] = "form-control";
        $this->PReadMore->EditCustomAttributes = "";
        $this->PReadMore->EditValue = $this->PReadMore->CurrentValue;
        $this->PReadMore->PlaceHolder = RemoveHtml($this->PReadMore->caption());

        // MReadMore
        $this->MReadMore->EditAttrs["class"] = "form-control";
        $this->MReadMore->EditCustomAttributes = "";
        $this->MReadMore->EditValue = $this->MReadMore->CurrentValue;
        $this->MReadMore->PlaceHolder = RemoveHtml($this->MReadMore->caption());

        // MariedFor
        $this->MariedFor->EditAttrs["class"] = "form-control";
        $this->MariedFor->EditCustomAttributes = "";
        if (!$this->MariedFor->Raw) {
            $this->MariedFor->CurrentValue = HtmlDecode($this->MariedFor->CurrentValue);
        }
        $this->MariedFor->EditValue = $this->MariedFor->CurrentValue;
        $this->MariedFor->PlaceHolder = RemoveHtml($this->MariedFor->caption());

        // CMNCM
        $this->CMNCM->EditAttrs["class"] = "form-control";
        $this->CMNCM->EditCustomAttributes = "";
        if (!$this->CMNCM->Raw) {
            $this->CMNCM->CurrentValue = HtmlDecode($this->CMNCM->CurrentValue);
        }
        $this->CMNCM->EditValue = $this->CMNCM->CurrentValue;
        $this->CMNCM->PlaceHolder = RemoveHtml($this->CMNCM->caption());

        // TidNo
        $this->TidNo->EditAttrs["class"] = "form-control";
        $this->TidNo->EditCustomAttributes = "";
        $this->TidNo->EditValue = $this->TidNo->CurrentValue;
        $this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

        // pFamilyHistory
        $this->pFamilyHistory->EditAttrs["class"] = "form-control";
        $this->pFamilyHistory->EditCustomAttributes = "";
        if (!$this->pFamilyHistory->Raw) {
            $this->pFamilyHistory->CurrentValue = HtmlDecode($this->pFamilyHistory->CurrentValue);
        }
        $this->pFamilyHistory->EditValue = $this->pFamilyHistory->CurrentValue;
        $this->pFamilyHistory->PlaceHolder = RemoveHtml($this->pFamilyHistory->caption());

        // pTemplateMedications
        $this->pTemplateMedications->EditAttrs["class"] = "form-control";
        $this->pTemplateMedications->EditCustomAttributes = "";
        $this->pTemplateMedications->EditValue = $this->pTemplateMedications->CurrentValue;
        $this->pTemplateMedications->PlaceHolder = RemoveHtml($this->pTemplateMedications->caption());

        // AntiTPO
        $this->AntiTPO->EditAttrs["class"] = "form-control";
        $this->AntiTPO->EditCustomAttributes = "";
        if (!$this->AntiTPO->Raw) {
            $this->AntiTPO->CurrentValue = HtmlDecode($this->AntiTPO->CurrentValue);
        }
        $this->AntiTPO->EditValue = $this->AntiTPO->CurrentValue;
        $this->AntiTPO->PlaceHolder = RemoveHtml($this->AntiTPO->caption());

        // AntiTG
        $this->AntiTG->EditAttrs["class"] = "form-control";
        $this->AntiTG->EditCustomAttributes = "";
        if (!$this->AntiTG->Raw) {
            $this->AntiTG->CurrentValue = HtmlDecode($this->AntiTG->CurrentValue);
        }
        $this->AntiTG->EditValue = $this->AntiTG->CurrentValue;
        $this->AntiTG->PlaceHolder = RemoveHtml($this->AntiTG->caption());

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
                    $doc->exportCaption($this->Male);
                    $doc->exportCaption($this->Female);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->malepropic);
                    $doc->exportCaption($this->femalepropic);
                    $doc->exportCaption($this->HusbandEducation);
                    $doc->exportCaption($this->WifeEducation);
                    $doc->exportCaption($this->HusbandWorkHours);
                    $doc->exportCaption($this->WifeWorkHours);
                    $doc->exportCaption($this->PatientLanguage);
                    $doc->exportCaption($this->ReferedBy);
                    $doc->exportCaption($this->ReferPhNo);
                    $doc->exportCaption($this->WifeCell);
                    $doc->exportCaption($this->HusbandCell);
                    $doc->exportCaption($this->WifeEmail);
                    $doc->exportCaption($this->HusbandEmail);
                    $doc->exportCaption($this->ARTCYCLE);
                    $doc->exportCaption($this->RESULT);
                    $doc->exportCaption($this->CoupleID);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->PatientID);
                    $doc->exportCaption($this->PartnerName);
                    $doc->exportCaption($this->PartnerID);
                    $doc->exportCaption($this->DrID);
                    $doc->exportCaption($this->DrDepartment);
                    $doc->exportCaption($this->Doctor);
                    $doc->exportCaption($this->hid);
                    $doc->exportCaption($this->RIDNO);
                    $doc->exportCaption($this->Name);
                    $doc->exportCaption($this->Age);
                    $doc->exportCaption($this->SEX);
                    $doc->exportCaption($this->Religion);
                    $doc->exportCaption($this->Address);
                    $doc->exportCaption($this->IdentificationMark);
                    $doc->exportCaption($this->DoublewitnessName1);
                    $doc->exportCaption($this->DoublewitnessName2);
                    $doc->exportCaption($this->Chiefcomplaints);
                    $doc->exportCaption($this->MenstrualHistory);
                    $doc->exportCaption($this->ObstetricHistory);
                    $doc->exportCaption($this->MedicalHistory);
                    $doc->exportCaption($this->SurgicalHistory);
                    $doc->exportCaption($this->Generalexaminationpallor);
                    $doc->exportCaption($this->PR);
                    $doc->exportCaption($this->CVS);
                    $doc->exportCaption($this->PA);
                    $doc->exportCaption($this->PROVISIONALDIAGNOSIS);
                    $doc->exportCaption($this->Investigations);
                    $doc->exportCaption($this->Fheight);
                    $doc->exportCaption($this->Fweight);
                    $doc->exportCaption($this->FBMI);
                    $doc->exportCaption($this->FBloodgroup);
                    $doc->exportCaption($this->Mheight);
                    $doc->exportCaption($this->Mweight);
                    $doc->exportCaption($this->MBMI);
                    $doc->exportCaption($this->MBloodgroup);
                    $doc->exportCaption($this->FBuild);
                    $doc->exportCaption($this->MBuild);
                    $doc->exportCaption($this->FSkinColor);
                    $doc->exportCaption($this->MSkinColor);
                    $doc->exportCaption($this->FEyesColor);
                    $doc->exportCaption($this->MEyesColor);
                    $doc->exportCaption($this->FHairColor);
                    $doc->exportCaption($this->MhairColor);
                    $doc->exportCaption($this->FhairTexture);
                    $doc->exportCaption($this->MHairTexture);
                    $doc->exportCaption($this->Fothers);
                    $doc->exportCaption($this->Mothers);
                    $doc->exportCaption($this->PGE);
                    $doc->exportCaption($this->PPR);
                    $doc->exportCaption($this->PBP);
                    $doc->exportCaption($this->Breast);
                    $doc->exportCaption($this->PPA);
                    $doc->exportCaption($this->PPSV);
                    $doc->exportCaption($this->PPAPSMEAR);
                    $doc->exportCaption($this->PTHYROID);
                    $doc->exportCaption($this->MTHYROID);
                    $doc->exportCaption($this->SecSexCharacters);
                    $doc->exportCaption($this->PenisUM);
                    $doc->exportCaption($this->VAS);
                    $doc->exportCaption($this->EPIDIDYMIS);
                    $doc->exportCaption($this->Varicocele);
                    $doc->exportCaption($this->FertilityTreatmentHistory);
                    $doc->exportCaption($this->SurgeryHistory);
                    $doc->exportCaption($this->FamilyHistory);
                    $doc->exportCaption($this->PInvestigations);
                    $doc->exportCaption($this->Addictions);
                    $doc->exportCaption($this->Medications);
                    $doc->exportCaption($this->Medical);
                    $doc->exportCaption($this->Surgical);
                    $doc->exportCaption($this->CoitalHistory);
                    $doc->exportCaption($this->SemenAnalysis);
                    $doc->exportCaption($this->MInsvestications);
                    $doc->exportCaption($this->PImpression);
                    $doc->exportCaption($this->MIMpression);
                    $doc->exportCaption($this->PPlanOfManagement);
                    $doc->exportCaption($this->MPlanOfManagement);
                    $doc->exportCaption($this->PReadMore);
                    $doc->exportCaption($this->MReadMore);
                    $doc->exportCaption($this->MariedFor);
                    $doc->exportCaption($this->CMNCM);
                    $doc->exportCaption($this->TidNo);
                    $doc->exportCaption($this->pFamilyHistory);
                    $doc->exportCaption($this->pTemplateMedications);
                    $doc->exportCaption($this->AntiTPO);
                    $doc->exportCaption($this->AntiTG);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->Male);
                    $doc->exportCaption($this->Female);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->HusbandEducation);
                    $doc->exportCaption($this->WifeEducation);
                    $doc->exportCaption($this->HusbandWorkHours);
                    $doc->exportCaption($this->WifeWorkHours);
                    $doc->exportCaption($this->PatientLanguage);
                    $doc->exportCaption($this->ReferedBy);
                    $doc->exportCaption($this->ReferPhNo);
                    $doc->exportCaption($this->WifeCell);
                    $doc->exportCaption($this->HusbandCell);
                    $doc->exportCaption($this->WifeEmail);
                    $doc->exportCaption($this->HusbandEmail);
                    $doc->exportCaption($this->ARTCYCLE);
                    $doc->exportCaption($this->RESULT);
                    $doc->exportCaption($this->CoupleID);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->PatientID);
                    $doc->exportCaption($this->PartnerName);
                    $doc->exportCaption($this->PartnerID);
                    $doc->exportCaption($this->DrID);
                    $doc->exportCaption($this->DrDepartment);
                    $doc->exportCaption($this->Doctor);
                    $doc->exportCaption($this->hid);
                    $doc->exportCaption($this->RIDNO);
                    $doc->exportCaption($this->Name);
                    $doc->exportCaption($this->Age);
                    $doc->exportCaption($this->SEX);
                    $doc->exportCaption($this->Religion);
                    $doc->exportCaption($this->Address);
                    $doc->exportCaption($this->IdentificationMark);
                    $doc->exportCaption($this->MedicalHistory);
                    $doc->exportCaption($this->SurgicalHistory);
                    $doc->exportCaption($this->Generalexaminationpallor);
                    $doc->exportCaption($this->PR);
                    $doc->exportCaption($this->CVS);
                    $doc->exportCaption($this->PA);
                    $doc->exportCaption($this->PROVISIONALDIAGNOSIS);
                    $doc->exportCaption($this->Investigations);
                    $doc->exportCaption($this->Fheight);
                    $doc->exportCaption($this->Fweight);
                    $doc->exportCaption($this->FBMI);
                    $doc->exportCaption($this->FBloodgroup);
                    $doc->exportCaption($this->Mheight);
                    $doc->exportCaption($this->Mweight);
                    $doc->exportCaption($this->MBMI);
                    $doc->exportCaption($this->MBloodgroup);
                    $doc->exportCaption($this->FBuild);
                    $doc->exportCaption($this->MBuild);
                    $doc->exportCaption($this->FSkinColor);
                    $doc->exportCaption($this->MSkinColor);
                    $doc->exportCaption($this->FEyesColor);
                    $doc->exportCaption($this->MEyesColor);
                    $doc->exportCaption($this->FHairColor);
                    $doc->exportCaption($this->MhairColor);
                    $doc->exportCaption($this->FhairTexture);
                    $doc->exportCaption($this->MHairTexture);
                    $doc->exportCaption($this->Fothers);
                    $doc->exportCaption($this->Mothers);
                    $doc->exportCaption($this->PGE);
                    $doc->exportCaption($this->PPR);
                    $doc->exportCaption($this->PBP);
                    $doc->exportCaption($this->Breast);
                    $doc->exportCaption($this->PPA);
                    $doc->exportCaption($this->PPSV);
                    $doc->exportCaption($this->PPAPSMEAR);
                    $doc->exportCaption($this->PTHYROID);
                    $doc->exportCaption($this->MTHYROID);
                    $doc->exportCaption($this->SecSexCharacters);
                    $doc->exportCaption($this->PenisUM);
                    $doc->exportCaption($this->VAS);
                    $doc->exportCaption($this->EPIDIDYMIS);
                    $doc->exportCaption($this->Varicocele);
                    $doc->exportCaption($this->FamilyHistory);
                    $doc->exportCaption($this->Addictions);
                    $doc->exportCaption($this->Medical);
                    $doc->exportCaption($this->Surgical);
                    $doc->exportCaption($this->CoitalHistory);
                    $doc->exportCaption($this->MariedFor);
                    $doc->exportCaption($this->CMNCM);
                    $doc->exportCaption($this->TidNo);
                    $doc->exportCaption($this->pFamilyHistory);
                    $doc->exportCaption($this->AntiTPO);
                    $doc->exportCaption($this->AntiTG);
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
                        $doc->exportField($this->Male);
                        $doc->exportField($this->Female);
                        $doc->exportField($this->status);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->malepropic);
                        $doc->exportField($this->femalepropic);
                        $doc->exportField($this->HusbandEducation);
                        $doc->exportField($this->WifeEducation);
                        $doc->exportField($this->HusbandWorkHours);
                        $doc->exportField($this->WifeWorkHours);
                        $doc->exportField($this->PatientLanguage);
                        $doc->exportField($this->ReferedBy);
                        $doc->exportField($this->ReferPhNo);
                        $doc->exportField($this->WifeCell);
                        $doc->exportField($this->HusbandCell);
                        $doc->exportField($this->WifeEmail);
                        $doc->exportField($this->HusbandEmail);
                        $doc->exportField($this->ARTCYCLE);
                        $doc->exportField($this->RESULT);
                        $doc->exportField($this->CoupleID);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->PatientID);
                        $doc->exportField($this->PartnerName);
                        $doc->exportField($this->PartnerID);
                        $doc->exportField($this->DrID);
                        $doc->exportField($this->DrDepartment);
                        $doc->exportField($this->Doctor);
                        $doc->exportField($this->hid);
                        $doc->exportField($this->RIDNO);
                        $doc->exportField($this->Name);
                        $doc->exportField($this->Age);
                        $doc->exportField($this->SEX);
                        $doc->exportField($this->Religion);
                        $doc->exportField($this->Address);
                        $doc->exportField($this->IdentificationMark);
                        $doc->exportField($this->DoublewitnessName1);
                        $doc->exportField($this->DoublewitnessName2);
                        $doc->exportField($this->Chiefcomplaints);
                        $doc->exportField($this->MenstrualHistory);
                        $doc->exportField($this->ObstetricHistory);
                        $doc->exportField($this->MedicalHistory);
                        $doc->exportField($this->SurgicalHistory);
                        $doc->exportField($this->Generalexaminationpallor);
                        $doc->exportField($this->PR);
                        $doc->exportField($this->CVS);
                        $doc->exportField($this->PA);
                        $doc->exportField($this->PROVISIONALDIAGNOSIS);
                        $doc->exportField($this->Investigations);
                        $doc->exportField($this->Fheight);
                        $doc->exportField($this->Fweight);
                        $doc->exportField($this->FBMI);
                        $doc->exportField($this->FBloodgroup);
                        $doc->exportField($this->Mheight);
                        $doc->exportField($this->Mweight);
                        $doc->exportField($this->MBMI);
                        $doc->exportField($this->MBloodgroup);
                        $doc->exportField($this->FBuild);
                        $doc->exportField($this->MBuild);
                        $doc->exportField($this->FSkinColor);
                        $doc->exportField($this->MSkinColor);
                        $doc->exportField($this->FEyesColor);
                        $doc->exportField($this->MEyesColor);
                        $doc->exportField($this->FHairColor);
                        $doc->exportField($this->MhairColor);
                        $doc->exportField($this->FhairTexture);
                        $doc->exportField($this->MHairTexture);
                        $doc->exportField($this->Fothers);
                        $doc->exportField($this->Mothers);
                        $doc->exportField($this->PGE);
                        $doc->exportField($this->PPR);
                        $doc->exportField($this->PBP);
                        $doc->exportField($this->Breast);
                        $doc->exportField($this->PPA);
                        $doc->exportField($this->PPSV);
                        $doc->exportField($this->PPAPSMEAR);
                        $doc->exportField($this->PTHYROID);
                        $doc->exportField($this->MTHYROID);
                        $doc->exportField($this->SecSexCharacters);
                        $doc->exportField($this->PenisUM);
                        $doc->exportField($this->VAS);
                        $doc->exportField($this->EPIDIDYMIS);
                        $doc->exportField($this->Varicocele);
                        $doc->exportField($this->FertilityTreatmentHistory);
                        $doc->exportField($this->SurgeryHistory);
                        $doc->exportField($this->FamilyHistory);
                        $doc->exportField($this->PInvestigations);
                        $doc->exportField($this->Addictions);
                        $doc->exportField($this->Medications);
                        $doc->exportField($this->Medical);
                        $doc->exportField($this->Surgical);
                        $doc->exportField($this->CoitalHistory);
                        $doc->exportField($this->SemenAnalysis);
                        $doc->exportField($this->MInsvestications);
                        $doc->exportField($this->PImpression);
                        $doc->exportField($this->MIMpression);
                        $doc->exportField($this->PPlanOfManagement);
                        $doc->exportField($this->MPlanOfManagement);
                        $doc->exportField($this->PReadMore);
                        $doc->exportField($this->MReadMore);
                        $doc->exportField($this->MariedFor);
                        $doc->exportField($this->CMNCM);
                        $doc->exportField($this->TidNo);
                        $doc->exportField($this->pFamilyHistory);
                        $doc->exportField($this->pTemplateMedications);
                        $doc->exportField($this->AntiTPO);
                        $doc->exportField($this->AntiTG);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->Male);
                        $doc->exportField($this->Female);
                        $doc->exportField($this->status);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->HusbandEducation);
                        $doc->exportField($this->WifeEducation);
                        $doc->exportField($this->HusbandWorkHours);
                        $doc->exportField($this->WifeWorkHours);
                        $doc->exportField($this->PatientLanguage);
                        $doc->exportField($this->ReferedBy);
                        $doc->exportField($this->ReferPhNo);
                        $doc->exportField($this->WifeCell);
                        $doc->exportField($this->HusbandCell);
                        $doc->exportField($this->WifeEmail);
                        $doc->exportField($this->HusbandEmail);
                        $doc->exportField($this->ARTCYCLE);
                        $doc->exportField($this->RESULT);
                        $doc->exportField($this->CoupleID);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->PatientID);
                        $doc->exportField($this->PartnerName);
                        $doc->exportField($this->PartnerID);
                        $doc->exportField($this->DrID);
                        $doc->exportField($this->DrDepartment);
                        $doc->exportField($this->Doctor);
                        $doc->exportField($this->hid);
                        $doc->exportField($this->RIDNO);
                        $doc->exportField($this->Name);
                        $doc->exportField($this->Age);
                        $doc->exportField($this->SEX);
                        $doc->exportField($this->Religion);
                        $doc->exportField($this->Address);
                        $doc->exportField($this->IdentificationMark);
                        $doc->exportField($this->MedicalHistory);
                        $doc->exportField($this->SurgicalHistory);
                        $doc->exportField($this->Generalexaminationpallor);
                        $doc->exportField($this->PR);
                        $doc->exportField($this->CVS);
                        $doc->exportField($this->PA);
                        $doc->exportField($this->PROVISIONALDIAGNOSIS);
                        $doc->exportField($this->Investigations);
                        $doc->exportField($this->Fheight);
                        $doc->exportField($this->Fweight);
                        $doc->exportField($this->FBMI);
                        $doc->exportField($this->FBloodgroup);
                        $doc->exportField($this->Mheight);
                        $doc->exportField($this->Mweight);
                        $doc->exportField($this->MBMI);
                        $doc->exportField($this->MBloodgroup);
                        $doc->exportField($this->FBuild);
                        $doc->exportField($this->MBuild);
                        $doc->exportField($this->FSkinColor);
                        $doc->exportField($this->MSkinColor);
                        $doc->exportField($this->FEyesColor);
                        $doc->exportField($this->MEyesColor);
                        $doc->exportField($this->FHairColor);
                        $doc->exportField($this->MhairColor);
                        $doc->exportField($this->FhairTexture);
                        $doc->exportField($this->MHairTexture);
                        $doc->exportField($this->Fothers);
                        $doc->exportField($this->Mothers);
                        $doc->exportField($this->PGE);
                        $doc->exportField($this->PPR);
                        $doc->exportField($this->PBP);
                        $doc->exportField($this->Breast);
                        $doc->exportField($this->PPA);
                        $doc->exportField($this->PPSV);
                        $doc->exportField($this->PPAPSMEAR);
                        $doc->exportField($this->PTHYROID);
                        $doc->exportField($this->MTHYROID);
                        $doc->exportField($this->SecSexCharacters);
                        $doc->exportField($this->PenisUM);
                        $doc->exportField($this->VAS);
                        $doc->exportField($this->EPIDIDYMIS);
                        $doc->exportField($this->Varicocele);
                        $doc->exportField($this->FamilyHistory);
                        $doc->exportField($this->Addictions);
                        $doc->exportField($this->Medical);
                        $doc->exportField($this->Surgical);
                        $doc->exportField($this->CoitalHistory);
                        $doc->exportField($this->MariedFor);
                        $doc->exportField($this->CMNCM);
                        $doc->exportField($this->TidNo);
                        $doc->exportField($this->pFamilyHistory);
                        $doc->exportField($this->AntiTPO);
                        $doc->exportField($this->AntiTG);
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
