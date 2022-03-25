<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for recruitment_job
 */
class recruitment_job extends DbTable
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
	public $title;
	public $shortDescription;
	public $description;
	public $requirements;
	public $benefits;
	public $country;
	public $company;
	public $department;
	public $code;
	public $employementType;
	public $industry;
	public $experienceLevel;
	public $jobFunction;
	public $educationLevel;
	public $currency;
	public $showSalary;
	public $salaryMin;
	public $salaryMax;
	public $keywords;
	public $status;
	public $closingDate;
	public $attachment;
	public $display;
	public $postedBy;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'recruitment_job';
		$this->TableName = 'recruitment_job';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`recruitment_job`";
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
		$this->id = new DbField('recruitment_job', 'recruitment_job', 'x_id', 'id', '`id`', '`id`', 20, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// title
		$this->title = new DbField('recruitment_job', 'recruitment_job', 'x_title', 'title', '`title`', '`title`', 200, -1, FALSE, '`title`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->title->Nullable = FALSE; // NOT NULL field
		$this->title->Required = TRUE; // Required field
		$this->title->Sortable = TRUE; // Allow sort
		$this->fields['title'] = &$this->title;

		// shortDescription
		$this->shortDescription = new DbField('recruitment_job', 'recruitment_job', 'x_shortDescription', 'shortDescription', '`shortDescription`', '`shortDescription`', 201, -1, FALSE, '`shortDescription`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->shortDescription->Sortable = TRUE; // Allow sort
		$this->fields['shortDescription'] = &$this->shortDescription;

		// description
		$this->description = new DbField('recruitment_job', 'recruitment_job', 'x_description', 'description', '`description`', '`description`', 201, -1, FALSE, '`description`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->description->Sortable = TRUE; // Allow sort
		$this->fields['description'] = &$this->description;

		// requirements
		$this->requirements = new DbField('recruitment_job', 'recruitment_job', 'x_requirements', 'requirements', '`requirements`', '`requirements`', 201, -1, FALSE, '`requirements`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->requirements->Sortable = TRUE; // Allow sort
		$this->fields['requirements'] = &$this->requirements;

		// benefits
		$this->benefits = new DbField('recruitment_job', 'recruitment_job', 'x_benefits', 'benefits', '`benefits`', '`benefits`', 201, -1, FALSE, '`benefits`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->benefits->Sortable = TRUE; // Allow sort
		$this->fields['benefits'] = &$this->benefits;

		// country
		$this->country = new DbField('recruitment_job', 'recruitment_job', 'x_country', 'country', '`country`', '`country`', 20, -1, FALSE, '`country`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->country->Sortable = TRUE; // Allow sort
		$this->country->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['country'] = &$this->country;

		// company
		$this->company = new DbField('recruitment_job', 'recruitment_job', 'x_company', 'company', '`company`', '`company`', 20, -1, FALSE, '`company`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->company->Sortable = TRUE; // Allow sort
		$this->company->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['company'] = &$this->company;

		// department
		$this->department = new DbField('recruitment_job', 'recruitment_job', 'x_department', 'department', '`department`', '`department`', 200, -1, FALSE, '`department`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->department->Sortable = TRUE; // Allow sort
		$this->fields['department'] = &$this->department;

		// code
		$this->code = new DbField('recruitment_job', 'recruitment_job', 'x_code', 'code', '`code`', '`code`', 200, -1, FALSE, '`code`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->code->Sortable = TRUE; // Allow sort
		$this->fields['code'] = &$this->code;

		// employementType
		$this->employementType = new DbField('recruitment_job', 'recruitment_job', 'x_employementType', 'employementType', '`employementType`', '`employementType`', 20, -1, FALSE, '`employementType`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->employementType->Sortable = TRUE; // Allow sort
		$this->employementType->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['employementType'] = &$this->employementType;

		// industry
		$this->industry = new DbField('recruitment_job', 'recruitment_job', 'x_industry', 'industry', '`industry`', '`industry`', 20, -1, FALSE, '`industry`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->industry->Sortable = TRUE; // Allow sort
		$this->industry->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['industry'] = &$this->industry;

		// experienceLevel
		$this->experienceLevel = new DbField('recruitment_job', 'recruitment_job', 'x_experienceLevel', 'experienceLevel', '`experienceLevel`', '`experienceLevel`', 20, -1, FALSE, '`experienceLevel`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->experienceLevel->Sortable = TRUE; // Allow sort
		$this->experienceLevel->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['experienceLevel'] = &$this->experienceLevel;

		// jobFunction
		$this->jobFunction = new DbField('recruitment_job', 'recruitment_job', 'x_jobFunction', 'jobFunction', '`jobFunction`', '`jobFunction`', 20, -1, FALSE, '`jobFunction`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->jobFunction->Sortable = TRUE; // Allow sort
		$this->jobFunction->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['jobFunction'] = &$this->jobFunction;

		// educationLevel
		$this->educationLevel = new DbField('recruitment_job', 'recruitment_job', 'x_educationLevel', 'educationLevel', '`educationLevel`', '`educationLevel`', 20, -1, FALSE, '`educationLevel`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->educationLevel->Sortable = TRUE; // Allow sort
		$this->educationLevel->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['educationLevel'] = &$this->educationLevel;

		// currency
		$this->currency = new DbField('recruitment_job', 'recruitment_job', 'x_currency', 'currency', '`currency`', '`currency`', 20, -1, FALSE, '`currency`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->currency->Sortable = TRUE; // Allow sort
		$this->currency->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['currency'] = &$this->currency;

		// showSalary
		$this->showSalary = new DbField('recruitment_job', 'recruitment_job', 'x_showSalary', 'showSalary', '`showSalary`', '`showSalary`', 202, -1, FALSE, '`showSalary`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->showSalary->Sortable = TRUE; // Allow sort
		$this->showSalary->Lookup = new Lookup('showSalary', 'recruitment_job', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->showSalary->OptionCount = 2;
		$this->fields['showSalary'] = &$this->showSalary;

		// salaryMin
		$this->salaryMin = new DbField('recruitment_job', 'recruitment_job', 'x_salaryMin', 'salaryMin', '`salaryMin`', '`salaryMin`', 20, -1, FALSE, '`salaryMin`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->salaryMin->Sortable = TRUE; // Allow sort
		$this->salaryMin->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['salaryMin'] = &$this->salaryMin;

		// salaryMax
		$this->salaryMax = new DbField('recruitment_job', 'recruitment_job', 'x_salaryMax', 'salaryMax', '`salaryMax`', '`salaryMax`', 20, -1, FALSE, '`salaryMax`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->salaryMax->Sortable = TRUE; // Allow sort
		$this->salaryMax->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['salaryMax'] = &$this->salaryMax;

		// keywords
		$this->keywords = new DbField('recruitment_job', 'recruitment_job', 'x_keywords', 'keywords', '`keywords`', '`keywords`', 201, -1, FALSE, '`keywords`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->keywords->Sortable = TRUE; // Allow sort
		$this->fields['keywords'] = &$this->keywords;

		// status
		$this->status = new DbField('recruitment_job', 'recruitment_job', 'x_status', 'status', '`status`', '`status`', 202, -1, FALSE, '`status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->status->Sortable = TRUE; // Allow sort
		$this->status->Lookup = new Lookup('status', 'recruitment_job', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->status->OptionCount = 3;
		$this->fields['status'] = &$this->status;

		// closingDate
		$this->closingDate = new DbField('recruitment_job', 'recruitment_job', 'x_closingDate', 'closingDate', '`closingDate`', CastDateFieldForLike('`closingDate`', 0, "DB"), 135, 0, FALSE, '`closingDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->closingDate->Sortable = TRUE; // Allow sort
		$this->closingDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['closingDate'] = &$this->closingDate;

		// attachment
		$this->attachment = new DbField('recruitment_job', 'recruitment_job', 'x_attachment', 'attachment', '`attachment`', '`attachment`', 200, -1, FALSE, '`attachment`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->attachment->Sortable = TRUE; // Allow sort
		$this->fields['attachment'] = &$this->attachment;

		// display
		$this->display = new DbField('recruitment_job', 'recruitment_job', 'x_display', 'display', '`display`', '`display`', 200, -1, FALSE, '`display`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->display->Nullable = FALSE; // NOT NULL field
		$this->display->Required = TRUE; // Required field
		$this->display->Sortable = TRUE; // Allow sort
		$this->fields['display'] = &$this->display;

		// postedBy
		$this->postedBy = new DbField('recruitment_job', 'recruitment_job', 'x_postedBy', 'postedBy', '`postedBy`', '`postedBy`', 20, -1, FALSE, '`postedBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->postedBy->Sortable = TRUE; // Allow sort
		$this->postedBy->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['postedBy'] = &$this->postedBy;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`recruitment_job`";
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
		$this->title->DbValue = $row['title'];
		$this->shortDescription->DbValue = $row['shortDescription'];
		$this->description->DbValue = $row['description'];
		$this->requirements->DbValue = $row['requirements'];
		$this->benefits->DbValue = $row['benefits'];
		$this->country->DbValue = $row['country'];
		$this->company->DbValue = $row['company'];
		$this->department->DbValue = $row['department'];
		$this->code->DbValue = $row['code'];
		$this->employementType->DbValue = $row['employementType'];
		$this->industry->DbValue = $row['industry'];
		$this->experienceLevel->DbValue = $row['experienceLevel'];
		$this->jobFunction->DbValue = $row['jobFunction'];
		$this->educationLevel->DbValue = $row['educationLevel'];
		$this->currency->DbValue = $row['currency'];
		$this->showSalary->DbValue = $row['showSalary'];
		$this->salaryMin->DbValue = $row['salaryMin'];
		$this->salaryMax->DbValue = $row['salaryMax'];
		$this->keywords->DbValue = $row['keywords'];
		$this->status->DbValue = $row['status'];
		$this->closingDate->DbValue = $row['closingDate'];
		$this->attachment->DbValue = $row['attachment'];
		$this->display->DbValue = $row['display'];
		$this->postedBy->DbValue = $row['postedBy'];
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
			return "recruitment_joblist.php";
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
		if ($pageName == "recruitment_jobview.php")
			return $Language->phrase("View");
		elseif ($pageName == "recruitment_jobedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "recruitment_jobadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "recruitment_joblist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("recruitment_jobview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("recruitment_jobview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "recruitment_jobadd.php?" . $this->getUrlParm($parm);
		else
			$url = "recruitment_jobadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("recruitment_jobedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("recruitment_jobadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("recruitment_jobdelete.php", $this->getUrlParm());
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
		$this->title->setDbValue($rs->fields('title'));
		$this->shortDescription->setDbValue($rs->fields('shortDescription'));
		$this->description->setDbValue($rs->fields('description'));
		$this->requirements->setDbValue($rs->fields('requirements'));
		$this->benefits->setDbValue($rs->fields('benefits'));
		$this->country->setDbValue($rs->fields('country'));
		$this->company->setDbValue($rs->fields('company'));
		$this->department->setDbValue($rs->fields('department'));
		$this->code->setDbValue($rs->fields('code'));
		$this->employementType->setDbValue($rs->fields('employementType'));
		$this->industry->setDbValue($rs->fields('industry'));
		$this->experienceLevel->setDbValue($rs->fields('experienceLevel'));
		$this->jobFunction->setDbValue($rs->fields('jobFunction'));
		$this->educationLevel->setDbValue($rs->fields('educationLevel'));
		$this->currency->setDbValue($rs->fields('currency'));
		$this->showSalary->setDbValue($rs->fields('showSalary'));
		$this->salaryMin->setDbValue($rs->fields('salaryMin'));
		$this->salaryMax->setDbValue($rs->fields('salaryMax'));
		$this->keywords->setDbValue($rs->fields('keywords'));
		$this->status->setDbValue($rs->fields('status'));
		$this->closingDate->setDbValue($rs->fields('closingDate'));
		$this->attachment->setDbValue($rs->fields('attachment'));
		$this->display->setDbValue($rs->fields('display'));
		$this->postedBy->setDbValue($rs->fields('postedBy'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// title
		// shortDescription
		// description
		// requirements
		// benefits
		// country
		// company
		// department
		// code
		// employementType
		// industry
		// experienceLevel
		// jobFunction
		// educationLevel
		// currency
		// showSalary
		// salaryMin
		// salaryMax
		// keywords
		// status
		// closingDate
		// attachment
		// display
		// postedBy
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// title
		$this->title->ViewValue = $this->title->CurrentValue;
		$this->title->ViewCustomAttributes = "";

		// shortDescription
		$this->shortDescription->ViewValue = $this->shortDescription->CurrentValue;
		$this->shortDescription->ViewCustomAttributes = "";

		// description
		$this->description->ViewValue = $this->description->CurrentValue;
		$this->description->ViewCustomAttributes = "";

		// requirements
		$this->requirements->ViewValue = $this->requirements->CurrentValue;
		$this->requirements->ViewCustomAttributes = "";

		// benefits
		$this->benefits->ViewValue = $this->benefits->CurrentValue;
		$this->benefits->ViewCustomAttributes = "";

		// country
		$this->country->ViewValue = $this->country->CurrentValue;
		$this->country->ViewValue = FormatNumber($this->country->ViewValue, 0, -2, -2, -2);
		$this->country->ViewCustomAttributes = "";

		// company
		$this->company->ViewValue = $this->company->CurrentValue;
		$this->company->ViewValue = FormatNumber($this->company->ViewValue, 0, -2, -2, -2);
		$this->company->ViewCustomAttributes = "";

		// department
		$this->department->ViewValue = $this->department->CurrentValue;
		$this->department->ViewCustomAttributes = "";

		// code
		$this->code->ViewValue = $this->code->CurrentValue;
		$this->code->ViewCustomAttributes = "";

		// employementType
		$this->employementType->ViewValue = $this->employementType->CurrentValue;
		$this->employementType->ViewValue = FormatNumber($this->employementType->ViewValue, 0, -2, -2, -2);
		$this->employementType->ViewCustomAttributes = "";

		// industry
		$this->industry->ViewValue = $this->industry->CurrentValue;
		$this->industry->ViewValue = FormatNumber($this->industry->ViewValue, 0, -2, -2, -2);
		$this->industry->ViewCustomAttributes = "";

		// experienceLevel
		$this->experienceLevel->ViewValue = $this->experienceLevel->CurrentValue;
		$this->experienceLevel->ViewValue = FormatNumber($this->experienceLevel->ViewValue, 0, -2, -2, -2);
		$this->experienceLevel->ViewCustomAttributes = "";

		// jobFunction
		$this->jobFunction->ViewValue = $this->jobFunction->CurrentValue;
		$this->jobFunction->ViewValue = FormatNumber($this->jobFunction->ViewValue, 0, -2, -2, -2);
		$this->jobFunction->ViewCustomAttributes = "";

		// educationLevel
		$this->educationLevel->ViewValue = $this->educationLevel->CurrentValue;
		$this->educationLevel->ViewValue = FormatNumber($this->educationLevel->ViewValue, 0, -2, -2, -2);
		$this->educationLevel->ViewCustomAttributes = "";

		// currency
		$this->currency->ViewValue = $this->currency->CurrentValue;
		$this->currency->ViewValue = FormatNumber($this->currency->ViewValue, 0, -2, -2, -2);
		$this->currency->ViewCustomAttributes = "";

		// showSalary
		if (strval($this->showSalary->CurrentValue) <> "") {
			$this->showSalary->ViewValue = $this->showSalary->optionCaption($this->showSalary->CurrentValue);
		} else {
			$this->showSalary->ViewValue = NULL;
		}
		$this->showSalary->ViewCustomAttributes = "";

		// salaryMin
		$this->salaryMin->ViewValue = $this->salaryMin->CurrentValue;
		$this->salaryMin->ViewValue = FormatNumber($this->salaryMin->ViewValue, 0, -2, -2, -2);
		$this->salaryMin->ViewCustomAttributes = "";

		// salaryMax
		$this->salaryMax->ViewValue = $this->salaryMax->CurrentValue;
		$this->salaryMax->ViewValue = FormatNumber($this->salaryMax->ViewValue, 0, -2, -2, -2);
		$this->salaryMax->ViewCustomAttributes = "";

		// keywords
		$this->keywords->ViewValue = $this->keywords->CurrentValue;
		$this->keywords->ViewCustomAttributes = "";

		// status
		if (strval($this->status->CurrentValue) <> "") {
			$this->status->ViewValue = $this->status->optionCaption($this->status->CurrentValue);
		} else {
			$this->status->ViewValue = NULL;
		}
		$this->status->ViewCustomAttributes = "";

		// closingDate
		$this->closingDate->ViewValue = $this->closingDate->CurrentValue;
		$this->closingDate->ViewValue = FormatDateTime($this->closingDate->ViewValue, 0);
		$this->closingDate->ViewCustomAttributes = "";

		// attachment
		$this->attachment->ViewValue = $this->attachment->CurrentValue;
		$this->attachment->ViewCustomAttributes = "";

		// display
		$this->display->ViewValue = $this->display->CurrentValue;
		$this->display->ViewCustomAttributes = "";

		// postedBy
		$this->postedBy->ViewValue = $this->postedBy->CurrentValue;
		$this->postedBy->ViewValue = FormatNumber($this->postedBy->ViewValue, 0, -2, -2, -2);
		$this->postedBy->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// title
		$this->title->LinkCustomAttributes = "";
		$this->title->HrefValue = "";
		$this->title->TooltipValue = "";

		// shortDescription
		$this->shortDescription->LinkCustomAttributes = "";
		$this->shortDescription->HrefValue = "";
		$this->shortDescription->TooltipValue = "";

		// description
		$this->description->LinkCustomAttributes = "";
		$this->description->HrefValue = "";
		$this->description->TooltipValue = "";

		// requirements
		$this->requirements->LinkCustomAttributes = "";
		$this->requirements->HrefValue = "";
		$this->requirements->TooltipValue = "";

		// benefits
		$this->benefits->LinkCustomAttributes = "";
		$this->benefits->HrefValue = "";
		$this->benefits->TooltipValue = "";

		// country
		$this->country->LinkCustomAttributes = "";
		$this->country->HrefValue = "";
		$this->country->TooltipValue = "";

		// company
		$this->company->LinkCustomAttributes = "";
		$this->company->HrefValue = "";
		$this->company->TooltipValue = "";

		// department
		$this->department->LinkCustomAttributes = "";
		$this->department->HrefValue = "";
		$this->department->TooltipValue = "";

		// code
		$this->code->LinkCustomAttributes = "";
		$this->code->HrefValue = "";
		$this->code->TooltipValue = "";

		// employementType
		$this->employementType->LinkCustomAttributes = "";
		$this->employementType->HrefValue = "";
		$this->employementType->TooltipValue = "";

		// industry
		$this->industry->LinkCustomAttributes = "";
		$this->industry->HrefValue = "";
		$this->industry->TooltipValue = "";

		// experienceLevel
		$this->experienceLevel->LinkCustomAttributes = "";
		$this->experienceLevel->HrefValue = "";
		$this->experienceLevel->TooltipValue = "";

		// jobFunction
		$this->jobFunction->LinkCustomAttributes = "";
		$this->jobFunction->HrefValue = "";
		$this->jobFunction->TooltipValue = "";

		// educationLevel
		$this->educationLevel->LinkCustomAttributes = "";
		$this->educationLevel->HrefValue = "";
		$this->educationLevel->TooltipValue = "";

		// currency
		$this->currency->LinkCustomAttributes = "";
		$this->currency->HrefValue = "";
		$this->currency->TooltipValue = "";

		// showSalary
		$this->showSalary->LinkCustomAttributes = "";
		$this->showSalary->HrefValue = "";
		$this->showSalary->TooltipValue = "";

		// salaryMin
		$this->salaryMin->LinkCustomAttributes = "";
		$this->salaryMin->HrefValue = "";
		$this->salaryMin->TooltipValue = "";

		// salaryMax
		$this->salaryMax->LinkCustomAttributes = "";
		$this->salaryMax->HrefValue = "";
		$this->salaryMax->TooltipValue = "";

		// keywords
		$this->keywords->LinkCustomAttributes = "";
		$this->keywords->HrefValue = "";
		$this->keywords->TooltipValue = "";

		// status
		$this->status->LinkCustomAttributes = "";
		$this->status->HrefValue = "";
		$this->status->TooltipValue = "";

		// closingDate
		$this->closingDate->LinkCustomAttributes = "";
		$this->closingDate->HrefValue = "";
		$this->closingDate->TooltipValue = "";

		// attachment
		$this->attachment->LinkCustomAttributes = "";
		$this->attachment->HrefValue = "";
		$this->attachment->TooltipValue = "";

		// display
		$this->display->LinkCustomAttributes = "";
		$this->display->HrefValue = "";
		$this->display->TooltipValue = "";

		// postedBy
		$this->postedBy->LinkCustomAttributes = "";
		$this->postedBy->HrefValue = "";
		$this->postedBy->TooltipValue = "";

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

		// title
		$this->title->EditAttrs["class"] = "form-control";
		$this->title->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->title->CurrentValue = HtmlDecode($this->title->CurrentValue);
		$this->title->EditValue = $this->title->CurrentValue;
		$this->title->PlaceHolder = RemoveHtml($this->title->caption());

		// shortDescription
		$this->shortDescription->EditAttrs["class"] = "form-control";
		$this->shortDescription->EditCustomAttributes = "";
		$this->shortDescription->EditValue = $this->shortDescription->CurrentValue;
		$this->shortDescription->PlaceHolder = RemoveHtml($this->shortDescription->caption());

		// description
		$this->description->EditAttrs["class"] = "form-control";
		$this->description->EditCustomAttributes = "";
		$this->description->EditValue = $this->description->CurrentValue;
		$this->description->PlaceHolder = RemoveHtml($this->description->caption());

		// requirements
		$this->requirements->EditAttrs["class"] = "form-control";
		$this->requirements->EditCustomAttributes = "";
		$this->requirements->EditValue = $this->requirements->CurrentValue;
		$this->requirements->PlaceHolder = RemoveHtml($this->requirements->caption());

		// benefits
		$this->benefits->EditAttrs["class"] = "form-control";
		$this->benefits->EditCustomAttributes = "";
		$this->benefits->EditValue = $this->benefits->CurrentValue;
		$this->benefits->PlaceHolder = RemoveHtml($this->benefits->caption());

		// country
		$this->country->EditAttrs["class"] = "form-control";
		$this->country->EditCustomAttributes = "";
		$this->country->EditValue = $this->country->CurrentValue;
		$this->country->PlaceHolder = RemoveHtml($this->country->caption());

		// company
		$this->company->EditAttrs["class"] = "form-control";
		$this->company->EditCustomAttributes = "";
		$this->company->EditValue = $this->company->CurrentValue;
		$this->company->PlaceHolder = RemoveHtml($this->company->caption());

		// department
		$this->department->EditAttrs["class"] = "form-control";
		$this->department->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->department->CurrentValue = HtmlDecode($this->department->CurrentValue);
		$this->department->EditValue = $this->department->CurrentValue;
		$this->department->PlaceHolder = RemoveHtml($this->department->caption());

		// code
		$this->code->EditAttrs["class"] = "form-control";
		$this->code->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->code->CurrentValue = HtmlDecode($this->code->CurrentValue);
		$this->code->EditValue = $this->code->CurrentValue;
		$this->code->PlaceHolder = RemoveHtml($this->code->caption());

		// employementType
		$this->employementType->EditAttrs["class"] = "form-control";
		$this->employementType->EditCustomAttributes = "";
		$this->employementType->EditValue = $this->employementType->CurrentValue;
		$this->employementType->PlaceHolder = RemoveHtml($this->employementType->caption());

		// industry
		$this->industry->EditAttrs["class"] = "form-control";
		$this->industry->EditCustomAttributes = "";
		$this->industry->EditValue = $this->industry->CurrentValue;
		$this->industry->PlaceHolder = RemoveHtml($this->industry->caption());

		// experienceLevel
		$this->experienceLevel->EditAttrs["class"] = "form-control";
		$this->experienceLevel->EditCustomAttributes = "";
		$this->experienceLevel->EditValue = $this->experienceLevel->CurrentValue;
		$this->experienceLevel->PlaceHolder = RemoveHtml($this->experienceLevel->caption());

		// jobFunction
		$this->jobFunction->EditAttrs["class"] = "form-control";
		$this->jobFunction->EditCustomAttributes = "";
		$this->jobFunction->EditValue = $this->jobFunction->CurrentValue;
		$this->jobFunction->PlaceHolder = RemoveHtml($this->jobFunction->caption());

		// educationLevel
		$this->educationLevel->EditAttrs["class"] = "form-control";
		$this->educationLevel->EditCustomAttributes = "";
		$this->educationLevel->EditValue = $this->educationLevel->CurrentValue;
		$this->educationLevel->PlaceHolder = RemoveHtml($this->educationLevel->caption());

		// currency
		$this->currency->EditAttrs["class"] = "form-control";
		$this->currency->EditCustomAttributes = "";
		$this->currency->EditValue = $this->currency->CurrentValue;
		$this->currency->PlaceHolder = RemoveHtml($this->currency->caption());

		// showSalary
		$this->showSalary->EditCustomAttributes = "";
		$this->showSalary->EditValue = $this->showSalary->options(FALSE);

		// salaryMin
		$this->salaryMin->EditAttrs["class"] = "form-control";
		$this->salaryMin->EditCustomAttributes = "";
		$this->salaryMin->EditValue = $this->salaryMin->CurrentValue;
		$this->salaryMin->PlaceHolder = RemoveHtml($this->salaryMin->caption());

		// salaryMax
		$this->salaryMax->EditAttrs["class"] = "form-control";
		$this->salaryMax->EditCustomAttributes = "";
		$this->salaryMax->EditValue = $this->salaryMax->CurrentValue;
		$this->salaryMax->PlaceHolder = RemoveHtml($this->salaryMax->caption());

		// keywords
		$this->keywords->EditAttrs["class"] = "form-control";
		$this->keywords->EditCustomAttributes = "";
		$this->keywords->EditValue = $this->keywords->CurrentValue;
		$this->keywords->PlaceHolder = RemoveHtml($this->keywords->caption());

		// status
		$this->status->EditCustomAttributes = "";
		$this->status->EditValue = $this->status->options(FALSE);

		// closingDate
		$this->closingDate->EditAttrs["class"] = "form-control";
		$this->closingDate->EditCustomAttributes = "";
		$this->closingDate->EditValue = FormatDateTime($this->closingDate->CurrentValue, 8);
		$this->closingDate->PlaceHolder = RemoveHtml($this->closingDate->caption());

		// attachment
		$this->attachment->EditAttrs["class"] = "form-control";
		$this->attachment->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->attachment->CurrentValue = HtmlDecode($this->attachment->CurrentValue);
		$this->attachment->EditValue = $this->attachment->CurrentValue;
		$this->attachment->PlaceHolder = RemoveHtml($this->attachment->caption());

		// display
		$this->display->EditAttrs["class"] = "form-control";
		$this->display->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->display->CurrentValue = HtmlDecode($this->display->CurrentValue);
		$this->display->EditValue = $this->display->CurrentValue;
		$this->display->PlaceHolder = RemoveHtml($this->display->caption());

		// postedBy
		$this->postedBy->EditAttrs["class"] = "form-control";
		$this->postedBy->EditCustomAttributes = "";
		$this->postedBy->EditValue = $this->postedBy->CurrentValue;
		$this->postedBy->PlaceHolder = RemoveHtml($this->postedBy->caption());

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
					$doc->exportCaption($this->title);
					$doc->exportCaption($this->shortDescription);
					$doc->exportCaption($this->description);
					$doc->exportCaption($this->requirements);
					$doc->exportCaption($this->benefits);
					$doc->exportCaption($this->country);
					$doc->exportCaption($this->company);
					$doc->exportCaption($this->department);
					$doc->exportCaption($this->code);
					$doc->exportCaption($this->employementType);
					$doc->exportCaption($this->industry);
					$doc->exportCaption($this->experienceLevel);
					$doc->exportCaption($this->jobFunction);
					$doc->exportCaption($this->educationLevel);
					$doc->exportCaption($this->currency);
					$doc->exportCaption($this->showSalary);
					$doc->exportCaption($this->salaryMin);
					$doc->exportCaption($this->salaryMax);
					$doc->exportCaption($this->keywords);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->closingDate);
					$doc->exportCaption($this->attachment);
					$doc->exportCaption($this->display);
					$doc->exportCaption($this->postedBy);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->title);
					$doc->exportCaption($this->country);
					$doc->exportCaption($this->company);
					$doc->exportCaption($this->department);
					$doc->exportCaption($this->code);
					$doc->exportCaption($this->employementType);
					$doc->exportCaption($this->industry);
					$doc->exportCaption($this->experienceLevel);
					$doc->exportCaption($this->jobFunction);
					$doc->exportCaption($this->educationLevel);
					$doc->exportCaption($this->currency);
					$doc->exportCaption($this->showSalary);
					$doc->exportCaption($this->salaryMin);
					$doc->exportCaption($this->salaryMax);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->closingDate);
					$doc->exportCaption($this->attachment);
					$doc->exportCaption($this->display);
					$doc->exportCaption($this->postedBy);
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
						$doc->exportField($this->title);
						$doc->exportField($this->shortDescription);
						$doc->exportField($this->description);
						$doc->exportField($this->requirements);
						$doc->exportField($this->benefits);
						$doc->exportField($this->country);
						$doc->exportField($this->company);
						$doc->exportField($this->department);
						$doc->exportField($this->code);
						$doc->exportField($this->employementType);
						$doc->exportField($this->industry);
						$doc->exportField($this->experienceLevel);
						$doc->exportField($this->jobFunction);
						$doc->exportField($this->educationLevel);
						$doc->exportField($this->currency);
						$doc->exportField($this->showSalary);
						$doc->exportField($this->salaryMin);
						$doc->exportField($this->salaryMax);
						$doc->exportField($this->keywords);
						$doc->exportField($this->status);
						$doc->exportField($this->closingDate);
						$doc->exportField($this->attachment);
						$doc->exportField($this->display);
						$doc->exportField($this->postedBy);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->title);
						$doc->exportField($this->country);
						$doc->exportField($this->company);
						$doc->exportField($this->department);
						$doc->exportField($this->code);
						$doc->exportField($this->employementType);
						$doc->exportField($this->industry);
						$doc->exportField($this->experienceLevel);
						$doc->exportField($this->jobFunction);
						$doc->exportField($this->educationLevel);
						$doc->exportField($this->currency);
						$doc->exportField($this->showSalary);
						$doc->exportField($this->salaryMin);
						$doc->exportField($this->salaryMax);
						$doc->exportField($this->status);
						$doc->exportField($this->closingDate);
						$doc->exportField($this->attachment);
						$doc->exportField($this->display);
						$doc->exportField($this->postedBy);
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