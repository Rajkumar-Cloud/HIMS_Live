<?php
namespace PHPReportMaker12\HIMS___2019;

/**
 * Table class for view_dashboard_service_details
 */
class view_dashboard_service_details_base extends ReportTable
{
	public $ShowGroupHeaderAsRow = FALSE;
	public $ShowCompactSummaryFooter = TRUE;
	public $PatientId;
	public $PatientName;
	public $Services;
	public $amount;
	public $SubTotal;
	public $createdby;
	public $createddatetime;
	public $createdDate;
	public $DrName;
	public $DRDepartment;
	public $ItemCode;
	public $DEptCd;
	public $CODE;
	public $SERVICE;
	public $SERVICE_TYPE;
	public $DEPARTMENT;
	public $HospID;

	// Constructor
	public function __construct()
	{
		global $ReportLanguage, $CurrentLanguage;

		// Language object
		if (!isset($ReportLanguage))
			$ReportLanguage = new ReportLanguage();
		$this->TableVar = 'view_dashboard_service_details_base';
		$this->TableName = 'view_dashboard_service_details';
		$this->TableType = 'VIEW';
		$this->TableReportType = 'rpt';
		$this->SourceTableIsCustomView = FALSE;
		$this->Dbid = 'DB';
		$this->ExportAll = FALSE;
		$this->ExportPageBreakCount = 0;

		// PatientId
		$this->PatientId = new ReportField('view_dashboard_service_details_base', 'view_dashboard_service_details', 'x_PatientId', 'PatientId', '`PatientId`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientId->Sortable = TRUE; // Allow sort
		$this->PatientId->DateFilter = "";
		$this->fields['PatientId'] = &$this->PatientId;

		// PatientName
		$this->PatientName = new ReportField('view_dashboard_service_details_base', 'view_dashboard_service_details', 'x_PatientName', 'PatientName', '`PatientName`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientName->Sortable = TRUE; // Allow sort
		$this->PatientName->DateFilter = "";
		$this->fields['PatientName'] = &$this->PatientName;

		// Services
		$this->Services = new ReportField('view_dashboard_service_details_base', 'view_dashboard_service_details', 'x_Services', 'Services', '`Services`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Services->Sortable = TRUE; // Allow sort
		$this->Services->DateFilter = "";
		$this->fields['Services'] = &$this->Services;

		// amount
		$this->amount = new ReportField('view_dashboard_service_details_base', 'view_dashboard_service_details', 'x_amount', 'amount', '`amount`', 131, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->amount->Sortable = TRUE; // Allow sort
		$this->amount->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectFloat");
		$this->amount->DateFilter = "";
		$this->fields['amount'] = &$this->amount;

		// SubTotal
		$this->SubTotal = new ReportField('view_dashboard_service_details_base', 'view_dashboard_service_details', 'x_SubTotal', 'SubTotal', '`SubTotal`', 131, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SubTotal->Sortable = TRUE; // Allow sort
		$this->SubTotal->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectFloat");
		$this->SubTotal->DateFilter = "";
		$this->fields['SubTotal'] = &$this->SubTotal;

		// createdby
		$this->createdby = new ReportField('view_dashboard_service_details_base', 'view_dashboard_service_details', 'x_createdby', 'createdby', '`createdby`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdby->Sortable = TRUE; // Allow sort
		$this->createdby->DateFilter = "";
		$this->fields['createdby'] = &$this->createdby;

		// createddatetime
		$this->createddatetime = new ReportField('view_dashboard_service_details_base', 'view_dashboard_service_details', 'x_createddatetime', 'createddatetime', '`createddatetime`', 135, 0, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = TRUE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $ReportLanguage->phrase("IncorrectDate"));
		$this->createddatetime->DateFilter = "";
		$this->fields['createddatetime'] = &$this->createddatetime;

		// createdDate
		$this->createdDate = new ReportField('view_dashboard_service_details_base', 'view_dashboard_service_details', 'x_createdDate', 'createdDate', '`createdDate`', 133, 0, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdDate->Sortable = TRUE; // Allow sort
		$this->createdDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $ReportLanguage->phrase("IncorrectDate"));
		$this->createdDate->DateFilter = "";
		$this->fields['createdDate'] = &$this->createdDate;

		// DrName
		$this->DrName = new ReportField('view_dashboard_service_details_base', 'view_dashboard_service_details', 'x_DrName', 'DrName', '`DrName`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DrName->Sortable = TRUE; // Allow sort
		$this->DrName->DateFilter = "";
		$this->fields['DrName'] = &$this->DrName;

		// DRDepartment
		$this->DRDepartment = new ReportField('view_dashboard_service_details_base', 'view_dashboard_service_details', 'x_DRDepartment', 'DRDepartment', '`DRDepartment`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DRDepartment->Sortable = TRUE; // Allow sort
		$this->DRDepartment->DateFilter = "";
		$this->fields['DRDepartment'] = &$this->DRDepartment;

		// ItemCode
		$this->ItemCode = new ReportField('view_dashboard_service_details_base', 'view_dashboard_service_details', 'x_ItemCode', 'ItemCode', '`ItemCode`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ItemCode->Sortable = TRUE; // Allow sort
		$this->ItemCode->DateFilter = "";
		$this->fields['ItemCode'] = &$this->ItemCode;

		// DEptCd
		$this->DEptCd = new ReportField('view_dashboard_service_details_base', 'view_dashboard_service_details', 'x_DEptCd', 'DEptCd', '`DEptCd`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DEptCd->Sortable = TRUE; // Allow sort
		$this->DEptCd->DateFilter = "";
		$this->fields['DEptCd'] = &$this->DEptCd;

		// CODE
		$this->CODE = new ReportField('view_dashboard_service_details_base', 'view_dashboard_service_details', 'x_CODE', 'CODE', '`CODE`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CODE->Sortable = TRUE; // Allow sort
		$this->CODE->DateFilter = "";
		$this->fields['CODE'] = &$this->CODE;

		// SERVICE
		$this->SERVICE = new ReportField('view_dashboard_service_details_base', 'view_dashboard_service_details', 'x_SERVICE', 'SERVICE', '`SERVICE`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SERVICE->Sortable = TRUE; // Allow sort
		$this->SERVICE->DateFilter = "";
		$this->fields['SERVICE'] = &$this->SERVICE;

		// SERVICE_TYPE
		$this->SERVICE_TYPE = new ReportField('view_dashboard_service_details_base', 'view_dashboard_service_details', 'x_SERVICE_TYPE', 'SERVICE_TYPE', '`SERVICE_TYPE`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SERVICE_TYPE->Sortable = TRUE; // Allow sort
		$this->SERVICE_TYPE->DateFilter = "";
		$this->fields['SERVICE_TYPE'] = &$this->SERVICE_TYPE;

		// DEPARTMENT
		$this->DEPARTMENT = new ReportField('view_dashboard_service_details_base', 'view_dashboard_service_details', 'x_DEPARTMENT', 'DEPARTMENT', '`DEPARTMENT`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DEPARTMENT->Sortable = TRUE; // Allow sort
		$this->DEPARTMENT->DateFilter = "";
		$this->fields['DEPARTMENT'] = &$this->DEPARTMENT;

		// HospID
		$this->HospID = new ReportField('view_dashboard_service_details_base', 'view_dashboard_service_details', 'x_HospID', 'HospID', '`HospID`', 3, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->HospID->DateFilter = "";
		$this->fields['HospID'] = &$this->HospID;
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
		return ($this->_sqlFrom <> "") ? $this->_sqlFrom : "`view_dashboard_service_details`";
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
		$projectId = $PROJECT_ID;

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