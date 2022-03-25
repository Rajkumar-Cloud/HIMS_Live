<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for user_login
 */
class user_login extends DbTable
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
	public $User_Name;
	public $mail_id;
	public $mobile_no;
	public $password;
	public $email_verified;
	public $ReportTo;
	public $_UserLevel;
	public $CreatedDateTime;
	public $profilefield;
	public $_UserID;
	public $GroupID;
	public $HospID;
	public $PharID;
	public $StoreID;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'user_login';
		$this->TableName = 'user_login';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`user_login`";
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
		$this->id = new DbField('user_login', 'user_login', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// User_Name
		$this->User_Name = new DbField('user_login', 'user_login', 'x_User_Name', 'User_Name', '`User_Name`', '`User_Name`', 200, 45, -1, FALSE, '`User_Name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->User_Name->Nullable = FALSE; // NOT NULL field
		$this->User_Name->Required = TRUE; // Required field
		$this->User_Name->Sortable = TRUE; // Allow sort
		$this->User_Name->Lookup = new Lookup('User_Name', 'employee', FALSE, 'first_name', ["first_name","","",""], [], [], [], [], [], [], '', '');
		$this->fields['User_Name'] = &$this->User_Name;

		// mail_id
		$this->mail_id = new DbField('user_login', 'user_login', 'x_mail_id', 'mail_id', '`mail_id`', '`mail_id`', 200, 45, -1, FALSE, '`mail_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mail_id->Nullable = FALSE; // NOT NULL field
		$this->mail_id->Required = TRUE; // Required field
		$this->mail_id->Sortable = TRUE; // Allow sort
		$this->fields['mail_id'] = &$this->mail_id;

		// mobile_no
		$this->mobile_no = new DbField('user_login', 'user_login', 'x_mobile_no', 'mobile_no', '`mobile_no`', '`mobile_no`', 200, 45, -1, FALSE, '`mobile_no`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mobile_no->Nullable = FALSE; // NOT NULL field
		$this->mobile_no->Required = TRUE; // Required field
		$this->mobile_no->Sortable = TRUE; // Allow sort
		$this->fields['mobile_no'] = &$this->mobile_no;

		// password
		$this->password = new DbField('user_login', 'user_login', 'x_password', 'password', '`password`', '`password`', 200, 45, -1, FALSE, '`password`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'PASSWORD');
		$this->password->Nullable = FALSE; // NOT NULL field
		$this->password->Required = TRUE; // Required field
		$this->password->Sortable = TRUE; // Allow sort
		$this->fields['password'] = &$this->password;

		// email_verified
		$this->email_verified = new DbField('user_login', 'user_login', 'x_email_verified', 'email_verified', '`email_verified`', '`email_verified`', 200, 45, -1, FALSE, '`email_verified`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->email_verified->Sortable = TRUE; // Allow sort
		$this->email_verified->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->email_verified->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->email_verified->Lookup = new Lookup('email_verified', 'user_login', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->email_verified->OptionCount = 2;
		$this->fields['email_verified'] = &$this->email_verified;

		// ReportTo
		$this->ReportTo = new DbField('user_login', 'user_login', 'x_ReportTo', 'ReportTo', '`ReportTo`', '`ReportTo`', 3, 11, -1, FALSE, '`ReportTo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReportTo->Sortable = TRUE; // Allow sort
		$this->ReportTo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['ReportTo'] = &$this->ReportTo;

		// UserLevel
		$this->_UserLevel = new DbField('user_login', 'user_login', 'x__UserLevel', 'UserLevel', '`UserLevel`', '`UserLevel`', 3, 11, -1, FALSE, '`UserLevel`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->_UserLevel->Sortable = TRUE; // Allow sort
		$this->_UserLevel->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->_UserLevel->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->_UserLevel->Lookup = new Lookup('UserLevel', 'userlevels', FALSE, 'id', ["UserLevelsName","","",""], [], [], [], [], [], [], '', '');
		$this->_UserLevel->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['UserLevel'] = &$this->_UserLevel;

		// CreatedDateTime
		$this->CreatedDateTime = new DbField('user_login', 'user_login', 'x_CreatedDateTime', 'CreatedDateTime', '`CreatedDateTime`', CastDateFieldForLike("`CreatedDateTime`", 0, "DB"), 135, 19, 0, FALSE, '`CreatedDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CreatedDateTime->Sortable = TRUE; // Allow sort
		$this->CreatedDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['CreatedDateTime'] = &$this->CreatedDateTime;

		// profilefield
		$this->profilefield = new DbField('user_login', 'user_login', 'x_profilefield', 'profilefield', '`profilefield`', '`profilefield`', 200, 45, -1, FALSE, '`profilefield`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->profilefield->Sortable = TRUE; // Allow sort
		$this->fields['profilefield'] = &$this->profilefield;

		// UserID
		$this->_UserID = new DbField('user_login', 'user_login', 'x__UserID', 'UserID', '`UserID`', '`UserID`', 3, 11, -1, FALSE, '`UserID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_UserID->Sortable = TRUE; // Allow sort
		$this->_UserID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['UserID'] = &$this->_UserID;

		// GroupID
		$this->GroupID = new DbField('user_login', 'user_login', 'x_GroupID', 'GroupID', '`GroupID`', '`GroupID`', 3, 11, -1, FALSE, '`GroupID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->GroupID->Sortable = TRUE; // Allow sort
		$this->GroupID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['GroupID'] = &$this->GroupID;

		// HospID
		$this->HospID = new DbField('user_login', 'user_login', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->HospID->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->HospID->Lookup = new Lookup('HospID', 'hospital', FALSE, 'id', ["hospital","","",""], [], [], [], [], [], [], '', '');
		$this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HospID'] = &$this->HospID;

		// PharID
		$this->PharID = new DbField('user_login', 'user_login', 'x_PharID', 'PharID', '`PharID`', '`PharID`', 3, 11, -1, FALSE, '`PharID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->PharID->Sortable = TRUE; // Allow sort
		$this->PharID->Lookup = new Lookup('PharID', 'hospital_pharmacy', FALSE, 'id', ["pharmacy","","",""], [], [], [], [], [], [], '', '');
		$this->PharID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['PharID'] = &$this->PharID;

		// StoreID
		$this->StoreID = new DbField('user_login', 'user_login', 'x_StoreID', 'StoreID', '`StoreID`', '`StoreID`', 3, 11, -1, FALSE, '`StoreID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->StoreID->Sortable = TRUE; // Allow sort
		$this->StoreID->Lookup = new Lookup('StoreID', 'hospital_store', FALSE, 'id', ["pharmacy","","",""], [], [], [], [], [], [], '', '');
		$this->StoreID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['StoreID'] = &$this->StoreID;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`user_login`";
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
			if (Config("ENCRYPTED_PASSWORD") && $name == Config("LOGIN_PASSWORD_FIELD_NAME"))
				$value = Config("CASE_SENSITIVE_PASSWORD") ? EncryptPassword($value) : EncryptPassword(strtolower($value));
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
			if (Config("ENCRYPTED_PASSWORD") && $name == Config("LOGIN_PASSWORD_FIELD_NAME")) {
				if ($value == $this->fields[$name]->OldValue) // No need to update hashed password if not changed
					continue;
				$value = Config("CASE_SENSITIVE_PASSWORD") ? EncryptPassword($value) : EncryptPassword(strtolower($value));
			}
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
		$this->User_Name->DbValue = $row['User_Name'];
		$this->mail_id->DbValue = $row['mail_id'];
		$this->mobile_no->DbValue = $row['mobile_no'];
		$this->password->DbValue = $row['password'];
		$this->email_verified->DbValue = $row['email_verified'];
		$this->ReportTo->DbValue = $row['ReportTo'];
		$this->_UserLevel->DbValue = $row['UserLevel'];
		$this->CreatedDateTime->DbValue = $row['CreatedDateTime'];
		$this->profilefield->DbValue = $row['profilefield'];
		$this->_UserID->DbValue = $row['UserID'];
		$this->GroupID->DbValue = $row['GroupID'];
		$this->HospID->DbValue = $row['HospID'];
		$this->PharID->DbValue = $row['PharID'];
		$this->StoreID->DbValue = $row['StoreID'];
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
			return "user_loginlist.php";
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
		if ($pageName == "user_loginview.php")
			return $Language->phrase("View");
		elseif ($pageName == "user_loginedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "user_loginadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "user_loginlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("user_loginview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("user_loginview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "user_loginadd.php?" . $this->getUrlParm($parm);
		else
			$url = "user_loginadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("user_loginedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("user_loginadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("user_logindelete.php", $this->getUrlParm());
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
		$this->User_Name->setDbValue($rs->fields('User_Name'));
		$this->mail_id->setDbValue($rs->fields('mail_id'));
		$this->mobile_no->setDbValue($rs->fields('mobile_no'));
		$this->password->setDbValue($rs->fields('password'));
		$this->email_verified->setDbValue($rs->fields('email_verified'));
		$this->ReportTo->setDbValue($rs->fields('ReportTo'));
		$this->_UserLevel->setDbValue($rs->fields('UserLevel'));
		$this->CreatedDateTime->setDbValue($rs->fields('CreatedDateTime'));
		$this->profilefield->setDbValue($rs->fields('profilefield'));
		$this->_UserID->setDbValue($rs->fields('UserID'));
		$this->GroupID->setDbValue($rs->fields('GroupID'));
		$this->HospID->setDbValue($rs->fields('HospID'));
		$this->PharID->setDbValue($rs->fields('PharID'));
		$this->StoreID->setDbValue($rs->fields('StoreID'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// User_Name
		// mail_id
		// mobile_no
		// password
		// email_verified
		// ReportTo
		// UserLevel
		// CreatedDateTime
		// profilefield
		// UserID
		// GroupID
		// HospID
		// PharID
		// StoreID
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// User_Name
		$this->User_Name->ViewValue = $this->User_Name->CurrentValue;
		$curVal = strval($this->User_Name->CurrentValue);
		if ($curVal != "") {
			$this->User_Name->ViewValue = $this->User_Name->lookupCacheOption($curVal);
			if ($this->User_Name->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`first_name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->User_Name->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->User_Name->ViewValue = $this->User_Name->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->User_Name->ViewValue = $this->User_Name->CurrentValue;
				}
			}
		} else {
			$this->User_Name->ViewValue = NULL;
		}
		$this->User_Name->ViewCustomAttributes = "";

		// mail_id
		$this->mail_id->ViewValue = $this->mail_id->CurrentValue;
		$this->mail_id->ViewCustomAttributes = "";

		// mobile_no
		$this->mobile_no->ViewValue = $this->mobile_no->CurrentValue;
		$this->mobile_no->ViewCustomAttributes = "";

		// password
		$this->password->ViewValue = $Language->phrase("PasswordMask");
		$this->password->ViewCustomAttributes = "";

		// email_verified
		if (strval($this->email_verified->CurrentValue) != "") {
			$this->email_verified->ViewValue = $this->email_verified->optionCaption($this->email_verified->CurrentValue);
		} else {
			$this->email_verified->ViewValue = NULL;
		}
		$this->email_verified->ViewCustomAttributes = "";

		// ReportTo
		$this->ReportTo->ViewValue = $this->ReportTo->CurrentValue;
		$this->ReportTo->ViewValue = FormatNumber($this->ReportTo->ViewValue, 0, -2, -2, -2);
		$this->ReportTo->ViewCustomAttributes = "";

		// UserLevel
		if ($Security->canAdmin()) { // System admin
			$curVal = strval($this->_UserLevel->CurrentValue);
			if ($curVal != "") {
				$this->_UserLevel->ViewValue = $this->_UserLevel->lookupCacheOption($curVal);
				if ($this->_UserLevel->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->_UserLevel->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->_UserLevel->ViewValue = $this->_UserLevel->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->_UserLevel->ViewValue = $this->_UserLevel->CurrentValue;
					}
				}
			} else {
				$this->_UserLevel->ViewValue = NULL;
			}
		} else {
			$this->_UserLevel->ViewValue = $Language->phrase("PasswordMask");
		}
		$this->_UserLevel->ViewCustomAttributes = "";

		// CreatedDateTime
		$this->CreatedDateTime->ViewValue = $this->CreatedDateTime->CurrentValue;
		$this->CreatedDateTime->ViewValue = FormatDateTime($this->CreatedDateTime->ViewValue, 0);
		$this->CreatedDateTime->ViewCustomAttributes = "";

		// profilefield
		$this->profilefield->ViewValue = $this->profilefield->CurrentValue;
		$this->profilefield->ViewCustomAttributes = "";

		// UserID
		$this->_UserID->ViewValue = $this->_UserID->CurrentValue;
		$this->_UserID->ViewValue = FormatNumber($this->_UserID->ViewValue, 0, -2, -2, -2);
		$this->_UserID->ViewCustomAttributes = "";

		// GroupID
		$this->GroupID->ViewValue = $this->GroupID->CurrentValue;
		$this->GroupID->ViewValue = FormatNumber($this->GroupID->ViewValue, 0, -2, -2, -2);
		$this->GroupID->ViewCustomAttributes = "";

		// HospID
		$curVal = strval($this->HospID->CurrentValue);
		if ($curVal != "") {
			$this->HospID->ViewValue = $this->HospID->lookupCacheOption($curVal);
			if ($this->HospID->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->HospID->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
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

		// PharID
		$curVal = strval($this->PharID->CurrentValue);
		if ($curVal != "") {
			$this->PharID->ViewValue = $this->PharID->lookupCacheOption($curVal);
			if ($this->PharID->ViewValue === NULL) { // Lookup from database
				$arwrk = explode(",", $curVal);
				$filterWrk = "";
				foreach ($arwrk as $wrk) {
					if ($filterWrk != "")
						$filterWrk .= " OR ";
					$filterWrk .= "`id`" . SearchString("=", trim($wrk), DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->PharID->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$this->PharID->ViewValue = new OptionValues();
					$ari = 0;
					while (!$rswrk->EOF) {
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->PharID->ViewValue->add($this->PharID->displayValue($arwrk));
						$rswrk->MoveNext();
						$ari++;
					}
					$rswrk->Close();
				} else {
					$this->PharID->ViewValue = $this->PharID->CurrentValue;
				}
			}
		} else {
			$this->PharID->ViewValue = NULL;
		}
		$this->PharID->ViewCustomAttributes = "";

		// StoreID
		$curVal = strval($this->StoreID->CurrentValue);
		if ($curVal != "") {
			$this->StoreID->ViewValue = $this->StoreID->lookupCacheOption($curVal);
			if ($this->StoreID->ViewValue === NULL) { // Lookup from database
				$arwrk = explode(",", $curVal);
				$filterWrk = "";
				foreach ($arwrk as $wrk) {
					if ($filterWrk != "")
						$filterWrk .= " OR ";
					$filterWrk .= "`id`" . SearchString("=", trim($wrk), DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->StoreID->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$this->StoreID->ViewValue = new OptionValues();
					$ari = 0;
					while (!$rswrk->EOF) {
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->StoreID->ViewValue->add($this->StoreID->displayValue($arwrk));
						$rswrk->MoveNext();
						$ari++;
					}
					$rswrk->Close();
				} else {
					$this->StoreID->ViewValue = $this->StoreID->CurrentValue;
				}
			}
		} else {
			$this->StoreID->ViewValue = NULL;
		}
		$this->StoreID->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// User_Name
		$this->User_Name->LinkCustomAttributes = "";
		$this->User_Name->HrefValue = "";
		$this->User_Name->TooltipValue = "";

		// mail_id
		$this->mail_id->LinkCustomAttributes = "";
		$this->mail_id->HrefValue = "";
		$this->mail_id->TooltipValue = "";

		// mobile_no
		$this->mobile_no->LinkCustomAttributes = "";
		$this->mobile_no->HrefValue = "";
		$this->mobile_no->TooltipValue = "";

		// password
		$this->password->LinkCustomAttributes = "";
		$this->password->HrefValue = "";
		$this->password->TooltipValue = "";

		// email_verified
		$this->email_verified->LinkCustomAttributes = "";
		$this->email_verified->HrefValue = "";
		$this->email_verified->TooltipValue = "";

		// ReportTo
		$this->ReportTo->LinkCustomAttributes = "";
		$this->ReportTo->HrefValue = "";
		$this->ReportTo->TooltipValue = "";

		// UserLevel
		$this->_UserLevel->LinkCustomAttributes = "";
		$this->_UserLevel->HrefValue = "";
		$this->_UserLevel->TooltipValue = "";

		// CreatedDateTime
		$this->CreatedDateTime->LinkCustomAttributes = "";
		$this->CreatedDateTime->HrefValue = "";
		$this->CreatedDateTime->TooltipValue = "";

		// profilefield
		$this->profilefield->LinkCustomAttributes = "";
		$this->profilefield->HrefValue = "";
		$this->profilefield->TooltipValue = "";

		// UserID
		$this->_UserID->LinkCustomAttributes = "";
		$this->_UserID->HrefValue = "";
		$this->_UserID->TooltipValue = "";

		// GroupID
		$this->GroupID->LinkCustomAttributes = "";
		$this->GroupID->HrefValue = "";
		$this->GroupID->TooltipValue = "";

		// HospID
		$this->HospID->LinkCustomAttributes = "";
		$this->HospID->HrefValue = "";
		$this->HospID->TooltipValue = "";

		// PharID
		$this->PharID->LinkCustomAttributes = "";
		$this->PharID->HrefValue = "";
		$this->PharID->TooltipValue = "";

		// StoreID
		$this->StoreID->LinkCustomAttributes = "";
		$this->StoreID->HrefValue = "";
		$this->StoreID->TooltipValue = "";

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

		// User_Name
		$this->User_Name->EditAttrs["class"] = "form-control";
		$this->User_Name->EditCustomAttributes = "";
		if (!$this->User_Name->Raw)
			$this->User_Name->CurrentValue = HtmlDecode($this->User_Name->CurrentValue);
		$this->User_Name->EditValue = $this->User_Name->CurrentValue;
		$this->User_Name->PlaceHolder = RemoveHtml($this->User_Name->caption());

		// mail_id
		$this->mail_id->EditAttrs["class"] = "form-control";
		$this->mail_id->EditCustomAttributes = "";
		if (!$this->mail_id->Raw)
			$this->mail_id->CurrentValue = HtmlDecode($this->mail_id->CurrentValue);
		$this->mail_id->EditValue = $this->mail_id->CurrentValue;
		$this->mail_id->PlaceHolder = RemoveHtml($this->mail_id->caption());

		// mobile_no
		$this->mobile_no->EditAttrs["class"] = "form-control";
		$this->mobile_no->EditCustomAttributes = "";
		if (!$this->mobile_no->Raw)
			$this->mobile_no->CurrentValue = HtmlDecode($this->mobile_no->CurrentValue);
		$this->mobile_no->EditValue = $this->mobile_no->CurrentValue;
		$this->mobile_no->PlaceHolder = RemoveHtml($this->mobile_no->caption());

		// password
		$this->password->EditAttrs["class"] = "form-control";
		$this->password->EditCustomAttributes = "";
		$this->password->EditValue = $this->password->CurrentValue;
		$this->password->PlaceHolder = RemoveHtml($this->password->caption());

		// email_verified
		$this->email_verified->EditAttrs["class"] = "form-control";
		$this->email_verified->EditCustomAttributes = "";
		$this->email_verified->EditValue = $this->email_verified->options(TRUE);

		// ReportTo
		// UserLevel

		$this->_UserLevel->EditAttrs["class"] = "form-control";
		$this->_UserLevel->EditCustomAttributes = "";
		if (!$Security->canAdmin()) { // System admin
			$this->_UserLevel->EditValue = $Language->phrase("PasswordMask");
		} else {
		}

		// CreatedDateTime
		// profilefield
		// UserID

		$this->_UserID->EditAttrs["class"] = "form-control";
		$this->_UserID->EditCustomAttributes = "";
		$this->_UserID->EditValue = $this->_UserID->CurrentValue;
		$this->_UserID->PlaceHolder = RemoveHtml($this->_UserID->caption());

		// GroupID
		// HospID

		$this->HospID->EditAttrs["class"] = "form-control";
		$this->HospID->EditCustomAttributes = "";

		// PharID
		$this->PharID->EditCustomAttributes = "";

		// StoreID
		$this->StoreID->EditCustomAttributes = "";

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
					$doc->exportCaption($this->User_Name);
					$doc->exportCaption($this->mail_id);
					$doc->exportCaption($this->mobile_no);
					$doc->exportCaption($this->password);
					$doc->exportCaption($this->email_verified);
					$doc->exportCaption($this->ReportTo);
					$doc->exportCaption($this->_UserLevel);
					$doc->exportCaption($this->CreatedDateTime);
					$doc->exportCaption($this->profilefield);
					$doc->exportCaption($this->_UserID);
					$doc->exportCaption($this->GroupID);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->PharID);
					$doc->exportCaption($this->StoreID);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->User_Name);
					$doc->exportCaption($this->mail_id);
					$doc->exportCaption($this->mobile_no);
					$doc->exportCaption($this->password);
					$doc->exportCaption($this->email_verified);
					$doc->exportCaption($this->ReportTo);
					$doc->exportCaption($this->_UserLevel);
					$doc->exportCaption($this->CreatedDateTime);
					$doc->exportCaption($this->profilefield);
					$doc->exportCaption($this->_UserID);
					$doc->exportCaption($this->GroupID);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->PharID);
					$doc->exportCaption($this->StoreID);
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
						$doc->exportField($this->User_Name);
						$doc->exportField($this->mail_id);
						$doc->exportField($this->mobile_no);
						$doc->exportField($this->password);
						$doc->exportField($this->email_verified);
						$doc->exportField($this->ReportTo);
						$doc->exportField($this->_UserLevel);
						$doc->exportField($this->CreatedDateTime);
						$doc->exportField($this->profilefield);
						$doc->exportField($this->_UserID);
						$doc->exportField($this->GroupID);
						$doc->exportField($this->HospID);
						$doc->exportField($this->PharID);
						$doc->exportField($this->StoreID);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->User_Name);
						$doc->exportField($this->mail_id);
						$doc->exportField($this->mobile_no);
						$doc->exportField($this->password);
						$doc->exportField($this->email_verified);
						$doc->exportField($this->ReportTo);
						$doc->exportField($this->_UserLevel);
						$doc->exportField($this->CreatedDateTime);
						$doc->exportField($this->profilefield);
						$doc->exportField($this->_UserID);
						$doc->exportField($this->GroupID);
						$doc->exportField($this->HospID);
						$doc->exportField($this->PharID);
						$doc->exportField($this->StoreID);
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