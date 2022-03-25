<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for view_pharmacy_report_supplier_ledger
 */
class view_pharmacy_report_supplier_ledger extends DbTable
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
	public $Date;
	public $SupplierName;
	public $RefNo;
	public $Particulars;
	public $Debit;
	public $Credit;
	public $Balance;
	public $ClBalance;
	public $Pid;
	public $PaymentNo;
	public $HospID;
	public $BRCODE;
	public $IOrder;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'view_pharmacy_report_supplier_ledger';
		$this->TableName = 'view_pharmacy_report_supplier_ledger';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`view_pharmacy_report_supplier_ledger`";
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

		// Date
		$this->Date = new DbField('view_pharmacy_report_supplier_ledger', 'view_pharmacy_report_supplier_ledger', 'x_Date', 'Date', '`Date`', '`Date`', 200, -1, FALSE, '`Date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Date->Sortable = TRUE; // Allow sort
		$this->fields['Date'] = &$this->Date;

		// SupplierName
		$this->SupplierName = new DbField('view_pharmacy_report_supplier_ledger', 'view_pharmacy_report_supplier_ledger', 'x_SupplierName', 'SupplierName', '`SupplierName`', '`SupplierName`', 200, -1, FALSE, '`SupplierName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SupplierName->Sortable = TRUE; // Allow sort
		$this->fields['SupplierName'] = &$this->SupplierName;

		// RefNo
		$this->RefNo = new DbField('view_pharmacy_report_supplier_ledger', 'view_pharmacy_report_supplier_ledger', 'x_RefNo', 'RefNo', '`RefNo`', '`RefNo`', 200, -1, FALSE, '`RefNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RefNo->Sortable = TRUE; // Allow sort
		$this->fields['RefNo'] = &$this->RefNo;

		// Particulars
		$this->Particulars = new DbField('view_pharmacy_report_supplier_ledger', 'view_pharmacy_report_supplier_ledger', 'x_Particulars', 'Particulars', '`Particulars`', '`Particulars`', 200, -1, FALSE, '`Particulars`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Particulars->Sortable = TRUE; // Allow sort
		$this->fields['Particulars'] = &$this->Particulars;

		// Debit
		$this->Debit = new DbField('view_pharmacy_report_supplier_ledger', 'view_pharmacy_report_supplier_ledger', 'x_Debit', 'Debit', '`Debit`', '`Debit`', 200, -1, FALSE, '`Debit`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Debit->Sortable = TRUE; // Allow sort
		$this->fields['Debit'] = &$this->Debit;

		// Credit
		$this->Credit = new DbField('view_pharmacy_report_supplier_ledger', 'view_pharmacy_report_supplier_ledger', 'x_Credit', 'Credit', '`Credit`', '`Credit`', 200, -1, FALSE, '`Credit`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Credit->Sortable = TRUE; // Allow sort
		$this->fields['Credit'] = &$this->Credit;

		// Balance
		$this->Balance = new DbField('view_pharmacy_report_supplier_ledger', 'view_pharmacy_report_supplier_ledger', 'x_Balance', 'Balance', '`Balance`', '`Balance`', 200, -1, FALSE, '`Balance`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Balance->Sortable = TRUE; // Allow sort
		$this->fields['Balance'] = &$this->Balance;

		// ClBalance
		$this->ClBalance = new DbField('view_pharmacy_report_supplier_ledger', 'view_pharmacy_report_supplier_ledger', 'x_ClBalance', 'ClBalance', '`ClBalance`', '`ClBalance`', 200, -1, FALSE, '`ClBalance`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ClBalance->Sortable = TRUE; // Allow sort
		$this->fields['ClBalance'] = &$this->ClBalance;

		// Pid
		$this->Pid = new DbField('view_pharmacy_report_supplier_ledger', 'view_pharmacy_report_supplier_ledger', 'x_Pid', 'Pid', '`Pid`', '`Pid`', 3, -1, FALSE, '`Pid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Pid->Sortable = TRUE; // Allow sort
		$this->Pid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Pid'] = &$this->Pid;

		// PaymentNo
		$this->PaymentNo = new DbField('view_pharmacy_report_supplier_ledger', 'view_pharmacy_report_supplier_ledger', 'x_PaymentNo', 'PaymentNo', '`PaymentNo`', '`PaymentNo`', 200, -1, FALSE, '`PaymentNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PaymentNo->Sortable = TRUE; // Allow sort
		$this->fields['PaymentNo'] = &$this->PaymentNo;

		// HospID
		$this->HospID = new DbField('view_pharmacy_report_supplier_ledger', 'view_pharmacy_report_supplier_ledger', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = FALSE; // Allow sort
		$this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HospID'] = &$this->HospID;

		// BRCODE
		$this->BRCODE = new DbField('view_pharmacy_report_supplier_ledger', 'view_pharmacy_report_supplier_ledger', 'x_BRCODE', 'BRCODE', '`BRCODE`', '`BRCODE`', 3, -1, FALSE, '`BRCODE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BRCODE->Sortable = FALSE; // Allow sort
		$this->BRCODE->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['BRCODE'] = &$this->BRCODE;

		// IOrder
		$this->IOrder = new DbField('view_pharmacy_report_supplier_ledger', 'view_pharmacy_report_supplier_ledger', 'x_IOrder', 'IOrder', '`IOrder`', '`IOrder`', 200, -1, FALSE, '`IOrder`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IOrder->Nullable = FALSE; // NOT NULL field
		$this->IOrder->Required = TRUE; // Required field
		$this->IOrder->Sortable = TRUE; // Allow sort
		$this->fields['IOrder'] = &$this->IOrder;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`view_pharmacy_report_supplier_ledger`";
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
		$this->TableFilter = "`HospID`='".HospitalID()."'  and  `BRCODE`='".PharmacyID()."'";
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
		$this->Date->DbValue = $row['Date'];
		$this->SupplierName->DbValue = $row['SupplierName'];
		$this->RefNo->DbValue = $row['RefNo'];
		$this->Particulars->DbValue = $row['Particulars'];
		$this->Debit->DbValue = $row['Debit'];
		$this->Credit->DbValue = $row['Credit'];
		$this->Balance->DbValue = $row['Balance'];
		$this->ClBalance->DbValue = $row['ClBalance'];
		$this->Pid->DbValue = $row['Pid'];
		$this->PaymentNo->DbValue = $row['PaymentNo'];
		$this->HospID->DbValue = $row['HospID'];
		$this->BRCODE->DbValue = $row['BRCODE'];
		$this->IOrder->DbValue = $row['IOrder'];
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
		$name = PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_RETURN_URL;

		// Get referer URL automatically
		if (ServerVar("HTTP_REFERER") <> "" && ReferPageName() <> CurrentPageName() && ReferPageName() <> "login.php") // Referer not same page or login page
			$_SESSION[$name] = ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] <> "") {
			return $_SESSION[$name];
		} else {
			return "view_pharmacy_report_supplier_ledgerlist.php";
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
		if ($pageName == "view_pharmacy_report_supplier_ledgerview.php")
			return $Language->phrase("View");
		elseif ($pageName == "view_pharmacy_report_supplier_ledgeredit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "view_pharmacy_report_supplier_ledgeradd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "view_pharmacy_report_supplier_ledgerlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("view_pharmacy_report_supplier_ledgerview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_pharmacy_report_supplier_ledgerview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "view_pharmacy_report_supplier_ledgeradd.php?" . $this->getUrlParm($parm);
		else
			$url = "view_pharmacy_report_supplier_ledgeradd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("view_pharmacy_report_supplier_ledgeredit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("view_pharmacy_report_supplier_ledgeradd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("view_pharmacy_report_supplier_ledgerdelete.php", $this->getUrlParm());
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
		if ($parm <> "")
			$url .= $parm . "&";
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

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = array();
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
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
		$this->Date->setDbValue($rs->fields('Date'));
		$this->SupplierName->setDbValue($rs->fields('SupplierName'));
		$this->RefNo->setDbValue($rs->fields('RefNo'));
		$this->Particulars->setDbValue($rs->fields('Particulars'));
		$this->Debit->setDbValue($rs->fields('Debit'));
		$this->Credit->setDbValue($rs->fields('Credit'));
		$this->Balance->setDbValue($rs->fields('Balance'));
		$this->ClBalance->setDbValue($rs->fields('ClBalance'));
		$this->Pid->setDbValue($rs->fields('Pid'));
		$this->PaymentNo->setDbValue($rs->fields('PaymentNo'));
		$this->HospID->setDbValue($rs->fields('HospID'));
		$this->BRCODE->setDbValue($rs->fields('BRCODE'));
		$this->IOrder->setDbValue($rs->fields('IOrder'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// Date
		// SupplierName
		// RefNo
		// Particulars
		// Debit
		// Credit
		// Balance
		// ClBalance
		// Pid
		// PaymentNo
		// HospID
		// BRCODE
		// IOrder
		// Date

		$this->Date->ViewValue = $this->Date->CurrentValue;
		$this->Date->ViewCustomAttributes = "";

		// SupplierName
		$this->SupplierName->ViewValue = $this->SupplierName->CurrentValue;
		$this->SupplierName->ViewCustomAttributes = "";

		// RefNo
		$this->RefNo->ViewValue = $this->RefNo->CurrentValue;
		$this->RefNo->ViewCustomAttributes = "";

		// Particulars
		$this->Particulars->ViewValue = $this->Particulars->CurrentValue;
		$this->Particulars->ViewCustomAttributes = "";

		// Debit
		$this->Debit->ViewValue = $this->Debit->CurrentValue;
		$this->Debit->ViewCustomAttributes = "";

		// Credit
		$this->Credit->ViewValue = $this->Credit->CurrentValue;
		$this->Credit->ViewCustomAttributes = "";

		// Balance
		$this->Balance->ViewValue = $this->Balance->CurrentValue;
		$this->Balance->ViewCustomAttributes = "";

		// ClBalance
		$this->ClBalance->ViewValue = $this->ClBalance->CurrentValue;
		$this->ClBalance->ViewCustomAttributes = "";

		// Pid
		$this->Pid->ViewValue = $this->Pid->CurrentValue;
		$this->Pid->ViewValue = FormatNumber($this->Pid->ViewValue, 0, -2, -2, -2);
		$this->Pid->ViewCustomAttributes = "";

		// PaymentNo
		$this->PaymentNo->ViewValue = $this->PaymentNo->CurrentValue;
		$this->PaymentNo->ViewCustomAttributes = "";

		// HospID
		$this->HospID->ViewValue = $this->HospID->CurrentValue;
		$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
		$this->HospID->ViewCustomAttributes = "";

		// BRCODE
		$this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
		$this->BRCODE->ViewValue = FormatNumber($this->BRCODE->ViewValue, 0, -2, -2, -2);
		$this->BRCODE->ViewCustomAttributes = "";

		// IOrder
		$this->IOrder->ViewValue = $this->IOrder->CurrentValue;
		$this->IOrder->ViewCustomAttributes = "";

		// Date
		$this->Date->LinkCustomAttributes = "";
		$this->Date->HrefValue = "";
		$this->Date->TooltipValue = "";

		// SupplierName
		$this->SupplierName->LinkCustomAttributes = "";
		$this->SupplierName->HrefValue = "";
		$this->SupplierName->TooltipValue = "";

		// RefNo
		$this->RefNo->LinkCustomAttributes = "";
		$this->RefNo->HrefValue = "";
		$this->RefNo->TooltipValue = "";

		// Particulars
		$this->Particulars->LinkCustomAttributes = "";
		$this->Particulars->HrefValue = "";
		$this->Particulars->TooltipValue = "";

		// Debit
		$this->Debit->LinkCustomAttributes = "";
		$this->Debit->HrefValue = "";
		$this->Debit->TooltipValue = "";

		// Credit
		$this->Credit->LinkCustomAttributes = "";
		$this->Credit->HrefValue = "";
		$this->Credit->TooltipValue = "";

		// Balance
		$this->Balance->LinkCustomAttributes = "";
		$this->Balance->HrefValue = "";
		$this->Balance->TooltipValue = "";

		// ClBalance
		$this->ClBalance->LinkCustomAttributes = "";
		$this->ClBalance->HrefValue = "";
		$this->ClBalance->TooltipValue = "";

		// Pid
		$this->Pid->LinkCustomAttributes = "";
		$this->Pid->HrefValue = "";
		$this->Pid->TooltipValue = "";

		// PaymentNo
		$this->PaymentNo->LinkCustomAttributes = "";
		$this->PaymentNo->HrefValue = "";
		$this->PaymentNo->TooltipValue = "";

		// HospID
		$this->HospID->LinkCustomAttributes = "";
		$this->HospID->HrefValue = "";
		$this->HospID->TooltipValue = "";

		// BRCODE
		$this->BRCODE->LinkCustomAttributes = "";
		$this->BRCODE->HrefValue = "";
		$this->BRCODE->TooltipValue = "";

		// IOrder
		$this->IOrder->LinkCustomAttributes = "";
		$this->IOrder->HrefValue = "";
		$this->IOrder->TooltipValue = "";

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

		// Date
		$this->Date->EditAttrs["class"] = "form-control";
		$this->Date->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Date->CurrentValue = HtmlDecode($this->Date->CurrentValue);
		$this->Date->EditValue = $this->Date->CurrentValue;
		$this->Date->PlaceHolder = RemoveHtml($this->Date->caption());

		// SupplierName
		$this->SupplierName->EditAttrs["class"] = "form-control";
		$this->SupplierName->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->SupplierName->CurrentValue = HtmlDecode($this->SupplierName->CurrentValue);
		$this->SupplierName->EditValue = $this->SupplierName->CurrentValue;
		$this->SupplierName->PlaceHolder = RemoveHtml($this->SupplierName->caption());

		// RefNo
		$this->RefNo->EditAttrs["class"] = "form-control";
		$this->RefNo->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->RefNo->CurrentValue = HtmlDecode($this->RefNo->CurrentValue);
		$this->RefNo->EditValue = $this->RefNo->CurrentValue;
		$this->RefNo->PlaceHolder = RemoveHtml($this->RefNo->caption());

		// Particulars
		$this->Particulars->EditAttrs["class"] = "form-control";
		$this->Particulars->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Particulars->CurrentValue = HtmlDecode($this->Particulars->CurrentValue);
		$this->Particulars->EditValue = $this->Particulars->CurrentValue;
		$this->Particulars->PlaceHolder = RemoveHtml($this->Particulars->caption());

		// Debit
		$this->Debit->EditAttrs["class"] = "form-control";
		$this->Debit->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Debit->CurrentValue = HtmlDecode($this->Debit->CurrentValue);
		$this->Debit->EditValue = $this->Debit->CurrentValue;
		$this->Debit->PlaceHolder = RemoveHtml($this->Debit->caption());

		// Credit
		$this->Credit->EditAttrs["class"] = "form-control";
		$this->Credit->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Credit->CurrentValue = HtmlDecode($this->Credit->CurrentValue);
		$this->Credit->EditValue = $this->Credit->CurrentValue;
		$this->Credit->PlaceHolder = RemoveHtml($this->Credit->caption());

		// Balance
		$this->Balance->EditAttrs["class"] = "form-control";
		$this->Balance->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Balance->CurrentValue = HtmlDecode($this->Balance->CurrentValue);
		$this->Balance->EditValue = $this->Balance->CurrentValue;
		$this->Balance->PlaceHolder = RemoveHtml($this->Balance->caption());

		// ClBalance
		$this->ClBalance->EditAttrs["class"] = "form-control";
		$this->ClBalance->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ClBalance->CurrentValue = HtmlDecode($this->ClBalance->CurrentValue);
		$this->ClBalance->EditValue = $this->ClBalance->CurrentValue;
		$this->ClBalance->PlaceHolder = RemoveHtml($this->ClBalance->caption());

		// Pid
		$this->Pid->EditAttrs["class"] = "form-control";
		$this->Pid->EditCustomAttributes = "";
		$this->Pid->EditValue = $this->Pid->CurrentValue;
		$this->Pid->PlaceHolder = RemoveHtml($this->Pid->caption());

		// PaymentNo
		$this->PaymentNo->EditAttrs["class"] = "form-control";
		$this->PaymentNo->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PaymentNo->CurrentValue = HtmlDecode($this->PaymentNo->CurrentValue);
		$this->PaymentNo->EditValue = $this->PaymentNo->CurrentValue;
		$this->PaymentNo->PlaceHolder = RemoveHtml($this->PaymentNo->caption());

		// HospID
		$this->HospID->EditAttrs["class"] = "form-control";
		$this->HospID->EditCustomAttributes = "";
		$this->HospID->EditValue = $this->HospID->CurrentValue;
		$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

		// BRCODE
		$this->BRCODE->EditAttrs["class"] = "form-control";
		$this->BRCODE->EditCustomAttributes = "";
		$this->BRCODE->EditValue = $this->BRCODE->CurrentValue;
		$this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

		// IOrder
		$this->IOrder->EditAttrs["class"] = "form-control";
		$this->IOrder->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->IOrder->CurrentValue = HtmlDecode($this->IOrder->CurrentValue);
		$this->IOrder->EditValue = $this->IOrder->CurrentValue;
		$this->IOrder->PlaceHolder = RemoveHtml($this->IOrder->caption());

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
					$doc->exportCaption($this->Date);
					$doc->exportCaption($this->SupplierName);
					$doc->exportCaption($this->RefNo);
					$doc->exportCaption($this->Particulars);
					$doc->exportCaption($this->Debit);
					$doc->exportCaption($this->Credit);
					$doc->exportCaption($this->Balance);
					$doc->exportCaption($this->ClBalance);
					$doc->exportCaption($this->Pid);
					$doc->exportCaption($this->PaymentNo);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->BRCODE);
					$doc->exportCaption($this->IOrder);
				} else {
					$doc->exportCaption($this->Date);
					$doc->exportCaption($this->SupplierName);
					$doc->exportCaption($this->RefNo);
					$doc->exportCaption($this->Particulars);
					$doc->exportCaption($this->Debit);
					$doc->exportCaption($this->Credit);
					$doc->exportCaption($this->Balance);
					$doc->exportCaption($this->ClBalance);
					$doc->exportCaption($this->Pid);
					$doc->exportCaption($this->PaymentNo);
					$doc->exportCaption($this->IOrder);
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
						$doc->exportField($this->Date);
						$doc->exportField($this->SupplierName);
						$doc->exportField($this->RefNo);
						$doc->exportField($this->Particulars);
						$doc->exportField($this->Debit);
						$doc->exportField($this->Credit);
						$doc->exportField($this->Balance);
						$doc->exportField($this->ClBalance);
						$doc->exportField($this->Pid);
						$doc->exportField($this->PaymentNo);
						$doc->exportField($this->HospID);
						$doc->exportField($this->BRCODE);
						$doc->exportField($this->IOrder);
					} else {
						$doc->exportField($this->Date);
						$doc->exportField($this->SupplierName);
						$doc->exportField($this->RefNo);
						$doc->exportField($this->Particulars);
						$doc->exportField($this->Debit);
						$doc->exportField($this->Credit);
						$doc->exportField($this->Balance);
						$doc->exportField($this->ClBalance);
						$doc->exportField($this->Pid);
						$doc->exportField($this->PaymentNo);
						$doc->exportField($this->IOrder);
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