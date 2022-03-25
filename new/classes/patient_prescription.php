<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for patient_prescription
 */
class patient_prescription extends DbTable
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
	public $Reception;
	public $PatientId;
	public $PatientName;
	public $Medicine;
	public $M;
	public $A;
	public $N;
	public $NoOfDays;
	public $PreRoute;
	public $TimeOfTaking;
	public $Type;
	public $mrnno;
	public $Age;
	public $Gender;
	public $profilePic;
	public $Status;
	public $CreatedBy;
	public $CreateDateTime;
	public $ModifiedBy;
	public $ModifiedDateTime;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'patient_prescription';
		$this->TableName = 'patient_prescription';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`patient_prescription`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_DEFAULT; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = TRUE; // Allow detail add
		$this->DetailEdit = TRUE; // Allow detail edit
		$this->DetailView = TRUE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = Config("DEFAULT_USER_ID_ALLOW_SECURITY"); // Default User ID allowed permissions
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// id
		$this->id = new DbField('patient_prescription', 'patient_prescription', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// Reception
		$this->Reception = new DbField('patient_prescription', 'patient_prescription', 'x_Reception', 'Reception', '`Reception`', '`Reception`', 3, 11, -1, FALSE, '`Reception`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Reception->IsForeignKey = TRUE; // Foreign key field
		$this->Reception->Nullable = FALSE; // NOT NULL field
		$this->Reception->Required = TRUE; // Required field
		$this->Reception->Sortable = TRUE; // Allow sort
		$this->Reception->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Reception'] = &$this->Reception;

		// PatientId
		$this->PatientId = new DbField('patient_prescription', 'patient_prescription', 'x_PatientId', 'PatientId', '`PatientId`', '`PatientId`', 3, 11, -1, FALSE, '`PatientId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientId->IsForeignKey = TRUE; // Foreign key field
		$this->PatientId->Nullable = FALSE; // NOT NULL field
		$this->PatientId->Required = TRUE; // Required field
		$this->PatientId->Sortable = TRUE; // Allow sort
		$this->PatientId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['PatientId'] = &$this->PatientId;

		// PatientName
		$this->PatientName = new DbField('patient_prescription', 'patient_prescription', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, FALSE, '`PatientName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientName->Sortable = TRUE; // Allow sort
		$this->fields['PatientName'] = &$this->PatientName;

		// Medicine
		$this->Medicine = new DbField('patient_prescription', 'patient_prescription', 'x_Medicine', 'Medicine', '`Medicine`', '`Medicine`', 200, 100, -1, FALSE, '`Medicine`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Medicine->Sortable = TRUE; // Allow sort
		$this->Medicine->Lookup = new Lookup('Medicine', 'pres_tradenames_new', FALSE, 'Trade_Name', ["Trade_Name","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Medicine'] = &$this->Medicine;

		// M
		$this->M = new DbField('patient_prescription', 'patient_prescription', 'x_M', 'M', '`M`', '`M`', 200, 45, -1, FALSE, '`M`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->M->Sortable = TRUE; // Allow sort
		$this->fields['M'] = &$this->M;

		// A
		$this->A = new DbField('patient_prescription', 'patient_prescription', 'x_A', 'A', '`A`', '`A`', 200, 45, -1, FALSE, '`A`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->A->Sortable = TRUE; // Allow sort
		$this->fields['A'] = &$this->A;

		// N
		$this->N = new DbField('patient_prescription', 'patient_prescription', 'x_N', 'N', '`N`', '`N`', 200, 45, -1, FALSE, '`N`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->N->Sortable = TRUE; // Allow sort
		$this->fields['N'] = &$this->N;

		// NoOfDays
		$this->NoOfDays = new DbField('patient_prescription', 'patient_prescription', 'x_NoOfDays', 'NoOfDays', '`NoOfDays`', '`NoOfDays`', 200, 45, -1, FALSE, '`NoOfDays`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NoOfDays->Sortable = TRUE; // Allow sort
		$this->fields['NoOfDays'] = &$this->NoOfDays;

		// PreRoute
		$this->PreRoute = new DbField('patient_prescription', 'patient_prescription', 'x_PreRoute', 'PreRoute', '`PreRoute`', '`PreRoute`', 200, 45, -1, FALSE, '`EV__PreRoute`', TRUE, FALSE, TRUE, 'FORMATTED TEXT', 'TEXT');
		$this->PreRoute->Sortable = TRUE; // Allow sort
		$this->PreRoute->Lookup = new Lookup('PreRoute', 'pres_mas_route', FALSE, 'Route', ["Route","","",""], [], [], [], [], [], [], '', '');
		$this->fields['PreRoute'] = &$this->PreRoute;

		// TimeOfTaking
		$this->TimeOfTaking = new DbField('patient_prescription', 'patient_prescription', 'x_TimeOfTaking', 'TimeOfTaking', '`TimeOfTaking`', '`TimeOfTaking`', 200, 45, -1, FALSE, '`EV__TimeOfTaking`', TRUE, FALSE, TRUE, 'FORMATTED TEXT', 'TEXT');
		$this->TimeOfTaking->Sortable = TRUE; // Allow sort
		$this->TimeOfTaking->Lookup = new Lookup('TimeOfTaking', 'pres_mas_timeoftaking', FALSE, 'Time Of Taking', ["Time Of Taking","","",""], [], [], [], [], [], [], '', '');
		$this->fields['TimeOfTaking'] = &$this->TimeOfTaking;

		// Type
		$this->Type = new DbField('patient_prescription', 'patient_prescription', 'x_Type', 'Type', '`Type`', '`Type`', 200, 45, -1, FALSE, '`Type`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Type->Sortable = TRUE; // Allow sort
		$this->Type->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Type->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Type->Lookup = new Lookup('Type', 'patient_prescription', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Type->OptionCount = 4;
		$this->fields['Type'] = &$this->Type;

		// mrnno
		$this->mrnno = new DbField('patient_prescription', 'patient_prescription', 'x_mrnno', 'mrnno', '`mrnno`', '`mrnno`', 200, 45, -1, FALSE, '`mrnno`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mrnno->IsForeignKey = TRUE; // Foreign key field
		$this->mrnno->Sortable = TRUE; // Allow sort
		$this->fields['mrnno'] = &$this->mrnno;

		// Age
		$this->Age = new DbField('patient_prescription', 'patient_prescription', 'x_Age', 'Age', '`Age`', '`Age`', 200, 45, -1, FALSE, '`Age`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Age->Sortable = TRUE; // Allow sort
		$this->fields['Age'] = &$this->Age;

		// Gender
		$this->Gender = new DbField('patient_prescription', 'patient_prescription', 'x_Gender', 'Gender', '`Gender`', '`Gender`', 200, 45, -1, FALSE, '`Gender`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Gender->Sortable = TRUE; // Allow sort
		$this->fields['Gender'] = &$this->Gender;

		// profilePic
		$this->profilePic = new DbField('patient_prescription', 'patient_prescription', 'x_profilePic', 'profilePic', '`profilePic`', '`profilePic`', 201, 450, -1, FALSE, '`profilePic`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->profilePic->Sortable = TRUE; // Allow sort
		$this->fields['profilePic'] = &$this->profilePic;

		// Status
		$this->Status = new DbField('patient_prescription', 'patient_prescription', 'x_Status', 'Status', '`Status`', '`Status`', 200, 45, -1, FALSE, '`Status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Status->Sortable = TRUE; // Allow sort
		$this->Status->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Status->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Status->Lookup = new Lookup('Status', 'pres_mas_status', FALSE, 'Status', ["Status","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Status'] = &$this->Status;

		// CreatedBy
		$this->CreatedBy = new DbField('patient_prescription', 'patient_prescription', 'x_CreatedBy', 'CreatedBy', '`CreatedBy`', '`CreatedBy`', 200, 45, -1, FALSE, '`CreatedBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CreatedBy->Sortable = TRUE; // Allow sort
		$this->fields['CreatedBy'] = &$this->CreatedBy;

		// CreateDateTime
		$this->CreateDateTime = new DbField('patient_prescription', 'patient_prescription', 'x_CreateDateTime', 'CreateDateTime', '`CreateDateTime`', '`CreateDateTime`', 200, 45, -1, FALSE, '`CreateDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CreateDateTime->Sortable = TRUE; // Allow sort
		$this->fields['CreateDateTime'] = &$this->CreateDateTime;

		// ModifiedBy
		$this->ModifiedBy = new DbField('patient_prescription', 'patient_prescription', 'x_ModifiedBy', 'ModifiedBy', '`ModifiedBy`', '`ModifiedBy`', 200, 45, -1, FALSE, '`ModifiedBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ModifiedBy->Sortable = TRUE; // Allow sort
		$this->fields['ModifiedBy'] = &$this->ModifiedBy;

		// ModifiedDateTime
		$this->ModifiedDateTime = new DbField('patient_prescription', 'patient_prescription', 'x_ModifiedDateTime', 'ModifiedDateTime', '`ModifiedDateTime`', '`ModifiedDateTime`', 200, 45, -1, FALSE, '`ModifiedDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ModifiedDateTime->Sortable = TRUE; // Allow sort
		$this->fields['ModifiedDateTime'] = &$this->ModifiedDateTime;
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
			$sortFieldList = ($fld->VirtualExpression != "") ? $fld->VirtualExpression : $sortField;
			$this->setSessionOrderByList($sortFieldList . " " . $thisSort); // Save to Session
		} else {
			$fld->setSort("");
		}
	}

	// Session ORDER BY for List page
	public function getSessionOrderByList()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_ORDER_BY_LIST")];
	}
	public function setSessionOrderByList($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_ORDER_BY_LIST")] = $v;
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
		if ($this->getCurrentMasterTable() == "ip_admission") {
			if ($this->Reception->getSessionValue() != "")
				$masterFilter .= "`id`=" . QuotedValue($this->Reception->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->PatientId->getSessionValue() != "")
				$masterFilter .= " AND `patient_id`=" . QuotedValue($this->PatientId->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->mrnno->getSessionValue() != "")
				$masterFilter .= " AND `mrnNo`=" . QuotedValue($this->mrnno->getSessionValue(), DATATYPE_STRING, "DB");
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
		if ($this->getCurrentMasterTable() == "ip_admission") {
			if ($this->Reception->getSessionValue() != "")
				$detailFilter .= "`Reception`=" . QuotedValue($this->Reception->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->PatientId->getSessionValue() != "")
				$detailFilter .= " AND `PatientId`=" . QuotedValue($this->PatientId->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->mrnno->getSessionValue() != "")
				$detailFilter .= " AND `mrnno`=" . QuotedValue($this->mrnno->getSessionValue(), DATATYPE_STRING, "DB");
			else
				return "";
		}
		return $detailFilter;
	}

	// Master filter
	public function sqlMasterFilter_ip_admission()
	{
		return "`id`=@id@ AND `patient_id`=@patient_id@ AND `mrnNo`='@mrnNo@'";
	}

	// Detail filter
	public function sqlDetailFilter_ip_admission()
	{
		return "`Reception`=@Reception@ AND `PatientId`=@PatientId@ AND `mrnno`='@mrnno@'";
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`patient_prescription`";
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
	public function getSqlSelectList() // Select for List page
	{
		$select = "";
		$select = "SELECT * FROM (" .
			"SELECT *, (SELECT `Route` FROM `pres_mas_route` `TMP_LOOKUPTABLE` WHERE `TMP_LOOKUPTABLE`.`Route` = `patient_prescription`.`PreRoute` LIMIT 1) AS `EV__PreRoute`, (SELECT `Time Of Taking` FROM `pres_mas_timeoftaking` `TMP_LOOKUPTABLE` WHERE `TMP_LOOKUPTABLE`.`Time Of Taking` = `patient_prescription`.`TimeOfTaking` LIMIT 1) AS `EV__TimeOfTaking` FROM `patient_prescription`" .
			") `TMP_TABLE`";
		return ($this->SqlSelectList != "") ? $this->SqlSelectList : $select;
	}
	public function sqlSelectList() // For backward compatibility
	{
		return $this->getSqlSelectList();
	}
	public function setSqlSelectList($v)
	{
		$this->SqlSelectList = $v;
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
		return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : "`id` DESC";
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
		if ($this->useVirtualFields()) {
			$select = $this->getSqlSelectList();
			$sort = $this->UseSessionForListSql ? $this->getSessionOrderByList() : "";
		} else {
			$select = $this->getSqlSelect();
			$sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
		}
		return BuildSelectSql($select, $this->getSqlWhere(), $this->getSqlGroupBy(),
			$this->getSqlHaving(), $this->getSqlOrderBy(), $filter, $sort);
	}

	// Get ORDER BY clause
	public function getOrderBy()
	{
		$sort = ($this->useVirtualFields()) ? $this->getSessionOrderByList() : $this->getSessionOrderBy();
		return BuildSelectSql("", "", "", "", $this->getSqlOrderBy(), "", $sort);
	}

	// Check if virtual fields is used in SQL
	protected function useVirtualFields()
	{
		$where = $this->UseSessionForListSql ? $this->getSessionWhere() : $this->CurrentFilter;
		$orderBy = $this->UseSessionForListSql ? $this->getSessionOrderByList() : "";
		if ($where != "")
			$where = " " . str_replace(["(", ")"], ["", ""], $where) . " ";
		if ($orderBy != "")
			$orderBy = " " . str_replace(["(", ")"], ["", ""], $orderBy) . " ";
		if ($this->BasicSearch->getKeyword() != "")
			return TRUE;
		if ($this->PreRoute->AdvancedSearch->SearchValue != "" ||
			$this->PreRoute->AdvancedSearch->SearchValue2 != "" ||
			ContainsString($where, " " . $this->PreRoute->VirtualExpression . " "))
			return TRUE;
		if (ContainsString($orderBy, " " . $this->PreRoute->VirtualExpression . " "))
			return TRUE;
		if ($this->TimeOfTaking->AdvancedSearch->SearchValue != "" ||
			$this->TimeOfTaking->AdvancedSearch->SearchValue2 != "" ||
			ContainsString($where, " " . $this->TimeOfTaking->VirtualExpression . " "))
			return TRUE;
		if (ContainsString($orderBy, " " . $this->TimeOfTaking->VirtualExpression . " "))
			return TRUE;
		return FALSE;
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
		if ($this->useVirtualFields())
			$sql = BuildSelectSql($this->getSqlSelectList(), $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
		else
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
		$this->Reception->DbValue = $row['Reception'];
		$this->PatientId->DbValue = $row['PatientId'];
		$this->PatientName->DbValue = $row['PatientName'];
		$this->Medicine->DbValue = $row['Medicine'];
		$this->M->DbValue = $row['M'];
		$this->A->DbValue = $row['A'];
		$this->N->DbValue = $row['N'];
		$this->NoOfDays->DbValue = $row['NoOfDays'];
		$this->PreRoute->DbValue = $row['PreRoute'];
		$this->TimeOfTaking->DbValue = $row['TimeOfTaking'];
		$this->Type->DbValue = $row['Type'];
		$this->mrnno->DbValue = $row['mrnno'];
		$this->Age->DbValue = $row['Age'];
		$this->Gender->DbValue = $row['Gender'];
		$this->profilePic->DbValue = $row['profilePic'];
		$this->Status->DbValue = $row['Status'];
		$this->CreatedBy->DbValue = $row['CreatedBy'];
		$this->CreateDateTime->DbValue = $row['CreateDateTime'];
		$this->ModifiedBy->DbValue = $row['ModifiedBy'];
		$this->ModifiedDateTime->DbValue = $row['ModifiedDateTime'];
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
			return "patient_prescriptionlist.php";
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
		if ($pageName == "patient_prescriptionview.php")
			return $Language->phrase("View");
		elseif ($pageName == "patient_prescriptionedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "patient_prescriptionadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "patient_prescriptionlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("patient_prescriptionview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("patient_prescriptionview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "patient_prescriptionadd.php?" . $this->getUrlParm($parm);
		else
			$url = "patient_prescriptionadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("patient_prescriptionedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("patient_prescriptionadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("patient_prescriptiondelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		if ($this->getCurrentMasterTable() == "ip_admission" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
			$url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
			$url .= "&fk_id=" . urlencode($this->Reception->CurrentValue);
			$url .= "&fk_patient_id=" . urlencode($this->PatientId->CurrentValue);
			$url .= "&fk_mrnNo=" . urlencode($this->mrnno->CurrentValue);
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
		$this->Reception->setDbValue($rs->fields('Reception'));
		$this->PatientId->setDbValue($rs->fields('PatientId'));
		$this->PatientName->setDbValue($rs->fields('PatientName'));
		$this->Medicine->setDbValue($rs->fields('Medicine'));
		$this->M->setDbValue($rs->fields('M'));
		$this->A->setDbValue($rs->fields('A'));
		$this->N->setDbValue($rs->fields('N'));
		$this->NoOfDays->setDbValue($rs->fields('NoOfDays'));
		$this->PreRoute->setDbValue($rs->fields('PreRoute'));
		$this->TimeOfTaking->setDbValue($rs->fields('TimeOfTaking'));
		$this->Type->setDbValue($rs->fields('Type'));
		$this->mrnno->setDbValue($rs->fields('mrnno'));
		$this->Age->setDbValue($rs->fields('Age'));
		$this->Gender->setDbValue($rs->fields('Gender'));
		$this->profilePic->setDbValue($rs->fields('profilePic'));
		$this->Status->setDbValue($rs->fields('Status'));
		$this->CreatedBy->setDbValue($rs->fields('CreatedBy'));
		$this->CreateDateTime->setDbValue($rs->fields('CreateDateTime'));
		$this->ModifiedBy->setDbValue($rs->fields('ModifiedBy'));
		$this->ModifiedDateTime->setDbValue($rs->fields('ModifiedDateTime'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// Reception
		// PatientId
		// PatientName
		// Medicine

		$this->Medicine->CellCssStyle = "width: 20px;";

		// M
		// A
		// N
		// NoOfDays
		// PreRoute
		// TimeOfTaking
		// Type

		$this->Type->CellCssStyle = "width: 12px;";

		// mrnno
		// Age
		// Gender
		// profilePic
		// Status
		// CreatedBy
		// CreateDateTime
		// ModifiedBy
		// ModifiedDateTime
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// Reception
		$this->Reception->ViewValue = $this->Reception->CurrentValue;
		$this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
		$this->Reception->ViewCustomAttributes = "";

		// PatientId
		$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
		$this->PatientId->ViewValue = FormatNumber($this->PatientId->ViewValue, 0, -2, -2, -2);
		$this->PatientId->ViewCustomAttributes = "";

		// PatientName
		$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
		$this->PatientName->ViewCustomAttributes = "";

		// Medicine
		$this->Medicine->ViewValue = $this->Medicine->CurrentValue;
		$curVal = strval($this->Medicine->CurrentValue);
		if ($curVal != "") {
			$this->Medicine->ViewValue = $this->Medicine->lookupCacheOption($curVal);
			if ($this->Medicine->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Trade_Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->Medicine->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->Medicine->ViewValue = $this->Medicine->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Medicine->ViewValue = $this->Medicine->CurrentValue;
				}
			}
		} else {
			$this->Medicine->ViewValue = NULL;
		}
		$this->Medicine->ViewCustomAttributes = "";

		// M
		$this->M->ViewValue = $this->M->CurrentValue;
		$this->M->ViewCustomAttributes = "";

		// A
		$this->A->ViewValue = $this->A->CurrentValue;
		$this->A->ViewCustomAttributes = "";

		// N
		$this->N->ViewValue = $this->N->CurrentValue;
		$this->N->ViewCustomAttributes = "";

		// NoOfDays
		$this->NoOfDays->ViewValue = $this->NoOfDays->CurrentValue;
		$this->NoOfDays->ViewCustomAttributes = "";

		// PreRoute
		if ($this->PreRoute->VirtualValue != "") {
			$this->PreRoute->ViewValue = $this->PreRoute->VirtualValue;
		} else {
			$this->PreRoute->ViewValue = $this->PreRoute->CurrentValue;
			$curVal = strval($this->PreRoute->CurrentValue);
			if ($curVal != "") {
				$this->PreRoute->ViewValue = $this->PreRoute->lookupCacheOption($curVal);
				if ($this->PreRoute->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Route`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->PreRoute->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->PreRoute->ViewValue = $this->PreRoute->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PreRoute->ViewValue = $this->PreRoute->CurrentValue;
					}
				}
			} else {
				$this->PreRoute->ViewValue = NULL;
			}
		}
		$this->PreRoute->ViewCustomAttributes = "";

		// TimeOfTaking
		if ($this->TimeOfTaking->VirtualValue != "") {
			$this->TimeOfTaking->ViewValue = $this->TimeOfTaking->VirtualValue;
		} else {
			$this->TimeOfTaking->ViewValue = $this->TimeOfTaking->CurrentValue;
			$curVal = strval($this->TimeOfTaking->CurrentValue);
			if ($curVal != "") {
				$this->TimeOfTaking->ViewValue = $this->TimeOfTaking->lookupCacheOption($curVal);
				if ($this->TimeOfTaking->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Time Of Taking`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->TimeOfTaking->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->TimeOfTaking->ViewValue = $this->TimeOfTaking->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TimeOfTaking->ViewValue = $this->TimeOfTaking->CurrentValue;
					}
				}
			} else {
				$this->TimeOfTaking->ViewValue = NULL;
			}
		}
		$this->TimeOfTaking->ViewCustomAttributes = "";

		// Type
		if (strval($this->Type->CurrentValue) != "") {
			$this->Type->ViewValue = $this->Type->optionCaption($this->Type->CurrentValue);
		} else {
			$this->Type->ViewValue = NULL;
		}
		$this->Type->ViewCustomAttributes = "";

		// mrnno
		$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
		$this->mrnno->ViewCustomAttributes = "";

		// Age
		$this->Age->ViewValue = $this->Age->CurrentValue;
		$this->Age->ViewCustomAttributes = "";

		// Gender
		$this->Gender->ViewValue = $this->Gender->CurrentValue;
		$this->Gender->ViewCustomAttributes = "";

		// profilePic
		$this->profilePic->ViewValue = $this->profilePic->CurrentValue;
		$this->profilePic->ViewCustomAttributes = "";

		// Status
		$curVal = strval($this->Status->CurrentValue);
		if ($curVal != "") {
			$this->Status->ViewValue = $this->Status->lookupCacheOption($curVal);
			if ($this->Status->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Status`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->Status->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->Status->ViewValue = $this->Status->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Status->ViewValue = $this->Status->CurrentValue;
				}
			}
		} else {
			$this->Status->ViewValue = NULL;
		}
		$this->Status->ViewCustomAttributes = "";

		// CreatedBy
		$this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
		$this->CreatedBy->ViewCustomAttributes = "";

		// CreateDateTime
		$this->CreateDateTime->ViewValue = $this->CreateDateTime->CurrentValue;
		$this->CreateDateTime->ViewCustomAttributes = "";

		// ModifiedBy
		$this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
		$this->ModifiedBy->ViewCustomAttributes = "";

		// ModifiedDateTime
		$this->ModifiedDateTime->ViewValue = $this->ModifiedDateTime->CurrentValue;
		$this->ModifiedDateTime->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// Reception
		$this->Reception->LinkCustomAttributes = "";
		$this->Reception->HrefValue = "";
		$this->Reception->TooltipValue = "";

		// PatientId
		$this->PatientId->LinkCustomAttributes = "";
		$this->PatientId->HrefValue = "";
		$this->PatientId->TooltipValue = "";

		// PatientName
		$this->PatientName->LinkCustomAttributes = "";
		$this->PatientName->HrefValue = "";
		$this->PatientName->TooltipValue = "";

		// Medicine
		$this->Medicine->LinkCustomAttributes = "";
		$this->Medicine->HrefValue = "";
		$this->Medicine->TooltipValue = "";

		// M
		$this->M->LinkCustomAttributes = "";
		$this->M->HrefValue = "";
		$this->M->TooltipValue = "";

		// A
		$this->A->LinkCustomAttributes = "";
		$this->A->HrefValue = "";
		$this->A->TooltipValue = "";

		// N
		$this->N->LinkCustomAttributes = "";
		$this->N->HrefValue = "";
		$this->N->TooltipValue = "";

		// NoOfDays
		$this->NoOfDays->LinkCustomAttributes = "";
		$this->NoOfDays->HrefValue = "";
		$this->NoOfDays->TooltipValue = "";

		// PreRoute
		$this->PreRoute->LinkCustomAttributes = "";
		$this->PreRoute->HrefValue = "";
		$this->PreRoute->TooltipValue = "";

		// TimeOfTaking
		$this->TimeOfTaking->LinkCustomAttributes = "";
		$this->TimeOfTaking->HrefValue = "";
		$this->TimeOfTaking->TooltipValue = "";

		// Type
		$this->Type->LinkCustomAttributes = "";
		$this->Type->HrefValue = "";
		$this->Type->TooltipValue = "";

		// mrnno
		$this->mrnno->LinkCustomAttributes = "";
		$this->mrnno->HrefValue = "";
		$this->mrnno->TooltipValue = "";

		// Age
		$this->Age->LinkCustomAttributes = "";
		$this->Age->HrefValue = "";
		$this->Age->TooltipValue = "";

		// Gender
		$this->Gender->LinkCustomAttributes = "";
		$this->Gender->HrefValue = "";
		$this->Gender->TooltipValue = "";

		// profilePic
		$this->profilePic->LinkCustomAttributes = "";
		$this->profilePic->HrefValue = "";
		$this->profilePic->TooltipValue = "";

		// Status
		$this->Status->LinkCustomAttributes = "";
		$this->Status->HrefValue = "";
		$this->Status->TooltipValue = "";

		// CreatedBy
		$this->CreatedBy->LinkCustomAttributes = "";
		$this->CreatedBy->HrefValue = "";
		$this->CreatedBy->TooltipValue = "";

		// CreateDateTime
		$this->CreateDateTime->LinkCustomAttributes = "";
		$this->CreateDateTime->HrefValue = "";
		$this->CreateDateTime->TooltipValue = "";

		// ModifiedBy
		$this->ModifiedBy->LinkCustomAttributes = "";
		$this->ModifiedBy->HrefValue = "";
		$this->ModifiedBy->TooltipValue = "";

		// ModifiedDateTime
		$this->ModifiedDateTime->LinkCustomAttributes = "";
		$this->ModifiedDateTime->HrefValue = "";
		$this->ModifiedDateTime->TooltipValue = "";

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

		// Reception
		$this->Reception->EditAttrs["class"] = "form-control";
		$this->Reception->EditCustomAttributes = "";
		$this->Reception->EditValue = $this->Reception->CurrentValue;
		$this->Reception->EditValue = FormatNumber($this->Reception->EditValue, 0, -2, -2, -2);
		$this->Reception->ViewCustomAttributes = "";

		// PatientId
		$this->PatientId->EditAttrs["class"] = "form-control";
		$this->PatientId->EditCustomAttributes = "";
		$this->PatientId->EditValue = $this->PatientId->CurrentValue;
		$this->PatientId->EditValue = FormatNumber($this->PatientId->EditValue, 0, -2, -2, -2);
		$this->PatientId->ViewCustomAttributes = "";

		// PatientName
		$this->PatientName->EditAttrs["class"] = "form-control";
		$this->PatientName->EditCustomAttributes = "";
		if (!$this->PatientName->Raw)
			$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
		$this->PatientName->EditValue = $this->PatientName->CurrentValue;
		$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

		// Medicine
		$this->Medicine->EditAttrs["class"] = "form-control";
		$this->Medicine->EditCustomAttributes = "";
		if (!$this->Medicine->Raw)
			$this->Medicine->CurrentValue = HtmlDecode($this->Medicine->CurrentValue);
		$this->Medicine->EditValue = $this->Medicine->CurrentValue;
		$this->Medicine->PlaceHolder = RemoveHtml($this->Medicine->caption());

		// M
		$this->M->EditAttrs["class"] = "form-control";
		$this->M->EditCustomAttributes = "";
		if (!$this->M->Raw)
			$this->M->CurrentValue = HtmlDecode($this->M->CurrentValue);
		$this->M->EditValue = $this->M->CurrentValue;
		$this->M->PlaceHolder = RemoveHtml($this->M->caption());

		// A
		$this->A->EditAttrs["class"] = "form-control";
		$this->A->EditCustomAttributes = "";
		if (!$this->A->Raw)
			$this->A->CurrentValue = HtmlDecode($this->A->CurrentValue);
		$this->A->EditValue = $this->A->CurrentValue;
		$this->A->PlaceHolder = RemoveHtml($this->A->caption());

		// N
		$this->N->EditAttrs["class"] = "form-control";
		$this->N->EditCustomAttributes = "";
		if (!$this->N->Raw)
			$this->N->CurrentValue = HtmlDecode($this->N->CurrentValue);
		$this->N->EditValue = $this->N->CurrentValue;
		$this->N->PlaceHolder = RemoveHtml($this->N->caption());

		// NoOfDays
		$this->NoOfDays->EditAttrs["class"] = "form-control";
		$this->NoOfDays->EditCustomAttributes = "";
		if (!$this->NoOfDays->Raw)
			$this->NoOfDays->CurrentValue = HtmlDecode($this->NoOfDays->CurrentValue);
		$this->NoOfDays->EditValue = $this->NoOfDays->CurrentValue;
		$this->NoOfDays->PlaceHolder = RemoveHtml($this->NoOfDays->caption());

		// PreRoute
		$this->PreRoute->EditAttrs["class"] = "form-control";
		$this->PreRoute->EditCustomAttributes = "";
		if (!$this->PreRoute->Raw)
			$this->PreRoute->CurrentValue = HtmlDecode($this->PreRoute->CurrentValue);
		$this->PreRoute->EditValue = $this->PreRoute->CurrentValue;
		$this->PreRoute->PlaceHolder = RemoveHtml($this->PreRoute->caption());

		// TimeOfTaking
		$this->TimeOfTaking->EditAttrs["class"] = "form-control";
		$this->TimeOfTaking->EditCustomAttributes = "";
		if (!$this->TimeOfTaking->Raw)
			$this->TimeOfTaking->CurrentValue = HtmlDecode($this->TimeOfTaking->CurrentValue);
		$this->TimeOfTaking->EditValue = $this->TimeOfTaking->CurrentValue;
		$this->TimeOfTaking->PlaceHolder = RemoveHtml($this->TimeOfTaking->caption());

		// Type
		$this->Type->EditAttrs["class"] = "form-control";
		$this->Type->EditCustomAttributes = "";
		$this->Type->EditValue = $this->Type->options(TRUE);

		// mrnno
		$this->mrnno->EditAttrs["class"] = "form-control";
		$this->mrnno->EditCustomAttributes = "";
		$this->mrnno->EditValue = $this->mrnno->CurrentValue;
		$this->mrnno->ViewCustomAttributes = "";

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

		// profilePic
		$this->profilePic->EditAttrs["class"] = "form-control";
		$this->profilePic->EditCustomAttributes = "";
		$this->profilePic->EditValue = $this->profilePic->CurrentValue;
		$this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

		// Status
		$this->Status->EditAttrs["class"] = "form-control";
		$this->Status->EditCustomAttributes = "";

		// CreatedBy
		$this->CreatedBy->EditAttrs["class"] = "form-control";
		$this->CreatedBy->EditCustomAttributes = "";
		if (!$this->CreatedBy->Raw)
			$this->CreatedBy->CurrentValue = HtmlDecode($this->CreatedBy->CurrentValue);
		$this->CreatedBy->EditValue = $this->CreatedBy->CurrentValue;
		$this->CreatedBy->PlaceHolder = RemoveHtml($this->CreatedBy->caption());

		// CreateDateTime
		$this->CreateDateTime->EditAttrs["class"] = "form-control";
		$this->CreateDateTime->EditCustomAttributes = "";
		if (!$this->CreateDateTime->Raw)
			$this->CreateDateTime->CurrentValue = HtmlDecode($this->CreateDateTime->CurrentValue);
		$this->CreateDateTime->EditValue = $this->CreateDateTime->CurrentValue;
		$this->CreateDateTime->PlaceHolder = RemoveHtml($this->CreateDateTime->caption());

		// ModifiedBy
		$this->ModifiedBy->EditAttrs["class"] = "form-control";
		$this->ModifiedBy->EditCustomAttributes = "";
		if (!$this->ModifiedBy->Raw)
			$this->ModifiedBy->CurrentValue = HtmlDecode($this->ModifiedBy->CurrentValue);
		$this->ModifiedBy->EditValue = $this->ModifiedBy->CurrentValue;
		$this->ModifiedBy->PlaceHolder = RemoveHtml($this->ModifiedBy->caption());

		// ModifiedDateTime
		$this->ModifiedDateTime->EditAttrs["class"] = "form-control";
		$this->ModifiedDateTime->EditCustomAttributes = "";
		if (!$this->ModifiedDateTime->Raw)
			$this->ModifiedDateTime->CurrentValue = HtmlDecode($this->ModifiedDateTime->CurrentValue);
		$this->ModifiedDateTime->EditValue = $this->ModifiedDateTime->CurrentValue;
		$this->ModifiedDateTime->PlaceHolder = RemoveHtml($this->ModifiedDateTime->caption());

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
					$doc->exportCaption($this->Reception);
					$doc->exportCaption($this->PatientId);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->Medicine);
					$doc->exportCaption($this->M);
					$doc->exportCaption($this->A);
					$doc->exportCaption($this->N);
					$doc->exportCaption($this->NoOfDays);
					$doc->exportCaption($this->PreRoute);
					$doc->exportCaption($this->TimeOfTaking);
					$doc->exportCaption($this->Type);
					$doc->exportCaption($this->mrnno);
					$doc->exportCaption($this->Age);
					$doc->exportCaption($this->Gender);
					$doc->exportCaption($this->profilePic);
					$doc->exportCaption($this->Status);
					$doc->exportCaption($this->CreatedBy);
					$doc->exportCaption($this->CreateDateTime);
					$doc->exportCaption($this->ModifiedBy);
					$doc->exportCaption($this->ModifiedDateTime);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->Reception);
					$doc->exportCaption($this->PatientId);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->Medicine);
					$doc->exportCaption($this->M);
					$doc->exportCaption($this->A);
					$doc->exportCaption($this->N);
					$doc->exportCaption($this->NoOfDays);
					$doc->exportCaption($this->PreRoute);
					$doc->exportCaption($this->TimeOfTaking);
					$doc->exportCaption($this->Type);
					$doc->exportCaption($this->mrnno);
					$doc->exportCaption($this->Age);
					$doc->exportCaption($this->Gender);
					$doc->exportCaption($this->profilePic);
					$doc->exportCaption($this->Status);
					$doc->exportCaption($this->CreatedBy);
					$doc->exportCaption($this->CreateDateTime);
					$doc->exportCaption($this->ModifiedBy);
					$doc->exportCaption($this->ModifiedDateTime);
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
						$doc->exportField($this->Reception);
						$doc->exportField($this->PatientId);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->Medicine);
						$doc->exportField($this->M);
						$doc->exportField($this->A);
						$doc->exportField($this->N);
						$doc->exportField($this->NoOfDays);
						$doc->exportField($this->PreRoute);
						$doc->exportField($this->TimeOfTaking);
						$doc->exportField($this->Type);
						$doc->exportField($this->mrnno);
						$doc->exportField($this->Age);
						$doc->exportField($this->Gender);
						$doc->exportField($this->profilePic);
						$doc->exportField($this->Status);
						$doc->exportField($this->CreatedBy);
						$doc->exportField($this->CreateDateTime);
						$doc->exportField($this->ModifiedBy);
						$doc->exportField($this->ModifiedDateTime);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->Reception);
						$doc->exportField($this->PatientId);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->Medicine);
						$doc->exportField($this->M);
						$doc->exportField($this->A);
						$doc->exportField($this->N);
						$doc->exportField($this->NoOfDays);
						$doc->exportField($this->PreRoute);
						$doc->exportField($this->TimeOfTaking);
						$doc->exportField($this->Type);
						$doc->exportField($this->mrnno);
						$doc->exportField($this->Age);
						$doc->exportField($this->Gender);
						$doc->exportField($this->profilePic);
						$doc->exportField($this->Status);
						$doc->exportField($this->CreatedBy);
						$doc->exportField($this->CreateDateTime);
						$doc->exportField($this->ModifiedBy);
						$doc->exportField($this->ModifiedDateTime);
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