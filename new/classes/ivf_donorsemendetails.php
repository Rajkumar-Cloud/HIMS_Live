<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for ivf_donorsemendetails
 */
class ivf_donorsemendetails extends DbTable
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
	public $RIDNo;
	public $TidNo;
	public $Agency;
	public $ReceivedOn;
	public $ReceivedBy;
	public $DonorNo;
	public $BatchNo;
	public $BloodGroup;
	public $Height;
	public $SkinColor;
	public $EyeColor;
	public $HairColor;
	public $NoOfVials;
	public $Tank;
	public $Canister;
	public $Remarks;
	public $patientid;
	public $coupleid;
	public $Usedstatus;
	public $status;
	public $createdby;
	public $createddatetime;
	public $modifiedby;
	public $modifieddatetime;
	public $Lagency;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'ivf_donorsemendetails';
		$this->TableName = 'ivf_donorsemendetails';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`ivf_donorsemendetails`";
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
		$this->id = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = FALSE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// RIDNo
		$this->RIDNo = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_RIDNo', 'RIDNo', '`RIDNo`', '`RIDNo`', 3, 11, -1, FALSE, '`RIDNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RIDNo->Sortable = FALSE; // Allow sort
		$this->RIDNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['RIDNo'] = &$this->RIDNo;

		// TidNo
		$this->TidNo = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_TidNo', 'TidNo', '`TidNo`', '`TidNo`', 3, 11, -1, FALSE, '`TidNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TidNo->Sortable = FALSE; // Allow sort
		$this->TidNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['TidNo'] = &$this->TidNo;

		// Agency
		$this->Agency = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_Agency', 'Agency', '`Agency`', '`Agency`', 200, 50, -1, FALSE, '`Agency`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Agency->Sortable = FALSE; // Allow sort
		$this->fields['Agency'] = &$this->Agency;

		// ReceivedOn
		$this->ReceivedOn = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_ReceivedOn', 'ReceivedOn', '`ReceivedOn`', CastDateFieldForLike("`ReceivedOn`", 0, "DB"), 135, 19, 0, FALSE, '`ReceivedOn`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReceivedOn->Sortable = FALSE; // Allow sort
		$this->ReceivedOn->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['ReceivedOn'] = &$this->ReceivedOn;

		// ReceivedBy
		$this->ReceivedBy = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_ReceivedBy', 'ReceivedBy', '`ReceivedBy`', '`ReceivedBy`', 200, 50, -1, FALSE, '`ReceivedBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReceivedBy->Sortable = FALSE; // Allow sort
		$this->fields['ReceivedBy'] = &$this->ReceivedBy;

		// DonorNo
		$this->DonorNo = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_DonorNo', 'DonorNo', '`DonorNo`', '`DonorNo`', 200, 45, -1, FALSE, '`DonorNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DonorNo->Sortable = TRUE; // Allow sort
		$this->fields['DonorNo'] = &$this->DonorNo;

		// BatchNo
		$this->BatchNo = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_BatchNo', 'BatchNo', '`BatchNo`', '`BatchNo`', 200, 50, -1, FALSE, '`BatchNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BatchNo->Sortable = TRUE; // Allow sort
		$this->fields['BatchNo'] = &$this->BatchNo;

		// BloodGroup
		$this->BloodGroup = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_BloodGroup', 'BloodGroup', '`BloodGroup`', '`BloodGroup`', 200, 50, -1, FALSE, '`BloodGroup`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->BloodGroup->Sortable = TRUE; // Allow sort
		$this->BloodGroup->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->BloodGroup->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->BloodGroup->Lookup = new Lookup('BloodGroup', 'mas_bloodgroup', FALSE, 'BloodGroup', ["BloodGroup","","",""], [], [], [], [], [], [], '', '');
		$this->fields['BloodGroup'] = &$this->BloodGroup;

		// Height
		$this->Height = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_Height', 'Height', '`Height`', '`Height`', 200, 50, -1, FALSE, '`Height`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Height->Sortable = TRUE; // Allow sort
		$this->fields['Height'] = &$this->Height;

		// SkinColor
		$this->SkinColor = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_SkinColor', 'SkinColor', '`SkinColor`', '`SkinColor`', 200, 50, -1, FALSE, '`SkinColor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->SkinColor->Sortable = TRUE; // Allow sort
		$this->SkinColor->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->SkinColor->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->SkinColor->Lookup = new Lookup('SkinColor', 'ivf_donorsemendetails', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->SkinColor->OptionCount = 3;
		$this->fields['SkinColor'] = &$this->SkinColor;

		// EyeColor
		$this->EyeColor = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_EyeColor', 'EyeColor', '`EyeColor`', '`EyeColor`', 200, 50, -1, FALSE, '`EyeColor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->EyeColor->Sortable = TRUE; // Allow sort
		$this->EyeColor->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->EyeColor->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->EyeColor->Lookup = new Lookup('EyeColor', 'ivf_donorsemendetails', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->EyeColor->OptionCount = 6;
		$this->fields['EyeColor'] = &$this->EyeColor;

		// HairColor
		$this->HairColor = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_HairColor', 'HairColor', '`HairColor`', '`HairColor`', 200, 50, -1, FALSE, '`HairColor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->HairColor->Sortable = TRUE; // Allow sort
		$this->HairColor->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->HairColor->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->HairColor->Lookup = new Lookup('HairColor', 'ivf_donorsemendetails', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->HairColor->OptionCount = 3;
		$this->fields['HairColor'] = &$this->HairColor;

		// NoOfVials
		$this->NoOfVials = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_NoOfVials', 'NoOfVials', '`NoOfVials`', '`NoOfVials`', 200, 50, -1, FALSE, '`NoOfVials`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NoOfVials->Sortable = TRUE; // Allow sort
		$this->fields['NoOfVials'] = &$this->NoOfVials;

		// Tank
		$this->Tank = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_Tank', 'Tank', '`Tank`', '`Tank`', 200, 50, -1, FALSE, '`Tank`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Tank->Sortable = TRUE; // Allow sort
		$this->fields['Tank'] = &$this->Tank;

		// Canister
		$this->Canister = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_Canister', 'Canister', '`Canister`', '`Canister`', 200, 50, -1, FALSE, '`Canister`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Canister->Sortable = TRUE; // Allow sort
		$this->fields['Canister'] = &$this->Canister;

		// Remarks
		$this->Remarks = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_Remarks', 'Remarks', '`Remarks`', '`Remarks`', 200, 50, -1, FALSE, '`Remarks`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Remarks->Sortable = TRUE; // Allow sort
		$this->fields['Remarks'] = &$this->Remarks;

		// patientid
		$this->patientid = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_patientid', 'patientid', '`patientid`', '`patientid`', 3, 11, -1, FALSE, '`patientid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->patientid->Sortable = FALSE; // Allow sort
		$this->patientid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['patientid'] = &$this->patientid;

		// coupleid
		$this->coupleid = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_coupleid', 'coupleid', '`coupleid`', '`coupleid`', 3, 11, -1, FALSE, '`coupleid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->coupleid->Sortable = FALSE; // Allow sort
		$this->coupleid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['coupleid'] = &$this->coupleid;

		// Usedstatus
		$this->Usedstatus = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_Usedstatus', 'Usedstatus', '`Usedstatus`', '`Usedstatus`', 3, 11, -1, FALSE, '`Usedstatus`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Usedstatus->Sortable = FALSE; // Allow sort
		$this->Usedstatus->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Usedstatus'] = &$this->Usedstatus;

		// status
		$this->status = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_status', 'status', '`status`', '`status`', 3, 11, -1, FALSE, '`status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->status->Sortable = FALSE; // Allow sort
		$this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['status'] = &$this->status;

		// createdby
		$this->createdby = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, 11, -1, FALSE, '`createdby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdby->Sortable = FALSE; // Allow sort
		$this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['createdby'] = &$this->createdby;

		// createddatetime
		$this->createddatetime = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, FALSE, '`createddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = FALSE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['createddatetime'] = &$this->createddatetime;

		// modifiedby
		$this->modifiedby = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, 11, -1, FALSE, '`modifiedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifiedby->Sortable = FALSE; // Allow sort
		$this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['modifiedby'] = &$this->modifiedby;

		// modifieddatetime
		$this->modifieddatetime = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, FALSE, '`modifieddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifieddatetime->Sortable = FALSE; // Allow sort
		$this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['modifieddatetime'] = &$this->modifieddatetime;

		// Lagency
		$this->Lagency = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_Lagency', 'Lagency', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Lagency->IsCustom = TRUE; // Custom field
		$this->Lagency->Sortable = TRUE; // Allow sort
		$this->Lagency->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Lagency->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Lagency->Lookup = new Lookup('Lagency', 'ivf_agency', FALSE, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Lagency'] = &$this->Lagency;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`ivf_donorsemendetails`";
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
		return ($this->SqlSelect != "") ? $this->SqlSelect : "SELECT *, '' AS `Lagency` FROM " . $this->getSqlFrom();
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
		$this->id->DbValue = $row['id'];
		$this->RIDNo->DbValue = $row['RIDNo'];
		$this->TidNo->DbValue = $row['TidNo'];
		$this->Agency->DbValue = $row['Agency'];
		$this->ReceivedOn->DbValue = $row['ReceivedOn'];
		$this->ReceivedBy->DbValue = $row['ReceivedBy'];
		$this->DonorNo->DbValue = $row['DonorNo'];
		$this->BatchNo->DbValue = $row['BatchNo'];
		$this->BloodGroup->DbValue = $row['BloodGroup'];
		$this->Height->DbValue = $row['Height'];
		$this->SkinColor->DbValue = $row['SkinColor'];
		$this->EyeColor->DbValue = $row['EyeColor'];
		$this->HairColor->DbValue = $row['HairColor'];
		$this->NoOfVials->DbValue = $row['NoOfVials'];
		$this->Tank->DbValue = $row['Tank'];
		$this->Canister->DbValue = $row['Canister'];
		$this->Remarks->DbValue = $row['Remarks'];
		$this->patientid->DbValue = $row['patientid'];
		$this->coupleid->DbValue = $row['coupleid'];
		$this->Usedstatus->DbValue = $row['Usedstatus'];
		$this->status->DbValue = $row['status'];
		$this->createdby->DbValue = $row['createdby'];
		$this->createddatetime->DbValue = $row['createddatetime'];
		$this->modifiedby->DbValue = $row['modifiedby'];
		$this->modifieddatetime->DbValue = $row['modifieddatetime'];
		$this->Lagency->DbValue = $row['Lagency'];
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
			return "ivf_donorsemendetailslist.php";
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
		if ($pageName == "ivf_donorsemendetailsview.php")
			return $Language->phrase("View");
		elseif ($pageName == "ivf_donorsemendetailsedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "ivf_donorsemendetailsadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "ivf_donorsemendetailslist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("ivf_donorsemendetailsview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("ivf_donorsemendetailsview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "ivf_donorsemendetailsadd.php?" . $this->getUrlParm($parm);
		else
			$url = "ivf_donorsemendetailsadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("ivf_donorsemendetailsedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("ivf_donorsemendetailsadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("ivf_donorsemendetailsdelete.php", $this->getUrlParm());
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
		$this->RIDNo->setDbValue($rs->fields('RIDNo'));
		$this->TidNo->setDbValue($rs->fields('TidNo'));
		$this->Agency->setDbValue($rs->fields('Agency'));
		$this->ReceivedOn->setDbValue($rs->fields('ReceivedOn'));
		$this->ReceivedBy->setDbValue($rs->fields('ReceivedBy'));
		$this->DonorNo->setDbValue($rs->fields('DonorNo'));
		$this->BatchNo->setDbValue($rs->fields('BatchNo'));
		$this->BloodGroup->setDbValue($rs->fields('BloodGroup'));
		$this->Height->setDbValue($rs->fields('Height'));
		$this->SkinColor->setDbValue($rs->fields('SkinColor'));
		$this->EyeColor->setDbValue($rs->fields('EyeColor'));
		$this->HairColor->setDbValue($rs->fields('HairColor'));
		$this->NoOfVials->setDbValue($rs->fields('NoOfVials'));
		$this->Tank->setDbValue($rs->fields('Tank'));
		$this->Canister->setDbValue($rs->fields('Canister'));
		$this->Remarks->setDbValue($rs->fields('Remarks'));
		$this->patientid->setDbValue($rs->fields('patientid'));
		$this->coupleid->setDbValue($rs->fields('coupleid'));
		$this->Usedstatus->setDbValue($rs->fields('Usedstatus'));
		$this->status->setDbValue($rs->fields('status'));
		$this->createdby->setDbValue($rs->fields('createdby'));
		$this->createddatetime->setDbValue($rs->fields('createddatetime'));
		$this->modifiedby->setDbValue($rs->fields('modifiedby'));
		$this->modifieddatetime->setDbValue($rs->fields('modifieddatetime'));
		$this->Lagency->setDbValue($rs->fields('Lagency'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// RIDNo
		// TidNo
		// Agency
		// ReceivedOn
		// ReceivedBy
		// DonorNo
		// BatchNo
		// BloodGroup
		// Height
		// SkinColor
		// EyeColor
		// HairColor
		// NoOfVials
		// Tank
		// Canister
		// Remarks
		// patientid
		// coupleid
		// Usedstatus
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// Lagency
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// RIDNo
		$this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
		$this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
		$this->RIDNo->ViewCustomAttributes = "";

		// TidNo
		$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
		$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
		$this->TidNo->ViewCustomAttributes = "";

		// Agency
		$this->Agency->ViewValue = $this->Agency->CurrentValue;
		$this->Agency->ViewCustomAttributes = "";

		// ReceivedOn
		$this->ReceivedOn->ViewValue = $this->ReceivedOn->CurrentValue;
		$this->ReceivedOn->ViewValue = FormatDateTime($this->ReceivedOn->ViewValue, 0);
		$this->ReceivedOn->ViewCustomAttributes = "";

		// ReceivedBy
		$this->ReceivedBy->ViewValue = $this->ReceivedBy->CurrentValue;
		$this->ReceivedBy->ViewCustomAttributes = "";

		// DonorNo
		$this->DonorNo->ViewValue = $this->DonorNo->CurrentValue;
		$this->DonorNo->ViewCustomAttributes = "";

		// BatchNo
		$this->BatchNo->ViewValue = $this->BatchNo->CurrentValue;
		$this->BatchNo->ViewCustomAttributes = "";

		// BloodGroup
		$curVal = strval($this->BloodGroup->CurrentValue);
		if ($curVal != "") {
			$this->BloodGroup->ViewValue = $this->BloodGroup->lookupCacheOption($curVal);
			if ($this->BloodGroup->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`BloodGroup`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->BloodGroup->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->BloodGroup->ViewValue = $this->BloodGroup->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->BloodGroup->ViewValue = $this->BloodGroup->CurrentValue;
				}
			}
		} else {
			$this->BloodGroup->ViewValue = NULL;
		}
		$this->BloodGroup->ViewCustomAttributes = "";

		// Height
		$this->Height->ViewValue = $this->Height->CurrentValue;
		$this->Height->ViewCustomAttributes = "";

		// SkinColor
		if (strval($this->SkinColor->CurrentValue) != "") {
			$this->SkinColor->ViewValue = $this->SkinColor->optionCaption($this->SkinColor->CurrentValue);
		} else {
			$this->SkinColor->ViewValue = NULL;
		}
		$this->SkinColor->ViewCustomAttributes = "";

		// EyeColor
		if (strval($this->EyeColor->CurrentValue) != "") {
			$this->EyeColor->ViewValue = $this->EyeColor->optionCaption($this->EyeColor->CurrentValue);
		} else {
			$this->EyeColor->ViewValue = NULL;
		}
		$this->EyeColor->ViewCustomAttributes = "";

		// HairColor
		if (strval($this->HairColor->CurrentValue) != "") {
			$this->HairColor->ViewValue = $this->HairColor->optionCaption($this->HairColor->CurrentValue);
		} else {
			$this->HairColor->ViewValue = NULL;
		}
		$this->HairColor->ViewCustomAttributes = "";

		// NoOfVials
		$this->NoOfVials->ViewValue = $this->NoOfVials->CurrentValue;
		$this->NoOfVials->ViewCustomAttributes = "";

		// Tank
		$this->Tank->ViewValue = $this->Tank->CurrentValue;
		$this->Tank->ViewCustomAttributes = "";

		// Canister
		$this->Canister->ViewValue = $this->Canister->CurrentValue;
		$this->Canister->ViewCustomAttributes = "";

		// Remarks
		$this->Remarks->ViewValue = $this->Remarks->CurrentValue;
		$this->Remarks->ViewCustomAttributes = "";

		// patientid
		$this->patientid->ViewValue = $this->patientid->CurrentValue;
		$this->patientid->ViewValue = FormatNumber($this->patientid->ViewValue, 0, -2, -2, -2);
		$this->patientid->ViewCustomAttributes = "";

		// coupleid
		$this->coupleid->ViewValue = $this->coupleid->CurrentValue;
		$this->coupleid->ViewValue = FormatNumber($this->coupleid->ViewValue, 0, -2, -2, -2);
		$this->coupleid->ViewCustomAttributes = "";

		// Usedstatus
		$this->Usedstatus->ViewValue = $this->Usedstatus->CurrentValue;
		$this->Usedstatus->ViewValue = FormatNumber($this->Usedstatus->ViewValue, 0, -2, -2, -2);
		$this->Usedstatus->ViewCustomAttributes = "";

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

		// Lagency
		$curVal = strval($this->Lagency->CurrentValue);
		if ($curVal != "") {
			$this->Lagency->ViewValue = $this->Lagency->lookupCacheOption($curVal);
			if ($this->Lagency->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->Lagency->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->Lagency->ViewValue = $this->Lagency->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Lagency->ViewValue = $this->Lagency->CurrentValue;
				}
			}
		} else {
			$this->Lagency->ViewValue = NULL;
		}
		$this->Lagency->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// RIDNo
		$this->RIDNo->LinkCustomAttributes = "";
		$this->RIDNo->HrefValue = "";
		$this->RIDNo->TooltipValue = "";

		// TidNo
		$this->TidNo->LinkCustomAttributes = "";
		$this->TidNo->HrefValue = "";
		$this->TidNo->TooltipValue = "";

		// Agency
		$this->Agency->LinkCustomAttributes = "";
		$this->Agency->HrefValue = "";
		$this->Agency->TooltipValue = "";

		// ReceivedOn
		$this->ReceivedOn->LinkCustomAttributes = "";
		$this->ReceivedOn->HrefValue = "";
		$this->ReceivedOn->TooltipValue = "";

		// ReceivedBy
		$this->ReceivedBy->LinkCustomAttributes = "";
		$this->ReceivedBy->HrefValue = "";
		$this->ReceivedBy->TooltipValue = "";

		// DonorNo
		$this->DonorNo->LinkCustomAttributes = "";
		$this->DonorNo->HrefValue = "";
		$this->DonorNo->TooltipValue = "";

		// BatchNo
		$this->BatchNo->LinkCustomAttributes = "";
		$this->BatchNo->HrefValue = "";
		$this->BatchNo->TooltipValue = "";

		// BloodGroup
		$this->BloodGroup->LinkCustomAttributes = "";
		$this->BloodGroup->HrefValue = "";
		$this->BloodGroup->TooltipValue = "";

		// Height
		$this->Height->LinkCustomAttributes = "";
		$this->Height->HrefValue = "";
		$this->Height->TooltipValue = "";

		// SkinColor
		$this->SkinColor->LinkCustomAttributes = "";
		$this->SkinColor->HrefValue = "";
		$this->SkinColor->TooltipValue = "";

		// EyeColor
		$this->EyeColor->LinkCustomAttributes = "";
		$this->EyeColor->HrefValue = "";
		$this->EyeColor->TooltipValue = "";

		// HairColor
		$this->HairColor->LinkCustomAttributes = "";
		$this->HairColor->HrefValue = "";
		$this->HairColor->TooltipValue = "";

		// NoOfVials
		$this->NoOfVials->LinkCustomAttributes = "";
		$this->NoOfVials->HrefValue = "";
		$this->NoOfVials->TooltipValue = "";

		// Tank
		$this->Tank->LinkCustomAttributes = "";
		$this->Tank->HrefValue = "";
		$this->Tank->TooltipValue = "";

		// Canister
		$this->Canister->LinkCustomAttributes = "";
		$this->Canister->HrefValue = "";
		$this->Canister->TooltipValue = "";

		// Remarks
		$this->Remarks->LinkCustomAttributes = "";
		$this->Remarks->HrefValue = "";
		$this->Remarks->TooltipValue = "";

		// patientid
		$this->patientid->LinkCustomAttributes = "";
		$this->patientid->HrefValue = "";
		$this->patientid->TooltipValue = "";

		// coupleid
		$this->coupleid->LinkCustomAttributes = "";
		$this->coupleid->HrefValue = "";
		$this->coupleid->TooltipValue = "";

		// Usedstatus
		$this->Usedstatus->LinkCustomAttributes = "";
		$this->Usedstatus->HrefValue = "";
		$this->Usedstatus->TooltipValue = "";

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

		// Lagency
		$this->Lagency->LinkCustomAttributes = "";
		$this->Lagency->HrefValue = "";
		$this->Lagency->TooltipValue = "";

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

		// RIDNo
		$this->RIDNo->EditAttrs["class"] = "form-control";
		$this->RIDNo->EditCustomAttributes = "";
		$this->RIDNo->EditValue = $this->RIDNo->CurrentValue;
		$this->RIDNo->PlaceHolder = RemoveHtml($this->RIDNo->caption());

		// TidNo
		$this->TidNo->EditAttrs["class"] = "form-control";
		$this->TidNo->EditCustomAttributes = "";
		$this->TidNo->EditValue = $this->TidNo->CurrentValue;
		$this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

		// Agency
		$this->Agency->EditAttrs["class"] = "form-control";
		$this->Agency->EditCustomAttributes = "";
		if (!$this->Agency->Raw)
			$this->Agency->CurrentValue = HtmlDecode($this->Agency->CurrentValue);
		$this->Agency->EditValue = $this->Agency->CurrentValue;
		$this->Agency->PlaceHolder = RemoveHtml($this->Agency->caption());

		// ReceivedOn
		$this->ReceivedOn->EditAttrs["class"] = "form-control";
		$this->ReceivedOn->EditCustomAttributes = "";
		$this->ReceivedOn->EditValue = FormatDateTime($this->ReceivedOn->CurrentValue, 8);
		$this->ReceivedOn->PlaceHolder = RemoveHtml($this->ReceivedOn->caption());

		// ReceivedBy
		$this->ReceivedBy->EditAttrs["class"] = "form-control";
		$this->ReceivedBy->EditCustomAttributes = "";
		if (!$this->ReceivedBy->Raw)
			$this->ReceivedBy->CurrentValue = HtmlDecode($this->ReceivedBy->CurrentValue);
		$this->ReceivedBy->EditValue = $this->ReceivedBy->CurrentValue;
		$this->ReceivedBy->PlaceHolder = RemoveHtml($this->ReceivedBy->caption());

		// DonorNo
		$this->DonorNo->EditAttrs["class"] = "form-control";
		$this->DonorNo->EditCustomAttributes = "";
		if (!$this->DonorNo->Raw)
			$this->DonorNo->CurrentValue = HtmlDecode($this->DonorNo->CurrentValue);
		$this->DonorNo->EditValue = $this->DonorNo->CurrentValue;
		$this->DonorNo->PlaceHolder = RemoveHtml($this->DonorNo->caption());

		// BatchNo
		$this->BatchNo->EditAttrs["class"] = "form-control";
		$this->BatchNo->EditCustomAttributes = "";
		if (!$this->BatchNo->Raw)
			$this->BatchNo->CurrentValue = HtmlDecode($this->BatchNo->CurrentValue);
		$this->BatchNo->EditValue = $this->BatchNo->CurrentValue;
		$this->BatchNo->PlaceHolder = RemoveHtml($this->BatchNo->caption());

		// BloodGroup
		$this->BloodGroup->EditAttrs["class"] = "form-control";
		$this->BloodGroup->EditCustomAttributes = "";

		// Height
		$this->Height->EditAttrs["class"] = "form-control";
		$this->Height->EditCustomAttributes = "";
		if (!$this->Height->Raw)
			$this->Height->CurrentValue = HtmlDecode($this->Height->CurrentValue);
		$this->Height->EditValue = $this->Height->CurrentValue;
		$this->Height->PlaceHolder = RemoveHtml($this->Height->caption());

		// SkinColor
		$this->SkinColor->EditAttrs["class"] = "form-control";
		$this->SkinColor->EditCustomAttributes = "";
		$this->SkinColor->EditValue = $this->SkinColor->options(TRUE);

		// EyeColor
		$this->EyeColor->EditAttrs["class"] = "form-control";
		$this->EyeColor->EditCustomAttributes = "";
		$this->EyeColor->EditValue = $this->EyeColor->options(TRUE);

		// HairColor
		$this->HairColor->EditAttrs["class"] = "form-control";
		$this->HairColor->EditCustomAttributes = "";
		$this->HairColor->EditValue = $this->HairColor->options(TRUE);

		// NoOfVials
		$this->NoOfVials->EditAttrs["class"] = "form-control";
		$this->NoOfVials->EditCustomAttributes = "";
		if (!$this->NoOfVials->Raw)
			$this->NoOfVials->CurrentValue = HtmlDecode($this->NoOfVials->CurrentValue);
		$this->NoOfVials->EditValue = $this->NoOfVials->CurrentValue;
		$this->NoOfVials->PlaceHolder = RemoveHtml($this->NoOfVials->caption());

		// Tank
		$this->Tank->EditAttrs["class"] = "form-control";
		$this->Tank->EditCustomAttributes = "";
		if (!$this->Tank->Raw)
			$this->Tank->CurrentValue = HtmlDecode($this->Tank->CurrentValue);
		$this->Tank->EditValue = $this->Tank->CurrentValue;
		$this->Tank->PlaceHolder = RemoveHtml($this->Tank->caption());

		// Canister
		$this->Canister->EditAttrs["class"] = "form-control";
		$this->Canister->EditCustomAttributes = "";
		if (!$this->Canister->Raw)
			$this->Canister->CurrentValue = HtmlDecode($this->Canister->CurrentValue);
		$this->Canister->EditValue = $this->Canister->CurrentValue;
		$this->Canister->PlaceHolder = RemoveHtml($this->Canister->caption());

		// Remarks
		$this->Remarks->EditAttrs["class"] = "form-control";
		$this->Remarks->EditCustomAttributes = "";
		if (!$this->Remarks->Raw)
			$this->Remarks->CurrentValue = HtmlDecode($this->Remarks->CurrentValue);
		$this->Remarks->EditValue = $this->Remarks->CurrentValue;
		$this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

		// patientid
		$this->patientid->EditAttrs["class"] = "form-control";
		$this->patientid->EditCustomAttributes = "";
		$this->patientid->EditValue = $this->patientid->CurrentValue;
		$this->patientid->PlaceHolder = RemoveHtml($this->patientid->caption());

		// coupleid
		$this->coupleid->EditAttrs["class"] = "form-control";
		$this->coupleid->EditCustomAttributes = "";
		$this->coupleid->EditValue = $this->coupleid->CurrentValue;
		$this->coupleid->PlaceHolder = RemoveHtml($this->coupleid->caption());

		// Usedstatus
		$this->Usedstatus->EditAttrs["class"] = "form-control";
		$this->Usedstatus->EditCustomAttributes = "";
		$this->Usedstatus->EditValue = $this->Usedstatus->CurrentValue;
		$this->Usedstatus->PlaceHolder = RemoveHtml($this->Usedstatus->caption());

		// status
		$this->status->EditAttrs["class"] = "form-control";
		$this->status->EditCustomAttributes = "";
		$this->status->EditValue = $this->status->CurrentValue;
		$this->status->PlaceHolder = RemoveHtml($this->status->caption());

		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// Lagency

		$this->Lagency->EditAttrs["class"] = "form-control";
		$this->Lagency->EditCustomAttributes = "";

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
					$doc->exportCaption($this->RIDNo);
					$doc->exportCaption($this->TidNo);
					$doc->exportCaption($this->Agency);
					$doc->exportCaption($this->ReceivedOn);
					$doc->exportCaption($this->ReceivedBy);
					$doc->exportCaption($this->DonorNo);
					$doc->exportCaption($this->BatchNo);
					$doc->exportCaption($this->BloodGroup);
					$doc->exportCaption($this->Height);
					$doc->exportCaption($this->SkinColor);
					$doc->exportCaption($this->EyeColor);
					$doc->exportCaption($this->HairColor);
					$doc->exportCaption($this->NoOfVials);
					$doc->exportCaption($this->Tank);
					$doc->exportCaption($this->Canister);
					$doc->exportCaption($this->Remarks);
					$doc->exportCaption($this->patientid);
					$doc->exportCaption($this->coupleid);
					$doc->exportCaption($this->Usedstatus);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
					$doc->exportCaption($this->Lagency);
				} else {
					$doc->exportCaption($this->DonorNo);
					$doc->exportCaption($this->BatchNo);
					$doc->exportCaption($this->BloodGroup);
					$doc->exportCaption($this->Height);
					$doc->exportCaption($this->SkinColor);
					$doc->exportCaption($this->EyeColor);
					$doc->exportCaption($this->HairColor);
					$doc->exportCaption($this->NoOfVials);
					$doc->exportCaption($this->Tank);
					$doc->exportCaption($this->Canister);
					$doc->exportCaption($this->Remarks);
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
						$doc->exportField($this->RIDNo);
						$doc->exportField($this->TidNo);
						$doc->exportField($this->Agency);
						$doc->exportField($this->ReceivedOn);
						$doc->exportField($this->ReceivedBy);
						$doc->exportField($this->DonorNo);
						$doc->exportField($this->BatchNo);
						$doc->exportField($this->BloodGroup);
						$doc->exportField($this->Height);
						$doc->exportField($this->SkinColor);
						$doc->exportField($this->EyeColor);
						$doc->exportField($this->HairColor);
						$doc->exportField($this->NoOfVials);
						$doc->exportField($this->Tank);
						$doc->exportField($this->Canister);
						$doc->exportField($this->Remarks);
						$doc->exportField($this->patientid);
						$doc->exportField($this->coupleid);
						$doc->exportField($this->Usedstatus);
						$doc->exportField($this->status);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
						$doc->exportField($this->Lagency);
					} else {
						$doc->exportField($this->DonorNo);
						$doc->exportField($this->BatchNo);
						$doc->exportField($this->BloodGroup);
						$doc->exportField($this->Height);
						$doc->exportField($this->SkinColor);
						$doc->exportField($this->EyeColor);
						$doc->exportField($this->HairColor);
						$doc->exportField($this->NoOfVials);
						$doc->exportField($this->Tank);
						$doc->exportField($this->Canister);
						$doc->exportField($this->Remarks);
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