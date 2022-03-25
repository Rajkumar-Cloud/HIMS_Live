<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_ivf_treatment
 */
class ViewIvfTreatment extends DbTable
{
    protected $SqlFrom = "";
    protected $SqlSelect = null;
    protected $SqlSelectList = null;
    protected $SqlWhere = "";
    protected $SqlGroupBy = "";
    protected $SqlHaving = "";
    protected $SqlOrderBy = "";
    public $UseSessionForListSql = true;
    public $UseCustomTemplate = false; // Use custom template

    // Column CSS classes
    public $LeftColumnClass = "col-sm-2 col-form-label ew-label";
    public $RightColumnClass = "col-sm-10";
    public $OffsetColumnClass = "col-sm-10 offset-sm-2";
    public $TableLeftColumnClass = "w-col-2";

    // Export
    public $ExportDoc;

    // Fields
    public $id;
    public $RIDNO;
    public $Name;
    public $Age;
    public $treatment_status;
    public $ARTCYCLE;
    public $RESULT;
    public $status;
    public $createdby;
    public $createddatetime;
    public $modifiedby;
    public $modifieddatetime;
    public $TreatmentStartDate;
    public $TreatementStopDate;
    public $TypePatient;
    public $Treatment;
    public $TreatmentTec;
    public $TypeOfCycle;
    public $SpermOrgin;
    public $State;
    public $Origin;
    public $MACS;
    public $Technique;
    public $PgdPlanning;
    public $IMSI;
    public $SequentialCulture;
    public $TimeLapse;
    public $AH;
    public $Weight;
    public $BMI;
    public $status1;
    public $id1;
    public $Male;
    public $Female;
    public $malepropic;
    public $femalepropic;
    public $HusbandEducation;
    public $WifeEducation;
    public $HusbandWorkHours;
    public $WifeWorkHours;
    public $PatientLanguage;
    public $ReferedBy;
    public $ReferPhNo;
    public $ARTCYCLE1;
    public $RESULT1;
    public $CoupleID;
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
        $this->TableVar = 'view_ivf_treatment';
        $this->TableName = 'view_ivf_treatment';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_ivf_treatment`";
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
        $this->id = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['id'] = &$this->id;

        // RIDNO
        $this->RIDNO = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_RIDNO', 'RIDNO', '`RIDNO`', '`RIDNO`', 3, 11, -1, false, '`RIDNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RIDNO->Sortable = true; // Allow sort
        $this->RIDNO->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['RIDNO'] = &$this->RIDNO;

        // Name
        $this->Name = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_Name', 'Name', '`Name`', '`Name`', 200, 45, -1, false, '`Name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Name->Sortable = true; // Allow sort
        $this->Fields['Name'] = &$this->Name;

        // Age
        $this->Age = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_Age', 'Age', '`Age`', '`Age`', 200, 45, -1, false, '`Age`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Age->Sortable = true; // Allow sort
        $this->Fields['Age'] = &$this->Age;

        // treatment_status
        $this->treatment_status = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_treatment_status', 'treatment_status', '`treatment_status`', '`treatment_status`', 200, 45, -1, false, '`treatment_status`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->treatment_status->Sortable = true; // Allow sort
        $this->Fields['treatment_status'] = &$this->treatment_status;

        // ARTCYCLE
        $this->ARTCYCLE = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_ARTCYCLE', 'ARTCYCLE', '`ARTCYCLE`', '`ARTCYCLE`', 200, 45, -1, false, '`ARTCYCLE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ARTCYCLE->Sortable = true; // Allow sort
        $this->Fields['ARTCYCLE'] = &$this->ARTCYCLE;

        // RESULT
        $this->RESULT = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_RESULT', 'RESULT', '`RESULT`', '`RESULT`', 200, 45, -1, false, '`RESULT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RESULT->Sortable = true; // Allow sort
        $this->Fields['RESULT'] = &$this->RESULT;

        // status
        $this->status = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_status', 'status', '`status`', '`status`', 3, 11, -1, false, '`status`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->status->Sortable = true; // Allow sort
        $this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['status'] = &$this->status;

        // createdby
        $this->createdby = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, 11, -1, false, '`createdby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdby->Sortable = true; // Allow sort
        $this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['createdby'] = &$this->createdby;

        // createddatetime
        $this->createddatetime = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, false, '`createddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddatetime->Sortable = true; // Allow sort
        $this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['createddatetime'] = &$this->createddatetime;

        // modifiedby
        $this->modifiedby = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, 11, -1, false, '`modifiedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifiedby->Sortable = true; // Allow sort
        $this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['modifiedby'] = &$this->modifiedby;

        // modifieddatetime
        $this->modifieddatetime = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, false, '`modifieddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifieddatetime->Sortable = true; // Allow sort
        $this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['modifieddatetime'] = &$this->modifieddatetime;

        // TreatmentStartDate
        $this->TreatmentStartDate = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_TreatmentStartDate', 'TreatmentStartDate', '`TreatmentStartDate`', CastDateFieldForLike("`TreatmentStartDate`", 0, "DB"), 135, 19, 0, false, '`TreatmentStartDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TreatmentStartDate->Sortable = true; // Allow sort
        $this->TreatmentStartDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['TreatmentStartDate'] = &$this->TreatmentStartDate;

        // TreatementStopDate
        $this->TreatementStopDate = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_TreatementStopDate', 'TreatementStopDate', '`TreatementStopDate`', CastDateFieldForLike("`TreatementStopDate`", 0, "DB"), 135, 19, 0, false, '`TreatementStopDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TreatementStopDate->Sortable = true; // Allow sort
        $this->TreatementStopDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['TreatementStopDate'] = &$this->TreatementStopDate;

        // TypePatient
        $this->TypePatient = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_TypePatient', 'TypePatient', '`TypePatient`', '`TypePatient`', 200, 45, -1, false, '`TypePatient`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TypePatient->Sortable = true; // Allow sort
        $this->Fields['TypePatient'] = &$this->TypePatient;

        // Treatment
        $this->Treatment = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_Treatment', 'Treatment', '`Treatment`', '`Treatment`', 200, 45, -1, false, '`Treatment`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Treatment->Sortable = true; // Allow sort
        $this->Fields['Treatment'] = &$this->Treatment;

        // TreatmentTec
        $this->TreatmentTec = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_TreatmentTec', 'TreatmentTec', '`TreatmentTec`', '`TreatmentTec`', 200, 45, -1, false, '`TreatmentTec`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TreatmentTec->Sortable = true; // Allow sort
        $this->Fields['TreatmentTec'] = &$this->TreatmentTec;

