<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for patient_vitals
 */
class patient_vitals extends DbTable
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
	public $mrnno;
	public $PatientName;
	public $PatID;
	public $MobileNumber;
	public $profilePic;
	public $HT;
	public $WT;
	public $SurfaceArea;
	public $BodyMassIndex;
	public $ClinicalFindings;
	public $ClinicalDiagnosis;
	public $AnticoagulantifAny;
	public $FoodAllergies;
	public $GenericAllergies;
	public $GroupAllergies;
	public $Temp;
	public $Pulse;
	public $BP;
	public $PR;
	public $CNS;
	public $RSA;
	public $CVS;
	public $PA;
	public $PS;
	public $PV;
	public $clinicaldetails;
	public $status;
	public $createdby;
	public $createddatetime;
	public $modifiedby;
	public $modifieddatetime;
	public $Age;
	public $Gender;
	public $PatientSearch;
	public $PatientId;
	public $Reception;
	public $HospID;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'patient_vitals';
		$this->TableName = 'patient_vitals';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`patient_vitals`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = TRUE; // Allow detail add
		$this->DetailEdit = TRUE; // Allow detail edit
		$this->DetailView = TRUE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = 0; // User ID Allow
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// id
		$this->id = new DbField('patient_vitals', 'patient_vitals', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// mrnno
		$this->mrnno = new DbField('patient_vitals', 'patient_vitals', 'x_mrnno', 'mrnno', '`mrnno`', '`mrnno`', 200, -1, FALSE, '`mrnno`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mrnno->IsForeignKey = TRUE; // Foreign key field
		$this->mrnno->Sortable = TRUE; // Allow sort
		$this->fields['mrnno'] = &$this->mrnno;

		// PatientName
		$this->PatientName = new DbField('patient_vitals', 'patient_vitals', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, -1, FALSE, '`PatientName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientName->Sortable = TRUE; // Allow sort
		$this->fields['PatientName'] = &$this->PatientName;

		// PatID
		$this->PatID = new DbField('patient_vitals', 'patient_vitals', 'x_PatID', 'PatID', '`PatID`', '`PatID`', 200, -1, FALSE, '`PatID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatID->Sortable = TRUE; // Allow sort
		$this->fields['PatID'] = &$this->PatID;

		// MobileNumber
		$this->MobileNumber = new DbField('patient_vitals', 'patient_vitals', 'x_MobileNumber', 'MobileNumber', '`MobileNumber`', '`MobileNumber`', 200, -1, FALSE, '`MobileNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MobileNumber->Sortable = TRUE; // Allow sort
		$this->fields['MobileNumber'] = &$this->MobileNumber;

		// profilePic
		$this->profilePic = new DbField('patient_vitals', 'patient_vitals', 'x_profilePic', 'profilePic', '`profilePic`', '`profilePic`', 201, -1, FALSE, '`profilePic`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->profilePic->Sortable = TRUE; // Allow sort
		$this->fields['profilePic'] = &$this->profilePic;

		// HT
		$this->HT = new DbField('patient_vitals', 'patient_vitals', 'x_HT', 'HT', '`HT`', '`HT`', 200, -1, FALSE, '`HT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HT->Sortable = TRUE; // Allow sort
		$this->fields['HT'] = &$this->HT;

		// WT
		$this->WT = new DbField('patient_vitals', 'patient_vitals', 'x_WT', 'WT', '`WT`', '`WT`', 200, -1, FALSE, '`WT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->WT->Sortable = TRUE; // Allow sort
		$this->fields['WT'] = &$this->WT;

		// SurfaceArea
		$this->SurfaceArea = new DbField('patient_vitals', 'patient_vitals', 'x_SurfaceArea', 'SurfaceArea', '`SurfaceArea`', '`SurfaceArea`', 200, -1, FALSE, '`SurfaceArea`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SurfaceArea->Sortable = TRUE; // Allow sort
		$this->fields['SurfaceArea'] = &$this->SurfaceArea;

		// BodyMassIndex
		$this->BodyMassIndex = new DbField('patient_vitals', 'patient_vitals', 'x_BodyMassIndex', 'BodyMassIndex', '`BodyMassIndex`', '`BodyMassIndex`', 200, -1, FALSE, '`BodyMassIndex`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BodyMassIndex->Sortable = TRUE; // Allow sort
		$this->fields['BodyMassIndex'] = &$this->BodyMassIndex;

		// ClinicalFindings
		$this->ClinicalFindings = new DbField('patient_vitals', 'patient_vitals', 'x_ClinicalFindings', 'ClinicalFindings', '`ClinicalFindings`', '`ClinicalFindings`', 201, -1, FALSE, '`ClinicalFindings`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->ClinicalFindings->Sortable = TRUE; // Allow sort
		$this->fields['ClinicalFindings'] = &$this->ClinicalFindings;

		// ClinicalDiagnosis
		$this->ClinicalDiagnosis = new DbField('patient_vitals', 'patient_vitals', 'x_ClinicalDiagnosis', 'ClinicalDiagnosis', '`ClinicalDiagnosis`', '`ClinicalDiagnosis`', 201, -1, FALSE, '`ClinicalDiagnosis`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->ClinicalDiagnosis->Sortable = TRUE; // Allow sort
		$this->fields['ClinicalDiagnosis'] = &$this->ClinicalDiagnosis;

		// AnticoagulantifAny
		$this->AnticoagulantifAny = new DbField('patient_vitals', 'patient_vitals', 'x_AnticoagulantifAny', 'AnticoagulantifAny', '`AnticoagulantifAny`', '`AnticoagulantifAny`', 200, -1, FALSE, '`AnticoagulantifAny`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AnticoagulantifAny->Sortable = TRUE; // Allow sort
		$this->AnticoagulantifAny->Lookup = new Lookup('AnticoagulantifAny', 'pres_categoryallergy', FALSE, 'Genericname', ["Genericname","","",""], [], [], [], [], [], [], '', '');
		$this->fields['AnticoagulantifAny'] = &$this->AnticoagulantifAny;

		// FoodAllergies
		$this->FoodAllergies = new DbField('patient_vitals', 'patient_vitals', 'x_FoodAllergies', 'FoodAllergies', '`FoodAllergies`', '`FoodAllergies`', 200, -1, FALSE, '`FoodAllergies`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FoodAllergies->Sortable = TRUE; // Allow sort
		$this->fields['FoodAllergies'] = &$this->FoodAllergies;

		// GenericAllergies
		$this->GenericAllergies = new DbField('patient_vitals', 'patient_vitals', 'x_GenericAllergies', 'GenericAllergies', '`GenericAllergies`', '`GenericAllergies`', 200, -1, FALSE, '`GenericAllergies`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->GenericAllergies->Sortable = TRUE; // Allow sort
		$this->GenericAllergies->SelectMultiple = TRUE; // Multiple select
		$this->GenericAllergies->Lookup = new Lookup('GenericAllergies', 'pres_categoryallergy', FALSE, 'Genericname', ["Genericname","","",""], [], [], [], [], [], [], '', '');
		$this->fields['GenericAllergies'] = &$this->GenericAllergies;

		// GroupAllergies
		$this->GroupAllergies = new DbField('patient_vitals', 'patient_vitals', 'x_GroupAllergies', 'GroupAllergies', '`GroupAllergies`', '`GroupAllergies`', 200, -1, FALSE, '`EV__GroupAllergies`', TRUE, TRUE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->GroupAllergies->Sortable = TRUE; // Allow sort
		$this->GroupAllergies->SelectMultiple = TRUE; // Multiple select
		$this->GroupAllergies->Lookup = new Lookup('GroupAllergies', 'pres_categoryallergy', FALSE, 'CategoryDrug', ["CategoryDrug","","",""], [], [], [], [], [], [], '', '');
		$this->fields['GroupAllergies'] = &$this->GroupAllergies;

		// Temp
		$this->Temp = new DbField('patient_vitals', 'patient_vitals', 'x_Temp', 'Temp', '`Temp`', '`Temp`', 200, -1, FALSE, '`Temp`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Temp->Sortable = TRUE; // Allow sort
		$this->fields['Temp'] = &$this->Temp;

		// Pulse
		$this->Pulse = new DbField('patient_vitals', 'patient_vitals', 'x_Pulse', 'Pulse', '`Pulse`', '`Pulse`', 200, -1, FALSE, '`Pulse`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Pulse->Sortable = TRUE; // Allow sort
		$this->fields['Pulse'] = &$this->Pulse;

		// BP
		$this->BP = new DbField('patient_vitals', 'patient_vitals', 'x_BP', 'BP', '`BP`', '`BP`', 200, -1, FALSE, '`BP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BP->Sortable = TRUE; // Allow sort
		$this->fields['BP'] = &$this->BP;

		// PR
		$this->PR = new DbField('patient_vitals', 'patient_vitals', 'x_PR', 'PR', '`PR`', '`PR`', 200, -1, FALSE, '`PR`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PR->Sortable = TRUE; // Allow sort
		$this->fields['PR'] = &$this->PR;

		// CNS
		$this->CNS = new DbField('patient_vitals', 'patient_vitals', 'x_CNS', 'CNS', '`CNS`', '`CNS`', 200, -1, FALSE, '`CNS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CNS->Sortable = TRUE; // Allow sort
		$this->fields['CNS'] = &$this->CNS;

		// RSA
		$this->RSA = new DbField('patient_vitals', 'patient_vitals', 'x_RSA', 'RSA', '`RSA`', '`RSA`', 200, -1, FALSE, '`RSA`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RSA->Sortable = TRUE; // Allow sort
		$this->fields['RSA'] = &$this->RSA;

		// CVS
		$this->CVS = new DbField('patient_vitals', 'patient_vitals', 'x_CVS', 'CVS', '`CVS`', '`CVS`', 200, -1, FALSE, '`CVS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CVS->Sortable = TRUE; // Allow sort
		$this->fields['CVS'] = &$this->CVS;

		// PA
		$this->PA = new DbField('patient_vitals', 'patient_vitals', 'x_PA', 'PA', '`PA`', '`PA`', 200, -1, FALSE, '`PA`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PA->Sortable = TRUE; // Allow sort
		$this->fields['PA'] = &$this->PA;

		// PS
		$this->PS = new DbField('patient_vitals', 'patient_vitals', 'x_PS', 'PS', '`PS`', '`PS`', 200, -1, FALSE, '`PS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PS->Sortable = TRUE; // Allow sort
		$this->fields['PS'] = &$this->PS;

		// PV
		$this->PV = new DbField('patient_vitals', 'patient_vitals', 'x_PV', 'PV', '`PV`', '`PV`', 200, -1, FALSE, '`PV`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PV->Sortable = TRUE; // Allow sort
		$this->fields['PV'] = &$this->PV;

		// clinicaldetails
		$this->clinicaldetails = new DbField('patient_vitals', 'patient_vitals', 'x_clinicaldetails', 'clinicaldetails', '`clinicaldetails`', '`clinicaldetails`', 200, -1, FALSE, '`clinicaldetails`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->clinicaldetails->Sortable = TRUE; // Allow sort
		$this->clinicaldetails->Lookup = new Lookup('clinicaldetails', 'mas_clinicaldetails', FALSE, 'ClinicalDetails', ["ClinicalDetails","","",""], [], [], [], [], [], [], '', '');
		$this->fields['clinicaldetails'] = &$this->clinicaldetails;

		// status
		$this->status = new DbField('patient_vitals', 'patient_vitals', 'x_status', 'status', '`status`', '`status`', 3, -1, FALSE, '`status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->status->Sortable = TRUE; // Allow sort
		$this->status->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->status->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->status->Lookup = new Lookup('status', 'sys_status', FALSE, 'id', ["Name","","",""], [], [], [], [], [], [], '', '');
		$this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['status'] = &$this->status;

		// createdby
		$this->createdby = new DbField('patient_vitals', 'patient_vitals', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 200, -1, FALSE, '`createdby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdby->Sortable = TRUE; // Allow sort
		$this->fields['createdby'] = &$this->createdby;

		// createddatetime
		$this->createddatetime = new DbField('patient_vitals', 'patient_vitals', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike('`createddatetime`', 0, "DB"), 135, 0, FALSE, '`createddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = TRUE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['createddatetime'] = &$this->createddatetime;

		// modifiedby
		$this->modifiedby = new DbField('patient_vitals', 'patient_vitals', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 200, -1, FALSE, '`modifiedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifiedby->Sortable = TRUE; // Allow sort
		$this->fields['modifiedby'] = &$this->modifiedby;

		// modifieddatetime
		$this->modifieddatetime = new DbField('patient_vitals', 'patient_vitals', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike('`modifieddatetime`', 0, "DB"), 135, 0, FALSE, '`modifieddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifieddatetime->Sortable = TRUE; // Allow sort
		$this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['modifieddatetime'] = &$this->modifieddatetime;

		// Age
		$this->Age = new DbField('patient_vitals', 'patient_vitals', 'x_Age', 'Age', '`Age`', '`Age`', 200, -1, FALSE, '`Age`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Age->Sortable = TRUE; // Allow sort
		$this->fields['Age'] = &$this->Age;

		// Gender
		$this->Gender = new DbField('patient_vitals', 'patient_vitals', 'x_Gender', 'Gender', '`Gender`', '`Gender`', 200, -1, FALSE, '`Gender`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Gender->Sortable = TRUE; // Allow sort
		$this->fields['Gender'] = &$this->Gender;

		// PatientSearch
		$this->PatientSearch = new DbField('patient_vitals', 'patient_vitals', 'x_PatientSearch', 'PatientSearch', '\'\'', '\'\'', 201, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->PatientSearch->IsCustom = TRUE; // Custom field
		$this->PatientSearch->Sortable = TRUE; // Allow sort
		$this->PatientSearch->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->PatientSearch->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->PatientSearch->Lookup = new Lookup('PatientSearch', 'ip_admission', FALSE, 'id', ["PatientID","patient_name","mobileno","mrnNo"], [], [], [], [], [], [], '`id` DESC', '');
		$this->fields['PatientSearch'] = &$this->PatientSearch;

		// PatientId
		$this->PatientId = new DbField('patient_vitals', 'patient_vitals', 'x_PatientId', 'PatientId', '`PatientId`', '`PatientId`', 3, -1, FALSE, '`PatientId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientId->IsForeignKey = TRUE; // Foreign key field
		$this->PatientId->Sortable = TRUE; // Allow sort
		$this->fields['PatientId'] = &$this->PatientId;

		// Reception
		$this->Reception = new DbField('patient_vitals', 'patient_vitals', 'x_Reception', 'Reception', '`Reception`', '`Reception`', 3, -1, FALSE, '`Reception`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Reception->IsForeignKey = TRUE; // Foreign key field
		$this->Reception->Sortable = TRUE; // Allow sort
		$this->Reception->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Reception'] = &$this->Reception;

		// HospID
		$this->HospID = new DbField('patient_vitals', 'patient_vitals', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
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
			if ($this->PatientId->getSessionValue() <> "")
				$masterFilter .= " AND `patient_id`=" . QuotedValue($this->PatientId->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->mrnno->getSessionValue() <> "")
				$masterFilter .= " AND `mrnNo`=" . QuotedValue($this->mrnno->getSessionValue(), DATATYPE_STRING, "DB");
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
			if ($this->PatientId->getSessionValue() <> "")
				$detailFilter .= " AND `PatientId`=" . QuotedValue($this->PatientId->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->mrnno->getSessionValue() <> "")
				$detailFilter .= " AND `mrnno`=" . QuotedValue($this->mrnno->getSessionValue(), DATATYPE_STRING, "DB");
			else
				return "";
		}
		return $detailFilter;
	}

	// Master filter
	public function sqlMasterFilter_ip_admission()
	{
		return "`id`=@id@ AND `patient_id`=@patient_id@ AND `mrnNo`='@mrnNo@'";
	}

	// Detail filter
	public function sqlDetailFilter_ip_admission()
	{
		return "`Reception`=@Reception@ AND `PatientId`=@PatientId@ AND `mrnno`='@mrnno@'";
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`patient_vitals`";
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
	public function getSqlSelectList() // Select for List page
	{
		$select = "";
		$select = "SELECT * FROM (" .
			"SELECT *, '' AS `PatientSearch`, (SELECT `CategoryDrug` FROM `pres_categoryallergy` `TMP_LOOKUPTABLE` WHERE `TMP_LOOKUPTABLE`.`CategoryDrug` = `patient_vitals`.`GroupAllergies` LIMIT 1) AS `EV__GroupAllergies` FROM `patient_vitals`" .
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
		if ($this->BasicSearch->getKeyword() <> "")
			return TRUE;
		if ($this->GroupAllergies->AdvancedSearch->SearchValue <> "" ||
			$this->GroupAllergies->AdvancedSearch->SearchValue2 <> "" ||
			ContainsString($where, " " . $this->GroupAllergies->VirtualExpression . " "))
			return TRUE;
		if (ContainsString($orderBy, " " . $this->GroupAllergies->VirtualExpression . " "))
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
		$this->mrnno->DbValue = $row['mrnno'];
		$this->PatientName->DbValue = $row['PatientName'];
		$this->PatID->DbValue = $row['PatID'];
		$this->MobileNumber->DbValue = $row['MobileNumber'];
		$this->profilePic->DbValue = $row['profilePic'];
		$this->HT->DbValue = $row['HT'];
		$this->WT->DbValue = $row['WT'];
		$this->SurfaceArea->DbValue = $row['SurfaceArea'];
		$this->BodyMassIndex->DbValue = $row['BodyMassIndex'];
		$this->ClinicalFindings->DbValue = $row['ClinicalFindings'];
		$this->ClinicalDiagnosis->DbValue = $row['ClinicalDiagnosis'];
		$this->AnticoagulantifAny->DbValue = $row['AnticoagulantifAny'];
		$this->FoodAllergies->DbValue = $row['FoodAllergies'];
		$this->GenericAllergies->DbValue = $row['GenericAllergies'];
		$this->GroupAllergies->DbValue = $row['GroupAllergies'];
		$this->Temp->DbValue = $row['Temp'];
		$this->Pulse->DbValue = $row['Pulse'];
		$this->BP->DbValue = $row['BP'];
		$this->PR->DbValue = $row['PR'];
		$this->CNS->DbValue = $row['CNS'];
		$this->RSA->DbValue = $row['RSA'];
		$this->CVS->DbValue = $row['CVS'];
		$this->PA->DbValue = $row['PA'];
		$this->PS->DbValue = $row['PS'];
		$this->PV->DbValue = $row['PV'];
		$this->clinicaldetails->DbValue = $row['clinicaldetails'];
		$this->status->DbValue = $row['status'];
		$this->createdby->DbValue = $row['createdby'];
		$this->createddatetime->DbValue = $row['createddatetime'];
		$this->modifiedby->DbValue = $row['modifiedby'];
		$this->modifieddatetime->DbValue = $row['modifieddatetime'];
		$this->Age->DbValue = $row['Age'];
		$this->Gender->DbValue = $row['Gender'];
		$this->PatientSearch->DbValue = $row['PatientSearch'];
		$this->PatientId->DbValue = $row['PatientId'];
		$this->Reception->DbValue = $row['Reception'];
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
			return "patient_vitalslist.php";
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
		if ($pageName == "patient_vitalsview.php")
			return $Language->phrase("View");
		elseif ($pageName == "patient_vitalsedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "patient_vitalsadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "patient_vitalslist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("patient_vitalsview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("patient_vitalsview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "patient_vitalsadd.php?" . $this->getUrlParm($parm);
		else
			$url = "patient_vitalsadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("patient_vitalsedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("patient_vitalsadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("patient_vitalsdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		if ($this->getCurrentMasterTable() == "ip_admission" && !ContainsString($url, TABLE_SHOW_MASTER . "=")) {
			$url .= (ContainsString($url, "?") ? "&" : "?") . TABLE_SHOW_MASTER . "=" . $this->getCurrentMasterTable();
			$url .= "&fk_id=" . urlencode($this->Reception->CurrentValue);
			$url .= "&fk_patient_id=" . urlencode($this->PatientId->CurrentValue);
			$url .= "&fk_mrnNo=" . urlencode($this->mrnno->CurrentValue);
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
		$this->mrnno->setDbValue($rs->fields('mrnno'));
		$this->PatientName->setDbValue($rs->fields('PatientName'));
		$this->PatID->setDbValue($rs->fields('PatID'));
		$this->MobileNumber->setDbValue($rs->fields('MobileNumber'));
		$this->profilePic->setDbValue($rs->fields('profilePic'));
		$this->HT->setDbValue($rs->fields('HT'));
		$this->WT->setDbValue($rs->fields('WT'));
		$this->SurfaceArea->setDbValue($rs->fields('SurfaceArea'));
		$this->BodyMassIndex->setDbValue($rs->fields('BodyMassIndex'));
		$this->ClinicalFindings->setDbValue($rs->fields('ClinicalFindings'));
		$this->ClinicalDiagnosis->setDbValue($rs->fields('ClinicalDiagnosis'));
		$this->AnticoagulantifAny->setDbValue($rs->fields('AnticoagulantifAny'));
		$this->FoodAllergies->setDbValue($rs->fields('FoodAllergies'));
		$this->GenericAllergies->setDbValue($rs->fields('GenericAllergies'));
		$this->GroupAllergies->setDbValue($rs->fields('GroupAllergies'));
		$this->Temp->setDbValue($rs->fields('Temp'));
		$this->Pulse->setDbValue($rs->fields('Pulse'));
		$this->BP->setDbValue($rs->fields('BP'));
		$this->PR->setDbValue($rs->fields('PR'));
		$this->CNS->setDbValue($rs->fields('CNS'));
		$this->RSA->setDbValue($rs->fields('RSA'));
		$this->CVS->setDbValue($rs->fields('CVS'));
		$this->PA->setDbValue($rs->fields('PA'));
		$this->PS->setDbValue($rs->fields('PS'));
		$this->PV->setDbValue($rs->fields('PV'));
		$this->clinicaldetails->setDbValue($rs->fields('clinicaldetails'));
		$this->status->setDbValue($rs->fields('status'));
		$this->createdby->setDbValue($rs->fields('createdby'));
		$this->createddatetime->setDbValue($rs->fields('createddatetime'));
		$this->modifiedby->setDbValue($rs->fields('modifiedby'));
		$this->modifieddatetime->setDbValue($rs->fields('modifieddatetime'));
		$this->Age->setDbValue($rs->fields('Age'));
		$this->Gender->setDbValue($rs->fields('Gender'));
		$this->PatientSearch->setDbValue($rs->fields('PatientSearch'));
		$this->PatientId->setDbValue($rs->fields('PatientId'));
		$this->Reception->setDbValue($rs->fields('Reception'));
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
		// mrnno
		// PatientName
		// PatID
		// MobileNumber
		// profilePic
		// HT
		// WT
		// SurfaceArea
		// BodyMassIndex
		// ClinicalFindings
		// ClinicalDiagnosis
		// AnticoagulantifAny
		// FoodAllergies
		// GenericAllergies
		// GroupAllergies
		// Temp
		// Pulse
		// BP
		// PR
		// CNS
		// RSA
		// CVS
		// PA
		// PS
		// PV
		// clinicaldetails
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// Age
		// Gender
		// PatientSearch
		// PatientId
		// Reception
		// HospID
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// mrnno
		$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
		$this->mrnno->ViewCustomAttributes = "";

		// PatientName
		$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
		$this->PatientName->ViewCustomAttributes = "";

		// PatID
		$this->PatID->ViewValue = $this->PatID->CurrentValue;
		$this->PatID->ViewCustomAttributes = "";

		// MobileNumber
		$this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
		$this->MobileNumber->ViewCustomAttributes = "";

		// profilePic
		$this->profilePic->ViewValue = $this->profilePic->CurrentValue;
		$this->profilePic->CssClass = "font-weight-bold";
		$this->profilePic->ViewCustomAttributes = "";

		// HT
		$this->HT->ViewValue = $this->HT->CurrentValue;
		$this->HT->ViewCustomAttributes = "";

		// WT
		$this->WT->ViewValue = $this->WT->CurrentValue;
		$this->WT->ViewCustomAttributes = "";

		// SurfaceArea
		$this->SurfaceArea->ViewValue = $this->SurfaceArea->CurrentValue;
		$this->SurfaceArea->ViewCustomAttributes = "";

		// BodyMassIndex
		$this->BodyMassIndex->ViewValue = $this->BodyMassIndex->CurrentValue;
		$this->BodyMassIndex->ViewCustomAttributes = "";

		// ClinicalFindings
		$this->ClinicalFindings->ViewValue = $this->ClinicalFindings->CurrentValue;
		$this->ClinicalFindings->ViewCustomAttributes = "";

		// ClinicalDiagnosis
		$this->ClinicalDiagnosis->ViewValue = $this->ClinicalDiagnosis->CurrentValue;
		$this->ClinicalDiagnosis->ViewCustomAttributes = "";

		// AnticoagulantifAny
		$this->AnticoagulantifAny->ViewValue = $this->AnticoagulantifAny->CurrentValue;
		$curVal = strval($this->AnticoagulantifAny->CurrentValue);
		if ($curVal <> "") {
			$this->AnticoagulantifAny->ViewValue = $this->AnticoagulantifAny->lookupCacheOption($curVal);
			if ($this->AnticoagulantifAny->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Genericname`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->AnticoagulantifAny->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->AnticoagulantifAny->ViewValue = $this->AnticoagulantifAny->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->AnticoagulantifAny->ViewValue = $this->AnticoagulantifAny->CurrentValue;
				}
			}
		} else {
			$this->AnticoagulantifAny->ViewValue = NULL;
		}
		$this->AnticoagulantifAny->ViewCustomAttributes = "";

		// FoodAllergies
		$this->FoodAllergies->ViewValue = $this->FoodAllergies->CurrentValue;
		$this->FoodAllergies->ViewCustomAttributes = "";

		// GenericAllergies
		$curVal = strval($this->GenericAllergies->CurrentValue);
		if ($curVal <> "") {
			$this->GenericAllergies->ViewValue = $this->GenericAllergies->lookupCacheOption($curVal);
			if ($this->GenericAllergies->ViewValue === NULL) { // Lookup from database
				$arwrk = explode(",", $curVal);
				$filterWrk = "";
				foreach ($arwrk as $wrk) {
					if ($filterWrk <> "")
						$filterWrk .= " OR ";
					$filterWrk .= "`Genericname`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
				}
				$sqlWrk = $this->GenericAllergies->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$this->GenericAllergies->ViewValue = new OptionValues();
					$ari = 0;
					while (!$rswrk->EOF) {
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->GenericAllergies->ViewValue->add($this->GenericAllergies->displayValue($arwrk));
						$rswrk->MoveNext();
						$ari++;
					}
					$rswrk->Close();
				} else {
					$this->GenericAllergies->ViewValue = $this->GenericAllergies->CurrentValue;
				}
			}
		} else {
			$this->GenericAllergies->ViewValue = NULL;
		}
		$this->GenericAllergies->ViewCustomAttributes = "";

		// GroupAllergies
		if ($this->GroupAllergies->VirtualValue <> "") {
			$this->GroupAllergies->ViewValue = $this->GroupAllergies->VirtualValue;
		} else {
		$curVal = strval($this->GroupAllergies->CurrentValue);
		if ($curVal <> "") {
			$this->GroupAllergies->ViewValue = $this->GroupAllergies->lookupCacheOption($curVal);
			if ($this->GroupAllergies->ViewValue === NULL) { // Lookup from database
				$arwrk = explode(",", $curVal);
				$filterWrk = "";
				foreach ($arwrk as $wrk) {
					if ($filterWrk <> "")
						$filterWrk .= " OR ";
					$filterWrk .= "`CategoryDrug`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
				}
				$sqlWrk = $this->GroupAllergies->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$this->GroupAllergies->ViewValue = new OptionValues();
					$ari = 0;
					while (!$rswrk->EOF) {
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->GroupAllergies->ViewValue->add($this->GroupAllergies->displayValue($arwrk));
						$rswrk->MoveNext();
						$ari++;
					}
					$rswrk->Close();
				} else {
					$this->GroupAllergies->ViewValue = $this->GroupAllergies->CurrentValue;
				}
			}
		} else {
			$this->GroupAllergies->ViewValue = NULL;
		}
		}
		$this->GroupAllergies->ViewCustomAttributes = "";

		// Temp
		$this->Temp->ViewValue = $this->Temp->CurrentValue;
		$this->Temp->ViewCustomAttributes = "";

		// Pulse
		$this->Pulse->ViewValue = $this->Pulse->CurrentValue;
		$this->Pulse->ViewCustomAttributes = "";

		// BP
		$this->BP->ViewValue = $this->BP->CurrentValue;
		$this->BP->ViewCustomAttributes = "";

		// PR
		$this->PR->ViewValue = $this->PR->CurrentValue;
		$this->PR->ViewCustomAttributes = "";

		// CNS
		$this->CNS->ViewValue = $this->CNS->CurrentValue;
		$this->CNS->ViewCustomAttributes = "";

		// RSA
		$this->RSA->ViewValue = $this->RSA->CurrentValue;
		$this->RSA->ViewCustomAttributes = "";

		// CVS
		$this->CVS->ViewValue = $this->CVS->CurrentValue;
		$this->CVS->ViewCustomAttributes = "";

		// PA
		$this->PA->ViewValue = $this->PA->CurrentValue;
		$this->PA->ViewCustomAttributes = "";

		// PS
		$this->PS->ViewValue = $this->PS->CurrentValue;
		$this->PS->ViewCustomAttributes = "";

		// PV
		$this->PV->ViewValue = $this->PV->CurrentValue;
		$this->PV->ViewCustomAttributes = "";

		// clinicaldetails
		$curVal = strval($this->clinicaldetails->CurrentValue);
		if ($curVal <> "") {
			$this->clinicaldetails->ViewValue = $this->clinicaldetails->lookupCacheOption($curVal);
			if ($this->clinicaldetails->ViewValue === NULL) { // Lookup from database
				$arwrk = explode(",", $curVal);
				$filterWrk = "";
				foreach ($arwrk as $wrk) {
					if ($filterWrk <> "")
						$filterWrk .= " OR ";
					$filterWrk .= "`ClinicalDetails`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
				}
				$sqlWrk = $this->clinicaldetails->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$this->clinicaldetails->ViewValue = new OptionValues();
					$ari = 0;
					while (!$rswrk->EOF) {
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->clinicaldetails->ViewValue->add($this->clinicaldetails->displayValue($arwrk));
						$rswrk->MoveNext();
						$ari++;
					}
					$rswrk->Close();
				} else {
					$this->clinicaldetails->ViewValue = $this->clinicaldetails->CurrentValue;
				}
			}
		} else {
			$this->clinicaldetails->ViewValue = NULL;
		}
		$this->clinicaldetails->ViewCustomAttributes = "";

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
		$this->createdby->ViewCustomAttributes = "";

		// createddatetime
		$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
		$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
		$this->createddatetime->ViewCustomAttributes = "";

		// modifiedby
		$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
		$this->modifiedby->ViewCustomAttributes = "";

		// modifieddatetime
		$this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
		$this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
		$this->modifieddatetime->ViewCustomAttributes = "";

		// Age
		$this->Age->ViewValue = $this->Age->CurrentValue;
		$this->Age->ViewCustomAttributes = "";

		// Gender
		$this->Gender->ViewValue = $this->Gender->CurrentValue;
		$this->Gender->ViewCustomAttributes = "";

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

		// PatientId
		$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
		$this->PatientId->ViewCustomAttributes = "";

		// Reception
		$this->Reception->ViewValue = $this->Reception->CurrentValue;
		$this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
		$this->Reception->ViewCustomAttributes = "";

		// HospID
		$this->HospID->ViewValue = $this->HospID->CurrentValue;
		$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
		$this->HospID->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// mrnno
		$this->mrnno->LinkCustomAttributes = "";
		$this->mrnno->HrefValue = "";
		$this->mrnno->TooltipValue = "";

		// PatientName
		$this->PatientName->LinkCustomAttributes = "";
		$this->PatientName->HrefValue = "";
		$this->PatientName->TooltipValue = "";

		// PatID
		$this->PatID->LinkCustomAttributes = "";
		$this->PatID->HrefValue = "";
		$this->PatID->TooltipValue = "";

		// MobileNumber
		$this->MobileNumber->LinkCustomAttributes = "";
		$this->MobileNumber->HrefValue = "";
		$this->MobileNumber->TooltipValue = "";

		// profilePic
		$this->profilePic->LinkCustomAttributes = "";
		$this->profilePic->HrefValue = "";
		$this->profilePic->TooltipValue = "";

		// HT
		$this->HT->LinkCustomAttributes = "";
		$this->HT->HrefValue = "";
		$this->HT->TooltipValue = "";

		// WT
		$this->WT->LinkCustomAttributes = "";
		$this->WT->HrefValue = "";
		$this->WT->TooltipValue = "";

		// SurfaceArea
		$this->SurfaceArea->LinkCustomAttributes = "";
		$this->SurfaceArea->HrefValue = "";
		$this->SurfaceArea->TooltipValue = "";

		// BodyMassIndex
		$this->BodyMassIndex->LinkCustomAttributes = "";
		$this->BodyMassIndex->HrefValue = "";
		$this->BodyMassIndex->TooltipValue = "";

		// ClinicalFindings
		$this->ClinicalFindings->LinkCustomAttributes = "";
		$this->ClinicalFindings->HrefValue = "";
		$this->ClinicalFindings->TooltipValue = "";

		// ClinicalDiagnosis
		$this->ClinicalDiagnosis->LinkCustomAttributes = "";
		$this->ClinicalDiagnosis->HrefValue = "";
		$this->ClinicalDiagnosis->TooltipValue = "";

		// AnticoagulantifAny
		$this->AnticoagulantifAny->LinkCustomAttributes = "";
		$this->AnticoagulantifAny->HrefValue = "";
		$this->AnticoagulantifAny->TooltipValue = "";

		// FoodAllergies
		$this->FoodAllergies->LinkCustomAttributes = "";
		$this->FoodAllergies->HrefValue = "";
		$this->FoodAllergies->TooltipValue = "";

		// GenericAllergies
		$this->GenericAllergies->LinkCustomAttributes = "";
		$this->GenericAllergies->HrefValue = "";
		$this->GenericAllergies->TooltipValue = "";

		// GroupAllergies
		$this->GroupAllergies->LinkCustomAttributes = "";
		$this->GroupAllergies->HrefValue = "";
		$this->GroupAllergies->TooltipValue = "";

		// Temp
		$this->Temp->LinkCustomAttributes = "";
		$this->Temp->HrefValue = "";
		$this->Temp->TooltipValue = "";

		// Pulse
		$this->Pulse->LinkCustomAttributes = "";
		$this->Pulse->HrefValue = "";
		$this->Pulse->TooltipValue = "";

		// BP
		$this->BP->LinkCustomAttributes = "";
		$this->BP->HrefValue = "";
		$this->BP->TooltipValue = "";

		// PR
		$this->PR->LinkCustomAttributes = "";
		$this->PR->HrefValue = "";
		$this->PR->TooltipValue = "";

		// CNS
		$this->CNS->LinkCustomAttributes = "";
		$this->CNS->HrefValue = "";
		$this->CNS->TooltipValue = "";

		// RSA
		$this->RSA->LinkCustomAttributes = "";
		$this->RSA->HrefValue = "";
		$this->RSA->TooltipValue = "";

		// CVS
		$this->CVS->LinkCustomAttributes = "";
		$this->CVS->HrefValue = "";
		$this->CVS->TooltipValue = "";

		// PA
		$this->PA->LinkCustomAttributes = "";
		$this->PA->HrefValue = "";
		$this->PA->TooltipValue = "";

		// PS
		$this->PS->LinkCustomAttributes = "";
		$this->PS->HrefValue = "";
		$this->PS->TooltipValue = "";

		// PV
		$this->PV->LinkCustomAttributes = "";
		$this->PV->HrefValue = "";
		$this->PV->TooltipValue = "";

		// clinicaldetails
		$this->clinicaldetails->LinkCustomAttributes = "";
		$this->clinicaldetails->HrefValue = "";
		$this->clinicaldetails->TooltipValue = "";

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

		// Age
		$this->Age->LinkCustomAttributes = "";
		$this->Age->HrefValue = "";
		$this->Age->TooltipValue = "";

		// Gender
		$this->Gender->LinkCustomAttributes = "";
		$this->Gender->HrefValue = "";
		$this->Gender->TooltipValue = "";

		// PatientSearch
		$this->PatientSearch->LinkCustomAttributes = "";
		$this->PatientSearch->HrefValue = "";
		$this->PatientSearch->TooltipValue = "";

		// PatientId
		$this->PatientId->LinkCustomAttributes = "";
		$this->PatientId->HrefValue = "";
		$this->PatientId->TooltipValue = "";

		// Reception
		$this->Reception->LinkCustomAttributes = "";
		$this->Reception->HrefValue = "";
		$this->Reception->TooltipValue = "";

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

		// mrnno
		$this->mrnno->EditAttrs["class"] = "form-control";
		$this->mrnno->EditCustomAttributes = "";
		$this->mrnno->EditValue = $this->mrnno->CurrentValue;
		$this->mrnno->ViewCustomAttributes = "";

		// PatientName
		$this->PatientName->EditAttrs["class"] = "form-control";
		$this->PatientName->EditCustomAttributes = "";
		$this->PatientName->EditValue = $this->PatientName->CurrentValue;
		$this->PatientName->ViewCustomAttributes = "";

		// PatID
		$this->PatID->EditAttrs["class"] = "form-control";
		$this->PatID->EditCustomAttributes = "";
		$this->PatID->EditValue = $this->PatID->CurrentValue;
		$this->PatID->ViewCustomAttributes = "";

		// MobileNumber
		$this->MobileNumber->EditAttrs["class"] = "form-control";
		$this->MobileNumber->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
		$this->MobileNumber->EditValue = $this->MobileNumber->CurrentValue;
		$this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

		// profilePic
		$this->profilePic->EditAttrs["class"] = "form-control";
		$this->profilePic->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->profilePic->CurrentValue = HtmlDecode($this->profilePic->CurrentValue);
		$this->profilePic->EditValue = $this->profilePic->CurrentValue;
		$this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

		// HT
		$this->HT->EditAttrs["class"] = "form-control";
		$this->HT->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->HT->CurrentValue = HtmlDecode($this->HT->CurrentValue);
		$this->HT->EditValue = $this->HT->CurrentValue;
		$this->HT->PlaceHolder = RemoveHtml($this->HT->caption());

		// WT
		$this->WT->EditAttrs["class"] = "form-control";
		$this->WT->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->WT->CurrentValue = HtmlDecode($this->WT->CurrentValue);
		$this->WT->EditValue = $this->WT->CurrentValue;
		$this->WT->PlaceHolder = RemoveHtml($this->WT->caption());

		// SurfaceArea
		$this->SurfaceArea->EditAttrs["class"] = "form-control";
		$this->SurfaceArea->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->SurfaceArea->CurrentValue = HtmlDecode($this->SurfaceArea->CurrentValue);
		$this->SurfaceArea->EditValue = $this->SurfaceArea->CurrentValue;
		$this->SurfaceArea->PlaceHolder = RemoveHtml($this->SurfaceArea->caption());

		// BodyMassIndex
		$this->BodyMassIndex->EditAttrs["class"] = "form-control";
		$this->BodyMassIndex->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->BodyMassIndex->CurrentValue = HtmlDecode($this->BodyMassIndex->CurrentValue);
		$this->BodyMassIndex->EditValue = $this->BodyMassIndex->CurrentValue;
		$this->BodyMassIndex->PlaceHolder = RemoveHtml($this->BodyMassIndex->caption());

		// ClinicalFindings
		$this->ClinicalFindings->EditAttrs["class"] = "form-control";
		$this->ClinicalFindings->EditCustomAttributes = "";
		$this->ClinicalFindings->EditValue = $this->ClinicalFindings->CurrentValue;
		$this->ClinicalFindings->PlaceHolder = RemoveHtml($this->ClinicalFindings->caption());

		// ClinicalDiagnosis
		$this->ClinicalDiagnosis->EditAttrs["class"] = "form-control";
		$this->ClinicalDiagnosis->EditCustomAttributes = "";
		$this->ClinicalDiagnosis->EditValue = $this->ClinicalDiagnosis->CurrentValue;
		$this->ClinicalDiagnosis->PlaceHolder = RemoveHtml($this->ClinicalDiagnosis->caption());

		// AnticoagulantifAny
		$this->AnticoagulantifAny->EditAttrs["class"] = "form-control";
		$this->AnticoagulantifAny->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->AnticoagulantifAny->CurrentValue = HtmlDecode($this->AnticoagulantifAny->CurrentValue);
		$this->AnticoagulantifAny->EditValue = $this->AnticoagulantifAny->CurrentValue;
		$this->AnticoagulantifAny->PlaceHolder = RemoveHtml($this->AnticoagulantifAny->caption());

		// FoodAllergies
		$this->FoodAllergies->EditAttrs["class"] = "form-control";
		$this->FoodAllergies->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->FoodAllergies->CurrentValue = HtmlDecode($this->FoodAllergies->CurrentValue);
		$this->FoodAllergies->EditValue = $this->FoodAllergies->CurrentValue;
		$this->FoodAllergies->PlaceHolder = RemoveHtml($this->FoodAllergies->caption());

		// GenericAllergies
		$this->GenericAllergies->EditAttrs["class"] = "form-control";
		$this->GenericAllergies->EditCustomAttributes = "";

		// GroupAllergies
		$this->GroupAllergies->EditAttrs["class"] = "form-control";
		$this->GroupAllergies->EditCustomAttributes = "";

		// Temp
		$this->Temp->EditAttrs["class"] = "form-control";
		$this->Temp->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Temp->CurrentValue = HtmlDecode($this->Temp->CurrentValue);
		$this->Temp->EditValue = $this->Temp->CurrentValue;
		$this->Temp->PlaceHolder = RemoveHtml($this->Temp->caption());

		// Pulse
		$this->Pulse->EditAttrs["class"] = "form-control";
		$this->Pulse->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Pulse->CurrentValue = HtmlDecode($this->Pulse->CurrentValue);
		$this->Pulse->EditValue = $this->Pulse->CurrentValue;
		$this->Pulse->PlaceHolder = RemoveHtml($this->Pulse->caption());

		// BP
		$this->BP->EditAttrs["class"] = "form-control";
		$this->BP->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->BP->CurrentValue = HtmlDecode($this->BP->CurrentValue);
		$this->BP->EditValue = $this->BP->CurrentValue;
		$this->BP->PlaceHolder = RemoveHtml($this->BP->caption());

		// PR
		$this->PR->EditAttrs["class"] = "form-control";
		$this->PR->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PR->CurrentValue = HtmlDecode($this->PR->CurrentValue);
		$this->PR->EditValue = $this->PR->CurrentValue;
		$this->PR->PlaceHolder = RemoveHtml($this->PR->caption());

		// CNS
		$this->CNS->EditAttrs["class"] = "form-control";
		$this->CNS->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->CNS->CurrentValue = HtmlDecode($this->CNS->CurrentValue);
		$this->CNS->EditValue = $this->CNS->CurrentValue;
		$this->CNS->PlaceHolder = RemoveHtml($this->CNS->caption());

		// RSA
		$this->RSA->EditAttrs["class"] = "form-control";
		$this->RSA->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->RSA->CurrentValue = HtmlDecode($this->RSA->CurrentValue);
		$this->RSA->EditValue = $this->RSA->CurrentValue;
		$this->RSA->PlaceHolder = RemoveHtml($this->RSA->caption());

		// CVS
		$this->CVS->EditAttrs["class"] = "form-control";
		$this->CVS->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->CVS->CurrentValue = HtmlDecode($this->CVS->CurrentValue);
		$this->CVS->EditValue = $this->CVS->CurrentValue;
		$this->CVS->PlaceHolder = RemoveHtml($this->CVS->caption());

		// PA
		$this->PA->EditAttrs["class"] = "form-control";
		$this->PA->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PA->CurrentValue = HtmlDecode($this->PA->CurrentValue);
		$this->PA->EditValue = $this->PA->CurrentValue;
		$this->PA->PlaceHolder = RemoveHtml($this->PA->caption());

		// PS
		$this->PS->EditAttrs["class"] = "form-control";
		$this->PS->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PS->CurrentValue = HtmlDecode($this->PS->CurrentValue);
		$this->PS->EditValue = $this->PS->CurrentValue;
		$this->PS->PlaceHolder = RemoveHtml($this->PS->caption());

		// PV
		$this->PV->EditAttrs["class"] = "form-control";
		$this->PV->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PV->CurrentValue = HtmlDecode($this->PV->CurrentValue);
		$this->PV->EditValue = $this->PV->CurrentValue;
		$this->PV->PlaceHolder = RemoveHtml($this->PV->caption());

		// clinicaldetails
		$this->clinicaldetails->EditCustomAttributes = "";

		// status
		$this->status->EditAttrs["class"] = "form-control";
		$this->status->EditCustomAttributes = "";

		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
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

		// PatientSearch
		$this->PatientSearch->EditAttrs["class"] = "form-control";
		$this->PatientSearch->EditCustomAttributes = "";

		// PatientId
		$this->PatientId->EditAttrs["class"] = "form-control";
		$this->PatientId->EditCustomAttributes = "";
		$this->PatientId->EditValue = $this->PatientId->CurrentValue;
		$this->PatientId->ViewCustomAttributes = "";

		// Reception
		$this->Reception->EditAttrs["class"] = "form-control";
		$this->Reception->EditCustomAttributes = "";
		$this->Reception->EditValue = $this->Reception->CurrentValue;
		$this->Reception->EditValue = FormatNumber($this->Reception->EditValue, 0, -2, -2, -2);
		$this->Reception->ViewCustomAttributes = "";

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
					$doc->exportCaption($this->mrnno);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->PatID);
					$doc->exportCaption($this->MobileNumber);
					$doc->exportCaption($this->profilePic);
					$doc->exportCaption($this->HT);
					$doc->exportCaption($this->WT);
					$doc->exportCaption($this->SurfaceArea);
					$doc->exportCaption($this->BodyMassIndex);
					$doc->exportCaption($this->ClinicalFindings);
					$doc->exportCaption($this->ClinicalDiagnosis);
					$doc->exportCaption($this->AnticoagulantifAny);
					$doc->exportCaption($this->FoodAllergies);
					$doc->exportCaption($this->GenericAllergies);
					$doc->exportCaption($this->GroupAllergies);
					$doc->exportCaption($this->Temp);
					$doc->exportCaption($this->Pulse);
					$doc->exportCaption($this->BP);
					$doc->exportCaption($this->PR);
					$doc->exportCaption($this->CNS);
					$doc->exportCaption($this->RSA);
					$doc->exportCaption($this->CVS);
					$doc->exportCaption($this->PA);
					$doc->exportCaption($this->PS);
					$doc->exportCaption($this->PV);
					$doc->exportCaption($this->clinicaldetails);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
					$doc->exportCaption($this->Age);
					$doc->exportCaption($this->Gender);
					$doc->exportCaption($this->PatientSearch);
					$doc->exportCaption($this->PatientId);
					$doc->exportCaption($this->Reception);
					$doc->exportCaption($this->HospID);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->mrnno);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->PatID);
					$doc->exportCaption($this->MobileNumber);
					$doc->exportCaption($this->HT);
					$doc->exportCaption($this->WT);
					$doc->exportCaption($this->SurfaceArea);
					$doc->exportCaption($this->BodyMassIndex);
					$doc->exportCaption($this->AnticoagulantifAny);
					$doc->exportCaption($this->FoodAllergies);
					$doc->exportCaption($this->GenericAllergies);
					$doc->exportCaption($this->GroupAllergies);
					$doc->exportCaption($this->Temp);
					$doc->exportCaption($this->Pulse);
					$doc->exportCaption($this->BP);
					$doc->exportCaption($this->PR);
					$doc->exportCaption($this->CNS);
					$doc->exportCaption($this->RSA);
					$doc->exportCaption($this->CVS);
					$doc->exportCaption($this->PA);
					$doc->exportCaption($this->PS);
					$doc->exportCaption($this->PV);
					$doc->exportCaption($this->clinicaldetails);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
					$doc->exportCaption($this->Age);
					$doc->exportCaption($this->Gender);
					$doc->exportCaption($this->PatientId);
					$doc->exportCaption($this->Reception);
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
						$doc->exportField($this->mrnno);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->PatID);
						$doc->exportField($this->MobileNumber);
						$doc->exportField($this->profilePic);
						$doc->exportField($this->HT);
						$doc->exportField($this->WT);
						$doc->exportField($this->SurfaceArea);
						$doc->exportField($this->BodyMassIndex);
						$doc->exportField($this->ClinicalFindings);
						$doc->exportField($this->ClinicalDiagnosis);
						$doc->exportField($this->AnticoagulantifAny);
						$doc->exportField($this->FoodAllergies);
						$doc->exportField($this->GenericAllergies);
						$doc->exportField($this->GroupAllergies);
						$doc->exportField($this->Temp);
						$doc->exportField($this->Pulse);
						$doc->exportField($this->BP);
						$doc->exportField($this->PR);
						$doc->exportField($this->CNS);
						$doc->exportField($this->RSA);
						$doc->exportField($this->CVS);
						$doc->exportField($this->PA);
						$doc->exportField($this->PS);
						$doc->exportField($this->PV);
						$doc->exportField($this->clinicaldetails);
						$doc->exportField($this->status);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
						$doc->exportField($this->Age);
						$doc->exportField($this->Gender);
						$doc->exportField($this->PatientSearch);
						$doc->exportField($this->PatientId);
						$doc->exportField($this->Reception);
						$doc->exportField($this->HospID);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->mrnno);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->PatID);
						$doc->exportField($this->MobileNumber);
						$doc->exportField($this->HT);
						$doc->exportField($this->WT);
						$doc->exportField($this->SurfaceArea);
						$doc->exportField($this->BodyMassIndex);
						$doc->exportField($this->AnticoagulantifAny);
						$doc->exportField($this->FoodAllergies);
						$doc->exportField($this->GenericAllergies);
						$doc->exportField($this->GroupAllergies);
						$doc->exportField($this->Temp);
						$doc->exportField($this->Pulse);
						$doc->exportField($this->BP);
						$doc->exportField($this->PR);
						$doc->exportField($this->CNS);
						$doc->exportField($this->RSA);
						$doc->exportField($this->CVS);
						$doc->exportField($this->PA);
						$doc->exportField($this->PS);
						$doc->exportField($this->PV);
						$doc->exportField($this->clinicaldetails);
						$doc->exportField($this->status);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
						$doc->exportField($this->Age);
						$doc->exportField($this->Gender);
						$doc->exportField($this->PatientId);
						$doc->exportField($this->Reception);
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