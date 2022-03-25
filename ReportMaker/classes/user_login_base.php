<?php
namespace PHPMaker2019\HIMS___2019;

/**
 * Table class for user_login
 */
class user_login_base extends ReportTable
{
	public $ShowGroupHeaderAsRow = FALSE;
	public $ShowCompactSummaryFooter = TRUE;
	public $id;
	public $User_Name;
	public $mail_id;
	public $mobile_no;
	public $password;
	public $email_verified;
	public $ReportTo;
	public $UserLevel;
	public $CreatedDateTime;
	public $profilefield;
	public $_UserID;
	public $GroupID;
	public $HospID;
	public $PharID;
	public $StoreID;

	// Constructor
	public function __construct()
	{
		global $ReportLanguage, $CurrentLanguage;

		// Language object
		if (!isset($ReportLanguage))
			$ReportLanguage = new ReportLanguage();
		$this->TableVar = 'user_login_base';
		$this->TableName = 'user_login';
		$this->TableType = 'TABLE';
		$this->TableReportType = 'rpt';
		$this->SourceTableIsCustomView = FALSE;
		$this->Dbid = 'DB';

		// Update Table (for Personal Data delete only)
		$this->UpdateTable = "`user_login`";
		$this->ExportAll = FALSE;
		$this->ExportPageBreakCount = 0;

		// id
		$this->id = new ReportField('user_login_base', 'user_login', 'x_id', 'id', '`id`', 3, -1, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->id->DateFilter = "";
		$this->fields['id'] = &$this->id;

		// User_Name
		$this->User_Name = new ReportField('user_login_base', 'user_login', 'x_User_Name', 'User_Name', '`User_Name`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->User_Name->Sortable = TRUE; // Allow sort
		$this->User_Name->DateFilter = "";
		$this->fields['User_Name'] = &$this->User_Name;

		// mail_id
		$this->mail_id = new ReportField('user_login_base', 'user_login', 'x_mail_id', 'mail_id', '`mail_id`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mail_id->Sortable = TRUE; // Allow sort
		$this->mail_id->DateFilter = "";
		$this->fields['mail_id'] = &$this->mail_id;

		// mobile_no
		$this->mobile_no = new ReportField('user_login_base', 'user_login', 'x_mobile_no', 'mobile_no', '`mobile_no`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mobile_no->Sortable = TRUE; // Allow sort
		$this->mobile_no->DateFilter = "";
		$this->fields['mobile_no'] = &$this->mobile_no;

		// password
		$this->password = new ReportField('user_login_base', 'user_login', 'x_password', 'password', '`password`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->password->Sortable = TRUE; // Allow sort
		$this->password->DateFilter = "";
		$this->fields['password'] = &$this->password;

		// email_verified
		$this->email_verified = new ReportField('user_login_base', 'user_login', 'x_email_verified', 'email_verified', '`email_verified`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->email_verified->Sortable = TRUE; // Allow sort
		$this->email_verified->DateFilter = "";
		$this->fields['email_verified'] = &$this->email_verified;

		// ReportTo
		$this->ReportTo = new ReportField('user_login_base', 'user_login', 'x_ReportTo', 'ReportTo', '`ReportTo`', 3, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReportTo->Sortable = TRUE; // Allow sort
		$this->ReportTo->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->ReportTo->DateFilter = "";
		$this->fields['ReportTo'] = &$this->ReportTo;

		// UserLevel
		$this->UserLevel = new ReportField('user_login_base', 'user_login', 'x_UserLevel', 'UserLevel', '`UserLevel`', 3, -1, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->UserLevel->Sortable = TRUE; // Allow sort
		$this->UserLevel->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->UserLevel->PleaseSelectText = $ReportLanguage->phrase("PleaseSelect"); // PleaseSelect text
		$this->UserLevel->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->UserLevel->DateFilter = "";
		$this->fields['UserLevel'] = &$this->UserLevel;

		// CreatedDateTime
		$this->CreatedDateTime = new ReportField('user_login_base', 'user_login', 'x_CreatedDateTime', 'CreatedDateTime', '`CreatedDateTime`', 135, 0, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CreatedDateTime->Sortable = TRUE; // Allow sort
		$this->CreatedDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $ReportLanguage->phrase("IncorrectDate"));
		$this->CreatedDateTime->DateFilter = "";
		$this->fields['CreatedDateTime'] = &$this->CreatedDateTime;

		// profilefield
		$this->profilefield = new ReportField('user_login_base', 'user_login', 'x_profilefield', 'profilefield', '`profilefield`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->profilefield->Sortable = TRUE; // Allow sort
		$this->profilefield->DateFilter = "";
		$this->fields['profilefield'] = &$this->profilefield;

		// UserID
		$this->_UserID = new ReportField('user_login_base', 'user_login', 'x__UserID', 'UserID', '`UserID`', 3, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_UserID->Sortable = TRUE; // Allow sort
		$this->_UserID->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->_UserID->DateFilter = "";
		$this->fields['UserID'] = &$this->_UserID;

		// GroupID
		$this->GroupID = new ReportField('user_login_base', 'user_login', 'x_GroupID', 'GroupID', '`GroupID`', 3, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->GroupID->Sortable = TRUE; // Allow sort
		$this->GroupID->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->GroupID->DateFilter = "";
		$this->fields['GroupID'] = &$this->GroupID;

		// HospID
		$this->HospID = new ReportField('user_login_base', 'user_login', 'x_HospID', 'HospID', '`HospID`', 3, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->HospID->DateFilter = "";
		$this->fields['HospID'] = &$this->HospID;

		// PharID
		$this->PharID = new ReportField('user_login_base', 'user_login', 'x_PharID', 'PharID', '`PharID`', 3, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PharID->Sortable = TRUE; // Allow sort
		$this->PharID->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->PharID->DateFilter = "";
		$this->fields['PharID'] = &$this->PharID;

		// StoreID
		$this->StoreID = new ReportField('user_login_base', 'user_login', 'x_StoreID', 'StoreID', '`StoreID`', 3, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->StoreID->Sortable = TRUE; // Allow sort
		$this->StoreID->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->StoreID->DateFilter = "";
		$this->fields['StoreID'] = &$this->StoreID;
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
		return ($this->_sqlFrom <> "") ? $this->_sqlFrom : "`user_login`";
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

	// Delete uploaded files (for Personal Data only)
	public function deleteUploadedFiles($row)
	{

		// Nothing to delete
		return TRUE;
	}

	// DELETE statement (for Personal Data only)
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

	// Delete (for Personal Data only)
	public function delete(&$rs, $where = "", $curfilter = FALSE)
	{
		$conn = &$this->getConnection();
		return $conn->execute($this->deleteSql($rs, $where, $curfilter));
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