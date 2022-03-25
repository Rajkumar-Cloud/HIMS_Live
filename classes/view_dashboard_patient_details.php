<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for view_dashboard_patient_details
 */
class view_dashboard_patient_details extends DbTable
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
	public $PatientID;
	public $first_name;
	public $mobile_no;
	public $ReferA4TreatingConsultant;
	public $Patient_Language;
	public $WhereDidYouHear;
	public $HospID;
	public $createdDate;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'view_dashboard_patient_details';
		$this->TableName = 'view_dashboard_patient_details';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`view_dashboard_patient_details`";
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

		// PatientID
		$this->PatientID = new DbField('view_dashboard_patient_details', 'view_dashboard_patient_details', 'x_PatientID', 'PatientID', '`PatientID`', '`PatientID`', 200, -1, FALSE, '`PatientID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientID->IsPrimaryKey = TRUE; // Primary key field
		$this->PatientID->Nullable = FALSE; // NOT NULL field
		$this->PatientID->Required = TRUE; // Required field
		$this->PatientID->Sortable = TRUE; // Allow sort
		$this->fields['PatientID'] = &$this->PatientID;

		// first_name
		$this->first_name = new DbField('view_dashboard_patient_details', 'view_dashboard_patient_details', 'x_first_name', 'first_name', '`first_name`', '`first_name`', 200, -1, FALSE, '`first_name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->first_name->Sortable = TRUE; // Allow sort
		$this->fields['first_name'] = &$this->first_name;

		// mobile_no
		$this->mobile_no = new DbField('view_dashboard_patient_details', 'view_dashboard_patient_details', 'x_mobile_no', 'mobile_no', '`mobile_no`', '`mobile_no`', 200, -1, FALSE, '`mobile_no`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mobile_no->Sortable = TRUE; // Allow sort
		$this->fields['mobile_no'] = &$this->mobile_no;

		// ReferA4TreatingConsultant
		$this->ReferA4TreatingConsultant = new DbField('view_dashboard_patient_details', 'view_dashboard_patient_details', 'x_ReferA4TreatingConsultant', 'ReferA4TreatingConsultant', '`ReferA4TreatingConsultant`', '`ReferA4TreatingConsultant`', 200, -1, FALSE, '`ReferA4TreatingConsultant`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReferA4TreatingConsultant->Sortable = TRUE; // Allow sort
		$this->fields['ReferA4TreatingConsultant'] = &$this->ReferA4TreatingConsultant;

		// Patient_Language
		$this->Patient_Language = new DbField('view_dashboard_patient_details', 'view_dashboard_patient_details', 'x_Patient_Language', 'Patient_Language', '`Patient_Language`', '`Patient_Language`', 200, -1, FALSE, '`Patient_Language`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Patient_Language->Sortable = TRUE; // Allow sort
		$this->fields['Patient_Language'] = &$this->Patient_Language;

		// WhereDidYouHear
		$this->WhereDidYouHear = new DbField('view_dashboard_patient_details', 'view_dashboard_patient_details', 'x_WhereDidYouHear', 'WhereDidYouHear', '`WhereDidYouHear`', '`WhereDidYouHear`', 200, -1, FALSE, '`WhereDidYouHear`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->WhereDidYouHear->IsForeignKey = TRUE; // Foreign key field
		$this->WhereDidYouHear->Sortable = TRUE; // Allow sort
		$this->fields['WhereDidYouHear'] = &$this->WhereDidYouHear;

		// HospID
		$this->HospID = new DbField('view_dashboard_patient_details', 'view_dashboard_patient_details', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 200, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->Lookup = new Lookup('HospID', 'hospital', FALSE, 'id', ["hospital","","",""], [], [], [], [], [], [], '', '');
		$this->fields['HospID'] = &$this->HospID;

		// createdDate
		$this->createdDate = new DbField('view_dashboard_patient_details', 'view_dashboard_patient_details', 'x_createdDate', 'createdDate', '`createdDate`', CastDateFieldForLike('`createdDate`', 7, "DB"), 133, 7, FALSE, '`createdDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdDate->IsForeignKey = TRUE; // Foreign key field
		$this->createdDate->Sortable = TRUE; // Allow sort
		$this->createdDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['createdDate'] = &$this->createdDate;
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
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_MASTER_TABLE];
	}
	public function setCurrentMasterTable($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_MASTER_TABLE] = $v;
	}

	// Session master WHERE clause
	public function getMasterFilter()
	{

		// Master filter
		$masterFilter = "";
		if ($this->getCurrentMasterTable() == "view_dashboard_patient_summary") {
			if ($this->createdDate->getSessionValue() <> "")
				$masterFilter .= "`createdDate`=" . QuotedValue($this->createdDate->getSessionValue(), DATATYPE_DATE, "DB");
			else
				return "";
			if ($this->WhereDidYouHear->getSessionValue() <> "")
				$masterFilter .= " AND `WhereDidYouHear`=" . QuotedValue($this->WhereDidYouHear->getSessionValue(), DATATYPE_STRING, "DB");
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
		if ($this->getCurrentMasterTable() == "view_dashboard_patient_summary") {
			if ($this->createdDate->getSessionValue() <> "")
				$detailFilter .= "`createdDate`=" . QuotedValue($this->createdDate->getSessionValue(), DATATYPE_DATE, "DB");
			else
				return "";
			if ($this->WhereDidYouHear->getSessionValue() <> "")
				$detailFilter .= " AND `WhereDidYouHear`=" . QuotedValue($this->WhereDidYouHear->getSessionValue(), DATATYPE_STRING, "DB");
			else
				return "";
		}
		return $detailFilter;
	}

	// Master filter
	public function sqlMasterFilter_view_dashboard_patient_summary()
	{
		return "`createdDate`='@createdDate@' AND `WhereDidYouHear`='@WhereDidYouHear@'";
	}

	// Detail filter
	public function sqlDetailFilter_view_dashboard_patient_summary()
	{
		return "`createdDate`='@createdDate@' AND `WhereDidYouHear`='@WhereDidYouHear@'";
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`view_dashboard_patient_details`";
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
		return ($this->SqlOrderBy <> "") ? $this->SqlOrderBy : "`createdDate` DESC";
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
			if (array_key_exists('PatientID', $rs))
				AddFilter($where, QuotedName('PatientID', $this->Dbid) . '=' . QuotedValue($rs['PatientID'], $this->PatientID->DataType, $this->Dbid));
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
		$this->PatientID->DbValue = $row['PatientID'];
		$this->first_name->DbValue = $row['first_name'];
		$this->mobile_no->DbValue = $row['mobile_no'];
		$this->ReferA4TreatingConsultant->DbValue = $row['ReferA4TreatingConsultant'];
		$this->Patient_Language->DbValue = $row['Patient_Language'];
		$this->WhereDidYouHear->DbValue = $row['WhereDidYouHear'];
		$this->HospID->DbValue = $row['HospID'];
		$this->createdDate->DbValue = $row['createdDate'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`PatientID` = '@PatientID@'";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('PatientID', $row) ? $row['PatientID'] : NULL) : $this->PatientID->CurrentValue;
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@PatientID@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "view_dashboard_patient_detailslist.php";
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
		if ($pageName == "view_dashboard_patient_detailsview.php")
			return $Language->phrase("View");
		elseif ($pageName == "view_dashboard_patient_detailsedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "view_dashboard_patient_detailsadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "view_dashboard_patient_detailslist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("view_dashboard_patient_detailsview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_dashboard_patient_detailsview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "view_dashboard_patient_detailsadd.php?" . $this->getUrlParm($parm);
		else
			$url = "view_dashboard_patient_detailsadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("view_dashboard_patient_detailsedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("view_dashboard_patient_detailsadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("view_dashboard_patient_detailsdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		if ($this->getCurrentMasterTable() == "view_dashboard_patient_summary" && !ContainsString($url, TABLE_SHOW_MASTER . "=")) {
			$url .= (ContainsString($url, "?") ? "&" : "?") . TABLE_SHOW_MASTER . "=" . $this->getCurrentMasterTable();
			$url .= "&fk_createdDate=" . urlencode(UnFormatDateTime($this->createdDate->CurrentValue,7));
			$url .= "&fk_WhereDidYouHear=" . urlencode($this->WhereDidYouHear->CurrentValue);
		}
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "PatientID:" . JsonEncode($this->PatientID->CurrentValue, "string");
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
		if ($this->PatientID->CurrentValue != NULL) {
			$url .= "PatientID=" . urlencode($this->PatientID->CurrentValue);
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
			if (Param("PatientID") !== NULL)
				$arKeys[] = Param("PatientID");
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
			$this->PatientID->CurrentValue = $key;
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
		$this->PatientID->setDbValue($rs->fields('PatientID'));
		$this->first_name->setDbValue($rs->fields('first_name'));
		$this->mobile_no->setDbValue($rs->fields('mobile_no'));
		$this->ReferA4TreatingConsultant->setDbValue($rs->fields('ReferA4TreatingConsultant'));
		$this->Patient_Language->setDbValue($rs->fields('Patient_Language'));
		$this->WhereDidYouHear->setDbValue($rs->fields('WhereDidYouHear'));
		$this->HospID->setDbValue($rs->fields('HospID'));
		$this->createdDate->setDbValue($rs->fields('createdDate'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// PatientID
		// first_name
		// mobile_no
		// ReferA4TreatingConsultant
		// Patient_Language
		// WhereDidYouHear
		// HospID
		// createdDate
		// PatientID

		$this->PatientID->ViewValue = $this->PatientID->CurrentValue;
		$this->PatientID->ViewCustomAttributes = "";

		// first_name
		$this->first_name->ViewValue = $this->first_name->CurrentValue;
		$this->first_name->ViewCustomAttributes = "";

		// mobile_no
		$this->mobile_no->ViewValue = $this->mobile_no->CurrentValue;
		$this->mobile_no->ViewCustomAttributes = "";

		// ReferA4TreatingConsultant
		$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->CurrentValue;
		$this->ReferA4TreatingConsultant->ViewCustomAttributes = "";

		// Patient_Language
		$this->Patient_Language->ViewValue = $this->Patient_Language->CurrentValue;
		$this->Patient_Language->ViewCustomAttributes = "";

		// WhereDidYouHear
		$this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->CurrentValue;
		$this->WhereDidYouHear->ViewCustomAttributes = "";

		// HospID
		$this->HospID->ViewValue = $this->HospID->CurrentValue;
		$curVal = strval($this->HospID->CurrentValue);
		if ($curVal <> "") {
			$this->HospID->ViewValue = $this->HospID->lookupCacheOption($curVal);
			if ($this->HospID->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->HospID->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
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

		// createdDate
		$this->createdDate->ViewValue = $this->createdDate->CurrentValue;
		$this->createdDate->ViewValue = FormatDateTime($this->createdDate->ViewValue, 7);
		$this->createdDate->ViewCustomAttributes = "";

		// PatientID
		$this->PatientID->LinkCustomAttributes = "";
		$this->PatientID->HrefValue = "";
		$this->PatientID->TooltipValue = "";

		// first_name
		$this->first_name->LinkCustomAttributes = "";
		$this->first_name->HrefValue = "";
		$this->first_name->TooltipValue = "";

		// mobile_no
		$this->mobile_no->LinkCustomAttributes = "";
		$this->mobile_no->HrefValue = "";
		$this->mobile_no->TooltipValue = "";

		// ReferA4TreatingConsultant
		$this->ReferA4TreatingConsultant->LinkCustomAttributes = "";
		$this->ReferA4TreatingConsultant->HrefValue = "";
		$this->ReferA4TreatingConsultant->TooltipValue = "";

		// Patient_Language
		$this->Patient_Language->LinkCustomAttributes = "";
		$this->Patient_Language->HrefValue = "";
		$this->Patient_Language->TooltipValue = "";

		// WhereDidYouHear
		$this->WhereDidYouHear->LinkCustomAttributes = "";
		$this->WhereDidYouHear->HrefValue = "";
		$this->WhereDidYouHear->TooltipValue = "";

		// HospID
		$this->HospID->LinkCustomAttributes = "";
		$this->HospID->HrefValue = "";
		$this->HospID->TooltipValue = "";

		// createdDate
		$this->createdDate->LinkCustomAttributes = "";
		$this->createdDate->HrefValue = "";
		$this->createdDate->TooltipValue = "";

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

		// PatientID
		$this->PatientID->EditAttrs["class"] = "form-control";
		$this->PatientID->EditCustomAttributes = "";
		$this->PatientID->EditValue = $this->PatientID->CurrentValue;
		$this->PatientID->ViewCustomAttributes = "";

		// first_name
		$this->first_name->EditAttrs["class"] = "form-control";
		$this->first_name->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->first_name->CurrentValue = HtmlDecode($this->first_name->CurrentValue);
		$this->first_name->EditValue = $this->first_name->CurrentValue;
		$this->first_name->PlaceHolder = RemoveHtml($this->first_name->caption());

		// mobile_no
		$this->mobile_no->EditAttrs["class"] = "form-control";
		$this->mobile_no->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->mobile_no->CurrentValue = HtmlDecode($this->mobile_no->CurrentValue);
		$this->mobile_no->EditValue = $this->mobile_no->CurrentValue;
		$this->mobile_no->PlaceHolder = RemoveHtml($this->mobile_no->caption());

		// ReferA4TreatingConsultant
		$this->ReferA4TreatingConsultant->EditAttrs["class"] = "form-control";
		$this->ReferA4TreatingConsultant->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ReferA4TreatingConsultant->CurrentValue = HtmlDecode($this->ReferA4TreatingConsultant->CurrentValue);
		$this->ReferA4TreatingConsultant->EditValue = $this->ReferA4TreatingConsultant->CurrentValue;
		$this->ReferA4TreatingConsultant->PlaceHolder = RemoveHtml($this->ReferA4TreatingConsultant->caption());

		// Patient_Language
		$this->Patient_Language->EditAttrs["class"] = "form-control";
		$this->Patient_Language->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Patient_Language->CurrentValue = HtmlDecode($this->Patient_Language->CurrentValue);
		$this->Patient_Language->EditValue = $this->Patient_Language->CurrentValue;
		$this->Patient_Language->PlaceHolder = RemoveHtml($this->Patient_Language->caption());

		// WhereDidYouHear
		$this->WhereDidYouHear->EditAttrs["class"] = "form-control";
		$this->WhereDidYouHear->EditCustomAttributes = "";
		if ($this->WhereDidYouHear->getSessionValue() <> "") {
			$this->WhereDidYouHear->CurrentValue = $this->WhereDidYouHear->getSessionValue();
		$this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->CurrentValue;
		$this->WhereDidYouHear->ViewCustomAttributes = "";
		} else {
		if (REMOVE_XSS)
			$this->WhereDidYouHear->CurrentValue = HtmlDecode($this->WhereDidYouHear->CurrentValue);
		$this->WhereDidYouHear->EditValue = $this->WhereDidYouHear->CurrentValue;
		$this->WhereDidYouHear->PlaceHolder = RemoveHtml($this->WhereDidYouHear->caption());
		}

		// HospID
		$this->HospID->EditAttrs["class"] = "form-control";
		$this->HospID->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->HospID->CurrentValue = HtmlDecode($this->HospID->CurrentValue);
		$this->HospID->EditValue = $this->HospID->CurrentValue;
		$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

		// createdDate
		$this->createdDate->EditAttrs["class"] = "form-control";
		$this->createdDate->EditCustomAttributes = "";
		if ($this->createdDate->getSessionValue() <> "") {
			$this->createdDate->CurrentValue = $this->createdDate->getSessionValue();
		$this->createdDate->ViewValue = $this->createdDate->CurrentValue;
		$this->createdDate->ViewValue = FormatDateTime($this->createdDate->ViewValue, 7);
		$this->createdDate->ViewCustomAttributes = "";
		} else {
		$this->createdDate->EditValue = FormatDateTime($this->createdDate->CurrentValue, 7);
		$this->createdDate->PlaceHolder = RemoveHtml($this->createdDate->caption());
		}

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
					$doc->exportCaption($this->PatientID);
					$doc->exportCaption($this->first_name);
					$doc->exportCaption($this->mobile_no);
					$doc->exportCaption($this->ReferA4TreatingConsultant);
					$doc->exportCaption($this->Patient_Language);
					$doc->exportCaption($this->WhereDidYouHear);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->createdDate);
				} else {
					$doc->exportCaption($this->PatientID);
					$doc->exportCaption($this->first_name);
					$doc->exportCaption($this->mobile_no);
					$doc->exportCaption($this->ReferA4TreatingConsultant);
					$doc->exportCaption($this->Patient_Language);
					$doc->exportCaption($this->WhereDidYouHear);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->createdDate);
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
						$doc->exportField($this->PatientID);
						$doc->exportField($this->first_name);
						$doc->exportField($this->mobile_no);
						$doc->exportField($this->ReferA4TreatingConsultant);
						$doc->exportField($this->Patient_Language);
						$doc->exportField($this->WhereDidYouHear);
						$doc->exportField($this->HospID);
						$doc->exportField($this->createdDate);
					} else {
						$doc->exportField($this->PatientID);
						$doc->exportField($this->first_name);
						$doc->exportField($this->mobile_no);
						$doc->exportField($this->ReferA4TreatingConsultant);
						$doc->exportField($this->Patient_Language);
						$doc->exportField($this->WhereDidYouHear);
						$doc->exportField($this->HospID);
						$doc->exportField($this->createdDate);
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