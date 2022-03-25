<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for billing_other_voucher
 */
class billing_other_voucher extends DbTable
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
	public $AdvanceNo;
	public $PatientID;
	public $PatientName;
	public $Mobile;
	public $ModeofPayment;
	public $Amount;
	public $CardNumber;
	public $BankName;
	public $Name;
	public $voucher_type;
	public $Details;
	public $Date;
	public $AnyDues;
	public $createdby;
	public $createddatetime;
	public $modifiedby;
	public $modifieddatetime;
	public $PatID;
	public $VisiteType;
	public $VisitDate;
	public $Status;
	public $AdvanceValidityDate;
	public $TotalRemainingAdvance;
	public $Remarks;
	public $SeectPaymentMode;
	public $PaidAmount;
	public $Currency;
	public $HospID;
	public $Reception;
	public $mrnno;
	public $GetUserName;
	public $AdjustmentwithAdvance;
	public $AdjustmentBillNumber;
	public $CancelAdvance;
	public $CancelReasan;
	public $CancelBy;
	public $CancelDate;
	public $CancelDateTime;
	public $CanceledBy;
	public $CancelStatus;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'billing_other_voucher';
		$this->TableName = 'billing_other_voucher';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`billing_other_voucher`";
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
		$this->id = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// AdvanceNo
		$this->AdvanceNo = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_AdvanceNo', 'AdvanceNo', '`AdvanceNo`', '`AdvanceNo`', 200, 45, -1, FALSE, '`AdvanceNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AdvanceNo->Sortable = TRUE; // Allow sort
		$this->fields['AdvanceNo'] = &$this->AdvanceNo;

		// PatientID
		$this->PatientID = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_PatientID', 'PatientID', '`PatientID`', '`PatientID`', 200, 45, -1, FALSE, '`PatientID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientID->Required = TRUE; // Required field
		$this->PatientID->Sortable = TRUE; // Allow sort
		$this->fields['PatientID'] = &$this->PatientID;

		// PatientName
		$this->PatientName = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, FALSE, '`PatientName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientName->Required = TRUE; // Required field
		$this->PatientName->Sortable = TRUE; // Allow sort
		$this->fields['PatientName'] = &$this->PatientName;

		// Mobile
		$this->Mobile = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_Mobile', 'Mobile', '`Mobile`', '`Mobile`', 200, 45, -1, FALSE, '`Mobile`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Mobile->Sortable = TRUE; // Allow sort
		$this->fields['Mobile'] = &$this->Mobile;

		// ModeofPayment
		$this->ModeofPayment = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_ModeofPayment', 'ModeofPayment', '`ModeofPayment`', '`ModeofPayment`', 200, 45, -1, FALSE, '`ModeofPayment`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->ModeofPayment->Required = TRUE; // Required field
		$this->ModeofPayment->Sortable = TRUE; // Allow sort
		$this->ModeofPayment->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->ModeofPayment->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->ModeofPayment->Lookup = new Lookup('ModeofPayment', 'mas_modepayment', FALSE, 'Mode', ["Mode","","",""], [], [], [], [], [], [], '', '');
		$this->fields['ModeofPayment'] = &$this->ModeofPayment;

		// Amount
		$this->Amount = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_Amount', 'Amount', '`Amount`', '`Amount`', 131, 10, -1, FALSE, '`Amount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Amount->Required = TRUE; // Required field
		$this->Amount->Sortable = TRUE; // Allow sort
		$this->Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Amount'] = &$this->Amount;

		// CardNumber
		$this->CardNumber = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_CardNumber', 'CardNumber', '`CardNumber`', '`CardNumber`', 200, 45, -1, FALSE, '`CardNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CardNumber->Sortable = TRUE; // Allow sort
		$this->fields['CardNumber'] = &$this->CardNumber;

		// BankName
		$this->BankName = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_BankName', 'BankName', '`BankName`', '`BankName`', 200, 45, -1, FALSE, '`BankName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BankName->Sortable = TRUE; // Allow sort
		$this->fields['BankName'] = &$this->BankName;

		// Name
		$this->Name = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_Name', 'Name', '`Name`', '`Name`', 200, 45, -1, FALSE, '`Name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Name->Sortable = TRUE; // Allow sort
		$this->fields['Name'] = &$this->Name;

		// voucher_type
		$this->voucher_type = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_voucher_type', 'voucher_type', '`voucher_type`', '`voucher_type`', 200, 45, -1, FALSE, '`voucher_type`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->voucher_type->Sortable = TRUE; // Allow sort
		$this->fields['voucher_type'] = &$this->voucher_type;

		// Details
		$this->Details = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_Details', 'Details', '`Details`', '`Details`', 200, 45, -1, FALSE, '`Details`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Details->Sortable = TRUE; // Allow sort
		$this->fields['Details'] = &$this->Details;

		// Date
		$this->Date = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_Date', 'Date', '`Date`', CastDateFieldForLike("`Date`", 7, "DB"), 135, 19, 7, FALSE, '`Date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Date->Required = TRUE; // Required field
		$this->Date->Sortable = TRUE; // Allow sort
		$this->Date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['Date'] = &$this->Date;

		// AnyDues
		$this->AnyDues = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_AnyDues', 'AnyDues', '`AnyDues`', '`AnyDues`', 200, 45, -1, FALSE, '`AnyDues`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AnyDues->Sortable = TRUE; // Allow sort
		$this->fields['AnyDues'] = &$this->AnyDues;

		// createdby
		$this->createdby = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 200, 45, -1, FALSE, '`createdby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdby->Sortable = TRUE; // Allow sort
		$this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['createdby'] = &$this->createdby;

		// createddatetime
		$this->createddatetime = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 7, "DB"), 135, 19, 7, FALSE, '`createddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = TRUE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['createddatetime'] = &$this->createddatetime;

		// modifiedby
		$this->modifiedby = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 200, 45, -1, FALSE, '`modifiedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifiedby->Sortable = TRUE; // Allow sort
		$this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['modifiedby'] = &$this->modifiedby;

		// modifieddatetime
		$this->modifieddatetime = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, FALSE, '`modifieddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifieddatetime->Sortable = TRUE; // Allow sort
		$this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['modifieddatetime'] = &$this->modifieddatetime;

		// PatID
		$this->PatID = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_PatID', 'PatID', '`PatID`', '`PatID`', 3, 11, -1, FALSE, '`PatID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->PatID->Required = TRUE; // Required field
		$this->PatID->Sortable = TRUE; // Allow sort
		$this->PatID->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->PatID->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->PatID->Lookup = new Lookup('PatID', 'patient', FALSE, 'id', ["PatientID","first_name","mobile_no",""], [], [], [], [], ["first_name","mobile_no","PatientID","first_name"], ["x_Name","x_Mobile","x_PatientID","x_PatientName"], '`id` DESC', '');
		$this->PatID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['PatID'] = &$this->PatID;

		// VisiteType
		$this->VisiteType = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_VisiteType', 'VisiteType', '`VisiteType`', '`VisiteType`', 200, 45, -1, FALSE, '`VisiteType`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->VisiteType->Sortable = TRUE; // Allow sort
		$this->fields['VisiteType'] = &$this->VisiteType;

		// VisitDate
		$this->VisitDate = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_VisitDate', 'VisitDate', '`VisitDate`', CastDateFieldForLike("`VisitDate`", 0, "DB"), 135, 19, -1, FALSE, '`VisitDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->VisitDate->Sortable = TRUE; // Allow sort
		$this->fields['VisitDate'] = &$this->VisitDate;

		// Status
		$this->Status = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_Status', 'Status', '`Status`', '`Status`', 200, 45, -1, FALSE, '`Status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Status->Sortable = TRUE; // Allow sort
		$this->fields['Status'] = &$this->Status;

		// AdvanceValidityDate
		$this->AdvanceValidityDate = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_AdvanceValidityDate', 'AdvanceValidityDate', '`AdvanceValidityDate`', CastDateFieldForLike("`AdvanceValidityDate`", 0, "DB"), 135, 19, 0, FALSE, '`AdvanceValidityDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AdvanceValidityDate->Sortable = TRUE; // Allow sort
		$this->AdvanceValidityDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['AdvanceValidityDate'] = &$this->AdvanceValidityDate;

		// TotalRemainingAdvance
		$this->TotalRemainingAdvance = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_TotalRemainingAdvance', 'TotalRemainingAdvance', '`TotalRemainingAdvance`', '`TotalRemainingAdvance`', 200, 45, -1, FALSE, '`TotalRemainingAdvance`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TotalRemainingAdvance->Sortable = TRUE; // Allow sort
		$this->fields['TotalRemainingAdvance'] = &$this->TotalRemainingAdvance;

		// Remarks
		$this->Remarks = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_Remarks', 'Remarks', '`Remarks`', '`Remarks`', 201, 405, -1, FALSE, '`Remarks`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Remarks->Sortable = TRUE; // Allow sort
		$this->fields['Remarks'] = &$this->Remarks;

		// SeectPaymentMode
		$this->SeectPaymentMode = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_SeectPaymentMode', 'SeectPaymentMode', '`SeectPaymentMode`', '`SeectPaymentMode`', 200, 45, -1, FALSE, '`SeectPaymentMode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SeectPaymentMode->Sortable = TRUE; // Allow sort
		$this->fields['SeectPaymentMode'] = &$this->SeectPaymentMode;

		// PaidAmount
		$this->PaidAmount = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_PaidAmount', 'PaidAmount', '`PaidAmount`', '`PaidAmount`', 200, 45, -1, FALSE, '`PaidAmount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PaidAmount->Sortable = TRUE; // Allow sort
		$this->fields['PaidAmount'] = &$this->PaidAmount;

		// Currency
		$this->Currency = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_Currency', 'Currency', '`Currency`', '`Currency`', 200, 45, -1, FALSE, '`Currency`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Currency->Sortable = TRUE; // Allow sort
		$this->fields['Currency'] = &$this->Currency;

		// HospID
		$this->HospID = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HospID'] = &$this->HospID;

		// Reception
		$this->Reception = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_Reception', 'Reception', '`Reception`', '`Reception`', 3, 11, -1, FALSE, '`Reception`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Reception->Sortable = TRUE; // Allow sort
		$this->Reception->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Reception'] = &$this->Reception;

		// mrnno
		$this->mrnno = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_mrnno', 'mrnno', '`mrnno`', '`mrnno`', 200, 45, -1, FALSE, '`mrnno`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mrnno->Sortable = TRUE; // Allow sort
		$this->fields['mrnno'] = &$this->mrnno;

		// GetUserName
		$this->GetUserName = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_GetUserName', 'GetUserName', '`GetUserName`', '`GetUserName`', 200, 45, -1, FALSE, '`GetUserName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->GetUserName->Sortable = TRUE; // Allow sort
		$this->fields['GetUserName'] = &$this->GetUserName;

		// AdjustmentwithAdvance
		$this->AdjustmentwithAdvance = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_AdjustmentwithAdvance', 'AdjustmentwithAdvance', '`AdjustmentwithAdvance`', '`AdjustmentwithAdvance`', 200, 45, -1, FALSE, '`AdjustmentwithAdvance`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AdjustmentwithAdvance->Sortable = TRUE; // Allow sort
		$this->fields['AdjustmentwithAdvance'] = &$this->AdjustmentwithAdvance;

		// AdjustmentBillNumber
		$this->AdjustmentBillNumber = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_AdjustmentBillNumber', 'AdjustmentBillNumber', '`AdjustmentBillNumber`', '`AdjustmentBillNumber`', 200, 45, -1, FALSE, '`AdjustmentBillNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AdjustmentBillNumber->Sortable = TRUE; // Allow sort
		$this->fields['AdjustmentBillNumber'] = &$this->AdjustmentBillNumber;

		// CancelAdvance
		$this->CancelAdvance = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_CancelAdvance', 'CancelAdvance', '`CancelAdvance`', '`CancelAdvance`', 200, 45, -1, FALSE, '`CancelAdvance`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->CancelAdvance->Sortable = TRUE; // Allow sort
		$this->CancelAdvance->Lookup = new Lookup('CancelAdvance', 'billing_other_voucher', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->CancelAdvance->OptionCount = 1;
		$this->fields['CancelAdvance'] = &$this->CancelAdvance;

		// CancelReasan
		$this->CancelReasan = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_CancelReasan', 'CancelReasan', '`CancelReasan`', '`CancelReasan`', 201, 450, -1, FALSE, '`CancelReasan`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->CancelReasan->Sortable = TRUE; // Allow sort
		$this->fields['CancelReasan'] = &$this->CancelReasan;

		// CancelBy
		$this->CancelBy = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_CancelBy', 'CancelBy', '`CancelBy`', '`CancelBy`', 200, 45, -1, FALSE, '`CancelBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CancelBy->Sortable = TRUE; // Allow sort
		$this->fields['CancelBy'] = &$this->CancelBy;

		// CancelDate
		$this->CancelDate = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_CancelDate', 'CancelDate', '`CancelDate`', CastDateFieldForLike("`CancelDate`", 7, "DB"), 135, 19, 7, FALSE, '`CancelDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CancelDate->Sortable = TRUE; // Allow sort
		$this->CancelDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['CancelDate'] = &$this->CancelDate;

		// CancelDateTime
		$this->CancelDateTime = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_CancelDateTime', 'CancelDateTime', '`CancelDateTime`', CastDateFieldForLike("`CancelDateTime`", 0, "DB"), 135, 19, 0, FALSE, '`CancelDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CancelDateTime->Sortable = TRUE; // Allow sort
		$this->CancelDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['CancelDateTime'] = &$this->CancelDateTime;

		// CanceledBy
		$this->CanceledBy = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_CanceledBy', 'CanceledBy', '`CanceledBy`', '`CanceledBy`', 200, 45, -1, FALSE, '`CanceledBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CanceledBy->Sortable = TRUE; // Allow sort
		$this->fields['CanceledBy'] = &$this->CanceledBy;

		// CancelStatus
		$this->CancelStatus = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_CancelStatus', 'CancelStatus', '`CancelStatus`', '`CancelStatus`', 200, 45, -1, FALSE, '`CancelStatus`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->CancelStatus->Sortable = TRUE; // Allow sort
		$this->CancelStatus->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->CancelStatus->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->CancelStatus->Lookup = new Lookup('CancelStatus', 'billing_other_voucher', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->CancelStatus->OptionCount = 3;
		$this->fields['CancelStatus'] = &$this->CancelStatus;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`billing_other_voucher`";
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
		$this->AdvanceNo->DbValue = $row['AdvanceNo'];
		$this->PatientID->DbValue = $row['PatientID'];
		$this->PatientName->DbValue = $row['PatientName'];
		$this->Mobile->DbValue = $row['Mobile'];
		$this->ModeofPayment->DbValue = $row['ModeofPayment'];
		$this->Amount->DbValue = $row['Amount'];
		$this->CardNumber->DbValue = $row['CardNumber'];
		$this->BankName->DbValue = $row['BankName'];
		$this->Name->DbValue = $row['Name'];
		$this->voucher_type->DbValue = $row['voucher_type'];
		$this->Details->DbValue = $row['Details'];
		$this->Date->DbValue = $row['Date'];
		$this->AnyDues->DbValue = $row['AnyDues'];
		$this->createdby->DbValue = $row['createdby'];
		$this->createddatetime->DbValue = $row['createddatetime'];
		$this->modifiedby->DbValue = $row['modifiedby'];
		$this->modifieddatetime->DbValue = $row['modifieddatetime'];
		$this->PatID->DbValue = $row['PatID'];
		$this->VisiteType->DbValue = $row['VisiteType'];
		$this->VisitDate->DbValue = $row['VisitDate'];
		$this->Status->DbValue = $row['Status'];
		$this->AdvanceValidityDate->DbValue = $row['AdvanceValidityDate'];
		$this->TotalRemainingAdvance->DbValue = $row['TotalRemainingAdvance'];
		$this->Remarks->DbValue = $row['Remarks'];
		$this->SeectPaymentMode->DbValue = $row['SeectPaymentMode'];
		$this->PaidAmount->DbValue = $row['PaidAmount'];
		$this->Currency->DbValue = $row['Currency'];
		$this->HospID->DbValue = $row['HospID'];
		$this->Reception->DbValue = $row['Reception'];
		$this->mrnno->DbValue = $row['mrnno'];
		$this->GetUserName->DbValue = $row['GetUserName'];
		$this->AdjustmentwithAdvance->DbValue = $row['AdjustmentwithAdvance'];
		$this->AdjustmentBillNumber->DbValue = $row['AdjustmentBillNumber'];
		$this->CancelAdvance->DbValue = $row['CancelAdvance'];
		$this->CancelReasan->DbValue = $row['CancelReasan'];
		$this->CancelBy->DbValue = $row['CancelBy'];
		$this->CancelDate->DbValue = $row['CancelDate'];
		$this->CancelDateTime->DbValue = $row['CancelDateTime'];
		$this->CanceledBy->DbValue = $row['CanceledBy'];
		$this->CancelStatus->DbValue = $row['CancelStatus'];
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
			return "billing_other_voucherlist.php";
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
		if ($pageName == "billing_other_voucherview.php")
			return $Language->phrase("View");
		elseif ($pageName == "billing_other_voucheredit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "billing_other_voucheradd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "billing_other_voucherlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("billing_other_voucherview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("billing_other_voucherview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "billing_other_voucheradd.php?" . $this->getUrlParm($parm);
		else
			$url = "billing_other_voucheradd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("billing_other_voucheredit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("billing_other_voucheradd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("billing_other_voucherdelete.php", $this->getUrlParm());
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
		$this->AdvanceNo->setDbValue($rs->fields('AdvanceNo'));
		$this->PatientID->setDbValue($rs->fields('PatientID'));
		$this->PatientName->setDbValue($rs->fields('PatientName'));
		$this->Mobile->setDbValue($rs->fields('Mobile'));
		$this->ModeofPayment->setDbValue($rs->fields('ModeofPayment'));
		$this->Amount->setDbValue($rs->fields('Amount'));
		$this->CardNumber->setDbValue($rs->fields('CardNumber'));
		$this->BankName->setDbValue($rs->fields('BankName'));
		$this->Name->setDbValue($rs->fields('Name'));
		$this->voucher_type->setDbValue($rs->fields('voucher_type'));
		$this->Details->setDbValue($rs->fields('Details'));
		$this->Date->setDbValue($rs->fields('Date'));
		$this->AnyDues->setDbValue($rs->fields('AnyDues'));
		$this->createdby->setDbValue($rs->fields('createdby'));
		$this->createddatetime->setDbValue($rs->fields('createddatetime'));
		$this->modifiedby->setDbValue($rs->fields('modifiedby'));
		$this->modifieddatetime->setDbValue($rs->fields('modifieddatetime'));
		$this->PatID->setDbValue($rs->fields('PatID'));
		$this->VisiteType->setDbValue($rs->fields('VisiteType'));
		$this->VisitDate->setDbValue($rs->fields('VisitDate'));
		$this->Status->setDbValue($rs->fields('Status'));
		$this->AdvanceValidityDate->setDbValue($rs->fields('AdvanceValidityDate'));
		$this->TotalRemainingAdvance->setDbValue($rs->fields('TotalRemainingAdvance'));
		$this->Remarks->setDbValue($rs->fields('Remarks'));
		$this->SeectPaymentMode->setDbValue($rs->fields('SeectPaymentMode'));
		$this->PaidAmount->setDbValue($rs->fields('PaidAmount'));
		$this->Currency->setDbValue($rs->fields('Currency'));
		$this->HospID->setDbValue($rs->fields('HospID'));
		$this->Reception->setDbValue($rs->fields('Reception'));
		$this->mrnno->setDbValue($rs->fields('mrnno'));
		$this->GetUserName->setDbValue($rs->fields('GetUserName'));
		$this->AdjustmentwithAdvance->setDbValue($rs->fields('AdjustmentwithAdvance'));
		$this->AdjustmentBillNumber->setDbValue($rs->fields('AdjustmentBillNumber'));
		$this->CancelAdvance->setDbValue($rs->fields('CancelAdvance'));
		$this->CancelReasan->setDbValue($rs->fields('CancelReasan'));
		$this->CancelBy->setDbValue($rs->fields('CancelBy'));
		$this->CancelDate->setDbValue($rs->fields('CancelDate'));
		$this->CancelDateTime->setDbValue($rs->fields('CancelDateTime'));
		$this->CanceledBy->setDbValue($rs->fields('CanceledBy'));
		$this->CancelStatus->setDbValue($rs->fields('CancelStatus'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// AdvanceNo
		// PatientID
		// PatientName
		// Mobile
		// ModeofPayment
		// Amount
		// CardNumber
		// BankName
		// Name
		// voucher_type
		// Details
		// Date
		// AnyDues
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// PatID
		// VisiteType
		// VisitDate
		// Status
		// AdvanceValidityDate
		// TotalRemainingAdvance
		// Remarks
		// SeectPaymentMode
		// PaidAmount
		// Currency
		// HospID
		// Reception
		// mrnno
		// GetUserName
		// AdjustmentwithAdvance
		// AdjustmentBillNumber
		// CancelAdvance
		// CancelReasan
		// CancelBy
		// CancelDate
		// CancelDateTime
		// CanceledBy
		// CancelStatus
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// AdvanceNo
		$this->AdvanceNo->ViewValue = $this->AdvanceNo->CurrentValue;
		$this->AdvanceNo->ViewCustomAttributes = "";

		// PatientID
		$this->PatientID->ViewValue = $this->PatientID->CurrentValue;
		$this->PatientID->ViewCustomAttributes = "";

		// PatientName
		$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
		$this->PatientName->ViewCustomAttributes = "";

		// Mobile
		$this->Mobile->ViewValue = $this->Mobile->CurrentValue;
		$this->Mobile->ViewCustomAttributes = "";

		// ModeofPayment
		$curVal = strval($this->ModeofPayment->CurrentValue);
		if ($curVal != "") {
			$this->ModeofPayment->ViewValue = $this->ModeofPayment->lookupCacheOption($curVal);
			if ($this->ModeofPayment->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Mode`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->ModeofPayment->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->ModeofPayment->ViewValue = $this->ModeofPayment->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->ModeofPayment->ViewValue = $this->ModeofPayment->CurrentValue;
				}
			}
		} else {
			$this->ModeofPayment->ViewValue = NULL;
		}
		$this->ModeofPayment->ViewCustomAttributes = "";

		// Amount
		$this->Amount->ViewValue = $this->Amount->CurrentValue;
		$this->Amount->ViewValue = FormatNumber($this->Amount->ViewValue, 2, -2, -2, -2);
		$this->Amount->ViewCustomAttributes = "";

		// CardNumber
		$this->CardNumber->ViewValue = $this->CardNumber->CurrentValue;
		$this->CardNumber->ViewCustomAttributes = "";

		// BankName
		$this->BankName->ViewValue = $this->BankName->CurrentValue;
		$this->BankName->ViewCustomAttributes = "";

		// Name
		$this->Name->ViewValue = $this->Name->CurrentValue;
		$this->Name->ViewCustomAttributes = "";

		// voucher_type
		$this->voucher_type->ViewValue = $this->voucher_type->CurrentValue;
		$this->voucher_type->ViewCustomAttributes = "";

		// Details
		$this->Details->ViewValue = $this->Details->CurrentValue;
		$this->Details->ViewCustomAttributes = "";

		// Date
		$this->Date->ViewValue = $this->Date->CurrentValue;
		$this->Date->ViewValue = FormatDateTime($this->Date->ViewValue, 7);
		$this->Date->ViewCustomAttributes = "";

		// AnyDues
		$this->AnyDues->ViewValue = $this->AnyDues->CurrentValue;
		$this->AnyDues->ViewCustomAttributes = "";

		// createdby
		$this->createdby->ViewValue = $this->createdby->CurrentValue;
		$this->createdby->ViewCustomAttributes = "";

		// createddatetime
		$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
		$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 7);
		$this->createddatetime->ViewCustomAttributes = "";

		// modifiedby
		$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
		$this->modifiedby->ViewCustomAttributes = "";

		// modifieddatetime
		$this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
		$this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
		$this->modifieddatetime->ViewCustomAttributes = "";

		// PatID
		$curVal = strval($this->PatID->CurrentValue);
		if ($curVal != "") {
			$this->PatID->ViewValue = $this->PatID->lookupCacheOption($curVal);
			if ($this->PatID->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->PatID->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$arwrk[3] = $rswrk->fields('df3');
					$this->PatID->ViewValue = $this->PatID->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->PatID->ViewValue = $this->PatID->CurrentValue;
				}
			}
		} else {
			$this->PatID->ViewValue = NULL;
		}
		$this->PatID->ViewCustomAttributes = "";

		// VisiteType
		$this->VisiteType->ViewValue = $this->VisiteType->CurrentValue;
		$this->VisiteType->ViewCustomAttributes = "";

		// VisitDate
		$this->VisitDate->ViewValue = $this->VisitDate->CurrentValue;
		$this->VisitDate->ViewCustomAttributes = "";

		// Status
		$this->Status->ViewValue = $this->Status->CurrentValue;
		$this->Status->ViewCustomAttributes = "";

		// AdvanceValidityDate
		$this->AdvanceValidityDate->ViewValue = $this->AdvanceValidityDate->CurrentValue;
		$this->AdvanceValidityDate->ViewValue = FormatDateTime($this->AdvanceValidityDate->ViewValue, 0);
		$this->AdvanceValidityDate->ViewCustomAttributes = "";

		// TotalRemainingAdvance
		$this->TotalRemainingAdvance->ViewValue = $this->TotalRemainingAdvance->CurrentValue;
		$this->TotalRemainingAdvance->ViewCustomAttributes = "";

		// Remarks
		$this->Remarks->ViewValue = $this->Remarks->CurrentValue;
		$this->Remarks->ViewCustomAttributes = "";

		// SeectPaymentMode
		$this->SeectPaymentMode->ViewValue = $this->SeectPaymentMode->CurrentValue;
		$this->SeectPaymentMode->ViewCustomAttributes = "";

		// PaidAmount
		$this->PaidAmount->ViewValue = $this->PaidAmount->CurrentValue;
		$this->PaidAmount->ViewCustomAttributes = "";

		// Currency
		$this->Currency->ViewValue = $this->Currency->CurrentValue;
		$this->Currency->ViewCustomAttributes = "";

		// HospID
		$this->HospID->ViewValue = $this->HospID->CurrentValue;
		$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
		$this->HospID->ViewCustomAttributes = "";

		// Reception
		$this->Reception->ViewValue = $this->Reception->CurrentValue;
		$this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
		$this->Reception->ViewCustomAttributes = "";

		// mrnno
		$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
		$this->mrnno->ViewCustomAttributes = "";

		// GetUserName
		$this->GetUserName->ViewValue = $this->GetUserName->CurrentValue;
		$this->GetUserName->ViewCustomAttributes = "";

		// AdjustmentwithAdvance
		$this->AdjustmentwithAdvance->ViewValue = $this->AdjustmentwithAdvance->CurrentValue;
		$this->AdjustmentwithAdvance->ViewCustomAttributes = "";

		// AdjustmentBillNumber
		$this->AdjustmentBillNumber->ViewValue = $this->AdjustmentBillNumber->CurrentValue;
		$this->AdjustmentBillNumber->ViewCustomAttributes = "";

		// CancelAdvance
		if (strval($this->CancelAdvance->CurrentValue) != "") {
			$this->CancelAdvance->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->CancelAdvance->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->CancelAdvance->ViewValue->add($this->CancelAdvance->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->CancelAdvance->ViewValue = NULL;
		}
		$this->CancelAdvance->ViewCustomAttributes = "";

		// CancelReasan
		$this->CancelReasan->ViewValue = $this->CancelReasan->CurrentValue;
		$this->CancelReasan->ViewCustomAttributes = "";

		// CancelBy
		$this->CancelBy->ViewValue = $this->CancelBy->CurrentValue;
		$this->CancelBy->ViewCustomAttributes = "";

		// CancelDate
		$this->CancelDate->ViewValue = $this->CancelDate->CurrentValue;
		$this->CancelDate->ViewValue = FormatDateTime($this->CancelDate->ViewValue, 7);
		$this->CancelDate->ViewCustomAttributes = "";

		// CancelDateTime
		$this->CancelDateTime->ViewValue = $this->CancelDateTime->CurrentValue;
		$this->CancelDateTime->ViewValue = FormatDateTime($this->CancelDateTime->ViewValue, 0);
		$this->CancelDateTime->ViewCustomAttributes = "";

		// CanceledBy
		$this->CanceledBy->ViewValue = $this->CanceledBy->CurrentValue;
		$this->CanceledBy->ViewCustomAttributes = "";

		// CancelStatus
		if (strval($this->CancelStatus->CurrentValue) != "") {
			$this->CancelStatus->ViewValue = $this->CancelStatus->optionCaption($this->CancelStatus->CurrentValue);
		} else {
			$this->CancelStatus->ViewValue = NULL;
		}
		$this->CancelStatus->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// AdvanceNo
		$this->AdvanceNo->LinkCustomAttributes = "";
		$this->AdvanceNo->HrefValue = "";
		$this->AdvanceNo->TooltipValue = "";

		// PatientID
		$this->PatientID->LinkCustomAttributes = "";
		$this->PatientID->HrefValue = "";
		$this->PatientID->TooltipValue = "";

		// PatientName
		$this->PatientName->LinkCustomAttributes = "";
		$this->PatientName->HrefValue = "";
		$this->PatientName->TooltipValue = "";

		// Mobile
		$this->Mobile->LinkCustomAttributes = "";
		$this->Mobile->HrefValue = "";
		$this->Mobile->TooltipValue = "";

		// ModeofPayment
		$this->ModeofPayment->LinkCustomAttributes = "";
		$this->ModeofPayment->HrefValue = "";
		$this->ModeofPayment->TooltipValue = "";

		// Amount
		$this->Amount->LinkCustomAttributes = "";
		$this->Amount->HrefValue = "";
		$this->Amount->TooltipValue = "";

		// CardNumber
		$this->CardNumber->LinkCustomAttributes = "";
		$this->CardNumber->HrefValue = "";
		$this->CardNumber->TooltipValue = "";

		// BankName
		$this->BankName->LinkCustomAttributes = "";
		$this->BankName->HrefValue = "";
		$this->BankName->TooltipValue = "";

		// Name
		$this->Name->LinkCustomAttributes = "";
		$this->Name->HrefValue = "";
		$this->Name->TooltipValue = "";

		// voucher_type
		$this->voucher_type->LinkCustomAttributes = "";
		$this->voucher_type->HrefValue = "";
		$this->voucher_type->TooltipValue = "";

		// Details
		$this->Details->LinkCustomAttributes = "";
		$this->Details->HrefValue = "";
		$this->Details->TooltipValue = "";

		// Date
		$this->Date->LinkCustomAttributes = "";
		$this->Date->HrefValue = "";
		$this->Date->TooltipValue = "";

		// AnyDues
		$this->AnyDues->LinkCustomAttributes = "";
		$this->AnyDues->HrefValue = "";
		$this->AnyDues->TooltipValue = "";

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

		// PatID
		$this->PatID->LinkCustomAttributes = "";
		$this->PatID->HrefValue = "";
		$this->PatID->TooltipValue = "";

		// VisiteType
		$this->VisiteType->LinkCustomAttributes = "";
		$this->VisiteType->HrefValue = "";
		$this->VisiteType->TooltipValue = "";

		// VisitDate
		$this->VisitDate->LinkCustomAttributes = "";
		$this->VisitDate->HrefValue = "";
		$this->VisitDate->TooltipValue = "";

		// Status
		$this->Status->LinkCustomAttributes = "";
		$this->Status->HrefValue = "";
		$this->Status->TooltipValue = "";

		// AdvanceValidityDate
		$this->AdvanceValidityDate->LinkCustomAttributes = "";
		$this->AdvanceValidityDate->HrefValue = "";
		$this->AdvanceValidityDate->TooltipValue = "";

		// TotalRemainingAdvance
		$this->TotalRemainingAdvance->LinkCustomAttributes = "";
		$this->TotalRemainingAdvance->HrefValue = "";
		$this->TotalRemainingAdvance->TooltipValue = "";

		// Remarks
		$this->Remarks->LinkCustomAttributes = "";
		$this->Remarks->HrefValue = "";
		$this->Remarks->TooltipValue = "";

		// SeectPaymentMode
		$this->SeectPaymentMode->LinkCustomAttributes = "";
		$this->SeectPaymentMode->HrefValue = "";
		$this->SeectPaymentMode->TooltipValue = "";

		// PaidAmount
		$this->PaidAmount->LinkCustomAttributes = "";
		$this->PaidAmount->HrefValue = "";
		$this->PaidAmount->TooltipValue = "";

		// Currency
		$this->Currency->LinkCustomAttributes = "";
		$this->Currency->HrefValue = "";
		$this->Currency->TooltipValue = "";

		// HospID
		$this->HospID->LinkCustomAttributes = "";
		$this->HospID->HrefValue = "";
		$this->HospID->TooltipValue = "";

		// Reception
		$this->Reception->LinkCustomAttributes = "";
		$this->Reception->HrefValue = "";
		$this->Reception->TooltipValue = "";

		// mrnno
		$this->mrnno->LinkCustomAttributes = "";
		$this->mrnno->HrefValue = "";
		$this->mrnno->TooltipValue = "";

		// GetUserName
		$this->GetUserName->LinkCustomAttributes = "";
		$this->GetUserName->HrefValue = "";
		$this->GetUserName->TooltipValue = "";

		// AdjustmentwithAdvance
		$this->AdjustmentwithAdvance->LinkCustomAttributes = "";
		$this->AdjustmentwithAdvance->HrefValue = "";
		$this->AdjustmentwithAdvance->TooltipValue = "";

		// AdjustmentBillNumber
		$this->AdjustmentBillNumber->LinkCustomAttributes = "";
		$this->AdjustmentBillNumber->HrefValue = "";
		$this->AdjustmentBillNumber->TooltipValue = "";

		// CancelAdvance
		$this->CancelAdvance->LinkCustomAttributes = "";
		$this->CancelAdvance->HrefValue = "";
		$this->CancelAdvance->TooltipValue = "";

		// CancelReasan
		$this->CancelReasan->LinkCustomAttributes = "";
		$this->CancelReasan->HrefValue = "";
		$this->CancelReasan->TooltipValue = "";

		// CancelBy
		$this->CancelBy->LinkCustomAttributes = "";
		$this->CancelBy->HrefValue = "";
		$this->CancelBy->TooltipValue = "";

		// CancelDate
		$this->CancelDate->LinkCustomAttributes = "";
		$this->CancelDate->HrefValue = "";
		$this->CancelDate->TooltipValue = "";

		// CancelDateTime
		$this->CancelDateTime->LinkCustomAttributes = "";
		$this->CancelDateTime->HrefValue = "";
		$this->CancelDateTime->TooltipValue = "";

		// CanceledBy
		$this->CanceledBy->LinkCustomAttributes = "";
		$this->CanceledBy->HrefValue = "";
		$this->CanceledBy->TooltipValue = "";

		// CancelStatus
		$this->CancelStatus->LinkCustomAttributes = "";
		$this->CancelStatus->HrefValue = "";
		$this->CancelStatus->TooltipValue = "";

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

		// AdvanceNo
		$this->AdvanceNo->EditAttrs["class"] = "form-control";
		$this->AdvanceNo->EditCustomAttributes = "";
		$this->AdvanceNo->EditValue = $this->AdvanceNo->CurrentValue;
		$this->AdvanceNo->ViewCustomAttributes = "";

		// PatientID
		$this->PatientID->EditAttrs["class"] = "form-control";
		$this->PatientID->EditCustomAttributes = "";
		if (!$this->PatientID->Raw)
			$this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
		$this->PatientID->EditValue = $this->PatientID->CurrentValue;
		$this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

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

		// ModeofPayment
		$this->ModeofPayment->EditAttrs["class"] = "form-control";
		$this->ModeofPayment->EditCustomAttributes = "";

		// Amount
		$this->Amount->EditAttrs["class"] = "form-control";
		$this->Amount->EditCustomAttributes = "";
		$this->Amount->EditValue = $this->Amount->CurrentValue;
		$this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());
		if (strval($this->Amount->EditValue) != "" && is_numeric($this->Amount->EditValue))
			$this->Amount->EditValue = FormatNumber($this->Amount->EditValue, -2, -2, -2, -2);
		

		// CardNumber
		$this->CardNumber->EditAttrs["class"] = "form-control";
		$this->CardNumber->EditCustomAttributes = "";
		if (!$this->CardNumber->Raw)
			$this->CardNumber->CurrentValue = HtmlDecode($this->CardNumber->CurrentValue);
		$this->CardNumber->EditValue = $this->CardNumber->CurrentValue;
		$this->CardNumber->PlaceHolder = RemoveHtml($this->CardNumber->caption());

		// BankName
		$this->BankName->EditAttrs["class"] = "form-control";
		$this->BankName->EditCustomAttributes = "";
		if (!$this->BankName->Raw)
			$this->BankName->CurrentValue = HtmlDecode($this->BankName->CurrentValue);
		$this->BankName->EditValue = $this->BankName->CurrentValue;
		$this->BankName->PlaceHolder = RemoveHtml($this->BankName->caption());

		// Name
		$this->Name->EditAttrs["class"] = "form-control";
		$this->Name->EditCustomAttributes = "";
		if (!$this->Name->Raw)
			$this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
		$this->Name->EditValue = $this->Name->CurrentValue;
		$this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

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

		// Date
		$this->Date->EditAttrs["class"] = "form-control";
		$this->Date->EditCustomAttributes = "";
		$this->Date->EditValue = FormatDateTime($this->Date->CurrentValue, 7);
		$this->Date->PlaceHolder = RemoveHtml($this->Date->caption());

		// AnyDues
		$this->AnyDues->EditAttrs["class"] = "form-control";
		$this->AnyDues->EditCustomAttributes = "";
		if (!$this->AnyDues->Raw)
			$this->AnyDues->CurrentValue = HtmlDecode($this->AnyDues->CurrentValue);
		$this->AnyDues->EditValue = $this->AnyDues->CurrentValue;
		$this->AnyDues->PlaceHolder = RemoveHtml($this->AnyDues->caption());

		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// PatID

		$this->PatID->EditAttrs["class"] = "form-control";
		$this->PatID->EditCustomAttributes = "";

		// VisiteType
		$this->VisiteType->EditAttrs["class"] = "form-control";
		$this->VisiteType->EditCustomAttributes = "";
		if (!$this->VisiteType->Raw)
			$this->VisiteType->CurrentValue = HtmlDecode($this->VisiteType->CurrentValue);
		$this->VisiteType->EditValue = $this->VisiteType->CurrentValue;
		$this->VisiteType->PlaceHolder = RemoveHtml($this->VisiteType->caption());

		// VisitDate
		$this->VisitDate->EditAttrs["class"] = "form-control";
		$this->VisitDate->EditCustomAttributes = "";
		$this->VisitDate->EditValue = $this->VisitDate->CurrentValue;
		$this->VisitDate->PlaceHolder = RemoveHtml($this->VisitDate->caption());

		// Status
		$this->Status->EditAttrs["class"] = "form-control";
		$this->Status->EditCustomAttributes = "";
		if (!$this->Status->Raw)
			$this->Status->CurrentValue = HtmlDecode($this->Status->CurrentValue);
		$this->Status->EditValue = $this->Status->CurrentValue;
		$this->Status->PlaceHolder = RemoveHtml($this->Status->caption());

		// AdvanceValidityDate
		$this->AdvanceValidityDate->EditAttrs["class"] = "form-control";
		$this->AdvanceValidityDate->EditCustomAttributes = "";
		$this->AdvanceValidityDate->EditValue = FormatDateTime($this->AdvanceValidityDate->CurrentValue, 8);
		$this->AdvanceValidityDate->PlaceHolder = RemoveHtml($this->AdvanceValidityDate->caption());

		// TotalRemainingAdvance
		$this->TotalRemainingAdvance->EditAttrs["class"] = "form-control";
		$this->TotalRemainingAdvance->EditCustomAttributes = "";
		if (!$this->TotalRemainingAdvance->Raw)
			$this->TotalRemainingAdvance->CurrentValue = HtmlDecode($this->TotalRemainingAdvance->CurrentValue);
		$this->TotalRemainingAdvance->EditValue = $this->TotalRemainingAdvance->CurrentValue;
		$this->TotalRemainingAdvance->PlaceHolder = RemoveHtml($this->TotalRemainingAdvance->caption());

		// Remarks
		$this->Remarks->EditAttrs["class"] = "form-control";
		$this->Remarks->EditCustomAttributes = "";
		$this->Remarks->EditValue = $this->Remarks->CurrentValue;
		$this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

		// SeectPaymentMode
		$this->SeectPaymentMode->EditAttrs["class"] = "form-control";
		$this->SeectPaymentMode->EditCustomAttributes = "";
		if (!$this->SeectPaymentMode->Raw)
			$this->SeectPaymentMode->CurrentValue = HtmlDecode($this->SeectPaymentMode->CurrentValue);
		$this->SeectPaymentMode->EditValue = $this->SeectPaymentMode->CurrentValue;
		$this->SeectPaymentMode->PlaceHolder = RemoveHtml($this->SeectPaymentMode->caption());

		// PaidAmount
		$this->PaidAmount->EditAttrs["class"] = "form-control";
		$this->PaidAmount->EditCustomAttributes = "";
		if (!$this->PaidAmount->Raw)
			$this->PaidAmount->CurrentValue = HtmlDecode($this->PaidAmount->CurrentValue);
		$this->PaidAmount->EditValue = $this->PaidAmount->CurrentValue;
		$this->PaidAmount->PlaceHolder = RemoveHtml($this->PaidAmount->caption());

		// Currency
		$this->Currency->EditAttrs["class"] = "form-control";
		$this->Currency->EditCustomAttributes = "";
		if (!$this->Currency->Raw)
			$this->Currency->CurrentValue = HtmlDecode($this->Currency->CurrentValue);
		$this->Currency->EditValue = $this->Currency->CurrentValue;
		$this->Currency->PlaceHolder = RemoveHtml($this->Currency->caption());

		// HospID
		// Reception

		$this->Reception->EditAttrs["class"] = "form-control";
		$this->Reception->EditCustomAttributes = "";
		$this->Reception->EditValue = $this->Reception->CurrentValue;
		$this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

		// mrnno
		$this->mrnno->EditAttrs["class"] = "form-control";
		$this->mrnno->EditCustomAttributes = "";
		if (!$this->mrnno->Raw)
			$this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
		$this->mrnno->EditValue = $this->mrnno->CurrentValue;
		$this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

		// GetUserName
		// AdjustmentwithAdvance

		$this->AdjustmentwithAdvance->EditAttrs["class"] = "form-control";
		$this->AdjustmentwithAdvance->EditCustomAttributes = "";
		if (!$this->AdjustmentwithAdvance->Raw)
			$this->AdjustmentwithAdvance->CurrentValue = HtmlDecode($this->AdjustmentwithAdvance->CurrentValue);
		$this->AdjustmentwithAdvance->EditValue = $this->AdjustmentwithAdvance->CurrentValue;
		$this->AdjustmentwithAdvance->PlaceHolder = RemoveHtml($this->AdjustmentwithAdvance->caption());

		// AdjustmentBillNumber
		$this->AdjustmentBillNumber->EditAttrs["class"] = "form-control";
		$this->AdjustmentBillNumber->EditCustomAttributes = "";
		if (!$this->AdjustmentBillNumber->Raw)
			$this->AdjustmentBillNumber->CurrentValue = HtmlDecode($this->AdjustmentBillNumber->CurrentValue);
		$this->AdjustmentBillNumber->EditValue = $this->AdjustmentBillNumber->CurrentValue;
		$this->AdjustmentBillNumber->PlaceHolder = RemoveHtml($this->AdjustmentBillNumber->caption());

		// CancelAdvance
		$this->CancelAdvance->EditCustomAttributes = "";
		$this->CancelAdvance->EditValue = $this->CancelAdvance->options(FALSE);

		// CancelReasan
		$this->CancelReasan->EditAttrs["class"] = "form-control";
		$this->CancelReasan->EditCustomAttributes = "";
		$this->CancelReasan->EditValue = $this->CancelReasan->CurrentValue;
		$this->CancelReasan->PlaceHolder = RemoveHtml($this->CancelReasan->caption());

		// CancelBy
		$this->CancelBy->EditAttrs["class"] = "form-control";
		$this->CancelBy->EditCustomAttributes = "";
		if (!$this->CancelBy->Raw)
			$this->CancelBy->CurrentValue = HtmlDecode($this->CancelBy->CurrentValue);
		$this->CancelBy->EditValue = $this->CancelBy->CurrentValue;
		$this->CancelBy->PlaceHolder = RemoveHtml($this->CancelBy->caption());

		// CancelDate
		$this->CancelDate->EditAttrs["class"] = "form-control";
		$this->CancelDate->EditCustomAttributes = "";
		$this->CancelDate->EditValue = FormatDateTime($this->CancelDate->CurrentValue, 7);
		$this->CancelDate->PlaceHolder = RemoveHtml($this->CancelDate->caption());

		// CancelDateTime
		$this->CancelDateTime->EditAttrs["class"] = "form-control";
		$this->CancelDateTime->EditCustomAttributes = "";
		$this->CancelDateTime->EditValue = FormatDateTime($this->CancelDateTime->CurrentValue, 8);
		$this->CancelDateTime->PlaceHolder = RemoveHtml($this->CancelDateTime->caption());

		// CanceledBy
		$this->CanceledBy->EditAttrs["class"] = "form-control";
		$this->CanceledBy->EditCustomAttributes = "";
		if (!$this->CanceledBy->Raw)
			$this->CanceledBy->CurrentValue = HtmlDecode($this->CanceledBy->CurrentValue);
		$this->CanceledBy->EditValue = $this->CanceledBy->CurrentValue;
		$this->CanceledBy->PlaceHolder = RemoveHtml($this->CanceledBy->caption());

		// CancelStatus
		$this->CancelStatus->EditAttrs["class"] = "form-control";
		$this->CancelStatus->EditCustomAttributes = "";
		$this->CancelStatus->EditValue = $this->CancelStatus->options(TRUE);

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
					$doc->exportCaption($this->AdvanceNo);
					$doc->exportCaption($this->PatientID);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->Mobile);
					$doc->exportCaption($this->ModeofPayment);
					$doc->exportCaption($this->Amount);
					$doc->exportCaption($this->CardNumber);
					$doc->exportCaption($this->BankName);
					$doc->exportCaption($this->Name);
					$doc->exportCaption($this->voucher_type);
					$doc->exportCaption($this->Details);
					$doc->exportCaption($this->Date);
					$doc->exportCaption($this->AnyDues);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
					$doc->exportCaption($this->PatID);
					$doc->exportCaption($this->VisiteType);
					$doc->exportCaption($this->VisitDate);
					$doc->exportCaption($this->Status);
					$doc->exportCaption($this->AdvanceValidityDate);
					$doc->exportCaption($this->TotalRemainingAdvance);
					$doc->exportCaption($this->Remarks);
					$doc->exportCaption($this->SeectPaymentMode);
					$doc->exportCaption($this->PaidAmount);
					$doc->exportCaption($this->Currency);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->Reception);
					$doc->exportCaption($this->mrnno);
					$doc->exportCaption($this->GetUserName);
					$doc->exportCaption($this->AdjustmentwithAdvance);
					$doc->exportCaption($this->AdjustmentBillNumber);
					$doc->exportCaption($this->CancelAdvance);
					$doc->exportCaption($this->CancelReasan);
					$doc->exportCaption($this->CancelBy);
					$doc->exportCaption($this->CancelDate);
					$doc->exportCaption($this->CancelDateTime);
					$doc->exportCaption($this->CanceledBy);
					$doc->exportCaption($this->CancelStatus);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->AdvanceNo);
					$doc->exportCaption($this->PatientID);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->Mobile);
					$doc->exportCaption($this->ModeofPayment);
					$doc->exportCaption($this->Amount);
					$doc->exportCaption($this->CardNumber);
					$doc->exportCaption($this->BankName);
					$doc->exportCaption($this->Name);
					$doc->exportCaption($this->voucher_type);
					$doc->exportCaption($this->Details);
					$doc->exportCaption($this->Date);
					$doc->exportCaption($this->AnyDues);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
					$doc->exportCaption($this->PatID);
					$doc->exportCaption($this->VisiteType);
					$doc->exportCaption($this->VisitDate);
					$doc->exportCaption($this->Status);
					$doc->exportCaption($this->AdvanceValidityDate);
					$doc->exportCaption($this->TotalRemainingAdvance);
					$doc->exportCaption($this->Remarks);
					$doc->exportCaption($this->SeectPaymentMode);
					$doc->exportCaption($this->PaidAmount);
					$doc->exportCaption($this->Currency);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->Reception);
					$doc->exportCaption($this->mrnno);
					$doc->exportCaption($this->GetUserName);
					$doc->exportCaption($this->AdjustmentwithAdvance);
					$doc->exportCaption($this->AdjustmentBillNumber);
					$doc->exportCaption($this->CancelAdvance);
					$doc->exportCaption($this->CancelReasan);
					$doc->exportCaption($this->CancelBy);
					$doc->exportCaption($this->CancelDate);
					$doc->exportCaption($this->CancelDateTime);
					$doc->exportCaption($this->CanceledBy);
					$doc->exportCaption($this->CancelStatus);
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
						$doc->exportField($this->AdvanceNo);
						$doc->exportField($this->PatientID);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->Mobile);
						$doc->exportField($this->ModeofPayment);
						$doc->exportField($this->Amount);
						$doc->exportField($this->CardNumber);
						$doc->exportField($this->BankName);
						$doc->exportField($this->Name);
						$doc->exportField($this->voucher_type);
						$doc->exportField($this->Details);
						$doc->exportField($this->Date);
						$doc->exportField($this->AnyDues);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
						$doc->exportField($this->PatID);
						$doc->exportField($this->VisiteType);
						$doc->exportField($this->VisitDate);
						$doc->exportField($this->Status);
						$doc->exportField($this->AdvanceValidityDate);
						$doc->exportField($this->TotalRemainingAdvance);
						$doc->exportField($this->Remarks);
						$doc->exportField($this->SeectPaymentMode);
						$doc->exportField($this->PaidAmount);
						$doc->exportField($this->Currency);
						$doc->exportField($this->HospID);
						$doc->exportField($this->Reception);
						$doc->exportField($this->mrnno);
						$doc->exportField($this->GetUserName);
						$doc->exportField($this->AdjustmentwithAdvance);
						$doc->exportField($this->AdjustmentBillNumber);
						$doc->exportField($this->CancelAdvance);
						$doc->exportField($this->CancelReasan);
						$doc->exportField($this->CancelBy);
						$doc->exportField($this->CancelDate);
						$doc->exportField($this->CancelDateTime);
						$doc->exportField($this->CanceledBy);
						$doc->exportField($this->CancelStatus);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->AdvanceNo);
						$doc->exportField($this->PatientID);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->Mobile);
						$doc->exportField($this->ModeofPayment);
						$doc->exportField($this->Amount);
						$doc->exportField($this->CardNumber);
						$doc->exportField($this->BankName);
						$doc->exportField($this->Name);
						$doc->exportField($this->voucher_type);
						$doc->exportField($this->Details);
						$doc->exportField($this->Date);
						$doc->exportField($this->AnyDues);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
						$doc->exportField($this->PatID);
						$doc->exportField($this->VisiteType);
						$doc->exportField($this->VisitDate);
						$doc->exportField($this->Status);
						$doc->exportField($this->AdvanceValidityDate);
						$doc->exportField($this->TotalRemainingAdvance);
						$doc->exportField($this->Remarks);
						$doc->exportField($this->SeectPaymentMode);
						$doc->exportField($this->PaidAmount);
						$doc->exportField($this->Currency);
						$doc->exportField($this->HospID);
						$doc->exportField($this->Reception);
						$doc->exportField($this->mrnno);
						$doc->exportField($this->GetUserName);
						$doc->exportField($this->AdjustmentwithAdvance);
						$doc->exportField($this->AdjustmentBillNumber);
						$doc->exportField($this->CancelAdvance);
						$doc->exportField($this->CancelReasan);
						$doc->exportField($this->CancelBy);
						$doc->exportField($this->CancelDate);
						$doc->exportField($this->CancelDateTime);
						$doc->exportField($this->CanceledBy);
						$doc->exportField($this->CancelStatus);
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
			$a = &$filter;
		if ($filter == "") {
			$datetime = date('Y-m-d', strtotime(' +1 day'));
			AddFilter($filter, "createddatetime between '".date('Y-m-d')." 00:00:00' and '".$datetime." 00:00:00' ");
		}
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

					$UserProfile = new UserProfile();
					$id =  $UserProfile->Profile['id'];
					$HospID =  $UserProfile->Profile['HospID'];
					$hospital_PreFixCode = $UserProfile->Profile['hospital_PreFixCode'];
					if($hospital_PreFixCode == "")
					{
						getHospitalDetails($HospID);
						$UserProfile = new UserProfile();
						$hospital_PreFixCode = $UserProfile->Profile['hospital_PreFixCode'];
					}
					$rsnew["AdvanceNo"]  =  $hospital_PreFixCode . 'AD'. getAdvanceNo($HospID);
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

		if($rsnew["CancelAdvance"] == "Yes"){
			$rsnew["CancelBy"] = GetUserName();
			$rsnew["CancelDateTime"] = date("Y-m-d h:i:s");
			$rsnew["CanceledBy"] = CurrentUserName();
		}
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