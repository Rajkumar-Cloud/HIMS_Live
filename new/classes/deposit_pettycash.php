<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for deposit_pettycash
 */
class deposit_pettycash extends DbTable
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
	public $TransType;
	public $ShiftNumber;
	public $TerminalNumber;
	public $User;
	public $OpenedDateTime;
	public $AccoundHead;
	public $Amount;
	public $Narration;
	public $CreatedBy;
	public $CreatedDateTime;
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
		$this->TableVar = 'deposit_pettycash';
		$this->TableName = 'deposit_pettycash';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`deposit_pettycash`";
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
		$this->id = new DbField('deposit_pettycash', 'deposit_pettycash', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// TransType
		$this->TransType = new DbField('deposit_pettycash', 'deposit_pettycash', 'x_TransType', 'TransType', '`TransType`', '`TransType`', 200, 45, -1, FALSE, '`TransType`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TransType->Sortable = TRUE; // Allow sort
		$this->TransType->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TransType->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->TransType->Lookup = new Lookup('TransType', 'deposit_pettycash', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->TransType->OptionCount = 2;
		$this->fields['TransType'] = &$this->TransType;

		// ShiftNumber
		$this->ShiftNumber = new DbField('deposit_pettycash', 'deposit_pettycash', 'x_ShiftNumber', 'ShiftNumber', '`ShiftNumber`', '`ShiftNumber`', 200, 45, -1, FALSE, '`ShiftNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ShiftNumber->Sortable = TRUE; // Allow sort
		$this->fields['ShiftNumber'] = &$this->ShiftNumber;

		// TerminalNumber
		$this->TerminalNumber = new DbField('deposit_pettycash', 'deposit_pettycash', 'x_TerminalNumber', 'TerminalNumber', '`TerminalNumber`', '`TerminalNumber`', 200, 45, -1, FALSE, '`TerminalNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TerminalNumber->Sortable = TRUE; // Allow sort
		$this->fields['TerminalNumber'] = &$this->TerminalNumber;

		// User
		$this->User = new DbField('deposit_pettycash', 'deposit_pettycash', 'x_User', 'User', '`User`', '`User`', 200, 45, -1, FALSE, '`User`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->User->Sortable = TRUE; // Allow sort
		$this->fields['User'] = &$this->User;

		// OpenedDateTime
		$this->OpenedDateTime = new DbField('deposit_pettycash', 'deposit_pettycash', 'x_OpenedDateTime', 'OpenedDateTime', '`OpenedDateTime`', CastDateFieldForLike("`OpenedDateTime`", 0, "DB"), 135, 19, 0, FALSE, '`OpenedDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OpenedDateTime->Sortable = TRUE; // Allow sort
		$this->OpenedDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['OpenedDateTime'] = &$this->OpenedDateTime;

		// AccoundHead
		$this->AccoundHead = new DbField('deposit_pettycash', 'deposit_pettycash', 'x_AccoundHead', 'AccoundHead', '`AccoundHead`', '`AccoundHead`', 200, 45, -1, FALSE, '`AccoundHead`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->AccoundHead->Sortable = TRUE; // Allow sort
		$this->AccoundHead->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->AccoundHead->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->AccoundHead->Lookup = new Lookup('AccoundHead', 'deposit_account_head', FALSE, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
		$this->fields['AccoundHead'] = &$this->AccoundHead;

		// Amount
		$this->Amount = new DbField('deposit_pettycash', 'deposit_pettycash', 'x_Amount', 'Amount', '`Amount`', '`Amount`', 131, 10, -1, FALSE, '`Amount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Amount->Sortable = TRUE; // Allow sort
		$this->Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Amount'] = &$this->Amount;

		// Narration
		$this->Narration = new DbField('deposit_pettycash', 'deposit_pettycash', 'x_Narration', 'Narration', '`Narration`', '`Narration`', 201, 405, -1, FALSE, '`Narration`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Narration->Sortable = TRUE; // Allow sort
		$this->fields['Narration'] = &$this->Narration;

		// CreatedBy
		$this->CreatedBy = new DbField('deposit_pettycash', 'deposit_pettycash', 'x_CreatedBy', 'CreatedBy', '`CreatedBy`', '`CreatedBy`', 200, 45, -1, FALSE, '`CreatedBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CreatedBy->Sortable = TRUE; // Allow sort
		$this->fields['CreatedBy'] = &$this->CreatedBy;

		// CreatedDateTime
		$this->CreatedDateTime = new DbField('deposit_pettycash', 'deposit_pettycash', 'x_CreatedDateTime', 'CreatedDateTime', '`CreatedDateTime`', CastDateFieldForLike("`CreatedDateTime`", 0, "DB"), 135, 19, 0, FALSE, '`CreatedDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CreatedDateTime->Sortable = TRUE; // Allow sort
		$this->CreatedDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['CreatedDateTime'] = &$this->CreatedDateTime;

		// ModifiedBy
		$this->ModifiedBy = new DbField('deposit_pettycash', 'deposit_pettycash', 'x_ModifiedBy', 'ModifiedBy', '`ModifiedBy`', '`ModifiedBy`', 200, 45, -1, FALSE, '`ModifiedBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ModifiedBy->Sortable = TRUE; // Allow sort
		$this->fields['ModifiedBy'] = &$this->ModifiedBy;

		// ModifiedDateTime
		$this->ModifiedDateTime = new DbField('deposit_pettycash', 'deposit_pettycash', 'x_ModifiedDateTime', 'ModifiedDateTime', '`ModifiedDateTime`', CastDateFieldForLike("`ModifiedDateTime`", 0, "DB"), 135, 19, 0, FALSE, '`ModifiedDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ModifiedDateTime->Sortable = TRUE; // Allow sort
		$this->ModifiedDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
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
		} else {
			$fld->setSort("");
		}
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`deposit_pettycash`";
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
		$this->TransType->DbValue = $row['TransType'];
		$this->ShiftNumber->DbValue = $row['ShiftNumber'];
		$this->TerminalNumber->DbValue = $row['TerminalNumber'];
		$this->User->DbValue = $row['User'];
		$this->OpenedDateTime->DbValue = $row['OpenedDateTime'];
		$this->AccoundHead->DbValue = $row['AccoundHead'];
		$this->Amount->DbValue = $row['Amount'];
		$this->Narration->DbValue = $row['Narration'];
		$this->CreatedBy->DbValue = $row['CreatedBy'];
		$this->CreatedDateTime->DbValue = $row['CreatedDateTime'];
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
			return "deposit_pettycashlist.php";
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
		if ($pageName == "deposit_pettycashview.php")
			return $Language->phrase("View");
		elseif ($pageName == "deposit_pettycashedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "deposit_pettycashadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "deposit_pettycashlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("deposit_pettycashview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("deposit_pettycashview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "deposit_pettycashadd.php?" . $this->getUrlParm($parm);
		else
			$url = "deposit_pettycashadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("deposit_pettycashedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("deposit_pettycashadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("deposit_pettycashdelete.php", $this->getUrlParm());
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
		$this->TransType->setDbValue($rs->fields('TransType'));
		$this->ShiftNumber->setDbValue($rs->fields('ShiftNumber'));
		$this->TerminalNumber->setDbValue($rs->fields('TerminalNumber'));
		$this->User->setDbValue($rs->fields('User'));
		$this->OpenedDateTime->setDbValue($rs->fields('OpenedDateTime'));
		$this->AccoundHead->setDbValue($rs->fields('AccoundHead'));
		$this->Amount->setDbValue($rs->fields('Amount'));
		$this->Narration->setDbValue($rs->fields('Narration'));
		$this->CreatedBy->setDbValue($rs->fields('CreatedBy'));
		$this->CreatedDateTime->setDbValue($rs->fields('CreatedDateTime'));
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
		// TransType
		// ShiftNumber
		// TerminalNumber
		// User
		// OpenedDateTime
		// AccoundHead
		// Amount
		// Narration
		// CreatedBy
		// CreatedDateTime
		// ModifiedBy
		// ModifiedDateTime
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// TransType
		if (strval($this->TransType->CurrentValue) != "") {
			$this->TransType->ViewValue = $this->TransType->optionCaption($this->TransType->CurrentValue);
		} else {
			$this->TransType->ViewValue = NULL;
		}
		$this->TransType->ViewCustomAttributes = "";

		// ShiftNumber
		$this->ShiftNumber->ViewValue = $this->ShiftNumber->CurrentValue;
		$this->ShiftNumber->ViewCustomAttributes = "";

		// TerminalNumber
		$this->TerminalNumber->ViewValue = $this->TerminalNumber->CurrentValue;
		$this->TerminalNumber->ViewCustomAttributes = "";

		// User
		$this->User->ViewValue = $this->User->CurrentValue;
		$this->User->ViewCustomAttributes = "";

		// OpenedDateTime
		$this->OpenedDateTime->ViewValue = $this->OpenedDateTime->CurrentValue;
		$this->OpenedDateTime->ViewValue = FormatDateTime($this->OpenedDateTime->ViewValue, 0);
		$this->OpenedDateTime->ViewCustomAttributes = "";

		// AccoundHead
		$curVal = strval($this->AccoundHead->CurrentValue);
		if ($curVal != "") {
			$this->AccoundHead->ViewValue = $this->AccoundHead->lookupCacheOption($curVal);
			if ($this->AccoundHead->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->AccoundHead->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->AccoundHead->ViewValue = $this->AccoundHead->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->AccoundHead->ViewValue = $this->AccoundHead->CurrentValue;
				}
			}
		} else {
			$this->AccoundHead->ViewValue = NULL;
		}
		$this->AccoundHead->ViewCustomAttributes = "";

		// Amount
		$this->Amount->ViewValue = $this->Amount->CurrentValue;
		$this->Amount->ViewValue = FormatNumber($this->Amount->ViewValue, 2, -2, -2, -2);
		$this->Amount->ViewCustomAttributes = "";

		// Narration
		$this->Narration->ViewValue = $this->Narration->CurrentValue;
		$this->Narration->ViewCustomAttributes = "";

		// CreatedBy
		$this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
		$this->CreatedBy->ViewCustomAttributes = "";

		// CreatedDateTime
		$this->CreatedDateTime->ViewValue = $this->CreatedDateTime->CurrentValue;
		$this->CreatedDateTime->ViewValue = FormatDateTime($this->CreatedDateTime->ViewValue, 0);
		$this->CreatedDateTime->ViewCustomAttributes = "";

		// ModifiedBy
		$this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
		$this->ModifiedBy->ViewCustomAttributes = "";

		// ModifiedDateTime
		$this->ModifiedDateTime->ViewValue = $this->ModifiedDateTime->CurrentValue;
		$this->ModifiedDateTime->ViewValue = FormatDateTime($this->ModifiedDateTime->ViewValue, 0);
		$this->ModifiedDateTime->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// TransType
		$this->TransType->LinkCustomAttributes = "";
		$this->TransType->HrefValue = "";
		$this->TransType->TooltipValue = "";

		// ShiftNumber
		$this->ShiftNumber->LinkCustomAttributes = "";
		$this->ShiftNumber->HrefValue = "";
		$this->ShiftNumber->TooltipValue = "";

		// TerminalNumber
		$this->TerminalNumber->LinkCustomAttributes = "";
		$this->TerminalNumber->HrefValue = "";
		$this->TerminalNumber->TooltipValue = "";

		// User
		$this->User->LinkCustomAttributes = "";
		$this->User->HrefValue = "";
		$this->User->TooltipValue = "";

		// OpenedDateTime
		$this->OpenedDateTime->LinkCustomAttributes = "";
		$this->OpenedDateTime->HrefValue = "";
		$this->OpenedDateTime->TooltipValue = "";

		// AccoundHead
		$this->AccoundHead->LinkCustomAttributes = "";
		$this->AccoundHead->HrefValue = "";
		$this->AccoundHead->TooltipValue = "";

		// Amount
		$this->Amount->LinkCustomAttributes = "";
		$this->Amount->HrefValue = "";
		$this->Amount->TooltipValue = "";

		// Narration
		$this->Narration->LinkCustomAttributes = "";
		$this->Narration->HrefValue = "";
		$this->Narration->TooltipValue = "";

		// CreatedBy
		$this->CreatedBy->LinkCustomAttributes = "";
		$this->CreatedBy->HrefValue = "";
		$this->CreatedBy->TooltipValue = "";

		// CreatedDateTime
		$this->CreatedDateTime->LinkCustomAttributes = "";
		$this->CreatedDateTime->HrefValue = "";
		$this->CreatedDateTime->TooltipValue = "";

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

		// TransType
		$this->TransType->EditAttrs["class"] = "form-control";
		$this->TransType->EditCustomAttributes = "";
		$this->TransType->EditValue = $this->TransType->options(TRUE);

		// ShiftNumber
		$this->ShiftNumber->EditAttrs["class"] = "form-control";
		$this->ShiftNumber->EditCustomAttributes = "";
		if (!$this->ShiftNumber->Raw)
			$this->ShiftNumber->CurrentValue = HtmlDecode($this->ShiftNumber->CurrentValue);
		$this->ShiftNumber->EditValue = $this->ShiftNumber->CurrentValue;
		$this->ShiftNumber->PlaceHolder = RemoveHtml($this->ShiftNumber->caption());

		// TerminalNumber
		$this->TerminalNumber->EditAttrs["class"] = "form-control";
		$this->TerminalNumber->EditCustomAttributes = "";
		if (!$this->TerminalNumber->Raw)
			$this->TerminalNumber->CurrentValue = HtmlDecode($this->TerminalNumber->CurrentValue);
		$this->TerminalNumber->EditValue = $this->TerminalNumber->CurrentValue;
		$this->TerminalNumber->PlaceHolder = RemoveHtml($this->TerminalNumber->caption());

		// User
		$this->User->EditAttrs["class"] = "form-control";
		$this->User->EditCustomAttributes = "";
		if (!$this->User->Raw)
			$this->User->CurrentValue = HtmlDecode($this->User->CurrentValue);
		$this->User->EditValue = $this->User->CurrentValue;
		$this->User->PlaceHolder = RemoveHtml($this->User->caption());

		// OpenedDateTime
		$this->OpenedDateTime->EditAttrs["class"] = "form-control";
		$this->OpenedDateTime->EditCustomAttributes = "";
		$this->OpenedDateTime->EditValue = FormatDateTime($this->OpenedDateTime->CurrentValue, 8);
		$this->OpenedDateTime->PlaceHolder = RemoveHtml($this->OpenedDateTime->caption());

		// AccoundHead
		$this->AccoundHead->EditAttrs["class"] = "form-control";
		$this->AccoundHead->EditCustomAttributes = "";

		// Amount
		$this->Amount->EditAttrs["class"] = "form-control";
		$this->Amount->EditCustomAttributes = "";
		$this->Amount->EditValue = $this->Amount->CurrentValue;
		$this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());
		if (strval($this->Amount->EditValue) != "" && is_numeric($this->Amount->EditValue))
			$this->Amount->EditValue = FormatNumber($this->Amount->EditValue, -2, -2, -2, -2);
		

		// Narration
		$this->Narration->EditAttrs["class"] = "form-control";
		$this->Narration->EditCustomAttributes = "";
		$this->Narration->EditValue = $this->Narration->CurrentValue;
		$this->Narration->PlaceHolder = RemoveHtml($this->Narration->caption());

		// CreatedBy
		// CreatedDateTime
		// ModifiedBy
		// ModifiedDateTime
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
					$doc->exportCaption($this->TransType);
					$doc->exportCaption($this->ShiftNumber);
					$doc->exportCaption($this->TerminalNumber);
					$doc->exportCaption($this->User);
					$doc->exportCaption($this->OpenedDateTime);
					$doc->exportCaption($this->AccoundHead);
					$doc->exportCaption($this->Amount);
					$doc->exportCaption($this->Narration);
					$doc->exportCaption($this->CreatedBy);
					$doc->exportCaption($this->CreatedDateTime);
					$doc->exportCaption($this->ModifiedBy);
					$doc->exportCaption($this->ModifiedDateTime);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->TransType);
					$doc->exportCaption($this->ShiftNumber);
					$doc->exportCaption($this->TerminalNumber);
					$doc->exportCaption($this->User);
					$doc->exportCaption($this->OpenedDateTime);
					$doc->exportCaption($this->AccoundHead);
					$doc->exportCaption($this->Amount);
					$doc->exportCaption($this->CreatedBy);
					$doc->exportCaption($this->CreatedDateTime);
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
						$doc->exportField($this->TransType);
						$doc->exportField($this->ShiftNumber);
						$doc->exportField($this->TerminalNumber);
						$doc->exportField($this->User);
						$doc->exportField($this->OpenedDateTime);
						$doc->exportField($this->AccoundHead);
						$doc->exportField($this->Amount);
						$doc->exportField($this->Narration);
						$doc->exportField($this->CreatedBy);
						$doc->exportField($this->CreatedDateTime);
						$doc->exportField($this->ModifiedBy);
						$doc->exportField($this->ModifiedDateTime);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->TransType);
						$doc->exportField($this->ShiftNumber);
						$doc->exportField($this->TerminalNumber);
						$doc->exportField($this->User);
						$doc->exportField($this->OpenedDateTime);
						$doc->exportField($this->AccoundHead);
						$doc->exportField($this->Amount);
						$doc->exportField($this->CreatedBy);
						$doc->exportField($this->CreatedDateTime);
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