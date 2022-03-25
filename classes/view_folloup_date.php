<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for view_folloup_date
 */
class view_folloup_date extends DbTable
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
	public $NextReviewDate;
	public $FollowupAdvice;
	public $id;
	public $Reception;
	public $PatientId;
	public $PatientName;
	public $mrnno;
	public $Age;
	public $Gender;
	public $profilePic;
	public $HospID;
	public $PatientID1;
	public $physician_id;
	public $mobile_no;
	public $spouse_mobile_no;
	public $PEmail;
	public $PEmergencyContact;
	public $CODE;
	public $NAME;
	public $DEPARTMENT;
	public $start_time;
	public $end_time;
	public $slot_time;
	public $scheduler_id;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'view_folloup_date';
		$this->TableName = 'view_folloup_date';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`view_folloup_date`";
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

		// NextReviewDate
		$this->NextReviewDate = new DbField('view_folloup_date', 'view_folloup_date', 'x_NextReviewDate', 'NextReviewDate', '`NextReviewDate`', CastDateFieldForLike('`NextReviewDate`', 7, "DB"), 135, 7, FALSE, '`NextReviewDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NextReviewDate->Sortable = TRUE; // Allow sort
		$this->fields['NextReviewDate'] = &$this->NextReviewDate;

		// FollowupAdvice
		$this->FollowupAdvice = new DbField('view_folloup_date', 'view_folloup_date', 'x_FollowupAdvice', 'FollowupAdvice', '`FollowupAdvice`', '`FollowupAdvice`', 201, -1, FALSE, '`FollowupAdvice`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->FollowupAdvice->Sortable = TRUE; // Allow sort
		$this->fields['FollowupAdvice'] = &$this->FollowupAdvice;

		// id
		$this->id = new DbField('view_folloup_date', 'view_folloup_date', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// Reception
		$this->Reception = new DbField('view_folloup_date', 'view_folloup_date', 'x_Reception', 'Reception', '`Reception`', '`Reception`', 200, -1, FALSE, '`Reception`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Reception->Sortable = TRUE; // Allow sort
		$this->fields['Reception'] = &$this->Reception;

		// PatientId
		$this->PatientId = new DbField('view_folloup_date', 'view_folloup_date', 'x_PatientId', 'PatientId', '`PatientId`', '`PatientId`', 200, -1, FALSE, '`PatientId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientId->IsForeignKey = TRUE; // Foreign key field
		$this->PatientId->Sortable = TRUE; // Allow sort
		$this->fields['PatientId'] = &$this->PatientId;

		// PatientName
		$this->PatientName = new DbField('view_folloup_date', 'view_folloup_date', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, -1, FALSE, '`PatientName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientName->IsForeignKey = TRUE; // Foreign key field
		$this->PatientName->Sortable = TRUE; // Allow sort
		$this->fields['PatientName'] = &$this->PatientName;

		// mrnno
		$this->mrnno = new DbField('view_folloup_date', 'view_folloup_date', 'x_mrnno', 'mrnno', '`mrnno`', '`mrnno`', 200, -1, FALSE, '`mrnno`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mrnno->Sortable = TRUE; // Allow sort
		$this->fields['mrnno'] = &$this->mrnno;

		// Age
		$this->Age = new DbField('view_folloup_date', 'view_folloup_date', 'x_Age', 'Age', '`Age`', '`Age`', 200, -1, FALSE, '`Age`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Age->Sortable = TRUE; // Allow sort
		$this->fields['Age'] = &$this->Age;

		// Gender
		$this->Gender = new DbField('view_folloup_date', 'view_folloup_date', 'x_Gender', 'Gender', '`Gender`', '`Gender`', 200, -1, FALSE, '`Gender`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Gender->Sortable = TRUE; // Allow sort
		$this->fields['Gender'] = &$this->Gender;

		// profilePic
		$this->profilePic = new DbField('view_folloup_date', 'view_folloup_date', 'x_profilePic', 'profilePic', '`profilePic`', '`profilePic`', 201, -1, FALSE, '`profilePic`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->profilePic->Sortable = TRUE; // Allow sort
		$this->fields['profilePic'] = &$this->profilePic;

		// HospID
		$this->HospID = new DbField('view_folloup_date', 'view_folloup_date', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 200, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->HospID->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->HospID->Lookup = new Lookup('HospID', 'hospital', FALSE, 'id', ["hospital","","",""], [], [], [], [], [], [], '', '');
		$this->fields['HospID'] = &$this->HospID;

		// PatientID1
		$this->PatientID1 = new DbField('view_folloup_date', 'view_folloup_date', 'x_PatientID1', 'PatientID1', '`PatientID1`', '`PatientID1`', 200, -1, FALSE, '`PatientID1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientID1->Sortable = TRUE; // Allow sort
		$this->fields['PatientID1'] = &$this->PatientID1;

		// physician_id
		$this->physician_id = new DbField('view_folloup_date', 'view_folloup_date', 'x_physician_id', 'physician_id', '`physician_id`', '`physician_id`', 3, -1, FALSE, '`physician_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->physician_id->IsForeignKey = TRUE; // Foreign key field
		$this->physician_id->Nullable = FALSE; // NOT NULL field
		$this->physician_id->Required = TRUE; // Required field
		$this->physician_id->Sortable = TRUE; // Allow sort
		$this->physician_id->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->physician_id->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->physician_id->Lookup = new Lookup('physician_id', 'employee', FALSE, 'id', ["first_name","employee_role_id","",""], [], [], [], [], [], [], '', '');
		$this->physician_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['physician_id'] = &$this->physician_id;

		// mobile_no
		$this->mobile_no = new DbField('view_folloup_date', 'view_folloup_date', 'x_mobile_no', 'mobile_no', '`mobile_no`', '`mobile_no`', 200, -1, FALSE, '`mobile_no`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mobile_no->Sortable = TRUE; // Allow sort
		$this->fields['mobile_no'] = &$this->mobile_no;

		// spouse_mobile_no
		$this->spouse_mobile_no = new DbField('view_folloup_date', 'view_folloup_date', 'x_spouse_mobile_no', 'spouse_mobile_no', '`spouse_mobile_no`', '`spouse_mobile_no`', 200, -1, FALSE, '`spouse_mobile_no`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->spouse_mobile_no->Sortable = TRUE; // Allow sort
		$this->fields['spouse_mobile_no'] = &$this->spouse_mobile_no;

		// PEmail
		$this->PEmail = new DbField('view_folloup_date', 'view_folloup_date', 'x_PEmail', 'PEmail', '`PEmail`', '`PEmail`', 200, -1, FALSE, '`PEmail`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PEmail->Sortable = TRUE; // Allow sort
		$this->fields['PEmail'] = &$this->PEmail;

		// PEmergencyContact
		$this->PEmergencyContact = new DbField('view_folloup_date', 'view_folloup_date', 'x_PEmergencyContact', 'PEmergencyContact', '`PEmergencyContact`', '`PEmergencyContact`', 200, -1, FALSE, '`PEmergencyContact`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PEmergencyContact->Sortable = TRUE; // Allow sort
		$this->fields['PEmergencyContact'] = &$this->PEmergencyContact;

		// CODE
		$this->CODE = new DbField('view_folloup_date', 'view_folloup_date', 'x_CODE', 'CODE', '`CODE`', '`CODE`', 200, -1, FALSE, '`CODE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CODE->IsForeignKey = TRUE; // Foreign key field
		$this->CODE->Sortable = TRUE; // Allow sort
		$this->fields['CODE'] = &$this->CODE;

		// NAME
		$this->NAME = new DbField('view_folloup_date', 'view_folloup_date', 'x_NAME', 'NAME', '`NAME`', '`NAME`', 200, -1, FALSE, '`NAME`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NAME->IsForeignKey = TRUE; // Foreign key field
		$this->NAME->Sortable = TRUE; // Allow sort
		$this->fields['NAME'] = &$this->NAME;

		// DEPARTMENT
		$this->DEPARTMENT = new DbField('view_folloup_date', 'view_folloup_date', 'x_DEPARTMENT', 'DEPARTMENT', '`DEPARTMENT`', '`DEPARTMENT`', 200, -1, FALSE, '`DEPARTMENT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DEPARTMENT->IsForeignKey = TRUE; // Foreign key field
		$this->DEPARTMENT->Sortable = TRUE; // Allow sort
		$this->fields['DEPARTMENT'] = &$this->DEPARTMENT;

		// start_time
		$this->start_time = new DbField('view_folloup_date', 'view_folloup_date', 'x_start_time', 'start_time', '`start_time`', '`start_time`', 200, -1, FALSE, '`start_time`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->start_time->Sortable = TRUE; // Allow sort
		$this->fields['start_time'] = &$this->start_time;

		// end_time
		$this->end_time = new DbField('view_folloup_date', 'view_folloup_date', 'x_end_time', 'end_time', '`end_time`', '`end_time`', 200, -1, FALSE, '`end_time`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->end_time->Sortable = TRUE; // Allow sort
		$this->fields['end_time'] = &$this->end_time;

		// slot_time
		$this->slot_time = new DbField('view_folloup_date', 'view_folloup_date', 'x_slot_time', 'slot_time', '`slot_time`', '`slot_time`', 200, -1, FALSE, '`slot_time`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->slot_time->Sortable = TRUE; // Allow sort
		$this->fields['slot_time'] = &$this->slot_time;

		// scheduler_id
		$this->scheduler_id = new DbField('view_folloup_date', 'view_folloup_date', 'x_scheduler_id', 'scheduler_id', '`scheduler_id`', '`scheduler_id`', 200, -1, FALSE, '`scheduler_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->scheduler_id->IsForeignKey = TRUE; // Foreign key field
		$this->scheduler_id->Sortable = TRUE; // Allow sort
		$this->fields['scheduler_id'] = &$this->scheduler_id;
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
		if ($this->getCurrentDetailTable() == "_appointment_scheduler") {
			$detailUrl = $GLOBALS["_appointment_scheduler"]->getListUrl() . "?" . TABLE_SHOW_MASTER . "=" . $this->TableVar;
			$detailUrl .= "&fk_physician_id=" . urlencode($this->physician_id->CurrentValue);
			$detailUrl .= "&fk_NAME=" . urlencode($this->NAME->CurrentValue);
			$detailUrl .= "&fk_CODE=" . urlencode($this->CODE->CurrentValue);
			$detailUrl .= "&fk_DEPARTMENT=" . urlencode($this->DEPARTMENT->CurrentValue);
			$detailUrl .= "&fk_scheduler_id=" . urlencode($this->scheduler_id->CurrentValue);
			$detailUrl .= "&fk_PatientId=" . urlencode($this->PatientId->CurrentValue);
			$detailUrl .= "&fk_PatientName=" . urlencode($this->PatientName->CurrentValue);
		}
		if ($detailUrl == "")
			$detailUrl = "view_folloup_datelist.php";
		return $detailUrl;
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`view_folloup_date`";
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
		return ($this->SqlOrderBy <> "") ? $this->SqlOrderBy : "";
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
		$this->NextReviewDate->DbValue = $row['NextReviewDate'];
		$this->FollowupAdvice->DbValue = $row['FollowupAdvice'];
		$this->id->DbValue = $row['id'];
		$this->Reception->DbValue = $row['Reception'];
		$this->PatientId->DbValue = $row['PatientId'];
		$this->PatientName->DbValue = $row['PatientName'];
		$this->mrnno->DbValue = $row['mrnno'];
		$this->Age->DbValue = $row['Age'];
		$this->Gender->DbValue = $row['Gender'];
		$this->profilePic->DbValue = $row['profilePic'];
		$this->HospID->DbValue = $row['HospID'];
		$this->PatientID1->DbValue = $row['PatientID1'];
		$this->physician_id->DbValue = $row['physician_id'];
		$this->mobile_no->DbValue = $row['mobile_no'];
		$this->spouse_mobile_no->DbValue = $row['spouse_mobile_no'];
		$this->PEmail->DbValue = $row['PEmail'];
		$this->PEmergencyContact->DbValue = $row['PEmergencyContact'];
		$this->CODE->DbValue = $row['CODE'];
		$this->NAME->DbValue = $row['NAME'];
		$this->DEPARTMENT->DbValue = $row['DEPARTMENT'];
		$this->start_time->DbValue = $row['start_time'];
		$this->end_time->DbValue = $row['end_time'];
		$this->slot_time->DbValue = $row['slot_time'];
		$this->scheduler_id->DbValue = $row['scheduler_id'];
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
			return "view_folloup_datelist.php";
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
		if ($pageName == "view_folloup_dateview.php")
			return $Language->phrase("View");
		elseif ($pageName == "view_folloup_dateedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "view_folloup_dateadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "view_folloup_datelist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("view_folloup_dateview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_folloup_dateview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "view_folloup_dateadd.php?" . $this->getUrlParm($parm);
		else
			$url = "view_folloup_dateadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("view_folloup_dateedit.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_folloup_dateedit.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
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
			$url = $this->keyUrl("view_folloup_dateadd.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_folloup_dateadd.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
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
		return $this->keyUrl("view_folloup_datedelete.php", $this->getUrlParm());
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
		$this->NextReviewDate->setDbValue($rs->fields('NextReviewDate'));
		$this->FollowupAdvice->setDbValue($rs->fields('FollowupAdvice'));
		$this->id->setDbValue($rs->fields('id'));
		$this->Reception->setDbValue($rs->fields('Reception'));
		$this->PatientId->setDbValue($rs->fields('PatientId'));
		$this->PatientName->setDbValue($rs->fields('PatientName'));
		$this->mrnno->setDbValue($rs->fields('mrnno'));
		$this->Age->setDbValue($rs->fields('Age'));
		$this->Gender->setDbValue($rs->fields('Gender'));
		$this->profilePic->setDbValue($rs->fields('profilePic'));
		$this->HospID->setDbValue($rs->fields('HospID'));
		$this->PatientID1->setDbValue($rs->fields('PatientID1'));
		$this->physician_id->setDbValue($rs->fields('physician_id'));
		$this->mobile_no->setDbValue($rs->fields('mobile_no'));
		$this->spouse_mobile_no->setDbValue($rs->fields('spouse_mobile_no'));
		$this->PEmail->setDbValue($rs->fields('PEmail'));
		$this->PEmergencyContact->setDbValue($rs->fields('PEmergencyContact'));
		$this->CODE->setDbValue($rs->fields('CODE'));
		$this->NAME->setDbValue($rs->fields('NAME'));
		$this->DEPARTMENT->setDbValue($rs->fields('DEPARTMENT'));
		$this->start_time->setDbValue($rs->fields('start_time'));
		$this->end_time->setDbValue($rs->fields('end_time'));
		$this->slot_time->setDbValue($rs->fields('slot_time'));
		$this->scheduler_id->setDbValue($rs->fields('scheduler_id'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// NextReviewDate
		// FollowupAdvice
		// id
		// Reception
		// PatientId
		// PatientName
		// mrnno
		// Age
		// Gender
		// profilePic
		// HospID
		// PatientID1
		// physician_id
		// mobile_no
		// spouse_mobile_no
		// PEmail
		// PEmergencyContact
		// CODE
		// NAME
		// DEPARTMENT
		// start_time
		// end_time
		// slot_time
		// scheduler_id
		// NextReviewDate

		$this->NextReviewDate->ViewValue = $this->NextReviewDate->CurrentValue;
		$this->NextReviewDate->ViewValue = FormatDateTime($this->NextReviewDate->ViewValue, 7);
		$this->NextReviewDate->ViewCustomAttributes = "";

		// FollowupAdvice
		$this->FollowupAdvice->ViewValue = $this->FollowupAdvice->CurrentValue;
		$this->FollowupAdvice->ViewCustomAttributes = "";

		// id
		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// Reception
		$this->Reception->ViewValue = $this->Reception->CurrentValue;
		$this->Reception->ViewCustomAttributes = "";

		// PatientId
		$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
		$this->PatientId->ViewCustomAttributes = "";

		// PatientName
		$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
		$this->PatientName->ViewCustomAttributes = "";

		// mrnno
		$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
		$this->mrnno->ViewCustomAttributes = "";

		// Age
		$this->Age->ViewValue = $this->Age->CurrentValue;
		$this->Age->ViewCustomAttributes = "";

		// Gender
		$this->Gender->ViewValue = $this->Gender->CurrentValue;
		$this->Gender->ViewCustomAttributes = "";

		// profilePic
		$this->profilePic->ViewValue = $this->profilePic->CurrentValue;
		$this->profilePic->ViewCustomAttributes = "";

		// HospID
		$curVal = strval($this->HospID->CurrentValue);
		if ($curVal <> "") {
			$this->HospID->ViewValue = $this->HospID->lookupCacheOption($curVal);
			if ($this->HospID->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->HospID->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->HospID->ViewValue = $this->HospID->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->HospID->ViewValue = $this->HospID->CurrentValue;
				}
			}
		} else {
			$this->HospID->ViewValue = NULL;
		}
		$this->HospID->ViewCustomAttributes = "";

		// PatientID1
		$this->PatientID1->ViewValue = $this->PatientID1->CurrentValue;
		$this->PatientID1->ViewCustomAttributes = "";

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
					$arwrk[2] = FormatNumber($rswrk->fields('df2'), 0, -2, -2, -2);
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

		// mobile_no
		$this->mobile_no->ViewValue = $this->mobile_no->CurrentValue;
		$this->mobile_no->ViewCustomAttributes = "";

		// spouse_mobile_no
		$this->spouse_mobile_no->ViewValue = $this->spouse_mobile_no->CurrentValue;
		$this->spouse_mobile_no->ViewCustomAttributes = "";

		// PEmail
		$this->PEmail->ViewValue = $this->PEmail->CurrentValue;
		$this->PEmail->ViewCustomAttributes = "";

		// PEmergencyContact
		$this->PEmergencyContact->ViewValue = $this->PEmergencyContact->CurrentValue;
		$this->PEmergencyContact->ViewCustomAttributes = "";

		// CODE
		$this->CODE->ViewValue = $this->CODE->CurrentValue;
		$this->CODE->ViewCustomAttributes = "";

		// NAME
		$this->NAME->ViewValue = $this->NAME->CurrentValue;
		$this->NAME->ViewCustomAttributes = "";

		// DEPARTMENT
		$this->DEPARTMENT->ViewValue = $this->DEPARTMENT->CurrentValue;
		$this->DEPARTMENT->ViewCustomAttributes = "";

		// start_time
		$this->start_time->ViewValue = $this->start_time->CurrentValue;
		$this->start_time->ViewCustomAttributes = "";

		// end_time
		$this->end_time->ViewValue = $this->end_time->CurrentValue;
		$this->end_time->ViewCustomAttributes = "";

		// slot_time
		$this->slot_time->ViewValue = $this->slot_time->CurrentValue;
		$this->slot_time->ViewCustomAttributes = "";

		// scheduler_id
		$this->scheduler_id->ViewValue = $this->scheduler_id->CurrentValue;
		$this->scheduler_id->ViewCustomAttributes = "";

		// NextReviewDate
		$this->NextReviewDate->LinkCustomAttributes = "";
		$this->NextReviewDate->HrefValue = "";
		$this->NextReviewDate->TooltipValue = "";

		// FollowupAdvice
		$this->FollowupAdvice->LinkCustomAttributes = "";
		$this->FollowupAdvice->HrefValue = "";
		$this->FollowupAdvice->TooltipValue = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// Reception
		$this->Reception->LinkCustomAttributes = "";
		$this->Reception->HrefValue = "";
		$this->Reception->TooltipValue = "";

		// PatientId
		$this->PatientId->LinkCustomAttributes = "";
		$this->PatientId->HrefValue = "";
		$this->PatientId->TooltipValue = "";

		// PatientName
		$this->PatientName->LinkCustomAttributes = "";
		$this->PatientName->HrefValue = "";
		$this->PatientName->TooltipValue = "";

		// mrnno
		$this->mrnno->LinkCustomAttributes = "";
		$this->mrnno->HrefValue = "";
		$this->mrnno->TooltipValue = "";

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

		// HospID
		$this->HospID->LinkCustomAttributes = "";
		$this->HospID->HrefValue = "";
		$this->HospID->TooltipValue = "";

		// PatientID1
		$this->PatientID1->LinkCustomAttributes = "";
		$this->PatientID1->HrefValue = "";
		$this->PatientID1->TooltipValue = "";

		// physician_id
		$this->physician_id->LinkCustomAttributes = "";
		$this->physician_id->HrefValue = "";
		$this->physician_id->TooltipValue = "";

		// mobile_no
		$this->mobile_no->LinkCustomAttributes = "";
		$this->mobile_no->HrefValue = "";
		$this->mobile_no->TooltipValue = "";

		// spouse_mobile_no
		$this->spouse_mobile_no->LinkCustomAttributes = "";
		$this->spouse_mobile_no->HrefValue = "";
		$this->spouse_mobile_no->TooltipValue = "";

		// PEmail
		$this->PEmail->LinkCustomAttributes = "";
		$this->PEmail->HrefValue = "";
		$this->PEmail->TooltipValue = "";

		// PEmergencyContact
		$this->PEmergencyContact->LinkCustomAttributes = "";
		$this->PEmergencyContact->HrefValue = "";
		$this->PEmergencyContact->TooltipValue = "";

		// CODE
		$this->CODE->LinkCustomAttributes = "";
		$this->CODE->HrefValue = "";
		$this->CODE->TooltipValue = "";

		// NAME
		$this->NAME->LinkCustomAttributes = "";
		$this->NAME->HrefValue = "";
		$this->NAME->TooltipValue = "";

		// DEPARTMENT
		$this->DEPARTMENT->LinkCustomAttributes = "";
		$this->DEPARTMENT->HrefValue = "";
		$this->DEPARTMENT->TooltipValue = "";

		// start_time
		$this->start_time->LinkCustomAttributes = "";
		$this->start_time->HrefValue = "";
		$this->start_time->TooltipValue = "";

		// end_time
		$this->end_time->LinkCustomAttributes = "";
		$this->end_time->HrefValue = "";
		$this->end_time->TooltipValue = "";

		// slot_time
		$this->slot_time->LinkCustomAttributes = "";
		$this->slot_time->HrefValue = "";
		$this->slot_time->TooltipValue = "";

		// scheduler_id
		$this->scheduler_id->LinkCustomAttributes = "";
		$this->scheduler_id->HrefValue = "";
		$this->scheduler_id->TooltipValue = "";

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

		// NextReviewDate
		$this->NextReviewDate->EditAttrs["class"] = "form-control";
		$this->NextReviewDate->EditCustomAttributes = "";
		$this->NextReviewDate->EditValue = FormatDateTime($this->NextReviewDate->CurrentValue, 7);
		$this->NextReviewDate->PlaceHolder = RemoveHtml($this->NextReviewDate->caption());

		// FollowupAdvice
		$this->FollowupAdvice->EditAttrs["class"] = "form-control";
		$this->FollowupAdvice->EditCustomAttributes = "";
		$this->FollowupAdvice->EditValue = $this->FollowupAdvice->CurrentValue;
		$this->FollowupAdvice->PlaceHolder = RemoveHtml($this->FollowupAdvice->caption());

		// id
		$this->id->EditAttrs["class"] = "form-control";
		$this->id->EditCustomAttributes = "";
		$this->id->EditValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// Reception
		$this->Reception->EditAttrs["class"] = "form-control";
		$this->Reception->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Reception->CurrentValue = HtmlDecode($this->Reception->CurrentValue);
		$this->Reception->EditValue = $this->Reception->CurrentValue;
		$this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

		// PatientId
		$this->PatientId->EditAttrs["class"] = "form-control";
		$this->PatientId->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
		$this->PatientId->EditValue = $this->PatientId->CurrentValue;
		$this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

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
		if (REMOVE_XSS)
			$this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
		$this->mrnno->EditValue = $this->mrnno->CurrentValue;
		$this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

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

		// HospID
		// PatientID1

		$this->PatientID1->EditAttrs["class"] = "form-control";
		$this->PatientID1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PatientID1->CurrentValue = HtmlDecode($this->PatientID1->CurrentValue);
		$this->PatientID1->EditValue = $this->PatientID1->CurrentValue;
		$this->PatientID1->PlaceHolder = RemoveHtml($this->PatientID1->caption());

		// physician_id
		$this->physician_id->EditAttrs["class"] = "form-control";
		$this->physician_id->EditCustomAttributes = "";

		// mobile_no
		$this->mobile_no->EditAttrs["class"] = "form-control";
		$this->mobile_no->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->mobile_no->CurrentValue = HtmlDecode($this->mobile_no->CurrentValue);
		$this->mobile_no->EditValue = $this->mobile_no->CurrentValue;
		$this->mobile_no->PlaceHolder = RemoveHtml($this->mobile_no->caption());

		// spouse_mobile_no
		$this->spouse_mobile_no->EditAttrs["class"] = "form-control";
		$this->spouse_mobile_no->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->spouse_mobile_no->CurrentValue = HtmlDecode($this->spouse_mobile_no->CurrentValue);
		$this->spouse_mobile_no->EditValue = $this->spouse_mobile_no->CurrentValue;
		$this->spouse_mobile_no->PlaceHolder = RemoveHtml($this->spouse_mobile_no->caption());

		// PEmail
		$this->PEmail->EditAttrs["class"] = "form-control";
		$this->PEmail->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PEmail->CurrentValue = HtmlDecode($this->PEmail->CurrentValue);
		$this->PEmail->EditValue = $this->PEmail->CurrentValue;
		$this->PEmail->PlaceHolder = RemoveHtml($this->PEmail->caption());

		// PEmergencyContact
		$this->PEmergencyContact->EditAttrs["class"] = "form-control";
		$this->PEmergencyContact->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PEmergencyContact->CurrentValue = HtmlDecode($this->PEmergencyContact->CurrentValue);
		$this->PEmergencyContact->EditValue = $this->PEmergencyContact->CurrentValue;
		$this->PEmergencyContact->PlaceHolder = RemoveHtml($this->PEmergencyContact->caption());

		// CODE
		$this->CODE->EditAttrs["class"] = "form-control";
		$this->CODE->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->CODE->CurrentValue = HtmlDecode($this->CODE->CurrentValue);
		$this->CODE->EditValue = $this->CODE->CurrentValue;
		$this->CODE->PlaceHolder = RemoveHtml($this->CODE->caption());

		// NAME
		$this->NAME->EditAttrs["class"] = "form-control";
		$this->NAME->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->NAME->CurrentValue = HtmlDecode($this->NAME->CurrentValue);
		$this->NAME->EditValue = $this->NAME->CurrentValue;
		$this->NAME->PlaceHolder = RemoveHtml($this->NAME->caption());

		// DEPARTMENT
		$this->DEPARTMENT->EditAttrs["class"] = "form-control";
		$this->DEPARTMENT->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->DEPARTMENT->CurrentValue = HtmlDecode($this->DEPARTMENT->CurrentValue);
		$this->DEPARTMENT->EditValue = $this->DEPARTMENT->CurrentValue;
		$this->DEPARTMENT->PlaceHolder = RemoveHtml($this->DEPARTMENT->caption());

		// start_time
		$this->start_time->EditAttrs["class"] = "form-control";
		$this->start_time->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->start_time->CurrentValue = HtmlDecode($this->start_time->CurrentValue);
		$this->start_time->EditValue = $this->start_time->CurrentValue;
		$this->start_time->PlaceHolder = RemoveHtml($this->start_time->caption());

		// end_time
		$this->end_time->EditAttrs["class"] = "form-control";
		$this->end_time->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->end_time->CurrentValue = HtmlDecode($this->end_time->CurrentValue);
		$this->end_time->EditValue = $this->end_time->CurrentValue;
		$this->end_time->PlaceHolder = RemoveHtml($this->end_time->caption());

		// slot_time
		$this->slot_time->EditAttrs["class"] = "form-control";
		$this->slot_time->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->slot_time->CurrentValue = HtmlDecode($this->slot_time->CurrentValue);
		$this->slot_time->EditValue = $this->slot_time->CurrentValue;
		$this->slot_time->PlaceHolder = RemoveHtml($this->slot_time->caption());

		// scheduler_id
		$this->scheduler_id->EditAttrs["class"] = "form-control";
		$this->scheduler_id->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->scheduler_id->CurrentValue = HtmlDecode($this->scheduler_id->CurrentValue);
		$this->scheduler_id->EditValue = $this->scheduler_id->CurrentValue;
		$this->scheduler_id->PlaceHolder = RemoveHtml($this->scheduler_id->caption());

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
					$doc->exportCaption($this->NextReviewDate);
					$doc->exportCaption($this->FollowupAdvice);
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->Reception);
					$doc->exportCaption($this->PatientId);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->mrnno);
					$doc->exportCaption($this->Age);
					$doc->exportCaption($this->Gender);
					$doc->exportCaption($this->profilePic);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->PatientID1);
					$doc->exportCaption($this->physician_id);
					$doc->exportCaption($this->mobile_no);
					$doc->exportCaption($this->spouse_mobile_no);
					$doc->exportCaption($this->PEmail);
					$doc->exportCaption($this->PEmergencyContact);
					$doc->exportCaption($this->CODE);
					$doc->exportCaption($this->NAME);
					$doc->exportCaption($this->DEPARTMENT);
					$doc->exportCaption($this->start_time);
					$doc->exportCaption($this->end_time);
					$doc->exportCaption($this->slot_time);
					$doc->exportCaption($this->scheduler_id);
				} else {
					$doc->exportCaption($this->NextReviewDate);
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->Reception);
					$doc->exportCaption($this->PatientId);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->mrnno);
					$doc->exportCaption($this->Age);
					$doc->exportCaption($this->Gender);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->PatientID1);
					$doc->exportCaption($this->physician_id);
					$doc->exportCaption($this->mobile_no);
					$doc->exportCaption($this->spouse_mobile_no);
					$doc->exportCaption($this->PEmail);
					$doc->exportCaption($this->PEmergencyContact);
					$doc->exportCaption($this->CODE);
					$doc->exportCaption($this->NAME);
					$doc->exportCaption($this->DEPARTMENT);
					$doc->exportCaption($this->start_time);
					$doc->exportCaption($this->end_time);
					$doc->exportCaption($this->slot_time);
					$doc->exportCaption($this->scheduler_id);
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
						$doc->exportField($this->NextReviewDate);
						$doc->exportField($this->FollowupAdvice);
						$doc->exportField($this->id);
						$doc->exportField($this->Reception);
						$doc->exportField($this->PatientId);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->mrnno);
						$doc->exportField($this->Age);
						$doc->exportField($this->Gender);
						$doc->exportField($this->profilePic);
						$doc->exportField($this->HospID);
						$doc->exportField($this->PatientID1);
						$doc->exportField($this->physician_id);
						$doc->exportField($this->mobile_no);
						$doc->exportField($this->spouse_mobile_no);
						$doc->exportField($this->PEmail);
						$doc->exportField($this->PEmergencyContact);
						$doc->exportField($this->CODE);
						$doc->exportField($this->NAME);
						$doc->exportField($this->DEPARTMENT);
						$doc->exportField($this->start_time);
						$doc->exportField($this->end_time);
						$doc->exportField($this->slot_time);
						$doc->exportField($this->scheduler_id);
					} else {
						$doc->exportField($this->NextReviewDate);
						$doc->exportField($this->id);
						$doc->exportField($this->Reception);
						$doc->exportField($this->PatientId);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->mrnno);
						$doc->exportField($this->Age);
						$doc->exportField($this->Gender);
						$doc->exportField($this->HospID);
						$doc->exportField($this->PatientID1);
						$doc->exportField($this->physician_id);
						$doc->exportField($this->mobile_no);
						$doc->exportField($this->spouse_mobile_no);
						$doc->exportField($this->PEmail);
						$doc->exportField($this->PEmergencyContact);
						$doc->exportField($this->CODE);
						$doc->exportField($this->NAME);
						$doc->exportField($this->DEPARTMENT);
						$doc->exportField($this->start_time);
						$doc->exportField($this->end_time);
						$doc->exportField($this->slot_time);
						$doc->exportField($this->scheduler_id);
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