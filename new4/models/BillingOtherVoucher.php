<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for billing_other_voucher
 */
class BillingOtherVoucher extends DbTable
{
    protected $SqlFrom = "";
    protected $SqlSelect = null;
    protected $SqlSelectList = null;
    protected $SqlWhere = "";
    protected $SqlGroupBy = "";
    protected $SqlHaving = "";
    protected $SqlOrderBy = "";
    public $UseSessionForListSql = true;

    // Column CSS classes
    public $LeftColumnClass = "col-sm-2 col-form-label ew-label";
    public $RightColumnClass = "col-sm-10";
    public $OffsetColumnClass = "col-sm-10 offset-sm-2";
    public $TableLeftColumnClass = "w-col-2";

    // Export
    public $ExportDoc;

    // Fields
    public $id;
    public $freezed;
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
    public $Cash;
    public $Card;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'billing_other_voucher';
        $this->TableName = 'billing_other_voucher';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`billing_other_voucher`";
        $this->Dbid = 'DB';
        $this->ExportAll = true;
        $this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
        $this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
        $this->ExportPageSize = "a4"; // Page size (PDF only)
        $this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
        $this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
        $this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
        $this->ExportWordColumnWidth = null; // Cell width (PHPWord only)
        $this->DetailAdd = false; // Allow detail add
        $this->DetailEdit = false; // Allow detail edit
        $this->DetailView = false; // Allow detail view
        $this->ShowMultipleDetails = false; // Show multiple details
        $this->GridAddRowCount = 5;
        $this->AllowAddDeleteRow = true; // Allow add/delete row
        $this->UserIDAllowSecurity = Config("DEFAULT_USER_ID_ALLOW_SECURITY"); // Default User ID allowed permissions
        $this->BasicSearch = new BasicSearch($this->TableVar);

