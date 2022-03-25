<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for receipts
 */
class Receipts extends DbTable
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

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'receipts';
        $this->TableName = 'receipts';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`receipts`";
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
        $this->id = new DbField('receipts', 'receipts', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['id'] = &$this->id;

        // Reception
        $this->Reception = new DbField('receipts', 'receipts', 'x_Reception', 'Reception', '`Reception`', '`Reception`', 3, 11, -1, false, '`Reception`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Reception->Nullable = false; // NOT NULL field
        $this->Reception->Required = true; // Required field
        $this->Reception->Sortable = true; // Allow sort
        $this->Reception->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['Reception'] = &$this->Reception;

        // Aid
        $this->Aid = new DbField('receipts', 'receipts', 'x_Aid', 'Aid', '`Aid`', '`Aid`', 3, 11, -1, false, '`Aid`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Aid->Sortable = true; // Allow sort
        $this->Aid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['Aid'] = &$this->Aid;

        // Vid
        $this->Vid = new DbField('receipts', 'receipts', 'x_Vid', 'Vid', '`Vid`', '`Vid`', 3, 11, -1, false, '`Vid`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Vid->Sortable = true; // Allow sort
        $this->Vid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['Vid'] = &$this->Vid;

        // patient_id
        $this->patient_id = new DbField('receipts', 'receipts', 'x_patient_id', 'patient_id', '`patient_id`', '`patient_id`', 3, 11, -1, false, '`patient_id`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->patient_id->Nullable = false; // NOT NULL field
        $this->patient_id->Required = true; // Required field
        $this->patient_id->Sortable = true; // Allow sort
        $this->patient_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['patient_id'] = &$this->patient_id;

        // mrnno
        $this->mrnno = new DbField('receipts', 'receipts', 'x_mrnno', 'mrnno', '`mrnno`', '`mrnno`', 200, 45, -1, false, '`mrnno`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->mrnno->Sortable = true; // Allow sort
        $this->Fields['mrnno'] = &$this->mrnno;

        // PatientName
        $this->PatientName = new DbField('receipts', 'receipts', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, false, '`PatientName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientName->Sortable = true; // Allow sort
        $this->Fields['PatientName'] = &$this->PatientName;

        // amount
        $this->amount = new DbField('receipts', 'receipts', 'x_amount', 'amount', '`amount`', '`amount`', 5, 22, -1, false, '`amount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->amount->Nullable = false; // NOT NULL field
        $this->amount->Required = true; // Required field
        $this->amount->Sortable = true; // Allow sort
        $this->amount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['amount'] = &$this->amount;

        // Discount
        $this->Discount = new DbField('receipts', 'receipts', 'x_Discount', 'Discount', '`Discount`', '`Discount`', 5, 22, -1, false, '`Discount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Discount->Sortable = true; // Allow sort
        $this->Discount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Discount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['Discount'] = &$this->Discount;

        // SubTotal
        $this->SubTotal = new DbField('receipts', 'receipts', 'x_SubTotal', 'SubTotal', '`SubTotal`', '`SubTotal`', 5, 22, -1, false, '`SubTotal`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SubTotal->Sortable = true; // Allow sort
        $this->SubTotal->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SubTotal->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['SubTotal'] = &$this->SubTotal;

        // patient_type
        $this->patient_type = new DbField('receipts', 'receipts', 'x_patient_type', 'patient_type', '`patient_type`', '`patient_type`', 3, 11, -1, false, '`patient_type`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->patient_type->Nullable = false; // NOT NULL field
        $this->patient_type->Required = true; // Required field
        $this->patient_type->Sortable = true; // Allow sort
        $this->patient_type->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['patient_type'] = &$this->patient_type;

        // invoiceId
        $this->invoiceId = new DbField('receipts', 'receipts', 'x_invoiceId', 'invoiceId', '`invoiceId`', '`invoiceId`', 3, 11, -1, false, '`invoiceId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->invoiceId->Sortable = true; // Allow sort
        $this->invoiceId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['invoiceId'] = &$this->invoiceId;

        // invoiceAmount
        $this->invoiceAmount = new DbField('receipts', 'receipts', 'x_invoiceAmount', 'invoiceAmount', '`invoiceAmount`', '`invoiceAmount`', 5, 22, -1, false, '`invoiceAmount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->invoiceAmount->Sortable = true; // Allow sort
        $this->invoiceAmount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->invoiceAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['invoiceAmount'] = &$this->invoiceAmount;

        // invoiceStatus
        $this->invoiceStatus = new DbField('receipts', 'receipts', 'x_invoiceStatus', 'invoiceStatus', '`invoiceStatus`', '`invoiceStatus`', 200, 45, -1, false, '`invoiceStatus`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->invoiceStatus->Sortable = true; // Allow sort
        $this->Fields['invoiceStatus'] = &$this->invoiceStatus;

        // modeOfPayment
        $this->modeOfPayment = new DbField('receipts', 'receipts', 'x_modeOfPayment', 'modeOfPayment', '`modeOfPayment`', '`modeOfPayment`', 200, 45, -1, false, '`modeOfPayment`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modeOfPayment->Sortable = true; // Allow sort
        $this->Fields['modeOfPayment'] = &$this->modeOfPayment;

        // charged_date
        $this->charged_date = new DbField('receipts', 'receipts', 'x_charged_date', 'charged_date', '`charged_date`', CastDateFieldForLike("`charged_date`", 0, "DB"), 135, 19, 0, false, '`charged_date`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->charged_date->Nullable = false; // NOT NULL field
        $this->charged_date->Required = true; // Required field
        $this->charged_date->Sortable = true; // Allow sort
        $this->charged_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['charged_date'] = &$this->charged_date;

        // status
        $this->status = new DbField('receipts', 'receipts', 'x_status', 'status', '`status`', '`status`', 3, 11, -1, false, '`status`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->status->Nullable = false; // NOT NULL field
        $this->status->Required = true; // Required field
        $this->status->Sortable = true; // Allow sort
        $this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['status'] = &$this->status;

        // createdby
        $this->createdby = new DbField('receipts', 'receipts', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, 11, -1, false, '`createdby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdby->Sortable = true; // Allow sort
        $this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['createdby'] = &$this->createdby;

        // createddatetime
        $this->createddatetime = new DbField('receipts', 'receipts', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, false, '`createddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddatetime->Sortable = true; // Allow sort
        $this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['createddatetime'] = &$this->createddatetime;

        // modifiedby
        $this->modifiedby = new DbField('receipts', 'receipts', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, 11, -1, false, '`modifiedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifiedby->Sortable = true; // Allow sort
        $this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['modifiedby'] = &$this->modifiedby;

        // modifieddatetime
        $this->modifieddatetime = new DbField('receipts', 'receipts', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, false, '`modifieddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifieddatetime->Sortable = true; // Allow sort
        $this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['modifieddatetime'] = &$this->modifieddatetime;

        // ChequeCardNo
        $this->ChequeCardNo = new DbField('receipts', 'receipts', 'x_ChequeCardNo', 'ChequeCardNo', '`ChequeCardNo`', '`ChequeCardNo`', 200, 45, -1, false, '`ChequeCardNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ChequeCardNo->Sortable = true; // Allow sort
        $this->Fields['ChequeCardNo'] = &$this->ChequeCardNo;

        // CreditBankName
        $this->CreditBankName = new DbField('receipts', 'receipts', 'x_CreditBankName', 'CreditBankName', '`CreditBankName`', '`CreditBankName`', 200, 45, -1, false, '`CreditBankName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CreditBankName->Sortable = true; // Allow sort
        $this->Fields['CreditBankName'] = &$this->CreditBankName;

        // CreditCardHolder
        $this->CreditCardHolder = new DbField('receipts', 'receipts', 'x_CreditCardHolder', 'CreditCardHolder', '`CreditCardHolder`', '`CreditCardHolder`', 200, 45, -1, false, '`CreditCardHolder`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CreditCardHolder->Sortable = true; // Allow sort
        $this->Fields['CreditCardHolder'] = &$this->CreditCardHolder;

        // CreditCardType
        $this->CreditCardType = new DbField('receipts', 'receipts', 'x_CreditCardType', 'CreditCardType', '`CreditCardType`', '`CreditCardType`', 200, 45, -1, false, '`CreditCardType`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CreditCardType->Sortable = true; // Allow sort
        $this->Fields['CreditCardType'] = &$this->CreditCardType;

        // CreditCardMachine
        $this->CreditCardMachine = new DbField('receipts', 'receipts', 'x_CreditCardMachine', 'CreditCardMachine', '`CreditCardMachine`', '`CreditCardMachine`', 200, 45, -1, false, '`CreditCardMachine`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CreditCardMachine->Sortable = true; // Allow sort
        $this->Fields['CreditCardMachine'] = &$this->CreditCardMachine;

        // CreditCardBatchNo
        $this->CreditCardBatchNo = new DbField('receipts', 'receipts', 'x_CreditCardBatchNo', 'CreditCardBatchNo', '`CreditCardBatchNo`', '`CreditCardBatchNo`', 200, 45, -1, false, '`CreditCardBatchNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CreditCardBatchNo->Sortable = true; // Allow sort
        $this->Fields['CreditCardBatchNo'] = &$this->CreditCardBatchNo;

        // CreditCardTax
        $this->CreditCardTax = new DbField('receipts', 'receipts', 'x_CreditCardTax', 'CreditCardTax', '`CreditCardTax`', '`CreditCardTax`', 200, 45, -1, false, '`CreditCardTax`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CreditCardTax->Sortable = true; // Allow sort
        $this->Fields['CreditCardTax'] = &$this->CreditCardTax;

        // CreditDeductionAmount
        $this->CreditDeductionAmount = new DbField('receipts', 'receipts', 'x_CreditDeductionAmount', 'CreditDeductionAmount', '`CreditDeductionAmount`', '`CreditDeductionAmount`', 200, 45, -1, false, '`CreditDeductionAmount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CreditDeductionAmount->Sortable = true; // Allow sort
        $this->Fields['CreditDeductionAmount'] = &$this->CreditDeductionAmount;

        // RealizationAmount
        $this->RealizationAmount = new DbField('receipts', 'receipts', 'x_RealizationAmount', 'RealizationAmount', '`RealizationAmount`', '`RealizationAmount`', 200, 45, -1, false, '`RealizationAmount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RealizationAmount->Sortable = true; // Allow sort
        $this->Fields['RealizationAmount'] = &$this->RealizationAmount;

        // RealizationStatus
        $this->RealizationStatus = new DbField('receipts', 'receipts', 'x_RealizationStatus', 'RealizationStatus', '`RealizationStatus`', '`RealizationStatus`', 200, 45, -1, false, '`RealizationStatus`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RealizationStatus->Sortable = true; // Allow sort
        $this->Fields['RealizationStatus'] = &$this->RealizationStatus;

        // RealizationRemarks
        $this->RealizationRemarks = new DbField('receipts', 'receipts', 'x_RealizationRemarks', 'RealizationRemarks', '`RealizationRemarks`', '`RealizationRemarks`', 200, 45, -1, false, '`RealizationRemarks`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RealizationRemarks->Sortable = true; // Allow sort
        $this->Fields['RealizationRemarks'] = &$this->RealizationRemarks;

        // RealizationBatchNo
        $this->RealizationBatchNo = new DbField('receipts', 'receipts', 'x_RealizationBatchNo', 'RealizationBatchNo', '`RealizationBatchNo`', '`RealizationBatchNo`', 200, 45, -1, false, '`RealizationBatchNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RealizationBatchNo->Sortable = true; // Allow sort
        $this->Fields['RealizationBatchNo'] = &$this->RealizationBatchNo;

        // RealizationDate
        $this->RealizationDate = new DbField('receipts', 'receipts', 'x_RealizationDate', 'RealizationDate', '`RealizationDate`', '`RealizationDate`', 200, 45, -1, false, '`RealizationDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RealizationDate->Sortable = true; // Allow sort
        $this->Fields['RealizationDate'] = &$this->RealizationDate;

        // BankAccHolderMobileNumber
        $this->BankAccHolderMobileNumber = new DbField('receipts', 'receipts', 'x_BankAccHolderMobileNumber', 'BankAccHolderMobileNumber', '`BankAccHolderMobileNumber`', '`BankAccHolderMobileNumber`', 200, 45, -1, false, '`BankAccHolderMobileNumber`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BankAccHolderMobileNumber->Sortable = true; // Allow sort
        $this->Fields['BankAccHolderMobileNumber'] = &$this->BankAccHolderMobileNumber;
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
            return GetUrl("ReceiptsList");
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
        if ($pageName == "ReceiptsView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ReceiptsEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ReceiptsAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ReceiptsList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ReceiptsView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ReceiptsView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ReceiptsAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ReceiptsAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ReceiptsEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ReceiptsAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ReceiptsDelete", $this->getUrlParm());
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
        $this->Aid->setDbValue($row['Aid']);
        $this->Vid->setDbValue($row['Vid']);
        $this->patient_id->setDbValue($row['patient_id']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->amount->setDbValue($row['amount']);
        $this->Discount->setDbValue($row['Discount']);
        $this->SubTotal->setDbValue($row['SubTotal']);
        $this->patient_type->setDbValue($row['patient_type']);
        $this->invoiceId->setDbValue($row['invoiceId']);
        $this->invoiceAmount->setDbValue($row['invoiceAmount']);
        $this->invoiceStatus->setDbValue($row['invoiceStatus']);
        $this->modeOfPayment->setDbValue($row['modeOfPayment']);
        $this->charged_date->setDbValue($row['charged_date']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->ChequeCardNo->setDbValue($row['ChequeCardNo']);
        $this->CreditBankName->setDbValue($row['CreditBankName']);
        $this->CreditCardHolder->setDbValue($row['CreditCardHolder']);
        $this->CreditCardType->setDbValue($row['CreditCardType']);
        $this->CreditCardMachine->setDbValue($row['CreditCardMachine']);
        $this->CreditCardBatchNo->setDbValue($row['CreditCardBatchNo']);
        $this->CreditCardTax->setDbValue($row['CreditCardTax']);
        $this->CreditDeductionAmount->setDbValue($row['CreditDeductionAmount']);
        $this->RealizationAmount->setDbValue($row['RealizationAmount']);
        $this->RealizationStatus->setDbValue($row['RealizationStatus']);
        $this->RealizationRemarks->setDbValue($row['RealizationRemarks']);
        $this->RealizationBatchNo->setDbValue($row['RealizationBatchNo']);
        $this->RealizationDate->setDbValue($row['RealizationDate']);
        $this->BankAccHolderMobileNumber->setDbValue($row['BankAccHolderMobileNumber']);
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

        // amount
        $this->amount->EditAttrs["class"] = "form-control";
        $this->amount->EditCustomAttributes = "";
        $this->amount->EditValue = $this->amount->CurrentValue;
        $this->amount->PlaceHolder = RemoveHtml($this->amount->caption());
        if (strval($this->amount->EditValue) != "" && is_numeric($this->amount->EditValue)) {
            $this->amount->EditValue = FormatNumber($this->amount->EditValue, -2, -2, -2, -2);
        }

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
        if (!$this->ChequeCardNo->Raw) {
            $this->ChequeCardNo->CurrentValue = HtmlDecode($this->ChequeCardNo->CurrentValue);
        }
        $this->ChequeCardNo->EditValue = $this->ChequeCardNo->CurrentValue;
        $this->ChequeCardNo->PlaceHolder = RemoveHtml($this->ChequeCardNo->caption());

        // CreditBankName
        $this->CreditBankName->EditAttrs["class"] = "form-control";
        $this->CreditBankName->EditCustomAttributes = "";
        if (!$this->CreditBankName->Raw) {
            $this->CreditBankName->CurrentValue = HtmlDecode($this->CreditBankName->CurrentValue);
        }
        $this->CreditBankName->EditValue = $this->CreditBankName->CurrentValue;
        $this->CreditBankName->PlaceHolder = RemoveHtml($this->CreditBankName->caption());

        // CreditCardHolder
        $this->CreditCardHolder->EditAttrs["class"] = "form-control";
        $this->CreditCardHolder->EditCustomAttributes = "";
        if (!$this->CreditCardHolder->Raw) {
            $this->CreditCardHolder->CurrentValue = HtmlDecode($this->CreditCardHolder->CurrentValue);
        }
        $this->CreditCardHolder->EditValue = $this->CreditCardHolder->CurrentValue;
        $this->CreditCardHolder->PlaceHolder = RemoveHtml($this->CreditCardHolder->caption());

        // CreditCardType
        $this->CreditCardType->EditAttrs["class"] = "form-control";
        $this->CreditCardType->EditCustomAttributes = "";
        if (!$this->CreditCardType->Raw) {
            $this->CreditCardType->CurrentValue = HtmlDecode($this->CreditCardType->CurrentValue);
        }
        $this->CreditCardType->EditValue = $this->CreditCardType->CurrentValue;
        $this->CreditCardType->PlaceHolder = RemoveHtml($this->CreditCardType->caption());

        // CreditCardMachine
        $this->CreditCardMachine->EditAttrs["class"] = "form-control";
        $this->CreditCardMachine->EditCustomAttributes = "";
        if (!$this->CreditCardMachine->Raw) {
            $this->CreditCardMachine->CurrentValue = HtmlDecode($this->CreditCardMachine->CurrentValue);
        }
        $this->CreditCardMachine->EditValue = $this->CreditCardMachine->CurrentValue;
        $this->CreditCardMachine->PlaceHolder = RemoveHtml($this->CreditCardMachine->caption());

        // CreditCardBatchNo
        $this->CreditCardBatchNo->EditAttrs["class"] = "form-control";
        $this->CreditCardBatchNo->EditCustomAttributes = "";
        if (!$this->CreditCardBatchNo->Raw) {
            $this->CreditCardBatchNo->CurrentValue = HtmlDecode($this->CreditCardBatchNo->CurrentValue);
        }
        $this->CreditCardBatchNo->EditValue = $this->CreditCardBatchNo->CurrentValue;
        $this->CreditCardBatchNo->PlaceHolder = RemoveHtml($this->CreditCardBatchNo->caption());

        // CreditCardTax
        $this->CreditCardTax->EditAttrs["class"] = "form-control";
        $this->CreditCardTax->EditCustomAttributes = "";
        if (!$this->CreditCardTax->Raw) {
            $this->CreditCardTax->CurrentValue = HtmlDecode($this->CreditCardTax->CurrentValue);
        }
        $this->CreditCardTax->EditValue = $this->CreditCardTax->CurrentValue;
        $this->CreditCardTax->PlaceHolder = RemoveHtml($this->CreditCardTax->caption());

        // CreditDeductionAmount
        $this->CreditDeductionAmount->EditAttrs["class"] = "form-control";
        $this->CreditDeductionAmount->EditCustomAttributes = "";
        if (!$this->CreditDeductionAmount->Raw) {
            $this->CreditDeductionAmount->CurrentValue = HtmlDecode($this->CreditDeductionAmount->CurrentValue);
        }
        $this->CreditDeductionAmount->EditValue = $this->CreditDeductionAmount->CurrentValue;
        $this->CreditDeductionAmount->PlaceHolder = RemoveHtml($this->CreditDeductionAmount->caption());

        // RealizationAmount
        $this->RealizationAmount->EditAttrs["class"] = "form-control";
        $this->RealizationAmount->EditCustomAttributes = "";
        if (!$this->RealizationAmount->Raw) {
            $this->RealizationAmount->CurrentValue = HtmlDecode($this->RealizationAmount->CurrentValue);
        }
        $this->RealizationAmount->EditValue = $this->RealizationAmount->CurrentValue;
        $this->RealizationAmount->PlaceHolder = RemoveHtml($this->RealizationAmount->caption());

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

        // BankAccHolderMobileNumber
        $this->BankAccHolderMobileNumber->EditAttrs["class"] = "form-control";
        $this->BankAccHolderMobileNumber->EditCustomAttributes = "";
        if (!$this->BankAccHolderMobileNumber->Raw) {
            $this->BankAccHolderMobileNumber->CurrentValue = HtmlDecode($this->BankAccHolderMobileNumber->CurrentValue);
        }
        $this->BankAccHolderMobileNumber->EditValue = $this->BankAccHolderMobileNumber->CurrentValue;
        $this->BankAccHolderMobileNumber->PlaceHolder = RemoveHtml($this->BankAccHolderMobileNumber->caption());

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
