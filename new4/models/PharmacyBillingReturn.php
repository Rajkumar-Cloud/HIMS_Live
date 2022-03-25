<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for pharmacy_billing_return
 */
class PharmacyBillingReturn extends DbTable
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
    public $Reception;
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
    public $PatId;
    public $DrDepartment;
    public $RefferedBy;
    public $BillNumber;
    public $CardNumber;
    public $BankName;
    public $DrID;
    public $BillStatus;
    public $ReportHeader;
    public $PharID;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'pharmacy_billing_return';
        $this->TableName = 'pharmacy_billing_return';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`pharmacy_billing_return`";
        $this->Dbid = 'DB';
        $this->ExportAll = true;
        $this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
        $this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
        $this->ExportPageSize = "a4"; // Page size (PDF only)
        $this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
        $this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
        $this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
        $this->ExportWordColumnWidth = null; // Cell width (PHPWord only)
        $this->DetailAdd = true; // Allow detail add
        $this->DetailEdit = true; // Allow detail edit
        $this->DetailView = true; // Allow detail view
        $this->ShowMultipleDetails = false; // Show multiple details
        $this->GridAddRowCount = 5;
        $this->AllowAddDeleteRow = true; // Allow add/delete row
        $this->UserIDAllowSecurity = Config("DEFAULT_USER_ID_ALLOW_SECURITY"); // Default User ID allowed permissions
        $this->BasicSearch = new BasicSearch($this->TableVar);

        // id
        $this->id = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->IsForeignKey = true; // Foreign key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // Reception
        $this->Reception = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_Reception', 'Reception', '`Reception`', '`Reception`', 3, 11, -1, false, '`Reception`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Reception->Sortable = true; // Allow sort
        $this->Reception->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Reception->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Reception->Lookup = new Lookup('Reception', 'ip_admission', false, 'id', ["patient_id","patient_name","mobileno",""], [], [], [], [], [], [], '', '');
        $this->Reception->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Reception->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Reception->Param, "CustomMsg");
        $this->Fields['Reception'] = &$this->Reception;

        // PatientId
        $this->PatientId = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_PatientId', 'PatientId', '`PatientId`', '`PatientId`', 200, 45, -1, false, '`PatientId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientId->Sortable = true; // Allow sort
        $this->PatientId->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientId->Param, "CustomMsg");
        $this->Fields['PatientId'] = &$this->PatientId;

        // mrnno
        $this->mrnno = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_mrnno', 'mrnno', '`mrnno`', '`mrnno`', 200, 45, -1, false, '`mrnno`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->mrnno->Sortable = true; // Allow sort
        $this->mrnno->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->mrnno->Param, "CustomMsg");
        $this->Fields['mrnno'] = &$this->mrnno;

        // PatientName
        $this->PatientName = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, false, '`PatientName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientName->Sortable = true; // Allow sort
        $this->PatientName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientName->Param, "CustomMsg");
        $this->Fields['PatientName'] = &$this->PatientName;

        // Age
        $this->Age = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_Age', 'Age', '`Age`', '`Age`', 200, 45, -1, false, '`Age`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Age->Sortable = true; // Allow sort
        $this->Age->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Age->Param, "CustomMsg");
        $this->Fields['Age'] = &$this->Age;

        // Gender
        $this->Gender = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_Gender', 'Gender', '`Gender`', '`Gender`', 200, 45, -1, false, '`Gender`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Gender->Sortable = true; // Allow sort
        $this->Gender->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Gender->Param, "CustomMsg");
        $this->Fields['Gender'] = &$this->Gender;

        // profilePic
        $this->profilePic = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_profilePic', 'profilePic', '`profilePic`', '`profilePic`', 201, 450, -1, false, '`profilePic`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->profilePic->Sortable = true; // Allow sort
        $this->profilePic->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->profilePic->Param, "CustomMsg");
        $this->Fields['profilePic'] = &$this->profilePic;

        // Mobile
        $this->Mobile = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_Mobile', 'Mobile', '`Mobile`', '`Mobile`', 200, 45, -1, false, '`Mobile`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Mobile->Sortable = true; // Allow sort
        $this->Mobile->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Mobile->Param, "CustomMsg");
        $this->Fields['Mobile'] = &$this->Mobile;

        // IP_OP
        $this->IP_OP = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_IP_OP', 'IP_OP', '`IP_OP`', '`IP_OP`', 200, 45, -1, false, '`IP_OP`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IP_OP->Sortable = true; // Allow sort
        $this->IP_OP->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IP_OP->Param, "CustomMsg");
        $this->Fields['IP_OP'] = &$this->IP_OP;

        // Doctor
        $this->Doctor = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_Doctor', 'Doctor', '`Doctor`', '`Doctor`', 200, 45, -1, false, '`Doctor`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Doctor->Sortable = true; // Allow sort
        $this->Doctor->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Doctor->Param, "CustomMsg");
        $this->Fields['Doctor'] = &$this->Doctor;

        // voucher_type
        $this->voucher_type = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_voucher_type', 'voucher_type', '`voucher_type`', '`voucher_type`', 200, 45, -1, false, '`voucher_type`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->voucher_type->Sortable = true; // Allow sort
        $this->voucher_type->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->voucher_type->Param, "CustomMsg");
        $this->Fields['voucher_type'] = &$this->voucher_type;

        // Details
        $this->Details = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_Details', 'Details', '`Details`', '`Details`', 200, 45, -1, false, '`Details`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Details->Sortable = true; // Allow sort
        $this->Details->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Details->Param, "CustomMsg");
        $this->Fields['Details'] = &$this->Details;

        // ModeofPayment
        $this->ModeofPayment = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_ModeofPayment', 'ModeofPayment', '`ModeofPayment`', '`ModeofPayment`', 200, 45, -1, false, '`ModeofPayment`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->ModeofPayment->Required = true; // Required field
        $this->ModeofPayment->Sortable = true; // Allow sort
        $this->ModeofPayment->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->ModeofPayment->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->ModeofPayment->Lookup = new Lookup('ModeofPayment', 'mas_modepayment', false, 'Mode', ["Mode","","",""], [], [], [], [], [], [], '', '');
        $this->ModeofPayment->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ModeofPayment->Param, "CustomMsg");
        $this->Fields['ModeofPayment'] = &$this->ModeofPayment;

        // Amount
        $this->Amount = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_Amount', 'Amount', '`Amount`', '`Amount`', 131, 10, -1, false, '`Amount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Amount->Sortable = true; // Allow sort
        $this->Amount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Amount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Amount->Param, "CustomMsg");
        $this->Fields['Amount'] = &$this->Amount;

        // AnyDues
        $this->AnyDues = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_AnyDues', 'AnyDues', '`AnyDues`', '`AnyDues`', 200, 45, -1, false, '`AnyDues`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AnyDues->Sortable = true; // Allow sort
        $this->AnyDues->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AnyDues->Param, "CustomMsg");
        $this->Fields['AnyDues'] = &$this->AnyDues;

        // createdby
        $this->createdby = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 200, 45, -1, false, '`createdby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdby->Sortable = true; // Allow sort
        $this->createdby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createdby->Param, "CustomMsg");
        $this->Fields['createdby'] = &$this->createdby;

        // createddatetime
        $this->createddatetime = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 7, "DB"), 135, 19, 7, false, '`createddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddatetime->Sortable = true; // Allow sort
        $this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->createddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createddatetime->Param, "CustomMsg");
        $this->Fields['createddatetime'] = &$this->createddatetime;

        // modifiedby
        $this->modifiedby = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 200, 45, -1, false, '`modifiedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifiedby->Sortable = true; // Allow sort
        $this->modifiedby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifiedby->Param, "CustomMsg");
        $this->Fields['modifiedby'] = &$this->modifiedby;

        // modifieddatetime
        $this->modifieddatetime = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, false, '`modifieddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifieddatetime->Sortable = true; // Allow sort
        $this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->modifieddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifieddatetime->Param, "CustomMsg");
        $this->Fields['modifieddatetime'] = &$this->modifieddatetime;

        // RealizationAmount
        $this->RealizationAmount = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_RealizationAmount', 'RealizationAmount', '`RealizationAmount`', '`RealizationAmount`', 131, 10, -1, false, '`RealizationAmount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RealizationAmount->Sortable = true; // Allow sort
        $this->RealizationAmount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->RealizationAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->RealizationAmount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RealizationAmount->Param, "CustomMsg");
        $this->Fields['RealizationAmount'] = &$this->RealizationAmount;

        // RealizationStatus
        $this->RealizationStatus = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_RealizationStatus', 'RealizationStatus', '`RealizationStatus`', '`RealizationStatus`', 200, 45, -1, false, '`RealizationStatus`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RealizationStatus->Sortable = true; // Allow sort
        $this->RealizationStatus->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RealizationStatus->Param, "CustomMsg");
        $this->Fields['RealizationStatus'] = &$this->RealizationStatus;

        // RealizationRemarks
        $this->RealizationRemarks = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_RealizationRemarks', 'RealizationRemarks', '`RealizationRemarks`', '`RealizationRemarks`', 200, 45, -1, false, '`RealizationRemarks`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RealizationRemarks->Sortable = true; // Allow sort
        $this->RealizationRemarks->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RealizationRemarks->Param, "CustomMsg");
        $this->Fields['RealizationRemarks'] = &$this->RealizationRemarks;

        // RealizationBatchNo
        $this->RealizationBatchNo = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_RealizationBatchNo', 'RealizationBatchNo', '`RealizationBatchNo`', '`RealizationBatchNo`', 200, 45, -1, false, '`RealizationBatchNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RealizationBatchNo->Sortable = true; // Allow sort
        $this->RealizationBatchNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RealizationBatchNo->Param, "CustomMsg");
        $this->Fields['RealizationBatchNo'] = &$this->RealizationBatchNo;

        // RealizationDate
        $this->RealizationDate = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_RealizationDate', 'RealizationDate', '`RealizationDate`', '`RealizationDate`', 200, 45, -1, false, '`RealizationDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RealizationDate->Sortable = true; // Allow sort
        $this->RealizationDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RealizationDate->Param, "CustomMsg");
        $this->Fields['RealizationDate'] = &$this->RealizationDate;

        // HospID
        $this->HospID = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->HospID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospID->Param, "CustomMsg");
        $this->Fields['HospID'] = &$this->HospID;

        // RIDNO
        $this->RIDNO = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_RIDNO', 'RIDNO', '`RIDNO`', '`RIDNO`', 3, 11, -1, false, '`RIDNO`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->RIDNO->Sortable = true; // Allow sort
        $this->RIDNO->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->RIDNO->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->RIDNO->Lookup = new Lookup('RIDNO', 'ip_admission', false, 'id', ["PatientID","patient_name","mobileno","mrnNo"], [], [], [], [], [], [], '`id` DESC', '');
        $this->RIDNO->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->RIDNO->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RIDNO->Param, "CustomMsg");
        $this->Fields['RIDNO'] = &$this->RIDNO;

        // TidNo
        $this->TidNo = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_TidNo', 'TidNo', '`TidNo`', '`TidNo`', 3, 11, -1, false, '`TidNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TidNo->Sortable = true; // Allow sort
        $this->TidNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->TidNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TidNo->Param, "CustomMsg");
        $this->Fields['TidNo'] = &$this->TidNo;

        // CId
        $this->CId = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_CId', 'CId', '`CId`', '`CId`', 3, 11, -1, false, '`CId`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->CId->Sortable = false; // Allow sort
        $this->CId->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->CId->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->CId->Lookup = new Lookup('CId', 'ivf', false, 'id', ["PatientID","PatientName","PartnerName","CoupleID"], [], [], [], [], ["PatientID","PatientName","PartnerName"], ["x_PatientId","x_PatientName","x_PartnerName"], '`id` DESC', '');
        $this->CId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->CId->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CId->Param, "CustomMsg");
        $this->Fields['CId'] = &$this->CId;

        // PartnerName
        $this->PartnerName = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_PartnerName', 'PartnerName', '`PartnerName`', '`PartnerName`', 200, 45, -1, false, '`PartnerName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PartnerName->Sortable = true; // Allow sort
        $this->PartnerName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PartnerName->Param, "CustomMsg");
        $this->Fields['PartnerName'] = &$this->PartnerName;

        // PayerType
        $this->PayerType = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_PayerType', 'PayerType', '`PayerType`', '`PayerType`', 200, 45, -1, false, '`PayerType`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PayerType->Sortable = true; // Allow sort
        $this->PayerType->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PayerType->Param, "CustomMsg");
        $this->Fields['PayerType'] = &$this->PayerType;

        // Dob
        $this->Dob = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_Dob', 'Dob', '`Dob`', '`Dob`', 200, 45, -1, false, '`Dob`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Dob->Sortable = true; // Allow sort
        $this->Dob->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Dob->Param, "CustomMsg");
        $this->Fields['Dob'] = &$this->Dob;

        // Currency
        $this->Currency = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_Currency', 'Currency', '`Currency`', '`Currency`', 200, 45, -1, false, '`Currency`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Currency->Sortable = true; // Allow sort
        $this->Currency->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Currency->Param, "CustomMsg");
        $this->Fields['Currency'] = &$this->Currency;

        // DiscountRemarks
        $this->DiscountRemarks = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_DiscountRemarks', 'DiscountRemarks', '`DiscountRemarks`', '`DiscountRemarks`', 200, 45, -1, false, '`DiscountRemarks`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DiscountRemarks->Sortable = true; // Allow sort
        $this->DiscountRemarks->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DiscountRemarks->Param, "CustomMsg");
        $this->Fields['DiscountRemarks'] = &$this->DiscountRemarks;

        // Remarks
        $this->Remarks = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_Remarks', 'Remarks', '`Remarks`', '`Remarks`', 200, 45, -1, false, '`Remarks`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Remarks->Sortable = true; // Allow sort
        $this->Remarks->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Remarks->Param, "CustomMsg");
        $this->Fields['Remarks'] = &$this->Remarks;

        // PatId
        $this->PatId = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_PatId', 'PatId', '`PatId`', '`PatId`', 3, 11, -1, false, '`PatId`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->PatId->Sortable = true; // Allow sort
        $this->PatId->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->PatId->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->PatId->Lookup = new Lookup('PatId', 'patient', false, 'id', ["PatientID","first_name","mobile_no",""], [], [], [], [], ["PatientID","first_name","Age","gender","mobile_no","ReferedByDr"], ["x_PatientId","x_PatientName","x_Age","x_Gender","x_Mobile","x_RefferedBy"], '`id` DESC', '');
        $this->PatId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->PatId->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatId->Param, "CustomMsg");
        $this->Fields['PatId'] = &$this->PatId;

        // DrDepartment
        $this->DrDepartment = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_DrDepartment', 'DrDepartment', '`DrDepartment`', '`DrDepartment`', 200, 45, -1, false, '`DrDepartment`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DrDepartment->Sortable = true; // Allow sort
        $this->DrDepartment->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DrDepartment->Param, "CustomMsg");
        $this->Fields['DrDepartment'] = &$this->DrDepartment;

        // RefferedBy
        $this->RefferedBy = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_RefferedBy', 'RefferedBy', '`RefferedBy`', '`RefferedBy`', 200, 45, -1, false, '`RefferedBy`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->RefferedBy->Sortable = true; // Allow sort
        $this->RefferedBy->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->RefferedBy->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->RefferedBy->Lookup = new Lookup('RefferedBy', 'mas_reference_type', false, 'reference', ["reference","ReferMobileNo","ReferClinicname","ReferCity"], [], [], [], [], [], [], '`id` DESC', '');
        $this->RefferedBy->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RefferedBy->Param, "CustomMsg");
        $this->Fields['RefferedBy'] = &$this->RefferedBy;

        // BillNumber
        $this->BillNumber = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_BillNumber', 'BillNumber', '`BillNumber`', '`BillNumber`', 200, 45, -1, false, '`BillNumber`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BillNumber->Sortable = true; // Allow sort
        $this->BillNumber->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BillNumber->Param, "CustomMsg");
        $this->Fields['BillNumber'] = &$this->BillNumber;

        // CardNumber
        $this->CardNumber = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_CardNumber', 'CardNumber', '`CardNumber`', '`CardNumber`', 200, 45, -1, false, '`CardNumber`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CardNumber->Sortable = true; // Allow sort
        $this->CardNumber->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CardNumber->Param, "CustomMsg");
        $this->Fields['CardNumber'] = &$this->CardNumber;

        // BankName
        $this->BankName = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_BankName', 'BankName', '`BankName`', '`BankName`', 200, 45, -1, false, '`BankName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BankName->Sortable = true; // Allow sort
        $this->BankName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BankName->Param, "CustomMsg");
        $this->Fields['BankName'] = &$this->BankName;

        // DrID
        $this->DrID = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_DrID', 'DrID', '`DrID`', '`DrID`', 3, 11, -1, false, '`DrID`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->DrID->Sortable = true; // Allow sort
        $this->DrID->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->DrID->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->DrID->Lookup = new Lookup('DrID', 'doctors', false, 'id', ["CODE","NAME","DEPARTMENT",""], [], [], [], [], ["NAME","DEPARTMENT"], ["x_Doctor","x_DrDepartment"], '', '');
        $this->DrID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->DrID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DrID->Param, "CustomMsg");
        $this->Fields['DrID'] = &$this->DrID;

        // BillStatus
        $this->BillStatus = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_BillStatus', 'BillStatus', '`BillStatus`', '`BillStatus`', 3, 11, -1, false, '`BillStatus`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BillStatus->Sortable = true; // Allow sort
        $this->BillStatus->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->BillStatus->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BillStatus->Param, "CustomMsg");
        $this->Fields['BillStatus'] = &$this->BillStatus;

        // ReportHeader
        $this->ReportHeader = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_ReportHeader', 'ReportHeader', '`ReportHeader`', '`ReportHeader`', 200, 45, -1, false, '`ReportHeader`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->ReportHeader->Sortable = true; // Allow sort
        $this->ReportHeader->Lookup = new Lookup('ReportHeader', 'pharmacy_billing_return', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->ReportHeader->OptionCount = 1;
        $this->ReportHeader->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ReportHeader->Param, "CustomMsg");
        $this->Fields['ReportHeader'] = &$this->ReportHeader;

        // PharID
        $this->PharID = new DbField('pharmacy_billing_return', 'pharmacy_billing_return', 'x_PharID', 'PharID', '`PharID`', '`PharID`', 3, 11, -1, false, '`PharID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PharID->Sortable = true; // Allow sort
        $this->PharID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->PharID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PharID->Param, "CustomMsg");
        $this->Fields['PharID'] = &$this->PharID;
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

    // Current detail table name
    public function getCurrentDetailTable()
    {
        return Session(PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_DETAIL_TABLE"));
    }

    public function setCurrentDetailTable($v)
    {
        $_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_DETAIL_TABLE")] = $v;
    }

    // Get detail url
    public function getDetailUrl()
    {
        // Detail url
        $detailUrl = "";
        if ($this->getCurrentDetailTable() == "view_pharmacy_pharled_return") {
            $detailUrl = Container("view_pharmacy_pharled_return")->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
            $detailUrl .= "&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue);
        }
        if ($detailUrl == "") {
            $detailUrl = "PharmacyBillingReturnList";
        }
        return $detailUrl;
    }

    // Table level SQL
    public function getSqlFrom() // From
    {
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`pharmacy_billing_return`";
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
        $this->DefaultFilter = "`HospID`='".HospitalID()."'";
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
        $this->Reception->DbValue = $row['Reception'];
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
        $this->PatId->DbValue = $row['PatId'];
        $this->DrDepartment->DbValue = $row['DrDepartment'];
        $this->RefferedBy->DbValue = $row['RefferedBy'];
        $this->BillNumber->DbValue = $row['BillNumber'];
        $this->CardNumber->DbValue = $row['CardNumber'];
        $this->BankName->DbValue = $row['BankName'];
        $this->DrID->DbValue = $row['DrID'];
        $this->BillStatus->DbValue = $row['BillStatus'];
        $this->ReportHeader->DbValue = $row['ReportHeader'];
        $this->PharID->DbValue = $row['PharID'];
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
        return $_SESSION[$name] ?? GetUrl("PharmacyBillingReturnList");
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
        if ($pageName == "PharmacyBillingReturnView") {
            return $Language->phrase("View");
        } elseif ($pageName == "PharmacyBillingReturnEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "PharmacyBillingReturnAdd") {
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
                return "PharmacyBillingReturnView";
            case Config("API_ADD_ACTION"):
                return "PharmacyBillingReturnAdd";
            case Config("API_EDIT_ACTION"):
                return "PharmacyBillingReturnEdit";
            case Config("API_DELETE_ACTION"):
                return "PharmacyBillingReturnDelete";
            case Config("API_LIST_ACTION"):
                return "PharmacyBillingReturnList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "PharmacyBillingReturnList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("PharmacyBillingReturnView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("PharmacyBillingReturnView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "PharmacyBillingReturnAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "PharmacyBillingReturnAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("PharmacyBillingReturnEdit", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("PharmacyBillingReturnEdit", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
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
        if ($parm != "") {
            $url = $this->keyUrl("PharmacyBillingReturnAdd", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("PharmacyBillingReturnAdd", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
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
        return $this->keyUrl("PharmacyBillingReturnDelete", $this->getUrlParm());
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
        $this->Reception->setDbValue($row['Reception']);
        $this->PatientId->setDbValue($row['PatientId']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->Age->setDbValue($row['Age']);
        $this->Gender->setDbValue($row['Gender']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->Mobile->setDbValue($row['Mobile']);
        $this->IP_OP->setDbValue($row['IP_OP']);
        $this->Doctor->setDbValue($row['Doctor']);
        $this->voucher_type->setDbValue($row['voucher_type']);
        $this->Details->setDbValue($row['Details']);
        $this->ModeofPayment->setDbValue($row['ModeofPayment']);
        $this->Amount->setDbValue($row['Amount']);
        $this->AnyDues->setDbValue($row['AnyDues']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->RealizationAmount->setDbValue($row['RealizationAmount']);
        $this->RealizationStatus->setDbValue($row['RealizationStatus']);
        $this->RealizationRemarks->setDbValue($row['RealizationRemarks']);
        $this->RealizationBatchNo->setDbValue($row['RealizationBatchNo']);
        $this->RealizationDate->setDbValue($row['RealizationDate']);
        $this->HospID->setDbValue($row['HospID']);
        $this->RIDNO->setDbValue($row['RIDNO']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->CId->setDbValue($row['CId']);
        $this->PartnerName->setDbValue($row['PartnerName']);
        $this->PayerType->setDbValue($row['PayerType']);
        $this->Dob->setDbValue($row['Dob']);
        $this->Currency->setDbValue($row['Currency']);
        $this->DiscountRemarks->setDbValue($row['DiscountRemarks']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->PatId->setDbValue($row['PatId']);
        $this->DrDepartment->setDbValue($row['DrDepartment']);
        $this->RefferedBy->setDbValue($row['RefferedBy']);
        $this->BillNumber->setDbValue($row['BillNumber']);
        $this->CardNumber->setDbValue($row['CardNumber']);
        $this->BankName->setDbValue($row['BankName']);
        $this->DrID->setDbValue($row['DrID']);
        $this->BillStatus->setDbValue($row['BillStatus']);
        $this->ReportHeader->setDbValue($row['ReportHeader']);
        $this->PharID->setDbValue($row['PharID']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // Reception
        $this->Reception->CellCssStyle = "white-space: nowrap;";

        // PatientId

        // mrnno

        // PatientName

        // Age
        $this->Age->CellCssStyle = "white-space: nowrap;";

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

        // PatId

        // DrDepartment

        // RefferedBy

        // BillNumber

        // CardNumber

        // BankName

        // DrID

        // BillStatus

        // ReportHeader

        // PharID

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // Reception
        $curVal = trim(strval($this->Reception->CurrentValue));
        if ($curVal != "") {
            $this->Reception->ViewValue = $this->Reception->lookupCacheOption($curVal);
            if ($this->Reception->ViewValue === null) { // Lookup from database
                $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                $sqlWrk = $this->Reception->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Reception->Lookup->renderViewRow($rswrk[0]);
                    $this->Reception->ViewValue = $this->Reception->displayValue($arwrk);
                } else {
                    $this->Reception->ViewValue = $this->Reception->CurrentValue;
                }
            }
        } else {
            $this->Reception->ViewValue = null;
        }
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
        $this->Doctor->ViewCustomAttributes = "";

        // voucher_type
        $this->voucher_type->ViewValue = $this->voucher_type->CurrentValue;
        $this->voucher_type->ViewCustomAttributes = "";

        // Details
        $this->Details->ViewValue = $this->Details->CurrentValue;
        $this->Details->ViewCustomAttributes = "";

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
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

        // RIDNO
        $curVal = trim(strval($this->RIDNO->CurrentValue));
        if ($curVal != "") {
            $this->RIDNO->ViewValue = $this->RIDNO->lookupCacheOption($curVal);
            if ($this->RIDNO->ViewValue === null) { // Lookup from database
                $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                $sqlWrk = $this->RIDNO->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->RIDNO->Lookup->renderViewRow($rswrk[0]);
                    $this->RIDNO->ViewValue = $this->RIDNO->displayValue($arwrk);
                } else {
                    $this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
                }
            }
        } else {
            $this->RIDNO->ViewValue = null;
        }
        $this->RIDNO->ViewCustomAttributes = "";

        // TidNo
        $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
        $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
        $this->TidNo->ViewCustomAttributes = "";

        // CId
        $curVal = trim(strval($this->CId->CurrentValue));
        if ($curVal != "") {
            $this->CId->ViewValue = $this->CId->lookupCacheOption($curVal);
            if ($this->CId->ViewValue === null) { // Lookup from database
                $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                $sqlWrk = $this->CId->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->CId->Lookup->renderViewRow($rswrk[0]);
                    $this->CId->ViewValue = $this->CId->displayValue($arwrk);
                } else {
                    $this->CId->ViewValue = $this->CId->CurrentValue;
                }
            }
        } else {
            $this->CId->ViewValue = null;
        }
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
        $curVal = trim(strval($this->PatId->CurrentValue));
        if ($curVal != "") {
            $this->PatId->ViewValue = $this->PatId->lookupCacheOption($curVal);
            if ($this->PatId->ViewValue === null) { // Lookup from database
                $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                $sqlWrk = $this->PatId->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->PatId->Lookup->renderViewRow($rswrk[0]);
                    $this->PatId->ViewValue = $this->PatId->displayValue($arwrk);
                } else {
                    $this->PatId->ViewValue = $this->PatId->CurrentValue;
                }
            }
        } else {
            $this->PatId->ViewValue = null;
        }
        $this->PatId->ViewCustomAttributes = "";

        // DrDepartment
        $this->DrDepartment->ViewValue = $this->DrDepartment->CurrentValue;
        $this->DrDepartment->ViewCustomAttributes = "";

        // RefferedBy
        $curVal = trim(strval($this->RefferedBy->CurrentValue));
        if ($curVal != "") {
            $this->RefferedBy->ViewValue = $this->RefferedBy->lookupCacheOption($curVal);
            if ($this->RefferedBy->ViewValue === null) { // Lookup from database
                $filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->RefferedBy->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->RefferedBy->Lookup->renderViewRow($rswrk[0]);
                    $this->RefferedBy->ViewValue = $this->RefferedBy->displayValue($arwrk);
                } else {
                    $this->RefferedBy->ViewValue = $this->RefferedBy->CurrentValue;
                }
            }
        } else {
            $this->RefferedBy->ViewValue = null;
        }
        $this->RefferedBy->ViewCustomAttributes = "";

        // BillNumber
        $this->BillNumber->ViewValue = $this->BillNumber->CurrentValue;
        $this->BillNumber->ViewCustomAttributes = "";

        // CardNumber
        $this->CardNumber->ViewValue = $this->CardNumber->CurrentValue;
        $this->CardNumber->ViewCustomAttributes = "";

        // BankName
        $this->BankName->ViewValue = $this->BankName->CurrentValue;
        $this->BankName->ViewCustomAttributes = "";

        // DrID
        $curVal = trim(strval($this->DrID->CurrentValue));
        if ($curVal != "") {
            $this->DrID->ViewValue = $this->DrID->lookupCacheOption($curVal);
            if ($this->DrID->ViewValue === null) { // Lookup from database
                $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                $sqlWrk = $this->DrID->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->DrID->Lookup->renderViewRow($rswrk[0]);
                    $this->DrID->ViewValue = $this->DrID->displayValue($arwrk);
                } else {
                    $this->DrID->ViewValue = $this->DrID->CurrentValue;
                }
            }
        } else {
            $this->DrID->ViewValue = null;
        }
        $this->DrID->ViewCustomAttributes = "";

        // BillStatus
        $this->BillStatus->ViewValue = $this->BillStatus->CurrentValue;
        $this->BillStatus->ViewValue = FormatNumber($this->BillStatus->ViewValue, 0, -2, -2, -2);
        $this->BillStatus->ViewCustomAttributes = "";

        // ReportHeader
        if (strval($this->ReportHeader->CurrentValue) != "") {
            $this->ReportHeader->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->ReportHeader->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->ReportHeader->ViewValue->add($this->ReportHeader->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->ReportHeader->ViewValue = null;
        }
        $this->ReportHeader->ViewCustomAttributes = "";

        // PharID
        $this->PharID->ViewValue = $this->PharID->CurrentValue;
        $this->PharID->ViewValue = FormatNumber($this->PharID->ViewValue, 0, -2, -2, -2);
        $this->PharID->ViewCustomAttributes = "";

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

        // PatId
        $this->PatId->LinkCustomAttributes = "";
        $this->PatId->HrefValue = "";
        $this->PatId->TooltipValue = "";

        // DrDepartment
        $this->DrDepartment->LinkCustomAttributes = "";
        $this->DrDepartment->HrefValue = "";
        $this->DrDepartment->TooltipValue = "";

        // RefferedBy
        $this->RefferedBy->LinkCustomAttributes = "";
        $this->RefferedBy->HrefValue = "";
        $this->RefferedBy->TooltipValue = "";

        // BillNumber
        $this->BillNumber->LinkCustomAttributes = "";
        $this->BillNumber->HrefValue = "";
        $this->BillNumber->TooltipValue = "";

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

        // PharID
        $this->PharID->LinkCustomAttributes = "";
        $this->PharID->HrefValue = "";
        $this->PharID->TooltipValue = "";

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

        // Reception
        $this->Reception->EditAttrs["class"] = "form-control";
        $this->Reception->EditCustomAttributes = "";
        $this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

        // PatientId
        $this->PatientId->EditAttrs["class"] = "form-control";
        $this->PatientId->EditCustomAttributes = "";
        if (!$this->PatientId->Raw) {
            $this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
        }
        $this->PatientId->EditValue = $this->PatientId->CurrentValue;
        $this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

        // mrnno
        $this->mrnno->EditAttrs["class"] = "form-control";
        $this->mrnno->EditCustomAttributes = "";
        if (!$this->mrnno->Raw) {
            $this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
        }
        $this->mrnno->EditValue = $this->mrnno->CurrentValue;
        $this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

        // PatientName
        $this->PatientName->EditAttrs["class"] = "form-control";
        $this->PatientName->EditCustomAttributes = "";
        if (!$this->PatientName->Raw) {
            $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
        }
        $this->PatientName->EditValue = $this->PatientName->CurrentValue;
        $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

        // Age
        $this->Age->EditAttrs["class"] = "form-control";
        $this->Age->EditCustomAttributes = "";
        if (!$this->Age->Raw) {
            $this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
        }
        $this->Age->EditValue = $this->Age->CurrentValue;
        $this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

        // Gender
        $this->Gender->EditAttrs["class"] = "form-control";
        $this->Gender->EditCustomAttributes = "";
        if (!$this->Gender->Raw) {
            $this->Gender->CurrentValue = HtmlDecode($this->Gender->CurrentValue);
        }
        $this->Gender->EditValue = $this->Gender->CurrentValue;
        $this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

        // profilePic
        $this->profilePic->EditAttrs["class"] = "form-control";
        $this->profilePic->EditCustomAttributes = "";
        $this->profilePic->EditValue = $this->profilePic->CurrentValue;
        $this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

        // Mobile
        $this->Mobile->EditAttrs["class"] = "form-control";
        $this->Mobile->EditCustomAttributes = "";
        if (!$this->Mobile->Raw) {
            $this->Mobile->CurrentValue = HtmlDecode($this->Mobile->CurrentValue);
        }
        $this->Mobile->EditValue = $this->Mobile->CurrentValue;
        $this->Mobile->PlaceHolder = RemoveHtml($this->Mobile->caption());

        // IP_OP
        $this->IP_OP->EditAttrs["class"] = "form-control";
        $this->IP_OP->EditCustomAttributes = "";
        if (!$this->IP_OP->Raw) {
            $this->IP_OP->CurrentValue = HtmlDecode($this->IP_OP->CurrentValue);
        }
        $this->IP_OP->EditValue = $this->IP_OP->CurrentValue;
        $this->IP_OP->PlaceHolder = RemoveHtml($this->IP_OP->caption());

        // Doctor
        $this->Doctor->EditAttrs["class"] = "form-control";
        $this->Doctor->EditCustomAttributes = "";
        if (!$this->Doctor->Raw) {
            $this->Doctor->CurrentValue = HtmlDecode($this->Doctor->CurrentValue);
        }
        $this->Doctor->EditValue = $this->Doctor->CurrentValue;
        $this->Doctor->PlaceHolder = RemoveHtml($this->Doctor->caption());

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

        // RealizationAmount
        $this->RealizationAmount->EditAttrs["class"] = "form-control";
        $this->RealizationAmount->EditCustomAttributes = "";
        $this->RealizationAmount->EditValue = $this->RealizationAmount->CurrentValue;
        $this->RealizationAmount->PlaceHolder = RemoveHtml($this->RealizationAmount->caption());
        if (strval($this->RealizationAmount->EditValue) != "" && is_numeric($this->RealizationAmount->EditValue)) {
            $this->RealizationAmount->EditValue = FormatNumber($this->RealizationAmount->EditValue, -2, -2, -2, -2);
        }

        // RealizationStatus
        $this->RealizationStatus->EditAttrs["class"] = "form-control";
        $this->RealizationStatus->EditCustomAttributes = "";
        if (!$this->RealizationStatus->Raw) {
            $this->RealizationStatus->CurrentValue = HtmlDecode($this->RealizationStatus->CurrentValue);
        }
        $this->RealizationStatus->EditValue = $this->RealizationStatus->CurrentValue;
        $this->RealizationStatus->PlaceHolder = RemoveHtml($this->RealizationStatus->caption());

        // RealizationRemarks
        $this->RealizationRemarks->EditAttrs["class"] = "form-control";
        $this->RealizationRemarks->EditCustomAttributes = "";
        if (!$this->RealizationRemarks->Raw) {
            $this->RealizationRemarks->CurrentValue = HtmlDecode($this->RealizationRemarks->CurrentValue);
        }
        $this->RealizationRemarks->EditValue = $this->RealizationRemarks->CurrentValue;
        $this->RealizationRemarks->PlaceHolder = RemoveHtml($this->RealizationRemarks->caption());

        // RealizationBatchNo
        $this->RealizationBatchNo->EditAttrs["class"] = "form-control";
        $this->RealizationBatchNo->EditCustomAttributes = "";
        if (!$this->RealizationBatchNo->Raw) {
            $this->RealizationBatchNo->CurrentValue = HtmlDecode($this->RealizationBatchNo->CurrentValue);
        }
        $this->RealizationBatchNo->EditValue = $this->RealizationBatchNo->CurrentValue;
        $this->RealizationBatchNo->PlaceHolder = RemoveHtml($this->RealizationBatchNo->caption());

        // RealizationDate
        $this->RealizationDate->EditAttrs["class"] = "form-control";
        $this->RealizationDate->EditCustomAttributes = "";
        if (!$this->RealizationDate->Raw) {
            $this->RealizationDate->CurrentValue = HtmlDecode($this->RealizationDate->CurrentValue);
        }
        $this->RealizationDate->EditValue = $this->RealizationDate->CurrentValue;
        $this->RealizationDate->PlaceHolder = RemoveHtml($this->RealizationDate->caption());

        // HospID

        // RIDNO
        $this->RIDNO->EditAttrs["class"] = "form-control";
        $this->RIDNO->EditCustomAttributes = "";
        $this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());

        // TidNo
        $this->TidNo->EditAttrs["class"] = "form-control";
        $this->TidNo->EditCustomAttributes = "";
        $this->TidNo->EditValue = $this->TidNo->CurrentValue;
        $this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

        // CId
        $this->CId->EditAttrs["class"] = "form-control";
        $this->CId->EditCustomAttributes = "";
        $this->CId->PlaceHolder = RemoveHtml($this->CId->caption());

        // PartnerName
        $this->PartnerName->EditAttrs["class"] = "form-control";
        $this->PartnerName->EditCustomAttributes = "";
        if (!$this->PartnerName->Raw) {
            $this->PartnerName->CurrentValue = HtmlDecode($this->PartnerName->CurrentValue);
        }
        $this->PartnerName->EditValue = $this->PartnerName->CurrentValue;
        $this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

        // PayerType
        $this->PayerType->EditAttrs["class"] = "form-control";
        $this->PayerType->EditCustomAttributes = "";
        if (!$this->PayerType->Raw) {
            $this->PayerType->CurrentValue = HtmlDecode($this->PayerType->CurrentValue);
        }
        $this->PayerType->EditValue = $this->PayerType->CurrentValue;
        $this->PayerType->PlaceHolder = RemoveHtml($this->PayerType->caption());

        // Dob
        $this->Dob->EditAttrs["class"] = "form-control";
        $this->Dob->EditCustomAttributes = "";
        if (!$this->Dob->Raw) {
            $this->Dob->CurrentValue = HtmlDecode($this->Dob->CurrentValue);
        }
        $this->Dob->EditValue = $this->Dob->CurrentValue;
        $this->Dob->PlaceHolder = RemoveHtml($this->Dob->caption());

        // Currency
        $this->Currency->EditAttrs["class"] = "form-control";
        $this->Currency->EditCustomAttributes = "";
        if (!$this->Currency->Raw) {
            $this->Currency->CurrentValue = HtmlDecode($this->Currency->CurrentValue);
        }
        $this->Currency->EditValue = $this->Currency->CurrentValue;
        $this->Currency->PlaceHolder = RemoveHtml($this->Currency->caption());

        // DiscountRemarks
        $this->DiscountRemarks->EditAttrs["class"] = "form-control";
        $this->DiscountRemarks->EditCustomAttributes = "";
        if (!$this->DiscountRemarks->Raw) {
            $this->DiscountRemarks->CurrentValue = HtmlDecode($this->DiscountRemarks->CurrentValue);
        }
        $this->DiscountRemarks->EditValue = $this->DiscountRemarks->CurrentValue;
        $this->DiscountRemarks->PlaceHolder = RemoveHtml($this->DiscountRemarks->caption());

        // Remarks
        $this->Remarks->EditAttrs["class"] = "form-control";
        $this->Remarks->EditCustomAttributes = "";
        if (!$this->Remarks->Raw) {
            $this->Remarks->CurrentValue = HtmlDecode($this->Remarks->CurrentValue);
        }
        $this->Remarks->EditValue = $this->Remarks->CurrentValue;
        $this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

        // PatId
        $this->PatId->EditAttrs["class"] = "form-control";
        $this->PatId->EditCustomAttributes = "";
        $this->PatId->PlaceHolder = RemoveHtml($this->PatId->caption());

        // DrDepartment
        $this->DrDepartment->EditAttrs["class"] = "form-control";
        $this->DrDepartment->EditCustomAttributes = "";
        if (!$this->DrDepartment->Raw) {
            $this->DrDepartment->CurrentValue = HtmlDecode($this->DrDepartment->CurrentValue);
        }
        $this->DrDepartment->EditValue = $this->DrDepartment->CurrentValue;
        $this->DrDepartment->PlaceHolder = RemoveHtml($this->DrDepartment->caption());

        // RefferedBy
        $this->RefferedBy->EditAttrs["class"] = "form-control";
        $this->RefferedBy->EditCustomAttributes = "";
        $this->RefferedBy->PlaceHolder = RemoveHtml($this->RefferedBy->caption());

        // BillNumber
        $this->BillNumber->EditAttrs["class"] = "form-control";
        $this->BillNumber->EditCustomAttributes = "";
        if (!$this->BillNumber->Raw) {
            $this->BillNumber->CurrentValue = HtmlDecode($this->BillNumber->CurrentValue);
        }
        $this->BillNumber->EditValue = $this->BillNumber->CurrentValue;
        $this->BillNumber->PlaceHolder = RemoveHtml($this->BillNumber->caption());

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

        // DrID
        $this->DrID->EditAttrs["class"] = "form-control";
        $this->DrID->EditCustomAttributes = "";
        $this->DrID->PlaceHolder = RemoveHtml($this->DrID->caption());

        // BillStatus
        $this->BillStatus->EditAttrs["class"] = "form-control";
        $this->BillStatus->EditCustomAttributes = "";
        $this->BillStatus->EditValue = $this->BillStatus->CurrentValue;
        $this->BillStatus->PlaceHolder = RemoveHtml($this->BillStatus->caption());

        // ReportHeader
        $this->ReportHeader->EditCustomAttributes = "";
        $this->ReportHeader->EditValue = $this->ReportHeader->options(false);
        $this->ReportHeader->PlaceHolder = RemoveHtml($this->ReportHeader->caption());

        // PharID

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
                    $doc->exportCaption($this->Reception);
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
                    $doc->exportCaption($this->PatId);
                    $doc->exportCaption($this->DrDepartment);
                    $doc->exportCaption($this->RefferedBy);
                    $doc->exportCaption($this->BillNumber);
                    $doc->exportCaption($this->CardNumber);
                    $doc->exportCaption($this->BankName);
                    $doc->exportCaption($this->DrID);
                    $doc->exportCaption($this->BillStatus);
                    $doc->exportCaption($this->ReportHeader);
                    $doc->exportCaption($this->PharID);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->Reception);
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
                    $doc->exportCaption($this->PatId);
                    $doc->exportCaption($this->DrDepartment);
                    $doc->exportCaption($this->RefferedBy);
                    $doc->exportCaption($this->BillNumber);
                    $doc->exportCaption($this->CardNumber);
                    $doc->exportCaption($this->BankName);
                    $doc->exportCaption($this->DrID);
                    $doc->exportCaption($this->BillStatus);
                    $doc->exportCaption($this->ReportHeader);
                    $doc->exportCaption($this->PharID);
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
                        $doc->exportField($this->Reception);
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
                        $doc->exportField($this->PatId);
                        $doc->exportField($this->DrDepartment);
                        $doc->exportField($this->RefferedBy);
                        $doc->exportField($this->BillNumber);
                        $doc->exportField($this->CardNumber);
                        $doc->exportField($this->BankName);
                        $doc->exportField($this->DrID);
                        $doc->exportField($this->BillStatus);
                        $doc->exportField($this->ReportHeader);
                        $doc->exportField($this->PharID);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->Reception);
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
                        $doc->exportField($this->PatId);
                        $doc->exportField($this->DrDepartment);
                        $doc->exportField($this->RefferedBy);
                        $doc->exportField($this->BillNumber);
                        $doc->exportField($this->CardNumber);
                        $doc->exportField($this->BankName);
                        $doc->exportField($this->DrID);
                        $doc->exportField($this->BillStatus);
                        $doc->exportField($this->ReportHeader);
                        $doc->exportField($this->PharID);
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
    public function recordsetSelecting(&$filter)
    {
        // Enter your code here
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
    			$PharID =  $UserProfile->Profile['PharID'];
    			$PharID_PreFixCode = $UserProfile->Profile['PharID_PreFixCode'];
    			if($PharID_PreFixCode == "")
    			{
    				getPharIDDetails($PharID);
    				$UserProfile = new UserProfile();
    				$PharID_PreFixCode = $UserProfile->Profile['PharID_PreFixCode'];
    			}
    			$rsnew["BillNumber"]  =  $PharID_PreFixCode . 'RN'. getPharIDRNBillNo($PharID);
    	return TRUE;
    }

    // Row Inserted event
    public function rowInserted($rsold, &$rsnew)
    {
        //Log("Row Inserted");
    }

    // Row Updating event
    public function rowUpdating($rsold, &$rsnew)
    {
        // Enter your code here
        // To cancel, set return value to false
        return true;
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
