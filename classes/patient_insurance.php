<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for patient_insurance
 */
class patient_insurance extends DbTable
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
	public $Company;
	public $AddressInsuranceCarierName;
	public $ContactName;
	public $ContactMobile;
	public $PolicyType;
	public $PolicyName;
	public $PolicyNo;
	public $PolicyAmount;
	public $RefLetterNo;
	public $ReferenceBy;
	public $ReferenceDate;
	public $DocumentAttatch;
	public $createdby;
	public $createddatetime;
	public $modifiedby;
	public $modifieddatetime;
	public $mrnno;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'patient_insurance';
		$this->TableName = 'patient_insurance';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`patient_insurance`";
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
		$this->id = new DbField('patient_insurance', 'patient_insurance', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// Reception
		$this->Reception = new DbField('patient_insurance', 'patient_insurance', 'x_Reception', 'Reception', '`Reception`', '`Reception`', 3, -1, FALSE, '`Reception`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Reception->IsForeignKey = TRUE; // Foreign key field
		$this->Reception->Sortable = TRUE; // Allow sort
		$this->Reception->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Reception'] = &$this->Reception;

		// PatientId
		$this->PatientId = new DbField('patient_insurance', 'patient_insurance', 'x_PatientId', 'PatientId', '`PatientId`', '`PatientId`', 3, -1, FALSE, '`PatientId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientId->IsForeignKey = TRUE; // Foreign key field
		$this->PatientId->Sortable = TRUE; // Allow sort
		$this->PatientId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['PatientId'] = &$this->PatientId;

		// PatientName
		$this->PatientName = new DbField('patient_insurance', 'patient_insurance', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, -1, FALSE, '`PatientName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientName->Sortable = TRUE; // Allow sort
		$this->fields['PatientName'] = &$this->PatientName;

		// Company
		$this->Company = new DbField('patient_insurance', 'patient_insurance', 'x_Company', 'Company', '`Company`', '`Company`', 200, -1, FALSE, '`Company`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Company->Sortable = TRUE; // Allow sort
		$this->fields['Company'] = &$this->Company;

		// AddressInsuranceCarierName
		$this->AddressInsuranceCarierName = new DbField('patient_insurance', 'patient_insurance', 'x_AddressInsuranceCarierName', 'AddressInsuranceCarierName', '`AddressInsuranceCarierName`', '`AddressInsuranceCarierName`', 200, -1, FALSE, '`AddressInsuranceCarierName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AddressInsuranceCarierName->Sortable = TRUE; // Allow sort
		$this->fields['AddressInsuranceCarierName'] = &$this->AddressInsuranceCarierName;

		// ContactName
		$this->ContactName = new DbField('patient_insurance', 'patient_insurance', 'x_ContactName', 'ContactName', '`ContactName`', '`ContactName`', 200, -1, FALSE, '`ContactName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ContactName->Sortable = TRUE; // Allow sort
		$this->fields['ContactName'] = &$this->ContactName;

		// ContactMobile
		$this->ContactMobile = new DbField('patient_insurance', 'patient_insurance', 'x_ContactMobile', 'ContactMobile', '`ContactMobile`', '`ContactMobile`', 200, -1, FALSE, '`ContactMobile`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ContactMobile->Sortable = TRUE; // Allow sort
		$this->fields['ContactMobile'] = &$this->ContactMobile;

		// PolicyType
		$this->PolicyType = new DbField('patient_insurance', 'patient_insurance', 'x_PolicyType', 'PolicyType', '`PolicyType`', '`PolicyType`', 200, -1, FALSE, '`PolicyType`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PolicyType->Sortable = TRUE; // Allow sort
		$this->fields['PolicyType'] = &$this->PolicyType;

		// PolicyName
		$this->PolicyName = new DbField('patient_insurance', 'patient_insurance', 'x_PolicyName', 'PolicyName', '`PolicyName`', '`PolicyName`', 200, -1, FALSE, '`PolicyName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PolicyName->Sortable = TRUE; // Allow sort
		$this->fields['PolicyName'] = &$this->PolicyName;

		// PolicyNo
		$this->PolicyNo = new DbField('patient_insurance', 'patient_insurance', 'x_PolicyNo', 'PolicyNo', '`PolicyNo`', '`PolicyNo`', 200, -1, FALSE, '`PolicyNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PolicyNo->Sortable = TRUE; // Allow sort
		$this->fields['PolicyNo'] = &$this->PolicyNo;

		// PolicyAmount
		$this->PolicyAmount = new DbField('patient_insurance', 'patient_insurance', 'x_PolicyAmount', 'PolicyAmount', '`PolicyAmount`', '`PolicyAmount`', 200, -1, FALSE, '`PolicyAmount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PolicyAmount->Sortable = TRUE; // Allow sort
		$this->fields['PolicyAmount'] = &$this->PolicyAmount;

		// RefLetterNo
		$this->RefLetterNo = new DbField('patient_insurance', 'patient_insurance', 'x_RefLetterNo', 'RefLetterNo', '`RefLetterNo`', '`RefLetterNo`', 200, -1, FALSE, '`RefLetterNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RefLetterNo->Sortable = TRUE; // Allow sort
		$this->fields['RefLetterNo'] = &$this->RefLetterNo;

		// ReferenceBy
		$this->ReferenceBy = new DbField('patient_insurance', 'patient_insurance', 'x_ReferenceBy', 'ReferenceBy', '`ReferenceBy`', '`ReferenceBy`', 200, -1, FALSE, '`ReferenceBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReferenceBy->Sortable = TRUE; // Allow sort
		$this->fields['ReferenceBy'] = &$this->ReferenceBy;

		// ReferenceDate
		$this->ReferenceDate = new DbField('patient_insurance', 'patient_insurance', 'x_ReferenceDate', 'ReferenceDate', '`ReferenceDate`', CastDateFieldForLike('`ReferenceDate`', 0, "DB"), 133, 0, FALSE, '`ReferenceDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReferenceDate->Sortable = TRUE; // Allow sort
		$this->ReferenceDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['ReferenceDate'] = &$this->ReferenceDate;

		// DocumentAttatch
		$this->DocumentAttatch = new DbField('patient_insurance', 'patient_insurance', 'x_DocumentAttatch', 'DocumentAttatch', '`DocumentAttatch`', '`DocumentAttatch`', 201, -1, TRUE, '`DocumentAttatch`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'FILE');
		$this->DocumentAttatch->Sortable = TRUE; // Allow sort
		$this->DocumentAttatch->UploadMultiple = TRUE;
		$this->DocumentAttatch->Upload->UploadMultiple = TRUE;
		$this->DocumentAttatch->UploadMaxFileCount = 0;
		$this->fields['DocumentAttatch'] = &$this->DocumentAttatch;

		// createdby
		$this->createdby = new DbField('patient_insurance', 'patient_insurance', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 200, -1, FALSE, '`createdby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdby->Sortable = TRUE; // Allow sort
		$this->fields['createdby'] = &$this->createdby;

		// createddatetime
		$this->createddatetime = new DbField('patient_insurance', 'patient_insurance', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike('`createddatetime`', 0, "DB"), 135, 0, FALSE, '`createddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = TRUE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['createddatetime'] = &$this->createddatetime;

		// modifiedby
		$this->modifiedby = new DbField('patient_insurance', 'patient_insurance', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 200, -1, FALSE, '`modifiedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifiedby->Sortable = TRUE; // Allow sort
		$this->fields['modifiedby'] = &$this->modifiedby;

		// modifieddatetime
		$this->modifieddatetime = new DbField('patient_insurance', 'patient_insurance', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike('`modifieddatetime`', 0, "DB"), 135, 0, FALSE, '`modifieddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifieddatetime->Sortable = TRUE; // Allow sort
		$this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['modifieddatetime'] = &$this->modifieddatetime;

		// mrnno
		$this->mrnno = new DbField('patient_insurance', 'patient_insurance', 'x_mrnno', 'mrnno', '`mrnno`', '`mrnno`', 200, -1, FALSE, '`mrnno`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mrnno->IsForeignKey = TRUE; // Foreign key field
		$this->mrnno->Sortable = TRUE; // Allow sort
		$this->fields['mrnno'] = &$this->mrnno;
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
		if ($this->getCurrentMasterTable() == "ip_admission") {
			if ($this->Reception->getSessionValue() <> "")
				$masterFilter .= "`id`=" . QuotedValue($this->Reception->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->PatientId->getSessionValue() <> "")
				$masterFilter .= " AND `patient_id`=" . QuotedValue($this->PatientId->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->mrnno->getSessionValue() <> "")
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
			if ($this->Reception->getSessionValue() <> "")
				$detailFilter .= "`Reception`=" . QuotedValue($this->Reception->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->PatientId->getSessionValue() <> "")
				$detailFilter .= " AND `PatientId`=" . QuotedValue($this->PatientId->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->mrnno->getSessionValue() <> "")
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`patient_insurance`";
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
		$this->Reception->DbValue = $row['Reception'];
		$this->PatientId->DbValue = $row['PatientId'];
		$this->PatientName->DbValue = $row['PatientName'];
		$this->Company->DbValue = $row['Company'];
		$this->AddressInsuranceCarierName->DbValue = $row['AddressInsuranceCarierName'];
		$this->ContactName->DbValue = $row['ContactName'];
		$this->ContactMobile->DbValue = $row['ContactMobile'];
		$this->PolicyType->DbValue = $row['PolicyType'];
		$this->PolicyName->DbValue = $row['PolicyName'];
		$this->PolicyNo->DbValue = $row['PolicyNo'];
		$this->PolicyAmount->DbValue = $row['PolicyAmount'];
		$this->RefLetterNo->DbValue = $row['RefLetterNo'];
		$this->ReferenceBy->DbValue = $row['ReferenceBy'];
		$this->ReferenceDate->DbValue = $row['ReferenceDate'];
		$this->DocumentAttatch->Upload->DbValue = $row['DocumentAttatch'];
		$this->createdby->DbValue = $row['createdby'];
		$this->createddatetime->DbValue = $row['createddatetime'];
		$this->modifiedby->DbValue = $row['modifiedby'];
		$this->modifieddatetime->DbValue = $row['modifieddatetime'];
		$this->mrnno->DbValue = $row['mrnno'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
		$oldFiles = EmptyValue($row['DocumentAttatch']) ? [] : explode(MULTIPLE_UPLOAD_SEPARATOR, $row['DocumentAttatch']);
		foreach ($oldFiles as $oldFile) {
			if (file_exists($this->DocumentAttatch->oldPhysicalUploadPath() . $oldFile))
				@unlink($this->DocumentAttatch->oldPhysicalUploadPath() . $oldFile);
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
			return "patient_insurancelist.php";
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
		if ($pageName == "patient_insuranceview.php")
			return $Language->phrase("View");
		elseif ($pageName == "patient_insuranceedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "patient_insuranceadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "patient_insurancelist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("patient_insuranceview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("patient_insuranceview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "patient_insuranceadd.php?" . $this->getUrlParm($parm);
		else
			$url = "patient_insuranceadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("patient_insuranceedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("patient_insuranceadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("patient_insurancedelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		if ($this->getCurrentMasterTable() == "ip_admission" && !ContainsString($url, TABLE_SHOW_MASTER . "=")) {
			$url .= (ContainsString($url, "?") ? "&" : "?") . TABLE_SHOW_MASTER . "=" . $this->getCurrentMasterTable();
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
		$this->Reception->setDbValue($rs->fields('Reception'));
		$this->PatientId->setDbValue($rs->fields('PatientId'));
		$this->PatientName->setDbValue($rs->fields('PatientName'));
		$this->Company->setDbValue($rs->fields('Company'));
		$this->AddressInsuranceCarierName->setDbValue($rs->fields('AddressInsuranceCarierName'));
		$this->ContactName->setDbValue($rs->fields('ContactName'));
		$this->ContactMobile->setDbValue($rs->fields('ContactMobile'));
		$this->PolicyType->setDbValue($rs->fields('PolicyType'));
		$this->PolicyName->setDbValue($rs->fields('PolicyName'));
		$this->PolicyNo->setDbValue($rs->fields('PolicyNo'));
		$this->PolicyAmount->setDbValue($rs->fields('PolicyAmount'));
		$this->RefLetterNo->setDbValue($rs->fields('RefLetterNo'));
		$this->ReferenceBy->setDbValue($rs->fields('ReferenceBy'));
		$this->ReferenceDate->setDbValue($rs->fields('ReferenceDate'));
		$this->DocumentAttatch->Upload->DbValue = $rs->fields('DocumentAttatch');
		$this->createdby->setDbValue($rs->fields('createdby'));
		$this->createddatetime->setDbValue($rs->fields('createddatetime'));
		$this->modifiedby->setDbValue($rs->fields('modifiedby'));
		$this->modifieddatetime->setDbValue($rs->fields('modifieddatetime'));
		$this->mrnno->setDbValue($rs->fields('mrnno'));
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
		// Company
		// AddressInsuranceCarierName
		// ContactName
		// ContactMobile
		// PolicyType
		// PolicyName
		// PolicyNo
		// PolicyAmount
		// RefLetterNo
		// ReferenceBy
		// ReferenceDate
		// DocumentAttatch
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// mrnno
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

		// Company
		$this->Company->ViewValue = $this->Company->CurrentValue;
		$this->Company->ViewCustomAttributes = "";

		// AddressInsuranceCarierName
		$this->AddressInsuranceCarierName->ViewValue = $this->AddressInsuranceCarierName->CurrentValue;
		$this->AddressInsuranceCarierName->ViewCustomAttributes = "";

		// ContactName
		$this->ContactName->ViewValue = $this->ContactName->CurrentValue;
		$this->ContactName->ViewCustomAttributes = "";

		// ContactMobile
		$this->ContactMobile->ViewValue = $this->ContactMobile->CurrentValue;
		$this->ContactMobile->ViewCustomAttributes = "";

		// PolicyType
		$this->PolicyType->ViewValue = $this->PolicyType->CurrentValue;
		$this->PolicyType->ViewCustomAttributes = "";

		// PolicyName
		$this->PolicyName->ViewValue = $this->PolicyName->CurrentValue;
		$this->PolicyName->ViewCustomAttributes = "";

		// PolicyNo
		$this->PolicyNo->ViewValue = $this->PolicyNo->CurrentValue;
		$this->PolicyNo->ViewCustomAttributes = "";

		// PolicyAmount
		$this->PolicyAmount->ViewValue = $this->PolicyAmount->CurrentValue;
		$this->PolicyAmount->ViewCustomAttributes = "";

		// RefLetterNo
		$this->RefLetterNo->ViewValue = $this->RefLetterNo->CurrentValue;
		$this->RefLetterNo->ViewCustomAttributes = "";

		// ReferenceBy
		$this->ReferenceBy->ViewValue = $this->ReferenceBy->CurrentValue;
		$this->ReferenceBy->ViewCustomAttributes = "";

		// ReferenceDate
		$this->ReferenceDate->ViewValue = $this->ReferenceDate->CurrentValue;
		$this->ReferenceDate->ViewValue = FormatDateTime($this->ReferenceDate->ViewValue, 0);
		$this->ReferenceDate->ViewCustomAttributes = "";

		// DocumentAttatch
		if (!EmptyValue($this->DocumentAttatch->Upload->DbValue)) {
			$this->DocumentAttatch->ViewValue = $this->DocumentAttatch->Upload->DbValue;
		} else {
			$this->DocumentAttatch->ViewValue = "";
		}
		$this->DocumentAttatch->ViewCustomAttributes = "";

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

		// mrnno
		$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
		$this->mrnno->ViewCustomAttributes = "";

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

		// Company
		$this->Company->LinkCustomAttributes = "";
		$this->Company->HrefValue = "";
		$this->Company->TooltipValue = "";

		// AddressInsuranceCarierName
		$this->AddressInsuranceCarierName->LinkCustomAttributes = "";
		$this->AddressInsuranceCarierName->HrefValue = "";
		$this->AddressInsuranceCarierName->TooltipValue = "";

		// ContactName
		$this->ContactName->LinkCustomAttributes = "";
		$this->ContactName->HrefValue = "";
		$this->ContactName->TooltipValue = "";

		// ContactMobile
		$this->ContactMobile->LinkCustomAttributes = "";
		$this->ContactMobile->HrefValue = "";
		$this->ContactMobile->TooltipValue = "";

		// PolicyType
		$this->PolicyType->LinkCustomAttributes = "";
		$this->PolicyType->HrefValue = "";
		$this->PolicyType->TooltipValue = "";

		// PolicyName
		$this->PolicyName->LinkCustomAttributes = "";
		$this->PolicyName->HrefValue = "";
		$this->PolicyName->TooltipValue = "";

		// PolicyNo
		$this->PolicyNo->LinkCustomAttributes = "";
		$this->PolicyNo->HrefValue = "";
		$this->PolicyNo->TooltipValue = "";

		// PolicyAmount
		$this->PolicyAmount->LinkCustomAttributes = "";
		$this->PolicyAmount->HrefValue = "";
		$this->PolicyAmount->TooltipValue = "";

		// RefLetterNo
		$this->RefLetterNo->LinkCustomAttributes = "";
		$this->RefLetterNo->HrefValue = "";
		$this->RefLetterNo->TooltipValue = "";

		// ReferenceBy
		$this->ReferenceBy->LinkCustomAttributes = "";
		$this->ReferenceBy->HrefValue = "";
		$this->ReferenceBy->TooltipValue = "";

		// ReferenceDate
		$this->ReferenceDate->LinkCustomAttributes = "";
		$this->ReferenceDate->HrefValue = "";
		$this->ReferenceDate->TooltipValue = "";

		// DocumentAttatch
		$this->DocumentAttatch->LinkCustomAttributes = "";
		$this->DocumentAttatch->HrefValue = "";
		$this->DocumentAttatch->ExportHrefValue = $this->DocumentAttatch->UploadPath . $this->DocumentAttatch->Upload->DbValue;
		$this->DocumentAttatch->TooltipValue = "";

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

		// mrnno
		$this->mrnno->LinkCustomAttributes = "";
		$this->mrnno->HrefValue = "";
		$this->mrnno->TooltipValue = "";

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
		if (REMOVE_XSS)
			$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
		$this->PatientName->EditValue = $this->PatientName->CurrentValue;
		$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

		// Company
		$this->Company->EditAttrs["class"] = "form-control";
		$this->Company->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Company->CurrentValue = HtmlDecode($this->Company->CurrentValue);
		$this->Company->EditValue = $this->Company->CurrentValue;
		$this->Company->PlaceHolder = RemoveHtml($this->Company->caption());

		// AddressInsuranceCarierName
		$this->AddressInsuranceCarierName->EditAttrs["class"] = "form-control";
		$this->AddressInsuranceCarierName->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->AddressInsuranceCarierName->CurrentValue = HtmlDecode($this->AddressInsuranceCarierName->CurrentValue);
		$this->AddressInsuranceCarierName->EditValue = $this->AddressInsuranceCarierName->CurrentValue;
		$this->AddressInsuranceCarierName->PlaceHolder = RemoveHtml($this->AddressInsuranceCarierName->caption());

		// ContactName
		$this->ContactName->EditAttrs["class"] = "form-control";
		$this->ContactName->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ContactName->CurrentValue = HtmlDecode($this->ContactName->CurrentValue);
		$this->ContactName->EditValue = $this->ContactName->CurrentValue;
		$this->ContactName->PlaceHolder = RemoveHtml($this->ContactName->caption());

		// ContactMobile
		$this->ContactMobile->EditAttrs["class"] = "form-control";
		$this->ContactMobile->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ContactMobile->CurrentValue = HtmlDecode($this->ContactMobile->CurrentValue);
		$this->ContactMobile->EditValue = $this->ContactMobile->CurrentValue;
		$this->ContactMobile->PlaceHolder = RemoveHtml($this->ContactMobile->caption());

		// PolicyType
		$this->PolicyType->EditAttrs["class"] = "form-control";
		$this->PolicyType->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PolicyType->CurrentValue = HtmlDecode($this->PolicyType->CurrentValue);
		$this->PolicyType->EditValue = $this->PolicyType->CurrentValue;
		$this->PolicyType->PlaceHolder = RemoveHtml($this->PolicyType->caption());

		// PolicyName
		$this->PolicyName->EditAttrs["class"] = "form-control";
		$this->PolicyName->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PolicyName->CurrentValue = HtmlDecode($this->PolicyName->CurrentValue);
		$this->PolicyName->EditValue = $this->PolicyName->CurrentValue;
		$this->PolicyName->PlaceHolder = RemoveHtml($this->PolicyName->caption());

		// PolicyNo
		$this->PolicyNo->EditAttrs["class"] = "form-control";
		$this->PolicyNo->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PolicyNo->CurrentValue = HtmlDecode($this->PolicyNo->CurrentValue);
		$this->PolicyNo->EditValue = $this->PolicyNo->CurrentValue;
		$this->PolicyNo->PlaceHolder = RemoveHtml($this->PolicyNo->caption());

		// PolicyAmount
		$this->PolicyAmount->EditAttrs["class"] = "form-control";
		$this->PolicyAmount->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PolicyAmount->CurrentValue = HtmlDecode($this->PolicyAmount->CurrentValue);
		$this->PolicyAmount->EditValue = $this->PolicyAmount->CurrentValue;
		$this->PolicyAmount->PlaceHolder = RemoveHtml($this->PolicyAmount->caption());

		// RefLetterNo
		$this->RefLetterNo->EditAttrs["class"] = "form-control";
		$this->RefLetterNo->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->RefLetterNo->CurrentValue = HtmlDecode($this->RefLetterNo->CurrentValue);
		$this->RefLetterNo->EditValue = $this->RefLetterNo->CurrentValue;
		$this->RefLetterNo->PlaceHolder = RemoveHtml($this->RefLetterNo->caption());

		// ReferenceBy
		$this->ReferenceBy->EditAttrs["class"] = "form-control";
		$this->ReferenceBy->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ReferenceBy->CurrentValue = HtmlDecode($this->ReferenceBy->CurrentValue);
		$this->ReferenceBy->EditValue = $this->ReferenceBy->CurrentValue;
		$this->ReferenceBy->PlaceHolder = RemoveHtml($this->ReferenceBy->caption());

		// ReferenceDate
		$this->ReferenceDate->EditAttrs["class"] = "form-control";
		$this->ReferenceDate->EditCustomAttributes = "";
		$this->ReferenceDate->EditValue = FormatDateTime($this->ReferenceDate->CurrentValue, 8);
		$this->ReferenceDate->PlaceHolder = RemoveHtml($this->ReferenceDate->caption());

		// DocumentAttatch
		$this->DocumentAttatch->EditAttrs["class"] = "form-control";
		$this->DocumentAttatch->EditCustomAttributes = "";
		if (!EmptyValue($this->DocumentAttatch->Upload->DbValue)) {
			$this->DocumentAttatch->EditValue = $this->DocumentAttatch->Upload->DbValue;
		} else {
			$this->DocumentAttatch->EditValue = "";
		}
		if (!EmptyValue($this->DocumentAttatch->CurrentValue))
				$this->DocumentAttatch->Upload->FileName = $this->DocumentAttatch->CurrentValue;

		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// mrnno

		$this->mrnno->EditAttrs["class"] = "form-control";
		$this->mrnno->EditCustomAttributes = "";
		if ($this->mrnno->getSessionValue() <> "") {
			$this->mrnno->CurrentValue = $this->mrnno->getSessionValue();
		$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
		$this->mrnno->ViewCustomAttributes = "";
		} else {
		if (REMOVE_XSS)
			$this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
		$this->mrnno->EditValue = $this->mrnno->CurrentValue;
		$this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());
		}

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
					$doc->exportCaption($this->Company);
					$doc->exportCaption($this->AddressInsuranceCarierName);
					$doc->exportCaption($this->ContactName);
					$doc->exportCaption($this->ContactMobile);
					$doc->exportCaption($this->PolicyType);
					$doc->exportCaption($this->PolicyName);
					$doc->exportCaption($this->PolicyNo);
					$doc->exportCaption($this->PolicyAmount);
					$doc->exportCaption($this->RefLetterNo);
					$doc->exportCaption($this->ReferenceBy);
					$doc->exportCaption($this->ReferenceDate);
					$doc->exportCaption($this->DocumentAttatch);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
					$doc->exportCaption($this->mrnno);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->Reception);
					$doc->exportCaption($this->PatientId);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->Company);
					$doc->exportCaption($this->AddressInsuranceCarierName);
					$doc->exportCaption($this->ContactName);
					$doc->exportCaption($this->ContactMobile);
					$doc->exportCaption($this->PolicyType);
					$doc->exportCaption($this->PolicyName);
					$doc->exportCaption($this->PolicyNo);
					$doc->exportCaption($this->PolicyAmount);
					$doc->exportCaption($this->RefLetterNo);
					$doc->exportCaption($this->ReferenceBy);
					$doc->exportCaption($this->ReferenceDate);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
					$doc->exportCaption($this->mrnno);
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
						$doc->exportField($this->Company);
						$doc->exportField($this->AddressInsuranceCarierName);
						$doc->exportField($this->ContactName);
						$doc->exportField($this->ContactMobile);
						$doc->exportField($this->PolicyType);
						$doc->exportField($this->PolicyName);
						$doc->exportField($this->PolicyNo);
						$doc->exportField($this->PolicyAmount);
						$doc->exportField($this->RefLetterNo);
						$doc->exportField($this->ReferenceBy);
						$doc->exportField($this->ReferenceDate);
						$doc->exportField($this->DocumentAttatch);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
						$doc->exportField($this->mrnno);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->Reception);
						$doc->exportField($this->PatientId);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->Company);
						$doc->exportField($this->AddressInsuranceCarierName);
						$doc->exportField($this->ContactName);
						$doc->exportField($this->ContactMobile);
						$doc->exportField($this->PolicyType);
						$doc->exportField($this->PolicyName);
						$doc->exportField($this->PolicyNo);
						$doc->exportField($this->PolicyAmount);
						$doc->exportField($this->RefLetterNo);
						$doc->exportField($this->ReferenceBy);
						$doc->exportField($this->ReferenceDate);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
						$doc->exportField($this->mrnno);
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
		global $COMPOSITE_KEY_SEPARATOR;

		// Set up field name / file name field / file type field
		$fldName = "";
		$fileNameFld = "";
		$fileTypeFld = "";
		if ($fldparm == 'DocumentAttatch') {
			$fldName = "DocumentAttatch";
			$fileNameFld = "DocumentAttatch";
		} else {
			return FALSE; // Incorrect field
		}

		// Set up key values
		$ar = explode($COMPOSITE_KEY_SEPARATOR, $key);
		if (count($ar) == 1) {
			$this->id->CurrentValue = $ar[0];
		} else {
			return FALSE; // Incorrect key
		}

		// Set up filter (WHERE Clause)
		$filter = $this->getRecordFilter();
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = &$this->getConnection();
		$dbtype = GetConnectionType($this->Dbid);
		if (($rs = $conn->execute($sql)) && !$rs->EOF) {
			$val = $rs->fields($fldName);
			if (!EmptyValue($val)) {
				$fld = $this->fields[$fldName];

				// Binary data
				if ($fld->DataType == DATATYPE_BLOB) {
					if ($dbtype <> "MYSQL") {
						if (is_array($val) || is_object($val)) // Byte array
							$val = BytesToString($val);
					}
					if ($resize)
						ResizeBinary($val, $width, $height);

					// Write file type
					if ($fileTypeFld <> "" && !EmptyValue($rs->fields($fileTypeFld))) {
						AddHeader("Content-type", $rs->fields($fileTypeFld));
					} else {
						AddHeader("Content-type", ContentType($val));
					}

					// Write file name
					if ($fileNameFld <> "" && !EmptyValue($rs->fields($fileNameFld)))
						AddHeader("Content-Disposition", "attachment; filename=\"" . $rs->fields($fileNameFld) . "\"");

					// Write file data
					if (StartsString("PK", $val) && ContainsString($val, "[Content_Types].xml") &&
						ContainsString($val, "_rels") && ContainsString($val, "docProps")) { // Fix Office 2007 documents
						if (!EndsString("\0\0\0", $val)) // Not ends with 3 or 4 \0
							$val .= "\0\0\0\0";
					}

					// Clear output buffer
					if (ob_get_length())
						ob_end_clean();

					// Write binary data
					Write($val);

				// Upload to folder
				} else {
					if ($fld->UploadMultiple)
						$files = explode(MULTIPLE_UPLOAD_SEPARATOR, $val);
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