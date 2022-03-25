<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for view_treatment_culture
 */
class view_treatment_culture extends DbTable
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
	public $TidNo;
	public $Day0OocyteStage;
	public $Day1;
	public $Day2;
	public $Day3;
	public $Day4;
	public $Day5;
	public $Day6;
	public $ET;
	public $ETDate;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'view_treatment_culture';
		$this->TableName = 'view_treatment_culture';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`view_treatment_culture`";
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

		// TidNo
		$this->TidNo = new DbField('view_treatment_culture', 'view_treatment_culture', 'x_TidNo', 'TidNo', '`TidNo`', '`TidNo`', 3, 11, -1, FALSE, '`TidNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TidNo->Sortable = TRUE; // Allow sort
		$this->TidNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['TidNo'] = &$this->TidNo;

		// Day0OocyteStage
		$this->Day0OocyteStage = new DbField('view_treatment_culture', 'view_treatment_culture', 'x_Day0OocyteStage', 'Day0OocyteStage', '`Day0OocyteStage`', '`Day0OocyteStage`', 20, 21, -1, FALSE, '`Day0OocyteStage`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Day0OocyteStage->Nullable = FALSE; // NOT NULL field
		$this->Day0OocyteStage->Sortable = TRUE; // Allow sort
		$this->Day0OocyteStage->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Day0OocyteStage'] = &$this->Day0OocyteStage;

		// Day1
		$this->Day1 = new DbField('view_treatment_culture', 'view_treatment_culture', 'x_Day1', 'Day1', '`Day1`', '`Day1`', 20, 21, -1, FALSE, '`Day1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Day1->Nullable = FALSE; // NOT NULL field
		$this->Day1->Sortable = TRUE; // Allow sort
		$this->Day1->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Day1'] = &$this->Day1;

		// Day2
		$this->Day2 = new DbField('view_treatment_culture', 'view_treatment_culture', 'x_Day2', 'Day2', '`Day2`', '`Day2`', 20, 21, -1, FALSE, '`Day2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Day2->Nullable = FALSE; // NOT NULL field
		$this->Day2->Sortable = TRUE; // Allow sort
		$this->Day2->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Day2'] = &$this->Day2;

		// Day3
		$this->Day3 = new DbField('view_treatment_culture', 'view_treatment_culture', 'x_Day3', 'Day3', '`Day3`', '`Day3`', 20, 21, -1, FALSE, '`Day3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Day3->Nullable = FALSE; // NOT NULL field
		$this->Day3->Sortable = TRUE; // Allow sort
		$this->Day3->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Day3'] = &$this->Day3;

		// Day4
		$this->Day4 = new DbField('view_treatment_culture', 'view_treatment_culture', 'x_Day4', 'Day4', '`Day4`', '`Day4`', 20, 21, -1, FALSE, '`Day4`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Day4->Nullable = FALSE; // NOT NULL field
		$this->Day4->Sortable = TRUE; // Allow sort
		$this->Day4->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Day4'] = &$this->Day4;

		// Day5
		$this->Day5 = new DbField('view_treatment_culture', 'view_treatment_culture', 'x_Day5', 'Day5', '`Day5`', '`Day5`', 20, 21, -1, FALSE, '`Day5`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Day5->Nullable = FALSE; // NOT NULL field
		$this->Day5->Sortable = TRUE; // Allow sort
		$this->Day5->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Day5'] = &$this->Day5;

		// Day6
		$this->Day6 = new DbField('view_treatment_culture', 'view_treatment_culture', 'x_Day6', 'Day6', '`Day6`', '`Day6`', 20, 21, -1, FALSE, '`Day6`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Day6->Nullable = FALSE; // NOT NULL field
		$this->Day6->Sortable = TRUE; // Allow sort
		$this->Day6->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Day6'] = &$this->Day6;

		// ET
		$this->ET = new DbField('view_treatment_culture', 'view_treatment_culture', 'x_ET', 'ET', '`ET`', '`ET`', 20, 21, -1, FALSE, '`ET`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ET->Nullable = FALSE; // NOT NULL field
		$this->ET->Sortable = TRUE; // Allow sort
		$this->ET->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['ET'] = &$this->ET;

		// ETDate
		$this->ETDate = new DbField('view_treatment_culture', 'view_treatment_culture', 'x_ETDate', 'ETDate', '`ETDate`', '`ETDate`', 20, 21, -1, FALSE, '`ETDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ETDate->Nullable = FALSE; // NOT NULL field
		$this->ETDate->Sortable = TRUE; // Allow sort
		$this->ETDate->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['ETDate'] = &$this->ETDate;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_treatment_culture`";
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
		$this->TidNo->DbValue = $row['TidNo'];
		$this->Day0OocyteStage->DbValue = $row['Day0OocyteStage'];
		$this->Day1->DbValue = $row['Day1'];
		$this->Day2->DbValue = $row['Day2'];
		$this->Day3->DbValue = $row['Day3'];
		$this->Day4->DbValue = $row['Day4'];
		$this->Day5->DbValue = $row['Day5'];
		$this->Day6->DbValue = $row['Day6'];
		$this->ET->DbValue = $row['ET'];
		$this->ETDate->DbValue = $row['ETDate'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
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
			return "view_treatment_culturelist.php";
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
		if ($pageName == "view_treatment_cultureview.php")
			return $Language->phrase("View");
		elseif ($pageName == "view_treatment_cultureedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "view_treatment_cultureadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "view_treatment_culturelist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("view_treatment_cultureview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_treatment_cultureview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "view_treatment_cultureadd.php?" . $this->getUrlParm($parm);
		else
			$url = "view_treatment_cultureadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("view_treatment_cultureedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("view_treatment_cultureadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("view_treatment_culturedelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
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

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = [];
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
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
		$this->TidNo->setDbValue($rs->fields('TidNo'));
		$this->Day0OocyteStage->setDbValue($rs->fields('Day0OocyteStage'));
		$this->Day1->setDbValue($rs->fields('Day1'));
		$this->Day2->setDbValue($rs->fields('Day2'));
		$this->Day3->setDbValue($rs->fields('Day3'));
		$this->Day4->setDbValue($rs->fields('Day4'));
		$this->Day5->setDbValue($rs->fields('Day5'));
		$this->Day6->setDbValue($rs->fields('Day6'));
		$this->ET->setDbValue($rs->fields('ET'));
		$this->ETDate->setDbValue($rs->fields('ETDate'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// TidNo
		// Day0OocyteStage
		// Day1
		// Day2
		// Day3
		// Day4
		// Day5
		// Day6
		// ET
		// ETDate
		// TidNo

		$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
		$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
		$this->TidNo->ViewCustomAttributes = "";

		// Day0OocyteStage
		$this->Day0OocyteStage->ViewValue = $this->Day0OocyteStage->CurrentValue;
		$this->Day0OocyteStage->ViewValue = FormatNumber($this->Day0OocyteStage->ViewValue, 0, -2, -2, -2);
		$this->Day0OocyteStage->ViewCustomAttributes = "";

		// Day1
		$this->Day1->ViewValue = $this->Day1->CurrentValue;
		$this->Day1->ViewValue = FormatNumber($this->Day1->ViewValue, 0, -2, -2, -2);
		$this->Day1->ViewCustomAttributes = "";

		// Day2
		$this->Day2->ViewValue = $this->Day2->CurrentValue;
		$this->Day2->ViewValue = FormatNumber($this->Day2->ViewValue, 0, -2, -2, -2);
		$this->Day2->ViewCustomAttributes = "";

		// Day3
		$this->Day3->ViewValue = $this->Day3->CurrentValue;
		$this->Day3->ViewValue = FormatNumber($this->Day3->ViewValue, 0, -2, -2, -2);
		$this->Day3->ViewCustomAttributes = "";

		// Day4
		$this->Day4->ViewValue = $this->Day4->CurrentValue;
		$this->Day4->ViewValue = FormatNumber($this->Day4->ViewValue, 0, -2, -2, -2);
		$this->Day4->ViewCustomAttributes = "";

		// Day5
		$this->Day5->ViewValue = $this->Day5->CurrentValue;
		$this->Day5->ViewValue = FormatNumber($this->Day5->ViewValue, 0, -2, -2, -2);
		$this->Day5->ViewCustomAttributes = "";

		// Day6
		$this->Day6->ViewValue = $this->Day6->CurrentValue;
		$this->Day6->ViewValue = FormatNumber($this->Day6->ViewValue, 0, -2, -2, -2);
		$this->Day6->ViewCustomAttributes = "";

		// ET
		$this->ET->ViewValue = $this->ET->CurrentValue;
		$this->ET->ViewValue = FormatNumber($this->ET->ViewValue, 0, -2, -2, -2);
		$this->ET->ViewCustomAttributes = "";

		// ETDate
		$this->ETDate->ViewValue = $this->ETDate->CurrentValue;
		$this->ETDate->ViewValue = FormatNumber($this->ETDate->ViewValue, 0, -2, -2, -2);
		$this->ETDate->ViewCustomAttributes = "";

		// TidNo
		$this->TidNo->LinkCustomAttributes = "";
		$this->TidNo->HrefValue = "";
		$this->TidNo->TooltipValue = "";

		// Day0OocyteStage
		$this->Day0OocyteStage->LinkCustomAttributes = "";
		$this->Day0OocyteStage->HrefValue = "";
		$this->Day0OocyteStage->TooltipValue = "";

		// Day1
		$this->Day1->LinkCustomAttributes = "";
		$this->Day1->HrefValue = "";
		$this->Day1->TooltipValue = "";

		// Day2
		$this->Day2->LinkCustomAttributes = "";
		$this->Day2->HrefValue = "";
		$this->Day2->TooltipValue = "";

		// Day3
		$this->Day3->LinkCustomAttributes = "";
		$this->Day3->HrefValue = "";
		$this->Day3->TooltipValue = "";

		// Day4
		$this->Day4->LinkCustomAttributes = "";
		$this->Day4->HrefValue = "";
		$this->Day4->TooltipValue = "";

		// Day5
		$this->Day5->LinkCustomAttributes = "";
		$this->Day5->HrefValue = "";
		$this->Day5->TooltipValue = "";

		// Day6
		$this->Day6->LinkCustomAttributes = "";
		$this->Day6->HrefValue = "";
		$this->Day6->TooltipValue = "";

		// ET
		$this->ET->LinkCustomAttributes = "";
		$this->ET->HrefValue = "";
		$this->ET->TooltipValue = "";

		// ETDate
		$this->ETDate->LinkCustomAttributes = "";
		$this->ETDate->HrefValue = "";
		$this->ETDate->TooltipValue = "";

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

		// TidNo
		$this->TidNo->EditAttrs["class"] = "form-control";
		$this->TidNo->EditCustomAttributes = "";
		$this->TidNo->EditValue = $this->TidNo->CurrentValue;
		$this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

		// Day0OocyteStage
		$this->Day0OocyteStage->EditAttrs["class"] = "form-control";
		$this->Day0OocyteStage->EditCustomAttributes = "";
		$this->Day0OocyteStage->EditValue = $this->Day0OocyteStage->CurrentValue;
		$this->Day0OocyteStage->PlaceHolder = RemoveHtml($this->Day0OocyteStage->caption());

		// Day1
		$this->Day1->EditAttrs["class"] = "form-control";
		$this->Day1->EditCustomAttributes = "";
		$this->Day1->EditValue = $this->Day1->CurrentValue;
		$this->Day1->PlaceHolder = RemoveHtml($this->Day1->caption());

		// Day2
		$this->Day2->EditAttrs["class"] = "form-control";
		$this->Day2->EditCustomAttributes = "";
		$this->Day2->EditValue = $this->Day2->CurrentValue;
		$this->Day2->PlaceHolder = RemoveHtml($this->Day2->caption());

		// Day3
		$this->Day3->EditAttrs["class"] = "form-control";
		$this->Day3->EditCustomAttributes = "";
		$this->Day3->EditValue = $this->Day3->CurrentValue;
		$this->Day3->PlaceHolder = RemoveHtml($this->Day3->caption());

		// Day4
		$this->Day4->EditAttrs["class"] = "form-control";
		$this->Day4->EditCustomAttributes = "";
		$this->Day4->EditValue = $this->Day4->CurrentValue;
		$this->Day4->PlaceHolder = RemoveHtml($this->Day4->caption());

		// Day5
		$this->Day5->EditAttrs["class"] = "form-control";
		$this->Day5->EditCustomAttributes = "";
		$this->Day5->EditValue = $this->Day5->CurrentValue;
		$this->Day5->PlaceHolder = RemoveHtml($this->Day5->caption());

		// Day6
		$this->Day6->EditAttrs["class"] = "form-control";
		$this->Day6->EditCustomAttributes = "";
		$this->Day6->EditValue = $this->Day6->CurrentValue;
		$this->Day6->PlaceHolder = RemoveHtml($this->Day6->caption());

		// ET
		$this->ET->EditAttrs["class"] = "form-control";
		$this->ET->EditCustomAttributes = "";
		$this->ET->EditValue = $this->ET->CurrentValue;
		$this->ET->PlaceHolder = RemoveHtml($this->ET->caption());

		// ETDate
		$this->ETDate->EditAttrs["class"] = "form-control";
		$this->ETDate->EditCustomAttributes = "";
		$this->ETDate->EditValue = $this->ETDate->CurrentValue;
		$this->ETDate->PlaceHolder = RemoveHtml($this->ETDate->caption());

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
					$doc->exportCaption($this->TidNo);
					$doc->exportCaption($this->Day0OocyteStage);
					$doc->exportCaption($this->Day1);
					$doc->exportCaption($this->Day2);
					$doc->exportCaption($this->Day3);
					$doc->exportCaption($this->Day4);
					$doc->exportCaption($this->Day5);
					$doc->exportCaption($this->Day6);
					$doc->exportCaption($this->ET);
					$doc->exportCaption($this->ETDate);
				} else {
					$doc->exportCaption($this->TidNo);
					$doc->exportCaption($this->Day0OocyteStage);
					$doc->exportCaption($this->Day1);
					$doc->exportCaption($this->Day2);
					$doc->exportCaption($this->Day3);
					$doc->exportCaption($this->Day4);
					$doc->exportCaption($this->Day5);
					$doc->exportCaption($this->Day6);
					$doc->exportCaption($this->ET);
					$doc->exportCaption($this->ETDate);
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
						$doc->exportField($this->TidNo);
						$doc->exportField($this->Day0OocyteStage);
						$doc->exportField($this->Day1);
						$doc->exportField($this->Day2);
						$doc->exportField($this->Day3);
						$doc->exportField($this->Day4);
						$doc->exportField($this->Day5);
						$doc->exportField($this->Day6);
						$doc->exportField($this->ET);
						$doc->exportField($this->ETDate);
					} else {
						$doc->exportField($this->TidNo);
						$doc->exportField($this->Day0OocyteStage);
						$doc->exportField($this->Day1);
						$doc->exportField($this->Day2);
						$doc->exportField($this->Day3);
						$doc->exportField($this->Day4);
						$doc->exportField($this->Day5);
						$doc->exportField($this->Day6);
						$doc->exportField($this->ET);
						$doc->exportField($this->ETDate);
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