<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for view_opd_follow_up
 */
class view_opd_follow_up extends DbTable
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
	public $Reception;
	public $PatientId;
	public $mrnno;
	public $PatientName;
	public $Telephone;
	public $Age;
	public $Gender;
	public $profilePic;
	public $procedurenotes;
	public $NextReviewDate;
	public $ICSIAdvised;
	public $DeliveryRegistered;
	public $EDD;
	public $SerologyPositive;
	public $Allergy;
	public $status;
	public $createdby;
	public $createddatetime;
	public $modifiedby;
	public $modifieddatetime;
	public $LMP;
	public $Procedure;
	public $ProcedureDateTime;
	public $ICSIDate;
	public $RIDNo;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'view_opd_follow_up';
		$this->TableName = 'view_opd_follow_up';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`view_opd_follow_up`";
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

		// id
		$this->id = new DbField('view_opd_follow_up', 'view_opd_follow_up', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// Reception
		$this->Reception = new DbField('view_opd_follow_up', 'view_opd_follow_up', 'x_Reception', 'Reception', '`Reception`', '`Reception`', 200, 45, -1, FALSE, '`Reception`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Reception->Sortable = TRUE; // Allow sort
		$this->fields['Reception'] = &$this->Reception;

		// PatientId
		$this->PatientId = new DbField('view_opd_follow_up', 'view_opd_follow_up', 'x_PatientId', 'PatientId', '`PatientId`', '`PatientId`', 3, 11, -1, FALSE, '`PatientId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientId->Nullable = FALSE; // NOT NULL field
		$this->PatientId->Required = TRUE; // Required field
		$this->PatientId->Sortable = TRUE; // Allow sort
		$this->fields['PatientId'] = &$this->PatientId;

		// mrnno
		$this->mrnno = new DbField('view_opd_follow_up', 'view_opd_follow_up', 'x_mrnno', 'mrnno', '`mrnno`', '`mrnno`', 200, 45, -1, FALSE, '`mrnno`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mrnno->Sortable = TRUE; // Allow sort
		$this->fields['mrnno'] = &$this->mrnno;

		// PatientName
		$this->PatientName = new DbField('view_opd_follow_up', 'view_opd_follow_up', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, FALSE, '`PatientName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientName->Nullable = FALSE; // NOT NULL field
		$this->PatientName->Required = TRUE; // Required field
		$this->PatientName->Sortable = TRUE; // Allow sort
		$this->fields['PatientName'] = &$this->PatientName;

		// Telephone
		$this->Telephone = new DbField('view_opd_follow_up', 'view_opd_follow_up', 'x_Telephone', 'Telephone', '`Telephone`', '`Telephone`', 200, 45, -1, FALSE, '`Telephone`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Telephone->Sortable = TRUE; // Allow sort
		$this->fields['Telephone'] = &$this->Telephone;

		// Age
		$this->Age = new DbField('view_opd_follow_up', 'view_opd_follow_up', 'x_Age', 'Age', '`Age`', '`Age`', 200, 45, -1, FALSE, '`Age`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Age->Sortable = TRUE; // Allow sort
		$this->fields['Age'] = &$this->Age;

		// Gender
		$this->Gender = new DbField('view_opd_follow_up', 'view_opd_follow_up', 'x_Gender', 'Gender', '`Gender`', '`Gender`', 200, 45, -1, FALSE, '`Gender`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Gender->Nullable = FALSE; // NOT NULL field
		$this->Gender->Required = TRUE; // Required field
		$this->Gender->Sortable = TRUE; // Allow sort
		$this->fields['Gender'] = &$this->Gender;

		// profilePic
		$this->profilePic = new DbField('view_opd_follow_up', 'view_opd_follow_up', 'x_profilePic', 'profilePic', '`profilePic`', '`profilePic`', 201, 450, -1, FALSE, '`profilePic`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->profilePic->Sortable = TRUE; // Allow sort
		$this->fields['profilePic'] = &$this->profilePic;

		// procedurenotes
		$this->procedurenotes = new DbField('view_opd_follow_up', 'view_opd_follow_up', 'x_procedurenotes', 'procedurenotes', '`procedurenotes`', '`procedurenotes`', 201, -1, -1, FALSE, '`procedurenotes`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->procedurenotes->Sortable = TRUE; // Allow sort
		$this->fields['procedurenotes'] = &$this->procedurenotes;

		// NextReviewDate
		$this->NextReviewDate = new DbField('view_opd_follow_up', 'view_opd_follow_up', 'x_NextReviewDate', 'NextReviewDate', '`NextReviewDate`', CastDateFieldForLike("`NextReviewDate`", 0, "DB"), 135, 19, 0, FALSE, '`NextReviewDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NextReviewDate->Sortable = TRUE; // Allow sort
		$this->NextReviewDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['NextReviewDate'] = &$this->NextReviewDate;

		// ICSIAdvised
		$this->ICSIAdvised = new DbField('view_opd_follow_up', 'view_opd_follow_up', 'x_ICSIAdvised', 'ICSIAdvised', '`ICSIAdvised`', '`ICSIAdvised`', 200, 45, -1, FALSE, '`ICSIAdvised`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->ICSIAdvised->Sortable = TRUE; // Allow sort
		$this->ICSIAdvised->Lookup = new Lookup('ICSIAdvised', 'view_opd_follow_up', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->ICSIAdvised->OptionCount = 4;
		$this->fields['ICSIAdvised'] = &$this->ICSIAdvised;

		// DeliveryRegistered
		$this->DeliveryRegistered = new DbField('view_opd_follow_up', 'view_opd_follow_up', 'x_DeliveryRegistered', 'DeliveryRegistered', '`DeliveryRegistered`', '`DeliveryRegistered`', 200, 45, -1, FALSE, '`DeliveryRegistered`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->DeliveryRegistered->Sortable = TRUE; // Allow sort
		$this->DeliveryRegistered->Lookup = new Lookup('DeliveryRegistered', 'view_opd_follow_up', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->DeliveryRegistered->OptionCount = 1;
		$this->fields['DeliveryRegistered'] = &$this->DeliveryRegistered;

		// EDD
		$this->EDD = new DbField('view_opd_follow_up', 'view_opd_follow_up', 'x_EDD', 'EDD', '`EDD`', CastDateFieldForLike("`EDD`", 0, "DB"), 135, 19, 0, FALSE, '`EDD`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->EDD->Sortable = TRUE; // Allow sort
		$this->EDD->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['EDD'] = &$this->EDD;

		// SerologyPositive
		$this->SerologyPositive = new DbField('view_opd_follow_up', 'view_opd_follow_up', 'x_SerologyPositive', 'SerologyPositive', '`SerologyPositive`', '`SerologyPositive`', 200, 45, -1, FALSE, '`SerologyPositive`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->SerologyPositive->Sortable = TRUE; // Allow sort
		$this->SerologyPositive->Lookup = new Lookup('SerologyPositive', 'view_opd_follow_up', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->SerologyPositive->OptionCount = 1;
		$this->fields['SerologyPositive'] = &$this->SerologyPositive;

		// Allergy
		$this->Allergy = new DbField('view_opd_follow_up', 'view_opd_follow_up', 'x_Allergy', 'Allergy', '`Allergy`', '`Allergy`', 200, 45, -1, FALSE, '`Allergy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Allergy->Sortable = TRUE; // Allow sort
		$this->Allergy->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Allergy->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Allergy->Lookup = new Lookup('Allergy', 'pres_mas_generic', FALSE, 'Generic', ["Generic","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Allergy'] = &$this->Allergy;

		// status
		$this->status = new DbField('view_opd_follow_up', 'view_opd_follow_up', 'x_status', 'status', '`status`', '`status`', 3, 11, -1, FALSE, '`status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->status->Nullable = FALSE; // NOT NULL field
		$this->status->Required = TRUE; // Required field
		$this->status->Sortable = TRUE; // Allow sort
		$this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['status'] = &$this->status;

		// createdby
		$this->createdby = new DbField('view_opd_follow_up', 'view_opd_follow_up', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, 11, -1, FALSE, '`createdby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdby->Sortable = TRUE; // Allow sort
		$this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['createdby'] = &$this->createdby;

		// createddatetime
		$this->createddatetime = new DbField('view_opd_follow_up', 'view_opd_follow_up', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, FALSE, '`createddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = TRUE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['createddatetime'] = &$this->createddatetime;

		// modifiedby
		$this->modifiedby = new DbField('view_opd_follow_up', 'view_opd_follow_up', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, 11, -1, FALSE, '`modifiedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifiedby->Sortable = TRUE; // Allow sort
		$this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['modifiedby'] = &$this->modifiedby;

		// modifieddatetime
		$this->modifieddatetime = new DbField('view_opd_follow_up', 'view_opd_follow_up', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, FALSE, '`modifieddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifieddatetime->Sortable = TRUE; // Allow sort
		$this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['modifieddatetime'] = &$this->modifieddatetime;

		// LMP
		$this->LMP = new DbField('view_opd_follow_up', 'view_opd_follow_up', 'x_LMP', 'LMP', '`LMP`', CastDateFieldForLike("`LMP`", 0, "DB"), 135, 19, 0, FALSE, '`LMP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->LMP->Sortable = TRUE; // Allow sort
		$this->LMP->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['LMP'] = &$this->LMP;

		// Procedure
		$this->Procedure = new DbField('view_opd_follow_up', 'view_opd_follow_up', 'x_Procedure', 'Procedure', '`Procedure`', '`Procedure`', 201, 450, -1, FALSE, '`Procedure`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Procedure->Sortable = TRUE; // Allow sort
		$this->fields['Procedure'] = &$this->Procedure;

		// ProcedureDateTime
		$this->ProcedureDateTime = new DbField('view_opd_follow_up', 'view_opd_follow_up', 'x_ProcedureDateTime', 'ProcedureDateTime', '`ProcedureDateTime`', CastDateFieldForLike("`ProcedureDateTime`", 0, "DB"), 135, 19, 0, FALSE, '`ProcedureDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ProcedureDateTime->Sortable = TRUE; // Allow sort
		$this->ProcedureDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['ProcedureDateTime'] = &$this->ProcedureDateTime;

		// ICSIDate
		$this->ICSIDate = new DbField('view_opd_follow_up', 'view_opd_follow_up', 'x_ICSIDate', 'ICSIDate', '`ICSIDate`', CastDateFieldForLike("`ICSIDate`", 0, "DB"), 135, 19, 0, FALSE, '`ICSIDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ICSIDate->Sortable = TRUE; // Allow sort
		$this->ICSIDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['ICSIDate'] = &$this->ICSIDate;

		// RIDNo
		$this->RIDNo = new DbField('view_opd_follow_up', 'view_opd_follow_up', 'x_RIDNo', 'RIDNo', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->RIDNo->IsCustom = TRUE; // Custom field
		$this->RIDNo->Sortable = TRUE; // Allow sort
		$this->fields['RIDNo'] = &$this->RIDNo;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_opd_follow_up`";
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
		return ($this->SqlSelect != "") ? $this->SqlSelect : "SELECT *, '' AS `RIDNo` FROM " . $this->getSqlFrom();
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
		return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : "`id` DESC";
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
		$this->id->DbValue = $row['id'];
		$this->Reception->DbValue = $row['Reception'];
		$this->PatientId->DbValue = $row['PatientId'];
		$this->mrnno->DbValue = $row['mrnno'];
		$this->PatientName->DbValue = $row['PatientName'];
		$this->Telephone->DbValue = $row['Telephone'];
		$this->Age->DbValue = $row['Age'];
		$this->Gender->DbValue = $row['Gender'];
		$this->profilePic->DbValue = $row['profilePic'];
		$this->procedurenotes->DbValue = $row['procedurenotes'];
		$this->NextReviewDate->DbValue = $row['NextReviewDate'];
		$this->ICSIAdvised->DbValue = $row['ICSIAdvised'];
		$this->DeliveryRegistered->DbValue = $row['DeliveryRegistered'];
		$this->EDD->DbValue = $row['EDD'];
		$this->SerologyPositive->DbValue = $row['SerologyPositive'];
		$this->Allergy->DbValue = $row['Allergy'];
		$this->status->DbValue = $row['status'];
		$this->createdby->DbValue = $row['createdby'];
		$this->createddatetime->DbValue = $row['createddatetime'];
		$this->modifiedby->DbValue = $row['modifiedby'];
		$this->modifieddatetime->DbValue = $row['modifieddatetime'];
		$this->LMP->DbValue = $row['LMP'];
		$this->Procedure->DbValue = $row['Procedure'];
		$this->ProcedureDateTime->DbValue = $row['ProcedureDateTime'];
		$this->ICSIDate->DbValue = $row['ICSIDate'];
		$this->RIDNo->DbValue = $row['RIDNo'];
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
			return "view_opd_follow_uplist.php";
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
		if ($pageName == "view_opd_follow_upview.php")
			return $Language->phrase("View");
		elseif ($pageName == "view_opd_follow_upedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "view_opd_follow_upadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "view_opd_follow_uplist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("view_opd_follow_upview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_opd_follow_upview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "view_opd_follow_upadd.php?" . $this->getUrlParm($parm);
		else
			$url = "view_opd_follow_upadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("view_opd_follow_upedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("view_opd_follow_upadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("view_opd_follow_updelete.php", $this->getUrlParm());
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
		$this->id->setDbValue($rs->fields('id'));
		$this->Reception->setDbValue($rs->fields('Reception'));
		$this->PatientId->setDbValue($rs->fields('PatientId'));
		$this->mrnno->setDbValue($rs->fields('mrnno'));
		$this->PatientName->setDbValue($rs->fields('PatientName'));
		$this->Telephone->setDbValue($rs->fields('Telephone'));
		$this->Age->setDbValue($rs->fields('Age'));
		$this->Gender->setDbValue($rs->fields('Gender'));
		$this->profilePic->setDbValue($rs->fields('profilePic'));
		$this->procedurenotes->setDbValue($rs->fields('procedurenotes'));
		$this->NextReviewDate->setDbValue($rs->fields('NextReviewDate'));
		$this->ICSIAdvised->setDbValue($rs->fields('ICSIAdvised'));
		$this->DeliveryRegistered->setDbValue($rs->fields('DeliveryRegistered'));
		$this->EDD->setDbValue($rs->fields('EDD'));
		$this->SerologyPositive->setDbValue($rs->fields('SerologyPositive'));
		$this->Allergy->setDbValue($rs->fields('Allergy'));
		$this->status->setDbValue($rs->fields('status'));
		$this->createdby->setDbValue($rs->fields('createdby'));
		$this->createddatetime->setDbValue($rs->fields('createddatetime'));
		$this->modifiedby->setDbValue($rs->fields('modifiedby'));
		$this->modifieddatetime->setDbValue($rs->fields('modifieddatetime'));
		$this->LMP->setDbValue($rs->fields('LMP'));
		$this->Procedure->setDbValue($rs->fields('Procedure'));
		$this->ProcedureDateTime->setDbValue($rs->fields('ProcedureDateTime'));
		$this->ICSIDate->setDbValue($rs->fields('ICSIDate'));
		$this->RIDNo->setDbValue($rs->fields('RIDNo'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// Reception
		// PatientId
		// mrnno
		// PatientName
		// Telephone
		// Age
		// Gender
		// profilePic
		// procedurenotes
		// NextReviewDate
		// ICSIAdvised
		// DeliveryRegistered
		// EDD
		// SerologyPositive
		// Allergy
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// LMP
		// Procedure
		// ProcedureDateTime
		// ICSIDate
		// RIDNo
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// Reception
		$this->Reception->ViewValue = $this->Reception->CurrentValue;
		$this->Reception->ViewCustomAttributes = "";

		// PatientId
		$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
		$this->PatientId->ViewCustomAttributes = "";

		// mrnno
		$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
		$this->mrnno->ViewCustomAttributes = "";

		// PatientName
		$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
		$this->PatientName->ViewCustomAttributes = "";

		// Telephone
		$this->Telephone->ViewValue = $this->Telephone->CurrentValue;
		$this->Telephone->ViewCustomAttributes = "";

		// Age
		$this->Age->ViewValue = $this->Age->CurrentValue;
		$this->Age->ViewCustomAttributes = "";

		// Gender
		$this->Gender->ViewValue = $this->Gender->CurrentValue;
		$this->Gender->ViewCustomAttributes = "";

		// profilePic
		$this->profilePic->ViewValue = $this->profilePic->CurrentValue;
		$this->profilePic->ViewCustomAttributes = "";

		// procedurenotes
		$this->procedurenotes->ViewValue = $this->procedurenotes->CurrentValue;
		$this->procedurenotes->ViewCustomAttributes = "";

		// NextReviewDate
		$this->NextReviewDate->ViewValue = $this->NextReviewDate->CurrentValue;
		$this->NextReviewDate->ViewValue = FormatDateTime($this->NextReviewDate->ViewValue, 0);
		$this->NextReviewDate->ViewCustomAttributes = "";

		// ICSIAdvised
		if (strval($this->ICSIAdvised->CurrentValue) != "") {
			$this->ICSIAdvised->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->ICSIAdvised->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->ICSIAdvised->ViewValue->add($this->ICSIAdvised->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->ICSIAdvised->ViewValue = NULL;
		}
		$this->ICSIAdvised->ViewCustomAttributes = "";

		// DeliveryRegistered
		if (strval($this->DeliveryRegistered->CurrentValue) != "") {
			$this->DeliveryRegistered->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->DeliveryRegistered->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->DeliveryRegistered->ViewValue->add($this->DeliveryRegistered->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->DeliveryRegistered->ViewValue = NULL;
		}
		$this->DeliveryRegistered->ViewCustomAttributes = "";

		// EDD
		$this->EDD->ViewValue = $this->EDD->CurrentValue;
		$this->EDD->ViewValue = FormatDateTime($this->EDD->ViewValue, 0);
		$this->EDD->ViewCustomAttributes = "";

		// SerologyPositive
		if (strval($this->SerologyPositive->CurrentValue) != "") {
			$this->SerologyPositive->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->SerologyPositive->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->SerologyPositive->ViewValue->add($this->SerologyPositive->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->SerologyPositive->ViewValue = NULL;
		}
		$this->SerologyPositive->ViewCustomAttributes = "";

		// Allergy
		$curVal = strval($this->Allergy->CurrentValue);
		if ($curVal != "") {
			$this->Allergy->ViewValue = $this->Allergy->lookupCacheOption($curVal);
			if ($this->Allergy->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->Allergy->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->Allergy->ViewValue = $this->Allergy->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Allergy->ViewValue = $this->Allergy->CurrentValue;
				}
			}
		} else {
			$this->Allergy->ViewValue = NULL;
		}
		$this->Allergy->ViewCustomAttributes = "";

		// status
		$this->status->ViewValue = $this->status->CurrentValue;
		$this->status->ViewValue = FormatNumber($this->status->ViewValue, 0, -2, -2, -2);
		$this->status->ViewCustomAttributes = "";

		// createdby
		$this->createdby->ViewValue = $this->createdby->CurrentValue;
		$this->createdby->ViewValue = FormatNumber($this->createdby->ViewValue, 0, -2, -2, -2);
		$this->createdby->ViewCustomAttributes = "";

		// createddatetime
		$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
		$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
		$this->createddatetime->ViewCustomAttributes = "";

		// modifiedby
		$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
		$this->modifiedby->ViewValue = FormatNumber($this->modifiedby->ViewValue, 0, -2, -2, -2);
		$this->modifiedby->ViewCustomAttributes = "";

		// modifieddatetime
		$this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
		$this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
		$this->modifieddatetime->ViewCustomAttributes = "";

		// LMP
		$this->LMP->ViewValue = $this->LMP->CurrentValue;
		$this->LMP->ViewValue = FormatDateTime($this->LMP->ViewValue, 0);
		$this->LMP->ViewCustomAttributes = "";

		// Procedure
		$this->Procedure->ViewValue = $this->Procedure->CurrentValue;
		$this->Procedure->ViewCustomAttributes = "";

		// ProcedureDateTime
		$this->ProcedureDateTime->ViewValue = $this->ProcedureDateTime->CurrentValue;
		$this->ProcedureDateTime->ViewValue = FormatDateTime($this->ProcedureDateTime->ViewValue, 0);
		$this->ProcedureDateTime->ViewCustomAttributes = "";

		// ICSIDate
		$this->ICSIDate->ViewValue = $this->ICSIDate->CurrentValue;
		$this->ICSIDate->ViewValue = FormatDateTime($this->ICSIDate->ViewValue, 0);
		$this->ICSIDate->ViewCustomAttributes = "";

		// RIDNo
		$this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
		$this->RIDNo->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// Reception
		$this->Reception->LinkCustomAttributes = "";
		$this->Reception->HrefValue = "";
		$this->Reception->TooltipValue = "";

		// PatientId
		$this->PatientId->LinkCustomAttributes = "";
		$this->PatientId->HrefValue = "";
		$this->PatientId->TooltipValue = "";

		// mrnno
		$this->mrnno->LinkCustomAttributes = "";
		$this->mrnno->HrefValue = "";
		$this->mrnno->TooltipValue = "";

		// PatientName
		$this->PatientName->LinkCustomAttributes = "";
		$this->PatientName->HrefValue = "";
		$this->PatientName->TooltipValue = "";

		// Telephone
		$this->Telephone->LinkCustomAttributes = "";
		$this->Telephone->HrefValue = "";
		$this->Telephone->TooltipValue = "";

		// Age
		$this->Age->LinkCustomAttributes = "";
		$this->Age->HrefValue = "";
		$this->Age->TooltipValue = "";

		// Gender
		$this->Gender->LinkCustomAttributes = "";
		$this->Gender->HrefValue = "";
		$this->Gender->TooltipValue = "";

		// profilePic
		$this->profilePic->LinkCustomAttributes = "";
		$this->profilePic->HrefValue = "";
		$this->profilePic->TooltipValue = "";

		// procedurenotes
		$this->procedurenotes->LinkCustomAttributes = "";
		$this->procedurenotes->HrefValue = "";
		$this->procedurenotes->TooltipValue = "";

		// NextReviewDate
		$this->NextReviewDate->LinkCustomAttributes = "";
		$this->NextReviewDate->HrefValue = "";
		$this->NextReviewDate->TooltipValue = "";

		// ICSIAdvised
		$this->ICSIAdvised->LinkCustomAttributes = "";
		$this->ICSIAdvised->HrefValue = "";
		$this->ICSIAdvised->TooltipValue = "";

		// DeliveryRegistered
		$this->DeliveryRegistered->LinkCustomAttributes = "";
		$this->DeliveryRegistered->HrefValue = "";
		$this->DeliveryRegistered->TooltipValue = "";

		// EDD
		$this->EDD->LinkCustomAttributes = "";
		$this->EDD->HrefValue = "";
		$this->EDD->TooltipValue = "";

		// SerologyPositive
		$this->SerologyPositive->LinkCustomAttributes = "";
		$this->SerologyPositive->HrefValue = "";
		$this->SerologyPositive->TooltipValue = "";

		// Allergy
		$this->Allergy->LinkCustomAttributes = "";
		$this->Allergy->HrefValue = "";
		$this->Allergy->TooltipValue = "";

		// status
		$this->status->LinkCustomAttributes = "";
		$this->status->HrefValue = "";
		$this->status->TooltipValue = "";

		// createdby
		$this->createdby->LinkCustomAttributes = "";
		$this->createdby->HrefValue = "";
		$this->createdby->TooltipValue = "";

		// createddatetime
		$this->createddatetime->LinkCustomAttributes = "";
		$this->createddatetime->HrefValue = "";
		$this->createddatetime->TooltipValue = "";

		// modifiedby
		$this->modifiedby->LinkCustomAttributes = "";
		$this->modifiedby->HrefValue = "";
		$this->modifiedby->TooltipValue = "";

		// modifieddatetime
		$this->modifieddatetime->LinkCustomAttributes = "";
		$this->modifieddatetime->HrefValue = "";
		$this->modifieddatetime->TooltipValue = "";

		// LMP
		$this->LMP->LinkCustomAttributes = "";
		$this->LMP->HrefValue = "";
		$this->LMP->TooltipValue = "";

		// Procedure
		$this->Procedure->LinkCustomAttributes = "";
		$this->Procedure->HrefValue = "";
		$this->Procedure->TooltipValue = "";

		// ProcedureDateTime
		$this->ProcedureDateTime->LinkCustomAttributes = "";
		$this->ProcedureDateTime->HrefValue = "";
		$this->ProcedureDateTime->TooltipValue = "";

		// ICSIDate
		$this->ICSIDate->LinkCustomAttributes = "";
		$this->ICSIDate->HrefValue = "";
		$this->ICSIDate->TooltipValue = "";

		// RIDNo
		$this->RIDNo->LinkCustomAttributes = "";
		$this->RIDNo->HrefValue = "";
		$this->RIDNo->TooltipValue = "";

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

		// Reception
		$this->Reception->EditAttrs["class"] = "form-control";
		$this->Reception->EditCustomAttributes = "";
		if (!$this->Reception->Raw)
			$this->Reception->CurrentValue = HtmlDecode($this->Reception->CurrentValue);
		$this->Reception->EditValue = $this->Reception->CurrentValue;
		$this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

		// PatientId
		$this->PatientId->EditAttrs["class"] = "form-control";
		$this->PatientId->EditCustomAttributes = "";
		$this->PatientId->EditValue = $this->PatientId->CurrentValue;
		$this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

		// mrnno
		$this->mrnno->EditAttrs["class"] = "form-control";
		$this->mrnno->EditCustomAttributes = "";
		if (!$this->mrnno->Raw)
			$this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
		$this->mrnno->EditValue = $this->mrnno->CurrentValue;
		$this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

		// PatientName
		$this->PatientName->EditAttrs["class"] = "form-control";
		$this->PatientName->EditCustomAttributes = "";
		if (!$this->PatientName->Raw)
			$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
		$this->PatientName->EditValue = $this->PatientName->CurrentValue;
		$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

		// Telephone
		$this->Telephone->EditAttrs["class"] = "form-control";
		$this->Telephone->EditCustomAttributes = "";
		if (!$this->Telephone->Raw)
			$this->Telephone->CurrentValue = HtmlDecode($this->Telephone->CurrentValue);
		$this->Telephone->EditValue = $this->Telephone->CurrentValue;
		$this->Telephone->PlaceHolder = RemoveHtml($this->Telephone->caption());

		// Age
		$this->Age->EditAttrs["class"] = "form-control";
		$this->Age->EditCustomAttributes = "";
		if (!$this->Age->Raw)
			$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
		$this->Age->EditValue = $this->Age->CurrentValue;
		$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

		// Gender
		$this->Gender->EditAttrs["class"] = "form-control";
		$this->Gender->EditCustomAttributes = "";
		if (!$this->Gender->Raw)
			$this->Gender->CurrentValue = HtmlDecode($this->Gender->CurrentValue);
		$this->Gender->EditValue = $this->Gender->CurrentValue;
		$this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

		// profilePic
		$this->profilePic->EditAttrs["class"] = "form-control";
		$this->profilePic->EditCustomAttributes = "";
		$this->profilePic->EditValue = $this->profilePic->CurrentValue;
		$this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

		// procedurenotes
		$this->procedurenotes->EditAttrs["class"] = "form-control";
		$this->procedurenotes->EditCustomAttributes = "";
		$this->procedurenotes->EditValue = $this->procedurenotes->CurrentValue;
		$this->procedurenotes->PlaceHolder = RemoveHtml($this->procedurenotes->caption());

		// NextReviewDate
		$this->NextReviewDate->EditAttrs["class"] = "form-control";
		$this->NextReviewDate->EditCustomAttributes = "";
		$this->NextReviewDate->EditValue = FormatDateTime($this->NextReviewDate->CurrentValue, 8);
		$this->NextReviewDate->PlaceHolder = RemoveHtml($this->NextReviewDate->caption());

		// ICSIAdvised
		$this->ICSIAdvised->EditCustomAttributes = "";
		$this->ICSIAdvised->EditValue = $this->ICSIAdvised->options(FALSE);

		// DeliveryRegistered
		$this->DeliveryRegistered->EditCustomAttributes = "";
		$this->DeliveryRegistered->EditValue = $this->DeliveryRegistered->options(FALSE);

		// EDD
		$this->EDD->EditAttrs["class"] = "form-control";
		$this->EDD->EditCustomAttributes = "";
		$this->EDD->EditValue = FormatDateTime($this->EDD->CurrentValue, 8);
		$this->EDD->PlaceHolder = RemoveHtml($this->EDD->caption());

		// SerologyPositive
		$this->SerologyPositive->EditCustomAttributes = "";
		$this->SerologyPositive->EditValue = $this->SerologyPositive->options(FALSE);

		// Allergy
		$this->Allergy->EditAttrs["class"] = "form-control";
		$this->Allergy->EditCustomAttributes = "";

		// status
		$this->status->EditAttrs["class"] = "form-control";
		$this->status->EditCustomAttributes = "";
		$this->status->EditValue = $this->status->CurrentValue;
		$this->status->PlaceHolder = RemoveHtml($this->status->caption());

		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// LMP

		$this->LMP->EditAttrs["class"] = "form-control";
		$this->LMP->EditCustomAttributes = "";
		$this->LMP->EditValue = FormatDateTime($this->LMP->CurrentValue, 8);
		$this->LMP->PlaceHolder = RemoveHtml($this->LMP->caption());

		// Procedure
		$this->Procedure->EditAttrs["class"] = "form-control";
		$this->Procedure->EditCustomAttributes = "";
		$this->Procedure->EditValue = $this->Procedure->CurrentValue;
		$this->Procedure->PlaceHolder = RemoveHtml($this->Procedure->caption());

		// ProcedureDateTime
		$this->ProcedureDateTime->EditAttrs["class"] = "form-control";
		$this->ProcedureDateTime->EditCustomAttributes = "";
		$this->ProcedureDateTime->EditValue = FormatDateTime($this->ProcedureDateTime->CurrentValue, 8);
		$this->ProcedureDateTime->PlaceHolder = RemoveHtml($this->ProcedureDateTime->caption());

		// ICSIDate
		$this->ICSIDate->EditAttrs["class"] = "form-control";
		$this->ICSIDate->EditCustomAttributes = "";
		$this->ICSIDate->EditValue = FormatDateTime($this->ICSIDate->CurrentValue, 8);
		$this->ICSIDate->PlaceHolder = RemoveHtml($this->ICSIDate->caption());

		// RIDNo
		$this->RIDNo->EditAttrs["class"] = "form-control";
		$this->RIDNo->EditCustomAttributes = "";
		$this->RIDNo->EditValue = $this->RIDNo->CurrentValue;
		$this->RIDNo->PlaceHolder = RemoveHtml($this->RIDNo->caption());

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
					$doc->exportCaption($this->Reception);
					$doc->exportCaption($this->PatientId);
					$doc->exportCaption($this->mrnno);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->Telephone);
					$doc->exportCaption($this->Age);
					$doc->exportCaption($this->Gender);
					$doc->exportCaption($this->profilePic);
					$doc->exportCaption($this->procedurenotes);
					$doc->exportCaption($this->NextReviewDate);
					$doc->exportCaption($this->ICSIAdvised);
					$doc->exportCaption($this->DeliveryRegistered);
					$doc->exportCaption($this->EDD);
					$doc->exportCaption($this->SerologyPositive);
					$doc->exportCaption($this->Allergy);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
					$doc->exportCaption($this->LMP);
					$doc->exportCaption($this->Procedure);
					$doc->exportCaption($this->ProcedureDateTime);
					$doc->exportCaption($this->ICSIDate);
					$doc->exportCaption($this->RIDNo);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->Reception);
					$doc->exportCaption($this->PatientId);
					$doc->exportCaption($this->mrnno);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->Telephone);
					$doc->exportCaption($this->Age);
					$doc->exportCaption($this->Gender);
					$doc->exportCaption($this->NextReviewDate);
					$doc->exportCaption($this->ICSIAdvised);
					$doc->exportCaption($this->DeliveryRegistered);
					$doc->exportCaption($this->EDD);
					$doc->exportCaption($this->SerologyPositive);
					$doc->exportCaption($this->Allergy);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
					$doc->exportCaption($this->LMP);
					$doc->exportCaption($this->ProcedureDateTime);
					$doc->exportCaption($this->ICSIDate);
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
						$doc->exportField($this->Reception);
						$doc->exportField($this->PatientId);
						$doc->exportField($this->mrnno);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->Telephone);
						$doc->exportField($this->Age);
						$doc->exportField($this->Gender);
						$doc->exportField($this->profilePic);
						$doc->exportField($this->procedurenotes);
						$doc->exportField($this->NextReviewDate);
						$doc->exportField($this->ICSIAdvised);
						$doc->exportField($this->DeliveryRegistered);
						$doc->exportField($this->EDD);
						$doc->exportField($this->SerologyPositive);
						$doc->exportField($this->Allergy);
						$doc->exportField($this->status);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
						$doc->exportField($this->LMP);
						$doc->exportField($this->Procedure);
						$doc->exportField($this->ProcedureDateTime);
						$doc->exportField($this->ICSIDate);
						$doc->exportField($this->RIDNo);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->Reception);
						$doc->exportField($this->PatientId);
						$doc->exportField($this->mrnno);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->Telephone);
						$doc->exportField($this->Age);
						$doc->exportField($this->Gender);
						$doc->exportField($this->NextReviewDate);
						$doc->exportField($this->ICSIAdvised);
						$doc->exportField($this->DeliveryRegistered);
						$doc->exportField($this->EDD);
						$doc->exportField($this->SerologyPositive);
						$doc->exportField($this->Allergy);
						$doc->exportField($this->status);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
						$doc->exportField($this->LMP);
						$doc->exportField($this->ProcedureDateTime);
						$doc->exportField($this->ICSIDate);
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