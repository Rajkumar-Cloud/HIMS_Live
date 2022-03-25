<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for pres_trade_combination_names_new
 */
class pres_trade_combination_names_new extends DbTable
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
	public $ID;
	public $tradenames_id;
	public $Drug_Name;
	public $Generic_Name;
	public $Trade_Name;
	public $PR_CODE;
	public $Form;
	public $Strength;
	public $Unit;
	public $CONTAINER_TYPE;
	public $CONTAINER_STRENGTH;
	public $TypeOfDrug;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'pres_trade_combination_names_new';
		$this->TableName = 'pres_trade_combination_names_new';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`pres_trade_combination_names_new`";
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

		// ID
		$this->ID = new DbField('pres_trade_combination_names_new', 'pres_trade_combination_names_new', 'x_ID', 'ID', '`ID`', '`ID`', 3, -1, FALSE, '`ID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->ID->IsAutoIncrement = TRUE; // Autoincrement field
		$this->ID->IsPrimaryKey = TRUE; // Primary key field
		$this->ID->Sortable = TRUE; // Allow sort
		$this->ID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['ID'] = &$this->ID;

		// tradenames_id
		$this->tradenames_id = new DbField('pres_trade_combination_names_new', 'pres_trade_combination_names_new', 'x_tradenames_id', 'tradenames_id', '`tradenames_id`', '`tradenames_id`', 3, -1, FALSE, '`tradenames_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tradenames_id->IsForeignKey = TRUE; // Foreign key field
		$this->tradenames_id->Nullable = FALSE; // NOT NULL field
		$this->tradenames_id->Required = TRUE; // Required field
		$this->tradenames_id->Sortable = TRUE; // Allow sort
		$this->tradenames_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['tradenames_id'] = &$this->tradenames_id;

		// Drug_Name
		$this->Drug_Name = new DbField('pres_trade_combination_names_new', 'pres_trade_combination_names_new', 'x_Drug_Name', 'Drug_Name', '`Drug_Name`', '`Drug_Name`', 200, -1, FALSE, '`Drug_Name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Drug_Name->Nullable = FALSE; // NOT NULL field
		$this->Drug_Name->Required = TRUE; // Required field
		$this->Drug_Name->Sortable = TRUE; // Allow sort
		$this->fields['Drug_Name'] = &$this->Drug_Name;

		// Generic_Name
		$this->Generic_Name = new DbField('pres_trade_combination_names_new', 'pres_trade_combination_names_new', 'x_Generic_Name', 'Generic_Name', '`Generic_Name`', '`Generic_Name`', 200, -1, FALSE, '`Generic_Name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Generic_Name->Nullable = FALSE; // NOT NULL field
		$this->Generic_Name->Required = TRUE; // Required field
		$this->Generic_Name->Sortable = TRUE; // Allow sort
		$this->Generic_Name->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Generic_Name->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Generic_Name->Lookup = new Lookup('Generic_Name', 'pres_mas_generic', FALSE, 'Generic', ["Generic","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Generic_Name'] = &$this->Generic_Name;

		// Trade_Name
		$this->Trade_Name = new DbField('pres_trade_combination_names_new', 'pres_trade_combination_names_new', 'x_Trade_Name', 'Trade_Name', '`Trade_Name`', '`Trade_Name`', 200, -1, FALSE, '`Trade_Name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Trade_Name->Nullable = FALSE; // NOT NULL field
		$this->Trade_Name->Required = TRUE; // Required field
		$this->Trade_Name->Sortable = TRUE; // Allow sort
		$this->fields['Trade_Name'] = &$this->Trade_Name;

		// PR_CODE
		$this->PR_CODE = new DbField('pres_trade_combination_names_new', 'pres_trade_combination_names_new', 'x_PR_CODE', 'PR_CODE', '`PR_CODE`', '`PR_CODE`', 200, -1, FALSE, '`PR_CODE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PR_CODE->Nullable = FALSE; // NOT NULL field
		$this->PR_CODE->Required = TRUE; // Required field
		$this->PR_CODE->Sortable = TRUE; // Allow sort
		$this->fields['PR_CODE'] = &$this->PR_CODE;

		// Form
		$this->Form = new DbField('pres_trade_combination_names_new', 'pres_trade_combination_names_new', 'x_Form', 'Form', '`Form`', '`Form`', 200, -1, FALSE, '`Form`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Form->Nullable = FALSE; // NOT NULL field
		$this->Form->Required = TRUE; // Required field
		$this->Form->Sortable = TRUE; // Allow sort
		$this->Form->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Form->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Form->Lookup = new Lookup('Form', 'pres_mas_forms', FALSE, 'Forms', ["Forms","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Form'] = &$this->Form;

		// Strength
		$this->Strength = new DbField('pres_trade_combination_names_new', 'pres_trade_combination_names_new', 'x_Strength', 'Strength', '`Strength`', '`Strength`', 200, -1, FALSE, '`Strength`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Strength->Nullable = FALSE; // NOT NULL field
		$this->Strength->Required = TRUE; // Required field
		$this->Strength->Sortable = TRUE; // Allow sort
		$this->fields['Strength'] = &$this->Strength;

		// Unit
		$this->Unit = new DbField('pres_trade_combination_names_new', 'pres_trade_combination_names_new', 'x_Unit', 'Unit', '`Unit`', '`Unit`', 200, -1, FALSE, '`Unit`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Unit->Nullable = FALSE; // NOT NULL field
		$this->Unit->Required = TRUE; // Required field
		$this->Unit->Sortable = TRUE; // Allow sort
		$this->Unit->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Unit->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Unit->Lookup = new Lookup('Unit', 'pres_mas_unit', FALSE, 'Units', ["Units","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Unit'] = &$this->Unit;

		// CONTAINER_TYPE
		$this->CONTAINER_TYPE = new DbField('pres_trade_combination_names_new', 'pres_trade_combination_names_new', 'x_CONTAINER_TYPE', 'CONTAINER_TYPE', '`CONTAINER_TYPE`', '`CONTAINER_TYPE`', 200, -1, FALSE, '`CONTAINER_TYPE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CONTAINER_TYPE->Sortable = TRUE; // Allow sort
		$this->fields['CONTAINER_TYPE'] = &$this->CONTAINER_TYPE;

		// CONTAINER_STRENGTH
		$this->CONTAINER_STRENGTH = new DbField('pres_trade_combination_names_new', 'pres_trade_combination_names_new', 'x_CONTAINER_STRENGTH', 'CONTAINER_STRENGTH', '`CONTAINER_STRENGTH`', '`CONTAINER_STRENGTH`', 200, -1, FALSE, '`CONTAINER_STRENGTH`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CONTAINER_STRENGTH->Sortable = TRUE; // Allow sort
		$this->fields['CONTAINER_STRENGTH'] = &$this->CONTAINER_STRENGTH;

		// TypeOfDrug
		$this->TypeOfDrug = new DbField('pres_trade_combination_names_new', 'pres_trade_combination_names_new', 'x_TypeOfDrug', 'TypeOfDrug', '`TypeOfDrug`', '`TypeOfDrug`', 200, -1, FALSE, '`TypeOfDrug`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TypeOfDrug->Nullable = FALSE; // NOT NULL field
		$this->TypeOfDrug->Required = TRUE; // Required field
		$this->TypeOfDrug->Sortable = TRUE; // Allow sort
		$this->TypeOfDrug->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TypeOfDrug->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->TypeOfDrug->Lookup = new Lookup('TypeOfDrug', 'pres_trade_combination_names_new', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->TypeOfDrug->OptionCount = 2;
		$this->fields['TypeOfDrug'] = &$this->TypeOfDrug;
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
		if ($this->getCurrentMasterTable() == "pres_tradenames_new") {
			if ($this->tradenames_id->getSessionValue() <> "")
				$masterFilter .= "`ID`=" . QuotedValue($this->tradenames_id->getSessionValue(), DATATYPE_NUMBER, "DB");
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
		if ($this->getCurrentMasterTable() == "pres_tradenames_new") {
			if ($this->tradenames_id->getSessionValue() <> "")
				$detailFilter .= "`tradenames_id`=" . QuotedValue($this->tradenames_id->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
		}
		return $detailFilter;
	}

	// Master filter
	public function sqlMasterFilter_pres_tradenames_new()
	{
		return "`ID`=@ID@";
	}

	// Detail filter
	public function sqlDetailFilter_pres_tradenames_new()
	{
		return "`tradenames_id`=@tradenames_id@";
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`pres_trade_combination_names_new`";
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
			$this->ID->setDbValue($conn->insert_ID());
			$rs['ID'] = $this->ID->DbValue;
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
			if (array_key_exists('ID', $rs))
				AddFilter($where, QuotedName('ID', $this->Dbid) . '=' . QuotedValue($rs['ID'], $this->ID->DataType, $this->Dbid));
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
		$this->ID->DbValue = $row['ID'];
		$this->tradenames_id->DbValue = $row['tradenames_id'];
		$this->Drug_Name->DbValue = $row['Drug_Name'];
		$this->Generic_Name->DbValue = $row['Generic_Name'];
		$this->Trade_Name->DbValue = $row['Trade_Name'];
		$this->PR_CODE->DbValue = $row['PR_CODE'];
		$this->Form->DbValue = $row['Form'];
		$this->Strength->DbValue = $row['Strength'];
		$this->Unit->DbValue = $row['Unit'];
		$this->CONTAINER_TYPE->DbValue = $row['CONTAINER_TYPE'];
		$this->CONTAINER_STRENGTH->DbValue = $row['CONTAINER_STRENGTH'];
		$this->TypeOfDrug->DbValue = $row['TypeOfDrug'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`ID` = @ID@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('ID', $row) ? $row['ID'] : NULL) : $this->ID->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@ID@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "pres_trade_combination_names_newlist.php";
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
		if ($pageName == "pres_trade_combination_names_newview.php")
			return $Language->phrase("View");
		elseif ($pageName == "pres_trade_combination_names_newedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "pres_trade_combination_names_newadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "pres_trade_combination_names_newlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("pres_trade_combination_names_newview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("pres_trade_combination_names_newview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "pres_trade_combination_names_newadd.php?" . $this->getUrlParm($parm);
		else
			$url = "pres_trade_combination_names_newadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("pres_trade_combination_names_newedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("pres_trade_combination_names_newadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("pres_trade_combination_names_newdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		if ($this->getCurrentMasterTable() == "pres_tradenames_new" && !ContainsString($url, TABLE_SHOW_MASTER . "=")) {
			$url .= (ContainsString($url, "?") ? "&" : "?") . TABLE_SHOW_MASTER . "=" . $this->getCurrentMasterTable();
			$url .= "&fk_ID=" . urlencode($this->tradenames_id->CurrentValue);
		}
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "ID:" . JsonEncode($this->ID->CurrentValue, "number");
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
		if ($this->ID->CurrentValue != NULL) {
			$url .= "ID=" . urlencode($this->ID->CurrentValue);
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
			if (Param("ID") !== NULL)
				$arKeys[] = Param("ID");
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
			$this->ID->CurrentValue = $key;
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
		$this->ID->setDbValue($rs->fields('ID'));
		$this->tradenames_id->setDbValue($rs->fields('tradenames_id'));
		$this->Drug_Name->setDbValue($rs->fields('Drug_Name'));
		$this->Generic_Name->setDbValue($rs->fields('Generic_Name'));
		$this->Trade_Name->setDbValue($rs->fields('Trade_Name'));
		$this->PR_CODE->setDbValue($rs->fields('PR_CODE'));
		$this->Form->setDbValue($rs->fields('Form'));
		$this->Strength->setDbValue($rs->fields('Strength'));
		$this->Unit->setDbValue($rs->fields('Unit'));
		$this->CONTAINER_TYPE->setDbValue($rs->fields('CONTAINER_TYPE'));
		$this->CONTAINER_STRENGTH->setDbValue($rs->fields('CONTAINER_STRENGTH'));
		$this->TypeOfDrug->setDbValue($rs->fields('TypeOfDrug'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// ID
		// tradenames_id
		// Drug_Name
		// Generic_Name
		// Trade_Name
		// PR_CODE
		// Form
		// Strength
		// Unit
		// CONTAINER_TYPE
		// CONTAINER_STRENGTH
		// TypeOfDrug
		// ID

		$this->ID->ViewValue = $this->ID->CurrentValue;
		$this->ID->ViewCustomAttributes = "";

		// tradenames_id
		$this->tradenames_id->ViewValue = $this->tradenames_id->CurrentValue;
		$this->tradenames_id->ViewValue = FormatNumber($this->tradenames_id->ViewValue, 0, -2, -2, -2);
		$this->tradenames_id->ViewCustomAttributes = "";

		// Drug_Name
		$this->Drug_Name->ViewValue = $this->Drug_Name->CurrentValue;
		$this->Drug_Name->ViewCustomAttributes = "";

		// Generic_Name
		$curVal = strval($this->Generic_Name->CurrentValue);
		if ($curVal <> "") {
			$this->Generic_Name->ViewValue = $this->Generic_Name->lookupCacheOption($curVal);
			if ($this->Generic_Name->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->Generic_Name->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->Generic_Name->ViewValue = $this->Generic_Name->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Generic_Name->ViewValue = $this->Generic_Name->CurrentValue;
				}
			}
		} else {
			$this->Generic_Name->ViewValue = NULL;
		}
		$this->Generic_Name->ViewCustomAttributes = "";

		// Trade_Name
		$this->Trade_Name->ViewValue = $this->Trade_Name->CurrentValue;
		$this->Trade_Name->ViewCustomAttributes = "";

		// PR_CODE
		$this->PR_CODE->ViewValue = $this->PR_CODE->CurrentValue;
		$this->PR_CODE->ViewCustomAttributes = "";

		// Form
		$curVal = strval($this->Form->CurrentValue);
		if ($curVal <> "") {
			$this->Form->ViewValue = $this->Form->lookupCacheOption($curVal);
			if ($this->Form->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Forms`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->Form->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->Form->ViewValue = $this->Form->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Form->ViewValue = $this->Form->CurrentValue;
				}
			}
		} else {
			$this->Form->ViewValue = NULL;
		}
		$this->Form->ViewCustomAttributes = "";

		// Strength
		$this->Strength->ViewValue = $this->Strength->CurrentValue;
		$this->Strength->ViewCustomAttributes = "";

		// Unit
		$curVal = strval($this->Unit->CurrentValue);
		if ($curVal <> "") {
			$this->Unit->ViewValue = $this->Unit->lookupCacheOption($curVal);
			if ($this->Unit->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->Unit->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->Unit->ViewValue = $this->Unit->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Unit->ViewValue = $this->Unit->CurrentValue;
				}
			}
		} else {
			$this->Unit->ViewValue = NULL;
		}
		$this->Unit->ViewCustomAttributes = "";

		// CONTAINER_TYPE
		$this->CONTAINER_TYPE->ViewValue = $this->CONTAINER_TYPE->CurrentValue;
		$this->CONTAINER_TYPE->ViewCustomAttributes = "";

		// CONTAINER_STRENGTH
		$this->CONTAINER_STRENGTH->ViewValue = $this->CONTAINER_STRENGTH->CurrentValue;
		$this->CONTAINER_STRENGTH->ViewCustomAttributes = "";

		// TypeOfDrug
		if (strval($this->TypeOfDrug->CurrentValue) <> "") {
			$this->TypeOfDrug->ViewValue = $this->TypeOfDrug->optionCaption($this->TypeOfDrug->CurrentValue);
		} else {
			$this->TypeOfDrug->ViewValue = NULL;
		}
		$this->TypeOfDrug->ViewCustomAttributes = "";

		// ID
		$this->ID->LinkCustomAttributes = "";
		$this->ID->HrefValue = "";
		$this->ID->TooltipValue = "";

		// tradenames_id
		$this->tradenames_id->LinkCustomAttributes = "";
		$this->tradenames_id->HrefValue = "";
		$this->tradenames_id->TooltipValue = "";

		// Drug_Name
		$this->Drug_Name->LinkCustomAttributes = "";
		$this->Drug_Name->HrefValue = "";
		$this->Drug_Name->TooltipValue = "";

		// Generic_Name
		$this->Generic_Name->LinkCustomAttributes = "";
		$this->Generic_Name->HrefValue = "";
		$this->Generic_Name->TooltipValue = "";

		// Trade_Name
		$this->Trade_Name->LinkCustomAttributes = "";
		$this->Trade_Name->HrefValue = "";
		$this->Trade_Name->TooltipValue = "";

		// PR_CODE
		$this->PR_CODE->LinkCustomAttributes = "";
		$this->PR_CODE->HrefValue = "";
		$this->PR_CODE->TooltipValue = "";

		// Form
		$this->Form->LinkCustomAttributes = "";
		$this->Form->HrefValue = "";
		$this->Form->TooltipValue = "";

		// Strength
		$this->Strength->LinkCustomAttributes = "";
		$this->Strength->HrefValue = "";
		$this->Strength->TooltipValue = "";

		// Unit
		$this->Unit->LinkCustomAttributes = "";
		$this->Unit->HrefValue = "";
		$this->Unit->TooltipValue = "";

		// CONTAINER_TYPE
		$this->CONTAINER_TYPE->LinkCustomAttributes = "";
		$this->CONTAINER_TYPE->HrefValue = "";
		$this->CONTAINER_TYPE->TooltipValue = "";

		// CONTAINER_STRENGTH
		$this->CONTAINER_STRENGTH->LinkCustomAttributes = "";
		$this->CONTAINER_STRENGTH->HrefValue = "";
		$this->CONTAINER_STRENGTH->TooltipValue = "";

		// TypeOfDrug
		$this->TypeOfDrug->LinkCustomAttributes = "";
		$this->TypeOfDrug->HrefValue = "";
		$this->TypeOfDrug->TooltipValue = "";

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

		// ID
		$this->ID->EditAttrs["class"] = "form-control";
		$this->ID->EditCustomAttributes = "";
		$this->ID->EditValue = $this->ID->CurrentValue;
		$this->ID->ViewCustomAttributes = "";

		// tradenames_id
		$this->tradenames_id->EditAttrs["class"] = "form-control";
		$this->tradenames_id->EditCustomAttributes = "";
		if ($this->tradenames_id->getSessionValue() <> "") {
			$this->tradenames_id->CurrentValue = $this->tradenames_id->getSessionValue();
		$this->tradenames_id->ViewValue = $this->tradenames_id->CurrentValue;
		$this->tradenames_id->ViewValue = FormatNumber($this->tradenames_id->ViewValue, 0, -2, -2, -2);
		$this->tradenames_id->ViewCustomAttributes = "";
		} else {
		$this->tradenames_id->EditValue = $this->tradenames_id->CurrentValue;
		$this->tradenames_id->PlaceHolder = RemoveHtml($this->tradenames_id->caption());
		}

		// Drug_Name
		$this->Drug_Name->EditAttrs["class"] = "form-control";
		$this->Drug_Name->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Drug_Name->CurrentValue = HtmlDecode($this->Drug_Name->CurrentValue);
		$this->Drug_Name->EditValue = $this->Drug_Name->CurrentValue;
		$this->Drug_Name->PlaceHolder = RemoveHtml($this->Drug_Name->caption());

		// Generic_Name
		$this->Generic_Name->EditAttrs["class"] = "form-control";
		$this->Generic_Name->EditCustomAttributes = "";

		// Trade_Name
		$this->Trade_Name->EditAttrs["class"] = "form-control";
		$this->Trade_Name->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Trade_Name->CurrentValue = HtmlDecode($this->Trade_Name->CurrentValue);
		$this->Trade_Name->EditValue = $this->Trade_Name->CurrentValue;
		$this->Trade_Name->PlaceHolder = RemoveHtml($this->Trade_Name->caption());

		// PR_CODE
		$this->PR_CODE->EditAttrs["class"] = "form-control";
		$this->PR_CODE->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PR_CODE->CurrentValue = HtmlDecode($this->PR_CODE->CurrentValue);
		$this->PR_CODE->EditValue = $this->PR_CODE->CurrentValue;
		$this->PR_CODE->PlaceHolder = RemoveHtml($this->PR_CODE->caption());

		// Form
		$this->Form->EditAttrs["class"] = "form-control";
		$this->Form->EditCustomAttributes = "";

		// Strength
		$this->Strength->EditAttrs["class"] = "form-control";
		$this->Strength->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Strength->CurrentValue = HtmlDecode($this->Strength->CurrentValue);
		$this->Strength->EditValue = $this->Strength->CurrentValue;
		$this->Strength->PlaceHolder = RemoveHtml($this->Strength->caption());

		// Unit
		$this->Unit->EditAttrs["class"] = "form-control";
		$this->Unit->EditCustomAttributes = "";

		// CONTAINER_TYPE
		$this->CONTAINER_TYPE->EditAttrs["class"] = "form-control";
		$this->CONTAINER_TYPE->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->CONTAINER_TYPE->CurrentValue = HtmlDecode($this->CONTAINER_TYPE->CurrentValue);
		$this->CONTAINER_TYPE->EditValue = $this->CONTAINER_TYPE->CurrentValue;
		$this->CONTAINER_TYPE->PlaceHolder = RemoveHtml($this->CONTAINER_TYPE->caption());

		// CONTAINER_STRENGTH
		$this->CONTAINER_STRENGTH->EditAttrs["class"] = "form-control";
		$this->CONTAINER_STRENGTH->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->CONTAINER_STRENGTH->CurrentValue = HtmlDecode($this->CONTAINER_STRENGTH->CurrentValue);
		$this->CONTAINER_STRENGTH->EditValue = $this->CONTAINER_STRENGTH->CurrentValue;
		$this->CONTAINER_STRENGTH->PlaceHolder = RemoveHtml($this->CONTAINER_STRENGTH->caption());

		// TypeOfDrug
		$this->TypeOfDrug->EditAttrs["class"] = "form-control";
		$this->TypeOfDrug->EditCustomAttributes = "";
		$this->TypeOfDrug->EditValue = $this->TypeOfDrug->options(TRUE);

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
					$doc->exportCaption($this->ID);
					$doc->exportCaption($this->tradenames_id);
					$doc->exportCaption($this->Drug_Name);
					$doc->exportCaption($this->Generic_Name);
					$doc->exportCaption($this->Trade_Name);
					$doc->exportCaption($this->PR_CODE);
					$doc->exportCaption($this->Form);
					$doc->exportCaption($this->Strength);
					$doc->exportCaption($this->Unit);
					$doc->exportCaption($this->CONTAINER_TYPE);
					$doc->exportCaption($this->CONTAINER_STRENGTH);
					$doc->exportCaption($this->TypeOfDrug);
				} else {
					$doc->exportCaption($this->ID);
					$doc->exportCaption($this->tradenames_id);
					$doc->exportCaption($this->Drug_Name);
					$doc->exportCaption($this->Generic_Name);
					$doc->exportCaption($this->Trade_Name);
					$doc->exportCaption($this->PR_CODE);
					$doc->exportCaption($this->Form);
					$doc->exportCaption($this->Strength);
					$doc->exportCaption($this->Unit);
					$doc->exportCaption($this->CONTAINER_TYPE);
					$doc->exportCaption($this->CONTAINER_STRENGTH);
					$doc->exportCaption($this->TypeOfDrug);
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
						$doc->exportField($this->ID);
						$doc->exportField($this->tradenames_id);
						$doc->exportField($this->Drug_Name);
						$doc->exportField($this->Generic_Name);
						$doc->exportField($this->Trade_Name);
						$doc->exportField($this->PR_CODE);
						$doc->exportField($this->Form);
						$doc->exportField($this->Strength);
						$doc->exportField($this->Unit);
						$doc->exportField($this->CONTAINER_TYPE);
						$doc->exportField($this->CONTAINER_STRENGTH);
						$doc->exportField($this->TypeOfDrug);
					} else {
						$doc->exportField($this->ID);
						$doc->exportField($this->tradenames_id);
						$doc->exportField($this->Drug_Name);
						$doc->exportField($this->Generic_Name);
						$doc->exportField($this->Trade_Name);
						$doc->exportField($this->PR_CODE);
						$doc->exportField($this->Form);
						$doc->exportField($this->Strength);
						$doc->exportField($this->Unit);
						$doc->exportField($this->CONTAINER_TYPE);
						$doc->exportField($this->CONTAINER_STRENGTH);
						$doc->exportField($this->TypeOfDrug);
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