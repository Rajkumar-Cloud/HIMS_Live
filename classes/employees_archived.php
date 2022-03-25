<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for employees_archived
 */
class employees_archived extends DbTable
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
	public $ref_id;
	public $employee_id;
	public $first_name;
	public $last_name;
	public $gender;
	public $ssn_num;
	public $nic_num;
	public $other_id;
	public $work_email;
	public $joined_date;
	public $confirmation_date;
	public $supervisor;
	public $department;
	public $termination_date;
	public $notes;
	public $data;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'employees_archived';
		$this->TableName = 'employees_archived';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`employees_archived`";
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
		$this->id = new DbField('employees_archived', 'employees_archived', 'x_id', 'id', '`id`', '`id`', 20, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// ref_id
		$this->ref_id = new DbField('employees_archived', 'employees_archived', 'x_ref_id', 'ref_id', '`ref_id`', '`ref_id`', 20, -1, FALSE, '`ref_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ref_id->Nullable = FALSE; // NOT NULL field
		$this->ref_id->Required = TRUE; // Required field
		$this->ref_id->Sortable = TRUE; // Allow sort
		$this->ref_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['ref_id'] = &$this->ref_id;

		// employee_id
		$this->employee_id = new DbField('employees_archived', 'employees_archived', 'x_employee_id', 'employee_id', '`employee_id`', '`employee_id`', 200, -1, FALSE, '`employee_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->employee_id->Sortable = TRUE; // Allow sort
		$this->fields['employee_id'] = &$this->employee_id;

		// first_name
		$this->first_name = new DbField('employees_archived', 'employees_archived', 'x_first_name', 'first_name', '`first_name`', '`first_name`', 200, -1, FALSE, '`first_name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->first_name->Nullable = FALSE; // NOT NULL field
		$this->first_name->Required = TRUE; // Required field
		$this->first_name->Sortable = TRUE; // Allow sort
		$this->fields['first_name'] = &$this->first_name;

		// last_name
		$this->last_name = new DbField('employees_archived', 'employees_archived', 'x_last_name', 'last_name', '`last_name`', '`last_name`', 200, -1, FALSE, '`last_name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->last_name->Nullable = FALSE; // NOT NULL field
		$this->last_name->Required = TRUE; // Required field
		$this->last_name->Sortable = TRUE; // Allow sort
		$this->fields['last_name'] = &$this->last_name;

		// gender
		$this->gender = new DbField('employees_archived', 'employees_archived', 'x_gender', 'gender', '`gender`', '`gender`', 202, -1, FALSE, '`gender`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->gender->Sortable = TRUE; // Allow sort
		$this->gender->Lookup = new Lookup('gender', 'employees_archived', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->gender->OptionCount = 2;
		$this->fields['gender'] = &$this->gender;

		// ssn_num
		$this->ssn_num = new DbField('employees_archived', 'employees_archived', 'x_ssn_num', 'ssn_num', '`ssn_num`', '`ssn_num`', 200, -1, FALSE, '`ssn_num`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ssn_num->Sortable = TRUE; // Allow sort
		$this->fields['ssn_num'] = &$this->ssn_num;

		// nic_num
		$this->nic_num = new DbField('employees_archived', 'employees_archived', 'x_nic_num', 'nic_num', '`nic_num`', '`nic_num`', 200, -1, FALSE, '`nic_num`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nic_num->Sortable = TRUE; // Allow sort
		$this->fields['nic_num'] = &$this->nic_num;

		// other_id
		$this->other_id = new DbField('employees_archived', 'employees_archived', 'x_other_id', 'other_id', '`other_id`', '`other_id`', 200, -1, FALSE, '`other_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->other_id->Sortable = TRUE; // Allow sort
		$this->fields['other_id'] = &$this->other_id;

		// work_email
		$this->work_email = new DbField('employees_archived', 'employees_archived', 'x_work_email', 'work_email', '`work_email`', '`work_email`', 200, -1, FALSE, '`work_email`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->work_email->Sortable = TRUE; // Allow sort
		$this->fields['work_email'] = &$this->work_email;

		// joined_date
		$this->joined_date = new DbField('employees_archived', 'employees_archived', 'x_joined_date', 'joined_date', '`joined_date`', CastDateFieldForLike('`joined_date`', 0, "DB"), 135, 0, FALSE, '`joined_date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->joined_date->Sortable = TRUE; // Allow sort
		$this->joined_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['joined_date'] = &$this->joined_date;

		// confirmation_date
		$this->confirmation_date = new DbField('employees_archived', 'employees_archived', 'x_confirmation_date', 'confirmation_date', '`confirmation_date`', CastDateFieldForLike('`confirmation_date`', 0, "DB"), 135, 0, FALSE, '`confirmation_date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->confirmation_date->Sortable = TRUE; // Allow sort
		$this->confirmation_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['confirmation_date'] = &$this->confirmation_date;

		// supervisor
		$this->supervisor = new DbField('employees_archived', 'employees_archived', 'x_supervisor', 'supervisor', '`supervisor`', '`supervisor`', 20, -1, FALSE, '`supervisor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->supervisor->Sortable = TRUE; // Allow sort
		$this->supervisor->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['supervisor'] = &$this->supervisor;

		// department
		$this->department = new DbField('employees_archived', 'employees_archived', 'x_department', 'department', '`department`', '`department`', 20, -1, FALSE, '`department`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->department->Sortable = TRUE; // Allow sort
		$this->department->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['department'] = &$this->department;

		// termination_date
		$this->termination_date = new DbField('employees_archived', 'employees_archived', 'x_termination_date', 'termination_date', '`termination_date`', CastDateFieldForLike('`termination_date`', 0, "DB"), 135, 0, FALSE, '`termination_date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->termination_date->Sortable = TRUE; // Allow sort
		$this->termination_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['termination_date'] = &$this->termination_date;

		// notes
		$this->notes = new DbField('employees_archived', 'employees_archived', 'x_notes', 'notes', '`notes`', '`notes`', 201, -1, FALSE, '`notes`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->notes->Sortable = TRUE; // Allow sort
		$this->fields['notes'] = &$this->notes;

		// data
		$this->data = new DbField('employees_archived', 'employees_archived', 'x_data', 'data', '`data`', '`data`', 201, -1, FALSE, '`data`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->data->Sortable = TRUE; // Allow sort
		$this->fields['data'] = &$this->data;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`employees_archived`";
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
		$this->ref_id->DbValue = $row['ref_id'];
		$this->employee_id->DbValue = $row['employee_id'];
		$this->first_name->DbValue = $row['first_name'];
		$this->last_name->DbValue = $row['last_name'];
		$this->gender->DbValue = $row['gender'];
		$this->ssn_num->DbValue = $row['ssn_num'];
		$this->nic_num->DbValue = $row['nic_num'];
		$this->other_id->DbValue = $row['other_id'];
		$this->work_email->DbValue = $row['work_email'];
		$this->joined_date->DbValue = $row['joined_date'];
		$this->confirmation_date->DbValue = $row['confirmation_date'];
		$this->supervisor->DbValue = $row['supervisor'];
		$this->department->DbValue = $row['department'];
		$this->termination_date->DbValue = $row['termination_date'];
		$this->notes->DbValue = $row['notes'];
		$this->data->DbValue = $row['data'];
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
			return "employees_archivedlist.php";
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
		if ($pageName == "employees_archivedview.php")
			return $Language->phrase("View");
		elseif ($pageName == "employees_archivededit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "employees_archivedadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "employees_archivedlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("employees_archivedview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("employees_archivedview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "employees_archivedadd.php?" . $this->getUrlParm($parm);
		else
			$url = "employees_archivedadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("employees_archivededit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("employees_archivedadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("employees_archiveddelete.php", $this->getUrlParm());
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
		$this->ref_id->setDbValue($rs->fields('ref_id'));
		$this->employee_id->setDbValue($rs->fields('employee_id'));
		$this->first_name->setDbValue($rs->fields('first_name'));
		$this->last_name->setDbValue($rs->fields('last_name'));
		$this->gender->setDbValue($rs->fields('gender'));
		$this->ssn_num->setDbValue($rs->fields('ssn_num'));
		$this->nic_num->setDbValue($rs->fields('nic_num'));
		$this->other_id->setDbValue($rs->fields('other_id'));
		$this->work_email->setDbValue($rs->fields('work_email'));
		$this->joined_date->setDbValue($rs->fields('joined_date'));
		$this->confirmation_date->setDbValue($rs->fields('confirmation_date'));
		$this->supervisor->setDbValue($rs->fields('supervisor'));
		$this->department->setDbValue($rs->fields('department'));
		$this->termination_date->setDbValue($rs->fields('termination_date'));
		$this->notes->setDbValue($rs->fields('notes'));
		$this->data->setDbValue($rs->fields('data'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// ref_id
		// employee_id
		// first_name
		// last_name
		// gender
		// ssn_num
		// nic_num
		// other_id
		// work_email
		// joined_date
		// confirmation_date
		// supervisor
		// department
		// termination_date
		// notes
		// data
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// ref_id
		$this->ref_id->ViewValue = $this->ref_id->CurrentValue;
		$this->ref_id->ViewValue = FormatNumber($this->ref_id->ViewValue, 0, -2, -2, -2);
		$this->ref_id->ViewCustomAttributes = "";

		// employee_id
		$this->employee_id->ViewValue = $this->employee_id->CurrentValue;
		$this->employee_id->ViewCustomAttributes = "";

		// first_name
		$this->first_name->ViewValue = $this->first_name->CurrentValue;
		$this->first_name->ViewCustomAttributes = "";

		// last_name
		$this->last_name->ViewValue = $this->last_name->CurrentValue;
		$this->last_name->ViewCustomAttributes = "";

		// gender
		if (strval($this->gender->CurrentValue) <> "") {
			$this->gender->ViewValue = $this->gender->optionCaption($this->gender->CurrentValue);
		} else {
			$this->gender->ViewValue = NULL;
		}
		$this->gender->ViewCustomAttributes = "";

		// ssn_num
		$this->ssn_num->ViewValue = $this->ssn_num->CurrentValue;
		$this->ssn_num->ViewCustomAttributes = "";

		// nic_num
		$this->nic_num->ViewValue = $this->nic_num->CurrentValue;
		$this->nic_num->ViewCustomAttributes = "";

		// other_id
		$this->other_id->ViewValue = $this->other_id->CurrentValue;
		$this->other_id->ViewCustomAttributes = "";

		// work_email
		$this->work_email->ViewValue = $this->work_email->CurrentValue;
		$this->work_email->ViewCustomAttributes = "";

		// joined_date
		$this->joined_date->ViewValue = $this->joined_date->CurrentValue;
		$this->joined_date->ViewValue = FormatDateTime($this->joined_date->ViewValue, 0);
		$this->joined_date->ViewCustomAttributes = "";

		// confirmation_date
		$this->confirmation_date->ViewValue = $this->confirmation_date->CurrentValue;
		$this->confirmation_date->ViewValue = FormatDateTime($this->confirmation_date->ViewValue, 0);
		$this->confirmation_date->ViewCustomAttributes = "";

		// supervisor
		$this->supervisor->ViewValue = $this->supervisor->CurrentValue;
		$this->supervisor->ViewValue = FormatNumber($this->supervisor->ViewValue, 0, -2, -2, -2);
		$this->supervisor->ViewCustomAttributes = "";

		// department
		$this->department->ViewValue = $this->department->CurrentValue;
		$this->department->ViewValue = FormatNumber($this->department->ViewValue, 0, -2, -2, -2);
		$this->department->ViewCustomAttributes = "";

		// termination_date
		$this->termination_date->ViewValue = $this->termination_date->CurrentValue;
		$this->termination_date->ViewValue = FormatDateTime($this->termination_date->ViewValue, 0);
		$this->termination_date->ViewCustomAttributes = "";

		// notes
		$this->notes->ViewValue = $this->notes->CurrentValue;
		$this->notes->ViewCustomAttributes = "";

		// data
		$this->data->ViewValue = $this->data->CurrentValue;
		$this->data->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// ref_id
		$this->ref_id->LinkCustomAttributes = "";
		$this->ref_id->HrefValue = "";
		$this->ref_id->TooltipValue = "";

		// employee_id
		$this->employee_id->LinkCustomAttributes = "";
		$this->employee_id->HrefValue = "";
		$this->employee_id->TooltipValue = "";

		// first_name
		$this->first_name->LinkCustomAttributes = "";
		$this->first_name->HrefValue = "";
		$this->first_name->TooltipValue = "";

		// last_name
		$this->last_name->LinkCustomAttributes = "";
		$this->last_name->HrefValue = "";
		$this->last_name->TooltipValue = "";

		// gender
		$this->gender->LinkCustomAttributes = "";
		$this->gender->HrefValue = "";
		$this->gender->TooltipValue = "";

		// ssn_num
		$this->ssn_num->LinkCustomAttributes = "";
		$this->ssn_num->HrefValue = "";
		$this->ssn_num->TooltipValue = "";

		// nic_num
		$this->nic_num->LinkCustomAttributes = "";
		$this->nic_num->HrefValue = "";
		$this->nic_num->TooltipValue = "";

		// other_id
		$this->other_id->LinkCustomAttributes = "";
		$this->other_id->HrefValue = "";
		$this->other_id->TooltipValue = "";

		// work_email
		$this->work_email->LinkCustomAttributes = "";
		$this->work_email->HrefValue = "";
		$this->work_email->TooltipValue = "";

		// joined_date
		$this->joined_date->LinkCustomAttributes = "";
		$this->joined_date->HrefValue = "";
		$this->joined_date->TooltipValue = "";

		// confirmation_date
		$this->confirmation_date->LinkCustomAttributes = "";
		$this->confirmation_date->HrefValue = "";
		$this->confirmation_date->TooltipValue = "";

		// supervisor
		$this->supervisor->LinkCustomAttributes = "";
		$this->supervisor->HrefValue = "";
		$this->supervisor->TooltipValue = "";

		// department
		$this->department->LinkCustomAttributes = "";
		$this->department->HrefValue = "";
		$this->department->TooltipValue = "";

		// termination_date
		$this->termination_date->LinkCustomAttributes = "";
		$this->termination_date->HrefValue = "";
		$this->termination_date->TooltipValue = "";

		// notes
		$this->notes->LinkCustomAttributes = "";
		$this->notes->HrefValue = "";
		$this->notes->TooltipValue = "";

		// data
		$this->data->LinkCustomAttributes = "";
		$this->data->HrefValue = "";
		$this->data->TooltipValue = "";

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

		// ref_id
		$this->ref_id->EditAttrs["class"] = "form-control";
		$this->ref_id->EditCustomAttributes = "";
		$this->ref_id->EditValue = $this->ref_id->CurrentValue;
		$this->ref_id->PlaceHolder = RemoveHtml($this->ref_id->caption());

		// employee_id
		$this->employee_id->EditAttrs["class"] = "form-control";
		$this->employee_id->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->employee_id->CurrentValue = HtmlDecode($this->employee_id->CurrentValue);
		$this->employee_id->EditValue = $this->employee_id->CurrentValue;
		$this->employee_id->PlaceHolder = RemoveHtml($this->employee_id->caption());

		// first_name
		$this->first_name->EditAttrs["class"] = "form-control";
		$this->first_name->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->first_name->CurrentValue = HtmlDecode($this->first_name->CurrentValue);
		$this->first_name->EditValue = $this->first_name->CurrentValue;
		$this->first_name->PlaceHolder = RemoveHtml($this->first_name->caption());

		// last_name
		$this->last_name->EditAttrs["class"] = "form-control";
		$this->last_name->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->last_name->CurrentValue = HtmlDecode($this->last_name->CurrentValue);
		$this->last_name->EditValue = $this->last_name->CurrentValue;
		$this->last_name->PlaceHolder = RemoveHtml($this->last_name->caption());

		// gender
		$this->gender->EditCustomAttributes = "";
		$this->gender->EditValue = $this->gender->options(FALSE);

		// ssn_num
		$this->ssn_num->EditAttrs["class"] = "form-control";
		$this->ssn_num->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ssn_num->CurrentValue = HtmlDecode($this->ssn_num->CurrentValue);
		$this->ssn_num->EditValue = $this->ssn_num->CurrentValue;
		$this->ssn_num->PlaceHolder = RemoveHtml($this->ssn_num->caption());

		// nic_num
		$this->nic_num->EditAttrs["class"] = "form-control";
		$this->nic_num->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->nic_num->CurrentValue = HtmlDecode($this->nic_num->CurrentValue);
		$this->nic_num->EditValue = $this->nic_num->CurrentValue;
		$this->nic_num->PlaceHolder = RemoveHtml($this->nic_num->caption());

		// other_id
		$this->other_id->EditAttrs["class"] = "form-control";
		$this->other_id->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->other_id->CurrentValue = HtmlDecode($this->other_id->CurrentValue);
		$this->other_id->EditValue = $this->other_id->CurrentValue;
		$this->other_id->PlaceHolder = RemoveHtml($this->other_id->caption());

		// work_email
		$this->work_email->EditAttrs["class"] = "form-control";
		$this->work_email->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->work_email->CurrentValue = HtmlDecode($this->work_email->CurrentValue);
		$this->work_email->EditValue = $this->work_email->CurrentValue;
		$this->work_email->PlaceHolder = RemoveHtml($this->work_email->caption());

		// joined_date
		$this->joined_date->EditAttrs["class"] = "form-control";
		$this->joined_date->EditCustomAttributes = "";
		$this->joined_date->EditValue = FormatDateTime($this->joined_date->CurrentValue, 8);
		$this->joined_date->PlaceHolder = RemoveHtml($this->joined_date->caption());

		// confirmation_date
		$this->confirmation_date->EditAttrs["class"] = "form-control";
		$this->confirmation_date->EditCustomAttributes = "";
		$this->confirmation_date->EditValue = FormatDateTime($this->confirmation_date->CurrentValue, 8);
		$this->confirmation_date->PlaceHolder = RemoveHtml($this->confirmation_date->caption());

		// supervisor
		$this->supervisor->EditAttrs["class"] = "form-control";
		$this->supervisor->EditCustomAttributes = "";
		$this->supervisor->EditValue = $this->supervisor->CurrentValue;
		$this->supervisor->PlaceHolder = RemoveHtml($this->supervisor->caption());

		// department
		$this->department->EditAttrs["class"] = "form-control";
		$this->department->EditCustomAttributes = "";
		$this->department->EditValue = $this->department->CurrentValue;
		$this->department->PlaceHolder = RemoveHtml($this->department->caption());

		// termination_date
		$this->termination_date->EditAttrs["class"] = "form-control";
		$this->termination_date->EditCustomAttributes = "";
		$this->termination_date->EditValue = FormatDateTime($this->termination_date->CurrentValue, 8);
		$this->termination_date->PlaceHolder = RemoveHtml($this->termination_date->caption());

		// notes
		$this->notes->EditAttrs["class"] = "form-control";
		$this->notes->EditCustomAttributes = "";
		$this->notes->EditValue = $this->notes->CurrentValue;
		$this->notes->PlaceHolder = RemoveHtml($this->notes->caption());

		// data
		$this->data->EditAttrs["class"] = "form-control";
		$this->data->EditCustomAttributes = "";
		$this->data->EditValue = $this->data->CurrentValue;
		$this->data->PlaceHolder = RemoveHtml($this->data->caption());

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
					$doc->exportCaption($this->ref_id);
					$doc->exportCaption($this->employee_id);
					$doc->exportCaption($this->first_name);
					$doc->exportCaption($this->last_name);
					$doc->exportCaption($this->gender);
					$doc->exportCaption($this->ssn_num);
					$doc->exportCaption($this->nic_num);
					$doc->exportCaption($this->other_id);
					$doc->exportCaption($this->work_email);
					$doc->exportCaption($this->joined_date);
					$doc->exportCaption($this->confirmation_date);
					$doc->exportCaption($this->supervisor);
					$doc->exportCaption($this->department);
					$doc->exportCaption($this->termination_date);
					$doc->exportCaption($this->notes);
					$doc->exportCaption($this->data);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->ref_id);
					$doc->exportCaption($this->employee_id);
					$doc->exportCaption($this->first_name);
					$doc->exportCaption($this->last_name);
					$doc->exportCaption($this->gender);
					$doc->exportCaption($this->ssn_num);
					$doc->exportCaption($this->nic_num);
					$doc->exportCaption($this->other_id);
					$doc->exportCaption($this->work_email);
					$doc->exportCaption($this->joined_date);
					$doc->exportCaption($this->confirmation_date);
					$doc->exportCaption($this->supervisor);
					$doc->exportCaption($this->department);
					$doc->exportCaption($this->termination_date);
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
						$doc->exportField($this->ref_id);
						$doc->exportField($this->employee_id);
						$doc->exportField($this->first_name);
						$doc->exportField($this->last_name);
						$doc->exportField($this->gender);
						$doc->exportField($this->ssn_num);
						$doc->exportField($this->nic_num);
						$doc->exportField($this->other_id);
						$doc->exportField($this->work_email);
						$doc->exportField($this->joined_date);
						$doc->exportField($this->confirmation_date);
						$doc->exportField($this->supervisor);
						$doc->exportField($this->department);
						$doc->exportField($this->termination_date);
						$doc->exportField($this->notes);
						$doc->exportField($this->data);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->ref_id);
						$doc->exportField($this->employee_id);
						$doc->exportField($this->first_name);
						$doc->exportField($this->last_name);
						$doc->exportField($this->gender);
						$doc->exportField($this->ssn_num);
						$doc->exportField($this->nic_num);
						$doc->exportField($this->other_id);
						$doc->exportField($this->work_email);
						$doc->exportField($this->joined_date);
						$doc->exportField($this->confirmation_date);
						$doc->exportField($this->supervisor);
						$doc->exportField($this->department);
						$doc->exportField($this->termination_date);
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