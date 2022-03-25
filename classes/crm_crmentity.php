<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for crm_crmentity
 */
class crm_crmentity extends DbTable
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
	public $crmid;
	public $smcreatorid;
	public $smownerid;
	public $shownerid;
	public $modifiedby;
	public $setype;
	public $description;
	public $attention;
	public $createdtime;
	public $modifiedtime;
	public $viewedtime;
	public $status;
	public $version;
	public $presence;
	public $deleted;
	public $was_read;
	public $_private;
	public $users;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'crm_crmentity';
		$this->TableName = 'crm_crmentity';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`crm_crmentity`";
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

		// crmid
		$this->crmid = new DbField('crm_crmentity', 'crm_crmentity', 'x_crmid', 'crmid', '`crmid`', '`crmid`', 3, -1, FALSE, '`crmid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->crmid->IsAutoIncrement = TRUE; // Autoincrement field
		$this->crmid->IsPrimaryKey = TRUE; // Primary key field
		$this->crmid->Sortable = TRUE; // Allow sort
		$this->crmid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['crmid'] = &$this->crmid;

		// smcreatorid
		$this->smcreatorid = new DbField('crm_crmentity', 'crm_crmentity', 'x_smcreatorid', 'smcreatorid', '`smcreatorid`', '`smcreatorid`', 18, -1, FALSE, '`smcreatorid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->smcreatorid->Nullable = FALSE; // NOT NULL field
		$this->smcreatorid->Sortable = TRUE; // Allow sort
		$this->smcreatorid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['smcreatorid'] = &$this->smcreatorid;

		// smownerid
		$this->smownerid = new DbField('crm_crmentity', 'crm_crmentity', 'x_smownerid', 'smownerid', '`smownerid`', '`smownerid`', 18, -1, FALSE, '`smownerid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->smownerid->Nullable = FALSE; // NOT NULL field
		$this->smownerid->Sortable = TRUE; // Allow sort
		$this->smownerid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['smownerid'] = &$this->smownerid;

		// shownerid
		$this->shownerid = new DbField('crm_crmentity', 'crm_crmentity', 'x_shownerid', 'shownerid', '`shownerid`', '`shownerid`', 16, -1, FALSE, '`shownerid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->shownerid->Sortable = TRUE; // Allow sort
		$this->shownerid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['shownerid'] = &$this->shownerid;

		// modifiedby
		$this->modifiedby = new DbField('crm_crmentity', 'crm_crmentity', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 18, -1, FALSE, '`modifiedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifiedby->Nullable = FALSE; // NOT NULL field
		$this->modifiedby->Sortable = TRUE; // Allow sort
		$this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['modifiedby'] = &$this->modifiedby;

		// setype
		$this->setype = new DbField('crm_crmentity', 'crm_crmentity', 'x_setype', 'setype', '`setype`', '`setype`', 200, -1, FALSE, '`setype`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->setype->Nullable = FALSE; // NOT NULL field
		$this->setype->Required = TRUE; // Required field
		$this->setype->Sortable = TRUE; // Allow sort
		$this->fields['setype'] = &$this->setype;

		// description
		$this->description = new DbField('crm_crmentity', 'crm_crmentity', 'x_description', 'description', '`description`', '`description`', 201, -1, FALSE, '`description`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->description->Sortable = TRUE; // Allow sort
		$this->fields['description'] = &$this->description;

		// attention
		$this->attention = new DbField('crm_crmentity', 'crm_crmentity', 'x_attention', 'attention', '`attention`', '`attention`', 201, -1, FALSE, '`attention`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->attention->Sortable = TRUE; // Allow sort
		$this->fields['attention'] = &$this->attention;

		// createdtime
		$this->createdtime = new DbField('crm_crmentity', 'crm_crmentity', 'x_createdtime', 'createdtime', '`createdtime`', CastDateFieldForLike('`createdtime`', 0, "DB"), 135, 0, FALSE, '`createdtime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdtime->Nullable = FALSE; // NOT NULL field
		$this->createdtime->Required = TRUE; // Required field
		$this->createdtime->Sortable = TRUE; // Allow sort
		$this->createdtime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['createdtime'] = &$this->createdtime;

		// modifiedtime
		$this->modifiedtime = new DbField('crm_crmentity', 'crm_crmentity', 'x_modifiedtime', 'modifiedtime', '`modifiedtime`', CastDateFieldForLike('`modifiedtime`', 0, "DB"), 135, 0, FALSE, '`modifiedtime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifiedtime->Nullable = FALSE; // NOT NULL field
		$this->modifiedtime->Required = TRUE; // Required field
		$this->modifiedtime->Sortable = TRUE; // Allow sort
		$this->modifiedtime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['modifiedtime'] = &$this->modifiedtime;

		// viewedtime
		$this->viewedtime = new DbField('crm_crmentity', 'crm_crmentity', 'x_viewedtime', 'viewedtime', '`viewedtime`', CastDateFieldForLike('`viewedtime`', 0, "DB"), 135, 0, FALSE, '`viewedtime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->viewedtime->Sortable = TRUE; // Allow sort
		$this->viewedtime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['viewedtime'] = &$this->viewedtime;

		// status
		$this->status = new DbField('crm_crmentity', 'crm_crmentity', 'x_status', 'status', '`status`', '`status`', 200, -1, FALSE, '`status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->status->Sortable = TRUE; // Allow sort
		$this->fields['status'] = &$this->status;

		// version
		$this->version = new DbField('crm_crmentity', 'crm_crmentity', 'x_version', 'version', '`version`', '`version`', 19, -1, FALSE, '`version`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->version->Nullable = FALSE; // NOT NULL field
		$this->version->Sortable = TRUE; // Allow sort
		$this->version->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['version'] = &$this->version;

		// presence
		$this->presence = new DbField('crm_crmentity', 'crm_crmentity', 'x_presence', 'presence', '`presence`', '`presence`', 17, -1, FALSE, '`presence`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->presence->Nullable = FALSE; // NOT NULL field
		$this->presence->Sortable = TRUE; // Allow sort
		$this->presence->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['presence'] = &$this->presence;

		// deleted
		$this->deleted = new DbField('crm_crmentity', 'crm_crmentity', 'x_deleted', 'deleted', '`deleted`', '`deleted`', 17, -1, FALSE, '`deleted`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->deleted->Nullable = FALSE; // NOT NULL field
		$this->deleted->Sortable = TRUE; // Allow sort
		$this->deleted->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['deleted'] = &$this->deleted;

		// was_read
		$this->was_read = new DbField('crm_crmentity', 'crm_crmentity', 'x_was_read', 'was_read', '`was_read`', '`was_read`', 16, -1, FALSE, '`was_read`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->was_read->Sortable = TRUE; // Allow sort
		$this->was_read->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['was_read'] = &$this->was_read;

		// private
		$this->_private = new DbField('crm_crmentity', 'crm_crmentity', 'x__private', 'private', '`private`', '`private`', 16, -1, FALSE, '`private`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_private->Sortable = TRUE; // Allow sort
		$this->_private->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['private'] = &$this->_private;

		// users
		$this->users = new DbField('crm_crmentity', 'crm_crmentity', 'x_users', 'users', '`users`', '`users`', 201, -1, FALSE, '`users`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->users->Sortable = TRUE; // Allow sort
		$this->fields['users'] = &$this->users;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`crm_crmentity`";
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
		return ($this->SqlOrderBy <> "") ? $this->SqlOrderBy : "";
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
			$this->crmid->setDbValue($conn->insert_ID());
			$rs['crmid'] = $this->crmid->DbValue;
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
			if (array_key_exists('crmid', $rs))
				AddFilter($where, QuotedName('crmid', $this->Dbid) . '=' . QuotedValue($rs['crmid'], $this->crmid->DataType, $this->Dbid));
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
		$this->crmid->DbValue = $row['crmid'];
		$this->smcreatorid->DbValue = $row['smcreatorid'];
		$this->smownerid->DbValue = $row['smownerid'];
		$this->shownerid->DbValue = $row['shownerid'];
		$this->modifiedby->DbValue = $row['modifiedby'];
		$this->setype->DbValue = $row['setype'];
		$this->description->DbValue = $row['description'];
		$this->attention->DbValue = $row['attention'];
		$this->createdtime->DbValue = $row['createdtime'];
		$this->modifiedtime->DbValue = $row['modifiedtime'];
		$this->viewedtime->DbValue = $row['viewedtime'];
		$this->status->DbValue = $row['status'];
		$this->version->DbValue = $row['version'];
		$this->presence->DbValue = $row['presence'];
		$this->deleted->DbValue = $row['deleted'];
		$this->was_read->DbValue = $row['was_read'];
		$this->_private->DbValue = $row['private'];
		$this->users->DbValue = $row['users'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`crmid` = @crmid@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('crmid', $row) ? $row['crmid'] : NULL) : $this->crmid->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@crmid@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "crm_crmentitylist.php";
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
		if ($pageName == "crm_crmentityview.php")
			return $Language->phrase("View");
		elseif ($pageName == "crm_crmentityedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "crm_crmentityadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "crm_crmentitylist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("crm_crmentityview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("crm_crmentityview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "crm_crmentityadd.php?" . $this->getUrlParm($parm);
		else
			$url = "crm_crmentityadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("crm_crmentityedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("crm_crmentityadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("crm_crmentitydelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "crmid:" . JsonEncode($this->crmid->CurrentValue, "number");
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
		if ($this->crmid->CurrentValue != NULL) {
			$url .= "crmid=" . urlencode($this->crmid->CurrentValue);
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
			if (Param("crmid") !== NULL)
				$arKeys[] = Param("crmid");
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
			$this->crmid->CurrentValue = $key;
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
		$this->crmid->setDbValue($rs->fields('crmid'));
		$this->smcreatorid->setDbValue($rs->fields('smcreatorid'));
		$this->smownerid->setDbValue($rs->fields('smownerid'));
		$this->shownerid->setDbValue($rs->fields('shownerid'));
		$this->modifiedby->setDbValue($rs->fields('modifiedby'));
		$this->setype->setDbValue($rs->fields('setype'));
		$this->description->setDbValue($rs->fields('description'));
		$this->attention->setDbValue($rs->fields('attention'));
		$this->createdtime->setDbValue($rs->fields('createdtime'));
		$this->modifiedtime->setDbValue($rs->fields('modifiedtime'));
		$this->viewedtime->setDbValue($rs->fields('viewedtime'));
		$this->status->setDbValue($rs->fields('status'));
		$this->version->setDbValue($rs->fields('version'));
		$this->presence->setDbValue($rs->fields('presence'));
		$this->deleted->setDbValue($rs->fields('deleted'));
		$this->was_read->setDbValue($rs->fields('was_read'));
		$this->_private->setDbValue($rs->fields('private'));
		$this->users->setDbValue($rs->fields('users'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// crmid
		// smcreatorid
		// smownerid
		// shownerid
		// modifiedby
		// setype
		// description
		// attention
		// createdtime
		// modifiedtime
		// viewedtime
		// status
		// version
		// presence
		// deleted
		// was_read
		// private
		// users
		// crmid

		$this->crmid->ViewValue = $this->crmid->CurrentValue;
		$this->crmid->ViewCustomAttributes = "";

		// smcreatorid
		$this->smcreatorid->ViewValue = $this->smcreatorid->CurrentValue;
		$this->smcreatorid->ViewValue = FormatNumber($this->smcreatorid->ViewValue, 0, -2, -2, -2);
		$this->smcreatorid->ViewCustomAttributes = "";

		// smownerid
		$this->smownerid->ViewValue = $this->smownerid->CurrentValue;
		$this->smownerid->ViewValue = FormatNumber($this->smownerid->ViewValue, 0, -2, -2, -2);
		$this->smownerid->ViewCustomAttributes = "";

		// shownerid
		$this->shownerid->ViewValue = $this->shownerid->CurrentValue;
		$this->shownerid->ViewValue = FormatNumber($this->shownerid->ViewValue, 0, -2, -2, -2);
		$this->shownerid->ViewCustomAttributes = "";

		// modifiedby
		$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
		$this->modifiedby->ViewValue = FormatNumber($this->modifiedby->ViewValue, 0, -2, -2, -2);
		$this->modifiedby->ViewCustomAttributes = "";

		// setype
		$this->setype->ViewValue = $this->setype->CurrentValue;
		$this->setype->ViewCustomAttributes = "";

		// description
		$this->description->ViewValue = $this->description->CurrentValue;
		$this->description->ViewCustomAttributes = "";

		// attention
		$this->attention->ViewValue = $this->attention->CurrentValue;
		$this->attention->ViewCustomAttributes = "";

		// createdtime
		$this->createdtime->ViewValue = $this->createdtime->CurrentValue;
		$this->createdtime->ViewValue = FormatDateTime($this->createdtime->ViewValue, 0);
		$this->createdtime->ViewCustomAttributes = "";

		// modifiedtime
		$this->modifiedtime->ViewValue = $this->modifiedtime->CurrentValue;
		$this->modifiedtime->ViewValue = FormatDateTime($this->modifiedtime->ViewValue, 0);
		$this->modifiedtime->ViewCustomAttributes = "";

		// viewedtime
		$this->viewedtime->ViewValue = $this->viewedtime->CurrentValue;
		$this->viewedtime->ViewValue = FormatDateTime($this->viewedtime->ViewValue, 0);
		$this->viewedtime->ViewCustomAttributes = "";

		// status
		$this->status->ViewValue = $this->status->CurrentValue;
		$this->status->ViewCustomAttributes = "";

		// version
		$this->version->ViewValue = $this->version->CurrentValue;
		$this->version->ViewValue = FormatNumber($this->version->ViewValue, 0, -2, -2, -2);
		$this->version->ViewCustomAttributes = "";

		// presence
		$this->presence->ViewValue = $this->presence->CurrentValue;
		$this->presence->ViewValue = FormatNumber($this->presence->ViewValue, 0, -2, -2, -2);
		$this->presence->ViewCustomAttributes = "";

		// deleted
		$this->deleted->ViewValue = $this->deleted->CurrentValue;
		$this->deleted->ViewValue = FormatNumber($this->deleted->ViewValue, 0, -2, -2, -2);
		$this->deleted->ViewCustomAttributes = "";

		// was_read
		$this->was_read->ViewValue = $this->was_read->CurrentValue;
		$this->was_read->ViewValue = FormatNumber($this->was_read->ViewValue, 0, -2, -2, -2);
		$this->was_read->ViewCustomAttributes = "";

		// private
		$this->_private->ViewValue = $this->_private->CurrentValue;
		$this->_private->ViewValue = FormatNumber($this->_private->ViewValue, 0, -2, -2, -2);
		$this->_private->ViewCustomAttributes = "";

		// users
		$this->users->ViewValue = $this->users->CurrentValue;
		$this->users->ViewCustomAttributes = "";

		// crmid
		$this->crmid->LinkCustomAttributes = "";
		$this->crmid->HrefValue = "";
		$this->crmid->TooltipValue = "";

		// smcreatorid
		$this->smcreatorid->LinkCustomAttributes = "";
		$this->smcreatorid->HrefValue = "";
		$this->smcreatorid->TooltipValue = "";

		// smownerid
		$this->smownerid->LinkCustomAttributes = "";
		$this->smownerid->HrefValue = "";
		$this->smownerid->TooltipValue = "";

		// shownerid
		$this->shownerid->LinkCustomAttributes = "";
		$this->shownerid->HrefValue = "";
		$this->shownerid->TooltipValue = "";

		// modifiedby
		$this->modifiedby->LinkCustomAttributes = "";
		$this->modifiedby->HrefValue = "";
		$this->modifiedby->TooltipValue = "";

		// setype
		$this->setype->LinkCustomAttributes = "";
		$this->setype->HrefValue = "";
		$this->setype->TooltipValue = "";

		// description
		$this->description->LinkCustomAttributes = "";
		$this->description->HrefValue = "";
		$this->description->TooltipValue = "";

		// attention
		$this->attention->LinkCustomAttributes = "";
		$this->attention->HrefValue = "";
		$this->attention->TooltipValue = "";

		// createdtime
		$this->createdtime->LinkCustomAttributes = "";
		$this->createdtime->HrefValue = "";
		$this->createdtime->TooltipValue = "";

		// modifiedtime
		$this->modifiedtime->LinkCustomAttributes = "";
		$this->modifiedtime->HrefValue = "";
		$this->modifiedtime->TooltipValue = "";

		// viewedtime
		$this->viewedtime->LinkCustomAttributes = "";
		$this->viewedtime->HrefValue = "";
		$this->viewedtime->TooltipValue = "";

		// status
		$this->status->LinkCustomAttributes = "";
		$this->status->HrefValue = "";
		$this->status->TooltipValue = "";

		// version
		$this->version->LinkCustomAttributes = "";
		$this->version->HrefValue = "";
		$this->version->TooltipValue = "";

		// presence
		$this->presence->LinkCustomAttributes = "";
		$this->presence->HrefValue = "";
		$this->presence->TooltipValue = "";

		// deleted
		$this->deleted->LinkCustomAttributes = "";
		$this->deleted->HrefValue = "";
		$this->deleted->TooltipValue = "";

		// was_read
		$this->was_read->LinkCustomAttributes = "";
		$this->was_read->HrefValue = "";
		$this->was_read->TooltipValue = "";

		// private
		$this->_private->LinkCustomAttributes = "";
		$this->_private->HrefValue = "";
		$this->_private->TooltipValue = "";

		// users
		$this->users->LinkCustomAttributes = "";
		$this->users->HrefValue = "";
		$this->users->TooltipValue = "";

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

		// crmid
		$this->crmid->EditAttrs["class"] = "form-control";
		$this->crmid->EditCustomAttributes = "";
		$this->crmid->EditValue = $this->crmid->CurrentValue;
		$this->crmid->ViewCustomAttributes = "";

		// smcreatorid
		$this->smcreatorid->EditAttrs["class"] = "form-control";
		$this->smcreatorid->EditCustomAttributes = "";
		$this->smcreatorid->EditValue = $this->smcreatorid->CurrentValue;
		$this->smcreatorid->PlaceHolder = RemoveHtml($this->smcreatorid->caption());

		// smownerid
		$this->smownerid->EditAttrs["class"] = "form-control";
		$this->smownerid->EditCustomAttributes = "";
		$this->smownerid->EditValue = $this->smownerid->CurrentValue;
		$this->smownerid->PlaceHolder = RemoveHtml($this->smownerid->caption());

		// shownerid
		$this->shownerid->EditAttrs["class"] = "form-control";
		$this->shownerid->EditCustomAttributes = "";
		$this->shownerid->EditValue = $this->shownerid->CurrentValue;
		$this->shownerid->PlaceHolder = RemoveHtml($this->shownerid->caption());

		// modifiedby
		$this->modifiedby->EditAttrs["class"] = "form-control";
		$this->modifiedby->EditCustomAttributes = "";
		$this->modifiedby->EditValue = $this->modifiedby->CurrentValue;
		$this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

		// setype
		$this->setype->EditAttrs["class"] = "form-control";
		$this->setype->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->setype->CurrentValue = HtmlDecode($this->setype->CurrentValue);
		$this->setype->EditValue = $this->setype->CurrentValue;
		$this->setype->PlaceHolder = RemoveHtml($this->setype->caption());

		// description
		$this->description->EditAttrs["class"] = "form-control";
		$this->description->EditCustomAttributes = "";
		$this->description->EditValue = $this->description->CurrentValue;
		$this->description->PlaceHolder = RemoveHtml($this->description->caption());

		// attention
		$this->attention->EditAttrs["class"] = "form-control";
		$this->attention->EditCustomAttributes = "";
		$this->attention->EditValue = $this->attention->CurrentValue;
		$this->attention->PlaceHolder = RemoveHtml($this->attention->caption());

		// createdtime
		$this->createdtime->EditAttrs["class"] = "form-control";
		$this->createdtime->EditCustomAttributes = "";
		$this->createdtime->EditValue = FormatDateTime($this->createdtime->CurrentValue, 8);
		$this->createdtime->PlaceHolder = RemoveHtml($this->createdtime->caption());

		// modifiedtime
		$this->modifiedtime->EditAttrs["class"] = "form-control";
		$this->modifiedtime->EditCustomAttributes = "";
		$this->modifiedtime->EditValue = FormatDateTime($this->modifiedtime->CurrentValue, 8);
		$this->modifiedtime->PlaceHolder = RemoveHtml($this->modifiedtime->caption());

		// viewedtime
		$this->viewedtime->EditAttrs["class"] = "form-control";
		$this->viewedtime->EditCustomAttributes = "";
		$this->viewedtime->EditValue = FormatDateTime($this->viewedtime->CurrentValue, 8);
		$this->viewedtime->PlaceHolder = RemoveHtml($this->viewedtime->caption());

		// status
		$this->status->EditAttrs["class"] = "form-control";
		$this->status->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->status->CurrentValue = HtmlDecode($this->status->CurrentValue);
		$this->status->EditValue = $this->status->CurrentValue;
		$this->status->PlaceHolder = RemoveHtml($this->status->caption());

		// version
		$this->version->EditAttrs["class"] = "form-control";
		$this->version->EditCustomAttributes = "";
		$this->version->EditValue = $this->version->CurrentValue;
		$this->version->PlaceHolder = RemoveHtml($this->version->caption());

		// presence
		$this->presence->EditAttrs["class"] = "form-control";
		$this->presence->EditCustomAttributes = "";
		$this->presence->EditValue = $this->presence->CurrentValue;
		$this->presence->PlaceHolder = RemoveHtml($this->presence->caption());

		// deleted
		$this->deleted->EditAttrs["class"] = "form-control";
		$this->deleted->EditCustomAttributes = "";
		$this->deleted->EditValue = $this->deleted->CurrentValue;
		$this->deleted->PlaceHolder = RemoveHtml($this->deleted->caption());

		// was_read
		$this->was_read->EditAttrs["class"] = "form-control";
		$this->was_read->EditCustomAttributes = "";
		$this->was_read->EditValue = $this->was_read->CurrentValue;
		$this->was_read->PlaceHolder = RemoveHtml($this->was_read->caption());

		// private
		$this->_private->EditAttrs["class"] = "form-control";
		$this->_private->EditCustomAttributes = "";
		$this->_private->EditValue = $this->_private->CurrentValue;
		$this->_private->PlaceHolder = RemoveHtml($this->_private->caption());

		// users
		$this->users->EditAttrs["class"] = "form-control";
		$this->users->EditCustomAttributes = "";
		$this->users->EditValue = $this->users->CurrentValue;
		$this->users->PlaceHolder = RemoveHtml($this->users->caption());

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
					$doc->exportCaption($this->crmid);
					$doc->exportCaption($this->smcreatorid);
					$doc->exportCaption($this->smownerid);
					$doc->exportCaption($this->shownerid);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->setype);
					$doc->exportCaption($this->description);
					$doc->exportCaption($this->attention);
					$doc->exportCaption($this->createdtime);
					$doc->exportCaption($this->modifiedtime);
					$doc->exportCaption($this->viewedtime);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->version);
					$doc->exportCaption($this->presence);
					$doc->exportCaption($this->deleted);
					$doc->exportCaption($this->was_read);
					$doc->exportCaption($this->_private);
					$doc->exportCaption($this->users);
				} else {
					$doc->exportCaption($this->crmid);
					$doc->exportCaption($this->smcreatorid);
					$doc->exportCaption($this->smownerid);
					$doc->exportCaption($this->shownerid);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->setype);
					$doc->exportCaption($this->createdtime);
					$doc->exportCaption($this->modifiedtime);
					$doc->exportCaption($this->viewedtime);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->version);
					$doc->exportCaption($this->presence);
					$doc->exportCaption($this->deleted);
					$doc->exportCaption($this->was_read);
					$doc->exportCaption($this->_private);
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
						$doc->exportField($this->crmid);
						$doc->exportField($this->smcreatorid);
						$doc->exportField($this->smownerid);
						$doc->exportField($this->shownerid);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->setype);
						$doc->exportField($this->description);
						$doc->exportField($this->attention);
						$doc->exportField($this->createdtime);
						$doc->exportField($this->modifiedtime);
						$doc->exportField($this->viewedtime);
						$doc->exportField($this->status);
						$doc->exportField($this->version);
						$doc->exportField($this->presence);
						$doc->exportField($this->deleted);
						$doc->exportField($this->was_read);
						$doc->exportField($this->_private);
						$doc->exportField($this->users);
					} else {
						$doc->exportField($this->crmid);
						$doc->exportField($this->smcreatorid);
						$doc->exportField($this->smownerid);
						$doc->exportField($this->shownerid);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->setype);
						$doc->exportField($this->createdtime);
						$doc->exportField($this->modifiedtime);
						$doc->exportField($this->viewedtime);
						$doc->exportField($this->status);
						$doc->exportField($this->version);
						$doc->exportField($this->presence);
						$doc->exportField($this->deleted);
						$doc->exportField($this->was_read);
						$doc->exportField($this->_private);
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