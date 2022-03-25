<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for aa_appointment_scheduler
 */
class aa_appointment_scheduler extends DbTable
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
	public $start_date;
	public $end_date;
	public $patientID;
	public $patientName;
	public $DoctorID;
	public $DoctorName;
	public $AppointmentStatus;
	public $status;
	public $DoctorCode;
	public $Department;
	public $scheduler_id;
	public $text;
	public $appointment_status;
	public $PId;
	public $MobileNumber;
	public $SchEmail;
	public $appointment_type;
	public $Notified;
	public $Purpose;
	public $Notes;
	public $PatientType;
	public $Referal;
	public $paymentType;
	public $tittle;
	public $gendar;
	public $Dob;
	public $Age;
	public $WhereDidYouHear;
	public $HospID;
	public $createdBy;
	public $createdDateTime;
	public $PatientTypee;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'aa_appointment_scheduler';
		$this->TableName = 'aa_appointment_scheduler';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`aa_appointment_scheduler`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_DEFAULT; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = FALSE; // Allow detail add
		$this->DetailEdit = FALSE; // Allow detail edit
		$this->DetailView = FALSE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = Config("DEFAULT_USER_ID_ALLOW_SECURITY"); // Default User ID allowed permissions
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// id
		$this->id = new DbField('aa_appointment_scheduler', 'aa_appointment_scheduler', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// start_date
		$this->start_date = new DbField('aa_appointment_scheduler', 'aa_appointment_scheduler', 'x_start_date', 'start_date', '`start_date`', CastDateFieldForLike("`start_date`", 11, "DB"), 135, 19, 11, FALSE, '`start_date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->start_date->Sortable = TRUE; // Allow sort
		$this->start_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['start_date'] = &$this->start_date;

		// end_date
		$this->end_date = new DbField('aa_appointment_scheduler', 'aa_appointment_scheduler', 'x_end_date', 'end_date', '`end_date`', CastDateFieldForLike("`end_date`", 11, "DB"), 135, 19, 11, FALSE, '`end_date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->end_date->Sortable = TRUE; // Allow sort
		$this->end_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['end_date'] = &$this->end_date;

		// patientID
		$this->patientID = new DbField('aa_appointment_scheduler', 'aa_appointment_scheduler', 'x_patientID', 'patientID', '`patientID`', '`patientID`', 200, 45, -1, FALSE, '`EV__patientID`', TRUE, TRUE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->patientID->Sortable = TRUE; // Allow sort
		$this->patientID->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->patientID->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->patientID->Lookup = new Lookup('patientID', 'patient', FALSE, 'PatientID', ["PatientID","first_name","mobile_no","spouse_mobile_no"], [], [], [], [], ["first_name","id","mobile_no","ReferedByDr"], ["x_patientName","x_PId","x_MobileNumber","x_Referal"], '`id` DESC', '');
		$this->fields['patientID'] = &$this->patientID;

		// patientName
		$this->patientName = new DbField('aa_appointment_scheduler', 'aa_appointment_scheduler', 'x_patientName', 'patientName', '`patientName`', '`patientName`', 200, 45, -1, FALSE, '`patientName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->patientName->Sortable = TRUE; // Allow sort
		$this->fields['patientName'] = &$this->patientName;

		// DoctorID
		$this->DoctorID = new DbField('aa_appointment_scheduler', 'aa_appointment_scheduler', 'x_DoctorID', 'DoctorID', '`DoctorID`', '`DoctorID`', 3, 11, -1, FALSE, '`DoctorID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DoctorID->IsForeignKey = TRUE; // Foreign key field
		$this->DoctorID->Sortable = TRUE; // Allow sort
		$this->fields['DoctorID'] = &$this->DoctorID;

		// DoctorName
		$this->DoctorName = new DbField('aa_appointment_scheduler', 'aa_appointment_scheduler', 'x_DoctorName', 'DoctorName', '`DoctorName`', '`DoctorName`', 200, 45, -1, FALSE, '`DoctorName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->DoctorName->Sortable = TRUE; // Allow sort
		$this->DoctorName->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->DoctorName->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->DoctorName->Lookup = new Lookup('DoctorName', 'doctors', FALSE, 'NAME', ["NAME","","",""], [], [], [], [], ["id","CODE","DEPARTMENT"], ["x_DoctorID","x_DoctorCode","x_Department"], '', '');
		$this->fields['DoctorName'] = &$this->DoctorName;

		// AppointmentStatus
		$this->AppointmentStatus = new DbField('aa_appointment_scheduler', 'aa_appointment_scheduler', 'x_AppointmentStatus', 'AppointmentStatus', '`AppointmentStatus`', '`AppointmentStatus`', 200, 45, -1, FALSE, '`AppointmentStatus`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AppointmentStatus->Sortable = TRUE; // Allow sort
		$this->fields['AppointmentStatus'] = &$this->AppointmentStatus;

		// status
		$this->status = new DbField('aa_appointment_scheduler', 'aa_appointment_scheduler', 'x_status', 'status', '`status`', '`status`', 200, 45, -1, FALSE, '`status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->status->Sortable = TRUE; // Allow sort
		$this->status->Lookup = new Lookup('status', 'aa_appointment_scheduler', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->status->OptionCount = 1;
		$this->fields['status'] = &$this->status;

		// DoctorCode
		$this->DoctorCode = new DbField('aa_appointment_scheduler', 'aa_appointment_scheduler', 'x_DoctorCode', 'DoctorCode', '`DoctorCode`', '`DoctorCode`', 200, 45, -1, FALSE, '`DoctorCode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DoctorCode->Sortable = TRUE; // Allow sort
		$this->fields['DoctorCode'] = &$this->DoctorCode;

		// Department
		$this->Department = new DbField('aa_appointment_scheduler', 'aa_appointment_scheduler', 'x_Department', 'Department', '`Department`', '`Department`', 200, 45, -1, FALSE, '`Department`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Department->Sortable = TRUE; // Allow sort
		$this->fields['Department'] = &$this->Department;

		// scheduler_id
		$this->scheduler_id = new DbField('aa_appointment_scheduler', 'aa_appointment_scheduler', 'x_scheduler_id', 'scheduler_id', '`scheduler_id`', '`scheduler_id`', 200, 45, -1, FALSE, '`scheduler_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->scheduler_id->Sortable = TRUE; // Allow sort
		$this->fields['scheduler_id'] = &$this->scheduler_id;

		// text
		$this->text = new DbField('aa_appointment_scheduler', 'aa_appointment_scheduler', 'x_text', 'text', '`text`', '`text`', 200, 45, -1, FALSE, '`text`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->text->Sortable = TRUE; // Allow sort
		$this->fields['text'] = &$this->text;

		// appointment_status
		$this->appointment_status = new DbField('aa_appointment_scheduler', 'aa_appointment_scheduler', 'x_appointment_status', 'appointment_status', '`appointment_status`', '`appointment_status`', 200, 45, -1, FALSE, '`appointment_status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->appointment_status->Sortable = TRUE; // Allow sort
		$this->fields['appointment_status'] = &$this->appointment_status;

		// PId
		$this->PId = new DbField('aa_appointment_scheduler', 'aa_appointment_scheduler', 'x_PId', 'PId', '`PId`', '`PId`', 3, 11, -1, FALSE, '`PId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PId->Sortable = TRUE; // Allow sort
		$this->PId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['PId'] = &$this->PId;

		// MobileNumber
		$this->MobileNumber = new DbField('aa_appointment_scheduler', 'aa_appointment_scheduler', 'x_MobileNumber', 'MobileNumber', '`MobileNumber`', '`MobileNumber`', 200, 45, -1, FALSE, '`MobileNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MobileNumber->Sortable = TRUE; // Allow sort
		$this->fields['MobileNumber'] = &$this->MobileNumber;

		// SchEmail
		$this->SchEmail = new DbField('aa_appointment_scheduler', 'aa_appointment_scheduler', 'x_SchEmail', 'SchEmail', '`SchEmail`', '`SchEmail`', 200, 45, -1, FALSE, '`SchEmail`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SchEmail->Sortable = TRUE; // Allow sort
		$this->fields['SchEmail'] = &$this->SchEmail;

		// appointment_type
		$this->appointment_type = new DbField('aa_appointment_scheduler', 'aa_appointment_scheduler', 'x_appointment_type', 'appointment_type', '`appointment_type`', '`appointment_type`', 200, 45, -1, FALSE, '`appointment_type`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->appointment_type->Sortable = TRUE; // Allow sort
		$this->appointment_type->Lookup = new Lookup('appointment_type', 'aa_appointment_scheduler', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->appointment_type->OptionCount = 2;
		$this->fields['appointment_type'] = &$this->appointment_type;

		// Notified
		$this->Notified = new DbField('aa_appointment_scheduler', 'aa_appointment_scheduler', 'x_Notified', 'Notified', '`Notified`', '`Notified`', 200, 45, -1, FALSE, '`Notified`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->Notified->Sortable = TRUE; // Allow sort
		$this->Notified->Lookup = new Lookup('Notified', 'aa_appointment_scheduler', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Notified->OptionCount = 2;
		$this->fields['Notified'] = &$this->Notified;

		// Purpose
		$this->Purpose = new DbField('aa_appointment_scheduler', 'aa_appointment_scheduler', 'x_Purpose', 'Purpose', '`Purpose`', '`Purpose`', 200, 45, -1, FALSE, '`Purpose`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Purpose->Sortable = TRUE; // Allow sort
		$this->fields['Purpose'] = &$this->Purpose;

		// Notes
		$this->Notes = new DbField('aa_appointment_scheduler', 'aa_appointment_scheduler', 'x_Notes', 'Notes', '`Notes`', '`Notes`', 200, 45, -1, FALSE, '`Notes`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Notes->Sortable = TRUE; // Allow sort
		$this->fields['Notes'] = &$this->Notes;

		// PatientType
		$this->PatientType = new DbField('aa_appointment_scheduler', 'aa_appointment_scheduler', 'x_PatientType', 'PatientType', '`PatientType`', '`PatientType`', 200, 45, -1, FALSE, '`PatientType`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->PatientType->Required = TRUE; // Required field
		$this->PatientType->Sortable = TRUE; // Allow sort
		$this->PatientType->Lookup = new Lookup('PatientType', 'aa_appointment_scheduler', FALSE, '', ["","","",""], [], ["x_PatientTypee"], [], [], [], [], '', '');
		$this->PatientType->OptionCount = 2;
		$this->fields['PatientType'] = &$this->PatientType;

		// Referal
		$this->Referal = new DbField('aa_appointment_scheduler', 'aa_appointment_scheduler', 'x_Referal', 'Referal', '`Referal`', '`Referal`', 200, 45, -1, FALSE, '`EV__Referal`', TRUE, TRUE, TRUE, 'FORMATTED TEXT', 'SELECT');
		$this->Referal->Sortable = TRUE; // Allow sort
		$this->Referal->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Referal->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Referal->Lookup = new Lookup('Referal', 'mas_reference_type', FALSE, 'reference', ["reference","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Referal'] = &$this->Referal;

		// paymentType
		$this->paymentType = new DbField('aa_appointment_scheduler', 'aa_appointment_scheduler', 'x_paymentType', 'paymentType', '`paymentType`', '`paymentType`', 200, 45, -1, FALSE, '`paymentType`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->paymentType->Sortable = TRUE; // Allow sort
		$this->fields['paymentType'] = &$this->paymentType;

		// tittle
		$this->tittle = new DbField('aa_appointment_scheduler', 'aa_appointment_scheduler', 'x_tittle', 'tittle', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->tittle->IsCustom = TRUE; // Custom field
		$this->tittle->Sortable = TRUE; // Allow sort
		$this->tittle->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->tittle->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->tittle->Lookup = new Lookup('tittle', 'sys_tittle', FALSE, 'id', ["Name","","",""], [], [], [], [], [], [], '', '');
		$this->fields['tittle'] = &$this->tittle;

		// gendar
		$this->gendar = new DbField('aa_appointment_scheduler', 'aa_appointment_scheduler', 'x_gendar', 'gendar', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->gendar->IsCustom = TRUE; // Custom field
		$this->gendar->Sortable = TRUE; // Allow sort
		$this->gendar->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->gendar->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->gendar->Lookup = new Lookup('gendar', 'sys_gender', FALSE, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
		$this->fields['gendar'] = &$this->gendar;

		// Dob
		$this->Dob = new DbField('aa_appointment_scheduler', 'aa_appointment_scheduler', 'x_Dob', 'Dob', '\'\'', '\'\'', 201, 65530, 7, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Dob->IsCustom = TRUE; // Custom field
		$this->Dob->Sortable = TRUE; // Allow sort
		$this->fields['Dob'] = &$this->Dob;

		// Age
		$this->Age = new DbField('aa_appointment_scheduler', 'aa_appointment_scheduler', 'x_Age', 'Age', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Age->IsCustom = TRUE; // Custom field
		$this->Age->Sortable = TRUE; // Allow sort
		$this->fields['Age'] = &$this->Age;

		// WhereDidYouHear
		$this->WhereDidYouHear = new DbField('aa_appointment_scheduler', 'aa_appointment_scheduler', 'x_WhereDidYouHear', 'WhereDidYouHear', '`WhereDidYouHear`', '`WhereDidYouHear`', 200, 45, -1, FALSE, '`WhereDidYouHear`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->WhereDidYouHear->Sortable = TRUE; // Allow sort
		$this->WhereDidYouHear->Lookup = new Lookup('WhereDidYouHear', 'mas_where_didyou_hear', FALSE, 'Job', ["Job","","",""], [], [], [], [], [], [], '', '');
		$this->fields['WhereDidYouHear'] = &$this->WhereDidYouHear;

		// HospID
		$this->HospID = new DbField('aa_appointment_scheduler', 'aa_appointment_scheduler', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HospID'] = &$this->HospID;

		// createdBy
		$this->createdBy = new DbField('aa_appointment_scheduler', 'aa_appointment_scheduler', 'x_createdBy', 'createdBy', '`createdBy`', '`createdBy`', 200, 45, -1, FALSE, '`createdBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdBy->Sortable = TRUE; // Allow sort
		$this->fields['createdBy'] = &$this->createdBy;

		// createdDateTime
		$this->createdDateTime = new DbField('aa_appointment_scheduler', 'aa_appointment_scheduler', 'x_createdDateTime', 'createdDateTime', '`createdDateTime`', CastDateFieldForLike("`createdDateTime`", 0, "DB"), 135, 19, 0, FALSE, '`createdDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdDateTime->Sortable = TRUE; // Allow sort
		$this->createdDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['createdDateTime'] = &$this->createdDateTime;

		// PatientTypee
		$this->PatientTypee = new DbField('aa_appointment_scheduler', 'aa_appointment_scheduler', 'x_PatientTypee', 'PatientTypee', '`PatientTypee`', '`PatientTypee`', 200, 45, -1, FALSE, '`PatientTypee`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->PatientTypee->Required = TRUE; // Required field
		$this->PatientTypee->Sortable = TRUE; // Allow sort
		$this->PatientTypee->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->PatientTypee->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->PatientTypee->Lookup = new Lookup('PatientTypee', 'appointment_patienttypee', FALSE, 'Name', ["Name","","",""], ["x_PatientType"], [], ["Type"], ["x_Type"], [], [], '', '');
		$this->fields['PatientTypee'] = &$this->PatientTypee;
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
			$sortFieldList = ($fld->VirtualExpression != "") ? $fld->VirtualExpression : $sortField;
			$this->setSessionOrderByList($sortFieldList . " " . $thisSort); // Save to Session
		} else {
			$fld->setSort("");
		}
	}

	// Session ORDER BY for List page
	public function getSessionOrderByList()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_ORDER_BY_LIST")];
	}
	public function setSessionOrderByList($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_ORDER_BY_LIST")] = $v;
	}

	// Current master table name
	public function getCurrentMasterTable()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_MASTER_TABLE")];
	}
	public function setCurrentMasterTable($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_MASTER_TABLE")] = $v;
	}

	// Session master WHERE clause
	public function getMasterFilter()
	{

		// Master filter
		$masterFilter = "";
		if ($this->getCurrentMasterTable() == "doctors") {
			if ($this->DoctorID->getSessionValue() != "")
				$masterFilter .= "`id`=" . QuotedValue($this->DoctorID->getSessionValue(), DATATYPE_NUMBER, "DB");
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
		if ($this->getCurrentMasterTable() == "doctors") {
			if ($this->DoctorID->getSessionValue() != "")
				$detailFilter .= "`DoctorID`=" . QuotedValue($this->DoctorID->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
		}
		return $detailFilter;
	}

	// Master filter
	public function sqlMasterFilter_doctors()
	{
		return "`id`=@id@";
	}

	// Detail filter
	public function sqlDetailFilter_doctors()
	{
		return "`DoctorID`=@DoctorID@";
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`aa_appointment_scheduler`";
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
		return ($this->SqlSelect != "") ? $this->SqlSelect : "SELECT *, '' AS `tittle`, '' AS `gendar`, '' AS `Dob`, '' AS `Age` FROM " . $this->getSqlFrom();
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
			"SELECT *, '' AS `tittle`, '' AS `gendar`, '' AS `Dob`, '' AS `Age`, (SELECT CONCAT(COALESCE(`PatientID`, ''),'" . ValueSeparator(1, $this->patientID) . "',COALESCE(`first_name`,''),'" . ValueSeparator(2, $this->patientID) . "',COALESCE(`mobile_no`,''),'" . ValueSeparator(3, $this->patientID) . "',COALESCE(`spouse_mobile_no`,'')) FROM `patient` `TMP_LOOKUPTABLE` WHERE `TMP_LOOKUPTABLE`.`PatientID` = `aa_appointment_scheduler`.`patientID` LIMIT 1) AS `EV__patientID`, (SELECT `reference` FROM `mas_reference_type` `TMP_LOOKUPTABLE` WHERE `TMP_LOOKUPTABLE`.`reference` = `aa_appointment_scheduler`.`Referal` LIMIT 1) AS `EV__Referal` FROM `aa_appointment_scheduler`" .
			") `TMP_TABLE`";
		return ($this->SqlSelectList != "") ? $this->SqlSelectList : $select;
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
		$where = ($this->SqlWhere != "") ? $this->SqlWhere : "";
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
		return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : "`id` DESC";
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
	public function applyUserIDFilters($filter, $id = "")
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
			case "changepwd":
			case "forgotpwd":
				return (($allow & 4) == 4);
			case "delete":
				return (($allow & 2) == 2);
			case "view":
				return (($allow & 32) == 32);
			case "search":
				return (($allow & 64) == 64);
			case "lookup":
				return (($allow & 256) == 256);
			default:
				return (($allow & 8) == 8);
		}
	}

	// Get recordset
	public function getRecordset($sql, $rowcnt = -1, $offset = -1)
	{
		$conn = $this->getConnection();
		$conn->raiseErrorFn = Config("ERROR_FUNC");
		$rs = $conn->selectLimit($sql, $rowcnt, $offset);
		$conn->raiseErrorFn = "";
		return $rs;
	}

	// Get record count
	public function getRecordCount($sql, $c = NULL)
	{
		$cnt = -1;
		$rs = NULL;
		$sql = preg_replace('/\/\*BeginOrderBy\*\/[\s\S]+\/\*EndOrderBy\*\//', "", $sql); // Remove ORDER BY clause (MSSQL)
		$pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';

		// Skip Custom View / SubQuery / SELECT DISTINCT / ORDER BY
		if (($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
			preg_match($pattern, $sql) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sql) &&
			!preg_match('/^\s*select\s+distinct\s+/i', $sql) && !preg_match('/\s+order\s+by\s+/i', $sql)) {
			$sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sql);
		} else {
			$sqlwrk = "SELECT COUNT(*) FROM (" . $sql . ") COUNT_TABLE";
		}
		$conn = $c ?: $this->getConnection();
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
		if ($where != "")
			$where = " " . str_replace(["(", ")"], ["", ""], $where) . " ";
		if ($orderBy != "")
			$orderBy = " " . str_replace(["(", ")"], ["", ""], $orderBy) . " ";
		if ($this->BasicSearch->getKeyword() != "")
			return TRUE;
		if (ContainsString($orderBy, " " . $this->patientID->VirtualExpression . " "))
			return TRUE;
		if ($this->Referal->AdvancedSearch->SearchValue != "" ||
			$this->Referal->AdvancedSearch->SearchValue2 != "" ||
			ContainsString($where, " " . $this->Referal->VirtualExpression . " "))
			return TRUE;
		if (ContainsString($orderBy, " " . $this->Referal->VirtualExpression . " "))
			return TRUE;
		return FALSE;
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
		return "INSERT INTO " . $this->UpdateTable . " (" . $names . ") VALUES (" . $values . ")";
	}

	// Insert
	public function insert(&$rs)
	{
		$conn = $this->getConnection();
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
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom || $this->fields[$name]->IsAutoIncrement)
				continue;
			$sql .= $this->fields[$name]->Expression . "=";
			$sql .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$sql = preg_replace('/,+$/', "", $sql);
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		AddFilter($filter, $where);
		if ($filter != "")
			$sql .= " WHERE " . $filter;
		return $sql;
	}

	// Update
	public function update(&$rs, $where = "", $rsold = NULL, $curfilter = TRUE)
	{
		$conn = $this->getConnection();
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
		if ($filter != "")
			$sql .= $filter;
		else
			$sql .= "0=1"; // Avoid delete
		return $sql;
	}

	// Delete
	public function delete(&$rs, $where = "", $curfilter = FALSE)
	{
		$success = TRUE;
		$conn = $this->getConnection();
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
		$this->start_date->DbValue = $row['start_date'];
		$this->end_date->DbValue = $row['end_date'];
		$this->patientID->DbValue = $row['patientID'];
		$this->patientName->DbValue = $row['patientName'];
		$this->DoctorID->DbValue = $row['DoctorID'];
		$this->DoctorName->DbValue = $row['DoctorName'];
		$this->AppointmentStatus->DbValue = $row['AppointmentStatus'];
		$this->status->DbValue = $row['status'];
		$this->DoctorCode->DbValue = $row['DoctorCode'];
		$this->Department->DbValue = $row['Department'];
		$this->scheduler_id->DbValue = $row['scheduler_id'];
		$this->text->DbValue = $row['text'];
		$this->appointment_status->DbValue = $row['appointment_status'];
		$this->PId->DbValue = $row['PId'];
		$this->MobileNumber->DbValue = $row['MobileNumber'];
		$this->SchEmail->DbValue = $row['SchEmail'];
		$this->appointment_type->DbValue = $row['appointment_type'];
		$this->Notified->DbValue = $row['Notified'];
		$this->Purpose->DbValue = $row['Purpose'];
		$this->Notes->DbValue = $row['Notes'];
		$this->PatientType->DbValue = $row['PatientType'];
		$this->Referal->DbValue = $row['Referal'];
		$this->paymentType->DbValue = $row['paymentType'];
		$this->tittle->DbValue = $row['tittle'];
		$this->gendar->DbValue = $row['gendar'];
		$this->Dob->DbValue = $row['Dob'];
		$this->Age->DbValue = $row['Age'];
		$this->WhereDidYouHear->DbValue = $row['WhereDidYouHear'];
		$this->HospID->DbValue = $row['HospID'];
		$this->createdBy->DbValue = $row['createdBy'];
		$this->createdDateTime->DbValue = $row['createdDateTime'];
		$this->PatientTypee->DbValue = $row['PatientTypee'];
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
		if (is_array($row))
			$val = array_key_exists('id', $row) ? $row['id'] : NULL;
		else
			$val = $this->id->OldValue !== NULL ? $this->id->OldValue : $this->id->CurrentValue;
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
		$name = PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL");

		// Get referer URL automatically
		if (ServerVar("HTTP_REFERER") != "" && ReferPageName() != CurrentPageName() && ReferPageName() != "login.php") // Referer not same page or login page
			$_SESSION[$name] = ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] != "") {
			return $_SESSION[$name];
		} else {
			return "aa_appointment_schedulerlist.php";
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
		if ($pageName == "aa_appointment_schedulerview.php")
			return $Language->phrase("View");
		elseif ($pageName == "aa_appointment_scheduleredit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "aa_appointment_scheduleradd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "aa_appointment_schedulerlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("aa_appointment_schedulerview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("aa_appointment_schedulerview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "aa_appointment_scheduleradd.php?" . $this->getUrlParm($parm);
		else
			$url = "aa_appointment_scheduleradd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("aa_appointment_scheduleredit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("aa_appointment_scheduleradd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("aa_appointment_schedulerdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		if ($this->getCurrentMasterTable() == "doctors" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
			$url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
			$url .= "&fk_id=" . urlencode($this->DoctorID->CurrentValue);
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
		if ($parm != "")
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
			in_array($fld->Type, [128, 204, 205])) { // Unsortable data type
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
		$arKeys = [];
		$arKey = [];
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
		$ar = [];
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
	public function getFilterFromRecordKeys($setCurrent = TRUE)
	{
		$arKeys = $this->getRecordKeys();
		$keyFilter = "";
		foreach ($arKeys as $key) {
			if ($keyFilter != "") $keyFilter .= " OR ";
			if ($setCurrent)
				$this->id->CurrentValue = $key;
			else
				$this->id->OldValue = $key;
			$keyFilter .= "(" . $this->getRecordFilter() . ")";
		}
		return $keyFilter;
	}

	// Load rows based on filter
	public function &loadRs($filter)
	{

		// Set up filter (WHERE Clause)
		$sql = $this->getSql($filter);
		$conn = $this->getConnection();
		$rs = $conn->execute($sql);
		return $rs;
	}

	// Load row values from recordset
	public function loadListRowValues(&$rs)
	{
		$this->id->setDbValue($rs->fields('id'));
		$this->start_date->setDbValue($rs->fields('start_date'));
		$this->end_date->setDbValue($rs->fields('end_date'));
		$this->patientID->setDbValue($rs->fields('patientID'));
		$this->patientName->setDbValue($rs->fields('patientName'));
		$this->DoctorID->setDbValue($rs->fields('DoctorID'));
		$this->DoctorName->setDbValue($rs->fields('DoctorName'));
		$this->AppointmentStatus->setDbValue($rs->fields('AppointmentStatus'));
		$this->status->setDbValue($rs->fields('status'));
		$this->DoctorCode->setDbValue($rs->fields('DoctorCode'));
		$this->Department->setDbValue($rs->fields('Department'));
		$this->scheduler_id->setDbValue($rs->fields('scheduler_id'));
		$this->text->setDbValue($rs->fields('text'));
		$this->appointment_status->setDbValue($rs->fields('appointment_status'));
		$this->PId->setDbValue($rs->fields('PId'));
		$this->MobileNumber->setDbValue($rs->fields('MobileNumber'));
		$this->SchEmail->setDbValue($rs->fields('SchEmail'));
		$this->appointment_type->setDbValue($rs->fields('appointment_type'));
		$this->Notified->setDbValue($rs->fields('Notified'));
		$this->Purpose->setDbValue($rs->fields('Purpose'));
		$this->Notes->setDbValue($rs->fields('Notes'));
		$this->PatientType->setDbValue($rs->fields('PatientType'));
		$this->Referal->setDbValue($rs->fields('Referal'));
		$this->paymentType->setDbValue($rs->fields('paymentType'));
		$this->tittle->setDbValue($rs->fields('tittle'));
		$this->gendar->setDbValue($rs->fields('gendar'));
		$this->Dob->setDbValue($rs->fields('Dob'));
		$this->Age->setDbValue($rs->fields('Age'));
		$this->WhereDidYouHear->setDbValue($rs->fields('WhereDidYouHear'));
		$this->HospID->setDbValue($rs->fields('HospID'));
		$this->createdBy->setDbValue($rs->fields('createdBy'));
		$this->createdDateTime->setDbValue($rs->fields('createdDateTime'));
		$this->PatientTypee->setDbValue($rs->fields('PatientTypee'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// start_date
		// end_date
		// patientID
		// patientName
		// DoctorID
		// DoctorName
		// AppointmentStatus
		// status
		// DoctorCode
		// Department
		// scheduler_id
		// text
		// appointment_status
		// PId
		// MobileNumber
		// SchEmail
		// appointment_type
		// Notified
		// Purpose
		// Notes
		// PatientType
		// Referal
		// paymentType
		// tittle
		// gendar
		// Dob
		// Age
		// WhereDidYouHear
		// HospID
		// createdBy
		// createdDateTime
		// PatientTypee
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// start_date
		$this->start_date->ViewValue = $this->start_date->CurrentValue;
		$this->start_date->ViewValue = FormatDateTime($this->start_date->ViewValue, 11);
		$this->start_date->ViewCustomAttributes = "";

		// end_date
		$this->end_date->ViewValue = $this->end_date->CurrentValue;
		$this->end_date->ViewValue = FormatDateTime($this->end_date->ViewValue, 11);
		$this->end_date->ViewCustomAttributes = "";

		// patientID
		if ($this->patientID->VirtualValue != "") {
			$this->patientID->ViewValue = $this->patientID->VirtualValue;
		} else {
			$curVal = strval($this->patientID->CurrentValue);
			if ($curVal != "") {
				$this->patientID->ViewValue = $this->patientID->lookupCacheOption($curVal);
				if ($this->patientID->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`PatientID`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->patientID->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = $rswrk->fields('df4');
						$this->patientID->ViewValue = $this->patientID->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->patientID->ViewValue = $this->patientID->CurrentValue;
					}
				}
			} else {
				$this->patientID->ViewValue = NULL;
			}
		}
		$this->patientID->ViewCustomAttributes = "";

		// patientName
		$this->patientName->ViewValue = $this->patientName->CurrentValue;
		$this->patientName->ViewCustomAttributes = "";

		// DoctorID
		$this->DoctorID->ViewValue = $this->DoctorID->CurrentValue;
		$this->DoctorID->ViewCustomAttributes = "";

		// DoctorName
		$curVal = strval($this->DoctorName->CurrentValue);
		if ($curVal != "") {
			$this->DoctorName->ViewValue = $this->DoctorName->lookupCacheOption($curVal);
			if ($this->DoctorName->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->DoctorName->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->DoctorName->ViewValue = $this->DoctorName->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->DoctorName->ViewValue = $this->DoctorName->CurrentValue;
				}
			}
		} else {
			$this->DoctorName->ViewValue = NULL;
		}
		$this->DoctorName->ViewCustomAttributes = "";

		// AppointmentStatus
		$this->AppointmentStatus->ViewValue = $this->AppointmentStatus->CurrentValue;
		$this->AppointmentStatus->ViewCustomAttributes = "";

		// status
		if (strval($this->status->CurrentValue) != "") {
			$this->status->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->status->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->status->ViewValue->add($this->status->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->status->ViewValue = NULL;
		}
		$this->status->ViewCustomAttributes = "";

		// DoctorCode
		$this->DoctorCode->ViewValue = $this->DoctorCode->CurrentValue;
		$this->DoctorCode->ViewCustomAttributes = "";

		// Department
		$this->Department->ViewValue = $this->Department->CurrentValue;
		$this->Department->ViewCustomAttributes = "";

		// scheduler_id
		$this->scheduler_id->ViewValue = $this->scheduler_id->CurrentValue;
		$this->scheduler_id->ViewCustomAttributes = "";

		// text
		$this->text->ViewValue = $this->text->CurrentValue;
		$this->text->ViewCustomAttributes = "";

		// appointment_status
		$this->appointment_status->ViewValue = $this->appointment_status->CurrentValue;
		$this->appointment_status->ViewCustomAttributes = "";

		// PId
		$this->PId->ViewValue = $this->PId->CurrentValue;
		$this->PId->ViewValue = FormatNumber($this->PId->ViewValue, 0, -2, -2, -2);
		$this->PId->ViewCustomAttributes = "";

		// MobileNumber
		$this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
		$this->MobileNumber->ViewCustomAttributes = "";

		// SchEmail
		$this->SchEmail->ViewValue = $this->SchEmail->CurrentValue;
		$this->SchEmail->ViewCustomAttributes = "";

		// appointment_type
		if (strval($this->appointment_type->CurrentValue) != "") {
			$this->appointment_type->ViewValue = $this->appointment_type->optionCaption($this->appointment_type->CurrentValue);
		} else {
			$this->appointment_type->ViewValue = NULL;
		}
		$this->appointment_type->ViewCustomAttributes = "";

		// Notified
		if (strval($this->Notified->CurrentValue) != "") {
			$this->Notified->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->Notified->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->Notified->ViewValue->add($this->Notified->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->Notified->ViewValue = NULL;
		}
		$this->Notified->ViewCustomAttributes = "";

		// Purpose
		$this->Purpose->ViewValue = $this->Purpose->CurrentValue;
		$this->Purpose->ViewCustomAttributes = "";

		// Notes
		$this->Notes->ViewValue = $this->Notes->CurrentValue;
		$this->Notes->ViewCustomAttributes = "";

		// PatientType
		if (strval($this->PatientType->CurrentValue) != "") {
			$this->PatientType->ViewValue = $this->PatientType->optionCaption($this->PatientType->CurrentValue);
		} else {
			$this->PatientType->ViewValue = NULL;
		}
		$this->PatientType->ViewCustomAttributes = "";

		// Referal
		if ($this->Referal->VirtualValue != "") {
			$this->Referal->ViewValue = $this->Referal->VirtualValue;
		} else {
			$curVal = strval($this->Referal->CurrentValue);
			if ($curVal != "") {
				$this->Referal->ViewValue = $this->Referal->lookupCacheOption($curVal);
				if ($this->Referal->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Referal->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Referal->ViewValue = $this->Referal->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Referal->ViewValue = $this->Referal->CurrentValue;
					}
				}
			} else {
				$this->Referal->ViewValue = NULL;
			}
		}
		$this->Referal->ViewCustomAttributes = "";

		// paymentType
		$this->paymentType->ViewValue = $this->paymentType->CurrentValue;
		$this->paymentType->ViewCustomAttributes = "";

		// tittle
		$curVal = strval($this->tittle->CurrentValue);
		if ($curVal != "") {
			$this->tittle->ViewValue = $this->tittle->lookupCacheOption($curVal);
			if ($this->tittle->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->tittle->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->tittle->ViewValue = $this->tittle->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->tittle->ViewValue = $this->tittle->CurrentValue;
				}
			}
		} else {
			$this->tittle->ViewValue = NULL;
		}
		$this->tittle->ViewCustomAttributes = "";

		// gendar
		$curVal = strval($this->gendar->CurrentValue);
		if ($curVal != "") {
			$this->gendar->ViewValue = $this->gendar->lookupCacheOption($curVal);
			if ($this->gendar->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->gendar->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->gendar->ViewValue = $this->gendar->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->gendar->ViewValue = $this->gendar->CurrentValue;
				}
			}
		} else {
			$this->gendar->ViewValue = NULL;
		}
		$this->gendar->ViewCustomAttributes = "";

		// Dob
		$this->Dob->ViewValue = $this->Dob->CurrentValue;
		$this->Dob->ViewCustomAttributes = "";

		// Age
		$this->Age->ViewValue = $this->Age->CurrentValue;
		$this->Age->ViewCustomAttributes = "";

		// WhereDidYouHear
		$curVal = strval($this->WhereDidYouHear->CurrentValue);
		if ($curVal != "") {
			$this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->lookupCacheOption($curVal);
			if ($this->WhereDidYouHear->ViewValue === NULL) { // Lookup from database
				$arwrk = explode(",", $curVal);
				$filterWrk = "";
				foreach ($arwrk as $wrk) {
					if ($filterWrk != "")
						$filterWrk .= " OR ";
					$filterWrk .= "`Job`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
				}
				$sqlWrk = $this->WhereDidYouHear->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$this->WhereDidYouHear->ViewValue = new OptionValues();
					$ari = 0;
					while (!$rswrk->EOF) {
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->WhereDidYouHear->ViewValue->add($this->WhereDidYouHear->displayValue($arwrk));
						$rswrk->MoveNext();
						$ari++;
					}
					$rswrk->Close();
				} else {
					$this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->CurrentValue;
				}
			}
		} else {
			$this->WhereDidYouHear->ViewValue = NULL;
		}
		$this->WhereDidYouHear->ViewCustomAttributes = "";

		// HospID
		$this->HospID->ViewValue = $this->HospID->CurrentValue;
		$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
		$this->HospID->ViewCustomAttributes = "";

		// createdBy
		$this->createdBy->ViewValue = $this->createdBy->CurrentValue;
		$this->createdBy->ViewCustomAttributes = "";

		// createdDateTime
		$this->createdDateTime->ViewValue = $this->createdDateTime->CurrentValue;
		$this->createdDateTime->ViewValue = FormatDateTime($this->createdDateTime->ViewValue, 0);
		$this->createdDateTime->ViewCustomAttributes = "";

		// PatientTypee
		$curVal = strval($this->PatientTypee->CurrentValue);
		if ($curVal != "") {
			$this->PatientTypee->ViewValue = $this->PatientTypee->lookupCacheOption($curVal);
			if ($this->PatientTypee->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->PatientTypee->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->PatientTypee->ViewValue = $this->PatientTypee->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->PatientTypee->ViewValue = $this->PatientTypee->CurrentValue;
				}
			}
		} else {
			$this->PatientTypee->ViewValue = NULL;
		}
		$this->PatientTypee->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// start_date
		$this->start_date->LinkCustomAttributes = "";
		$this->start_date->HrefValue = "";
		$this->start_date->TooltipValue = "";

		// end_date
		$this->end_date->LinkCustomAttributes = "";
		$this->end_date->HrefValue = "";
		$this->end_date->TooltipValue = "";

		// patientID
		$this->patientID->LinkCustomAttributes = "";
		$this->patientID->HrefValue = "";
		$this->patientID->TooltipValue = "";

		// patientName
		$this->patientName->LinkCustomAttributes = "";
		$this->patientName->HrefValue = "";
		$this->patientName->TooltipValue = "";

		// DoctorID
		$this->DoctorID->LinkCustomAttributes = "";
		$this->DoctorID->HrefValue = "";
		$this->DoctorID->TooltipValue = "";

		// DoctorName
		$this->DoctorName->LinkCustomAttributes = "";
		$this->DoctorName->HrefValue = "";
		$this->DoctorName->TooltipValue = "";

		// AppointmentStatus
		$this->AppointmentStatus->LinkCustomAttributes = "";
		$this->AppointmentStatus->HrefValue = "";
		$this->AppointmentStatus->TooltipValue = "";

		// status
		$this->status->LinkCustomAttributes = "";
		$this->status->HrefValue = "";
		$this->status->TooltipValue = "";

		// DoctorCode
		$this->DoctorCode->LinkCustomAttributes = "";
		$this->DoctorCode->HrefValue = "";
		$this->DoctorCode->TooltipValue = "";

		// Department
		$this->Department->LinkCustomAttributes = "";
		$this->Department->HrefValue = "";
		$this->Department->TooltipValue = "";

		// scheduler_id
		$this->scheduler_id->LinkCustomAttributes = "";
		$this->scheduler_id->HrefValue = "";
		$this->scheduler_id->TooltipValue = "";

		// text
		$this->text->LinkCustomAttributes = "";
		$this->text->HrefValue = "";
		$this->text->TooltipValue = "";

		// appointment_status
		$this->appointment_status->LinkCustomAttributes = "";
		$this->appointment_status->HrefValue = "";
		$this->appointment_status->TooltipValue = "";

		// PId
		$this->PId->LinkCustomAttributes = "";
		$this->PId->HrefValue = "";
		$this->PId->TooltipValue = "";

		// MobileNumber
		$this->MobileNumber->LinkCustomAttributes = "";
		$this->MobileNumber->HrefValue = "";
		$this->MobileNumber->TooltipValue = "";

		// SchEmail
		$this->SchEmail->LinkCustomAttributes = "";
		$this->SchEmail->HrefValue = "";
		$this->SchEmail->TooltipValue = "";

		// appointment_type
		$this->appointment_type->LinkCustomAttributes = "";
		$this->appointment_type->HrefValue = "";
		$this->appointment_type->TooltipValue = "";

		// Notified
		$this->Notified->LinkCustomAttributes = "";
		$this->Notified->HrefValue = "";
		$this->Notified->TooltipValue = "";

		// Purpose
		$this->Purpose->LinkCustomAttributes = "";
		$this->Purpose->HrefValue = "";
		$this->Purpose->TooltipValue = "";

		// Notes
		$this->Notes->LinkCustomAttributes = "";
		$this->Notes->HrefValue = "";
		$this->Notes->TooltipValue = "";

		// PatientType
		$this->PatientType->LinkCustomAttributes = "";
		$this->PatientType->HrefValue = "";
		$this->PatientType->TooltipValue = "";

		// Referal
		$this->Referal->LinkCustomAttributes = "";
		$this->Referal->HrefValue = "";
		$this->Referal->TooltipValue = "";

		// paymentType
		$this->paymentType->LinkCustomAttributes = "";
		$this->paymentType->HrefValue = "";
		$this->paymentType->TooltipValue = "";

		// tittle
		$this->tittle->LinkCustomAttributes = "";
		$this->tittle->HrefValue = "";
		$this->tittle->TooltipValue = "";

		// gendar
		$this->gendar->LinkCustomAttributes = "";
		$this->gendar->HrefValue = "";
		$this->gendar->TooltipValue = "";

		// Dob
		$this->Dob->LinkCustomAttributes = "";
		$this->Dob->HrefValue = "";
		$this->Dob->TooltipValue = "";

		// Age
		$this->Age->LinkCustomAttributes = "";
		$this->Age->HrefValue = "";
		$this->Age->TooltipValue = "";

		// WhereDidYouHear
		$this->WhereDidYouHear->LinkCustomAttributes = "";
		$this->WhereDidYouHear->HrefValue = "";
		$this->WhereDidYouHear->TooltipValue = "";

		// HospID
		$this->HospID->LinkCustomAttributes = "";
		$this->HospID->HrefValue = "";
		$this->HospID->TooltipValue = "";

		// createdBy
		$this->createdBy->LinkCustomAttributes = "";
		$this->createdBy->HrefValue = "";
		$this->createdBy->TooltipValue = "";

		// createdDateTime
		$this->createdDateTime->LinkCustomAttributes = "";
		$this->createdDateTime->HrefValue = "";
		$this->createdDateTime->TooltipValue = "";

		// PatientTypee
		$this->PatientTypee->LinkCustomAttributes = "";
		$this->PatientTypee->HrefValue = "";
		$this->PatientTypee->TooltipValue = "";

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

		// start_date
		$this->start_date->EditAttrs["class"] = "form-control";
		$this->start_date->EditCustomAttributes = "";
		$this->start_date->EditValue = FormatDateTime($this->start_date->CurrentValue, 11);
		$this->start_date->PlaceHolder = RemoveHtml($this->start_date->caption());

		// end_date
		$this->end_date->EditAttrs["class"] = "form-control";
		$this->end_date->EditCustomAttributes = "";
		$this->end_date->EditValue = FormatDateTime($this->end_date->CurrentValue, 11);
		$this->end_date->PlaceHolder = RemoveHtml($this->end_date->caption());

		// patientID
		$this->patientID->EditAttrs["class"] = "form-control";
		$this->patientID->EditCustomAttributes = "";

		// patientName
		$this->patientName->EditAttrs["class"] = "form-control";
		$this->patientName->EditCustomAttributes = "";
		if (!$this->patientName->Raw)
			$this->patientName->CurrentValue = HtmlDecode($this->patientName->CurrentValue);
		$this->patientName->EditValue = $this->patientName->CurrentValue;
		$this->patientName->PlaceHolder = RemoveHtml($this->patientName->caption());

		// DoctorID
		$this->DoctorID->EditAttrs["class"] = "form-control";
		$this->DoctorID->EditCustomAttributes = "";
		if ($this->DoctorID->getSessionValue() != "") {
			$this->DoctorID->CurrentValue = $this->DoctorID->getSessionValue();
			$this->DoctorID->ViewValue = $this->DoctorID->CurrentValue;
			$this->DoctorID->ViewCustomAttributes = "";
		} else {
			$this->DoctorID->EditValue = $this->DoctorID->CurrentValue;
			$this->DoctorID->PlaceHolder = RemoveHtml($this->DoctorID->caption());
		}

		// DoctorName
		$this->DoctorName->EditAttrs["class"] = "form-control";
		$this->DoctorName->EditCustomAttributes = "";

		// AppointmentStatus
		$this->AppointmentStatus->EditAttrs["class"] = "form-control";
		$this->AppointmentStatus->EditCustomAttributes = "";
		if (!$this->AppointmentStatus->Raw)
			$this->AppointmentStatus->CurrentValue = HtmlDecode($this->AppointmentStatus->CurrentValue);
		$this->AppointmentStatus->EditValue = $this->AppointmentStatus->CurrentValue;
		$this->AppointmentStatus->PlaceHolder = RemoveHtml($this->AppointmentStatus->caption());

		// status
		$this->status->EditCustomAttributes = "";
		$this->status->EditValue = $this->status->options(FALSE);

		// DoctorCode
		$this->DoctorCode->EditAttrs["class"] = "form-control";
		$this->DoctorCode->EditCustomAttributes = "";
		if (!$this->DoctorCode->Raw)
			$this->DoctorCode->CurrentValue = HtmlDecode($this->DoctorCode->CurrentValue);
		$this->DoctorCode->EditValue = $this->DoctorCode->CurrentValue;
		$this->DoctorCode->PlaceHolder = RemoveHtml($this->DoctorCode->caption());

		// Department
		$this->Department->EditAttrs["class"] = "form-control";
		$this->Department->EditCustomAttributes = "";
		if (!$this->Department->Raw)
			$this->Department->CurrentValue = HtmlDecode($this->Department->CurrentValue);
		$this->Department->EditValue = $this->Department->CurrentValue;
		$this->Department->PlaceHolder = RemoveHtml($this->Department->caption());

		// scheduler_id
		$this->scheduler_id->EditAttrs["class"] = "form-control";
		$this->scheduler_id->EditCustomAttributes = "";
		$this->scheduler_id->EditValue = $this->scheduler_id->CurrentValue;
		$this->scheduler_id->ViewCustomAttributes = "";

		// text
		$this->text->EditAttrs["class"] = "form-control";
		$this->text->EditCustomAttributes = "";
		if (!$this->text->Raw)
			$this->text->CurrentValue = HtmlDecode($this->text->CurrentValue);
		$this->text->EditValue = $this->text->CurrentValue;
		$this->text->PlaceHolder = RemoveHtml($this->text->caption());

		// appointment_status
		$this->appointment_status->EditAttrs["class"] = "form-control";
		$this->appointment_status->EditCustomAttributes = "";
		if (!$this->appointment_status->Raw)
			$this->appointment_status->CurrentValue = HtmlDecode($this->appointment_status->CurrentValue);
		$this->appointment_status->EditValue = $this->appointment_status->CurrentValue;
		$this->appointment_status->PlaceHolder = RemoveHtml($this->appointment_status->caption());

		// PId
		$this->PId->EditAttrs["class"] = "form-control";
		$this->PId->EditCustomAttributes = "";
		$this->PId->EditValue = $this->PId->CurrentValue;
		$this->PId->PlaceHolder = RemoveHtml($this->PId->caption());

		// MobileNumber
		$this->MobileNumber->EditAttrs["class"] = "form-control";
		$this->MobileNumber->EditCustomAttributes = "";
		if (!$this->MobileNumber->Raw)
			$this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
		$this->MobileNumber->EditValue = $this->MobileNumber->CurrentValue;
		$this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

		// SchEmail
		$this->SchEmail->EditAttrs["class"] = "form-control";
		$this->SchEmail->EditCustomAttributes = "";
		if (!$this->SchEmail->Raw)
			$this->SchEmail->CurrentValue = HtmlDecode($this->SchEmail->CurrentValue);
		$this->SchEmail->EditValue = $this->SchEmail->CurrentValue;
		$this->SchEmail->PlaceHolder = RemoveHtml($this->SchEmail->caption());

		// appointment_type
		$this->appointment_type->EditCustomAttributes = "";
		$this->appointment_type->EditValue = $this->appointment_type->options(FALSE);

		// Notified
		$this->Notified->EditCustomAttributes = "";
		$this->Notified->EditValue = $this->Notified->options(FALSE);

		// Purpose
		$this->Purpose->EditAttrs["class"] = "form-control";
		$this->Purpose->EditCustomAttributes = "";
		if (!$this->Purpose->Raw)
			$this->Purpose->CurrentValue = HtmlDecode($this->Purpose->CurrentValue);
		$this->Purpose->EditValue = $this->Purpose->CurrentValue;
		$this->Purpose->PlaceHolder = RemoveHtml($this->Purpose->caption());

		// Notes
		$this->Notes->EditAttrs["class"] = "form-control";
		$this->Notes->EditCustomAttributes = "";
		if (!$this->Notes->Raw)
			$this->Notes->CurrentValue = HtmlDecode($this->Notes->CurrentValue);
		$this->Notes->EditValue = $this->Notes->CurrentValue;
		$this->Notes->PlaceHolder = RemoveHtml($this->Notes->caption());

		// PatientType
		$this->PatientType->EditCustomAttributes = "";
		$this->PatientType->EditValue = $this->PatientType->options(FALSE);

		// Referal
		$this->Referal->EditAttrs["class"] = "form-control";
		$this->Referal->EditCustomAttributes = "";

		// paymentType
		$this->paymentType->EditAttrs["class"] = "form-control";
		$this->paymentType->EditCustomAttributes = "";
		if (!$this->paymentType->Raw)
			$this->paymentType->CurrentValue = HtmlDecode($this->paymentType->CurrentValue);
		$this->paymentType->EditValue = $this->paymentType->CurrentValue;
		$this->paymentType->PlaceHolder = RemoveHtml($this->paymentType->caption());

		// tittle
		$this->tittle->EditAttrs["class"] = "form-control";
		$this->tittle->EditCustomAttributes = "";

		// gendar
		$this->gendar->EditAttrs["class"] = "form-control";
		$this->gendar->EditCustomAttributes = "";

		// Dob
		$this->Dob->EditAttrs["class"] = "form-control";
		$this->Dob->EditCustomAttributes = "";
		if (!$this->Dob->Raw)
			$this->Dob->CurrentValue = HtmlDecode($this->Dob->CurrentValue);
		$this->Dob->EditValue = $this->Dob->CurrentValue;
		$this->Dob->PlaceHolder = RemoveHtml($this->Dob->caption());

		// Age
		$this->Age->EditAttrs["class"] = "form-control";
		$this->Age->EditCustomAttributes = "";
		if (!$this->Age->Raw)
			$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
		$this->Age->EditValue = $this->Age->CurrentValue;
		$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

		// WhereDidYouHear
		$this->WhereDidYouHear->EditCustomAttributes = "";

		// HospID
		// createdBy
		// createdDateTime
		// PatientTypee

		$this->PatientTypee->EditAttrs["class"] = "form-control";
		$this->PatientTypee->EditCustomAttributes = "";

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
					$doc->exportCaption($this->start_date);
					$doc->exportCaption($this->end_date);
					$doc->exportCaption($this->patientID);
					$doc->exportCaption($this->patientName);
					$doc->exportCaption($this->DoctorID);
					$doc->exportCaption($this->DoctorName);
					$doc->exportCaption($this->AppointmentStatus);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->DoctorCode);
					$doc->exportCaption($this->Department);
					$doc->exportCaption($this->scheduler_id);
					$doc->exportCaption($this->text);
					$doc->exportCaption($this->appointment_status);
					$doc->exportCaption($this->PId);
					$doc->exportCaption($this->MobileNumber);
					$doc->exportCaption($this->SchEmail);
					$doc->exportCaption($this->appointment_type);
					$doc->exportCaption($this->Notified);
					$doc->exportCaption($this->Purpose);
					$doc->exportCaption($this->Notes);
					$doc->exportCaption($this->PatientType);
					$doc->exportCaption($this->Referal);
					$doc->exportCaption($this->paymentType);
					$doc->exportCaption($this->tittle);
					$doc->exportCaption($this->gendar);
					$doc->exportCaption($this->Dob);
					$doc->exportCaption($this->Age);
					$doc->exportCaption($this->WhereDidYouHear);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->createdBy);
					$doc->exportCaption($this->createdDateTime);
					$doc->exportCaption($this->PatientTypee);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->start_date);
					$doc->exportCaption($this->end_date);
					$doc->exportCaption($this->patientID);
					$doc->exportCaption($this->patientName);
					$doc->exportCaption($this->DoctorID);
					$doc->exportCaption($this->DoctorName);
					$doc->exportCaption($this->AppointmentStatus);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->DoctorCode);
					$doc->exportCaption($this->Department);
					$doc->exportCaption($this->scheduler_id);
					$doc->exportCaption($this->text);
					$doc->exportCaption($this->appointment_status);
					$doc->exportCaption($this->PId);
					$doc->exportCaption($this->MobileNumber);
					$doc->exportCaption($this->SchEmail);
					$doc->exportCaption($this->appointment_type);
					$doc->exportCaption($this->Notified);
					$doc->exportCaption($this->Purpose);
					$doc->exportCaption($this->Notes);
					$doc->exportCaption($this->PatientType);
					$doc->exportCaption($this->Referal);
					$doc->exportCaption($this->paymentType);
					$doc->exportCaption($this->WhereDidYouHear);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->createdBy);
					$doc->exportCaption($this->createdDateTime);
					$doc->exportCaption($this->PatientTypee);
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
						$doc->exportField($this->start_date);
						$doc->exportField($this->end_date);
						$doc->exportField($this->patientID);
						$doc->exportField($this->patientName);
						$doc->exportField($this->DoctorID);
						$doc->exportField($this->DoctorName);
						$doc->exportField($this->AppointmentStatus);
						$doc->exportField($this->status);
						$doc->exportField($this->DoctorCode);
						$doc->exportField($this->Department);
						$doc->exportField($this->scheduler_id);
						$doc->exportField($this->text);
						$doc->exportField($this->appointment_status);
						$doc->exportField($this->PId);
						$doc->exportField($this->MobileNumber);
						$doc->exportField($this->SchEmail);
						$doc->exportField($this->appointment_type);
						$doc->exportField($this->Notified);
						$doc->exportField($this->Purpose);
						$doc->exportField($this->Notes);
						$doc->exportField($this->PatientType);
						$doc->exportField($this->Referal);
						$doc->exportField($this->paymentType);
						$doc->exportField($this->tittle);
						$doc->exportField($this->gendar);
						$doc->exportField($this->Dob);
						$doc->exportField($this->Age);
						$doc->exportField($this->WhereDidYouHear);
						$doc->exportField($this->HospID);
						$doc->exportField($this->createdBy);
						$doc->exportField($this->createdDateTime);
						$doc->exportField($this->PatientTypee);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->start_date);
						$doc->exportField($this->end_date);
						$doc->exportField($this->patientID);
						$doc->exportField($this->patientName);
						$doc->exportField($this->DoctorID);
						$doc->exportField($this->DoctorName);
						$doc->exportField($this->AppointmentStatus);
						$doc->exportField($this->status);
						$doc->exportField($this->DoctorCode);
						$doc->exportField($this->Department);
						$doc->exportField($this->scheduler_id);
						$doc->exportField($this->text);
						$doc->exportField($this->appointment_status);
						$doc->exportField($this->PId);
						$doc->exportField($this->MobileNumber);
						$doc->exportField($this->SchEmail);
						$doc->exportField($this->appointment_type);
						$doc->exportField($this->Notified);
						$doc->exportField($this->Purpose);
						$doc->exportField($this->Notes);
						$doc->exportField($this->PatientType);
						$doc->exportField($this->Referal);
						$doc->exportField($this->paymentType);
						$doc->exportField($this->WhereDidYouHear);
						$doc->exportField($this->HospID);
						$doc->exportField($this->createdBy);
						$doc->exportField($this->createdDateTime);
						$doc->exportField($this->PatientTypee);
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

	// Get file data
	public function getFileData($fldparm, $key, $resize, $width = 0, $height = 0)
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

			if ($rsnew["PatientType"] == null)
			{
				return false;
			}
				if ($rsnew["PatientType"] == "New")
				{
				   $ApppatientName =  $rsnew["patientName"];
					   $AppMobileNumber = $rsnew["MobileNumber"];
					   $Apptittle = $rsnew["tittle"];
					   $Appgendar = $rsnew["gendar"];
					   $AppReferal = $rsnew["Referal"];
					   $AppReferalNotes = $rsnew["Notes"];
					   $AppDoctorName = $rsnew["DoctorName"];
					   $AppDoctorID = $rsnew["DoctorID"];
					   $AppDob = $rsnew["Dob"];
					   if($AppDob=="")
					   {
						   $AppDob = null;
					   }else{
						   $AppDobb =  date_format($AppDob,"d/m/Y");
						   $newDate = date("Y-m-d", strtotime($AppDob));
						   $var = $AppDob;
						   $date = str_replace('/', '-', $var);
						   $hhh = date('Y-m-d', strtotime($date));
					   }
					   $AppAge = $rsnew["Age"];
					   if($AppAge == "")
					   {
						   $AppAge = " ";
					   }
					   			if($Appgendar==1)
								{

									//$rsnew["gendar"] =  'Male';
									$Appgendar = 'Male';
								}else{

									//$rsnew["gendar"] =  'Female';
									$Appgendar = 'Female';
								}
					   $dbhelper = &DbHelper();
					   $sql = "SELECT * FROM ganeshkumar_bjhims.mas_reference_type where id='".$AppReferal."';";
						$rs = $dbhelper->LoadRecordset($sql);
						while (!$rs->EOF) {
							$row = &$rs->fields;
							$DRreference =  $row["reference"];
							$DRReferMobileNo =  $row["ReferMobileNo"];
							$DRReferClinicname =  $row["ReferClinicname"];
							$DRReferCity =  $row["ReferCity"];
							$rs->MoveNext();
						}
						$hhhospID = HospitalID();
						$UserProfile = new UserProfile();
						$id =  $UserProfile->Profile['id'];
						$HospID =  $UserProfile->Profile['HospID'];
						$hospital_PreFixCode = $UserProfile->Profile['hospital_PreFixCode'];
						if($hospital_PreFixCode == "")
						{
							getHospitalDetails($HospID);
							$UserProfile = new UserProfile();
							$hospital_PreFixCode = $UserProfile->Profile['hospital_PreFixCode'];
						}
						if($hhhospID == '2')
						{
							$patieentID =  'APP' . getAPPID($HospID);
							if($AppDob == null)
							{
								$sqlinsert = "INSERT INTO `ganeshkumar_bjhims`.`patient_app` (`Age`, `PatientID`, `title`, `first_name`, `gender`, `mobile_no`, `HospID`,`createddatetime`) VALUES ('".$AppAge."', '".$patieentID."', '".$Apptittle."', '".$ApppatientName."', '".$Appgendar."', '".$AppMobileNumber."', '".$hhhospID."',NOW());";
							}else{
								$sqlinsert = "INSERT INTO `ganeshkumar_bjhims`.`patient_app` (`Dob`, `Age`, `PatientID`, `title`, `first_name`, `gender`, `mobile_no`, `HospID`,`createddatetime`) VALUES ('".$hhh."', '".$AppAge."', '".$patieentID."', '".$Apptittle."', '".$ApppatientName."', '".$Appgendar."', '".$AppMobileNumber."', '".$hhhospID."',NOW());";
							}
						}else{
							$patieentID =  $hospital_PreFixCode . getPatientID($HospID);
							if($AppDob == null)
							{
								$sqlinsert = "INSERT INTO `ganeshkumar_bjhims`.`patient` (`Age`, `PatientID`, `title`, `first_name`, `gender`, `mobile_no`, `HospID`,`createddatetime`) VALUES ('".$AppAge."', '".$patieentID."', '".$Apptittle."', '".$ApppatientName."', '".$Appgendar."', '".$AppMobileNumber."', '".$hhhospID."',NOW());";
							}else{
								$sqlinsert = "INSERT INTO `ganeshkumar_bjhims`.`patient` (`Dob`, `Age`, `PatientID`, `title`, `first_name`, `gender`, `mobile_no`, `HospID`,`createddatetime`) VALUES ('".$hhh."', '".$AppAge."', '".$patieentID."', '".$Apptittle."', '".$ApppatientName."', '".$Appgendar."', '".$AppMobileNumber."', '".$hhhospID."',NOW());";
							}
						}
						$dbhelper->Execute($sqlinsert);
						$sql = "SELECT * FROM ganeshkumar_bjhims.patient where PatientID='".$patieentID."' and mobile_no='".$AppMobileNumber."';";
						$rs = $dbhelper->LoadRecordset($sql);
						while (!$rs->EOF) {
							$row = &$rs->fields;
							$AddPatID =  $row["id"];
							$rs->MoveNext();
						}
						$rsnew["PId"] = $AddPatID;
						$rsnew["patientID"] = $patieentID;
						$UserProfile = new UserProfile();
						$id =  $UserProfile->Profile['id'];
						$HospID =  $UserProfile->Profile['HospID'];
						$hospital_PreFixCode = $UserProfile->Profile['hospital_PreFixCode'];
						if($hospital_PreFixCode == "")
						{
							getHospitalDetails($HospID);
							$UserProfile = new UserProfile();
							$hospital_PreFixCode = $UserProfile->Profile['hospital_PreFixCode'];
						}
						$getMrnNOOO =  $hospital_PreFixCode . 'MRN'. getmrnNo($HospID);

					//	$sqlvistinsert = "INSERT INTO `ganeshkumar_bjhims`.`ip_admission` (`age`, `mrnNo`, `patient_id`, `patient_name`, `profilePic`, `gender`, `physician_id`, `typeRegsisteration`, `PaymentCategory`, `admission_date`, `PaymentStatus`, `status`, `createddatetime`, `PatientID`, `HospID`, `ReferedByDr`, `ReferClinicname`, `ReferCity`, `ReferMobileNo`, `ReferA4TreatingConsultant`, `PurposreReferredfor`, `mobileno`) VALUES ( '".$AppAge."', '".$getMrnNOOO."', '".$AddPatID."', '".$ApppatientName."', 'hims\\profile-picture.png', '".$Appgendar."', '".$AppDoctorID."', 'op', 'Self', '".$rsnew["start_date"]."', '2', '1', NOW(), '".$patieentID."', '".$hhhospID."', '".$DRreference."', '".$DRReferClinicname."', '".$DRReferCity."', '".$DRReferMobileNo."', '".$AppDoctorName."', '".$AppReferalNotes."', '".$AppMobileNumber."');";
					//	$dbhelper->Execute($sqlvistinsert);

				}
				if($rsnew["patientID"] == '')
				{
					return FALSE;
				}
				 if( $rsnew["PatientType"] == 'Old')
					{
						$ApppatientName =  $rsnew["patientName"];
						$AppMobileNumber = $rsnew["MobileNumber"];
						$Apptittle = $rsnew["tittle"];
						$Appgendar = $rsnew["gendar"];
						$AppReferal = $rsnew["Referal"];
						$AppReferalNotes = $rsnew["Notes"];
						$AppDoctorName = $rsnew["DoctorName"];
						$AppDoctorID = $rsnew["DoctorID"];
						$dbhelper = &DbHelper();
						$sql = "SELECT * FROM ganeshkumar_bjhims.mas_reference_type where id='".$AppReferal."';";
						$rs = $dbhelper->LoadRecordset($sql);
						while (!$rs->EOF) {
							$row = &$rs->fields;
							$DRreference =  $row["reference"];
							$DRReferMobileNo =  $row["ReferMobileNo"];
							$DRReferClinicname =  $row["ReferClinicname"];
							$DRReferCity =  $row["ReferCity"];
							$rs->MoveNext();
						}
						$hhhospID = HospitalID();
						$AddPatID  = $rsnew["PId"];
						$patieentID = $rsnew["patientID"];
						$dbhelper->Execute($sqlinsert);
						$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$AddPatID."' and PatientID='".$patieentID."' and mobile_no='".$AppMobileNumber."';";
						$rs = $dbhelper->LoadRecordset($sql);
						while (!$rs->EOF) {
							$row = &$rs->fields;
							$AddPatID =  $row["id"];
							if($Appgendar == '')
							{
								if($row["gender"]==1)
								{
									$rsnew["gendar"] =  'Male';
									$Appgendar = 'Male';
								}else{
									$rsnew["gendar"] =  'Female';
									$Appgendar = 'Female';
								}
							}
							$APatIDdob =  $row["dob"];
							if($APatIDdob == null)
							{
								$AddAge =  ' ';
							}else{
								try{
									$bday = new \DateTime($APatIDdob); // Your date of birth
									$today = new \Datetime(date('Y-m-d'));
									$diff = $today->diff($bday);
									if( $diff->y <= 1)
									{
										$years = ' year, ';
									}else {
										$years = ' years, ';
									}
									if( $diff->m <= 1)
									{
										$months = ' month';
									}else {
										$months = ' months';
									}
									if( $diff->d <= 1)
									{
										$days = ' day old.';
									}else {
										$days = ' days old.';
									}
									if($diff->y < 5)
									{
										$AddAge = $diff->y .$years. $diff->m . $months.' , and '. $diff->d . $days;
									}else{
										$AddAge = $diff->y .$years. $diff->m . $months .' old.';
									}
								}catch (Exception $e){
								}
							}
							$rs->MoveNext();
						}
						$hhhospID = HospitalID();
						$UserProfile = new UserProfile();
						$id =  $UserProfile->Profile['id'];
						$HospID =  $UserProfile->Profile['HospID'];
						$hospital_PreFixCode = $UserProfile->Profile['hospital_PreFixCode'];
						if($hospital_PreFixCode == "")
						{
							getHospitalDetails($HospID);
							$UserProfile = new UserProfile();
							$hospital_PreFixCode = $UserProfile->Profile['hospital_PreFixCode'];
						}
						$getMrnNOOO =  $hospital_PreFixCode . 'MRN'. getmrnNo($HospID);

					//	$sqlvistinsert = "INSERT INTO `ganeshkumar_bjhims`.`ip_admission` (`age`, `mrnNo`, `patient_id`, `patient_name`, `profilePic`, `gender`, `physician_id`, `typeRegsisteration`, `PaymentCategory`, `admission_date`, `PaymentStatus`, `status`, `createddatetime`, `PatientID`, `HospID`, `ReferedByDr`, `ReferClinicname`, `ReferCity`, `ReferMobileNo`, `ReferA4TreatingConsultant`, `PurposreReferredfor`, `mobileno`) VALUES ('".$AddAge."','".$getMrnNOOO."', '".$AddPatID."', '".$ApppatientName."', 'hims\\profile-picture.png', '".$Appgendar."', '".$AppDoctorID."', 'op', 'Self', '".$rsnew["start_date"]."', '2', '1', NOW(), '".$patieentID."', '".$hhhospID."', '".$DRreference."', '".$DRReferClinicname."', '".$DRReferCity."', '".$DRReferMobileNo."', '".$AppDoctorName."', '".$AppReferalNotes."', '".$AppMobileNumber."');";
					//	$dbhelper->Execute($sqlvistinsert);

					}
		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted($rsold, &$rsnew) {

		//echo "Row Inserted"
		$dbhelper = &DbHelper();
		$sql = "SELECT * FROM ganeshkumar_bjhims.sms_cintent where SMSType='AppointmentMessage' and HospID='".HospitalID()."'; ";
		$results1 = $dbhelper->ExecuteRows($sql);
		if($results1[0]["Enabled"]=="Yes")
		{
			$Content = $results1[0]["Content"];
			$patientName =  $rsnew["patientName"];
			$mobileNumber = $rsnew["MobileNumber"];
			$start_date = $rsnew["start_date"];

			//$AppoinmentTime = date('l jS \of F Y', strtotime($start_date));
			$AppoinmentTime = date('l jS \of F Y - h:i A', strtotime($start_date));
			$Content = str_replace("###PatientName###",$patientName,$Content);
			$message = str_replace("###AppointmentTime###",$AppoinmentTime,$Content);

			//$mobileNumber = "9176191908";
			SendSMS($mobileNumber,$message);
		}
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
	 if($_GET["id"] == '')
	 {
		$this->start_date->CurrentValue = $_GET["startdate"];
		$this->end_date->CurrentValue = $_GET["enddate"];
			$this->DoctorID->CurrentValue = $_GET["Drid"];
			$this->DoctorCode->CurrentValue = $_GET["DRRCODE"];
			$this->DoctorName->CurrentValue = $_GET["DRRNAME"];
			$this->Department->CurrentValue = $_GET["DRRDEPARTMENT"];
	}
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