        // TypeOfCycle
        $this->TypeOfCycle = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_TypeOfCycle', 'TypeOfCycle', '`TypeOfCycle`', '`TypeOfCycle`', 200, 45, -1, false, '`TypeOfCycle`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TypeOfCycle->Sortable = true; // Allow sort
        $this->Fields['TypeOfCycle'] = &$this->TypeOfCycle;

        // SpermOrgin
        $this->SpermOrgin = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_SpermOrgin', 'SpermOrgin', '`SpermOrgin`', '`SpermOrgin`', 200, 45, -1, false, '`SpermOrgin`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SpermOrgin->Sortable = true; // Allow sort
        $this->Fields['SpermOrgin'] = &$this->SpermOrgin;

        // State
        $this->State = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_State', 'State', '`State`', '`State`', 200, 45, -1, false, '`State`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->State->Sortable = true; // Allow sort
        $this->Fields['State'] = &$this->State;

        // Origin
        $this->Origin = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_Origin', 'Origin', '`Origin`', '`Origin`', 200, 45, -1, false, '`Origin`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Origin->Sortable = true; // Allow sort
        $this->Fields['Origin'] = &$this->Origin;

        // MACS
        $this->MACS = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_MACS', 'MACS', '`MACS`', '`MACS`', 200, 45, -1, false, '`MACS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MACS->Sortable = true; // Allow sort
        $this->Fields['MACS'] = &$this->MACS;

        // Technique
        $this->Technique = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_Technique', 'Technique', '`Technique`', '`Technique`', 200, 45, -1, false, '`Technique`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Technique->Sortable = true; // Allow sort
        $this->Fields['Technique'] = &$this->Technique;

        // PgdPlanning
        $this->PgdPlanning = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_PgdPlanning', 'PgdPlanning', '`PgdPlanning`', '`PgdPlanning`', 200, 45, -1, false, '`PgdPlanning`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PgdPlanning->Sortable = true; // Allow sort
        $this->Fields['PgdPlanning'] = &$this->PgdPlanning;

        // IMSI
        $this->IMSI = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_IMSI', 'IMSI', '`IMSI`', '`IMSI`', 200, 45, -1, false, '`IMSI`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IMSI->Sortable = true; // Allow sort
        $this->Fields['IMSI'] = &$this->IMSI;

        // SequentialCulture
        $this->SequentialCulture = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_SequentialCulture', 'SequentialCulture', '`SequentialCulture`', '`SequentialCulture`', 200, 45, -1, false, '`SequentialCulture`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SequentialCulture->Sortable = true; // Allow sort
        $this->Fields['SequentialCulture'] = &$this->SequentialCulture;

        // TimeLapse
        $this->TimeLapse = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_TimeLapse', 'TimeLapse', '`TimeLapse`', '`TimeLapse`', 200, 45, -1, false, '`TimeLapse`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TimeLapse->Sortable = true; // Allow sort
        $this->Fields['TimeLapse'] = &$this->TimeLapse;

        // AH
        $this->AH = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_AH', 'AH', '`AH`', '`AH`', 200, 45, -1, false, '`AH`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AH->Sortable = true; // Allow sort
        $this->Fields['AH'] = &$this->AH;

        // Weight
        $this->Weight = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_Weight', 'Weight', '`Weight`', '`Weight`', 200, 45, -1, false, '`Weight`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Weight->Sortable = true; // Allow sort
        $this->Fields['Weight'] = &$this->Weight;

        // BMI
        $this->BMI = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_BMI', 'BMI', '`BMI`', '`BMI`', 200, 45, -1, false, '`BMI`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BMI->Sortable = true; // Allow sort
        $this->Fields['BMI'] = &$this->BMI;

        // status1
        $this->status1 = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_status1', 'status1', '`status1`', '`status1`', 3, 11, -1, false, '`status1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->status1->Sortable = true; // Allow sort
        $this->status1->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['status1'] = &$this->status1;

        // id1
        $this->id1 = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_id1', 'id1', '`id1`', '`id1`', 3, 11, -1, false, '`id1`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id1->IsAutoIncrement = true; // Autoincrement field
        $this->id1->IsPrimaryKey = true; // Primary key field
        $this->id1->Sortable = true; // Allow sort
        $this->id1->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['id1'] = &$this->id1;

        // Male
        $this->Male = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_Male', 'Male', '`Male`', '`Male`', 3, 11, -1, false, '`Male`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Male->Nullable = false; // NOT NULL field
        $this->Male->Required = true; // Required field
        $this->Male->Sortable = true; // Allow sort
        $this->Male->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['Male'] = &$this->Male;

        // Female
        $this->Female = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_Female', 'Female', '`Female`', '`Female`', 3, 11, -1, false, '`Female`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Female->Nullable = false; // NOT NULL field
        $this->Female->Required = true; // Required field
        $this->Female->Sortable = true; // Allow sort
        $this->Female->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['Female'] = &$this->Female;

        // malepropic
        $this->malepropic = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_malepropic', 'malepropic', '`malepropic`', '`malepropic`', 201, 450, -1, false, '`malepropic`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->malepropic->Sortable = true; // Allow sort
        $this->Fields['malepropic'] = &$this->malepropic;

        // femalepropic
        $this->femalepropic = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_femalepropic', 'femalepropic', '`femalepropic`', '`femalepropic`', 201, 450, -1, false, '`femalepropic`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->femalepropic->Sortable = true; // Allow sort
        $this->Fields['femalepropic'] = &$this->femalepropic;

        // HusbandEducation
        $this->HusbandEducation = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_HusbandEducation', 'HusbandEducation', '`HusbandEducation`', '`HusbandEducation`', 200, 45, -1, false, '`HusbandEducation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HusbandEducation->Sortable = true; // Allow sort
        $this->Fields['HusbandEducation'] = &$this->HusbandEducation;

        // WifeEducation
        $this->WifeEducation = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_WifeEducation', 'WifeEducation', '`WifeEducation`', '`WifeEducation`', 200, 45, -1, false, '`WifeEducation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->WifeEducation->Sortable = true; // Allow sort
        $this->Fields['WifeEducation'] = &$this->WifeEducation;

        // HusbandWorkHours
        $this->HusbandWorkHours = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_HusbandWorkHours', 'HusbandWorkHours', '`HusbandWorkHours`', '`HusbandWorkHours`', 200, 45, -1, false, '`HusbandWorkHours`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HusbandWorkHours->Sortable = true; // Allow sort
        $this->Fields['HusbandWorkHours'] = &$this->HusbandWorkHours;

