<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for view_pharmacy_stock_movement_sum
 */
class view_pharmacy_stock_movement_sum extends DbTable
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
	public $PRC;
	public $PrName;
	public $OpeningStk;
	public $UnitPurchaseRate;
	public $UnitSaleRate;
	public $CreatedDate;
	public $HospID;
	public $PurchaseQty;
	public $SalesQty;
	public $ClosingStk;
	public $PurchasefreeQty;
	public $TransferingQty;
	public $BRCODE;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'view_pharmacy_stock_movement_sum';
		$this->TableName = 'view_pharmacy_stock_movement_sum';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`view_pharmacy_stock_movement_sum`";
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

		// PRC
		$this->PRC = new DbField('view_pharmacy_stock_movement_sum', 'view_pharmacy_stock_movement_sum', 'x_PRC', 'PRC', '`PRC`', '`PRC`', 200, -1, FALSE, '`PRC`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PRC->Sortable = TRUE; // Allow sort
		$this->fields['PRC'] = &$this->PRC;

		// PrName
		$this->PrName = new DbField('view_pharmacy_stock_movement_sum', 'view_pharmacy_stock_movement_sum', 'x_PrName', 'PrName', '`PrName`', '`PrName`', 200, -1, FALSE, '`PrName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PrName->Sortable = TRUE; // Allow sort
		$this->fields['PrName'] = &$this->PrName;

		// OpeningStk
		$this->OpeningStk = new DbField('view_pharmacy_stock_movement_sum', 'view_pharmacy_stock_movement_sum', 'x_OpeningStk', 'OpeningStk', '`OpeningStk`', '`OpeningStk`', 131, -1, FALSE, '`OpeningStk`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OpeningStk->Sortable = TRUE; // Allow sort
		$this->OpeningStk->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['OpeningStk'] = &$this->OpeningStk;

		// UnitPurchaseRate
		$this->UnitPurchaseRate = new DbField('view_pharmacy_stock_movement_sum', 'view_pharmacy_stock_movement_sum', 'x_UnitPurchaseRate', 'UnitPurchaseRate', '`UnitPurchaseRate`', '`UnitPurchaseRate`', 131, -1, FALSE, '`UnitPurchaseRate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->UnitPurchaseRate->Sortable = TRUE; // Allow sort
		$this->UnitPurchaseRate->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['UnitPurchaseRate'] = &$this->UnitPurchaseRate;

		// UnitSaleRate
		$this->UnitSaleRate = new DbField('view_pharmacy_stock_movement_sum', 'view_pharmacy_stock_movement_sum', 'x_UnitSaleRate', 'UnitSaleRate', '`UnitSaleRate`', '`UnitSaleRate`', 131, -1, FALSE, '`UnitSaleRate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->UnitSaleRate->Sortable = TRUE; // Allow sort
		$this->UnitSaleRate->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['UnitSaleRate'] = &$this->UnitSaleRate;

		// CreatedDate
		$this->CreatedDate = new DbField('view_pharmacy_stock_movement_sum', 'view_pharmacy_stock_movement_sum', 'x_CreatedDate', 'CreatedDate', '`CreatedDate`', CastDateFieldForLike('`CreatedDate`', 0, "DB"), 133, 0, FALSE, '`CreatedDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CreatedDate->Sortable = TRUE; // Allow sort
		$this->CreatedDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['CreatedDate'] = &$this->CreatedDate;

		// HospID
		$this->HospID = new DbField('view_pharmacy_stock_movement_sum', 'view_pharmacy_stock_movement_sum', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HospID'] = &$this->HospID;

		// PurchaseQty
		$this->PurchaseQty = new DbField('view_pharmacy_stock_movement_sum', 'view_pharmacy_stock_movement_sum', 'x_PurchaseQty', 'PurchaseQty', '`PurchaseQty`', '`PurchaseQty`', 131, -1, FALSE, '`PurchaseQty`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PurchaseQty->Sortable = TRUE; // Allow sort
		$this->PurchaseQty->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PurchaseQty'] = &$this->PurchaseQty;

		// SalesQty
		$this->SalesQty = new DbField('view_pharmacy_stock_movement_sum', 'view_pharmacy_stock_movement_sum', 'x_SalesQty', 'SalesQty', '`SalesQty`', '`SalesQty`', 131, -1, FALSE, '`SalesQty`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SalesQty->Sortable = TRUE; // Allow sort
		$this->SalesQty->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['SalesQty'] = &$this->SalesQty;

		// ClosingStk
		$this->ClosingStk = new DbField('view_pharmacy_stock_movement_sum', 'view_pharmacy_stock_movement_sum', 'x_ClosingStk', 'ClosingStk', '`ClosingStk`', '`ClosingStk`', 131, -1, FALSE, '`ClosingStk`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ClosingStk->Sortable = TRUE; // Allow sort
		$this->ClosingStk->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['ClosingStk'] = &$this->ClosingStk;

		// PurchasefreeQty
		$this->PurchasefreeQty = new DbField('view_pharmacy_stock_movement_sum', 'view_pharmacy_stock_movement_sum', 'x_PurchasefreeQty', 'PurchasefreeQty', '`PurchasefreeQty`', '`PurchasefreeQty`', 131, -1, FALSE, '`PurchasefreeQty`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PurchasefreeQty->Sortable = TRUE; // Allow sort
		$this->PurchasefreeQty->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PurchasefreeQty'] = &$this->PurchasefreeQty;

		// TransferingQty
		$this->TransferingQty = new DbField('view_pharmacy_stock_movement_sum', 'view_pharmacy_stock_movement_sum', 'x_TransferingQty', 'TransferingQty', '`TransferingQty`', '`TransferingQty`', 131, -1, FALSE, '`TransferingQty`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TransferingQty->Sortable = TRUE; // Allow sort
		$this->TransferingQty->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['TransferingQty'] = &$this->TransferingQty;

		// BRCODE
		$this->BRCODE = new DbField('view_pharmacy_stock_movement_sum', 'view_pharmacy_stock_movement_sum', 'x_BRCODE', 'BRCODE', '`BRCODE`', '`BRCODE`', 3, -1, FALSE, '`BRCODE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BRCODE->Sortable = TRUE; // Allow sort
		$this->BRCODE->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['BRCODE'] = &$this->BRCODE;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`view_pharmacy_stock_movement_sum`";
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
		$this->PRC->DbValue = $row['PRC'];
		$this->PrName->DbValue = $row['PrName'];
		$this->OpeningStk->DbValue = $row['OpeningStk'];
		$this->UnitPurchaseRate->DbValue = $row['UnitPurchaseRate'];
		$this->UnitSaleRate->DbValue = $row['UnitSaleRate'];
		$this->CreatedDate->DbValue = $row['CreatedDate'];
		$this->HospID->DbValue = $row['HospID'];
		$this->PurchaseQty->DbValue = $row['PurchaseQty'];
		$this->SalesQty->DbValue = $row['SalesQty'];
		$this->ClosingStk->DbValue = $row['ClosingStk'];
		$this->PurchasefreeQty->DbValue = $row['PurchasefreeQty'];
		$this->TransferingQty->DbValue = $row['TransferingQty'];
		$this->BRCODE->DbValue = $row['BRCODE'];
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
			return "view_pharmacy_stock_movement_sumlist.php";
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
		if ($pageName == "view_pharmacy_stock_movement_sumview.php")
			return $Language->phrase("View");
		elseif ($pageName == "view_pharmacy_stock_movement_sumedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "view_pharmacy_stock_movement_sumadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "view_pharmacy_stock_movement_sumlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("view_pharmacy_stock_movement_sumview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_pharmacy_stock_movement_sumview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "view_pharmacy_stock_movement_sumadd.php?" . $this->getUrlParm($parm);
		else
			$url = "view_pharmacy_stock_movement_sumadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("view_pharmacy_stock_movement_sumedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("view_pharmacy_stock_movement_sumadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("view_pharmacy_stock_movement_sumdelete.php", $this->getUrlParm());
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
		$this->PRC->setDbValue($rs->fields('PRC'));
		$this->PrName->setDbValue($rs->fields('PrName'));
		$this->OpeningStk->setDbValue($rs->fields('OpeningStk'));
		$this->UnitPurchaseRate->setDbValue($rs->fields('UnitPurchaseRate'));
		$this->UnitSaleRate->setDbValue($rs->fields('UnitSaleRate'));
		$this->CreatedDate->setDbValue($rs->fields('CreatedDate'));
		$this->HospID->setDbValue($rs->fields('HospID'));
		$this->PurchaseQty->setDbValue($rs->fields('PurchaseQty'));
		$this->SalesQty->setDbValue($rs->fields('SalesQty'));
		$this->ClosingStk->setDbValue($rs->fields('ClosingStk'));
		$this->PurchasefreeQty->setDbValue($rs->fields('PurchasefreeQty'));
		$this->TransferingQty->setDbValue($rs->fields('TransferingQty'));
		$this->BRCODE->setDbValue($rs->fields('BRCODE'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// PRC
		// PrName
		// OpeningStk
		// UnitPurchaseRate
		// UnitSaleRate
		// CreatedDate
		// HospID
		// PurchaseQty
		// SalesQty
		// ClosingStk
		// PurchasefreeQty
		// TransferingQty
		// BRCODE
		// PRC

		$this->PRC->ViewValue = $this->PRC->CurrentValue;
		$this->PRC->ViewCustomAttributes = "";

		// PrName
		$this->PrName->ViewValue = $this->PrName->CurrentValue;
		$this->PrName->ViewCustomAttributes = "";

		// OpeningStk
		$this->OpeningStk->ViewValue = $this->OpeningStk->CurrentValue;
		$this->OpeningStk->ViewValue = FormatNumber($this->OpeningStk->ViewValue, 2, -2, -2, -2);
		$this->OpeningStk->ViewCustomAttributes = "";

		// UnitPurchaseRate
		$this->UnitPurchaseRate->ViewValue = $this->UnitPurchaseRate->CurrentValue;
		$this->UnitPurchaseRate->ViewValue = FormatNumber($this->UnitPurchaseRate->ViewValue, 2, -2, -2, -2);
		$this->UnitPurchaseRate->ViewCustomAttributes = "";

		// UnitSaleRate
		$this->UnitSaleRate->ViewValue = $this->UnitSaleRate->CurrentValue;
		$this->UnitSaleRate->ViewValue = FormatNumber($this->UnitSaleRate->ViewValue, 2, -2, -2, -2);
		$this->UnitSaleRate->ViewCustomAttributes = "";

		// CreatedDate
		$this->CreatedDate->ViewValue = $this->CreatedDate->CurrentValue;
		$this->CreatedDate->ViewValue = FormatDateTime($this->CreatedDate->ViewValue, 0);
		$this->CreatedDate->ViewCustomAttributes = "";

		// HospID
		$this->HospID->ViewValue = $this->HospID->CurrentValue;
		$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
		$this->HospID->ViewCustomAttributes = "";

		// PurchaseQty
		$this->PurchaseQty->ViewValue = $this->PurchaseQty->CurrentValue;
		$this->PurchaseQty->ViewValue = FormatNumber($this->PurchaseQty->ViewValue, 2, -2, -2, -2);
		$this->PurchaseQty->ViewCustomAttributes = "";

		// SalesQty
		$this->SalesQty->ViewValue = $this->SalesQty->CurrentValue;
		$this->SalesQty->ViewValue = FormatNumber($this->SalesQty->ViewValue, 2, -2, -2, -2);
		$this->SalesQty->ViewCustomAttributes = "";

		// ClosingStk
		$this->ClosingStk->ViewValue = $this->ClosingStk->CurrentValue;
		$this->ClosingStk->ViewValue = FormatNumber($this->ClosingStk->ViewValue, 2, -2, -2, -2);
		$this->ClosingStk->ViewCustomAttributes = "";

		// PurchasefreeQty
		$this->PurchasefreeQty->ViewValue = $this->PurchasefreeQty->CurrentValue;
		$this->PurchasefreeQty->ViewValue = FormatNumber($this->PurchasefreeQty->ViewValue, 2, -2, -2, -2);
		$this->PurchasefreeQty->ViewCustomAttributes = "";

		// TransferingQty
		$this->TransferingQty->ViewValue = $this->TransferingQty->CurrentValue;
		$this->TransferingQty->ViewValue = FormatNumber($this->TransferingQty->ViewValue, 2, -2, -2, -2);
		$this->TransferingQty->ViewCustomAttributes = "";

		// BRCODE
		$this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
		$this->BRCODE->ViewValue = FormatNumber($this->BRCODE->ViewValue, 0, -2, -2, -2);
		$this->BRCODE->ViewCustomAttributes = "";

		// PRC
		$this->PRC->LinkCustomAttributes = "";
		$this->PRC->HrefValue = "";
		$this->PRC->TooltipValue = "";

		// PrName
		$this->PrName->LinkCustomAttributes = "";
		$this->PrName->HrefValue = "";
		$this->PrName->TooltipValue = "";

		// OpeningStk
		$this->OpeningStk->LinkCustomAttributes = "";
		$this->OpeningStk->HrefValue = "";
		$this->OpeningStk->TooltipValue = "";

		// UnitPurchaseRate
		$this->UnitPurchaseRate->LinkCustomAttributes = "";
		$this->UnitPurchaseRate->HrefValue = "";
		$this->UnitPurchaseRate->TooltipValue = "";

		// UnitSaleRate
		$this->UnitSaleRate->LinkCustomAttributes = "";
		$this->UnitSaleRate->HrefValue = "";
		$this->UnitSaleRate->TooltipValue = "";

		// CreatedDate
		$this->CreatedDate->LinkCustomAttributes = "";
		$this->CreatedDate->HrefValue = "";
		$this->CreatedDate->TooltipValue = "";

		// HospID
		$this->HospID->LinkCustomAttributes = "";
		$this->HospID->HrefValue = "";
		$this->HospID->TooltipValue = "";

		// PurchaseQty
		$this->PurchaseQty->LinkCustomAttributes = "";
		$this->PurchaseQty->HrefValue = "";
		$this->PurchaseQty->TooltipValue = "";

		// SalesQty
		$this->SalesQty->LinkCustomAttributes = "";
		$this->SalesQty->HrefValue = "";
		$this->SalesQty->TooltipValue = "";

		// ClosingStk
		$this->ClosingStk->LinkCustomAttributes = "";
		$this->ClosingStk->HrefValue = "";
		$this->ClosingStk->TooltipValue = "";

		// PurchasefreeQty
		$this->PurchasefreeQty->LinkCustomAttributes = "";
		$this->PurchasefreeQty->HrefValue = "";
		$this->PurchasefreeQty->TooltipValue = "";

		// TransferingQty
		$this->TransferingQty->LinkCustomAttributes = "";
		$this->TransferingQty->HrefValue = "";
		$this->TransferingQty->TooltipValue = "";

		// BRCODE
		$this->BRCODE->LinkCustomAttributes = "";
		$this->BRCODE->HrefValue = "";
		$this->BRCODE->TooltipValue = "";

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

		// PRC
		$this->PRC->EditAttrs["class"] = "form-control";
		$this->PRC->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
		$this->PRC->EditValue = $this->PRC->CurrentValue;
		$this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

		// PrName
		$this->PrName->EditAttrs["class"] = "form-control";
		$this->PrName->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PrName->CurrentValue = HtmlDecode($this->PrName->CurrentValue);
		$this->PrName->EditValue = $this->PrName->CurrentValue;
		$this->PrName->PlaceHolder = RemoveHtml($this->PrName->caption());

		// OpeningStk
		$this->OpeningStk->EditAttrs["class"] = "form-control";
		$this->OpeningStk->EditCustomAttributes = "";
		$this->OpeningStk->EditValue = $this->OpeningStk->CurrentValue;
		$this->OpeningStk->PlaceHolder = RemoveHtml($this->OpeningStk->caption());
		if (strval($this->OpeningStk->EditValue) <> "" && is_numeric($this->OpeningStk->EditValue))
			$this->OpeningStk->EditValue = FormatNumber($this->OpeningStk->EditValue, -2, -2, -2, -2);

		// UnitPurchaseRate
		$this->UnitPurchaseRate->EditAttrs["class"] = "form-control";
		$this->UnitPurchaseRate->EditCustomAttributes = "";
		$this->UnitPurchaseRate->EditValue = $this->UnitPurchaseRate->CurrentValue;
		$this->UnitPurchaseRate->PlaceHolder = RemoveHtml($this->UnitPurchaseRate->caption());
		if (strval($this->UnitPurchaseRate->EditValue) <> "" && is_numeric($this->UnitPurchaseRate->EditValue))
			$this->UnitPurchaseRate->EditValue = FormatNumber($this->UnitPurchaseRate->EditValue, -2, -2, -2, -2);

		// UnitSaleRate
		$this->UnitSaleRate->EditAttrs["class"] = "form-control";
		$this->UnitSaleRate->EditCustomAttributes = "";
		$this->UnitSaleRate->EditValue = $this->UnitSaleRate->CurrentValue;
		$this->UnitSaleRate->PlaceHolder = RemoveHtml($this->UnitSaleRate->caption());
		if (strval($this->UnitSaleRate->EditValue) <> "" && is_numeric($this->UnitSaleRate->EditValue))
			$this->UnitSaleRate->EditValue = FormatNumber($this->UnitSaleRate->EditValue, -2, -2, -2, -2);

		// CreatedDate
		$this->CreatedDate->EditAttrs["class"] = "form-control";
		$this->CreatedDate->EditCustomAttributes = "";
		$this->CreatedDate->EditValue = FormatDateTime($this->CreatedDate->CurrentValue, 8);
		$this->CreatedDate->PlaceHolder = RemoveHtml($this->CreatedDate->caption());

		// HospID
		$this->HospID->EditAttrs["class"] = "form-control";
		$this->HospID->EditCustomAttributes = "";
		$this->HospID->EditValue = $this->HospID->CurrentValue;
		$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

		// PurchaseQty
		$this->PurchaseQty->EditAttrs["class"] = "form-control";
		$this->PurchaseQty->EditCustomAttributes = "";
		$this->PurchaseQty->EditValue = $this->PurchaseQty->CurrentValue;
		$this->PurchaseQty->PlaceHolder = RemoveHtml($this->PurchaseQty->caption());
		if (strval($this->PurchaseQty->EditValue) <> "" && is_numeric($this->PurchaseQty->EditValue))
			$this->PurchaseQty->EditValue = FormatNumber($this->PurchaseQty->EditValue, -2, -2, -2, -2);

		// SalesQty
		$this->SalesQty->EditAttrs["class"] = "form-control";
		$this->SalesQty->EditCustomAttributes = "";
		$this->SalesQty->EditValue = $this->SalesQty->CurrentValue;
		$this->SalesQty->PlaceHolder = RemoveHtml($this->SalesQty->caption());
		if (strval($this->SalesQty->EditValue) <> "" && is_numeric($this->SalesQty->EditValue))
			$this->SalesQty->EditValue = FormatNumber($this->SalesQty->EditValue, -2, -2, -2, -2);

		// ClosingStk
		$this->ClosingStk->EditAttrs["class"] = "form-control";
		$this->ClosingStk->EditCustomAttributes = "";
		$this->ClosingStk->EditValue = $this->ClosingStk->CurrentValue;
		$this->ClosingStk->PlaceHolder = RemoveHtml($this->ClosingStk->caption());
		if (strval($this->ClosingStk->EditValue) <> "" && is_numeric($this->ClosingStk->EditValue))
			$this->ClosingStk->EditValue = FormatNumber($this->ClosingStk->EditValue, -2, -2, -2, -2);

		// PurchasefreeQty
		$this->PurchasefreeQty->EditAttrs["class"] = "form-control";
		$this->PurchasefreeQty->EditCustomAttributes = "";
		$this->PurchasefreeQty->EditValue = $this->PurchasefreeQty->CurrentValue;
		$this->PurchasefreeQty->PlaceHolder = RemoveHtml($this->PurchasefreeQty->caption());
		if (strval($this->PurchasefreeQty->EditValue) <> "" && is_numeric($this->PurchasefreeQty->EditValue))
			$this->PurchasefreeQty->EditValue = FormatNumber($this->PurchasefreeQty->EditValue, -2, -2, -2, -2);

		// TransferingQty
		$this->TransferingQty->EditAttrs["class"] = "form-control";
		$this->TransferingQty->EditCustomAttributes = "";
		$this->TransferingQty->EditValue = $this->TransferingQty->CurrentValue;
		$this->TransferingQty->PlaceHolder = RemoveHtml($this->TransferingQty->caption());
		if (strval($this->TransferingQty->EditValue) <> "" && is_numeric($this->TransferingQty->EditValue))
			$this->TransferingQty->EditValue = FormatNumber($this->TransferingQty->EditValue, -2, -2, -2, -2);

		// BRCODE
		$this->BRCODE->EditAttrs["class"] = "form-control";
		$this->BRCODE->EditCustomAttributes = "";
		$this->BRCODE->EditValue = $this->BRCODE->CurrentValue;
		$this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

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
					$doc->exportCaption($this->PRC);
					$doc->exportCaption($this->PrName);
					$doc->exportCaption($this->OpeningStk);
					$doc->exportCaption($this->UnitPurchaseRate);
					$doc->exportCaption($this->UnitSaleRate);
					$doc->exportCaption($this->CreatedDate);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->PurchaseQty);
					$doc->exportCaption($this->SalesQty);
					$doc->exportCaption($this->ClosingStk);
					$doc->exportCaption($this->PurchasefreeQty);
					$doc->exportCaption($this->TransferingQty);
					$doc->exportCaption($this->BRCODE);
				} else {
					$doc->exportCaption($this->PRC);
					$doc->exportCaption($this->PrName);
					$doc->exportCaption($this->OpeningStk);
					$doc->exportCaption($this->UnitPurchaseRate);
					$doc->exportCaption($this->UnitSaleRate);
					$doc->exportCaption($this->CreatedDate);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->PurchaseQty);
					$doc->exportCaption($this->SalesQty);
					$doc->exportCaption($this->ClosingStk);
					$doc->exportCaption($this->PurchasefreeQty);
					$doc->exportCaption($this->TransferingQty);
					$doc->exportCaption($this->BRCODE);
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
						$doc->exportField($this->PRC);
						$doc->exportField($this->PrName);
						$doc->exportField($this->OpeningStk);
						$doc->exportField($this->UnitPurchaseRate);
						$doc->exportField($this->UnitSaleRate);
						$doc->exportField($this->CreatedDate);
						$doc->exportField($this->HospID);
						$doc->exportField($this->PurchaseQty);
						$doc->exportField($this->SalesQty);
						$doc->exportField($this->ClosingStk);
						$doc->exportField($this->PurchasefreeQty);
						$doc->exportField($this->TransferingQty);
						$doc->exportField($this->BRCODE);
					} else {
						$doc->exportField($this->PRC);
						$doc->exportField($this->PrName);
						$doc->exportField($this->OpeningStk);
						$doc->exportField($this->UnitPurchaseRate);
						$doc->exportField($this->UnitSaleRate);
						$doc->exportField($this->CreatedDate);
						$doc->exportField($this->HospID);
						$doc->exportField($this->PurchaseQty);
						$doc->exportField($this->SalesQty);
						$doc->exportField($this->ClosingStk);
						$doc->exportField($this->PurchasefreeQty);
						$doc->exportField($this->TransferingQty);
						$doc->exportField($this->BRCODE);
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