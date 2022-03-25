<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for view_ivf_treatment
 */
class view_ivf_treatment extends DbTable
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

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'view_ivf_treatment';
		$this->TableName = 'view_ivf_treatment';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`view_ivf_treatment`";
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
		$this->BasicSearch->TypeDefault = "OR";

		// id
		$this->id = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->IsForeignKey = TRUE; // Foreign key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// RIDNO
		$this->RIDNO = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_RIDNO', 'RIDNO', '`RIDNO`', '`RIDNO`', 3, -1, FALSE, '`RIDNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RIDNO->IsForeignKey = TRUE; // Foreign key field
		$this->RIDNO->Sortable = TRUE; // Allow sort
		$this->RIDNO->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['RIDNO'] = &$this->RIDNO;

		// Name
		$this->Name = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_Name', 'Name', '`Name`', '`Name`', 200, -1, FALSE, '`Name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Name->IsForeignKey = TRUE; // Foreign key field
		$this->Name->Sortable = TRUE; // Allow sort
		$this->fields['Name'] = &$this->Name;

		// Age
		$this->Age = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_Age', 'Age', '`Age`', '`Age`', 200, -1, FALSE, '`Age`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Age->Sortable = TRUE; // Allow sort
		$this->fields['Age'] = &$this->Age;

		// treatment_status
		$this->treatment_status = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_treatment_status', 'treatment_status', '`treatment_status`', '`treatment_status`', 200, -1, FALSE, '`treatment_status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->treatment_status->Sortable = TRUE; // Allow sort
		$this->fields['treatment_status'] = &$this->treatment_status;

		// ARTCYCLE
		$this->ARTCYCLE = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_ARTCYCLE', 'ARTCYCLE', '`ARTCYCLE`', '`ARTCYCLE`', 200, -1, FALSE, '`ARTCYCLE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ARTCYCLE->Sortable = TRUE; // Allow sort
		$this->fields['ARTCYCLE'] = &$this->ARTCYCLE;

		// RESULT
		$this->RESULT = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_RESULT', 'RESULT', '`RESULT`', '`RESULT`', 200, -1, FALSE, '`RESULT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RESULT->Sortable = TRUE; // Allow sort
		$this->fields['RESULT'] = &$this->RESULT;

		// status
		$this->status = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_status', 'status', '`status`', '`status`', 3, -1, FALSE, '`status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->status->Sortable = TRUE; // Allow sort
		$this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['status'] = &$this->status;

		// createdby
		$this->createdby = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, -1, FALSE, '`createdby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdby->Sortable = TRUE; // Allow sort
		$this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['createdby'] = &$this->createdby;

		// createddatetime
		$this->createddatetime = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike('`createddatetime`', 0, "DB"), 135, 0, FALSE, '`createddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = TRUE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['createddatetime'] = &$this->createddatetime;

		// modifiedby
		$this->modifiedby = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, -1, FALSE, '`modifiedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifiedby->Sortable = TRUE; // Allow sort
		$this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['modifiedby'] = &$this->modifiedby;

		// modifieddatetime
		$this->modifieddatetime = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike('`modifieddatetime`', 0, "DB"), 135, 0, FALSE, '`modifieddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifieddatetime->Sortable = TRUE; // Allow sort
		$this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['modifieddatetime'] = &$this->modifieddatetime;

		// TreatmentStartDate
		$this->TreatmentStartDate = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_TreatmentStartDate', 'TreatmentStartDate', '`TreatmentStartDate`', CastDateFieldForLike('`TreatmentStartDate`', 0, "DB"), 135, 0, FALSE, '`TreatmentStartDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TreatmentStartDate->Sortable = TRUE; // Allow sort
		$this->TreatmentStartDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['TreatmentStartDate'] = &$this->TreatmentStartDate;

		// TreatementStopDate
		$this->TreatementStopDate = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_TreatementStopDate', 'TreatementStopDate', '`TreatementStopDate`', CastDateFieldForLike('`TreatementStopDate`', 0, "DB"), 135, 0, FALSE, '`TreatementStopDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TreatementStopDate->Sortable = TRUE; // Allow sort
		$this->TreatementStopDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['TreatementStopDate'] = &$this->TreatementStopDate;

		// TypePatient
		$this->TypePatient = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_TypePatient', 'TypePatient', '`TypePatient`', '`TypePatient`', 200, -1, FALSE, '`TypePatient`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TypePatient->Sortable = TRUE; // Allow sort
		$this->fields['TypePatient'] = &$this->TypePatient;

		// Treatment
		$this->Treatment = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_Treatment', 'Treatment', '`Treatment`', '`Treatment`', 200, -1, FALSE, '`Treatment`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Treatment->Sortable = TRUE; // Allow sort
		$this->fields['Treatment'] = &$this->Treatment;

		// TreatmentTec
		$this->TreatmentTec = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_TreatmentTec', 'TreatmentTec', '`TreatmentTec`', '`TreatmentTec`', 200, -1, FALSE, '`TreatmentTec`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TreatmentTec->Sortable = TRUE; // Allow sort
		$this->fields['TreatmentTec'] = &$this->TreatmentTec;

		// TypeOfCycle
		$this->TypeOfCycle = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_TypeOfCycle', 'TypeOfCycle', '`TypeOfCycle`', '`TypeOfCycle`', 200, -1, FALSE, '`TypeOfCycle`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TypeOfCycle->Sortable = TRUE; // Allow sort
		$this->fields['TypeOfCycle'] = &$this->TypeOfCycle;

		// SpermOrgin
		$this->SpermOrgin = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_SpermOrgin', 'SpermOrgin', '`SpermOrgin`', '`SpermOrgin`', 200, -1, FALSE, '`SpermOrgin`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SpermOrgin->Sortable = TRUE; // Allow sort
		$this->fields['SpermOrgin'] = &$this->SpermOrgin;

		// State
		$this->State = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_State', 'State', '`State`', '`State`', 200, -1, FALSE, '`State`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->State->Sortable = TRUE; // Allow sort
		$this->fields['State'] = &$this->State;

		// Origin
		$this->Origin = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_Origin', 'Origin', '`Origin`', '`Origin`', 200, -1, FALSE, '`Origin`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Origin->Sortable = TRUE; // Allow sort
		$this->fields['Origin'] = &$this->Origin;

		// MACS
		$this->MACS = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_MACS', 'MACS', '`MACS`', '`MACS`', 200, -1, FALSE, '`MACS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MACS->Sortable = TRUE; // Allow sort
		$this->fields['MACS'] = &$this->MACS;

		// Technique
		$this->Technique = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_Technique', 'Technique', '`Technique`', '`Technique`', 200, -1, FALSE, '`Technique`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Technique->Sortable = TRUE; // Allow sort
		$this->fields['Technique'] = &$this->Technique;

		// PgdPlanning
		$this->PgdPlanning = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_PgdPlanning', 'PgdPlanning', '`PgdPlanning`', '`PgdPlanning`', 200, -1, FALSE, '`PgdPlanning`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PgdPlanning->Sortable = TRUE; // Allow sort
		$this->fields['PgdPlanning'] = &$this->PgdPlanning;

		// IMSI
		$this->IMSI = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_IMSI', 'IMSI', '`IMSI`', '`IMSI`', 200, -1, FALSE, '`IMSI`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IMSI->Sortable = TRUE; // Allow sort
		$this->fields['IMSI'] = &$this->IMSI;

		// SequentialCulture
		$this->SequentialCulture = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_SequentialCulture', 'SequentialCulture', '`SequentialCulture`', '`SequentialCulture`', 200, -1, FALSE, '`SequentialCulture`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SequentialCulture->Sortable = TRUE; // Allow sort
		$this->fields['SequentialCulture'] = &$this->SequentialCulture;

		// TimeLapse
		$this->TimeLapse = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_TimeLapse', 'TimeLapse', '`TimeLapse`', '`TimeLapse`', 200, -1, FALSE, '`TimeLapse`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TimeLapse->Sortable = TRUE; // Allow sort
		$this->fields['TimeLapse'] = &$this->TimeLapse;

		// AH
		$this->AH = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_AH', 'AH', '`AH`', '`AH`', 200, -1, FALSE, '`AH`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AH->Sortable = TRUE; // Allow sort
		$this->fields['AH'] = &$this->AH;

		// Weight
		$this->Weight = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_Weight', 'Weight', '`Weight`', '`Weight`', 200, -1, FALSE, '`Weight`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Weight->Sortable = TRUE; // Allow sort
		$this->fields['Weight'] = &$this->Weight;

		// BMI
		$this->BMI = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_BMI', 'BMI', '`BMI`', '`BMI`', 200, -1, FALSE, '`BMI`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BMI->Sortable = TRUE; // Allow sort
		$this->fields['BMI'] = &$this->BMI;

		// status1
		$this->status1 = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_status1', 'status1', '`status1`', '`status1`', 3, -1, FALSE, '`status1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->status1->Sortable = TRUE; // Allow sort
		$this->status1->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->status1->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->status1->Lookup = new Lookup('status1', 'sys_status', FALSE, 'id', ["Name","","",""], [], [], [], [], [], [], '', '');
		$this->status1->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['status1'] = &$this->status1;

		// id1
		$this->id1 = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_id1', 'id1', '`id1`', '`id1`', 3, -1, FALSE, '`id1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id1->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id1->IsPrimaryKey = TRUE; // Primary key field
		$this->id1->Sortable = TRUE; // Allow sort
		$this->id1->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id1'] = &$this->id1;

		// Male
		$this->Male = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_Male', 'Male', '`Male`', '`Male`', 3, -1, FALSE, '`EV__Male`', TRUE, TRUE, TRUE, 'FORMATTED TEXT', 'SELECT');
		$this->Male->Nullable = FALSE; // NOT NULL field
		$this->Male->Required = TRUE; // Required field
		$this->Male->Sortable = TRUE; // Allow sort
		$this->Male->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Male->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Male->Lookup = new Lookup('Male', 'patient', TRUE, 'id', ["PatientID","first_name","mobile_no",""], [], [], [], [], [], [], '`id` DESC', '');
		$this->Male->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Male'] = &$this->Male;

		// Female
		$this->Female = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_Female', 'Female', '`Female`', '`Female`', 3, -1, FALSE, '`EV__Female`', TRUE, TRUE, TRUE, 'FORMATTED TEXT', 'SELECT');
		$this->Female->Nullable = FALSE; // NOT NULL field
		$this->Female->Required = TRUE; // Required field
		$this->Female->Sortable = TRUE; // Allow sort
		$this->Female->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Female->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Female->Lookup = new Lookup('Female', 'patient', FALSE, 'id', ["PatientID","first_name","mobile_no",""], [], [], [], [], [], [], '`id` DESC', '');
		$this->Female->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Female'] = &$this->Female;

		// malepropic
		$this->malepropic = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_malepropic', 'malepropic', '`malepropic`', '`malepropic`', 201, -1, TRUE, '`malepropic`', FALSE, FALSE, FALSE, 'IMAGE', 'FILE');
		$this->malepropic->Sortable = TRUE; // Allow sort
		$this->fields['malepropic'] = &$this->malepropic;

		// femalepropic
		$this->femalepropic = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_femalepropic', 'femalepropic', '`femalepropic`', '`femalepropic`', 201, -1, TRUE, '`femalepropic`', FALSE, FALSE, FALSE, 'IMAGE', 'FILE');
		$this->femalepropic->Sortable = TRUE; // Allow sort
		$this->fields['femalepropic'] = &$this->femalepropic;

		// HusbandEducation
		$this->HusbandEducation = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_HusbandEducation', 'HusbandEducation', '`HusbandEducation`', '`HusbandEducation`', 200, -1, FALSE, '`HusbandEducation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HusbandEducation->Sortable = TRUE; // Allow sort
		$this->fields['HusbandEducation'] = &$this->HusbandEducation;

		// WifeEducation
		$this->WifeEducation = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_WifeEducation', 'WifeEducation', '`WifeEducation`', '`WifeEducation`', 200, -1, FALSE, '`WifeEducation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->WifeEducation->Sortable = TRUE; // Allow sort
		$this->fields['WifeEducation'] = &$this->WifeEducation;

		// HusbandWorkHours
		$this->HusbandWorkHours = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_HusbandWorkHours', 'HusbandWorkHours', '`HusbandWorkHours`', '`HusbandWorkHours`', 200, -1, FALSE, '`HusbandWorkHours`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HusbandWorkHours->Sortable = TRUE; // Allow sort
		$this->fields['HusbandWorkHours'] = &$this->HusbandWorkHours;

		// WifeWorkHours
		$this->WifeWorkHours = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_WifeWorkHours', 'WifeWorkHours', '`WifeWorkHours`', '`WifeWorkHours`', 200, -1, FALSE, '`WifeWorkHours`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->WifeWorkHours->Sortable = TRUE; // Allow sort
		$this->fields['WifeWorkHours'] = &$this->WifeWorkHours;

		// PatientLanguage
		$this->PatientLanguage = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_PatientLanguage', 'PatientLanguage', '`PatientLanguage`', '`PatientLanguage`', 200, -1, FALSE, '`PatientLanguage`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientLanguage->Sortable = TRUE; // Allow sort
		$this->fields['PatientLanguage'] = &$this->PatientLanguage;

		// ReferedBy
		$this->ReferedBy = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_ReferedBy', 'ReferedBy', '`ReferedBy`', '`ReferedBy`', 200, -1, FALSE, '`EV__ReferedBy`', TRUE, TRUE, TRUE, 'FORMATTED TEXT', 'SELECT');
		$this->ReferedBy->Sortable = TRUE; // Allow sort
		$this->ReferedBy->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->ReferedBy->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->ReferedBy->Lookup = new Lookup('ReferedBy', 'mas_reference_type', FALSE, 'reference', ["reference","","",""], [], [], [], [], ["ReferMobileNo"], ["x_ReferPhNo"], '', '');
		$this->fields['ReferedBy'] = &$this->ReferedBy;

		// ReferPhNo
		$this->ReferPhNo = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_ReferPhNo', 'ReferPhNo', '`ReferPhNo`', '`ReferPhNo`', 200, -1, FALSE, '`ReferPhNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReferPhNo->Sortable = TRUE; // Allow sort
		$this->fields['ReferPhNo'] = &$this->ReferPhNo;

		// ARTCYCLE1
		$this->ARTCYCLE1 = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_ARTCYCLE1', 'ARTCYCLE1', '`ARTCYCLE1`', '`ARTCYCLE1`', 200, -1, FALSE, '`ARTCYCLE1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->ARTCYCLE1->Sortable = TRUE; // Allow sort
		$this->ARTCYCLE1->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->ARTCYCLE1->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->ARTCYCLE1->Lookup = new Lookup('ARTCYCLE1', 'view_ivf_treatment', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->ARTCYCLE1->OptionCount = 9;
		$this->fields['ARTCYCLE1'] = &$this->ARTCYCLE1;

		// RESULT1
		$this->RESULT1 = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_RESULT1', 'RESULT1', '`RESULT1`', '`RESULT1`', 200, -1, FALSE, '`RESULT1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->RESULT1->Sortable = TRUE; // Allow sort
		$this->RESULT1->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->RESULT1->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->RESULT1->Lookup = new Lookup('RESULT1', 'view_ivf_treatment', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->RESULT1->OptionCount = 2;
		$this->fields['RESULT1'] = &$this->RESULT1;

		// CoupleID
		$this->CoupleID = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_CoupleID', 'CoupleID', '`CoupleID`', '`CoupleID`', 200, -1, FALSE, '`CoupleID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CoupleID->Sortable = TRUE; // Allow sort
		$this->fields['CoupleID'] = &$this->CoupleID;

		// HospID
		$this->HospID = new DbField('view_ivf_treatment', 'view_ivf_treatment', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HospID'] = &$this->HospID;
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
			$sortFieldList = ($fld->VirtualExpression <> "") ? $fld->VirtualExpression : $sortField;
			$this->setSessionOrderByList($sortFieldList . " " . $thisSort); // Save to Session
		} else {
			$fld->setSort("");
		}
	}

	// Session ORDER BY for List page
	public function getSessionOrderByList()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_ORDER_BY_LIST];
	}
	public function setSessionOrderByList($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_ORDER_BY_LIST] = $v;
	}

	// Current detail table name
	public function getCurrentDetailTable()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_DETAIL_TABLE];
	}
	public function setCurrentDetailTable($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_DETAIL_TABLE] = $v;
	}

	// Get detail url
	public function getDetailUrl()
	{

		// Detail url
		$detailUrl = "";
		if ($this->getCurrentDetailTable() == "ivf_semenanalysisreport") {
			$detailUrl = $GLOBALS["ivf_semenanalysisreport"]->getListUrl() . "?" . TABLE_SHOW_MASTER . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
			$detailUrl .= "&fk_RIDNO=" . urlencode($this->RIDNO->CurrentValue);
			$detailUrl .= "&fk_Name=" . urlencode($this->Name->CurrentValue);
		}
		if ($this->getCurrentDetailTable() == "ivf_oocytedenudation") {
			$detailUrl = $GLOBALS["ivf_oocytedenudation"]->getListUrl() . "?" . TABLE_SHOW_MASTER . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
			$detailUrl .= "&fk_RIDNO=" . urlencode($this->RIDNO->CurrentValue);
			$detailUrl .= "&fk_Name=" . urlencode($this->Name->CurrentValue);
		}
		if ($detailUrl == "")
			$detailUrl = "view_ivf_treatmentlist.php";
		return $detailUrl;
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`view_ivf_treatment`";
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
	public function getSqlSelectList() // Select for List page
	{
		$select = "";
		$select = "SELECT * FROM (" .
			"SELECT *, (SELECT DISTINCT CONCAT(COALESCE(`PatientID`, ''),'" . ValueSeparator(1, $this->Male) . "',COALESCE(`first_name`,''),'" . ValueSeparator(2, $this->Male) . "',COALESCE(`mobile_no`,'')) FROM `patient` `TMP_LOOKUPTABLE` WHERE `TMP_LOOKUPTABLE`.`id` = `view_ivf_treatment`.`Male` LIMIT 1) AS `EV__Male`, (SELECT CONCAT(COALESCE(`PatientID`, ''),'" . ValueSeparator(1, $this->Female) . "',COALESCE(`first_name`,''),'" . ValueSeparator(2, $this->Female) . "',COALESCE(`mobile_no`,'')) FROM `patient` `TMP_LOOKUPTABLE` WHERE `TMP_LOOKUPTABLE`.`id` = `view_ivf_treatment`.`Female` LIMIT 1) AS `EV__Female`, (SELECT `reference` FROM `mas_reference_type` `TMP_LOOKUPTABLE` WHERE `TMP_LOOKUPTABLE`.`reference` = `view_ivf_treatment`.`ReferedBy` LIMIT 1) AS `EV__ReferedBy` FROM `view_ivf_treatment`" .
			") `TMP_TABLE`";
		return ($this->SqlSelectList <> "") ? $this->SqlSelectList : $select;
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
		if ($this->useVirtualFields()) {
			$select = $this->getSqlSelectList();
			$sort = $this->UseSessionForListSql ? $this->getSessionOrderByList() : "";
		} else {
			$select = $this->getSqlSelect();
			$sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
		}
		return BuildSelectSql($select, $this->getSqlWhere(), $this->getSqlGroupBy(),
			$this->getSqlHaving(), $this->getSqlOrderBy(), $filter, $sort);
	}

	// Get ORDER BY clause
	public function getOrderBy()
	{
		$sort = ($this->useVirtualFields()) ? $this->getSessionOrderByList() : $this->getSessionOrderBy();
		return BuildSelectSql("", "", "", "", $this->getSqlOrderBy(), "", $sort);
	}

	// Check if virtual fields is used in SQL
	protected function useVirtualFields()
	{
		$where = $this->UseSessionForListSql ? $this->getSessionWhere() : $this->CurrentFilter;
		$orderBy = $this->UseSessionForListSql ? $this->getSessionOrderByList() : "";
		if ($where <> "")
			$where = " " . str_replace(array("(",")"), array("",""), $where) . " ";
		if ($orderBy <> "")
			$orderBy = " " . str_replace(array("(",")"), array("",""), $orderBy) . " ";
		if ($this->Male->AdvancedSearch->SearchValue <> "" ||
			$this->Male->AdvancedSearch->SearchValue2 <> "" ||
			ContainsString($where, " " . $this->Male->VirtualExpression . " "))
			return TRUE;
		if (ContainsString($orderBy, " " . $this->Male->VirtualExpression . " "))
			return TRUE;
		if ($this->Female->AdvancedSearch->SearchValue <> "" ||
			$this->Female->AdvancedSearch->SearchValue2 <> "" ||
			ContainsString($where, " " . $this->Female->VirtualExpression . " "))
			return TRUE;
		if (ContainsString($orderBy, " " . $this->Female->VirtualExpression . " "))
			return TRUE;
		if ($this->BasicSearch->getKeyword() <> "")
			return TRUE;
		if ($this->ReferedBy->AdvancedSearch->SearchValue <> "" ||
			$this->ReferedBy->AdvancedSearch->SearchValue2 <> "" ||
			ContainsString($where, " " . $this->ReferedBy->VirtualExpression . " "))
			return TRUE;
		if (ContainsString($orderBy, " " . $this->ReferedBy->VirtualExpression . " "))
			return TRUE;
		return FALSE;
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
		if ($this->useVirtualFields())
			$sql = BuildSelectSql($this->getSqlSelectList(), $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
		else
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

			// Get insert id if necessary
			$this->id1->setDbValue($conn->insert_ID());
			$rs['id1'] = $this->id1->DbValue;
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
			if (array_key_exists('id1', $rs))
				AddFilter($where, QuotedName('id1', $this->Dbid) . '=' . QuotedValue($rs['id1'], $this->id1->DataType, $this->Dbid));
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
		$this->malepropic->Upload->DbValue = $row['malepropic'];
		$this->femalepropic->Upload->DbValue = $row['femalepropic'];
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
		$oldFiles = EmptyValue($row['malepropic']) ? [] : [$row['malepropic']];
		foreach ($oldFiles as $oldFile) {
			if (file_exists($this->malepropic->oldPhysicalUploadPath() . $oldFile))
				@unlink($this->malepropic->oldPhysicalUploadPath() . $oldFile);
		}
		$oldFiles = EmptyValue($row['femalepropic']) ? [] : [$row['femalepropic']];
		foreach ($oldFiles as $oldFile) {
			if (file_exists($this->femalepropic->oldPhysicalUploadPath() . $oldFile))
				@unlink($this->femalepropic->oldPhysicalUploadPath() . $oldFile);
		}
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`id` = @id@ AND `id1` = @id1@";
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
		$val = is_array($row) ? (array_key_exists('id1', $row) ? $row['id1'] : NULL) : $this->id1->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@id1@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "view_ivf_treatmentlist.php";
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
		if ($pageName == "view_ivf_treatmentview.php")
			return $Language->phrase("View");
		elseif ($pageName == "view_ivf_treatmentedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "view_ivf_treatmentadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "view_ivf_treatmentlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("view_ivf_treatmentview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_ivf_treatmentview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "view_ivf_treatmentadd.php?" . $this->getUrlParm($parm);
		else
			$url = "view_ivf_treatmentadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("view_ivf_treatmentedit.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_ivf_treatmentedit.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
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
		if ($parm <> "")
			$url = $this->keyUrl("view_ivf_treatmentadd.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_ivf_treatmentadd.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
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
		return $this->keyUrl("view_ivf_treatmentdelete.php", $this->getUrlParm());
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
		$json .= ",id1:" . JsonEncode($this->id1->CurrentValue, "number");
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
		if ($this->id1->CurrentValue != NULL) {
			$url .= "&id1=" . urlencode($this->id1->CurrentValue);
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
			for ($i = 0; $i < $cnt; $i++)
				$arKeys[$i] = explode($COMPOSITE_KEY_SEPARATOR, $arKeys[$i]);
		} else {
			if (Param("id") !== NULL)
				$arKey[] = Param("id");
			elseif (IsApi() && Key(0) !== NULL)
				$arKey[] = Key(0);
			elseif (IsApi() && Route(2) !== NULL)
				$arKey[] = Route(2);
			else
				$arKeys = NULL; // Do not setup
			if (Param("id1") !== NULL)
				$arKey[] = Param("id1");
			elseif (IsApi() && Key(1) !== NULL)
				$arKey[] = Key(1);
			elseif (IsApi() && Route(3) !== NULL)
				$arKey[] = Route(3);
			else
				$arKeys = NULL; // Do not setup
			if (is_array($arKeys)) $arKeys[] = $arKey;

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = array();
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				if (!is_array($key) || count($key) <> 2)
					continue; // Just skip so other keys will still work
				if (!is_numeric($key[0])) // id
					continue;
				if (!is_numeric($key[1])) // id1
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
			$this->id->CurrentValue = $key[0];
			$this->id1->CurrentValue = $key[1];
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
		$this->RIDNO->setDbValue($rs->fields('RIDNO'));
		$this->Name->setDbValue($rs->fields('Name'));
		$this->Age->setDbValue($rs->fields('Age'));
		$this->treatment_status->setDbValue($rs->fields('treatment_status'));
		$this->ARTCYCLE->setDbValue($rs->fields('ARTCYCLE'));
		$this->RESULT->setDbValue($rs->fields('RESULT'));
		$this->status->setDbValue($rs->fields('status'));
		$this->createdby->setDbValue($rs->fields('createdby'));
		$this->createddatetime->setDbValue($rs->fields('createddatetime'));
		$this->modifiedby->setDbValue($rs->fields('modifiedby'));
		$this->modifieddatetime->setDbValue($rs->fields('modifieddatetime'));
		$this->TreatmentStartDate->setDbValue($rs->fields('TreatmentStartDate'));
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
		$this->status1->setDbValue($rs->fields('status1'));
		$this->id1->setDbValue($rs->fields('id1'));
		$this->Male->setDbValue($rs->fields('Male'));
		$this->Female->setDbValue($rs->fields('Female'));
		$this->malepropic->Upload->DbValue = $rs->fields('malepropic');
		$this->femalepropic->Upload->DbValue = $rs->fields('femalepropic');
		$this->HusbandEducation->setDbValue($rs->fields('HusbandEducation'));
		$this->WifeEducation->setDbValue($rs->fields('WifeEducation'));
		$this->HusbandWorkHours->setDbValue($rs->fields('HusbandWorkHours'));
		$this->WifeWorkHours->setDbValue($rs->fields('WifeWorkHours'));
		$this->PatientLanguage->setDbValue($rs->fields('PatientLanguage'));
		$this->ReferedBy->setDbValue($rs->fields('ReferedBy'));
		$this->ReferPhNo->setDbValue($rs->fields('ReferPhNo'));
		$this->ARTCYCLE1->setDbValue($rs->fields('ARTCYCLE1'));
		$this->RESULT1->setDbValue($rs->fields('RESULT1'));
		$this->CoupleID->setDbValue($rs->fields('CoupleID'));
		$this->HospID->setDbValue($rs->fields('HospID'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

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
		$curVal = strval($this->status1->CurrentValue);
		if ($curVal <> "") {
			$this->status1->ViewValue = $this->status1->lookupCacheOption($curVal);
			if ($this->status1->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->status1->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->status1->ViewValue = $this->status1->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->status1->ViewValue = $this->status1->CurrentValue;
				}
			}
		} else {
			$this->status1->ViewValue = NULL;
		}
		$this->status1->ViewCustomAttributes = "";

		// id1
		$this->id1->ViewValue = $this->id1->CurrentValue;
		$this->id1->ViewCustomAttributes = "";

		// Male
		if ($this->Male->VirtualValue <> "") {
			$this->Male->ViewValue = $this->Male->VirtualValue;
		} else {
		$curVal = strval($this->Male->CurrentValue);
		if ($curVal <> "") {
			$this->Male->ViewValue = $this->Male->lookupCacheOption($curVal);
			if ($this->Male->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->Male->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$arwrk[3] = $rswrk->fields('df3');
					$this->Male->ViewValue = $this->Male->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Male->ViewValue = $this->Male->CurrentValue;
				}
			}
		} else {
			$this->Male->ViewValue = NULL;
		}
		}
		$this->Male->ViewCustomAttributes = "";

		// Female
		if ($this->Female->VirtualValue <> "") {
			$this->Female->ViewValue = $this->Female->VirtualValue;
		} else {
		$curVal = strval($this->Female->CurrentValue);
		if ($curVal <> "") {
			$this->Female->ViewValue = $this->Female->lookupCacheOption($curVal);
			if ($this->Female->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->Female->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$arwrk[3] = $rswrk->fields('df3');
					$this->Female->ViewValue = $this->Female->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Female->ViewValue = $this->Female->CurrentValue;
				}
			}
		} else {
			$this->Female->ViewValue = NULL;
		}
		}
		$this->Female->ViewCustomAttributes = "";

		// malepropic
		if (!EmptyValue($this->malepropic->Upload->DbValue)) {
			$this->malepropic->ImageWidth = 80;
			$this->malepropic->ImageHeight = 80;
			$this->malepropic->ImageAlt = $this->malepropic->alt();
			$this->malepropic->ViewValue = $this->malepropic->Upload->DbValue;
		} else {
			$this->malepropic->ViewValue = "";
		}
		$this->malepropic->ViewCustomAttributes = "";

		// femalepropic
		if (!EmptyValue($this->femalepropic->Upload->DbValue)) {
			$this->femalepropic->ImageWidth = 80;
			$this->femalepropic->ImageHeight = 80;
			$this->femalepropic->ImageAlt = $this->femalepropic->alt();
			$this->femalepropic->ViewValue = $this->femalepropic->Upload->DbValue;
		} else {
			$this->femalepropic->ViewValue = "";
		}
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
		if ($this->ReferedBy->VirtualValue <> "") {
			$this->ReferedBy->ViewValue = $this->ReferedBy->VirtualValue;
		} else {
		$curVal = strval($this->ReferedBy->CurrentValue);
		if ($curVal <> "") {
			$this->ReferedBy->ViewValue = $this->ReferedBy->lookupCacheOption($curVal);
			if ($this->ReferedBy->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->ReferedBy->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->ReferedBy->ViewValue = $this->ReferedBy->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->ReferedBy->ViewValue = $this->ReferedBy->CurrentValue;
				}
			}
		} else {
			$this->ReferedBy->ViewValue = NULL;
		}
		}
		$this->ReferedBy->ViewCustomAttributes = "";

		// ReferPhNo
		$this->ReferPhNo->ViewValue = $this->ReferPhNo->CurrentValue;
		$this->ReferPhNo->ViewCustomAttributes = "";

		// ARTCYCLE1
		if (strval($this->ARTCYCLE1->CurrentValue) <> "") {
			$this->ARTCYCLE1->ViewValue = $this->ARTCYCLE1->optionCaption($this->ARTCYCLE1->CurrentValue);
		} else {
			$this->ARTCYCLE1->ViewValue = NULL;
		}
		$this->ARTCYCLE1->ViewCustomAttributes = "";

		// RESULT1
		if (strval($this->RESULT1->CurrentValue) <> "") {
			$this->RESULT1->ViewValue = $this->RESULT1->optionCaption($this->RESULT1->CurrentValue);
		} else {
			$this->RESULT1->ViewValue = NULL;
		}
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
		if (!EmptyValue($this->malepropic->Upload->DbValue)) {
			$this->malepropic->HrefValue = GetFileUploadUrl($this->malepropic, $this->malepropic->Upload->DbValue); // Add prefix/suffix
			$this->malepropic->LinkAttrs["target"] = ""; // Add target
			if ($this->isExport()) $this->malepropic->HrefValue = FullUrl($this->malepropic->HrefValue, "href");
		} else {
			$this->malepropic->HrefValue = "";
		}
		$this->malepropic->ExportHrefValue = $this->malepropic->UploadPath . $this->malepropic->Upload->DbValue;
		$this->malepropic->TooltipValue = "";
		if ($this->malepropic->UseColorbox) {
			if (EmptyValue($this->malepropic->TooltipValue))
				$this->malepropic->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
			$this->malepropic->LinkAttrs["data-rel"] = "view_ivf_treatment_x_malepropic";
			AppendClass($this->malepropic->LinkAttrs["class"], "ew-lightbox");
		}

		// femalepropic
		$this->femalepropic->LinkCustomAttributes = "";
		if (!EmptyValue($this->femalepropic->Upload->DbValue)) {
			$this->femalepropic->HrefValue = GetFileUploadUrl($this->femalepropic, $this->femalepropic->Upload->DbValue); // Add prefix/suffix
			$this->femalepropic->LinkAttrs["target"] = ""; // Add target
			if ($this->isExport()) $this->femalepropic->HrefValue = FullUrl($this->femalepropic->HrefValue, "href");
		} else {
			$this->femalepropic->HrefValue = "";
		}
		$this->femalepropic->ExportHrefValue = $this->femalepropic->UploadPath . $this->femalepropic->Upload->DbValue;
		$this->femalepropic->TooltipValue = "";
		if ($this->femalepropic->UseColorbox) {
			if (EmptyValue($this->femalepropic->TooltipValue))
				$this->femalepropic->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
			$this->femalepropic->LinkAttrs["data-rel"] = "view_ivf_treatment_x_femalepropic";
			AppendClass($this->femalepropic->LinkAttrs["class"], "ew-lightbox");
		}

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

		// RIDNO
		$this->RIDNO->EditAttrs["class"] = "form-control";
		$this->RIDNO->EditCustomAttributes = "";
		$this->RIDNO->EditValue = $this->RIDNO->CurrentValue;
		$this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());

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

		// treatment_status
		$this->treatment_status->EditAttrs["class"] = "form-control";
		$this->treatment_status->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->treatment_status->CurrentValue = HtmlDecode($this->treatment_status->CurrentValue);
		$this->treatment_status->EditValue = $this->treatment_status->CurrentValue;
		$this->treatment_status->PlaceHolder = RemoveHtml($this->treatment_status->caption());

		// ARTCYCLE
		$this->ARTCYCLE->EditAttrs["class"] = "form-control";
		$this->ARTCYCLE->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ARTCYCLE->CurrentValue = HtmlDecode($this->ARTCYCLE->CurrentValue);
		$this->ARTCYCLE->EditValue = $this->ARTCYCLE->CurrentValue;
		$this->ARTCYCLE->PlaceHolder = RemoveHtml($this->ARTCYCLE->caption());

		// RESULT
		$this->RESULT->EditAttrs["class"] = "form-control";
		$this->RESULT->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->RESULT->CurrentValue = HtmlDecode($this->RESULT->CurrentValue);
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
		if (REMOVE_XSS)
			$this->TypePatient->CurrentValue = HtmlDecode($this->TypePatient->CurrentValue);
		$this->TypePatient->EditValue = $this->TypePatient->CurrentValue;
		$this->TypePatient->PlaceHolder = RemoveHtml($this->TypePatient->caption());

		// Treatment
		$this->Treatment->EditAttrs["class"] = "form-control";
		$this->Treatment->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Treatment->CurrentValue = HtmlDecode($this->Treatment->CurrentValue);
		$this->Treatment->EditValue = $this->Treatment->CurrentValue;
		$this->Treatment->PlaceHolder = RemoveHtml($this->Treatment->caption());

		// TreatmentTec
		$this->TreatmentTec->EditAttrs["class"] = "form-control";
		$this->TreatmentTec->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->TreatmentTec->CurrentValue = HtmlDecode($this->TreatmentTec->CurrentValue);
		$this->TreatmentTec->EditValue = $this->TreatmentTec->CurrentValue;
		$this->TreatmentTec->PlaceHolder = RemoveHtml($this->TreatmentTec->caption());

		// TypeOfCycle
		$this->TypeOfCycle->EditAttrs["class"] = "form-control";
		$this->TypeOfCycle->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->TypeOfCycle->CurrentValue = HtmlDecode($this->TypeOfCycle->CurrentValue);
		$this->TypeOfCycle->EditValue = $this->TypeOfCycle->CurrentValue;
		$this->TypeOfCycle->PlaceHolder = RemoveHtml($this->TypeOfCycle->caption());

		// SpermOrgin
		$this->SpermOrgin->EditAttrs["class"] = "form-control";
		$this->SpermOrgin->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->SpermOrgin->CurrentValue = HtmlDecode($this->SpermOrgin->CurrentValue);
		$this->SpermOrgin->EditValue = $this->SpermOrgin->CurrentValue;
		$this->SpermOrgin->PlaceHolder = RemoveHtml($this->SpermOrgin->caption());

		// State
		$this->State->EditAttrs["class"] = "form-control";
		$this->State->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->State->CurrentValue = HtmlDecode($this->State->CurrentValue);
		$this->State->EditValue = $this->State->CurrentValue;
		$this->State->PlaceHolder = RemoveHtml($this->State->caption());

		// Origin
		$this->Origin->EditAttrs["class"] = "form-control";
		$this->Origin->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Origin->CurrentValue = HtmlDecode($this->Origin->CurrentValue);
		$this->Origin->EditValue = $this->Origin->CurrentValue;
		$this->Origin->PlaceHolder = RemoveHtml($this->Origin->caption());

		// MACS
		$this->MACS->EditAttrs["class"] = "form-control";
		$this->MACS->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->MACS->CurrentValue = HtmlDecode($this->MACS->CurrentValue);
		$this->MACS->EditValue = $this->MACS->CurrentValue;
		$this->MACS->PlaceHolder = RemoveHtml($this->MACS->caption());

		// Technique
		$this->Technique->EditAttrs["class"] = "form-control";
		$this->Technique->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Technique->CurrentValue = HtmlDecode($this->Technique->CurrentValue);
		$this->Technique->EditValue = $this->Technique->CurrentValue;
		$this->Technique->PlaceHolder = RemoveHtml($this->Technique->caption());

		// PgdPlanning
		$this->PgdPlanning->EditAttrs["class"] = "form-control";
		$this->PgdPlanning->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PgdPlanning->CurrentValue = HtmlDecode($this->PgdPlanning->CurrentValue);
		$this->PgdPlanning->EditValue = $this->PgdPlanning->CurrentValue;
		$this->PgdPlanning->PlaceHolder = RemoveHtml($this->PgdPlanning->caption());

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

		// status1
		$this->status1->EditAttrs["class"] = "form-control";
		$this->status1->EditCustomAttributes = "";

		// id1
		$this->id1->EditAttrs["class"] = "form-control";
		$this->id1->EditCustomAttributes = "";
		$this->id1->EditValue = $this->id1->CurrentValue;
		$this->id1->ViewCustomAttributes = "";

		// Male
		$this->Male->EditAttrs["class"] = "form-control";
		$this->Male->EditCustomAttributes = "";

		// Female
		$this->Female->EditAttrs["class"] = "form-control";
		$this->Female->EditCustomAttributes = "";

		// malepropic
		$this->malepropic->EditAttrs["class"] = "form-control";
		$this->malepropic->EditCustomAttributes = "";
		if (!EmptyValue($this->malepropic->Upload->DbValue)) {
			$this->malepropic->ImageWidth = 80;
			$this->malepropic->ImageHeight = 80;
			$this->malepropic->ImageAlt = $this->malepropic->alt();
			$this->malepropic->EditValue = $this->malepropic->Upload->DbValue;
		} else {
			$this->malepropic->EditValue = "";
		}
		if (!EmptyValue($this->malepropic->CurrentValue))
				$this->malepropic->Upload->FileName = $this->malepropic->CurrentValue;

		// femalepropic
		$this->femalepropic->EditAttrs["class"] = "form-control";
		$this->femalepropic->EditCustomAttributes = "";
		if (!EmptyValue($this->femalepropic->Upload->DbValue)) {
			$this->femalepropic->ImageWidth = 80;
			$this->femalepropic->ImageHeight = 80;
			$this->femalepropic->ImageAlt = $this->femalepropic->alt();
			$this->femalepropic->EditValue = $this->femalepropic->Upload->DbValue;
		} else {
			$this->femalepropic->EditValue = "";
		}
		if (!EmptyValue($this->femalepropic->CurrentValue))
				$this->femalepropic->Upload->FileName = $this->femalepropic->CurrentValue;

		// HusbandEducation
		$this->HusbandEducation->EditAttrs["class"] = "form-control";
		$this->HusbandEducation->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->HusbandEducation->CurrentValue = HtmlDecode($this->HusbandEducation->CurrentValue);
		$this->HusbandEducation->EditValue = $this->HusbandEducation->CurrentValue;
		$this->HusbandEducation->PlaceHolder = RemoveHtml($this->HusbandEducation->caption());

		// WifeEducation
		$this->WifeEducation->EditAttrs["class"] = "form-control";
		$this->WifeEducation->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->WifeEducation->CurrentValue = HtmlDecode($this->WifeEducation->CurrentValue);
		$this->WifeEducation->EditValue = $this->WifeEducation->CurrentValue;
		$this->WifeEducation->PlaceHolder = RemoveHtml($this->WifeEducation->caption());

		// HusbandWorkHours
		$this->HusbandWorkHours->EditAttrs["class"] = "form-control";
		$this->HusbandWorkHours->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->HusbandWorkHours->CurrentValue = HtmlDecode($this->HusbandWorkHours->CurrentValue);
		$this->HusbandWorkHours->EditValue = $this->HusbandWorkHours->CurrentValue;
		$this->HusbandWorkHours->PlaceHolder = RemoveHtml($this->HusbandWorkHours->caption());

		// WifeWorkHours
		$this->WifeWorkHours->EditAttrs["class"] = "form-control";
		$this->WifeWorkHours->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->WifeWorkHours->CurrentValue = HtmlDecode($this->WifeWorkHours->CurrentValue);
		$this->WifeWorkHours->EditValue = $this->WifeWorkHours->CurrentValue;
		$this->WifeWorkHours->PlaceHolder = RemoveHtml($this->WifeWorkHours->caption());

		// PatientLanguage
		$this->PatientLanguage->EditAttrs["class"] = "form-control";
		$this->PatientLanguage->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PatientLanguage->CurrentValue = HtmlDecode($this->PatientLanguage->CurrentValue);
		$this->PatientLanguage->EditValue = $this->PatientLanguage->CurrentValue;
		$this->PatientLanguage->PlaceHolder = RemoveHtml($this->PatientLanguage->caption());

		// ReferedBy
		$this->ReferedBy->EditAttrs["class"] = "form-control";
		$this->ReferedBy->EditCustomAttributes = "";

		// ReferPhNo
		$this->ReferPhNo->EditAttrs["class"] = "form-control";
		$this->ReferPhNo->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ReferPhNo->CurrentValue = HtmlDecode($this->ReferPhNo->CurrentValue);
		$this->ReferPhNo->EditValue = $this->ReferPhNo->CurrentValue;
		$this->ReferPhNo->PlaceHolder = RemoveHtml($this->ReferPhNo->caption());

		// ARTCYCLE1
		$this->ARTCYCLE1->EditAttrs["class"] = "form-control";
		$this->ARTCYCLE1->EditCustomAttributes = "";
		$this->ARTCYCLE1->EditValue = $this->ARTCYCLE1->options(TRUE);

		// RESULT1
		$this->RESULT1->EditAttrs["class"] = "form-control";
		$this->RESULT1->EditCustomAttributes = "";
		$this->RESULT1->EditValue = $this->RESULT1->options(TRUE);

		// CoupleID
		$this->CoupleID->EditAttrs["class"] = "form-control";
		$this->CoupleID->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->CoupleID->CurrentValue = HtmlDecode($this->CoupleID->CurrentValue);
		$this->CoupleID->EditValue = $this->CoupleID->CurrentValue;
		$this->CoupleID->PlaceHolder = RemoveHtml($this->CoupleID->caption());

		// HospID
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
		global $COMPOSITE_KEY_SEPARATOR;

		// Set up field name / file name field / file type field
		$fldName = "";
		$fileNameFld = "";
		$fileTypeFld = "";
		if ($fldparm == 'malepropic') {
			$fldName = "malepropic";
			$fileNameFld = "malepropic";
		} elseif ($fldparm == 'femalepropic') {
			$fldName = "femalepropic";
			$fileNameFld = "femalepropic";
		} else {
			return FALSE; // Incorrect field
		}

		// Set up key values
		$ar = explode($COMPOSITE_KEY_SEPARATOR, $key);
		if (count($ar) == 2) {
			$this->id->CurrentValue = $ar[0];
			$this->id1->CurrentValue = $ar[1];
		} else {
			return FALSE; // Incorrect key
		}

		// Set up filter (WHERE Clause)
		$filter = $this->getRecordFilter();
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = &$this->getConnection();
		$dbtype = GetConnectionType($this->Dbid);
		if (($rs = $conn->execute($sql)) && !$rs->EOF) {
			$val = $rs->fields($fldName);
			if (!EmptyValue($val)) {
				$fld = $this->fields[$fldName];

				// Binary data
				if ($fld->DataType == DATATYPE_BLOB) {
					if ($dbtype <> "MYSQL") {
						if (is_array($val) || is_object($val)) // Byte array
							$val = BytesToString($val);
					}
					if ($resize)
						ResizeBinary($val, $width, $height);

					// Write file type
					if ($fileTypeFld <> "" && !EmptyValue($rs->fields($fileTypeFld))) {
						AddHeader("Content-type", $rs->fields($fileTypeFld));
					} else {
						AddHeader("Content-type", ContentType($val));
					}

					// Write file name
					if ($fileNameFld <> "" && !EmptyValue($rs->fields($fileNameFld)))
						AddHeader("Content-Disposition", "attachment; filename=\"" . $rs->fields($fileNameFld) . "\"");

					// Write file data
					if (StartsString("PK", $val) && ContainsString($val, "[Content_Types].xml") &&
						ContainsString($val, "_rels") && ContainsString($val, "docProps")) { // Fix Office 2007 documents
						if (!EndsString("\0\0\0", $val)) // Not ends with 3 or 4 \0
							$val .= "\0\0\0\0";
					}

					// Clear output buffer
					if (ob_get_length())
						ob_end_clean();

					// Write binary data
					Write($val);

				// Upload to folder
				} else {
					if ($fld->UploadMultiple)
						$files = explode(MULTIPLE_UPLOAD_SEPARATOR, $val);
					else
						$files = [$val];
					$data = [];
					$ar = [];
					foreach ($files as $file) {
						if (!EmptyValue($file))
							$ar[$file] = FullUrl($fld->hrefPath() . $file);
					}
					$data[$fld->Param] = $ar;
					WriteJson($data);
				}
			}
			$rs->close();
			return TRUE;
		}
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