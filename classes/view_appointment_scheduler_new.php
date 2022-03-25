<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for view_appointment_scheduler_new
 */
class view_appointment_scheduler_new extends DbTable
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
	public $patientID;
	public $patientName;
	public $MobileNumber;
	public $start_time;
	public $Purpose;
	public $patienttype;
	public $Referal;
	public $start_date;
	public $DoctorName;
	public $HospID;
	public $Id;
	public $PatientTypee;
	public $Notes;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'view_appointment_scheduler_new';
		$this->TableName = 'view_appointment_scheduler_new';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`view_appointment_scheduler_new`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = TRUE; // Allow detail add
		$this->DetailEdit = TRUE; // Allow detail edit
		$this->DetailView = TRUE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = 0; // User ID Allow
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// patientID
		$this->patientID = new DbField('view_appointment_scheduler_new', 'view_appointment_scheduler_new', 'x_patientID', 'patientID', '`patientID`', '`patientID`', 200, -1, FALSE, '`patientID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->patientID->Sortable = TRUE; // Allow sort
		$this->fields['patientID'] = &$this->patientID;

		// patientName
		$this->patientName = new DbField('view_appointment_scheduler_new', 'view_appointment_scheduler_new', 'x_patientName', 'patientName', '`patientName`', '`patientName`', 200, -1, FALSE, '`patientName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->patientName->Sortable = TRUE; // Allow sort
		$this->fields['patientName'] = &$this->patientName;

		// MobileNumber
		$this->MobileNumber = new DbField('view_appointment_scheduler_new', 'view_appointment_scheduler_new', 'x_MobileNumber', 'MobileNumber', '`MobileNumber`', '`MobileNumber`', 200, -1, FALSE, '`MobileNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MobileNumber->Sortable = TRUE; // Allow sort
		$this->fields['MobileNumber'] = &$this->MobileNumber;

		// start_time
		$this->start_time = new DbField('view_appointment_scheduler_new', 'view_appointment_scheduler_new', 'x_start_time', 'start_time', '`start_time`', CastDateFieldForLike('`start_time`', 3, "DB"), 135, 3, FALSE, '`start_time`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->start_time->Sortable = TRUE; // Allow sort
		$this->start_time->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['start_time'] = &$this->start_time;

		// Purpose
		$this->Purpose = new DbField('view_appointment_scheduler_new', 'view_appointment_scheduler_new', 'x_Purpose', 'Purpose', '`Purpose`', '`Purpose`', 200, -1, FALSE, '`Purpose`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Purpose->Sortable = TRUE; // Allow sort
		$this->fields['Purpose'] = &$this->Purpose;

		// patienttype
		$this->patienttype = new DbField('view_appointment_scheduler_new', 'view_appointment_scheduler_new', 'x_patienttype', 'patienttype', '`patienttype`', '`patienttype`', 200, -1, FALSE, '`patienttype`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->patienttype->Sortable = TRUE; // Allow sort
		$this->fields['patienttype'] = &$this->patienttype;

		// Referal
		$this->Referal = new DbField('view_appointment_scheduler_new', 'view_appointment_scheduler_new', 'x_Referal', 'Referal', '`Referal`', '`Referal`', 200, -1, FALSE, '`Referal`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Referal->Sortable = TRUE; // Allow sort
		$this->Referal->Lookup = new Lookup('Referal', 'mas_reference_type', FALSE, 'id', ["reference","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Referal'] = &$this->Referal;

		// start_date
		$this->start_date = new DbField('view_appointment_scheduler_new', 'view_appointment_scheduler_new', 'x_start_date', 'start_date', '`start_date`', CastDateFieldForLike('`start_date`', 11, "DB"), 135, 11, FALSE, '`start_date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->start_date->Sortable = TRUE; // Allow sort
		$this->start_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['start_date'] = &$this->start_date;

		// DoctorName
		$this->DoctorName = new DbField('view_appointment_scheduler_new', 'view_appointment_scheduler_new', 'x_DoctorName', 'DoctorName', '`DoctorName`', '`DoctorName`', 200, -1, FALSE, '`DoctorName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->DoctorName->Sortable = TRUE; // Allow sort
		$this->DoctorName->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->DoctorName->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->DoctorName->Lookup = new Lookup('DoctorName', 'doctors', FALSE, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
		$this->fields['DoctorName'] = &$this->DoctorName;

		// HospID
		$this->HospID = new DbField('view_appointment_scheduler_new', 'view_appointment_scheduler_new', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HospID'] = &$this->HospID;

		// Id
		$this->Id = new DbField('view_appointment_scheduler_new', 'view_appointment_scheduler_new', 'x_Id', 'Id', '`Id`', '`Id`', 3, -1, FALSE, '`Id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->Id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->Id->IsPrimaryKey = TRUE; // Primary key field
		$this->Id->Sortable = TRUE; // Allow sort
		$this->Id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Id'] = &$this->Id;

		// PatientTypee
		$this->PatientTypee = new DbField('view_appointment_scheduler_new', 'view_appointment_scheduler_new', 'x_PatientTypee', 'PatientTypee', '`PatientTypee`', '`PatientTypee`', 200, -1, FALSE, '`PatientTypee`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientTypee->Sortable = TRUE; // Allow sort
		$this->fields['PatientTypee'] = &$this->PatientTypee;

		// Notes
		$this->Notes = new DbField('view_appointment_scheduler_new', 'view_appointment_scheduler_new', 'x_Notes', 'Notes', '`Notes`', '`Notes`', 200, -1, FALSE, '`Notes`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Notes->Sortable = TRUE; // Allow sort
		$this->fields['Notes'] = &$this->Notes;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`view_appointment_scheduler_new`";
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
		$this->TableFilter = "`HospID`='".HospitalID()."'";
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
		return ($this->SqlOrderBy <> "") ? $this->SqlOrderBy : "`Id` DESC";
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
			$this->Id->setDbValue($conn->insert_ID());
			$rs['Id'] = $this->Id->DbValue;
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
			if (array_key_exists('Id', $rs))
				AddFilter($where, QuotedName('Id', $this->Dbid) . '=' . QuotedValue($rs['Id'], $this->Id->DataType, $this->Dbid));
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
		$this->patientID->DbValue = $row['patientID'];
		$this->patientName->DbValue = $row['patientName'];
		$this->MobileNumber->DbValue = $row['MobileNumber'];
		$this->start_time->DbValue = $row['start_time'];
		$this->Purpose->DbValue = $row['Purpose'];
		$this->patienttype->DbValue = $row['patienttype'];
		$this->Referal->DbValue = $row['Referal'];
		$this->start_date->DbValue = $row['start_date'];
		$this->DoctorName->DbValue = $row['DoctorName'];
		$this->HospID->DbValue = $row['HospID'];
		$this->Id->DbValue = $row['Id'];
		$this->PatientTypee->DbValue = $row['PatientTypee'];
		$this->Notes->DbValue = $row['Notes'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`Id` = @Id@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('Id', $row) ? $row['Id'] : NULL) : $this->Id->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@Id@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "view_appointment_scheduler_newlist.php";
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
		if ($pageName == "view_appointment_scheduler_newview.php")
			return $Language->phrase("View");
		elseif ($pageName == "view_appointment_scheduler_newedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "view_appointment_scheduler_newadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "view_appointment_scheduler_newlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("view_appointment_scheduler_newview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_appointment_scheduler_newview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "view_appointment_scheduler_newadd.php?" . $this->getUrlParm($parm);
		else
			$url = "view_appointment_scheduler_newadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("view_appointment_scheduler_newedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("view_appointment_scheduler_newadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("view_appointment_scheduler_newdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "Id:" . JsonEncode($this->Id->CurrentValue, "number");
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
		if ($this->Id->CurrentValue != NULL) {
			$url .= "Id=" . urlencode($this->Id->CurrentValue);
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
			if (Param("Id") !== NULL)
				$arKeys[] = Param("Id");
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
			$this->Id->CurrentValue = $key;
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
		$this->patientID->setDbValue($rs->fields('patientID'));
		$this->patientName->setDbValue($rs->fields('patientName'));
		$this->MobileNumber->setDbValue($rs->fields('MobileNumber'));
		$this->start_time->setDbValue($rs->fields('start_time'));
		$this->Purpose->setDbValue($rs->fields('Purpose'));
		$this->patienttype->setDbValue($rs->fields('patienttype'));
		$this->Referal->setDbValue($rs->fields('Referal'));
		$this->start_date->setDbValue($rs->fields('start_date'));
		$this->DoctorName->setDbValue($rs->fields('DoctorName'));
		$this->HospID->setDbValue($rs->fields('HospID'));
		$this->Id->setDbValue($rs->fields('Id'));
		$this->PatientTypee->setDbValue($rs->fields('PatientTypee'));
		$this->Notes->setDbValue($rs->fields('Notes'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// patientID
		// patientName
		// MobileNumber
		// start_time
		// Purpose
		// patienttype
		// Referal
		// start_date
		// DoctorName
		// HospID
		// Id
		// PatientTypee
		// Notes
		// patientID

		$this->patientID->ViewValue = $this->patientID->CurrentValue;
		$this->patientID->ViewCustomAttributes = "";

		// patientName
		$this->patientName->ViewValue = $this->patientName->CurrentValue;
		$this->patientName->ViewCustomAttributes = "";

		// MobileNumber
		$this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
		$this->MobileNumber->ViewCustomAttributes = "";

		// start_time
		$this->start_time->ViewValue = $this->start_time->CurrentValue;
		$this->start_time->ViewValue = FormatDateTime($this->start_time->ViewValue, 3);
		$this->start_time->ViewCustomAttributes = "";

		// Purpose
		$this->Purpose->ViewValue = $this->Purpose->CurrentValue;
		$this->Purpose->ViewCustomAttributes = "";

		// patienttype
		$this->patienttype->ViewValue = $this->patienttype->CurrentValue;
		$this->patienttype->ViewCustomAttributes = "";

		// Referal
		$this->Referal->ViewValue = $this->Referal->CurrentValue;
		$curVal = strval($this->Referal->CurrentValue);
		if ($curVal <> "") {
			$this->Referal->ViewValue = $this->Referal->lookupCacheOption($curVal);
			if ($this->Referal->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->Referal->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->Referal->ViewValue = $this->Referal->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Referal->ViewValue = $this->Referal->CurrentValue;
				}
			}
		} else {
			$this->Referal->ViewValue = NULL;
		}
		$this->Referal->ViewCustomAttributes = "";

		// start_date
		$this->start_date->ViewValue = $this->start_date->CurrentValue;
		$this->start_date->ViewValue = FormatDateTime($this->start_date->ViewValue, 11);
		$this->start_date->ViewCustomAttributes = "";

		// DoctorName
		$curVal = strval($this->DoctorName->CurrentValue);
		if ($curVal <> "") {
			$this->DoctorName->ViewValue = $this->DoctorName->lookupCacheOption($curVal);
			if ($this->DoctorName->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->DoctorName->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->DoctorName->ViewValue = $this->DoctorName->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->DoctorName->ViewValue = $this->DoctorName->CurrentValue;
				}
			}
		} else {
			$this->DoctorName->ViewValue = NULL;
		}
		$this->DoctorName->ViewCustomAttributes = "";

		// HospID
		$this->HospID->ViewValue = $this->HospID->CurrentValue;
		$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
		$this->HospID->ViewCustomAttributes = "";

		// Id
		$this->Id->ViewValue = $this->Id->CurrentValue;
		$this->Id->ViewCustomAttributes = "";

		// PatientTypee
		$this->PatientTypee->ViewValue = $this->PatientTypee->CurrentValue;
		$this->PatientTypee->ViewCustomAttributes = "";

		// Notes
		$this->Notes->ViewValue = $this->Notes->CurrentValue;
		$this->Notes->ViewCustomAttributes = "";

		// patientID
		$this->patientID->LinkCustomAttributes = "";
		$this->patientID->HrefValue = "";
		$this->patientID->TooltipValue = "";

		// patientName
		$this->patientName->LinkCustomAttributes = "";
		$this->patientName->HrefValue = "";
		$this->patientName->TooltipValue = "";

		// MobileNumber
		$this->MobileNumber->LinkCustomAttributes = "";
		$this->MobileNumber->HrefValue = "";
		$this->MobileNumber->TooltipValue = "";

		// start_time
		$this->start_time->LinkCustomAttributes = "";
		$this->start_time->HrefValue = "";
		$this->start_time->TooltipValue = "";

		// Purpose
		$this->Purpose->LinkCustomAttributes = "";
		$this->Purpose->HrefValue = "";
		$this->Purpose->TooltipValue = "";

		// patienttype
		$this->patienttype->LinkCustomAttributes = "";
		$this->patienttype->HrefValue = "";
		$this->patienttype->TooltipValue = "";

		// Referal
		$this->Referal->LinkCustomAttributes = "";
		$this->Referal->HrefValue = "";
		$this->Referal->TooltipValue = "";

		// start_date
		$this->start_date->LinkCustomAttributes = "";
		$this->start_date->HrefValue = "";
		$this->start_date->TooltipValue = "";

		// DoctorName
		$this->DoctorName->LinkCustomAttributes = "";
		$this->DoctorName->HrefValue = "";
		$this->DoctorName->TooltipValue = "";

		// HospID
		$this->HospID->LinkCustomAttributes = "";
		$this->HospID->HrefValue = "";
		$this->HospID->TooltipValue = "";

		// Id
		$this->Id->LinkCustomAttributes = "";
		$this->Id->HrefValue = "";
		$this->Id->TooltipValue = "";

		// PatientTypee
		$this->PatientTypee->LinkCustomAttributes = "";
		$this->PatientTypee->HrefValue = "";
		$this->PatientTypee->TooltipValue = "";

		// Notes
		$this->Notes->LinkCustomAttributes = "";
		$this->Notes->HrefValue = "";
		$this->Notes->TooltipValue = "";

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

		// patientID
		$this->patientID->EditAttrs["class"] = "form-control";
		$this->patientID->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->patientID->CurrentValue = HtmlDecode($this->patientID->CurrentValue);
		$this->patientID->EditValue = $this->patientID->CurrentValue;
		$this->patientID->PlaceHolder = RemoveHtml($this->patientID->caption());

		// patientName
		$this->patientName->EditAttrs["class"] = "form-control";
		$this->patientName->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->patientName->CurrentValue = HtmlDecode($this->patientName->CurrentValue);
		$this->patientName->EditValue = $this->patientName->CurrentValue;
		$this->patientName->PlaceHolder = RemoveHtml($this->patientName->caption());

		// MobileNumber
		$this->MobileNumber->EditAttrs["class"] = "form-control";
		$this->MobileNumber->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
		$this->MobileNumber->EditValue = $this->MobileNumber->CurrentValue;
		$this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

		// start_time
		$this->start_time->EditAttrs["class"] = "form-control";
		$this->start_time->EditCustomAttributes = "";
		$this->start_time->EditValue = FormatDateTime($this->start_time->CurrentValue, 3);
		$this->start_time->PlaceHolder = RemoveHtml($this->start_time->caption());

		// Purpose
		$this->Purpose->EditAttrs["class"] = "form-control";
		$this->Purpose->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Purpose->CurrentValue = HtmlDecode($this->Purpose->CurrentValue);
		$this->Purpose->EditValue = $this->Purpose->CurrentValue;
		$this->Purpose->PlaceHolder = RemoveHtml($this->Purpose->caption());

		// patienttype
		$this->patienttype->EditAttrs["class"] = "form-control";
		$this->patienttype->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->patienttype->CurrentValue = HtmlDecode($this->patienttype->CurrentValue);
		$this->patienttype->EditValue = $this->patienttype->CurrentValue;
		$this->patienttype->PlaceHolder = RemoveHtml($this->patienttype->caption());

		// Referal
		$this->Referal->EditAttrs["class"] = "form-control";
		$this->Referal->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Referal->CurrentValue = HtmlDecode($this->Referal->CurrentValue);
		$this->Referal->EditValue = $this->Referal->CurrentValue;
		$this->Referal->PlaceHolder = RemoveHtml($this->Referal->caption());

		// start_date
		$this->start_date->EditAttrs["class"] = "form-control";
		$this->start_date->EditCustomAttributes = "";
		$this->start_date->EditValue = FormatDateTime($this->start_date->CurrentValue, 11);
		$this->start_date->PlaceHolder = RemoveHtml($this->start_date->caption());

		// DoctorName
		$this->DoctorName->EditAttrs["class"] = "form-control";
		$this->DoctorName->EditCustomAttributes = "";

		// HospID
		$this->HospID->EditAttrs["class"] = "form-control";
		$this->HospID->EditCustomAttributes = "";
		$this->HospID->EditValue = $this->HospID->CurrentValue;
		$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

		// Id
		$this->Id->EditAttrs["class"] = "form-control";
		$this->Id->EditCustomAttributes = "";
		$this->Id->EditValue = $this->Id->CurrentValue;
		$this->Id->ViewCustomAttributes = "";

		// PatientTypee
		$this->PatientTypee->EditAttrs["class"] = "form-control";
		$this->PatientTypee->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PatientTypee->CurrentValue = HtmlDecode($this->PatientTypee->CurrentValue);
		$this->PatientTypee->EditValue = $this->PatientTypee->CurrentValue;
		$this->PatientTypee->PlaceHolder = RemoveHtml($this->PatientTypee->caption());

		// Notes
		$this->Notes->EditAttrs["class"] = "form-control";
		$this->Notes->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Notes->CurrentValue = HtmlDecode($this->Notes->CurrentValue);
		$this->Notes->EditValue = $this->Notes->CurrentValue;
		$this->Notes->PlaceHolder = RemoveHtml($this->Notes->caption());

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
					$doc->exportCaption($this->patientID);
					$doc->exportCaption($this->patientName);
					$doc->exportCaption($this->MobileNumber);
					$doc->exportCaption($this->start_time);
					$doc->exportCaption($this->Purpose);
					$doc->exportCaption($this->patienttype);
					$doc->exportCaption($this->Referal);
					$doc->exportCaption($this->start_date);
					$doc->exportCaption($this->DoctorName);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->Id);
					$doc->exportCaption($this->PatientTypee);
					$doc->exportCaption($this->Notes);
				} else {
					$doc->exportCaption($this->patientID);
					$doc->exportCaption($this->patientName);
					$doc->exportCaption($this->MobileNumber);
					$doc->exportCaption($this->start_time);
					$doc->exportCaption($this->Purpose);
					$doc->exportCaption($this->patienttype);
					$doc->exportCaption($this->Referal);
					$doc->exportCaption($this->start_date);
					$doc->exportCaption($this->DoctorName);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->Id);
					$doc->exportCaption($this->PatientTypee);
					$doc->exportCaption($this->Notes);
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
						$doc->exportField($this->patientID);
						$doc->exportField($this->patientName);
						$doc->exportField($this->MobileNumber);
						$doc->exportField($this->start_time);
						$doc->exportField($this->Purpose);
						$doc->exportField($this->patienttype);
						$doc->exportField($this->Referal);
						$doc->exportField($this->start_date);
						$doc->exportField($this->DoctorName);
						$doc->exportField($this->HospID);
						$doc->exportField($this->Id);
						$doc->exportField($this->PatientTypee);
						$doc->exportField($this->Notes);
					} else {
						$doc->exportField($this->patientID);
						$doc->exportField($this->patientName);
						$doc->exportField($this->MobileNumber);
						$doc->exportField($this->start_time);
						$doc->exportField($this->Purpose);
						$doc->exportField($this->patienttype);
						$doc->exportField($this->Referal);
						$doc->exportField($this->start_date);
						$doc->exportField($this->DoctorName);
						$doc->exportField($this->HospID);
						$doc->exportField($this->Id);
						$doc->exportField($this->PatientTypee);
						$doc->exportField($this->Notes);
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