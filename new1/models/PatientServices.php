<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for patient_services
 */
class PatientServices extends DbTable
{
    protected $SqlFrom = "";
    protected $SqlSelect = null;
    protected $SqlSelectList = null;
    protected $SqlWhere = "";
    protected $SqlGroupBy = "";
    protected $SqlHaving = "";
    protected $SqlOrderBy = "";
    public $UseSessionForListSql = true;
    public $UseCustomTemplate = false; // Use custom template

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
    public $PatID;
    public $mrnno;
    public $PatientName;
    public $Age;
    public $Gender;
    public $profilePic;
    public $Services;
    public $Unit;
    public $amount;
    public $Quantity;
    public $Discount;
    public $SubTotal;
    public $description;
    public $patient_type;
    public $charged_date;
    public $status;
    public $createdby;
    public $createddatetime;
    public $modifiedby;
    public $modifieddatetime;
    public $Aid;
    public $Vid;
    public $DrID;
    public $DrCODE;
    public $DrName;
    public $Department;
    public $DrSharePres;
    public $HospSharePres;
    public $DrShareAmount;
    public $HospShareAmount;
    public $DrShareSettiledAmount;
    public $DrShareSettledId;
    public $DrShareSettiledStatus;
    public $invoiceId;
    public $invoiceAmount;
    public $invoiceStatus;
    public $modeOfPayment;
    public $HospID;
    public $RIDNO;
    public $TidNo;
    public $DiscountCategory;
    public $sid;
    public $ItemCode;
    public $TestSubCd;
    public $DEptCd;
    public $ProfCd;
    public $LabReport;
    public $Comments;
    public $Method;
    public $Specimen;
    public $Abnormal;
    public $RefValue;
    public $TestUnit;
    public $LOWHIGH;
    public $Branch;
    public $Dispatch;
    public $Pic1;
    public $Pic2;
    public $GraphPath;
    public $MachineCD;
    public $TestCancel;
    public $OutSource;
    public $Printed;
    public $PrintBy;
    public $PrintDate;
    public $BillingDate;
    public $BilledBy;
    public $Resulted;
    public $ResultDate;
    public $ResultedBy;
    public $SampleDate;
    public $SampleUser;
    public $Sampled;
    public $ReceivedDate;
    public $ReceivedUser;
    public $Recevied;
    public $DeptRecvDate;
    public $DeptRecvUser;
    public $DeptRecived;
    public $SAuthDate;
    public $SAuthBy;
    public $SAuthendicate;
    public $AuthDate;
    public $AuthBy;
    public $Authencate;
    public $EditDate;
    public $EditBy;
    public $Editted;
    public $PatientId;
    public $Mobile;
    public $CId;
    public $Order;
    public $Form;
    public $ResType;
    public $Sample;
    public $NoD;
    public $BillOrder;
    public $Formula;
    public $Inactive;
    public $CollSample;
    public $TestType;
    public $Repeated;
    public $RepeatedBy;
    public $RepeatedDate;
    public $serviceID;
    public $Service_Type;
    public $Service_Department;
    public $RequestNo;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'patient_services';
        $this->TableName = 'patient_services';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`patient_services`";
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
        $this->id = new DbField('patient_services', 'patient_services', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['id'] = &$this->id;

        // Reception
        $this->Reception = new DbField('patient_services', 'patient_services', 'x_Reception', 'Reception', '`Reception`', '`Reception`', 3, 11, -1, false, '`Reception`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Reception->Sortable = true; // Allow sort
        $this->Reception->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['Reception'] = &$this->Reception;

        // PatID
        $this->PatID = new DbField('patient_services', 'patient_services', 'x_PatID', 'PatID', '`PatID`', '`PatID`', 3, 11, -1, false, '`PatID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatID->Sortable = true; // Allow sort
        $this->PatID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['PatID'] = &$this->PatID;

        // mrnno
        $this->mrnno = new DbField('patient_services', 'patient_services', 'x_mrnno', 'mrnno', '`mrnno`', '`mrnno`', 200, 45, -1, false, '`mrnno`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->mrnno->Sortable = true; // Allow sort
        $this->Fields['mrnno'] = &$this->mrnno;

        // PatientName
        $this->PatientName = new DbField('patient_services', 'patient_services', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, false, '`PatientName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientName->Sortable = true; // Allow sort
        $this->Fields['PatientName'] = &$this->PatientName;

        // Age
        $this->Age = new DbField('patient_services', 'patient_services', 'x_Age', 'Age', '`Age`', '`Age`', 200, 45, -1, false, '`Age`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Age->Sortable = true; // Allow sort
        $this->Fields['Age'] = &$this->Age;

        // Gender
        $this->Gender = new DbField('patient_services', 'patient_services', 'x_Gender', 'Gender', '`Gender`', '`Gender`', 200, 45, -1, false, '`Gender`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Gender->Sortable = true; // Allow sort
        $this->Fields['Gender'] = &$this->Gender;

        // profilePic
        $this->profilePic = new DbField('patient_services', 'patient_services', 'x_profilePic', 'profilePic', '`profilePic`', '`profilePic`', 201, 450, -1, false, '`profilePic`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->profilePic->Sortable = true; // Allow sort
        $this->Fields['profilePic'] = &$this->profilePic;

        // Services
        $this->Services = new DbField('patient_services', 'patient_services', 'x_Services', 'Services', '`Services`', '`Services`', 200, 50, -1, false, '`Services`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Services->Nullable = false; // NOT NULL field
        $this->Services->Required = true; // Required field
        $this->Services->Sortable = true; // Allow sort
        $this->Fields['Services'] = &$this->Services;

        // Unit
        $this->Unit = new DbField('patient_services', 'patient_services', 'x_Unit', 'Unit', '`Unit`', '`Unit`', 3, 11, -1, false, '`Unit`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Unit->Sortable = true; // Allow sort
        $this->Unit->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['Unit'] = &$this->Unit;

        // amount
        $this->amount = new DbField('patient_services', 'patient_services', 'x_amount', 'amount', '`amount`', '`amount`', 131, 12, -1, false, '`amount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->amount->Nullable = false; // NOT NULL field
        $this->amount->Required = true; // Required field
        $this->amount->Sortable = true; // Allow sort
        $this->amount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['amount'] = &$this->amount;

        // Quantity
        $this->Quantity = new DbField('patient_services', 'patient_services', 'x_Quantity', 'Quantity', '`Quantity`', '`Quantity`', 3, 11, -1, false, '`Quantity`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Quantity->Sortable = true; // Allow sort
        $this->Quantity->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['Quantity'] = &$this->Quantity;

        // Discount
        $this->Discount = new DbField('patient_services', 'patient_services', 'x_Discount', 'Discount', '`Discount`', '`Discount`', 131, 12, -1, false, '`Discount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Discount->Sortable = true; // Allow sort
        $this->Discount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Discount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['Discount'] = &$this->Discount;

        // SubTotal
        $this->SubTotal = new DbField('patient_services', 'patient_services', 'x_SubTotal', 'SubTotal', '`SubTotal`', '`SubTotal`', 131, 12, -1, false, '`SubTotal`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SubTotal->Sortable = true; // Allow sort
        $this->SubTotal->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SubTotal->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['SubTotal'] = &$this->SubTotal;

        // description
        $this->description = new DbField('patient_services', 'patient_services', 'x_description', 'description', '`description`', '`description`', 201, 65535, -1, false, '`description`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->description->Sortable = true; // Allow sort
        $this->Fields['description'] = &$this->description;

        // patient_type
        $this->patient_type = new DbField('patient_services', 'patient_services', 'x_patient_type', 'patient_type', '`patient_type`', '`patient_type`', 3, 11, -1, false, '`patient_type`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->patient_type->Sortable = true; // Allow sort
        $this->patient_type->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['patient_type'] = &$this->patient_type;

        // charged_date
        $this->charged_date = new DbField('patient_services', 'patient_services', 'x_charged_date', 'charged_date', '`charged_date`', CastDateFieldForLike("`charged_date`", 0, "DB"), 135, 19, 0, false, '`charged_date`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->charged_date->Sortable = true; // Allow sort
        $this->charged_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['charged_date'] = &$this->charged_date;

        // status
        $this->status = new DbField('patient_services', 'patient_services', 'x_status', 'status', '`status`', '`status`', 3, 11, -1, false, '`status`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->status->Sortable = true; // Allow sort
        $this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['status'] = &$this->status;

        // createdby
        $this->createdby = new DbField('patient_services', 'patient_services', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 200, 45, -1, false, '`createdby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdby->Sortable = true; // Allow sort
        $this->Fields['createdby'] = &$this->createdby;

        // createddatetime
        $this->createddatetime = new DbField('patient_services', 'patient_services', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, false, '`createddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddatetime->Sortable = true; // Allow sort
        $this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['createddatetime'] = &$this->createddatetime;

        // modifiedby
        $this->modifiedby = new DbField('patient_services', 'patient_services', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 200, 45, -1, false, '`modifiedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifiedby->Sortable = true; // Allow sort
        $this->Fields['modifiedby'] = &$this->modifiedby;

        // modifieddatetime
        $this->modifieddatetime = new DbField('patient_services', 'patient_services', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, false, '`modifieddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifieddatetime->Sortable = true; // Allow sort
        $this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['modifieddatetime'] = &$this->modifieddatetime;

        // Aid
        $this->Aid = new DbField('patient_services', 'patient_services', 'x_Aid', 'Aid', '`Aid`', '`Aid`', 3, 11, -1, false, '`Aid`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Aid->Sortable = true; // Allow sort
        $this->Aid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['Aid'] = &$this->Aid;

        // Vid
        $this->Vid = new DbField('patient_services', 'patient_services', 'x_Vid', 'Vid', '`Vid`', '`Vid`', 3, 11, -1, false, '`Vid`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Vid->Sortable = true; // Allow sort
        $this->Vid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['Vid'] = &$this->Vid;

        // DrID
        $this->DrID = new DbField('patient_services', 'patient_services', 'x_DrID', 'DrID', '`DrID`', '`DrID`', 3, 11, -1, false, '`DrID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DrID->Sortable = true; // Allow sort
        $this->DrID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['DrID'] = &$this->DrID;

        // DrCODE
        $this->DrCODE = new DbField('patient_services', 'patient_services', 'x_DrCODE', 'DrCODE', '`DrCODE`', '`DrCODE`', 200, 45, -1, false, '`DrCODE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DrCODE->Sortable = true; // Allow sort
        $this->Fields['DrCODE'] = &$this->DrCODE;

        // DrName
        $this->DrName = new DbField('patient_services', 'patient_services', 'x_DrName', 'DrName', '`DrName`', '`DrName`', 200, 45, -1, false, '`DrName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DrName->Sortable = true; // Allow sort
        $this->Fields['DrName'] = &$this->DrName;

        // Department
        $this->Department = new DbField('patient_services', 'patient_services', 'x_Department', 'Department', '`Department`', '`Department`', 200, 45, -1, false, '`Department`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Department->Sortable = true; // Allow sort
        $this->Fields['Department'] = &$this->Department;

        // DrSharePres
        $this->DrSharePres = new DbField('patient_services', 'patient_services', 'x_DrSharePres', 'DrSharePres', '`DrSharePres`', '`DrSharePres`', 131, 12, -1, false, '`DrSharePres`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DrSharePres->Sortable = true; // Allow sort
        $this->DrSharePres->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->DrSharePres->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['DrSharePres'] = &$this->DrSharePres;

        // HospSharePres
        $this->HospSharePres = new DbField('patient_services', 'patient_services', 'x_HospSharePres', 'HospSharePres', '`HospSharePres`', '`HospSharePres`', 131, 12, -1, false, '`HospSharePres`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospSharePres->Sortable = true; // Allow sort
        $this->HospSharePres->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->HospSharePres->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['HospSharePres'] = &$this->HospSharePres;

        // DrShareAmount
        $this->DrShareAmount = new DbField('patient_services', 'patient_services', 'x_DrShareAmount', 'DrShareAmount', '`DrShareAmount`', '`DrShareAmount`', 131, 12, -1, false, '`DrShareAmount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DrShareAmount->Sortable = true; // Allow sort
        $this->DrShareAmount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->DrShareAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['DrShareAmount'] = &$this->DrShareAmount;

        // HospShareAmount
        $this->HospShareAmount = new DbField('patient_services', 'patient_services', 'x_HospShareAmount', 'HospShareAmount', '`HospShareAmount`', '`HospShareAmount`', 131, 12, -1, false, '`HospShareAmount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospShareAmount->Sortable = true; // Allow sort
        $this->HospShareAmount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->HospShareAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['HospShareAmount'] = &$this->HospShareAmount;

        // DrShareSettiledAmount
        $this->DrShareSettiledAmount = new DbField('patient_services', 'patient_services', 'x_DrShareSettiledAmount', 'DrShareSettiledAmount', '`DrShareSettiledAmount`', '`DrShareSettiledAmount`', 131, 12, -1, false, '`DrShareSettiledAmount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DrShareSettiledAmount->Sortable = true; // Allow sort
        $this->DrShareSettiledAmount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->DrShareSettiledAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['DrShareSettiledAmount'] = &$this->DrShareSettiledAmount;

        // DrShareSettledId
        $this->DrShareSettledId = new DbField('patient_services', 'patient_services', 'x_DrShareSettledId', 'DrShareSettledId', '`DrShareSettledId`', '`DrShareSettledId`', 3, 11, -1, false, '`DrShareSettledId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DrShareSettledId->Sortable = true; // Allow sort
        $this->DrShareSettledId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['DrShareSettledId'] = &$this->DrShareSettledId;

        // DrShareSettiledStatus
        $this->DrShareSettiledStatus = new DbField('patient_services', 'patient_services', 'x_DrShareSettiledStatus', 'DrShareSettiledStatus', '`DrShareSettiledStatus`', '`DrShareSettiledStatus`', 3, 11, -1, false, '`DrShareSettiledStatus`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DrShareSettiledStatus->Sortable = true; // Allow sort
        $this->DrShareSettiledStatus->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['DrShareSettiledStatus'] = &$this->DrShareSettiledStatus;

        // invoiceId
        $this->invoiceId = new DbField('patient_services', 'patient_services', 'x_invoiceId', 'invoiceId', '`invoiceId`', '`invoiceId`', 3, 11, -1, false, '`invoiceId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->invoiceId->Sortable = true; // Allow sort
        $this->invoiceId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['invoiceId'] = &$this->invoiceId;

        // invoiceAmount
        $this->invoiceAmount = new DbField('patient_services', 'patient_services', 'x_invoiceAmount', 'invoiceAmount', '`invoiceAmount`', '`invoiceAmount`', 131, 12, -1, false, '`invoiceAmount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->invoiceAmount->Sortable = true; // Allow sort
        $this->invoiceAmount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->invoiceAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['invoiceAmount'] = &$this->invoiceAmount;

        // invoiceStatus
        $this->invoiceStatus = new DbField('patient_services', 'patient_services', 'x_invoiceStatus', 'invoiceStatus', '`invoiceStatus`', '`invoiceStatus`', 200, 45, -1, false, '`invoiceStatus`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->invoiceStatus->Sortable = true; // Allow sort
        $this->Fields['invoiceStatus'] = &$this->invoiceStatus;

        // modeOfPayment
        $this->modeOfPayment = new DbField('patient_services', 'patient_services', 'x_modeOfPayment', 'modeOfPayment', '`modeOfPayment`', '`modeOfPayment`', 200, 45, -1, false, '`modeOfPayment`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modeOfPayment->Sortable = true; // Allow sort
        $this->Fields['modeOfPayment'] = &$this->modeOfPayment;

        // HospID
        $this->HospID = new DbField('patient_services', 'patient_services', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['HospID'] = &$this->HospID;

        // RIDNO
        $this->RIDNO = new DbField('patient_services', 'patient_services', 'x_RIDNO', 'RIDNO', '`RIDNO`', '`RIDNO`', 3, 11, -1, false, '`RIDNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RIDNO->Sortable = true; // Allow sort
        $this->RIDNO->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['RIDNO'] = &$this->RIDNO;

        // TidNo
        $this->TidNo = new DbField('patient_services', 'patient_services', 'x_TidNo', 'TidNo', '`TidNo`', '`TidNo`', 3, 11, -1, false, '`TidNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TidNo->Sortable = true; // Allow sort
        $this->TidNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['TidNo'] = &$this->TidNo;

        // DiscountCategory
        $this->DiscountCategory = new DbField('patient_services', 'patient_services', 'x_DiscountCategory', 'DiscountCategory', '`DiscountCategory`', '`DiscountCategory`', 200, 45, -1, false, '`DiscountCategory`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DiscountCategory->Sortable = true; // Allow sort
        $this->Fields['DiscountCategory'] = &$this->DiscountCategory;

        // sid
        $this->sid = new DbField('patient_services', 'patient_services', 'x_sid', 'sid', '`sid`', '`sid`', 3, 11, -1, false, '`sid`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->sid->Sortable = true; // Allow sort
        $this->sid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['sid'] = &$this->sid;

        // ItemCode
        $this->ItemCode = new DbField('patient_services', 'patient_services', 'x_ItemCode', 'ItemCode', '`ItemCode`', '`ItemCode`', 200, 45, -1, false, '`ItemCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ItemCode->Sortable = true; // Allow sort
        $this->Fields['ItemCode'] = &$this->ItemCode;

        // TestSubCd
        $this->TestSubCd = new DbField('patient_services', 'patient_services', 'x_TestSubCd', 'TestSubCd', '`TestSubCd`', '`TestSubCd`', 200, 45, -1, false, '`TestSubCd`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TestSubCd->Sortable = true; // Allow sort
        $this->Fields['TestSubCd'] = &$this->TestSubCd;

        // DEptCd
        $this->DEptCd = new DbField('patient_services', 'patient_services', 'x_DEptCd', 'DEptCd', '`DEptCd`', '`DEptCd`', 200, 45, -1, false, '`DEptCd`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DEptCd->Sortable = true; // Allow sort
        $this->Fields['DEptCd'] = &$this->DEptCd;

        // ProfCd
        $this->ProfCd = new DbField('patient_services', 'patient_services', 'x_ProfCd', 'ProfCd', '`ProfCd`', '`ProfCd`', 200, 45, -1, false, '`ProfCd`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ProfCd->Sortable = true; // Allow sort
        $this->Fields['ProfCd'] = &$this->ProfCd;

        // LabReport
        $this->LabReport = new DbField('patient_services', 'patient_services', 'x_LabReport', 'LabReport', '`LabReport`', '`LabReport`', 201, 65535, -1, false, '`LabReport`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->LabReport->Sortable = true; // Allow sort
        $this->Fields['LabReport'] = &$this->LabReport;

        // Comments
        $this->Comments = new DbField('patient_services', 'patient_services', 'x_Comments', 'Comments', '`Comments`', '`Comments`', 200, 45, -1, false, '`Comments`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Comments->Sortable = true; // Allow sort
        $this->Fields['Comments'] = &$this->Comments;

        // Method
        $this->Method = new DbField('patient_services', 'patient_services', 'x_Method', 'Method', '`Method`', '`Method`', 200, 45, -1, false, '`Method`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Method->Sortable = true; // Allow sort
        $this->Fields['Method'] = &$this->Method;

        // Specimen
        $this->Specimen = new DbField('patient_services', 'patient_services', 'x_Specimen', 'Specimen', '`Specimen`', '`Specimen`', 200, 45, -1, false, '`Specimen`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Specimen->Sortable = true; // Allow sort
        $this->Fields['Specimen'] = &$this->Specimen;

        // Abnormal
        $this->Abnormal = new DbField('patient_services', 'patient_services', 'x_Abnormal', 'Abnormal', '`Abnormal`', '`Abnormal`', 200, 45, -1, false, '`Abnormal`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Abnormal->Sortable = true; // Allow sort
        $this->Fields['Abnormal'] = &$this->Abnormal;

        // RefValue
        $this->RefValue = new DbField('patient_services', 'patient_services', 'x_RefValue', 'RefValue', '`RefValue`', '`RefValue`', 201, 65535, -1, false, '`RefValue`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->RefValue->Sortable = true; // Allow sort
        $this->Fields['RefValue'] = &$this->RefValue;

        // TestUnit
        $this->TestUnit = new DbField('patient_services', 'patient_services', 'x_TestUnit', 'TestUnit', '`TestUnit`', '`TestUnit`', 200, 45, -1, false, '`TestUnit`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TestUnit->Sortable = true; // Allow sort
        $this->Fields['TestUnit'] = &$this->TestUnit;

        // LOWHIGH
        $this->LOWHIGH = new DbField('patient_services', 'patient_services', 'x_LOWHIGH', 'LOWHIGH', '`LOWHIGH`', '`LOWHIGH`', 200, 45, -1, false, '`LOWHIGH`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->LOWHIGH->Sortable = true; // Allow sort
        $this->Fields['LOWHIGH'] = &$this->LOWHIGH;

        // Branch
        $this->Branch = new DbField('patient_services', 'patient_services', 'x_Branch', 'Branch', '`Branch`', '`Branch`', 200, 45, -1, false, '`Branch`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Branch->Sortable = true; // Allow sort
        $this->Fields['Branch'] = &$this->Branch;

        // Dispatch
        $this->Dispatch = new DbField('patient_services', 'patient_services', 'x_Dispatch', 'Dispatch', '`Dispatch`', '`Dispatch`', 200, 45, -1, false, '`Dispatch`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Dispatch->Sortable = true; // Allow sort
        $this->Fields['Dispatch'] = &$this->Dispatch;

        // Pic1
        $this->Pic1 = new DbField('patient_services', 'patient_services', 'x_Pic1', 'Pic1', '`Pic1`', '`Pic1`', 200, 45, -1, false, '`Pic1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Pic1->Sortable = true; // Allow sort
        $this->Fields['Pic1'] = &$this->Pic1;

        // Pic2
        $this->Pic2 = new DbField('patient_services', 'patient_services', 'x_Pic2', 'Pic2', '`Pic2`', '`Pic2`', 200, 45, -1, false, '`Pic2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Pic2->Sortable = true; // Allow sort
        $this->Fields['Pic2'] = &$this->Pic2;

        // GraphPath
        $this->GraphPath = new DbField('patient_services', 'patient_services', 'x_GraphPath', 'GraphPath', '`GraphPath`', '`GraphPath`', 200, 45, -1, false, '`GraphPath`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GraphPath->Sortable = true; // Allow sort
        $this->Fields['GraphPath'] = &$this->GraphPath;

        // MachineCD
        $this->MachineCD = new DbField('patient_services', 'patient_services', 'x_MachineCD', 'MachineCD', '`MachineCD`', '`MachineCD`', 200, 45, -1, false, '`MachineCD`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MachineCD->Sortable = true; // Allow sort
        $this->Fields['MachineCD'] = &$this->MachineCD;

        // TestCancel
        $this->TestCancel = new DbField('patient_services', 'patient_services', 'x_TestCancel', 'TestCancel', '`TestCancel`', '`TestCancel`', 200, 45, -1, false, '`TestCancel`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TestCancel->Sortable = true; // Allow sort
        $this->Fields['TestCancel'] = &$this->TestCancel;

        // OutSource
        $this->OutSource = new DbField('patient_services', 'patient_services', 'x_OutSource', 'OutSource', '`OutSource`', '`OutSource`', 200, 45, -1, false, '`OutSource`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OutSource->Sortable = true; // Allow sort
        $this->Fields['OutSource'] = &$this->OutSource;

        // Printed
        $this->Printed = new DbField('patient_services', 'patient_services', 'x_Printed', 'Printed', '`Printed`', '`Printed`', 200, 45, -1, false, '`Printed`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Printed->Sortable = true; // Allow sort
        $this->Fields['Printed'] = &$this->Printed;

        // PrintBy
        $this->PrintBy = new DbField('patient_services', 'patient_services', 'x_PrintBy', 'PrintBy', '`PrintBy`', '`PrintBy`', 200, 45, -1, false, '`PrintBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PrintBy->Sortable = true; // Allow sort
        $this->Fields['PrintBy'] = &$this->PrintBy;

        // PrintDate
        $this->PrintDate = new DbField('patient_services', 'patient_services', 'x_PrintDate', 'PrintDate', '`PrintDate`', CastDateFieldForLike("`PrintDate`", 0, "DB"), 135, 19, 0, false, '`PrintDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PrintDate->Sortable = true; // Allow sort
        $this->PrintDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['PrintDate'] = &$this->PrintDate;

        // BillingDate
        $this->BillingDate = new DbField('patient_services', 'patient_services', 'x_BillingDate', 'BillingDate', '`BillingDate`', CastDateFieldForLike("`BillingDate`", 0, "DB"), 135, 19, 0, false, '`BillingDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BillingDate->Sortable = true; // Allow sort
        $this->BillingDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['BillingDate'] = &$this->BillingDate;

        // BilledBy
        $this->BilledBy = new DbField('patient_services', 'patient_services', 'x_BilledBy', 'BilledBy', '`BilledBy`', '`BilledBy`', 200, 45, -1, false, '`BilledBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BilledBy->Sortable = true; // Allow sort
        $this->Fields['BilledBy'] = &$this->BilledBy;

        // Resulted
        $this->Resulted = new DbField('patient_services', 'patient_services', 'x_Resulted', 'Resulted', '`Resulted`', '`Resulted`', 200, 45, -1, false, '`Resulted`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Resulted->Sortable = true; // Allow sort
        $this->Fields['Resulted'] = &$this->Resulted;

        // ResultDate
        $this->ResultDate = new DbField('patient_services', 'patient_services', 'x_ResultDate', 'ResultDate', '`ResultDate`', CastDateFieldForLike("`ResultDate`", 0, "DB"), 135, 19, 0, false, '`ResultDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ResultDate->Sortable = true; // Allow sort
        $this->ResultDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['ResultDate'] = &$this->ResultDate;

        // ResultedBy
        $this->ResultedBy = new DbField('patient_services', 'patient_services', 'x_ResultedBy', 'ResultedBy', '`ResultedBy`', '`ResultedBy`', 200, 45, -1, false, '`ResultedBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ResultedBy->Sortable = true; // Allow sort
        $this->Fields['ResultedBy'] = &$this->ResultedBy;

        // SampleDate
        $this->SampleDate = new DbField('patient_services', 'patient_services', 'x_SampleDate', 'SampleDate', '`SampleDate`', CastDateFieldForLike("`SampleDate`", 0, "DB"), 135, 19, 0, false, '`SampleDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SampleDate->Sortable = true; // Allow sort
        $this->SampleDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['SampleDate'] = &$this->SampleDate;

        // SampleUser
        $this->SampleUser = new DbField('patient_services', 'patient_services', 'x_SampleUser', 'SampleUser', '`SampleUser`', '`SampleUser`', 200, 45, -1, false, '`SampleUser`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SampleUser->Sortable = true; // Allow sort
        $this->Fields['SampleUser'] = &$this->SampleUser;

        // Sampled
        $this->Sampled = new DbField('patient_services', 'patient_services', 'x_Sampled', 'Sampled', '`Sampled`', '`Sampled`', 200, 45, -1, false, '`Sampled`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Sampled->Sortable = true; // Allow sort
        $this->Fields['Sampled'] = &$this->Sampled;

        // ReceivedDate
        $this->ReceivedDate = new DbField('patient_services', 'patient_services', 'x_ReceivedDate', 'ReceivedDate', '`ReceivedDate`', CastDateFieldForLike("`ReceivedDate`", 0, "DB"), 135, 19, 0, false, '`ReceivedDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReceivedDate->Sortable = true; // Allow sort
        $this->ReceivedDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['ReceivedDate'] = &$this->ReceivedDate;

        // ReceivedUser
        $this->ReceivedUser = new DbField('patient_services', 'patient_services', 'x_ReceivedUser', 'ReceivedUser', '`ReceivedUser`', '`ReceivedUser`', 200, 45, -1, false, '`ReceivedUser`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReceivedUser->Sortable = true; // Allow sort
        $this->Fields['ReceivedUser'] = &$this->ReceivedUser;

        // Recevied
        $this->Recevied = new DbField('patient_services', 'patient_services', 'x_Recevied', 'Recevied', '`Recevied`', '`Recevied`', 200, 45, -1, false, '`Recevied`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Recevied->Sortable = true; // Allow sort
        $this->Fields['Recevied'] = &$this->Recevied;

        // DeptRecvDate
        $this->DeptRecvDate = new DbField('patient_services', 'patient_services', 'x_DeptRecvDate', 'DeptRecvDate', '`DeptRecvDate`', CastDateFieldForLike("`DeptRecvDate`", 0, "DB"), 135, 19, 0, false, '`DeptRecvDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DeptRecvDate->Sortable = true; // Allow sort
        $this->DeptRecvDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['DeptRecvDate'] = &$this->DeptRecvDate;

        // DeptRecvUser
        $this->DeptRecvUser = new DbField('patient_services', 'patient_services', 'x_DeptRecvUser', 'DeptRecvUser', '`DeptRecvUser`', '`DeptRecvUser`', 200, 45, -1, false, '`DeptRecvUser`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DeptRecvUser->Sortable = true; // Allow sort
        $this->Fields['DeptRecvUser'] = &$this->DeptRecvUser;

        // DeptRecived
        $this->DeptRecived = new DbField('patient_services', 'patient_services', 'x_DeptRecived', 'DeptRecived', '`DeptRecived`', '`DeptRecived`', 200, 45, -1, false, '`DeptRecived`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DeptRecived->Sortable = true; // Allow sort
        $this->Fields['DeptRecived'] = &$this->DeptRecived;

        // SAuthDate
        $this->SAuthDate = new DbField('patient_services', 'patient_services', 'x_SAuthDate', 'SAuthDate', '`SAuthDate`', CastDateFieldForLike("`SAuthDate`", 0, "DB"), 135, 19, 0, false, '`SAuthDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SAuthDate->Sortable = true; // Allow sort
        $this->SAuthDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['SAuthDate'] = &$this->SAuthDate;

        // SAuthBy
        $this->SAuthBy = new DbField('patient_services', 'patient_services', 'x_SAuthBy', 'SAuthBy', '`SAuthBy`', '`SAuthBy`', 200, 45, -1, false, '`SAuthBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SAuthBy->Sortable = true; // Allow sort
        $this->Fields['SAuthBy'] = &$this->SAuthBy;

        // SAuthendicate
        $this->SAuthendicate = new DbField('patient_services', 'patient_services', 'x_SAuthendicate', 'SAuthendicate', '`SAuthendicate`', '`SAuthendicate`', 200, 45, -1, false, '`SAuthendicate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SAuthendicate->Sortable = true; // Allow sort
        $this->Fields['SAuthendicate'] = &$this->SAuthendicate;

        // AuthDate
        $this->AuthDate = new DbField('patient_services', 'patient_services', 'x_AuthDate', 'AuthDate', '`AuthDate`', CastDateFieldForLike("`AuthDate`", 0, "DB"), 135, 19, 0, false, '`AuthDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AuthDate->Sortable = true; // Allow sort
        $this->AuthDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['AuthDate'] = &$this->AuthDate;

        // AuthBy
        $this->AuthBy = new DbField('patient_services', 'patient_services', 'x_AuthBy', 'AuthBy', '`AuthBy`', '`AuthBy`', 200, 45, -1, false, '`AuthBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AuthBy->Sortable = true; // Allow sort
        $this->Fields['AuthBy'] = &$this->AuthBy;

        // Authencate
        $this->Authencate = new DbField('patient_services', 'patient_services', 'x_Authencate', 'Authencate', '`Authencate`', '`Authencate`', 200, 45, -1, false, '`Authencate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Authencate->Sortable = true; // Allow sort
        $this->Fields['Authencate'] = &$this->Authencate;

        // EditDate
        $this->EditDate = new DbField('patient_services', 'patient_services', 'x_EditDate', 'EditDate', '`EditDate`', CastDateFieldForLike("`EditDate`", 0, "DB"), 135, 19, 0, false, '`EditDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EditDate->Sortable = true; // Allow sort
        $this->EditDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['EditDate'] = &$this->EditDate;

        // EditBy
        $this->EditBy = new DbField('patient_services', 'patient_services', 'x_EditBy', 'EditBy', '`EditBy`', '`EditBy`', 200, 45, -1, false, '`EditBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EditBy->Sortable = true; // Allow sort
        $this->Fields['EditBy'] = &$this->EditBy;

        // Editted
        $this->Editted = new DbField('patient_services', 'patient_services', 'x_Editted', 'Editted', '`Editted`', '`Editted`', 200, 45, -1, false, '`Editted`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Editted->Sortable = true; // Allow sort
        $this->Fields['Editted'] = &$this->Editted;

        // PatientId
        $this->PatientId = new DbField('patient_services', 'patient_services', 'x_PatientId', 'PatientId', '`PatientId`', '`PatientId`', 200, 45, -1, false, '`PatientId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientId->Sortable = true; // Allow sort
        $this->Fields['PatientId'] = &$this->PatientId;

        // Mobile
        $this->Mobile = new DbField('patient_services', 'patient_services', 'x_Mobile', 'Mobile', '`Mobile`', '`Mobile`', 200, 45, -1, false, '`Mobile`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Mobile->Sortable = true; // Allow sort
        $this->Fields['Mobile'] = &$this->Mobile;

        // CId
        $this->CId = new DbField('patient_services', 'patient_services', 'x_CId', 'CId', '`CId`', '`CId`', 3, 11, -1, false, '`CId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CId->Sortable = true; // Allow sort
        $this->CId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['CId'] = &$this->CId;

        // Order
        $this->Order = new DbField('patient_services', 'patient_services', 'x_Order', 'Order', '`Order`', '`Order`', 131, 10, -1, false, '`Order`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Order->Sortable = true; // Allow sort
        $this->Order->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Order->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['Order'] = &$this->Order;

        // Form
        $this->Form = new DbField('patient_services', 'patient_services', 'x_Form', 'Form', '`Form`', '`Form`', 201, 500, -1, false, '`Form`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Form->Sortable = true; // Allow sort
        $this->Fields['Form'] = &$this->Form;

        // ResType
        $this->ResType = new DbField('patient_services', 'patient_services', 'x_ResType', 'ResType', '`ResType`', '`ResType`', 200, 45, -1, false, '`ResType`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ResType->Sortable = true; // Allow sort
        $this->Fields['ResType'] = &$this->ResType;

        // Sample
        $this->Sample = new DbField('patient_services', 'patient_services', 'x_Sample', 'Sample', '`Sample`', '`Sample`', 200, 150, -1, false, '`Sample`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Sample->Sortable = true; // Allow sort
        $this->Fields['Sample'] = &$this->Sample;

        // NoD
        $this->NoD = new DbField('patient_services', 'patient_services', 'x_NoD', 'NoD', '`NoD`', '`NoD`', 131, 10, -1, false, '`NoD`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NoD->Sortable = true; // Allow sort
        $this->NoD->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->NoD->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['NoD'] = &$this->NoD;

        // BillOrder
        $this->BillOrder = new DbField('patient_services', 'patient_services', 'x_BillOrder', 'BillOrder', '`BillOrder`', '`BillOrder`', 131, 10, -1, false, '`BillOrder`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BillOrder->Sortable = true; // Allow sort
        $this->BillOrder->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->BillOrder->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['BillOrder'] = &$this->BillOrder;

        // Formula
        $this->Formula = new DbField('patient_services', 'patient_services', 'x_Formula', 'Formula', '`Formula`', '`Formula`', 201, 1500, -1, false, '`Formula`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Formula->Sortable = true; // Allow sort
        $this->Fields['Formula'] = &$this->Formula;

        // Inactive
        $this->Inactive = new DbField('patient_services', 'patient_services', 'x_Inactive', 'Inactive', '`Inactive`', '`Inactive`', 200, 45, -1, false, '`Inactive`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Inactive->Sortable = true; // Allow sort
        $this->Fields['Inactive'] = &$this->Inactive;

        // CollSample
        $this->CollSample = new DbField('patient_services', 'patient_services', 'x_CollSample', 'CollSample', '`CollSample`', '`CollSample`', 200, 45, -1, false, '`CollSample`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CollSample->Sortable = true; // Allow sort
        $this->Fields['CollSample'] = &$this->CollSample;

        // TestType
        $this->TestType = new DbField('patient_services', 'patient_services', 'x_TestType', 'TestType', '`TestType`', '`TestType`', 200, 45, -1, false, '`TestType`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TestType->Sortable = true; // Allow sort
        $this->Fields['TestType'] = &$this->TestType;

        // Repeated
        $this->Repeated = new DbField('patient_services', 'patient_services', 'x_Repeated', 'Repeated', '`Repeated`', '`Repeated`', 200, 45, -1, false, '`Repeated`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Repeated->Sortable = true; // Allow sort
        $this->Fields['Repeated'] = &$this->Repeated;

        // RepeatedBy
        $this->RepeatedBy = new DbField('patient_services', 'patient_services', 'x_RepeatedBy', 'RepeatedBy', '`RepeatedBy`', '`RepeatedBy`', 200, 45, -1, false, '`RepeatedBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RepeatedBy->Sortable = true; // Allow sort
        $this->Fields['RepeatedBy'] = &$this->RepeatedBy;

        // RepeatedDate
        $this->RepeatedDate = new DbField('patient_services', 'patient_services', 'x_RepeatedDate', 'RepeatedDate', '`RepeatedDate`', CastDateFieldForLike("`RepeatedDate`", 0, "DB"), 135, 19, 0, false, '`RepeatedDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RepeatedDate->Sortable = true; // Allow sort
        $this->RepeatedDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['RepeatedDate'] = &$this->RepeatedDate;

        // serviceID
        $this->serviceID = new DbField('patient_services', 'patient_services', 'x_serviceID', 'serviceID', '`serviceID`', '`serviceID`', 3, 11, -1, false, '`serviceID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->serviceID->Sortable = true; // Allow sort
        $this->serviceID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['serviceID'] = &$this->serviceID;

        // Service_Type
        $this->Service_Type = new DbField('patient_services', 'patient_services', 'x_Service_Type', 'Service_Type', '`Service_Type`', '`Service_Type`', 200, 45, -1, false, '`Service_Type`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Service_Type->Sortable = true; // Allow sort
        $this->Fields['Service_Type'] = &$this->Service_Type;

        // Service_Department
        $this->Service_Department = new DbField('patient_services', 'patient_services', 'x_Service_Department', 'Service_Department', '`Service_Department`', '`Service_Department`', 200, 45, -1, false, '`Service_Department`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Service_Department->Sortable = true; // Allow sort
        $this->Fields['Service_Department'] = &$this->Service_Department;

        // RequestNo
        $this->RequestNo = new DbField('patient_services', 'patient_services', 'x_RequestNo', 'RequestNo', '`RequestNo`', '`RequestNo`', 3, 11, -1, false, '`RequestNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RequestNo->Sortable = true; // Allow sort
        $this->RequestNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['RequestNo'] = &$this->RequestNo;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`patient_services`";
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
        $this->DefaultFilter = "";
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
            $sql = $sql->resetQueryPart("orderBy")->getSQL();
        }
        $pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';
        // Skip Custom View / SubQuery / SELECT DISTINCT / ORDER BY
        if (
            ($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
            preg_match($pattern, $sql) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sql) &&
            !preg_match('/^\s*select\s+distinct\s+/i', $sql) && !preg_match('/\s+order\s+by\s+/i', $sql)
        ) {
            $sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sql);
        } else {
            $sqlwrk = "SELECT COUNT(*) FROM (" . $sql . ") COUNT_TABLE";
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
        $this->PatID->DbValue = $row['PatID'];
        $this->mrnno->DbValue = $row['mrnno'];
        $this->PatientName->DbValue = $row['PatientName'];
        $this->Age->DbValue = $row['Age'];
        $this->Gender->DbValue = $row['Gender'];
        $this->profilePic->DbValue = $row['profilePic'];
        $this->Services->DbValue = $row['Services'];
        $this->Unit->DbValue = $row['Unit'];
        $this->amount->DbValue = $row['amount'];
        $this->Quantity->DbValue = $row['Quantity'];
        $this->Discount->DbValue = $row['Discount'];
        $this->SubTotal->DbValue = $row['SubTotal'];
        $this->description->DbValue = $row['description'];
        $this->patient_type->DbValue = $row['patient_type'];
        $this->charged_date->DbValue = $row['charged_date'];
        $this->status->DbValue = $row['status'];
        $this->createdby->DbValue = $row['createdby'];
        $this->createddatetime->DbValue = $row['createddatetime'];
        $this->modifiedby->DbValue = $row['modifiedby'];
        $this->modifieddatetime->DbValue = $row['modifieddatetime'];
        $this->Aid->DbValue = $row['Aid'];
        $this->Vid->DbValue = $row['Vid'];
        $this->DrID->DbValue = $row['DrID'];
        $this->DrCODE->DbValue = $row['DrCODE'];
        $this->DrName->DbValue = $row['DrName'];
        $this->Department->DbValue = $row['Department'];
        $this->DrSharePres->DbValue = $row['DrSharePres'];
        $this->HospSharePres->DbValue = $row['HospSharePres'];
        $this->DrShareAmount->DbValue = $row['DrShareAmount'];
        $this->HospShareAmount->DbValue = $row['HospShareAmount'];
        $this->DrShareSettiledAmount->DbValue = $row['DrShareSettiledAmount'];
        $this->DrShareSettledId->DbValue = $row['DrShareSettledId'];
        $this->DrShareSettiledStatus->DbValue = $row['DrShareSettiledStatus'];
        $this->invoiceId->DbValue = $row['invoiceId'];
        $this->invoiceAmount->DbValue = $row['invoiceAmount'];
        $this->invoiceStatus->DbValue = $row['invoiceStatus'];
        $this->modeOfPayment->DbValue = $row['modeOfPayment'];
        $this->HospID->DbValue = $row['HospID'];
        $this->RIDNO->DbValue = $row['RIDNO'];
        $this->TidNo->DbValue = $row['TidNo'];
        $this->DiscountCategory->DbValue = $row['DiscountCategory'];
        $this->sid->DbValue = $row['sid'];
        $this->ItemCode->DbValue = $row['ItemCode'];
        $this->TestSubCd->DbValue = $row['TestSubCd'];
        $this->DEptCd->DbValue = $row['DEptCd'];
        $this->ProfCd->DbValue = $row['ProfCd'];
        $this->LabReport->DbValue = $row['LabReport'];
        $this->Comments->DbValue = $row['Comments'];
        $this->Method->DbValue = $row['Method'];
        $this->Specimen->DbValue = $row['Specimen'];
        $this->Abnormal->DbValue = $row['Abnormal'];
        $this->RefValue->DbValue = $row['RefValue'];
        $this->TestUnit->DbValue = $row['TestUnit'];
        $this->LOWHIGH->DbValue = $row['LOWHIGH'];
        $this->Branch->DbValue = $row['Branch'];
        $this->Dispatch->DbValue = $row['Dispatch'];
        $this->Pic1->DbValue = $row['Pic1'];
        $this->Pic2->DbValue = $row['Pic2'];
        $this->GraphPath->DbValue = $row['GraphPath'];
        $this->MachineCD->DbValue = $row['MachineCD'];
        $this->TestCancel->DbValue = $row['TestCancel'];
        $this->OutSource->DbValue = $row['OutSource'];
        $this->Printed->DbValue = $row['Printed'];
        $this->PrintBy->DbValue = $row['PrintBy'];
        $this->PrintDate->DbValue = $row['PrintDate'];
        $this->BillingDate->DbValue = $row['BillingDate'];
        $this->BilledBy->DbValue = $row['BilledBy'];
        $this->Resulted->DbValue = $row['Resulted'];
        $this->ResultDate->DbValue = $row['ResultDate'];
        $this->ResultedBy->DbValue = $row['ResultedBy'];
        $this->SampleDate->DbValue = $row['SampleDate'];
        $this->SampleUser->DbValue = $row['SampleUser'];
        $this->Sampled->DbValue = $row['Sampled'];
        $this->ReceivedDate->DbValue = $row['ReceivedDate'];
        $this->ReceivedUser->DbValue = $row['ReceivedUser'];
        $this->Recevied->DbValue = $row['Recevied'];
        $this->DeptRecvDate->DbValue = $row['DeptRecvDate'];
        $this->DeptRecvUser->DbValue = $row['DeptRecvUser'];
        $this->DeptRecived->DbValue = $row['DeptRecived'];
        $this->SAuthDate->DbValue = $row['SAuthDate'];
        $this->SAuthBy->DbValue = $row['SAuthBy'];
        $this->SAuthendicate->DbValue = $row['SAuthendicate'];
        $this->AuthDate->DbValue = $row['AuthDate'];
        $this->AuthBy->DbValue = $row['AuthBy'];
        $this->Authencate->DbValue = $row['Authencate'];
        $this->EditDate->DbValue = $row['EditDate'];
        $this->EditBy->DbValue = $row['EditBy'];
        $this->Editted->DbValue = $row['Editted'];
        $this->PatientId->DbValue = $row['PatientId'];
        $this->Mobile->DbValue = $row['Mobile'];
        $this->CId->DbValue = $row['CId'];
        $this->Order->DbValue = $row['Order'];
        $this->Form->DbValue = $row['Form'];
        $this->ResType->DbValue = $row['ResType'];
        $this->Sample->DbValue = $row['Sample'];
        $this->NoD->DbValue = $row['NoD'];
        $this->BillOrder->DbValue = $row['BillOrder'];
        $this->Formula->DbValue = $row['Formula'];
        $this->Inactive->DbValue = $row['Inactive'];
        $this->CollSample->DbValue = $row['CollSample'];
        $this->TestType->DbValue = $row['TestType'];
        $this->Repeated->DbValue = $row['Repeated'];
        $this->RepeatedBy->DbValue = $row['RepeatedBy'];
        $this->RepeatedDate->DbValue = $row['RepeatedDate'];
        $this->serviceID->DbValue = $row['serviceID'];
        $this->Service_Type->DbValue = $row['Service_Type'];
        $this->Service_Department->DbValue = $row['Service_Department'];
        $this->RequestNo->DbValue = $row['RequestNo'];
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
        $name = PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL");
        // Get referer URL automatically
        if (ReferUrl() != "" && ReferPageName() != CurrentPageName() && ReferPageName() != "login") { // Referer not same page or login page
            $_SESSION[$name] = ReferUrl(); // Save to Session
        }
        if (@$_SESSION[$name] != "") {
            return $_SESSION[$name];
        } else {
            return GetUrl("PatientServicesList");
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
        if ($pageName == "PatientServicesView") {
            return $Language->phrase("View");
        } elseif ($pageName == "PatientServicesEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "PatientServicesAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "PatientServicesList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("PatientServicesView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("PatientServicesView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "PatientServicesAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "PatientServicesAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("PatientServicesEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("PatientServicesAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("PatientServicesDelete", $this->getUrlParm());
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
        $this->PatID->setDbValue($row['PatID']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->Age->setDbValue($row['Age']);
        $this->Gender->setDbValue($row['Gender']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->Services->setDbValue($row['Services']);
        $this->Unit->setDbValue($row['Unit']);
        $this->amount->setDbValue($row['amount']);
        $this->Quantity->setDbValue($row['Quantity']);
        $this->Discount->setDbValue($row['Discount']);
        $this->SubTotal->setDbValue($row['SubTotal']);
        $this->description->setDbValue($row['description']);
        $this->patient_type->setDbValue($row['patient_type']);
        $this->charged_date->setDbValue($row['charged_date']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->Aid->setDbValue($row['Aid']);
        $this->Vid->setDbValue($row['Vid']);
        $this->DrID->setDbValue($row['DrID']);
        $this->DrCODE->setDbValue($row['DrCODE']);
        $this->DrName->setDbValue($row['DrName']);
        $this->Department->setDbValue($row['Department']);
        $this->DrSharePres->setDbValue($row['DrSharePres']);
        $this->HospSharePres->setDbValue($row['HospSharePres']);
        $this->DrShareAmount->setDbValue($row['DrShareAmount']);
        $this->HospShareAmount->setDbValue($row['HospShareAmount']);
        $this->DrShareSettiledAmount->setDbValue($row['DrShareSettiledAmount']);
        $this->DrShareSettledId->setDbValue($row['DrShareSettledId']);
        $this->DrShareSettiledStatus->setDbValue($row['DrShareSettiledStatus']);
        $this->invoiceId->setDbValue($row['invoiceId']);
        $this->invoiceAmount->setDbValue($row['invoiceAmount']);
        $this->invoiceStatus->setDbValue($row['invoiceStatus']);
        $this->modeOfPayment->setDbValue($row['modeOfPayment']);
        $this->HospID->setDbValue($row['HospID']);
        $this->RIDNO->setDbValue($row['RIDNO']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->DiscountCategory->setDbValue($row['DiscountCategory']);
        $this->sid->setDbValue($row['sid']);
        $this->ItemCode->setDbValue($row['ItemCode']);
        $this->TestSubCd->setDbValue($row['TestSubCd']);
        $this->DEptCd->setDbValue($row['DEptCd']);
        $this->ProfCd->setDbValue($row['ProfCd']);
        $this->LabReport->setDbValue($row['LabReport']);
        $this->Comments->setDbValue($row['Comments']);
        $this->Method->setDbValue($row['Method']);
        $this->Specimen->setDbValue($row['Specimen']);
        $this->Abnormal->setDbValue($row['Abnormal']);
        $this->RefValue->setDbValue($row['RefValue']);
        $this->TestUnit->setDbValue($row['TestUnit']);
        $this->LOWHIGH->setDbValue($row['LOWHIGH']);
        $this->Branch->setDbValue($row['Branch']);
        $this->Dispatch->setDbValue($row['Dispatch']);
        $this->Pic1->setDbValue($row['Pic1']);
        $this->Pic2->setDbValue($row['Pic2']);
        $this->GraphPath->setDbValue($row['GraphPath']);
        $this->MachineCD->setDbValue($row['MachineCD']);
        $this->TestCancel->setDbValue($row['TestCancel']);
        $this->OutSource->setDbValue($row['OutSource']);
        $this->Printed->setDbValue($row['Printed']);
        $this->PrintBy->setDbValue($row['PrintBy']);
        $this->PrintDate->setDbValue($row['PrintDate']);
        $this->BillingDate->setDbValue($row['BillingDate']);
        $this->BilledBy->setDbValue($row['BilledBy']);
        $this->Resulted->setDbValue($row['Resulted']);
        $this->ResultDate->setDbValue($row['ResultDate']);
        $this->ResultedBy->setDbValue($row['ResultedBy']);
        $this->SampleDate->setDbValue($row['SampleDate']);
        $this->SampleUser->setDbValue($row['SampleUser']);
        $this->Sampled->setDbValue($row['Sampled']);
        $this->ReceivedDate->setDbValue($row['ReceivedDate']);
        $this->ReceivedUser->setDbValue($row['ReceivedUser']);
        $this->Recevied->setDbValue($row['Recevied']);
        $this->DeptRecvDate->setDbValue($row['DeptRecvDate']);
        $this->DeptRecvUser->setDbValue($row['DeptRecvUser']);
        $this->DeptRecived->setDbValue($row['DeptRecived']);
        $this->SAuthDate->setDbValue($row['SAuthDate']);
        $this->SAuthBy->setDbValue($row['SAuthBy']);
        $this->SAuthendicate->setDbValue($row['SAuthendicate']);
        $this->AuthDate->setDbValue($row['AuthDate']);
        $this->AuthBy->setDbValue($row['AuthBy']);
        $this->Authencate->setDbValue($row['Authencate']);
        $this->EditDate->setDbValue($row['EditDate']);
        $this->EditBy->setDbValue($row['EditBy']);
        $this->Editted->setDbValue($row['Editted']);
        $this->PatientId->setDbValue($row['PatientId']);
        $this->Mobile->setDbValue($row['Mobile']);
        $this->CId->setDbValue($row['CId']);
        $this->Order->setDbValue($row['Order']);
        $this->Form->setDbValue($row['Form']);
        $this->ResType->setDbValue($row['ResType']);
        $this->Sample->setDbValue($row['Sample']);
        $this->NoD->setDbValue($row['NoD']);
        $this->BillOrder->setDbValue($row['BillOrder']);
        $this->Formula->setDbValue($row['Formula']);
        $this->Inactive->setDbValue($row['Inactive']);
        $this->CollSample->setDbValue($row['CollSample']);
        $this->TestType->setDbValue($row['TestType']);
        $this->Repeated->setDbValue($row['Repeated']);
        $this->RepeatedBy->setDbValue($row['RepeatedBy']);
        $this->RepeatedDate->setDbValue($row['RepeatedDate']);
        $this->serviceID->setDbValue($row['serviceID']);
        $this->Service_Type->setDbValue($row['Service_Type']);
        $this->Service_Department->setDbValue($row['Service_Department']);
        $this->RequestNo->setDbValue($row['RequestNo']);
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

        // PatID

        // mrnno

        // PatientName

        // Age

        // Gender

        // profilePic

        // Services

        // Unit

        // amount

        // Quantity

        // Discount

        // SubTotal

        // description

        // patient_type

        // charged_date

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // Aid

        // Vid

        // DrID

        // DrCODE

        // DrName

        // Department

        // DrSharePres

        // HospSharePres

        // DrShareAmount

        // HospShareAmount

        // DrShareSettiledAmount

        // DrShareSettledId

        // DrShareSettiledStatus

        // invoiceId

        // invoiceAmount

        // invoiceStatus

        // modeOfPayment

        // HospID

        // RIDNO

        // TidNo

        // DiscountCategory

        // sid

        // ItemCode

        // TestSubCd

        // DEptCd

        // ProfCd

        // LabReport

        // Comments

        // Method

        // Specimen

        // Abnormal

        // RefValue

        // TestUnit

        // LOWHIGH

        // Branch

        // Dispatch

        // Pic1

        // Pic2

        // GraphPath

        // MachineCD

        // TestCancel

        // OutSource

        // Printed

        // PrintBy

        // PrintDate

        // BillingDate

        // BilledBy

        // Resulted

        // ResultDate

        // ResultedBy

        // SampleDate

        // SampleUser

        // Sampled

        // ReceivedDate

        // ReceivedUser

        // Recevied

        // DeptRecvDate

        // DeptRecvUser

        // DeptRecived

        // SAuthDate

        // SAuthBy

        // SAuthendicate

        // AuthDate

        // AuthBy

        // Authencate

        // EditDate

        // EditBy

        // Editted

        // PatientId

        // Mobile

        // CId

        // Order

        // Form

        // ResType

        // Sample

        // NoD

        // BillOrder

        // Formula

        // Inactive

        // CollSample

        // TestType

        // Repeated

        // RepeatedBy

        // RepeatedDate

        // serviceID

        // Service_Type

        // Service_Department

        // RequestNo

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // Reception
        $this->Reception->ViewValue = $this->Reception->CurrentValue;
        $this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
        $this->Reception->ViewCustomAttributes = "";

        // PatID
        $this->PatID->ViewValue = $this->PatID->CurrentValue;
        $this->PatID->ViewValue = FormatNumber($this->PatID->ViewValue, 0, -2, -2, -2);
        $this->PatID->ViewCustomAttributes = "";

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

        // Services
        $this->Services->ViewValue = $this->Services->CurrentValue;
        $this->Services->ViewCustomAttributes = "";

        // Unit
        $this->Unit->ViewValue = $this->Unit->CurrentValue;
        $this->Unit->ViewValue = FormatNumber($this->Unit->ViewValue, 0, -2, -2, -2);
        $this->Unit->ViewCustomAttributes = "";

        // amount
        $this->amount->ViewValue = $this->amount->CurrentValue;
        $this->amount->ViewValue = FormatNumber($this->amount->ViewValue, 2, -2, -2, -2);
        $this->amount->ViewCustomAttributes = "";

        // Quantity
        $this->Quantity->ViewValue = $this->Quantity->CurrentValue;
        $this->Quantity->ViewValue = FormatNumber($this->Quantity->ViewValue, 0, -2, -2, -2);
        $this->Quantity->ViewCustomAttributes = "";

        // Discount
        $this->Discount->ViewValue = $this->Discount->CurrentValue;
        $this->Discount->ViewValue = FormatNumber($this->Discount->ViewValue, 2, -2, -2, -2);
        $this->Discount->ViewCustomAttributes = "";

        // SubTotal
        $this->SubTotal->ViewValue = $this->SubTotal->CurrentValue;
        $this->SubTotal->ViewValue = FormatNumber($this->SubTotal->ViewValue, 2, -2, -2, -2);
        $this->SubTotal->ViewCustomAttributes = "";

        // description
        $this->description->ViewValue = $this->description->CurrentValue;
        $this->description->ViewCustomAttributes = "";

        // patient_type
        $this->patient_type->ViewValue = $this->patient_type->CurrentValue;
        $this->patient_type->ViewValue = FormatNumber($this->patient_type->ViewValue, 0, -2, -2, -2);
        $this->patient_type->ViewCustomAttributes = "";

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

        // Aid
        $this->Aid->ViewValue = $this->Aid->CurrentValue;
        $this->Aid->ViewValue = FormatNumber($this->Aid->ViewValue, 0, -2, -2, -2);
        $this->Aid->ViewCustomAttributes = "";

        // Vid
        $this->Vid->ViewValue = $this->Vid->CurrentValue;
        $this->Vid->ViewValue = FormatNumber($this->Vid->ViewValue, 0, -2, -2, -2);
        $this->Vid->ViewCustomAttributes = "";

        // DrID
        $this->DrID->ViewValue = $this->DrID->CurrentValue;
        $this->DrID->ViewValue = FormatNumber($this->DrID->ViewValue, 0, -2, -2, -2);
        $this->DrID->ViewCustomAttributes = "";

        // DrCODE
        $this->DrCODE->ViewValue = $this->DrCODE->CurrentValue;
        $this->DrCODE->ViewCustomAttributes = "";

        // DrName
        $this->DrName->ViewValue = $this->DrName->CurrentValue;
        $this->DrName->ViewCustomAttributes = "";

        // Department
        $this->Department->ViewValue = $this->Department->CurrentValue;
        $this->Department->ViewCustomAttributes = "";

        // DrSharePres
        $this->DrSharePres->ViewValue = $this->DrSharePres->CurrentValue;
        $this->DrSharePres->ViewValue = FormatNumber($this->DrSharePres->ViewValue, 2, -2, -2, -2);
        $this->DrSharePres->ViewCustomAttributes = "";

        // HospSharePres
        $this->HospSharePres->ViewValue = $this->HospSharePres->CurrentValue;
        $this->HospSharePres->ViewValue = FormatNumber($this->HospSharePres->ViewValue, 2, -2, -2, -2);
        $this->HospSharePres->ViewCustomAttributes = "";

        // DrShareAmount
        $this->DrShareAmount->ViewValue = $this->DrShareAmount->CurrentValue;
        $this->DrShareAmount->ViewValue = FormatNumber($this->DrShareAmount->ViewValue, 2, -2, -2, -2);
        $this->DrShareAmount->ViewCustomAttributes = "";

        // HospShareAmount
        $this->HospShareAmount->ViewValue = $this->HospShareAmount->CurrentValue;
        $this->HospShareAmount->ViewValue = FormatNumber($this->HospShareAmount->ViewValue, 2, -2, -2, -2);
        $this->HospShareAmount->ViewCustomAttributes = "";

        // DrShareSettiledAmount
        $this->DrShareSettiledAmount->ViewValue = $this->DrShareSettiledAmount->CurrentValue;
        $this->DrShareSettiledAmount->ViewValue = FormatNumber($this->DrShareSettiledAmount->ViewValue, 2, -2, -2, -2);
        $this->DrShareSettiledAmount->ViewCustomAttributes = "";

        // DrShareSettledId
        $this->DrShareSettledId->ViewValue = $this->DrShareSettledId->CurrentValue;
        $this->DrShareSettledId->ViewValue = FormatNumber($this->DrShareSettledId->ViewValue, 0, -2, -2, -2);
        $this->DrShareSettledId->ViewCustomAttributes = "";

        // DrShareSettiledStatus
        $this->DrShareSettiledStatus->ViewValue = $this->DrShareSettiledStatus->CurrentValue;
        $this->DrShareSettiledStatus->ViewValue = FormatNumber($this->DrShareSettiledStatus->ViewValue, 0, -2, -2, -2);
        $this->DrShareSettiledStatus->ViewCustomAttributes = "";

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

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

        // RIDNO
        $this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
        $this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
        $this->RIDNO->ViewCustomAttributes = "";

        // TidNo
        $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
        $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
        $this->TidNo->ViewCustomAttributes = "";

        // DiscountCategory
        $this->DiscountCategory->ViewValue = $this->DiscountCategory->CurrentValue;
        $this->DiscountCategory->ViewCustomAttributes = "";

        // sid
        $this->sid->ViewValue = $this->sid->CurrentValue;
        $this->sid->ViewValue = FormatNumber($this->sid->ViewValue, 0, -2, -2, -2);
        $this->sid->ViewCustomAttributes = "";

        // ItemCode
        $this->ItemCode->ViewValue = $this->ItemCode->CurrentValue;
        $this->ItemCode->ViewCustomAttributes = "";

        // TestSubCd
        $this->TestSubCd->ViewValue = $this->TestSubCd->CurrentValue;
        $this->TestSubCd->ViewCustomAttributes = "";

        // DEptCd
        $this->DEptCd->ViewValue = $this->DEptCd->CurrentValue;
        $this->DEptCd->ViewCustomAttributes = "";

        // ProfCd
        $this->ProfCd->ViewValue = $this->ProfCd->CurrentValue;
        $this->ProfCd->ViewCustomAttributes = "";

        // LabReport
        $this->LabReport->ViewValue = $this->LabReport->CurrentValue;
        $this->LabReport->ViewCustomAttributes = "";

        // Comments
        $this->Comments->ViewValue = $this->Comments->CurrentValue;
        $this->Comments->ViewCustomAttributes = "";

        // Method
        $this->Method->ViewValue = $this->Method->CurrentValue;
        $this->Method->ViewCustomAttributes = "";

        // Specimen
        $this->Specimen->ViewValue = $this->Specimen->CurrentValue;
        $this->Specimen->ViewCustomAttributes = "";

        // Abnormal
        $this->Abnormal->ViewValue = $this->Abnormal->CurrentValue;
        $this->Abnormal->ViewCustomAttributes = "";

        // RefValue
        $this->RefValue->ViewValue = $this->RefValue->CurrentValue;
        $this->RefValue->ViewCustomAttributes = "";

        // TestUnit
        $this->TestUnit->ViewValue = $this->TestUnit->CurrentValue;
        $this->TestUnit->ViewCustomAttributes = "";

        // LOWHIGH
        $this->LOWHIGH->ViewValue = $this->LOWHIGH->CurrentValue;
        $this->LOWHIGH->ViewCustomAttributes = "";

        // Branch
        $this->Branch->ViewValue = $this->Branch->CurrentValue;
        $this->Branch->ViewCustomAttributes = "";

        // Dispatch
        $this->Dispatch->ViewValue = $this->Dispatch->CurrentValue;
        $this->Dispatch->ViewCustomAttributes = "";

        // Pic1
        $this->Pic1->ViewValue = $this->Pic1->CurrentValue;
        $this->Pic1->ViewCustomAttributes = "";

        // Pic2
        $this->Pic2->ViewValue = $this->Pic2->CurrentValue;
        $this->Pic2->ViewCustomAttributes = "";

        // GraphPath
        $this->GraphPath->ViewValue = $this->GraphPath->CurrentValue;
        $this->GraphPath->ViewCustomAttributes = "";

        // MachineCD
        $this->MachineCD->ViewValue = $this->MachineCD->CurrentValue;
        $this->MachineCD->ViewCustomAttributes = "";

        // TestCancel
        $this->TestCancel->ViewValue = $this->TestCancel->CurrentValue;
        $this->TestCancel->ViewCustomAttributes = "";

        // OutSource
        $this->OutSource->ViewValue = $this->OutSource->CurrentValue;
        $this->OutSource->ViewCustomAttributes = "";

        // Printed
        $this->Printed->ViewValue = $this->Printed->CurrentValue;
        $this->Printed->ViewCustomAttributes = "";

        // PrintBy
        $this->PrintBy->ViewValue = $this->PrintBy->CurrentValue;
        $this->PrintBy->ViewCustomAttributes = "";

        // PrintDate
        $this->PrintDate->ViewValue = $this->PrintDate->CurrentValue;
        $this->PrintDate->ViewValue = FormatDateTime($this->PrintDate->ViewValue, 0);
        $this->PrintDate->ViewCustomAttributes = "";

        // BillingDate
        $this->BillingDate->ViewValue = $this->BillingDate->CurrentValue;
        $this->BillingDate->ViewValue = FormatDateTime($this->BillingDate->ViewValue, 0);
        $this->BillingDate->ViewCustomAttributes = "";

        // BilledBy
        $this->BilledBy->ViewValue = $this->BilledBy->CurrentValue;
        $this->BilledBy->ViewCustomAttributes = "";

        // Resulted
        $this->Resulted->ViewValue = $this->Resulted->CurrentValue;
        $this->Resulted->ViewCustomAttributes = "";

        // ResultDate
        $this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
        $this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 0);
        $this->ResultDate->ViewCustomAttributes = "";

        // ResultedBy
        $this->ResultedBy->ViewValue = $this->ResultedBy->CurrentValue;
        $this->ResultedBy->ViewCustomAttributes = "";

        // SampleDate
        $this->SampleDate->ViewValue = $this->SampleDate->CurrentValue;
        $this->SampleDate->ViewValue = FormatDateTime($this->SampleDate->ViewValue, 0);
        $this->SampleDate->ViewCustomAttributes = "";

        // SampleUser
        $this->SampleUser->ViewValue = $this->SampleUser->CurrentValue;
        $this->SampleUser->ViewCustomAttributes = "";

        // Sampled
        $this->Sampled->ViewValue = $this->Sampled->CurrentValue;
        $this->Sampled->ViewCustomAttributes = "";

        // ReceivedDate
        $this->ReceivedDate->ViewValue = $this->ReceivedDate->CurrentValue;
        $this->ReceivedDate->ViewValue = FormatDateTime($this->ReceivedDate->ViewValue, 0);
        $this->ReceivedDate->ViewCustomAttributes = "";

        // ReceivedUser
        $this->ReceivedUser->ViewValue = $this->ReceivedUser->CurrentValue;
        $this->ReceivedUser->ViewCustomAttributes = "";

        // Recevied
        $this->Recevied->ViewValue = $this->Recevied->CurrentValue;
        $this->Recevied->ViewCustomAttributes = "";

        // DeptRecvDate
        $this->DeptRecvDate->ViewValue = $this->DeptRecvDate->CurrentValue;
        $this->DeptRecvDate->ViewValue = FormatDateTime($this->DeptRecvDate->ViewValue, 0);
        $this->DeptRecvDate->ViewCustomAttributes = "";

        // DeptRecvUser
        $this->DeptRecvUser->ViewValue = $this->DeptRecvUser->CurrentValue;
        $this->DeptRecvUser->ViewCustomAttributes = "";

        // DeptRecived
        $this->DeptRecived->ViewValue = $this->DeptRecived->CurrentValue;
        $this->DeptRecived->ViewCustomAttributes = "";

        // SAuthDate
        $this->SAuthDate->ViewValue = $this->SAuthDate->CurrentValue;
        $this->SAuthDate->ViewValue = FormatDateTime($this->SAuthDate->ViewValue, 0);
        $this->SAuthDate->ViewCustomAttributes = "";

        // SAuthBy
        $this->SAuthBy->ViewValue = $this->SAuthBy->CurrentValue;
        $this->SAuthBy->ViewCustomAttributes = "";

        // SAuthendicate
        $this->SAuthendicate->ViewValue = $this->SAuthendicate->CurrentValue;
        $this->SAuthendicate->ViewCustomAttributes = "";

        // AuthDate
        $this->AuthDate->ViewValue = $this->AuthDate->CurrentValue;
        $this->AuthDate->ViewValue = FormatDateTime($this->AuthDate->ViewValue, 0);
        $this->AuthDate->ViewCustomAttributes = "";

        // AuthBy
        $this->AuthBy->ViewValue = $this->AuthBy->CurrentValue;
        $this->AuthBy->ViewCustomAttributes = "";

        // Authencate
        $this->Authencate->ViewValue = $this->Authencate->CurrentValue;
        $this->Authencate->ViewCustomAttributes = "";

        // EditDate
        $this->EditDate->ViewValue = $this->EditDate->CurrentValue;
        $this->EditDate->ViewValue = FormatDateTime($this->EditDate->ViewValue, 0);
        $this->EditDate->ViewCustomAttributes = "";

        // EditBy
        $this->EditBy->ViewValue = $this->EditBy->CurrentValue;
        $this->EditBy->ViewCustomAttributes = "";

        // Editted
        $this->Editted->ViewValue = $this->Editted->CurrentValue;
        $this->Editted->ViewCustomAttributes = "";

        // PatientId
        $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
        $this->PatientId->ViewCustomAttributes = "";

        // Mobile
        $this->Mobile->ViewValue = $this->Mobile->CurrentValue;
        $this->Mobile->ViewCustomAttributes = "";

        // CId
        $this->CId->ViewValue = $this->CId->CurrentValue;
        $this->CId->ViewValue = FormatNumber($this->CId->ViewValue, 0, -2, -2, -2);
        $this->CId->ViewCustomAttributes = "";

        // Order
        $this->Order->ViewValue = $this->Order->CurrentValue;
        $this->Order->ViewValue = FormatNumber($this->Order->ViewValue, 2, -2, -2, -2);
        $this->Order->ViewCustomAttributes = "";

        // Form
        $this->Form->ViewValue = $this->Form->CurrentValue;
        $this->Form->ViewCustomAttributes = "";

        // ResType
        $this->ResType->ViewValue = $this->ResType->CurrentValue;
        $this->ResType->ViewCustomAttributes = "";

        // Sample
        $this->Sample->ViewValue = $this->Sample->CurrentValue;
        $this->Sample->ViewCustomAttributes = "";

        // NoD
        $this->NoD->ViewValue = $this->NoD->CurrentValue;
        $this->NoD->ViewValue = FormatNumber($this->NoD->ViewValue, 2, -2, -2, -2);
        $this->NoD->ViewCustomAttributes = "";

        // BillOrder
        $this->BillOrder->ViewValue = $this->BillOrder->CurrentValue;
        $this->BillOrder->ViewValue = FormatNumber($this->BillOrder->ViewValue, 2, -2, -2, -2);
        $this->BillOrder->ViewCustomAttributes = "";

        // Formula
        $this->Formula->ViewValue = $this->Formula->CurrentValue;
        $this->Formula->ViewCustomAttributes = "";

        // Inactive
        $this->Inactive->ViewValue = $this->Inactive->CurrentValue;
        $this->Inactive->ViewCustomAttributes = "";

        // CollSample
        $this->CollSample->ViewValue = $this->CollSample->CurrentValue;
        $this->CollSample->ViewCustomAttributes = "";

        // TestType
        $this->TestType->ViewValue = $this->TestType->CurrentValue;
        $this->TestType->ViewCustomAttributes = "";

        // Repeated
        $this->Repeated->ViewValue = $this->Repeated->CurrentValue;
        $this->Repeated->ViewCustomAttributes = "";

        // RepeatedBy
        $this->RepeatedBy->ViewValue = $this->RepeatedBy->CurrentValue;
        $this->RepeatedBy->ViewCustomAttributes = "";

        // RepeatedDate
        $this->RepeatedDate->ViewValue = $this->RepeatedDate->CurrentValue;
        $this->RepeatedDate->ViewValue = FormatDateTime($this->RepeatedDate->ViewValue, 0);
        $this->RepeatedDate->ViewCustomAttributes = "";

        // serviceID
        $this->serviceID->ViewValue = $this->serviceID->CurrentValue;
        $this->serviceID->ViewValue = FormatNumber($this->serviceID->ViewValue, 0, -2, -2, -2);
        $this->serviceID->ViewCustomAttributes = "";

        // Service_Type
        $this->Service_Type->ViewValue = $this->Service_Type->CurrentValue;
        $this->Service_Type->ViewCustomAttributes = "";

        // Service_Department
        $this->Service_Department->ViewValue = $this->Service_Department->CurrentValue;
        $this->Service_Department->ViewCustomAttributes = "";

        // RequestNo
        $this->RequestNo->ViewValue = $this->RequestNo->CurrentValue;
        $this->RequestNo->ViewValue = FormatNumber($this->RequestNo->ViewValue, 0, -2, -2, -2);
        $this->RequestNo->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // Reception
        $this->Reception->LinkCustomAttributes = "";
        $this->Reception->HrefValue = "";
        $this->Reception->TooltipValue = "";

        // PatID
        $this->PatID->LinkCustomAttributes = "";
        $this->PatID->HrefValue = "";
        $this->PatID->TooltipValue = "";

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

        // Services
        $this->Services->LinkCustomAttributes = "";
        $this->Services->HrefValue = "";
        $this->Services->TooltipValue = "";

        // Unit
        $this->Unit->LinkCustomAttributes = "";
        $this->Unit->HrefValue = "";
        $this->Unit->TooltipValue = "";

        // amount
        $this->amount->LinkCustomAttributes = "";
        $this->amount->HrefValue = "";
        $this->amount->TooltipValue = "";

        // Quantity
        $this->Quantity->LinkCustomAttributes = "";
        $this->Quantity->HrefValue = "";
        $this->Quantity->TooltipValue = "";

        // Discount
        $this->Discount->LinkCustomAttributes = "";
        $this->Discount->HrefValue = "";
        $this->Discount->TooltipValue = "";

        // SubTotal
        $this->SubTotal->LinkCustomAttributes = "";
        $this->SubTotal->HrefValue = "";
        $this->SubTotal->TooltipValue = "";

        // description
        $this->description->LinkCustomAttributes = "";
        $this->description->HrefValue = "";
        $this->description->TooltipValue = "";

        // patient_type
        $this->patient_type->LinkCustomAttributes = "";
        $this->patient_type->HrefValue = "";
        $this->patient_type->TooltipValue = "";

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

        // Aid
        $this->Aid->LinkCustomAttributes = "";
        $this->Aid->HrefValue = "";
        $this->Aid->TooltipValue = "";

        // Vid
        $this->Vid->LinkCustomAttributes = "";
        $this->Vid->HrefValue = "";
        $this->Vid->TooltipValue = "";

        // DrID
        $this->DrID->LinkCustomAttributes = "";
        $this->DrID->HrefValue = "";
        $this->DrID->TooltipValue = "";

        // DrCODE
        $this->DrCODE->LinkCustomAttributes = "";
        $this->DrCODE->HrefValue = "";
        $this->DrCODE->TooltipValue = "";

        // DrName
        $this->DrName->LinkCustomAttributes = "";
        $this->DrName->HrefValue = "";
        $this->DrName->TooltipValue = "";

        // Department
        $this->Department->LinkCustomAttributes = "";
        $this->Department->HrefValue = "";
        $this->Department->TooltipValue = "";

        // DrSharePres
        $this->DrSharePres->LinkCustomAttributes = "";
        $this->DrSharePres->HrefValue = "";
        $this->DrSharePres->TooltipValue = "";

        // HospSharePres
        $this->HospSharePres->LinkCustomAttributes = "";
        $this->HospSharePres->HrefValue = "";
        $this->HospSharePres->TooltipValue = "";

        // DrShareAmount
        $this->DrShareAmount->LinkCustomAttributes = "";
        $this->DrShareAmount->HrefValue = "";
        $this->DrShareAmount->TooltipValue = "";

        // HospShareAmount
        $this->HospShareAmount->LinkCustomAttributes = "";
        $this->HospShareAmount->HrefValue = "";
        $this->HospShareAmount->TooltipValue = "";

        // DrShareSettiledAmount
        $this->DrShareSettiledAmount->LinkCustomAttributes = "";
        $this->DrShareSettiledAmount->HrefValue = "";
        $this->DrShareSettiledAmount->TooltipValue = "";

        // DrShareSettledId
        $this->DrShareSettledId->LinkCustomAttributes = "";
        $this->DrShareSettledId->HrefValue = "";
        $this->DrShareSettledId->TooltipValue = "";

        // DrShareSettiledStatus
        $this->DrShareSettiledStatus->LinkCustomAttributes = "";
        $this->DrShareSettiledStatus->HrefValue = "";
        $this->DrShareSettiledStatus->TooltipValue = "";

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

        // DiscountCategory
        $this->DiscountCategory->LinkCustomAttributes = "";
        $this->DiscountCategory->HrefValue = "";
        $this->DiscountCategory->TooltipValue = "";

        // sid
        $this->sid->LinkCustomAttributes = "";
        $this->sid->HrefValue = "";
        $this->sid->TooltipValue = "";

        // ItemCode
        $this->ItemCode->LinkCustomAttributes = "";
        $this->ItemCode->HrefValue = "";
        $this->ItemCode->TooltipValue = "";

        // TestSubCd
        $this->TestSubCd->LinkCustomAttributes = "";
        $this->TestSubCd->HrefValue = "";
        $this->TestSubCd->TooltipValue = "";

        // DEptCd
        $this->DEptCd->LinkCustomAttributes = "";
        $this->DEptCd->HrefValue = "";
        $this->DEptCd->TooltipValue = "";

        // ProfCd
        $this->ProfCd->LinkCustomAttributes = "";
        $this->ProfCd->HrefValue = "";
        $this->ProfCd->TooltipValue = "";

        // LabReport
        $this->LabReport->LinkCustomAttributes = "";
        $this->LabReport->HrefValue = "";
        $this->LabReport->TooltipValue = "";

        // Comments
        $this->Comments->LinkCustomAttributes = "";
        $this->Comments->HrefValue = "";
        $this->Comments->TooltipValue = "";

        // Method
        $this->Method->LinkCustomAttributes = "";
        $this->Method->HrefValue = "";
        $this->Method->TooltipValue = "";

        // Specimen
        $this->Specimen->LinkCustomAttributes = "";
        $this->Specimen->HrefValue = "";
        $this->Specimen->TooltipValue = "";

        // Abnormal
        $this->Abnormal->LinkCustomAttributes = "";
        $this->Abnormal->HrefValue = "";
        $this->Abnormal->TooltipValue = "";

        // RefValue
        $this->RefValue->LinkCustomAttributes = "";
        $this->RefValue->HrefValue = "";
        $this->RefValue->TooltipValue = "";

        // TestUnit
        $this->TestUnit->LinkCustomAttributes = "";
        $this->TestUnit->HrefValue = "";
        $this->TestUnit->TooltipValue = "";

        // LOWHIGH
        $this->LOWHIGH->LinkCustomAttributes = "";
        $this->LOWHIGH->HrefValue = "";
        $this->LOWHIGH->TooltipValue = "";

        // Branch
        $this->Branch->LinkCustomAttributes = "";
        $this->Branch->HrefValue = "";
        $this->Branch->TooltipValue = "";

        // Dispatch
        $this->Dispatch->LinkCustomAttributes = "";
        $this->Dispatch->HrefValue = "";
        $this->Dispatch->TooltipValue = "";

        // Pic1
        $this->Pic1->LinkCustomAttributes = "";
        $this->Pic1->HrefValue = "";
        $this->Pic1->TooltipValue = "";

        // Pic2
        $this->Pic2->LinkCustomAttributes = "";
        $this->Pic2->HrefValue = "";
        $this->Pic2->TooltipValue = "";

        // GraphPath
        $this->GraphPath->LinkCustomAttributes = "";
        $this->GraphPath->HrefValue = "";
        $this->GraphPath->TooltipValue = "";

        // MachineCD
        $this->MachineCD->LinkCustomAttributes = "";
        $this->MachineCD->HrefValue = "";
        $this->MachineCD->TooltipValue = "";

        // TestCancel
        $this->TestCancel->LinkCustomAttributes = "";
        $this->TestCancel->HrefValue = "";
        $this->TestCancel->TooltipValue = "";

        // OutSource
        $this->OutSource->LinkCustomAttributes = "";
        $this->OutSource->HrefValue = "";
        $this->OutSource->TooltipValue = "";

        // Printed
        $this->Printed->LinkCustomAttributes = "";
        $this->Printed->HrefValue = "";
        $this->Printed->TooltipValue = "";

        // PrintBy
        $this->PrintBy->LinkCustomAttributes = "";
        $this->PrintBy->HrefValue = "";
        $this->PrintBy->TooltipValue = "";

        // PrintDate
        $this->PrintDate->LinkCustomAttributes = "";
        $this->PrintDate->HrefValue = "";
        $this->PrintDate->TooltipValue = "";

        // BillingDate
        $this->BillingDate->LinkCustomAttributes = "";
        $this->BillingDate->HrefValue = "";
        $this->BillingDate->TooltipValue = "";

        // BilledBy
        $this->BilledBy->LinkCustomAttributes = "";
        $this->BilledBy->HrefValue = "";
        $this->BilledBy->TooltipValue = "";

        // Resulted
        $this->Resulted->LinkCustomAttributes = "";
        $this->Resulted->HrefValue = "";
        $this->Resulted->TooltipValue = "";

        // ResultDate
        $this->ResultDate->LinkCustomAttributes = "";
        $this->ResultDate->HrefValue = "";
        $this->ResultDate->TooltipValue = "";

        // ResultedBy
        $this->ResultedBy->LinkCustomAttributes = "";
        $this->ResultedBy->HrefValue = "";
        $this->ResultedBy->TooltipValue = "";

        // SampleDate
        $this->SampleDate->LinkCustomAttributes = "";
        $this->SampleDate->HrefValue = "";
        $this->SampleDate->TooltipValue = "";

        // SampleUser
        $this->SampleUser->LinkCustomAttributes = "";
        $this->SampleUser->HrefValue = "";
        $this->SampleUser->TooltipValue = "";

        // Sampled
        $this->Sampled->LinkCustomAttributes = "";
        $this->Sampled->HrefValue = "";
        $this->Sampled->TooltipValue = "";

        // ReceivedDate
        $this->ReceivedDate->LinkCustomAttributes = "";
        $this->ReceivedDate->HrefValue = "";
        $this->ReceivedDate->TooltipValue = "";

        // ReceivedUser
        $this->ReceivedUser->LinkCustomAttributes = "";
        $this->ReceivedUser->HrefValue = "";
        $this->ReceivedUser->TooltipValue = "";

        // Recevied
        $this->Recevied->LinkCustomAttributes = "";
        $this->Recevied->HrefValue = "";
        $this->Recevied->TooltipValue = "";

        // DeptRecvDate
        $this->DeptRecvDate->LinkCustomAttributes = "";
        $this->DeptRecvDate->HrefValue = "";
        $this->DeptRecvDate->TooltipValue = "";

        // DeptRecvUser
        $this->DeptRecvUser->LinkCustomAttributes = "";
        $this->DeptRecvUser->HrefValue = "";
        $this->DeptRecvUser->TooltipValue = "";

        // DeptRecived
        $this->DeptRecived->LinkCustomAttributes = "";
        $this->DeptRecived->HrefValue = "";
        $this->DeptRecived->TooltipValue = "";

        // SAuthDate
        $this->SAuthDate->LinkCustomAttributes = "";
        $this->SAuthDate->HrefValue = "";
        $this->SAuthDate->TooltipValue = "";

        // SAuthBy
        $this->SAuthBy->LinkCustomAttributes = "";
        $this->SAuthBy->HrefValue = "";
        $this->SAuthBy->TooltipValue = "";

        // SAuthendicate
        $this->SAuthendicate->LinkCustomAttributes = "";
        $this->SAuthendicate->HrefValue = "";
        $this->SAuthendicate->TooltipValue = "";

        // AuthDate
        $this->AuthDate->LinkCustomAttributes = "";
        $this->AuthDate->HrefValue = "";
        $this->AuthDate->TooltipValue = "";

        // AuthBy
        $this->AuthBy->LinkCustomAttributes = "";
        $this->AuthBy->HrefValue = "";
        $this->AuthBy->TooltipValue = "";

        // Authencate
        $this->Authencate->LinkCustomAttributes = "";
        $this->Authencate->HrefValue = "";
        $this->Authencate->TooltipValue = "";

        // EditDate
        $this->EditDate->LinkCustomAttributes = "";
        $this->EditDate->HrefValue = "";
        $this->EditDate->TooltipValue = "";

        // EditBy
        $this->EditBy->LinkCustomAttributes = "";
        $this->EditBy->HrefValue = "";
        $this->EditBy->TooltipValue = "";

        // Editted
        $this->Editted->LinkCustomAttributes = "";
        $this->Editted->HrefValue = "";
        $this->Editted->TooltipValue = "";

        // PatientId
        $this->PatientId->LinkCustomAttributes = "";
        $this->PatientId->HrefValue = "";
        $this->PatientId->TooltipValue = "";

        // Mobile
        $this->Mobile->LinkCustomAttributes = "";
        $this->Mobile->HrefValue = "";
        $this->Mobile->TooltipValue = "";

        // CId
        $this->CId->LinkCustomAttributes = "";
        $this->CId->HrefValue = "";
        $this->CId->TooltipValue = "";

        // Order
        $this->Order->LinkCustomAttributes = "";
        $this->Order->HrefValue = "";
        $this->Order->TooltipValue = "";

        // Form
        $this->Form->LinkCustomAttributes = "";
        $this->Form->HrefValue = "";
        $this->Form->TooltipValue = "";

        // ResType
        $this->ResType->LinkCustomAttributes = "";
        $this->ResType->HrefValue = "";
        $this->ResType->TooltipValue = "";

        // Sample
        $this->Sample->LinkCustomAttributes = "";
        $this->Sample->HrefValue = "";
        $this->Sample->TooltipValue = "";

        // NoD
        $this->NoD->LinkCustomAttributes = "";
        $this->NoD->HrefValue = "";
        $this->NoD->TooltipValue = "";

        // BillOrder
        $this->BillOrder->LinkCustomAttributes = "";
        $this->BillOrder->HrefValue = "";
        $this->BillOrder->TooltipValue = "";

        // Formula
        $this->Formula->LinkCustomAttributes = "";
        $this->Formula->HrefValue = "";
        $this->Formula->TooltipValue = "";

        // Inactive
        $this->Inactive->LinkCustomAttributes = "";
        $this->Inactive->HrefValue = "";
        $this->Inactive->TooltipValue = "";

        // CollSample
        $this->CollSample->LinkCustomAttributes = "";
        $this->CollSample->HrefValue = "";
        $this->CollSample->TooltipValue = "";

        // TestType
        $this->TestType->LinkCustomAttributes = "";
        $this->TestType->HrefValue = "";
        $this->TestType->TooltipValue = "";

        // Repeated
        $this->Repeated->LinkCustomAttributes = "";
        $this->Repeated->HrefValue = "";
        $this->Repeated->TooltipValue = "";

        // RepeatedBy
        $this->RepeatedBy->LinkCustomAttributes = "";
        $this->RepeatedBy->HrefValue = "";
        $this->RepeatedBy->TooltipValue = "";

        // RepeatedDate
        $this->RepeatedDate->LinkCustomAttributes = "";
        $this->RepeatedDate->HrefValue = "";
        $this->RepeatedDate->TooltipValue = "";

        // serviceID
        $this->serviceID->LinkCustomAttributes = "";
        $this->serviceID->HrefValue = "";
        $this->serviceID->TooltipValue = "";

        // Service_Type
        $this->Service_Type->LinkCustomAttributes = "";
        $this->Service_Type->HrefValue = "";
        $this->Service_Type->TooltipValue = "";

        // Service_Department
        $this->Service_Department->LinkCustomAttributes = "";
        $this->Service_Department->HrefValue = "";
        $this->Service_Department->TooltipValue = "";

        // RequestNo
        $this->RequestNo->LinkCustomAttributes = "";
        $this->RequestNo->HrefValue = "";
        $this->RequestNo->TooltipValue = "";

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
        $this->Reception->EditValue = $this->Reception->CurrentValue;
        $this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

        // PatID
        $this->PatID->EditAttrs["class"] = "form-control";
        $this->PatID->EditCustomAttributes = "";
        $this->PatID->EditValue = $this->PatID->CurrentValue;
        $this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

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

        // Services
        $this->Services->EditAttrs["class"] = "form-control";
        $this->Services->EditCustomAttributes = "";
        if (!$this->Services->Raw) {
            $this->Services->CurrentValue = HtmlDecode($this->Services->CurrentValue);
        }
        $this->Services->EditValue = $this->Services->CurrentValue;
        $this->Services->PlaceHolder = RemoveHtml($this->Services->caption());

        // Unit
        $this->Unit->EditAttrs["class"] = "form-control";
        $this->Unit->EditCustomAttributes = "";
        $this->Unit->EditValue = $this->Unit->CurrentValue;
        $this->Unit->PlaceHolder = RemoveHtml($this->Unit->caption());

        // amount
        $this->amount->EditAttrs["class"] = "form-control";
        $this->amount->EditCustomAttributes = "";
        $this->amount->EditValue = $this->amount->CurrentValue;
        $this->amount->PlaceHolder = RemoveHtml($this->amount->caption());
        if (strval($this->amount->EditValue) != "" && is_numeric($this->amount->EditValue)) {
            $this->amount->EditValue = FormatNumber($this->amount->EditValue, -2, -2, -2, -2);
        }

        // Quantity
        $this->Quantity->EditAttrs["class"] = "form-control";
        $this->Quantity->EditCustomAttributes = "";
        $this->Quantity->EditValue = $this->Quantity->CurrentValue;
        $this->Quantity->PlaceHolder = RemoveHtml($this->Quantity->caption());

        // Discount
        $this->Discount->EditAttrs["class"] = "form-control";
        $this->Discount->EditCustomAttributes = "";
        $this->Discount->EditValue = $this->Discount->CurrentValue;
        $this->Discount->PlaceHolder = RemoveHtml($this->Discount->caption());
        if (strval($this->Discount->EditValue) != "" && is_numeric($this->Discount->EditValue)) {
            $this->Discount->EditValue = FormatNumber($this->Discount->EditValue, -2, -2, -2, -2);
        }

        // SubTotal
        $this->SubTotal->EditAttrs["class"] = "form-control";
        $this->SubTotal->EditCustomAttributes = "";
        $this->SubTotal->EditValue = $this->SubTotal->CurrentValue;
        $this->SubTotal->PlaceHolder = RemoveHtml($this->SubTotal->caption());
        if (strval($this->SubTotal->EditValue) != "" && is_numeric($this->SubTotal->EditValue)) {
            $this->SubTotal->EditValue = FormatNumber($this->SubTotal->EditValue, -2, -2, -2, -2);
        }

        // description
        $this->description->EditAttrs["class"] = "form-control";
        $this->description->EditCustomAttributes = "";
        $this->description->EditValue = $this->description->CurrentValue;
        $this->description->PlaceHolder = RemoveHtml($this->description->caption());

        // patient_type
        $this->patient_type->EditAttrs["class"] = "form-control";
        $this->patient_type->EditCustomAttributes = "";
        $this->patient_type->EditValue = $this->patient_type->CurrentValue;
        $this->patient_type->PlaceHolder = RemoveHtml($this->patient_type->caption());

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
        if (!$this->createdby->Raw) {
            $this->createdby->CurrentValue = HtmlDecode($this->createdby->CurrentValue);
        }
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
        if (!$this->modifiedby->Raw) {
            $this->modifiedby->CurrentValue = HtmlDecode($this->modifiedby->CurrentValue);
        }
        $this->modifiedby->EditValue = $this->modifiedby->CurrentValue;
        $this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

        // modifieddatetime
        $this->modifieddatetime->EditAttrs["class"] = "form-control";
        $this->modifieddatetime->EditCustomAttributes = "";
        $this->modifieddatetime->EditValue = FormatDateTime($this->modifieddatetime->CurrentValue, 8);
        $this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

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

        // DrID
        $this->DrID->EditAttrs["class"] = "form-control";
        $this->DrID->EditCustomAttributes = "";
        $this->DrID->EditValue = $this->DrID->CurrentValue;
        $this->DrID->PlaceHolder = RemoveHtml($this->DrID->caption());

        // DrCODE
        $this->DrCODE->EditAttrs["class"] = "form-control";
        $this->DrCODE->EditCustomAttributes = "";
        if (!$this->DrCODE->Raw) {
            $this->DrCODE->CurrentValue = HtmlDecode($this->DrCODE->CurrentValue);
        }
        $this->DrCODE->EditValue = $this->DrCODE->CurrentValue;
        $this->DrCODE->PlaceHolder = RemoveHtml($this->DrCODE->caption());

        // DrName
        $this->DrName->EditAttrs["class"] = "form-control";
        $this->DrName->EditCustomAttributes = "";
        if (!$this->DrName->Raw) {
            $this->DrName->CurrentValue = HtmlDecode($this->DrName->CurrentValue);
        }
        $this->DrName->EditValue = $this->DrName->CurrentValue;
        $this->DrName->PlaceHolder = RemoveHtml($this->DrName->caption());

        // Department
        $this->Department->EditAttrs["class"] = "form-control";
        $this->Department->EditCustomAttributes = "";
        if (!$this->Department->Raw) {
            $this->Department->CurrentValue = HtmlDecode($this->Department->CurrentValue);
        }
        $this->Department->EditValue = $this->Department->CurrentValue;
        $this->Department->PlaceHolder = RemoveHtml($this->Department->caption());

        // DrSharePres
        $this->DrSharePres->EditAttrs["class"] = "form-control";
        $this->DrSharePres->EditCustomAttributes = "";
        $this->DrSharePres->EditValue = $this->DrSharePres->CurrentValue;
        $this->DrSharePres->PlaceHolder = RemoveHtml($this->DrSharePres->caption());
        if (strval($this->DrSharePres->EditValue) != "" && is_numeric($this->DrSharePres->EditValue)) {
            $this->DrSharePres->EditValue = FormatNumber($this->DrSharePres->EditValue, -2, -2, -2, -2);
        }

        // HospSharePres
        $this->HospSharePres->EditAttrs["class"] = "form-control";
        $this->HospSharePres->EditCustomAttributes = "";
        $this->HospSharePres->EditValue = $this->HospSharePres->CurrentValue;
        $this->HospSharePres->PlaceHolder = RemoveHtml($this->HospSharePres->caption());
        if (strval($this->HospSharePres->EditValue) != "" && is_numeric($this->HospSharePres->EditValue)) {
            $this->HospSharePres->EditValue = FormatNumber($this->HospSharePres->EditValue, -2, -2, -2, -2);
        }

        // DrShareAmount
        $this->DrShareAmount->EditAttrs["class"] = "form-control";
        $this->DrShareAmount->EditCustomAttributes = "";
        $this->DrShareAmount->EditValue = $this->DrShareAmount->CurrentValue;
        $this->DrShareAmount->PlaceHolder = RemoveHtml($this->DrShareAmount->caption());
        if (strval($this->DrShareAmount->EditValue) != "" && is_numeric($this->DrShareAmount->EditValue)) {
            $this->DrShareAmount->EditValue = FormatNumber($this->DrShareAmount->EditValue, -2, -2, -2, -2);
        }

        // HospShareAmount
        $this->HospShareAmount->EditAttrs["class"] = "form-control";
        $this->HospShareAmount->EditCustomAttributes = "";
        $this->HospShareAmount->EditValue = $this->HospShareAmount->CurrentValue;
        $this->HospShareAmount->PlaceHolder = RemoveHtml($this->HospShareAmount->caption());
        if (strval($this->HospShareAmount->EditValue) != "" && is_numeric($this->HospShareAmount->EditValue)) {
            $this->HospShareAmount->EditValue = FormatNumber($this->HospShareAmount->EditValue, -2, -2, -2, -2);
        }

        // DrShareSettiledAmount
        $this->DrShareSettiledAmount->EditAttrs["class"] = "form-control";
        $this->DrShareSettiledAmount->EditCustomAttributes = "";
        $this->DrShareSettiledAmount->EditValue = $this->DrShareSettiledAmount->CurrentValue;
        $this->DrShareSettiledAmount->PlaceHolder = RemoveHtml($this->DrShareSettiledAmount->caption());
        if (strval($this->DrShareSettiledAmount->EditValue) != "" && is_numeric($this->DrShareSettiledAmount->EditValue)) {
            $this->DrShareSettiledAmount->EditValue = FormatNumber($this->DrShareSettiledAmount->EditValue, -2, -2, -2, -2);
        }

        // DrShareSettledId
        $this->DrShareSettledId->EditAttrs["class"] = "form-control";
        $this->DrShareSettledId->EditCustomAttributes = "";
        $this->DrShareSettledId->EditValue = $this->DrShareSettledId->CurrentValue;
        $this->DrShareSettledId->PlaceHolder = RemoveHtml($this->DrShareSettledId->caption());

        // DrShareSettiledStatus
        $this->DrShareSettiledStatus->EditAttrs["class"] = "form-control";
        $this->DrShareSettiledStatus->EditCustomAttributes = "";
        $this->DrShareSettiledStatus->EditValue = $this->DrShareSettiledStatus->CurrentValue;
        $this->DrShareSettiledStatus->PlaceHolder = RemoveHtml($this->DrShareSettiledStatus->caption());

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
        if (strval($this->invoiceAmount->EditValue) != "" && is_numeric($this->invoiceAmount->EditValue)) {
            $this->invoiceAmount->EditValue = FormatNumber($this->invoiceAmount->EditValue, -2, -2, -2, -2);
        }

        // invoiceStatus
        $this->invoiceStatus->EditAttrs["class"] = "form-control";
        $this->invoiceStatus->EditCustomAttributes = "";
        if (!$this->invoiceStatus->Raw) {
            $this->invoiceStatus->CurrentValue = HtmlDecode($this->invoiceStatus->CurrentValue);
        }
        $this->invoiceStatus->EditValue = $this->invoiceStatus->CurrentValue;
        $this->invoiceStatus->PlaceHolder = RemoveHtml($this->invoiceStatus->caption());

        // modeOfPayment
        $this->modeOfPayment->EditAttrs["class"] = "form-control";
        $this->modeOfPayment->EditCustomAttributes = "";
        if (!$this->modeOfPayment->Raw) {
            $this->modeOfPayment->CurrentValue = HtmlDecode($this->modeOfPayment->CurrentValue);
        }
        $this->modeOfPayment->EditValue = $this->modeOfPayment->CurrentValue;
        $this->modeOfPayment->PlaceHolder = RemoveHtml($this->modeOfPayment->caption());

        // HospID
        $this->HospID->EditAttrs["class"] = "form-control";
        $this->HospID->EditCustomAttributes = "";
        $this->HospID->EditValue = $this->HospID->CurrentValue;
        $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

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

        // DiscountCategory
        $this->DiscountCategory->EditAttrs["class"] = "form-control";
        $this->DiscountCategory->EditCustomAttributes = "";
        if (!$this->DiscountCategory->Raw) {
            $this->DiscountCategory->CurrentValue = HtmlDecode($this->DiscountCategory->CurrentValue);
        }
        $this->DiscountCategory->EditValue = $this->DiscountCategory->CurrentValue;
        $this->DiscountCategory->PlaceHolder = RemoveHtml($this->DiscountCategory->caption());

        // sid
        $this->sid->EditAttrs["class"] = "form-control";
        $this->sid->EditCustomAttributes = "";
        $this->sid->EditValue = $this->sid->CurrentValue;
        $this->sid->PlaceHolder = RemoveHtml($this->sid->caption());

        // ItemCode
        $this->ItemCode->EditAttrs["class"] = "form-control";
        $this->ItemCode->EditCustomAttributes = "";
        if (!$this->ItemCode->Raw) {
            $this->ItemCode->CurrentValue = HtmlDecode($this->ItemCode->CurrentValue);
        }
        $this->ItemCode->EditValue = $this->ItemCode->CurrentValue;
        $this->ItemCode->PlaceHolder = RemoveHtml($this->ItemCode->caption());

        // TestSubCd
        $this->TestSubCd->EditAttrs["class"] = "form-control";
        $this->TestSubCd->EditCustomAttributes = "";
        if (!$this->TestSubCd->Raw) {
            $this->TestSubCd->CurrentValue = HtmlDecode($this->TestSubCd->CurrentValue);
        }
        $this->TestSubCd->EditValue = $this->TestSubCd->CurrentValue;
        $this->TestSubCd->PlaceHolder = RemoveHtml($this->TestSubCd->caption());

        // DEptCd
        $this->DEptCd->EditAttrs["class"] = "form-control";
        $this->DEptCd->EditCustomAttributes = "";
        if (!$this->DEptCd->Raw) {
            $this->DEptCd->CurrentValue = HtmlDecode($this->DEptCd->CurrentValue);
        }
        $this->DEptCd->EditValue = $this->DEptCd->CurrentValue;
        $this->DEptCd->PlaceHolder = RemoveHtml($this->DEptCd->caption());

        // ProfCd
        $this->ProfCd->EditAttrs["class"] = "form-control";
        $this->ProfCd->EditCustomAttributes = "";
        if (!$this->ProfCd->Raw) {
            $this->ProfCd->CurrentValue = HtmlDecode($this->ProfCd->CurrentValue);
        }
        $this->ProfCd->EditValue = $this->ProfCd->CurrentValue;
        $this->ProfCd->PlaceHolder = RemoveHtml($this->ProfCd->caption());

        // LabReport
        $this->LabReport->EditAttrs["class"] = "form-control";
        $this->LabReport->EditCustomAttributes = "";
        $this->LabReport->EditValue = $this->LabReport->CurrentValue;
        $this->LabReport->PlaceHolder = RemoveHtml($this->LabReport->caption());

        // Comments
        $this->Comments->EditAttrs["class"] = "form-control";
        $this->Comments->EditCustomAttributes = "";
        if (!$this->Comments->Raw) {
            $this->Comments->CurrentValue = HtmlDecode($this->Comments->CurrentValue);
        }
        $this->Comments->EditValue = $this->Comments->CurrentValue;
        $this->Comments->PlaceHolder = RemoveHtml($this->Comments->caption());

        // Method
        $this->Method->EditAttrs["class"] = "form-control";
        $this->Method->EditCustomAttributes = "";
        if (!$this->Method->Raw) {
            $this->Method->CurrentValue = HtmlDecode($this->Method->CurrentValue);
        }
        $this->Method->EditValue = $this->Method->CurrentValue;
        $this->Method->PlaceHolder = RemoveHtml($this->Method->caption());

        // Specimen
        $this->Specimen->EditAttrs["class"] = "form-control";
        $this->Specimen->EditCustomAttributes = "";
        if (!$this->Specimen->Raw) {
            $this->Specimen->CurrentValue = HtmlDecode($this->Specimen->CurrentValue);
        }
        $this->Specimen->EditValue = $this->Specimen->CurrentValue;
        $this->Specimen->PlaceHolder = RemoveHtml($this->Specimen->caption());

        // Abnormal
        $this->Abnormal->EditAttrs["class"] = "form-control";
        $this->Abnormal->EditCustomAttributes = "";
        if (!$this->Abnormal->Raw) {
            $this->Abnormal->CurrentValue = HtmlDecode($this->Abnormal->CurrentValue);
        }
        $this->Abnormal->EditValue = $this->Abnormal->CurrentValue;
        $this->Abnormal->PlaceHolder = RemoveHtml($this->Abnormal->caption());

        // RefValue
        $this->RefValue->EditAttrs["class"] = "form-control";
        $this->RefValue->EditCustomAttributes = "";
        $this->RefValue->EditValue = $this->RefValue->CurrentValue;
        $this->RefValue->PlaceHolder = RemoveHtml($this->RefValue->caption());

        // TestUnit
        $this->TestUnit->EditAttrs["class"] = "form-control";
        $this->TestUnit->EditCustomAttributes = "";
        if (!$this->TestUnit->Raw) {
            $this->TestUnit->CurrentValue = HtmlDecode($this->TestUnit->CurrentValue);
        }
        $this->TestUnit->EditValue = $this->TestUnit->CurrentValue;
        $this->TestUnit->PlaceHolder = RemoveHtml($this->TestUnit->caption());

        // LOWHIGH
        $this->LOWHIGH->EditAttrs["class"] = "form-control";
        $this->LOWHIGH->EditCustomAttributes = "";
        if (!$this->LOWHIGH->Raw) {
            $this->LOWHIGH->CurrentValue = HtmlDecode($this->LOWHIGH->CurrentValue);
        }
        $this->LOWHIGH->EditValue = $this->LOWHIGH->CurrentValue;
        $this->LOWHIGH->PlaceHolder = RemoveHtml($this->LOWHIGH->caption());

        // Branch
        $this->Branch->EditAttrs["class"] = "form-control";
        $this->Branch->EditCustomAttributes = "";
        if (!$this->Branch->Raw) {
            $this->Branch->CurrentValue = HtmlDecode($this->Branch->CurrentValue);
        }
        $this->Branch->EditValue = $this->Branch->CurrentValue;
        $this->Branch->PlaceHolder = RemoveHtml($this->Branch->caption());

        // Dispatch
        $this->Dispatch->EditAttrs["class"] = "form-control";
        $this->Dispatch->EditCustomAttributes = "";
        if (!$this->Dispatch->Raw) {
            $this->Dispatch->CurrentValue = HtmlDecode($this->Dispatch->CurrentValue);
        }
        $this->Dispatch->EditValue = $this->Dispatch->CurrentValue;
        $this->Dispatch->PlaceHolder = RemoveHtml($this->Dispatch->caption());

        // Pic1
        $this->Pic1->EditAttrs["class"] = "form-control";
        $this->Pic1->EditCustomAttributes = "";
        if (!$this->Pic1->Raw) {
            $this->Pic1->CurrentValue = HtmlDecode($this->Pic1->CurrentValue);
        }
        $this->Pic1->EditValue = $this->Pic1->CurrentValue;
        $this->Pic1->PlaceHolder = RemoveHtml($this->Pic1->caption());

        // Pic2
        $this->Pic2->EditAttrs["class"] = "form-control";
        $this->Pic2->EditCustomAttributes = "";
        if (!$this->Pic2->Raw) {
            $this->Pic2->CurrentValue = HtmlDecode($this->Pic2->CurrentValue);
        }
        $this->Pic2->EditValue = $this->Pic2->CurrentValue;
        $this->Pic2->PlaceHolder = RemoveHtml($this->Pic2->caption());

        // GraphPath
        $this->GraphPath->EditAttrs["class"] = "form-control";
        $this->GraphPath->EditCustomAttributes = "";
        if (!$this->GraphPath->Raw) {
            $this->GraphPath->CurrentValue = HtmlDecode($this->GraphPath->CurrentValue);
        }
        $this->GraphPath->EditValue = $this->GraphPath->CurrentValue;
        $this->GraphPath->PlaceHolder = RemoveHtml($this->GraphPath->caption());

        // MachineCD
        $this->MachineCD->EditAttrs["class"] = "form-control";
        $this->MachineCD->EditCustomAttributes = "";
        if (!$this->MachineCD->Raw) {
            $this->MachineCD->CurrentValue = HtmlDecode($this->MachineCD->CurrentValue);
        }
        $this->MachineCD->EditValue = $this->MachineCD->CurrentValue;
        $this->MachineCD->PlaceHolder = RemoveHtml($this->MachineCD->caption());

        // TestCancel
        $this->TestCancel->EditAttrs["class"] = "form-control";
        $this->TestCancel->EditCustomAttributes = "";
        if (!$this->TestCancel->Raw) {
            $this->TestCancel->CurrentValue = HtmlDecode($this->TestCancel->CurrentValue);
        }
        $this->TestCancel->EditValue = $this->TestCancel->CurrentValue;
        $this->TestCancel->PlaceHolder = RemoveHtml($this->TestCancel->caption());

        // OutSource
        $this->OutSource->EditAttrs["class"] = "form-control";
        $this->OutSource->EditCustomAttributes = "";
        if (!$this->OutSource->Raw) {
            $this->OutSource->CurrentValue = HtmlDecode($this->OutSource->CurrentValue);
        }
        $this->OutSource->EditValue = $this->OutSource->CurrentValue;
        $this->OutSource->PlaceHolder = RemoveHtml($this->OutSource->caption());

        // Printed
        $this->Printed->EditAttrs["class"] = "form-control";
        $this->Printed->EditCustomAttributes = "";
        if (!$this->Printed->Raw) {
            $this->Printed->CurrentValue = HtmlDecode($this->Printed->CurrentValue);
        }
        $this->Printed->EditValue = $this->Printed->CurrentValue;
        $this->Printed->PlaceHolder = RemoveHtml($this->Printed->caption());

        // PrintBy
        $this->PrintBy->EditAttrs["class"] = "form-control";
        $this->PrintBy->EditCustomAttributes = "";
        if (!$this->PrintBy->Raw) {
            $this->PrintBy->CurrentValue = HtmlDecode($this->PrintBy->CurrentValue);
        }
        $this->PrintBy->EditValue = $this->PrintBy->CurrentValue;
        $this->PrintBy->PlaceHolder = RemoveHtml($this->PrintBy->caption());

        // PrintDate
        $this->PrintDate->EditAttrs["class"] = "form-control";
        $this->PrintDate->EditCustomAttributes = "";
        $this->PrintDate->EditValue = FormatDateTime($this->PrintDate->CurrentValue, 8);
        $this->PrintDate->PlaceHolder = RemoveHtml($this->PrintDate->caption());

        // BillingDate
        $this->BillingDate->EditAttrs["class"] = "form-control";
        $this->BillingDate->EditCustomAttributes = "";
        $this->BillingDate->EditValue = FormatDateTime($this->BillingDate->CurrentValue, 8);
        $this->BillingDate->PlaceHolder = RemoveHtml($this->BillingDate->caption());

        // BilledBy
        $this->BilledBy->EditAttrs["class"] = "form-control";
        $this->BilledBy->EditCustomAttributes = "";
        if (!$this->BilledBy->Raw) {
            $this->BilledBy->CurrentValue = HtmlDecode($this->BilledBy->CurrentValue);
        }
        $this->BilledBy->EditValue = $this->BilledBy->CurrentValue;
        $this->BilledBy->PlaceHolder = RemoveHtml($this->BilledBy->caption());

        // Resulted
        $this->Resulted->EditAttrs["class"] = "form-control";
        $this->Resulted->EditCustomAttributes = "";
        if (!$this->Resulted->Raw) {
            $this->Resulted->CurrentValue = HtmlDecode($this->Resulted->CurrentValue);
        }
        $this->Resulted->EditValue = $this->Resulted->CurrentValue;
        $this->Resulted->PlaceHolder = RemoveHtml($this->Resulted->caption());

        // ResultDate
        $this->ResultDate->EditAttrs["class"] = "form-control";
        $this->ResultDate->EditCustomAttributes = "";
        $this->ResultDate->EditValue = FormatDateTime($this->ResultDate->CurrentValue, 8);
        $this->ResultDate->PlaceHolder = RemoveHtml($this->ResultDate->caption());

        // ResultedBy
        $this->ResultedBy->EditAttrs["class"] = "form-control";
        $this->ResultedBy->EditCustomAttributes = "";
        if (!$this->ResultedBy->Raw) {
            $this->ResultedBy->CurrentValue = HtmlDecode($this->ResultedBy->CurrentValue);
        }
        $this->ResultedBy->EditValue = $this->ResultedBy->CurrentValue;
        $this->ResultedBy->PlaceHolder = RemoveHtml($this->ResultedBy->caption());

        // SampleDate
        $this->SampleDate->EditAttrs["class"] = "form-control";
        $this->SampleDate->EditCustomAttributes = "";
        $this->SampleDate->EditValue = FormatDateTime($this->SampleDate->CurrentValue, 8);
        $this->SampleDate->PlaceHolder = RemoveHtml($this->SampleDate->caption());

        // SampleUser
        $this->SampleUser->EditAttrs["class"] = "form-control";
        $this->SampleUser->EditCustomAttributes = "";
        if (!$this->SampleUser->Raw) {
            $this->SampleUser->CurrentValue = HtmlDecode($this->SampleUser->CurrentValue);
        }
        $this->SampleUser->EditValue = $this->SampleUser->CurrentValue;
        $this->SampleUser->PlaceHolder = RemoveHtml($this->SampleUser->caption());

        // Sampled
        $this->Sampled->EditAttrs["class"] = "form-control";
        $this->Sampled->EditCustomAttributes = "";
        if (!$this->Sampled->Raw) {
            $this->Sampled->CurrentValue = HtmlDecode($this->Sampled->CurrentValue);
        }
        $this->Sampled->EditValue = $this->Sampled->CurrentValue;
        $this->Sampled->PlaceHolder = RemoveHtml($this->Sampled->caption());

        // ReceivedDate
        $this->ReceivedDate->EditAttrs["class"] = "form-control";
        $this->ReceivedDate->EditCustomAttributes = "";
        $this->ReceivedDate->EditValue = FormatDateTime($this->ReceivedDate->CurrentValue, 8);
        $this->ReceivedDate->PlaceHolder = RemoveHtml($this->ReceivedDate->caption());

        // ReceivedUser
        $this->ReceivedUser->EditAttrs["class"] = "form-control";
        $this->ReceivedUser->EditCustomAttributes = "";
        if (!$this->ReceivedUser->Raw) {
            $this->ReceivedUser->CurrentValue = HtmlDecode($this->ReceivedUser->CurrentValue);
        }
        $this->ReceivedUser->EditValue = $this->ReceivedUser->CurrentValue;
        $this->ReceivedUser->PlaceHolder = RemoveHtml($this->ReceivedUser->caption());

        // Recevied
        $this->Recevied->EditAttrs["class"] = "form-control";
        $this->Recevied->EditCustomAttributes = "";
        if (!$this->Recevied->Raw) {
            $this->Recevied->CurrentValue = HtmlDecode($this->Recevied->CurrentValue);
        }
        $this->Recevied->EditValue = $this->Recevied->CurrentValue;
        $this->Recevied->PlaceHolder = RemoveHtml($this->Recevied->caption());

        // DeptRecvDate
        $this->DeptRecvDate->EditAttrs["class"] = "form-control";
        $this->DeptRecvDate->EditCustomAttributes = "";
        $this->DeptRecvDate->EditValue = FormatDateTime($this->DeptRecvDate->CurrentValue, 8);
        $this->DeptRecvDate->PlaceHolder = RemoveHtml($this->DeptRecvDate->caption());

        // DeptRecvUser
        $this->DeptRecvUser->EditAttrs["class"] = "form-control";
        $this->DeptRecvUser->EditCustomAttributes = "";
        if (!$this->DeptRecvUser->Raw) {
            $this->DeptRecvUser->CurrentValue = HtmlDecode($this->DeptRecvUser->CurrentValue);
        }
        $this->DeptRecvUser->EditValue = $this->DeptRecvUser->CurrentValue;
        $this->DeptRecvUser->PlaceHolder = RemoveHtml($this->DeptRecvUser->caption());

        // DeptRecived
        $this->DeptRecived->EditAttrs["class"] = "form-control";
        $this->DeptRecived->EditCustomAttributes = "";
        if (!$this->DeptRecived->Raw) {
            $this->DeptRecived->CurrentValue = HtmlDecode($this->DeptRecived->CurrentValue);
        }
        $this->DeptRecived->EditValue = $this->DeptRecived->CurrentValue;
        $this->DeptRecived->PlaceHolder = RemoveHtml($this->DeptRecived->caption());

        // SAuthDate
        $this->SAuthDate->EditAttrs["class"] = "form-control";
        $this->SAuthDate->EditCustomAttributes = "";
        $this->SAuthDate->EditValue = FormatDateTime($this->SAuthDate->CurrentValue, 8);
        $this->SAuthDate->PlaceHolder = RemoveHtml($this->SAuthDate->caption());

        // SAuthBy
        $this->SAuthBy->EditAttrs["class"] = "form-control";
        $this->SAuthBy->EditCustomAttributes = "";
        if (!$this->SAuthBy->Raw) {
            $this->SAuthBy->CurrentValue = HtmlDecode($this->SAuthBy->CurrentValue);
        }
        $this->SAuthBy->EditValue = $this->SAuthBy->CurrentValue;
        $this->SAuthBy->PlaceHolder = RemoveHtml($this->SAuthBy->caption());

        // SAuthendicate
        $this->SAuthendicate->EditAttrs["class"] = "form-control";
        $this->SAuthendicate->EditCustomAttributes = "";
        if (!$this->SAuthendicate->Raw) {
            $this->SAuthendicate->CurrentValue = HtmlDecode($this->SAuthendicate->CurrentValue);
        }
        $this->SAuthendicate->EditValue = $this->SAuthendicate->CurrentValue;
        $this->SAuthendicate->PlaceHolder = RemoveHtml($this->SAuthendicate->caption());

        // AuthDate
        $this->AuthDate->EditAttrs["class"] = "form-control";
        $this->AuthDate->EditCustomAttributes = "";
        $this->AuthDate->EditValue = FormatDateTime($this->AuthDate->CurrentValue, 8);
        $this->AuthDate->PlaceHolder = RemoveHtml($this->AuthDate->caption());

        // AuthBy
        $this->AuthBy->EditAttrs["class"] = "form-control";
        $this->AuthBy->EditCustomAttributes = "";
        if (!$this->AuthBy->Raw) {
            $this->AuthBy->CurrentValue = HtmlDecode($this->AuthBy->CurrentValue);
        }
        $this->AuthBy->EditValue = $this->AuthBy->CurrentValue;
        $this->AuthBy->PlaceHolder = RemoveHtml($this->AuthBy->caption());

        // Authencate
        $this->Authencate->EditAttrs["class"] = "form-control";
        $this->Authencate->EditCustomAttributes = "";
        if (!$this->Authencate->Raw) {
            $this->Authencate->CurrentValue = HtmlDecode($this->Authencate->CurrentValue);
        }
        $this->Authencate->EditValue = $this->Authencate->CurrentValue;
        $this->Authencate->PlaceHolder = RemoveHtml($this->Authencate->caption());

        // EditDate
        $this->EditDate->EditAttrs["class"] = "form-control";
        $this->EditDate->EditCustomAttributes = "";
        $this->EditDate->EditValue = FormatDateTime($this->EditDate->CurrentValue, 8);
        $this->EditDate->PlaceHolder = RemoveHtml($this->EditDate->caption());

        // EditBy
        $this->EditBy->EditAttrs["class"] = "form-control";
        $this->EditBy->EditCustomAttributes = "";
        if (!$this->EditBy->Raw) {
            $this->EditBy->CurrentValue = HtmlDecode($this->EditBy->CurrentValue);
        }
        $this->EditBy->EditValue = $this->EditBy->CurrentValue;
        $this->EditBy->PlaceHolder = RemoveHtml($this->EditBy->caption());

        // Editted
        $this->Editted->EditAttrs["class"] = "form-control";
        $this->Editted->EditCustomAttributes = "";
        if (!$this->Editted->Raw) {
            $this->Editted->CurrentValue = HtmlDecode($this->Editted->CurrentValue);
        }
        $this->Editted->EditValue = $this->Editted->CurrentValue;
        $this->Editted->PlaceHolder = RemoveHtml($this->Editted->caption());

        // PatientId
        $this->PatientId->EditAttrs["class"] = "form-control";
        $this->PatientId->EditCustomAttributes = "";
        if (!$this->PatientId->Raw) {
            $this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
        }
        $this->PatientId->EditValue = $this->PatientId->CurrentValue;
        $this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

        // Mobile
        $this->Mobile->EditAttrs["class"] = "form-control";
        $this->Mobile->EditCustomAttributes = "";
        if (!$this->Mobile->Raw) {
            $this->Mobile->CurrentValue = HtmlDecode($this->Mobile->CurrentValue);
        }
        $this->Mobile->EditValue = $this->Mobile->CurrentValue;
        $this->Mobile->PlaceHolder = RemoveHtml($this->Mobile->caption());

        // CId
        $this->CId->EditAttrs["class"] = "form-control";
        $this->CId->EditCustomAttributes = "";
        $this->CId->EditValue = $this->CId->CurrentValue;
        $this->CId->PlaceHolder = RemoveHtml($this->CId->caption());

        // Order
        $this->Order->EditAttrs["class"] = "form-control";
        $this->Order->EditCustomAttributes = "";
        $this->Order->EditValue = $this->Order->CurrentValue;
        $this->Order->PlaceHolder = RemoveHtml($this->Order->caption());
        if (strval($this->Order->EditValue) != "" && is_numeric($this->Order->EditValue)) {
            $this->Order->EditValue = FormatNumber($this->Order->EditValue, -2, -2, -2, -2);
        }

        // Form
        $this->Form->EditAttrs["class"] = "form-control";
        $this->Form->EditCustomAttributes = "";
        $this->Form->EditValue = $this->Form->CurrentValue;
        $this->Form->PlaceHolder = RemoveHtml($this->Form->caption());

        // ResType
        $this->ResType->EditAttrs["class"] = "form-control";
        $this->ResType->EditCustomAttributes = "";
        if (!$this->ResType->Raw) {
            $this->ResType->CurrentValue = HtmlDecode($this->ResType->CurrentValue);
        }
        $this->ResType->EditValue = $this->ResType->CurrentValue;
        $this->ResType->PlaceHolder = RemoveHtml($this->ResType->caption());

        // Sample
        $this->Sample->EditAttrs["class"] = "form-control";
        $this->Sample->EditCustomAttributes = "";
        if (!$this->Sample->Raw) {
            $this->Sample->CurrentValue = HtmlDecode($this->Sample->CurrentValue);
        }
        $this->Sample->EditValue = $this->Sample->CurrentValue;
        $this->Sample->PlaceHolder = RemoveHtml($this->Sample->caption());

        // NoD
        $this->NoD->EditAttrs["class"] = "form-control";
        $this->NoD->EditCustomAttributes = "";
        $this->NoD->EditValue = $this->NoD->CurrentValue;
        $this->NoD->PlaceHolder = RemoveHtml($this->NoD->caption());
        if (strval($this->NoD->EditValue) != "" && is_numeric($this->NoD->EditValue)) {
            $this->NoD->EditValue = FormatNumber($this->NoD->EditValue, -2, -2, -2, -2);
        }

        // BillOrder
        $this->BillOrder->EditAttrs["class"] = "form-control";
        $this->BillOrder->EditCustomAttributes = "";
        $this->BillOrder->EditValue = $this->BillOrder->CurrentValue;
        $this->BillOrder->PlaceHolder = RemoveHtml($this->BillOrder->caption());
        if (strval($this->BillOrder->EditValue) != "" && is_numeric($this->BillOrder->EditValue)) {
            $this->BillOrder->EditValue = FormatNumber($this->BillOrder->EditValue, -2, -2, -2, -2);
        }

        // Formula
        $this->Formula->EditAttrs["class"] = "form-control";
        $this->Formula->EditCustomAttributes = "";
        $this->Formula->EditValue = $this->Formula->CurrentValue;
        $this->Formula->PlaceHolder = RemoveHtml($this->Formula->caption());

        // Inactive
        $this->Inactive->EditAttrs["class"] = "form-control";
        $this->Inactive->EditCustomAttributes = "";
        if (!$this->Inactive->Raw) {
            $this->Inactive->CurrentValue = HtmlDecode($this->Inactive->CurrentValue);
        }
        $this->Inactive->EditValue = $this->Inactive->CurrentValue;
        $this->Inactive->PlaceHolder = RemoveHtml($this->Inactive->caption());

        // CollSample
        $this->CollSample->EditAttrs["class"] = "form-control";
        $this->CollSample->EditCustomAttributes = "";
        if (!$this->CollSample->Raw) {
            $this->CollSample->CurrentValue = HtmlDecode($this->CollSample->CurrentValue);
        }
        $this->CollSample->EditValue = $this->CollSample->CurrentValue;
        $this->CollSample->PlaceHolder = RemoveHtml($this->CollSample->caption());

        // TestType
        $this->TestType->EditAttrs["class"] = "form-control";
        $this->TestType->EditCustomAttributes = "";
        if (!$this->TestType->Raw) {
            $this->TestType->CurrentValue = HtmlDecode($this->TestType->CurrentValue);
        }
        $this->TestType->EditValue = $this->TestType->CurrentValue;
        $this->TestType->PlaceHolder = RemoveHtml($this->TestType->caption());

        // Repeated
        $this->Repeated->EditAttrs["class"] = "form-control";
        $this->Repeated->EditCustomAttributes = "";
        if (!$this->Repeated->Raw) {
            $this->Repeated->CurrentValue = HtmlDecode($this->Repeated->CurrentValue);
        }
        $this->Repeated->EditValue = $this->Repeated->CurrentValue;
        $this->Repeated->PlaceHolder = RemoveHtml($this->Repeated->caption());

        // RepeatedBy
        $this->RepeatedBy->EditAttrs["class"] = "form-control";
        $this->RepeatedBy->EditCustomAttributes = "";
        if (!$this->RepeatedBy->Raw) {
            $this->RepeatedBy->CurrentValue = HtmlDecode($this->RepeatedBy->CurrentValue);
        }
        $this->RepeatedBy->EditValue = $this->RepeatedBy->CurrentValue;
        $this->RepeatedBy->PlaceHolder = RemoveHtml($this->RepeatedBy->caption());

        // RepeatedDate
        $this->RepeatedDate->EditAttrs["class"] = "form-control";
        $this->RepeatedDate->EditCustomAttributes = "";
        $this->RepeatedDate->EditValue = FormatDateTime($this->RepeatedDate->CurrentValue, 8);
        $this->RepeatedDate->PlaceHolder = RemoveHtml($this->RepeatedDate->caption());

        // serviceID
        $this->serviceID->EditAttrs["class"] = "form-control";
        $this->serviceID->EditCustomAttributes = "";
        $this->serviceID->EditValue = $this->serviceID->CurrentValue;
        $this->serviceID->PlaceHolder = RemoveHtml($this->serviceID->caption());

        // Service_Type
        $this->Service_Type->EditAttrs["class"] = "form-control";
        $this->Service_Type->EditCustomAttributes = "";
        if (!$this->Service_Type->Raw) {
            $this->Service_Type->CurrentValue = HtmlDecode($this->Service_Type->CurrentValue);
        }
        $this->Service_Type->EditValue = $this->Service_Type->CurrentValue;
        $this->Service_Type->PlaceHolder = RemoveHtml($this->Service_Type->caption());

        // Service_Department
        $this->Service_Department->EditAttrs["class"] = "form-control";
        $this->Service_Department->EditCustomAttributes = "";
        if (!$this->Service_Department->Raw) {
            $this->Service_Department->CurrentValue = HtmlDecode($this->Service_Department->CurrentValue);
        }
        $this->Service_Department->EditValue = $this->Service_Department->CurrentValue;
        $this->Service_Department->PlaceHolder = RemoveHtml($this->Service_Department->caption());

        // RequestNo
        $this->RequestNo->EditAttrs["class"] = "form-control";
        $this->RequestNo->EditCustomAttributes = "";
        $this->RequestNo->EditValue = $this->RequestNo->CurrentValue;
        $this->RequestNo->PlaceHolder = RemoveHtml($this->RequestNo->caption());

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
                    $doc->exportCaption($this->PatID);
                    $doc->exportCaption($this->mrnno);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->Age);
                    $doc->exportCaption($this->Gender);
                    $doc->exportCaption($this->profilePic);
                    $doc->exportCaption($this->Services);
                    $doc->exportCaption($this->Unit);
                    $doc->exportCaption($this->amount);
                    $doc->exportCaption($this->Quantity);
                    $doc->exportCaption($this->Discount);
                    $doc->exportCaption($this->SubTotal);
                    $doc->exportCaption($this->description);
                    $doc->exportCaption($this->patient_type);
                    $doc->exportCaption($this->charged_date);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->Aid);
                    $doc->exportCaption($this->Vid);
                    $doc->exportCaption($this->DrID);
                    $doc->exportCaption($this->DrCODE);
                    $doc->exportCaption($this->DrName);
                    $doc->exportCaption($this->Department);
                    $doc->exportCaption($this->DrSharePres);
                    $doc->exportCaption($this->HospSharePres);
                    $doc->exportCaption($this->DrShareAmount);
                    $doc->exportCaption($this->HospShareAmount);
                    $doc->exportCaption($this->DrShareSettiledAmount);
                    $doc->exportCaption($this->DrShareSettledId);
                    $doc->exportCaption($this->DrShareSettiledStatus);
                    $doc->exportCaption($this->invoiceId);
                    $doc->exportCaption($this->invoiceAmount);
                    $doc->exportCaption($this->invoiceStatus);
                    $doc->exportCaption($this->modeOfPayment);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->RIDNO);
                    $doc->exportCaption($this->TidNo);
                    $doc->exportCaption($this->DiscountCategory);
                    $doc->exportCaption($this->sid);
                    $doc->exportCaption($this->ItemCode);
                    $doc->exportCaption($this->TestSubCd);
                    $doc->exportCaption($this->DEptCd);
                    $doc->exportCaption($this->ProfCd);
                    $doc->exportCaption($this->LabReport);
                    $doc->exportCaption($this->Comments);
                    $doc->exportCaption($this->Method);
                    $doc->exportCaption($this->Specimen);
                    $doc->exportCaption($this->Abnormal);
                    $doc->exportCaption($this->RefValue);
                    $doc->exportCaption($this->TestUnit);
                    $doc->exportCaption($this->LOWHIGH);
                    $doc->exportCaption($this->Branch);
                    $doc->exportCaption($this->Dispatch);
                    $doc->exportCaption($this->Pic1);
                    $doc->exportCaption($this->Pic2);
                    $doc->exportCaption($this->GraphPath);
                    $doc->exportCaption($this->MachineCD);
                    $doc->exportCaption($this->TestCancel);
                    $doc->exportCaption($this->OutSource);
                    $doc->exportCaption($this->Printed);
                    $doc->exportCaption($this->PrintBy);
                    $doc->exportCaption($this->PrintDate);
                    $doc->exportCaption($this->BillingDate);
                    $doc->exportCaption($this->BilledBy);
                    $doc->exportCaption($this->Resulted);
                    $doc->exportCaption($this->ResultDate);
                    $doc->exportCaption($this->ResultedBy);
                    $doc->exportCaption($this->SampleDate);
                    $doc->exportCaption($this->SampleUser);
                    $doc->exportCaption($this->Sampled);
                    $doc->exportCaption($this->ReceivedDate);
                    $doc->exportCaption($this->ReceivedUser);
                    $doc->exportCaption($this->Recevied);
                    $doc->exportCaption($this->DeptRecvDate);
                    $doc->exportCaption($this->DeptRecvUser);
                    $doc->exportCaption($this->DeptRecived);
                    $doc->exportCaption($this->SAuthDate);
                    $doc->exportCaption($this->SAuthBy);
                    $doc->exportCaption($this->SAuthendicate);
                    $doc->exportCaption($this->AuthDate);
                    $doc->exportCaption($this->AuthBy);
                    $doc->exportCaption($this->Authencate);
                    $doc->exportCaption($this->EditDate);
                    $doc->exportCaption($this->EditBy);
                    $doc->exportCaption($this->Editted);
                    $doc->exportCaption($this->PatientId);
                    $doc->exportCaption($this->Mobile);
                    $doc->exportCaption($this->CId);
                    $doc->exportCaption($this->Order);
                    $doc->exportCaption($this->Form);
                    $doc->exportCaption($this->ResType);
                    $doc->exportCaption($this->Sample);
                    $doc->exportCaption($this->NoD);
                    $doc->exportCaption($this->BillOrder);
                    $doc->exportCaption($this->Formula);
                    $doc->exportCaption($this->Inactive);
                    $doc->exportCaption($this->CollSample);
                    $doc->exportCaption($this->TestType);
                    $doc->exportCaption($this->Repeated);
                    $doc->exportCaption($this->RepeatedBy);
                    $doc->exportCaption($this->RepeatedDate);
                    $doc->exportCaption($this->serviceID);
                    $doc->exportCaption($this->Service_Type);
                    $doc->exportCaption($this->Service_Department);
                    $doc->exportCaption($this->RequestNo);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->Reception);
                    $doc->exportCaption($this->PatID);
                    $doc->exportCaption($this->mrnno);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->Age);
                    $doc->exportCaption($this->Gender);
                    $doc->exportCaption($this->Services);
                    $doc->exportCaption($this->Unit);
                    $doc->exportCaption($this->amount);
                    $doc->exportCaption($this->Quantity);
                    $doc->exportCaption($this->Discount);
                    $doc->exportCaption($this->SubTotal);
                    $doc->exportCaption($this->patient_type);
                    $doc->exportCaption($this->charged_date);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->Aid);
                    $doc->exportCaption($this->Vid);
                    $doc->exportCaption($this->DrID);
                    $doc->exportCaption($this->DrCODE);
                    $doc->exportCaption($this->DrName);
                    $doc->exportCaption($this->Department);
                    $doc->exportCaption($this->DrSharePres);
                    $doc->exportCaption($this->HospSharePres);
                    $doc->exportCaption($this->DrShareAmount);
                    $doc->exportCaption($this->HospShareAmount);
                    $doc->exportCaption($this->DrShareSettiledAmount);
                    $doc->exportCaption($this->DrShareSettledId);
                    $doc->exportCaption($this->DrShareSettiledStatus);
                    $doc->exportCaption($this->invoiceId);
                    $doc->exportCaption($this->invoiceAmount);
                    $doc->exportCaption($this->invoiceStatus);
                    $doc->exportCaption($this->modeOfPayment);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->RIDNO);
                    $doc->exportCaption($this->TidNo);
                    $doc->exportCaption($this->DiscountCategory);
                    $doc->exportCaption($this->sid);
                    $doc->exportCaption($this->ItemCode);
                    $doc->exportCaption($this->TestSubCd);
                    $doc->exportCaption($this->DEptCd);
                    $doc->exportCaption($this->ProfCd);
                    $doc->exportCaption($this->Comments);
                    $doc->exportCaption($this->Method);
                    $doc->exportCaption($this->Specimen);
                    $doc->exportCaption($this->Abnormal);
                    $doc->exportCaption($this->TestUnit);
                    $doc->exportCaption($this->LOWHIGH);
                    $doc->exportCaption($this->Branch);
                    $doc->exportCaption($this->Dispatch);
                    $doc->exportCaption($this->Pic1);
                    $doc->exportCaption($this->Pic2);
                    $doc->exportCaption($this->GraphPath);
                    $doc->exportCaption($this->MachineCD);
                    $doc->exportCaption($this->TestCancel);
                    $doc->exportCaption($this->OutSource);
                    $doc->exportCaption($this->Printed);
                    $doc->exportCaption($this->PrintBy);
                    $doc->exportCaption($this->PrintDate);
                    $doc->exportCaption($this->BillingDate);
                    $doc->exportCaption($this->BilledBy);
                    $doc->exportCaption($this->Resulted);
                    $doc->exportCaption($this->ResultDate);
                    $doc->exportCaption($this->ResultedBy);
                    $doc->exportCaption($this->SampleDate);
                    $doc->exportCaption($this->SampleUser);
                    $doc->exportCaption($this->Sampled);
                    $doc->exportCaption($this->ReceivedDate);
                    $doc->exportCaption($this->ReceivedUser);
                    $doc->exportCaption($this->Recevied);
                    $doc->exportCaption($this->DeptRecvDate);
                    $doc->exportCaption($this->DeptRecvUser);
                    $doc->exportCaption($this->DeptRecived);
                    $doc->exportCaption($this->SAuthDate);
                    $doc->exportCaption($this->SAuthBy);
                    $doc->exportCaption($this->SAuthendicate);
                    $doc->exportCaption($this->AuthDate);
                    $doc->exportCaption($this->AuthBy);
                    $doc->exportCaption($this->Authencate);
                    $doc->exportCaption($this->EditDate);
                    $doc->exportCaption($this->EditBy);
                    $doc->exportCaption($this->Editted);
                    $doc->exportCaption($this->PatientId);
                    $doc->exportCaption($this->Mobile);
                    $doc->exportCaption($this->CId);
                    $doc->exportCaption($this->Order);
                    $doc->exportCaption($this->ResType);
                    $doc->exportCaption($this->Sample);
                    $doc->exportCaption($this->NoD);
                    $doc->exportCaption($this->BillOrder);
                    $doc->exportCaption($this->Inactive);
                    $doc->exportCaption($this->CollSample);
                    $doc->exportCaption($this->TestType);
                    $doc->exportCaption($this->Repeated);
                    $doc->exportCaption($this->RepeatedBy);
                    $doc->exportCaption($this->RepeatedDate);
                    $doc->exportCaption($this->serviceID);
                    $doc->exportCaption($this->Service_Type);
                    $doc->exportCaption($this->Service_Department);
                    $doc->exportCaption($this->RequestNo);
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
                        $doc->exportField($this->PatID);
                        $doc->exportField($this->mrnno);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->Age);
                        $doc->exportField($this->Gender);
                        $doc->exportField($this->profilePic);
                        $doc->exportField($this->Services);
                        $doc->exportField($this->Unit);
                        $doc->exportField($this->amount);
                        $doc->exportField($this->Quantity);
                        $doc->exportField($this->Discount);
                        $doc->exportField($this->SubTotal);
                        $doc->exportField($this->description);
                        $doc->exportField($this->patient_type);
                        $doc->exportField($this->charged_date);
                        $doc->exportField($this->status);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->Aid);
                        $doc->exportField($this->Vid);
                        $doc->exportField($this->DrID);
                        $doc->exportField($this->DrCODE);
                        $doc->exportField($this->DrName);
                        $doc->exportField($this->Department);
                        $doc->exportField($this->DrSharePres);
                        $doc->exportField($this->HospSharePres);
                        $doc->exportField($this->DrShareAmount);
                        $doc->exportField($this->HospShareAmount);
                        $doc->exportField($this->DrShareSettiledAmount);
                        $doc->exportField($this->DrShareSettledId);
                        $doc->exportField($this->DrShareSettiledStatus);
                        $doc->exportField($this->invoiceId);
                        $doc->exportField($this->invoiceAmount);
                        $doc->exportField($this->invoiceStatus);
                        $doc->exportField($this->modeOfPayment);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->RIDNO);
                        $doc->exportField($this->TidNo);
                        $doc->exportField($this->DiscountCategory);
                        $doc->exportField($this->sid);
                        $doc->exportField($this->ItemCode);
                        $doc->exportField($this->TestSubCd);
                        $doc->exportField($this->DEptCd);
                        $doc->exportField($this->ProfCd);
                        $doc->exportField($this->LabReport);
                        $doc->exportField($this->Comments);
                        $doc->exportField($this->Method);
                        $doc->exportField($this->Specimen);
                        $doc->exportField($this->Abnormal);
                        $doc->exportField($this->RefValue);
                        $doc->exportField($this->TestUnit);
                        $doc->exportField($this->LOWHIGH);
                        $doc->exportField($this->Branch);
                        $doc->exportField($this->Dispatch);
                        $doc->exportField($this->Pic1);
                        $doc->exportField($this->Pic2);
                        $doc->exportField($this->GraphPath);
                        $doc->exportField($this->MachineCD);
                        $doc->exportField($this->TestCancel);
                        $doc->exportField($this->OutSource);
                        $doc->exportField($this->Printed);
                        $doc->exportField($this->PrintBy);
                        $doc->exportField($this->PrintDate);
                        $doc->exportField($this->BillingDate);
                        $doc->exportField($this->BilledBy);
                        $doc->exportField($this->Resulted);
                        $doc->exportField($this->ResultDate);
                        $doc->exportField($this->ResultedBy);
                        $doc->exportField($this->SampleDate);
                        $doc->exportField($this->SampleUser);
                        $doc->exportField($this->Sampled);
                        $doc->exportField($this->ReceivedDate);
                        $doc->exportField($this->ReceivedUser);
                        $doc->exportField($this->Recevied);
                        $doc->exportField($this->DeptRecvDate);
                        $doc->exportField($this->DeptRecvUser);
                        $doc->exportField($this->DeptRecived);
                        $doc->exportField($this->SAuthDate);
                        $doc->exportField($this->SAuthBy);
                        $doc->exportField($this->SAuthendicate);
                        $doc->exportField($this->AuthDate);
                        $doc->exportField($this->AuthBy);
                        $doc->exportField($this->Authencate);
                        $doc->exportField($this->EditDate);
                        $doc->exportField($this->EditBy);
                        $doc->exportField($this->Editted);
                        $doc->exportField($this->PatientId);
                        $doc->exportField($this->Mobile);
                        $doc->exportField($this->CId);
                        $doc->exportField($this->Order);
                        $doc->exportField($this->Form);
                        $doc->exportField($this->ResType);
                        $doc->exportField($this->Sample);
                        $doc->exportField($this->NoD);
                        $doc->exportField($this->BillOrder);
                        $doc->exportField($this->Formula);
                        $doc->exportField($this->Inactive);
                        $doc->exportField($this->CollSample);
                        $doc->exportField($this->TestType);
                        $doc->exportField($this->Repeated);
                        $doc->exportField($this->RepeatedBy);
                        $doc->exportField($this->RepeatedDate);
                        $doc->exportField($this->serviceID);
                        $doc->exportField($this->Service_Type);
                        $doc->exportField($this->Service_Department);
                        $doc->exportField($this->RequestNo);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->Reception);
                        $doc->exportField($this->PatID);
                        $doc->exportField($this->mrnno);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->Age);
                        $doc->exportField($this->Gender);
                        $doc->exportField($this->Services);
                        $doc->exportField($this->Unit);
                        $doc->exportField($this->amount);
                        $doc->exportField($this->Quantity);
                        $doc->exportField($this->Discount);
                        $doc->exportField($this->SubTotal);
                        $doc->exportField($this->patient_type);
                        $doc->exportField($this->charged_date);
                        $doc->exportField($this->status);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->Aid);
                        $doc->exportField($this->Vid);
                        $doc->exportField($this->DrID);
                        $doc->exportField($this->DrCODE);
                        $doc->exportField($this->DrName);
                        $doc->exportField($this->Department);
                        $doc->exportField($this->DrSharePres);
                        $doc->exportField($this->HospSharePres);
                        $doc->exportField($this->DrShareAmount);
                        $doc->exportField($this->HospShareAmount);
                        $doc->exportField($this->DrShareSettiledAmount);
                        $doc->exportField($this->DrShareSettledId);
                        $doc->exportField($this->DrShareSettiledStatus);
                        $doc->exportField($this->invoiceId);
                        $doc->exportField($this->invoiceAmount);
                        $doc->exportField($this->invoiceStatus);
                        $doc->exportField($this->modeOfPayment);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->RIDNO);
                        $doc->exportField($this->TidNo);
                        $doc->exportField($this->DiscountCategory);
                        $doc->exportField($this->sid);
                        $doc->exportField($this->ItemCode);
                        $doc->exportField($this->TestSubCd);
                        $doc->exportField($this->DEptCd);
                        $doc->exportField($this->ProfCd);
                        $doc->exportField($this->Comments);
                        $doc->exportField($this->Method);
                        $doc->exportField($this->Specimen);
                        $doc->exportField($this->Abnormal);
                        $doc->exportField($this->TestUnit);
                        $doc->exportField($this->LOWHIGH);
                        $doc->exportField($this->Branch);
                        $doc->exportField($this->Dispatch);
                        $doc->exportField($this->Pic1);
                        $doc->exportField($this->Pic2);
                        $doc->exportField($this->GraphPath);
                        $doc->exportField($this->MachineCD);
                        $doc->exportField($this->TestCancel);
                        $doc->exportField($this->OutSource);
                        $doc->exportField($this->Printed);
                        $doc->exportField($this->PrintBy);
                        $doc->exportField($this->PrintDate);
                        $doc->exportField($this->BillingDate);
                        $doc->exportField($this->BilledBy);
                        $doc->exportField($this->Resulted);
                        $doc->exportField($this->ResultDate);
                        $doc->exportField($this->ResultedBy);
                        $doc->exportField($this->SampleDate);
                        $doc->exportField($this->SampleUser);
                        $doc->exportField($this->Sampled);
                        $doc->exportField($this->ReceivedDate);
                        $doc->exportField($this->ReceivedUser);
                        $doc->exportField($this->Recevied);
                        $doc->exportField($this->DeptRecvDate);
                        $doc->exportField($this->DeptRecvUser);
                        $doc->exportField($this->DeptRecived);
                        $doc->exportField($this->SAuthDate);
                        $doc->exportField($this->SAuthBy);
                        $doc->exportField($this->SAuthendicate);
                        $doc->exportField($this->AuthDate);
                        $doc->exportField($this->AuthBy);
                        $doc->exportField($this->Authencate);
                        $doc->exportField($this->EditDate);
                        $doc->exportField($this->EditBy);
                        $doc->exportField($this->Editted);
                        $doc->exportField($this->PatientId);
                        $doc->exportField($this->Mobile);
                        $doc->exportField($this->CId);
                        $doc->exportField($this->Order);
                        $doc->exportField($this->ResType);
                        $doc->exportField($this->Sample);
                        $doc->exportField($this->NoD);
                        $doc->exportField($this->BillOrder);
                        $doc->exportField($this->Inactive);
                        $doc->exportField($this->CollSample);
                        $doc->exportField($this->TestType);
                        $doc->exportField($this->Repeated);
                        $doc->exportField($this->RepeatedBy);
                        $doc->exportField($this->RepeatedDate);
                        $doc->exportField($this->serviceID);
                        $doc->exportField($this->Service_Type);
                        $doc->exportField($this->Service_Department);
                        $doc->exportField($this->RequestNo);
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
