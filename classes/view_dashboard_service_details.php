<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for view_dashboard_service_details
 */
class view_dashboard_service_details extends DbTable
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
	public $PatientId;
	public $PatientName;
	public $Services;
	public $amount;
	public $SubTotal;
	public $createdby;
	public $createddatetime;
	public $createdDate;
	public $DrName;
	public $DRDepartment;
	public $ItemCode;
	public $DEptCd;
	public $CODE;
	public $SERVICE;
	public $SERVICE_TYPE;
	public $DEPARTMENT;
	public $HospID;
	public $vid;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'view_dashboard_service_details';
		$this->TableName = 'view_dashboard_service_details';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`view_dashboard_service_details`";
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

		// PatientId
		$this->PatientId = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_PatientId', 'PatientId', '`PatientId`', '`PatientId`', 200, -1, FALSE, '`PatientId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientId->Sortable = TRUE; // Allow sort
		$this->fields['PatientId'] = &$this->PatientId;

		// PatientName
		$this->PatientName = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, -1, FALSE, '`PatientName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientName->Sortable = TRUE; // Allow sort
		$this->fields['PatientName'] = &$this->PatientName;

		// Services
		$this->Services = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_Services', 'Services', '`Services`', '`Services`', 200, -1, FALSE, '`Services`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Services->Nullable = FALSE; // NOT NULL field
		$this->Services->Required = TRUE; // Required field
		$this->Services->Sortable = TRUE; // Allow sort
		$this->fields['Services'] = &$this->Services;

		// amount
		$this->amount = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_amount', 'amount', '`amount`', '`amount`', 131, -1, FALSE, '`amount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->amount->Nullable = FALSE; // NOT NULL field
		$this->amount->Required = TRUE; // Required field
		$this->amount->Sortable = TRUE; // Allow sort
		$this->amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['amount'] = &$this->amount;

		// SubTotal
		$this->SubTotal = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_SubTotal', 'SubTotal', '`SubTotal`', '`SubTotal`', 131, -1, FALSE, '`SubTotal`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SubTotal->Sortable = TRUE; // Allow sort
		$this->SubTotal->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['SubTotal'] = &$this->SubTotal;

		// createdby
		$this->createdby = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 200, -1, FALSE, '`createdby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdby->Sortable = TRUE; // Allow sort
		$this->fields['createdby'] = &$this->createdby;

		// createddatetime
		$this->createddatetime = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike('`createddatetime`', 0, "DB"), 135, 0, FALSE, '`createddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = TRUE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['createddatetime'] = &$this->createddatetime;

		// createdDate
		$this->createdDate = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_createdDate', 'createdDate', '`createdDate`', CastDateFieldForLike('`createdDate`', 7, "DB"), 133, 7, FALSE, '`createdDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdDate->IsForeignKey = TRUE; // Foreign key field
		$this->createdDate->Sortable = TRUE; // Allow sort
		$this->createdDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['createdDate'] = &$this->createdDate;

		// DrName
		$this->DrName = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_DrName', 'DrName', '`DrName`', '`DrName`', 200, -1, FALSE, '`DrName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->DrName->Sortable = TRUE; // Allow sort
		$this->DrName->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->DrName->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->DrName->Lookup = new Lookup('DrName', 'doctors', FALSE, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
		$this->fields['DrName'] = &$this->DrName;

		// DRDepartment
		$this->DRDepartment = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_DRDepartment', 'DRDepartment', '`DRDepartment`', '`DRDepartment`', 200, -1, FALSE, '`DRDepartment`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DRDepartment->Sortable = TRUE; // Allow sort
		$this->fields['DRDepartment'] = &$this->DRDepartment;

		// ItemCode
		$this->ItemCode = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_ItemCode', 'ItemCode', '`ItemCode`', '`ItemCode`', 200, -1, FALSE, '`ItemCode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ItemCode->Sortable = TRUE; // Allow sort
		$this->fields['ItemCode'] = &$this->ItemCode;

		// DEptCd
		$this->DEptCd = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_DEptCd', 'DEptCd', '`DEptCd`', '`DEptCd`', 200, -1, FALSE, '`DEptCd`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DEptCd->Sortable = TRUE; // Allow sort
		$this->fields['DEptCd'] = &$this->DEptCd;

		// CODE
		$this->CODE = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_CODE', 'CODE', '`CODE`', '`CODE`', 200, -1, FALSE, '`CODE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CODE->Sortable = TRUE; // Allow sort
		$this->fields['CODE'] = &$this->CODE;

		// SERVICE
		$this->SERVICE = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_SERVICE', 'SERVICE', '`SERVICE`', '`SERVICE`', 200, -1, FALSE, '`SERVICE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SERVICE->Sortable = TRUE; // Allow sort
		$this->fields['SERVICE'] = &$this->SERVICE;

		// SERVICE_TYPE
		$this->SERVICE_TYPE = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_SERVICE_TYPE', 'SERVICE_TYPE', '`SERVICE_TYPE`', '`SERVICE_TYPE`', 200, -1, FALSE, '`SERVICE_TYPE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SERVICE_TYPE->IsForeignKey = TRUE; // Foreign key field
		$this->SERVICE_TYPE->Sortable = TRUE; // Allow sort
		$this->fields['SERVICE_TYPE'] = &$this->SERVICE_TYPE;

		// DEPARTMENT
		$this->DEPARTMENT = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_DEPARTMENT', 'DEPARTMENT', '`DEPARTMENT`', '`DEPARTMENT`', 200, -1, FALSE, '`DEPARTMENT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DEPARTMENT->IsForeignKey = TRUE; // Foreign key field
		$this->DEPARTMENT->Sortable = TRUE; // Allow sort
		$this->fields['DEPARTMENT'] = &$this->DEPARTMENT;

		// HospID
		$this->HospID = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->IsForeignKey = TRUE; // Foreign key field
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->Lookup = new Lookup('HospID', 'hospital', FALSE, 'id', ["hospital","","",""], [], [], [], [], [], [], '', '');
		$this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HospID'] = &$this->HospID;

		// vid
		$this->vid = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_vid', 'vid', '`vid`', '`vid`', 3, -1, FALSE, '`vid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->vid->IsAutoIncrement = TRUE; // Autoincrement field
		$this->vid->IsPrimaryKey = TRUE; // Primary key field
		$this->vid->Sortable = TRUE; // Allow sort
		$this->vid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['vid'] = &$this->vid;
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
		if ($this->getCurrentMasterTable() == "view_dashboard_service_servicetype") {
			if ($this->DEPARTMENT->getSessionValue() <> "")
				$masterFilter .= "`DEPARTMENT`=" . QuotedValue($this->DEPARTMENT->getSessionValue(), DATATYPE_STRING, "DB");
			else
				return "";
			if ($this->HospID->getSessionValue() <> "")
				$masterFilter .= " AND `HospID`=" . QuotedValue($this->HospID->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->SERVICE_TYPE->getSessionValue() <> "")
				$masterFilter .= " AND `SERVICE_TYPE`=" . QuotedValue($this->SERVICE_TYPE->getSessionValue(), DATATYPE_STRING, "DB");
			else
				return "";
			if ($this->createdDate->getSessionValue() <> "")
				$masterFilter .= " AND `createdDate`=" . QuotedValue($this->createdDate->getSessionValue(), DATATYPE_DATE, "DB");
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
		if ($this->getCurrentMasterTable() == "view_dashboard_service_servicetype") {
			if ($this->DEPARTMENT->getSessionValue() <> "")
				$detailFilter .= "`DEPARTMENT`=" . QuotedValue($this->DEPARTMENT->getSessionValue(), DATATYPE_STRING, "DB");
			else
				return "";
			if ($this->HospID->getSessionValue() <> "")
				$detailFilter .= " AND `HospID`=" . QuotedValue($this->HospID->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->SERVICE_TYPE->getSessionValue() <> "")
				$detailFilter .= " AND `SERVICE_TYPE`=" . QuotedValue($this->SERVICE_TYPE->getSessionValue(), DATATYPE_STRING, "DB");
			else
				return "";
			if ($this->createdDate->getSessionValue() <> "")
				$detailFilter .= " AND `createdDate`=" . QuotedValue($this->createdDate->getSessionValue(), DATATYPE_DATE, "DB");
			else
				return "";
		}
		return $detailFilter;
	}

	// Master filter
	public function sqlMasterFilter_view_dashboard_service_servicetype()
	{
		return "`DEPARTMENT`='@DEPARTMENT@' AND `HospID`=@HospID@ AND `SERVICE_TYPE`='@SERVICE_TYPE@' AND `createdDate`='@createdDate@'";
	}

	// Detail filter
	public function sqlDetailFilter_view_dashboard_service_servicetype()
	{
		return "`DEPARTMENT`='@DEPARTMENT@' AND `HospID`=@HospID@ AND `SERVICE_TYPE`='@SERVICE_TYPE@' AND `createdDate`='@createdDate@'";
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`view_dashboard_service_details`";
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
		return ($this->SqlOrderBy <> "") ? $this->SqlOrderBy : "`createdDate` DESC";
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
			$this->vid->setDbValue($conn->insert_ID());
			$rs['vid'] = $this->vid->DbValue;
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
			if (array_key_exists('vid', $rs))
				AddFilter($where, QuotedName('vid', $this->Dbid) . '=' . QuotedValue($rs['vid'], $this->vid->DataType, $this->Dbid));
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
		$this->PatientId->DbValue = $row['PatientId'];
		$this->PatientName->DbValue = $row['PatientName'];
		$this->Services->DbValue = $row['Services'];
		$this->amount->DbValue = $row['amount'];
		$this->SubTotal->DbValue = $row['SubTotal'];
		$this->createdby->DbValue = $row['createdby'];
		$this->createddatetime->DbValue = $row['createddatetime'];
		$this->createdDate->DbValue = $row['createdDate'];
		$this->DrName->DbValue = $row['DrName'];
		$this->DRDepartment->DbValue = $row['DRDepartment'];
		$this->ItemCode->DbValue = $row['ItemCode'];
		$this->DEptCd->DbValue = $row['DEptCd'];
		$this->CODE->DbValue = $row['CODE'];
		$this->SERVICE->DbValue = $row['SERVICE'];
		$this->SERVICE_TYPE->DbValue = $row['SERVICE_TYPE'];
		$this->DEPARTMENT->DbValue = $row['DEPARTMENT'];
		$this->HospID->DbValue = $row['HospID'];
		$this->vid->DbValue = $row['vid'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`vid` = @vid@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('vid', $row) ? $row['vid'] : NULL) : $this->vid->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@vid@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "view_dashboard_service_detailslist.php";
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
		if ($pageName == "view_dashboard_service_detailsview.php")
			return $Language->phrase("View");
		elseif ($pageName == "view_dashboard_service_detailsedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "view_dashboard_service_detailsadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "view_dashboard_service_detailslist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("view_dashboard_service_detailsview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_dashboard_service_detailsview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "view_dashboard_service_detailsadd.php?" . $this->getUrlParm($parm);
		else
			$url = "view_dashboard_service_detailsadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("view_dashboard_service_detailsedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("view_dashboard_service_detailsadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("view_dashboard_service_detailsdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		if ($this->getCurrentMasterTable() == "view_dashboard_service_servicetype" && !ContainsString($url, TABLE_SHOW_MASTER . "=")) {
			$url .= (ContainsString($url, "?") ? "&" : "?") . TABLE_SHOW_MASTER . "=" . $this->getCurrentMasterTable();
			$url .= "&fk_DEPARTMENT=" . urlencode($this->DEPARTMENT->CurrentValue);
			$url .= "&fk_HospID=" . urlencode($this->HospID->CurrentValue);
			$url .= "&fk_SERVICE_TYPE=" . urlencode($this->SERVICE_TYPE->CurrentValue);
			$url .= "&fk_createdDate=" . urlencode(UnFormatDateTime($this->createdDate->CurrentValue,7));
		}
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "vid:" . JsonEncode($this->vid->CurrentValue, "number");
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
		if ($this->vid->CurrentValue != NULL) {
			$url .= "vid=" . urlencode($this->vid->CurrentValue);
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
			if (Param("vid") !== NULL)
				$arKeys[] = Param("vid");
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
			$this->vid->CurrentValue = $key;
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
		$this->PatientId->setDbValue($rs->fields('PatientId'));
		$this->PatientName->setDbValue($rs->fields('PatientName'));
		$this->Services->setDbValue($rs->fields('Services'));
		$this->amount->setDbValue($rs->fields('amount'));
		$this->SubTotal->setDbValue($rs->fields('SubTotal'));
		$this->createdby->setDbValue($rs->fields('createdby'));
		$this->createddatetime->setDbValue($rs->fields('createddatetime'));
		$this->createdDate->setDbValue($rs->fields('createdDate'));
		$this->DrName->setDbValue($rs->fields('DrName'));
		$this->DRDepartment->setDbValue($rs->fields('DRDepartment'));
		$this->ItemCode->setDbValue($rs->fields('ItemCode'));
		$this->DEptCd->setDbValue($rs->fields('DEptCd'));
		$this->CODE->setDbValue($rs->fields('CODE'));
		$this->SERVICE->setDbValue($rs->fields('SERVICE'));
		$this->SERVICE_TYPE->setDbValue($rs->fields('SERVICE_TYPE'));
		$this->DEPARTMENT->setDbValue($rs->fields('DEPARTMENT'));
		$this->HospID->setDbValue($rs->fields('HospID'));
		$this->vid->setDbValue($rs->fields('vid'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// PatientId
		// PatientName
		// Services
		// amount
		// SubTotal
		// createdby
		// createddatetime
		// createdDate
		// DrName
		// DRDepartment
		// ItemCode
		// DEptCd
		// CODE
		// SERVICE
		// SERVICE_TYPE
		// DEPARTMENT
		// HospID
		// vid
		// PatientId

		$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
		$this->PatientId->ViewCustomAttributes = "";

		// PatientName
		$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
		$this->PatientName->ViewCustomAttributes = "";

		// Services
		$this->Services->ViewValue = $this->Services->CurrentValue;
		$this->Services->ViewCustomAttributes = "";

		// amount
		$this->amount->ViewValue = $this->amount->CurrentValue;
		$this->amount->ViewValue = FormatNumber($this->amount->ViewValue, 2, -2, -2, -2);
		$this->amount->ViewCustomAttributes = "";

		// SubTotal
		$this->SubTotal->ViewValue = $this->SubTotal->CurrentValue;
		$this->SubTotal->ViewValue = FormatNumber($this->SubTotal->ViewValue, 2, -2, -2, -2);
		$this->SubTotal->ViewCustomAttributes = "";

		// createdby
		$this->createdby->ViewValue = $this->createdby->CurrentValue;
		$this->createdby->ViewCustomAttributes = "";

		// createddatetime
		$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
		$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
		$this->createddatetime->ViewCustomAttributes = "";

		// createdDate
		$this->createdDate->ViewValue = $this->createdDate->CurrentValue;
		$this->createdDate->ViewValue = FormatDateTime($this->createdDate->ViewValue, 7);
		$this->createdDate->ViewCustomAttributes = "";

		// DrName
		$curVal = strval($this->DrName->CurrentValue);
		if ($curVal <> "") {
			$this->DrName->ViewValue = $this->DrName->lookupCacheOption($curVal);
			if ($this->DrName->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->DrName->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->DrName->ViewValue = $this->DrName->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->DrName->ViewValue = $this->DrName->CurrentValue;
				}
			}
		} else {
			$this->DrName->ViewValue = NULL;
		}
		$this->DrName->ViewCustomAttributes = "";

		// DRDepartment
		$this->DRDepartment->ViewValue = $this->DRDepartment->CurrentValue;
		$this->DRDepartment->ViewCustomAttributes = "";

		// ItemCode
		$this->ItemCode->ViewValue = $this->ItemCode->CurrentValue;
		$this->ItemCode->ViewCustomAttributes = "";

		// DEptCd
		$this->DEptCd->ViewValue = $this->DEptCd->CurrentValue;
		$this->DEptCd->ViewCustomAttributes = "";

		// CODE
		$this->CODE->ViewValue = $this->CODE->CurrentValue;
		$this->CODE->ViewCustomAttributes = "";

		// SERVICE
		$this->SERVICE->ViewValue = $this->SERVICE->CurrentValue;
		$this->SERVICE->ViewCustomAttributes = "";

		// SERVICE_TYPE
		$this->SERVICE_TYPE->ViewValue = $this->SERVICE_TYPE->CurrentValue;
		$this->SERVICE_TYPE->ViewCustomAttributes = "";

		// DEPARTMENT
		$this->DEPARTMENT->ViewValue = $this->DEPARTMENT->CurrentValue;
		$this->DEPARTMENT->ViewCustomAttributes = "";

		// HospID
		$this->HospID->ViewValue = $this->HospID->CurrentValue;
		$curVal = strval($this->HospID->CurrentValue);
		if ($curVal <> "") {
			$this->HospID->ViewValue = $this->HospID->lookupCacheOption($curVal);
			if ($this->HospID->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->HospID->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->HospID->ViewValue = $this->HospID->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->HospID->ViewValue = $this->HospID->CurrentValue;
				}
			}
		} else {
			$this->HospID->ViewValue = NULL;
		}
		$this->HospID->ViewCustomAttributes = "";

		// vid
		$this->vid->ViewValue = $this->vid->CurrentValue;
		$this->vid->ViewValue = FormatNumber($this->vid->ViewValue, 0, -2, -2, -2);
		$this->vid->ViewCustomAttributes = "";

		// PatientId
		$this->PatientId->LinkCustomAttributes = "";
		$this->PatientId->HrefValue = "";
		$this->PatientId->TooltipValue = "";

		// PatientName
		$this->PatientName->LinkCustomAttributes = "";
		$this->PatientName->HrefValue = "";
		$this->PatientName->TooltipValue = "";

		// Services
		$this->Services->LinkCustomAttributes = "";
		$this->Services->HrefValue = "";
		$this->Services->TooltipValue = "";

		// amount
		$this->amount->LinkCustomAttributes = "";
		$this->amount->HrefValue = "";
		$this->amount->TooltipValue = "";

		// SubTotal
		$this->SubTotal->LinkCustomAttributes = "";
		$this->SubTotal->HrefValue = "";
		$this->SubTotal->TooltipValue = "";

		// createdby
		$this->createdby->LinkCustomAttributes = "";
		$this->createdby->HrefValue = "";
		$this->createdby->TooltipValue = "";

		// createddatetime
		$this->createddatetime->LinkCustomAttributes = "";
		$this->createddatetime->HrefValue = "";
		$this->createddatetime->TooltipValue = "";

		// createdDate
		$this->createdDate->LinkCustomAttributes = "";
		$this->createdDate->HrefValue = "";
		$this->createdDate->TooltipValue = "";

		// DrName
		$this->DrName->LinkCustomAttributes = "";
		$this->DrName->HrefValue = "";
		$this->DrName->TooltipValue = "";

		// DRDepartment
		$this->DRDepartment->LinkCustomAttributes = "";
		$this->DRDepartment->HrefValue = "";
		$this->DRDepartment->TooltipValue = "";

		// ItemCode
		$this->ItemCode->LinkCustomAttributes = "";
		$this->ItemCode->HrefValue = "";
		$this->ItemCode->TooltipValue = "";

		// DEptCd
		$this->DEptCd->LinkCustomAttributes = "";
		$this->DEptCd->HrefValue = "";
		$this->DEptCd->TooltipValue = "";

		// CODE
		$this->CODE->LinkCustomAttributes = "";
		$this->CODE->HrefValue = "";
		$this->CODE->TooltipValue = "";

		// SERVICE
		$this->SERVICE->LinkCustomAttributes = "";
		$this->SERVICE->HrefValue = "";
		$this->SERVICE->TooltipValue = "";

		// SERVICE_TYPE
		$this->SERVICE_TYPE->LinkCustomAttributes = "";
		$this->SERVICE_TYPE->HrefValue = "";
		$this->SERVICE_TYPE->TooltipValue = "";

		// DEPARTMENT
		$this->DEPARTMENT->LinkCustomAttributes = "";
		$this->DEPARTMENT->HrefValue = "";
		$this->DEPARTMENT->TooltipValue = "";

		// HospID
		$this->HospID->LinkCustomAttributes = "";
		$this->HospID->HrefValue = "";
		$this->HospID->TooltipValue = "";

		// vid
		$this->vid->LinkCustomAttributes = "";
		$this->vid->HrefValue = "";
		$this->vid->TooltipValue = "";

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

		// Services
		$this->Services->EditAttrs["class"] = "form-control";
		$this->Services->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Services->CurrentValue = HtmlDecode($this->Services->CurrentValue);
		$this->Services->EditValue = $this->Services->CurrentValue;
		$this->Services->PlaceHolder = RemoveHtml($this->Services->caption());

		// amount
		$this->amount->EditAttrs["class"] = "form-control";
		$this->amount->EditCustomAttributes = "";
		$this->amount->EditValue = $this->amount->CurrentValue;
		$this->amount->PlaceHolder = RemoveHtml($this->amount->caption());
		if (strval($this->amount->EditValue) <> "" && is_numeric($this->amount->EditValue))
			$this->amount->EditValue = FormatNumber($this->amount->EditValue, -2, -2, -2, -2);

		// SubTotal
		$this->SubTotal->EditAttrs["class"] = "form-control";
		$this->SubTotal->EditCustomAttributes = "";
		$this->SubTotal->EditValue = $this->SubTotal->CurrentValue;
		$this->SubTotal->PlaceHolder = RemoveHtml($this->SubTotal->caption());
		if (strval($this->SubTotal->EditValue) <> "" && is_numeric($this->SubTotal->EditValue))
			$this->SubTotal->EditValue = FormatNumber($this->SubTotal->EditValue, -2, -2, -2, -2);

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
		$this->createddatetime->EditValue = FormatDateTime($this->createddatetime->CurrentValue, 8);
		$this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

		// createdDate
		$this->createdDate->EditAttrs["class"] = "form-control";
		$this->createdDate->EditCustomAttributes = "";
		if ($this->createdDate->getSessionValue() <> "") {
			$this->createdDate->CurrentValue = $this->createdDate->getSessionValue();
		$this->createdDate->ViewValue = $this->createdDate->CurrentValue;
		$this->createdDate->ViewValue = FormatDateTime($this->createdDate->ViewValue, 7);
		$this->createdDate->ViewCustomAttributes = "";
		} else {
		$this->createdDate->EditValue = FormatDateTime($this->createdDate->CurrentValue, 7);
		$this->createdDate->PlaceHolder = RemoveHtml($this->createdDate->caption());
		}

		// DrName
		$this->DrName->EditAttrs["class"] = "form-control";
		$this->DrName->EditCustomAttributes = "";

		// DRDepartment
		$this->DRDepartment->EditAttrs["class"] = "form-control";
		$this->DRDepartment->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->DRDepartment->CurrentValue = HtmlDecode($this->DRDepartment->CurrentValue);
		$this->DRDepartment->EditValue = $this->DRDepartment->CurrentValue;
		$this->DRDepartment->PlaceHolder = RemoveHtml($this->DRDepartment->caption());

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

		// CODE
		$this->CODE->EditAttrs["class"] = "form-control";
		$this->CODE->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->CODE->CurrentValue = HtmlDecode($this->CODE->CurrentValue);
		$this->CODE->EditValue = $this->CODE->CurrentValue;
		$this->CODE->PlaceHolder = RemoveHtml($this->CODE->caption());

		// SERVICE
		$this->SERVICE->EditAttrs["class"] = "form-control";
		$this->SERVICE->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->SERVICE->CurrentValue = HtmlDecode($this->SERVICE->CurrentValue);
		$this->SERVICE->EditValue = $this->SERVICE->CurrentValue;
		$this->SERVICE->PlaceHolder = RemoveHtml($this->SERVICE->caption());

		// SERVICE_TYPE
		$this->SERVICE_TYPE->EditAttrs["class"] = "form-control";
		$this->SERVICE_TYPE->EditCustomAttributes = "";
		if ($this->SERVICE_TYPE->getSessionValue() <> "") {
			$this->SERVICE_TYPE->CurrentValue = $this->SERVICE_TYPE->getSessionValue();
		$this->SERVICE_TYPE->ViewValue = $this->SERVICE_TYPE->CurrentValue;
		$this->SERVICE_TYPE->ViewCustomAttributes = "";
		} else {
		if (REMOVE_XSS)
			$this->SERVICE_TYPE->CurrentValue = HtmlDecode($this->SERVICE_TYPE->CurrentValue);
		$this->SERVICE_TYPE->EditValue = $this->SERVICE_TYPE->CurrentValue;
		$this->SERVICE_TYPE->PlaceHolder = RemoveHtml($this->SERVICE_TYPE->caption());
		}

		// DEPARTMENT
		$this->DEPARTMENT->EditAttrs["class"] = "form-control";
		$this->DEPARTMENT->EditCustomAttributes = "";
		if ($this->DEPARTMENT->getSessionValue() <> "") {
			$this->DEPARTMENT->CurrentValue = $this->DEPARTMENT->getSessionValue();
		$this->DEPARTMENT->ViewValue = $this->DEPARTMENT->CurrentValue;
		$this->DEPARTMENT->ViewCustomAttributes = "";
		} else {
		if (REMOVE_XSS)
			$this->DEPARTMENT->CurrentValue = HtmlDecode($this->DEPARTMENT->CurrentValue);
		$this->DEPARTMENT->EditValue = $this->DEPARTMENT->CurrentValue;
		$this->DEPARTMENT->PlaceHolder = RemoveHtml($this->DEPARTMENT->caption());
		}

		// HospID
		$this->HospID->EditAttrs["class"] = "form-control";
		$this->HospID->EditCustomAttributes = "";
		if ($this->HospID->getSessionValue() <> "") {
			$this->HospID->CurrentValue = $this->HospID->getSessionValue();
		$this->HospID->ViewValue = $this->HospID->CurrentValue;
		$curVal = strval($this->HospID->CurrentValue);
		if ($curVal <> "") {
			$this->HospID->ViewValue = $this->HospID->lookupCacheOption($curVal);
			if ($this->HospID->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->HospID->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->HospID->ViewValue = $this->HospID->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->HospID->ViewValue = $this->HospID->CurrentValue;
				}
			}
		} else {
			$this->HospID->ViewValue = NULL;
		}
		$this->HospID->ViewCustomAttributes = "";
		} else {
		$this->HospID->EditValue = $this->HospID->CurrentValue;
		$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());
		}

		// vid
		$this->vid->EditAttrs["class"] = "form-control";
		$this->vid->EditCustomAttributes = "";
		$this->vid->EditValue = $this->vid->CurrentValue;
		$this->vid->EditValue = FormatNumber($this->vid->EditValue, 0, -2, -2, -2);
		$this->vid->ViewCustomAttributes = "";

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	public function aggregateListRowValues()
	{
			$this->Services->Count++; // Increment count
			if (is_numeric($this->amount->CurrentValue))
				$this->amount->Total += $this->amount->CurrentValue; // Accumulate total
			if (is_numeric($this->SubTotal->CurrentValue))
				$this->SubTotal->Total += $this->SubTotal->CurrentValue; // Accumulate total
	}

	// Aggregate list row (for rendering)
	public function aggregateListRow()
	{
			$this->Services->CurrentValue = $this->Services->Count;
			$this->Services->ViewValue = $this->Services->CurrentValue;
			$this->Services->ViewCustomAttributes = "";
			$this->Services->HrefValue = ""; // Clear href value
			$this->amount->CurrentValue = $this->amount->Total;
			$this->amount->ViewValue = $this->amount->CurrentValue;
			$this->amount->ViewValue = FormatNumber($this->amount->ViewValue, 2, -2, -2, -2);
			$this->amount->ViewCustomAttributes = "";
			$this->amount->HrefValue = ""; // Clear href value
			$this->SubTotal->CurrentValue = $this->SubTotal->Total;
			$this->SubTotal->ViewValue = $this->SubTotal->CurrentValue;
			$this->SubTotal->ViewValue = FormatNumber($this->SubTotal->ViewValue, 2, -2, -2, -2);
			$this->SubTotal->ViewCustomAttributes = "";
			$this->SubTotal->HrefValue = ""; // Clear href value

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
					$doc->exportCaption($this->PatientId);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->Services);
					$doc->exportCaption($this->amount);
					$doc->exportCaption($this->SubTotal);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->createdDate);
					$doc->exportCaption($this->DrName);
					$doc->exportCaption($this->DRDepartment);
					$doc->exportCaption($this->ItemCode);
					$doc->exportCaption($this->DEptCd);
					$doc->exportCaption($this->CODE);
					$doc->exportCaption($this->SERVICE);
					$doc->exportCaption($this->SERVICE_TYPE);
					$doc->exportCaption($this->DEPARTMENT);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->vid);
				} else {
					$doc->exportCaption($this->PatientId);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->Services);
					$doc->exportCaption($this->amount);
					$doc->exportCaption($this->SubTotal);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->createdDate);
					$doc->exportCaption($this->DrName);
					$doc->exportCaption($this->DRDepartment);
					$doc->exportCaption($this->ItemCode);
					$doc->exportCaption($this->DEptCd);
					$doc->exportCaption($this->CODE);
					$doc->exportCaption($this->SERVICE);
					$doc->exportCaption($this->SERVICE_TYPE);
					$doc->exportCaption($this->DEPARTMENT);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->vid);
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
						$doc->exportField($this->PatientId);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->Services);
						$doc->exportField($this->amount);
						$doc->exportField($this->SubTotal);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->createdDate);
						$doc->exportField($this->DrName);
						$doc->exportField($this->DRDepartment);
						$doc->exportField($this->ItemCode);
						$doc->exportField($this->DEptCd);
						$doc->exportField($this->CODE);
						$doc->exportField($this->SERVICE);
						$doc->exportField($this->SERVICE_TYPE);
						$doc->exportField($this->DEPARTMENT);
						$doc->exportField($this->HospID);
						$doc->exportField($this->vid);
					} else {
						$doc->exportField($this->PatientId);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->Services);
						$doc->exportField($this->amount);
						$doc->exportField($this->SubTotal);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->createdDate);
						$doc->exportField($this->DrName);
						$doc->exportField($this->DRDepartment);
						$doc->exportField($this->ItemCode);
						$doc->exportField($this->DEptCd);
						$doc->exportField($this->CODE);
						$doc->exportField($this->SERVICE);
						$doc->exportField($this->SERVICE_TYPE);
						$doc->exportField($this->DEPARTMENT);
						$doc->exportField($this->HospID);
						$doc->exportField($this->vid);
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
				$doc->exportAggregate($this->PatientId, '');
				$doc->exportAggregate($this->PatientName, '');
				$doc->exportAggregate($this->Services, 'COUNT');
				$doc->exportAggregate($this->amount, 'TOTAL');
				$doc->exportAggregate($this->SubTotal, 'TOTAL');
				$doc->exportAggregate($this->createdby, '');
				$doc->exportAggregate($this->createddatetime, '');
				$doc->exportAggregate($this->createdDate, '');
				$doc->exportAggregate($this->DrName, '');
				$doc->exportAggregate($this->DRDepartment, '');
				$doc->exportAggregate($this->ItemCode, '');
				$doc->exportAggregate($this->DEptCd, '');
				$doc->exportAggregate($this->CODE, '');
				$doc->exportAggregate($this->SERVICE, '');
				$doc->exportAggregate($this->SERVICE_TYPE, '');
				$doc->exportAggregate($this->DEPARTMENT, '');
				$doc->exportAggregate($this->HospID, '');
				$doc->exportAggregate($this->vid, '');
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