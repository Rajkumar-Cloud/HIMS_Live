<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for patient_ot_surgery_register
 */
class patient_ot_surgery_register extends DbTable
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

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'patient_ot_surgery_register';
		$this->TableName = 'patient_ot_surgery_register';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`patient_ot_surgery_register`";
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
		$this->id = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// PatID
		$this->PatID = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_PatID', 'PatID', '`PatID`', '`PatID`', 200, -1, FALSE, '`PatID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatID->Sortable = TRUE; // Allow sort
		$this->fields['PatID'] = &$this->PatID;

		// PatientName
		$this->PatientName = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, -1, FALSE, '`PatientName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientName->Sortable = TRUE; // Allow sort
		$this->fields['PatientName'] = &$this->PatientName;

		// mrnno
		$this->mrnno = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_mrnno', 'mrnno', '`mrnno`', '`mrnno`', 200, -1, FALSE, '`mrnno`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mrnno->IsForeignKey = TRUE; // Foreign key field
		$this->mrnno->Sortable = TRUE; // Allow sort
		$this->fields['mrnno'] = &$this->mrnno;

		// MobileNumber
		$this->MobileNumber = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_MobileNumber', 'MobileNumber', '`MobileNumber`', '`MobileNumber`', 200, -1, FALSE, '`MobileNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MobileNumber->Sortable = TRUE; // Allow sort
		$this->fields['MobileNumber'] = &$this->MobileNumber;

		// Age
		$this->Age = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_Age', 'Age', '`Age`', '`Age`', 200, -1, FALSE, '`Age`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Age->Sortable = TRUE; // Allow sort
		$this->fields['Age'] = &$this->Age;

		// Gender
		$this->Gender = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_Gender', 'Gender', '`Gender`', '`Gender`', 200, -1, FALSE, '`Gender`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Gender->Sortable = TRUE; // Allow sort
		$this->fields['Gender'] = &$this->Gender;

		// profilePic
		$this->profilePic = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_profilePic', 'profilePic', '`profilePic`', '`profilePic`', 201, -1, FALSE, '`profilePic`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->profilePic->Sortable = TRUE; // Allow sort
		$this->fields['profilePic'] = &$this->profilePic;

		// diagnosis
		$this->diagnosis = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_diagnosis', 'diagnosis', '`diagnosis`', '`diagnosis`', 201, -1, FALSE, '`diagnosis`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->diagnosis->Sortable = TRUE; // Allow sort
		$this->fields['diagnosis'] = &$this->diagnosis;

		// proposedSurgery
		$this->proposedSurgery = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_proposedSurgery', 'proposedSurgery', '`proposedSurgery`', '`proposedSurgery`', 201, -1, FALSE, '`proposedSurgery`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->proposedSurgery->Sortable = TRUE; // Allow sort
		$this->fields['proposedSurgery'] = &$this->proposedSurgery;

		// surgeryProcedure
		$this->surgeryProcedure = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_surgeryProcedure', 'surgeryProcedure', '`surgeryProcedure`', '`surgeryProcedure`', 201, -1, FALSE, '`surgeryProcedure`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->surgeryProcedure->Sortable = TRUE; // Allow sort
		$this->fields['surgeryProcedure'] = &$this->surgeryProcedure;

		// typeOfAnaesthesia
		$this->typeOfAnaesthesia = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_typeOfAnaesthesia', 'typeOfAnaesthesia', '`typeOfAnaesthesia`', '`typeOfAnaesthesia`', 201, -1, FALSE, '`typeOfAnaesthesia`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->typeOfAnaesthesia->Sortable = TRUE; // Allow sort
		$this->fields['typeOfAnaesthesia'] = &$this->typeOfAnaesthesia;

		// RecievedTime
		$this->RecievedTime = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_RecievedTime', 'RecievedTime', '`RecievedTime`', CastDateFieldForLike('`RecievedTime`', 11, "DB"), 135, 11, FALSE, '`RecievedTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RecievedTime->Sortable = TRUE; // Allow sort
		$this->RecievedTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['RecievedTime'] = &$this->RecievedTime;

		// AnaesthesiaStarted
		$this->AnaesthesiaStarted = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_AnaesthesiaStarted', 'AnaesthesiaStarted', '`AnaesthesiaStarted`', CastDateFieldForLike('`AnaesthesiaStarted`', 11, "DB"), 135, 11, FALSE, '`AnaesthesiaStarted`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AnaesthesiaStarted->Sortable = TRUE; // Allow sort
		$this->AnaesthesiaStarted->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['AnaesthesiaStarted'] = &$this->AnaesthesiaStarted;

		// AnaesthesiaEnded
		$this->AnaesthesiaEnded = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_AnaesthesiaEnded', 'AnaesthesiaEnded', '`AnaesthesiaEnded`', CastDateFieldForLike('`AnaesthesiaEnded`', 11, "DB"), 135, 11, FALSE, '`AnaesthesiaEnded`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AnaesthesiaEnded->Sortable = TRUE; // Allow sort
		$this->AnaesthesiaEnded->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['AnaesthesiaEnded'] = &$this->AnaesthesiaEnded;

		// surgeryStarted
		$this->surgeryStarted = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_surgeryStarted', 'surgeryStarted', '`surgeryStarted`', CastDateFieldForLike('`surgeryStarted`', 11, "DB"), 135, 11, FALSE, '`surgeryStarted`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->surgeryStarted->Sortable = TRUE; // Allow sort
		$this->surgeryStarted->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['surgeryStarted'] = &$this->surgeryStarted;

		// surgeryEnded
		$this->surgeryEnded = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_surgeryEnded', 'surgeryEnded', '`surgeryEnded`', CastDateFieldForLike('`surgeryEnded`', 17, "DB"), 135, 17, FALSE, '`surgeryEnded`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->surgeryEnded->Sortable = TRUE; // Allow sort
		$this->surgeryEnded->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectShortDateDMY"));
		$this->fields['surgeryEnded'] = &$this->surgeryEnded;

		// RecoveryTime
		$this->RecoveryTime = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_RecoveryTime', 'RecoveryTime', '`RecoveryTime`', CastDateFieldForLike('`RecoveryTime`', 11, "DB"), 135, 11, FALSE, '`RecoveryTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RecoveryTime->Sortable = TRUE; // Allow sort
		$this->RecoveryTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['RecoveryTime'] = &$this->RecoveryTime;

		// ShiftedTime
		$this->ShiftedTime = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_ShiftedTime', 'ShiftedTime', '`ShiftedTime`', CastDateFieldForLike('`ShiftedTime`', 11, "DB"), 135, 11, FALSE, '`ShiftedTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ShiftedTime->Sortable = TRUE; // Allow sort
		$this->ShiftedTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['ShiftedTime'] = &$this->ShiftedTime;

		// Duration
		$this->Duration = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_Duration', 'Duration', '`Duration`', '`Duration`', 200, 3, FALSE, '`Duration`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Duration->Sortable = TRUE; // Allow sort
		$this->fields['Duration'] = &$this->Duration;

		// Surgeon
		$this->Surgeon = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_Surgeon', 'Surgeon', '`Surgeon`', '`Surgeon`', 200, -1, FALSE, '`Surgeon`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Surgeon->Sortable = TRUE; // Allow sort
		$this->Surgeon->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Surgeon->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Surgeon->Lookup = new Lookup('Surgeon', 'doctors', FALSE, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Surgeon'] = &$this->Surgeon;

		// Anaesthetist
		$this->Anaesthetist = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_Anaesthetist', 'Anaesthetist', '`Anaesthetist`', '`Anaesthetist`', 200, -1, FALSE, '`Anaesthetist`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Anaesthetist->Sortable = TRUE; // Allow sort
		$this->Anaesthetist->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Anaesthetist->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Anaesthetist->Lookup = new Lookup('Anaesthetist', 'doctors', FALSE, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Anaesthetist'] = &$this->Anaesthetist;

		// AsstSurgeon1
		$this->AsstSurgeon1 = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_AsstSurgeon1', 'AsstSurgeon1', '`AsstSurgeon1`', '`AsstSurgeon1`', 200, -1, FALSE, '`AsstSurgeon1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->AsstSurgeon1->Sortable = TRUE; // Allow sort
		$this->AsstSurgeon1->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->AsstSurgeon1->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->AsstSurgeon1->Lookup = new Lookup('AsstSurgeon1', 'doctors', FALSE, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
		$this->fields['AsstSurgeon1'] = &$this->AsstSurgeon1;

		// AsstSurgeon2
		$this->AsstSurgeon2 = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_AsstSurgeon2', 'AsstSurgeon2', '`AsstSurgeon2`', '`AsstSurgeon2`', 200, -1, FALSE, '`AsstSurgeon2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->AsstSurgeon2->Sortable = TRUE; // Allow sort
		$this->AsstSurgeon2->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->AsstSurgeon2->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->AsstSurgeon2->Lookup = new Lookup('AsstSurgeon2', 'doctors', FALSE, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
		$this->fields['AsstSurgeon2'] = &$this->AsstSurgeon2;

		// paediatric
		$this->paediatric = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_paediatric', 'paediatric', '`paediatric`', '`paediatric`', 200, -1, FALSE, '`paediatric`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->paediatric->Sortable = TRUE; // Allow sort
		$this->paediatric->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->paediatric->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->paediatric->Lookup = new Lookup('paediatric', 'doctors', FALSE, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
		$this->fields['paediatric'] = &$this->paediatric;

		// ScrubNurse1
		$this->ScrubNurse1 = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_ScrubNurse1', 'ScrubNurse1', '`ScrubNurse1`', '`ScrubNurse1`', 200, -1, FALSE, '`ScrubNurse1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ScrubNurse1->Sortable = TRUE; // Allow sort
		$this->fields['ScrubNurse1'] = &$this->ScrubNurse1;

		// ScrubNurse2
		$this->ScrubNurse2 = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_ScrubNurse2', 'ScrubNurse2', '`ScrubNurse2`', '`ScrubNurse2`', 200, -1, FALSE, '`ScrubNurse2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ScrubNurse2->Sortable = TRUE; // Allow sort
		$this->fields['ScrubNurse2'] = &$this->ScrubNurse2;

		// FloorNurse
		$this->FloorNurse = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_FloorNurse', 'FloorNurse', '`FloorNurse`', '`FloorNurse`', 200, -1, FALSE, '`FloorNurse`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FloorNurse->Sortable = TRUE; // Allow sort
		$this->fields['FloorNurse'] = &$this->FloorNurse;

		// Technician
		$this->Technician = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_Technician', 'Technician', '`Technician`', '`Technician`', 200, -1, FALSE, '`Technician`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Technician->Sortable = TRUE; // Allow sort
		$this->fields['Technician'] = &$this->Technician;

		// HouseKeeping
		$this->HouseKeeping = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_HouseKeeping', 'HouseKeeping', '`HouseKeeping`', '`HouseKeeping`', 200, -1, FALSE, '`HouseKeeping`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HouseKeeping->Sortable = TRUE; // Allow sort
		$this->fields['HouseKeeping'] = &$this->HouseKeeping;

		// countsCheckedMops
		$this->countsCheckedMops = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_countsCheckedMops', 'countsCheckedMops', '`countsCheckedMops`', '`countsCheckedMops`', 200, -1, FALSE, '`countsCheckedMops`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->countsCheckedMops->Sortable = TRUE; // Allow sort
		$this->fields['countsCheckedMops'] = &$this->countsCheckedMops;

		// gauze
		$this->gauze = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_gauze', 'gauze', '`gauze`', '`gauze`', 200, -1, FALSE, '`gauze`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->gauze->Sortable = TRUE; // Allow sort
		$this->fields['gauze'] = &$this->gauze;

		// needles
		$this->needles = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_needles', 'needles', '`needles`', '`needles`', 200, -1, FALSE, '`needles`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->needles->Sortable = TRUE; // Allow sort
		$this->fields['needles'] = &$this->needles;

		// bloodloss
		$this->bloodloss = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_bloodloss', 'bloodloss', '`bloodloss`', '`bloodloss`', 200, -1, FALSE, '`bloodloss`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->bloodloss->Sortable = TRUE; // Allow sort
		$this->fields['bloodloss'] = &$this->bloodloss;

		// bloodtransfusion
		$this->bloodtransfusion = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_bloodtransfusion', 'bloodtransfusion', '`bloodtransfusion`', '`bloodtransfusion`', 200, -1, FALSE, '`bloodtransfusion`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->bloodtransfusion->Sortable = TRUE; // Allow sort
		$this->fields['bloodtransfusion'] = &$this->bloodtransfusion;

		// implantsUsed
		$this->implantsUsed = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_implantsUsed', 'implantsUsed', '`implantsUsed`', '`implantsUsed`', 201, -1, FALSE, '`implantsUsed`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->implantsUsed->Sortable = TRUE; // Allow sort
		$this->fields['implantsUsed'] = &$this->implantsUsed;

		// MaterialsForHPE
		$this->MaterialsForHPE = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_MaterialsForHPE', 'MaterialsForHPE', '`MaterialsForHPE`', '`MaterialsForHPE`', 201, -1, FALSE, '`MaterialsForHPE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->MaterialsForHPE->Sortable = TRUE; // Allow sort
		$this->fields['MaterialsForHPE'] = &$this->MaterialsForHPE;

		// status
		$this->status = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_status', 'status', '`status`', '`status`', 3, -1, FALSE, '`status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->status->Sortable = TRUE; // Allow sort
		$this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['status'] = &$this->status;

		// createdby
		$this->createdby = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, -1, FALSE, '`createdby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdby->Sortable = TRUE; // Allow sort
		$this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['createdby'] = &$this->createdby;

		// createddatetime
		$this->createddatetime = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike('`createddatetime`', 0, "DB"), 135, 0, FALSE, '`createddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = TRUE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['createddatetime'] = &$this->createddatetime;

		// modifiedby
		$this->modifiedby = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, -1, FALSE, '`modifiedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifiedby->Sortable = TRUE; // Allow sort
		$this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['modifiedby'] = &$this->modifiedby;

		// modifieddatetime
		$this->modifieddatetime = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike('`modifieddatetime`', 0, "DB"), 135, 0, FALSE, '`modifieddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifieddatetime->Sortable = TRUE; // Allow sort
		$this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['modifieddatetime'] = &$this->modifieddatetime;

		// HospID
		$this->HospID = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->fields['HospID'] = &$this->HospID;

		// PatientSearch
		$this->PatientSearch = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_PatientSearch', 'PatientSearch', '\'\'', '\'\'', 201, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->PatientSearch->IsCustom = TRUE; // Custom field
		$this->PatientSearch->Sortable = TRUE; // Allow sort
		$this->PatientSearch->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->PatientSearch->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->PatientSearch->Lookup = new Lookup('PatientSearch', 'ip_admission', FALSE, 'id', ["mrnNo","patient_name","patient_id","mobileno"], [], [], [], [], [], [], '`id` DESC', '');
		$this->fields['PatientSearch'] = &$this->PatientSearch;

		// Reception
		$this->Reception = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_Reception', 'Reception', '`Reception`', '`Reception`', 3, -1, FALSE, '`Reception`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Reception->IsForeignKey = TRUE; // Foreign key field
		$this->Reception->Sortable = TRUE; // Allow sort
		$this->Reception->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Reception'] = &$this->Reception;

		// PatientID
		$this->PatientID = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_PatientID', 'PatientID', '`PatientID`', '`PatientID`', 200, -1, FALSE, '`PatientID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientID->Sortable = TRUE; // Allow sort
		$this->fields['PatientID'] = &$this->PatientID;

		// PId
		$this->PId = new DbField('patient_ot_surgery_register', 'patient_ot_surgery_register', 'x_PId', 'PId', '`PId`', '`PId`', 3, -1, FALSE, '`PId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PId->IsForeignKey = TRUE; // Foreign key field
		$this->PId->Sortable = TRUE; // Allow sort
		$this->PId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['PId'] = &$this->PId;
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

	// Current master table name
	public function getCurrentMasterTable()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_MASTER_TABLE];
	}
	public function setCurrentMasterTable($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_MASTER_TABLE] = $v;
	}

	// Session master WHERE clause
	public function getMasterFilter()
	{

		// Master filter
		$masterFilter = "";
		if ($this->getCurrentMasterTable() == "ip_admission") {
			if ($this->Reception->getSessionValue() <> "")
				$masterFilter .= "`id`=" . QuotedValue($this->Reception->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->mrnno->getSessionValue() <> "")
				$masterFilter .= " AND `mrnNo`=" . QuotedValue($this->mrnno->getSessionValue(), DATATYPE_STRING, "DB");
			else
				return "";
			if ($this->PId->getSessionValue() <> "")
				$masterFilter .= " AND `patient_id`=" . QuotedValue($this->PId->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
		}
		return $masterFilter;
	}

	// Session detail WHERE clause
	public function getDetailFilter()
	{

		// Detail filter
		$detailFilter = "";
		if ($this->getCurrentMasterTable() == "ip_admission") {
			if ($this->Reception->getSessionValue() <> "")
				$detailFilter .= "`Reception`=" . QuotedValue($this->Reception->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->mrnno->getSessionValue() <> "")
				$detailFilter .= " AND `mrnno`=" . QuotedValue($this->mrnno->getSessionValue(), DATATYPE_STRING, "DB");
			else
				return "";
			if ($this->PId->getSessionValue() <> "")
				$detailFilter .= " AND `PId`=" . QuotedValue($this->PId->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`patient_ot_surgery_register`";
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
		return ($this->SqlSelect <> "") ? $this->SqlSelect : "SELECT *, '' AS `PatientSearch` FROM " . $this->getSqlFrom();
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
		$this->TableFilter = "`HospID`='".HospitalID()."'";
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
			return "patient_ot_surgery_registerlist.php";
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
		if ($pageName == "patient_ot_surgery_registerview.php")
			return $Language->phrase("View");
		elseif ($pageName == "patient_ot_surgery_registeredit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "patient_ot_surgery_registeradd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "patient_ot_surgery_registerlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("patient_ot_surgery_registerview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("patient_ot_surgery_registerview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "patient_ot_surgery_registeradd.php?" . $this->getUrlParm($parm);
		else
			$url = "patient_ot_surgery_registeradd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("patient_ot_surgery_registeredit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("patient_ot_surgery_registeradd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("patient_ot_surgery_registerdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		if ($this->getCurrentMasterTable() == "ip_admission" && !ContainsString($url, TABLE_SHOW_MASTER . "=")) {
			$url .= (ContainsString($url, "?") ? "&" : "?") . TABLE_SHOW_MASTER . "=" . $this->getCurrentMasterTable();
			$url .= "&fk_id=" . urlencode($this->Reception->CurrentValue);
			$url .= "&fk_mrnNo=" . urlencode($this->mrnno->CurrentValue);
			$url .= "&fk_patient_id=" . urlencode($this->PId->CurrentValue);
		}
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
		$this->PatID->setDbValue($rs->fields('PatID'));
		$this->PatientName->setDbValue($rs->fields('PatientName'));
		$this->mrnno->setDbValue($rs->fields('mrnno'));
		$this->MobileNumber->setDbValue($rs->fields('MobileNumber'));
		$this->Age->setDbValue($rs->fields('Age'));
		$this->Gender->setDbValue($rs->fields('Gender'));
		$this->profilePic->setDbValue($rs->fields('profilePic'));
		$this->diagnosis->setDbValue($rs->fields('diagnosis'));
		$this->proposedSurgery->setDbValue($rs->fields('proposedSurgery'));
		$this->surgeryProcedure->setDbValue($rs->fields('surgeryProcedure'));
		$this->typeOfAnaesthesia->setDbValue($rs->fields('typeOfAnaesthesia'));
		$this->RecievedTime->setDbValue($rs->fields('RecievedTime'));
		$this->AnaesthesiaStarted->setDbValue($rs->fields('AnaesthesiaStarted'));
		$this->AnaesthesiaEnded->setDbValue($rs->fields('AnaesthesiaEnded'));
		$this->surgeryStarted->setDbValue($rs->fields('surgeryStarted'));
		$this->surgeryEnded->setDbValue($rs->fields('surgeryEnded'));
		$this->RecoveryTime->setDbValue($rs->fields('RecoveryTime'));
		$this->ShiftedTime->setDbValue($rs->fields('ShiftedTime'));
		$this->Duration->setDbValue($rs->fields('Duration'));
		$this->Surgeon->setDbValue($rs->fields('Surgeon'));
		$this->Anaesthetist->setDbValue($rs->fields('Anaesthetist'));
		$this->AsstSurgeon1->setDbValue($rs->fields('AsstSurgeon1'));
		$this->AsstSurgeon2->setDbValue($rs->fields('AsstSurgeon2'));
		$this->paediatric->setDbValue($rs->fields('paediatric'));
		$this->ScrubNurse1->setDbValue($rs->fields('ScrubNurse1'));
		$this->ScrubNurse2->setDbValue($rs->fields('ScrubNurse2'));
		$this->FloorNurse->setDbValue($rs->fields('FloorNurse'));
		$this->Technician->setDbValue($rs->fields('Technician'));
		$this->HouseKeeping->setDbValue($rs->fields('HouseKeeping'));
		$this->countsCheckedMops->setDbValue($rs->fields('countsCheckedMops'));
		$this->gauze->setDbValue($rs->fields('gauze'));
		$this->needles->setDbValue($rs->fields('needles'));
		$this->bloodloss->setDbValue($rs->fields('bloodloss'));
		$this->bloodtransfusion->setDbValue($rs->fields('bloodtransfusion'));
		$this->implantsUsed->setDbValue($rs->fields('implantsUsed'));
		$this->MaterialsForHPE->setDbValue($rs->fields('MaterialsForHPE'));
		$this->status->setDbValue($rs->fields('status'));
		$this->createdby->setDbValue($rs->fields('createdby'));
		$this->createddatetime->setDbValue($rs->fields('createddatetime'));
		$this->modifiedby->setDbValue($rs->fields('modifiedby'));
		$this->modifieddatetime->setDbValue($rs->fields('modifieddatetime'));
		$this->HospID->setDbValue($rs->fields('HospID'));
		$this->PatientSearch->setDbValue($rs->fields('PatientSearch'));
		$this->Reception->setDbValue($rs->fields('Reception'));
		$this->PatientID->setDbValue($rs->fields('PatientID'));
		$this->PId->setDbValue($rs->fields('PId'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

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
		$curVal = strval($this->Surgeon->CurrentValue);
		if ($curVal <> "") {
			$this->Surgeon->ViewValue = $this->Surgeon->lookupCacheOption($curVal);
			if ($this->Surgeon->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->Surgeon->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->Surgeon->ViewValue = $this->Surgeon->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Surgeon->ViewValue = $this->Surgeon->CurrentValue;
				}
			}
		} else {
			$this->Surgeon->ViewValue = NULL;
		}
		$this->Surgeon->ViewCustomAttributes = "";

		// Anaesthetist
		$curVal = strval($this->Anaesthetist->CurrentValue);
		if ($curVal <> "") {
			$this->Anaesthetist->ViewValue = $this->Anaesthetist->lookupCacheOption($curVal);
			if ($this->Anaesthetist->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->Anaesthetist->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->Anaesthetist->ViewValue = $this->Anaesthetist->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Anaesthetist->ViewValue = $this->Anaesthetist->CurrentValue;
				}
			}
		} else {
			$this->Anaesthetist->ViewValue = NULL;
		}
		$this->Anaesthetist->ViewCustomAttributes = "";

		// AsstSurgeon1
		$curVal = strval($this->AsstSurgeon1->CurrentValue);
		if ($curVal <> "") {
			$this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->lookupCacheOption($curVal);
			if ($this->AsstSurgeon1->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->AsstSurgeon1->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->CurrentValue;
				}
			}
		} else {
			$this->AsstSurgeon1->ViewValue = NULL;
		}
		$this->AsstSurgeon1->ViewCustomAttributes = "";

		// AsstSurgeon2
		$curVal = strval($this->AsstSurgeon2->CurrentValue);
		if ($curVal <> "") {
			$this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->lookupCacheOption($curVal);
			if ($this->AsstSurgeon2->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->AsstSurgeon2->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->CurrentValue;
				}
			}
		} else {
			$this->AsstSurgeon2->ViewValue = NULL;
		}
		$this->AsstSurgeon2->ViewCustomAttributes = "";

		// paediatric
		$curVal = strval($this->paediatric->CurrentValue);
		if ($curVal <> "") {
			$this->paediatric->ViewValue = $this->paediatric->lookupCacheOption($curVal);
			if ($this->paediatric->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->paediatric->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->paediatric->ViewValue = $this->paediatric->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->paediatric->ViewValue = $this->paediatric->CurrentValue;
				}
			}
		} else {
			$this->paediatric->ViewValue = NULL;
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
		$curVal = strval($this->PatientSearch->CurrentValue);
		if ($curVal <> "") {
			$this->PatientSearch->ViewValue = $this->PatientSearch->lookupCacheOption($curVal);
			if ($this->PatientSearch->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->PatientSearch->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$arwrk[3] = FormatNumber($rswrk->fields('df3'), 0, -2, -2, -2);
					$arwrk[4] = $rswrk->fields('df4');
					$this->PatientSearch->ViewValue = $this->PatientSearch->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->PatientSearch->ViewValue = $this->PatientSearch->CurrentValue;
				}
			}
		} else {
			$this->PatientSearch->ViewValue = NULL;
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

		// PatID
		$this->PatID->EditAttrs["class"] = "form-control";
		$this->PatID->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PatID->CurrentValue = HtmlDecode($this->PatID->CurrentValue);
		$this->PatID->EditValue = $this->PatID->CurrentValue;
		$this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

		// PatientName
		$this->PatientName->EditAttrs["class"] = "form-control";
		$this->PatientName->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
		$this->PatientName->EditValue = $this->PatientName->CurrentValue;
		$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

		// mrnno
		$this->mrnno->EditAttrs["class"] = "form-control";
		$this->mrnno->EditCustomAttributes = "";
		if ($this->mrnno->getSessionValue() <> "") {
			$this->mrnno->CurrentValue = $this->mrnno->getSessionValue();
		$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
		$this->mrnno->ViewCustomAttributes = "";
		} else {
		if (REMOVE_XSS)
			$this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
		$this->mrnno->EditValue = $this->mrnno->CurrentValue;
		$this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());
		}

		// MobileNumber
		$this->MobileNumber->EditAttrs["class"] = "form-control";
		$this->MobileNumber->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
		$this->MobileNumber->EditValue = $this->MobileNumber->CurrentValue;
		$this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

		// Age
		$this->Age->EditAttrs["class"] = "form-control";
		$this->Age->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
		$this->Age->EditValue = $this->Age->CurrentValue;
		$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

		// Gender
		$this->Gender->EditAttrs["class"] = "form-control";
		$this->Gender->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Gender->CurrentValue = HtmlDecode($this->Gender->CurrentValue);
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
		if (REMOVE_XSS)
			$this->Duration->CurrentValue = HtmlDecode($this->Duration->CurrentValue);
		$this->Duration->EditValue = $this->Duration->CurrentValue;
		$this->Duration->PlaceHolder = RemoveHtml($this->Duration->caption());

		// Surgeon
		$this->Surgeon->EditAttrs["class"] = "form-control";
		$this->Surgeon->EditCustomAttributes = "";

		// Anaesthetist
		$this->Anaesthetist->EditAttrs["class"] = "form-control";
		$this->Anaesthetist->EditCustomAttributes = "";

		// AsstSurgeon1
		$this->AsstSurgeon1->EditAttrs["class"] = "form-control";
		$this->AsstSurgeon1->EditCustomAttributes = "";

		// AsstSurgeon2
		$this->AsstSurgeon2->EditAttrs["class"] = "form-control";
		$this->AsstSurgeon2->EditCustomAttributes = "";

		// paediatric
		$this->paediatric->EditAttrs["class"] = "form-control";
		$this->paediatric->EditCustomAttributes = "";

		// ScrubNurse1
		$this->ScrubNurse1->EditAttrs["class"] = "form-control";
		$this->ScrubNurse1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ScrubNurse1->CurrentValue = HtmlDecode($this->ScrubNurse1->CurrentValue);
		$this->ScrubNurse1->EditValue = $this->ScrubNurse1->CurrentValue;
		$this->ScrubNurse1->PlaceHolder = RemoveHtml($this->ScrubNurse1->caption());

		// ScrubNurse2
		$this->ScrubNurse2->EditAttrs["class"] = "form-control";
		$this->ScrubNurse2->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ScrubNurse2->CurrentValue = HtmlDecode($this->ScrubNurse2->CurrentValue);
		$this->ScrubNurse2->EditValue = $this->ScrubNurse2->CurrentValue;
		$this->ScrubNurse2->PlaceHolder = RemoveHtml($this->ScrubNurse2->caption());

		// FloorNurse
		$this->FloorNurse->EditAttrs["class"] = "form-control";
		$this->FloorNurse->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->FloorNurse->CurrentValue = HtmlDecode($this->FloorNurse->CurrentValue);
		$this->FloorNurse->EditValue = $this->FloorNurse->CurrentValue;
		$this->FloorNurse->PlaceHolder = RemoveHtml($this->FloorNurse->caption());

		// Technician
		$this->Technician->EditAttrs["class"] = "form-control";
		$this->Technician->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Technician->CurrentValue = HtmlDecode($this->Technician->CurrentValue);
		$this->Technician->EditValue = $this->Technician->CurrentValue;
		$this->Technician->PlaceHolder = RemoveHtml($this->Technician->caption());

		// HouseKeeping
		$this->HouseKeeping->EditAttrs["class"] = "form-control";
		$this->HouseKeeping->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->HouseKeeping->CurrentValue = HtmlDecode($this->HouseKeeping->CurrentValue);
		$this->HouseKeeping->EditValue = $this->HouseKeeping->CurrentValue;
		$this->HouseKeeping->PlaceHolder = RemoveHtml($this->HouseKeeping->caption());

		// countsCheckedMops
		$this->countsCheckedMops->EditAttrs["class"] = "form-control";
		$this->countsCheckedMops->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->countsCheckedMops->CurrentValue = HtmlDecode($this->countsCheckedMops->CurrentValue);
		$this->countsCheckedMops->EditValue = $this->countsCheckedMops->CurrentValue;
		$this->countsCheckedMops->PlaceHolder = RemoveHtml($this->countsCheckedMops->caption());

		// gauze
		$this->gauze->EditAttrs["class"] = "form-control";
		$this->gauze->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->gauze->CurrentValue = HtmlDecode($this->gauze->CurrentValue);
		$this->gauze->EditValue = $this->gauze->CurrentValue;
		$this->gauze->PlaceHolder = RemoveHtml($this->gauze->caption());

		// needles
		$this->needles->EditAttrs["class"] = "form-control";
		$this->needles->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->needles->CurrentValue = HtmlDecode($this->needles->CurrentValue);
		$this->needles->EditValue = $this->needles->CurrentValue;
		$this->needles->PlaceHolder = RemoveHtml($this->needles->caption());

		// bloodloss
		$this->bloodloss->EditAttrs["class"] = "form-control";
		$this->bloodloss->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->bloodloss->CurrentValue = HtmlDecode($this->bloodloss->CurrentValue);
		$this->bloodloss->EditValue = $this->bloodloss->CurrentValue;
		$this->bloodloss->PlaceHolder = RemoveHtml($this->bloodloss->caption());

		// bloodtransfusion
		$this->bloodtransfusion->EditAttrs["class"] = "form-control";
		$this->bloodtransfusion->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->bloodtransfusion->CurrentValue = HtmlDecode($this->bloodtransfusion->CurrentValue);
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

		// Reception
		$this->Reception->EditAttrs["class"] = "form-control";
		$this->Reception->EditCustomAttributes = "";
		if ($this->Reception->getSessionValue() <> "") {
			$this->Reception->CurrentValue = $this->Reception->getSessionValue();
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
		if (REMOVE_XSS)
			$this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
		$this->PatientID->EditValue = $this->PatientID->CurrentValue;
		$this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

		// PId
		$this->PId->EditAttrs["class"] = "form-control";
		$this->PId->EditCustomAttributes = "";
		if ($this->PId->getSessionValue() <> "") {
			$this->PId->CurrentValue = $this->PId->getSessionValue();
		$this->PId->ViewValue = $this->PId->CurrentValue;
		$this->PId->ViewValue = FormatNumber($this->PId->ViewValue, 0, -2, -2, -2);
		$this->PId->ViewCustomAttributes = "";
		} else {
		$this->PId->EditValue = $this->PId->CurrentValue;
		$this->PId->PlaceHolder = RemoveHtml($this->PId->caption());
		}

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