<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for view_ivf_treatment_plan
 */
class view_ivf_treatment_plan extends DbTable
{
	protected $SqlFrom = "";
	protected $SqlSelect = "";
	protected $SqlSelectList = "";
	protected $SqlWhere = "";
	protected $SqlGroupBy = "";
	protected $SqlHaving = "";
	protected $SqlOrderBy = "";
	public $UseSessionForListSql = TRUE;

	// Column CSS classes
	public $LeftColumnClass = "col-sm-2 col-form-label ew-label";
	public $RightColumnClass = "col-sm-10";
	public $OffsetColumnClass = "col-sm-10 offset-sm-2";
	public $TableLeftColumnClass = "w-col-2";

	// Export
	public $ExportDoc;

	// Fields
	public $id;
	public $CoupleID;
	public $PatientID;
	public $PatientName;
	public $WifeCell;
	public $PartnerID;
	public $PartnerName;
	public $HusbandCell;
	public $RIDNO;
	public $Name;
	public $Age;
	public $TreatmentStartDate;
	public $treatment_status;
	public $ARTCYCLE;
	public $RESULT;
	public $status;
	public $createdby;
	public $createddatetime;
	public $modifiedby;
	public $modifieddatetime;
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

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'view_ivf_treatment_plan';
		$this->TableName = 'view_ivf_treatment_plan';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`view_ivf_treatment_plan`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = FALSE; // Allow detail add
		$this->DetailEdit = FALSE; // Allow detail edit
		$this->DetailView = FALSE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = 0; // User ID Allow
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// id
		$this->id = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// CoupleID
		$this->CoupleID = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_CoupleID', 'CoupleID', '`CoupleID`', '`CoupleID`', 200, -1, FALSE, '`CoupleID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CoupleID->Sortable = TRUE; // Allow sort
		$this->fields['CoupleID'] = &$this->CoupleID;

		// PatientID
		$this->PatientID = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_PatientID', 'PatientID', '`PatientID`', '`PatientID`', 200, -1, FALSE, '`PatientID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientID->Sortable = TRUE; // Allow sort
		$this->fields['PatientID'] = &$this->PatientID;

		// PatientName
		$this->PatientName = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, -1, FALSE, '`PatientName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientName->Sortable = TRUE; // Allow sort
		$this->fields['PatientName'] = &$this->PatientName;

		// WifeCell
		$this->WifeCell = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_WifeCell', 'WifeCell', '`WifeCell`', '`WifeCell`', 200, -1, FALSE, '`WifeCell`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->WifeCell->Sortable = TRUE; // Allow sort
		$this->fields['WifeCell'] = &$this->WifeCell;

		// PartnerID
		$this->PartnerID = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_PartnerID', 'PartnerID', '`PartnerID`', '`PartnerID`', 200, -1, FALSE, '`PartnerID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PartnerID->Sortable = TRUE; // Allow sort
		$this->fields['PartnerID'] = &$this->PartnerID;

		// PartnerName
		$this->PartnerName = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_PartnerName', 'PartnerName', '`PartnerName`', '`PartnerName`', 200, -1, FALSE, '`PartnerName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PartnerName->Sortable = TRUE; // Allow sort
		$this->fields['PartnerName'] = &$this->PartnerName;

		// HusbandCell
		$this->HusbandCell = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_HusbandCell', 'HusbandCell', '`HusbandCell`', '`HusbandCell`', 200, -1, FALSE, '`HusbandCell`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HusbandCell->Sortable = TRUE; // Allow sort
		$this->fields['HusbandCell'] = &$this->HusbandCell;

		// RIDNO
		$this->RIDNO = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_RIDNO', 'RIDNO', '`RIDNO`', '`RIDNO`', 3, -1, FALSE, '`RIDNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->RIDNO->Sortable = TRUE; // Allow sort
		$this->RIDNO->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->RIDNO->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->RIDNO->Lookup = new Lookup('RIDNO', 'ivf', FALSE, 'id', ["PatientID","PatientName","PartnerID","PartnerName"], [], [], [], [], ["CoupleID","PatientID","PatientName","WifeCell","PartnerID","PartnerName","HusbandCell","Female"], ["x_CoupleID","x_PatientID","x_PatientName","x_WifeCell","x_PartnerID","x_PartnerName","x_HusbandCell","x_Name"], '`id` DESC', '');
		$this->RIDNO->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['RIDNO'] = &$this->RIDNO;

		// Name
		$this->Name = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_Name', 'Name', '`Name`', '`Name`', 200, -1, FALSE, '`Name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Name->Sortable = TRUE; // Allow sort
		$this->fields['Name'] = &$this->Name;

		// Age
		$this->Age = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_Age', 'Age', '`Age`', '`Age`', 200, -1, FALSE, '`Age`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Age->Sortable = TRUE; // Allow sort
		$this->fields['Age'] = &$this->Age;

