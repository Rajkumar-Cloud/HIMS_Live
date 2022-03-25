<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for reception
 */
class reception extends DbTable
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
	public $PatientID;
	public $PatientName;
	public $OorN;
	public $PRIMARY_CONSULTANT;
	public $CATEGORY;
	public $PROCEDURE;
	public $Amount;
	public $MODE_OF_PAYMENT;
	public $NEXT_REVIEW_DATE;
	public $REMARKS;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'reception';
		$this->TableName = 'reception';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`reception`";
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
		$this->id = new DbField('reception', 'reception', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// PatientID
		$this->PatientID = new DbField('reception', 'reception', 'x_PatientID', 'PatientID', '`PatientID`', '`PatientID`', 200, 45, -1, FALSE, '`PatientID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientID->Sortable = TRUE; // Allow sort
		$this->fields['PatientID'] = &$this->PatientID;

		// PatientName
		$this->PatientName = new DbField('reception', 'reception', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, FALSE, '`PatientName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientName->Sortable = TRUE; // Allow sort
		$this->fields['PatientName'] = &$this->PatientName;

		// OorN
		$this->OorN = new DbField('reception', 'reception', 'x_OorN', 'OorN', '`OorN`', '`OorN`', 200, 45, -1, FALSE, '`OorN`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OorN->Sortable = TRUE; // Allow sort
		$this->fields['OorN'] = &$this->OorN;

		// PRIMARY_CONSULTANT
		$this->PRIMARY_CONSULTANT = new DbField('reception', 'reception', 'x_PRIMARY_CONSULTANT', 'PRIMARY_CONSULTANT', '`PRIMARY_CONSULTANT`', '`PRIMARY_CONSULTANT`', 200, 45, -1, FALSE, '`PRIMARY_CONSULTANT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PRIMARY_CONSULTANT->Sortable = TRUE; // Allow sort
		$this->fields['PRIMARY_CONSULTANT'] = &$this->PRIMARY_CONSULTANT;

		// CATEGORY
		$this->CATEGORY = new DbField('reception', 'reception', 'x_CATEGORY', 'CATEGORY', '`CATEGORY`', '`CATEGORY`', 200, 45, -1, FALSE, '`CATEGORY`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->CATEGORY->Sortable = TRUE; // Allow sort
		$this->CATEGORY->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->CATEGORY->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->CATEGORY->Lookup = new Lookup('CATEGORY', 'mas_category', FALSE, 'CATEGORY', ["CATEGORY","","",""], [], [], [], [], [], [], '', '');
		$this->fields['CATEGORY'] = &$this->CATEGORY;

		// PROCEDURE
		$this->PROCEDURE = new DbField('reception', 'reception', 'x_PROCEDURE', 'PROCEDURE', '`PROCEDURE`', '`PROCEDURE`', 200, 45, -1, FALSE, '`PROCEDURE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->PROCEDURE->Sortable = TRUE; // Allow sort
		$this->PROCEDURE->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->PROCEDURE->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->PROCEDURE->Lookup = new Lookup('PROCEDURE', 'mas_procedure', FALSE, 'PROCEDURE', ["PROCEDURE","","",""], [], [], [], [], [], [], '', '');
		$this->fields['PROCEDURE'] = &$this->PROCEDURE;

		// Amount
		$this->Amount = new DbField('reception', 'reception', 'x_Amount', 'Amount', '`Amount`', '`Amount`', 200, 45, -1, FALSE, '`Amount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Amount->Sortable = TRUE; // Allow sort
		$this->fields['Amount'] = &$this->Amount;

		// MODE OF PAYMENT
		$this->MODE_OF_PAYMENT = new DbField('reception', 'reception', 'x_MODE_OF_PAYMENT', 'MODE OF PAYMENT', '`MODE OF PAYMENT`', '`MODE OF PAYMENT`', 200, 45, -1, FALSE, '`MODE OF PAYMENT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->MODE_OF_PAYMENT->Sortable = TRUE; // Allow sort
		$this->MODE_OF_PAYMENT->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->MODE_OF_PAYMENT->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->MODE_OF_PAYMENT->Lookup = new Lookup('MODE OF PAYMENT', 'mas_modepayment', FALSE, 'Mode', ["Mode","","",""], [], [], [], [], [], [], '', '');
		$this->fields['MODE OF PAYMENT'] = &$this->MODE_OF_PAYMENT;

		// NEXT REVIEW DATE
		$this->NEXT_REVIEW_DATE = new DbField('reception', 'reception', 'x_NEXT_REVIEW_DATE', 'NEXT REVIEW DATE', '`NEXT REVIEW DATE`', CastDateFieldForLike("`NEXT REVIEW DATE`", 0, "DB"), 133, 10, 0, FALSE, '`NEXT REVIEW DATE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NEXT_REVIEW_DATE->Sortable = TRUE; // Allow sort
		$this->NEXT_REVIEW_DATE->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['NEXT REVIEW DATE'] = &$this->NEXT_REVIEW_DATE;

		// REMARKS
		$this->REMARKS = new DbField('reception', 'reception', 'x_REMARKS', 'REMARKS', '`REMARKS`', '`REMARKS`', 200, 45, -1, FALSE, '`REMARKS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->REMARKS->Sortable = TRUE; // Allow sort
		$this->fields['REMARKS'] = &$this->REMARKS;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`reception`";
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
		return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : "`id` DESC";
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
		$this->PatientID->DbValue = $row['PatientID'];
		$this->PatientName->DbValue = $row['PatientName'];
		$this->OorN->DbValue = $row['OorN'];
		$this->PRIMARY_CONSULTANT->DbValue = $row['PRIMARY_CONSULTANT'];
		$this->CATEGORY->DbValue = $row['CATEGORY'];
		$this->PROCEDURE->DbValue = $row['PROCEDURE'];
		$this->Amount->DbValue = $row['Amount'];
		$this->MODE_OF_PAYMENT->DbValue = $row['MODE OF PAYMENT'];
		$this->NEXT_REVIEW_DATE->DbValue = $row['NEXT REVIEW DATE'];
		$this->REMARKS->DbValue = $row['REMARKS'];
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
			return "receptionlist.php";
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
		if ($pageName == "receptionview.php")
			return $Language->phrase("View");
		elseif ($pageName == "receptionedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "receptionadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "receptionlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("receptionview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("receptionview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "receptionadd.php?" . $this->getUrlParm($parm);
		else
			$url = "receptionadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("receptionedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("receptionadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("receptiondelete.php", $this->getUrlParm());
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
		$this->PatientID->setDbValue($rs->fields('PatientID'));
		$this->PatientName->setDbValue($rs->fields('PatientName'));
		$this->OorN->setDbValue($rs->fields('OorN'));
		$this->PRIMARY_CONSULTANT->setDbValue($rs->fields('PRIMARY_CONSULTANT'));
		$this->CATEGORY->setDbValue($rs->fields('CATEGORY'));
		$this->PROCEDURE->setDbValue($rs->fields('PROCEDURE'));
		$this->Amount->setDbValue($rs->fields('Amount'));
		$this->MODE_OF_PAYMENT->setDbValue($rs->fields('MODE OF PAYMENT'));
		$this->NEXT_REVIEW_DATE->setDbValue($rs->fields('NEXT REVIEW DATE'));
		$this->REMARKS->setDbValue($rs->fields('REMARKS'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// PatientID
		// PatientName
		// OorN
		// PRIMARY_CONSULTANT
		// CATEGORY
		// PROCEDURE
		// Amount
		// MODE OF PAYMENT
		// NEXT REVIEW DATE
		// REMARKS
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// PatientID
		$this->PatientID->ViewValue = $this->PatientID->CurrentValue;
		$this->PatientID->ViewCustomAttributes = "";

		// PatientName
		$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
		$this->PatientName->ViewCustomAttributes = "";

		// OorN
		$this->OorN->ViewValue = $this->OorN->CurrentValue;
		$this->OorN->ViewCustomAttributes = "";

		// PRIMARY_CONSULTANT
		$this->PRIMARY_CONSULTANT->ViewValue = $this->PRIMARY_CONSULTANT->CurrentValue;
		$this->PRIMARY_CONSULTANT->ViewCustomAttributes = "";

		// CATEGORY
		$curVal = strval($this->CATEGORY->CurrentValue);
		if ($curVal != "") {
			$this->CATEGORY->ViewValue = $this->CATEGORY->lookupCacheOption($curVal);
			if ($this->CATEGORY->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`CATEGORY`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->CATEGORY->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->CATEGORY->ViewValue = $this->CATEGORY->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->CATEGORY->ViewValue = $this->CATEGORY->CurrentValue;
				}
			}
		} else {
			$this->CATEGORY->ViewValue = NULL;
		}
		$this->CATEGORY->ViewCustomAttributes = "";

		// PROCEDURE
		$curVal = strval($this->PROCEDURE->CurrentValue);
		if ($curVal != "") {
			$this->PROCEDURE->ViewValue = $this->PROCEDURE->lookupCacheOption($curVal);
			if ($this->PROCEDURE->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`PROCEDURE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->PROCEDURE->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->PROCEDURE->ViewValue = $this->PROCEDURE->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->PROCEDURE->ViewValue = $this->PROCEDURE->CurrentValue;
				}
			}
		} else {
			$this->PROCEDURE->ViewValue = NULL;
		}
		$this->PROCEDURE->ViewCustomAttributes = "";

		// Amount
		$this->Amount->ViewValue = $this->Amount->CurrentValue;
		$this->Amount->ViewCustomAttributes = "";

		// MODE OF PAYMENT
		$curVal = strval($this->MODE_OF_PAYMENT->CurrentValue);
		if ($curVal != "") {
			$this->MODE_OF_PAYMENT->ViewValue = $this->MODE_OF_PAYMENT->lookupCacheOption($curVal);
			if ($this->MODE_OF_PAYMENT->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Mode`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->MODE_OF_PAYMENT->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->MODE_OF_PAYMENT->ViewValue = $this->MODE_OF_PAYMENT->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->MODE_OF_PAYMENT->ViewValue = $this->MODE_OF_PAYMENT->CurrentValue;
				}
			}
		} else {
			$this->MODE_OF_PAYMENT->ViewValue = NULL;
		}
		$this->MODE_OF_PAYMENT->ViewCustomAttributes = "";

		// NEXT REVIEW DATE
		$this->NEXT_REVIEW_DATE->ViewValue = $this->NEXT_REVIEW_DATE->CurrentValue;
		$this->NEXT_REVIEW_DATE->ViewValue = FormatDateTime($this->NEXT_REVIEW_DATE->ViewValue, 0);
		$this->NEXT_REVIEW_DATE->ViewCustomAttributes = "";

		// REMARKS
		$this->REMARKS->ViewValue = $this->REMARKS->CurrentValue;
		$this->REMARKS->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// PatientID
		$this->PatientID->LinkCustomAttributes = "";
		$this->PatientID->HrefValue = "";
		$this->PatientID->TooltipValue = "";

		// PatientName
		$this->PatientName->LinkCustomAttributes = "";
		$this->PatientName->HrefValue = "";
		$this->PatientName->TooltipValue = "";

		// OorN
		$this->OorN->LinkCustomAttributes = "";
		$this->OorN->HrefValue = "";
		$this->OorN->TooltipValue = "";

		// PRIMARY_CONSULTANT
		$this->PRIMARY_CONSULTANT->LinkCustomAttributes = "";
		$this->PRIMARY_CONSULTANT->HrefValue = "";
		$this->PRIMARY_CONSULTANT->TooltipValue = "";

		// CATEGORY
		$this->CATEGORY->LinkCustomAttributes = "";
		$this->CATEGORY->HrefValue = "";
		$this->CATEGORY->TooltipValue = "";

		// PROCEDURE
		$this->PROCEDURE->LinkCustomAttributes = "";
		$this->PROCEDURE->HrefValue = "";
		$this->PROCEDURE->TooltipValue = "";

		// Amount
		$this->Amount->LinkCustomAttributes = "";
		$this->Amount->HrefValue = "";
		$this->Amount->TooltipValue = "";

		// MODE OF PAYMENT
		$this->MODE_OF_PAYMENT->LinkCustomAttributes = "";
		$this->MODE_OF_PAYMENT->HrefValue = "";
		$this->MODE_OF_PAYMENT->TooltipValue = "";

		// NEXT REVIEW DATE
		$this->NEXT_REVIEW_DATE->LinkCustomAttributes = "";
		$this->NEXT_REVIEW_DATE->HrefValue = "";
		$this->NEXT_REVIEW_DATE->TooltipValue = "";

		// REMARKS
		$this->REMARKS->LinkCustomAttributes = "";
		$this->REMARKS->HrefValue = "";
		$this->REMARKS->TooltipValue = "";

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

		// PatientID
		$this->PatientID->EditAttrs["class"] = "form-control";
		$this->PatientID->EditCustomAttributes = "";
		if (!$this->PatientID->Raw)
			$this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
		$this->PatientID->EditValue = $this->PatientID->CurrentValue;
		$this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

		// PatientName
		$this->PatientName->EditAttrs["class"] = "form-control";
		$this->PatientName->EditCustomAttributes = "";
		if (!$this->PatientName->Raw)
			$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
		$this->PatientName->EditValue = $this->PatientName->CurrentValue;
		$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

		// OorN
		$this->OorN->EditAttrs["class"] = "form-control";
		$this->OorN->EditCustomAttributes = "";
		if (!$this->OorN->Raw)
			$this->OorN->CurrentValue = HtmlDecode($this->OorN->CurrentValue);
		$this->OorN->EditValue = $this->OorN->CurrentValue;
		$this->OorN->PlaceHolder = RemoveHtml($this->OorN->caption());

		// PRIMARY_CONSULTANT
		$this->PRIMARY_CONSULTANT->EditAttrs["class"] = "form-control";
		$this->PRIMARY_CONSULTANT->EditCustomAttributes = "";
		if (!$this->PRIMARY_CONSULTANT->Raw)
			$this->PRIMARY_CONSULTANT->CurrentValue = HtmlDecode($this->PRIMARY_CONSULTANT->CurrentValue);
		$this->PRIMARY_CONSULTANT->EditValue = $this->PRIMARY_CONSULTANT->CurrentValue;
		$this->PRIMARY_CONSULTANT->PlaceHolder = RemoveHtml($this->PRIMARY_CONSULTANT->caption());

		// CATEGORY
		$this->CATEGORY->EditAttrs["class"] = "form-control";
		$this->CATEGORY->EditCustomAttributes = "";

		// PROCEDURE
		$this->PROCEDURE->EditAttrs["class"] = "form-control";
		$this->PROCEDURE->EditCustomAttributes = "";

		// Amount
		$this->Amount->EditAttrs["class"] = "form-control";
		$this->Amount->EditCustomAttributes = "";
		if (!$this->Amount->Raw)
			$this->Amount->CurrentValue = HtmlDecode($this->Amount->CurrentValue);
		$this->Amount->EditValue = $this->Amount->CurrentValue;
		$this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());

		// MODE OF PAYMENT
		$this->MODE_OF_PAYMENT->EditAttrs["class"] = "form-control";
		$this->MODE_OF_PAYMENT->EditCustomAttributes = "";

		// NEXT REVIEW DATE
		$this->NEXT_REVIEW_DATE->EditAttrs["class"] = "form-control";
		$this->NEXT_REVIEW_DATE->EditCustomAttributes = "";
		$this->NEXT_REVIEW_DATE->EditValue = FormatDateTime($this->NEXT_REVIEW_DATE->CurrentValue, 8);
		$this->NEXT_REVIEW_DATE->PlaceHolder = RemoveHtml($this->NEXT_REVIEW_DATE->caption());

		// REMARKS
		$this->REMARKS->EditAttrs["class"] = "form-control";
		$this->REMARKS->EditCustomAttributes = "";
		if (!$this->REMARKS->Raw)
			$this->REMARKS->CurrentValue = HtmlDecode($this->REMARKS->CurrentValue);
		$this->REMARKS->EditValue = $this->REMARKS->CurrentValue;
		$this->REMARKS->PlaceHolder = RemoveHtml($this->REMARKS->caption());

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
					$doc->exportCaption($this->PatientID);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->OorN);
					$doc->exportCaption($this->PRIMARY_CONSULTANT);
					$doc->exportCaption($this->CATEGORY);
					$doc->exportCaption($this->PROCEDURE);
					$doc->exportCaption($this->Amount);
					$doc->exportCaption($this->MODE_OF_PAYMENT);
					$doc->exportCaption($this->NEXT_REVIEW_DATE);
					$doc->exportCaption($this->REMARKS);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->PatientID);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->OorN);
					$doc->exportCaption($this->PRIMARY_CONSULTANT);
					$doc->exportCaption($this->CATEGORY);
					$doc->exportCaption($this->PROCEDURE);
					$doc->exportCaption($this->Amount);
					$doc->exportCaption($this->MODE_OF_PAYMENT);
					$doc->exportCaption($this->NEXT_REVIEW_DATE);
					$doc->exportCaption($this->REMARKS);
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
						$doc->exportField($this->PatientID);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->OorN);
						$doc->exportField($this->PRIMARY_CONSULTANT);
						$doc->exportField($this->CATEGORY);
						$doc->exportField($this->PROCEDURE);
						$doc->exportField($this->Amount);
						$doc->exportField($this->MODE_OF_PAYMENT);
						$doc->exportField($this->NEXT_REVIEW_DATE);
						$doc->exportField($this->REMARKS);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->PatientID);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->OorN);
						$doc->exportField($this->PRIMARY_CONSULTANT);
						$doc->exportField($this->CATEGORY);
						$doc->exportField($this->PROCEDURE);
						$doc->exportField($this->Amount);
						$doc->exportField($this->MODE_OF_PAYMENT);
						$doc->exportField($this->NEXT_REVIEW_DATE);
						$doc->exportField($this->REMARKS);
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