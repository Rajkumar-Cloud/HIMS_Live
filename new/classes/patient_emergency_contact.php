<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for patient_emergency_contact
 */
class patient_emergency_contact extends DbTable
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
	public $patient_id;
	public $name;
	public $relationship;
	public $telephone;
	public $address;
	public $status;
	public $createdby;
	public $createddatetime;
	public $modifiedby;
	public $modifieddatetime;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'patient_emergency_contact';
		$this->TableName = 'patient_emergency_contact';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`patient_emergency_contact`";
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
		$this->id = new DbField('patient_emergency_contact', 'patient_emergency_contact', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// patient_id
		$this->patient_id = new DbField('patient_emergency_contact', 'patient_emergency_contact', 'x_patient_id', 'patient_id', '`patient_id`', '`patient_id`', 3, 11, -1, FALSE, '`patient_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->patient_id->IsForeignKey = TRUE; // Foreign key field
		$this->patient_id->Nullable = FALSE; // NOT NULL field
		$this->patient_id->Required = TRUE; // Required field
		$this->patient_id->Sortable = TRUE; // Allow sort
		$this->patient_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['patient_id'] = &$this->patient_id;

		// name
		$this->name = new DbField('patient_emergency_contact', 'patient_emergency_contact', 'x_name', 'name', '`name`', '`name`', 200, 100, -1, FALSE, '`name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->name->Nullable = FALSE; // NOT NULL field
		$this->name->Required = TRUE; // Required field
		$this->name->Sortable = TRUE; // Allow sort
		$this->fields['name'] = &$this->name;

		// relationship
		$this->relationship = new DbField('patient_emergency_contact', 'patient_emergency_contact', 'x_relationship', 'relationship', '`relationship`', '`relationship`', 200, 50, -1, FALSE, '`relationship`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->relationship->Nullable = FALSE; // NOT NULL field
		$this->relationship->Required = TRUE; // Required field
		$this->relationship->Sortable = TRUE; // Allow sort
		$this->fields['relationship'] = &$this->relationship;

		// telephone
		$this->telephone = new DbField('patient_emergency_contact', 'patient_emergency_contact', 'x_telephone', 'telephone', '`telephone`', '`telephone`', 200, 10, -1, FALSE, '`telephone`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->telephone->Nullable = FALSE; // NOT NULL field
		$this->telephone->Required = TRUE; // Required field
		$this->telephone->Sortable = TRUE; // Allow sort
		$this->fields['telephone'] = &$this->telephone;

		// address
		$this->address = new DbField('patient_emergency_contact', 'patient_emergency_contact', 'x_address', 'address', '`address`', '`address`', 200, 200, -1, FALSE, '`address`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->address->Nullable = FALSE; // NOT NULL field
		$this->address->Required = TRUE; // Required field
		$this->address->Sortable = TRUE; // Allow sort
		$this->fields['address'] = &$this->address;

		// status
		$this->status = new DbField('patient_emergency_contact', 'patient_emergency_contact', 'x_status', 'status', '`status`', '`status`', 3, 11, -1, FALSE, '`status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->status->Nullable = FALSE; // NOT NULL field
		$this->status->Required = TRUE; // Required field
		$this->status->Sortable = TRUE; // Allow sort
		$this->status->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->status->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->status->Lookup = new Lookup('status', 'sys_status', FALSE, 'id', ["Name","","",""], [], [], [], [], [], [], '', '');
		$this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['status'] = &$this->status;

		// createdby
		$this->createdby = new DbField('patient_emergency_contact', 'patient_emergency_contact', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, 11, -1, FALSE, '`createdby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdby->Sortable = FALSE; // Allow sort
		$this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['createdby'] = &$this->createdby;

		// createddatetime
		$this->createddatetime = new DbField('patient_emergency_contact', 'patient_emergency_contact', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, FALSE, '`createddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = FALSE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['createddatetime'] = &$this->createddatetime;

		// modifiedby
		$this->modifiedby = new DbField('patient_emergency_contact', 'patient_emergency_contact', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, 11, -1, FALSE, '`modifiedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifiedby->Sortable = FALSE; // Allow sort
		$this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['modifiedby'] = &$this->modifiedby;

		// modifieddatetime
		$this->modifieddatetime = new DbField('patient_emergency_contact', 'patient_emergency_contact', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, FALSE, '`modifieddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifieddatetime->Sortable = FALSE; // Allow sort
		$this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['modifieddatetime'] = &$this->modifieddatetime;
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
		if ($this->getCurrentMasterTable() == "patient") {
			if ($this->patient_id->getSessionValue() != "")
				$masterFilter .= "`id`=" . QuotedValue($this->patient_id->getSessionValue(), DATATYPE_NUMBER, "DB");
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
		if ($this->getCurrentMasterTable() == "patient") {
			if ($this->patient_id->getSessionValue() != "")
				$detailFilter .= "`patient_id`=" . QuotedValue($this->patient_id->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
		}
		return $detailFilter;
	}

	// Master filter
	public function sqlMasterFilter_patient()
	{
		return "`id`=@id@";
	}

	// Detail filter
	public function sqlDetailFilter_patient()
	{
		return "`patient_id`=@patient_id@";
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`patient_emergency_contact`";
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
		$this->patient_id->DbValue = $row['patient_id'];
		$this->name->DbValue = $row['name'];
		$this->relationship->DbValue = $row['relationship'];
		$this->telephone->DbValue = $row['telephone'];
		$this->address->DbValue = $row['address'];
		$this->status->DbValue = $row['status'];
		$this->createdby->DbValue = $row['createdby'];
		$this->createddatetime->DbValue = $row['createddatetime'];
		$this->modifiedby->DbValue = $row['modifiedby'];
		$this->modifieddatetime->DbValue = $row['modifieddatetime'];
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
			return "patient_emergency_contactlist.php";
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
		if ($pageName == "patient_emergency_contactview.php")
			return $Language->phrase("View");
		elseif ($pageName == "patient_emergency_contactedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "patient_emergency_contactadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "patient_emergency_contactlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("patient_emergency_contactview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("patient_emergency_contactview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "patient_emergency_contactadd.php?" . $this->getUrlParm($parm);
		else
			$url = "patient_emergency_contactadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("patient_emergency_contactedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("patient_emergency_contactadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("patient_emergency_contactdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		if ($this->getCurrentMasterTable() == "patient" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
			$url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
			$url .= "&fk_id=" . urlencode($this->patient_id->CurrentValue);
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
		$this->patient_id->setDbValue($rs->fields('patient_id'));
		$this->name->setDbValue($rs->fields('name'));
		$this->relationship->setDbValue($rs->fields('relationship'));
		$this->telephone->setDbValue($rs->fields('telephone'));
		$this->address->setDbValue($rs->fields('address'));
		$this->status->setDbValue($rs->fields('status'));
		$this->createdby->setDbValue($rs->fields('createdby'));
		$this->createddatetime->setDbValue($rs->fields('createddatetime'));
		$this->modifiedby->setDbValue($rs->fields('modifiedby'));
		$this->modifieddatetime->setDbValue($rs->fields('modifieddatetime'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// patient_id
		// name
		// relationship
		// telephone
		// address
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// patient_id
		$this->patient_id->ViewValue = $this->patient_id->CurrentValue;
		$this->patient_id->ViewValue = FormatNumber($this->patient_id->ViewValue, 0, -2, -2, -2);
		$this->patient_id->ViewCustomAttributes = "";

		// name
		$this->name->ViewValue = $this->name->CurrentValue;
		$this->name->ViewCustomAttributes = "";

		// relationship
		$this->relationship->ViewValue = $this->relationship->CurrentValue;
		$this->relationship->ViewCustomAttributes = "";

		// telephone
		$this->telephone->ViewValue = $this->telephone->CurrentValue;
		$this->telephone->ViewCustomAttributes = "";

		// address
		$this->address->ViewValue = $this->address->CurrentValue;
		$this->address->ViewCustomAttributes = "";

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

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// patient_id
		$this->patient_id->LinkCustomAttributes = "";
		$this->patient_id->HrefValue = "";
		$this->patient_id->TooltipValue = "";

		// name
		$this->name->LinkCustomAttributes = "";
		$this->name->HrefValue = "";
		$this->name->TooltipValue = "";

		// relationship
		$this->relationship->LinkCustomAttributes = "";
		$this->relationship->HrefValue = "";
		$this->relationship->TooltipValue = "";

		// telephone
		$this->telephone->LinkCustomAttributes = "";
		$this->telephone->HrefValue = "";
		$this->telephone->TooltipValue = "";

		// address
		$this->address->LinkCustomAttributes = "";
		$this->address->HrefValue = "";
		$this->address->TooltipValue = "";

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

		// patient_id
		$this->patient_id->EditAttrs["class"] = "form-control";
		$this->patient_id->EditCustomAttributes = "";
		$this->patient_id->EditValue = $this->patient_id->CurrentValue;
		$this->patient_id->EditValue = FormatNumber($this->patient_id->EditValue, 0, -2, -2, -2);
		$this->patient_id->ViewCustomAttributes = "";

		// name
		$this->name->EditAttrs["class"] = "form-control";
		$this->name->EditCustomAttributes = "";
		if (!$this->name->Raw)
			$this->name->CurrentValue = HtmlDecode($this->name->CurrentValue);
		$this->name->EditValue = $this->name->CurrentValue;
		$this->name->PlaceHolder = RemoveHtml($this->name->caption());

		// relationship
		$this->relationship->EditAttrs["class"] = "form-control";
		$this->relationship->EditCustomAttributes = "";
		if (!$this->relationship->Raw)
			$this->relationship->CurrentValue = HtmlDecode($this->relationship->CurrentValue);
		$this->relationship->EditValue = $this->relationship->CurrentValue;
		$this->relationship->PlaceHolder = RemoveHtml($this->relationship->caption());

		// telephone
		$this->telephone->EditAttrs["class"] = "form-control";
		$this->telephone->EditCustomAttributes = "";
		if (!$this->telephone->Raw)
			$this->telephone->CurrentValue = HtmlDecode($this->telephone->CurrentValue);
		$this->telephone->EditValue = $this->telephone->CurrentValue;
		$this->telephone->PlaceHolder = RemoveHtml($this->telephone->caption());

		// address
		$this->address->EditAttrs["class"] = "form-control";
		$this->address->EditCustomAttributes = "";
		if (!$this->address->Raw)
			$this->address->CurrentValue = HtmlDecode($this->address->CurrentValue);
		$this->address->EditValue = $this->address->CurrentValue;
		$this->address->PlaceHolder = RemoveHtml($this->address->caption());

		// status
		$this->status->EditAttrs["class"] = "form-control";
		$this->status->EditCustomAttributes = "";

		// createdby
		$this->createdby->EditAttrs["class"] = "form-control";
		$this->createdby->EditCustomAttributes = "";
		$this->createdby->EditValue = $this->createdby->CurrentValue;
		$this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

		// createddatetime
		$this->createddatetime->EditAttrs["class"] = "form-control";
		$this->createddatetime->EditCustomAttributes = "";
		$this->createddatetime->EditValue = FormatDateTime($this->createddatetime->CurrentValue, 8);
		$this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

		// modifiedby
		$this->modifiedby->EditAttrs["class"] = "form-control";
		$this->modifiedby->EditCustomAttributes = "";
		$this->modifiedby->EditValue = $this->modifiedby->CurrentValue;
		$this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

		// modifieddatetime
		$this->modifieddatetime->EditAttrs["class"] = "form-control";
		$this->modifieddatetime->EditCustomAttributes = "";
		$this->modifieddatetime->EditValue = FormatDateTime($this->modifieddatetime->CurrentValue, 8);
		$this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

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
					$doc->exportCaption($this->patient_id);
					$doc->exportCaption($this->name);
					$doc->exportCaption($this->relationship);
					$doc->exportCaption($this->telephone);
					$doc->exportCaption($this->address);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->patient_id);
					$doc->exportCaption($this->name);
					$doc->exportCaption($this->relationship);
					$doc->exportCaption($this->telephone);
					$doc->exportCaption($this->address);
					$doc->exportCaption($this->status);
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
						$doc->exportField($this->patient_id);
						$doc->exportField($this->name);
						$doc->exportField($this->relationship);
						$doc->exportField($this->telephone);
						$doc->exportField($this->address);
						$doc->exportField($this->status);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->patient_id);
						$doc->exportField($this->name);
						$doc->exportField($this->relationship);
						$doc->exportField($this->telephone);
						$doc->exportField($this->address);
						$doc->exportField($this->status);
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