		// TreatmentStartDate
		$this->TreatmentStartDate = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_TreatmentStartDate', 'TreatmentStartDate', '`TreatmentStartDate`', CastDateFieldForLike('`TreatmentStartDate`', 0, "DB"), 135, 0, FALSE, '`TreatmentStartDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TreatmentStartDate->Sortable = TRUE; // Allow sort
		$this->TreatmentStartDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['TreatmentStartDate'] = &$this->TreatmentStartDate;

		// treatment_status
		$this->treatment_status = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_treatment_status', 'treatment_status', '`treatment_status`', '`treatment_status`', 200, -1, FALSE, '`treatment_status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->treatment_status->Sortable = TRUE; // Allow sort
		$this->treatment_status->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->treatment_status->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->treatment_status->Lookup = new Lookup('treatment_status', 'view_ivf_treatment_plan', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->treatment_status->OptionCount = 3;
		$this->fields['treatment_status'] = &$this->treatment_status;

		// ARTCYCLE
		$this->ARTCYCLE = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_ARTCYCLE', 'ARTCYCLE', '`ARTCYCLE`', '`ARTCYCLE`', 200, -1, FALSE, '`ARTCYCLE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->ARTCYCLE->Sortable = TRUE; // Allow sort
		$this->ARTCYCLE->Lookup = new Lookup('ARTCYCLE', 'view_ivf_treatment_plan', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->ARTCYCLE->OptionCount = 7;
		$this->fields['ARTCYCLE'] = &$this->ARTCYCLE;

		// RESULT
		$this->RESULT = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_RESULT', 'RESULT', '`RESULT`', '`RESULT`', 200, -1, FALSE, '`RESULT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->RESULT->Sortable = TRUE; // Allow sort
		$this->RESULT->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->RESULT->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->RESULT->Lookup = new Lookup('RESULT', 'view_ivf_treatment_plan', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->RESULT->OptionCount = 2;
		$this->fields['RESULT'] = &$this->RESULT;

		// status
		$this->status = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_status', 'status', '`status`', '`status`', 3, -1, FALSE, '`status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->status->Sortable = TRUE; // Allow sort
		$this->status->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->status->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->status->Lookup = new Lookup('status', 'sys_status', FALSE, 'id', ["Name","","",""], [], [], [], [], [], [], '', '');
		$this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['status'] = &$this->status;

		// createdby
		$this->createdby = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, -1, FALSE, '`createdby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdby->Sortable = TRUE; // Allow sort
		$this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['createdby'] = &$this->createdby;

		// createddatetime
		$this->createddatetime = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike('`createddatetime`', 0, "DB"), 135, 0, FALSE, '`createddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = TRUE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['createddatetime'] = &$this->createddatetime;

		// modifiedby
		$this->modifiedby = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, -1, FALSE, '`modifiedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifiedby->Sortable = TRUE; // Allow sort
		$this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['modifiedby'] = &$this->modifiedby;

		// modifieddatetime
		$this->modifieddatetime = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike('`modifieddatetime`', 0, "DB"), 135, 0, FALSE, '`modifieddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifieddatetime->Sortable = TRUE; // Allow sort
		$this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['modifieddatetime'] = &$this->modifieddatetime;

		// TreatementStopDate
		$this->TreatementStopDate = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_TreatementStopDate', 'TreatementStopDate', '`TreatementStopDate`', CastDateFieldForLike('`TreatementStopDate`', 0, "DB"), 135, 0, FALSE, '`TreatementStopDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TreatementStopDate->Sortable = TRUE; // Allow sort
		$this->TreatementStopDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['TreatementStopDate'] = &$this->TreatementStopDate;

		// TypePatient
		$this->TypePatient = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_TypePatient', 'TypePatient', '`TypePatient`', '`TypePatient`', 200, -1, FALSE, '`TypePatient`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TypePatient->Sortable = TRUE; // Allow sort
		$this->fields['TypePatient'] = &$this->TypePatient;

		// Treatment
		$this->Treatment = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_Treatment', 'Treatment', '`Treatment`', '`Treatment`', 200, -1, FALSE, '`Treatment`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Treatment->Sortable = TRUE; // Allow sort
		$this->Treatment->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Treatment->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Treatment->Lookup = new Lookup('Treatment', 'view_ivf_treatment_plan', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Treatment->OptionCount = 9;
		$this->fields['Treatment'] = &$this->Treatment;

		// TreatmentTec
		$this->TreatmentTec = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_TreatmentTec', 'TreatmentTec', '`TreatmentTec`', '`TreatmentTec`', 200, -1, FALSE, '`TreatmentTec`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TreatmentTec->Sortable = TRUE; // Allow sort
		$this->fields['TreatmentTec'] = &$this->TreatmentTec;

		// TypeOfCycle
		$this->TypeOfCycle = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_TypeOfCycle', 'TypeOfCycle', '`TypeOfCycle`', '`TypeOfCycle`', 200, -1, FALSE, '`TypeOfCycle`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->TypeOfCycle->Sortable = TRUE; // Allow sort
		$this->TypeOfCycle->Lookup = new Lookup('TypeOfCycle', 'view_ivf_treatment_plan', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->TypeOfCycle->OptionCount = 3;
		$this->fields['TypeOfCycle'] = &$this->TypeOfCycle;

		// SpermOrgin
		$this->SpermOrgin = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_SpermOrgin', 'SpermOrgin', '`SpermOrgin`', '`SpermOrgin`', 200, -1, FALSE, '`SpermOrgin`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->SpermOrgin->Sortable = TRUE; // Allow sort
		$this->SpermOrgin->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->SpermOrgin->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->SpermOrgin->Lookup = new Lookup('SpermOrgin', 'view_ivf_treatment_plan', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->SpermOrgin->OptionCount = 3;
		$this->fields['SpermOrgin'] = &$this->SpermOrgin;

		// State
		$this->State = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_State', 'State', '`State`', '`State`', 200, -1, FALSE, '`State`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->State->Sortable = TRUE; // Allow sort
		$this->State->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->State->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->State->Lookup = new Lookup('State', 'view_ivf_treatment_plan', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->State->OptionCount = 3;
		$this->fields['State'] = &$this->State;

		// Origin
		$this->Origin = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_Origin', 'Origin', '`Origin`', '`Origin`', 200, -1, FALSE, '`Origin`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Origin->Sortable = TRUE; // Allow sort
		$this->fields['Origin'] = &$this->Origin;

		// MACS
		$this->MACS = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_MACS', 'MACS', '`MACS`', '`MACS`', 200, -1, FALSE, '`MACS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->MACS->Sortable = TRUE; // Allow sort
		$this->MACS->Lookup = new Lookup('MACS', 'view_ivf_treatment_plan', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->MACS->OptionCount = 2;
		$this->fields['MACS'] = &$this->MACS;

		// Technique
		$this->Technique = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_Technique', 'Technique', '`Technique`', '`Technique`', 200, -1, FALSE, '`Technique`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Technique->Sortable = TRUE; // Allow sort
		$this->fields['Technique'] = &$this->Technique;

		// PgdPlanning
		$this->PgdPlanning = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_PgdPlanning', 'PgdPlanning', '`PgdPlanning`', '`PgdPlanning`', 200, -1, FALSE, '`PgdPlanning`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->PgdPlanning->Sortable = TRUE; // Allow sort
		$this->PgdPlanning->Lookup = new Lookup('PgdPlanning', 'view_ivf_treatment_plan', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->PgdPlanning->OptionCount = 2;
		$this->fields['PgdPlanning'] = &$this->PgdPlanning;

		// IMSI
		$this->IMSI = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_IMSI', 'IMSI', '`IMSI`', '`IMSI`', 200, -1, FALSE, '`IMSI`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IMSI->Sortable = TRUE; // Allow sort
		$this->fields['IMSI'] = &$this->IMSI;

		// SequentialCulture
		$this->SequentialCulture = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_SequentialCulture', 'SequentialCulture', '`SequentialCulture`', '`SequentialCulture`', 200, -1, FALSE, '`SequentialCulture`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SequentialCulture->Sortable = TRUE; // Allow sort
		$this->fields['SequentialCulture'] = &$this->SequentialCulture;

		// TimeLapse
		$this->TimeLapse = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_TimeLapse', 'TimeLapse', '`TimeLapse`', '`TimeLapse`', 200, -1, FALSE, '`TimeLapse`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TimeLapse->Sortable = TRUE; // Allow sort
		$this->fields['TimeLapse'] = &$this->TimeLapse;

		// AH
		$this->AH = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_AH', 'AH', '`AH`', '`AH`', 200, -1, FALSE, '`AH`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AH->Sortable = TRUE; // Allow sort
		$this->fields['AH'] = &$this->AH;

		// Weight
		$this->Weight = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_Weight', 'Weight', '`Weight`', '`Weight`', 200, -1, FALSE, '`Weight`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Weight->Sortable = TRUE; // Allow sort
		$this->fields['Weight'] = &$this->Weight;

		// BMI
		$this->BMI = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_BMI', 'BMI', '`BMI`', '`BMI`', 200, -1, FALSE, '`BMI`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BMI->Sortable = TRUE; // Allow sort
		$this->fields['BMI'] = &$this->BMI;

		// MaleIndications
		$this->MaleIndications = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_MaleIndications', 'MaleIndications', '`MaleIndications`', '`MaleIndications`', 200, -1, FALSE, '`MaleIndications`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->MaleIndications->Sortable = TRUE; // Allow sort
		$this->MaleIndications->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->MaleIndications->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->MaleIndications->Lookup = new Lookup('MaleIndications', 'view_ivf_treatment_plan', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->MaleIndications->OptionCount = 9;
		$this->fields['MaleIndications'] = &$this->MaleIndications;

		// FemaleIndications
		$this->FemaleIndications = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_FemaleIndications', 'FemaleIndications', '`FemaleIndications`', '`FemaleIndications`', 200, -1, FALSE, '`FemaleIndications`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->FemaleIndications->Sortable = TRUE; // Allow sort
		$this->FemaleIndications->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->FemaleIndications->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->FemaleIndications->Lookup = new Lookup('FemaleIndications', 'view_ivf_treatment_plan', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->FemaleIndications->OptionCount = 12;
		$this->fields['FemaleIndications'] = &$this->FemaleIndications;

		// UseOfThe
		$this->UseOfThe = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_UseOfThe', 'UseOfThe', '`UseOfThe`', '`UseOfThe`', 200, -1, FALSE, '`UseOfThe`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->UseOfThe->Sortable = TRUE; // Allow sort
		$this->fields['UseOfThe'] = &$this->UseOfThe;

		// Ectopic
		$this->Ectopic = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_Ectopic', 'Ectopic', '`Ectopic`', '`Ectopic`', 200, -1, FALSE, '`Ectopic`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Ectopic->Sortable = TRUE; // Allow sort
		$this->fields['Ectopic'] = &$this->Ectopic;

		// Heterotopic
		$this->Heterotopic = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_Heterotopic', 'Heterotopic', '`Heterotopic`', '`Heterotopic`', 200, -1, FALSE, '`Heterotopic`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Heterotopic->Sortable = TRUE; // Allow sort
		$this->Heterotopic->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Heterotopic->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Heterotopic->Lookup = new Lookup('Heterotopic', 'view_ivf_treatment_plan', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Heterotopic->OptionCount = 2;
		$this->fields['Heterotopic'] = &$this->Heterotopic;

		// TransferDFE
		$this->TransferDFE = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_TransferDFE', 'TransferDFE', '`TransferDFE`', '`TransferDFE`', 200, -1, FALSE, '`TransferDFE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->TransferDFE->Sortable = TRUE; // Allow sort
		$this->TransferDFE->Lookup = new Lookup('TransferDFE', 'view_ivf_treatment_plan', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->TransferDFE->OptionCount = 1;
		$this->fields['TransferDFE'] = &$this->TransferDFE;

		// Evolutive
		$this->Evolutive = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_Evolutive', 'Evolutive', '`Evolutive`', '`Evolutive`', 200, -1, FALSE, '`Evolutive`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Evolutive->Sortable = TRUE; // Allow sort
		$this->fields['Evolutive'] = &$this->Evolutive;

		// Number
		$this->Number = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_Number', 'Number', '`Number`', '`Number`', 200, -1, FALSE, '`Number`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Number->Sortable = TRUE; // Allow sort
		$this->fields['Number'] = &$this->Number;

		// SequentialCult
		$this->SequentialCult = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_SequentialCult', 'SequentialCult', '`SequentialCult`', '`SequentialCult`', 200, -1, FALSE, '`SequentialCult`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SequentialCult->Sortable = TRUE; // Allow sort
		$this->fields['SequentialCult'] = &$this->SequentialCult;

		// TineLapse
		$this->TineLapse = new DbField('view_ivf_treatment_plan', 'view_ivf_treatment_plan', 'x_TineLapse', 'TineLapse', '`TineLapse`', '`TineLapse`', 200, -1, FALSE, '`TineLapse`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TineLapse->Sortable = TRUE; // Allow sort
		$this->TineLapse->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TineLapse->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->TineLapse->Lookup = new Lookup('TineLapse', 'view_ivf_treatment_plan', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->TineLapse->OptionCount = 2;
		$this->fields['TineLapse'] = &$this->TineLapse;
	}

	// Field Visibility
	public function getFieldVisibility($fldParm)
	{
		global $Security;
		return $this->$fldParm->Visible; // Returns original value
	}

	// Set left column class (must be predefined col-*-* classes of Bootstrap grid system)
	function setLeftColumnClass($class)
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
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$thisSort = $this->CurrentOrderType;
			} else {
				$thisSort = ($lastSort == "ASC") ? "DESC" : "ASC";
			}
			$fld->setSort($thisSort);
			$this->setSessionOrderBy($sortField . " " . $thisSort); // Save to Session
		} else {
			$fld->setSort("");
		}
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`view_ivf_treatment_plan`";
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
		return ($this->SqlSelect <> "") ? $this->SqlSelect : "SELECT * FROM " . $this->getSqlFrom();
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
		$where = ($this->SqlWhere <> "") ? $this->SqlWhere : "";
		$this->TableFilter = "";
		AddFilter($where, $this->TableFilter);
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
		return ($this->SqlGroupBy <> "") ? $this->SqlGroupBy : "";
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
		return ($this->SqlHaving <> "") ? $this->SqlHaving : "";
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
		return ($this->SqlOrderBy <> "") ? $this->SqlOrderBy : "`id` DESC";
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
		$allow = USER_ID_ALLOW;
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
			case "changepwd":
			case "forgotpwd":
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

	// Get SQL
	public function getSql($where, $orderBy = "")
	{
		return BuildSelectSql($this->getSqlSelect(), $this->getSqlWhere(),
			$this->getSqlGroupBy(), $this->getSqlHaving(), $this->getSqlOrderBy(),
			$where, $orderBy);
	}

	// Table SQL
	public function getCurrentSql()
	{
		$filter = $this->CurrentFilter;
		$filter = $this->applyUserIDFilters($filter);
		$sort = $this->getSessionOrderBy();
		return $this->getSql($filter, $sort);
	}

	// Table SQL with List page filter
	public function getListSql()
	{
		$filter = $this->UseSessionForListSql ? $this->getSessionWhere() : "";
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->getSqlSelect();
		$sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
		return BuildSelectSql($select, $this->getSqlWhere(), $this->getSqlGroupBy(),
			$this->getSqlHaving(), $this->getSqlOrderBy(), $filter, $sort);
	}

	// Get ORDER BY clause
	public function getOrderBy()
	{
		$sort = $this->getSessionOrderBy();
		return BuildSelectSql("", "", "", "", $this->getSqlOrderBy(), "", $sort);
	}

	// Get record count
	public function getRecordCount($sql)
	{
		$cnt = -1;
		$rs = NULL;
		$sql = preg_replace('/\/\*BeginOrderBy\*\/[\s\S]+\/\*EndOrderBy\*\//', "", $sql); // Remove ORDER BY clause (MSSQL)
		$pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';

		// Skip Custom View / SubQuery and SELECT DISTINCT
		if (($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
			preg_match($pattern, $sql) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sql) && !preg_match('/^\s*select\s+distinct\s+/i', $sql)) {
			$sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sql);
		} else {
			$sqlwrk = "SELECT COUNT(*) FROM (" . $sql . ") COUNT_TABLE";
		}
		$conn = &$this->getConnection();
		if ($rs = $conn->execute($sqlwrk)) {
			if (!$rs->EOF && $rs->FieldCount() > 0) {
				$cnt = $rs->fields[0];
				$rs->close();
			}
			return (int)$cnt;
		}

		// Unable to get count, get record count directly
		if ($rs = $conn->execute($sql)) {
			$cnt = $rs->RecordCount();
			$rs->close();
			return (int)$cnt;
		}
		return $cnt;
	}

	// Get record count based on filter (for detail record count in master table pages)
	public function loadRecordCount($filter)
	{
		$origFilter = $this->CurrentFilter;
		$this->CurrentFilter = $filter;
		$this->Recordset_Selecting($this->CurrentFilter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $this->CurrentFilter, "");
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
		$this->Recordset_Selecting($filter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
		$cnt = $this->getRecordCount($sql);
		return $cnt;
	}

	// INSERT statement
	protected function insertSql(&$rs)
	{
		$names = "";
		$values = "";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom)
				continue;
			$names .= $this->fields[$name]->Expression . ",";
			$values .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$names = preg_replace('/,+$/', "", $names);
		$values = preg_replace('/,+$/', "", $values);
		return "INSERT INTO " . $this->UpdateTable . " ($names) VALUES ($values)";
	}

	// Insert
	public function insert(&$rs)
	{
		$conn = &$this->getConnection();
		$success = $conn->execute($this->insertSql($rs));
		if ($success) {

			// Get insert id if necessary
			$this->id->setDbValue($conn->insert_ID());
			$rs['id'] = $this->id->DbValue;
		}
		return $success;
	}

	// UPDATE statement
	protected function updateSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "UPDATE " . $this->UpdateTable . " SET ";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom || $this->fields[$name]->IsPrimaryKey)
				continue;
			$sql .= $this->fields[$name]->Expression . "=";
			$sql .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$sql = preg_replace('/,+$/', "", $sql);
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		AddFilter($filter, $where);
		if ($filter <> "")
			$sql .= " WHERE " . $filter;
		return $sql;
	}

	// Update
	public function update(&$rs, $where = "", $rsold = NULL, $curfilter = TRUE)
	{
		$conn = &$this->getConnection();
		$success = $conn->execute($this->updateSql($rs, $where, $curfilter));
		return $success;
	}

	// DELETE statement
	protected function deleteSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "DELETE FROM " . $this->UpdateTable . " WHERE ";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		if ($rs) {
			if (array_key_exists('id', $rs))
				AddFilter($where, QuotedName('id', $this->Dbid) . '=' . QuotedValue($rs['id'], $this->id->DataType, $this->Dbid));
		}
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		AddFilter($filter, $where);
		if ($filter <> "")
			$sql .= $filter;
		else
			$sql .= "0=1"; // Avoid delete
		return $sql;
	}

	// Delete
	public function delete(&$rs, $where = "", $curfilter = FALSE)
	{
		$success = TRUE;
		$conn = &$this->getConnection();
		if ($success)
			$success = $conn->execute($this->deleteSql($rs, $where, $curfilter));
		return $success;
	}

	// Load DbValue from recordset or array
	protected function loadDbValues(&$rs)
	{
		if (!$rs || !is_array($rs) && $rs->EOF)
			return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->id->DbValue = $row['id'];
		$this->CoupleID->DbValue = $row['CoupleID'];
		$this->PatientID->DbValue = $row['PatientID'];
		$this->PatientName->DbValue = $row['PatientName'];
		$this->WifeCell->DbValue = $row['WifeCell'];
		$this->PartnerID->DbValue = $row['PartnerID'];
		$this->PartnerName->DbValue = $row['PartnerName'];
		$this->HusbandCell->DbValue = $row['HusbandCell'];
		$this->RIDNO->DbValue = $row['RIDNO'];
		$this->Name->DbValue = $row['Name'];
		$this->Age->DbValue = $row['Age'];
		$this->TreatmentStartDate->DbValue = $row['TreatmentStartDate'];
		$this->treatment_status->DbValue = $row['treatment_status'];
		$this->ARTCYCLE->DbValue = $row['ARTCYCLE'];
		$this->RESULT->DbValue = $row['RESULT'];
		$this->status->DbValue = $row['status'];
		$this->createdby->DbValue = $row['createdby'];
		$this->createddatetime->DbValue = $row['createddatetime'];
		$this->modifiedby->DbValue = $row['modifiedby'];
		$this->modifieddatetime->DbValue = $row['modifieddatetime'];
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
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('id', $row) ? $row['id'] : NULL) : $this->id->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@id@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
		return $keyFilter;
	}

	// Return page URL
	public function getReturnUrl()
	{
		$name = PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_RETURN_URL;

		// Get referer URL automatically
		if (ServerVar("HTTP_REFERER") <> "" && ReferPageName() <> CurrentPageName() && ReferPageName() <> "login.php") // Referer not same page or login page
			$_SESSION[$name] = ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] <> "") {
			return $_SESSION[$name];
		} else {
			return "view_ivf_treatment_planlist.php";
		}
	}
	public function setReturnUrl($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_RETURN_URL] = $v;
	}

	// Get modal caption
	public function getModalCaption($pageName)
	{
		global $Language;
		if ($pageName == "view_ivf_treatment_planview.php")
			return $Language->phrase("View");
		elseif ($pageName == "view_ivf_treatment_planedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "view_ivf_treatment_planadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "view_ivf_treatment_planlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("view_ivf_treatment_planview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_ivf_treatment_planview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "view_ivf_treatment_planadd.php?" . $this->getUrlParm($parm);
		else
			$url = "view_ivf_treatment_planadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("view_ivf_treatment_planedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("view_ivf_treatment_planadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("view_ivf_treatment_plandelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "id:" . JsonEncode($this->id->CurrentValue, "number");
		$json = "{" . $json . "}";
		if ($htmlEncode)
			$json = HtmlEncode($json);
		return $json;
	}

	// Add key value to URL
	public function keyUrl($url, $parm = "")
	{
		$url = $url . "?";
		if ($parm <> "")
			$url .= $parm . "&";
		if ($this->id->CurrentValue != NULL) {
			$url .= "id=" . urlencode($this->id->CurrentValue);
		} else {
			return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
		}
		return $url;
	}

	// Sort URL
	public function sortUrl(&$fld)
	{
		if ($this->CurrentAction || $this->isExport() ||
			in_array($fld->Type, array(128, 204, 205))) { // Unsortable data type
				return "";
		} elseif ($fld->Sortable) {
			$urlParm = $this->getUrlParm("order=" . urlencode($fld->Name) . "&amp;ordertype=" . $fld->reverseSort());
			return $this->addMasterUrl(CurrentPageName() . "?" . $urlParm);
		} else {
			return "";
		}
	}

	// Get record keys from Post/Get/Session
	public function getRecordKeys()
	{
		global $COMPOSITE_KEY_SEPARATOR;
		$arKeys = array();
		$arKey = array();
		if (Param("key_m") !== NULL) {
			$arKeys = Param("key_m");
			$cnt = count($arKeys);
		} else {
			if (Param("id") !== NULL)
				$arKeys[] = Param("id");
			elseif (IsApi() && Key(0) !== NULL)
				$arKeys[] = Key(0);
			elseif (IsApi() && Route(2) !== NULL)
				$arKeys[] = Route(2);
			else
				$arKeys = NULL; // Do not setup

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = array();
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				if (!is_numeric($key))
					continue;
				$ar[] = $key;
			}
		}
		return $ar;
	}

	// Get filter from record keys
	public function getFilterFromRecordKeys()
	{
		$arKeys = $this->getRecordKeys();
		$keyFilter = "";
		foreach ($arKeys as $key) {
			if ($keyFilter <> "") $keyFilter .= " OR ";
			$this->id->CurrentValue = $key;
			$keyFilter .= "(" . $this->getRecordFilter() . ")";
		}
		return $keyFilter;
	}

	// Load rows based on filter
	public function &loadRs($filter)
	{

		// Set up filter (WHERE Clause)
		$sql = $this->getSql($filter);
		$conn = &$this->getConnection();
		$rs = $conn->execute($sql);
		return $rs;
	}

	// Load row values from recordset
	public function loadListRowValues(&$rs)
	{
		$this->id->setDbValue($rs->fields('id'));
		$this->CoupleID->setDbValue($rs->fields('CoupleID'));
		$this->PatientID->setDbValue($rs->fields('PatientID'));
		$this->PatientName->setDbValue($rs->fields('PatientName'));
		$this->WifeCell->setDbValue($rs->fields('WifeCell'));
		$this->PartnerID->setDbValue($rs->fields('PartnerID'));
		$this->PartnerName->setDbValue($rs->fields('PartnerName'));
		$this->HusbandCell->setDbValue($rs->fields('HusbandCell'));
		$this->RIDNO->setDbValue($rs->fields('RIDNO'));
		$this->Name->setDbValue($rs->fields('Name'));
		$this->Age->setDbValue($rs->fields('Age'));
		$this->TreatmentStartDate->setDbValue($rs->fields('TreatmentStartDate'));
		$this->treatment_status->setDbValue($rs->fields('treatment_status'));
		$this->ARTCYCLE->setDbValue($rs->fields('ARTCYCLE'));
		$this->RESULT->setDbValue($rs->fields('RESULT'));
		$this->status->setDbValue($rs->fields('status'));
		$this->createdby->setDbValue($rs->fields('createdby'));
		$this->createddatetime->setDbValue($rs->fields('createddatetime'));
		$this->modifiedby->setDbValue($rs->fields('modifiedby'));
		$this->modifieddatetime->setDbValue($rs->fields('modifieddatetime'));
		$this->TreatementStopDate->setDbValue($rs->fields('TreatementStopDate'));
		$this->TypePatient->setDbValue($rs->fields('TypePatient'));
		$this->Treatment->setDbValue($rs->fields('Treatment'));
		$this->TreatmentTec->setDbValue($rs->fields('TreatmentTec'));
		$this->TypeOfCycle->setDbValue($rs->fields('TypeOfCycle'));
		$this->SpermOrgin->setDbValue($rs->fields('SpermOrgin'));
		$this->State->setDbValue($rs->fields('State'));
		$this->Origin->setDbValue($rs->fields('Origin'));
		$this->MACS->setDbValue($rs->fields('MACS'));
		$this->Technique->setDbValue($rs->fields('Technique'));
		$this->PgdPlanning->setDbValue($rs->fields('PgdPlanning'));
		$this->IMSI->setDbValue($rs->fields('IMSI'));
		$this->SequentialCulture->setDbValue($rs->fields('SequentialCulture'));
		$this->TimeLapse->setDbValue($rs->fields('TimeLapse'));
		$this->AH->setDbValue($rs->fields('AH'));
		$this->Weight->setDbValue($rs->fields('Weight'));
		$this->BMI->setDbValue($rs->fields('BMI'));
		$this->MaleIndications->setDbValue($rs->fields('MaleIndications'));
		$this->FemaleIndications->setDbValue($rs->fields('FemaleIndications'));
		$this->UseOfThe->setDbValue($rs->fields('UseOfThe'));
		$this->Ectopic->setDbValue($rs->fields('Ectopic'));
		$this->Heterotopic->setDbValue($rs->fields('Heterotopic'));
		$this->TransferDFE->setDbValue($rs->fields('TransferDFE'));
		$this->Evolutive->setDbValue($rs->fields('Evolutive'));
		$this->Number->setDbValue($rs->fields('Number'));
		$this->SequentialCult->setDbValue($rs->fields('SequentialCult'));
		$this->TineLapse->setDbValue($rs->fields('TineLapse'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// CoupleID
		// PatientID
		// PatientName
		// WifeCell
		// PartnerID
		// PartnerName
		// HusbandCell
		// RIDNO
		// Name
		// Age
		// TreatmentStartDate
		// treatment_status
		// ARTCYCLE
		// RESULT
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
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
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// CoupleID
		$this->CoupleID->ViewValue = $this->CoupleID->CurrentValue;
		$this->CoupleID->ViewCustomAttributes = "";

		// PatientID
		$this->PatientID->ViewValue = $this->PatientID->CurrentValue;
		$this->PatientID->ViewCustomAttributes = "";

		// PatientName
		$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
		$this->PatientName->ViewCustomAttributes = "";

		// WifeCell
		$this->WifeCell->ViewValue = $this->WifeCell->CurrentValue;
		$this->WifeCell->ViewCustomAttributes = "";

		// PartnerID
		$this->PartnerID->ViewValue = $this->PartnerID->CurrentValue;
		$this->PartnerID->ViewCustomAttributes = "";

		// PartnerName
		$this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
		$this->PartnerName->ViewCustomAttributes = "";

		// HusbandCell
		$this->HusbandCell->ViewValue = $this->HusbandCell->CurrentValue;
		$this->HusbandCell->ViewCustomAttributes = "";

		// RIDNO
		$curVal = strval($this->RIDNO->CurrentValue);
		if ($curVal <> "") {
			$this->RIDNO->ViewValue = $this->RIDNO->lookupCacheOption($curVal);
			if ($this->RIDNO->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->RIDNO->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$arwrk[3] = $rswrk->fields('df3');
					$arwrk[4] = $rswrk->fields('df4');
					$this->RIDNO->ViewValue = $this->RIDNO->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
				}
			}
		} else {
			$this->RIDNO->ViewValue = NULL;
		}
		$this->RIDNO->ViewCustomAttributes = "";

		// Name
		$this->Name->ViewValue = $this->Name->CurrentValue;
		$this->Name->ViewCustomAttributes = "";

		// Age
		$this->Age->ViewValue = $this->Age->CurrentValue;
		$this->Age->ViewCustomAttributes = "";

		// TreatmentStartDate
		$this->TreatmentStartDate->ViewValue = $this->TreatmentStartDate->CurrentValue;
		$this->TreatmentStartDate->ViewValue = FormatDateTime($this->TreatmentStartDate->ViewValue, 0);
		$this->TreatmentStartDate->ViewCustomAttributes = "";

		// treatment_status
		if (strval($this->treatment_status->CurrentValue) <> "") {
			$this->treatment_status->ViewValue = $this->treatment_status->optionCaption($this->treatment_status->CurrentValue);
		} else {
			$this->treatment_status->ViewValue = NULL;
		}
		$this->treatment_status->ViewCustomAttributes = "";

		// ARTCYCLE
		if (strval($this->ARTCYCLE->CurrentValue) <> "") {
			$this->ARTCYCLE->ViewValue = $this->ARTCYCLE->optionCaption($this->ARTCYCLE->CurrentValue);
		} else {
			$this->ARTCYCLE->ViewValue = NULL;
		}
		$this->ARTCYCLE->ViewCustomAttributes = "";

		// RESULT
		if (strval($this->RESULT->CurrentValue) <> "") {
			$this->RESULT->ViewValue = $this->RESULT->optionCaption($this->RESULT->CurrentValue);
		} else {
			$this->RESULT->ViewValue = NULL;
		}
		$this->RESULT->ViewCustomAttributes = "";

		// status
		$curVal = strval($this->status->CurrentValue);
		if ($curVal <> "") {
			$this->status->ViewValue = $this->status->lookupCacheOption($curVal);
			if ($this->status->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->status->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->status->ViewValue = $this->status->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->status->ViewValue = $this->status->CurrentValue;
				}
			}
		} else {
			$this->status->ViewValue = NULL;
		}
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

		// TreatementStopDate
		$this->TreatementStopDate->ViewValue = $this->TreatementStopDate->CurrentValue;
		$this->TreatementStopDate->ViewValue = FormatDateTime($this->TreatementStopDate->ViewValue, 0);
		$this->TreatementStopDate->ViewCustomAttributes = "";

		// TypePatient
		$this->TypePatient->ViewValue = $this->TypePatient->CurrentValue;
		$this->TypePatient->ViewCustomAttributes = "";

		// Treatment
		if (strval($this->Treatment->CurrentValue) <> "") {
			$this->Treatment->ViewValue = $this->Treatment->optionCaption($this->Treatment->CurrentValue);
		} else {
			$this->Treatment->ViewValue = NULL;
		}
		$this->Treatment->ViewCustomAttributes = "";

		// TreatmentTec
		$this->TreatmentTec->ViewValue = $this->TreatmentTec->CurrentValue;
		$this->TreatmentTec->ViewCustomAttributes = "";

		// TypeOfCycle
		if (strval($this->TypeOfCycle->CurrentValue) <> "") {
			$this->TypeOfCycle->ViewValue = $this->TypeOfCycle->optionCaption($this->TypeOfCycle->CurrentValue);
		} else {
			$this->TypeOfCycle->ViewValue = NULL;
		}
		$this->TypeOfCycle->ViewCustomAttributes = "";

		// SpermOrgin
		if (strval($this->SpermOrgin->CurrentValue) <> "") {
			$this->SpermOrgin->ViewValue = $this->SpermOrgin->optionCaption($this->SpermOrgin->CurrentValue);
		} else {
			$this->SpermOrgin->ViewValue = NULL;
		}
		$this->SpermOrgin->ViewCustomAttributes = "";

		// State
		if (strval($this->State->CurrentValue) <> "") {
			$this->State->ViewValue = $this->State->optionCaption($this->State->CurrentValue);
		} else {
			$this->State->ViewValue = NULL;
		}
		$this->State->ViewCustomAttributes = "";

		// Origin
		$this->Origin->ViewValue = $this->Origin->CurrentValue;
		$this->Origin->ViewCustomAttributes = "";

		// MACS
		if (strval($this->MACS->CurrentValue) <> "") {
			$this->MACS->ViewValue = $this->MACS->optionCaption($this->MACS->CurrentValue);
		} else {
			$this->MACS->ViewValue = NULL;
		}
		$this->MACS->ViewCustomAttributes = "";

		// Technique
		$this->Technique->ViewValue = $this->Technique->CurrentValue;
		$this->Technique->ViewCustomAttributes = "";

		// PgdPlanning
		if (strval($this->PgdPlanning->CurrentValue) <> "") {
			$this->PgdPlanning->ViewValue = $this->PgdPlanning->optionCaption($this->PgdPlanning->CurrentValue);
		} else {
			$this->PgdPlanning->ViewValue = NULL;
		}
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
		if (strval($this->MaleIndications->CurrentValue) <> "") {
			$this->MaleIndications->ViewValue = $this->MaleIndications->optionCaption($this->MaleIndications->CurrentValue);
		} else {
			$this->MaleIndications->ViewValue = NULL;
		}
		$this->MaleIndications->ViewCustomAttributes = "";

		// FemaleIndications
		if (strval($this->FemaleIndications->CurrentValue) <> "") {
			$this->FemaleIndications->ViewValue = $this->FemaleIndications->optionCaption($this->FemaleIndications->CurrentValue);
		} else {
			$this->FemaleIndications->ViewValue = NULL;
		}
		$this->FemaleIndications->ViewCustomAttributes = "";

		// UseOfThe
		$this->UseOfThe->ViewValue = $this->UseOfThe->CurrentValue;
		$this->UseOfThe->ViewCustomAttributes = "";

		// Ectopic
		$this->Ectopic->ViewValue = $this->Ectopic->CurrentValue;
		$this->Ectopic->ViewCustomAttributes = "";

		// Heterotopic
		if (strval($this->Heterotopic->CurrentValue) <> "") {
			$this->Heterotopic->ViewValue = $this->Heterotopic->optionCaption($this->Heterotopic->CurrentValue);
		} else {
			$this->Heterotopic->ViewValue = NULL;
		}
		$this->Heterotopic->ViewCustomAttributes = "";

		// TransferDFE
		if (strval($this->TransferDFE->CurrentValue) <> "") {
			$this->TransferDFE->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->TransferDFE->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->TransferDFE->ViewValue->add($this->TransferDFE->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->TransferDFE->ViewValue = NULL;
		}
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
		if (strval($this->TineLapse->CurrentValue) <> "") {
			$this->TineLapse->ViewValue = $this->TineLapse->optionCaption($this->TineLapse->CurrentValue);
		} else {
			$this->TineLapse->ViewValue = NULL;
		}
		$this->TineLapse->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// CoupleID
		$this->CoupleID->LinkCustomAttributes = "";
		$this->CoupleID->HrefValue = "";
		$this->CoupleID->TooltipValue = "";

		// PatientID
		$this->PatientID->LinkCustomAttributes = "";
		$this->PatientID->HrefValue = "";
		$this->PatientID->TooltipValue = "";

		// PatientName
		$this->PatientName->LinkCustomAttributes = "";
		$this->PatientName->HrefValue = "";
		$this->PatientName->TooltipValue = "";

		// WifeCell
		$this->WifeCell->LinkCustomAttributes = "";
		$this->WifeCell->HrefValue = "";
		$this->WifeCell->TooltipValue = "";

		// PartnerID
		$this->PartnerID->LinkCustomAttributes = "";
		$this->PartnerID->HrefValue = "";
		$this->PartnerID->TooltipValue = "";

		// PartnerName
		$this->PartnerName->LinkCustomAttributes = "";
		$this->PartnerName->HrefValue = "";
		$this->PartnerName->TooltipValue = "";

		// HusbandCell
		$this->HusbandCell->LinkCustomAttributes = "";
		$this->HusbandCell->HrefValue = "";
		$this->HusbandCell->TooltipValue = "";

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

		// TreatmentStartDate
		$this->TreatmentStartDate->LinkCustomAttributes = "";
		$this->TreatmentStartDate->HrefValue = "";
		$this->TreatmentStartDate->TooltipValue = "";

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

		// Call Row Rendered event
		$this->Row_Rendered();

		// Save data for Custom Template
		$this->Rows[] = $this->customTemplateFieldValues();
	}

	// Render edit row values
	public function renderEditRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// id
		$this->id->EditAttrs["class"] = "form-control";
		$this->id->EditCustomAttributes = "";
		$this->id->EditValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// CoupleID
		$this->CoupleID->EditAttrs["class"] = "form-control";
		$this->CoupleID->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->CoupleID->CurrentValue = HtmlDecode($this->CoupleID->CurrentValue);
		$this->CoupleID->EditValue = $this->CoupleID->CurrentValue;
		$this->CoupleID->PlaceHolder = RemoveHtml($this->CoupleID->caption());

		// PatientID
		$this->PatientID->EditAttrs["class"] = "form-control";
		$this->PatientID->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
		$this->PatientID->EditValue = $this->PatientID->CurrentValue;
		$this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

		// PatientName
		$this->PatientName->EditAttrs["class"] = "form-control";
		$this->PatientName->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
		$this->PatientName->EditValue = $this->PatientName->CurrentValue;
		$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

		// WifeCell
		$this->WifeCell->EditAttrs["class"] = "form-control";
		$this->WifeCell->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->WifeCell->CurrentValue = HtmlDecode($this->WifeCell->CurrentValue);
		$this->WifeCell->EditValue = $this->WifeCell->CurrentValue;
		$this->WifeCell->PlaceHolder = RemoveHtml($this->WifeCell->caption());

		// PartnerID
		$this->PartnerID->EditAttrs["class"] = "form-control";
		$this->PartnerID->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PartnerID->CurrentValue = HtmlDecode($this->PartnerID->CurrentValue);
		$this->PartnerID->EditValue = $this->PartnerID->CurrentValue;
		$this->PartnerID->PlaceHolder = RemoveHtml($this->PartnerID->caption());

		// PartnerName
		$this->PartnerName->EditAttrs["class"] = "form-control";
		$this->PartnerName->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PartnerName->CurrentValue = HtmlDecode($this->PartnerName->CurrentValue);
		$this->PartnerName->EditValue = $this->PartnerName->CurrentValue;
		$this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

		// HusbandCell
		$this->HusbandCell->EditAttrs["class"] = "form-control";
		$this->HusbandCell->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->HusbandCell->CurrentValue = HtmlDecode($this->HusbandCell->CurrentValue);
		$this->HusbandCell->EditValue = $this->HusbandCell->CurrentValue;
		$this->HusbandCell->PlaceHolder = RemoveHtml($this->HusbandCell->caption());

		// RIDNO
		$this->RIDNO->EditAttrs["class"] = "form-control";
		$this->RIDNO->EditCustomAttributes = "";

		// Name
		$this->Name->EditAttrs["class"] = "form-control";
		$this->Name->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
		$this->Name->EditValue = $this->Name->CurrentValue;
		$this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

		// Age
		$this->Age->EditAttrs["class"] = "form-control";
		$this->Age->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
		$this->Age->EditValue = $this->Age->CurrentValue;
		$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

		// TreatmentStartDate
		$this->TreatmentStartDate->EditAttrs["class"] = "form-control";
		$this->TreatmentStartDate->EditCustomAttributes = "";
		$this->TreatmentStartDate->EditValue = FormatDateTime($this->TreatmentStartDate->CurrentValue, 8);
		$this->TreatmentStartDate->PlaceHolder = RemoveHtml($this->TreatmentStartDate->caption());

		// treatment_status
		$this->treatment_status->EditAttrs["class"] = "form-control";
		$this->treatment_status->EditCustomAttributes = "";
		$this->treatment_status->EditValue = $this->treatment_status->options(TRUE);

		// ARTCYCLE
		$this->ARTCYCLE->EditCustomAttributes = "";
		$this->ARTCYCLE->EditValue = $this->ARTCYCLE->options(FALSE);

		// RESULT
		$this->RESULT->EditAttrs["class"] = "form-control";
		$this->RESULT->EditCustomAttributes = "";
		$this->RESULT->EditValue = $this->RESULT->options(TRUE);

		// status
		$this->status->EditAttrs["class"] = "form-control";
		$this->status->EditCustomAttributes = "";

		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// TreatementStopDate

		$this->TreatementStopDate->EditAttrs["class"] = "form-control";
		$this->TreatementStopDate->EditCustomAttributes = "";
		$this->TreatementStopDate->EditValue = FormatDateTime($this->TreatementStopDate->CurrentValue, 8);
		$this->TreatementStopDate->PlaceHolder = RemoveHtml($this->TreatementStopDate->caption());

		// TypePatient
		$this->TypePatient->EditAttrs["class"] = "form-control";
		$this->TypePatient->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->TypePatient->CurrentValue = HtmlDecode($this->TypePatient->CurrentValue);
		$this->TypePatient->EditValue = $this->TypePatient->CurrentValue;
		$this->TypePatient->PlaceHolder = RemoveHtml($this->TypePatient->caption());

		// Treatment
		$this->Treatment->EditAttrs["class"] = "form-control";
		$this->Treatment->EditCustomAttributes = "";
		$this->Treatment->EditValue = $this->Treatment->options(TRUE);

		// TreatmentTec
		$this->TreatmentTec->EditAttrs["class"] = "form-control";
		$this->TreatmentTec->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->TreatmentTec->CurrentValue = HtmlDecode($this->TreatmentTec->CurrentValue);
		$this->TreatmentTec->EditValue = $this->TreatmentTec->CurrentValue;
		$this->TreatmentTec->PlaceHolder = RemoveHtml($this->TreatmentTec->caption());

		// TypeOfCycle
		$this->TypeOfCycle->EditCustomAttributes = "";
		$this->TypeOfCycle->EditValue = $this->TypeOfCycle->options(FALSE);

		// SpermOrgin
		$this->SpermOrgin->EditAttrs["class"] = "form-control";
		$this->SpermOrgin->EditCustomAttributes = "";
		$this->SpermOrgin->EditValue = $this->SpermOrgin->options(TRUE);

		// State
		$this->State->EditAttrs["class"] = "form-control";
		$this->State->EditCustomAttributes = "";
		$this->State->EditValue = $this->State->options(TRUE);

		// Origin
		$this->Origin->EditAttrs["class"] = "form-control";
		$this->Origin->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Origin->CurrentValue = HtmlDecode($this->Origin->CurrentValue);
		$this->Origin->EditValue = $this->Origin->CurrentValue;
		$this->Origin->PlaceHolder = RemoveHtml($this->Origin->caption());

		// MACS
		$this->MACS->EditCustomAttributes = "";
		$this->MACS->EditValue = $this->MACS->options(FALSE);

		// Technique
		$this->Technique->EditAttrs["class"] = "form-control";
		$this->Technique->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Technique->CurrentValue = HtmlDecode($this->Technique->CurrentValue);
		$this->Technique->EditValue = $this->Technique->CurrentValue;
		$this->Technique->PlaceHolder = RemoveHtml($this->Technique->caption());

		// PgdPlanning
		$this->PgdPlanning->EditCustomAttributes = "";
		$this->PgdPlanning->EditValue = $this->PgdPlanning->options(FALSE);

		// IMSI
		$this->IMSI->EditAttrs["class"] = "form-control";
		$this->IMSI->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->IMSI->CurrentValue = HtmlDecode($this->IMSI->CurrentValue);
		$this->IMSI->EditValue = $this->IMSI->CurrentValue;
		$this->IMSI->PlaceHolder = RemoveHtml($this->IMSI->caption());

		// SequentialCulture
		$this->SequentialCulture->EditAttrs["class"] = "form-control";
		$this->SequentialCulture->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->SequentialCulture->CurrentValue = HtmlDecode($this->SequentialCulture->CurrentValue);
		$this->SequentialCulture->EditValue = $this->SequentialCulture->CurrentValue;
		$this->SequentialCulture->PlaceHolder = RemoveHtml($this->SequentialCulture->caption());

		// TimeLapse
		$this->TimeLapse->EditAttrs["class"] = "form-control";
		$this->TimeLapse->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->TimeLapse->CurrentValue = HtmlDecode($this->TimeLapse->CurrentValue);
		$this->TimeLapse->EditValue = $this->TimeLapse->CurrentValue;
		$this->TimeLapse->PlaceHolder = RemoveHtml($this->TimeLapse->caption());

		// AH
		$this->AH->EditAttrs["class"] = "form-control";
		$this->AH->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->AH->CurrentValue = HtmlDecode($this->AH->CurrentValue);
		$this->AH->EditValue = $this->AH->CurrentValue;
		$this->AH->PlaceHolder = RemoveHtml($this->AH->caption());

		// Weight
		$this->Weight->EditAttrs["class"] = "form-control";
		$this->Weight->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Weight->CurrentValue = HtmlDecode($this->Weight->CurrentValue);
		$this->Weight->EditValue = $this->Weight->CurrentValue;
		$this->Weight->PlaceHolder = RemoveHtml($this->Weight->caption());

		// BMI
		$this->BMI->EditAttrs["class"] = "form-control";
		$this->BMI->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->BMI->CurrentValue = HtmlDecode($this->BMI->CurrentValue);
		$this->BMI->EditValue = $this->BMI->CurrentValue;
		$this->BMI->PlaceHolder = RemoveHtml($this->BMI->caption());

		// MaleIndications
		$this->MaleIndications->EditAttrs["class"] = "form-control";
		$this->MaleIndications->EditCustomAttributes = "";
		$this->MaleIndications->EditValue = $this->MaleIndications->options(TRUE);

		// FemaleIndications
		$this->FemaleIndications->EditAttrs["class"] = "form-control";
		$this->FemaleIndications->EditCustomAttributes = "";
		$this->FemaleIndications->EditValue = $this->FemaleIndications->options(TRUE);

		// UseOfThe
		$this->UseOfThe->EditAttrs["class"] = "form-control";
		$this->UseOfThe->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->UseOfThe->CurrentValue = HtmlDecode($this->UseOfThe->CurrentValue);
		$this->UseOfThe->EditValue = $this->UseOfThe->CurrentValue;
		$this->UseOfThe->PlaceHolder = RemoveHtml($this->UseOfThe->caption());

		// Ectopic
		$this->Ectopic->EditAttrs["class"] = "form-control";
		$this->Ectopic->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Ectopic->CurrentValue = HtmlDecode($this->Ectopic->CurrentValue);
		$this->Ectopic->EditValue = $this->Ectopic->CurrentValue;
		$this->Ectopic->PlaceHolder = RemoveHtml($this->Ectopic->caption());

		// Heterotopic
		$this->Heterotopic->EditAttrs["class"] = "form-control";
		$this->Heterotopic->EditCustomAttributes = "";
		$this->Heterotopic->EditValue = $this->Heterotopic->options(TRUE);

		// TransferDFE
		$this->TransferDFE->EditCustomAttributes = "";
		$this->TransferDFE->EditValue = $this->TransferDFE->options(FALSE);

		// Evolutive
		$this->Evolutive->EditAttrs["class"] = "form-control";
		$this->Evolutive->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Evolutive->CurrentValue = HtmlDecode($this->Evolutive->CurrentValue);
		$this->Evolutive->EditValue = $this->Evolutive->CurrentValue;
		$this->Evolutive->PlaceHolder = RemoveHtml($this->Evolutive->caption());

		// Number
		$this->Number->EditAttrs["class"] = "form-control";
		$this->Number->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Number->CurrentValue = HtmlDecode($this->Number->CurrentValue);
		$this->Number->EditValue = $this->Number->CurrentValue;
		$this->Number->PlaceHolder = RemoveHtml($this->Number->caption());

		// SequentialCult
		$this->SequentialCult->EditAttrs["class"] = "form-control";
		$this->SequentialCult->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->SequentialCult->CurrentValue = HtmlDecode($this->SequentialCult->CurrentValue);
		$this->SequentialCult->EditValue = $this->SequentialCult->CurrentValue;
		$this->SequentialCult->PlaceHolder = RemoveHtml($this->SequentialCult->caption());

		// TineLapse
		$this->TineLapse->EditAttrs["class"] = "form-control";
		$this->TineLapse->EditCustomAttributes = "";
		$this->TineLapse->EditValue = $this->TineLapse->options(TRUE);

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	public function aggregateListRowValues()
	{
	}

	// Aggregate list row (for rendering)
	public function aggregateListRow()
	{

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/Email/PDF format
	public function exportDocument($doc, $recordset, $startRec = 1, $stopRec = 1, $exportPageType = "")
	{
		if (!$recordset || !$doc)
			return;
		if (!$doc->ExportCustom) {

			// Write header
			$doc->exportTableHeader();
			if ($doc->Horizontal) { // Horizontal format, write header
				$doc->beginExportRow();
				if ($exportPageType == "view") {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->CoupleID);
					$doc->exportCaption($this->PatientID);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->WifeCell);
					$doc->exportCaption($this->PartnerID);
					$doc->exportCaption($this->PartnerName);
					$doc->exportCaption($this->HusbandCell);
					$doc->exportCaption($this->RIDNO);
					$doc->exportCaption($this->Name);
					$doc->exportCaption($this->Age);
					$doc->exportCaption($this->TreatmentStartDate);
					$doc->exportCaption($this->treatment_status);
					$doc->exportCaption($this->ARTCYCLE);
					$doc->exportCaption($this->RESULT);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
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
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->CoupleID);
					$doc->exportCaption($this->PatientID);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->WifeCell);
					$doc->exportCaption($this->PartnerID);
					$doc->exportCaption($this->PartnerName);
					$doc->exportCaption($this->HusbandCell);
					$doc->exportCaption($this->RIDNO);
					$doc->exportCaption($this->Name);
					$doc->exportCaption($this->Age);
					$doc->exportCaption($this->TreatmentStartDate);
					$doc->exportCaption($this->treatment_status);
					$doc->exportCaption($this->ARTCYCLE);
					$doc->exportCaption($this->RESULT);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
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
				}
				$doc->endExportRow();
			}
		}

		// Move to first record
		$recCnt = $startRec - 1;
		if (!$recordset->EOF) {
			$recordset->moveFirst();
			if ($startRec > 1)
				$recordset->move($startRec - 1);
		}
		while (!$recordset->EOF && $recCnt < $stopRec) {
			$recCnt++;
			if ($recCnt >= $startRec) {
				$rowCnt = $recCnt - $startRec + 1;

				// Page break
				if ($this->ExportPageBreakCount > 0) {
					if ($rowCnt > 1 && ($rowCnt - 1) % $this->ExportPageBreakCount == 0)
						$doc->exportPageBreak();
				}
				$this->loadListRowValues($recordset);

				// Render row
				$this->RowType = ROWTYPE_VIEW; // Render view
				$this->resetAttributes();
				$this->renderListRow();
				if (!$doc->ExportCustom) {
					$doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
					if ($exportPageType == "view") {
						$doc->exportField($this->id);
						$doc->exportField($this->CoupleID);
						$doc->exportField($this->PatientID);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->WifeCell);
						$doc->exportField($this->PartnerID);
						$doc->exportField($this->PartnerName);
						$doc->exportField($this->HusbandCell);
						$doc->exportField($this->RIDNO);
						$doc->exportField($this->Name);
						$doc->exportField($this->Age);
						$doc->exportField($this->TreatmentStartDate);
						$doc->exportField($this->treatment_status);
						$doc->exportField($this->ARTCYCLE);
						$doc->exportField($this->RESULT);
						$doc->exportField($this->status);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
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
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->CoupleID);
						$doc->exportField($this->PatientID);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->WifeCell);
						$doc->exportField($this->PartnerID);
						$doc->exportField($this->PartnerName);
						$doc->exportField($this->HusbandCell);
						$doc->exportField($this->RIDNO);
						$doc->exportField($this->Name);
						$doc->exportField($this->Age);
						$doc->exportField($this->TreatmentStartDate);
						$doc->exportField($this->treatment_status);
						$doc->exportField($this->ARTCYCLE);
						$doc->exportField($this->RESULT);
						$doc->exportField($this->status);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
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
					}
					$doc->endExportRow($rowCnt);
				}
			}

			// Call Row Export server event
			if ($doc->ExportCustom)
				$this->Row_Export($recordset->fields);
			$recordset->moveNext();
		}
		if (!$doc->ExportCustom) {
			$doc->exportTableFooter();
		}
	}

	// Lookup data from table
	public function lookup()
	{
		global $Language, $LANGUAGE_FOLDER, $PROJECT_ID;
		if (!isset($Language))
			$Language = new Language($LANGUAGE_FOLDER, Post("language", ""));
		global $Security, $RequestSecurity;

		// Check token first
		$func = PROJECT_NAMESPACE . "CheckToken";
		$validRequest = FALSE;
		if (is_callable($func) && Post(TOKEN_NAME) !== NULL) {
			$validRequest = $func(Post(TOKEN_NAME), SessionTimeoutTime());
			if ($validRequest) {
				if (!isset($Security)) {
					if (session_status() !== PHP_SESSION_ACTIVE)
						session_start(); // Init session data
					$Security = new AdvancedSecurity();
					if ($Security->isLoggedIn()) $Security->TablePermission_Loading();
					$Security->loadCurrentUserLevel($PROJECT_ID . $this->TableName);
					if ($Security->isLoggedIn()) $Security->TablePermission_Loaded();
					$validRequest = $Security->canList(); // List permission
				}
			}
		} else {

			// User profile
			$UserProfile = new UserProfile();

			// Security
			$Security = new AdvancedSecurity();
			if (is_array($RequestSecurity)) // Login user for API request
				$Security->loginUser(@$RequestSecurity["username"], @$RequestSecurity["userid"], @$RequestSecurity["parentuserid"], @$RequestSecurity["userlevelid"]);
			$Security->TablePermission_Loading();
			$Security->loadCurrentUserLevel(CurrentProjectID() . $this->TableName);
			$Security->TablePermission_Loaded();
			$validRequest = $Security->canList(); // List permission
		}

		// Reject invalid request
		if (!$validRequest)
			return FALSE;

		// Load lookup parameters
		$distinct = ConvertToBool(Post("distinct"));
		$linkField = Post("linkField");
		$displayFields = Post("displayFields");
		$parentFields = Post("parentFields");
		if (!is_array($parentFields))
			$parentFields = [];
		$childFields = Post("childFields");
		if (!is_array($childFields))
			$childFields = [];
		$filterFields = Post("filterFields");
		if (!is_array($filterFields))
			$filterFields = [];
		$filterFieldVars = Post("filterFieldVars");
		if (!is_array($filterFieldVars))
			$filterFieldVars = [];
		$filterOperators = Post("filterOperators");
		if (!is_array($filterOperators))
			$filterOperators = [];
		$autoFillSourceFields = Post("autoFillSourceFields");
		if (!is_array($autoFillSourceFields))
			$autoFillSourceFields = [];
		$formatAutoFill = FALSE;
		$lookupType = Post("ajax", "unknown");
		$pageSize = -1;
		$offset = -1;
		$searchValue = "";
		if (SameText($lookupType, "modal")) {
			$searchValue = Post("sv", "");
			$pageSize = Post("recperpage", 10);
			$offset = Post("start", 0);
		} elseif (SameText($lookupType, "autosuggest")) {
			$searchValue = Get("q", "");
			$pageSize = Param("n", -1);
			$pageSize = is_numeric($pageSize) ? (int)$pageSize : -1;
			if ($pageSize <= 0)
				$pageSize = AUTO_SUGGEST_MAX_ENTRIES;
			$start = Param("start", -1);
			$start = is_numeric($start) ? (int)$start : -1;
			$page = Param("page", -1);
			$page = is_numeric($page) ? (int)$page : -1;
			$offset = $start >= 0 ? $start : ($page > 0 && $pageSize > 0 ? ($page - 1) * $pageSize : 0);
		}
		$userSelect = Decrypt(Post("s", ""));
		$userFilter = Decrypt(Post("f", ""));
		$userOrderBy = Decrypt(Post("o", ""));
		$keys = Post("keys");

		// Selected records from modal, skip parent/filter fields and show all records
		if ($keys !== NULL) {
			$parentFields = [];
			$filterFields = [];
			$filterFieldVars = [];
			$offset = 0;
			$pageSize = 0;
		}

		// Create lookup object and output JSON
		$lookup = new Lookup($linkField, $this->TableVar, $distinct, $linkField, $displayFields, $parentFields, $childFields, $filterFields, $filterFieldVars, $autoFillSourceFields);
		foreach ($filterFields as $i => $filterField) { // Set up filter operators
			if (@$filterOperators[$i] <> "")
				$lookup->setFilterOperator($filterField, $filterOperators[$i]);
		}
		$lookup->LookupType = $lookupType; // Lookup type
		if ($keys !== NULL) { // Selected records from modal
			if (is_array($keys))
				$keys = implode(LOOKUP_FILTER_VALUE_SEPARATOR, $keys);
			$lookup->FilterValues[] = $keys; // Lookup values
		} else { // Lookup values
			$lookup->FilterValues[] = Post("v0", Post("lookupValue", ""));
		}
		$cnt = is_array($filterFields) ? count($filterFields) : 0;
		for ($i = 1; $i <= $cnt; $i++)
			$lookup->FilterValues[] = Post("v" . $i, "");
		$lookup->SearchValue = $searchValue;
		$lookup->PageSize = $pageSize;
		$lookup->Offset = $offset;
		if ($userSelect <> "")
			$lookup->UserSelect = $userSelect;
		if ($userFilter <> "")
			$lookup->UserFilter = $userFilter;
		if ($userOrderBy <> "")
			$lookup->UserOrderBy = $userOrderBy;
		$lookup->toJson();
	}

	// Get file data
	public function getFileData($fldparm, $key, $resize, $width = THUMBNAIL_DEFAULT_WIDTH, $height = THUMBNAIL_DEFAULT_HEIGHT)
	{

		// No binary fields
		return FALSE;
	}

	// Table level events
	// Recordset Selecting event
	function Recordset_Selecting(&$filter) {

		// Enter your code here
	}

	// Recordset Selected event
	function Recordset_Selected(&$rs) {

		//echo "Recordset Selected";
	}

	// Recordset Search Validated event
	function Recordset_SearchValidated() {

		// Example:
		//$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value

	}

	// Recordset Searching event
	function Recordset_Searching(&$filter) {

		// Enter your code here
	}

	// Row_Selecting event
	function Row_Selecting(&$filter) {

		// Enter your code here
	}

	// Row Selected event
	function Row_Selected(&$rs) {

		//echo "Row Selected";
	}

	// Row Inserting event
	function Row_Inserting($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted($rsold, &$rsnew) {

		//echo "Row Inserted"
			$dbhelper = &DbHelper();
			$SpermOrgin = $rsnew["SpermOrgin"];
			$State = $rsnew["State"];
			$RIDNO = $rsnew["RIDNO"];
			$MACS = $rsnew["MACS"];
			$Name = $rsnew["Name"];
			$TidNo = $rsnew["id"];
			$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$RIDNO."'; ";
			$results = $dbhelper->ExecuteRows($sql);
			$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
			$results1 = $dbhelper->ExecuteRows($sql);
			$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
			$results2 = $dbhelper->ExecuteRows($sql);
			$sql = "INSERT INTO `ganeshkumar_bjhims`.`ivf_semenanalysisreport` (`RIDNo`, `PatientName`, `RequestSample`, `SemenOrgin`, `TidNo`,`PaID` ,`PaName` ,`PaMobile` ,`PartnerID` ,`PartnerName` ,`PartnerMobile`,`MACS` ) VALUES ('".$RIDNO."', '".$Name."', '".$State."', '".$SpermOrgin."', '".$TidNo."','".$results1[0]["PatientID"]."', '".$results1[0]["first_name"]."' , '".$results1[0]["mobile_no"]."','".$results2[0]["PatientID"]."', '".$results2[0]["first_name"]."' , '".$results2[0]["mobile_no"]."' ,'".$MACS."');";
			$results = $dbhelper->ExecuteRows($sql);
	}

	// Row Updating event
	function Row_Updating($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Updated event
	function Row_Updated($rsold, &$rsnew) {

		//echo "Row Updated";
	}

	// Row Update Conflict event
	function Row_UpdateConflict($rsold, &$rsnew) {

		// Enter your code here
		// To ignore conflict, set return value to FALSE

		return TRUE;
	}

	// Grid Inserting event
	function Grid_Inserting() {

		// Enter your code here
		// To reject grid insert, set return value to FALSE

		return TRUE;
	}

	// Grid Inserted event
	function Grid_Inserted($rsnew) {

		//echo "Grid Inserted";
	}

	// Grid Updating event
	function Grid_Updating($rsold) {

		// Enter your code here
		// To reject grid update, set return value to FALSE

		return TRUE;
	}

	// Grid Updated event
	function Grid_Updated($rsold, $rsnew) {

		//echo "Grid Updated";
	}

	// Row Deleting event
	function Row_Deleting(&$rs) {

		// Enter your code here
		// To cancel, set return value to False

		return TRUE;
	}

	// Row Deleted event
	function Row_Deleted(&$rs) {

		//echo "Row Deleted";
	}

	// Email Sending event
	function Email_Sending($email, &$args) {

		//var_dump($email); var_dump($args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		//var_dump($fld->Name, $fld->Lookup, $filter); // Uncomment to view the filter
		// Enter your code here

	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here
	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>);

	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>