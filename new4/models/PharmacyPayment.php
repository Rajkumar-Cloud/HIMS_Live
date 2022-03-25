<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for pharmacy_payment
 */
class PharmacyPayment extends DbTable
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
    public $PAYNO;
    public $DT;
    public $YM;
    public $PC;
    public $Customercode;
    public $Customername;
    public $pharmacy_pocol;
    public $Address1;
    public $Address2;
    public $Address3;
    public $State;
    public $Pincode;
    public $Phone;
    public $Fax;
    public $EEmail;
    public $HospID;
    public $createdby;
    public $createddatetime;
    public $modifiedby;
    public $modifieddatetime;
    public $PharmacyID;
    public $BillTotalValue;
    public $GRNTotalValue;
    public $BillDiscount;
    public $BillUpload;
    public $TransPort;
    public $AnyOther;
    public $voucher_type;
    public $Details;
    public $ModeofPayment;
    public $Amount;
    public $BankName;
    public $AccountNumber;
    public $chequeNumber;
    public $Remarks;
    public $SeectPaymentMode;
    public $PaidAmount;
    public $Currency;
    public $CardNumber;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'pharmacy_payment';
        $this->TableName = 'pharmacy_payment';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`pharmacy_payment`";
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
        $this->id = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->IsForeignKey = true; // Foreign key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // PAYNO
        $this->PAYNO = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_PAYNO', 'PAYNO', '`PAYNO`', '`PAYNO`', 200, 45, -1, false, '`PAYNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PAYNO->Sortable = true; // Allow sort
        $this->PAYNO->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PAYNO->Param, "CustomMsg");
        $this->Fields['PAYNO'] = &$this->PAYNO;

        // DT
        $this->DT = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_DT', 'DT', '`DT`', CastDateFieldForLike("`DT`", 7, "DB"), 135, 19, 7, false, '`DT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DT->Required = true; // Required field
        $this->DT->Sortable = true; // Allow sort
        $this->DT->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->DT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DT->Param, "CustomMsg");
        $this->Fields['DT'] = &$this->DT;

        // YM
        $this->YM = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_YM', 'YM', '`YM`', '`YM`', 200, 45, -1, false, '`YM`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->YM->Sortable = true; // Allow sort
        $this->YM->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->YM->Param, "CustomMsg");
        $this->Fields['YM'] = &$this->YM;

        // PC
        $this->PC = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_PC', 'PC', '`PC`', '`PC`', 200, 45, -1, false, '`PC`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PC->Sortable = true; // Allow sort
        $this->PC->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PC->Param, "CustomMsg");
        $this->Fields['PC'] = &$this->PC;

        // Customercode
        $this->Customercode = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_Customercode', 'Customercode', '`Customercode`', '`Customercode`', 200, 45, -1, false, '`Customercode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Customercode->Sortable = true; // Allow sort
        $this->Customercode->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Customercode->Param, "CustomMsg");
        $this->Fields['Customercode'] = &$this->Customercode;

        // Customername
        $this->Customername = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_Customername', 'Customername', '`Customername`', '`Customername`', 200, 45, -1, false, '`Customername`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Customername->Required = true; // Required field
        $this->Customername->Sortable = true; // Allow sort
        $this->Customername->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Customername->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Customername->Lookup = new Lookup('Customername', 'pharmacy_suppliers', false, 'Suppliername', ["Suppliername","","",""], [], [], [], [], ["id","Suppliercode","Address1","Address2","Address3","State","Pincode","Phone","Fax","Email"], ["x_PC","x_Customercode","x_Address1","x_Address2","x_Address3","x_State","x_Pincode","x_Phone","x_Fax","x_EEmail"], '`Suppliername` ASC', '');
        $this->Customername->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Customername->Param, "CustomMsg");
        $this->Fields['Customername'] = &$this->Customername;

        // pharmacy_pocol
        $this->pharmacy_pocol = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_pharmacy_pocol', 'pharmacy_pocol', '`pharmacy_pocol`', '`pharmacy_pocol`', 200, 45, -1, false, '`pharmacy_pocol`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->pharmacy_pocol->Required = true; // Required field
        $this->pharmacy_pocol->Sortable = true; // Allow sort
        $this->pharmacy_pocol->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->pharmacy_pocol->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->pharmacy_pocol->Lookup = new Lookup('pharmacy_pocol', 'hospital_pharmacy', false, 'pharmacy', ["pharmacy","","",""], [], [], [], [], [], [], '', '');
        $this->pharmacy_pocol->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->pharmacy_pocol->Param, "CustomMsg");
        $this->Fields['pharmacy_pocol'] = &$this->pharmacy_pocol;

        // Address1
        $this->Address1 = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_Address1', 'Address1', '`Address1`', '`Address1`', 201, 405, -1, false, '`Address1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Address1->Sortable = true; // Allow sort
        $this->Address1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Address1->Param, "CustomMsg");
        $this->Fields['Address1'] = &$this->Address1;

        // Address2
        $this->Address2 = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_Address2', 'Address2', '`Address2`', '`Address2`', 201, 405, -1, false, '`Address2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Address2->Sortable = true; // Allow sort
        $this->Address2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Address2->Param, "CustomMsg");
        $this->Fields['Address2'] = &$this->Address2;

        // Address3
        $this->Address3 = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_Address3', 'Address3', '`Address3`', '`Address3`', 201, 405, -1, false, '`Address3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Address3->Sortable = true; // Allow sort
        $this->Address3->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Address3->Param, "CustomMsg");
        $this->Fields['Address3'] = &$this->Address3;

        // State
        $this->State = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_State', 'State', '`State`', '`State`', 200, 45, -1, false, '`State`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->State->Sortable = true; // Allow sort
        $this->State->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->State->Param, "CustomMsg");
        $this->Fields['State'] = &$this->State;

        // Pincode
        $this->Pincode = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_Pincode', 'Pincode', '`Pincode`', '`Pincode`', 200, 45, -1, false, '`Pincode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Pincode->Sortable = true; // Allow sort
        $this->Pincode->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Pincode->Param, "CustomMsg");
        $this->Fields['Pincode'] = &$this->Pincode;

        // Phone
        $this->Phone = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_Phone', 'Phone', '`Phone`', '`Phone`', 200, 45, -1, false, '`Phone`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Phone->Sortable = true; // Allow sort
        $this->Phone->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Phone->Param, "CustomMsg");
        $this->Fields['Phone'] = &$this->Phone;

        // Fax
        $this->Fax = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_Fax', 'Fax', '`Fax`', '`Fax`', 200, 45, -1, false, '`Fax`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Fax->Sortable = true; // Allow sort
        $this->Fax->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Fax->Param, "CustomMsg");
        $this->Fields['Fax'] = &$this->Fax;

        // EEmail
        $this->EEmail = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_EEmail', 'EEmail', '`EEmail`', '`EEmail`', 200, 45, -1, false, '`EEmail`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EEmail->Sortable = true; // Allow sort
        $this->EEmail->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EEmail->Param, "CustomMsg");
        $this->Fields['EEmail'] = &$this->EEmail;

        // HospID
        $this->HospID = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->HospID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospID->Param, "CustomMsg");
        $this->Fields['HospID'] = &$this->HospID;

        // createdby
        $this->createdby = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 200, 45, -1, false, '`createdby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdby->Sortable = true; // Allow sort
        $this->createdby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createdby->Param, "CustomMsg");
        $this->Fields['createdby'] = &$this->createdby;

        // createddatetime
        $this->createddatetime = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, false, '`createddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddatetime->Sortable = true; // Allow sort
        $this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->createddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createddatetime->Param, "CustomMsg");
        $this->Fields['createddatetime'] = &$this->createddatetime;

        // modifiedby
        $this->modifiedby = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 200, 45, -1, false, '`modifiedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifiedby->Sortable = true; // Allow sort
        $this->modifiedby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifiedby->Param, "CustomMsg");
        $this->Fields['modifiedby'] = &$this->modifiedby;

        // modifieddatetime
        $this->modifieddatetime = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, false, '`modifieddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifieddatetime->Sortable = true; // Allow sort
        $this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->modifieddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifieddatetime->Param, "CustomMsg");
        $this->Fields['modifieddatetime'] = &$this->modifieddatetime;

        // PharmacyID
        $this->PharmacyID = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_PharmacyID', 'PharmacyID', '`PharmacyID`', '`PharmacyID`', 3, 11, -1, false, '`PharmacyID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PharmacyID->Sortable = true; // Allow sort
        $this->PharmacyID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->PharmacyID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PharmacyID->Param, "CustomMsg");
        $this->Fields['PharmacyID'] = &$this->PharmacyID;

        // BillTotalValue
        $this->BillTotalValue = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_BillTotalValue', 'BillTotalValue', '`BillTotalValue`', '`BillTotalValue`', 131, 10, -1, false, '`BillTotalValue`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BillTotalValue->Sortable = true; // Allow sort
        $this->BillTotalValue->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->BillTotalValue->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->BillTotalValue->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BillTotalValue->Param, "CustomMsg");
        $this->Fields['BillTotalValue'] = &$this->BillTotalValue;

        // GRNTotalValue
        $this->GRNTotalValue = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_GRNTotalValue', 'GRNTotalValue', '`GRNTotalValue`', '`GRNTotalValue`', 131, 10, -1, false, '`GRNTotalValue`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GRNTotalValue->Sortable = true; // Allow sort
        $this->GRNTotalValue->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->GRNTotalValue->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->GRNTotalValue->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GRNTotalValue->Param, "CustomMsg");
        $this->Fields['GRNTotalValue'] = &$this->GRNTotalValue;

        // BillDiscount
        $this->BillDiscount = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_BillDiscount', 'BillDiscount', '`BillDiscount`', '`BillDiscount`', 131, 10, -1, false, '`BillDiscount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BillDiscount->Sortable = true; // Allow sort
        $this->BillDiscount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->BillDiscount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->BillDiscount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BillDiscount->Param, "CustomMsg");
        $this->Fields['BillDiscount'] = &$this->BillDiscount;

        // BillUpload
        $this->BillUpload = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_BillUpload', 'BillUpload', '`BillUpload`', '`BillUpload`', 201, 450, -1, false, '`BillUpload`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->BillUpload->Sortable = true; // Allow sort
        $this->BillUpload->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BillUpload->Param, "CustomMsg");
        $this->Fields['BillUpload'] = &$this->BillUpload;

        // TransPort
        $this->TransPort = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_TransPort', 'TransPort', '`TransPort`', '`TransPort`', 131, 10, -1, false, '`TransPort`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TransPort->Sortable = true; // Allow sort
        $this->TransPort->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->TransPort->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->TransPort->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TransPort->Param, "CustomMsg");
        $this->Fields['TransPort'] = &$this->TransPort;

        // AnyOther
        $this->AnyOther = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_AnyOther', 'AnyOther', '`AnyOther`', '`AnyOther`', 131, 10, -1, false, '`AnyOther`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AnyOther->Sortable = true; // Allow sort
        $this->AnyOther->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->AnyOther->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->AnyOther->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AnyOther->Param, "CustomMsg");
        $this->Fields['AnyOther'] = &$this->AnyOther;

        // voucher_type
        $this->voucher_type = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_voucher_type', 'voucher_type', '`voucher_type`', '`voucher_type`', 200, 45, -1, false, '`voucher_type`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->voucher_type->Sortable = true; // Allow sort
        $this->voucher_type->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->voucher_type->Param, "CustomMsg");
        $this->Fields['voucher_type'] = &$this->voucher_type;

        // Details
        $this->Details = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_Details', 'Details', '`Details`', '`Details`', 200, 45, -1, false, '`Details`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Details->Sortable = true; // Allow sort
        $this->Details->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Details->Param, "CustomMsg");
        $this->Fields['Details'] = &$this->Details;

        // ModeofPayment
        $this->ModeofPayment = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_ModeofPayment', 'ModeofPayment', '`ModeofPayment`', '`ModeofPayment`', 200, 45, -1, false, '`ModeofPayment`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->ModeofPayment->Required = true; // Required field
        $this->ModeofPayment->Sortable = true; // Allow sort
        $this->ModeofPayment->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->ModeofPayment->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->ModeofPayment->Lookup = new Lookup('ModeofPayment', 'mas_modepayment', false, 'Mode', ["Mode","","",""], [], [], [], [], [], [], '', '');
        $this->ModeofPayment->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ModeofPayment->Param, "CustomMsg");
        $this->Fields['ModeofPayment'] = &$this->ModeofPayment;

        // Amount
        $this->Amount = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_Amount', 'Amount', '`Amount`', '`Amount`', 131, 10, -1, false, '`Amount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Amount->Required = true; // Required field
        $this->Amount->Sortable = true; // Allow sort
        $this->Amount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Amount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Amount->Param, "CustomMsg");
        $this->Fields['Amount'] = &$this->Amount;

        // BankName
        $this->BankName = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_BankName', 'BankName', '`BankName`', '`BankName`', 200, 45, -1, false, '`BankName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BankName->Sortable = true; // Allow sort
        $this->BankName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BankName->Param, "CustomMsg");
        $this->Fields['BankName'] = &$this->BankName;

        // AccountNumber
        $this->AccountNumber = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_AccountNumber', 'AccountNumber', '`AccountNumber`', '`AccountNumber`', 200, 45, -1, false, '`AccountNumber`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AccountNumber->Sortable = true; // Allow sort
        $this->AccountNumber->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AccountNumber->Param, "CustomMsg");
        $this->Fields['AccountNumber'] = &$this->AccountNumber;

        // chequeNumber
        $this->chequeNumber = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_chequeNumber', 'chequeNumber', '`chequeNumber`', '`chequeNumber`', 200, 45, -1, false, '`chequeNumber`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->chequeNumber->Sortable = true; // Allow sort
        $this->chequeNumber->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->chequeNumber->Param, "CustomMsg");
        $this->Fields['chequeNumber'] = &$this->chequeNumber;

        // Remarks
        $this->Remarks = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_Remarks', 'Remarks', '`Remarks`', '`Remarks`', 201, 405, -1, false, '`Remarks`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Remarks->Sortable = true; // Allow sort
        $this->Remarks->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Remarks->Param, "CustomMsg");
        $this->Fields['Remarks'] = &$this->Remarks;

        // SeectPaymentMode
        $this->SeectPaymentMode = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_SeectPaymentMode', 'SeectPaymentMode', '`SeectPaymentMode`', '`SeectPaymentMode`', 200, 45, -1, false, '`SeectPaymentMode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SeectPaymentMode->Sortable = true; // Allow sort
        $this->SeectPaymentMode->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SeectPaymentMode->Param, "CustomMsg");
        $this->Fields['SeectPaymentMode'] = &$this->SeectPaymentMode;

        // PaidAmount
        $this->PaidAmount = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_PaidAmount', 'PaidAmount', '`PaidAmount`', '`PaidAmount`', 200, 45, -1, false, '`PaidAmount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PaidAmount->Sortable = true; // Allow sort
        $this->PaidAmount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PaidAmount->Param, "CustomMsg");
        $this->Fields['PaidAmount'] = &$this->PaidAmount;

        // Currency
        $this->Currency = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_Currency', 'Currency', '`Currency`', '`Currency`', 200, 45, -1, false, '`Currency`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Currency->Sortable = true; // Allow sort
        $this->Currency->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Currency->Param, "CustomMsg");
        $this->Fields['Currency'] = &$this->Currency;

        // CardNumber
        $this->CardNumber = new DbField('pharmacy_payment', 'pharmacy_payment', 'x_CardNumber', 'CardNumber', '`CardNumber`', '`CardNumber`', 200, 45, -1, false, '`CardNumber`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CardNumber->Sortable = true; // Allow sort
        $this->CardNumber->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CardNumber->Param, "CustomMsg");
        $this->Fields['CardNumber'] = &$this->CardNumber;
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
        if ($this->getCurrentDetailTable() == "pharmacy_grn") {
            $detailUrl = Container("pharmacy_grn")->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
            $detailUrl .= "&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue);
        }
        if ($detailUrl == "") {
            $detailUrl = "PharmacyPaymentList";
        }
        return $detailUrl;
    }

    // Table level SQL
    public function getSqlFrom() // From
    {
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`pharmacy_payment`";
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
        $this->PAYNO->DbValue = $row['PAYNO'];
        $this->DT->DbValue = $row['DT'];
        $this->YM->DbValue = $row['YM'];
        $this->PC->DbValue = $row['PC'];
        $this->Customercode->DbValue = $row['Customercode'];
        $this->Customername->DbValue = $row['Customername'];
        $this->pharmacy_pocol->DbValue = $row['pharmacy_pocol'];
        $this->Address1->DbValue = $row['Address1'];
        $this->Address2->DbValue = $row['Address2'];
        $this->Address3->DbValue = $row['Address3'];
        $this->State->DbValue = $row['State'];
        $this->Pincode->DbValue = $row['Pincode'];
        $this->Phone->DbValue = $row['Phone'];
        $this->Fax->DbValue = $row['Fax'];
        $this->EEmail->DbValue = $row['EEmail'];
        $this->HospID->DbValue = $row['HospID'];
        $this->createdby->DbValue = $row['createdby'];
        $this->createddatetime->DbValue = $row['createddatetime'];
        $this->modifiedby->DbValue = $row['modifiedby'];
        $this->modifieddatetime->DbValue = $row['modifieddatetime'];
        $this->PharmacyID->DbValue = $row['PharmacyID'];
        $this->BillTotalValue->DbValue = $row['BillTotalValue'];
        $this->GRNTotalValue->DbValue = $row['GRNTotalValue'];
        $this->BillDiscount->DbValue = $row['BillDiscount'];
        $this->BillUpload->DbValue = $row['BillUpload'];
        $this->TransPort->DbValue = $row['TransPort'];
        $this->AnyOther->DbValue = $row['AnyOther'];
        $this->voucher_type->DbValue = $row['voucher_type'];
        $this->Details->DbValue = $row['Details'];
        $this->ModeofPayment->DbValue = $row['ModeofPayment'];
        $this->Amount->DbValue = $row['Amount'];
        $this->BankName->DbValue = $row['BankName'];
        $this->AccountNumber->DbValue = $row['AccountNumber'];
        $this->chequeNumber->DbValue = $row['chequeNumber'];
        $this->Remarks->DbValue = $row['Remarks'];
        $this->SeectPaymentMode->DbValue = $row['SeectPaymentMode'];
        $this->PaidAmount->DbValue = $row['PaidAmount'];
        $this->Currency->DbValue = $row['Currency'];
        $this->CardNumber->DbValue = $row['CardNumber'];
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
        return $_SESSION[$name] ?? GetUrl("PharmacyPaymentList");
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
        if ($pageName == "PharmacyPaymentView") {
            return $Language->phrase("View");
        } elseif ($pageName == "PharmacyPaymentEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "PharmacyPaymentAdd") {
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
                return "PharmacyPaymentView";
            case Config("API_ADD_ACTION"):
                return "PharmacyPaymentAdd";
            case Config("API_EDIT_ACTION"):
                return "PharmacyPaymentEdit";
            case Config("API_DELETE_ACTION"):
                return "PharmacyPaymentDelete";
            case Config("API_LIST_ACTION"):
                return "PharmacyPaymentList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "PharmacyPaymentList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("PharmacyPaymentView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("PharmacyPaymentView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "PharmacyPaymentAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "PharmacyPaymentAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("PharmacyPaymentEdit", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("PharmacyPaymentEdit", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
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
            $url = $this->keyUrl("PharmacyPaymentAdd", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("PharmacyPaymentAdd", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
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
        return $this->keyUrl("PharmacyPaymentDelete", $this->getUrlParm());
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
        $this->PAYNO->setDbValue($row['PAYNO']);
        $this->DT->setDbValue($row['DT']);
        $this->YM->setDbValue($row['YM']);
        $this->PC->setDbValue($row['PC']);
        $this->Customercode->setDbValue($row['Customercode']);
        $this->Customername->setDbValue($row['Customername']);
        $this->pharmacy_pocol->setDbValue($row['pharmacy_pocol']);
        $this->Address1->setDbValue($row['Address1']);
        $this->Address2->setDbValue($row['Address2']);
        $this->Address3->setDbValue($row['Address3']);
        $this->State->setDbValue($row['State']);
        $this->Pincode->setDbValue($row['Pincode']);
        $this->Phone->setDbValue($row['Phone']);
        $this->Fax->setDbValue($row['Fax']);
        $this->EEmail->setDbValue($row['EEmail']);
        $this->HospID->setDbValue($row['HospID']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->PharmacyID->setDbValue($row['PharmacyID']);
        $this->BillTotalValue->setDbValue($row['BillTotalValue']);
        $this->GRNTotalValue->setDbValue($row['GRNTotalValue']);
        $this->BillDiscount->setDbValue($row['BillDiscount']);
        $this->BillUpload->setDbValue($row['BillUpload']);
        $this->TransPort->setDbValue($row['TransPort']);
        $this->AnyOther->setDbValue($row['AnyOther']);
        $this->voucher_type->setDbValue($row['voucher_type']);
        $this->Details->setDbValue($row['Details']);
        $this->ModeofPayment->setDbValue($row['ModeofPayment']);
        $this->Amount->setDbValue($row['Amount']);
        $this->BankName->setDbValue($row['BankName']);
        $this->AccountNumber->setDbValue($row['AccountNumber']);
        $this->chequeNumber->setDbValue($row['chequeNumber']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->SeectPaymentMode->setDbValue($row['SeectPaymentMode']);
        $this->PaidAmount->setDbValue($row['PaidAmount']);
        $this->Currency->setDbValue($row['Currency']);
        $this->CardNumber->setDbValue($row['CardNumber']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // PAYNO

        // DT

        // YM

        // PC

        // Customercode

        // Customername

        // pharmacy_pocol

        // Address1

        // Address2

        // Address3

        // State

        // Pincode

        // Phone

        // Fax

        // EEmail

        // HospID

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // PharmacyID

        // BillTotalValue

        // GRNTotalValue

        // BillDiscount

        // BillUpload

        // TransPort

        // AnyOther

        // voucher_type

        // Details

        // ModeofPayment

        // Amount

        // BankName

        // AccountNumber

        // chequeNumber

        // Remarks

        // SeectPaymentMode

        // PaidAmount

        // Currency

        // CardNumber

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // PAYNO
        $this->PAYNO->ViewValue = $this->PAYNO->CurrentValue;
        $this->PAYNO->ViewCustomAttributes = "";

        // DT
        $this->DT->ViewValue = $this->DT->CurrentValue;
        $this->DT->ViewValue = FormatDateTime($this->DT->ViewValue, 7);
        $this->DT->ViewCustomAttributes = "";

        // YM
        $this->YM->ViewValue = $this->YM->CurrentValue;
        $this->YM->ViewCustomAttributes = "";

        // PC
        $this->PC->ViewValue = $this->PC->CurrentValue;
        $this->PC->ViewCustomAttributes = "";

        // Customercode
        $this->Customercode->ViewValue = $this->Customercode->CurrentValue;
        $this->Customercode->ViewCustomAttributes = "";

        // Customername
        $curVal = trim(strval($this->Customername->CurrentValue));
        if ($curVal != "") {
            $this->Customername->ViewValue = $this->Customername->lookupCacheOption($curVal);
            if ($this->Customername->ViewValue === null) { // Lookup from database
                $filterWrk = "`Suppliername`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Customername->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Customername->Lookup->renderViewRow($rswrk[0]);
                    $this->Customername->ViewValue = $this->Customername->displayValue($arwrk);
                } else {
                    $this->Customername->ViewValue = $this->Customername->CurrentValue;
                }
            }
        } else {
            $this->Customername->ViewValue = null;
        }
        $this->Customername->ViewCustomAttributes = "";

        // pharmacy_pocol
        $curVal = trim(strval($this->pharmacy_pocol->CurrentValue));
        if ($curVal != "") {
            $this->pharmacy_pocol->ViewValue = $this->pharmacy_pocol->lookupCacheOption($curVal);
            if ($this->pharmacy_pocol->ViewValue === null) { // Lookup from database
                $filterWrk = "`pharmacy`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $lookupFilter = function() {
                    return "`HospId`='".HospitalID()."'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->pharmacy_pocol->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->pharmacy_pocol->Lookup->renderViewRow($rswrk[0]);
                    $this->pharmacy_pocol->ViewValue = $this->pharmacy_pocol->displayValue($arwrk);
                } else {
                    $this->pharmacy_pocol->ViewValue = $this->pharmacy_pocol->CurrentValue;
                }
            }
        } else {
            $this->pharmacy_pocol->ViewValue = null;
        }
        $this->pharmacy_pocol->ViewCustomAttributes = "";

        // Address1
        $this->Address1->ViewValue = $this->Address1->CurrentValue;
        $this->Address1->ViewCustomAttributes = "";

        // Address2
        $this->Address2->ViewValue = $this->Address2->CurrentValue;
        $this->Address2->ViewCustomAttributes = "";

        // Address3
        $this->Address3->ViewValue = $this->Address3->CurrentValue;
        $this->Address3->ViewCustomAttributes = "";

        // State
        $this->State->ViewValue = $this->State->CurrentValue;
        $this->State->ViewCustomAttributes = "";

        // Pincode
        $this->Pincode->ViewValue = $this->Pincode->CurrentValue;
        $this->Pincode->ViewCustomAttributes = "";

        // Phone
        $this->Phone->ViewValue = $this->Phone->CurrentValue;
        $this->Phone->ViewCustomAttributes = "";

        // Fax
        $this->Fax->ViewValue = $this->Fax->CurrentValue;
        $this->Fax->ViewCustomAttributes = "";

        // EEmail
        $this->EEmail->ViewValue = $this->EEmail->CurrentValue;
        $this->EEmail->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

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

        // PharmacyID
        $this->PharmacyID->ViewValue = $this->PharmacyID->CurrentValue;
        $this->PharmacyID->ViewValue = FormatNumber($this->PharmacyID->ViewValue, 0, -2, -2, -2);
        $this->PharmacyID->ViewCustomAttributes = "";

        // BillTotalValue
        $this->BillTotalValue->ViewValue = $this->BillTotalValue->CurrentValue;
        $this->BillTotalValue->ViewValue = FormatNumber($this->BillTotalValue->ViewValue, 2, -2, -2, -2);
        $this->BillTotalValue->ViewCustomAttributes = "";

        // GRNTotalValue
        $this->GRNTotalValue->ViewValue = $this->GRNTotalValue->CurrentValue;
        $this->GRNTotalValue->ViewValue = FormatNumber($this->GRNTotalValue->ViewValue, 2, -2, -2, -2);
        $this->GRNTotalValue->ViewCustomAttributes = "";

        // BillDiscount
        $this->BillDiscount->ViewValue = $this->BillDiscount->CurrentValue;
        $this->BillDiscount->ViewValue = FormatNumber($this->BillDiscount->ViewValue, 2, -2, -2, -2);
        $this->BillDiscount->ViewCustomAttributes = "";

        // BillUpload
        $this->BillUpload->ViewValue = $this->BillUpload->CurrentValue;
        $this->BillUpload->ViewCustomAttributes = "";

        // TransPort
        $this->TransPort->ViewValue = $this->TransPort->CurrentValue;
        $this->TransPort->ViewValue = FormatNumber($this->TransPort->ViewValue, 2, -2, -2, -2);
        $this->TransPort->ViewCustomAttributes = "";

        // AnyOther
        $this->AnyOther->ViewValue = $this->AnyOther->CurrentValue;
        $this->AnyOther->ViewValue = FormatNumber($this->AnyOther->ViewValue, 2, -2, -2, -2);
        $this->AnyOther->ViewCustomAttributes = "";

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

        // BankName
        $this->BankName->ViewValue = $this->BankName->CurrentValue;
        $this->BankName->ViewCustomAttributes = "";

        // AccountNumber
        $this->AccountNumber->ViewValue = $this->AccountNumber->CurrentValue;
        $this->AccountNumber->ViewCustomAttributes = "";

        // chequeNumber
        $this->chequeNumber->ViewValue = $this->chequeNumber->CurrentValue;
        $this->chequeNumber->ViewCustomAttributes = "";

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

        // CardNumber
        $this->CardNumber->ViewValue = $this->CardNumber->CurrentValue;
        $this->CardNumber->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // PAYNO
        $this->PAYNO->LinkCustomAttributes = "";
        $this->PAYNO->HrefValue = "";
        $this->PAYNO->TooltipValue = "";

        // DT
        $this->DT->LinkCustomAttributes = "";
        $this->DT->HrefValue = "";
        $this->DT->TooltipValue = "";

        // YM
        $this->YM->LinkCustomAttributes = "";
        $this->YM->HrefValue = "";
        $this->YM->TooltipValue = "";

        // PC
        $this->PC->LinkCustomAttributes = "";
        $this->PC->HrefValue = "";
        $this->PC->TooltipValue = "";

        // Customercode
        $this->Customercode->LinkCustomAttributes = "";
        $this->Customercode->HrefValue = "";
        $this->Customercode->TooltipValue = "";

        // Customername
        $this->Customername->LinkCustomAttributes = "";
        $this->Customername->HrefValue = "";
        $this->Customername->TooltipValue = "";

        // pharmacy_pocol
        $this->pharmacy_pocol->LinkCustomAttributes = "";
        $this->pharmacy_pocol->HrefValue = "";
        $this->pharmacy_pocol->TooltipValue = "";

        // Address1
        $this->Address1->LinkCustomAttributes = "";
        $this->Address1->HrefValue = "";
        $this->Address1->TooltipValue = "";

        // Address2
        $this->Address2->LinkCustomAttributes = "";
        $this->Address2->HrefValue = "";
        $this->Address2->TooltipValue = "";

        // Address3
        $this->Address3->LinkCustomAttributes = "";
        $this->Address3->HrefValue = "";
        $this->Address3->TooltipValue = "";

        // State
        $this->State->LinkCustomAttributes = "";
        $this->State->HrefValue = "";
        $this->State->TooltipValue = "";

        // Pincode
        $this->Pincode->LinkCustomAttributes = "";
        $this->Pincode->HrefValue = "";
        $this->Pincode->TooltipValue = "";

        // Phone
        $this->Phone->LinkCustomAttributes = "";
        $this->Phone->HrefValue = "";
        $this->Phone->TooltipValue = "";

        // Fax
        $this->Fax->LinkCustomAttributes = "";
        $this->Fax->HrefValue = "";
        $this->Fax->TooltipValue = "";

        // EEmail
        $this->EEmail->LinkCustomAttributes = "";
        $this->EEmail->HrefValue = "";
        $this->EEmail->TooltipValue = "";

        // HospID
        $this->HospID->LinkCustomAttributes = "";
        $this->HospID->HrefValue = "";
        $this->HospID->TooltipValue = "";

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

        // PharmacyID
        $this->PharmacyID->LinkCustomAttributes = "";
        $this->PharmacyID->HrefValue = "";
        $this->PharmacyID->TooltipValue = "";

        // BillTotalValue
        $this->BillTotalValue->LinkCustomAttributes = "";
        $this->BillTotalValue->HrefValue = "";
        $this->BillTotalValue->TooltipValue = "";

        // GRNTotalValue
        $this->GRNTotalValue->LinkCustomAttributes = "";
        $this->GRNTotalValue->HrefValue = "";
        $this->GRNTotalValue->TooltipValue = "";

        // BillDiscount
        $this->BillDiscount->LinkCustomAttributes = "";
        $this->BillDiscount->HrefValue = "";
        $this->BillDiscount->TooltipValue = "";

        // BillUpload
        $this->BillUpload->LinkCustomAttributes = "";
        $this->BillUpload->HrefValue = "";
        $this->BillUpload->TooltipValue = "";

        // TransPort
        $this->TransPort->LinkCustomAttributes = "";
        $this->TransPort->HrefValue = "";
        $this->TransPort->TooltipValue = "";

        // AnyOther
        $this->AnyOther->LinkCustomAttributes = "";
        $this->AnyOther->HrefValue = "";
        $this->AnyOther->TooltipValue = "";

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

        // BankName
        $this->BankName->LinkCustomAttributes = "";
        $this->BankName->HrefValue = "";
        $this->BankName->TooltipValue = "";

        // AccountNumber
        $this->AccountNumber->LinkCustomAttributes = "";
        $this->AccountNumber->HrefValue = "";
        $this->AccountNumber->TooltipValue = "";

        // chequeNumber
        $this->chequeNumber->LinkCustomAttributes = "";
        $this->chequeNumber->HrefValue = "";
        $this->chequeNumber->TooltipValue = "";

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

        // CardNumber
        $this->CardNumber->LinkCustomAttributes = "";
        $this->CardNumber->HrefValue = "";
        $this->CardNumber->TooltipValue = "";

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

        // PAYNO
        $this->PAYNO->EditAttrs["class"] = "form-control";
        $this->PAYNO->EditCustomAttributes = "";
        if (!$this->PAYNO->Raw) {
            $this->PAYNO->CurrentValue = HtmlDecode($this->PAYNO->CurrentValue);
        }
        $this->PAYNO->EditValue = $this->PAYNO->CurrentValue;
        $this->PAYNO->PlaceHolder = RemoveHtml($this->PAYNO->caption());

        // DT
        $this->DT->EditAttrs["class"] = "form-control";
        $this->DT->EditCustomAttributes = "";
        $this->DT->EditValue = FormatDateTime($this->DT->CurrentValue, 7);
        $this->DT->PlaceHolder = RemoveHtml($this->DT->caption());

        // YM
        $this->YM->EditAttrs["class"] = "form-control";
        $this->YM->EditCustomAttributes = "";
        if (!$this->YM->Raw) {
            $this->YM->CurrentValue = HtmlDecode($this->YM->CurrentValue);
        }
        $this->YM->EditValue = $this->YM->CurrentValue;
        $this->YM->PlaceHolder = RemoveHtml($this->YM->caption());

        // PC
        $this->PC->EditAttrs["class"] = "form-control";
        $this->PC->EditCustomAttributes = "";
        if (!$this->PC->Raw) {
            $this->PC->CurrentValue = HtmlDecode($this->PC->CurrentValue);
        }
        $this->PC->EditValue = $this->PC->CurrentValue;
        $this->PC->PlaceHolder = RemoveHtml($this->PC->caption());

        // Customercode
        $this->Customercode->EditAttrs["class"] = "form-control";
        $this->Customercode->EditCustomAttributes = "";
        if (!$this->Customercode->Raw) {
            $this->Customercode->CurrentValue = HtmlDecode($this->Customercode->CurrentValue);
        }
        $this->Customercode->EditValue = $this->Customercode->CurrentValue;
        $this->Customercode->PlaceHolder = RemoveHtml($this->Customercode->caption());

        // Customername
        $this->Customername->EditAttrs["class"] = "form-control";
        $this->Customername->EditCustomAttributes = "";
        $this->Customername->PlaceHolder = RemoveHtml($this->Customername->caption());

        // pharmacy_pocol
        $this->pharmacy_pocol->EditAttrs["class"] = "form-control";
        $this->pharmacy_pocol->EditCustomAttributes = "";
        $this->pharmacy_pocol->PlaceHolder = RemoveHtml($this->pharmacy_pocol->caption());

        // Address1
        $this->Address1->EditAttrs["class"] = "form-control";
        $this->Address1->EditCustomAttributes = "";
        if (!$this->Address1->Raw) {
            $this->Address1->CurrentValue = HtmlDecode($this->Address1->CurrentValue);
        }
        $this->Address1->EditValue = $this->Address1->CurrentValue;
        $this->Address1->PlaceHolder = RemoveHtml($this->Address1->caption());

        // Address2
        $this->Address2->EditAttrs["class"] = "form-control";
        $this->Address2->EditCustomAttributes = "";
        if (!$this->Address2->Raw) {
            $this->Address2->CurrentValue = HtmlDecode($this->Address2->CurrentValue);
        }
        $this->Address2->EditValue = $this->Address2->CurrentValue;
        $this->Address2->PlaceHolder = RemoveHtml($this->Address2->caption());

        // Address3
        $this->Address3->EditAttrs["class"] = "form-control";
        $this->Address3->EditCustomAttributes = "";
        if (!$this->Address3->Raw) {
            $this->Address3->CurrentValue = HtmlDecode($this->Address3->CurrentValue);
        }
        $this->Address3->EditValue = $this->Address3->CurrentValue;
        $this->Address3->PlaceHolder = RemoveHtml($this->Address3->caption());

        // State
        $this->State->EditAttrs["class"] = "form-control";
        $this->State->EditCustomAttributes = "";
        if (!$this->State->Raw) {
            $this->State->CurrentValue = HtmlDecode($this->State->CurrentValue);
        }
        $this->State->EditValue = $this->State->CurrentValue;
        $this->State->PlaceHolder = RemoveHtml($this->State->caption());

        // Pincode
        $this->Pincode->EditAttrs["class"] = "form-control";
        $this->Pincode->EditCustomAttributes = "";
        if (!$this->Pincode->Raw) {
            $this->Pincode->CurrentValue = HtmlDecode($this->Pincode->CurrentValue);
        }
        $this->Pincode->EditValue = $this->Pincode->CurrentValue;
        $this->Pincode->PlaceHolder = RemoveHtml($this->Pincode->caption());

        // Phone
        $this->Phone->EditAttrs["class"] = "form-control";
        $this->Phone->EditCustomAttributes = "";
        if (!$this->Phone->Raw) {
            $this->Phone->CurrentValue = HtmlDecode($this->Phone->CurrentValue);
        }
        $this->Phone->EditValue = $this->Phone->CurrentValue;
        $this->Phone->PlaceHolder = RemoveHtml($this->Phone->caption());

        // Fax
        $this->Fax->EditAttrs["class"] = "form-control";
        $this->Fax->EditCustomAttributes = "";
        if (!$this->Fax->Raw) {
            $this->Fax->CurrentValue = HtmlDecode($this->Fax->CurrentValue);
        }
        $this->Fax->EditValue = $this->Fax->CurrentValue;
        $this->Fax->PlaceHolder = RemoveHtml($this->Fax->caption());

        // EEmail
        $this->EEmail->EditAttrs["class"] = "form-control";
        $this->EEmail->EditCustomAttributes = "";
        if (!$this->EEmail->Raw) {
            $this->EEmail->CurrentValue = HtmlDecode($this->EEmail->CurrentValue);
        }
        $this->EEmail->EditValue = $this->EEmail->CurrentValue;
        $this->EEmail->PlaceHolder = RemoveHtml($this->EEmail->caption());

        // HospID

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // PharmacyID

        // BillTotalValue
        $this->BillTotalValue->EditAttrs["class"] = "form-control";
        $this->BillTotalValue->EditCustomAttributes = "";
        $this->BillTotalValue->EditValue = $this->BillTotalValue->CurrentValue;
        $this->BillTotalValue->PlaceHolder = RemoveHtml($this->BillTotalValue->caption());
        if (strval($this->BillTotalValue->EditValue) != "" && is_numeric($this->BillTotalValue->EditValue)) {
            $this->BillTotalValue->EditValue = FormatNumber($this->BillTotalValue->EditValue, -2, -2, -2, -2);
        }

        // GRNTotalValue
        $this->GRNTotalValue->EditAttrs["class"] = "form-control";
        $this->GRNTotalValue->EditCustomAttributes = "";
        $this->GRNTotalValue->EditValue = $this->GRNTotalValue->CurrentValue;
        $this->GRNTotalValue->PlaceHolder = RemoveHtml($this->GRNTotalValue->caption());
        if (strval($this->GRNTotalValue->EditValue) != "" && is_numeric($this->GRNTotalValue->EditValue)) {
            $this->GRNTotalValue->EditValue = FormatNumber($this->GRNTotalValue->EditValue, -2, -2, -2, -2);
        }

        // BillDiscount
        $this->BillDiscount->EditAttrs["class"] = "form-control";
        $this->BillDiscount->EditCustomAttributes = "";
        $this->BillDiscount->EditValue = $this->BillDiscount->CurrentValue;
        $this->BillDiscount->PlaceHolder = RemoveHtml($this->BillDiscount->caption());
        if (strval($this->BillDiscount->EditValue) != "" && is_numeric($this->BillDiscount->EditValue)) {
            $this->BillDiscount->EditValue = FormatNumber($this->BillDiscount->EditValue, -2, -2, -2, -2);
        }

        // BillUpload
        $this->BillUpload->EditAttrs["class"] = "form-control";
        $this->BillUpload->EditCustomAttributes = "";
        $this->BillUpload->EditValue = $this->BillUpload->CurrentValue;
        $this->BillUpload->PlaceHolder = RemoveHtml($this->BillUpload->caption());

        // TransPort
        $this->TransPort->EditAttrs["class"] = "form-control";
        $this->TransPort->EditCustomAttributes = "";
        $this->TransPort->EditValue = $this->TransPort->CurrentValue;
        $this->TransPort->PlaceHolder = RemoveHtml($this->TransPort->caption());
        if (strval($this->TransPort->EditValue) != "" && is_numeric($this->TransPort->EditValue)) {
            $this->TransPort->EditValue = FormatNumber($this->TransPort->EditValue, -2, -2, -2, -2);
        }

        // AnyOther
        $this->AnyOther->EditAttrs["class"] = "form-control";
        $this->AnyOther->EditCustomAttributes = "";
        $this->AnyOther->EditValue = $this->AnyOther->CurrentValue;
        $this->AnyOther->PlaceHolder = RemoveHtml($this->AnyOther->caption());
        if (strval($this->AnyOther->EditValue) != "" && is_numeric($this->AnyOther->EditValue)) {
            $this->AnyOther->EditValue = FormatNumber($this->AnyOther->EditValue, -2, -2, -2, -2);
        }

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

        // BankName
        $this->BankName->EditAttrs["class"] = "form-control";
        $this->BankName->EditCustomAttributes = "";
        if (!$this->BankName->Raw) {
            $this->BankName->CurrentValue = HtmlDecode($this->BankName->CurrentValue);
        }
        $this->BankName->EditValue = $this->BankName->CurrentValue;
        $this->BankName->PlaceHolder = RemoveHtml($this->BankName->caption());

        // AccountNumber
        $this->AccountNumber->EditAttrs["class"] = "form-control";
        $this->AccountNumber->EditCustomAttributes = "";
        if (!$this->AccountNumber->Raw) {
            $this->AccountNumber->CurrentValue = HtmlDecode($this->AccountNumber->CurrentValue);
        }
        $this->AccountNumber->EditValue = $this->AccountNumber->CurrentValue;
        $this->AccountNumber->PlaceHolder = RemoveHtml($this->AccountNumber->caption());

        // chequeNumber
        $this->chequeNumber->EditAttrs["class"] = "form-control";
        $this->chequeNumber->EditCustomAttributes = "";
        if (!$this->chequeNumber->Raw) {
            $this->chequeNumber->CurrentValue = HtmlDecode($this->chequeNumber->CurrentValue);
        }
        $this->chequeNumber->EditValue = $this->chequeNumber->CurrentValue;
        $this->chequeNumber->PlaceHolder = RemoveHtml($this->chequeNumber->caption());

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

        // CardNumber
        $this->CardNumber->EditAttrs["class"] = "form-control";
        $this->CardNumber->EditCustomAttributes = "";
        if (!$this->CardNumber->Raw) {
            $this->CardNumber->CurrentValue = HtmlDecode($this->CardNumber->CurrentValue);
        }
        $this->CardNumber->EditValue = $this->CardNumber->CurrentValue;
        $this->CardNumber->PlaceHolder = RemoveHtml($this->CardNumber->caption());

        // Call Row Rendered event
        $this->rowRendered();
    }

    // Aggregate list row values
    public function aggregateListRowValues()
    {
            if (is_numeric($this->Amount->CurrentValue)) {
                $this->Amount->Total += $this->Amount->CurrentValue; // Accumulate total
            }
    }

    // Aggregate list row (for rendering)
    public function aggregateListRow()
    {
            $this->Amount->CurrentValue = $this->Amount->Total;
            $this->Amount->ViewValue = $this->Amount->CurrentValue;
            $this->Amount->ViewValue = FormatNumber($this->Amount->ViewValue, 2, -2, -2, -2);
            $this->Amount->ViewCustomAttributes = "";
            $this->Amount->HrefValue = ""; // Clear href value

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
                    $doc->exportCaption($this->PAYNO);
                    $doc->exportCaption($this->DT);
                    $doc->exportCaption($this->YM);
                    $doc->exportCaption($this->PC);
                    $doc->exportCaption($this->Customercode);
                    $doc->exportCaption($this->Customername);
                    $doc->exportCaption($this->pharmacy_pocol);
                    $doc->exportCaption($this->Address1);
                    $doc->exportCaption($this->Address2);
                    $doc->exportCaption($this->Address3);
                    $doc->exportCaption($this->State);
                    $doc->exportCaption($this->Pincode);
                    $doc->exportCaption($this->Phone);
                    $doc->exportCaption($this->Fax);
                    $doc->exportCaption($this->EEmail);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->PharmacyID);
                    $doc->exportCaption($this->BillTotalValue);
                    $doc->exportCaption($this->GRNTotalValue);
                    $doc->exportCaption($this->BillDiscount);
                    $doc->exportCaption($this->BillUpload);
                    $doc->exportCaption($this->TransPort);
                    $doc->exportCaption($this->AnyOther);
                    $doc->exportCaption($this->voucher_type);
                    $doc->exportCaption($this->Details);
                    $doc->exportCaption($this->ModeofPayment);
                    $doc->exportCaption($this->Amount);
                    $doc->exportCaption($this->BankName);
                    $doc->exportCaption($this->AccountNumber);
                    $doc->exportCaption($this->chequeNumber);
                    $doc->exportCaption($this->Remarks);
                    $doc->exportCaption($this->SeectPaymentMode);
                    $doc->exportCaption($this->PaidAmount);
                    $doc->exportCaption($this->Currency);
                    $doc->exportCaption($this->CardNumber);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->PAYNO);
                    $doc->exportCaption($this->DT);
                    $doc->exportCaption($this->YM);
                    $doc->exportCaption($this->PC);
                    $doc->exportCaption($this->Customercode);
                    $doc->exportCaption($this->Customername);
                    $doc->exportCaption($this->pharmacy_pocol);
                    $doc->exportCaption($this->State);
                    $doc->exportCaption($this->Pincode);
                    $doc->exportCaption($this->Phone);
                    $doc->exportCaption($this->Fax);
                    $doc->exportCaption($this->EEmail);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->PharmacyID);
                    $doc->exportCaption($this->BillTotalValue);
                    $doc->exportCaption($this->GRNTotalValue);
                    $doc->exportCaption($this->BillDiscount);
                    $doc->exportCaption($this->TransPort);
                    $doc->exportCaption($this->AnyOther);
                    $doc->exportCaption($this->voucher_type);
                    $doc->exportCaption($this->Details);
                    $doc->exportCaption($this->ModeofPayment);
                    $doc->exportCaption($this->Amount);
                    $doc->exportCaption($this->BankName);
                    $doc->exportCaption($this->AccountNumber);
                    $doc->exportCaption($this->chequeNumber);
                    $doc->exportCaption($this->SeectPaymentMode);
                    $doc->exportCaption($this->PaidAmount);
                    $doc->exportCaption($this->Currency);
                    $doc->exportCaption($this->CardNumber);
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
                $this->aggregateListRowValues(); // Aggregate row values

                // Render row
                $this->RowType = ROWTYPE_VIEW; // Render view
                $this->resetAttributes();
                $this->renderListRow();
                if (!$doc->ExportCustom) {
                    $doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
                    if ($exportPageType == "view") {
                        $doc->exportField($this->id);
                        $doc->exportField($this->PAYNO);
                        $doc->exportField($this->DT);
                        $doc->exportField($this->YM);
                        $doc->exportField($this->PC);
                        $doc->exportField($this->Customercode);
                        $doc->exportField($this->Customername);
                        $doc->exportField($this->pharmacy_pocol);
                        $doc->exportField($this->Address1);
                        $doc->exportField($this->Address2);
                        $doc->exportField($this->Address3);
                        $doc->exportField($this->State);
                        $doc->exportField($this->Pincode);
                        $doc->exportField($this->Phone);
                        $doc->exportField($this->Fax);
                        $doc->exportField($this->EEmail);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->PharmacyID);
                        $doc->exportField($this->BillTotalValue);
                        $doc->exportField($this->GRNTotalValue);
                        $doc->exportField($this->BillDiscount);
                        $doc->exportField($this->BillUpload);
                        $doc->exportField($this->TransPort);
                        $doc->exportField($this->AnyOther);
                        $doc->exportField($this->voucher_type);
                        $doc->exportField($this->Details);
                        $doc->exportField($this->ModeofPayment);
                        $doc->exportField($this->Amount);
                        $doc->exportField($this->BankName);
                        $doc->exportField($this->AccountNumber);
                        $doc->exportField($this->chequeNumber);
                        $doc->exportField($this->Remarks);
                        $doc->exportField($this->SeectPaymentMode);
                        $doc->exportField($this->PaidAmount);
                        $doc->exportField($this->Currency);
                        $doc->exportField($this->CardNumber);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->PAYNO);
                        $doc->exportField($this->DT);
                        $doc->exportField($this->YM);
                        $doc->exportField($this->PC);
                        $doc->exportField($this->Customercode);
                        $doc->exportField($this->Customername);
                        $doc->exportField($this->pharmacy_pocol);
                        $doc->exportField($this->State);
                        $doc->exportField($this->Pincode);
                        $doc->exportField($this->Phone);
                        $doc->exportField($this->Fax);
                        $doc->exportField($this->EEmail);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->PharmacyID);
                        $doc->exportField($this->BillTotalValue);
                        $doc->exportField($this->GRNTotalValue);
                        $doc->exportField($this->BillDiscount);
                        $doc->exportField($this->TransPort);
                        $doc->exportField($this->AnyOther);
                        $doc->exportField($this->voucher_type);
                        $doc->exportField($this->Details);
                        $doc->exportField($this->ModeofPayment);
                        $doc->exportField($this->Amount);
                        $doc->exportField($this->BankName);
                        $doc->exportField($this->AccountNumber);
                        $doc->exportField($this->chequeNumber);
                        $doc->exportField($this->SeectPaymentMode);
                        $doc->exportField($this->PaidAmount);
                        $doc->exportField($this->Currency);
                        $doc->exportField($this->CardNumber);
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

        // Export aggregates (horizontal format only)
        if ($doc->Horizontal) {
            $this->RowType = ROWTYPE_AGGREGATE;
            $this->resetAttributes();
            $this->aggregateListRow();
            if (!$doc->ExportCustom) {
                $doc->beginExportRow(-1);
                $doc->exportAggregate($this->id, '');
                $doc->exportAggregate($this->PAYNO, '');
                $doc->exportAggregate($this->DT, '');
                $doc->exportAggregate($this->YM, '');
                $doc->exportAggregate($this->PC, '');
                $doc->exportAggregate($this->Customercode, '');
                $doc->exportAggregate($this->Customername, '');
                $doc->exportAggregate($this->pharmacy_pocol, '');
                $doc->exportAggregate($this->State, '');
                $doc->exportAggregate($this->Pincode, '');
                $doc->exportAggregate($this->Phone, '');
                $doc->exportAggregate($this->Fax, '');
                $doc->exportAggregate($this->EEmail, '');
                $doc->exportAggregate($this->HospID, '');
                $doc->exportAggregate($this->createdby, '');
                $doc->exportAggregate($this->createddatetime, '');
                $doc->exportAggregate($this->modifiedby, '');
                $doc->exportAggregate($this->modifieddatetime, '');
                $doc->exportAggregate($this->PharmacyID, '');
                $doc->exportAggregate($this->BillTotalValue, '');
                $doc->exportAggregate($this->GRNTotalValue, '');
                $doc->exportAggregate($this->BillDiscount, '');
                $doc->exportAggregate($this->TransPort, '');
                $doc->exportAggregate($this->AnyOther, '');
                $doc->exportAggregate($this->voucher_type, '');
                $doc->exportAggregate($this->Details, '');
                $doc->exportAggregate($this->ModeofPayment, '');
                $doc->exportAggregate($this->Amount, 'TOTAL');
                $doc->exportAggregate($this->BankName, '');
                $doc->exportAggregate($this->AccountNumber, '');
                $doc->exportAggregate($this->chequeNumber, '');
                $doc->exportAggregate($this->SeectPaymentMode, '');
                $doc->exportAggregate($this->PaidAmount, '');
                $doc->exportAggregate($this->Currency, '');
                $doc->exportAggregate($this->CardNumber, '');
                $doc->endExportRow();
            }
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
    				//$rsnew["GRNNO"]  =  $hospital_PreFixCode . 'GRN'. getGRNNo($HospID);
    				$rsnew["PAYNO"]  =  $hospital_PreFixCode . 'PAY'. getYearPAYNo($HospID);
    	return TRUE;
    }

    // Row Inserted event
    public function rowInserted($rsold, &$rsnew) {
    	//echo "Row Inserted"
    	$Totttlcnt =  $_POST["Totttlcnt"];
    		if($Totttlcnt > 0)
    		{
    			for ($x = 0; $x <= $Totttlcnt; $x++) {
    				if(	$_POST["select".$x] == "on")
    				{
    				  $iidd =  $_POST["Toidcnt".$x];
    				  $paidAmmd  =  $_POST["PaidAmount".$x];
    				  $dbhelper = &DbHelper();
    				  $sqlA = "UPDATE `ganeshkumar_bjhims`.`pharmacy_grn` SET `Pid`='".$rsnew["id"]."', `PaymentNo`='".$rsnew["PAYNO"]."', `PaymentStatus`='Yes', `PaidAmount`='".$paidAmmd."' WHERE `id`='".$iidd."';";
    				  $results = $dbhelper->ExecuteRows($sqlA);
    				}
    			}
    		}
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
