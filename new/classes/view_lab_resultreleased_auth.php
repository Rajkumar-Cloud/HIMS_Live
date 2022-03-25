<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for view_lab_resultreleased_auth
 */
class view_lab_resultreleased_auth extends DbTable
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
	public $HospID;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'view_lab_resultreleased_auth';
		$this->TableName = 'view_lab_resultreleased_auth';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`view_lab_resultreleased_auth`";
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

		// id
		$this->id = new DbField('view_lab_resultreleased_auth', 'view_lab_resultreleased_auth', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// PatID
		$this->PatID = new DbField('view_lab_resultreleased_auth', 'view_lab_resultreleased_auth', 'x_PatID', 'PatID', '`PatID`', '`PatID`', 3, 11, -1, FALSE, '`PatID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatID->Sortable = TRUE; // Allow sort
		$this->PatID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['PatID'] = &$this->PatID;

		// PatientName
		$this->PatientName = new DbField('view_lab_resultreleased_auth', 'view_lab_resultreleased_auth', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, FALSE, '`PatientName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientName->Sortable = TRUE; // Allow sort
		$this->fields['PatientName'] = &$this->PatientName;

		// Age
		$this->Age = new DbField('view_lab_resultreleased_auth', 'view_lab_resultreleased_auth', 'x_Age', 'Age', '`Age`', '`Age`', 200, 45, -1, FALSE, '`Age`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Age->Sortable = TRUE; // Allow sort
		$this->fields['Age'] = &$this->Age;

		// Gender
		$this->Gender = new DbField('view_lab_resultreleased_auth', 'view_lab_resultreleased_auth', 'x_Gender', 'Gender', '`Gender`', '`Gender`', 200, 45, -1, FALSE, '`Gender`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Gender->Sortable = TRUE; // Allow sort
		$this->fields['Gender'] = &$this->Gender;

		// sid
		$this->sid = new DbField('view_lab_resultreleased_auth', 'view_lab_resultreleased_auth', 'x_sid', 'sid', '`sid`', '`sid`', 3, 11, -1, FALSE, '`sid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sid->Sortable = TRUE; // Allow sort
		$this->sid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['sid'] = &$this->sid;

		// ItemCode
		$this->ItemCode = new DbField('view_lab_resultreleased_auth', 'view_lab_resultreleased_auth', 'x_ItemCode', 'ItemCode', '`ItemCode`', '`ItemCode`', 200, 45, -1, FALSE, '`ItemCode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ItemCode->Sortable = TRUE; // Allow sort
		$this->fields['ItemCode'] = &$this->ItemCode;

		// DEptCd
		$this->DEptCd = new DbField('view_lab_resultreleased_auth', 'view_lab_resultreleased_auth', 'x_DEptCd', 'DEptCd', '`DEptCd`', '`DEptCd`', 200, 45, -1, FALSE, '`DEptCd`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DEptCd->Sortable = TRUE; // Allow sort
		$this->fields['DEptCd'] = &$this->DEptCd;

		// Resulted
		$this->Resulted = new DbField('view_lab_resultreleased_auth', 'view_lab_resultreleased_auth', 'x_Resulted', 'Resulted', '`Resulted`', '`Resulted`', 200, 45, -1, FALSE, '`Resulted`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->Resulted->Sortable = TRUE; // Allow sort
		$this->Resulted->Lookup = new Lookup('Resulted', 'view_lab_resultreleased_auth', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Resulted->OptionCount = 1;
		$this->fields['Resulted'] = &$this->Resulted;

		// Services
		$this->Services = new DbField('view_lab_resultreleased_auth', 'view_lab_resultreleased_auth', 'x_Services', 'Services', '`Services`', '`Services`', 200, 50, -1, FALSE, '`Services`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Services->Nullable = FALSE; // NOT NULL field
		$this->Services->Required = TRUE; // Required field
		$this->Services->Sortable = TRUE; // Allow sort
		$this->fields['Services'] = &$this->Services;

		// LabReport
		$this->LabReport = new DbField('view_lab_resultreleased_auth', 'view_lab_resultreleased_auth', 'x_LabReport', 'LabReport', '`LabReport`', '`LabReport`', 201, 65535, -1, FALSE, '`LabReport`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->LabReport->Sortable = TRUE; // Allow sort
		$this->fields['LabReport'] = &$this->LabReport;

		// Pic1
		$this->Pic1 = new DbField('view_lab_resultreleased_auth', 'view_lab_resultreleased_auth', 'x_Pic1', 'Pic1', '`Pic1`', '`Pic1`', 200, 45, -1, TRUE, '`Pic1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'FILE');
		$this->Pic1->Sortable = TRUE; // Allow sort
		$this->fields['Pic1'] = &$this->Pic1;

		// Pic2
		$this->Pic2 = new DbField('view_lab_resultreleased_auth', 'view_lab_resultreleased_auth', 'x_Pic2', 'Pic2', '`Pic2`', '`Pic2`', 200, 45, -1, TRUE, '`Pic2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'FILE');
		$this->Pic2->Sortable = TRUE; // Allow sort
		$this->fields['Pic2'] = &$this->Pic2;

		// TestUnit
		$this->TestUnit = new DbField('view_lab_resultreleased_auth', 'view_lab_resultreleased_auth', 'x_TestUnit', 'TestUnit', '`TestUnit`', '`TestUnit`', 200, 45, -1, FALSE, '`TestUnit`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TestUnit->Sortable = TRUE; // Allow sort
		$this->TestUnit->Lookup = new Lookup('TestUnit', 'lab_unit_mast', FALSE, 'Code', ["Name","","",""], [], [], [], [], [], [], '', '');
		$this->fields['TestUnit'] = &$this->TestUnit;

		// RefValue
		$this->RefValue = new DbField('view_lab_resultreleased_auth', 'view_lab_resultreleased_auth', 'x_RefValue', 'RefValue', '`RefValue`', '`RefValue`', 201, 65535, -1, FALSE, '`RefValue`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->RefValue->Sortable = TRUE; // Allow sort
		$this->fields['RefValue'] = &$this->RefValue;

		// Order
		$this->Order = new DbField('view_lab_resultreleased_auth', 'view_lab_resultreleased_auth', 'x_Order', 'Order', '`Order`', '`Order`', 131, 10, -1, FALSE, '`Order`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Order->Sortable = TRUE; // Allow sort
		$this->Order->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Order'] = &$this->Order;

		// Repeated
		$this->Repeated = new DbField('view_lab_resultreleased_auth', 'view_lab_resultreleased_auth', 'x_Repeated', 'Repeated', '`Repeated`', '`Repeated`', 200, 45, -1, FALSE, '`Repeated`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->Repeated->Sortable = TRUE; // Allow sort
		$this->Repeated->Lookup = new Lookup('Repeated', 'view_lab_resultreleased_auth', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Repeated->OptionCount = 1;
		$this->fields['Repeated'] = &$this->Repeated;

		// Vid
		$this->Vid = new DbField('view_lab_resultreleased_auth', 'view_lab_resultreleased_auth', 'x_Vid', 'Vid', '`Vid`', '`Vid`', 3, 11, -1, FALSE, '`Vid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Vid->IsForeignKey = TRUE; // Foreign key field
		$this->Vid->Sortable = TRUE; // Allow sort
		$this->Vid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Vid'] = &$this->Vid;

		// invoiceId
		$this->invoiceId = new DbField('view_lab_resultreleased_auth', 'view_lab_resultreleased_auth', 'x_invoiceId', 'invoiceId', '`invoiceId`', '`invoiceId`', 3, 11, -1, FALSE, '`invoiceId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->invoiceId->Sortable = TRUE; // Allow sort
		$this->invoiceId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['invoiceId'] = &$this->invoiceId;

		// DrID
		$this->DrID = new DbField('view_lab_resultreleased_auth', 'view_lab_resultreleased_auth', 'x_DrID', 'DrID', '`DrID`', '`DrID`', 3, 11, -1, FALSE, '`DrID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DrID->Sortable = TRUE; // Allow sort
		$this->DrID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['DrID'] = &$this->DrID;

		// DrCODE
		$this->DrCODE = new DbField('view_lab_resultreleased_auth', 'view_lab_resultreleased_auth', 'x_DrCODE', 'DrCODE', '`DrCODE`', '`DrCODE`', 200, 45, -1, FALSE, '`DrCODE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DrCODE->Sortable = TRUE; // Allow sort
		$this->fields['DrCODE'] = &$this->DrCODE;

		// DrName
		$this->DrName = new DbField('view_lab_resultreleased_auth', 'view_lab_resultreleased_auth', 'x_DrName', 'DrName', '`DrName`', '`DrName`', 200, 45, -1, FALSE, '`DrName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DrName->Sortable = TRUE; // Allow sort
		$this->fields['DrName'] = &$this->DrName;

		// Department
		$this->Department = new DbField('view_lab_resultreleased_auth', 'view_lab_resultreleased_auth', 'x_Department', 'Department', '`Department`', '`Department`', 200, 45, -1, FALSE, '`Department`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Department->Sortable = TRUE; // Allow sort
		$this->fields['Department'] = &$this->Department;

		// createddatetime
		$this->createddatetime = new DbField('view_lab_resultreleased_auth', 'view_lab_resultreleased_auth', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, FALSE, '`createddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = TRUE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['createddatetime'] = &$this->createddatetime;

		// status
		$this->status = new DbField('view_lab_resultreleased_auth', 'view_lab_resultreleased_auth', 'x_status', 'status', '`status`', '`status`', 3, 11, -1, FALSE, '`status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->status->Sortable = TRUE; // Allow sort
		$this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['status'] = &$this->status;

		// TestType
		$this->TestType = new DbField('view_lab_resultreleased_auth', 'view_lab_resultreleased_auth', 'x_TestType', 'TestType', '`TestType`', '`TestType`', 200, 45, -1, FALSE, '`TestType`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TestType->Sortable = TRUE; // Allow sort
		$this->fields['TestType'] = &$this->TestType;

		// ResultDate
		$this->ResultDate = new DbField('view_lab_resultreleased_auth', 'view_lab_resultreleased_auth', 'x_ResultDate', 'ResultDate', '`ResultDate`', CastDateFieldForLike("`ResultDate`", 0, "DB"), 135, 19, 0, FALSE, '`ResultDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ResultDate->Sortable = TRUE; // Allow sort
		$this->ResultDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['ResultDate'] = &$this->ResultDate;

		// ResultedBy
		$this->ResultedBy = new DbField('view_lab_resultreleased_auth', 'view_lab_resultreleased_auth', 'x_ResultedBy', 'ResultedBy', '`ResultedBy`', '`ResultedBy`', 200, 45, -1, FALSE, '`ResultedBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ResultedBy->Sortable = TRUE; // Allow sort
		$this->fields['ResultedBy'] = &$this->ResultedBy;

		// HospID
		$this->HospID = new DbField('view_lab_resultreleased_auth', 'view_lab_resultreleased_auth', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
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
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_MASTER_TABLE")];
	}
	public function setCurrentMasterTable($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_MASTER_TABLE")] = $v;
	}

	// Session master WHERE clause
	public function getMasterFilter()
	{

		// Master filter
		$masterFilter = "";
		if ($this->getCurrentMasterTable() == "view_lab_services_auth") {
			if ($this->Vid->getSessionValue() != "")
				$masterFilter .= "`id`=" . QuotedValue($this->Vid->getSessionValue(), DATATYPE_NUMBER, "DB");
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
		if ($this->getCurrentMasterTable() == "view_lab_services_auth") {
			if ($this->Vid->getSessionValue() != "")
				$detailFilter .= "`Vid`=" . QuotedValue($this->Vid->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
		}
		return $detailFilter;
	}

	// Master filter
	public function sqlMasterFilter_view_lab_services_auth()
	{
		return "`id`=@id@";
	}

	// Detail filter
	public function sqlDetailFilter_view_lab_services_auth()
	{
		return "`Vid`=@Vid@";
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_lab_resultreleased_auth`";
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
		return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : "";
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
			if (array_key_exists('id', $rs))
				AddFilter($where, QuotedName('id', $this->Dbid) . '=' . QuotedValue($rs['id'], $this->id->DataType, $this->Dbid));
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
		$this->Pic1->Upload->DbValue = $row['Pic1'];
		$this->Pic2->Upload->DbValue = $row['Pic2'];
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
		$this->HospID->DbValue = $row['HospID'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
		$oldFiles = EmptyValue($row['Pic1']) ? [] : [$row['Pic1']];
		foreach ($oldFiles as $oldFile) {
			if (file_exists($this->Pic1->oldPhysicalUploadPath() . $oldFile))
				@unlink($this->Pic1->oldPhysicalUploadPath() . $oldFile);
		}
		$oldFiles = EmptyValue($row['Pic2']) ? [] : [$row['Pic2']];
		foreach ($oldFiles as $oldFile) {
			if (file_exists($this->Pic2->oldPhysicalUploadPath() . $oldFile))
				@unlink($this->Pic2->oldPhysicalUploadPath() . $oldFile);
		}
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
		if (is_array($row))
			$val = array_key_exists('id', $row) ? $row['id'] : NULL;
		else
			$val = $this->id->OldValue !== NULL ? $this->id->OldValue : $this->id->CurrentValue;
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
		$name = PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL");

		// Get referer URL automatically
		if (ServerVar("HTTP_REFERER") != "" && ReferPageName() != CurrentPageName() && ReferPageName() != "login.php") // Referer not same page or login page
			$_SESSION[$name] = ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] != "") {
			return $_SESSION[$name];
		} else {
			return "view_lab_resultreleased_authlist.php";
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
		if ($pageName == "view_lab_resultreleased_authview.php")
			return $Language->phrase("View");
		elseif ($pageName == "view_lab_resultreleased_authedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "view_lab_resultreleased_authadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "view_lab_resultreleased_authlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("view_lab_resultreleased_authview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_lab_resultreleased_authview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "view_lab_resultreleased_authadd.php?" . $this->getUrlParm($parm);
		else
			$url = "view_lab_resultreleased_authadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("view_lab_resultreleased_authedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("view_lab_resultreleased_authadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("view_lab_resultreleased_authdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		if ($this->getCurrentMasterTable() == "view_lab_services_auth" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
			$url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
			$url .= "&fk_id=" . urlencode($this->Vid->CurrentValue);
		}
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
		if ($parm != "")
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
		$ar = [];
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
	public function getFilterFromRecordKeys($setCurrent = TRUE)
	{
		$arKeys = $this->getRecordKeys();
		$keyFilter = "";
		foreach ($arKeys as $key) {
			if ($keyFilter != "") $keyFilter .= " OR ";
			if ($setCurrent)
				$this->id->CurrentValue = $key;
			else
				$this->id->OldValue = $key;
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
		$this->Pic1->Upload->DbValue = $rs->fields('Pic1');
		$this->Pic2->Upload->DbValue = $rs->fields('Pic2');
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
		$this->HospID->setDbValue($rs->fields('HospID'));
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
		// HospID
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
		if (strval($this->Resulted->CurrentValue) != "") {
			$this->Resulted->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->Resulted->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->Resulted->ViewValue->add($this->Resulted->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->Resulted->ViewValue = NULL;
		}
		$this->Resulted->ViewCustomAttributes = "";

		// Services
		$this->Services->ViewValue = $this->Services->CurrentValue;
		$this->Services->ViewCustomAttributes = "";

		// LabReport
		$this->LabReport->ViewValue = $this->LabReport->CurrentValue;
		$this->LabReport->ViewCustomAttributes = "";

		// Pic1
		if (!EmptyValue($this->Pic1->Upload->DbValue)) {
			$this->Pic1->ViewValue = $this->Pic1->Upload->DbValue;
		} else {
			$this->Pic1->ViewValue = "";
		}
		$this->Pic1->ViewCustomAttributes = "";

		// Pic2
		if (!EmptyValue($this->Pic2->Upload->DbValue)) {
			$this->Pic2->ViewValue = $this->Pic2->Upload->DbValue;
		} else {
			$this->Pic2->ViewValue = "";
		}
		$this->Pic2->ViewCustomAttributes = "";

		// TestUnit
		$this->TestUnit->ViewValue = $this->TestUnit->CurrentValue;
		$curVal = strval($this->TestUnit->CurrentValue);
		if ($curVal != "") {
			$this->TestUnit->ViewValue = $this->TestUnit->lookupCacheOption($curVal);
			if ($this->TestUnit->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Code`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->TestUnit->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->TestUnit->ViewValue = $this->TestUnit->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->TestUnit->ViewValue = $this->TestUnit->CurrentValue;
				}
			}
		} else {
			$this->TestUnit->ViewValue = NULL;
		}
		$this->TestUnit->ViewCustomAttributes = "";

		// RefValue
		$this->RefValue->ViewValue = $this->RefValue->CurrentValue;
		$this->RefValue->ViewCustomAttributes = "";

		// Order
		$this->Order->ViewValue = $this->Order->CurrentValue;
		$this->Order->ViewValue = FormatNumber($this->Order->ViewValue, 2, -2, -2, -2);
		$this->Order->ViewCustomAttributes = "";

		// Repeated
		if (strval($this->Repeated->CurrentValue) != "") {
			$this->Repeated->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->Repeated->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->Repeated->ViewValue->add($this->Repeated->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->Repeated->ViewValue = NULL;
		}
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

		// HospID
		$this->HospID->ViewValue = $this->HospID->CurrentValue;
		$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
		$this->HospID->ViewCustomAttributes = "";

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
		$this->Pic1->ExportHrefValue = $this->Pic1->UploadPath . $this->Pic1->Upload->DbValue;
		$this->Pic1->TooltipValue = "";

		// Pic2
		$this->Pic2->LinkCustomAttributes = "";
		$this->Pic2->HrefValue = "";
		$this->Pic2->ExportHrefValue = $this->Pic2->UploadPath . $this->Pic2->Upload->DbValue;
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
		if (!$this->PatientName->Raw)
			$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
		$this->PatientName->EditValue = $this->PatientName->CurrentValue;
		$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

		// Age
		$this->Age->EditAttrs["class"] = "form-control";
		$this->Age->EditCustomAttributes = "";
		if (!$this->Age->Raw)
			$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
		$this->Age->EditValue = $this->Age->CurrentValue;
		$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

		// Gender
		$this->Gender->EditAttrs["class"] = "form-control";
		$this->Gender->EditCustomAttributes = "";
		if (!$this->Gender->Raw)
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
		if (!$this->ItemCode->Raw)
			$this->ItemCode->CurrentValue = HtmlDecode($this->ItemCode->CurrentValue);
		$this->ItemCode->EditValue = $this->ItemCode->CurrentValue;
		$this->ItemCode->PlaceHolder = RemoveHtml($this->ItemCode->caption());

		// DEptCd
		$this->DEptCd->EditAttrs["class"] = "form-control";
		$this->DEptCd->EditCustomAttributes = "";
		if (!$this->DEptCd->Raw)
			$this->DEptCd->CurrentValue = HtmlDecode($this->DEptCd->CurrentValue);
		$this->DEptCd->EditValue = $this->DEptCd->CurrentValue;
		$this->DEptCd->PlaceHolder = RemoveHtml($this->DEptCd->caption());

		// Resulted
		$this->Resulted->EditCustomAttributes = "";
		$this->Resulted->EditValue = $this->Resulted->options(FALSE);

		// Services
		$this->Services->EditAttrs["class"] = "form-control";
		$this->Services->EditCustomAttributes = "";
		if (!$this->Services->Raw)
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
		if (!EmptyValue($this->Pic1->Upload->DbValue)) {
			$this->Pic1->EditValue = $this->Pic1->Upload->DbValue;
		} else {
			$this->Pic1->EditValue = "";
		}
		if (!EmptyValue($this->Pic1->CurrentValue))
				$this->Pic1->Upload->FileName = $this->Pic1->CurrentValue;

		// Pic2
		$this->Pic2->EditAttrs["class"] = "form-control";
		$this->Pic2->EditCustomAttributes = "";
		if (!EmptyValue($this->Pic2->Upload->DbValue)) {
			$this->Pic2->EditValue = $this->Pic2->Upload->DbValue;
		} else {
			$this->Pic2->EditValue = "";
		}
		if (!EmptyValue($this->Pic2->CurrentValue))
				$this->Pic2->Upload->FileName = $this->Pic2->CurrentValue;

		// TestUnit
		$this->TestUnit->EditAttrs["class"] = "form-control";
		$this->TestUnit->EditCustomAttributes = "";
		if (!$this->TestUnit->Raw)
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
		if (strval($this->Order->EditValue) != "" && is_numeric($this->Order->EditValue))
			$this->Order->EditValue = FormatNumber($this->Order->EditValue, -2, -2, -2, -2);
		

		// Repeated
		$this->Repeated->EditCustomAttributes = "";
		$this->Repeated->EditValue = $this->Repeated->options(FALSE);

		// Vid
		$this->Vid->EditAttrs["class"] = "form-control";
		$this->Vid->EditCustomAttributes = "";
		if ($this->Vid->getSessionValue() != "") {
			$this->Vid->CurrentValue = $this->Vid->getSessionValue();
			$this->Vid->ViewValue = $this->Vid->CurrentValue;
			$this->Vid->ViewValue = FormatNumber($this->Vid->ViewValue, 0, -2, -2, -2);
			$this->Vid->ViewCustomAttributes = "";
		} else {
			$this->Vid->EditValue = $this->Vid->CurrentValue;
			$this->Vid->PlaceHolder = RemoveHtml($this->Vid->caption());
		}

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
		if (!$this->DrCODE->Raw)
			$this->DrCODE->CurrentValue = HtmlDecode($this->DrCODE->CurrentValue);
		$this->DrCODE->EditValue = $this->DrCODE->CurrentValue;
		$this->DrCODE->PlaceHolder = RemoveHtml($this->DrCODE->caption());

		// DrName
		$this->DrName->EditAttrs["class"] = "form-control";
		$this->DrName->EditCustomAttributes = "";
		if (!$this->DrName->Raw)
			$this->DrName->CurrentValue = HtmlDecode($this->DrName->CurrentValue);
		$this->DrName->EditValue = $this->DrName->CurrentValue;
		$this->DrName->PlaceHolder = RemoveHtml($this->DrName->caption());

		// Department
		$this->Department->EditAttrs["class"] = "form-control";
		$this->Department->EditCustomAttributes = "";
		if (!$this->Department->Raw)
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
		if (!$this->TestType->Raw)
			$this->TestType->CurrentValue = HtmlDecode($this->TestType->CurrentValue);
		$this->TestType->EditValue = $this->TestType->CurrentValue;
		$this->TestType->PlaceHolder = RemoveHtml($this->TestType->caption());

		// ResultDate
		// ResultedBy
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
					$doc->exportCaption($this->HospID);
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
						$doc->exportField($this->HospID);
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

	// Get file data
	public function getFileData($fldparm, $key, $resize, $width = 0, $height = 0)
	{
		$width = ($width > 0) ? $width : Config("THUMBNAIL_DEFAULT_WIDTH");
		$height = ($height > 0) ? $height : Config("THUMBNAIL_DEFAULT_HEIGHT");

		// Set up field name / file name field / file type field
		$fldName = "";
		$fileNameFld = "";
		$fileTypeFld = "";
		if ($fldparm == 'Pic1') {
			$fldName = "Pic1";
			$fileNameFld = "Pic1";
		} elseif ($fldparm == 'Pic2') {
			$fldName = "Pic2";
			$fileNameFld = "Pic2";
		} else {
			return FALSE; // Incorrect field
		}

		// Set up key values
		$ar = explode(Config("COMPOSITE_KEY_SEPARATOR"), $key);
		if (count($ar) == 1) {
			$this->id->CurrentValue = $ar[0];
		} else {
			return FALSE; // Incorrect key
		}

		// Set up filter (WHERE Clause)
		$filter = $this->getRecordFilter();
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = $this->getConnection();
		$dbtype = GetConnectionType($this->Dbid);
		if (($rs = $conn->execute($sql)) && !$rs->EOF) {
			$val = $rs->fields($fldName);
			if (!EmptyValue($val)) {
				$fld = $this->fields[$fldName];

				// Binary data
				if ($fld->DataType == DATATYPE_BLOB) {
					if ($dbtype != "MYSQL") {
						if (is_array($val) || is_object($val)) // Byte array
							$val = BytesToString($val);
					}
					if ($resize)
						ResizeBinary($val, $width, $height);

					// Write file type
					if ($fileTypeFld != "" && !EmptyValue($rs->fields($fileTypeFld))) {
						AddHeader("Content-type", $rs->fields($fileTypeFld));
					} else {
						AddHeader("Content-type", ContentType($val));
					}

					// Write file name
					$downloadPdf = !Config("EMBED_PDF") && Config("DOWNLOAD_PDF_FILE");
					if ($fileNameFld != "" && !EmptyValue($rs->fields($fileNameFld))) {
						$fileName = $rs->fields($fileNameFld);
						$pathinfo = pathinfo($fileName);
						$ext = strtolower(@$pathinfo["extension"]);
						$isPdf = SameText($ext, "pdf");
						if ($downloadPdf || !$isPdf) // Skip header if not download PDF
							AddHeader("Content-Disposition", "attachment; filename=\"" . $fileName . "\"");
					} else {
						$ext = ContentExtension($val);
						$isPdf = SameText($ext, ".pdf");
						if ($isPdf && $downloadPdf) // Add header if download PDF
							AddHeader("Content-Disposition", "attachment; filename=\"" . $fileName . "\"");
					}

					// Write file data
					if (StartsString("PK", $val) && ContainsString($val, "[Content_Types].xml") &&
						ContainsString($val, "_rels") && ContainsString($val, "docProps")) { // Fix Office 2007 documents
						if (!EndsString("\0\0\0", $val)) // Not ends with 3 or 4 \0
							$val .= "\0\0\0\0";
					}

					// Clear any debug message
					if (ob_get_length())
						ob_end_clean();

					// Write binary data
					Write($val);

				// Upload to folder
				} else {
					if ($fld->UploadMultiple)
						$files = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $val);
					else
						$files = [$val];
					$data = [];
					$ar = [];
					foreach ($files as $file) {
						if (!EmptyValue($file))
							$ar[$file] = FullUrl($fld->hrefPath() . $file);
					}
					$data[$fld->Param] = $ar;
					WriteJson($data);
				}
			}
			$rs->close();
			return TRUE;
		}
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