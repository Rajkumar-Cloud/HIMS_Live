<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for receipts
 */
class receipts extends DbTable
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
	public $Aid;
	public $Vid;
	public $patient_id;
	public $mrnno;
	public $PatientName;
	public $amount;
	public $Discount;
	public $SubTotal;
	public $patient_type;
	public $invoiceId;
	public $invoiceAmount;
	public $invoiceStatus;
	public $modeOfPayment;
	public $charged_date;
	public $status;
	public $createdby;
	public $createddatetime;
	public $modifiedby;
	public $modifieddatetime;
	public $ChequeCardNo;
	public $CreditBankName;
	public $CreditCardHolder;
	public $CreditCardType;
	public $CreditCardMachine;
	public $CreditCardBatchNo;
	public $CreditCardTax;
	public $CreditDeductionAmount;
	public $RealizationAmount;
	public $RealizationStatus;
	public $RealizationRemarks;
	public $RealizationBatchNo;
	public $RealizationDate;
	public $BankAccHolderMobileNumber;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'receipts';
		$this->TableName = 'receipts';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`receipts`";
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
		$this->id = new DbField('receipts', 'receipts', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// Reception
		$this->Reception = new DbField('receipts', 'receipts', 'x_Reception', 'Reception', '`Reception`', '`Reception`', 3, 11, -1, FALSE, '`Reception`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Reception->Nullable = FALSE; // NOT NULL field
		$this->Reception->Required = TRUE; // Required field
		$this->Reception->Sortable = TRUE; // Allow sort
		$this->Reception->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Reception'] = &$this->Reception;

		// Aid
		$this->Aid = new DbField('receipts', 'receipts', 'x_Aid', 'Aid', '`Aid`', '`Aid`', 3, 11, -1, FALSE, '`Aid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Aid->Sortable = TRUE; // Allow sort
		$this->Aid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Aid'] = &$this->Aid;

		// Vid
		$this->Vid = new DbField('receipts', 'receipts', 'x_Vid', 'Vid', '`Vid`', '`Vid`', 3, 11, -1, FALSE, '`Vid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Vid->Sortable = TRUE; // Allow sort
		$this->Vid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Vid'] = &$this->Vid;

		// patient_id
		$this->patient_id = new DbField('receipts', 'receipts', 'x_patient_id', 'patient_id', '`patient_id`', '`patient_id`', 3, 11, -1, FALSE, '`patient_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->patient_id->Nullable = FALSE; // NOT NULL field
		$this->patient_id->Required = TRUE; // Required field
		$this->patient_id->Sortable = TRUE; // Allow sort
		$this->patient_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['patient_id'] = &$this->patient_id;

		// mrnno
		$this->mrnno = new DbField('receipts', 'receipts', 'x_mrnno', 'mrnno', '`mrnno`', '`mrnno`', 200, 45, -1, FALSE, '`mrnno`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mrnno->Sortable = TRUE; // Allow sort
		$this->fields['mrnno'] = &$this->mrnno;

		// PatientName
		$this->PatientName = new DbField('receipts', 'receipts', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, FALSE, '`PatientName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientName->Sortable = TRUE; // Allow sort
		$this->fields['PatientName'] = &$this->PatientName;

		// amount
		$this->amount = new DbField('receipts', 'receipts', 'x_amount', 'amount', '`amount`', '`amount`', 5, 22, -1, FALSE, '`amount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->amount->Nullable = FALSE; // NOT NULL field
		$this->amount->Required = TRUE; // Required field
		$this->amount->Sortable = TRUE; // Allow sort
		$this->amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['amount'] = &$this->amount;

		// Discount
		$this->Discount = new DbField('receipts', 'receipts', 'x_Discount', 'Discount', '`Discount`', '`Discount`', 5, 22, -1, FALSE, '`Discount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Discount->Sortable = TRUE; // Allow sort
		$this->Discount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Discount'] = &$this->Discount;

		// SubTotal
		$this->SubTotal = new DbField('receipts', 'receipts', 'x_SubTotal', 'SubTotal', '`SubTotal`', '`SubTotal`', 5, 22, -1, FALSE, '`SubTotal`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SubTotal->Sortable = TRUE; // Allow sort
		$this->SubTotal->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['SubTotal'] = &$this->SubTotal;

		// patient_type
		$this->patient_type = new DbField('receipts', 'receipts', 'x_patient_type', 'patient_type', '`patient_type`', '`patient_type`', 3, 11, -1, FALSE, '`patient_type`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->patient_type->Nullable = FALSE; // NOT NULL field
		$this->patient_type->Required = TRUE; // Required field
		$this->patient_type->Sortable = TRUE; // Allow sort
		$this->patient_type->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['patient_type'] = &$this->patient_type;

		// invoiceId
		$this->invoiceId = new DbField('receipts', 'receipts', 'x_invoiceId', 'invoiceId', '`invoiceId`', '`invoiceId`', 3, 11, -1, FALSE, '`invoiceId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->invoiceId->Sortable = TRUE; // Allow sort
		$this->invoiceId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['invoiceId'] = &$this->invoiceId;

		// invoiceAmount
		$this->invoiceAmount = new DbField('receipts', 'receipts', 'x_invoiceAmount', 'invoiceAmount', '`invoiceAmount`', '`invoiceAmount`', 5, 22, -1, FALSE, '`invoiceAmount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->invoiceAmount->Sortable = TRUE; // Allow sort
		$this->invoiceAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['invoiceAmount'] = &$this->invoiceAmount;

		// invoiceStatus
		$this->invoiceStatus = new DbField('receipts', 'receipts', 'x_invoiceStatus', 'invoiceStatus', '`invoiceStatus`', '`invoiceStatus`', 200, 45, -1, FALSE, '`invoiceStatus`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->invoiceStatus->Sortable = TRUE; // Allow sort
		$this->fields['invoiceStatus'] = &$this->invoiceStatus;

		// modeOfPayment
		$this->modeOfPayment = new DbField('receipts', 'receipts', 'x_modeOfPayment', 'modeOfPayment', '`modeOfPayment`', '`modeOfPayment`', 200, 45, -1, FALSE, '`modeOfPayment`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modeOfPayment->Sortable = TRUE; // Allow sort
		$this->fields['modeOfPayment'] = &$this->modeOfPayment;

		// charged_date
		$this->charged_date = new DbField('receipts', 'receipts', 'x_charged_date', 'charged_date', '`charged_date`', CastDateFieldForLike("`charged_date`", 0, "DB"), 135, 19, 0, FALSE, '`charged_date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->charged_date->Nullable = FALSE; // NOT NULL field
		$this->charged_date->Required = TRUE; // Required field
		$this->charged_date->Sortable = TRUE; // Allow sort
		$this->charged_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['charged_date'] = &$this->charged_date;

		// status
		$this->status = new DbField('receipts', 'receipts', 'x_status', 'status', '`status`', '`status`', 3, 11, -1, FALSE, '`status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->status->Nullable = FALSE; // NOT NULL field
		$this->status->Required = TRUE; // Required field
		$this->status->Sortable = TRUE; // Allow sort
		$this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['status'] = &$this->status;

		// createdby
		$this->createdby = new DbField('receipts', 'receipts', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, 11, -1, FALSE, '`createdby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdby->Sortable = TRUE; // Allow sort
		$this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['createdby'] = &$this->createdby;

		// createddatetime
		$this->createddatetime = new DbField('receipts', 'receipts', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, FALSE, '`createddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = TRUE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['createddatetime'] = &$this->createddatetime;

		// modifiedby
		$this->modifiedby = new DbField('receipts', 'receipts', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, 11, -1, FALSE, '`modifiedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifiedby->Sortable = TRUE; // Allow sort
		$this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['modifiedby'] = &$this->modifiedby;

		// modifieddatetime
		$this->modifieddatetime = new DbField('receipts', 'receipts', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, FALSE, '`modifieddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifieddatetime->Sortable = TRUE; // Allow sort
		$this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['modifieddatetime'] = &$this->modifieddatetime;

		// ChequeCardNo
		$this->ChequeCardNo = new DbField('receipts', 'receipts', 'x_ChequeCardNo', 'ChequeCardNo', '`ChequeCardNo`', '`ChequeCardNo`', 200, 45, -1, FALSE, '`ChequeCardNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ChequeCardNo->Sortable = TRUE; // Allow sort
		$this->fields['ChequeCardNo'] = &$this->ChequeCardNo;

		// CreditBankName
		$this->CreditBankName = new DbField('receipts', 'receipts', 'x_CreditBankName', 'CreditBankName', '`CreditBankName`', '`CreditBankName`', 200, 45, -1, FALSE, '`CreditBankName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CreditBankName->Sortable = TRUE; // Allow sort
		$this->fields['CreditBankName'] = &$this->CreditBankName;

		// CreditCardHolder
		$this->CreditCardHolder = new DbField('receipts', 'receipts', 'x_CreditCardHolder', 'CreditCardHolder', '`CreditCardHolder`', '`CreditCardHolder`', 200, 45, -1, FALSE, '`CreditCardHolder`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CreditCardHolder->Sortable = TRUE; // Allow sort
		$this->fields['CreditCardHolder'] = &$this->CreditCardHolder;

		// CreditCardType
		$this->CreditCardType = new DbField('receipts', 'receipts', 'x_CreditCardType', 'CreditCardType', '`CreditCardType`', '`CreditCardType`', 200, 45, -1, FALSE, '`CreditCardType`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CreditCardType->Sortable = TRUE; // Allow sort
		$this->fields['CreditCardType'] = &$this->CreditCardType;

		// CreditCardMachine
		$this->CreditCardMachine = new DbField('receipts', 'receipts', 'x_CreditCardMachine', 'CreditCardMachine', '`CreditCardMachine`', '`CreditCardMachine`', 200, 45, -1, FALSE, '`CreditCardMachine`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CreditCardMachine->Sortable = TRUE; // Allow sort
		$this->fields['CreditCardMachine'] = &$this->CreditCardMachine;

		// CreditCardBatchNo
		$this->CreditCardBatchNo = new DbField('receipts', 'receipts', 'x_CreditCardBatchNo', 'CreditCardBatchNo', '`CreditCardBatchNo`', '`CreditCardBatchNo`', 200, 45, -1, FALSE, '`CreditCardBatchNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CreditCardBatchNo->Sortable = TRUE; // Allow sort
		$this->fields['CreditCardBatchNo'] = &$this->CreditCardBatchNo;

		// CreditCardTax
		$this->CreditCardTax = new DbField('receipts', 'receipts', 'x_CreditCardTax', 'CreditCardTax', '`CreditCardTax`', '`CreditCardTax`', 200, 45, -1, FALSE, '`CreditCardTax`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CreditCardTax->Sortable = TRUE; // Allow sort
		$this->fields['CreditCardTax'] = &$this->CreditCardTax;

		// CreditDeductionAmount
		$this->CreditDeductionAmount = new DbField('receipts', 'receipts', 'x_CreditDeductionAmount', 'CreditDeductionAmount', '`CreditDeductionAmount`', '`CreditDeductionAmount`', 200, 45, -1, FALSE, '`CreditDeductionAmount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CreditDeductionAmount->Sortable = TRUE; // Allow sort
		$this->fields['CreditDeductionAmount'] = &$this->CreditDeductionAmount;

		// RealizationAmount
		$this->RealizationAmount = new DbField('receipts', 'receipts', 'x_RealizationAmount', 'RealizationAmount', '`RealizationAmount`', '`RealizationAmount`', 200, 45, -1, FALSE, '`RealizationAmount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RealizationAmount->Sortable = TRUE; // Allow sort
		$this->fields['RealizationAmount'] = &$this->RealizationAmount;

		// RealizationStatus
		$this->RealizationStatus = new DbField('receipts', 'receipts', 'x_RealizationStatus', 'RealizationStatus', '`RealizationStatus`', '`RealizationStatus`', 200, 45, -1, FALSE, '`RealizationStatus`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RealizationStatus->Sortable = TRUE; // Allow sort
		$this->fields['RealizationStatus'] = &$this->RealizationStatus;

		// RealizationRemarks
		$this->RealizationRemarks = new DbField('receipts', 'receipts', 'x_RealizationRemarks', 'RealizationRemarks', '`RealizationRemarks`', '`RealizationRemarks`', 200, 45, -1, FALSE, '`RealizationRemarks`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RealizationRemarks->Sortable = TRUE; // Allow sort
		$this->fields['RealizationRemarks'] = &$this->RealizationRemarks;

		// RealizationBatchNo
		$this->RealizationBatchNo = new DbField('receipts', 'receipts', 'x_RealizationBatchNo', 'RealizationBatchNo', '`RealizationBatchNo`', '`RealizationBatchNo`', 200, 45, -1, FALSE, '`RealizationBatchNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RealizationBatchNo->Sortable = TRUE; // Allow sort
		$this->fields['RealizationBatchNo'] = &$this->RealizationBatchNo;

		// RealizationDate
		$this->RealizationDate = new DbField('receipts', 'receipts', 'x_RealizationDate', 'RealizationDate', '`RealizationDate`', '`RealizationDate`', 200, 45, -1, FALSE, '`RealizationDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RealizationDate->Sortable = TRUE; // Allow sort
		$this->fields['RealizationDate'] = &$this->RealizationDate;

		// BankAccHolderMobileNumber
		$this->BankAccHolderMobileNumber = new DbField('receipts', 'receipts', 'x_BankAccHolderMobileNumber', 'BankAccHolderMobileNumber', '`BankAccHolderMobileNumber`', '`BankAccHolderMobileNumber`', 200, 45, -1, FALSE, '`BankAccHolderMobileNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BankAccHolderMobileNumber->Sortable = TRUE; // Allow sort
		$this->fields['BankAccHolderMobileNumber'] = &$this->BankAccHolderMobileNumber;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`receipts`";
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
		$this->id->DbValue = $row['id'];
		$this->Reception->DbValue = $row['Reception'];
		$this->Aid->DbValue = $row['Aid'];
		$this->Vid->DbValue = $row['Vid'];
		$this->patient_id->DbValue = $row['patient_id'];
		$this->mrnno->DbValue = $row['mrnno'];
		$this->PatientName->DbValue = $row['PatientName'];
		$this->amount->DbValue = $row['amount'];
		$this->Discount->DbValue = $row['Discount'];
		$this->SubTotal->DbValue = $row['SubTotal'];
		$this->patient_type->DbValue = $row['patient_type'];
		$this->invoiceId->DbValue = $row['invoiceId'];
		$this->invoiceAmount->DbValue = $row['invoiceAmount'];
		$this->invoiceStatus->DbValue = $row['invoiceStatus'];
		$this->modeOfPayment->DbValue = $row['modeOfPayment'];
		$this->charged_date->DbValue = $row['charged_date'];
		$this->status->DbValue = $row['status'];
		$this->createdby->DbValue = $row['createdby'];
		$this->createddatetime->DbValue = $row['createddatetime'];
		$this->modifiedby->DbValue = $row['modifiedby'];
		$this->modifieddatetime->DbValue = $row['modifieddatetime'];
		$this->ChequeCardNo->DbValue = $row['ChequeCardNo'];
		$this->CreditBankName->DbValue = $row['CreditBankName'];
		$this->CreditCardHolder->DbValue = $row['CreditCardHolder'];
		$this->CreditCardType->DbValue = $row['CreditCardType'];
		$this->CreditCardMachine->DbValue = $row['CreditCardMachine'];
		$this->CreditCardBatchNo->DbValue = $row['CreditCardBatchNo'];
		$this->CreditCardTax->DbValue = $row['CreditCardTax'];
		$this->CreditDeductionAmount->DbValue = $row['CreditDeductionAmount'];
		$this->RealizationAmount->DbValue = $row['RealizationAmount'];
		$this->RealizationStatus->DbValue = $row['RealizationStatus'];
		$this->RealizationRemarks->DbValue = $row['RealizationRemarks'];
		$this->RealizationBatchNo->DbValue = $row['RealizationBatchNo'];
		$this->RealizationDate->DbValue = $row['RealizationDate'];
		$this->BankAccHolderMobileNumber->DbValue = $row['BankAccHolderMobileNumber'];
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
			return "receiptslist.php";
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
		if ($pageName == "receiptsview.php")
			return $Language->phrase("View");
		elseif ($pageName == "receiptsedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "receiptsadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "receiptslist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("receiptsview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("receiptsview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "receiptsadd.php?" . $this->getUrlParm($parm);
		else
			$url = "receiptsadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("receiptsedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("receiptsadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("receiptsdelete.php", $this->getUrlParm());
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
		$this->Aid->setDbValue($rs->fields('Aid'));
		$this->Vid->setDbValue($rs->fields('Vid'));
		$this->patient_id->setDbValue($rs->fields('patient_id'));
		$this->mrnno->setDbValue($rs->fields('mrnno'));
		$this->PatientName->setDbValue($rs->fields('PatientName'));
		$this->amount->setDbValue($rs->fields('amount'));
		$this->Discount->setDbValue($rs->fields('Discount'));
		$this->SubTotal->setDbValue($rs->fields('SubTotal'));
		$this->patient_type->setDbValue($rs->fields('patient_type'));
		$this->invoiceId->setDbValue($rs->fields('invoiceId'));
		$this->invoiceAmount->setDbValue($rs->fields('invoiceAmount'));
		$this->invoiceStatus->setDbValue($rs->fields('invoiceStatus'));
		$this->modeOfPayment->setDbValue($rs->fields('modeOfPayment'));
		$this->charged_date->setDbValue($rs->fields('charged_date'));
		$this->status->setDbValue($rs->fields('status'));
		$this->createdby->setDbValue($rs->fields('createdby'));
		$this->createddatetime->setDbValue($rs->fields('createddatetime'));
		$this->modifiedby->setDbValue($rs->fields('modifiedby'));
		$this->modifieddatetime->setDbValue($rs->fields('modifieddatetime'));
		$this->ChequeCardNo->setDbValue($rs->fields('ChequeCardNo'));
		$this->CreditBankName->setDbValue($rs->fields('CreditBankName'));
		$this->CreditCardHolder->setDbValue($rs->fields('CreditCardHolder'));
		$this->CreditCardType->setDbValue($rs->fields('CreditCardType'));
		$this->CreditCardMachine->setDbValue($rs->fields('CreditCardMachine'));
		$this->CreditCardBatchNo->setDbValue($rs->fields('CreditCardBatchNo'));
		$this->CreditCardTax->setDbValue($rs->fields('CreditCardTax'));
		$this->CreditDeductionAmount->setDbValue($rs->fields('CreditDeductionAmount'));
		$this->RealizationAmount->setDbValue($rs->fields('RealizationAmount'));
		$this->RealizationStatus->setDbValue($rs->fields('RealizationStatus'));
		$this->RealizationRemarks->setDbValue($rs->fields('RealizationRemarks'));
		$this->RealizationBatchNo->setDbValue($rs->fields('RealizationBatchNo'));
		$this->RealizationDate->setDbValue($rs->fields('RealizationDate'));
		$this->BankAccHolderMobileNumber->setDbValue($rs->fields('BankAccHolderMobileNumber'));
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
		// Aid
		// Vid
		// patient_id
		// mrnno
		// PatientName
		// amount
		// Discount
		// SubTotal
		// patient_type
		// invoiceId
		// invoiceAmount
		// invoiceStatus
		// modeOfPayment
		// charged_date
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// ChequeCardNo
		// CreditBankName
		// CreditCardHolder
		// CreditCardType
		// CreditCardMachine
		// CreditCardBatchNo
		// CreditCardTax
		// CreditDeductionAmount
		// RealizationAmount
		// RealizationStatus
		// RealizationRemarks
		// RealizationBatchNo
		// RealizationDate
		// BankAccHolderMobileNumber
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// Reception
		$this->Reception->ViewValue = $this->Reception->CurrentValue;
		$this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
		$this->Reception->ViewCustomAttributes = "";

		// Aid
		$this->Aid->ViewValue = $this->Aid->CurrentValue;
		$this->Aid->ViewValue = FormatNumber($this->Aid->ViewValue, 0, -2, -2, -2);
		$this->Aid->ViewCustomAttributes = "";

		// Vid
		$this->Vid->ViewValue = $this->Vid->CurrentValue;
		$this->Vid->ViewValue = FormatNumber($this->Vid->ViewValue, 0, -2, -2, -2);
		$this->Vid->ViewCustomAttributes = "";

		// patient_id
		$this->patient_id->ViewValue = $this->patient_id->CurrentValue;
		$this->patient_id->ViewValue = FormatNumber($this->patient_id->ViewValue, 0, -2, -2, -2);
		$this->patient_id->ViewCustomAttributes = "";

		// mrnno
		$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
		$this->mrnno->ViewCustomAttributes = "";

		// PatientName
		$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
		$this->PatientName->ViewCustomAttributes = "";

		// amount
		$this->amount->ViewValue = $this->amount->CurrentValue;
		$this->amount->ViewValue = FormatNumber($this->amount->ViewValue, 2, -2, -2, -2);
		$this->amount->ViewCustomAttributes = "";

		// Discount
		$this->Discount->ViewValue = $this->Discount->CurrentValue;
		$this->Discount->ViewValue = FormatNumber($this->Discount->ViewValue, 2, -2, -2, -2);
		$this->Discount->ViewCustomAttributes = "";

		// SubTotal
		$this->SubTotal->ViewValue = $this->SubTotal->CurrentValue;
		$this->SubTotal->ViewValue = FormatNumber($this->SubTotal->ViewValue, 2, -2, -2, -2);
		$this->SubTotal->ViewCustomAttributes = "";

		// patient_type
		$this->patient_type->ViewValue = $this->patient_type->CurrentValue;
		$this->patient_type->ViewValue = FormatNumber($this->patient_type->ViewValue, 0, -2, -2, -2);
		$this->patient_type->ViewCustomAttributes = "";

		// invoiceId
		$this->invoiceId->ViewValue = $this->invoiceId->CurrentValue;
		$this->invoiceId->ViewValue = FormatNumber($this->invoiceId->ViewValue, 0, -2, -2, -2);
		$this->invoiceId->ViewCustomAttributes = "";

		// invoiceAmount
		$this->invoiceAmount->ViewValue = $this->invoiceAmount->CurrentValue;
		$this->invoiceAmount->ViewValue = FormatNumber($this->invoiceAmount->ViewValue, 2, -2, -2, -2);
		$this->invoiceAmount->ViewCustomAttributes = "";

		// invoiceStatus
		$this->invoiceStatus->ViewValue = $this->invoiceStatus->CurrentValue;
		$this->invoiceStatus->ViewCustomAttributes = "";

		// modeOfPayment
		$this->modeOfPayment->ViewValue = $this->modeOfPayment->CurrentValue;
		$this->modeOfPayment->ViewCustomAttributes = "";

		// charged_date
		$this->charged_date->ViewValue = $this->charged_date->CurrentValue;
		$this->charged_date->ViewValue = FormatDateTime($this->charged_date->ViewValue, 0);
		$this->charged_date->ViewCustomAttributes = "";

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

		// ChequeCardNo
		$this->ChequeCardNo->ViewValue = $this->ChequeCardNo->CurrentValue;
		$this->ChequeCardNo->ViewCustomAttributes = "";

		// CreditBankName
		$this->CreditBankName->ViewValue = $this->CreditBankName->CurrentValue;
		$this->CreditBankName->ViewCustomAttributes = "";

		// CreditCardHolder
		$this->CreditCardHolder->ViewValue = $this->CreditCardHolder->CurrentValue;
		$this->CreditCardHolder->ViewCustomAttributes = "";

		// CreditCardType
		$this->CreditCardType->ViewValue = $this->CreditCardType->CurrentValue;
		$this->CreditCardType->ViewCustomAttributes = "";

		// CreditCardMachine
		$this->CreditCardMachine->ViewValue = $this->CreditCardMachine->CurrentValue;
		$this->CreditCardMachine->ViewCustomAttributes = "";

		// CreditCardBatchNo
		$this->CreditCardBatchNo->ViewValue = $this->CreditCardBatchNo->CurrentValue;
		$this->CreditCardBatchNo->ViewCustomAttributes = "";

		// CreditCardTax
		$this->CreditCardTax->ViewValue = $this->CreditCardTax->CurrentValue;
		$this->CreditCardTax->ViewCustomAttributes = "";

		// CreditDeductionAmount
		$this->CreditDeductionAmount->ViewValue = $this->CreditDeductionAmount->CurrentValue;
		$this->CreditDeductionAmount->ViewCustomAttributes = "";

		// RealizationAmount
		$this->RealizationAmount->ViewValue = $this->RealizationAmount->CurrentValue;
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

		// BankAccHolderMobileNumber
		$this->BankAccHolderMobileNumber->ViewValue = $this->BankAccHolderMobileNumber->CurrentValue;
		$this->BankAccHolderMobileNumber->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// Reception
		$this->Reception->LinkCustomAttributes = "";
		$this->Reception->HrefValue = "";
		$this->Reception->TooltipValue = "";

		// Aid
		$this->Aid->LinkCustomAttributes = "";
		$this->Aid->HrefValue = "";
		$this->Aid->TooltipValue = "";

		// Vid
		$this->Vid->LinkCustomAttributes = "";
		$this->Vid->HrefValue = "";
		$this->Vid->TooltipValue = "";

		// patient_id
		$this->patient_id->LinkCustomAttributes = "";
		$this->patient_id->HrefValue = "";
		$this->patient_id->TooltipValue = "";

		// mrnno
		$this->mrnno->LinkCustomAttributes = "";
		$this->mrnno->HrefValue = "";
		$this->mrnno->TooltipValue = "";

		// PatientName
		$this->PatientName->LinkCustomAttributes = "";
		$this->PatientName->HrefValue = "";
		$this->PatientName->TooltipValue = "";

		// amount
		$this->amount->LinkCustomAttributes = "";
		$this->amount->HrefValue = "";
		$this->amount->TooltipValue = "";

		// Discount
		$this->Discount->LinkCustomAttributes = "";
		$this->Discount->HrefValue = "";
		$this->Discount->TooltipValue = "";

		// SubTotal
		$this->SubTotal->LinkCustomAttributes = "";
		$this->SubTotal->HrefValue = "";
		$this->SubTotal->TooltipValue = "";

		// patient_type
		$this->patient_type->LinkCustomAttributes = "";
		$this->patient_type->HrefValue = "";
		$this->patient_type->TooltipValue = "";

		// invoiceId
		$this->invoiceId->LinkCustomAttributes = "";
		$this->invoiceId->HrefValue = "";
		$this->invoiceId->TooltipValue = "";

		// invoiceAmount
		$this->invoiceAmount->LinkCustomAttributes = "";
		$this->invoiceAmount->HrefValue = "";
		$this->invoiceAmount->TooltipValue = "";

		// invoiceStatus
		$this->invoiceStatus->LinkCustomAttributes = "";
		$this->invoiceStatus->HrefValue = "";
		$this->invoiceStatus->TooltipValue = "";

		// modeOfPayment
		$this->modeOfPayment->LinkCustomAttributes = "";
		$this->modeOfPayment->HrefValue = "";
		$this->modeOfPayment->TooltipValue = "";

		// charged_date
		$this->charged_date->LinkCustomAttributes = "";
		$this->charged_date->HrefValue = "";
		$this->charged_date->TooltipValue = "";

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

		// ChequeCardNo
		$this->ChequeCardNo->LinkCustomAttributes = "";
		$this->ChequeCardNo->HrefValue = "";
		$this->ChequeCardNo->TooltipValue = "";

		// CreditBankName
		$this->CreditBankName->LinkCustomAttributes = "";
		$this->CreditBankName->HrefValue = "";
		$this->CreditBankName->TooltipValue = "";

		// CreditCardHolder
		$this->CreditCardHolder->LinkCustomAttributes = "";
		$this->CreditCardHolder->HrefValue = "";
		$this->CreditCardHolder->TooltipValue = "";

		// CreditCardType
		$this->CreditCardType->LinkCustomAttributes = "";
		$this->CreditCardType->HrefValue = "";
		$this->CreditCardType->TooltipValue = "";

		// CreditCardMachine
		$this->CreditCardMachine->LinkCustomAttributes = "";
		$this->CreditCardMachine->HrefValue = "";
		$this->CreditCardMachine->TooltipValue = "";

		// CreditCardBatchNo
		$this->CreditCardBatchNo->LinkCustomAttributes = "";
		$this->CreditCardBatchNo->HrefValue = "";
		$this->CreditCardBatchNo->TooltipValue = "";

		// CreditCardTax
		$this->CreditCardTax->LinkCustomAttributes = "";
		$this->CreditCardTax->HrefValue = "";
		$this->CreditCardTax->TooltipValue = "";

		// CreditDeductionAmount
		$this->CreditDeductionAmount->LinkCustomAttributes = "";
		$this->CreditDeductionAmount->HrefValue = "";
		$this->CreditDeductionAmount->TooltipValue = "";

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

		// BankAccHolderMobileNumber
		$this->BankAccHolderMobileNumber->LinkCustomAttributes = "";
		$this->BankAccHolderMobileNumber->HrefValue = "";
		$this->BankAccHolderMobileNumber->TooltipValue = "";

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
		$this->Reception->EditValue = $this->Reception->CurrentValue;
		$this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

		// Aid
		$this->Aid->EditAttrs["class"] = "form-control";
		$this->Aid->EditCustomAttributes = "";
		$this->Aid->EditValue = $this->Aid->CurrentValue;
		$this->Aid->PlaceHolder = RemoveHtml($this->Aid->caption());

		// Vid
		$this->Vid->EditAttrs["class"] = "form-control";
		$this->Vid->EditCustomAttributes = "";
		$this->Vid->EditValue = $this->Vid->CurrentValue;
		$this->Vid->PlaceHolder = RemoveHtml($this->Vid->caption());

		// patient_id
		$this->patient_id->EditAttrs["class"] = "form-control";
		$this->patient_id->EditCustomAttributes = "";
		$this->patient_id->EditValue = $this->patient_id->CurrentValue;
		$this->patient_id->PlaceHolder = RemoveHtml($this->patient_id->caption());

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

		// amount
		$this->amount->EditAttrs["class"] = "form-control";
		$this->amount->EditCustomAttributes = "";
		$this->amount->EditValue = $this->amount->CurrentValue;
		$this->amount->PlaceHolder = RemoveHtml($this->amount->caption());
		if (strval($this->amount->EditValue) != "" && is_numeric($this->amount->EditValue))
			$this->amount->EditValue = FormatNumber($this->amount->EditValue, -2, -2, -2, -2);
		

		// Discount
		$this->Discount->EditAttrs["class"] = "form-control";
		$this->Discount->EditCustomAttributes = "";
		$this->Discount->EditValue = $this->Discount->CurrentValue;
		$this->Discount->PlaceHolder = RemoveHtml($this->Discount->caption());
		if (strval($this->Discount->EditValue) != "" && is_numeric($this->Discount->EditValue))
			$this->Discount->EditValue = FormatNumber($this->Discount->EditValue, -2, -2, -2, -2);
		

		// SubTotal
		$this->SubTotal->EditAttrs["class"] = "form-control";
		$this->SubTotal->EditCustomAttributes = "";
		$this->SubTotal->EditValue = $this->SubTotal->CurrentValue;
		$this->SubTotal->PlaceHolder = RemoveHtml($this->SubTotal->caption());
		if (strval($this->SubTotal->EditValue) != "" && is_numeric($this->SubTotal->EditValue))
			$this->SubTotal->EditValue = FormatNumber($this->SubTotal->EditValue, -2, -2, -2, -2);
		

		// patient_type
		$this->patient_type->EditAttrs["class"] = "form-control";
		$this->patient_type->EditCustomAttributes = "";
		$this->patient_type->EditValue = $this->patient_type->CurrentValue;
		$this->patient_type->PlaceHolder = RemoveHtml($this->patient_type->caption());

		// invoiceId
		$this->invoiceId->EditAttrs["class"] = "form-control";
		$this->invoiceId->EditCustomAttributes = "";
		$this->invoiceId->EditValue = $this->invoiceId->CurrentValue;
		$this->invoiceId->PlaceHolder = RemoveHtml($this->invoiceId->caption());

		// invoiceAmount
		$this->invoiceAmount->EditAttrs["class"] = "form-control";
		$this->invoiceAmount->EditCustomAttributes = "";
		$this->invoiceAmount->EditValue = $this->invoiceAmount->CurrentValue;
		$this->invoiceAmount->PlaceHolder = RemoveHtml($this->invoiceAmount->caption());
		if (strval($this->invoiceAmount->EditValue) != "" && is_numeric($this->invoiceAmount->EditValue))
			$this->invoiceAmount->EditValue = FormatNumber($this->invoiceAmount->EditValue, -2, -2, -2, -2);
		

		// invoiceStatus
		$this->invoiceStatus->EditAttrs["class"] = "form-control";
		$this->invoiceStatus->EditCustomAttributes = "";
		if (!$this->invoiceStatus->Raw)
			$this->invoiceStatus->CurrentValue = HtmlDecode($this->invoiceStatus->CurrentValue);
		$this->invoiceStatus->EditValue = $this->invoiceStatus->CurrentValue;
		$this->invoiceStatus->PlaceHolder = RemoveHtml($this->invoiceStatus->caption());

		// modeOfPayment
		$this->modeOfPayment->EditAttrs["class"] = "form-control";
		$this->modeOfPayment->EditCustomAttributes = "";
		if (!$this->modeOfPayment->Raw)
			$this->modeOfPayment->CurrentValue = HtmlDecode($this->modeOfPayment->CurrentValue);
		$this->modeOfPayment->EditValue = $this->modeOfPayment->CurrentValue;
		$this->modeOfPayment->PlaceHolder = RemoveHtml($this->modeOfPayment->caption());

		// charged_date
		$this->charged_date->EditAttrs["class"] = "form-control";
		$this->charged_date->EditCustomAttributes = "";
		$this->charged_date->EditValue = FormatDateTime($this->charged_date->CurrentValue, 8);
		$this->charged_date->PlaceHolder = RemoveHtml($this->charged_date->caption());

		// status
		$this->status->EditAttrs["class"] = "form-control";
		$this->status->EditCustomAttributes = "";
		$this->status->EditValue = $this->status->CurrentValue;
		$this->status->PlaceHolder = RemoveHtml($this->status->caption());

		// createdby
		$this->createdby->EditAttrs["class"] = "form-control";
		$this->createdby->EditCustomAttributes = "";
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
		$this->modifiedby->EditValue = $this->modifiedby->CurrentValue;
		$this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

		// modifieddatetime
		$this->modifieddatetime->EditAttrs["class"] = "form-control";
		$this->modifieddatetime->EditCustomAttributes = "";
		$this->modifieddatetime->EditValue = FormatDateTime($this->modifieddatetime->CurrentValue, 8);
		$this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

		// ChequeCardNo
		$this->ChequeCardNo->EditAttrs["class"] = "form-control";
		$this->ChequeCardNo->EditCustomAttributes = "";
		if (!$this->ChequeCardNo->Raw)
			$this->ChequeCardNo->CurrentValue = HtmlDecode($this->ChequeCardNo->CurrentValue);
		$this->ChequeCardNo->EditValue = $this->ChequeCardNo->CurrentValue;
		$this->ChequeCardNo->PlaceHolder = RemoveHtml($this->ChequeCardNo->caption());

		// CreditBankName
		$this->CreditBankName->EditAttrs["class"] = "form-control";
		$this->CreditBankName->EditCustomAttributes = "";
		if (!$this->CreditBankName->Raw)
			$this->CreditBankName->CurrentValue = HtmlDecode($this->CreditBankName->CurrentValue);
		$this->CreditBankName->EditValue = $this->CreditBankName->CurrentValue;
		$this->CreditBankName->PlaceHolder = RemoveHtml($this->CreditBankName->caption());

		// CreditCardHolder
		$this->CreditCardHolder->EditAttrs["class"] = "form-control";
		$this->CreditCardHolder->EditCustomAttributes = "";
		if (!$this->CreditCardHolder->Raw)
			$this->CreditCardHolder->CurrentValue = HtmlDecode($this->CreditCardHolder->CurrentValue);
		$this->CreditCardHolder->EditValue = $this->CreditCardHolder->CurrentValue;
		$this->CreditCardHolder->PlaceHolder = RemoveHtml($this->CreditCardHolder->caption());

		// CreditCardType
		$this->CreditCardType->EditAttrs["class"] = "form-control";
		$this->CreditCardType->EditCustomAttributes = "";
		if (!$this->CreditCardType->Raw)
			$this->CreditCardType->CurrentValue = HtmlDecode($this->CreditCardType->CurrentValue);
		$this->CreditCardType->EditValue = $this->CreditCardType->CurrentValue;
		$this->CreditCardType->PlaceHolder = RemoveHtml($this->CreditCardType->caption());

		// CreditCardMachine
		$this->CreditCardMachine->EditAttrs["class"] = "form-control";
		$this->CreditCardMachine->EditCustomAttributes = "";
		if (!$this->CreditCardMachine->Raw)
			$this->CreditCardMachine->CurrentValue = HtmlDecode($this->CreditCardMachine->CurrentValue);
		$this->CreditCardMachine->EditValue = $this->CreditCardMachine->CurrentValue;
		$this->CreditCardMachine->PlaceHolder = RemoveHtml($this->CreditCardMachine->caption());

		// CreditCardBatchNo
		$this->CreditCardBatchNo->EditAttrs["class"] = "form-control";
		$this->CreditCardBatchNo->EditCustomAttributes = "";
		if (!$this->CreditCardBatchNo->Raw)
			$this->CreditCardBatchNo->CurrentValue = HtmlDecode($this->CreditCardBatchNo->CurrentValue);
		$this->CreditCardBatchNo->EditValue = $this->CreditCardBatchNo->CurrentValue;
		$this->CreditCardBatchNo->PlaceHolder = RemoveHtml($this->CreditCardBatchNo->caption());

		// CreditCardTax
		$this->CreditCardTax->EditAttrs["class"] = "form-control";
		$this->CreditCardTax->EditCustomAttributes = "";
		if (!$this->CreditCardTax->Raw)
			$this->CreditCardTax->CurrentValue = HtmlDecode($this->CreditCardTax->CurrentValue);
		$this->CreditCardTax->EditValue = $this->CreditCardTax->CurrentValue;
		$this->CreditCardTax->PlaceHolder = RemoveHtml($this->CreditCardTax->caption());

		// CreditDeductionAmount
		$this->CreditDeductionAmount->EditAttrs["class"] = "form-control";
		$this->CreditDeductionAmount->EditCustomAttributes = "";
		if (!$this->CreditDeductionAmount->Raw)
			$this->CreditDeductionAmount->CurrentValue = HtmlDecode($this->CreditDeductionAmount->CurrentValue);
		$this->CreditDeductionAmount->EditValue = $this->CreditDeductionAmount->CurrentValue;
		$this->CreditDeductionAmount->PlaceHolder = RemoveHtml($this->CreditDeductionAmount->caption());

		// RealizationAmount
		$this->RealizationAmount->EditAttrs["class"] = "form-control";
		$this->RealizationAmount->EditCustomAttributes = "";
		if (!$this->RealizationAmount->Raw)
			$this->RealizationAmount->CurrentValue = HtmlDecode($this->RealizationAmount->CurrentValue);
		$this->RealizationAmount->EditValue = $this->RealizationAmount->CurrentValue;
		$this->RealizationAmount->PlaceHolder = RemoveHtml($this->RealizationAmount->caption());

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

		// BankAccHolderMobileNumber
		$this->BankAccHolderMobileNumber->EditAttrs["class"] = "form-control";
		$this->BankAccHolderMobileNumber->EditCustomAttributes = "";
		if (!$this->BankAccHolderMobileNumber->Raw)
			$this->BankAccHolderMobileNumber->CurrentValue = HtmlDecode($this->BankAccHolderMobileNumber->CurrentValue);
		$this->BankAccHolderMobileNumber->EditValue = $this->BankAccHolderMobileNumber->CurrentValue;
		$this->BankAccHolderMobileNumber->PlaceHolder = RemoveHtml($this->BankAccHolderMobileNumber->caption());

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
					$doc->exportCaption($this->Aid);
					$doc->exportCaption($this->Vid);
					$doc->exportCaption($this->patient_id);
					$doc->exportCaption($this->mrnno);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->amount);
					$doc->exportCaption($this->Discount);
					$doc->exportCaption($this->SubTotal);
					$doc->exportCaption($this->patient_type);
					$doc->exportCaption($this->invoiceId);
					$doc->exportCaption($this->invoiceAmount);
					$doc->exportCaption($this->invoiceStatus);
					$doc->exportCaption($this->modeOfPayment);
					$doc->exportCaption($this->charged_date);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
					$doc->exportCaption($this->ChequeCardNo);
					$doc->exportCaption($this->CreditBankName);
					$doc->exportCaption($this->CreditCardHolder);
					$doc->exportCaption($this->CreditCardType);
					$doc->exportCaption($this->CreditCardMachine);
					$doc->exportCaption($this->CreditCardBatchNo);
					$doc->exportCaption($this->CreditCardTax);
					$doc->exportCaption($this->CreditDeductionAmount);
					$doc->exportCaption($this->RealizationAmount);
					$doc->exportCaption($this->RealizationStatus);
					$doc->exportCaption($this->RealizationRemarks);
					$doc->exportCaption($this->RealizationBatchNo);
					$doc->exportCaption($this->RealizationDate);
					$doc->exportCaption($this->BankAccHolderMobileNumber);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->Reception);
					$doc->exportCaption($this->Aid);
					$doc->exportCaption($this->Vid);
					$doc->exportCaption($this->patient_id);
					$doc->exportCaption($this->mrnno);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->amount);
					$doc->exportCaption($this->Discount);
					$doc->exportCaption($this->SubTotal);
					$doc->exportCaption($this->patient_type);
					$doc->exportCaption($this->invoiceId);
					$doc->exportCaption($this->invoiceAmount);
					$doc->exportCaption($this->invoiceStatus);
					$doc->exportCaption($this->modeOfPayment);
					$doc->exportCaption($this->charged_date);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
					$doc->exportCaption($this->ChequeCardNo);
					$doc->exportCaption($this->CreditBankName);
					$doc->exportCaption($this->CreditCardHolder);
					$doc->exportCaption($this->CreditCardType);
					$doc->exportCaption($this->CreditCardMachine);
					$doc->exportCaption($this->CreditCardBatchNo);
					$doc->exportCaption($this->CreditCardTax);
					$doc->exportCaption($this->CreditDeductionAmount);
					$doc->exportCaption($this->RealizationAmount);
					$doc->exportCaption($this->RealizationStatus);
					$doc->exportCaption($this->RealizationRemarks);
					$doc->exportCaption($this->RealizationBatchNo);
					$doc->exportCaption($this->RealizationDate);
					$doc->exportCaption($this->BankAccHolderMobileNumber);
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
						$doc->exportField($this->Aid);
						$doc->exportField($this->Vid);
						$doc->exportField($this->patient_id);
						$doc->exportField($this->mrnno);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->amount);
						$doc->exportField($this->Discount);
						$doc->exportField($this->SubTotal);
						$doc->exportField($this->patient_type);
						$doc->exportField($this->invoiceId);
						$doc->exportField($this->invoiceAmount);
						$doc->exportField($this->invoiceStatus);
						$doc->exportField($this->modeOfPayment);
						$doc->exportField($this->charged_date);
						$doc->exportField($this->status);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
						$doc->exportField($this->ChequeCardNo);
						$doc->exportField($this->CreditBankName);
						$doc->exportField($this->CreditCardHolder);
						$doc->exportField($this->CreditCardType);
						$doc->exportField($this->CreditCardMachine);
						$doc->exportField($this->CreditCardBatchNo);
						$doc->exportField($this->CreditCardTax);
						$doc->exportField($this->CreditDeductionAmount);
						$doc->exportField($this->RealizationAmount);
						$doc->exportField($this->RealizationStatus);
						$doc->exportField($this->RealizationRemarks);
						$doc->exportField($this->RealizationBatchNo);
						$doc->exportField($this->RealizationDate);
						$doc->exportField($this->BankAccHolderMobileNumber);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->Reception);
						$doc->exportField($this->Aid);
						$doc->exportField($this->Vid);
						$doc->exportField($this->patient_id);
						$doc->exportField($this->mrnno);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->amount);
						$doc->exportField($this->Discount);
						$doc->exportField($this->SubTotal);
						$doc->exportField($this->patient_type);
						$doc->exportField($this->invoiceId);
						$doc->exportField($this->invoiceAmount);
						$doc->exportField($this->invoiceStatus);
						$doc->exportField($this->modeOfPayment);
						$doc->exportField($this->charged_date);
						$doc->exportField($this->status);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
						$doc->exportField($this->ChequeCardNo);
						$doc->exportField($this->CreditBankName);
						$doc->exportField($this->CreditCardHolder);
						$doc->exportField($this->CreditCardType);
						$doc->exportField($this->CreditCardMachine);
						$doc->exportField($this->CreditCardBatchNo);
						$doc->exportField($this->CreditCardTax);
						$doc->exportField($this->CreditDeductionAmount);
						$doc->exportField($this->RealizationAmount);
						$doc->exportField($this->RealizationStatus);
						$doc->exportField($this->RealizationRemarks);
						$doc->exportField($this->RealizationBatchNo);
						$doc->exportField($this->RealizationDate);
						$doc->exportField($this->BankAccHolderMobileNumber);
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