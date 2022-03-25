<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for view_issuing_semen
 */
class view_issuing_semen extends DbTable
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
	public $RIDNo;
	public $PatientName;
	public $HusbandName;
	public $RequestDr;
	public $CollectionDate;
	public $Tank;
	public $Location;
	public $IssuedBy;
	public $IssuedTo;
	public $RequestSample;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'view_issuing_semen';
		$this->TableName = 'view_issuing_semen';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`view_issuing_semen`";
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
		$this->id = new DbField('view_issuing_semen', 'view_issuing_semen', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// RIDNo
		$this->RIDNo = new DbField('view_issuing_semen', 'view_issuing_semen', 'x_RIDNo', 'RIDNo', '`RIDNo`', '`RIDNo`', 3, -1, FALSE, '`RIDNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RIDNo->Sortable = TRUE; // Allow sort
		$this->RIDNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['RIDNo'] = &$this->RIDNo;

		// PatientName
		$this->PatientName = new DbField('view_issuing_semen', 'view_issuing_semen', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, -1, FALSE, '`PatientName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->PatientName->Sortable = TRUE; // Allow sort
		$this->PatientName->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->PatientName->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->PatientName->Lookup = new Lookup('PatientName', 'patient', FALSE, 'id', ["first_name","","",""], [], [], [], [], [], [], '', '');
		$this->fields['PatientName'] = &$this->PatientName;

		// HusbandName
		$this->HusbandName = new DbField('view_issuing_semen', 'view_issuing_semen', 'x_HusbandName', 'HusbandName', '`HusbandName`', '`HusbandName`', 200, -1, FALSE, '`HusbandName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->HusbandName->Sortable = TRUE; // Allow sort
		$this->HusbandName->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->HusbandName->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->HusbandName->Lookup = new Lookup('HusbandName', 'patient', FALSE, 'id', ["first_name","","",""], [], [], [], [], [], [], '', '');
		$this->fields['HusbandName'] = &$this->HusbandName;

		// RequestDr
		$this->RequestDr = new DbField('view_issuing_semen', 'view_issuing_semen', 'x_RequestDr', 'RequestDr', '`RequestDr`', '`RequestDr`', 200, -1, FALSE, '`RequestDr`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RequestDr->Sortable = TRUE; // Allow sort
		$this->fields['RequestDr'] = &$this->RequestDr;

		// CollectionDate
		$this->CollectionDate = new DbField('view_issuing_semen', 'view_issuing_semen', 'x_CollectionDate', 'CollectionDate', '`CollectionDate`', CastDateFieldForLike('`CollectionDate`', 0, "DB"), 135, 0, FALSE, '`CollectionDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CollectionDate->Sortable = TRUE; // Allow sort
		$this->CollectionDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['CollectionDate'] = &$this->CollectionDate;

		// Tank
		$this->Tank = new DbField('view_issuing_semen', 'view_issuing_semen', 'x_Tank', 'Tank', '`Tank`', '`Tank`', 200, -1, FALSE, '`Tank`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Tank->Sortable = TRUE; // Allow sort
		$this->fields['Tank'] = &$this->Tank;

		// Location
		$this->Location = new DbField('view_issuing_semen', 'view_issuing_semen', 'x_Location', 'Location', '`Location`', '`Location`', 200, -1, FALSE, '`Location`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Location->Sortable = TRUE; // Allow sort
		$this->fields['Location'] = &$this->Location;

		// IssuedBy
		$this->IssuedBy = new DbField('view_issuing_semen', 'view_issuing_semen', 'x_IssuedBy', 'IssuedBy', '`IssuedBy`', '`IssuedBy`', 200, -1, FALSE, '`IssuedBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IssuedBy->Sortable = TRUE; // Allow sort
		$this->fields['IssuedBy'] = &$this->IssuedBy;

		// IssuedTo
		$this->IssuedTo = new DbField('view_issuing_semen', 'view_issuing_semen', 'x_IssuedTo', 'IssuedTo', '`IssuedTo`', '`IssuedTo`', 200, -1, FALSE, '`IssuedTo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->IssuedTo->Sortable = TRUE; // Allow sort
		$this->IssuedTo->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->IssuedTo->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->IssuedTo->Lookup = new Lookup('IssuedTo', 'view_issuing_semen', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->IssuedTo->OptionCount = 3;
		$this->fields['IssuedTo'] = &$this->IssuedTo;

		// RequestSample
		$this->RequestSample = new DbField('view_issuing_semen', 'view_issuing_semen', 'x_RequestSample', 'RequestSample', '`RequestSample`', '`RequestSample`', 200, -1, FALSE, '`RequestSample`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->RequestSample->Sortable = TRUE; // Allow sort
		$this->RequestSample->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->RequestSample->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->RequestSample->Lookup = new Lookup('RequestSample', 'view_issuing_semen', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->RequestSample->OptionCount = 5;
		$this->fields['RequestSample'] = &$this->RequestSample;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`view_issuing_semen`";
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
		$this->TableFilter = "`RequestSample`='Freezing'";
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
		$this->RIDNo->DbValue = $row['RIDNo'];
		$this->PatientName->DbValue = $row['PatientName'];
		$this->HusbandName->DbValue = $row['HusbandName'];
		$this->RequestDr->DbValue = $row['RequestDr'];
		$this->CollectionDate->DbValue = $row['CollectionDate'];
		$this->Tank->DbValue = $row['Tank'];
		$this->Location->DbValue = $row['Location'];
		$this->IssuedBy->DbValue = $row['IssuedBy'];
		$this->IssuedTo->DbValue = $row['IssuedTo'];
		$this->RequestSample->DbValue = $row['RequestSample'];
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
			return "view_issuing_semenlist.php";
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
		if ($pageName == "view_issuing_semenview.php")
			return $Language->phrase("View");
		elseif ($pageName == "view_issuing_semenedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "view_issuing_semenadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "view_issuing_semenlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("view_issuing_semenview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_issuing_semenview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "view_issuing_semenadd.php?" . $this->getUrlParm($parm);
		else
			$url = "view_issuing_semenadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("view_issuing_semenedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("view_issuing_semenadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("view_issuing_semendelete.php", $this->getUrlParm());
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
		$this->RIDNo->setDbValue($rs->fields('RIDNo'));
		$this->PatientName->setDbValue($rs->fields('PatientName'));
		$this->HusbandName->setDbValue($rs->fields('HusbandName'));
		$this->RequestDr->setDbValue($rs->fields('RequestDr'));
		$this->CollectionDate->setDbValue($rs->fields('CollectionDate'));
		$this->Tank->setDbValue($rs->fields('Tank'));
		$this->Location->setDbValue($rs->fields('Location'));
		$this->IssuedBy->setDbValue($rs->fields('IssuedBy'));
		$this->IssuedTo->setDbValue($rs->fields('IssuedTo'));
		$this->RequestSample->setDbValue($rs->fields('RequestSample'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// RIDNo
		// PatientName
		// HusbandName
		// RequestDr
		// CollectionDate
		// Tank
		// Location
		// IssuedBy
		// IssuedTo
		// RequestSample
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// RIDNo
		$this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
		$this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
		$this->RIDNo->ViewCustomAttributes = "";

		// PatientName
		$curVal = strval($this->PatientName->CurrentValue);
		if ($curVal <> "") {
			$this->PatientName->ViewValue = $this->PatientName->lookupCacheOption($curVal);
			if ($this->PatientName->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->PatientName->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->PatientName->ViewValue = $this->PatientName->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
				}
			}
		} else {
			$this->PatientName->ViewValue = NULL;
		}
		$this->PatientName->ViewCustomAttributes = "";

		// HusbandName
		$curVal = strval($this->HusbandName->CurrentValue);
		if ($curVal <> "") {
			$this->HusbandName->ViewValue = $this->HusbandName->lookupCacheOption($curVal);
			if ($this->HusbandName->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->HusbandName->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->HusbandName->ViewValue = $this->HusbandName->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->HusbandName->ViewValue = $this->HusbandName->CurrentValue;
				}
			}
		} else {
			$this->HusbandName->ViewValue = NULL;
		}
		$this->HusbandName->ViewCustomAttributes = "";

		// RequestDr
		$this->RequestDr->ViewValue = $this->RequestDr->CurrentValue;
		$this->RequestDr->ViewCustomAttributes = "";

		// CollectionDate
		$this->CollectionDate->ViewValue = $this->CollectionDate->CurrentValue;
		$this->CollectionDate->ViewValue = FormatDateTime($this->CollectionDate->ViewValue, 0);
		$this->CollectionDate->ViewCustomAttributes = "";

		// Tank
		$this->Tank->ViewValue = $this->Tank->CurrentValue;
		$this->Tank->ViewCustomAttributes = "";

		// Location
		$this->Location->ViewValue = $this->Location->CurrentValue;
		$this->Location->ViewCustomAttributes = "";

		// IssuedBy
		$this->IssuedBy->ViewValue = $this->IssuedBy->CurrentValue;
		$this->IssuedBy->ViewCustomAttributes = "";

		// IssuedTo
		if (strval($this->IssuedTo->CurrentValue) <> "") {
			$this->IssuedTo->ViewValue = $this->IssuedTo->optionCaption($this->IssuedTo->CurrentValue);
		} else {
			$this->IssuedTo->ViewValue = NULL;
		}
		$this->IssuedTo->ViewCustomAttributes = "";

		// RequestSample
		if (strval($this->RequestSample->CurrentValue) <> "") {
			$this->RequestSample->ViewValue = $this->RequestSample->optionCaption($this->RequestSample->CurrentValue);
		} else {
			$this->RequestSample->ViewValue = NULL;
		}
		$this->RequestSample->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// RIDNo
		$this->RIDNo->LinkCustomAttributes = "";
		$this->RIDNo->HrefValue = "";
		$this->RIDNo->TooltipValue = "";

		// PatientName
		$this->PatientName->LinkCustomAttributes = "";
		$this->PatientName->HrefValue = "";
		$this->PatientName->TooltipValue = "";

		// HusbandName
		$this->HusbandName->LinkCustomAttributes = "";
		$this->HusbandName->HrefValue = "";
		$this->HusbandName->TooltipValue = "";

		// RequestDr
		$this->RequestDr->LinkCustomAttributes = "";
		$this->RequestDr->HrefValue = "";
		$this->RequestDr->TooltipValue = "";

		// CollectionDate
		$this->CollectionDate->LinkCustomAttributes = "";
		$this->CollectionDate->HrefValue = "";
		$this->CollectionDate->TooltipValue = "";

		// Tank
		$this->Tank->LinkCustomAttributes = "";
		$this->Tank->HrefValue = "";
		$this->Tank->TooltipValue = "";

		// Location
		$this->Location->LinkCustomAttributes = "";
		$this->Location->HrefValue = "";
		$this->Location->TooltipValue = "";

		// IssuedBy
		$this->IssuedBy->LinkCustomAttributes = "";
		$this->IssuedBy->HrefValue = "";
		$this->IssuedBy->TooltipValue = "";

		// IssuedTo
		$this->IssuedTo->LinkCustomAttributes = "";
		$this->IssuedTo->HrefValue = "";
		$this->IssuedTo->TooltipValue = "";

		// RequestSample
		$this->RequestSample->LinkCustomAttributes = "";
		$this->RequestSample->HrefValue = "";
		$this->RequestSample->TooltipValue = "";

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

		// RIDNo
		$this->RIDNo->EditAttrs["class"] = "form-control";
		$this->RIDNo->EditCustomAttributes = "";
		$this->RIDNo->EditValue = $this->RIDNo->CurrentValue;
		$this->RIDNo->EditValue = FormatNumber($this->RIDNo->EditValue, 0, -2, -2, -2);
		$this->RIDNo->ViewCustomAttributes = "";

		// PatientName
		$this->PatientName->EditAttrs["class"] = "form-control";
		$this->PatientName->EditCustomAttributes = "";
		$curVal = strval($this->PatientName->CurrentValue);
		if ($curVal <> "") {
			$this->PatientName->EditValue = $this->PatientName->lookupCacheOption($curVal);
			if ($this->PatientName->EditValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->PatientName->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->PatientName->EditValue = $this->PatientName->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->PatientName->EditValue = $this->PatientName->CurrentValue;
				}
			}
		} else {
			$this->PatientName->EditValue = NULL;
		}
		$this->PatientName->ViewCustomAttributes = "";

		// HusbandName
		$this->HusbandName->EditAttrs["class"] = "form-control";
		$this->HusbandName->EditCustomAttributes = "";
		$curVal = strval($this->HusbandName->CurrentValue);
		if ($curVal <> "") {
			$this->HusbandName->EditValue = $this->HusbandName->lookupCacheOption($curVal);
			if ($this->HusbandName->EditValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->HusbandName->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->HusbandName->EditValue = $this->HusbandName->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->HusbandName->EditValue = $this->HusbandName->CurrentValue;
				}
			}
		} else {
			$this->HusbandName->EditValue = NULL;
		}
		$this->HusbandName->ViewCustomAttributes = "";

		// RequestDr
		$this->RequestDr->EditAttrs["class"] = "form-control";
		$this->RequestDr->EditCustomAttributes = "";
		$this->RequestDr->EditValue = $this->RequestDr->CurrentValue;
		$this->RequestDr->ViewCustomAttributes = "";

		// CollectionDate
		$this->CollectionDate->EditAttrs["class"] = "form-control";
		$this->CollectionDate->EditCustomAttributes = "";
		$this->CollectionDate->EditValue = $this->CollectionDate->CurrentValue;
		$this->CollectionDate->EditValue = FormatDateTime($this->CollectionDate->EditValue, 0);
		$this->CollectionDate->ViewCustomAttributes = "";

		// Tank
		$this->Tank->EditAttrs["class"] = "form-control";
		$this->Tank->EditCustomAttributes = "";
		$this->Tank->EditValue = $this->Tank->CurrentValue;
		$this->Tank->ViewCustomAttributes = "";

		// Location
		$this->Location->EditAttrs["class"] = "form-control";
		$this->Location->EditCustomAttributes = "";
		$this->Location->EditValue = $this->Location->CurrentValue;
		$this->Location->ViewCustomAttributes = "";

		// IssuedBy
		$this->IssuedBy->EditAttrs["class"] = "form-control";
		$this->IssuedBy->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->IssuedBy->CurrentValue = HtmlDecode($this->IssuedBy->CurrentValue);
		$this->IssuedBy->EditValue = $this->IssuedBy->CurrentValue;
		$this->IssuedBy->PlaceHolder = RemoveHtml($this->IssuedBy->caption());

		// IssuedTo
		$this->IssuedTo->EditAttrs["class"] = "form-control";
		$this->IssuedTo->EditCustomAttributes = "";
		$this->IssuedTo->EditValue = $this->IssuedTo->options(TRUE);

		// RequestSample
		$this->RequestSample->EditAttrs["class"] = "form-control";
		$this->RequestSample->EditCustomAttributes = "";
		if (strval($this->RequestSample->CurrentValue) <> "") {
			$this->RequestSample->EditValue = $this->RequestSample->optionCaption($this->RequestSample->CurrentValue);
		} else {
			$this->RequestSample->EditValue = NULL;
		}
		$this->RequestSample->ViewCustomAttributes = "";

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
					$doc->exportCaption($this->RIDNo);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->HusbandName);
					$doc->exportCaption($this->RequestDr);
					$doc->exportCaption($this->CollectionDate);
					$doc->exportCaption($this->Tank);
					$doc->exportCaption($this->Location);
					$doc->exportCaption($this->IssuedBy);
					$doc->exportCaption($this->IssuedTo);
					$doc->exportCaption($this->RequestSample);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->RIDNo);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->HusbandName);
					$doc->exportCaption($this->RequestDr);
					$doc->exportCaption($this->CollectionDate);
					$doc->exportCaption($this->Tank);
					$doc->exportCaption($this->Location);
					$doc->exportCaption($this->IssuedBy);
					$doc->exportCaption($this->IssuedTo);
					$doc->exportCaption($this->RequestSample);
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
						$doc->exportField($this->RIDNo);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->HusbandName);
						$doc->exportField($this->RequestDr);
						$doc->exportField($this->CollectionDate);
						$doc->exportField($this->Tank);
						$doc->exportField($this->Location);
						$doc->exportField($this->IssuedBy);
						$doc->exportField($this->IssuedTo);
						$doc->exportField($this->RequestSample);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->RIDNo);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->HusbandName);
						$doc->exportField($this->RequestDr);
						$doc->exportField($this->CollectionDate);
						$doc->exportField($this->Tank);
						$doc->exportField($this->Location);
						$doc->exportField($this->IssuedBy);
						$doc->exportField($this->IssuedTo);
						$doc->exportField($this->RequestSample);
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

		$var = new DateTime();
		$var_subtracted_date = date(‘Y-m-d’, strtotime(‘-180 days’, strtotime($var)));
		$date_now = new DateTime($var_subtracted_date);
		$date2    = new DateTime($this->CollectionDate->ViewValue);
		if ($date_now > $date2) {
			$this->RowAttrs["style"] = "color: white; background-color: #07BEBA";
		}
	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>