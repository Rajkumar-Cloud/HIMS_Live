<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for view_pharmacytransfer
 */
class view_pharmacytransfer extends DbTable
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
	public $ORDNO;
	public $BRCODE;
	public $PRC;
	public $QTY;
	public $DT;
	public $PC;
	public $YM;
	public $Stock;
	public $Printcheck;
	public $id;
	public $grnid;
	public $poid;
	public $LastMonthSale;
	public $PrName;
	public $GrnQuantity;
	public $Quantity;
	public $FreeQty;
	public $BatchNo;
	public $ExpDate;
	public $HSN;
	public $MFRCODE;
	public $PUnit;
	public $SUnit;
	public $MRP;
	public $PurValue;
	public $Disc;
	public $PSGST;
	public $PCGST;
	public $PTax;
	public $ItemValue;
	public $SalTax;
	public $PurRate;
	public $SalRate;
	public $Discount;
	public $SSGST;
	public $SCGST;
	public $Pack;
	public $GrnMRP;
	public $trid;
	public $HospID;
	public $CreatedBy;
	public $CreatedDateTime;
	public $ModifiedBy;
	public $ModifiedDateTime;
	public $grncreatedby;
	public $grncreatedDateTime;
	public $grnModifiedby;
	public $grnModifiedDateTime;
	public $Received;
	public $BillDate;
	public $CurStock;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'view_pharmacytransfer';
		$this->TableName = 'view_pharmacytransfer';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`view_pharmacytransfer`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_DEFAULT; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = TRUE; // Allow detail add
		$this->DetailEdit = TRUE; // Allow detail edit
		$this->DetailView = TRUE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = Config("DEFAULT_USER_ID_ALLOW_SECURITY"); // Default User ID allowed permissions
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// ORDNO
		$this->ORDNO = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_ORDNO', 'ORDNO', '`ORDNO`', '`ORDNO`', 200, 5, -1, FALSE, '`ORDNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ORDNO->Sortable = TRUE; // Allow sort
		$this->ORDNO->Lookup = new Lookup('ORDNO', 'hospital_pharmacy', FALSE, 'id', ["pharmacy","","",""], [], [], [], [], [], [], '', '');
		$this->fields['ORDNO'] = &$this->ORDNO;

		// BRCODE
		$this->BRCODE = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_BRCODE', 'BRCODE', '`BRCODE`', '`BRCODE`', 3, 11, -1, FALSE, '`BRCODE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BRCODE->Sortable = TRUE; // Allow sort
		$this->BRCODE->Lookup = new Lookup('BRCODE', 'hospital_pharmacy', FALSE, 'id', ["pharmacy","","",""], [], [], [], [], [], [], '', '');
		$this->BRCODE->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['BRCODE'] = &$this->BRCODE;

		// PRC
		$this->PRC = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_PRC', 'PRC', '`PRC`', '`PRC`', 200, 9, -1, FALSE, '`PRC`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PRC->Sortable = TRUE; // Allow sort
		$this->fields['PRC'] = &$this->PRC;

		// QTY
		$this->QTY = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_QTY', 'QTY', '`QTY`', '`QTY`', 3, 11, -1, FALSE, '`QTY`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->QTY->Sortable = TRUE; // Allow sort
		$this->QTY->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['QTY'] = &$this->QTY;

		// DT
		$this->DT = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_DT', 'DT', '`DT`', CastDateFieldForLike("`DT`", 0, "DB"), 135, 19, 0, FALSE, '`DT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DT->Sortable = TRUE; // Allow sort
		$this->DT->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['DT'] = &$this->DT;

		// PC
		$this->PC = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_PC', 'PC', '`PC`', '`PC`', 200, 5, -1, FALSE, '`PC`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PC->Sortable = TRUE; // Allow sort
		$this->fields['PC'] = &$this->PC;

		// YM
		$this->YM = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_YM', 'YM', '`YM`', '`YM`', 200, 6, -1, FALSE, '`YM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->YM->Sortable = TRUE; // Allow sort
		$this->fields['YM'] = &$this->YM;

		// Stock
		$this->Stock = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_Stock', 'Stock', '`Stock`', '`Stock`', 3, 11, -1, FALSE, '`Stock`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Stock->Sortable = TRUE; // Allow sort
		$this->Stock->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Stock'] = &$this->Stock;

		// Printcheck
		$this->Printcheck = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_Printcheck', 'Printcheck', '`Printcheck`', '`Printcheck`', 200, 50, -1, FALSE, '`Printcheck`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Printcheck->Sortable = TRUE; // Allow sort
		$this->fields['Printcheck'] = &$this->Printcheck;

		// id
		$this->id = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// grnid
		$this->grnid = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_grnid', 'grnid', '`grnid`', '`grnid`', 3, 11, -1, FALSE, '`grnid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->grnid->Sortable = TRUE; // Allow sort
		$this->grnid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['grnid'] = &$this->grnid;

		// poid
		$this->poid = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_poid', 'poid', '`poid`', '`poid`', 3, 11, -1, FALSE, '`poid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->poid->Sortable = TRUE; // Allow sort
		$this->poid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['poid'] = &$this->poid;

		// LastMonthSale
		$this->LastMonthSale = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_LastMonthSale', 'LastMonthSale', '`LastMonthSale`', '`LastMonthSale`', 3, 11, -1, FALSE, '`LastMonthSale`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->LastMonthSale->Sortable = TRUE; // Allow sort
		$this->LastMonthSale->Lookup = new Lookup('LastMonthSale', 'view_pharmacy_search_product_new', FALSE, 'id', ["PrName","Stock","RT",""], [], [], [], [], ["PRC","DES","BATCH","EXPDT","MFRCODE","RT","SSGST","SCGST","RT","SSGST","SCGST","BILLDATE","Stock"], ["x_PRC","x_PrName","x_BatchNo","x_ExpDate","x_MFRCODE","x_MRP","x_PSGST","x_PCGST","x_SalRate","x_SSGST","x_SCGST","x_BillDate","x_CurStock"], '`Stock` DESC', '');
		$this->LastMonthSale->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['LastMonthSale'] = &$this->LastMonthSale;

		// PrName
		$this->PrName = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_PrName', 'PrName', '`PrName`', '`PrName`', 200, 100, -1, FALSE, '`PrName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PrName->Sortable = TRUE; // Allow sort
		$this->fields['PrName'] = &$this->PrName;

		// GrnQuantity
		$this->GrnQuantity = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_GrnQuantity', 'GrnQuantity', '`GrnQuantity`', '`GrnQuantity`', 3, 11, -1, FALSE, '`GrnQuantity`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->GrnQuantity->Sortable = TRUE; // Allow sort
		$this->GrnQuantity->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['GrnQuantity'] = &$this->GrnQuantity;

		// Quantity
		$this->Quantity = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_Quantity', 'Quantity', '`Quantity`', '`Quantity`', 3, 11, -1, FALSE, '`Quantity`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Quantity->Sortable = TRUE; // Allow sort
		$this->Quantity->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Quantity'] = &$this->Quantity;

		// FreeQty
		$this->FreeQty = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_FreeQty', 'FreeQty', '`FreeQty`', '`FreeQty`', 3, 11, -1, FALSE, '`FreeQty`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FreeQty->Sortable = TRUE; // Allow sort
		$this->FreeQty->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['FreeQty'] = &$this->FreeQty;

		// BatchNo
		$this->BatchNo = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_BatchNo', 'BatchNo', '`BatchNo`', '`BatchNo`', 200, 45, -1, FALSE, '`BatchNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BatchNo->Sortable = TRUE; // Allow sort
		$this->fields['BatchNo'] = &$this->BatchNo;

		// ExpDate
		$this->ExpDate = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_ExpDate', 'ExpDate', '`ExpDate`', CastDateFieldForLike("`ExpDate`", 0, "DB"), 135, 19, 0, FALSE, '`ExpDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ExpDate->Sortable = TRUE; // Allow sort
		$this->ExpDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['ExpDate'] = &$this->ExpDate;

		// HSN
		$this->HSN = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_HSN', 'HSN', '`HSN`', '`HSN`', 200, 45, -1, FALSE, '`HSN`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HSN->Sortable = TRUE; // Allow sort
		$this->fields['HSN'] = &$this->HSN;

		// MFRCODE
		$this->MFRCODE = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_MFRCODE', 'MFRCODE', '`MFRCODE`', '`MFRCODE`', 200, 45, -1, FALSE, '`MFRCODE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MFRCODE->Sortable = TRUE; // Allow sort
		$this->fields['MFRCODE'] = &$this->MFRCODE;

		// PUnit
		$this->PUnit = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_PUnit', 'PUnit', '`PUnit`', '`PUnit`', 3, 11, -1, FALSE, '`PUnit`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PUnit->Sortable = TRUE; // Allow sort
		$this->PUnit->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['PUnit'] = &$this->PUnit;

		// SUnit
		$this->SUnit = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_SUnit', 'SUnit', '`SUnit`', '`SUnit`', 3, 11, -1, FALSE, '`SUnit`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SUnit->Sortable = TRUE; // Allow sort
		$this->SUnit->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['SUnit'] = &$this->SUnit;

		// MRP
		$this->MRP = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_MRP', 'MRP', '`MRP`', '`MRP`', 131, 12, -1, FALSE, '`MRP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MRP->Sortable = TRUE; // Allow sort
		$this->MRP->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['MRP'] = &$this->MRP;

		// PurValue
		$this->PurValue = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_PurValue', 'PurValue', '`PurValue`', '`PurValue`', 131, 12, -1, FALSE, '`PurValue`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PurValue->Sortable = TRUE; // Allow sort
		$this->PurValue->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PurValue'] = &$this->PurValue;

		// Disc
		$this->Disc = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_Disc', 'Disc', '`Disc`', '`Disc`', 131, 12, -1, FALSE, '`Disc`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Disc->Sortable = TRUE; // Allow sort
		$this->Disc->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Disc'] = &$this->Disc;

		// PSGST
		$this->PSGST = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_PSGST', 'PSGST', '`PSGST`', '`PSGST`', 131, 12, -1, FALSE, '`PSGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PSGST->Sortable = TRUE; // Allow sort
		$this->PSGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PSGST'] = &$this->PSGST;

		// PCGST
		$this->PCGST = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_PCGST', 'PCGST', '`PCGST`', '`PCGST`', 131, 12, -1, FALSE, '`PCGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PCGST->Sortable = TRUE; // Allow sort
		$this->PCGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PCGST'] = &$this->PCGST;

		// PTax
		$this->PTax = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_PTax', 'PTax', '`PTax`', '`PTax`', 131, 12, -1, FALSE, '`PTax`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PTax->Sortable = TRUE; // Allow sort
		$this->PTax->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PTax'] = &$this->PTax;

		// ItemValue
		$this->ItemValue = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_ItemValue', 'ItemValue', '`ItemValue`', '`ItemValue`', 131, 12, -1, FALSE, '`ItemValue`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ItemValue->Sortable = TRUE; // Allow sort
		$this->ItemValue->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['ItemValue'] = &$this->ItemValue;

		// SalTax
		$this->SalTax = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_SalTax', 'SalTax', '`SalTax`', '`SalTax`', 131, 12, -1, FALSE, '`SalTax`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SalTax->Sortable = TRUE; // Allow sort
		$this->SalTax->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['SalTax'] = &$this->SalTax;

		// PurRate
		$this->PurRate = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_PurRate', 'PurRate', '`PurRate`', '`PurRate`', 131, 12, -1, FALSE, '`PurRate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PurRate->Sortable = TRUE; // Allow sort
		$this->PurRate->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PurRate'] = &$this->PurRate;

		// SalRate
		$this->SalRate = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_SalRate', 'SalRate', '`SalRate`', '`SalRate`', 131, 12, -1, FALSE, '`SalRate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SalRate->Sortable = TRUE; // Allow sort
		$this->SalRate->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['SalRate'] = &$this->SalRate;

		// Discount
		$this->Discount = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_Discount', 'Discount', '`Discount`', '`Discount`', 131, 12, -1, FALSE, '`Discount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Discount->Sortable = TRUE; // Allow sort
		$this->Discount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Discount'] = &$this->Discount;

		// SSGST
		$this->SSGST = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_SSGST', 'SSGST', '`SSGST`', '`SSGST`', 131, 12, -1, FALSE, '`SSGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SSGST->Sortable = TRUE; // Allow sort
		$this->SSGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['SSGST'] = &$this->SSGST;

		// SCGST
		$this->SCGST = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_SCGST', 'SCGST', '`SCGST`', '`SCGST`', 131, 12, -1, FALSE, '`SCGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SCGST->Sortable = TRUE; // Allow sort
		$this->SCGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['SCGST'] = &$this->SCGST;

		// Pack
		$this->Pack = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_Pack', 'Pack', '`Pack`', '`Pack`', 200, 45, -1, FALSE, '`Pack`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Pack->Sortable = TRUE; // Allow sort
		$this->fields['Pack'] = &$this->Pack;

		// GrnMRP
		$this->GrnMRP = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_GrnMRP', 'GrnMRP', '`GrnMRP`', '`GrnMRP`', 131, 12, -1, FALSE, '`GrnMRP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->GrnMRP->Sortable = TRUE; // Allow sort
		$this->GrnMRP->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['GrnMRP'] = &$this->GrnMRP;

		// trid
		$this->trid = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_trid', 'trid', '`trid`', '`trid`', 3, 11, -1, FALSE, '`trid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->trid->IsForeignKey = TRUE; // Foreign key field
		$this->trid->Sortable = TRUE; // Allow sort
		$this->trid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['trid'] = &$this->trid;

		// HospID
		$this->HospID = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HospID'] = &$this->HospID;

		// CreatedBy
		$this->CreatedBy = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_CreatedBy', 'CreatedBy', '`CreatedBy`', '`CreatedBy`', 3, 11, -1, FALSE, '`CreatedBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CreatedBy->Sortable = TRUE; // Allow sort
		$this->CreatedBy->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['CreatedBy'] = &$this->CreatedBy;

		// CreatedDateTime
		$this->CreatedDateTime = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_CreatedDateTime', 'CreatedDateTime', '`CreatedDateTime`', CastDateFieldForLike("`CreatedDateTime`", 0, "DB"), 135, 19, 0, FALSE, '`CreatedDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CreatedDateTime->Sortable = TRUE; // Allow sort
		$this->CreatedDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['CreatedDateTime'] = &$this->CreatedDateTime;

		// ModifiedBy
		$this->ModifiedBy = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_ModifiedBy', 'ModifiedBy', '`ModifiedBy`', '`ModifiedBy`', 3, 11, -1, FALSE, '`ModifiedBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ModifiedBy->Sortable = TRUE; // Allow sort
		$this->ModifiedBy->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['ModifiedBy'] = &$this->ModifiedBy;

		// ModifiedDateTime
		$this->ModifiedDateTime = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_ModifiedDateTime', 'ModifiedDateTime', '`ModifiedDateTime`', CastDateFieldForLike("`ModifiedDateTime`", 0, "DB"), 135, 19, 0, FALSE, '`ModifiedDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ModifiedDateTime->Sortable = TRUE; // Allow sort
		$this->ModifiedDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['ModifiedDateTime'] = &$this->ModifiedDateTime;

		// grncreatedby
		$this->grncreatedby = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_grncreatedby', 'grncreatedby', '`grncreatedby`', '`grncreatedby`', 3, 11, -1, FALSE, '`grncreatedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->grncreatedby->Sortable = TRUE; // Allow sort
		$this->grncreatedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['grncreatedby'] = &$this->grncreatedby;

		// grncreatedDateTime
		$this->grncreatedDateTime = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_grncreatedDateTime', 'grncreatedDateTime', '`grncreatedDateTime`', CastDateFieldForLike("`grncreatedDateTime`", 0, "DB"), 135, 19, 0, FALSE, '`grncreatedDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->grncreatedDateTime->Sortable = TRUE; // Allow sort
		$this->grncreatedDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['grncreatedDateTime'] = &$this->grncreatedDateTime;

		// grnModifiedby
		$this->grnModifiedby = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_grnModifiedby', 'grnModifiedby', '`grnModifiedby`', '`grnModifiedby`', 3, 11, -1, FALSE, '`grnModifiedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->grnModifiedby->Sortable = TRUE; // Allow sort
		$this->grnModifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['grnModifiedby'] = &$this->grnModifiedby;

		// grnModifiedDateTime
		$this->grnModifiedDateTime = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_grnModifiedDateTime', 'grnModifiedDateTime', '`grnModifiedDateTime`', CastDateFieldForLike("`grnModifiedDateTime`", 0, "DB"), 135, 19, 0, FALSE, '`grnModifiedDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->grnModifiedDateTime->Sortable = TRUE; // Allow sort
		$this->grnModifiedDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['grnModifiedDateTime'] = &$this->grnModifiedDateTime;

		// Received
		$this->Received = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_Received', 'Received', '`Received`', '`Received`', 200, 45, -1, FALSE, '`Received`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Received->Sortable = TRUE; // Allow sort
		$this->fields['Received'] = &$this->Received;

		// BillDate
		$this->BillDate = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_BillDate', 'BillDate', '`BillDate`', CastDateFieldForLike("`BillDate`", 0, "DB"), 135, 19, 0, FALSE, '`BillDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BillDate->Sortable = TRUE; // Allow sort
		$this->BillDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['BillDate'] = &$this->BillDate;

		// CurStock
		$this->CurStock = new DbField('view_pharmacytransfer', 'view_pharmacytransfer', 'x_CurStock', 'CurStock', '`CurStock`', '`CurStock`', 3, 11, -1, FALSE, '`CurStock`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CurStock->Sortable = TRUE; // Allow sort
		$this->CurStock->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['CurStock'] = &$this->CurStock;
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

	// Current master table name
	public function getCurrentMasterTable()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_MASTER_TABLE")];
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
		if ($this->getCurrentMasterTable() == "pharmacy_billing_transfer") {
			if ($this->trid->getSessionValue() != "")
				$masterFilter .= "`id`=" . QuotedValue($this->trid->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
		}
		return $masterFilter;
	}

	// Session detail WHERE clause
	public function getDetailFilter()
	{

		// Detail filter
		$detailFilter = "";
		if ($this->getCurrentMasterTable() == "pharmacy_billing_transfer") {
			if ($this->trid->getSessionValue() != "")
				$detailFilter .= "`trid`=" . QuotedValue($this->trid->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
		}
		return $detailFilter;
	}

	// Master filter
	public function sqlMasterFilter_pharmacy_billing_transfer()
	{
		return "`id`=@id@";
	}

	// Detail filter
	public function sqlDetailFilter_pharmacy_billing_transfer()
	{
		return "`trid`=@trid@";
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_pharmacytransfer`";
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
		$this->ORDNO->DbValue = $row['ORDNO'];
		$this->BRCODE->DbValue = $row['BRCODE'];
		$this->PRC->DbValue = $row['PRC'];
		$this->QTY->DbValue = $row['QTY'];
		$this->DT->DbValue = $row['DT'];
		$this->PC->DbValue = $row['PC'];
		$this->YM->DbValue = $row['YM'];
		$this->Stock->DbValue = $row['Stock'];
		$this->Printcheck->DbValue = $row['Printcheck'];
		$this->id->DbValue = $row['id'];
		$this->grnid->DbValue = $row['grnid'];
		$this->poid->DbValue = $row['poid'];
		$this->LastMonthSale->DbValue = $row['LastMonthSale'];
		$this->PrName->DbValue = $row['PrName'];
		$this->GrnQuantity->DbValue = $row['GrnQuantity'];
		$this->Quantity->DbValue = $row['Quantity'];
		$this->FreeQty->DbValue = $row['FreeQty'];
		$this->BatchNo->DbValue = $row['BatchNo'];
		$this->ExpDate->DbValue = $row['ExpDate'];
		$this->HSN->DbValue = $row['HSN'];
		$this->MFRCODE->DbValue = $row['MFRCODE'];
		$this->PUnit->DbValue = $row['PUnit'];
		$this->SUnit->DbValue = $row['SUnit'];
		$this->MRP->DbValue = $row['MRP'];
		$this->PurValue->DbValue = $row['PurValue'];
		$this->Disc->DbValue = $row['Disc'];
		$this->PSGST->DbValue = $row['PSGST'];
		$this->PCGST->DbValue = $row['PCGST'];
		$this->PTax->DbValue = $row['PTax'];
		$this->ItemValue->DbValue = $row['ItemValue'];
		$this->SalTax->DbValue = $row['SalTax'];
		$this->PurRate->DbValue = $row['PurRate'];
		$this->SalRate->DbValue = $row['SalRate'];
		$this->Discount->DbValue = $row['Discount'];
		$this->SSGST->DbValue = $row['SSGST'];
		$this->SCGST->DbValue = $row['SCGST'];
		$this->Pack->DbValue = $row['Pack'];
		$this->GrnMRP->DbValue = $row['GrnMRP'];
		$this->trid->DbValue = $row['trid'];
		$this->HospID->DbValue = $row['HospID'];
		$this->CreatedBy->DbValue = $row['CreatedBy'];
		$this->CreatedDateTime->DbValue = $row['CreatedDateTime'];
		$this->ModifiedBy->DbValue = $row['ModifiedBy'];
		$this->ModifiedDateTime->DbValue = $row['ModifiedDateTime'];
		$this->grncreatedby->DbValue = $row['grncreatedby'];
		$this->grncreatedDateTime->DbValue = $row['grncreatedDateTime'];
		$this->grnModifiedby->DbValue = $row['grnModifiedby'];
		$this->grnModifiedDateTime->DbValue = $row['grnModifiedDateTime'];
		$this->Received->DbValue = $row['Received'];
		$this->BillDate->DbValue = $row['BillDate'];
		$this->CurStock->DbValue = $row['CurStock'];
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
			return "view_pharmacytransferlist.php";
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
		if ($pageName == "view_pharmacytransferview.php")
			return $Language->phrase("View");
		elseif ($pageName == "view_pharmacytransferedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "view_pharmacytransferadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "view_pharmacytransferlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("view_pharmacytransferview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_pharmacytransferview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "view_pharmacytransferadd.php?" . $this->getUrlParm($parm);
		else
			$url = "view_pharmacytransferadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("view_pharmacytransferedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("view_pharmacytransferadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("view_pharmacytransferdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		if ($this->getCurrentMasterTable() == "pharmacy_billing_transfer" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
			$url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
			$url .= "&fk_id=" . urlencode($this->trid->CurrentValue);
		}
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
		$this->ORDNO->setDbValue($rs->fields('ORDNO'));
		$this->BRCODE->setDbValue($rs->fields('BRCODE'));
		$this->PRC->setDbValue($rs->fields('PRC'));
		$this->QTY->setDbValue($rs->fields('QTY'));
		$this->DT->setDbValue($rs->fields('DT'));
		$this->PC->setDbValue($rs->fields('PC'));
		$this->YM->setDbValue($rs->fields('YM'));
		$this->Stock->setDbValue($rs->fields('Stock'));
		$this->Printcheck->setDbValue($rs->fields('Printcheck'));
		$this->id->setDbValue($rs->fields('id'));
		$this->grnid->setDbValue($rs->fields('grnid'));
		$this->poid->setDbValue($rs->fields('poid'));
		$this->LastMonthSale->setDbValue($rs->fields('LastMonthSale'));
		$this->PrName->setDbValue($rs->fields('PrName'));
		$this->GrnQuantity->setDbValue($rs->fields('GrnQuantity'));
		$this->Quantity->setDbValue($rs->fields('Quantity'));
		$this->FreeQty->setDbValue($rs->fields('FreeQty'));
		$this->BatchNo->setDbValue($rs->fields('BatchNo'));
		$this->ExpDate->setDbValue($rs->fields('ExpDate'));
		$this->HSN->setDbValue($rs->fields('HSN'));
		$this->MFRCODE->setDbValue($rs->fields('MFRCODE'));
		$this->PUnit->setDbValue($rs->fields('PUnit'));
		$this->SUnit->setDbValue($rs->fields('SUnit'));
		$this->MRP->setDbValue($rs->fields('MRP'));
		$this->PurValue->setDbValue($rs->fields('PurValue'));
		$this->Disc->setDbValue($rs->fields('Disc'));
		$this->PSGST->setDbValue($rs->fields('PSGST'));
		$this->PCGST->setDbValue($rs->fields('PCGST'));
		$this->PTax->setDbValue($rs->fields('PTax'));
		$this->ItemValue->setDbValue($rs->fields('ItemValue'));
		$this->SalTax->setDbValue($rs->fields('SalTax'));
		$this->PurRate->setDbValue($rs->fields('PurRate'));
		$this->SalRate->setDbValue($rs->fields('SalRate'));
		$this->Discount->setDbValue($rs->fields('Discount'));
		$this->SSGST->setDbValue($rs->fields('SSGST'));
		$this->SCGST->setDbValue($rs->fields('SCGST'));
		$this->Pack->setDbValue($rs->fields('Pack'));
		$this->GrnMRP->setDbValue($rs->fields('GrnMRP'));
		$this->trid->setDbValue($rs->fields('trid'));
		$this->HospID->setDbValue($rs->fields('HospID'));
		$this->CreatedBy->setDbValue($rs->fields('CreatedBy'));
		$this->CreatedDateTime->setDbValue($rs->fields('CreatedDateTime'));
		$this->ModifiedBy->setDbValue($rs->fields('ModifiedBy'));
		$this->ModifiedDateTime->setDbValue($rs->fields('ModifiedDateTime'));
		$this->grncreatedby->setDbValue($rs->fields('grncreatedby'));
		$this->grncreatedDateTime->setDbValue($rs->fields('grncreatedDateTime'));
		$this->grnModifiedby->setDbValue($rs->fields('grnModifiedby'));
		$this->grnModifiedDateTime->setDbValue($rs->fields('grnModifiedDateTime'));
		$this->Received->setDbValue($rs->fields('Received'));
		$this->BillDate->setDbValue($rs->fields('BillDate'));
		$this->CurStock->setDbValue($rs->fields('CurStock'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// ORDNO
		// BRCODE
		// PRC
		// QTY
		// DT
		// PC
		// YM
		// Stock
		// Printcheck
		// id
		// grnid
		// poid
		// LastMonthSale
		// PrName
		// GrnQuantity
		// Quantity
		// FreeQty
		// BatchNo
		// ExpDate
		// HSN
		// MFRCODE
		// PUnit
		// SUnit
		// MRP
		// PurValue
		// Disc
		// PSGST
		// PCGST
		// PTax
		// ItemValue
		// SalTax
		// PurRate
		// SalRate
		// Discount
		// SSGST
		// SCGST
		// Pack
		// GrnMRP
		// trid
		// HospID
		// CreatedBy
		// CreatedDateTime
		// ModifiedBy
		// ModifiedDateTime
		// grncreatedby
		// grncreatedDateTime
		// grnModifiedby
		// grnModifiedDateTime
		// Received
		// BillDate
		// CurStock
		// ORDNO

		$this->ORDNO->ViewValue = $this->ORDNO->CurrentValue;
		$curVal = strval($this->ORDNO->CurrentValue);
		if ($curVal != "") {
			$this->ORDNO->ViewValue = $this->ORDNO->lookupCacheOption($curVal);
			if ($this->ORDNO->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->ORDNO->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->ORDNO->ViewValue = $this->ORDNO->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->ORDNO->ViewValue = $this->ORDNO->CurrentValue;
				}
			}
		} else {
			$this->ORDNO->ViewValue = NULL;
		}
		$this->ORDNO->ViewCustomAttributes = "";

		// BRCODE
		$this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
		$curVal = strval($this->BRCODE->CurrentValue);
		if ($curVal != "") {
			$this->BRCODE->ViewValue = $this->BRCODE->lookupCacheOption($curVal);
			if ($this->BRCODE->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->BRCODE->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->BRCODE->ViewValue = $this->BRCODE->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
				}
			}
		} else {
			$this->BRCODE->ViewValue = NULL;
		}
		$this->BRCODE->ViewCustomAttributes = "";

		// PRC
		$this->PRC->ViewValue = $this->PRC->CurrentValue;
		$this->PRC->ViewCustomAttributes = "";

		// QTY
		$this->QTY->ViewValue = $this->QTY->CurrentValue;
		$this->QTY->ViewValue = FormatNumber($this->QTY->ViewValue, 0, -2, -2, -2);
		$this->QTY->ViewCustomAttributes = "";

		// DT
		$this->DT->ViewValue = $this->DT->CurrentValue;
		$this->DT->ViewValue = FormatDateTime($this->DT->ViewValue, 0);
		$this->DT->ViewCustomAttributes = "";

		// PC
		$this->PC->ViewValue = $this->PC->CurrentValue;
		$this->PC->ViewCustomAttributes = "";

		// YM
		$this->YM->ViewValue = $this->YM->CurrentValue;
		$this->YM->ViewCustomAttributes = "";

		// Stock
		$this->Stock->ViewValue = $this->Stock->CurrentValue;
		$this->Stock->ViewValue = FormatNumber($this->Stock->ViewValue, 0, -2, -2, -2);
		$this->Stock->ViewCustomAttributes = "";

		// Printcheck
		$this->Printcheck->ViewValue = $this->Printcheck->CurrentValue;
		$this->Printcheck->ViewCustomAttributes = "";

		// id
		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// grnid
		$this->grnid->ViewValue = $this->grnid->CurrentValue;
		$this->grnid->ViewValue = FormatNumber($this->grnid->ViewValue, 0, -2, -2, -2);
		$this->grnid->ViewCustomAttributes = "";

		// poid
		$this->poid->ViewValue = $this->poid->CurrentValue;
		$this->poid->ViewValue = FormatNumber($this->poid->ViewValue, 0, -2, -2, -2);
		$this->poid->ViewCustomAttributes = "";

		// LastMonthSale
		$this->LastMonthSale->ViewValue = $this->LastMonthSale->CurrentValue;
		$curVal = strval($this->LastMonthSale->CurrentValue);
		if ($curVal != "") {
			$this->LastMonthSale->ViewValue = $this->LastMonthSale->lookupCacheOption($curVal);
			if ($this->LastMonthSale->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$lookupFilter = function() {
					return "`BRCODE`='".PharmacyID()."'  and  `HospID` = '".HospitalID()."'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->LastMonthSale->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = FormatNumber($rswrk->fields('df2'), 0, -2, -2, -2);
					$arwrk[3] = FormatNumber($rswrk->fields('df3'), 2, -2, -2, -2);
					$this->LastMonthSale->ViewValue = $this->LastMonthSale->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->LastMonthSale->ViewValue = $this->LastMonthSale->CurrentValue;
				}
			}
		} else {
			$this->LastMonthSale->ViewValue = NULL;
		}
		$this->LastMonthSale->ViewCustomAttributes = "";

		// PrName
		$this->PrName->ViewValue = $this->PrName->CurrentValue;
		$this->PrName->ViewCustomAttributes = "";

		// GrnQuantity
		$this->GrnQuantity->ViewValue = $this->GrnQuantity->CurrentValue;
		$this->GrnQuantity->ViewValue = FormatNumber($this->GrnQuantity->ViewValue, 0, -2, -2, -2);
		$this->GrnQuantity->ViewCustomAttributes = "";

		// Quantity
		$this->Quantity->ViewValue = $this->Quantity->CurrentValue;
		$this->Quantity->ViewValue = FormatNumber($this->Quantity->ViewValue, 0, -2, -2, -2);
		$this->Quantity->ViewCustomAttributes = "";

		// FreeQty
		$this->FreeQty->ViewValue = $this->FreeQty->CurrentValue;
		$this->FreeQty->ViewValue = FormatNumber($this->FreeQty->ViewValue, 0, -2, -2, -2);
		$this->FreeQty->ViewCustomAttributes = "";

		// BatchNo
		$this->BatchNo->ViewValue = $this->BatchNo->CurrentValue;
		$this->BatchNo->ViewCustomAttributes = "";

		// ExpDate
		$this->ExpDate->ViewValue = $this->ExpDate->CurrentValue;
		$this->ExpDate->ViewValue = FormatDateTime($this->ExpDate->ViewValue, 0);
		$this->ExpDate->ViewCustomAttributes = "";

		// HSN
		$this->HSN->ViewValue = $this->HSN->CurrentValue;
		$this->HSN->ViewCustomAttributes = "";

		// MFRCODE
		$this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
		$this->MFRCODE->ViewCustomAttributes = "";

		// PUnit
		$this->PUnit->ViewValue = $this->PUnit->CurrentValue;
		$this->PUnit->ViewValue = FormatNumber($this->PUnit->ViewValue, 0, -2, -2, -2);
		$this->PUnit->ViewCustomAttributes = "";

		// SUnit
		$this->SUnit->ViewValue = $this->SUnit->CurrentValue;
		$this->SUnit->ViewValue = FormatNumber($this->SUnit->ViewValue, 0, -2, -2, -2);
		$this->SUnit->ViewCustomAttributes = "";

		// MRP
		$this->MRP->ViewValue = $this->MRP->CurrentValue;
		$this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
		$this->MRP->ViewCustomAttributes = "";

		// PurValue
		$this->PurValue->ViewValue = $this->PurValue->CurrentValue;
		$this->PurValue->ViewValue = FormatNumber($this->PurValue->ViewValue, 2, -2, -2, -2);
		$this->PurValue->ViewCustomAttributes = "";

		// Disc
		$this->Disc->ViewValue = $this->Disc->CurrentValue;
		$this->Disc->ViewValue = FormatNumber($this->Disc->ViewValue, 2, -2, -2, -2);
		$this->Disc->ViewCustomAttributes = "";

		// PSGST
		$this->PSGST->ViewValue = $this->PSGST->CurrentValue;
		$this->PSGST->ViewValue = FormatNumber($this->PSGST->ViewValue, 2, -2, -2, -2);
		$this->PSGST->ViewCustomAttributes = "";

		// PCGST
		$this->PCGST->ViewValue = $this->PCGST->CurrentValue;
		$this->PCGST->ViewValue = FormatNumber($this->PCGST->ViewValue, 2, -2, -2, -2);
		$this->PCGST->ViewCustomAttributes = "";

		// PTax
		$this->PTax->ViewValue = $this->PTax->CurrentValue;
		$this->PTax->ViewValue = FormatNumber($this->PTax->ViewValue, 2, -2, -2, -2);
		$this->PTax->ViewCustomAttributes = "";

		// ItemValue
		$this->ItemValue->ViewValue = $this->ItemValue->CurrentValue;
		$this->ItemValue->ViewValue = FormatNumber($this->ItemValue->ViewValue, 2, -2, -2, -2);
		$this->ItemValue->ViewCustomAttributes = "";

		// SalTax
		$this->SalTax->ViewValue = $this->SalTax->CurrentValue;
		$this->SalTax->ViewValue = FormatNumber($this->SalTax->ViewValue, 2, -2, -2, -2);
		$this->SalTax->ViewCustomAttributes = "";

		// PurRate
		$this->PurRate->ViewValue = $this->PurRate->CurrentValue;
		$this->PurRate->ViewValue = FormatNumber($this->PurRate->ViewValue, 2, -2, -2, -2);
		$this->PurRate->ViewCustomAttributes = "";

		// SalRate
		$this->SalRate->ViewValue = $this->SalRate->CurrentValue;
		$this->SalRate->ViewValue = FormatNumber($this->SalRate->ViewValue, 2, -2, -2, -2);
		$this->SalRate->ViewCustomAttributes = "";

		// Discount
		$this->Discount->ViewValue = $this->Discount->CurrentValue;
		$this->Discount->ViewValue = FormatNumber($this->Discount->ViewValue, 2, -2, -2, -2);
		$this->Discount->ViewCustomAttributes = "";

		// SSGST
		$this->SSGST->ViewValue = $this->SSGST->CurrentValue;
		$this->SSGST->ViewValue = FormatNumber($this->SSGST->ViewValue, 2, -2, -2, -2);
		$this->SSGST->ViewCustomAttributes = "";

		// SCGST
		$this->SCGST->ViewValue = $this->SCGST->CurrentValue;
		$this->SCGST->ViewValue = FormatNumber($this->SCGST->ViewValue, 2, -2, -2, -2);
		$this->SCGST->ViewCustomAttributes = "";

		// Pack
		$this->Pack->ViewValue = $this->Pack->CurrentValue;
		$this->Pack->ViewCustomAttributes = "";

		// GrnMRP
		$this->GrnMRP->ViewValue = $this->GrnMRP->CurrentValue;
		$this->GrnMRP->ViewValue = FormatNumber($this->GrnMRP->ViewValue, 2, -2, -2, -2);
		$this->GrnMRP->ViewCustomAttributes = "";

		// trid
		$this->trid->ViewValue = $this->trid->CurrentValue;
		$this->trid->ViewValue = FormatNumber($this->trid->ViewValue, 0, -2, -2, -2);
		$this->trid->ViewCustomAttributes = "";

		// HospID
		$this->HospID->ViewValue = $this->HospID->CurrentValue;
		$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
		$this->HospID->ViewCustomAttributes = "";

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

		// grncreatedby
		$this->grncreatedby->ViewValue = $this->grncreatedby->CurrentValue;
		$this->grncreatedby->ViewValue = FormatNumber($this->grncreatedby->ViewValue, 0, -2, -2, -2);
		$this->grncreatedby->ViewCustomAttributes = "";

		// grncreatedDateTime
		$this->grncreatedDateTime->ViewValue = $this->grncreatedDateTime->CurrentValue;
		$this->grncreatedDateTime->ViewValue = FormatDateTime($this->grncreatedDateTime->ViewValue, 0);
		$this->grncreatedDateTime->ViewCustomAttributes = "";

		// grnModifiedby
		$this->grnModifiedby->ViewValue = $this->grnModifiedby->CurrentValue;
		$this->grnModifiedby->ViewValue = FormatNumber($this->grnModifiedby->ViewValue, 0, -2, -2, -2);
		$this->grnModifiedby->ViewCustomAttributes = "";

		// grnModifiedDateTime
		$this->grnModifiedDateTime->ViewValue = $this->grnModifiedDateTime->CurrentValue;
		$this->grnModifiedDateTime->ViewValue = FormatDateTime($this->grnModifiedDateTime->ViewValue, 0);
		$this->grnModifiedDateTime->ViewCustomAttributes = "";

		// Received
		$this->Received->ViewValue = $this->Received->CurrentValue;
		$this->Received->ViewCustomAttributes = "";

		// BillDate
		$this->BillDate->ViewValue = $this->BillDate->CurrentValue;
		$this->BillDate->ViewValue = FormatDateTime($this->BillDate->ViewValue, 0);
		$this->BillDate->ViewCustomAttributes = "";

		// CurStock
		$this->CurStock->ViewValue = $this->CurStock->CurrentValue;
		$this->CurStock->ViewValue = FormatNumber($this->CurStock->ViewValue, 0, -2, -2, -2);
		$this->CurStock->ViewCustomAttributes = "";

		// ORDNO
		$this->ORDNO->LinkCustomAttributes = "";
		$this->ORDNO->HrefValue = "";
		$this->ORDNO->TooltipValue = "";

		// BRCODE
		$this->BRCODE->LinkCustomAttributes = "";
		$this->BRCODE->HrefValue = "";
		$this->BRCODE->TooltipValue = "";

		// PRC
		$this->PRC->LinkCustomAttributes = "";
		$this->PRC->HrefValue = "";
		$this->PRC->TooltipValue = "";

		// QTY
		$this->QTY->LinkCustomAttributes = "";
		$this->QTY->HrefValue = "";
		$this->QTY->TooltipValue = "";

		// DT
		$this->DT->LinkCustomAttributes = "";
		$this->DT->HrefValue = "";
		$this->DT->TooltipValue = "";

		// PC
		$this->PC->LinkCustomAttributes = "";
		$this->PC->HrefValue = "";
		$this->PC->TooltipValue = "";

		// YM
		$this->YM->LinkCustomAttributes = "";
		$this->YM->HrefValue = "";
		$this->YM->TooltipValue = "";

		// Stock
		$this->Stock->LinkCustomAttributes = "";
		$this->Stock->HrefValue = "";
		$this->Stock->TooltipValue = "";

		// Printcheck
		$this->Printcheck->LinkCustomAttributes = "";
		$this->Printcheck->HrefValue = "";
		$this->Printcheck->TooltipValue = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// grnid
		$this->grnid->LinkCustomAttributes = "";
		$this->grnid->HrefValue = "";
		$this->grnid->TooltipValue = "";

		// poid
		$this->poid->LinkCustomAttributes = "";
		$this->poid->HrefValue = "";
		$this->poid->TooltipValue = "";

		// LastMonthSale
		$this->LastMonthSale->LinkCustomAttributes = "";
		$this->LastMonthSale->HrefValue = "";
		$this->LastMonthSale->TooltipValue = "";

		// PrName
		$this->PrName->LinkCustomAttributes = "";
		$this->PrName->HrefValue = "";
		$this->PrName->TooltipValue = "";

		// GrnQuantity
		$this->GrnQuantity->LinkCustomAttributes = "";
		$this->GrnQuantity->HrefValue = "";
		$this->GrnQuantity->TooltipValue = "";

		// Quantity
		$this->Quantity->LinkCustomAttributes = "";
		$this->Quantity->HrefValue = "";
		$this->Quantity->TooltipValue = "";

		// FreeQty
		$this->FreeQty->LinkCustomAttributes = "";
		$this->FreeQty->HrefValue = "";
		$this->FreeQty->TooltipValue = "";

		// BatchNo
		$this->BatchNo->LinkCustomAttributes = "";
		$this->BatchNo->HrefValue = "";
		$this->BatchNo->TooltipValue = "";

		// ExpDate
		$this->ExpDate->LinkCustomAttributes = "";
		$this->ExpDate->HrefValue = "";
		$this->ExpDate->TooltipValue = "";

		// HSN
		$this->HSN->LinkCustomAttributes = "";
		$this->HSN->HrefValue = "";
		$this->HSN->TooltipValue = "";

		// MFRCODE
		$this->MFRCODE->LinkCustomAttributes = "";
		$this->MFRCODE->HrefValue = "";
		$this->MFRCODE->TooltipValue = "";

		// PUnit
		$this->PUnit->LinkCustomAttributes = "";
		$this->PUnit->HrefValue = "";
		$this->PUnit->TooltipValue = "";

		// SUnit
		$this->SUnit->LinkCustomAttributes = "";
		$this->SUnit->HrefValue = "";
		$this->SUnit->TooltipValue = "";

		// MRP
		$this->MRP->LinkCustomAttributes = "";
		$this->MRP->HrefValue = "";
		$this->MRP->TooltipValue = "";

		// PurValue
		$this->PurValue->LinkCustomAttributes = "";
		$this->PurValue->HrefValue = "";
		$this->PurValue->TooltipValue = "";

		// Disc
		$this->Disc->LinkCustomAttributes = "";
		$this->Disc->HrefValue = "";
		$this->Disc->TooltipValue = "";

		// PSGST
		$this->PSGST->LinkCustomAttributes = "";
		$this->PSGST->HrefValue = "";
		$this->PSGST->TooltipValue = "";

		// PCGST
		$this->PCGST->LinkCustomAttributes = "";
		$this->PCGST->HrefValue = "";
		$this->PCGST->TooltipValue = "";

		// PTax
		$this->PTax->LinkCustomAttributes = "";
		$this->PTax->HrefValue = "";
		$this->PTax->TooltipValue = "";

		// ItemValue
		$this->ItemValue->LinkCustomAttributes = "";
		$this->ItemValue->HrefValue = "";
		$this->ItemValue->TooltipValue = "";

		// SalTax
		$this->SalTax->LinkCustomAttributes = "";
		$this->SalTax->HrefValue = "";
		$this->SalTax->TooltipValue = "";

		// PurRate
		$this->PurRate->LinkCustomAttributes = "";
		$this->PurRate->HrefValue = "";
		$this->PurRate->TooltipValue = "";

		// SalRate
		$this->SalRate->LinkCustomAttributes = "";
		$this->SalRate->HrefValue = "";
		$this->SalRate->TooltipValue = "";

		// Discount
		$this->Discount->LinkCustomAttributes = "";
		$this->Discount->HrefValue = "";
		$this->Discount->TooltipValue = "";

		// SSGST
		$this->SSGST->LinkCustomAttributes = "";
		$this->SSGST->HrefValue = "";
		$this->SSGST->TooltipValue = "";

		// SCGST
		$this->SCGST->LinkCustomAttributes = "";
		$this->SCGST->HrefValue = "";
		$this->SCGST->TooltipValue = "";

		// Pack
		$this->Pack->LinkCustomAttributes = "";
		$this->Pack->HrefValue = "";
		$this->Pack->TooltipValue = "";

		// GrnMRP
		$this->GrnMRP->LinkCustomAttributes = "";
		$this->GrnMRP->HrefValue = "";
		$this->GrnMRP->TooltipValue = "";

		// trid
		$this->trid->LinkCustomAttributes = "";
		$this->trid->HrefValue = "";
		$this->trid->TooltipValue = "";

		// HospID
		$this->HospID->LinkCustomAttributes = "";
		$this->HospID->HrefValue = "";
		$this->HospID->TooltipValue = "";

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

		// grncreatedby
		$this->grncreatedby->LinkCustomAttributes = "";
		$this->grncreatedby->HrefValue = "";
		$this->grncreatedby->TooltipValue = "";

		// grncreatedDateTime
		$this->grncreatedDateTime->LinkCustomAttributes = "";
		$this->grncreatedDateTime->HrefValue = "";
		$this->grncreatedDateTime->TooltipValue = "";

		// grnModifiedby
		$this->grnModifiedby->LinkCustomAttributes = "";
		$this->grnModifiedby->HrefValue = "";
		$this->grnModifiedby->TooltipValue = "";

		// grnModifiedDateTime
		$this->grnModifiedDateTime->LinkCustomAttributes = "";
		$this->grnModifiedDateTime->HrefValue = "";
		$this->grnModifiedDateTime->TooltipValue = "";

		// Received
		$this->Received->LinkCustomAttributes = "";
		$this->Received->HrefValue = "";
		$this->Received->TooltipValue = "";

		// BillDate
		$this->BillDate->LinkCustomAttributes = "";
		$this->BillDate->HrefValue = "";
		$this->BillDate->TooltipValue = "";

		// CurStock
		$this->CurStock->LinkCustomAttributes = "";
		$this->CurStock->HrefValue = "";
		$this->CurStock->TooltipValue = "";

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

		// ORDNO
		// BRCODE

		$this->BRCODE->EditAttrs["class"] = "form-control";
		$this->BRCODE->EditCustomAttributes = "";
		$this->BRCODE->EditValue = $this->BRCODE->CurrentValue;
		$this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

		// PRC
		$this->PRC->EditAttrs["class"] = "form-control";
		$this->PRC->EditCustomAttributes = "";
		if (!$this->PRC->Raw)
			$this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
		$this->PRC->EditValue = $this->PRC->CurrentValue;
		$this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

		// QTY
		$this->QTY->EditAttrs["class"] = "form-control";
		$this->QTY->EditCustomAttributes = "";
		$this->QTY->EditValue = $this->QTY->CurrentValue;
		$this->QTY->PlaceHolder = RemoveHtml($this->QTY->caption());

		// DT
		$this->DT->EditAttrs["class"] = "form-control";
		$this->DT->EditCustomAttributes = "";
		$this->DT->EditValue = FormatDateTime($this->DT->CurrentValue, 8);
		$this->DT->PlaceHolder = RemoveHtml($this->DT->caption());

		// PC
		$this->PC->EditAttrs["class"] = "form-control";
		$this->PC->EditCustomAttributes = "";
		if (!$this->PC->Raw)
			$this->PC->CurrentValue = HtmlDecode($this->PC->CurrentValue);
		$this->PC->EditValue = $this->PC->CurrentValue;
		$this->PC->PlaceHolder = RemoveHtml($this->PC->caption());

		// YM
		$this->YM->EditAttrs["class"] = "form-control";
		$this->YM->EditCustomAttributes = "";
		if (!$this->YM->Raw)
			$this->YM->CurrentValue = HtmlDecode($this->YM->CurrentValue);
		$this->YM->EditValue = $this->YM->CurrentValue;
		$this->YM->PlaceHolder = RemoveHtml($this->YM->caption());

		// Stock
		$this->Stock->EditAttrs["class"] = "form-control";
		$this->Stock->EditCustomAttributes = "";
		$this->Stock->EditValue = $this->Stock->CurrentValue;
		$this->Stock->PlaceHolder = RemoveHtml($this->Stock->caption());

		// Printcheck
		$this->Printcheck->EditAttrs["class"] = "form-control";
		$this->Printcheck->EditCustomAttributes = "";
		if (!$this->Printcheck->Raw)
			$this->Printcheck->CurrentValue = HtmlDecode($this->Printcheck->CurrentValue);
		$this->Printcheck->EditValue = $this->Printcheck->CurrentValue;
		$this->Printcheck->PlaceHolder = RemoveHtml($this->Printcheck->caption());

		// id
		$this->id->EditAttrs["class"] = "form-control";
		$this->id->EditCustomAttributes = "";
		$this->id->EditValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// grnid
		$this->grnid->EditAttrs["class"] = "form-control";
		$this->grnid->EditCustomAttributes = "";
		$this->grnid->EditValue = $this->grnid->CurrentValue;
		$this->grnid->PlaceHolder = RemoveHtml($this->grnid->caption());

		// poid
		$this->poid->EditAttrs["class"] = "form-control";
		$this->poid->EditCustomAttributes = "";
		$this->poid->EditValue = $this->poid->CurrentValue;
		$this->poid->PlaceHolder = RemoveHtml($this->poid->caption());

		// LastMonthSale
		$this->LastMonthSale->EditAttrs["class"] = "form-control";
		$this->LastMonthSale->EditCustomAttributes = "";
		$this->LastMonthSale->EditValue = $this->LastMonthSale->CurrentValue;
		$this->LastMonthSale->PlaceHolder = RemoveHtml($this->LastMonthSale->caption());

		// PrName
		$this->PrName->EditAttrs["class"] = "form-control";
		$this->PrName->EditCustomAttributes = "";
		if (!$this->PrName->Raw)
			$this->PrName->CurrentValue = HtmlDecode($this->PrName->CurrentValue);
		$this->PrName->EditValue = $this->PrName->CurrentValue;
		$this->PrName->PlaceHolder = RemoveHtml($this->PrName->caption());

		// GrnQuantity
		$this->GrnQuantity->EditAttrs["class"] = "form-control";
		$this->GrnQuantity->EditCustomAttributes = "";
		$this->GrnQuantity->EditValue = $this->GrnQuantity->CurrentValue;
		$this->GrnQuantity->PlaceHolder = RemoveHtml($this->GrnQuantity->caption());

		// Quantity
		$this->Quantity->EditAttrs["class"] = "form-control";
		$this->Quantity->EditCustomAttributes = "";
		$this->Quantity->EditValue = $this->Quantity->CurrentValue;
		$this->Quantity->PlaceHolder = RemoveHtml($this->Quantity->caption());

		// FreeQty
		$this->FreeQty->EditAttrs["class"] = "form-control";
		$this->FreeQty->EditCustomAttributes = "";
		$this->FreeQty->EditValue = $this->FreeQty->CurrentValue;
		$this->FreeQty->PlaceHolder = RemoveHtml($this->FreeQty->caption());

		// BatchNo
		$this->BatchNo->EditAttrs["class"] = "form-control";
		$this->BatchNo->EditCustomAttributes = "";
		if (!$this->BatchNo->Raw)
			$this->BatchNo->CurrentValue = HtmlDecode($this->BatchNo->CurrentValue);
		$this->BatchNo->EditValue = $this->BatchNo->CurrentValue;
		$this->BatchNo->PlaceHolder = RemoveHtml($this->BatchNo->caption());

		// ExpDate
		$this->ExpDate->EditAttrs["class"] = "form-control";
		$this->ExpDate->EditCustomAttributes = "";
		$this->ExpDate->EditValue = FormatDateTime($this->ExpDate->CurrentValue, 8);
		$this->ExpDate->PlaceHolder = RemoveHtml($this->ExpDate->caption());

		// HSN
		$this->HSN->EditAttrs["class"] = "form-control";
		$this->HSN->EditCustomAttributes = "";
		if (!$this->HSN->Raw)
			$this->HSN->CurrentValue = HtmlDecode($this->HSN->CurrentValue);
		$this->HSN->EditValue = $this->HSN->CurrentValue;
		$this->HSN->PlaceHolder = RemoveHtml($this->HSN->caption());

		// MFRCODE
		$this->MFRCODE->EditAttrs["class"] = "form-control";
		$this->MFRCODE->EditCustomAttributes = "";
		if (!$this->MFRCODE->Raw)
			$this->MFRCODE->CurrentValue = HtmlDecode($this->MFRCODE->CurrentValue);
		$this->MFRCODE->EditValue = $this->MFRCODE->CurrentValue;
		$this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

		// PUnit
		$this->PUnit->EditAttrs["class"] = "form-control";
		$this->PUnit->EditCustomAttributes = "";
		$this->PUnit->EditValue = $this->PUnit->CurrentValue;
		$this->PUnit->PlaceHolder = RemoveHtml($this->PUnit->caption());

		// SUnit
		$this->SUnit->EditAttrs["class"] = "form-control";
		$this->SUnit->EditCustomAttributes = "";
		$this->SUnit->EditValue = $this->SUnit->CurrentValue;
		$this->SUnit->PlaceHolder = RemoveHtml($this->SUnit->caption());

		// MRP
		$this->MRP->EditAttrs["class"] = "form-control";
		$this->MRP->EditCustomAttributes = "";
		$this->MRP->EditValue = $this->MRP->CurrentValue;
		$this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());
		if (strval($this->MRP->EditValue) != "" && is_numeric($this->MRP->EditValue))
			$this->MRP->EditValue = FormatNumber($this->MRP->EditValue, -2, -2, -2, -2);
		

		// PurValue
		$this->PurValue->EditAttrs["class"] = "form-control";
		$this->PurValue->EditCustomAttributes = "";
		$this->PurValue->EditValue = $this->PurValue->CurrentValue;
		$this->PurValue->PlaceHolder = RemoveHtml($this->PurValue->caption());
		if (strval($this->PurValue->EditValue) != "" && is_numeric($this->PurValue->EditValue))
			$this->PurValue->EditValue = FormatNumber($this->PurValue->EditValue, -2, -2, -2, -2);
		

		// Disc
		$this->Disc->EditAttrs["class"] = "form-control";
		$this->Disc->EditCustomAttributes = "";
		$this->Disc->EditValue = $this->Disc->CurrentValue;
		$this->Disc->PlaceHolder = RemoveHtml($this->Disc->caption());
		if (strval($this->Disc->EditValue) != "" && is_numeric($this->Disc->EditValue))
			$this->Disc->EditValue = FormatNumber($this->Disc->EditValue, -2, -2, -2, -2);
		

		// PSGST
		$this->PSGST->EditAttrs["class"] = "form-control";
		$this->PSGST->EditCustomAttributes = "";
		$this->PSGST->EditValue = $this->PSGST->CurrentValue;
		$this->PSGST->PlaceHolder = RemoveHtml($this->PSGST->caption());
		if (strval($this->PSGST->EditValue) != "" && is_numeric($this->PSGST->EditValue))
			$this->PSGST->EditValue = FormatNumber($this->PSGST->EditValue, -2, -2, -2, -2);
		

		// PCGST
		$this->PCGST->EditAttrs["class"] = "form-control";
		$this->PCGST->EditCustomAttributes = "";
		$this->PCGST->EditValue = $this->PCGST->CurrentValue;
		$this->PCGST->PlaceHolder = RemoveHtml($this->PCGST->caption());
		if (strval($this->PCGST->EditValue) != "" && is_numeric($this->PCGST->EditValue))
			$this->PCGST->EditValue = FormatNumber($this->PCGST->EditValue, -2, -2, -2, -2);
		

		// PTax
		$this->PTax->EditAttrs["class"] = "form-control";
		$this->PTax->EditCustomAttributes = "";
		$this->PTax->EditValue = $this->PTax->CurrentValue;
		$this->PTax->PlaceHolder = RemoveHtml($this->PTax->caption());
		if (strval($this->PTax->EditValue) != "" && is_numeric($this->PTax->EditValue))
			$this->PTax->EditValue = FormatNumber($this->PTax->EditValue, -2, -2, -2, -2);
		

		// ItemValue
		$this->ItemValue->EditAttrs["class"] = "form-control";
		$this->ItemValue->EditCustomAttributes = "";
		$this->ItemValue->EditValue = $this->ItemValue->CurrentValue;
		$this->ItemValue->PlaceHolder = RemoveHtml($this->ItemValue->caption());
		if (strval($this->ItemValue->EditValue) != "" && is_numeric($this->ItemValue->EditValue))
			$this->ItemValue->EditValue = FormatNumber($this->ItemValue->EditValue, -2, -2, -2, -2);
		

		// SalTax
		$this->SalTax->EditAttrs["class"] = "form-control";
		$this->SalTax->EditCustomAttributes = "";
		$this->SalTax->EditValue = $this->SalTax->CurrentValue;
		$this->SalTax->PlaceHolder = RemoveHtml($this->SalTax->caption());
		if (strval($this->SalTax->EditValue) != "" && is_numeric($this->SalTax->EditValue))
			$this->SalTax->EditValue = FormatNumber($this->SalTax->EditValue, -2, -2, -2, -2);
		

		// PurRate
		$this->PurRate->EditAttrs["class"] = "form-control";
		$this->PurRate->EditCustomAttributes = "";
		$this->PurRate->EditValue = $this->PurRate->CurrentValue;
		$this->PurRate->PlaceHolder = RemoveHtml($this->PurRate->caption());
		if (strval($this->PurRate->EditValue) != "" && is_numeric($this->PurRate->EditValue))
			$this->PurRate->EditValue = FormatNumber($this->PurRate->EditValue, -2, -2, -2, -2);
		

		// SalRate
		$this->SalRate->EditAttrs["class"] = "form-control";
		$this->SalRate->EditCustomAttributes = "";
		$this->SalRate->EditValue = $this->SalRate->CurrentValue;
		$this->SalRate->PlaceHolder = RemoveHtml($this->SalRate->caption());
		if (strval($this->SalRate->EditValue) != "" && is_numeric($this->SalRate->EditValue))
			$this->SalRate->EditValue = FormatNumber($this->SalRate->EditValue, -2, -2, -2, -2);
		

		// Discount
		$this->Discount->EditAttrs["class"] = "form-control";
		$this->Discount->EditCustomAttributes = "";
		$this->Discount->EditValue = $this->Discount->CurrentValue;
		$this->Discount->PlaceHolder = RemoveHtml($this->Discount->caption());
		if (strval($this->Discount->EditValue) != "" && is_numeric($this->Discount->EditValue))
			$this->Discount->EditValue = FormatNumber($this->Discount->EditValue, -2, -2, -2, -2);
		

		// SSGST
		$this->SSGST->EditAttrs["class"] = "form-control";
		$this->SSGST->EditCustomAttributes = "";
		$this->SSGST->EditValue = $this->SSGST->CurrentValue;
		$this->SSGST->PlaceHolder = RemoveHtml($this->SSGST->caption());
		if (strval($this->SSGST->EditValue) != "" && is_numeric($this->SSGST->EditValue))
			$this->SSGST->EditValue = FormatNumber($this->SSGST->EditValue, -2, -2, -2, -2);
		

		// SCGST
		$this->SCGST->EditAttrs["class"] = "form-control";
		$this->SCGST->EditCustomAttributes = "";
		$this->SCGST->EditValue = $this->SCGST->CurrentValue;
		$this->SCGST->PlaceHolder = RemoveHtml($this->SCGST->caption());
		if (strval($this->SCGST->EditValue) != "" && is_numeric($this->SCGST->EditValue))
			$this->SCGST->EditValue = FormatNumber($this->SCGST->EditValue, -2, -2, -2, -2);
		

		// Pack
		$this->Pack->EditAttrs["class"] = "form-control";
		$this->Pack->EditCustomAttributes = "";
		if (!$this->Pack->Raw)
			$this->Pack->CurrentValue = HtmlDecode($this->Pack->CurrentValue);
		$this->Pack->EditValue = $this->Pack->CurrentValue;
		$this->Pack->PlaceHolder = RemoveHtml($this->Pack->caption());

		// GrnMRP
		$this->GrnMRP->EditAttrs["class"] = "form-control";
		$this->GrnMRP->EditCustomAttributes = "";
		$this->GrnMRP->EditValue = $this->GrnMRP->CurrentValue;
		$this->GrnMRP->PlaceHolder = RemoveHtml($this->GrnMRP->caption());
		if (strval($this->GrnMRP->EditValue) != "" && is_numeric($this->GrnMRP->EditValue))
			$this->GrnMRP->EditValue = FormatNumber($this->GrnMRP->EditValue, -2, -2, -2, -2);
		

		// trid
		$this->trid->EditAttrs["class"] = "form-control";
		$this->trid->EditCustomAttributes = "";
		if ($this->trid->getSessionValue() != "") {
			$this->trid->CurrentValue = $this->trid->getSessionValue();
			$this->trid->ViewValue = $this->trid->CurrentValue;
			$this->trid->ViewValue = FormatNumber($this->trid->ViewValue, 0, -2, -2, -2);
			$this->trid->ViewCustomAttributes = "";
		} else {
			$this->trid->EditValue = $this->trid->CurrentValue;
			$this->trid->PlaceHolder = RemoveHtml($this->trid->caption());
		}

		// HospID
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

		// grncreatedby
		// grncreatedDateTime
		// grnModifiedby
		// grnModifiedDateTime
		// Received

		$this->Received->EditAttrs["class"] = "form-control";
		$this->Received->EditCustomAttributes = "";
		if (!$this->Received->Raw)
			$this->Received->CurrentValue = HtmlDecode($this->Received->CurrentValue);
		$this->Received->EditValue = $this->Received->CurrentValue;
		$this->Received->PlaceHolder = RemoveHtml($this->Received->caption());

		// BillDate
		$this->BillDate->EditAttrs["class"] = "form-control";
		$this->BillDate->EditCustomAttributes = "";
		$this->BillDate->EditValue = FormatDateTime($this->BillDate->CurrentValue, 8);
		$this->BillDate->PlaceHolder = RemoveHtml($this->BillDate->caption());

		// CurStock
		$this->CurStock->EditAttrs["class"] = "form-control";
		$this->CurStock->EditCustomAttributes = "";
		$this->CurStock->EditValue = $this->CurStock->CurrentValue;
		$this->CurStock->PlaceHolder = RemoveHtml($this->CurStock->caption());

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
					$doc->exportCaption($this->ORDNO);
					$doc->exportCaption($this->BRCODE);
					$doc->exportCaption($this->PRC);
					$doc->exportCaption($this->QTY);
					$doc->exportCaption($this->DT);
					$doc->exportCaption($this->PC);
					$doc->exportCaption($this->YM);
					$doc->exportCaption($this->Stock);
					$doc->exportCaption($this->Printcheck);
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->grnid);
					$doc->exportCaption($this->poid);
					$doc->exportCaption($this->LastMonthSale);
					$doc->exportCaption($this->PrName);
					$doc->exportCaption($this->GrnQuantity);
					$doc->exportCaption($this->Quantity);
					$doc->exportCaption($this->FreeQty);
					$doc->exportCaption($this->BatchNo);
					$doc->exportCaption($this->ExpDate);
					$doc->exportCaption($this->HSN);
					$doc->exportCaption($this->MFRCODE);
					$doc->exportCaption($this->PUnit);
					$doc->exportCaption($this->SUnit);
					$doc->exportCaption($this->MRP);
					$doc->exportCaption($this->PurValue);
					$doc->exportCaption($this->Disc);
					$doc->exportCaption($this->PSGST);
					$doc->exportCaption($this->PCGST);
					$doc->exportCaption($this->PTax);
					$doc->exportCaption($this->ItemValue);
					$doc->exportCaption($this->SalTax);
					$doc->exportCaption($this->PurRate);
					$doc->exportCaption($this->SalRate);
					$doc->exportCaption($this->Discount);
					$doc->exportCaption($this->SSGST);
					$doc->exportCaption($this->SCGST);
					$doc->exportCaption($this->Pack);
					$doc->exportCaption($this->GrnMRP);
					$doc->exportCaption($this->trid);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->CreatedBy);
					$doc->exportCaption($this->CreatedDateTime);
					$doc->exportCaption($this->ModifiedBy);
					$doc->exportCaption($this->ModifiedDateTime);
					$doc->exportCaption($this->grncreatedby);
					$doc->exportCaption($this->grncreatedDateTime);
					$doc->exportCaption($this->grnModifiedby);
					$doc->exportCaption($this->grnModifiedDateTime);
					$doc->exportCaption($this->Received);
					$doc->exportCaption($this->BillDate);
					$doc->exportCaption($this->CurStock);
				} else {
					$doc->exportCaption($this->ORDNO);
					$doc->exportCaption($this->BRCODE);
					$doc->exportCaption($this->PRC);
					$doc->exportCaption($this->QTY);
					$doc->exportCaption($this->DT);
					$doc->exportCaption($this->PC);
					$doc->exportCaption($this->YM);
					$doc->exportCaption($this->Stock);
					$doc->exportCaption($this->Printcheck);
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->grnid);
					$doc->exportCaption($this->poid);
					$doc->exportCaption($this->LastMonthSale);
					$doc->exportCaption($this->PrName);
					$doc->exportCaption($this->GrnQuantity);
					$doc->exportCaption($this->Quantity);
					$doc->exportCaption($this->FreeQty);
					$doc->exportCaption($this->BatchNo);
					$doc->exportCaption($this->ExpDate);
					$doc->exportCaption($this->HSN);
					$doc->exportCaption($this->MFRCODE);
					$doc->exportCaption($this->PUnit);
					$doc->exportCaption($this->SUnit);
					$doc->exportCaption($this->MRP);
					$doc->exportCaption($this->PurValue);
					$doc->exportCaption($this->Disc);
					$doc->exportCaption($this->PSGST);
					$doc->exportCaption($this->PCGST);
					$doc->exportCaption($this->PTax);
					$doc->exportCaption($this->ItemValue);
					$doc->exportCaption($this->SalTax);
					$doc->exportCaption($this->PurRate);
					$doc->exportCaption($this->SalRate);
					$doc->exportCaption($this->Discount);
					$doc->exportCaption($this->SSGST);
					$doc->exportCaption($this->SCGST);
					$doc->exportCaption($this->Pack);
					$doc->exportCaption($this->GrnMRP);
					$doc->exportCaption($this->trid);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->CreatedBy);
					$doc->exportCaption($this->CreatedDateTime);
					$doc->exportCaption($this->ModifiedBy);
					$doc->exportCaption($this->ModifiedDateTime);
					$doc->exportCaption($this->grncreatedby);
					$doc->exportCaption($this->grncreatedDateTime);
					$doc->exportCaption($this->grnModifiedby);
					$doc->exportCaption($this->grnModifiedDateTime);
					$doc->exportCaption($this->Received);
					$doc->exportCaption($this->BillDate);
					$doc->exportCaption($this->CurStock);
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
						$doc->exportField($this->ORDNO);
						$doc->exportField($this->BRCODE);
						$doc->exportField($this->PRC);
						$doc->exportField($this->QTY);
						$doc->exportField($this->DT);
						$doc->exportField($this->PC);
						$doc->exportField($this->YM);
						$doc->exportField($this->Stock);
						$doc->exportField($this->Printcheck);
						$doc->exportField($this->id);
						$doc->exportField($this->grnid);
						$doc->exportField($this->poid);
						$doc->exportField($this->LastMonthSale);
						$doc->exportField($this->PrName);
						$doc->exportField($this->GrnQuantity);
						$doc->exportField($this->Quantity);
						$doc->exportField($this->FreeQty);
						$doc->exportField($this->BatchNo);
						$doc->exportField($this->ExpDate);
						$doc->exportField($this->HSN);
						$doc->exportField($this->MFRCODE);
						$doc->exportField($this->PUnit);
						$doc->exportField($this->SUnit);
						$doc->exportField($this->MRP);
						$doc->exportField($this->PurValue);
						$doc->exportField($this->Disc);
						$doc->exportField($this->PSGST);
						$doc->exportField($this->PCGST);
						$doc->exportField($this->PTax);
						$doc->exportField($this->ItemValue);
						$doc->exportField($this->SalTax);
						$doc->exportField($this->PurRate);
						$doc->exportField($this->SalRate);
						$doc->exportField($this->Discount);
						$doc->exportField($this->SSGST);
						$doc->exportField($this->SCGST);
						$doc->exportField($this->Pack);
						$doc->exportField($this->GrnMRP);
						$doc->exportField($this->trid);
						$doc->exportField($this->HospID);
						$doc->exportField($this->CreatedBy);
						$doc->exportField($this->CreatedDateTime);
						$doc->exportField($this->ModifiedBy);
						$doc->exportField($this->ModifiedDateTime);
						$doc->exportField($this->grncreatedby);
						$doc->exportField($this->grncreatedDateTime);
						$doc->exportField($this->grnModifiedby);
						$doc->exportField($this->grnModifiedDateTime);
						$doc->exportField($this->Received);
						$doc->exportField($this->BillDate);
						$doc->exportField($this->CurStock);
					} else {
						$doc->exportField($this->ORDNO);
						$doc->exportField($this->BRCODE);
						$doc->exportField($this->PRC);
						$doc->exportField($this->QTY);
						$doc->exportField($this->DT);
						$doc->exportField($this->PC);
						$doc->exportField($this->YM);
						$doc->exportField($this->Stock);
						$doc->exportField($this->Printcheck);
						$doc->exportField($this->id);
						$doc->exportField($this->grnid);
						$doc->exportField($this->poid);
						$doc->exportField($this->LastMonthSale);
						$doc->exportField($this->PrName);
						$doc->exportField($this->GrnQuantity);
						$doc->exportField($this->Quantity);
						$doc->exportField($this->FreeQty);
						$doc->exportField($this->BatchNo);
						$doc->exportField($this->ExpDate);
						$doc->exportField($this->HSN);
						$doc->exportField($this->MFRCODE);
						$doc->exportField($this->PUnit);
						$doc->exportField($this->SUnit);
						$doc->exportField($this->MRP);
						$doc->exportField($this->PurValue);
						$doc->exportField($this->Disc);
						$doc->exportField($this->PSGST);
						$doc->exportField($this->PCGST);
						$doc->exportField($this->PTax);
						$doc->exportField($this->ItemValue);
						$doc->exportField($this->SalTax);
						$doc->exportField($this->PurRate);
						$doc->exportField($this->SalRate);
						$doc->exportField($this->Discount);
						$doc->exportField($this->SSGST);
						$doc->exportField($this->SCGST);
						$doc->exportField($this->Pack);
						$doc->exportField($this->GrnMRP);
						$doc->exportField($this->trid);
						$doc->exportField($this->HospID);
						$doc->exportField($this->CreatedBy);
						$doc->exportField($this->CreatedDateTime);
						$doc->exportField($this->ModifiedBy);
						$doc->exportField($this->ModifiedDateTime);
						$doc->exportField($this->grncreatedby);
						$doc->exportField($this->grncreatedDateTime);
						$doc->exportField($this->grnModifiedby);
						$doc->exportField($this->grnModifiedDateTime);
						$doc->exportField($this->Received);
						$doc->exportField($this->BillDate);
						$doc->exportField($this->CurStock);
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

			$cid = $_GET["fk_id"] ;
							$IVFid = $_GET["fk_RIDNO"] ;
							$dbhelper = &DbHelper();
							$Tid = $_GET["fk_id"] ;
							$showmaster = $_GET["showmaster"] ;
							$sqlpoh ="SELECT * FROM ganeshkumar_bjhims.pharmacy_purchaseorder  where PRC='".$rsnew["PRC"]."' and BATCHNO='".$rsnew["BatchNo"]."' and `BRCODE`='".PharmacyID()."' and  `HospID`='".HospitalID()."';";
							$resultspoh = $dbhelper->ExecuteRows($sqlpoh);
							$rsnew["ORDNO"] = PharmacyID();// $resultspoh[0]["ORDNO"];
							$rsnew["PRC"] =  $resultspoh[0]["PRC"];

						   // $rsnew["QTY"] =  $resultspoh[0]["QTY"];
						   // $rsnew["DT"] =  $resultspoh[0]["DT"];
						  //  $rsnew["PC"] =  $resultspoh[0]["PC"];
						  //  $rsnew["YM"] =  $resultspoh[0]["YM"];

							$rsnew["MFRCODE"] =  $resultspoh[0]["MFRCODE"];

						   // $rsnew["Stock"] =  $resultspoh[0]["Stock"];
						   // $rsnew["LastMonthSale"] =  $resultspoh[0]["LastMonthSale"];
						   // $rsnew["Printcheck"] =  $resultspoh[0]["Printcheck"];
						  //  $rsnew["id"] =  $resultspoh[0]["id"];
						  //  $rsnew["poid"] =  $resultspoh[0]["poid"];
						  //  $rsnew["grnid"] =  $resultspoh[0]["grnid"];

							$rsnew["BatchNo"] =  $resultspoh[0]["BatchNo"];
							$rsnew["ExpDate"] =  $resultspoh[0]["ExpDate"];
							$rsnew["PrName"] =  $resultspoh[0]["PrName"];

						//    $rsnew["Quantity"] =  $resultspoh[0]["Quantity"];
						  //  $rsnew["FreeQty"] = $resultspoh[0]["FreeQty"];

							$rsnew["ItemValue"] =  $resultspoh[0]["ItemValue"];

						//	$rsnew["Disc"] =  $resultspoh[0]["Disc"];
							//$rsnew["PTax"] =  $resultspoh[0]["PTax"];
					   //     $rsnew["MRP"] =  $resultspoh[0]["MRP"];  //===========
						  //  $rsnew["SalTax"] =  $resultspoh[0]["SalTax"];
						  //  $rsnew["PurValue"] =  $resultspoh[0]["PurValue"];
						   // $rsnew["PurRate"] =  $resultspoh[0]["PurRate"];

							$rsnew["SalRate"] =  $resultspoh[0]["SalRate"];

						 //   $rsnew["Discount"] =  $resultspoh[0]["Discount"];
							$rsnew["PSGST"] =  $resultspoh[0]["PSGST"];
							$rsnew["PCGST"] =  $resultspoh[0]["PCGST"];
							$rsnew["SSGST"] =  $resultspoh[0]["SSGST"];
							$rsnew["SCGST"] =  $resultspoh[0]["SCGST"];

						//    $rsnew["BRCODE"] =  $resultspoh[0]["BRCODE"]; //=======================
							$rsnew["HSN"] =  $resultspoh[0]["HSN"];
							$rsnew["Pack"] =  $resultspoh[0]["Pack"];
							$rsnew["PUnit"] =  $resultspoh[0]["PUnit"];
							$rsnew["SUnit"] =  $resultspoh[0]["SUnit"];
							$rsnew["GrnQuantity"] =  $resultspoh[0]["GrnQuantity"];
							$rsnew["GrnMRP"] =  $resultspoh[0]["GrnMRP"];

						 //   $rsnew["trid"] =  $resultspoh[0]["trid"];
		$sqlA = " UPDATE `ganeshkumar_bjhims`.`pharmacy_batchmas`
				SET `IQ`=  `IQ` + '".$rsnew["Quantity"]."' WHERE
				PRC='".$rsnew["PRC"]."' and BATCHNO='".$rsnew["BatchNo"]."' and
				`BRCODE`='".PharmacyID()."' and  `HospID`='".HospitalID()."';";
				$results = $dbhelper->ExecuteRows($sqlA);
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