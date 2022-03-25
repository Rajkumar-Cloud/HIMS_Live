<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for lab_agerange
 */
class lab_agerange extends DbTable
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
	public $testid;
	public $TestName;
	public $Gender;
	public $MinAge;
	public $MinAgeType;
	public $MaxAge;
	public $MaxAgeType;
	public $Value;
	public $Created;
	public $CreatedBy;
	public $Modied;
	public $ModifiedBy;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'lab_agerange';
		$this->TableName = 'lab_agerange';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`lab_agerange`";
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
		$this->id = new DbField('lab_agerange', 'lab_agerange', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// testid
		$this->testid = new DbField('lab_agerange', 'lab_agerange', 'x_testid', 'testid', '`testid`', '`testid`', 3, -1, FALSE, '`testid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->testid->IsForeignKey = TRUE; // Foreign key field
		$this->testid->Nullable = FALSE; // NOT NULL field
		$this->testid->Required = TRUE; // Required field
		$this->testid->Sortable = FALSE; // Allow sort
		$this->testid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['testid'] = &$this->testid;

		// TestName
		$this->TestName = new DbField('lab_agerange', 'lab_agerange', 'x_TestName', 'TestName', '`TestName`', '`TestName`', 200, -1, FALSE, '`TestName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TestName->IsForeignKey = TRUE; // Foreign key field
		$this->TestName->Nullable = FALSE; // NOT NULL field
		$this->TestName->Required = TRUE; // Required field
		$this->TestName->Sortable = FALSE; // Allow sort
		$this->fields['TestName'] = &$this->TestName;

		// Gender
		$this->Gender = new DbField('lab_agerange', 'lab_agerange', 'x_Gender', 'Gender', '`Gender`', '`Gender`', 200, -1, FALSE, '`Gender`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Gender->Nullable = FALSE; // NOT NULL field
		$this->Gender->Required = TRUE; // Required field
		$this->Gender->Sortable = TRUE; // Allow sort
		$this->Gender->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Gender->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Gender->Lookup = new Lookup('Gender', 'sys_gender', FALSE, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Gender'] = &$this->Gender;

		// MinAge
		$this->MinAge = new DbField('lab_agerange', 'lab_agerange', 'x_MinAge', 'MinAge', '`MinAge`', '`MinAge`', 3, -1, FALSE, '`MinAge`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MinAge->Nullable = FALSE; // NOT NULL field
		$this->MinAge->Required = TRUE; // Required field
		$this->MinAge->Sortable = TRUE; // Allow sort
		$this->MinAge->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['MinAge'] = &$this->MinAge;

		// MinAgeType
		$this->MinAgeType = new DbField('lab_agerange', 'lab_agerange', 'x_MinAgeType', 'MinAgeType', '`MinAgeType`', '`MinAgeType`', 200, -1, FALSE, '`MinAgeType`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->MinAgeType->Sortable = TRUE; // Allow sort
		$this->MinAgeType->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->MinAgeType->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->MinAgeType->Lookup = new Lookup('MinAgeType', 'lab_agerange', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->MinAgeType->OptionCount = 3;
		$this->fields['MinAgeType'] = &$this->MinAgeType;

		// MaxAge
		$this->MaxAge = new DbField('lab_agerange', 'lab_agerange', 'x_MaxAge', 'MaxAge', '`MaxAge`', '`MaxAge`', 3, -1, FALSE, '`MaxAge`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MaxAge->Nullable = FALSE; // NOT NULL field
		$this->MaxAge->Required = TRUE; // Required field
		$this->MaxAge->Sortable = TRUE; // Allow sort
		$this->MaxAge->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['MaxAge'] = &$this->MaxAge;

		// MaxAgeType
		$this->MaxAgeType = new DbField('lab_agerange', 'lab_agerange', 'x_MaxAgeType', 'MaxAgeType', '`MaxAgeType`', '`MaxAgeType`', 200, -1, FALSE, '`MaxAgeType`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->MaxAgeType->Sortable = TRUE; // Allow sort
		$this->MaxAgeType->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->MaxAgeType->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->MaxAgeType->Lookup = new Lookup('MaxAgeType', 'lab_agerange', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->MaxAgeType->OptionCount = 3;
		$this->fields['MaxAgeType'] = &$this->MaxAgeType;

		// Value
		$this->Value = new DbField('lab_agerange', 'lab_agerange', 'x_Value', 'Value', '`Value`', '`Value`', 200, -1, FALSE, '`Value`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Value->Nullable = FALSE; // NOT NULL field
		$this->Value->Required = TRUE; // Required field
		$this->Value->Sortable = TRUE; // Allow sort
		$this->fields['Value'] = &$this->Value;

		// Created
		$this->Created = new DbField('lab_agerange', 'lab_agerange', 'x_Created', 'Created', '`Created`', CastDateFieldForLike('`Created`', 0, "DB"), 135, 0, FALSE, '`Created`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Created->Sortable = FALSE; // Allow sort
		$this->Created->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['Created'] = &$this->Created;

		// CreatedBy
		$this->CreatedBy = new DbField('lab_agerange', 'lab_agerange', 'x_CreatedBy', 'CreatedBy', '`CreatedBy`', '`CreatedBy`', 200, -1, FALSE, '`CreatedBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CreatedBy->Sortable = FALSE; // Allow sort
		$this->fields['CreatedBy'] = &$this->CreatedBy;

		// Modied
		$this->Modied = new DbField('lab_agerange', 'lab_agerange', 'x_Modied', 'Modied', '`Modied`', CastDateFieldForLike('`Modied`', 0, "DB"), 135, 0, FALSE, '`Modied`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Modied->Sortable = FALSE; // Allow sort
		$this->Modied->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['Modied'] = &$this->Modied;

		// ModifiedBy
		$this->ModifiedBy = new DbField('lab_agerange', 'lab_agerange', 'x_ModifiedBy', 'ModifiedBy', '`ModifiedBy`', '`ModifiedBy`', 200, -1, FALSE, '`ModifiedBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ModifiedBy->Sortable = FALSE; // Allow sort
		$this->fields['ModifiedBy'] = &$this->ModifiedBy;
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
		if ($this->getCurrentMasterTable() == "lab_testname") {
			if ($this->testid->getSessionValue() <> "")
				$masterFilter .= "`id`=" . QuotedValue($this->testid->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->TestName->getSessionValue() <> "")
				$masterFilter .= " AND `Name`=" . QuotedValue($this->TestName->getSessionValue(), DATATYPE_STRING, "DB");
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
		if ($this->getCurrentMasterTable() == "lab_testname") {
			if ($this->testid->getSessionValue() <> "")
				$detailFilter .= "`testid`=" . QuotedValue($this->testid->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->TestName->getSessionValue() <> "")
				$detailFilter .= " AND `TestName`=" . QuotedValue($this->TestName->getSessionValue(), DATATYPE_STRING, "DB");
			else
				return "";
		}
		return $detailFilter;
	}

	// Master filter
	public function sqlMasterFilter_lab_testname()
	{
		return "`id`=@id@ AND `Name`='@Name@'";
	}

	// Detail filter
	public function sqlDetailFilter_lab_testname()
	{
		return "`testid`=@testid@ AND `TestName`='@TestName@'";
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`lab_agerange`";
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
		$this->testid->DbValue = $row['testid'];
		$this->TestName->DbValue = $row['TestName'];
		$this->Gender->DbValue = $row['Gender'];
		$this->MinAge->DbValue = $row['MinAge'];
		$this->MinAgeType->DbValue = $row['MinAgeType'];
		$this->MaxAge->DbValue = $row['MaxAge'];
		$this->MaxAgeType->DbValue = $row['MaxAgeType'];
		$this->Value->DbValue = $row['Value'];
		$this->Created->DbValue = $row['Created'];
		$this->CreatedBy->DbValue = $row['CreatedBy'];
		$this->Modied->DbValue = $row['Modied'];
		$this->ModifiedBy->DbValue = $row['ModifiedBy'];
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
			return "lab_agerangelist.php";
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
		if ($pageName == "lab_agerangeview.php")
			return $Language->phrase("View");
		elseif ($pageName == "lab_agerangeedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "lab_agerangeadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "lab_agerangelist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("lab_agerangeview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("lab_agerangeview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "lab_agerangeadd.php?" . $this->getUrlParm($parm);
		else
			$url = "lab_agerangeadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("lab_agerangeedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("lab_agerangeadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("lab_agerangedelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		if ($this->getCurrentMasterTable() == "lab_testname" && !ContainsString($url, TABLE_SHOW_MASTER . "=")) {
			$url .= (ContainsString($url, "?") ? "&" : "?") . TABLE_SHOW_MASTER . "=" . $this->getCurrentMasterTable();
			$url .= "&fk_id=" . urlencode($this->testid->CurrentValue);
			$url .= "&fk_Name=" . urlencode($this->TestName->CurrentValue);
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
		$this->testid->setDbValue($rs->fields('testid'));
		$this->TestName->setDbValue($rs->fields('TestName'));
		$this->Gender->setDbValue($rs->fields('Gender'));
		$this->MinAge->setDbValue($rs->fields('MinAge'));
		$this->MinAgeType->setDbValue($rs->fields('MinAgeType'));
		$this->MaxAge->setDbValue($rs->fields('MaxAge'));
		$this->MaxAgeType->setDbValue($rs->fields('MaxAgeType'));
		$this->Value->setDbValue($rs->fields('Value'));
		$this->Created->setDbValue($rs->fields('Created'));
		$this->CreatedBy->setDbValue($rs->fields('CreatedBy'));
		$this->Modied->setDbValue($rs->fields('Modied'));
		$this->ModifiedBy->setDbValue($rs->fields('ModifiedBy'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// testid
		// TestName
		// Gender
		// MinAge
		// MinAgeType
		// MaxAge
		// MaxAgeType
		// Value
		// Created
		// CreatedBy
		// Modied
		// ModifiedBy
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// testid
		$this->testid->ViewValue = $this->testid->CurrentValue;
		$this->testid->ViewValue = FormatNumber($this->testid->ViewValue, 0, -2, -2, -2);
		$this->testid->ViewCustomAttributes = "";

		// TestName
		$this->TestName->ViewValue = $this->TestName->CurrentValue;
		$this->TestName->ViewCustomAttributes = "";

		// Gender
		$curVal = strval($this->Gender->CurrentValue);
		if ($curVal <> "") {
			$this->Gender->ViewValue = $this->Gender->lookupCacheOption($curVal);
			if ($this->Gender->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->Gender->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->Gender->ViewValue = $this->Gender->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Gender->ViewValue = $this->Gender->CurrentValue;
				}
			}
		} else {
			$this->Gender->ViewValue = NULL;
		}
		$this->Gender->ViewCustomAttributes = "";

		// MinAge
		$this->MinAge->ViewValue = $this->MinAge->CurrentValue;
		$this->MinAge->ViewValue = FormatNumber($this->MinAge->ViewValue, 0, -2, -2, -2);
		$this->MinAge->ViewCustomAttributes = "";

		// MinAgeType
		if (strval($this->MinAgeType->CurrentValue) <> "") {
			$this->MinAgeType->ViewValue = $this->MinAgeType->optionCaption($this->MinAgeType->CurrentValue);
		} else {
			$this->MinAgeType->ViewValue = NULL;
		}
		$this->MinAgeType->ViewCustomAttributes = "";

		// MaxAge
		$this->MaxAge->ViewValue = $this->MaxAge->CurrentValue;
		$this->MaxAge->ViewValue = FormatNumber($this->MaxAge->ViewValue, 0, -2, -2, -2);
		$this->MaxAge->ViewCustomAttributes = "";

		// MaxAgeType
		if (strval($this->MaxAgeType->CurrentValue) <> "") {
			$this->MaxAgeType->ViewValue = $this->MaxAgeType->optionCaption($this->MaxAgeType->CurrentValue);
		} else {
			$this->MaxAgeType->ViewValue = NULL;
		}
		$this->MaxAgeType->ViewCustomAttributes = "";

		// Value
		$this->Value->ViewValue = $this->Value->CurrentValue;
		$this->Value->ViewCustomAttributes = "";

		// Created
		$this->Created->ViewValue = $this->Created->CurrentValue;
		$this->Created->ViewValue = FormatDateTime($this->Created->ViewValue, 0);
		$this->Created->ViewCustomAttributes = "";

		// CreatedBy
		$this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
		$this->CreatedBy->ViewCustomAttributes = "";

		// Modied
		$this->Modied->ViewValue = $this->Modied->CurrentValue;
		$this->Modied->ViewValue = FormatDateTime($this->Modied->ViewValue, 0);
		$this->Modied->ViewCustomAttributes = "";

		// ModifiedBy
		$this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
		$this->ModifiedBy->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// testid
		$this->testid->LinkCustomAttributes = "";
		$this->testid->HrefValue = "";
		$this->testid->TooltipValue = "";

		// TestName
		$this->TestName->LinkCustomAttributes = "";
		$this->TestName->HrefValue = "";
		$this->TestName->TooltipValue = "";

		// Gender
		$this->Gender->LinkCustomAttributes = "";
		$this->Gender->HrefValue = "";
		$this->Gender->TooltipValue = "";

		// MinAge
		$this->MinAge->LinkCustomAttributes = "";
		$this->MinAge->HrefValue = "";
		$this->MinAge->TooltipValue = "";

		// MinAgeType
		$this->MinAgeType->LinkCustomAttributes = "";
		$this->MinAgeType->HrefValue = "";
		$this->MinAgeType->TooltipValue = "";

		// MaxAge
		$this->MaxAge->LinkCustomAttributes = "";
		$this->MaxAge->HrefValue = "";
		$this->MaxAge->TooltipValue = "";

		// MaxAgeType
		$this->MaxAgeType->LinkCustomAttributes = "";
		$this->MaxAgeType->HrefValue = "";
		$this->MaxAgeType->TooltipValue = "";

		// Value
		$this->Value->LinkCustomAttributes = "";
		$this->Value->HrefValue = "";
		$this->Value->TooltipValue = "";

		// Created
		$this->Created->LinkCustomAttributes = "";
		$this->Created->HrefValue = "";
		$this->Created->TooltipValue = "";

		// CreatedBy
		$this->CreatedBy->LinkCustomAttributes = "";
		$this->CreatedBy->HrefValue = "";
		$this->CreatedBy->TooltipValue = "";

		// Modied
		$this->Modied->LinkCustomAttributes = "";
		$this->Modied->HrefValue = "";
		$this->Modied->TooltipValue = "";

		// ModifiedBy
		$this->ModifiedBy->LinkCustomAttributes = "";
		$this->ModifiedBy->HrefValue = "";
		$this->ModifiedBy->TooltipValue = "";

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

		// testid
		$this->testid->EditAttrs["class"] = "form-control";
		$this->testid->EditCustomAttributes = "";
		if ($this->testid->getSessionValue() <> "") {
			$this->testid->CurrentValue = $this->testid->getSessionValue();
		$this->testid->ViewValue = $this->testid->CurrentValue;
		$this->testid->ViewValue = FormatNumber($this->testid->ViewValue, 0, -2, -2, -2);
		$this->testid->ViewCustomAttributes = "";
		} else {
		$this->testid->EditValue = $this->testid->CurrentValue;
		$this->testid->PlaceHolder = RemoveHtml($this->testid->caption());
		}

		// TestName
		$this->TestName->EditAttrs["class"] = "form-control";
		$this->TestName->EditCustomAttributes = "";
		if ($this->TestName->getSessionValue() <> "") {
			$this->TestName->CurrentValue = $this->TestName->getSessionValue();
		$this->TestName->ViewValue = $this->TestName->CurrentValue;
		$this->TestName->ViewCustomAttributes = "";
		} else {
		if (REMOVE_XSS)
			$this->TestName->CurrentValue = HtmlDecode($this->TestName->CurrentValue);
		$this->TestName->EditValue = $this->TestName->CurrentValue;
		$this->TestName->PlaceHolder = RemoveHtml($this->TestName->caption());
		}

		// Gender
		$this->Gender->EditAttrs["class"] = "form-control";
		$this->Gender->EditCustomAttributes = "";

		// MinAge
		$this->MinAge->EditAttrs["class"] = "form-control";
		$this->MinAge->EditCustomAttributes = "";
		$this->MinAge->EditValue = $this->MinAge->CurrentValue;
		$this->MinAge->PlaceHolder = RemoveHtml($this->MinAge->caption());

		// MinAgeType
		$this->MinAgeType->EditAttrs["class"] = "form-control";
		$this->MinAgeType->EditCustomAttributes = "";
		$this->MinAgeType->EditValue = $this->MinAgeType->options(TRUE);

		// MaxAge
		$this->MaxAge->EditAttrs["class"] = "form-control";
		$this->MaxAge->EditCustomAttributes = "";
		$this->MaxAge->EditValue = $this->MaxAge->CurrentValue;
		$this->MaxAge->PlaceHolder = RemoveHtml($this->MaxAge->caption());

		// MaxAgeType
		$this->MaxAgeType->EditAttrs["class"] = "form-control";
		$this->MaxAgeType->EditCustomAttributes = "";
		$this->MaxAgeType->EditValue = $this->MaxAgeType->options(TRUE);

		// Value
		$this->Value->EditAttrs["class"] = "form-control";
		$this->Value->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Value->CurrentValue = HtmlDecode($this->Value->CurrentValue);
		$this->Value->EditValue = $this->Value->CurrentValue;
		$this->Value->PlaceHolder = RemoveHtml($this->Value->caption());

		// Created
		// CreatedBy
		// Modied
		// ModifiedBy
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
					$doc->exportCaption($this->testid);
					$doc->exportCaption($this->TestName);
					$doc->exportCaption($this->Gender);
					$doc->exportCaption($this->MinAge);
					$doc->exportCaption($this->MinAgeType);
					$doc->exportCaption($this->MaxAge);
					$doc->exportCaption($this->MaxAgeType);
					$doc->exportCaption($this->Value);
					$doc->exportCaption($this->Created);
					$doc->exportCaption($this->CreatedBy);
					$doc->exportCaption($this->Modied);
					$doc->exportCaption($this->ModifiedBy);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->Gender);
					$doc->exportCaption($this->MinAge);
					$doc->exportCaption($this->MinAgeType);
					$doc->exportCaption($this->MaxAge);
					$doc->exportCaption($this->MaxAgeType);
					$doc->exportCaption($this->Value);
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
						$doc->exportField($this->testid);
						$doc->exportField($this->TestName);
						$doc->exportField($this->Gender);
						$doc->exportField($this->MinAge);
						$doc->exportField($this->MinAgeType);
						$doc->exportField($this->MaxAge);
						$doc->exportField($this->MaxAgeType);
						$doc->exportField($this->Value);
						$doc->exportField($this->Created);
						$doc->exportField($this->CreatedBy);
						$doc->exportField($this->Modied);
						$doc->exportField($this->ModifiedBy);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->Gender);
						$doc->exportField($this->MinAge);
						$doc->exportField($this->MinAgeType);
						$doc->exportField($this->MaxAge);
						$doc->exportField($this->MaxAgeType);
						$doc->exportField($this->Value);
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