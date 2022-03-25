<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for lab_dept_mast
 */
class lab_dept_mast extends DbTable
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
	public $MainCD;
	public $Code;
	public $Name;
	public $Order;
	public $SignCD;
	public $Collection;
	public $EditDate;
	public $SMS;
	public $Note;
	public $WorkList;
	public $_Page;
	public $Incharge;
	public $AutoNum;
	public $id;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'lab_dept_mast';
		$this->TableName = 'lab_dept_mast';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`lab_dept_mast`";
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

		// MainCD
		$this->MainCD = new DbField('lab_dept_mast', 'lab_dept_mast', 'x_MainCD', 'MainCD', '`MainCD`', '`MainCD`', 200, 3, -1, FALSE, '`MainCD`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MainCD->Nullable = FALSE; // NOT NULL field
		$this->MainCD->Required = TRUE; // Required field
		$this->MainCD->Sortable = TRUE; // Allow sort
		$this->fields['MainCD'] = &$this->MainCD;

		// Code
		$this->Code = new DbField('lab_dept_mast', 'lab_dept_mast', 'x_Code', 'Code', '`Code`', '`Code`', 200, 2, -1, FALSE, '`Code`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Code->Nullable = FALSE; // NOT NULL field
		$this->Code->Required = TRUE; // Required field
		$this->Code->Sortable = TRUE; // Allow sort
		$this->fields['Code'] = &$this->Code;

		// Name
		$this->Name = new DbField('lab_dept_mast', 'lab_dept_mast', 'x_Name', 'Name', '`Name`', '`Name`', 200, 50, -1, FALSE, '`Name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Name->Nullable = FALSE; // NOT NULL field
		$this->Name->Required = TRUE; // Required field
		$this->Name->Sortable = TRUE; // Allow sort
		$this->fields['Name'] = &$this->Name;

		// Order
		$this->Order = new DbField('lab_dept_mast', 'lab_dept_mast', 'x_Order', 'Order', '`Order`', '`Order`', 131, 3, -1, FALSE, '`Order`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Order->Nullable = FALSE; // NOT NULL field
		$this->Order->Required = TRUE; // Required field
		$this->Order->Sortable = TRUE; // Allow sort
		$this->Order->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Order'] = &$this->Order;

		// SignCD
		$this->SignCD = new DbField('lab_dept_mast', 'lab_dept_mast', 'x_SignCD', 'SignCD', '`SignCD`', '`SignCD`', 200, 4, -1, FALSE, '`SignCD`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SignCD->Nullable = FALSE; // NOT NULL field
		$this->SignCD->Required = TRUE; // Required field
		$this->SignCD->Sortable = TRUE; // Allow sort
		$this->fields['SignCD'] = &$this->SignCD;

		// Collection
		$this->Collection = new DbField('lab_dept_mast', 'lab_dept_mast', 'x_Collection', 'Collection', '`Collection`', '`Collection`', 200, 1, -1, FALSE, '`Collection`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Collection->Nullable = FALSE; // NOT NULL field
		$this->Collection->Required = TRUE; // Required field
		$this->Collection->Sortable = TRUE; // Allow sort
		$this->fields['Collection'] = &$this->Collection;

		// EditDate
		$this->EditDate = new DbField('lab_dept_mast', 'lab_dept_mast', 'x_EditDate', 'EditDate', '`EditDate`', CastDateFieldForLike("`EditDate`", 0, "DB"), 135, 23, 0, FALSE, '`EditDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->EditDate->Sortable = TRUE; // Allow sort
		$this->EditDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['EditDate'] = &$this->EditDate;

		// SMS
		$this->SMS = new DbField('lab_dept_mast', 'lab_dept_mast', 'x_SMS', 'SMS', '`SMS`', '`SMS`', 200, 1, -1, FALSE, '`SMS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SMS->Nullable = FALSE; // NOT NULL field
		$this->SMS->Required = TRUE; // Required field
		$this->SMS->Sortable = TRUE; // Allow sort
		$this->fields['SMS'] = &$this->SMS;

		// Note
		$this->Note = new DbField('lab_dept_mast', 'lab_dept_mast', 'x_Note', 'Note', '`Note`', '`Note`', 201, 1000, -1, FALSE, '`Note`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Note->Nullable = FALSE; // NOT NULL field
		$this->Note->Required = TRUE; // Required field
		$this->Note->Sortable = TRUE; // Allow sort
		$this->fields['Note'] = &$this->Note;

		// WorkList
		$this->WorkList = new DbField('lab_dept_mast', 'lab_dept_mast', 'x_WorkList', 'WorkList', '`WorkList`', '`WorkList`', 200, 1, -1, FALSE, '`WorkList`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->WorkList->Nullable = FALSE; // NOT NULL field
		$this->WorkList->Required = TRUE; // Required field
		$this->WorkList->Sortable = TRUE; // Allow sort
		$this->fields['WorkList'] = &$this->WorkList;

		// Page
		$this->_Page = new DbField('lab_dept_mast', 'lab_dept_mast', 'x__Page', 'Page', '`Page`', '`Page`', 131, 3, -1, FALSE, '`Page`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_Page->Nullable = FALSE; // NOT NULL field
		$this->_Page->Required = TRUE; // Required field
		$this->_Page->Sortable = TRUE; // Allow sort
		$this->_Page->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Page'] = &$this->_Page;

		// Incharge
		$this->Incharge = new DbField('lab_dept_mast', 'lab_dept_mast', 'x_Incharge', 'Incharge', '`Incharge`', '`Incharge`', 200, 20, -1, FALSE, '`Incharge`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Incharge->Nullable = FALSE; // NOT NULL field
		$this->Incharge->Required = TRUE; // Required field
		$this->Incharge->Sortable = TRUE; // Allow sort
		$this->fields['Incharge'] = &$this->Incharge;

		// AutoNum
		$this->AutoNum = new DbField('lab_dept_mast', 'lab_dept_mast', 'x_AutoNum', 'AutoNum', '`AutoNum`', '`AutoNum`', 200, 1, -1, FALSE, '`AutoNum`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AutoNum->Nullable = FALSE; // NOT NULL field
		$this->AutoNum->Required = TRUE; // Required field
		$this->AutoNum->Sortable = TRUE; // Allow sort
		$this->fields['AutoNum'] = &$this->AutoNum;

		// id
		$this->id = new DbField('lab_dept_mast', 'lab_dept_mast', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`lab_dept_mast`";
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
		$this->MainCD->DbValue = $row['MainCD'];
		$this->Code->DbValue = $row['Code'];
		$this->Name->DbValue = $row['Name'];
		$this->Order->DbValue = $row['Order'];
		$this->SignCD->DbValue = $row['SignCD'];
		$this->Collection->DbValue = $row['Collection'];
		$this->EditDate->DbValue = $row['EditDate'];
		$this->SMS->DbValue = $row['SMS'];
		$this->Note->DbValue = $row['Note'];
		$this->WorkList->DbValue = $row['WorkList'];
		$this->_Page->DbValue = $row['Page'];
		$this->Incharge->DbValue = $row['Incharge'];
		$this->AutoNum->DbValue = $row['AutoNum'];
		$this->id->DbValue = $row['id'];
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
			return "lab_dept_mastlist.php";
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
		if ($pageName == "lab_dept_mastview.php")
			return $Language->phrase("View");
		elseif ($pageName == "lab_dept_mastedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "lab_dept_mastadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "lab_dept_mastlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("lab_dept_mastview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("lab_dept_mastview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "lab_dept_mastadd.php?" . $this->getUrlParm($parm);
		else
			$url = "lab_dept_mastadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("lab_dept_mastedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("lab_dept_mastadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("lab_dept_mastdelete.php", $this->getUrlParm());
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
		$this->MainCD->setDbValue($rs->fields('MainCD'));
		$this->Code->setDbValue($rs->fields('Code'));
		$this->Name->setDbValue($rs->fields('Name'));
		$this->Order->setDbValue($rs->fields('Order'));
		$this->SignCD->setDbValue($rs->fields('SignCD'));
		$this->Collection->setDbValue($rs->fields('Collection'));
		$this->EditDate->setDbValue($rs->fields('EditDate'));
		$this->SMS->setDbValue($rs->fields('SMS'));
		$this->Note->setDbValue($rs->fields('Note'));
		$this->WorkList->setDbValue($rs->fields('WorkList'));
		$this->_Page->setDbValue($rs->fields('Page'));
		$this->Incharge->setDbValue($rs->fields('Incharge'));
		$this->AutoNum->setDbValue($rs->fields('AutoNum'));
		$this->id->setDbValue($rs->fields('id'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// MainCD
		// Code
		// Name
		// Order
		// SignCD
		// Collection
		// EditDate
		// SMS
		// Note
		// WorkList
		// Page
		// Incharge
		// AutoNum
		// id
		// MainCD

		$this->MainCD->ViewValue = $this->MainCD->CurrentValue;
		$this->MainCD->ViewCustomAttributes = "";

		// Code
		$this->Code->ViewValue = $this->Code->CurrentValue;
		$this->Code->ViewCustomAttributes = "";

		// Name
		$this->Name->ViewValue = $this->Name->CurrentValue;
		$this->Name->ViewCustomAttributes = "";

		// Order
		$this->Order->ViewValue = $this->Order->CurrentValue;
		$this->Order->ViewValue = FormatNumber($this->Order->ViewValue, 2, -2, -2, -2);
		$this->Order->ViewCustomAttributes = "";

		// SignCD
		$this->SignCD->ViewValue = $this->SignCD->CurrentValue;
		$this->SignCD->ViewCustomAttributes = "";

		// Collection
		$this->Collection->ViewValue = $this->Collection->CurrentValue;
		$this->Collection->ViewCustomAttributes = "";

		// EditDate
		$this->EditDate->ViewValue = $this->EditDate->CurrentValue;
		$this->EditDate->ViewValue = FormatDateTime($this->EditDate->ViewValue, 0);
		$this->EditDate->ViewCustomAttributes = "";

		// SMS
		$this->SMS->ViewValue = $this->SMS->CurrentValue;
		$this->SMS->ViewCustomAttributes = "";

		// Note
		$this->Note->ViewValue = $this->Note->CurrentValue;
		$this->Note->ViewCustomAttributes = "";

		// WorkList
		$this->WorkList->ViewValue = $this->WorkList->CurrentValue;
		$this->WorkList->ViewCustomAttributes = "";

		// Page
		$this->_Page->ViewValue = $this->_Page->CurrentValue;
		$this->_Page->ViewValue = FormatNumber($this->_Page->ViewValue, 2, -2, -2, -2);
		$this->_Page->ViewCustomAttributes = "";

		// Incharge
		$this->Incharge->ViewValue = $this->Incharge->CurrentValue;
		$this->Incharge->ViewCustomAttributes = "";

		// AutoNum
		$this->AutoNum->ViewValue = $this->AutoNum->CurrentValue;
		$this->AutoNum->ViewCustomAttributes = "";

		// id
		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// MainCD
		$this->MainCD->LinkCustomAttributes = "";
		$this->MainCD->HrefValue = "";
		$this->MainCD->TooltipValue = "";

		// Code
		$this->Code->LinkCustomAttributes = "";
		$this->Code->HrefValue = "";
		$this->Code->TooltipValue = "";

		// Name
		$this->Name->LinkCustomAttributes = "";
		$this->Name->HrefValue = "";
		$this->Name->TooltipValue = "";

		// Order
		$this->Order->LinkCustomAttributes = "";
		$this->Order->HrefValue = "";
		$this->Order->TooltipValue = "";

		// SignCD
		$this->SignCD->LinkCustomAttributes = "";
		$this->SignCD->HrefValue = "";
		$this->SignCD->TooltipValue = "";

		// Collection
		$this->Collection->LinkCustomAttributes = "";
		$this->Collection->HrefValue = "";
		$this->Collection->TooltipValue = "";

		// EditDate
		$this->EditDate->LinkCustomAttributes = "";
		$this->EditDate->HrefValue = "";
		$this->EditDate->TooltipValue = "";

		// SMS
		$this->SMS->LinkCustomAttributes = "";
		$this->SMS->HrefValue = "";
		$this->SMS->TooltipValue = "";

		// Note
		$this->Note->LinkCustomAttributes = "";
		$this->Note->HrefValue = "";
		$this->Note->TooltipValue = "";

		// WorkList
		$this->WorkList->LinkCustomAttributes = "";
		$this->WorkList->HrefValue = "";
		$this->WorkList->TooltipValue = "";

		// Page
		$this->_Page->LinkCustomAttributes = "";
		$this->_Page->HrefValue = "";
		$this->_Page->TooltipValue = "";

		// Incharge
		$this->Incharge->LinkCustomAttributes = "";
		$this->Incharge->HrefValue = "";
		$this->Incharge->TooltipValue = "";

		// AutoNum
		$this->AutoNum->LinkCustomAttributes = "";
		$this->AutoNum->HrefValue = "";
		$this->AutoNum->TooltipValue = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

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

		// MainCD
		$this->MainCD->EditAttrs["class"] = "form-control";
		$this->MainCD->EditCustomAttributes = "";
		if (!$this->MainCD->Raw)
			$this->MainCD->CurrentValue = HtmlDecode($this->MainCD->CurrentValue);
		$this->MainCD->EditValue = $this->MainCD->CurrentValue;
		$this->MainCD->PlaceHolder = RemoveHtml($this->MainCD->caption());

		// Code
		$this->Code->EditAttrs["class"] = "form-control";
		$this->Code->EditCustomAttributes = "";
		if (!$this->Code->Raw)
			$this->Code->CurrentValue = HtmlDecode($this->Code->CurrentValue);
		$this->Code->EditValue = $this->Code->CurrentValue;
		$this->Code->PlaceHolder = RemoveHtml($this->Code->caption());

		// Name
		$this->Name->EditAttrs["class"] = "form-control";
		$this->Name->EditCustomAttributes = "";
		if (!$this->Name->Raw)
			$this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
		$this->Name->EditValue = $this->Name->CurrentValue;
		$this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

		// Order
		$this->Order->EditAttrs["class"] = "form-control";
		$this->Order->EditCustomAttributes = "";
		$this->Order->EditValue = $this->Order->CurrentValue;
		$this->Order->PlaceHolder = RemoveHtml($this->Order->caption());
		if (strval($this->Order->EditValue) != "" && is_numeric($this->Order->EditValue))
			$this->Order->EditValue = FormatNumber($this->Order->EditValue, -2, -2, -2, -2);
		

		// SignCD
		$this->SignCD->EditAttrs["class"] = "form-control";
		$this->SignCD->EditCustomAttributes = "";
		if (!$this->SignCD->Raw)
			$this->SignCD->CurrentValue = HtmlDecode($this->SignCD->CurrentValue);
		$this->SignCD->EditValue = $this->SignCD->CurrentValue;
		$this->SignCD->PlaceHolder = RemoveHtml($this->SignCD->caption());

		// Collection
		$this->Collection->EditAttrs["class"] = "form-control";
		$this->Collection->EditCustomAttributes = "";
		if (!$this->Collection->Raw)
			$this->Collection->CurrentValue = HtmlDecode($this->Collection->CurrentValue);
		$this->Collection->EditValue = $this->Collection->CurrentValue;
		$this->Collection->PlaceHolder = RemoveHtml($this->Collection->caption());

		// EditDate
		$this->EditDate->EditAttrs["class"] = "form-control";
		$this->EditDate->EditCustomAttributes = "";
		$this->EditDate->EditValue = FormatDateTime($this->EditDate->CurrentValue, 8);
		$this->EditDate->PlaceHolder = RemoveHtml($this->EditDate->caption());

		// SMS
		$this->SMS->EditAttrs["class"] = "form-control";
		$this->SMS->EditCustomAttributes = "";
		if (!$this->SMS->Raw)
			$this->SMS->CurrentValue = HtmlDecode($this->SMS->CurrentValue);
		$this->SMS->EditValue = $this->SMS->CurrentValue;
		$this->SMS->PlaceHolder = RemoveHtml($this->SMS->caption());

		// Note
		$this->Note->EditAttrs["class"] = "form-control";
		$this->Note->EditCustomAttributes = "";
		$this->Note->EditValue = $this->Note->CurrentValue;
		$this->Note->PlaceHolder = RemoveHtml($this->Note->caption());

		// WorkList
		$this->WorkList->EditAttrs["class"] = "form-control";
		$this->WorkList->EditCustomAttributes = "";
		if (!$this->WorkList->Raw)
			$this->WorkList->CurrentValue = HtmlDecode($this->WorkList->CurrentValue);
		$this->WorkList->EditValue = $this->WorkList->CurrentValue;
		$this->WorkList->PlaceHolder = RemoveHtml($this->WorkList->caption());

		// Page
		$this->_Page->EditAttrs["class"] = "form-control";
		$this->_Page->EditCustomAttributes = "";
		$this->_Page->EditValue = $this->_Page->CurrentValue;
		$this->_Page->PlaceHolder = RemoveHtml($this->_Page->caption());
		if (strval($this->_Page->EditValue) != "" && is_numeric($this->_Page->EditValue))
			$this->_Page->EditValue = FormatNumber($this->_Page->EditValue, -2, -2, -2, -2);
		

		// Incharge
		$this->Incharge->EditAttrs["class"] = "form-control";
		$this->Incharge->EditCustomAttributes = "";
		if (!$this->Incharge->Raw)
			$this->Incharge->CurrentValue = HtmlDecode($this->Incharge->CurrentValue);
		$this->Incharge->EditValue = $this->Incharge->CurrentValue;
		$this->Incharge->PlaceHolder = RemoveHtml($this->Incharge->caption());

		// AutoNum
		$this->AutoNum->EditAttrs["class"] = "form-control";
		$this->AutoNum->EditCustomAttributes = "";
		if (!$this->AutoNum->Raw)
			$this->AutoNum->CurrentValue = HtmlDecode($this->AutoNum->CurrentValue);
		$this->AutoNum->EditValue = $this->AutoNum->CurrentValue;
		$this->AutoNum->PlaceHolder = RemoveHtml($this->AutoNum->caption());

		// id
		$this->id->EditAttrs["class"] = "form-control";
		$this->id->EditCustomAttributes = "";
		$this->id->EditValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

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
					$doc->exportCaption($this->MainCD);
					$doc->exportCaption($this->Code);
					$doc->exportCaption($this->Name);
					$doc->exportCaption($this->Order);
					$doc->exportCaption($this->SignCD);
					$doc->exportCaption($this->Collection);
					$doc->exportCaption($this->EditDate);
					$doc->exportCaption($this->SMS);
					$doc->exportCaption($this->Note);
					$doc->exportCaption($this->WorkList);
					$doc->exportCaption($this->_Page);
					$doc->exportCaption($this->Incharge);
					$doc->exportCaption($this->AutoNum);
					$doc->exportCaption($this->id);
				} else {
					$doc->exportCaption($this->MainCD);
					$doc->exportCaption($this->Code);
					$doc->exportCaption($this->Name);
					$doc->exportCaption($this->Order);
					$doc->exportCaption($this->SignCD);
					$doc->exportCaption($this->Collection);
					$doc->exportCaption($this->EditDate);
					$doc->exportCaption($this->SMS);
					$doc->exportCaption($this->WorkList);
					$doc->exportCaption($this->_Page);
					$doc->exportCaption($this->Incharge);
					$doc->exportCaption($this->AutoNum);
					$doc->exportCaption($this->id);
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
						$doc->exportField($this->MainCD);
						$doc->exportField($this->Code);
						$doc->exportField($this->Name);
						$doc->exportField($this->Order);
						$doc->exportField($this->SignCD);
						$doc->exportField($this->Collection);
						$doc->exportField($this->EditDate);
						$doc->exportField($this->SMS);
						$doc->exportField($this->Note);
						$doc->exportField($this->WorkList);
						$doc->exportField($this->_Page);
						$doc->exportField($this->Incharge);
						$doc->exportField($this->AutoNum);
						$doc->exportField($this->id);
					} else {
						$doc->exportField($this->MainCD);
						$doc->exportField($this->Code);
						$doc->exportField($this->Name);
						$doc->exportField($this->Order);
						$doc->exportField($this->SignCD);
						$doc->exportField($this->Collection);
						$doc->exportField($this->EditDate);
						$doc->exportField($this->SMS);
						$doc->exportField($this->WorkList);
						$doc->exportField($this->_Page);
						$doc->exportField($this->Incharge);
						$doc->exportField($this->AutoNum);
						$doc->exportField($this->id);
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