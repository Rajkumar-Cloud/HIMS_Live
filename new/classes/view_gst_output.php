<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for view_gst_output
 */
class view_gst_output extends DbTable
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
	public $BillDate;
	public $IP_2_525_SGST;
	public $IP_2_525_CGST;
	public $IP_6_025_SGST;
	public $IP_6_025_CGST;
	public $IP_9_025_SGST;
	public $IP_9_025_CGST;
	public $IP_14_025_SGST;
	public $IP_14_025_CGST;
	public $OP_2_525_SGST;
	public $OP_2_525_CGST;
	public $OP_6_025_SGST;
	public $OP_6_025_CGST;
	public $OP_9_025_SGST;
	public $OP_9_025_CGST;
	public $OP_14_025_SGST;
	public $OP_14_025_CGST;
	public $HosoID;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'view_gst_output';
		$this->TableName = 'view_gst_output';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`view_gst_output`";
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

		// BillDate
		$this->BillDate = new DbField('view_gst_output', 'view_gst_output', 'x_BillDate', 'BillDate', '`BillDate`', CastDateFieldForLike("`BillDate`", 7, "DB"), 133, 10, 7, FALSE, '`BillDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BillDate->Sortable = TRUE; // Allow sort
		$this->BillDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['BillDate'] = &$this->BillDate;

		// IP 2.5% SGST
		$this->IP_2_525_SGST = new DbField('view_gst_output', 'view_gst_output', 'x_IP_2_525_SGST', 'IP 2.5% SGST', '`IP 2.5% SGST`', '`IP 2.5% SGST`', 131, 54, -1, FALSE, '`IP 2.5% SGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IP_2_525_SGST->Sortable = TRUE; // Allow sort
		$this->IP_2_525_SGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['IP 2.5% SGST'] = &$this->IP_2_525_SGST;

		// IP 2.5% CGST
		$this->IP_2_525_CGST = new DbField('view_gst_output', 'view_gst_output', 'x_IP_2_525_CGST', 'IP 2.5% CGST', '`IP 2.5% CGST`', '`IP 2.5% CGST`', 131, 54, -1, FALSE, '`IP 2.5% CGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IP_2_525_CGST->Sortable = TRUE; // Allow sort
		$this->IP_2_525_CGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['IP 2.5% CGST'] = &$this->IP_2_525_CGST;

		// IP 6.0% SGST
		$this->IP_6_025_SGST = new DbField('view_gst_output', 'view_gst_output', 'x_IP_6_025_SGST', 'IP 6.0% SGST', '`IP 6.0% SGST`', '`IP 6.0% SGST`', 131, 54, -1, FALSE, '`IP 6.0% SGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IP_6_025_SGST->Sortable = TRUE; // Allow sort
		$this->IP_6_025_SGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['IP 6.0% SGST'] = &$this->IP_6_025_SGST;

		// IP 6.0% CGST
		$this->IP_6_025_CGST = new DbField('view_gst_output', 'view_gst_output', 'x_IP_6_025_CGST', 'IP 6.0% CGST', '`IP 6.0% CGST`', '`IP 6.0% CGST`', 131, 54, -1, FALSE, '`IP 6.0% CGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IP_6_025_CGST->Sortable = TRUE; // Allow sort
		$this->IP_6_025_CGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['IP 6.0% CGST'] = &$this->IP_6_025_CGST;

		// IP 9.0% SGST
		$this->IP_9_025_SGST = new DbField('view_gst_output', 'view_gst_output', 'x_IP_9_025_SGST', 'IP 9.0% SGST', '`IP 9.0% SGST`', '`IP 9.0% SGST`', 131, 54, -1, FALSE, '`IP 9.0% SGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IP_9_025_SGST->Sortable = TRUE; // Allow sort
		$this->IP_9_025_SGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['IP 9.0% SGST'] = &$this->IP_9_025_SGST;

		// IP 9.0% CGST
		$this->IP_9_025_CGST = new DbField('view_gst_output', 'view_gst_output', 'x_IP_9_025_CGST', 'IP 9.0% CGST', '`IP 9.0% CGST`', '`IP 9.0% CGST`', 131, 54, -1, FALSE, '`IP 9.0% CGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IP_9_025_CGST->Sortable = TRUE; // Allow sort
		$this->IP_9_025_CGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['IP 9.0% CGST'] = &$this->IP_9_025_CGST;

		// IP 14.0% SGST
		$this->IP_14_025_SGST = new DbField('view_gst_output', 'view_gst_output', 'x_IP_14_025_SGST', 'IP 14.0% SGST', '`IP 14.0% SGST`', '`IP 14.0% SGST`', 131, 54, -1, FALSE, '`IP 14.0% SGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IP_14_025_SGST->Sortable = TRUE; // Allow sort
		$this->IP_14_025_SGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['IP 14.0% SGST'] = &$this->IP_14_025_SGST;

		// IP 14.0% CGST
		$this->IP_14_025_CGST = new DbField('view_gst_output', 'view_gst_output', 'x_IP_14_025_CGST', 'IP 14.0% CGST', '`IP 14.0% CGST`', '`IP 14.0% CGST`', 131, 54, -1, FALSE, '`IP 14.0% CGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IP_14_025_CGST->Sortable = TRUE; // Allow sort
		$this->IP_14_025_CGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['IP 14.0% CGST'] = &$this->IP_14_025_CGST;

		// OP 2.5% SGST
		$this->OP_2_525_SGST = new DbField('view_gst_output', 'view_gst_output', 'x_OP_2_525_SGST', 'OP 2.5% SGST', '`OP 2.5% SGST`', '`OP 2.5% SGST`', 131, 45, -1, FALSE, '`OP 2.5% SGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OP_2_525_SGST->Sortable = TRUE; // Allow sort
		$this->OP_2_525_SGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['OP 2.5% SGST'] = &$this->OP_2_525_SGST;

		// OP 2.5% CGST
		$this->OP_2_525_CGST = new DbField('view_gst_output', 'view_gst_output', 'x_OP_2_525_CGST', 'OP 2.5% CGST', '`OP 2.5% CGST`', '`OP 2.5% CGST`', 131, 45, -1, FALSE, '`OP 2.5% CGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OP_2_525_CGST->Sortable = TRUE; // Allow sort
		$this->OP_2_525_CGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['OP 2.5% CGST'] = &$this->OP_2_525_CGST;

		// OP 6.0% SGST
		$this->OP_6_025_SGST = new DbField('view_gst_output', 'view_gst_output', 'x_OP_6_025_SGST', 'OP 6.0% SGST', '`OP 6.0% SGST`', '`OP 6.0% SGST`', 131, 45, -1, FALSE, '`OP 6.0% SGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OP_6_025_SGST->Sortable = TRUE; // Allow sort
		$this->OP_6_025_SGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['OP 6.0% SGST'] = &$this->OP_6_025_SGST;

		// OP 6.0% CGST
		$this->OP_6_025_CGST = new DbField('view_gst_output', 'view_gst_output', 'x_OP_6_025_CGST', 'OP 6.0% CGST', '`OP 6.0% CGST`', '`OP 6.0% CGST`', 131, 45, -1, FALSE, '`OP 6.0% CGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OP_6_025_CGST->Sortable = TRUE; // Allow sort
		$this->OP_6_025_CGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['OP 6.0% CGST'] = &$this->OP_6_025_CGST;

		// OP 9.0% SGST
		$this->OP_9_025_SGST = new DbField('view_gst_output', 'view_gst_output', 'x_OP_9_025_SGST', 'OP 9.0% SGST', '`OP 9.0% SGST`', '`OP 9.0% SGST`', 131, 45, -1, FALSE, '`OP 9.0% SGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OP_9_025_SGST->Sortable = TRUE; // Allow sort
		$this->OP_9_025_SGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['OP 9.0% SGST'] = &$this->OP_9_025_SGST;

		// OP 9.0% CGST
		$this->OP_9_025_CGST = new DbField('view_gst_output', 'view_gst_output', 'x_OP_9_025_CGST', 'OP 9.0% CGST', '`OP 9.0% CGST`', '`OP 9.0% CGST`', 131, 45, -1, FALSE, '`OP 9.0% CGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OP_9_025_CGST->Sortable = TRUE; // Allow sort
		$this->OP_9_025_CGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['OP 9.0% CGST'] = &$this->OP_9_025_CGST;

		// OP 14.0% SGST
		$this->OP_14_025_SGST = new DbField('view_gst_output', 'view_gst_output', 'x_OP_14_025_SGST', 'OP 14.0% SGST', '`OP 14.0% SGST`', '`OP 14.0% SGST`', 131, 45, -1, FALSE, '`OP 14.0% SGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OP_14_025_SGST->Sortable = TRUE; // Allow sort
		$this->OP_14_025_SGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['OP 14.0% SGST'] = &$this->OP_14_025_SGST;

		// OP 14.0% CGST
		$this->OP_14_025_CGST = new DbField('view_gst_output', 'view_gst_output', 'x_OP_14_025_CGST', 'OP 14.0% CGST', '`OP 14.0% CGST`', '`OP 14.0% CGST`', 131, 45, -1, FALSE, '`OP 14.0% CGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OP_14_025_CGST->Sortable = TRUE; // Allow sort
		$this->OP_14_025_CGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['OP 14.0% CGST'] = &$this->OP_14_025_CGST;

		// HosoID
		$this->HosoID = new DbField('view_gst_output', 'view_gst_output', 'x_HosoID', 'HosoID', '`HosoID`', '`HosoID`', 3, 11, -1, FALSE, '`HosoID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HosoID->Sortable = TRUE; // Allow sort
		$this->HosoID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HosoID'] = &$this->HosoID;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_gst_output`";
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
		$this->TableFilter = "`HosoID`='".HospitalID()."'";
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
		$this->BillDate->DbValue = $row['BillDate'];
		$this->IP_2_525_SGST->DbValue = $row['IP 2.5% SGST'];
		$this->IP_2_525_CGST->DbValue = $row['IP 2.5% CGST'];
		$this->IP_6_025_SGST->DbValue = $row['IP 6.0% SGST'];
		$this->IP_6_025_CGST->DbValue = $row['IP 6.0% CGST'];
		$this->IP_9_025_SGST->DbValue = $row['IP 9.0% SGST'];
		$this->IP_9_025_CGST->DbValue = $row['IP 9.0% CGST'];
		$this->IP_14_025_SGST->DbValue = $row['IP 14.0% SGST'];
		$this->IP_14_025_CGST->DbValue = $row['IP 14.0% CGST'];
		$this->OP_2_525_SGST->DbValue = $row['OP 2.5% SGST'];
		$this->OP_2_525_CGST->DbValue = $row['OP 2.5% CGST'];
		$this->OP_6_025_SGST->DbValue = $row['OP 6.0% SGST'];
		$this->OP_6_025_CGST->DbValue = $row['OP 6.0% CGST'];
		$this->OP_9_025_SGST->DbValue = $row['OP 9.0% SGST'];
		$this->OP_9_025_CGST->DbValue = $row['OP 9.0% CGST'];
		$this->OP_14_025_SGST->DbValue = $row['OP 14.0% SGST'];
		$this->OP_14_025_CGST->DbValue = $row['OP 14.0% CGST'];
		$this->HosoID->DbValue = $row['HosoID'];
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
			return "view_gst_outputlist.php";
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
		if ($pageName == "view_gst_outputview.php")
			return $Language->phrase("View");
		elseif ($pageName == "view_gst_outputedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "view_gst_outputadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "view_gst_outputlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("view_gst_outputview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_gst_outputview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "view_gst_outputadd.php?" . $this->getUrlParm($parm);
		else
			$url = "view_gst_outputadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("view_gst_outputedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("view_gst_outputadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("view_gst_outputdelete.php", $this->getUrlParm());
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
		$this->BillDate->setDbValue($rs->fields('BillDate'));
		$this->IP_2_525_SGST->setDbValue($rs->fields('IP 2.5% SGST'));
		$this->IP_2_525_CGST->setDbValue($rs->fields('IP 2.5% CGST'));
		$this->IP_6_025_SGST->setDbValue($rs->fields('IP 6.0% SGST'));
		$this->IP_6_025_CGST->setDbValue($rs->fields('IP 6.0% CGST'));
		$this->IP_9_025_SGST->setDbValue($rs->fields('IP 9.0% SGST'));
		$this->IP_9_025_CGST->setDbValue($rs->fields('IP 9.0% CGST'));
		$this->IP_14_025_SGST->setDbValue($rs->fields('IP 14.0% SGST'));
		$this->IP_14_025_CGST->setDbValue($rs->fields('IP 14.0% CGST'));
		$this->OP_2_525_SGST->setDbValue($rs->fields('OP 2.5% SGST'));
		$this->OP_2_525_CGST->setDbValue($rs->fields('OP 2.5% CGST'));
		$this->OP_6_025_SGST->setDbValue($rs->fields('OP 6.0% SGST'));
		$this->OP_6_025_CGST->setDbValue($rs->fields('OP 6.0% CGST'));
		$this->OP_9_025_SGST->setDbValue($rs->fields('OP 9.0% SGST'));
		$this->OP_9_025_CGST->setDbValue($rs->fields('OP 9.0% CGST'));
		$this->OP_14_025_SGST->setDbValue($rs->fields('OP 14.0% SGST'));
		$this->OP_14_025_CGST->setDbValue($rs->fields('OP 14.0% CGST'));
		$this->HosoID->setDbValue($rs->fields('HosoID'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// BillDate
		// IP 2.5% SGST
		// IP 2.5% CGST
		// IP 6.0% SGST
		// IP 6.0% CGST
		// IP 9.0% SGST
		// IP 9.0% CGST
		// IP 14.0% SGST
		// IP 14.0% CGST
		// OP 2.5% SGST
		// OP 2.5% CGST
		// OP 6.0% SGST
		// OP 6.0% CGST
		// OP 9.0% SGST
		// OP 9.0% CGST
		// OP 14.0% SGST
		// OP 14.0% CGST
		// HosoID
		// BillDate

		$this->BillDate->ViewValue = $this->BillDate->CurrentValue;
		$this->BillDate->ViewValue = FormatDateTime($this->BillDate->ViewValue, 7);
		$this->BillDate->ViewCustomAttributes = "";

		// IP 2.5% SGST
		$this->IP_2_525_SGST->ViewValue = $this->IP_2_525_SGST->CurrentValue;
		$this->IP_2_525_SGST->ViewValue = FormatNumber($this->IP_2_525_SGST->ViewValue, 2, -2, -2, -2);
		$this->IP_2_525_SGST->ViewCustomAttributes = "";

		// IP 2.5% CGST
		$this->IP_2_525_CGST->ViewValue = $this->IP_2_525_CGST->CurrentValue;
		$this->IP_2_525_CGST->ViewValue = FormatNumber($this->IP_2_525_CGST->ViewValue, 2, -2, -2, -2);
		$this->IP_2_525_CGST->ViewCustomAttributes = "";

		// IP 6.0% SGST
		$this->IP_6_025_SGST->ViewValue = $this->IP_6_025_SGST->CurrentValue;
		$this->IP_6_025_SGST->ViewValue = FormatNumber($this->IP_6_025_SGST->ViewValue, 2, -2, -2, -2);
		$this->IP_6_025_SGST->ViewCustomAttributes = "";

		// IP 6.0% CGST
		$this->IP_6_025_CGST->ViewValue = $this->IP_6_025_CGST->CurrentValue;
		$this->IP_6_025_CGST->ViewValue = FormatNumber($this->IP_6_025_CGST->ViewValue, 2, -2, -2, -2);
		$this->IP_6_025_CGST->ViewCustomAttributes = "";

		// IP 9.0% SGST
		$this->IP_9_025_SGST->ViewValue = $this->IP_9_025_SGST->CurrentValue;
		$this->IP_9_025_SGST->ViewValue = FormatNumber($this->IP_9_025_SGST->ViewValue, 2, -2, -2, -2);
		$this->IP_9_025_SGST->ViewCustomAttributes = "";

		// IP 9.0% CGST
		$this->IP_9_025_CGST->ViewValue = $this->IP_9_025_CGST->CurrentValue;
		$this->IP_9_025_CGST->ViewValue = FormatNumber($this->IP_9_025_CGST->ViewValue, 2, -2, -2, -2);
		$this->IP_9_025_CGST->ViewCustomAttributes = "";

		// IP 14.0% SGST
		$this->IP_14_025_SGST->ViewValue = $this->IP_14_025_SGST->CurrentValue;
		$this->IP_14_025_SGST->ViewValue = FormatNumber($this->IP_14_025_SGST->ViewValue, 2, -2, -2, -2);
		$this->IP_14_025_SGST->ViewCustomAttributes = "";

		// IP 14.0% CGST
		$this->IP_14_025_CGST->ViewValue = $this->IP_14_025_CGST->CurrentValue;
		$this->IP_14_025_CGST->ViewValue = FormatNumber($this->IP_14_025_CGST->ViewValue, 2, -2, -2, -2);
		$this->IP_14_025_CGST->ViewCustomAttributes = "";

		// OP 2.5% SGST
		$this->OP_2_525_SGST->ViewValue = $this->OP_2_525_SGST->CurrentValue;
		$this->OP_2_525_SGST->ViewValue = FormatNumber($this->OP_2_525_SGST->ViewValue, 2, -2, -2, -2);
		$this->OP_2_525_SGST->ViewCustomAttributes = "";

		// OP 2.5% CGST
		$this->OP_2_525_CGST->ViewValue = $this->OP_2_525_CGST->CurrentValue;
		$this->OP_2_525_CGST->ViewValue = FormatNumber($this->OP_2_525_CGST->ViewValue, 2, -2, -2, -2);
		$this->OP_2_525_CGST->ViewCustomAttributes = "";

		// OP 6.0% SGST
		$this->OP_6_025_SGST->ViewValue = $this->OP_6_025_SGST->CurrentValue;
		$this->OP_6_025_SGST->ViewValue = FormatNumber($this->OP_6_025_SGST->ViewValue, 2, -2, -2, -2);
		$this->OP_6_025_SGST->ViewCustomAttributes = "";

		// OP 6.0% CGST
		$this->OP_6_025_CGST->ViewValue = $this->OP_6_025_CGST->CurrentValue;
		$this->OP_6_025_CGST->ViewValue = FormatNumber($this->OP_6_025_CGST->ViewValue, 2, -2, -2, -2);
		$this->OP_6_025_CGST->ViewCustomAttributes = "";

		// OP 9.0% SGST
		$this->OP_9_025_SGST->ViewValue = $this->OP_9_025_SGST->CurrentValue;
		$this->OP_9_025_SGST->ViewValue = FormatNumber($this->OP_9_025_SGST->ViewValue, 2, -2, -2, -2);
		$this->OP_9_025_SGST->ViewCustomAttributes = "";

		// OP 9.0% CGST
		$this->OP_9_025_CGST->ViewValue = $this->OP_9_025_CGST->CurrentValue;
		$this->OP_9_025_CGST->ViewValue = FormatNumber($this->OP_9_025_CGST->ViewValue, 2, -2, -2, -2);
		$this->OP_9_025_CGST->ViewCustomAttributes = "";

		// OP 14.0% SGST
		$this->OP_14_025_SGST->ViewValue = $this->OP_14_025_SGST->CurrentValue;
		$this->OP_14_025_SGST->ViewValue = FormatNumber($this->OP_14_025_SGST->ViewValue, 2, -2, -2, -2);
		$this->OP_14_025_SGST->ViewCustomAttributes = "";

		// OP 14.0% CGST
		$this->OP_14_025_CGST->ViewValue = $this->OP_14_025_CGST->CurrentValue;
		$this->OP_14_025_CGST->ViewValue = FormatNumber($this->OP_14_025_CGST->ViewValue, 2, -2, -2, -2);
		$this->OP_14_025_CGST->ViewCustomAttributes = "";

		// HosoID
		$this->HosoID->ViewValue = $this->HosoID->CurrentValue;
		$this->HosoID->ViewValue = FormatNumber($this->HosoID->ViewValue, 0, -2, -2, -2);
		$this->HosoID->ViewCustomAttributes = "";

		// BillDate
		$this->BillDate->LinkCustomAttributes = "";
		$this->BillDate->HrefValue = "";
		$this->BillDate->TooltipValue = "";

		// IP 2.5% SGST
		$this->IP_2_525_SGST->LinkCustomAttributes = "";
		$this->IP_2_525_SGST->HrefValue = "";
		$this->IP_2_525_SGST->TooltipValue = "";

		// IP 2.5% CGST
		$this->IP_2_525_CGST->LinkCustomAttributes = "";
		$this->IP_2_525_CGST->HrefValue = "";
		$this->IP_2_525_CGST->TooltipValue = "";

		// IP 6.0% SGST
		$this->IP_6_025_SGST->LinkCustomAttributes = "";
		$this->IP_6_025_SGST->HrefValue = "";
		$this->IP_6_025_SGST->TooltipValue = "";

		// IP 6.0% CGST
		$this->IP_6_025_CGST->LinkCustomAttributes = "";
		$this->IP_6_025_CGST->HrefValue = "";
		$this->IP_6_025_CGST->TooltipValue = "";

		// IP 9.0% SGST
		$this->IP_9_025_SGST->LinkCustomAttributes = "";
		$this->IP_9_025_SGST->HrefValue = "";
		$this->IP_9_025_SGST->TooltipValue = "";

		// IP 9.0% CGST
		$this->IP_9_025_CGST->LinkCustomAttributes = "";
		$this->IP_9_025_CGST->HrefValue = "";
		$this->IP_9_025_CGST->TooltipValue = "";

		// IP 14.0% SGST
		$this->IP_14_025_SGST->LinkCustomAttributes = "";
		$this->IP_14_025_SGST->HrefValue = "";
		$this->IP_14_025_SGST->TooltipValue = "";

		// IP 14.0% CGST
		$this->IP_14_025_CGST->LinkCustomAttributes = "";
		$this->IP_14_025_CGST->HrefValue = "";
		$this->IP_14_025_CGST->TooltipValue = "";

		// OP 2.5% SGST
		$this->OP_2_525_SGST->LinkCustomAttributes = "";
		$this->OP_2_525_SGST->HrefValue = "";
		$this->OP_2_525_SGST->TooltipValue = "";

		// OP 2.5% CGST
		$this->OP_2_525_CGST->LinkCustomAttributes = "";
		$this->OP_2_525_CGST->HrefValue = "";
		$this->OP_2_525_CGST->TooltipValue = "";

		// OP 6.0% SGST
		$this->OP_6_025_SGST->LinkCustomAttributes = "";
		$this->OP_6_025_SGST->HrefValue = "";
		$this->OP_6_025_SGST->TooltipValue = "";

		// OP 6.0% CGST
		$this->OP_6_025_CGST->LinkCustomAttributes = "";
		$this->OP_6_025_CGST->HrefValue = "";
		$this->OP_6_025_CGST->TooltipValue = "";

		// OP 9.0% SGST
		$this->OP_9_025_SGST->LinkCustomAttributes = "";
		$this->OP_9_025_SGST->HrefValue = "";
		$this->OP_9_025_SGST->TooltipValue = "";

		// OP 9.0% CGST
		$this->OP_9_025_CGST->LinkCustomAttributes = "";
		$this->OP_9_025_CGST->HrefValue = "";
		$this->OP_9_025_CGST->TooltipValue = "";

		// OP 14.0% SGST
		$this->OP_14_025_SGST->LinkCustomAttributes = "";
		$this->OP_14_025_SGST->HrefValue = "";
		$this->OP_14_025_SGST->TooltipValue = "";

		// OP 14.0% CGST
		$this->OP_14_025_CGST->LinkCustomAttributes = "";
		$this->OP_14_025_CGST->HrefValue = "";
		$this->OP_14_025_CGST->TooltipValue = "";

		// HosoID
		$this->HosoID->LinkCustomAttributes = "";
		$this->HosoID->HrefValue = "";
		$this->HosoID->TooltipValue = "";

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

		// BillDate
		$this->BillDate->EditAttrs["class"] = "form-control";
		$this->BillDate->EditCustomAttributes = "";
		$this->BillDate->EditValue = FormatDateTime($this->BillDate->CurrentValue, 7);
		$this->BillDate->PlaceHolder = RemoveHtml($this->BillDate->caption());

		// IP 2.5% SGST
		$this->IP_2_525_SGST->EditAttrs["class"] = "form-control";
		$this->IP_2_525_SGST->EditCustomAttributes = "";
		$this->IP_2_525_SGST->EditValue = $this->IP_2_525_SGST->CurrentValue;
		$this->IP_2_525_SGST->PlaceHolder = RemoveHtml($this->IP_2_525_SGST->caption());
		if (strval($this->IP_2_525_SGST->EditValue) != "" && is_numeric($this->IP_2_525_SGST->EditValue))
			$this->IP_2_525_SGST->EditValue = FormatNumber($this->IP_2_525_SGST->EditValue, -2, -2, -2, -2);
		

		// IP 2.5% CGST
		$this->IP_2_525_CGST->EditAttrs["class"] = "form-control";
		$this->IP_2_525_CGST->EditCustomAttributes = "";
		$this->IP_2_525_CGST->EditValue = $this->IP_2_525_CGST->CurrentValue;
		$this->IP_2_525_CGST->PlaceHolder = RemoveHtml($this->IP_2_525_CGST->caption());
		if (strval($this->IP_2_525_CGST->EditValue) != "" && is_numeric($this->IP_2_525_CGST->EditValue))
			$this->IP_2_525_CGST->EditValue = FormatNumber($this->IP_2_525_CGST->EditValue, -2, -2, -2, -2);
		

		// IP 6.0% SGST
		$this->IP_6_025_SGST->EditAttrs["class"] = "form-control";
		$this->IP_6_025_SGST->EditCustomAttributes = "";
		$this->IP_6_025_SGST->EditValue = $this->IP_6_025_SGST->CurrentValue;
		$this->IP_6_025_SGST->PlaceHolder = RemoveHtml($this->IP_6_025_SGST->caption());
		if (strval($this->IP_6_025_SGST->EditValue) != "" && is_numeric($this->IP_6_025_SGST->EditValue))
			$this->IP_6_025_SGST->EditValue = FormatNumber($this->IP_6_025_SGST->EditValue, -2, -2, -2, -2);
		

		// IP 6.0% CGST
		$this->IP_6_025_CGST->EditAttrs["class"] = "form-control";
		$this->IP_6_025_CGST->EditCustomAttributes = "";
		$this->IP_6_025_CGST->EditValue = $this->IP_6_025_CGST->CurrentValue;
		$this->IP_6_025_CGST->PlaceHolder = RemoveHtml($this->IP_6_025_CGST->caption());
		if (strval($this->IP_6_025_CGST->EditValue) != "" && is_numeric($this->IP_6_025_CGST->EditValue))
			$this->IP_6_025_CGST->EditValue = FormatNumber($this->IP_6_025_CGST->EditValue, -2, -2, -2, -2);
		

		// IP 9.0% SGST
		$this->IP_9_025_SGST->EditAttrs["class"] = "form-control";
		$this->IP_9_025_SGST->EditCustomAttributes = "";
		$this->IP_9_025_SGST->EditValue = $this->IP_9_025_SGST->CurrentValue;
		$this->IP_9_025_SGST->PlaceHolder = RemoveHtml($this->IP_9_025_SGST->caption());
		if (strval($this->IP_9_025_SGST->EditValue) != "" && is_numeric($this->IP_9_025_SGST->EditValue))
			$this->IP_9_025_SGST->EditValue = FormatNumber($this->IP_9_025_SGST->EditValue, -2, -2, -2, -2);
		

		// IP 9.0% CGST
		$this->IP_9_025_CGST->EditAttrs["class"] = "form-control";
		$this->IP_9_025_CGST->EditCustomAttributes = "";
		$this->IP_9_025_CGST->EditValue = $this->IP_9_025_CGST->CurrentValue;
		$this->IP_9_025_CGST->PlaceHolder = RemoveHtml($this->IP_9_025_CGST->caption());
		if (strval($this->IP_9_025_CGST->EditValue) != "" && is_numeric($this->IP_9_025_CGST->EditValue))
			$this->IP_9_025_CGST->EditValue = FormatNumber($this->IP_9_025_CGST->EditValue, -2, -2, -2, -2);
		

		// IP 14.0% SGST
		$this->IP_14_025_SGST->EditAttrs["class"] = "form-control";
		$this->IP_14_025_SGST->EditCustomAttributes = "";
		$this->IP_14_025_SGST->EditValue = $this->IP_14_025_SGST->CurrentValue;
		$this->IP_14_025_SGST->PlaceHolder = RemoveHtml($this->IP_14_025_SGST->caption());
		if (strval($this->IP_14_025_SGST->EditValue) != "" && is_numeric($this->IP_14_025_SGST->EditValue))
			$this->IP_14_025_SGST->EditValue = FormatNumber($this->IP_14_025_SGST->EditValue, -2, -2, -2, -2);
		

		// IP 14.0% CGST
		$this->IP_14_025_CGST->EditAttrs["class"] = "form-control";
		$this->IP_14_025_CGST->EditCustomAttributes = "";
		$this->IP_14_025_CGST->EditValue = $this->IP_14_025_CGST->CurrentValue;
		$this->IP_14_025_CGST->PlaceHolder = RemoveHtml($this->IP_14_025_CGST->caption());
		if (strval($this->IP_14_025_CGST->EditValue) != "" && is_numeric($this->IP_14_025_CGST->EditValue))
			$this->IP_14_025_CGST->EditValue = FormatNumber($this->IP_14_025_CGST->EditValue, -2, -2, -2, -2);
		

		// OP 2.5% SGST
		$this->OP_2_525_SGST->EditAttrs["class"] = "form-control";
		$this->OP_2_525_SGST->EditCustomAttributes = "";
		$this->OP_2_525_SGST->EditValue = $this->OP_2_525_SGST->CurrentValue;
		$this->OP_2_525_SGST->PlaceHolder = RemoveHtml($this->OP_2_525_SGST->caption());
		if (strval($this->OP_2_525_SGST->EditValue) != "" && is_numeric($this->OP_2_525_SGST->EditValue))
			$this->OP_2_525_SGST->EditValue = FormatNumber($this->OP_2_525_SGST->EditValue, -2, -2, -2, -2);
		

		// OP 2.5% CGST
		$this->OP_2_525_CGST->EditAttrs["class"] = "form-control";
		$this->OP_2_525_CGST->EditCustomAttributes = "";
		$this->OP_2_525_CGST->EditValue = $this->OP_2_525_CGST->CurrentValue;
		$this->OP_2_525_CGST->PlaceHolder = RemoveHtml($this->OP_2_525_CGST->caption());
		if (strval($this->OP_2_525_CGST->EditValue) != "" && is_numeric($this->OP_2_525_CGST->EditValue))
			$this->OP_2_525_CGST->EditValue = FormatNumber($this->OP_2_525_CGST->EditValue, -2, -2, -2, -2);
		

		// OP 6.0% SGST
		$this->OP_6_025_SGST->EditAttrs["class"] = "form-control";
		$this->OP_6_025_SGST->EditCustomAttributes = "";
		$this->OP_6_025_SGST->EditValue = $this->OP_6_025_SGST->CurrentValue;
		$this->OP_6_025_SGST->PlaceHolder = RemoveHtml($this->OP_6_025_SGST->caption());
		if (strval($this->OP_6_025_SGST->EditValue) != "" && is_numeric($this->OP_6_025_SGST->EditValue))
			$this->OP_6_025_SGST->EditValue = FormatNumber($this->OP_6_025_SGST->EditValue, -2, -2, -2, -2);
		

		// OP 6.0% CGST
		$this->OP_6_025_CGST->EditAttrs["class"] = "form-control";
		$this->OP_6_025_CGST->EditCustomAttributes = "";
		$this->OP_6_025_CGST->EditValue = $this->OP_6_025_CGST->CurrentValue;
		$this->OP_6_025_CGST->PlaceHolder = RemoveHtml($this->OP_6_025_CGST->caption());
		if (strval($this->OP_6_025_CGST->EditValue) != "" && is_numeric($this->OP_6_025_CGST->EditValue))
			$this->OP_6_025_CGST->EditValue = FormatNumber($this->OP_6_025_CGST->EditValue, -2, -2, -2, -2);
		

		// OP 9.0% SGST
		$this->OP_9_025_SGST->EditAttrs["class"] = "form-control";
		$this->OP_9_025_SGST->EditCustomAttributes = "";
		$this->OP_9_025_SGST->EditValue = $this->OP_9_025_SGST->CurrentValue;
		$this->OP_9_025_SGST->PlaceHolder = RemoveHtml($this->OP_9_025_SGST->caption());
		if (strval($this->OP_9_025_SGST->EditValue) != "" && is_numeric($this->OP_9_025_SGST->EditValue))
			$this->OP_9_025_SGST->EditValue = FormatNumber($this->OP_9_025_SGST->EditValue, -2, -2, -2, -2);
		

		// OP 9.0% CGST
		$this->OP_9_025_CGST->EditAttrs["class"] = "form-control";
		$this->OP_9_025_CGST->EditCustomAttributes = "";
		$this->OP_9_025_CGST->EditValue = $this->OP_9_025_CGST->CurrentValue;
		$this->OP_9_025_CGST->PlaceHolder = RemoveHtml($this->OP_9_025_CGST->caption());
		if (strval($this->OP_9_025_CGST->EditValue) != "" && is_numeric($this->OP_9_025_CGST->EditValue))
			$this->OP_9_025_CGST->EditValue = FormatNumber($this->OP_9_025_CGST->EditValue, -2, -2, -2, -2);
		

		// OP 14.0% SGST
		$this->OP_14_025_SGST->EditAttrs["class"] = "form-control";
		$this->OP_14_025_SGST->EditCustomAttributes = "";
		$this->OP_14_025_SGST->EditValue = $this->OP_14_025_SGST->CurrentValue;
		$this->OP_14_025_SGST->PlaceHolder = RemoveHtml($this->OP_14_025_SGST->caption());
		if (strval($this->OP_14_025_SGST->EditValue) != "" && is_numeric($this->OP_14_025_SGST->EditValue))
			$this->OP_14_025_SGST->EditValue = FormatNumber($this->OP_14_025_SGST->EditValue, -2, -2, -2, -2);
		

		// OP 14.0% CGST
		$this->OP_14_025_CGST->EditAttrs["class"] = "form-control";
		$this->OP_14_025_CGST->EditCustomAttributes = "";
		$this->OP_14_025_CGST->EditValue = $this->OP_14_025_CGST->CurrentValue;
		$this->OP_14_025_CGST->PlaceHolder = RemoveHtml($this->OP_14_025_CGST->caption());
		if (strval($this->OP_14_025_CGST->EditValue) != "" && is_numeric($this->OP_14_025_CGST->EditValue))
			$this->OP_14_025_CGST->EditValue = FormatNumber($this->OP_14_025_CGST->EditValue, -2, -2, -2, -2);
		

		// HosoID
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
					$doc->exportCaption($this->BillDate);
					$doc->exportCaption($this->IP_2_525_SGST);
					$doc->exportCaption($this->IP_2_525_CGST);
					$doc->exportCaption($this->IP_6_025_SGST);
					$doc->exportCaption($this->IP_6_025_CGST);
					$doc->exportCaption($this->IP_9_025_SGST);
					$doc->exportCaption($this->IP_9_025_CGST);
					$doc->exportCaption($this->IP_14_025_SGST);
					$doc->exportCaption($this->IP_14_025_CGST);
					$doc->exportCaption($this->OP_2_525_SGST);
					$doc->exportCaption($this->OP_2_525_CGST);
					$doc->exportCaption($this->OP_6_025_SGST);
					$doc->exportCaption($this->OP_6_025_CGST);
					$doc->exportCaption($this->OP_9_025_SGST);
					$doc->exportCaption($this->OP_9_025_CGST);
					$doc->exportCaption($this->OP_14_025_SGST);
					$doc->exportCaption($this->OP_14_025_CGST);
					$doc->exportCaption($this->HosoID);
				} else {
					$doc->exportCaption($this->BillDate);
					$doc->exportCaption($this->IP_2_525_SGST);
					$doc->exportCaption($this->IP_2_525_CGST);
					$doc->exportCaption($this->IP_6_025_SGST);
					$doc->exportCaption($this->IP_6_025_CGST);
					$doc->exportCaption($this->IP_9_025_SGST);
					$doc->exportCaption($this->IP_9_025_CGST);
					$doc->exportCaption($this->IP_14_025_SGST);
					$doc->exportCaption($this->IP_14_025_CGST);
					$doc->exportCaption($this->OP_2_525_SGST);
					$doc->exportCaption($this->OP_2_525_CGST);
					$doc->exportCaption($this->OP_6_025_SGST);
					$doc->exportCaption($this->OP_6_025_CGST);
					$doc->exportCaption($this->OP_9_025_SGST);
					$doc->exportCaption($this->OP_9_025_CGST);
					$doc->exportCaption($this->OP_14_025_SGST);
					$doc->exportCaption($this->OP_14_025_CGST);
					$doc->exportCaption($this->HosoID);
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
						$doc->exportField($this->BillDate);
						$doc->exportField($this->IP_2_525_SGST);
						$doc->exportField($this->IP_2_525_CGST);
						$doc->exportField($this->IP_6_025_SGST);
						$doc->exportField($this->IP_6_025_CGST);
						$doc->exportField($this->IP_9_025_SGST);
						$doc->exportField($this->IP_9_025_CGST);
						$doc->exportField($this->IP_14_025_SGST);
						$doc->exportField($this->IP_14_025_CGST);
						$doc->exportField($this->OP_2_525_SGST);
						$doc->exportField($this->OP_2_525_CGST);
						$doc->exportField($this->OP_6_025_SGST);
						$doc->exportField($this->OP_6_025_CGST);
						$doc->exportField($this->OP_9_025_SGST);
						$doc->exportField($this->OP_9_025_CGST);
						$doc->exportField($this->OP_14_025_SGST);
						$doc->exportField($this->OP_14_025_CGST);
						$doc->exportField($this->HosoID);
					} else {
						$doc->exportField($this->BillDate);
						$doc->exportField($this->IP_2_525_SGST);
						$doc->exportField($this->IP_2_525_CGST);
						$doc->exportField($this->IP_6_025_SGST);
						$doc->exportField($this->IP_6_025_CGST);
						$doc->exportField($this->IP_9_025_SGST);
						$doc->exportField($this->IP_9_025_CGST);
						$doc->exportField($this->IP_14_025_SGST);
						$doc->exportField($this->IP_14_025_CGST);
						$doc->exportField($this->OP_2_525_SGST);
						$doc->exportField($this->OP_2_525_CGST);
						$doc->exportField($this->OP_6_025_SGST);
						$doc->exportField($this->OP_6_025_CGST);
						$doc->exportField($this->OP_9_025_SGST);
						$doc->exportField($this->OP_9_025_CGST);
						$doc->exportField($this->OP_14_025_SGST);
						$doc->exportField($this->OP_14_025_CGST);
						$doc->exportField($this->HosoID);
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