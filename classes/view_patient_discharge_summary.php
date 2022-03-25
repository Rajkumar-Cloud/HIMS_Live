<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for view_patient_discharge_summary
 */
class view_patient_discharge_summary extends DbTable
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
	public $PatientID;
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
	public $HospID;
	public $status;
	public $mrnNo;
	public $createdby;
	public $createddatetime;
	public $modifiedby;
	public $modifieddatetime;
	public $provisional_diagnosis;
	public $Treatments;
	public $FinalDiagnosis;
	public $BP;
	public $Pulse;
	public $Resp;
	public $SPO2;
	public $FollowupAdvice;
	public $NextReviewDate;
	public $History;
	public $patient_id;
	public $vitals;
	public $courseinhospital;
	public $procedurenotes;
	public $conditionatdischarge;
	public $AdviceToOtherHospital;
	public $ReferedByDr;
	public $DischargeAdviceMedicine;
	public $vid;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'view_patient_discharge_summary';
		$this->TableName = 'view_patient_discharge_summary';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`view_patient_discharge_summary`";
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
		$this->id = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Nullable = FALSE; // NOT NULL field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// PatientID
		$this->PatientID = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_PatientID', 'PatientID', '`PatientID`', '`PatientID`', 200, -1, FALSE, '`PatientID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientID->Sortable = TRUE; // Allow sort
		$this->fields['PatientID'] = &$this->PatientID;

		// patient_name
		$this->patient_name = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_patient_name', 'patient_name', '`patient_name`', '`patient_name`', 200, -1, FALSE, '`patient_name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->patient_name->Sortable = TRUE; // Allow sort
		$this->fields['patient_name'] = &$this->patient_name;

		// profilePic
		$this->profilePic = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_profilePic', 'profilePic', '`profilePic`', '`profilePic`', 201, -1, FALSE, '`profilePic`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->profilePic->Sortable = TRUE; // Allow sort
		$this->fields['profilePic'] = &$this->profilePic;

		// gender
		$this->gender = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_gender', 'gender', '`gender`', '`gender`', 200, -1, FALSE, '`gender`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->gender->Sortable = TRUE; // Allow sort
		$this->fields['gender'] = &$this->gender;

		// age
		$this->age = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_age', 'age', '`age`', '`age`', 200, -1, FALSE, '`age`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->age->Sortable = FALSE; // Allow sort
		$this->fields['age'] = &$this->age;

		// physician_id
		$this->physician_id = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_physician_id', 'physician_id', '`physician_id`', '`physician_id`', 3, -1, FALSE, '`physician_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->physician_id->Sortable = TRUE; // Allow sort
		$this->physician_id->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->physician_id->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->physician_id->Lookup = new Lookup('physician_id', 'doctors', FALSE, 'id', ["NAME","","",""], [], [], [], [], [], [], '', '');
		$this->physician_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['physician_id'] = &$this->physician_id;

		// typeRegsisteration
		$this->typeRegsisteration = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_typeRegsisteration', 'typeRegsisteration', '`typeRegsisteration`', '`typeRegsisteration`', 200, -1, FALSE, '`typeRegsisteration`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->typeRegsisteration->Sortable = TRUE; // Allow sort
		$this->fields['typeRegsisteration'] = &$this->typeRegsisteration;

		// PaymentCategory
		$this->PaymentCategory = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_PaymentCategory', 'PaymentCategory', '`PaymentCategory`', '`PaymentCategory`', 200, -1, FALSE, '`PaymentCategory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PaymentCategory->Sortable = TRUE; // Allow sort
		$this->fields['PaymentCategory'] = &$this->PaymentCategory;

		// admission_consultant_id
		$this->admission_consultant_id = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_admission_consultant_id', 'admission_consultant_id', '`admission_consultant_id`', '`admission_consultant_id`', 3, -1, FALSE, '`admission_consultant_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->admission_consultant_id->Sortable = TRUE; // Allow sort
		$this->admission_consultant_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['admission_consultant_id'] = &$this->admission_consultant_id;

		// leading_consultant_id
		$this->leading_consultant_id = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_leading_consultant_id', 'leading_consultant_id', '`leading_consultant_id`', '`leading_consultant_id`', 3, -1, FALSE, '`leading_consultant_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->leading_consultant_id->Sortable = TRUE; // Allow sort
		$this->leading_consultant_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['leading_consultant_id'] = &$this->leading_consultant_id;

		// cause
		$this->cause = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_cause', 'cause', '`cause`', '`cause`', 201, -1, FALSE, '`cause`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->cause->Sortable = TRUE; // Allow sort
		$this->fields['cause'] = &$this->cause;

		// admission_date
		$this->admission_date = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_admission_date', 'admission_date', '`admission_date`', CastDateFieldForLike('`admission_date`', 7, "DB"), 135, 7, FALSE, '`admission_date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->admission_date->Sortable = TRUE; // Allow sort
		$this->admission_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['admission_date'] = &$this->admission_date;

		// release_date
		$this->release_date = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_release_date', 'release_date', '`release_date`', CastDateFieldForLike('`release_date`', 7, "DB"), 135, 7, FALSE, '`release_date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->release_date->Sortable = TRUE; // Allow sort
		$this->release_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['release_date'] = &$this->release_date;

		// PaymentStatus
		$this->PaymentStatus = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_PaymentStatus', 'PaymentStatus', '`PaymentStatus`', '`PaymentStatus`', 3, -1, FALSE, '`PaymentStatus`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PaymentStatus->Sortable = TRUE; // Allow sort
		$this->PaymentStatus->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['PaymentStatus'] = &$this->PaymentStatus;

		// HospID
		$this->HospID = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 200, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->fields['HospID'] = &$this->HospID;

		// status
		$this->status = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_status', 'status', '`status`', '`status`', 3, -1, FALSE, '`status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->status->Sortable = TRUE; // Allow sort
		$this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['status'] = &$this->status;

		// mrnNo
		$this->mrnNo = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_mrnNo', 'mrnNo', '`mrnNo`', '`mrnNo`', 200, -1, FALSE, '`mrnNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mrnNo->Nullable = FALSE; // NOT NULL field
		$this->mrnNo->Required = TRUE; // Required field
		$this->mrnNo->Sortable = TRUE; // Allow sort
		$this->fields['mrnNo'] = &$this->mrnNo;

		// createdby
		$this->createdby = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, -1, FALSE, '`createdby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdby->Sortable = TRUE; // Allow sort
		$this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['createdby'] = &$this->createdby;

		// createddatetime
		$this->createddatetime = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike('`createddatetime`', 0, "DB"), 135, 0, FALSE, '`createddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = TRUE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['createddatetime'] = &$this->createddatetime;

		// modifiedby
		$this->modifiedby = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, -1, FALSE, '`modifiedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifiedby->Sortable = TRUE; // Allow sort
		$this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['modifiedby'] = &$this->modifiedby;

		// modifieddatetime
		$this->modifieddatetime = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike('`modifieddatetime`', 0, "DB"), 135, 0, FALSE, '`modifieddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifieddatetime->Sortable = TRUE; // Allow sort
		$this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['modifieddatetime'] = &$this->modifieddatetime;

		// provisional_diagnosis
		$this->provisional_diagnosis = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_provisional_diagnosis', 'provisional_diagnosis', '`provisional_diagnosis`', '`provisional_diagnosis`', 201, -1, FALSE, '`provisional_diagnosis`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->provisional_diagnosis->Sortable = TRUE; // Allow sort
		$this->fields['provisional_diagnosis'] = &$this->provisional_diagnosis;

		// Treatments
		$this->Treatments = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_Treatments', 'Treatments', '`Treatments`', '`Treatments`', 201, -1, FALSE, '`Treatments`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Treatments->Sortable = TRUE; // Allow sort
		$this->fields['Treatments'] = &$this->Treatments;

		// FinalDiagnosis
		$this->FinalDiagnosis = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_FinalDiagnosis', 'FinalDiagnosis', '`FinalDiagnosis`', '`FinalDiagnosis`', 201, -1, FALSE, '`FinalDiagnosis`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->FinalDiagnosis->Sortable = TRUE; // Allow sort
		$this->fields['FinalDiagnosis'] = &$this->FinalDiagnosis;

		// BP
		$this->BP = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_BP', 'BP', '`BP`', '`BP`', 200, -1, FALSE, '`BP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BP->Sortable = TRUE; // Allow sort
		$this->fields['BP'] = &$this->BP;

		// Pulse
		$this->Pulse = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_Pulse', 'Pulse', '`Pulse`', '`Pulse`', 200, -1, FALSE, '`Pulse`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Pulse->Sortable = TRUE; // Allow sort
		$this->fields['Pulse'] = &$this->Pulse;

		// Resp
		$this->Resp = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_Resp', 'Resp', '`Resp`', '`Resp`', 200, -1, FALSE, '`Resp`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Resp->Sortable = TRUE; // Allow sort
		$this->fields['Resp'] = &$this->Resp;

		// SPO2
		$this->SPO2 = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_SPO2', 'SPO2', '`SPO2`', '`SPO2`', 200, -1, FALSE, '`SPO2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SPO2->Sortable = TRUE; // Allow sort
		$this->fields['SPO2'] = &$this->SPO2;

		// FollowupAdvice
		$this->FollowupAdvice = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_FollowupAdvice', 'FollowupAdvice', '`FollowupAdvice`', '`FollowupAdvice`', 201, -1, FALSE, '`FollowupAdvice`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->FollowupAdvice->Sortable = TRUE; // Allow sort
		$this->fields['FollowupAdvice'] = &$this->FollowupAdvice;

		// NextReviewDate
		$this->NextReviewDate = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_NextReviewDate', 'NextReviewDate', '`NextReviewDate`', CastDateFieldForLike('`NextReviewDate`', 14, "DB"), 135, 14, FALSE, '`NextReviewDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NextReviewDate->Sortable = TRUE; // Allow sort
		$this->NextReviewDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectShortDateDMY"));
		$this->fields['NextReviewDate'] = &$this->NextReviewDate;

		// History
		$this->History = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_History', 'History', '`History`', '`History`', 201, -1, FALSE, '`History`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->History->Sortable = TRUE; // Allow sort
		$this->fields['History'] = &$this->History;

		// patient_id
		$this->patient_id = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_patient_id', 'patient_id', '`patient_id`', '`patient_id`', 3, -1, FALSE, '`patient_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->patient_id->Nullable = FALSE; // NOT NULL field
		$this->patient_id->Required = TRUE; // Required field
		$this->patient_id->Sortable = TRUE; // Allow sort
		$this->patient_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['patient_id'] = &$this->patient_id;

		// vitals
		$this->vitals = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_vitals', 'vitals', '`vitals`', '`vitals`', 201, -1, FALSE, '`vitals`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->vitals->Sortable = TRUE; // Allow sort
		$this->fields['vitals'] = &$this->vitals;

		// courseinhospital
		$this->courseinhospital = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_courseinhospital', 'courseinhospital', '`courseinhospital`', '`courseinhospital`', 201, -1, FALSE, '`courseinhospital`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->courseinhospital->Sortable = TRUE; // Allow sort
		$this->fields['courseinhospital'] = &$this->courseinhospital;

		// procedurenotes
		$this->procedurenotes = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_procedurenotes', 'procedurenotes', '`procedurenotes`', '`procedurenotes`', 201, -1, FALSE, '`procedurenotes`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->procedurenotes->Sortable = TRUE; // Allow sort
		$this->fields['procedurenotes'] = &$this->procedurenotes;

		// conditionatdischarge
		$this->conditionatdischarge = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_conditionatdischarge', 'conditionatdischarge', '`conditionatdischarge`', '`conditionatdischarge`', 201, -1, FALSE, '`conditionatdischarge`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->conditionatdischarge->Sortable = TRUE; // Allow sort
		$this->fields['conditionatdischarge'] = &$this->conditionatdischarge;

		// AdviceToOtherHospital
		$this->AdviceToOtherHospital = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_AdviceToOtherHospital', 'AdviceToOtherHospital', '`AdviceToOtherHospital`', '`AdviceToOtherHospital`', 200, -1, FALSE, '`AdviceToOtherHospital`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AdviceToOtherHospital->Sortable = TRUE; // Allow sort
		$this->fields['AdviceToOtherHospital'] = &$this->AdviceToOtherHospital;

		// ReferedByDr
		$this->ReferedByDr = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_ReferedByDr', 'ReferedByDr', '`ReferedByDr`', '`ReferedByDr`', 200, -1, FALSE, '`ReferedByDr`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReferedByDr->Sortable = TRUE; // Allow sort
		$this->fields['ReferedByDr'] = &$this->ReferedByDr;

		// DischargeAdviceMedicine
		$this->DischargeAdviceMedicine = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_DischargeAdviceMedicine', 'DischargeAdviceMedicine', '`DischargeAdviceMedicine`', '`DischargeAdviceMedicine`', 201, -1, FALSE, '`DischargeAdviceMedicine`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->DischargeAdviceMedicine->Sortable = TRUE; // Allow sort
		$this->fields['DischargeAdviceMedicine'] = &$this->DischargeAdviceMedicine;

		// vid
		$this->vid = new DbField('view_patient_discharge_summary', 'view_patient_discharge_summary', 'x_vid', 'vid', '`vid`', '`vid`', 3, -1, FALSE, '`vid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->vid->Nullable = FALSE; // NOT NULL field
		$this->vid->Sortable = TRUE; // Allow sort
		$this->vid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['vid'] = &$this->vid;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`view_patient_discharge_summary`";
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
		$this->PatientID->DbValue = $row['PatientID'];
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
		$this->HospID->DbValue = $row['HospID'];
		$this->status->DbValue = $row['status'];
		$this->mrnNo->DbValue = $row['mrnNo'];
		$this->createdby->DbValue = $row['createdby'];
		$this->createddatetime->DbValue = $row['createddatetime'];
		$this->modifiedby->DbValue = $row['modifiedby'];
		$this->modifieddatetime->DbValue = $row['modifieddatetime'];
		$this->provisional_diagnosis->DbValue = $row['provisional_diagnosis'];
		$this->Treatments->DbValue = $row['Treatments'];
		$this->FinalDiagnosis->DbValue = $row['FinalDiagnosis'];
		$this->BP->DbValue = $row['BP'];
		$this->Pulse->DbValue = $row['Pulse'];
		$this->Resp->DbValue = $row['Resp'];
		$this->SPO2->DbValue = $row['SPO2'];
		$this->FollowupAdvice->DbValue = $row['FollowupAdvice'];
		$this->NextReviewDate->DbValue = $row['NextReviewDate'];
		$this->History->DbValue = $row['History'];
		$this->patient_id->DbValue = $row['patient_id'];
		$this->vitals->DbValue = $row['vitals'];
		$this->courseinhospital->DbValue = $row['courseinhospital'];
		$this->procedurenotes->DbValue = $row['procedurenotes'];
		$this->conditionatdischarge->DbValue = $row['conditionatdischarge'];
		$this->AdviceToOtherHospital->DbValue = $row['AdviceToOtherHospital'];
		$this->ReferedByDr->DbValue = $row['ReferedByDr'];
		$this->DischargeAdviceMedicine->DbValue = $row['DischargeAdviceMedicine'];
		$this->vid->DbValue = $row['vid'];
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
			return "view_patient_discharge_summarylist.php";
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
		if ($pageName == "view_patient_discharge_summaryview.php")
			return $Language->phrase("View");
		elseif ($pageName == "view_patient_discharge_summaryedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "view_patient_discharge_summaryadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "view_patient_discharge_summarylist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("view_patient_discharge_summaryview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_patient_discharge_summaryview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "view_patient_discharge_summaryadd.php?" . $this->getUrlParm($parm);
		else
			$url = "view_patient_discharge_summaryadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("view_patient_discharge_summaryedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("view_patient_discharge_summaryadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("view_patient_discharge_summarydelete.php", $this->getUrlParm());
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
		$this->PatientID->setDbValue($rs->fields('PatientID'));
		$this->patient_name->setDbValue($rs->fields('patient_name'));
		$this->profilePic->setDbValue($rs->fields('profilePic'));
		$this->gender->setDbValue($rs->fields('gender'));
		$this->age->setDbValue($rs->fields('age'));
		$this->physician_id->setDbValue($rs->fields('physician_id'));
		$this->typeRegsisteration->setDbValue($rs->fields('typeRegsisteration'));
		$this->PaymentCategory->setDbValue($rs->fields('PaymentCategory'));
		$this->admission_consultant_id->setDbValue($rs->fields('admission_consultant_id'));
		$this->leading_consultant_id->setDbValue($rs->fields('leading_consultant_id'));
		$this->cause->setDbValue($rs->fields('cause'));
		$this->admission_date->setDbValue($rs->fields('admission_date'));
		$this->release_date->setDbValue($rs->fields('release_date'));
		$this->PaymentStatus->setDbValue($rs->fields('PaymentStatus'));
		$this->HospID->setDbValue($rs->fields('HospID'));
		$this->status->setDbValue($rs->fields('status'));
		$this->mrnNo->setDbValue($rs->fields('mrnNo'));
		$this->createdby->setDbValue($rs->fields('createdby'));
		$this->createddatetime->setDbValue($rs->fields('createddatetime'));
		$this->modifiedby->setDbValue($rs->fields('modifiedby'));
		$this->modifieddatetime->setDbValue($rs->fields('modifieddatetime'));
		$this->provisional_diagnosis->setDbValue($rs->fields('provisional_diagnosis'));
		$this->Treatments->setDbValue($rs->fields('Treatments'));
		$this->FinalDiagnosis->setDbValue($rs->fields('FinalDiagnosis'));
		$this->BP->setDbValue($rs->fields('BP'));
		$this->Pulse->setDbValue($rs->fields('Pulse'));
		$this->Resp->setDbValue($rs->fields('Resp'));
		$this->SPO2->setDbValue($rs->fields('SPO2'));
		$this->FollowupAdvice->setDbValue($rs->fields('FollowupAdvice'));
		$this->NextReviewDate->setDbValue($rs->fields('NextReviewDate'));
		$this->History->setDbValue($rs->fields('History'));
		$this->patient_id->setDbValue($rs->fields('patient_id'));
		$this->vitals->setDbValue($rs->fields('vitals'));
		$this->courseinhospital->setDbValue($rs->fields('courseinhospital'));
		$this->procedurenotes->setDbValue($rs->fields('procedurenotes'));
		$this->conditionatdischarge->setDbValue($rs->fields('conditionatdischarge'));
		$this->AdviceToOtherHospital->setDbValue($rs->fields('AdviceToOtherHospital'));
		$this->ReferedByDr->setDbValue($rs->fields('ReferedByDr'));
		$this->DischargeAdviceMedicine->setDbValue($rs->fields('DischargeAdviceMedicine'));
		$this->vid->setDbValue($rs->fields('vid'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// PatientID
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
		// HospID
		// status
		// mrnNo
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// provisional_diagnosis
		// Treatments
		// FinalDiagnosis
		// BP
		// Pulse
		// Resp
		// SPO2
		// FollowupAdvice
		// NextReviewDate
		// History
		// patient_id
		// vitals
		// courseinhospital
		// procedurenotes
		// conditionatdischarge
		// AdviceToOtherHospital
		// ReferedByDr
		// DischargeAdviceMedicine
		// vid
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// PatientID
		$this->PatientID->ViewValue = $this->PatientID->CurrentValue;
		$this->PatientID->ViewCustomAttributes = "";

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
		$curVal = strval($this->physician_id->CurrentValue);
		if ($curVal <> "") {
			$this->physician_id->ViewValue = $this->physician_id->lookupCacheOption($curVal);
			if ($this->physician_id->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->physician_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->physician_id->ViewValue = $this->physician_id->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->physician_id->ViewValue = $this->physician_id->CurrentValue;
				}
			}
		} else {
			$this->physician_id->ViewValue = NULL;
		}
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
		$this->admission_date->ViewValue = FormatDateTime($this->admission_date->ViewValue, 7);
		$this->admission_date->ViewCustomAttributes = "";

		// release_date
		$this->release_date->ViewValue = $this->release_date->CurrentValue;
		$this->release_date->ViewValue = FormatDateTime($this->release_date->ViewValue, 7);
		$this->release_date->ViewCustomAttributes = "";

		// PaymentStatus
		$this->PaymentStatus->ViewValue = $this->PaymentStatus->CurrentValue;
		$this->PaymentStatus->ViewValue = FormatNumber($this->PaymentStatus->ViewValue, 0, -2, -2, -2);
		$this->PaymentStatus->ViewCustomAttributes = "";

		// HospID
		$this->HospID->ViewValue = $this->HospID->CurrentValue;
		$this->HospID->ViewCustomAttributes = "";

		// status
		$this->status->ViewValue = $this->status->CurrentValue;
		$this->status->ViewValue = FormatNumber($this->status->ViewValue, 0, -2, -2, -2);
		$this->status->ViewCustomAttributes = "";

		// mrnNo
		$this->mrnNo->ViewValue = $this->mrnNo->CurrentValue;
		$this->mrnNo->ViewCustomAttributes = "";

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
		$this->NextReviewDate->ViewValue = FormatDateTime($this->NextReviewDate->ViewValue, 14);
		$this->NextReviewDate->ViewCustomAttributes = "";

		// History
		$this->History->ViewValue = $this->History->CurrentValue;
		$this->History->ViewCustomAttributes = "";

		// patient_id
		$this->patient_id->ViewValue = $this->patient_id->CurrentValue;
		$this->patient_id->ViewValue = FormatNumber($this->patient_id->ViewValue, 0, -2, -2, -2);
		$this->patient_id->ViewCustomAttributes = "";

		// vitals
		$this->vitals->ViewValue = $this->vitals->CurrentValue;
		$this->vitals->ViewCustomAttributes = "";

		// courseinhospital
		$this->courseinhospital->ViewValue = $this->courseinhospital->CurrentValue;
		$this->courseinhospital->ViewCustomAttributes = "";

		// procedurenotes
		$this->procedurenotes->ViewValue = $this->procedurenotes->CurrentValue;
		$this->procedurenotes->ViewCustomAttributes = "";

		// conditionatdischarge
		$this->conditionatdischarge->ViewValue = $this->conditionatdischarge->CurrentValue;
		$this->conditionatdischarge->ViewCustomAttributes = "";

		// AdviceToOtherHospital
		$this->AdviceToOtherHospital->ViewValue = $this->AdviceToOtherHospital->CurrentValue;
		$this->AdviceToOtherHospital->ViewCustomAttributes = "";

		// ReferedByDr
		$this->ReferedByDr->ViewValue = $this->ReferedByDr->CurrentValue;
		$this->ReferedByDr->ViewCustomAttributes = "";

		// DischargeAdviceMedicine
		$this->DischargeAdviceMedicine->ViewValue = $this->DischargeAdviceMedicine->CurrentValue;
		$this->DischargeAdviceMedicine->ViewCustomAttributes = "";

		// vid
		$this->vid->ViewValue = $this->vid->CurrentValue;
		$this->vid->ViewValue = FormatNumber($this->vid->ViewValue, 0, -2, -2, -2);
		$this->vid->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// PatientID
		$this->PatientID->LinkCustomAttributes = "";
		if (!EmptyValue($this->patient_id->CurrentValue)) {
			$this->PatientID->HrefValue = $this->patient_id->CurrentValue; // Add prefix/suffix
			$this->PatientID->LinkAttrs["target"] = "DischargeSummarysmry.php?cmd=search&x_"; // Add target
			if ($this->isExport()) $this->PatientID->HrefValue = FullUrl($this->PatientID->HrefValue, "href");
		} else {
			$this->PatientID->HrefValue = "";
		}
		$this->PatientID->TooltipValue = "";

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

		// HospID
		$this->HospID->LinkCustomAttributes = "";
		$this->HospID->HrefValue = "";
		$this->HospID->TooltipValue = "";

		// status
		$this->status->LinkCustomAttributes = "";
		$this->status->HrefValue = "";
		$this->status->TooltipValue = "";

		// mrnNo
		$this->mrnNo->LinkCustomAttributes = "";
		$this->mrnNo->HrefValue = "";
		$this->mrnNo->TooltipValue = "";

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

		// patient_id
		$this->patient_id->LinkCustomAttributes = "";
		$this->patient_id->HrefValue = "";
		$this->patient_id->TooltipValue = "";

		// vitals
		$this->vitals->LinkCustomAttributes = "";
		$this->vitals->HrefValue = "";
		$this->vitals->TooltipValue = "";

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

		// AdviceToOtherHospital
		$this->AdviceToOtherHospital->LinkCustomAttributes = "";
		$this->AdviceToOtherHospital->HrefValue = "";
		$this->AdviceToOtherHospital->TooltipValue = "";

		// ReferedByDr
		$this->ReferedByDr->LinkCustomAttributes = "";
		$this->ReferedByDr->HrefValue = "";
		$this->ReferedByDr->TooltipValue = "";

		// DischargeAdviceMedicine
		$this->DischargeAdviceMedicine->LinkCustomAttributes = "";
		$this->DischargeAdviceMedicine->HrefValue = "";
		$this->DischargeAdviceMedicine->TooltipValue = "";

		// vid
		$this->vid->LinkCustomAttributes = "";
		$this->vid->HrefValue = "";
		$this->vid->TooltipValue = "";

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

		// PatientID
		$this->PatientID->EditAttrs["class"] = "form-control";
		$this->PatientID->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
		$this->PatientID->EditValue = $this->PatientID->CurrentValue;
		$this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

		// patient_name
		$this->patient_name->EditAttrs["class"] = "form-control";
		$this->patient_name->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->patient_name->CurrentValue = HtmlDecode($this->patient_name->CurrentValue);
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
		if (REMOVE_XSS)
			$this->gender->CurrentValue = HtmlDecode($this->gender->CurrentValue);
		$this->gender->EditValue = $this->gender->CurrentValue;
		$this->gender->PlaceHolder = RemoveHtml($this->gender->caption());

		// age
		$this->age->EditAttrs["class"] = "form-control";
		$this->age->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->age->CurrentValue = HtmlDecode($this->age->CurrentValue);
		$this->age->EditValue = $this->age->CurrentValue;
		$this->age->PlaceHolder = RemoveHtml($this->age->caption());

		// physician_id
		$this->physician_id->EditAttrs["class"] = "form-control";
		$this->physician_id->EditCustomAttributes = "";

		// typeRegsisteration
		$this->typeRegsisteration->EditAttrs["class"] = "form-control";
		$this->typeRegsisteration->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->typeRegsisteration->CurrentValue = HtmlDecode($this->typeRegsisteration->CurrentValue);
		$this->typeRegsisteration->EditValue = $this->typeRegsisteration->CurrentValue;
		$this->typeRegsisteration->PlaceHolder = RemoveHtml($this->typeRegsisteration->caption());

		// PaymentCategory
		$this->PaymentCategory->EditAttrs["class"] = "form-control";
		$this->PaymentCategory->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PaymentCategory->CurrentValue = HtmlDecode($this->PaymentCategory->CurrentValue);
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
		$this->admission_date->EditValue = FormatDateTime($this->admission_date->CurrentValue, 7);
		$this->admission_date->PlaceHolder = RemoveHtml($this->admission_date->caption());

		// release_date
		$this->release_date->EditAttrs["class"] = "form-control";
		$this->release_date->EditCustomAttributes = "";
		$this->release_date->EditValue = FormatDateTime($this->release_date->CurrentValue, 7);
		$this->release_date->PlaceHolder = RemoveHtml($this->release_date->caption());

		// PaymentStatus
		$this->PaymentStatus->EditAttrs["class"] = "form-control";
		$this->PaymentStatus->EditCustomAttributes = "";
		$this->PaymentStatus->EditValue = $this->PaymentStatus->CurrentValue;
		$this->PaymentStatus->PlaceHolder = RemoveHtml($this->PaymentStatus->caption());

		// HospID
		$this->HospID->EditAttrs["class"] = "form-control";
		$this->HospID->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->HospID->CurrentValue = HtmlDecode($this->HospID->CurrentValue);
		$this->HospID->EditValue = $this->HospID->CurrentValue;
		$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

		// status
		$this->status->EditAttrs["class"] = "form-control";
		$this->status->EditCustomAttributes = "";
		$this->status->EditValue = $this->status->CurrentValue;
		$this->status->PlaceHolder = RemoveHtml($this->status->caption());

		// mrnNo
		$this->mrnNo->EditAttrs["class"] = "form-control";
		$this->mrnNo->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->mrnNo->CurrentValue = HtmlDecode($this->mrnNo->CurrentValue);
		$this->mrnNo->EditValue = $this->mrnNo->CurrentValue;
		$this->mrnNo->PlaceHolder = RemoveHtml($this->mrnNo->caption());

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

		// BP
		$this->BP->EditAttrs["class"] = "form-control";
		$this->BP->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->BP->CurrentValue = HtmlDecode($this->BP->CurrentValue);
		$this->BP->EditValue = $this->BP->CurrentValue;
		$this->BP->PlaceHolder = RemoveHtml($this->BP->caption());

		// Pulse
		$this->Pulse->EditAttrs["class"] = "form-control";
		$this->Pulse->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Pulse->CurrentValue = HtmlDecode($this->Pulse->CurrentValue);
		$this->Pulse->EditValue = $this->Pulse->CurrentValue;
		$this->Pulse->PlaceHolder = RemoveHtml($this->Pulse->caption());

		// Resp
		$this->Resp->EditAttrs["class"] = "form-control";
		$this->Resp->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Resp->CurrentValue = HtmlDecode($this->Resp->CurrentValue);
		$this->Resp->EditValue = $this->Resp->CurrentValue;
		$this->Resp->PlaceHolder = RemoveHtml($this->Resp->caption());

		// SPO2
		$this->SPO2->EditAttrs["class"] = "form-control";
		$this->SPO2->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->SPO2->CurrentValue = HtmlDecode($this->SPO2->CurrentValue);
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
		$this->NextReviewDate->EditValue = FormatDateTime($this->NextReviewDate->CurrentValue, 14);
		$this->NextReviewDate->PlaceHolder = RemoveHtml($this->NextReviewDate->caption());

		// History
		$this->History->EditAttrs["class"] = "form-control";
		$this->History->EditCustomAttributes = "";
		$this->History->EditValue = $this->History->CurrentValue;
		$this->History->PlaceHolder = RemoveHtml($this->History->caption());

		// patient_id
		$this->patient_id->EditAttrs["class"] = "form-control";
		$this->patient_id->EditCustomAttributes = "";
		$this->patient_id->EditValue = $this->patient_id->CurrentValue;
		$this->patient_id->PlaceHolder = RemoveHtml($this->patient_id->caption());

		// vitals
		$this->vitals->EditAttrs["class"] = "form-control";
		$this->vitals->EditCustomAttributes = "";
		$this->vitals->EditValue = $this->vitals->CurrentValue;
		$this->vitals->PlaceHolder = RemoveHtml($this->vitals->caption());

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

		// AdviceToOtherHospital
		$this->AdviceToOtherHospital->EditAttrs["class"] = "form-control";
		$this->AdviceToOtherHospital->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->AdviceToOtherHospital->CurrentValue = HtmlDecode($this->AdviceToOtherHospital->CurrentValue);
		$this->AdviceToOtherHospital->EditValue = $this->AdviceToOtherHospital->CurrentValue;
		$this->AdviceToOtherHospital->PlaceHolder = RemoveHtml($this->AdviceToOtherHospital->caption());

		// ReferedByDr
		$this->ReferedByDr->EditAttrs["class"] = "form-control";
		$this->ReferedByDr->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ReferedByDr->CurrentValue = HtmlDecode($this->ReferedByDr->CurrentValue);
		$this->ReferedByDr->EditValue = $this->ReferedByDr->CurrentValue;
		$this->ReferedByDr->PlaceHolder = RemoveHtml($this->ReferedByDr->caption());

		// DischargeAdviceMedicine
		$this->DischargeAdviceMedicine->EditAttrs["class"] = "form-control";
		$this->DischargeAdviceMedicine->EditCustomAttributes = "";
		$this->DischargeAdviceMedicine->EditValue = $this->DischargeAdviceMedicine->CurrentValue;
		$this->DischargeAdviceMedicine->PlaceHolder = RemoveHtml($this->DischargeAdviceMedicine->caption());

		// vid
		$this->vid->EditAttrs["class"] = "form-control";
		$this->vid->EditCustomAttributes = "";
		$this->vid->EditValue = $this->vid->CurrentValue;
		$this->vid->PlaceHolder = RemoveHtml($this->vid->caption());

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
					$doc->exportCaption($this->PatientID);
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
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->mrnNo);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
					$doc->exportCaption($this->provisional_diagnosis);
					$doc->exportCaption($this->Treatments);
					$doc->exportCaption($this->FinalDiagnosis);
					$doc->exportCaption($this->BP);
					$doc->exportCaption($this->Pulse);
					$doc->exportCaption($this->Resp);
					$doc->exportCaption($this->SPO2);
					$doc->exportCaption($this->FollowupAdvice);
					$doc->exportCaption($this->NextReviewDate);
					$doc->exportCaption($this->History);
					$doc->exportCaption($this->patient_id);
					$doc->exportCaption($this->vitals);
					$doc->exportCaption($this->courseinhospital);
					$doc->exportCaption($this->procedurenotes);
					$doc->exportCaption($this->conditionatdischarge);
					$doc->exportCaption($this->AdviceToOtherHospital);
					$doc->exportCaption($this->ReferedByDr);
					$doc->exportCaption($this->DischargeAdviceMedicine);
					$doc->exportCaption($this->vid);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->PatientID);
					$doc->exportCaption($this->patient_name);
					$doc->exportCaption($this->gender);
					$doc->exportCaption($this->physician_id);
					$doc->exportCaption($this->typeRegsisteration);
					$doc->exportCaption($this->PaymentCategory);
					$doc->exportCaption($this->admission_consultant_id);
					$doc->exportCaption($this->leading_consultant_id);
					$doc->exportCaption($this->admission_date);
					$doc->exportCaption($this->release_date);
					$doc->exportCaption($this->PaymentStatus);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->mrnNo);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
					$doc->exportCaption($this->BP);
					$doc->exportCaption($this->Pulse);
					$doc->exportCaption($this->Resp);
					$doc->exportCaption($this->SPO2);
					$doc->exportCaption($this->NextReviewDate);
					$doc->exportCaption($this->patient_id);
					$doc->exportCaption($this->AdviceToOtherHospital);
					$doc->exportCaption($this->ReferedByDr);
					$doc->exportCaption($this->vid);
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
						$doc->exportField($this->PatientID);
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
						$doc->exportField($this->HospID);
						$doc->exportField($this->status);
						$doc->exportField($this->mrnNo);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
						$doc->exportField($this->provisional_diagnosis);
						$doc->exportField($this->Treatments);
						$doc->exportField($this->FinalDiagnosis);
						$doc->exportField($this->BP);
						$doc->exportField($this->Pulse);
						$doc->exportField($this->Resp);
						$doc->exportField($this->SPO2);
						$doc->exportField($this->FollowupAdvice);
						$doc->exportField($this->NextReviewDate);
						$doc->exportField($this->History);
						$doc->exportField($this->patient_id);
						$doc->exportField($this->vitals);
						$doc->exportField($this->courseinhospital);
						$doc->exportField($this->procedurenotes);
						$doc->exportField($this->conditionatdischarge);
						$doc->exportField($this->AdviceToOtherHospital);
						$doc->exportField($this->ReferedByDr);
						$doc->exportField($this->DischargeAdviceMedicine);
						$doc->exportField($this->vid);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->PatientID);
						$doc->exportField($this->patient_name);
						$doc->exportField($this->gender);
						$doc->exportField($this->physician_id);
						$doc->exportField($this->typeRegsisteration);
						$doc->exportField($this->PaymentCategory);
						$doc->exportField($this->admission_consultant_id);
						$doc->exportField($this->leading_consultant_id);
						$doc->exportField($this->admission_date);
						$doc->exportField($this->release_date);
						$doc->exportField($this->PaymentStatus);
						$doc->exportField($this->HospID);
						$doc->exportField($this->status);
						$doc->exportField($this->mrnNo);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
						$doc->exportField($this->BP);
						$doc->exportField($this->Pulse);
						$doc->exportField($this->Resp);
						$doc->exportField($this->SPO2);
						$doc->exportField($this->NextReviewDate);
						$doc->exportField($this->patient_id);
						$doc->exportField($this->AdviceToOtherHospital);
						$doc->exportField($this->ReferedByDr);
						$doc->exportField($this->vid);
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