        // WifeWorkHours
        $this->WifeWorkHours = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_WifeWorkHours', 'WifeWorkHours', '`WifeWorkHours`', '`WifeWorkHours`', 200, 45, -1, false, '`WifeWorkHours`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->WifeWorkHours->Sortable = true; // Allow sort
        $this->Fields['WifeWorkHours'] = &$this->WifeWorkHours;

        // PatientLanguage
        $this->PatientLanguage = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_PatientLanguage', 'PatientLanguage', '`PatientLanguage`', '`PatientLanguage`', 200, 45, -1, false, '`PatientLanguage`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientLanguage->Sortable = true; // Allow sort
        $this->Fields['PatientLanguage'] = &$this->PatientLanguage;

        // ReferedBy
        $this->ReferedBy = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_ReferedBy', 'ReferedBy', '`ReferedBy`', '`ReferedBy`', 200, 45, -1, false, '`ReferedBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReferedBy->Sortable = true; // Allow sort
        $this->Fields['ReferedBy'] = &$this->ReferedBy;

        // ReferPhNo
        $this->ReferPhNo = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_ReferPhNo', 'ReferPhNo', '`ReferPhNo`', '`ReferPhNo`', 200, 45, -1, false, '`ReferPhNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReferPhNo->Sortable = true; // Allow sort
        $this->Fields['ReferPhNo'] = &$this->ReferPhNo;

        // ARTCYCLE1
        $this->ARTCYCLE1 = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_ARTCYCLE1', 'ARTCYCLE1', '`ARTCYCLE1`', '`ARTCYCLE1`', 200, 45, -1, false, '`ARTCYCLE1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ARTCYCLE1->Sortable = true; // Allow sort
        $this->Fields['ARTCYCLE1'] = &$this->ARTCYCLE1;

        // RESULT1
        $this->RESULT1 = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_RESULT1', 'RESULT1', '`RESULT1`', '`RESULT1`', 200, 45, -1, false, '`RESULT1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RESULT1->Sortable = true; // Allow sort
        $this->Fields['RESULT1'] = &$this->RESULT1;

