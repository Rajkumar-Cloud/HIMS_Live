<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for pres_indicationstable
 */
class pres_indicationstable extends DbTable
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
	public $Sno;
	public $Genericname;
	public $Indications;
	public $Category;
	public $Min_Age;
	public $Min_Days;
	public $Max_Age;
	public $Max_Days;
	public $_Route;
	public $Form;
	public $Min_Dose_Val;
	public $Min_Dose_Unit;
	public $Max_Dose_Val;
	public $Max_Dose_Unit;
	public $Frequency;
	public $Duration;
	public $DWMY;
	public $Contraindications;
	public $RecStatus;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'pres_indicationstable';
		$this->TableName = 'pres_indicationstable';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`pres_indicationstable`";
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

		// Sno
		$this->Sno = new DbField('pres_indicationstable', 'pres_indicationstable', 'x_Sno', 'Sno', '`Sno`', '`Sno`', 3, -1, FALSE, '`Sno`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->Sno->IsAutoIncrement = TRUE; // Autoincrement field
		$this->Sno->IsPrimaryKey = TRUE; // Primary key field
		$this->Sno->Sortable = TRUE; // Allow sort
		$this->Sno->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Sno'] = &$this->Sno;

		// Genericname
		$this->Genericname = new DbField('pres_indicationstable', 'pres_indicationstable', 'x_Genericname', 'Genericname', '`Genericname`', '`Genericname`', 200, -1, FALSE, '`Genericname`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Genericname->Sortable = TRUE; // Allow sort
		$this->fields['Genericname'] = &$this->Genericname;

		// Indications
		$this->Indications = new DbField('pres_indicationstable', 'pres_indicationstable', 'x_Indications', 'Indications', '`Indications`', '`Indications`', 201, -1, FALSE, '`Indications`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Indications->Sortable = TRUE; // Allow sort
		$this->fields['Indications'] = &$this->Indications;

		// Category
		$this->Category = new DbField('pres_indicationstable', 'pres_indicationstable', 'x_Category', 'Category', '`Category`', '`Category`', 200, -1, FALSE, '`Category`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Category->Sortable = TRUE; // Allow sort
		$this->fields['Category'] = &$this->Category;

		// Min_Age
		$this->Min_Age = new DbField('pres_indicationstable', 'pres_indicationstable', 'x_Min_Age', 'Min_Age', '`Min_Age`', '`Min_Age`', 3, -1, FALSE, '`Min_Age`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Min_Age->Sortable = TRUE; // Allow sort
		$this->Min_Age->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Min_Age'] = &$this->Min_Age;

		// Min_Days
		$this->Min_Days = new DbField('pres_indicationstable', 'pres_indicationstable', 'x_Min_Days', 'Min_Days', '`Min_Days`', '`Min_Days`', 200, -1, FALSE, '`Min_Days`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Min_Days->Sortable = TRUE; // Allow sort
		$this->fields['Min_Days'] = &$this->Min_Days;

		// Max_Age
		$this->Max_Age = new DbField('pres_indicationstable', 'pres_indicationstable', 'x_Max_Age', 'Max_Age', '`Max_Age`', '`Max_Age`', 3, -1, FALSE, '`Max_Age`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Max_Age->Sortable = TRUE; // Allow sort
		$this->Max_Age->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Max_Age'] = &$this->Max_Age;

		// Max_Days
		$this->Max_Days = new DbField('pres_indicationstable', 'pres_indicationstable', 'x_Max_Days', 'Max_Days', '`Max_Days`', '`Max_Days`', 200, -1, FALSE, '`Max_Days`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Max_Days->Sortable = TRUE; // Allow sort
		$this->fields['Max_Days'] = &$this->Max_Days;

		// Route
		$this->_Route = new DbField('pres_indicationstable', 'pres_indicationstable', 'x__Route', 'Route', '`Route`', '`Route`', 200, -1, FALSE, '`Route`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_Route->Sortable = TRUE; // Allow sort
		$this->fields['Route'] = &$this->_Route;

		// Form
		$this->Form = new DbField('pres_indicationstable', 'pres_indicationstable', 'x_Form', 'Form', '`Form`', '`Form`', 200, -1, FALSE, '`Form`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Form->Sortable = TRUE; // Allow sort
		$this->fields['Form'] = &$this->Form;

		// Min_Dose_Val
		$this->Min_Dose_Val = new DbField('pres_indicationstable', 'pres_indicationstable', 'x_Min_Dose_Val', 'Min_Dose_Val', '`Min_Dose_Val`', '`Min_Dose_Val`', 5, -1, FALSE, '`Min_Dose_Val`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Min_Dose_Val->Sortable = TRUE; // Allow sort
		$this->Min_Dose_Val->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Min_Dose_Val'] = &$this->Min_Dose_Val;

		// Min_Dose_Unit
		$this->Min_Dose_Unit = new DbField('pres_indicationstable', 'pres_indicationstable', 'x_Min_Dose_Unit', 'Min_Dose_Unit', '`Min_Dose_Unit`', '`Min_Dose_Unit`', 200, -1, FALSE, '`Min_Dose_Unit`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Min_Dose_Unit->Sortable = TRUE; // Allow sort
		$this->fields['Min_Dose_Unit'] = &$this->Min_Dose_Unit;

		// Max_Dose_Val
		$this->Max_Dose_Val = new DbField('pres_indicationstable', 'pres_indicationstable', 'x_Max_Dose_Val', 'Max_Dose_Val', '`Max_Dose_Val`', '`Max_Dose_Val`', 5, -1, FALSE, '`Max_Dose_Val`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Max_Dose_Val->Sortable = TRUE; // Allow sort
		$this->Max_Dose_Val->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Max_Dose_Val'] = &$this->Max_Dose_Val;

		// Max_Dose_Unit
		$this->Max_Dose_Unit = new DbField('pres_indicationstable', 'pres_indicationstable', 'x_Max_Dose_Unit', 'Max_Dose_Unit', '`Max_Dose_Unit`', '`Max_Dose_Unit`', 200, -1, FALSE, '`Max_Dose_Unit`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Max_Dose_Unit->Sortable = TRUE; // Allow sort
		$this->fields['Max_Dose_Unit'] = &$this->Max_Dose_Unit;

		// Frequency
		$this->Frequency = new DbField('pres_indicationstable', 'pres_indicationstable', 'x_Frequency', 'Frequency', '`Frequency`', '`Frequency`', 200, -1, FALSE, '`Frequency`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Frequency->Sortable = TRUE; // Allow sort
		$this->fields['Frequency'] = &$this->Frequency;

		// Duration
		$this->Duration = new DbField('pres_indicationstable', 'pres_indicationstable', 'x_Duration', 'Duration', '`Duration`', '`Duration`', 3, -1, FALSE, '`Duration`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Duration->Sortable = TRUE; // Allow sort
		$this->Duration->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Duration'] = &$this->Duration;

		// DWMY
		$this->DWMY = new DbField('pres_indicationstable', 'pres_indicationstable', 'x_DWMY', 'DWMY', '`DWMY`', '`DWMY`', 200, -1, FALSE, '`DWMY`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DWMY->Sortable = TRUE; // Allow sort
		$this->fields['DWMY'] = &$this->DWMY;

		// Contraindications
		$this->Contraindications = new DbField('pres_indicationstable', 'pres_indicationstable', 'x_Contraindications', 'Contraindications', '`Contraindications`', '`Contraindications`', 201, -1, FALSE, '`Contraindications`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Contraindications->Sortable = TRUE; // Allow sort
		$this->fields['Contraindications'] = &$this->Contraindications;

		// RecStatus
		$this->RecStatus = new DbField('pres_indicationstable', 'pres_indicationstable', 'x_RecStatus', 'RecStatus', '`RecStatus`', '`RecStatus`', 200, -1, FALSE, '`RecStatus`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RecStatus->Sortable = TRUE; // Allow sort
		$this->fields['RecStatus'] = &$this->RecStatus;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`pres_indicationstable`";
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
			$this->Sno->setDbValue($conn->insert_ID());
			$rs['Sno'] = $this->Sno->DbValue;
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
			if (array_key_exists('Sno', $rs))
				AddFilter($where, QuotedName('Sno', $this->Dbid) . '=' . QuotedValue($rs['Sno'], $this->Sno->DataType, $this->Dbid));
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
		$this->Sno->DbValue = $row['Sno'];
		$this->Genericname->DbValue = $row['Genericname'];
		$this->Indications->DbValue = $row['Indications'];
		$this->Category->DbValue = $row['Category'];
		$this->Min_Age->DbValue = $row['Min_Age'];
		$this->Min_Days->DbValue = $row['Min_Days'];
		$this->Max_Age->DbValue = $row['Max_Age'];
		$this->Max_Days->DbValue = $row['Max_Days'];
		$this->_Route->DbValue = $row['Route'];
		$this->Form->DbValue = $row['Form'];
		$this->Min_Dose_Val->DbValue = $row['Min_Dose_Val'];
		$this->Min_Dose_Unit->DbValue = $row['Min_Dose_Unit'];
		$this->Max_Dose_Val->DbValue = $row['Max_Dose_Val'];
		$this->Max_Dose_Unit->DbValue = $row['Max_Dose_Unit'];
		$this->Frequency->DbValue = $row['Frequency'];
		$this->Duration->DbValue = $row['Duration'];
		$this->DWMY->DbValue = $row['DWMY'];
		$this->Contraindications->DbValue = $row['Contraindications'];
		$this->RecStatus->DbValue = $row['RecStatus'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`Sno` = @Sno@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('Sno', $row) ? $row['Sno'] : NULL) : $this->Sno->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@Sno@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "pres_indicationstablelist.php";
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
		if ($pageName == "pres_indicationstableview.php")
			return $Language->phrase("View");
		elseif ($pageName == "pres_indicationstableedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "pres_indicationstableadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "pres_indicationstablelist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("pres_indicationstableview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("pres_indicationstableview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "pres_indicationstableadd.php?" . $this->getUrlParm($parm);
		else
			$url = "pres_indicationstableadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("pres_indicationstableedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("pres_indicationstableadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("pres_indicationstabledelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "Sno:" . JsonEncode($this->Sno->CurrentValue, "number");
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
		if ($this->Sno->CurrentValue != NULL) {
			$url .= "Sno=" . urlencode($this->Sno->CurrentValue);
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
			if (Param("Sno") !== NULL)
				$arKeys[] = Param("Sno");
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
			$this->Sno->CurrentValue = $key;
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
		$this->Sno->setDbValue($rs->fields('Sno'));
		$this->Genericname->setDbValue($rs->fields('Genericname'));
		$this->Indications->setDbValue($rs->fields('Indications'));
		$this->Category->setDbValue($rs->fields('Category'));
		$this->Min_Age->setDbValue($rs->fields('Min_Age'));
		$this->Min_Days->setDbValue($rs->fields('Min_Days'));
		$this->Max_Age->setDbValue($rs->fields('Max_Age'));
		$this->Max_Days->setDbValue($rs->fields('Max_Days'));
		$this->_Route->setDbValue($rs->fields('Route'));
		$this->Form->setDbValue($rs->fields('Form'));
		$this->Min_Dose_Val->setDbValue($rs->fields('Min_Dose_Val'));
		$this->Min_Dose_Unit->setDbValue($rs->fields('Min_Dose_Unit'));
		$this->Max_Dose_Val->setDbValue($rs->fields('Max_Dose_Val'));
		$this->Max_Dose_Unit->setDbValue($rs->fields('Max_Dose_Unit'));
		$this->Frequency->setDbValue($rs->fields('Frequency'));
		$this->Duration->setDbValue($rs->fields('Duration'));
		$this->DWMY->setDbValue($rs->fields('DWMY'));
		$this->Contraindications->setDbValue($rs->fields('Contraindications'));
		$this->RecStatus->setDbValue($rs->fields('RecStatus'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// Sno
		// Genericname
		// Indications
		// Category
		// Min_Age
		// Min_Days
		// Max_Age
		// Max_Days
		// Route
		// Form
		// Min_Dose_Val
		// Min_Dose_Unit
		// Max_Dose_Val
		// Max_Dose_Unit
		// Frequency
		// Duration
		// DWMY
		// Contraindications
		// RecStatus
		// Sno

		$this->Sno->ViewValue = $this->Sno->CurrentValue;
		$this->Sno->ViewCustomAttributes = "";

		// Genericname
		$this->Genericname->ViewValue = $this->Genericname->CurrentValue;
		$this->Genericname->ViewCustomAttributes = "";

		// Indications
		$this->Indications->ViewValue = $this->Indications->CurrentValue;
		$this->Indications->ViewCustomAttributes = "";

		// Category
		$this->Category->ViewValue = $this->Category->CurrentValue;
		$this->Category->ViewCustomAttributes = "";

		// Min_Age
		$this->Min_Age->ViewValue = $this->Min_Age->CurrentValue;
		$this->Min_Age->ViewValue = FormatNumber($this->Min_Age->ViewValue, 0, -2, -2, -2);
		$this->Min_Age->ViewCustomAttributes = "";

		// Min_Days
		$this->Min_Days->ViewValue = $this->Min_Days->CurrentValue;
		$this->Min_Days->ViewCustomAttributes = "";

		// Max_Age
		$this->Max_Age->ViewValue = $this->Max_Age->CurrentValue;
		$this->Max_Age->ViewValue = FormatNumber($this->Max_Age->ViewValue, 0, -2, -2, -2);
		$this->Max_Age->ViewCustomAttributes = "";

		// Max_Days
		$this->Max_Days->ViewValue = $this->Max_Days->CurrentValue;
		$this->Max_Days->ViewCustomAttributes = "";

		// Route
		$this->_Route->ViewValue = $this->_Route->CurrentValue;
		$this->_Route->ViewCustomAttributes = "";

		// Form
		$this->Form->ViewValue = $this->Form->CurrentValue;
		$this->Form->ViewCustomAttributes = "";

		// Min_Dose_Val
		$this->Min_Dose_Val->ViewValue = $this->Min_Dose_Val->CurrentValue;
		$this->Min_Dose_Val->ViewValue = FormatNumber($this->Min_Dose_Val->ViewValue, 2, -2, -2, -2);
		$this->Min_Dose_Val->ViewCustomAttributes = "";

		// Min_Dose_Unit
		$this->Min_Dose_Unit->ViewValue = $this->Min_Dose_Unit->CurrentValue;
		$this->Min_Dose_Unit->ViewCustomAttributes = "";

		// Max_Dose_Val
		$this->Max_Dose_Val->ViewValue = $this->Max_Dose_Val->CurrentValue;
		$this->Max_Dose_Val->ViewValue = FormatNumber($this->Max_Dose_Val->ViewValue, 2, -2, -2, -2);
		$this->Max_Dose_Val->ViewCustomAttributes = "";

		// Max_Dose_Unit
		$this->Max_Dose_Unit->ViewValue = $this->Max_Dose_Unit->CurrentValue;
		$this->Max_Dose_Unit->ViewCustomAttributes = "";

		// Frequency
		$this->Frequency->ViewValue = $this->Frequency->CurrentValue;
		$this->Frequency->ViewCustomAttributes = "";

		// Duration
		$this->Duration->ViewValue = $this->Duration->CurrentValue;
		$this->Duration->ViewValue = FormatNumber($this->Duration->ViewValue, 0, -2, -2, -2);
		$this->Duration->ViewCustomAttributes = "";

		// DWMY
		$this->DWMY->ViewValue = $this->DWMY->CurrentValue;
		$this->DWMY->ViewCustomAttributes = "";

		// Contraindications
		$this->Contraindications->ViewValue = $this->Contraindications->CurrentValue;
		$this->Contraindications->ViewCustomAttributes = "";

		// RecStatus
		$this->RecStatus->ViewValue = $this->RecStatus->CurrentValue;
		$this->RecStatus->ViewCustomAttributes = "";

		// Sno
		$this->Sno->LinkCustomAttributes = "";
		$this->Sno->HrefValue = "";
		$this->Sno->TooltipValue = "";

		// Genericname
		$this->Genericname->LinkCustomAttributes = "";
		$this->Genericname->HrefValue = "";
		$this->Genericname->TooltipValue = "";

		// Indications
		$this->Indications->LinkCustomAttributes = "";
		$this->Indications->HrefValue = "";
		$this->Indications->TooltipValue = "";

		// Category
		$this->Category->LinkCustomAttributes = "";
		$this->Category->HrefValue = "";
		$this->Category->TooltipValue = "";

		// Min_Age
		$this->Min_Age->LinkCustomAttributes = "";
		$this->Min_Age->HrefValue = "";
		$this->Min_Age->TooltipValue = "";

		// Min_Days
		$this->Min_Days->LinkCustomAttributes = "";
		$this->Min_Days->HrefValue = "";
		$this->Min_Days->TooltipValue = "";

		// Max_Age
		$this->Max_Age->LinkCustomAttributes = "";
		$this->Max_Age->HrefValue = "";
		$this->Max_Age->TooltipValue = "";

		// Max_Days
		$this->Max_Days->LinkCustomAttributes = "";
		$this->Max_Days->HrefValue = "";
		$this->Max_Days->TooltipValue = "";

		// Route
		$this->_Route->LinkCustomAttributes = "";
		$this->_Route->HrefValue = "";
		$this->_Route->TooltipValue = "";

		// Form
		$this->Form->LinkCustomAttributes = "";
		$this->Form->HrefValue = "";
		$this->Form->TooltipValue = "";

		// Min_Dose_Val
		$this->Min_Dose_Val->LinkCustomAttributes = "";
		$this->Min_Dose_Val->HrefValue = "";
		$this->Min_Dose_Val->TooltipValue = "";

		// Min_Dose_Unit
		$this->Min_Dose_Unit->LinkCustomAttributes = "";
		$this->Min_Dose_Unit->HrefValue = "";
		$this->Min_Dose_Unit->TooltipValue = "";

		// Max_Dose_Val
		$this->Max_Dose_Val->LinkCustomAttributes = "";
		$this->Max_Dose_Val->HrefValue = "";
		$this->Max_Dose_Val->TooltipValue = "";

		// Max_Dose_Unit
		$this->Max_Dose_Unit->LinkCustomAttributes = "";
		$this->Max_Dose_Unit->HrefValue = "";
		$this->Max_Dose_Unit->TooltipValue = "";

		// Frequency
		$this->Frequency->LinkCustomAttributes = "";
		$this->Frequency->HrefValue = "";
		$this->Frequency->TooltipValue = "";

		// Duration
		$this->Duration->LinkCustomAttributes = "";
		$this->Duration->HrefValue = "";
		$this->Duration->TooltipValue = "";

		// DWMY
		$this->DWMY->LinkCustomAttributes = "";
		$this->DWMY->HrefValue = "";
		$this->DWMY->TooltipValue = "";

		// Contraindications
		$this->Contraindications->LinkCustomAttributes = "";
		$this->Contraindications->HrefValue = "";
		$this->Contraindications->TooltipValue = "";

		// RecStatus
		$this->RecStatus->LinkCustomAttributes = "";
		$this->RecStatus->HrefValue = "";
		$this->RecStatus->TooltipValue = "";

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

		// Sno
		$this->Sno->EditAttrs["class"] = "form-control";
		$this->Sno->EditCustomAttributes = "";
		$this->Sno->EditValue = $this->Sno->CurrentValue;
		$this->Sno->ViewCustomAttributes = "";

		// Genericname
		$this->Genericname->EditAttrs["class"] = "form-control";
		$this->Genericname->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Genericname->CurrentValue = HtmlDecode($this->Genericname->CurrentValue);
		$this->Genericname->EditValue = $this->Genericname->CurrentValue;
		$this->Genericname->PlaceHolder = RemoveHtml($this->Genericname->caption());

		// Indications
		$this->Indications->EditAttrs["class"] = "form-control";
		$this->Indications->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Indications->CurrentValue = HtmlDecode($this->Indications->CurrentValue);
		$this->Indications->EditValue = $this->Indications->CurrentValue;
		$this->Indications->PlaceHolder = RemoveHtml($this->Indications->caption());

		// Category
		$this->Category->EditAttrs["class"] = "form-control";
		$this->Category->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Category->CurrentValue = HtmlDecode($this->Category->CurrentValue);
		$this->Category->EditValue = $this->Category->CurrentValue;
		$this->Category->PlaceHolder = RemoveHtml($this->Category->caption());

		// Min_Age
		$this->Min_Age->EditAttrs["class"] = "form-control";
		$this->Min_Age->EditCustomAttributes = "";
		$this->Min_Age->EditValue = $this->Min_Age->CurrentValue;
		$this->Min_Age->PlaceHolder = RemoveHtml($this->Min_Age->caption());

		// Min_Days
		$this->Min_Days->EditAttrs["class"] = "form-control";
		$this->Min_Days->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Min_Days->CurrentValue = HtmlDecode($this->Min_Days->CurrentValue);
		$this->Min_Days->EditValue = $this->Min_Days->CurrentValue;
		$this->Min_Days->PlaceHolder = RemoveHtml($this->Min_Days->caption());

		// Max_Age
		$this->Max_Age->EditAttrs["class"] = "form-control";
		$this->Max_Age->EditCustomAttributes = "";
		$this->Max_Age->EditValue = $this->Max_Age->CurrentValue;
		$this->Max_Age->PlaceHolder = RemoveHtml($this->Max_Age->caption());

		// Max_Days
		$this->Max_Days->EditAttrs["class"] = "form-control";
		$this->Max_Days->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Max_Days->CurrentValue = HtmlDecode($this->Max_Days->CurrentValue);
		$this->Max_Days->EditValue = $this->Max_Days->CurrentValue;
		$this->Max_Days->PlaceHolder = RemoveHtml($this->Max_Days->caption());

		// Route
		$this->_Route->EditAttrs["class"] = "form-control";
		$this->_Route->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->_Route->CurrentValue = HtmlDecode($this->_Route->CurrentValue);
		$this->_Route->EditValue = $this->_Route->CurrentValue;
		$this->_Route->PlaceHolder = RemoveHtml($this->_Route->caption());

		// Form
		$this->Form->EditAttrs["class"] = "form-control";
		$this->Form->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Form->CurrentValue = HtmlDecode($this->Form->CurrentValue);
		$this->Form->EditValue = $this->Form->CurrentValue;
		$this->Form->PlaceHolder = RemoveHtml($this->Form->caption());

		// Min_Dose_Val
		$this->Min_Dose_Val->EditAttrs["class"] = "form-control";
		$this->Min_Dose_Val->EditCustomAttributes = "";
		$this->Min_Dose_Val->EditValue = $this->Min_Dose_Val->CurrentValue;
		$this->Min_Dose_Val->PlaceHolder = RemoveHtml($this->Min_Dose_Val->caption());
		if (strval($this->Min_Dose_Val->EditValue) <> "" && is_numeric($this->Min_Dose_Val->EditValue))
			$this->Min_Dose_Val->EditValue = FormatNumber($this->Min_Dose_Val->EditValue, -2, -2, -2, -2);

		// Min_Dose_Unit
		$this->Min_Dose_Unit->EditAttrs["class"] = "form-control";
		$this->Min_Dose_Unit->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Min_Dose_Unit->CurrentValue = HtmlDecode($this->Min_Dose_Unit->CurrentValue);
		$this->Min_Dose_Unit->EditValue = $this->Min_Dose_Unit->CurrentValue;
		$this->Min_Dose_Unit->PlaceHolder = RemoveHtml($this->Min_Dose_Unit->caption());

		// Max_Dose_Val
		$this->Max_Dose_Val->EditAttrs["class"] = "form-control";
		$this->Max_Dose_Val->EditCustomAttributes = "";
		$this->Max_Dose_Val->EditValue = $this->Max_Dose_Val->CurrentValue;
		$this->Max_Dose_Val->PlaceHolder = RemoveHtml($this->Max_Dose_Val->caption());
		if (strval($this->Max_Dose_Val->EditValue) <> "" && is_numeric($this->Max_Dose_Val->EditValue))
			$this->Max_Dose_Val->EditValue = FormatNumber($this->Max_Dose_Val->EditValue, -2, -2, -2, -2);

		// Max_Dose_Unit
		$this->Max_Dose_Unit->EditAttrs["class"] = "form-control";
		$this->Max_Dose_Unit->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Max_Dose_Unit->CurrentValue = HtmlDecode($this->Max_Dose_Unit->CurrentValue);
		$this->Max_Dose_Unit->EditValue = $this->Max_Dose_Unit->CurrentValue;
		$this->Max_Dose_Unit->PlaceHolder = RemoveHtml($this->Max_Dose_Unit->caption());

		// Frequency
		$this->Frequency->EditAttrs["class"] = "form-control";
		$this->Frequency->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Frequency->CurrentValue = HtmlDecode($this->Frequency->CurrentValue);
		$this->Frequency->EditValue = $this->Frequency->CurrentValue;
		$this->Frequency->PlaceHolder = RemoveHtml($this->Frequency->caption());

		// Duration
		$this->Duration->EditAttrs["class"] = "form-control";
		$this->Duration->EditCustomAttributes = "";
		$this->Duration->EditValue = $this->Duration->CurrentValue;
		$this->Duration->PlaceHolder = RemoveHtml($this->Duration->caption());

		// DWMY
		$this->DWMY->EditAttrs["class"] = "form-control";
		$this->DWMY->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->DWMY->CurrentValue = HtmlDecode($this->DWMY->CurrentValue);
		$this->DWMY->EditValue = $this->DWMY->CurrentValue;
		$this->DWMY->PlaceHolder = RemoveHtml($this->DWMY->caption());

		// Contraindications
		$this->Contraindications->EditAttrs["class"] = "form-control";
		$this->Contraindications->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Contraindications->CurrentValue = HtmlDecode($this->Contraindications->CurrentValue);
		$this->Contraindications->EditValue = $this->Contraindications->CurrentValue;
		$this->Contraindications->PlaceHolder = RemoveHtml($this->Contraindications->caption());

		// RecStatus
		$this->RecStatus->EditAttrs["class"] = "form-control";
		$this->RecStatus->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->RecStatus->CurrentValue = HtmlDecode($this->RecStatus->CurrentValue);
		$this->RecStatus->EditValue = $this->RecStatus->CurrentValue;
		$this->RecStatus->PlaceHolder = RemoveHtml($this->RecStatus->caption());

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
					$doc->exportCaption($this->Sno);
					$doc->exportCaption($this->Genericname);
					$doc->exportCaption($this->Indications);
					$doc->exportCaption($this->Category);
					$doc->exportCaption($this->Min_Age);
					$doc->exportCaption($this->Min_Days);
					$doc->exportCaption($this->Max_Age);
					$doc->exportCaption($this->Max_Days);
					$doc->exportCaption($this->_Route);
					$doc->exportCaption($this->Form);
					$doc->exportCaption($this->Min_Dose_Val);
					$doc->exportCaption($this->Min_Dose_Unit);
					$doc->exportCaption($this->Max_Dose_Val);
					$doc->exportCaption($this->Max_Dose_Unit);
					$doc->exportCaption($this->Frequency);
					$doc->exportCaption($this->Duration);
					$doc->exportCaption($this->DWMY);
					$doc->exportCaption($this->Contraindications);
					$doc->exportCaption($this->RecStatus);
				} else {
					$doc->exportCaption($this->Sno);
					$doc->exportCaption($this->Genericname);
					$doc->exportCaption($this->Indications);
					$doc->exportCaption($this->Category);
					$doc->exportCaption($this->Min_Age);
					$doc->exportCaption($this->Min_Days);
					$doc->exportCaption($this->Max_Age);
					$doc->exportCaption($this->Max_Days);
					$doc->exportCaption($this->_Route);
					$doc->exportCaption($this->Form);
					$doc->exportCaption($this->Min_Dose_Val);
					$doc->exportCaption($this->Min_Dose_Unit);
					$doc->exportCaption($this->Max_Dose_Val);
					$doc->exportCaption($this->Max_Dose_Unit);
					$doc->exportCaption($this->Frequency);
					$doc->exportCaption($this->Duration);
					$doc->exportCaption($this->DWMY);
					$doc->exportCaption($this->Contraindications);
					$doc->exportCaption($this->RecStatus);
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
						$doc->exportField($this->Sno);
						$doc->exportField($this->Genericname);
						$doc->exportField($this->Indications);
						$doc->exportField($this->Category);
						$doc->exportField($this->Min_Age);
						$doc->exportField($this->Min_Days);
						$doc->exportField($this->Max_Age);
						$doc->exportField($this->Max_Days);
						$doc->exportField($this->_Route);
						$doc->exportField($this->Form);
						$doc->exportField($this->Min_Dose_Val);
						$doc->exportField($this->Min_Dose_Unit);
						$doc->exportField($this->Max_Dose_Val);
						$doc->exportField($this->Max_Dose_Unit);
						$doc->exportField($this->Frequency);
						$doc->exportField($this->Duration);
						$doc->exportField($this->DWMY);
						$doc->exportField($this->Contraindications);
						$doc->exportField($this->RecStatus);
					} else {
						$doc->exportField($this->Sno);
						$doc->exportField($this->Genericname);
						$doc->exportField($this->Indications);
						$doc->exportField($this->Category);
						$doc->exportField($this->Min_Age);
						$doc->exportField($this->Min_Days);
						$doc->exportField($this->Max_Age);
						$doc->exportField($this->Max_Days);
						$doc->exportField($this->_Route);
						$doc->exportField($this->Form);
						$doc->exportField($this->Min_Dose_Val);
						$doc->exportField($this->Min_Dose_Unit);
						$doc->exportField($this->Max_Dose_Val);
						$doc->exportField($this->Max_Dose_Unit);
						$doc->exportField($this->Frequency);
						$doc->exportField($this->Duration);
						$doc->exportField($this->DWMY);
						$doc->exportField($this->Contraindications);
						$doc->exportField($this->RecStatus);
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