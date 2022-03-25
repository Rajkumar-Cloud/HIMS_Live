<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for view_et
 */
class view_et extends DbTable
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
	public $RIDNo;
	public $PatientName;
	public $TiDNo;
	public $id;
	public $EmbryoNo;
	public $Stage;
	public $FertilisationDate;
	public $Day;
	public $Grade;
	public $Incubator;
	public $Catheter;
	public $Difficulty;
	public $Easy;
	public $Comments;
	public $Doctor;
	public $Embryologist;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'view_et';
		$this->TableName = 'view_et';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`view_et`";
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

		// RIDNo
		$this->RIDNo = new DbField('view_et', 'view_et', 'x_RIDNo', 'RIDNo', '`RIDNo`', '`RIDNo`', 3, 11, -1, FALSE, '`RIDNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RIDNo->Nullable = FALSE; // NOT NULL field
		$this->RIDNo->Required = TRUE; // Required field
		$this->RIDNo->Sortable = FALSE; // Allow sort
		$this->RIDNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['RIDNo'] = &$this->RIDNo;

		// PatientName
		$this->PatientName = new DbField('view_et', 'view_et', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, FALSE, '`PatientName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientName->Sortable = FALSE; // Allow sort
		$this->fields['PatientName'] = &$this->PatientName;

		// TiDNo
		$this->TiDNo = new DbField('view_et', 'view_et', 'x_TiDNo', 'TiDNo', '`TiDNo`', '`TiDNo`', 3, 11, -1, FALSE, '`TiDNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TiDNo->Nullable = FALSE; // NOT NULL field
		$this->TiDNo->Required = TRUE; // Required field
		$this->TiDNo->Sortable = FALSE; // Allow sort
		$this->TiDNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['TiDNo'] = &$this->TiDNo;

		// id
		$this->id = new DbField('view_et', 'view_et', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = FALSE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// EmbryoNo
		$this->EmbryoNo = new DbField('view_et', 'view_et', 'x_EmbryoNo', 'EmbryoNo', '`EmbryoNo`', '`EmbryoNo`', 200, 45, -1, FALSE, '`EmbryoNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->EmbryoNo->Sortable = TRUE; // Allow sort
		$this->fields['EmbryoNo'] = &$this->EmbryoNo;

		// Stage
		$this->Stage = new DbField('view_et', 'view_et', 'x_Stage', 'Stage', '`Stage`', '`Stage`', 200, 45, -1, FALSE, '`Stage`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Stage->Sortable = TRUE; // Allow sort
		$this->fields['Stage'] = &$this->Stage;

		// FertilisationDate
		$this->FertilisationDate = new DbField('view_et', 'view_et', 'x_FertilisationDate', 'FertilisationDate', '`FertilisationDate`', CastDateFieldForLike("`FertilisationDate`", 0, "DB"), 135, 19, 0, FALSE, '`FertilisationDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FertilisationDate->Sortable = TRUE; // Allow sort
		$this->FertilisationDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['FertilisationDate'] = &$this->FertilisationDate;

		// Day
		$this->Day = new DbField('view_et', 'view_et', 'x_Day', 'Day', '`Day`', '`Day`', 200, 45, -1, FALSE, '`Day`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Day->Sortable = TRUE; // Allow sort
		$this->Day->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Day->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Day->Lookup = new Lookup('Day', 'view_et', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Day->OptionCount = 6;
		$this->fields['Day'] = &$this->Day;

		// Grade
		$this->Grade = new DbField('view_et', 'view_et', 'x_Grade', 'Grade', '`Grade`', '`Grade`', 200, 45, -1, FALSE, '`Grade`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Grade->Sortable = TRUE; // Allow sort
		$this->Grade->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Grade->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Grade->Lookup = new Lookup('Grade', 'view_et', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Grade->OptionCount = 4;
		$this->fields['Grade'] = &$this->Grade;

		// Incubator
		$this->Incubator = new DbField('view_et', 'view_et', 'x_Incubator', 'Incubator', '`Incubator`', '`Incubator`', 200, 45, -1, FALSE, '`Incubator`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Incubator->Sortable = TRUE; // Allow sort
		$this->fields['Incubator'] = &$this->Incubator;

		// Catheter
		$this->Catheter = new DbField('view_et', 'view_et', 'x_Catheter', 'Catheter', '`Catheter`', '`Catheter`', 200, 45, -1, FALSE, '`Catheter`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Catheter->Sortable = TRUE; // Allow sort
		$this->fields['Catheter'] = &$this->Catheter;

		// Difficulty
		$this->Difficulty = new DbField('view_et', 'view_et', 'x_Difficulty', 'Difficulty', '`Difficulty`', '`Difficulty`', 200, 45, -1, FALSE, '`Difficulty`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Difficulty->Sortable = TRUE; // Allow sort
		$this->Difficulty->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Difficulty->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Difficulty->Lookup = new Lookup('Difficulty', 'view_et', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Difficulty->OptionCount = 3;
		$this->fields['Difficulty'] = &$this->Difficulty;

		// Easy
		$this->Easy = new DbField('view_et', 'view_et', 'x_Easy', 'Easy', '`Easy`', '`Easy`', 200, 220, -1, FALSE, '`Easy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->Easy->Sortable = TRUE; // Allow sort
		$this->Easy->Lookup = new Lookup('Easy', 'view_et', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Easy->OptionCount = 5;
		$this->fields['Easy'] = &$this->Easy;

		// Comments
		$this->Comments = new DbField('view_et', 'view_et', 'x_Comments', 'Comments', '`Comments`', '`Comments`', 200, 45, -1, FALSE, '`Comments`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Comments->Sortable = TRUE; // Allow sort
		$this->fields['Comments'] = &$this->Comments;

		// Doctor
		$this->Doctor = new DbField('view_et', 'view_et', 'x_Doctor', 'Doctor', '`Doctor`', '`Doctor`', 200, 45, -1, FALSE, '`Doctor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Doctor->Sortable = TRUE; // Allow sort
		$this->fields['Doctor'] = &$this->Doctor;

		// Embryologist
		$this->Embryologist = new DbField('view_et', 'view_et', 'x_Embryologist', 'Embryologist', '`Embryologist`', '`Embryologist`', 200, 45, -1, FALSE, '`Embryologist`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Embryologist->Sortable = TRUE; // Allow sort
		$this->fields['Embryologist'] = &$this->Embryologist;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_et`";
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
		$this->RIDNo->DbValue = $row['RIDNo'];
		$this->PatientName->DbValue = $row['PatientName'];
		$this->TiDNo->DbValue = $row['TiDNo'];
		$this->id->DbValue = $row['id'];
		$this->EmbryoNo->DbValue = $row['EmbryoNo'];
		$this->Stage->DbValue = $row['Stage'];
		$this->FertilisationDate->DbValue = $row['FertilisationDate'];
		$this->Day->DbValue = $row['Day'];
		$this->Grade->DbValue = $row['Grade'];
		$this->Incubator->DbValue = $row['Incubator'];
		$this->Catheter->DbValue = $row['Catheter'];
		$this->Difficulty->DbValue = $row['Difficulty'];
		$this->Easy->DbValue = $row['Easy'];
		$this->Comments->DbValue = $row['Comments'];
		$this->Doctor->DbValue = $row['Doctor'];
		$this->Embryologist->DbValue = $row['Embryologist'];
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
			return "view_etlist.php";
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
		if ($pageName == "view_etview.php")
			return $Language->phrase("View");
		elseif ($pageName == "view_etedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "view_etadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "view_etlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("view_etview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_etview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "view_etadd.php?" . $this->getUrlParm($parm);
		else
			$url = "view_etadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("view_etedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("view_etadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("view_etdelete.php", $this->getUrlParm());
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
		$this->RIDNo->setDbValue($rs->fields('RIDNo'));
		$this->PatientName->setDbValue($rs->fields('PatientName'));
		$this->TiDNo->setDbValue($rs->fields('TiDNo'));
		$this->id->setDbValue($rs->fields('id'));
		$this->EmbryoNo->setDbValue($rs->fields('EmbryoNo'));
		$this->Stage->setDbValue($rs->fields('Stage'));
		$this->FertilisationDate->setDbValue($rs->fields('FertilisationDate'));
		$this->Day->setDbValue($rs->fields('Day'));
		$this->Grade->setDbValue($rs->fields('Grade'));
		$this->Incubator->setDbValue($rs->fields('Incubator'));
		$this->Catheter->setDbValue($rs->fields('Catheter'));
		$this->Difficulty->setDbValue($rs->fields('Difficulty'));
		$this->Easy->setDbValue($rs->fields('Easy'));
		$this->Comments->setDbValue($rs->fields('Comments'));
		$this->Doctor->setDbValue($rs->fields('Doctor'));
		$this->Embryologist->setDbValue($rs->fields('Embryologist'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// RIDNo
		// PatientName
		// TiDNo
		// id
		// EmbryoNo
		// Stage
		// FertilisationDate
		// Day
		// Grade
		// Incubator
		// Catheter
		// Difficulty
		// Easy
		// Comments
		// Doctor
		// Embryologist
		// RIDNo

		$this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
		$this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
		$this->RIDNo->ViewCustomAttributes = "";

		// PatientName
		$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
		$this->PatientName->ViewCustomAttributes = "";

		// TiDNo
		$this->TiDNo->ViewValue = $this->TiDNo->CurrentValue;
		$this->TiDNo->ViewValue = FormatNumber($this->TiDNo->ViewValue, 0, -2, -2, -2);
		$this->TiDNo->ViewCustomAttributes = "";

		// id
		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// EmbryoNo
		$this->EmbryoNo->ViewValue = $this->EmbryoNo->CurrentValue;
		$this->EmbryoNo->ViewCustomAttributes = "";

		// Stage
		$this->Stage->ViewValue = $this->Stage->CurrentValue;
		$this->Stage->ViewCustomAttributes = "";

		// FertilisationDate
		$this->FertilisationDate->ViewValue = $this->FertilisationDate->CurrentValue;
		$this->FertilisationDate->ViewValue = FormatDateTime($this->FertilisationDate->ViewValue, 0);
		$this->FertilisationDate->ViewCustomAttributes = "";

		// Day
		if (strval($this->Day->CurrentValue) != "") {
			$this->Day->ViewValue = $this->Day->optionCaption($this->Day->CurrentValue);
		} else {
			$this->Day->ViewValue = NULL;
		}
		$this->Day->ViewCustomAttributes = "";

		// Grade
		if (strval($this->Grade->CurrentValue) != "") {
			$this->Grade->ViewValue = $this->Grade->optionCaption($this->Grade->CurrentValue);
		} else {
			$this->Grade->ViewValue = NULL;
		}
		$this->Grade->ViewCustomAttributes = "";

		// Incubator
		$this->Incubator->ViewValue = $this->Incubator->CurrentValue;
		$this->Incubator->ViewCustomAttributes = "";

		// Catheter
		$this->Catheter->ViewValue = $this->Catheter->CurrentValue;
		$this->Catheter->ViewCustomAttributes = "";

		// Difficulty
		if (strval($this->Difficulty->CurrentValue) != "") {
			$this->Difficulty->ViewValue = $this->Difficulty->optionCaption($this->Difficulty->CurrentValue);
		} else {
			$this->Difficulty->ViewValue = NULL;
		}
		$this->Difficulty->ViewCustomAttributes = "";

		// Easy
		if (strval($this->Easy->CurrentValue) != "") {
			$this->Easy->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->Easy->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->Easy->ViewValue->add($this->Easy->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->Easy->ViewValue = NULL;
		}
		$this->Easy->ViewCustomAttributes = "";

		// Comments
		$this->Comments->ViewValue = $this->Comments->CurrentValue;
		$this->Comments->ViewCustomAttributes = "";

		// Doctor
		$this->Doctor->ViewValue = $this->Doctor->CurrentValue;
		$this->Doctor->ViewCustomAttributes = "";

		// Embryologist
		$this->Embryologist->ViewValue = $this->Embryologist->CurrentValue;
		$this->Embryologist->ViewCustomAttributes = "";

		// RIDNo
		$this->RIDNo->LinkCustomAttributes = "";
		$this->RIDNo->HrefValue = "";
		$this->RIDNo->TooltipValue = "";

		// PatientName
		$this->PatientName->LinkCustomAttributes = "";
		$this->PatientName->HrefValue = "";
		$this->PatientName->TooltipValue = "";

		// TiDNo
		$this->TiDNo->LinkCustomAttributes = "";
		$this->TiDNo->HrefValue = "";
		$this->TiDNo->TooltipValue = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// EmbryoNo
		$this->EmbryoNo->LinkCustomAttributes = "";
		$this->EmbryoNo->HrefValue = "";
		$this->EmbryoNo->TooltipValue = "";

		// Stage
		$this->Stage->LinkCustomAttributes = "";
		$this->Stage->HrefValue = "";
		$this->Stage->TooltipValue = "";

		// FertilisationDate
		$this->FertilisationDate->LinkCustomAttributes = "";
		$this->FertilisationDate->HrefValue = "";
		$this->FertilisationDate->TooltipValue = "";

		// Day
		$this->Day->LinkCustomAttributes = "";
		$this->Day->HrefValue = "";
		$this->Day->TooltipValue = "";

		// Grade
		$this->Grade->LinkCustomAttributes = "";
		$this->Grade->HrefValue = "";
		$this->Grade->TooltipValue = "";

		// Incubator
		$this->Incubator->LinkCustomAttributes = "";
		$this->Incubator->HrefValue = "";
		$this->Incubator->TooltipValue = "";

		// Catheter
		$this->Catheter->LinkCustomAttributes = "";
		$this->Catheter->HrefValue = "";
		$this->Catheter->TooltipValue = "";

		// Difficulty
		$this->Difficulty->LinkCustomAttributes = "";
		$this->Difficulty->HrefValue = "";
		$this->Difficulty->TooltipValue = "";

		// Easy
		$this->Easy->LinkCustomAttributes = "";
		$this->Easy->HrefValue = "";
		$this->Easy->TooltipValue = "";

		// Comments
		$this->Comments->LinkCustomAttributes = "";
		$this->Comments->HrefValue = "";
		$this->Comments->TooltipValue = "";

		// Doctor
		$this->Doctor->LinkCustomAttributes = "";
		$this->Doctor->HrefValue = "";
		$this->Doctor->TooltipValue = "";

		// Embryologist
		$this->Embryologist->LinkCustomAttributes = "";
		$this->Embryologist->HrefValue = "";
		$this->Embryologist->TooltipValue = "";

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

		// RIDNo
		$this->RIDNo->EditAttrs["class"] = "form-control";
		$this->RIDNo->EditCustomAttributes = "";
		$this->RIDNo->EditValue = $this->RIDNo->CurrentValue;
		$this->RIDNo->EditValue = FormatNumber($this->RIDNo->EditValue, 0, -2, -2, -2);
		$this->RIDNo->ViewCustomAttributes = "";

		// PatientName
		$this->PatientName->EditAttrs["class"] = "form-control";
		$this->PatientName->EditCustomAttributes = "";
		$this->PatientName->EditValue = $this->PatientName->CurrentValue;
		$this->PatientName->ViewCustomAttributes = "";

		// TiDNo
		$this->TiDNo->EditAttrs["class"] = "form-control";
		$this->TiDNo->EditCustomAttributes = "";
		$this->TiDNo->EditValue = $this->TiDNo->CurrentValue;
		$this->TiDNo->EditValue = FormatNumber($this->TiDNo->EditValue, 0, -2, -2, -2);
		$this->TiDNo->ViewCustomAttributes = "";

		// id
		$this->id->EditAttrs["class"] = "form-control";
		$this->id->EditCustomAttributes = "";
		$this->id->EditValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// EmbryoNo
		$this->EmbryoNo->EditAttrs["class"] = "form-control";
		$this->EmbryoNo->EditCustomAttributes = "";
		$this->EmbryoNo->EditValue = $this->EmbryoNo->CurrentValue;
		$this->EmbryoNo->ViewCustomAttributes = "";

		// Stage
		$this->Stage->EditAttrs["class"] = "form-control";
		$this->Stage->EditCustomAttributes = "";
		$this->Stage->EditValue = $this->Stage->CurrentValue;
		$this->Stage->ViewCustomAttributes = "";

		// FertilisationDate
		$this->FertilisationDate->EditAttrs["class"] = "form-control";
		$this->FertilisationDate->EditCustomAttributes = "";
		$this->FertilisationDate->EditValue = $this->FertilisationDate->CurrentValue;
		$this->FertilisationDate->EditValue = FormatDateTime($this->FertilisationDate->EditValue, 0);
		$this->FertilisationDate->ViewCustomAttributes = "";

		// Day
		$this->Day->EditAttrs["class"] = "form-control";
		$this->Day->EditCustomAttributes = "";
		if (strval($this->Day->CurrentValue) != "") {
			$this->Day->EditValue = $this->Day->optionCaption($this->Day->CurrentValue);
		} else {
			$this->Day->EditValue = NULL;
		}
		$this->Day->ViewCustomAttributes = "";

		// Grade
		$this->Grade->EditAttrs["class"] = "form-control";
		$this->Grade->EditCustomAttributes = "";
		if (strval($this->Grade->CurrentValue) != "") {
			$this->Grade->EditValue = $this->Grade->optionCaption($this->Grade->CurrentValue);
		} else {
			$this->Grade->EditValue = NULL;
		}
		$this->Grade->ViewCustomAttributes = "";

		// Incubator
		$this->Incubator->EditAttrs["class"] = "form-control";
		$this->Incubator->EditCustomAttributes = "";
		$this->Incubator->EditValue = $this->Incubator->CurrentValue;
		$this->Incubator->ViewCustomAttributes = "";

		// Catheter
		$this->Catheter->EditAttrs["class"] = "form-control";
		$this->Catheter->EditCustomAttributes = "";
		if (!$this->Catheter->Raw)
			$this->Catheter->CurrentValue = HtmlDecode($this->Catheter->CurrentValue);
		$this->Catheter->EditValue = $this->Catheter->CurrentValue;
		$this->Catheter->PlaceHolder = RemoveHtml($this->Catheter->caption());

		// Difficulty
		$this->Difficulty->EditAttrs["class"] = "form-control";
		$this->Difficulty->EditCustomAttributes = "";
		$this->Difficulty->EditValue = $this->Difficulty->options(TRUE);

		// Easy
		$this->Easy->EditCustomAttributes = "";
		$this->Easy->EditValue = $this->Easy->options(FALSE);

		// Comments
		$this->Comments->EditAttrs["class"] = "form-control";
		$this->Comments->EditCustomAttributes = "";
		if (!$this->Comments->Raw)
			$this->Comments->CurrentValue = HtmlDecode($this->Comments->CurrentValue);
		$this->Comments->EditValue = $this->Comments->CurrentValue;
		$this->Comments->PlaceHolder = RemoveHtml($this->Comments->caption());

		// Doctor
		$this->Doctor->EditAttrs["class"] = "form-control";
		$this->Doctor->EditCustomAttributes = "";
		if (!$this->Doctor->Raw)
			$this->Doctor->CurrentValue = HtmlDecode($this->Doctor->CurrentValue);
		$this->Doctor->EditValue = $this->Doctor->CurrentValue;
		$this->Doctor->PlaceHolder = RemoveHtml($this->Doctor->caption());

		// Embryologist
		$this->Embryologist->EditAttrs["class"] = "form-control";
		$this->Embryologist->EditCustomAttributes = "";
		if (!$this->Embryologist->Raw)
			$this->Embryologist->CurrentValue = HtmlDecode($this->Embryologist->CurrentValue);
		$this->Embryologist->EditValue = $this->Embryologist->CurrentValue;
		$this->Embryologist->PlaceHolder = RemoveHtml($this->Embryologist->caption());

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
					$doc->exportCaption($this->RIDNo);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->TiDNo);
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->EmbryoNo);
					$doc->exportCaption($this->Stage);
					$doc->exportCaption($this->FertilisationDate);
					$doc->exportCaption($this->Day);
					$doc->exportCaption($this->Grade);
					$doc->exportCaption($this->Incubator);
					$doc->exportCaption($this->Catheter);
					$doc->exportCaption($this->Difficulty);
					$doc->exportCaption($this->Easy);
					$doc->exportCaption($this->Comments);
					$doc->exportCaption($this->Doctor);
					$doc->exportCaption($this->Embryologist);
				} else {
					$doc->exportCaption($this->EmbryoNo);
					$doc->exportCaption($this->Stage);
					$doc->exportCaption($this->FertilisationDate);
					$doc->exportCaption($this->Day);
					$doc->exportCaption($this->Grade);
					$doc->exportCaption($this->Incubator);
					$doc->exportCaption($this->Catheter);
					$doc->exportCaption($this->Difficulty);
					$doc->exportCaption($this->Easy);
					$doc->exportCaption($this->Comments);
					$doc->exportCaption($this->Doctor);
					$doc->exportCaption($this->Embryologist);
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
						$doc->exportField($this->RIDNo);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->TiDNo);
						$doc->exportField($this->id);
						$doc->exportField($this->EmbryoNo);
						$doc->exportField($this->Stage);
						$doc->exportField($this->FertilisationDate);
						$doc->exportField($this->Day);
						$doc->exportField($this->Grade);
						$doc->exportField($this->Incubator);
						$doc->exportField($this->Catheter);
						$doc->exportField($this->Difficulty);
						$doc->exportField($this->Easy);
						$doc->exportField($this->Comments);
						$doc->exportField($this->Doctor);
						$doc->exportField($this->Embryologist);
					} else {
						$doc->exportField($this->EmbryoNo);
						$doc->exportField($this->Stage);
						$doc->exportField($this->FertilisationDate);
						$doc->exportField($this->Day);
						$doc->exportField($this->Grade);
						$doc->exportField($this->Incubator);
						$doc->exportField($this->Catheter);
						$doc->exportField($this->Difficulty);
						$doc->exportField($this->Easy);
						$doc->exportField($this->Comments);
						$doc->exportField($this->Doctor);
						$doc->exportField($this->Embryologist);
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