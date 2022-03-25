<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for employee_company_loans
 */
class employee_company_loans extends DbTable
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
	public $employee;
	public $loan;
	public $start_date;
	public $last_installment_date;
	public $period_months;
	public $currency;
	public $amount;
	public $monthly_installment;
	public $status;
	public $details;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'employee_company_loans';
		$this->TableName = 'employee_company_loans';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`employee_company_loans`";
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
		$this->id = new DbField('employee_company_loans', 'employee_company_loans', 'x_id', 'id', '`id`', '`id`', 20, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// employee
		$this->employee = new DbField('employee_company_loans', 'employee_company_loans', 'x_employee', 'employee', '`employee`', '`employee`', 3, -1, FALSE, '`employee`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->employee->Nullable = FALSE; // NOT NULL field
		$this->employee->Required = TRUE; // Required field
		$this->employee->Sortable = TRUE; // Allow sort
		$this->employee->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['employee'] = &$this->employee;

		// loan
		$this->loan = new DbField('employee_company_loans', 'employee_company_loans', 'x_loan', 'loan', '`loan`', '`loan`', 20, -1, FALSE, '`loan`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->loan->Sortable = TRUE; // Allow sort
		$this->loan->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['loan'] = &$this->loan;

		// start_date
		$this->start_date = new DbField('employee_company_loans', 'employee_company_loans', 'x_start_date', 'start_date', '`start_date`', CastDateFieldForLike('`start_date`', 0, "DB"), 133, 0, FALSE, '`start_date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->start_date->Nullable = FALSE; // NOT NULL field
		$this->start_date->Required = TRUE; // Required field
		$this->start_date->Sortable = TRUE; // Allow sort
		$this->start_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['start_date'] = &$this->start_date;

		// last_installment_date
		$this->last_installment_date = new DbField('employee_company_loans', 'employee_company_loans', 'x_last_installment_date', 'last_installment_date', '`last_installment_date`', CastDateFieldForLike('`last_installment_date`', 0, "DB"), 133, 0, FALSE, '`last_installment_date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->last_installment_date->Nullable = FALSE; // NOT NULL field
		$this->last_installment_date->Required = TRUE; // Required field
		$this->last_installment_date->Sortable = TRUE; // Allow sort
		$this->last_installment_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['last_installment_date'] = &$this->last_installment_date;

		// period_months
		$this->period_months = new DbField('employee_company_loans', 'employee_company_loans', 'x_period_months', 'period_months', '`period_months`', '`period_months`', 20, -1, FALSE, '`period_months`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->period_months->Sortable = TRUE; // Allow sort
		$this->period_months->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['period_months'] = &$this->period_months;

		// currency
		$this->currency = new DbField('employee_company_loans', 'employee_company_loans', 'x_currency', 'currency', '`currency`', '`currency`', 20, -1, FALSE, '`currency`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->currency->Sortable = TRUE; // Allow sort
		$this->currency->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['currency'] = &$this->currency;

		// amount
		$this->amount = new DbField('employee_company_loans', 'employee_company_loans', 'x_amount', 'amount', '`amount`', '`amount`', 131, -1, FALSE, '`amount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->amount->Nullable = FALSE; // NOT NULL field
		$this->amount->Required = TRUE; // Required field
		$this->amount->Sortable = TRUE; // Allow sort
		$this->amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['amount'] = &$this->amount;

		// monthly_installment
		$this->monthly_installment = new DbField('employee_company_loans', 'employee_company_loans', 'x_monthly_installment', 'monthly_installment', '`monthly_installment`', '`monthly_installment`', 131, -1, FALSE, '`monthly_installment`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->monthly_installment->Nullable = FALSE; // NOT NULL field
		$this->monthly_installment->Required = TRUE; // Required field
		$this->monthly_installment->Sortable = TRUE; // Allow sort
		$this->monthly_installment->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['monthly_installment'] = &$this->monthly_installment;

		// status
		$this->status = new DbField('employee_company_loans', 'employee_company_loans', 'x_status', 'status', '`status`', '`status`', 202, -1, FALSE, '`status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->status->Sortable = TRUE; // Allow sort
		$this->status->Lookup = new Lookup('status', 'employee_company_loans', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->status->OptionCount = 4;
		$this->fields['status'] = &$this->status;

		// details
		$this->details = new DbField('employee_company_loans', 'employee_company_loans', 'x_details', 'details', '`details`', '`details`', 201, -1, FALSE, '`details`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->details->Sortable = TRUE; // Allow sort
		$this->fields['details'] = &$this->details;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`employee_company_loans`";
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
		$this->employee->DbValue = $row['employee'];
		$this->loan->DbValue = $row['loan'];
		$this->start_date->DbValue = $row['start_date'];
		$this->last_installment_date->DbValue = $row['last_installment_date'];
		$this->period_months->DbValue = $row['period_months'];
		$this->currency->DbValue = $row['currency'];
		$this->amount->DbValue = $row['amount'];
		$this->monthly_installment->DbValue = $row['monthly_installment'];
		$this->status->DbValue = $row['status'];
		$this->details->DbValue = $row['details'];
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
			return "employee_company_loanslist.php";
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
		if ($pageName == "employee_company_loansview.php")
			return $Language->phrase("View");
		elseif ($pageName == "employee_company_loansedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "employee_company_loansadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "employee_company_loanslist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("employee_company_loansview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("employee_company_loansview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "employee_company_loansadd.php?" . $this->getUrlParm($parm);
		else
			$url = "employee_company_loansadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("employee_company_loansedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("employee_company_loansadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("employee_company_loansdelete.php", $this->getUrlParm());
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
		$this->employee->setDbValue($rs->fields('employee'));
		$this->loan->setDbValue($rs->fields('loan'));
		$this->start_date->setDbValue($rs->fields('start_date'));
		$this->last_installment_date->setDbValue($rs->fields('last_installment_date'));
		$this->period_months->setDbValue($rs->fields('period_months'));
		$this->currency->setDbValue($rs->fields('currency'));
		$this->amount->setDbValue($rs->fields('amount'));
		$this->monthly_installment->setDbValue($rs->fields('monthly_installment'));
		$this->status->setDbValue($rs->fields('status'));
		$this->details->setDbValue($rs->fields('details'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// employee
		// loan
		// start_date
		// last_installment_date
		// period_months
		// currency
		// amount
		// monthly_installment
		// status
		// details
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// employee
		$this->employee->ViewValue = $this->employee->CurrentValue;
		$this->employee->ViewValue = FormatNumber($this->employee->ViewValue, 0, -2, -2, -2);
		$this->employee->ViewCustomAttributes = "";

		// loan
		$this->loan->ViewValue = $this->loan->CurrentValue;
		$this->loan->ViewValue = FormatNumber($this->loan->ViewValue, 0, -2, -2, -2);
		$this->loan->ViewCustomAttributes = "";

		// start_date
		$this->start_date->ViewValue = $this->start_date->CurrentValue;
		$this->start_date->ViewValue = FormatDateTime($this->start_date->ViewValue, 0);
		$this->start_date->ViewCustomAttributes = "";

		// last_installment_date
		$this->last_installment_date->ViewValue = $this->last_installment_date->CurrentValue;
		$this->last_installment_date->ViewValue = FormatDateTime($this->last_installment_date->ViewValue, 0);
		$this->last_installment_date->ViewCustomAttributes = "";

		// period_months
		$this->period_months->ViewValue = $this->period_months->CurrentValue;
		$this->period_months->ViewValue = FormatNumber($this->period_months->ViewValue, 0, -2, -2, -2);
		$this->period_months->ViewCustomAttributes = "";

		// currency
		$this->currency->ViewValue = $this->currency->CurrentValue;
		$this->currency->ViewValue = FormatNumber($this->currency->ViewValue, 0, -2, -2, -2);
		$this->currency->ViewCustomAttributes = "";

		// amount
		$this->amount->ViewValue = $this->amount->CurrentValue;
		$this->amount->ViewValue = FormatNumber($this->amount->ViewValue, 2, -2, -2, -2);
		$this->amount->ViewCustomAttributes = "";

		// monthly_installment
		$this->monthly_installment->ViewValue = $this->monthly_installment->CurrentValue;
		$this->monthly_installment->ViewValue = FormatNumber($this->monthly_installment->ViewValue, 2, -2, -2, -2);
		$this->monthly_installment->ViewCustomAttributes = "";

		// status
		if (strval($this->status->CurrentValue) <> "") {
			$this->status->ViewValue = $this->status->optionCaption($this->status->CurrentValue);
		} else {
			$this->status->ViewValue = NULL;
		}
		$this->status->ViewCustomAttributes = "";

		// details
		$this->details->ViewValue = $this->details->CurrentValue;
		$this->details->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// employee
		$this->employee->LinkCustomAttributes = "";
		$this->employee->HrefValue = "";
		$this->employee->TooltipValue = "";

		// loan
		$this->loan->LinkCustomAttributes = "";
		$this->loan->HrefValue = "";
		$this->loan->TooltipValue = "";

		// start_date
		$this->start_date->LinkCustomAttributes = "";
		$this->start_date->HrefValue = "";
		$this->start_date->TooltipValue = "";

		// last_installment_date
		$this->last_installment_date->LinkCustomAttributes = "";
		$this->last_installment_date->HrefValue = "";
		$this->last_installment_date->TooltipValue = "";

		// period_months
		$this->period_months->LinkCustomAttributes = "";
		$this->period_months->HrefValue = "";
		$this->period_months->TooltipValue = "";

		// currency
		$this->currency->LinkCustomAttributes = "";
		$this->currency->HrefValue = "";
		$this->currency->TooltipValue = "";

		// amount
		$this->amount->LinkCustomAttributes = "";
		$this->amount->HrefValue = "";
		$this->amount->TooltipValue = "";

		// monthly_installment
		$this->monthly_installment->LinkCustomAttributes = "";
		$this->monthly_installment->HrefValue = "";
		$this->monthly_installment->TooltipValue = "";

		// status
		$this->status->LinkCustomAttributes = "";
		$this->status->HrefValue = "";
		$this->status->TooltipValue = "";

		// details
		$this->details->LinkCustomAttributes = "";
		$this->details->HrefValue = "";
		$this->details->TooltipValue = "";

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

		// employee
		$this->employee->EditAttrs["class"] = "form-control";
		$this->employee->EditCustomAttributes = "";
		$this->employee->EditValue = $this->employee->CurrentValue;
		$this->employee->PlaceHolder = RemoveHtml($this->employee->caption());

		// loan
		$this->loan->EditAttrs["class"] = "form-control";
		$this->loan->EditCustomAttributes = "";
		$this->loan->EditValue = $this->loan->CurrentValue;
		$this->loan->PlaceHolder = RemoveHtml($this->loan->caption());

		// start_date
		$this->start_date->EditAttrs["class"] = "form-control";
		$this->start_date->EditCustomAttributes = "";
		$this->start_date->EditValue = FormatDateTime($this->start_date->CurrentValue, 8);
		$this->start_date->PlaceHolder = RemoveHtml($this->start_date->caption());

		// last_installment_date
		$this->last_installment_date->EditAttrs["class"] = "form-control";
		$this->last_installment_date->EditCustomAttributes = "";
		$this->last_installment_date->EditValue = FormatDateTime($this->last_installment_date->CurrentValue, 8);
		$this->last_installment_date->PlaceHolder = RemoveHtml($this->last_installment_date->caption());

		// period_months
		$this->period_months->EditAttrs["class"] = "form-control";
		$this->period_months->EditCustomAttributes = "";
		$this->period_months->EditValue = $this->period_months->CurrentValue;
		$this->period_months->PlaceHolder = RemoveHtml($this->period_months->caption());

		// currency
		$this->currency->EditAttrs["class"] = "form-control";
		$this->currency->EditCustomAttributes = "";
		$this->currency->EditValue = $this->currency->CurrentValue;
		$this->currency->PlaceHolder = RemoveHtml($this->currency->caption());

		// amount
		$this->amount->EditAttrs["class"] = "form-control";
		$this->amount->EditCustomAttributes = "";
		$this->amount->EditValue = $this->amount->CurrentValue;
		$this->amount->PlaceHolder = RemoveHtml($this->amount->caption());
		if (strval($this->amount->EditValue) <> "" && is_numeric($this->amount->EditValue))
			$this->amount->EditValue = FormatNumber($this->amount->EditValue, -2, -2, -2, -2);

		// monthly_installment
		$this->monthly_installment->EditAttrs["class"] = "form-control";
		$this->monthly_installment->EditCustomAttributes = "";
		$this->monthly_installment->EditValue = $this->monthly_installment->CurrentValue;
		$this->monthly_installment->PlaceHolder = RemoveHtml($this->monthly_installment->caption());
		if (strval($this->monthly_installment->EditValue) <> "" && is_numeric($this->monthly_installment->EditValue))
			$this->monthly_installment->EditValue = FormatNumber($this->monthly_installment->EditValue, -2, -2, -2, -2);

		// status
		$this->status->EditCustomAttributes = "";
		$this->status->EditValue = $this->status->options(FALSE);

		// details
		$this->details->EditAttrs["class"] = "form-control";
		$this->details->EditCustomAttributes = "";
		$this->details->EditValue = $this->details->CurrentValue;
		$this->details->PlaceHolder = RemoveHtml($this->details->caption());

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
					$doc->exportCaption($this->employee);
					$doc->exportCaption($this->loan);
					$doc->exportCaption($this->start_date);
					$doc->exportCaption($this->last_installment_date);
					$doc->exportCaption($this->period_months);
					$doc->exportCaption($this->currency);
					$doc->exportCaption($this->amount);
					$doc->exportCaption($this->monthly_installment);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->details);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->employee);
					$doc->exportCaption($this->loan);
					$doc->exportCaption($this->start_date);
					$doc->exportCaption($this->last_installment_date);
					$doc->exportCaption($this->period_months);
					$doc->exportCaption($this->currency);
					$doc->exportCaption($this->amount);
					$doc->exportCaption($this->monthly_installment);
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
						$doc->exportField($this->employee);
						$doc->exportField($this->loan);
						$doc->exportField($this->start_date);
						$doc->exportField($this->last_installment_date);
						$doc->exportField($this->period_months);
						$doc->exportField($this->currency);
						$doc->exportField($this->amount);
						$doc->exportField($this->monthly_installment);
						$doc->exportField($this->status);
						$doc->exportField($this->details);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->employee);
						$doc->exportField($this->loan);
						$doc->exportField($this->start_date);
						$doc->exportField($this->last_installment_date);
						$doc->exportField($this->period_months);
						$doc->exportField($this->currency);
						$doc->exportField($this->amount);
						$doc->exportField($this->monthly_installment);
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