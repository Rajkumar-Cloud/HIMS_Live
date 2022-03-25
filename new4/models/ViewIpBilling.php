<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_ip_billing
 */
class ViewIpBilling extends DbTable
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
    public $PatientID;
    public $patient_name;
    public $mrnNo;
    public $mobileno;
    public $profilePic;
    public $gender;
    public $age;
    public $physician_id;
    public $typeRegsisteration;
    public $PaymentCategory;
    public $admission_consultant_id;
    public $leading_consultant_id;
    public $cause;
    public $admission_date;
    public $release_date;
    public $PaymentStatus;
    public $status;
    public $createdby;
    public $createddatetime;
    public $modifiedby;
    public $modifieddatetime;
    public $HospID;
    public $ReferedByDr;
    public $ReferClinicname;
    public $ReferCity;
    public $ReferMobileNo;
    public $ReferA4TreatingConsultant;
    public $PurposreReferredfor;
    public $patient_id;
    public $BillClosing;
    public $BillClosingDate;
    public $BillNumber;
    public $ClosingAmount;
    public $ClosingType;
    public $BillAmount;
    public $billclosedBy;
    public $bllcloseByDate;
    public $ReportHeader;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'view_ip_billing';
        $this->TableName = 'view_ip_billing';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_ip_billing`";
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
        $this->id = new DbField('view_ip_billing', 'view_ip_billing', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // PatientID
        $this->PatientID = new DbField('view_ip_billing', 'view_ip_billing', 'x_PatientID', 'PatientID', '`PatientID`', '`PatientID`', 200, 45, -1, false, '`PatientID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientID->Sortable = true; // Allow sort
        $this->PatientID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientID->Param, "CustomMsg");
        $this->Fields['PatientID'] = &$this->PatientID;

        // patient_name
        $this->patient_name = new DbField('view_ip_billing', 'view_ip_billing', 'x_patient_name', 'patient_name', '`patient_name`', '`patient_name`', 200, 45, -1, false, '`patient_name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->patient_name->Sortable = true; // Allow sort
        $this->patient_name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->patient_name->Param, "CustomMsg");
        $this->Fields['patient_name'] = &$this->patient_name;

        // mrnNo
        $this->mrnNo = new DbField('view_ip_billing', 'view_ip_billing', 'x_mrnNo', 'mrnNo', '`mrnNo`', '`mrnNo`', 200, 45, -1, false, '`mrnNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->mrnNo->Nullable = false; // NOT NULL field
        $this->mrnNo->Required = true; // Required field
        $this->mrnNo->Sortable = true; // Allow sort
        $this->mrnNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->mrnNo->Param, "CustomMsg");
        $this->Fields['mrnNo'] = &$this->mrnNo;

        // mobileno
        $this->mobileno = new DbField('view_ip_billing', 'view_ip_billing', 'x_mobileno', 'mobileno', '`mobileno`', '`mobileno`', 200, 45, -1, false, '`mobileno`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->mobileno->Sortable = true; // Allow sort
        $this->mobileno->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->mobileno->Param, "CustomMsg");
        $this->Fields['mobileno'] = &$this->mobileno;

        // profilePic
        $this->profilePic = new DbField('view_ip_billing', 'view_ip_billing', 'x_profilePic', 'profilePic', '`profilePic`', '`profilePic`', 201, 450, -1, false, '`profilePic`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->profilePic->Sortable = true; // Allow sort
        $this->profilePic->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->profilePic->Param, "CustomMsg");
        $this->Fields['profilePic'] = &$this->profilePic;

        // gender
        $this->gender = new DbField('view_ip_billing', 'view_ip_billing', 'x_gender', 'gender', '`gender`', '`gender`', 200, 45, -1, false, '`gender`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->gender->Sortable = true; // Allow sort
        $this->gender->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->gender->Param, "CustomMsg");
        $this->Fields['gender'] = &$this->gender;

        // age
        $this->age = new DbField('view_ip_billing', 'view_ip_billing', 'x_age', 'age', '`age`', '`age`', 200, 45, -1, false, '`age`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->age->Sortable = true; // Allow sort
        $this->age->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->age->Param, "CustomMsg");
        $this->Fields['age'] = &$this->age;

        // physician_id
        $this->physician_id = new DbField('view_ip_billing', 'view_ip_billing', 'x_physician_id', 'physician_id', '`physician_id`', '`physician_id`', 3, 11, -1, false, '`physician_id`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->physician_id->Sortable = true; // Allow sort
        $this->physician_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->physician_id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->physician_id->Param, "CustomMsg");
        $this->Fields['physician_id'] = &$this->physician_id;

        // typeRegsisteration
        $this->typeRegsisteration = new DbField('view_ip_billing', 'view_ip_billing', 'x_typeRegsisteration', 'typeRegsisteration', '`typeRegsisteration`', '`typeRegsisteration`', 200, 45, -1, false, '`typeRegsisteration`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->typeRegsisteration->Sortable = true; // Allow sort
        $this->typeRegsisteration->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->typeRegsisteration->Param, "CustomMsg");
        $this->Fields['typeRegsisteration'] = &$this->typeRegsisteration;

        // PaymentCategory
        $this->PaymentCategory = new DbField('view_ip_billing', 'view_ip_billing', 'x_PaymentCategory', 'PaymentCategory', '`PaymentCategory`', '`PaymentCategory`', 200, 45, -1, false, '`PaymentCategory`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PaymentCategory->Sortable = true; // Allow sort
        $this->PaymentCategory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PaymentCategory->Param, "CustomMsg");
        $this->Fields['PaymentCategory'] = &$this->PaymentCategory;

        // admission_consultant_id
        $this->admission_consultant_id = new DbField('view_ip_billing', 'view_ip_billing', 'x_admission_consultant_id', 'admission_consultant_id', '`admission_consultant_id`', '`admission_consultant_id`', 3, 11, -1, false, '`admission_consultant_id`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->admission_consultant_id->Sortable = true; // Allow sort
        $this->admission_consultant_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->admission_consultant_id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->admission_consultant_id->Param, "CustomMsg");
        $this->Fields['admission_consultant_id'] = &$this->admission_consultant_id;

        // leading_consultant_id
        $this->leading_consultant_id = new DbField('view_ip_billing', 'view_ip_billing', 'x_leading_consultant_id', 'leading_consultant_id', '`leading_consultant_id`', '`leading_consultant_id`', 3, 11, -1, false, '`leading_consultant_id`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->leading_consultant_id->Sortable = true; // Allow sort
        $this->leading_consultant_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->leading_consultant_id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->leading_consultant_id->Param, "CustomMsg");
        $this->Fields['leading_consultant_id'] = &$this->leading_consultant_id;

        // cause
        $this->cause = new DbField('view_ip_billing', 'view_ip_billing', 'x_cause', 'cause', '`cause`', '`cause`', 201, 65535, -1, false, '`cause`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->cause->Sortable = true; // Allow sort
        $this->cause->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->cause->Param, "CustomMsg");
        $this->Fields['cause'] = &$this->cause;

        // admission_date
        $this->admission_date = new DbField('view_ip_billing', 'view_ip_billing', 'x_admission_date', 'admission_date', '`admission_date`', CastDateFieldForLike("`admission_date`", 0, "DB"), 135, 19, 0, false, '`admission_date`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->admission_date->Sortable = true; // Allow sort
        $this->admission_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->admission_date->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->admission_date->Param, "CustomMsg");
        $this->Fields['admission_date'] = &$this->admission_date;

        // release_date
        $this->release_date = new DbField('view_ip_billing', 'view_ip_billing', 'x_release_date', 'release_date', '`release_date`', CastDateFieldForLike("`release_date`", 7, "DB"), 135, 19, 7, false, '`release_date`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->release_date->Required = true; // Required field
        $this->release_date->Sortable = true; // Allow sort
        $this->release_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->release_date->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->release_date->Param, "CustomMsg");
        $this->Fields['release_date'] = &$this->release_date;

        // PaymentStatus
        $this->PaymentStatus = new DbField('view_ip_billing', 'view_ip_billing', 'x_PaymentStatus', 'PaymentStatus', '`PaymentStatus`', '`PaymentStatus`', 3, 11, -1, false, '`PaymentStatus`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PaymentStatus->Sortable = true; // Allow sort
        $this->PaymentStatus->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->PaymentStatus->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PaymentStatus->Param, "CustomMsg");
        $this->Fields['PaymentStatus'] = &$this->PaymentStatus;

        // status
        $this->status = new DbField('view_ip_billing', 'view_ip_billing', 'x_status', 'status', '`status`', '`status`', 3, 11, -1, false, '`status`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->status->Sortable = true; // Allow sort
        $this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->status->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->status->Param, "CustomMsg");
        $this->Fields['status'] = &$this->status;

        // createdby
        $this->createdby = new DbField('view_ip_billing', 'view_ip_billing', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, 11, -1, false, '`createdby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdby->Sortable = true; // Allow sort
        $this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->createdby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createdby->Param, "CustomMsg");
        $this->Fields['createdby'] = &$this->createdby;

        // createddatetime
        $this->createddatetime = new DbField('view_ip_billing', 'view_ip_billing', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, false, '`createddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddatetime->Sortable = true; // Allow sort
        $this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->createddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createddatetime->Param, "CustomMsg");
        $this->Fields['createddatetime'] = &$this->createddatetime;

        // modifiedby
        $this->modifiedby = new DbField('view_ip_billing', 'view_ip_billing', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, 11, -1, false, '`modifiedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifiedby->Sortable = true; // Allow sort
        $this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->modifiedby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifiedby->Param, "CustomMsg");
        $this->Fields['modifiedby'] = &$this->modifiedby;

        // modifieddatetime
        $this->modifieddatetime = new DbField('view_ip_billing', 'view_ip_billing', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, false, '`modifieddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifieddatetime->Sortable = true; // Allow sort
        $this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->modifieddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifieddatetime->Param, "CustomMsg");
        $this->Fields['modifieddatetime'] = &$this->modifieddatetime;

        // HospID
        $this->HospID = new DbField('view_ip_billing', 'view_ip_billing', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 200, 45, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospID->Param, "CustomMsg");
        $this->Fields['HospID'] = &$this->HospID;

        // ReferedByDr
        $this->ReferedByDr = new DbField('view_ip_billing', 'view_ip_billing', 'x_ReferedByDr', 'ReferedByDr', '`ReferedByDr`', '`ReferedByDr`', 200, 45, -1, false, '`ReferedByDr`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReferedByDr->Sortable = true; // Allow sort
        $this->ReferedByDr->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ReferedByDr->Param, "CustomMsg");
        $this->Fields['ReferedByDr'] = &$this->ReferedByDr;

        // ReferClinicname
        $this->ReferClinicname = new DbField('view_ip_billing', 'view_ip_billing', 'x_ReferClinicname', 'ReferClinicname', '`ReferClinicname`', '`ReferClinicname`', 200, 45, -1, false, '`ReferClinicname`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReferClinicname->Sortable = true; // Allow sort
        $this->ReferClinicname->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ReferClinicname->Param, "CustomMsg");
        $this->Fields['ReferClinicname'] = &$this->ReferClinicname;

        // ReferCity
        $this->ReferCity = new DbField('view_ip_billing', 'view_ip_billing', 'x_ReferCity', 'ReferCity', '`ReferCity`', '`ReferCity`', 200, 45, -1, false, '`ReferCity`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReferCity->Sortable = true; // Allow sort
        $this->ReferCity->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ReferCity->Param, "CustomMsg");
        $this->Fields['ReferCity'] = &$this->ReferCity;

        // ReferMobileNo
        $this->ReferMobileNo = new DbField('view_ip_billing', 'view_ip_billing', 'x_ReferMobileNo', 'ReferMobileNo', '`ReferMobileNo`', '`ReferMobileNo`', 200, 45, -1, false, '`ReferMobileNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReferMobileNo->Sortable = true; // Allow sort
        $this->ReferMobileNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ReferMobileNo->Param, "CustomMsg");
        $this->Fields['ReferMobileNo'] = &$this->ReferMobileNo;

        // ReferA4TreatingConsultant
        $this->ReferA4TreatingConsultant = new DbField('view_ip_billing', 'view_ip_billing', 'x_ReferA4TreatingConsultant', 'ReferA4TreatingConsultant', '`ReferA4TreatingConsultant`', '`ReferA4TreatingConsultant`', 200, 45, -1, false, '`ReferA4TreatingConsultant`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReferA4TreatingConsultant->Sortable = true; // Allow sort
        $this->ReferA4TreatingConsultant->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ReferA4TreatingConsultant->Param, "CustomMsg");
        $this->Fields['ReferA4TreatingConsultant'] = &$this->ReferA4TreatingConsultant;

        // PurposreReferredfor
        $this->PurposreReferredfor = new DbField('view_ip_billing', 'view_ip_billing', 'x_PurposreReferredfor', 'PurposreReferredfor', '`PurposreReferredfor`', '`PurposreReferredfor`', 200, 45, -1, false, '`PurposreReferredfor`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PurposreReferredfor->Sortable = true; // Allow sort
        $this->PurposreReferredfor->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PurposreReferredfor->Param, "CustomMsg");
        $this->Fields['PurposreReferredfor'] = &$this->PurposreReferredfor;

        // patient_id
        $this->patient_id = new DbField('view_ip_billing', 'view_ip_billing', 'x_patient_id', 'patient_id', '`patient_id`', '`patient_id`', 3, 11, -1, false, '`patient_id`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->patient_id->Nullable = false; // NOT NULL field
        $this->patient_id->Required = true; // Required field
        $this->patient_id->Sortable = true; // Allow sort
        $this->patient_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->patient_id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->patient_id->Param, "CustomMsg");
        $this->Fields['patient_id'] = &$this->patient_id;

        // BillClosing
        $this->BillClosing = new DbField('view_ip_billing', 'view_ip_billing', 'x_BillClosing', 'BillClosing', '`BillClosing`', '`BillClosing`', 200, 45, -1, false, '`BillClosing`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->BillClosing->Required = true; // Required field
        $this->BillClosing->Sortable = true; // Allow sort
        $this->BillClosing->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->BillClosing->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->BillClosing->Lookup = new Lookup('BillClosing', 'view_ip_billing', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->BillClosing->OptionCount = 2;
        $this->BillClosing->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BillClosing->Param, "CustomMsg");
        $this->Fields['BillClosing'] = &$this->BillClosing;

        // BillClosingDate
        $this->BillClosingDate = new DbField('view_ip_billing', 'view_ip_billing', 'x_BillClosingDate', 'BillClosingDate', '`BillClosingDate`', CastDateFieldForLike("`BillClosingDate`", 7, "DB"), 135, 19, 7, false, '`BillClosingDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BillClosingDate->Required = true; // Required field
        $this->BillClosingDate->Sortable = true; // Allow sort
        $this->BillClosingDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->BillClosingDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BillClosingDate->Param, "CustomMsg");
        $this->Fields['BillClosingDate'] = &$this->BillClosingDate;

        // BillNumber
        $this->BillNumber = new DbField('view_ip_billing', 'view_ip_billing', 'x_BillNumber', 'BillNumber', '`BillNumber`', '`BillNumber`', 200, 45, -1, false, '`BillNumber`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BillNumber->Sortable = true; // Allow sort
        $this->BillNumber->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BillNumber->Param, "CustomMsg");
        $this->Fields['BillNumber'] = &$this->BillNumber;

        // ClosingAmount
        $this->ClosingAmount = new DbField('view_ip_billing', 'view_ip_billing', 'x_ClosingAmount', 'ClosingAmount', '`ClosingAmount`', '`ClosingAmount`', 200, 45, -1, false, '`ClosingAmount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ClosingAmount->Sortable = true; // Allow sort
        $this->ClosingAmount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ClosingAmount->Param, "CustomMsg");
        $this->Fields['ClosingAmount'] = &$this->ClosingAmount;

        // ClosingType
        $this->ClosingType = new DbField('view_ip_billing', 'view_ip_billing', 'x_ClosingType', 'ClosingType', '`ClosingType`', '`ClosingType`', 200, 45, -1, false, '`ClosingType`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ClosingType->Sortable = true; // Allow sort
        $this->ClosingType->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ClosingType->Param, "CustomMsg");
        $this->Fields['ClosingType'] = &$this->ClosingType;

        // BillAmount
        $this->BillAmount = new DbField('view_ip_billing', 'view_ip_billing', 'x_BillAmount', 'BillAmount', '`BillAmount`', '`BillAmount`', 200, 45, -1, false, '`BillAmount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BillAmount->Sortable = true; // Allow sort
        $this->BillAmount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BillAmount->Param, "CustomMsg");
        $this->Fields['BillAmount'] = &$this->BillAmount;

        // billclosedBy
        $this->billclosedBy = new DbField('view_ip_billing', 'view_ip_billing', 'x_billclosedBy', 'billclosedBy', '`billclosedBy`', '`billclosedBy`', 200, 45, -1, false, '`billclosedBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->billclosedBy->Sortable = true; // Allow sort
        $this->billclosedBy->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->billclosedBy->Param, "CustomMsg");
        $this->Fields['billclosedBy'] = &$this->billclosedBy;

        // bllcloseByDate
        $this->bllcloseByDate = new DbField('view_ip_billing', 'view_ip_billing', 'x_bllcloseByDate', 'bllcloseByDate', '`bllcloseByDate`', CastDateFieldForLike("`bllcloseByDate`", 0, "DB"), 135, 19, 0, false, '`bllcloseByDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->bllcloseByDate->Sortable = true; // Allow sort
        $this->bllcloseByDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->bllcloseByDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->bllcloseByDate->Param, "CustomMsg");
        $this->Fields['bllcloseByDate'] = &$this->bllcloseByDate;

        // ReportHeader
        $this->ReportHeader = new DbField('view_ip_billing', 'view_ip_billing', 'x_ReportHeader', 'ReportHeader', '`ReportHeader`', '`ReportHeader`', 200, 45, -1, false, '`ReportHeader`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->ReportHeader->Sortable = true; // Allow sort
        $this->ReportHeader->Lookup = new Lookup('ReportHeader', 'view_ip_billing', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->ReportHeader->OptionCount = 1;
        $this->ReportHeader->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ReportHeader->Param, "CustomMsg");
        $this->Fields['ReportHeader'] = &$this->ReportHeader;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_ip_billing`";
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
        $this->PatientID->DbValue = $row['PatientID'];
        $this->patient_name->DbValue = $row['patient_name'];
        $this->mrnNo->DbValue = $row['mrnNo'];
        $this->mobileno->DbValue = $row['mobileno'];
        $this->profilePic->DbValue = $row['profilePic'];
        $this->gender->DbValue = $row['gender'];
        $this->age->DbValue = $row['age'];
        $this->physician_id->DbValue = $row['physician_id'];
        $this->typeRegsisteration->DbValue = $row['typeRegsisteration'];
        $this->PaymentCategory->DbValue = $row['PaymentCategory'];
        $this->admission_consultant_id->DbValue = $row['admission_consultant_id'];
        $this->leading_consultant_id->DbValue = $row['leading_consultant_id'];
        $this->cause->DbValue = $row['cause'];
        $this->admission_date->DbValue = $row['admission_date'];
        $this->release_date->DbValue = $row['release_date'];
        $this->PaymentStatus->DbValue = $row['PaymentStatus'];
        $this->status->DbValue = $row['status'];
        $this->createdby->DbValue = $row['createdby'];
        $this->createddatetime->DbValue = $row['createddatetime'];
        $this->modifiedby->DbValue = $row['modifiedby'];
        $this->modifieddatetime->DbValue = $row['modifieddatetime'];
        $this->HospID->DbValue = $row['HospID'];
        $this->ReferedByDr->DbValue = $row['ReferedByDr'];
        $this->ReferClinicname->DbValue = $row['ReferClinicname'];
        $this->ReferCity->DbValue = $row['ReferCity'];
        $this->ReferMobileNo->DbValue = $row['ReferMobileNo'];
        $this->ReferA4TreatingConsultant->DbValue = $row['ReferA4TreatingConsultant'];
        $this->PurposreReferredfor->DbValue = $row['PurposreReferredfor'];
        $this->patient_id->DbValue = $row['patient_id'];
        $this->BillClosing->DbValue = $row['BillClosing'];
        $this->BillClosingDate->DbValue = $row['BillClosingDate'];
        $this->BillNumber->DbValue = $row['BillNumber'];
        $this->ClosingAmount->DbValue = $row['ClosingAmount'];
        $this->ClosingType->DbValue = $row['ClosingType'];
        $this->BillAmount->DbValue = $row['BillAmount'];
        $this->billclosedBy->DbValue = $row['billclosedBy'];
        $this->bllcloseByDate->DbValue = $row['bllcloseByDate'];
        $this->ReportHeader->DbValue = $row['ReportHeader'];
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
        return $_SESSION[$name] ?? GetUrl("ViewIpBillingList");
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
        if ($pageName == "ViewIpBillingView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewIpBillingEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewIpBillingAdd") {
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
                return "ViewIpBillingView";
            case Config("API_ADD_ACTION"):
                return "ViewIpBillingAdd";
            case Config("API_EDIT_ACTION"):
                return "ViewIpBillingEdit";
            case Config("API_DELETE_ACTION"):
                return "ViewIpBillingDelete";
            case Config("API_LIST_ACTION"):
                return "ViewIpBillingList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewIpBillingList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewIpBillingView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewIpBillingView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewIpBillingAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewIpBillingAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewIpBillingEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewIpBillingAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewIpBillingDelete", $this->getUrlParm());
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
        $this->PatientID->setDbValue($row['PatientID']);
        $this->patient_name->setDbValue($row['patient_name']);
        $this->mrnNo->setDbValue($row['mrnNo']);
        $this->mobileno->setDbValue($row['mobileno']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->gender->setDbValue($row['gender']);
        $this->age->setDbValue($row['age']);
        $this->physician_id->setDbValue($row['physician_id']);
        $this->typeRegsisteration->setDbValue($row['typeRegsisteration']);
        $this->PaymentCategory->setDbValue($row['PaymentCategory']);
        $this->admission_consultant_id->setDbValue($row['admission_consultant_id']);
        $this->leading_consultant_id->setDbValue($row['leading_consultant_id']);
        $this->cause->setDbValue($row['cause']);
        $this->admission_date->setDbValue($row['admission_date']);
        $this->release_date->setDbValue($row['release_date']);
        $this->PaymentStatus->setDbValue($row['PaymentStatus']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->HospID->setDbValue($row['HospID']);
        $this->ReferedByDr->setDbValue($row['ReferedByDr']);
        $this->ReferClinicname->setDbValue($row['ReferClinicname']);
        $this->ReferCity->setDbValue($row['ReferCity']);
        $this->ReferMobileNo->setDbValue($row['ReferMobileNo']);
        $this->ReferA4TreatingConsultant->setDbValue($row['ReferA4TreatingConsultant']);
        $this->PurposreReferredfor->setDbValue($row['PurposreReferredfor']);
        $this->patient_id->setDbValue($row['patient_id']);
        $this->BillClosing->setDbValue($row['BillClosing']);
        $this->BillClosingDate->setDbValue($row['BillClosingDate']);
        $this->BillNumber->setDbValue($row['BillNumber']);
        $this->ClosingAmount->setDbValue($row['ClosingAmount']);
        $this->ClosingType->setDbValue($row['ClosingType']);
        $this->BillAmount->setDbValue($row['BillAmount']);
        $this->billclosedBy->setDbValue($row['billclosedBy']);
        $this->bllcloseByDate->setDbValue($row['bllcloseByDate']);
        $this->ReportHeader->setDbValue($row['ReportHeader']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // PatientID

        // patient_name

        // mrnNo

        // mobileno

        // profilePic

        // gender

        // age

        // physician_id

        // typeRegsisteration

        // PaymentCategory

        // admission_consultant_id

        // leading_consultant_id

        // cause

        // admission_date

        // release_date

        // PaymentStatus

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // HospID

        // ReferedByDr

        // ReferClinicname

        // ReferCity

        // ReferMobileNo

        // ReferA4TreatingConsultant

        // PurposreReferredfor

        // patient_id

        // BillClosing

        // BillClosingDate

        // BillNumber

        // ClosingAmount

        // ClosingType

        // BillAmount

        // billclosedBy

        // bllcloseByDate

        // ReportHeader

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // PatientID
        $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
        $this->PatientID->ViewCustomAttributes = "";

        // patient_name
        $this->patient_name->ViewValue = $this->patient_name->CurrentValue;
        $this->patient_name->ViewCustomAttributes = "";

        // mrnNo
        $this->mrnNo->ViewValue = $this->mrnNo->CurrentValue;
        $this->mrnNo->ViewCustomAttributes = "";

        // mobileno
        $this->mobileno->ViewValue = $this->mobileno->CurrentValue;
        $this->mobileno->ViewCustomAttributes = "";

        // profilePic
        $this->profilePic->ViewValue = $this->profilePic->CurrentValue;
        $this->profilePic->ViewCustomAttributes = "";

        // gender
        $this->gender->ViewValue = $this->gender->CurrentValue;
        $this->gender->ViewCustomAttributes = "";

        // age
        $this->age->ViewValue = $this->age->CurrentValue;
        $this->age->ViewCustomAttributes = "";

        // physician_id
        $this->physician_id->ViewValue = $this->physician_id->CurrentValue;
        $this->physician_id->ViewValue = FormatNumber($this->physician_id->ViewValue, 0, -2, -2, -2);
        $this->physician_id->ViewCustomAttributes = "";

        // typeRegsisteration
        $this->typeRegsisteration->ViewValue = $this->typeRegsisteration->CurrentValue;
        $this->typeRegsisteration->ViewCustomAttributes = "";

        // PaymentCategory
        $this->PaymentCategory->ViewValue = $this->PaymentCategory->CurrentValue;
        $this->PaymentCategory->ViewCustomAttributes = "";

        // admission_consultant_id
        $this->admission_consultant_id->ViewValue = $this->admission_consultant_id->CurrentValue;
        $this->admission_consultant_id->ViewValue = FormatNumber($this->admission_consultant_id->ViewValue, 0, -2, -2, -2);
        $this->admission_consultant_id->ViewCustomAttributes = "";

        // leading_consultant_id
        $this->leading_consultant_id->ViewValue = $this->leading_consultant_id->CurrentValue;
        $this->leading_consultant_id->ViewValue = FormatNumber($this->leading_consultant_id->ViewValue, 0, -2, -2, -2);
        $this->leading_consultant_id->ViewCustomAttributes = "";

        // cause
        $this->cause->ViewValue = $this->cause->CurrentValue;
        $this->cause->ViewCustomAttributes = "";

        // admission_date
        $this->admission_date->ViewValue = $this->admission_date->CurrentValue;
        $this->admission_date->ViewValue = FormatDateTime($this->admission_date->ViewValue, 0);
        $this->admission_date->ViewCustomAttributes = "";

        // release_date
        $this->release_date->ViewValue = $this->release_date->CurrentValue;
        $this->release_date->ViewValue = FormatDateTime($this->release_date->ViewValue, 7);
        $this->release_date->ViewCustomAttributes = "";

        // PaymentStatus
        $this->PaymentStatus->ViewValue = $this->PaymentStatus->CurrentValue;
        $this->PaymentStatus->ViewValue = FormatNumber($this->PaymentStatus->ViewValue, 0, -2, -2, -2);
        $this->PaymentStatus->ViewCustomAttributes = "";

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

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewCustomAttributes = "";

        // ReferedByDr
        $this->ReferedByDr->ViewValue = $this->ReferedByDr->CurrentValue;
        $this->ReferedByDr->ViewCustomAttributes = "";

        // ReferClinicname
        $this->ReferClinicname->ViewValue = $this->ReferClinicname->CurrentValue;
        $this->ReferClinicname->ViewCustomAttributes = "";

        // ReferCity
        $this->ReferCity->ViewValue = $this->ReferCity->CurrentValue;
        $this->ReferCity->ViewCustomAttributes = "";

        // ReferMobileNo
        $this->ReferMobileNo->ViewValue = $this->ReferMobileNo->CurrentValue;
        $this->ReferMobileNo->ViewCustomAttributes = "";

        // ReferA4TreatingConsultant
        $this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->CurrentValue;
        $this->ReferA4TreatingConsultant->ViewCustomAttributes = "";

        // PurposreReferredfor
        $this->PurposreReferredfor->ViewValue = $this->PurposreReferredfor->CurrentValue;
        $this->PurposreReferredfor->ViewCustomAttributes = "";

        // patient_id
        $this->patient_id->ViewValue = $this->patient_id->CurrentValue;
        $this->patient_id->ViewValue = FormatNumber($this->patient_id->ViewValue, 0, -2, -2, -2);
        $this->patient_id->ViewCustomAttributes = "";

        // BillClosing
        if (strval($this->BillClosing->CurrentValue) != "") {
            $this->BillClosing->ViewValue = $this->BillClosing->optionCaption($this->BillClosing->CurrentValue);
        } else {
            $this->BillClosing->ViewValue = null;
        }
        $this->BillClosing->ViewCustomAttributes = "";

        // BillClosingDate
        $this->BillClosingDate->ViewValue = $this->BillClosingDate->CurrentValue;
        $this->BillClosingDate->ViewValue = FormatDateTime($this->BillClosingDate->ViewValue, 7);
        $this->BillClosingDate->ViewCustomAttributes = "";

        // BillNumber
        $this->BillNumber->ViewValue = $this->BillNumber->CurrentValue;
        $this->BillNumber->ViewCustomAttributes = "";

        // ClosingAmount
        $this->ClosingAmount->ViewValue = $this->ClosingAmount->CurrentValue;
        $this->ClosingAmount->ViewCustomAttributes = "";

        // ClosingType
        $this->ClosingType->ViewValue = $this->ClosingType->CurrentValue;
        $this->ClosingType->ViewCustomAttributes = "";

        // BillAmount
        $this->BillAmount->ViewValue = $this->BillAmount->CurrentValue;
        $this->BillAmount->ViewCustomAttributes = "";

        // billclosedBy
        $this->billclosedBy->ViewValue = $this->billclosedBy->CurrentValue;
        $this->billclosedBy->ViewCustomAttributes = "";

        // bllcloseByDate
        $this->bllcloseByDate->ViewValue = $this->bllcloseByDate->CurrentValue;
        $this->bllcloseByDate->ViewValue = FormatDateTime($this->bllcloseByDate->ViewValue, 0);
        $this->bllcloseByDate->ViewCustomAttributes = "";

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

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // PatientID
        $this->PatientID->LinkCustomAttributes = "";
        $this->PatientID->HrefValue = "";
        $this->PatientID->TooltipValue = "";

        // patient_name
        $this->patient_name->LinkCustomAttributes = "";
        $this->patient_name->HrefValue = "";
        $this->patient_name->TooltipValue = "";

        // mrnNo
        $this->mrnNo->LinkCustomAttributes = "";
        $this->mrnNo->HrefValue = "";
        $this->mrnNo->TooltipValue = "";

        // mobileno
        $this->mobileno->LinkCustomAttributes = "";
        $this->mobileno->HrefValue = "";
        $this->mobileno->TooltipValue = "";

        // profilePic
        $this->profilePic->LinkCustomAttributes = "";
        $this->profilePic->HrefValue = "";
        $this->profilePic->TooltipValue = "";

        // gender
        $this->gender->LinkCustomAttributes = "";
        $this->gender->HrefValue = "";
        $this->gender->TooltipValue = "";

        // age
        $this->age->LinkCustomAttributes = "";
        $this->age->HrefValue = "";
        $this->age->TooltipValue = "";

        // physician_id
        $this->physician_id->LinkCustomAttributes = "";
        $this->physician_id->HrefValue = "";
        $this->physician_id->TooltipValue = "";

        // typeRegsisteration
        $this->typeRegsisteration->LinkCustomAttributes = "";
        $this->typeRegsisteration->HrefValue = "";
        $this->typeRegsisteration->TooltipValue = "";

        // PaymentCategory
        $this->PaymentCategory->LinkCustomAttributes = "";
        $this->PaymentCategory->HrefValue = "";
        $this->PaymentCategory->TooltipValue = "";

        // admission_consultant_id
        $this->admission_consultant_id->LinkCustomAttributes = "";
        $this->admission_consultant_id->HrefValue = "";
        $this->admission_consultant_id->TooltipValue = "";

        // leading_consultant_id
        $this->leading_consultant_id->LinkCustomAttributes = "";
        $this->leading_consultant_id->HrefValue = "";
        $this->leading_consultant_id->TooltipValue = "";

        // cause
        $this->cause->LinkCustomAttributes = "";
        $this->cause->HrefValue = "";
        $this->cause->TooltipValue = "";

        // admission_date
        $this->admission_date->LinkCustomAttributes = "";
        $this->admission_date->HrefValue = "";
        $this->admission_date->TooltipValue = "";

        // release_date
        $this->release_date->LinkCustomAttributes = "";
        $this->release_date->HrefValue = "";
        $this->release_date->TooltipValue = "";

        // PaymentStatus
        $this->PaymentStatus->LinkCustomAttributes = "";
        $this->PaymentStatus->HrefValue = "";
        $this->PaymentStatus->TooltipValue = "";

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

        // HospID
        $this->HospID->LinkCustomAttributes = "";
        $this->HospID->HrefValue = "";
        $this->HospID->TooltipValue = "";

        // ReferedByDr
        $this->ReferedByDr->LinkCustomAttributes = "";
        $this->ReferedByDr->HrefValue = "";
        $this->ReferedByDr->TooltipValue = "";

        // ReferClinicname
        $this->ReferClinicname->LinkCustomAttributes = "";
        $this->ReferClinicname->HrefValue = "";
        $this->ReferClinicname->TooltipValue = "";

        // ReferCity
        $this->ReferCity->LinkCustomAttributes = "";
        $this->ReferCity->HrefValue = "";
        $this->ReferCity->TooltipValue = "";

        // ReferMobileNo
        $this->ReferMobileNo->LinkCustomAttributes = "";
        $this->ReferMobileNo->HrefValue = "";
        $this->ReferMobileNo->TooltipValue = "";

        // ReferA4TreatingConsultant
        $this->ReferA4TreatingConsultant->LinkCustomAttributes = "";
        $this->ReferA4TreatingConsultant->HrefValue = "";
        $this->ReferA4TreatingConsultant->TooltipValue = "";

        // PurposreReferredfor
        $this->PurposreReferredfor->LinkCustomAttributes = "";
        $this->PurposreReferredfor->HrefValue = "";
        $this->PurposreReferredfor->TooltipValue = "";

        // patient_id
        $this->patient_id->LinkCustomAttributes = "";
        $this->patient_id->HrefValue = "";
        $this->patient_id->TooltipValue = "";

        // BillClosing
        $this->BillClosing->LinkCustomAttributes = "";
        $this->BillClosing->HrefValue = "";
        $this->BillClosing->TooltipValue = "";

        // BillClosingDate
        $this->BillClosingDate->LinkCustomAttributes = "";
        $this->BillClosingDate->HrefValue = "";
        $this->BillClosingDate->TooltipValue = "";

        // BillNumber
        $this->BillNumber->LinkCustomAttributes = "";
        $this->BillNumber->HrefValue = "";
        $this->BillNumber->TooltipValue = "";

        // ClosingAmount
        $this->ClosingAmount->LinkCustomAttributes = "";
        $this->ClosingAmount->HrefValue = "";
        $this->ClosingAmount->TooltipValue = "";

        // ClosingType
        $this->ClosingType->LinkCustomAttributes = "";
        $this->ClosingType->HrefValue = "";
        $this->ClosingType->TooltipValue = "";

        // BillAmount
        $this->BillAmount->LinkCustomAttributes = "";
        $this->BillAmount->HrefValue = "";
        $this->BillAmount->TooltipValue = "";

        // billclosedBy
        $this->billclosedBy->LinkCustomAttributes = "";
        $this->billclosedBy->HrefValue = "";
        $this->billclosedBy->TooltipValue = "";

        // bllcloseByDate
        $this->bllcloseByDate->LinkCustomAttributes = "";
        $this->bllcloseByDate->HrefValue = "";
        $this->bllcloseByDate->TooltipValue = "";

        // ReportHeader
        $this->ReportHeader->LinkCustomAttributes = "";
        $this->ReportHeader->HrefValue = "";
        $this->ReportHeader->TooltipValue = "";

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

        // PatientID
        $this->PatientID->EditAttrs["class"] = "form-control";
        $this->PatientID->EditCustomAttributes = "";
        $this->PatientID->EditValue = $this->PatientID->CurrentValue;
        $this->PatientID->ViewCustomAttributes = "";

        // patient_name
        $this->patient_name->EditAttrs["class"] = "form-control";
        $this->patient_name->EditCustomAttributes = "";
        $this->patient_name->EditValue = $this->patient_name->CurrentValue;
        $this->patient_name->ViewCustomAttributes = "";

        // mrnNo
        $this->mrnNo->EditAttrs["class"] = "form-control";
        $this->mrnNo->EditCustomAttributes = "";
        $this->mrnNo->EditValue = $this->mrnNo->CurrentValue;
        $this->mrnNo->ViewCustomAttributes = "";

        // mobileno
        $this->mobileno->EditAttrs["class"] = "form-control";
        $this->mobileno->EditCustomAttributes = "";
        $this->mobileno->EditValue = $this->mobileno->CurrentValue;
        $this->mobileno->ViewCustomAttributes = "";

        // profilePic
        $this->profilePic->EditAttrs["class"] = "form-control";
        $this->profilePic->EditCustomAttributes = "";
        $this->profilePic->EditValue = $this->profilePic->CurrentValue;
        $this->profilePic->ViewCustomAttributes = "";

        // gender
        $this->gender->EditAttrs["class"] = "form-control";
        $this->gender->EditCustomAttributes = "";
        $this->gender->EditValue = $this->gender->CurrentValue;
        $this->gender->ViewCustomAttributes = "";

        // age
        $this->age->EditAttrs["class"] = "form-control";
        $this->age->EditCustomAttributes = "";
        $this->age->EditValue = $this->age->CurrentValue;
        $this->age->ViewCustomAttributes = "";

        // physician_id
        $this->physician_id->EditAttrs["class"] = "form-control";
        $this->physician_id->EditCustomAttributes = "";
        $this->physician_id->EditValue = $this->physician_id->CurrentValue;
        $this->physician_id->EditValue = FormatNumber($this->physician_id->EditValue, 0, -2, -2, -2);
        $this->physician_id->ViewCustomAttributes = "";

        // typeRegsisteration
        $this->typeRegsisteration->EditAttrs["class"] = "form-control";
        $this->typeRegsisteration->EditCustomAttributes = "";
        $this->typeRegsisteration->EditValue = $this->typeRegsisteration->CurrentValue;
        $this->typeRegsisteration->ViewCustomAttributes = "";

        // PaymentCategory
        $this->PaymentCategory->EditAttrs["class"] = "form-control";
        $this->PaymentCategory->EditCustomAttributes = "";
        $this->PaymentCategory->EditValue = $this->PaymentCategory->CurrentValue;
        $this->PaymentCategory->ViewCustomAttributes = "";

        // admission_consultant_id
        $this->admission_consultant_id->EditAttrs["class"] = "form-control";
        $this->admission_consultant_id->EditCustomAttributes = "";
        $this->admission_consultant_id->EditValue = $this->admission_consultant_id->CurrentValue;
        $this->admission_consultant_id->EditValue = FormatNumber($this->admission_consultant_id->EditValue, 0, -2, -2, -2);
        $this->admission_consultant_id->ViewCustomAttributes = "";

        // leading_consultant_id
        $this->leading_consultant_id->EditAttrs["class"] = "form-control";
        $this->leading_consultant_id->EditCustomAttributes = "";
        $this->leading_consultant_id->EditValue = $this->leading_consultant_id->CurrentValue;
        $this->leading_consultant_id->EditValue = FormatNumber($this->leading_consultant_id->EditValue, 0, -2, -2, -2);
        $this->leading_consultant_id->ViewCustomAttributes = "";

        // cause
        $this->cause->EditAttrs["class"] = "form-control";
        $this->cause->EditCustomAttributes = "";
        $this->cause->EditValue = $this->cause->CurrentValue;
        $this->cause->ViewCustomAttributes = "";

        // admission_date
        $this->admission_date->EditAttrs["class"] = "form-control";
        $this->admission_date->EditCustomAttributes = "";
        $this->admission_date->EditValue = $this->admission_date->CurrentValue;
        $this->admission_date->EditValue = FormatDateTime($this->admission_date->EditValue, 0);
        $this->admission_date->ViewCustomAttributes = "";

        // release_date
        $this->release_date->EditAttrs["class"] = "form-control";
        $this->release_date->EditCustomAttributes = "";
        $this->release_date->EditValue = FormatDateTime($this->release_date->CurrentValue, 7);
        $this->release_date->PlaceHolder = RemoveHtml($this->release_date->caption());

        // PaymentStatus
        $this->PaymentStatus->EditAttrs["class"] = "form-control";
        $this->PaymentStatus->EditCustomAttributes = "";
        $this->PaymentStatus->EditValue = $this->PaymentStatus->CurrentValue;
        $this->PaymentStatus->EditValue = FormatNumber($this->PaymentStatus->EditValue, 0, -2, -2, -2);
        $this->PaymentStatus->ViewCustomAttributes = "";

        // status
        $this->status->EditAttrs["class"] = "form-control";
        $this->status->EditCustomAttributes = "";
        $this->status->EditValue = $this->status->CurrentValue;
        $this->status->EditValue = FormatNumber($this->status->EditValue, 0, -2, -2, -2);
        $this->status->ViewCustomAttributes = "";

        // createdby
        $this->createdby->EditAttrs["class"] = "form-control";
        $this->createdby->EditCustomAttributes = "";
        $this->createdby->EditValue = $this->createdby->CurrentValue;
        $this->createdby->EditValue = FormatNumber($this->createdby->EditValue, 0, -2, -2, -2);
        $this->createdby->ViewCustomAttributes = "";

        // createddatetime
        $this->createddatetime->EditAttrs["class"] = "form-control";
        $this->createddatetime->EditCustomAttributes = "";
        $this->createddatetime->EditValue = $this->createddatetime->CurrentValue;
        $this->createddatetime->EditValue = FormatDateTime($this->createddatetime->EditValue, 0);
        $this->createddatetime->ViewCustomAttributes = "";

        // modifiedby
        $this->modifiedby->EditAttrs["class"] = "form-control";
        $this->modifiedby->EditCustomAttributes = "";
        $this->modifiedby->EditValue = $this->modifiedby->CurrentValue;
        $this->modifiedby->EditValue = FormatNumber($this->modifiedby->EditValue, 0, -2, -2, -2);
        $this->modifiedby->ViewCustomAttributes = "";

        // modifieddatetime
        $this->modifieddatetime->EditAttrs["class"] = "form-control";
        $this->modifieddatetime->EditCustomAttributes = "";
        $this->modifieddatetime->EditValue = $this->modifieddatetime->CurrentValue;
        $this->modifieddatetime->EditValue = FormatDateTime($this->modifieddatetime->EditValue, 0);
        $this->modifieddatetime->ViewCustomAttributes = "";

        // HospID
        $this->HospID->EditAttrs["class"] = "form-control";
        $this->HospID->EditCustomAttributes = "";
        $this->HospID->EditValue = $this->HospID->CurrentValue;
        $this->HospID->ViewCustomAttributes = "";

        // ReferedByDr
        $this->ReferedByDr->EditAttrs["class"] = "form-control";
        $this->ReferedByDr->EditCustomAttributes = "";
        $this->ReferedByDr->EditValue = $this->ReferedByDr->CurrentValue;
        $this->ReferedByDr->ViewCustomAttributes = "";

        // ReferClinicname
        $this->ReferClinicname->EditAttrs["class"] = "form-control";
        $this->ReferClinicname->EditCustomAttributes = "";
        $this->ReferClinicname->EditValue = $this->ReferClinicname->CurrentValue;
        $this->ReferClinicname->ViewCustomAttributes = "";

        // ReferCity
        $this->ReferCity->EditAttrs["class"] = "form-control";
        $this->ReferCity->EditCustomAttributes = "";
        $this->ReferCity->EditValue = $this->ReferCity->CurrentValue;
        $this->ReferCity->ViewCustomAttributes = "";

        // ReferMobileNo
        $this->ReferMobileNo->EditAttrs["class"] = "form-control";
        $this->ReferMobileNo->EditCustomAttributes = "";
        $this->ReferMobileNo->EditValue = $this->ReferMobileNo->CurrentValue;
        $this->ReferMobileNo->ViewCustomAttributes = "";

        // ReferA4TreatingConsultant
        $this->ReferA4TreatingConsultant->EditAttrs["class"] = "form-control";
        $this->ReferA4TreatingConsultant->EditCustomAttributes = "";
        $this->ReferA4TreatingConsultant->EditValue = $this->ReferA4TreatingConsultant->CurrentValue;
        $this->ReferA4TreatingConsultant->ViewCustomAttributes = "";

        // PurposreReferredfor
        $this->PurposreReferredfor->EditAttrs["class"] = "form-control";
        $this->PurposreReferredfor->EditCustomAttributes = "";
        $this->PurposreReferredfor->EditValue = $this->PurposreReferredfor->CurrentValue;
        $this->PurposreReferredfor->ViewCustomAttributes = "";

        // patient_id
        $this->patient_id->EditAttrs["class"] = "form-control";
        $this->patient_id->EditCustomAttributes = "";
        $this->patient_id->EditValue = $this->patient_id->CurrentValue;
        $this->patient_id->EditValue = FormatNumber($this->patient_id->EditValue, 0, -2, -2, -2);
        $this->patient_id->ViewCustomAttributes = "";

        // BillClosing
        $this->BillClosing->EditAttrs["class"] = "form-control";
        $this->BillClosing->EditCustomAttributes = "";
        $this->BillClosing->EditValue = $this->BillClosing->options(true);
        $this->BillClosing->PlaceHolder = RemoveHtml($this->BillClosing->caption());

        // BillClosingDate
        $this->BillClosingDate->EditAttrs["class"] = "form-control";
        $this->BillClosingDate->EditCustomAttributes = "";
        $this->BillClosingDate->EditValue = FormatDateTime($this->BillClosingDate->CurrentValue, 7);
        $this->BillClosingDate->PlaceHolder = RemoveHtml($this->BillClosingDate->caption());

        // BillNumber
        $this->BillNumber->EditAttrs["class"] = "form-control";
        $this->BillNumber->EditCustomAttributes = "";
        if (!$this->BillNumber->Raw) {
            $this->BillNumber->CurrentValue = HtmlDecode($this->BillNumber->CurrentValue);
        }
        $this->BillNumber->EditValue = $this->BillNumber->CurrentValue;
        $this->BillNumber->PlaceHolder = RemoveHtml($this->BillNumber->caption());

        // ClosingAmount
        $this->ClosingAmount->EditAttrs["class"] = "form-control";
        $this->ClosingAmount->EditCustomAttributes = "";
        if (!$this->ClosingAmount->Raw) {
            $this->ClosingAmount->CurrentValue = HtmlDecode($this->ClosingAmount->CurrentValue);
        }
        $this->ClosingAmount->EditValue = $this->ClosingAmount->CurrentValue;
        $this->ClosingAmount->PlaceHolder = RemoveHtml($this->ClosingAmount->caption());

        // ClosingType
        $this->ClosingType->EditAttrs["class"] = "form-control";
        $this->ClosingType->EditCustomAttributes = "";
        if (!$this->ClosingType->Raw) {
            $this->ClosingType->CurrentValue = HtmlDecode($this->ClosingType->CurrentValue);
        }
        $this->ClosingType->EditValue = $this->ClosingType->CurrentValue;
        $this->ClosingType->PlaceHolder = RemoveHtml($this->ClosingType->caption());

        // BillAmount
        $this->BillAmount->EditAttrs["class"] = "form-control";
        $this->BillAmount->EditCustomAttributes = "";
        if (!$this->BillAmount->Raw) {
            $this->BillAmount->CurrentValue = HtmlDecode($this->BillAmount->CurrentValue);
        }
        $this->BillAmount->EditValue = $this->BillAmount->CurrentValue;
        $this->BillAmount->PlaceHolder = RemoveHtml($this->BillAmount->caption());

        // billclosedBy

        // bllcloseByDate

        // ReportHeader
        $this->ReportHeader->EditCustomAttributes = "";
        $this->ReportHeader->EditValue = $this->ReportHeader->options(false);
        $this->ReportHeader->PlaceHolder = RemoveHtml($this->ReportHeader->caption());

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
                    $doc->exportCaption($this->PatientID);
                    $doc->exportCaption($this->patient_name);
                    $doc->exportCaption($this->mrnNo);
                    $doc->exportCaption($this->mobileno);
                    $doc->exportCaption($this->profilePic);
                    $doc->exportCaption($this->gender);
                    $doc->exportCaption($this->age);
                    $doc->exportCaption($this->physician_id);
                    $doc->exportCaption($this->typeRegsisteration);
                    $doc->exportCaption($this->PaymentCategory);
                    $doc->exportCaption($this->admission_consultant_id);
                    $doc->exportCaption($this->leading_consultant_id);
                    $doc->exportCaption($this->cause);
                    $doc->exportCaption($this->admission_date);
                    $doc->exportCaption($this->release_date);
                    $doc->exportCaption($this->PaymentStatus);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->ReferedByDr);
                    $doc->exportCaption($this->ReferClinicname);
                    $doc->exportCaption($this->ReferCity);
                    $doc->exportCaption($this->ReferMobileNo);
                    $doc->exportCaption($this->ReferA4TreatingConsultant);
                    $doc->exportCaption($this->PurposreReferredfor);
                    $doc->exportCaption($this->patient_id);
                    $doc->exportCaption($this->BillClosing);
                    $doc->exportCaption($this->BillClosingDate);
                    $doc->exportCaption($this->BillNumber);
                    $doc->exportCaption($this->ClosingAmount);
                    $doc->exportCaption($this->ClosingType);
                    $doc->exportCaption($this->BillAmount);
                    $doc->exportCaption($this->billclosedBy);
                    $doc->exportCaption($this->bllcloseByDate);
                    $doc->exportCaption($this->ReportHeader);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->PatientID);
                    $doc->exportCaption($this->patient_name);
                    $doc->exportCaption($this->mrnNo);
                    $doc->exportCaption($this->mobileno);
                    $doc->exportCaption($this->gender);
                    $doc->exportCaption($this->age);
                    $doc->exportCaption($this->physician_id);
                    $doc->exportCaption($this->typeRegsisteration);
                    $doc->exportCaption($this->PaymentCategory);
                    $doc->exportCaption($this->admission_consultant_id);
                    $doc->exportCaption($this->leading_consultant_id);
                    $doc->exportCaption($this->admission_date);
                    $doc->exportCaption($this->release_date);
                    $doc->exportCaption($this->PaymentStatus);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->ReferedByDr);
                    $doc->exportCaption($this->ReferClinicname);
                    $doc->exportCaption($this->ReferCity);
                    $doc->exportCaption($this->ReferMobileNo);
                    $doc->exportCaption($this->ReferA4TreatingConsultant);
                    $doc->exportCaption($this->PurposreReferredfor);
                    $doc->exportCaption($this->patient_id);
                    $doc->exportCaption($this->BillClosing);
                    $doc->exportCaption($this->BillClosingDate);
                    $doc->exportCaption($this->BillNumber);
                    $doc->exportCaption($this->ClosingAmount);
                    $doc->exportCaption($this->ClosingType);
                    $doc->exportCaption($this->BillAmount);
                    $doc->exportCaption($this->billclosedBy);
                    $doc->exportCaption($this->bllcloseByDate);
                    $doc->exportCaption($this->ReportHeader);
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
                        $doc->exportField($this->PatientID);
                        $doc->exportField($this->patient_name);
                        $doc->exportField($this->mrnNo);
                        $doc->exportField($this->mobileno);
                        $doc->exportField($this->profilePic);
                        $doc->exportField($this->gender);
                        $doc->exportField($this->age);
                        $doc->exportField($this->physician_id);
                        $doc->exportField($this->typeRegsisteration);
                        $doc->exportField($this->PaymentCategory);
                        $doc->exportField($this->admission_consultant_id);
                        $doc->exportField($this->leading_consultant_id);
                        $doc->exportField($this->cause);
                        $doc->exportField($this->admission_date);
                        $doc->exportField($this->release_date);
                        $doc->exportField($this->PaymentStatus);
                        $doc->exportField($this->status);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->ReferedByDr);
                        $doc->exportField($this->ReferClinicname);
                        $doc->exportField($this->ReferCity);
                        $doc->exportField($this->ReferMobileNo);
                        $doc->exportField($this->ReferA4TreatingConsultant);
                        $doc->exportField($this->PurposreReferredfor);
                        $doc->exportField($this->patient_id);
                        $doc->exportField($this->BillClosing);
                        $doc->exportField($this->BillClosingDate);
                        $doc->exportField($this->BillNumber);
                        $doc->exportField($this->ClosingAmount);
                        $doc->exportField($this->ClosingType);
                        $doc->exportField($this->BillAmount);
                        $doc->exportField($this->billclosedBy);
                        $doc->exportField($this->bllcloseByDate);
                        $doc->exportField($this->ReportHeader);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->PatientID);
                        $doc->exportField($this->patient_name);
                        $doc->exportField($this->mrnNo);
                        $doc->exportField($this->mobileno);
                        $doc->exportField($this->gender);
                        $doc->exportField($this->age);
                        $doc->exportField($this->physician_id);
                        $doc->exportField($this->typeRegsisteration);
                        $doc->exportField($this->PaymentCategory);
                        $doc->exportField($this->admission_consultant_id);
                        $doc->exportField($this->leading_consultant_id);
                        $doc->exportField($this->admission_date);
                        $doc->exportField($this->release_date);
                        $doc->exportField($this->PaymentStatus);
                        $doc->exportField($this->status);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->ReferedByDr);
                        $doc->exportField($this->ReferClinicname);
                        $doc->exportField($this->ReferCity);
                        $doc->exportField($this->ReferMobileNo);
                        $doc->exportField($this->ReferA4TreatingConsultant);
                        $doc->exportField($this->PurposreReferredfor);
                        $doc->exportField($this->patient_id);
                        $doc->exportField($this->BillClosing);
                        $doc->exportField($this->BillClosingDate);
                        $doc->exportField($this->BillNumber);
                        $doc->exportField($this->ClosingAmount);
                        $doc->exportField($this->ClosingType);
                        $doc->exportField($this->BillAmount);
                        $doc->exportField($this->billclosedBy);
                        $doc->exportField($this->bllcloseByDate);
                        $doc->exportField($this->ReportHeader);
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
    public function rowInserting($rsold, &$rsnew)
    {
        // Enter your code here
        // To cancel, set return value to false
        return true;
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
    	if($rsnew["BillClosing"] == "Yes")
    		{
    			if($rsnew["ClosingType"] == "Paid")
    			{
    				// $this->setSuccessMessage("Record Inserted. The ID of the new record is " . $rsnew["ID"]);
    				$this->setSuccessMessage("Bill is Not Tallied. Create Advance Receipt for Balance Amount ".$rsnew["ClosingAmount"]);
    				return FALSE;
    			}
    			if($rsnew["ClosingType"] == "Refund")
    			{
    				$this->setSuccessMessage("Bill is Not Tallied. Create Refund Receipt Amount is ".$rsnew["ClosingAmount"]);
    				return FALSE;
    			}
    			$BALTotal =	$rsnew["ClosingAmount"] ;
    			if($BALTotal >= -50 && $BALTotal <= 100)
    			{
    				//echo '</br><b>Bill Tallied <b> </br>';
    			}
    		}
    	 //   $ClosingAmount = 'kkkkkkkkkkooooooooooo';
    if($rsnew["BillNumber"] == "")
    {
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
    			$rsnew["BillNumber"]  =  $hospital_PreFixCode . 'IPBN'. getIPBillNo($HospID);
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
