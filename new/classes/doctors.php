<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for doctors
 */
class doctors extends DbTable
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
	public $CODE;
	public $NAME;
	public $DEPARTMENT;
	public $start_time;
	public $end_time;
	public $start_time1;
	public $end_time1;
	public $start_time2;
	public $end_time2;
	public $slot_time;
	public $Fees;
	public $ProfilePic;
	public $slot_days;
	public $Status;
	public $scheduler_id;
	public $HospID;
	public $Designation;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'doctors';
		$this->TableName = 'doctors';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`doctors`";
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
		$this->id = new DbField('doctors', 'doctors', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->IsForeignKey = TRUE; // Foreign key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// CODE
		$this->CODE = new DbField('doctors', 'doctors', 'x_CODE', 'CODE', '`CODE`', '`CODE`', 200, 45, -1, FALSE, '`CODE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CODE->Required = TRUE; // Required field
		$this->CODE->Sortable = TRUE; // Allow sort
		$this->fields['CODE'] = &$this->CODE;

		// NAME
		$this->NAME = new DbField('doctors', 'doctors', 'x_NAME', 'NAME', '`NAME`', '`NAME`', 200, 45, -1, FALSE, '`NAME`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NAME->Required = TRUE; // Required field
		$this->NAME->Sortable = TRUE; // Allow sort
		$this->fields['NAME'] = &$this->NAME;

		// DEPARTMENT
		$this->DEPARTMENT = new DbField('doctors', 'doctors', 'x_DEPARTMENT', 'DEPARTMENT', '`DEPARTMENT`', '`DEPARTMENT`', 200, 45, -1, FALSE, '`DEPARTMENT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DEPARTMENT->Required = TRUE; // Required field
		$this->DEPARTMENT->Sortable = TRUE; // Allow sort
		$this->fields['DEPARTMENT'] = &$this->DEPARTMENT;

		// start_time
		$this->start_time = new DbField('doctors', 'doctors', 'x_start_time', 'start_time', '`start_time`', '`start_time`', 200, 45, 4, FALSE, '`start_time`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->start_time->Sortable = TRUE; // Allow sort
		$this->fields['start_time'] = &$this->start_time;

		// end_time
		$this->end_time = new DbField('doctors', 'doctors', 'x_end_time', 'end_time', '`end_time`', '`end_time`', 200, 45, 4, FALSE, '`end_time`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->end_time->Sortable = TRUE; // Allow sort
		$this->fields['end_time'] = &$this->end_time;

		// start_time1
		$this->start_time1 = new DbField('doctors', 'doctors', 'x_start_time1', 'start_time1', '`start_time1`', '`start_time1`', 200, 45, 4, FALSE, '`start_time1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->start_time1->Sortable = TRUE; // Allow sort
		$this->fields['start_time1'] = &$this->start_time1;

		// end_time1
		$this->end_time1 = new DbField('doctors', 'doctors', 'x_end_time1', 'end_time1', '`end_time1`', '`end_time1`', 200, 45, 4, FALSE, '`end_time1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->end_time1->Sortable = TRUE; // Allow sort
		$this->fields['end_time1'] = &$this->end_time1;

		// start_time2
		$this->start_time2 = new DbField('doctors', 'doctors', 'x_start_time2', 'start_time2', '`start_time2`', '`start_time2`', 200, 45, 4, FALSE, '`start_time2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->start_time2->Sortable = TRUE; // Allow sort
		$this->fields['start_time2'] = &$this->start_time2;

		// end_time2
		$this->end_time2 = new DbField('doctors', 'doctors', 'x_end_time2', 'end_time2', '`end_time2`', '`end_time2`', 200, 45, 4, FALSE, '`end_time2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->end_time2->Sortable = TRUE; // Allow sort
		$this->fields['end_time2'] = &$this->end_time2;

		// slot_time
		$this->slot_time = new DbField('doctors', 'doctors', 'x_slot_time', 'slot_time', '`slot_time`', '`slot_time`', 200, 45, -1, FALSE, '`slot_time`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->slot_time->Sortable = TRUE; // Allow sort
		$this->slot_time->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['slot_time'] = &$this->slot_time;

		// Fees
		$this->Fees = new DbField('doctors', 'doctors', 'x_Fees', 'Fees', '`Fees`', '`Fees`', 5, 22, -1, FALSE, '`Fees`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Fees->Sortable = TRUE; // Allow sort
		$this->Fees->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Fees'] = &$this->Fees;

		// ProfilePic
		$this->ProfilePic = new DbField('doctors', 'doctors', 'x_ProfilePic', 'ProfilePic', '`ProfilePic`', '`ProfilePic`', 201, 450, -1, TRUE, '`ProfilePic`', FALSE, FALSE, FALSE, 'IMAGE', 'FILE');
		$this->ProfilePic->Sortable = TRUE; // Allow sort
		$this->fields['ProfilePic'] = &$this->ProfilePic;

		// slot_days
		$this->slot_days = new DbField('doctors', 'doctors', 'x_slot_days', 'slot_days', '`slot_days`', '`slot_days`', 200, 45, -1, FALSE, '`slot_days`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->slot_days->Sortable = TRUE; // Allow sort
		$this->slot_days->Lookup = new Lookup('slot_days', 'sys_days', FALSE, 'id', ["Days","","",""], [], [], [], [], [], [], '', '');
		$this->fields['slot_days'] = &$this->slot_days;

		// Status
		$this->Status = new DbField('doctors', 'doctors', 'x_Status', 'Status', '`Status`', '`Status`', 3, 11, -1, FALSE, '`Status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Status->Sortable = TRUE; // Allow sort
		$this->Status->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Status->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Status->Lookup = new Lookup('Status', 'sys_status', FALSE, 'id', ["Name","","",""], [], [], [], [], [], [], '', '');
		$this->Status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Status'] = &$this->Status;

		// scheduler_id
		$this->scheduler_id = new DbField('doctors', 'doctors', 'x_scheduler_id', 'scheduler_id', '`scheduler_id`', '`scheduler_id`', 200, 45, -1, FALSE, '`scheduler_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->scheduler_id->Sortable = TRUE; // Allow sort
		$this->fields['scheduler_id'] = &$this->scheduler_id;

		// HospID
		$this->HospID = new DbField('doctors', 'doctors', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HospID'] = &$this->HospID;

		// Designation
		$this->Designation = new DbField('doctors', 'doctors', 'x_Designation', 'Designation', '`Designation`', '`Designation`', 200, 45, -1, FALSE, '`Designation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Designation->Sortable = TRUE; // Allow sort
		$this->fields['Designation'] = &$this->Designation;
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
		if ($this->getCurrentDetailTable() == "appointment_scheduler") {
			$detailUrl = $GLOBALS["appointment_scheduler"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
		}
		if ($detailUrl == "")
			$detailUrl = "doctorslist.php";
		return $detailUrl;
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`doctors`";
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
		$this->CODE->DbValue = $row['CODE'];
		$this->NAME->DbValue = $row['NAME'];
		$this->DEPARTMENT->DbValue = $row['DEPARTMENT'];
		$this->start_time->DbValue = $row['start_time'];
		$this->end_time->DbValue = $row['end_time'];
		$this->start_time1->DbValue = $row['start_time1'];
		$this->end_time1->DbValue = $row['end_time1'];
		$this->start_time2->DbValue = $row['start_time2'];
		$this->end_time2->DbValue = $row['end_time2'];
		$this->slot_time->DbValue = $row['slot_time'];
		$this->Fees->DbValue = $row['Fees'];
		$this->ProfilePic->Upload->DbValue = $row['ProfilePic'];
		$this->slot_days->DbValue = $row['slot_days'];
		$this->Status->DbValue = $row['Status'];
		$this->scheduler_id->DbValue = $row['scheduler_id'];
		$this->HospID->DbValue = $row['HospID'];
		$this->Designation->DbValue = $row['Designation'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
		$oldFiles = EmptyValue($row['ProfilePic']) ? [] : [$row['ProfilePic']];
		foreach ($oldFiles as $oldFile) {
			if (file_exists($this->ProfilePic->oldPhysicalUploadPath() . $oldFile))
				@unlink($this->ProfilePic->oldPhysicalUploadPath() . $oldFile);
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
			return "doctorslist.php";
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
		if ($pageName == "doctorsview.php")
			return $Language->phrase("View");
		elseif ($pageName == "doctorsedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "doctorsadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "doctorslist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("doctorsview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("doctorsview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "doctorsadd.php?" . $this->getUrlParm($parm);
		else
			$url = "doctorsadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("doctorsedit.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("doctorsedit.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
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
			$url = $this->keyUrl("doctorsadd.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("doctorsadd.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
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
		return $this->keyUrl("doctorsdelete.php", $this->getUrlParm());
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
		$this->CODE->setDbValue($rs->fields('CODE'));
		$this->NAME->setDbValue($rs->fields('NAME'));
		$this->DEPARTMENT->setDbValue($rs->fields('DEPARTMENT'));
		$this->start_time->setDbValue($rs->fields('start_time'));
		$this->end_time->setDbValue($rs->fields('end_time'));
		$this->start_time1->setDbValue($rs->fields('start_time1'));
		$this->end_time1->setDbValue($rs->fields('end_time1'));
		$this->start_time2->setDbValue($rs->fields('start_time2'));
		$this->end_time2->setDbValue($rs->fields('end_time2'));
		$this->slot_time->setDbValue($rs->fields('slot_time'));
		$this->Fees->setDbValue($rs->fields('Fees'));
		$this->ProfilePic->Upload->DbValue = $rs->fields('ProfilePic');
		$this->slot_days->setDbValue($rs->fields('slot_days'));
		$this->Status->setDbValue($rs->fields('Status'));
		$this->scheduler_id->setDbValue($rs->fields('scheduler_id'));
		$this->HospID->setDbValue($rs->fields('HospID'));
		$this->Designation->setDbValue($rs->fields('Designation'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// CODE
		// NAME
		// DEPARTMENT
		// start_time
		// end_time
		// start_time1
		// end_time1
		// start_time2
		// end_time2
		// slot_time
		// Fees
		// ProfilePic
		// slot_days
		// Status
		// scheduler_id
		// HospID
		// Designation
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

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

		// start_time1
		$this->start_time1->ViewValue = $this->start_time1->CurrentValue;
		$this->start_time1->ViewCustomAttributes = "";

		// end_time1
		$this->end_time1->ViewValue = $this->end_time1->CurrentValue;
		$this->end_time1->ViewCustomAttributes = "";

		// start_time2
		$this->start_time2->ViewValue = $this->start_time2->CurrentValue;
		$this->start_time2->ViewCustomAttributes = "";

		// end_time2
		$this->end_time2->ViewValue = $this->end_time2->CurrentValue;
		$this->end_time2->ViewCustomAttributes = "";

		// slot_time
		$this->slot_time->ViewValue = $this->slot_time->CurrentValue;
		$this->slot_time->ViewCustomAttributes = "";

		// Fees
		$this->Fees->ViewValue = $this->Fees->CurrentValue;
		$this->Fees->ViewValue = FormatNumber($this->Fees->ViewValue, 2, -2, -2, -2);
		$this->Fees->ViewCustomAttributes = "";

		// ProfilePic
		if (!EmptyValue($this->ProfilePic->Upload->DbValue)) {
			$this->ProfilePic->ImageWidth = 80;
			$this->ProfilePic->ImageHeight = 80;
			$this->ProfilePic->ImageAlt = $this->ProfilePic->alt();
			$this->ProfilePic->ViewValue = $this->ProfilePic->Upload->DbValue;
		} else {
			$this->ProfilePic->ViewValue = "";
		}
		$this->ProfilePic->ViewCustomAttributes = "";

		// slot_days
		$curVal = strval($this->slot_days->CurrentValue);
		if ($curVal != "") {
			$this->slot_days->ViewValue = $this->slot_days->lookupCacheOption($curVal);
			if ($this->slot_days->ViewValue === NULL) { // Lookup from database
				$arwrk = explode(",", $curVal);
				$filterWrk = "";
				foreach ($arwrk as $wrk) {
					if ($filterWrk != "")
						$filterWrk .= " OR ";
					$filterWrk .= "`id`" . SearchString("=", trim($wrk), DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->slot_days->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$this->slot_days->ViewValue = new OptionValues();
					$ari = 0;
					while (!$rswrk->EOF) {
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->slot_days->ViewValue->add($this->slot_days->displayValue($arwrk));
						$rswrk->MoveNext();
						$ari++;
					}
					$rswrk->Close();
				} else {
					$this->slot_days->ViewValue = $this->slot_days->CurrentValue;
				}
			}
		} else {
			$this->slot_days->ViewValue = NULL;
		}
		$this->slot_days->ViewCustomAttributes = "";

		// Status
		$curVal = strval($this->Status->CurrentValue);
		if ($curVal != "") {
			$this->Status->ViewValue = $this->Status->lookupCacheOption($curVal);
			if ($this->Status->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->Status->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->Status->ViewValue = $this->Status->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Status->ViewValue = $this->Status->CurrentValue;
				}
			}
		} else {
			$this->Status->ViewValue = NULL;
		}
		$this->Status->ViewCustomAttributes = "";

		// scheduler_id
		$this->scheduler_id->ViewValue = $this->scheduler_id->CurrentValue;
		$this->scheduler_id->ViewCustomAttributes = "";

		// HospID
		$this->HospID->ViewValue = $this->HospID->CurrentValue;
		$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
		$this->HospID->ViewCustomAttributes = "";

		// Designation
		$this->Designation->ViewValue = $this->Designation->CurrentValue;
		$this->Designation->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

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

		// start_time1
		$this->start_time1->LinkCustomAttributes = "";
		$this->start_time1->HrefValue = "";
		$this->start_time1->TooltipValue = "";

		// end_time1
		$this->end_time1->LinkCustomAttributes = "";
		$this->end_time1->HrefValue = "";
		$this->end_time1->TooltipValue = "";

		// start_time2
		$this->start_time2->LinkCustomAttributes = "";
		$this->start_time2->HrefValue = "";
		$this->start_time2->TooltipValue = "";

		// end_time2
		$this->end_time2->LinkCustomAttributes = "";
		$this->end_time2->HrefValue = "";
		$this->end_time2->TooltipValue = "";

		// slot_time
		$this->slot_time->LinkCustomAttributes = "";
		$this->slot_time->HrefValue = "";
		$this->slot_time->TooltipValue = "";

		// Fees
		$this->Fees->LinkCustomAttributes = "";
		$this->Fees->HrefValue = "";
		$this->Fees->TooltipValue = "";

		// ProfilePic
		$this->ProfilePic->LinkCustomAttributes = "";
		if (!EmptyValue($this->ProfilePic->Upload->DbValue)) {
			$this->ProfilePic->HrefValue = GetFileUploadUrl($this->ProfilePic, $this->ProfilePic->htmlDecode($this->ProfilePic->Upload->DbValue)); // Add prefix/suffix
			$this->ProfilePic->LinkAttrs["target"] = ""; // Add target
			if ($this->isExport())
				$this->ProfilePic->HrefValue = FullUrl($this->ProfilePic->HrefValue, "href");
		} else {
			$this->ProfilePic->HrefValue = "";
		}
		$this->ProfilePic->ExportHrefValue = $this->ProfilePic->UploadPath . $this->ProfilePic->Upload->DbValue;
		$this->ProfilePic->TooltipValue = "";
		if ($this->ProfilePic->UseColorbox) {
			if (EmptyValue($this->ProfilePic->TooltipValue))
				$this->ProfilePic->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
			$this->ProfilePic->LinkAttrs["data-rel"] = "doctors_x_ProfilePic";
			$this->ProfilePic->LinkAttrs->appendClass("ew-lightbox");
		}

		// slot_days
		$this->slot_days->LinkCustomAttributes = "";
		$this->slot_days->HrefValue = "";
		$this->slot_days->TooltipValue = "";

		// Status
		$this->Status->LinkCustomAttributes = "";
		$this->Status->HrefValue = "";
		$this->Status->TooltipValue = "";

		// scheduler_id
		$this->scheduler_id->LinkCustomAttributes = "";
		$this->scheduler_id->HrefValue = "";
		$this->scheduler_id->TooltipValue = "";

		// HospID
		$this->HospID->LinkCustomAttributes = "";
		$this->HospID->HrefValue = "";
		$this->HospID->TooltipValue = "";

		// Designation
		$this->Designation->LinkCustomAttributes = "";
		$this->Designation->HrefValue = "";
		$this->Designation->TooltipValue = "";

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

		// CODE
		$this->CODE->EditAttrs["class"] = "form-control";
		$this->CODE->EditCustomAttributes = "";
		if (!$this->CODE->Raw)
			$this->CODE->CurrentValue = HtmlDecode($this->CODE->CurrentValue);
		$this->CODE->EditValue = $this->CODE->CurrentValue;
		$this->CODE->PlaceHolder = RemoveHtml($this->CODE->caption());

		// NAME
		$this->NAME->EditAttrs["class"] = "form-control";
		$this->NAME->EditCustomAttributes = "";
		if (!$this->NAME->Raw)
			$this->NAME->CurrentValue = HtmlDecode($this->NAME->CurrentValue);
		$this->NAME->EditValue = $this->NAME->CurrentValue;
		$this->NAME->PlaceHolder = RemoveHtml($this->NAME->caption());

		// DEPARTMENT
		$this->DEPARTMENT->EditAttrs["class"] = "form-control";
		$this->DEPARTMENT->EditCustomAttributes = "";
		if (!$this->DEPARTMENT->Raw)
			$this->DEPARTMENT->CurrentValue = HtmlDecode($this->DEPARTMENT->CurrentValue);
		$this->DEPARTMENT->EditValue = $this->DEPARTMENT->CurrentValue;
		$this->DEPARTMENT->PlaceHolder = RemoveHtml($this->DEPARTMENT->caption());

		// start_time
		$this->start_time->EditAttrs["class"] = "form-control";
		$this->start_time->EditCustomAttributes = "";
		if (!$this->start_time->Raw)
			$this->start_time->CurrentValue = HtmlDecode($this->start_time->CurrentValue);
		$this->start_time->EditValue = $this->start_time->CurrentValue;
		$this->start_time->PlaceHolder = RemoveHtml($this->start_time->caption());

		// end_time
		$this->end_time->EditAttrs["class"] = "form-control";
		$this->end_time->EditCustomAttributes = "";
		if (!$this->end_time->Raw)
			$this->end_time->CurrentValue = HtmlDecode($this->end_time->CurrentValue);
		$this->end_time->EditValue = $this->end_time->CurrentValue;
		$this->end_time->PlaceHolder = RemoveHtml($this->end_time->caption());

		// start_time1
		$this->start_time1->EditAttrs["class"] = "form-control";
		$this->start_time1->EditCustomAttributes = "";
		if (!$this->start_time1->Raw)
			$this->start_time1->CurrentValue = HtmlDecode($this->start_time1->CurrentValue);
		$this->start_time1->EditValue = $this->start_time1->CurrentValue;
		$this->start_time1->PlaceHolder = RemoveHtml($this->start_time1->caption());

		// end_time1
		$this->end_time1->EditAttrs["class"] = "form-control";
		$this->end_time1->EditCustomAttributes = "";
		if (!$this->end_time1->Raw)
			$this->end_time1->CurrentValue = HtmlDecode($this->end_time1->CurrentValue);
		$this->end_time1->EditValue = $this->end_time1->CurrentValue;
		$this->end_time1->PlaceHolder = RemoveHtml($this->end_time1->caption());

		// start_time2
		$this->start_time2->EditAttrs["class"] = "form-control";
		$this->start_time2->EditCustomAttributes = "";
		if (!$this->start_time2->Raw)
			$this->start_time2->CurrentValue = HtmlDecode($this->start_time2->CurrentValue);
		$this->start_time2->EditValue = $this->start_time2->CurrentValue;
		$this->start_time2->PlaceHolder = RemoveHtml($this->start_time2->caption());

		// end_time2
		$this->end_time2->EditAttrs["class"] = "form-control";
		$this->end_time2->EditCustomAttributes = "";
		if (!$this->end_time2->Raw)
			$this->end_time2->CurrentValue = HtmlDecode($this->end_time2->CurrentValue);
		$this->end_time2->EditValue = $this->end_time2->CurrentValue;
		$this->end_time2->PlaceHolder = RemoveHtml($this->end_time2->caption());

		// slot_time
		$this->slot_time->EditAttrs["class"] = "form-control";
		$this->slot_time->EditCustomAttributes = "";
		if (!$this->slot_time->Raw)
			$this->slot_time->CurrentValue = HtmlDecode($this->slot_time->CurrentValue);
		$this->slot_time->EditValue = $this->slot_time->CurrentValue;
		$this->slot_time->PlaceHolder = RemoveHtml($this->slot_time->caption());

		// Fees
		$this->Fees->EditAttrs["class"] = "form-control";
		$this->Fees->EditCustomAttributes = "";
		$this->Fees->EditValue = $this->Fees->CurrentValue;
		$this->Fees->PlaceHolder = RemoveHtml($this->Fees->caption());
		if (strval($this->Fees->EditValue) != "" && is_numeric($this->Fees->EditValue))
			$this->Fees->EditValue = FormatNumber($this->Fees->EditValue, -2, -2, -2, -2);
		

		// ProfilePic
		$this->ProfilePic->EditAttrs["class"] = "form-control";
		$this->ProfilePic->EditCustomAttributes = "";
		if (!EmptyValue($this->ProfilePic->Upload->DbValue)) {
			$this->ProfilePic->ImageWidth = 80;
			$this->ProfilePic->ImageHeight = 80;
			$this->ProfilePic->ImageAlt = $this->ProfilePic->alt();
			$this->ProfilePic->EditValue = $this->ProfilePic->Upload->DbValue;
		} else {
			$this->ProfilePic->EditValue = "";
		}
		if (!EmptyValue($this->ProfilePic->CurrentValue))
				$this->ProfilePic->Upload->FileName = $this->ProfilePic->CurrentValue;

		// slot_days
		$this->slot_days->EditCustomAttributes = "";

		// Status
		$this->Status->EditAttrs["class"] = "form-control";
		$this->Status->EditCustomAttributes = "";

		// scheduler_id
		$this->scheduler_id->EditAttrs["class"] = "form-control";
		$this->scheduler_id->EditCustomAttributes = "";
		if (!$this->scheduler_id->Raw)
			$this->scheduler_id->CurrentValue = HtmlDecode($this->scheduler_id->CurrentValue);
		$this->scheduler_id->EditValue = $this->scheduler_id->CurrentValue;
		$this->scheduler_id->PlaceHolder = RemoveHtml($this->scheduler_id->caption());

		// HospID
		// Designation

		$this->Designation->EditAttrs["class"] = "form-control";
		$this->Designation->EditCustomAttributes = "";
		if (!$this->Designation->Raw)
			$this->Designation->CurrentValue = HtmlDecode($this->Designation->CurrentValue);
		$this->Designation->EditValue = $this->Designation->CurrentValue;
		$this->Designation->PlaceHolder = RemoveHtml($this->Designation->caption());

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
					$doc->exportCaption($this->CODE);
					$doc->exportCaption($this->NAME);
					$doc->exportCaption($this->DEPARTMENT);
					$doc->exportCaption($this->start_time);
					$doc->exportCaption($this->end_time);
					$doc->exportCaption($this->start_time1);
					$doc->exportCaption($this->end_time1);
					$doc->exportCaption($this->start_time2);
					$doc->exportCaption($this->end_time2);
					$doc->exportCaption($this->slot_time);
					$doc->exportCaption($this->Fees);
					$doc->exportCaption($this->ProfilePic);
					$doc->exportCaption($this->slot_days);
					$doc->exportCaption($this->Status);
					$doc->exportCaption($this->scheduler_id);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->Designation);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->CODE);
					$doc->exportCaption($this->NAME);
					$doc->exportCaption($this->DEPARTMENT);
					$doc->exportCaption($this->start_time);
					$doc->exportCaption($this->end_time);
					$doc->exportCaption($this->start_time1);
					$doc->exportCaption($this->end_time1);
					$doc->exportCaption($this->start_time2);
					$doc->exportCaption($this->end_time2);
					$doc->exportCaption($this->slot_time);
					$doc->exportCaption($this->Fees);
					$doc->exportCaption($this->slot_days);
					$doc->exportCaption($this->Status);
					$doc->exportCaption($this->scheduler_id);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->Designation);
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
						$doc->exportField($this->CODE);
						$doc->exportField($this->NAME);
						$doc->exportField($this->DEPARTMENT);
						$doc->exportField($this->start_time);
						$doc->exportField($this->end_time);
						$doc->exportField($this->start_time1);
						$doc->exportField($this->end_time1);
						$doc->exportField($this->start_time2);
						$doc->exportField($this->end_time2);
						$doc->exportField($this->slot_time);
						$doc->exportField($this->Fees);
						$doc->exportField($this->ProfilePic);
						$doc->exportField($this->slot_days);
						$doc->exportField($this->Status);
						$doc->exportField($this->scheduler_id);
						$doc->exportField($this->HospID);
						$doc->exportField($this->Designation);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->CODE);
						$doc->exportField($this->NAME);
						$doc->exportField($this->DEPARTMENT);
						$doc->exportField($this->start_time);
						$doc->exportField($this->end_time);
						$doc->exportField($this->start_time1);
						$doc->exportField($this->end_time1);
						$doc->exportField($this->start_time2);
						$doc->exportField($this->end_time2);
						$doc->exportField($this->slot_time);
						$doc->exportField($this->Fees);
						$doc->exportField($this->slot_days);
						$doc->exportField($this->Status);
						$doc->exportField($this->scheduler_id);
						$doc->exportField($this->HospID);
						$doc->exportField($this->Designation);
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
		if ($fldparm == 'ProfilePic') {
			$fldName = "ProfilePic";
			$fileNameFld = "ProfilePic";
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