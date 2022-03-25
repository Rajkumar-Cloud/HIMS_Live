<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for billing_voucher
 */
class billing_voucher extends DbTable
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
	public $PatId;
	public $Reception;
	public $BillNumber;
	public $PatientId;
	public $mrnno;
	public $PatientName;
	public $Age;
	public $Gender;
	public $profilePic;
	public $Mobile;
	public $IP_OP;
	public $Doctor;
	public $voucher_type;
	public $Details;
	public $ModeofPayment;
	public $Amount;
	public $AnyDues;
	public $createdby;
	public $createddatetime;
	public $modifiedby;
	public $modifieddatetime;
	public $RealizationAmount;
	public $RealizationStatus;
	public $RealizationRemarks;
	public $RealizationBatchNo;
	public $RealizationDate;
	public $HospID;
	public $RIDNO;
	public $TidNo;
	public $CId;
	public $PartnerName;
	public $PayerType;
	public $Dob;
	public $Currency;
	public $DiscountRemarks;
	public $Remarks;
	public $DrDepartment;
	public $RefferedBy;
	public $CardNumber;
	public $BankName;
	public $DrID;
	public $BillStatus;
	public $ReportHeader;
	public $UserName;
	public $AdjustmentAdvance;
	public $billing_vouchercol;
	public $BillType;
	public $ProcedureName;
	public $ProcedureAmount;
	public $IncludePackage;
	public $CancelBill;
	public $CancelReason;
	public $CancelModeOfPayment;
	public $CancelAmount;
	public $CancelBankName;
	public $CancelTransactionNumber;
	public $LabTest;
	public $sid;
	public $SidNo;
	public $createdDatettime;
	public $LabTestReleased;
	public $GoogleReviewID;
	public $CardType;
	public $PharmacyBill;
	public $DiscountAmount;
	public $Cash;
	public $Card;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'billing_voucher';
		$this->TableName = 'billing_voucher';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`billing_voucher`";
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

		// id
		$this->id = new DbField('billing_voucher', 'billing_voucher', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->IsForeignKey = TRUE; // Foreign key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// PatId
		$this->PatId = new DbField('billing_voucher', 'billing_voucher', 'x_PatId', 'PatId', '`PatId`', '`PatId`', 3, -1, FALSE, '`PatId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatId->Sortable = TRUE; // Allow sort
		$this->PatId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['PatId'] = &$this->PatId;

		// Reception
		$this->Reception = new DbField('billing_voucher', 'billing_voucher', 'x_Reception', 'Reception', '`Reception`', '`Reception`', 3, -1, FALSE, '`Reception`', FALSE, FALSE, FALSE, 'IMAGE', 'SELECT');
		$this->Reception->Sortable = TRUE; // Allow sort
		$this->Reception->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Reception->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Reception->Lookup = new Lookup('Reception', 'ip_admission', TRUE, 'id', ["patient_name","PatientID","mobileno",""], [], [], [], [], ["PatientID","mrnNo","patient_name","age","gender","profilePic","mobileno","typeRegsisteration","physician_id"], ["x_PatientId","x_mrnno","x_PatientName","x_Age","x_Gender","x_profilePic","x_Mobile","x_IP_OP","x_Doctor"], '`id` DESC', '');
		$this->Reception->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Reception'] = &$this->Reception;

		// BillNumber
		$this->BillNumber = new DbField('billing_voucher', 'billing_voucher', 'x_BillNumber', 'BillNumber', '`BillNumber`', '`BillNumber`', 200, -1, FALSE, '`BillNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BillNumber->Sortable = TRUE; // Allow sort
		$this->fields['BillNumber'] = &$this->BillNumber;

		// PatientId
		$this->PatientId = new DbField('billing_voucher', 'billing_voucher', 'x_PatientId', 'PatientId', '`PatientId`', '`PatientId`', 200, -1, FALSE, '`PatientId`', FALSE, FALSE, FALSE, 'IMAGE', 'TEXT');
		$this->PatientId->Sortable = TRUE; // Allow sort
		$this->PatientId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['PatientId'] = &$this->PatientId;

		// mrnno
		$this->mrnno = new DbField('billing_voucher', 'billing_voucher', 'x_mrnno', 'mrnno', '`mrnno`', '`mrnno`', 200, -1, FALSE, '`mrnno`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mrnno->Sortable = TRUE; // Allow sort
		$this->fields['mrnno'] = &$this->mrnno;

		// PatientName
		$this->PatientName = new DbField('billing_voucher', 'billing_voucher', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, -1, FALSE, '`PatientName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientName->Sortable = TRUE; // Allow sort
		$this->fields['PatientName'] = &$this->PatientName;

		// Age
		$this->Age = new DbField('billing_voucher', 'billing_voucher', 'x_Age', 'Age', '`Age`', '`Age`', 200, -1, FALSE, '`Age`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Age->Sortable = TRUE; // Allow sort
		$this->fields['Age'] = &$this->Age;

		// Gender
		$this->Gender = new DbField('billing_voucher', 'billing_voucher', 'x_Gender', 'Gender', '`Gender`', '`Gender`', 200, -1, FALSE, '`Gender`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Gender->Sortable = TRUE; // Allow sort
		$this->fields['Gender'] = &$this->Gender;

		// profilePic
		$this->profilePic = new DbField('billing_voucher', 'billing_voucher', 'x_profilePic', 'profilePic', '`profilePic`', '`profilePic`', 201, -1, FALSE, '`profilePic`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->profilePic->Sortable = TRUE; // Allow sort
		$this->fields['profilePic'] = &$this->profilePic;

		// Mobile
		$this->Mobile = new DbField('billing_voucher', 'billing_voucher', 'x_Mobile', 'Mobile', '`Mobile`', '`Mobile`', 200, -1, FALSE, '`Mobile`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Mobile->Sortable = TRUE; // Allow sort
		$this->fields['Mobile'] = &$this->Mobile;

		// IP_OP
		$this->IP_OP = new DbField('billing_voucher', 'billing_voucher', 'x_IP_OP', 'IP_OP', '`IP_OP`', '`IP_OP`', 200, -1, FALSE, '`IP_OP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IP_OP->Sortable = TRUE; // Allow sort
		$this->fields['IP_OP'] = &$this->IP_OP;

		// Doctor
		$this->Doctor = new DbField('billing_voucher', 'billing_voucher', 'x_Doctor', 'Doctor', '`Doctor`', '`Doctor`', 200, -1, FALSE, '`Doctor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Doctor->Sortable = TRUE; // Allow sort
		$this->Doctor->Lookup = new Lookup('Doctor', 'doctors', FALSE, 'id', ["NAME","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Doctor'] = &$this->Doctor;

		// voucher_type
		$this->voucher_type = new DbField('billing_voucher', 'billing_voucher', 'x_voucher_type', 'voucher_type', '`voucher_type`', '`voucher_type`', 200, -1, FALSE, '`voucher_type`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->voucher_type->Sortable = TRUE; // Allow sort
		$this->voucher_type->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->voucher_type->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->voucher_type->Lookup = new Lookup('voucher_type', 'billing_type', FALSE, 'Type', ["Type","","",""], [], [], [], [], [], [], '', '');
		$this->fields['voucher_type'] = &$this->voucher_type;

		// Details
		$this->Details = new DbField('billing_voucher', 'billing_voucher', 'x_Details', 'Details', '`Details`', '`Details`', 200, -1, FALSE, '`Details`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Details->Sortable = TRUE; // Allow sort
		$this->fields['Details'] = &$this->Details;

		// ModeofPayment
		$this->ModeofPayment = new DbField('billing_voucher', 'billing_voucher', 'x_ModeofPayment', 'ModeofPayment', '`ModeofPayment`', '`ModeofPayment`', 200, -1, FALSE, '`ModeofPayment`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->ModeofPayment->Sortable = TRUE; // Allow sort
		$this->ModeofPayment->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->ModeofPayment->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->ModeofPayment->Lookup = new Lookup('ModeofPayment', 'mas_modepayment', FALSE, 'Mode', ["Mode","","",""], [], [], [], [], [], [], '', '');
		$this->fields['ModeofPayment'] = &$this->ModeofPayment;

		// Amount
		$this->Amount = new DbField('billing_voucher', 'billing_voucher', 'x_Amount', 'Amount', '`Amount`', '`Amount`', 131, -1, FALSE, '`Amount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Amount->Sortable = TRUE; // Allow sort
		$this->Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Amount'] = &$this->Amount;

		// AnyDues
		$this->AnyDues = new DbField('billing_voucher', 'billing_voucher', 'x_AnyDues', 'AnyDues', '`AnyDues`', '`AnyDues`', 200, -1, FALSE, '`AnyDues`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AnyDues->Sortable = TRUE; // Allow sort
		$this->fields['AnyDues'] = &$this->AnyDues;

		// createdby
		$this->createdby = new DbField('billing_voucher', 'billing_voucher', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 200, -1, FALSE, '`createdby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdby->Sortable = TRUE; // Allow sort
		$this->fields['createdby'] = &$this->createdby;

		// createddatetime
		$this->createddatetime = new DbField('billing_voucher', 'billing_voucher', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike('`createddatetime`', 11, "DB"), 135, 11, FALSE, '`createddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = TRUE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['createddatetime'] = &$this->createddatetime;

		// modifiedby
		$this->modifiedby = new DbField('billing_voucher', 'billing_voucher', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 200, -1, FALSE, '`modifiedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifiedby->Sortable = TRUE; // Allow sort
		$this->fields['modifiedby'] = &$this->modifiedby;

		// modifieddatetime
		$this->modifieddatetime = new DbField('billing_voucher', 'billing_voucher', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike('`modifieddatetime`', 0, "DB"), 135, 0, FALSE, '`modifieddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifieddatetime->Sortable = TRUE; // Allow sort
		$this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['modifieddatetime'] = &$this->modifieddatetime;

		// RealizationAmount
		$this->RealizationAmount = new DbField('billing_voucher', 'billing_voucher', 'x_RealizationAmount', 'RealizationAmount', '`RealizationAmount`', '`RealizationAmount`', 131, -1, FALSE, '`RealizationAmount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RealizationAmount->Sortable = TRUE; // Allow sort
		$this->RealizationAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['RealizationAmount'] = &$this->RealizationAmount;

		// RealizationStatus
		$this->RealizationStatus = new DbField('billing_voucher', 'billing_voucher', 'x_RealizationStatus', 'RealizationStatus', '`RealizationStatus`', '`RealizationStatus`', 200, -1, FALSE, '`RealizationStatus`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RealizationStatus->Sortable = TRUE; // Allow sort
		$this->fields['RealizationStatus'] = &$this->RealizationStatus;

		// RealizationRemarks
		$this->RealizationRemarks = new DbField('billing_voucher', 'billing_voucher', 'x_RealizationRemarks', 'RealizationRemarks', '`RealizationRemarks`', '`RealizationRemarks`', 200, -1, FALSE, '`RealizationRemarks`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RealizationRemarks->Sortable = TRUE; // Allow sort
		$this->fields['RealizationRemarks'] = &$this->RealizationRemarks;

		// RealizationBatchNo
		$this->RealizationBatchNo = new DbField('billing_voucher', 'billing_voucher', 'x_RealizationBatchNo', 'RealizationBatchNo', '`RealizationBatchNo`', '`RealizationBatchNo`', 200, -1, FALSE, '`RealizationBatchNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RealizationBatchNo->Sortable = TRUE; // Allow sort
		$this->fields['RealizationBatchNo'] = &$this->RealizationBatchNo;

		// RealizationDate
		$this->RealizationDate = new DbField('billing_voucher', 'billing_voucher', 'x_RealizationDate', 'RealizationDate', '`RealizationDate`', '`RealizationDate`', 200, -1, FALSE, '`RealizationDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RealizationDate->Sortable = TRUE; // Allow sort
		$this->fields['RealizationDate'] = &$this->RealizationDate;

		// HospID
		$this->HospID = new DbField('billing_voucher', 'billing_voucher', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->fields['HospID'] = &$this->HospID;

		// RIDNO
		$this->RIDNO = new DbField('billing_voucher', 'billing_voucher', 'x_RIDNO', 'RIDNO', '`RIDNO`', '`RIDNO`', 3, -1, FALSE, '`RIDNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RIDNO->Sortable = TRUE; // Allow sort
		$this->RIDNO->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['RIDNO'] = &$this->RIDNO;

		// TidNo
		$this->TidNo = new DbField('billing_voucher', 'billing_voucher', 'x_TidNo', 'TidNo', '`TidNo`', '`TidNo`', 3, -1, FALSE, '`TidNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TidNo->Sortable = TRUE; // Allow sort
		$this->TidNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['TidNo'] = &$this->TidNo;

		// CId
		$this->CId = new DbField('billing_voucher', 'billing_voucher', 'x_CId', 'CId', '`CId`', '`CId`', 3, -1, FALSE, '`CId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CId->Sortable = TRUE; // Allow sort
		$this->CId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['CId'] = &$this->CId;

		// PartnerName
		$this->PartnerName = new DbField('billing_voucher', 'billing_voucher', 'x_PartnerName', 'PartnerName', '`PartnerName`', '`PartnerName`', 200, -1, FALSE, '`PartnerName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PartnerName->Sortable = TRUE; // Allow sort
		$this->fields['PartnerName'] = &$this->PartnerName;

		// PayerType
		$this->PayerType = new DbField('billing_voucher', 'billing_voucher', 'x_PayerType', 'PayerType', '`PayerType`', '`PayerType`', 200, -1, FALSE, '`PayerType`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PayerType->Sortable = TRUE; // Allow sort
		$this->fields['PayerType'] = &$this->PayerType;

		// Dob
		$this->Dob = new DbField('billing_voucher', 'billing_voucher', 'x_Dob', 'Dob', '`Dob`', '`Dob`', 200, -1, FALSE, '`Dob`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Dob->Sortable = TRUE; // Allow sort
		$this->fields['Dob'] = &$this->Dob;

		// Currency
		$this->Currency = new DbField('billing_voucher', 'billing_voucher', 'x_Currency', 'Currency', '`Currency`', '`Currency`', 200, -1, FALSE, '`Currency`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Currency->Sortable = TRUE; // Allow sort
		$this->fields['Currency'] = &$this->Currency;

		// DiscountRemarks
		$this->DiscountRemarks = new DbField('billing_voucher', 'billing_voucher', 'x_DiscountRemarks', 'DiscountRemarks', '`DiscountRemarks`', '`DiscountRemarks`', 201, -1, FALSE, '`DiscountRemarks`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DiscountRemarks->Sortable = TRUE; // Allow sort
		$this->fields['DiscountRemarks'] = &$this->DiscountRemarks;

		// Remarks
		$this->Remarks = new DbField('billing_voucher', 'billing_voucher', 'x_Remarks', 'Remarks', '`Remarks`', '`Remarks`', 201, -1, FALSE, '`Remarks`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Remarks->Sortable = TRUE; // Allow sort
		$this->fields['Remarks'] = &$this->Remarks;

		// DrDepartment
		$this->DrDepartment = new DbField('billing_voucher', 'billing_voucher', 'x_DrDepartment', 'DrDepartment', '`DrDepartment`', '`DrDepartment`', 200, -1, FALSE, '`DrDepartment`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DrDepartment->Sortable = TRUE; // Allow sort
		$this->fields['DrDepartment'] = &$this->DrDepartment;

		// RefferedBy
		$this->RefferedBy = new DbField('billing_voucher', 'billing_voucher', 'x_RefferedBy', 'RefferedBy', '`RefferedBy`', '`RefferedBy`', 200, -1, FALSE, '`RefferedBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RefferedBy->Sortable = TRUE; // Allow sort
		$this->fields['RefferedBy'] = &$this->RefferedBy;

		// CardNumber
		$this->CardNumber = new DbField('billing_voucher', 'billing_voucher', 'x_CardNumber', 'CardNumber', '`CardNumber`', '`CardNumber`', 200, -1, FALSE, '`CardNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CardNumber->Sortable = TRUE; // Allow sort
		$this->fields['CardNumber'] = &$this->CardNumber;

		// BankName
		$this->BankName = new DbField('billing_voucher', 'billing_voucher', 'x_BankName', 'BankName', '`BankName`', '`BankName`', 200, -1, FALSE, '`BankName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BankName->Sortable = TRUE; // Allow sort
		$this->fields['BankName'] = &$this->BankName;

		// DrID
		$this->DrID = new DbField('billing_voucher', 'billing_voucher', 'x_DrID', 'DrID', '`DrID`', '`DrID`', 3, -1, FALSE, '`DrID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DrID->Sortable = TRUE; // Allow sort
		$this->DrID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['DrID'] = &$this->DrID;

		// BillStatus
		$this->BillStatus = new DbField('billing_voucher', 'billing_voucher', 'x_BillStatus', 'BillStatus', '`BillStatus`', '`BillStatus`', 3, -1, FALSE, '`BillStatus`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BillStatus->Sortable = TRUE; // Allow sort
		$this->BillStatus->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['BillStatus'] = &$this->BillStatus;

		// ReportHeader
		$this->ReportHeader = new DbField('billing_voucher', 'billing_voucher', 'x_ReportHeader', 'ReportHeader', '`ReportHeader`', '`ReportHeader`', 200, -1, FALSE, '`ReportHeader`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReportHeader->Sortable = TRUE; // Allow sort
		$this->fields['ReportHeader'] = &$this->ReportHeader;

		// UserName
		$this->UserName = new DbField('billing_voucher', 'billing_voucher', 'x_UserName', 'UserName', '`UserName`', '`UserName`', 200, -1, FALSE, '`UserName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->UserName->Sortable = TRUE; // Allow sort
		$this->fields['UserName'] = &$this->UserName;

		// AdjustmentAdvance
		$this->AdjustmentAdvance = new DbField('billing_voucher', 'billing_voucher', 'x_AdjustmentAdvance', 'AdjustmentAdvance', '`AdjustmentAdvance`', '`AdjustmentAdvance`', 200, -1, FALSE, '`AdjustmentAdvance`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AdjustmentAdvance->Sortable = TRUE; // Allow sort
		$this->fields['AdjustmentAdvance'] = &$this->AdjustmentAdvance;

		// billing_vouchercol
		$this->billing_vouchercol = new DbField('billing_voucher', 'billing_voucher', 'x_billing_vouchercol', 'billing_vouchercol', '`billing_vouchercol`', '`billing_vouchercol`', 200, -1, FALSE, '`billing_vouchercol`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->billing_vouchercol->Sortable = TRUE; // Allow sort
		$this->fields['billing_vouchercol'] = &$this->billing_vouchercol;

		// BillType
		$this->BillType = new DbField('billing_voucher', 'billing_voucher', 'x_BillType', 'BillType', '`BillType`', '`BillType`', 200, -1, FALSE, '`BillType`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BillType->Sortable = TRUE; // Allow sort
		$this->fields['BillType'] = &$this->BillType;

		// ProcedureName
		$this->ProcedureName = new DbField('billing_voucher', 'billing_voucher', 'x_ProcedureName', 'ProcedureName', '`ProcedureName`', '`ProcedureName`', 200, -1, FALSE, '`ProcedureName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ProcedureName->Sortable = TRUE; // Allow sort
		$this->fields['ProcedureName'] = &$this->ProcedureName;

		// ProcedureAmount
		$this->ProcedureAmount = new DbField('billing_voucher', 'billing_voucher', 'x_ProcedureAmount', 'ProcedureAmount', '`ProcedureAmount`', '`ProcedureAmount`', 131, -1, FALSE, '`ProcedureAmount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ProcedureAmount->Sortable = TRUE; // Allow sort
		$this->ProcedureAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['ProcedureAmount'] = &$this->ProcedureAmount;

		// IncludePackage
		$this->IncludePackage = new DbField('billing_voucher', 'billing_voucher', 'x_IncludePackage', 'IncludePackage', '`IncludePackage`', '`IncludePackage`', 200, -1, FALSE, '`IncludePackage`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IncludePackage->Sortable = TRUE; // Allow sort
		$this->fields['IncludePackage'] = &$this->IncludePackage;

		// CancelBill
		$this->CancelBill = new DbField('billing_voucher', 'billing_voucher', 'x_CancelBill', 'CancelBill', '`CancelBill`', '`CancelBill`', 200, -1, FALSE, '`CancelBill`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CancelBill->Sortable = TRUE; // Allow sort
		$this->fields['CancelBill'] = &$this->CancelBill;

		// CancelReason
		$this->CancelReason = new DbField('billing_voucher', 'billing_voucher', 'x_CancelReason', 'CancelReason', '`CancelReason`', '`CancelReason`', 201, -1, FALSE, '`CancelReason`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CancelReason->Sortable = TRUE; // Allow sort
		$this->fields['CancelReason'] = &$this->CancelReason;

		// CancelModeOfPayment
		$this->CancelModeOfPayment = new DbField('billing_voucher', 'billing_voucher', 'x_CancelModeOfPayment', 'CancelModeOfPayment', '`CancelModeOfPayment`', '`CancelModeOfPayment`', 200, -1, FALSE, '`CancelModeOfPayment`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CancelModeOfPayment->Sortable = TRUE; // Allow sort
		$this->fields['CancelModeOfPayment'] = &$this->CancelModeOfPayment;

		// CancelAmount
		$this->CancelAmount = new DbField('billing_voucher', 'billing_voucher', 'x_CancelAmount', 'CancelAmount', '`CancelAmount`', '`CancelAmount`', 200, -1, FALSE, '`CancelAmount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CancelAmount->Sortable = TRUE; // Allow sort
		$this->fields['CancelAmount'] = &$this->CancelAmount;

		// CancelBankName
		$this->CancelBankName = new DbField('billing_voucher', 'billing_voucher', 'x_CancelBankName', 'CancelBankName', '`CancelBankName`', '`CancelBankName`', 200, -1, FALSE, '`CancelBankName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CancelBankName->Sortable = TRUE; // Allow sort
		$this->fields['CancelBankName'] = &$this->CancelBankName;

		// CancelTransactionNumber
		$this->CancelTransactionNumber = new DbField('billing_voucher', 'billing_voucher', 'x_CancelTransactionNumber', 'CancelTransactionNumber', '`CancelTransactionNumber`', '`CancelTransactionNumber`', 200, -1, FALSE, '`CancelTransactionNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CancelTransactionNumber->Sortable = TRUE; // Allow sort
		$this->fields['CancelTransactionNumber'] = &$this->CancelTransactionNumber;

		// LabTest
		$this->LabTest = new DbField('billing_voucher', 'billing_voucher', 'x_LabTest', 'LabTest', '`LabTest`', '`LabTest`', 200, -1, FALSE, '`LabTest`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->LabTest->Sortable = TRUE; // Allow sort
		$this->fields['LabTest'] = &$this->LabTest;

		// sid
		$this->sid = new DbField('billing_voucher', 'billing_voucher', 'x_sid', 'sid', '`sid`', '`sid`', 3, -1, FALSE, '`sid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sid->Sortable = TRUE; // Allow sort
		$this->sid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['sid'] = &$this->sid;

		// SidNo
		$this->SidNo = new DbField('billing_voucher', 'billing_voucher', 'x_SidNo', 'SidNo', '`SidNo`', '`SidNo`', 200, -1, FALSE, '`SidNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SidNo->Sortable = TRUE; // Allow sort
		$this->fields['SidNo'] = &$this->SidNo;

		// createdDatettime
		$this->createdDatettime = new DbField('billing_voucher', 'billing_voucher', 'x_createdDatettime', 'createdDatettime', '`createdDatettime`', CastDateFieldForLike('`createdDatettime`', 0, "DB"), 135, 0, FALSE, '`createdDatettime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdDatettime->Sortable = TRUE; // Allow sort
		$this->createdDatettime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['createdDatettime'] = &$this->createdDatettime;

		// LabTestReleased
		$this->LabTestReleased = new DbField('billing_voucher', 'billing_voucher', 'x_LabTestReleased', 'LabTestReleased', '`LabTestReleased`', '`LabTestReleased`', 200, -1, FALSE, '`LabTestReleased`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->LabTestReleased->Sortable = TRUE; // Allow sort
		$this->fields['LabTestReleased'] = &$this->LabTestReleased;

		// GoogleReviewID
		$this->GoogleReviewID = new DbField('billing_voucher', 'billing_voucher', 'x_GoogleReviewID', 'GoogleReviewID', '`GoogleReviewID`', '`GoogleReviewID`', 200, -1, FALSE, '`GoogleReviewID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->GoogleReviewID->Sortable = TRUE; // Allow sort
		$this->fields['GoogleReviewID'] = &$this->GoogleReviewID;

		// CardType
		$this->CardType = new DbField('billing_voucher', 'billing_voucher', 'x_CardType', 'CardType', '`CardType`', '`CardType`', 200, -1, FALSE, '`CardType`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CardType->Sortable = TRUE; // Allow sort
		$this->fields['CardType'] = &$this->CardType;

		// PharmacyBill
		$this->PharmacyBill = new DbField('billing_voucher', 'billing_voucher', 'x_PharmacyBill', 'PharmacyBill', '`PharmacyBill`', '`PharmacyBill`', 200, -1, FALSE, '`PharmacyBill`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PharmacyBill->Sortable = TRUE; // Allow sort
		$this->fields['PharmacyBill'] = &$this->PharmacyBill;

		// DiscountAmount
		$this->DiscountAmount = new DbField('billing_voucher', 'billing_voucher', 'x_DiscountAmount', 'DiscountAmount', '`DiscountAmount`', '`DiscountAmount`', 131, -1, FALSE, '`DiscountAmount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DiscountAmount->Sortable = TRUE; // Allow sort
		$this->DiscountAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['DiscountAmount'] = &$this->DiscountAmount;

		// Cash
		$this->Cash = new DbField('billing_voucher', 'billing_voucher', 'x_Cash', 'Cash', '`Cash`', '`Cash`', 131, -1, FALSE, '`Cash`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Cash->Sortable = TRUE; // Allow sort
		$this->Cash->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Cash'] = &$this->Cash;

		// Card
		$this->Card = new DbField('billing_voucher', 'billing_voucher', 'x_Card', 'Card', '`Card`', '`Card`', 131, -1, FALSE, '`Card`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Card->Sortable = TRUE; // Allow sort
		$this->Card->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Card'] = &$this->Card;
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

	// Current detail table name
	public function getCurrentDetailTable()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_DETAIL_TABLE];
	}
	public function setCurrentDetailTable($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_DETAIL_TABLE] = $v;
	}

	// Get detail url
	public function getDetailUrl()
	{

		// Detail url
		$detailUrl = "";
		if ($this->getCurrentDetailTable() == "patient_services") {
			$detailUrl = $GLOBALS["patient_services"]->getListUrl() . "?" . TABLE_SHOW_MASTER . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
		}
		if ($detailUrl == "")
			$detailUrl = "billing_voucherlist.php";
		return $detailUrl;
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`billing_voucher`";
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
		return ($this->SqlOrderBy <> "") ? $this->SqlOrderBy : "`id` DESC";
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
		$this->id->DbValue = $row['id'];
		$this->PatId->DbValue = $row['PatId'];
		$this->Reception->DbValue = $row['Reception'];
		$this->BillNumber->DbValue = $row['BillNumber'];
		$this->PatientId->DbValue = $row['PatientId'];
		$this->mrnno->DbValue = $row['mrnno'];
		$this->PatientName->DbValue = $row['PatientName'];
		$this->Age->DbValue = $row['Age'];
		$this->Gender->DbValue = $row['Gender'];
		$this->profilePic->DbValue = $row['profilePic'];
		$this->Mobile->DbValue = $row['Mobile'];
		$this->IP_OP->DbValue = $row['IP_OP'];
		$this->Doctor->DbValue = $row['Doctor'];
		$this->voucher_type->DbValue = $row['voucher_type'];
		$this->Details->DbValue = $row['Details'];
		$this->ModeofPayment->DbValue = $row['ModeofPayment'];
		$this->Amount->DbValue = $row['Amount'];
		$this->AnyDues->DbValue = $row['AnyDues'];
		$this->createdby->DbValue = $row['createdby'];
		$this->createddatetime->DbValue = $row['createddatetime'];
		$this->modifiedby->DbValue = $row['modifiedby'];
		$this->modifieddatetime->DbValue = $row['modifieddatetime'];
		$this->RealizationAmount->DbValue = $row['RealizationAmount'];
		$this->RealizationStatus->DbValue = $row['RealizationStatus'];
		$this->RealizationRemarks->DbValue = $row['RealizationRemarks'];
		$this->RealizationBatchNo->DbValue = $row['RealizationBatchNo'];
		$this->RealizationDate->DbValue = $row['RealizationDate'];
		$this->HospID->DbValue = $row['HospID'];
		$this->RIDNO->DbValue = $row['RIDNO'];
		$this->TidNo->DbValue = $row['TidNo'];
		$this->CId->DbValue = $row['CId'];
		$this->PartnerName->DbValue = $row['PartnerName'];
		$this->PayerType->DbValue = $row['PayerType'];
		$this->Dob->DbValue = $row['Dob'];
		$this->Currency->DbValue = $row['Currency'];
		$this->DiscountRemarks->DbValue = $row['DiscountRemarks'];
		$this->Remarks->DbValue = $row['Remarks'];
		$this->DrDepartment->DbValue = $row['DrDepartment'];
		$this->RefferedBy->DbValue = $row['RefferedBy'];
		$this->CardNumber->DbValue = $row['CardNumber'];
		$this->BankName->DbValue = $row['BankName'];
		$this->DrID->DbValue = $row['DrID'];
		$this->BillStatus->DbValue = $row['BillStatus'];
		$this->ReportHeader->DbValue = $row['ReportHeader'];
		$this->UserName->DbValue = $row['UserName'];
		$this->AdjustmentAdvance->DbValue = $row['AdjustmentAdvance'];
		$this->billing_vouchercol->DbValue = $row['billing_vouchercol'];
		$this->BillType->DbValue = $row['BillType'];
		$this->ProcedureName->DbValue = $row['ProcedureName'];
		$this->ProcedureAmount->DbValue = $row['ProcedureAmount'];
		$this->IncludePackage->DbValue = $row['IncludePackage'];
		$this->CancelBill->DbValue = $row['CancelBill'];
		$this->CancelReason->DbValue = $row['CancelReason'];
		$this->CancelModeOfPayment->DbValue = $row['CancelModeOfPayment'];
		$this->CancelAmount->DbValue = $row['CancelAmount'];
		$this->CancelBankName->DbValue = $row['CancelBankName'];
		$this->CancelTransactionNumber->DbValue = $row['CancelTransactionNumber'];
		$this->LabTest->DbValue = $row['LabTest'];
		$this->sid->DbValue = $row['sid'];
		$this->SidNo->DbValue = $row['SidNo'];
		$this->createdDatettime->DbValue = $row['createdDatettime'];
		$this->LabTestReleased->DbValue = $row['LabTestReleased'];
		$this->GoogleReviewID->DbValue = $row['GoogleReviewID'];
		$this->CardType->DbValue = $row['CardType'];
		$this->PharmacyBill->DbValue = $row['PharmacyBill'];
		$this->DiscountAmount->DbValue = $row['DiscountAmount'];
		$this->Cash->DbValue = $row['Cash'];
		$this->Card->DbValue = $row['Card'];
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
		$val = is_array($row) ? (array_key_exists('id', $row) ? $row['id'] : NULL) : $this->id->CurrentValue;
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
		$name = PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_RETURN_URL;

		// Get referer URL automatically
		if (ServerVar("HTTP_REFERER") <> "" && ReferPageName() <> CurrentPageName() && ReferPageName() <> "login.php") // Referer not same page or login page
			$_SESSION[$name] = ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] <> "") {
			return $_SESSION[$name];
		} else {
			return "billing_voucherlist.php";
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
		if ($pageName == "billing_voucherview.php")
			return $Language->phrase("View");
		elseif ($pageName == "billing_voucheredit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "billing_voucheradd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "billing_voucherlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("billing_voucherview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("billing_voucherview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "billing_voucheradd.php?" . $this->getUrlParm($parm);
		else
			$url = "billing_voucheradd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("billing_voucheredit.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("billing_voucheredit.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
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
		if ($parm <> "")
			$url = $this->keyUrl("billing_voucheradd.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("billing_voucheradd.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
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
		return $this->keyUrl("billing_voucherdelete.php", $this->getUrlParm());
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
		if ($parm <> "")
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
			$this->id->CurrentValue = $key;
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
		$this->id->setDbValue($rs->fields('id'));
		$this->PatId->setDbValue($rs->fields('PatId'));
		$this->Reception->setDbValue($rs->fields('Reception'));
		$this->BillNumber->setDbValue($rs->fields('BillNumber'));
		$this->PatientId->setDbValue($rs->fields('PatientId'));
		$this->mrnno->setDbValue($rs->fields('mrnno'));
		$this->PatientName->setDbValue($rs->fields('PatientName'));
		$this->Age->setDbValue($rs->fields('Age'));
		$this->Gender->setDbValue($rs->fields('Gender'));
		$this->profilePic->setDbValue($rs->fields('profilePic'));
		$this->Mobile->setDbValue($rs->fields('Mobile'));
		$this->IP_OP->setDbValue($rs->fields('IP_OP'));
		$this->Doctor->setDbValue($rs->fields('Doctor'));
		$this->voucher_type->setDbValue($rs->fields('voucher_type'));
		$this->Details->setDbValue($rs->fields('Details'));
		$this->ModeofPayment->setDbValue($rs->fields('ModeofPayment'));
		$this->Amount->setDbValue($rs->fields('Amount'));
		$this->AnyDues->setDbValue($rs->fields('AnyDues'));
		$this->createdby->setDbValue($rs->fields('createdby'));
		$this->createddatetime->setDbValue($rs->fields('createddatetime'));
		$this->modifiedby->setDbValue($rs->fields('modifiedby'));
		$this->modifieddatetime->setDbValue($rs->fields('modifieddatetime'));
		$this->RealizationAmount->setDbValue($rs->fields('RealizationAmount'));
		$this->RealizationStatus->setDbValue($rs->fields('RealizationStatus'));
		$this->RealizationRemarks->setDbValue($rs->fields('RealizationRemarks'));
		$this->RealizationBatchNo->setDbValue($rs->fields('RealizationBatchNo'));
		$this->RealizationDate->setDbValue($rs->fields('RealizationDate'));
		$this->HospID->setDbValue($rs->fields('HospID'));
		$this->RIDNO->setDbValue($rs->fields('RIDNO'));
		$this->TidNo->setDbValue($rs->fields('TidNo'));
		$this->CId->setDbValue($rs->fields('CId'));
		$this->PartnerName->setDbValue($rs->fields('PartnerName'));
		$this->PayerType->setDbValue($rs->fields('PayerType'));
		$this->Dob->setDbValue($rs->fields('Dob'));
		$this->Currency->setDbValue($rs->fields('Currency'));
		$this->DiscountRemarks->setDbValue($rs->fields('DiscountRemarks'));
		$this->Remarks->setDbValue($rs->fields('Remarks'));
		$this->DrDepartment->setDbValue($rs->fields('DrDepartment'));
		$this->RefferedBy->setDbValue($rs->fields('RefferedBy'));
		$this->CardNumber->setDbValue($rs->fields('CardNumber'));
		$this->BankName->setDbValue($rs->fields('BankName'));
		$this->DrID->setDbValue($rs->fields('DrID'));
		$this->BillStatus->setDbValue($rs->fields('BillStatus'));
		$this->ReportHeader->setDbValue($rs->fields('ReportHeader'));
		$this->UserName->setDbValue($rs->fields('UserName'));
		$this->AdjustmentAdvance->setDbValue($rs->fields('AdjustmentAdvance'));
		$this->billing_vouchercol->setDbValue($rs->fields('billing_vouchercol'));
		$this->BillType->setDbValue($rs->fields('BillType'));
		$this->ProcedureName->setDbValue($rs->fields('ProcedureName'));
		$this->ProcedureAmount->setDbValue($rs->fields('ProcedureAmount'));
		$this->IncludePackage->setDbValue($rs->fields('IncludePackage'));
		$this->CancelBill->setDbValue($rs->fields('CancelBill'));
		$this->CancelReason->setDbValue($rs->fields('CancelReason'));
		$this->CancelModeOfPayment->setDbValue($rs->fields('CancelModeOfPayment'));
		$this->CancelAmount->setDbValue($rs->fields('CancelAmount'));
		$this->CancelBankName->setDbValue($rs->fields('CancelBankName'));
		$this->CancelTransactionNumber->setDbValue($rs->fields('CancelTransactionNumber'));
		$this->LabTest->setDbValue($rs->fields('LabTest'));
		$this->sid->setDbValue($rs->fields('sid'));
		$this->SidNo->setDbValue($rs->fields('SidNo'));
		$this->createdDatettime->setDbValue($rs->fields('createdDatettime'));
		$this->LabTestReleased->setDbValue($rs->fields('LabTestReleased'));
		$this->GoogleReviewID->setDbValue($rs->fields('GoogleReviewID'));
		$this->CardType->setDbValue($rs->fields('CardType'));
		$this->PharmacyBill->setDbValue($rs->fields('PharmacyBill'));
		$this->DiscountAmount->setDbValue($rs->fields('DiscountAmount'));
		$this->Cash->setDbValue($rs->fields('Cash'));
		$this->Card->setDbValue($rs->fields('Card'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// PatId
		// Reception
		// BillNumber
		// PatientId
		// mrnno
		// PatientName
		// Age
		// Gender
		// profilePic
		// Mobile
		// IP_OP
		// Doctor
		// voucher_type
		// Details
		// ModeofPayment
		// Amount
		// AnyDues
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// RealizationAmount
		// RealizationStatus
		// RealizationRemarks
		// RealizationBatchNo
		// RealizationDate
		// HospID
		// RIDNO
		// TidNo
		// CId
		// PartnerName
		// PayerType
		// Dob
		// Currency
		// DiscountRemarks
		// Remarks
		// DrDepartment
		// RefferedBy
		// CardNumber
		// BankName
		// DrID
		// BillStatus
		// ReportHeader
		// UserName
		// AdjustmentAdvance
		// billing_vouchercol
		// BillType
		// ProcedureName
		// ProcedureAmount
		// IncludePackage
		// CancelBill
		// CancelReason
		// CancelModeOfPayment
		// CancelAmount
		// CancelBankName
		// CancelTransactionNumber
		// LabTest
		// sid
		// SidNo
		// createdDatettime
		// LabTestReleased
		// GoogleReviewID
		// CardType
		// PharmacyBill
		// DiscountAmount
		// Cash
		// Card
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// PatId
		$this->PatId->ViewValue = $this->PatId->CurrentValue;
		$this->PatId->ViewValue = FormatNumber($this->PatId->ViewValue, 0, -2, -2, -2);
		$this->PatId->ViewCustomAttributes = "";

		// Reception
		$curVal = strval($this->Reception->CurrentValue);
		if ($curVal <> "") {
			$this->Reception->ViewValue = $this->Reception->lookupCacheOption($curVal);
			if ($this->Reception->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->Reception->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$arwrk[3] = $rswrk->fields('df3');
					$this->Reception->ViewValue = $this->Reception->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Reception->ViewValue = $this->Reception->CurrentValue;
				}
			}
		} else {
			$this->Reception->ViewValue = NULL;
		}
		$this->Reception->ViewCustomAttributes = "";

		// BillNumber
		$this->BillNumber->ViewValue = $this->BillNumber->CurrentValue;
		$this->BillNumber->ViewCustomAttributes = "";

		// PatientId
		$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
		$this->PatientId->ImageWidth = 180;
		$this->PatientId->ImageHeight = 60;
		$this->PatientId->ImageAlt = $this->PatientId->alt();
		$this->PatientId->ViewCustomAttributes = "";

		// mrnno
		$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
		$this->mrnno->ViewCustomAttributes = "";

		// PatientName
		$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
		$this->PatientName->ViewCustomAttributes = "";

		// Age
		$this->Age->ViewValue = $this->Age->CurrentValue;
		$this->Age->ViewCustomAttributes = "";

		// Gender
		$this->Gender->ViewValue = $this->Gender->CurrentValue;
		$this->Gender->ViewCustomAttributes = "";

		// profilePic
		$this->profilePic->ViewValue = $this->profilePic->CurrentValue;
		$this->profilePic->ViewCustomAttributes = "";

		// Mobile
		$this->Mobile->ViewValue = $this->Mobile->CurrentValue;
		$this->Mobile->ViewCustomAttributes = "";

		// IP_OP
		$this->IP_OP->ViewValue = $this->IP_OP->CurrentValue;
		$this->IP_OP->ViewCustomAttributes = "";

		// Doctor
		$this->Doctor->ViewValue = $this->Doctor->CurrentValue;
		$curVal = strval($this->Doctor->CurrentValue);
		if ($curVal <> "") {
			$this->Doctor->ViewValue = $this->Doctor->lookupCacheOption($curVal);
			if ($this->Doctor->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->Doctor->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->Doctor->ViewValue = $this->Doctor->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Doctor->ViewValue = $this->Doctor->CurrentValue;
				}
			}
		} else {
			$this->Doctor->ViewValue = NULL;
		}
		$this->Doctor->ViewCustomAttributes = "";

		// voucher_type
		$curVal = strval($this->voucher_type->CurrentValue);
		if ($curVal <> "") {
			$this->voucher_type->ViewValue = $this->voucher_type->lookupCacheOption($curVal);
			if ($this->voucher_type->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Type`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->voucher_type->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->voucher_type->ViewValue = $this->voucher_type->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->voucher_type->ViewValue = $this->voucher_type->CurrentValue;
				}
			}
		} else {
			$this->voucher_type->ViewValue = NULL;
		}
		$this->voucher_type->ViewCustomAttributes = "";

		// Details
		$this->Details->ViewValue = $this->Details->CurrentValue;
		$this->Details->ViewCustomAttributes = "";

		// ModeofPayment
		$curVal = strval($this->ModeofPayment->CurrentValue);
		if ($curVal <> "") {
			$this->ModeofPayment->ViewValue = $this->ModeofPayment->lookupCacheOption($curVal);
			if ($this->ModeofPayment->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Mode`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->ModeofPayment->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
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

		// AnyDues
		$this->AnyDues->ViewValue = $this->AnyDues->CurrentValue;
		$this->AnyDues->ViewCustomAttributes = "";

		// createdby
		$this->createdby->ViewValue = $this->createdby->CurrentValue;
		$this->createdby->ViewCustomAttributes = "";

		// createddatetime
		$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
		$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 11);
		$this->createddatetime->ViewCustomAttributes = "";

		// modifiedby
		$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
		$this->modifiedby->ViewCustomAttributes = "";

		// modifieddatetime
		$this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
		$this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
		$this->modifieddatetime->ViewCustomAttributes = "";

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

		// HospID
		$this->HospID->ViewValue = $this->HospID->CurrentValue;
		$this->HospID->ViewCustomAttributes = "";

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

		// DrDepartment
		$this->DrDepartment->ViewValue = $this->DrDepartment->CurrentValue;
		$this->DrDepartment->ViewCustomAttributes = "";

		// RefferedBy
		$this->RefferedBy->ViewValue = $this->RefferedBy->CurrentValue;
		$this->RefferedBy->ViewCustomAttributes = "";

		// CardNumber
		$this->CardNumber->ViewValue = $this->CardNumber->CurrentValue;
		$this->CardNumber->ViewCustomAttributes = "";

		// BankName
		$this->BankName->ViewValue = $this->BankName->CurrentValue;
		$this->BankName->ViewCustomAttributes = "";

		// DrID
		$this->DrID->ViewValue = $this->DrID->CurrentValue;
		$this->DrID->ViewValue = FormatNumber($this->DrID->ViewValue, 0, -2, -2, -2);
		$this->DrID->ViewCustomAttributes = "";

		// BillStatus
		$this->BillStatus->ViewValue = $this->BillStatus->CurrentValue;
		$this->BillStatus->ViewValue = FormatNumber($this->BillStatus->ViewValue, 0, -2, -2, -2);
		$this->BillStatus->ViewCustomAttributes = "";

		// ReportHeader
		$this->ReportHeader->ViewValue = $this->ReportHeader->CurrentValue;
		$this->ReportHeader->ViewCustomAttributes = "";

		// UserName
		$this->UserName->ViewValue = $this->UserName->CurrentValue;
		$this->UserName->ViewCustomAttributes = "";

		// AdjustmentAdvance
		$this->AdjustmentAdvance->ViewValue = $this->AdjustmentAdvance->CurrentValue;
		$this->AdjustmentAdvance->ViewCustomAttributes = "";

		// billing_vouchercol
		$this->billing_vouchercol->ViewValue = $this->billing_vouchercol->CurrentValue;
		$this->billing_vouchercol->ViewCustomAttributes = "";

		// BillType
		$this->BillType->ViewValue = $this->BillType->CurrentValue;
		$this->BillType->ViewCustomAttributes = "";

		// ProcedureName
		$this->ProcedureName->ViewValue = $this->ProcedureName->CurrentValue;
		$this->ProcedureName->ViewCustomAttributes = "";

		// ProcedureAmount
		$this->ProcedureAmount->ViewValue = $this->ProcedureAmount->CurrentValue;
		$this->ProcedureAmount->ViewValue = FormatNumber($this->ProcedureAmount->ViewValue, 2, -2, -2, -2);
		$this->ProcedureAmount->ViewCustomAttributes = "";

		// IncludePackage
		$this->IncludePackage->ViewValue = $this->IncludePackage->CurrentValue;
		$this->IncludePackage->ViewCustomAttributes = "";

		// CancelBill
		$this->CancelBill->ViewValue = $this->CancelBill->CurrentValue;
		$this->CancelBill->ViewCustomAttributes = "";

		// CancelReason
		$this->CancelReason->ViewValue = $this->CancelReason->CurrentValue;
		$this->CancelReason->ViewCustomAttributes = "";

		// CancelModeOfPayment
		$this->CancelModeOfPayment->ViewValue = $this->CancelModeOfPayment->CurrentValue;
		$this->CancelModeOfPayment->ViewCustomAttributes = "";

		// CancelAmount
		$this->CancelAmount->ViewValue = $this->CancelAmount->CurrentValue;
		$this->CancelAmount->ViewCustomAttributes = "";

		// CancelBankName
		$this->CancelBankName->ViewValue = $this->CancelBankName->CurrentValue;
		$this->CancelBankName->ViewCustomAttributes = "";

		// CancelTransactionNumber
		$this->CancelTransactionNumber->ViewValue = $this->CancelTransactionNumber->CurrentValue;
		$this->CancelTransactionNumber->ViewCustomAttributes = "";

		// LabTest
		$this->LabTest->ViewValue = $this->LabTest->CurrentValue;
		$this->LabTest->ViewCustomAttributes = "";

		// sid
		$this->sid->ViewValue = $this->sid->CurrentValue;
		$this->sid->ViewValue = FormatNumber($this->sid->ViewValue, 0, -2, -2, -2);
		$this->sid->ViewCustomAttributes = "";

		// SidNo
		$this->SidNo->ViewValue = $this->SidNo->CurrentValue;
		$this->SidNo->ViewCustomAttributes = "";

		// createdDatettime
		$this->createdDatettime->ViewValue = $this->createdDatettime->CurrentValue;
		$this->createdDatettime->ViewValue = FormatDateTime($this->createdDatettime->ViewValue, 0);
		$this->createdDatettime->ViewCustomAttributes = "";

		// LabTestReleased
		$this->LabTestReleased->ViewValue = $this->LabTestReleased->CurrentValue;
		$this->LabTestReleased->ViewCustomAttributes = "";

		// GoogleReviewID
		$this->GoogleReviewID->ViewValue = $this->GoogleReviewID->CurrentValue;
		$this->GoogleReviewID->ViewCustomAttributes = "";

		// CardType
		$this->CardType->ViewValue = $this->CardType->CurrentValue;
		$this->CardType->ViewCustomAttributes = "";

		// PharmacyBill
		$this->PharmacyBill->ViewValue = $this->PharmacyBill->CurrentValue;
		$this->PharmacyBill->ViewCustomAttributes = "";

		// DiscountAmount
		$this->DiscountAmount->ViewValue = $this->DiscountAmount->CurrentValue;
		$this->DiscountAmount->ViewValue = FormatNumber($this->DiscountAmount->ViewValue, 2, -2, -2, -2);
		$this->DiscountAmount->ViewCustomAttributes = "";

		// Cash
		$this->Cash->ViewValue = $this->Cash->CurrentValue;
		$this->Cash->ViewValue = FormatNumber($this->Cash->ViewValue, 2, -2, -2, -2);
		$this->Cash->ViewCustomAttributes = "";

		// Card
		$this->Card->ViewValue = $this->Card->CurrentValue;
		$this->Card->ViewValue = FormatNumber($this->Card->ViewValue, 2, -2, -2, -2);
		$this->Card->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// PatId
		$this->PatId->LinkCustomAttributes = "";
		$this->PatId->HrefValue = "";
		$this->PatId->ExportHrefValue = Barcode()->getHrefValue($this->PatId->CurrentValue, 'QRCODE', 60);
		$this->PatId->TooltipValue = "";

		// Reception
		$this->Reception->LinkCustomAttributes = "";
		$this->Reception->HrefValue = "";
		$this->Reception->ExportHrefValue = Barcode()->getHrefValue($this->Reception->CurrentValue, 'QRCODE', 60);
		$this->Reception->TooltipValue = "";

		// BillNumber
		$this->BillNumber->LinkCustomAttributes = "";
		$this->BillNumber->HrefValue = "";
		$this->BillNumber->TooltipValue = "";

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

		// HospID
		$this->HospID->LinkCustomAttributes = "";
		$this->HospID->HrefValue = "";
		$this->HospID->TooltipValue = "";

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

		// DrDepartment
		$this->DrDepartment->LinkCustomAttributes = "";
		$this->DrDepartment->HrefValue = "";
		$this->DrDepartment->TooltipValue = "";

		// RefferedBy
		$this->RefferedBy->LinkCustomAttributes = "";
		$this->RefferedBy->HrefValue = "";
		$this->RefferedBy->TooltipValue = "";

		// CardNumber
		$this->CardNumber->LinkCustomAttributes = "";
		$this->CardNumber->HrefValue = "";
		$this->CardNumber->TooltipValue = "";

		// BankName
		$this->BankName->LinkCustomAttributes = "";
		$this->BankName->HrefValue = "";
		$this->BankName->TooltipValue = "";

		// DrID
		$this->DrID->LinkCustomAttributes = "";
		$this->DrID->HrefValue = "";
		$this->DrID->TooltipValue = "";

		// BillStatus
		$this->BillStatus->LinkCustomAttributes = "";
		$this->BillStatus->HrefValue = "";
		$this->BillStatus->TooltipValue = "";

		// ReportHeader
		$this->ReportHeader->LinkCustomAttributes = "";
		$this->ReportHeader->HrefValue = "";
		$this->ReportHeader->TooltipValue = "";

		// UserName
		$this->UserName->LinkCustomAttributes = "";
		$this->UserName->HrefValue = "";
		$this->UserName->TooltipValue = "";

		// AdjustmentAdvance
		$this->AdjustmentAdvance->LinkCustomAttributes = "";
		$this->AdjustmentAdvance->HrefValue = "";
		$this->AdjustmentAdvance->TooltipValue = "";

		// billing_vouchercol
		$this->billing_vouchercol->LinkCustomAttributes = "";
		$this->billing_vouchercol->HrefValue = "";
		$this->billing_vouchercol->TooltipValue = "";

		// BillType
		$this->BillType->LinkCustomAttributes = "";
		$this->BillType->HrefValue = "";
		$this->BillType->TooltipValue = "";

		// ProcedureName
		$this->ProcedureName->LinkCustomAttributes = "";
		$this->ProcedureName->HrefValue = "";
		$this->ProcedureName->TooltipValue = "";

		// ProcedureAmount
		$this->ProcedureAmount->LinkCustomAttributes = "";
		$this->ProcedureAmount->HrefValue = "";
		$this->ProcedureAmount->TooltipValue = "";

		// IncludePackage
		$this->IncludePackage->LinkCustomAttributes = "";
		$this->IncludePackage->HrefValue = "";
		$this->IncludePackage->TooltipValue = "";

		// CancelBill
		$this->CancelBill->LinkCustomAttributes = "";
		$this->CancelBill->HrefValue = "";
		$this->CancelBill->TooltipValue = "";

		// CancelReason
		$this->CancelReason->LinkCustomAttributes = "";
		$this->CancelReason->HrefValue = "";
		$this->CancelReason->TooltipValue = "";

		// CancelModeOfPayment
		$this->CancelModeOfPayment->LinkCustomAttributes = "";
		$this->CancelModeOfPayment->HrefValue = "";
		$this->CancelModeOfPayment->TooltipValue = "";

		// CancelAmount
		$this->CancelAmount->LinkCustomAttributes = "";
		$this->CancelAmount->HrefValue = "";
		$this->CancelAmount->TooltipValue = "";

		// CancelBankName
		$this->CancelBankName->LinkCustomAttributes = "";
		$this->CancelBankName->HrefValue = "";
		$this->CancelBankName->TooltipValue = "";

		// CancelTransactionNumber
		$this->CancelTransactionNumber->LinkCustomAttributes = "";
		$this->CancelTransactionNumber->HrefValue = "";
		$this->CancelTransactionNumber->TooltipValue = "";

		// LabTest
		$this->LabTest->LinkCustomAttributes = "";
		$this->LabTest->HrefValue = "";
		$this->LabTest->TooltipValue = "";

		// sid
		$this->sid->LinkCustomAttributes = "";
		$this->sid->HrefValue = "";
		$this->sid->TooltipValue = "";

		// SidNo
		$this->SidNo->LinkCustomAttributes = "";
		$this->SidNo->HrefValue = "";
		$this->SidNo->TooltipValue = "";

		// createdDatettime
		$this->createdDatettime->LinkCustomAttributes = "";
		$this->createdDatettime->HrefValue = "";
		$this->createdDatettime->TooltipValue = "";

		// LabTestReleased
		$this->LabTestReleased->LinkCustomAttributes = "";
		$this->LabTestReleased->HrefValue = "";
		$this->LabTestReleased->TooltipValue = "";

		// GoogleReviewID
		$this->GoogleReviewID->LinkCustomAttributes = "";
		$this->GoogleReviewID->HrefValue = "";
		$this->GoogleReviewID->TooltipValue = "";

		// CardType
		$this->CardType->LinkCustomAttributes = "";
		$this->CardType->HrefValue = "";
		$this->CardType->TooltipValue = "";

		// PharmacyBill
		$this->PharmacyBill->LinkCustomAttributes = "";
		$this->PharmacyBill->HrefValue = "";
		$this->PharmacyBill->TooltipValue = "";

		// DiscountAmount
		$this->DiscountAmount->LinkCustomAttributes = "";
		$this->DiscountAmount->HrefValue = "";
		$this->DiscountAmount->TooltipValue = "";

		// Cash
		$this->Cash->LinkCustomAttributes = "";
		$this->Cash->HrefValue = "";
		$this->Cash->TooltipValue = "";

		// Card
		$this->Card->LinkCustomAttributes = "";
		$this->Card->HrefValue = "";
		$this->Card->TooltipValue = "";

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

		// PatId
		$this->PatId->EditAttrs["class"] = "form-control";
		$this->PatId->EditCustomAttributes = "";
		$this->PatId->EditValue = $this->PatId->CurrentValue;
		$this->PatId->PlaceHolder = RemoveHtml($this->PatId->caption());

		// Reception
		$this->Reception->EditAttrs["class"] = "form-control";
		$this->Reception->EditCustomAttributes = "";

		// BillNumber
		$this->BillNumber->EditAttrs["class"] = "form-control";
		$this->BillNumber->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->BillNumber->CurrentValue = HtmlDecode($this->BillNumber->CurrentValue);
		$this->BillNumber->EditValue = $this->BillNumber->CurrentValue;
		$this->BillNumber->PlaceHolder = RemoveHtml($this->BillNumber->caption());

		// PatientId
		$this->PatientId->EditAttrs["class"] = "form-control";
		$this->PatientId->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
		$this->PatientId->EditValue = $this->PatientId->CurrentValue;
		$this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

		// mrnno
		$this->mrnno->EditAttrs["class"] = "form-control";
		$this->mrnno->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
		$this->mrnno->EditValue = $this->mrnno->CurrentValue;
		$this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

		// PatientName
		$this->PatientName->EditAttrs["class"] = "form-control";
		$this->PatientName->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
		$this->PatientName->EditValue = $this->PatientName->CurrentValue;
		$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

		// Age
		$this->Age->EditAttrs["class"] = "form-control";
		$this->Age->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
		$this->Age->EditValue = $this->Age->CurrentValue;
		$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

		// Gender
		$this->Gender->EditAttrs["class"] = "form-control";
		$this->Gender->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Gender->CurrentValue = HtmlDecode($this->Gender->CurrentValue);
		$this->Gender->EditValue = $this->Gender->CurrentValue;
		$this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

		// profilePic
		$this->profilePic->EditAttrs["class"] = "form-control";
		$this->profilePic->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->profilePic->CurrentValue = HtmlDecode($this->profilePic->CurrentValue);
		$this->profilePic->EditValue = $this->profilePic->CurrentValue;
		$this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

		// Mobile
		$this->Mobile->EditAttrs["class"] = "form-control";
		$this->Mobile->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Mobile->CurrentValue = HtmlDecode($this->Mobile->CurrentValue);
		$this->Mobile->EditValue = $this->Mobile->CurrentValue;
		$this->Mobile->PlaceHolder = RemoveHtml($this->Mobile->caption());

		// IP_OP
		$this->IP_OP->EditAttrs["class"] = "form-control";
		$this->IP_OP->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->IP_OP->CurrentValue = HtmlDecode($this->IP_OP->CurrentValue);
		$this->IP_OP->EditValue = $this->IP_OP->CurrentValue;
		$this->IP_OP->PlaceHolder = RemoveHtml($this->IP_OP->caption());

		// Doctor
		$this->Doctor->EditAttrs["class"] = "form-control";
		$this->Doctor->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Doctor->CurrentValue = HtmlDecode($this->Doctor->CurrentValue);
		$this->Doctor->EditValue = $this->Doctor->CurrentValue;
		$this->Doctor->PlaceHolder = RemoveHtml($this->Doctor->caption());

		// voucher_type
		$this->voucher_type->EditAttrs["class"] = "form-control";
		$this->voucher_type->EditCustomAttributes = "";

		// Details
		$this->Details->EditAttrs["class"] = "form-control";
		$this->Details->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Details->CurrentValue = HtmlDecode($this->Details->CurrentValue);
		$this->Details->EditValue = $this->Details->CurrentValue;
		$this->Details->PlaceHolder = RemoveHtml($this->Details->caption());

		// ModeofPayment
		$this->ModeofPayment->EditAttrs["class"] = "form-control";
		$this->ModeofPayment->EditCustomAttributes = "";

		// Amount
		$this->Amount->EditAttrs["class"] = "form-control";
		$this->Amount->EditCustomAttributes = "";
		$this->Amount->EditValue = $this->Amount->CurrentValue;
		$this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());
		if (strval($this->Amount->EditValue) <> "" && is_numeric($this->Amount->EditValue))
			$this->Amount->EditValue = FormatNumber($this->Amount->EditValue, -2, -2, -2, -2);

		// AnyDues
		$this->AnyDues->EditAttrs["class"] = "form-control";
		$this->AnyDues->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->AnyDues->CurrentValue = HtmlDecode($this->AnyDues->CurrentValue);
		$this->AnyDues->EditValue = $this->AnyDues->CurrentValue;
		$this->AnyDues->PlaceHolder = RemoveHtml($this->AnyDues->caption());

		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// RealizationAmount

		$this->RealizationAmount->EditAttrs["class"] = "form-control";
		$this->RealizationAmount->EditCustomAttributes = "";
		$this->RealizationAmount->EditValue = $this->RealizationAmount->CurrentValue;
		$this->RealizationAmount->PlaceHolder = RemoveHtml($this->RealizationAmount->caption());
		if (strval($this->RealizationAmount->EditValue) <> "" && is_numeric($this->RealizationAmount->EditValue))
			$this->RealizationAmount->EditValue = FormatNumber($this->RealizationAmount->EditValue, -2, -2, -2, -2);

		// RealizationStatus
		$this->RealizationStatus->EditAttrs["class"] = "form-control";
		$this->RealizationStatus->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->RealizationStatus->CurrentValue = HtmlDecode($this->RealizationStatus->CurrentValue);
		$this->RealizationStatus->EditValue = $this->RealizationStatus->CurrentValue;
		$this->RealizationStatus->PlaceHolder = RemoveHtml($this->RealizationStatus->caption());

		// RealizationRemarks
		$this->RealizationRemarks->EditAttrs["class"] = "form-control";
		$this->RealizationRemarks->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->RealizationRemarks->CurrentValue = HtmlDecode($this->RealizationRemarks->CurrentValue);
		$this->RealizationRemarks->EditValue = $this->RealizationRemarks->CurrentValue;
		$this->RealizationRemarks->PlaceHolder = RemoveHtml($this->RealizationRemarks->caption());

		// RealizationBatchNo
		$this->RealizationBatchNo->EditAttrs["class"] = "form-control";
		$this->RealizationBatchNo->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->RealizationBatchNo->CurrentValue = HtmlDecode($this->RealizationBatchNo->CurrentValue);
		$this->RealizationBatchNo->EditValue = $this->RealizationBatchNo->CurrentValue;
		$this->RealizationBatchNo->PlaceHolder = RemoveHtml($this->RealizationBatchNo->caption());

		// RealizationDate
		$this->RealizationDate->EditAttrs["class"] = "form-control";
		$this->RealizationDate->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->RealizationDate->CurrentValue = HtmlDecode($this->RealizationDate->CurrentValue);
		$this->RealizationDate->EditValue = $this->RealizationDate->CurrentValue;
		$this->RealizationDate->PlaceHolder = RemoveHtml($this->RealizationDate->caption());

		// HospID
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
		if (REMOVE_XSS)
			$this->PartnerName->CurrentValue = HtmlDecode($this->PartnerName->CurrentValue);
		$this->PartnerName->EditValue = $this->PartnerName->CurrentValue;
		$this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

		// PayerType
		$this->PayerType->EditAttrs["class"] = "form-control";
		$this->PayerType->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PayerType->CurrentValue = HtmlDecode($this->PayerType->CurrentValue);
		$this->PayerType->EditValue = $this->PayerType->CurrentValue;
		$this->PayerType->PlaceHolder = RemoveHtml($this->PayerType->caption());

		// Dob
		$this->Dob->EditAttrs["class"] = "form-control";
		$this->Dob->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Dob->CurrentValue = HtmlDecode($this->Dob->CurrentValue);
		$this->Dob->EditValue = $this->Dob->CurrentValue;
		$this->Dob->PlaceHolder = RemoveHtml($this->Dob->caption());

		// Currency
		$this->Currency->EditAttrs["class"] = "form-control";
		$this->Currency->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Currency->CurrentValue = HtmlDecode($this->Currency->CurrentValue);
		$this->Currency->EditValue = $this->Currency->CurrentValue;
		$this->Currency->PlaceHolder = RemoveHtml($this->Currency->caption());

		// DiscountRemarks
		$this->DiscountRemarks->EditAttrs["class"] = "form-control";
		$this->DiscountRemarks->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->DiscountRemarks->CurrentValue = HtmlDecode($this->DiscountRemarks->CurrentValue);
		$this->DiscountRemarks->EditValue = $this->DiscountRemarks->CurrentValue;
		$this->DiscountRemarks->PlaceHolder = RemoveHtml($this->DiscountRemarks->caption());

		// Remarks
		$this->Remarks->EditAttrs["class"] = "form-control";
		$this->Remarks->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Remarks->CurrentValue = HtmlDecode($this->Remarks->CurrentValue);
		$this->Remarks->EditValue = $this->Remarks->CurrentValue;
		$this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

		// DrDepartment
		$this->DrDepartment->EditAttrs["class"] = "form-control";
		$this->DrDepartment->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->DrDepartment->CurrentValue = HtmlDecode($this->DrDepartment->CurrentValue);
		$this->DrDepartment->EditValue = $this->DrDepartment->CurrentValue;
		$this->DrDepartment->PlaceHolder = RemoveHtml($this->DrDepartment->caption());

		// RefferedBy
		$this->RefferedBy->EditAttrs["class"] = "form-control";
		$this->RefferedBy->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->RefferedBy->CurrentValue = HtmlDecode($this->RefferedBy->CurrentValue);
		$this->RefferedBy->EditValue = $this->RefferedBy->CurrentValue;
		$this->RefferedBy->PlaceHolder = RemoveHtml($this->RefferedBy->caption());

		// CardNumber
		$this->CardNumber->EditAttrs["class"] = "form-control";
		$this->CardNumber->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->CardNumber->CurrentValue = HtmlDecode($this->CardNumber->CurrentValue);
		$this->CardNumber->EditValue = $this->CardNumber->CurrentValue;
		$this->CardNumber->PlaceHolder = RemoveHtml($this->CardNumber->caption());

		// BankName
		$this->BankName->EditAttrs["class"] = "form-control";
		$this->BankName->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->BankName->CurrentValue = HtmlDecode($this->BankName->CurrentValue);
		$this->BankName->EditValue = $this->BankName->CurrentValue;
		$this->BankName->PlaceHolder = RemoveHtml($this->BankName->caption());

		// DrID
		$this->DrID->EditAttrs["class"] = "form-control";
		$this->DrID->EditCustomAttributes = "";
		$this->DrID->EditValue = $this->DrID->CurrentValue;
		$this->DrID->PlaceHolder = RemoveHtml($this->DrID->caption());

		// BillStatus
		$this->BillStatus->EditAttrs["class"] = "form-control";
		$this->BillStatus->EditCustomAttributes = "";
		$this->BillStatus->EditValue = $this->BillStatus->CurrentValue;
		$this->BillStatus->PlaceHolder = RemoveHtml($this->BillStatus->caption());

		// ReportHeader
		$this->ReportHeader->EditAttrs["class"] = "form-control";
		$this->ReportHeader->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ReportHeader->CurrentValue = HtmlDecode($this->ReportHeader->CurrentValue);
		$this->ReportHeader->EditValue = $this->ReportHeader->CurrentValue;
		$this->ReportHeader->PlaceHolder = RemoveHtml($this->ReportHeader->caption());

		// UserName
		// AdjustmentAdvance

		$this->AdjustmentAdvance->EditAttrs["class"] = "form-control";
		$this->AdjustmentAdvance->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->AdjustmentAdvance->CurrentValue = HtmlDecode($this->AdjustmentAdvance->CurrentValue);
		$this->AdjustmentAdvance->EditValue = $this->AdjustmentAdvance->CurrentValue;
		$this->AdjustmentAdvance->PlaceHolder = RemoveHtml($this->AdjustmentAdvance->caption());

		// billing_vouchercol
		$this->billing_vouchercol->EditAttrs["class"] = "form-control";
		$this->billing_vouchercol->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->billing_vouchercol->CurrentValue = HtmlDecode($this->billing_vouchercol->CurrentValue);
		$this->billing_vouchercol->EditValue = $this->billing_vouchercol->CurrentValue;
		$this->billing_vouchercol->PlaceHolder = RemoveHtml($this->billing_vouchercol->caption());

		// BillType
		$this->BillType->EditAttrs["class"] = "form-control";
		$this->BillType->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->BillType->CurrentValue = HtmlDecode($this->BillType->CurrentValue);
		$this->BillType->EditValue = $this->BillType->CurrentValue;
		$this->BillType->PlaceHolder = RemoveHtml($this->BillType->caption());

		// ProcedureName
		$this->ProcedureName->EditAttrs["class"] = "form-control";
		$this->ProcedureName->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ProcedureName->CurrentValue = HtmlDecode($this->ProcedureName->CurrentValue);
		$this->ProcedureName->EditValue = $this->ProcedureName->CurrentValue;
		$this->ProcedureName->PlaceHolder = RemoveHtml($this->ProcedureName->caption());

		// ProcedureAmount
		$this->ProcedureAmount->EditAttrs["class"] = "form-control";
		$this->ProcedureAmount->EditCustomAttributes = "";
		$this->ProcedureAmount->EditValue = $this->ProcedureAmount->CurrentValue;
		$this->ProcedureAmount->PlaceHolder = RemoveHtml($this->ProcedureAmount->caption());
		if (strval($this->ProcedureAmount->EditValue) <> "" && is_numeric($this->ProcedureAmount->EditValue))
			$this->ProcedureAmount->EditValue = FormatNumber($this->ProcedureAmount->EditValue, -2, -2, -2, -2);

		// IncludePackage
		$this->IncludePackage->EditAttrs["class"] = "form-control";
		$this->IncludePackage->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->IncludePackage->CurrentValue = HtmlDecode($this->IncludePackage->CurrentValue);
		$this->IncludePackage->EditValue = $this->IncludePackage->CurrentValue;
		$this->IncludePackage->PlaceHolder = RemoveHtml($this->IncludePackage->caption());

		// CancelBill
		$this->CancelBill->EditAttrs["class"] = "form-control";
		$this->CancelBill->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->CancelBill->CurrentValue = HtmlDecode($this->CancelBill->CurrentValue);
		$this->CancelBill->EditValue = $this->CancelBill->CurrentValue;
		$this->CancelBill->PlaceHolder = RemoveHtml($this->CancelBill->caption());

		// CancelReason
		$this->CancelReason->EditAttrs["class"] = "form-control";
		$this->CancelReason->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->CancelReason->CurrentValue = HtmlDecode($this->CancelReason->CurrentValue);
		$this->CancelReason->EditValue = $this->CancelReason->CurrentValue;
		$this->CancelReason->PlaceHolder = RemoveHtml($this->CancelReason->caption());

		// CancelModeOfPayment
		$this->CancelModeOfPayment->EditAttrs["class"] = "form-control";
		$this->CancelModeOfPayment->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->CancelModeOfPayment->CurrentValue = HtmlDecode($this->CancelModeOfPayment->CurrentValue);
		$this->CancelModeOfPayment->EditValue = $this->CancelModeOfPayment->CurrentValue;
		$this->CancelModeOfPayment->PlaceHolder = RemoveHtml($this->CancelModeOfPayment->caption());

		// CancelAmount
		$this->CancelAmount->EditAttrs["class"] = "form-control";
		$this->CancelAmount->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->CancelAmount->CurrentValue = HtmlDecode($this->CancelAmount->CurrentValue);
		$this->CancelAmount->EditValue = $this->CancelAmount->CurrentValue;
		$this->CancelAmount->PlaceHolder = RemoveHtml($this->CancelAmount->caption());

		// CancelBankName
		$this->CancelBankName->EditAttrs["class"] = "form-control";
		$this->CancelBankName->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->CancelBankName->CurrentValue = HtmlDecode($this->CancelBankName->CurrentValue);
		$this->CancelBankName->EditValue = $this->CancelBankName->CurrentValue;
		$this->CancelBankName->PlaceHolder = RemoveHtml($this->CancelBankName->caption());

		// CancelTransactionNumber
		$this->CancelTransactionNumber->EditAttrs["class"] = "form-control";
		$this->CancelTransactionNumber->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->CancelTransactionNumber->CurrentValue = HtmlDecode($this->CancelTransactionNumber->CurrentValue);
		$this->CancelTransactionNumber->EditValue = $this->CancelTransactionNumber->CurrentValue;
		$this->CancelTransactionNumber->PlaceHolder = RemoveHtml($this->CancelTransactionNumber->caption());

		// LabTest
		$this->LabTest->EditAttrs["class"] = "form-control";
		$this->LabTest->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->LabTest->CurrentValue = HtmlDecode($this->LabTest->CurrentValue);
		$this->LabTest->EditValue = $this->LabTest->CurrentValue;
		$this->LabTest->PlaceHolder = RemoveHtml($this->LabTest->caption());

		// sid
		$this->sid->EditAttrs["class"] = "form-control";
		$this->sid->EditCustomAttributes = "";
		$this->sid->EditValue = $this->sid->CurrentValue;
		$this->sid->PlaceHolder = RemoveHtml($this->sid->caption());

		// SidNo
		$this->SidNo->EditAttrs["class"] = "form-control";
		$this->SidNo->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->SidNo->CurrentValue = HtmlDecode($this->SidNo->CurrentValue);
		$this->SidNo->EditValue = $this->SidNo->CurrentValue;
		$this->SidNo->PlaceHolder = RemoveHtml($this->SidNo->caption());

		// createdDatettime
		// LabTestReleased

		$this->LabTestReleased->EditAttrs["class"] = "form-control";
		$this->LabTestReleased->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->LabTestReleased->CurrentValue = HtmlDecode($this->LabTestReleased->CurrentValue);
		$this->LabTestReleased->EditValue = $this->LabTestReleased->CurrentValue;
		$this->LabTestReleased->PlaceHolder = RemoveHtml($this->LabTestReleased->caption());

		// GoogleReviewID
		$this->GoogleReviewID->EditAttrs["class"] = "form-control";
		$this->GoogleReviewID->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->GoogleReviewID->CurrentValue = HtmlDecode($this->GoogleReviewID->CurrentValue);
		$this->GoogleReviewID->EditValue = $this->GoogleReviewID->CurrentValue;
		$this->GoogleReviewID->PlaceHolder = RemoveHtml($this->GoogleReviewID->caption());

		// CardType
		$this->CardType->EditAttrs["class"] = "form-control";
		$this->CardType->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->CardType->CurrentValue = HtmlDecode($this->CardType->CurrentValue);
		$this->CardType->EditValue = $this->CardType->CurrentValue;
		$this->CardType->PlaceHolder = RemoveHtml($this->CardType->caption());

		// PharmacyBill
		$this->PharmacyBill->EditAttrs["class"] = "form-control";
		$this->PharmacyBill->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PharmacyBill->CurrentValue = HtmlDecode($this->PharmacyBill->CurrentValue);
		$this->PharmacyBill->EditValue = $this->PharmacyBill->CurrentValue;
		$this->PharmacyBill->PlaceHolder = RemoveHtml($this->PharmacyBill->caption());

		// DiscountAmount
		$this->DiscountAmount->EditAttrs["class"] = "form-control";
		$this->DiscountAmount->EditCustomAttributes = "";
		$this->DiscountAmount->EditValue = $this->DiscountAmount->CurrentValue;
		$this->DiscountAmount->PlaceHolder = RemoveHtml($this->DiscountAmount->caption());
		if (strval($this->DiscountAmount->EditValue) <> "" && is_numeric($this->DiscountAmount->EditValue))
			$this->DiscountAmount->EditValue = FormatNumber($this->DiscountAmount->EditValue, -2, -2, -2, -2);

		// Cash
		$this->Cash->EditAttrs["class"] = "form-control";
		$this->Cash->EditCustomAttributes = "";
		$this->Cash->EditValue = $this->Cash->CurrentValue;
		$this->Cash->PlaceHolder = RemoveHtml($this->Cash->caption());
		if (strval($this->Cash->EditValue) <> "" && is_numeric($this->Cash->EditValue))
			$this->Cash->EditValue = FormatNumber($this->Cash->EditValue, -2, -2, -2, -2);

		// Card
		$this->Card->EditAttrs["class"] = "form-control";
		$this->Card->EditCustomAttributes = "";
		$this->Card->EditValue = $this->Card->CurrentValue;
		$this->Card->PlaceHolder = RemoveHtml($this->Card->caption());
		if (strval($this->Card->EditValue) <> "" && is_numeric($this->Card->EditValue))
			$this->Card->EditValue = FormatNumber($this->Card->EditValue, -2, -2, -2, -2);

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
					$doc->exportCaption($this->PatId);
					$doc->exportCaption($this->Reception);
					$doc->exportCaption($this->BillNumber);
					$doc->exportCaption($this->PatientId);
					$doc->exportCaption($this->mrnno);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->Age);
					$doc->exportCaption($this->Gender);
					$doc->exportCaption($this->profilePic);
					$doc->exportCaption($this->Mobile);
					$doc->exportCaption($this->IP_OP);
					$doc->exportCaption($this->Doctor);
					$doc->exportCaption($this->voucher_type);
					$doc->exportCaption($this->Details);
					$doc->exportCaption($this->ModeofPayment);
					$doc->exportCaption($this->Amount);
					$doc->exportCaption($this->AnyDues);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
					$doc->exportCaption($this->RealizationAmount);
					$doc->exportCaption($this->RealizationStatus);
					$doc->exportCaption($this->RealizationRemarks);
					$doc->exportCaption($this->RealizationBatchNo);
					$doc->exportCaption($this->RealizationDate);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->RIDNO);
					$doc->exportCaption($this->TidNo);
					$doc->exportCaption($this->CId);
					$doc->exportCaption($this->PartnerName);
					$doc->exportCaption($this->PayerType);
					$doc->exportCaption($this->Dob);
					$doc->exportCaption($this->Currency);
					$doc->exportCaption($this->DiscountRemarks);
					$doc->exportCaption($this->Remarks);
					$doc->exportCaption($this->DrDepartment);
					$doc->exportCaption($this->RefferedBy);
					$doc->exportCaption($this->CardNumber);
					$doc->exportCaption($this->BankName);
					$doc->exportCaption($this->DrID);
					$doc->exportCaption($this->BillStatus);
					$doc->exportCaption($this->ReportHeader);
					$doc->exportCaption($this->UserName);
					$doc->exportCaption($this->AdjustmentAdvance);
					$doc->exportCaption($this->billing_vouchercol);
					$doc->exportCaption($this->BillType);
					$doc->exportCaption($this->ProcedureName);
					$doc->exportCaption($this->ProcedureAmount);
					$doc->exportCaption($this->IncludePackage);
					$doc->exportCaption($this->CancelBill);
					$doc->exportCaption($this->CancelReason);
					$doc->exportCaption($this->CancelModeOfPayment);
					$doc->exportCaption($this->CancelAmount);
					$doc->exportCaption($this->CancelBankName);
					$doc->exportCaption($this->CancelTransactionNumber);
					$doc->exportCaption($this->LabTest);
					$doc->exportCaption($this->sid);
					$doc->exportCaption($this->SidNo);
					$doc->exportCaption($this->createdDatettime);
					$doc->exportCaption($this->LabTestReleased);
					$doc->exportCaption($this->GoogleReviewID);
					$doc->exportCaption($this->CardType);
					$doc->exportCaption($this->PharmacyBill);
					$doc->exportCaption($this->DiscountAmount);
					$doc->exportCaption($this->Cash);
					$doc->exportCaption($this->Card);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->PatId);
					$doc->exportCaption($this->Reception);
					$doc->exportCaption($this->BillNumber);
					$doc->exportCaption($this->PatientId);
					$doc->exportCaption($this->mrnno);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->Age);
					$doc->exportCaption($this->Gender);
					$doc->exportCaption($this->Mobile);
					$doc->exportCaption($this->IP_OP);
					$doc->exportCaption($this->Doctor);
					$doc->exportCaption($this->voucher_type);
					$doc->exportCaption($this->Details);
					$doc->exportCaption($this->ModeofPayment);
					$doc->exportCaption($this->Amount);
					$doc->exportCaption($this->AnyDues);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
					$doc->exportCaption($this->RealizationAmount);
					$doc->exportCaption($this->RealizationStatus);
					$doc->exportCaption($this->RealizationRemarks);
					$doc->exportCaption($this->RealizationBatchNo);
					$doc->exportCaption($this->RealizationDate);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->RIDNO);
					$doc->exportCaption($this->TidNo);
					$doc->exportCaption($this->CId);
					$doc->exportCaption($this->PartnerName);
					$doc->exportCaption($this->PayerType);
					$doc->exportCaption($this->Dob);
					$doc->exportCaption($this->Currency);
					$doc->exportCaption($this->DiscountRemarks);
					$doc->exportCaption($this->Remarks);
					$doc->exportCaption($this->DrDepartment);
					$doc->exportCaption($this->RefferedBy);
					$doc->exportCaption($this->CardNumber);
					$doc->exportCaption($this->BankName);
					$doc->exportCaption($this->DrID);
					$doc->exportCaption($this->BillStatus);
					$doc->exportCaption($this->ReportHeader);
					$doc->exportCaption($this->UserName);
					$doc->exportCaption($this->AdjustmentAdvance);
					$doc->exportCaption($this->billing_vouchercol);
					$doc->exportCaption($this->BillType);
					$doc->exportCaption($this->ProcedureName);
					$doc->exportCaption($this->ProcedureAmount);
					$doc->exportCaption($this->IncludePackage);
					$doc->exportCaption($this->CancelBill);
					$doc->exportCaption($this->CancelReason);
					$doc->exportCaption($this->CancelModeOfPayment);
					$doc->exportCaption($this->CancelAmount);
					$doc->exportCaption($this->CancelBankName);
					$doc->exportCaption($this->CancelTransactionNumber);
					$doc->exportCaption($this->LabTest);
					$doc->exportCaption($this->sid);
					$doc->exportCaption($this->SidNo);
					$doc->exportCaption($this->createdDatettime);
					$doc->exportCaption($this->LabTestReleased);
					$doc->exportCaption($this->GoogleReviewID);
					$doc->exportCaption($this->CardType);
					$doc->exportCaption($this->PharmacyBill);
					$doc->exportCaption($this->DiscountAmount);
					$doc->exportCaption($this->Cash);
					$doc->exportCaption($this->Card);
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
						$doc->exportField($this->PatId);
						$doc->exportField($this->Reception);
						$doc->exportField($this->BillNumber);
						$doc->exportField($this->PatientId);
						$doc->exportField($this->mrnno);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->Age);
						$doc->exportField($this->Gender);
						$doc->exportField($this->profilePic);
						$doc->exportField($this->Mobile);
						$doc->exportField($this->IP_OP);
						$doc->exportField($this->Doctor);
						$doc->exportField($this->voucher_type);
						$doc->exportField($this->Details);
						$doc->exportField($this->ModeofPayment);
						$doc->exportField($this->Amount);
						$doc->exportField($this->AnyDues);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
						$doc->exportField($this->RealizationAmount);
						$doc->exportField($this->RealizationStatus);
						$doc->exportField($this->RealizationRemarks);
						$doc->exportField($this->RealizationBatchNo);
						$doc->exportField($this->RealizationDate);
						$doc->exportField($this->HospID);
						$doc->exportField($this->RIDNO);
						$doc->exportField($this->TidNo);
						$doc->exportField($this->CId);
						$doc->exportField($this->PartnerName);
						$doc->exportField($this->PayerType);
						$doc->exportField($this->Dob);
						$doc->exportField($this->Currency);
						$doc->exportField($this->DiscountRemarks);
						$doc->exportField($this->Remarks);
						$doc->exportField($this->DrDepartment);
						$doc->exportField($this->RefferedBy);
						$doc->exportField($this->CardNumber);
						$doc->exportField($this->BankName);
						$doc->exportField($this->DrID);
						$doc->exportField($this->BillStatus);
						$doc->exportField($this->ReportHeader);
						$doc->exportField($this->UserName);
						$doc->exportField($this->AdjustmentAdvance);
						$doc->exportField($this->billing_vouchercol);
						$doc->exportField($this->BillType);
						$doc->exportField($this->ProcedureName);
						$doc->exportField($this->ProcedureAmount);
						$doc->exportField($this->IncludePackage);
						$doc->exportField($this->CancelBill);
						$doc->exportField($this->CancelReason);
						$doc->exportField($this->CancelModeOfPayment);
						$doc->exportField($this->CancelAmount);
						$doc->exportField($this->CancelBankName);
						$doc->exportField($this->CancelTransactionNumber);
						$doc->exportField($this->LabTest);
						$doc->exportField($this->sid);
						$doc->exportField($this->SidNo);
						$doc->exportField($this->createdDatettime);
						$doc->exportField($this->LabTestReleased);
						$doc->exportField($this->GoogleReviewID);
						$doc->exportField($this->CardType);
						$doc->exportField($this->PharmacyBill);
						$doc->exportField($this->DiscountAmount);
						$doc->exportField($this->Cash);
						$doc->exportField($this->Card);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->PatId);
						$doc->exportField($this->Reception);
						$doc->exportField($this->BillNumber);
						$doc->exportField($this->PatientId);
						$doc->exportField($this->mrnno);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->Age);
						$doc->exportField($this->Gender);
						$doc->exportField($this->Mobile);
						$doc->exportField($this->IP_OP);
						$doc->exportField($this->Doctor);
						$doc->exportField($this->voucher_type);
						$doc->exportField($this->Details);
						$doc->exportField($this->ModeofPayment);
						$doc->exportField($this->Amount);
						$doc->exportField($this->AnyDues);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
						$doc->exportField($this->RealizationAmount);
						$doc->exportField($this->RealizationStatus);
						$doc->exportField($this->RealizationRemarks);
						$doc->exportField($this->RealizationBatchNo);
						$doc->exportField($this->RealizationDate);
						$doc->exportField($this->HospID);
						$doc->exportField($this->RIDNO);
						$doc->exportField($this->TidNo);
						$doc->exportField($this->CId);
						$doc->exportField($this->PartnerName);
						$doc->exportField($this->PayerType);
						$doc->exportField($this->Dob);
						$doc->exportField($this->Currency);
						$doc->exportField($this->DiscountRemarks);
						$doc->exportField($this->Remarks);
						$doc->exportField($this->DrDepartment);
						$doc->exportField($this->RefferedBy);
						$doc->exportField($this->CardNumber);
						$doc->exportField($this->BankName);
						$doc->exportField($this->DrID);
						$doc->exportField($this->BillStatus);
						$doc->exportField($this->ReportHeader);
						$doc->exportField($this->UserName);
						$doc->exportField($this->AdjustmentAdvance);
						$doc->exportField($this->billing_vouchercol);
						$doc->exportField($this->BillType);
						$doc->exportField($this->ProcedureName);
						$doc->exportField($this->ProcedureAmount);
						$doc->exportField($this->IncludePackage);
						$doc->exportField($this->CancelBill);
						$doc->exportField($this->CancelReason);
						$doc->exportField($this->CancelModeOfPayment);
						$doc->exportField($this->CancelAmount);
						$doc->exportField($this->CancelBankName);
						$doc->exportField($this->CancelTransactionNumber);
						$doc->exportField($this->LabTest);
						$doc->exportField($this->sid);
						$doc->exportField($this->SidNo);
						$doc->exportField($this->createdDatettime);
						$doc->exportField($this->LabTestReleased);
						$doc->exportField($this->GoogleReviewID);
						$doc->exportField($this->CardType);
						$doc->exportField($this->PharmacyBill);
						$doc->exportField($this->DiscountAmount);
						$doc->exportField($this->Cash);
						$doc->exportField($this->Card);
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