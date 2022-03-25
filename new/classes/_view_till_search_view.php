<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for view_till_search_view
 */
class _view_till_search_view extends DbTable
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
	public $DepositDate;
	public $DepositToBankSelect;
	public $DepositToBank;
	public $CreatedUserName;
	public $TransferToSelect;
	public $TransferTo;
	public $OpeningBalance;
	public $CashCollected;
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
	public $TotalCash;
	public $Cheque;
	public $Card;
	public $RTGS;
	public $NEFTRTGS;
	public $PAYTM;
	public $Other;
	public $TotalTransferDepositAmount;
	public $CreatedBy;
	public $CreatedDateTime;
	public $ModifiedBy;
	public $ModifiedDateTime;
	public $ModifiedUserName;
	public $BalanceAmount;
	public $HospID;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = '_view_till_search_view';
		$this->TableName = 'view_till_search_view';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`view_till_search_view`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_DEFAULT; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = FALSE; // Allow detail add
		$this->DetailEdit = FALSE; // Allow detail edit
		$this->DetailView = FALSE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = Config("DEFAULT_USER_ID_ALLOW_SECURITY"); // Default User ID allowed permissions
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// id
		$this->id = new DbField('_view_till_search_view', 'view_till_search_view', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// DepositDate
		$this->DepositDate = new DbField('_view_till_search_view', 'view_till_search_view', 'x_DepositDate', 'DepositDate', '`DepositDate`', CastDateFieldForLike("`DepositDate`", 7, "DB"), 135, 19, 7, FALSE, '`DepositDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DepositDate->Sortable = TRUE; // Allow sort
		$this->DepositDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['DepositDate'] = &$this->DepositDate;

		// DepositToBankSelect
		$this->DepositToBankSelect = new DbField('_view_till_search_view', 'view_till_search_view', 'x_DepositToBankSelect', 'DepositToBankSelect', '`DepositToBankSelect`', '`DepositToBankSelect`', 200, 45, -1, FALSE, '`DepositToBankSelect`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DepositToBankSelect->Sortable = TRUE; // Allow sort
		$this->fields['DepositToBankSelect'] = &$this->DepositToBankSelect;

		// DepositToBank
		$this->DepositToBank = new DbField('_view_till_search_view', 'view_till_search_view', 'x_DepositToBank', 'DepositToBank', '`DepositToBank`', '`DepositToBank`', 200, 45, -1, FALSE, '`DepositToBank`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DepositToBank->Sortable = TRUE; // Allow sort
		$this->fields['DepositToBank'] = &$this->DepositToBank;

		// CreatedUserName
		$this->CreatedUserName = new DbField('_view_till_search_view', 'view_till_search_view', 'x_CreatedUserName', 'CreatedUserName', '`CreatedUserName`', '`CreatedUserName`', 200, 45, -1, FALSE, '`CreatedUserName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CreatedUserName->Sortable = TRUE; // Allow sort
		$this->fields['CreatedUserName'] = &$this->CreatedUserName;

		// TransferToSelect
		$this->TransferToSelect = new DbField('_view_till_search_view', 'view_till_search_view', 'x_TransferToSelect', 'TransferToSelect', '`TransferToSelect`', '`TransferToSelect`', 200, 45, -1, FALSE, '`TransferToSelect`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TransferToSelect->Sortable = TRUE; // Allow sort
		$this->fields['TransferToSelect'] = &$this->TransferToSelect;

		// TransferTo
		$this->TransferTo = new DbField('_view_till_search_view', 'view_till_search_view', 'x_TransferTo', 'TransferTo', '`TransferTo`', '`TransferTo`', 200, 45, -1, FALSE, '`TransferTo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TransferTo->Sortable = TRUE; // Allow sort
		$this->fields['TransferTo'] = &$this->TransferTo;

		// OpeningBalance
		$this->OpeningBalance = new DbField('_view_till_search_view', 'view_till_search_view', 'x_OpeningBalance', 'OpeningBalance', '`OpeningBalance`', '`OpeningBalance`', 131, 10, -1, FALSE, '`OpeningBalance`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OpeningBalance->Sortable = TRUE; // Allow sort
		$this->OpeningBalance->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['OpeningBalance'] = &$this->OpeningBalance;

		// CashCollected
		$this->CashCollected = new DbField('_view_till_search_view', 'view_till_search_view', 'x_CashCollected', 'CashCollected', '`CashCollected`', '`CashCollected`', 131, 10, -1, FALSE, '`CashCollected`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CashCollected->Sortable = TRUE; // Allow sort
		$this->CashCollected->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['CashCollected'] = &$this->CashCollected;

		// A2000Count
		$this->A2000Count = new DbField('_view_till_search_view', 'view_till_search_view', 'x_A2000Count', 'A2000Count', '`A2000Count`', '`A2000Count`', 3, 11, -1, FALSE, '`A2000Count`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->A2000Count->Sortable = TRUE; // Allow sort
		$this->A2000Count->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['A2000Count'] = &$this->A2000Count;

		// A2000Amount
		$this->A2000Amount = new DbField('_view_till_search_view', 'view_till_search_view', 'x_A2000Amount', 'A2000Amount', '`A2000Amount`', '`A2000Amount`', 131, 10, -1, FALSE, '`A2000Amount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->A2000Amount->Sortable = TRUE; // Allow sort
		$this->A2000Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['A2000Amount'] = &$this->A2000Amount;

		// A1000Count
		$this->A1000Count = new DbField('_view_till_search_view', 'view_till_search_view', 'x_A1000Count', 'A1000Count', '`A1000Count`', '`A1000Count`', 3, 11, -1, FALSE, '`A1000Count`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->A1000Count->Sortable = TRUE; // Allow sort
		$this->A1000Count->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['A1000Count'] = &$this->A1000Count;

		// A1000Amount
		$this->A1000Amount = new DbField('_view_till_search_view', 'view_till_search_view', 'x_A1000Amount', 'A1000Amount', '`A1000Amount`', '`A1000Amount`', 131, 10, -1, FALSE, '`A1000Amount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->A1000Amount->Sortable = TRUE; // Allow sort
		$this->A1000Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['A1000Amount'] = &$this->A1000Amount;

		// A500Count
		$this->A500Count = new DbField('_view_till_search_view', 'view_till_search_view', 'x_A500Count', 'A500Count', '`A500Count`', '`A500Count`', 3, 11, -1, FALSE, '`A500Count`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->A500Count->Sortable = TRUE; // Allow sort
		$this->A500Count->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['A500Count'] = &$this->A500Count;

		// A500Amount
		$this->A500Amount = new DbField('_view_till_search_view', 'view_till_search_view', 'x_A500Amount', 'A500Amount', '`A500Amount`', '`A500Amount`', 131, 10, -1, FALSE, '`A500Amount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->A500Amount->Sortable = TRUE; // Allow sort
		$this->A500Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['A500Amount'] = &$this->A500Amount;

		// A200Count
		$this->A200Count = new DbField('_view_till_search_view', 'view_till_search_view', 'x_A200Count', 'A200Count', '`A200Count`', '`A200Count`', 3, 11, -1, FALSE, '`A200Count`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->A200Count->Sortable = TRUE; // Allow sort
		$this->A200Count->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['A200Count'] = &$this->A200Count;

		// A200Amount
		$this->A200Amount = new DbField('_view_till_search_view', 'view_till_search_view', 'x_A200Amount', 'A200Amount', '`A200Amount`', '`A200Amount`', 131, 10, -1, FALSE, '`A200Amount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->A200Amount->Sortable = TRUE; // Allow sort
		$this->A200Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['A200Amount'] = &$this->A200Amount;

		// A100Count
		$this->A100Count = new DbField('_view_till_search_view', 'view_till_search_view', 'x_A100Count', 'A100Count', '`A100Count`', '`A100Count`', 3, 11, -1, FALSE, '`A100Count`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->A100Count->Sortable = TRUE; // Allow sort
		$this->A100Count->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['A100Count'] = &$this->A100Count;

		// A100Amount
		$this->A100Amount = new DbField('_view_till_search_view', 'view_till_search_view', 'x_A100Amount', 'A100Amount', '`A100Amount`', '`A100Amount`', 131, 10, -1, FALSE, '`A100Amount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->A100Amount->Sortable = TRUE; // Allow sort
		$this->A100Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['A100Amount'] = &$this->A100Amount;

		// A50Count
		$this->A50Count = new DbField('_view_till_search_view', 'view_till_search_view', 'x_A50Count', 'A50Count', '`A50Count`', '`A50Count`', 3, 11, -1, FALSE, '`A50Count`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->A50Count->Sortable = TRUE; // Allow sort
		$this->A50Count->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['A50Count'] = &$this->A50Count;

		// A50Amount
		$this->A50Amount = new DbField('_view_till_search_view', 'view_till_search_view', 'x_A50Amount', 'A50Amount', '`A50Amount`', '`A50Amount`', 131, 10, -1, FALSE, '`A50Amount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->A50Amount->Sortable = TRUE; // Allow sort
		$this->A50Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['A50Amount'] = &$this->A50Amount;

		// A20Count
		$this->A20Count = new DbField('_view_till_search_view', 'view_till_search_view', 'x_A20Count', 'A20Count', '`A20Count`', '`A20Count`', 3, 11, -1, FALSE, '`A20Count`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->A20Count->Sortable = TRUE; // Allow sort
		$this->A20Count->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['A20Count'] = &$this->A20Count;

		// A20Amount
		$this->A20Amount = new DbField('_view_till_search_view', 'view_till_search_view', 'x_A20Amount', 'A20Amount', '`A20Amount`', '`A20Amount`', 131, 10, -1, FALSE, '`A20Amount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->A20Amount->Sortable = TRUE; // Allow sort
		$this->A20Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['A20Amount'] = &$this->A20Amount;

		// A10Count
		$this->A10Count = new DbField('_view_till_search_view', 'view_till_search_view', 'x_A10Count', 'A10Count', '`A10Count`', '`A10Count`', 3, 11, -1, FALSE, '`A10Count`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->A10Count->Sortable = TRUE; // Allow sort
		$this->A10Count->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['A10Count'] = &$this->A10Count;

		// A10Amount
		$this->A10Amount = new DbField('_view_till_search_view', 'view_till_search_view', 'x_A10Amount', 'A10Amount', '`A10Amount`', '`A10Amount`', 131, 10, -1, FALSE, '`A10Amount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->A10Amount->Sortable = TRUE; // Allow sort
		$this->A10Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['A10Amount'] = &$this->A10Amount;

		// TotalCash
		$this->TotalCash = new DbField('_view_till_search_view', 'view_till_search_view', 'x_TotalCash', 'TotalCash', '`TotalCash`', '`TotalCash`', 131, 10, -1, FALSE, '`TotalCash`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TotalCash->Sortable = TRUE; // Allow sort
		$this->TotalCash->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['TotalCash'] = &$this->TotalCash;

		// Cheque
		$this->Cheque = new DbField('_view_till_search_view', 'view_till_search_view', 'x_Cheque', 'Cheque', '`Cheque`', '`Cheque`', 131, 10, -1, FALSE, '`Cheque`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Cheque->Sortable = TRUE; // Allow sort
		$this->Cheque->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Cheque'] = &$this->Cheque;

		// Card
		$this->Card = new DbField('_view_till_search_view', 'view_till_search_view', 'x_Card', 'Card', '`Card`', '`Card`', 131, 10, -1, FALSE, '`Card`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Card->Sortable = TRUE; // Allow sort
		$this->Card->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Card'] = &$this->Card;

		// RTGS
		$this->RTGS = new DbField('_view_till_search_view', 'view_till_search_view', 'x_RTGS', 'RTGS', '`RTGS`', '`RTGS`', 131, 10, -1, FALSE, '`RTGS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RTGS->Sortable = TRUE; // Allow sort
		$this->RTGS->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['RTGS'] = &$this->RTGS;

		// NEFTRTGS
		$this->NEFTRTGS = new DbField('_view_till_search_view', 'view_till_search_view', 'x_NEFTRTGS', 'NEFTRTGS', '`NEFTRTGS`', '`NEFTRTGS`', 131, 10, -1, FALSE, '`NEFTRTGS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NEFTRTGS->Sortable = TRUE; // Allow sort
		$this->NEFTRTGS->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['NEFTRTGS'] = &$this->NEFTRTGS;

		// PAYTM
		$this->PAYTM = new DbField('_view_till_search_view', 'view_till_search_view', 'x_PAYTM', 'PAYTM', '`PAYTM`', '`PAYTM`', 131, 10, -1, FALSE, '`PAYTM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PAYTM->Sortable = TRUE; // Allow sort
		$this->PAYTM->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PAYTM'] = &$this->PAYTM;

		// Other
		$this->Other = new DbField('_view_till_search_view', 'view_till_search_view', 'x_Other', 'Other', '`Other`', '`Other`', 131, 10, -1, FALSE, '`Other`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Other->Sortable = TRUE; // Allow sort
		$this->Other->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Other'] = &$this->Other;

		// TotalTransferDepositAmount
		$this->TotalTransferDepositAmount = new DbField('_view_till_search_view', 'view_till_search_view', 'x_TotalTransferDepositAmount', 'TotalTransferDepositAmount', '`TotalTransferDepositAmount`', '`TotalTransferDepositAmount`', 131, 10, -1, FALSE, '`TotalTransferDepositAmount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TotalTransferDepositAmount->Sortable = TRUE; // Allow sort
		$this->TotalTransferDepositAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['TotalTransferDepositAmount'] = &$this->TotalTransferDepositAmount;

		// CreatedBy
		$this->CreatedBy = new DbField('_view_till_search_view', 'view_till_search_view', 'x_CreatedBy', 'CreatedBy', '`CreatedBy`', '`CreatedBy`', 3, 11, -1, FALSE, '`CreatedBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CreatedBy->Sortable = TRUE; // Allow sort
		$this->CreatedBy->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['CreatedBy'] = &$this->CreatedBy;

		// CreatedDateTime
		$this->CreatedDateTime = new DbField('_view_till_search_view', 'view_till_search_view', 'x_CreatedDateTime', 'CreatedDateTime', '`CreatedDateTime`', CastDateFieldForLike("`CreatedDateTime`", 0, "DB"), 135, 19, 0, FALSE, '`CreatedDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CreatedDateTime->Sortable = TRUE; // Allow sort
		$this->CreatedDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['CreatedDateTime'] = &$this->CreatedDateTime;

		// ModifiedBy
		$this->ModifiedBy = new DbField('_view_till_search_view', 'view_till_search_view', 'x_ModifiedBy', 'ModifiedBy', '`ModifiedBy`', '`ModifiedBy`', 3, 11, -1, FALSE, '`ModifiedBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ModifiedBy->Sortable = TRUE; // Allow sort
		$this->ModifiedBy->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['ModifiedBy'] = &$this->ModifiedBy;

		// ModifiedDateTime
		$this->ModifiedDateTime = new DbField('_view_till_search_view', 'view_till_search_view', 'x_ModifiedDateTime', 'ModifiedDateTime', '`ModifiedDateTime`', CastDateFieldForLike("`ModifiedDateTime`", 0, "DB"), 135, 19, 0, FALSE, '`ModifiedDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ModifiedDateTime->Sortable = TRUE; // Allow sort
		$this->ModifiedDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['ModifiedDateTime'] = &$this->ModifiedDateTime;

		// ModifiedUserName
		$this->ModifiedUserName = new DbField('_view_till_search_view', 'view_till_search_view', 'x_ModifiedUserName', 'ModifiedUserName', '`ModifiedUserName`', '`ModifiedUserName`', 200, 45, -1, FALSE, '`ModifiedUserName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ModifiedUserName->Sortable = TRUE; // Allow sort
		$this->fields['ModifiedUserName'] = &$this->ModifiedUserName;

		// BalanceAmount
		$this->BalanceAmount = new DbField('_view_till_search_view', 'view_till_search_view', 'x_BalanceAmount', 'BalanceAmount', '`BalanceAmount`', '`BalanceAmount`', 131, 10, -1, FALSE, '`BalanceAmount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BalanceAmount->Sortable = TRUE; // Allow sort
		$this->BalanceAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['BalanceAmount'] = &$this->BalanceAmount;

		// HospID
		$this->HospID = new DbField('_view_till_search_view', 'view_till_search_view', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HospID'] = &$this->HospID;
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
		return ($this->SqlSelect != "") ? $this->SqlSelect : "SELECT * FROM " . $this->getSqlFrom();
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
		return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : "`id` DESC";
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
	public function applyUserIDFilters($filter, $id = "")
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
			case "changepwd":
			case "forgotpwd":
				return (($allow & 4) == 4);
			case "delete":
				return (($allow & 2) == 2);
			case "view":
				return (($allow & 32) == 32);
			case "search":
				return (($allow & 64) == 64);
			case "lookup":
				return (($allow & 256) == 256);
			default:
				return (($allow & 8) == 8);
		}
	}

	// Get recordset
	public function getRecordset($sql, $rowcnt = -1, $offset = -1)
	{
		$conn = $this->getConnection();
		$conn->raiseErrorFn = Config("ERROR_FUNC");
		$rs = $conn->selectLimit($sql, $rowcnt, $offset);
		$conn->raiseErrorFn = "";
		return $rs;
	}

	// Get record count
	public function getRecordCount($sql, $c = NULL)
	{
		$cnt = -1;
		$rs = NULL;
		$sql = preg_replace('/\/\*BeginOrderBy\*\/[\s\S]+\/\*EndOrderBy\*\//', "", $sql); // Remove ORDER BY clause (MSSQL)
		$pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';

		// Skip Custom View / SubQuery / SELECT DISTINCT / ORDER BY
		if (($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
			preg_match($pattern, $sql) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sql) &&
			!preg_match('/^\s*select\s+distinct\s+/i', $sql) && !preg_match('/\s+order\s+by\s+/i', $sql)) {
			$sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sql);
		} else {
			$sqlwrk = "SELECT COUNT(*) FROM (" . $sql . ") COUNT_TABLE";
		}
		$conn = $c ?: $this->getConnection();
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
		return "INSERT INTO " . $this->UpdateTable . " (" . $names . ") VALUES (" . $values . ")";
	}

	// Insert
	public function insert(&$rs)
	{
		$conn = $this->getConnection();
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
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom || $this->fields[$name]->IsAutoIncrement)
				continue;
			$sql .= $this->fields[$name]->Expression . "=";
			$sql .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$sql = preg_replace('/,+$/', "", $sql);
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		AddFilter($filter, $where);
		if ($filter != "")
			$sql .= " WHERE " . $filter;
		return $sql;
	}

	// Update
	public function update(&$rs, $where = "", $rsold = NULL, $curfilter = TRUE)
	{
		$conn = $this->getConnection();
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
		if ($filter != "")
			$sql .= $filter;
		else
			$sql .= "0=1"; // Avoid delete
		return $sql;
	}

	// Delete
	public function delete(&$rs, $where = "", $curfilter = FALSE)
	{
		$success = TRUE;
		$conn = $this->getConnection();
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
		$this->DepositDate->DbValue = $row['DepositDate'];
		$this->DepositToBankSelect->DbValue = $row['DepositToBankSelect'];
		$this->DepositToBank->DbValue = $row['DepositToBank'];
		$this->CreatedUserName->DbValue = $row['CreatedUserName'];
		$this->TransferToSelect->DbValue = $row['TransferToSelect'];
		$this->TransferTo->DbValue = $row['TransferTo'];
		$this->OpeningBalance->DbValue = $row['OpeningBalance'];
		$this->CashCollected->DbValue = $row['CashCollected'];
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
		$this->TotalCash->DbValue = $row['TotalCash'];
		$this->Cheque->DbValue = $row['Cheque'];
		$this->Card->DbValue = $row['Card'];
		$this->RTGS->DbValue = $row['RTGS'];
		$this->NEFTRTGS->DbValue = $row['NEFTRTGS'];
		$this->PAYTM->DbValue = $row['PAYTM'];
		$this->Other->DbValue = $row['Other'];
		$this->TotalTransferDepositAmount->DbValue = $row['TotalTransferDepositAmount'];
		$this->CreatedBy->DbValue = $row['CreatedBy'];
		$this->CreatedDateTime->DbValue = $row['CreatedDateTime'];
		$this->ModifiedBy->DbValue = $row['ModifiedBy'];
		$this->ModifiedDateTime->DbValue = $row['ModifiedDateTime'];
		$this->ModifiedUserName->DbValue = $row['ModifiedUserName'];
		$this->BalanceAmount->DbValue = $row['BalanceAmount'];
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
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('id', $row) ? $row['id'] : NULL;
		else
			$val = $this->id->OldValue !== NULL ? $this->id->OldValue : $this->id->CurrentValue;
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
		$name = PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL");

		// Get referer URL automatically
		if (ServerVar("HTTP_REFERER") != "" && ReferPageName() != CurrentPageName() && ReferPageName() != "login.php") // Referer not same page or login page
			$_SESSION[$name] = ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] != "") {
			return $_SESSION[$name];
		} else {
			return "_view_till_search_viewlist.php";
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
		if ($pageName == "_view_till_search_viewview.php")
			return $Language->phrase("View");
		elseif ($pageName == "_view_till_search_viewedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "_view_till_search_viewadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "_view_till_search_viewlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("_view_till_search_viewview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("_view_till_search_viewview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "_view_till_search_viewadd.php?" . $this->getUrlParm($parm);
		else
			$url = "_view_till_search_viewadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("_view_till_search_viewedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("_view_till_search_viewadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("_view_till_search_viewdelete.php", $this->getUrlParm());
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
		if ($parm != "")
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
			in_array($fld->Type, [128, 204, 205])) { // Unsortable data type
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
		$arKeys = [];
		$arKey = [];
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
		$ar = [];
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
	public function getFilterFromRecordKeys($setCurrent = TRUE)
	{
		$arKeys = $this->getRecordKeys();
		$keyFilter = "";
		foreach ($arKeys as $key) {
			if ($keyFilter != "") $keyFilter .= " OR ";
			if ($setCurrent)
				$this->id->CurrentValue = $key;
			else
				$this->id->OldValue = $key;
			$keyFilter .= "(" . $this->getRecordFilter() . ")";
		}
		return $keyFilter;
	}

	// Load rows based on filter
	public function &loadRs($filter)
	{

		// Set up filter (WHERE Clause)
		$sql = $this->getSql($filter);
		$conn = $this->getConnection();
		$rs = $conn->execute($sql);
		return $rs;
	}

	// Load row values from recordset
	public function loadListRowValues(&$rs)
	{
		$this->id->setDbValue($rs->fields('id'));
		$this->DepositDate->setDbValue($rs->fields('DepositDate'));
		$this->DepositToBankSelect->setDbValue($rs->fields('DepositToBankSelect'));
		$this->DepositToBank->setDbValue($rs->fields('DepositToBank'));
		$this->CreatedUserName->setDbValue($rs->fields('CreatedUserName'));
		$this->TransferToSelect->setDbValue($rs->fields('TransferToSelect'));
		$this->TransferTo->setDbValue($rs->fields('TransferTo'));
		$this->OpeningBalance->setDbValue($rs->fields('OpeningBalance'));
		$this->CashCollected->setDbValue($rs->fields('CashCollected'));
		$this->A2000Count->setDbValue($rs->fields('A2000Count'));
		$this->A2000Amount->setDbValue($rs->fields('A2000Amount'));
		$this->A1000Count->setDbValue($rs->fields('A1000Count'));
		$this->A1000Amount->setDbValue($rs->fields('A1000Amount'));
		$this->A500Count->setDbValue($rs->fields('A500Count'));
		$this->A500Amount->setDbValue($rs->fields('A500Amount'));
		$this->A200Count->setDbValue($rs->fields('A200Count'));
		$this->A200Amount->setDbValue($rs->fields('A200Amount'));
		$this->A100Count->setDbValue($rs->fields('A100Count'));
		$this->A100Amount->setDbValue($rs->fields('A100Amount'));
		$this->A50Count->setDbValue($rs->fields('A50Count'));
		$this->A50Amount->setDbValue($rs->fields('A50Amount'));
		$this->A20Count->setDbValue($rs->fields('A20Count'));
		$this->A20Amount->setDbValue($rs->fields('A20Amount'));
		$this->A10Count->setDbValue($rs->fields('A10Count'));
		$this->A10Amount->setDbValue($rs->fields('A10Amount'));
		$this->TotalCash->setDbValue($rs->fields('TotalCash'));
		$this->Cheque->setDbValue($rs->fields('Cheque'));
		$this->Card->setDbValue($rs->fields('Card'));
		$this->RTGS->setDbValue($rs->fields('RTGS'));
		$this->NEFTRTGS->setDbValue($rs->fields('NEFTRTGS'));
		$this->PAYTM->setDbValue($rs->fields('PAYTM'));
		$this->Other->setDbValue($rs->fields('Other'));
		$this->TotalTransferDepositAmount->setDbValue($rs->fields('TotalTransferDepositAmount'));
		$this->CreatedBy->setDbValue($rs->fields('CreatedBy'));
		$this->CreatedDateTime->setDbValue($rs->fields('CreatedDateTime'));
		$this->ModifiedBy->setDbValue($rs->fields('ModifiedBy'));
		$this->ModifiedDateTime->setDbValue($rs->fields('ModifiedDateTime'));
		$this->ModifiedUserName->setDbValue($rs->fields('ModifiedUserName'));
		$this->BalanceAmount->setDbValue($rs->fields('BalanceAmount'));
		$this->HospID->setDbValue($rs->fields('HospID'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// DepositDate
		// DepositToBankSelect
		// DepositToBank
		// CreatedUserName
		// TransferToSelect
		// TransferTo
		// OpeningBalance
		// CashCollected
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
		// TotalCash
		// Cheque
		// Card
		// RTGS
		// NEFTRTGS
		// PAYTM
		// Other
		// TotalTransferDepositAmount
		// CreatedBy
		// CreatedDateTime
		// ModifiedBy
		// ModifiedDateTime
		// ModifiedUserName
		// BalanceAmount
		// HospID
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// DepositDate
		$this->DepositDate->ViewValue = $this->DepositDate->CurrentValue;
		$this->DepositDate->ViewValue = FormatDateTime($this->DepositDate->ViewValue, 7);
		$this->DepositDate->ViewCustomAttributes = "";

		// DepositToBankSelect
		$this->DepositToBankSelect->ViewValue = $this->DepositToBankSelect->CurrentValue;
		$this->DepositToBankSelect->ViewCustomAttributes = "";

		// DepositToBank
		$this->DepositToBank->ViewValue = $this->DepositToBank->CurrentValue;
		$this->DepositToBank->ViewCustomAttributes = "";

		// CreatedUserName
		$this->CreatedUserName->ViewValue = $this->CreatedUserName->CurrentValue;
		$this->CreatedUserName->ViewCustomAttributes = "";

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

		// CashCollected
		$this->CashCollected->ViewValue = $this->CashCollected->CurrentValue;
		$this->CashCollected->ViewValue = FormatNumber($this->CashCollected->ViewValue, 2, -2, -2, -2);
		$this->CashCollected->ViewCustomAttributes = "";

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

		// RTGS
		$this->RTGS->ViewValue = $this->RTGS->CurrentValue;
		$this->RTGS->ViewValue = FormatNumber($this->RTGS->ViewValue, 2, -2, -2, -2);
		$this->RTGS->ViewCustomAttributes = "";

		// NEFTRTGS
		$this->NEFTRTGS->ViewValue = $this->NEFTRTGS->CurrentValue;
		$this->NEFTRTGS->ViewValue = FormatNumber($this->NEFTRTGS->ViewValue, 2, -2, -2, -2);
		$this->NEFTRTGS->ViewCustomAttributes = "";

		// PAYTM
		$this->PAYTM->ViewValue = $this->PAYTM->CurrentValue;
		$this->PAYTM->ViewValue = FormatNumber($this->PAYTM->ViewValue, 2, -2, -2, -2);
		$this->PAYTM->ViewCustomAttributes = "";

		// Other
		$this->Other->ViewValue = $this->Other->CurrentValue;
		$this->Other->ViewValue = FormatNumber($this->Other->ViewValue, 2, -2, -2, -2);
		$this->Other->ViewCustomAttributes = "";

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

		// ModifiedUserName
		$this->ModifiedUserName->ViewValue = $this->ModifiedUserName->CurrentValue;
		$this->ModifiedUserName->ViewCustomAttributes = "";

		// BalanceAmount
		$this->BalanceAmount->ViewValue = $this->BalanceAmount->CurrentValue;
		$this->BalanceAmount->ViewValue = FormatNumber($this->BalanceAmount->ViewValue, 2, -2, -2, -2);
		$this->BalanceAmount->ViewCustomAttributes = "";

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

		// CreatedUserName
		$this->CreatedUserName->LinkCustomAttributes = "";
		$this->CreatedUserName->HrefValue = "";
		$this->CreatedUserName->TooltipValue = "";

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

		// CashCollected
		$this->CashCollected->LinkCustomAttributes = "";
		$this->CashCollected->HrefValue = "";
		$this->CashCollected->TooltipValue = "";

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

		// RTGS
		$this->RTGS->LinkCustomAttributes = "";
		$this->RTGS->HrefValue = "";
		$this->RTGS->TooltipValue = "";

		// NEFTRTGS
		$this->NEFTRTGS->LinkCustomAttributes = "";
		$this->NEFTRTGS->HrefValue = "";
		$this->NEFTRTGS->TooltipValue = "";

		// PAYTM
		$this->PAYTM->LinkCustomAttributes = "";
		$this->PAYTM->HrefValue = "";
		$this->PAYTM->TooltipValue = "";

		// Other
		$this->Other->LinkCustomAttributes = "";
		$this->Other->HrefValue = "";
		$this->Other->TooltipValue = "";

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

		// ModifiedUserName
		$this->ModifiedUserName->LinkCustomAttributes = "";
		$this->ModifiedUserName->HrefValue = "";
		$this->ModifiedUserName->TooltipValue = "";

		// BalanceAmount
		$this->BalanceAmount->LinkCustomAttributes = "";
		$this->BalanceAmount->HrefValue = "";
		$this->BalanceAmount->TooltipValue = "";

		// HospID
		$this->HospID->LinkCustomAttributes = "";
		$this->HospID->HrefValue = "";
		$this->HospID->TooltipValue = "";

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

		// DepositDate
		$this->DepositDate->EditAttrs["class"] = "form-control";
		$this->DepositDate->EditCustomAttributes = "";
		$this->DepositDate->EditValue = FormatDateTime($this->DepositDate->CurrentValue, 7);
		$this->DepositDate->PlaceHolder = RemoveHtml($this->DepositDate->caption());

		// DepositToBankSelect
		$this->DepositToBankSelect->EditAttrs["class"] = "form-control";
		$this->DepositToBankSelect->EditCustomAttributes = "";
		if (!$this->DepositToBankSelect->Raw)
			$this->DepositToBankSelect->CurrentValue = HtmlDecode($this->DepositToBankSelect->CurrentValue);
		$this->DepositToBankSelect->EditValue = $this->DepositToBankSelect->CurrentValue;
		$this->DepositToBankSelect->PlaceHolder = RemoveHtml($this->DepositToBankSelect->caption());

		// DepositToBank
		$this->DepositToBank->EditAttrs["class"] = "form-control";
		$this->DepositToBank->EditCustomAttributes = "";
		if (!$this->DepositToBank->Raw)
			$this->DepositToBank->CurrentValue = HtmlDecode($this->DepositToBank->CurrentValue);
		$this->DepositToBank->EditValue = $this->DepositToBank->CurrentValue;
		$this->DepositToBank->PlaceHolder = RemoveHtml($this->DepositToBank->caption());

		// CreatedUserName
		$this->CreatedUserName->EditAttrs["class"] = "form-control";
		$this->CreatedUserName->EditCustomAttributes = "";
		if (!$this->CreatedUserName->Raw)
			$this->CreatedUserName->CurrentValue = HtmlDecode($this->CreatedUserName->CurrentValue);
		$this->CreatedUserName->EditValue = $this->CreatedUserName->CurrentValue;
		$this->CreatedUserName->PlaceHolder = RemoveHtml($this->CreatedUserName->caption());

		// TransferToSelect
		$this->TransferToSelect->EditAttrs["class"] = "form-control";
		$this->TransferToSelect->EditCustomAttributes = "";
		if (!$this->TransferToSelect->Raw)
			$this->TransferToSelect->CurrentValue = HtmlDecode($this->TransferToSelect->CurrentValue);
		$this->TransferToSelect->EditValue = $this->TransferToSelect->CurrentValue;
		$this->TransferToSelect->PlaceHolder = RemoveHtml($this->TransferToSelect->caption());

		// TransferTo
		$this->TransferTo->EditAttrs["class"] = "form-control";
		$this->TransferTo->EditCustomAttributes = "";
		if (!$this->TransferTo->Raw)
			$this->TransferTo->CurrentValue = HtmlDecode($this->TransferTo->CurrentValue);
		$this->TransferTo->EditValue = $this->TransferTo->CurrentValue;
		$this->TransferTo->PlaceHolder = RemoveHtml($this->TransferTo->caption());

		// OpeningBalance
		$this->OpeningBalance->EditAttrs["class"] = "form-control";
		$this->OpeningBalance->EditCustomAttributes = "";
		$this->OpeningBalance->EditValue = $this->OpeningBalance->CurrentValue;
		$this->OpeningBalance->PlaceHolder = RemoveHtml($this->OpeningBalance->caption());
		if (strval($this->OpeningBalance->EditValue) != "" && is_numeric($this->OpeningBalance->EditValue))
			$this->OpeningBalance->EditValue = FormatNumber($this->OpeningBalance->EditValue, -2, -2, -2, -2);
		

		// CashCollected
		$this->CashCollected->EditAttrs["class"] = "form-control";
		$this->CashCollected->EditCustomAttributes = "";
		$this->CashCollected->EditValue = $this->CashCollected->CurrentValue;
		$this->CashCollected->PlaceHolder = RemoveHtml($this->CashCollected->caption());
		if (strval($this->CashCollected->EditValue) != "" && is_numeric($this->CashCollected->EditValue))
			$this->CashCollected->EditValue = FormatNumber($this->CashCollected->EditValue, -2, -2, -2, -2);
		

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
		if (strval($this->A2000Amount->EditValue) != "" && is_numeric($this->A2000Amount->EditValue))
			$this->A2000Amount->EditValue = FormatNumber($this->A2000Amount->EditValue, -2, -2, -2, -2);
		

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
		if (strval($this->A1000Amount->EditValue) != "" && is_numeric($this->A1000Amount->EditValue))
			$this->A1000Amount->EditValue = FormatNumber($this->A1000Amount->EditValue, -2, -2, -2, -2);
		

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
		if (strval($this->A500Amount->EditValue) != "" && is_numeric($this->A500Amount->EditValue))
			$this->A500Amount->EditValue = FormatNumber($this->A500Amount->EditValue, -2, -2, -2, -2);
		

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
		if (strval($this->A200Amount->EditValue) != "" && is_numeric($this->A200Amount->EditValue))
			$this->A200Amount->EditValue = FormatNumber($this->A200Amount->EditValue, -2, -2, -2, -2);
		

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
		if (strval($this->A100Amount->EditValue) != "" && is_numeric($this->A100Amount->EditValue))
			$this->A100Amount->EditValue = FormatNumber($this->A100Amount->EditValue, -2, -2, -2, -2);
		

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
		if (strval($this->A50Amount->EditValue) != "" && is_numeric($this->A50Amount->EditValue))
			$this->A50Amount->EditValue = FormatNumber($this->A50Amount->EditValue, -2, -2, -2, -2);
		

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
		if (strval($this->A20Amount->EditValue) != "" && is_numeric($this->A20Amount->EditValue))
			$this->A20Amount->EditValue = FormatNumber($this->A20Amount->EditValue, -2, -2, -2, -2);
		

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
		if (strval($this->A10Amount->EditValue) != "" && is_numeric($this->A10Amount->EditValue))
			$this->A10Amount->EditValue = FormatNumber($this->A10Amount->EditValue, -2, -2, -2, -2);
		

		// TotalCash
		$this->TotalCash->EditAttrs["class"] = "form-control";
		$this->TotalCash->EditCustomAttributes = "";
		$this->TotalCash->EditValue = $this->TotalCash->CurrentValue;
		$this->TotalCash->PlaceHolder = RemoveHtml($this->TotalCash->caption());
		if (strval($this->TotalCash->EditValue) != "" && is_numeric($this->TotalCash->EditValue))
			$this->TotalCash->EditValue = FormatNumber($this->TotalCash->EditValue, -2, -2, -2, -2);
		

		// Cheque
		$this->Cheque->EditAttrs["class"] = "form-control";
		$this->Cheque->EditCustomAttributes = "";
		$this->Cheque->EditValue = $this->Cheque->CurrentValue;
		$this->Cheque->PlaceHolder = RemoveHtml($this->Cheque->caption());
		if (strval($this->Cheque->EditValue) != "" && is_numeric($this->Cheque->EditValue))
			$this->Cheque->EditValue = FormatNumber($this->Cheque->EditValue, -2, -2, -2, -2);
		

		// Card
		$this->Card->EditAttrs["class"] = "form-control";
		$this->Card->EditCustomAttributes = "";
		$this->Card->EditValue = $this->Card->CurrentValue;
		$this->Card->PlaceHolder = RemoveHtml($this->Card->caption());
		if (strval($this->Card->EditValue) != "" && is_numeric($this->Card->EditValue))
			$this->Card->EditValue = FormatNumber($this->Card->EditValue, -2, -2, -2, -2);
		

		// RTGS
		$this->RTGS->EditAttrs["class"] = "form-control";
		$this->RTGS->EditCustomAttributes = "";
		$this->RTGS->EditValue = $this->RTGS->CurrentValue;
		$this->RTGS->PlaceHolder = RemoveHtml($this->RTGS->caption());
		if (strval($this->RTGS->EditValue) != "" && is_numeric($this->RTGS->EditValue))
			$this->RTGS->EditValue = FormatNumber($this->RTGS->EditValue, -2, -2, -2, -2);
		

		// NEFTRTGS
		$this->NEFTRTGS->EditAttrs["class"] = "form-control";
		$this->NEFTRTGS->EditCustomAttributes = "";
		$this->NEFTRTGS->EditValue = $this->NEFTRTGS->CurrentValue;
		$this->NEFTRTGS->PlaceHolder = RemoveHtml($this->NEFTRTGS->caption());
		if (strval($this->NEFTRTGS->EditValue) != "" && is_numeric($this->NEFTRTGS->EditValue))
			$this->NEFTRTGS->EditValue = FormatNumber($this->NEFTRTGS->EditValue, -2, -2, -2, -2);
		

		// PAYTM
		$this->PAYTM->EditAttrs["class"] = "form-control";
		$this->PAYTM->EditCustomAttributes = "";
		$this->PAYTM->EditValue = $this->PAYTM->CurrentValue;
		$this->PAYTM->PlaceHolder = RemoveHtml($this->PAYTM->caption());
		if (strval($this->PAYTM->EditValue) != "" && is_numeric($this->PAYTM->EditValue))
			$this->PAYTM->EditValue = FormatNumber($this->PAYTM->EditValue, -2, -2, -2, -2);
		

		// Other
		$this->Other->EditAttrs["class"] = "form-control";
		$this->Other->EditCustomAttributes = "";
		$this->Other->EditValue = $this->Other->CurrentValue;
		$this->Other->PlaceHolder = RemoveHtml($this->Other->caption());
		if (strval($this->Other->EditValue) != "" && is_numeric($this->Other->EditValue))
			$this->Other->EditValue = FormatNumber($this->Other->EditValue, -2, -2, -2, -2);
		

		// TotalTransferDepositAmount
		$this->TotalTransferDepositAmount->EditAttrs["class"] = "form-control";
		$this->TotalTransferDepositAmount->EditCustomAttributes = "";
		$this->TotalTransferDepositAmount->EditValue = $this->TotalTransferDepositAmount->CurrentValue;
		$this->TotalTransferDepositAmount->PlaceHolder = RemoveHtml($this->TotalTransferDepositAmount->caption());
		if (strval($this->TotalTransferDepositAmount->EditValue) != "" && is_numeric($this->TotalTransferDepositAmount->EditValue))
			$this->TotalTransferDepositAmount->EditValue = FormatNumber($this->TotalTransferDepositAmount->EditValue, -2, -2, -2, -2);
		

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

		// ModifiedUserName
		$this->ModifiedUserName->EditAttrs["class"] = "form-control";
		$this->ModifiedUserName->EditCustomAttributes = "";
		if (!$this->ModifiedUserName->Raw)
			$this->ModifiedUserName->CurrentValue = HtmlDecode($this->ModifiedUserName->CurrentValue);
		$this->ModifiedUserName->EditValue = $this->ModifiedUserName->CurrentValue;
		$this->ModifiedUserName->PlaceHolder = RemoveHtml($this->ModifiedUserName->caption());

		// BalanceAmount
		$this->BalanceAmount->EditAttrs["class"] = "form-control";
		$this->BalanceAmount->EditCustomAttributes = "";
		$this->BalanceAmount->EditValue = $this->BalanceAmount->CurrentValue;
		$this->BalanceAmount->PlaceHolder = RemoveHtml($this->BalanceAmount->caption());
		if (strval($this->BalanceAmount->EditValue) != "" && is_numeric($this->BalanceAmount->EditValue))
			$this->BalanceAmount->EditValue = FormatNumber($this->BalanceAmount->EditValue, -2, -2, -2, -2);
		

		// HospID
		$this->HospID->EditAttrs["class"] = "form-control";
		$this->HospID->EditCustomAttributes = "";
		$this->HospID->EditValue = $this->HospID->CurrentValue;
		$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	public function aggregateListRowValues()
	{
			if (is_numeric($this->OpeningBalance->CurrentValue))
				$this->OpeningBalance->Total += $this->OpeningBalance->CurrentValue; // Accumulate total
			if (is_numeric($this->CashCollected->CurrentValue))
				$this->CashCollected->Total += $this->CashCollected->CurrentValue; // Accumulate total
			if (is_numeric($this->TotalCash->CurrentValue))
				$this->TotalCash->Total += $this->TotalCash->CurrentValue; // Accumulate total
			if (is_numeric($this->Cheque->CurrentValue))
				$this->Cheque->Total += $this->Cheque->CurrentValue; // Accumulate total
			if (is_numeric($this->Card->CurrentValue))
				$this->Card->Total += $this->Card->CurrentValue; // Accumulate total
			if (is_numeric($this->RTGS->CurrentValue))
				$this->RTGS->Total += $this->RTGS->CurrentValue; // Accumulate total
			if (is_numeric($this->NEFTRTGS->CurrentValue))
				$this->NEFTRTGS->Total += $this->NEFTRTGS->CurrentValue; // Accumulate total
			if (is_numeric($this->PAYTM->CurrentValue))
				$this->PAYTM->Total += $this->PAYTM->CurrentValue; // Accumulate total
			if (is_numeric($this->Other->CurrentValue))
				$this->Other->Total += $this->Other->CurrentValue; // Accumulate total
			if (is_numeric($this->BalanceAmount->CurrentValue))
				$this->BalanceAmount->Total += $this->BalanceAmount->CurrentValue; // Accumulate total
	}

	// Aggregate list row (for rendering)
	public function aggregateListRow()
	{
			$this->OpeningBalance->CurrentValue = $this->OpeningBalance->Total;
			$this->OpeningBalance->ViewValue = $this->OpeningBalance->CurrentValue;
			$this->OpeningBalance->ViewValue = FormatNumber($this->OpeningBalance->ViewValue, 2, -2, -2, -2);
			$this->OpeningBalance->ViewCustomAttributes = "";
			$this->OpeningBalance->HrefValue = ""; // Clear href value
			$this->CashCollected->CurrentValue = $this->CashCollected->Total;
			$this->CashCollected->ViewValue = $this->CashCollected->CurrentValue;
			$this->CashCollected->ViewValue = FormatNumber($this->CashCollected->ViewValue, 2, -2, -2, -2);
			$this->CashCollected->ViewCustomAttributes = "";
			$this->CashCollected->HrefValue = ""; // Clear href value
			$this->TotalCash->CurrentValue = $this->TotalCash->Total;
			$this->TotalCash->ViewValue = $this->TotalCash->CurrentValue;
			$this->TotalCash->ViewValue = FormatNumber($this->TotalCash->ViewValue, 2, -2, -2, -2);
			$this->TotalCash->ViewCustomAttributes = "";
			$this->TotalCash->HrefValue = ""; // Clear href value
			$this->Cheque->CurrentValue = $this->Cheque->Total;
			$this->Cheque->ViewValue = $this->Cheque->CurrentValue;
			$this->Cheque->ViewValue = FormatNumber($this->Cheque->ViewValue, 2, -2, -2, -2);
			$this->Cheque->ViewCustomAttributes = "";
			$this->Cheque->HrefValue = ""; // Clear href value
			$this->Card->CurrentValue = $this->Card->Total;
			$this->Card->ViewValue = $this->Card->CurrentValue;
			$this->Card->ViewValue = FormatNumber($this->Card->ViewValue, 2, -2, -2, -2);
			$this->Card->ViewCustomAttributes = "";
			$this->Card->HrefValue = ""; // Clear href value
			$this->RTGS->CurrentValue = $this->RTGS->Total;
			$this->RTGS->ViewValue = $this->RTGS->CurrentValue;
			$this->RTGS->ViewValue = FormatNumber($this->RTGS->ViewValue, 2, -2, -2, -2);
			$this->RTGS->ViewCustomAttributes = "";
			$this->RTGS->HrefValue = ""; // Clear href value
			$this->NEFTRTGS->CurrentValue = $this->NEFTRTGS->Total;
			$this->NEFTRTGS->ViewValue = $this->NEFTRTGS->CurrentValue;
			$this->NEFTRTGS->ViewValue = FormatNumber($this->NEFTRTGS->ViewValue, 2, -2, -2, -2);
			$this->NEFTRTGS->ViewCustomAttributes = "";
			$this->NEFTRTGS->HrefValue = ""; // Clear href value
			$this->PAYTM->CurrentValue = $this->PAYTM->Total;
			$this->PAYTM->ViewValue = $this->PAYTM->CurrentValue;
			$this->PAYTM->ViewValue = FormatNumber($this->PAYTM->ViewValue, 2, -2, -2, -2);
			$this->PAYTM->ViewCustomAttributes = "";
			$this->PAYTM->HrefValue = ""; // Clear href value
			$this->Other->CurrentValue = $this->Other->Total;
			$this->Other->ViewValue = $this->Other->CurrentValue;
			$this->Other->ViewValue = FormatNumber($this->Other->ViewValue, 2, -2, -2, -2);
			$this->Other->ViewCustomAttributes = "";
			$this->Other->HrefValue = ""; // Clear href value
			$this->BalanceAmount->CurrentValue = $this->BalanceAmount->Total;
			$this->BalanceAmount->ViewValue = $this->BalanceAmount->CurrentValue;
			$this->BalanceAmount->ViewValue = FormatNumber($this->BalanceAmount->ViewValue, 2, -2, -2, -2);
			$this->BalanceAmount->ViewCustomAttributes = "";
			$this->BalanceAmount->HrefValue = ""; // Clear href value

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
					$doc->exportCaption($this->DepositDate);
					$doc->exportCaption($this->DepositToBankSelect);
					$doc->exportCaption($this->DepositToBank);
					$doc->exportCaption($this->CreatedUserName);
					$doc->exportCaption($this->TransferToSelect);
					$doc->exportCaption($this->TransferTo);
					$doc->exportCaption($this->OpeningBalance);
					$doc->exportCaption($this->CashCollected);
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
					$doc->exportCaption($this->TotalCash);
					$doc->exportCaption($this->Cheque);
					$doc->exportCaption($this->Card);
					$doc->exportCaption($this->RTGS);
					$doc->exportCaption($this->NEFTRTGS);
					$doc->exportCaption($this->PAYTM);
					$doc->exportCaption($this->Other);
					$doc->exportCaption($this->TotalTransferDepositAmount);
					$doc->exportCaption($this->CreatedBy);
					$doc->exportCaption($this->CreatedDateTime);
					$doc->exportCaption($this->ModifiedBy);
					$doc->exportCaption($this->ModifiedDateTime);
					$doc->exportCaption($this->ModifiedUserName);
					$doc->exportCaption($this->BalanceAmount);
					$doc->exportCaption($this->HospID);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->DepositDate);
					$doc->exportCaption($this->DepositToBankSelect);
					$doc->exportCaption($this->DepositToBank);
					$doc->exportCaption($this->CreatedUserName);
					$doc->exportCaption($this->TransferToSelect);
					$doc->exportCaption($this->TransferTo);
					$doc->exportCaption($this->OpeningBalance);
					$doc->exportCaption($this->CashCollected);
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
					$doc->exportCaption($this->TotalCash);
					$doc->exportCaption($this->Cheque);
					$doc->exportCaption($this->Card);
					$doc->exportCaption($this->RTGS);
					$doc->exportCaption($this->NEFTRTGS);
					$doc->exportCaption($this->PAYTM);
					$doc->exportCaption($this->Other);
					$doc->exportCaption($this->TotalTransferDepositAmount);
					$doc->exportCaption($this->CreatedBy);
					$doc->exportCaption($this->CreatedDateTime);
					$doc->exportCaption($this->ModifiedBy);
					$doc->exportCaption($this->ModifiedDateTime);
					$doc->exportCaption($this->ModifiedUserName);
					$doc->exportCaption($this->BalanceAmount);
					$doc->exportCaption($this->HospID);
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
				$this->aggregateListRowValues(); // Aggregate row values

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
						$doc->exportField($this->CreatedUserName);
						$doc->exportField($this->TransferToSelect);
						$doc->exportField($this->TransferTo);
						$doc->exportField($this->OpeningBalance);
						$doc->exportField($this->CashCollected);
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
						$doc->exportField($this->TotalCash);
						$doc->exportField($this->Cheque);
						$doc->exportField($this->Card);
						$doc->exportField($this->RTGS);
						$doc->exportField($this->NEFTRTGS);
						$doc->exportField($this->PAYTM);
						$doc->exportField($this->Other);
						$doc->exportField($this->TotalTransferDepositAmount);
						$doc->exportField($this->CreatedBy);
						$doc->exportField($this->CreatedDateTime);
						$doc->exportField($this->ModifiedBy);
						$doc->exportField($this->ModifiedDateTime);
						$doc->exportField($this->ModifiedUserName);
						$doc->exportField($this->BalanceAmount);
						$doc->exportField($this->HospID);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->DepositDate);
						$doc->exportField($this->DepositToBankSelect);
						$doc->exportField($this->DepositToBank);
						$doc->exportField($this->CreatedUserName);
						$doc->exportField($this->TransferToSelect);
						$doc->exportField($this->TransferTo);
						$doc->exportField($this->OpeningBalance);
						$doc->exportField($this->CashCollected);
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
						$doc->exportField($this->TotalCash);
						$doc->exportField($this->Cheque);
						$doc->exportField($this->Card);
						$doc->exportField($this->RTGS);
						$doc->exportField($this->NEFTRTGS);
						$doc->exportField($this->PAYTM);
						$doc->exportField($this->Other);
						$doc->exportField($this->TotalTransferDepositAmount);
						$doc->exportField($this->CreatedBy);
						$doc->exportField($this->CreatedDateTime);
						$doc->exportField($this->ModifiedBy);
						$doc->exportField($this->ModifiedDateTime);
						$doc->exportField($this->ModifiedUserName);
						$doc->exportField($this->BalanceAmount);
						$doc->exportField($this->HospID);
					}
					$doc->endExportRow($rowCnt);
				}
			}

			// Call Row Export server event
			if ($doc->ExportCustom)
				$this->Row_Export($recordset->fields);
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
				$doc->exportAggregate($this->DepositDate, '');
				$doc->exportAggregate($this->DepositToBankSelect, '');
				$doc->exportAggregate($this->DepositToBank, '');
				$doc->exportAggregate($this->CreatedUserName, '');
				$doc->exportAggregate($this->TransferToSelect, '');
				$doc->exportAggregate($this->TransferTo, '');
				$doc->exportAggregate($this->OpeningBalance, 'TOTAL');
				$doc->exportAggregate($this->CashCollected, 'TOTAL');
				$doc->exportAggregate($this->A2000Count, '');
				$doc->exportAggregate($this->A2000Amount, '');
				$doc->exportAggregate($this->A1000Count, '');
				$doc->exportAggregate($this->A1000Amount, '');
				$doc->exportAggregate($this->A500Count, '');
				$doc->exportAggregate($this->A500Amount, '');
				$doc->exportAggregate($this->A200Count, '');
				$doc->exportAggregate($this->A200Amount, '');
				$doc->exportAggregate($this->A100Count, '');
				$doc->exportAggregate($this->A100Amount, '');
				$doc->exportAggregate($this->A50Count, '');
				$doc->exportAggregate($this->A50Amount, '');
				$doc->exportAggregate($this->A20Count, '');
				$doc->exportAggregate($this->A20Amount, '');
				$doc->exportAggregate($this->A10Count, '');
				$doc->exportAggregate($this->A10Amount, '');
				$doc->exportAggregate($this->TotalCash, 'TOTAL');
				$doc->exportAggregate($this->Cheque, 'TOTAL');
				$doc->exportAggregate($this->Card, 'TOTAL');
				$doc->exportAggregate($this->RTGS, 'TOTAL');
				$doc->exportAggregate($this->NEFTRTGS, 'TOTAL');
				$doc->exportAggregate($this->PAYTM, 'TOTAL');
				$doc->exportAggregate($this->Other, 'TOTAL');
				$doc->exportAggregate($this->TotalTransferDepositAmount, '');
				$doc->exportAggregate($this->CreatedBy, '');
				$doc->exportAggregate($this->CreatedDateTime, '');
				$doc->exportAggregate($this->ModifiedBy, '');
				$doc->exportAggregate($this->ModifiedDateTime, '');
				$doc->exportAggregate($this->ModifiedUserName, '');
				$doc->exportAggregate($this->BalanceAmount, 'TOTAL');
				$doc->exportAggregate($this->HospID, '');
				$doc->endExportRow();
			}
		}
		if (!$doc->ExportCustom) {
			$doc->exportTableFooter();
		}
	}

	// Get file data
	public function getFileData($fldparm, $key, $resize, $width = 0, $height = 0)
	{

		// No binary fields
		return FALSE;
	}

	// Table level events
	// Recordset Selecting event
	function Recordset_Selecting(&$filter) {

		// Enter your code here
			$a = &$filter;
		if (strpos($a, 'DepositDate') == false) {
			$datetime = date('Y-m-d', strtotime(' +1 day'));
			AddFilter($filter, "DepositDate between '".date('Y-m-d')." 00:00:00' and '".$datetime." 00:00:00' ");
		}
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