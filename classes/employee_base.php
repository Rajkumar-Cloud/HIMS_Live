<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for employee
 */
class employee_base extends ReportTable
{
	public $ShowGroupHeaderAsRow = FALSE;
	public $ShowCompactSummaryFooter = TRUE;
	public $working_location;
	public $gender;
	public $id;
	public $empNo;
	public $tittle;
	public $first_name;
	public $middle_name;
	public $last_name;
	public $_gender;
	public $dob;
	public $start_date;
	public $end_date;
	public $employee_role_id;
	public $default_shift_start;
	public $default_shift_end;
	public $working_days;
	public $_working_location;
	public $profilePic;
	public $status;
	public $createdby;
	public $createddatetime;
	public $modifiedby;
	public $modifieddatetime;

	// Constructor
	public function __construct()
	{
		global $ReportLanguage, $CurrentLanguage;

		// Language object
		if (!isset($ReportLanguage))
			$ReportLanguage = new ReportLanguage();
		$this->TableVar = 'employee_base';
		$this->TableName = 'employee';
		$this->TableType = 'TABLE';
		$this->TableReportType = 'rpt';
		$this->SourceTableIsCustomView = FALSE;
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0;

		// id
		$this->id = new ReportField('employee_base', 'employee', 'x_id', 'id', '`id`', 3, -1, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->id->DateFilter = "";
		$this->fields['id'] = &$this->id;

		// empNo
		$this->empNo = new ReportField('employee_base', 'employee', 'x_empNo', 'empNo', '`empNo`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->empNo->Sortable = TRUE; // Allow sort
		$this->empNo->DateFilter = "";
		$this->fields['empNo'] = &$this->empNo;

		// tittle
		$this->tittle = new ReportField('employee_base', 'employee', 'x_tittle', 'tittle', '`tittle`', 3, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tittle->Sortable = TRUE; // Allow sort
		$this->tittle->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->tittle->DateFilter = "";
		$this->fields['tittle'] = &$this->tittle;

		// first_name
		$this->first_name = new ReportField('employee_base', 'employee', 'x_first_name', 'first_name', '`first_name`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->first_name->Sortable = TRUE; // Allow sort
		$this->first_name->DateFilter = "";
		$this->fields['first_name'] = &$this->first_name;

		// middle_name
		$this->middle_name = new ReportField('employee_base', 'employee', 'x_middle_name', 'middle_name', '`middle_name`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->middle_name->Sortable = TRUE; // Allow sort
		$this->middle_name->DateFilter = "";
		$this->fields['middle_name'] = &$this->middle_name;

		// last_name
		$this->last_name = new ReportField('employee_base', 'employee', 'x_last_name', 'last_name', '`last_name`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->last_name->Sortable = TRUE; // Allow sort
		$this->last_name->DateFilter = "";
		$this->fields['last_name'] = &$this->last_name;

		// gender
		$this->_gender = new ReportField('employee_base', 'employee', 'x__gender', 'gender', '`gender`', 3, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_gender->Sortable = TRUE; // Allow sort
		$this->_gender->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->_gender->DateFilter = "";
		$this->fields['gender'] = &$this->_gender;

		// dob
		$this->dob = new ReportField('employee_base', 'employee', 'x_dob', 'dob', '`dob`', 133, 0, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->dob->Sortable = TRUE; // Allow sort
		$this->dob->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $ReportLanguage->phrase("IncorrectDate"));
		$this->dob->DateFilter = "";
		$this->fields['dob'] = &$this->dob;

		// start_date
		$this->start_date = new ReportField('employee_base', 'employee', 'x_start_date', 'start_date', '`start_date`', 135, 0, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->start_date->Sortable = TRUE; // Allow sort
		$this->start_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $ReportLanguage->phrase("IncorrectDate"));
		$this->start_date->DateFilter = "";
		$this->fields['start_date'] = &$this->start_date;

		// end_date
		$this->end_date = new ReportField('employee_base', 'employee', 'x_end_date', 'end_date', '`end_date`', 135, 0, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->end_date->Sortable = TRUE; // Allow sort
		$this->end_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $ReportLanguage->phrase("IncorrectDate"));
		$this->end_date->DateFilter = "";
		$this->fields['end_date'] = &$this->end_date;

		// employee_role_id
		$this->employee_role_id = new ReportField('employee_base', 'employee', 'x_employee_role_id', 'employee_role_id', '`employee_role_id`', 3, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->employee_role_id->Sortable = TRUE; // Allow sort
		$this->employee_role_id->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->employee_role_id->DateFilter = "";
		$this->fields['employee_role_id'] = &$this->employee_role_id;

		// default_shift_start
		$this->default_shift_start = new ReportField('employee_base', 'employee', 'x_default_shift_start', 'default_shift_start', '`default_shift_start`', 134, 4, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->default_shift_start->Sortable = TRUE; // Allow sort
		$this->default_shift_start->DefaultErrorMessage = str_replace("%s", $GLOBALS["TIME_SEPARATOR"], $ReportLanguage->phrase("IncorrectTime"));
		$this->default_shift_start->DateFilter = "";
		$this->fields['default_shift_start'] = &$this->default_shift_start;

		// default_shift_end
		$this->default_shift_end = new ReportField('employee_base', 'employee', 'x_default_shift_end', 'default_shift_end', '`default_shift_end`', 134, 4, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->default_shift_end->Sortable = TRUE; // Allow sort
		$this->default_shift_end->DefaultErrorMessage = str_replace("%s", $GLOBALS["TIME_SEPARATOR"], $ReportLanguage->phrase("IncorrectTime"));
		$this->default_shift_end->DateFilter = "";
		$this->fields['default_shift_end'] = &$this->default_shift_end;

		// working_days
		$this->working_days = new ReportField('employee_base', 'employee', 'x_working_days', 'working_days', '`working_days`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->working_days->Sortable = TRUE; // Allow sort
		$this->working_days->DateFilter = "";
		$this->fields['working_days'] = &$this->working_days;

		// working_location
		$this->_working_location = new ReportField('employee_base', 'employee', 'x__working_location', 'working_location', '`working_location`', 3, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_working_location->Sortable = TRUE; // Allow sort
		$this->_working_location->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->_working_location->DateFilter = "";
		$this->fields['working_location'] = &$this->_working_location;

		// profilePic
		$this->profilePic = new ReportField('employee_base', 'employee', 'x_profilePic', 'profilePic', '`profilePic`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->profilePic->Sortable = TRUE; // Allow sort
		$this->profilePic->DateFilter = "";
		$this->fields['profilePic'] = &$this->profilePic;

		// status
		$this->status = new ReportField('employee_base', 'employee', 'x_status', 'status', '`status`', 3, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->status->Sortable = TRUE; // Allow sort
		$this->status->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->status->DateFilter = "";
		$this->fields['status'] = &$this->status;

		// createdby
		$this->createdby = new ReportField('employee_base', 'employee', 'x_createdby', 'createdby', '`createdby`', 3, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdby->Sortable = TRUE; // Allow sort
		$this->createdby->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->createdby->DateFilter = "";
		$this->fields['createdby'] = &$this->createdby;

		// createddatetime
		$this->createddatetime = new ReportField('employee_base', 'employee', 'x_createddatetime', 'createddatetime', '`createddatetime`', 135, 0, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = TRUE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $ReportLanguage->phrase("IncorrectDate"));
		$this->createddatetime->DateFilter = "";
		$this->fields['createddatetime'] = &$this->createddatetime;

		// modifiedby
		$this->modifiedby = new ReportField('employee_base', 'employee', 'x_modifiedby', 'modifiedby', '`modifiedby`', 3, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifiedby->Sortable = TRUE; // Allow sort
		$this->modifiedby->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->modifiedby->DateFilter = "";
		$this->fields['modifiedby'] = &$this->modifiedby;

		// modifieddatetime
		$this->modifieddatetime = new ReportField('employee_base', 'employee', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', 135, 0, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifieddatetime->Sortable = TRUE; // Allow sort
		$this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $ReportLanguage->phrase("IncorrectDate"));
		$this->modifieddatetime->DateFilter = "";
		$this->fields['modifieddatetime'] = &$this->modifieddatetime;

		// working location
		$this->working_location = new DbChart($this, 'working_location', 'working location', 'working_location', 'working_location', 1005, '', 0, 'COUNT', 600, 500);
		$this->working_location->SortType = 0;
		$this->working_location->SortSequence = "";
		$this->working_location->SqlSelect = "SELECT `working_location`, '', COUNT(`working_location`) FROM ";
		$this->working_location->SqlGroupBy = "`working_location`";
		$this->working_location->SqlOrderBy = "";
		$this->working_location->SeriesDateType = "";
		$this->working_location->ID = "employee_base_working_location"; // Chart ID
		$this->working_location->setParameters([new ChartParameter("type", "1005", FALSE),
			new ChartParameter("seriestype", "0", FALSE)]);  // Chart type / Chart series type
		$this->working_location->setParameter("bgcolor", "FCFCFC", TRUE); // Background color
		$this->working_location->setParameters([new ChartParameter("caption", $this->working_location->caption()),
			new ChartParameter("xaxisname", $this->working_location->xAxisName())]); // Chart caption / X axis name
		$this->working_location->setParameter("yaxisname", $this->working_location->yAxisName(), TRUE); // Y axis name
		$this->working_location->setParameters([new ChartParameter("shownames", "1"),
			new ChartParameter("showvalues", "1"),
			new ChartParameter("showhovercap", "0")]); // Show names / Show values / Show hover
		$this->working_location->setParameter("alpha", "50", FALSE); // Chart alpha
		$this->working_location->setParameter("colorpalette", "#FF0000|#FF0080|#FF00FF|#8000FF|#FF8000|#FF3D3D|#7AFFFF|#0000FF|#FFFF00|#FF7A7A|#3DFFFF|#0080FF|#80FF00|#00FF00|#00FF80|#00FFFF", FALSE); // Chart color palette
		$this->working_location->setParameters([new ChartParameter("showLimits", "1"),
	new ChartParameter("showDivLineValues", "1"),
	new ChartParameter("yAxisMinValue", "0"),
	new ChartParameter("yAxisMaxValue", "0"),
	new ChartParameter("exportMode", "auto"),
	new ChartParameter("showAlternateVGridColor", "0"),
	]);

		// gender
		$this->gender = new DbChart($this, 'gender', 'gender', 'gender', 'gender', 1, '', 0, 'COUNT', 600, 500);
		$this->gender->SortType = 0;
		$this->gender->SortSequence = "";
		$this->gender->SqlSelect = "SELECT `gender`, '', COUNT(`gender`) FROM ";
		$this->gender->SqlGroupBy = "`gender`";
		$this->gender->SqlOrderBy = "";
		$this->gender->SeriesDateType = "";
		$this->gender->DefaultDecimalPrecision = 0;
		$this->gender->ID = "employee_base_gender"; // Chart ID
		$this->gender->setParameters([new ChartParameter("type", "1", FALSE),
			new ChartParameter("seriestype", "0", FALSE)]);  // Chart type / Chart series type
		$this->gender->setParameter("bgcolor", "FCFCFC", TRUE); // Background color
		$this->gender->setParameters([new ChartParameter("caption", $this->gender->caption()),
			new ChartParameter("xaxisname", $this->gender->xAxisName())]); // Chart caption / X axis name
		$this->gender->setParameter("yaxisname", $this->gender->yAxisName(), TRUE); // Y axis name
		$this->gender->setParameters([new ChartParameter("shownames", "1"),
			new ChartParameter("showvalues", "1"),
			new ChartParameter("showhovercap", "0")]); // Show names / Show values / Show hover
		$this->gender->setParameter("alpha", "50", FALSE); // Chart alpha
		$this->gender->setParameter("colorpalette", "#FF0000|#FF0080|#FF00FF|#8000FF|#FF8000|#FF3D3D|#7AFFFF|#0000FF|#FFFF00|#FF7A7A|#3DFFFF|#0080FF|#80FF00|#00FF00|#00FF80|#00FFFF", FALSE); // Chart color palette
		$this->gender->setParameters([new ChartParameter("showLimits", "1"),
	new ChartParameter("showDivLineValues", "1"),
	new ChartParameter("yAxisMinValue", "0"),
	new ChartParameter("yAxisMaxValue", "0"),
	new ChartParameter("exportMode", "auto"),
	new ChartParameter("showAlternateVGridColor", "0"),
	]);
	}

	// Render for popup
	public function renderPopup()
	{
		global $ReportLanguage;
	}

	// Render for lookup
	public function renderLookup()
	{
	}

	// Get Field Visibility
	public function getFieldVisibility($fldparm)
	{
		global $Security;
		return $this->$fldparm->Visible; // Returns original value
	}

	// Single column sort
	protected function updateSort(&$fld)
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
			if ($fld->GroupingFieldId == 0)
				$this->setDetailOrderBy($sortField . " " . $thisSort); // Save to Session
		} else {
			if ($fld->GroupingFieldId == 0) $fld->setSort("");
		}
	}

	// Get Sort SQL
	protected function sortSql()
	{
		$dtlSortSql = $this->getDetailOrderBy(); // Get ORDER BY for detail fields from session
		$argrps = [];
		foreach ($this->fields as $fld) {
			if ($fld->getSort() <> "") {
				$fldsql = $fld->Expression;
				if ($fld->GroupingFieldId > 0) {
					if ($fld->GroupSql <> "")
						$argrps[$fld->GroupingFieldId] = str_replace("%s", $fldsql, $fld->GroupSql) . " " . $fld->getSort();
					else
						$argrps[$fld->GroupingFieldId] = $fldsql . " " . $fld->getSort();
				}
			}
		}
		$sortSql = "";
		foreach ($argrps as $grp) {
			if ($sortSql <> "") $sortSql .= ", ";
			$sortSql .= $grp;
		}
		if ($dtlSortSql <> "") {
			if ($sortSql <> "") $sortSql .= ", ";
			$sortSql .= $dtlSortSql;
		}
		return $sortSql;
	}

	// Table level SQL
	private $_sqlFrom = "";
	private $_sqlSelect = "";
	private $_sqlWhere = "";
	private $_sqlGroupBy = "";
	private $_sqlHaving = "";
	private $_sqlOrderBy = "";

	// From
	public function getSqlFrom()
	{
		return ($this->_sqlFrom <> "") ? $this->_sqlFrom : "`employee`";
	}
	public function setSqlFrom($v)
	{
		$this->_sqlFrom = $v;
	}

	// Select
	public function getSqlSelect()
	{
		return ($this->_sqlSelect <> "") ? $this->_sqlSelect : "SELECT * FROM " . $this->getSqlFrom();
	}
	public function setSqlSelect($v)
	{
		$this->_sqlSelect = $v;
	}

	// Where
	public function getSqlWhere()
	{
		$where = ($this->_sqlWhere <> "") ? $this->_sqlWhere : "";
		$filter = "";
		AddFilter($where, $filter);
		return $where;
	}
	public function setSqlWhere($v)
	{
		$this->_sqlWhere = $v;
	}

	// Group By
	public function getSqlGroupBy()
	{
		return ($this->_sqlGroupBy <> "") ? $this->_sqlGroupBy : "";
	}
	public function setSqlGroupBy($v)
	{
		$this->_sqlGroupBy = $v;
	}

	// Having
	public function getSqlHaving()
	{
		return ($this->_sqlHaving <> "") ? $this->_sqlHaving : "";
	}
	public function setSqlHaving($v)
	{
		$this->_sqlHaving = $v;
	}

	// Order By
	public function getSqlOrderBy()
	{
		return ($this->_sqlOrderBy <> "") ? $this->_sqlOrderBy : "";
	}
	public function setSqlOrderBy($v)
	{
		$this->_sqlOrderBy = $v;
	}

	// Get SQL
	public function getSql($where, $orderBy = "")
	{
		return BuildReportSql($this->getSqlSelect(), $this->getSqlWhere(),
			$this->getSqlGroupBy(), $this->getSqlHaving(), $this->getSqlOrderBy(),
			$where, $orderBy);
	}

	// Summary properties
	private $_sqlSelectAggregate = "";
	private $_sqlAggregatePrefix = "";
	private $_sqlAggregateSuffix = "";
	private $_sqlSelectCount = "";

	// Select Aggregate
	public function getSqlSelectAggregate()
	{
		return ($this->_sqlSelectAggregate <> "") ? $this->_sqlSelectAggregate : "SELECT * FROM " . $this->getSqlFrom();
	}
	public function setSqlSelectAggregate($v)
	{
		$this->_sqlSelectAggregate = $v;
	}

	// Aggregate Prefix
	public function getSqlAggregatePrefix()
	{
		return ($this->_sqlAggregatePrefix <> "") ? $this->_sqlAggregatePrefix : "";
	}
	public function setSqlAggregatePrefix($v)
	{
		$this->_sqlAggregatePrefix = $v;
	}

	// Aggregate Suffix
	public function getSqlAggregateSuffix()
	{
		return ($this->_sqlAggregateSuffix <> "") ? $this->_sqlAggregateSuffix : "";
	}
	public function setSqlAggregateSuffix($v)
	{
		$this->_sqlAggregateSuffix = $v;
	}

	// Select Count
	public function getSqlSelectCount()
	{
		return ($this->_sqlSelectCount <> "") ? $this->_sqlSelectCount : "SELECT COUNT(*) FROM " . $this->getSqlFrom();
	}
	public function setSqlSelectCount($v)
	{
		$this->_sqlSelectCount = $v;
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

	// Get recordset
	public function getRecordset($sql, $rowcnt = -1, $offset = -1)
	{
		$conn = &$this->getConnection();
		$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
		$rs = $conn->selectLimit($sql, $rowcnt, $offset);
		$conn->raiseErrorFn = '';
		return $rs;
	}

	// Sort URL
	public function sortUrl(&$fld)
	{
		global $DashboardReport;
		return "";
	}

	// Lookup data from table
	public function lookup()
	{
		global $Security, $RequestSecurity, $PROJECT_ID, $RELATED_PROJECT_ID;
		$projectId = $RELATED_PROJECT_ID;

		// Check token first
		$func = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
		$validRequest = FALSE;
		if (is_callable($func) && Post(TOKEN_NAME) !== NULL) {
			$validRequest = $func(Post(TOKEN_NAME), SessionTimeoutTime());
			if ($validRequest) {
				if (!isset($Security)) {
					if (session_status() !== PHP_SESSION_ACTIVE)
						session_start(); // Init session data
					$Security = new AdvancedSecurity();
					if ($Security->isLoggedIn()) $Security->TablePermission_Loading();
					$Security->loadCurrentUserLevel($projectId . $this->TableName);
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
			$Security->loadCurrentUserLevel($projectId . $this->TableName);
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

		// Create lookup object and output JSON
		$lookup = new ReportLookup($linkField, $this->TableVar, $distinct, $linkField, $displayFields, $parentFields, $childFields, $filterFields, $filterFieldVars, $autoFillSourceFields);
		foreach ($filterFields as $i => $filterField) { // Set up filter operators
			if (@$filterOperators[$i] <> "")
				$lookup->setFilterOperator($filterField, $filterOperators[$i]);
		}
		$lookup->LookupType = $lookupType; // Lookup type
		if (Post("keys") !== NULL) { // Selected records from modal
			$keys = Post("keys");
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
	// Page Selecting event
	function Page_Selecting(&$filter) {

		// Enter your code here
	}

	// Page Breaking event
	function Page_Breaking(&$break, &$content) {

		// Example:
		//$break = FALSE; // Skip page break, or
		//$content = "<div style=\"page-break-after:always;\">&nbsp;</div>"; // Modify page break content

	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here
	}

	// Cell Rendered event
	function Cell_Rendered(&$Field, $CurrentValue, &$ViewValue, &$ViewAttrs, &$CellAttrs, &$HrefValue, &$LinkAttrs) {

		//$ViewValue = "xxx";
		//$ViewAttrs["class"] = "xxx";

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

	// Load Filters event
	function Page_FilterLoad() {

		// Enter your code here
		// Example: Register/Unregister Custom Extended Filter
		//RegisterFilter($this-><Field>, 'StartsWithA', 'Starts With A', PROJECT_NAMESPACE . 'GetStartsWithAFilter'); // With function, or
		//RegisterFilter($this-><Field>, 'StartsWithA', 'Starts With A'); // No function, use Page_Filtering event
		//UnregisterFilter($this-><Field>, 'StartsWithA');

	}

	// Page Filter Validated event
	function Page_FilterValidated() {

		// Example:
		//$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value

	}

	// Page Filtering event
	function Page_Filtering(&$fld, &$filter, $typ, $opr = "", $val = "", $cond = "", $opr2 = "", $val2 = "") {

		// Note: ALWAYS CHECK THE FILTER TYPE ($typ)! Example:
		//if ($typ == "dropdown" && $fld->Name == "MyField") // Dropdown filter
		//	$filter = "..."; // Modify the filter
		//if ($typ == "extended" && $fld->Name == "MyField") // Extended filter
		//	$filter = "..."; // Modify the filter
		//if ($typ == "popup" && $fld->Name == "MyField") // Popup filter
		//	$filter = "..."; // Modify the filter
		//if ($typ == "custom" && $opr == "..." && $fld->Name == "MyField") // Custom filter, $opr is the custom filter ID
		//	$filter = "..."; // Modify the filter

	}

	// Email Sending event
	function Email_Sending(&$email, &$args) {

		//var_dump($email); var_dump($args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		// Enter your code here
	}
}
?>