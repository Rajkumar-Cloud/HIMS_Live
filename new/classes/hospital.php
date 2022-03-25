<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for hospital
 */
class hospital extends DbTable
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
	public $logo;
	public $hospital;
	public $street;
	public $area;
	public $town;
	public $province;
	public $postal_code;
	public $phone_no;
	public $status;
	public $createdby;
	public $createddatetime;
	public $modifiedby;
	public $modifieddatetime;
	public $PreFixCode;
	public $BillingGST;
	public $pharmacyGST;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'hospital';
		$this->TableName = 'hospital';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`hospital`";
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
		$this->id = new DbField('hospital', 'hospital', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Nullable = FALSE; // NOT NULL field
		$this->id->Required = TRUE; // Required field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// logo
		$this->logo = new DbField('hospital', 'hospital', 'x_logo', 'logo', '`logo`', '`logo`', 201, 450, -1, TRUE, '`logo`', FALSE, FALSE, FALSE, 'IMAGE', 'FILE');
		$this->logo->Sortable = TRUE; // Allow sort
		$this->fields['logo'] = &$this->logo;

		// hospital
		$this->hospital = new DbField('hospital', 'hospital', 'x_hospital', 'hospital', '`hospital`', '`hospital`', 200, 100, -1, FALSE, '`hospital`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hospital->Nullable = FALSE; // NOT NULL field
		$this->hospital->Required = TRUE; // Required field
		$this->hospital->Sortable = TRUE; // Allow sort
		$this->fields['hospital'] = &$this->hospital;

		// street
		$this->street = new DbField('hospital', 'hospital', 'x_street', 'street', '`street`', '`street`', 200, 100, -1, FALSE, '`street`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->street->Nullable = FALSE; // NOT NULL field
		$this->street->Required = TRUE; // Required field
		$this->street->Sortable = TRUE; // Allow sort
		$this->fields['street'] = &$this->street;

		// area
		$this->area = new DbField('hospital', 'hospital', 'x_area', 'area', '`area`', '`area`', 200, 45, -1, FALSE, '`area`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->area->Sortable = TRUE; // Allow sort
		$this->fields['area'] = &$this->area;

		// town
		$this->town = new DbField('hospital', 'hospital', 'x_town', 'town', '`town`', '`town`', 200, 50, -1, FALSE, '`town`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->town->Sortable = TRUE; // Allow sort
		$this->fields['town'] = &$this->town;

		// province
		$this->province = new DbField('hospital', 'hospital', 'x_province', 'province', '`province`', '`province`', 200, 50, -1, FALSE, '`province`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->province->Sortable = TRUE; // Allow sort
		$this->fields['province'] = &$this->province;

		// postal_code
		$this->postal_code = new DbField('hospital', 'hospital', 'x_postal_code', 'postal_code', '`postal_code`', '`postal_code`', 200, 6, -1, FALSE, '`postal_code`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->postal_code->Sortable = TRUE; // Allow sort
		$this->fields['postal_code'] = &$this->postal_code;

		// phone_no
		$this->phone_no = new DbField('hospital', 'hospital', 'x_phone_no', 'phone_no', '`phone_no`', '`phone_no`', 200, 50, -1, FALSE, '`phone_no`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->phone_no->Sortable = TRUE; // Allow sort
		$this->fields['phone_no'] = &$this->phone_no;

		// status
		$this->status = new DbField('hospital', 'hospital', 'x_status', 'status', '`status`', '`status`', 3, 11, -1, FALSE, '`status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->status->Nullable = FALSE; // NOT NULL field
		$this->status->Required = TRUE; // Required field
		$this->status->Sortable = TRUE; // Allow sort
		$this->status->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->status->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->status->Lookup = new Lookup('status', 'sys_status', FALSE, 'id', ["Name","","",""], [], [], [], [], [], [], '', '');
		$this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['status'] = &$this->status;

		// createdby
		$this->createdby = new DbField('hospital', 'hospital', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, 11, -1, FALSE, '`createdby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdby->Sortable = FALSE; // Allow sort
		$this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['createdby'] = &$this->createdby;

		// createddatetime
		$this->createddatetime = new DbField('hospital', 'hospital', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, FALSE, '`createddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = FALSE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['createddatetime'] = &$this->createddatetime;

		// modifiedby
		$this->modifiedby = new DbField('hospital', 'hospital', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, 11, -1, FALSE, '`modifiedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifiedby->Sortable = FALSE; // Allow sort
		$this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['modifiedby'] = &$this->modifiedby;

		// modifieddatetime
		$this->modifieddatetime = new DbField('hospital', 'hospital', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, FALSE, '`modifieddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifieddatetime->Sortable = FALSE; // Allow sort
		$this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['modifieddatetime'] = &$this->modifieddatetime;

		// PreFixCode
		$this->PreFixCode = new DbField('hospital', 'hospital', 'x_PreFixCode', 'PreFixCode', '`PreFixCode`', '`PreFixCode`', 200, 45, -1, FALSE, '`PreFixCode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PreFixCode->Sortable = TRUE; // Allow sort
		$this->fields['PreFixCode'] = &$this->PreFixCode;

		// BillingGST
		$this->BillingGST = new DbField('hospital', 'hospital', 'x_BillingGST', 'BillingGST', '`BillingGST`', '`BillingGST`', 200, 45, -1, FALSE, '`BillingGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BillingGST->Sortable = TRUE; // Allow sort
		$this->fields['BillingGST'] = &$this->BillingGST;

		// pharmacyGST
		$this->pharmacyGST = new DbField('hospital', 'hospital', 'x_pharmacyGST', 'pharmacyGST', '`pharmacyGST`', '`pharmacyGST`', 200, 45, -1, FALSE, '`pharmacyGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->pharmacyGST->Sortable = TRUE; // Allow sort
		$this->fields['pharmacyGST'] = &$this->pharmacyGST;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`hospital`";
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
		$this->logo->Upload->DbValue = $row['logo'];
		$this->hospital->DbValue = $row['hospital'];
		$this->street->DbValue = $row['street'];
		$this->area->DbValue = $row['area'];
		$this->town->DbValue = $row['town'];
		$this->province->DbValue = $row['province'];
		$this->postal_code->DbValue = $row['postal_code'];
		$this->phone_no->DbValue = $row['phone_no'];
		$this->status->DbValue = $row['status'];
		$this->createdby->DbValue = $row['createdby'];
		$this->createddatetime->DbValue = $row['createddatetime'];
		$this->modifiedby->DbValue = $row['modifiedby'];
		$this->modifieddatetime->DbValue = $row['modifieddatetime'];
		$this->PreFixCode->DbValue = $row['PreFixCode'];
		$this->BillingGST->DbValue = $row['BillingGST'];
		$this->pharmacyGST->DbValue = $row['pharmacyGST'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
		$oldFiles = EmptyValue($row['logo']) ? [] : [$row['logo']];
		foreach ($oldFiles as $oldFile) {
			if (file_exists($this->logo->oldPhysicalUploadPath() . $oldFile))
				@unlink($this->logo->oldPhysicalUploadPath() . $oldFile);
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
			return "hospitallist.php";
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
		if ($pageName == "hospitalview.php")
			return $Language->phrase("View");
		elseif ($pageName == "hospitaledit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "hospitaladd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "hospitallist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("hospitalview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("hospitalview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "hospitaladd.php?" . $this->getUrlParm($parm);
		else
			$url = "hospitaladd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("hospitaledit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("hospitaladd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("hospitaldelete.php", $this->getUrlParm());
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
		$this->logo->Upload->DbValue = $rs->fields('logo');
		$this->hospital->setDbValue($rs->fields('hospital'));
		$this->street->setDbValue($rs->fields('street'));
		$this->area->setDbValue($rs->fields('area'));
		$this->town->setDbValue($rs->fields('town'));
		$this->province->setDbValue($rs->fields('province'));
		$this->postal_code->setDbValue($rs->fields('postal_code'));
		$this->phone_no->setDbValue($rs->fields('phone_no'));
		$this->status->setDbValue($rs->fields('status'));
		$this->createdby->setDbValue($rs->fields('createdby'));
		$this->createddatetime->setDbValue($rs->fields('createddatetime'));
		$this->modifiedby->setDbValue($rs->fields('modifiedby'));
		$this->modifieddatetime->setDbValue($rs->fields('modifieddatetime'));
		$this->PreFixCode->setDbValue($rs->fields('PreFixCode'));
		$this->BillingGST->setDbValue($rs->fields('BillingGST'));
		$this->pharmacyGST->setDbValue($rs->fields('pharmacyGST'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// logo
		// hospital
		// street
		// area
		// town
		// province
		// postal_code
		// phone_no
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// PreFixCode
		// BillingGST
		// pharmacyGST
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// logo
		if (!EmptyValue($this->logo->Upload->DbValue)) {
			$this->logo->ImageWidth = 80;
			$this->logo->ImageHeight = 80;
			$this->logo->ImageAlt = $this->logo->alt();
			$this->logo->ViewValue = $this->logo->Upload->DbValue;
		} else {
			$this->logo->ViewValue = "";
		}
		$this->logo->ViewCustomAttributes = "";

		// hospital
		$this->hospital->ViewValue = $this->hospital->CurrentValue;
		$this->hospital->ViewCustomAttributes = "";

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

		// status
		$curVal = strval($this->status->CurrentValue);
		if ($curVal != "") {
			$this->status->ViewValue = $this->status->lookupCacheOption($curVal);
			if ($this->status->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->status->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->status->ViewValue = $this->status->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->status->ViewValue = $this->status->CurrentValue;
				}
			}
		} else {
			$this->status->ViewValue = NULL;
		}
		$this->status->ViewCustomAttributes = "";

		// createdby
		$this->createdby->ViewValue = $this->createdby->CurrentValue;
		$this->createdby->ViewValue = FormatNumber($this->createdby->ViewValue, 0, -2, -2, -2);
		$this->createdby->ViewCustomAttributes = "";

		// createddatetime
		$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
		$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
		$this->createddatetime->ViewCustomAttributes = "";

		// modifiedby
		$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
		$this->modifiedby->ViewValue = FormatNumber($this->modifiedby->ViewValue, 0, -2, -2, -2);
		$this->modifiedby->ViewCustomAttributes = "";

		// modifieddatetime
		$this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
		$this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
		$this->modifieddatetime->ViewCustomAttributes = "";

		// PreFixCode
		$this->PreFixCode->ViewValue = $this->PreFixCode->CurrentValue;
		$this->PreFixCode->ViewCustomAttributes = "";

		// BillingGST
		$this->BillingGST->ViewValue = $this->BillingGST->CurrentValue;
		$this->BillingGST->ViewCustomAttributes = "";

		// pharmacyGST
		$this->pharmacyGST->ViewValue = $this->pharmacyGST->CurrentValue;
		$this->pharmacyGST->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// logo
		$this->logo->LinkCustomAttributes = "";
		if (!EmptyValue($this->logo->Upload->DbValue)) {
			$this->logo->HrefValue = GetFileUploadUrl($this->logo, $this->logo->htmlDecode($this->logo->Upload->DbValue)); // Add prefix/suffix
			$this->logo->LinkAttrs["target"] = ""; // Add target
			if ($this->isExport())
				$this->logo->HrefValue = FullUrl($this->logo->HrefValue, "href");
		} else {
			$this->logo->HrefValue = "";
		}
		$this->logo->ExportHrefValue = $this->logo->UploadPath . $this->logo->Upload->DbValue;
		$this->logo->TooltipValue = "";
		if ($this->logo->UseColorbox) {
			if (EmptyValue($this->logo->TooltipValue))
				$this->logo->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
			$this->logo->LinkAttrs["data-rel"] = "hospital_x_logo";
			$this->logo->LinkAttrs->appendClass("ew-lightbox");
		}

		// hospital
		$this->hospital->LinkCustomAttributes = "";
		$this->hospital->HrefValue = "";
		$this->hospital->TooltipValue = "";

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

		// status
		$this->status->LinkCustomAttributes = "";
		$this->status->HrefValue = "";
		$this->status->TooltipValue = "";

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

		// PreFixCode
		$this->PreFixCode->LinkCustomAttributes = "";
		$this->PreFixCode->HrefValue = "";
		$this->PreFixCode->TooltipValue = "";

		// BillingGST
		$this->BillingGST->LinkCustomAttributes = "";
		$this->BillingGST->HrefValue = "";
		$this->BillingGST->TooltipValue = "";

		// pharmacyGST
		$this->pharmacyGST->LinkCustomAttributes = "";
		$this->pharmacyGST->HrefValue = "";
		$this->pharmacyGST->TooltipValue = "";

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
		$this->id->PlaceHolder = RemoveHtml($this->id->caption());

		// logo
		$this->logo->EditAttrs["class"] = "form-control";
		$this->logo->EditCustomAttributes = "";
		if (!EmptyValue($this->logo->Upload->DbValue)) {
			$this->logo->ImageWidth = 80;
			$this->logo->ImageHeight = 80;
			$this->logo->ImageAlt = $this->logo->alt();
			$this->logo->EditValue = $this->logo->Upload->DbValue;
		} else {
			$this->logo->EditValue = "";
		}
		if (!EmptyValue($this->logo->CurrentValue))
				$this->logo->Upload->FileName = $this->logo->CurrentValue;

		// hospital
		$this->hospital->EditAttrs["class"] = "form-control";
		$this->hospital->EditCustomAttributes = "";
		if (!$this->hospital->Raw)
			$this->hospital->CurrentValue = HtmlDecode($this->hospital->CurrentValue);
		$this->hospital->EditValue = $this->hospital->CurrentValue;
		$this->hospital->PlaceHolder = RemoveHtml($this->hospital->caption());

		// street
		$this->street->EditAttrs["class"] = "form-control";
		$this->street->EditCustomAttributes = "";
		if (!$this->street->Raw)
			$this->street->CurrentValue = HtmlDecode($this->street->CurrentValue);
		$this->street->EditValue = $this->street->CurrentValue;
		$this->street->PlaceHolder = RemoveHtml($this->street->caption());

		// area
		$this->area->EditAttrs["class"] = "form-control";
		$this->area->EditCustomAttributes = "";
		if (!$this->area->Raw)
			$this->area->CurrentValue = HtmlDecode($this->area->CurrentValue);
		$this->area->EditValue = $this->area->CurrentValue;
		$this->area->PlaceHolder = RemoveHtml($this->area->caption());

		// town
		$this->town->EditAttrs["class"] = "form-control";
		$this->town->EditCustomAttributes = "";
		if (!$this->town->Raw)
			$this->town->CurrentValue = HtmlDecode($this->town->CurrentValue);
		$this->town->EditValue = $this->town->CurrentValue;
		$this->town->PlaceHolder = RemoveHtml($this->town->caption());

		// province
		$this->province->EditAttrs["class"] = "form-control";
		$this->province->EditCustomAttributes = "";
		if (!$this->province->Raw)
			$this->province->CurrentValue = HtmlDecode($this->province->CurrentValue);
		$this->province->EditValue = $this->province->CurrentValue;
		$this->province->PlaceHolder = RemoveHtml($this->province->caption());

		// postal_code
		$this->postal_code->EditAttrs["class"] = "form-control";
		$this->postal_code->EditCustomAttributes = "";
		if (!$this->postal_code->Raw)
			$this->postal_code->CurrentValue = HtmlDecode($this->postal_code->CurrentValue);
		$this->postal_code->EditValue = $this->postal_code->CurrentValue;
		$this->postal_code->PlaceHolder = RemoveHtml($this->postal_code->caption());

		// phone_no
		$this->phone_no->EditAttrs["class"] = "form-control";
		$this->phone_no->EditCustomAttributes = "";
		if (!$this->phone_no->Raw)
			$this->phone_no->CurrentValue = HtmlDecode($this->phone_no->CurrentValue);
		$this->phone_no->EditValue = $this->phone_no->CurrentValue;
		$this->phone_no->PlaceHolder = RemoveHtml($this->phone_no->caption());

		// status
		$this->status->EditAttrs["class"] = "form-control";
		$this->status->EditCustomAttributes = "";

		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// PreFixCode

		$this->PreFixCode->EditAttrs["class"] = "form-control";
		$this->PreFixCode->EditCustomAttributes = "";
		if (!$this->PreFixCode->Raw)
			$this->PreFixCode->CurrentValue = HtmlDecode($this->PreFixCode->CurrentValue);
		$this->PreFixCode->EditValue = $this->PreFixCode->CurrentValue;
		$this->PreFixCode->PlaceHolder = RemoveHtml($this->PreFixCode->caption());

		// BillingGST
		$this->BillingGST->EditAttrs["class"] = "form-control";
		$this->BillingGST->EditCustomAttributes = "";
		if (!$this->BillingGST->Raw)
			$this->BillingGST->CurrentValue = HtmlDecode($this->BillingGST->CurrentValue);
		$this->BillingGST->EditValue = $this->BillingGST->CurrentValue;
		$this->BillingGST->PlaceHolder = RemoveHtml($this->BillingGST->caption());

		// pharmacyGST
		$this->pharmacyGST->EditAttrs["class"] = "form-control";
		$this->pharmacyGST->EditCustomAttributes = "";
		if (!$this->pharmacyGST->Raw)
			$this->pharmacyGST->CurrentValue = HtmlDecode($this->pharmacyGST->CurrentValue);
		$this->pharmacyGST->EditValue = $this->pharmacyGST->CurrentValue;
		$this->pharmacyGST->PlaceHolder = RemoveHtml($this->pharmacyGST->caption());

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
					$doc->exportCaption($this->logo);
					$doc->exportCaption($this->hospital);
					$doc->exportCaption($this->street);
					$doc->exportCaption($this->area);
					$doc->exportCaption($this->town);
					$doc->exportCaption($this->province);
					$doc->exportCaption($this->postal_code);
					$doc->exportCaption($this->phone_no);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->PreFixCode);
					$doc->exportCaption($this->BillingGST);
					$doc->exportCaption($this->pharmacyGST);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->hospital);
					$doc->exportCaption($this->street);
					$doc->exportCaption($this->area);
					$doc->exportCaption($this->town);
					$doc->exportCaption($this->province);
					$doc->exportCaption($this->postal_code);
					$doc->exportCaption($this->phone_no);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->PreFixCode);
					$doc->exportCaption($this->BillingGST);
					$doc->exportCaption($this->pharmacyGST);
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
						$doc->exportField($this->logo);
						$doc->exportField($this->hospital);
						$doc->exportField($this->street);
						$doc->exportField($this->area);
						$doc->exportField($this->town);
						$doc->exportField($this->province);
						$doc->exportField($this->postal_code);
						$doc->exportField($this->phone_no);
						$doc->exportField($this->status);
						$doc->exportField($this->PreFixCode);
						$doc->exportField($this->BillingGST);
						$doc->exportField($this->pharmacyGST);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->hospital);
						$doc->exportField($this->street);
						$doc->exportField($this->area);
						$doc->exportField($this->town);
						$doc->exportField($this->province);
						$doc->exportField($this->postal_code);
						$doc->exportField($this->phone_no);
						$doc->exportField($this->status);
						$doc->exportField($this->PreFixCode);
						$doc->exportField($this->BillingGST);
						$doc->exportField($this->pharmacyGST);
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
		if ($fldparm == 'logo') {
			$fldName = "logo";
			$fileNameFld = "logo";
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