<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for view_pharmacy_movement_item
 */
class view_pharmacy_movement_item extends DbTable
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
	public $ProductFrom;
	public $Quantity;
	public $FreeQty;
	public $IQ;
	public $MRQ;
	public $BRCODE;
	public $OPNO;
	public $IPNO;
	public $PatientBILLNO;
	public $BILLDT;
	public $GRNNO;
	public $DT;
	public $Customername;
	public $createdby;
	public $createddatetime;
	public $modifiedby;
	public $modifieddatetime;
	public $BILLNO;
	public $prc;
	public $PrName;
	public $BatchNo;
	public $ExpDate;
	public $MFRCODE;
	public $hsn;
	public $HospID;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'view_pharmacy_movement_item';
		$this->TableName = 'view_pharmacy_movement_item';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`view_pharmacy_movement_item`";
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

		// ProductFrom
		$this->ProductFrom = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_ProductFrom', 'ProductFrom', '`ProductFrom`', '`ProductFrom`', 200, -1, FALSE, '`ProductFrom`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ProductFrom->Sortable = TRUE; // Allow sort
		$this->ProductFrom->Lookup = new Lookup('ProductFrom', 'hospital_pharmacy', FALSE, 'id', ["pharmacy","","",""], [], [], [], [], [], [], '', '');
		$this->fields['ProductFrom'] = &$this->ProductFrom;

		// Quantity
		$this->Quantity = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_Quantity', 'Quantity', '`Quantity`', '`Quantity`', 200, -1, FALSE, '`Quantity`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Quantity->Sortable = TRUE; // Allow sort
		$this->fields['Quantity'] = &$this->Quantity;

		// FreeQty
		$this->FreeQty = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_FreeQty', 'FreeQty', '`FreeQty`', '`FreeQty`', 200, -1, FALSE, '`FreeQty`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FreeQty->Sortable = TRUE; // Allow sort
		$this->fields['FreeQty'] = &$this->FreeQty;

		// IQ
		$this->IQ = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_IQ', 'IQ', '`IQ`', '`IQ`', 200, -1, FALSE, '`IQ`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IQ->Sortable = TRUE; // Allow sort
		$this->fields['IQ'] = &$this->IQ;

		// MRQ
		$this->MRQ = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_MRQ', 'MRQ', '`MRQ`', '`MRQ`', 200, -1, FALSE, '`MRQ`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MRQ->Sortable = TRUE; // Allow sort
		$this->fields['MRQ'] = &$this->MRQ;

		// BRCODE
		$this->BRCODE = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_BRCODE', 'BRCODE', '`BRCODE`', '`BRCODE`', 200, -1, FALSE, '`BRCODE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BRCODE->Sortable = TRUE; // Allow sort
		$this->BRCODE->Lookup = new Lookup('BRCODE', 'hospital_pharmacy', FALSE, 'id', ["pharmacy","","",""], [], [], [], [], [], [], '', '');
		$this->fields['BRCODE'] = &$this->BRCODE;

		// OPNO
		$this->OPNO = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_OPNO', 'OPNO', '`OPNO`', '`OPNO`', 200, -1, FALSE, '`OPNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OPNO->Sortable = TRUE; // Allow sort
		$this->fields['OPNO'] = &$this->OPNO;

		// IPNO
		$this->IPNO = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_IPNO', 'IPNO', '`IPNO`', '`IPNO`', 200, -1, FALSE, '`IPNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IPNO->Sortable = TRUE; // Allow sort
		$this->fields['IPNO'] = &$this->IPNO;

		// PatientBILLNO
		$this->PatientBILLNO = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_PatientBILLNO', 'PatientBILLNO', '`PatientBILLNO`', '`PatientBILLNO`', 200, -1, FALSE, '`PatientBILLNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientBILLNO->Sortable = TRUE; // Allow sort
		$this->fields['PatientBILLNO'] = &$this->PatientBILLNO;

		// BILLDT
		$this->BILLDT = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_BILLDT', 'BILLDT', '`BILLDT`', '`BILLDT`', 200, -1, FALSE, '`BILLDT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BILLDT->Sortable = TRUE; // Allow sort
		$this->fields['BILLDT'] = &$this->BILLDT;

		// GRNNO
		$this->GRNNO = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_GRNNO', 'GRNNO', '`GRNNO`', '`GRNNO`', 200, -1, FALSE, '`GRNNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->GRNNO->Sortable = TRUE; // Allow sort
		$this->fields['GRNNO'] = &$this->GRNNO;

		// DT
		$this->DT = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_DT', 'DT', '`DT`', '`DT`', 200, -1, FALSE, '`DT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DT->Sortable = TRUE; // Allow sort
		$this->fields['DT'] = &$this->DT;

		// Customername
		$this->Customername = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_Customername', 'Customername', '`Customername`', '`Customername`', 200, -1, FALSE, '`Customername`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Customername->Sortable = TRUE; // Allow sort
		$this->fields['Customername'] = &$this->Customername;

		// createdby
		$this->createdby = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 200, -1, FALSE, '`createdby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdby->Sortable = TRUE; // Allow sort
		$this->fields['createdby'] = &$this->createdby;

		// createddatetime
		$this->createddatetime = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike('`createddatetime`', 11, "DB"), 135, 11, FALSE, '`createddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = TRUE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['createddatetime'] = &$this->createddatetime;

		// modifiedby
		$this->modifiedby = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 200, -1, FALSE, '`modifiedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifiedby->Sortable = TRUE; // Allow sort
		$this->fields['modifiedby'] = &$this->modifiedby;

		// modifieddatetime
		$this->modifieddatetime = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike('`modifieddatetime`', 11, "DB"), 135, 11, FALSE, '`modifieddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifieddatetime->Sortable = TRUE; // Allow sort
		$this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['modifieddatetime'] = &$this->modifieddatetime;

		// BILLNO
		$this->BILLNO = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_BILLNO', 'BILLNO', '`BILLNO`', '`BILLNO`', 200, -1, FALSE, '`BILLNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BILLNO->Sortable = TRUE; // Allow sort
		$this->fields['BILLNO'] = &$this->BILLNO;

		// prc
		$this->prc = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_prc', 'prc', '`prc`', '`prc`', 200, -1, FALSE, '`prc`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->prc->IsForeignKey = TRUE; // Foreign key field
		$this->prc->Sortable = TRUE; // Allow sort
		$this->fields['prc'] = &$this->prc;

		// PrName
		$this->PrName = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_PrName', 'PrName', '`PrName`', '`PrName`', 200, -1, FALSE, '`PrName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PrName->Sortable = TRUE; // Allow sort
		$this->fields['PrName'] = &$this->PrName;

		// BatchNo
		$this->BatchNo = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_BatchNo', 'BatchNo', '`BatchNo`', '`BatchNo`', 200, -1, FALSE, '`BatchNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BatchNo->IsForeignKey = TRUE; // Foreign key field
		$this->BatchNo->Sortable = TRUE; // Allow sort
		$this->fields['BatchNo'] = &$this->BatchNo;

		// ExpDate
		$this->ExpDate = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_ExpDate', 'ExpDate', '`ExpDate`', CastDateFieldForLike('`ExpDate`', 7, "DB"), 135, 7, FALSE, '`ExpDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ExpDate->Sortable = TRUE; // Allow sort
		$this->ExpDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['ExpDate'] = &$this->ExpDate;

		// MFRCODE
		$this->MFRCODE = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_MFRCODE', 'MFRCODE', '`MFRCODE`', '`MFRCODE`', 200, -1, FALSE, '`MFRCODE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MFRCODE->Sortable = TRUE; // Allow sort
		$this->fields['MFRCODE'] = &$this->MFRCODE;

		// hsn
		$this->hsn = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_hsn', 'hsn', '`hsn`', '`hsn`', 200, -1, FALSE, '`hsn`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hsn->Sortable = TRUE; // Allow sort
		$this->fields['hsn'] = &$this->hsn;

		// HospID
		$this->HospID = new DbField('view_pharmacy_movement_item', 'view_pharmacy_movement_item', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
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

	// Current master table name
	public function getCurrentMasterTable()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_MASTER_TABLE];
	}
	public function setCurrentMasterTable($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_MASTER_TABLE] = $v;
	}

	// Session master WHERE clause
	public function getMasterFilter()
	{

		// Master filter
		$masterFilter = "";
		if ($this->getCurrentMasterTable() == "view_pharmacy_movement") {
			if ($this->prc->getSessionValue() <> "")
				$masterFilter .= "`prc`=" . QuotedValue($this->prc->getSessionValue(), DATATYPE_STRING, "DB");
			else
				return "";
			if ($this->BatchNo->getSessionValue() <> "")
				$masterFilter .= " AND `BatchNo`=" . QuotedValue($this->BatchNo->getSessionValue(), DATATYPE_STRING, "DB");
			else
				return "";
		}
		return $masterFilter;
	}

	// Session detail WHERE clause
	public function getDetailFilter()
	{

		// Detail filter
		$detailFilter = "";
		if ($this->getCurrentMasterTable() == "view_pharmacy_movement") {
			if ($this->prc->getSessionValue() <> "")
				$detailFilter .= "`prc`=" . QuotedValue($this->prc->getSessionValue(), DATATYPE_STRING, "DB");
			else
				return "";
			if ($this->BatchNo->getSessionValue() <> "")
				$detailFilter .= " AND `BatchNo`=" . QuotedValue($this->BatchNo->getSessionValue(), DATATYPE_STRING, "DB");
			else
				return "";
		}
		return $detailFilter;
	}

	// Master filter
	public function sqlMasterFilter_view_pharmacy_movement()
	{
		return "`prc`='@prc@' AND `BatchNo`='@BatchNo@'";
	}

	// Detail filter
	public function sqlDetailFilter_view_pharmacy_movement()
	{
		return "`prc`='@prc@' AND `BatchNo`='@BatchNo@'";
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`view_pharmacy_movement_item`";
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
		$this->ProductFrom->DbValue = $row['ProductFrom'];
		$this->Quantity->DbValue = $row['Quantity'];
		$this->FreeQty->DbValue = $row['FreeQty'];
		$this->IQ->DbValue = $row['IQ'];
		$this->MRQ->DbValue = $row['MRQ'];
		$this->BRCODE->DbValue = $row['BRCODE'];
		$this->OPNO->DbValue = $row['OPNO'];
		$this->IPNO->DbValue = $row['IPNO'];
		$this->PatientBILLNO->DbValue = $row['PatientBILLNO'];
		$this->BILLDT->DbValue = $row['BILLDT'];
		$this->GRNNO->DbValue = $row['GRNNO'];
		$this->DT->DbValue = $row['DT'];
		$this->Customername->DbValue = $row['Customername'];
		$this->createdby->DbValue = $row['createdby'];
		$this->createddatetime->DbValue = $row['createddatetime'];
		$this->modifiedby->DbValue = $row['modifiedby'];
		$this->modifieddatetime->DbValue = $row['modifieddatetime'];
		$this->BILLNO->DbValue = $row['BILLNO'];
		$this->prc->DbValue = $row['prc'];
		$this->PrName->DbValue = $row['PrName'];
		$this->BatchNo->DbValue = $row['BatchNo'];
		$this->ExpDate->DbValue = $row['ExpDate'];
		$this->MFRCODE->DbValue = $row['MFRCODE'];
		$this->hsn->DbValue = $row['hsn'];
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
			return "view_pharmacy_movement_itemlist.php";
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
		if ($pageName == "view_pharmacy_movement_itemview.php")
			return $Language->phrase("View");
		elseif ($pageName == "view_pharmacy_movement_itemedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "view_pharmacy_movement_itemadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "view_pharmacy_movement_itemlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("view_pharmacy_movement_itemview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_pharmacy_movement_itemview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "view_pharmacy_movement_itemadd.php?" . $this->getUrlParm($parm);
		else
			$url = "view_pharmacy_movement_itemadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("view_pharmacy_movement_itemedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("view_pharmacy_movement_itemadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("view_pharmacy_movement_itemdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		if ($this->getCurrentMasterTable() == "view_pharmacy_movement" && !ContainsString($url, TABLE_SHOW_MASTER . "=")) {
			$url .= (ContainsString($url, "?") ? "&" : "?") . TABLE_SHOW_MASTER . "=" . $this->getCurrentMasterTable();
			$url .= "&fk_prc=" . urlencode($this->prc->CurrentValue);
			$url .= "&fk_BatchNo=" . urlencode($this->BatchNo->CurrentValue);
		}
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
		$this->ProductFrom->setDbValue($rs->fields('ProductFrom'));
		$this->Quantity->setDbValue($rs->fields('Quantity'));
		$this->FreeQty->setDbValue($rs->fields('FreeQty'));
		$this->IQ->setDbValue($rs->fields('IQ'));
		$this->MRQ->setDbValue($rs->fields('MRQ'));
		$this->BRCODE->setDbValue($rs->fields('BRCODE'));
		$this->OPNO->setDbValue($rs->fields('OPNO'));
		$this->IPNO->setDbValue($rs->fields('IPNO'));
		$this->PatientBILLNO->setDbValue($rs->fields('PatientBILLNO'));
		$this->BILLDT->setDbValue($rs->fields('BILLDT'));
		$this->GRNNO->setDbValue($rs->fields('GRNNO'));
		$this->DT->setDbValue($rs->fields('DT'));
		$this->Customername->setDbValue($rs->fields('Customername'));
		$this->createdby->setDbValue($rs->fields('createdby'));
		$this->createddatetime->setDbValue($rs->fields('createddatetime'));
		$this->modifiedby->setDbValue($rs->fields('modifiedby'));
		$this->modifieddatetime->setDbValue($rs->fields('modifieddatetime'));
		$this->BILLNO->setDbValue($rs->fields('BILLNO'));
		$this->prc->setDbValue($rs->fields('prc'));
		$this->PrName->setDbValue($rs->fields('PrName'));
		$this->BatchNo->setDbValue($rs->fields('BatchNo'));
		$this->ExpDate->setDbValue($rs->fields('ExpDate'));
		$this->MFRCODE->setDbValue($rs->fields('MFRCODE'));
		$this->hsn->setDbValue($rs->fields('hsn'));
		$this->HospID->setDbValue($rs->fields('HospID'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// ProductFrom
		// Quantity
		// FreeQty
		// IQ
		// MRQ
		// BRCODE
		// OPNO
		// IPNO
		// PatientBILLNO
		// BILLDT
		// GRNNO
		// DT
		// Customername
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// BILLNO
		// prc
		// PrName
		// BatchNo
		// ExpDate
		// MFRCODE
		// hsn
		// HospID
		// ProductFrom

		$this->ProductFrom->ViewValue = $this->ProductFrom->CurrentValue;
		$curVal = strval($this->ProductFrom->CurrentValue);
		if ($curVal <> "") {
			$this->ProductFrom->ViewValue = $this->ProductFrom->lookupCacheOption($curVal);
			if ($this->ProductFrom->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->ProductFrom->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->ProductFrom->ViewValue = $this->ProductFrom->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->ProductFrom->ViewValue = $this->ProductFrom->CurrentValue;
				}
			}
		} else {
			$this->ProductFrom->ViewValue = NULL;
		}
		$this->ProductFrom->ViewCustomAttributes = "";

		// Quantity
		$this->Quantity->ViewValue = $this->Quantity->CurrentValue;
		$this->Quantity->ViewCustomAttributes = "";

		// FreeQty
		$this->FreeQty->ViewValue = $this->FreeQty->CurrentValue;
		$this->FreeQty->ViewCustomAttributes = "";

		// IQ
		$this->IQ->ViewValue = $this->IQ->CurrentValue;
		$this->IQ->ViewCustomAttributes = "";

		// MRQ
		$this->MRQ->ViewValue = $this->MRQ->CurrentValue;
		$this->MRQ->ViewCustomAttributes = "";

		// BRCODE
		$this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
		$curVal = strval($this->BRCODE->CurrentValue);
		if ($curVal <> "") {
			$this->BRCODE->ViewValue = $this->BRCODE->lookupCacheOption($curVal);
			if ($this->BRCODE->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->BRCODE->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->BRCODE->ViewValue = $this->BRCODE->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
				}
			}
		} else {
			$this->BRCODE->ViewValue = NULL;
		}
		$this->BRCODE->ViewCustomAttributes = "";

		// OPNO
		$this->OPNO->ViewValue = $this->OPNO->CurrentValue;
		$this->OPNO->ViewCustomAttributes = "";

		// IPNO
		$this->IPNO->ViewValue = $this->IPNO->CurrentValue;
		$this->IPNO->ViewCustomAttributes = "";

		// PatientBILLNO
		$this->PatientBILLNO->ViewValue = $this->PatientBILLNO->CurrentValue;
		$this->PatientBILLNO->ViewCustomAttributes = "";

		// BILLDT
		$this->BILLDT->ViewValue = $this->BILLDT->CurrentValue;
		$this->BILLDT->ViewCustomAttributes = "";

		// GRNNO
		$this->GRNNO->ViewValue = $this->GRNNO->CurrentValue;
		$this->GRNNO->ViewCustomAttributes = "";

		// DT
		$this->DT->ViewValue = $this->DT->CurrentValue;
		$this->DT->ViewCustomAttributes = "";

		// Customername
		$this->Customername->ViewValue = $this->Customername->CurrentValue;
		$this->Customername->ViewCustomAttributes = "";

		// createdby
		$this->createdby->ViewValue = $this->createdby->CurrentValue;
		$this->createdby->ViewCustomAttributes = "";

		// createddatetime
		$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
		$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 11);
		$this->createddatetime->ViewCustomAttributes = "";

		// modifiedby
		$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
		$this->modifiedby->ViewCustomAttributes = "";

		// modifieddatetime
		$this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
		$this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 11);
		$this->modifieddatetime->ViewCustomAttributes = "";

		// BILLNO
		$this->BILLNO->ViewValue = $this->BILLNO->CurrentValue;
		$this->BILLNO->ViewCustomAttributes = "";

		// prc
		$this->prc->ViewValue = $this->prc->CurrentValue;
		$this->prc->ViewCustomAttributes = "";

		// PrName
		$this->PrName->ViewValue = $this->PrName->CurrentValue;
		$this->PrName->ViewCustomAttributes = "";

		// BatchNo
		$this->BatchNo->ViewValue = $this->BatchNo->CurrentValue;
		$this->BatchNo->ViewCustomAttributes = "";

		// ExpDate
		$this->ExpDate->ViewValue = $this->ExpDate->CurrentValue;
		$this->ExpDate->ViewValue = FormatDateTime($this->ExpDate->ViewValue, 7);
		$this->ExpDate->ViewCustomAttributes = "";

		// MFRCODE
		$this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
		$this->MFRCODE->ViewCustomAttributes = "";

		// hsn
		$this->hsn->ViewValue = $this->hsn->CurrentValue;
		$this->hsn->ViewCustomAttributes = "";

		// HospID
		$this->HospID->ViewValue = $this->HospID->CurrentValue;
		$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
		$this->HospID->ViewCustomAttributes = "";

		// ProductFrom
		$this->ProductFrom->LinkCustomAttributes = "";
		$this->ProductFrom->HrefValue = "";
		$this->ProductFrom->TooltipValue = "";

		// Quantity
		$this->Quantity->LinkCustomAttributes = "";
		$this->Quantity->HrefValue = "";
		$this->Quantity->TooltipValue = "";

		// FreeQty
		$this->FreeQty->LinkCustomAttributes = "";
		$this->FreeQty->HrefValue = "";
		$this->FreeQty->TooltipValue = "";

		// IQ
		$this->IQ->LinkCustomAttributes = "";
		$this->IQ->HrefValue = "";
		$this->IQ->TooltipValue = "";

		// MRQ
		$this->MRQ->LinkCustomAttributes = "";
		$this->MRQ->HrefValue = "";
		$this->MRQ->TooltipValue = "";

		// BRCODE
		$this->BRCODE->LinkCustomAttributes = "";
		$this->BRCODE->HrefValue = "";
		$this->BRCODE->TooltipValue = "";

		// OPNO
		$this->OPNO->LinkCustomAttributes = "";
		$this->OPNO->HrefValue = "";
		$this->OPNO->TooltipValue = "";

		// IPNO
		$this->IPNO->LinkCustomAttributes = "";
		$this->IPNO->HrefValue = "";
		$this->IPNO->TooltipValue = "";

		// PatientBILLNO
		$this->PatientBILLNO->LinkCustomAttributes = "";
		$this->PatientBILLNO->HrefValue = "";
		$this->PatientBILLNO->TooltipValue = "";

		// BILLDT
		$this->BILLDT->LinkCustomAttributes = "";
		$this->BILLDT->HrefValue = "";
		$this->BILLDT->TooltipValue = "";

		// GRNNO
		$this->GRNNO->LinkCustomAttributes = "";
		$this->GRNNO->HrefValue = "";
		$this->GRNNO->TooltipValue = "";

		// DT
		$this->DT->LinkCustomAttributes = "";
		$this->DT->HrefValue = "";
		$this->DT->TooltipValue = "";

		// Customername
		$this->Customername->LinkCustomAttributes = "";
		$this->Customername->HrefValue = "";
		$this->Customername->TooltipValue = "";

		// createdby
		$this->createdby->LinkCustomAttributes = "";
		$this->createdby->HrefValue = "";
		$this->createdby->TooltipValue = "";

		// createddatetime
		$this->createddatetime->LinkCustomAttributes = "";
		$this->createddatetime->HrefValue = "";
		$this->createddatetime->TooltipValue = "";

		// modifiedby
		$this->modifiedby->LinkCustomAttributes = "";
		$this->modifiedby->HrefValue = "";
		$this->modifiedby->TooltipValue = "";

		// modifieddatetime
		$this->modifieddatetime->LinkCustomAttributes = "";
		$this->modifieddatetime->HrefValue = "";
		$this->modifieddatetime->TooltipValue = "";

		// BILLNO
		$this->BILLNO->LinkCustomAttributes = "";
		$this->BILLNO->HrefValue = "";
		$this->BILLNO->TooltipValue = "";

		// prc
		$this->prc->LinkCustomAttributes = "";
		$this->prc->HrefValue = "";
		$this->prc->TooltipValue = "";

		// PrName
		$this->PrName->LinkCustomAttributes = "";
		$this->PrName->HrefValue = "";
		$this->PrName->TooltipValue = "";

		// BatchNo
		$this->BatchNo->LinkCustomAttributes = "";
		$this->BatchNo->HrefValue = "";
		$this->BatchNo->TooltipValue = "";

		// ExpDate
		$this->ExpDate->LinkCustomAttributes = "";
		$this->ExpDate->HrefValue = "";
		$this->ExpDate->TooltipValue = "";

		// MFRCODE
		$this->MFRCODE->LinkCustomAttributes = "";
		$this->MFRCODE->HrefValue = "";
		$this->MFRCODE->TooltipValue = "";

		// hsn
		$this->hsn->LinkCustomAttributes = "";
		$this->hsn->HrefValue = "";
		$this->hsn->TooltipValue = "";

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

		// ProductFrom
		$this->ProductFrom->EditAttrs["class"] = "form-control";
		$this->ProductFrom->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ProductFrom->CurrentValue = HtmlDecode($this->ProductFrom->CurrentValue);
		$this->ProductFrom->EditValue = $this->ProductFrom->CurrentValue;
		$this->ProductFrom->PlaceHolder = RemoveHtml($this->ProductFrom->caption());

		// Quantity
		$this->Quantity->EditAttrs["class"] = "form-control";
		$this->Quantity->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Quantity->CurrentValue = HtmlDecode($this->Quantity->CurrentValue);
		$this->Quantity->EditValue = $this->Quantity->CurrentValue;
		$this->Quantity->PlaceHolder = RemoveHtml($this->Quantity->caption());

		// FreeQty
		$this->FreeQty->EditAttrs["class"] = "form-control";
		$this->FreeQty->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->FreeQty->CurrentValue = HtmlDecode($this->FreeQty->CurrentValue);
		$this->FreeQty->EditValue = $this->FreeQty->CurrentValue;
		$this->FreeQty->PlaceHolder = RemoveHtml($this->FreeQty->caption());

		// IQ
		$this->IQ->EditAttrs["class"] = "form-control";
		$this->IQ->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->IQ->CurrentValue = HtmlDecode($this->IQ->CurrentValue);
		$this->IQ->EditValue = $this->IQ->CurrentValue;
		$this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());

		// MRQ
		$this->MRQ->EditAttrs["class"] = "form-control";
		$this->MRQ->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->MRQ->CurrentValue = HtmlDecode($this->MRQ->CurrentValue);
		$this->MRQ->EditValue = $this->MRQ->CurrentValue;
		$this->MRQ->PlaceHolder = RemoveHtml($this->MRQ->caption());

		// BRCODE
		$this->BRCODE->EditAttrs["class"] = "form-control";
		$this->BRCODE->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->BRCODE->CurrentValue = HtmlDecode($this->BRCODE->CurrentValue);
		$this->BRCODE->EditValue = $this->BRCODE->CurrentValue;
		$this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

		// OPNO
		$this->OPNO->EditAttrs["class"] = "form-control";
		$this->OPNO->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->OPNO->CurrentValue = HtmlDecode($this->OPNO->CurrentValue);
		$this->OPNO->EditValue = $this->OPNO->CurrentValue;
		$this->OPNO->PlaceHolder = RemoveHtml($this->OPNO->caption());

		// IPNO
		$this->IPNO->EditAttrs["class"] = "form-control";
		$this->IPNO->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->IPNO->CurrentValue = HtmlDecode($this->IPNO->CurrentValue);
		$this->IPNO->EditValue = $this->IPNO->CurrentValue;
		$this->IPNO->PlaceHolder = RemoveHtml($this->IPNO->caption());

		// PatientBILLNO
		$this->PatientBILLNO->EditAttrs["class"] = "form-control";
		$this->PatientBILLNO->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PatientBILLNO->CurrentValue = HtmlDecode($this->PatientBILLNO->CurrentValue);
		$this->PatientBILLNO->EditValue = $this->PatientBILLNO->CurrentValue;
		$this->PatientBILLNO->PlaceHolder = RemoveHtml($this->PatientBILLNO->caption());

		// BILLDT
		$this->BILLDT->EditAttrs["class"] = "form-control";
		$this->BILLDT->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->BILLDT->CurrentValue = HtmlDecode($this->BILLDT->CurrentValue);
		$this->BILLDT->EditValue = $this->BILLDT->CurrentValue;
		$this->BILLDT->PlaceHolder = RemoveHtml($this->BILLDT->caption());

		// GRNNO
		$this->GRNNO->EditAttrs["class"] = "form-control";
		$this->GRNNO->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->GRNNO->CurrentValue = HtmlDecode($this->GRNNO->CurrentValue);
		$this->GRNNO->EditValue = $this->GRNNO->CurrentValue;
		$this->GRNNO->PlaceHolder = RemoveHtml($this->GRNNO->caption());

		// DT
		$this->DT->EditAttrs["class"] = "form-control";
		$this->DT->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->DT->CurrentValue = HtmlDecode($this->DT->CurrentValue);
		$this->DT->EditValue = $this->DT->CurrentValue;
		$this->DT->PlaceHolder = RemoveHtml($this->DT->caption());

		// Customername
		$this->Customername->EditAttrs["class"] = "form-control";
		$this->Customername->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Customername->CurrentValue = HtmlDecode($this->Customername->CurrentValue);
		$this->Customername->EditValue = $this->Customername->CurrentValue;
		$this->Customername->PlaceHolder = RemoveHtml($this->Customername->caption());

		// createdby
		$this->createdby->EditAttrs["class"] = "form-control";
		$this->createdby->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->createdby->CurrentValue = HtmlDecode($this->createdby->CurrentValue);
		$this->createdby->EditValue = $this->createdby->CurrentValue;
		$this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

		// createddatetime
		$this->createddatetime->EditAttrs["class"] = "form-control";
		$this->createddatetime->EditCustomAttributes = "";
		$this->createddatetime->EditValue = FormatDateTime($this->createddatetime->CurrentValue, 11);
		$this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

		// modifiedby
		$this->modifiedby->EditAttrs["class"] = "form-control";
		$this->modifiedby->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->modifiedby->CurrentValue = HtmlDecode($this->modifiedby->CurrentValue);
		$this->modifiedby->EditValue = $this->modifiedby->CurrentValue;
		$this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

		// modifieddatetime
		$this->modifieddatetime->EditAttrs["class"] = "form-control";
		$this->modifieddatetime->EditCustomAttributes = "";
		$this->modifieddatetime->EditValue = FormatDateTime($this->modifieddatetime->CurrentValue, 11);
		$this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

		// BILLNO
		$this->BILLNO->EditAttrs["class"] = "form-control";
		$this->BILLNO->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->BILLNO->CurrentValue = HtmlDecode($this->BILLNO->CurrentValue);
		$this->BILLNO->EditValue = $this->BILLNO->CurrentValue;
		$this->BILLNO->PlaceHolder = RemoveHtml($this->BILLNO->caption());

		// prc
		$this->prc->EditAttrs["class"] = "form-control";
		$this->prc->EditCustomAttributes = "";
		if ($this->prc->getSessionValue() <> "") {
			$this->prc->CurrentValue = $this->prc->getSessionValue();
		$this->prc->ViewValue = $this->prc->CurrentValue;
		$this->prc->ViewCustomAttributes = "";
		} else {
		if (REMOVE_XSS)
			$this->prc->CurrentValue = HtmlDecode($this->prc->CurrentValue);
		$this->prc->EditValue = $this->prc->CurrentValue;
		$this->prc->PlaceHolder = RemoveHtml($this->prc->caption());
		}

		// PrName
		$this->PrName->EditAttrs["class"] = "form-control";
		$this->PrName->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PrName->CurrentValue = HtmlDecode($this->PrName->CurrentValue);
		$this->PrName->EditValue = $this->PrName->CurrentValue;
		$this->PrName->PlaceHolder = RemoveHtml($this->PrName->caption());

		// BatchNo
		$this->BatchNo->EditAttrs["class"] = "form-control";
		$this->BatchNo->EditCustomAttributes = "";
		if ($this->BatchNo->getSessionValue() <> "") {
			$this->BatchNo->CurrentValue = $this->BatchNo->getSessionValue();
		$this->BatchNo->ViewValue = $this->BatchNo->CurrentValue;
		$this->BatchNo->ViewCustomAttributes = "";
		} else {
		if (REMOVE_XSS)
			$this->BatchNo->CurrentValue = HtmlDecode($this->BatchNo->CurrentValue);
		$this->BatchNo->EditValue = $this->BatchNo->CurrentValue;
		$this->BatchNo->PlaceHolder = RemoveHtml($this->BatchNo->caption());
		}

		// ExpDate
		$this->ExpDate->EditAttrs["class"] = "form-control";
		$this->ExpDate->EditCustomAttributes = "";
		$this->ExpDate->EditValue = FormatDateTime($this->ExpDate->CurrentValue, 7);
		$this->ExpDate->PlaceHolder = RemoveHtml($this->ExpDate->caption());

		// MFRCODE
		$this->MFRCODE->EditAttrs["class"] = "form-control";
		$this->MFRCODE->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->MFRCODE->CurrentValue = HtmlDecode($this->MFRCODE->CurrentValue);
		$this->MFRCODE->EditValue = $this->MFRCODE->CurrentValue;
		$this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

		// hsn
		$this->hsn->EditAttrs["class"] = "form-control";
		$this->hsn->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->hsn->CurrentValue = HtmlDecode($this->hsn->CurrentValue);
		$this->hsn->EditValue = $this->hsn->CurrentValue;
		$this->hsn->PlaceHolder = RemoveHtml($this->hsn->caption());

		// HospID
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
					$doc->exportCaption($this->ProductFrom);
					$doc->exportCaption($this->Quantity);
					$doc->exportCaption($this->FreeQty);
					$doc->exportCaption($this->IQ);
					$doc->exportCaption($this->MRQ);
					$doc->exportCaption($this->BRCODE);
					$doc->exportCaption($this->OPNO);
					$doc->exportCaption($this->IPNO);
					$doc->exportCaption($this->PatientBILLNO);
					$doc->exportCaption($this->BILLDT);
					$doc->exportCaption($this->GRNNO);
					$doc->exportCaption($this->DT);
					$doc->exportCaption($this->Customername);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
					$doc->exportCaption($this->BILLNO);
					$doc->exportCaption($this->prc);
					$doc->exportCaption($this->PrName);
					$doc->exportCaption($this->BatchNo);
					$doc->exportCaption($this->ExpDate);
					$doc->exportCaption($this->MFRCODE);
					$doc->exportCaption($this->hsn);
					$doc->exportCaption($this->HospID);
				} else {
					$doc->exportCaption($this->ProductFrom);
					$doc->exportCaption($this->Quantity);
					$doc->exportCaption($this->FreeQty);
					$doc->exportCaption($this->IQ);
					$doc->exportCaption($this->MRQ);
					$doc->exportCaption($this->BRCODE);
					$doc->exportCaption($this->OPNO);
					$doc->exportCaption($this->IPNO);
					$doc->exportCaption($this->PatientBILLNO);
					$doc->exportCaption($this->BILLDT);
					$doc->exportCaption($this->GRNNO);
					$doc->exportCaption($this->DT);
					$doc->exportCaption($this->Customername);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
					$doc->exportCaption($this->BILLNO);
					$doc->exportCaption($this->prc);
					$doc->exportCaption($this->PrName);
					$doc->exportCaption($this->BatchNo);
					$doc->exportCaption($this->ExpDate);
					$doc->exportCaption($this->MFRCODE);
					$doc->exportCaption($this->hsn);
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
						$doc->exportField($this->ProductFrom);
						$doc->exportField($this->Quantity);
						$doc->exportField($this->FreeQty);
						$doc->exportField($this->IQ);
						$doc->exportField($this->MRQ);
						$doc->exportField($this->BRCODE);
						$doc->exportField($this->OPNO);
						$doc->exportField($this->IPNO);
						$doc->exportField($this->PatientBILLNO);
						$doc->exportField($this->BILLDT);
						$doc->exportField($this->GRNNO);
						$doc->exportField($this->DT);
						$doc->exportField($this->Customername);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
						$doc->exportField($this->BILLNO);
						$doc->exportField($this->prc);
						$doc->exportField($this->PrName);
						$doc->exportField($this->BatchNo);
						$doc->exportField($this->ExpDate);
						$doc->exportField($this->MFRCODE);
						$doc->exportField($this->hsn);
						$doc->exportField($this->HospID);
					} else {
						$doc->exportField($this->ProductFrom);
						$doc->exportField($this->Quantity);
						$doc->exportField($this->FreeQty);
						$doc->exportField($this->IQ);
						$doc->exportField($this->MRQ);
						$doc->exportField($this->BRCODE);
						$doc->exportField($this->OPNO);
						$doc->exportField($this->IPNO);
						$doc->exportField($this->PatientBILLNO);
						$doc->exportField($this->BILLDT);
						$doc->exportField($this->GRNNO);
						$doc->exportField($this->DT);
						$doc->exportField($this->Customername);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
						$doc->exportField($this->BILLNO);
						$doc->exportField($this->prc);
						$doc->exportField($this->PrName);
						$doc->exportField($this->BatchNo);
						$doc->exportField($this->ExpDate);
						$doc->exportField($this->MFRCODE);
						$doc->exportField($this->hsn);
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