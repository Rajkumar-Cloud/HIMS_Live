<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for pharmacy_billing_transfer
 */
class pharmacy_billing_transfer extends DbTable
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
	public $PharID;
	public $pharmacy;
	public $Details;
	public $createdby;
	public $createddatetime;
	public $modifiedby;
	public $modifieddatetime;
	public $HospID;
	public $RIDNO;
	public $TidNo;
	public $CId;
	public $PatId;
	public $DrID;
	public $BillStatus;
	public $transfer;
	public $street;
	public $area;
	public $town;
	public $province;
	public $postal_code;
	public $phone_no;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'pharmacy_billing_transfer';
		$this->TableName = 'pharmacy_billing_transfer';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`pharmacy_billing_transfer`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = TRUE; // Allow detail add
		$this->DetailEdit = TRUE; // Allow detail edit
		$this->DetailView = TRUE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = 0; // User ID Allow
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// id
		$this->id = new DbField('pharmacy_billing_transfer', 'pharmacy_billing_transfer', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->IsForeignKey = TRUE; // Foreign key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// PharID
		$this->PharID = new DbField('pharmacy_billing_transfer', 'pharmacy_billing_transfer', 'x_PharID', 'PharID', '`PharID`', '`PharID`', 3, -1, FALSE, '`PharID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PharID->Sortable = TRUE; // Allow sort
		$this->PharID->Lookup = new Lookup('PharID', 'hospital_pharmacy', FALSE, 'id', ["pharmacy","","",""], [], [], [], [], [], [], '', '');
		$this->PharID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['PharID'] = &$this->PharID;

		// pharmacy
		$this->pharmacy = new DbField('pharmacy_billing_transfer', 'pharmacy_billing_transfer', 'x_pharmacy', 'pharmacy', '`pharmacy`', '`pharmacy`', 200, -1, FALSE, '`pharmacy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->pharmacy->Required = TRUE; // Required field
		$this->pharmacy->Sortable = TRUE; // Allow sort
		$this->fields['pharmacy'] = &$this->pharmacy;

		// Details
		$this->Details = new DbField('pharmacy_billing_transfer', 'pharmacy_billing_transfer', 'x_Details', 'Details', '`Details`', '`Details`', 200, -1, FALSE, '`Details`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Details->Sortable = TRUE; // Allow sort
		$this->fields['Details'] = &$this->Details;

		// createdby
		$this->createdby = new DbField('pharmacy_billing_transfer', 'pharmacy_billing_transfer', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 200, -1, FALSE, '`createdby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdby->Sortable = TRUE; // Allow sort
		$this->fields['createdby'] = &$this->createdby;

		// createddatetime
		$this->createddatetime = new DbField('pharmacy_billing_transfer', 'pharmacy_billing_transfer', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike('`createddatetime`', 0, "DB"), 135, 0, FALSE, '`createddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = TRUE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['createddatetime'] = &$this->createddatetime;

		// modifiedby
		$this->modifiedby = new DbField('pharmacy_billing_transfer', 'pharmacy_billing_transfer', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 200, -1, FALSE, '`modifiedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifiedby->Sortable = TRUE; // Allow sort
		$this->fields['modifiedby'] = &$this->modifiedby;

		// modifieddatetime
		$this->modifieddatetime = new DbField('pharmacy_billing_transfer', 'pharmacy_billing_transfer', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike('`modifieddatetime`', 0, "DB"), 135, 0, FALSE, '`modifieddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifieddatetime->Sortable = TRUE; // Allow sort
		$this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['modifieddatetime'] = &$this->modifieddatetime;

		// HospID
		$this->HospID = new DbField('pharmacy_billing_transfer', 'pharmacy_billing_transfer', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HospID'] = &$this->HospID;

		// RIDNO
		$this->RIDNO = new DbField('pharmacy_billing_transfer', 'pharmacy_billing_transfer', 'x_RIDNO', 'RIDNO', '`RIDNO`', '`RIDNO`', 3, -1, FALSE, '`RIDNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RIDNO->Sortable = TRUE; // Allow sort
		$this->RIDNO->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['RIDNO'] = &$this->RIDNO;

		// TidNo
		$this->TidNo = new DbField('pharmacy_billing_transfer', 'pharmacy_billing_transfer', 'x_TidNo', 'TidNo', '`TidNo`', '`TidNo`', 3, -1, FALSE, '`TidNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TidNo->Sortable = TRUE; // Allow sort
		$this->TidNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['TidNo'] = &$this->TidNo;

		// CId
		$this->CId = new DbField('pharmacy_billing_transfer', 'pharmacy_billing_transfer', 'x_CId', 'CId', '`CId`', '`CId`', 3, -1, FALSE, '`CId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CId->Sortable = TRUE; // Allow sort
		$this->CId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['CId'] = &$this->CId;

		// PatId
		$this->PatId = new DbField('pharmacy_billing_transfer', 'pharmacy_billing_transfer', 'x_PatId', 'PatId', '`PatId`', '`PatId`', 3, -1, FALSE, '`PatId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatId->Sortable = TRUE; // Allow sort
		$this->PatId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['PatId'] = &$this->PatId;

		// DrID
		$this->DrID = new DbField('pharmacy_billing_transfer', 'pharmacy_billing_transfer', 'x_DrID', 'DrID', '`DrID`', '`DrID`', 3, -1, FALSE, '`DrID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DrID->Sortable = TRUE; // Allow sort
		$this->DrID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['DrID'] = &$this->DrID;

		// BillStatus
		$this->BillStatus = new DbField('pharmacy_billing_transfer', 'pharmacy_billing_transfer', 'x_BillStatus', 'BillStatus', '`BillStatus`', '`BillStatus`', 3, -1, FALSE, '`BillStatus`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BillStatus->Sortable = TRUE; // Allow sort
		$this->BillStatus->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['BillStatus'] = &$this->BillStatus;

		// transfer
		$this->transfer = new DbField('pharmacy_billing_transfer', 'pharmacy_billing_transfer', 'x_transfer', 'transfer', '`transfer`', '`transfer`', 3, -1, FALSE, '`transfer`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->transfer->Required = TRUE; // Required field
		$this->transfer->Sortable = TRUE; // Allow sort
		$this->transfer->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->transfer->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->transfer->Lookup = new Lookup('transfer', 'hospital_pharmacy', FALSE, 'id', ["pharmacy","","",""], [], [], [], [], ["pharmacy","street","area","town","province","postal_code","phone_no"], ["x_pharmacy","x_street","x_area","x_town","x_province","x_postal_code","x_phone_no"], '', '');
		$this->transfer->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['transfer'] = &$this->transfer;

		// street
		$this->street = new DbField('pharmacy_billing_transfer', 'pharmacy_billing_transfer', 'x_street', 'street', '`street`', '`street`', 201, -1, FALSE, '`street`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->street->Sortable = TRUE; // Allow sort
		$this->fields['street'] = &$this->street;

		// area
		$this->area = new DbField('pharmacy_billing_transfer', 'pharmacy_billing_transfer', 'x_area', 'area', '`area`', '`area`', 201, -1, FALSE, '`area`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->area->Sortable = TRUE; // Allow sort
		$this->fields['area'] = &$this->area;

		// town
		$this->town = new DbField('pharmacy_billing_transfer', 'pharmacy_billing_transfer', 'x_town', 'town', '`town`', '`town`', 201, -1, FALSE, '`town`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->town->Sortable = TRUE; // Allow sort
		$this->fields['town'] = &$this->town;

		// province
		$this->province = new DbField('pharmacy_billing_transfer', 'pharmacy_billing_transfer', 'x_province', 'province', '`province`', '`province`', 200, -1, FALSE, '`province`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->province->Sortable = TRUE; // Allow sort
		$this->fields['province'] = &$this->province;

		// postal_code
		$this->postal_code = new DbField('pharmacy_billing_transfer', 'pharmacy_billing_transfer', 'x_postal_code', 'postal_code', '`postal_code`', '`postal_code`', 200, -1, FALSE, '`postal_code`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->postal_code->Sortable = TRUE; // Allow sort
		$this->fields['postal_code'] = &$this->postal_code;

		// phone_no
		$this->phone_no = new DbField('pharmacy_billing_transfer', 'pharmacy_billing_transfer', 'x_phone_no', 'phone_no', '`phone_no`', '`phone_no`', 200, -1, FALSE, '`phone_no`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->phone_no->Sortable = TRUE; // Allow sort
		$this->fields['phone_no'] = &$this->phone_no;
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
		if ($this->getCurrentDetailTable() == "view_pharmacytransfer") {
			$detailUrl = $GLOBALS["view_pharmacytransfer"]->getListUrl() . "?" . TABLE_SHOW_MASTER . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
		}
		if ($detailUrl == "")
			$detailUrl = "pharmacy_billing_transferlist.php";
		return $detailUrl;
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`pharmacy_billing_transfer`";
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
		$this->TableFilter = "`HospID`='".HospitalID()."' and `PharID` ='".PharmacyID()."' ";
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
		return ($this->SqlOrderBy <> "") ? $this->SqlOrderBy : "`id` DESC";
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
		$this->PharID->DbValue = $row['PharID'];
		$this->pharmacy->DbValue = $row['pharmacy'];
		$this->Details->DbValue = $row['Details'];
		$this->createdby->DbValue = $row['createdby'];
		$this->createddatetime->DbValue = $row['createddatetime'];
		$this->modifiedby->DbValue = $row['modifiedby'];
		$this->modifieddatetime->DbValue = $row['modifieddatetime'];
		$this->HospID->DbValue = $row['HospID'];
		$this->RIDNO->DbValue = $row['RIDNO'];
		$this->TidNo->DbValue = $row['TidNo'];
		$this->CId->DbValue = $row['CId'];
		$this->PatId->DbValue = $row['PatId'];
		$this->DrID->DbValue = $row['DrID'];
		$this->BillStatus->DbValue = $row['BillStatus'];
		$this->transfer->DbValue = $row['transfer'];
		$this->street->DbValue = $row['street'];
		$this->area->DbValue = $row['area'];
		$this->town->DbValue = $row['town'];
		$this->province->DbValue = $row['province'];
		$this->postal_code->DbValue = $row['postal_code'];
		$this->phone_no->DbValue = $row['phone_no'];
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
			return "pharmacy_billing_transferlist.php";
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
		if ($pageName == "pharmacy_billing_transferview.php")
			return $Language->phrase("View");
		elseif ($pageName == "pharmacy_billing_transferedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "pharmacy_billing_transferadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "pharmacy_billing_transferlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("pharmacy_billing_transferview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("pharmacy_billing_transferview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "pharmacy_billing_transferadd.php?" . $this->getUrlParm($parm);
		else
			$url = "pharmacy_billing_transferadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("pharmacy_billing_transferedit.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("pharmacy_billing_transferedit.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
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
			$url = $this->keyUrl("pharmacy_billing_transferadd.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("pharmacy_billing_transferadd.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
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
		return $this->keyUrl("pharmacy_billing_transferdelete.php", $this->getUrlParm());
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
		$this->PharID->setDbValue($rs->fields('PharID'));
		$this->pharmacy->setDbValue($rs->fields('pharmacy'));
		$this->Details->setDbValue($rs->fields('Details'));
		$this->createdby->setDbValue($rs->fields('createdby'));
		$this->createddatetime->setDbValue($rs->fields('createddatetime'));
		$this->modifiedby->setDbValue($rs->fields('modifiedby'));
		$this->modifieddatetime->setDbValue($rs->fields('modifieddatetime'));
		$this->HospID->setDbValue($rs->fields('HospID'));
		$this->RIDNO->setDbValue($rs->fields('RIDNO'));
		$this->TidNo->setDbValue($rs->fields('TidNo'));
		$this->CId->setDbValue($rs->fields('CId'));
		$this->PatId->setDbValue($rs->fields('PatId'));
		$this->DrID->setDbValue($rs->fields('DrID'));
		$this->BillStatus->setDbValue($rs->fields('BillStatus'));
		$this->transfer->setDbValue($rs->fields('transfer'));
		$this->street->setDbValue($rs->fields('street'));
		$this->area->setDbValue($rs->fields('area'));
		$this->town->setDbValue($rs->fields('town'));
		$this->province->setDbValue($rs->fields('province'));
		$this->postal_code->setDbValue($rs->fields('postal_code'));
		$this->phone_no->setDbValue($rs->fields('phone_no'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// PharID
		// pharmacy
		// Details
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// HospID
		// RIDNO
		// TidNo
		// CId
		// PatId
		// DrID
		// BillStatus
		// transfer
		// street
		// area
		// town
		// province
		// postal_code
		// phone_no
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// PharID
		$this->PharID->ViewValue = $this->PharID->CurrentValue;
		$curVal = strval($this->PharID->CurrentValue);
		if ($curVal <> "") {
			$this->PharID->ViewValue = $this->PharID->lookupCacheOption($curVal);
			if ($this->PharID->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->PharID->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->PharID->ViewValue = $this->PharID->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->PharID->ViewValue = $this->PharID->CurrentValue;
				}
			}
		} else {
			$this->PharID->ViewValue = NULL;
		}
		$this->PharID->ViewCustomAttributes = "";

		// pharmacy
		$this->pharmacy->ViewValue = $this->pharmacy->CurrentValue;
		$this->pharmacy->ViewCustomAttributes = "";

		// Details
		$this->Details->ViewValue = $this->Details->CurrentValue;
		$this->Details->ViewCustomAttributes = "";

		// createdby
		$this->createdby->ViewValue = $this->createdby->CurrentValue;
		$this->createdby->ViewCustomAttributes = "";

		// createddatetime
		$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
		$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
		$this->createddatetime->ViewCustomAttributes = "";

		// modifiedby
		$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
		$this->modifiedby->ViewCustomAttributes = "";

		// modifieddatetime
		$this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
		$this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
		$this->modifieddatetime->ViewCustomAttributes = "";

		// HospID
		$this->HospID->ViewValue = $this->HospID->CurrentValue;
		$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
		$this->HospID->ViewCustomAttributes = "";

		// RIDNO
		$this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
		$this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
		$this->RIDNO->ViewCustomAttributes = "";

		// TidNo
		$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
		$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
		$this->TidNo->ViewCustomAttributes = "";

		// CId
		$this->CId->ViewValue = $this->CId->CurrentValue;
		$this->CId->ViewValue = FormatNumber($this->CId->ViewValue, 0, -2, -2, -2);
		$this->CId->ViewCustomAttributes = "";

		// PatId
		$this->PatId->ViewValue = $this->PatId->CurrentValue;
		$this->PatId->ViewValue = FormatNumber($this->PatId->ViewValue, 0, -2, -2, -2);
		$this->PatId->ViewCustomAttributes = "";

		// DrID
		$this->DrID->ViewValue = $this->DrID->CurrentValue;
		$this->DrID->ViewValue = FormatNumber($this->DrID->ViewValue, 0, -2, -2, -2);
		$this->DrID->ViewCustomAttributes = "";

		// BillStatus
		$this->BillStatus->ViewValue = $this->BillStatus->CurrentValue;
		$this->BillStatus->ViewValue = FormatNumber($this->BillStatus->ViewValue, 0, -2, -2, -2);
		$this->BillStatus->ViewCustomAttributes = "";

		// transfer
		$curVal = strval($this->transfer->CurrentValue);
		if ($curVal <> "") {
			$this->transfer->ViewValue = $this->transfer->lookupCacheOption($curVal);
			if ($this->transfer->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$lookupFilter = function() {
					return "`HospId`='".HospitalID()."'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->transfer->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->transfer->ViewValue = $this->transfer->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->transfer->ViewValue = $this->transfer->CurrentValue;
				}
			}
		} else {
			$this->transfer->ViewValue = NULL;
		}
		$this->transfer->ViewCustomAttributes = "";

		// street
		$this->street->ViewValue = $this->street->CurrentValue;
		$this->street->ViewCustomAttributes = "";

		// area
		$this->area->ViewValue = $this->area->CurrentValue;
		$this->area->ViewCustomAttributes = "";

		// town
		$this->town->ViewValue = $this->town->CurrentValue;
		$this->town->ViewCustomAttributes = "";

		// province
		$this->province->ViewValue = $this->province->CurrentValue;
		$this->province->ViewCustomAttributes = "";

		// postal_code
		$this->postal_code->ViewValue = $this->postal_code->CurrentValue;
		$this->postal_code->ViewCustomAttributes = "";

		// phone_no
		$this->phone_no->ViewValue = $this->phone_no->CurrentValue;
		$this->phone_no->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// PharID
		$this->PharID->LinkCustomAttributes = "";
		$this->PharID->HrefValue = "";
		$this->PharID->TooltipValue = "";

		// pharmacy
		$this->pharmacy->LinkCustomAttributes = "";
		$this->pharmacy->HrefValue = "";
		$this->pharmacy->TooltipValue = "";

		// Details
		$this->Details->LinkCustomAttributes = "";
		$this->Details->HrefValue = "";
		$this->Details->TooltipValue = "";

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

		// HospID
		$this->HospID->LinkCustomAttributes = "";
		$this->HospID->HrefValue = "";
		$this->HospID->TooltipValue = "";

		// RIDNO
		$this->RIDNO->LinkCustomAttributes = "";
		$this->RIDNO->HrefValue = "";
		$this->RIDNO->TooltipValue = "";

		// TidNo
		$this->TidNo->LinkCustomAttributes = "";
		$this->TidNo->HrefValue = "";
		$this->TidNo->TooltipValue = "";

		// CId
		$this->CId->LinkCustomAttributes = "";
		$this->CId->HrefValue = "";
		$this->CId->TooltipValue = "";

		// PatId
		$this->PatId->LinkCustomAttributes = "";
		$this->PatId->HrefValue = "";
		$this->PatId->TooltipValue = "";

		// DrID
		$this->DrID->LinkCustomAttributes = "";
		$this->DrID->HrefValue = "";
		$this->DrID->TooltipValue = "";

		// BillStatus
		$this->BillStatus->LinkCustomAttributes = "";
		$this->BillStatus->HrefValue = "";
		$this->BillStatus->TooltipValue = "";

		// transfer
		$this->transfer->LinkCustomAttributes = "";
		$this->transfer->HrefValue = "";
		$this->transfer->TooltipValue = "";

		// street
		$this->street->LinkCustomAttributes = "";
		$this->street->HrefValue = "";
		$this->street->TooltipValue = "";

		// area
		$this->area->LinkCustomAttributes = "";
		$this->area->HrefValue = "";
		$this->area->TooltipValue = "";

		// town
		$this->town->LinkCustomAttributes = "";
		$this->town->HrefValue = "";
		$this->town->TooltipValue = "";

		// province
		$this->province->LinkCustomAttributes = "";
		$this->province->HrefValue = "";
		$this->province->TooltipValue = "";

		// postal_code
		$this->postal_code->LinkCustomAttributes = "";
		$this->postal_code->HrefValue = "";
		$this->postal_code->TooltipValue = "";

		// phone_no
		$this->phone_no->LinkCustomAttributes = "";
		$this->phone_no->HrefValue = "";
		$this->phone_no->TooltipValue = "";

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

		// PharID
		// pharmacy

		$this->pharmacy->EditAttrs["class"] = "form-control";
		$this->pharmacy->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->pharmacy->CurrentValue = HtmlDecode($this->pharmacy->CurrentValue);
		$this->pharmacy->EditValue = $this->pharmacy->CurrentValue;
		$this->pharmacy->PlaceHolder = RemoveHtml($this->pharmacy->caption());

		// Details
		$this->Details->EditAttrs["class"] = "form-control";
		$this->Details->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Details->CurrentValue = HtmlDecode($this->Details->CurrentValue);
		$this->Details->EditValue = $this->Details->CurrentValue;
		$this->Details->PlaceHolder = RemoveHtml($this->Details->caption());

		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// HospID
		// RIDNO

		$this->RIDNO->EditAttrs["class"] = "form-control";
		$this->RIDNO->EditCustomAttributes = "";
		$this->RIDNO->EditValue = $this->RIDNO->CurrentValue;
		$this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());

		// TidNo
		$this->TidNo->EditAttrs["class"] = "form-control";
		$this->TidNo->EditCustomAttributes = "";
		$this->TidNo->EditValue = $this->TidNo->CurrentValue;
		$this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

		// CId
		$this->CId->EditAttrs["class"] = "form-control";
		$this->CId->EditCustomAttributes = "";
		$this->CId->EditValue = $this->CId->CurrentValue;
		$this->CId->PlaceHolder = RemoveHtml($this->CId->caption());

		// PatId
		$this->PatId->EditAttrs["class"] = "form-control";
		$this->PatId->EditCustomAttributes = "";
		$this->PatId->EditValue = $this->PatId->CurrentValue;
		$this->PatId->PlaceHolder = RemoveHtml($this->PatId->caption());

		// DrID
		$this->DrID->EditAttrs["class"] = "form-control";
		$this->DrID->EditCustomAttributes = "";
		$this->DrID->EditValue = $this->DrID->CurrentValue;
		$this->DrID->PlaceHolder = RemoveHtml($this->DrID->caption());

		// BillStatus
		$this->BillStatus->EditAttrs["class"] = "form-control";
		$this->BillStatus->EditCustomAttributes = "";
		$this->BillStatus->EditValue = $this->BillStatus->CurrentValue;
		$this->BillStatus->PlaceHolder = RemoveHtml($this->BillStatus->caption());

		// transfer
		$this->transfer->EditAttrs["class"] = "form-control";
		$this->transfer->EditCustomAttributes = "";

		// street
		$this->street->EditAttrs["class"] = "form-control";
		$this->street->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->street->CurrentValue = HtmlDecode($this->street->CurrentValue);
		$this->street->EditValue = $this->street->CurrentValue;
		$this->street->PlaceHolder = RemoveHtml($this->street->caption());

		// area
		$this->area->EditAttrs["class"] = "form-control";
		$this->area->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->area->CurrentValue = HtmlDecode($this->area->CurrentValue);
		$this->area->EditValue = $this->area->CurrentValue;
		$this->area->PlaceHolder = RemoveHtml($this->area->caption());

		// town
		$this->town->EditAttrs["class"] = "form-control";
		$this->town->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->town->CurrentValue = HtmlDecode($this->town->CurrentValue);
		$this->town->EditValue = $this->town->CurrentValue;
		$this->town->PlaceHolder = RemoveHtml($this->town->caption());

		// province
		$this->province->EditAttrs["class"] = "form-control";
		$this->province->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->province->CurrentValue = HtmlDecode($this->province->CurrentValue);
		$this->province->EditValue = $this->province->CurrentValue;
		$this->province->PlaceHolder = RemoveHtml($this->province->caption());

		// postal_code
		$this->postal_code->EditAttrs["class"] = "form-control";
		$this->postal_code->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->postal_code->CurrentValue = HtmlDecode($this->postal_code->CurrentValue);
		$this->postal_code->EditValue = $this->postal_code->CurrentValue;
		$this->postal_code->PlaceHolder = RemoveHtml($this->postal_code->caption());

		// phone_no
		$this->phone_no->EditAttrs["class"] = "form-control";
		$this->phone_no->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->phone_no->CurrentValue = HtmlDecode($this->phone_no->CurrentValue);
		$this->phone_no->EditValue = $this->phone_no->CurrentValue;
		$this->phone_no->PlaceHolder = RemoveHtml($this->phone_no->caption());

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
					$doc->exportCaption($this->PharID);
					$doc->exportCaption($this->pharmacy);
					$doc->exportCaption($this->Details);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->RIDNO);
					$doc->exportCaption($this->TidNo);
					$doc->exportCaption($this->CId);
					$doc->exportCaption($this->PatId);
					$doc->exportCaption($this->DrID);
					$doc->exportCaption($this->BillStatus);
					$doc->exportCaption($this->transfer);
					$doc->exportCaption($this->street);
					$doc->exportCaption($this->area);
					$doc->exportCaption($this->town);
					$doc->exportCaption($this->province);
					$doc->exportCaption($this->postal_code);
					$doc->exportCaption($this->phone_no);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->PharID);
					$doc->exportCaption($this->pharmacy);
					$doc->exportCaption($this->Details);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->RIDNO);
					$doc->exportCaption($this->TidNo);
					$doc->exportCaption($this->CId);
					$doc->exportCaption($this->PatId);
					$doc->exportCaption($this->DrID);
					$doc->exportCaption($this->BillStatus);
					$doc->exportCaption($this->transfer);
					$doc->exportCaption($this->street);
					$doc->exportCaption($this->area);
					$doc->exportCaption($this->town);
					$doc->exportCaption($this->province);
					$doc->exportCaption($this->postal_code);
					$doc->exportCaption($this->phone_no);
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
						$doc->exportField($this->PharID);
						$doc->exportField($this->pharmacy);
						$doc->exportField($this->Details);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
						$doc->exportField($this->HospID);
						$doc->exportField($this->RIDNO);
						$doc->exportField($this->TidNo);
						$doc->exportField($this->CId);
						$doc->exportField($this->PatId);
						$doc->exportField($this->DrID);
						$doc->exportField($this->BillStatus);
						$doc->exportField($this->transfer);
						$doc->exportField($this->street);
						$doc->exportField($this->area);
						$doc->exportField($this->town);
						$doc->exportField($this->province);
						$doc->exportField($this->postal_code);
						$doc->exportField($this->phone_no);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->PharID);
						$doc->exportField($this->pharmacy);
						$doc->exportField($this->Details);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
						$doc->exportField($this->HospID);
						$doc->exportField($this->RIDNO);
						$doc->exportField($this->TidNo);
						$doc->exportField($this->CId);
						$doc->exportField($this->PatId);
						$doc->exportField($this->DrID);
						$doc->exportField($this->BillStatus);
						$doc->exportField($this->transfer);
						$doc->exportField($this->street);
						$doc->exportField($this->area);
						$doc->exportField($this->town);
						$doc->exportField($this->province);
						$doc->exportField($this->postal_code);
						$doc->exportField($this->phone_no);
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