        // id
        $this->id = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // freezed
        $this->freezed = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_freezed', 'freezed', '`freezed`', '`freezed`', 200, 45, -1, false, '`freezed`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->freezed->Sortable = false; // Allow sort
        $this->freezed->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->freezed->Param, "CustomMsg");
        $this->Fields['freezed'] = &$this->freezed;

        // AdvanceNo
        $this->AdvanceNo = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_AdvanceNo', 'AdvanceNo', '`AdvanceNo`', '`AdvanceNo`', 200, 45, -1, false, '`AdvanceNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AdvanceNo->Sortable = true; // Allow sort
        $this->AdvanceNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AdvanceNo->Param, "CustomMsg");
        $this->Fields['AdvanceNo'] = &$this->AdvanceNo;

        // PatientID
        $this->PatientID = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_PatientID', 'PatientID', '`PatientID`', '`PatientID`', 200, 45, -1, false, '`PatientID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientID->Required = true; // Required field
        $this->PatientID->Sortable = true; // Allow sort
        $this->PatientID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientID->Param, "CustomMsg");
        $this->Fields['PatientID'] = &$this->PatientID;

        // PatientName
        $this->PatientName = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, false, '`PatientName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientName->Required = true; // Required field
        $this->PatientName->Sortable = true; // Allow sort
        $this->PatientName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientName->Param, "CustomMsg");
        $this->Fields['PatientName'] = &$this->PatientName;

        // Mobile
        $this->Mobile = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_Mobile', 'Mobile', '`Mobile`', '`Mobile`', 200, 45, -1, false, '`Mobile`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Mobile->Sortable = true; // Allow sort
        $this->Mobile->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Mobile->Param, "CustomMsg");
        $this->Fields['Mobile'] = &$this->Mobile;

        // ModeofPayment
        $this->ModeofPayment = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_ModeofPayment', 'ModeofPayment', '`ModeofPayment`', '`ModeofPayment`', 200, 45, -1, false, '`ModeofPayment`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->ModeofPayment->Required = true; // Required field
        $this->ModeofPayment->Sortable = true; // Allow sort
        $this->ModeofPayment->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->ModeofPayment->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->ModeofPayment->Lookup = new Lookup('ModeofPayment', 'mas_modepayment', false, 'Mode', ["Mode","","",""], [], [], [], [], [], [], '', '');
        $this->ModeofPayment->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ModeofPayment->Param, "CustomMsg");
        $this->Fields['ModeofPayment'] = &$this->ModeofPayment;

        // Amount
        $this->Amount = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_Amount', 'Amount', '`Amount`', '`Amount`', 131, 10, -1, false, '`Amount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Amount->Required = true; // Required field
        $this->Amount->Sortable = true; // Allow sort
        $this->Amount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Amount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Amount->Param, "CustomMsg");
        $this->Fields['Amount'] = &$this->Amount;

        // CardNumber
        $this->CardNumber = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_CardNumber', 'CardNumber', '`CardNumber`', '`CardNumber`', 200, 45, -1, false, '`CardNumber`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CardNumber->Sortable = true; // Allow sort
        $this->CardNumber->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CardNumber->Param, "CustomMsg");
        $this->Fields['CardNumber'] = &$this->CardNumber;

        // BankName
        $this->BankName = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_BankName', 'BankName', '`BankName`', '`BankName`', 200, 45, -1, false, '`BankName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BankName->Sortable = true; // Allow sort
        $this->BankName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BankName->Param, "CustomMsg");
        $this->Fields['BankName'] = &$this->BankName;

        // Name
        $this->Name = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_Name', 'Name', '`Name`', '`Name`', 200, 45, -1, false, '`Name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Name->Sortable = true; // Allow sort
        $this->Name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Name->Param, "CustomMsg");
        $this->Fields['Name'] = &$this->Name;

        // voucher_type
        $this->voucher_type = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_voucher_type', 'voucher_type', '`voucher_type`', '`voucher_type`', 200, 45, -1, false, '`voucher_type`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->voucher_type->Sortable = true; // Allow sort
        $this->voucher_type->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->voucher_type->Param, "CustomMsg");
        $this->Fields['voucher_type'] = &$this->voucher_type;

        // Details
        $this->Details = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_Details', 'Details', '`Details`', '`Details`', 200, 45, -1, false, '`Details`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Details->Sortable = true; // Allow sort
        $this->Details->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Details->Param, "CustomMsg");
        $this->Fields['Details'] = &$this->Details;

        // Date
        $this->Date = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_Date', 'Date', '`Date`', CastDateFieldForLike("`Date`", 7, "DB"), 135, 19, 7, false, '`Date`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Date->Required = true; // Required field
        $this->Date->Sortable = true; // Allow sort
        $this->Date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->Date->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Date->Param, "CustomMsg");
        $this->Fields['Date'] = &$this->Date;

        // AnyDues
        $this->AnyDues = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_AnyDues', 'AnyDues', '`AnyDues`', '`AnyDues`', 200, 45, -1, false, '`AnyDues`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AnyDues->Sortable = true; // Allow sort
        $this->AnyDues->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AnyDues->Param, "CustomMsg");
        $this->Fields['AnyDues'] = &$this->AnyDues;

        // createdby
        $this->createdby = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 200, 45, -1, false, '`createdby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdby->Sortable = true; // Allow sort
        $this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->createdby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createdby->Param, "CustomMsg");
        $this->Fields['createdby'] = &$this->createdby;

        // createddatetime
        $this->createddatetime = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 7, "DB"), 135, 19, 7, false, '`createddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddatetime->Sortable = true; // Allow sort
        $this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->createddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createddatetime->Param, "CustomMsg");
        $this->Fields['createddatetime'] = &$this->createddatetime;

        // modifiedby
        $this->modifiedby = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 200, 45, -1, false, '`modifiedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifiedby->Sortable = true; // Allow sort
        $this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->modifiedby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifiedby->Param, "CustomMsg");
        $this->Fields['modifiedby'] = &$this->modifiedby;

        // modifieddatetime
        $this->modifieddatetime = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, false, '`modifieddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifieddatetime->Sortable = true; // Allow sort
        $this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->modifieddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifieddatetime->Param, "CustomMsg");
        $this->Fields['modifieddatetime'] = &$this->modifieddatetime;

        // PatID
        $this->PatID = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_PatID', 'PatID', '`PatID`', '`PatID`', 3, 11, -1, false, '`PatID`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->PatID->Required = true; // Required field
        $this->PatID->Sortable = true; // Allow sort
        $this->PatID->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->PatID->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->PatID->Lookup = new Lookup('PatID', 'patient', false, 'id', ["PatientID","first_name","mobile_no",""], [], [], [], [], ["first_name","mobile_no","PatientID","first_name"], ["x_Name","x_Mobile","x_PatientID","x_PatientName"], '`id` DESC', '');
        $this->PatID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->PatID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatID->Param, "CustomMsg");
        $this->Fields['PatID'] = &$this->PatID;

        // VisiteType
        $this->VisiteType = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_VisiteType', 'VisiteType', '`VisiteType`', '`VisiteType`', 200, 45, -1, false, '`VisiteType`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->VisiteType->Sortable = true; // Allow sort
        $this->VisiteType->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->VisiteType->Param, "CustomMsg");
        $this->Fields['VisiteType'] = &$this->VisiteType;

        // VisitDate
        $this->VisitDate = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_VisitDate', 'VisitDate', '`VisitDate`', CastDateFieldForLike("`VisitDate`", 0, "DB"), 135, 19, -1, false, '`VisitDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->VisitDate->Sortable = true; // Allow sort
        $this->VisitDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->VisitDate->Param, "CustomMsg");
        $this->Fields['VisitDate'] = &$this->VisitDate;

        // Status
        $this->Status = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_Status', 'Status', '`Status`', '`Status`', 200, 45, -1, false, '`Status`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Status->Sortable = true; // Allow sort
        $this->Status->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Status->Param, "CustomMsg");
        $this->Fields['Status'] = &$this->Status;

        // AdvanceValidityDate
        $this->AdvanceValidityDate = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_AdvanceValidityDate', 'AdvanceValidityDate', '`AdvanceValidityDate`', CastDateFieldForLike("`AdvanceValidityDate`", 0, "DB"), 135, 19, 0, false, '`AdvanceValidityDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AdvanceValidityDate->Sortable = true; // Allow sort
        $this->AdvanceValidityDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->AdvanceValidityDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AdvanceValidityDate->Param, "CustomMsg");
        $this->Fields['AdvanceValidityDate'] = &$this->AdvanceValidityDate;

        // TotalRemainingAdvance
        $this->TotalRemainingAdvance = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_TotalRemainingAdvance', 'TotalRemainingAdvance', '`TotalRemainingAdvance`', '`TotalRemainingAdvance`', 200, 45, -1, false, '`TotalRemainingAdvance`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TotalRemainingAdvance->Sortable = true; // Allow sort
        $this->TotalRemainingAdvance->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TotalRemainingAdvance->Param, "CustomMsg");
        $this->Fields['TotalRemainingAdvance'] = &$this->TotalRemainingAdvance;

        // Remarks
        $this->Remarks = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_Remarks', 'Remarks', '`Remarks`', '`Remarks`', 201, 405, -1, false, '`Remarks`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Remarks->Sortable = true; // Allow sort
        $this->Remarks->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Remarks->Param, "CustomMsg");
        $this->Fields['Remarks'] = &$this->Remarks;

        // SeectPaymentMode
        $this->SeectPaymentMode = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_SeectPaymentMode', 'SeectPaymentMode', '`SeectPaymentMode`', '`SeectPaymentMode`', 200, 45, -1, false, '`SeectPaymentMode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SeectPaymentMode->Sortable = true; // Allow sort
        $this->SeectPaymentMode->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SeectPaymentMode->Param, "CustomMsg");
        $this->Fields['SeectPaymentMode'] = &$this->SeectPaymentMode;

        // PaidAmount
        $this->PaidAmount = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_PaidAmount', 'PaidAmount', '`PaidAmount`', '`PaidAmount`', 200, 45, -1, false, '`PaidAmount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PaidAmount->Sortable = true; // Allow sort
        $this->PaidAmount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PaidAmount->Param, "CustomMsg");
        $this->Fields['PaidAmount'] = &$this->PaidAmount;

        // Currency
        $this->Currency = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_Currency', 'Currency', '`Currency`', '`Currency`', 200, 45, -1, false, '`Currency`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Currency->Sortable = true; // Allow sort
        $this->Currency->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Currency->Param, "CustomMsg");
        $this->Fields['Currency'] = &$this->Currency;

        // HospID
        $this->HospID = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->HospID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospID->Param, "CustomMsg");
        $this->Fields['HospID'] = &$this->HospID;

        // Reception
        $this->Reception = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_Reception', 'Reception', '`Reception`', '`Reception`', 3, 11, -1, false, '`Reception`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Reception->Sortable = true; // Allow sort
        $this->Reception->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Reception->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Reception->Param, "CustomMsg");
        $this->Fields['Reception'] = &$this->Reception;

        // mrnno
        $this->mrnno = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_mrnno', 'mrnno', '`mrnno`', '`mrnno`', 200, 45, -1, false, '`mrnno`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->mrnno->Sortable = true; // Allow sort
        $this->mrnno->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->mrnno->Param, "CustomMsg");
        $this->Fields['mrnno'] = &$this->mrnno;

        // GetUserName
        $this->GetUserName = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_GetUserName', 'GetUserName', '`GetUserName`', '`GetUserName`', 200, 45, -1, false, '`GetUserName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GetUserName->Sortable = true; // Allow sort
        $this->GetUserName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GetUserName->Param, "CustomMsg");
        $this->Fields['GetUserName'] = &$this->GetUserName;

        // AdjustmentwithAdvance
        $this->AdjustmentwithAdvance = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_AdjustmentwithAdvance', 'AdjustmentwithAdvance', '`AdjustmentwithAdvance`', '`AdjustmentwithAdvance`', 200, 45, -1, false, '`AdjustmentwithAdvance`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AdjustmentwithAdvance->Sortable = true; // Allow sort
        $this->AdjustmentwithAdvance->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AdjustmentwithAdvance->Param, "CustomMsg");
        $this->Fields['AdjustmentwithAdvance'] = &$this->AdjustmentwithAdvance;

        // AdjustmentBillNumber
        $this->AdjustmentBillNumber = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_AdjustmentBillNumber', 'AdjustmentBillNumber', '`AdjustmentBillNumber`', '`AdjustmentBillNumber`', 200, 45, -1, false, '`AdjustmentBillNumber`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AdjustmentBillNumber->Sortable = true; // Allow sort
        $this->AdjustmentBillNumber->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AdjustmentBillNumber->Param, "CustomMsg");
        $this->Fields['AdjustmentBillNumber'] = &$this->AdjustmentBillNumber;

        // CancelAdvance
        $this->CancelAdvance = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_CancelAdvance', 'CancelAdvance', '`CancelAdvance`', '`CancelAdvance`', 200, 45, -1, false, '`CancelAdvance`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->CancelAdvance->Sortable = true; // Allow sort
        $this->CancelAdvance->Lookup = new Lookup('CancelAdvance', 'billing_other_voucher', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->CancelAdvance->OptionCount = 1;
        $this->CancelAdvance->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CancelAdvance->Param, "CustomMsg");
        $this->Fields['CancelAdvance'] = &$this->CancelAdvance;

        // CancelReasan
        $this->CancelReasan = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_CancelReasan', 'CancelReasan', '`CancelReasan`', '`CancelReasan`', 201, 450, -1, false, '`CancelReasan`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->CancelReasan->Sortable = true; // Allow sort
        $this->CancelReasan->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CancelReasan->Param, "CustomMsg");
        $this->Fields['CancelReasan'] = &$this->CancelReasan;

        // CancelBy
        $this->CancelBy = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_CancelBy', 'CancelBy', '`CancelBy`', '`CancelBy`', 200, 45, -1, false, '`CancelBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CancelBy->Sortable = true; // Allow sort
        $this->CancelBy->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CancelBy->Param, "CustomMsg");
        $this->Fields['CancelBy'] = &$this->CancelBy;

        // CancelDate
        $this->CancelDate = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_CancelDate', 'CancelDate', '`CancelDate`', CastDateFieldForLike("`CancelDate`", 7, "DB"), 135, 19, 7, false, '`CancelDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CancelDate->Sortable = true; // Allow sort
        $this->CancelDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->CancelDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CancelDate->Param, "CustomMsg");
        $this->Fields['CancelDate'] = &$this->CancelDate;

        // CancelDateTime
        $this->CancelDateTime = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_CancelDateTime', 'CancelDateTime', '`CancelDateTime`', CastDateFieldForLike("`CancelDateTime`", 0, "DB"), 135, 19, 0, false, '`CancelDateTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CancelDateTime->Sortable = true; // Allow sort
        $this->CancelDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->CancelDateTime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CancelDateTime->Param, "CustomMsg");
        $this->Fields['CancelDateTime'] = &$this->CancelDateTime;

        // CanceledBy
        $this->CanceledBy = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_CanceledBy', 'CanceledBy', '`CanceledBy`', '`CanceledBy`', 200, 45, -1, false, '`CanceledBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CanceledBy->Sortable = true; // Allow sort
        $this->CanceledBy->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CanceledBy->Param, "CustomMsg");
        $this->Fields['CanceledBy'] = &$this->CanceledBy;

        // CancelStatus
        $this->CancelStatus = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_CancelStatus', 'CancelStatus', '`CancelStatus`', '`CancelStatus`', 200, 45, -1, false, '`CancelStatus`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->CancelStatus->Sortable = true; // Allow sort
        $this->CancelStatus->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->CancelStatus->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->CancelStatus->Lookup = new Lookup('CancelStatus', 'billing_other_voucher', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->CancelStatus->OptionCount = 3;
        $this->CancelStatus->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CancelStatus->Param, "CustomMsg");
        $this->Fields['CancelStatus'] = &$this->CancelStatus;

        // Cash
        $this->Cash = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_Cash', 'Cash', '`Cash`', '`Cash`', 131, 10, -1, false, '`Cash`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Cash->Sortable = true; // Allow sort
        $this->Cash->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Cash->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Cash->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Cash->Param, "CustomMsg");
        $this->Fields['Cash'] = &$this->Cash;

        // Card
        $this->Card = new DbField('billing_other_voucher', 'billing_other_voucher', 'x_Card', 'Card', '`Card`', '`Card`', 131, 10, -1, false, '`Card`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Card->Sortable = true; // Allow sort
        $this->Card->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Card->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Card->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Card->Param, "CustomMsg");
        $this->Fields['Card'] = &$this->Card;
    }

    // Field Visibility
    public function getFieldVisibility($fldParm)
    {
        global $Security;
        return $this->$fldParm->Visible; // Returns original value
    }

    // Set left column class (must be predefined col-*-* classes of Bootstrap grid system)
    public function setLeftColumnClass($class)
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
            if (in_array($this->CurrentOrderType, ["ASC", "DESC", "NO"])) {
                $curSort = $this->CurrentOrderType;
            } else {
                $curSort = $lastSort;
            }
            $fld->setSort($curSort);
            $orderBy = in_array($curSort, ["ASC", "DESC"]) ? $sortField . " " . $curSort : "";
            $this->setSessionOrderBy($orderBy); // Save to Session
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
        return $this->SqlSelect ?? $this->getQueryBuilder()->select("*");
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
        $this->DefaultFilter = "`HospID`='".HospitalID()."'  and  (freezed != 'Yes' or   freezed is null )  ";
        AddFilter($where, $this->DefaultFilter);
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
        return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : $this->DefaultSort;
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
            case "changepassword":
            case "resetpassword":
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

    /**
     * Get record count
     *
     * @param string|QueryBuilder $sql SQL or QueryBuilder
     * @param mixed $c Connection
     * @return int
     */
    public function getRecordCount($sql, $c = null)
    {
        $cnt = -1;
        $rs = null;
        if ($sql instanceof \Doctrine\DBAL\Query\QueryBuilder) { // Query builder
            $sqlwrk = clone $sql;
            $sqlwrk = $sqlwrk->resetQueryPart("orderBy")->getSQL();
        } else {
            $sqlwrk = $sql;
        }
        $pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';
        // Skip Custom View / SubQuery / SELECT DISTINCT / ORDER BY
        if (
            ($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
            preg_match($pattern, $sqlwrk) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sqlwrk) &&
            !preg_match('/^\s*select\s+distinct\s+/i', $sqlwrk) && !preg_match('/\s+order\s+by\s+/i', $sqlwrk)
        ) {
            $sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sqlwrk);
        } else {
            $sqlwrk = "SELECT COUNT(*) FROM (" . $sqlwrk . ") COUNT_TABLE";
        }
        $conn = $c ?? $this->getConnection();
        $rs = $conn->executeQuery($sqlwrk);
        $cnt = $rs->fetchColumn();
        if ($cnt !== false) {
            return (int)$cnt;
        }

        // Unable to get count by SELECT COUNT(*), execute the SQL to get record count directly
        return ExecuteRecordCount($sql, $conn);
    }

    // Get SQL
    public function getSql($where, $orderBy = "")
    {
        return $this->buildSelectSql(
            $this->getSqlSelect(),
            $this->getSqlFrom(),
            $this->getSqlWhere(),
            $this->getSqlGroupBy(),
            $this->getSqlHaving(),
            $this->getSqlOrderBy(),
            $where,
            $orderBy
        )->getSQL();
    }

    // Table SQL
    public function getCurrentSql()
    {
        $filter = $this->CurrentFilter;
        $filter = $this->applyUserIDFilters($filter);
        $sort = $this->getSessionOrderBy();
        return $this->getSql($filter, $sort);
    }

    /**
     * Table SQL with List page filter
     *
     * @return QueryBuilder
     */
    public function getListSql()
    {
        $filter = $this->UseSessionForListSql ? $this->getSessionWhere() : "";
        AddFilter($filter, $this->CurrentFilter);
        $filter = $this->applyUserIDFilters($filter);
        $this->recordsetSelecting($filter);
        $select = $this->getSqlSelect();
        $from = $this->getSqlFrom();
        $sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
        $this->Sort = $sort;
        return $this->buildSelectSql(
            $select,
            $from,
            $this->getSqlWhere(),
            $this->getSqlGroupBy(),
            $this->getSqlHaving(),
            $this->getSqlOrderBy(),
            $filter,
            $sort
        );
    }

    // Get ORDER BY clause
    public function getOrderBy()
    {
        $orderBy = $this->getSqlOrderBy();
        $sort = $this->getSessionOrderBy();
        if ($orderBy != "" && $sort != "") {
            $orderBy .= ", " . $sort;
        } elseif ($sort != "") {
            $orderBy = $sort;
        }
        return $orderBy;
    }

    // Get record count based on filter (for detail record count in master table pages)
    public function loadRecordCount($filter)
    {
        $origFilter = $this->CurrentFilter;
        $this->CurrentFilter = $filter;
        $this->recordsetSelecting($this->CurrentFilter);
        $select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : $this->getQueryBuilder()->select("*");
        $groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
        $having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
        $sql = $this->buildSelectSql($select, $this->getSqlFrom(), $this->getSqlWhere(), $groupBy, $having, "", $this->CurrentFilter, "");
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
        $this->recordsetSelecting($filter);
        $select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : $this->getQueryBuilder()->select("*");
        $groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
        $having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
        $sql = $this->buildSelectSql($select, $this->getSqlFrom(), $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
        $cnt = $this->getRecordCount($sql);
        return $cnt;
    }

    /**
     * INSERT statement
     *
     * @param mixed $rs
     * @return QueryBuilder
     */
    protected function insertSql(&$rs)
    {
        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->insert($this->UpdateTable);
        foreach ($rs as $name => $value) {
            if (!isset($this->Fields[$name]) || $this->Fields[$name]->IsCustom) {
                continue;
            }
            $type = GetParameterType($this->Fields[$name], $value, $this->Dbid);
            $queryBuilder->setValue($this->Fields[$name]->Expression, $queryBuilder->createPositionalParameter($value, $type));
        }
        return $queryBuilder;
    }

    // Insert
    public function insert(&$rs)
    {
        $conn = $this->getConnection();
        $success = $this->insertSql($rs)->execute();
        if ($success) {
            // Get insert id if necessary
            $this->id->setDbValue($conn->lastInsertId());
            $rs['id'] = $this->id->DbValue;
        }
        return $success;
    }

    /**
     * UPDATE statement
     *
     * @param array $rs Data to be updated
     * @param string|array $where WHERE clause
     * @param string $curfilter Filter
     * @return QueryBuilder
     */
    protected function updateSql(&$rs, $where = "", $curfilter = true)
    {
        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->update($this->UpdateTable);
        foreach ($rs as $name => $value) {
            if (!isset($this->Fields[$name]) || $this->Fields[$name]->IsCustom || $this->Fields[$name]->IsAutoIncrement) {
                continue;
            }
            $type = GetParameterType($this->Fields[$name], $value, $this->Dbid);
            $queryBuilder->set($this->Fields[$name]->Expression, $queryBuilder->createPositionalParameter($value, $type));
        }
        $filter = ($curfilter) ? $this->CurrentFilter : "";
        if (is_array($where)) {
            $where = $this->arrayToFilter($where);
        }
        AddFilter($filter, $where);
        if ($filter != "") {
            $queryBuilder->where($filter);
        }
        return $queryBuilder;
    }

    // Update
    public function update(&$rs, $where = "", $rsold = null, $curfilter = true)
    {
        // If no field is updated, execute may return 0. Treat as success
        $success = $this->updateSql($rs, $where, $curfilter)->execute();
        $success = ($success > 0) ? $success : true;
        return $success;
    }

    /**
     * DELETE statement
     *
     * @param array $rs Key values
     * @param string|array $where WHERE clause
     * @param string $curfilter Filter
     * @return QueryBuilder
     */
    protected function deleteSql(&$rs, $where = "", $curfilter = true)
    {
        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->delete($this->UpdateTable);
        if (is_array($where)) {
            $where = $this->arrayToFilter($where);
        }
        if ($rs) {
            if (array_key_exists('id', $rs)) {
                AddFilter($where, QuotedName('id', $this->Dbid) . '=' . QuotedValue($rs['id'], $this->id->DataType, $this->Dbid));
            }
        }
        $filter = ($curfilter) ? $this->CurrentFilter : "";
        AddFilter($filter, $where);
        return $queryBuilder->where($filter != "" ? $filter : "0=1");
    }

    // Delete
    public function delete(&$rs, $where = "", $curfilter = false)
    {
        $success = true;
        if ($success) {
            $success = $this->deleteSql($rs, $where, $curfilter)->execute();
        }
        return $success;
    }

    // Load DbValue from recordset or array
    protected function loadDbValues($row)
    {
        if (!is_array($row)) {
            return;
        }
        $this->id->DbValue = $row['id'];
        $this->freezed->DbValue = $row['freezed'];
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

    // Get Key
    public function getKey($current = false)
    {
        $keys = [];
        $val = $current ? $this->id->CurrentValue : $this->id->OldValue;
        if (EmptyValue($val)) {
            return "";
        } else {
            $keys[] = $val;
        }
        return implode(Config("COMPOSITE_KEY_SEPARATOR"), $keys);
    }

    // Set Key
    public function setKey($key, $current = false)
    {
        $this->OldKey = strval($key);
        $keys = explode(Config("COMPOSITE_KEY_SEPARATOR"), $this->OldKey);
        if (count($keys) == 1) {
            if ($current) {
                $this->id->CurrentValue = $keys[0];
            } else {
                $this->id->OldValue = $keys[0];
            }
        }
    }

    // Get record filter
    public function getRecordFilter($row = null)
    {
        $keyFilter = $this->sqlKeyFilter();
        if (is_array($row)) {
            $val = array_key_exists('id', $row) ? $row['id'] : null;
        } else {
            $val = $this->id->OldValue !== null ? $this->id->OldValue : $this->id->CurrentValue;
        }
        if (!is_numeric($val)) {
            return "0=1"; // Invalid key
        }
        if ($val === null) {
            return "0=1"; // Invalid key
        } else {
            $keyFilter = str_replace("@id@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
        }
        return $keyFilter;
    }

    // Return page URL
    public function getReturnUrl()
    {
        $referUrl = ReferUrl();
        $referPageName = ReferPageName();
        $name = PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL");
        // Get referer URL automatically
        if ($referUrl != "" && $referPageName != CurrentPageName() && $referPageName != "login") { // Referer not same page or login page
            $_SESSION[$name] = $referUrl; // Save to Session
        }
        return $_SESSION[$name] ?? GetUrl("BillingOtherVoucherList");
    }

    // Set return page URL
    public function setReturnUrl($v)
    {
        $_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL")] = $v;
    }

    // Get modal caption
    public function getModalCaption($pageName)
    {
        global $Language;
        if ($pageName == "BillingOtherVoucherView") {
            return $Language->phrase("View");
        } elseif ($pageName == "BillingOtherVoucherEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "BillingOtherVoucherAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // API page name
    public function getApiPageName($action)
    {
        switch (strtolower($action)) {
            case Config("API_VIEW_ACTION"):
                return "BillingOtherVoucherView";
            case Config("API_ADD_ACTION"):
                return "BillingOtherVoucherAdd";
            case Config("API_EDIT_ACTION"):
                return "BillingOtherVoucherEdit";
            case Config("API_DELETE_ACTION"):
                return "BillingOtherVoucherDelete";
            case Config("API_LIST_ACTION"):
                return "BillingOtherVoucherList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "BillingOtherVoucherList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("BillingOtherVoucherView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("BillingOtherVoucherView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "BillingOtherVoucherAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "BillingOtherVoucherAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("BillingOtherVoucherEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("BillingOtherVoucherAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("BillingOtherVoucherDelete", $this->getUrlParm());
    }

    // Add master url
    public function addMasterUrl($url)
    {
        return $url;
    }

    public function keyToJson($htmlEncode = false)
    {
        $json = "";
        $json .= "id:" . JsonEncode($this->id->CurrentValue, "number");
        $json = "{" . $json . "}";
        if ($htmlEncode) {
            $json = HtmlEncode($json);
        }
        return $json;
    }

    // Add key value to URL
    public function keyUrl($url, $parm = "")
    {
        if ($this->id->CurrentValue !== null) {
            $url .= "/" . rawurlencode($this->id->CurrentValue);
        } else {
            return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
        }
        if ($parm != "") {
            $url .= "?" . $parm;
        }
        return $url;
    }

    // Render sort
    public function renderSort($fld)
    {
        $classId = $fld->TableVar . "_" . $fld->Param;
        $scriptId = str_replace("%id%", $classId, "tpc_%id%");
        $scriptStart = $this->UseCustomTemplate ? "<template id=\"" . $scriptId . "\">" : "";
        $scriptEnd = $this->UseCustomTemplate ? "</template>" : "";
        $jsSort = " class=\"ew-pointer\" onclick=\"ew.sort(event, '" . $this->sortUrl($fld) . "', 1);\"";
        if ($this->sortUrl($fld) == "") {
            $html = <<<NOSORTHTML
{$scriptStart}<div class="ew-table-header-caption">{$fld->caption()}</div>{$scriptEnd}
NOSORTHTML;
        } else {
            if ($fld->getSort() == "ASC") {
                $sortIcon = '<i class="fas fa-sort-up"></i>';
            } elseif ($fld->getSort() == "DESC") {
                $sortIcon = '<i class="fas fa-sort-down"></i>';
            } else {
                $sortIcon = '';
            }
            $html = <<<SORTHTML
{$scriptStart}<div{$jsSort}><div class="ew-table-header-btn"><span class="ew-table-header-caption">{$fld->caption()}</span><span class="ew-table-header-sort">{$sortIcon}</span></div></div>{$scriptEnd}
SORTHTML;
        }
        return $html;
    }

    // Sort URL
    public function sortUrl($fld)
    {
        if (
            $this->CurrentAction || $this->isExport() ||
            in_array($fld->Type, [128, 204, 205])
        ) { // Unsortable data type
                return "";
        } elseif ($fld->Sortable) {
            $urlParm = $this->getUrlParm("order=" . urlencode($fld->Name) . "&amp;ordertype=" . $fld->getNextSort());
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
        if (Param("key_m") !== null) {
            $arKeys = Param("key_m");
            $cnt = count($arKeys);
        } else {
            if (($keyValue = Param("id") ?? Route("id")) !== null) {
                $arKeys[] = $keyValue;
            } elseif (IsApi() && (($keyValue = Key(0) ?? Route(2)) !== null)) {
                $arKeys[] = $keyValue;
            } else {
                $arKeys = null; // Do not setup
            }

            //return $arKeys; // Do not return yet, so the values will also be checked by the following code
        }
        // Check keys
        $ar = [];
        if (is_array($arKeys)) {
            foreach ($arKeys as $key) {
                if (!is_numeric($key)) {
                    continue;
                }
                $ar[] = $key;
            }
        }
        return $ar;
    }

    // Get filter from record keys
    public function getFilterFromRecordKeys($setCurrent = true)
    {
        $arKeys = $this->getRecordKeys();
        $keyFilter = "";
        foreach ($arKeys as $key) {
            if ($keyFilter != "") {
                $keyFilter .= " OR ";
            }
            if ($setCurrent) {
                $this->id->CurrentValue = $key;
            } else {
                $this->id->OldValue = $key;
            }
            $keyFilter .= "(" . $this->getRecordFilter() . ")";
        }
        return $keyFilter;
    }

    // Load recordset based on filter
    public function &loadRs($filter)
    {
        $sql = $this->getSql($filter); // Set up filter (WHERE Clause)
        $conn = $this->getConnection();
        $stmt = $conn->executeQuery($sql);
        return $stmt;
    }

    // Load row values from record
    public function loadListRowValues(&$rs)
    {
        if (is_array($rs)) {
            $row = $rs;
        } elseif ($rs && property_exists($rs, "fields")) { // Recordset
            $row = $rs->fields;
        } else {
            return;
        }
        $this->id->setDbValue($row['id']);
        $this->freezed->setDbValue($row['freezed']);
        $this->AdvanceNo->setDbValue($row['AdvanceNo']);
        $this->PatientID->setDbValue($row['PatientID']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->Mobile->setDbValue($row['Mobile']);
        $this->ModeofPayment->setDbValue($row['ModeofPayment']);
        $this->Amount->setDbValue($row['Amount']);
        $this->CardNumber->setDbValue($row['CardNumber']);
        $this->BankName->setDbValue($row['BankName']);
        $this->Name->setDbValue($row['Name']);
        $this->voucher_type->setDbValue($row['voucher_type']);
        $this->Details->setDbValue($row['Details']);
        $this->Date->setDbValue($row['Date']);
        $this->AnyDues->setDbValue($row['AnyDues']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->PatID->setDbValue($row['PatID']);
        $this->VisiteType->setDbValue($row['VisiteType']);
        $this->VisitDate->setDbValue($row['VisitDate']);
        $this->Status->setDbValue($row['Status']);
        $this->AdvanceValidityDate->setDbValue($row['AdvanceValidityDate']);
        $this->TotalRemainingAdvance->setDbValue($row['TotalRemainingAdvance']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->SeectPaymentMode->setDbValue($row['SeectPaymentMode']);
        $this->PaidAmount->setDbValue($row['PaidAmount']);
        $this->Currency->setDbValue($row['Currency']);
        $this->HospID->setDbValue($row['HospID']);
        $this->Reception->setDbValue($row['Reception']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->GetUserName->setDbValue($row['GetUserName']);
        $this->AdjustmentwithAdvance->setDbValue($row['AdjustmentwithAdvance']);
        $this->AdjustmentBillNumber->setDbValue($row['AdjustmentBillNumber']);
        $this->CancelAdvance->setDbValue($row['CancelAdvance']);
        $this->CancelReasan->setDbValue($row['CancelReasan']);
        $this->CancelBy->setDbValue($row['CancelBy']);
        $this->CancelDate->setDbValue($row['CancelDate']);
        $this->CancelDateTime->setDbValue($row['CancelDateTime']);
        $this->CanceledBy->setDbValue($row['CanceledBy']);
        $this->CancelStatus->setDbValue($row['CancelStatus']);
        $this->Cash->setDbValue($row['Cash']);
        $this->Card->setDbValue($row['Card']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // freezed
        $this->freezed->CellCssStyle = "white-space: nowrap;";

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

        // Cash

        // Card

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // freezed
        $this->freezed->ViewValue = $this->freezed->CurrentValue;
        $this->freezed->ViewCustomAttributes = "";

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
        $curVal = trim(strval($this->ModeofPayment->CurrentValue));
        if ($curVal != "") {
            $this->ModeofPayment->ViewValue = $this->ModeofPayment->lookupCacheOption($curVal);
            if ($this->ModeofPayment->ViewValue === null) { // Lookup from database
                $filterWrk = "`Mode`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->ModeofPayment->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->ModeofPayment->Lookup->renderViewRow($rswrk[0]);
                    $this->ModeofPayment->ViewValue = $this->ModeofPayment->displayValue($arwrk);
                } else {
                    $this->ModeofPayment->ViewValue = $this->ModeofPayment->CurrentValue;
                }
            }
        } else {
            $this->ModeofPayment->ViewValue = null;
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
        $curVal = trim(strval($this->PatID->CurrentValue));
        if ($curVal != "") {
            $this->PatID->ViewValue = $this->PatID->lookupCacheOption($curVal);
            if ($this->PatID->ViewValue === null) { // Lookup from database
                $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                $sqlWrk = $this->PatID->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->PatID->Lookup->renderViewRow($rswrk[0]);
                    $this->PatID->ViewValue = $this->PatID->displayValue($arwrk);
                } else {
                    $this->PatID->ViewValue = $this->PatID->CurrentValue;
                }
            }
        } else {
            $this->PatID->ViewValue = null;
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
            $this->CancelAdvance->ViewValue = null;
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
            $this->CancelStatus->ViewValue = null;
        }
        $this->CancelStatus->ViewCustomAttributes = "";

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

        // freezed
        $this->freezed->LinkCustomAttributes = "";
        $this->freezed->HrefValue = "";
        $this->freezed->TooltipValue = "";

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

        // Cash
        $this->Cash->LinkCustomAttributes = "";
        $this->Cash->HrefValue = "";
        $this->Cash->TooltipValue = "";

        // Card
        $this->Card->LinkCustomAttributes = "";
        $this->Card->HrefValue = "";
        $this->Card->TooltipValue = "";

        // Call Row Rendered event
        $this->rowRendered();

        // Save data for Custom Template
        $this->Rows[] = $this->customTemplateFieldValues();
    }

    // Render edit row values
    public function renderEditRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // id
        $this->id->EditAttrs["class"] = "form-control";
        $this->id->EditCustomAttributes = "";
        $this->id->EditValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // freezed
        $this->freezed->EditAttrs["class"] = "form-control";
        $this->freezed->EditCustomAttributes = "";
        if (!$this->freezed->Raw) {
            $this->freezed->CurrentValue = HtmlDecode($this->freezed->CurrentValue);
        }
        $this->freezed->EditValue = $this->freezed->CurrentValue;
        $this->freezed->PlaceHolder = RemoveHtml($this->freezed->caption());

        // AdvanceNo
        $this->AdvanceNo->EditAttrs["class"] = "form-control";
        $this->AdvanceNo->EditCustomAttributes = "";
        $this->AdvanceNo->EditValue = $this->AdvanceNo->CurrentValue;
        $this->AdvanceNo->ViewCustomAttributes = "";

        // PatientID
        $this->PatientID->EditAttrs["class"] = "form-control";
        $this->PatientID->EditCustomAttributes = "";
        if (!$this->PatientID->Raw) {
            $this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
        }
        $this->PatientID->EditValue = $this->PatientID->CurrentValue;
        $this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

        // PatientName
        $this->PatientName->EditAttrs["class"] = "form-control";
        $this->PatientName->EditCustomAttributes = "";
        if (!$this->PatientName->Raw) {
            $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
        }
        $this->PatientName->EditValue = $this->PatientName->CurrentValue;
        $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

        // Mobile
        $this->Mobile->EditAttrs["class"] = "form-control";
        $this->Mobile->EditCustomAttributes = "";
        if (!$this->Mobile->Raw) {
            $this->Mobile->CurrentValue = HtmlDecode($this->Mobile->CurrentValue);
        }
        $this->Mobile->EditValue = $this->Mobile->CurrentValue;
        $this->Mobile->PlaceHolder = RemoveHtml($this->Mobile->caption());

        // ModeofPayment
        $this->ModeofPayment->EditAttrs["class"] = "form-control";
        $this->ModeofPayment->EditCustomAttributes = "";
        $this->ModeofPayment->PlaceHolder = RemoveHtml($this->ModeofPayment->caption());

        // Amount
        $this->Amount->EditAttrs["class"] = "form-control";
        $this->Amount->EditCustomAttributes = "";
        $this->Amount->EditValue = $this->Amount->CurrentValue;
        $this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());
        if (strval($this->Amount->EditValue) != "" && is_numeric($this->Amount->EditValue)) {
            $this->Amount->EditValue = FormatNumber($this->Amount->EditValue, -2, -2, -2, -2);
        }

        // CardNumber
        $this->CardNumber->EditAttrs["class"] = "form-control";
        $this->CardNumber->EditCustomAttributes = "";
        if (!$this->CardNumber->Raw) {
            $this->CardNumber->CurrentValue = HtmlDecode($this->CardNumber->CurrentValue);
        }
        $this->CardNumber->EditValue = $this->CardNumber->CurrentValue;
        $this->CardNumber->PlaceHolder = RemoveHtml($this->CardNumber->caption());

        // BankName
        $this->BankName->EditAttrs["class"] = "form-control";
        $this->BankName->EditCustomAttributes = "";
        if (!$this->BankName->Raw) {
            $this->BankName->CurrentValue = HtmlDecode($this->BankName->CurrentValue);
        }
        $this->BankName->EditValue = $this->BankName->CurrentValue;
        $this->BankName->PlaceHolder = RemoveHtml($this->BankName->caption());

        // Name
        $this->Name->EditAttrs["class"] = "form-control";
        $this->Name->EditCustomAttributes = "";
        if (!$this->Name->Raw) {
            $this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
        }
        $this->Name->EditValue = $this->Name->CurrentValue;
        $this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

        // voucher_type
        $this->voucher_type->EditAttrs["class"] = "form-control";
        $this->voucher_type->EditCustomAttributes = "";
        if (!$this->voucher_type->Raw) {
            $this->voucher_type->CurrentValue = HtmlDecode($this->voucher_type->CurrentValue);
        }
        $this->voucher_type->EditValue = $this->voucher_type->CurrentValue;
        $this->voucher_type->PlaceHolder = RemoveHtml($this->voucher_type->caption());

        // Details
        $this->Details->EditAttrs["class"] = "form-control";
        $this->Details->EditCustomAttributes = "";
        if (!$this->Details->Raw) {
            $this->Details->CurrentValue = HtmlDecode($this->Details->CurrentValue);
        }
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
        if (!$this->AnyDues->Raw) {
            $this->AnyDues->CurrentValue = HtmlDecode($this->AnyDues->CurrentValue);
        }
        $this->AnyDues->EditValue = $this->AnyDues->CurrentValue;
        $this->AnyDues->PlaceHolder = RemoveHtml($this->AnyDues->caption());

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // PatID
        $this->PatID->EditAttrs["class"] = "form-control";
        $this->PatID->EditCustomAttributes = "";
        $this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

        // VisiteType
        $this->VisiteType->EditAttrs["class"] = "form-control";
        $this->VisiteType->EditCustomAttributes = "";
        if (!$this->VisiteType->Raw) {
            $this->VisiteType->CurrentValue = HtmlDecode($this->VisiteType->CurrentValue);
        }
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
        if (!$this->Status->Raw) {
            $this->Status->CurrentValue = HtmlDecode($this->Status->CurrentValue);
        }
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
        if (!$this->TotalRemainingAdvance->Raw) {
            $this->TotalRemainingAdvance->CurrentValue = HtmlDecode($this->TotalRemainingAdvance->CurrentValue);
        }
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
        if (!$this->SeectPaymentMode->Raw) {
            $this->SeectPaymentMode->CurrentValue = HtmlDecode($this->SeectPaymentMode->CurrentValue);
        }
        $this->SeectPaymentMode->EditValue = $this->SeectPaymentMode->CurrentValue;
        $this->SeectPaymentMode->PlaceHolder = RemoveHtml($this->SeectPaymentMode->caption());

        // PaidAmount
        $this->PaidAmount->EditAttrs["class"] = "form-control";
        $this->PaidAmount->EditCustomAttributes = "";
        if (!$this->PaidAmount->Raw) {
            $this->PaidAmount->CurrentValue = HtmlDecode($this->PaidAmount->CurrentValue);
        }
        $this->PaidAmount->EditValue = $this->PaidAmount->CurrentValue;
        $this->PaidAmount->PlaceHolder = RemoveHtml($this->PaidAmount->caption());

        // Currency
        $this->Currency->EditAttrs["class"] = "form-control";
        $this->Currency->EditCustomAttributes = "";
        if (!$this->Currency->Raw) {
            $this->Currency->CurrentValue = HtmlDecode($this->Currency->CurrentValue);
        }
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
        if (!$this->mrnno->Raw) {
            $this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
        }
        $this->mrnno->EditValue = $this->mrnno->CurrentValue;
        $this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

        // GetUserName

        // AdjustmentwithAdvance
        $this->AdjustmentwithAdvance->EditAttrs["class"] = "form-control";
        $this->AdjustmentwithAdvance->EditCustomAttributes = "";
        if (!$this->AdjustmentwithAdvance->Raw) {
            $this->AdjustmentwithAdvance->CurrentValue = HtmlDecode($this->AdjustmentwithAdvance->CurrentValue);
        }
        $this->AdjustmentwithAdvance->EditValue = $this->AdjustmentwithAdvance->CurrentValue;
        $this->AdjustmentwithAdvance->PlaceHolder = RemoveHtml($this->AdjustmentwithAdvance->caption());

        // AdjustmentBillNumber
        $this->AdjustmentBillNumber->EditAttrs["class"] = "form-control";
        $this->AdjustmentBillNumber->EditCustomAttributes = "";
        if (!$this->AdjustmentBillNumber->Raw) {
            $this->AdjustmentBillNumber->CurrentValue = HtmlDecode($this->AdjustmentBillNumber->CurrentValue);
        }
        $this->AdjustmentBillNumber->EditValue = $this->AdjustmentBillNumber->CurrentValue;
        $this->AdjustmentBillNumber->PlaceHolder = RemoveHtml($this->AdjustmentBillNumber->caption());

        // CancelAdvance
        $this->CancelAdvance->EditCustomAttributes = "";
        $this->CancelAdvance->EditValue = $this->CancelAdvance->options(false);
        $this->CancelAdvance->PlaceHolder = RemoveHtml($this->CancelAdvance->caption());

        // CancelReasan
        $this->CancelReasan->EditAttrs["class"] = "form-control";
        $this->CancelReasan->EditCustomAttributes = "";
        $this->CancelReasan->EditValue = $this->CancelReasan->CurrentValue;
        $this->CancelReasan->PlaceHolder = RemoveHtml($this->CancelReasan->caption());

        // CancelBy
        $this->CancelBy->EditAttrs["class"] = "form-control";
        $this->CancelBy->EditCustomAttributes = "";
        if (!$this->CancelBy->Raw) {
            $this->CancelBy->CurrentValue = HtmlDecode($this->CancelBy->CurrentValue);
        }
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
        if (!$this->CanceledBy->Raw) {
            $this->CanceledBy->CurrentValue = HtmlDecode($this->CanceledBy->CurrentValue);
        }
        $this->CanceledBy->EditValue = $this->CanceledBy->CurrentValue;
        $this->CanceledBy->PlaceHolder = RemoveHtml($this->CanceledBy->caption());

        // CancelStatus
        $this->CancelStatus->EditAttrs["class"] = "form-control";
        $this->CancelStatus->EditCustomAttributes = "";
        $this->CancelStatus->EditValue = $this->CancelStatus->options(true);
        $this->CancelStatus->PlaceHolder = RemoveHtml($this->CancelStatus->caption());

        // Cash
        $this->Cash->EditAttrs["class"] = "form-control";
        $this->Cash->EditCustomAttributes = "";
        $this->Cash->EditValue = $this->Cash->CurrentValue;
        $this->Cash->PlaceHolder = RemoveHtml($this->Cash->caption());
        if (strval($this->Cash->EditValue) != "" && is_numeric($this->Cash->EditValue)) {
            $this->Cash->EditValue = FormatNumber($this->Cash->EditValue, -2, -2, -2, -2);
        }

        // Card
        $this->Card->EditAttrs["class"] = "form-control";
        $this->Card->EditCustomAttributes = "";
        $this->Card->EditValue = $this->Card->CurrentValue;
        $this->Card->PlaceHolder = RemoveHtml($this->Card->caption());
        if (strval($this->Card->EditValue) != "" && is_numeric($this->Card->EditValue)) {
            $this->Card->EditValue = FormatNumber($this->Card->EditValue, -2, -2, -2, -2);
        }

        // Call Row Rendered event
        $this->rowRendered();
    }

    // Aggregate list row values
    public function aggregateListRowValues()
    {
    }

    // Aggregate list row (for rendering)
    public function aggregateListRow()
    {
        // Call Row Rendered event
        $this->rowRendered();
    }

    // Export data in HTML/CSV/Word/Excel/Email/PDF format
    public function exportDocument($doc, $recordset, $startRec = 1, $stopRec = 1, $exportPageType = "")
    {
        if (!$recordset || !$doc) {
            return;
        }
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
                    $doc->exportCaption($this->Cash);
                    $doc->exportCaption($this->Card);
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
                    $doc->exportCaption($this->Cash);
                    $doc->exportCaption($this->Card);
                }
                $doc->endExportRow();
            }
        }

        // Move to first record
        $recCnt = $startRec - 1;
        $stopRec = ($stopRec > 0) ? $stopRec : PHP_INT_MAX;
        while (!$recordset->EOF && $recCnt < $stopRec) {
            $row = $recordset->fields;
            $recCnt++;
            if ($recCnt >= $startRec) {
                $rowCnt = $recCnt - $startRec + 1;

                // Page break
                if ($this->ExportPageBreakCount > 0) {
                    if ($rowCnt > 1 && ($rowCnt - 1) % $this->ExportPageBreakCount == 0) {
                        $doc->exportPageBreak();
                    }
                }
                $this->loadListRowValues($row);

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
                        $doc->exportField($this->Cash);
                        $doc->exportField($this->Card);
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
                        $doc->exportField($this->Cash);
                        $doc->exportField($this->Card);
                    }
                    $doc->endExportRow($rowCnt);
                }
            }

            // Call Row Export server event
            if ($doc->ExportCustom) {
                $this->rowExport($row);
            }
            $recordset->moveNext();
        }
        if (!$doc->ExportCustom) {
            $doc->exportTableFooter();
        }
    }

    // Get file data
    public function getFileData($fldparm, $key, $resize, $width = 0, $height = 0, $plugins = [])
    {
        // No binary fields
        return false;
    }

    // Table level events
    // Recordset Selecting event
    public function recordsetSelecting(&$filter) {
    	// Enter your code here
    		$a = &$filter;
    	if ($filter == "") {
    		$datetime = date('Y-m-d', strtotime(' +1 day'));
    		AddFilter($filter, "createddatetime between '".date('Y-m-d')." 00:00:00' and '".$datetime." 00:00:00' ");
    	}
    }

    // Recordset Selected event
    public function recordsetSelected(&$rs)
    {
        //Log("Recordset Selected");
    }

    // Recordset Search Validated event
    public function recordsetSearchValidated()
    {
        // Example:
        //$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value
    }

    // Recordset Searching event
    public function recordsetSearching(&$filter)
    {
        // Enter your code here
    }

    // Row_Selecting event
    public function rowSelecting(&$filter)
    {
        // Enter your code here
    }

    // Row Selected event
    public function rowSelected(&$rs)
    {
        //Log("Row Selected");
    }

    // Row Inserting event
    public function rowInserting($rsold, &$rsnew) {
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
    public function rowInserted($rsold, &$rsnew)
    {
        //Log("Row Inserted");
    }

    // Row Updating event
    public function rowUpdating($rsold, &$rsnew) {
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
    public function rowUpdated($rsold, &$rsnew)
    {
        //Log("Row Updated");
    }

    // Row Update Conflict event
    public function rowUpdateConflict($rsold, &$rsnew)
    {
        // Enter your code here
        // To ignore conflict, set return value to false
        return true;
    }

    // Grid Inserting event
    public function gridInserting()
    {
        // Enter your code here
        // To reject grid insert, set return value to false
        return true;
    }

    // Grid Inserted event
    public function gridInserted($rsnew)
    {
        //Log("Grid Inserted");
    }

    // Grid Updating event
    public function gridUpdating($rsold)
    {
        // Enter your code here
        // To reject grid update, set return value to false
        return true;
    }

    // Grid Updated event
    public function gridUpdated($rsold, $rsnew)
    {
        //Log("Grid Updated");
    }

    // Row Deleting event
    public function rowDeleting(&$rs)
    {
        // Enter your code here
        // To cancel, set return value to False
        return true;
    }

    // Row Deleted event
    public function rowDeleted(&$rs)
    {
        //Log("Row Deleted");
    }

    // Email Sending event
    public function emailSending($email, &$args)
    {
        //var_dump($email); var_dump($args); exit();
        return true;
    }

    // Lookup Selecting event
    public function lookupSelecting($fld, &$filter)
    {
        //var_dump($fld->Name, $fld->Lookup, $filter); // Uncomment to view the filter
        // Enter your code here
    }

    // Row Rendering event
    public function rowRendering()
    {
        // Enter your code here
    }

    // Row Rendered event
    public function rowRendered()
    {
        // To view properties of field class, use:
        //var_dump($this-><FieldName>);
    }

    // User ID Filtering event
    public function userIdFiltering(&$filter)
    {
        // Enter your code here
    }
}