        // CoupleID
        $this->CoupleID = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_CoupleID', 'CoupleID', '`CoupleID`', '`CoupleID`', 200, 45, -1, false, '`CoupleID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CoupleID->Sortable = true; // Allow sort
        $this->Fields['CoupleID'] = &$this->CoupleID;

        // HospID
        $this->HospID = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
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
        } else {
            $fld->setSort("");
        }
    }

    // Table level SQL
    public function getSqlFrom() // From
    {
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_ivf_treatment`";
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
            $sql = $sql->resetQueryPart("orderBy")->getSQL();
        }
        $pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';
        // Skip Custom View / SubQuery / SELECT DISTINCT / ORDER BY
        if (
            ($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
            preg_match($pattern, $sql) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sql) &&
            !preg_match('/^\s*select\s+distinct\s+/i', $sql) && !preg_match('/\s+order\s+by\s+/i', $sql)
        ) {
            $sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sql);
        } else {
            $sqlwrk = "SELECT COUNT(*) FROM (" . $sql . ") COUNT_TABLE";
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
            $this->id1->setDbValue($conn->lastInsertId());
            $rs['id1'] = $this->id1->DbValue;
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
            if (array_key_exists('id1', $rs)) {
                AddFilter($where, QuotedName('id1', $this->Dbid) . '=' . QuotedValue($rs['id1'], $this->id1->DataType, $this->Dbid));
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
        $this->RIDNO->DbValue = $row['RIDNO'];
        $this->Name->DbValue = $row['Name'];
        $this->Age->DbValue = $row['Age'];
        $this->treatment_status->DbValue = $row['treatment_status'];
        $this->ARTCYCLE->DbValue = $row['ARTCYCLE'];
        $this->RESULT->DbValue = $row['RESULT'];
        $this->status->DbValue = $row['status'];
        $this->createdby->DbValue = $row['createdby'];
        $this->createddatetime->DbValue = $row['createddatetime'];
        $this->modifiedby->DbValue = $row['modifiedby'];
        $this->modifieddatetime->DbValue = $row['modifieddatetime'];
        $this->TreatmentStartDate->DbValue = $row['TreatmentStartDate'];
        $this->TreatementStopDate->DbValue = $row['TreatementStopDate'];
        $this->TypePatient->DbValue = $row['TypePatient'];
        $this->Treatment->DbValue = $row['Treatment'];
        $this->TreatmentTec->DbValue = $row['TreatmentTec'];
        $this->TypeOfCycle->DbValue = $row['TypeOfCycle'];
        $this->SpermOrgin->DbValue = $row['SpermOrgin'];
        $this->State->DbValue = $row['State'];
        $this->Origin->DbValue = $row['Origin'];
        $this->MACS->DbValue = $row['MACS'];
        $this->Technique->DbValue = $row['Technique'];
        $this->PgdPlanning->DbValue = $row['PgdPlanning'];
        $this->IMSI->DbValue = $row['IMSI'];
        $this->SequentialCulture->DbValue = $row['SequentialCulture'];
        $this->TimeLapse->DbValue = $row['TimeLapse'];
        $this->AH->DbValue = $row['AH'];
        $this->Weight->DbValue = $row['Weight'];
        $this->BMI->DbValue = $row['BMI'];
        $this->status1->DbValue = $row['status1'];
        $this->id1->DbValue = $row['id1'];
        $this->Male->DbValue = $row['Male'];
        $this->Female->DbValue = $row['Female'];
        $this->malepropic->DbValue = $row['malepropic'];
        $this->femalepropic->DbValue = $row['femalepropic'];
        $this->HusbandEducation->DbValue = $row['HusbandEducation'];
        $this->WifeEducation->DbValue = $row['WifeEducation'];
        $this->HusbandWorkHours->DbValue = $row['HusbandWorkHours'];
        $this->WifeWorkHours->DbValue = $row['WifeWorkHours'];
        $this->PatientLanguage->DbValue = $row['PatientLanguage'];
        $this->ReferedBy->DbValue = $row['ReferedBy'];
        $this->ReferPhNo->DbValue = $row['ReferPhNo'];
        $this->ARTCYCLE1->DbValue = $row['ARTCYCLE1'];
        $this->RESULT1->DbValue = $row['RESULT1'];
        $this->CoupleID->DbValue = $row['CoupleID'];
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
        return "`id` = @id@ AND `id1` = @id1@";
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
            $val = array_key_exists('id1', $row) ? $row['id1'] : null;
        } else {
            $val = $this->id1->OldValue !== null ? $this->id1->OldValue : $this->id1->CurrentValue;
        }
        if (!is_numeric($val)) {
            return "0=1"; // Invalid key
        }
        if ($val === null) {
            return "0=1"; // Invalid key
        } else {
            $keyFilter = str_replace("@id1@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
        }
        return $keyFilter;
    }

    // Return page URL
    public function getReturnUrl()
    {
        $name = PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL");
        // Get referer URL automatically
        if (ReferUrl() != "" && ReferPageName() != CurrentPageName() && ReferPageName() != "login") { // Referer not same page or login page
            $_SESSION[$name] = ReferUrl(); // Save to Session
        }
        if (@$_SESSION[$name] != "") {
            return $_SESSION[$name];
        } else {
            return GetUrl("ViewIvfTreatmentList");
        }
    }

    public function setReturnUrl($v)
    {
        $_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL")] = $v;
    }

    // Get modal caption
    public function getModalCaption($pageName)
    {
        global $Language;
        if ($pageName == "ViewIvfTreatmentView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewIvfTreatmentEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewIvfTreatmentAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewIvfTreatmentList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewIvfTreatmentView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewIvfTreatmentView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewIvfTreatmentAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewIvfTreatmentAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewIvfTreatmentEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewIvfTreatmentAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewIvfTreatmentDelete", $this->getUrlParm());
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
        $json .= ",id1:" . JsonEncode($this->id1->CurrentValue, "number");
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
        if ($this->id1->CurrentValue !== null) {
            $url .= "/" . rawurlencode($this->id1->CurrentValue);
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
            if (($keyValue = Param("id1") ?? Route("id1")) !== null) {
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
                if (!is_numeric($key[1])) { // id1
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
                $this->id1->CurrentValue = $key[1];
            } else {
                $this->id1->OldValue = $key[1];
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
        $this->RIDNO->setDbValue($row['RIDNO']);
        $this->Name->setDbValue($row['Name']);
        $this->Age->setDbValue($row['Age']);
        $this->treatment_status->setDbValue($row['treatment_status']);
        $this->ARTCYCLE->setDbValue($row['ARTCYCLE']);
        $this->RESULT->setDbValue($row['RESULT']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->TreatmentStartDate->setDbValue($row['TreatmentStartDate']);
        $this->TreatementStopDate->setDbValue($row['TreatementStopDate']);
        $this->TypePatient->setDbValue($row['TypePatient']);
        $this->Treatment->setDbValue($row['Treatment']);
        $this->TreatmentTec->setDbValue($row['TreatmentTec']);
        $this->TypeOfCycle->setDbValue($row['TypeOfCycle']);
        $this->SpermOrgin->setDbValue($row['SpermOrgin']);
        $this->State->setDbValue($row['State']);
        $this->Origin->setDbValue($row['Origin']);
        $this->MACS->setDbValue($row['MACS']);
        $this->Technique->setDbValue($row['Technique']);
        $this->PgdPlanning->setDbValue($row['PgdPlanning']);
        $this->IMSI->setDbValue($row['IMSI']);
        $this->SequentialCulture->setDbValue($row['SequentialCulture']);
        $this->TimeLapse->setDbValue($row['TimeLapse']);
        $this->AH->setDbValue($row['AH']);
        $this->Weight->setDbValue($row['Weight']);
        $this->BMI->setDbValue($row['BMI']);
        $this->status1->setDbValue($row['status1']);
        $this->id1->setDbValue($row['id1']);
        $this->Male->setDbValue($row['Male']);
        $this->Female->setDbValue($row['Female']);
        $this->malepropic->setDbValue($row['malepropic']);
        $this->femalepropic->setDbValue($row['femalepropic']);
        $this->HusbandEducation->setDbValue($row['HusbandEducation']);
        $this->WifeEducation->setDbValue($row['WifeEducation']);
        $this->HusbandWorkHours->setDbValue($row['HusbandWorkHours']);
        $this->WifeWorkHours->setDbValue($row['WifeWorkHours']);
        $this->PatientLanguage->setDbValue($row['PatientLanguage']);
        $this->ReferedBy->setDbValue($row['ReferedBy']);
        $this->ReferPhNo->setDbValue($row['ReferPhNo']);
        $this->ARTCYCLE1->setDbValue($row['ARTCYCLE1']);
        $this->RESULT1->setDbValue($row['RESULT1']);
        $this->CoupleID->setDbValue($row['CoupleID']);
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

        // RIDNO

        // Name

        // Age

        // treatment_status

        // ARTCYCLE

        // RESULT

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // TreatmentStartDate

        // TreatementStopDate

        // TypePatient

        // Treatment

        // TreatmentTec

        // TypeOfCycle

        // SpermOrgin

        // State

        // Origin

        // MACS

        // Technique

        // PgdPlanning

        // IMSI

        // SequentialCulture

        // TimeLapse

        // AH

        // Weight

        // BMI

        // status1

        // id1

        // Male

        // Female

        // malepropic

        // femalepropic

        // HusbandEducation

        // WifeEducation

        // HusbandWorkHours

        // WifeWorkHours

        // PatientLanguage

        // ReferedBy

        // ReferPhNo

        // ARTCYCLE1

        // RESULT1

        // CoupleID

        // HospID

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

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

        // treatment_status
        $this->treatment_status->ViewValue = $this->treatment_status->CurrentValue;
        $this->treatment_status->ViewCustomAttributes = "";

        // ARTCYCLE
        $this->ARTCYCLE->ViewValue = $this->ARTCYCLE->CurrentValue;
        $this->ARTCYCLE->ViewCustomAttributes = "";

        // RESULT
        $this->RESULT->ViewValue = $this->RESULT->CurrentValue;
        $this->RESULT->ViewCustomAttributes = "";

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

        // TreatmentStartDate
        $this->TreatmentStartDate->ViewValue = $this->TreatmentStartDate->CurrentValue;
        $this->TreatmentStartDate->ViewValue = FormatDateTime($this->TreatmentStartDate->ViewValue, 0);
        $this->TreatmentStartDate->ViewCustomAttributes = "";

        // TreatementStopDate
        $this->TreatementStopDate->ViewValue = $this->TreatementStopDate->CurrentValue;
        $this->TreatementStopDate->ViewValue = FormatDateTime($this->TreatementStopDate->ViewValue, 0);
        $this->TreatementStopDate->ViewCustomAttributes = "";

        // TypePatient
        $this->TypePatient->ViewValue = $this->TypePatient->CurrentValue;
        $this->TypePatient->ViewCustomAttributes = "";

        // Treatment
        $this->Treatment->ViewValue = $this->Treatment->CurrentValue;
        $this->Treatment->ViewCustomAttributes = "";

        // TreatmentTec
        $this->TreatmentTec->ViewValue = $this->TreatmentTec->CurrentValue;
        $this->TreatmentTec->ViewCustomAttributes = "";

        // TypeOfCycle
        $this->TypeOfCycle->ViewValue = $this->TypeOfCycle->CurrentValue;
        $this->TypeOfCycle->ViewCustomAttributes = "";

        // SpermOrgin
        $this->SpermOrgin->ViewValue = $this->SpermOrgin->CurrentValue;
        $this->SpermOrgin->ViewCustomAttributes = "";

        // State
        $this->State->ViewValue = $this->State->CurrentValue;
        $this->State->ViewCustomAttributes = "";

        // Origin
        $this->Origin->ViewValue = $this->Origin->CurrentValue;
        $this->Origin->ViewCustomAttributes = "";

        // MACS
        $this->MACS->ViewValue = $this->MACS->CurrentValue;
        $this->MACS->ViewCustomAttributes = "";

        // Technique
        $this->Technique->ViewValue = $this->Technique->CurrentValue;
        $this->Technique->ViewCustomAttributes = "";

        // PgdPlanning
        $this->PgdPlanning->ViewValue = $this->PgdPlanning->CurrentValue;
        $this->PgdPlanning->ViewCustomAttributes = "";

        // IMSI
        $this->IMSI->ViewValue = $this->IMSI->CurrentValue;
        $this->IMSI->ViewCustomAttributes = "";

        // SequentialCulture
        $this->SequentialCulture->ViewValue = $this->SequentialCulture->CurrentValue;
        $this->SequentialCulture->ViewCustomAttributes = "";

        // TimeLapse
        $this->TimeLapse->ViewValue = $this->TimeLapse->CurrentValue;
        $this->TimeLapse->ViewCustomAttributes = "";

        // AH
        $this->AH->ViewValue = $this->AH->CurrentValue;
        $this->AH->ViewCustomAttributes = "";

        // Weight
        $this->Weight->ViewValue = $this->Weight->CurrentValue;
        $this->Weight->ViewCustomAttributes = "";

        // BMI
        $this->BMI->ViewValue = $this->BMI->CurrentValue;
        $this->BMI->ViewCustomAttributes = "";

        // status1
        $this->status1->ViewValue = $this->status1->CurrentValue;
        $this->status1->ViewValue = FormatNumber($this->status1->ViewValue, 0, -2, -2, -2);
        $this->status1->ViewCustomAttributes = "";

        // id1
        $this->id1->ViewValue = $this->id1->CurrentValue;
        $this->id1->ViewCustomAttributes = "";

        // Male
        $this->Male->ViewValue = $this->Male->CurrentValue;
        $this->Male->ViewValue = FormatNumber($this->Male->ViewValue, 0, -2, -2, -2);
        $this->Male->ViewCustomAttributes = "";

        // Female
        $this->Female->ViewValue = $this->Female->CurrentValue;
        $this->Female->ViewValue = FormatNumber($this->Female->ViewValue, 0, -2, -2, -2);
        $this->Female->ViewCustomAttributes = "";

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

        // ARTCYCLE1
        $this->ARTCYCLE1->ViewValue = $this->ARTCYCLE1->CurrentValue;
        $this->ARTCYCLE1->ViewCustomAttributes = "";

        // RESULT1
        $this->RESULT1->ViewValue = $this->RESULT1->CurrentValue;
        $this->RESULT1->ViewCustomAttributes = "";

        // CoupleID
        $this->CoupleID->ViewValue = $this->CoupleID->CurrentValue;
        $this->CoupleID->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

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

        // treatment_status
        $this->treatment_status->LinkCustomAttributes = "";
        $this->treatment_status->HrefValue = "";
        $this->treatment_status->TooltipValue = "";

        // ARTCYCLE
        $this->ARTCYCLE->LinkCustomAttributes = "";
        $this->ARTCYCLE->HrefValue = "";
        $this->ARTCYCLE->TooltipValue = "";

        // RESULT
        $this->RESULT->LinkCustomAttributes = "";
        $this->RESULT->HrefValue = "";
        $this->RESULT->TooltipValue = "";

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

        // TreatmentStartDate
        $this->TreatmentStartDate->LinkCustomAttributes = "";
        $this->TreatmentStartDate->HrefValue = "";
        $this->TreatmentStartDate->TooltipValue = "";

        // TreatementStopDate
        $this->TreatementStopDate->LinkCustomAttributes = "";
        $this->TreatementStopDate->HrefValue = "";
        $this->TreatementStopDate->TooltipValue = "";

        // TypePatient
        $this->TypePatient->LinkCustomAttributes = "";
        $this->TypePatient->HrefValue = "";
        $this->TypePatient->TooltipValue = "";

        // Treatment
        $this->Treatment->LinkCustomAttributes = "";
        $this->Treatment->HrefValue = "";
        $this->Treatment->TooltipValue = "";

        // TreatmentTec
        $this->TreatmentTec->LinkCustomAttributes = "";
        $this->TreatmentTec->HrefValue = "";
        $this->TreatmentTec->TooltipValue = "";

        // TypeOfCycle
        $this->TypeOfCycle->LinkCustomAttributes = "";
        $this->TypeOfCycle->HrefValue = "";
        $this->TypeOfCycle->TooltipValue = "";

        // SpermOrgin
        $this->SpermOrgin->LinkCustomAttributes = "";
        $this->SpermOrgin->HrefValue = "";
        $this->SpermOrgin->TooltipValue = "";

        // State
        $this->State->LinkCustomAttributes = "";
        $this->State->HrefValue = "";
        $this->State->TooltipValue = "";

        // Origin
        $this->Origin->LinkCustomAttributes = "";
        $this->Origin->HrefValue = "";
        $this->Origin->TooltipValue = "";

        // MACS
        $this->MACS->LinkCustomAttributes = "";
        $this->MACS->HrefValue = "";
        $this->MACS->TooltipValue = "";

        // Technique
        $this->Technique->LinkCustomAttributes = "";
        $this->Technique->HrefValue = "";
        $this->Technique->TooltipValue = "";

        // PgdPlanning
        $this->PgdPlanning->LinkCustomAttributes = "";
        $this->PgdPlanning->HrefValue = "";
        $this->PgdPlanning->TooltipValue = "";

        // IMSI
        $this->IMSI->LinkCustomAttributes = "";
        $this->IMSI->HrefValue = "";
        $this->IMSI->TooltipValue = "";

        // SequentialCulture
        $this->SequentialCulture->LinkCustomAttributes = "";
        $this->SequentialCulture->HrefValue = "";
        $this->SequentialCulture->TooltipValue = "";

        // TimeLapse
        $this->TimeLapse->LinkCustomAttributes = "";
        $this->TimeLapse->HrefValue = "";
        $this->TimeLapse->TooltipValue = "";

        // AH
        $this->AH->LinkCustomAttributes = "";
        $this->AH->HrefValue = "";
        $this->AH->TooltipValue = "";

        // Weight
        $this->Weight->LinkCustomAttributes = "";
        $this->Weight->HrefValue = "";
        $this->Weight->TooltipValue = "";

        // BMI
        $this->BMI->LinkCustomAttributes = "";
        $this->BMI->HrefValue = "";
        $this->BMI->TooltipValue = "";

        // status1
        $this->status1->LinkCustomAttributes = "";
        $this->status1->HrefValue = "";
        $this->status1->TooltipValue = "";

        // id1
        $this->id1->LinkCustomAttributes = "";
        $this->id1->HrefValue = "";
        $this->id1->TooltipValue = "";

        // Male
        $this->Male->LinkCustomAttributes = "";
        $this->Male->HrefValue = "";
        $this->Male->TooltipValue = "";

        // Female
        $this->Female->LinkCustomAttributes = "";
        $this->Female->HrefValue = "";
        $this->Female->TooltipValue = "";

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

        // ARTCYCLE1
        $this->ARTCYCLE1->LinkCustomAttributes = "";
        $this->ARTCYCLE1->HrefValue = "";
        $this->ARTCYCLE1->TooltipValue = "";

        // RESULT1
        $this->RESULT1->LinkCustomAttributes = "";
        $this->RESULT1->HrefValue = "";
        $this->RESULT1->TooltipValue = "";

        // CoupleID
        $this->CoupleID->LinkCustomAttributes = "";
        $this->CoupleID->HrefValue = "";
        $this->CoupleID->TooltipValue = "";

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

        // treatment_status
        $this->treatment_status->EditAttrs["class"] = "form-control";
        $this->treatment_status->EditCustomAttributes = "";
        if (!$this->treatment_status->Raw) {
            $this->treatment_status->CurrentValue = HtmlDecode($this->treatment_status->CurrentValue);
        }
        $this->treatment_status->EditValue = $this->treatment_status->CurrentValue;
        $this->treatment_status->PlaceHolder = RemoveHtml($this->treatment_status->caption());

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

        // TreatmentStartDate
        $this->TreatmentStartDate->EditAttrs["class"] = "form-control";
        $this->TreatmentStartDate->EditCustomAttributes = "";
        $this->TreatmentStartDate->EditValue = FormatDateTime($this->TreatmentStartDate->CurrentValue, 8);
        $this->TreatmentStartDate->PlaceHolder = RemoveHtml($this->TreatmentStartDate->caption());

        // TreatementStopDate
        $this->TreatementStopDate->EditAttrs["class"] = "form-control";
        $this->TreatementStopDate->EditCustomAttributes = "";
        $this->TreatementStopDate->EditValue = FormatDateTime($this->TreatementStopDate->CurrentValue, 8);
        $this->TreatementStopDate->PlaceHolder = RemoveHtml($this->TreatementStopDate->caption());

        // TypePatient
        $this->TypePatient->EditAttrs["class"] = "form-control";
        $this->TypePatient->EditCustomAttributes = "";
        if (!$this->TypePatient->Raw) {
            $this->TypePatient->CurrentValue = HtmlDecode($this->TypePatient->CurrentValue);
        }
        $this->TypePatient->EditValue = $this->TypePatient->CurrentValue;
        $this->TypePatient->PlaceHolder = RemoveHtml($this->TypePatient->caption());

        // Treatment
        $this->Treatment->EditAttrs["class"] = "form-control";
        $this->Treatment->EditCustomAttributes = "";
        if (!$this->Treatment->Raw) {
            $this->Treatment->CurrentValue = HtmlDecode($this->Treatment->CurrentValue);
        }
        $this->Treatment->EditValue = $this->Treatment->CurrentValue;
        $this->Treatment->PlaceHolder = RemoveHtml($this->Treatment->caption());

        // TreatmentTec
        $this->TreatmentTec->EditAttrs["class"] = "form-control";
        $this->TreatmentTec->EditCustomAttributes = "";
        if (!$this->TreatmentTec->Raw) {
            $this->TreatmentTec->CurrentValue = HtmlDecode($this->TreatmentTec->CurrentValue);
        }
        $this->TreatmentTec->EditValue = $this->TreatmentTec->CurrentValue;
        $this->TreatmentTec->PlaceHolder = RemoveHtml($this->TreatmentTec->caption());

        // TypeOfCycle
        $this->TypeOfCycle->EditAttrs["class"] = "form-control";
        $this->TypeOfCycle->EditCustomAttributes = "";
        if (!$this->TypeOfCycle->Raw) {
            $this->TypeOfCycle->CurrentValue = HtmlDecode($this->TypeOfCycle->CurrentValue);
        }
        $this->TypeOfCycle->EditValue = $this->TypeOfCycle->CurrentValue;
        $this->TypeOfCycle->PlaceHolder = RemoveHtml($this->TypeOfCycle->caption());

        // SpermOrgin
        $this->SpermOrgin->EditAttrs["class"] = "form-control";
        $this->SpermOrgin->EditCustomAttributes = "";
        if (!$this->SpermOrgin->Raw) {
            $this->SpermOrgin->CurrentValue = HtmlDecode($this->SpermOrgin->CurrentValue);
        }
        $this->SpermOrgin->EditValue = $this->SpermOrgin->CurrentValue;
        $this->SpermOrgin->PlaceHolder = RemoveHtml($this->SpermOrgin->caption());

        // State
        $this->State->EditAttrs["class"] = "form-control";
        $this->State->EditCustomAttributes = "";
        if (!$this->State->Raw) {
            $this->State->CurrentValue = HtmlDecode($this->State->CurrentValue);
        }
        $this->State->EditValue = $this->State->CurrentValue;
        $this->State->PlaceHolder = RemoveHtml($this->State->caption());

        // Origin
        $this->Origin->EditAttrs["class"] = "form-control";
        $this->Origin->EditCustomAttributes = "";
        if (!$this->Origin->Raw) {
            $this->Origin->CurrentValue = HtmlDecode($this->Origin->CurrentValue);
        }
        $this->Origin->EditValue = $this->Origin->CurrentValue;
        $this->Origin->PlaceHolder = RemoveHtml($this->Origin->caption());

        // MACS
        $this->MACS->EditAttrs["class"] = "form-control";
        $this->MACS->EditCustomAttributes = "";
        if (!$this->MACS->Raw) {
            $this->MACS->CurrentValue = HtmlDecode($this->MACS->CurrentValue);
        }
        $this->MACS->EditValue = $this->MACS->CurrentValue;
        $this->MACS->PlaceHolder = RemoveHtml($this->MACS->caption());

        // Technique
        $this->Technique->EditAttrs["class"] = "form-control";
        $this->Technique->EditCustomAttributes = "";
        if (!$this->Technique->Raw) {
            $this->Technique->CurrentValue = HtmlDecode($this->Technique->CurrentValue);
        }
        $this->Technique->EditValue = $this->Technique->CurrentValue;
        $this->Technique->PlaceHolder = RemoveHtml($this->Technique->caption());

        // PgdPlanning
        $this->PgdPlanning->EditAttrs["class"] = "form-control";
        $this->PgdPlanning->EditCustomAttributes = "";
        if (!$this->PgdPlanning->Raw) {
            $this->PgdPlanning->CurrentValue = HtmlDecode($this->PgdPlanning->CurrentValue);
        }
        $this->PgdPlanning->EditValue = $this->PgdPlanning->CurrentValue;
        $this->PgdPlanning->PlaceHolder = RemoveHtml($this->PgdPlanning->caption());

        // IMSI
        $this->IMSI->EditAttrs["class"] = "form-control";
        $this->IMSI->EditCustomAttributes = "";
        if (!$this->IMSI->Raw) {
            $this->IMSI->CurrentValue = HtmlDecode($this->IMSI->CurrentValue);
        }
        $this->IMSI->EditValue = $this->IMSI->CurrentValue;
        $this->IMSI->PlaceHolder = RemoveHtml($this->IMSI->caption());

        // SequentialCulture
        $this->SequentialCulture->EditAttrs["class"] = "form-control";
        $this->SequentialCulture->EditCustomAttributes = "";
        if (!$this->SequentialCulture->Raw) {
            $this->SequentialCulture->CurrentValue = HtmlDecode($this->SequentialCulture->CurrentValue);
        }
        $this->SequentialCulture->EditValue = $this->SequentialCulture->CurrentValue;
        $this->SequentialCulture->PlaceHolder = RemoveHtml($this->SequentialCulture->caption());

        // TimeLapse
        $this->TimeLapse->EditAttrs["class"] = "form-control";
        $this->TimeLapse->EditCustomAttributes = "";
        if (!$this->TimeLapse->Raw) {
            $this->TimeLapse->CurrentValue = HtmlDecode($this->TimeLapse->CurrentValue);
        }
        $this->TimeLapse->EditValue = $this->TimeLapse->CurrentValue;
        $this->TimeLapse->PlaceHolder = RemoveHtml($this->TimeLapse->caption());

        // AH
        $this->AH->EditAttrs["class"] = "form-control";
        $this->AH->EditCustomAttributes = "";
        if (!$this->AH->Raw) {
            $this->AH->CurrentValue = HtmlDecode($this->AH->CurrentValue);
        }
        $this->AH->EditValue = $this->AH->CurrentValue;
        $this->AH->PlaceHolder = RemoveHtml($this->AH->caption());

        // Weight
        $this->Weight->EditAttrs["class"] = "form-control";
        $this->Weight->EditCustomAttributes = "";
        if (!$this->Weight->Raw) {
            $this->Weight->CurrentValue = HtmlDecode($this->Weight->CurrentValue);
        }
        $this->Weight->EditValue = $this->Weight->CurrentValue;
        $this->Weight->PlaceHolder = RemoveHtml($this->Weight->caption());

        // BMI
        $this->BMI->EditAttrs["class"] = "form-control";
        $this->BMI->EditCustomAttributes = "";
        if (!$this->BMI->Raw) {
            $this->BMI->CurrentValue = HtmlDecode($this->BMI->CurrentValue);
        }
        $this->BMI->EditValue = $this->BMI->CurrentValue;
        $this->BMI->PlaceHolder = RemoveHtml($this->BMI->caption());

        // status1
        $this->status1->EditAttrs["class"] = "form-control";
        $this->status1->EditCustomAttributes = "";
        $this->status1->EditValue = $this->status1->CurrentValue;
        $this->status1->PlaceHolder = RemoveHtml($this->status1->caption());

        // id1
        $this->id1->EditAttrs["class"] = "form-control";
        $this->id1->EditCustomAttributes = "";
        $this->id1->EditValue = $this->id1->CurrentValue;
        $this->id1->ViewCustomAttributes = "";

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

        // ARTCYCLE1
        $this->ARTCYCLE1->EditAttrs["class"] = "form-control";
        $this->ARTCYCLE1->EditCustomAttributes = "";
        if (!$this->ARTCYCLE1->Raw) {
            $this->ARTCYCLE1->CurrentValue = HtmlDecode($this->ARTCYCLE1->CurrentValue);
        }
        $this->ARTCYCLE1->EditValue = $this->ARTCYCLE1->CurrentValue;
        $this->ARTCYCLE1->PlaceHolder = RemoveHtml($this->ARTCYCLE1->caption());

        // RESULT1
        $this->RESULT1->EditAttrs["class"] = "form-control";
        $this->RESULT1->EditCustomAttributes = "";
        if (!$this->RESULT1->Raw) {
            $this->RESULT1->CurrentValue = HtmlDecode($this->RESULT1->CurrentValue);
        }
        $this->RESULT1->EditValue = $this->RESULT1->CurrentValue;
        $this->RESULT1->PlaceHolder = RemoveHtml($this->RESULT1->caption());

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
                    $doc->exportCaption($this->RIDNO);
                    $doc->exportCaption($this->Name);
                    $doc->exportCaption($this->Age);
                    $doc->exportCaption($this->treatment_status);
                    $doc->exportCaption($this->ARTCYCLE);
                    $doc->exportCaption($this->RESULT);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->TreatmentStartDate);
                    $doc->exportCaption($this->TreatementStopDate);
                    $doc->exportCaption($this->TypePatient);
                    $doc->exportCaption($this->Treatment);
                    $doc->exportCaption($this->TreatmentTec);
                    $doc->exportCaption($this->TypeOfCycle);
                    $doc->exportCaption($this->SpermOrgin);
                    $doc->exportCaption($this->State);
                    $doc->exportCaption($this->Origin);
                    $doc->exportCaption($this->MACS);
                    $doc->exportCaption($this->Technique);
                    $doc->exportCaption($this->PgdPlanning);
                    $doc->exportCaption($this->IMSI);
                    $doc->exportCaption($this->SequentialCulture);
                    $doc->exportCaption($this->TimeLapse);
                    $doc->exportCaption($this->AH);
                    $doc->exportCaption($this->Weight);
                    $doc->exportCaption($this->BMI);
                    $doc->exportCaption($this->status1);
                    $doc->exportCaption($this->id1);
                    $doc->exportCaption($this->Male);
                    $doc->exportCaption($this->Female);
                    $doc->exportCaption($this->malepropic);
                    $doc->exportCaption($this->femalepropic);
                    $doc->exportCaption($this->HusbandEducation);
                    $doc->exportCaption($this->WifeEducation);
                    $doc->exportCaption($this->HusbandWorkHours);
                    $doc->exportCaption($this->WifeWorkHours);
                    $doc->exportCaption($this->PatientLanguage);
                    $doc->exportCaption($this->ReferedBy);
                    $doc->exportCaption($this->ReferPhNo);
                    $doc->exportCaption($this->ARTCYCLE1);
                    $doc->exportCaption($this->RESULT1);
                    $doc->exportCaption($this->CoupleID);
                    $doc->exportCaption($this->HospID);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->RIDNO);
                    $doc->exportCaption($this->Name);
                    $doc->exportCaption($this->Age);
                    $doc->exportCaption($this->treatment_status);
                    $doc->exportCaption($this->ARTCYCLE);
                    $doc->exportCaption($this->RESULT);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->TreatmentStartDate);
                    $doc->exportCaption($this->TreatementStopDate);
                    $doc->exportCaption($this->TypePatient);
                    $doc->exportCaption($this->Treatment);
                    $doc->exportCaption($this->TreatmentTec);
                    $doc->exportCaption($this->TypeOfCycle);
                    $doc->exportCaption($this->SpermOrgin);
                    $doc->exportCaption($this->State);
                    $doc->exportCaption($this->Origin);
                    $doc->exportCaption($this->MACS);
                    $doc->exportCaption($this->Technique);
                    $doc->exportCaption($this->PgdPlanning);
                    $doc->exportCaption($this->IMSI);
                    $doc->exportCaption($this->SequentialCulture);
                    $doc->exportCaption($this->TimeLapse);
                    $doc->exportCaption($this->AH);
                    $doc->exportCaption($this->Weight);
                    $doc->exportCaption($this->BMI);
                    $doc->exportCaption($this->status1);
                    $doc->exportCaption($this->id1);
                    $doc->exportCaption($this->Male);
                    $doc->exportCaption($this->Female);
                    $doc->exportCaption($this->HusbandEducation);
                    $doc->exportCaption($this->WifeEducation);
                    $doc->exportCaption($this->HusbandWorkHours);
                    $doc->exportCaption($this->WifeWorkHours);
                    $doc->exportCaption($this->PatientLanguage);
                    $doc->exportCaption($this->ReferedBy);
                    $doc->exportCaption($this->ReferPhNo);
                    $doc->exportCaption($this->ARTCYCLE1);
                    $doc->exportCaption($this->RESULT1);
                    $doc->exportCaption($this->CoupleID);
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
                        $doc->exportField($this->RIDNO);
                        $doc->exportField($this->Name);
                        $doc->exportField($this->Age);
                        $doc->exportField($this->treatment_status);
                        $doc->exportField($this->ARTCYCLE);
                        $doc->exportField($this->RESULT);
                        $doc->exportField($this->status);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->TreatmentStartDate);
                        $doc->exportField($this->TreatementStopDate);
                        $doc->exportField($this->TypePatient);
                        $doc->exportField($this->Treatment);
                        $doc->exportField($this->TreatmentTec);
                        $doc->exportField($this->TypeOfCycle);
                        $doc->exportField($this->SpermOrgin);
                        $doc->exportField($this->State);
                        $doc->exportField($this->Origin);
                        $doc->exportField($this->MACS);
                        $doc->exportField($this->Technique);
                        $doc->exportField($this->PgdPlanning);
                        $doc->exportField($this->IMSI);
                        $doc->exportField($this->SequentialCulture);
                        $doc->exportField($this->TimeLapse);
                        $doc->exportField($this->AH);
                        $doc->exportField($this->Weight);
                        $doc->exportField($this->BMI);
                        $doc->exportField($this->status1);
                        $doc->exportField($this->id1);
                        $doc->exportField($this->Male);
                        $doc->exportField($this->Female);
                        $doc->exportField($this->malepropic);
                        $doc->exportField($this->femalepropic);
                        $doc->exportField($this->HusbandEducation);
                        $doc->exportField($this->WifeEducation);
                        $doc->exportField($this->HusbandWorkHours);
                        $doc->exportField($this->WifeWorkHours);
                        $doc->exportField($this->PatientLanguage);
                        $doc->exportField($this->ReferedBy);
                        $doc->exportField($this->ReferPhNo);
                        $doc->exportField($this->ARTCYCLE1);
                        $doc->exportField($this->RESULT1);
                        $doc->exportField($this->CoupleID);
                        $doc->exportField($this->HospID);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->RIDNO);
                        $doc->exportField($this->Name);
                        $doc->exportField($this->Age);
                        $doc->exportField($this->treatment_status);
                        $doc->exportField($this->ARTCYCLE);
                        $doc->exportField($this->RESULT);
                        $doc->exportField($this->status);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->TreatmentStartDate);
                        $doc->exportField($this->TreatementStopDate);
                        $doc->exportField($this->TypePatient);
                        $doc->exportField($this->Treatment);
                        $doc->exportField($this->TreatmentTec);
                        $doc->exportField($this->TypeOfCycle);
                        $doc->exportField($this->SpermOrgin);
                        $doc->exportField($this->State);
                        $doc->exportField($this->Origin);
                        $doc->exportField($this->MACS);
                        $doc->exportField($this->Technique);
                        $doc->exportField($this->PgdPlanning);
                        $doc->exportField($this->IMSI);
                        $doc->exportField($this->SequentialCulture);
                        $doc->exportField($this->TimeLapse);
                        $doc->exportField($this->AH);
                        $doc->exportField($this->Weight);
                        $doc->exportField($this->BMI);
                        $doc->exportField($this->status1);
                        $doc->exportField($this->id1);
                        $doc->exportField($this->Male);
                        $doc->exportField($this->Female);
                        $doc->exportField($this->HusbandEducation);
                        $doc->exportField($this->WifeEducation);
                        $doc->exportField($this->HusbandWorkHours);
                        $doc->exportField($this->WifeWorkHours);
                        $doc->exportField($this->PatientLanguage);
                        $doc->exportField($this->ReferedBy);
                        $doc->exportField($this->ReferPhNo);
                        $doc->exportField($this->ARTCYCLE1);
                        $doc->exportField($this->RESULT1);
                        $doc->exportField($this->CoupleID);
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
