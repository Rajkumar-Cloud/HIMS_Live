<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for DischargeSummary
 */
class DischargeSummary extends ReportTable
{
	public $ShowGroupHeaderAsRow = FALSE;
	public $ShowCompactSummaryFooter = TRUE;
	public $id;
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
	public $BP;
	public $Pulse;
	public $Resp;
	public $SPO2;
	public $FollowupAdvice;
	public $NextReviewDate;
	public $Medicine;
	public $M;
	public $A;
	public $N;
	public $NoOfDays;
	public $PreRoute;
	public $TimeOfTaking;
	public $History;
	public $vitals;
	public $PatientID;
	public $HospID;

	// Constructor
	public function __construct()
	{
		global $ReportLanguage, $CurrentLanguage;

		// Language object
		if (!isset($ReportLanguage))
			$ReportLanguage = new ReportLanguage();
		$this->TableVar = 'DischargeSummary';
		$this->TableName = 'DischargeSummary';
		$this->TableType = 'REPORT';
		$this->TableReportType = 'summary';
		$this->SourceTableIsCustomView = FALSE;
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0;

		// id
		$this->id = new ReportField('DischargeSummary', 'DischargeSummary', 'x_id', 'id', '`id`', 3, -1, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->id->DateFilter = "";
		$this->fields['id'] = &$this->id;

		// mrnNo
		$this->mrnNo = new ReportField('DischargeSummary', 'DischargeSummary', 'x_mrnNo', 'mrnNo', '`mrnNo`', 200, -1, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->mrnNo->Sortable = TRUE; // Allow sort
		$this->mrnNo->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->mrnNo->PleaseSelectText = $ReportLanguage->phrase("PleaseSelect"); // PleaseSelect text
		$this->mrnNo->GroupingFieldId = 2;
		$this->mrnNo->ShowGroupHeaderAsRow = $this->ShowGroupHeaderAsRow;
		$this->mrnNo->ShowCompactSummaryFooter = $this->ShowCompactSummaryFooter;
		$this->mrnNo->DateFilter = "";
		$this->mrnNo->GroupByType = "";
		$this->mrnNo->GroupInterval = "0";
		$this->mrnNo->GroupSql = "";
		$this->fields['mrnNo'] = &$this->mrnNo;

		// patient_id
		$this->patient_id = new ReportField('DischargeSummary', 'DischargeSummary', 'x_patient_id', 'patient_id', '`patient_id`', 3, -1, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->patient_id->Sortable = TRUE; // Allow sort
		$this->patient_id->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->patient_id->PleaseSelectText = $ReportLanguage->phrase("PleaseSelect"); // PleaseSelect text
		$this->patient_id->GroupingFieldId = 1;
		$this->patient_id->ShowGroupHeaderAsRow = $this->ShowGroupHeaderAsRow;
		$this->patient_id->ShowCompactSummaryFooter = $this->ShowCompactSummaryFooter;
		$this->patient_id->DateFilter = "";
		$this->patient_id->Lookup = new ReportLookup('patient_id', 'DischargeSummary', TRUE, 'patient_id', ["patient_id","","",""], [], [], [], [], [], [], '`patient_id` ASC', '');
		$this->patient_id->Lookup->RenderViewFunc = "renderLookup";
		$this->patient_id->GroupByType = "";
		$this->patient_id->GroupInterval = "0";
		$this->patient_id->GroupSql = "";
		$this->fields['patient_id'] = &$this->patient_id;

		// patient_name
		$this->patient_name = new ReportField('DischargeSummary', 'DischargeSummary', 'x_patient_name', 'patient_name', '`patient_name`', 200, -1, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->patient_name->Sortable = TRUE; // Allow sort
		$this->patient_name->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->patient_name->PleaseSelectText = $ReportLanguage->phrase("PleaseSelect"); // PleaseSelect text
		$this->patient_name->DateFilter = "";
		$this->fields['patient_name'] = &$this->patient_name;

		// profilePic
		$this->profilePic = new ReportField('DischargeSummary', 'DischargeSummary', 'x_profilePic', 'profilePic', '`profilePic`', 201, -1, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->profilePic->Sortable = TRUE; // Allow sort
		$this->profilePic->DateFilter = "";
		$this->fields['profilePic'] = &$this->profilePic;

		// gender
		$this->gender = new ReportField('DischargeSummary', 'DischargeSummary', 'x_gender', 'gender', '`gender`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->gender->Sortable = TRUE; // Allow sort
		$this->gender->DateFilter = "";
		$this->fields['gender'] = &$this->gender;

		// age
		$this->age = new ReportField('DischargeSummary', 'DischargeSummary', 'x_age', 'age', '`age`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->age->Sortable = TRUE; // Allow sort
		$this->age->DateFilter = "";
		$this->fields['age'] = &$this->age;

		// physician_id
		$this->physician_id = new ReportField('DischargeSummary', 'DischargeSummary', 'x_physician_id', 'physician_id', '`physician_id`', 3, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->physician_id->Sortable = TRUE; // Allow sort
		$this->physician_id->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->physician_id->DateFilter = "";
		$this->fields['physician_id'] = &$this->physician_id;

		// typeRegsisteration
		$this->typeRegsisteration = new ReportField('DischargeSummary', 'DischargeSummary', 'x_typeRegsisteration', 'typeRegsisteration', '`typeRegsisteration`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->typeRegsisteration->Sortable = TRUE; // Allow sort
		$this->typeRegsisteration->DateFilter = "";
		$this->fields['typeRegsisteration'] = &$this->typeRegsisteration;

		// PaymentCategory
		$this->PaymentCategory = new ReportField('DischargeSummary', 'DischargeSummary', 'x_PaymentCategory', 'PaymentCategory', '`PaymentCategory`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PaymentCategory->Sortable = TRUE; // Allow sort
		$this->PaymentCategory->DateFilter = "";
		$this->fields['PaymentCategory'] = &$this->PaymentCategory;

		// admission_consultant_id
		$this->admission_consultant_id = new ReportField('DischargeSummary', 'DischargeSummary', 'x_admission_consultant_id', 'admission_consultant_id', '`admission_consultant_id`', 3, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->admission_consultant_id->Sortable = TRUE; // Allow sort
		$this->admission_consultant_id->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->admission_consultant_id->DateFilter = "";
		$this->fields['admission_consultant_id'] = &$this->admission_consultant_id;

		// leading_consultant_id
		$this->leading_consultant_id = new ReportField('DischargeSummary', 'DischargeSummary', 'x_leading_consultant_id', 'leading_consultant_id', '`leading_consultant_id`', 3, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->leading_consultant_id->Sortable = TRUE; // Allow sort
		$this->leading_consultant_id->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->leading_consultant_id->DateFilter = "";
		$this->fields['leading_consultant_id'] = &$this->leading_consultant_id;

		// cause
		$this->cause = new ReportField('DischargeSummary', 'DischargeSummary', 'x_cause', 'cause', '`cause`', 201, -1, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->cause->Sortable = TRUE; // Allow sort
		$this->cause->DateFilter = "";
		$this->fields['cause'] = &$this->cause;

		// admission_date
		$this->admission_date = new ReportField('DischargeSummary', 'DischargeSummary', 'x_admission_date', 'admission_date', '`admission_date`', 135, 0, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->admission_date->Sortable = TRUE; // Allow sort
		$this->admission_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $ReportLanguage->phrase("IncorrectDate"));
		$this->admission_date->DateFilter = "";
		$this->fields['admission_date'] = &$this->admission_date;

		// release_date
		$this->release_date = new ReportField('DischargeSummary', 'DischargeSummary', 'x_release_date', 'release_date', '`release_date`', 135, 0, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->release_date->Sortable = TRUE; // Allow sort
		$this->release_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $ReportLanguage->phrase("IncorrectDate"));
		$this->release_date->DateFilter = "";
		$this->fields['release_date'] = &$this->release_date;

		// PaymentStatus
		$this->PaymentStatus = new ReportField('DischargeSummary', 'DischargeSummary', 'x_PaymentStatus', 'PaymentStatus', '`PaymentStatus`', 3, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PaymentStatus->Sortable = TRUE; // Allow sort
		$this->PaymentStatus->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->PaymentStatus->DateFilter = "";
		$this->fields['PaymentStatus'] = &$this->PaymentStatus;

		// status
		$this->status = new ReportField('DischargeSummary', 'DischargeSummary', 'x_status', 'status', '`status`', 3, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->status->Sortable = TRUE; // Allow sort
		$this->status->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->status->DateFilter = "";
		$this->fields['status'] = &$this->status;

		// createdby
		$this->createdby = new ReportField('DischargeSummary', 'DischargeSummary', 'x_createdby', 'createdby', '`createdby`', 3, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdby->Sortable = TRUE; // Allow sort
		$this->createdby->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->createdby->DateFilter = "";
		$this->fields['createdby'] = &$this->createdby;

		// createddatetime
		$this->createddatetime = new ReportField('DischargeSummary', 'DischargeSummary', 'x_createddatetime', 'createddatetime', '`createddatetime`', 135, 0, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = TRUE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $ReportLanguage->phrase("IncorrectDate"));
		$this->createddatetime->DateFilter = "";
		$this->fields['createddatetime'] = &$this->createddatetime;

		// modifiedby
		$this->modifiedby = new ReportField('DischargeSummary', 'DischargeSummary', 'x_modifiedby', 'modifiedby', '`modifiedby`', 3, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifiedby->Sortable = TRUE; // Allow sort
		$this->modifiedby->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->modifiedby->DateFilter = "";
		$this->fields['modifiedby'] = &$this->modifiedby;

		// modifieddatetime
		$this->modifieddatetime = new ReportField('DischargeSummary', 'DischargeSummary', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', 135, 0, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifieddatetime->Sortable = TRUE; // Allow sort
		$this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $ReportLanguage->phrase("IncorrectDate"));
		$this->modifieddatetime->DateFilter = "";
		$this->fields['modifieddatetime'] = &$this->modifieddatetime;

		// provisional_diagnosis
		$this->provisional_diagnosis = new ReportField('DischargeSummary', 'DischargeSummary', 'x_provisional_diagnosis', 'provisional_diagnosis', '`provisional_diagnosis`', 201, -1, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->provisional_diagnosis->Sortable = TRUE; // Allow sort
		$this->provisional_diagnosis->DateFilter = "";
		$this->fields['provisional_diagnosis'] = &$this->provisional_diagnosis;

		// Treatments
		$this->Treatments = new ReportField('DischargeSummary', 'DischargeSummary', 'x_Treatments', 'Treatments', '`Treatments`', 201, -1, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Treatments->Sortable = TRUE; // Allow sort
		$this->Treatments->DateFilter = "";
		$this->fields['Treatments'] = &$this->Treatments;

		// FinalDiagnosis
		$this->FinalDiagnosis = new ReportField('DischargeSummary', 'DischargeSummary', 'x_FinalDiagnosis', 'FinalDiagnosis', '`FinalDiagnosis`', 201, -1, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->FinalDiagnosis->Sortable = TRUE; // Allow sort
		$this->FinalDiagnosis->DateFilter = "";
		$this->fields['FinalDiagnosis'] = &$this->FinalDiagnosis;

		// BP
		$this->BP = new ReportField('DischargeSummary', 'DischargeSummary', 'x_BP', 'BP', '`BP`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BP->Sortable = TRUE; // Allow sort
		$this->BP->DateFilter = "";
		$this->fields['BP'] = &$this->BP;

		// Pulse
		$this->Pulse = new ReportField('DischargeSummary', 'DischargeSummary', 'x_Pulse', 'Pulse', '`Pulse`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Pulse->Sortable = TRUE; // Allow sort
		$this->Pulse->DateFilter = "";
		$this->fields['Pulse'] = &$this->Pulse;

		// Resp
		$this->Resp = new ReportField('DischargeSummary', 'DischargeSummary', 'x_Resp', 'Resp', '`Resp`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Resp->Sortable = TRUE; // Allow sort
		$this->Resp->DateFilter = "";
		$this->fields['Resp'] = &$this->Resp;

		// SPO2
		$this->SPO2 = new ReportField('DischargeSummary', 'DischargeSummary', 'x_SPO2', 'SPO2', '`SPO2`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SPO2->Sortable = TRUE; // Allow sort
		$this->SPO2->DateFilter = "";
		$this->fields['SPO2'] = &$this->SPO2;

		// FollowupAdvice
		$this->FollowupAdvice = new ReportField('DischargeSummary', 'DischargeSummary', 'x_FollowupAdvice', 'FollowupAdvice', '`FollowupAdvice`', 201, -1, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->FollowupAdvice->Sortable = TRUE; // Allow sort
		$this->FollowupAdvice->DateFilter = "";
		$this->fields['FollowupAdvice'] = &$this->FollowupAdvice;

		// NextReviewDate
		$this->NextReviewDate = new ReportField('DischargeSummary', 'DischargeSummary', 'x_NextReviewDate', 'NextReviewDate', '`NextReviewDate`', 135, 0, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NextReviewDate->Sortable = TRUE; // Allow sort
		$this->NextReviewDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $ReportLanguage->phrase("IncorrectDate"));
		$this->NextReviewDate->DateFilter = "";
		$this->fields['NextReviewDate'] = &$this->NextReviewDate;

		// Medicine
		$this->Medicine = new ReportField('DischargeSummary', 'DischargeSummary', 'x_Medicine', 'Medicine', '`Medicine`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Medicine->Sortable = TRUE; // Allow sort
		$this->Medicine->DateFilter = "";
		$this->fields['Medicine'] = &$this->Medicine;

		// M
		$this->M = new ReportField('DischargeSummary', 'DischargeSummary', 'x_M', 'M', '`M`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->M->Sortable = TRUE; // Allow sort
		$this->M->DateFilter = "";
		$this->fields['M'] = &$this->M;

		// A
		$this->A = new ReportField('DischargeSummary', 'DischargeSummary', 'x_A', 'A', '`A`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->A->Sortable = TRUE; // Allow sort
		$this->A->DateFilter = "";
		$this->fields['A'] = &$this->A;

		// N
		$this->N = new ReportField('DischargeSummary', 'DischargeSummary', 'x_N', 'N', '`N`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->N->Sortable = TRUE; // Allow sort
		$this->N->DateFilter = "";
		$this->fields['N'] = &$this->N;

		// NoOfDays
		$this->NoOfDays = new ReportField('DischargeSummary', 'DischargeSummary', 'x_NoOfDays', 'NoOfDays', '`NoOfDays`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NoOfDays->Sortable = TRUE; // Allow sort
		$this->NoOfDays->DateFilter = "";
		$this->fields['NoOfDays'] = &$this->NoOfDays;

		// PreRoute
		$this->PreRoute = new ReportField('DischargeSummary', 'DischargeSummary', 'x_PreRoute', 'PreRoute', '`PreRoute`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PreRoute->Sortable = TRUE; // Allow sort
		$this->PreRoute->DateFilter = "";
		$this->fields['PreRoute'] = &$this->PreRoute;

		// TimeOfTaking
		$this->TimeOfTaking = new ReportField('DischargeSummary', 'DischargeSummary', 'x_TimeOfTaking', 'TimeOfTaking', '`TimeOfTaking`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TimeOfTaking->Sortable = TRUE; // Allow sort
		$this->TimeOfTaking->DateFilter = "";
		$this->fields['TimeOfTaking'] = &$this->TimeOfTaking;

		// History
		$this->History = new ReportField('DischargeSummary', 'DischargeSummary', 'x_History', 'History', '`History`', 201, -1, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->History->Sortable = TRUE; // Allow sort
		$this->History->DateFilter = "";
		$this->fields['History'] = &$this->History;

		// vitals
		$this->vitals = new ReportField('DischargeSummary', 'DischargeSummary', 'x_vitals', 'vitals', '`vitals`', 201, -1, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->vitals->Sortable = TRUE; // Allow sort
		$this->vitals->DateFilter = "";
		$this->fields['vitals'] = &$this->vitals;

		// PatientID
		$this->PatientID = new ReportField('DischargeSummary', 'DischargeSummary', 'x_PatientID', 'PatientID', '`PatientID`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientID->Sortable = TRUE; // Allow sort
		$this->PatientID->DateFilter = "";
		$this->fields['PatientID'] = &$this->PatientID;

		// HospID
		$this->HospID = new ReportField('DischargeSummary', 'DischargeSummary', 'x_HospID', 'HospID', '`HospID`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->DateFilter = "";
		$this->fields['HospID'] = &$this->HospID;
	}

	// Render for popup
	public function renderPopup()
	{
		global $ReportLanguage;
	}

	// Render for lookup
	public function renderLookup()
	{
		$this->patient_id->ViewValue = GetDropDownDisplayValue($this->patient_id->CurrentValue, "", 0);
	}

	// Get Field Visibility
	public function getFieldVisibility($fldparm)
	{
		global $Security;
		return $this->$fldparm->Visible; // Returns original value
	}

	// Single column sort
	protected function updateSort(&$fld)
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
			if ($fld->GroupingFieldId == 0)
				$this->setDetailOrderBy($sortField . " " . $thisSort); // Save to Session
		} else {
			if ($fld->GroupingFieldId == 0) $fld->setSort("");
		}
	}

	// Get Sort SQL
	protected function sortSql()
	{
		$dtlSortSql = $this->getDetailOrderBy(); // Get ORDER BY for detail fields from session
		$argrps = [];
		foreach ($this->fields as $fld) {
			if ($fld->getSort() <> "") {
				$fldsql = $fld->Expression;
				if ($fld->GroupingFieldId > 0) {
					if ($fld->GroupSql <> "")
						$argrps[$fld->GroupingFieldId] = str_replace("%s", $fldsql, $fld->GroupSql) . " " . $fld->getSort();
					else
						$argrps[$fld->GroupingFieldId] = $fldsql . " " . $fld->getSort();
				}
			}
		}
		$sortSql = "";
		foreach ($argrps as $grp) {
			if ($sortSql <> "") $sortSql .= ", ";
			$sortSql .= $grp;
		}
		if ($dtlSortSql <> "") {
			if ($sortSql <> "") $sortSql .= ", ";
			$sortSql .= $dtlSortSql;
		}
		return $sortSql;
	}

	// Table level SQL
	private $_sqlFrom = "";
	private $_sqlSelect = "";
	private $_sqlWhere = "";
	private $_sqlGroupBy = "";
	private $_sqlHaving = "";
	private $_sqlOrderBy = "";

	// From
	public function getSqlFrom()
	{
		return ($this->_sqlFrom <> "") ? $this->_sqlFrom : "`view_patient_discharge_summary`";
	}
	public function setSqlFrom($v)
	{
		$this->_sqlFrom = $v;
	}

	// Select
	public function getSqlSelect()
	{
		return ($this->_sqlSelect <> "") ? $this->_sqlSelect : "SELECT * FROM " . $this->getSqlFrom();
	}
	public function setSqlSelect($v)
	{
		$this->_sqlSelect = $v;
	}

	// Where
	public function getSqlWhere()
	{
		$where = ($this->_sqlWhere <> "") ? $this->_sqlWhere : "";
		$filter = "";
		AddFilter($where, $filter);
		return $where;
	}
	public function setSqlWhere($v)
	{
		$this->_sqlWhere = $v;
	}

	// Group By
	public function getSqlGroupBy()
	{
		return ($this->_sqlGroupBy <> "") ? $this->_sqlGroupBy : "";
	}
	public function setSqlGroupBy($v)
	{
		$this->_sqlGroupBy = $v;
	}

	// Having
	public function getSqlHaving()
	{
		return ($this->_sqlHaving <> "") ? $this->_sqlHaving : "";
	}
	public function setSqlHaving($v)
	{
		$this->_sqlHaving = $v;
	}

	// Order By
	public function getSqlOrderBy()
	{
		return ($this->_sqlOrderBy <> "") ? $this->_sqlOrderBy : "`patient_id` DESC, `mrnNo` DESC";
	}
	public function setSqlOrderBy($v)
	{
		$this->_sqlOrderBy = $v;
	}

	// Get SQL
	public function getSql($where, $orderBy = "")
	{
		return BuildReportSql($this->getSqlSelect(), $this->getSqlWhere(),
			$this->getSqlGroupBy(), $this->getSqlHaving(), $this->getSqlOrderBy(),
			$where, $orderBy);
	}

	// Table Level Group SQL
	private $_sqlFirstGroupField = "";
	private $_sqlSelectGroup = "";
	private $_sqlOrderByGroup = "";

	// First Group Field
	public function getSqlFirstGroupField()
	{
		return ($this->_sqlFirstGroupField <> "") ? $this->_sqlFirstGroupField : "`patient_id`";
	}
	public function setSqlFirstGroupField($v)
	{
		$this->_sqlFirstGroupField = $v;
	}

	// Select Group
	public function getSqlSelectGroup()
	{
		return ($this->_sqlSelectGroup <> "") ? $this->_sqlSelectGroup : "SELECT DISTINCT " . $this->getSqlFirstGroupField() . " FROM " . $this->getSqlFrom();
	}
	public function setSqlSelectGroup($v)
	{
		$this->_sqlSelectGroup = $v;
	}

	// Order By Group
	public function getSqlOrderByGroup()
	{
		return ($this->_sqlOrderByGroup <> "") ? $this->_sqlOrderByGroup : "`patient_id` DESC";
	}
	public function setSqlOrderByGroup($v)
	{
		$this->_sqlOrderByGroup = $v;
	}

	// Summary properties
	private $_sqlSelectAggregate = "";
	private $_sqlAggregatePrefix = "";
	private $_sqlAggregateSuffix = "";
	private $_sqlSelectCount = "";

	// Select Aggregate
	public function getSqlSelectAggregate()
	{
		return ($this->_sqlSelectAggregate <> "") ? $this->_sqlSelectAggregate : "SELECT * FROM " . $this->getSqlFrom();
	}
	public function setSqlSelectAggregate($v)
	{
		$this->_sqlSelectAggregate = $v;
	}

	// Aggregate Prefix
	public function getSqlAggregatePrefix()
	{
		return ($this->_sqlAggregatePrefix <> "") ? $this->_sqlAggregatePrefix : "";
	}
	public function setSqlAggregatePrefix($v)
	{
		$this->_sqlAggregatePrefix = $v;
	}

	// Aggregate Suffix
	public function getSqlAggregateSuffix()
	{
		return ($this->_sqlAggregateSuffix <> "") ? $this->_sqlAggregateSuffix : "";
	}
	public function setSqlAggregateSuffix($v)
	{
		$this->_sqlAggregateSuffix = $v;
	}

	// Select Count
	public function getSqlSelectCount()
	{
		return ($this->_sqlSelectCount <> "") ? $this->_sqlSelectCount : "SELECT COUNT(*) FROM " . $this->getSqlFrom();
	}
	public function setSqlSelectCount($v)
	{
		$this->_sqlSelectCount = $v;
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

	// Get recordset
	public function getRecordset($sql, $rowcnt = -1, $offset = -1)
	{
		$conn = &$this->getConnection();
		$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
		$rs = $conn->selectLimit($sql, $rowcnt, $offset);
		$conn->raiseErrorFn = '';
		return $rs;
	}

	// Sort URL
	public function sortUrl(&$fld)
	{
		global $DashboardReport;
		return "";
	}

	// Lookup data from table
	public function lookup()
	{
		global $Security, $RequestSecurity, $PROJECT_ID, $RELATED_PROJECT_ID;
		$projectId = $RELATED_PROJECT_ID;

		// Check token first
		$func = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
		$validRequest = FALSE;
		if (is_callable($func) && Post(TOKEN_NAME) !== NULL) {
			$validRequest = $func(Post(TOKEN_NAME), SessionTimeoutTime());
			if ($validRequest) {
				if (!isset($Security)) {
					if (session_status() !== PHP_SESSION_ACTIVE)
						session_start(); // Init session data
					$Security = new AdvancedSecurity();
					if ($Security->isLoggedIn()) $Security->TablePermission_Loading();
					$Security->loadCurrentUserLevel($projectId . $this->TableName);
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
			$Security->loadCurrentUserLevel($projectId . $this->TableName);
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

		// Create lookup object and output JSON
		$lookup = new ReportLookup($linkField, $this->TableVar, $distinct, $linkField, $displayFields, $parentFields, $childFields, $filterFields, $filterFieldVars, $autoFillSourceFields);
		foreach ($filterFields as $i => $filterField) { // Set up filter operators
			if (@$filterOperators[$i] <> "")
				$lookup->setFilterOperator($filterField, $filterOperators[$i]);
		}
		$lookup->LookupType = $lookupType; // Lookup type
		if (Post("keys") !== NULL) { // Selected records from modal
			$keys = Post("keys");
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
	// Page Selecting event
	function Page_Selecting(&$filter) {

		// Enter your code here
	}

	// Page Breaking event
	function Page_Breaking(&$break, &$content) {

		// Example:
		//$break = FALSE; // Skip page break, or
		//$content = "<div style=\"page-break-after:always;\">&nbsp;</div>"; // Modify page break content

	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here
	}

	// Cell Rendered event
	function Cell_Rendered(&$Field, $CurrentValue, &$ViewValue, &$ViewAttrs, &$CellAttrs, &$HrefValue, &$LinkAttrs) {

		//$ViewValue = "xxx";
		//$ViewAttrs["class"] = "xxx";

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

	// Load Filters event
	function Page_FilterLoad() {

		// Enter your code here
		// Example: Register/Unregister Custom Extended Filter
		//RegisterFilter($this-><Field>, 'StartsWithA', 'Starts With A', PROJECT_NAMESPACE . 'GetStartsWithAFilter'); // With function, or
		//RegisterFilter($this-><Field>, 'StartsWithA', 'Starts With A'); // No function, use Page_Filtering event
		//UnregisterFilter($this-><Field>, 'StartsWithA');

	}

	// Page Filter Validated event
	function Page_FilterValidated() {

		// Example:
		//$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value

	}

	// Page Filtering event
	function Page_Filtering(&$fld, &$filter, $typ, $opr = "", $val = "", $cond = "", $opr2 = "", $val2 = "") {

		// Note: ALWAYS CHECK THE FILTER TYPE ($typ)! Example:
		//if ($typ == "dropdown" && $fld->Name == "MyField") // Dropdown filter
		//	$filter = "..."; // Modify the filter
		//if ($typ == "extended" && $fld->Name == "MyField") // Extended filter
		//	$filter = "..."; // Modify the filter
		//if ($typ == "popup" && $fld->Name == "MyField") // Popup filter
		//	$filter = "..."; // Modify the filter
		//if ($typ == "custom" && $opr == "..." && $fld->Name == "MyField") // Custom filter, $opr is the custom filter ID
		//	$filter = "..."; // Modify the filter

	}

	// Email Sending event
	function Email_Sending(&$email, &$args) {

		//var_dump($email); var_dump($args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		// Enter your code here
	}
}
?>