<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for pres_fluidformulation
 */
class pres_fluidformulation extends DbTable
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
	public $Tradename;
	public $Itemcode;
	public $Genericname;
	public $Volume;
	public $VolumeUnit;
	public $Strength;
	public $StrengthUnit;
	public $_Route;
	public $Forms;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'pres_fluidformulation';
		$this->TableName = 'pres_fluidformulation';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`pres_fluidformulation`";
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
		$this->id = new DbField('pres_fluidformulation', 'pres_fluidformulation', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// Tradename
		$this->Tradename = new DbField('pres_fluidformulation', 'pres_fluidformulation', 'x_Tradename', 'Tradename', '`Tradename`', '`Tradename`', 201, -1, -1, FALSE, '`Tradename`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Tradename->Sortable = TRUE; // Allow sort
		$this->fields['Tradename'] = &$this->Tradename;

		// Itemcode
		$this->Itemcode = new DbField('pres_fluidformulation', 'pres_fluidformulation', 'x_Itemcode', 'Itemcode', '`Itemcode`', '`Itemcode`', 200, 10, -1, FALSE, '`Itemcode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Itemcode->Sortable = TRUE; // Allow sort
		$this->fields['Itemcode'] = &$this->Itemcode;

		// Genericname
		$this->Genericname = new DbField('pres_fluidformulation', 'pres_fluidformulation', 'x_Genericname', 'Genericname', '`Genericname`', '`Genericname`', 200, 100, -1, FALSE, '`Genericname`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Genericname->Sortable = TRUE; // Allow sort
		$this->fields['Genericname'] = &$this->Genericname;

		// Volume
		$this->Volume = new DbField('pres_fluidformulation', 'pres_fluidformulation', 'x_Volume', 'Volume', '`Volume`', '`Volume`', 5, 22, -1, FALSE, '`Volume`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Volume->Sortable = TRUE; // Allow sort
		$this->Volume->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Volume'] = &$this->Volume;

		// VolumeUnit
		$this->VolumeUnit = new DbField('pres_fluidformulation', 'pres_fluidformulation', 'x_VolumeUnit', 'VolumeUnit', '`VolumeUnit`', '`VolumeUnit`', 200, 15, -1, FALSE, '`VolumeUnit`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->VolumeUnit->Sortable = TRUE; // Allow sort
		$this->fields['VolumeUnit'] = &$this->VolumeUnit;

		// Strength
		$this->Strength = new DbField('pres_fluidformulation', 'pres_fluidformulation', 'x_Strength', 'Strength', '`Strength`', '`Strength`', 5, 22, -1, FALSE, '`Strength`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Strength->Sortable = TRUE; // Allow sort
		$this->Strength->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Strength'] = &$this->Strength;

		// StrengthUnit
		$this->StrengthUnit = new DbField('pres_fluidformulation', 'pres_fluidformulation', 'x_StrengthUnit', 'StrengthUnit', '`StrengthUnit`', '`StrengthUnit`', 200, 15, -1, FALSE, '`StrengthUnit`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->StrengthUnit->Sortable = TRUE; // Allow sort
		$this->fields['StrengthUnit'] = &$this->StrengthUnit;

		// Route
		$this->_Route = new DbField('pres_fluidformulation', 'pres_fluidformulation', 'x__Route', 'Route', '`Route`', '`Route`', 200, 10, -1, FALSE, '`Route`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_Route->Sortable = TRUE; // Allow sort
		$this->fields['Route'] = &$this->_Route;

		// Forms
		$this->Forms = new DbField('pres_fluidformulation', 'pres_fluidformulation', 'x_Forms', 'Forms', '`Forms`', '`Forms`', 200, 10, -1, FALSE, '`Forms`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Forms->Sortable = TRUE; // Allow sort
		$this->fields['Forms'] = &$this->Forms;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`pres_fluidformulation`";
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
		$this->Tradename->DbValue = $row['Tradename'];
		$this->Itemcode->DbValue = $row['Itemcode'];
		$this->Genericname->DbValue = $row['Genericname'];
		$this->Volume->DbValue = $row['Volume'];
		$this->VolumeUnit->DbValue = $row['VolumeUnit'];
		$this->Strength->DbValue = $row['Strength'];
		$this->StrengthUnit->DbValue = $row['StrengthUnit'];
		$this->_Route->DbValue = $row['Route'];
		$this->Forms->DbValue = $row['Forms'];
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
			return "pres_fluidformulationlist.php";
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
		if ($pageName == "pres_fluidformulationview.php")
			return $Language->phrase("View");
		elseif ($pageName == "pres_fluidformulationedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "pres_fluidformulationadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "pres_fluidformulationlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("pres_fluidformulationview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("pres_fluidformulationview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "pres_fluidformulationadd.php?" . $this->getUrlParm($parm);
		else
			$url = "pres_fluidformulationadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("pres_fluidformulationedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("pres_fluidformulationadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("pres_fluidformulationdelete.php", $this->getUrlParm());
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
		$this->Tradename->setDbValue($rs->fields('Tradename'));
		$this->Itemcode->setDbValue($rs->fields('Itemcode'));
		$this->Genericname->setDbValue($rs->fields('Genericname'));
		$this->Volume->setDbValue($rs->fields('Volume'));
		$this->VolumeUnit->setDbValue($rs->fields('VolumeUnit'));
		$this->Strength->setDbValue($rs->fields('Strength'));
		$this->StrengthUnit->setDbValue($rs->fields('StrengthUnit'));
		$this->_Route->setDbValue($rs->fields('Route'));
		$this->Forms->setDbValue($rs->fields('Forms'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// Tradename
		// Itemcode
		// Genericname
		// Volume
		// VolumeUnit
		// Strength
		// StrengthUnit
		// Route
		// Forms
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// Tradename
		$this->Tradename->ViewValue = $this->Tradename->CurrentValue;
		$this->Tradename->ViewCustomAttributes = "";

		// Itemcode
		$this->Itemcode->ViewValue = $this->Itemcode->CurrentValue;
		$this->Itemcode->ViewCustomAttributes = "";

		// Genericname
		$this->Genericname->ViewValue = $this->Genericname->CurrentValue;
		$this->Genericname->ViewCustomAttributes = "";

		// Volume
		$this->Volume->ViewValue = $this->Volume->CurrentValue;
		$this->Volume->ViewValue = FormatNumber($this->Volume->ViewValue, 2, -2, -2, -2);
		$this->Volume->ViewCustomAttributes = "";

		// VolumeUnit
		$this->VolumeUnit->ViewValue = $this->VolumeUnit->CurrentValue;
		$this->VolumeUnit->ViewCustomAttributes = "";

		// Strength
		$this->Strength->ViewValue = $this->Strength->CurrentValue;
		$this->Strength->ViewValue = FormatNumber($this->Strength->ViewValue, 2, -2, -2, -2);
		$this->Strength->ViewCustomAttributes = "";

		// StrengthUnit
		$this->StrengthUnit->ViewValue = $this->StrengthUnit->CurrentValue;
		$this->StrengthUnit->ViewCustomAttributes = "";

		// Route
		$this->_Route->ViewValue = $this->_Route->CurrentValue;
		$this->_Route->ViewCustomAttributes = "";

		// Forms
		$this->Forms->ViewValue = $this->Forms->CurrentValue;
		$this->Forms->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// Tradename
		$this->Tradename->LinkCustomAttributes = "";
		$this->Tradename->HrefValue = "";
		$this->Tradename->TooltipValue = "";

		// Itemcode
		$this->Itemcode->LinkCustomAttributes = "";
		$this->Itemcode->HrefValue = "";
		$this->Itemcode->TooltipValue = "";

		// Genericname
		$this->Genericname->LinkCustomAttributes = "";
		$this->Genericname->HrefValue = "";
		$this->Genericname->TooltipValue = "";

		// Volume
		$this->Volume->LinkCustomAttributes = "";
		$this->Volume->HrefValue = "";
		$this->Volume->TooltipValue = "";

		// VolumeUnit
		$this->VolumeUnit->LinkCustomAttributes = "";
		$this->VolumeUnit->HrefValue = "";
		$this->VolumeUnit->TooltipValue = "";

		// Strength
		$this->Strength->LinkCustomAttributes = "";
		$this->Strength->HrefValue = "";
		$this->Strength->TooltipValue = "";

		// StrengthUnit
		$this->StrengthUnit->LinkCustomAttributes = "";
		$this->StrengthUnit->HrefValue = "";
		$this->StrengthUnit->TooltipValue = "";

		// Route
		$this->_Route->LinkCustomAttributes = "";
		$this->_Route->HrefValue = "";
		$this->_Route->TooltipValue = "";

		// Forms
		$this->Forms->LinkCustomAttributes = "";
		$this->Forms->HrefValue = "";
		$this->Forms->TooltipValue = "";

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

		// Tradename
		$this->Tradename->EditAttrs["class"] = "form-control";
		$this->Tradename->EditCustomAttributes = "";
		if (!$this->Tradename->Raw)
			$this->Tradename->CurrentValue = HtmlDecode($this->Tradename->CurrentValue);
		$this->Tradename->EditValue = $this->Tradename->CurrentValue;
		$this->Tradename->PlaceHolder = RemoveHtml($this->Tradename->caption());

		// Itemcode
		$this->Itemcode->EditAttrs["class"] = "form-control";
		$this->Itemcode->EditCustomAttributes = "";
		if (!$this->Itemcode->Raw)
			$this->Itemcode->CurrentValue = HtmlDecode($this->Itemcode->CurrentValue);
		$this->Itemcode->EditValue = $this->Itemcode->CurrentValue;
		$this->Itemcode->PlaceHolder = RemoveHtml($this->Itemcode->caption());

		// Genericname
		$this->Genericname->EditAttrs["class"] = "form-control";
		$this->Genericname->EditCustomAttributes = "";
		if (!$this->Genericname->Raw)
			$this->Genericname->CurrentValue = HtmlDecode($this->Genericname->CurrentValue);
		$this->Genericname->EditValue = $this->Genericname->CurrentValue;
		$this->Genericname->PlaceHolder = RemoveHtml($this->Genericname->caption());

		// Volume
		$this->Volume->EditAttrs["class"] = "form-control";
		$this->Volume->EditCustomAttributes = "";
		$this->Volume->EditValue = $this->Volume->CurrentValue;
		$this->Volume->PlaceHolder = RemoveHtml($this->Volume->caption());
		if (strval($this->Volume->EditValue) != "" && is_numeric($this->Volume->EditValue))
			$this->Volume->EditValue = FormatNumber($this->Volume->EditValue, -2, -2, -2, -2);
		

		// VolumeUnit
		$this->VolumeUnit->EditAttrs["class"] = "form-control";
		$this->VolumeUnit->EditCustomAttributes = "";
		if (!$this->VolumeUnit->Raw)
			$this->VolumeUnit->CurrentValue = HtmlDecode($this->VolumeUnit->CurrentValue);
		$this->VolumeUnit->EditValue = $this->VolumeUnit->CurrentValue;
		$this->VolumeUnit->PlaceHolder = RemoveHtml($this->VolumeUnit->caption());

		// Strength
		$this->Strength->EditAttrs["class"] = "form-control";
		$this->Strength->EditCustomAttributes = "";
		$this->Strength->EditValue = $this->Strength->CurrentValue;
		$this->Strength->PlaceHolder = RemoveHtml($this->Strength->caption());
		if (strval($this->Strength->EditValue) != "" && is_numeric($this->Strength->EditValue))
			$this->Strength->EditValue = FormatNumber($this->Strength->EditValue, -2, -2, -2, -2);
		

		// StrengthUnit
		$this->StrengthUnit->EditAttrs["class"] = "form-control";
		$this->StrengthUnit->EditCustomAttributes = "";
		if (!$this->StrengthUnit->Raw)
			$this->StrengthUnit->CurrentValue = HtmlDecode($this->StrengthUnit->CurrentValue);
		$this->StrengthUnit->EditValue = $this->StrengthUnit->CurrentValue;
		$this->StrengthUnit->PlaceHolder = RemoveHtml($this->StrengthUnit->caption());

		// Route
		$this->_Route->EditAttrs["class"] = "form-control";
		$this->_Route->EditCustomAttributes = "";
		if (!$this->_Route->Raw)
			$this->_Route->CurrentValue = HtmlDecode($this->_Route->CurrentValue);
		$this->_Route->EditValue = $this->_Route->CurrentValue;
		$this->_Route->PlaceHolder = RemoveHtml($this->_Route->caption());

		// Forms
		$this->Forms->EditAttrs["class"] = "form-control";
		$this->Forms->EditCustomAttributes = "";
		if (!$this->Forms->Raw)
			$this->Forms->CurrentValue = HtmlDecode($this->Forms->CurrentValue);
		$this->Forms->EditValue = $this->Forms->CurrentValue;
		$this->Forms->PlaceHolder = RemoveHtml($this->Forms->caption());

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
					$doc->exportCaption($this->Tradename);
					$doc->exportCaption($this->Itemcode);
					$doc->exportCaption($this->Genericname);
					$doc->exportCaption($this->Volume);
					$doc->exportCaption($this->VolumeUnit);
					$doc->exportCaption($this->Strength);
					$doc->exportCaption($this->StrengthUnit);
					$doc->exportCaption($this->_Route);
					$doc->exportCaption($this->Forms);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->Tradename);
					$doc->exportCaption($this->Itemcode);
					$doc->exportCaption($this->Genericname);
					$doc->exportCaption($this->Volume);
					$doc->exportCaption($this->VolumeUnit);
					$doc->exportCaption($this->Strength);
					$doc->exportCaption($this->StrengthUnit);
					$doc->exportCaption($this->_Route);
					$doc->exportCaption($this->Forms);
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
						$doc->exportField($this->Tradename);
						$doc->exportField($this->Itemcode);
						$doc->exportField($this->Genericname);
						$doc->exportField($this->Volume);
						$doc->exportField($this->VolumeUnit);
						$doc->exportField($this->Strength);
						$doc->exportField($this->StrengthUnit);
						$doc->exportField($this->_Route);
						$doc->exportField($this->Forms);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->Tradename);
						$doc->exportField($this->Itemcode);
						$doc->exportField($this->Genericname);
						$doc->exportField($this->Volume);
						$doc->exportField($this->VolumeUnit);
						$doc->exportField($this->Strength);
						$doc->exportField($this->StrengthUnit);
						$doc->exportField($this->_Route);
						$doc->exportField($this->Forms);
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