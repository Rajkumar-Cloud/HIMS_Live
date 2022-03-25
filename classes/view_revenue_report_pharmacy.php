<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for view_revenue_report_pharmacy
 */
class view_revenue_report_pharmacy extends DbTable
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
	public $DATE;
	public $BillNumber;
	public $PatientId;
	public $_525Tax;
	public $TAXABLE_525;
	public $_1225Tax;
	public $TAXABLE_1225;
	public $_1825Tax;
	public $TAXABLE_1825;
	public $Amount;
	public $ModeofPayment;
	public $Cash;
	public $Card;
	public $DiscountAmount;
	public $DiscountRemarks;
	public $Remarks;
	public $HospID;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'view_revenue_report_pharmacy';
		$this->TableName = 'view_revenue_report_pharmacy';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`view_revenue_report_pharmacy`";
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

		// DATE
		$this->DATE = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x_DATE', 'DATE', '`DATE`', CastDateFieldForLike('`DATE`', 0, "DB"), 133, 0, FALSE, '`DATE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DATE->Sortable = TRUE; // Allow sort
		$this->DATE->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['DATE'] = &$this->DATE;

		// BillNumber
		$this->BillNumber = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x_BillNumber', 'BillNumber', '`BillNumber`', '`BillNumber`', 200, -1, FALSE, '`BillNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BillNumber->Sortable = TRUE; // Allow sort
		$this->fields['BillNumber'] = &$this->BillNumber;

		// PatientId
		$this->PatientId = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x_PatientId', 'PatientId', '`PatientId`', '`PatientId`', 200, -1, FALSE, '`PatientId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientId->Sortable = TRUE; // Allow sort
		$this->fields['PatientId'] = &$this->PatientId;

		// 5%Tax
		$this->_525Tax = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x__525Tax', '5%Tax', '`5%Tax`', '`5%Tax`', 201, -1, FALSE, '`5%Tax`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->_525Tax->Sortable = TRUE; // Allow sort
		$this->fields['5%Tax'] = &$this->_525Tax;

		// TAXABLE 5%
		$this->TAXABLE_525 = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x_TAXABLE_525', 'TAXABLE 5%', '`TAXABLE 5%`', '`TAXABLE 5%`', 200, -1, FALSE, '`TAXABLE 5%`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TAXABLE_525->Sortable = TRUE; // Allow sort
		$this->fields['TAXABLE 5%'] = &$this->TAXABLE_525;

		// 12%Tax
		$this->_1225Tax = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x__1225Tax', '12%Tax', '`12%Tax`', '`12%Tax`', 201, -1, FALSE, '`12%Tax`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->_1225Tax->Sortable = TRUE; // Allow sort
		$this->fields['12%Tax'] = &$this->_1225Tax;

		// TAXABLE 12%
		$this->TAXABLE_1225 = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x_TAXABLE_1225', 'TAXABLE 12%', '`TAXABLE 12%`', '`TAXABLE 12%`', 200, -1, FALSE, '`TAXABLE 12%`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TAXABLE_1225->Sortable = TRUE; // Allow sort
		$this->fields['TAXABLE 12%'] = &$this->TAXABLE_1225;

		// 18%Tax
		$this->_1825Tax = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x__1825Tax', '18%Tax', '`18%Tax`', '`18%Tax`', 201, -1, FALSE, '`18%Tax`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->_1825Tax->Sortable = TRUE; // Allow sort
		$this->fields['18%Tax'] = &$this->_1825Tax;

		// TAXABLE 18%
		$this->TAXABLE_1825 = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x_TAXABLE_1825', 'TAXABLE 18%', '`TAXABLE 18%`', '`TAXABLE 18%`', 200, -1, FALSE, '`TAXABLE 18%`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TAXABLE_1825->Sortable = TRUE; // Allow sort
		$this->fields['TAXABLE 18%'] = &$this->TAXABLE_1825;

		// Amount
		$this->Amount = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x_Amount', 'Amount', '`Amount`', '`Amount`', 131, -1, FALSE, '`Amount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Amount->Sortable = TRUE; // Allow sort
		$this->Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Amount'] = &$this->Amount;

		// ModeofPayment
		$this->ModeofPayment = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x_ModeofPayment', 'ModeofPayment', '`ModeofPayment`', '`ModeofPayment`', 200, -1, FALSE, '`ModeofPayment`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ModeofPayment->Sortable = TRUE; // Allow sort
		$this->fields['ModeofPayment'] = &$this->ModeofPayment;

		// Cash
		$this->Cash = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x_Cash', 'Cash', '`Cash`', '`Cash`', 131, -1, FALSE, '`Cash`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Cash->Sortable = TRUE; // Allow sort
		$this->Cash->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Cash'] = &$this->Cash;

		// Card
		$this->Card = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x_Card', 'Card', '`Card`', '`Card`', 131, -1, FALSE, '`Card`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Card->Sortable = TRUE; // Allow sort
		$this->Card->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Card'] = &$this->Card;

		// DiscountAmount
		$this->DiscountAmount = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x_DiscountAmount', 'DiscountAmount', '`DiscountAmount`', '`DiscountAmount`', 131, -1, FALSE, '`DiscountAmount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DiscountAmount->Sortable = TRUE; // Allow sort
		$this->DiscountAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['DiscountAmount'] = &$this->DiscountAmount;

		// DiscountRemarks
		$this->DiscountRemarks = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x_DiscountRemarks', 'DiscountRemarks', '`DiscountRemarks`', '`DiscountRemarks`', 200, -1, FALSE, '`DiscountRemarks`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DiscountRemarks->Sortable = TRUE; // Allow sort
		$this->fields['DiscountRemarks'] = &$this->DiscountRemarks;

		// Remarks
		$this->Remarks = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x_Remarks', 'Remarks', '`Remarks`', '`Remarks`', 200, -1, FALSE, '`Remarks`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Remarks->Sortable = TRUE; // Allow sort
		$this->fields['Remarks'] = &$this->Remarks;

		// HospID
		$this->HospID = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HospID'] = &$this->HospID;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`view_revenue_report_pharmacy`";
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
		$this->TableFilter = "`HospID`='".HospitalID()."'  ";
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
		$this->DATE->DbValue = $row['DATE'];
		$this->BillNumber->DbValue = $row['BillNumber'];
		$this->PatientId->DbValue = $row['PatientId'];
		$this->_525Tax->DbValue = $row['5%Tax'];
		$this->TAXABLE_525->DbValue = $row['TAXABLE 5%'];
		$this->_1225Tax->DbValue = $row['12%Tax'];
		$this->TAXABLE_1225->DbValue = $row['TAXABLE 12%'];
		$this->_1825Tax->DbValue = $row['18%Tax'];
		$this->TAXABLE_1825->DbValue = $row['TAXABLE 18%'];
		$this->Amount->DbValue = $row['Amount'];
		$this->ModeofPayment->DbValue = $row['ModeofPayment'];
		$this->Cash->DbValue = $row['Cash'];
		$this->Card->DbValue = $row['Card'];
		$this->DiscountAmount->DbValue = $row['DiscountAmount'];
		$this->DiscountRemarks->DbValue = $row['DiscountRemarks'];
		$this->Remarks->DbValue = $row['Remarks'];
		$this->HospID->DbValue = $row['HospID'];
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
			return "view_revenue_report_pharmacylist.php";
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
		if ($pageName == "view_revenue_report_pharmacyview.php")
			return $Language->phrase("View");
		elseif ($pageName == "view_revenue_report_pharmacyedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "view_revenue_report_pharmacyadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "view_revenue_report_pharmacylist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("view_revenue_report_pharmacyview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_revenue_report_pharmacyview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "view_revenue_report_pharmacyadd.php?" . $this->getUrlParm($parm);
		else
			$url = "view_revenue_report_pharmacyadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("view_revenue_report_pharmacyedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("view_revenue_report_pharmacyadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("view_revenue_report_pharmacydelete.php", $this->getUrlParm());
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
		$this->DATE->setDbValue($rs->fields('DATE'));
		$this->BillNumber->setDbValue($rs->fields('BillNumber'));
		$this->PatientId->setDbValue($rs->fields('PatientId'));
		$this->_525Tax->setDbValue($rs->fields('5%Tax'));
		$this->TAXABLE_525->setDbValue($rs->fields('TAXABLE 5%'));
		$this->_1225Tax->setDbValue($rs->fields('12%Tax'));
		$this->TAXABLE_1225->setDbValue($rs->fields('TAXABLE 12%'));
		$this->_1825Tax->setDbValue($rs->fields('18%Tax'));
		$this->TAXABLE_1825->setDbValue($rs->fields('TAXABLE 18%'));
		$this->Amount->setDbValue($rs->fields('Amount'));
		$this->ModeofPayment->setDbValue($rs->fields('ModeofPayment'));
		$this->Cash->setDbValue($rs->fields('Cash'));
		$this->Card->setDbValue($rs->fields('Card'));
		$this->DiscountAmount->setDbValue($rs->fields('DiscountAmount'));
		$this->DiscountRemarks->setDbValue($rs->fields('DiscountRemarks'));
		$this->Remarks->setDbValue($rs->fields('Remarks'));
		$this->HospID->setDbValue($rs->fields('HospID'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// DATE
		// BillNumber
		// PatientId
		// 5%Tax
		// TAXABLE 5%
		// 12%Tax
		// TAXABLE 12%
		// 18%Tax
		// TAXABLE 18%
		// Amount
		// ModeofPayment
		// Cash
		// Card
		// DiscountAmount
		// DiscountRemarks
		// Remarks
		// HospID
		// DATE

		$this->DATE->ViewValue = $this->DATE->CurrentValue;
		$this->DATE->ViewValue = FormatDateTime($this->DATE->ViewValue, 0);
		$this->DATE->ViewCustomAttributes = "";

		// BillNumber
		$this->BillNumber->ViewValue = $this->BillNumber->CurrentValue;
		$this->BillNumber->ViewCustomAttributes = "";

		// PatientId
		$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
		$this->PatientId->ViewCustomAttributes = "";

		// 5%Tax
		$this->_525Tax->ViewValue = $this->_525Tax->CurrentValue;
		$this->_525Tax->ViewCustomAttributes = "";

		// TAXABLE 5%
		$this->TAXABLE_525->ViewValue = $this->TAXABLE_525->CurrentValue;
		$this->TAXABLE_525->ViewCustomAttributes = "";

		// 12%Tax
		$this->_1225Tax->ViewValue = $this->_1225Tax->CurrentValue;
		$this->_1225Tax->ViewCustomAttributes = "";

		// TAXABLE 12%
		$this->TAXABLE_1225->ViewValue = $this->TAXABLE_1225->CurrentValue;
		$this->TAXABLE_1225->ViewCustomAttributes = "";

		// 18%Tax
		$this->_1825Tax->ViewValue = $this->_1825Tax->CurrentValue;
		$this->_1825Tax->ViewCustomAttributes = "";

		// TAXABLE 18%
		$this->TAXABLE_1825->ViewValue = $this->TAXABLE_1825->CurrentValue;
		$this->TAXABLE_1825->ViewCustomAttributes = "";

		// Amount
		$this->Amount->ViewValue = $this->Amount->CurrentValue;
		$this->Amount->ViewValue = FormatNumber($this->Amount->ViewValue, 2, -2, -2, -2);
		$this->Amount->ViewCustomAttributes = "";

		// ModeofPayment
		$this->ModeofPayment->ViewValue = $this->ModeofPayment->CurrentValue;
		$this->ModeofPayment->ViewCustomAttributes = "";

		// Cash
		$this->Cash->ViewValue = $this->Cash->CurrentValue;
		$this->Cash->ViewValue = FormatNumber($this->Cash->ViewValue, 2, -2, -2, -2);
		$this->Cash->ViewCustomAttributes = "";

		// Card
		$this->Card->ViewValue = $this->Card->CurrentValue;
		$this->Card->ViewValue = FormatNumber($this->Card->ViewValue, 2, -2, -2, -2);
		$this->Card->ViewCustomAttributes = "";

		// DiscountAmount
		$this->DiscountAmount->ViewValue = $this->DiscountAmount->CurrentValue;
		$this->DiscountAmount->ViewValue = FormatNumber($this->DiscountAmount->ViewValue, 2, -2, -2, -2);
		$this->DiscountAmount->ViewCustomAttributes = "";

		// DiscountRemarks
		$this->DiscountRemarks->ViewValue = $this->DiscountRemarks->CurrentValue;
		$this->DiscountRemarks->ViewCustomAttributes = "";

		// Remarks
		$this->Remarks->ViewValue = $this->Remarks->CurrentValue;
		$this->Remarks->ViewCustomAttributes = "";

		// HospID
		$this->HospID->ViewValue = $this->HospID->CurrentValue;
		$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
		$this->HospID->ViewCustomAttributes = "";

		// DATE
		$this->DATE->LinkCustomAttributes = "";
		$this->DATE->HrefValue = "";
		$this->DATE->TooltipValue = "";

		// BillNumber
		$this->BillNumber->LinkCustomAttributes = "";
		$this->BillNumber->HrefValue = "";
		$this->BillNumber->TooltipValue = "";

		// PatientId
		$this->PatientId->LinkCustomAttributes = "";
		$this->PatientId->HrefValue = "";
		$this->PatientId->TooltipValue = "";

		// 5%Tax
		$this->_525Tax->LinkCustomAttributes = "";
		$this->_525Tax->HrefValue = "";
		$this->_525Tax->TooltipValue = "";

		// TAXABLE 5%
		$this->TAXABLE_525->LinkCustomAttributes = "";
		$this->TAXABLE_525->HrefValue = "";
		$this->TAXABLE_525->TooltipValue = "";

		// 12%Tax
		$this->_1225Tax->LinkCustomAttributes = "";
		$this->_1225Tax->HrefValue = "";
		$this->_1225Tax->TooltipValue = "";

		// TAXABLE 12%
		$this->TAXABLE_1225->LinkCustomAttributes = "";
		$this->TAXABLE_1225->HrefValue = "";
		$this->TAXABLE_1225->TooltipValue = "";

		// 18%Tax
		$this->_1825Tax->LinkCustomAttributes = "";
		$this->_1825Tax->HrefValue = "";
		$this->_1825Tax->TooltipValue = "";

		// TAXABLE 18%
		$this->TAXABLE_1825->LinkCustomAttributes = "";
		$this->TAXABLE_1825->HrefValue = "";
		$this->TAXABLE_1825->TooltipValue = "";

		// Amount
		$this->Amount->LinkCustomAttributes = "";
		$this->Amount->HrefValue = "";
		$this->Amount->TooltipValue = "";

		// ModeofPayment
		$this->ModeofPayment->LinkCustomAttributes = "";
		$this->ModeofPayment->HrefValue = "";
		$this->ModeofPayment->TooltipValue = "";

		// Cash
		$this->Cash->LinkCustomAttributes = "";
		$this->Cash->HrefValue = "";
		$this->Cash->TooltipValue = "";

		// Card
		$this->Card->LinkCustomAttributes = "";
		$this->Card->HrefValue = "";
		$this->Card->TooltipValue = "";

		// DiscountAmount
		$this->DiscountAmount->LinkCustomAttributes = "";
		$this->DiscountAmount->HrefValue = "";
		$this->DiscountAmount->TooltipValue = "";

		// DiscountRemarks
		$this->DiscountRemarks->LinkCustomAttributes = "";
		$this->DiscountRemarks->HrefValue = "";
		$this->DiscountRemarks->TooltipValue = "";

		// Remarks
		$this->Remarks->LinkCustomAttributes = "";
		$this->Remarks->HrefValue = "";
		$this->Remarks->TooltipValue = "";

		// HospID
		$this->HospID->LinkCustomAttributes = "";
		$this->HospID->HrefValue = "";
		$this->HospID->TooltipValue = "";

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

		// DATE
		$this->DATE->EditAttrs["class"] = "form-control";
		$this->DATE->EditCustomAttributes = "";
		$this->DATE->EditValue = FormatDateTime($this->DATE->CurrentValue, 8);
		$this->DATE->PlaceHolder = RemoveHtml($this->DATE->caption());

		// BillNumber
		$this->BillNumber->EditAttrs["class"] = "form-control";
		$this->BillNumber->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->BillNumber->CurrentValue = HtmlDecode($this->BillNumber->CurrentValue);
		$this->BillNumber->EditValue = $this->BillNumber->CurrentValue;
		$this->BillNumber->PlaceHolder = RemoveHtml($this->BillNumber->caption());

		// PatientId
		$this->PatientId->EditAttrs["class"] = "form-control";
		$this->PatientId->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
		$this->PatientId->EditValue = $this->PatientId->CurrentValue;
		$this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

		// 5%Tax
		$this->_525Tax->EditAttrs["class"] = "form-control";
		$this->_525Tax->EditCustomAttributes = "";
		$this->_525Tax->EditValue = $this->_525Tax->CurrentValue;
		$this->_525Tax->PlaceHolder = RemoveHtml($this->_525Tax->caption());

		// TAXABLE 5%
		$this->TAXABLE_525->EditAttrs["class"] = "form-control";
		$this->TAXABLE_525->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->TAXABLE_525->CurrentValue = HtmlDecode($this->TAXABLE_525->CurrentValue);
		$this->TAXABLE_525->EditValue = $this->TAXABLE_525->CurrentValue;
		$this->TAXABLE_525->PlaceHolder = RemoveHtml($this->TAXABLE_525->caption());

		// 12%Tax
		$this->_1225Tax->EditAttrs["class"] = "form-control";
		$this->_1225Tax->EditCustomAttributes = "";
		$this->_1225Tax->EditValue = $this->_1225Tax->CurrentValue;
		$this->_1225Tax->PlaceHolder = RemoveHtml($this->_1225Tax->caption());

		// TAXABLE 12%
		$this->TAXABLE_1225->EditAttrs["class"] = "form-control";
		$this->TAXABLE_1225->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->TAXABLE_1225->CurrentValue = HtmlDecode($this->TAXABLE_1225->CurrentValue);
		$this->TAXABLE_1225->EditValue = $this->TAXABLE_1225->CurrentValue;
		$this->TAXABLE_1225->PlaceHolder = RemoveHtml($this->TAXABLE_1225->caption());

		// 18%Tax
		$this->_1825Tax->EditAttrs["class"] = "form-control";
		$this->_1825Tax->EditCustomAttributes = "";
		$this->_1825Tax->EditValue = $this->_1825Tax->CurrentValue;
		$this->_1825Tax->PlaceHolder = RemoveHtml($this->_1825Tax->caption());

		// TAXABLE 18%
		$this->TAXABLE_1825->EditAttrs["class"] = "form-control";
		$this->TAXABLE_1825->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->TAXABLE_1825->CurrentValue = HtmlDecode($this->TAXABLE_1825->CurrentValue);
		$this->TAXABLE_1825->EditValue = $this->TAXABLE_1825->CurrentValue;
		$this->TAXABLE_1825->PlaceHolder = RemoveHtml($this->TAXABLE_1825->caption());

		// Amount
		$this->Amount->EditAttrs["class"] = "form-control";
		$this->Amount->EditCustomAttributes = "";
		$this->Amount->EditValue = $this->Amount->CurrentValue;
		$this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());
		if (strval($this->Amount->EditValue) <> "" && is_numeric($this->Amount->EditValue))
			$this->Amount->EditValue = FormatNumber($this->Amount->EditValue, -2, -2, -2, -2);

		// ModeofPayment
		$this->ModeofPayment->EditAttrs["class"] = "form-control";
		$this->ModeofPayment->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ModeofPayment->CurrentValue = HtmlDecode($this->ModeofPayment->CurrentValue);
		$this->ModeofPayment->EditValue = $this->ModeofPayment->CurrentValue;
		$this->ModeofPayment->PlaceHolder = RemoveHtml($this->ModeofPayment->caption());

		// Cash
		$this->Cash->EditAttrs["class"] = "form-control";
		$this->Cash->EditCustomAttributes = "";
		$this->Cash->EditValue = $this->Cash->CurrentValue;
		$this->Cash->PlaceHolder = RemoveHtml($this->Cash->caption());
		if (strval($this->Cash->EditValue) <> "" && is_numeric($this->Cash->EditValue))
			$this->Cash->EditValue = FormatNumber($this->Cash->EditValue, -2, -2, -2, -2);

		// Card
		$this->Card->EditAttrs["class"] = "form-control";
		$this->Card->EditCustomAttributes = "";
		$this->Card->EditValue = $this->Card->CurrentValue;
		$this->Card->PlaceHolder = RemoveHtml($this->Card->caption());
		if (strval($this->Card->EditValue) <> "" && is_numeric($this->Card->EditValue))
			$this->Card->EditValue = FormatNumber($this->Card->EditValue, -2, -2, -2, -2);

		// DiscountAmount
		$this->DiscountAmount->EditAttrs["class"] = "form-control";
		$this->DiscountAmount->EditCustomAttributes = "";
		$this->DiscountAmount->EditValue = $this->DiscountAmount->CurrentValue;
		$this->DiscountAmount->PlaceHolder = RemoveHtml($this->DiscountAmount->caption());
		if (strval($this->DiscountAmount->EditValue) <> "" && is_numeric($this->DiscountAmount->EditValue))
			$this->DiscountAmount->EditValue = FormatNumber($this->DiscountAmount->EditValue, -2, -2, -2, -2);

		// DiscountRemarks
		$this->DiscountRemarks->EditAttrs["class"] = "form-control";
		$this->DiscountRemarks->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->DiscountRemarks->CurrentValue = HtmlDecode($this->DiscountRemarks->CurrentValue);
		$this->DiscountRemarks->EditValue = $this->DiscountRemarks->CurrentValue;
		$this->DiscountRemarks->PlaceHolder = RemoveHtml($this->DiscountRemarks->caption());

		// Remarks
		$this->Remarks->EditAttrs["class"] = "form-control";
		$this->Remarks->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Remarks->CurrentValue = HtmlDecode($this->Remarks->CurrentValue);
		$this->Remarks->EditValue = $this->Remarks->CurrentValue;
		$this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

		// HospID
		$this->HospID->EditAttrs["class"] = "form-control";
		$this->HospID->EditCustomAttributes = "";
		$this->HospID->EditValue = $this->HospID->CurrentValue;
		$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

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
					$doc->exportCaption($this->DATE);
					$doc->exportCaption($this->BillNumber);
					$doc->exportCaption($this->PatientId);
					$doc->exportCaption($this->_525Tax);
					$doc->exportCaption($this->TAXABLE_525);
					$doc->exportCaption($this->_1225Tax);
					$doc->exportCaption($this->TAXABLE_1225);
					$doc->exportCaption($this->_1825Tax);
					$doc->exportCaption($this->TAXABLE_1825);
					$doc->exportCaption($this->Amount);
					$doc->exportCaption($this->ModeofPayment);
					$doc->exportCaption($this->Cash);
					$doc->exportCaption($this->Card);
					$doc->exportCaption($this->DiscountAmount);
					$doc->exportCaption($this->DiscountRemarks);
					$doc->exportCaption($this->Remarks);
					$doc->exportCaption($this->HospID);
				} else {
					$doc->exportCaption($this->DATE);
					$doc->exportCaption($this->BillNumber);
					$doc->exportCaption($this->PatientId);
					$doc->exportCaption($this->TAXABLE_525);
					$doc->exportCaption($this->TAXABLE_1225);
					$doc->exportCaption($this->TAXABLE_1825);
					$doc->exportCaption($this->Amount);
					$doc->exportCaption($this->ModeofPayment);
					$doc->exportCaption($this->Cash);
					$doc->exportCaption($this->Card);
					$doc->exportCaption($this->DiscountAmount);
					$doc->exportCaption($this->DiscountRemarks);
					$doc->exportCaption($this->Remarks);
					$doc->exportCaption($this->HospID);
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
						$doc->exportField($this->DATE);
						$doc->exportField($this->BillNumber);
						$doc->exportField($this->PatientId);
						$doc->exportField($this->_525Tax);
						$doc->exportField($this->TAXABLE_525);
						$doc->exportField($this->_1225Tax);
						$doc->exportField($this->TAXABLE_1225);
						$doc->exportField($this->_1825Tax);
						$doc->exportField($this->TAXABLE_1825);
						$doc->exportField($this->Amount);
						$doc->exportField($this->ModeofPayment);
						$doc->exportField($this->Cash);
						$doc->exportField($this->Card);
						$doc->exportField($this->DiscountAmount);
						$doc->exportField($this->DiscountRemarks);
						$doc->exportField($this->Remarks);
						$doc->exportField($this->HospID);
					} else {
						$doc->exportField($this->DATE);
						$doc->exportField($this->BillNumber);
						$doc->exportField($this->PatientId);
						$doc->exportField($this->TAXABLE_525);
						$doc->exportField($this->TAXABLE_1225);
						$doc->exportField($this->TAXABLE_1825);
						$doc->exportField($this->Amount);
						$doc->exportField($this->ModeofPayment);
						$doc->exportField($this->Cash);
						$doc->exportField($this->Card);
						$doc->exportField($this->DiscountAmount);
						$doc->exportField($this->DiscountRemarks);
						$doc->exportField($this->Remarks);
						$doc->exportField($this->HospID);
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