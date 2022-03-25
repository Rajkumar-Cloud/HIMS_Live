<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for pharmacy_customers
 */
class pharmacy_customers extends DbTable
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
	public $Customercode;
	public $Customername;
	public $Address1;
	public $Address2;
	public $Address3;
	public $State;
	public $Pincode;
	public $Phone;
	public $Fax;
	public $_Email;
	public $Ratetype;
	public $Creationdate;
	public $ContactPerson;
	public $CPPhone;
	public $id;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'pharmacy_customers';
		$this->TableName = 'pharmacy_customers';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`pharmacy_customers`";
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

		// Customercode
		$this->Customercode = new DbField('pharmacy_customers', 'pharmacy_customers', 'x_Customercode', 'Customercode', '`Customercode`', '`Customercode`', 3, -1, FALSE, '`Customercode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Customercode->Nullable = FALSE; // NOT NULL field
		$this->Customercode->Required = TRUE; // Required field
		$this->Customercode->Sortable = TRUE; // Allow sort
		$this->Customercode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Customercode'] = &$this->Customercode;

		// Customername
		$this->Customername = new DbField('pharmacy_customers', 'pharmacy_customers', 'x_Customername', 'Customername', '`Customername`', '`Customername`', 201, -1, FALSE, '`Customername`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Customername->Sortable = TRUE; // Allow sort
		$this->fields['Customername'] = &$this->Customername;

		// Address1
		$this->Address1 = new DbField('pharmacy_customers', 'pharmacy_customers', 'x_Address1', 'Address1', '`Address1`', '`Address1`', 200, -1, FALSE, '`Address1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Address1->Sortable = TRUE; // Allow sort
		$this->fields['Address1'] = &$this->Address1;

		// Address2
		$this->Address2 = new DbField('pharmacy_customers', 'pharmacy_customers', 'x_Address2', 'Address2', '`Address2`', '`Address2`', 200, -1, FALSE, '`Address2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Address2->Sortable = TRUE; // Allow sort
		$this->fields['Address2'] = &$this->Address2;

		// Address3
		$this->Address3 = new DbField('pharmacy_customers', 'pharmacy_customers', 'x_Address3', 'Address3', '`Address3`', '`Address3`', 200, -1, FALSE, '`Address3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Address3->Sortable = TRUE; // Allow sort
		$this->fields['Address3'] = &$this->Address3;

		// State
		$this->State = new DbField('pharmacy_customers', 'pharmacy_customers', 'x_State', 'State', '`State`', '`State`', 200, -1, FALSE, '`State`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->State->Sortable = TRUE; // Allow sort
		$this->fields['State'] = &$this->State;

		// Pincode
		$this->Pincode = new DbField('pharmacy_customers', 'pharmacy_customers', 'x_Pincode', 'Pincode', '`Pincode`', '`Pincode`', 200, -1, FALSE, '`Pincode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Pincode->Sortable = TRUE; // Allow sort
		$this->fields['Pincode'] = &$this->Pincode;

		// Phone
		$this->Phone = new DbField('pharmacy_customers', 'pharmacy_customers', 'x_Phone', 'Phone', '`Phone`', '`Phone`', 200, -1, FALSE, '`Phone`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Phone->Sortable = TRUE; // Allow sort
		$this->fields['Phone'] = &$this->Phone;

		// Fax
		$this->Fax = new DbField('pharmacy_customers', 'pharmacy_customers', 'x_Fax', 'Fax', '`Fax`', '`Fax`', 200, -1, FALSE, '`Fax`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Fax->Sortable = TRUE; // Allow sort
		$this->fields['Fax'] = &$this->Fax;

		// Email
		$this->_Email = new DbField('pharmacy_customers', 'pharmacy_customers', 'x__Email', 'Email', '`Email`', '`Email`', 200, -1, FALSE, '`Email`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_Email->Sortable = TRUE; // Allow sort
		$this->fields['Email'] = &$this->_Email;

		// Ratetype
		$this->Ratetype = new DbField('pharmacy_customers', 'pharmacy_customers', 'x_Ratetype', 'Ratetype', '`Ratetype`', '`Ratetype`', 200, -1, FALSE, '`Ratetype`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Ratetype->Sortable = TRUE; // Allow sort
		$this->fields['Ratetype'] = &$this->Ratetype;

		// Creationdate
		$this->Creationdate = new DbField('pharmacy_customers', 'pharmacy_customers', 'x_Creationdate', 'Creationdate', '`Creationdate`', CastDateFieldForLike('`Creationdate`', 0, "DB"), 135, 0, FALSE, '`Creationdate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Creationdate->Sortable = TRUE; // Allow sort
		$this->Creationdate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['Creationdate'] = &$this->Creationdate;

		// ContactPerson
		$this->ContactPerson = new DbField('pharmacy_customers', 'pharmacy_customers', 'x_ContactPerson', 'ContactPerson', '`ContactPerson`', '`ContactPerson`', 200, -1, FALSE, '`ContactPerson`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ContactPerson->Sortable = TRUE; // Allow sort
		$this->fields['ContactPerson'] = &$this->ContactPerson;

		// CPPhone
		$this->CPPhone = new DbField('pharmacy_customers', 'pharmacy_customers', 'x_CPPhone', 'CPPhone', '`CPPhone`', '`CPPhone`', 200, -1, FALSE, '`CPPhone`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CPPhone->Sortable = TRUE; // Allow sort
		$this->fields['CPPhone'] = &$this->CPPhone;

		// id
		$this->id = new DbField('pharmacy_customers', 'pharmacy_customers', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`pharmacy_customers`";
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
		$this->Customercode->DbValue = $row['Customercode'];
		$this->Customername->DbValue = $row['Customername'];
		$this->Address1->DbValue = $row['Address1'];
		$this->Address2->DbValue = $row['Address2'];
		$this->Address3->DbValue = $row['Address3'];
		$this->State->DbValue = $row['State'];
		$this->Pincode->DbValue = $row['Pincode'];
		$this->Phone->DbValue = $row['Phone'];
		$this->Fax->DbValue = $row['Fax'];
		$this->_Email->DbValue = $row['Email'];
		$this->Ratetype->DbValue = $row['Ratetype'];
		$this->Creationdate->DbValue = $row['Creationdate'];
		$this->ContactPerson->DbValue = $row['ContactPerson'];
		$this->CPPhone->DbValue = $row['CPPhone'];
		$this->id->DbValue = $row['id'];
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
			return "pharmacy_customerslist.php";
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
		if ($pageName == "pharmacy_customersview.php")
			return $Language->phrase("View");
		elseif ($pageName == "pharmacy_customersedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "pharmacy_customersadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "pharmacy_customerslist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("pharmacy_customersview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("pharmacy_customersview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "pharmacy_customersadd.php?" . $this->getUrlParm($parm);
		else
			$url = "pharmacy_customersadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("pharmacy_customersedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("pharmacy_customersadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("pharmacy_customersdelete.php", $this->getUrlParm());
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
		$this->Customercode->setDbValue($rs->fields('Customercode'));
		$this->Customername->setDbValue($rs->fields('Customername'));
		$this->Address1->setDbValue($rs->fields('Address1'));
		$this->Address2->setDbValue($rs->fields('Address2'));
		$this->Address3->setDbValue($rs->fields('Address3'));
		$this->State->setDbValue($rs->fields('State'));
		$this->Pincode->setDbValue($rs->fields('Pincode'));
		$this->Phone->setDbValue($rs->fields('Phone'));
		$this->Fax->setDbValue($rs->fields('Fax'));
		$this->_Email->setDbValue($rs->fields('Email'));
		$this->Ratetype->setDbValue($rs->fields('Ratetype'));
		$this->Creationdate->setDbValue($rs->fields('Creationdate'));
		$this->ContactPerson->setDbValue($rs->fields('ContactPerson'));
		$this->CPPhone->setDbValue($rs->fields('CPPhone'));
		$this->id->setDbValue($rs->fields('id'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// Customercode
		// Customername
		// Address1
		// Address2
		// Address3
		// State
		// Pincode
		// Phone
		// Fax
		// Email
		// Ratetype
		// Creationdate
		// ContactPerson
		// CPPhone
		// id
		// Customercode

		$this->Customercode->ViewValue = $this->Customercode->CurrentValue;
		$this->Customercode->ViewValue = FormatNumber($this->Customercode->ViewValue, 0, -2, -2, -2);
		$this->Customercode->ViewCustomAttributes = "";

		// Customername
		$this->Customername->ViewValue = $this->Customername->CurrentValue;
		$this->Customername->ViewCustomAttributes = "";

		// Address1
		$this->Address1->ViewValue = $this->Address1->CurrentValue;
		$this->Address1->ViewCustomAttributes = "";

		// Address2
		$this->Address2->ViewValue = $this->Address2->CurrentValue;
		$this->Address2->ViewCustomAttributes = "";

		// Address3
		$this->Address3->ViewValue = $this->Address3->CurrentValue;
		$this->Address3->ViewCustomAttributes = "";

		// State
		$this->State->ViewValue = $this->State->CurrentValue;
		$this->State->ViewCustomAttributes = "";

		// Pincode
		$this->Pincode->ViewValue = $this->Pincode->CurrentValue;
		$this->Pincode->ViewCustomAttributes = "";

		// Phone
		$this->Phone->ViewValue = $this->Phone->CurrentValue;
		$this->Phone->ViewCustomAttributes = "";

		// Fax
		$this->Fax->ViewValue = $this->Fax->CurrentValue;
		$this->Fax->ViewCustomAttributes = "";

		// Email
		$this->_Email->ViewValue = $this->_Email->CurrentValue;
		$this->_Email->ViewCustomAttributes = "";

		// Ratetype
		$this->Ratetype->ViewValue = $this->Ratetype->CurrentValue;
		$this->Ratetype->ViewCustomAttributes = "";

		// Creationdate
		$this->Creationdate->ViewValue = $this->Creationdate->CurrentValue;
		$this->Creationdate->ViewValue = FormatDateTime($this->Creationdate->ViewValue, 0);
		$this->Creationdate->ViewCustomAttributes = "";

		// ContactPerson
		$this->ContactPerson->ViewValue = $this->ContactPerson->CurrentValue;
		$this->ContactPerson->ViewCustomAttributes = "";

		// CPPhone
		$this->CPPhone->ViewValue = $this->CPPhone->CurrentValue;
		$this->CPPhone->ViewCustomAttributes = "";

		// id
		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// Customercode
		$this->Customercode->LinkCustomAttributes = "";
		$this->Customercode->HrefValue = "";
		$this->Customercode->TooltipValue = "";

		// Customername
		$this->Customername->LinkCustomAttributes = "";
		$this->Customername->HrefValue = "";
		$this->Customername->TooltipValue = "";

		// Address1
		$this->Address1->LinkCustomAttributes = "";
		$this->Address1->HrefValue = "";
		$this->Address1->TooltipValue = "";

		// Address2
		$this->Address2->LinkCustomAttributes = "";
		$this->Address2->HrefValue = "";
		$this->Address2->TooltipValue = "";

		// Address3
		$this->Address3->LinkCustomAttributes = "";
		$this->Address3->HrefValue = "";
		$this->Address3->TooltipValue = "";

		// State
		$this->State->LinkCustomAttributes = "";
		$this->State->HrefValue = "";
		$this->State->TooltipValue = "";

		// Pincode
		$this->Pincode->LinkCustomAttributes = "";
		$this->Pincode->HrefValue = "";
		$this->Pincode->TooltipValue = "";

		// Phone
		$this->Phone->LinkCustomAttributes = "";
		$this->Phone->HrefValue = "";
		$this->Phone->TooltipValue = "";

		// Fax
		$this->Fax->LinkCustomAttributes = "";
		$this->Fax->HrefValue = "";
		$this->Fax->TooltipValue = "";

		// Email
		$this->_Email->LinkCustomAttributes = "";
		$this->_Email->HrefValue = "";
		$this->_Email->TooltipValue = "";

		// Ratetype
		$this->Ratetype->LinkCustomAttributes = "";
		$this->Ratetype->HrefValue = "";
		$this->Ratetype->TooltipValue = "";

		// Creationdate
		$this->Creationdate->LinkCustomAttributes = "";
		$this->Creationdate->HrefValue = "";
		$this->Creationdate->TooltipValue = "";

		// ContactPerson
		$this->ContactPerson->LinkCustomAttributes = "";
		$this->ContactPerson->HrefValue = "";
		$this->ContactPerson->TooltipValue = "";

		// CPPhone
		$this->CPPhone->LinkCustomAttributes = "";
		$this->CPPhone->HrefValue = "";
		$this->CPPhone->TooltipValue = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

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

		// Customercode
		$this->Customercode->EditAttrs["class"] = "form-control";
		$this->Customercode->EditCustomAttributes = "";
		$this->Customercode->EditValue = $this->Customercode->CurrentValue;
		$this->Customercode->PlaceHolder = RemoveHtml($this->Customercode->caption());

		// Customername
		$this->Customername->EditAttrs["class"] = "form-control";
		$this->Customername->EditCustomAttributes = "";
		$this->Customername->EditValue = $this->Customername->CurrentValue;
		$this->Customername->PlaceHolder = RemoveHtml($this->Customername->caption());

		// Address1
		$this->Address1->EditAttrs["class"] = "form-control";
		$this->Address1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Address1->CurrentValue = HtmlDecode($this->Address1->CurrentValue);
		$this->Address1->EditValue = $this->Address1->CurrentValue;
		$this->Address1->PlaceHolder = RemoveHtml($this->Address1->caption());

		// Address2
		$this->Address2->EditAttrs["class"] = "form-control";
		$this->Address2->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Address2->CurrentValue = HtmlDecode($this->Address2->CurrentValue);
		$this->Address2->EditValue = $this->Address2->CurrentValue;
		$this->Address2->PlaceHolder = RemoveHtml($this->Address2->caption());

		// Address3
		$this->Address3->EditAttrs["class"] = "form-control";
		$this->Address3->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Address3->CurrentValue = HtmlDecode($this->Address3->CurrentValue);
		$this->Address3->EditValue = $this->Address3->CurrentValue;
		$this->Address3->PlaceHolder = RemoveHtml($this->Address3->caption());

		// State
		$this->State->EditAttrs["class"] = "form-control";
		$this->State->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->State->CurrentValue = HtmlDecode($this->State->CurrentValue);
		$this->State->EditValue = $this->State->CurrentValue;
		$this->State->PlaceHolder = RemoveHtml($this->State->caption());

		// Pincode
		$this->Pincode->EditAttrs["class"] = "form-control";
		$this->Pincode->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Pincode->CurrentValue = HtmlDecode($this->Pincode->CurrentValue);
		$this->Pincode->EditValue = $this->Pincode->CurrentValue;
		$this->Pincode->PlaceHolder = RemoveHtml($this->Pincode->caption());

		// Phone
		$this->Phone->EditAttrs["class"] = "form-control";
		$this->Phone->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Phone->CurrentValue = HtmlDecode($this->Phone->CurrentValue);
		$this->Phone->EditValue = $this->Phone->CurrentValue;
		$this->Phone->PlaceHolder = RemoveHtml($this->Phone->caption());

		// Fax
		$this->Fax->EditAttrs["class"] = "form-control";
		$this->Fax->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Fax->CurrentValue = HtmlDecode($this->Fax->CurrentValue);
		$this->Fax->EditValue = $this->Fax->CurrentValue;
		$this->Fax->PlaceHolder = RemoveHtml($this->Fax->caption());

		// Email
		$this->_Email->EditAttrs["class"] = "form-control";
		$this->_Email->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->_Email->CurrentValue = HtmlDecode($this->_Email->CurrentValue);
		$this->_Email->EditValue = $this->_Email->CurrentValue;
		$this->_Email->PlaceHolder = RemoveHtml($this->_Email->caption());

		// Ratetype
		$this->Ratetype->EditAttrs["class"] = "form-control";
		$this->Ratetype->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Ratetype->CurrentValue = HtmlDecode($this->Ratetype->CurrentValue);
		$this->Ratetype->EditValue = $this->Ratetype->CurrentValue;
		$this->Ratetype->PlaceHolder = RemoveHtml($this->Ratetype->caption());

		// Creationdate
		$this->Creationdate->EditAttrs["class"] = "form-control";
		$this->Creationdate->EditCustomAttributes = "";
		$this->Creationdate->EditValue = FormatDateTime($this->Creationdate->CurrentValue, 8);
		$this->Creationdate->PlaceHolder = RemoveHtml($this->Creationdate->caption());

		// ContactPerson
		$this->ContactPerson->EditAttrs["class"] = "form-control";
		$this->ContactPerson->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ContactPerson->CurrentValue = HtmlDecode($this->ContactPerson->CurrentValue);
		$this->ContactPerson->EditValue = $this->ContactPerson->CurrentValue;
		$this->ContactPerson->PlaceHolder = RemoveHtml($this->ContactPerson->caption());

		// CPPhone
		$this->CPPhone->EditAttrs["class"] = "form-control";
		$this->CPPhone->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->CPPhone->CurrentValue = HtmlDecode($this->CPPhone->CurrentValue);
		$this->CPPhone->EditValue = $this->CPPhone->CurrentValue;
		$this->CPPhone->PlaceHolder = RemoveHtml($this->CPPhone->caption());

		// id
		$this->id->EditAttrs["class"] = "form-control";
		$this->id->EditCustomAttributes = "";
		$this->id->EditValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

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
					$doc->exportCaption($this->Customercode);
					$doc->exportCaption($this->Customername);
					$doc->exportCaption($this->Address1);
					$doc->exportCaption($this->Address2);
					$doc->exportCaption($this->Address3);
					$doc->exportCaption($this->State);
					$doc->exportCaption($this->Pincode);
					$doc->exportCaption($this->Phone);
					$doc->exportCaption($this->Fax);
					$doc->exportCaption($this->_Email);
					$doc->exportCaption($this->Ratetype);
					$doc->exportCaption($this->Creationdate);
					$doc->exportCaption($this->ContactPerson);
					$doc->exportCaption($this->CPPhone);
					$doc->exportCaption($this->id);
				} else {
					$doc->exportCaption($this->Customercode);
					$doc->exportCaption($this->Address1);
					$doc->exportCaption($this->Address2);
					$doc->exportCaption($this->Address3);
					$doc->exportCaption($this->State);
					$doc->exportCaption($this->Pincode);
					$doc->exportCaption($this->Phone);
					$doc->exportCaption($this->Fax);
					$doc->exportCaption($this->_Email);
					$doc->exportCaption($this->Ratetype);
					$doc->exportCaption($this->Creationdate);
					$doc->exportCaption($this->ContactPerson);
					$doc->exportCaption($this->CPPhone);
					$doc->exportCaption($this->id);
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
						$doc->exportField($this->Customercode);
						$doc->exportField($this->Customername);
						$doc->exportField($this->Address1);
						$doc->exportField($this->Address2);
						$doc->exportField($this->Address3);
						$doc->exportField($this->State);
						$doc->exportField($this->Pincode);
						$doc->exportField($this->Phone);
						$doc->exportField($this->Fax);
						$doc->exportField($this->_Email);
						$doc->exportField($this->Ratetype);
						$doc->exportField($this->Creationdate);
						$doc->exportField($this->ContactPerson);
						$doc->exportField($this->CPPhone);
						$doc->exportField($this->id);
					} else {
						$doc->exportField($this->Customercode);
						$doc->exportField($this->Address1);
						$doc->exportField($this->Address2);
						$doc->exportField($this->Address3);
						$doc->exportField($this->State);
						$doc->exportField($this->Pincode);
						$doc->exportField($this->Phone);
						$doc->exportField($this->Fax);
						$doc->exportField($this->_Email);
						$doc->exportField($this->Ratetype);
						$doc->exportField($this->Creationdate);
						$doc->exportField($this->ContactPerson);
						$doc->exportField($this->CPPhone);
						$doc->exportField($this->id);
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