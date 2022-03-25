<?php
namespace PHPMaker2019\HIMS___2019;

/**
 * Table class for ServiceCount
 */
class ServiceCount extends ReportTable
{
	public $ShowGroupHeaderAsRow = FALSE;
	public $ShowCompactSummaryFooter = TRUE;
	public $Chart1;
	public $Chart2;
	public $DEPARTMENT;
	public $TestCount;
	public $SumAmount;
	public $createdDate;
	public $HospID;

	// Constructor
	public function __construct()
	{
		global $ReportLanguage, $CurrentLanguage;

		// Language object
		if (!isset($ReportLanguage))
			$ReportLanguage = new ReportLanguage();
		$this->TableVar = 'ServiceCount';
		$this->TableName = 'ServiceCount';
		$this->TableType = 'REPORT';
		$this->TableReportType = 'summary';
		$this->SourceTableIsCustomView = FALSE;
		$this->Dbid = 'DB';
		$this->ExportAll = FALSE;
		$this->ExportPageBreakCount = 0;

		// DEPARTMENT
		$this->DEPARTMENT = new ReportField('ServiceCount', 'ServiceCount', 'x_DEPARTMENT', 'DEPARTMENT', '`DEPARTMENT`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DEPARTMENT->Sortable = TRUE; // Allow sort
		$this->DEPARTMENT->GroupingFieldId = 1;
		$this->DEPARTMENT->ShowGroupHeaderAsRow = $this->ShowGroupHeaderAsRow;
		$this->DEPARTMENT->ShowCompactSummaryFooter = $this->ShowCompactSummaryFooter;
		$this->DEPARTMENT->DateFilter = "";
		$this->DEPARTMENT->GroupByType = "";
		$this->DEPARTMENT->GroupInterval = "0";
		$this->DEPARTMENT->GroupSql = "";
		$this->fields['DEPARTMENT'] = &$this->DEPARTMENT;

		// TestCount
		$this->TestCount = new ReportField('ServiceCount', 'ServiceCount', 'x_TestCount', 'TestCount', '`TestCount`', 20, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TestCount->Sortable = TRUE; // Allow sort
		$this->TestCount->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->TestCount->DateFilter = "";
		$this->fields['TestCount'] = &$this->TestCount;

		// SumAmount
		$this->SumAmount = new ReportField('ServiceCount', 'ServiceCount', 'x_SumAmount', 'SumAmount', '`SumAmount`', 131, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SumAmount->Sortable = TRUE; // Allow sort
		$this->SumAmount->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectFloat");
		$this->SumAmount->DateFilter = "";
		$this->fields['SumAmount'] = &$this->SumAmount;

		// createdDate
		$this->createdDate = new ReportField('ServiceCount', 'ServiceCount', 'x_createdDate', 'createdDate', '`createdDate`', 133, 0, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdDate->Sortable = TRUE; // Allow sort
		$this->createdDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $ReportLanguage->phrase("IncorrectDate"));
		$this->createdDate->DateFilter = "";
		$this->fields['createdDate'] = &$this->createdDate;

		// HospID
		$this->HospID = new ReportField('ServiceCount', 'ServiceCount', 'x_HospID', 'HospID', '`HospID`', 3, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->HospID->DateFilter = "";
		$this->fields['HospID'] = &$this->HospID;

		// Chart1
		$this->Chart1 = new DbChart($this, 'Chart1', 'Chart1', 'DEPARTMENT', 'TestCount', 1, '', 0, 'COUNT', 600, 500);
		$this->Chart1->SortType = 0;
		$this->Chart1->SortSequence = "";
		$this->Chart1->SqlSelect = "SELECT `DEPARTMENT`, '', COUNT(`TestCount`) FROM ";
		$this->Chart1->SqlGroupBy = "`DEPARTMENT`";
		$this->Chart1->SqlOrderBy = "";
		$this->Chart1->SeriesDateType = "";
		$this->Chart1->ID = "ServiceCount_Chart1"; // Chart ID
		$this->Chart1->setParameters([new ChartParameter("type", "1", FALSE),
			new ChartParameter("seriestype", "0", FALSE)]);  // Chart type / Chart series type
		$this->Chart1->setParameter("bgcolor", "FCFCFC", TRUE); // Background color
		$this->Chart1->setParameters([new ChartParameter("caption", $this->Chart1->caption()),
			new ChartParameter("xaxisname", $this->Chart1->xAxisName())]); // Chart caption / X axis name
		$this->Chart1->setParameter("yaxisname", $this->Chart1->yAxisName(), TRUE); // Y axis name
		$this->Chart1->setParameters([new ChartParameter("shownames", "1"),
			new ChartParameter("showvalues", "1"),
			new ChartParameter("showhovercap", "0")]); // Show names / Show values / Show hover
		$this->Chart1->setParameter("alpha", "50", FALSE); // Chart alpha
		$this->Chart1->setParameter("colorpalette", "#FF0000|#FF0080|#FF00FF|#8000FF|#FF8000|#FF3D3D|#7AFFFF|#0000FF|#FFFF00|#FF7A7A|#3DFFFF|#0080FF|#80FF00|#00FF00|#00FF80|#00FFFF", FALSE); // Chart color palette
		$this->Chart1->setParameters([new ChartParameter("showLimits", "1"),
	new ChartParameter("showDivLineValues", "1"),
	new ChartParameter("yAxisMinValue", "0"),
	new ChartParameter("yAxisMaxValue", "0"),
	new ChartParameter("exportMode", "auto"),
	new ChartParameter("showAlternateVGridColor", "0"),
	]);

		// Chart2
		$this->Chart2 = new DbChart($this, 'Chart2', 'Chart2', 'DEPARTMENT', 'SumAmount', 1, '', 0, 'SUM', 600, 500);
		$this->Chart2->SortType = 0;
		$this->Chart2->SortSequence = "";
		$this->Chart2->SqlSelect = "SELECT `DEPARTMENT`, '', SUM(`SumAmount`) FROM ";
		$this->Chart2->SqlGroupBy = "`DEPARTMENT`";
		$this->Chart2->SqlOrderBy = "";
		$this->Chart2->SeriesDateType = "";
		$this->Chart2->ID = "ServiceCount_Chart2"; // Chart ID
		$this->Chart2->setParameters([new ChartParameter("type", "1", FALSE),
			new ChartParameter("seriestype", "0", FALSE)]);  // Chart type / Chart series type
		$this->Chart2->setParameter("bgcolor", "FCFCFC", TRUE); // Background color
		$this->Chart2->setParameters([new ChartParameter("caption", $this->Chart2->caption()),
			new ChartParameter("xaxisname", $this->Chart2->xAxisName())]); // Chart caption / X axis name
		$this->Chart2->setParameter("yaxisname", $this->Chart2->yAxisName(), TRUE); // Y axis name
		$this->Chart2->setParameters([new ChartParameter("shownames", "1"),
			new ChartParameter("showvalues", "1"),
			new ChartParameter("showhovercap", "0")]); // Show names / Show values / Show hover
		$this->Chart2->setParameter("alpha", "50", FALSE); // Chart alpha
		$this->Chart2->setParameter("colorpalette", "#FF0000|#FF0080|#FF00FF|#8000FF|#FF8000|#FF3D3D|#7AFFFF|#0000FF|#FFFF00|#FF7A7A|#3DFFFF|#0080FF|#80FF00|#00FF00|#00FF80|#00FFFF", FALSE); // Chart color palette
		$this->Chart2->setParameters([new ChartParameter("showLimits", "1"),
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
		$this->createdDate->ViewValue = $this->createdDate->CurrentValue;
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
		return ($this->_sqlFrom <> "") ? $this->_sqlFrom : "`view_dashboard_service_count`";
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
		return ($this->_sqlOrderBy <> "") ? $this->_sqlOrderBy : "`DEPARTMENT` ASC";
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

	// Table Level Group SQL
	private $_sqlFirstGroupField = "";
	private $_sqlSelectGroup = "";
	private $_sqlOrderByGroup = "";

	// First Group Field
	public function getSqlFirstGroupField()
	{
		return ($this->_sqlFirstGroupField <> "") ? $this->_sqlFirstGroupField : "`DEPARTMENT`";
	}
	public function setSqlFirstGroupField($v)
	{
		$this->_sqlFirstGroupField = $v;
	}

	// Select Group
	public function getSqlSelectGroup()
	{
		return ($this->_sqlSelectGroup <> "") ? $this->_sqlSelectGroup : "SELECT DISTINCT " . $this->getSqlFirstGroupField() . " FROM " . $this->getSqlFrom();
	}
	public function setSqlSelectGroup($v)
	{
		$this->_sqlSelectGroup = $v;
	}

	// Order By Group
	public function getSqlOrderByGroup()
	{
		return ($this->_sqlOrderByGroup <> "") ? $this->_sqlOrderByGroup : "`DEPARTMENT` ASC";
	}
	public function setSqlOrderByGroup($v)
	{
		$this->_sqlOrderByGroup = $v;
	}

	// Summary properties
	private $_sqlSelectAggregate = "";
	private $_sqlAggregatePrefix = "";
	private $_sqlAggregateSuffix = "";
	private $_sqlSelectCount = "";

	// Select Aggregate
	public function getSqlSelectAggregate()
	{
		return ($this->_sqlSelectAggregate <> "") ? $this->_sqlSelectAggregate : "SELECT COUNT(*) AS `cnt_testcount`, SUM(`SumAmount`) AS `sum_sumamount` FROM " . $this->getSqlFrom();
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

			$a = &$filter;
		if (strpos($a, 'createdDate') == false) {
			$datetime = date('Y-m-d', strtotime(' +1 day'));
			AddFilter($filter, "createddate between '".date('Y-m-d')."' and '".$datetime."' ");
		}
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