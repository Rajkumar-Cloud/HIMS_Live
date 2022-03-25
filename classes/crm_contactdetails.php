<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for crm_contactdetails
 */
class crm_contactdetails extends DbTable
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
	public $contactid;
	public $contact_no;
	public $parentid;
	public $salutation;
	public $firstname;
	public $lastname;
	public $_email;
	public $phone;
	public $mobile;
	public $reportsto;
	public $training;
	public $usertype;
	public $contacttype;
	public $otheremail;
	public $donotcall;
	public $emailoptout;
	public $imagename;
	public $isconvertedfromlead;
	public $verification;
	public $secondary_email;
	public $notifilanguage;
	public $contactstatus;
	public $dav_status;
	public $jobtitle;
	public $decision_maker;
	public $sum_time;
	public $phone_extra;
	public $mobile_extra;
	public $approvals;
	public $gender;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'crm_contactdetails';
		$this->TableName = 'crm_contactdetails';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`crm_contactdetails`";
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

		// contactid
		$this->contactid = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_contactid', 'contactid', '`contactid`', '`contactid`', 3, -1, FALSE, '`contactid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->contactid->IsPrimaryKey = TRUE; // Primary key field
		$this->contactid->Nullable = FALSE; // NOT NULL field
		$this->contactid->Sortable = TRUE; // Allow sort
		$this->contactid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['contactid'] = &$this->contactid;

		// contact_no
		$this->contact_no = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_contact_no', 'contact_no', '`contact_no`', '`contact_no`', 200, -1, FALSE, '`contact_no`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->contact_no->Nullable = FALSE; // NOT NULL field
		$this->contact_no->Required = TRUE; // Required field
		$this->contact_no->Sortable = TRUE; // Allow sort
		$this->fields['contact_no'] = &$this->contact_no;

		// parentid
		$this->parentid = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_parentid', 'parentid', '`parentid`', '`parentid`', 3, -1, FALSE, '`parentid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->parentid->Sortable = TRUE; // Allow sort
		$this->parentid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['parentid'] = &$this->parentid;

		// salutation
		$this->salutation = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_salutation', 'salutation', '`salutation`', '`salutation`', 200, -1, FALSE, '`salutation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->salutation->Sortable = TRUE; // Allow sort
		$this->fields['salutation'] = &$this->salutation;

		// firstname
		$this->firstname = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_firstname', 'firstname', '`firstname`', '`firstname`', 200, -1, FALSE, '`firstname`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->firstname->Sortable = TRUE; // Allow sort
		$this->fields['firstname'] = &$this->firstname;

		// lastname
		$this->lastname = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_lastname', 'lastname', '`lastname`', '`lastname`', 200, -1, FALSE, '`lastname`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->lastname->Nullable = FALSE; // NOT NULL field
		$this->lastname->Required = TRUE; // Required field
		$this->lastname->Sortable = TRUE; // Allow sort
		$this->fields['lastname'] = &$this->lastname;

		// email
		$this->_email = new DbField('crm_contactdetails', 'crm_contactdetails', 'x__email', 'email', '`email`', '`email`', 200, -1, FALSE, '`email`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_email->Sortable = TRUE; // Allow sort
		$this->fields['email'] = &$this->_email;

		// phone
		$this->phone = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_phone', 'phone', '`phone`', '`phone`', 200, -1, FALSE, '`phone`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->phone->Sortable = TRUE; // Allow sort
		$this->fields['phone'] = &$this->phone;

		// mobile
		$this->mobile = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_mobile', 'mobile', '`mobile`', '`mobile`', 200, -1, FALSE, '`mobile`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mobile->Sortable = TRUE; // Allow sort
		$this->fields['mobile'] = &$this->mobile;

		// reportsto
		$this->reportsto = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_reportsto', 'reportsto', '`reportsto`', '`reportsto`', 3, -1, FALSE, '`reportsto`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->reportsto->Sortable = TRUE; // Allow sort
		$this->reportsto->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['reportsto'] = &$this->reportsto;

		// training
		$this->training = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_training', 'training', '`training`', '`training`', 200, -1, FALSE, '`training`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->training->Sortable = TRUE; // Allow sort
		$this->fields['training'] = &$this->training;

		// usertype
		$this->usertype = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_usertype', 'usertype', '`usertype`', '`usertype`', 200, -1, FALSE, '`usertype`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->usertype->Sortable = TRUE; // Allow sort
		$this->fields['usertype'] = &$this->usertype;

		// contacttype
		$this->contacttype = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_contacttype', 'contacttype', '`contacttype`', '`contacttype`', 200, -1, FALSE, '`contacttype`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->contacttype->Sortable = TRUE; // Allow sort
		$this->fields['contacttype'] = &$this->contacttype;

		// otheremail
		$this->otheremail = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_otheremail', 'otheremail', '`otheremail`', '`otheremail`', 200, -1, FALSE, '`otheremail`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->otheremail->Sortable = TRUE; // Allow sort
		$this->fields['otheremail'] = &$this->otheremail;

		// donotcall
		$this->donotcall = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_donotcall', 'donotcall', '`donotcall`', '`donotcall`', 2, -1, FALSE, '`donotcall`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->donotcall->Sortable = TRUE; // Allow sort
		$this->donotcall->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['donotcall'] = &$this->donotcall;

		// emailoptout
		$this->emailoptout = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_emailoptout', 'emailoptout', '`emailoptout`', '`emailoptout`', 2, -1, FALSE, '`emailoptout`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->emailoptout->Sortable = TRUE; // Allow sort
		$this->emailoptout->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['emailoptout'] = &$this->emailoptout;

		// imagename
		$this->imagename = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_imagename', 'imagename', '`imagename`', '`imagename`', 201, -1, FALSE, '`imagename`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->imagename->Sortable = TRUE; // Allow sort
		$this->fields['imagename'] = &$this->imagename;

		// isconvertedfromlead
		$this->isconvertedfromlead = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_isconvertedfromlead', 'isconvertedfromlead', '`isconvertedfromlead`', '`isconvertedfromlead`', 2, -1, FALSE, '`isconvertedfromlead`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->isconvertedfromlead->Sortable = TRUE; // Allow sort
		$this->isconvertedfromlead->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['isconvertedfromlead'] = &$this->isconvertedfromlead;

		// verification
		$this->verification = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_verification', 'verification', '`verification`', '`verification`', 201, -1, FALSE, '`verification`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->verification->Sortable = TRUE; // Allow sort
		$this->fields['verification'] = &$this->verification;

		// secondary_email
		$this->secondary_email = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_secondary_email', 'secondary_email', '`secondary_email`', '`secondary_email`', 200, -1, FALSE, '`secondary_email`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->secondary_email->Sortable = TRUE; // Allow sort
		$this->fields['secondary_email'] = &$this->secondary_email;

		// notifilanguage
		$this->notifilanguage = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_notifilanguage', 'notifilanguage', '`notifilanguage`', '`notifilanguage`', 200, -1, FALSE, '`notifilanguage`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->notifilanguage->Sortable = TRUE; // Allow sort
		$this->fields['notifilanguage'] = &$this->notifilanguage;

		// contactstatus
		$this->contactstatus = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_contactstatus', 'contactstatus', '`contactstatus`', '`contactstatus`', 200, -1, FALSE, '`contactstatus`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->contactstatus->Sortable = TRUE; // Allow sort
		$this->fields['contactstatus'] = &$this->contactstatus;

		// dav_status
		$this->dav_status = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_dav_status', 'dav_status', '`dav_status`', '`dav_status`', 16, -1, FALSE, '`dav_status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->dav_status->Sortable = TRUE; // Allow sort
		$this->dav_status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['dav_status'] = &$this->dav_status;

		// jobtitle
		$this->jobtitle = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_jobtitle', 'jobtitle', '`jobtitle`', '`jobtitle`', 200, -1, FALSE, '`jobtitle`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->jobtitle->Sortable = TRUE; // Allow sort
		$this->fields['jobtitle'] = &$this->jobtitle;

		// decision_maker
		$this->decision_maker = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_decision_maker', 'decision_maker', '`decision_maker`', '`decision_maker`', 16, -1, FALSE, '`decision_maker`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->decision_maker->Sortable = TRUE; // Allow sort
		$this->decision_maker->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['decision_maker'] = &$this->decision_maker;

		// sum_time
		$this->sum_time = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_sum_time', 'sum_time', '`sum_time`', '`sum_time`', 131, -1, FALSE, '`sum_time`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sum_time->Sortable = TRUE; // Allow sort
		$this->sum_time->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['sum_time'] = &$this->sum_time;

		// phone_extra
		$this->phone_extra = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_phone_extra', 'phone_extra', '`phone_extra`', '`phone_extra`', 200, -1, FALSE, '`phone_extra`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->phone_extra->Sortable = TRUE; // Allow sort
		$this->fields['phone_extra'] = &$this->phone_extra;

		// mobile_extra
		$this->mobile_extra = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_mobile_extra', 'mobile_extra', '`mobile_extra`', '`mobile_extra`', 200, -1, FALSE, '`mobile_extra`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mobile_extra->Sortable = TRUE; // Allow sort
		$this->fields['mobile_extra'] = &$this->mobile_extra;

		// approvals
		$this->approvals = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_approvals', 'approvals', '`approvals`', '`approvals`', 201, -1, FALSE, '`approvals`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->approvals->Sortable = TRUE; // Allow sort
		$this->fields['approvals'] = &$this->approvals;

		// gender
		$this->gender = new DbField('crm_contactdetails', 'crm_contactdetails', 'x_gender', 'gender', '`gender`', '`gender`', 200, -1, FALSE, '`gender`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->gender->Sortable = TRUE; // Allow sort
		$this->fields['gender'] = &$this->gender;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`crm_contactdetails`";
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
			if (array_key_exists('contactid', $rs))
				AddFilter($where, QuotedName('contactid', $this->Dbid) . '=' . QuotedValue($rs['contactid'], $this->contactid->DataType, $this->Dbid));
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
		$this->contactid->DbValue = $row['contactid'];
		$this->contact_no->DbValue = $row['contact_no'];
		$this->parentid->DbValue = $row['parentid'];
		$this->salutation->DbValue = $row['salutation'];
		$this->firstname->DbValue = $row['firstname'];
		$this->lastname->DbValue = $row['lastname'];
		$this->_email->DbValue = $row['email'];
		$this->phone->DbValue = $row['phone'];
		$this->mobile->DbValue = $row['mobile'];
		$this->reportsto->DbValue = $row['reportsto'];
		$this->training->DbValue = $row['training'];
		$this->usertype->DbValue = $row['usertype'];
		$this->contacttype->DbValue = $row['contacttype'];
		$this->otheremail->DbValue = $row['otheremail'];
		$this->donotcall->DbValue = $row['donotcall'];
		$this->emailoptout->DbValue = $row['emailoptout'];
		$this->imagename->DbValue = $row['imagename'];
		$this->isconvertedfromlead->DbValue = $row['isconvertedfromlead'];
		$this->verification->DbValue = $row['verification'];
		$this->secondary_email->DbValue = $row['secondary_email'];
		$this->notifilanguage->DbValue = $row['notifilanguage'];
		$this->contactstatus->DbValue = $row['contactstatus'];
		$this->dav_status->DbValue = $row['dav_status'];
		$this->jobtitle->DbValue = $row['jobtitle'];
		$this->decision_maker->DbValue = $row['decision_maker'];
		$this->sum_time->DbValue = $row['sum_time'];
		$this->phone_extra->DbValue = $row['phone_extra'];
		$this->mobile_extra->DbValue = $row['mobile_extra'];
		$this->approvals->DbValue = $row['approvals'];
		$this->gender->DbValue = $row['gender'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`contactid` = @contactid@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('contactid', $row) ? $row['contactid'] : NULL) : $this->contactid->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@contactid@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "crm_contactdetailslist.php";
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
		if ($pageName == "crm_contactdetailsview.php")
			return $Language->phrase("View");
		elseif ($pageName == "crm_contactdetailsedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "crm_contactdetailsadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "crm_contactdetailslist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("crm_contactdetailsview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("crm_contactdetailsview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "crm_contactdetailsadd.php?" . $this->getUrlParm($parm);
		else
			$url = "crm_contactdetailsadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("crm_contactdetailsedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("crm_contactdetailsadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("crm_contactdetailsdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "contactid:" . JsonEncode($this->contactid->CurrentValue, "number");
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
		if ($this->contactid->CurrentValue != NULL) {
			$url .= "contactid=" . urlencode($this->contactid->CurrentValue);
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
			if (Param("contactid") !== NULL)
				$arKeys[] = Param("contactid");
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
			$this->contactid->CurrentValue = $key;
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
		$this->contactid->setDbValue($rs->fields('contactid'));
		$this->contact_no->setDbValue($rs->fields('contact_no'));
		$this->parentid->setDbValue($rs->fields('parentid'));
		$this->salutation->setDbValue($rs->fields('salutation'));
		$this->firstname->setDbValue($rs->fields('firstname'));
		$this->lastname->setDbValue($rs->fields('lastname'));
		$this->_email->setDbValue($rs->fields('email'));
		$this->phone->setDbValue($rs->fields('phone'));
		$this->mobile->setDbValue($rs->fields('mobile'));
		$this->reportsto->setDbValue($rs->fields('reportsto'));
		$this->training->setDbValue($rs->fields('training'));
		$this->usertype->setDbValue($rs->fields('usertype'));
		$this->contacttype->setDbValue($rs->fields('contacttype'));
		$this->otheremail->setDbValue($rs->fields('otheremail'));
		$this->donotcall->setDbValue($rs->fields('donotcall'));
		$this->emailoptout->setDbValue($rs->fields('emailoptout'));
		$this->imagename->setDbValue($rs->fields('imagename'));
		$this->isconvertedfromlead->setDbValue($rs->fields('isconvertedfromlead'));
		$this->verification->setDbValue($rs->fields('verification'));
		$this->secondary_email->setDbValue($rs->fields('secondary_email'));
		$this->notifilanguage->setDbValue($rs->fields('notifilanguage'));
		$this->contactstatus->setDbValue($rs->fields('contactstatus'));
		$this->dav_status->setDbValue($rs->fields('dav_status'));
		$this->jobtitle->setDbValue($rs->fields('jobtitle'));
		$this->decision_maker->setDbValue($rs->fields('decision_maker'));
		$this->sum_time->setDbValue($rs->fields('sum_time'));
		$this->phone_extra->setDbValue($rs->fields('phone_extra'));
		$this->mobile_extra->setDbValue($rs->fields('mobile_extra'));
		$this->approvals->setDbValue($rs->fields('approvals'));
		$this->gender->setDbValue($rs->fields('gender'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// contactid
		// contact_no
		// parentid
		// salutation
		// firstname
		// lastname
		// email
		// phone
		// mobile
		// reportsto
		// training
		// usertype
		// contacttype
		// otheremail
		// donotcall
		// emailoptout
		// imagename
		// isconvertedfromlead
		// verification
		// secondary_email
		// notifilanguage
		// contactstatus
		// dav_status
		// jobtitle
		// decision_maker
		// sum_time
		// phone_extra
		// mobile_extra
		// approvals
		// gender
		// contactid

		$this->contactid->ViewValue = $this->contactid->CurrentValue;
		$this->contactid->ViewValue = FormatNumber($this->contactid->ViewValue, 0, -2, -2, -2);
		$this->contactid->ViewCustomAttributes = "";

		// contact_no
		$this->contact_no->ViewValue = $this->contact_no->CurrentValue;
		$this->contact_no->ViewCustomAttributes = "";

		// parentid
		$this->parentid->ViewValue = $this->parentid->CurrentValue;
		$this->parentid->ViewValue = FormatNumber($this->parentid->ViewValue, 0, -2, -2, -2);
		$this->parentid->ViewCustomAttributes = "";

		// salutation
		$this->salutation->ViewValue = $this->salutation->CurrentValue;
		$this->salutation->ViewCustomAttributes = "";

		// firstname
		$this->firstname->ViewValue = $this->firstname->CurrentValue;
		$this->firstname->ViewCustomAttributes = "";

		// lastname
		$this->lastname->ViewValue = $this->lastname->CurrentValue;
		$this->lastname->ViewCustomAttributes = "";

		// email
		$this->_email->ViewValue = $this->_email->CurrentValue;
		$this->_email->ViewCustomAttributes = "";

		// phone
		$this->phone->ViewValue = $this->phone->CurrentValue;
		$this->phone->ViewCustomAttributes = "";

		// mobile
		$this->mobile->ViewValue = $this->mobile->CurrentValue;
		$this->mobile->ViewCustomAttributes = "";

		// reportsto
		$this->reportsto->ViewValue = $this->reportsto->CurrentValue;
		$this->reportsto->ViewValue = FormatNumber($this->reportsto->ViewValue, 0, -2, -2, -2);
		$this->reportsto->ViewCustomAttributes = "";

		// training
		$this->training->ViewValue = $this->training->CurrentValue;
		$this->training->ViewCustomAttributes = "";

		// usertype
		$this->usertype->ViewValue = $this->usertype->CurrentValue;
		$this->usertype->ViewCustomAttributes = "";

		// contacttype
		$this->contacttype->ViewValue = $this->contacttype->CurrentValue;
		$this->contacttype->ViewCustomAttributes = "";

		// otheremail
		$this->otheremail->ViewValue = $this->otheremail->CurrentValue;
		$this->otheremail->ViewCustomAttributes = "";

		// donotcall
		$this->donotcall->ViewValue = $this->donotcall->CurrentValue;
		$this->donotcall->ViewValue = FormatNumber($this->donotcall->ViewValue, 0, -2, -2, -2);
		$this->donotcall->ViewCustomAttributes = "";

		// emailoptout
		$this->emailoptout->ViewValue = $this->emailoptout->CurrentValue;
		$this->emailoptout->ViewValue = FormatNumber($this->emailoptout->ViewValue, 0, -2, -2, -2);
		$this->emailoptout->ViewCustomAttributes = "";

		// imagename
		$this->imagename->ViewValue = $this->imagename->CurrentValue;
		$this->imagename->ViewCustomAttributes = "";

		// isconvertedfromlead
		$this->isconvertedfromlead->ViewValue = $this->isconvertedfromlead->CurrentValue;
		$this->isconvertedfromlead->ViewValue = FormatNumber($this->isconvertedfromlead->ViewValue, 0, -2, -2, -2);
		$this->isconvertedfromlead->ViewCustomAttributes = "";

		// verification
		$this->verification->ViewValue = $this->verification->CurrentValue;
		$this->verification->ViewCustomAttributes = "";

		// secondary_email
		$this->secondary_email->ViewValue = $this->secondary_email->CurrentValue;
		$this->secondary_email->ViewCustomAttributes = "";

		// notifilanguage
		$this->notifilanguage->ViewValue = $this->notifilanguage->CurrentValue;
		$this->notifilanguage->ViewCustomAttributes = "";

		// contactstatus
		$this->contactstatus->ViewValue = $this->contactstatus->CurrentValue;
		$this->contactstatus->ViewCustomAttributes = "";

		// dav_status
		$this->dav_status->ViewValue = $this->dav_status->CurrentValue;
		$this->dav_status->ViewValue = FormatNumber($this->dav_status->ViewValue, 0, -2, -2, -2);
		$this->dav_status->ViewCustomAttributes = "";

		// jobtitle
		$this->jobtitle->ViewValue = $this->jobtitle->CurrentValue;
		$this->jobtitle->ViewCustomAttributes = "";

		// decision_maker
		$this->decision_maker->ViewValue = $this->decision_maker->CurrentValue;
		$this->decision_maker->ViewValue = FormatNumber($this->decision_maker->ViewValue, 0, -2, -2, -2);
		$this->decision_maker->ViewCustomAttributes = "";

		// sum_time
		$this->sum_time->ViewValue = $this->sum_time->CurrentValue;
		$this->sum_time->ViewValue = FormatNumber($this->sum_time->ViewValue, 2, -2, -2, -2);
		$this->sum_time->ViewCustomAttributes = "";

		// phone_extra
		$this->phone_extra->ViewValue = $this->phone_extra->CurrentValue;
		$this->phone_extra->ViewCustomAttributes = "";

		// mobile_extra
		$this->mobile_extra->ViewValue = $this->mobile_extra->CurrentValue;
		$this->mobile_extra->ViewCustomAttributes = "";

		// approvals
		$this->approvals->ViewValue = $this->approvals->CurrentValue;
		$this->approvals->ViewCustomAttributes = "";

		// gender
		$this->gender->ViewValue = $this->gender->CurrentValue;
		$this->gender->ViewCustomAttributes = "";

		// contactid
		$this->contactid->LinkCustomAttributes = "";
		$this->contactid->HrefValue = "";
		$this->contactid->TooltipValue = "";

		// contact_no
		$this->contact_no->LinkCustomAttributes = "";
		$this->contact_no->HrefValue = "";
		$this->contact_no->TooltipValue = "";

		// parentid
		$this->parentid->LinkCustomAttributes = "";
		$this->parentid->HrefValue = "";
		$this->parentid->TooltipValue = "";

		// salutation
		$this->salutation->LinkCustomAttributes = "";
		$this->salutation->HrefValue = "";
		$this->salutation->TooltipValue = "";

		// firstname
		$this->firstname->LinkCustomAttributes = "";
		$this->firstname->HrefValue = "";
		$this->firstname->TooltipValue = "";

		// lastname
		$this->lastname->LinkCustomAttributes = "";
		$this->lastname->HrefValue = "";
		$this->lastname->TooltipValue = "";

		// email
		$this->_email->LinkCustomAttributes = "";
		$this->_email->HrefValue = "";
		$this->_email->TooltipValue = "";

		// phone
		$this->phone->LinkCustomAttributes = "";
		$this->phone->HrefValue = "";
		$this->phone->TooltipValue = "";

		// mobile
		$this->mobile->LinkCustomAttributes = "";
		$this->mobile->HrefValue = "";
		$this->mobile->TooltipValue = "";

		// reportsto
		$this->reportsto->LinkCustomAttributes = "";
		$this->reportsto->HrefValue = "";
		$this->reportsto->TooltipValue = "";

		// training
		$this->training->LinkCustomAttributes = "";
		$this->training->HrefValue = "";
		$this->training->TooltipValue = "";

		// usertype
		$this->usertype->LinkCustomAttributes = "";
		$this->usertype->HrefValue = "";
		$this->usertype->TooltipValue = "";

		// contacttype
		$this->contacttype->LinkCustomAttributes = "";
		$this->contacttype->HrefValue = "";
		$this->contacttype->TooltipValue = "";

		// otheremail
		$this->otheremail->LinkCustomAttributes = "";
		$this->otheremail->HrefValue = "";
		$this->otheremail->TooltipValue = "";

		// donotcall
		$this->donotcall->LinkCustomAttributes = "";
		$this->donotcall->HrefValue = "";
		$this->donotcall->TooltipValue = "";

		// emailoptout
		$this->emailoptout->LinkCustomAttributes = "";
		$this->emailoptout->HrefValue = "";
		$this->emailoptout->TooltipValue = "";

		// imagename
		$this->imagename->LinkCustomAttributes = "";
		$this->imagename->HrefValue = "";
		$this->imagename->TooltipValue = "";

		// isconvertedfromlead
		$this->isconvertedfromlead->LinkCustomAttributes = "";
		$this->isconvertedfromlead->HrefValue = "";
		$this->isconvertedfromlead->TooltipValue = "";

		// verification
		$this->verification->LinkCustomAttributes = "";
		$this->verification->HrefValue = "";
		$this->verification->TooltipValue = "";

		// secondary_email
		$this->secondary_email->LinkCustomAttributes = "";
		$this->secondary_email->HrefValue = "";
		$this->secondary_email->TooltipValue = "";

		// notifilanguage
		$this->notifilanguage->LinkCustomAttributes = "";
		$this->notifilanguage->HrefValue = "";
		$this->notifilanguage->TooltipValue = "";

		// contactstatus
		$this->contactstatus->LinkCustomAttributes = "";
		$this->contactstatus->HrefValue = "";
		$this->contactstatus->TooltipValue = "";

		// dav_status
		$this->dav_status->LinkCustomAttributes = "";
		$this->dav_status->HrefValue = "";
		$this->dav_status->TooltipValue = "";

		// jobtitle
		$this->jobtitle->LinkCustomAttributes = "";
		$this->jobtitle->HrefValue = "";
		$this->jobtitle->TooltipValue = "";

		// decision_maker
		$this->decision_maker->LinkCustomAttributes = "";
		$this->decision_maker->HrefValue = "";
		$this->decision_maker->TooltipValue = "";

		// sum_time
		$this->sum_time->LinkCustomAttributes = "";
		$this->sum_time->HrefValue = "";
		$this->sum_time->TooltipValue = "";

		// phone_extra
		$this->phone_extra->LinkCustomAttributes = "";
		$this->phone_extra->HrefValue = "";
		$this->phone_extra->TooltipValue = "";

		// mobile_extra
		$this->mobile_extra->LinkCustomAttributes = "";
		$this->mobile_extra->HrefValue = "";
		$this->mobile_extra->TooltipValue = "";

		// approvals
		$this->approvals->LinkCustomAttributes = "";
		$this->approvals->HrefValue = "";
		$this->approvals->TooltipValue = "";

		// gender
		$this->gender->LinkCustomAttributes = "";
		$this->gender->HrefValue = "";
		$this->gender->TooltipValue = "";

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

		// contactid
		$this->contactid->EditAttrs["class"] = "form-control";
		$this->contactid->EditCustomAttributes = "";
		$this->contactid->EditValue = $this->contactid->CurrentValue;
		$this->contactid->EditValue = FormatNumber($this->contactid->EditValue, 0, -2, -2, -2);
		$this->contactid->ViewCustomAttributes = "";

		// contact_no
		$this->contact_no->EditAttrs["class"] = "form-control";
		$this->contact_no->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->contact_no->CurrentValue = HtmlDecode($this->contact_no->CurrentValue);
		$this->contact_no->EditValue = $this->contact_no->CurrentValue;
		$this->contact_no->PlaceHolder = RemoveHtml($this->contact_no->caption());

		// parentid
		$this->parentid->EditAttrs["class"] = "form-control";
		$this->parentid->EditCustomAttributes = "";
		$this->parentid->EditValue = $this->parentid->CurrentValue;
		$this->parentid->PlaceHolder = RemoveHtml($this->parentid->caption());

		// salutation
		$this->salutation->EditAttrs["class"] = "form-control";
		$this->salutation->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->salutation->CurrentValue = HtmlDecode($this->salutation->CurrentValue);
		$this->salutation->EditValue = $this->salutation->CurrentValue;
		$this->salutation->PlaceHolder = RemoveHtml($this->salutation->caption());

		// firstname
		$this->firstname->EditAttrs["class"] = "form-control";
		$this->firstname->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->firstname->CurrentValue = HtmlDecode($this->firstname->CurrentValue);
		$this->firstname->EditValue = $this->firstname->CurrentValue;
		$this->firstname->PlaceHolder = RemoveHtml($this->firstname->caption());

		// lastname
		$this->lastname->EditAttrs["class"] = "form-control";
		$this->lastname->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->lastname->CurrentValue = HtmlDecode($this->lastname->CurrentValue);
		$this->lastname->EditValue = $this->lastname->CurrentValue;
		$this->lastname->PlaceHolder = RemoveHtml($this->lastname->caption());

		// email
		$this->_email->EditAttrs["class"] = "form-control";
		$this->_email->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->_email->CurrentValue = HtmlDecode($this->_email->CurrentValue);
		$this->_email->EditValue = $this->_email->CurrentValue;
		$this->_email->PlaceHolder = RemoveHtml($this->_email->caption());

		// phone
		$this->phone->EditAttrs["class"] = "form-control";
		$this->phone->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->phone->CurrentValue = HtmlDecode($this->phone->CurrentValue);
		$this->phone->EditValue = $this->phone->CurrentValue;
		$this->phone->PlaceHolder = RemoveHtml($this->phone->caption());

		// mobile
		$this->mobile->EditAttrs["class"] = "form-control";
		$this->mobile->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->mobile->CurrentValue = HtmlDecode($this->mobile->CurrentValue);
		$this->mobile->EditValue = $this->mobile->CurrentValue;
		$this->mobile->PlaceHolder = RemoveHtml($this->mobile->caption());

		// reportsto
		$this->reportsto->EditAttrs["class"] = "form-control";
		$this->reportsto->EditCustomAttributes = "";
		$this->reportsto->EditValue = $this->reportsto->CurrentValue;
		$this->reportsto->PlaceHolder = RemoveHtml($this->reportsto->caption());

		// training
		$this->training->EditAttrs["class"] = "form-control";
		$this->training->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->training->CurrentValue = HtmlDecode($this->training->CurrentValue);
		$this->training->EditValue = $this->training->CurrentValue;
		$this->training->PlaceHolder = RemoveHtml($this->training->caption());

		// usertype
		$this->usertype->EditAttrs["class"] = "form-control";
		$this->usertype->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->usertype->CurrentValue = HtmlDecode($this->usertype->CurrentValue);
		$this->usertype->EditValue = $this->usertype->CurrentValue;
		$this->usertype->PlaceHolder = RemoveHtml($this->usertype->caption());

		// contacttype
		$this->contacttype->EditAttrs["class"] = "form-control";
		$this->contacttype->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->contacttype->CurrentValue = HtmlDecode($this->contacttype->CurrentValue);
		$this->contacttype->EditValue = $this->contacttype->CurrentValue;
		$this->contacttype->PlaceHolder = RemoveHtml($this->contacttype->caption());

		// otheremail
		$this->otheremail->EditAttrs["class"] = "form-control";
		$this->otheremail->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->otheremail->CurrentValue = HtmlDecode($this->otheremail->CurrentValue);
		$this->otheremail->EditValue = $this->otheremail->CurrentValue;
		$this->otheremail->PlaceHolder = RemoveHtml($this->otheremail->caption());

		// donotcall
		$this->donotcall->EditAttrs["class"] = "form-control";
		$this->donotcall->EditCustomAttributes = "";
		$this->donotcall->EditValue = $this->donotcall->CurrentValue;
		$this->donotcall->PlaceHolder = RemoveHtml($this->donotcall->caption());

		// emailoptout
		$this->emailoptout->EditAttrs["class"] = "form-control";
		$this->emailoptout->EditCustomAttributes = "";
		$this->emailoptout->EditValue = $this->emailoptout->CurrentValue;
		$this->emailoptout->PlaceHolder = RemoveHtml($this->emailoptout->caption());

		// imagename
		$this->imagename->EditAttrs["class"] = "form-control";
		$this->imagename->EditCustomAttributes = "";
		$this->imagename->EditValue = $this->imagename->CurrentValue;
		$this->imagename->PlaceHolder = RemoveHtml($this->imagename->caption());

		// isconvertedfromlead
		$this->isconvertedfromlead->EditAttrs["class"] = "form-control";
		$this->isconvertedfromlead->EditCustomAttributes = "";
		$this->isconvertedfromlead->EditValue = $this->isconvertedfromlead->CurrentValue;
		$this->isconvertedfromlead->PlaceHolder = RemoveHtml($this->isconvertedfromlead->caption());

		// verification
		$this->verification->EditAttrs["class"] = "form-control";
		$this->verification->EditCustomAttributes = "";
		$this->verification->EditValue = $this->verification->CurrentValue;
		$this->verification->PlaceHolder = RemoveHtml($this->verification->caption());

		// secondary_email
		$this->secondary_email->EditAttrs["class"] = "form-control";
		$this->secondary_email->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->secondary_email->CurrentValue = HtmlDecode($this->secondary_email->CurrentValue);
		$this->secondary_email->EditValue = $this->secondary_email->CurrentValue;
		$this->secondary_email->PlaceHolder = RemoveHtml($this->secondary_email->caption());

		// notifilanguage
		$this->notifilanguage->EditAttrs["class"] = "form-control";
		$this->notifilanguage->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->notifilanguage->CurrentValue = HtmlDecode($this->notifilanguage->CurrentValue);
		$this->notifilanguage->EditValue = $this->notifilanguage->CurrentValue;
		$this->notifilanguage->PlaceHolder = RemoveHtml($this->notifilanguage->caption());

		// contactstatus
		$this->contactstatus->EditAttrs["class"] = "form-control";
		$this->contactstatus->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->contactstatus->CurrentValue = HtmlDecode($this->contactstatus->CurrentValue);
		$this->contactstatus->EditValue = $this->contactstatus->CurrentValue;
		$this->contactstatus->PlaceHolder = RemoveHtml($this->contactstatus->caption());

		// dav_status
		$this->dav_status->EditAttrs["class"] = "form-control";
		$this->dav_status->EditCustomAttributes = "";
		$this->dav_status->EditValue = $this->dav_status->CurrentValue;
		$this->dav_status->PlaceHolder = RemoveHtml($this->dav_status->caption());

		// jobtitle
		$this->jobtitle->EditAttrs["class"] = "form-control";
		$this->jobtitle->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->jobtitle->CurrentValue = HtmlDecode($this->jobtitle->CurrentValue);
		$this->jobtitle->EditValue = $this->jobtitle->CurrentValue;
		$this->jobtitle->PlaceHolder = RemoveHtml($this->jobtitle->caption());

		// decision_maker
		$this->decision_maker->EditAttrs["class"] = "form-control";
		$this->decision_maker->EditCustomAttributes = "";
		$this->decision_maker->EditValue = $this->decision_maker->CurrentValue;
		$this->decision_maker->PlaceHolder = RemoveHtml($this->decision_maker->caption());

		// sum_time
		$this->sum_time->EditAttrs["class"] = "form-control";
		$this->sum_time->EditCustomAttributes = "";
		$this->sum_time->EditValue = $this->sum_time->CurrentValue;
		$this->sum_time->PlaceHolder = RemoveHtml($this->sum_time->caption());
		if (strval($this->sum_time->EditValue) <> "" && is_numeric($this->sum_time->EditValue))
			$this->sum_time->EditValue = FormatNumber($this->sum_time->EditValue, -2, -2, -2, -2);

		// phone_extra
		$this->phone_extra->EditAttrs["class"] = "form-control";
		$this->phone_extra->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->phone_extra->CurrentValue = HtmlDecode($this->phone_extra->CurrentValue);
		$this->phone_extra->EditValue = $this->phone_extra->CurrentValue;
		$this->phone_extra->PlaceHolder = RemoveHtml($this->phone_extra->caption());

		// mobile_extra
		$this->mobile_extra->EditAttrs["class"] = "form-control";
		$this->mobile_extra->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->mobile_extra->CurrentValue = HtmlDecode($this->mobile_extra->CurrentValue);
		$this->mobile_extra->EditValue = $this->mobile_extra->CurrentValue;
		$this->mobile_extra->PlaceHolder = RemoveHtml($this->mobile_extra->caption());

		// approvals
		$this->approvals->EditAttrs["class"] = "form-control";
		$this->approvals->EditCustomAttributes = "";
		$this->approvals->EditValue = $this->approvals->CurrentValue;
		$this->approvals->PlaceHolder = RemoveHtml($this->approvals->caption());

		// gender
		$this->gender->EditAttrs["class"] = "form-control";
		$this->gender->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->gender->CurrentValue = HtmlDecode($this->gender->CurrentValue);
		$this->gender->EditValue = $this->gender->CurrentValue;
		$this->gender->PlaceHolder = RemoveHtml($this->gender->caption());

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
					$doc->exportCaption($this->contactid);
					$doc->exportCaption($this->contact_no);
					$doc->exportCaption($this->parentid);
					$doc->exportCaption($this->salutation);
					$doc->exportCaption($this->firstname);
					$doc->exportCaption($this->lastname);
					$doc->exportCaption($this->_email);
					$doc->exportCaption($this->phone);
					$doc->exportCaption($this->mobile);
					$doc->exportCaption($this->reportsto);
					$doc->exportCaption($this->training);
					$doc->exportCaption($this->usertype);
					$doc->exportCaption($this->contacttype);
					$doc->exportCaption($this->otheremail);
					$doc->exportCaption($this->donotcall);
					$doc->exportCaption($this->emailoptout);
					$doc->exportCaption($this->imagename);
					$doc->exportCaption($this->isconvertedfromlead);
					$doc->exportCaption($this->verification);
					$doc->exportCaption($this->secondary_email);
					$doc->exportCaption($this->notifilanguage);
					$doc->exportCaption($this->contactstatus);
					$doc->exportCaption($this->dav_status);
					$doc->exportCaption($this->jobtitle);
					$doc->exportCaption($this->decision_maker);
					$doc->exportCaption($this->sum_time);
					$doc->exportCaption($this->phone_extra);
					$doc->exportCaption($this->mobile_extra);
					$doc->exportCaption($this->approvals);
					$doc->exportCaption($this->gender);
				} else {
					$doc->exportCaption($this->contactid);
					$doc->exportCaption($this->contact_no);
					$doc->exportCaption($this->parentid);
					$doc->exportCaption($this->salutation);
					$doc->exportCaption($this->firstname);
					$doc->exportCaption($this->lastname);
					$doc->exportCaption($this->_email);
					$doc->exportCaption($this->phone);
					$doc->exportCaption($this->mobile);
					$doc->exportCaption($this->reportsto);
					$doc->exportCaption($this->training);
					$doc->exportCaption($this->usertype);
					$doc->exportCaption($this->contacttype);
					$doc->exportCaption($this->otheremail);
					$doc->exportCaption($this->donotcall);
					$doc->exportCaption($this->emailoptout);
					$doc->exportCaption($this->isconvertedfromlead);
					$doc->exportCaption($this->secondary_email);
					$doc->exportCaption($this->notifilanguage);
					$doc->exportCaption($this->contactstatus);
					$doc->exportCaption($this->dav_status);
					$doc->exportCaption($this->jobtitle);
					$doc->exportCaption($this->decision_maker);
					$doc->exportCaption($this->sum_time);
					$doc->exportCaption($this->phone_extra);
					$doc->exportCaption($this->mobile_extra);
					$doc->exportCaption($this->gender);
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
						$doc->exportField($this->contactid);
						$doc->exportField($this->contact_no);
						$doc->exportField($this->parentid);
						$doc->exportField($this->salutation);
						$doc->exportField($this->firstname);
						$doc->exportField($this->lastname);
						$doc->exportField($this->_email);
						$doc->exportField($this->phone);
						$doc->exportField($this->mobile);
						$doc->exportField($this->reportsto);
						$doc->exportField($this->training);
						$doc->exportField($this->usertype);
						$doc->exportField($this->contacttype);
						$doc->exportField($this->otheremail);
						$doc->exportField($this->donotcall);
						$doc->exportField($this->emailoptout);
						$doc->exportField($this->imagename);
						$doc->exportField($this->isconvertedfromlead);
						$doc->exportField($this->verification);
						$doc->exportField($this->secondary_email);
						$doc->exportField($this->notifilanguage);
						$doc->exportField($this->contactstatus);
						$doc->exportField($this->dav_status);
						$doc->exportField($this->jobtitle);
						$doc->exportField($this->decision_maker);
						$doc->exportField($this->sum_time);
						$doc->exportField($this->phone_extra);
						$doc->exportField($this->mobile_extra);
						$doc->exportField($this->approvals);
						$doc->exportField($this->gender);
					} else {
						$doc->exportField($this->contactid);
						$doc->exportField($this->contact_no);
						$doc->exportField($this->parentid);
						$doc->exportField($this->salutation);
						$doc->exportField($this->firstname);
						$doc->exportField($this->lastname);
						$doc->exportField($this->_email);
						$doc->exportField($this->phone);
						$doc->exportField($this->mobile);
						$doc->exportField($this->reportsto);
						$doc->exportField($this->training);
						$doc->exportField($this->usertype);
						$doc->exportField($this->contacttype);
						$doc->exportField($this->otheremail);
						$doc->exportField($this->donotcall);
						$doc->exportField($this->emailoptout);
						$doc->exportField($this->isconvertedfromlead);
						$doc->exportField($this->secondary_email);
						$doc->exportField($this->notifilanguage);
						$doc->exportField($this->contactstatus);
						$doc->exportField($this->dav_status);
						$doc->exportField($this->jobtitle);
						$doc->exportField($this->decision_maker);
						$doc->exportField($this->sum_time);
						$doc->exportField($this->phone_extra);
						$doc->exportField($this->mobile_extra);
						$doc->exportField($this->gender);
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