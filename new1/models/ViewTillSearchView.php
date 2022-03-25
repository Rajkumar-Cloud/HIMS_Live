<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_till_search_view
 */
class ViewTillSearchView extends DbTable
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
    public $DepositDate;
    public $DepositToBankSelect;
    public $DepositToBank;
    public $TransferToSelect;
    public $TransferTo;
    public $OpeningBalance;
    public $A2000Count;
    public $A2000Amount;
    public $A1000Count;
    public $A1000Amount;
    public $A500Count;
    public $A500Amount;
    public $A200Count;
    public $A200Amount;
    public $A100Count;
    public $A100Amount;
    public $A50Count;
    public $A50Amount;
    public $A20Count;
    public $A20Amount;
    public $A10Count;
    public $A10Amount;
    public $Other;
    public $TotalCash;
    public $Cheque;
    public $Card;
    public $NEFTRTGS;
    public $TotalTransferDepositAmount;
    public $CreatedBy;
    public $CreatedDateTime;
    public $ModifiedBy;
    public $ModifiedDateTime;
    public $CreatedUserName;
    public $ModifiedUserName;
    public $BalanceAmount;
    public $CashCollected;
    public $RTGS;
    public $PAYTM;
    public $HospID;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'view_till_search_view';
        $this->TableName = 'view_till_search_view';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_till_search_view`";
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
        $this->id = new DbField('view_till_search_view', 'view_till_search_view', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['id'] = &$this->id;

        // DepositDate
        $this->DepositDate = new DbField('view_till_search_view', 'view_till_search_view', 'x_DepositDate', 'DepositDate', '`DepositDate`', CastDateFieldForLike("`DepositDate`", 0, "DB"), 135, 19, 0, false, '`DepositDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DepositDate->Sortable = true; // Allow sort
        $this->DepositDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['DepositDate'] = &$this->DepositDate;

        // DepositToBankSelect
        $this->DepositToBankSelect = new DbField('view_till_search_view', 'view_till_search_view', 'x_DepositToBankSelect', 'DepositToBankSelect', '`DepositToBankSelect`', '`DepositToBankSelect`', 200, 45, -1, false, '`DepositToBankSelect`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DepositToBankSelect->Sortable = true; // Allow sort
        $this->Fields['DepositToBankSelect'] = &$this->DepositToBankSelect;

        // DepositToBank
        $this->DepositToBank = new DbField('view_till_search_view', 'view_till_search_view', 'x_DepositToBank', 'DepositToBank', '`DepositToBank`', '`DepositToBank`', 200, 45, -1, false, '`DepositToBank`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DepositToBank->Sortable = true; // Allow sort
        $this->Fields['DepositToBank'] = &$this->DepositToBank;

        // TransferToSelect
        $this->TransferToSelect = new DbField('view_till_search_view', 'view_till_search_view', 'x_TransferToSelect', 'TransferToSelect', '`TransferToSelect`', '`TransferToSelect`', 200, 45, -1, false, '`TransferToSelect`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TransferToSelect->Sortable = true; // Allow sort
        $this->Fields['TransferToSelect'] = &$this->TransferToSelect;

        // TransferTo
        $this->TransferTo = new DbField('view_till_search_view', 'view_till_search_view', 'x_TransferTo', 'TransferTo', '`TransferTo`', '`TransferTo`', 200, 45, -1, false, '`TransferTo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TransferTo->Sortable = true; // Allow sort
        $this->Fields['TransferTo'] = &$this->TransferTo;

        // OpeningBalance
        $this->OpeningBalance = new DbField('view_till_search_view', 'view_till_search_view', 'x_OpeningBalance', 'OpeningBalance', '`OpeningBalance`', '`OpeningBalance`', 131, 10, -1, false, '`OpeningBalance`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OpeningBalance->Sortable = true; // Allow sort
        $this->OpeningBalance->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OpeningBalance->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['OpeningBalance'] = &$this->OpeningBalance;

        // A2000Count
        $this->A2000Count = new DbField('view_till_search_view', 'view_till_search_view', 'x_A2000Count', 'A2000Count', '`A2000Count`', '`A2000Count`', 3, 11, -1, false, '`A2000Count`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->A2000Count->Sortable = true; // Allow sort
        $this->A2000Count->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['A2000Count'] = &$this->A2000Count;

        // A2000Amount
        $this->A2000Amount = new DbField('view_till_search_view', 'view_till_search_view', 'x_A2000Amount', 'A2000Amount', '`A2000Amount`', '`A2000Amount`', 131, 10, -1, false, '`A2000Amount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->A2000Amount->Sortable = true; // Allow sort
        $this->A2000Amount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->A2000Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['A2000Amount'] = &$this->A2000Amount;

        // A1000Count
        $this->A1000Count = new DbField('view_till_search_view', 'view_till_search_view', 'x_A1000Count', 'A1000Count', '`A1000Count`', '`A1000Count`', 3, 11, -1, false, '`A1000Count`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->A1000Count->Sortable = true; // Allow sort
        $this->A1000Count->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['A1000Count'] = &$this->A1000Count;

        // A1000Amount
        $this->A1000Amount = new DbField('view_till_search_view', 'view_till_search_view', 'x_A1000Amount', 'A1000Amount', '`A1000Amount`', '`A1000Amount`', 131, 10, -1, false, '`A1000Amount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->A1000Amount->Sortable = true; // Allow sort
        $this->A1000Amount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->A1000Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['A1000Amount'] = &$this->A1000Amount;

        // A500Count
        $this->A500Count = new DbField('view_till_search_view', 'view_till_search_view', 'x_A500Count', 'A500Count', '`A500Count`', '`A500Count`', 3, 11, -1, false, '`A500Count`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->A500Count->Sortable = true; // Allow sort
        $this->A500Count->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['A500Count'] = &$this->A500Count;

        // A500Amount
        $this->A500Amount = new DbField('view_till_search_view', 'view_till_search_view', 'x_A500Amount', 'A500Amount', '`A500Amount`', '`A500Amount`', 131, 10, -1, false, '`A500Amount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->A500Amount->Sortable = true; // Allow sort
        $this->A500Amount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->A500Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['A500Amount'] = &$this->A500Amount;

        // A200Count
        $this->A200Count = new DbField('view_till_search_view', 'view_till_search_view', 'x_A200Count', 'A200Count', '`A200Count`', '`A200Count`', 3, 11, -1, false, '`A200Count`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->A200Count->Sortable = true; // Allow sort
        $this->A200Count->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['A200Count'] = &$this->A200Count;

        // A200Amount
        $this->A200Amount = new DbField('view_till_search_view', 'view_till_search_view', 'x_A200Amount', 'A200Amount', '`A200Amount`', '`A200Amount`', 131, 10, -1, false, '`A200Amount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->A200Amount->Sortable = true; // Allow sort
        $this->A200Amount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->A200Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['A200Amount'] = &$this->A200Amount;

        // A100Count
        $this->A100Count = new DbField('view_till_search_view', 'view_till_search_view', 'x_A100Count', 'A100Count', '`A100Count`', '`A100Count`', 3, 11, -1, false, '`A100Count`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->A100Count->Sortable = true; // Allow sort
        $this->A100Count->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['A100Count'] = &$this->A100Count;

        // A100Amount
        $this->A100Amount = new DbField('view_till_search_view', 'view_till_search_view', 'x_A100Amount', 'A100Amount', '`A100Amount`', '`A100Amount`', 131, 10, -1, false, '`A100Amount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->A100Amount->Sortable = true; // Allow sort
        $this->A100Amount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->A100Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['A100Amount'] = &$this->A100Amount;

        // A50Count
        $this->A50Count = new DbField('view_till_search_view', 'view_till_search_view', 'x_A50Count', 'A50Count', '`A50Count`', '`A50Count`', 3, 11, -1, false, '`A50Count`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->A50Count->Sortable = true; // Allow sort
        $this->A50Count->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['A50Count'] = &$this->A50Count;

        // A50Amount
        $this->A50Amount = new DbField('view_till_search_view', 'view_till_search_view', 'x_A50Amount', 'A50Amount', '`A50Amount`', '`A50Amount`', 131, 10, -1, false, '`A50Amount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->A50Amount->Sortable = true; // Allow sort
        $this->A50Amount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->A50Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['A50Amount'] = &$this->A50Amount;

        // A20Count
        $this->A20Count = new DbField('view_till_search_view', 'view_till_search_view', 'x_A20Count', 'A20Count', '`A20Count`', '`A20Count`', 3, 11, -1, false, '`A20Count`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->A20Count->Sortable = true; // Allow sort
        $this->A20Count->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['A20Count'] = &$this->A20Count;

        // A20Amount
        $this->A20Amount = new DbField('view_till_search_view', 'view_till_search_view', 'x_A20Amount', 'A20Amount', '`A20Amount`', '`A20Amount`', 131, 10, -1, false, '`A20Amount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->A20Amount->Sortable = true; // Allow sort
        $this->A20Amount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->A20Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['A20Amount'] = &$this->A20Amount;

        // A10Count
        $this->A10Count = new DbField('view_till_search_view', 'view_till_search_view', 'x_A10Count', 'A10Count', '`A10Count`', '`A10Count`', 3, 11, -1, false, '`A10Count`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->A10Count->Sortable = true; // Allow sort
        $this->A10Count->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['A10Count'] = &$this->A10Count;

        // A10Amount
        $this->A10Amount = new DbField('view_till_search_view', 'view_till_search_view', 'x_A10Amount', 'A10Amount', '`A10Amount`', '`A10Amount`', 131, 10, -1, false, '`A10Amount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->A10Amount->Sortable = true; // Allow sort
        $this->A10Amount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->A10Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['A10Amount'] = &$this->A10Amount;

        // Other
        $this->Other = new DbField('view_till_search_view', 'view_till_search_view', 'x_Other', 'Other', '`Other`', '`Other`', 131, 10, -1, false, '`Other`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Other->Sortable = true; // Allow sort
        $this->Other->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Other->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['Other'] = &$this->Other;

        // TotalCash
        $this->TotalCash = new DbField('view_till_search_view', 'view_till_search_view', 'x_TotalCash', 'TotalCash', '`TotalCash`', '`TotalCash`', 131, 10, -1, false, '`TotalCash`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TotalCash->Sortable = true; // Allow sort
        $this->TotalCash->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->TotalCash->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['TotalCash'] = &$this->TotalCash;

        // Cheque
        $this->Cheque = new DbField('view_till_search_view', 'view_till_search_view', 'x_Cheque', 'Cheque', '`Cheque`', '`Cheque`', 131, 10, -1, false, '`Cheque`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Cheque->Sortable = true; // Allow sort
        $this->Cheque->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Cheque->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['Cheque'] = &$this->Cheque;

        // Card
        $this->Card = new DbField('view_till_search_view', 'view_till_search_view', 'x_Card', 'Card', '`Card`', '`Card`', 131, 10, -1, false, '`Card`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Card->Sortable = true; // Allow sort
        $this->Card->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Card->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['Card'] = &$this->Card;

        // NEFTRTGS
        $this->NEFTRTGS = new DbField('view_till_search_view', 'view_till_search_view', 'x_NEFTRTGS', 'NEFTRTGS', '`NEFTRTGS`', '`NEFTRTGS`', 131, 10, -1, false, '`NEFTRTGS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NEFTRTGS->Sortable = true; // Allow sort
        $this->NEFTRTGS->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->NEFTRTGS->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['NEFTRTGS'] = &$this->NEFTRTGS;

        // TotalTransferDepositAmount
        $this->TotalTransferDepositAmount = new DbField('view_till_search_view', 'view_till_search_view', 'x_TotalTransferDepositAmount', 'TotalTransferDepositAmount', '`TotalTransferDepositAmount`', '`TotalTransferDepositAmount`', 131, 10, -1, false, '`TotalTransferDepositAmount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TotalTransferDepositAmount->Sortable = true; // Allow sort
        $this->TotalTransferDepositAmount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->TotalTransferDepositAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['TotalTransferDepositAmount'] = &$this->TotalTransferDepositAmount;

        // CreatedBy
        $this->CreatedBy = new DbField('view_till_search_view', 'view_till_search_view', 'x_CreatedBy', 'CreatedBy', '`CreatedBy`', '`CreatedBy`', 3, 11, -1, false, '`CreatedBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CreatedBy->Sortable = true; // Allow sort
        $this->CreatedBy->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['CreatedBy'] = &$this->CreatedBy;

        // CreatedDateTime
        $this->CreatedDateTime = new DbField('view_till_search_view', 'view_till_search_view', 'x_CreatedDateTime', 'CreatedDateTime', '`CreatedDateTime`', CastDateFieldForLike("`CreatedDateTime`", 0, "DB"), 135, 19, 0, false, '`CreatedDateTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CreatedDateTime->Sortable = true; // Allow sort
        $this->CreatedDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['CreatedDateTime'] = &$this->CreatedDateTime;

        // ModifiedBy
        $this->ModifiedBy = new DbField('view_till_search_view', 'view_till_search_view', 'x_ModifiedBy', 'ModifiedBy', '`ModifiedBy`', '`ModifiedBy`', 3, 11, -1, false, '`ModifiedBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ModifiedBy->Sortable = true; // Allow sort
        $this->ModifiedBy->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['ModifiedBy'] = &$this->ModifiedBy;

        // ModifiedDateTime
        $this->ModifiedDateTime = new DbField('view_till_search_view', 'view_till_search_view', 'x_ModifiedDateTime', 'ModifiedDateTime', '`ModifiedDateTime`', CastDateFieldForLike("`ModifiedDateTime`", 0, "DB"), 135, 19, 0, false, '`ModifiedDateTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ModifiedDateTime->Sortable = true; // Allow sort
        $this->ModifiedDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['ModifiedDateTime'] = &$this->ModifiedDateTime;

        // CreatedUserName
        $this->CreatedUserName = new DbField('view_till_search_view', 'view_till_search_view', 'x_CreatedUserName', 'CreatedUserName', '`CreatedUserName`', '`CreatedUserName`', 200, 45, -1, false, '`CreatedUserName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CreatedUserName->Sortable = true; // Allow sort
        $this->Fields['CreatedUserName'] = &$this->CreatedUserName;

        // ModifiedUserName
        $this->ModifiedUserName = new DbField('view_till_search_view', 'view_till_search_view', 'x_ModifiedUserName', 'ModifiedUserName', '`ModifiedUserName`', '`ModifiedUserName`', 200, 45, -1, false, '`ModifiedUserName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ModifiedUserName->Sortable = true; // Allow sort
        $this->Fields['ModifiedUserName'] = &$this->ModifiedUserName;

        // BalanceAmount
        $this->BalanceAmount = new DbField('view_till_search_view', 'view_till_search_view', 'x_BalanceAmount', 'BalanceAmount', '`BalanceAmount`', '`BalanceAmount`', 131, 10, -1, false, '`BalanceAmount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BalanceAmount->Sortable = true; // Allow sort
        $this->BalanceAmount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->BalanceAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['BalanceAmount'] = &$this->BalanceAmount;

        // CashCollected
        $this->CashCollected = new DbField('view_till_search_view', 'view_till_search_view', 'x_CashCollected', 'CashCollected', '`CashCollected`', '`CashCollected`', 131, 10, -1, false, '`CashCollected`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CashCollected->Sortable = true; // Allow sort
        $this->CashCollected->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->CashCollected->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['CashCollected'] = &$this->CashCollected;

        // RTGS
        $this->RTGS = new DbField('view_till_search_view', 'view_till_search_view', 'x_RTGS', 'RTGS', '`RTGS`', '`RTGS`', 131, 10, -1, false, '`RTGS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RTGS->Sortable = true; // Allow sort
        $this->RTGS->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->RTGS->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['RTGS'] = &$this->RTGS;

        // PAYTM
        $this->PAYTM = new DbField('view_till_search_view', 'view_till_search_view', 'x_PAYTM', 'PAYTM', '`PAYTM`', '`PAYTM`', 131, 10, -1, false, '`PAYTM`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PAYTM->Sortable = true; // Allow sort
        $this->PAYTM->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PAYTM->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['PAYTM'] = &$this->PAYTM;

        // HospID
        $this->HospID = new DbField('view_till_search_view', 'view_till_search_view', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['HospID'] = &$this->HospID;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_till_search_view`";
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
        $this->DepositDate->DbValue = $row['DepositDate'];
        $this->DepositToBankSelect->DbValue = $row['DepositToBankSelect'];
        $this->DepositToBank->DbValue = $row['DepositToBank'];
        $this->TransferToSelect->DbValue = $row['TransferToSelect'];
        $this->TransferTo->DbValue = $row['TransferTo'];
        $this->OpeningBalance->DbValue = $row['OpeningBalance'];
        $this->A2000Count->DbValue = $row['A2000Count'];
        $this->A2000Amount->DbValue = $row['A2000Amount'];
        $this->A1000Count->DbValue = $row['A1000Count'];
        $this->A1000Amount->DbValue = $row['A1000Amount'];
        $this->A500Count->DbValue = $row['A500Count'];
        $this->A500Amount->DbValue = $row['A500Amount'];
        $this->A200Count->DbValue = $row['A200Count'];
        $this->A200Amount->DbValue = $row['A200Amount'];
        $this->A100Count->DbValue = $row['A100Count'];
        $this->A100Amount->DbValue = $row['A100Amount'];
        $this->A50Count->DbValue = $row['A50Count'];
        $this->A50Amount->DbValue = $row['A50Amount'];
        $this->A20Count->DbValue = $row['A20Count'];
        $this->A20Amount->DbValue = $row['A20Amount'];
        $this->A10Count->DbValue = $row['A10Count'];
        $this->A10Amount->DbValue = $row['A10Amount'];
        $this->Other->DbValue = $row['Other'];
        $this->TotalCash->DbValue = $row['TotalCash'];
        $this->Cheque->DbValue = $row['Cheque'];
        $this->Card->DbValue = $row['Card'];
        $this->NEFTRTGS->DbValue = $row['NEFTRTGS'];
        $this->TotalTransferDepositAmount->DbValue = $row['TotalTransferDepositAmount'];
        $this->CreatedBy->DbValue = $row['CreatedBy'];
        $this->CreatedDateTime->DbValue = $row['CreatedDateTime'];
        $this->ModifiedBy->DbValue = $row['ModifiedBy'];
        $this->ModifiedDateTime->DbValue = $row['ModifiedDateTime'];
        $this->CreatedUserName->DbValue = $row['CreatedUserName'];
        $this->ModifiedUserName->DbValue = $row['ModifiedUserName'];
        $this->BalanceAmount->DbValue = $row['BalanceAmount'];
        $this->CashCollected->DbValue = $row['CashCollected'];
        $this->RTGS->DbValue = $row['RTGS'];
        $this->PAYTM->DbValue = $row['PAYTM'];
        $this->HospID->DbValue = $row['HospID'];
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
            return GetUrl("ViewTillSearchViewList");
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
        if ($pageName == "ViewTillSearchViewView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewTillSearchViewEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewTillSearchViewAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewTillSearchViewList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewTillSearchViewView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewTillSearchViewView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewTillSearchViewAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewTillSearchViewAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewTillSearchViewEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewTillSearchViewAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewTillSearchViewDelete", $this->getUrlParm());
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
        $this->DepositDate->setDbValue($row['DepositDate']);
        $this->DepositToBankSelect->setDbValue($row['DepositToBankSelect']);
        $this->DepositToBank->setDbValue($row['DepositToBank']);
        $this->TransferToSelect->setDbValue($row['TransferToSelect']);
        $this->TransferTo->setDbValue($row['TransferTo']);
        $this->OpeningBalance->setDbValue($row['OpeningBalance']);
        $this->A2000Count->setDbValue($row['A2000Count']);
        $this->A2000Amount->setDbValue($row['A2000Amount']);
        $this->A1000Count->setDbValue($row['A1000Count']);
        $this->A1000Amount->setDbValue($row['A1000Amount']);
        $this->A500Count->setDbValue($row['A500Count']);
        $this->A500Amount->setDbValue($row['A500Amount']);
        $this->A200Count->setDbValue($row['A200Count']);
        $this->A200Amount->setDbValue($row['A200Amount']);
        $this->A100Count->setDbValue($row['A100Count']);
        $this->A100Amount->setDbValue($row['A100Amount']);
        $this->A50Count->setDbValue($row['A50Count']);
        $this->A50Amount->setDbValue($row['A50Amount']);
        $this->A20Count->setDbValue($row['A20Count']);
        $this->A20Amount->setDbValue($row['A20Amount']);
        $this->A10Count->setDbValue($row['A10Count']);
        $this->A10Amount->setDbValue($row['A10Amount']);
        $this->Other->setDbValue($row['Other']);
        $this->TotalCash->setDbValue($row['TotalCash']);
        $this->Cheque->setDbValue($row['Cheque']);
        $this->Card->setDbValue($row['Card']);
        $this->NEFTRTGS->setDbValue($row['NEFTRTGS']);
        $this->TotalTransferDepositAmount->setDbValue($row['TotalTransferDepositAmount']);
        $this->CreatedBy->setDbValue($row['CreatedBy']);
        $this->CreatedDateTime->setDbValue($row['CreatedDateTime']);
        $this->ModifiedBy->setDbValue($row['ModifiedBy']);
        $this->ModifiedDateTime->setDbValue($row['ModifiedDateTime']);
        $this->CreatedUserName->setDbValue($row['CreatedUserName']);
        $this->ModifiedUserName->setDbValue($row['ModifiedUserName']);
        $this->BalanceAmount->setDbValue($row['BalanceAmount']);
        $this->CashCollected->setDbValue($row['CashCollected']);
        $this->RTGS->setDbValue($row['RTGS']);
        $this->PAYTM->setDbValue($row['PAYTM']);
        $this->HospID->setDbValue($row['HospID']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // DepositDate

        // DepositToBankSelect

        // DepositToBank

        // TransferToSelect

        // TransferTo

        // OpeningBalance

        // A2000Count

        // A2000Amount

        // A1000Count

        // A1000Amount

        // A500Count

        // A500Amount

        // A200Count

        // A200Amount

        // A100Count

        // A100Amount

        // A50Count

        // A50Amount

        // A20Count

        // A20Amount

        // A10Count

        // A10Amount

        // Other

        // TotalCash

        // Cheque

        // Card

        // NEFTRTGS

        // TotalTransferDepositAmount

        // CreatedBy

        // CreatedDateTime

        // ModifiedBy

        // ModifiedDateTime

        // CreatedUserName

        // ModifiedUserName

        // BalanceAmount

        // CashCollected

        // RTGS

        // PAYTM

        // HospID

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // DepositDate
        $this->DepositDate->ViewValue = $this->DepositDate->CurrentValue;
        $this->DepositDate->ViewValue = FormatDateTime($this->DepositDate->ViewValue, 0);
        $this->DepositDate->ViewCustomAttributes = "";

        // DepositToBankSelect
        $this->DepositToBankSelect->ViewValue = $this->DepositToBankSelect->CurrentValue;
        $this->DepositToBankSelect->ViewCustomAttributes = "";

        // DepositToBank
        $this->DepositToBank->ViewValue = $this->DepositToBank->CurrentValue;
        $this->DepositToBank->ViewCustomAttributes = "";

        // TransferToSelect
        $this->TransferToSelect->ViewValue = $this->TransferToSelect->CurrentValue;
        $this->TransferToSelect->ViewCustomAttributes = "";

        // TransferTo
        $this->TransferTo->ViewValue = $this->TransferTo->CurrentValue;
        $this->TransferTo->ViewCustomAttributes = "";

        // OpeningBalance
        $this->OpeningBalance->ViewValue = $this->OpeningBalance->CurrentValue;
        $this->OpeningBalance->ViewValue = FormatNumber($this->OpeningBalance->ViewValue, 2, -2, -2, -2);
        $this->OpeningBalance->ViewCustomAttributes = "";

        // A2000Count
        $this->A2000Count->ViewValue = $this->A2000Count->CurrentValue;
        $this->A2000Count->ViewValue = FormatNumber($this->A2000Count->ViewValue, 0, -2, -2, -2);
        $this->A2000Count->ViewCustomAttributes = "";

        // A2000Amount
        $this->A2000Amount->ViewValue = $this->A2000Amount->CurrentValue;
        $this->A2000Amount->ViewValue = FormatNumber($this->A2000Amount->ViewValue, 2, -2, -2, -2);
        $this->A2000Amount->ViewCustomAttributes = "";

        // A1000Count
        $this->A1000Count->ViewValue = $this->A1000Count->CurrentValue;
        $this->A1000Count->ViewValue = FormatNumber($this->A1000Count->ViewValue, 0, -2, -2, -2);
        $this->A1000Count->ViewCustomAttributes = "";

        // A1000Amount
        $this->A1000Amount->ViewValue = $this->A1000Amount->CurrentValue;
        $this->A1000Amount->ViewValue = FormatNumber($this->A1000Amount->ViewValue, 2, -2, -2, -2);
        $this->A1000Amount->ViewCustomAttributes = "";

        // A500Count
        $this->A500Count->ViewValue = $this->A500Count->CurrentValue;
        $this->A500Count->ViewValue = FormatNumber($this->A500Count->ViewValue, 0, -2, -2, -2);
        $this->A500Count->ViewCustomAttributes = "";

        // A500Amount
        $this->A500Amount->ViewValue = $this->A500Amount->CurrentValue;
        $this->A500Amount->ViewValue = FormatNumber($this->A500Amount->ViewValue, 2, -2, -2, -2);
        $this->A500Amount->ViewCustomAttributes = "";

        // A200Count
        $this->A200Count->ViewValue = $this->A200Count->CurrentValue;
        $this->A200Count->ViewValue = FormatNumber($this->A200Count->ViewValue, 0, -2, -2, -2);
        $this->A200Count->ViewCustomAttributes = "";

        // A200Amount
        $this->A200Amount->ViewValue = $this->A200Amount->CurrentValue;
        $this->A200Amount->ViewValue = FormatNumber($this->A200Amount->ViewValue, 2, -2, -2, -2);
        $this->A200Amount->ViewCustomAttributes = "";

        // A100Count
        $this->A100Count->ViewValue = $this->A100Count->CurrentValue;
        $this->A100Count->ViewValue = FormatNumber($this->A100Count->ViewValue, 0, -2, -2, -2);
        $this->A100Count->ViewCustomAttributes = "";

        // A100Amount
        $this->A100Amount->ViewValue = $this->A100Amount->CurrentValue;
        $this->A100Amount->ViewValue = FormatNumber($this->A100Amount->ViewValue, 2, -2, -2, -2);
        $this->A100Amount->ViewCustomAttributes = "";

        // A50Count
        $this->A50Count->ViewValue = $this->A50Count->CurrentValue;
        $this->A50Count->ViewValue = FormatNumber($this->A50Count->ViewValue, 0, -2, -2, -2);
        $this->A50Count->ViewCustomAttributes = "";

        // A50Amount
        $this->A50Amount->ViewValue = $this->A50Amount->CurrentValue;
        $this->A50Amount->ViewValue = FormatNumber($this->A50Amount->ViewValue, 2, -2, -2, -2);
        $this->A50Amount->ViewCustomAttributes = "";

        // A20Count
        $this->A20Count->ViewValue = $this->A20Count->CurrentValue;
        $this->A20Count->ViewValue = FormatNumber($this->A20Count->ViewValue, 0, -2, -2, -2);
        $this->A20Count->ViewCustomAttributes = "";

        // A20Amount
        $this->A20Amount->ViewValue = $this->A20Amount->CurrentValue;
        $this->A20Amount->ViewValue = FormatNumber($this->A20Amount->ViewValue, 2, -2, -2, -2);
        $this->A20Amount->ViewCustomAttributes = "";

        // A10Count
        $this->A10Count->ViewValue = $this->A10Count->CurrentValue;
        $this->A10Count->ViewValue = FormatNumber($this->A10Count->ViewValue, 0, -2, -2, -2);
        $this->A10Count->ViewCustomAttributes = "";

        // A10Amount
        $this->A10Amount->ViewValue = $this->A10Amount->CurrentValue;
        $this->A10Amount->ViewValue = FormatNumber($this->A10Amount->ViewValue, 2, -2, -2, -2);
        $this->A10Amount->ViewCustomAttributes = "";

        // Other
        $this->Other->ViewValue = $this->Other->CurrentValue;
        $this->Other->ViewValue = FormatNumber($this->Other->ViewValue, 2, -2, -2, -2);
        $this->Other->ViewCustomAttributes = "";

        // TotalCash
        $this->TotalCash->ViewValue = $this->TotalCash->CurrentValue;
        $this->TotalCash->ViewValue = FormatNumber($this->TotalCash->ViewValue, 2, -2, -2, -2);
        $this->TotalCash->ViewCustomAttributes = "";

        // Cheque
        $this->Cheque->ViewValue = $this->Cheque->CurrentValue;
        $this->Cheque->ViewValue = FormatNumber($this->Cheque->ViewValue, 2, -2, -2, -2);
        $this->Cheque->ViewCustomAttributes = "";

        // Card
        $this->Card->ViewValue = $this->Card->CurrentValue;
        $this->Card->ViewValue = FormatNumber($this->Card->ViewValue, 2, -2, -2, -2);
        $this->Card->ViewCustomAttributes = "";

        // NEFTRTGS
        $this->NEFTRTGS->ViewValue = $this->NEFTRTGS->CurrentValue;
        $this->NEFTRTGS->ViewValue = FormatNumber($this->NEFTRTGS->ViewValue, 2, -2, -2, -2);
        $this->NEFTRTGS->ViewCustomAttributes = "";

        // TotalTransferDepositAmount
        $this->TotalTransferDepositAmount->ViewValue = $this->TotalTransferDepositAmount->CurrentValue;
        $this->TotalTransferDepositAmount->ViewValue = FormatNumber($this->TotalTransferDepositAmount->ViewValue, 2, -2, -2, -2);
        $this->TotalTransferDepositAmount->ViewCustomAttributes = "";

        // CreatedBy
        $this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
        $this->CreatedBy->ViewValue = FormatNumber($this->CreatedBy->ViewValue, 0, -2, -2, -2);
        $this->CreatedBy->ViewCustomAttributes = "";

        // CreatedDateTime
        $this->CreatedDateTime->ViewValue = $this->CreatedDateTime->CurrentValue;
        $this->CreatedDateTime->ViewValue = FormatDateTime($this->CreatedDateTime->ViewValue, 0);
        $this->CreatedDateTime->ViewCustomAttributes = "";

        // ModifiedBy
        $this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
        $this->ModifiedBy->ViewValue = FormatNumber($this->ModifiedBy->ViewValue, 0, -2, -2, -2);
        $this->ModifiedBy->ViewCustomAttributes = "";

        // ModifiedDateTime
        $this->ModifiedDateTime->ViewValue = $this->ModifiedDateTime->CurrentValue;
        $this->ModifiedDateTime->ViewValue = FormatDateTime($this->ModifiedDateTime->ViewValue, 0);
        $this->ModifiedDateTime->ViewCustomAttributes = "";

        // CreatedUserName
        $this->CreatedUserName->ViewValue = $this->CreatedUserName->CurrentValue;
        $this->CreatedUserName->ViewCustomAttributes = "";

        // ModifiedUserName
        $this->ModifiedUserName->ViewValue = $this->ModifiedUserName->CurrentValue;
        $this->ModifiedUserName->ViewCustomAttributes = "";

        // BalanceAmount
        $this->BalanceAmount->ViewValue = $this->BalanceAmount->CurrentValue;
        $this->BalanceAmount->ViewValue = FormatNumber($this->BalanceAmount->ViewValue, 2, -2, -2, -2);
        $this->BalanceAmount->ViewCustomAttributes = "";

        // CashCollected
        $this->CashCollected->ViewValue = $this->CashCollected->CurrentValue;
        $this->CashCollected->ViewValue = FormatNumber($this->CashCollected->ViewValue, 2, -2, -2, -2);
        $this->CashCollected->ViewCustomAttributes = "";

        // RTGS
        $this->RTGS->ViewValue = $this->RTGS->CurrentValue;
        $this->RTGS->ViewValue = FormatNumber($this->RTGS->ViewValue, 2, -2, -2, -2);
        $this->RTGS->ViewCustomAttributes = "";

        // PAYTM
        $this->PAYTM->ViewValue = $this->PAYTM->CurrentValue;
        $this->PAYTM->ViewValue = FormatNumber($this->PAYTM->ViewValue, 2, -2, -2, -2);
        $this->PAYTM->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // DepositDate
        $this->DepositDate->LinkCustomAttributes = "";
        $this->DepositDate->HrefValue = "";
        $this->DepositDate->TooltipValue = "";

        // DepositToBankSelect
        $this->DepositToBankSelect->LinkCustomAttributes = "";
        $this->DepositToBankSelect->HrefValue = "";
        $this->DepositToBankSelect->TooltipValue = "";

        // DepositToBank
        $this->DepositToBank->LinkCustomAttributes = "";
        $this->DepositToBank->HrefValue = "";
        $this->DepositToBank->TooltipValue = "";

        // TransferToSelect
        $this->TransferToSelect->LinkCustomAttributes = "";
        $this->TransferToSelect->HrefValue = "";
        $this->TransferToSelect->TooltipValue = "";

        // TransferTo
        $this->TransferTo->LinkCustomAttributes = "";
        $this->TransferTo->HrefValue = "";
        $this->TransferTo->TooltipValue = "";

        // OpeningBalance
        $this->OpeningBalance->LinkCustomAttributes = "";
        $this->OpeningBalance->HrefValue = "";
        $this->OpeningBalance->TooltipValue = "";

        // A2000Count
        $this->A2000Count->LinkCustomAttributes = "";
        $this->A2000Count->HrefValue = "";
        $this->A2000Count->TooltipValue = "";

        // A2000Amount
        $this->A2000Amount->LinkCustomAttributes = "";
        $this->A2000Amount->HrefValue = "";
        $this->A2000Amount->TooltipValue = "";

        // A1000Count
        $this->A1000Count->LinkCustomAttributes = "";
        $this->A1000Count->HrefValue = "";
        $this->A1000Count->TooltipValue = "";

        // A1000Amount
        $this->A1000Amount->LinkCustomAttributes = "";
        $this->A1000Amount->HrefValue = "";
        $this->A1000Amount->TooltipValue = "";

        // A500Count
        $this->A500Count->LinkCustomAttributes = "";
        $this->A500Count->HrefValue = "";
        $this->A500Count->TooltipValue = "";

        // A500Amount
        $this->A500Amount->LinkCustomAttributes = "";
        $this->A500Amount->HrefValue = "";
        $this->A500Amount->TooltipValue = "";

        // A200Count
        $this->A200Count->LinkCustomAttributes = "";
        $this->A200Count->HrefValue = "";
        $this->A200Count->TooltipValue = "";

        // A200Amount
        $this->A200Amount->LinkCustomAttributes = "";
        $this->A200Amount->HrefValue = "";
        $this->A200Amount->TooltipValue = "";

        // A100Count
        $this->A100Count->LinkCustomAttributes = "";
        $this->A100Count->HrefValue = "";
        $this->A100Count->TooltipValue = "";

        // A100Amount
        $this->A100Amount->LinkCustomAttributes = "";
        $this->A100Amount->HrefValue = "";
        $this->A100Amount->TooltipValue = "";

        // A50Count
        $this->A50Count->LinkCustomAttributes = "";
        $this->A50Count->HrefValue = "";
        $this->A50Count->TooltipValue = "";

        // A50Amount
        $this->A50Amount->LinkCustomAttributes = "";
        $this->A50Amount->HrefValue = "";
        $this->A50Amount->TooltipValue = "";

        // A20Count
        $this->A20Count->LinkCustomAttributes = "";
        $this->A20Count->HrefValue = "";
        $this->A20Count->TooltipValue = "";

        // A20Amount
        $this->A20Amount->LinkCustomAttributes = "";
        $this->A20Amount->HrefValue = "";
        $this->A20Amount->TooltipValue = "";

        // A10Count
        $this->A10Count->LinkCustomAttributes = "";
        $this->A10Count->HrefValue = "";
        $this->A10Count->TooltipValue = "";

        // A10Amount
        $this->A10Amount->LinkCustomAttributes = "";
        $this->A10Amount->HrefValue = "";
        $this->A10Amount->TooltipValue = "";

        // Other
        $this->Other->LinkCustomAttributes = "";
        $this->Other->HrefValue = "";
        $this->Other->TooltipValue = "";

        // TotalCash
        $this->TotalCash->LinkCustomAttributes = "";
        $this->TotalCash->HrefValue = "";
        $this->TotalCash->TooltipValue = "";

        // Cheque
        $this->Cheque->LinkCustomAttributes = "";
        $this->Cheque->HrefValue = "";
        $this->Cheque->TooltipValue = "";

        // Card
        $this->Card->LinkCustomAttributes = "";
        $this->Card->HrefValue = "";
        $this->Card->TooltipValue = "";

        // NEFTRTGS
        $this->NEFTRTGS->LinkCustomAttributes = "";
        $this->NEFTRTGS->HrefValue = "";
        $this->NEFTRTGS->TooltipValue = "";

        // TotalTransferDepositAmount
        $this->TotalTransferDepositAmount->LinkCustomAttributes = "";
        $this->TotalTransferDepositAmount->HrefValue = "";
        $this->TotalTransferDepositAmount->TooltipValue = "";

        // CreatedBy
        $this->CreatedBy->LinkCustomAttributes = "";
        $this->CreatedBy->HrefValue = "";
        $this->CreatedBy->TooltipValue = "";

        // CreatedDateTime
        $this->CreatedDateTime->LinkCustomAttributes = "";
        $this->CreatedDateTime->HrefValue = "";
        $this->CreatedDateTime->TooltipValue = "";

        // ModifiedBy
        $this->ModifiedBy->LinkCustomAttributes = "";
        $this->ModifiedBy->HrefValue = "";
        $this->ModifiedBy->TooltipValue = "";

        // ModifiedDateTime
        $this->ModifiedDateTime->LinkCustomAttributes = "";
        $this->ModifiedDateTime->HrefValue = "";
        $this->ModifiedDateTime->TooltipValue = "";

        // CreatedUserName
        $this->CreatedUserName->LinkCustomAttributes = "";
        $this->CreatedUserName->HrefValue = "";
        $this->CreatedUserName->TooltipValue = "";

        // ModifiedUserName
        $this->ModifiedUserName->LinkCustomAttributes = "";
        $this->ModifiedUserName->HrefValue = "";
        $this->ModifiedUserName->TooltipValue = "";

        // BalanceAmount
        $this->BalanceAmount->LinkCustomAttributes = "";
        $this->BalanceAmount->HrefValue = "";
        $this->BalanceAmount->TooltipValue = "";

        // CashCollected
        $this->CashCollected->LinkCustomAttributes = "";
        $this->CashCollected->HrefValue = "";
        $this->CashCollected->TooltipValue = "";

        // RTGS
        $this->RTGS->LinkCustomAttributes = "";
        $this->RTGS->HrefValue = "";
        $this->RTGS->TooltipValue = "";

        // PAYTM
        $this->PAYTM->LinkCustomAttributes = "";
        $this->PAYTM->HrefValue = "";
        $this->PAYTM->TooltipValue = "";

        // HospID
        $this->HospID->LinkCustomAttributes = "";
        $this->HospID->HrefValue = "";
        $this->HospID->TooltipValue = "";

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

        // DepositDate
        $this->DepositDate->EditAttrs["class"] = "form-control";
        $this->DepositDate->EditCustomAttributes = "";
        $this->DepositDate->EditValue = FormatDateTime($this->DepositDate->CurrentValue, 8);
        $this->DepositDate->PlaceHolder = RemoveHtml($this->DepositDate->caption());

        // DepositToBankSelect
        $this->DepositToBankSelect->EditAttrs["class"] = "form-control";
        $this->DepositToBankSelect->EditCustomAttributes = "";
        if (!$this->DepositToBankSelect->Raw) {
            $this->DepositToBankSelect->CurrentValue = HtmlDecode($this->DepositToBankSelect->CurrentValue);
        }
        $this->DepositToBankSelect->EditValue = $this->DepositToBankSelect->CurrentValue;
        $this->DepositToBankSelect->PlaceHolder = RemoveHtml($this->DepositToBankSelect->caption());

        // DepositToBank
        $this->DepositToBank->EditAttrs["class"] = "form-control";
        $this->DepositToBank->EditCustomAttributes = "";
        if (!$this->DepositToBank->Raw) {
            $this->DepositToBank->CurrentValue = HtmlDecode($this->DepositToBank->CurrentValue);
        }
        $this->DepositToBank->EditValue = $this->DepositToBank->CurrentValue;
        $this->DepositToBank->PlaceHolder = RemoveHtml($this->DepositToBank->caption());

        // TransferToSelect
        $this->TransferToSelect->EditAttrs["class"] = "form-control";
        $this->TransferToSelect->EditCustomAttributes = "";
        if (!$this->TransferToSelect->Raw) {
            $this->TransferToSelect->CurrentValue = HtmlDecode($this->TransferToSelect->CurrentValue);
        }
        $this->TransferToSelect->EditValue = $this->TransferToSelect->CurrentValue;
        $this->TransferToSelect->PlaceHolder = RemoveHtml($this->TransferToSelect->caption());

        // TransferTo
        $this->TransferTo->EditAttrs["class"] = "form-control";
        $this->TransferTo->EditCustomAttributes = "";
        if (!$this->TransferTo->Raw) {
            $this->TransferTo->CurrentValue = HtmlDecode($this->TransferTo->CurrentValue);
        }
        $this->TransferTo->EditValue = $this->TransferTo->CurrentValue;
        $this->TransferTo->PlaceHolder = RemoveHtml($this->TransferTo->caption());

        // OpeningBalance
        $this->OpeningBalance->EditAttrs["class"] = "form-control";
        $this->OpeningBalance->EditCustomAttributes = "";
        $this->OpeningBalance->EditValue = $this->OpeningBalance->CurrentValue;
        $this->OpeningBalance->PlaceHolder = RemoveHtml($this->OpeningBalance->caption());
        if (strval($this->OpeningBalance->EditValue) != "" && is_numeric($this->OpeningBalance->EditValue)) {
            $this->OpeningBalance->EditValue = FormatNumber($this->OpeningBalance->EditValue, -2, -2, -2, -2);
        }

        // A2000Count
        $this->A2000Count->EditAttrs["class"] = "form-control";
        $this->A2000Count->EditCustomAttributes = "";
        $this->A2000Count->EditValue = $this->A2000Count->CurrentValue;
        $this->A2000Count->PlaceHolder = RemoveHtml($this->A2000Count->caption());

        // A2000Amount
        $this->A2000Amount->EditAttrs["class"] = "form-control";
        $this->A2000Amount->EditCustomAttributes = "";
        $this->A2000Amount->EditValue = $this->A2000Amount->CurrentValue;
        $this->A2000Amount->PlaceHolder = RemoveHtml($this->A2000Amount->caption());
        if (strval($this->A2000Amount->EditValue) != "" && is_numeric($this->A2000Amount->EditValue)) {
            $this->A2000Amount->EditValue = FormatNumber($this->A2000Amount->EditValue, -2, -2, -2, -2);
        }

        // A1000Count
        $this->A1000Count->EditAttrs["class"] = "form-control";
        $this->A1000Count->EditCustomAttributes = "";
        $this->A1000Count->EditValue = $this->A1000Count->CurrentValue;
        $this->A1000Count->PlaceHolder = RemoveHtml($this->A1000Count->caption());

        // A1000Amount
        $this->A1000Amount->EditAttrs["class"] = "form-control";
        $this->A1000Amount->EditCustomAttributes = "";
        $this->A1000Amount->EditValue = $this->A1000Amount->CurrentValue;
        $this->A1000Amount->PlaceHolder = RemoveHtml($this->A1000Amount->caption());
        if (strval($this->A1000Amount->EditValue) != "" && is_numeric($this->A1000Amount->EditValue)) {
            $this->A1000Amount->EditValue = FormatNumber($this->A1000Amount->EditValue, -2, -2, -2, -2);
        }

        // A500Count
        $this->A500Count->EditAttrs["class"] = "form-control";
        $this->A500Count->EditCustomAttributes = "";
        $this->A500Count->EditValue = $this->A500Count->CurrentValue;
        $this->A500Count->PlaceHolder = RemoveHtml($this->A500Count->caption());

        // A500Amount
        $this->A500Amount->EditAttrs["class"] = "form-control";
        $this->A500Amount->EditCustomAttributes = "";
        $this->A500Amount->EditValue = $this->A500Amount->CurrentValue;
        $this->A500Amount->PlaceHolder = RemoveHtml($this->A500Amount->caption());
        if (strval($this->A500Amount->EditValue) != "" && is_numeric($this->A500Amount->EditValue)) {
            $this->A500Amount->EditValue = FormatNumber($this->A500Amount->EditValue, -2, -2, -2, -2);
        }

        // A200Count
        $this->A200Count->EditAttrs["class"] = "form-control";
        $this->A200Count->EditCustomAttributes = "";
        $this->A200Count->EditValue = $this->A200Count->CurrentValue;
        $this->A200Count->PlaceHolder = RemoveHtml($this->A200Count->caption());

        // A200Amount
        $this->A200Amount->EditAttrs["class"] = "form-control";
        $this->A200Amount->EditCustomAttributes = "";
        $this->A200Amount->EditValue = $this->A200Amount->CurrentValue;
        $this->A200Amount->PlaceHolder = RemoveHtml($this->A200Amount->caption());
        if (strval($this->A200Amount->EditValue) != "" && is_numeric($this->A200Amount->EditValue)) {
            $this->A200Amount->EditValue = FormatNumber($this->A200Amount->EditValue, -2, -2, -2, -2);
        }

        // A100Count
        $this->A100Count->EditAttrs["class"] = "form-control";
        $this->A100Count->EditCustomAttributes = "";
        $this->A100Count->EditValue = $this->A100Count->CurrentValue;
        $this->A100Count->PlaceHolder = RemoveHtml($this->A100Count->caption());

        // A100Amount
        $this->A100Amount->EditAttrs["class"] = "form-control";
        $this->A100Amount->EditCustomAttributes = "";
        $this->A100Amount->EditValue = $this->A100Amount->CurrentValue;
        $this->A100Amount->PlaceHolder = RemoveHtml($this->A100Amount->caption());
        if (strval($this->A100Amount->EditValue) != "" && is_numeric($this->A100Amount->EditValue)) {
            $this->A100Amount->EditValue = FormatNumber($this->A100Amount->EditValue, -2, -2, -2, -2);
        }

        // A50Count
        $this->A50Count->EditAttrs["class"] = "form-control";
        $this->A50Count->EditCustomAttributes = "";
        $this->A50Count->EditValue = $this->A50Count->CurrentValue;
        $this->A50Count->PlaceHolder = RemoveHtml($this->A50Count->caption());

        // A50Amount
        $this->A50Amount->EditAttrs["class"] = "form-control";
        $this->A50Amount->EditCustomAttributes = "";
        $this->A50Amount->EditValue = $this->A50Amount->CurrentValue;
        $this->A50Amount->PlaceHolder = RemoveHtml($this->A50Amount->caption());
        if (strval($this->A50Amount->EditValue) != "" && is_numeric($this->A50Amount->EditValue)) {
            $this->A50Amount->EditValue = FormatNumber($this->A50Amount->EditValue, -2, -2, -2, -2);
        }

        // A20Count
        $this->A20Count->EditAttrs["class"] = "form-control";
        $this->A20Count->EditCustomAttributes = "";
        $this->A20Count->EditValue = $this->A20Count->CurrentValue;
        $this->A20Count->PlaceHolder = RemoveHtml($this->A20Count->caption());

        // A20Amount
        $this->A20Amount->EditAttrs["class"] = "form-control";
        $this->A20Amount->EditCustomAttributes = "";
        $this->A20Amount->EditValue = $this->A20Amount->CurrentValue;
        $this->A20Amount->PlaceHolder = RemoveHtml($this->A20Amount->caption());
        if (strval($this->A20Amount->EditValue) != "" && is_numeric($this->A20Amount->EditValue)) {
            $this->A20Amount->EditValue = FormatNumber($this->A20Amount->EditValue, -2, -2, -2, -2);
        }

        // A10Count
        $this->A10Count->EditAttrs["class"] = "form-control";
        $this->A10Count->EditCustomAttributes = "";
        $this->A10Count->EditValue = $this->A10Count->CurrentValue;
        $this->A10Count->PlaceHolder = RemoveHtml($this->A10Count->caption());

        // A10Amount
        $this->A10Amount->EditAttrs["class"] = "form-control";
        $this->A10Amount->EditCustomAttributes = "";
        $this->A10Amount->EditValue = $this->A10Amount->CurrentValue;
        $this->A10Amount->PlaceHolder = RemoveHtml($this->A10Amount->caption());
        if (strval($this->A10Amount->EditValue) != "" && is_numeric($this->A10Amount->EditValue)) {
            $this->A10Amount->EditValue = FormatNumber($this->A10Amount->EditValue, -2, -2, -2, -2);
        }

        // Other
        $this->Other->EditAttrs["class"] = "form-control";
        $this->Other->EditCustomAttributes = "";
        $this->Other->EditValue = $this->Other->CurrentValue;
        $this->Other->PlaceHolder = RemoveHtml($this->Other->caption());
        if (strval($this->Other->EditValue) != "" && is_numeric($this->Other->EditValue)) {
            $this->Other->EditValue = FormatNumber($this->Other->EditValue, -2, -2, -2, -2);
        }

        // TotalCash
        $this->TotalCash->EditAttrs["class"] = "form-control";
        $this->TotalCash->EditCustomAttributes = "";
        $this->TotalCash->EditValue = $this->TotalCash->CurrentValue;
        $this->TotalCash->PlaceHolder = RemoveHtml($this->TotalCash->caption());
        if (strval($this->TotalCash->EditValue) != "" && is_numeric($this->TotalCash->EditValue)) {
            $this->TotalCash->EditValue = FormatNumber($this->TotalCash->EditValue, -2, -2, -2, -2);
        }

        // Cheque
        $this->Cheque->EditAttrs["class"] = "form-control";
        $this->Cheque->EditCustomAttributes = "";
        $this->Cheque->EditValue = $this->Cheque->CurrentValue;
        $this->Cheque->PlaceHolder = RemoveHtml($this->Cheque->caption());
        if (strval($this->Cheque->EditValue) != "" && is_numeric($this->Cheque->EditValue)) {
            $this->Cheque->EditValue = FormatNumber($this->Cheque->EditValue, -2, -2, -2, -2);
        }

        // Card
        $this->Card->EditAttrs["class"] = "form-control";
        $this->Card->EditCustomAttributes = "";
        $this->Card->EditValue = $this->Card->CurrentValue;
        $this->Card->PlaceHolder = RemoveHtml($this->Card->caption());
        if (strval($this->Card->EditValue) != "" && is_numeric($this->Card->EditValue)) {
            $this->Card->EditValue = FormatNumber($this->Card->EditValue, -2, -2, -2, -2);
        }

        // NEFTRTGS
        $this->NEFTRTGS->EditAttrs["class"] = "form-control";
        $this->NEFTRTGS->EditCustomAttributes = "";
        $this->NEFTRTGS->EditValue = $this->NEFTRTGS->CurrentValue;
        $this->NEFTRTGS->PlaceHolder = RemoveHtml($this->NEFTRTGS->caption());
        if (strval($this->NEFTRTGS->EditValue) != "" && is_numeric($this->NEFTRTGS->EditValue)) {
            $this->NEFTRTGS->EditValue = FormatNumber($this->NEFTRTGS->EditValue, -2, -2, -2, -2);
        }

        // TotalTransferDepositAmount
        $this->TotalTransferDepositAmount->EditAttrs["class"] = "form-control";
        $this->TotalTransferDepositAmount->EditCustomAttributes = "";
        $this->TotalTransferDepositAmount->EditValue = $this->TotalTransferDepositAmount->CurrentValue;
        $this->TotalTransferDepositAmount->PlaceHolder = RemoveHtml($this->TotalTransferDepositAmount->caption());
        if (strval($this->TotalTransferDepositAmount->EditValue) != "" && is_numeric($this->TotalTransferDepositAmount->EditValue)) {
            $this->TotalTransferDepositAmount->EditValue = FormatNumber($this->TotalTransferDepositAmount->EditValue, -2, -2, -2, -2);
        }

        // CreatedBy
        $this->CreatedBy->EditAttrs["class"] = "form-control";
        $this->CreatedBy->EditCustomAttributes = "";
        $this->CreatedBy->EditValue = $this->CreatedBy->CurrentValue;
        $this->CreatedBy->PlaceHolder = RemoveHtml($this->CreatedBy->caption());

        // CreatedDateTime
        $this->CreatedDateTime->EditAttrs["class"] = "form-control";
        $this->CreatedDateTime->EditCustomAttributes = "";
        $this->CreatedDateTime->EditValue = FormatDateTime($this->CreatedDateTime->CurrentValue, 8);
        $this->CreatedDateTime->PlaceHolder = RemoveHtml($this->CreatedDateTime->caption());

        // ModifiedBy
        $this->ModifiedBy->EditAttrs["class"] = "form-control";
        $this->ModifiedBy->EditCustomAttributes = "";
        $this->ModifiedBy->EditValue = $this->ModifiedBy->CurrentValue;
        $this->ModifiedBy->PlaceHolder = RemoveHtml($this->ModifiedBy->caption());

        // ModifiedDateTime
        $this->ModifiedDateTime->EditAttrs["class"] = "form-control";
        $this->ModifiedDateTime->EditCustomAttributes = "";
        $this->ModifiedDateTime->EditValue = FormatDateTime($this->ModifiedDateTime->CurrentValue, 8);
        $this->ModifiedDateTime->PlaceHolder = RemoveHtml($this->ModifiedDateTime->caption());

        // CreatedUserName
        $this->CreatedUserName->EditAttrs["class"] = "form-control";
        $this->CreatedUserName->EditCustomAttributes = "";
        if (!$this->CreatedUserName->Raw) {
            $this->CreatedUserName->CurrentValue = HtmlDecode($this->CreatedUserName->CurrentValue);
        }
        $this->CreatedUserName->EditValue = $this->CreatedUserName->CurrentValue;
        $this->CreatedUserName->PlaceHolder = RemoveHtml($this->CreatedUserName->caption());

        // ModifiedUserName
        $this->ModifiedUserName->EditAttrs["class"] = "form-control";
        $this->ModifiedUserName->EditCustomAttributes = "";
        if (!$this->ModifiedUserName->Raw) {
            $this->ModifiedUserName->CurrentValue = HtmlDecode($this->ModifiedUserName->CurrentValue);
        }
        $this->ModifiedUserName->EditValue = $this->ModifiedUserName->CurrentValue;
        $this->ModifiedUserName->PlaceHolder = RemoveHtml($this->ModifiedUserName->caption());

        // BalanceAmount
        $this->BalanceAmount->EditAttrs["class"] = "form-control";
        $this->BalanceAmount->EditCustomAttributes = "";
        $this->BalanceAmount->EditValue = $this->BalanceAmount->CurrentValue;
        $this->BalanceAmount->PlaceHolder = RemoveHtml($this->BalanceAmount->caption());
        if (strval($this->BalanceAmount->EditValue) != "" && is_numeric($this->BalanceAmount->EditValue)) {
            $this->BalanceAmount->EditValue = FormatNumber($this->BalanceAmount->EditValue, -2, -2, -2, -2);
        }

        // CashCollected
        $this->CashCollected->EditAttrs["class"] = "form-control";
        $this->CashCollected->EditCustomAttributes = "";
        $this->CashCollected->EditValue = $this->CashCollected->CurrentValue;
        $this->CashCollected->PlaceHolder = RemoveHtml($this->CashCollected->caption());
        if (strval($this->CashCollected->EditValue) != "" && is_numeric($this->CashCollected->EditValue)) {
            $this->CashCollected->EditValue = FormatNumber($this->CashCollected->EditValue, -2, -2, -2, -2);
        }

        // RTGS
        $this->RTGS->EditAttrs["class"] = "form-control";
        $this->RTGS->EditCustomAttributes = "";
        $this->RTGS->EditValue = $this->RTGS->CurrentValue;
        $this->RTGS->PlaceHolder = RemoveHtml($this->RTGS->caption());
        if (strval($this->RTGS->EditValue) != "" && is_numeric($this->RTGS->EditValue)) {
            $this->RTGS->EditValue = FormatNumber($this->RTGS->EditValue, -2, -2, -2, -2);
        }

        // PAYTM
        $this->PAYTM->EditAttrs["class"] = "form-control";
        $this->PAYTM->EditCustomAttributes = "";
        $this->PAYTM->EditValue = $this->PAYTM->CurrentValue;
        $this->PAYTM->PlaceHolder = RemoveHtml($this->PAYTM->caption());
        if (strval($this->PAYTM->EditValue) != "" && is_numeric($this->PAYTM->EditValue)) {
            $this->PAYTM->EditValue = FormatNumber($this->PAYTM->EditValue, -2, -2, -2, -2);
        }

        // HospID
        $this->HospID->EditAttrs["class"] = "form-control";
        $this->HospID->EditCustomAttributes = "";
        $this->HospID->EditValue = $this->HospID->CurrentValue;
        $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

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
                    $doc->exportCaption($this->DepositDate);
                    $doc->exportCaption($this->DepositToBankSelect);
                    $doc->exportCaption($this->DepositToBank);
                    $doc->exportCaption($this->TransferToSelect);
                    $doc->exportCaption($this->TransferTo);
                    $doc->exportCaption($this->OpeningBalance);
                    $doc->exportCaption($this->A2000Count);
                    $doc->exportCaption($this->A2000Amount);
                    $doc->exportCaption($this->A1000Count);
                    $doc->exportCaption($this->A1000Amount);
                    $doc->exportCaption($this->A500Count);
                    $doc->exportCaption($this->A500Amount);
                    $doc->exportCaption($this->A200Count);
                    $doc->exportCaption($this->A200Amount);
                    $doc->exportCaption($this->A100Count);
                    $doc->exportCaption($this->A100Amount);
                    $doc->exportCaption($this->A50Count);
                    $doc->exportCaption($this->A50Amount);
                    $doc->exportCaption($this->A20Count);
                    $doc->exportCaption($this->A20Amount);
                    $doc->exportCaption($this->A10Count);
                    $doc->exportCaption($this->A10Amount);
                    $doc->exportCaption($this->Other);
                    $doc->exportCaption($this->TotalCash);
                    $doc->exportCaption($this->Cheque);
                    $doc->exportCaption($this->Card);
                    $doc->exportCaption($this->NEFTRTGS);
                    $doc->exportCaption($this->TotalTransferDepositAmount);
                    $doc->exportCaption($this->CreatedBy);
                    $doc->exportCaption($this->CreatedDateTime);
                    $doc->exportCaption($this->ModifiedBy);
                    $doc->exportCaption($this->ModifiedDateTime);
                    $doc->exportCaption($this->CreatedUserName);
                    $doc->exportCaption($this->ModifiedUserName);
                    $doc->exportCaption($this->BalanceAmount);
                    $doc->exportCaption($this->CashCollected);
                    $doc->exportCaption($this->RTGS);
                    $doc->exportCaption($this->PAYTM);
                    $doc->exportCaption($this->HospID);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->DepositDate);
                    $doc->exportCaption($this->DepositToBankSelect);
                    $doc->exportCaption($this->DepositToBank);
                    $doc->exportCaption($this->TransferToSelect);
                    $doc->exportCaption($this->TransferTo);
                    $doc->exportCaption($this->OpeningBalance);
                    $doc->exportCaption($this->A2000Count);
                    $doc->exportCaption($this->A2000Amount);
                    $doc->exportCaption($this->A1000Count);
                    $doc->exportCaption($this->A1000Amount);
                    $doc->exportCaption($this->A500Count);
                    $doc->exportCaption($this->A500Amount);
                    $doc->exportCaption($this->A200Count);
                    $doc->exportCaption($this->A200Amount);
                    $doc->exportCaption($this->A100Count);
                    $doc->exportCaption($this->A100Amount);
                    $doc->exportCaption($this->A50Count);
                    $doc->exportCaption($this->A50Amount);
                    $doc->exportCaption($this->A20Count);
                    $doc->exportCaption($this->A20Amount);
                    $doc->exportCaption($this->A10Count);
                    $doc->exportCaption($this->A10Amount);
                    $doc->exportCaption($this->Other);
                    $doc->exportCaption($this->TotalCash);
                    $doc->exportCaption($this->Cheque);
                    $doc->exportCaption($this->Card);
                    $doc->exportCaption($this->NEFTRTGS);
                    $doc->exportCaption($this->TotalTransferDepositAmount);
                    $doc->exportCaption($this->CreatedBy);
                    $doc->exportCaption($this->CreatedDateTime);
                    $doc->exportCaption($this->ModifiedBy);
                    $doc->exportCaption($this->ModifiedDateTime);
                    $doc->exportCaption($this->CreatedUserName);
                    $doc->exportCaption($this->ModifiedUserName);
                    $doc->exportCaption($this->BalanceAmount);
                    $doc->exportCaption($this->CashCollected);
                    $doc->exportCaption($this->RTGS);
                    $doc->exportCaption($this->PAYTM);
                    $doc->exportCaption($this->HospID);
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
                        $doc->exportField($this->DepositDate);
                        $doc->exportField($this->DepositToBankSelect);
                        $doc->exportField($this->DepositToBank);
                        $doc->exportField($this->TransferToSelect);
                        $doc->exportField($this->TransferTo);
                        $doc->exportField($this->OpeningBalance);
                        $doc->exportField($this->A2000Count);
                        $doc->exportField($this->A2000Amount);
                        $doc->exportField($this->A1000Count);
                        $doc->exportField($this->A1000Amount);
                        $doc->exportField($this->A500Count);
                        $doc->exportField($this->A500Amount);
                        $doc->exportField($this->A200Count);
                        $doc->exportField($this->A200Amount);
                        $doc->exportField($this->A100Count);
                        $doc->exportField($this->A100Amount);
                        $doc->exportField($this->A50Count);
                        $doc->exportField($this->A50Amount);
                        $doc->exportField($this->A20Count);
                        $doc->exportField($this->A20Amount);
                        $doc->exportField($this->A10Count);
                        $doc->exportField($this->A10Amount);
                        $doc->exportField($this->Other);
                        $doc->exportField($this->TotalCash);
                        $doc->exportField($this->Cheque);
                        $doc->exportField($this->Card);
                        $doc->exportField($this->NEFTRTGS);
                        $doc->exportField($this->TotalTransferDepositAmount);
                        $doc->exportField($this->CreatedBy);
                        $doc->exportField($this->CreatedDateTime);
                        $doc->exportField($this->ModifiedBy);
                        $doc->exportField($this->ModifiedDateTime);
                        $doc->exportField($this->CreatedUserName);
                        $doc->exportField($this->ModifiedUserName);
                        $doc->exportField($this->BalanceAmount);
                        $doc->exportField($this->CashCollected);
                        $doc->exportField($this->RTGS);
                        $doc->exportField($this->PAYTM);
                        $doc->exportField($this->HospID);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->DepositDate);
                        $doc->exportField($this->DepositToBankSelect);
                        $doc->exportField($this->DepositToBank);
                        $doc->exportField($this->TransferToSelect);
                        $doc->exportField($this->TransferTo);
                        $doc->exportField($this->OpeningBalance);
                        $doc->exportField($this->A2000Count);
                        $doc->exportField($this->A2000Amount);
                        $doc->exportField($this->A1000Count);
                        $doc->exportField($this->A1000Amount);
                        $doc->exportField($this->A500Count);
                        $doc->exportField($this->A500Amount);
                        $doc->exportField($this->A200Count);
                        $doc->exportField($this->A200Amount);
                        $doc->exportField($this->A100Count);
                        $doc->exportField($this->A100Amount);
                        $doc->exportField($this->A50Count);
                        $doc->exportField($this->A50Amount);
                        $doc->exportField($this->A20Count);
                        $doc->exportField($this->A20Amount);
                        $doc->exportField($this->A10Count);
                        $doc->exportField($this->A10Amount);
                        $doc->exportField($this->Other);
                        $doc->exportField($this->TotalCash);
                        $doc->exportField($this->Cheque);
                        $doc->exportField($this->Card);
                        $doc->exportField($this->NEFTRTGS);
                        $doc->exportField($this->TotalTransferDepositAmount);
                        $doc->exportField($this->CreatedBy);
                        $doc->exportField($this->CreatedDateTime);
                        $doc->exportField($this->ModifiedBy);
                        $doc->exportField($this->ModifiedDateTime);
                        $doc->exportField($this->CreatedUserName);
                        $doc->exportField($this->ModifiedUserName);
                        $doc->exportField($this->BalanceAmount);
                        $doc->exportField($this->CashCollected);
                        $doc->exportField($this->RTGS);
                        $doc->exportField($this->PAYTM);
                        $doc->exportField($this->HospID);
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
