<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for crm_leadaddress
 */
class crm_leadaddress extends DbTable
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
	public $leadaddressid;
	public $phone;
	public $mobile;
	public $fax;
	public $addresslevel1a;
	public $addresslevel2a;
	public $addresslevel3a;
	public $addresslevel4a;
	public $addresslevel5a;
	public $addresslevel6a;
	public $addresslevel7a;
	public $addresslevel8a;
	public $buildingnumbera;
	public $localnumbera;
	public $poboxa;
	public $phone_extra;
	public $mobile_extra;
	public $fax_extra;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'crm_leadaddress';
		$this->TableName = 'crm_leadaddress';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`crm_leadaddress`";
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

		// leadaddressid
		$this->leadaddressid = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_leadaddressid', 'leadaddressid', '`leadaddressid`', '`leadaddressid`', 3, -1, FALSE, '`leadaddressid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->leadaddressid->IsPrimaryKey = TRUE; // Primary key field
		$this->leadaddressid->Nullable = FALSE; // NOT NULL field
		$this->leadaddressid->Sortable = TRUE; // Allow sort
		$this->leadaddressid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['leadaddressid'] = &$this->leadaddressid;

		// phone
		$this->phone = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_phone', 'phone', '`phone`', '`phone`', 200, -1, FALSE, '`phone`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->phone->Sortable = TRUE; // Allow sort
		$this->fields['phone'] = &$this->phone;

		// mobile
		$this->mobile = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_mobile', 'mobile', '`mobile`', '`mobile`', 200, -1, FALSE, '`mobile`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mobile->Sortable = TRUE; // Allow sort
		$this->fields['mobile'] = &$this->mobile;

		// fax
		$this->fax = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_fax', 'fax', '`fax`', '`fax`', 200, -1, FALSE, '`fax`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->fax->Sortable = TRUE; // Allow sort
		$this->fields['fax'] = &$this->fax;

		// addresslevel1a
		$this->addresslevel1a = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_addresslevel1a', 'addresslevel1a', '`addresslevel1a`', '`addresslevel1a`', 200, -1, FALSE, '`addresslevel1a`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->addresslevel1a->Sortable = TRUE; // Allow sort
		$this->fields['addresslevel1a'] = &$this->addresslevel1a;

		// addresslevel2a
		$this->addresslevel2a = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_addresslevel2a', 'addresslevel2a', '`addresslevel2a`', '`addresslevel2a`', 200, -1, FALSE, '`addresslevel2a`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->addresslevel2a->Sortable = TRUE; // Allow sort
		$this->fields['addresslevel2a'] = &$this->addresslevel2a;

		// addresslevel3a
		$this->addresslevel3a = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_addresslevel3a', 'addresslevel3a', '`addresslevel3a`', '`addresslevel3a`', 200, -1, FALSE, '`addresslevel3a`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->addresslevel3a->Sortable = TRUE; // Allow sort
		$this->fields['addresslevel3a'] = &$this->addresslevel3a;

		// addresslevel4a
		$this->addresslevel4a = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_addresslevel4a', 'addresslevel4a', '`addresslevel4a`', '`addresslevel4a`', 200, -1, FALSE, '`addresslevel4a`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->addresslevel4a->Sortable = TRUE; // Allow sort
		$this->fields['addresslevel4a'] = &$this->addresslevel4a;

		// addresslevel5a
		$this->addresslevel5a = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_addresslevel5a', 'addresslevel5a', '`addresslevel5a`', '`addresslevel5a`', 200, -1, FALSE, '`addresslevel5a`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->addresslevel5a->Sortable = TRUE; // Allow sort
		$this->fields['addresslevel5a'] = &$this->addresslevel5a;

		// addresslevel6a
		$this->addresslevel6a = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_addresslevel6a', 'addresslevel6a', '`addresslevel6a`', '`addresslevel6a`', 200, -1, FALSE, '`addresslevel6a`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->addresslevel6a->Sortable = TRUE; // Allow sort
		$this->fields['addresslevel6a'] = &$this->addresslevel6a;

		// addresslevel7a
		$this->addresslevel7a = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_addresslevel7a', 'addresslevel7a', '`addresslevel7a`', '`addresslevel7a`', 200, -1, FALSE, '`addresslevel7a`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->addresslevel7a->Sortable = TRUE; // Allow sort
		$this->fields['addresslevel7a'] = &$this->addresslevel7a;

		// addresslevel8a
		$this->addresslevel8a = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_addresslevel8a', 'addresslevel8a', '`addresslevel8a`', '`addresslevel8a`', 200, -1, FALSE, '`addresslevel8a`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->addresslevel8a->Sortable = TRUE; // Allow sort
		$this->fields['addresslevel8a'] = &$this->addresslevel8a;

		// buildingnumbera
		$this->buildingnumbera = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_buildingnumbera', 'buildingnumbera', '`buildingnumbera`', '`buildingnumbera`', 200, -1, FALSE, '`buildingnumbera`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->buildingnumbera->Sortable = TRUE; // Allow sort
		$this->fields['buildingnumbera'] = &$this->buildingnumbera;

		// localnumbera
		$this->localnumbera = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_localnumbera', 'localnumbera', '`localnumbera`', '`localnumbera`', 200, -1, FALSE, '`localnumbera`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->localnumbera->Sortable = TRUE; // Allow sort
		$this->fields['localnumbera'] = &$this->localnumbera;

		// poboxa
		$this->poboxa = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_poboxa', 'poboxa', '`poboxa`', '`poboxa`', 200, -1, FALSE, '`poboxa`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->poboxa->Sortable = TRUE; // Allow sort
		$this->fields['poboxa'] = &$this->poboxa;

		// phone_extra
		$this->phone_extra = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_phone_extra', 'phone_extra', '`phone_extra`', '`phone_extra`', 200, -1, FALSE, '`phone_extra`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->phone_extra->Sortable = TRUE; // Allow sort
		$this->fields['phone_extra'] = &$this->phone_extra;

		// mobile_extra
		$this->mobile_extra = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_mobile_extra', 'mobile_extra', '`mobile_extra`', '`mobile_extra`', 200, -1, FALSE, '`mobile_extra`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mobile_extra->Sortable = TRUE; // Allow sort
		$this->fields['mobile_extra'] = &$this->mobile_extra;

		// fax_extra
		$this->fax_extra = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_fax_extra', 'fax_extra', '`fax_extra`', '`fax_extra`', 200, -1, FALSE, '`fax_extra`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->fax_extra->Sortable = TRUE; // Allow sort
		$this->fields['fax_extra'] = &$this->fax_extra;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`crm_leadaddress`";
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
			if (array_key_exists('leadaddressid', $rs))
				AddFilter($where, QuotedName('leadaddressid', $this->Dbid) . '=' . QuotedValue($rs['leadaddressid'], $this->leadaddressid->DataType, $this->Dbid));
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
		$this->leadaddressid->DbValue = $row['leadaddressid'];
		$this->phone->DbValue = $row['phone'];
		$this->mobile->DbValue = $row['mobile'];
		$this->fax->DbValue = $row['fax'];
		$this->addresslevel1a->DbValue = $row['addresslevel1a'];
		$this->addresslevel2a->DbValue = $row['addresslevel2a'];
		$this->addresslevel3a->DbValue = $row['addresslevel3a'];
		$this->addresslevel4a->DbValue = $row['addresslevel4a'];
		$this->addresslevel5a->DbValue = $row['addresslevel5a'];
		$this->addresslevel6a->DbValue = $row['addresslevel6a'];
		$this->addresslevel7a->DbValue = $row['addresslevel7a'];
		$this->addresslevel8a->DbValue = $row['addresslevel8a'];
		$this->buildingnumbera->DbValue = $row['buildingnumbera'];
		$this->localnumbera->DbValue = $row['localnumbera'];
		$this->poboxa->DbValue = $row['poboxa'];
		$this->phone_extra->DbValue = $row['phone_extra'];
		$this->mobile_extra->DbValue = $row['mobile_extra'];
		$this->fax_extra->DbValue = $row['fax_extra'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`leadaddressid` = @leadaddressid@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('leadaddressid', $row) ? $row['leadaddressid'] : NULL) : $this->leadaddressid->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@leadaddressid@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "crm_leadaddresslist.php";
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
		if ($pageName == "crm_leadaddressview.php")
			return $Language->phrase("View");
		elseif ($pageName == "crm_leadaddressedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "crm_leadaddressadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "crm_leadaddresslist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("crm_leadaddressview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("crm_leadaddressview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "crm_leadaddressadd.php?" . $this->getUrlParm($parm);
		else
			$url = "crm_leadaddressadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("crm_leadaddressedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("crm_leadaddressadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("crm_leadaddressdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "leadaddressid:" . JsonEncode($this->leadaddressid->CurrentValue, "number");
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
		if ($this->leadaddressid->CurrentValue != NULL) {
			$url .= "leadaddressid=" . urlencode($this->leadaddressid->CurrentValue);
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
			if (Param("leadaddressid") !== NULL)
				$arKeys[] = Param("leadaddressid");
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
			$this->leadaddressid->CurrentValue = $key;
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
		$this->leadaddressid->setDbValue($rs->fields('leadaddressid'));
		$this->phone->setDbValue($rs->fields('phone'));
		$this->mobile->setDbValue($rs->fields('mobile'));
		$this->fax->setDbValue($rs->fields('fax'));
		$this->addresslevel1a->setDbValue($rs->fields('addresslevel1a'));
		$this->addresslevel2a->setDbValue($rs->fields('addresslevel2a'));
		$this->addresslevel3a->setDbValue($rs->fields('addresslevel3a'));
		$this->addresslevel4a->setDbValue($rs->fields('addresslevel4a'));
		$this->addresslevel5a->setDbValue($rs->fields('addresslevel5a'));
		$this->addresslevel6a->setDbValue($rs->fields('addresslevel6a'));
		$this->addresslevel7a->setDbValue($rs->fields('addresslevel7a'));
		$this->addresslevel8a->setDbValue($rs->fields('addresslevel8a'));
		$this->buildingnumbera->setDbValue($rs->fields('buildingnumbera'));
		$this->localnumbera->setDbValue($rs->fields('localnumbera'));
		$this->poboxa->setDbValue($rs->fields('poboxa'));
		$this->phone_extra->setDbValue($rs->fields('phone_extra'));
		$this->mobile_extra->setDbValue($rs->fields('mobile_extra'));
		$this->fax_extra->setDbValue($rs->fields('fax_extra'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// leadaddressid
		// phone
		// mobile
		// fax
		// addresslevel1a
		// addresslevel2a
		// addresslevel3a
		// addresslevel4a
		// addresslevel5a
		// addresslevel6a
		// addresslevel7a
		// addresslevel8a
		// buildingnumbera
		// localnumbera
		// poboxa
		// phone_extra
		// mobile_extra
		// fax_extra
		// leadaddressid

		$this->leadaddressid->ViewValue = $this->leadaddressid->CurrentValue;
		$this->leadaddressid->ViewValue = FormatNumber($this->leadaddressid->ViewValue, 0, -2, -2, -2);
		$this->leadaddressid->ViewCustomAttributes = "";

		// phone
		$this->phone->ViewValue = $this->phone->CurrentValue;
		$this->phone->ViewCustomAttributes = "";

		// mobile
		$this->mobile->ViewValue = $this->mobile->CurrentValue;
		$this->mobile->ViewCustomAttributes = "";

		// fax
		$this->fax->ViewValue = $this->fax->CurrentValue;
		$this->fax->ViewCustomAttributes = "";

		// addresslevel1a
		$this->addresslevel1a->ViewValue = $this->addresslevel1a->CurrentValue;
		$this->addresslevel1a->ViewCustomAttributes = "";

		// addresslevel2a
		$this->addresslevel2a->ViewValue = $this->addresslevel2a->CurrentValue;
		$this->addresslevel2a->ViewCustomAttributes = "";

		// addresslevel3a
		$this->addresslevel3a->ViewValue = $this->addresslevel3a->CurrentValue;
		$this->addresslevel3a->ViewCustomAttributes = "";

		// addresslevel4a
		$this->addresslevel4a->ViewValue = $this->addresslevel4a->CurrentValue;
		$this->addresslevel4a->ViewCustomAttributes = "";

		// addresslevel5a
		$this->addresslevel5a->ViewValue = $this->addresslevel5a->CurrentValue;
		$this->addresslevel5a->ViewCustomAttributes = "";

		// addresslevel6a
		$this->addresslevel6a->ViewValue = $this->addresslevel6a->CurrentValue;
		$this->addresslevel6a->ViewCustomAttributes = "";

		// addresslevel7a
		$this->addresslevel7a->ViewValue = $this->addresslevel7a->CurrentValue;
		$this->addresslevel7a->ViewCustomAttributes = "";

		// addresslevel8a
		$this->addresslevel8a->ViewValue = $this->addresslevel8a->CurrentValue;
		$this->addresslevel8a->ViewCustomAttributes = "";

		// buildingnumbera
		$this->buildingnumbera->ViewValue = $this->buildingnumbera->CurrentValue;
		$this->buildingnumbera->ViewCustomAttributes = "";

		// localnumbera
		$this->localnumbera->ViewValue = $this->localnumbera->CurrentValue;
		$this->localnumbera->ViewCustomAttributes = "";

		// poboxa
		$this->poboxa->ViewValue = $this->poboxa->CurrentValue;
		$this->poboxa->ViewCustomAttributes = "";

		// phone_extra
		$this->phone_extra->ViewValue = $this->phone_extra->CurrentValue;
		$this->phone_extra->ViewCustomAttributes = "";

		// mobile_extra
		$this->mobile_extra->ViewValue = $this->mobile_extra->CurrentValue;
		$this->mobile_extra->ViewCustomAttributes = "";

		// fax_extra
		$this->fax_extra->ViewValue = $this->fax_extra->CurrentValue;
		$this->fax_extra->ViewCustomAttributes = "";

		// leadaddressid
		$this->leadaddressid->LinkCustomAttributes = "";
		$this->leadaddressid->HrefValue = "";
		$this->leadaddressid->TooltipValue = "";

		// phone
		$this->phone->LinkCustomAttributes = "";
		$this->phone->HrefValue = "";
		$this->phone->TooltipValue = "";

		// mobile
		$this->mobile->LinkCustomAttributes = "";
		$this->mobile->HrefValue = "";
		$this->mobile->TooltipValue = "";

		// fax
		$this->fax->LinkCustomAttributes = "";
		$this->fax->HrefValue = "";
		$this->fax->TooltipValue = "";

		// addresslevel1a
		$this->addresslevel1a->LinkCustomAttributes = "";
		$this->addresslevel1a->HrefValue = "";
		$this->addresslevel1a->TooltipValue = "";

		// addresslevel2a
		$this->addresslevel2a->LinkCustomAttributes = "";
		$this->addresslevel2a->HrefValue = "";
		$this->addresslevel2a->TooltipValue = "";

		// addresslevel3a
		$this->addresslevel3a->LinkCustomAttributes = "";
		$this->addresslevel3a->HrefValue = "";
		$this->addresslevel3a->TooltipValue = "";

		// addresslevel4a
		$this->addresslevel4a->LinkCustomAttributes = "";
		$this->addresslevel4a->HrefValue = "";
		$this->addresslevel4a->TooltipValue = "";

		// addresslevel5a
		$this->addresslevel5a->LinkCustomAttributes = "";
		$this->addresslevel5a->HrefValue = "";
		$this->addresslevel5a->TooltipValue = "";

		// addresslevel6a
		$this->addresslevel6a->LinkCustomAttributes = "";
		$this->addresslevel6a->HrefValue = "";
		$this->addresslevel6a->TooltipValue = "";

		// addresslevel7a
		$this->addresslevel7a->LinkCustomAttributes = "";
		$this->addresslevel7a->HrefValue = "";
		$this->addresslevel7a->TooltipValue = "";

		// addresslevel8a
		$this->addresslevel8a->LinkCustomAttributes = "";
		$this->addresslevel8a->HrefValue = "";
		$this->addresslevel8a->TooltipValue = "";

		// buildingnumbera
		$this->buildingnumbera->LinkCustomAttributes = "";
		$this->buildingnumbera->HrefValue = "";
		$this->buildingnumbera->TooltipValue = "";

		// localnumbera
		$this->localnumbera->LinkCustomAttributes = "";
		$this->localnumbera->HrefValue = "";
		$this->localnumbera->TooltipValue = "";

		// poboxa
		$this->poboxa->LinkCustomAttributes = "";
		$this->poboxa->HrefValue = "";
		$this->poboxa->TooltipValue = "";

		// phone_extra
		$this->phone_extra->LinkCustomAttributes = "";
		$this->phone_extra->HrefValue = "";
		$this->phone_extra->TooltipValue = "";

		// mobile_extra
		$this->mobile_extra->LinkCustomAttributes = "";
		$this->mobile_extra->HrefValue = "";
		$this->mobile_extra->TooltipValue = "";

		// fax_extra
		$this->fax_extra->LinkCustomAttributes = "";
		$this->fax_extra->HrefValue = "";
		$this->fax_extra->TooltipValue = "";

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

		// leadaddressid
		$this->leadaddressid->EditAttrs["class"] = "form-control";
		$this->leadaddressid->EditCustomAttributes = "";
		$this->leadaddressid->EditValue = $this->leadaddressid->CurrentValue;
		$this->leadaddressid->EditValue = FormatNumber($this->leadaddressid->EditValue, 0, -2, -2, -2);
		$this->leadaddressid->ViewCustomAttributes = "";

		// phone
		$this->phone->EditAttrs["class"] = "form-control";
		$this->phone->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->phone->CurrentValue = HtmlDecode($this->phone->CurrentValue);
		$this->phone->EditValue = $this->phone->CurrentValue;
		$this->phone->PlaceHolder = RemoveHtml($this->phone->caption());

		// mobile
		$this->mobile->EditAttrs["class"] = "form-control";
		$this->mobile->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->mobile->CurrentValue = HtmlDecode($this->mobile->CurrentValue);
		$this->mobile->EditValue = $this->mobile->CurrentValue;
		$this->mobile->PlaceHolder = RemoveHtml($this->mobile->caption());

		// fax
		$this->fax->EditAttrs["class"] = "form-control";
		$this->fax->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->fax->CurrentValue = HtmlDecode($this->fax->CurrentValue);
		$this->fax->EditValue = $this->fax->CurrentValue;
		$this->fax->PlaceHolder = RemoveHtml($this->fax->caption());

		// addresslevel1a
		$this->addresslevel1a->EditAttrs["class"] = "form-control";
		$this->addresslevel1a->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->addresslevel1a->CurrentValue = HtmlDecode($this->addresslevel1a->CurrentValue);
		$this->addresslevel1a->EditValue = $this->addresslevel1a->CurrentValue;
		$this->addresslevel1a->PlaceHolder = RemoveHtml($this->addresslevel1a->caption());

		// addresslevel2a
		$this->addresslevel2a->EditAttrs["class"] = "form-control";
		$this->addresslevel2a->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->addresslevel2a->CurrentValue = HtmlDecode($this->addresslevel2a->CurrentValue);
		$this->addresslevel2a->EditValue = $this->addresslevel2a->CurrentValue;
		$this->addresslevel2a->PlaceHolder = RemoveHtml($this->addresslevel2a->caption());

		// addresslevel3a
		$this->addresslevel3a->EditAttrs["class"] = "form-control";
		$this->addresslevel3a->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->addresslevel3a->CurrentValue = HtmlDecode($this->addresslevel3a->CurrentValue);
		$this->addresslevel3a->EditValue = $this->addresslevel3a->CurrentValue;
		$this->addresslevel3a->PlaceHolder = RemoveHtml($this->addresslevel3a->caption());

		// addresslevel4a
		$this->addresslevel4a->EditAttrs["class"] = "form-control";
		$this->addresslevel4a->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->addresslevel4a->CurrentValue = HtmlDecode($this->addresslevel4a->CurrentValue);
		$this->addresslevel4a->EditValue = $this->addresslevel4a->CurrentValue;
		$this->addresslevel4a->PlaceHolder = RemoveHtml($this->addresslevel4a->caption());

		// addresslevel5a
		$this->addresslevel5a->EditAttrs["class"] = "form-control";
		$this->addresslevel5a->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->addresslevel5a->CurrentValue = HtmlDecode($this->addresslevel5a->CurrentValue);
		$this->addresslevel5a->EditValue = $this->addresslevel5a->CurrentValue;
		$this->addresslevel5a->PlaceHolder = RemoveHtml($this->addresslevel5a->caption());

		// addresslevel6a
		$this->addresslevel6a->EditAttrs["class"] = "form-control";
		$this->addresslevel6a->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->addresslevel6a->CurrentValue = HtmlDecode($this->addresslevel6a->CurrentValue);
		$this->addresslevel6a->EditValue = $this->addresslevel6a->CurrentValue;
		$this->addresslevel6a->PlaceHolder = RemoveHtml($this->addresslevel6a->caption());

		// addresslevel7a
		$this->addresslevel7a->EditAttrs["class"] = "form-control";
		$this->addresslevel7a->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->addresslevel7a->CurrentValue = HtmlDecode($this->addresslevel7a->CurrentValue);
		$this->addresslevel7a->EditValue = $this->addresslevel7a->CurrentValue;
		$this->addresslevel7a->PlaceHolder = RemoveHtml($this->addresslevel7a->caption());

		// addresslevel8a
		$this->addresslevel8a->EditAttrs["class"] = "form-control";
		$this->addresslevel8a->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->addresslevel8a->CurrentValue = HtmlDecode($this->addresslevel8a->CurrentValue);
		$this->addresslevel8a->EditValue = $this->addresslevel8a->CurrentValue;
		$this->addresslevel8a->PlaceHolder = RemoveHtml($this->addresslevel8a->caption());

		// buildingnumbera
		$this->buildingnumbera->EditAttrs["class"] = "form-control";
		$this->buildingnumbera->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->buildingnumbera->CurrentValue = HtmlDecode($this->buildingnumbera->CurrentValue);
		$this->buildingnumbera->EditValue = $this->buildingnumbera->CurrentValue;
		$this->buildingnumbera->PlaceHolder = RemoveHtml($this->buildingnumbera->caption());

		// localnumbera
		$this->localnumbera->EditAttrs["class"] = "form-control";
		$this->localnumbera->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->localnumbera->CurrentValue = HtmlDecode($this->localnumbera->CurrentValue);
		$this->localnumbera->EditValue = $this->localnumbera->CurrentValue;
		$this->localnumbera->PlaceHolder = RemoveHtml($this->localnumbera->caption());

		// poboxa
		$this->poboxa->EditAttrs["class"] = "form-control";
		$this->poboxa->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->poboxa->CurrentValue = HtmlDecode($this->poboxa->CurrentValue);
		$this->poboxa->EditValue = $this->poboxa->CurrentValue;
		$this->poboxa->PlaceHolder = RemoveHtml($this->poboxa->caption());

		// phone_extra
		$this->phone_extra->EditAttrs["class"] = "form-control";
		$this->phone_extra->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->phone_extra->CurrentValue = HtmlDecode($this->phone_extra->CurrentValue);
		$this->phone_extra->EditValue = $this->phone_extra->CurrentValue;
		$this->phone_extra->PlaceHolder = RemoveHtml($this->phone_extra->caption());

		// mobile_extra
		$this->mobile_extra->EditAttrs["class"] = "form-control";
		$this->mobile_extra->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->mobile_extra->CurrentValue = HtmlDecode($this->mobile_extra->CurrentValue);
		$this->mobile_extra->EditValue = $this->mobile_extra->CurrentValue;
		$this->mobile_extra->PlaceHolder = RemoveHtml($this->mobile_extra->caption());

		// fax_extra
		$this->fax_extra->EditAttrs["class"] = "form-control";
		$this->fax_extra->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->fax_extra->CurrentValue = HtmlDecode($this->fax_extra->CurrentValue);
		$this->fax_extra->EditValue = $this->fax_extra->CurrentValue;
		$this->fax_extra->PlaceHolder = RemoveHtml($this->fax_extra->caption());

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
					$doc->exportCaption($this->leadaddressid);
					$doc->exportCaption($this->phone);
					$doc->exportCaption($this->mobile);
					$doc->exportCaption($this->fax);
					$doc->exportCaption($this->addresslevel1a);
					$doc->exportCaption($this->addresslevel2a);
					$doc->exportCaption($this->addresslevel3a);
					$doc->exportCaption($this->addresslevel4a);
					$doc->exportCaption($this->addresslevel5a);
					$doc->exportCaption($this->addresslevel6a);
					$doc->exportCaption($this->addresslevel7a);
					$doc->exportCaption($this->addresslevel8a);
					$doc->exportCaption($this->buildingnumbera);
					$doc->exportCaption($this->localnumbera);
					$doc->exportCaption($this->poboxa);
					$doc->exportCaption($this->phone_extra);
					$doc->exportCaption($this->mobile_extra);
					$doc->exportCaption($this->fax_extra);
				} else {
					$doc->exportCaption($this->leadaddressid);
					$doc->exportCaption($this->phone);
					$doc->exportCaption($this->mobile);
					$doc->exportCaption($this->fax);
					$doc->exportCaption($this->addresslevel1a);
					$doc->exportCaption($this->addresslevel2a);
					$doc->exportCaption($this->addresslevel3a);
					$doc->exportCaption($this->addresslevel4a);
					$doc->exportCaption($this->addresslevel5a);
					$doc->exportCaption($this->addresslevel6a);
					$doc->exportCaption($this->addresslevel7a);
					$doc->exportCaption($this->addresslevel8a);
					$doc->exportCaption($this->buildingnumbera);
					$doc->exportCaption($this->localnumbera);
					$doc->exportCaption($this->poboxa);
					$doc->exportCaption($this->phone_extra);
					$doc->exportCaption($this->mobile_extra);
					$doc->exportCaption($this->fax_extra);
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
						$doc->exportField($this->leadaddressid);
						$doc->exportField($this->phone);
						$doc->exportField($this->mobile);
						$doc->exportField($this->fax);
						$doc->exportField($this->addresslevel1a);
						$doc->exportField($this->addresslevel2a);
						$doc->exportField($this->addresslevel3a);
						$doc->exportField($this->addresslevel4a);
						$doc->exportField($this->addresslevel5a);
						$doc->exportField($this->addresslevel6a);
						$doc->exportField($this->addresslevel7a);
						$doc->exportField($this->addresslevel8a);
						$doc->exportField($this->buildingnumbera);
						$doc->exportField($this->localnumbera);
						$doc->exportField($this->poboxa);
						$doc->exportField($this->phone_extra);
						$doc->exportField($this->mobile_extra);
						$doc->exportField($this->fax_extra);
					} else {
						$doc->exportField($this->leadaddressid);
						$doc->exportField($this->phone);
						$doc->exportField($this->mobile);
						$doc->exportField($this->fax);
						$doc->exportField($this->addresslevel1a);
						$doc->exportField($this->addresslevel2a);
						$doc->exportField($this->addresslevel3a);
						$doc->exportField($this->addresslevel4a);
						$doc->exportField($this->addresslevel5a);
						$doc->exportField($this->addresslevel6a);
						$doc->exportField($this->addresslevel7a);
						$doc->exportField($this->addresslevel8a);
						$doc->exportField($this->buildingnumbera);
						$doc->exportField($this->localnumbera);
						$doc->exportField($this->poboxa);
						$doc->exportField($this->phone_extra);
						$doc->exportField($this->mobile_extra);
						$doc->exportField($this->fax_extra);
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