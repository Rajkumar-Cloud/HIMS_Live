<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for store_grn
 */
class StoreGrn extends DbTable
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
    public $GRNNO;
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
    public $BILLNO;
    public $BILLDT;
    public $BRCODE;
    public $PharmacyID;
    public $BillTotalValue;
    public $GRNTotalValue;
    public $BillDiscount;
    public $BillUpload;
    public $TransPort;
    public $AnyOther;
    public $Remarks;
    public $GrnValue;
    public $Pid;
    public $PaymentNo;
    public $PaymentStatus;
    public $PaidAmount;
    public $StoreID;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'store_grn';
        $this->TableName = 'store_grn';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`store_grn`";
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
        $this->id = new DbField('store_grn', 'store_grn', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->IsForeignKey = true; // Foreign key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // GRNNO
        $this->GRNNO = new DbField('store_grn', 'store_grn', 'x_GRNNO', 'GRNNO', '`GRNNO`', '`GRNNO`', 200, 45, -1, false, '`GRNNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GRNNO->Sortable = true; // Allow sort
        $this->GRNNO->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GRNNO->Param, "CustomMsg");
        $this->Fields['GRNNO'] = &$this->GRNNO;

        // DT
        $this->DT = new DbField('store_grn', 'store_grn', 'x_DT', 'DT', '`DT`', CastDateFieldForLike("`DT`", 0, "DB"), 135, 19, 0, false, '`DT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DT->Required = true; // Required field
        $this->DT->Sortable = true; // Allow sort
        $this->DT->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->DT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DT->Param, "CustomMsg");
        $this->Fields['DT'] = &$this->DT;

        // YM
        $this->YM = new DbField('store_grn', 'store_grn', 'x_YM', 'YM', '`YM`', '`YM`', 200, 45, -1, false, '`YM`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->YM->Required = true; // Required field
        $this->YM->Sortable = true; // Allow sort
        $this->YM->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->YM->Param, "CustomMsg");
        $this->Fields['YM'] = &$this->YM;

        // PC
        $this->PC = new DbField('store_grn', 'store_grn', 'x_PC', 'PC', '`PC`', '`PC`', 200, 45, -1, false, '`PC`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->PC->Required = true; // Required field
        $this->PC->Sortable = true; // Allow sort
        $this->PC->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->PC->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->PC->Lookup = new Lookup('PC', 'store_suppliers', false, 'id', ["Suppliercode","Suppliername","",""], [], [], [], [], ["Suppliercode","Suppliername","id","Address1","Address2","Address3","State","Pincode","Phone","Fax","Email"], ["x_Customercode","x_Customername","x_pharmacy_pocol","x_Address1","x_Address2","x_Address3","x_State","x_Pincode","x_Phone","x_Fax","x_EEmail"], '', '');
        $this->PC->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PC->Param, "CustomMsg");
        $this->Fields['PC'] = &$this->PC;

        // Customercode
        $this->Customercode = new DbField('store_grn', 'store_grn', 'x_Customercode', 'Customercode', '`Customercode`', '`Customercode`', 200, 45, -1, false, '`Customercode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Customercode->Sortable = true; // Allow sort
        $this->Customercode->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Customercode->Param, "CustomMsg");
        $this->Fields['Customercode'] = &$this->Customercode;

        // Customername
        $this->Customername = new DbField('store_grn', 'store_grn', 'x_Customername', 'Customername', '`Customername`', '`Customername`', 200, 45, -1, false, '`Customername`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Customername->Sortable = true; // Allow sort
        $this->Customername->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Customername->Param, "CustomMsg");
        $this->Fields['Customername'] = &$this->Customername;

        // pharmacy_pocol
        $this->pharmacy_pocol = new DbField('store_grn', 'store_grn', 'x_pharmacy_pocol', 'pharmacy_pocol', '`pharmacy_pocol`', '`pharmacy_pocol`', 200, 45, -1, false, '`pharmacy_pocol`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->pharmacy_pocol->Sortable = true; // Allow sort
        $this->pharmacy_pocol->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->pharmacy_pocol->Param, "CustomMsg");
        $this->Fields['pharmacy_pocol'] = &$this->pharmacy_pocol;

        // Address1
        $this->Address1 = new DbField('store_grn', 'store_grn', 'x_Address1', 'Address1', '`Address1`', '`Address1`', 201, 405, -1, false, '`Address1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Address1->Sortable = true; // Allow sort
        $this->Address1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Address1->Param, "CustomMsg");
        $this->Fields['Address1'] = &$this->Address1;

        // Address2
        $this->Address2 = new DbField('store_grn', 'store_grn', 'x_Address2', 'Address2', '`Address2`', '`Address2`', 201, 405, -1, false, '`Address2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Address2->Sortable = true; // Allow sort
        $this->Address2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Address2->Param, "CustomMsg");
        $this->Fields['Address2'] = &$this->Address2;

        // Address3
        $this->Address3 = new DbField('store_grn', 'store_grn', 'x_Address3', 'Address3', '`Address3`', '`Address3`', 201, 405, -1, false, '`Address3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Address3->Sortable = true; // Allow sort
        $this->Address3->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Address3->Param, "CustomMsg");
        $this->Fields['Address3'] = &$this->Address3;

        // State
        $this->State = new DbField('store_grn', 'store_grn', 'x_State', 'State', '`State`', '`State`', 200, 45, -1, false, '`State`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->State->Sortable = true; // Allow sort
        $this->State->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->State->Param, "CustomMsg");
        $this->Fields['State'] = &$this->State;

        // Pincode
        $this->Pincode = new DbField('store_grn', 'store_grn', 'x_Pincode', 'Pincode', '`Pincode`', '`Pincode`', 200, 45, -1, false, '`Pincode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Pincode->Sortable = true; // Allow sort
        $this->Pincode->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Pincode->Param, "CustomMsg");
        $this->Fields['Pincode'] = &$this->Pincode;

        // Phone
        $this->Phone = new DbField('store_grn', 'store_grn', 'x_Phone', 'Phone', '`Phone`', '`Phone`', 200, 45, -1, false, '`Phone`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Phone->Sortable = true; // Allow sort
        $this->Phone->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Phone->Param, "CustomMsg");
        $this->Fields['Phone'] = &$this->Phone;

        // Fax
        $this->Fax = new DbField('store_grn', 'store_grn', 'x_Fax', 'Fax', '`Fax`', '`Fax`', 200, 45, -1, false, '`Fax`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Fax->Sortable = true; // Allow sort
        $this->Fax->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Fax->Param, "CustomMsg");
        $this->Fields['Fax'] = &$this->Fax;

        // EEmail
        $this->EEmail = new DbField('store_grn', 'store_grn', 'x_EEmail', 'EEmail', '`EEmail`', '`EEmail`', 200, 45, -1, false, '`EEmail`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EEmail->Sortable = true; // Allow sort
        $this->EEmail->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EEmail->Param, "CustomMsg");
        $this->Fields['EEmail'] = &$this->EEmail;

        // HospID
        $this->HospID = new DbField('store_grn', 'store_grn', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->HospID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospID->Param, "CustomMsg");
        $this->Fields['HospID'] = &$this->HospID;

        // createdby
        $this->createdby = new DbField('store_grn', 'store_grn', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 200, 45, -1, false, '`createdby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdby->Sortable = true; // Allow sort
        $this->createdby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createdby->Param, "CustomMsg");
        $this->Fields['createdby'] = &$this->createdby;

        // createddatetime
        $this->createddatetime = new DbField('store_grn', 'store_grn', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, false, '`createddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddatetime->Sortable = true; // Allow sort
        $this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->createddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createddatetime->Param, "CustomMsg");
        $this->Fields['createddatetime'] = &$this->createddatetime;

        // modifiedby
        $this->modifiedby = new DbField('store_grn', 'store_grn', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 200, 45, -1, false, '`modifiedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifiedby->Sortable = true; // Allow sort
        $this->modifiedby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifiedby->Param, "CustomMsg");
        $this->Fields['modifiedby'] = &$this->modifiedby;

        // modifieddatetime
        $this->modifieddatetime = new DbField('store_grn', 'store_grn', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, false, '`modifieddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifieddatetime->Sortable = true; // Allow sort
        $this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->modifieddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifieddatetime->Param, "CustomMsg");
        $this->Fields['modifieddatetime'] = &$this->modifieddatetime;

        // BILLNO
        $this->BILLNO = new DbField('store_grn', 'store_grn', 'x_BILLNO', 'BILLNO', '`BILLNO`', '`BILLNO`', 200, 45, -1, false, '`BILLNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BILLNO->Required = true; // Required field
        $this->BILLNO->Sortable = true; // Allow sort
        $this->BILLNO->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BILLNO->Param, "CustomMsg");
        $this->Fields['BILLNO'] = &$this->BILLNO;

        // BILLDT
        $this->BILLDT = new DbField('store_grn', 'store_grn', 'x_BILLDT', 'BILLDT', '`BILLDT`', CastDateFieldForLike("`BILLDT`", 0, "DB"), 135, 19, 0, false, '`BILLDT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BILLDT->Required = true; // Required field
        $this->BILLDT->Sortable = true; // Allow sort
        $this->BILLDT->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->BILLDT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BILLDT->Param, "CustomMsg");
        $this->Fields['BILLDT'] = &$this->BILLDT;

        // BRCODE
        $this->BRCODE = new DbField('store_grn', 'store_grn', 'x_BRCODE', 'BRCODE', '`BRCODE`', '`BRCODE`', 3, 11, -1, false, '`BRCODE`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->BRCODE->Required = true; // Required field
        $this->BRCODE->Sortable = true; // Allow sort
        $this->BRCODE->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->BRCODE->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->BRCODE->Lookup = new Lookup('BRCODE', 'hospital_store', false, 'id', ["pharmacy","","",""], [], [], [], [], [], [], '', '');
        $this->BRCODE->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->BRCODE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BRCODE->Param, "CustomMsg");
        $this->Fields['BRCODE'] = &$this->BRCODE;

        // PharmacyID
        $this->PharmacyID = new DbField('store_grn', 'store_grn', 'x_PharmacyID', 'PharmacyID', '`PharmacyID`', '`PharmacyID`', 3, 11, -1, false, '`PharmacyID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PharmacyID->Sortable = true; // Allow sort
        $this->PharmacyID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->PharmacyID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PharmacyID->Param, "CustomMsg");
        $this->Fields['PharmacyID'] = &$this->PharmacyID;

        // BillTotalValue
        $this->BillTotalValue = new DbField('store_grn', 'store_grn', 'x_BillTotalValue', 'BillTotalValue', '`BillTotalValue`', '`BillTotalValue`', 131, 10, -1, false, '`BillTotalValue`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BillTotalValue->Required = true; // Required field
        $this->BillTotalValue->Sortable = true; // Allow sort
        $this->BillTotalValue->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->BillTotalValue->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->BillTotalValue->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BillTotalValue->Param, "CustomMsg");
        $this->Fields['BillTotalValue'] = &$this->BillTotalValue;

        // GRNTotalValue
        $this->GRNTotalValue = new DbField('store_grn', 'store_grn', 'x_GRNTotalValue', 'GRNTotalValue', '`GRNTotalValue`', '`GRNTotalValue`', 131, 10, -1, false, '`GRNTotalValue`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GRNTotalValue->Required = true; // Required field
        $this->GRNTotalValue->Sortable = true; // Allow sort
        $this->GRNTotalValue->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->GRNTotalValue->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->GRNTotalValue->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GRNTotalValue->Param, "CustomMsg");
        $this->Fields['GRNTotalValue'] = &$this->GRNTotalValue;

        // BillDiscount
        $this->BillDiscount = new DbField('store_grn', 'store_grn', 'x_BillDiscount', 'BillDiscount', '`BillDiscount`', '`BillDiscount`', 131, 10, -1, false, '`BillDiscount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BillDiscount->Required = true; // Required field
        $this->BillDiscount->Sortable = true; // Allow sort
        $this->BillDiscount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->BillDiscount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->BillDiscount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BillDiscount->Param, "CustomMsg");
        $this->Fields['BillDiscount'] = &$this->BillDiscount;

        // BillUpload
        $this->BillUpload = new DbField('store_grn', 'store_grn', 'x_BillUpload', 'BillUpload', '`BillUpload`', '`BillUpload`', 201, 450, -1, true, '`BillUpload`', false, false, false, 'IMAGE', 'FILE');
        $this->BillUpload->Sortable = true; // Allow sort
        $this->BillUpload->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BillUpload->Param, "CustomMsg");
        $this->Fields['BillUpload'] = &$this->BillUpload;

        // TransPort
        $this->TransPort = new DbField('store_grn', 'store_grn', 'x_TransPort', 'TransPort', '`TransPort`', '`TransPort`', 131, 10, -1, false, '`TransPort`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TransPort->Sortable = true; // Allow sort
        $this->TransPort->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->TransPort->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->TransPort->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TransPort->Param, "CustomMsg");
        $this->Fields['TransPort'] = &$this->TransPort;

        // AnyOther
        $this->AnyOther = new DbField('store_grn', 'store_grn', 'x_AnyOther', 'AnyOther', '`AnyOther`', '`AnyOther`', 131, 10, -1, false, '`AnyOther`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AnyOther->Sortable = true; // Allow sort
        $this->AnyOther->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->AnyOther->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->AnyOther->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AnyOther->Param, "CustomMsg");
        $this->Fields['AnyOther'] = &$this->AnyOther;

        // Remarks
        $this->Remarks = new DbField('store_grn', 'store_grn', 'x_Remarks', 'Remarks', '`Remarks`', '`Remarks`', 200, 205, -1, false, '`Remarks`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Remarks->Sortable = true; // Allow sort
        $this->Remarks->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Remarks->Param, "CustomMsg");
        $this->Fields['Remarks'] = &$this->Remarks;

        // GrnValue
        $this->GrnValue = new DbField('store_grn', 'store_grn', 'x_GrnValue', 'GrnValue', '`GrnValue`', '`GrnValue`', 131, 10, -1, false, '`GrnValue`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GrnValue->Sortable = true; // Allow sort
        $this->GrnValue->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->GrnValue->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->GrnValue->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GrnValue->Param, "CustomMsg");
        $this->Fields['GrnValue'] = &$this->GrnValue;

        // Pid
        $this->Pid = new DbField('store_grn', 'store_grn', 'x_Pid', 'Pid', '`Pid`', '`Pid`', 3, 11, -1, false, '`Pid`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Pid->IsForeignKey = true; // Foreign key field
        $this->Pid->Sortable = true; // Allow sort
        $this->Pid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Pid->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Pid->Param, "CustomMsg");
        $this->Fields['Pid'] = &$this->Pid;

        // PaymentNo
        $this->PaymentNo = new DbField('store_grn', 'store_grn', 'x_PaymentNo', 'PaymentNo', '`PaymentNo`', '`PaymentNo`', 200, 45, -1, false, '`PaymentNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PaymentNo->Sortable = true; // Allow sort
        $this->PaymentNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PaymentNo->Param, "CustomMsg");
        $this->Fields['PaymentNo'] = &$this->PaymentNo;

        // PaymentStatus
        $this->PaymentStatus = new DbField('store_grn', 'store_grn', 'x_PaymentStatus', 'PaymentStatus', '`PaymentStatus`', '`PaymentStatus`', 200, 45, -1, false, '`PaymentStatus`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PaymentStatus->Sortable = true; // Allow sort
        $this->PaymentStatus->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PaymentStatus->Param, "CustomMsg");
        $this->Fields['PaymentStatus'] = &$this->PaymentStatus;

        // PaidAmount
        $this->PaidAmount = new DbField('store_grn', 'store_grn', 'x_PaidAmount', 'PaidAmount', '`PaidAmount`', '`PaidAmount`', 131, 10, -1, false, '`PaidAmount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PaidAmount->Sortable = true; // Allow sort
        $this->PaidAmount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PaidAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->PaidAmount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PaidAmount->Param, "CustomMsg");
        $this->Fields['PaidAmount'] = &$this->PaidAmount;

        // StoreID
        $this->StoreID = new DbField('store_grn', 'store_grn', 'x_StoreID', 'StoreID', '`StoreID`', '`StoreID`', 3, 11, -1, false, '`StoreID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StoreID->Sortable = true; // Allow sort
        $this->StoreID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->StoreID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StoreID->Param, "CustomMsg");
        $this->Fields['StoreID'] = &$this->StoreID;
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

    // Current master table name
    public function getCurrentMasterTable()
    {
        return Session(PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_MASTER_TABLE"));
    }

    public function setCurrentMasterTable($v)
    {
        $_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_MASTER_TABLE")] = $v;
    }

    // Session master WHERE clause
    public function getMasterFilter()
    {
        // Master filter
        $masterFilter = "";
        if ($this->getCurrentMasterTable() == "store_payment") {
            if ($this->Pid->getSessionValue() != "") {
                $masterFilter .= "" . GetForeignKeySql("`id`", $this->Pid->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
        }
        return $masterFilter;
    }

    // Session detail WHERE clause
    public function getDetailFilter()
    {
        // Detail filter
        $detailFilter = "";
        if ($this->getCurrentMasterTable() == "store_payment") {
            if ($this->Pid->getSessionValue() != "") {
                $detailFilter .= "" . GetForeignKeySql("`Pid`", $this->Pid->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
        }
        return $detailFilter;
    }

    // Master filter
    public function sqlMasterFilter_store_payment()
    {
        return "`id`=@id@";
    }
    // Detail filter
    public function sqlDetailFilter_store_payment()
    {
        return "`Pid`=@Pid@";
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
        if ($this->getCurrentDetailTable() == "view_store_grn") {
            $detailUrl = Container("view_store_grn")->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
            $detailUrl .= "&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue);
        }
        if ($detailUrl == "") {
            $detailUrl = "StoreGrnList";
        }
        return $detailUrl;
    }

    // Table level SQL
    public function getSqlFrom() // From
    {
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`store_grn`";
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
        $this->DefaultFilter = "`HospID`='".HospitalID()."'  and  `BRCODE`='".PharmacyID()."'";
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
        $this->GRNNO->DbValue = $row['GRNNO'];
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
        $this->BILLNO->DbValue = $row['BILLNO'];
        $this->BILLDT->DbValue = $row['BILLDT'];
        $this->BRCODE->DbValue = $row['BRCODE'];
        $this->PharmacyID->DbValue = $row['PharmacyID'];
        $this->BillTotalValue->DbValue = $row['BillTotalValue'];
        $this->GRNTotalValue->DbValue = $row['GRNTotalValue'];
        $this->BillDiscount->DbValue = $row['BillDiscount'];
        $this->BillUpload->Upload->DbValue = $row['BillUpload'];
        $this->TransPort->DbValue = $row['TransPort'];
        $this->AnyOther->DbValue = $row['AnyOther'];
        $this->Remarks->DbValue = $row['Remarks'];
        $this->GrnValue->DbValue = $row['GrnValue'];
        $this->Pid->DbValue = $row['Pid'];
        $this->PaymentNo->DbValue = $row['PaymentNo'];
        $this->PaymentStatus->DbValue = $row['PaymentStatus'];
        $this->PaidAmount->DbValue = $row['PaidAmount'];
        $this->StoreID->DbValue = $row['StoreID'];
    }

    // Delete uploaded files
    public function deleteUploadedFiles($row)
    {
        $this->loadDbValues($row);
        $oldFiles = EmptyValue($row['BillUpload']) ? [] : [$row['BillUpload']];
        foreach ($oldFiles as $oldFile) {
            if (file_exists($this->BillUpload->oldPhysicalUploadPath() . $oldFile)) {
                @unlink($this->BillUpload->oldPhysicalUploadPath() . $oldFile);
            }
        }
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
        return $_SESSION[$name] ?? GetUrl("StoreGrnList");
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
        if ($pageName == "StoreGrnView") {
            return $Language->phrase("View");
        } elseif ($pageName == "StoreGrnEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "StoreGrnAdd") {
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
                return "StoreGrnView";
            case Config("API_ADD_ACTION"):
                return "StoreGrnAdd";
            case Config("API_EDIT_ACTION"):
                return "StoreGrnEdit";
            case Config("API_DELETE_ACTION"):
                return "StoreGrnDelete";
            case Config("API_LIST_ACTION"):
                return "StoreGrnList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "StoreGrnList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("StoreGrnView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("StoreGrnView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "StoreGrnAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "StoreGrnAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("StoreGrnEdit", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("StoreGrnEdit", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
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
            $url = $this->keyUrl("StoreGrnAdd", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("StoreGrnAdd", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
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
        return $this->keyUrl("StoreGrnDelete", $this->getUrlParm());
    }

    // Add master url
    public function addMasterUrl($url)
    {
        if ($this->getCurrentMasterTable() == "store_payment" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
            $url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
            $url .= "&" . GetForeignKeyUrl("fk_id", $this->Pid->CurrentValue ?? $this->Pid->getSessionValue());
        }
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
        $this->GRNNO->setDbValue($row['GRNNO']);
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
        $this->BILLNO->setDbValue($row['BILLNO']);
        $this->BILLDT->setDbValue($row['BILLDT']);
        $this->BRCODE->setDbValue($row['BRCODE']);
        $this->PharmacyID->setDbValue($row['PharmacyID']);
        $this->BillTotalValue->setDbValue($row['BillTotalValue']);
        $this->GRNTotalValue->setDbValue($row['GRNTotalValue']);
        $this->BillDiscount->setDbValue($row['BillDiscount']);
        $this->BillUpload->Upload->DbValue = $row['BillUpload'];
        $this->BillUpload->setDbValue($this->BillUpload->Upload->DbValue);
        $this->TransPort->setDbValue($row['TransPort']);
        $this->AnyOther->setDbValue($row['AnyOther']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->GrnValue->setDbValue($row['GrnValue']);
        $this->Pid->setDbValue($row['Pid']);
        $this->PaymentNo->setDbValue($row['PaymentNo']);
        $this->PaymentStatus->setDbValue($row['PaymentStatus']);
        $this->PaidAmount->setDbValue($row['PaidAmount']);
        $this->StoreID->setDbValue($row['StoreID']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // GRNNO

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

        // BILLNO

        // BILLDT

        // BRCODE

        // PharmacyID

        // BillTotalValue

        // GRNTotalValue

        // BillDiscount

        // BillUpload

        // TransPort

        // AnyOther

        // Remarks

        // GrnValue

        // Pid

        // PaymentNo

        // PaymentStatus

        // PaidAmount

        // StoreID

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // GRNNO
        $this->GRNNO->ViewValue = $this->GRNNO->CurrentValue;
        $this->GRNNO->ViewCustomAttributes = "";

        // DT
        $this->DT->ViewValue = $this->DT->CurrentValue;
        $this->DT->ViewValue = FormatDateTime($this->DT->ViewValue, 0);
        $this->DT->ViewCustomAttributes = "";

        // YM
        $this->YM->ViewValue = $this->YM->CurrentValue;
        $this->YM->ViewCustomAttributes = "";

        // PC
        $curVal = trim(strval($this->PC->CurrentValue));
        if ($curVal != "") {
            $this->PC->ViewValue = $this->PC->lookupCacheOption($curVal);
            if ($this->PC->ViewValue === null) { // Lookup from database
                $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                $sqlWrk = $this->PC->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->PC->Lookup->renderViewRow($rswrk[0]);
                    $this->PC->ViewValue = $this->PC->displayValue($arwrk);
                } else {
                    $this->PC->ViewValue = $this->PC->CurrentValue;
                }
            }
        } else {
            $this->PC->ViewValue = null;
        }
        $this->PC->ViewCustomAttributes = "";

        // Customercode
        $this->Customercode->ViewValue = $this->Customercode->CurrentValue;
        $this->Customercode->ViewCustomAttributes = "";

        // Customername
        $this->Customername->ViewValue = $this->Customername->CurrentValue;
        $this->Customername->ViewCustomAttributes = "";

        // pharmacy_pocol
        $this->pharmacy_pocol->ViewValue = $this->pharmacy_pocol->CurrentValue;
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

        // BILLNO
        $this->BILLNO->ViewValue = $this->BILLNO->CurrentValue;
        $this->BILLNO->ViewCustomAttributes = "";

        // BILLDT
        $this->BILLDT->ViewValue = $this->BILLDT->CurrentValue;
        $this->BILLDT->ViewValue = FormatDateTime($this->BILLDT->ViewValue, 0);
        $this->BILLDT->ViewCustomAttributes = "";

        // BRCODE
        $curVal = trim(strval($this->BRCODE->CurrentValue));
        if ($curVal != "") {
            $this->BRCODE->ViewValue = $this->BRCODE->lookupCacheOption($curVal);
            if ($this->BRCODE->ViewValue === null) { // Lookup from database
                $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                $lookupFilter = function() {
                    return "`id`='".PharmacyID()."'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->BRCODE->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->BRCODE->Lookup->renderViewRow($rswrk[0]);
                    $this->BRCODE->ViewValue = $this->BRCODE->displayValue($arwrk);
                } else {
                    $this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
                }
            }
        } else {
            $this->BRCODE->ViewValue = null;
        }
        $this->BRCODE->ViewCustomAttributes = "";

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
        if (!EmptyValue($this->BillUpload->Upload->DbValue)) {
            $this->BillUpload->ImageAlt = $this->BillUpload->alt();
            $this->BillUpload->ViewValue = $this->BillUpload->Upload->DbValue;
        } else {
            $this->BillUpload->ViewValue = "";
        }
        $this->BillUpload->ViewCustomAttributes = "";

        // TransPort
        $this->TransPort->ViewValue = $this->TransPort->CurrentValue;
        $this->TransPort->ViewValue = FormatNumber($this->TransPort->ViewValue, 2, -2, -2, -2);
        $this->TransPort->ViewCustomAttributes = "";

        // AnyOther
        $this->AnyOther->ViewValue = $this->AnyOther->CurrentValue;
        $this->AnyOther->ViewValue = FormatNumber($this->AnyOther->ViewValue, 2, -2, -2, -2);
        $this->AnyOther->ViewCustomAttributes = "";

        // Remarks
        $this->Remarks->ViewValue = $this->Remarks->CurrentValue;
        $this->Remarks->ViewCustomAttributes = "";

        // GrnValue
        $this->GrnValue->ViewValue = $this->GrnValue->CurrentValue;
        $this->GrnValue->ViewValue = FormatNumber($this->GrnValue->ViewValue, 2, -2, -2, -2);
        $this->GrnValue->ViewCustomAttributes = "";

        // Pid
        $this->Pid->ViewValue = $this->Pid->CurrentValue;
        $this->Pid->ViewValue = FormatNumber($this->Pid->ViewValue, 0, -2, -2, -2);
        $this->Pid->ViewCustomAttributes = "";

        // PaymentNo
        $this->PaymentNo->ViewValue = $this->PaymentNo->CurrentValue;
        $this->PaymentNo->ViewCustomAttributes = "";

        // PaymentStatus
        $this->PaymentStatus->ViewValue = $this->PaymentStatus->CurrentValue;
        $this->PaymentStatus->ViewCustomAttributes = "";

        // PaidAmount
        $this->PaidAmount->ViewValue = $this->PaidAmount->CurrentValue;
        $this->PaidAmount->ViewValue = FormatNumber($this->PaidAmount->ViewValue, 2, -2, -2, -2);
        $this->PaidAmount->ViewCustomAttributes = "";

        // StoreID
        $this->StoreID->ViewValue = $this->StoreID->CurrentValue;
        $this->StoreID->ViewValue = FormatNumber($this->StoreID->ViewValue, 0, -2, -2, -2);
        $this->StoreID->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // GRNNO
        $this->GRNNO->LinkCustomAttributes = "";
        $this->GRNNO->HrefValue = "";
        $this->GRNNO->TooltipValue = "";

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

        // BILLNO
        $this->BILLNO->LinkCustomAttributes = "";
        $this->BILLNO->HrefValue = "";
        $this->BILLNO->TooltipValue = "";

        // BILLDT
        $this->BILLDT->LinkCustomAttributes = "";
        $this->BILLDT->HrefValue = "";
        $this->BILLDT->TooltipValue = "";

        // BRCODE
        $this->BRCODE->LinkCustomAttributes = "";
        $this->BRCODE->HrefValue = "";
        $this->BRCODE->TooltipValue = "";

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
        if (!EmptyValue($this->BillUpload->Upload->DbValue)) {
            $this->BillUpload->HrefValue = GetFileUploadUrl($this->BillUpload, $this->BillUpload->htmlDecode($this->BillUpload->Upload->DbValue)); // Add prefix/suffix
            $this->BillUpload->LinkAttrs["target"] = ""; // Add target
            if ($this->isExport()) {
                $this->BillUpload->HrefValue = FullUrl($this->BillUpload->HrefValue, "href");
            }
        } else {
            $this->BillUpload->HrefValue = "";
        }
        $this->BillUpload->ExportHrefValue = $this->BillUpload->UploadPath . $this->BillUpload->Upload->DbValue;
        $this->BillUpload->TooltipValue = "";
        if ($this->BillUpload->UseColorbox) {
            if (EmptyValue($this->BillUpload->TooltipValue)) {
                $this->BillUpload->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
            }
            $this->BillUpload->LinkAttrs["data-rel"] = "store_grn_x_BillUpload";
            $this->BillUpload->LinkAttrs->appendClass("ew-lightbox");
        }

        // TransPort
        $this->TransPort->LinkCustomAttributes = "";
        $this->TransPort->HrefValue = "";
        $this->TransPort->TooltipValue = "";

        // AnyOther
        $this->AnyOther->LinkCustomAttributes = "";
        $this->AnyOther->HrefValue = "";
        $this->AnyOther->TooltipValue = "";

        // Remarks
        $this->Remarks->LinkCustomAttributes = "";
        $this->Remarks->HrefValue = "";
        $this->Remarks->TooltipValue = "";

        // GrnValue
        $this->GrnValue->LinkCustomAttributes = "";
        $this->GrnValue->HrefValue = "";
        $this->GrnValue->TooltipValue = "";

        // Pid
        $this->Pid->LinkCustomAttributes = "";
        $this->Pid->HrefValue = "";
        $this->Pid->TooltipValue = "";

        // PaymentNo
        $this->PaymentNo->LinkCustomAttributes = "";
        $this->PaymentNo->HrefValue = "";
        $this->PaymentNo->TooltipValue = "";

        // PaymentStatus
        $this->PaymentStatus->LinkCustomAttributes = "";
        $this->PaymentStatus->HrefValue = "";
        $this->PaymentStatus->TooltipValue = "";

        // PaidAmount
        $this->PaidAmount->LinkCustomAttributes = "";
        $this->PaidAmount->HrefValue = "";
        $this->PaidAmount->TooltipValue = "";

        // StoreID
        $this->StoreID->LinkCustomAttributes = "";
        $this->StoreID->HrefValue = "";
        $this->StoreID->TooltipValue = "";

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

        // GRNNO
        $this->GRNNO->EditAttrs["class"] = "form-control";
        $this->GRNNO->EditCustomAttributes = "";
        if (!$this->GRNNO->Raw) {
            $this->GRNNO->CurrentValue = HtmlDecode($this->GRNNO->CurrentValue);
        }
        $this->GRNNO->EditValue = $this->GRNNO->CurrentValue;
        $this->GRNNO->PlaceHolder = RemoveHtml($this->GRNNO->caption());

        // DT
        $this->DT->EditAttrs["class"] = "form-control";
        $this->DT->EditCustomAttributes = "";
        $this->DT->EditValue = FormatDateTime($this->DT->CurrentValue, 8);
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
        if (!$this->Customername->Raw) {
            $this->Customername->CurrentValue = HtmlDecode($this->Customername->CurrentValue);
        }
        $this->Customername->EditValue = $this->Customername->CurrentValue;
        $this->Customername->PlaceHolder = RemoveHtml($this->Customername->caption());

        // pharmacy_pocol
        $this->pharmacy_pocol->EditAttrs["class"] = "form-control";
        $this->pharmacy_pocol->EditCustomAttributes = "";
        if (!$this->pharmacy_pocol->Raw) {
            $this->pharmacy_pocol->CurrentValue = HtmlDecode($this->pharmacy_pocol->CurrentValue);
        }
        $this->pharmacy_pocol->EditValue = $this->pharmacy_pocol->CurrentValue;
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

        // BILLNO
        $this->BILLNO->EditAttrs["class"] = "form-control";
        $this->BILLNO->EditCustomAttributes = "";
        if (!$this->BILLNO->Raw) {
            $this->BILLNO->CurrentValue = HtmlDecode($this->BILLNO->CurrentValue);
        }
        $this->BILLNO->EditValue = $this->BILLNO->CurrentValue;
        $this->BILLNO->PlaceHolder = RemoveHtml($this->BILLNO->caption());

        // BILLDT
        $this->BILLDT->EditAttrs["class"] = "form-control";
        $this->BILLDT->EditCustomAttributes = "";
        $this->BILLDT->EditValue = FormatDateTime($this->BILLDT->CurrentValue, 8);
        $this->BILLDT->PlaceHolder = RemoveHtml($this->BILLDT->caption());

        // BRCODE
        $this->BRCODE->EditAttrs["class"] = "form-control";
        $this->BRCODE->EditCustomAttributes = "";
        $this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

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
        if (!EmptyValue($this->BillUpload->Upload->DbValue)) {
            $this->BillUpload->ImageAlt = $this->BillUpload->alt();
            $this->BillUpload->EditValue = $this->BillUpload->Upload->DbValue;
        } else {
            $this->BillUpload->EditValue = "";
        }
        if (!EmptyValue($this->BillUpload->CurrentValue)) {
            $this->BillUpload->Upload->FileName = $this->BillUpload->CurrentValue;
        }

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

        // Remarks
        $this->Remarks->EditAttrs["class"] = "form-control";
        $this->Remarks->EditCustomAttributes = "";
        if (!$this->Remarks->Raw) {
            $this->Remarks->CurrentValue = HtmlDecode($this->Remarks->CurrentValue);
        }
        $this->Remarks->EditValue = $this->Remarks->CurrentValue;
        $this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

        // GrnValue
        $this->GrnValue->EditAttrs["class"] = "form-control";
        $this->GrnValue->EditCustomAttributes = "";
        $this->GrnValue->EditValue = $this->GrnValue->CurrentValue;
        $this->GrnValue->PlaceHolder = RemoveHtml($this->GrnValue->caption());
        if (strval($this->GrnValue->EditValue) != "" && is_numeric($this->GrnValue->EditValue)) {
            $this->GrnValue->EditValue = FormatNumber($this->GrnValue->EditValue, -2, -2, -2, -2);
        }

        // Pid
        $this->Pid->EditAttrs["class"] = "form-control";
        $this->Pid->EditCustomAttributes = "";
        if ($this->Pid->getSessionValue() != "") {
            $this->Pid->CurrentValue = GetForeignKeyValue($this->Pid->getSessionValue());
            $this->Pid->ViewValue = $this->Pid->CurrentValue;
            $this->Pid->ViewValue = FormatNumber($this->Pid->ViewValue, 0, -2, -2, -2);
            $this->Pid->ViewCustomAttributes = "";
        } else {
            $this->Pid->EditValue = $this->Pid->CurrentValue;
            $this->Pid->PlaceHolder = RemoveHtml($this->Pid->caption());
        }

        // PaymentNo
        $this->PaymentNo->EditAttrs["class"] = "form-control";
        $this->PaymentNo->EditCustomAttributes = "";
        if (!$this->PaymentNo->Raw) {
            $this->PaymentNo->CurrentValue = HtmlDecode($this->PaymentNo->CurrentValue);
        }
        $this->PaymentNo->EditValue = $this->PaymentNo->CurrentValue;
        $this->PaymentNo->PlaceHolder = RemoveHtml($this->PaymentNo->caption());

        // PaymentStatus
        $this->PaymentStatus->EditAttrs["class"] = "form-control";
        $this->PaymentStatus->EditCustomAttributes = "";
        if (!$this->PaymentStatus->Raw) {
            $this->PaymentStatus->CurrentValue = HtmlDecode($this->PaymentStatus->CurrentValue);
        }
        $this->PaymentStatus->EditValue = $this->PaymentStatus->CurrentValue;
        $this->PaymentStatus->PlaceHolder = RemoveHtml($this->PaymentStatus->caption());

        // PaidAmount
        $this->PaidAmount->EditAttrs["class"] = "form-control";
        $this->PaidAmount->EditCustomAttributes = "";
        $this->PaidAmount->EditValue = $this->PaidAmount->CurrentValue;
        $this->PaidAmount->PlaceHolder = RemoveHtml($this->PaidAmount->caption());
        if (strval($this->PaidAmount->EditValue) != "" && is_numeric($this->PaidAmount->EditValue)) {
            $this->PaidAmount->EditValue = FormatNumber($this->PaidAmount->EditValue, -2, -2, -2, -2);
        }

        // StoreID
        $this->StoreID->EditAttrs["class"] = "form-control";
        $this->StoreID->EditCustomAttributes = "";
        $this->StoreID->EditValue = $this->StoreID->CurrentValue;
        $this->StoreID->PlaceHolder = RemoveHtml($this->StoreID->caption());

        // Call Row Rendered event
        $this->rowRendered();
    }

    // Aggregate list row values
    public function aggregateListRowValues()
    {
            if (is_numeric($this->BillTotalValue->CurrentValue)) {
                $this->BillTotalValue->Total += $this->BillTotalValue->CurrentValue; // Accumulate total
            }
            if (is_numeric($this->GRNTotalValue->CurrentValue)) {
                $this->GRNTotalValue->Total += $this->GRNTotalValue->CurrentValue; // Accumulate total
            }
            if (is_numeric($this->BillDiscount->CurrentValue)) {
                $this->BillDiscount->Total += $this->BillDiscount->CurrentValue; // Accumulate total
            }
    }

    // Aggregate list row (for rendering)
    public function aggregateListRow()
    {
            $this->BillTotalValue->CurrentValue = $this->BillTotalValue->Total;
            $this->BillTotalValue->ViewValue = $this->BillTotalValue->CurrentValue;
            $this->BillTotalValue->ViewValue = FormatNumber($this->BillTotalValue->ViewValue, 2, -2, -2, -2);
            $this->BillTotalValue->ViewCustomAttributes = "";
            $this->BillTotalValue->HrefValue = ""; // Clear href value
            $this->GRNTotalValue->CurrentValue = $this->GRNTotalValue->Total;
            $this->GRNTotalValue->ViewValue = $this->GRNTotalValue->CurrentValue;
            $this->GRNTotalValue->ViewValue = FormatNumber($this->GRNTotalValue->ViewValue, 2, -2, -2, -2);
            $this->GRNTotalValue->ViewCustomAttributes = "";
            $this->GRNTotalValue->HrefValue = ""; // Clear href value
            $this->BillDiscount->CurrentValue = $this->BillDiscount->Total;
            $this->BillDiscount->ViewValue = $this->BillDiscount->CurrentValue;
            $this->BillDiscount->ViewValue = FormatNumber($this->BillDiscount->ViewValue, 2, -2, -2, -2);
            $this->BillDiscount->ViewCustomAttributes = "";
            $this->BillDiscount->HrefValue = ""; // Clear href value

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
                    $doc->exportCaption($this->GRNNO);
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
                    $doc->exportCaption($this->BILLNO);
                    $doc->exportCaption($this->BILLDT);
                    $doc->exportCaption($this->BRCODE);
                    $doc->exportCaption($this->PharmacyID);
                    $doc->exportCaption($this->BillTotalValue);
                    $doc->exportCaption($this->GRNTotalValue);
                    $doc->exportCaption($this->BillDiscount);
                    $doc->exportCaption($this->BillUpload);
                    $doc->exportCaption($this->TransPort);
                    $doc->exportCaption($this->AnyOther);
                    $doc->exportCaption($this->Remarks);
                    $doc->exportCaption($this->GrnValue);
                    $doc->exportCaption($this->Pid);
                    $doc->exportCaption($this->PaymentNo);
                    $doc->exportCaption($this->PaymentStatus);
                    $doc->exportCaption($this->PaidAmount);
                    $doc->exportCaption($this->StoreID);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->GRNNO);
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
                    $doc->exportCaption($this->BILLNO);
                    $doc->exportCaption($this->BILLDT);
                    $doc->exportCaption($this->BRCODE);
                    $doc->exportCaption($this->PharmacyID);
                    $doc->exportCaption($this->BillTotalValue);
                    $doc->exportCaption($this->GRNTotalValue);
                    $doc->exportCaption($this->BillDiscount);
                    $doc->exportCaption($this->TransPort);
                    $doc->exportCaption($this->AnyOther);
                    $doc->exportCaption($this->Remarks);
                    $doc->exportCaption($this->GrnValue);
                    $doc->exportCaption($this->Pid);
                    $doc->exportCaption($this->PaymentNo);
                    $doc->exportCaption($this->PaymentStatus);
                    $doc->exportCaption($this->PaidAmount);
                    $doc->exportCaption($this->StoreID);
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
                        $doc->exportField($this->GRNNO);
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
                        $doc->exportField($this->BILLNO);
                        $doc->exportField($this->BILLDT);
                        $doc->exportField($this->BRCODE);
                        $doc->exportField($this->PharmacyID);
                        $doc->exportField($this->BillTotalValue);
                        $doc->exportField($this->GRNTotalValue);
                        $doc->exportField($this->BillDiscount);
                        $doc->exportField($this->BillUpload);
                        $doc->exportField($this->TransPort);
                        $doc->exportField($this->AnyOther);
                        $doc->exportField($this->Remarks);
                        $doc->exportField($this->GrnValue);
                        $doc->exportField($this->Pid);
                        $doc->exportField($this->PaymentNo);
                        $doc->exportField($this->PaymentStatus);
                        $doc->exportField($this->PaidAmount);
                        $doc->exportField($this->StoreID);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->GRNNO);
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
                        $doc->exportField($this->BILLNO);
                        $doc->exportField($this->BILLDT);
                        $doc->exportField($this->BRCODE);
                        $doc->exportField($this->PharmacyID);
                        $doc->exportField($this->BillTotalValue);
                        $doc->exportField($this->GRNTotalValue);
                        $doc->exportField($this->BillDiscount);
                        $doc->exportField($this->TransPort);
                        $doc->exportField($this->AnyOther);
                        $doc->exportField($this->Remarks);
                        $doc->exportField($this->GrnValue);
                        $doc->exportField($this->Pid);
                        $doc->exportField($this->PaymentNo);
                        $doc->exportField($this->PaymentStatus);
                        $doc->exportField($this->PaidAmount);
                        $doc->exportField($this->StoreID);
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
                $doc->exportAggregate($this->GRNNO, '');
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
                $doc->exportAggregate($this->BILLNO, '');
                $doc->exportAggregate($this->BILLDT, '');
                $doc->exportAggregate($this->BRCODE, '');
                $doc->exportAggregate($this->PharmacyID, '');
                $doc->exportAggregate($this->BillTotalValue, 'TOTAL');
                $doc->exportAggregate($this->GRNTotalValue, 'TOTAL');
                $doc->exportAggregate($this->BillDiscount, 'TOTAL');
                $doc->exportAggregate($this->TransPort, '');
                $doc->exportAggregate($this->AnyOther, '');
                $doc->exportAggregate($this->Remarks, '');
                $doc->exportAggregate($this->GrnValue, '');
                $doc->exportAggregate($this->Pid, '');
                $doc->exportAggregate($this->PaymentNo, '');
                $doc->exportAggregate($this->PaymentStatus, '');
                $doc->exportAggregate($this->PaidAmount, '');
                $doc->exportAggregate($this->StoreID, '');
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
        $width = ($width > 0) ? $width : Config("THUMBNAIL_DEFAULT_WIDTH");
        $height = ($height > 0) ? $height : Config("THUMBNAIL_DEFAULT_HEIGHT");

        // Set up field name / file name field / file type field
        $fldName = "";
        $fileNameFld = "";
        $fileTypeFld = "";
        if ($fldparm == 'BillUpload') {
            $fldName = "BillUpload";
            $fileNameFld = "BillUpload";
        } else {
            return false; // Incorrect field
        }

        // Set up key values
        $ar = explode(Config("COMPOSITE_KEY_SEPARATOR"), $key);
        if (count($ar) == 1) {
            $this->id->CurrentValue = $ar[0];
        } else {
            return false; // Incorrect key
        }

        // Set up filter (WHERE Clause)
        $filter = $this->getRecordFilter();
        $this->CurrentFilter = $filter;
        $sql = $this->getCurrentSql();
        $conn = $this->getConnection();
        $dbtype = GetConnectionType($this->Dbid);
        if ($row = $conn->fetchAssoc($sql)) {
            $val = $row[$fldName];
            if (!EmptyValue($val)) {
                $fld = $this->Fields[$fldName];

                // Binary data
                if ($fld->DataType == DATATYPE_BLOB) {
                    if ($dbtype != "MYSQL") {
                        if (is_resource($val) && get_resource_type($val) == "stream") { // Byte array
                            $val = stream_get_contents($val);
                        }
                    }
                    if ($resize) {
                        ResizeBinary($val, $width, $height, 100, $plugins);
                    }

                    // Write file type
                    if ($fileTypeFld != "" && !EmptyValue($row[$fileTypeFld])) {
                        AddHeader("Content-type", $row[$fileTypeFld]);
                    } else {
                        AddHeader("Content-type", ContentType($val));
                    }

                    // Write file name
                    $downloadPdf = !Config("EMBED_PDF") && Config("DOWNLOAD_PDF_FILE");
                    if ($fileNameFld != "" && !EmptyValue($row[$fileNameFld])) {
                        $fileName = $row[$fileNameFld];
                        $pathinfo = pathinfo($fileName);
                        $ext = strtolower(@$pathinfo["extension"]);
                        $isPdf = SameText($ext, "pdf");
                        if ($downloadPdf || !$isPdf) { // Skip header if not download PDF
                            AddHeader("Content-Disposition", "attachment; filename=\"" . $fileName . "\"");
                        }
                    } else {
                        $ext = ContentExtension($val);
                        $isPdf = SameText($ext, ".pdf");
                        if ($isPdf && $downloadPdf) { // Add header if download PDF
                            AddHeader("Content-Disposition", "attachment; filename=\"" . $fileName . "\"");
                        }
                    }

                    // Write file data
                    if (
                        StartsString("PK", $val) &&
                        ContainsString($val, "[Content_Types].xml") &&
                        ContainsString($val, "_rels") &&
                        ContainsString($val, "docProps")
                    ) { // Fix Office 2007 documents
                        if (!EndsString("\0\0\0", $val)) { // Not ends with 3 or 4 \0
                            $val .= "\0\0\0\0";
                        }
                    }

                    // Clear any debug message
                    if (ob_get_length()) {
                        ob_end_clean();
                    }

                    // Write binary data
                    Write($val);

                // Upload to folder
                } else {
                    if ($fld->UploadMultiple) {
                        $files = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $val);
                    } else {
                        $files = [$val];
                    }
                    $data = [];
                    $ar = [];
                    foreach ($files as $file) {
                        if (!EmptyValue($file)) {
                            if (Config("ENCRYPT_FILE_PATH")) {
                                $ar[$file] = FullUrl(GetApiUrl(Config("API_FILE_ACTION") .
                                    "/" . $this->TableVar . "/" . Encrypt($fld->physicalUploadPath() . $file)));
                            } else {
                                $ar[$file] = FullUrl($fld->hrefPath() . $file);
                            }
                        }
                    }
                    $data[$fld->Param] = $ar;
                    WriteJson($data);
                }
            }
            return true;
        }
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
    	if($rsnew["GRNTotalValue"] != $rsnew["BillTotalValue"])
    	{
    	 $this->CancelMessage = "Bill Total Value and GRNTotal Value is not equal...";
    	   return FALSE;
    	}
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
    				$rsnew["GRNNO"]  =  $hospital_PreFixCode . 'GRN'. getYearSTGRNNo($HospID);
    	return TRUE;
    }

    // Row Inserted event
    public function rowInserted($rsold, &$rsnew) {
    	//echo "Row Inserted"
    	$DT =	$rsnew["DT"];
    	$YM  = $rsnew["YM"];
    	$PC  = $rsnew["PC"];
    	$Customercode  = $rsnew["Customercode"];
    	$Customername  = $rsnew["Customername"];
    	$pharmacy_pocol  = $rsnew["pharmacy_pocol"];
    	$createdby  = $rsnew["createdby"];
    	$createddatetime  = $rsnew["createddatetime"];
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
