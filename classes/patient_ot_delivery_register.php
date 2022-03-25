<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for patient_ot_delivery_register
 */
class patient_ot_delivery_register extends DbTable
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

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'patient_ot_delivery_register';
		$this->TableName = 'patient_ot_delivery_register';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`patient_ot_delivery_register`";
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
		$this->id = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// PatID
		$this->PatID = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_PatID', 'PatID', '`PatID`', '`PatID`', 200, -1, FALSE, '`PatID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatID->Sortable = TRUE; // Allow sort
		$this->fields['PatID'] = &$this->PatID;

		// PatientName
		$this->PatientName = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, -1, FALSE, '`PatientName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientName->Sortable = TRUE; // Allow sort
		$this->fields['PatientName'] = &$this->PatientName;

		// mrnno
		$this->mrnno = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_mrnno', 'mrnno', '`mrnno`', '`mrnno`', 200, -1, FALSE, '`mrnno`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mrnno->IsForeignKey = TRUE; // Foreign key field
		$this->mrnno->Sortable = TRUE; // Allow sort
		$this->fields['mrnno'] = &$this->mrnno;

		// MobileNumber
		$this->MobileNumber = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_MobileNumber', 'MobileNumber', '`MobileNumber`', '`MobileNumber`', 200, -1, FALSE, '`MobileNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MobileNumber->Sortable = TRUE; // Allow sort
		$this->fields['MobileNumber'] = &$this->MobileNumber;

		// Age
		$this->Age = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_Age', 'Age', '`Age`', '`Age`', 200, -1, FALSE, '`Age`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Age->Sortable = TRUE; // Allow sort
		$this->fields['Age'] = &$this->Age;

		// Gender
		$this->Gender = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_Gender', 'Gender', '`Gender`', '`Gender`', 200, -1, FALSE, '`Gender`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Gender->Sortable = TRUE; // Allow sort
		$this->fields['Gender'] = &$this->Gender;

		// profilePic
		$this->profilePic = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_profilePic', 'profilePic', '`profilePic`', '`profilePic`', 201, -1, FALSE, '`profilePic`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->profilePic->Sortable = TRUE; // Allow sort
		$this->fields['profilePic'] = &$this->profilePic;

		// ObstetricsHistryMale
		$this->ObstetricsHistryMale = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ObstetricsHistryMale', 'ObstetricsHistryMale', '`ObstetricsHistryMale`', '`ObstetricsHistryMale`', 200, -1, FALSE, '`ObstetricsHistryMale`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ObstetricsHistryMale->Sortable = FALSE; // Allow sort
		$this->fields['ObstetricsHistryMale'] = &$this->ObstetricsHistryMale;

		// ObstetricsHistryFeMale
		$this->ObstetricsHistryFeMale = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ObstetricsHistryFeMale', 'ObstetricsHistryFeMale', '`ObstetricsHistryFeMale`', '`ObstetricsHistryFeMale`', 200, -1, FALSE, '`ObstetricsHistryFeMale`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ObstetricsHistryFeMale->Sortable = TRUE; // Allow sort
		$this->fields['ObstetricsHistryFeMale'] = &$this->ObstetricsHistryFeMale;

		// Abortion
		$this->Abortion = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_Abortion', 'Abortion', '`Abortion`', '`Abortion`', 200, -1, FALSE, '`Abortion`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Abortion->Sortable = TRUE; // Allow sort
		$this->fields['Abortion'] = &$this->Abortion;

		// ChildBirthDate
		$this->ChildBirthDate = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ChildBirthDate', 'ChildBirthDate', '`ChildBirthDate`', CastDateFieldForLike('`ChildBirthDate`', 7, "DB"), 135, 7, FALSE, '`ChildBirthDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ChildBirthDate->Sortable = TRUE; // Allow sort
		$this->ChildBirthDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['ChildBirthDate'] = &$this->ChildBirthDate;

		// ChildBirthTime
		$this->ChildBirthTime = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ChildBirthTime', 'ChildBirthTime', '`ChildBirthTime`', '`ChildBirthTime`', 200, 3, FALSE, '`ChildBirthTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ChildBirthTime->Sortable = TRUE; // Allow sort
		$this->fields['ChildBirthTime'] = &$this->ChildBirthTime;

		// ChildSex
		$this->ChildSex = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ChildSex', 'ChildSex', '`ChildSex`', '`ChildSex`', 200, -1, FALSE, '`ChildSex`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ChildSex->Sortable = TRUE; // Allow sort
		$this->fields['ChildSex'] = &$this->ChildSex;

		// ChildWt
		$this->ChildWt = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ChildWt', 'ChildWt', '`ChildWt`', '`ChildWt`', 200, -1, FALSE, '`ChildWt`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ChildWt->Sortable = TRUE; // Allow sort
		$this->fields['ChildWt'] = &$this->ChildWt;

		// ChildDay
		$this->ChildDay = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ChildDay', 'ChildDay', '`ChildDay`', '`ChildDay`', 200, -1, FALSE, '`ChildDay`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ChildDay->Sortable = TRUE; // Allow sort
		$this->fields['ChildDay'] = &$this->ChildDay;

		// ChildOE
		$this->ChildOE = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ChildOE', 'ChildOE', '`ChildOE`', '`ChildOE`', 200, -1, FALSE, '`ChildOE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ChildOE->Sortable = TRUE; // Allow sort
		$this->fields['ChildOE'] = &$this->ChildOE;

		// TypeofDelivery
		$this->TypeofDelivery = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_TypeofDelivery', 'TypeofDelivery', '`TypeofDelivery`', '`TypeofDelivery`', 201, -1, FALSE, '`TypeofDelivery`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->TypeofDelivery->Sortable = TRUE; // Allow sort
		$this->fields['TypeofDelivery'] = &$this->TypeofDelivery;

		// ChildBlGrp
		$this->ChildBlGrp = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ChildBlGrp', 'ChildBlGrp', '`ChildBlGrp`', '`ChildBlGrp`', 200, -1, FALSE, '`ChildBlGrp`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ChildBlGrp->Sortable = TRUE; // Allow sort
		$this->fields['ChildBlGrp'] = &$this->ChildBlGrp;

		// ApgarScore
		$this->ApgarScore = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ApgarScore', 'ApgarScore', '`ApgarScore`', '`ApgarScore`', 200, -1, FALSE, '`ApgarScore`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ApgarScore->Sortable = TRUE; // Allow sort
		$this->fields['ApgarScore'] = &$this->ApgarScore;

		// birthnotification
		$this->birthnotification = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_birthnotification', 'birthnotification', '`birthnotification`', '`birthnotification`', 200, -1, FALSE, '`birthnotification`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->birthnotification->Sortable = TRUE; // Allow sort
		$this->fields['birthnotification'] = &$this->birthnotification;

		// formno
		$this->formno = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_formno', 'formno', '`formno`', '`formno`', 200, -1, FALSE, '`formno`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->formno->Sortable = TRUE; // Allow sort
		$this->fields['formno'] = &$this->formno;

		// dte
		$this->dte = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_dte', 'dte', '`dte`', CastDateFieldForLike('`dte`', 0, "DB"), 135, 0, FALSE, '`dte`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->dte->Sortable = TRUE; // Allow sort
		$this->dte->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['dte'] = &$this->dte;

		// motherReligion
		$this->motherReligion = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_motherReligion', 'motherReligion', '`motherReligion`', '`motherReligion`', 200, -1, FALSE, '`motherReligion`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->motherReligion->Sortable = TRUE; // Allow sort
		$this->fields['motherReligion'] = &$this->motherReligion;

		// bloodgroup
		$this->bloodgroup = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_bloodgroup', 'bloodgroup', '`bloodgroup`', '`bloodgroup`', 200, -1, FALSE, '`bloodgroup`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->bloodgroup->Sortable = TRUE; // Allow sort
		$this->fields['bloodgroup'] = &$this->bloodgroup;

		// status
		$this->status = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_status', 'status', '`status`', '`status`', 3, -1, FALSE, '`status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->status->Sortable = TRUE; // Allow sort
		$this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['status'] = &$this->status;

		// createdby
		$this->createdby = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, -1, FALSE, '`createdby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdby->Sortable = TRUE; // Allow sort
		$this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['createdby'] = &$this->createdby;

		// createddatetime
		$this->createddatetime = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike('`createddatetime`', 0, "DB"), 135, 0, FALSE, '`createddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = TRUE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['createddatetime'] = &$this->createddatetime;

		// modifiedby
		$this->modifiedby = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, -1, FALSE, '`modifiedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifiedby->Sortable = TRUE; // Allow sort
		$this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['modifiedby'] = &$this->modifiedby;

		// modifieddatetime
		$this->modifieddatetime = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike('`modifieddatetime`', 0, "DB"), 135, 0, FALSE, '`modifieddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifieddatetime->Sortable = TRUE; // Allow sort
		$this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['modifieddatetime'] = &$this->modifieddatetime;

		// PatientID
		$this->PatientID = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_PatientID', 'PatientID', '`PatientID`', '`PatientID`', 200, -1, FALSE, '`PatientID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientID->Sortable = TRUE; // Allow sort
		$this->fields['PatientID'] = &$this->PatientID;

		// HospID
		$this->HospID = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->fields['HospID'] = &$this->HospID;

		// ChildBirthDate1
		$this->ChildBirthDate1 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ChildBirthDate1', 'ChildBirthDate1', '`ChildBirthDate1`', CastDateFieldForLike('`ChildBirthDate1`', 0, "DB"), 135, 0, FALSE, '`ChildBirthDate1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ChildBirthDate1->Sortable = TRUE; // Allow sort
		$this->ChildBirthDate1->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['ChildBirthDate1'] = &$this->ChildBirthDate1;

		// ChildBirthTime1
		$this->ChildBirthTime1 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ChildBirthTime1', 'ChildBirthTime1', '`ChildBirthTime1`', '`ChildBirthTime1`', 200, -1, FALSE, '`ChildBirthTime1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ChildBirthTime1->Sortable = TRUE; // Allow sort
		$this->fields['ChildBirthTime1'] = &$this->ChildBirthTime1;

		// ChildSex1
		$this->ChildSex1 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ChildSex1', 'ChildSex1', '`ChildSex1`', '`ChildSex1`', 200, -1, FALSE, '`ChildSex1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ChildSex1->Sortable = TRUE; // Allow sort
		$this->fields['ChildSex1'] = &$this->ChildSex1;

		// ChildWt1
		$this->ChildWt1 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ChildWt1', 'ChildWt1', '`ChildWt1`', '`ChildWt1`', 200, -1, FALSE, '`ChildWt1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ChildWt1->Sortable = TRUE; // Allow sort
		$this->fields['ChildWt1'] = &$this->ChildWt1;

		// ChildDay1
		$this->ChildDay1 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ChildDay1', 'ChildDay1', '`ChildDay1`', '`ChildDay1`', 200, -1, FALSE, '`ChildDay1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ChildDay1->Sortable = TRUE; // Allow sort
		$this->fields['ChildDay1'] = &$this->ChildDay1;

		// ChildOE1
		$this->ChildOE1 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ChildOE1', 'ChildOE1', '`ChildOE1`', '`ChildOE1`', 200, -1, FALSE, '`ChildOE1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ChildOE1->Sortable = TRUE; // Allow sort
		$this->fields['ChildOE1'] = &$this->ChildOE1;

		// TypeofDelivery1
		$this->TypeofDelivery1 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_TypeofDelivery1', 'TypeofDelivery1', '`TypeofDelivery1`', '`TypeofDelivery1`', 201, -1, FALSE, '`TypeofDelivery1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->TypeofDelivery1->Sortable = TRUE; // Allow sort
		$this->fields['TypeofDelivery1'] = &$this->TypeofDelivery1;

		// ChildBlGrp1
		$this->ChildBlGrp1 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ChildBlGrp1', 'ChildBlGrp1', '`ChildBlGrp1`', '`ChildBlGrp1`', 200, -1, FALSE, '`ChildBlGrp1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ChildBlGrp1->Sortable = TRUE; // Allow sort
		$this->fields['ChildBlGrp1'] = &$this->ChildBlGrp1;

		// ApgarScore1
		$this->ApgarScore1 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ApgarScore1', 'ApgarScore1', '`ApgarScore1`', '`ApgarScore1`', 200, -1, FALSE, '`ApgarScore1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ApgarScore1->Sortable = TRUE; // Allow sort
		$this->fields['ApgarScore1'] = &$this->ApgarScore1;

		// birthnotification1
		$this->birthnotification1 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_birthnotification1', 'birthnotification1', '`birthnotification1`', '`birthnotification1`', 200, -1, FALSE, '`birthnotification1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->birthnotification1->Sortable = TRUE; // Allow sort
		$this->fields['birthnotification1'] = &$this->birthnotification1;

		// formno1
		$this->formno1 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_formno1', 'formno1', '`formno1`', '`formno1`', 200, -1, FALSE, '`formno1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->formno1->Sortable = TRUE; // Allow sort
		$this->fields['formno1'] = &$this->formno1;

		// proposedSurgery
		$this->proposedSurgery = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_proposedSurgery', 'proposedSurgery', '`proposedSurgery`', '`proposedSurgery`', 201, -1, FALSE, '`proposedSurgery`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->proposedSurgery->Sortable = TRUE; // Allow sort
		$this->fields['proposedSurgery'] = &$this->proposedSurgery;

		// surgeryProcedure
		$this->surgeryProcedure = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_surgeryProcedure', 'surgeryProcedure', '`surgeryProcedure`', '`surgeryProcedure`', 201, -1, FALSE, '`surgeryProcedure`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->surgeryProcedure->Sortable = TRUE; // Allow sort
		$this->fields['surgeryProcedure'] = &$this->surgeryProcedure;

		// typeOfAnaesthesia
		$this->typeOfAnaesthesia = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_typeOfAnaesthesia', 'typeOfAnaesthesia', '`typeOfAnaesthesia`', '`typeOfAnaesthesia`', 201, -1, FALSE, '`typeOfAnaesthesia`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->typeOfAnaesthesia->Sortable = TRUE; // Allow sort
		$this->fields['typeOfAnaesthesia'] = &$this->typeOfAnaesthesia;

		// RecievedTime
		$this->RecievedTime = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_RecievedTime', 'RecievedTime', '`RecievedTime`', CastDateFieldForLike('`RecievedTime`', 11, "DB"), 135, 11, FALSE, '`RecievedTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RecievedTime->Sortable = TRUE; // Allow sort
		$this->RecievedTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['RecievedTime'] = &$this->RecievedTime;

		// AnaesthesiaStarted
		$this->AnaesthesiaStarted = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_AnaesthesiaStarted', 'AnaesthesiaStarted', '`AnaesthesiaStarted`', CastDateFieldForLike('`AnaesthesiaStarted`', 11, "DB"), 135, 11, FALSE, '`AnaesthesiaStarted`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AnaesthesiaStarted->Sortable = TRUE; // Allow sort
		$this->AnaesthesiaStarted->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['AnaesthesiaStarted'] = &$this->AnaesthesiaStarted;

		// AnaesthesiaEnded
		$this->AnaesthesiaEnded = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_AnaesthesiaEnded', 'AnaesthesiaEnded', '`AnaesthesiaEnded`', CastDateFieldForLike('`AnaesthesiaEnded`', 11, "DB"), 135, 11, FALSE, '`AnaesthesiaEnded`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AnaesthesiaEnded->Sortable = TRUE; // Allow sort
		$this->AnaesthesiaEnded->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['AnaesthesiaEnded'] = &$this->AnaesthesiaEnded;

		// surgeryStarted
		$this->surgeryStarted = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_surgeryStarted', 'surgeryStarted', '`surgeryStarted`', CastDateFieldForLike('`surgeryStarted`', 11, "DB"), 135, 11, FALSE, '`surgeryStarted`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->surgeryStarted->Sortable = TRUE; // Allow sort
		$this->surgeryStarted->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['surgeryStarted'] = &$this->surgeryStarted;

		// surgeryEnded
		$this->surgeryEnded = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_surgeryEnded', 'surgeryEnded', '`surgeryEnded`', CastDateFieldForLike('`surgeryEnded`', 11, "DB"), 135, 11, FALSE, '`surgeryEnded`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->surgeryEnded->Sortable = TRUE; // Allow sort
		$this->surgeryEnded->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['surgeryEnded'] = &$this->surgeryEnded;

		// RecoveryTime
		$this->RecoveryTime = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_RecoveryTime', 'RecoveryTime', '`RecoveryTime`', CastDateFieldForLike('`RecoveryTime`', 11, "DB"), 135, 11, FALSE, '`RecoveryTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RecoveryTime->Sortable = TRUE; // Allow sort
		$this->RecoveryTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['RecoveryTime'] = &$this->RecoveryTime;

		// ShiftedTime
		$this->ShiftedTime = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ShiftedTime', 'ShiftedTime', '`ShiftedTime`', CastDateFieldForLike('`ShiftedTime`', 11, "DB"), 135, 11, FALSE, '`ShiftedTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ShiftedTime->Sortable = TRUE; // Allow sort
		$this->ShiftedTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['ShiftedTime'] = &$this->ShiftedTime;

		// Duration
		$this->Duration = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_Duration', 'Duration', '`Duration`', '`Duration`', 200, -1, FALSE, '`Duration`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Duration->Sortable = TRUE; // Allow sort
		$this->fields['Duration'] = &$this->Duration;

		// DrVisit1
		$this->DrVisit1 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_DrVisit1', 'DrVisit1', '`DrVisit1`', '`DrVisit1`', 201, -1, FALSE, '`DrVisit1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->DrVisit1->Sortable = TRUE; // Allow sort
		$this->DrVisit1->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->DrVisit1->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->DrVisit1->Lookup = new Lookup('DrVisit1', 'doctors', FALSE, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
		$this->fields['DrVisit1'] = &$this->DrVisit1;

		// DrVisit2
		$this->DrVisit2 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_DrVisit2', 'DrVisit2', '`DrVisit2`', '`DrVisit2`', 201, -1, FALSE, '`DrVisit2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->DrVisit2->Sortable = TRUE; // Allow sort
		$this->DrVisit2->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->DrVisit2->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->DrVisit2->Lookup = new Lookup('DrVisit2', 'doctors', FALSE, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
		$this->fields['DrVisit2'] = &$this->DrVisit2;

		// DrVisit3
		$this->DrVisit3 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_DrVisit3', 'DrVisit3', '`DrVisit3`', '`DrVisit3`', 201, -1, FALSE, '`DrVisit3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->DrVisit3->Sortable = TRUE; // Allow sort
		$this->DrVisit3->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->DrVisit3->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->DrVisit3->Lookup = new Lookup('DrVisit3', 'doctors', FALSE, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
		$this->fields['DrVisit3'] = &$this->DrVisit3;

		// DrVisit4
		$this->DrVisit4 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_DrVisit4', 'DrVisit4', '`DrVisit4`', '`DrVisit4`', 201, -1, FALSE, '`DrVisit4`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->DrVisit4->Sortable = TRUE; // Allow sort
		$this->DrVisit4->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->DrVisit4->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->DrVisit4->Lookup = new Lookup('DrVisit4', 'doctors', FALSE, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
		$this->fields['DrVisit4'] = &$this->DrVisit4;

		// Surgeon
		$this->Surgeon = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_Surgeon', 'Surgeon', '`Surgeon`', '`Surgeon`', 200, -1, FALSE, '`Surgeon`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Surgeon->Sortable = TRUE; // Allow sort
		$this->Surgeon->Lookup = new Lookup('Surgeon', 'doctors', FALSE, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Surgeon'] = &$this->Surgeon;

		// Anaesthetist
		$this->Anaesthetist = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_Anaesthetist', 'Anaesthetist', '`Anaesthetist`', '`Anaesthetist`', 200, -1, FALSE, '`Anaesthetist`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Anaesthetist->Sortable = TRUE; // Allow sort
		$this->Anaesthetist->Lookup = new Lookup('Anaesthetist', 'doctors', FALSE, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Anaesthetist'] = &$this->Anaesthetist;

		// AsstSurgeon1
		$this->AsstSurgeon1 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_AsstSurgeon1', 'AsstSurgeon1', '`AsstSurgeon1`', '`AsstSurgeon1`', 200, -1, FALSE, '`AsstSurgeon1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AsstSurgeon1->Sortable = TRUE; // Allow sort
		$this->AsstSurgeon1->Lookup = new Lookup('AsstSurgeon1', 'doctors', FALSE, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
		$this->fields['AsstSurgeon1'] = &$this->AsstSurgeon1;

		// AsstSurgeon2
		$this->AsstSurgeon2 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_AsstSurgeon2', 'AsstSurgeon2', '`AsstSurgeon2`', '`AsstSurgeon2`', 200, -1, FALSE, '`AsstSurgeon2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AsstSurgeon2->Sortable = TRUE; // Allow sort
		$this->AsstSurgeon2->Lookup = new Lookup('AsstSurgeon2', 'doctors', FALSE, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
		$this->fields['AsstSurgeon2'] = &$this->AsstSurgeon2;

		// paediatric
		$this->paediatric = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_paediatric', 'paediatric', '`paediatric`', '`paediatric`', 200, -1, FALSE, '`paediatric`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->paediatric->Sortable = TRUE; // Allow sort
		$this->paediatric->Lookup = new Lookup('paediatric', 'doctors', FALSE, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
		$this->fields['paediatric'] = &$this->paediatric;

		// ScrubNurse1
		$this->ScrubNurse1 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ScrubNurse1', 'ScrubNurse1', '`ScrubNurse1`', '`ScrubNurse1`', 200, -1, FALSE, '`ScrubNurse1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ScrubNurse1->Sortable = TRUE; // Allow sort
		$this->fields['ScrubNurse1'] = &$this->ScrubNurse1;

		// ScrubNurse2
		$this->ScrubNurse2 = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_ScrubNurse2', 'ScrubNurse2', '`ScrubNurse2`', '`ScrubNurse2`', 200, -1, FALSE, '`ScrubNurse2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ScrubNurse2->Sortable = TRUE; // Allow sort
		$this->fields['ScrubNurse2'] = &$this->ScrubNurse2;

		// FloorNurse
		$this->FloorNurse = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_FloorNurse', 'FloorNurse', '`FloorNurse`', '`FloorNurse`', 200, -1, FALSE, '`FloorNurse`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FloorNurse->Sortable = TRUE; // Allow sort
		$this->fields['FloorNurse'] = &$this->FloorNurse;

		// Technician
		$this->Technician = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_Technician', 'Technician', '`Technician`', '`Technician`', 200, -1, FALSE, '`Technician`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Technician->Sortable = TRUE; // Allow sort
		$this->fields['Technician'] = &$this->Technician;

		// HouseKeeping
		$this->HouseKeeping = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_HouseKeeping', 'HouseKeeping', '`HouseKeeping`', '`HouseKeeping`', 200, -1, FALSE, '`HouseKeeping`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HouseKeeping->Sortable = TRUE; // Allow sort
		$this->fields['HouseKeeping'] = &$this->HouseKeeping;

		// countsCheckedMops
		$this->countsCheckedMops = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_countsCheckedMops', 'countsCheckedMops', '`countsCheckedMops`', '`countsCheckedMops`', 200, -1, FALSE, '`countsCheckedMops`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->countsCheckedMops->Sortable = TRUE; // Allow sort
		$this->fields['countsCheckedMops'] = &$this->countsCheckedMops;

		// gauze
		$this->gauze = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_gauze', 'gauze', '`gauze`', '`gauze`', 200, -1, FALSE, '`gauze`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->gauze->Sortable = TRUE; // Allow sort
		$this->fields['gauze'] = &$this->gauze;

		// needles
		$this->needles = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_needles', 'needles', '`needles`', '`needles`', 200, -1, FALSE, '`needles`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->needles->Sortable = TRUE; // Allow sort
		$this->fields['needles'] = &$this->needles;

		// bloodloss
		$this->bloodloss = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_bloodloss', 'bloodloss', '`bloodloss`', '`bloodloss`', 200, -1, FALSE, '`bloodloss`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->bloodloss->Sortable = TRUE; // Allow sort
		$this->fields['bloodloss'] = &$this->bloodloss;

		// bloodtransfusion
		$this->bloodtransfusion = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_bloodtransfusion', 'bloodtransfusion', '`bloodtransfusion`', '`bloodtransfusion`', 200, -1, FALSE, '`bloodtransfusion`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->bloodtransfusion->Sortable = TRUE; // Allow sort
		$this->fields['bloodtransfusion'] = &$this->bloodtransfusion;

		// implantsUsed
		$this->implantsUsed = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_implantsUsed', 'implantsUsed', '`implantsUsed`', '`implantsUsed`', 201, -1, FALSE, '`implantsUsed`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->implantsUsed->Sortable = TRUE; // Allow sort
		$this->fields['implantsUsed'] = &$this->implantsUsed;

		// MaterialsForHPE
		$this->MaterialsForHPE = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_MaterialsForHPE', 'MaterialsForHPE', '`MaterialsForHPE`', '`MaterialsForHPE`', 201, -1, FALSE, '`MaterialsForHPE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->MaterialsForHPE->Sortable = TRUE; // Allow sort
		$this->fields['MaterialsForHPE'] = &$this->MaterialsForHPE;

		// Reception
		$this->Reception = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_Reception', 'Reception', '`Reception`', '`Reception`', 3, -1, FALSE, '`Reception`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Reception->IsForeignKey = TRUE; // Foreign key field
		$this->Reception->Sortable = TRUE; // Allow sort
		$this->Reception->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Reception'] = &$this->Reception;

		// PId
		$this->PId = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_PId', 'PId', '`PId`', '`PId`', 3, -1, FALSE, '`PId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PId->IsForeignKey = TRUE; // Foreign key field
		$this->PId->Sortable = TRUE; // Allow sort
		$this->PId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['PId'] = &$this->PId;

		// PatientSearch
		$this->PatientSearch = new DbField('patient_ot_delivery_register', 'patient_ot_delivery_register', 'x_PatientSearch', 'PatientSearch', '\'\'', '\'\'', 201, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->PatientSearch->IsCustom = TRUE; // Custom field
		$this->PatientSearch->Sortable = TRUE; // Allow sort
		$this->PatientSearch->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->PatientSearch->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->PatientSearch->Lookup = new Lookup('PatientSearch', 'ip_admission', FALSE, 'id', ["patient_id","patient_name","mrnNo","mobileno"], [], [], [], [], [], [], '`id` DESC', '');
		$this->fields['PatientSearch'] = &$this->PatientSearch;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`patient_ot_delivery_register`";
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
			return "patient_ot_delivery_registerlist.php";
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
		if ($pageName == "patient_ot_delivery_registerview.php")
			return $Language->phrase("View");
		elseif ($pageName == "patient_ot_delivery_registeredit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "patient_ot_delivery_registeradd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "patient_ot_delivery_registerlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("patient_ot_delivery_registerview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("patient_ot_delivery_registerview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "patient_ot_delivery_registeradd.php?" . $this->getUrlParm($parm);
		else
			$url = "patient_ot_delivery_registeradd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("patient_ot_delivery_registeredit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("patient_ot_delivery_registeradd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("patient_ot_delivery_registerdelete.php", $this->getUrlParm());
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
		$this->ObstetricsHistryMale->setDbValue($rs->fields('ObstetricsHistryMale'));
		$this->ObstetricsHistryFeMale->setDbValue($rs->fields('ObstetricsHistryFeMale'));
		$this->Abortion->setDbValue($rs->fields('Abortion'));
		$this->ChildBirthDate->setDbValue($rs->fields('ChildBirthDate'));
		$this->ChildBirthTime->setDbValue($rs->fields('ChildBirthTime'));
		$this->ChildSex->setDbValue($rs->fields('ChildSex'));
		$this->ChildWt->setDbValue($rs->fields('ChildWt'));
		$this->ChildDay->setDbValue($rs->fields('ChildDay'));
		$this->ChildOE->setDbValue($rs->fields('ChildOE'));
		$this->TypeofDelivery->setDbValue($rs->fields('TypeofDelivery'));
		$this->ChildBlGrp->setDbValue($rs->fields('ChildBlGrp'));
		$this->ApgarScore->setDbValue($rs->fields('ApgarScore'));
		$this->birthnotification->setDbValue($rs->fields('birthnotification'));
		$this->formno->setDbValue($rs->fields('formno'));
		$this->dte->setDbValue($rs->fields('dte'));
		$this->motherReligion->setDbValue($rs->fields('motherReligion'));
		$this->bloodgroup->setDbValue($rs->fields('bloodgroup'));
		$this->status->setDbValue($rs->fields('status'));
		$this->createdby->setDbValue($rs->fields('createdby'));
		$this->createddatetime->setDbValue($rs->fields('createddatetime'));
		$this->modifiedby->setDbValue($rs->fields('modifiedby'));
		$this->modifieddatetime->setDbValue($rs->fields('modifieddatetime'));
		$this->PatientID->setDbValue($rs->fields('PatientID'));
		$this->HospID->setDbValue($rs->fields('HospID'));
		$this->ChildBirthDate1->setDbValue($rs->fields('ChildBirthDate1'));
		$this->ChildBirthTime1->setDbValue($rs->fields('ChildBirthTime1'));
		$this->ChildSex1->setDbValue($rs->fields('ChildSex1'));
		$this->ChildWt1->setDbValue($rs->fields('ChildWt1'));
		$this->ChildDay1->setDbValue($rs->fields('ChildDay1'));
		$this->ChildOE1->setDbValue($rs->fields('ChildOE1'));
		$this->TypeofDelivery1->setDbValue($rs->fields('TypeofDelivery1'));
		$this->ChildBlGrp1->setDbValue($rs->fields('ChildBlGrp1'));
		$this->ApgarScore1->setDbValue($rs->fields('ApgarScore1'));
		$this->birthnotification1->setDbValue($rs->fields('birthnotification1'));
		$this->formno1->setDbValue($rs->fields('formno1'));
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
		$this->DrVisit1->setDbValue($rs->fields('DrVisit1'));
		$this->DrVisit2->setDbValue($rs->fields('DrVisit2'));
		$this->DrVisit3->setDbValue($rs->fields('DrVisit3'));
		$this->DrVisit4->setDbValue($rs->fields('DrVisit4'));
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
		$this->Reception->setDbValue($rs->fields('Reception'));
		$this->PId->setDbValue($rs->fields('PId'));
		$this->PatientSearch->setDbValue($rs->fields('PatientSearch'));
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
		$curVal = strval($this->DrVisit1->CurrentValue);
		if ($curVal <> "") {
			$this->DrVisit1->ViewValue = $this->DrVisit1->lookupCacheOption($curVal);
			if ($this->DrVisit1->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->DrVisit1->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->DrVisit1->ViewValue = $this->DrVisit1->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->DrVisit1->ViewValue = $this->DrVisit1->CurrentValue;
				}
			}
		} else {
			$this->DrVisit1->ViewValue = NULL;
		}
		$this->DrVisit1->ViewCustomAttributes = "";

		// DrVisit2
		$curVal = strval($this->DrVisit2->CurrentValue);
		if ($curVal <> "") {
			$this->DrVisit2->ViewValue = $this->DrVisit2->lookupCacheOption($curVal);
			if ($this->DrVisit2->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->DrVisit2->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->DrVisit2->ViewValue = $this->DrVisit2->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->DrVisit2->ViewValue = $this->DrVisit2->CurrentValue;
				}
			}
		} else {
			$this->DrVisit2->ViewValue = NULL;
		}
		$this->DrVisit2->ViewCustomAttributes = "";

		// DrVisit3
		$curVal = strval($this->DrVisit3->CurrentValue);
		if ($curVal <> "") {
			$this->DrVisit3->ViewValue = $this->DrVisit3->lookupCacheOption($curVal);
			if ($this->DrVisit3->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->DrVisit3->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->DrVisit3->ViewValue = $this->DrVisit3->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->DrVisit3->ViewValue = $this->DrVisit3->CurrentValue;
				}
			}
		} else {
			$this->DrVisit3->ViewValue = NULL;
		}
		$this->DrVisit3->ViewCustomAttributes = "";

		// DrVisit4
		$curVal = strval($this->DrVisit4->CurrentValue);
		if ($curVal <> "") {
			$this->DrVisit4->ViewValue = $this->DrVisit4->lookupCacheOption($curVal);
			if ($this->DrVisit4->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->DrVisit4->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->DrVisit4->ViewValue = $this->DrVisit4->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->DrVisit4->ViewValue = $this->DrVisit4->CurrentValue;
				}
			}
		} else {
			$this->DrVisit4->ViewValue = NULL;
		}
		$this->DrVisit4->ViewCustomAttributes = "";

		// Surgeon
		$this->Surgeon->ViewValue = $this->Surgeon->CurrentValue;
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
		$this->Anaesthetist->ViewValue = $this->Anaesthetist->CurrentValue;
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
		$this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->CurrentValue;
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
		$this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->CurrentValue;
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
		$this->paediatric->ViewValue = $this->paediatric->CurrentValue;
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

		// Reception
		$this->Reception->ViewValue = $this->Reception->CurrentValue;
		$this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
		$this->Reception->ViewCustomAttributes = "";

		// PId
		$this->PId->ViewValue = $this->PId->CurrentValue;
		$this->PId->ViewValue = FormatNumber($this->PId->ViewValue, 0, -2, -2, -2);
		$this->PId->ViewCustomAttributes = "";

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
					$arwrk[1] = FormatNumber($rswrk->fields('df'), 0, -2, -2, -2);
					$arwrk[2] = $rswrk->fields('df2');
					$arwrk[3] = $rswrk->fields('df3');
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

		// ObstetricsHistryMale
		$this->ObstetricsHistryMale->EditAttrs["class"] = "form-control";
		$this->ObstetricsHistryMale->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ObstetricsHistryMale->CurrentValue = HtmlDecode($this->ObstetricsHistryMale->CurrentValue);
		$this->ObstetricsHistryMale->EditValue = $this->ObstetricsHistryMale->CurrentValue;
		$this->ObstetricsHistryMale->PlaceHolder = RemoveHtml($this->ObstetricsHistryMale->caption());

		// ObstetricsHistryFeMale
		$this->ObstetricsHistryFeMale->EditAttrs["class"] = "form-control";
		$this->ObstetricsHistryFeMale->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ObstetricsHistryFeMale->CurrentValue = HtmlDecode($this->ObstetricsHistryFeMale->CurrentValue);
		$this->ObstetricsHistryFeMale->EditValue = $this->ObstetricsHistryFeMale->CurrentValue;
		$this->ObstetricsHistryFeMale->PlaceHolder = RemoveHtml($this->ObstetricsHistryFeMale->caption());

		// Abortion
		$this->Abortion->EditAttrs["class"] = "form-control";
		$this->Abortion->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Abortion->CurrentValue = HtmlDecode($this->Abortion->CurrentValue);
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
		if (REMOVE_XSS)
			$this->ChildBirthTime->CurrentValue = HtmlDecode($this->ChildBirthTime->CurrentValue);
		$this->ChildBirthTime->EditValue = $this->ChildBirthTime->CurrentValue;
		$this->ChildBirthTime->PlaceHolder = RemoveHtml($this->ChildBirthTime->caption());

		// ChildSex
		$this->ChildSex->EditAttrs["class"] = "form-control";
		$this->ChildSex->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ChildSex->CurrentValue = HtmlDecode($this->ChildSex->CurrentValue);
		$this->ChildSex->EditValue = $this->ChildSex->CurrentValue;
		$this->ChildSex->PlaceHolder = RemoveHtml($this->ChildSex->caption());

		// ChildWt
		$this->ChildWt->EditAttrs["class"] = "form-control";
		$this->ChildWt->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ChildWt->CurrentValue = HtmlDecode($this->ChildWt->CurrentValue);
		$this->ChildWt->EditValue = $this->ChildWt->CurrentValue;
		$this->ChildWt->PlaceHolder = RemoveHtml($this->ChildWt->caption());

		// ChildDay
		$this->ChildDay->EditAttrs["class"] = "form-control";
		$this->ChildDay->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ChildDay->CurrentValue = HtmlDecode($this->ChildDay->CurrentValue);
		$this->ChildDay->EditValue = $this->ChildDay->CurrentValue;
		$this->ChildDay->PlaceHolder = RemoveHtml($this->ChildDay->caption());

		// ChildOE
		$this->ChildOE->EditAttrs["class"] = "form-control";
		$this->ChildOE->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ChildOE->CurrentValue = HtmlDecode($this->ChildOE->CurrentValue);
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
		if (REMOVE_XSS)
			$this->ChildBlGrp->CurrentValue = HtmlDecode($this->ChildBlGrp->CurrentValue);
		$this->ChildBlGrp->EditValue = $this->ChildBlGrp->CurrentValue;
		$this->ChildBlGrp->PlaceHolder = RemoveHtml($this->ChildBlGrp->caption());

		// ApgarScore
		$this->ApgarScore->EditAttrs["class"] = "form-control";
		$this->ApgarScore->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ApgarScore->CurrentValue = HtmlDecode($this->ApgarScore->CurrentValue);
		$this->ApgarScore->EditValue = $this->ApgarScore->CurrentValue;
		$this->ApgarScore->PlaceHolder = RemoveHtml($this->ApgarScore->caption());

		// birthnotification
		$this->birthnotification->EditAttrs["class"] = "form-control";
		$this->birthnotification->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->birthnotification->CurrentValue = HtmlDecode($this->birthnotification->CurrentValue);
		$this->birthnotification->EditValue = $this->birthnotification->CurrentValue;
		$this->birthnotification->PlaceHolder = RemoveHtml($this->birthnotification->caption());

		// formno
		$this->formno->EditAttrs["class"] = "form-control";
		$this->formno->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->formno->CurrentValue = HtmlDecode($this->formno->CurrentValue);
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
		if (REMOVE_XSS)
			$this->motherReligion->CurrentValue = HtmlDecode($this->motherReligion->CurrentValue);
		$this->motherReligion->EditValue = $this->motherReligion->CurrentValue;
		$this->motherReligion->PlaceHolder = RemoveHtml($this->motherReligion->caption());

		// bloodgroup
		$this->bloodgroup->EditAttrs["class"] = "form-control";
		$this->bloodgroup->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->bloodgroup->CurrentValue = HtmlDecode($this->bloodgroup->CurrentValue);
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
		if (REMOVE_XSS)
			$this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
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
		if (REMOVE_XSS)
			$this->ChildBirthTime1->CurrentValue = HtmlDecode($this->ChildBirthTime1->CurrentValue);
		$this->ChildBirthTime1->EditValue = $this->ChildBirthTime1->CurrentValue;
		$this->ChildBirthTime1->PlaceHolder = RemoveHtml($this->ChildBirthTime1->caption());

		// ChildSex1
		$this->ChildSex1->EditAttrs["class"] = "form-control";
		$this->ChildSex1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ChildSex1->CurrentValue = HtmlDecode($this->ChildSex1->CurrentValue);
		$this->ChildSex1->EditValue = $this->ChildSex1->CurrentValue;
		$this->ChildSex1->PlaceHolder = RemoveHtml($this->ChildSex1->caption());

		// ChildWt1
		$this->ChildWt1->EditAttrs["class"] = "form-control";
		$this->ChildWt1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ChildWt1->CurrentValue = HtmlDecode($this->ChildWt1->CurrentValue);
		$this->ChildWt1->EditValue = $this->ChildWt1->CurrentValue;
		$this->ChildWt1->PlaceHolder = RemoveHtml($this->ChildWt1->caption());

		// ChildDay1
		$this->ChildDay1->EditAttrs["class"] = "form-control";
		$this->ChildDay1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ChildDay1->CurrentValue = HtmlDecode($this->ChildDay1->CurrentValue);
		$this->ChildDay1->EditValue = $this->ChildDay1->CurrentValue;
		$this->ChildDay1->PlaceHolder = RemoveHtml($this->ChildDay1->caption());

		// ChildOE1
		$this->ChildOE1->EditAttrs["class"] = "form-control";
		$this->ChildOE1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ChildOE1->CurrentValue = HtmlDecode($this->ChildOE1->CurrentValue);
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
		if (REMOVE_XSS)
			$this->ChildBlGrp1->CurrentValue = HtmlDecode($this->ChildBlGrp1->CurrentValue);
		$this->ChildBlGrp1->EditValue = $this->ChildBlGrp1->CurrentValue;
		$this->ChildBlGrp1->PlaceHolder = RemoveHtml($this->ChildBlGrp1->caption());

		// ApgarScore1
		$this->ApgarScore1->EditAttrs["class"] = "form-control";
		$this->ApgarScore1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ApgarScore1->CurrentValue = HtmlDecode($this->ApgarScore1->CurrentValue);
		$this->ApgarScore1->EditValue = $this->ApgarScore1->CurrentValue;
		$this->ApgarScore1->PlaceHolder = RemoveHtml($this->ApgarScore1->caption());

		// birthnotification1
		$this->birthnotification1->EditAttrs["class"] = "form-control";
		$this->birthnotification1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->birthnotification1->CurrentValue = HtmlDecode($this->birthnotification1->CurrentValue);
		$this->birthnotification1->EditValue = $this->birthnotification1->CurrentValue;
		$this->birthnotification1->PlaceHolder = RemoveHtml($this->birthnotification1->caption());

		// formno1
		$this->formno1->EditAttrs["class"] = "form-control";
		$this->formno1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->formno1->CurrentValue = HtmlDecode($this->formno1->CurrentValue);
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
		if (REMOVE_XSS)
			$this->Duration->CurrentValue = HtmlDecode($this->Duration->CurrentValue);
		$this->Duration->EditValue = $this->Duration->CurrentValue;
		$this->Duration->PlaceHolder = RemoveHtml($this->Duration->caption());

		// DrVisit1
		$this->DrVisit1->EditAttrs["class"] = "form-control";
		$this->DrVisit1->EditCustomAttributes = "";

		// DrVisit2
		$this->DrVisit2->EditAttrs["class"] = "form-control";
		$this->DrVisit2->EditCustomAttributes = "";

		// DrVisit3
		$this->DrVisit3->EditAttrs["class"] = "form-control";
		$this->DrVisit3->EditCustomAttributes = "";

		// DrVisit4
		$this->DrVisit4->EditAttrs["class"] = "form-control";
		$this->DrVisit4->EditCustomAttributes = "";

		// Surgeon
		$this->Surgeon->EditAttrs["class"] = "form-control";
		$this->Surgeon->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Surgeon->CurrentValue = HtmlDecode($this->Surgeon->CurrentValue);
		$this->Surgeon->EditValue = $this->Surgeon->CurrentValue;
		$this->Surgeon->PlaceHolder = RemoveHtml($this->Surgeon->caption());

		// Anaesthetist
		$this->Anaesthetist->EditAttrs["class"] = "form-control";
		$this->Anaesthetist->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Anaesthetist->CurrentValue = HtmlDecode($this->Anaesthetist->CurrentValue);
		$this->Anaesthetist->EditValue = $this->Anaesthetist->CurrentValue;
		$this->Anaesthetist->PlaceHolder = RemoveHtml($this->Anaesthetist->caption());

		// AsstSurgeon1
		$this->AsstSurgeon1->EditAttrs["class"] = "form-control";
		$this->AsstSurgeon1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->AsstSurgeon1->CurrentValue = HtmlDecode($this->AsstSurgeon1->CurrentValue);
		$this->AsstSurgeon1->EditValue = $this->AsstSurgeon1->CurrentValue;
		$this->AsstSurgeon1->PlaceHolder = RemoveHtml($this->AsstSurgeon1->caption());

		// AsstSurgeon2
		$this->AsstSurgeon2->EditAttrs["class"] = "form-control";
		$this->AsstSurgeon2->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->AsstSurgeon2->CurrentValue = HtmlDecode($this->AsstSurgeon2->CurrentValue);
		$this->AsstSurgeon2->EditValue = $this->AsstSurgeon2->CurrentValue;
		$this->AsstSurgeon2->PlaceHolder = RemoveHtml($this->AsstSurgeon2->caption());

		// paediatric
		$this->paediatric->EditAttrs["class"] = "form-control";
		$this->paediatric->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->paediatric->CurrentValue = HtmlDecode($this->paediatric->CurrentValue);
		$this->paediatric->EditValue = $this->paediatric->CurrentValue;
		$this->paediatric->PlaceHolder = RemoveHtml($this->paediatric->caption());

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

		// PatientSearch
		$this->PatientSearch->EditAttrs["class"] = "form-control";
		$this->PatientSearch->EditCustomAttributes = "";

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