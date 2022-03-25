<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for view_dashboard_summary_payment_mode
 */
class view_dashboard_summary_payment_mode extends DbTable
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
	public $createddate;
	public $UserName;
	public $CARD;
	public $CASH;
	public $NEFT;
	public $PAYTM;
	public $CHEQUE;
	public $RTGS;
	public $NotSelected;
	public $Total;
	public $REFUND;
	public $CANCEL;
	public $HospID;
	public $BillType;
	public $AdjAdvance;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'view_dashboard_summary_payment_mode';
		$this->TableName = 'view_dashboard_summary_payment_mode';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`view_dashboard_summary_payment_mode`";
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

		// createddate
		$this->createddate = new DbField('view_dashboard_summary_payment_mode', 'view_dashboard_summary_payment_mode', 'x_createddate', 'createddate', '`createddate`', CastDateFieldForLike("`createddate`", 7, "DB"), 133, 10, 7, FALSE, '`createddate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddate->IsForeignKey = TRUE; // Foreign key field
		$this->createddate->Sortable = TRUE; // Allow sort
		$this->createddate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['createddate'] = &$this->createddate;

		// UserName
		$this->UserName = new DbField('view_dashboard_summary_payment_mode', 'view_dashboard_summary_payment_mode', 'x_UserName', 'UserName', '`UserName`', '`UserName`', 200, 45, -1, FALSE, '`UserName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->UserName->IsForeignKey = TRUE; // Foreign key field
		$this->UserName->Sortable = TRUE; // Allow sort
		$this->fields['UserName'] = &$this->UserName;

		// CARD
		$this->CARD = new DbField('view_dashboard_summary_payment_mode', 'view_dashboard_summary_payment_mode', 'x_CARD', 'CARD', '`CARD`', '`CARD`', 131, 56, -1, FALSE, '`CARD`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CARD->Sortable = TRUE; // Allow sort
		$this->CARD->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['CARD'] = &$this->CARD;

		// CASH
		$this->CASH = new DbField('view_dashboard_summary_payment_mode', 'view_dashboard_summary_payment_mode', 'x_CASH', 'CASH', '`CASH`', '`CASH`', 131, 56, -1, FALSE, '`CASH`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CASH->Sortable = TRUE; // Allow sort
		$this->CASH->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['CASH'] = &$this->CASH;

		// NEFT
		$this->NEFT = new DbField('view_dashboard_summary_payment_mode', 'view_dashboard_summary_payment_mode', 'x_NEFT', 'NEFT', '`NEFT`', '`NEFT`', 131, 56, -1, FALSE, '`NEFT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NEFT->Sortable = TRUE; // Allow sort
		$this->NEFT->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['NEFT'] = &$this->NEFT;

		// PAYTM
		$this->PAYTM = new DbField('view_dashboard_summary_payment_mode', 'view_dashboard_summary_payment_mode', 'x_PAYTM', 'PAYTM', '`PAYTM`', '`PAYTM`', 131, 56, -1, FALSE, '`PAYTM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PAYTM->Sortable = TRUE; // Allow sort
		$this->PAYTM->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PAYTM'] = &$this->PAYTM;

		// CHEQUE
		$this->CHEQUE = new DbField('view_dashboard_summary_payment_mode', 'view_dashboard_summary_payment_mode', 'x_CHEQUE', 'CHEQUE', '`CHEQUE`', '`CHEQUE`', 131, 56, -1, FALSE, '`CHEQUE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CHEQUE->Sortable = TRUE; // Allow sort
		$this->CHEQUE->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['CHEQUE'] = &$this->CHEQUE;

		// RTGS
		$this->RTGS = new DbField('view_dashboard_summary_payment_mode', 'view_dashboard_summary_payment_mode', 'x_RTGS', 'RTGS', '`RTGS`', '`RTGS`', 131, 56, -1, FALSE, '`RTGS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RTGS->Sortable = TRUE; // Allow sort
		$this->RTGS->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['RTGS'] = &$this->RTGS;

		// NotSelected
		$this->NotSelected = new DbField('view_dashboard_summary_payment_mode', 'view_dashboard_summary_payment_mode', 'x_NotSelected', 'NotSelected', '`NotSelected`', '`NotSelected`', 131, 56, -1, FALSE, '`NotSelected`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NotSelected->Sortable = TRUE; // Allow sort
		$this->NotSelected->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['NotSelected'] = &$this->NotSelected;

		// Total
		$this->Total = new DbField('view_dashboard_summary_payment_mode', 'view_dashboard_summary_payment_mode', 'x_Total', 'Total', '`Total`', '`Total`', 131, 56, -1, FALSE, '`Total`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Total->Sortable = TRUE; // Allow sort
		$this->Total->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Total'] = &$this->Total;

		// REFUND
		$this->REFUND = new DbField('view_dashboard_summary_payment_mode', 'view_dashboard_summary_payment_mode', 'x_REFUND', 'REFUND', '`REFUND`', '`REFUND`', 131, 56, -1, FALSE, '`REFUND`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->REFUND->Sortable = TRUE; // Allow sort
		$this->REFUND->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['REFUND'] = &$this->REFUND;

		// CANCEL
		$this->CANCEL = new DbField('view_dashboard_summary_payment_mode', 'view_dashboard_summary_payment_mode', 'x_CANCEL', 'CANCEL', '`CANCEL`', '`CANCEL`', 131, 56, -1, FALSE, '`CANCEL`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CANCEL->Sortable = TRUE; // Allow sort
		$this->CANCEL->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['CANCEL'] = &$this->CANCEL;

		// HospID
		$this->HospID = new DbField('view_dashboard_summary_payment_mode', 'view_dashboard_summary_payment_mode', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->IsForeignKey = TRUE; // Foreign key field
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->Lookup = new Lookup('HospID', 'hospital', FALSE, 'id', ["hospital","","",""], [], [], [], [], [], [], '', '');
		$this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HospID'] = &$this->HospID;

		// BillType
		$this->BillType = new DbField('view_dashboard_summary_payment_mode', 'view_dashboard_summary_payment_mode', 'x_BillType', 'BillType', '`BillType`', '`BillType`', 200, 8, -1, FALSE, '`BillType`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BillType->Nullable = FALSE; // NOT NULL field
		$this->BillType->Required = TRUE; // Required field
		$this->BillType->Sortable = TRUE; // Allow sort
		$this->fields['BillType'] = &$this->BillType;

		// AdjAdvance
		$this->AdjAdvance = new DbField('view_dashboard_summary_payment_mode', 'view_dashboard_summary_payment_mode', 'x_AdjAdvance', 'AdjAdvance', '`AdjAdvance`', '`AdjAdvance`', 131, 56, -1, FALSE, '`AdjAdvance`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AdjAdvance->Sortable = TRUE; // Allow sort
		$this->AdjAdvance->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['AdjAdvance'] = &$this->AdjAdvance;
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

	// Current detail table name
	public function getCurrentDetailTable()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_DETAIL_TABLE")];
	}
	public function setCurrentDetailTable($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_DETAIL_TABLE")] = $v;
	}

	// Get detail url
	public function getDetailUrl()
	{

		// Detail url
		$detailUrl = "";
		if ($this->getCurrentDetailTable() == "view_dashboard_collection_details") {
			$detailUrl = $GLOBALS["view_dashboard_collection_details"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_createddate=" . urlencode($this->createddate->CurrentValue);
			$detailUrl .= "&fk_HospID=" . urlencode($this->HospID->CurrentValue);
			$detailUrl .= "&fk_UserName=" . urlencode($this->UserName->CurrentValue);
		}
		if ($detailUrl == "")
			$detailUrl = "view_dashboard_summary_payment_modelist.php";
		return $detailUrl;
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_dashboard_summary_payment_mode`";
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
		$this->TableFilter = "`HospID`='".HospitalID()."'";
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
		return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : "`createddate` DESC";
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
		$this->createddate->DbValue = $row['createddate'];
		$this->UserName->DbValue = $row['UserName'];
		$this->CARD->DbValue = $row['CARD'];
		$this->CASH->DbValue = $row['CASH'];
		$this->NEFT->DbValue = $row['NEFT'];
		$this->PAYTM->DbValue = $row['PAYTM'];
		$this->CHEQUE->DbValue = $row['CHEQUE'];
		$this->RTGS->DbValue = $row['RTGS'];
		$this->NotSelected->DbValue = $row['NotSelected'];
		$this->Total->DbValue = $row['Total'];
		$this->REFUND->DbValue = $row['REFUND'];
		$this->CANCEL->DbValue = $row['CANCEL'];
		$this->HospID->DbValue = $row['HospID'];
		$this->BillType->DbValue = $row['BillType'];
		$this->AdjAdvance->DbValue = $row['AdjAdvance'];
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
			return "view_dashboard_summary_payment_modelist.php";
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
		if ($pageName == "view_dashboard_summary_payment_modeview.php")
			return $Language->phrase("View");
		elseif ($pageName == "view_dashboard_summary_payment_modeedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "view_dashboard_summary_payment_modeadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "view_dashboard_summary_payment_modelist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("view_dashboard_summary_payment_modeview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_dashboard_summary_payment_modeview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "view_dashboard_summary_payment_modeadd.php?" . $this->getUrlParm($parm);
		else
			$url = "view_dashboard_summary_payment_modeadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("view_dashboard_summary_payment_modeedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("view_dashboard_summary_payment_modeadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("view_dashboard_summary_payment_modedelete.php", $this->getUrlParm());
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
		$this->createddate->setDbValue($rs->fields('createddate'));
		$this->UserName->setDbValue($rs->fields('UserName'));
		$this->CARD->setDbValue($rs->fields('CARD'));
		$this->CASH->setDbValue($rs->fields('CASH'));
		$this->NEFT->setDbValue($rs->fields('NEFT'));
		$this->PAYTM->setDbValue($rs->fields('PAYTM'));
		$this->CHEQUE->setDbValue($rs->fields('CHEQUE'));
		$this->RTGS->setDbValue($rs->fields('RTGS'));
		$this->NotSelected->setDbValue($rs->fields('NotSelected'));
		$this->Total->setDbValue($rs->fields('Total'));
		$this->REFUND->setDbValue($rs->fields('REFUND'));
		$this->CANCEL->setDbValue($rs->fields('CANCEL'));
		$this->HospID->setDbValue($rs->fields('HospID'));
		$this->BillType->setDbValue($rs->fields('BillType'));
		$this->AdjAdvance->setDbValue($rs->fields('AdjAdvance'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// createddate
		// UserName
		// CARD
		// CASH
		// NEFT
		// PAYTM
		// CHEQUE
		// RTGS
		// NotSelected
		// Total
		// REFUND
		// CANCEL
		// HospID
		// BillType
		// AdjAdvance
		// createddate

		$this->createddate->ViewValue = $this->createddate->CurrentValue;
		$this->createddate->ViewValue = FormatDateTime($this->createddate->ViewValue, 7);
		$this->createddate->ViewCustomAttributes = "";

		// UserName
		$this->UserName->ViewValue = $this->UserName->CurrentValue;
		$this->UserName->ViewCustomAttributes = "";

		// CARD
		$this->CARD->ViewValue = $this->CARD->CurrentValue;
		$this->CARD->ViewValue = FormatNumber($this->CARD->ViewValue, 2, -2, -2, -2);
		$this->CARD->ViewCustomAttributes = "";

		// CASH
		$this->CASH->ViewValue = $this->CASH->CurrentValue;
		$this->CASH->ViewValue = FormatNumber($this->CASH->ViewValue, 2, -2, -2, -2);
		$this->CASH->ViewCustomAttributes = "";

		// NEFT
		$this->NEFT->ViewValue = $this->NEFT->CurrentValue;
		$this->NEFT->ViewValue = FormatNumber($this->NEFT->ViewValue, 2, -2, -2, -2);
		$this->NEFT->ViewCustomAttributes = "";

		// PAYTM
		$this->PAYTM->ViewValue = $this->PAYTM->CurrentValue;
		$this->PAYTM->ViewValue = FormatNumber($this->PAYTM->ViewValue, 2, -2, -2, -2);
		$this->PAYTM->ViewCustomAttributes = "";

		// CHEQUE
		$this->CHEQUE->ViewValue = $this->CHEQUE->CurrentValue;
		$this->CHEQUE->ViewValue = FormatNumber($this->CHEQUE->ViewValue, 2, -2, -2, -2);
		$this->CHEQUE->ViewCustomAttributes = "";

		// RTGS
		$this->RTGS->ViewValue = $this->RTGS->CurrentValue;
		$this->RTGS->ViewValue = FormatNumber($this->RTGS->ViewValue, 2, -2, -2, -2);
		$this->RTGS->ViewCustomAttributes = "";

		// NotSelected
		$this->NotSelected->ViewValue = $this->NotSelected->CurrentValue;
		$this->NotSelected->ViewValue = FormatNumber($this->NotSelected->ViewValue, 2, -2, -2, -2);
		$this->NotSelected->ViewCustomAttributes = "";

		// Total
		$this->Total->ViewValue = $this->Total->CurrentValue;
		$this->Total->ViewValue = FormatNumber($this->Total->ViewValue, 2, -2, -2, -2);
		$this->Total->ViewCustomAttributes = "";

		// REFUND
		$this->REFUND->ViewValue = $this->REFUND->CurrentValue;
		$this->REFUND->ViewValue = FormatNumber($this->REFUND->ViewValue, 2, -2, -2, -2);
		$this->REFUND->ViewCustomAttributes = "";

		// CANCEL
		$this->CANCEL->ViewValue = $this->CANCEL->CurrentValue;
		$this->CANCEL->ViewValue = FormatNumber($this->CANCEL->ViewValue, 2, -2, -2, -2);
		$this->CANCEL->ViewCustomAttributes = "";

		// HospID
		$this->HospID->ViewValue = $this->HospID->CurrentValue;
		$curVal = strval($this->HospID->CurrentValue);
		if ($curVal != "") {
			$this->HospID->ViewValue = $this->HospID->lookupCacheOption($curVal);
			if ($this->HospID->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->HospID->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->HospID->ViewValue = $this->HospID->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->HospID->ViewValue = $this->HospID->CurrentValue;
				}
			}
		} else {
			$this->HospID->ViewValue = NULL;
		}
		$this->HospID->ViewCustomAttributes = "";

		// BillType
		$this->BillType->ViewValue = $this->BillType->CurrentValue;
		$this->BillType->ViewCustomAttributes = "";

		// AdjAdvance
		$this->AdjAdvance->ViewValue = $this->AdjAdvance->CurrentValue;
		$this->AdjAdvance->ViewValue = FormatNumber($this->AdjAdvance->ViewValue, 2, -2, -2, -2);
		$this->AdjAdvance->ViewCustomAttributes = "";

		// createddate
		$this->createddate->LinkCustomAttributes = "";
		$this->createddate->HrefValue = "";
		$this->createddate->TooltipValue = "";

		// UserName
		$this->UserName->LinkCustomAttributes = "";
		$this->UserName->HrefValue = "";
		$this->UserName->TooltipValue = "";

		// CARD
		$this->CARD->LinkCustomAttributes = "";
		$this->CARD->HrefValue = "";
		$this->CARD->TooltipValue = "";

		// CASH
		$this->CASH->LinkCustomAttributes = "";
		$this->CASH->HrefValue = "";
		$this->CASH->TooltipValue = "";

		// NEFT
		$this->NEFT->LinkCustomAttributes = "";
		$this->NEFT->HrefValue = "";
		$this->NEFT->TooltipValue = "";

		// PAYTM
		$this->PAYTM->LinkCustomAttributes = "";
		$this->PAYTM->HrefValue = "";
		$this->PAYTM->TooltipValue = "";

		// CHEQUE
		$this->CHEQUE->LinkCustomAttributes = "";
		$this->CHEQUE->HrefValue = "";
		$this->CHEQUE->TooltipValue = "";

		// RTGS
		$this->RTGS->LinkCustomAttributes = "";
		$this->RTGS->HrefValue = "";
		$this->RTGS->TooltipValue = "";

		// NotSelected
		$this->NotSelected->LinkCustomAttributes = "";
		$this->NotSelected->HrefValue = "";
		$this->NotSelected->TooltipValue = "";

		// Total
		$this->Total->LinkCustomAttributes = "";
		$this->Total->HrefValue = "";
		$this->Total->TooltipValue = "";

		// REFUND
		$this->REFUND->LinkCustomAttributes = "";
		$this->REFUND->HrefValue = "";
		$this->REFUND->TooltipValue = "";

		// CANCEL
		$this->CANCEL->LinkCustomAttributes = "";
		$this->CANCEL->HrefValue = "";
		$this->CANCEL->TooltipValue = "";

		// HospID
		$this->HospID->LinkCustomAttributes = "";
		$this->HospID->HrefValue = "";
		$this->HospID->TooltipValue = "";

		// BillType
		$this->BillType->LinkCustomAttributes = "";
		$this->BillType->HrefValue = "";
		$this->BillType->TooltipValue = "";

		// AdjAdvance
		$this->AdjAdvance->LinkCustomAttributes = "";
		$this->AdjAdvance->HrefValue = "";
		$this->AdjAdvance->TooltipValue = "";

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

		// createddate
		$this->createddate->EditAttrs["class"] = "form-control";
		$this->createddate->EditCustomAttributes = "";
		$this->createddate->EditValue = FormatDateTime($this->createddate->CurrentValue, 7);
		$this->createddate->PlaceHolder = RemoveHtml($this->createddate->caption());

		// UserName
		$this->UserName->EditAttrs["class"] = "form-control";
		$this->UserName->EditCustomAttributes = "";
		if (!$this->UserName->Raw)
			$this->UserName->CurrentValue = HtmlDecode($this->UserName->CurrentValue);
		$this->UserName->EditValue = $this->UserName->CurrentValue;
		$this->UserName->PlaceHolder = RemoveHtml($this->UserName->caption());

		// CARD
		$this->CARD->EditAttrs["class"] = "form-control";
		$this->CARD->EditCustomAttributes = "";
		$this->CARD->EditValue = $this->CARD->CurrentValue;
		$this->CARD->PlaceHolder = RemoveHtml($this->CARD->caption());
		if (strval($this->CARD->EditValue) != "" && is_numeric($this->CARD->EditValue))
			$this->CARD->EditValue = FormatNumber($this->CARD->EditValue, -2, -2, -2, -2);
		

		// CASH
		$this->CASH->EditAttrs["class"] = "form-control";
		$this->CASH->EditCustomAttributes = "";
		$this->CASH->EditValue = $this->CASH->CurrentValue;
		$this->CASH->PlaceHolder = RemoveHtml($this->CASH->caption());
		if (strval($this->CASH->EditValue) != "" && is_numeric($this->CASH->EditValue))
			$this->CASH->EditValue = FormatNumber($this->CASH->EditValue, -2, -2, -2, -2);
		

		// NEFT
		$this->NEFT->EditAttrs["class"] = "form-control";
		$this->NEFT->EditCustomAttributes = "";
		$this->NEFT->EditValue = $this->NEFT->CurrentValue;
		$this->NEFT->PlaceHolder = RemoveHtml($this->NEFT->caption());
		if (strval($this->NEFT->EditValue) != "" && is_numeric($this->NEFT->EditValue))
			$this->NEFT->EditValue = FormatNumber($this->NEFT->EditValue, -2, -2, -2, -2);
		

		// PAYTM
		$this->PAYTM->EditAttrs["class"] = "form-control";
		$this->PAYTM->EditCustomAttributes = "";
		$this->PAYTM->EditValue = $this->PAYTM->CurrentValue;
		$this->PAYTM->PlaceHolder = RemoveHtml($this->PAYTM->caption());
		if (strval($this->PAYTM->EditValue) != "" && is_numeric($this->PAYTM->EditValue))
			$this->PAYTM->EditValue = FormatNumber($this->PAYTM->EditValue, -2, -2, -2, -2);
		

		// CHEQUE
		$this->CHEQUE->EditAttrs["class"] = "form-control";
		$this->CHEQUE->EditCustomAttributes = "";
		$this->CHEQUE->EditValue = $this->CHEQUE->CurrentValue;
		$this->CHEQUE->PlaceHolder = RemoveHtml($this->CHEQUE->caption());
		if (strval($this->CHEQUE->EditValue) != "" && is_numeric($this->CHEQUE->EditValue))
			$this->CHEQUE->EditValue = FormatNumber($this->CHEQUE->EditValue, -2, -2, -2, -2);
		

		// RTGS
		$this->RTGS->EditAttrs["class"] = "form-control";
		$this->RTGS->EditCustomAttributes = "";
		$this->RTGS->EditValue = $this->RTGS->CurrentValue;
		$this->RTGS->PlaceHolder = RemoveHtml($this->RTGS->caption());
		if (strval($this->RTGS->EditValue) != "" && is_numeric($this->RTGS->EditValue))
			$this->RTGS->EditValue = FormatNumber($this->RTGS->EditValue, -2, -2, -2, -2);
		

		// NotSelected
		$this->NotSelected->EditAttrs["class"] = "form-control";
		$this->NotSelected->EditCustomAttributes = "";
		$this->NotSelected->EditValue = $this->NotSelected->CurrentValue;
		$this->NotSelected->PlaceHolder = RemoveHtml($this->NotSelected->caption());
		if (strval($this->NotSelected->EditValue) != "" && is_numeric($this->NotSelected->EditValue))
			$this->NotSelected->EditValue = FormatNumber($this->NotSelected->EditValue, -2, -2, -2, -2);
		

		// Total
		$this->Total->EditAttrs["class"] = "form-control";
		$this->Total->EditCustomAttributes = "";
		$this->Total->EditValue = $this->Total->CurrentValue;
		$this->Total->PlaceHolder = RemoveHtml($this->Total->caption());
		if (strval($this->Total->EditValue) != "" && is_numeric($this->Total->EditValue))
			$this->Total->EditValue = FormatNumber($this->Total->EditValue, -2, -2, -2, -2);
		

		// REFUND
		$this->REFUND->EditAttrs["class"] = "form-control";
		$this->REFUND->EditCustomAttributes = "";
		$this->REFUND->EditValue = $this->REFUND->CurrentValue;
		$this->REFUND->PlaceHolder = RemoveHtml($this->REFUND->caption());
		if (strval($this->REFUND->EditValue) != "" && is_numeric($this->REFUND->EditValue))
			$this->REFUND->EditValue = FormatNumber($this->REFUND->EditValue, -2, -2, -2, -2);
		

		// CANCEL
		$this->CANCEL->EditAttrs["class"] = "form-control";
		$this->CANCEL->EditCustomAttributes = "";
		$this->CANCEL->EditValue = $this->CANCEL->CurrentValue;
		$this->CANCEL->PlaceHolder = RemoveHtml($this->CANCEL->caption());
		if (strval($this->CANCEL->EditValue) != "" && is_numeric($this->CANCEL->EditValue))
			$this->CANCEL->EditValue = FormatNumber($this->CANCEL->EditValue, -2, -2, -2, -2);
		

		// HospID
		$this->HospID->EditAttrs["class"] = "form-control";
		$this->HospID->EditCustomAttributes = "";
		$this->HospID->EditValue = $this->HospID->CurrentValue;
		$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

		// BillType
		$this->BillType->EditAttrs["class"] = "form-control";
		$this->BillType->EditCustomAttributes = "";
		if (!$this->BillType->Raw)
			$this->BillType->CurrentValue = HtmlDecode($this->BillType->CurrentValue);
		$this->BillType->EditValue = $this->BillType->CurrentValue;
		$this->BillType->PlaceHolder = RemoveHtml($this->BillType->caption());

		// AdjAdvance
		$this->AdjAdvance->EditAttrs["class"] = "form-control";
		$this->AdjAdvance->EditCustomAttributes = "";
		$this->AdjAdvance->EditValue = $this->AdjAdvance->CurrentValue;
		$this->AdjAdvance->PlaceHolder = RemoveHtml($this->AdjAdvance->caption());
		if (strval($this->AdjAdvance->EditValue) != "" && is_numeric($this->AdjAdvance->EditValue))
			$this->AdjAdvance->EditValue = FormatNumber($this->AdjAdvance->EditValue, -2, -2, -2, -2);
		

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
					$doc->exportCaption($this->createddate);
					$doc->exportCaption($this->UserName);
					$doc->exportCaption($this->CARD);
					$doc->exportCaption($this->CASH);
					$doc->exportCaption($this->NEFT);
					$doc->exportCaption($this->PAYTM);
					$doc->exportCaption($this->CHEQUE);
					$doc->exportCaption($this->RTGS);
					$doc->exportCaption($this->NotSelected);
					$doc->exportCaption($this->Total);
					$doc->exportCaption($this->REFUND);
					$doc->exportCaption($this->CANCEL);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->BillType);
					$doc->exportCaption($this->AdjAdvance);
				} else {
					$doc->exportCaption($this->createddate);
					$doc->exportCaption($this->UserName);
					$doc->exportCaption($this->CARD);
					$doc->exportCaption($this->CASH);
					$doc->exportCaption($this->NEFT);
					$doc->exportCaption($this->PAYTM);
					$doc->exportCaption($this->CHEQUE);
					$doc->exportCaption($this->RTGS);
					$doc->exportCaption($this->NotSelected);
					$doc->exportCaption($this->Total);
					$doc->exportCaption($this->REFUND);
					$doc->exportCaption($this->CANCEL);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->BillType);
					$doc->exportCaption($this->AdjAdvance);
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
						$doc->exportField($this->createddate);
						$doc->exportField($this->UserName);
						$doc->exportField($this->CARD);
						$doc->exportField($this->CASH);
						$doc->exportField($this->NEFT);
						$doc->exportField($this->PAYTM);
						$doc->exportField($this->CHEQUE);
						$doc->exportField($this->RTGS);
						$doc->exportField($this->NotSelected);
						$doc->exportField($this->Total);
						$doc->exportField($this->REFUND);
						$doc->exportField($this->CANCEL);
						$doc->exportField($this->HospID);
						$doc->exportField($this->BillType);
						$doc->exportField($this->AdjAdvance);
					} else {
						$doc->exportField($this->createddate);
						$doc->exportField($this->UserName);
						$doc->exportField($this->CARD);
						$doc->exportField($this->CASH);
						$doc->exportField($this->NEFT);
						$doc->exportField($this->PAYTM);
						$doc->exportField($this->CHEQUE);
						$doc->exportField($this->RTGS);
						$doc->exportField($this->NotSelected);
						$doc->exportField($this->Total);
						$doc->exportField($this->REFUND);
						$doc->exportField($this->CANCEL);
						$doc->exportField($this->HospID);
						$doc->exportField($this->BillType);
						$doc->exportField($this->AdjAdvance);
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