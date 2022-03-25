<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for hr_leavetypes
 */
class hr_leavetypes extends DbTable
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
	public $name;
	public $supervisor_leave_assign;
	public $employee_can_apply;
	public $apply_beyond_current;
	public $leave_accrue;
	public $carried_forward;
	public $default_per_year;
	public $carried_forward_percentage;
	public $carried_forward_leave_availability;
	public $propotionate_on_joined_date;
	public $send_notification_emails;
	public $leave_group;
	public $leave_color;
	public $max_carried_forward_amount;
	public $HospID;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'hr_leavetypes';
		$this->TableName = 'hr_leavetypes';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`hr_leavetypes`";
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
		$this->id = new DbField('hr_leavetypes', 'hr_leavetypes', 'x_id', 'id', '`id`', '`id`', 20, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// name
		$this->name = new DbField('hr_leavetypes', 'hr_leavetypes', 'x_name', 'name', '`name`', '`name`', 200, -1, FALSE, '`name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->name->Nullable = FALSE; // NOT NULL field
		$this->name->Required = TRUE; // Required field
		$this->name->Sortable = TRUE; // Allow sort
		$this->fields['name'] = &$this->name;

		// supervisor_leave_assign
		$this->supervisor_leave_assign = new DbField('hr_leavetypes', 'hr_leavetypes', 'x_supervisor_leave_assign', 'supervisor_leave_assign', '`supervisor_leave_assign`', '`supervisor_leave_assign`', 202, -1, FALSE, '`supervisor_leave_assign`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->supervisor_leave_assign->Sortable = TRUE; // Allow sort
		$this->supervisor_leave_assign->Lookup = new Lookup('supervisor_leave_assign', 'hr_leavetypes', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->supervisor_leave_assign->OptionCount = 2;
		$this->fields['supervisor_leave_assign'] = &$this->supervisor_leave_assign;

		// employee_can_apply
		$this->employee_can_apply = new DbField('hr_leavetypes', 'hr_leavetypes', 'x_employee_can_apply', 'employee_can_apply', '`employee_can_apply`', '`employee_can_apply`', 202, -1, FALSE, '`employee_can_apply`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->employee_can_apply->Sortable = TRUE; // Allow sort
		$this->employee_can_apply->Lookup = new Lookup('employee_can_apply', 'hr_leavetypes', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->employee_can_apply->OptionCount = 2;
		$this->fields['employee_can_apply'] = &$this->employee_can_apply;

		// apply_beyond_current
		$this->apply_beyond_current = new DbField('hr_leavetypes', 'hr_leavetypes', 'x_apply_beyond_current', 'apply_beyond_current', '`apply_beyond_current`', '`apply_beyond_current`', 202, -1, FALSE, '`apply_beyond_current`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->apply_beyond_current->Sortable = TRUE; // Allow sort
		$this->apply_beyond_current->Lookup = new Lookup('apply_beyond_current', 'hr_leavetypes', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->apply_beyond_current->OptionCount = 2;
		$this->fields['apply_beyond_current'] = &$this->apply_beyond_current;

		// leave_accrue
		$this->leave_accrue = new DbField('hr_leavetypes', 'hr_leavetypes', 'x_leave_accrue', 'leave_accrue', '`leave_accrue`', '`leave_accrue`', 202, -1, FALSE, '`leave_accrue`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->leave_accrue->Sortable = TRUE; // Allow sort
		$this->leave_accrue->Lookup = new Lookup('leave_accrue', 'hr_leavetypes', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->leave_accrue->OptionCount = 2;
		$this->fields['leave_accrue'] = &$this->leave_accrue;

		// carried_forward
		$this->carried_forward = new DbField('hr_leavetypes', 'hr_leavetypes', 'x_carried_forward', 'carried_forward', '`carried_forward`', '`carried_forward`', 202, -1, FALSE, '`carried_forward`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->carried_forward->Sortable = TRUE; // Allow sort
		$this->carried_forward->Lookup = new Lookup('carried_forward', 'hr_leavetypes', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->carried_forward->OptionCount = 2;
		$this->fields['carried_forward'] = &$this->carried_forward;

		// default_per_year
		$this->default_per_year = new DbField('hr_leavetypes', 'hr_leavetypes', 'x_default_per_year', 'default_per_year', '`default_per_year`', '`default_per_year`', 131, -1, FALSE, '`default_per_year`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->default_per_year->Nullable = FALSE; // NOT NULL field
		$this->default_per_year->Required = TRUE; // Required field
		$this->default_per_year->Sortable = TRUE; // Allow sort
		$this->default_per_year->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['default_per_year'] = &$this->default_per_year;

		// carried_forward_percentage
		$this->carried_forward_percentage = new DbField('hr_leavetypes', 'hr_leavetypes', 'x_carried_forward_percentage', 'carried_forward_percentage', '`carried_forward_percentage`', '`carried_forward_percentage`', 3, -1, FALSE, '`carried_forward_percentage`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->carried_forward_percentage->Sortable = TRUE; // Allow sort
		$this->carried_forward_percentage->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['carried_forward_percentage'] = &$this->carried_forward_percentage;

		// carried_forward_leave_availability
		$this->carried_forward_leave_availability = new DbField('hr_leavetypes', 'hr_leavetypes', 'x_carried_forward_leave_availability', 'carried_forward_leave_availability', '`carried_forward_leave_availability`', '`carried_forward_leave_availability`', 3, -1, FALSE, '`carried_forward_leave_availability`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->carried_forward_leave_availability->Sortable = TRUE; // Allow sort
		$this->carried_forward_leave_availability->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['carried_forward_leave_availability'] = &$this->carried_forward_leave_availability;

		// propotionate_on_joined_date
		$this->propotionate_on_joined_date = new DbField('hr_leavetypes', 'hr_leavetypes', 'x_propotionate_on_joined_date', 'propotionate_on_joined_date', '`propotionate_on_joined_date`', '`propotionate_on_joined_date`', 202, -1, FALSE, '`propotionate_on_joined_date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->propotionate_on_joined_date->Sortable = TRUE; // Allow sort
		$this->propotionate_on_joined_date->Lookup = new Lookup('propotionate_on_joined_date', 'hr_leavetypes', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->propotionate_on_joined_date->OptionCount = 2;
		$this->fields['propotionate_on_joined_date'] = &$this->propotionate_on_joined_date;

		// send_notification_emails
		$this->send_notification_emails = new DbField('hr_leavetypes', 'hr_leavetypes', 'x_send_notification_emails', 'send_notification_emails', '`send_notification_emails`', '`send_notification_emails`', 202, -1, FALSE, '`send_notification_emails`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->send_notification_emails->Sortable = TRUE; // Allow sort
		$this->send_notification_emails->Lookup = new Lookup('send_notification_emails', 'hr_leavetypes', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->send_notification_emails->OptionCount = 2;
		$this->fields['send_notification_emails'] = &$this->send_notification_emails;

		// leave_group
		$this->leave_group = new DbField('hr_leavetypes', 'hr_leavetypes', 'x_leave_group', 'leave_group', '`leave_group`', '`leave_group`', 20, -1, FALSE, '`leave_group`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->leave_group->Sortable = TRUE; // Allow sort
		$this->leave_group->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['leave_group'] = &$this->leave_group;

		// leave_color
		$this->leave_color = new DbField('hr_leavetypes', 'hr_leavetypes', 'x_leave_color', 'leave_color', '`leave_color`', '`leave_color`', 200, -1, FALSE, '`leave_color`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->leave_color->Sortable = TRUE; // Allow sort
		$this->fields['leave_color'] = &$this->leave_color;

		// max_carried_forward_amount
		$this->max_carried_forward_amount = new DbField('hr_leavetypes', 'hr_leavetypes', 'x_max_carried_forward_amount', 'max_carried_forward_amount', '`max_carried_forward_amount`', '`max_carried_forward_amount`', 3, -1, FALSE, '`max_carried_forward_amount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->max_carried_forward_amount->Sortable = TRUE; // Allow sort
		$this->max_carried_forward_amount->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['max_carried_forward_amount'] = &$this->max_carried_forward_amount;

		// HospID
		$this->HospID = new DbField('hr_leavetypes', 'hr_leavetypes', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
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

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`hr_leavetypes`";
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
		$this->id->DbValue = $row['id'];
		$this->name->DbValue = $row['name'];
		$this->supervisor_leave_assign->DbValue = $row['supervisor_leave_assign'];
		$this->employee_can_apply->DbValue = $row['employee_can_apply'];
		$this->apply_beyond_current->DbValue = $row['apply_beyond_current'];
		$this->leave_accrue->DbValue = $row['leave_accrue'];
		$this->carried_forward->DbValue = $row['carried_forward'];
		$this->default_per_year->DbValue = $row['default_per_year'];
		$this->carried_forward_percentage->DbValue = $row['carried_forward_percentage'];
		$this->carried_forward_leave_availability->DbValue = $row['carried_forward_leave_availability'];
		$this->propotionate_on_joined_date->DbValue = $row['propotionate_on_joined_date'];
		$this->send_notification_emails->DbValue = $row['send_notification_emails'];
		$this->leave_group->DbValue = $row['leave_group'];
		$this->leave_color->DbValue = $row['leave_color'];
		$this->max_carried_forward_amount->DbValue = $row['max_carried_forward_amount'];
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
			return "hr_leavetypeslist.php";
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
		if ($pageName == "hr_leavetypesview.php")
			return $Language->phrase("View");
		elseif ($pageName == "hr_leavetypesedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "hr_leavetypesadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "hr_leavetypeslist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("hr_leavetypesview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("hr_leavetypesview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "hr_leavetypesadd.php?" . $this->getUrlParm($parm);
		else
			$url = "hr_leavetypesadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("hr_leavetypesedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("hr_leavetypesadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("hr_leavetypesdelete.php", $this->getUrlParm());
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
		$this->name->setDbValue($rs->fields('name'));
		$this->supervisor_leave_assign->setDbValue($rs->fields('supervisor_leave_assign'));
		$this->employee_can_apply->setDbValue($rs->fields('employee_can_apply'));
		$this->apply_beyond_current->setDbValue($rs->fields('apply_beyond_current'));
		$this->leave_accrue->setDbValue($rs->fields('leave_accrue'));
		$this->carried_forward->setDbValue($rs->fields('carried_forward'));
		$this->default_per_year->setDbValue($rs->fields('default_per_year'));
		$this->carried_forward_percentage->setDbValue($rs->fields('carried_forward_percentage'));
		$this->carried_forward_leave_availability->setDbValue($rs->fields('carried_forward_leave_availability'));
		$this->propotionate_on_joined_date->setDbValue($rs->fields('propotionate_on_joined_date'));
		$this->send_notification_emails->setDbValue($rs->fields('send_notification_emails'));
		$this->leave_group->setDbValue($rs->fields('leave_group'));
		$this->leave_color->setDbValue($rs->fields('leave_color'));
		$this->max_carried_forward_amount->setDbValue($rs->fields('max_carried_forward_amount'));
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
		// name
		// supervisor_leave_assign
		// employee_can_apply
		// apply_beyond_current
		// leave_accrue
		// carried_forward
		// default_per_year
		// carried_forward_percentage
		// carried_forward_leave_availability
		// propotionate_on_joined_date
		// send_notification_emails
		// leave_group
		// leave_color
		// max_carried_forward_amount
		// HospID
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// name
		$this->name->ViewValue = $this->name->CurrentValue;
		$this->name->ViewCustomAttributes = "";

		// supervisor_leave_assign
		if (strval($this->supervisor_leave_assign->CurrentValue) <> "") {
			$this->supervisor_leave_assign->ViewValue = $this->supervisor_leave_assign->optionCaption($this->supervisor_leave_assign->CurrentValue);
		} else {
			$this->supervisor_leave_assign->ViewValue = NULL;
		}
		$this->supervisor_leave_assign->ViewCustomAttributes = "";

		// employee_can_apply
		if (strval($this->employee_can_apply->CurrentValue) <> "") {
			$this->employee_can_apply->ViewValue = $this->employee_can_apply->optionCaption($this->employee_can_apply->CurrentValue);
		} else {
			$this->employee_can_apply->ViewValue = NULL;
		}
		$this->employee_can_apply->ViewCustomAttributes = "";

		// apply_beyond_current
		if (strval($this->apply_beyond_current->CurrentValue) <> "") {
			$this->apply_beyond_current->ViewValue = $this->apply_beyond_current->optionCaption($this->apply_beyond_current->CurrentValue);
		} else {
			$this->apply_beyond_current->ViewValue = NULL;
		}
		$this->apply_beyond_current->ViewCustomAttributes = "";

		// leave_accrue
		if (strval($this->leave_accrue->CurrentValue) <> "") {
			$this->leave_accrue->ViewValue = $this->leave_accrue->optionCaption($this->leave_accrue->CurrentValue);
		} else {
			$this->leave_accrue->ViewValue = NULL;
		}
		$this->leave_accrue->ViewCustomAttributes = "";

		// carried_forward
		if (strval($this->carried_forward->CurrentValue) <> "") {
			$this->carried_forward->ViewValue = $this->carried_forward->optionCaption($this->carried_forward->CurrentValue);
		} else {
			$this->carried_forward->ViewValue = NULL;
		}
		$this->carried_forward->ViewCustomAttributes = "";

		// default_per_year
		$this->default_per_year->ViewValue = $this->default_per_year->CurrentValue;
		$this->default_per_year->ViewValue = FormatNumber($this->default_per_year->ViewValue, 2, -2, -2, -2);
		$this->default_per_year->ViewCustomAttributes = "";

		// carried_forward_percentage
		$this->carried_forward_percentage->ViewValue = $this->carried_forward_percentage->CurrentValue;
		$this->carried_forward_percentage->ViewValue = FormatNumber($this->carried_forward_percentage->ViewValue, 0, -2, -2, -2);
		$this->carried_forward_percentage->ViewCustomAttributes = "";

		// carried_forward_leave_availability
		$this->carried_forward_leave_availability->ViewValue = $this->carried_forward_leave_availability->CurrentValue;
		$this->carried_forward_leave_availability->ViewValue = FormatNumber($this->carried_forward_leave_availability->ViewValue, 0, -2, -2, -2);
		$this->carried_forward_leave_availability->ViewCustomAttributes = "";

		// propotionate_on_joined_date
		if (strval($this->propotionate_on_joined_date->CurrentValue) <> "") {
			$this->propotionate_on_joined_date->ViewValue = $this->propotionate_on_joined_date->optionCaption($this->propotionate_on_joined_date->CurrentValue);
		} else {
			$this->propotionate_on_joined_date->ViewValue = NULL;
		}
		$this->propotionate_on_joined_date->ViewCustomAttributes = "";

		// send_notification_emails
		if (strval($this->send_notification_emails->CurrentValue) <> "") {
			$this->send_notification_emails->ViewValue = $this->send_notification_emails->optionCaption($this->send_notification_emails->CurrentValue);
		} else {
			$this->send_notification_emails->ViewValue = NULL;
		}
		$this->send_notification_emails->ViewCustomAttributes = "";

		// leave_group
		$this->leave_group->ViewValue = $this->leave_group->CurrentValue;
		$this->leave_group->ViewValue = FormatNumber($this->leave_group->ViewValue, 0, -2, -2, -2);
		$this->leave_group->ViewCustomAttributes = "";

		// leave_color
		$this->leave_color->ViewValue = $this->leave_color->CurrentValue;
		$this->leave_color->ViewCustomAttributes = "";

		// max_carried_forward_amount
		$this->max_carried_forward_amount->ViewValue = $this->max_carried_forward_amount->CurrentValue;
		$this->max_carried_forward_amount->ViewValue = FormatNumber($this->max_carried_forward_amount->ViewValue, 0, -2, -2, -2);
		$this->max_carried_forward_amount->ViewCustomAttributes = "";

		// HospID
		$this->HospID->ViewValue = $this->HospID->CurrentValue;
		$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
		$this->HospID->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// name
		$this->name->LinkCustomAttributes = "";
		$this->name->HrefValue = "";
		$this->name->TooltipValue = "";

		// supervisor_leave_assign
		$this->supervisor_leave_assign->LinkCustomAttributes = "";
		$this->supervisor_leave_assign->HrefValue = "";
		$this->supervisor_leave_assign->TooltipValue = "";

		// employee_can_apply
		$this->employee_can_apply->LinkCustomAttributes = "";
		$this->employee_can_apply->HrefValue = "";
		$this->employee_can_apply->TooltipValue = "";

		// apply_beyond_current
		$this->apply_beyond_current->LinkCustomAttributes = "";
		$this->apply_beyond_current->HrefValue = "";
		$this->apply_beyond_current->TooltipValue = "";

		// leave_accrue
		$this->leave_accrue->LinkCustomAttributes = "";
		$this->leave_accrue->HrefValue = "";
		$this->leave_accrue->TooltipValue = "";

		// carried_forward
		$this->carried_forward->LinkCustomAttributes = "";
		$this->carried_forward->HrefValue = "";
		$this->carried_forward->TooltipValue = "";

		// default_per_year
		$this->default_per_year->LinkCustomAttributes = "";
		$this->default_per_year->HrefValue = "";
		$this->default_per_year->TooltipValue = "";

		// carried_forward_percentage
		$this->carried_forward_percentage->LinkCustomAttributes = "";
		$this->carried_forward_percentage->HrefValue = "";
		$this->carried_forward_percentage->TooltipValue = "";

		// carried_forward_leave_availability
		$this->carried_forward_leave_availability->LinkCustomAttributes = "";
		$this->carried_forward_leave_availability->HrefValue = "";
		$this->carried_forward_leave_availability->TooltipValue = "";

		// propotionate_on_joined_date
		$this->propotionate_on_joined_date->LinkCustomAttributes = "";
		$this->propotionate_on_joined_date->HrefValue = "";
		$this->propotionate_on_joined_date->TooltipValue = "";

		// send_notification_emails
		$this->send_notification_emails->LinkCustomAttributes = "";
		$this->send_notification_emails->HrefValue = "";
		$this->send_notification_emails->TooltipValue = "";

		// leave_group
		$this->leave_group->LinkCustomAttributes = "";
		$this->leave_group->HrefValue = "";
		$this->leave_group->TooltipValue = "";

		// leave_color
		$this->leave_color->LinkCustomAttributes = "";
		$this->leave_color->HrefValue = "";
		$this->leave_color->TooltipValue = "";

		// max_carried_forward_amount
		$this->max_carried_forward_amount->LinkCustomAttributes = "";
		$this->max_carried_forward_amount->HrefValue = "";
		$this->max_carried_forward_amount->TooltipValue = "";

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

		// name
		$this->name->EditAttrs["class"] = "form-control";
		$this->name->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->name->CurrentValue = HtmlDecode($this->name->CurrentValue);
		$this->name->EditValue = $this->name->CurrentValue;
		$this->name->PlaceHolder = RemoveHtml($this->name->caption());

		// supervisor_leave_assign
		$this->supervisor_leave_assign->EditCustomAttributes = "";
		$this->supervisor_leave_assign->EditValue = $this->supervisor_leave_assign->options(FALSE);

		// employee_can_apply
		$this->employee_can_apply->EditCustomAttributes = "";
		$this->employee_can_apply->EditValue = $this->employee_can_apply->options(FALSE);

		// apply_beyond_current
		$this->apply_beyond_current->EditCustomAttributes = "";
		$this->apply_beyond_current->EditValue = $this->apply_beyond_current->options(FALSE);

		// leave_accrue
		$this->leave_accrue->EditCustomAttributes = "";
		$this->leave_accrue->EditValue = $this->leave_accrue->options(FALSE);

		// carried_forward
		$this->carried_forward->EditCustomAttributes = "";
		$this->carried_forward->EditValue = $this->carried_forward->options(FALSE);

		// default_per_year
		$this->default_per_year->EditAttrs["class"] = "form-control";
		$this->default_per_year->EditCustomAttributes = "";
		$this->default_per_year->EditValue = $this->default_per_year->CurrentValue;
		$this->default_per_year->PlaceHolder = RemoveHtml($this->default_per_year->caption());
		if (strval($this->default_per_year->EditValue) <> "" && is_numeric($this->default_per_year->EditValue))
			$this->default_per_year->EditValue = FormatNumber($this->default_per_year->EditValue, -2, -2, -2, -2);

		// carried_forward_percentage
		$this->carried_forward_percentage->EditAttrs["class"] = "form-control";
		$this->carried_forward_percentage->EditCustomAttributes = "";
		$this->carried_forward_percentage->EditValue = $this->carried_forward_percentage->CurrentValue;
		$this->carried_forward_percentage->PlaceHolder = RemoveHtml($this->carried_forward_percentage->caption());

		// carried_forward_leave_availability
		$this->carried_forward_leave_availability->EditAttrs["class"] = "form-control";
		$this->carried_forward_leave_availability->EditCustomAttributes = "";
		$this->carried_forward_leave_availability->EditValue = $this->carried_forward_leave_availability->CurrentValue;
		$this->carried_forward_leave_availability->PlaceHolder = RemoveHtml($this->carried_forward_leave_availability->caption());

		// propotionate_on_joined_date
		$this->propotionate_on_joined_date->EditCustomAttributes = "";
		$this->propotionate_on_joined_date->EditValue = $this->propotionate_on_joined_date->options(FALSE);

		// send_notification_emails
		$this->send_notification_emails->EditCustomAttributes = "";
		$this->send_notification_emails->EditValue = $this->send_notification_emails->options(FALSE);

		// leave_group
		$this->leave_group->EditAttrs["class"] = "form-control";
		$this->leave_group->EditCustomAttributes = "";
		$this->leave_group->EditValue = $this->leave_group->CurrentValue;
		$this->leave_group->PlaceHolder = RemoveHtml($this->leave_group->caption());

		// leave_color
		$this->leave_color->EditAttrs["class"] = "form-control";
		$this->leave_color->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->leave_color->CurrentValue = HtmlDecode($this->leave_color->CurrentValue);
		$this->leave_color->EditValue = $this->leave_color->CurrentValue;
		$this->leave_color->PlaceHolder = RemoveHtml($this->leave_color->caption());

		// max_carried_forward_amount
		$this->max_carried_forward_amount->EditAttrs["class"] = "form-control";
		$this->max_carried_forward_amount->EditCustomAttributes = "";
		$this->max_carried_forward_amount->EditValue = $this->max_carried_forward_amount->CurrentValue;
		$this->max_carried_forward_amount->PlaceHolder = RemoveHtml($this->max_carried_forward_amount->caption());

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
					$doc->exportCaption($this->name);
					$doc->exportCaption($this->supervisor_leave_assign);
					$doc->exportCaption($this->employee_can_apply);
					$doc->exportCaption($this->apply_beyond_current);
					$doc->exportCaption($this->leave_accrue);
					$doc->exportCaption($this->carried_forward);
					$doc->exportCaption($this->default_per_year);
					$doc->exportCaption($this->carried_forward_percentage);
					$doc->exportCaption($this->carried_forward_leave_availability);
					$doc->exportCaption($this->propotionate_on_joined_date);
					$doc->exportCaption($this->send_notification_emails);
					$doc->exportCaption($this->leave_group);
					$doc->exportCaption($this->leave_color);
					$doc->exportCaption($this->max_carried_forward_amount);
					$doc->exportCaption($this->HospID);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->name);
					$doc->exportCaption($this->supervisor_leave_assign);
					$doc->exportCaption($this->employee_can_apply);
					$doc->exportCaption($this->apply_beyond_current);
					$doc->exportCaption($this->leave_accrue);
					$doc->exportCaption($this->carried_forward);
					$doc->exportCaption($this->default_per_year);
					$doc->exportCaption($this->carried_forward_percentage);
					$doc->exportCaption($this->carried_forward_leave_availability);
					$doc->exportCaption($this->propotionate_on_joined_date);
					$doc->exportCaption($this->send_notification_emails);
					$doc->exportCaption($this->leave_group);
					$doc->exportCaption($this->leave_color);
					$doc->exportCaption($this->max_carried_forward_amount);
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
						$doc->exportField($this->name);
						$doc->exportField($this->supervisor_leave_assign);
						$doc->exportField($this->employee_can_apply);
						$doc->exportField($this->apply_beyond_current);
						$doc->exportField($this->leave_accrue);
						$doc->exportField($this->carried_forward);
						$doc->exportField($this->default_per_year);
						$doc->exportField($this->carried_forward_percentage);
						$doc->exportField($this->carried_forward_leave_availability);
						$doc->exportField($this->propotionate_on_joined_date);
						$doc->exportField($this->send_notification_emails);
						$doc->exportField($this->leave_group);
						$doc->exportField($this->leave_color);
						$doc->exportField($this->max_carried_forward_amount);
						$doc->exportField($this->HospID);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->name);
						$doc->exportField($this->supervisor_leave_assign);
						$doc->exportField($this->employee_can_apply);
						$doc->exportField($this->apply_beyond_current);
						$doc->exportField($this->leave_accrue);
						$doc->exportField($this->carried_forward);
						$doc->exportField($this->default_per_year);
						$doc->exportField($this->carried_forward_percentage);
						$doc->exportField($this->carried_forward_leave_availability);
						$doc->exportField($this->propotionate_on_joined_date);
						$doc->exportField($this->send_notification_emails);
						$doc->exportField($this->leave_group);
						$doc->exportField($this->leave_color);
						$doc->exportField($this->max_carried_forward_amount);
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