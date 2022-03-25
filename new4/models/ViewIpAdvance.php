<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_ip_advance
 */
class ViewIpAdvance extends DbTable
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
    public $Name;
    public $Mobile;
    public $voucher_type;
    public $Details;
    public $ModeofPayment;
    public $Amount;
    public $AnyDues;
    public $createdby;
    public $createddatetime;
    public $modifiedby;
    public $modifieddatetime;
    public $PatID;
    public $PatientID;
    public $PatientName;
    public $VisiteType;
    public $VisitDate;
    public $AdvanceNo;
    public $Status;
    public $Date;
    public $AdvanceValidityDate;
    public $TotalRemainingAdvance;
    public $Remarks;
    public $SeectPaymentMode;
    public $PaidAmount;
    public $Currency;
    public $CardNumber;
    public $BankName;
    public $HospID;
    public $Reception;
    public $mrnno;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'view_ip_advance';
        $this->TableName = 'view_ip_advance';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_ip_advance`";
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
        $this->id = new DbField('view_ip_advance', 'view_ip_advance', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // Name
        $this->Name = new DbField('view_ip_advance', 'view_ip_advance', 'x_Name', 'Name', '`Name`', '`Name`', 200, 45, -1, false, '`Name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Name->Sortable = true; // Allow sort
        $this->Name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Name->Param, "CustomMsg");
        $this->Fields['Name'] = &$this->Name;

        // Mobile
        $this->Mobile = new DbField('view_ip_advance', 'view_ip_advance', 'x_Mobile', 'Mobile', '`Mobile`', '`Mobile`', 200, 45, -1, false, '`Mobile`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Mobile->Sortable = true; // Allow sort
        $this->Mobile->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Mobile->Param, "CustomMsg");
        $this->Fields['Mobile'] = &$this->Mobile;

        // voucher_type
        $this->voucher_type = new DbField('view_ip_advance', 'view_ip_advance', 'x_voucher_type', 'voucher_type', '`voucher_type`', '`voucher_type`', 200, 45, -1, false, '`voucher_type`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->voucher_type->Sortable = true; // Allow sort
        $this->voucher_type->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->voucher_type->Param, "CustomMsg");
        $this->Fields['voucher_type'] = &$this->voucher_type;

        // Details
        $this->Details = new DbField('view_ip_advance', 'view_ip_advance', 'x_Details', 'Details', '`Details`', '`Details`', 200, 45, -1, false, '`Details`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Details->Sortable = true; // Allow sort
        $this->Details->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Details->Param, "CustomMsg");
        $this->Fields['Details'] = &$this->Details;

        // ModeofPayment
        $this->ModeofPayment = new DbField('view_ip_advance', 'view_ip_advance', 'x_ModeofPayment', 'ModeofPayment', '`ModeofPayment`', '`ModeofPayment`', 200, 45, -1, false, '`ModeofPayment`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->ModeofPayment->Required = true; // Required field
        $this->ModeofPayment->Sortable = true; // Allow sort
        $this->ModeofPayment->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->ModeofPayment->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->ModeofPayment->Lookup = new Lookup('ModeofPayment', 'mas_modepayment', false, 'Mode', ["Mode","","",""], [], [], [], [], [], [], '', '');
        $this->ModeofPayment->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ModeofPayment->Param, "CustomMsg");
        $this->Fields['ModeofPayment'] = &$this->ModeofPayment;

        // Amount
        $this->Amount = new DbField('view_ip_advance', 'view_ip_advance', 'x_Amount', 'Amount', '`Amount`', '`Amount`', 131, 10, -1, false, '`Amount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Amount->Required = true; // Required field
        $this->Amount->Sortable = true; // Allow sort
        $this->Amount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Amount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Amount->Param, "CustomMsg");
        $this->Fields['Amount'] = &$this->Amount;

        // AnyDues
        $this->AnyDues = new DbField('view_ip_advance', 'view_ip_advance', 'x_AnyDues', 'AnyDues', '`AnyDues`', '`AnyDues`', 200, 45, -1, false, '`AnyDues`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AnyDues->Sortable = true; // Allow sort
        $this->AnyDues->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AnyDues->Param, "CustomMsg");
        $this->Fields['AnyDues'] = &$this->AnyDues;

        // createdby
        $this->createdby = new DbField('view_ip_advance', 'view_ip_advance', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 200, 45, -1, false, '`createdby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdby->Sortable = true; // Allow sort
        $this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->createdby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createdby->Param, "CustomMsg");
        $this->Fields['createdby'] = &$this->createdby;

        // createddatetime
        $this->createddatetime = new DbField('view_ip_advance', 'view_ip_advance', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, false, '`createddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddatetime->Sortable = true; // Allow sort
        $this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->createddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createddatetime->Param, "CustomMsg");
        $this->Fields['createddatetime'] = &$this->createddatetime;

        // modifiedby
        $this->modifiedby = new DbField('view_ip_advance', 'view_ip_advance', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 200, 45, -1, false, '`modifiedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifiedby->Sortable = true; // Allow sort
        $this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->modifiedby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifiedby->Param, "CustomMsg");
        $this->Fields['modifiedby'] = &$this->modifiedby;

        // modifieddatetime
        $this->modifieddatetime = new DbField('view_ip_advance', 'view_ip_advance', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, false, '`modifieddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifieddatetime->Sortable = true; // Allow sort
        $this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->modifieddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifieddatetime->Param, "CustomMsg");
        $this->Fields['modifieddatetime'] = &$this->modifieddatetime;

        // PatID
        $this->PatID = new DbField('view_ip_advance', 'view_ip_advance', 'x_PatID', 'PatID', '`PatID`', '`PatID`', 3, 11, -1, false, '`PatID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatID->IsForeignKey = true; // Foreign key field
        $this->PatID->Sortable = true; // Allow sort
        $this->PatID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->PatID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatID->Param, "CustomMsg");
        $this->Fields['PatID'] = &$this->PatID;

        // PatientID
        $this->PatientID = new DbField('view_ip_advance', 'view_ip_advance', 'x_PatientID', 'PatientID', '`PatientID`', '`PatientID`', 200, 45, -1, false, '`PatientID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientID->Sortable = true; // Allow sort
        $this->PatientID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientID->Param, "CustomMsg");
        $this->Fields['PatientID'] = &$this->PatientID;

        // PatientName
        $this->PatientName = new DbField('view_ip_advance', 'view_ip_advance', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, false, '`PatientName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientName->Sortable = true; // Allow sort
        $this->PatientName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientName->Param, "CustomMsg");
        $this->Fields['PatientName'] = &$this->PatientName;

        // VisiteType
        $this->VisiteType = new DbField('view_ip_advance', 'view_ip_advance', 'x_VisiteType', 'VisiteType', '`VisiteType`', '`VisiteType`', 200, 45, -1, false, '`VisiteType`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->VisiteType->Sortable = true; // Allow sort
        $this->VisiteType->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->VisiteType->Param, "CustomMsg");
        $this->Fields['VisiteType'] = &$this->VisiteType;

        // VisitDate
        $this->VisitDate = new DbField('view_ip_advance', 'view_ip_advance', 'x_VisitDate', 'VisitDate', '`VisitDate`', CastDateFieldForLike("`VisitDate`", 0, "DB"), 135, 19, 0, false, '`VisitDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->VisitDate->Sortable = true; // Allow sort
        $this->VisitDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->VisitDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->VisitDate->Param, "CustomMsg");
        $this->Fields['VisitDate'] = &$this->VisitDate;

        // AdvanceNo
        $this->AdvanceNo = new DbField('view_ip_advance', 'view_ip_advance', 'x_AdvanceNo', 'AdvanceNo', '`AdvanceNo`', '`AdvanceNo`', 200, 45, -1, false, '`AdvanceNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AdvanceNo->Sortable = true; // Allow sort
        $this->AdvanceNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AdvanceNo->Param, "CustomMsg");
        $this->Fields['AdvanceNo'] = &$this->AdvanceNo;

        // Status
        $this->Status = new DbField('view_ip_advance', 'view_ip_advance', 'x_Status', 'Status', '`Status`', '`Status`', 200, 45, -1, false, '`Status`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Status->Sortable = true; // Allow sort
        $this->Status->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Status->Param, "CustomMsg");
        $this->Fields['Status'] = &$this->Status;

        // Date
        $this->Date = new DbField('view_ip_advance', 'view_ip_advance', 'x_Date', 'Date', '`Date`', CastDateFieldForLike("`Date`", 0, "DB"), 135, 19, 0, false, '`Date`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Date->Required = true; // Required field
        $this->Date->Sortable = true; // Allow sort
        $this->Date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Date->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Date->Param, "CustomMsg");
        $this->Fields['Date'] = &$this->Date;

        // AdvanceValidityDate
        $this->AdvanceValidityDate = new DbField('view_ip_advance', 'view_ip_advance', 'x_AdvanceValidityDate', 'AdvanceValidityDate', '`AdvanceValidityDate`', CastDateFieldForLike("`AdvanceValidityDate`", 0, "DB"), 135, 19, 0, false, '`AdvanceValidityDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AdvanceValidityDate->Sortable = true; // Allow sort
        $this->AdvanceValidityDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->AdvanceValidityDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AdvanceValidityDate->Param, "CustomMsg");
        $this->Fields['AdvanceValidityDate'] = &$this->AdvanceValidityDate;

        // TotalRemainingAdvance
        $this->TotalRemainingAdvance = new DbField('view_ip_advance', 'view_ip_advance', 'x_TotalRemainingAdvance', 'TotalRemainingAdvance', '`TotalRemainingAdvance`', '`TotalRemainingAdvance`', 200, 45, -1, false, '`TotalRemainingAdvance`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TotalRemainingAdvance->Sortable = true; // Allow sort
        $this->TotalRemainingAdvance->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TotalRemainingAdvance->Param, "CustomMsg");
        $this->Fields['TotalRemainingAdvance'] = &$this->TotalRemainingAdvance;

        // Remarks
        $this->Remarks = new DbField('view_ip_advance', 'view_ip_advance', 'x_Remarks', 'Remarks', '`Remarks`', '`Remarks`', 201, 405, -1, false, '`Remarks`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Remarks->Sortable = true; // Allow sort
        $this->Remarks->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Remarks->Param, "CustomMsg");
        $this->Fields['Remarks'] = &$this->Remarks;

        // SeectPaymentMode
        $this->SeectPaymentMode = new DbField('view_ip_advance', 'view_ip_advance', 'x_SeectPaymentMode', 'SeectPaymentMode', '`SeectPaymentMode`', '`SeectPaymentMode`', 200, 45, -1, false, '`SeectPaymentMode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SeectPaymentMode->Sortable = true; // Allow sort
        $this->SeectPaymentMode->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SeectPaymentMode->Param, "CustomMsg");
        $this->Fields['SeectPaymentMode'] = &$this->SeectPaymentMode;

        // PaidAmount
        $this->PaidAmount = new DbField('view_ip_advance', 'view_ip_advance', 'x_PaidAmount', 'PaidAmount', '`PaidAmount`', '`PaidAmount`', 200, 45, -1, false, '`PaidAmount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PaidAmount->Sortable = true; // Allow sort
        $this->PaidAmount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PaidAmount->Param, "CustomMsg");
        $this->Fields['PaidAmount'] = &$this->PaidAmount;

        // Currency
        $this->Currency = new DbField('view_ip_advance', 'view_ip_advance', 'x_Currency', 'Currency', '`Currency`', '`Currency`', 200, 45, -1, false, '`Currency`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Currency->Sortable = true; // Allow sort
        $this->Currency->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Currency->Param, "CustomMsg");
        $this->Fields['Currency'] = &$this->Currency;

        // CardNumber
        $this->CardNumber = new DbField('view_ip_advance', 'view_ip_advance', 'x_CardNumber', 'CardNumber', '`CardNumber`', '`CardNumber`', 200, 45, -1, false, '`CardNumber`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CardNumber->Sortable = true; // Allow sort
        $this->CardNumber->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CardNumber->Param, "CustomMsg");
        $this->Fields['CardNumber'] = &$this->CardNumber;

        // BankName
        $this->BankName = new DbField('view_ip_advance', 'view_ip_advance', 'x_BankName', 'BankName', '`BankName`', '`BankName`', 200, 45, -1, false, '`BankName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BankName->Sortable = true; // Allow sort
        $this->BankName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BankName->Param, "CustomMsg");
        $this->Fields['BankName'] = &$this->BankName;

        // HospID
        $this->HospID = new DbField('view_ip_advance', 'view_ip_advance', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->HospID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospID->Param, "CustomMsg");
        $this->Fields['HospID'] = &$this->HospID;

        // Reception
        $this->Reception = new DbField('view_ip_advance', 'view_ip_advance', 'x_Reception', 'Reception', '`Reception`', '`Reception`', 3, 11, -1, false, '`Reception`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Reception->IsForeignKey = true; // Foreign key field
        $this->Reception->Sortable = true; // Allow sort
        $this->Reception->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Reception->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Reception->Lookup = new Lookup('Reception', 'ip_admission', false, 'id', ["patient_id","patient_name","mrnNo","mobileno"], [], [], [], [], ["patient_name","mobileno","patient_id","PatientID","patient_name","typeRegsisteration","admission_date","mrnNo"], ["x_Name","x_Mobile","x_PatID","x_PatientID","x_PatientName","x_VisiteType","x_VisitDate","x_mrnno"], '`id` DESC', '');
        $this->Reception->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Reception->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Reception->Param, "CustomMsg");
        $this->Fields['Reception'] = &$this->Reception;

        // mrnno
        $this->mrnno = new DbField('view_ip_advance', 'view_ip_advance', 'x_mrnno', 'mrnno', '`mrnno`', '`mrnno`', 200, 45, -1, false, '`mrnno`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->mrnno->IsForeignKey = true; // Foreign key field
        $this->mrnno->Sortable = true; // Allow sort
        $this->mrnno->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->mrnno->Param, "CustomMsg");
        $this->Fields['mrnno'] = &$this->mrnno;
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
        if ($this->getCurrentMasterTable() == "ip_admission") {
            if ($this->mrnno->getSessionValue() != "") {
                $masterFilter .= "" . GetForeignKeySql("`mrnNo`", $this->mrnno->getSessionValue(), DATATYPE_STRING, "DB");
            } else {
                return "";
            }
            if ($this->Reception->getSessionValue() != "") {
                $masterFilter .= " AND " . GetForeignKeySql("`id`", $this->Reception->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
            if ($this->PatID->getSessionValue() != "") {
                $masterFilter .= " AND " . GetForeignKeySql("`patient_id`", $this->PatID->getSessionValue(), DATATYPE_NUMBER, "DB");
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
        if ($this->getCurrentMasterTable() == "ip_admission") {
            if ($this->mrnno->getSessionValue() != "") {
                $detailFilter .= "" . GetForeignKeySql("`mrnno`", $this->mrnno->getSessionValue(), DATATYPE_STRING, "DB");
            } else {
                return "";
            }
            if ($this->Reception->getSessionValue() != "") {
                $detailFilter .= " AND " . GetForeignKeySql("`Reception`", $this->Reception->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
            if ($this->PatID->getSessionValue() != "") {
                $detailFilter .= " AND " . GetForeignKeySql("`PatID`", $this->PatID->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
        }
        return $detailFilter;
    }

    // Master filter
    public function sqlMasterFilter_ip_admission()
    {
        return "`mrnNo`='@mrnNo@' AND `id`=@id@ AND `patient_id`=@patient_id@";
    }
    // Detail filter
    public function sqlDetailFilter_ip_admission()
    {
        return "`mrnno`='@mrnno@' AND `Reception`=@Reception@ AND `PatID`=@PatID@";
    }

    // Table level SQL
    public function getSqlFrom() // From
    {
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_ip_advance`";
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
        $this->Name->DbValue = $row['Name'];
        $this->Mobile->DbValue = $row['Mobile'];
        $this->voucher_type->DbValue = $row['voucher_type'];
        $this->Details->DbValue = $row['Details'];
        $this->ModeofPayment->DbValue = $row['ModeofPayment'];
        $this->Amount->DbValue = $row['Amount'];
        $this->AnyDues->DbValue = $row['AnyDues'];
        $this->createdby->DbValue = $row['createdby'];
        $this->createddatetime->DbValue = $row['createddatetime'];
        $this->modifiedby->DbValue = $row['modifiedby'];
        $this->modifieddatetime->DbValue = $row['modifieddatetime'];
        $this->PatID->DbValue = $row['PatID'];
        $this->PatientID->DbValue = $row['PatientID'];
        $this->PatientName->DbValue = $row['PatientName'];
        $this->VisiteType->DbValue = $row['VisiteType'];
        $this->VisitDate->DbValue = $row['VisitDate'];
        $this->AdvanceNo->DbValue = $row['AdvanceNo'];
        $this->Status->DbValue = $row['Status'];
        $this->Date->DbValue = $row['Date'];
        $this->AdvanceValidityDate->DbValue = $row['AdvanceValidityDate'];
        $this->TotalRemainingAdvance->DbValue = $row['TotalRemainingAdvance'];
        $this->Remarks->DbValue = $row['Remarks'];
        $this->SeectPaymentMode->DbValue = $row['SeectPaymentMode'];
        $this->PaidAmount->DbValue = $row['PaidAmount'];
        $this->Currency->DbValue = $row['Currency'];
        $this->CardNumber->DbValue = $row['CardNumber'];
        $this->BankName->DbValue = $row['BankName'];
        $this->HospID->DbValue = $row['HospID'];
        $this->Reception->DbValue = $row['Reception'];
        $this->mrnno->DbValue = $row['mrnno'];
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
        return $_SESSION[$name] ?? GetUrl("ViewIpAdvanceList");
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
        if ($pageName == "ViewIpAdvanceView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewIpAdvanceEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewIpAdvanceAdd") {
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
                return "ViewIpAdvanceView";
            case Config("API_ADD_ACTION"):
                return "ViewIpAdvanceAdd";
            case Config("API_EDIT_ACTION"):
                return "ViewIpAdvanceEdit";
            case Config("API_DELETE_ACTION"):
                return "ViewIpAdvanceDelete";
            case Config("API_LIST_ACTION"):
                return "ViewIpAdvanceList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewIpAdvanceList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewIpAdvanceView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewIpAdvanceView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewIpAdvanceAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewIpAdvanceAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewIpAdvanceEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewIpAdvanceAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewIpAdvanceDelete", $this->getUrlParm());
    }

    // Add master url
    public function addMasterUrl($url)
    {
        if ($this->getCurrentMasterTable() == "ip_admission" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
            $url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
            $url .= "&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnno->CurrentValue ?? $this->mrnno->getSessionValue());
            $url .= "&" . GetForeignKeyUrl("fk_id", $this->Reception->CurrentValue ?? $this->Reception->getSessionValue());
            $url .= "&" . GetForeignKeyUrl("fk_patient_id", $this->PatID->CurrentValue ?? $this->PatID->getSessionValue());
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
        $this->Name->setDbValue($row['Name']);
        $this->Mobile->setDbValue($row['Mobile']);
        $this->voucher_type->setDbValue($row['voucher_type']);
        $this->Details->setDbValue($row['Details']);
        $this->ModeofPayment->setDbValue($row['ModeofPayment']);
        $this->Amount->setDbValue($row['Amount']);
        $this->AnyDues->setDbValue($row['AnyDues']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->PatID->setDbValue($row['PatID']);
        $this->PatientID->setDbValue($row['PatientID']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->VisiteType->setDbValue($row['VisiteType']);
        $this->VisitDate->setDbValue($row['VisitDate']);
        $this->AdvanceNo->setDbValue($row['AdvanceNo']);
        $this->Status->setDbValue($row['Status']);
        $this->Date->setDbValue($row['Date']);
        $this->AdvanceValidityDate->setDbValue($row['AdvanceValidityDate']);
        $this->TotalRemainingAdvance->setDbValue($row['TotalRemainingAdvance']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->SeectPaymentMode->setDbValue($row['SeectPaymentMode']);
        $this->PaidAmount->setDbValue($row['PaidAmount']);
        $this->Currency->setDbValue($row['Currency']);
        $this->CardNumber->setDbValue($row['CardNumber']);
        $this->BankName->setDbValue($row['BankName']);
        $this->HospID->setDbValue($row['HospID']);
        $this->Reception->setDbValue($row['Reception']);
        $this->mrnno->setDbValue($row['mrnno']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // Name

        // Mobile

        // voucher_type

        // Details

        // ModeofPayment

        // Amount

        // AnyDues

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // PatID

        // PatientID

        // PatientName

        // VisiteType

        // VisitDate

        // AdvanceNo

        // Status

        // Date

        // AdvanceValidityDate

        // TotalRemainingAdvance

        // Remarks

        // SeectPaymentMode

        // PaidAmount

        // Currency

        // CardNumber

        // BankName

        // HospID

        // Reception

        // mrnno

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // Name
        $this->Name->ViewValue = $this->Name->CurrentValue;
        $this->Name->ViewCustomAttributes = "";

        // Mobile
        $this->Mobile->ViewValue = $this->Mobile->CurrentValue;
        $this->Mobile->ViewCustomAttributes = "";

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
        $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
        $this->createddatetime->ViewCustomAttributes = "";

        // modifiedby
        $this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
        $this->modifiedby->ViewCustomAttributes = "";

        // modifieddatetime
        $this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
        $this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
        $this->modifieddatetime->ViewCustomAttributes = "";

        // PatID
        $this->PatID->ViewValue = $this->PatID->CurrentValue;
        $this->PatID->ViewValue = FormatNumber($this->PatID->ViewValue, 0, -2, -2, -2);
        $this->PatID->ViewCustomAttributes = "";

        // PatientID
        $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
        $this->PatientID->ViewCustomAttributes = "";

        // PatientName
        $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
        $this->PatientName->ViewCustomAttributes = "";

        // VisiteType
        $this->VisiteType->ViewValue = $this->VisiteType->CurrentValue;
        $this->VisiteType->ViewCustomAttributes = "";

        // VisitDate
        $this->VisitDate->ViewValue = $this->VisitDate->CurrentValue;
        $this->VisitDate->ViewValue = FormatDateTime($this->VisitDate->ViewValue, 0);
        $this->VisitDate->ViewCustomAttributes = "";

        // AdvanceNo
        $this->AdvanceNo->ViewValue = $this->AdvanceNo->CurrentValue;
        $this->AdvanceNo->ViewCustomAttributes = "";

        // Status
        $this->Status->ViewValue = $this->Status->CurrentValue;
        $this->Status->ViewCustomAttributes = "";

        // Date
        $this->Date->ViewValue = $this->Date->CurrentValue;
        $this->Date->ViewValue = FormatDateTime($this->Date->ViewValue, 0);
        $this->Date->ViewCustomAttributes = "";

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

        // CardNumber
        $this->CardNumber->ViewValue = $this->CardNumber->CurrentValue;
        $this->CardNumber->ViewCustomAttributes = "";

        // BankName
        $this->BankName->ViewValue = $this->BankName->CurrentValue;
        $this->BankName->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

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

        // mrnno
        $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
        $this->mrnno->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // Name
        $this->Name->LinkCustomAttributes = "";
        $this->Name->HrefValue = "";
        $this->Name->TooltipValue = "";

        // Mobile
        $this->Mobile->LinkCustomAttributes = "";
        $this->Mobile->HrefValue = "";
        $this->Mobile->TooltipValue = "";

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

        // PatID
        $this->PatID->LinkCustomAttributes = "";
        $this->PatID->HrefValue = "";
        $this->PatID->TooltipValue = "";

        // PatientID
        $this->PatientID->LinkCustomAttributes = "";
        $this->PatientID->HrefValue = "";
        $this->PatientID->TooltipValue = "";

        // PatientName
        $this->PatientName->LinkCustomAttributes = "";
        $this->PatientName->HrefValue = "";
        $this->PatientName->TooltipValue = "";

        // VisiteType
        $this->VisiteType->LinkCustomAttributes = "";
        $this->VisiteType->HrefValue = "";
        $this->VisiteType->TooltipValue = "";

        // VisitDate
        $this->VisitDate->LinkCustomAttributes = "";
        $this->VisitDate->HrefValue = "";
        $this->VisitDate->TooltipValue = "";

        // AdvanceNo
        $this->AdvanceNo->LinkCustomAttributes = "";
        $this->AdvanceNo->HrefValue = "";
        $this->AdvanceNo->TooltipValue = "";

        // Status
        $this->Status->LinkCustomAttributes = "";
        $this->Status->HrefValue = "";
        $this->Status->TooltipValue = "";

        // Date
        $this->Date->LinkCustomAttributes = "";
        $this->Date->HrefValue = "";
        $this->Date->TooltipValue = "";

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

        // CardNumber
        $this->CardNumber->LinkCustomAttributes = "";
        $this->CardNumber->HrefValue = "";
        $this->CardNumber->TooltipValue = "";

        // BankName
        $this->BankName->LinkCustomAttributes = "";
        $this->BankName->HrefValue = "";
        $this->BankName->TooltipValue = "";

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

        // Name
        $this->Name->EditAttrs["class"] = "form-control";
        $this->Name->EditCustomAttributes = "";
        if (!$this->Name->Raw) {
            $this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
        }
        $this->Name->EditValue = $this->Name->CurrentValue;
        $this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

        // Mobile
        $this->Mobile->EditAttrs["class"] = "form-control";
        $this->Mobile->EditCustomAttributes = "";
        if (!$this->Mobile->Raw) {
            $this->Mobile->CurrentValue = HtmlDecode($this->Mobile->CurrentValue);
        }
        $this->Mobile->EditValue = $this->Mobile->CurrentValue;
        $this->Mobile->PlaceHolder = RemoveHtml($this->Mobile->caption());

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

        // PatID
        $this->PatID->EditAttrs["class"] = "form-control";
        $this->PatID->EditCustomAttributes = "";
        $this->PatID->EditValue = $this->PatID->CurrentValue;
        $this->PatID->EditValue = FormatNumber($this->PatID->EditValue, 0, -2, -2, -2);
        $this->PatID->ViewCustomAttributes = "";

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
        $this->VisitDate->EditValue = FormatDateTime($this->VisitDate->CurrentValue, 8);
        $this->VisitDate->PlaceHolder = RemoveHtml($this->VisitDate->caption());

        // AdvanceNo
        $this->AdvanceNo->EditAttrs["class"] = "form-control";
        $this->AdvanceNo->EditCustomAttributes = "";
        if (!$this->AdvanceNo->Raw) {
            $this->AdvanceNo->CurrentValue = HtmlDecode($this->AdvanceNo->CurrentValue);
        }
        $this->AdvanceNo->EditValue = $this->AdvanceNo->CurrentValue;
        $this->AdvanceNo->PlaceHolder = RemoveHtml($this->AdvanceNo->caption());

        // Status
        $this->Status->EditAttrs["class"] = "form-control";
        $this->Status->EditCustomAttributes = "";
        if (!$this->Status->Raw) {
            $this->Status->CurrentValue = HtmlDecode($this->Status->CurrentValue);
        }
        $this->Status->EditValue = $this->Status->CurrentValue;
        $this->Status->PlaceHolder = RemoveHtml($this->Status->caption());

        // Date
        $this->Date->EditAttrs["class"] = "form-control";
        $this->Date->EditCustomAttributes = "";
        $this->Date->EditValue = FormatDateTime($this->Date->CurrentValue, 8);
        $this->Date->PlaceHolder = RemoveHtml($this->Date->caption());

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
        if (!$this->Remarks->Raw) {
            $this->Remarks->CurrentValue = HtmlDecode($this->Remarks->CurrentValue);
        }
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

        // BankName
        $this->BankName->EditAttrs["class"] = "form-control";
        $this->BankName->EditCustomAttributes = "";
        if (!$this->BankName->Raw) {
            $this->BankName->CurrentValue = HtmlDecode($this->BankName->CurrentValue);
        }
        $this->BankName->EditValue = $this->BankName->CurrentValue;
        $this->BankName->PlaceHolder = RemoveHtml($this->BankName->caption());

        // HospID

        // Reception
        $this->Reception->EditAttrs["class"] = "form-control";
        $this->Reception->EditCustomAttributes = "";
        $curVal = trim(strval($this->Reception->CurrentValue));
        if ($curVal != "") {
            $this->Reception->EditValue = $this->Reception->lookupCacheOption($curVal);
            if ($this->Reception->EditValue === null) { // Lookup from database
                $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                $sqlWrk = $this->Reception->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Reception->Lookup->renderViewRow($rswrk[0]);
                    $this->Reception->EditValue = $this->Reception->displayValue($arwrk);
                } else {
                    $this->Reception->EditValue = $this->Reception->CurrentValue;
                }
            }
        } else {
            $this->Reception->EditValue = null;
        }
        $this->Reception->ViewCustomAttributes = "";

        // mrnno
        $this->mrnno->EditAttrs["class"] = "form-control";
        $this->mrnno->EditCustomAttributes = "";
        $this->mrnno->EditValue = $this->mrnno->CurrentValue;
        $this->mrnno->ViewCustomAttributes = "";

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
                    $doc->exportCaption($this->Name);
                    $doc->exportCaption($this->Mobile);
                    $doc->exportCaption($this->voucher_type);
                    $doc->exportCaption($this->Details);
                    $doc->exportCaption($this->ModeofPayment);
                    $doc->exportCaption($this->Amount);
                    $doc->exportCaption($this->AnyDues);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->PatID);
                    $doc->exportCaption($this->PatientID);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->VisiteType);
                    $doc->exportCaption($this->VisitDate);
                    $doc->exportCaption($this->AdvanceNo);
                    $doc->exportCaption($this->Status);
                    $doc->exportCaption($this->Date);
                    $doc->exportCaption($this->AdvanceValidityDate);
                    $doc->exportCaption($this->TotalRemainingAdvance);
                    $doc->exportCaption($this->Remarks);
                    $doc->exportCaption($this->SeectPaymentMode);
                    $doc->exportCaption($this->PaidAmount);
                    $doc->exportCaption($this->Currency);
                    $doc->exportCaption($this->CardNumber);
                    $doc->exportCaption($this->BankName);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->Reception);
                    $doc->exportCaption($this->mrnno);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->Name);
                    $doc->exportCaption($this->Mobile);
                    $doc->exportCaption($this->voucher_type);
                    $doc->exportCaption($this->Details);
                    $doc->exportCaption($this->ModeofPayment);
                    $doc->exportCaption($this->Amount);
                    $doc->exportCaption($this->AnyDues);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->PatID);
                    $doc->exportCaption($this->PatientID);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->VisiteType);
                    $doc->exportCaption($this->VisitDate);
                    $doc->exportCaption($this->AdvanceNo);
                    $doc->exportCaption($this->Status);
                    $doc->exportCaption($this->Date);
                    $doc->exportCaption($this->AdvanceValidityDate);
                    $doc->exportCaption($this->TotalRemainingAdvance);
                    $doc->exportCaption($this->Remarks);
                    $doc->exportCaption($this->SeectPaymentMode);
                    $doc->exportCaption($this->PaidAmount);
                    $doc->exportCaption($this->Currency);
                    $doc->exportCaption($this->CardNumber);
                    $doc->exportCaption($this->BankName);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->Reception);
                    $doc->exportCaption($this->mrnno);
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
                        $doc->exportField($this->Name);
                        $doc->exportField($this->Mobile);
                        $doc->exportField($this->voucher_type);
                        $doc->exportField($this->Details);
                        $doc->exportField($this->ModeofPayment);
                        $doc->exportField($this->Amount);
                        $doc->exportField($this->AnyDues);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->PatID);
                        $doc->exportField($this->PatientID);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->VisiteType);
                        $doc->exportField($this->VisitDate);
                        $doc->exportField($this->AdvanceNo);
                        $doc->exportField($this->Status);
                        $doc->exportField($this->Date);
                        $doc->exportField($this->AdvanceValidityDate);
                        $doc->exportField($this->TotalRemainingAdvance);
                        $doc->exportField($this->Remarks);
                        $doc->exportField($this->SeectPaymentMode);
                        $doc->exportField($this->PaidAmount);
                        $doc->exportField($this->Currency);
                        $doc->exportField($this->CardNumber);
                        $doc->exportField($this->BankName);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->Reception);
                        $doc->exportField($this->mrnno);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->Name);
                        $doc->exportField($this->Mobile);
                        $doc->exportField($this->voucher_type);
                        $doc->exportField($this->Details);
                        $doc->exportField($this->ModeofPayment);
                        $doc->exportField($this->Amount);
                        $doc->exportField($this->AnyDues);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->PatID);
                        $doc->exportField($this->PatientID);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->VisiteType);
                        $doc->exportField($this->VisitDate);
                        $doc->exportField($this->AdvanceNo);
                        $doc->exportField($this->Status);
                        $doc->exportField($this->Date);
                        $doc->exportField($this->AdvanceValidityDate);
                        $doc->exportField($this->TotalRemainingAdvance);
                        $doc->exportField($this->Remarks);
                        $doc->exportField($this->SeectPaymentMode);
                        $doc->exportField($this->PaidAmount);
                        $doc->exportField($this->Currency);
                        $doc->exportField($this->CardNumber);
                        $doc->exportField($this->BankName);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->Reception);
                        $doc->exportField($this->mrnno);
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
    				$rsnew["AdvanceNo"]  =  $hospital_PreFixCode . 'AD'. getAdvanceNo($HospID);
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
