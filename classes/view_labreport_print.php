<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for view_labreport_print
 */
class view_labreport_print extends DbTable
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
	public $id;
	public $PatID;
	public $PatientName;
	public $Age;
	public $Gender;
	public $sid;
	public $ItemCode;
	public $DEptCd;
	public $Resulted;
	public $Services;
	public $LabReport;
	public $Pic1;
	public $Pic2;
	public $TestUnit;
	public $RefValue;
	public $Order;
	public $Repeated;
	public $Vid;
	public $invoiceId;
	public $DrID;
	public $DrCODE;
	public $DrName;
	public $Department;
	public $createddatetime;
	public $status;
	public $TestType;
	public $ResultDate;
	public $ResultedBy;
	public $Printed;
	public $PrintBy;
	public $PrintDate;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'view_labreport_print';
		$this->TableName = 'view_labreport_print';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`view_labreport_print`";
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

		// id
		$this->id = new DbField('view_labreport_print', 'view_labreport_print', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->IsForeignKey = TRUE; // Foreign key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// PatID
		$this->PatID = new DbField('view_labreport_print', 'view_labreport_print', 'x_PatID', 'PatID', '`PatID`', '`PatID`', 3, -1, FALSE, '`PatID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatID->Sortable = TRUE; // Allow sort
		$this->PatID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['PatID'] = &$this->PatID;

		// PatientName
		$this->PatientName = new DbField('view_labreport_print', 'view_labreport_print', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, -1, FALSE, '`PatientName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientName->Sortable = TRUE; // Allow sort
		$this->fields['PatientName'] = &$this->PatientName;

		// Age
		$this->Age = new DbField('view_labreport_print', 'view_labreport_print', 'x_Age', 'Age', '`Age`', '`Age`', 200, -1, FALSE, '`Age`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Age->Sortable = TRUE; // Allow sort
		$this->fields['Age'] = &$this->Age;

		// Gender
		$this->Gender = new DbField('view_labreport_print', 'view_labreport_print', 'x_Gender', 'Gender', '`Gender`', '`Gender`', 200, -1, FALSE, '`Gender`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Gender->Sortable = TRUE; // Allow sort
		$this->fields['Gender'] = &$this->Gender;

		// sid
		$this->sid = new DbField('view_labreport_print', 'view_labreport_print', 'x_sid', 'sid', '`sid`', '`sid`', 3, -1, FALSE, '`sid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sid->Sortable = TRUE; // Allow sort
		$this->sid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['sid'] = &$this->sid;

		// ItemCode
		$this->ItemCode = new DbField('view_labreport_print', 'view_labreport_print', 'x_ItemCode', 'ItemCode', '`ItemCode`', '`ItemCode`', 200, -1, FALSE, '`ItemCode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ItemCode->Sortable = TRUE; // Allow sort
		$this->fields['ItemCode'] = &$this->ItemCode;

		// DEptCd
		$this->DEptCd = new DbField('view_labreport_print', 'view_labreport_print', 'x_DEptCd', 'DEptCd', '`DEptCd`', '`DEptCd`', 200, -1, FALSE, '`DEptCd`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DEptCd->Sortable = TRUE; // Allow sort
		$this->fields['DEptCd'] = &$this->DEptCd;

		// Resulted
		$this->Resulted = new DbField('view_labreport_print', 'view_labreport_print', 'x_Resulted', 'Resulted', '`Resulted`', '`Resulted`', 200, -1, FALSE, '`Resulted`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Resulted->Sortable = TRUE; // Allow sort
		$this->fields['Resulted'] = &$this->Resulted;

		// Services
		$this->Services = new DbField('view_labreport_print', 'view_labreport_print', 'x_Services', 'Services', '`Services`', '`Services`', 200, -1, FALSE, '`Services`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Services->Nullable = FALSE; // NOT NULL field
		$this->Services->Required = TRUE; // Required field
		$this->Services->Sortable = TRUE; // Allow sort
		$this->fields['Services'] = &$this->Services;

		// LabReport
		$this->LabReport = new DbField('view_labreport_print', 'view_labreport_print', 'x_LabReport', 'LabReport', '`LabReport`', '`LabReport`', 201, -1, FALSE, '`LabReport`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->LabReport->Sortable = TRUE; // Allow sort
		$this->fields['LabReport'] = &$this->LabReport;

		// Pic1
		$this->Pic1 = new DbField('view_labreport_print', 'view_labreport_print', 'x_Pic1', 'Pic1', '`Pic1`', '`Pic1`', 200, -1, FALSE, '`Pic1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Pic1->Sortable = TRUE; // Allow sort
		$this->fields['Pic1'] = &$this->Pic1;

		// Pic2
		$this->Pic2 = new DbField('view_labreport_print', 'view_labreport_print', 'x_Pic2', 'Pic2', '`Pic2`', '`Pic2`', 200, -1, FALSE, '`Pic2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Pic2->Sortable = TRUE; // Allow sort
		$this->fields['Pic2'] = &$this->Pic2;

		// TestUnit
		$this->TestUnit = new DbField('view_labreport_print', 'view_labreport_print', 'x_TestUnit', 'TestUnit', '`TestUnit`', '`TestUnit`', 200, -1, FALSE, '`TestUnit`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TestUnit->Sortable = TRUE; // Allow sort
		$this->fields['TestUnit'] = &$this->TestUnit;

		// RefValue
		$this->RefValue = new DbField('view_labreport_print', 'view_labreport_print', 'x_RefValue', 'RefValue', '`RefValue`', '`RefValue`', 201, -1, FALSE, '`RefValue`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->RefValue->Sortable = TRUE; // Allow sort
		$this->fields['RefValue'] = &$this->RefValue;

		// Order
		$this->Order = new DbField('view_labreport_print', 'view_labreport_print', 'x_Order', 'Order', '`Order`', '`Order`', 131, -1, FALSE, '`Order`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Order->Sortable = TRUE; // Allow sort
		$this->Order->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Order'] = &$this->Order;

		// Repeated
		$this->Repeated = new DbField('view_labreport_print', 'view_labreport_print', 'x_Repeated', 'Repeated', '`Repeated`', '`Repeated`', 200, -1, FALSE, '`Repeated`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Repeated->Sortable = TRUE; // Allow sort
		$this->fields['Repeated'] = &$this->Repeated;

		// Vid
		$this->Vid = new DbField('view_labreport_print', 'view_labreport_print', 'x_Vid', 'Vid', '`Vid`', '`Vid`', 3, -1, FALSE, '`Vid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Vid->Sortable = TRUE; // Allow sort
		$this->Vid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Vid'] = &$this->Vid;

		// invoiceId
		$this->invoiceId = new DbField('view_labreport_print', 'view_labreport_print', 'x_invoiceId', 'invoiceId', '`invoiceId`', '`invoiceId`', 3, -1, FALSE, '`invoiceId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->invoiceId->Sortable = TRUE; // Allow sort
		$this->invoiceId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['invoiceId'] = &$this->invoiceId;

		// DrID
		$this->DrID = new DbField('view_labreport_print', 'view_labreport_print', 'x_DrID', 'DrID', '`DrID`', '`DrID`', 3, -1, FALSE, '`DrID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DrID->Sortable = TRUE; // Allow sort
		$this->DrID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['DrID'] = &$this->DrID;

		// DrCODE
		$this->DrCODE = new DbField('view_labreport_print', 'view_labreport_print', 'x_DrCODE', 'DrCODE', '`DrCODE`', '`DrCODE`', 200, -1, FALSE, '`DrCODE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DrCODE->Sortable = TRUE; // Allow sort
		$this->fields['DrCODE'] = &$this->DrCODE;

		// DrName
		$this->DrName = new DbField('view_labreport_print', 'view_labreport_print', 'x_DrName', 'DrName', '`DrName`', '`DrName`', 200, -1, FALSE, '`DrName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DrName->Sortable = TRUE; // Allow sort
		$this->fields['DrName'] = &$this->DrName;

		// Department
		$this->Department = new DbField('view_labreport_print', 'view_labreport_print', 'x_Department', 'Department', '`Department`', '`Department`', 200, -1, FALSE, '`Department`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Department->Sortable = TRUE; // Allow sort
		$this->fields['Department'] = &$this->Department;

		// createddatetime
		$this->createddatetime = new DbField('view_labreport_print', 'view_labreport_print', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike('`createddatetime`', 0, "DB"), 135, 0, FALSE, '`createddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = TRUE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['createddatetime'] = &$this->createddatetime;

		// status
		$this->status = new DbField('view_labreport_print', 'view_labreport_print', 'x_status', 'status', '`status`', '`status`', 3, -1, FALSE, '`status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->status->Sortable = TRUE; // Allow sort
		$this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['status'] = &$this->status;

		// TestType
		$this->TestType = new DbField('view_labreport_print', 'view_labreport_print', 'x_TestType', 'TestType', '`TestType`', '`TestType`', 200, -1, FALSE, '`TestType`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TestType->Sortable = TRUE; // Allow sort
		$this->fields['TestType'] = &$this->TestType;

		// ResultDate
		$this->ResultDate = new DbField('view_labreport_print', 'view_labreport_print', 'x_ResultDate', 'ResultDate', '`ResultDate`', CastDateFieldForLike('`ResultDate`', 0, "DB"), 135, 0, FALSE, '`ResultDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ResultDate->Sortable = TRUE; // Allow sort
		$this->ResultDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['ResultDate'] = &$this->ResultDate;

		// ResultedBy
		$this->ResultedBy = new DbField('view_labreport_print', 'view_labreport_print', 'x_ResultedBy', 'ResultedBy', '`ResultedBy`', '`ResultedBy`', 200, -1, FALSE, '`ResultedBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ResultedBy->Sortable = TRUE; // Allow sort
		$this->fields['ResultedBy'] = &$this->ResultedBy;

		// Printed
		$this->Printed = new DbField('view_labreport_print', 'view_labreport_print', 'x_Printed', 'Printed', '`Printed`', '`Printed`', 200, -1, FALSE, '`Printed`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Printed->Sortable = TRUE; // Allow sort
		$this->fields['Printed'] = &$this->Printed;

		// PrintBy
		$this->PrintBy = new DbField('view_labreport_print', 'view_labreport_print', 'x_PrintBy', 'PrintBy', '`PrintBy`', '`PrintBy`', 200, -1, FALSE, '`PrintBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PrintBy->Sortable = TRUE; // Allow sort
		$this->fields['PrintBy'] = &$this->PrintBy;

		// PrintDate
		$this->PrintDate = new DbField('view_labreport_print', 'view_labreport_print', 'x_PrintDate', 'PrintDate', '`PrintDate`', CastDateFieldForLike('`PrintDate`', 0, "DB"), 135, 0, FALSE, '`PrintDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PrintDate->Sortable = TRUE; // Allow sort
		$this->PrintDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['PrintDate'] = &$this->PrintDate;
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
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_DETAIL_TABLE];
	}
	public function setCurrentDetailTable($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_DETAIL_TABLE] = $v;
	}

	// Get detail url
	public function getDetailUrl()
	{

		// Detail url
		$detailUrl = "";
		if ($this->getCurrentDetailTable() == "view_lab_resultreleased") {
			$detailUrl = $GLOBALS["view_lab_resultreleased"]->getListUrl() . "?" . TABLE_SHOW_MASTER . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
		}
		if ($detailUrl == "")
			$detailUrl = "view_labreport_printlist.php";
		return $detailUrl;
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`view_labreport_print`";
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
		$this->TableFilter = "";
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

			// Get insert id if necessary
			$this->id->setDbValue($conn->insert_ID());
			$rs['id'] = $this->id->DbValue;
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
			if (array_key_exists('id', $rs))
				AddFilter($where, QuotedName('id', $this->Dbid) . '=' . QuotedValue($rs['id'], $this->id->DataType, $this->Dbid));
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
		$this->id->DbValue = $row['id'];
		$this->PatID->DbValue = $row['PatID'];
		$this->PatientName->DbValue = $row['PatientName'];
		$this->Age->DbValue = $row['Age'];
		$this->Gender->DbValue = $row['Gender'];
		$this->sid->DbValue = $row['sid'];
		$this->ItemCode->DbValue = $row['ItemCode'];
		$this->DEptCd->DbValue = $row['DEptCd'];
		$this->Resulted->DbValue = $row['Resulted'];
		$this->Services->DbValue = $row['Services'];
		$this->LabReport->DbValue = $row['LabReport'];
		$this->Pic1->DbValue = $row['Pic1'];
		$this->Pic2->DbValue = $row['Pic2'];
		$this->TestUnit->DbValue = $row['TestUnit'];
		$this->RefValue->DbValue = $row['RefValue'];
		$this->Order->DbValue = $row['Order'];
		$this->Repeated->DbValue = $row['Repeated'];
		$this->Vid->DbValue = $row['Vid'];
		$this->invoiceId->DbValue = $row['invoiceId'];
		$this->DrID->DbValue = $row['DrID'];
		$this->DrCODE->DbValue = $row['DrCODE'];
		$this->DrName->DbValue = $row['DrName'];
		$this->Department->DbValue = $row['Department'];
		$this->createddatetime->DbValue = $row['createddatetime'];
		$this->status->DbValue = $row['status'];
		$this->TestType->DbValue = $row['TestType'];
		$this->ResultDate->DbValue = $row['ResultDate'];
		$this->ResultedBy->DbValue = $row['ResultedBy'];
		$this->Printed->DbValue = $row['Printed'];
		$this->PrintBy->DbValue = $row['PrintBy'];
		$this->PrintDate->DbValue = $row['PrintDate'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`id` = @id@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('id', $row) ? $row['id'] : NULL) : $this->id->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@id@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "view_labreport_printlist.php";
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
		if ($pageName == "view_labreport_printview.php")
			return $Language->phrase("View");
		elseif ($pageName == "view_labreport_printedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "view_labreport_printadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "view_labreport_printlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("view_labreport_printview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_labreport_printview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "view_labreport_printadd.php?" . $this->getUrlParm($parm);
		else
			$url = "view_labreport_printadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("view_labreport_printedit.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_labreport_printedit.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
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
		if ($parm <> "")
			$url = $this->keyUrl("view_labreport_printadd.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_labreport_printadd.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
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
		return $this->keyUrl("view_labreport_printdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "id:" . JsonEncode($this->id->CurrentValue, "number");
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
		if ($this->id->CurrentValue != NULL) {
			$url .= "id=" . urlencode($this->id->CurrentValue);
		} else {
			return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
		}
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
			if (Param("id") !== NULL)
				$arKeys[] = Param("id");
			elseif (IsApi() && Key(0) !== NULL)
				$arKeys[] = Key(0);
			elseif (IsApi() && Route(2) !== NULL)
				$arKeys[] = Route(2);
			else
				$arKeys = NULL; // Do not setup

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = array();
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				if (!is_numeric($key))
					continue;
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
			$this->id->CurrentValue = $key;
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
		$this->id->setDbValue($rs->fields('id'));
		$this->PatID->setDbValue($rs->fields('PatID'));
		$this->PatientName->setDbValue($rs->fields('PatientName'));
		$this->Age->setDbValue($rs->fields('Age'));
		$this->Gender->setDbValue($rs->fields('Gender'));
		$this->sid->setDbValue($rs->fields('sid'));
		$this->ItemCode->setDbValue($rs->fields('ItemCode'));
		$this->DEptCd->setDbValue($rs->fields('DEptCd'));
		$this->Resulted->setDbValue($rs->fields('Resulted'));
		$this->Services->setDbValue($rs->fields('Services'));
		$this->LabReport->setDbValue($rs->fields('LabReport'));
		$this->Pic1->setDbValue($rs->fields('Pic1'));
		$this->Pic2->setDbValue($rs->fields('Pic2'));
		$this->TestUnit->setDbValue($rs->fields('TestUnit'));
		$this->RefValue->setDbValue($rs->fields('RefValue'));
		$this->Order->setDbValue($rs->fields('Order'));
		$this->Repeated->setDbValue($rs->fields('Repeated'));
		$this->Vid->setDbValue($rs->fields('Vid'));
		$this->invoiceId->setDbValue($rs->fields('invoiceId'));
		$this->DrID->setDbValue($rs->fields('DrID'));
		$this->DrCODE->setDbValue($rs->fields('DrCODE'));
		$this->DrName->setDbValue($rs->fields('DrName'));
		$this->Department->setDbValue($rs->fields('Department'));
		$this->createddatetime->setDbValue($rs->fields('createddatetime'));
		$this->status->setDbValue($rs->fields('status'));
		$this->TestType->setDbValue($rs->fields('TestType'));
		$this->ResultDate->setDbValue($rs->fields('ResultDate'));
		$this->ResultedBy->setDbValue($rs->fields('ResultedBy'));
		$this->Printed->setDbValue($rs->fields('Printed'));
		$this->PrintBy->setDbValue($rs->fields('PrintBy'));
		$this->PrintDate->setDbValue($rs->fields('PrintDate'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// PatID
		// PatientName
		// Age
		// Gender
		// sid
		// ItemCode
		// DEptCd
		// Resulted
		// Services
		// LabReport
		// Pic1
		// Pic2
		// TestUnit
		// RefValue
		// Order
		// Repeated
		// Vid
		// invoiceId
		// DrID
		// DrCODE
		// DrName
		// Department
		// createddatetime
		// status
		// TestType
		// ResultDate
		// ResultedBy
		// Printed
		// PrintBy
		// PrintDate
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// PatID
		$this->PatID->ViewValue = $this->PatID->CurrentValue;
		$this->PatID->ViewValue = FormatNumber($this->PatID->ViewValue, 0, -2, -2, -2);
		$this->PatID->ViewCustomAttributes = "";

		// PatientName
		$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
		$this->PatientName->ViewCustomAttributes = "";

		// Age
		$this->Age->ViewValue = $this->Age->CurrentValue;
		$this->Age->ViewCustomAttributes = "";

		// Gender
		$this->Gender->ViewValue = $this->Gender->CurrentValue;
		$this->Gender->ViewCustomAttributes = "";

		// sid
		$this->sid->ViewValue = $this->sid->CurrentValue;
		$this->sid->ViewValue = FormatNumber($this->sid->ViewValue, 0, -2, -2, -2);
		$this->sid->ViewCustomAttributes = "";

		// ItemCode
		$this->ItemCode->ViewValue = $this->ItemCode->CurrentValue;
		$this->ItemCode->ViewCustomAttributes = "";

		// DEptCd
		$this->DEptCd->ViewValue = $this->DEptCd->CurrentValue;
		$this->DEptCd->ViewCustomAttributes = "";

		// Resulted
		$this->Resulted->ViewValue = $this->Resulted->CurrentValue;
		$this->Resulted->ViewCustomAttributes = "";

		// Services
		$this->Services->ViewValue = $this->Services->CurrentValue;
		$this->Services->ViewCustomAttributes = "";

		// LabReport
		$this->LabReport->ViewValue = $this->LabReport->CurrentValue;
		$this->LabReport->ViewCustomAttributes = "";

		// Pic1
		$this->Pic1->ViewValue = $this->Pic1->CurrentValue;
		$this->Pic1->ViewCustomAttributes = "";

		// Pic2
		$this->Pic2->ViewValue = $this->Pic2->CurrentValue;
		$this->Pic2->ViewCustomAttributes = "";

		// TestUnit
		$this->TestUnit->ViewValue = $this->TestUnit->CurrentValue;
		$this->TestUnit->ViewCustomAttributes = "";

		// RefValue
		$this->RefValue->ViewValue = $this->RefValue->CurrentValue;
		$this->RefValue->ViewCustomAttributes = "";

		// Order
		$this->Order->ViewValue = $this->Order->CurrentValue;
		$this->Order->ViewValue = FormatNumber($this->Order->ViewValue, 2, -2, -2, -2);
		$this->Order->ViewCustomAttributes = "";

		// Repeated
		$this->Repeated->ViewValue = $this->Repeated->CurrentValue;
		$this->Repeated->ViewCustomAttributes = "";

		// Vid
		$this->Vid->ViewValue = $this->Vid->CurrentValue;
		$this->Vid->ViewValue = FormatNumber($this->Vid->ViewValue, 0, -2, -2, -2);
		$this->Vid->ViewCustomAttributes = "";

		// invoiceId
		$this->invoiceId->ViewValue = $this->invoiceId->CurrentValue;
		$this->invoiceId->ViewValue = FormatNumber($this->invoiceId->ViewValue, 0, -2, -2, -2);
		$this->invoiceId->ViewCustomAttributes = "";

		// DrID
		$this->DrID->ViewValue = $this->DrID->CurrentValue;
		$this->DrID->ViewValue = FormatNumber($this->DrID->ViewValue, 0, -2, -2, -2);
		$this->DrID->ViewCustomAttributes = "";

		// DrCODE
		$this->DrCODE->ViewValue = $this->DrCODE->CurrentValue;
		$this->DrCODE->ViewCustomAttributes = "";

		// DrName
		$this->DrName->ViewValue = $this->DrName->CurrentValue;
		$this->DrName->ViewCustomAttributes = "";

		// Department
		$this->Department->ViewValue = $this->Department->CurrentValue;
		$this->Department->ViewCustomAttributes = "";

		// createddatetime
		$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
		$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
		$this->createddatetime->ViewCustomAttributes = "";

		// status
		$this->status->ViewValue = $this->status->CurrentValue;
		$this->status->ViewValue = FormatNumber($this->status->ViewValue, 0, -2, -2, -2);
		$this->status->ViewCustomAttributes = "";

		// TestType
		$this->TestType->ViewValue = $this->TestType->CurrentValue;
		$this->TestType->ViewCustomAttributes = "";

		// ResultDate
		$this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
		$this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 0);
		$this->ResultDate->ViewCustomAttributes = "";

		// ResultedBy
		$this->ResultedBy->ViewValue = $this->ResultedBy->CurrentValue;
		$this->ResultedBy->ViewCustomAttributes = "";

		// Printed
		$this->Printed->ViewValue = $this->Printed->CurrentValue;
		$this->Printed->ViewCustomAttributes = "";

		// PrintBy
		$this->PrintBy->ViewValue = $this->PrintBy->CurrentValue;
		$this->PrintBy->ViewCustomAttributes = "";

		// PrintDate
		$this->PrintDate->ViewValue = $this->PrintDate->CurrentValue;
		$this->PrintDate->ViewValue = FormatDateTime($this->PrintDate->ViewValue, 0);
		$this->PrintDate->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// PatID
		$this->PatID->LinkCustomAttributes = "";
		$this->PatID->HrefValue = "";
		$this->PatID->TooltipValue = "";

		// PatientName
		$this->PatientName->LinkCustomAttributes = "";
		$this->PatientName->HrefValue = "";
		$this->PatientName->TooltipValue = "";

		// Age
		$this->Age->LinkCustomAttributes = "";
		$this->Age->HrefValue = "";
		$this->Age->TooltipValue = "";

		// Gender
		$this->Gender->LinkCustomAttributes = "";
		$this->Gender->HrefValue = "";
		$this->Gender->TooltipValue = "";

		// sid
		$this->sid->LinkCustomAttributes = "";
		$this->sid->HrefValue = "";
		$this->sid->TooltipValue = "";

		// ItemCode
		$this->ItemCode->LinkCustomAttributes = "";
		$this->ItemCode->HrefValue = "";
		$this->ItemCode->TooltipValue = "";

		// DEptCd
		$this->DEptCd->LinkCustomAttributes = "";
		$this->DEptCd->HrefValue = "";
		$this->DEptCd->TooltipValue = "";

		// Resulted
		$this->Resulted->LinkCustomAttributes = "";
		$this->Resulted->HrefValue = "";
		$this->Resulted->TooltipValue = "";

		// Services
		$this->Services->LinkCustomAttributes = "";
		$this->Services->HrefValue = "";
		$this->Services->TooltipValue = "";

		// LabReport
		$this->LabReport->LinkCustomAttributes = "";
		$this->LabReport->HrefValue = "";
		$this->LabReport->TooltipValue = "";

		// Pic1
		$this->Pic1->LinkCustomAttributes = "";
		$this->Pic1->HrefValue = "";
		$this->Pic1->TooltipValue = "";

		// Pic2
		$this->Pic2->LinkCustomAttributes = "";
		$this->Pic2->HrefValue = "";
		$this->Pic2->TooltipValue = "";

		// TestUnit
		$this->TestUnit->LinkCustomAttributes = "";
		$this->TestUnit->HrefValue = "";
		$this->TestUnit->TooltipValue = "";

		// RefValue
		$this->RefValue->LinkCustomAttributes = "";
		$this->RefValue->HrefValue = "";
		$this->RefValue->TooltipValue = "";

		// Order
		$this->Order->LinkCustomAttributes = "";
		$this->Order->HrefValue = "";
		$this->Order->TooltipValue = "";

		// Repeated
		$this->Repeated->LinkCustomAttributes = "";
		$this->Repeated->HrefValue = "";
		$this->Repeated->TooltipValue = "";

		// Vid
		$this->Vid->LinkCustomAttributes = "";
		$this->Vid->HrefValue = "";
		$this->Vid->TooltipValue = "";

		// invoiceId
		$this->invoiceId->LinkCustomAttributes = "";
		$this->invoiceId->HrefValue = "";
		$this->invoiceId->TooltipValue = "";

		// DrID
		$this->DrID->LinkCustomAttributes = "";
		$this->DrID->HrefValue = "";
		$this->DrID->TooltipValue = "";

		// DrCODE
		$this->DrCODE->LinkCustomAttributes = "";
		$this->DrCODE->HrefValue = "";
		$this->DrCODE->TooltipValue = "";

		// DrName
		$this->DrName->LinkCustomAttributes = "";
		$this->DrName->HrefValue = "";
		$this->DrName->TooltipValue = "";

		// Department
		$this->Department->LinkCustomAttributes = "";
		$this->Department->HrefValue = "";
		$this->Department->TooltipValue = "";

		// createddatetime
		$this->createddatetime->LinkCustomAttributes = "";
		$this->createddatetime->HrefValue = "";
		$this->createddatetime->TooltipValue = "";

		// status
		$this->status->LinkCustomAttributes = "";
		$this->status->HrefValue = "";
		$this->status->TooltipValue = "";

		// TestType
		$this->TestType->LinkCustomAttributes = "";
		$this->TestType->HrefValue = "";
		$this->TestType->TooltipValue = "";

		// ResultDate
		$this->ResultDate->LinkCustomAttributes = "";
		$this->ResultDate->HrefValue = "";
		$this->ResultDate->TooltipValue = "";

		// ResultedBy
		$this->ResultedBy->LinkCustomAttributes = "";
		$this->ResultedBy->HrefValue = "";
		$this->ResultedBy->TooltipValue = "";

		// Printed
		$this->Printed->LinkCustomAttributes = "";
		$this->Printed->HrefValue = "";
		$this->Printed->TooltipValue = "";

		// PrintBy
		$this->PrintBy->LinkCustomAttributes = "";
		$this->PrintBy->HrefValue = "";
		$this->PrintBy->TooltipValue = "";

		// PrintDate
		$this->PrintDate->LinkCustomAttributes = "";
		$this->PrintDate->HrefValue = "";
		$this->PrintDate->TooltipValue = "";

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

		// id
		$this->id->EditAttrs["class"] = "form-control";
		$this->id->EditCustomAttributes = "";
		$this->id->EditValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// PatID
		$this->PatID->EditAttrs["class"] = "form-control";
		$this->PatID->EditCustomAttributes = "";
		$this->PatID->EditValue = $this->PatID->CurrentValue;
		$this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

		// PatientName
		$this->PatientName->EditAttrs["class"] = "form-control";
		$this->PatientName->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
		$this->PatientName->EditValue = $this->PatientName->CurrentValue;
		$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

		// Age
		$this->Age->EditAttrs["class"] = "form-control";
		$this->Age->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
		$this->Age->EditValue = $this->Age->CurrentValue;
		$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

		// Gender
		$this->Gender->EditAttrs["class"] = "form-control";
		$this->Gender->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Gender->CurrentValue = HtmlDecode($this->Gender->CurrentValue);
		$this->Gender->EditValue = $this->Gender->CurrentValue;
		$this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

		// sid
		$this->sid->EditAttrs["class"] = "form-control";
		$this->sid->EditCustomAttributes = "";
		$this->sid->EditValue = $this->sid->CurrentValue;
		$this->sid->PlaceHolder = RemoveHtml($this->sid->caption());

		// ItemCode
		$this->ItemCode->EditAttrs["class"] = "form-control";
		$this->ItemCode->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ItemCode->CurrentValue = HtmlDecode($this->ItemCode->CurrentValue);
		$this->ItemCode->EditValue = $this->ItemCode->CurrentValue;
		$this->ItemCode->PlaceHolder = RemoveHtml($this->ItemCode->caption());

		// DEptCd
		$this->DEptCd->EditAttrs["class"] = "form-control";
		$this->DEptCd->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->DEptCd->CurrentValue = HtmlDecode($this->DEptCd->CurrentValue);
		$this->DEptCd->EditValue = $this->DEptCd->CurrentValue;
		$this->DEptCd->PlaceHolder = RemoveHtml($this->DEptCd->caption());

		// Resulted
		$this->Resulted->EditAttrs["class"] = "form-control";
		$this->Resulted->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Resulted->CurrentValue = HtmlDecode($this->Resulted->CurrentValue);
		$this->Resulted->EditValue = $this->Resulted->CurrentValue;
		$this->Resulted->PlaceHolder = RemoveHtml($this->Resulted->caption());

		// Services
		$this->Services->EditAttrs["class"] = "form-control";
		$this->Services->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Services->CurrentValue = HtmlDecode($this->Services->CurrentValue);
		$this->Services->EditValue = $this->Services->CurrentValue;
		$this->Services->PlaceHolder = RemoveHtml($this->Services->caption());

		// LabReport
		$this->LabReport->EditAttrs["class"] = "form-control";
		$this->LabReport->EditCustomAttributes = "";
		$this->LabReport->EditValue = $this->LabReport->CurrentValue;
		$this->LabReport->PlaceHolder = RemoveHtml($this->LabReport->caption());

		// Pic1
		$this->Pic1->EditAttrs["class"] = "form-control";
		$this->Pic1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Pic1->CurrentValue = HtmlDecode($this->Pic1->CurrentValue);
		$this->Pic1->EditValue = $this->Pic1->CurrentValue;
		$this->Pic1->PlaceHolder = RemoveHtml($this->Pic1->caption());

		// Pic2
		$this->Pic2->EditAttrs["class"] = "form-control";
		$this->Pic2->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Pic2->CurrentValue = HtmlDecode($this->Pic2->CurrentValue);
		$this->Pic2->EditValue = $this->Pic2->CurrentValue;
		$this->Pic2->PlaceHolder = RemoveHtml($this->Pic2->caption());

		// TestUnit
		$this->TestUnit->EditAttrs["class"] = "form-control";
		$this->TestUnit->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->TestUnit->CurrentValue = HtmlDecode($this->TestUnit->CurrentValue);
		$this->TestUnit->EditValue = $this->TestUnit->CurrentValue;
		$this->TestUnit->PlaceHolder = RemoveHtml($this->TestUnit->caption());

		// RefValue
		$this->RefValue->EditAttrs["class"] = "form-control";
		$this->RefValue->EditCustomAttributes = "";
		$this->RefValue->EditValue = $this->RefValue->CurrentValue;
		$this->RefValue->PlaceHolder = RemoveHtml($this->RefValue->caption());

		// Order
		$this->Order->EditAttrs["class"] = "form-control";
		$this->Order->EditCustomAttributes = "";
		$this->Order->EditValue = $this->Order->CurrentValue;
		$this->Order->PlaceHolder = RemoveHtml($this->Order->caption());
		if (strval($this->Order->EditValue) <> "" && is_numeric($this->Order->EditValue))
			$this->Order->EditValue = FormatNumber($this->Order->EditValue, -2, -2, -2, -2);

		// Repeated
		$this->Repeated->EditAttrs["class"] = "form-control";
		$this->Repeated->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Repeated->CurrentValue = HtmlDecode($this->Repeated->CurrentValue);
		$this->Repeated->EditValue = $this->Repeated->CurrentValue;
		$this->Repeated->PlaceHolder = RemoveHtml($this->Repeated->caption());

		// Vid
		$this->Vid->EditAttrs["class"] = "form-control";
		$this->Vid->EditCustomAttributes = "";
		$this->Vid->EditValue = $this->Vid->CurrentValue;
		$this->Vid->PlaceHolder = RemoveHtml($this->Vid->caption());

		// invoiceId
		$this->invoiceId->EditAttrs["class"] = "form-control";
		$this->invoiceId->EditCustomAttributes = "";
		$this->invoiceId->EditValue = $this->invoiceId->CurrentValue;
		$this->invoiceId->PlaceHolder = RemoveHtml($this->invoiceId->caption());

		// DrID
		$this->DrID->EditAttrs["class"] = "form-control";
		$this->DrID->EditCustomAttributes = "";
		$this->DrID->EditValue = $this->DrID->CurrentValue;
		$this->DrID->PlaceHolder = RemoveHtml($this->DrID->caption());

		// DrCODE
		$this->DrCODE->EditAttrs["class"] = "form-control";
		$this->DrCODE->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->DrCODE->CurrentValue = HtmlDecode($this->DrCODE->CurrentValue);
		$this->DrCODE->EditValue = $this->DrCODE->CurrentValue;
		$this->DrCODE->PlaceHolder = RemoveHtml($this->DrCODE->caption());

		// DrName
		$this->DrName->EditAttrs["class"] = "form-control";
		$this->DrName->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->DrName->CurrentValue = HtmlDecode($this->DrName->CurrentValue);
		$this->DrName->EditValue = $this->DrName->CurrentValue;
		$this->DrName->PlaceHolder = RemoveHtml($this->DrName->caption());

		// Department
		$this->Department->EditAttrs["class"] = "form-control";
		$this->Department->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Department->CurrentValue = HtmlDecode($this->Department->CurrentValue);
		$this->Department->EditValue = $this->Department->CurrentValue;
		$this->Department->PlaceHolder = RemoveHtml($this->Department->caption());

		// createddatetime
		$this->createddatetime->EditAttrs["class"] = "form-control";
		$this->createddatetime->EditCustomAttributes = "";
		$this->createddatetime->EditValue = FormatDateTime($this->createddatetime->CurrentValue, 8);
		$this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

		// status
		$this->status->EditAttrs["class"] = "form-control";
		$this->status->EditCustomAttributes = "";
		$this->status->EditValue = $this->status->CurrentValue;
		$this->status->PlaceHolder = RemoveHtml($this->status->caption());

		// TestType
		$this->TestType->EditAttrs["class"] = "form-control";
		$this->TestType->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->TestType->CurrentValue = HtmlDecode($this->TestType->CurrentValue);
		$this->TestType->EditValue = $this->TestType->CurrentValue;
		$this->TestType->PlaceHolder = RemoveHtml($this->TestType->caption());

		// ResultDate
		$this->ResultDate->EditAttrs["class"] = "form-control";
		$this->ResultDate->EditCustomAttributes = "";
		$this->ResultDate->EditValue = FormatDateTime($this->ResultDate->CurrentValue, 8);
		$this->ResultDate->PlaceHolder = RemoveHtml($this->ResultDate->caption());

		// ResultedBy
		$this->ResultedBy->EditAttrs["class"] = "form-control";
		$this->ResultedBy->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ResultedBy->CurrentValue = HtmlDecode($this->ResultedBy->CurrentValue);
		$this->ResultedBy->EditValue = $this->ResultedBy->CurrentValue;
		$this->ResultedBy->PlaceHolder = RemoveHtml($this->ResultedBy->caption());

		// Printed
		$this->Printed->EditAttrs["class"] = "form-control";
		$this->Printed->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Printed->CurrentValue = HtmlDecode($this->Printed->CurrentValue);
		$this->Printed->EditValue = $this->Printed->CurrentValue;
		$this->Printed->PlaceHolder = RemoveHtml($this->Printed->caption());

		// PrintBy
		$this->PrintBy->EditAttrs["class"] = "form-control";
		$this->PrintBy->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PrintBy->CurrentValue = HtmlDecode($this->PrintBy->CurrentValue);
		$this->PrintBy->EditValue = $this->PrintBy->CurrentValue;
		$this->PrintBy->PlaceHolder = RemoveHtml($this->PrintBy->caption());

		// PrintDate
		$this->PrintDate->EditAttrs["class"] = "form-control";
		$this->PrintDate->EditCustomAttributes = "";
		$this->PrintDate->EditValue = FormatDateTime($this->PrintDate->CurrentValue, 8);
		$this->PrintDate->PlaceHolder = RemoveHtml($this->PrintDate->caption());

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
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->PatID);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->Age);
					$doc->exportCaption($this->Gender);
					$doc->exportCaption($this->sid);
					$doc->exportCaption($this->ItemCode);
					$doc->exportCaption($this->DEptCd);
					$doc->exportCaption($this->Resulted);
					$doc->exportCaption($this->Services);
					$doc->exportCaption($this->LabReport);
					$doc->exportCaption($this->Pic1);
					$doc->exportCaption($this->Pic2);
					$doc->exportCaption($this->TestUnit);
					$doc->exportCaption($this->RefValue);
					$doc->exportCaption($this->Order);
					$doc->exportCaption($this->Repeated);
					$doc->exportCaption($this->Vid);
					$doc->exportCaption($this->invoiceId);
					$doc->exportCaption($this->DrID);
					$doc->exportCaption($this->DrCODE);
					$doc->exportCaption($this->DrName);
					$doc->exportCaption($this->Department);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->TestType);
					$doc->exportCaption($this->ResultDate);
					$doc->exportCaption($this->ResultedBy);
					$doc->exportCaption($this->Printed);
					$doc->exportCaption($this->PrintBy);
					$doc->exportCaption($this->PrintDate);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->PatID);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->Age);
					$doc->exportCaption($this->Gender);
					$doc->exportCaption($this->sid);
					$doc->exportCaption($this->ItemCode);
					$doc->exportCaption($this->DEptCd);
					$doc->exportCaption($this->Resulted);
					$doc->exportCaption($this->Services);
					$doc->exportCaption($this->Pic1);
					$doc->exportCaption($this->Pic2);
					$doc->exportCaption($this->TestUnit);
					$doc->exportCaption($this->Order);
					$doc->exportCaption($this->Repeated);
					$doc->exportCaption($this->Vid);
					$doc->exportCaption($this->invoiceId);
					$doc->exportCaption($this->DrID);
					$doc->exportCaption($this->DrCODE);
					$doc->exportCaption($this->DrName);
					$doc->exportCaption($this->Department);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->TestType);
					$doc->exportCaption($this->ResultDate);
					$doc->exportCaption($this->ResultedBy);
					$doc->exportCaption($this->Printed);
					$doc->exportCaption($this->PrintBy);
					$doc->exportCaption($this->PrintDate);
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
						$doc->exportField($this->id);
						$doc->exportField($this->PatID);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->Age);
						$doc->exportField($this->Gender);
						$doc->exportField($this->sid);
						$doc->exportField($this->ItemCode);
						$doc->exportField($this->DEptCd);
						$doc->exportField($this->Resulted);
						$doc->exportField($this->Services);
						$doc->exportField($this->LabReport);
						$doc->exportField($this->Pic1);
						$doc->exportField($this->Pic2);
						$doc->exportField($this->TestUnit);
						$doc->exportField($this->RefValue);
						$doc->exportField($this->Order);
						$doc->exportField($this->Repeated);
						$doc->exportField($this->Vid);
						$doc->exportField($this->invoiceId);
						$doc->exportField($this->DrID);
						$doc->exportField($this->DrCODE);
						$doc->exportField($this->DrName);
						$doc->exportField($this->Department);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->status);
						$doc->exportField($this->TestType);
						$doc->exportField($this->ResultDate);
						$doc->exportField($this->ResultedBy);
						$doc->exportField($this->Printed);
						$doc->exportField($this->PrintBy);
						$doc->exportField($this->PrintDate);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->PatID);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->Age);
						$doc->exportField($this->Gender);
						$doc->exportField($this->sid);
						$doc->exportField($this->ItemCode);
						$doc->exportField($this->DEptCd);
						$doc->exportField($this->Resulted);
						$doc->exportField($this->Services);
						$doc->exportField($this->Pic1);
						$doc->exportField($this->Pic2);
						$doc->exportField($this->TestUnit);
						$doc->exportField($this->Order);
						$doc->exportField($this->Repeated);
						$doc->exportField($this->Vid);
						$doc->exportField($this->invoiceId);
						$doc->exportField($this->DrID);
						$doc->exportField($this->DrCODE);
						$doc->exportField($this->DrName);
						$doc->exportField($this->Department);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->status);
						$doc->exportField($this->TestType);
						$doc->exportField($this->ResultDate);
						$doc->exportField($this->ResultedBy);
						$doc->exportField($this->Printed);
						$doc->exportField($this->PrintBy);
						$doc->exportField($this->PrintDate);
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