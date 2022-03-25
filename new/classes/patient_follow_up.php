<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for patient_follow_up
 */
class patient_follow_up extends DbTable
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
	public $MobileNumber;
	public $mrnno;
	public $BP;
	public $Pulse;
	public $Resp;
	public $SPO2;
	public $FollowupAdvice;
	public $NextReviewDate;
	public $Age;
	public $Gender;
	public $profilePic;
	public $Template;
	public $courseinhospital;
	public $procedurenotes;
	public $conditionatdischarge;
	public $Template1;
	public $Template2;
	public $Template3;
	public $HospID;
	public $Reception;
	public $PatientId;
	public $PatientSearch;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'patient_follow_up';
		$this->TableName = 'patient_follow_up';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`patient_follow_up`";
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
		$this->id = new DbField('patient_follow_up', 'patient_follow_up', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// PatID
		$this->PatID = new DbField('patient_follow_up', 'patient_follow_up', 'x_PatID', 'PatID', '`PatID`', '`PatID`', 200, 45, -1, FALSE, '`PatID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatID->Sortable = TRUE; // Allow sort
		$this->fields['PatID'] = &$this->PatID;

		// PatientName
		$this->PatientName = new DbField('patient_follow_up', 'patient_follow_up', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, FALSE, '`PatientName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientName->Sortable = TRUE; // Allow sort
		$this->fields['PatientName'] = &$this->PatientName;

		// MobileNumber
		$this->MobileNumber = new DbField('patient_follow_up', 'patient_follow_up', 'x_MobileNumber', 'MobileNumber', '`MobileNumber`', '`MobileNumber`', 200, 45, -1, FALSE, '`MobileNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MobileNumber->Sortable = TRUE; // Allow sort
		$this->fields['MobileNumber'] = &$this->MobileNumber;

		// mrnno
		$this->mrnno = new DbField('patient_follow_up', 'patient_follow_up', 'x_mrnno', 'mrnno', '`mrnno`', '`mrnno`', 200, 45, -1, FALSE, '`mrnno`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mrnno->IsForeignKey = TRUE; // Foreign key field
		$this->mrnno->Sortable = TRUE; // Allow sort
		$this->fields['mrnno'] = &$this->mrnno;

		// BP
		$this->BP = new DbField('patient_follow_up', 'patient_follow_up', 'x_BP', 'BP', '`BP`', '`BP`', 200, 45, -1, FALSE, '`BP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BP->Sortable = TRUE; // Allow sort
		$this->fields['BP'] = &$this->BP;

		// Pulse
		$this->Pulse = new DbField('patient_follow_up', 'patient_follow_up', 'x_Pulse', 'Pulse', '`Pulse`', '`Pulse`', 200, 45, -1, FALSE, '`Pulse`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Pulse->Sortable = TRUE; // Allow sort
		$this->fields['Pulse'] = &$this->Pulse;

		// Resp
		$this->Resp = new DbField('patient_follow_up', 'patient_follow_up', 'x_Resp', 'Resp', '`Resp`', '`Resp`', 200, 45, -1, FALSE, '`Resp`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Resp->Sortable = TRUE; // Allow sort
		$this->fields['Resp'] = &$this->Resp;

		// SPO2
		$this->SPO2 = new DbField('patient_follow_up', 'patient_follow_up', 'x_SPO2', 'SPO2', '`SPO2`', '`SPO2`', 200, 45, -1, FALSE, '`SPO2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SPO2->Sortable = TRUE; // Allow sort
		$this->fields['SPO2'] = &$this->SPO2;

		// FollowupAdvice
		$this->FollowupAdvice = new DbField('patient_follow_up', 'patient_follow_up', 'x_FollowupAdvice', 'FollowupAdvice', '`FollowupAdvice`', '`FollowupAdvice`', 201, -1, -1, FALSE, '`FollowupAdvice`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->FollowupAdvice->Sortable = TRUE; // Allow sort
		$this->fields['FollowupAdvice'] = &$this->FollowupAdvice;

		// NextReviewDate
		$this->NextReviewDate = new DbField('patient_follow_up', 'patient_follow_up', 'x_NextReviewDate', 'NextReviewDate', '`NextReviewDate`', CastDateFieldForLike("`NextReviewDate`", 7, "DB"), 135, 19, 7, FALSE, '`NextReviewDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NextReviewDate->Sortable = TRUE; // Allow sort
		$this->fields['NextReviewDate'] = &$this->NextReviewDate;

		// Age
		$this->Age = new DbField('patient_follow_up', 'patient_follow_up', 'x_Age', 'Age', '`Age`', '`Age`', 200, 45, -1, FALSE, '`Age`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Age->Sortable = TRUE; // Allow sort
		$this->fields['Age'] = &$this->Age;

		// Gender
		$this->Gender = new DbField('patient_follow_up', 'patient_follow_up', 'x_Gender', 'Gender', '`Gender`', '`Gender`', 200, 45, -1, FALSE, '`Gender`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Gender->Sortable = TRUE; // Allow sort
		$this->fields['Gender'] = &$this->Gender;

		// profilePic
		$this->profilePic = new DbField('patient_follow_up', 'patient_follow_up', 'x_profilePic', 'profilePic', '`profilePic`', '`profilePic`', 201, 450, -1, FALSE, '`profilePic`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->profilePic->Sortable = TRUE; // Allow sort
		$this->fields['profilePic'] = &$this->profilePic;

		// Template
		$this->Template = new DbField('patient_follow_up', 'patient_follow_up', 'x_Template', 'Template', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Template->IsCustom = TRUE; // Custom field
		$this->Template->Sortable = TRUE; // Allow sort
		$this->Template->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Template->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Template->Lookup = new Lookup('Template', 'mas_user_template', FALSE, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_FollowupAdvice"], '', '');
		$this->fields['Template'] = &$this->Template;

		// courseinhospital
		$this->courseinhospital = new DbField('patient_follow_up', 'patient_follow_up', 'x_courseinhospital', 'courseinhospital', '`courseinhospital`', '`courseinhospital`', 201, -1, -1, FALSE, '`courseinhospital`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->courseinhospital->Sortable = TRUE; // Allow sort
		$this->fields['courseinhospital'] = &$this->courseinhospital;

		// procedurenotes
		$this->procedurenotes = new DbField('patient_follow_up', 'patient_follow_up', 'x_procedurenotes', 'procedurenotes', '`procedurenotes`', '`procedurenotes`', 201, -1, -1, FALSE, '`procedurenotes`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->procedurenotes->Sortable = TRUE; // Allow sort
		$this->fields['procedurenotes'] = &$this->procedurenotes;

		// conditionatdischarge
		$this->conditionatdischarge = new DbField('patient_follow_up', 'patient_follow_up', 'x_conditionatdischarge', 'conditionatdischarge', '`conditionatdischarge`', '`conditionatdischarge`', 201, -1, -1, FALSE, '`conditionatdischarge`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->conditionatdischarge->Sortable = TRUE; // Allow sort
		$this->fields['conditionatdischarge'] = &$this->conditionatdischarge;

		// Template1
		$this->Template1 = new DbField('patient_follow_up', 'patient_follow_up', 'x_Template1', 'Template1', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Template1->IsCustom = TRUE; // Custom field
		$this->Template1->Sortable = TRUE; // Allow sort
		$this->Template1->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Template1->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Template1->Lookup = new Lookup('Template1', 'mas_user_template', FALSE, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_courseinhospital"], '', '');
		$this->fields['Template1'] = &$this->Template1;

		// Template2
		$this->Template2 = new DbField('patient_follow_up', 'patient_follow_up', 'x_Template2', 'Template2', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Template2->IsCustom = TRUE; // Custom field
		$this->Template2->Sortable = TRUE; // Allow sort
		$this->Template2->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Template2->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Template2->Lookup = new Lookup('Template2', 'mas_user_template', FALSE, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_procedurenotes"], '', '');
		$this->fields['Template2'] = &$this->Template2;

		// Template3
		$this->Template3 = new DbField('patient_follow_up', 'patient_follow_up', 'x_Template3', 'Template3', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Template3->IsCustom = TRUE; // Custom field
		$this->Template3->Sortable = TRUE; // Allow sort
		$this->Template3->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Template3->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Template3->Lookup = new Lookup('Template3', 'mas_user_template', FALSE, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_conditionatdischarge"], '', '');
		$this->fields['Template3'] = &$this->Template3;

		// HospID
		$this->HospID = new DbField('patient_follow_up', 'patient_follow_up', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HospID'] = &$this->HospID;

		// Reception
		$this->Reception = new DbField('patient_follow_up', 'patient_follow_up', 'x_Reception', 'Reception', '`Reception`', '`Reception`', 200, 45, -1, FALSE, '`Reception`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Reception->IsForeignKey = TRUE; // Foreign key field
		$this->Reception->Sortable = TRUE; // Allow sort
		$this->fields['Reception'] = &$this->Reception;

		// PatientId
		$this->PatientId = new DbField('patient_follow_up', 'patient_follow_up', 'x_PatientId', 'PatientId', '`PatientId`', '`PatientId`', 200, 45, -1, FALSE, '`PatientId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientId->IsForeignKey = TRUE; // Foreign key field
		$this->PatientId->Sortable = TRUE; // Allow sort
		$this->fields['PatientId'] = &$this->PatientId;

		// PatientSearch
		$this->PatientSearch = new DbField('patient_follow_up', 'patient_follow_up', 'x_PatientSearch', 'PatientSearch', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->PatientSearch->IsCustom = TRUE; // Custom field
		$this->PatientSearch->Sortable = TRUE; // Allow sort
		$this->PatientSearch->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->PatientSearch->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
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
		if ($this->getCurrentMasterTable() == "ip_admission") {
			if ($this->Reception->getSessionValue() != "")
				$masterFilter .= "`id`=" . QuotedValue($this->Reception->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->PatientId->getSessionValue() != "")
				$masterFilter .= " AND `patient_id`=" . QuotedValue($this->PatientId->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->mrnno->getSessionValue() != "")
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
			if ($this->Reception->getSessionValue() != "")
				$detailFilter .= "`Reception`=" . QuotedValue($this->Reception->getSessionValue(), DATATYPE_STRING, "DB");
			else
				return "";
			if ($this->PatientId->getSessionValue() != "")
				$detailFilter .= " AND `PatientId`=" . QuotedValue($this->PatientId->getSessionValue(), DATATYPE_STRING, "DB");
			else
				return "";
			if ($this->mrnno->getSessionValue() != "")
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
		return "`Reception`='@Reception@' AND `PatientId`='@PatientId@' AND `mrnno`='@mrnno@'";
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`patient_follow_up`";
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
		return ($this->SqlSelect != "") ? $this->SqlSelect : "SELECT *, '' AS `Template`, '' AS `Template1`, '' AS `Template2`, '' AS `Template3`, '' AS `PatientSearch` FROM " . $this->getSqlFrom();
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
		$this->PatID->DbValue = $row['PatID'];
		$this->PatientName->DbValue = $row['PatientName'];
		$this->MobileNumber->DbValue = $row['MobileNumber'];
		$this->mrnno->DbValue = $row['mrnno'];
		$this->BP->DbValue = $row['BP'];
		$this->Pulse->DbValue = $row['Pulse'];
		$this->Resp->DbValue = $row['Resp'];
		$this->SPO2->DbValue = $row['SPO2'];
		$this->FollowupAdvice->DbValue = $row['FollowupAdvice'];
		$this->NextReviewDate->DbValue = $row['NextReviewDate'];
		$this->Age->DbValue = $row['Age'];
		$this->Gender->DbValue = $row['Gender'];
		$this->profilePic->DbValue = $row['profilePic'];
		$this->Template->DbValue = $row['Template'];
		$this->courseinhospital->DbValue = $row['courseinhospital'];
		$this->procedurenotes->DbValue = $row['procedurenotes'];
		$this->conditionatdischarge->DbValue = $row['conditionatdischarge'];
		$this->Template1->DbValue = $row['Template1'];
		$this->Template2->DbValue = $row['Template2'];
		$this->Template3->DbValue = $row['Template3'];
		$this->HospID->DbValue = $row['HospID'];
		$this->Reception->DbValue = $row['Reception'];
		$this->PatientId->DbValue = $row['PatientId'];
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
			return "patient_follow_uplist.php";
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
		if ($pageName == "patient_follow_upview.php")
			return $Language->phrase("View");
		elseif ($pageName == "patient_follow_upedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "patient_follow_upadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "patient_follow_uplist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("patient_follow_upview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("patient_follow_upview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "patient_follow_upadd.php?" . $this->getUrlParm($parm);
		else
			$url = "patient_follow_upadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("patient_follow_upedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("patient_follow_upadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("patient_follow_updelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		if ($this->getCurrentMasterTable() == "ip_admission" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
			$url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
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
		$this->PatID->setDbValue($rs->fields('PatID'));
		$this->PatientName->setDbValue($rs->fields('PatientName'));
		$this->MobileNumber->setDbValue($rs->fields('MobileNumber'));
		$this->mrnno->setDbValue($rs->fields('mrnno'));
		$this->BP->setDbValue($rs->fields('BP'));
		$this->Pulse->setDbValue($rs->fields('Pulse'));
		$this->Resp->setDbValue($rs->fields('Resp'));
		$this->SPO2->setDbValue($rs->fields('SPO2'));
		$this->FollowupAdvice->setDbValue($rs->fields('FollowupAdvice'));
		$this->NextReviewDate->setDbValue($rs->fields('NextReviewDate'));
		$this->Age->setDbValue($rs->fields('Age'));
		$this->Gender->setDbValue($rs->fields('Gender'));
		$this->profilePic->setDbValue($rs->fields('profilePic'));
		$this->Template->setDbValue($rs->fields('Template'));
		$this->courseinhospital->setDbValue($rs->fields('courseinhospital'));
		$this->procedurenotes->setDbValue($rs->fields('procedurenotes'));
		$this->conditionatdischarge->setDbValue($rs->fields('conditionatdischarge'));
		$this->Template1->setDbValue($rs->fields('Template1'));
		$this->Template2->setDbValue($rs->fields('Template2'));
		$this->Template3->setDbValue($rs->fields('Template3'));
		$this->HospID->setDbValue($rs->fields('HospID'));
		$this->Reception->setDbValue($rs->fields('Reception'));
		$this->PatientId->setDbValue($rs->fields('PatientId'));
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
		// MobileNumber
		// mrnno
		// BP
		// Pulse
		// Resp
		// SPO2
		// FollowupAdvice
		// NextReviewDate
		// Age
		// Gender
		// profilePic
		// Template
		// courseinhospital
		// procedurenotes
		// conditionatdischarge
		// Template1
		// Template2
		// Template3
		// HospID
		// Reception
		// PatientId
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

		// MobileNumber
		$this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
		$this->MobileNumber->ViewCustomAttributes = "";

		// mrnno
		$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
		$this->mrnno->ViewCustomAttributes = "";

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
		$this->NextReviewDate->ViewValue = FormatDateTime($this->NextReviewDate->ViewValue, 7);
		$this->NextReviewDate->ViewCustomAttributes = "";

		// Age
		$this->Age->ViewValue = $this->Age->CurrentValue;
		$this->Age->ViewCustomAttributes = "";

		// Gender
		$this->Gender->ViewValue = $this->Gender->CurrentValue;
		$this->Gender->ViewCustomAttributes = "";

		// profilePic
		$this->profilePic->ViewValue = $this->profilePic->CurrentValue;
		$this->profilePic->ViewCustomAttributes = "";

		// Template
		$curVal = strval($this->Template->CurrentValue);
		if ($curVal != "") {
			$this->Template->ViewValue = $this->Template->lookupCacheOption($curVal);
			if ($this->Template->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$lookupFilter = function() {
					return "`TemplateType`='Follow up Advice'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->Template->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->Template->ViewValue = $this->Template->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Template->ViewValue = $this->Template->CurrentValue;
				}
			}
		} else {
			$this->Template->ViewValue = NULL;
		}
		$this->Template->ViewCustomAttributes = "";

		// courseinhospital
		$this->courseinhospital->ViewValue = $this->courseinhospital->CurrentValue;
		$this->courseinhospital->ViewCustomAttributes = "";

		// procedurenotes
		$this->procedurenotes->ViewValue = $this->procedurenotes->CurrentValue;
		$this->procedurenotes->ViewCustomAttributes = "";

		// conditionatdischarge
		$this->conditionatdischarge->ViewValue = $this->conditionatdischarge->CurrentValue;
		$this->conditionatdischarge->ViewCustomAttributes = "";

		// Template1
		$curVal = strval($this->Template1->CurrentValue);
		if ($curVal != "") {
			$this->Template1->ViewValue = $this->Template1->lookupCacheOption($curVal);
			if ($this->Template1->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$lookupFilter = function() {
					return "`TemplateType`='Course In Hospital'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->Template1->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->Template1->ViewValue = $this->Template1->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Template1->ViewValue = $this->Template1->CurrentValue;
				}
			}
		} else {
			$this->Template1->ViewValue = NULL;
		}
		$this->Template1->ViewCustomAttributes = "";

		// Template2
		$curVal = strval($this->Template2->CurrentValue);
		if ($curVal != "") {
			$this->Template2->ViewValue = $this->Template2->lookupCacheOption($curVal);
			if ($this->Template2->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$lookupFilter = function() {
					return "`TemplateType`='Procedure Notes'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->Template2->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->Template2->ViewValue = $this->Template2->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Template2->ViewValue = $this->Template2->CurrentValue;
				}
			}
		} else {
			$this->Template2->ViewValue = NULL;
		}
		$this->Template2->ViewCustomAttributes = "";

		// Template3
		$curVal = strval($this->Template3->CurrentValue);
		if ($curVal != "") {
			$this->Template3->ViewValue = $this->Template3->lookupCacheOption($curVal);
			if ($this->Template3->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$lookupFilter = function() {
					return "`TemplateType`='Condition at Discharge'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->Template3->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->Template3->ViewValue = $this->Template3->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Template3->ViewValue = $this->Template3->CurrentValue;
				}
			}
		} else {
			$this->Template3->ViewValue = NULL;
		}
		$this->Template3->ViewCustomAttributes = "";

		// HospID
		$this->HospID->ViewValue = $this->HospID->CurrentValue;
		$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
		$this->HospID->ViewCustomAttributes = "";

		// Reception
		$this->Reception->ViewValue = $this->Reception->CurrentValue;
		$this->Reception->ViewCustomAttributes = "";

		// PatientId
		$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
		$this->PatientId->ViewCustomAttributes = "";

		// PatientSearch
		$curVal = strval($this->PatientSearch->CurrentValue);
		if ($curVal != "") {
			$this->PatientSearch->ViewValue = $this->PatientSearch->lookupCacheOption($curVal);
			if ($this->PatientSearch->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->PatientSearch->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
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

		// MobileNumber
		$this->MobileNumber->LinkCustomAttributes = "";
		$this->MobileNumber->HrefValue = "";
		$this->MobileNumber->TooltipValue = "";

		// mrnno
		$this->mrnno->LinkCustomAttributes = "";
		$this->mrnno->HrefValue = "";
		$this->mrnno->TooltipValue = "";

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

		// Template
		$this->Template->LinkCustomAttributes = "";
		$this->Template->HrefValue = "";
		$this->Template->TooltipValue = "";

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

		// Template1
		$this->Template1->LinkCustomAttributes = "";
		$this->Template1->HrefValue = "";
		$this->Template1->TooltipValue = "";

		// Template2
		$this->Template2->LinkCustomAttributes = "";
		$this->Template2->HrefValue = "";
		$this->Template2->TooltipValue = "";

		// Template3
		$this->Template3->LinkCustomAttributes = "";
		$this->Template3->HrefValue = "";
		$this->Template3->TooltipValue = "";

		// HospID
		$this->HospID->LinkCustomAttributes = "";
		$this->HospID->HrefValue = "";
		$this->HospID->TooltipValue = "";

		// Reception
		$this->Reception->LinkCustomAttributes = "";
		$this->Reception->HrefValue = "";
		$this->Reception->TooltipValue = "";

		// PatientId
		$this->PatientId->LinkCustomAttributes = "";
		$this->PatientId->HrefValue = "";
		$this->PatientId->TooltipValue = "";

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
		if (!$this->PatID->Raw)
			$this->PatID->CurrentValue = HtmlDecode($this->PatID->CurrentValue);
		$this->PatID->EditValue = $this->PatID->CurrentValue;
		$this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

		// PatientName
		$this->PatientName->EditAttrs["class"] = "form-control";
		$this->PatientName->EditCustomAttributes = "";
		if (!$this->PatientName->Raw)
			$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
		$this->PatientName->EditValue = $this->PatientName->CurrentValue;
		$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

		// MobileNumber
		$this->MobileNumber->EditAttrs["class"] = "form-control";
		$this->MobileNumber->EditCustomAttributes = "";
		if (!$this->MobileNumber->Raw)
			$this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
		$this->MobileNumber->EditValue = $this->MobileNumber->CurrentValue;
		$this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

		// mrnno
		$this->mrnno->EditAttrs["class"] = "form-control";
		$this->mrnno->EditCustomAttributes = "";
		$this->mrnno->EditValue = $this->mrnno->CurrentValue;
		$this->mrnno->ViewCustomAttributes = "";

		// BP
		$this->BP->EditAttrs["class"] = "form-control";
		$this->BP->EditCustomAttributes = "";
		if (!$this->BP->Raw)
			$this->BP->CurrentValue = HtmlDecode($this->BP->CurrentValue);
		$this->BP->EditValue = $this->BP->CurrentValue;
		$this->BP->PlaceHolder = RemoveHtml($this->BP->caption());

		// Pulse
		$this->Pulse->EditAttrs["class"] = "form-control";
		$this->Pulse->EditCustomAttributes = "";
		if (!$this->Pulse->Raw)
			$this->Pulse->CurrentValue = HtmlDecode($this->Pulse->CurrentValue);
		$this->Pulse->EditValue = $this->Pulse->CurrentValue;
		$this->Pulse->PlaceHolder = RemoveHtml($this->Pulse->caption());

		// Resp
		$this->Resp->EditAttrs["class"] = "form-control";
		$this->Resp->EditCustomAttributes = "";
		if (!$this->Resp->Raw)
			$this->Resp->CurrentValue = HtmlDecode($this->Resp->CurrentValue);
		$this->Resp->EditValue = $this->Resp->CurrentValue;
		$this->Resp->PlaceHolder = RemoveHtml($this->Resp->caption());

		// SPO2
		$this->SPO2->EditAttrs["class"] = "form-control";
		$this->SPO2->EditCustomAttributes = "";
		if (!$this->SPO2->Raw)
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
		$this->NextReviewDate->EditValue = FormatDateTime($this->NextReviewDate->CurrentValue, 7);
		$this->NextReviewDate->PlaceHolder = RemoveHtml($this->NextReviewDate->caption());

		// Age
		$this->Age->EditAttrs["class"] = "form-control";
		$this->Age->EditCustomAttributes = "";
		if (!$this->Age->Raw)
			$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
		$this->Age->EditValue = $this->Age->CurrentValue;
		$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

		// Gender
		$this->Gender->EditAttrs["class"] = "form-control";
		$this->Gender->EditCustomAttributes = "";
		if (!$this->Gender->Raw)
			$this->Gender->CurrentValue = HtmlDecode($this->Gender->CurrentValue);
		$this->Gender->EditValue = $this->Gender->CurrentValue;
		$this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

		// profilePic
		$this->profilePic->EditAttrs["class"] = "form-control";
		$this->profilePic->EditCustomAttributes = "";
		$this->profilePic->EditValue = $this->profilePic->CurrentValue;
		$this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

		// Template
		$this->Template->EditAttrs["class"] = "form-control";
		$this->Template->EditCustomAttributes = "";

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

		// Template1
		$this->Template1->EditAttrs["class"] = "form-control";
		$this->Template1->EditCustomAttributes = "";

		// Template2
		$this->Template2->EditAttrs["class"] = "form-control";
		$this->Template2->EditCustomAttributes = "";

		// Template3
		$this->Template3->EditAttrs["class"] = "form-control";
		$this->Template3->EditCustomAttributes = "";

		// HospID
		// Reception

		$this->Reception->EditAttrs["class"] = "form-control";
		$this->Reception->EditCustomAttributes = "";
		$this->Reception->EditValue = $this->Reception->CurrentValue;
		$this->Reception->ViewCustomAttributes = "";

		// PatientId
		$this->PatientId->EditAttrs["class"] = "form-control";
		$this->PatientId->EditCustomAttributes = "";
		$this->PatientId->EditValue = $this->PatientId->CurrentValue;
		$this->PatientId->ViewCustomAttributes = "";

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
					$doc->exportCaption($this->MobileNumber);
					$doc->exportCaption($this->mrnno);
					$doc->exportCaption($this->BP);
					$doc->exportCaption($this->Pulse);
					$doc->exportCaption($this->Resp);
					$doc->exportCaption($this->SPO2);
					$doc->exportCaption($this->FollowupAdvice);
					$doc->exportCaption($this->NextReviewDate);
					$doc->exportCaption($this->Age);
					$doc->exportCaption($this->Gender);
					$doc->exportCaption($this->profilePic);
					$doc->exportCaption($this->Template);
					$doc->exportCaption($this->courseinhospital);
					$doc->exportCaption($this->procedurenotes);
					$doc->exportCaption($this->conditionatdischarge);
					$doc->exportCaption($this->Template1);
					$doc->exportCaption($this->Template2);
					$doc->exportCaption($this->Template3);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->Reception);
					$doc->exportCaption($this->PatientId);
					$doc->exportCaption($this->PatientSearch);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->PatID);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->MobileNumber);
					$doc->exportCaption($this->mrnno);
					$doc->exportCaption($this->BP);
					$doc->exportCaption($this->Pulse);
					$doc->exportCaption($this->Resp);
					$doc->exportCaption($this->SPO2);
					$doc->exportCaption($this->NextReviewDate);
					$doc->exportCaption($this->Age);
					$doc->exportCaption($this->Gender);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->Reception);
					$doc->exportCaption($this->PatientId);
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
						$doc->exportField($this->MobileNumber);
						$doc->exportField($this->mrnno);
						$doc->exportField($this->BP);
						$doc->exportField($this->Pulse);
						$doc->exportField($this->Resp);
						$doc->exportField($this->SPO2);
						$doc->exportField($this->FollowupAdvice);
						$doc->exportField($this->NextReviewDate);
						$doc->exportField($this->Age);
						$doc->exportField($this->Gender);
						$doc->exportField($this->profilePic);
						$doc->exportField($this->Template);
						$doc->exportField($this->courseinhospital);
						$doc->exportField($this->procedurenotes);
						$doc->exportField($this->conditionatdischarge);
						$doc->exportField($this->Template1);
						$doc->exportField($this->Template2);
						$doc->exportField($this->Template3);
						$doc->exportField($this->HospID);
						$doc->exportField($this->Reception);
						$doc->exportField($this->PatientId);
						$doc->exportField($this->PatientSearch);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->PatID);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->MobileNumber);
						$doc->exportField($this->mrnno);
						$doc->exportField($this->BP);
						$doc->exportField($this->Pulse);
						$doc->exportField($this->Resp);
						$doc->exportField($this->SPO2);
						$doc->exportField($this->NextReviewDate);
						$doc->exportField($this->Age);
						$doc->exportField($this->Gender);
						$doc->exportField($this->HospID);
						$doc->exportField($this->Reception);
						$doc->exportField($this->PatientId);
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