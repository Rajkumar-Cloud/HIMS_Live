<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for patient_investigations
 */
class patient_investigations extends DbTable
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
	public $Investigation;
	public $Value;
	public $NormalRange;
	public $mrnno;
	public $Age;
	public $Gender;
	public $profilePic;
	public $SampleCollected;
	public $SampleCollectedBy;
	public $ResultedDate;
	public $ResultedBy;
	public $Modified;
	public $ModifiedBy;
	public $Created;
	public $CreatedBy;
	public $GroupHead;
	public $Cost;
	public $PaymentStatus;
	public $PayMode;
	public $VoucherNo;
	public $InvestigationMultiselect;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'patient_investigations';
		$this->TableName = 'patient_investigations';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`patient_investigations`";
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
		$this->id = new DbField('patient_investigations', 'patient_investigations', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// Reception
		$this->Reception = new DbField('patient_investigations', 'patient_investigations', 'x_Reception', 'Reception', '`Reception`', '`Reception`', 200, 45, -1, FALSE, '`Reception`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Reception->IsForeignKey = TRUE; // Foreign key field
		$this->Reception->Sortable = FALSE; // Allow sort
		$this->fields['Reception'] = &$this->Reception;

		// PatientId
		$this->PatientId = new DbField('patient_investigations', 'patient_investigations', 'x_PatientId', 'PatientId', '`PatientId`', '`PatientId`', 200, 45, -1, FALSE, '`PatientId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientId->IsForeignKey = TRUE; // Foreign key field
		$this->PatientId->Sortable = FALSE; // Allow sort
		$this->fields['PatientId'] = &$this->PatientId;

		// PatientName
		$this->PatientName = new DbField('patient_investigations', 'patient_investigations', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, FALSE, '`PatientName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientName->Sortable = FALSE; // Allow sort
		$this->fields['PatientName'] = &$this->PatientName;

		// Investigation
		$this->Investigation = new DbField('patient_investigations', 'patient_investigations', 'x_Investigation', 'Investigation', '`Investigation`', '`Investigation`', 200, 45, -1, FALSE, '`Investigation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Investigation->Sortable = TRUE; // Allow sort
		$this->fields['Investigation'] = &$this->Investigation;

		// Value
		$this->Value = new DbField('patient_investigations', 'patient_investigations', 'x_Value', 'Value', '`Value`', '`Value`', 200, 45, -1, FALSE, '`Value`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Value->Sortable = TRUE; // Allow sort
		$this->fields['Value'] = &$this->Value;

		// NormalRange
		$this->NormalRange = new DbField('patient_investigations', 'patient_investigations', 'x_NormalRange', 'NormalRange', '`NormalRange`', '`NormalRange`', 200, 45, -1, FALSE, '`NormalRange`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NormalRange->Sortable = TRUE; // Allow sort
		$this->fields['NormalRange'] = &$this->NormalRange;

		// mrnno
		$this->mrnno = new DbField('patient_investigations', 'patient_investigations', 'x_mrnno', 'mrnno', '`mrnno`', '`mrnno`', 200, 45, -1, FALSE, '`mrnno`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mrnno->IsForeignKey = TRUE; // Foreign key field
		$this->mrnno->Sortable = TRUE; // Allow sort
		$this->fields['mrnno'] = &$this->mrnno;

		// Age
		$this->Age = new DbField('patient_investigations', 'patient_investigations', 'x_Age', 'Age', '`Age`', '`Age`', 200, 45, -1, FALSE, '`Age`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Age->Sortable = TRUE; // Allow sort
		$this->fields['Age'] = &$this->Age;

		// Gender
		$this->Gender = new DbField('patient_investigations', 'patient_investigations', 'x_Gender', 'Gender', '`Gender`', '`Gender`', 200, 45, -1, FALSE, '`Gender`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Gender->Sortable = TRUE; // Allow sort
		$this->fields['Gender'] = &$this->Gender;

		// profilePic
		$this->profilePic = new DbField('patient_investigations', 'patient_investigations', 'x_profilePic', 'profilePic', '`profilePic`', '`profilePic`', 201, 450, -1, FALSE, '`profilePic`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->profilePic->Sortable = TRUE; // Allow sort
		$this->fields['profilePic'] = &$this->profilePic;

		// SampleCollected
		$this->SampleCollected = new DbField('patient_investigations', 'patient_investigations', 'x_SampleCollected', 'SampleCollected', '`SampleCollected`', CastDateFieldForLike("`SampleCollected`", 0, "DB"), 135, 19, 0, FALSE, '`SampleCollected`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SampleCollected->Sortable = TRUE; // Allow sort
		$this->SampleCollected->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['SampleCollected'] = &$this->SampleCollected;

		// SampleCollectedBy
		$this->SampleCollectedBy = new DbField('patient_investigations', 'patient_investigations', 'x_SampleCollectedBy', 'SampleCollectedBy', '`SampleCollectedBy`', '`SampleCollectedBy`', 200, 45, -1, FALSE, '`SampleCollectedBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SampleCollectedBy->Sortable = TRUE; // Allow sort
		$this->fields['SampleCollectedBy'] = &$this->SampleCollectedBy;

		// ResultedDate
		$this->ResultedDate = new DbField('patient_investigations', 'patient_investigations', 'x_ResultedDate', 'ResultedDate', '`ResultedDate`', CastDateFieldForLike("`ResultedDate`", 0, "DB"), 135, 19, 0, FALSE, '`ResultedDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ResultedDate->Sortable = TRUE; // Allow sort
		$this->ResultedDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['ResultedDate'] = &$this->ResultedDate;

		// ResultedBy
		$this->ResultedBy = new DbField('patient_investigations', 'patient_investigations', 'x_ResultedBy', 'ResultedBy', '`ResultedBy`', '`ResultedBy`', 200, 45, -1, FALSE, '`ResultedBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ResultedBy->Sortable = TRUE; // Allow sort
		$this->fields['ResultedBy'] = &$this->ResultedBy;

		// Modified
		$this->Modified = new DbField('patient_investigations', 'patient_investigations', 'x_Modified', 'Modified', '`Modified`', CastDateFieldForLike("`Modified`", 0, "DB"), 135, 19, 0, FALSE, '`Modified`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Modified->Sortable = TRUE; // Allow sort
		$this->Modified->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['Modified'] = &$this->Modified;

		// ModifiedBy
		$this->ModifiedBy = new DbField('patient_investigations', 'patient_investigations', 'x_ModifiedBy', 'ModifiedBy', '`ModifiedBy`', '`ModifiedBy`', 200, 45, -1, FALSE, '`ModifiedBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ModifiedBy->Sortable = TRUE; // Allow sort
		$this->fields['ModifiedBy'] = &$this->ModifiedBy;

		// Created
		$this->Created = new DbField('patient_investigations', 'patient_investigations', 'x_Created', 'Created', '`Created`', CastDateFieldForLike("`Created`", 0, "DB"), 135, 19, 0, FALSE, '`Created`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Created->Sortable = TRUE; // Allow sort
		$this->Created->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['Created'] = &$this->Created;

		// CreatedBy
		$this->CreatedBy = new DbField('patient_investigations', 'patient_investigations', 'x_CreatedBy', 'CreatedBy', '`CreatedBy`', '`CreatedBy`', 200, 45, -1, FALSE, '`CreatedBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CreatedBy->Sortable = TRUE; // Allow sort
		$this->fields['CreatedBy'] = &$this->CreatedBy;

		// GroupHead
		$this->GroupHead = new DbField('patient_investigations', 'patient_investigations', 'x_GroupHead', 'GroupHead', '`GroupHead`', '`GroupHead`', 200, 4, -1, FALSE, '`GroupHead`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->GroupHead->Sortable = TRUE; // Allow sort
		$this->fields['GroupHead'] = &$this->GroupHead;

		// Cost
		$this->Cost = new DbField('patient_investigations', 'patient_investigations', 'x_Cost', 'Cost', '`Cost`', '`Cost`', 131, 10, -1, FALSE, '`Cost`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Cost->Sortable = TRUE; // Allow sort
		$this->Cost->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Cost'] = &$this->Cost;

		// PaymentStatus
		$this->PaymentStatus = new DbField('patient_investigations', 'patient_investigations', 'x_PaymentStatus', 'PaymentStatus', '`PaymentStatus`', '`PaymentStatus`', 200, 45, -1, FALSE, '`PaymentStatus`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PaymentStatus->Sortable = TRUE; // Allow sort
		$this->fields['PaymentStatus'] = &$this->PaymentStatus;

		// PayMode
		$this->PayMode = new DbField('patient_investigations', 'patient_investigations', 'x_PayMode', 'PayMode', '`PayMode`', '`PayMode`', 200, 45, -1, FALSE, '`PayMode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PayMode->Sortable = TRUE; // Allow sort
		$this->fields['PayMode'] = &$this->PayMode;

		// VoucherNo
		$this->VoucherNo = new DbField('patient_investigations', 'patient_investigations', 'x_VoucherNo', 'VoucherNo', '`VoucherNo`', '`VoucherNo`', 200, 45, -1, FALSE, '`VoucherNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->VoucherNo->Sortable = TRUE; // Allow sort
		$this->fields['VoucherNo'] = &$this->VoucherNo;

		// InvestigationMultiselect
		$this->InvestigationMultiselect = new DbField('patient_investigations', 'patient_investigations', 'x_InvestigationMultiselect', 'InvestigationMultiselect', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->InvestigationMultiselect->IsCustom = TRUE; // Custom field
		$this->InvestigationMultiselect->Sortable = TRUE; // Allow sort
		$this->fields['InvestigationMultiselect'] = &$this->InvestigationMultiselect;
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
				$detailFilter .= "`Reception`=" . QuotedValue($this->Reception->getSessionValue(), DATATYPE_STRING, "DB");
			else
				return "";
			if ($this->PatientId->getSessionValue() != "")
				$detailFilter .= " AND `PatientId`=" . QuotedValue($this->PatientId->getSessionValue(), DATATYPE_STRING, "DB");
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
		return "`Reception`='@Reception@' AND `PatientId`='@PatientId@' AND `mrnno`='@mrnno@'";
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`patient_investigations`";
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
		return ($this->SqlSelect != "") ? $this->SqlSelect : "SELECT *, '' AS `InvestigationMultiselect` FROM " . $this->getSqlFrom();
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
		$this->Reception->DbValue = $row['Reception'];
		$this->PatientId->DbValue = $row['PatientId'];
		$this->PatientName->DbValue = $row['PatientName'];
		$this->Investigation->DbValue = $row['Investigation'];
		$this->Value->DbValue = $row['Value'];
		$this->NormalRange->DbValue = $row['NormalRange'];
		$this->mrnno->DbValue = $row['mrnno'];
		$this->Age->DbValue = $row['Age'];
		$this->Gender->DbValue = $row['Gender'];
		$this->profilePic->DbValue = $row['profilePic'];
		$this->SampleCollected->DbValue = $row['SampleCollected'];
		$this->SampleCollectedBy->DbValue = $row['SampleCollectedBy'];
		$this->ResultedDate->DbValue = $row['ResultedDate'];
		$this->ResultedBy->DbValue = $row['ResultedBy'];
		$this->Modified->DbValue = $row['Modified'];
		$this->ModifiedBy->DbValue = $row['ModifiedBy'];
		$this->Created->DbValue = $row['Created'];
		$this->CreatedBy->DbValue = $row['CreatedBy'];
		$this->GroupHead->DbValue = $row['GroupHead'];
		$this->Cost->DbValue = $row['Cost'];
		$this->PaymentStatus->DbValue = $row['PaymentStatus'];
		$this->PayMode->DbValue = $row['PayMode'];
		$this->VoucherNo->DbValue = $row['VoucherNo'];
		$this->InvestigationMultiselect->DbValue = $row['InvestigationMultiselect'];
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
			return "patient_investigationslist.php";
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
		if ($pageName == "patient_investigationsview.php")
			return $Language->phrase("View");
		elseif ($pageName == "patient_investigationsedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "patient_investigationsadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "patient_investigationslist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("patient_investigationsview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("patient_investigationsview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "patient_investigationsadd.php?" . $this->getUrlParm($parm);
		else
			$url = "patient_investigationsadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("patient_investigationsedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("patient_investigationsadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("patient_investigationsdelete.php", $this->getUrlParm());
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
		$this->Investigation->setDbValue($rs->fields('Investigation'));
		$this->Value->setDbValue($rs->fields('Value'));
		$this->NormalRange->setDbValue($rs->fields('NormalRange'));
		$this->mrnno->setDbValue($rs->fields('mrnno'));
		$this->Age->setDbValue($rs->fields('Age'));
		$this->Gender->setDbValue($rs->fields('Gender'));
		$this->profilePic->setDbValue($rs->fields('profilePic'));
		$this->SampleCollected->setDbValue($rs->fields('SampleCollected'));
		$this->SampleCollectedBy->setDbValue($rs->fields('SampleCollectedBy'));
		$this->ResultedDate->setDbValue($rs->fields('ResultedDate'));
		$this->ResultedBy->setDbValue($rs->fields('ResultedBy'));
		$this->Modified->setDbValue($rs->fields('Modified'));
		$this->ModifiedBy->setDbValue($rs->fields('ModifiedBy'));
		$this->Created->setDbValue($rs->fields('Created'));
		$this->CreatedBy->setDbValue($rs->fields('CreatedBy'));
		$this->GroupHead->setDbValue($rs->fields('GroupHead'));
		$this->Cost->setDbValue($rs->fields('Cost'));
		$this->PaymentStatus->setDbValue($rs->fields('PaymentStatus'));
		$this->PayMode->setDbValue($rs->fields('PayMode'));
		$this->VoucherNo->setDbValue($rs->fields('VoucherNo'));
		$this->InvestigationMultiselect->setDbValue($rs->fields('InvestigationMultiselect'));
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
		// Investigation
		// Value
		// NormalRange
		// mrnno
		// Age
		// Gender
		// profilePic
		// SampleCollected
		// SampleCollectedBy
		// ResultedDate
		// ResultedBy
		// Modified
		// ModifiedBy
		// Created
		// CreatedBy
		// GroupHead
		// Cost
		// PaymentStatus
		// PayMode
		// VoucherNo
		// InvestigationMultiselect
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// Reception
		$this->Reception->ViewValue = $this->Reception->CurrentValue;
		$this->Reception->ViewCustomAttributes = "";

		// PatientId
		$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
		$this->PatientId->ViewCustomAttributes = "";

		// PatientName
		$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
		$this->PatientName->ViewCustomAttributes = "";

		// Investigation
		$this->Investigation->ViewValue = $this->Investigation->CurrentValue;
		$this->Investigation->ViewCustomAttributes = "";

		// Value
		$this->Value->ViewValue = $this->Value->CurrentValue;
		$this->Value->ViewCustomAttributes = "";

		// NormalRange
		$this->NormalRange->ViewValue = $this->NormalRange->CurrentValue;
		$this->NormalRange->ViewCustomAttributes = "";

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

		// SampleCollected
		$this->SampleCollected->ViewValue = $this->SampleCollected->CurrentValue;
		$this->SampleCollected->ViewValue = FormatDateTime($this->SampleCollected->ViewValue, 0);
		$this->SampleCollected->ViewCustomAttributes = "";

		// SampleCollectedBy
		$this->SampleCollectedBy->ViewValue = $this->SampleCollectedBy->CurrentValue;
		$this->SampleCollectedBy->ViewCustomAttributes = "";

		// ResultedDate
		$this->ResultedDate->ViewValue = $this->ResultedDate->CurrentValue;
		$this->ResultedDate->ViewValue = FormatDateTime($this->ResultedDate->ViewValue, 0);
		$this->ResultedDate->ViewCustomAttributes = "";

		// ResultedBy
		$this->ResultedBy->ViewValue = $this->ResultedBy->CurrentValue;
		$this->ResultedBy->ViewCustomAttributes = "";

		// Modified
		$this->Modified->ViewValue = $this->Modified->CurrentValue;
		$this->Modified->ViewValue = FormatDateTime($this->Modified->ViewValue, 0);
		$this->Modified->ViewCustomAttributes = "";

		// ModifiedBy
		$this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
		$this->ModifiedBy->ViewCustomAttributes = "";

		// Created
		$this->Created->ViewValue = $this->Created->CurrentValue;
		$this->Created->ViewValue = FormatDateTime($this->Created->ViewValue, 0);
		$this->Created->ViewCustomAttributes = "";

		// CreatedBy
		$this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
		$this->CreatedBy->ViewCustomAttributes = "";

		// GroupHead
		$this->GroupHead->ViewValue = $this->GroupHead->CurrentValue;
		$this->GroupHead->ViewCustomAttributes = "";

		// Cost
		$this->Cost->ViewValue = $this->Cost->CurrentValue;
		$this->Cost->ViewValue = FormatNumber($this->Cost->ViewValue, 2, -2, -2, -2);
		$this->Cost->ViewCustomAttributes = "";

		// PaymentStatus
		$this->PaymentStatus->ViewValue = $this->PaymentStatus->CurrentValue;
		$this->PaymentStatus->ViewCustomAttributes = "";

		// PayMode
		$this->PayMode->ViewValue = $this->PayMode->CurrentValue;
		$this->PayMode->ViewCustomAttributes = "";

		// VoucherNo
		$this->VoucherNo->ViewValue = $this->VoucherNo->CurrentValue;
		$this->VoucherNo->ViewCustomAttributes = "";

		// InvestigationMultiselect
		$this->InvestigationMultiselect->ViewValue = $this->InvestigationMultiselect->CurrentValue;
		$this->InvestigationMultiselect->ViewCustomAttributes = "";

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

		// Investigation
		$this->Investigation->LinkCustomAttributes = "";
		$this->Investigation->HrefValue = "";
		$this->Investigation->TooltipValue = "";

		// Value
		$this->Value->LinkCustomAttributes = "";
		$this->Value->HrefValue = "";
		$this->Value->TooltipValue = "";

		// NormalRange
		$this->NormalRange->LinkCustomAttributes = "";
		$this->NormalRange->HrefValue = "";
		$this->NormalRange->TooltipValue = "";

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

		// SampleCollected
		$this->SampleCollected->LinkCustomAttributes = "";
		$this->SampleCollected->HrefValue = "";
		$this->SampleCollected->TooltipValue = "";

		// SampleCollectedBy
		$this->SampleCollectedBy->LinkCustomAttributes = "";
		$this->SampleCollectedBy->HrefValue = "";
		$this->SampleCollectedBy->TooltipValue = "";

		// ResultedDate
		$this->ResultedDate->LinkCustomAttributes = "";
		$this->ResultedDate->HrefValue = "";
		$this->ResultedDate->TooltipValue = "";

		// ResultedBy
		$this->ResultedBy->LinkCustomAttributes = "";
		$this->ResultedBy->HrefValue = "";
		$this->ResultedBy->TooltipValue = "";

		// Modified
		$this->Modified->LinkCustomAttributes = "";
		$this->Modified->HrefValue = "";
		$this->Modified->TooltipValue = "";

		// ModifiedBy
		$this->ModifiedBy->LinkCustomAttributes = "";
		$this->ModifiedBy->HrefValue = "";
		$this->ModifiedBy->TooltipValue = "";

		// Created
		$this->Created->LinkCustomAttributes = "";
		$this->Created->HrefValue = "";
		$this->Created->TooltipValue = "";

		// CreatedBy
		$this->CreatedBy->LinkCustomAttributes = "";
		$this->CreatedBy->HrefValue = "";
		$this->CreatedBy->TooltipValue = "";

		// GroupHead
		$this->GroupHead->LinkCustomAttributes = "";
		$this->GroupHead->HrefValue = "";
		$this->GroupHead->TooltipValue = "";

		// Cost
		$this->Cost->LinkCustomAttributes = "";
		$this->Cost->HrefValue = "";
		$this->Cost->TooltipValue = "";

		// PaymentStatus
		$this->PaymentStatus->LinkCustomAttributes = "";
		$this->PaymentStatus->HrefValue = "";
		$this->PaymentStatus->TooltipValue = "";

		// PayMode
		$this->PayMode->LinkCustomAttributes = "";
		$this->PayMode->HrefValue = "";
		$this->PayMode->TooltipValue = "";

		// VoucherNo
		$this->VoucherNo->LinkCustomAttributes = "";
		$this->VoucherNo->HrefValue = "";
		$this->VoucherNo->TooltipValue = "";

		// InvestigationMultiselect
		$this->InvestigationMultiselect->LinkCustomAttributes = "";
		$this->InvestigationMultiselect->HrefValue = "";
		$this->InvestigationMultiselect->TooltipValue = "";

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
		$this->Reception->ViewCustomAttributes = "";

		// PatientId
		$this->PatientId->EditAttrs["class"] = "form-control";
		$this->PatientId->EditCustomAttributes = "";
		$this->PatientId->EditValue = $this->PatientId->CurrentValue;
		$this->PatientId->ViewCustomAttributes = "";

		// PatientName
		$this->PatientName->EditAttrs["class"] = "form-control";
		$this->PatientName->EditCustomAttributes = "";
		if (!$this->PatientName->Raw)
			$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
		$this->PatientName->EditValue = $this->PatientName->CurrentValue;
		$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

		// Investigation
		$this->Investigation->EditAttrs["class"] = "form-control";
		$this->Investigation->EditCustomAttributes = "";
		if (!$this->Investigation->Raw)
			$this->Investigation->CurrentValue = HtmlDecode($this->Investigation->CurrentValue);
		$this->Investigation->EditValue = $this->Investigation->CurrentValue;
		$this->Investigation->PlaceHolder = RemoveHtml($this->Investigation->caption());

		// Value
		$this->Value->EditAttrs["class"] = "form-control";
		$this->Value->EditCustomAttributes = "";
		if (!$this->Value->Raw)
			$this->Value->CurrentValue = HtmlDecode($this->Value->CurrentValue);
		$this->Value->EditValue = $this->Value->CurrentValue;
		$this->Value->PlaceHolder = RemoveHtml($this->Value->caption());

		// NormalRange
		$this->NormalRange->EditAttrs["class"] = "form-control";
		$this->NormalRange->EditCustomAttributes = "";
		if (!$this->NormalRange->Raw)
			$this->NormalRange->CurrentValue = HtmlDecode($this->NormalRange->CurrentValue);
		$this->NormalRange->EditValue = $this->NormalRange->CurrentValue;
		$this->NormalRange->PlaceHolder = RemoveHtml($this->NormalRange->caption());

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

		// SampleCollected
		$this->SampleCollected->EditAttrs["class"] = "form-control";
		$this->SampleCollected->EditCustomAttributes = "";
		$this->SampleCollected->EditValue = FormatDateTime($this->SampleCollected->CurrentValue, 8);
		$this->SampleCollected->PlaceHolder = RemoveHtml($this->SampleCollected->caption());

		// SampleCollectedBy
		$this->SampleCollectedBy->EditAttrs["class"] = "form-control";
		$this->SampleCollectedBy->EditCustomAttributes = "";
		if (!$this->SampleCollectedBy->Raw)
			$this->SampleCollectedBy->CurrentValue = HtmlDecode($this->SampleCollectedBy->CurrentValue);
		$this->SampleCollectedBy->EditValue = $this->SampleCollectedBy->CurrentValue;
		$this->SampleCollectedBy->PlaceHolder = RemoveHtml($this->SampleCollectedBy->caption());

		// ResultedDate
		$this->ResultedDate->EditAttrs["class"] = "form-control";
		$this->ResultedDate->EditCustomAttributes = "";
		$this->ResultedDate->EditValue = FormatDateTime($this->ResultedDate->CurrentValue, 8);
		$this->ResultedDate->PlaceHolder = RemoveHtml($this->ResultedDate->caption());

		// ResultedBy
		$this->ResultedBy->EditAttrs["class"] = "form-control";
		$this->ResultedBy->EditCustomAttributes = "";
		if (!$this->ResultedBy->Raw)
			$this->ResultedBy->CurrentValue = HtmlDecode($this->ResultedBy->CurrentValue);
		$this->ResultedBy->EditValue = $this->ResultedBy->CurrentValue;
		$this->ResultedBy->PlaceHolder = RemoveHtml($this->ResultedBy->caption());

		// Modified
		$this->Modified->EditAttrs["class"] = "form-control";
		$this->Modified->EditCustomAttributes = "";
		$this->Modified->EditValue = FormatDateTime($this->Modified->CurrentValue, 8);
		$this->Modified->PlaceHolder = RemoveHtml($this->Modified->caption());

		// ModifiedBy
		$this->ModifiedBy->EditAttrs["class"] = "form-control";
		$this->ModifiedBy->EditCustomAttributes = "";
		if (!$this->ModifiedBy->Raw)
			$this->ModifiedBy->CurrentValue = HtmlDecode($this->ModifiedBy->CurrentValue);
		$this->ModifiedBy->EditValue = $this->ModifiedBy->CurrentValue;
		$this->ModifiedBy->PlaceHolder = RemoveHtml($this->ModifiedBy->caption());

		// Created
		$this->Created->EditAttrs["class"] = "form-control";
		$this->Created->EditCustomAttributes = "";
		$this->Created->EditValue = FormatDateTime($this->Created->CurrentValue, 8);
		$this->Created->PlaceHolder = RemoveHtml($this->Created->caption());

		// CreatedBy
		$this->CreatedBy->EditAttrs["class"] = "form-control";
		$this->CreatedBy->EditCustomAttributes = "";
		if (!$this->CreatedBy->Raw)
			$this->CreatedBy->CurrentValue = HtmlDecode($this->CreatedBy->CurrentValue);
		$this->CreatedBy->EditValue = $this->CreatedBy->CurrentValue;
		$this->CreatedBy->PlaceHolder = RemoveHtml($this->CreatedBy->caption());

		// GroupHead
		$this->GroupHead->EditAttrs["class"] = "form-control";
		$this->GroupHead->EditCustomAttributes = "";
		if (!$this->GroupHead->Raw)
			$this->GroupHead->CurrentValue = HtmlDecode($this->GroupHead->CurrentValue);
		$this->GroupHead->EditValue = $this->GroupHead->CurrentValue;
		$this->GroupHead->PlaceHolder = RemoveHtml($this->GroupHead->caption());

		// Cost
		$this->Cost->EditAttrs["class"] = "form-control";
		$this->Cost->EditCustomAttributes = "";
		$this->Cost->EditValue = $this->Cost->CurrentValue;
		$this->Cost->PlaceHolder = RemoveHtml($this->Cost->caption());
		if (strval($this->Cost->EditValue) != "" && is_numeric($this->Cost->EditValue))
			$this->Cost->EditValue = FormatNumber($this->Cost->EditValue, -2, -2, -2, -2);
		

		// PaymentStatus
		$this->PaymentStatus->EditAttrs["class"] = "form-control";
		$this->PaymentStatus->EditCustomAttributes = "";
		if (!$this->PaymentStatus->Raw)
			$this->PaymentStatus->CurrentValue = HtmlDecode($this->PaymentStatus->CurrentValue);
		$this->PaymentStatus->EditValue = $this->PaymentStatus->CurrentValue;
		$this->PaymentStatus->PlaceHolder = RemoveHtml($this->PaymentStatus->caption());

		// PayMode
		$this->PayMode->EditAttrs["class"] = "form-control";
		$this->PayMode->EditCustomAttributes = "";
		if (!$this->PayMode->Raw)
			$this->PayMode->CurrentValue = HtmlDecode($this->PayMode->CurrentValue);
		$this->PayMode->EditValue = $this->PayMode->CurrentValue;
		$this->PayMode->PlaceHolder = RemoveHtml($this->PayMode->caption());

		// VoucherNo
		$this->VoucherNo->EditAttrs["class"] = "form-control";
		$this->VoucherNo->EditCustomAttributes = "";
		if (!$this->VoucherNo->Raw)
			$this->VoucherNo->CurrentValue = HtmlDecode($this->VoucherNo->CurrentValue);
		$this->VoucherNo->EditValue = $this->VoucherNo->CurrentValue;
		$this->VoucherNo->PlaceHolder = RemoveHtml($this->VoucherNo->caption());

		// InvestigationMultiselect
		$this->InvestigationMultiselect->EditAttrs["class"] = "form-control";
		$this->InvestigationMultiselect->EditCustomAttributes = "";
		if (!$this->InvestigationMultiselect->Raw)
			$this->InvestigationMultiselect->CurrentValue = HtmlDecode($this->InvestigationMultiselect->CurrentValue);
		$this->InvestigationMultiselect->EditValue = $this->InvestigationMultiselect->CurrentValue;
		$this->InvestigationMultiselect->PlaceHolder = RemoveHtml($this->InvestigationMultiselect->caption());

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
					$doc->exportCaption($this->Investigation);
					$doc->exportCaption($this->Value);
					$doc->exportCaption($this->NormalRange);
					$doc->exportCaption($this->mrnno);
					$doc->exportCaption($this->Age);
					$doc->exportCaption($this->Gender);
					$doc->exportCaption($this->profilePic);
					$doc->exportCaption($this->SampleCollected);
					$doc->exportCaption($this->SampleCollectedBy);
					$doc->exportCaption($this->ResultedDate);
					$doc->exportCaption($this->ResultedBy);
					$doc->exportCaption($this->Modified);
					$doc->exportCaption($this->ModifiedBy);
					$doc->exportCaption($this->Created);
					$doc->exportCaption($this->CreatedBy);
					$doc->exportCaption($this->GroupHead);
					$doc->exportCaption($this->Cost);
					$doc->exportCaption($this->PaymentStatus);
					$doc->exportCaption($this->PayMode);
					$doc->exportCaption($this->VoucherNo);
					$doc->exportCaption($this->InvestigationMultiselect);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->Investigation);
					$doc->exportCaption($this->Value);
					$doc->exportCaption($this->NormalRange);
					$doc->exportCaption($this->mrnno);
					$doc->exportCaption($this->Age);
					$doc->exportCaption($this->Gender);
					$doc->exportCaption($this->SampleCollected);
					$doc->exportCaption($this->SampleCollectedBy);
					$doc->exportCaption($this->ResultedDate);
					$doc->exportCaption($this->ResultedBy);
					$doc->exportCaption($this->Modified);
					$doc->exportCaption($this->ModifiedBy);
					$doc->exportCaption($this->Created);
					$doc->exportCaption($this->CreatedBy);
					$doc->exportCaption($this->GroupHead);
					$doc->exportCaption($this->Cost);
					$doc->exportCaption($this->PaymentStatus);
					$doc->exportCaption($this->PayMode);
					$doc->exportCaption($this->VoucherNo);
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
						$doc->exportField($this->Investigation);
						$doc->exportField($this->Value);
						$doc->exportField($this->NormalRange);
						$doc->exportField($this->mrnno);
						$doc->exportField($this->Age);
						$doc->exportField($this->Gender);
						$doc->exportField($this->profilePic);
						$doc->exportField($this->SampleCollected);
						$doc->exportField($this->SampleCollectedBy);
						$doc->exportField($this->ResultedDate);
						$doc->exportField($this->ResultedBy);
						$doc->exportField($this->Modified);
						$doc->exportField($this->ModifiedBy);
						$doc->exportField($this->Created);
						$doc->exportField($this->CreatedBy);
						$doc->exportField($this->GroupHead);
						$doc->exportField($this->Cost);
						$doc->exportField($this->PaymentStatus);
						$doc->exportField($this->PayMode);
						$doc->exportField($this->VoucherNo);
						$doc->exportField($this->InvestigationMultiselect);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->Investigation);
						$doc->exportField($this->Value);
						$doc->exportField($this->NormalRange);
						$doc->exportField($this->mrnno);
						$doc->exportField($this->Age);
						$doc->exportField($this->Gender);
						$doc->exportField($this->SampleCollected);
						$doc->exportField($this->SampleCollectedBy);
						$doc->exportField($this->ResultedDate);
						$doc->exportField($this->ResultedBy);
						$doc->exportField($this->Modified);
						$doc->exportField($this->ModifiedBy);
						$doc->exportField($this->Created);
						$doc->exportField($this->CreatedBy);
						$doc->exportField($this->GroupHead);
						$doc->exportField($this->Cost);
						$doc->exportField($this->PaymentStatus);
						$doc->exportField($this->PayMode);
						$doc->exportField($this->VoucherNo);
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

				if($rsnew["PatID"]=="")
			{
					$dbhelper = &DbHelper();
					$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$rsnew["PatientId"]."'; ";
					$results2 = $dbhelper->ExecuteRows($sql);
					$rsnew["PatientName"] = $results2[0]["first_name"];
					$rsnew["Age"] = $results2[0]["Age"];
					$rsnew["Gender"] = $results2[0]["gender"];
					$rsnew["profilePic"] = $results2[0]["profilePic"];
					$rsnew["PatID"] = $results2[0]["PatientID"];
					$rsnew["MobileNumber"] = $results2[0]["mobile_no"];
			}
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