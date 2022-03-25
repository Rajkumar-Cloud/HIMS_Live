<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for qaqcrecord_andrology
 */
class qaqcrecord_andrology extends DbTable
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
	public $Date;
	public $LN2_Level;
	public $LN2_Checked;
	public $Incubator_Temp;
	public $Incubator_Cleaned;
	public $LAF_MG;
	public $LAF_Cleaned;
	public $REF_Temp;
	public $REF_Cleaned;
	public $Heating_Temp;
	public $Heating_Cleaned;
	public $Createdby;
	public $CreatedDate;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'qaqcrecord_andrology';
		$this->TableName = 'qaqcrecord_andrology';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`qaqcrecord_andrology`";
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
		$this->id = new DbField('qaqcrecord_andrology', 'qaqcrecord_andrology', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// Date
		$this->Date = new DbField('qaqcrecord_andrology', 'qaqcrecord_andrology', 'x_Date', 'Date', '`Date`', CastDateFieldForLike('`Date`', 0, "DB"), 133, 0, FALSE, '`Date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Date->Nullable = FALSE; // NOT NULL field
		$this->Date->Required = TRUE; // Required field
		$this->Date->Sortable = TRUE; // Allow sort
		$this->Date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['Date'] = &$this->Date;

		// LN2_Level
		$this->LN2_Level = new DbField('qaqcrecord_andrology', 'qaqcrecord_andrology', 'x_LN2_Level', 'LN2_Level', '`LN2_Level`', '`LN2_Level`', 131, -1, FALSE, '`LN2_Level`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->LN2_Level->Sortable = TRUE; // Allow sort
		$this->LN2_Level->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['LN2_Level'] = &$this->LN2_Level;

		// LN2_Checked
		$this->LN2_Checked = new DbField('qaqcrecord_andrology', 'qaqcrecord_andrology', 'x_LN2_Checked', 'LN2_Checked', '`LN2_Checked`', '`LN2_Checked`', 200, -1, FALSE, '`LN2_Checked`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->LN2_Checked->Sortable = TRUE; // Allow sort
		$this->LN2_Checked->Lookup = new Lookup('LN2_Checked', 'qaqcrecord_andrology', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->LN2_Checked->OptionCount = 1;
		$this->fields['LN2_Checked'] = &$this->LN2_Checked;

		// Incubator_Temp
		$this->Incubator_Temp = new DbField('qaqcrecord_andrology', 'qaqcrecord_andrology', 'x_Incubator_Temp', 'Incubator_Temp', '`Incubator_Temp`', '`Incubator_Temp`', 131, -1, FALSE, '`Incubator_Temp`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Incubator_Temp->Sortable = TRUE; // Allow sort
		$this->Incubator_Temp->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Incubator_Temp'] = &$this->Incubator_Temp;

		// Incubator_Cleaned
		$this->Incubator_Cleaned = new DbField('qaqcrecord_andrology', 'qaqcrecord_andrology', 'x_Incubator_Cleaned', 'Incubator_Cleaned', '`Incubator_Cleaned`', '`Incubator_Cleaned`', 200, -1, FALSE, '`Incubator_Cleaned`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->Incubator_Cleaned->Sortable = TRUE; // Allow sort
		$this->Incubator_Cleaned->Lookup = new Lookup('Incubator_Cleaned', 'qaqcrecord_andrology', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Incubator_Cleaned->OptionCount = 1;
		$this->fields['Incubator_Cleaned'] = &$this->Incubator_Cleaned;

		// LAF_MG
		$this->LAF_MG = new DbField('qaqcrecord_andrology', 'qaqcrecord_andrology', 'x_LAF_MG', 'LAF_MG', '`LAF_MG`', '`LAF_MG`', 131, -1, FALSE, '`LAF_MG`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->LAF_MG->Sortable = TRUE; // Allow sort
		$this->LAF_MG->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['LAF_MG'] = &$this->LAF_MG;

		// LAF_Cleaned
		$this->LAF_Cleaned = new DbField('qaqcrecord_andrology', 'qaqcrecord_andrology', 'x_LAF_Cleaned', 'LAF_Cleaned', '`LAF_Cleaned`', '`LAF_Cleaned`', 200, -1, FALSE, '`LAF_Cleaned`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->LAF_Cleaned->Sortable = TRUE; // Allow sort
		$this->LAF_Cleaned->Lookup = new Lookup('LAF_Cleaned', 'qaqcrecord_andrology', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->LAF_Cleaned->OptionCount = 1;
		$this->fields['LAF_Cleaned'] = &$this->LAF_Cleaned;

		// REF_Temp
		$this->REF_Temp = new DbField('qaqcrecord_andrology', 'qaqcrecord_andrology', 'x_REF_Temp', 'REF_Temp', '`REF_Temp`', '`REF_Temp`', 131, -1, FALSE, '`REF_Temp`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->REF_Temp->Sortable = TRUE; // Allow sort
		$this->REF_Temp->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['REF_Temp'] = &$this->REF_Temp;

		// REF_Cleaned
		$this->REF_Cleaned = new DbField('qaqcrecord_andrology', 'qaqcrecord_andrology', 'x_REF_Cleaned', 'REF_Cleaned', '`REF_Cleaned`', '`REF_Cleaned`', 200, -1, FALSE, '`REF_Cleaned`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->REF_Cleaned->Sortable = TRUE; // Allow sort
		$this->REF_Cleaned->Lookup = new Lookup('REF_Cleaned', 'qaqcrecord_andrology', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->REF_Cleaned->OptionCount = 1;
		$this->fields['REF_Cleaned'] = &$this->REF_Cleaned;

		// Heating_Temp
		$this->Heating_Temp = new DbField('qaqcrecord_andrology', 'qaqcrecord_andrology', 'x_Heating_Temp', 'Heating_Temp', '`Heating_Temp`', '`Heating_Temp`', 131, -1, FALSE, '`Heating_Temp`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Heating_Temp->Nullable = FALSE; // NOT NULL field
		$this->Heating_Temp->Required = TRUE; // Required field
		$this->Heating_Temp->Sortable = TRUE; // Allow sort
		$this->Heating_Temp->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Heating_Temp'] = &$this->Heating_Temp;

		// Heating_Cleaned
		$this->Heating_Cleaned = new DbField('qaqcrecord_andrology', 'qaqcrecord_andrology', 'x_Heating_Cleaned', 'Heating_Cleaned', '`Heating_Cleaned`', '`Heating_Cleaned`', 200, -1, FALSE, '`Heating_Cleaned`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->Heating_Cleaned->Sortable = TRUE; // Allow sort
		$this->Heating_Cleaned->Lookup = new Lookup('Heating_Cleaned', 'qaqcrecord_andrology', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Heating_Cleaned->OptionCount = 1;
		$this->fields['Heating_Cleaned'] = &$this->Heating_Cleaned;

		// Createdby
		$this->Createdby = new DbField('qaqcrecord_andrology', 'qaqcrecord_andrology', 'x_Createdby', 'Createdby', '`Createdby`', '`Createdby`', 200, -1, FALSE, '`Createdby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Createdby->Sortable = TRUE; // Allow sort
		$this->fields['Createdby'] = &$this->Createdby;

		// CreatedDate
		$this->CreatedDate = new DbField('qaqcrecord_andrology', 'qaqcrecord_andrology', 'x_CreatedDate', 'CreatedDate', '`CreatedDate`', CastDateFieldForLike('`CreatedDate`', 0, "DB"), 135, 0, FALSE, '`CreatedDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CreatedDate->Sortable = TRUE; // Allow sort
		$this->CreatedDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['CreatedDate'] = &$this->CreatedDate;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`qaqcrecord_andrology`";
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
		$this->Date->DbValue = $row['Date'];
		$this->LN2_Level->DbValue = $row['LN2_Level'];
		$this->LN2_Checked->DbValue = $row['LN2_Checked'];
		$this->Incubator_Temp->DbValue = $row['Incubator_Temp'];
		$this->Incubator_Cleaned->DbValue = $row['Incubator_Cleaned'];
		$this->LAF_MG->DbValue = $row['LAF_MG'];
		$this->LAF_Cleaned->DbValue = $row['LAF_Cleaned'];
		$this->REF_Temp->DbValue = $row['REF_Temp'];
		$this->REF_Cleaned->DbValue = $row['REF_Cleaned'];
		$this->Heating_Temp->DbValue = $row['Heating_Temp'];
		$this->Heating_Cleaned->DbValue = $row['Heating_Cleaned'];
		$this->Createdby->DbValue = $row['Createdby'];
		$this->CreatedDate->DbValue = $row['CreatedDate'];
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
			return "qaqcrecord_andrologylist.php";
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
		if ($pageName == "qaqcrecord_andrologyview.php")
			return $Language->phrase("View");
		elseif ($pageName == "qaqcrecord_andrologyedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "qaqcrecord_andrologyadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "qaqcrecord_andrologylist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("qaqcrecord_andrologyview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("qaqcrecord_andrologyview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "qaqcrecord_andrologyadd.php?" . $this->getUrlParm($parm);
		else
			$url = "qaqcrecord_andrologyadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("qaqcrecord_andrologyedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("qaqcrecord_andrologyadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("qaqcrecord_andrologydelete.php", $this->getUrlParm());
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
		$this->Date->setDbValue($rs->fields('Date'));
		$this->LN2_Level->setDbValue($rs->fields('LN2_Level'));
		$this->LN2_Checked->setDbValue($rs->fields('LN2_Checked'));
		$this->Incubator_Temp->setDbValue($rs->fields('Incubator_Temp'));
		$this->Incubator_Cleaned->setDbValue($rs->fields('Incubator_Cleaned'));
		$this->LAF_MG->setDbValue($rs->fields('LAF_MG'));
		$this->LAF_Cleaned->setDbValue($rs->fields('LAF_Cleaned'));
		$this->REF_Temp->setDbValue($rs->fields('REF_Temp'));
		$this->REF_Cleaned->setDbValue($rs->fields('REF_Cleaned'));
		$this->Heating_Temp->setDbValue($rs->fields('Heating_Temp'));
		$this->Heating_Cleaned->setDbValue($rs->fields('Heating_Cleaned'));
		$this->Createdby->setDbValue($rs->fields('Createdby'));
		$this->CreatedDate->setDbValue($rs->fields('CreatedDate'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// Date
		// LN2_Level
		// LN2_Checked
		// Incubator_Temp
		// Incubator_Cleaned
		// LAF_MG
		// LAF_Cleaned
		// REF_Temp
		// REF_Cleaned
		// Heating_Temp
		// Heating_Cleaned
		// Createdby
		// CreatedDate
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// Date
		$this->Date->ViewValue = $this->Date->CurrentValue;
		$this->Date->ViewValue = FormatDateTime($this->Date->ViewValue, 0);
		$this->Date->ViewCustomAttributes = "";

		// LN2_Level
		$this->LN2_Level->ViewValue = $this->LN2_Level->CurrentValue;
		$this->LN2_Level->ViewValue = FormatNumber($this->LN2_Level->ViewValue, 2, -2, -2, -2);
		$this->LN2_Level->ViewCustomAttributes = "";

		// LN2_Checked
		if (strval($this->LN2_Checked->CurrentValue) <> "") {
			$this->LN2_Checked->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->LN2_Checked->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->LN2_Checked->ViewValue->add($this->LN2_Checked->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->LN2_Checked->ViewValue = NULL;
		}
		$this->LN2_Checked->ViewCustomAttributes = "";

		// Incubator_Temp
		$this->Incubator_Temp->ViewValue = $this->Incubator_Temp->CurrentValue;
		$this->Incubator_Temp->ViewValue = FormatNumber($this->Incubator_Temp->ViewValue, 2, -2, -2, -2);
		$this->Incubator_Temp->ViewCustomAttributes = "";

		// Incubator_Cleaned
		if (strval($this->Incubator_Cleaned->CurrentValue) <> "") {
			$this->Incubator_Cleaned->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->Incubator_Cleaned->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->Incubator_Cleaned->ViewValue->add($this->Incubator_Cleaned->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->Incubator_Cleaned->ViewValue = NULL;
		}
		$this->Incubator_Cleaned->ViewCustomAttributes = "";

		// LAF_MG
		$this->LAF_MG->ViewValue = $this->LAF_MG->CurrentValue;
		$this->LAF_MG->ViewValue = FormatNumber($this->LAF_MG->ViewValue, 2, -2, -2, -2);
		$this->LAF_MG->ViewCustomAttributes = "";

		// LAF_Cleaned
		if (strval($this->LAF_Cleaned->CurrentValue) <> "") {
			$this->LAF_Cleaned->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->LAF_Cleaned->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->LAF_Cleaned->ViewValue->add($this->LAF_Cleaned->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->LAF_Cleaned->ViewValue = NULL;
		}
		$this->LAF_Cleaned->ViewCustomAttributes = "";

		// REF_Temp
		$this->REF_Temp->ViewValue = $this->REF_Temp->CurrentValue;
		$this->REF_Temp->ViewValue = FormatNumber($this->REF_Temp->ViewValue, 2, -2, -2, -2);
		$this->REF_Temp->ViewCustomAttributes = "";

		// REF_Cleaned
		if (strval($this->REF_Cleaned->CurrentValue) <> "") {
			$this->REF_Cleaned->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->REF_Cleaned->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->REF_Cleaned->ViewValue->add($this->REF_Cleaned->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->REF_Cleaned->ViewValue = NULL;
		}
		$this->REF_Cleaned->ViewCustomAttributes = "";

		// Heating_Temp
		$this->Heating_Temp->ViewValue = $this->Heating_Temp->CurrentValue;
		$this->Heating_Temp->ViewValue = FormatNumber($this->Heating_Temp->ViewValue, 2, -2, -2, -2);
		$this->Heating_Temp->ViewCustomAttributes = "";

		// Heating_Cleaned
		if (strval($this->Heating_Cleaned->CurrentValue) <> "") {
			$this->Heating_Cleaned->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->Heating_Cleaned->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->Heating_Cleaned->ViewValue->add($this->Heating_Cleaned->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->Heating_Cleaned->ViewValue = NULL;
		}
		$this->Heating_Cleaned->ViewCustomAttributes = "";

		// Createdby
		$this->Createdby->ViewValue = $this->Createdby->CurrentValue;
		$this->Createdby->ViewCustomAttributes = "";

		// CreatedDate
		$this->CreatedDate->ViewValue = $this->CreatedDate->CurrentValue;
		$this->CreatedDate->ViewValue = FormatDateTime($this->CreatedDate->ViewValue, 0);
		$this->CreatedDate->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// Date
		$this->Date->LinkCustomAttributes = "";
		$this->Date->HrefValue = "";
		$this->Date->TooltipValue = "";

		// LN2_Level
		$this->LN2_Level->LinkCustomAttributes = "";
		$this->LN2_Level->HrefValue = "";
		$this->LN2_Level->TooltipValue = "";

		// LN2_Checked
		$this->LN2_Checked->LinkCustomAttributes = "";
		$this->LN2_Checked->HrefValue = "";
		$this->LN2_Checked->TooltipValue = "";

		// Incubator_Temp
		$this->Incubator_Temp->LinkCustomAttributes = "";
		$this->Incubator_Temp->HrefValue = "";
		$this->Incubator_Temp->TooltipValue = "";

		// Incubator_Cleaned
		$this->Incubator_Cleaned->LinkCustomAttributes = "";
		$this->Incubator_Cleaned->HrefValue = "";
		$this->Incubator_Cleaned->TooltipValue = "";

		// LAF_MG
		$this->LAF_MG->LinkCustomAttributes = "";
		$this->LAF_MG->HrefValue = "";
		$this->LAF_MG->TooltipValue = "";

		// LAF_Cleaned
		$this->LAF_Cleaned->LinkCustomAttributes = "";
		$this->LAF_Cleaned->HrefValue = "";
		$this->LAF_Cleaned->TooltipValue = "";

		// REF_Temp
		$this->REF_Temp->LinkCustomAttributes = "";
		$this->REF_Temp->HrefValue = "";
		$this->REF_Temp->TooltipValue = "";

		// REF_Cleaned
		$this->REF_Cleaned->LinkCustomAttributes = "";
		$this->REF_Cleaned->HrefValue = "";
		$this->REF_Cleaned->TooltipValue = "";

		// Heating_Temp
		$this->Heating_Temp->LinkCustomAttributes = "";
		$this->Heating_Temp->HrefValue = "";
		$this->Heating_Temp->TooltipValue = "";

		// Heating_Cleaned
		$this->Heating_Cleaned->LinkCustomAttributes = "";
		$this->Heating_Cleaned->HrefValue = "";
		$this->Heating_Cleaned->TooltipValue = "";

		// Createdby
		$this->Createdby->LinkCustomAttributes = "";
		$this->Createdby->HrefValue = "";
		$this->Createdby->TooltipValue = "";

		// CreatedDate
		$this->CreatedDate->LinkCustomAttributes = "";
		$this->CreatedDate->HrefValue = "";
		$this->CreatedDate->TooltipValue = "";

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

		// Date
		$this->Date->EditAttrs["class"] = "form-control";
		$this->Date->EditCustomAttributes = "";
		$this->Date->EditValue = FormatDateTime($this->Date->CurrentValue, 8);
		$this->Date->PlaceHolder = RemoveHtml($this->Date->caption());

		// LN2_Level
		$this->LN2_Level->EditAttrs["class"] = "form-control";
		$this->LN2_Level->EditCustomAttributes = "";
		$this->LN2_Level->EditValue = $this->LN2_Level->CurrentValue;
		$this->LN2_Level->PlaceHolder = RemoveHtml($this->LN2_Level->caption());
		if (strval($this->LN2_Level->EditValue) <> "" && is_numeric($this->LN2_Level->EditValue))
			$this->LN2_Level->EditValue = FormatNumber($this->LN2_Level->EditValue, -2, -2, -2, -2);

		// LN2_Checked
		$this->LN2_Checked->EditCustomAttributes = "";
		$this->LN2_Checked->EditValue = $this->LN2_Checked->options(FALSE);

		// Incubator_Temp
		$this->Incubator_Temp->EditAttrs["class"] = "form-control";
		$this->Incubator_Temp->EditCustomAttributes = "";
		$this->Incubator_Temp->EditValue = $this->Incubator_Temp->CurrentValue;
		$this->Incubator_Temp->PlaceHolder = RemoveHtml($this->Incubator_Temp->caption());
		if (strval($this->Incubator_Temp->EditValue) <> "" && is_numeric($this->Incubator_Temp->EditValue))
			$this->Incubator_Temp->EditValue = FormatNumber($this->Incubator_Temp->EditValue, -2, -2, -2, -2);

		// Incubator_Cleaned
		$this->Incubator_Cleaned->EditCustomAttributes = "";
		$this->Incubator_Cleaned->EditValue = $this->Incubator_Cleaned->options(FALSE);

		// LAF_MG
		$this->LAF_MG->EditAttrs["class"] = "form-control";
		$this->LAF_MG->EditCustomAttributes = "";
		$this->LAF_MG->EditValue = $this->LAF_MG->CurrentValue;
		$this->LAF_MG->PlaceHolder = RemoveHtml($this->LAF_MG->caption());
		if (strval($this->LAF_MG->EditValue) <> "" && is_numeric($this->LAF_MG->EditValue))
			$this->LAF_MG->EditValue = FormatNumber($this->LAF_MG->EditValue, -2, -2, -2, -2);

		// LAF_Cleaned
		$this->LAF_Cleaned->EditCustomAttributes = "";
		$this->LAF_Cleaned->EditValue = $this->LAF_Cleaned->options(FALSE);

		// REF_Temp
		$this->REF_Temp->EditAttrs["class"] = "form-control";
		$this->REF_Temp->EditCustomAttributes = "";
		$this->REF_Temp->EditValue = $this->REF_Temp->CurrentValue;
		$this->REF_Temp->PlaceHolder = RemoveHtml($this->REF_Temp->caption());
		if (strval($this->REF_Temp->EditValue) <> "" && is_numeric($this->REF_Temp->EditValue))
			$this->REF_Temp->EditValue = FormatNumber($this->REF_Temp->EditValue, -2, -2, -2, -2);

		// REF_Cleaned
		$this->REF_Cleaned->EditCustomAttributes = "";
		$this->REF_Cleaned->EditValue = $this->REF_Cleaned->options(FALSE);

		// Heating_Temp
		$this->Heating_Temp->EditAttrs["class"] = "form-control";
		$this->Heating_Temp->EditCustomAttributes = "";
		$this->Heating_Temp->EditValue = $this->Heating_Temp->CurrentValue;
		$this->Heating_Temp->PlaceHolder = RemoveHtml($this->Heating_Temp->caption());
		if (strval($this->Heating_Temp->EditValue) <> "" && is_numeric($this->Heating_Temp->EditValue))
			$this->Heating_Temp->EditValue = FormatNumber($this->Heating_Temp->EditValue, -2, -2, -2, -2);

		// Heating_Cleaned
		$this->Heating_Cleaned->EditCustomAttributes = "";
		$this->Heating_Cleaned->EditValue = $this->Heating_Cleaned->options(FALSE);

		// Createdby
		// CreatedDate
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
					$doc->exportCaption($this->Date);
					$doc->exportCaption($this->LN2_Level);
					$doc->exportCaption($this->LN2_Checked);
					$doc->exportCaption($this->Incubator_Temp);
					$doc->exportCaption($this->Incubator_Cleaned);
					$doc->exportCaption($this->LAF_MG);
					$doc->exportCaption($this->LAF_Cleaned);
					$doc->exportCaption($this->REF_Temp);
					$doc->exportCaption($this->REF_Cleaned);
					$doc->exportCaption($this->Heating_Temp);
					$doc->exportCaption($this->Heating_Cleaned);
					$doc->exportCaption($this->Createdby);
					$doc->exportCaption($this->CreatedDate);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->Date);
					$doc->exportCaption($this->LN2_Level);
					$doc->exportCaption($this->LN2_Checked);
					$doc->exportCaption($this->Incubator_Temp);
					$doc->exportCaption($this->Incubator_Cleaned);
					$doc->exportCaption($this->LAF_MG);
					$doc->exportCaption($this->LAF_Cleaned);
					$doc->exportCaption($this->REF_Temp);
					$doc->exportCaption($this->REF_Cleaned);
					$doc->exportCaption($this->Heating_Temp);
					$doc->exportCaption($this->Heating_Cleaned);
					$doc->exportCaption($this->Createdby);
					$doc->exportCaption($this->CreatedDate);
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
						$doc->exportField($this->Date);
						$doc->exportField($this->LN2_Level);
						$doc->exportField($this->LN2_Checked);
						$doc->exportField($this->Incubator_Temp);
						$doc->exportField($this->Incubator_Cleaned);
						$doc->exportField($this->LAF_MG);
						$doc->exportField($this->LAF_Cleaned);
						$doc->exportField($this->REF_Temp);
						$doc->exportField($this->REF_Cleaned);
						$doc->exportField($this->Heating_Temp);
						$doc->exportField($this->Heating_Cleaned);
						$doc->exportField($this->Createdby);
						$doc->exportField($this->CreatedDate);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->Date);
						$doc->exportField($this->LN2_Level);
						$doc->exportField($this->LN2_Checked);
						$doc->exportField($this->Incubator_Temp);
						$doc->exportField($this->Incubator_Cleaned);
						$doc->exportField($this->LAF_MG);
						$doc->exportField($this->LAF_Cleaned);
						$doc->exportField($this->REF_Temp);
						$doc->exportField($this->REF_Cleaned);
						$doc->exportField($this->Heating_Temp);
						$doc->exportField($this->Heating_Cleaned);
						$doc->exportField($this->Createdby);
						$doc->exportField($this->CreatedDate);
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