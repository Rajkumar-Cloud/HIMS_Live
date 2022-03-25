<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for mas_user_template_prescription
 */
class mas_user_template_prescription extends DbTable
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
	public $TemplateName;
	public $Medicine;
	public $M;
	public $A;
	public $N;
	public $NoOfDays;
	public $PreRoute;
	public $TimeOfTaking;
	public $Type;
	public $Status;
	public $CreatedBy;
	public $CreateDateTime;
	public $ModifiedBy;
	public $ModifiedDateTime;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'mas_user_template_prescription';
		$this->TableName = 'mas_user_template_prescription';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`mas_user_template_prescription`";
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
		$this->id = new DbField('mas_user_template_prescription', 'mas_user_template_prescription', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// TemplateName
		$this->TemplateName = new DbField('mas_user_template_prescription', 'mas_user_template_prescription', 'x_TemplateName', 'TemplateName', '`TemplateName`', '`TemplateName`', 200, -1, FALSE, '`TemplateName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TemplateName->Nullable = FALSE; // NOT NULL field
		$this->TemplateName->Required = TRUE; // Required field
		$this->TemplateName->Sortable = TRUE; // Allow sort
		$this->TemplateName->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TemplateName->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->TemplateName->Lookup = new Lookup('TemplateName', 'mas_template_prescription_type', FALSE, 'TemplateName', ["TemplateName","","",""], [], [], [], [], [], [], '', '');
		$this->fields['TemplateName'] = &$this->TemplateName;

		// Medicine
		$this->Medicine = new DbField('mas_user_template_prescription', 'mas_user_template_prescription', 'x_Medicine', 'Medicine', '`Medicine`', '`Medicine`', 200, -1, FALSE, '`Medicine`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Medicine->Nullable = FALSE; // NOT NULL field
		$this->Medicine->Required = TRUE; // Required field
		$this->Medicine->Sortable = TRUE; // Allow sort
		$this->Medicine->Lookup = new Lookup('Medicine', 'pres_tradenames_new', FALSE, 'Trade_Name', ["Trade_Name","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Medicine'] = &$this->Medicine;

		// M
		$this->M = new DbField('mas_user_template_prescription', 'mas_user_template_prescription', 'x_M', 'M', '`M`', '`M`', 200, -1, FALSE, '`M`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->M->Nullable = FALSE; // NOT NULL field
		$this->M->Required = TRUE; // Required field
		$this->M->Sortable = TRUE; // Allow sort
		$this->fields['M'] = &$this->M;

		// A
		$this->A = new DbField('mas_user_template_prescription', 'mas_user_template_prescription', 'x_A', 'A', '`A`', '`A`', 200, -1, FALSE, '`A`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->A->Nullable = FALSE; // NOT NULL field
		$this->A->Required = TRUE; // Required field
		$this->A->Sortable = TRUE; // Allow sort
		$this->fields['A'] = &$this->A;

		// N
		$this->N = new DbField('mas_user_template_prescription', 'mas_user_template_prescription', 'x_N', 'N', '`N`', '`N`', 200, -1, FALSE, '`N`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->N->Nullable = FALSE; // NOT NULL field
		$this->N->Required = TRUE; // Required field
		$this->N->Sortable = TRUE; // Allow sort
		$this->fields['N'] = &$this->N;

		// NoOfDays
		$this->NoOfDays = new DbField('mas_user_template_prescription', 'mas_user_template_prescription', 'x_NoOfDays', 'NoOfDays', '`NoOfDays`', '`NoOfDays`', 200, -1, FALSE, '`NoOfDays`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NoOfDays->Nullable = FALSE; // NOT NULL field
		$this->NoOfDays->Required = TRUE; // Required field
		$this->NoOfDays->Sortable = TRUE; // Allow sort
		$this->fields['NoOfDays'] = &$this->NoOfDays;

		// PreRoute
		$this->PreRoute = new DbField('mas_user_template_prescription', 'mas_user_template_prescription', 'x_PreRoute', 'PreRoute', '`PreRoute`', '`PreRoute`', 200, -1, FALSE, '`EV__PreRoute`', TRUE, FALSE, TRUE, 'FORMATTED TEXT', 'TEXT');
		$this->PreRoute->Nullable = FALSE; // NOT NULL field
		$this->PreRoute->Required = TRUE; // Required field
		$this->PreRoute->Sortable = TRUE; // Allow sort
		$this->PreRoute->Lookup = new Lookup('PreRoute', 'pres_mas_route', FALSE, 'Route', ["Route","","",""], [], [], [], [], [], [], '', '');
		$this->fields['PreRoute'] = &$this->PreRoute;

		// TimeOfTaking
		$this->TimeOfTaking = new DbField('mas_user_template_prescription', 'mas_user_template_prescription', 'x_TimeOfTaking', 'TimeOfTaking', '`TimeOfTaking`', '`TimeOfTaking`', 200, -1, FALSE, '`EV__TimeOfTaking`', TRUE, FALSE, TRUE, 'FORMATTED TEXT', 'TEXT');
		$this->TimeOfTaking->Nullable = FALSE; // NOT NULL field
		$this->TimeOfTaking->Required = TRUE; // Required field
		$this->TimeOfTaking->Sortable = TRUE; // Allow sort
		$this->TimeOfTaking->Lookup = new Lookup('TimeOfTaking', 'pres_mas_timeoftaking', FALSE, 'Time Of Taking', ["Time Of Taking","","",""], [], [], [], [], [], [], '', '');
		$this->fields['TimeOfTaking'] = &$this->TimeOfTaking;

		// Type
		$this->Type = new DbField('mas_user_template_prescription', 'mas_user_template_prescription', 'x_Type', 'Type', '`Type`', '`Type`', 200, -1, FALSE, '`Type`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Type->Nullable = FALSE; // NOT NULL field
		$this->Type->Required = TRUE; // Required field
		$this->Type->Sortable = FALSE; // Allow sort
		$this->fields['Type'] = &$this->Type;

		// Status
		$this->Status = new DbField('mas_user_template_prescription', 'mas_user_template_prescription', 'x_Status', 'Status', '`Status`', '`Status`', 200, -1, FALSE, '`Status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Status->Nullable = FALSE; // NOT NULL field
		$this->Status->Required = TRUE; // Required field
		$this->Status->Sortable = FALSE; // Allow sort
		$this->Status->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Status->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->fields['Status'] = &$this->Status;

		// CreatedBy
		$this->CreatedBy = new DbField('mas_user_template_prescription', 'mas_user_template_prescription', 'x_CreatedBy', 'CreatedBy', '`CreatedBy`', '`CreatedBy`', 200, -1, FALSE, '`CreatedBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CreatedBy->Sortable = TRUE; // Allow sort
		$this->fields['CreatedBy'] = &$this->CreatedBy;

		// CreateDateTime
		$this->CreateDateTime = new DbField('mas_user_template_prescription', 'mas_user_template_prescription', 'x_CreateDateTime', 'CreateDateTime', '`CreateDateTime`', '`CreateDateTime`', 200, -1, FALSE, '`CreateDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CreateDateTime->Sortable = TRUE; // Allow sort
		$this->fields['CreateDateTime'] = &$this->CreateDateTime;

		// ModifiedBy
		$this->ModifiedBy = new DbField('mas_user_template_prescription', 'mas_user_template_prescription', 'x_ModifiedBy', 'ModifiedBy', '`ModifiedBy`', '`ModifiedBy`', 200, -1, FALSE, '`ModifiedBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ModifiedBy->Sortable = TRUE; // Allow sort
		$this->fields['ModifiedBy'] = &$this->ModifiedBy;

		// ModifiedDateTime
		$this->ModifiedDateTime = new DbField('mas_user_template_prescription', 'mas_user_template_prescription', 'x_ModifiedDateTime', 'ModifiedDateTime', '`ModifiedDateTime`', '`ModifiedDateTime`', 200, -1, FALSE, '`ModifiedDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ModifiedDateTime->Sortable = TRUE; // Allow sort
		$this->fields['ModifiedDateTime'] = &$this->ModifiedDateTime;
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
			$sortFieldList = ($fld->VirtualExpression <> "") ? $fld->VirtualExpression : $sortField;
			$this->setSessionOrderByList($sortFieldList . " " . $thisSort); // Save to Session
		} else {
			$fld->setSort("");
		}
	}

	// Session ORDER BY for List page
	public function getSessionOrderByList()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_ORDER_BY_LIST];
	}
	public function setSessionOrderByList($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_ORDER_BY_LIST] = $v;
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`mas_user_template_prescription`";
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
	public function getSqlSelectList() // Select for List page
	{
		$select = "";
		$select = "SELECT * FROM (" .
			"SELECT *, (SELECT `Route` FROM `pres_mas_route` `TMP_LOOKUPTABLE` WHERE `TMP_LOOKUPTABLE`.`Route` = `mas_user_template_prescription`.`PreRoute` LIMIT 1) AS `EV__PreRoute`, (SELECT `Time Of Taking` FROM `pres_mas_timeoftaking` `TMP_LOOKUPTABLE` WHERE `TMP_LOOKUPTABLE`.`Time Of Taking` = `mas_user_template_prescription`.`TimeOfTaking` LIMIT 1) AS `EV__TimeOfTaking` FROM `mas_user_template_prescription`" .
			") `TMP_TABLE`";
		return ($this->SqlSelectList <> "") ? $this->SqlSelectList : $select;
	}
	public function sqlSelectList() // For backward compatibility
	{
		return $this->getSqlSelectList();
	}
	public function setSqlSelectList($v)
	{
		$this->SqlSelectList = $v;
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
		if ($this->useVirtualFields()) {
			$select = $this->getSqlSelectList();
			$sort = $this->UseSessionForListSql ? $this->getSessionOrderByList() : "";
		} else {
			$select = $this->getSqlSelect();
			$sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
		}
		return BuildSelectSql($select, $this->getSqlWhere(), $this->getSqlGroupBy(),
			$this->getSqlHaving(), $this->getSqlOrderBy(), $filter, $sort);
	}

	// Get ORDER BY clause
	public function getOrderBy()
	{
		$sort = ($this->useVirtualFields()) ? $this->getSessionOrderByList() : $this->getSessionOrderBy();
		return BuildSelectSql("", "", "", "", $this->getSqlOrderBy(), "", $sort);
	}

	// Check if virtual fields is used in SQL
	protected function useVirtualFields()
	{
		$where = $this->UseSessionForListSql ? $this->getSessionWhere() : $this->CurrentFilter;
		$orderBy = $this->UseSessionForListSql ? $this->getSessionOrderByList() : "";
		if ($where <> "")
			$where = " " . str_replace(array("(",")"), array("",""), $where) . " ";
		if ($orderBy <> "")
			$orderBy = " " . str_replace(array("(",")"), array("",""), $orderBy) . " ";
		if ($this->BasicSearch->getKeyword() <> "")
			return TRUE;
		if ($this->PreRoute->AdvancedSearch->SearchValue <> "" ||
			$this->PreRoute->AdvancedSearch->SearchValue2 <> "" ||
			ContainsString($where, " " . $this->PreRoute->VirtualExpression . " "))
			return TRUE;
		if (ContainsString($orderBy, " " . $this->PreRoute->VirtualExpression . " "))
			return TRUE;
		if ($this->TimeOfTaking->AdvancedSearch->SearchValue <> "" ||
			$this->TimeOfTaking->AdvancedSearch->SearchValue2 <> "" ||
			ContainsString($where, " " . $this->TimeOfTaking->VirtualExpression . " "))
			return TRUE;
		if (ContainsString($orderBy, " " . $this->TimeOfTaking->VirtualExpression . " "))
			return TRUE;
		return FALSE;
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
		if ($this->useVirtualFields())
			$sql = BuildSelectSql($this->getSqlSelectList(), $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
		else
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
		$this->TemplateName->DbValue = $row['TemplateName'];
		$this->Medicine->DbValue = $row['Medicine'];
		$this->M->DbValue = $row['M'];
		$this->A->DbValue = $row['A'];
		$this->N->DbValue = $row['N'];
		$this->NoOfDays->DbValue = $row['NoOfDays'];
		$this->PreRoute->DbValue = $row['PreRoute'];
		$this->TimeOfTaking->DbValue = $row['TimeOfTaking'];
		$this->Type->DbValue = $row['Type'];
		$this->Status->DbValue = $row['Status'];
		$this->CreatedBy->DbValue = $row['CreatedBy'];
		$this->CreateDateTime->DbValue = $row['CreateDateTime'];
		$this->ModifiedBy->DbValue = $row['ModifiedBy'];
		$this->ModifiedDateTime->DbValue = $row['ModifiedDateTime'];
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
			return "mas_user_template_prescriptionlist.php";
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
		if ($pageName == "mas_user_template_prescriptionview.php")
			return $Language->phrase("View");
		elseif ($pageName == "mas_user_template_prescriptionedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "mas_user_template_prescriptionadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "mas_user_template_prescriptionlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("mas_user_template_prescriptionview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("mas_user_template_prescriptionview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "mas_user_template_prescriptionadd.php?" . $this->getUrlParm($parm);
		else
			$url = "mas_user_template_prescriptionadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("mas_user_template_prescriptionedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("mas_user_template_prescriptionadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("mas_user_template_prescriptiondelete.php", $this->getUrlParm());
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
		$this->TemplateName->setDbValue($rs->fields('TemplateName'));
		$this->Medicine->setDbValue($rs->fields('Medicine'));
		$this->M->setDbValue($rs->fields('M'));
		$this->A->setDbValue($rs->fields('A'));
		$this->N->setDbValue($rs->fields('N'));
		$this->NoOfDays->setDbValue($rs->fields('NoOfDays'));
		$this->PreRoute->setDbValue($rs->fields('PreRoute'));
		$this->TimeOfTaking->setDbValue($rs->fields('TimeOfTaking'));
		$this->Type->setDbValue($rs->fields('Type'));
		$this->Status->setDbValue($rs->fields('Status'));
		$this->CreatedBy->setDbValue($rs->fields('CreatedBy'));
		$this->CreateDateTime->setDbValue($rs->fields('CreateDateTime'));
		$this->ModifiedBy->setDbValue($rs->fields('ModifiedBy'));
		$this->ModifiedDateTime->setDbValue($rs->fields('ModifiedDateTime'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// TemplateName
		// Medicine
		// M
		// A
		// N
		// NoOfDays
		// PreRoute
		// TimeOfTaking
		// Type

		$this->Type->CellCssStyle = "white-space: nowrap;";

		// Status
		$this->Status->CellCssStyle = "white-space: nowrap;";

		// CreatedBy
		// CreateDateTime
		// ModifiedBy
		// ModifiedDateTime
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// TemplateName
		$curVal = strval($this->TemplateName->CurrentValue);
		if ($curVal <> "") {
			$this->TemplateName->ViewValue = $this->TemplateName->lookupCacheOption($curVal);
			if ($this->TemplateName->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->TemplateName->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->TemplateName->ViewValue = $this->TemplateName->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->TemplateName->ViewValue = $this->TemplateName->CurrentValue;
				}
			}
		} else {
			$this->TemplateName->ViewValue = NULL;
		}
		$this->TemplateName->ViewCustomAttributes = "";

		// Medicine
		$this->Medicine->ViewValue = $this->Medicine->CurrentValue;
		$curVal = strval($this->Medicine->CurrentValue);
		if ($curVal <> "") {
			$this->Medicine->ViewValue = $this->Medicine->lookupCacheOption($curVal);
			if ($this->Medicine->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Trade_Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->Medicine->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->Medicine->ViewValue = $this->Medicine->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Medicine->ViewValue = $this->Medicine->CurrentValue;
				}
			}
		} else {
			$this->Medicine->ViewValue = NULL;
		}
		$this->Medicine->ViewCustomAttributes = "";

		// M
		$this->M->ViewValue = $this->M->CurrentValue;
		$this->M->ViewCustomAttributes = "";

		// A
		$this->A->ViewValue = $this->A->CurrentValue;
		$this->A->ViewCustomAttributes = "";

		// N
		$this->N->ViewValue = $this->N->CurrentValue;
		$this->N->ViewCustomAttributes = "";

		// NoOfDays
		$this->NoOfDays->ViewValue = $this->NoOfDays->CurrentValue;
		$this->NoOfDays->ViewCustomAttributes = "";

		// PreRoute
		if ($this->PreRoute->VirtualValue <> "") {
			$this->PreRoute->ViewValue = $this->PreRoute->VirtualValue;
		} else {
			$this->PreRoute->ViewValue = $this->PreRoute->CurrentValue;
		$curVal = strval($this->PreRoute->CurrentValue);
		if ($curVal <> "") {
			$this->PreRoute->ViewValue = $this->PreRoute->lookupCacheOption($curVal);
			if ($this->PreRoute->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Route`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->PreRoute->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->PreRoute->ViewValue = $this->PreRoute->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->PreRoute->ViewValue = $this->PreRoute->CurrentValue;
				}
			}
		} else {
			$this->PreRoute->ViewValue = NULL;
		}
		}
		$this->PreRoute->ViewCustomAttributes = "";

		// TimeOfTaking
		if ($this->TimeOfTaking->VirtualValue <> "") {
			$this->TimeOfTaking->ViewValue = $this->TimeOfTaking->VirtualValue;
		} else {
			$this->TimeOfTaking->ViewValue = $this->TimeOfTaking->CurrentValue;
		$curVal = strval($this->TimeOfTaking->CurrentValue);
		if ($curVal <> "") {
			$this->TimeOfTaking->ViewValue = $this->TimeOfTaking->lookupCacheOption($curVal);
			if ($this->TimeOfTaking->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Time Of Taking`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->TimeOfTaking->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->TimeOfTaking->ViewValue = $this->TimeOfTaking->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->TimeOfTaking->ViewValue = $this->TimeOfTaking->CurrentValue;
				}
			}
		} else {
			$this->TimeOfTaking->ViewValue = NULL;
		}
		}
		$this->TimeOfTaking->ViewCustomAttributes = "";

		// Type
		$this->Type->ViewValue = $this->Type->CurrentValue;
		$this->Type->ViewCustomAttributes = "";

		// Status
		$this->Status->ViewCustomAttributes = "";

		// CreatedBy
		$this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
		$this->CreatedBy->ViewCustomAttributes = "";

		// CreateDateTime
		$this->CreateDateTime->ViewValue = $this->CreateDateTime->CurrentValue;
		$this->CreateDateTime->ViewCustomAttributes = "";

		// ModifiedBy
		$this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
		$this->ModifiedBy->ViewCustomAttributes = "";

		// ModifiedDateTime
		$this->ModifiedDateTime->ViewValue = $this->ModifiedDateTime->CurrentValue;
		$this->ModifiedDateTime->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// TemplateName
		$this->TemplateName->LinkCustomAttributes = "";
		$this->TemplateName->HrefValue = "";
		$this->TemplateName->TooltipValue = "";

		// Medicine
		$this->Medicine->LinkCustomAttributes = "";
		$this->Medicine->HrefValue = "";
		$this->Medicine->TooltipValue = "";

		// M
		$this->M->LinkCustomAttributes = "";
		$this->M->HrefValue = "";
		$this->M->TooltipValue = "";

		// A
		$this->A->LinkCustomAttributes = "";
		$this->A->HrefValue = "";
		$this->A->TooltipValue = "";

		// N
		$this->N->LinkCustomAttributes = "";
		$this->N->HrefValue = "";
		$this->N->TooltipValue = "";

		// NoOfDays
		$this->NoOfDays->LinkCustomAttributes = "";
		$this->NoOfDays->HrefValue = "";
		$this->NoOfDays->TooltipValue = "";

		// PreRoute
		$this->PreRoute->LinkCustomAttributes = "";
		$this->PreRoute->HrefValue = "";
		$this->PreRoute->TooltipValue = "";

		// TimeOfTaking
		$this->TimeOfTaking->LinkCustomAttributes = "";
		$this->TimeOfTaking->HrefValue = "";
		$this->TimeOfTaking->TooltipValue = "";

		// Type
		$this->Type->LinkCustomAttributes = "";
		$this->Type->HrefValue = "";
		$this->Type->TooltipValue = "";

		// Status
		$this->Status->LinkCustomAttributes = "";
		$this->Status->HrefValue = "";
		$this->Status->TooltipValue = "";

		// CreatedBy
		$this->CreatedBy->LinkCustomAttributes = "";
		$this->CreatedBy->HrefValue = "";
		$this->CreatedBy->TooltipValue = "";

		// CreateDateTime
		$this->CreateDateTime->LinkCustomAttributes = "";
		$this->CreateDateTime->HrefValue = "";
		$this->CreateDateTime->TooltipValue = "";

		// ModifiedBy
		$this->ModifiedBy->LinkCustomAttributes = "";
		$this->ModifiedBy->HrefValue = "";
		$this->ModifiedBy->TooltipValue = "";

		// ModifiedDateTime
		$this->ModifiedDateTime->LinkCustomAttributes = "";
		$this->ModifiedDateTime->HrefValue = "";
		$this->ModifiedDateTime->TooltipValue = "";

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

		// TemplateName
		$this->TemplateName->EditAttrs["class"] = "form-control";
		$this->TemplateName->EditCustomAttributes = "";

		// Medicine
		$this->Medicine->EditAttrs["class"] = "form-control";
		$this->Medicine->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Medicine->CurrentValue = HtmlDecode($this->Medicine->CurrentValue);
		$this->Medicine->EditValue = $this->Medicine->CurrentValue;
		$this->Medicine->PlaceHolder = RemoveHtml($this->Medicine->caption());

		// M
		$this->M->EditAttrs["class"] = "form-control";
		$this->M->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->M->CurrentValue = HtmlDecode($this->M->CurrentValue);
		$this->M->EditValue = $this->M->CurrentValue;
		$this->M->PlaceHolder = RemoveHtml($this->M->caption());

		// A
		$this->A->EditAttrs["class"] = "form-control";
		$this->A->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->A->CurrentValue = HtmlDecode($this->A->CurrentValue);
		$this->A->EditValue = $this->A->CurrentValue;
		$this->A->PlaceHolder = RemoveHtml($this->A->caption());

		// N
		$this->N->EditAttrs["class"] = "form-control";
		$this->N->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->N->CurrentValue = HtmlDecode($this->N->CurrentValue);
		$this->N->EditValue = $this->N->CurrentValue;
		$this->N->PlaceHolder = RemoveHtml($this->N->caption());

		// NoOfDays
		$this->NoOfDays->EditAttrs["class"] = "form-control";
		$this->NoOfDays->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->NoOfDays->CurrentValue = HtmlDecode($this->NoOfDays->CurrentValue);
		$this->NoOfDays->EditValue = $this->NoOfDays->CurrentValue;
		$this->NoOfDays->PlaceHolder = RemoveHtml($this->NoOfDays->caption());

		// PreRoute
		$this->PreRoute->EditAttrs["class"] = "form-control";
		$this->PreRoute->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PreRoute->CurrentValue = HtmlDecode($this->PreRoute->CurrentValue);
		$this->PreRoute->EditValue = $this->PreRoute->CurrentValue;
		$this->PreRoute->PlaceHolder = RemoveHtml($this->PreRoute->caption());

		// TimeOfTaking
		$this->TimeOfTaking->EditAttrs["class"] = "form-control";
		$this->TimeOfTaking->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->TimeOfTaking->CurrentValue = HtmlDecode($this->TimeOfTaking->CurrentValue);
		$this->TimeOfTaking->EditValue = $this->TimeOfTaking->CurrentValue;
		$this->TimeOfTaking->PlaceHolder = RemoveHtml($this->TimeOfTaking->caption());

		// Type
		$this->Type->EditAttrs["class"] = "form-control";
		$this->Type->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Type->CurrentValue = HtmlDecode($this->Type->CurrentValue);
		$this->Type->EditValue = $this->Type->CurrentValue;
		$this->Type->PlaceHolder = RemoveHtml($this->Type->caption());

		// Status
		$this->Status->EditAttrs["class"] = "form-control";
		$this->Status->EditCustomAttributes = "";

		// CreatedBy
		// CreateDateTime
		// ModifiedBy
		// ModifiedDateTime
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
					$doc->exportCaption($this->TemplateName);
					$doc->exportCaption($this->Medicine);
					$doc->exportCaption($this->M);
					$doc->exportCaption($this->A);
					$doc->exportCaption($this->N);
					$doc->exportCaption($this->NoOfDays);
					$doc->exportCaption($this->PreRoute);
					$doc->exportCaption($this->TimeOfTaking);
					$doc->exportCaption($this->CreatedBy);
					$doc->exportCaption($this->CreateDateTime);
					$doc->exportCaption($this->ModifiedBy);
					$doc->exportCaption($this->ModifiedDateTime);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->TemplateName);
					$doc->exportCaption($this->Medicine);
					$doc->exportCaption($this->M);
					$doc->exportCaption($this->A);
					$doc->exportCaption($this->N);
					$doc->exportCaption($this->NoOfDays);
					$doc->exportCaption($this->PreRoute);
					$doc->exportCaption($this->TimeOfTaking);
					$doc->exportCaption($this->CreatedBy);
					$doc->exportCaption($this->CreateDateTime);
					$doc->exportCaption($this->ModifiedBy);
					$doc->exportCaption($this->ModifiedDateTime);
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
						$doc->exportField($this->TemplateName);
						$doc->exportField($this->Medicine);
						$doc->exportField($this->M);
						$doc->exportField($this->A);
						$doc->exportField($this->N);
						$doc->exportField($this->NoOfDays);
						$doc->exportField($this->PreRoute);
						$doc->exportField($this->TimeOfTaking);
						$doc->exportField($this->CreatedBy);
						$doc->exportField($this->CreateDateTime);
						$doc->exportField($this->ModifiedBy);
						$doc->exportField($this->ModifiedDateTime);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->TemplateName);
						$doc->exportField($this->Medicine);
						$doc->exportField($this->M);
						$doc->exportField($this->A);
						$doc->exportField($this->N);
						$doc->exportField($this->NoOfDays);
						$doc->exportField($this->PreRoute);
						$doc->exportField($this->TimeOfTaking);
						$doc->exportField($this->CreatedBy);
						$doc->exportField($this->CreateDateTime);
						$doc->exportField($this->ModifiedBy);
						$doc->exportField($this->ModifiedDateTime);
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