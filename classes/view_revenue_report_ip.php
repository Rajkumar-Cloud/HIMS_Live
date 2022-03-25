<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for view_revenue_report_ip
 */
class view_revenue_report_ip extends DbTable
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
	public $PatientName;
	public $RefferedBy;
	public $CASES;
	public $WARD;
	public $OT;
	public $IMPLANT;
	public $LAB;
	public $PHARMACY;
	public $OUT_SIDE_DRS_VISIT_NAME;
	public $OUT_SIDE_DRS_VISIT_NAME_Amount;
	public $PHYSIO;
	public $PHYSIO_Amount;
	public $SURGEON;
	public $SURGEON_Amount;
	public $ASST_SURGEON;
	public $ASST_SURGEON_Amount;
	public $ANESTHETIST;
	public $ANESTHETIST_Amount;
	public $Others;
	public $Other_Services;
	public $Amount;
	public $ModeofPayment;
	public $Cash;
	public $Card;
	public $Remarks;
	public $DiscountRemarks;
	public $HospID;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'view_revenue_report_ip';
		$this->TableName = 'view_revenue_report_ip';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`view_revenue_report_ip`";
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
		$this->DATE = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_DATE', 'DATE', '`DATE`', CastDateFieldForLike('`DATE`', 0, "DB"), 133, 0, FALSE, '`DATE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DATE->Sortable = TRUE; // Allow sort
		$this->DATE->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['DATE'] = &$this->DATE;

		// BillNumber
		$this->BillNumber = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_BillNumber', 'BillNumber', '`BillNumber`', '`BillNumber`', 200, -1, FALSE, '`BillNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BillNumber->Sortable = TRUE; // Allow sort
		$this->fields['BillNumber'] = &$this->BillNumber;

		// PatientId
		$this->PatientId = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_PatientId', 'PatientId', '`PatientId`', '`PatientId`', 200, -1, FALSE, '`PatientId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientId->Sortable = TRUE; // Allow sort
		$this->fields['PatientId'] = &$this->PatientId;

		// PatientName
		$this->PatientName = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, -1, FALSE, '`PatientName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientName->Sortable = TRUE; // Allow sort
		$this->fields['PatientName'] = &$this->PatientName;

		// RefferedBy
		$this->RefferedBy = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_RefferedBy', 'RefferedBy', '`RefferedBy`', '`RefferedBy`', 200, -1, FALSE, '`RefferedBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RefferedBy->Sortable = TRUE; // Allow sort
		$this->fields['RefferedBy'] = &$this->RefferedBy;

		// CASES
		$this->CASES = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_CASES', 'CASES', '`CASES`', '`CASES`', 131, -1, FALSE, '`CASES`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CASES->Sortable = TRUE; // Allow sort
		$this->CASES->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['CASES'] = &$this->CASES;

		// WARD
		$this->WARD = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_WARD', 'WARD', '`WARD`', '`WARD`', 131, -1, FALSE, '`WARD`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->WARD->Sortable = TRUE; // Allow sort
		$this->WARD->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['WARD'] = &$this->WARD;

		// OT
		$this->OT = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_OT', 'OT', '`OT`', '`OT`', 131, -1, FALSE, '`OT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OT->Sortable = TRUE; // Allow sort
		$this->OT->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['OT'] = &$this->OT;

		// IMPLANT
		$this->IMPLANT = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_IMPLANT', 'IMPLANT', '`IMPLANT`', '`IMPLANT`', 131, -1, FALSE, '`IMPLANT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IMPLANT->Sortable = TRUE; // Allow sort
		$this->IMPLANT->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['IMPLANT'] = &$this->IMPLANT;

		// LAB
		$this->LAB = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_LAB', 'LAB', '`LAB`', '`LAB`', 131, -1, FALSE, '`LAB`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->LAB->Sortable = TRUE; // Allow sort
		$this->LAB->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['LAB'] = &$this->LAB;

		// PHARMACY
		$this->PHARMACY = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_PHARMACY', 'PHARMACY', '`PHARMACY`', '`PHARMACY`', 131, -1, FALSE, '`PHARMACY`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PHARMACY->Sortable = TRUE; // Allow sort
		$this->PHARMACY->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PHARMACY'] = &$this->PHARMACY;

		// OUT SIDE DRS VISIT NAME
		$this->OUT_SIDE_DRS_VISIT_NAME = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_OUT_SIDE_DRS_VISIT_NAME', 'OUT SIDE DRS VISIT NAME', '`OUT SIDE DRS VISIT NAME`', '`OUT SIDE DRS VISIT NAME`', 201, -1, FALSE, '`OUT SIDE DRS VISIT NAME`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->OUT_SIDE_DRS_VISIT_NAME->Sortable = TRUE; // Allow sort
		$this->fields['OUT SIDE DRS VISIT NAME'] = &$this->OUT_SIDE_DRS_VISIT_NAME;

		// OUT SIDE DRS VISIT NAME Amount
		$this->OUT_SIDE_DRS_VISIT_NAME_Amount = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_OUT_SIDE_DRS_VISIT_NAME_Amount', 'OUT SIDE DRS VISIT NAME Amount', '`OUT SIDE DRS VISIT NAME Amount`', '`OUT SIDE DRS VISIT NAME Amount`', 131, -1, FALSE, '`OUT SIDE DRS VISIT NAME Amount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OUT_SIDE_DRS_VISIT_NAME_Amount->Sortable = TRUE; // Allow sort
		$this->OUT_SIDE_DRS_VISIT_NAME_Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['OUT SIDE DRS VISIT NAME Amount'] = &$this->OUT_SIDE_DRS_VISIT_NAME_Amount;

		// PHYSIO
		$this->PHYSIO = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_PHYSIO', 'PHYSIO', '`PHYSIO`', '`PHYSIO`', 201, -1, FALSE, '`PHYSIO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->PHYSIO->Sortable = TRUE; // Allow sort
		$this->fields['PHYSIO'] = &$this->PHYSIO;

		// PHYSIO Amount
		$this->PHYSIO_Amount = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_PHYSIO_Amount', 'PHYSIO Amount', '`PHYSIO Amount`', '`PHYSIO Amount`', 131, -1, FALSE, '`PHYSIO Amount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PHYSIO_Amount->Sortable = TRUE; // Allow sort
		$this->PHYSIO_Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PHYSIO Amount'] = &$this->PHYSIO_Amount;

		// SURGEON
		$this->SURGEON = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_SURGEON', 'SURGEON', '`SURGEON`', '`SURGEON`', 201, -1, FALSE, '`SURGEON`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->SURGEON->Sortable = TRUE; // Allow sort
		$this->fields['SURGEON'] = &$this->SURGEON;

		// SURGEON Amount
		$this->SURGEON_Amount = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_SURGEON_Amount', 'SURGEON Amount', '`SURGEON Amount`', '`SURGEON Amount`', 131, -1, FALSE, '`SURGEON Amount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SURGEON_Amount->Sortable = TRUE; // Allow sort
		$this->SURGEON_Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['SURGEON Amount'] = &$this->SURGEON_Amount;

		// ASST SURGEON
		$this->ASST_SURGEON = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_ASST_SURGEON', 'ASST SURGEON', '`ASST SURGEON`', '`ASST SURGEON`', 201, -1, FALSE, '`ASST SURGEON`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->ASST_SURGEON->Sortable = TRUE; // Allow sort
		$this->fields['ASST SURGEON'] = &$this->ASST_SURGEON;

		// ASST SURGEON Amount
		$this->ASST_SURGEON_Amount = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_ASST_SURGEON_Amount', 'ASST SURGEON Amount', '`ASST SURGEON Amount`', '`ASST SURGEON Amount`', 131, -1, FALSE, '`ASST SURGEON Amount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ASST_SURGEON_Amount->Sortable = TRUE; // Allow sort
		$this->ASST_SURGEON_Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['ASST SURGEON Amount'] = &$this->ASST_SURGEON_Amount;

		// ANESTHETIST
		$this->ANESTHETIST = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_ANESTHETIST', 'ANESTHETIST', '`ANESTHETIST`', '`ANESTHETIST`', 201, -1, FALSE, '`ANESTHETIST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->ANESTHETIST->Sortable = TRUE; // Allow sort
		$this->fields['ANESTHETIST'] = &$this->ANESTHETIST;

		// ANESTHETIST Amount
		$this->ANESTHETIST_Amount = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_ANESTHETIST_Amount', 'ANESTHETIST Amount', '`ANESTHETIST Amount`', '`ANESTHETIST Amount`', 131, -1, FALSE, '`ANESTHETIST Amount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ANESTHETIST_Amount->Sortable = TRUE; // Allow sort
		$this->ANESTHETIST_Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['ANESTHETIST Amount'] = &$this->ANESTHETIST_Amount;

		// Others
		$this->Others = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_Others', 'Others', '`Others`', '`Others`', 131, -1, FALSE, '`Others`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Others->Sortable = TRUE; // Allow sort
		$this->Others->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Others'] = &$this->Others;

		// Other Services
		$this->Other_Services = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_Other_Services', 'Other Services', '`Other Services`', '`Other Services`', 201, -1, FALSE, '`Other Services`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Other_Services->Sortable = TRUE; // Allow sort
		$this->fields['Other Services'] = &$this->Other_Services;

		// Amount
		$this->Amount = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_Amount', 'Amount', '`Amount`', '`Amount`', 131, -1, FALSE, '`Amount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Amount->Sortable = TRUE; // Allow sort
		$this->Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Amount'] = &$this->Amount;

		// ModeofPayment
		$this->ModeofPayment = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_ModeofPayment', 'ModeofPayment', '`ModeofPayment`', '`ModeofPayment`', 200, -1, FALSE, '`ModeofPayment`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ModeofPayment->Sortable = TRUE; // Allow sort
		$this->fields['ModeofPayment'] = &$this->ModeofPayment;

		// Cash
		$this->Cash = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_Cash', 'Cash', '`Cash`', '`Cash`', 131, -1, FALSE, '`Cash`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Cash->Sortable = TRUE; // Allow sort
		$this->Cash->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Cash'] = &$this->Cash;

		// Card
		$this->Card = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_Card', 'Card', '`Card`', '`Card`', 131, -1, FALSE, '`Card`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Card->Sortable = TRUE; // Allow sort
		$this->Card->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Card'] = &$this->Card;

		// Remarks
		$this->Remarks = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_Remarks', 'Remarks', '`Remarks`', '`Remarks`', 201, -1, FALSE, '`Remarks`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Remarks->Sortable = TRUE; // Allow sort
		$this->fields['Remarks'] = &$this->Remarks;

		// DiscountRemarks
		$this->DiscountRemarks = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_DiscountRemarks', 'DiscountRemarks', '`DiscountRemarks`', '`DiscountRemarks`', 201, -1, FALSE, '`DiscountRemarks`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->DiscountRemarks->Sortable = TRUE; // Allow sort
		$this->fields['DiscountRemarks'] = &$this->DiscountRemarks;

		// HospID
		$this->HospID = new DbField('view_revenue_report_ip', 'view_revenue_report_ip', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`view_revenue_report_ip`";
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
		$this->PatientName->DbValue = $row['PatientName'];
		$this->RefferedBy->DbValue = $row['RefferedBy'];
		$this->CASES->DbValue = $row['CASES'];
		$this->WARD->DbValue = $row['WARD'];
		$this->OT->DbValue = $row['OT'];
		$this->IMPLANT->DbValue = $row['IMPLANT'];
		$this->LAB->DbValue = $row['LAB'];
		$this->PHARMACY->DbValue = $row['PHARMACY'];
		$this->OUT_SIDE_DRS_VISIT_NAME->DbValue = $row['OUT SIDE DRS VISIT NAME'];
		$this->OUT_SIDE_DRS_VISIT_NAME_Amount->DbValue = $row['OUT SIDE DRS VISIT NAME Amount'];
		$this->PHYSIO->DbValue = $row['PHYSIO'];
		$this->PHYSIO_Amount->DbValue = $row['PHYSIO Amount'];
		$this->SURGEON->DbValue = $row['SURGEON'];
		$this->SURGEON_Amount->DbValue = $row['SURGEON Amount'];
		$this->ASST_SURGEON->DbValue = $row['ASST SURGEON'];
		$this->ASST_SURGEON_Amount->DbValue = $row['ASST SURGEON Amount'];
		$this->ANESTHETIST->DbValue = $row['ANESTHETIST'];
		$this->ANESTHETIST_Amount->DbValue = $row['ANESTHETIST Amount'];
		$this->Others->DbValue = $row['Others'];
		$this->Other_Services->DbValue = $row['Other Services'];
		$this->Amount->DbValue = $row['Amount'];
		$this->ModeofPayment->DbValue = $row['ModeofPayment'];
		$this->Cash->DbValue = $row['Cash'];
		$this->Card->DbValue = $row['Card'];
		$this->Remarks->DbValue = $row['Remarks'];
		$this->DiscountRemarks->DbValue = $row['DiscountRemarks'];
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
			return "view_revenue_report_iplist.php";
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
		if ($pageName == "view_revenue_report_ipview.php")
			return $Language->phrase("View");
		elseif ($pageName == "view_revenue_report_ipedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "view_revenue_report_ipadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "view_revenue_report_iplist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("view_revenue_report_ipview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_revenue_report_ipview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "view_revenue_report_ipadd.php?" . $this->getUrlParm($parm);
		else
			$url = "view_revenue_report_ipadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("view_revenue_report_ipedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("view_revenue_report_ipadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("view_revenue_report_ipdelete.php", $this->getUrlParm());
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
		$this->PatientName->setDbValue($rs->fields('PatientName'));
		$this->RefferedBy->setDbValue($rs->fields('RefferedBy'));
		$this->CASES->setDbValue($rs->fields('CASES'));
		$this->WARD->setDbValue($rs->fields('WARD'));
		$this->OT->setDbValue($rs->fields('OT'));
		$this->IMPLANT->setDbValue($rs->fields('IMPLANT'));
		$this->LAB->setDbValue($rs->fields('LAB'));
		$this->PHARMACY->setDbValue($rs->fields('PHARMACY'));
		$this->OUT_SIDE_DRS_VISIT_NAME->setDbValue($rs->fields('OUT SIDE DRS VISIT NAME'));
		$this->OUT_SIDE_DRS_VISIT_NAME_Amount->setDbValue($rs->fields('OUT SIDE DRS VISIT NAME Amount'));
		$this->PHYSIO->setDbValue($rs->fields('PHYSIO'));
		$this->PHYSIO_Amount->setDbValue($rs->fields('PHYSIO Amount'));
		$this->SURGEON->setDbValue($rs->fields('SURGEON'));
		$this->SURGEON_Amount->setDbValue($rs->fields('SURGEON Amount'));
		$this->ASST_SURGEON->setDbValue($rs->fields('ASST SURGEON'));
		$this->ASST_SURGEON_Amount->setDbValue($rs->fields('ASST SURGEON Amount'));
		$this->ANESTHETIST->setDbValue($rs->fields('ANESTHETIST'));
		$this->ANESTHETIST_Amount->setDbValue($rs->fields('ANESTHETIST Amount'));
		$this->Others->setDbValue($rs->fields('Others'));
		$this->Other_Services->setDbValue($rs->fields('Other Services'));
		$this->Amount->setDbValue($rs->fields('Amount'));
		$this->ModeofPayment->setDbValue($rs->fields('ModeofPayment'));
		$this->Cash->setDbValue($rs->fields('Cash'));
		$this->Card->setDbValue($rs->fields('Card'));
		$this->Remarks->setDbValue($rs->fields('Remarks'));
		$this->DiscountRemarks->setDbValue($rs->fields('DiscountRemarks'));
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
		// PatientName
		// RefferedBy
		// CASES
		// WARD
		// OT
		// IMPLANT
		// LAB
		// PHARMACY
		// OUT SIDE DRS VISIT NAME
		// OUT SIDE DRS VISIT NAME Amount
		// PHYSIO
		// PHYSIO Amount
		// SURGEON
		// SURGEON Amount
		// ASST SURGEON
		// ASST SURGEON Amount
		// ANESTHETIST
		// ANESTHETIST Amount
		// Others
		// Other Services
		// Amount
		// ModeofPayment
		// Cash
		// Card
		// Remarks
		// DiscountRemarks
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

		// PatientName
		$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
		$this->PatientName->ViewCustomAttributes = "";

		// RefferedBy
		$this->RefferedBy->ViewValue = $this->RefferedBy->CurrentValue;
		$this->RefferedBy->ViewCustomAttributes = "";

		// CASES
		$this->CASES->ViewValue = $this->CASES->CurrentValue;
		$this->CASES->ViewValue = FormatNumber($this->CASES->ViewValue, 2, -2, -2, -2);
		$this->CASES->ViewCustomAttributes = "";

		// WARD
		$this->WARD->ViewValue = $this->WARD->CurrentValue;
		$this->WARD->ViewValue = FormatNumber($this->WARD->ViewValue, 2, -2, -2, -2);
		$this->WARD->ViewCustomAttributes = "";

		// OT
		$this->OT->ViewValue = $this->OT->CurrentValue;
		$this->OT->ViewValue = FormatNumber($this->OT->ViewValue, 2, -2, -2, -2);
		$this->OT->ViewCustomAttributes = "";

		// IMPLANT
		$this->IMPLANT->ViewValue = $this->IMPLANT->CurrentValue;
		$this->IMPLANT->ViewValue = FormatNumber($this->IMPLANT->ViewValue, 2, -2, -2, -2);
		$this->IMPLANT->ViewCustomAttributes = "";

		// LAB
		$this->LAB->ViewValue = $this->LAB->CurrentValue;
		$this->LAB->ViewValue = FormatNumber($this->LAB->ViewValue, 2, -2, -2, -2);
		$this->LAB->ViewCustomAttributes = "";

		// PHARMACY
		$this->PHARMACY->ViewValue = $this->PHARMACY->CurrentValue;
		$this->PHARMACY->ViewValue = FormatNumber($this->PHARMACY->ViewValue, 2, -2, -2, -2);
		$this->PHARMACY->ViewCustomAttributes = "";

		// OUT SIDE DRS VISIT NAME
		$this->OUT_SIDE_DRS_VISIT_NAME->ViewValue = $this->OUT_SIDE_DRS_VISIT_NAME->CurrentValue;
		$this->OUT_SIDE_DRS_VISIT_NAME->ViewCustomAttributes = "";

		// OUT SIDE DRS VISIT NAME Amount
		$this->OUT_SIDE_DRS_VISIT_NAME_Amount->ViewValue = $this->OUT_SIDE_DRS_VISIT_NAME_Amount->CurrentValue;
		$this->OUT_SIDE_DRS_VISIT_NAME_Amount->ViewValue = FormatNumber($this->OUT_SIDE_DRS_VISIT_NAME_Amount->ViewValue, 2, -2, -2, -2);
		$this->OUT_SIDE_DRS_VISIT_NAME_Amount->ViewCustomAttributes = "";

		// PHYSIO
		$this->PHYSIO->ViewValue = $this->PHYSIO->CurrentValue;
		$this->PHYSIO->ViewCustomAttributes = "";

		// PHYSIO Amount
		$this->PHYSIO_Amount->ViewValue = $this->PHYSIO_Amount->CurrentValue;
		$this->PHYSIO_Amount->ViewValue = FormatNumber($this->PHYSIO_Amount->ViewValue, 2, -2, -2, -2);
		$this->PHYSIO_Amount->ViewCustomAttributes = "";

		// SURGEON
		$this->SURGEON->ViewValue = $this->SURGEON->CurrentValue;
		$this->SURGEON->ViewCustomAttributes = "";

		// SURGEON Amount
		$this->SURGEON_Amount->ViewValue = $this->SURGEON_Amount->CurrentValue;
		$this->SURGEON_Amount->ViewValue = FormatNumber($this->SURGEON_Amount->ViewValue, 2, -2, -2, -2);
		$this->SURGEON_Amount->ViewCustomAttributes = "";

		// ASST SURGEON
		$this->ASST_SURGEON->ViewValue = $this->ASST_SURGEON->CurrentValue;
		$this->ASST_SURGEON->ViewCustomAttributes = "";

		// ASST SURGEON Amount
		$this->ASST_SURGEON_Amount->ViewValue = $this->ASST_SURGEON_Amount->CurrentValue;
		$this->ASST_SURGEON_Amount->ViewValue = FormatNumber($this->ASST_SURGEON_Amount->ViewValue, 2, -2, -2, -2);
		$this->ASST_SURGEON_Amount->ViewCustomAttributes = "";

		// ANESTHETIST
		$this->ANESTHETIST->ViewValue = $this->ANESTHETIST->CurrentValue;
		$this->ANESTHETIST->ViewCustomAttributes = "";

		// ANESTHETIST Amount
		$this->ANESTHETIST_Amount->ViewValue = $this->ANESTHETIST_Amount->CurrentValue;
		$this->ANESTHETIST_Amount->ViewValue = FormatNumber($this->ANESTHETIST_Amount->ViewValue, 2, -2, -2, -2);
		$this->ANESTHETIST_Amount->ViewCustomAttributes = "";

		// Others
		$this->Others->ViewValue = $this->Others->CurrentValue;
		$this->Others->ViewValue = FormatNumber($this->Others->ViewValue, 2, -2, -2, -2);
		$this->Others->ViewCustomAttributes = "";

		// Other Services
		$this->Other_Services->ViewValue = $this->Other_Services->CurrentValue;
		$this->Other_Services->ViewCustomAttributes = "";

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

		// Remarks
		$this->Remarks->ViewValue = $this->Remarks->CurrentValue;
		$this->Remarks->ViewCustomAttributes = "";

		// DiscountRemarks
		$this->DiscountRemarks->ViewValue = $this->DiscountRemarks->CurrentValue;
		$this->DiscountRemarks->ViewCustomAttributes = "";

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

		// PatientName
		$this->PatientName->LinkCustomAttributes = "";
		$this->PatientName->HrefValue = "";
		$this->PatientName->TooltipValue = "";

		// RefferedBy
		$this->RefferedBy->LinkCustomAttributes = "";
		$this->RefferedBy->HrefValue = "";
		$this->RefferedBy->TooltipValue = "";

		// CASES
		$this->CASES->LinkCustomAttributes = "";
		$this->CASES->HrefValue = "";
		$this->CASES->TooltipValue = "";

		// WARD
		$this->WARD->LinkCustomAttributes = "";
		$this->WARD->HrefValue = "";
		$this->WARD->TooltipValue = "";

		// OT
		$this->OT->LinkCustomAttributes = "";
		$this->OT->HrefValue = "";
		$this->OT->TooltipValue = "";

		// IMPLANT
		$this->IMPLANT->LinkCustomAttributes = "";
		$this->IMPLANT->HrefValue = "";
		$this->IMPLANT->TooltipValue = "";

		// LAB
		$this->LAB->LinkCustomAttributes = "";
		$this->LAB->HrefValue = "";
		$this->LAB->TooltipValue = "";

		// PHARMACY
		$this->PHARMACY->LinkCustomAttributes = "";
		$this->PHARMACY->HrefValue = "";
		$this->PHARMACY->TooltipValue = "";

		// OUT SIDE DRS VISIT NAME
		$this->OUT_SIDE_DRS_VISIT_NAME->LinkCustomAttributes = "";
		$this->OUT_SIDE_DRS_VISIT_NAME->HrefValue = "";
		$this->OUT_SIDE_DRS_VISIT_NAME->TooltipValue = "";

		// OUT SIDE DRS VISIT NAME Amount
		$this->OUT_SIDE_DRS_VISIT_NAME_Amount->LinkCustomAttributes = "";
		$this->OUT_SIDE_DRS_VISIT_NAME_Amount->HrefValue = "";
		$this->OUT_SIDE_DRS_VISIT_NAME_Amount->TooltipValue = "";

		// PHYSIO
		$this->PHYSIO->LinkCustomAttributes = "";
		$this->PHYSIO->HrefValue = "";
		$this->PHYSIO->TooltipValue = "";

		// PHYSIO Amount
		$this->PHYSIO_Amount->LinkCustomAttributes = "";
		$this->PHYSIO_Amount->HrefValue = "";
		$this->PHYSIO_Amount->TooltipValue = "";

		// SURGEON
		$this->SURGEON->LinkCustomAttributes = "";
		$this->SURGEON->HrefValue = "";
		$this->SURGEON->TooltipValue = "";

		// SURGEON Amount
		$this->SURGEON_Amount->LinkCustomAttributes = "";
		$this->SURGEON_Amount->HrefValue = "";
		$this->SURGEON_Amount->TooltipValue = "";

		// ASST SURGEON
		$this->ASST_SURGEON->LinkCustomAttributes = "";
		$this->ASST_SURGEON->HrefValue = "";
		$this->ASST_SURGEON->TooltipValue = "";

		// ASST SURGEON Amount
		$this->ASST_SURGEON_Amount->LinkCustomAttributes = "";
		$this->ASST_SURGEON_Amount->HrefValue = "";
		$this->ASST_SURGEON_Amount->TooltipValue = "";

		// ANESTHETIST
		$this->ANESTHETIST->LinkCustomAttributes = "";
		$this->ANESTHETIST->HrefValue = "";
		$this->ANESTHETIST->TooltipValue = "";

		// ANESTHETIST Amount
		$this->ANESTHETIST_Amount->LinkCustomAttributes = "";
		$this->ANESTHETIST_Amount->HrefValue = "";
		$this->ANESTHETIST_Amount->TooltipValue = "";

		// Others
		$this->Others->LinkCustomAttributes = "";
		$this->Others->HrefValue = "";
		$this->Others->TooltipValue = "";

		// Other Services
		$this->Other_Services->LinkCustomAttributes = "";
		$this->Other_Services->HrefValue = "";
		$this->Other_Services->TooltipValue = "";

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

		// Remarks
		$this->Remarks->LinkCustomAttributes = "";
		$this->Remarks->HrefValue = "";
		$this->Remarks->TooltipValue = "";

		// DiscountRemarks
		$this->DiscountRemarks->LinkCustomAttributes = "";
		$this->DiscountRemarks->HrefValue = "";
		$this->DiscountRemarks->TooltipValue = "";

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

		// PatientName
		$this->PatientName->EditAttrs["class"] = "form-control";
		$this->PatientName->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
		$this->PatientName->EditValue = $this->PatientName->CurrentValue;
		$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

		// RefferedBy
		$this->RefferedBy->EditAttrs["class"] = "form-control";
		$this->RefferedBy->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->RefferedBy->CurrentValue = HtmlDecode($this->RefferedBy->CurrentValue);
		$this->RefferedBy->EditValue = $this->RefferedBy->CurrentValue;
		$this->RefferedBy->PlaceHolder = RemoveHtml($this->RefferedBy->caption());

		// CASES
		$this->CASES->EditAttrs["class"] = "form-control";
		$this->CASES->EditCustomAttributes = "";
		$this->CASES->EditValue = $this->CASES->CurrentValue;
		$this->CASES->PlaceHolder = RemoveHtml($this->CASES->caption());
		if (strval($this->CASES->EditValue) <> "" && is_numeric($this->CASES->EditValue))
			$this->CASES->EditValue = FormatNumber($this->CASES->EditValue, -2, -2, -2, -2);

		// WARD
		$this->WARD->EditAttrs["class"] = "form-control";
		$this->WARD->EditCustomAttributes = "";
		$this->WARD->EditValue = $this->WARD->CurrentValue;
		$this->WARD->PlaceHolder = RemoveHtml($this->WARD->caption());
		if (strval($this->WARD->EditValue) <> "" && is_numeric($this->WARD->EditValue))
			$this->WARD->EditValue = FormatNumber($this->WARD->EditValue, -2, -2, -2, -2);

		// OT
		$this->OT->EditAttrs["class"] = "form-control";
		$this->OT->EditCustomAttributes = "";
		$this->OT->EditValue = $this->OT->CurrentValue;
		$this->OT->PlaceHolder = RemoveHtml($this->OT->caption());
		if (strval($this->OT->EditValue) <> "" && is_numeric($this->OT->EditValue))
			$this->OT->EditValue = FormatNumber($this->OT->EditValue, -2, -2, -2, -2);

		// IMPLANT
		$this->IMPLANT->EditAttrs["class"] = "form-control";
		$this->IMPLANT->EditCustomAttributes = "";
		$this->IMPLANT->EditValue = $this->IMPLANT->CurrentValue;
		$this->IMPLANT->PlaceHolder = RemoveHtml($this->IMPLANT->caption());
		if (strval($this->IMPLANT->EditValue) <> "" && is_numeric($this->IMPLANT->EditValue))
			$this->IMPLANT->EditValue = FormatNumber($this->IMPLANT->EditValue, -2, -2, -2, -2);

		// LAB
		$this->LAB->EditAttrs["class"] = "form-control";
		$this->LAB->EditCustomAttributes = "";
		$this->LAB->EditValue = $this->LAB->CurrentValue;
		$this->LAB->PlaceHolder = RemoveHtml($this->LAB->caption());
		if (strval($this->LAB->EditValue) <> "" && is_numeric($this->LAB->EditValue))
			$this->LAB->EditValue = FormatNumber($this->LAB->EditValue, -2, -2, -2, -2);

		// PHARMACY
		$this->PHARMACY->EditAttrs["class"] = "form-control";
		$this->PHARMACY->EditCustomAttributes = "";
		$this->PHARMACY->EditValue = $this->PHARMACY->CurrentValue;
		$this->PHARMACY->PlaceHolder = RemoveHtml($this->PHARMACY->caption());
		if (strval($this->PHARMACY->EditValue) <> "" && is_numeric($this->PHARMACY->EditValue))
			$this->PHARMACY->EditValue = FormatNumber($this->PHARMACY->EditValue, -2, -2, -2, -2);

		// OUT SIDE DRS VISIT NAME
		$this->OUT_SIDE_DRS_VISIT_NAME->EditAttrs["class"] = "form-control";
		$this->OUT_SIDE_DRS_VISIT_NAME->EditCustomAttributes = "";
		$this->OUT_SIDE_DRS_VISIT_NAME->EditValue = $this->OUT_SIDE_DRS_VISIT_NAME->CurrentValue;
		$this->OUT_SIDE_DRS_VISIT_NAME->PlaceHolder = RemoveHtml($this->OUT_SIDE_DRS_VISIT_NAME->caption());

		// OUT SIDE DRS VISIT NAME Amount
		$this->OUT_SIDE_DRS_VISIT_NAME_Amount->EditAttrs["class"] = "form-control";
		$this->OUT_SIDE_DRS_VISIT_NAME_Amount->EditCustomAttributes = "";
		$this->OUT_SIDE_DRS_VISIT_NAME_Amount->EditValue = $this->OUT_SIDE_DRS_VISIT_NAME_Amount->CurrentValue;
		$this->OUT_SIDE_DRS_VISIT_NAME_Amount->PlaceHolder = RemoveHtml($this->OUT_SIDE_DRS_VISIT_NAME_Amount->caption());
		if (strval($this->OUT_SIDE_DRS_VISIT_NAME_Amount->EditValue) <> "" && is_numeric($this->OUT_SIDE_DRS_VISIT_NAME_Amount->EditValue))
			$this->OUT_SIDE_DRS_VISIT_NAME_Amount->EditValue = FormatNumber($this->OUT_SIDE_DRS_VISIT_NAME_Amount->EditValue, -2, -2, -2, -2);

		// PHYSIO
		$this->PHYSIO->EditAttrs["class"] = "form-control";
		$this->PHYSIO->EditCustomAttributes = "";
		$this->PHYSIO->EditValue = $this->PHYSIO->CurrentValue;
		$this->PHYSIO->PlaceHolder = RemoveHtml($this->PHYSIO->caption());

		// PHYSIO Amount
		$this->PHYSIO_Amount->EditAttrs["class"] = "form-control";
		$this->PHYSIO_Amount->EditCustomAttributes = "";
		$this->PHYSIO_Amount->EditValue = $this->PHYSIO_Amount->CurrentValue;
		$this->PHYSIO_Amount->PlaceHolder = RemoveHtml($this->PHYSIO_Amount->caption());
		if (strval($this->PHYSIO_Amount->EditValue) <> "" && is_numeric($this->PHYSIO_Amount->EditValue))
			$this->PHYSIO_Amount->EditValue = FormatNumber($this->PHYSIO_Amount->EditValue, -2, -2, -2, -2);

		// SURGEON
		$this->SURGEON->EditAttrs["class"] = "form-control";
		$this->SURGEON->EditCustomAttributes = "";
		$this->SURGEON->EditValue = $this->SURGEON->CurrentValue;
		$this->SURGEON->PlaceHolder = RemoveHtml($this->SURGEON->caption());

		// SURGEON Amount
		$this->SURGEON_Amount->EditAttrs["class"] = "form-control";
		$this->SURGEON_Amount->EditCustomAttributes = "";
		$this->SURGEON_Amount->EditValue = $this->SURGEON_Amount->CurrentValue;
		$this->SURGEON_Amount->PlaceHolder = RemoveHtml($this->SURGEON_Amount->caption());
		if (strval($this->SURGEON_Amount->EditValue) <> "" && is_numeric($this->SURGEON_Amount->EditValue))
			$this->SURGEON_Amount->EditValue = FormatNumber($this->SURGEON_Amount->EditValue, -2, -2, -2, -2);

		// ASST SURGEON
		$this->ASST_SURGEON->EditAttrs["class"] = "form-control";
		$this->ASST_SURGEON->EditCustomAttributes = "";
		$this->ASST_SURGEON->EditValue = $this->ASST_SURGEON->CurrentValue;
		$this->ASST_SURGEON->PlaceHolder = RemoveHtml($this->ASST_SURGEON->caption());

		// ASST SURGEON Amount
		$this->ASST_SURGEON_Amount->EditAttrs["class"] = "form-control";
		$this->ASST_SURGEON_Amount->EditCustomAttributes = "";
		$this->ASST_SURGEON_Amount->EditValue = $this->ASST_SURGEON_Amount->CurrentValue;
		$this->ASST_SURGEON_Amount->PlaceHolder = RemoveHtml($this->ASST_SURGEON_Amount->caption());
		if (strval($this->ASST_SURGEON_Amount->EditValue) <> "" && is_numeric($this->ASST_SURGEON_Amount->EditValue))
			$this->ASST_SURGEON_Amount->EditValue = FormatNumber($this->ASST_SURGEON_Amount->EditValue, -2, -2, -2, -2);

		// ANESTHETIST
		$this->ANESTHETIST->EditAttrs["class"] = "form-control";
		$this->ANESTHETIST->EditCustomAttributes = "";
		$this->ANESTHETIST->EditValue = $this->ANESTHETIST->CurrentValue;
		$this->ANESTHETIST->PlaceHolder = RemoveHtml($this->ANESTHETIST->caption());

		// ANESTHETIST Amount
		$this->ANESTHETIST_Amount->EditAttrs["class"] = "form-control";
		$this->ANESTHETIST_Amount->EditCustomAttributes = "";
		$this->ANESTHETIST_Amount->EditValue = $this->ANESTHETIST_Amount->CurrentValue;
		$this->ANESTHETIST_Amount->PlaceHolder = RemoveHtml($this->ANESTHETIST_Amount->caption());
		if (strval($this->ANESTHETIST_Amount->EditValue) <> "" && is_numeric($this->ANESTHETIST_Amount->EditValue))
			$this->ANESTHETIST_Amount->EditValue = FormatNumber($this->ANESTHETIST_Amount->EditValue, -2, -2, -2, -2);

		// Others
		$this->Others->EditAttrs["class"] = "form-control";
		$this->Others->EditCustomAttributes = "";
		$this->Others->EditValue = $this->Others->CurrentValue;
		$this->Others->PlaceHolder = RemoveHtml($this->Others->caption());
		if (strval($this->Others->EditValue) <> "" && is_numeric($this->Others->EditValue))
			$this->Others->EditValue = FormatNumber($this->Others->EditValue, -2, -2, -2, -2);

		// Other Services
		$this->Other_Services->EditAttrs["class"] = "form-control";
		$this->Other_Services->EditCustomAttributes = "";
		$this->Other_Services->EditValue = $this->Other_Services->CurrentValue;
		$this->Other_Services->PlaceHolder = RemoveHtml($this->Other_Services->caption());

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

		// Remarks
		$this->Remarks->EditAttrs["class"] = "form-control";
		$this->Remarks->EditCustomAttributes = "";
		$this->Remarks->EditValue = $this->Remarks->CurrentValue;
		$this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

		// DiscountRemarks
		$this->DiscountRemarks->EditAttrs["class"] = "form-control";
		$this->DiscountRemarks->EditCustomAttributes = "";
		$this->DiscountRemarks->EditValue = $this->DiscountRemarks->CurrentValue;
		$this->DiscountRemarks->PlaceHolder = RemoveHtml($this->DiscountRemarks->caption());

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
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->RefferedBy);
					$doc->exportCaption($this->CASES);
					$doc->exportCaption($this->WARD);
					$doc->exportCaption($this->OT);
					$doc->exportCaption($this->IMPLANT);
					$doc->exportCaption($this->LAB);
					$doc->exportCaption($this->PHARMACY);
					$doc->exportCaption($this->OUT_SIDE_DRS_VISIT_NAME);
					$doc->exportCaption($this->OUT_SIDE_DRS_VISIT_NAME_Amount);
					$doc->exportCaption($this->PHYSIO);
					$doc->exportCaption($this->PHYSIO_Amount);
					$doc->exportCaption($this->SURGEON);
					$doc->exportCaption($this->SURGEON_Amount);
					$doc->exportCaption($this->ASST_SURGEON);
					$doc->exportCaption($this->ASST_SURGEON_Amount);
					$doc->exportCaption($this->ANESTHETIST);
					$doc->exportCaption($this->ANESTHETIST_Amount);
					$doc->exportCaption($this->Others);
					$doc->exportCaption($this->Other_Services);
					$doc->exportCaption($this->Amount);
					$doc->exportCaption($this->ModeofPayment);
					$doc->exportCaption($this->Cash);
					$doc->exportCaption($this->Card);
					$doc->exportCaption($this->Remarks);
					$doc->exportCaption($this->DiscountRemarks);
					$doc->exportCaption($this->HospID);
				} else {
					$doc->exportCaption($this->DATE);
					$doc->exportCaption($this->BillNumber);
					$doc->exportCaption($this->PatientId);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->RefferedBy);
					$doc->exportCaption($this->CASES);
					$doc->exportCaption($this->WARD);
					$doc->exportCaption($this->OT);
					$doc->exportCaption($this->IMPLANT);
					$doc->exportCaption($this->LAB);
					$doc->exportCaption($this->PHARMACY);
					$doc->exportCaption($this->OUT_SIDE_DRS_VISIT_NAME_Amount);
					$doc->exportCaption($this->PHYSIO_Amount);
					$doc->exportCaption($this->SURGEON_Amount);
					$doc->exportCaption($this->ASST_SURGEON_Amount);
					$doc->exportCaption($this->ANESTHETIST_Amount);
					$doc->exportCaption($this->Others);
					$doc->exportCaption($this->Amount);
					$doc->exportCaption($this->ModeofPayment);
					$doc->exportCaption($this->Cash);
					$doc->exportCaption($this->Card);
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
						$doc->exportField($this->PatientName);
						$doc->exportField($this->RefferedBy);
						$doc->exportField($this->CASES);
						$doc->exportField($this->WARD);
						$doc->exportField($this->OT);
						$doc->exportField($this->IMPLANT);
						$doc->exportField($this->LAB);
						$doc->exportField($this->PHARMACY);
						$doc->exportField($this->OUT_SIDE_DRS_VISIT_NAME);
						$doc->exportField($this->OUT_SIDE_DRS_VISIT_NAME_Amount);
						$doc->exportField($this->PHYSIO);
						$doc->exportField($this->PHYSIO_Amount);
						$doc->exportField($this->SURGEON);
						$doc->exportField($this->SURGEON_Amount);
						$doc->exportField($this->ASST_SURGEON);
						$doc->exportField($this->ASST_SURGEON_Amount);
						$doc->exportField($this->ANESTHETIST);
						$doc->exportField($this->ANESTHETIST_Amount);
						$doc->exportField($this->Others);
						$doc->exportField($this->Other_Services);
						$doc->exportField($this->Amount);
						$doc->exportField($this->ModeofPayment);
						$doc->exportField($this->Cash);
						$doc->exportField($this->Card);
						$doc->exportField($this->Remarks);
						$doc->exportField($this->DiscountRemarks);
						$doc->exportField($this->HospID);
					} else {
						$doc->exportField($this->DATE);
						$doc->exportField($this->BillNumber);
						$doc->exportField($this->PatientId);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->RefferedBy);
						$doc->exportField($this->CASES);
						$doc->exportField($this->WARD);
						$doc->exportField($this->OT);
						$doc->exportField($this->IMPLANT);
						$doc->exportField($this->LAB);
						$doc->exportField($this->PHARMACY);
						$doc->exportField($this->OUT_SIDE_DRS_VISIT_NAME_Amount);
						$doc->exportField($this->PHYSIO_Amount);
						$doc->exportField($this->SURGEON_Amount);
						$doc->exportField($this->ASST_SURGEON_Amount);
						$doc->exportField($this->ANESTHETIST_Amount);
						$doc->exportField($this->Others);
						$doc->exportField($this->Amount);
						$doc->exportField($this->ModeofPayment);
						$doc->exportField($this->Cash);
						$doc->exportField($this->Card);
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