<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for employee
 */
class employee extends DbTable
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
	public $empNo;
	public $tittle;
	public $first_name;
	public $middle_name;
	public $last_name;
	public $gender;
	public $dob;
	public $start_date;
	public $end_date;
	public $employee_role_id;
	public $default_shift_start;
	public $default_shift_end;
	public $working_days;
	public $working_location;
	public $status;
	public $createdby;
	public $createddatetime;
	public $modifiedby;
	public $modifieddatetime;
	public $profilePic;
	public $HospID;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'employee';
		$this->TableName = 'employee';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`employee`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_DEFAULT; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = TRUE; // Allow detail add
		$this->DetailEdit = TRUE; // Allow detail edit
		$this->DetailView = TRUE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = Config("DEFAULT_USER_ID_ALLOW_SECURITY"); // Default User ID allowed permissions
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// id
		$this->id = new DbField('employee', 'employee', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->IsForeignKey = TRUE; // Foreign key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// empNo
		$this->empNo = new DbField('employee', 'employee', 'x_empNo', 'empNo', '`empNo`', '`empNo`', 200, 45, -1, FALSE, '`empNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->empNo->Sortable = TRUE; // Allow sort
		$this->fields['empNo'] = &$this->empNo;

		// tittle
		$this->tittle = new DbField('employee', 'employee', 'x_tittle', 'tittle', '`tittle`', '`tittle`', 3, 11, -1, FALSE, '`tittle`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->tittle->Nullable = FALSE; // NOT NULL field
		$this->tittle->Required = TRUE; // Required field
		$this->tittle->Sortable = TRUE; // Allow sort
		$this->tittle->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->tittle->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->tittle->Lookup = new Lookup('tittle', 'sys_tittle', FALSE, 'id', ["Name","","",""], [], [], [], [], [], [], '', '');
		$this->fields['tittle'] = &$this->tittle;

		// first_name
		$this->first_name = new DbField('employee', 'employee', 'x_first_name', 'first_name', '`first_name`', '`first_name`', 200, 50, -1, FALSE, '`first_name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->first_name->Nullable = FALSE; // NOT NULL field
		$this->first_name->Required = TRUE; // Required field
		$this->first_name->Sortable = TRUE; // Allow sort
		$this->fields['first_name'] = &$this->first_name;

		// middle_name
		$this->middle_name = new DbField('employee', 'employee', 'x_middle_name', 'middle_name', '`middle_name`', '`middle_name`', 200, 200, -1, FALSE, '`middle_name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->middle_name->Sortable = TRUE; // Allow sort
		$this->fields['middle_name'] = &$this->middle_name;

		// last_name
		$this->last_name = new DbField('employee', 'employee', 'x_last_name', 'last_name', '`last_name`', '`last_name`', 200, 50, -1, FALSE, '`last_name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->last_name->Required = TRUE; // Required field
		$this->last_name->Sortable = TRUE; // Allow sort
		$this->fields['last_name'] = &$this->last_name;

		// gender
		$this->gender = new DbField('employee', 'employee', 'x_gender', 'gender', '`gender`', '`gender`', 3, 11, -1, FALSE, '`gender`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->gender->Nullable = FALSE; // NOT NULL field
		$this->gender->Required = TRUE; // Required field
		$this->gender->Sortable = TRUE; // Allow sort
		$this->gender->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->gender->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->gender->Lookup = new Lookup('gender', 'sys_gender', FALSE, 'id', ["Name","","",""], [], [], [], [], [], [], '', '');
		$this->fields['gender'] = &$this->gender;

		// dob
		$this->dob = new DbField('employee', 'employee', 'x_dob', 'dob', '`dob`', CastDateFieldForLike("`dob`", 0, "DB"), 133, 10, 0, FALSE, '`dob`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->dob->Sortable = TRUE; // Allow sort
		$this->dob->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['dob'] = &$this->dob;

		// start_date
		$this->start_date = new DbField('employee', 'employee', 'x_start_date', 'start_date', '`start_date`', CastDateFieldForLike("`start_date`", 0, "DB"), 135, 19, 0, FALSE, '`start_date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->start_date->Sortable = TRUE; // Allow sort
		$this->start_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['start_date'] = &$this->start_date;

		// end_date
		$this->end_date = new DbField('employee', 'employee', 'x_end_date', 'end_date', '`end_date`', CastDateFieldForLike("`end_date`", 0, "DB"), 135, 19, 0, FALSE, '`end_date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->end_date->Sortable = TRUE; // Allow sort
		$this->end_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['end_date'] = &$this->end_date;

		// employee_role_id
		$this->employee_role_id = new DbField('employee', 'employee', 'x_employee_role_id', 'employee_role_id', '`employee_role_id`', '`employee_role_id`', 3, 11, -1, FALSE, '`employee_role_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->employee_role_id->Nullable = FALSE; // NOT NULL field
		$this->employee_role_id->Required = TRUE; // Required field
		$this->employee_role_id->Sortable = TRUE; // Allow sort
		$this->employee_role_id->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->employee_role_id->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->employee_role_id->Lookup = new Lookup('employee_role_id', 'mas_employee_role_job_description', FALSE, 'id', ["role","job_description","",""], [], [], [], [], [], [], '', '');
		$this->employee_role_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['employee_role_id'] = &$this->employee_role_id;

		// default_shift_start
		$this->default_shift_start = new DbField('employee', 'employee', 'x_default_shift_start', 'default_shift_start', '`default_shift_start`', CastDateFieldForLike("`default_shift_start`", 4, "DB"), 134, 10, 4, FALSE, '`default_shift_start`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->default_shift_start->Nullable = FALSE; // NOT NULL field
		$this->default_shift_start->Required = TRUE; // Required field
		$this->default_shift_start->Sortable = TRUE; // Allow sort
		$this->default_shift_start->DefaultErrorMessage = str_replace("%s", $GLOBALS["TIME_SEPARATOR"], $Language->phrase("IncorrectTime"));
		$this->fields['default_shift_start'] = &$this->default_shift_start;

		// default_shift_end
		$this->default_shift_end = new DbField('employee', 'employee', 'x_default_shift_end', 'default_shift_end', '`default_shift_end`', CastDateFieldForLike("`default_shift_end`", 4, "DB"), 134, 10, 4, FALSE, '`default_shift_end`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->default_shift_end->Nullable = FALSE; // NOT NULL field
		$this->default_shift_end->Required = TRUE; // Required field
		$this->default_shift_end->Sortable = TRUE; // Allow sort
		$this->default_shift_end->DefaultErrorMessage = str_replace("%s", $GLOBALS["TIME_SEPARATOR"], $Language->phrase("IncorrectTime"));
		$this->fields['default_shift_end'] = &$this->default_shift_end;

		// working_days
		$this->working_days = new DbField('employee', 'employee', 'x_working_days', 'working_days', '`working_days`', '`working_days`', 200, 7, -1, FALSE, '`working_days`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->working_days->Nullable = FALSE; // NOT NULL field
		$this->working_days->Required = TRUE; // Required field
		$this->working_days->Sortable = TRUE; // Allow sort
		$this->fields['working_days'] = &$this->working_days;

		// working_location
		$this->working_location = new DbField('employee', 'employee', 'x_working_location', 'working_location', '`working_location`', '`working_location`', 3, 11, -1, FALSE, '`working_location`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->working_location->Nullable = FALSE; // NOT NULL field
		$this->working_location->Required = TRUE; // Required field
		$this->working_location->Sortable = TRUE; // Allow sort
		$this->working_location->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->working_location->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->working_location->Lookup = new Lookup('working_location', 'hospital', FALSE, 'id', ["hospital","","",""], [], [], [], [], [], [], '', '');
		$this->working_location->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['working_location'] = &$this->working_location;

		// status
		$this->status = new DbField('employee', 'employee', 'x_status', 'status', '`status`', '`status`', 3, 11, -1, FALSE, '`status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->status->Nullable = FALSE; // NOT NULL field
		$this->status->Required = TRUE; // Required field
		$this->status->Sortable = TRUE; // Allow sort
		$this->status->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->status->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->status->Lookup = new Lookup('status', 'sys_status', FALSE, 'id', ["Name","","",""], [], [], [], [], [], [], '', '');
		$this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['status'] = &$this->status;

		// createdby
		$this->createdby = new DbField('employee', 'employee', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, 11, -1, FALSE, '`createdby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdby->Sortable = FALSE; // Allow sort
		$this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['createdby'] = &$this->createdby;

		// createddatetime
		$this->createddatetime = new DbField('employee', 'employee', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, FALSE, '`createddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = FALSE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['createddatetime'] = &$this->createddatetime;

		// modifiedby
		$this->modifiedby = new DbField('employee', 'employee', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, 11, -1, FALSE, '`modifiedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifiedby->Sortable = FALSE; // Allow sort
		$this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['modifiedby'] = &$this->modifiedby;

		// modifieddatetime
		$this->modifieddatetime = new DbField('employee', 'employee', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, FALSE, '`modifieddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifieddatetime->Sortable = FALSE; // Allow sort
		$this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['modifieddatetime'] = &$this->modifieddatetime;

		// profilePic
		$this->profilePic = new DbField('employee', 'employee', 'x_profilePic', 'profilePic', '`profilePic`', '`profilePic`', 200, 45, -1, TRUE, '`profilePic`', FALSE, FALSE, FALSE, 'IMAGE', 'FILE');
		$this->profilePic->Sortable = TRUE; // Allow sort
		$this->fields['profilePic'] = &$this->profilePic;

		// HospID
		$this->HospID = new DbField('employee', 'employee', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
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
		} else {
			$fld->setSort("");
		}
	}

	// Current detail table name
	public function getCurrentDetailTable()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_DETAIL_TABLE")];
	}
	public function setCurrentDetailTable($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_DETAIL_TABLE")] = $v;
	}

	// Get detail url
	public function getDetailUrl()
	{

		// Detail url
		$detailUrl = "";
		if ($this->getCurrentDetailTable() == "employee_address") {
			$detailUrl = $GLOBALS["employee_address"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
		}
		if ($this->getCurrentDetailTable() == "employee_telephone") {
			$detailUrl = $GLOBALS["employee_telephone"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
		}
		if ($this->getCurrentDetailTable() == "employee_email") {
			$detailUrl = $GLOBALS["employee_email"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
		}
		if ($this->getCurrentDetailTable() == "employee_has_degree") {
			$detailUrl = $GLOBALS["employee_has_degree"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
		}
		if ($this->getCurrentDetailTable() == "employee_has_experience") {
			$detailUrl = $GLOBALS["employee_has_experience"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
		}
		if ($this->getCurrentDetailTable() == "employee_document") {
			$detailUrl = $GLOBALS["employee_document"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
		}
		if ($detailUrl == "")
			$detailUrl = "employeelist.php";
		return $detailUrl;
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`employee`";
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
		return ($this->SqlSelect != "") ? $this->SqlSelect : "SELECT * FROM " . $this->getSqlFrom();
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

		// Cascade Update detail table 'employee_address'
		$cascadeUpdate = FALSE;
		$rscascade = [];
		if ($rsold && (isset($rs['id']) && $rsold['id'] != $rs['id'])) { // Update detail field 'employee_id'
			$cascadeUpdate = TRUE;
			$rscascade['employee_id'] = $rs['id'];
		}
		if ($cascadeUpdate) {
			if (!isset($GLOBALS["employee_address"]))
				$GLOBALS["employee_address"] = new employee_address();
			$rswrk = $GLOBALS["employee_address"]->loadRs("`employee_id` = " . QuotedValue($rsold['id'], DATATYPE_NUMBER, 'DB'));
			while ($rswrk && !$rswrk->EOF) {
				$rskey = [];
				$fldname = 'id';
				$rskey[$fldname] = $rswrk->fields[$fldname];
				$rsdtlold = &$rswrk->fields;
				$rsdtlnew = array_merge($rsdtlold, $rscascade);

				// Call Row_Updating event
				$success = $GLOBALS["employee_address"]->Row_Updating($rsdtlold, $rsdtlnew);
				if ($success)
					$success = $GLOBALS["employee_address"]->update($rscascade, $rskey, $rswrk->fields);
				if (!$success)
					return FALSE;

				// Call Row_Updated event
				$GLOBALS["employee_address"]->Row_Updated($rsdtlold, $rsdtlnew);
				$rswrk->moveNext();
			}
		}

		// Cascade Update detail table 'employee_telephone'
		$cascadeUpdate = FALSE;
		$rscascade = [];
		if ($rsold && (isset($rs['id']) && $rsold['id'] != $rs['id'])) { // Update detail field 'employee_id'
			$cascadeUpdate = TRUE;
			$rscascade['employee_id'] = $rs['id'];
		}
		if ($cascadeUpdate) {
			if (!isset($GLOBALS["employee_telephone"]))
				$GLOBALS["employee_telephone"] = new employee_telephone();
			$rswrk = $GLOBALS["employee_telephone"]->loadRs("`employee_id` = " . QuotedValue($rsold['id'], DATATYPE_NUMBER, 'DB'));
			while ($rswrk && !$rswrk->EOF) {
				$rskey = [];
				$fldname = 'id';
				$rskey[$fldname] = $rswrk->fields[$fldname];
				$rsdtlold = &$rswrk->fields;
				$rsdtlnew = array_merge($rsdtlold, $rscascade);

				// Call Row_Updating event
				$success = $GLOBALS["employee_telephone"]->Row_Updating($rsdtlold, $rsdtlnew);
				if ($success)
					$success = $GLOBALS["employee_telephone"]->update($rscascade, $rskey, $rswrk->fields);
				if (!$success)
					return FALSE;

				// Call Row_Updated event
				$GLOBALS["employee_telephone"]->Row_Updated($rsdtlold, $rsdtlnew);
				$rswrk->moveNext();
			}
		}

		// Cascade Update detail table 'employee_email'
		$cascadeUpdate = FALSE;
		$rscascade = [];
		if ($rsold && (isset($rs['id']) && $rsold['id'] != $rs['id'])) { // Update detail field 'employee_id'
			$cascadeUpdate = TRUE;
			$rscascade['employee_id'] = $rs['id'];
		}
		if ($cascadeUpdate) {
			if (!isset($GLOBALS["employee_email"]))
				$GLOBALS["employee_email"] = new employee_email();
			$rswrk = $GLOBALS["employee_email"]->loadRs("`employee_id` = " . QuotedValue($rsold['id'], DATATYPE_NUMBER, 'DB'));
			while ($rswrk && !$rswrk->EOF) {
				$rskey = [];
				$fldname = 'id';
				$rskey[$fldname] = $rswrk->fields[$fldname];
				$rsdtlold = &$rswrk->fields;
				$rsdtlnew = array_merge($rsdtlold, $rscascade);

				// Call Row_Updating event
				$success = $GLOBALS["employee_email"]->Row_Updating($rsdtlold, $rsdtlnew);
				if ($success)
					$success = $GLOBALS["employee_email"]->update($rscascade, $rskey, $rswrk->fields);
				if (!$success)
					return FALSE;

				// Call Row_Updated event
				$GLOBALS["employee_email"]->Row_Updated($rsdtlold, $rsdtlnew);
				$rswrk->moveNext();
			}
		}

		// Cascade Update detail table 'employee_has_degree'
		$cascadeUpdate = FALSE;
		$rscascade = [];
		if ($rsold && (isset($rs['id']) && $rsold['id'] != $rs['id'])) { // Update detail field 'employee_id'
			$cascadeUpdate = TRUE;
			$rscascade['employee_id'] = $rs['id'];
		}
		if ($cascadeUpdate) {
			if (!isset($GLOBALS["employee_has_degree"]))
				$GLOBALS["employee_has_degree"] = new employee_has_degree();
			$rswrk = $GLOBALS["employee_has_degree"]->loadRs("`employee_id` = " . QuotedValue($rsold['id'], DATATYPE_NUMBER, 'DB'));
			while ($rswrk && !$rswrk->EOF) {
				$rskey = [];
				$fldname = 'id';
				$rskey[$fldname] = $rswrk->fields[$fldname];
				$rsdtlold = &$rswrk->fields;
				$rsdtlnew = array_merge($rsdtlold, $rscascade);

				// Call Row_Updating event
				$success = $GLOBALS["employee_has_degree"]->Row_Updating($rsdtlold, $rsdtlnew);
				if ($success)
					$success = $GLOBALS["employee_has_degree"]->update($rscascade, $rskey, $rswrk->fields);
				if (!$success)
					return FALSE;

				// Call Row_Updated event
				$GLOBALS["employee_has_degree"]->Row_Updated($rsdtlold, $rsdtlnew);
				$rswrk->moveNext();
			}
		}

		// Cascade Update detail table 'employee_has_experience'
		$cascadeUpdate = FALSE;
		$rscascade = [];
		if ($rsold && (isset($rs['id']) && $rsold['id'] != $rs['id'])) { // Update detail field 'employee_id'
			$cascadeUpdate = TRUE;
			$rscascade['employee_id'] = $rs['id'];
		}
		if ($cascadeUpdate) {
			if (!isset($GLOBALS["employee_has_experience"]))
				$GLOBALS["employee_has_experience"] = new employee_has_experience();
			$rswrk = $GLOBALS["employee_has_experience"]->loadRs("`employee_id` = " . QuotedValue($rsold['id'], DATATYPE_NUMBER, 'DB'));
			while ($rswrk && !$rswrk->EOF) {
				$rskey = [];
				$fldname = 'id';
				$rskey[$fldname] = $rswrk->fields[$fldname];
				$rsdtlold = &$rswrk->fields;
				$rsdtlnew = array_merge($rsdtlold, $rscascade);

				// Call Row_Updating event
				$success = $GLOBALS["employee_has_experience"]->Row_Updating($rsdtlold, $rsdtlnew);
				if ($success)
					$success = $GLOBALS["employee_has_experience"]->update($rscascade, $rskey, $rswrk->fields);
				if (!$success)
					return FALSE;

				// Call Row_Updated event
				$GLOBALS["employee_has_experience"]->Row_Updated($rsdtlold, $rsdtlnew);
				$rswrk->moveNext();
			}
		}

		// Cascade Update detail table 'employee_document'
		$cascadeUpdate = FALSE;
		$rscascade = [];
		if ($rsold && (isset($rs['id']) && $rsold['id'] != $rs['id'])) { // Update detail field 'employee_id'
			$cascadeUpdate = TRUE;
			$rscascade['employee_id'] = $rs['id'];
		}
		if ($cascadeUpdate) {
			if (!isset($GLOBALS["employee_document"]))
				$GLOBALS["employee_document"] = new employee_document();
			$rswrk = $GLOBALS["employee_document"]->loadRs("`employee_id` = " . QuotedValue($rsold['id'], DATATYPE_NUMBER, 'DB'));
			while ($rswrk && !$rswrk->EOF) {
				$rskey = [];
				$fldname = 'id';
				$rskey[$fldname] = $rswrk->fields[$fldname];
				$rsdtlold = &$rswrk->fields;
				$rsdtlnew = array_merge($rsdtlold, $rscascade);

				// Call Row_Updating event
				$success = $GLOBALS["employee_document"]->Row_Updating($rsdtlold, $rsdtlnew);
				if ($success)
					$success = $GLOBALS["employee_document"]->update($rscascade, $rskey, $rswrk->fields);
				if (!$success)
					return FALSE;

				// Call Row_Updated event
				$GLOBALS["employee_document"]->Row_Updated($rsdtlold, $rsdtlnew);
				$rswrk->moveNext();
			}
		}
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

		// Cascade delete detail table 'employee_address'
		if (!isset($GLOBALS["employee_address"]))
			$GLOBALS["employee_address"] = new employee_address();
		$rscascade = $GLOBALS["employee_address"]->loadRs("`employee_id` = " . QuotedValue($rs['id'], DATATYPE_NUMBER, "DB"));
		$dtlrows = ($rscascade) ? $rscascade->getRows() : [];

		// Call Row Deleting event
		foreach ($dtlrows as $dtlrow) {
			$success = $GLOBALS["employee_address"]->Row_Deleting($dtlrow);
			if (!$success)
				break;
		}
		if ($success) {
			foreach ($dtlrows as $dtlrow) {
				$success = $GLOBALS["employee_address"]->delete($dtlrow); // Delete
				if (!$success)
					break;
			}
		}

		// Call Row Deleted event
		if ($success) {
			foreach ($dtlrows as $dtlrow)
				$GLOBALS["employee_address"]->Row_Deleted($dtlrow);
		}

		// Cascade delete detail table 'employee_telephone'
		if (!isset($GLOBALS["employee_telephone"]))
			$GLOBALS["employee_telephone"] = new employee_telephone();
		$rscascade = $GLOBALS["employee_telephone"]->loadRs("`employee_id` = " . QuotedValue($rs['id'], DATATYPE_NUMBER, "DB"));
		$dtlrows = ($rscascade) ? $rscascade->getRows() : [];

		// Call Row Deleting event
		foreach ($dtlrows as $dtlrow) {
			$success = $GLOBALS["employee_telephone"]->Row_Deleting($dtlrow);
			if (!$success)
				break;
		}
		if ($success) {
			foreach ($dtlrows as $dtlrow) {
				$success = $GLOBALS["employee_telephone"]->delete($dtlrow); // Delete
				if (!$success)
					break;
			}
		}

		// Call Row Deleted event
		if ($success) {
			foreach ($dtlrows as $dtlrow)
				$GLOBALS["employee_telephone"]->Row_Deleted($dtlrow);
		}

		// Cascade delete detail table 'employee_email'
		if (!isset($GLOBALS["employee_email"]))
			$GLOBALS["employee_email"] = new employee_email();
		$rscascade = $GLOBALS["employee_email"]->loadRs("`employee_id` = " . QuotedValue($rs['id'], DATATYPE_NUMBER, "DB"));
		$dtlrows = ($rscascade) ? $rscascade->getRows() : [];

		// Call Row Deleting event
		foreach ($dtlrows as $dtlrow) {
			$success = $GLOBALS["employee_email"]->Row_Deleting($dtlrow);
			if (!$success)
				break;
		}
		if ($success) {
			foreach ($dtlrows as $dtlrow) {
				$success = $GLOBALS["employee_email"]->delete($dtlrow); // Delete
				if (!$success)
					break;
			}
		}

		// Call Row Deleted event
		if ($success) {
			foreach ($dtlrows as $dtlrow)
				$GLOBALS["employee_email"]->Row_Deleted($dtlrow);
		}

		// Cascade delete detail table 'employee_has_degree'
		if (!isset($GLOBALS["employee_has_degree"]))
			$GLOBALS["employee_has_degree"] = new employee_has_degree();
		$rscascade = $GLOBALS["employee_has_degree"]->loadRs("`employee_id` = " . QuotedValue($rs['id'], DATATYPE_NUMBER, "DB"));
		$dtlrows = ($rscascade) ? $rscascade->getRows() : [];

		// Call Row Deleting event
		foreach ($dtlrows as $dtlrow) {
			$success = $GLOBALS["employee_has_degree"]->Row_Deleting($dtlrow);
			if (!$success)
				break;
		}
		if ($success) {
			foreach ($dtlrows as $dtlrow) {
				$success = $GLOBALS["employee_has_degree"]->delete($dtlrow); // Delete
				if (!$success)
					break;
			}
		}

		// Call Row Deleted event
		if ($success) {
			foreach ($dtlrows as $dtlrow)
				$GLOBALS["employee_has_degree"]->Row_Deleted($dtlrow);
		}

		// Cascade delete detail table 'employee_has_experience'
		if (!isset($GLOBALS["employee_has_experience"]))
			$GLOBALS["employee_has_experience"] = new employee_has_experience();
		$rscascade = $GLOBALS["employee_has_experience"]->loadRs("`employee_id` = " . QuotedValue($rs['id'], DATATYPE_NUMBER, "DB"));
		$dtlrows = ($rscascade) ? $rscascade->getRows() : [];

		// Call Row Deleting event
		foreach ($dtlrows as $dtlrow) {
			$success = $GLOBALS["employee_has_experience"]->Row_Deleting($dtlrow);
			if (!$success)
				break;
		}
		if ($success) {
			foreach ($dtlrows as $dtlrow) {
				$success = $GLOBALS["employee_has_experience"]->delete($dtlrow); // Delete
				if (!$success)
					break;
			}
		}

		// Call Row Deleted event
		if ($success) {
			foreach ($dtlrows as $dtlrow)
				$GLOBALS["employee_has_experience"]->Row_Deleted($dtlrow);
		}

		// Cascade delete detail table 'employee_document'
		if (!isset($GLOBALS["employee_document"]))
			$GLOBALS["employee_document"] = new employee_document();
		$rscascade = $GLOBALS["employee_document"]->loadRs("`employee_id` = " . QuotedValue($rs['id'], DATATYPE_NUMBER, "DB"));
		$dtlrows = ($rscascade) ? $rscascade->getRows() : [];

		// Call Row Deleting event
		foreach ($dtlrows as $dtlrow) {
			$success = $GLOBALS["employee_document"]->Row_Deleting($dtlrow);
			if (!$success)
				break;
		}
		if ($success) {
			foreach ($dtlrows as $dtlrow) {
				$success = $GLOBALS["employee_document"]->delete($dtlrow); // Delete
				if (!$success)
					break;
			}
		}

		// Call Row Deleted event
		if ($success) {
			foreach ($dtlrows as $dtlrow)
				$GLOBALS["employee_document"]->Row_Deleted($dtlrow);
		}
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
		$this->empNo->DbValue = $row['empNo'];
		$this->tittle->DbValue = $row['tittle'];
		$this->first_name->DbValue = $row['first_name'];
		$this->middle_name->DbValue = $row['middle_name'];
		$this->last_name->DbValue = $row['last_name'];
		$this->gender->DbValue = $row['gender'];
		$this->dob->DbValue = $row['dob'];
		$this->start_date->DbValue = $row['start_date'];
		$this->end_date->DbValue = $row['end_date'];
		$this->employee_role_id->DbValue = $row['employee_role_id'];
		$this->default_shift_start->DbValue = $row['default_shift_start'];
		$this->default_shift_end->DbValue = $row['default_shift_end'];
		$this->working_days->DbValue = $row['working_days'];
		$this->working_location->DbValue = $row['working_location'];
		$this->status->DbValue = $row['status'];
		$this->createdby->DbValue = $row['createdby'];
		$this->createddatetime->DbValue = $row['createddatetime'];
		$this->modifiedby->DbValue = $row['modifiedby'];
		$this->modifieddatetime->DbValue = $row['modifieddatetime'];
		$this->profilePic->Upload->DbValue = $row['profilePic'];
		$this->HospID->DbValue = $row['HospID'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
		$oldFiles = EmptyValue($row['profilePic']) ? [] : [$row['profilePic']];
		foreach ($oldFiles as $oldFile) {
			if (file_exists($this->profilePic->oldPhysicalUploadPath() . $oldFile))
				@unlink($this->profilePic->oldPhysicalUploadPath() . $oldFile);
		}
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
			return "employeelist.php";
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
		if ($pageName == "employeeview.php")
			return $Language->phrase("View");
		elseif ($pageName == "employeeedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "employeeadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "employeelist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("employeeview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("employeeview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "employeeadd.php?" . $this->getUrlParm($parm);
		else
			$url = "employeeadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("employeeedit.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("employeeedit.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
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
		if ($parm != "")
			$url = $this->keyUrl("employeeadd.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("employeeadd.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
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
		return $this->keyUrl("employeedelete.php", $this->getUrlParm());
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
		$this->empNo->setDbValue($rs->fields('empNo'));
		$this->tittle->setDbValue($rs->fields('tittle'));
		$this->first_name->setDbValue($rs->fields('first_name'));
		$this->middle_name->setDbValue($rs->fields('middle_name'));
		$this->last_name->setDbValue($rs->fields('last_name'));
		$this->gender->setDbValue($rs->fields('gender'));
		$this->dob->setDbValue($rs->fields('dob'));
		$this->start_date->setDbValue($rs->fields('start_date'));
		$this->end_date->setDbValue($rs->fields('end_date'));
		$this->employee_role_id->setDbValue($rs->fields('employee_role_id'));
		$this->default_shift_start->setDbValue($rs->fields('default_shift_start'));
		$this->default_shift_end->setDbValue($rs->fields('default_shift_end'));
		$this->working_days->setDbValue($rs->fields('working_days'));
		$this->working_location->setDbValue($rs->fields('working_location'));
		$this->status->setDbValue($rs->fields('status'));
		$this->createdby->setDbValue($rs->fields('createdby'));
		$this->createddatetime->setDbValue($rs->fields('createddatetime'));
		$this->modifiedby->setDbValue($rs->fields('modifiedby'));
		$this->modifieddatetime->setDbValue($rs->fields('modifieddatetime'));
		$this->profilePic->Upload->DbValue = $rs->fields('profilePic');
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
		// empNo
		// tittle
		// first_name
		// middle_name
		// last_name
		// gender
		// dob
		// start_date
		// end_date
		// employee_role_id
		// default_shift_start
		// default_shift_end
		// working_days
		// working_location
		// status
		// createdby

		$this->createdby->CellCssStyle = "white-space: nowrap;";

		// createddatetime
		$this->createddatetime->CellCssStyle = "white-space: nowrap;";

		// modifiedby
		$this->modifiedby->CellCssStyle = "white-space: nowrap;";

		// modifieddatetime
		$this->modifieddatetime->CellCssStyle = "white-space: nowrap;";

		// profilePic
		// HospID
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// empNo
		$this->empNo->ViewValue = $this->empNo->CurrentValue;
		$this->empNo->ViewCustomAttributes = "";

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

		// first_name
		$this->first_name->ViewValue = $this->first_name->CurrentValue;
		$this->first_name->ViewCustomAttributes = "";

		// middle_name
		$this->middle_name->ViewValue = $this->middle_name->CurrentValue;
		$this->middle_name->ViewCustomAttributes = "";

		// last_name
		$this->last_name->ViewValue = $this->last_name->CurrentValue;
		$this->last_name->ViewCustomAttributes = "";

		// gender
		$curVal = strval($this->gender->CurrentValue);
		if ($curVal != "") {
			$this->gender->ViewValue = $this->gender->lookupCacheOption($curVal);
			if ($this->gender->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->gender->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->gender->ViewValue = $this->gender->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->gender->ViewValue = $this->gender->CurrentValue;
				}
			}
		} else {
			$this->gender->ViewValue = NULL;
		}
		$this->gender->ViewCustomAttributes = "";

		// dob
		$this->dob->ViewValue = $this->dob->CurrentValue;
		$this->dob->ViewValue = FormatDateTime($this->dob->ViewValue, 0);
		$this->dob->ViewCustomAttributes = "";

		// start_date
		$this->start_date->ViewValue = $this->start_date->CurrentValue;
		$this->start_date->ViewValue = FormatDateTime($this->start_date->ViewValue, 0);
		$this->start_date->ViewCustomAttributes = "";

		// end_date
		$this->end_date->ViewValue = $this->end_date->CurrentValue;
		$this->end_date->ViewValue = FormatDateTime($this->end_date->ViewValue, 0);
		$this->end_date->ViewCustomAttributes = "";

		// employee_role_id
		$curVal = strval($this->employee_role_id->CurrentValue);
		if ($curVal != "") {
			$this->employee_role_id->ViewValue = $this->employee_role_id->lookupCacheOption($curVal);
			if ($this->employee_role_id->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->employee_role_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$this->employee_role_id->ViewValue = $this->employee_role_id->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->employee_role_id->ViewValue = $this->employee_role_id->CurrentValue;
				}
			}
		} else {
			$this->employee_role_id->ViewValue = NULL;
		}
		$this->employee_role_id->ViewCustomAttributes = "";

		// default_shift_start
		$this->default_shift_start->ViewValue = $this->default_shift_start->CurrentValue;
		$this->default_shift_start->ViewValue = FormatDateTime($this->default_shift_start->ViewValue, 4);
		$this->default_shift_start->ViewCustomAttributes = "";

		// default_shift_end
		$this->default_shift_end->ViewValue = $this->default_shift_end->CurrentValue;
		$this->default_shift_end->ViewValue = FormatDateTime($this->default_shift_end->ViewValue, 4);
		$this->default_shift_end->ViewCustomAttributes = "";

		// working_days
		$this->working_days->ViewValue = $this->working_days->CurrentValue;
		$this->working_days->ViewCustomAttributes = "";

		// working_location
		$curVal = strval($this->working_location->CurrentValue);
		if ($curVal != "") {
			$this->working_location->ViewValue = $this->working_location->lookupCacheOption($curVal);
			if ($this->working_location->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->working_location->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->working_location->ViewValue = $this->working_location->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->working_location->ViewValue = $this->working_location->CurrentValue;
				}
			}
		} else {
			$this->working_location->ViewValue = NULL;
		}
		$this->working_location->ViewCustomAttributes = "";

		// status
		$curVal = strval($this->status->CurrentValue);
		if ($curVal != "") {
			$this->status->ViewValue = $this->status->lookupCacheOption($curVal);
			if ($this->status->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->status->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
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

		// profilePic
		if (!EmptyValue($this->profilePic->Upload->DbValue)) {
			$this->profilePic->ImageWidth = 80;
			$this->profilePic->ImageHeight = 80;
			$this->profilePic->ImageAlt = $this->profilePic->alt();
			$this->profilePic->ViewValue = $this->profilePic->Upload->DbValue;
		} else {
			$this->profilePic->ViewValue = "";
		}
		$this->profilePic->ViewCustomAttributes = "";

		// HospID
		$this->HospID->ViewValue = $this->HospID->CurrentValue;
		$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
		$this->HospID->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// empNo
		$this->empNo->LinkCustomAttributes = "";
		$this->empNo->HrefValue = "";
		$this->empNo->TooltipValue = "";

		// tittle
		$this->tittle->LinkCustomAttributes = "";
		$this->tittle->HrefValue = "";
		$this->tittle->TooltipValue = "";

		// first_name
		$this->first_name->LinkCustomAttributes = "";
		$this->first_name->HrefValue = "";
		$this->first_name->TooltipValue = "";

		// middle_name
		$this->middle_name->LinkCustomAttributes = "";
		$this->middle_name->HrefValue = "";
		$this->middle_name->TooltipValue = "";

		// last_name
		$this->last_name->LinkCustomAttributes = "";
		$this->last_name->HrefValue = "";
		$this->last_name->TooltipValue = "";

		// gender
		$this->gender->LinkCustomAttributes = "";
		$this->gender->HrefValue = "";
		$this->gender->TooltipValue = "";

		// dob
		$this->dob->LinkCustomAttributes = "";
		$this->dob->HrefValue = "";
		$this->dob->TooltipValue = "";

		// start_date
		$this->start_date->LinkCustomAttributes = "";
		$this->start_date->HrefValue = "";
		$this->start_date->TooltipValue = "";

		// end_date
		$this->end_date->LinkCustomAttributes = "";
		$this->end_date->HrefValue = "";
		$this->end_date->TooltipValue = "";

		// employee_role_id
		$this->employee_role_id->LinkCustomAttributes = "";
		$this->employee_role_id->HrefValue = "";
		$this->employee_role_id->TooltipValue = "";

		// default_shift_start
		$this->default_shift_start->LinkCustomAttributes = "";
		$this->default_shift_start->HrefValue = "";
		$this->default_shift_start->TooltipValue = "";

		// default_shift_end
		$this->default_shift_end->LinkCustomAttributes = "";
		$this->default_shift_end->HrefValue = "";
		$this->default_shift_end->TooltipValue = "";

		// working_days
		$this->working_days->LinkCustomAttributes = "";
		$this->working_days->HrefValue = "";
		$this->working_days->TooltipValue = "";

		// working_location
		$this->working_location->LinkCustomAttributes = "";
		$this->working_location->HrefValue = "";
		$this->working_location->TooltipValue = "";

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

		// profilePic
		$this->profilePic->LinkCustomAttributes = "";
		if (!EmptyValue($this->profilePic->Upload->DbValue)) {
			$this->profilePic->HrefValue = GetFileUploadUrl($this->profilePic, $this->profilePic->htmlDecode($this->profilePic->Upload->DbValue)); // Add prefix/suffix
			$this->profilePic->LinkAttrs["target"] = ""; // Add target
			if ($this->isExport())
				$this->profilePic->HrefValue = FullUrl($this->profilePic->HrefValue, "href");
		} else {
			$this->profilePic->HrefValue = "";
		}
		$this->profilePic->ExportHrefValue = $this->profilePic->UploadPath . $this->profilePic->Upload->DbValue;
		$this->profilePic->TooltipValue = "";
		if ($this->profilePic->UseColorbox) {
			if (EmptyValue($this->profilePic->TooltipValue))
				$this->profilePic->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
			$this->profilePic->LinkAttrs["data-rel"] = "employee_x_profilePic";
			$this->profilePic->LinkAttrs->appendClass("ew-lightbox");
		}

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

		// empNo
		$this->empNo->EditAttrs["class"] = "form-control";
		$this->empNo->EditCustomAttributes = "";
		if (!$this->empNo->Raw)
			$this->empNo->CurrentValue = HtmlDecode($this->empNo->CurrentValue);
		$this->empNo->EditValue = $this->empNo->CurrentValue;
		$this->empNo->PlaceHolder = RemoveHtml($this->empNo->caption());

		// tittle
		$this->tittle->EditAttrs["class"] = "form-control";
		$this->tittle->EditCustomAttributes = "";

		// first_name
		$this->first_name->EditAttrs["class"] = "form-control";
		$this->first_name->EditCustomAttributes = "";
		if (!$this->first_name->Raw)
			$this->first_name->CurrentValue = HtmlDecode($this->first_name->CurrentValue);
		$this->first_name->EditValue = $this->first_name->CurrentValue;
		$this->first_name->PlaceHolder = RemoveHtml($this->first_name->caption());

		// middle_name
		$this->middle_name->EditAttrs["class"] = "form-control";
		$this->middle_name->EditCustomAttributes = "";
		if (!$this->middle_name->Raw)
			$this->middle_name->CurrentValue = HtmlDecode($this->middle_name->CurrentValue);
		$this->middle_name->EditValue = $this->middle_name->CurrentValue;
		$this->middle_name->PlaceHolder = RemoveHtml($this->middle_name->caption());

		// last_name
		$this->last_name->EditAttrs["class"] = "form-control";
		$this->last_name->EditCustomAttributes = "";
		if (!$this->last_name->Raw)
			$this->last_name->CurrentValue = HtmlDecode($this->last_name->CurrentValue);
		$this->last_name->EditValue = $this->last_name->CurrentValue;
		$this->last_name->PlaceHolder = RemoveHtml($this->last_name->caption());

		// gender
		$this->gender->EditAttrs["class"] = "form-control";
		$this->gender->EditCustomAttributes = "";

		// dob
		$this->dob->EditAttrs["class"] = "form-control";
		$this->dob->EditCustomAttributes = "";
		$this->dob->EditValue = FormatDateTime($this->dob->CurrentValue, 8);
		$this->dob->PlaceHolder = RemoveHtml($this->dob->caption());

		// start_date
		$this->start_date->EditAttrs["class"] = "form-control";
		$this->start_date->EditCustomAttributes = "";
		$this->start_date->EditValue = FormatDateTime($this->start_date->CurrentValue, 8);
		$this->start_date->PlaceHolder = RemoveHtml($this->start_date->caption());

		// end_date
		$this->end_date->EditAttrs["class"] = "form-control";
		$this->end_date->EditCustomAttributes = "";
		$this->end_date->EditValue = FormatDateTime($this->end_date->CurrentValue, 8);
		$this->end_date->PlaceHolder = RemoveHtml($this->end_date->caption());

		// employee_role_id
		$this->employee_role_id->EditAttrs["class"] = "form-control";
		$this->employee_role_id->EditCustomAttributes = "";

		// default_shift_start
		$this->default_shift_start->EditAttrs["class"] = "form-control";
		$this->default_shift_start->EditCustomAttributes = "";
		$this->default_shift_start->EditValue = $this->default_shift_start->CurrentValue;
		$this->default_shift_start->PlaceHolder = RemoveHtml($this->default_shift_start->caption());

		// default_shift_end
		$this->default_shift_end->EditAttrs["class"] = "form-control";
		$this->default_shift_end->EditCustomAttributes = "";
		$this->default_shift_end->EditValue = $this->default_shift_end->CurrentValue;
		$this->default_shift_end->PlaceHolder = RemoveHtml($this->default_shift_end->caption());

		// working_days
		$this->working_days->EditAttrs["class"] = "form-control";
		$this->working_days->EditCustomAttributes = "";
		if (!$this->working_days->Raw)
			$this->working_days->CurrentValue = HtmlDecode($this->working_days->CurrentValue);
		$this->working_days->EditValue = $this->working_days->CurrentValue;
		$this->working_days->PlaceHolder = RemoveHtml($this->working_days->caption());

		// working_location
		$this->working_location->EditAttrs["class"] = "form-control";
		$this->working_location->EditCustomAttributes = "";

		// status
		$this->status->EditAttrs["class"] = "form-control";
		$this->status->EditCustomAttributes = "";

		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// profilePic

		$this->profilePic->EditAttrs["class"] = "form-control";
		$this->profilePic->EditCustomAttributes = "";
		if (!EmptyValue($this->profilePic->Upload->DbValue)) {
			$this->profilePic->ImageWidth = 80;
			$this->profilePic->ImageHeight = 80;
			$this->profilePic->ImageAlt = $this->profilePic->alt();
			$this->profilePic->EditValue = $this->profilePic->Upload->DbValue;
		} else {
			$this->profilePic->EditValue = "";
		}
		if (!EmptyValue($this->profilePic->CurrentValue))
				$this->profilePic->Upload->FileName = $this->profilePic->CurrentValue;

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
					$doc->exportCaption($this->empNo);
					$doc->exportCaption($this->tittle);
					$doc->exportCaption($this->first_name);
					$doc->exportCaption($this->middle_name);
					$doc->exportCaption($this->last_name);
					$doc->exportCaption($this->gender);
					$doc->exportCaption($this->dob);
					$doc->exportCaption($this->start_date);
					$doc->exportCaption($this->end_date);
					$doc->exportCaption($this->employee_role_id);
					$doc->exportCaption($this->default_shift_start);
					$doc->exportCaption($this->default_shift_end);
					$doc->exportCaption($this->working_days);
					$doc->exportCaption($this->working_location);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
					$doc->exportCaption($this->profilePic);
					$doc->exportCaption($this->HospID);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->empNo);
					$doc->exportCaption($this->tittle);
					$doc->exportCaption($this->first_name);
					$doc->exportCaption($this->middle_name);
					$doc->exportCaption($this->last_name);
					$doc->exportCaption($this->gender);
					$doc->exportCaption($this->dob);
					$doc->exportCaption($this->start_date);
					$doc->exportCaption($this->end_date);
					$doc->exportCaption($this->employee_role_id);
					$doc->exportCaption($this->default_shift_start);
					$doc->exportCaption($this->default_shift_end);
					$doc->exportCaption($this->working_days);
					$doc->exportCaption($this->working_location);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->profilePic);
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
						$doc->exportField($this->empNo);
						$doc->exportField($this->tittle);
						$doc->exportField($this->first_name);
						$doc->exportField($this->middle_name);
						$doc->exportField($this->last_name);
						$doc->exportField($this->gender);
						$doc->exportField($this->dob);
						$doc->exportField($this->start_date);
						$doc->exportField($this->end_date);
						$doc->exportField($this->employee_role_id);
						$doc->exportField($this->default_shift_start);
						$doc->exportField($this->default_shift_end);
						$doc->exportField($this->working_days);
						$doc->exportField($this->working_location);
						$doc->exportField($this->status);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
						$doc->exportField($this->profilePic);
						$doc->exportField($this->HospID);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->empNo);
						$doc->exportField($this->tittle);
						$doc->exportField($this->first_name);
						$doc->exportField($this->middle_name);
						$doc->exportField($this->last_name);
						$doc->exportField($this->gender);
						$doc->exportField($this->dob);
						$doc->exportField($this->start_date);
						$doc->exportField($this->end_date);
						$doc->exportField($this->employee_role_id);
						$doc->exportField($this->default_shift_start);
						$doc->exportField($this->default_shift_end);
						$doc->exportField($this->working_days);
						$doc->exportField($this->working_location);
						$doc->exportField($this->status);
						$doc->exportField($this->profilePic);
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

	// Get file data
	public function getFileData($fldparm, $key, $resize, $width = 0, $height = 0)
	{
		$width = ($width > 0) ? $width : Config("THUMBNAIL_DEFAULT_WIDTH");
		$height = ($height > 0) ? $height : Config("THUMBNAIL_DEFAULT_HEIGHT");

		// Set up field name / file name field / file type field
		$fldName = "";
		$fileNameFld = "";
		$fileTypeFld = "";
		if ($fldparm == 'profilePic') {
			$fldName = "profilePic";
			$fileNameFld = "profilePic";
		} else {
			return FALSE; // Incorrect field
		}

		// Set up key values
		$ar = explode(Config("COMPOSITE_KEY_SEPARATOR"), $key);
		if (count($ar) == 1) {
			$this->id->CurrentValue = $ar[0];
		} else {
			return FALSE; // Incorrect key
		}

		// Set up filter (WHERE Clause)
		$filter = $this->getRecordFilter();
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = $this->getConnection();
		$dbtype = GetConnectionType($this->Dbid);
		if (($rs = $conn->execute($sql)) && !$rs->EOF) {
			$val = $rs->fields($fldName);
			if (!EmptyValue($val)) {
				$fld = $this->fields[$fldName];

				// Binary data
				if ($fld->DataType == DATATYPE_BLOB) {
					if ($dbtype != "MYSQL") {
						if (is_array($val) || is_object($val)) // Byte array
							$val = BytesToString($val);
					}
					if ($resize)
						ResizeBinary($val, $width, $height);

					// Write file type
					if ($fileTypeFld != "" && !EmptyValue($rs->fields($fileTypeFld))) {
						AddHeader("Content-type", $rs->fields($fileTypeFld));
					} else {
						AddHeader("Content-type", ContentType($val));
					}

					// Write file name
					$downloadPdf = !Config("EMBED_PDF") && Config("DOWNLOAD_PDF_FILE");
					if ($fileNameFld != "" && !EmptyValue($rs->fields($fileNameFld))) {
						$fileName = $rs->fields($fileNameFld);
						$pathinfo = pathinfo($fileName);
						$ext = strtolower(@$pathinfo["extension"]);
						$isPdf = SameText($ext, "pdf");
						if ($downloadPdf || !$isPdf) // Skip header if not download PDF
							AddHeader("Content-Disposition", "attachment; filename=\"" . $fileName . "\"");
					} else {
						$ext = ContentExtension($val);
						$isPdf = SameText($ext, ".pdf");
						if ($isPdf && $downloadPdf) // Add header if download PDF
							AddHeader("Content-Disposition", "attachment; filename=\"" . $fileName . "\"");
					}

					// Write file data
					if (StartsString("PK", $val) && ContainsString($val, "[Content_Types].xml") &&
						ContainsString($val, "_rels") && ContainsString($val, "docProps")) { // Fix Office 2007 documents
						if (!EndsString("\0\0\0", $val)) // Not ends with 3 or 4 \0
							$val .= "\0\0\0\0";
					}

					// Clear any debug message
					if (ob_get_length())
						ob_end_clean();

					// Write binary data
					Write($val);

				// Upload to folder
				} else {
					if ($fld->UploadMultiple)
						$files = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $val);
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