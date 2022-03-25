<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for view_patient_billing
 */
class view_patient_billing extends DbTable
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
	public $mrnno;
	public $profilePic;
	public $Gender;
	public $Age;
	public $createdby;
	public $createddatetime;
	public $modifiedby;
	public $modifieddatetime;
	public $PatientId;
	public $HospID;
	public $Reception;
	public $PatientName;
	public $Mobile;
	public $IP_OP;
	public $Doctor;
	public $voucher_type;
	public $Details;
	public $ModeofPayment;
	public $Amount;
	public $AnyDues;
	public $RealizationAmount;
	public $RealizationStatus;
	public $RealizationRemarks;
	public $RealizationBatchNo;
	public $RealizationDate;
	public $RIDNO;
	public $TidNo;
	public $CId;
	public $PartnerName;
	public $PayerType;
	public $Dob;
	public $Currency;
	public $DiscountRemarks;
	public $Remarks;
	public $PatId;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'view_patient_billing';
		$this->TableName = 'view_patient_billing';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`view_patient_billing`";
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
		$this->id = new DbField('view_patient_billing', 'view_patient_billing', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// mrnno
		$this->mrnno = new DbField('view_patient_billing', 'view_patient_billing', 'x_mrnno', 'mrnno', '`mrnno`', '`mrnno`', 200, 45, -1, FALSE, '`mrnno`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mrnno->Sortable = TRUE; // Allow sort
		$this->fields['mrnno'] = &$this->mrnno;

		// profilePic
		$this->profilePic = new DbField('view_patient_billing', 'view_patient_billing', 'x_profilePic', 'profilePic', '`profilePic`', '`profilePic`', 201, 450, -1, FALSE, '`profilePic`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->profilePic->Sortable = TRUE; // Allow sort
		$this->fields['profilePic'] = &$this->profilePic;

		// Gender
		$this->Gender = new DbField('view_patient_billing', 'view_patient_billing', 'x_Gender', 'Gender', '`Gender`', '`Gender`', 200, 45, -1, FALSE, '`Gender`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Gender->Sortable = TRUE; // Allow sort
		$this->fields['Gender'] = &$this->Gender;

		// Age
		$this->Age = new DbField('view_patient_billing', 'view_patient_billing', 'x_Age', 'Age', '`Age`', '`Age`', 200, 45, -1, FALSE, '`Age`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Age->Sortable = TRUE; // Allow sort
		$this->fields['Age'] = &$this->Age;

		// createdby
		$this->createdby = new DbField('view_patient_billing', 'view_patient_billing', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 200, 45, -1, FALSE, '`createdby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdby->Sortable = TRUE; // Allow sort
		$this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['createdby'] = &$this->createdby;

		// createddatetime
		$this->createddatetime = new DbField('view_patient_billing', 'view_patient_billing', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, FALSE, '`createddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = TRUE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['createddatetime'] = &$this->createddatetime;

		// modifiedby
		$this->modifiedby = new DbField('view_patient_billing', 'view_patient_billing', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 200, 45, -1, FALSE, '`modifiedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifiedby->Sortable = TRUE; // Allow sort
		$this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['modifiedby'] = &$this->modifiedby;

		// modifieddatetime
		$this->modifieddatetime = new DbField('view_patient_billing', 'view_patient_billing', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, FALSE, '`modifieddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifieddatetime->Sortable = TRUE; // Allow sort
		$this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['modifieddatetime'] = &$this->modifieddatetime;

		// PatientId
		$this->PatientId = new DbField('view_patient_billing', 'view_patient_billing', 'x_PatientId', 'PatientId', '`PatientId`', '`PatientId`', 200, 45, -1, FALSE, '`PatientId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientId->Sortable = TRUE; // Allow sort
		$this->PatientId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['PatientId'] = &$this->PatientId;

		// HospID
		$this->HospID = new DbField('view_patient_billing', 'view_patient_billing', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->fields['HospID'] = &$this->HospID;

		// Reception
		$this->Reception = new DbField('view_patient_billing', 'view_patient_billing', 'x_Reception', 'Reception', '`Reception`', '`Reception`', 3, 11, -1, FALSE, '`Reception`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Reception->Sortable = TRUE; // Allow sort
		$this->Reception->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Reception'] = &$this->Reception;

		// PatientName
		$this->PatientName = new DbField('view_patient_billing', 'view_patient_billing', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, FALSE, '`PatientName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientName->Sortable = TRUE; // Allow sort
		$this->fields['PatientName'] = &$this->PatientName;

		// Mobile
		$this->Mobile = new DbField('view_patient_billing', 'view_patient_billing', 'x_Mobile', 'Mobile', '`Mobile`', '`Mobile`', 200, 45, -1, FALSE, '`Mobile`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Mobile->Sortable = TRUE; // Allow sort
		$this->fields['Mobile'] = &$this->Mobile;

		// IP_OP
		$this->IP_OP = new DbField('view_patient_billing', 'view_patient_billing', 'x_IP_OP', 'IP_OP', '`IP_OP`', '`IP_OP`', 200, 45, -1, FALSE, '`IP_OP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IP_OP->Sortable = TRUE; // Allow sort
		$this->fields['IP_OP'] = &$this->IP_OP;

		// Doctor
		$this->Doctor = new DbField('view_patient_billing', 'view_patient_billing', 'x_Doctor', 'Doctor', '`Doctor`', '`Doctor`', 200, 45, -1, FALSE, '`Doctor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Doctor->Sortable = TRUE; // Allow sort
		$this->fields['Doctor'] = &$this->Doctor;

		// voucher_type
		$this->voucher_type = new DbField('view_patient_billing', 'view_patient_billing', 'x_voucher_type', 'voucher_type', '`voucher_type`', '`voucher_type`', 200, 45, -1, FALSE, '`voucher_type`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->voucher_type->Sortable = TRUE; // Allow sort
		$this->fields['voucher_type'] = &$this->voucher_type;

		// Details
		$this->Details = new DbField('view_patient_billing', 'view_patient_billing', 'x_Details', 'Details', '`Details`', '`Details`', 200, 45, -1, FALSE, '`Details`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Details->Sortable = TRUE; // Allow sort
		$this->fields['Details'] = &$this->Details;

		// ModeofPayment
		$this->ModeofPayment = new DbField('view_patient_billing', 'view_patient_billing', 'x_ModeofPayment', 'ModeofPayment', '`ModeofPayment`', '`ModeofPayment`', 200, 45, -1, FALSE, '`ModeofPayment`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ModeofPayment->Sortable = TRUE; // Allow sort
		$this->fields['ModeofPayment'] = &$this->ModeofPayment;

		// Amount
		$this->Amount = new DbField('view_patient_billing', 'view_patient_billing', 'x_Amount', 'Amount', '`Amount`', '`Amount`', 131, 10, -1, FALSE, '`Amount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Amount->Sortable = TRUE; // Allow sort
		$this->Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Amount'] = &$this->Amount;

		// AnyDues
		$this->AnyDues = new DbField('view_patient_billing', 'view_patient_billing', 'x_AnyDues', 'AnyDues', '`AnyDues`', '`AnyDues`', 200, 45, -1, FALSE, '`AnyDues`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AnyDues->Sortable = TRUE; // Allow sort
		$this->fields['AnyDues'] = &$this->AnyDues;

		// RealizationAmount
		$this->RealizationAmount = new DbField('view_patient_billing', 'view_patient_billing', 'x_RealizationAmount', 'RealizationAmount', '`RealizationAmount`', '`RealizationAmount`', 131, 10, -1, FALSE, '`RealizationAmount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RealizationAmount->Sortable = TRUE; // Allow sort
		$this->RealizationAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['RealizationAmount'] = &$this->RealizationAmount;

		// RealizationStatus
		$this->RealizationStatus = new DbField('view_patient_billing', 'view_patient_billing', 'x_RealizationStatus', 'RealizationStatus', '`RealizationStatus`', '`RealizationStatus`', 200, 45, -1, FALSE, '`RealizationStatus`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RealizationStatus->Sortable = TRUE; // Allow sort
		$this->fields['RealizationStatus'] = &$this->RealizationStatus;

		// RealizationRemarks
		$this->RealizationRemarks = new DbField('view_patient_billing', 'view_patient_billing', 'x_RealizationRemarks', 'RealizationRemarks', '`RealizationRemarks`', '`RealizationRemarks`', 200, 45, -1, FALSE, '`RealizationRemarks`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RealizationRemarks->Sortable = TRUE; // Allow sort
		$this->fields['RealizationRemarks'] = &$this->RealizationRemarks;

		// RealizationBatchNo
		$this->RealizationBatchNo = new DbField('view_patient_billing', 'view_patient_billing', 'x_RealizationBatchNo', 'RealizationBatchNo', '`RealizationBatchNo`', '`RealizationBatchNo`', 200, 45, -1, FALSE, '`RealizationBatchNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RealizationBatchNo->Sortable = TRUE; // Allow sort
		$this->fields['RealizationBatchNo'] = &$this->RealizationBatchNo;

		// RealizationDate
		$this->RealizationDate = new DbField('view_patient_billing', 'view_patient_billing', 'x_RealizationDate', 'RealizationDate', '`RealizationDate`', '`RealizationDate`', 200, 45, -1, FALSE, '`RealizationDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RealizationDate->Sortable = TRUE; // Allow sort
		$this->fields['RealizationDate'] = &$this->RealizationDate;

		// RIDNO
		$this->RIDNO = new DbField('view_patient_billing', 'view_patient_billing', 'x_RIDNO', 'RIDNO', '`RIDNO`', '`RIDNO`', 3, 11, -1, FALSE, '`RIDNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RIDNO->Sortable = TRUE; // Allow sort
		$this->RIDNO->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['RIDNO'] = &$this->RIDNO;

		// TidNo
		$this->TidNo = new DbField('view_patient_billing', 'view_patient_billing', 'x_TidNo', 'TidNo', '`TidNo`', '`TidNo`', 3, 11, -1, FALSE, '`TidNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TidNo->Sortable = TRUE; // Allow sort
		$this->TidNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['TidNo'] = &$this->TidNo;

		// CId
		$this->CId = new DbField('view_patient_billing', 'view_patient_billing', 'x_CId', 'CId', '`CId`', '`CId`', 3, 11, -1, FALSE, '`CId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CId->Sortable = TRUE; // Allow sort
		$this->CId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['CId'] = &$this->CId;

		// PartnerName
		$this->PartnerName = new DbField('view_patient_billing', 'view_patient_billing', 'x_PartnerName', 'PartnerName', '`PartnerName`', '`PartnerName`', 200, 45, -1, FALSE, '`PartnerName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PartnerName->Sortable = TRUE; // Allow sort
		$this->fields['PartnerName'] = &$this->PartnerName;

		// PayerType
		$this->PayerType = new DbField('view_patient_billing', 'view_patient_billing', 'x_PayerType', 'PayerType', '`PayerType`', '`PayerType`', 200, 45, -1, FALSE, '`PayerType`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PayerType->Sortable = TRUE; // Allow sort
		$this->fields['PayerType'] = &$this->PayerType;

		// Dob
		$this->Dob = new DbField('view_patient_billing', 'view_patient_billing', 'x_Dob', 'Dob', '`Dob`', '`Dob`', 200, 45, -1, FALSE, '`Dob`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Dob->Sortable = TRUE; // Allow sort
		$this->fields['Dob'] = &$this->Dob;

		// Currency
		$this->Currency = new DbField('view_patient_billing', 'view_patient_billing', 'x_Currency', 'Currency', '`Currency`', '`Currency`', 200, 45, -1, FALSE, '`Currency`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Currency->Sortable = TRUE; // Allow sort
		$this->fields['Currency'] = &$this->Currency;

		// DiscountRemarks
		$this->DiscountRemarks = new DbField('view_patient_billing', 'view_patient_billing', 'x_DiscountRemarks', 'DiscountRemarks', '`DiscountRemarks`', '`DiscountRemarks`', 200, 45, -1, FALSE, '`DiscountRemarks`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DiscountRemarks->Sortable = TRUE; // Allow sort
		$this->fields['DiscountRemarks'] = &$this->DiscountRemarks;

		// Remarks
		$this->Remarks = new DbField('view_patient_billing', 'view_patient_billing', 'x_Remarks', 'Remarks', '`Remarks`', '`Remarks`', 201, 65535, -1, FALSE, '`Remarks`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Remarks->Sortable = TRUE; // Allow sort
		$this->fields['Remarks'] = &$this->Remarks;

		// PatId
		$this->PatId = new DbField('view_patient_billing', 'view_patient_billing', 'x_PatId', 'PatId', '`PatId`', '`PatId`', 3, 11, -1, FALSE, '`PatId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatId->Sortable = TRUE; // Allow sort
		$this->PatId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['PatId'] = &$this->PatId;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_patient_billing`";
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
		$this->mrnno->DbValue = $row['mrnno'];
		$this->profilePic->DbValue = $row['profilePic'];
		$this->Gender->DbValue = $row['Gender'];
		$this->Age->DbValue = $row['Age'];
		$this->createdby->DbValue = $row['createdby'];
		$this->createddatetime->DbValue = $row['createddatetime'];
		$this->modifiedby->DbValue = $row['modifiedby'];
		$this->modifieddatetime->DbValue = $row['modifieddatetime'];
		$this->PatientId->DbValue = $row['PatientId'];
		$this->HospID->DbValue = $row['HospID'];
		$this->Reception->DbValue = $row['Reception'];
		$this->PatientName->DbValue = $row['PatientName'];
		$this->Mobile->DbValue = $row['Mobile'];
		$this->IP_OP->DbValue = $row['IP_OP'];
		$this->Doctor->DbValue = $row['Doctor'];
		$this->voucher_type->DbValue = $row['voucher_type'];
		$this->Details->DbValue = $row['Details'];
		$this->ModeofPayment->DbValue = $row['ModeofPayment'];
		$this->Amount->DbValue = $row['Amount'];
		$this->AnyDues->DbValue = $row['AnyDues'];
		$this->RealizationAmount->DbValue = $row['RealizationAmount'];
		$this->RealizationStatus->DbValue = $row['RealizationStatus'];
		$this->RealizationRemarks->DbValue = $row['RealizationRemarks'];
		$this->RealizationBatchNo->DbValue = $row['RealizationBatchNo'];
		$this->RealizationDate->DbValue = $row['RealizationDate'];
		$this->RIDNO->DbValue = $row['RIDNO'];
		$this->TidNo->DbValue = $row['TidNo'];
		$this->CId->DbValue = $row['CId'];
		$this->PartnerName->DbValue = $row['PartnerName'];
		$this->PayerType->DbValue = $row['PayerType'];
		$this->Dob->DbValue = $row['Dob'];
		$this->Currency->DbValue = $row['Currency'];
		$this->DiscountRemarks->DbValue = $row['DiscountRemarks'];
		$this->Remarks->DbValue = $row['Remarks'];
		$this->PatId->DbValue = $row['PatId'];
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
			return "view_patient_billinglist.php";
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
		if ($pageName == "view_patient_billingview.php")
			return $Language->phrase("View");
		elseif ($pageName == "view_patient_billingedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "view_patient_billingadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "view_patient_billinglist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("view_patient_billingview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_patient_billingview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "view_patient_billingadd.php?" . $this->getUrlParm($parm);
		else
			$url = "view_patient_billingadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("view_patient_billingedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("view_patient_billingadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("view_patient_billingdelete.php", $this->getUrlParm());
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
		$this->mrnno->setDbValue($rs->fields('mrnno'));
		$this->profilePic->setDbValue($rs->fields('profilePic'));
		$this->Gender->setDbValue($rs->fields('Gender'));
		$this->Age->setDbValue($rs->fields('Age'));
		$this->createdby->setDbValue($rs->fields('createdby'));
		$this->createddatetime->setDbValue($rs->fields('createddatetime'));
		$this->modifiedby->setDbValue($rs->fields('modifiedby'));
		$this->modifieddatetime->setDbValue($rs->fields('modifieddatetime'));
		$this->PatientId->setDbValue($rs->fields('PatientId'));
		$this->HospID->setDbValue($rs->fields('HospID'));
		$this->Reception->setDbValue($rs->fields('Reception'));
		$this->PatientName->setDbValue($rs->fields('PatientName'));
		$this->Mobile->setDbValue($rs->fields('Mobile'));
		$this->IP_OP->setDbValue($rs->fields('IP_OP'));
		$this->Doctor->setDbValue($rs->fields('Doctor'));
		$this->voucher_type->setDbValue($rs->fields('voucher_type'));
		$this->Details->setDbValue($rs->fields('Details'));
		$this->ModeofPayment->setDbValue($rs->fields('ModeofPayment'));
		$this->Amount->setDbValue($rs->fields('Amount'));
		$this->AnyDues->setDbValue($rs->fields('AnyDues'));
		$this->RealizationAmount->setDbValue($rs->fields('RealizationAmount'));
		$this->RealizationStatus->setDbValue($rs->fields('RealizationStatus'));
		$this->RealizationRemarks->setDbValue($rs->fields('RealizationRemarks'));
		$this->RealizationBatchNo->setDbValue($rs->fields('RealizationBatchNo'));
		$this->RealizationDate->setDbValue($rs->fields('RealizationDate'));
		$this->RIDNO->setDbValue($rs->fields('RIDNO'));
		$this->TidNo->setDbValue($rs->fields('TidNo'));
		$this->CId->setDbValue($rs->fields('CId'));
		$this->PartnerName->setDbValue($rs->fields('PartnerName'));
		$this->PayerType->setDbValue($rs->fields('PayerType'));
		$this->Dob->setDbValue($rs->fields('Dob'));
		$this->Currency->setDbValue($rs->fields('Currency'));
		$this->DiscountRemarks->setDbValue($rs->fields('DiscountRemarks'));
		$this->Remarks->setDbValue($rs->fields('Remarks'));
		$this->PatId->setDbValue($rs->fields('PatId'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// mrnno
		// profilePic
		// Gender
		// Age
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// PatientId
		// HospID
		// Reception
		// PatientName
		// Mobile
		// IP_OP
		// Doctor
		// voucher_type
		// Details
		// ModeofPayment
		// Amount
		// AnyDues
		// RealizationAmount
		// RealizationStatus
		// RealizationRemarks
		// RealizationBatchNo
		// RealizationDate
		// RIDNO
		// TidNo
		// CId
		// PartnerName
		// PayerType
		// Dob
		// Currency
		// DiscountRemarks
		// Remarks
		// PatId
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// mrnno
		$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
		$this->mrnno->ViewCustomAttributes = "";

		// profilePic
		$this->profilePic->ViewValue = $this->profilePic->CurrentValue;
		$this->profilePic->ViewCustomAttributes = "";

		// Gender
		$this->Gender->ViewValue = $this->Gender->CurrentValue;
		$this->Gender->ViewCustomAttributes = "";

		// Age
		$this->Age->ViewValue = $this->Age->CurrentValue;
		$this->Age->ViewCustomAttributes = "";

		// createdby
		$this->createdby->ViewValue = $this->createdby->CurrentValue;
		$this->createdby->ViewCustomAttributes = "";

		// createddatetime
		$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
		$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
		$this->createddatetime->ViewCustomAttributes = "";

		// modifiedby
		$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
		$this->modifiedby->ViewCustomAttributes = "";

		// modifieddatetime
		$this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
		$this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
		$this->modifieddatetime->ViewCustomAttributes = "";

		// PatientId
		$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
		$this->PatientId->ViewCustomAttributes = "";

		// HospID
		$this->HospID->ViewValue = $this->HospID->CurrentValue;
		$this->HospID->ViewCustomAttributes = "";

		// Reception
		$this->Reception->ViewValue = $this->Reception->CurrentValue;
		$this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
		$this->Reception->ViewCustomAttributes = "";

		// PatientName
		$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
		$this->PatientName->ViewCustomAttributes = "";

		// Mobile
		$this->Mobile->ViewValue = $this->Mobile->CurrentValue;
		$this->Mobile->ViewCustomAttributes = "";

		// IP_OP
		$this->IP_OP->ViewValue = $this->IP_OP->CurrentValue;
		$this->IP_OP->ViewCustomAttributes = "";

		// Doctor
		$this->Doctor->ViewValue = $this->Doctor->CurrentValue;
		$this->Doctor->ViewCustomAttributes = "";

		// voucher_type
		$this->voucher_type->ViewValue = $this->voucher_type->CurrentValue;
		$this->voucher_type->ViewCustomAttributes = "";

		// Details
		$this->Details->ViewValue = $this->Details->CurrentValue;
		$this->Details->ViewCustomAttributes = "";

		// ModeofPayment
		$this->ModeofPayment->ViewValue = $this->ModeofPayment->CurrentValue;
		$this->ModeofPayment->ViewCustomAttributes = "";

		// Amount
		$this->Amount->ViewValue = $this->Amount->CurrentValue;
		$this->Amount->ViewValue = FormatNumber($this->Amount->ViewValue, 2, -2, -2, -2);
		$this->Amount->ViewCustomAttributes = "";

		// AnyDues
		$this->AnyDues->ViewValue = $this->AnyDues->CurrentValue;
		$this->AnyDues->ViewCustomAttributes = "";

		// RealizationAmount
		$this->RealizationAmount->ViewValue = $this->RealizationAmount->CurrentValue;
		$this->RealizationAmount->ViewValue = FormatNumber($this->RealizationAmount->ViewValue, 2, -2, -2, -2);
		$this->RealizationAmount->ViewCustomAttributes = "";

		// RealizationStatus
		$this->RealizationStatus->ViewValue = $this->RealizationStatus->CurrentValue;
		$this->RealizationStatus->ViewCustomAttributes = "";

		// RealizationRemarks
		$this->RealizationRemarks->ViewValue = $this->RealizationRemarks->CurrentValue;
		$this->RealizationRemarks->ViewCustomAttributes = "";

		// RealizationBatchNo
		$this->RealizationBatchNo->ViewValue = $this->RealizationBatchNo->CurrentValue;
		$this->RealizationBatchNo->ViewCustomAttributes = "";

		// RealizationDate
		$this->RealizationDate->ViewValue = $this->RealizationDate->CurrentValue;
		$this->RealizationDate->ViewCustomAttributes = "";

		// RIDNO
		$this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
		$this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
		$this->RIDNO->ViewCustomAttributes = "";

		// TidNo
		$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
		$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
		$this->TidNo->ViewCustomAttributes = "";

		// CId
		$this->CId->ViewValue = $this->CId->CurrentValue;
		$this->CId->ViewValue = FormatNumber($this->CId->ViewValue, 0, -2, -2, -2);
		$this->CId->ViewCustomAttributes = "";

		// PartnerName
		$this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
		$this->PartnerName->ViewCustomAttributes = "";

		// PayerType
		$this->PayerType->ViewValue = $this->PayerType->CurrentValue;
		$this->PayerType->ViewCustomAttributes = "";

		// Dob
		$this->Dob->ViewValue = $this->Dob->CurrentValue;
		$this->Dob->ViewCustomAttributes = "";

		// Currency
		$this->Currency->ViewValue = $this->Currency->CurrentValue;
		$this->Currency->ViewCustomAttributes = "";

		// DiscountRemarks
		$this->DiscountRemarks->ViewValue = $this->DiscountRemarks->CurrentValue;
		$this->DiscountRemarks->ViewCustomAttributes = "";

		// Remarks
		$this->Remarks->ViewValue = $this->Remarks->CurrentValue;
		$this->Remarks->ViewCustomAttributes = "";

		// PatId
		$this->PatId->ViewValue = $this->PatId->CurrentValue;
		$this->PatId->ViewValue = FormatNumber($this->PatId->ViewValue, 0, -2, -2, -2);
		$this->PatId->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// mrnno
		$this->mrnno->LinkCustomAttributes = "";
		$this->mrnno->HrefValue = "";
		$this->mrnno->TooltipValue = "";

		// profilePic
		$this->profilePic->LinkCustomAttributes = "";
		$this->profilePic->HrefValue = "";
		$this->profilePic->TooltipValue = "";

		// Gender
		$this->Gender->LinkCustomAttributes = "";
		$this->Gender->HrefValue = "";
		$this->Gender->TooltipValue = "";

		// Age
		$this->Age->LinkCustomAttributes = "";
		$this->Age->HrefValue = "";
		$this->Age->TooltipValue = "";

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

		// PatientId
		$this->PatientId->LinkCustomAttributes = "";
		$this->PatientId->HrefValue = "";
		$this->PatientId->TooltipValue = "";

		// HospID
		$this->HospID->LinkCustomAttributes = "";
		$this->HospID->HrefValue = "";
		$this->HospID->TooltipValue = "";

		// Reception
		$this->Reception->LinkCustomAttributes = "";
		$this->Reception->HrefValue = "";
		$this->Reception->TooltipValue = "";

		// PatientName
		$this->PatientName->LinkCustomAttributes = "";
		$this->PatientName->HrefValue = "";
		$this->PatientName->TooltipValue = "";

		// Mobile
		$this->Mobile->LinkCustomAttributes = "";
		$this->Mobile->HrefValue = "";
		$this->Mobile->TooltipValue = "";

		// IP_OP
		$this->IP_OP->LinkCustomAttributes = "";
		$this->IP_OP->HrefValue = "";
		$this->IP_OP->TooltipValue = "";

		// Doctor
		$this->Doctor->LinkCustomAttributes = "";
		$this->Doctor->HrefValue = "";
		$this->Doctor->TooltipValue = "";

		// voucher_type
		$this->voucher_type->LinkCustomAttributes = "";
		$this->voucher_type->HrefValue = "";
		$this->voucher_type->TooltipValue = "";

		// Details
		$this->Details->LinkCustomAttributes = "";
		$this->Details->HrefValue = "";
		$this->Details->TooltipValue = "";

		// ModeofPayment
		$this->ModeofPayment->LinkCustomAttributes = "";
		$this->ModeofPayment->HrefValue = "";
		$this->ModeofPayment->TooltipValue = "";

		// Amount
		$this->Amount->LinkCustomAttributes = "";
		$this->Amount->HrefValue = "";
		$this->Amount->TooltipValue = "";

		// AnyDues
		$this->AnyDues->LinkCustomAttributes = "";
		$this->AnyDues->HrefValue = "";
		$this->AnyDues->TooltipValue = "";

		// RealizationAmount
		$this->RealizationAmount->LinkCustomAttributes = "";
		$this->RealizationAmount->HrefValue = "";
		$this->RealizationAmount->TooltipValue = "";

		// RealizationStatus
		$this->RealizationStatus->LinkCustomAttributes = "";
		$this->RealizationStatus->HrefValue = "";
		$this->RealizationStatus->TooltipValue = "";

		// RealizationRemarks
		$this->RealizationRemarks->LinkCustomAttributes = "";
		$this->RealizationRemarks->HrefValue = "";
		$this->RealizationRemarks->TooltipValue = "";

		// RealizationBatchNo
		$this->RealizationBatchNo->LinkCustomAttributes = "";
		$this->RealizationBatchNo->HrefValue = "";
		$this->RealizationBatchNo->TooltipValue = "";

		// RealizationDate
		$this->RealizationDate->LinkCustomAttributes = "";
		$this->RealizationDate->HrefValue = "";
		$this->RealizationDate->TooltipValue = "";

		// RIDNO
		$this->RIDNO->LinkCustomAttributes = "";
		$this->RIDNO->HrefValue = "";
		$this->RIDNO->TooltipValue = "";

		// TidNo
		$this->TidNo->LinkCustomAttributes = "";
		$this->TidNo->HrefValue = "";
		$this->TidNo->TooltipValue = "";

		// CId
		$this->CId->LinkCustomAttributes = "";
		$this->CId->HrefValue = "";
		$this->CId->TooltipValue = "";

		// PartnerName
		$this->PartnerName->LinkCustomAttributes = "";
		$this->PartnerName->HrefValue = "";
		$this->PartnerName->TooltipValue = "";

		// PayerType
		$this->PayerType->LinkCustomAttributes = "";
		$this->PayerType->HrefValue = "";
		$this->PayerType->TooltipValue = "";

		// Dob
		$this->Dob->LinkCustomAttributes = "";
		$this->Dob->HrefValue = "";
		$this->Dob->TooltipValue = "";

		// Currency
		$this->Currency->LinkCustomAttributes = "";
		$this->Currency->HrefValue = "";
		$this->Currency->TooltipValue = "";

		// DiscountRemarks
		$this->DiscountRemarks->LinkCustomAttributes = "";
		$this->DiscountRemarks->HrefValue = "";
		$this->DiscountRemarks->TooltipValue = "";

		// Remarks
		$this->Remarks->LinkCustomAttributes = "";
		$this->Remarks->HrefValue = "";
		$this->Remarks->TooltipValue = "";

		// PatId
		$this->PatId->LinkCustomAttributes = "";
		$this->PatId->HrefValue = "";
		$this->PatId->TooltipValue = "";

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

		// mrnno
		$this->mrnno->EditAttrs["class"] = "form-control";
		$this->mrnno->EditCustomAttributes = "";
		if (!$this->mrnno->Raw)
			$this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
		$this->mrnno->EditValue = $this->mrnno->CurrentValue;
		$this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

		// profilePic
		$this->profilePic->EditAttrs["class"] = "form-control";
		$this->profilePic->EditCustomAttributes = "";
		$this->profilePic->EditValue = $this->profilePic->CurrentValue;
		$this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

		// Gender
		$this->Gender->EditAttrs["class"] = "form-control";
		$this->Gender->EditCustomAttributes = "";
		if (!$this->Gender->Raw)
			$this->Gender->CurrentValue = HtmlDecode($this->Gender->CurrentValue);
		$this->Gender->EditValue = $this->Gender->CurrentValue;
		$this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

		// Age
		$this->Age->EditAttrs["class"] = "form-control";
		$this->Age->EditCustomAttributes = "";
		if (!$this->Age->Raw)
			$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
		$this->Age->EditValue = $this->Age->CurrentValue;
		$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

		// createdby
		$this->createdby->EditAttrs["class"] = "form-control";
		$this->createdby->EditCustomAttributes = "";
		if (!$this->createdby->Raw)
			$this->createdby->CurrentValue = HtmlDecode($this->createdby->CurrentValue);
		$this->createdby->EditValue = $this->createdby->CurrentValue;
		$this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

		// createddatetime
		$this->createddatetime->EditAttrs["class"] = "form-control";
		$this->createddatetime->EditCustomAttributes = "";
		$this->createddatetime->EditValue = FormatDateTime($this->createddatetime->CurrentValue, 8);
		$this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

		// modifiedby
		$this->modifiedby->EditAttrs["class"] = "form-control";
		$this->modifiedby->EditCustomAttributes = "";
		if (!$this->modifiedby->Raw)
			$this->modifiedby->CurrentValue = HtmlDecode($this->modifiedby->CurrentValue);
		$this->modifiedby->EditValue = $this->modifiedby->CurrentValue;
		$this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

		// modifieddatetime
		$this->modifieddatetime->EditAttrs["class"] = "form-control";
		$this->modifieddatetime->EditCustomAttributes = "";
		$this->modifieddatetime->EditValue = FormatDateTime($this->modifieddatetime->CurrentValue, 8);
		$this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

		// PatientId
		$this->PatientId->EditAttrs["class"] = "form-control";
		$this->PatientId->EditCustomAttributes = "";
		if (!$this->PatientId->Raw)
			$this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
		$this->PatientId->EditValue = $this->PatientId->CurrentValue;
		$this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

		// HospID
		$this->HospID->EditAttrs["class"] = "form-control";
		$this->HospID->EditCustomAttributes = "";
		$this->HospID->EditValue = $this->HospID->CurrentValue;
		$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

		// Reception
		$this->Reception->EditAttrs["class"] = "form-control";
		$this->Reception->EditCustomAttributes = "";
		$this->Reception->EditValue = $this->Reception->CurrentValue;
		$this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

		// PatientName
		$this->PatientName->EditAttrs["class"] = "form-control";
		$this->PatientName->EditCustomAttributes = "";
		if (!$this->PatientName->Raw)
			$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
		$this->PatientName->EditValue = $this->PatientName->CurrentValue;
		$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

		// Mobile
		$this->Mobile->EditAttrs["class"] = "form-control";
		$this->Mobile->EditCustomAttributes = "";
		if (!$this->Mobile->Raw)
			$this->Mobile->CurrentValue = HtmlDecode($this->Mobile->CurrentValue);
		$this->Mobile->EditValue = $this->Mobile->CurrentValue;
		$this->Mobile->PlaceHolder = RemoveHtml($this->Mobile->caption());

		// IP_OP
		$this->IP_OP->EditAttrs["class"] = "form-control";
		$this->IP_OP->EditCustomAttributes = "";
		if (!$this->IP_OP->Raw)
			$this->IP_OP->CurrentValue = HtmlDecode($this->IP_OP->CurrentValue);
		$this->IP_OP->EditValue = $this->IP_OP->CurrentValue;
		$this->IP_OP->PlaceHolder = RemoveHtml($this->IP_OP->caption());

		// Doctor
		$this->Doctor->EditAttrs["class"] = "form-control";
		$this->Doctor->EditCustomAttributes = "";
		if (!$this->Doctor->Raw)
			$this->Doctor->CurrentValue = HtmlDecode($this->Doctor->CurrentValue);
		$this->Doctor->EditValue = $this->Doctor->CurrentValue;
		$this->Doctor->PlaceHolder = RemoveHtml($this->Doctor->caption());

		// voucher_type
		$this->voucher_type->EditAttrs["class"] = "form-control";
		$this->voucher_type->EditCustomAttributes = "";
		if (!$this->voucher_type->Raw)
			$this->voucher_type->CurrentValue = HtmlDecode($this->voucher_type->CurrentValue);
		$this->voucher_type->EditValue = $this->voucher_type->CurrentValue;
		$this->voucher_type->PlaceHolder = RemoveHtml($this->voucher_type->caption());

		// Details
		$this->Details->EditAttrs["class"] = "form-control";
		$this->Details->EditCustomAttributes = "";
		if (!$this->Details->Raw)
			$this->Details->CurrentValue = HtmlDecode($this->Details->CurrentValue);
		$this->Details->EditValue = $this->Details->CurrentValue;
		$this->Details->PlaceHolder = RemoveHtml($this->Details->caption());

		// ModeofPayment
		$this->ModeofPayment->EditAttrs["class"] = "form-control";
		$this->ModeofPayment->EditCustomAttributes = "";
		if (!$this->ModeofPayment->Raw)
			$this->ModeofPayment->CurrentValue = HtmlDecode($this->ModeofPayment->CurrentValue);
		$this->ModeofPayment->EditValue = $this->ModeofPayment->CurrentValue;
		$this->ModeofPayment->PlaceHolder = RemoveHtml($this->ModeofPayment->caption());

		// Amount
		$this->Amount->EditAttrs["class"] = "form-control";
		$this->Amount->EditCustomAttributes = "";
		$this->Amount->EditValue = $this->Amount->CurrentValue;
		$this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());
		if (strval($this->Amount->EditValue) != "" && is_numeric($this->Amount->EditValue))
			$this->Amount->EditValue = FormatNumber($this->Amount->EditValue, -2, -2, -2, -2);
		

		// AnyDues
		$this->AnyDues->EditAttrs["class"] = "form-control";
		$this->AnyDues->EditCustomAttributes = "";
		if (!$this->AnyDues->Raw)
			$this->AnyDues->CurrentValue = HtmlDecode($this->AnyDues->CurrentValue);
		$this->AnyDues->EditValue = $this->AnyDues->CurrentValue;
		$this->AnyDues->PlaceHolder = RemoveHtml($this->AnyDues->caption());

		// RealizationAmount
		$this->RealizationAmount->EditAttrs["class"] = "form-control";
		$this->RealizationAmount->EditCustomAttributes = "";
		$this->RealizationAmount->EditValue = $this->RealizationAmount->CurrentValue;
		$this->RealizationAmount->PlaceHolder = RemoveHtml($this->RealizationAmount->caption());
		if (strval($this->RealizationAmount->EditValue) != "" && is_numeric($this->RealizationAmount->EditValue))
			$this->RealizationAmount->EditValue = FormatNumber($this->RealizationAmount->EditValue, -2, -2, -2, -2);
		

		// RealizationStatus
		$this->RealizationStatus->EditAttrs["class"] = "form-control";
		$this->RealizationStatus->EditCustomAttributes = "";
		if (!$this->RealizationStatus->Raw)
			$this->RealizationStatus->CurrentValue = HtmlDecode($this->RealizationStatus->CurrentValue);
		$this->RealizationStatus->EditValue = $this->RealizationStatus->CurrentValue;
		$this->RealizationStatus->PlaceHolder = RemoveHtml($this->RealizationStatus->caption());

		// RealizationRemarks
		$this->RealizationRemarks->EditAttrs["class"] = "form-control";
		$this->RealizationRemarks->EditCustomAttributes = "";
		if (!$this->RealizationRemarks->Raw)
			$this->RealizationRemarks->CurrentValue = HtmlDecode($this->RealizationRemarks->CurrentValue);
		$this->RealizationRemarks->EditValue = $this->RealizationRemarks->CurrentValue;
		$this->RealizationRemarks->PlaceHolder = RemoveHtml($this->RealizationRemarks->caption());

		// RealizationBatchNo
		$this->RealizationBatchNo->EditAttrs["class"] = "form-control";
		$this->RealizationBatchNo->EditCustomAttributes = "";
		if (!$this->RealizationBatchNo->Raw)
			$this->RealizationBatchNo->CurrentValue = HtmlDecode($this->RealizationBatchNo->CurrentValue);
		$this->RealizationBatchNo->EditValue = $this->RealizationBatchNo->CurrentValue;
		$this->RealizationBatchNo->PlaceHolder = RemoveHtml($this->RealizationBatchNo->caption());

		// RealizationDate
		$this->RealizationDate->EditAttrs["class"] = "form-control";
		$this->RealizationDate->EditCustomAttributes = "";
		if (!$this->RealizationDate->Raw)
			$this->RealizationDate->CurrentValue = HtmlDecode($this->RealizationDate->CurrentValue);
		$this->RealizationDate->EditValue = $this->RealizationDate->CurrentValue;
		$this->RealizationDate->PlaceHolder = RemoveHtml($this->RealizationDate->caption());

		// RIDNO
		$this->RIDNO->EditAttrs["class"] = "form-control";
		$this->RIDNO->EditCustomAttributes = "";
		$this->RIDNO->EditValue = $this->RIDNO->CurrentValue;
		$this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());

		// TidNo
		$this->TidNo->EditAttrs["class"] = "form-control";
		$this->TidNo->EditCustomAttributes = "";
		$this->TidNo->EditValue = $this->TidNo->CurrentValue;
		$this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

		// CId
		$this->CId->EditAttrs["class"] = "form-control";
		$this->CId->EditCustomAttributes = "";
		$this->CId->EditValue = $this->CId->CurrentValue;
		$this->CId->PlaceHolder = RemoveHtml($this->CId->caption());

		// PartnerName
		$this->PartnerName->EditAttrs["class"] = "form-control";
		$this->PartnerName->EditCustomAttributes = "";
		if (!$this->PartnerName->Raw)
			$this->PartnerName->CurrentValue = HtmlDecode($this->PartnerName->CurrentValue);
		$this->PartnerName->EditValue = $this->PartnerName->CurrentValue;
		$this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

		// PayerType
		$this->PayerType->EditAttrs["class"] = "form-control";
		$this->PayerType->EditCustomAttributes = "";
		if (!$this->PayerType->Raw)
			$this->PayerType->CurrentValue = HtmlDecode($this->PayerType->CurrentValue);
		$this->PayerType->EditValue = $this->PayerType->CurrentValue;
		$this->PayerType->PlaceHolder = RemoveHtml($this->PayerType->caption());

		// Dob
		$this->Dob->EditAttrs["class"] = "form-control";
		$this->Dob->EditCustomAttributes = "";
		if (!$this->Dob->Raw)
			$this->Dob->CurrentValue = HtmlDecode($this->Dob->CurrentValue);
		$this->Dob->EditValue = $this->Dob->CurrentValue;
		$this->Dob->PlaceHolder = RemoveHtml($this->Dob->caption());

		// Currency
		$this->Currency->EditAttrs["class"] = "form-control";
		$this->Currency->EditCustomAttributes = "";
		if (!$this->Currency->Raw)
			$this->Currency->CurrentValue = HtmlDecode($this->Currency->CurrentValue);
		$this->Currency->EditValue = $this->Currency->CurrentValue;
		$this->Currency->PlaceHolder = RemoveHtml($this->Currency->caption());

		// DiscountRemarks
		$this->DiscountRemarks->EditAttrs["class"] = "form-control";
		$this->DiscountRemarks->EditCustomAttributes = "";
		if (!$this->DiscountRemarks->Raw)
			$this->DiscountRemarks->CurrentValue = HtmlDecode($this->DiscountRemarks->CurrentValue);
		$this->DiscountRemarks->EditValue = $this->DiscountRemarks->CurrentValue;
		$this->DiscountRemarks->PlaceHolder = RemoveHtml($this->DiscountRemarks->caption());

		// Remarks
		$this->Remarks->EditAttrs["class"] = "form-control";
		$this->Remarks->EditCustomAttributes = "";
		if (!$this->Remarks->Raw)
			$this->Remarks->CurrentValue = HtmlDecode($this->Remarks->CurrentValue);
		$this->Remarks->EditValue = $this->Remarks->CurrentValue;
		$this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

		// PatId
		$this->PatId->EditAttrs["class"] = "form-control";
		$this->PatId->EditCustomAttributes = "";
		$this->PatId->EditValue = $this->PatId->CurrentValue;
		$this->PatId->PlaceHolder = RemoveHtml($this->PatId->caption());

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
					$doc->exportCaption($this->mrnno);
					$doc->exportCaption($this->profilePic);
					$doc->exportCaption($this->Gender);
					$doc->exportCaption($this->Age);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
					$doc->exportCaption($this->PatientId);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->Reception);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->Mobile);
					$doc->exportCaption($this->IP_OP);
					$doc->exportCaption($this->Doctor);
					$doc->exportCaption($this->voucher_type);
					$doc->exportCaption($this->Details);
					$doc->exportCaption($this->ModeofPayment);
					$doc->exportCaption($this->Amount);
					$doc->exportCaption($this->AnyDues);
					$doc->exportCaption($this->RealizationAmount);
					$doc->exportCaption($this->RealizationStatus);
					$doc->exportCaption($this->RealizationRemarks);
					$doc->exportCaption($this->RealizationBatchNo);
					$doc->exportCaption($this->RealizationDate);
					$doc->exportCaption($this->RIDNO);
					$doc->exportCaption($this->TidNo);
					$doc->exportCaption($this->CId);
					$doc->exportCaption($this->PartnerName);
					$doc->exportCaption($this->PayerType);
					$doc->exportCaption($this->Dob);
					$doc->exportCaption($this->Currency);
					$doc->exportCaption($this->DiscountRemarks);
					$doc->exportCaption($this->Remarks);
					$doc->exportCaption($this->PatId);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->mrnno);
					$doc->exportCaption($this->Gender);
					$doc->exportCaption($this->Age);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
					$doc->exportCaption($this->PatientId);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->Reception);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->Mobile);
					$doc->exportCaption($this->IP_OP);
					$doc->exportCaption($this->Doctor);
					$doc->exportCaption($this->voucher_type);
					$doc->exportCaption($this->Details);
					$doc->exportCaption($this->ModeofPayment);
					$doc->exportCaption($this->Amount);
					$doc->exportCaption($this->AnyDues);
					$doc->exportCaption($this->RealizationAmount);
					$doc->exportCaption($this->RealizationStatus);
					$doc->exportCaption($this->RealizationRemarks);
					$doc->exportCaption($this->RealizationBatchNo);
					$doc->exportCaption($this->RealizationDate);
					$doc->exportCaption($this->RIDNO);
					$doc->exportCaption($this->TidNo);
					$doc->exportCaption($this->CId);
					$doc->exportCaption($this->PartnerName);
					$doc->exportCaption($this->PayerType);
					$doc->exportCaption($this->Dob);
					$doc->exportCaption($this->Currency);
					$doc->exportCaption($this->DiscountRemarks);
					$doc->exportCaption($this->Remarks);
					$doc->exportCaption($this->PatId);
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
						$doc->exportField($this->mrnno);
						$doc->exportField($this->profilePic);
						$doc->exportField($this->Gender);
						$doc->exportField($this->Age);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
						$doc->exportField($this->PatientId);
						$doc->exportField($this->HospID);
						$doc->exportField($this->Reception);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->Mobile);
						$doc->exportField($this->IP_OP);
						$doc->exportField($this->Doctor);
						$doc->exportField($this->voucher_type);
						$doc->exportField($this->Details);
						$doc->exportField($this->ModeofPayment);
						$doc->exportField($this->Amount);
						$doc->exportField($this->AnyDues);
						$doc->exportField($this->RealizationAmount);
						$doc->exportField($this->RealizationStatus);
						$doc->exportField($this->RealizationRemarks);
						$doc->exportField($this->RealizationBatchNo);
						$doc->exportField($this->RealizationDate);
						$doc->exportField($this->RIDNO);
						$doc->exportField($this->TidNo);
						$doc->exportField($this->CId);
						$doc->exportField($this->PartnerName);
						$doc->exportField($this->PayerType);
						$doc->exportField($this->Dob);
						$doc->exportField($this->Currency);
						$doc->exportField($this->DiscountRemarks);
						$doc->exportField($this->Remarks);
						$doc->exportField($this->PatId);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->mrnno);
						$doc->exportField($this->Gender);
						$doc->exportField($this->Age);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
						$doc->exportField($this->PatientId);
						$doc->exportField($this->HospID);
						$doc->exportField($this->Reception);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->Mobile);
						$doc->exportField($this->IP_OP);
						$doc->exportField($this->Doctor);
						$doc->exportField($this->voucher_type);
						$doc->exportField($this->Details);
						$doc->exportField($this->ModeofPayment);
						$doc->exportField($this->Amount);
						$doc->exportField($this->AnyDues);
						$doc->exportField($this->RealizationAmount);
						$doc->exportField($this->RealizationStatus);
						$doc->exportField($this->RealizationRemarks);
						$doc->exportField($this->RealizationBatchNo);
						$doc->exportField($this->RealizationDate);
						$doc->exportField($this->RIDNO);
						$doc->exportField($this->TidNo);
						$doc->exportField($this->CId);
						$doc->exportField($this->PartnerName);
						$doc->exportField($this->PayerType);
						$doc->exportField($this->Dob);
						$doc->exportField($this->Currency);
						$doc->exportField($this->DiscountRemarks);
						$doc->exportField($this->Remarks);
						$doc->exportField($this->PatId);
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