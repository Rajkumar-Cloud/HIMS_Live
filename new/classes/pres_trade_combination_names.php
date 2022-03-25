<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for pres_trade_combination_names
 */
class pres_trade_combination_names extends DbTable
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
	public $tradenames_id;
	public $GENERIC_NAMES;
	public $TRADE_NAME;
	public $Drug_Name;
	public $PR_CODE;
	public $GenericNames_symbols;
	public $CONTAINER_TYPE;
	public $STRENGTH;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'pres_trade_combination_names';
		$this->TableName = 'pres_trade_combination_names';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`pres_trade_combination_names`";
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
		$this->id = new DbField('pres_trade_combination_names', 'pres_trade_combination_names', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// tradenames_id
		$this->tradenames_id = new DbField('pres_trade_combination_names', 'pres_trade_combination_names', 'x_tradenames_id', 'tradenames_id', '`tradenames_id`', '`tradenames_id`', 3, 11, -1, FALSE, '`tradenames_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tradenames_id->Nullable = FALSE; // NOT NULL field
		$this->tradenames_id->Required = TRUE; // Required field
		$this->tradenames_id->Sortable = TRUE; // Allow sort
		$this->tradenames_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['tradenames_id'] = &$this->tradenames_id;

		// GENERIC_NAMES
		$this->GENERIC_NAMES = new DbField('pres_trade_combination_names', 'pres_trade_combination_names', 'x_GENERIC_NAMES', 'GENERIC_NAMES', '`GENERIC_NAMES`', '`GENERIC_NAMES`', 201, 500, -1, FALSE, '`GENERIC_NAMES`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->GENERIC_NAMES->Sortable = TRUE; // Allow sort
		$this->fields['GENERIC_NAMES'] = &$this->GENERIC_NAMES;

		// TRADE_NAME
		$this->TRADE_NAME = new DbField('pres_trade_combination_names', 'pres_trade_combination_names', 'x_TRADE_NAME', 'TRADE_NAME', '`TRADE_NAME`', '`TRADE_NAME`', 201, 500, -1, FALSE, '`TRADE_NAME`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->TRADE_NAME->Sortable = TRUE; // Allow sort
		$this->fields['TRADE_NAME'] = &$this->TRADE_NAME;

		// Drug_Name
		$this->Drug_Name = new DbField('pres_trade_combination_names', 'pres_trade_combination_names', 'x_Drug_Name', 'Drug_Name', '`Drug_Name`', '`Drug_Name`', 201, 500, -1, FALSE, '`Drug_Name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Drug_Name->Sortable = TRUE; // Allow sort
		$this->fields['Drug_Name'] = &$this->Drug_Name;

		// PR_CODE
		$this->PR_CODE = new DbField('pres_trade_combination_names', 'pres_trade_combination_names', 'x_PR_CODE', 'PR_CODE', '`PR_CODE`', '`PR_CODE`', 200, 50, -1, FALSE, '`PR_CODE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PR_CODE->Sortable = TRUE; // Allow sort
		$this->fields['PR_CODE'] = &$this->PR_CODE;

		// GenericNames_symbols
		$this->GenericNames_symbols = new DbField('pres_trade_combination_names', 'pres_trade_combination_names', 'x_GenericNames_symbols', 'GenericNames_symbols', '`GenericNames_symbols`', '`GenericNames_symbols`', 201, -1, -1, FALSE, '`GenericNames_symbols`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->GenericNames_symbols->Sortable = TRUE; // Allow sort
		$this->fields['GenericNames_symbols'] = &$this->GenericNames_symbols;

		// CONTAINER_TYPE
		$this->CONTAINER_TYPE = new DbField('pres_trade_combination_names', 'pres_trade_combination_names', 'x_CONTAINER_TYPE', 'CONTAINER_TYPE', '`CONTAINER_TYPE`', '`CONTAINER_TYPE`', 200, 50, -1, FALSE, '`CONTAINER_TYPE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CONTAINER_TYPE->Sortable = TRUE; // Allow sort
		$this->fields['CONTAINER_TYPE'] = &$this->CONTAINER_TYPE;

		// STRENGTH
		$this->STRENGTH = new DbField('pres_trade_combination_names', 'pres_trade_combination_names', 'x_STRENGTH', 'STRENGTH', '`STRENGTH`', '`STRENGTH`', 200, 50, -1, FALSE, '`STRENGTH`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->STRENGTH->Sortable = TRUE; // Allow sort
		$this->fields['STRENGTH'] = &$this->STRENGTH;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`pres_trade_combination_names`";
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
		return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : "";
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
		$this->tradenames_id->DbValue = $row['tradenames_id'];
		$this->GENERIC_NAMES->DbValue = $row['GENERIC_NAMES'];
		$this->TRADE_NAME->DbValue = $row['TRADE_NAME'];
		$this->Drug_Name->DbValue = $row['Drug_Name'];
		$this->PR_CODE->DbValue = $row['PR_CODE'];
		$this->GenericNames_symbols->DbValue = $row['GenericNames_symbols'];
		$this->CONTAINER_TYPE->DbValue = $row['CONTAINER_TYPE'];
		$this->STRENGTH->DbValue = $row['STRENGTH'];
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
			return "pres_trade_combination_nameslist.php";
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
		if ($pageName == "pres_trade_combination_namesview.php")
			return $Language->phrase("View");
		elseif ($pageName == "pres_trade_combination_namesedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "pres_trade_combination_namesadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "pres_trade_combination_nameslist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("pres_trade_combination_namesview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("pres_trade_combination_namesview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "pres_trade_combination_namesadd.php?" . $this->getUrlParm($parm);
		else
			$url = "pres_trade_combination_namesadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("pres_trade_combination_namesedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("pres_trade_combination_namesadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("pres_trade_combination_namesdelete.php", $this->getUrlParm());
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
		$this->tradenames_id->setDbValue($rs->fields('tradenames_id'));
		$this->GENERIC_NAMES->setDbValue($rs->fields('GENERIC_NAMES'));
		$this->TRADE_NAME->setDbValue($rs->fields('TRADE_NAME'));
		$this->Drug_Name->setDbValue($rs->fields('Drug_Name'));
		$this->PR_CODE->setDbValue($rs->fields('PR_CODE'));
		$this->GenericNames_symbols->setDbValue($rs->fields('GenericNames_symbols'));
		$this->CONTAINER_TYPE->setDbValue($rs->fields('CONTAINER_TYPE'));
		$this->STRENGTH->setDbValue($rs->fields('STRENGTH'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// tradenames_id
		// GENERIC_NAMES
		// TRADE_NAME
		// Drug_Name
		// PR_CODE
		// GenericNames_symbols
		// CONTAINER_TYPE
		// STRENGTH
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// tradenames_id
		$this->tradenames_id->ViewValue = $this->tradenames_id->CurrentValue;
		$this->tradenames_id->ViewValue = FormatNumber($this->tradenames_id->ViewValue, 0, -2, -2, -2);
		$this->tradenames_id->ViewCustomAttributes = "";

		// GENERIC_NAMES
		$this->GENERIC_NAMES->ViewValue = $this->GENERIC_NAMES->CurrentValue;
		$this->GENERIC_NAMES->ViewCustomAttributes = "";

		// TRADE_NAME
		$this->TRADE_NAME->ViewValue = $this->TRADE_NAME->CurrentValue;
		$this->TRADE_NAME->ViewCustomAttributes = "";

		// Drug_Name
		$this->Drug_Name->ViewValue = $this->Drug_Name->CurrentValue;
		$this->Drug_Name->ViewCustomAttributes = "";

		// PR_CODE
		$this->PR_CODE->ViewValue = $this->PR_CODE->CurrentValue;
		$this->PR_CODE->ViewCustomAttributes = "";

		// GenericNames_symbols
		$this->GenericNames_symbols->ViewValue = $this->GenericNames_symbols->CurrentValue;
		$this->GenericNames_symbols->ViewCustomAttributes = "";

		// CONTAINER_TYPE
		$this->CONTAINER_TYPE->ViewValue = $this->CONTAINER_TYPE->CurrentValue;
		$this->CONTAINER_TYPE->ViewCustomAttributes = "";

		// STRENGTH
		$this->STRENGTH->ViewValue = $this->STRENGTH->CurrentValue;
		$this->STRENGTH->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// tradenames_id
		$this->tradenames_id->LinkCustomAttributes = "";
		$this->tradenames_id->HrefValue = "";
		$this->tradenames_id->TooltipValue = "";

		// GENERIC_NAMES
		$this->GENERIC_NAMES->LinkCustomAttributes = "";
		$this->GENERIC_NAMES->HrefValue = "";
		$this->GENERIC_NAMES->TooltipValue = "";

		// TRADE_NAME
		$this->TRADE_NAME->LinkCustomAttributes = "";
		$this->TRADE_NAME->HrefValue = "";
		$this->TRADE_NAME->TooltipValue = "";

		// Drug_Name
		$this->Drug_Name->LinkCustomAttributes = "";
		$this->Drug_Name->HrefValue = "";
		$this->Drug_Name->TooltipValue = "";

		// PR_CODE
		$this->PR_CODE->LinkCustomAttributes = "";
		$this->PR_CODE->HrefValue = "";
		$this->PR_CODE->TooltipValue = "";

		// GenericNames_symbols
		$this->GenericNames_symbols->LinkCustomAttributes = "";
		$this->GenericNames_symbols->HrefValue = "";
		$this->GenericNames_symbols->TooltipValue = "";

		// CONTAINER_TYPE
		$this->CONTAINER_TYPE->LinkCustomAttributes = "";
		$this->CONTAINER_TYPE->HrefValue = "";
		$this->CONTAINER_TYPE->TooltipValue = "";

		// STRENGTH
		$this->STRENGTH->LinkCustomAttributes = "";
		$this->STRENGTH->HrefValue = "";
		$this->STRENGTH->TooltipValue = "";

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

		// tradenames_id
		$this->tradenames_id->EditAttrs["class"] = "form-control";
		$this->tradenames_id->EditCustomAttributes = "";
		$this->tradenames_id->EditValue = $this->tradenames_id->CurrentValue;
		$this->tradenames_id->PlaceHolder = RemoveHtml($this->tradenames_id->caption());

		// GENERIC_NAMES
		$this->GENERIC_NAMES->EditAttrs["class"] = "form-control";
		$this->GENERIC_NAMES->EditCustomAttributes = "";
		$this->GENERIC_NAMES->EditValue = $this->GENERIC_NAMES->CurrentValue;
		$this->GENERIC_NAMES->PlaceHolder = RemoveHtml($this->GENERIC_NAMES->caption());

		// TRADE_NAME
		$this->TRADE_NAME->EditAttrs["class"] = "form-control";
		$this->TRADE_NAME->EditCustomAttributes = "";
		$this->TRADE_NAME->EditValue = $this->TRADE_NAME->CurrentValue;
		$this->TRADE_NAME->PlaceHolder = RemoveHtml($this->TRADE_NAME->caption());

		// Drug_Name
		$this->Drug_Name->EditAttrs["class"] = "form-control";
		$this->Drug_Name->EditCustomAttributes = "";
		$this->Drug_Name->EditValue = $this->Drug_Name->CurrentValue;
		$this->Drug_Name->PlaceHolder = RemoveHtml($this->Drug_Name->caption());

		// PR_CODE
		$this->PR_CODE->EditAttrs["class"] = "form-control";
		$this->PR_CODE->EditCustomAttributes = "";
		if (!$this->PR_CODE->Raw)
			$this->PR_CODE->CurrentValue = HtmlDecode($this->PR_CODE->CurrentValue);
		$this->PR_CODE->EditValue = $this->PR_CODE->CurrentValue;
		$this->PR_CODE->PlaceHolder = RemoveHtml($this->PR_CODE->caption());

		// GenericNames_symbols
		$this->GenericNames_symbols->EditAttrs["class"] = "form-control";
		$this->GenericNames_symbols->EditCustomAttributes = "";
		$this->GenericNames_symbols->EditValue = $this->GenericNames_symbols->CurrentValue;
		$this->GenericNames_symbols->PlaceHolder = RemoveHtml($this->GenericNames_symbols->caption());

		// CONTAINER_TYPE
		$this->CONTAINER_TYPE->EditAttrs["class"] = "form-control";
		$this->CONTAINER_TYPE->EditCustomAttributes = "";
		if (!$this->CONTAINER_TYPE->Raw)
			$this->CONTAINER_TYPE->CurrentValue = HtmlDecode($this->CONTAINER_TYPE->CurrentValue);
		$this->CONTAINER_TYPE->EditValue = $this->CONTAINER_TYPE->CurrentValue;
		$this->CONTAINER_TYPE->PlaceHolder = RemoveHtml($this->CONTAINER_TYPE->caption());

		// STRENGTH
		$this->STRENGTH->EditAttrs["class"] = "form-control";
		$this->STRENGTH->EditCustomAttributes = "";
		if (!$this->STRENGTH->Raw)
			$this->STRENGTH->CurrentValue = HtmlDecode($this->STRENGTH->CurrentValue);
		$this->STRENGTH->EditValue = $this->STRENGTH->CurrentValue;
		$this->STRENGTH->PlaceHolder = RemoveHtml($this->STRENGTH->caption());

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
					$doc->exportCaption($this->tradenames_id);
					$doc->exportCaption($this->GENERIC_NAMES);
					$doc->exportCaption($this->TRADE_NAME);
					$doc->exportCaption($this->Drug_Name);
					$doc->exportCaption($this->PR_CODE);
					$doc->exportCaption($this->GenericNames_symbols);
					$doc->exportCaption($this->CONTAINER_TYPE);
					$doc->exportCaption($this->STRENGTH);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->tradenames_id);
					$doc->exportCaption($this->PR_CODE);
					$doc->exportCaption($this->CONTAINER_TYPE);
					$doc->exportCaption($this->STRENGTH);
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
						$doc->exportField($this->tradenames_id);
						$doc->exportField($this->GENERIC_NAMES);
						$doc->exportField($this->TRADE_NAME);
						$doc->exportField($this->Drug_Name);
						$doc->exportField($this->PR_CODE);
						$doc->exportField($this->GenericNames_symbols);
						$doc->exportField($this->CONTAINER_TYPE);
						$doc->exportField($this->STRENGTH);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->tradenames_id);
						$doc->exportField($this->PR_CODE);
						$doc->exportField($this->CONTAINER_TYPE);
						$doc->exportField($this->STRENGTH);
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