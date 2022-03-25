<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for store_payment
 */
class store_payment extends DbTable
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
	public $BranchID;
	public $StoreID;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'store_payment';
		$this->TableName = 'store_payment';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`store_payment`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = FALSE; // Allow detail add
		$this->DetailEdit = FALSE; // Allow detail edit
		$this->DetailView = FALSE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = 0; // User ID Allow
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// id
		$this->id = new DbField('store_payment', 'store_payment', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->IsForeignKey = TRUE; // Foreign key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// PAYNO
		$this->PAYNO = new DbField('store_payment', 'store_payment', 'x_PAYNO', 'PAYNO', '`PAYNO`', '`PAYNO`', 200, -1, FALSE, '`PAYNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PAYNO->Sortable = TRUE; // Allow sort
		$this->fields['PAYNO'] = &$this->PAYNO;

		// DT
		$this->DT = new DbField('store_payment', 'store_payment', 'x_DT', 'DT', '`DT`', CastDateFieldForLike('`DT`', 7, "DB"), 135, 7, FALSE, '`DT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DT->Required = TRUE; // Required field
		$this->DT->Sortable = TRUE; // Allow sort
		$this->DT->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['DT'] = &$this->DT;

		// YM
		$this->YM = new DbField('store_payment', 'store_payment', 'x_YM', 'YM', '`YM`', '`YM`', 200, -1, FALSE, '`YM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->YM->Sortable = TRUE; // Allow sort
		$this->fields['YM'] = &$this->YM;

		// PC
		$this->PC = new DbField('store_payment', 'store_payment', 'x_PC', 'PC', '`PC`', '`PC`', 200, -1, FALSE, '`PC`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PC->Sortable = TRUE; // Allow sort
		$this->fields['PC'] = &$this->PC;

		// Customercode
		$this->Customercode = new DbField('store_payment', 'store_payment', 'x_Customercode', 'Customercode', '`Customercode`', '`Customercode`', 200, -1, FALSE, '`Customercode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Customercode->Sortable = TRUE; // Allow sort
		$this->fields['Customercode'] = &$this->Customercode;

		// Customername
		$this->Customername = new DbField('store_payment', 'store_payment', 'x_Customername', 'Customername', '`Customername`', '`Customername`', 200, -1, FALSE, '`Customername`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Customername->Required = TRUE; // Required field
		$this->Customername->Sortable = TRUE; // Allow sort
		$this->Customername->SelectMultiple = TRUE; // Multiple select
		$this->Customername->Lookup = new Lookup('Customername', 'store_suppliers', FALSE, 'Suppliername', ["Suppliername","","",""], [], [], [], [], ["id","Suppliercode","Address1","Address2","Address3","State","Pincode","Phone","Fax","Email"], ["x_PC","x_Customercode","x_Address1","x_Address2","x_Address3","x_State","x_Pincode","x_Phone","x_Fax","x_EEmail"], '`Suppliername` ASC', '');
		$this->fields['Customername'] = &$this->Customername;

		// pharmacy_pocol
		$this->pharmacy_pocol = new DbField('store_payment', 'store_payment', 'x_pharmacy_pocol', 'pharmacy_pocol', '`pharmacy_pocol`', '`pharmacy_pocol`', 200, -1, FALSE, '`pharmacy_pocol`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->pharmacy_pocol->Required = TRUE; // Required field
		$this->pharmacy_pocol->Sortable = TRUE; // Allow sort
		$this->pharmacy_pocol->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->pharmacy_pocol->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->pharmacy_pocol->Lookup = new Lookup('pharmacy_pocol', 'hospital_store', FALSE, 'pharmacy', ["pharmacy","","",""], [], [], [], [], [], [], '', '');
		$this->fields['pharmacy_pocol'] = &$this->pharmacy_pocol;

		// Address1
		$this->Address1 = new DbField('store_payment', 'store_payment', 'x_Address1', 'Address1', '`Address1`', '`Address1`', 201, -1, FALSE, '`Address1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Address1->Sortable = TRUE; // Allow sort
		$this->fields['Address1'] = &$this->Address1;

		// Address2
		$this->Address2 = new DbField('store_payment', 'store_payment', 'x_Address2', 'Address2', '`Address2`', '`Address2`', 201, -1, FALSE, '`Address2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Address2->Sortable = TRUE; // Allow sort
		$this->fields['Address2'] = &$this->Address2;

		// Address3
		$this->Address3 = new DbField('store_payment', 'store_payment', 'x_Address3', 'Address3', '`Address3`', '`Address3`', 201, -1, FALSE, '`Address3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Address3->Sortable = TRUE; // Allow sort
		$this->fields['Address3'] = &$this->Address3;

		// State
		$this->State = new DbField('store_payment', 'store_payment', 'x_State', 'State', '`State`', '`State`', 200, -1, FALSE, '`State`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->State->Sortable = TRUE; // Allow sort
		$this->fields['State'] = &$this->State;

		// Pincode
		$this->Pincode = new DbField('store_payment', 'store_payment', 'x_Pincode', 'Pincode', '`Pincode`', '`Pincode`', 200, -1, FALSE, '`Pincode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Pincode->Sortable = TRUE; // Allow sort
		$this->fields['Pincode'] = &$this->Pincode;

		// Phone
		$this->Phone = new DbField('store_payment', 'store_payment', 'x_Phone', 'Phone', '`Phone`', '`Phone`', 200, -1, FALSE, '`Phone`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Phone->Sortable = TRUE; // Allow sort
		$this->fields['Phone'] = &$this->Phone;

		// Fax
		$this->Fax = new DbField('store_payment', 'store_payment', 'x_Fax', 'Fax', '`Fax`', '`Fax`', 200, -1, FALSE, '`Fax`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Fax->Sortable = TRUE; // Allow sort
		$this->fields['Fax'] = &$this->Fax;

		// EEmail
		$this->EEmail = new DbField('store_payment', 'store_payment', 'x_EEmail', 'EEmail', '`EEmail`', '`EEmail`', 200, -1, FALSE, '`EEmail`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->EEmail->Sortable = TRUE; // Allow sort
		$this->fields['EEmail'] = &$this->EEmail;

		// HospID
		$this->HospID = new DbField('store_payment', 'store_payment', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HospID'] = &$this->HospID;

		// createdby
		$this->createdby = new DbField('store_payment', 'store_payment', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 200, -1, FALSE, '`createdby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdby->Sortable = TRUE; // Allow sort
		$this->fields['createdby'] = &$this->createdby;

		// createddatetime
		$this->createddatetime = new DbField('store_payment', 'store_payment', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike('`createddatetime`', 0, "DB"), 135, 0, FALSE, '`createddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = TRUE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['createddatetime'] = &$this->createddatetime;

		// modifiedby
		$this->modifiedby = new DbField('store_payment', 'store_payment', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 200, -1, FALSE, '`modifiedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifiedby->Sortable = TRUE; // Allow sort
		$this->fields['modifiedby'] = &$this->modifiedby;

		// modifieddatetime
		$this->modifieddatetime = new DbField('store_payment', 'store_payment', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike('`modifieddatetime`', 0, "DB"), 135, 0, FALSE, '`modifieddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifieddatetime->Sortable = TRUE; // Allow sort
		$this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['modifieddatetime'] = &$this->modifieddatetime;

		// PharmacyID
		$this->PharmacyID = new DbField('store_payment', 'store_payment', 'x_PharmacyID', 'PharmacyID', '`PharmacyID`', '`PharmacyID`', 3, -1, FALSE, '`PharmacyID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PharmacyID->Sortable = TRUE; // Allow sort
		$this->PharmacyID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['PharmacyID'] = &$this->PharmacyID;

		// BillTotalValue
		$this->BillTotalValue = new DbField('store_payment', 'store_payment', 'x_BillTotalValue', 'BillTotalValue', '`BillTotalValue`', '`BillTotalValue`', 131, -1, FALSE, '`BillTotalValue`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BillTotalValue->Sortable = TRUE; // Allow sort
		$this->BillTotalValue->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['BillTotalValue'] = &$this->BillTotalValue;

		// GRNTotalValue
		$this->GRNTotalValue = new DbField('store_payment', 'store_payment', 'x_GRNTotalValue', 'GRNTotalValue', '`GRNTotalValue`', '`GRNTotalValue`', 131, -1, FALSE, '`GRNTotalValue`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->GRNTotalValue->Sortable = TRUE; // Allow sort
		$this->GRNTotalValue->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['GRNTotalValue'] = &$this->GRNTotalValue;

		// BillDiscount
		$this->BillDiscount = new DbField('store_payment', 'store_payment', 'x_BillDiscount', 'BillDiscount', '`BillDiscount`', '`BillDiscount`', 131, -1, FALSE, '`BillDiscount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BillDiscount->Sortable = TRUE; // Allow sort
		$this->BillDiscount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['BillDiscount'] = &$this->BillDiscount;

		// BillUpload
		$this->BillUpload = new DbField('store_payment', 'store_payment', 'x_BillUpload', 'BillUpload', '`BillUpload`', '`BillUpload`', 201, -1, FALSE, '`BillUpload`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->BillUpload->Sortable = TRUE; // Allow sort
		$this->fields['BillUpload'] = &$this->BillUpload;

		// TransPort
		$this->TransPort = new DbField('store_payment', 'store_payment', 'x_TransPort', 'TransPort', '`TransPort`', '`TransPort`', 131, -1, FALSE, '`TransPort`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TransPort->Sortable = TRUE; // Allow sort
		$this->TransPort->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['TransPort'] = &$this->TransPort;

		// AnyOther
		$this->AnyOther = new DbField('store_payment', 'store_payment', 'x_AnyOther', 'AnyOther', '`AnyOther`', '`AnyOther`', 131, -1, FALSE, '`AnyOther`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AnyOther->Sortable = TRUE; // Allow sort
		$this->AnyOther->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['AnyOther'] = &$this->AnyOther;

		// voucher_type
		$this->voucher_type = new DbField('store_payment', 'store_payment', 'x_voucher_type', 'voucher_type', '`voucher_type`', '`voucher_type`', 200, -1, FALSE, '`voucher_type`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->voucher_type->Sortable = TRUE; // Allow sort
		$this->fields['voucher_type'] = &$this->voucher_type;

		// Details
		$this->Details = new DbField('store_payment', 'store_payment', 'x_Details', 'Details', '`Details`', '`Details`', 200, -1, FALSE, '`Details`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Details->Sortable = TRUE; // Allow sort
		$this->fields['Details'] = &$this->Details;

		// ModeofPayment
		$this->ModeofPayment = new DbField('store_payment', 'store_payment', 'x_ModeofPayment', 'ModeofPayment', '`ModeofPayment`', '`ModeofPayment`', 200, -1, FALSE, '`ModeofPayment`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->ModeofPayment->Required = TRUE; // Required field
		$this->ModeofPayment->Sortable = TRUE; // Allow sort
		$this->ModeofPayment->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->ModeofPayment->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->ModeofPayment->Lookup = new Lookup('ModeofPayment', 'mas_modepayment', FALSE, 'Mode', ["Mode","","",""], [], [], [], [], [], [], '', '');
		$this->fields['ModeofPayment'] = &$this->ModeofPayment;

		// Amount
		$this->Amount = new DbField('store_payment', 'store_payment', 'x_Amount', 'Amount', '`Amount`', '`Amount`', 131, -1, FALSE, '`Amount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Amount->Required = TRUE; // Required field
		$this->Amount->Sortable = TRUE; // Allow sort
		$this->Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Amount'] = &$this->Amount;

		// BankName
		$this->BankName = new DbField('store_payment', 'store_payment', 'x_BankName', 'BankName', '`BankName`', '`BankName`', 200, -1, FALSE, '`BankName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BankName->Sortable = TRUE; // Allow sort
		$this->fields['BankName'] = &$this->BankName;

		// AccountNumber
		$this->AccountNumber = new DbField('store_payment', 'store_payment', 'x_AccountNumber', 'AccountNumber', '`AccountNumber`', '`AccountNumber`', 200, -1, FALSE, '`AccountNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AccountNumber->Sortable = TRUE; // Allow sort
		$this->fields['AccountNumber'] = &$this->AccountNumber;

		// chequeNumber
		$this->chequeNumber = new DbField('store_payment', 'store_payment', 'x_chequeNumber', 'chequeNumber', '`chequeNumber`', '`chequeNumber`', 200, -1, FALSE, '`chequeNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->chequeNumber->Sortable = TRUE; // Allow sort
		$this->fields['chequeNumber'] = &$this->chequeNumber;

		// Remarks
		$this->Remarks = new DbField('store_payment', 'store_payment', 'x_Remarks', 'Remarks', '`Remarks`', '`Remarks`', 201, -1, FALSE, '`Remarks`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Remarks->Sortable = TRUE; // Allow sort
		$this->fields['Remarks'] = &$this->Remarks;

		// SeectPaymentMode
		$this->SeectPaymentMode = new DbField('store_payment', 'store_payment', 'x_SeectPaymentMode', 'SeectPaymentMode', '`SeectPaymentMode`', '`SeectPaymentMode`', 200, -1, FALSE, '`SeectPaymentMode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SeectPaymentMode->Sortable = TRUE; // Allow sort
		$this->fields['SeectPaymentMode'] = &$this->SeectPaymentMode;

		// PaidAmount
		$this->PaidAmount = new DbField('store_payment', 'store_payment', 'x_PaidAmount', 'PaidAmount', '`PaidAmount`', '`PaidAmount`', 200, -1, FALSE, '`PaidAmount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PaidAmount->Sortable = TRUE; // Allow sort
		$this->fields['PaidAmount'] = &$this->PaidAmount;

		// Currency
		$this->Currency = new DbField('store_payment', 'store_payment', 'x_Currency', 'Currency', '`Currency`', '`Currency`', 200, -1, FALSE, '`Currency`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Currency->Sortable = TRUE; // Allow sort
		$this->fields['Currency'] = &$this->Currency;

		// CardNumber
		$this->CardNumber = new DbField('store_payment', 'store_payment', 'x_CardNumber', 'CardNumber', '`CardNumber`', '`CardNumber`', 200, -1, FALSE, '`CardNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CardNumber->Sortable = TRUE; // Allow sort
		$this->fields['CardNumber'] = &$this->CardNumber;

		// BranchID
		$this->BranchID = new DbField('store_payment', 'store_payment', 'x_BranchID', 'BranchID', '`BranchID`', '`BranchID`', 3, -1, FALSE, '`BranchID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BranchID->Sortable = TRUE; // Allow sort
		$this->BranchID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['BranchID'] = &$this->BranchID;

		// StoreID
		$this->StoreID = new DbField('store_payment', 'store_payment', 'x_StoreID', 'StoreID', '`StoreID`', '`StoreID`', 3, -1, FALSE, '`StoreID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->StoreID->Sortable = TRUE; // Allow sort
		$this->StoreID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['StoreID'] = &$this->StoreID;
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

	// Current detail table name
	public function getCurrentDetailTable()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_DETAIL_TABLE];
	}
	public function setCurrentDetailTable($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_DETAIL_TABLE] = $v;
	}

	// Get detail url
	public function getDetailUrl()
	{

		// Detail url
		$detailUrl = "";
		if ($this->getCurrentDetailTable() == "store_grn") {
			$detailUrl = $GLOBALS["store_grn"]->getListUrl() . "?" . TABLE_SHOW_MASTER . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
		}
		if ($detailUrl == "")
			$detailUrl = "store_paymentlist.php";
		return $detailUrl;
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`store_payment`";
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
		return ($this->SqlSelect <> "") ? $this->SqlSelect : "SELECT * FROM " . $this->getSqlFrom();
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
		$where = ($this->SqlWhere <> "") ? $this->SqlWhere : "";
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
		return ($this->SqlGroupBy <> "") ? $this->SqlGroupBy : "";
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
		return ($this->SqlHaving <> "") ? $this->SqlHaving : "";
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
		return ($this->SqlOrderBy <> "") ? $this->SqlOrderBy : "`id` DESC";
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
		$allow = USER_ID_ALLOW;
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
			default:
				return (($allow & 8) == 8);
		}
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

	// Get record count
	public function getRecordCount($sql)
	{
		$cnt = -1;
		$rs = NULL;
		$sql = preg_replace('/\/\*BeginOrderBy\*\/[\s\S]+\/\*EndOrderBy\*\//', "", $sql); // Remove ORDER BY clause (MSSQL)
		$pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';

		// Skip Custom View / SubQuery and SELECT DISTINCT
		if (($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
			preg_match($pattern, $sql) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sql) && !preg_match('/^\s*select\s+distinct\s+/i', $sql)) {
			$sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sql);
		} else {
			$sqlwrk = "SELECT COUNT(*) FROM (" . $sql . ") COUNT_TABLE";
		}
		$conn = &$this->getConnection();
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
		return "INSERT INTO " . $this->UpdateTable . " ($names) VALUES ($values)";
	}

	// Insert
	public function insert(&$rs)
	{
		$conn = &$this->getConnection();
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
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom || $this->fields[$name]->IsPrimaryKey)
				continue;
			$sql .= $this->fields[$name]->Expression . "=";
			$sql .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$sql = preg_replace('/,+$/', "", $sql);
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		AddFilter($filter, $where);
		if ($filter <> "")
			$sql .= " WHERE " . $filter;
		return $sql;
	}

	// Update
	public function update(&$rs, $where = "", $rsold = NULL, $curfilter = TRUE)
	{
		$conn = &$this->getConnection();
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
		if ($filter <> "")
			$sql .= $filter;
		else
			$sql .= "0=1"; // Avoid delete
		return $sql;
	}

	// Delete
	public function delete(&$rs, $where = "", $curfilter = FALSE)
	{
		$success = TRUE;
		$conn = &$this->getConnection();
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
		$this->BranchID->DbValue = $row['BranchID'];
		$this->StoreID->DbValue = $row['StoreID'];
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
		$val = is_array($row) ? (array_key_exists('id', $row) ? $row['id'] : NULL) : $this->id->CurrentValue;
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
		$name = PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_RETURN_URL;

		// Get referer URL automatically
		if (ServerVar("HTTP_REFERER") <> "" && ReferPageName() <> CurrentPageName() && ReferPageName() <> "login.php") // Referer not same page or login page
			$_SESSION[$name] = ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] <> "") {
			return $_SESSION[$name];
		} else {
			return "store_paymentlist.php";
		}
	}
	public function setReturnUrl($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_RETURN_URL] = $v;
	}

	// Get modal caption
	public function getModalCaption($pageName)
	{
		global $Language;
		if ($pageName == "store_paymentview.php")
			return $Language->phrase("View");
		elseif ($pageName == "store_paymentedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "store_paymentadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "store_paymentlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("store_paymentview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("store_paymentview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "store_paymentadd.php?" . $this->getUrlParm($parm);
		else
			$url = "store_paymentadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("store_paymentedit.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("store_paymentedit.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
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
		if ($parm <> "")
			$url = $this->keyUrl("store_paymentadd.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("store_paymentadd.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
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
		return $this->keyUrl("store_paymentdelete.php", $this->getUrlParm());
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
		if ($parm <> "")
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
			in_array($fld->Type, array(128, 204, 205))) { // Unsortable data type
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
		global $COMPOSITE_KEY_SEPARATOR;
		$arKeys = array();
		$arKey = array();
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
		$ar = array();
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
	public function getFilterFromRecordKeys()
	{
		$arKeys = $this->getRecordKeys();
		$keyFilter = "";
		foreach ($arKeys as $key) {
			if ($keyFilter <> "") $keyFilter .= " OR ";
			$this->id->CurrentValue = $key;
			$keyFilter .= "(" . $this->getRecordFilter() . ")";
		}
		return $keyFilter;
	}

	// Load rows based on filter
	public function &loadRs($filter)
	{

		// Set up filter (WHERE Clause)
		$sql = $this->getSql($filter);
		$conn = &$this->getConnection();
		$rs = $conn->execute($sql);
		return $rs;
	}

	// Load row values from recordset
	public function loadListRowValues(&$rs)
	{
		$this->id->setDbValue($rs->fields('id'));
		$this->PAYNO->setDbValue($rs->fields('PAYNO'));
		$this->DT->setDbValue($rs->fields('DT'));
		$this->YM->setDbValue($rs->fields('YM'));
		$this->PC->setDbValue($rs->fields('PC'));
		$this->Customercode->setDbValue($rs->fields('Customercode'));
		$this->Customername->setDbValue($rs->fields('Customername'));
		$this->pharmacy_pocol->setDbValue($rs->fields('pharmacy_pocol'));
		$this->Address1->setDbValue($rs->fields('Address1'));
		$this->Address2->setDbValue($rs->fields('Address2'));
		$this->Address3->setDbValue($rs->fields('Address3'));
		$this->State->setDbValue($rs->fields('State'));
		$this->Pincode->setDbValue($rs->fields('Pincode'));
		$this->Phone->setDbValue($rs->fields('Phone'));
		$this->Fax->setDbValue($rs->fields('Fax'));
		$this->EEmail->setDbValue($rs->fields('EEmail'));
		$this->HospID->setDbValue($rs->fields('HospID'));
		$this->createdby->setDbValue($rs->fields('createdby'));
		$this->createddatetime->setDbValue($rs->fields('createddatetime'));
		$this->modifiedby->setDbValue($rs->fields('modifiedby'));
		$this->modifieddatetime->setDbValue($rs->fields('modifieddatetime'));
		$this->PharmacyID->setDbValue($rs->fields('PharmacyID'));
		$this->BillTotalValue->setDbValue($rs->fields('BillTotalValue'));
		$this->GRNTotalValue->setDbValue($rs->fields('GRNTotalValue'));
		$this->BillDiscount->setDbValue($rs->fields('BillDiscount'));
		$this->BillUpload->setDbValue($rs->fields('BillUpload'));
		$this->TransPort->setDbValue($rs->fields('TransPort'));
		$this->AnyOther->setDbValue($rs->fields('AnyOther'));
		$this->voucher_type->setDbValue($rs->fields('voucher_type'));
		$this->Details->setDbValue($rs->fields('Details'));
		$this->ModeofPayment->setDbValue($rs->fields('ModeofPayment'));
		$this->Amount->setDbValue($rs->fields('Amount'));
		$this->BankName->setDbValue($rs->fields('BankName'));
		$this->AccountNumber->setDbValue($rs->fields('AccountNumber'));
		$this->chequeNumber->setDbValue($rs->fields('chequeNumber'));
		$this->Remarks->setDbValue($rs->fields('Remarks'));
		$this->SeectPaymentMode->setDbValue($rs->fields('SeectPaymentMode'));
		$this->PaidAmount->setDbValue($rs->fields('PaidAmount'));
		$this->Currency->setDbValue($rs->fields('Currency'));
		$this->CardNumber->setDbValue($rs->fields('CardNumber'));
		$this->BranchID->setDbValue($rs->fields('BranchID'));
		$this->StoreID->setDbValue($rs->fields('StoreID'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

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
		// BranchID
		// StoreID
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
		$curVal = strval($this->Customername->CurrentValue);
		if ($curVal <> "") {
			$this->Customername->ViewValue = $this->Customername->lookupCacheOption($curVal);
			if ($this->Customername->ViewValue === NULL) { // Lookup from database
				$arwrk = explode(",", $curVal);
				$filterWrk = "";
				foreach ($arwrk as $wrk) {
					if ($filterWrk <> "")
						$filterWrk .= " OR ";
					$filterWrk .= "`Suppliername`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Customername->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$this->Customername->ViewValue = new OptionValues();
					$ari = 0;
					while (!$rswrk->EOF) {
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Customername->ViewValue->add($this->Customername->displayValue($arwrk));
						$rswrk->MoveNext();
						$ari++;
					}
					$rswrk->Close();
				} else {
					$this->Customername->ViewValue = $this->Customername->CurrentValue;
				}
			}
		} else {
			$this->Customername->ViewValue = NULL;
		}
		$this->Customername->ViewCustomAttributes = "";

		// pharmacy_pocol
		$curVal = strval($this->pharmacy_pocol->CurrentValue);
		if ($curVal <> "") {
			$this->pharmacy_pocol->ViewValue = $this->pharmacy_pocol->lookupCacheOption($curVal);
			if ($this->pharmacy_pocol->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`pharmacy`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$lookupFilter = function() {
					return "`HospId`='".HospitalID()."'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->pharmacy_pocol->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->pharmacy_pocol->ViewValue = $this->pharmacy_pocol->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->pharmacy_pocol->ViewValue = $this->pharmacy_pocol->CurrentValue;
				}
			}
		} else {
			$this->pharmacy_pocol->ViewValue = NULL;
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
		$curVal = strval($this->ModeofPayment->CurrentValue);
		if ($curVal <> "") {
			$this->ModeofPayment->ViewValue = $this->ModeofPayment->lookupCacheOption($curVal);
			if ($this->ModeofPayment->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Mode`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->ModeofPayment->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->ModeofPayment->ViewValue = $this->ModeofPayment->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->ModeofPayment->ViewValue = $this->ModeofPayment->CurrentValue;
				}
			}
		} else {
			$this->ModeofPayment->ViewValue = NULL;
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

		// BranchID
		$this->BranchID->ViewValue = $this->BranchID->CurrentValue;
		$this->BranchID->ViewValue = FormatNumber($this->BranchID->ViewValue, 0, -2, -2, -2);
		$this->BranchID->ViewCustomAttributes = "";

		// StoreID
		$this->StoreID->ViewValue = $this->StoreID->CurrentValue;
		$this->StoreID->ViewValue = FormatNumber($this->StoreID->ViewValue, 0, -2, -2, -2);
		$this->StoreID->ViewCustomAttributes = "";

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

		// BranchID
		$this->BranchID->LinkCustomAttributes = "";
		$this->BranchID->HrefValue = "";
		$this->BranchID->TooltipValue = "";

		// StoreID
		$this->StoreID->LinkCustomAttributes = "";
		$this->StoreID->HrefValue = "";
		$this->StoreID->TooltipValue = "";

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

		// PAYNO
		$this->PAYNO->EditAttrs["class"] = "form-control";
		$this->PAYNO->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PAYNO->CurrentValue = HtmlDecode($this->PAYNO->CurrentValue);
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
		if (REMOVE_XSS)
			$this->YM->CurrentValue = HtmlDecode($this->YM->CurrentValue);
		$this->YM->EditValue = $this->YM->CurrentValue;
		$this->YM->PlaceHolder = RemoveHtml($this->YM->caption());

		// PC
		$this->PC->EditAttrs["class"] = "form-control";
		$this->PC->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PC->CurrentValue = HtmlDecode($this->PC->CurrentValue);
		$this->PC->EditValue = $this->PC->CurrentValue;
		$this->PC->PlaceHolder = RemoveHtml($this->PC->caption());

		// Customercode
		$this->Customercode->EditAttrs["class"] = "form-control";
		$this->Customercode->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Customercode->CurrentValue = HtmlDecode($this->Customercode->CurrentValue);
		$this->Customercode->EditValue = $this->Customercode->CurrentValue;
		$this->Customercode->PlaceHolder = RemoveHtml($this->Customercode->caption());

		// Customername
		$this->Customername->EditAttrs["class"] = "form-control";
		$this->Customername->EditCustomAttributes = "";

		// pharmacy_pocol
		$this->pharmacy_pocol->EditAttrs["class"] = "form-control";
		$this->pharmacy_pocol->EditCustomAttributes = "";

		// Address1
		$this->Address1->EditAttrs["class"] = "form-control";
		$this->Address1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Address1->CurrentValue = HtmlDecode($this->Address1->CurrentValue);
		$this->Address1->EditValue = $this->Address1->CurrentValue;
		$this->Address1->PlaceHolder = RemoveHtml($this->Address1->caption());

		// Address2
		$this->Address2->EditAttrs["class"] = "form-control";
		$this->Address2->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Address2->CurrentValue = HtmlDecode($this->Address2->CurrentValue);
		$this->Address2->EditValue = $this->Address2->CurrentValue;
		$this->Address2->PlaceHolder = RemoveHtml($this->Address2->caption());

		// Address3
		$this->Address3->EditAttrs["class"] = "form-control";
		$this->Address3->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Address3->CurrentValue = HtmlDecode($this->Address3->CurrentValue);
		$this->Address3->EditValue = $this->Address3->CurrentValue;
		$this->Address3->PlaceHolder = RemoveHtml($this->Address3->caption());

		// State
		$this->State->EditAttrs["class"] = "form-control";
		$this->State->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->State->CurrentValue = HtmlDecode($this->State->CurrentValue);
		$this->State->EditValue = $this->State->CurrentValue;
		$this->State->PlaceHolder = RemoveHtml($this->State->caption());

		// Pincode
		$this->Pincode->EditAttrs["class"] = "form-control";
		$this->Pincode->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Pincode->CurrentValue = HtmlDecode($this->Pincode->CurrentValue);
		$this->Pincode->EditValue = $this->Pincode->CurrentValue;
		$this->Pincode->PlaceHolder = RemoveHtml($this->Pincode->caption());

		// Phone
		$this->Phone->EditAttrs["class"] = "form-control";
		$this->Phone->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Phone->CurrentValue = HtmlDecode($this->Phone->CurrentValue);
		$this->Phone->EditValue = $this->Phone->CurrentValue;
		$this->Phone->PlaceHolder = RemoveHtml($this->Phone->caption());

		// Fax
		$this->Fax->EditAttrs["class"] = "form-control";
		$this->Fax->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Fax->CurrentValue = HtmlDecode($this->Fax->CurrentValue);
		$this->Fax->EditValue = $this->Fax->CurrentValue;
		$this->Fax->PlaceHolder = RemoveHtml($this->Fax->caption());

		// EEmail
		$this->EEmail->EditAttrs["class"] = "form-control";
		$this->EEmail->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->EEmail->CurrentValue = HtmlDecode($this->EEmail->CurrentValue);
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
		if (strval($this->BillTotalValue->EditValue) <> "" && is_numeric($this->BillTotalValue->EditValue))
			$this->BillTotalValue->EditValue = FormatNumber($this->BillTotalValue->EditValue, -2, -2, -2, -2);

		// GRNTotalValue
		$this->GRNTotalValue->EditAttrs["class"] = "form-control";
		$this->GRNTotalValue->EditCustomAttributes = "";
		$this->GRNTotalValue->EditValue = $this->GRNTotalValue->CurrentValue;
		$this->GRNTotalValue->PlaceHolder = RemoveHtml($this->GRNTotalValue->caption());
		if (strval($this->GRNTotalValue->EditValue) <> "" && is_numeric($this->GRNTotalValue->EditValue))
			$this->GRNTotalValue->EditValue = FormatNumber($this->GRNTotalValue->EditValue, -2, -2, -2, -2);

		// BillDiscount
		$this->BillDiscount->EditAttrs["class"] = "form-control";
		$this->BillDiscount->EditCustomAttributes = "";
		$this->BillDiscount->EditValue = $this->BillDiscount->CurrentValue;
		$this->BillDiscount->PlaceHolder = RemoveHtml($this->BillDiscount->caption());
		if (strval($this->BillDiscount->EditValue) <> "" && is_numeric($this->BillDiscount->EditValue))
			$this->BillDiscount->EditValue = FormatNumber($this->BillDiscount->EditValue, -2, -2, -2, -2);

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
		if (strval($this->TransPort->EditValue) <> "" && is_numeric($this->TransPort->EditValue))
			$this->TransPort->EditValue = FormatNumber($this->TransPort->EditValue, -2, -2, -2, -2);

		// AnyOther
		$this->AnyOther->EditAttrs["class"] = "form-control";
		$this->AnyOther->EditCustomAttributes = "";
		$this->AnyOther->EditValue = $this->AnyOther->CurrentValue;
		$this->AnyOther->PlaceHolder = RemoveHtml($this->AnyOther->caption());
		if (strval($this->AnyOther->EditValue) <> "" && is_numeric($this->AnyOther->EditValue))
			$this->AnyOther->EditValue = FormatNumber($this->AnyOther->EditValue, -2, -2, -2, -2);

		// voucher_type
		$this->voucher_type->EditAttrs["class"] = "form-control";
		$this->voucher_type->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->voucher_type->CurrentValue = HtmlDecode($this->voucher_type->CurrentValue);
		$this->voucher_type->EditValue = $this->voucher_type->CurrentValue;
		$this->voucher_type->PlaceHolder = RemoveHtml($this->voucher_type->caption());

		// Details
		$this->Details->EditAttrs["class"] = "form-control";
		$this->Details->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Details->CurrentValue = HtmlDecode($this->Details->CurrentValue);
		$this->Details->EditValue = $this->Details->CurrentValue;
		$this->Details->PlaceHolder = RemoveHtml($this->Details->caption());

		// ModeofPayment
		$this->ModeofPayment->EditAttrs["class"] = "form-control";
		$this->ModeofPayment->EditCustomAttributes = "";

		// Amount
		$this->Amount->EditAttrs["class"] = "form-control";
		$this->Amount->EditCustomAttributes = "";
		$this->Amount->EditValue = $this->Amount->CurrentValue;
		$this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());
		if (strval($this->Amount->EditValue) <> "" && is_numeric($this->Amount->EditValue))
			$this->Amount->EditValue = FormatNumber($this->Amount->EditValue, -2, -2, -2, -2);

		// BankName
		$this->BankName->EditAttrs["class"] = "form-control";
		$this->BankName->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->BankName->CurrentValue = HtmlDecode($this->BankName->CurrentValue);
		$this->BankName->EditValue = $this->BankName->CurrentValue;
		$this->BankName->PlaceHolder = RemoveHtml($this->BankName->caption());

		// AccountNumber
		$this->AccountNumber->EditAttrs["class"] = "form-control";
		$this->AccountNumber->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->AccountNumber->CurrentValue = HtmlDecode($this->AccountNumber->CurrentValue);
		$this->AccountNumber->EditValue = $this->AccountNumber->CurrentValue;
		$this->AccountNumber->PlaceHolder = RemoveHtml($this->AccountNumber->caption());

		// chequeNumber
		$this->chequeNumber->EditAttrs["class"] = "form-control";
		$this->chequeNumber->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->chequeNumber->CurrentValue = HtmlDecode($this->chequeNumber->CurrentValue);
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
		if (REMOVE_XSS)
			$this->SeectPaymentMode->CurrentValue = HtmlDecode($this->SeectPaymentMode->CurrentValue);
		$this->SeectPaymentMode->EditValue = $this->SeectPaymentMode->CurrentValue;
		$this->SeectPaymentMode->PlaceHolder = RemoveHtml($this->SeectPaymentMode->caption());

		// PaidAmount
		$this->PaidAmount->EditAttrs["class"] = "form-control";
		$this->PaidAmount->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PaidAmount->CurrentValue = HtmlDecode($this->PaidAmount->CurrentValue);
		$this->PaidAmount->EditValue = $this->PaidAmount->CurrentValue;
		$this->PaidAmount->PlaceHolder = RemoveHtml($this->PaidAmount->caption());

		// Currency
		$this->Currency->EditAttrs["class"] = "form-control";
		$this->Currency->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Currency->CurrentValue = HtmlDecode($this->Currency->CurrentValue);
		$this->Currency->EditValue = $this->Currency->CurrentValue;
		$this->Currency->PlaceHolder = RemoveHtml($this->Currency->caption());

		// CardNumber
		$this->CardNumber->EditAttrs["class"] = "form-control";
		$this->CardNumber->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->CardNumber->CurrentValue = HtmlDecode($this->CardNumber->CurrentValue);
		$this->CardNumber->EditValue = $this->CardNumber->CurrentValue;
		$this->CardNumber->PlaceHolder = RemoveHtml($this->CardNumber->caption());

		// BranchID
		$this->BranchID->EditAttrs["class"] = "form-control";
		$this->BranchID->EditCustomAttributes = "";
		$this->BranchID->EditValue = $this->BranchID->CurrentValue;
		$this->BranchID->PlaceHolder = RemoveHtml($this->BranchID->caption());

		// StoreID
		$this->StoreID->EditAttrs["class"] = "form-control";
		$this->StoreID->EditCustomAttributes = "";
		$this->StoreID->EditValue = $this->StoreID->CurrentValue;
		$this->StoreID->PlaceHolder = RemoveHtml($this->StoreID->caption());

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	public function aggregateListRowValues()
	{
	}

	// Aggregate list row (for rendering)
	public function aggregateListRow()
	{

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
					$doc->exportCaption($this->BranchID);
					$doc->exportCaption($this->StoreID);
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
					$doc->exportCaption($this->BranchID);
					$doc->exportCaption($this->StoreID);
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
						$doc->exportField($this->BranchID);
						$doc->exportField($this->StoreID);
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
						$doc->exportField($this->BranchID);
						$doc->exportField($this->StoreID);
					}
					$doc->endExportRow($rowCnt);
				}
			}

			// Call Row Export server event
			if ($doc->ExportCustom)
				$this->Row_Export($recordset->fields);
			$recordset->moveNext();
		}
		if (!$doc->ExportCustom) {
			$doc->exportTableFooter();
		}
	}

	// Lookup data from table
	public function lookup()
	{
		global $Language, $LANGUAGE_FOLDER, $PROJECT_ID;
		if (!isset($Language))
			$Language = new Language($LANGUAGE_FOLDER, Post("language", ""));
		global $Security, $RequestSecurity;

		// Check token first
		$func = PROJECT_NAMESPACE . "CheckToken";
		$validRequest = FALSE;
		if (is_callable($func) && Post(TOKEN_NAME) !== NULL) {
			$validRequest = $func(Post(TOKEN_NAME), SessionTimeoutTime());
			if ($validRequest) {
				if (!isset($Security)) {
					if (session_status() !== PHP_SESSION_ACTIVE)
						session_start(); // Init session data
					$Security = new AdvancedSecurity();
					if ($Security->isLoggedIn()) $Security->TablePermission_Loading();
					$Security->loadCurrentUserLevel($PROJECT_ID . $this->TableName);
					if ($Security->isLoggedIn()) $Security->TablePermission_Loaded();
					$validRequest = $Security->canList(); // List permission
				}
			}
		} else {

			// User profile
			$UserProfile = new UserProfile();

			// Security
			$Security = new AdvancedSecurity();
			if (is_array($RequestSecurity)) // Login user for API request
				$Security->loginUser(@$RequestSecurity["username"], @$RequestSecurity["userid"], @$RequestSecurity["parentuserid"], @$RequestSecurity["userlevelid"]);
			$Security->TablePermission_Loading();
			$Security->loadCurrentUserLevel(CurrentProjectID() . $this->TableName);
			$Security->TablePermission_Loaded();
			$validRequest = $Security->canList(); // List permission
		}

		// Reject invalid request
		if (!$validRequest)
			return FALSE;

		// Load lookup parameters
		$distinct = ConvertToBool(Post("distinct"));
		$linkField = Post("linkField");
		$displayFields = Post("displayFields");
		$parentFields = Post("parentFields");
		if (!is_array($parentFields))
			$parentFields = [];
		$childFields = Post("childFields");
		if (!is_array($childFields))
			$childFields = [];
		$filterFields = Post("filterFields");
		if (!is_array($filterFields))
			$filterFields = [];
		$filterFieldVars = Post("filterFieldVars");
		if (!is_array($filterFieldVars))
			$filterFieldVars = [];
		$filterOperators = Post("filterOperators");
		if (!is_array($filterOperators))
			$filterOperators = [];
		$autoFillSourceFields = Post("autoFillSourceFields");
		if (!is_array($autoFillSourceFields))
			$autoFillSourceFields = [];
		$formatAutoFill = FALSE;
		$lookupType = Post("ajax", "unknown");
		$pageSize = -1;
		$offset = -1;
		$searchValue = "";
		if (SameText($lookupType, "modal")) {
			$searchValue = Post("sv", "");
			$pageSize = Post("recperpage", 10);
			$offset = Post("start", 0);
		} elseif (SameText($lookupType, "autosuggest")) {
			$searchValue = Get("q", "");
			$pageSize = Param("n", -1);
			$pageSize = is_numeric($pageSize) ? (int)$pageSize : -1;
			if ($pageSize <= 0)
				$pageSize = AUTO_SUGGEST_MAX_ENTRIES;
			$start = Param("start", -1);
			$start = is_numeric($start) ? (int)$start : -1;
			$page = Param("page", -1);
			$page = is_numeric($page) ? (int)$page : -1;
			$offset = $start >= 0 ? $start : ($page > 0 && $pageSize > 0 ? ($page - 1) * $pageSize : 0);
		}
		$userSelect = Decrypt(Post("s", ""));
		$userFilter = Decrypt(Post("f", ""));
		$userOrderBy = Decrypt(Post("o", ""));
		$keys = Post("keys");

		// Selected records from modal, skip parent/filter fields and show all records
		if ($keys !== NULL) {
			$parentFields = [];
			$filterFields = [];
			$filterFieldVars = [];
			$offset = 0;
			$pageSize = 0;
		}

		// Create lookup object and output JSON
		$lookup = new Lookup($linkField, $this->TableVar, $distinct, $linkField, $displayFields, $parentFields, $childFields, $filterFields, $filterFieldVars, $autoFillSourceFields);
		foreach ($filterFields as $i => $filterField) { // Set up filter operators
			if (@$filterOperators[$i] <> "")
				$lookup->setFilterOperator($filterField, $filterOperators[$i]);
		}
		$lookup->LookupType = $lookupType; // Lookup type
		if ($keys !== NULL) { // Selected records from modal
			if (is_array($keys))
				$keys = implode(LOOKUP_FILTER_VALUE_SEPARATOR, $keys);
			$lookup->FilterValues[] = $keys; // Lookup values
		} else { // Lookup values
			$lookup->FilterValues[] = Post("v0", Post("lookupValue", ""));
		}
		$cnt = is_array($filterFields) ? count($filterFields) : 0;
		for ($i = 1; $i <= $cnt; $i++)
			$lookup->FilterValues[] = Post("v" . $i, "");
		$lookup->SearchValue = $searchValue;
		$lookup->PageSize = $pageSize;
		$lookup->Offset = $offset;
		if ($userSelect <> "")
			$lookup->UserSelect = $userSelect;
		if ($userFilter <> "")
			$lookup->UserFilter = $userFilter;
		if ($userOrderBy <> "")
			$lookup->UserOrderBy = $userOrderBy;
		$lookup->toJson();
	}

	// Get file data
	public function getFileData($fldparm, $key, $resize, $width = THUMBNAIL_DEFAULT_WIDTH, $height = THUMBNAIL_DEFAULT_HEIGHT)
	{

		// No binary fields
		return FALSE;
	}

	// Table level events
	// Recordset Selecting event
	function Recordset_Selecting(&$filter) {

		// Enter your code here
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
	function Row_Inserted($rsold, &$rsnew) {

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