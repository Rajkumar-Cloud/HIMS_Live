<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for view_pharmacy_report_stock_value
 */
class view_pharmacy_report_stock_value extends DbTable
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
	public $DES;
	public $Batch;
	public $MFRCODE;
	public $stock;
	public $Mrp;
	public $PurValue;
	public $PurValue1;
	public $ssgst;
	public $scgst;
	public $stockvalue;
	public $stockvalue1;
	public $brcode;
	public $hospid;
	public $PUnit;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'view_pharmacy_report_stock_value';
		$this->TableName = 'view_pharmacy_report_stock_value';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`view_pharmacy_report_stock_value`";
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
		$this->PRC = new DbField('view_pharmacy_report_stock_value', 'view_pharmacy_report_stock_value', 'x_PRC', 'PRC', '`PRC`', '`PRC`', 200, -1, FALSE, '`PRC`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PRC->Sortable = TRUE; // Allow sort
		$this->fields['PRC'] = &$this->PRC;

		// DES
		$this->DES = new DbField('view_pharmacy_report_stock_value', 'view_pharmacy_report_stock_value', 'x_DES', 'DES', '`DES`', '`DES`', 200, -1, FALSE, '`DES`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DES->Sortable = TRUE; // Allow sort
		$this->fields['DES'] = &$this->DES;

		// Batch
		$this->Batch = new DbField('view_pharmacy_report_stock_value', 'view_pharmacy_report_stock_value', 'x_Batch', 'Batch', '`Batch`', '`Batch`', 200, -1, FALSE, '`Batch`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Batch->Sortable = TRUE; // Allow sort
		$this->fields['Batch'] = &$this->Batch;

		// MFRCODE
		$this->MFRCODE = new DbField('view_pharmacy_report_stock_value', 'view_pharmacy_report_stock_value', 'x_MFRCODE', 'MFRCODE', '`MFRCODE`', '`MFRCODE`', 200, -1, FALSE, '`MFRCODE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MFRCODE->Sortable = TRUE; // Allow sort
		$this->fields['MFRCODE'] = &$this->MFRCODE;

		// stock
		$this->stock = new DbField('view_pharmacy_report_stock_value', 'view_pharmacy_report_stock_value', 'x_stock', 'stock', '`stock`', '`stock`', 20, -1, FALSE, '`stock`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->stock->Sortable = TRUE; // Allow sort
		$this->stock->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['stock'] = &$this->stock;

		// Mrp
		$this->Mrp = new DbField('view_pharmacy_report_stock_value', 'view_pharmacy_report_stock_value', 'x_Mrp', 'Mrp', '`Mrp`', '`Mrp`', 131, -1, FALSE, '`Mrp`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Mrp->Sortable = TRUE; // Allow sort
		$this->Mrp->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Mrp'] = &$this->Mrp;

		// PurValue
		$this->PurValue = new DbField('view_pharmacy_report_stock_value', 'view_pharmacy_report_stock_value', 'x_PurValue', 'PurValue', '`PurValue`', '`PurValue`', 131, -1, FALSE, '`PurValue`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PurValue->Sortable = FALSE; // Allow sort
		$this->PurValue->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PurValue'] = &$this->PurValue;

		// PurValue1
		$this->PurValue1 = new DbField('view_pharmacy_report_stock_value', 'view_pharmacy_report_stock_value', 'x_PurValue1', 'PurValue1', 'PurValue + (( PurValue /100 ) * (ssgst + scgst))', 'PurValue + (( PurValue /100 ) * (ssgst + scgst))', 131, -1, FALSE, 'PurValue + (( PurValue /100 ) * (ssgst + scgst))', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PurValue1->IsCustom = TRUE; // Custom field
		$this->PurValue1->Sortable = TRUE; // Allow sort
		$this->PurValue1->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PurValue1'] = &$this->PurValue1;

		// ssgst
		$this->ssgst = new DbField('view_pharmacy_report_stock_value', 'view_pharmacy_report_stock_value', 'x_ssgst', 'ssgst', '`ssgst`', '`ssgst`', 131, -1, FALSE, '`ssgst`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ssgst->Sortable = TRUE; // Allow sort
		$this->ssgst->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['ssgst'] = &$this->ssgst;

		// scgst
		$this->scgst = new DbField('view_pharmacy_report_stock_value', 'view_pharmacy_report_stock_value', 'x_scgst', 'scgst', '`scgst`', '`scgst`', 131, -1, FALSE, '`scgst`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->scgst->Sortable = TRUE; // Allow sort
		$this->scgst->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['scgst'] = &$this->scgst;

		// stockvalue
		$this->stockvalue = new DbField('view_pharmacy_report_stock_value', 'view_pharmacy_report_stock_value', 'x_stockvalue', 'stockvalue', '`stockvalue`', '`stockvalue`', 131, -1, FALSE, '`stockvalue`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->stockvalue->Sortable = FALSE; // Allow sort
		$this->stockvalue->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['stockvalue'] = &$this->stockvalue;

		// stockvalue1
		$this->stockvalue1 = new DbField('view_pharmacy_report_stock_value', 'view_pharmacy_report_stock_value', 'x_stockvalue1', 'stockvalue1', '(stock/PUnit) * ( PurValue + (( PurValue /100 ) * (ssgst + scgst)) )', '(stock/PUnit) * ( PurValue + (( PurValue /100 ) * (ssgst + scgst)) )', 131, -1, FALSE, '(stock/PUnit) * ( PurValue + (( PurValue /100 ) * (ssgst + scgst)) )', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->stockvalue1->IsCustom = TRUE; // Custom field
		$this->stockvalue1->Sortable = TRUE; // Allow sort
		$this->stockvalue1->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['stockvalue1'] = &$this->stockvalue1;

		// brcode
		$this->brcode = new DbField('view_pharmacy_report_stock_value', 'view_pharmacy_report_stock_value', 'x_brcode', 'brcode', '`brcode`', '`brcode`', 3, -1, FALSE, '`brcode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->brcode->Sortable = FALSE; // Allow sort
		$this->brcode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['brcode'] = &$this->brcode;

		// hospid
		$this->hospid = new DbField('view_pharmacy_report_stock_value', 'view_pharmacy_report_stock_value', 'x_hospid', 'hospid', '`hospid`', '`hospid`', 3, -1, FALSE, '`hospid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hospid->Sortable = FALSE; // Allow sort
		$this->hospid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['hospid'] = &$this->hospid;

		// PUnit
		$this->PUnit = new DbField('view_pharmacy_report_stock_value', 'view_pharmacy_report_stock_value', 'x_PUnit', 'PUnit', '`PUnit`', '`PUnit`', 3, -1, FALSE, '`PUnit`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PUnit->Sortable = TRUE; // Allow sort
		$this->PUnit->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['PUnit'] = &$this->PUnit;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`view_pharmacy_report_stock_value`";
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
		return ($this->SqlSelect <> "") ? $this->SqlSelect : "SELECT *, PurValue + (( PurValue /100 ) * (ssgst + scgst)) AS `PurValue1`, (stock/PUnit) * ( PurValue + (( PurValue /100 ) * (ssgst + scgst)) ) AS `stockvalue1` FROM " . $this->getSqlFrom();
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
		$this->TableFilter = "`hospid`='".HospitalID()."'  and  `brcode`='".PharmacyID()."'";
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
		$this->DES->DbValue = $row['DES'];
		$this->Batch->DbValue = $row['Batch'];
		$this->MFRCODE->DbValue = $row['MFRCODE'];
		$this->stock->DbValue = $row['stock'];
		$this->Mrp->DbValue = $row['Mrp'];
		$this->PurValue->DbValue = $row['PurValue'];
		$this->PurValue1->DbValue = $row['PurValue1'];
		$this->ssgst->DbValue = $row['ssgst'];
		$this->scgst->DbValue = $row['scgst'];
		$this->stockvalue->DbValue = $row['stockvalue'];
		$this->stockvalue1->DbValue = $row['stockvalue1'];
		$this->brcode->DbValue = $row['brcode'];
		$this->hospid->DbValue = $row['hospid'];
		$this->PUnit->DbValue = $row['PUnit'];
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
			return "view_pharmacy_report_stock_valuelist.php";
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
		if ($pageName == "view_pharmacy_report_stock_valueview.php")
			return $Language->phrase("View");
		elseif ($pageName == "view_pharmacy_report_stock_valueedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "view_pharmacy_report_stock_valueadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "view_pharmacy_report_stock_valuelist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("view_pharmacy_report_stock_valueview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_pharmacy_report_stock_valueview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "view_pharmacy_report_stock_valueadd.php?" . $this->getUrlParm($parm);
		else
			$url = "view_pharmacy_report_stock_valueadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("view_pharmacy_report_stock_valueedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("view_pharmacy_report_stock_valueadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("view_pharmacy_report_stock_valuedelete.php", $this->getUrlParm());
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
		$this->DES->setDbValue($rs->fields('DES'));
		$this->Batch->setDbValue($rs->fields('Batch'));
		$this->MFRCODE->setDbValue($rs->fields('MFRCODE'));
		$this->stock->setDbValue($rs->fields('stock'));
		$this->Mrp->setDbValue($rs->fields('Mrp'));
		$this->PurValue->setDbValue($rs->fields('PurValue'));
		$this->PurValue1->setDbValue($rs->fields('PurValue1'));
		$this->ssgst->setDbValue($rs->fields('ssgst'));
		$this->scgst->setDbValue($rs->fields('scgst'));
		$this->stockvalue->setDbValue($rs->fields('stockvalue'));
		$this->stockvalue1->setDbValue($rs->fields('stockvalue1'));
		$this->brcode->setDbValue($rs->fields('brcode'));
		$this->hospid->setDbValue($rs->fields('hospid'));
		$this->PUnit->setDbValue($rs->fields('PUnit'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// PRC
		// DES
		// Batch
		// MFRCODE
		// stock
		// Mrp
		// PurValue
		// PurValue1
		// ssgst
		// scgst
		// stockvalue
		// stockvalue1
		// brcode
		// hospid
		// PUnit
		// PRC

		$this->PRC->ViewValue = $this->PRC->CurrentValue;
		$this->PRC->ViewCustomAttributes = "";

		// DES
		$this->DES->ViewValue = $this->DES->CurrentValue;
		$this->DES->ViewCustomAttributes = "";

		// Batch
		$this->Batch->ViewValue = $this->Batch->CurrentValue;
		$this->Batch->ViewCustomAttributes = "";

		// MFRCODE
		$this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
		$this->MFRCODE->ViewCustomAttributes = "";

		// stock
		$this->stock->ViewValue = $this->stock->CurrentValue;
		$this->stock->ViewValue = FormatNumber($this->stock->ViewValue, 0, -2, -2, -2);
		$this->stock->ViewCustomAttributes = "";

		// Mrp
		$this->Mrp->ViewValue = $this->Mrp->CurrentValue;
		$this->Mrp->ViewValue = FormatNumber($this->Mrp->ViewValue, 2, -2, -2, -2);
		$this->Mrp->ViewCustomAttributes = "";

		// PurValue
		$this->PurValue->ViewValue = $this->PurValue->CurrentValue;
		$this->PurValue->ViewValue = FormatNumber($this->PurValue->ViewValue, 2, -2, -2, -2);
		$this->PurValue->ViewCustomAttributes = "";

		// PurValue1
		$this->PurValue1->ViewValue = $this->PurValue1->CurrentValue;
		$this->PurValue1->ViewValue = FormatNumber($this->PurValue1->ViewValue, 2, -2, -2, -2);
		$this->PurValue1->ViewCustomAttributes = "";

		// ssgst
		$this->ssgst->ViewValue = $this->ssgst->CurrentValue;
		$this->ssgst->ViewValue = FormatNumber($this->ssgst->ViewValue, 2, -2, -2, -2);
		$this->ssgst->ViewCustomAttributes = "";

		// scgst
		$this->scgst->ViewValue = $this->scgst->CurrentValue;
		$this->scgst->ViewValue = FormatNumber($this->scgst->ViewValue, 2, -2, -2, -2);
		$this->scgst->ViewCustomAttributes = "";

		// stockvalue
		$this->stockvalue->ViewValue = $this->stockvalue->CurrentValue;
		$this->stockvalue->ViewValue = FormatNumber($this->stockvalue->ViewValue, 2, -2, -2, -2);
		$this->stockvalue->ViewCustomAttributes = "";

		// stockvalue1
		$this->stockvalue1->ViewValue = $this->stockvalue1->CurrentValue;
		$this->stockvalue1->ViewValue = FormatNumber($this->stockvalue1->ViewValue, 2, -2, -2, -2);
		$this->stockvalue1->ViewCustomAttributes = "";

		// brcode
		$this->brcode->ViewValue = $this->brcode->CurrentValue;
		$this->brcode->ViewValue = FormatNumber($this->brcode->ViewValue, 0, -2, -2, -2);
		$this->brcode->ViewCustomAttributes = "";

		// hospid
		$this->hospid->ViewValue = $this->hospid->CurrentValue;
		$this->hospid->ViewValue = FormatNumber($this->hospid->ViewValue, 0, -2, -2, -2);
		$this->hospid->ViewCustomAttributes = "";

		// PUnit
		$this->PUnit->ViewValue = $this->PUnit->CurrentValue;
		$this->PUnit->ViewValue = FormatNumber($this->PUnit->ViewValue, 0, -2, -2, -2);
		$this->PUnit->ViewCustomAttributes = "";

		// PRC
		$this->PRC->LinkCustomAttributes = "";
		$this->PRC->HrefValue = "";
		$this->PRC->TooltipValue = "";

		// DES
		$this->DES->LinkCustomAttributes = "";
		$this->DES->HrefValue = "";
		$this->DES->TooltipValue = "";

		// Batch
		$this->Batch->LinkCustomAttributes = "";
		$this->Batch->HrefValue = "";
		$this->Batch->TooltipValue = "";

		// MFRCODE
		$this->MFRCODE->LinkCustomAttributes = "";
		$this->MFRCODE->HrefValue = "";
		$this->MFRCODE->TooltipValue = "";

		// stock
		$this->stock->LinkCustomAttributes = "";
		$this->stock->HrefValue = "";
		$this->stock->TooltipValue = "";

		// Mrp
		$this->Mrp->LinkCustomAttributes = "";
		$this->Mrp->HrefValue = "";
		$this->Mrp->TooltipValue = "";

		// PurValue
		$this->PurValue->LinkCustomAttributes = "";
		$this->PurValue->HrefValue = "";
		$this->PurValue->TooltipValue = "";

		// PurValue1
		$this->PurValue1->LinkCustomAttributes = "";
		$this->PurValue1->HrefValue = "";
		$this->PurValue1->TooltipValue = "";

		// ssgst
		$this->ssgst->LinkCustomAttributes = "";
		$this->ssgst->HrefValue = "";
		$this->ssgst->TooltipValue = "";

		// scgst
		$this->scgst->LinkCustomAttributes = "";
		$this->scgst->HrefValue = "";
		$this->scgst->TooltipValue = "";

		// stockvalue
		$this->stockvalue->LinkCustomAttributes = "";
		$this->stockvalue->HrefValue = "";
		$this->stockvalue->TooltipValue = "";

		// stockvalue1
		$this->stockvalue1->LinkCustomAttributes = "";
		$this->stockvalue1->HrefValue = "";
		$this->stockvalue1->TooltipValue = "";

		// brcode
		$this->brcode->LinkCustomAttributes = "";
		$this->brcode->HrefValue = "";
		$this->brcode->TooltipValue = "";

		// hospid
		$this->hospid->LinkCustomAttributes = "";
		$this->hospid->HrefValue = "";
		$this->hospid->TooltipValue = "";

		// PUnit
		$this->PUnit->LinkCustomAttributes = "";
		$this->PUnit->HrefValue = "";
		$this->PUnit->TooltipValue = "";

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

		// DES
		$this->DES->EditAttrs["class"] = "form-control";
		$this->DES->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->DES->CurrentValue = HtmlDecode($this->DES->CurrentValue);
		$this->DES->EditValue = $this->DES->CurrentValue;
		$this->DES->PlaceHolder = RemoveHtml($this->DES->caption());

		// Batch
		$this->Batch->EditAttrs["class"] = "form-control";
		$this->Batch->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Batch->CurrentValue = HtmlDecode($this->Batch->CurrentValue);
		$this->Batch->EditValue = $this->Batch->CurrentValue;
		$this->Batch->PlaceHolder = RemoveHtml($this->Batch->caption());

		// MFRCODE
		$this->MFRCODE->EditAttrs["class"] = "form-control";
		$this->MFRCODE->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->MFRCODE->CurrentValue = HtmlDecode($this->MFRCODE->CurrentValue);
		$this->MFRCODE->EditValue = $this->MFRCODE->CurrentValue;
		$this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

		// stock
		$this->stock->EditAttrs["class"] = "form-control";
		$this->stock->EditCustomAttributes = "";
		$this->stock->EditValue = $this->stock->CurrentValue;
		$this->stock->PlaceHolder = RemoveHtml($this->stock->caption());

		// Mrp
		$this->Mrp->EditAttrs["class"] = "form-control";
		$this->Mrp->EditCustomAttributes = "";
		$this->Mrp->EditValue = $this->Mrp->CurrentValue;
		$this->Mrp->PlaceHolder = RemoveHtml($this->Mrp->caption());
		if (strval($this->Mrp->EditValue) <> "" && is_numeric($this->Mrp->EditValue))
			$this->Mrp->EditValue = FormatNumber($this->Mrp->EditValue, -2, -2, -2, -2);

		// PurValue
		$this->PurValue->EditAttrs["class"] = "form-control";
		$this->PurValue->EditCustomAttributes = "";
		$this->PurValue->EditValue = $this->PurValue->CurrentValue;
		$this->PurValue->PlaceHolder = RemoveHtml($this->PurValue->caption());
		if (strval($this->PurValue->EditValue) <> "" && is_numeric($this->PurValue->EditValue))
			$this->PurValue->EditValue = FormatNumber($this->PurValue->EditValue, -2, -2, -2, -2);

		// PurValue1
		$this->PurValue1->EditAttrs["class"] = "form-control";
		$this->PurValue1->EditCustomAttributes = "";
		$this->PurValue1->EditValue = $this->PurValue1->CurrentValue;
		$this->PurValue1->PlaceHolder = RemoveHtml($this->PurValue1->caption());
		if (strval($this->PurValue1->EditValue) <> "" && is_numeric($this->PurValue1->EditValue))
			$this->PurValue1->EditValue = FormatNumber($this->PurValue1->EditValue, -2, -2, -2, -2);

		// ssgst
		$this->ssgst->EditAttrs["class"] = "form-control";
		$this->ssgst->EditCustomAttributes = "";
		$this->ssgst->EditValue = $this->ssgst->CurrentValue;
		$this->ssgst->PlaceHolder = RemoveHtml($this->ssgst->caption());
		if (strval($this->ssgst->EditValue) <> "" && is_numeric($this->ssgst->EditValue))
			$this->ssgst->EditValue = FormatNumber($this->ssgst->EditValue, -2, -2, -2, -2);

		// scgst
		$this->scgst->EditAttrs["class"] = "form-control";
		$this->scgst->EditCustomAttributes = "";
		$this->scgst->EditValue = $this->scgst->CurrentValue;
		$this->scgst->PlaceHolder = RemoveHtml($this->scgst->caption());
		if (strval($this->scgst->EditValue) <> "" && is_numeric($this->scgst->EditValue))
			$this->scgst->EditValue = FormatNumber($this->scgst->EditValue, -2, -2, -2, -2);

		// stockvalue
		$this->stockvalue->EditAttrs["class"] = "form-control";
		$this->stockvalue->EditCustomAttributes = "";
		$this->stockvalue->EditValue = $this->stockvalue->CurrentValue;
		$this->stockvalue->PlaceHolder = RemoveHtml($this->stockvalue->caption());
		if (strval($this->stockvalue->EditValue) <> "" && is_numeric($this->stockvalue->EditValue))
			$this->stockvalue->EditValue = FormatNumber($this->stockvalue->EditValue, -2, -2, -2, -2);

		// stockvalue1
		$this->stockvalue1->EditAttrs["class"] = "form-control";
		$this->stockvalue1->EditCustomAttributes = "";
		$this->stockvalue1->EditValue = $this->stockvalue1->CurrentValue;
		$this->stockvalue1->PlaceHolder = RemoveHtml($this->stockvalue1->caption());
		if (strval($this->stockvalue1->EditValue) <> "" && is_numeric($this->stockvalue1->EditValue))
			$this->stockvalue1->EditValue = FormatNumber($this->stockvalue1->EditValue, -2, -2, -2, -2);

		// brcode
		$this->brcode->EditAttrs["class"] = "form-control";
		$this->brcode->EditCustomAttributes = "";
		$this->brcode->EditValue = $this->brcode->CurrentValue;
		$this->brcode->PlaceHolder = RemoveHtml($this->brcode->caption());

		// hospid
		$this->hospid->EditAttrs["class"] = "form-control";
		$this->hospid->EditCustomAttributes = "";
		$this->hospid->EditValue = $this->hospid->CurrentValue;
		$this->hospid->PlaceHolder = RemoveHtml($this->hospid->caption());

		// PUnit
		$this->PUnit->EditAttrs["class"] = "form-control";
		$this->PUnit->EditCustomAttributes = "";
		$this->PUnit->EditValue = $this->PUnit->CurrentValue;
		$this->PUnit->PlaceHolder = RemoveHtml($this->PUnit->caption());

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	public function aggregateListRowValues()
	{
			if (is_numeric($this->PurValue->CurrentValue))
				$this->PurValue->Total += $this->PurValue->CurrentValue; // Accumulate total
			if (is_numeric($this->PurValue1->CurrentValue))
				$this->PurValue1->Total += $this->PurValue1->CurrentValue; // Accumulate total
			if (is_numeric($this->stockvalue->CurrentValue))
				$this->stockvalue->Total += $this->stockvalue->CurrentValue; // Accumulate total
			if (is_numeric($this->stockvalue1->CurrentValue))
				$this->stockvalue1->Total += $this->stockvalue1->CurrentValue; // Accumulate total
	}

	// Aggregate list row (for rendering)
	public function aggregateListRow()
	{
			$this->PurValue->CurrentValue = $this->PurValue->Total;
			$this->PurValue->ViewValue = $this->PurValue->CurrentValue;
			$this->PurValue->ViewValue = FormatNumber($this->PurValue->ViewValue, 2, -2, -2, -2);
			$this->PurValue->ViewCustomAttributes = "";
			$this->PurValue->HrefValue = ""; // Clear href value
			$this->PurValue1->CurrentValue = $this->PurValue1->Total;
			$this->PurValue1->ViewValue = $this->PurValue1->CurrentValue;
			$this->PurValue1->ViewValue = FormatNumber($this->PurValue1->ViewValue, 2, -2, -2, -2);
			$this->PurValue1->ViewCustomAttributes = "";
			$this->PurValue1->HrefValue = ""; // Clear href value
			$this->stockvalue->CurrentValue = $this->stockvalue->Total;
			$this->stockvalue->ViewValue = $this->stockvalue->CurrentValue;
			$this->stockvalue->ViewValue = FormatNumber($this->stockvalue->ViewValue, 2, -2, -2, -2);
			$this->stockvalue->ViewCustomAttributes = "";
			$this->stockvalue->HrefValue = ""; // Clear href value
			$this->stockvalue1->CurrentValue = $this->stockvalue1->Total;
			$this->stockvalue1->ViewValue = $this->stockvalue1->CurrentValue;
			$this->stockvalue1->ViewValue = FormatNumber($this->stockvalue1->ViewValue, 2, -2, -2, -2);
			$this->stockvalue1->ViewCustomAttributes = "";
			$this->stockvalue1->HrefValue = ""; // Clear href value

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
					$doc->exportCaption($this->DES);
					$doc->exportCaption($this->Batch);
					$doc->exportCaption($this->MFRCODE);
					$doc->exportCaption($this->stock);
					$doc->exportCaption($this->Mrp);
					$doc->exportCaption($this->PurValue);
					$doc->exportCaption($this->PurValue1);
					$doc->exportCaption($this->ssgst);
					$doc->exportCaption($this->scgst);
					$doc->exportCaption($this->stockvalue);
					$doc->exportCaption($this->stockvalue1);
					$doc->exportCaption($this->brcode);
					$doc->exportCaption($this->hospid);
					$doc->exportCaption($this->PUnit);
				} else {
					$doc->exportCaption($this->PRC);
					$doc->exportCaption($this->DES);
					$doc->exportCaption($this->Batch);
					$doc->exportCaption($this->MFRCODE);
					$doc->exportCaption($this->stock);
					$doc->exportCaption($this->Mrp);
					$doc->exportCaption($this->PurValue1);
					$doc->exportCaption($this->ssgst);
					$doc->exportCaption($this->scgst);
					$doc->exportCaption($this->stockvalue1);
					$doc->exportCaption($this->PUnit);
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
				$this->aggregateListRowValues(); // Aggregate row values

				// Render row
				$this->RowType = ROWTYPE_VIEW; // Render view
				$this->resetAttributes();
				$this->renderListRow();
				if (!$doc->ExportCustom) {
					$doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
					if ($exportPageType == "view") {
						$doc->exportField($this->PRC);
						$doc->exportField($this->DES);
						$doc->exportField($this->Batch);
						$doc->exportField($this->MFRCODE);
						$doc->exportField($this->stock);
						$doc->exportField($this->Mrp);
						$doc->exportField($this->PurValue);
						$doc->exportField($this->PurValue1);
						$doc->exportField($this->ssgst);
						$doc->exportField($this->scgst);
						$doc->exportField($this->stockvalue);
						$doc->exportField($this->stockvalue1);
						$doc->exportField($this->brcode);
						$doc->exportField($this->hospid);
						$doc->exportField($this->PUnit);
					} else {
						$doc->exportField($this->PRC);
						$doc->exportField($this->DES);
						$doc->exportField($this->Batch);
						$doc->exportField($this->MFRCODE);
						$doc->exportField($this->stock);
						$doc->exportField($this->Mrp);
						$doc->exportField($this->PurValue1);
						$doc->exportField($this->ssgst);
						$doc->exportField($this->scgst);
						$doc->exportField($this->stockvalue1);
						$doc->exportField($this->PUnit);
					}
					$doc->endExportRow($rowCnt);
				}
			}

			// Call Row Export server event
			if ($doc->ExportCustom)
				$this->Row_Export($recordset->fields);
			$recordset->moveNext();
		}

		// Export aggregates (horizontal format only)
		if ($doc->Horizontal) {
			$this->RowType = ROWTYPE_AGGREGATE;
			$this->resetAttributes();
			$this->aggregateListRow();
			if (!$doc->ExportCustom) {
				$doc->beginExportRow(-1);
				$doc->exportAggregate($this->PRC, '');
				$doc->exportAggregate($this->DES, '');
				$doc->exportAggregate($this->Batch, '');
				$doc->exportAggregate($this->MFRCODE, '');
				$doc->exportAggregate($this->stock, '');
				$doc->exportAggregate($this->Mrp, '');
				$doc->exportAggregate($this->PurValue1, 'TOTAL');
				$doc->exportAggregate($this->ssgst, '');
				$doc->exportAggregate($this->scgst, '');
				$doc->exportAggregate($this->stockvalue1, 'TOTAL');
				$doc->exportAggregate($this->PUnit, '');
				$doc->endExportRow();
			}
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