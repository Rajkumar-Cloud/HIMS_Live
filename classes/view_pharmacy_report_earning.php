<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for view_pharmacy_report_earning
 */
class view_pharmacy_report_earning extends DbTable
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
	public $ProductCode;
	public $ProductName;
	public $SaleQuantity;
	public $RT;
	public $SaleValue;
	public $PurRate;
	public $PurchaseCostValue;
	public $MarginAmount;
	public $MarginOnSale;
	public $MarginOnCost;
	public $PurchaseCostValue1;
	public $MarginAmount1;
	public $MarginOnSale1;
	public $MarginOnCost1;
	public $Date;
	public $BRCODE;
	public $HosoID;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'view_pharmacy_report_earning';
		$this->TableName = 'view_pharmacy_report_earning';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`view_pharmacy_report_earning`";
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

		// ProductCode
		$this->ProductCode = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_ProductCode', 'ProductCode', '`ProductCode`', '`ProductCode`', 200, -1, FALSE, '`ProductCode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ProductCode->Sortable = TRUE; // Allow sort
		$this->fields['ProductCode'] = &$this->ProductCode;

		// ProductName
		$this->ProductName = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_ProductName', 'ProductName', '`ProductName`', '`ProductName`', 200, -1, FALSE, '`ProductName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ProductName->Sortable = TRUE; // Allow sort
		$this->fields['ProductName'] = &$this->ProductName;

		// SaleQuantity
		$this->SaleQuantity = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_SaleQuantity', 'SaleQuantity', '`SaleQuantity`', '`SaleQuantity`', 131, -1, FALSE, '`SaleQuantity`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SaleQuantity->Sortable = TRUE; // Allow sort
		$this->SaleQuantity->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['SaleQuantity'] = &$this->SaleQuantity;

		// RT
		$this->RT = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_RT', 'RT', '`RT`', '`RT`', 131, -1, FALSE, '`RT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RT->Sortable = TRUE; // Allow sort
		$this->RT->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['RT'] = &$this->RT;

		// SaleValue
		$this->SaleValue = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_SaleValue', 'SaleValue', '`SaleValue`', '`SaleValue`', 131, -1, FALSE, '`SaleValue`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SaleValue->Sortable = TRUE; // Allow sort
		$this->SaleValue->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['SaleValue'] = &$this->SaleValue;

		// PurRate
		$this->PurRate = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_PurRate', 'PurRate', '`PurRate`', '`PurRate`', 131, -1, FALSE, '`PurRate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PurRate->Sortable = TRUE; // Allow sort
		$this->PurRate->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PurRate'] = &$this->PurRate;

		// PurchaseCostValue
		$this->PurchaseCostValue = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_PurchaseCostValue', 'PurchaseCostValue', '`PurchaseCostValue`', '`PurchaseCostValue`', 131, -1, FALSE, '`PurchaseCostValue`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PurchaseCostValue->Sortable = FALSE; // Allow sort
		$this->PurchaseCostValue->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PurchaseCostValue'] = &$this->PurchaseCostValue;

		// MarginAmount
		$this->MarginAmount = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_MarginAmount', 'MarginAmount', '`MarginAmount`', '`MarginAmount`', 131, -1, FALSE, '`MarginAmount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MarginAmount->Sortable = FALSE; // Allow sort
		$this->MarginAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['MarginAmount'] = &$this->MarginAmount;

		// MarginOnSale
		$this->MarginOnSale = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_MarginOnSale', 'MarginOnSale', '`MarginOnSale`', '`MarginOnSale`', 131, -1, FALSE, '`MarginOnSale`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MarginOnSale->Sortable = FALSE; // Allow sort
		$this->MarginOnSale->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['MarginOnSale'] = &$this->MarginOnSale;

		// MarginOnCost
		$this->MarginOnCost = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_MarginOnCost', 'MarginOnCost', '`MarginOnCost`', '`MarginOnCost`', 131, -1, FALSE, '`MarginOnCost`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MarginOnCost->Sortable = FALSE; // Allow sort
		$this->MarginOnCost->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['MarginOnCost'] = &$this->MarginOnCost;

		// PurchaseCostValue1
		$this->PurchaseCostValue1 = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_PurchaseCostValue1', 'PurchaseCostValue1', 'SaleQuantity*PurRate', 'SaleQuantity*PurRate', 131, -1, FALSE, 'SaleQuantity*PurRate', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PurchaseCostValue1->IsCustom = TRUE; // Custom field
		$this->PurchaseCostValue1->Sortable = TRUE; // Allow sort
		$this->PurchaseCostValue1->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PurchaseCostValue1'] = &$this->PurchaseCostValue1;

		// MarginAmount1
		$this->MarginAmount1 = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_MarginAmount1', 'MarginAmount1', 'SaleValue-(SaleQuantity * PurRate)', 'SaleValue-(SaleQuantity * PurRate)', 131, -1, FALSE, 'SaleValue-(SaleQuantity * PurRate)', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MarginAmount1->IsCustom = TRUE; // Custom field
		$this->MarginAmount1->Sortable = TRUE; // Allow sort
		$this->MarginAmount1->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['MarginAmount1'] = &$this->MarginAmount1;

		// MarginOnSale1
		$this->MarginOnSale1 = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_MarginOnSale1', 'MarginOnSale1', '((SaleValue-(SaleQuantity * PurRate))/SaleValue)*100', '((SaleValue-(SaleQuantity * PurRate))/SaleValue)*100', 131, -1, FALSE, '((SaleValue-(SaleQuantity * PurRate))/SaleValue)*100', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MarginOnSale1->IsCustom = TRUE; // Custom field
		$this->MarginOnSale1->Sortable = TRUE; // Allow sort
		$this->MarginOnSale1->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['MarginOnSale1'] = &$this->MarginOnSale1;

		// MarginOnCost1
		$this->MarginOnCost1 = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_MarginOnCost1', 'MarginOnCost1', '((SaleValue-(SaleQuantity * PurRate))/(SaleQuantity*PurRate ))*100', '((SaleValue-(SaleQuantity * PurRate))/(SaleQuantity*PurRate ))*100', 131, -1, FALSE, '((SaleValue-(SaleQuantity * PurRate))/(SaleQuantity*PurRate ))*100', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MarginOnCost1->IsCustom = TRUE; // Custom field
		$this->MarginOnCost1->Sortable = TRUE; // Allow sort
		$this->MarginOnCost1->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['MarginOnCost1'] = &$this->MarginOnCost1;

		// Date
		$this->Date = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_Date', 'Date', '`Date`', CastDateFieldForLike('`Date`', 0, "DB"), 133, 0, FALSE, '`Date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Date->Sortable = TRUE; // Allow sort
		$this->Date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['Date'] = &$this->Date;

		// BRCODE
		$this->BRCODE = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_BRCODE', 'BRCODE', '`BRCODE`', '`BRCODE`', 3, -1, FALSE, '`BRCODE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BRCODE->Sortable = TRUE; // Allow sort
		$this->BRCODE->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['BRCODE'] = &$this->BRCODE;

		// HosoID
		$this->HosoID = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_HosoID', 'HosoID', '`HosoID`', '`HosoID`', 3, -1, FALSE, '`HosoID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`view_pharmacy_report_earning`";
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
		return ($this->SqlSelect <> "") ? $this->SqlSelect : "SELECT *, SaleQuantity*PurRate AS `PurchaseCostValue1`, SaleValue-(SaleQuantity * PurRate) AS `MarginAmount1`, ((SaleValue-(SaleQuantity * PurRate))/SaleValue)*100 AS `MarginOnSale1`, ((SaleValue-(SaleQuantity * PurRate))/(SaleQuantity*PurRate ))*100 AS `MarginOnCost1` FROM " . $this->getSqlFrom();
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
		$this->TableFilter = "`HosoID`='".HospitalID()."'  and  `BRCODE`='".PharmacyID()."'";
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
		$this->ProductCode->DbValue = $row['ProductCode'];
		$this->ProductName->DbValue = $row['ProductName'];
		$this->SaleQuantity->DbValue = $row['SaleQuantity'];
		$this->RT->DbValue = $row['RT'];
		$this->SaleValue->DbValue = $row['SaleValue'];
		$this->PurRate->DbValue = $row['PurRate'];
		$this->PurchaseCostValue->DbValue = $row['PurchaseCostValue'];
		$this->MarginAmount->DbValue = $row['MarginAmount'];
		$this->MarginOnSale->DbValue = $row['MarginOnSale'];
		$this->MarginOnCost->DbValue = $row['MarginOnCost'];
		$this->PurchaseCostValue1->DbValue = $row['PurchaseCostValue1'];
		$this->MarginAmount1->DbValue = $row['MarginAmount1'];
		$this->MarginOnSale1->DbValue = $row['MarginOnSale1'];
		$this->MarginOnCost1->DbValue = $row['MarginOnCost1'];
		$this->Date->DbValue = $row['Date'];
		$this->BRCODE->DbValue = $row['BRCODE'];
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
		$name = PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_RETURN_URL;

		// Get referer URL automatically
		if (ServerVar("HTTP_REFERER") <> "" && ReferPageName() <> CurrentPageName() && ReferPageName() <> "login.php") // Referer not same page or login page
			$_SESSION[$name] = ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] <> "") {
			return $_SESSION[$name];
		} else {
			return "view_pharmacy_report_earninglist.php";
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
		if ($pageName == "view_pharmacy_report_earningview.php")
			return $Language->phrase("View");
		elseif ($pageName == "view_pharmacy_report_earningedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "view_pharmacy_report_earningadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "view_pharmacy_report_earninglist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("view_pharmacy_report_earningview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_pharmacy_report_earningview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "view_pharmacy_report_earningadd.php?" . $this->getUrlParm($parm);
		else
			$url = "view_pharmacy_report_earningadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("view_pharmacy_report_earningedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("view_pharmacy_report_earningadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("view_pharmacy_report_earningdelete.php", $this->getUrlParm());
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
		$this->ProductCode->setDbValue($rs->fields('ProductCode'));
		$this->ProductName->setDbValue($rs->fields('ProductName'));
		$this->SaleQuantity->setDbValue($rs->fields('SaleQuantity'));
		$this->RT->setDbValue($rs->fields('RT'));
		$this->SaleValue->setDbValue($rs->fields('SaleValue'));
		$this->PurRate->setDbValue($rs->fields('PurRate'));
		$this->PurchaseCostValue->setDbValue($rs->fields('PurchaseCostValue'));
		$this->MarginAmount->setDbValue($rs->fields('MarginAmount'));
		$this->MarginOnSale->setDbValue($rs->fields('MarginOnSale'));
		$this->MarginOnCost->setDbValue($rs->fields('MarginOnCost'));
		$this->PurchaseCostValue1->setDbValue($rs->fields('PurchaseCostValue1'));
		$this->MarginAmount1->setDbValue($rs->fields('MarginAmount1'));
		$this->MarginOnSale1->setDbValue($rs->fields('MarginOnSale1'));
		$this->MarginOnCost1->setDbValue($rs->fields('MarginOnCost1'));
		$this->Date->setDbValue($rs->fields('Date'));
		$this->BRCODE->setDbValue($rs->fields('BRCODE'));
		$this->HosoID->setDbValue($rs->fields('HosoID'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// ProductCode
		// ProductName
		// SaleQuantity
		// RT
		// SaleValue
		// PurRate
		// PurchaseCostValue
		// MarginAmount
		// MarginOnSale
		// MarginOnCost
		// PurchaseCostValue1
		// MarginAmount1
		// MarginOnSale1
		// MarginOnCost1
		// Date
		// BRCODE
		// HosoID
		// ProductCode

		$this->ProductCode->ViewValue = $this->ProductCode->CurrentValue;
		$this->ProductCode->ViewCustomAttributes = "";

		// ProductName
		$this->ProductName->ViewValue = $this->ProductName->CurrentValue;
		$this->ProductName->ViewCustomAttributes = "";

		// SaleQuantity
		$this->SaleQuantity->ViewValue = $this->SaleQuantity->CurrentValue;
		$this->SaleQuantity->ViewValue = FormatNumber($this->SaleQuantity->ViewValue, 2, -2, -2, -2);
		$this->SaleQuantity->ViewCustomAttributes = "";

		// RT
		$this->RT->ViewValue = $this->RT->CurrentValue;
		$this->RT->ViewValue = FormatNumber($this->RT->ViewValue, 2, -2, -2, -2);
		$this->RT->ViewCustomAttributes = "";

		// SaleValue
		$this->SaleValue->ViewValue = $this->SaleValue->CurrentValue;
		$this->SaleValue->ViewValue = FormatNumber($this->SaleValue->ViewValue, 2, -2, -2, -2);
		$this->SaleValue->ViewCustomAttributes = "";

		// PurRate
		$this->PurRate->ViewValue = $this->PurRate->CurrentValue;
		$this->PurRate->ViewValue = FormatNumber($this->PurRate->ViewValue, 2, -2, -2, -2);
		$this->PurRate->ViewCustomAttributes = "";

		// PurchaseCostValue
		$this->PurchaseCostValue->ViewValue = $this->PurchaseCostValue->CurrentValue;
		$this->PurchaseCostValue->ViewValue = FormatNumber($this->PurchaseCostValue->ViewValue, 2, -2, -2, -2);
		$this->PurchaseCostValue->ViewCustomAttributes = "";

		// MarginAmount
		$this->MarginAmount->ViewValue = $this->MarginAmount->CurrentValue;
		$this->MarginAmount->ViewValue = FormatNumber($this->MarginAmount->ViewValue, 2, -2, -2, -2);
		$this->MarginAmount->ViewCustomAttributes = "";

		// MarginOnSale
		$this->MarginOnSale->ViewValue = $this->MarginOnSale->CurrentValue;
		$this->MarginOnSale->ViewValue = FormatNumber($this->MarginOnSale->ViewValue, 2, -2, -2, -2);
		$this->MarginOnSale->ViewCustomAttributes = "";

		// MarginOnCost
		$this->MarginOnCost->ViewValue = $this->MarginOnCost->CurrentValue;
		$this->MarginOnCost->ViewValue = FormatNumber($this->MarginOnCost->ViewValue, 2, -2, -2, -2);
		$this->MarginOnCost->ViewCustomAttributes = "";

		// PurchaseCostValue1
		$this->PurchaseCostValue1->ViewValue = $this->PurchaseCostValue1->CurrentValue;
		$this->PurchaseCostValue1->ViewValue = FormatNumber($this->PurchaseCostValue1->ViewValue, 2, -2, -2, -2);
		$this->PurchaseCostValue1->ViewCustomAttributes = "";

		// MarginAmount1
		$this->MarginAmount1->ViewValue = $this->MarginAmount1->CurrentValue;
		$this->MarginAmount1->ViewValue = FormatNumber($this->MarginAmount1->ViewValue, 2, -2, -2, -2);
		$this->MarginAmount1->ViewCustomAttributes = "";

		// MarginOnSale1
		$this->MarginOnSale1->ViewValue = $this->MarginOnSale1->CurrentValue;
		$this->MarginOnSale1->ViewValue = FormatNumber($this->MarginOnSale1->ViewValue, 2, -2, -2, -2);
		$this->MarginOnSale1->ViewCustomAttributes = "";

		// MarginOnCost1
		$this->MarginOnCost1->ViewValue = $this->MarginOnCost1->CurrentValue;
		$this->MarginOnCost1->ViewValue = FormatNumber($this->MarginOnCost1->ViewValue, 2, -2, -2, -2);
		$this->MarginOnCost1->ViewCustomAttributes = "";

		// Date
		$this->Date->ViewValue = $this->Date->CurrentValue;
		$this->Date->ViewValue = FormatDateTime($this->Date->ViewValue, 0);
		$this->Date->ViewCustomAttributes = "";

		// BRCODE
		$this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
		$this->BRCODE->ViewValue = FormatNumber($this->BRCODE->ViewValue, 0, -2, -2, -2);
		$this->BRCODE->ViewCustomAttributes = "";

		// HosoID
		$this->HosoID->ViewValue = $this->HosoID->CurrentValue;
		$this->HosoID->ViewValue = FormatNumber($this->HosoID->ViewValue, 0, -2, -2, -2);
		$this->HosoID->ViewCustomAttributes = "";

		// ProductCode
		$this->ProductCode->LinkCustomAttributes = "";
		$this->ProductCode->HrefValue = "";
		$this->ProductCode->TooltipValue = "";

		// ProductName
		$this->ProductName->LinkCustomAttributes = "";
		$this->ProductName->HrefValue = "";
		$this->ProductName->TooltipValue = "";

		// SaleQuantity
		$this->SaleQuantity->LinkCustomAttributes = "";
		$this->SaleQuantity->HrefValue = "";
		$this->SaleQuantity->TooltipValue = "";

		// RT
		$this->RT->LinkCustomAttributes = "";
		$this->RT->HrefValue = "";
		$this->RT->TooltipValue = "";

		// SaleValue
		$this->SaleValue->LinkCustomAttributes = "";
		$this->SaleValue->HrefValue = "";
		$this->SaleValue->TooltipValue = "";

		// PurRate
		$this->PurRate->LinkCustomAttributes = "";
		$this->PurRate->HrefValue = "";
		$this->PurRate->TooltipValue = "";

		// PurchaseCostValue
		$this->PurchaseCostValue->LinkCustomAttributes = "";
		$this->PurchaseCostValue->HrefValue = "";
		$this->PurchaseCostValue->TooltipValue = "";

		// MarginAmount
		$this->MarginAmount->LinkCustomAttributes = "";
		$this->MarginAmount->HrefValue = "";
		$this->MarginAmount->TooltipValue = "";

		// MarginOnSale
		$this->MarginOnSale->LinkCustomAttributes = "";
		$this->MarginOnSale->HrefValue = "";
		$this->MarginOnSale->TooltipValue = "";

		// MarginOnCost
		$this->MarginOnCost->LinkCustomAttributes = "";
		$this->MarginOnCost->HrefValue = "";
		$this->MarginOnCost->TooltipValue = "";

		// PurchaseCostValue1
		$this->PurchaseCostValue1->LinkCustomAttributes = "";
		$this->PurchaseCostValue1->HrefValue = "";
		$this->PurchaseCostValue1->TooltipValue = "";

		// MarginAmount1
		$this->MarginAmount1->LinkCustomAttributes = "";
		$this->MarginAmount1->HrefValue = "";
		$this->MarginAmount1->TooltipValue = "";

		// MarginOnSale1
		$this->MarginOnSale1->LinkCustomAttributes = "";
		$this->MarginOnSale1->HrefValue = "";
		$this->MarginOnSale1->TooltipValue = "";

		// MarginOnCost1
		$this->MarginOnCost1->LinkCustomAttributes = "";
		$this->MarginOnCost1->HrefValue = "";
		$this->MarginOnCost1->TooltipValue = "";

		// Date
		$this->Date->LinkCustomAttributes = "";
		$this->Date->HrefValue = "";
		$this->Date->TooltipValue = "";

		// BRCODE
		$this->BRCODE->LinkCustomAttributes = "";
		$this->BRCODE->HrefValue = "";
		$this->BRCODE->TooltipValue = "";

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

		// ProductCode
		$this->ProductCode->EditAttrs["class"] = "form-control";
		$this->ProductCode->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ProductCode->CurrentValue = HtmlDecode($this->ProductCode->CurrentValue);
		$this->ProductCode->EditValue = $this->ProductCode->CurrentValue;
		$this->ProductCode->PlaceHolder = RemoveHtml($this->ProductCode->caption());

		// ProductName
		$this->ProductName->EditAttrs["class"] = "form-control";
		$this->ProductName->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ProductName->CurrentValue = HtmlDecode($this->ProductName->CurrentValue);
		$this->ProductName->EditValue = $this->ProductName->CurrentValue;
		$this->ProductName->PlaceHolder = RemoveHtml($this->ProductName->caption());

		// SaleQuantity
		$this->SaleQuantity->EditAttrs["class"] = "form-control";
		$this->SaleQuantity->EditCustomAttributes = "";
		$this->SaleQuantity->EditValue = $this->SaleQuantity->CurrentValue;
		$this->SaleQuantity->PlaceHolder = RemoveHtml($this->SaleQuantity->caption());
		if (strval($this->SaleQuantity->EditValue) <> "" && is_numeric($this->SaleQuantity->EditValue))
			$this->SaleQuantity->EditValue = FormatNumber($this->SaleQuantity->EditValue, -2, -2, -2, -2);

		// RT
		$this->RT->EditAttrs["class"] = "form-control";
		$this->RT->EditCustomAttributes = "";
		$this->RT->EditValue = $this->RT->CurrentValue;
		$this->RT->PlaceHolder = RemoveHtml($this->RT->caption());
		if (strval($this->RT->EditValue) <> "" && is_numeric($this->RT->EditValue))
			$this->RT->EditValue = FormatNumber($this->RT->EditValue, -2, -2, -2, -2);

		// SaleValue
		$this->SaleValue->EditAttrs["class"] = "form-control";
		$this->SaleValue->EditCustomAttributes = "";
		$this->SaleValue->EditValue = $this->SaleValue->CurrentValue;
		$this->SaleValue->PlaceHolder = RemoveHtml($this->SaleValue->caption());
		if (strval($this->SaleValue->EditValue) <> "" && is_numeric($this->SaleValue->EditValue))
			$this->SaleValue->EditValue = FormatNumber($this->SaleValue->EditValue, -2, -2, -2, -2);

		// PurRate
		$this->PurRate->EditAttrs["class"] = "form-control";
		$this->PurRate->EditCustomAttributes = "";
		$this->PurRate->EditValue = $this->PurRate->CurrentValue;
		$this->PurRate->PlaceHolder = RemoveHtml($this->PurRate->caption());
		if (strval($this->PurRate->EditValue) <> "" && is_numeric($this->PurRate->EditValue))
			$this->PurRate->EditValue = FormatNumber($this->PurRate->EditValue, -2, -2, -2, -2);

		// PurchaseCostValue
		$this->PurchaseCostValue->EditAttrs["class"] = "form-control";
		$this->PurchaseCostValue->EditCustomAttributes = "";
		$this->PurchaseCostValue->EditValue = $this->PurchaseCostValue->CurrentValue;
		$this->PurchaseCostValue->PlaceHolder = RemoveHtml($this->PurchaseCostValue->caption());
		if (strval($this->PurchaseCostValue->EditValue) <> "" && is_numeric($this->PurchaseCostValue->EditValue))
			$this->PurchaseCostValue->EditValue = FormatNumber($this->PurchaseCostValue->EditValue, -2, -2, -2, -2);

		// MarginAmount
		$this->MarginAmount->EditAttrs["class"] = "form-control";
		$this->MarginAmount->EditCustomAttributes = "";
		$this->MarginAmount->EditValue = $this->MarginAmount->CurrentValue;
		$this->MarginAmount->PlaceHolder = RemoveHtml($this->MarginAmount->caption());
		if (strval($this->MarginAmount->EditValue) <> "" && is_numeric($this->MarginAmount->EditValue))
			$this->MarginAmount->EditValue = FormatNumber($this->MarginAmount->EditValue, -2, -2, -2, -2);

		// MarginOnSale
		$this->MarginOnSale->EditAttrs["class"] = "form-control";
		$this->MarginOnSale->EditCustomAttributes = "";
		$this->MarginOnSale->EditValue = $this->MarginOnSale->CurrentValue;
		$this->MarginOnSale->PlaceHolder = RemoveHtml($this->MarginOnSale->caption());
		if (strval($this->MarginOnSale->EditValue) <> "" && is_numeric($this->MarginOnSale->EditValue))
			$this->MarginOnSale->EditValue = FormatNumber($this->MarginOnSale->EditValue, -2, -2, -2, -2);

		// MarginOnCost
		$this->MarginOnCost->EditAttrs["class"] = "form-control";
		$this->MarginOnCost->EditCustomAttributes = "";
		$this->MarginOnCost->EditValue = $this->MarginOnCost->CurrentValue;
		$this->MarginOnCost->PlaceHolder = RemoveHtml($this->MarginOnCost->caption());
		if (strval($this->MarginOnCost->EditValue) <> "" && is_numeric($this->MarginOnCost->EditValue))
			$this->MarginOnCost->EditValue = FormatNumber($this->MarginOnCost->EditValue, -2, -2, -2, -2);

		// PurchaseCostValue1
		$this->PurchaseCostValue1->EditAttrs["class"] = "form-control";
		$this->PurchaseCostValue1->EditCustomAttributes = "";
		$this->PurchaseCostValue1->EditValue = $this->PurchaseCostValue1->CurrentValue;
		$this->PurchaseCostValue1->PlaceHolder = RemoveHtml($this->PurchaseCostValue1->caption());
		if (strval($this->PurchaseCostValue1->EditValue) <> "" && is_numeric($this->PurchaseCostValue1->EditValue))
			$this->PurchaseCostValue1->EditValue = FormatNumber($this->PurchaseCostValue1->EditValue, -2, -2, -2, -2);

		// MarginAmount1
		$this->MarginAmount1->EditAttrs["class"] = "form-control";
		$this->MarginAmount1->EditCustomAttributes = "";
		$this->MarginAmount1->EditValue = $this->MarginAmount1->CurrentValue;
		$this->MarginAmount1->PlaceHolder = RemoveHtml($this->MarginAmount1->caption());
		if (strval($this->MarginAmount1->EditValue) <> "" && is_numeric($this->MarginAmount1->EditValue))
			$this->MarginAmount1->EditValue = FormatNumber($this->MarginAmount1->EditValue, -2, -2, -2, -2);

		// MarginOnSale1
		$this->MarginOnSale1->EditAttrs["class"] = "form-control";
		$this->MarginOnSale1->EditCustomAttributes = "";
		$this->MarginOnSale1->EditValue = $this->MarginOnSale1->CurrentValue;
		$this->MarginOnSale1->PlaceHolder = RemoveHtml($this->MarginOnSale1->caption());
		if (strval($this->MarginOnSale1->EditValue) <> "" && is_numeric($this->MarginOnSale1->EditValue))
			$this->MarginOnSale1->EditValue = FormatNumber($this->MarginOnSale1->EditValue, -2, -2, -2, -2);

		// MarginOnCost1
		$this->MarginOnCost1->EditAttrs["class"] = "form-control";
		$this->MarginOnCost1->EditCustomAttributes = "";
		$this->MarginOnCost1->EditValue = $this->MarginOnCost1->CurrentValue;
		$this->MarginOnCost1->PlaceHolder = RemoveHtml($this->MarginOnCost1->caption());
		if (strval($this->MarginOnCost1->EditValue) <> "" && is_numeric($this->MarginOnCost1->EditValue))
			$this->MarginOnCost1->EditValue = FormatNumber($this->MarginOnCost1->EditValue, -2, -2, -2, -2);

		// Date
		$this->Date->EditAttrs["class"] = "form-control";
		$this->Date->EditCustomAttributes = "";
		$this->Date->EditValue = FormatDateTime($this->Date->CurrentValue, 8);
		$this->Date->PlaceHolder = RemoveHtml($this->Date->caption());

		// BRCODE
		$this->BRCODE->EditAttrs["class"] = "form-control";
		$this->BRCODE->EditCustomAttributes = "";
		$this->BRCODE->EditValue = $this->BRCODE->CurrentValue;
		$this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

		// HosoID
		$this->HosoID->EditAttrs["class"] = "form-control";
		$this->HosoID->EditCustomAttributes = "";
		$this->HosoID->EditValue = $this->HosoID->CurrentValue;
		$this->HosoID->PlaceHolder = RemoveHtml($this->HosoID->caption());

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	public function aggregateListRowValues()
	{
			if (is_numeric($this->SaleValue->CurrentValue))
				$this->SaleValue->Total += $this->SaleValue->CurrentValue; // Accumulate total
			if (is_numeric($this->PurchaseCostValue->CurrentValue))
				$this->PurchaseCostValue->Total += $this->PurchaseCostValue->CurrentValue; // Accumulate total
			if (is_numeric($this->MarginAmount->CurrentValue))
				$this->MarginAmount->Total += $this->MarginAmount->CurrentValue; // Accumulate total
			if (is_numeric($this->PurchaseCostValue1->CurrentValue))
				$this->PurchaseCostValue1->Total += $this->PurchaseCostValue1->CurrentValue; // Accumulate total
			if (is_numeric($this->MarginAmount1->CurrentValue))
				$this->MarginAmount1->Total += $this->MarginAmount1->CurrentValue; // Accumulate total
			if (is_numeric($this->MarginOnSale1->CurrentValue))
				$this->MarginOnSale1->Total += $this->MarginOnSale1->CurrentValue; // Accumulate total
			if (is_numeric($this->MarginOnCost1->CurrentValue))
				$this->MarginOnCost1->Total += $this->MarginOnCost1->CurrentValue; // Accumulate total
	}

	// Aggregate list row (for rendering)
	public function aggregateListRow()
	{
			$this->SaleValue->CurrentValue = $this->SaleValue->Total;
			$this->SaleValue->ViewValue = $this->SaleValue->CurrentValue;
			$this->SaleValue->ViewValue = FormatNumber($this->SaleValue->ViewValue, 2, -2, -2, -2);
			$this->SaleValue->ViewCustomAttributes = "";
			$this->SaleValue->HrefValue = ""; // Clear href value
			$this->PurchaseCostValue->CurrentValue = $this->PurchaseCostValue->Total;
			$this->PurchaseCostValue->ViewValue = $this->PurchaseCostValue->CurrentValue;
			$this->PurchaseCostValue->ViewValue = FormatNumber($this->PurchaseCostValue->ViewValue, 2, -2, -2, -2);
			$this->PurchaseCostValue->ViewCustomAttributes = "";
			$this->PurchaseCostValue->HrefValue = ""; // Clear href value
			$this->MarginAmount->CurrentValue = $this->MarginAmount->Total;
			$this->MarginAmount->ViewValue = $this->MarginAmount->CurrentValue;
			$this->MarginAmount->ViewValue = FormatNumber($this->MarginAmount->ViewValue, 2, -2, -2, -2);
			$this->MarginAmount->ViewCustomAttributes = "";
			$this->MarginAmount->HrefValue = ""; // Clear href value
			$this->PurchaseCostValue1->CurrentValue = $this->PurchaseCostValue1->Total;
			$this->PurchaseCostValue1->ViewValue = $this->PurchaseCostValue1->CurrentValue;
			$this->PurchaseCostValue1->ViewValue = FormatNumber($this->PurchaseCostValue1->ViewValue, 2, -2, -2, -2);
			$this->PurchaseCostValue1->ViewCustomAttributes = "";
			$this->PurchaseCostValue1->HrefValue = ""; // Clear href value
			$this->MarginAmount1->CurrentValue = $this->MarginAmount1->Total;
			$this->MarginAmount1->ViewValue = $this->MarginAmount1->CurrentValue;
			$this->MarginAmount1->ViewValue = FormatNumber($this->MarginAmount1->ViewValue, 2, -2, -2, -2);
			$this->MarginAmount1->ViewCustomAttributes = "";
			$this->MarginAmount1->HrefValue = ""; // Clear href value
			$this->MarginOnSale1->CurrentValue = $this->MarginOnSale1->Total;
			$this->MarginOnSale1->ViewValue = $this->MarginOnSale1->CurrentValue;
			$this->MarginOnSale1->ViewValue = FormatNumber($this->MarginOnSale1->ViewValue, 2, -2, -2, -2);
			$this->MarginOnSale1->ViewCustomAttributes = "";
			$this->MarginOnSale1->HrefValue = ""; // Clear href value
			$this->MarginOnCost1->CurrentValue = $this->MarginOnCost1->Total;
			$this->MarginOnCost1->ViewValue = $this->MarginOnCost1->CurrentValue;
			$this->MarginOnCost1->ViewValue = FormatNumber($this->MarginOnCost1->ViewValue, 2, -2, -2, -2);
			$this->MarginOnCost1->ViewCustomAttributes = "";
			$this->MarginOnCost1->HrefValue = ""; // Clear href value

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
					$doc->exportCaption($this->ProductCode);
					$doc->exportCaption($this->ProductName);
					$doc->exportCaption($this->SaleQuantity);
					$doc->exportCaption($this->RT);
					$doc->exportCaption($this->SaleValue);
					$doc->exportCaption($this->PurRate);
					$doc->exportCaption($this->PurchaseCostValue);
					$doc->exportCaption($this->MarginAmount);
					$doc->exportCaption($this->MarginOnSale);
					$doc->exportCaption($this->MarginOnCost);
					$doc->exportCaption($this->PurchaseCostValue1);
					$doc->exportCaption($this->MarginAmount1);
					$doc->exportCaption($this->MarginOnSale1);
					$doc->exportCaption($this->MarginOnCost1);
					$doc->exportCaption($this->Date);
					$doc->exportCaption($this->BRCODE);
					$doc->exportCaption($this->HosoID);
				} else {
					$doc->exportCaption($this->ProductCode);
					$doc->exportCaption($this->ProductName);
					$doc->exportCaption($this->SaleQuantity);
					$doc->exportCaption($this->RT);
					$doc->exportCaption($this->SaleValue);
					$doc->exportCaption($this->PurRate);
					$doc->exportCaption($this->PurchaseCostValue1);
					$doc->exportCaption($this->MarginAmount1);
					$doc->exportCaption($this->MarginOnSale1);
					$doc->exportCaption($this->MarginOnCost1);
					$doc->exportCaption($this->Date);
					$doc->exportCaption($this->BRCODE);
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
				$this->aggregateListRowValues(); // Aggregate row values

				// Render row
				$this->RowType = ROWTYPE_VIEW; // Render view
				$this->resetAttributes();
				$this->renderListRow();
				if (!$doc->ExportCustom) {
					$doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
					if ($exportPageType == "view") {
						$doc->exportField($this->ProductCode);
						$doc->exportField($this->ProductName);
						$doc->exportField($this->SaleQuantity);
						$doc->exportField($this->RT);
						$doc->exportField($this->SaleValue);
						$doc->exportField($this->PurRate);
						$doc->exportField($this->PurchaseCostValue);
						$doc->exportField($this->MarginAmount);
						$doc->exportField($this->MarginOnSale);
						$doc->exportField($this->MarginOnCost);
						$doc->exportField($this->PurchaseCostValue1);
						$doc->exportField($this->MarginAmount1);
						$doc->exportField($this->MarginOnSale1);
						$doc->exportField($this->MarginOnCost1);
						$doc->exportField($this->Date);
						$doc->exportField($this->BRCODE);
						$doc->exportField($this->HosoID);
					} else {
						$doc->exportField($this->ProductCode);
						$doc->exportField($this->ProductName);
						$doc->exportField($this->SaleQuantity);
						$doc->exportField($this->RT);
						$doc->exportField($this->SaleValue);
						$doc->exportField($this->PurRate);
						$doc->exportField($this->PurchaseCostValue1);
						$doc->exportField($this->MarginAmount1);
						$doc->exportField($this->MarginOnSale1);
						$doc->exportField($this->MarginOnCost1);
						$doc->exportField($this->Date);
						$doc->exportField($this->BRCODE);
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

		// Export aggregates (horizontal format only)
		if ($doc->Horizontal) {
			$this->RowType = ROWTYPE_AGGREGATE;
			$this->resetAttributes();
			$this->aggregateListRow();
			if (!$doc->ExportCustom) {
				$doc->beginExportRow(-1);
				$doc->exportAggregate($this->ProductCode, '');
				$doc->exportAggregate($this->ProductName, '');
				$doc->exportAggregate($this->SaleQuantity, '');
				$doc->exportAggregate($this->RT, '');
				$doc->exportAggregate($this->SaleValue, 'TOTAL');
				$doc->exportAggregate($this->PurRate, '');
				$doc->exportAggregate($this->PurchaseCostValue1, 'TOTAL');
				$doc->exportAggregate($this->MarginAmount1, 'TOTAL');
				$doc->exportAggregate($this->MarginOnSale1, 'TOTAL');
				$doc->exportAggregate($this->MarginOnCost1, 'TOTAL');
				$doc->exportAggregate($this->Date, '');
				$doc->exportAggregate($this->BRCODE, '');
				$doc->exportAggregate($this->HosoID, '');
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