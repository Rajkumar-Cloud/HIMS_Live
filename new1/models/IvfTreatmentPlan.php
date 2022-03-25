<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for ivf_treatment_plan
 */
class IvfTreatmentPlan extends DbTable
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
    public $MaleIndications;
    public $FemaleIndications;
    public $UseOfThe;
    public $Ectopic;
    public $Heterotopic;
    public $TransferDFE;
    public $Evolutive;
    public $Number;
    public $SequentialCult;
    public $TineLapse;
    public $PatientName;
    public $PatientID;
    public $PartnerName;
    public $PartnerID;
    public $WifeCell;
    public $HusbandCell;
    public $CoupleID;
    public $IVFCycleNO;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'ivf_treatment_plan';
        $this->TableName = 'ivf_treatment_plan';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`ivf_treatment_plan`";
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
        $this->id = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['id'] = &$this->id;

        // RIDNO
        $this->RIDNO = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_RIDNO', 'RIDNO', '`RIDNO`', '`RIDNO`', 3, 11, -1, false, '`RIDNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RIDNO->Sortable = true; // Allow sort
        $this->RIDNO->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['RIDNO'] = &$this->RIDNO;

        // Name
        $this->Name = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_Name', 'Name', '`Name`', '`Name`', 200, 45, -1, false, '`Name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Name->Sortable = true; // Allow sort
        $this->Fields['Name'] = &$this->Name;

        // Age
        $this->Age = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_Age', 'Age', '`Age`', '`Age`', 200, 45, -1, false, '`Age`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Age->Sortable = true; // Allow sort
        $this->Fields['Age'] = &$this->Age;

        // treatment_status
        $this->treatment_status = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_treatment_status', 'treatment_status', '`treatment_status`', '`treatment_status`', 200, 45, -1, false, '`treatment_status`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->treatment_status->Sortable = true; // Allow sort
        $this->Fields['treatment_status'] = &$this->treatment_status;

        // ARTCYCLE
        $this->ARTCYCLE = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_ARTCYCLE', 'ARTCYCLE', '`ARTCYCLE`', '`ARTCYCLE`', 200, 45, -1, false, '`ARTCYCLE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ARTCYCLE->Sortable = true; // Allow sort
        $this->Fields['ARTCYCLE'] = &$this->ARTCYCLE;

        // RESULT
        $this->RESULT = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_RESULT', 'RESULT', '`RESULT`', '`RESULT`', 200, 45, -1, false, '`RESULT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RESULT->Sortable = true; // Allow sort
        $this->Fields['RESULT'] = &$this->RESULT;

        // status
        $this->status = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_status', 'status', '`status`', '`status`', 3, 11, -1, false, '`status`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->status->Sortable = true; // Allow sort
        $this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['status'] = &$this->status;

        // createdby
        $this->createdby = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, 11, -1, false, '`createdby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdby->Sortable = true; // Allow sort
        $this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['createdby'] = &$this->createdby;

        // createddatetime
        $this->createddatetime = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, false, '`createddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddatetime->Sortable = true; // Allow sort
        $this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['createddatetime'] = &$this->createddatetime;

        // modifiedby
        $this->modifiedby = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, 11, -1, false, '`modifiedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifiedby->Sortable = true; // Allow sort
        $this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['modifiedby'] = &$this->modifiedby;

        // modifieddatetime
        $this->modifieddatetime = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, false, '`modifieddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifieddatetime->Sortable = true; // Allow sort
        $this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['modifieddatetime'] = &$this->modifieddatetime;

        // TreatmentStartDate
        $this->TreatmentStartDate = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_TreatmentStartDate', 'TreatmentStartDate', '`TreatmentStartDate`', CastDateFieldForLike("`TreatmentStartDate`", 0, "DB"), 135, 19, 0, false, '`TreatmentStartDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TreatmentStartDate->Sortable = true; // Allow sort
        $this->TreatmentStartDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['TreatmentStartDate'] = &$this->TreatmentStartDate;

        // TreatementStopDate
        $this->TreatementStopDate = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_TreatementStopDate', 'TreatementStopDate', '`TreatementStopDate`', CastDateFieldForLike("`TreatementStopDate`", 0, "DB"), 135, 19, 0, false, '`TreatementStopDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TreatementStopDate->Sortable = true; // Allow sort
        $this->TreatementStopDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['TreatementStopDate'] = &$this->TreatementStopDate;

        // TypePatient
        $this->TypePatient = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_TypePatient', 'TypePatient', '`TypePatient`', '`TypePatient`', 200, 45, -1, false, '`TypePatient`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TypePatient->Sortable = true; // Allow sort
        $this->Fields['TypePatient'] = &$this->TypePatient;

        // Treatment
        $this->Treatment = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_Treatment', 'Treatment', '`Treatment`', '`Treatment`', 200, 45, -1, false, '`Treatment`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Treatment->Sortable = true; // Allow sort
        $this->Fields['Treatment'] = &$this->Treatment;

        // TreatmentTec
        $this->TreatmentTec = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_TreatmentTec', 'TreatmentTec', '`TreatmentTec`', '`TreatmentTec`', 200, 45, -1, false, '`TreatmentTec`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TreatmentTec->Sortable = true; // Allow sort
        $this->Fields['TreatmentTec'] = &$this->TreatmentTec;

        // TypeOfCycle
        $this->TypeOfCycle = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_TypeOfCycle', 'TypeOfCycle', '`TypeOfCycle`', '`TypeOfCycle`', 200, 45, -1, false, '`TypeOfCycle`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TypeOfCycle->Sortable = true; // Allow sort
        $this->Fields['TypeOfCycle'] = &$this->TypeOfCycle;

        // SpermOrgin
        $this->SpermOrgin = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_SpermOrgin', 'SpermOrgin', '`SpermOrgin`', '`SpermOrgin`', 200, 45, -1, false, '`SpermOrgin`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SpermOrgin->Sortable = true; // Allow sort
        $this->Fields['SpermOrgin'] = &$this->SpermOrgin;

        // State
        $this->State = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_State', 'State', '`State`', '`State`', 200, 45, -1, false, '`State`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->State->Sortable = true; // Allow sort
        $this->Fields['State'] = &$this->State;

        // Origin
        $this->Origin = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_Origin', 'Origin', '`Origin`', '`Origin`', 200, 45, -1, false, '`Origin`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Origin->Sortable = true; // Allow sort
        $this->Fields['Origin'] = &$this->Origin;

        // MACS
        $this->MACS = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_MACS', 'MACS', '`MACS`', '`MACS`', 200, 45, -1, false, '`MACS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MACS->Sortable = true; // Allow sort
        $this->Fields['MACS'] = &$this->MACS;

        // Technique
        $this->Technique = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_Technique', 'Technique', '`Technique`', '`Technique`', 200, 45, -1, false, '`Technique`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Technique->Sortable = true; // Allow sort
        $this->Fields['Technique'] = &$this->Technique;

        // PgdPlanning
        $this->PgdPlanning = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_PgdPlanning', 'PgdPlanning', '`PgdPlanning`', '`PgdPlanning`', 200, 45, -1, false, '`PgdPlanning`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PgdPlanning->Sortable = true; // Allow sort
        $this->Fields['PgdPlanning'] = &$this->PgdPlanning;

        // IMSI
        $this->IMSI = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_IMSI', 'IMSI', '`IMSI`', '`IMSI`', 200, 45, -1, false, '`IMSI`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IMSI->Sortable = true; // Allow sort
        $this->Fields['IMSI'] = &$this->IMSI;

        // SequentialCulture
        $this->SequentialCulture = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_SequentialCulture', 'SequentialCulture', '`SequentialCulture`', '`SequentialCulture`', 200, 45, -1, false, '`SequentialCulture`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SequentialCulture->Sortable = true; // Allow sort
        $this->Fields['SequentialCulture'] = &$this->SequentialCulture;

        // TimeLapse
        $this->TimeLapse = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_TimeLapse', 'TimeLapse', '`TimeLapse`', '`TimeLapse`', 200, 45, -1, false, '`TimeLapse`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TimeLapse->Sortable = true; // Allow sort
        $this->Fields['TimeLapse'] = &$this->TimeLapse;

        // AH
        $this->AH = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_AH', 'AH', '`AH`', '`AH`', 200, 45, -1, false, '`AH`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AH->Sortable = true; // Allow sort
        $this->Fields['AH'] = &$this->AH;

        // Weight
        $this->Weight = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_Weight', 'Weight', '`Weight`', '`Weight`', 200, 45, -1, false, '`Weight`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Weight->Sortable = true; // Allow sort
        $this->Fields['Weight'] = &$this->Weight;

        // BMI
        $this->BMI = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_BMI', 'BMI', '`BMI`', '`BMI`', 200, 45, -1, false, '`BMI`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BMI->Sortable = true; // Allow sort
        $this->Fields['BMI'] = &$this->BMI;

        // MaleIndications
        $this->MaleIndications = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_MaleIndications', 'MaleIndications', '`MaleIndications`', '`MaleIndications`', 200, 45, -1, false, '`MaleIndications`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MaleIndications->Sortable = true; // Allow sort
        $this->Fields['MaleIndications'] = &$this->MaleIndications;

        // FemaleIndications
        $this->FemaleIndications = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_FemaleIndications', 'FemaleIndications', '`FemaleIndications`', '`FemaleIndications`', 200, 45, -1, false, '`FemaleIndications`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FemaleIndications->Sortable = true; // Allow sort
        $this->Fields['FemaleIndications'] = &$this->FemaleIndications;

        // UseOfThe
        $this->UseOfThe = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_UseOfThe', 'UseOfThe', '`UseOfThe`', '`UseOfThe`', 200, 45, -1, false, '`UseOfThe`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->UseOfThe->Sortable = true; // Allow sort
        $this->Fields['UseOfThe'] = &$this->UseOfThe;

        // Ectopic
        $this->Ectopic = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_Ectopic', 'Ectopic', '`Ectopic`', '`Ectopic`', 200, 45, -1, false, '`Ectopic`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Ectopic->Sortable = true; // Allow sort
        $this->Fields['Ectopic'] = &$this->Ectopic;

        // Heterotopic
        $this->Heterotopic = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_Heterotopic', 'Heterotopic', '`Heterotopic`', '`Heterotopic`', 200, 45, -1, false, '`Heterotopic`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Heterotopic->Sortable = true; // Allow sort
        $this->Fields['Heterotopic'] = &$this->Heterotopic;

        // TransferDFE
        $this->TransferDFE = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_TransferDFE', 'TransferDFE', '`TransferDFE`', '`TransferDFE`', 200, 45, -1, false, '`TransferDFE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TransferDFE->Sortable = true; // Allow sort
        $this->Fields['TransferDFE'] = &$this->TransferDFE;

        // Evolutive
        $this->Evolutive = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_Evolutive', 'Evolutive', '`Evolutive`', '`Evolutive`', 200, 45, -1, false, '`Evolutive`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Evolutive->Sortable = true; // Allow sort
        $this->Fields['Evolutive'] = &$this->Evolutive;

        // Number
        $this->Number = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_Number', 'Number', '`Number`', '`Number`', 200, 45, -1, false, '`Number`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Number->Sortable = true; // Allow sort
        $this->Fields['Number'] = &$this->Number;

        // SequentialCult
        $this->SequentialCult = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_SequentialCult', 'SequentialCult', '`SequentialCult`', '`SequentialCult`', 200, 45, -1, false, '`SequentialCult`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SequentialCult->Sortable = true; // Allow sort
        $this->Fields['SequentialCult'] = &$this->SequentialCult;

        // TineLapse
        $this->TineLapse = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_TineLapse', 'TineLapse', '`TineLapse`', '`TineLapse`', 200, 45, -1, false, '`TineLapse`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TineLapse->Sortable = true; // Allow sort
        $this->Fields['TineLapse'] = &$this->TineLapse;

        // PatientName
        $this->PatientName = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, false, '`PatientName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientName->Sortable = true; // Allow sort
        $this->Fields['PatientName'] = &$this->PatientName;

        // PatientID
        $this->PatientID = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_PatientID', 'PatientID', '`PatientID`', '`PatientID`', 200, 45, -1, false, '`PatientID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientID->Sortable = true; // Allow sort
        $this->Fields['PatientID'] = &$this->PatientID;

        // PartnerName
        $this->PartnerName = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_PartnerName', 'PartnerName', '`PartnerName`', '`PartnerName`', 200, 45, -1, false, '`PartnerName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PartnerName->Sortable = true; // Allow sort
        $this->Fields['PartnerName'] = &$this->PartnerName;

        // PartnerID
        $this->PartnerID = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_PartnerID', 'PartnerID', '`PartnerID`', '`PartnerID`', 200, 45, -1, false, '`PartnerID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PartnerID->Sortable = true; // Allow sort
        $this->Fields['PartnerID'] = &$this->PartnerID;

        // WifeCell
        $this->WifeCell = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_WifeCell', 'WifeCell', '`WifeCell`', '`WifeCell`', 200, 45, -1, false, '`WifeCell`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->WifeCell->Sortable = true; // Allow sort
        $this->Fields['WifeCell'] = &$this->WifeCell;

        // HusbandCell
        $this->HusbandCell = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_HusbandCell', 'HusbandCell', '`HusbandCell`', '`HusbandCell`', 200, 45, -1, false, '`HusbandCell`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HusbandCell->Sortable = true; // Allow sort
        $this->Fields['HusbandCell'] = &$this->HusbandCell;

        // CoupleID
        $this->CoupleID = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_CoupleID', 'CoupleID', '`CoupleID`', '`CoupleID`', 200, 45, -1, false, '`CoupleID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CoupleID->Sortable = true; // Allow sort
        $this->Fields['CoupleID'] = &$this->CoupleID;

        // IVFCycleNO
        $this->IVFCycleNO = new DbField('ivf_treatment_plan', 'ivf_treatment_plan', 'x_IVFCycleNO', 'IVFCycleNO', '`IVFCycleNO`', '`IVFCycleNO`', 200, 45, -1, false, '`IVFCycleNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IVFCycleNO->Sortable = true; // Allow sort
        $this->Fields['IVFCycleNO'] = &$this->IVFCycleNO;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`ivf_treatment_plan`";
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
        $this->MaleIndications->DbValue = $row['MaleIndications'];
        $this->FemaleIndications->DbValue = $row['FemaleIndications'];
        $this->UseOfThe->DbValue = $row['UseOfThe'];
        $this->Ectopic->DbValue = $row['Ectopic'];
        $this->Heterotopic->DbValue = $row['Heterotopic'];
        $this->TransferDFE->DbValue = $row['TransferDFE'];
        $this->Evolutive->DbValue = $row['Evolutive'];
        $this->Number->DbValue = $row['Number'];
        $this->SequentialCult->DbValue = $row['SequentialCult'];
        $this->TineLapse->DbValue = $row['TineLapse'];
        $this->PatientName->DbValue = $row['PatientName'];
        $this->PatientID->DbValue = $row['PatientID'];
        $this->PartnerName->DbValue = $row['PartnerName'];
        $this->PartnerID->DbValue = $row['PartnerID'];
        $this->WifeCell->DbValue = $row['WifeCell'];
        $this->HusbandCell->DbValue = $row['HusbandCell'];
        $this->CoupleID->DbValue = $row['CoupleID'];
        $this->IVFCycleNO->DbValue = $row['IVFCycleNO'];
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
        $name = PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL");
        // Get referer URL automatically
        if (ReferUrl() != "" && ReferPageName() != CurrentPageName() && ReferPageName() != "login") { // Referer not same page or login page
            $_SESSION[$name] = ReferUrl(); // Save to Session
        }
        if (@$_SESSION[$name] != "") {
            return $_SESSION[$name];
        } else {
            return GetUrl("IvfTreatmentPlanList");
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
        if ($pageName == "IvfTreatmentPlanView") {
            return $Language->phrase("View");
        } elseif ($pageName == "IvfTreatmentPlanEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "IvfTreatmentPlanAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "IvfTreatmentPlanList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("IvfTreatmentPlanView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("IvfTreatmentPlanView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "IvfTreatmentPlanAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "IvfTreatmentPlanAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("IvfTreatmentPlanEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("IvfTreatmentPlanAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("IvfTreatmentPlanDelete", $this->getUrlParm());
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
        $this->MaleIndications->setDbValue($row['MaleIndications']);
        $this->FemaleIndications->setDbValue($row['FemaleIndications']);
        $this->UseOfThe->setDbValue($row['UseOfThe']);
        $this->Ectopic->setDbValue($row['Ectopic']);
        $this->Heterotopic->setDbValue($row['Heterotopic']);
        $this->TransferDFE->setDbValue($row['TransferDFE']);
        $this->Evolutive->setDbValue($row['Evolutive']);
        $this->Number->setDbValue($row['Number']);
        $this->SequentialCult->setDbValue($row['SequentialCult']);
        $this->TineLapse->setDbValue($row['TineLapse']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->PatientID->setDbValue($row['PatientID']);
        $this->PartnerName->setDbValue($row['PartnerName']);
        $this->PartnerID->setDbValue($row['PartnerID']);
        $this->WifeCell->setDbValue($row['WifeCell']);
        $this->HusbandCell->setDbValue($row['HusbandCell']);
        $this->CoupleID->setDbValue($row['CoupleID']);
        $this->IVFCycleNO->setDbValue($row['IVFCycleNO']);
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

        // MaleIndications

        // FemaleIndications

        // UseOfThe

        // Ectopic

        // Heterotopic

        // TransferDFE

        // Evolutive

        // Number

        // SequentialCult

        // TineLapse

        // PatientName

        // PatientID

        // PartnerName

        // PartnerID

        // WifeCell

        // HusbandCell

        // CoupleID

        // IVFCycleNO

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

        // MaleIndications
        $this->MaleIndications->ViewValue = $this->MaleIndications->CurrentValue;
        $this->MaleIndications->ViewCustomAttributes = "";

        // FemaleIndications
        $this->FemaleIndications->ViewValue = $this->FemaleIndications->CurrentValue;
        $this->FemaleIndications->ViewCustomAttributes = "";

        // UseOfThe
        $this->UseOfThe->ViewValue = $this->UseOfThe->CurrentValue;
        $this->UseOfThe->ViewCustomAttributes = "";

        // Ectopic
        $this->Ectopic->ViewValue = $this->Ectopic->CurrentValue;
        $this->Ectopic->ViewCustomAttributes = "";

        // Heterotopic
        $this->Heterotopic->ViewValue = $this->Heterotopic->CurrentValue;
        $this->Heterotopic->ViewCustomAttributes = "";

        // TransferDFE
        $this->TransferDFE->ViewValue = $this->TransferDFE->CurrentValue;
        $this->TransferDFE->ViewCustomAttributes = "";

        // Evolutive
        $this->Evolutive->ViewValue = $this->Evolutive->CurrentValue;
        $this->Evolutive->ViewCustomAttributes = "";

        // Number
        $this->Number->ViewValue = $this->Number->CurrentValue;
        $this->Number->ViewCustomAttributes = "";

        // SequentialCult
        $this->SequentialCult->ViewValue = $this->SequentialCult->CurrentValue;
        $this->SequentialCult->ViewCustomAttributes = "";

        // TineLapse
        $this->TineLapse->ViewValue = $this->TineLapse->CurrentValue;
        $this->TineLapse->ViewCustomAttributes = "";

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

        // WifeCell
        $this->WifeCell->ViewValue = $this->WifeCell->CurrentValue;
        $this->WifeCell->ViewCustomAttributes = "";

        // HusbandCell
        $this->HusbandCell->ViewValue = $this->HusbandCell->CurrentValue;
        $this->HusbandCell->ViewCustomAttributes = "";

        // CoupleID
        $this->CoupleID->ViewValue = $this->CoupleID->CurrentValue;
        $this->CoupleID->ViewCustomAttributes = "";

        // IVFCycleNO
        $this->IVFCycleNO->ViewValue = $this->IVFCycleNO->CurrentValue;
        $this->IVFCycleNO->ViewCustomAttributes = "";

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

        // MaleIndications
        $this->MaleIndications->LinkCustomAttributes = "";
        $this->MaleIndications->HrefValue = "";
        $this->MaleIndications->TooltipValue = "";

        // FemaleIndications
        $this->FemaleIndications->LinkCustomAttributes = "";
        $this->FemaleIndications->HrefValue = "";
        $this->FemaleIndications->TooltipValue = "";

        // UseOfThe
        $this->UseOfThe->LinkCustomAttributes = "";
        $this->UseOfThe->HrefValue = "";
        $this->UseOfThe->TooltipValue = "";

        // Ectopic
        $this->Ectopic->LinkCustomAttributes = "";
        $this->Ectopic->HrefValue = "";
        $this->Ectopic->TooltipValue = "";

        // Heterotopic
        $this->Heterotopic->LinkCustomAttributes = "";
        $this->Heterotopic->HrefValue = "";
        $this->Heterotopic->TooltipValue = "";

        // TransferDFE
        $this->TransferDFE->LinkCustomAttributes = "";
        $this->TransferDFE->HrefValue = "";
        $this->TransferDFE->TooltipValue = "";

        // Evolutive
        $this->Evolutive->LinkCustomAttributes = "";
        $this->Evolutive->HrefValue = "";
        $this->Evolutive->TooltipValue = "";

        // Number
        $this->Number->LinkCustomAttributes = "";
        $this->Number->HrefValue = "";
        $this->Number->TooltipValue = "";

        // SequentialCult
        $this->SequentialCult->LinkCustomAttributes = "";
        $this->SequentialCult->HrefValue = "";
        $this->SequentialCult->TooltipValue = "";

        // TineLapse
        $this->TineLapse->LinkCustomAttributes = "";
        $this->TineLapse->HrefValue = "";
        $this->TineLapse->TooltipValue = "";

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

        // WifeCell
        $this->WifeCell->LinkCustomAttributes = "";
        $this->WifeCell->HrefValue = "";
        $this->WifeCell->TooltipValue = "";

        // HusbandCell
        $this->HusbandCell->LinkCustomAttributes = "";
        $this->HusbandCell->HrefValue = "";
        $this->HusbandCell->TooltipValue = "";

        // CoupleID
        $this->CoupleID->LinkCustomAttributes = "";
        $this->CoupleID->HrefValue = "";
        $this->CoupleID->TooltipValue = "";

        // IVFCycleNO
        $this->IVFCycleNO->LinkCustomAttributes = "";
        $this->IVFCycleNO->HrefValue = "";
        $this->IVFCycleNO->TooltipValue = "";

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

        // MaleIndications
        $this->MaleIndications->EditAttrs["class"] = "form-control";
        $this->MaleIndications->EditCustomAttributes = "";
        if (!$this->MaleIndications->Raw) {
            $this->MaleIndications->CurrentValue = HtmlDecode($this->MaleIndications->CurrentValue);
        }
        $this->MaleIndications->EditValue = $this->MaleIndications->CurrentValue;
        $this->MaleIndications->PlaceHolder = RemoveHtml($this->MaleIndications->caption());

        // FemaleIndications
        $this->FemaleIndications->EditAttrs["class"] = "form-control";
        $this->FemaleIndications->EditCustomAttributes = "";
        if (!$this->FemaleIndications->Raw) {
            $this->FemaleIndications->CurrentValue = HtmlDecode($this->FemaleIndications->CurrentValue);
        }
        $this->FemaleIndications->EditValue = $this->FemaleIndications->CurrentValue;
        $this->FemaleIndications->PlaceHolder = RemoveHtml($this->FemaleIndications->caption());

        // UseOfThe
        $this->UseOfThe->EditAttrs["class"] = "form-control";
        $this->UseOfThe->EditCustomAttributes = "";
        if (!$this->UseOfThe->Raw) {
            $this->UseOfThe->CurrentValue = HtmlDecode($this->UseOfThe->CurrentValue);
        }
        $this->UseOfThe->EditValue = $this->UseOfThe->CurrentValue;
        $this->UseOfThe->PlaceHolder = RemoveHtml($this->UseOfThe->caption());

        // Ectopic
        $this->Ectopic->EditAttrs["class"] = "form-control";
        $this->Ectopic->EditCustomAttributes = "";
        if (!$this->Ectopic->Raw) {
            $this->Ectopic->CurrentValue = HtmlDecode($this->Ectopic->CurrentValue);
        }
        $this->Ectopic->EditValue = $this->Ectopic->CurrentValue;
        $this->Ectopic->PlaceHolder = RemoveHtml($this->Ectopic->caption());

        // Heterotopic
        $this->Heterotopic->EditAttrs["class"] = "form-control";
        $this->Heterotopic->EditCustomAttributes = "";
        if (!$this->Heterotopic->Raw) {
            $this->Heterotopic->CurrentValue = HtmlDecode($this->Heterotopic->CurrentValue);
        }
        $this->Heterotopic->EditValue = $this->Heterotopic->CurrentValue;
        $this->Heterotopic->PlaceHolder = RemoveHtml($this->Heterotopic->caption());

        // TransferDFE
        $this->TransferDFE->EditAttrs["class"] = "form-control";
        $this->TransferDFE->EditCustomAttributes = "";
        if (!$this->TransferDFE->Raw) {
            $this->TransferDFE->CurrentValue = HtmlDecode($this->TransferDFE->CurrentValue);
        }
        $this->TransferDFE->EditValue = $this->TransferDFE->CurrentValue;
        $this->TransferDFE->PlaceHolder = RemoveHtml($this->TransferDFE->caption());

        // Evolutive
        $this->Evolutive->EditAttrs["class"] = "form-control";
        $this->Evolutive->EditCustomAttributes = "";
        if (!$this->Evolutive->Raw) {
            $this->Evolutive->CurrentValue = HtmlDecode($this->Evolutive->CurrentValue);
        }
        $this->Evolutive->EditValue = $this->Evolutive->CurrentValue;
        $this->Evolutive->PlaceHolder = RemoveHtml($this->Evolutive->caption());

        // Number
        $this->Number->EditAttrs["class"] = "form-control";
        $this->Number->EditCustomAttributes = "";
        if (!$this->Number->Raw) {
            $this->Number->CurrentValue = HtmlDecode($this->Number->CurrentValue);
        }
        $this->Number->EditValue = $this->Number->CurrentValue;
        $this->Number->PlaceHolder = RemoveHtml($this->Number->caption());

        // SequentialCult
        $this->SequentialCult->EditAttrs["class"] = "form-control";
        $this->SequentialCult->EditCustomAttributes = "";
        if (!$this->SequentialCult->Raw) {
            $this->SequentialCult->CurrentValue = HtmlDecode($this->SequentialCult->CurrentValue);
        }
        $this->SequentialCult->EditValue = $this->SequentialCult->CurrentValue;
        $this->SequentialCult->PlaceHolder = RemoveHtml($this->SequentialCult->caption());

        // TineLapse
        $this->TineLapse->EditAttrs["class"] = "form-control";
        $this->TineLapse->EditCustomAttributes = "";
        if (!$this->TineLapse->Raw) {
            $this->TineLapse->CurrentValue = HtmlDecode($this->TineLapse->CurrentValue);
        }
        $this->TineLapse->EditValue = $this->TineLapse->CurrentValue;
        $this->TineLapse->PlaceHolder = RemoveHtml($this->TineLapse->caption());

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

        // CoupleID
        $this->CoupleID->EditAttrs["class"] = "form-control";
        $this->CoupleID->EditCustomAttributes = "";
        if (!$this->CoupleID->Raw) {
            $this->CoupleID->CurrentValue = HtmlDecode($this->CoupleID->CurrentValue);
        }
        $this->CoupleID->EditValue = $this->CoupleID->CurrentValue;
        $this->CoupleID->PlaceHolder = RemoveHtml($this->CoupleID->caption());

        // IVFCycleNO
        $this->IVFCycleNO->EditAttrs["class"] = "form-control";
        $this->IVFCycleNO->EditCustomAttributes = "";
        if (!$this->IVFCycleNO->Raw) {
            $this->IVFCycleNO->CurrentValue = HtmlDecode($this->IVFCycleNO->CurrentValue);
        }
        $this->IVFCycleNO->EditValue = $this->IVFCycleNO->CurrentValue;
        $this->IVFCycleNO->PlaceHolder = RemoveHtml($this->IVFCycleNO->caption());

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
                    $doc->exportCaption($this->MaleIndications);
                    $doc->exportCaption($this->FemaleIndications);
                    $doc->exportCaption($this->UseOfThe);
                    $doc->exportCaption($this->Ectopic);
                    $doc->exportCaption($this->Heterotopic);
                    $doc->exportCaption($this->TransferDFE);
                    $doc->exportCaption($this->Evolutive);
                    $doc->exportCaption($this->Number);
                    $doc->exportCaption($this->SequentialCult);
                    $doc->exportCaption($this->TineLapse);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->PatientID);
                    $doc->exportCaption($this->PartnerName);
                    $doc->exportCaption($this->PartnerID);
                    $doc->exportCaption($this->WifeCell);
                    $doc->exportCaption($this->HusbandCell);
                    $doc->exportCaption($this->CoupleID);
                    $doc->exportCaption($this->IVFCycleNO);
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
                    $doc->exportCaption($this->MaleIndications);
                    $doc->exportCaption($this->FemaleIndications);
                    $doc->exportCaption($this->UseOfThe);
                    $doc->exportCaption($this->Ectopic);
                    $doc->exportCaption($this->Heterotopic);
                    $doc->exportCaption($this->TransferDFE);
                    $doc->exportCaption($this->Evolutive);
                    $doc->exportCaption($this->Number);
                    $doc->exportCaption($this->SequentialCult);
                    $doc->exportCaption($this->TineLapse);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->PatientID);
                    $doc->exportCaption($this->PartnerName);
                    $doc->exportCaption($this->PartnerID);
                    $doc->exportCaption($this->WifeCell);
                    $doc->exportCaption($this->HusbandCell);
                    $doc->exportCaption($this->CoupleID);
                    $doc->exportCaption($this->IVFCycleNO);
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
                        $doc->exportField($this->MaleIndications);
                        $doc->exportField($this->FemaleIndications);
                        $doc->exportField($this->UseOfThe);
                        $doc->exportField($this->Ectopic);
                        $doc->exportField($this->Heterotopic);
                        $doc->exportField($this->TransferDFE);
                        $doc->exportField($this->Evolutive);
                        $doc->exportField($this->Number);
                        $doc->exportField($this->SequentialCult);
                        $doc->exportField($this->TineLapse);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->PatientID);
                        $doc->exportField($this->PartnerName);
                        $doc->exportField($this->PartnerID);
                        $doc->exportField($this->WifeCell);
                        $doc->exportField($this->HusbandCell);
                        $doc->exportField($this->CoupleID);
                        $doc->exportField($this->IVFCycleNO);
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
                        $doc->exportField($this->MaleIndications);
                        $doc->exportField($this->FemaleIndications);
                        $doc->exportField($this->UseOfThe);
                        $doc->exportField($this->Ectopic);
                        $doc->exportField($this->Heterotopic);
                        $doc->exportField($this->TransferDFE);
                        $doc->exportField($this->Evolutive);
                        $doc->exportField($this->Number);
                        $doc->exportField($this->SequentialCult);
                        $doc->exportField($this->TineLapse);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->PatientID);
                        $doc->exportField($this->PartnerName);
                        $doc->exportField($this->PartnerID);
                        $doc->exportField($this->WifeCell);
                        $doc->exportField($this->HusbandCell);
                        $doc->exportField($this->CoupleID);
                        $doc->exportField($this->IVFCycleNO);
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
