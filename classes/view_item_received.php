<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for view_item_received
 */
class view_item_received extends DbTable
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
	public $PrName;
	public $MFRCODE;
	public $QTY;
	public $DT;
	public $PC;
	public $YM;
	public $Stock;
	public $LastMonthSale;
	public $Printcheck;
	public $poid;
	public $grnid;
	public $BatchNo;
	public $BillDate;
	public $ExpDate;
	public $Quantity;
	public $FreeQty;
	public $ItemValue;
	public $Disc;
	public $PTax;
	public $MRP;
	public $SalTax;
	public $PurValue;
	public $PurRate;
	public $SalRate;
	public $Discount;
	public $PSGST;
	public $PCGST;
	public $SSGST;
	public $SCGST;
	public $HSN;
	public $Pack;
	public $PUnit;
	public $SUnit;
	public $GrnQuantity;
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
	public $id;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'view_item_received';
		$this->TableName = 'view_item_received';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`view_item_received`";
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

		// ORDNO
		$this->ORDNO = new DbField('view_item_received', 'view_item_received', 'x_ORDNO', 'ORDNO', '`ORDNO`', '`ORDNO`', 200, -1, FALSE, '`ORDNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->ORDNO->Sortable = TRUE; // Allow sort
		$this->ORDNO->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->ORDNO->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->ORDNO->Lookup = new Lookup('ORDNO', 'hospital_store', FALSE, 'id', ["pharmacy","","",""], [], [], [], [], [], [], '', '');
		$this->fields['ORDNO'] = &$this->ORDNO;

		// BRCODE
		$this->BRCODE = new DbField('view_item_received', 'view_item_received', 'x_BRCODE', 'BRCODE', '`BRCODE`', '`BRCODE`', 3, -1, FALSE, '`BRCODE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->BRCODE->Sortable = TRUE; // Allow sort
		$this->BRCODE->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->BRCODE->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->BRCODE->Lookup = new Lookup('BRCODE', 'hospital_pharmacy', FALSE, 'id', ["pharmacy","","",""], [], [], [], [], [], [], '', '');
		$this->BRCODE->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['BRCODE'] = &$this->BRCODE;

		// PRC
		$this->PRC = new DbField('view_item_received', 'view_item_received', 'x_PRC', 'PRC', '`PRC`', '`PRC`', 200, -1, FALSE, '`PRC`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PRC->Sortable = TRUE; // Allow sort
		$this->fields['PRC'] = &$this->PRC;

		// PrName
		$this->PrName = new DbField('view_item_received', 'view_item_received', 'x_PrName', 'PrName', '`PrName`', '`PrName`', 200, -1, FALSE, '`PrName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PrName->Sortable = TRUE; // Allow sort
		$this->fields['PrName'] = &$this->PrName;

		// MFRCODE
		$this->MFRCODE = new DbField('view_item_received', 'view_item_received', 'x_MFRCODE', 'MFRCODE', '`MFRCODE`', '`MFRCODE`', 200, -1, FALSE, '`MFRCODE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MFRCODE->Sortable = TRUE; // Allow sort
		$this->fields['MFRCODE'] = &$this->MFRCODE;

		// QTY
		$this->QTY = new DbField('view_item_received', 'view_item_received', 'x_QTY', 'QTY', '`QTY`', '`QTY`', 3, -1, FALSE, '`QTY`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->QTY->Sortable = TRUE; // Allow sort
		$this->QTY->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['QTY'] = &$this->QTY;

		// DT
		$this->DT = new DbField('view_item_received', 'view_item_received', 'x_DT', 'DT', '`DT`', CastDateFieldForLike('`DT`', 0, "DB"), 135, 0, FALSE, '`DT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DT->Sortable = TRUE; // Allow sort
		$this->DT->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['DT'] = &$this->DT;

		// PC
		$this->PC = new DbField('view_item_received', 'view_item_received', 'x_PC', 'PC', '`PC`', '`PC`', 200, -1, FALSE, '`PC`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PC->Sortable = TRUE; // Allow sort
		$this->fields['PC'] = &$this->PC;

		// YM
		$this->YM = new DbField('view_item_received', 'view_item_received', 'x_YM', 'YM', '`YM`', '`YM`', 200, -1, FALSE, '`YM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->YM->Sortable = TRUE; // Allow sort
		$this->fields['YM'] = &$this->YM;

		// Stock
		$this->Stock = new DbField('view_item_received', 'view_item_received', 'x_Stock', 'Stock', '`Stock`', '`Stock`', 3, -1, FALSE, '`Stock`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Stock->Sortable = TRUE; // Allow sort
		$this->Stock->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Stock'] = &$this->Stock;

		// LastMonthSale
		$this->LastMonthSale = new DbField('view_item_received', 'view_item_received', 'x_LastMonthSale', 'LastMonthSale', '`LastMonthSale`', '`LastMonthSale`', 3, -1, FALSE, '`LastMonthSale`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->LastMonthSale->Sortable = TRUE; // Allow sort
		$this->LastMonthSale->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['LastMonthSale'] = &$this->LastMonthSale;

		// Printcheck
		$this->Printcheck = new DbField('view_item_received', 'view_item_received', 'x_Printcheck', 'Printcheck', '`Printcheck`', '`Printcheck`', 200, -1, FALSE, '`Printcheck`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Printcheck->Sortable = TRUE; // Allow sort
		$this->fields['Printcheck'] = &$this->Printcheck;

		// poid
		$this->poid = new DbField('view_item_received', 'view_item_received', 'x_poid', 'poid', '`poid`', '`poid`', 3, -1, FALSE, '`poid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->poid->Sortable = TRUE; // Allow sort
		$this->poid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['poid'] = &$this->poid;

		// grnid
		$this->grnid = new DbField('view_item_received', 'view_item_received', 'x_grnid', 'grnid', '`grnid`', '`grnid`', 3, -1, FALSE, '`grnid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->grnid->Sortable = TRUE; // Allow sort
		$this->grnid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['grnid'] = &$this->grnid;

		// BatchNo
		$this->BatchNo = new DbField('view_item_received', 'view_item_received', 'x_BatchNo', 'BatchNo', '`BatchNo`', '`BatchNo`', 200, -1, FALSE, '`BatchNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BatchNo->Sortable = TRUE; // Allow sort
		$this->fields['BatchNo'] = &$this->BatchNo;

		// BillDate
		$this->BillDate = new DbField('view_item_received', 'view_item_received', 'x_BillDate', 'BillDate', '`BillDate`', CastDateFieldForLike('`BillDate`', 7, "DB"), 135, 7, FALSE, '`BillDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BillDate->Sortable = TRUE; // Allow sort
		$this->BillDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['BillDate'] = &$this->BillDate;

		// ExpDate
		$this->ExpDate = new DbField('view_item_received', 'view_item_received', 'x_ExpDate', 'ExpDate', '`ExpDate`', CastDateFieldForLike('`ExpDate`', 7, "DB"), 135, 7, FALSE, '`ExpDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ExpDate->Sortable = TRUE; // Allow sort
		$this->ExpDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['ExpDate'] = &$this->ExpDate;

		// Quantity
		$this->Quantity = new DbField('view_item_received', 'view_item_received', 'x_Quantity', 'Quantity', '`Quantity`', '`Quantity`', 3, -1, FALSE, '`Quantity`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Quantity->Sortable = TRUE; // Allow sort
		$this->Quantity->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Quantity'] = &$this->Quantity;

		// FreeQty
		$this->FreeQty = new DbField('view_item_received', 'view_item_received', 'x_FreeQty', 'FreeQty', '`FreeQty`', '`FreeQty`', 3, -1, FALSE, '`FreeQty`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FreeQty->Sortable = TRUE; // Allow sort
		$this->FreeQty->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['FreeQty'] = &$this->FreeQty;

		// ItemValue
		$this->ItemValue = new DbField('view_item_received', 'view_item_received', 'x_ItemValue', 'ItemValue', '`ItemValue`', '`ItemValue`', 131, -1, FALSE, '`ItemValue`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ItemValue->Sortable = TRUE; // Allow sort
		$this->ItemValue->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['ItemValue'] = &$this->ItemValue;

		// Disc
		$this->Disc = new DbField('view_item_received', 'view_item_received', 'x_Disc', 'Disc', '`Disc`', '`Disc`', 200, -1, FALSE, '`Disc`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Disc->Sortable = TRUE; // Allow sort
		$this->Disc->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Disc'] = &$this->Disc;

		// PTax
		$this->PTax = new DbField('view_item_received', 'view_item_received', 'x_PTax', 'PTax', '`PTax`', '`PTax`', 131, -1, FALSE, '`PTax`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PTax->Sortable = TRUE; // Allow sort
		$this->PTax->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PTax'] = &$this->PTax;

		// MRP
		$this->MRP = new DbField('view_item_received', 'view_item_received', 'x_MRP', 'MRP', '`MRP`', '`MRP`', 131, -1, FALSE, '`MRP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MRP->Sortable = TRUE; // Allow sort
		$this->MRP->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['MRP'] = &$this->MRP;

		// SalTax
		$this->SalTax = new DbField('view_item_received', 'view_item_received', 'x_SalTax', 'SalTax', '`SalTax`', '`SalTax`', 131, -1, FALSE, '`SalTax`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SalTax->Sortable = TRUE; // Allow sort
		$this->SalTax->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['SalTax'] = &$this->SalTax;

		// PurValue
		$this->PurValue = new DbField('view_item_received', 'view_item_received', 'x_PurValue', 'PurValue', '`PurValue`', '`PurValue`', 131, -1, FALSE, '`PurValue`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PurValue->Sortable = TRUE; // Allow sort
		$this->PurValue->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PurValue'] = &$this->PurValue;

		// PurRate
		$this->PurRate = new DbField('view_item_received', 'view_item_received', 'x_PurRate', 'PurRate', '`PurRate`', '`PurRate`', 131, -1, FALSE, '`PurRate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PurRate->Sortable = TRUE; // Allow sort
		$this->PurRate->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PurRate'] = &$this->PurRate;

		// SalRate
		$this->SalRate = new DbField('view_item_received', 'view_item_received', 'x_SalRate', 'SalRate', '`SalRate`', '`SalRate`', 131, -1, FALSE, '`SalRate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SalRate->Sortable = TRUE; // Allow sort
		$this->SalRate->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['SalRate'] = &$this->SalRate;

		// Discount
		$this->Discount = new DbField('view_item_received', 'view_item_received', 'x_Discount', 'Discount', '`Discount`', '`Discount`', 131, -1, FALSE, '`Discount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Discount->Sortable = TRUE; // Allow sort
		$this->Discount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Discount'] = &$this->Discount;

		// PSGST
		$this->PSGST = new DbField('view_item_received', 'view_item_received', 'x_PSGST', 'PSGST', '`PSGST`', '`PSGST`', 131, -1, FALSE, '`PSGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PSGST->Sortable = TRUE; // Allow sort
		$this->PSGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PSGST'] = &$this->PSGST;

		// PCGST
		$this->PCGST = new DbField('view_item_received', 'view_item_received', 'x_PCGST', 'PCGST', '`PCGST`', '`PCGST`', 131, -1, FALSE, '`PCGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PCGST->Sortable = TRUE; // Allow sort
		$this->PCGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PCGST'] = &$this->PCGST;

		// SSGST
		$this->SSGST = new DbField('view_item_received', 'view_item_received', 'x_SSGST', 'SSGST', '`SSGST`', '`SSGST`', 131, -1, FALSE, '`SSGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SSGST->Sortable = TRUE; // Allow sort
		$this->SSGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['SSGST'] = &$this->SSGST;

		// SCGST
		$this->SCGST = new DbField('view_item_received', 'view_item_received', 'x_SCGST', 'SCGST', '`SCGST`', '`SCGST`', 131, -1, FALSE, '`SCGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SCGST->Sortable = TRUE; // Allow sort
		$this->SCGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['SCGST'] = &$this->SCGST;

		// HSN
		$this->HSN = new DbField('view_item_received', 'view_item_received', 'x_HSN', 'HSN', '`HSN`', '`HSN`', 200, -1, FALSE, '`HSN`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HSN->Sortable = TRUE; // Allow sort
		$this->fields['HSN'] = &$this->HSN;

		// Pack
		$this->Pack = new DbField('view_item_received', 'view_item_received', 'x_Pack', 'Pack', '`Pack`', '`Pack`', 200, -1, FALSE, '`Pack`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Pack->Sortable = TRUE; // Allow sort
		$this->fields['Pack'] = &$this->Pack;

		// PUnit
		$this->PUnit = new DbField('view_item_received', 'view_item_received', 'x_PUnit', 'PUnit', '`PUnit`', '`PUnit`', 3, -1, FALSE, '`PUnit`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PUnit->Sortable = TRUE; // Allow sort
		$this->PUnit->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['PUnit'] = &$this->PUnit;

		// SUnit
		$this->SUnit = new DbField('view_item_received', 'view_item_received', 'x_SUnit', 'SUnit', '`SUnit`', '`SUnit`', 3, -1, FALSE, '`SUnit`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SUnit->Sortable = TRUE; // Allow sort
		$this->SUnit->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['SUnit'] = &$this->SUnit;

		// GrnQuantity
		$this->GrnQuantity = new DbField('view_item_received', 'view_item_received', 'x_GrnQuantity', 'GrnQuantity', '`GrnQuantity`', '`GrnQuantity`', 3, -1, FALSE, '`GrnQuantity`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->GrnQuantity->Sortable = TRUE; // Allow sort
		$this->GrnQuantity->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['GrnQuantity'] = &$this->GrnQuantity;

		// GrnMRP
		$this->GrnMRP = new DbField('view_item_received', 'view_item_received', 'x_GrnMRP', 'GrnMRP', '`GrnMRP`', '`GrnMRP`', 131, -1, FALSE, '`GrnMRP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->GrnMRP->Sortable = TRUE; // Allow sort
		$this->GrnMRP->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['GrnMRP'] = &$this->GrnMRP;

		// trid
		$this->trid = new DbField('view_item_received', 'view_item_received', 'x_trid', 'trid', '`trid`', '`trid`', 3, -1, FALSE, '`trid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->trid->Sortable = TRUE; // Allow sort
		$this->trid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['trid'] = &$this->trid;

		// HospID
		$this->HospID = new DbField('view_item_received', 'view_item_received', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HospID'] = &$this->HospID;

		// CreatedBy
		$this->CreatedBy = new DbField('view_item_received', 'view_item_received', 'x_CreatedBy', 'CreatedBy', '`CreatedBy`', '`CreatedBy`', 3, -1, FALSE, '`CreatedBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CreatedBy->Sortable = TRUE; // Allow sort
		$this->CreatedBy->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['CreatedBy'] = &$this->CreatedBy;

		// CreatedDateTime
		$this->CreatedDateTime = new DbField('view_item_received', 'view_item_received', 'x_CreatedDateTime', 'CreatedDateTime', '`CreatedDateTime`', CastDateFieldForLike('`CreatedDateTime`', 0, "DB"), 135, 0, FALSE, '`CreatedDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CreatedDateTime->Sortable = TRUE; // Allow sort
		$this->CreatedDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['CreatedDateTime'] = &$this->CreatedDateTime;

		// ModifiedBy
		$this->ModifiedBy = new DbField('view_item_received', 'view_item_received', 'x_ModifiedBy', 'ModifiedBy', '`ModifiedBy`', '`ModifiedBy`', 3, -1, FALSE, '`ModifiedBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ModifiedBy->Sortable = TRUE; // Allow sort
		$this->ModifiedBy->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['ModifiedBy'] = &$this->ModifiedBy;

		// ModifiedDateTime
		$this->ModifiedDateTime = new DbField('view_item_received', 'view_item_received', 'x_ModifiedDateTime', 'ModifiedDateTime', '`ModifiedDateTime`', CastDateFieldForLike('`ModifiedDateTime`', 0, "DB"), 135, 0, FALSE, '`ModifiedDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ModifiedDateTime->Sortable = TRUE; // Allow sort
		$this->ModifiedDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['ModifiedDateTime'] = &$this->ModifiedDateTime;

		// grncreatedby
		$this->grncreatedby = new DbField('view_item_received', 'view_item_received', 'x_grncreatedby', 'grncreatedby', '`grncreatedby`', '`grncreatedby`', 3, -1, FALSE, '`grncreatedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->grncreatedby->Sortable = TRUE; // Allow sort
		$this->grncreatedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['grncreatedby'] = &$this->grncreatedby;

		// grncreatedDateTime
		$this->grncreatedDateTime = new DbField('view_item_received', 'view_item_received', 'x_grncreatedDateTime', 'grncreatedDateTime', '`grncreatedDateTime`', CastDateFieldForLike('`grncreatedDateTime`', 0, "DB"), 135, 0, FALSE, '`grncreatedDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->grncreatedDateTime->Sortable = TRUE; // Allow sort
		$this->grncreatedDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['grncreatedDateTime'] = &$this->grncreatedDateTime;

		// grnModifiedby
		$this->grnModifiedby = new DbField('view_item_received', 'view_item_received', 'x_grnModifiedby', 'grnModifiedby', '`grnModifiedby`', '`grnModifiedby`', 3, -1, FALSE, '`grnModifiedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->grnModifiedby->Sortable = TRUE; // Allow sort
		$this->grnModifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['grnModifiedby'] = &$this->grnModifiedby;

		// grnModifiedDateTime
		$this->grnModifiedDateTime = new DbField('view_item_received', 'view_item_received', 'x_grnModifiedDateTime', 'grnModifiedDateTime', '`grnModifiedDateTime`', CastDateFieldForLike('`grnModifiedDateTime`', 0, "DB"), 135, 0, FALSE, '`grnModifiedDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->grnModifiedDateTime->Sortable = TRUE; // Allow sort
		$this->grnModifiedDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['grnModifiedDateTime'] = &$this->grnModifiedDateTime;

		// Received
		$this->Received = new DbField('view_item_received', 'view_item_received', 'x_Received', 'Received', '`Received`', '`Received`', 200, -1, FALSE, '`Received`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->Received->Sortable = TRUE; // Allow sort
		$this->Received->Lookup = new Lookup('Received', 'view_item_received', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Received->OptionCount = 1;
		$this->fields['Received'] = &$this->Received;

		// id
		$this->id = new DbField('view_item_received', 'view_item_received', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`view_item_received`";
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
		$this->TableFilter = "`HospID`='".HospitalID()."'  and  `BRCODE`='".PharmacyID()."'   and  `Received`  is null and  `ORDNO` is not null ";
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
		return ($this->SqlOrderBy <> "") ? $this->SqlOrderBy : "";
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
		$this->ORDNO->DbValue = $row['ORDNO'];
		$this->BRCODE->DbValue = $row['BRCODE'];
		$this->PRC->DbValue = $row['PRC'];
		$this->PrName->DbValue = $row['PrName'];
		$this->MFRCODE->DbValue = $row['MFRCODE'];
		$this->QTY->DbValue = $row['QTY'];
		$this->DT->DbValue = $row['DT'];
		$this->PC->DbValue = $row['PC'];
		$this->YM->DbValue = $row['YM'];
		$this->Stock->DbValue = $row['Stock'];
		$this->LastMonthSale->DbValue = $row['LastMonthSale'];
		$this->Printcheck->DbValue = $row['Printcheck'];
		$this->poid->DbValue = $row['poid'];
		$this->grnid->DbValue = $row['grnid'];
		$this->BatchNo->DbValue = $row['BatchNo'];
		$this->BillDate->DbValue = $row['BillDate'];
		$this->ExpDate->DbValue = $row['ExpDate'];
		$this->Quantity->DbValue = $row['Quantity'];
		$this->FreeQty->DbValue = $row['FreeQty'];
		$this->ItemValue->DbValue = $row['ItemValue'];
		$this->Disc->DbValue = $row['Disc'];
		$this->PTax->DbValue = $row['PTax'];
		$this->MRP->DbValue = $row['MRP'];
		$this->SalTax->DbValue = $row['SalTax'];
		$this->PurValue->DbValue = $row['PurValue'];
		$this->PurRate->DbValue = $row['PurRate'];
		$this->SalRate->DbValue = $row['SalRate'];
		$this->Discount->DbValue = $row['Discount'];
		$this->PSGST->DbValue = $row['PSGST'];
		$this->PCGST->DbValue = $row['PCGST'];
		$this->SSGST->DbValue = $row['SSGST'];
		$this->SCGST->DbValue = $row['SCGST'];
		$this->HSN->DbValue = $row['HSN'];
		$this->Pack->DbValue = $row['Pack'];
		$this->PUnit->DbValue = $row['PUnit'];
		$this->SUnit->DbValue = $row['SUnit'];
		$this->GrnQuantity->DbValue = $row['GrnQuantity'];
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
		$this->id->DbValue = $row['id'];
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
			return "view_item_receivedlist.php";
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
		if ($pageName == "view_item_receivedview.php")
			return $Language->phrase("View");
		elseif ($pageName == "view_item_receivededit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "view_item_receivedadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "view_item_receivedlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("view_item_receivedview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_item_receivedview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "view_item_receivedadd.php?" . $this->getUrlParm($parm);
		else
			$url = "view_item_receivedadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("view_item_receivededit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("view_item_receivedadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("view_item_receiveddelete.php", $this->getUrlParm());
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
		$this->ORDNO->setDbValue($rs->fields('ORDNO'));
		$this->BRCODE->setDbValue($rs->fields('BRCODE'));
		$this->PRC->setDbValue($rs->fields('PRC'));
		$this->PrName->setDbValue($rs->fields('PrName'));
		$this->MFRCODE->setDbValue($rs->fields('MFRCODE'));
		$this->QTY->setDbValue($rs->fields('QTY'));
		$this->DT->setDbValue($rs->fields('DT'));
		$this->PC->setDbValue($rs->fields('PC'));
		$this->YM->setDbValue($rs->fields('YM'));
		$this->Stock->setDbValue($rs->fields('Stock'));
		$this->LastMonthSale->setDbValue($rs->fields('LastMonthSale'));
		$this->Printcheck->setDbValue($rs->fields('Printcheck'));
		$this->poid->setDbValue($rs->fields('poid'));
		$this->grnid->setDbValue($rs->fields('grnid'));
		$this->BatchNo->setDbValue($rs->fields('BatchNo'));
		$this->BillDate->setDbValue($rs->fields('BillDate'));
		$this->ExpDate->setDbValue($rs->fields('ExpDate'));
		$this->Quantity->setDbValue($rs->fields('Quantity'));
		$this->FreeQty->setDbValue($rs->fields('FreeQty'));
		$this->ItemValue->setDbValue($rs->fields('ItemValue'));
		$this->Disc->setDbValue($rs->fields('Disc'));
		$this->PTax->setDbValue($rs->fields('PTax'));
		$this->MRP->setDbValue($rs->fields('MRP'));
		$this->SalTax->setDbValue($rs->fields('SalTax'));
		$this->PurValue->setDbValue($rs->fields('PurValue'));
		$this->PurRate->setDbValue($rs->fields('PurRate'));
		$this->SalRate->setDbValue($rs->fields('SalRate'));
		$this->Discount->setDbValue($rs->fields('Discount'));
		$this->PSGST->setDbValue($rs->fields('PSGST'));
		$this->PCGST->setDbValue($rs->fields('PCGST'));
		$this->SSGST->setDbValue($rs->fields('SSGST'));
		$this->SCGST->setDbValue($rs->fields('SCGST'));
		$this->HSN->setDbValue($rs->fields('HSN'));
		$this->Pack->setDbValue($rs->fields('Pack'));
		$this->PUnit->setDbValue($rs->fields('PUnit'));
		$this->SUnit->setDbValue($rs->fields('SUnit'));
		$this->GrnQuantity->setDbValue($rs->fields('GrnQuantity'));
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
		$this->id->setDbValue($rs->fields('id'));
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
		// PrName
		// MFRCODE
		// QTY
		// DT
		// PC
		// YM
		// Stock
		// LastMonthSale
		// Printcheck
		// poid
		// grnid
		// BatchNo
		// BillDate
		// ExpDate
		// Quantity
		// FreeQty
		// ItemValue
		// Disc
		// PTax
		// MRP
		// SalTax
		// PurValue
		// PurRate
		// SalRate
		// Discount
		// PSGST
		// PCGST
		// SSGST
		// SCGST
		// HSN
		// Pack
		// PUnit
		// SUnit
		// GrnQuantity
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
		// id
		// ORDNO

		$curVal = strval($this->ORDNO->CurrentValue);
		if ($curVal <> "") {
			$this->ORDNO->ViewValue = $this->ORDNO->lookupCacheOption($curVal);
			if ($this->ORDNO->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->ORDNO->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
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
		$curVal = strval($this->BRCODE->CurrentValue);
		if ($curVal <> "") {
			$this->BRCODE->ViewValue = $this->BRCODE->lookupCacheOption($curVal);
			if ($this->BRCODE->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->BRCODE->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
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

		// PrName
		$this->PrName->ViewValue = $this->PrName->CurrentValue;
		$this->PrName->ViewCustomAttributes = "";

		// MFRCODE
		$this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
		$this->MFRCODE->ViewCustomAttributes = "";

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

		// LastMonthSale
		$this->LastMonthSale->ViewValue = $this->LastMonthSale->CurrentValue;
		$this->LastMonthSale->ViewValue = FormatNumber($this->LastMonthSale->ViewValue, 0, -2, -2, -2);
		$this->LastMonthSale->ViewCustomAttributes = "";

		// Printcheck
		$this->Printcheck->ViewValue = $this->Printcheck->CurrentValue;
		$this->Printcheck->ViewCustomAttributes = "";

		// poid
		$this->poid->ViewValue = $this->poid->CurrentValue;
		$this->poid->ViewValue = FormatNumber($this->poid->ViewValue, 0, -2, -2, -2);
		$this->poid->ViewCustomAttributes = "";

		// grnid
		$this->grnid->ViewValue = $this->grnid->CurrentValue;
		$this->grnid->ViewValue = FormatNumber($this->grnid->ViewValue, 0, -2, -2, -2);
		$this->grnid->ViewCustomAttributes = "";

		// BatchNo
		$this->BatchNo->ViewValue = $this->BatchNo->CurrentValue;
		$this->BatchNo->ViewCustomAttributes = "";

		// BillDate
		$this->BillDate->ViewValue = $this->BillDate->CurrentValue;
		$this->BillDate->ViewValue = FormatDateTime($this->BillDate->ViewValue, 7);
		$this->BillDate->ViewCustomAttributes = "";

		// ExpDate
		$this->ExpDate->ViewValue = $this->ExpDate->CurrentValue;
		$this->ExpDate->ViewValue = FormatDateTime($this->ExpDate->ViewValue, 7);
		$this->ExpDate->ViewCustomAttributes = "";

		// Quantity
		$this->Quantity->ViewValue = $this->Quantity->CurrentValue;
		$this->Quantity->ViewValue = FormatNumber($this->Quantity->ViewValue, 0, -2, -2, -2);
		$this->Quantity->ViewCustomAttributes = "";

		// FreeQty
		$this->FreeQty->ViewValue = $this->FreeQty->CurrentValue;
		$this->FreeQty->ViewValue = FormatNumber($this->FreeQty->ViewValue, 0, -2, -2, -2);
		$this->FreeQty->ViewCustomAttributes = "";

		// ItemValue
		$this->ItemValue->ViewValue = $this->ItemValue->CurrentValue;
		$this->ItemValue->ViewValue = FormatNumber($this->ItemValue->ViewValue, 2, -2, -2, -2);
		$this->ItemValue->ViewCustomAttributes = "";

		// Disc
		$this->Disc->ViewValue = $this->Disc->CurrentValue;
		$this->Disc->ViewCustomAttributes = "";

		// PTax
		$this->PTax->ViewValue = $this->PTax->CurrentValue;
		$this->PTax->ViewValue = FormatNumber($this->PTax->ViewValue, 2, -2, -2, -2);
		$this->PTax->ViewCustomAttributes = "";

		// MRP
		$this->MRP->ViewValue = $this->MRP->CurrentValue;
		$this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
		$this->MRP->ViewCustomAttributes = "";

		// SalTax
		$this->SalTax->ViewValue = $this->SalTax->CurrentValue;
		$this->SalTax->ViewValue = FormatNumber($this->SalTax->ViewValue, 2, -2, -2, -2);
		$this->SalTax->ViewCustomAttributes = "";

		// PurValue
		$this->PurValue->ViewValue = $this->PurValue->CurrentValue;
		$this->PurValue->ViewValue = FormatNumber($this->PurValue->ViewValue, 2, -2, -2, -2);
		$this->PurValue->ViewCustomAttributes = "";

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

		// PSGST
		$this->PSGST->ViewValue = $this->PSGST->CurrentValue;
		$this->PSGST->ViewValue = FormatNumber($this->PSGST->ViewValue, 2, -2, -2, -2);
		$this->PSGST->ViewCustomAttributes = "";

		// PCGST
		$this->PCGST->ViewValue = $this->PCGST->CurrentValue;
		$this->PCGST->ViewValue = FormatNumber($this->PCGST->ViewValue, 2, -2, -2, -2);
		$this->PCGST->ViewCustomAttributes = "";

		// SSGST
		$this->SSGST->ViewValue = $this->SSGST->CurrentValue;
		$this->SSGST->ViewValue = FormatNumber($this->SSGST->ViewValue, 2, -2, -2, -2);
		$this->SSGST->ViewCustomAttributes = "";

		// SCGST
		$this->SCGST->ViewValue = $this->SCGST->CurrentValue;
		$this->SCGST->ViewValue = FormatNumber($this->SCGST->ViewValue, 2, -2, -2, -2);
		$this->SCGST->ViewCustomAttributes = "";

		// HSN
		$this->HSN->ViewValue = $this->HSN->CurrentValue;
		$this->HSN->ViewCustomAttributes = "";

		// Pack
		$this->Pack->ViewValue = $this->Pack->CurrentValue;
		$this->Pack->ViewCustomAttributes = "";

		// PUnit
		$this->PUnit->ViewValue = $this->PUnit->CurrentValue;
		$this->PUnit->ViewValue = FormatNumber($this->PUnit->ViewValue, 0, -2, -2, -2);
		$this->PUnit->ViewCustomAttributes = "";

		// SUnit
		$this->SUnit->ViewValue = $this->SUnit->CurrentValue;
		$this->SUnit->ViewValue = FormatNumber($this->SUnit->ViewValue, 0, -2, -2, -2);
		$this->SUnit->ViewCustomAttributes = "";

		// GrnQuantity
		$this->GrnQuantity->ViewValue = $this->GrnQuantity->CurrentValue;
		$this->GrnQuantity->ViewValue = FormatNumber($this->GrnQuantity->ViewValue, 0, -2, -2, -2);
		$this->GrnQuantity->ViewCustomAttributes = "";

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
		if (strval($this->Received->CurrentValue) <> "") {
			$this->Received->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->Received->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->Received->ViewValue->add($this->Received->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->Received->ViewValue = NULL;
		}
		$this->Received->ViewCustomAttributes = "";

		// id
		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

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

		// PrName
		$this->PrName->LinkCustomAttributes = "";
		$this->PrName->HrefValue = "";
		$this->PrName->TooltipValue = "";

		// MFRCODE
		$this->MFRCODE->LinkCustomAttributes = "";
		$this->MFRCODE->HrefValue = "";
		$this->MFRCODE->TooltipValue = "";

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

		// LastMonthSale
		$this->LastMonthSale->LinkCustomAttributes = "";
		$this->LastMonthSale->HrefValue = "";
		$this->LastMonthSale->TooltipValue = "";

		// Printcheck
		$this->Printcheck->LinkCustomAttributes = "";
		$this->Printcheck->HrefValue = "";
		$this->Printcheck->TooltipValue = "";

		// poid
		$this->poid->LinkCustomAttributes = "";
		$this->poid->HrefValue = "";
		$this->poid->TooltipValue = "";

		// grnid
		$this->grnid->LinkCustomAttributes = "";
		$this->grnid->HrefValue = "";
		$this->grnid->TooltipValue = "";

		// BatchNo
		$this->BatchNo->LinkCustomAttributes = "";
		$this->BatchNo->HrefValue = "";
		$this->BatchNo->TooltipValue = "";

		// BillDate
		$this->BillDate->LinkCustomAttributes = "";
		$this->BillDate->HrefValue = "";
		$this->BillDate->TooltipValue = "";

		// ExpDate
		$this->ExpDate->LinkCustomAttributes = "";
		$this->ExpDate->HrefValue = "";
		$this->ExpDate->TooltipValue = "";

		// Quantity
		$this->Quantity->LinkCustomAttributes = "";
		$this->Quantity->HrefValue = "";
		$this->Quantity->TooltipValue = "";

		// FreeQty
		$this->FreeQty->LinkCustomAttributes = "";
		$this->FreeQty->HrefValue = "";
		$this->FreeQty->TooltipValue = "";

		// ItemValue
		$this->ItemValue->LinkCustomAttributes = "";
		$this->ItemValue->HrefValue = "";
		$this->ItemValue->TooltipValue = "";

		// Disc
		$this->Disc->LinkCustomAttributes = "";
		$this->Disc->HrefValue = "";
		$this->Disc->TooltipValue = "";

		// PTax
		$this->PTax->LinkCustomAttributes = "";
		$this->PTax->HrefValue = "";
		$this->PTax->TooltipValue = "";

		// MRP
		$this->MRP->LinkCustomAttributes = "";
		$this->MRP->HrefValue = "";
		$this->MRP->TooltipValue = "";

		// SalTax
		$this->SalTax->LinkCustomAttributes = "";
		$this->SalTax->HrefValue = "";
		$this->SalTax->TooltipValue = "";

		// PurValue
		$this->PurValue->LinkCustomAttributes = "";
		$this->PurValue->HrefValue = "";
		$this->PurValue->TooltipValue = "";

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

		// PSGST
		$this->PSGST->LinkCustomAttributes = "";
		$this->PSGST->HrefValue = "";
		$this->PSGST->TooltipValue = "";

		// PCGST
		$this->PCGST->LinkCustomAttributes = "";
		$this->PCGST->HrefValue = "";
		$this->PCGST->TooltipValue = "";

		// SSGST
		$this->SSGST->LinkCustomAttributes = "";
		$this->SSGST->HrefValue = "";
		$this->SSGST->TooltipValue = "";

		// SCGST
		$this->SCGST->LinkCustomAttributes = "";
		$this->SCGST->HrefValue = "";
		$this->SCGST->TooltipValue = "";

		// HSN
		$this->HSN->LinkCustomAttributes = "";
		$this->HSN->HrefValue = "";
		$this->HSN->TooltipValue = "";

		// Pack
		$this->Pack->LinkCustomAttributes = "";
		$this->Pack->HrefValue = "";
		$this->Pack->TooltipValue = "";

		// PUnit
		$this->PUnit->LinkCustomAttributes = "";
		$this->PUnit->HrefValue = "";
		$this->PUnit->TooltipValue = "";

		// SUnit
		$this->SUnit->LinkCustomAttributes = "";
		$this->SUnit->HrefValue = "";
		$this->SUnit->TooltipValue = "";

		// GrnQuantity
		$this->GrnQuantity->LinkCustomAttributes = "";
		$this->GrnQuantity->HrefValue = "";
		$this->GrnQuantity->TooltipValue = "";

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

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

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
		$this->ORDNO->EditAttrs["class"] = "form-control";
		$this->ORDNO->EditCustomAttributes = "";
		$curVal = strval($this->ORDNO->CurrentValue);
		if ($curVal <> "") {
			$this->ORDNO->EditValue = $this->ORDNO->lookupCacheOption($curVal);
			if ($this->ORDNO->EditValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->ORDNO->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->ORDNO->EditValue = $this->ORDNO->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->ORDNO->EditValue = $this->ORDNO->CurrentValue;
				}
			}
		} else {
			$this->ORDNO->EditValue = NULL;
		}
		$this->ORDNO->ViewCustomAttributes = "";

		// BRCODE
		$this->BRCODE->EditAttrs["class"] = "form-control";
		$this->BRCODE->EditCustomAttributes = "";
		$curVal = strval($this->BRCODE->CurrentValue);
		if ($curVal <> "") {
			$this->BRCODE->EditValue = $this->BRCODE->lookupCacheOption($curVal);
			if ($this->BRCODE->EditValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->BRCODE->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->BRCODE->EditValue = $this->BRCODE->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->BRCODE->EditValue = $this->BRCODE->CurrentValue;
				}
			}
		} else {
			$this->BRCODE->EditValue = NULL;
		}
		$this->BRCODE->ViewCustomAttributes = "";

		// PRC
		$this->PRC->EditAttrs["class"] = "form-control";
		$this->PRC->EditCustomAttributes = "";
		$this->PRC->EditValue = $this->PRC->CurrentValue;
		$this->PRC->ViewCustomAttributes = "";

		// PrName
		$this->PrName->EditAttrs["class"] = "form-control";
		$this->PrName->EditCustomAttributes = "";
		$this->PrName->EditValue = $this->PrName->CurrentValue;
		$this->PrName->ViewCustomAttributes = "";

		// MFRCODE
		$this->MFRCODE->EditAttrs["class"] = "form-control";
		$this->MFRCODE->EditCustomAttributes = "";
		$this->MFRCODE->EditValue = $this->MFRCODE->CurrentValue;
		$this->MFRCODE->ViewCustomAttributes = "";

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
		if (REMOVE_XSS)
			$this->PC->CurrentValue = HtmlDecode($this->PC->CurrentValue);
		$this->PC->EditValue = $this->PC->CurrentValue;
		$this->PC->PlaceHolder = RemoveHtml($this->PC->caption());

		// YM
		$this->YM->EditAttrs["class"] = "form-control";
		$this->YM->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->YM->CurrentValue = HtmlDecode($this->YM->CurrentValue);
		$this->YM->EditValue = $this->YM->CurrentValue;
		$this->YM->PlaceHolder = RemoveHtml($this->YM->caption());

		// Stock
		$this->Stock->EditAttrs["class"] = "form-control";
		$this->Stock->EditCustomAttributes = "";
		$this->Stock->EditValue = $this->Stock->CurrentValue;
		$this->Stock->PlaceHolder = RemoveHtml($this->Stock->caption());

		// LastMonthSale
		$this->LastMonthSale->EditAttrs["class"] = "form-control";
		$this->LastMonthSale->EditCustomAttributes = "";
		$this->LastMonthSale->EditValue = $this->LastMonthSale->CurrentValue;
		$this->LastMonthSale->PlaceHolder = RemoveHtml($this->LastMonthSale->caption());

		// Printcheck
		$this->Printcheck->EditAttrs["class"] = "form-control";
		$this->Printcheck->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Printcheck->CurrentValue = HtmlDecode($this->Printcheck->CurrentValue);
		$this->Printcheck->EditValue = $this->Printcheck->CurrentValue;
		$this->Printcheck->PlaceHolder = RemoveHtml($this->Printcheck->caption());

		// poid
		$this->poid->EditAttrs["class"] = "form-control";
		$this->poid->EditCustomAttributes = "";
		$this->poid->EditValue = $this->poid->CurrentValue;
		$this->poid->PlaceHolder = RemoveHtml($this->poid->caption());

		// grnid
		$this->grnid->EditAttrs["class"] = "form-control";
		$this->grnid->EditCustomAttributes = "";
		$this->grnid->EditValue = $this->grnid->CurrentValue;
		$this->grnid->PlaceHolder = RemoveHtml($this->grnid->caption());

		// BatchNo
		$this->BatchNo->EditAttrs["class"] = "form-control";
		$this->BatchNo->EditCustomAttributes = "";
		$this->BatchNo->EditValue = $this->BatchNo->CurrentValue;
		$this->BatchNo->ViewCustomAttributes = "";

		// BillDate
		$this->BillDate->EditAttrs["class"] = "form-control";
		$this->BillDate->EditCustomAttributes = "";
		$this->BillDate->EditValue = $this->BillDate->CurrentValue;
		$this->BillDate->EditValue = FormatDateTime($this->BillDate->EditValue, 7);
		$this->BillDate->ViewCustomAttributes = "";

		// ExpDate
		$this->ExpDate->EditAttrs["class"] = "form-control";
		$this->ExpDate->EditCustomAttributes = "";
		$this->ExpDate->EditValue = $this->ExpDate->CurrentValue;
		$this->ExpDate->EditValue = FormatDateTime($this->ExpDate->EditValue, 7);
		$this->ExpDate->ViewCustomAttributes = "";

		// Quantity
		$this->Quantity->EditAttrs["class"] = "form-control";
		$this->Quantity->EditCustomAttributes = "";
		$this->Quantity->EditValue = $this->Quantity->CurrentValue;
		$this->Quantity->EditValue = FormatNumber($this->Quantity->EditValue, 0, -2, -2, -2);
		$this->Quantity->ViewCustomAttributes = "";

		// FreeQty
		$this->FreeQty->EditAttrs["class"] = "form-control";
		$this->FreeQty->EditCustomAttributes = "";
		$this->FreeQty->EditValue = $this->FreeQty->CurrentValue;
		$this->FreeQty->EditValue = FormatNumber($this->FreeQty->EditValue, 0, -2, -2, -2);
		$this->FreeQty->ViewCustomAttributes = "";

		// ItemValue
		$this->ItemValue->EditAttrs["class"] = "form-control";
		$this->ItemValue->EditCustomAttributes = "";
		$this->ItemValue->EditValue = $this->ItemValue->CurrentValue;
		$this->ItemValue->EditValue = FormatNumber($this->ItemValue->EditValue, 2, -2, -2, -2);
		$this->ItemValue->ViewCustomAttributes = "";

		// Disc
		$this->Disc->EditAttrs["class"] = "form-control";
		$this->Disc->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Disc->CurrentValue = HtmlDecode($this->Disc->CurrentValue);
		$this->Disc->EditValue = $this->Disc->CurrentValue;
		$this->Disc->PlaceHolder = RemoveHtml($this->Disc->caption());

		// PTax
		$this->PTax->EditAttrs["class"] = "form-control";
		$this->PTax->EditCustomAttributes = "";
		$this->PTax->EditValue = $this->PTax->CurrentValue;
		$this->PTax->PlaceHolder = RemoveHtml($this->PTax->caption());
		if (strval($this->PTax->EditValue) <> "" && is_numeric($this->PTax->EditValue))
			$this->PTax->EditValue = FormatNumber($this->PTax->EditValue, -2, -2, -2, -2);

		// MRP
		$this->MRP->EditAttrs["class"] = "form-control";
		$this->MRP->EditCustomAttributes = "";
		$this->MRP->EditValue = $this->MRP->CurrentValue;
		$this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());
		if (strval($this->MRP->EditValue) <> "" && is_numeric($this->MRP->EditValue))
			$this->MRP->EditValue = FormatNumber($this->MRP->EditValue, -2, -2, -2, -2);

		// SalTax
		$this->SalTax->EditAttrs["class"] = "form-control";
		$this->SalTax->EditCustomAttributes = "";
		$this->SalTax->EditValue = $this->SalTax->CurrentValue;
		$this->SalTax->PlaceHolder = RemoveHtml($this->SalTax->caption());
		if (strval($this->SalTax->EditValue) <> "" && is_numeric($this->SalTax->EditValue))
			$this->SalTax->EditValue = FormatNumber($this->SalTax->EditValue, -2, -2, -2, -2);

		// PurValue
		$this->PurValue->EditAttrs["class"] = "form-control";
		$this->PurValue->EditCustomAttributes = "";
		$this->PurValue->EditValue = $this->PurValue->CurrentValue;
		$this->PurValue->PlaceHolder = RemoveHtml($this->PurValue->caption());
		if (strval($this->PurValue->EditValue) <> "" && is_numeric($this->PurValue->EditValue))
			$this->PurValue->EditValue = FormatNumber($this->PurValue->EditValue, -2, -2, -2, -2);

		// PurRate
		$this->PurRate->EditAttrs["class"] = "form-control";
		$this->PurRate->EditCustomAttributes = "";
		$this->PurRate->EditValue = $this->PurRate->CurrentValue;
		$this->PurRate->PlaceHolder = RemoveHtml($this->PurRate->caption());
		if (strval($this->PurRate->EditValue) <> "" && is_numeric($this->PurRate->EditValue))
			$this->PurRate->EditValue = FormatNumber($this->PurRate->EditValue, -2, -2, -2, -2);

		// SalRate
		$this->SalRate->EditAttrs["class"] = "form-control";
		$this->SalRate->EditCustomAttributes = "";
		$this->SalRate->EditValue = $this->SalRate->CurrentValue;
		$this->SalRate->PlaceHolder = RemoveHtml($this->SalRate->caption());
		if (strval($this->SalRate->EditValue) <> "" && is_numeric($this->SalRate->EditValue))
			$this->SalRate->EditValue = FormatNumber($this->SalRate->EditValue, -2, -2, -2, -2);

		// Discount
		$this->Discount->EditAttrs["class"] = "form-control";
		$this->Discount->EditCustomAttributes = "";
		$this->Discount->EditValue = $this->Discount->CurrentValue;
		$this->Discount->PlaceHolder = RemoveHtml($this->Discount->caption());
		if (strval($this->Discount->EditValue) <> "" && is_numeric($this->Discount->EditValue))
			$this->Discount->EditValue = FormatNumber($this->Discount->EditValue, -2, -2, -2, -2);

		// PSGST
		$this->PSGST->EditAttrs["class"] = "form-control";
		$this->PSGST->EditCustomAttributes = "";
		$this->PSGST->EditValue = $this->PSGST->CurrentValue;
		$this->PSGST->PlaceHolder = RemoveHtml($this->PSGST->caption());
		if (strval($this->PSGST->EditValue) <> "" && is_numeric($this->PSGST->EditValue))
			$this->PSGST->EditValue = FormatNumber($this->PSGST->EditValue, -2, -2, -2, -2);

		// PCGST
		$this->PCGST->EditAttrs["class"] = "form-control";
		$this->PCGST->EditCustomAttributes = "";
		$this->PCGST->EditValue = $this->PCGST->CurrentValue;
		$this->PCGST->PlaceHolder = RemoveHtml($this->PCGST->caption());
		if (strval($this->PCGST->EditValue) <> "" && is_numeric($this->PCGST->EditValue))
			$this->PCGST->EditValue = FormatNumber($this->PCGST->EditValue, -2, -2, -2, -2);

		// SSGST
		$this->SSGST->EditAttrs["class"] = "form-control";
		$this->SSGST->EditCustomAttributes = "";
		$this->SSGST->EditValue = $this->SSGST->CurrentValue;
		$this->SSGST->PlaceHolder = RemoveHtml($this->SSGST->caption());
		if (strval($this->SSGST->EditValue) <> "" && is_numeric($this->SSGST->EditValue))
			$this->SSGST->EditValue = FormatNumber($this->SSGST->EditValue, -2, -2, -2, -2);

		// SCGST
		$this->SCGST->EditAttrs["class"] = "form-control";
		$this->SCGST->EditCustomAttributes = "";
		$this->SCGST->EditValue = $this->SCGST->CurrentValue;
		$this->SCGST->PlaceHolder = RemoveHtml($this->SCGST->caption());
		if (strval($this->SCGST->EditValue) <> "" && is_numeric($this->SCGST->EditValue))
			$this->SCGST->EditValue = FormatNumber($this->SCGST->EditValue, -2, -2, -2, -2);

		// HSN
		$this->HSN->EditAttrs["class"] = "form-control";
		$this->HSN->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->HSN->CurrentValue = HtmlDecode($this->HSN->CurrentValue);
		$this->HSN->EditValue = $this->HSN->CurrentValue;
		$this->HSN->PlaceHolder = RemoveHtml($this->HSN->caption());

		// Pack
		$this->Pack->EditAttrs["class"] = "form-control";
		$this->Pack->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Pack->CurrentValue = HtmlDecode($this->Pack->CurrentValue);
		$this->Pack->EditValue = $this->Pack->CurrentValue;
		$this->Pack->PlaceHolder = RemoveHtml($this->Pack->caption());

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

		// GrnQuantity
		$this->GrnQuantity->EditAttrs["class"] = "form-control";
		$this->GrnQuantity->EditCustomAttributes = "";
		$this->GrnQuantity->EditValue = $this->GrnQuantity->CurrentValue;
		$this->GrnQuantity->PlaceHolder = RemoveHtml($this->GrnQuantity->caption());

		// GrnMRP
		$this->GrnMRP->EditAttrs["class"] = "form-control";
		$this->GrnMRP->EditCustomAttributes = "";
		$this->GrnMRP->EditValue = $this->GrnMRP->CurrentValue;
		$this->GrnMRP->PlaceHolder = RemoveHtml($this->GrnMRP->caption());
		if (strval($this->GrnMRP->EditValue) <> "" && is_numeric($this->GrnMRP->EditValue))
			$this->GrnMRP->EditValue = FormatNumber($this->GrnMRP->EditValue, -2, -2, -2, -2);

		// trid
		$this->trid->EditAttrs["class"] = "form-control";
		$this->trid->EditCustomAttributes = "";
		$this->trid->EditValue = $this->trid->CurrentValue;
		$this->trid->PlaceHolder = RemoveHtml($this->trid->caption());

		// HospID
		$this->HospID->EditAttrs["class"] = "form-control";
		$this->HospID->EditCustomAttributes = "";
		$this->HospID->EditValue = $this->HospID->CurrentValue;
		$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

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
		$this->grncreatedby->EditAttrs["class"] = "form-control";
		$this->grncreatedby->EditCustomAttributes = "";
		$this->grncreatedby->EditValue = $this->grncreatedby->CurrentValue;
		$this->grncreatedby->PlaceHolder = RemoveHtml($this->grncreatedby->caption());

		// grncreatedDateTime
		$this->grncreatedDateTime->EditAttrs["class"] = "form-control";
		$this->grncreatedDateTime->EditCustomAttributes = "";
		$this->grncreatedDateTime->EditValue = FormatDateTime($this->grncreatedDateTime->CurrentValue, 8);
		$this->grncreatedDateTime->PlaceHolder = RemoveHtml($this->grncreatedDateTime->caption());

		// grnModifiedby
		$this->grnModifiedby->EditAttrs["class"] = "form-control";
		$this->grnModifiedby->EditCustomAttributes = "";
		$this->grnModifiedby->EditValue = $this->grnModifiedby->CurrentValue;
		$this->grnModifiedby->PlaceHolder = RemoveHtml($this->grnModifiedby->caption());

		// grnModifiedDateTime
		$this->grnModifiedDateTime->EditAttrs["class"] = "form-control";
		$this->grnModifiedDateTime->EditCustomAttributes = "";
		$this->grnModifiedDateTime->EditValue = FormatDateTime($this->grnModifiedDateTime->CurrentValue, 8);
		$this->grnModifiedDateTime->PlaceHolder = RemoveHtml($this->grnModifiedDateTime->caption());

		// Received
		$this->Received->EditCustomAttributes = "";
		$this->Received->EditValue = $this->Received->options(FALSE);

		// id
		$this->id->EditAttrs["class"] = "form-control";
		$this->id->EditCustomAttributes = "";
		$this->id->EditValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	public function aggregateListRowValues()
	{
			$this->PRC->Count++; // Increment count
			if (is_numeric($this->Quantity->CurrentValue))
				$this->Quantity->Total += $this->Quantity->CurrentValue; // Accumulate total
	}

	// Aggregate list row (for rendering)
	public function aggregateListRow()
	{
			$this->PRC->CurrentValue = $this->PRC->Count;
			$this->PRC->ViewValue = $this->PRC->CurrentValue;
			$this->PRC->ViewCustomAttributes = "";
			$this->PRC->HrefValue = ""; // Clear href value
			$this->Quantity->CurrentValue = $this->Quantity->Total;
			$this->Quantity->ViewValue = $this->Quantity->CurrentValue;
			$this->Quantity->ViewValue = FormatNumber($this->Quantity->ViewValue, 0, -2, -2, -2);
			$this->Quantity->ViewCustomAttributes = "";
			$this->Quantity->HrefValue = ""; // Clear href value

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
					$doc->exportCaption($this->PrName);
					$doc->exportCaption($this->MFRCODE);
					$doc->exportCaption($this->QTY);
					$doc->exportCaption($this->DT);
					$doc->exportCaption($this->PC);
					$doc->exportCaption($this->YM);
					$doc->exportCaption($this->Stock);
					$doc->exportCaption($this->LastMonthSale);
					$doc->exportCaption($this->Printcheck);
					$doc->exportCaption($this->poid);
					$doc->exportCaption($this->grnid);
					$doc->exportCaption($this->BatchNo);
					$doc->exportCaption($this->BillDate);
					$doc->exportCaption($this->ExpDate);
					$doc->exportCaption($this->Quantity);
					$doc->exportCaption($this->FreeQty);
					$doc->exportCaption($this->ItemValue);
					$doc->exportCaption($this->Disc);
					$doc->exportCaption($this->PTax);
					$doc->exportCaption($this->MRP);
					$doc->exportCaption($this->SalTax);
					$doc->exportCaption($this->PurValue);
					$doc->exportCaption($this->PurRate);
					$doc->exportCaption($this->SalRate);
					$doc->exportCaption($this->Discount);
					$doc->exportCaption($this->PSGST);
					$doc->exportCaption($this->PCGST);
					$doc->exportCaption($this->SSGST);
					$doc->exportCaption($this->SCGST);
					$doc->exportCaption($this->HSN);
					$doc->exportCaption($this->Pack);
					$doc->exportCaption($this->PUnit);
					$doc->exportCaption($this->SUnit);
					$doc->exportCaption($this->GrnQuantity);
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
					$doc->exportCaption($this->id);
				} else {
					$doc->exportCaption($this->ORDNO);
					$doc->exportCaption($this->BRCODE);
					$doc->exportCaption($this->PRC);
					$doc->exportCaption($this->PrName);
					$doc->exportCaption($this->MFRCODE);
					$doc->exportCaption($this->QTY);
					$doc->exportCaption($this->DT);
					$doc->exportCaption($this->PC);
					$doc->exportCaption($this->YM);
					$doc->exportCaption($this->Stock);
					$doc->exportCaption($this->LastMonthSale);
					$doc->exportCaption($this->Printcheck);
					$doc->exportCaption($this->poid);
					$doc->exportCaption($this->grnid);
					$doc->exportCaption($this->BatchNo);
					$doc->exportCaption($this->BillDate);
					$doc->exportCaption($this->ExpDate);
					$doc->exportCaption($this->Quantity);
					$doc->exportCaption($this->FreeQty);
					$doc->exportCaption($this->ItemValue);
					$doc->exportCaption($this->Disc);
					$doc->exportCaption($this->PTax);
					$doc->exportCaption($this->MRP);
					$doc->exportCaption($this->SalTax);
					$doc->exportCaption($this->PurValue);
					$doc->exportCaption($this->PurRate);
					$doc->exportCaption($this->SalRate);
					$doc->exportCaption($this->Discount);
					$doc->exportCaption($this->PSGST);
					$doc->exportCaption($this->PCGST);
					$doc->exportCaption($this->SSGST);
					$doc->exportCaption($this->SCGST);
					$doc->exportCaption($this->HSN);
					$doc->exportCaption($this->Pack);
					$doc->exportCaption($this->PUnit);
					$doc->exportCaption($this->SUnit);
					$doc->exportCaption($this->GrnQuantity);
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
					$doc->exportCaption($this->id);
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
						$doc->exportField($this->ORDNO);
						$doc->exportField($this->BRCODE);
						$doc->exportField($this->PRC);
						$doc->exportField($this->PrName);
						$doc->exportField($this->MFRCODE);
						$doc->exportField($this->QTY);
						$doc->exportField($this->DT);
						$doc->exportField($this->PC);
						$doc->exportField($this->YM);
						$doc->exportField($this->Stock);
						$doc->exportField($this->LastMonthSale);
						$doc->exportField($this->Printcheck);
						$doc->exportField($this->poid);
						$doc->exportField($this->grnid);
						$doc->exportField($this->BatchNo);
						$doc->exportField($this->BillDate);
						$doc->exportField($this->ExpDate);
						$doc->exportField($this->Quantity);
						$doc->exportField($this->FreeQty);
						$doc->exportField($this->ItemValue);
						$doc->exportField($this->Disc);
						$doc->exportField($this->PTax);
						$doc->exportField($this->MRP);
						$doc->exportField($this->SalTax);
						$doc->exportField($this->PurValue);
						$doc->exportField($this->PurRate);
						$doc->exportField($this->SalRate);
						$doc->exportField($this->Discount);
						$doc->exportField($this->PSGST);
						$doc->exportField($this->PCGST);
						$doc->exportField($this->SSGST);
						$doc->exportField($this->SCGST);
						$doc->exportField($this->HSN);
						$doc->exportField($this->Pack);
						$doc->exportField($this->PUnit);
						$doc->exportField($this->SUnit);
						$doc->exportField($this->GrnQuantity);
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
						$doc->exportField($this->id);
					} else {
						$doc->exportField($this->ORDNO);
						$doc->exportField($this->BRCODE);
						$doc->exportField($this->PRC);
						$doc->exportField($this->PrName);
						$doc->exportField($this->MFRCODE);
						$doc->exportField($this->QTY);
						$doc->exportField($this->DT);
						$doc->exportField($this->PC);
						$doc->exportField($this->YM);
						$doc->exportField($this->Stock);
						$doc->exportField($this->LastMonthSale);
						$doc->exportField($this->Printcheck);
						$doc->exportField($this->poid);
						$doc->exportField($this->grnid);
						$doc->exportField($this->BatchNo);
						$doc->exportField($this->BillDate);
						$doc->exportField($this->ExpDate);
						$doc->exportField($this->Quantity);
						$doc->exportField($this->FreeQty);
						$doc->exportField($this->ItemValue);
						$doc->exportField($this->Disc);
						$doc->exportField($this->PTax);
						$doc->exportField($this->MRP);
						$doc->exportField($this->SalTax);
						$doc->exportField($this->PurValue);
						$doc->exportField($this->PurRate);
						$doc->exportField($this->SalRate);
						$doc->exportField($this->Discount);
						$doc->exportField($this->PSGST);
						$doc->exportField($this->PCGST);
						$doc->exportField($this->SSGST);
						$doc->exportField($this->SCGST);
						$doc->exportField($this->HSN);
						$doc->exportField($this->Pack);
						$doc->exportField($this->PUnit);
						$doc->exportField($this->SUnit);
						$doc->exportField($this->GrnQuantity);
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
						$doc->exportField($this->id);
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
				$doc->exportAggregate($this->ORDNO, '');
				$doc->exportAggregate($this->BRCODE, '');
				$doc->exportAggregate($this->PRC, 'COUNT');
				$doc->exportAggregate($this->PrName, '');
				$doc->exportAggregate($this->MFRCODE, '');
				$doc->exportAggregate($this->QTY, '');
				$doc->exportAggregate($this->DT, '');
				$doc->exportAggregate($this->PC, '');
				$doc->exportAggregate($this->YM, '');
				$doc->exportAggregate($this->Stock, '');
				$doc->exportAggregate($this->LastMonthSale, '');
				$doc->exportAggregate($this->Printcheck, '');
				$doc->exportAggregate($this->poid, '');
				$doc->exportAggregate($this->grnid, '');
				$doc->exportAggregate($this->BatchNo, '');
				$doc->exportAggregate($this->BillDate, '');
				$doc->exportAggregate($this->ExpDate, '');
				$doc->exportAggregate($this->Quantity, 'TOTAL');
				$doc->exportAggregate($this->FreeQty, '');
				$doc->exportAggregate($this->ItemValue, '');
				$doc->exportAggregate($this->Disc, '');
				$doc->exportAggregate($this->PTax, '');
				$doc->exportAggregate($this->MRP, '');
				$doc->exportAggregate($this->SalTax, '');
				$doc->exportAggregate($this->PurValue, '');
				$doc->exportAggregate($this->PurRate, '');
				$doc->exportAggregate($this->SalRate, '');
				$doc->exportAggregate($this->Discount, '');
				$doc->exportAggregate($this->PSGST, '');
				$doc->exportAggregate($this->PCGST, '');
				$doc->exportAggregate($this->SSGST, '');
				$doc->exportAggregate($this->SCGST, '');
				$doc->exportAggregate($this->HSN, '');
				$doc->exportAggregate($this->Pack, '');
				$doc->exportAggregate($this->PUnit, '');
				$doc->exportAggregate($this->SUnit, '');
				$doc->exportAggregate($this->GrnQuantity, '');
				$doc->exportAggregate($this->GrnMRP, '');
				$doc->exportAggregate($this->trid, '');
				$doc->exportAggregate($this->HospID, '');
				$doc->exportAggregate($this->CreatedBy, '');
				$doc->exportAggregate($this->CreatedDateTime, '');
				$doc->exportAggregate($this->ModifiedBy, '');
				$doc->exportAggregate($this->ModifiedDateTime, '');
				$doc->exportAggregate($this->grncreatedby, '');
				$doc->exportAggregate($this->grncreatedDateTime, '');
				$doc->exportAggregate($this->grnModifiedby, '');
				$doc->exportAggregate($this->grnModifiedDateTime, '');
				$doc->exportAggregate($this->Received, '');
				$doc->exportAggregate($this->id, '');
				$doc->endExportRow();
			}
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
	////================================
	////=================================
	////==============================$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
	///============================
	///============================

	if($rsnew["Received"] == "Yes")
	{
								if(	$rsold["PSGST"] == null )
								{
									$rsold["PSGST"] = 0;
								}
								if($rsold["PCGST"]== null )
								{
									$rsold["PCGST"] = 0;
								}
								if($rsold["SSGST"]== null )
								{
									$rsold["SSGST"] = 0;
								}
								if($rsold["SCGST"]== null )
								{
									$rsold["SCGST"] = 0;
								}
								if($rsold["Quantity"]== null )
								{
									$rsold["Quantity"] = 0;
								}
								if($rsold["MRP"]== null )
								{
									$rsold["MRP"] = 0;
								}
								if($rsold["BatchNo"]== null )
								{
									$rsold["BatchNo"] ='';
								}
								if($rsold["SalRate"] == null)
								{
									$rsold["SalRate"] = $rsold["MRP"];
								}
							if($rsold["BillDate"]==null)
							{
								$rsold["BillDate"]=date("Y-m-d");
							}
				$cid = $_GET["fk_id"] ;
						$IVFid = $_GET["fk_RIDNO"] ;
						$dbhelper = &DbHelper();
						$Tid = $_GET["fk_id"] ;
						$showmaster = $_GET["showmaster"] ;
						$sql = "SELECT * FROM ganeshkumar_bjhims.pharmacy_batchmas where PRC='".$rsold["PRC"]."' and BATCHNO='".$rsold["BatchNo"]."' and `BRCODE`='".$rsold["BRCODE"]."' and  `HospID`='".HospitalID()."'; ";
								$results = $dbhelper->ExecuteRows($sql);
								$uuIID = $results[0]["id"];
								if($rsold["FreeQty"] == '')
								{
								   $FreeQty = '0.00';
								}else{
									$FreeQty = $rsold["FreeQty"];
								}
								if($uuIID == null)
								{

									//$batchmasCount = count($results);
								}else{
									$batchmasCount = count($results);
								}
								if($batchmasCount > 0)
								{
									if($rsold["ExpDate"] == null)
									{
										$sqlA = " UPDATE `ganeshkumar_bjhims`.`pharmacy_batchmas` SET `RQ`=  `RQ` + '".$rsold["Quantity"]."', `MRP`='".$rsold["MRP"]."',
										`RT`='".$rsold["SalRate"]."',  `BILLDATE` = '". $rsold["BillDate"]."',
										`PRCODE`='".$rsold["PRC"]."', `BATCH`='".$rsold["BatchNo"]."',
										`PSGST`='".$rsold["PSGST"]."', `PCGST`='".$rsold["PCGST"]."', `SSGST`='".$rsold["SSGST"]."', `SCGST`='".$rsold["SCGST"]."', `MFRCODE`='".$rsold["MFRCODE"]."',
										`BRCODE`='".$rsold["BRCODE"]."', `FRQ`='".$FreeQty."' WHERE  PRC='".$rsold["PRC"]."' and BATCHNO='".$rsold["BatchNo"]."' and `BRCODE`='".$rsold["BRCODE"]."' and  `HospID`='".HospitalID()."';";
									}
									else
									{
										$sqlA = " UPDATE `ganeshkumar_bjhims`.`pharmacy_batchmas` SET `RQ`=  `RQ` + '".$rsold["Quantity"]."', `MRP`='".$rsold["MRP"]."',
										`EXPDT`='".$rsold["ExpDate"]."', `RT`='".$rsold["SalRate"]."',  `BILLDATE` = '". $rsold["BillDate"]."',
										`PRCODE`='".$rsold["PRC"]."', `BATCH`='".$rsold["BatchNo"]."',
										`PSGST`='".$rsold["PSGST"]."', `PCGST`='".$rsold["PCGST"]."', `SSGST`='".$rsold["SSGST"]."', `SCGST`='".$rsold["SCGST"]."', `MFRCODE`='".$rsold["MFRCODE"]."',
										`BRCODE`='".$rsold["BRCODE"]."', `FRQ`='".$FreeQty."' WHERE  PRC='".$rsold["PRC"]."' and BATCHNO='".$rsold["BatchNo"]."' and `BRCODE`='".$rsold["BRCODE"]."' and  `HospID`='".HospitalID()."';";
				 					}
									$results = $dbhelper->ExecuteRows($sqlA);
								}
								else
								{
									if($rsold["ExpDate"] == null)
									{
										$sqlB = "INSERT INTO `ganeshkumar_bjhims`.`pharmacy_batchmas`
										(`PRC`, `BATCHNO`, `RQ`, `MRP`,  `BILLDATE` ,
										`RT`, `PRCODE`, `BATCH`, `PrName`, `PSGST`, `PCGST`,
										`SSGST`, `SCGST`, `MFRCODE`, `BRCODE`, `FRQ`, `HospID`) VALUES
										('".$rsold["PRC"]."', '".$rsold["BatchNo"]."', '".$rsold["Quantity"]."', '".$rsold["MRP"]."',  '". $rsold["BillDate"]."',
										'".$rsold["SalRate"]."', '".$rsold["PRC"]."', '".$rsold["BatchNo"]."', '".$rsold["PrName"]."', '".$rsold["PSGST"]."', '".$rsold["PCGST"]."',
										'".$rsold["SSGST"]."', '".$rsold["SCGST"]."', '".$rsold["MFRCODE"]."', '".$rsold["BRCODE"]."' , '".$FreeQty."' , '".HospitalID()."');";
									}
									else
									{
										$sqlB = "INSERT INTO `ganeshkumar_bjhims`.`pharmacy_batchmas`
										(`PRC`, `BATCHNO`, `RQ`, `MRP`, `EXPDT`,  `BILLDATE` ,
										`RT`, `PRCODE`, `BATCH`, `PrName`, `PSGST`, `PCGST`,
										`SSGST`, `SCGST`, `MFRCODE`, `BRCODE`, `FRQ`, `HospID`) VALUES
										('".$rsold["PRC"]."', '".$rsold["BatchNo"]."', '".$rsold["Quantity"]."', '".$rsold["MRP"]."', '".$rsold["ExpDate"]."',   '". $rsold["BillDate"]."',
										'".$rsold["SalRate"]."', '".$rsold["PRC"]."', '".$rsold["BatchNo"]."', '".$rsold["PrName"]."', '".$rsold["PSGST"]."', '".$rsold["PCGST"]."',
										'".$rsold["SSGST"]."', '".$rsold["SCGST"]."', '".$rsold["MFRCODE"]."', '".$rsold["BRCODE"]."' , '".$FreeQty."' , '".HospitalID()."');";
									}
									$results = $dbhelper->ExecuteRows($sqlB);
								}
	}
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