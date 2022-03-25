<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for view_pharmacy_sales
 */
class view_pharmacy_sales extends DbTable
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
	public $BILLNO;
	public $Product;
	public $SiNo;
	public $PRC;
	public $BATCHNO;
	public $EXPDT;
	public $Mfg;
	public $HSN;
	public $IPNO;
	public $OPNO;
	public $SalRate;
	public $IQ;
	public $RT;
	public $DAMT;
	public $Taxable;
	public $BILLDT;
	public $BRCODE;
	public $PSGST;
	public $PCGST;
	public $SSGST;
	public $SCGST;
	public $PurValue;
	public $PurRate;
	public $PAMT;
	public $PSGSTAmount;
	public $PCGSTAmount;
	public $SSGSTAmount;
	public $SCGSTAmount;
	public $HosoID;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'view_pharmacy_sales';
		$this->TableName = 'view_pharmacy_sales';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`view_pharmacy_sales`";
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

		// BillDate
		$this->BillDate = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_BillDate', 'BillDate', '`BillDate`', CastDateFieldForLike('`BillDate`', 7, "DB"), 133, 7, FALSE, '`BillDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BillDate->Sortable = TRUE; // Allow sort
		$this->BillDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['BillDate'] = &$this->BillDate;

		// BILLNO
		$this->BILLNO = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_BILLNO', 'BILLNO', '`BILLNO`', '`BILLNO`', 200, -1, FALSE, '`BILLNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BILLNO->Sortable = TRUE; // Allow sort
		$this->fields['BILLNO'] = &$this->BILLNO;

		// Product
		$this->Product = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_Product', 'Product', '`Product`', '`Product`', 200, -1, FALSE, '`Product`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Product->Sortable = TRUE; // Allow sort
		$this->fields['Product'] = &$this->Product;

		// SiNo
		$this->SiNo = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_SiNo', 'SiNo', '`SiNo`', '`SiNo`', 3, -1, FALSE, '`SiNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->SiNo->Sortable = FALSE; // Allow sort
		$this->SiNo->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->SiNo->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->SiNo->Lookup = new Lookup('SiNo', 'hospital_pharmacy', FALSE, 'id', ["pharmacy","","",""], [], [], [], [], [], [], '', '');
		$this->SiNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['SiNo'] = &$this->SiNo;

		// PRC
		$this->PRC = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_PRC', 'PRC', '`PRC`', '`PRC`', 200, -1, FALSE, '`PRC`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PRC->Sortable = FALSE; // Allow sort
		$this->fields['PRC'] = &$this->PRC;

		// BATCHNO
		$this->BATCHNO = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_BATCHNO', 'BATCHNO', '`BATCHNO`', '`BATCHNO`', 200, -1, FALSE, '`BATCHNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BATCHNO->Sortable = FALSE; // Allow sort
		$this->fields['BATCHNO'] = &$this->BATCHNO;

		// EXPDT
		$this->EXPDT = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_EXPDT', 'EXPDT', '`EXPDT`', CastDateFieldForLike('`EXPDT`', 7, "DB"), 135, 7, FALSE, '`EXPDT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->EXPDT->Sortable = FALSE; // Allow sort
		$this->EXPDT->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['EXPDT'] = &$this->EXPDT;

		// Mfg
		$this->Mfg = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_Mfg', 'Mfg', '`Mfg`', '`Mfg`', 200, -1, FALSE, '`Mfg`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Mfg->Sortable = FALSE; // Allow sort
		$this->fields['Mfg'] = &$this->Mfg;

		// HSN
		$this->HSN = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_HSN', 'HSN', '`HSN`', '`HSN`', 200, -1, FALSE, '`HSN`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HSN->Sortable = TRUE; // Allow sort
		$this->fields['HSN'] = &$this->HSN;

		// IPNO
		$this->IPNO = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_IPNO', 'IPNO', '`IPNO`', '`IPNO`', 200, -1, FALSE, '`IPNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IPNO->Sortable = FALSE; // Allow sort
		$this->fields['IPNO'] = &$this->IPNO;

		// OPNO
		$this->OPNO = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_OPNO', 'OPNO', '`OPNO`', '`OPNO`', 200, -1, FALSE, '`OPNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OPNO->Sortable = TRUE; // Allow sort
		$this->fields['OPNO'] = &$this->OPNO;

		// SalRate
		$this->SalRate = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_SalRate', 'SalRate', '`SalRate`', '`SalRate`', 131, -1, FALSE, '`SalRate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SalRate->Sortable = TRUE; // Allow sort
		$this->SalRate->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['SalRate'] = &$this->SalRate;

		// IQ
		$this->IQ = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_IQ', 'IQ', '`IQ`', '`IQ`', 131, -1, FALSE, '`IQ`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IQ->Sortable = TRUE; // Allow sort
		$this->IQ->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['IQ'] = &$this->IQ;

		// RT
		$this->RT = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_RT', 'RT', '`RT`', '`RT`', 131, -1, FALSE, '`RT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RT->Sortable = FALSE; // Allow sort
		$this->RT->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['RT'] = &$this->RT;

		// DAMT
		$this->DAMT = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_DAMT', 'DAMT', '`DAMT`', '`DAMT`', 131, -1, FALSE, '`DAMT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DAMT->Sortable = TRUE; // Allow sort
		$this->DAMT->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['DAMT'] = &$this->DAMT;

		// Taxable
		$this->Taxable = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_Taxable', 'Taxable', '`Taxable`', '`Taxable`', 200, -1, FALSE, '`Taxable`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Taxable->Sortable = TRUE; // Allow sort
		$this->fields['Taxable'] = &$this->Taxable;

		// BILLDT
		$this->BILLDT = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_BILLDT', 'BILLDT', '`BILLDT`', CastDateFieldForLike('`BILLDT`', 7, "DB"), 135, 7, FALSE, '`BILLDT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BILLDT->Sortable = FALSE; // Allow sort
		$this->BILLDT->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['BILLDT'] = &$this->BILLDT;

		// BRCODE
		$this->BRCODE = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_BRCODE', 'BRCODE', '`BRCODE`', '`BRCODE`', 3, -1, FALSE, '`BRCODE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BRCODE->Sortable = FALSE; // Allow sort
		$this->BRCODE->Lookup = new Lookup('BRCODE', 'hospital_pharmacy', FALSE, 'id', ["pharmacy","","",""], [], [], [], [], [], [], '', '');
		$this->BRCODE->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['BRCODE'] = &$this->BRCODE;

		// PSGST
		$this->PSGST = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_PSGST', 'PSGST', '`PSGST`', '`PSGST`', 131, -1, FALSE, '`PSGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PSGST->Sortable = FALSE; // Allow sort
		$this->PSGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PSGST'] = &$this->PSGST;

		// PCGST
		$this->PCGST = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_PCGST', 'PCGST', '`PCGST`', '`PCGST`', 131, -1, FALSE, '`PCGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PCGST->Sortable = FALSE; // Allow sort
		$this->PCGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PCGST'] = &$this->PCGST;

		// SSGST
		$this->SSGST = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_SSGST', 'SSGST', '`SSGST`', '`SSGST`', 131, -1, FALSE, '`SSGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SSGST->Sortable = TRUE; // Allow sort
		$this->SSGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['SSGST'] = &$this->SSGST;

		// SCGST
		$this->SCGST = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_SCGST', 'SCGST', '`SCGST`', '`SCGST`', 131, -1, FALSE, '`SCGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SCGST->Sortable = TRUE; // Allow sort
		$this->SCGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['SCGST'] = &$this->SCGST;

		// PurValue
		$this->PurValue = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_PurValue', 'PurValue', '`PurValue`', '`PurValue`', 131, -1, FALSE, '`PurValue`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PurValue->Sortable = FALSE; // Allow sort
		$this->PurValue->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PurValue'] = &$this->PurValue;

		// PurRate
		$this->PurRate = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_PurRate', 'PurRate', '`PurRate`', '`PurRate`', 131, -1, FALSE, '`PurRate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PurRate->Sortable = FALSE; // Allow sort
		$this->PurRate->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PurRate'] = &$this->PurRate;

		// PAMT
		$this->PAMT = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_PAMT', 'PAMT', '`PAMT`', '`PAMT`', 131, -1, FALSE, '`PAMT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PAMT->Sortable = FALSE; // Allow sort
		$this->PAMT->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PAMT'] = &$this->PAMT;

		// PSGSTAmount
		$this->PSGSTAmount = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_PSGSTAmount', 'PSGSTAmount', '`PSGSTAmount`', '`PSGSTAmount`', 131, -1, FALSE, '`PSGSTAmount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PSGSTAmount->Sortable = FALSE; // Allow sort
		$this->PSGSTAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PSGSTAmount'] = &$this->PSGSTAmount;

		// PCGSTAmount
		$this->PCGSTAmount = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_PCGSTAmount', 'PCGSTAmount', '`PCGSTAmount`', '`PCGSTAmount`', 131, -1, FALSE, '`PCGSTAmount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PCGSTAmount->Sortable = FALSE; // Allow sort
		$this->PCGSTAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PCGSTAmount'] = &$this->PCGSTAmount;

		// SSGSTAmount
		$this->SSGSTAmount = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_SSGSTAmount', 'SSGSTAmount', '`SSGSTAmount`', '`SSGSTAmount`', 131, -1, FALSE, '`SSGSTAmount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SSGSTAmount->Sortable = TRUE; // Allow sort
		$this->SSGSTAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['SSGSTAmount'] = &$this->SSGSTAmount;

		// SCGSTAmount
		$this->SCGSTAmount = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_SCGSTAmount', 'SCGSTAmount', '`SCGSTAmount`', '`SCGSTAmount`', 131, -1, FALSE, '`SCGSTAmount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SCGSTAmount->Sortable = TRUE; // Allow sort
		$this->SCGSTAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['SCGSTAmount'] = &$this->SCGSTAmount;

		// HosoID
		$this->HosoID = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_HosoID', 'HosoID', '`HosoID`', '`HosoID`', 3, -1, FALSE, '`HosoID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`view_pharmacy_sales`";
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
		$this->BillDate->DbValue = $row['BillDate'];
		$this->BILLNO->DbValue = $row['BILLNO'];
		$this->Product->DbValue = $row['Product'];
		$this->SiNo->DbValue = $row['SiNo'];
		$this->PRC->DbValue = $row['PRC'];
		$this->BATCHNO->DbValue = $row['BATCHNO'];
		$this->EXPDT->DbValue = $row['EXPDT'];
		$this->Mfg->DbValue = $row['Mfg'];
		$this->HSN->DbValue = $row['HSN'];
		$this->IPNO->DbValue = $row['IPNO'];
		$this->OPNO->DbValue = $row['OPNO'];
		$this->SalRate->DbValue = $row['SalRate'];
		$this->IQ->DbValue = $row['IQ'];
		$this->RT->DbValue = $row['RT'];
		$this->DAMT->DbValue = $row['DAMT'];
		$this->Taxable->DbValue = $row['Taxable'];
		$this->BILLDT->DbValue = $row['BILLDT'];
		$this->BRCODE->DbValue = $row['BRCODE'];
		$this->PSGST->DbValue = $row['PSGST'];
		$this->PCGST->DbValue = $row['PCGST'];
		$this->SSGST->DbValue = $row['SSGST'];
		$this->SCGST->DbValue = $row['SCGST'];
		$this->PurValue->DbValue = $row['PurValue'];
		$this->PurRate->DbValue = $row['PurRate'];
		$this->PAMT->DbValue = $row['PAMT'];
		$this->PSGSTAmount->DbValue = $row['PSGSTAmount'];
		$this->PCGSTAmount->DbValue = $row['PCGSTAmount'];
		$this->SSGSTAmount->DbValue = $row['SSGSTAmount'];
		$this->SCGSTAmount->DbValue = $row['SCGSTAmount'];
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
			return "view_pharmacy_saleslist.php";
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
		if ($pageName == "view_pharmacy_salesview.php")
			return $Language->phrase("View");
		elseif ($pageName == "view_pharmacy_salesedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "view_pharmacy_salesadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "view_pharmacy_saleslist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("view_pharmacy_salesview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_pharmacy_salesview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "view_pharmacy_salesadd.php?" . $this->getUrlParm($parm);
		else
			$url = "view_pharmacy_salesadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("view_pharmacy_salesedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("view_pharmacy_salesadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("view_pharmacy_salesdelete.php", $this->getUrlParm());
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
		$this->BillDate->setDbValue($rs->fields('BillDate'));
		$this->BILLNO->setDbValue($rs->fields('BILLNO'));
		$this->Product->setDbValue($rs->fields('Product'));
		$this->SiNo->setDbValue($rs->fields('SiNo'));
		$this->PRC->setDbValue($rs->fields('PRC'));
		$this->BATCHNO->setDbValue($rs->fields('BATCHNO'));
		$this->EXPDT->setDbValue($rs->fields('EXPDT'));
		$this->Mfg->setDbValue($rs->fields('Mfg'));
		$this->HSN->setDbValue($rs->fields('HSN'));
		$this->IPNO->setDbValue($rs->fields('IPNO'));
		$this->OPNO->setDbValue($rs->fields('OPNO'));
		$this->SalRate->setDbValue($rs->fields('SalRate'));
		$this->IQ->setDbValue($rs->fields('IQ'));
		$this->RT->setDbValue($rs->fields('RT'));
		$this->DAMT->setDbValue($rs->fields('DAMT'));
		$this->Taxable->setDbValue($rs->fields('Taxable'));
		$this->BILLDT->setDbValue($rs->fields('BILLDT'));
		$this->BRCODE->setDbValue($rs->fields('BRCODE'));
		$this->PSGST->setDbValue($rs->fields('PSGST'));
		$this->PCGST->setDbValue($rs->fields('PCGST'));
		$this->SSGST->setDbValue($rs->fields('SSGST'));
		$this->SCGST->setDbValue($rs->fields('SCGST'));
		$this->PurValue->setDbValue($rs->fields('PurValue'));
		$this->PurRate->setDbValue($rs->fields('PurRate'));
		$this->PAMT->setDbValue($rs->fields('PAMT'));
		$this->PSGSTAmount->setDbValue($rs->fields('PSGSTAmount'));
		$this->PCGSTAmount->setDbValue($rs->fields('PCGSTAmount'));
		$this->SSGSTAmount->setDbValue($rs->fields('SSGSTAmount'));
		$this->SCGSTAmount->setDbValue($rs->fields('SCGSTAmount'));
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
		// BILLNO
		// Product
		// SiNo
		// PRC
		// BATCHNO
		// EXPDT
		// Mfg
		// HSN
		// IPNO
		// OPNO
		// SalRate
		// IQ
		// RT
		// DAMT
		// Taxable
		// BILLDT
		// BRCODE
		// PSGST
		// PCGST
		// SSGST
		// SCGST
		// PurValue
		// PurRate
		// PAMT
		// PSGSTAmount
		// PCGSTAmount
		// SSGSTAmount
		// SCGSTAmount
		// HosoID
		// BillDate

		$this->BillDate->ViewValue = $this->BillDate->CurrentValue;
		$this->BillDate->ViewValue = FormatDateTime($this->BillDate->ViewValue, 7);
		$this->BillDate->ViewCustomAttributes = "";

		// BILLNO
		$this->BILLNO->ViewValue = $this->BILLNO->CurrentValue;
		$this->BILLNO->ViewCustomAttributes = "";

		// Product
		$this->Product->ViewValue = $this->Product->CurrentValue;
		$this->Product->ViewCustomAttributes = "";

		// SiNo
		$curVal = strval($this->SiNo->CurrentValue);
		if ($curVal <> "") {
			$this->SiNo->ViewValue = $this->SiNo->lookupCacheOption($curVal);
			if ($this->SiNo->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->SiNo->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->SiNo->ViewValue = $this->SiNo->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->SiNo->ViewValue = $this->SiNo->CurrentValue;
				}
			}
		} else {
			$this->SiNo->ViewValue = NULL;
		}
		$this->SiNo->ViewCustomAttributes = "";

		// PRC
		$this->PRC->ViewValue = $this->PRC->CurrentValue;
		$this->PRC->ViewCustomAttributes = "";

		// BATCHNO
		$this->BATCHNO->ViewValue = $this->BATCHNO->CurrentValue;
		$this->BATCHNO->ViewCustomAttributes = "";

		// EXPDT
		$this->EXPDT->ViewValue = $this->EXPDT->CurrentValue;
		$this->EXPDT->ViewValue = FormatDateTime($this->EXPDT->ViewValue, 7);
		$this->EXPDT->ViewCustomAttributes = "";

		// Mfg
		$this->Mfg->ViewValue = $this->Mfg->CurrentValue;
		$this->Mfg->ViewCustomAttributes = "";

		// HSN
		$this->HSN->ViewValue = $this->HSN->CurrentValue;
		$this->HSN->ViewCustomAttributes = "";

		// IPNO
		$this->IPNO->ViewValue = $this->IPNO->CurrentValue;
		$this->IPNO->ViewCustomAttributes = "";

		// OPNO
		$this->OPNO->ViewValue = $this->OPNO->CurrentValue;
		$this->OPNO->ViewCustomAttributes = "";

		// SalRate
		$this->SalRate->ViewValue = $this->SalRate->CurrentValue;
		$this->SalRate->ViewValue = FormatNumber($this->SalRate->ViewValue, 2, -2, -2, -2);
		$this->SalRate->ViewCustomAttributes = "";

		// IQ
		$this->IQ->ViewValue = $this->IQ->CurrentValue;
		$this->IQ->ViewValue = FormatNumber($this->IQ->ViewValue, 2, -2, -2, -2);
		$this->IQ->ViewCustomAttributes = "";

		// RT
		$this->RT->ViewValue = $this->RT->CurrentValue;
		$this->RT->ViewValue = FormatNumber($this->RT->ViewValue, 2, -2, -2, -2);
		$this->RT->ViewCustomAttributes = "";

		// DAMT
		$this->DAMT->ViewValue = $this->DAMT->CurrentValue;
		$this->DAMT->ViewValue = FormatNumber($this->DAMT->ViewValue, 2, -2, -2, -2);
		$this->DAMT->ViewCustomAttributes = "";

		// Taxable
		$this->Taxable->ViewValue = $this->Taxable->CurrentValue;
		$this->Taxable->ViewCustomAttributes = "";

		// BILLDT
		$this->BILLDT->ViewValue = $this->BILLDT->CurrentValue;
		$this->BILLDT->ViewValue = FormatDateTime($this->BILLDT->ViewValue, 7);
		$this->BILLDT->ViewCustomAttributes = "";

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

		// PSGST
		$this->PSGST->ViewValue = $this->PSGST->CurrentValue;
		$this->PSGST->ViewValue = FormatNumber($this->PSGST->ViewValue, 2, -2, -2, -2);
		$this->PSGST->ViewCustomAttributes = "";

		// PCGST
		$this->PCGST->ViewValue = $this->PCGST->CurrentValue;
		$this->PCGST->ViewValue = FormatNumber($this->PCGST->ViewValue, 2, -2, -2, -2);
		$this->PCGST->ViewCustomAttributes = "";

		// SSGST
		$this->SSGST->ViewValue = $this->SSGST->CurrentValue;
		$this->SSGST->ViewValue = FormatNumber($this->SSGST->ViewValue, 2, -2, -2, -2);
		$this->SSGST->ViewCustomAttributes = "";

		// SCGST
		$this->SCGST->ViewValue = $this->SCGST->CurrentValue;
		$this->SCGST->ViewValue = FormatNumber($this->SCGST->ViewValue, 2, -2, -2, -2);
		$this->SCGST->ViewCustomAttributes = "";

		// PurValue
		$this->PurValue->ViewValue = $this->PurValue->CurrentValue;
		$this->PurValue->ViewValue = FormatNumber($this->PurValue->ViewValue, 2, -2, -2, -2);
		$this->PurValue->ViewCustomAttributes = "";

		// PurRate
		$this->PurRate->ViewValue = $this->PurRate->CurrentValue;
		$this->PurRate->ViewValue = FormatNumber($this->PurRate->ViewValue, 2, -2, -2, -2);
		$this->PurRate->ViewCustomAttributes = "";

		// PAMT
		$this->PAMT->ViewValue = $this->PAMT->CurrentValue;
		$this->PAMT->ViewValue = FormatNumber($this->PAMT->ViewValue, 2, -2, -2, -2);
		$this->PAMT->ViewCustomAttributes = "";

		// PSGSTAmount
		$this->PSGSTAmount->ViewValue = $this->PSGSTAmount->CurrentValue;
		$this->PSGSTAmount->ViewValue = FormatNumber($this->PSGSTAmount->ViewValue, 2, -2, -2, -2);
		$this->PSGSTAmount->ViewCustomAttributes = "";

		// PCGSTAmount
		$this->PCGSTAmount->ViewValue = $this->PCGSTAmount->CurrentValue;
		$this->PCGSTAmount->ViewValue = FormatNumber($this->PCGSTAmount->ViewValue, 2, -2, -2, -2);
		$this->PCGSTAmount->ViewCustomAttributes = "";

		// SSGSTAmount
		$this->SSGSTAmount->ViewValue = $this->SSGSTAmount->CurrentValue;
		$this->SSGSTAmount->ViewValue = FormatNumber($this->SSGSTAmount->ViewValue, 2, -2, -2, -2);
		$this->SSGSTAmount->ViewCustomAttributes = "";

		// SCGSTAmount
		$this->SCGSTAmount->ViewValue = $this->SCGSTAmount->CurrentValue;
		$this->SCGSTAmount->ViewValue = FormatNumber($this->SCGSTAmount->ViewValue, 2, -2, -2, -2);
		$this->SCGSTAmount->ViewCustomAttributes = "";

		// HosoID
		$this->HosoID->ViewValue = $this->HosoID->CurrentValue;
		$this->HosoID->ViewValue = FormatNumber($this->HosoID->ViewValue, 0, -2, -2, -2);
		$this->HosoID->ViewCustomAttributes = "";

		// BillDate
		$this->BillDate->LinkCustomAttributes = "";
		$this->BillDate->HrefValue = "";
		$this->BillDate->TooltipValue = "";

		// BILLNO
		$this->BILLNO->LinkCustomAttributes = "";
		$this->BILLNO->HrefValue = "";
		$this->BILLNO->TooltipValue = "";

		// Product
		$this->Product->LinkCustomAttributes = "";
		$this->Product->HrefValue = "";
		$this->Product->TooltipValue = "";

		// SiNo
		$this->SiNo->LinkCustomAttributes = "";
		$this->SiNo->HrefValue = "";
		$this->SiNo->TooltipValue = "";

		// PRC
		$this->PRC->LinkCustomAttributes = "";
		$this->PRC->HrefValue = "";
		$this->PRC->TooltipValue = "";

		// BATCHNO
		$this->BATCHNO->LinkCustomAttributes = "";
		$this->BATCHNO->HrefValue = "";
		$this->BATCHNO->TooltipValue = "";

		// EXPDT
		$this->EXPDT->LinkCustomAttributes = "";
		$this->EXPDT->HrefValue = "";
		$this->EXPDT->TooltipValue = "";

		// Mfg
		$this->Mfg->LinkCustomAttributes = "";
		$this->Mfg->HrefValue = "";
		$this->Mfg->TooltipValue = "";

		// HSN
		$this->HSN->LinkCustomAttributes = "";
		$this->HSN->HrefValue = "";
		$this->HSN->TooltipValue = "";

		// IPNO
		$this->IPNO->LinkCustomAttributes = "";
		$this->IPNO->HrefValue = "";
		$this->IPNO->TooltipValue = "";

		// OPNO
		$this->OPNO->LinkCustomAttributes = "";
		$this->OPNO->HrefValue = "";
		$this->OPNO->TooltipValue = "";

		// SalRate
		$this->SalRate->LinkCustomAttributes = "";
		$this->SalRate->HrefValue = "";
		$this->SalRate->TooltipValue = "";

		// IQ
		$this->IQ->LinkCustomAttributes = "";
		$this->IQ->HrefValue = "";
		$this->IQ->TooltipValue = "";

		// RT
		$this->RT->LinkCustomAttributes = "";
		$this->RT->HrefValue = "";
		$this->RT->TooltipValue = "";

		// DAMT
		$this->DAMT->LinkCustomAttributes = "";
		$this->DAMT->HrefValue = "";
		$this->DAMT->TooltipValue = "";

		// Taxable
		$this->Taxable->LinkCustomAttributes = "";
		$this->Taxable->HrefValue = "";
		$this->Taxable->TooltipValue = "";

		// BILLDT
		$this->BILLDT->LinkCustomAttributes = "";
		$this->BILLDT->HrefValue = "";
		$this->BILLDT->TooltipValue = "";

		// BRCODE
		$this->BRCODE->LinkCustomAttributes = "";
		$this->BRCODE->HrefValue = "";
		$this->BRCODE->TooltipValue = "";

		// PSGST
		$this->PSGST->LinkCustomAttributes = "";
		$this->PSGST->HrefValue = "";
		$this->PSGST->TooltipValue = "";

		// PCGST
		$this->PCGST->LinkCustomAttributes = "";
		$this->PCGST->HrefValue = "";
		$this->PCGST->TooltipValue = "";

		// SSGST
		$this->SSGST->LinkCustomAttributes = "";
		$this->SSGST->HrefValue = "";
		$this->SSGST->TooltipValue = "";

		// SCGST
		$this->SCGST->LinkCustomAttributes = "";
		$this->SCGST->HrefValue = "";
		$this->SCGST->TooltipValue = "";

		// PurValue
		$this->PurValue->LinkCustomAttributes = "";
		$this->PurValue->HrefValue = "";
		$this->PurValue->TooltipValue = "";

		// PurRate
		$this->PurRate->LinkCustomAttributes = "";
		$this->PurRate->HrefValue = "";
		$this->PurRate->TooltipValue = "";

		// PAMT
		$this->PAMT->LinkCustomAttributes = "";
		$this->PAMT->HrefValue = "";
		$this->PAMT->TooltipValue = "";

		// PSGSTAmount
		$this->PSGSTAmount->LinkCustomAttributes = "";
		$this->PSGSTAmount->HrefValue = "";
		$this->PSGSTAmount->TooltipValue = "";

		// PCGSTAmount
		$this->PCGSTAmount->LinkCustomAttributes = "";
		$this->PCGSTAmount->HrefValue = "";
		$this->PCGSTAmount->TooltipValue = "";

		// SSGSTAmount
		$this->SSGSTAmount->LinkCustomAttributes = "";
		$this->SSGSTAmount->HrefValue = "";
		$this->SSGSTAmount->TooltipValue = "";

		// SCGSTAmount
		$this->SCGSTAmount->LinkCustomAttributes = "";
		$this->SCGSTAmount->HrefValue = "";
		$this->SCGSTAmount->TooltipValue = "";

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

		// BILLNO
		$this->BILLNO->EditAttrs["class"] = "form-control";
		$this->BILLNO->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->BILLNO->CurrentValue = HtmlDecode($this->BILLNO->CurrentValue);
		$this->BILLNO->EditValue = $this->BILLNO->CurrentValue;
		$this->BILLNO->PlaceHolder = RemoveHtml($this->BILLNO->caption());

		// Product
		$this->Product->EditAttrs["class"] = "form-control";
		$this->Product->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Product->CurrentValue = HtmlDecode($this->Product->CurrentValue);
		$this->Product->EditValue = $this->Product->CurrentValue;
		$this->Product->PlaceHolder = RemoveHtml($this->Product->caption());

		// SiNo
		$this->SiNo->EditAttrs["class"] = "form-control";
		$this->SiNo->EditCustomAttributes = "";

		// PRC
		$this->PRC->EditAttrs["class"] = "form-control";
		$this->PRC->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
		$this->PRC->EditValue = $this->PRC->CurrentValue;
		$this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

		// BATCHNO
		$this->BATCHNO->EditAttrs["class"] = "form-control";
		$this->BATCHNO->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->BATCHNO->CurrentValue = HtmlDecode($this->BATCHNO->CurrentValue);
		$this->BATCHNO->EditValue = $this->BATCHNO->CurrentValue;
		$this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

		// EXPDT
		$this->EXPDT->EditAttrs["class"] = "form-control";
		$this->EXPDT->EditCustomAttributes = "";
		$this->EXPDT->EditValue = FormatDateTime($this->EXPDT->CurrentValue, 7);
		$this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());

		// Mfg
		$this->Mfg->EditAttrs["class"] = "form-control";
		$this->Mfg->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Mfg->CurrentValue = HtmlDecode($this->Mfg->CurrentValue);
		$this->Mfg->EditValue = $this->Mfg->CurrentValue;
		$this->Mfg->PlaceHolder = RemoveHtml($this->Mfg->caption());

		// HSN
		$this->HSN->EditAttrs["class"] = "form-control";
		$this->HSN->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->HSN->CurrentValue = HtmlDecode($this->HSN->CurrentValue);
		$this->HSN->EditValue = $this->HSN->CurrentValue;
		$this->HSN->PlaceHolder = RemoveHtml($this->HSN->caption());

		// IPNO
		$this->IPNO->EditAttrs["class"] = "form-control";
		$this->IPNO->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->IPNO->CurrentValue = HtmlDecode($this->IPNO->CurrentValue);
		$this->IPNO->EditValue = $this->IPNO->CurrentValue;
		$this->IPNO->PlaceHolder = RemoveHtml($this->IPNO->caption());

		// OPNO
		$this->OPNO->EditAttrs["class"] = "form-control";
		$this->OPNO->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->OPNO->CurrentValue = HtmlDecode($this->OPNO->CurrentValue);
		$this->OPNO->EditValue = $this->OPNO->CurrentValue;
		$this->OPNO->PlaceHolder = RemoveHtml($this->OPNO->caption());

		// SalRate
		$this->SalRate->EditAttrs["class"] = "form-control";
		$this->SalRate->EditCustomAttributes = "";
		$this->SalRate->EditValue = $this->SalRate->CurrentValue;
		$this->SalRate->PlaceHolder = RemoveHtml($this->SalRate->caption());
		if (strval($this->SalRate->EditValue) <> "" && is_numeric($this->SalRate->EditValue))
			$this->SalRate->EditValue = FormatNumber($this->SalRate->EditValue, -2, -2, -2, -2);

		// IQ
		$this->IQ->EditAttrs["class"] = "form-control";
		$this->IQ->EditCustomAttributes = "";
		$this->IQ->EditValue = $this->IQ->CurrentValue;
		$this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());
		if (strval($this->IQ->EditValue) <> "" && is_numeric($this->IQ->EditValue))
			$this->IQ->EditValue = FormatNumber($this->IQ->EditValue, -2, -2, -2, -2);

		// RT
		$this->RT->EditAttrs["class"] = "form-control";
		$this->RT->EditCustomAttributes = "";
		$this->RT->EditValue = $this->RT->CurrentValue;
		$this->RT->PlaceHolder = RemoveHtml($this->RT->caption());
		if (strval($this->RT->EditValue) <> "" && is_numeric($this->RT->EditValue))
			$this->RT->EditValue = FormatNumber($this->RT->EditValue, -2, -2, -2, -2);

		// DAMT
		$this->DAMT->EditAttrs["class"] = "form-control";
		$this->DAMT->EditCustomAttributes = "";
		$this->DAMT->EditValue = $this->DAMT->CurrentValue;
		$this->DAMT->PlaceHolder = RemoveHtml($this->DAMT->caption());
		if (strval($this->DAMT->EditValue) <> "" && is_numeric($this->DAMT->EditValue))
			$this->DAMT->EditValue = FormatNumber($this->DAMT->EditValue, -2, -2, -2, -2);

		// Taxable
		$this->Taxable->EditAttrs["class"] = "form-control";
		$this->Taxable->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Taxable->CurrentValue = HtmlDecode($this->Taxable->CurrentValue);
		$this->Taxable->EditValue = $this->Taxable->CurrentValue;
		$this->Taxable->PlaceHolder = RemoveHtml($this->Taxable->caption());

		// BILLDT
		$this->BILLDT->EditAttrs["class"] = "form-control";
		$this->BILLDT->EditCustomAttributes = "";
		$this->BILLDT->EditValue = FormatDateTime($this->BILLDT->CurrentValue, 7);
		$this->BILLDT->PlaceHolder = RemoveHtml($this->BILLDT->caption());

		// BRCODE
		$this->BRCODE->EditAttrs["class"] = "form-control";
		$this->BRCODE->EditCustomAttributes = "";
		$this->BRCODE->EditValue = $this->BRCODE->CurrentValue;
		$this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

		// PSGST
		$this->PSGST->EditAttrs["class"] = "form-control";
		$this->PSGST->EditCustomAttributes = "";
		$this->PSGST->EditValue = $this->PSGST->CurrentValue;
		$this->PSGST->PlaceHolder = RemoveHtml($this->PSGST->caption());
		if (strval($this->PSGST->EditValue) <> "" && is_numeric($this->PSGST->EditValue))
			$this->PSGST->EditValue = FormatNumber($this->PSGST->EditValue, -2, -2, -2, -2);

		// PCGST
		$this->PCGST->EditAttrs["class"] = "form-control";
		$this->PCGST->EditCustomAttributes = "";
		$this->PCGST->EditValue = $this->PCGST->CurrentValue;
		$this->PCGST->PlaceHolder = RemoveHtml($this->PCGST->caption());
		if (strval($this->PCGST->EditValue) <> "" && is_numeric($this->PCGST->EditValue))
			$this->PCGST->EditValue = FormatNumber($this->PCGST->EditValue, -2, -2, -2, -2);

		// SSGST
		$this->SSGST->EditAttrs["class"] = "form-control";
		$this->SSGST->EditCustomAttributes = "";
		$this->SSGST->EditValue = $this->SSGST->CurrentValue;
		$this->SSGST->PlaceHolder = RemoveHtml($this->SSGST->caption());
		if (strval($this->SSGST->EditValue) <> "" && is_numeric($this->SSGST->EditValue))
			$this->SSGST->EditValue = FormatNumber($this->SSGST->EditValue, -2, -2, -2, -2);

		// SCGST
		$this->SCGST->EditAttrs["class"] = "form-control";
		$this->SCGST->EditCustomAttributes = "";
		$this->SCGST->EditValue = $this->SCGST->CurrentValue;
		$this->SCGST->PlaceHolder = RemoveHtml($this->SCGST->caption());
		if (strval($this->SCGST->EditValue) <> "" && is_numeric($this->SCGST->EditValue))
			$this->SCGST->EditValue = FormatNumber($this->SCGST->EditValue, -2, -2, -2, -2);

		// PurValue
		$this->PurValue->EditAttrs["class"] = "form-control";
		$this->PurValue->EditCustomAttributes = "";
		$this->PurValue->EditValue = $this->PurValue->CurrentValue;
		$this->PurValue->PlaceHolder = RemoveHtml($this->PurValue->caption());
		if (strval($this->PurValue->EditValue) <> "" && is_numeric($this->PurValue->EditValue))
			$this->PurValue->EditValue = FormatNumber($this->PurValue->EditValue, -2, -2, -2, -2);

		// PurRate
		$this->PurRate->EditAttrs["class"] = "form-control";
		$this->PurRate->EditCustomAttributes = "";
		$this->PurRate->EditValue = $this->PurRate->CurrentValue;
		$this->PurRate->PlaceHolder = RemoveHtml($this->PurRate->caption());
		if (strval($this->PurRate->EditValue) <> "" && is_numeric($this->PurRate->EditValue))
			$this->PurRate->EditValue = FormatNumber($this->PurRate->EditValue, -2, -2, -2, -2);

		// PAMT
		$this->PAMT->EditAttrs["class"] = "form-control";
		$this->PAMT->EditCustomAttributes = "";
		$this->PAMT->EditValue = $this->PAMT->CurrentValue;
		$this->PAMT->PlaceHolder = RemoveHtml($this->PAMT->caption());
		if (strval($this->PAMT->EditValue) <> "" && is_numeric($this->PAMT->EditValue))
			$this->PAMT->EditValue = FormatNumber($this->PAMT->EditValue, -2, -2, -2, -2);

		// PSGSTAmount
		$this->PSGSTAmount->EditAttrs["class"] = "form-control";
		$this->PSGSTAmount->EditCustomAttributes = "";
		$this->PSGSTAmount->EditValue = $this->PSGSTAmount->CurrentValue;
		$this->PSGSTAmount->PlaceHolder = RemoveHtml($this->PSGSTAmount->caption());
		if (strval($this->PSGSTAmount->EditValue) <> "" && is_numeric($this->PSGSTAmount->EditValue))
			$this->PSGSTAmount->EditValue = FormatNumber($this->PSGSTAmount->EditValue, -2, -2, -2, -2);

		// PCGSTAmount
		$this->PCGSTAmount->EditAttrs["class"] = "form-control";
		$this->PCGSTAmount->EditCustomAttributes = "";
		$this->PCGSTAmount->EditValue = $this->PCGSTAmount->CurrentValue;
		$this->PCGSTAmount->PlaceHolder = RemoveHtml($this->PCGSTAmount->caption());
		if (strval($this->PCGSTAmount->EditValue) <> "" && is_numeric($this->PCGSTAmount->EditValue))
			$this->PCGSTAmount->EditValue = FormatNumber($this->PCGSTAmount->EditValue, -2, -2, -2, -2);

		// SSGSTAmount
		$this->SSGSTAmount->EditAttrs["class"] = "form-control";
		$this->SSGSTAmount->EditCustomAttributes = "";
		$this->SSGSTAmount->EditValue = $this->SSGSTAmount->CurrentValue;
		$this->SSGSTAmount->PlaceHolder = RemoveHtml($this->SSGSTAmount->caption());
		if (strval($this->SSGSTAmount->EditValue) <> "" && is_numeric($this->SSGSTAmount->EditValue))
			$this->SSGSTAmount->EditValue = FormatNumber($this->SSGSTAmount->EditValue, -2, -2, -2, -2);

		// SCGSTAmount
		$this->SCGSTAmount->EditAttrs["class"] = "form-control";
		$this->SCGSTAmount->EditCustomAttributes = "";
		$this->SCGSTAmount->EditValue = $this->SCGSTAmount->CurrentValue;
		$this->SCGSTAmount->PlaceHolder = RemoveHtml($this->SCGSTAmount->caption());
		if (strval($this->SCGSTAmount->EditValue) <> "" && is_numeric($this->SCGSTAmount->EditValue))
			$this->SCGSTAmount->EditValue = FormatNumber($this->SCGSTAmount->EditValue, -2, -2, -2, -2);

		// HosoID
		// Call Row Rendered event

		$this->Row_Rendered();
	}

	// Aggregate list row values
	public function aggregateListRowValues()
	{
			if (is_numeric($this->SalRate->CurrentValue))
				$this->SalRate->Total += $this->SalRate->CurrentValue; // Accumulate total
			if (is_numeric($this->PurValue->CurrentValue))
				$this->PurValue->Total += $this->PurValue->CurrentValue; // Accumulate total
			if (is_numeric($this->PurRate->CurrentValue))
				$this->PurRate->Total += $this->PurRate->CurrentValue; // Accumulate total
			if (is_numeric($this->PAMT->CurrentValue))
				$this->PAMT->Total += $this->PAMT->CurrentValue; // Accumulate total
			if (is_numeric($this->PSGSTAmount->CurrentValue))
				$this->PSGSTAmount->Total += $this->PSGSTAmount->CurrentValue; // Accumulate total
			if (is_numeric($this->PCGSTAmount->CurrentValue))
				$this->PCGSTAmount->Total += $this->PCGSTAmount->CurrentValue; // Accumulate total
			if (is_numeric($this->SSGSTAmount->CurrentValue))
				$this->SSGSTAmount->Total += $this->SSGSTAmount->CurrentValue; // Accumulate total
			if (is_numeric($this->SCGSTAmount->CurrentValue))
				$this->SCGSTAmount->Total += $this->SCGSTAmount->CurrentValue; // Accumulate total
	}

	// Aggregate list row (for rendering)
	public function aggregateListRow()
	{
			$this->SalRate->CurrentValue = $this->SalRate->Total;
			$this->SalRate->ViewValue = $this->SalRate->CurrentValue;
			$this->SalRate->ViewValue = FormatNumber($this->SalRate->ViewValue, 2, -2, -2, -2);
			$this->SalRate->ViewCustomAttributes = "";
			$this->SalRate->HrefValue = ""; // Clear href value
			$this->PurValue->CurrentValue = $this->PurValue->Total;
			$this->PurValue->ViewValue = $this->PurValue->CurrentValue;
			$this->PurValue->ViewValue = FormatNumber($this->PurValue->ViewValue, 2, -2, -2, -2);
			$this->PurValue->ViewCustomAttributes = "";
			$this->PurValue->HrefValue = ""; // Clear href value
			$this->PurRate->CurrentValue = $this->PurRate->Total;
			$this->PurRate->ViewValue = $this->PurRate->CurrentValue;
			$this->PurRate->ViewValue = FormatNumber($this->PurRate->ViewValue, 2, -2, -2, -2);
			$this->PurRate->ViewCustomAttributes = "";
			$this->PurRate->HrefValue = ""; // Clear href value
			$this->PAMT->CurrentValue = $this->PAMT->Total;
			$this->PAMT->ViewValue = $this->PAMT->CurrentValue;
			$this->PAMT->ViewValue = FormatNumber($this->PAMT->ViewValue, 2, -2, -2, -2);
			$this->PAMT->ViewCustomAttributes = "";
			$this->PAMT->HrefValue = ""; // Clear href value
			$this->PSGSTAmount->CurrentValue = $this->PSGSTAmount->Total;
			$this->PSGSTAmount->ViewValue = $this->PSGSTAmount->CurrentValue;
			$this->PSGSTAmount->ViewValue = FormatNumber($this->PSGSTAmount->ViewValue, 2, -2, -2, -2);
			$this->PSGSTAmount->ViewCustomAttributes = "";
			$this->PSGSTAmount->HrefValue = ""; // Clear href value
			$this->PCGSTAmount->CurrentValue = $this->PCGSTAmount->Total;
			$this->PCGSTAmount->ViewValue = $this->PCGSTAmount->CurrentValue;
			$this->PCGSTAmount->ViewValue = FormatNumber($this->PCGSTAmount->ViewValue, 2, -2, -2, -2);
			$this->PCGSTAmount->ViewCustomAttributes = "";
			$this->PCGSTAmount->HrefValue = ""; // Clear href value
			$this->SSGSTAmount->CurrentValue = $this->SSGSTAmount->Total;
			$this->SSGSTAmount->ViewValue = $this->SSGSTAmount->CurrentValue;
			$this->SSGSTAmount->ViewValue = FormatNumber($this->SSGSTAmount->ViewValue, 2, -2, -2, -2);
			$this->SSGSTAmount->ViewCustomAttributes = "";
			$this->SSGSTAmount->HrefValue = ""; // Clear href value
			$this->SCGSTAmount->CurrentValue = $this->SCGSTAmount->Total;
			$this->SCGSTAmount->ViewValue = $this->SCGSTAmount->CurrentValue;
			$this->SCGSTAmount->ViewValue = FormatNumber($this->SCGSTAmount->ViewValue, 2, -2, -2, -2);
			$this->SCGSTAmount->ViewCustomAttributes = "";
			$this->SCGSTAmount->HrefValue = ""; // Clear href value

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
					$doc->exportCaption($this->BILLNO);
					$doc->exportCaption($this->Product);
					$doc->exportCaption($this->SiNo);
					$doc->exportCaption($this->PRC);
					$doc->exportCaption($this->BATCHNO);
					$doc->exportCaption($this->EXPDT);
					$doc->exportCaption($this->Mfg);
					$doc->exportCaption($this->HSN);
					$doc->exportCaption($this->IPNO);
					$doc->exportCaption($this->OPNO);
					$doc->exportCaption($this->SalRate);
					$doc->exportCaption($this->IQ);
					$doc->exportCaption($this->RT);
					$doc->exportCaption($this->DAMT);
					$doc->exportCaption($this->Taxable);
					$doc->exportCaption($this->BILLDT);
					$doc->exportCaption($this->BRCODE);
					$doc->exportCaption($this->PSGST);
					$doc->exportCaption($this->PCGST);
					$doc->exportCaption($this->SSGST);
					$doc->exportCaption($this->SCGST);
					$doc->exportCaption($this->PurValue);
					$doc->exportCaption($this->PurRate);
					$doc->exportCaption($this->PAMT);
					$doc->exportCaption($this->PSGSTAmount);
					$doc->exportCaption($this->PCGSTAmount);
					$doc->exportCaption($this->SSGSTAmount);
					$doc->exportCaption($this->SCGSTAmount);
					$doc->exportCaption($this->HosoID);
				} else {
					$doc->exportCaption($this->BillDate);
					$doc->exportCaption($this->BILLNO);
					$doc->exportCaption($this->Product);
					$doc->exportCaption($this->HSN);
					$doc->exportCaption($this->OPNO);
					$doc->exportCaption($this->SalRate);
					$doc->exportCaption($this->IQ);
					$doc->exportCaption($this->DAMT);
					$doc->exportCaption($this->Taxable);
					$doc->exportCaption($this->SSGST);
					$doc->exportCaption($this->SCGST);
					$doc->exportCaption($this->SSGSTAmount);
					$doc->exportCaption($this->SCGSTAmount);
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
						$doc->exportField($this->BillDate);
						$doc->exportField($this->BILLNO);
						$doc->exportField($this->Product);
						$doc->exportField($this->SiNo);
						$doc->exportField($this->PRC);
						$doc->exportField($this->BATCHNO);
						$doc->exportField($this->EXPDT);
						$doc->exportField($this->Mfg);
						$doc->exportField($this->HSN);
						$doc->exportField($this->IPNO);
						$doc->exportField($this->OPNO);
						$doc->exportField($this->SalRate);
						$doc->exportField($this->IQ);
						$doc->exportField($this->RT);
						$doc->exportField($this->DAMT);
						$doc->exportField($this->Taxable);
						$doc->exportField($this->BILLDT);
						$doc->exportField($this->BRCODE);
						$doc->exportField($this->PSGST);
						$doc->exportField($this->PCGST);
						$doc->exportField($this->SSGST);
						$doc->exportField($this->SCGST);
						$doc->exportField($this->PurValue);
						$doc->exportField($this->PurRate);
						$doc->exportField($this->PAMT);
						$doc->exportField($this->PSGSTAmount);
						$doc->exportField($this->PCGSTAmount);
						$doc->exportField($this->SSGSTAmount);
						$doc->exportField($this->SCGSTAmount);
						$doc->exportField($this->HosoID);
					} else {
						$doc->exportField($this->BillDate);
						$doc->exportField($this->BILLNO);
						$doc->exportField($this->Product);
						$doc->exportField($this->HSN);
						$doc->exportField($this->OPNO);
						$doc->exportField($this->SalRate);
						$doc->exportField($this->IQ);
						$doc->exportField($this->DAMT);
						$doc->exportField($this->Taxable);
						$doc->exportField($this->SSGST);
						$doc->exportField($this->SCGST);
						$doc->exportField($this->SSGSTAmount);
						$doc->exportField($this->SCGSTAmount);
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
				$doc->exportAggregate($this->BillDate, '');
				$doc->exportAggregate($this->BILLNO, '');
				$doc->exportAggregate($this->Product, '');
				$doc->exportAggregate($this->HSN, '');
				$doc->exportAggregate($this->OPNO, '');
				$doc->exportAggregate($this->SalRate, 'TOTAL');
				$doc->exportAggregate($this->IQ, '');
				$doc->exportAggregate($this->DAMT, '');
				$doc->exportAggregate($this->Taxable, '');
				$doc->exportAggregate($this->SSGST, '');
				$doc->exportAggregate($this->SCGST, '');
				$doc->exportAggregate($this->SSGSTAmount, 'TOTAL');
				$doc->exportAggregate($this->SCGSTAmount, 'TOTAL');
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