<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_pharmacygrn
 */
class ViewPharmacygrn extends DbTable
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
    public $ORDNO;
    public $PRC;
    public $QTY;
    public $DT;
    public $PC;
    public $YM;
    public $MFRCODE;
    public $Stock;
    public $LastMonthSale;
    public $Printcheck;
    public $id;
    public $poid;
    public $grnid;
    public $BatchNo;
    public $ExpDate;
    public $PrName;
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
    public $BRCODE;
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
    public $BillDate;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'view_pharmacygrn';
        $this->TableName = 'view_pharmacygrn';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_pharmacygrn`";
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

        // ORDNO
        $this->ORDNO = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_ORDNO', 'ORDNO', '`ORDNO`', '`ORDNO`', 200, 5, -1, false, '`ORDNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ORDNO->Sortable = true; // Allow sort
        $this->Fields['ORDNO'] = &$this->ORDNO;

        // PRC
        $this->PRC = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_PRC', 'PRC', '`PRC`', '`PRC`', 200, 9, -1, false, '`PRC`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PRC->Sortable = true; // Allow sort
        $this->Fields['PRC'] = &$this->PRC;

        // QTY
        $this->QTY = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_QTY', 'QTY', '`QTY`', '`QTY`', 3, 11, -1, false, '`QTY`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->QTY->Sortable = true; // Allow sort
        $this->QTY->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['QTY'] = &$this->QTY;

        // DT
        $this->DT = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_DT', 'DT', '`DT`', CastDateFieldForLike("`DT`", 0, "DB"), 135, 19, 0, false, '`DT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DT->Sortable = true; // Allow sort
        $this->DT->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['DT'] = &$this->DT;

        // PC
        $this->PC = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_PC', 'PC', '`PC`', '`PC`', 200, 5, -1, false, '`PC`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PC->Sortable = true; // Allow sort
        $this->Fields['PC'] = &$this->PC;

        // YM
        $this->YM = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_YM', 'YM', '`YM`', '`YM`', 200, 6, -1, false, '`YM`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->YM->Sortable = true; // Allow sort
        $this->Fields['YM'] = &$this->YM;

        // MFRCODE
        $this->MFRCODE = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_MFRCODE', 'MFRCODE', '`MFRCODE`', '`MFRCODE`', 200, 45, -1, false, '`MFRCODE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MFRCODE->Sortable = true; // Allow sort
        $this->Fields['MFRCODE'] = &$this->MFRCODE;

        // Stock
        $this->Stock = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_Stock', 'Stock', '`Stock`', '`Stock`', 3, 11, -1, false, '`Stock`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Stock->Sortable = true; // Allow sort
        $this->Stock->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['Stock'] = &$this->Stock;

        // LastMonthSale
        $this->LastMonthSale = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_LastMonthSale', 'LastMonthSale', '`LastMonthSale`', '`LastMonthSale`', 3, 11, -1, false, '`LastMonthSale`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->LastMonthSale->Sortable = true; // Allow sort
        $this->LastMonthSale->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['LastMonthSale'] = &$this->LastMonthSale;

        // Printcheck
        $this->Printcheck = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_Printcheck', 'Printcheck', '`Printcheck`', '`Printcheck`', 200, 50, -1, false, '`Printcheck`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Printcheck->Sortable = true; // Allow sort
        $this->Fields['Printcheck'] = &$this->Printcheck;

        // id
        $this->id = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['id'] = &$this->id;

        // poid
        $this->poid = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_poid', 'poid', '`poid`', '`poid`', 3, 11, -1, false, '`poid`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->poid->Sortable = true; // Allow sort
        $this->poid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['poid'] = &$this->poid;

        // grnid
        $this->grnid = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_grnid', 'grnid', '`grnid`', '`grnid`', 3, 11, -1, false, '`grnid`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->grnid->Sortable = true; // Allow sort
        $this->grnid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['grnid'] = &$this->grnid;

        // BatchNo
        $this->BatchNo = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_BatchNo', 'BatchNo', '`BatchNo`', '`BatchNo`', 200, 45, -1, false, '`BatchNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BatchNo->Sortable = true; // Allow sort
        $this->Fields['BatchNo'] = &$this->BatchNo;

        // ExpDate
        $this->ExpDate = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_ExpDate', 'ExpDate', '`ExpDate`', CastDateFieldForLike("`ExpDate`", 0, "DB"), 135, 19, 0, false, '`ExpDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ExpDate->Sortable = true; // Allow sort
        $this->ExpDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['ExpDate'] = &$this->ExpDate;

        // PrName
        $this->PrName = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_PrName', 'PrName', '`PrName`', '`PrName`', 200, 100, -1, false, '`PrName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PrName->Sortable = true; // Allow sort
        $this->Fields['PrName'] = &$this->PrName;

        // Quantity
        $this->Quantity = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_Quantity', 'Quantity', '`Quantity`', '`Quantity`', 3, 11, -1, false, '`Quantity`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Quantity->Sortable = true; // Allow sort
        $this->Quantity->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['Quantity'] = &$this->Quantity;

        // FreeQty
        $this->FreeQty = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_FreeQty', 'FreeQty', '`FreeQty`', '`FreeQty`', 3, 11, -1, false, '`FreeQty`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FreeQty->Sortable = true; // Allow sort
        $this->FreeQty->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['FreeQty'] = &$this->FreeQty;

        // ItemValue
        $this->ItemValue = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_ItemValue', 'ItemValue', '`ItemValue`', '`ItemValue`', 131, 12, -1, false, '`ItemValue`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ItemValue->Sortable = true; // Allow sort
        $this->ItemValue->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->ItemValue->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['ItemValue'] = &$this->ItemValue;

        // Disc
        $this->Disc = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_Disc', 'Disc', '`Disc`', '`Disc`', 131, 12, -1, false, '`Disc`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Disc->Sortable = true; // Allow sort
        $this->Disc->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Disc->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['Disc'] = &$this->Disc;

        // PTax
        $this->PTax = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_PTax', 'PTax', '`PTax`', '`PTax`', 131, 12, -1, false, '`PTax`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PTax->Sortable = true; // Allow sort
        $this->PTax->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PTax->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['PTax'] = &$this->PTax;

        // MRP
        $this->MRP = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_MRP', 'MRP', '`MRP`', '`MRP`', 131, 12, -1, false, '`MRP`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MRP->Sortable = true; // Allow sort
        $this->MRP->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->MRP->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['MRP'] = &$this->MRP;

        // SalTax
        $this->SalTax = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_SalTax', 'SalTax', '`SalTax`', '`SalTax`', 131, 12, -1, false, '`SalTax`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SalTax->Sortable = true; // Allow sort
        $this->SalTax->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SalTax->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['SalTax'] = &$this->SalTax;

        // PurValue
        $this->PurValue = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_PurValue', 'PurValue', '`PurValue`', '`PurValue`', 131, 12, -1, false, '`PurValue`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PurValue->Sortable = true; // Allow sort
        $this->PurValue->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PurValue->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['PurValue'] = &$this->PurValue;

        // PurRate
        $this->PurRate = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_PurRate', 'PurRate', '`PurRate`', '`PurRate`', 131, 12, -1, false, '`PurRate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PurRate->Sortable = true; // Allow sort
        $this->PurRate->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PurRate->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['PurRate'] = &$this->PurRate;

        // SalRate
        $this->SalRate = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_SalRate', 'SalRate', '`SalRate`', '`SalRate`', 131, 12, -1, false, '`SalRate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SalRate->Sortable = true; // Allow sort
        $this->SalRate->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SalRate->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['SalRate'] = &$this->SalRate;

        // Discount
        $this->Discount = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_Discount', 'Discount', '`Discount`', '`Discount`', 131, 12, -1, false, '`Discount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Discount->Sortable = true; // Allow sort
        $this->Discount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Discount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['Discount'] = &$this->Discount;

        // PSGST
        $this->PSGST = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_PSGST', 'PSGST', '`PSGST`', '`PSGST`', 131, 12, -1, false, '`PSGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PSGST->Sortable = true; // Allow sort
        $this->PSGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PSGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['PSGST'] = &$this->PSGST;

        // PCGST
        $this->PCGST = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_PCGST', 'PCGST', '`PCGST`', '`PCGST`', 131, 12, -1, false, '`PCGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PCGST->Sortable = true; // Allow sort
        $this->PCGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PCGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['PCGST'] = &$this->PCGST;

        // SSGST
        $this->SSGST = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_SSGST', 'SSGST', '`SSGST`', '`SSGST`', 131, 12, -1, false, '`SSGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SSGST->Sortable = true; // Allow sort
        $this->SSGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SSGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['SSGST'] = &$this->SSGST;

        // SCGST
        $this->SCGST = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_SCGST', 'SCGST', '`SCGST`', '`SCGST`', 131, 12, -1, false, '`SCGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SCGST->Sortable = true; // Allow sort
        $this->SCGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SCGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['SCGST'] = &$this->SCGST;

        // BRCODE
        $this->BRCODE = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_BRCODE', 'BRCODE', '`BRCODE`', '`BRCODE`', 3, 11, -1, false, '`BRCODE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BRCODE->Sortable = true; // Allow sort
        $this->BRCODE->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['BRCODE'] = &$this->BRCODE;

        // HSN
        $this->HSN = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_HSN', 'HSN', '`HSN`', '`HSN`', 200, 45, -1, false, '`HSN`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HSN->Sortable = true; // Allow sort
        $this->Fields['HSN'] = &$this->HSN;

        // Pack
        $this->Pack = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_Pack', 'Pack', '`Pack`', '`Pack`', 200, 45, -1, false, '`Pack`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Pack->Sortable = true; // Allow sort
        $this->Fields['Pack'] = &$this->Pack;

        // PUnit
        $this->PUnit = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_PUnit', 'PUnit', '`PUnit`', '`PUnit`', 3, 11, -1, false, '`PUnit`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PUnit->Sortable = true; // Allow sort
        $this->PUnit->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['PUnit'] = &$this->PUnit;

        // SUnit
        $this->SUnit = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_SUnit', 'SUnit', '`SUnit`', '`SUnit`', 3, 11, -1, false, '`SUnit`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SUnit->Sortable = true; // Allow sort
        $this->SUnit->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['SUnit'] = &$this->SUnit;

        // GrnQuantity
        $this->GrnQuantity = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_GrnQuantity', 'GrnQuantity', '`GrnQuantity`', '`GrnQuantity`', 3, 11, -1, false, '`GrnQuantity`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GrnQuantity->Sortable = true; // Allow sort
        $this->GrnQuantity->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['GrnQuantity'] = &$this->GrnQuantity;

        // GrnMRP
        $this->GrnMRP = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_GrnMRP', 'GrnMRP', '`GrnMRP`', '`GrnMRP`', 131, 12, -1, false, '`GrnMRP`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GrnMRP->Sortable = true; // Allow sort
        $this->GrnMRP->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->GrnMRP->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['GrnMRP'] = &$this->GrnMRP;

        // trid
        $this->trid = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_trid', 'trid', '`trid`', '`trid`', 3, 11, -1, false, '`trid`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->trid->Sortable = true; // Allow sort
        $this->trid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['trid'] = &$this->trid;

        // HospID
        $this->HospID = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['HospID'] = &$this->HospID;

        // CreatedBy
        $this->CreatedBy = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_CreatedBy', 'CreatedBy', '`CreatedBy`', '`CreatedBy`', 3, 11, -1, false, '`CreatedBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CreatedBy->Sortable = true; // Allow sort
        $this->CreatedBy->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['CreatedBy'] = &$this->CreatedBy;

        // CreatedDateTime
        $this->CreatedDateTime = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_CreatedDateTime', 'CreatedDateTime', '`CreatedDateTime`', CastDateFieldForLike("`CreatedDateTime`", 0, "DB"), 135, 19, 0, false, '`CreatedDateTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CreatedDateTime->Sortable = true; // Allow sort
        $this->CreatedDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['CreatedDateTime'] = &$this->CreatedDateTime;

        // ModifiedBy
        $this->ModifiedBy = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_ModifiedBy', 'ModifiedBy', '`ModifiedBy`', '`ModifiedBy`', 3, 11, -1, false, '`ModifiedBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ModifiedBy->Sortable = true; // Allow sort
        $this->ModifiedBy->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['ModifiedBy'] = &$this->ModifiedBy;

        // ModifiedDateTime
        $this->ModifiedDateTime = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_ModifiedDateTime', 'ModifiedDateTime', '`ModifiedDateTime`', CastDateFieldForLike("`ModifiedDateTime`", 0, "DB"), 135, 19, 0, false, '`ModifiedDateTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ModifiedDateTime->Sortable = true; // Allow sort
        $this->ModifiedDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['ModifiedDateTime'] = &$this->ModifiedDateTime;

        // grncreatedby
        $this->grncreatedby = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_grncreatedby', 'grncreatedby', '`grncreatedby`', '`grncreatedby`', 3, 11, -1, false, '`grncreatedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->grncreatedby->Sortable = true; // Allow sort
        $this->grncreatedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['grncreatedby'] = &$this->grncreatedby;

        // grncreatedDateTime
        $this->grncreatedDateTime = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_grncreatedDateTime', 'grncreatedDateTime', '`grncreatedDateTime`', CastDateFieldForLike("`grncreatedDateTime`", 0, "DB"), 135, 19, 0, false, '`grncreatedDateTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->grncreatedDateTime->Sortable = true; // Allow sort
        $this->grncreatedDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['grncreatedDateTime'] = &$this->grncreatedDateTime;

        // grnModifiedby
        $this->grnModifiedby = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_grnModifiedby', 'grnModifiedby', '`grnModifiedby`', '`grnModifiedby`', 3, 11, -1, false, '`grnModifiedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->grnModifiedby->Sortable = true; // Allow sort
        $this->grnModifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['grnModifiedby'] = &$this->grnModifiedby;

        // grnModifiedDateTime
        $this->grnModifiedDateTime = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_grnModifiedDateTime', 'grnModifiedDateTime', '`grnModifiedDateTime`', CastDateFieldForLike("`grnModifiedDateTime`", 0, "DB"), 135, 19, 0, false, '`grnModifiedDateTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->grnModifiedDateTime->Sortable = true; // Allow sort
        $this->grnModifiedDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['grnModifiedDateTime'] = &$this->grnModifiedDateTime;

        // Received
        $this->Received = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_Received', 'Received', '`Received`', '`Received`', 200, 45, -1, false, '`Received`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Received->Sortable = true; // Allow sort
        $this->Fields['Received'] = &$this->Received;

        // BillDate
        $this->BillDate = new DbField('view_pharmacygrn', 'view_pharmacygrn', 'x_BillDate', 'BillDate', '`BillDate`', CastDateFieldForLike("`BillDate`", 0, "DB"), 135, 19, 0, false, '`BillDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BillDate->Sortable = true; // Allow sort
        $this->BillDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['BillDate'] = &$this->BillDate;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_pharmacygrn`";
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
        $this->ORDNO->DbValue = $row['ORDNO'];
        $this->PRC->DbValue = $row['PRC'];
        $this->QTY->DbValue = $row['QTY'];
        $this->DT->DbValue = $row['DT'];
        $this->PC->DbValue = $row['PC'];
        $this->YM->DbValue = $row['YM'];
        $this->MFRCODE->DbValue = $row['MFRCODE'];
        $this->Stock->DbValue = $row['Stock'];
        $this->LastMonthSale->DbValue = $row['LastMonthSale'];
        $this->Printcheck->DbValue = $row['Printcheck'];
        $this->id->DbValue = $row['id'];
        $this->poid->DbValue = $row['poid'];
        $this->grnid->DbValue = $row['grnid'];
        $this->BatchNo->DbValue = $row['BatchNo'];
        $this->ExpDate->DbValue = $row['ExpDate'];
        $this->PrName->DbValue = $row['PrName'];
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
        $this->BRCODE->DbValue = $row['BRCODE'];
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
        $this->BillDate->DbValue = $row['BillDate'];
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
            return GetUrl("ViewPharmacygrnList");
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
        if ($pageName == "ViewPharmacygrnView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewPharmacygrnEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewPharmacygrnAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewPharmacygrnList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewPharmacygrnView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewPharmacygrnView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewPharmacygrnAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewPharmacygrnAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewPharmacygrnEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewPharmacygrnAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewPharmacygrnDelete", $this->getUrlParm());
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
        $this->ORDNO->setDbValue($row['ORDNO']);
        $this->PRC->setDbValue($row['PRC']);
        $this->QTY->setDbValue($row['QTY']);
        $this->DT->setDbValue($row['DT']);
        $this->PC->setDbValue($row['PC']);
        $this->YM->setDbValue($row['YM']);
        $this->MFRCODE->setDbValue($row['MFRCODE']);
        $this->Stock->setDbValue($row['Stock']);
        $this->LastMonthSale->setDbValue($row['LastMonthSale']);
        $this->Printcheck->setDbValue($row['Printcheck']);
        $this->id->setDbValue($row['id']);
        $this->poid->setDbValue($row['poid']);
        $this->grnid->setDbValue($row['grnid']);
        $this->BatchNo->setDbValue($row['BatchNo']);
        $this->ExpDate->setDbValue($row['ExpDate']);
        $this->PrName->setDbValue($row['PrName']);
        $this->Quantity->setDbValue($row['Quantity']);
        $this->FreeQty->setDbValue($row['FreeQty']);
        $this->ItemValue->setDbValue($row['ItemValue']);
        $this->Disc->setDbValue($row['Disc']);
        $this->PTax->setDbValue($row['PTax']);
        $this->MRP->setDbValue($row['MRP']);
        $this->SalTax->setDbValue($row['SalTax']);
        $this->PurValue->setDbValue($row['PurValue']);
        $this->PurRate->setDbValue($row['PurRate']);
        $this->SalRate->setDbValue($row['SalRate']);
        $this->Discount->setDbValue($row['Discount']);
        $this->PSGST->setDbValue($row['PSGST']);
        $this->PCGST->setDbValue($row['PCGST']);
        $this->SSGST->setDbValue($row['SSGST']);
        $this->SCGST->setDbValue($row['SCGST']);
        $this->BRCODE->setDbValue($row['BRCODE']);
        $this->HSN->setDbValue($row['HSN']);
        $this->Pack->setDbValue($row['Pack']);
        $this->PUnit->setDbValue($row['PUnit']);
        $this->SUnit->setDbValue($row['SUnit']);
        $this->GrnQuantity->setDbValue($row['GrnQuantity']);
        $this->GrnMRP->setDbValue($row['GrnMRP']);
        $this->trid->setDbValue($row['trid']);
        $this->HospID->setDbValue($row['HospID']);
        $this->CreatedBy->setDbValue($row['CreatedBy']);
        $this->CreatedDateTime->setDbValue($row['CreatedDateTime']);
        $this->ModifiedBy->setDbValue($row['ModifiedBy']);
        $this->ModifiedDateTime->setDbValue($row['ModifiedDateTime']);
        $this->grncreatedby->setDbValue($row['grncreatedby']);
        $this->grncreatedDateTime->setDbValue($row['grncreatedDateTime']);
        $this->grnModifiedby->setDbValue($row['grnModifiedby']);
        $this->grnModifiedDateTime->setDbValue($row['grnModifiedDateTime']);
        $this->Received->setDbValue($row['Received']);
        $this->BillDate->setDbValue($row['BillDate']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // ORDNO

        // PRC

        // QTY

        // DT

        // PC

        // YM

        // MFRCODE

        // Stock

        // LastMonthSale

        // Printcheck

        // id

        // poid

        // grnid

        // BatchNo

        // ExpDate

        // PrName

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

        // BRCODE

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

        // BillDate

        // ORDNO
        $this->ORDNO->ViewValue = $this->ORDNO->CurrentValue;
        $this->ORDNO->ViewCustomAttributes = "";

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

        // MFRCODE
        $this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
        $this->MFRCODE->ViewCustomAttributes = "";

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

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

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

        // ExpDate
        $this->ExpDate->ViewValue = $this->ExpDate->CurrentValue;
        $this->ExpDate->ViewValue = FormatDateTime($this->ExpDate->ViewValue, 0);
        $this->ExpDate->ViewCustomAttributes = "";

        // PrName
        $this->PrName->ViewValue = $this->PrName->CurrentValue;
        $this->PrName->ViewCustomAttributes = "";

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
        $this->Disc->ViewValue = FormatNumber($this->Disc->ViewValue, 2, -2, -2, -2);
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

        // BRCODE
        $this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
        $this->BRCODE->ViewValue = FormatNumber($this->BRCODE->ViewValue, 0, -2, -2, -2);
        $this->BRCODE->ViewCustomAttributes = "";

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
        $this->Received->ViewValue = $this->Received->CurrentValue;
        $this->Received->ViewCustomAttributes = "";

        // BillDate
        $this->BillDate->ViewValue = $this->BillDate->CurrentValue;
        $this->BillDate->ViewValue = FormatDateTime($this->BillDate->ViewValue, 0);
        $this->BillDate->ViewCustomAttributes = "";

        // ORDNO
        $this->ORDNO->LinkCustomAttributes = "";
        $this->ORDNO->HrefValue = "";
        $this->ORDNO->TooltipValue = "";

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

        // MFRCODE
        $this->MFRCODE->LinkCustomAttributes = "";
        $this->MFRCODE->HrefValue = "";
        $this->MFRCODE->TooltipValue = "";

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

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

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

        // ExpDate
        $this->ExpDate->LinkCustomAttributes = "";
        $this->ExpDate->HrefValue = "";
        $this->ExpDate->TooltipValue = "";

        // PrName
        $this->PrName->LinkCustomAttributes = "";
        $this->PrName->HrefValue = "";
        $this->PrName->TooltipValue = "";

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

        // BRCODE
        $this->BRCODE->LinkCustomAttributes = "";
        $this->BRCODE->HrefValue = "";
        $this->BRCODE->TooltipValue = "";

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

        // BillDate
        $this->BillDate->LinkCustomAttributes = "";
        $this->BillDate->HrefValue = "";
        $this->BillDate->TooltipValue = "";

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

        // ORDNO
        $this->ORDNO->EditAttrs["class"] = "form-control";
        $this->ORDNO->EditCustomAttributes = "";
        if (!$this->ORDNO->Raw) {
            $this->ORDNO->CurrentValue = HtmlDecode($this->ORDNO->CurrentValue);
        }
        $this->ORDNO->EditValue = $this->ORDNO->CurrentValue;
        $this->ORDNO->PlaceHolder = RemoveHtml($this->ORDNO->caption());

        // PRC
        $this->PRC->EditAttrs["class"] = "form-control";
        $this->PRC->EditCustomAttributes = "";
        if (!$this->PRC->Raw) {
            $this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
        }
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
        if (!$this->PC->Raw) {
            $this->PC->CurrentValue = HtmlDecode($this->PC->CurrentValue);
        }
        $this->PC->EditValue = $this->PC->CurrentValue;
        $this->PC->PlaceHolder = RemoveHtml($this->PC->caption());

        // YM
        $this->YM->EditAttrs["class"] = "form-control";
        $this->YM->EditCustomAttributes = "";
        if (!$this->YM->Raw) {
            $this->YM->CurrentValue = HtmlDecode($this->YM->CurrentValue);
        }
        $this->YM->EditValue = $this->YM->CurrentValue;
        $this->YM->PlaceHolder = RemoveHtml($this->YM->caption());

        // MFRCODE
        $this->MFRCODE->EditAttrs["class"] = "form-control";
        $this->MFRCODE->EditCustomAttributes = "";
        if (!$this->MFRCODE->Raw) {
            $this->MFRCODE->CurrentValue = HtmlDecode($this->MFRCODE->CurrentValue);
        }
        $this->MFRCODE->EditValue = $this->MFRCODE->CurrentValue;
        $this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

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
        if (!$this->Printcheck->Raw) {
            $this->Printcheck->CurrentValue = HtmlDecode($this->Printcheck->CurrentValue);
        }
        $this->Printcheck->EditValue = $this->Printcheck->CurrentValue;
        $this->Printcheck->PlaceHolder = RemoveHtml($this->Printcheck->caption());

        // id
        $this->id->EditAttrs["class"] = "form-control";
        $this->id->EditCustomAttributes = "";
        $this->id->EditValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

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
        if (!$this->BatchNo->Raw) {
            $this->BatchNo->CurrentValue = HtmlDecode($this->BatchNo->CurrentValue);
        }
        $this->BatchNo->EditValue = $this->BatchNo->CurrentValue;
        $this->BatchNo->PlaceHolder = RemoveHtml($this->BatchNo->caption());

        // ExpDate
        $this->ExpDate->EditAttrs["class"] = "form-control";
        $this->ExpDate->EditCustomAttributes = "";
        $this->ExpDate->EditValue = FormatDateTime($this->ExpDate->CurrentValue, 8);
        $this->ExpDate->PlaceHolder = RemoveHtml($this->ExpDate->caption());

        // PrName
        $this->PrName->EditAttrs["class"] = "form-control";
        $this->PrName->EditCustomAttributes = "";
        if (!$this->PrName->Raw) {
            $this->PrName->CurrentValue = HtmlDecode($this->PrName->CurrentValue);
        }
        $this->PrName->EditValue = $this->PrName->CurrentValue;
        $this->PrName->PlaceHolder = RemoveHtml($this->PrName->caption());

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

        // ItemValue
        $this->ItemValue->EditAttrs["class"] = "form-control";
        $this->ItemValue->EditCustomAttributes = "";
        $this->ItemValue->EditValue = $this->ItemValue->CurrentValue;
        $this->ItemValue->PlaceHolder = RemoveHtml($this->ItemValue->caption());
        if (strval($this->ItemValue->EditValue) != "" && is_numeric($this->ItemValue->EditValue)) {
            $this->ItemValue->EditValue = FormatNumber($this->ItemValue->EditValue, -2, -2, -2, -2);
        }

        // Disc
        $this->Disc->EditAttrs["class"] = "form-control";
        $this->Disc->EditCustomAttributes = "";
        $this->Disc->EditValue = $this->Disc->CurrentValue;
        $this->Disc->PlaceHolder = RemoveHtml($this->Disc->caption());
        if (strval($this->Disc->EditValue) != "" && is_numeric($this->Disc->EditValue)) {
            $this->Disc->EditValue = FormatNumber($this->Disc->EditValue, -2, -2, -2, -2);
        }

        // PTax
        $this->PTax->EditAttrs["class"] = "form-control";
        $this->PTax->EditCustomAttributes = "";
        $this->PTax->EditValue = $this->PTax->CurrentValue;
        $this->PTax->PlaceHolder = RemoveHtml($this->PTax->caption());
        if (strval($this->PTax->EditValue) != "" && is_numeric($this->PTax->EditValue)) {
            $this->PTax->EditValue = FormatNumber($this->PTax->EditValue, -2, -2, -2, -2);
        }

        // MRP
        $this->MRP->EditAttrs["class"] = "form-control";
        $this->MRP->EditCustomAttributes = "";
        $this->MRP->EditValue = $this->MRP->CurrentValue;
        $this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());
        if (strval($this->MRP->EditValue) != "" && is_numeric($this->MRP->EditValue)) {
            $this->MRP->EditValue = FormatNumber($this->MRP->EditValue, -2, -2, -2, -2);
        }

        // SalTax
        $this->SalTax->EditAttrs["class"] = "form-control";
        $this->SalTax->EditCustomAttributes = "";
        $this->SalTax->EditValue = $this->SalTax->CurrentValue;
        $this->SalTax->PlaceHolder = RemoveHtml($this->SalTax->caption());
        if (strval($this->SalTax->EditValue) != "" && is_numeric($this->SalTax->EditValue)) {
            $this->SalTax->EditValue = FormatNumber($this->SalTax->EditValue, -2, -2, -2, -2);
        }

        // PurValue
        $this->PurValue->EditAttrs["class"] = "form-control";
        $this->PurValue->EditCustomAttributes = "";
        $this->PurValue->EditValue = $this->PurValue->CurrentValue;
        $this->PurValue->PlaceHolder = RemoveHtml($this->PurValue->caption());
        if (strval($this->PurValue->EditValue) != "" && is_numeric($this->PurValue->EditValue)) {
            $this->PurValue->EditValue = FormatNumber($this->PurValue->EditValue, -2, -2, -2, -2);
        }

        // PurRate
        $this->PurRate->EditAttrs["class"] = "form-control";
        $this->PurRate->EditCustomAttributes = "";
        $this->PurRate->EditValue = $this->PurRate->CurrentValue;
        $this->PurRate->PlaceHolder = RemoveHtml($this->PurRate->caption());
        if (strval($this->PurRate->EditValue) != "" && is_numeric($this->PurRate->EditValue)) {
            $this->PurRate->EditValue = FormatNumber($this->PurRate->EditValue, -2, -2, -2, -2);
        }

        // SalRate
        $this->SalRate->EditAttrs["class"] = "form-control";
        $this->SalRate->EditCustomAttributes = "";
        $this->SalRate->EditValue = $this->SalRate->CurrentValue;
        $this->SalRate->PlaceHolder = RemoveHtml($this->SalRate->caption());
        if (strval($this->SalRate->EditValue) != "" && is_numeric($this->SalRate->EditValue)) {
            $this->SalRate->EditValue = FormatNumber($this->SalRate->EditValue, -2, -2, -2, -2);
        }

        // Discount
        $this->Discount->EditAttrs["class"] = "form-control";
        $this->Discount->EditCustomAttributes = "";
        $this->Discount->EditValue = $this->Discount->CurrentValue;
        $this->Discount->PlaceHolder = RemoveHtml($this->Discount->caption());
        if (strval($this->Discount->EditValue) != "" && is_numeric($this->Discount->EditValue)) {
            $this->Discount->EditValue = FormatNumber($this->Discount->EditValue, -2, -2, -2, -2);
        }

        // PSGST
        $this->PSGST->EditAttrs["class"] = "form-control";
        $this->PSGST->EditCustomAttributes = "";
        $this->PSGST->EditValue = $this->PSGST->CurrentValue;
        $this->PSGST->PlaceHolder = RemoveHtml($this->PSGST->caption());
        if (strval($this->PSGST->EditValue) != "" && is_numeric($this->PSGST->EditValue)) {
            $this->PSGST->EditValue = FormatNumber($this->PSGST->EditValue, -2, -2, -2, -2);
        }

        // PCGST
        $this->PCGST->EditAttrs["class"] = "form-control";
        $this->PCGST->EditCustomAttributes = "";
        $this->PCGST->EditValue = $this->PCGST->CurrentValue;
        $this->PCGST->PlaceHolder = RemoveHtml($this->PCGST->caption());
        if (strval($this->PCGST->EditValue) != "" && is_numeric($this->PCGST->EditValue)) {
            $this->PCGST->EditValue = FormatNumber($this->PCGST->EditValue, -2, -2, -2, -2);
        }

        // SSGST
        $this->SSGST->EditAttrs["class"] = "form-control";
        $this->SSGST->EditCustomAttributes = "";
        $this->SSGST->EditValue = $this->SSGST->CurrentValue;
        $this->SSGST->PlaceHolder = RemoveHtml($this->SSGST->caption());
        if (strval($this->SSGST->EditValue) != "" && is_numeric($this->SSGST->EditValue)) {
            $this->SSGST->EditValue = FormatNumber($this->SSGST->EditValue, -2, -2, -2, -2);
        }

        // SCGST
        $this->SCGST->EditAttrs["class"] = "form-control";
        $this->SCGST->EditCustomAttributes = "";
        $this->SCGST->EditValue = $this->SCGST->CurrentValue;
        $this->SCGST->PlaceHolder = RemoveHtml($this->SCGST->caption());
        if (strval($this->SCGST->EditValue) != "" && is_numeric($this->SCGST->EditValue)) {
            $this->SCGST->EditValue = FormatNumber($this->SCGST->EditValue, -2, -2, -2, -2);
        }

        // BRCODE
        $this->BRCODE->EditAttrs["class"] = "form-control";
        $this->BRCODE->EditCustomAttributes = "";
        $this->BRCODE->EditValue = $this->BRCODE->CurrentValue;
        $this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

        // HSN
        $this->HSN->EditAttrs["class"] = "form-control";
        $this->HSN->EditCustomAttributes = "";
        if (!$this->HSN->Raw) {
            $this->HSN->CurrentValue = HtmlDecode($this->HSN->CurrentValue);
        }
        $this->HSN->EditValue = $this->HSN->CurrentValue;
        $this->HSN->PlaceHolder = RemoveHtml($this->HSN->caption());

        // Pack
        $this->Pack->EditAttrs["class"] = "form-control";
        $this->Pack->EditCustomAttributes = "";
        if (!$this->Pack->Raw) {
            $this->Pack->CurrentValue = HtmlDecode($this->Pack->CurrentValue);
        }
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
        if (strval($this->GrnMRP->EditValue) != "" && is_numeric($this->GrnMRP->EditValue)) {
            $this->GrnMRP->EditValue = FormatNumber($this->GrnMRP->EditValue, -2, -2, -2, -2);
        }

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
        $this->Received->EditAttrs["class"] = "form-control";
        $this->Received->EditCustomAttributes = "";
        if (!$this->Received->Raw) {
            $this->Received->CurrentValue = HtmlDecode($this->Received->CurrentValue);
        }
        $this->Received->EditValue = $this->Received->CurrentValue;
        $this->Received->PlaceHolder = RemoveHtml($this->Received->caption());

        // BillDate
        $this->BillDate->EditAttrs["class"] = "form-control";
        $this->BillDate->EditCustomAttributes = "";
        $this->BillDate->EditValue = FormatDateTime($this->BillDate->CurrentValue, 8);
        $this->BillDate->PlaceHolder = RemoveHtml($this->BillDate->caption());

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
                    $doc->exportCaption($this->ORDNO);
                    $doc->exportCaption($this->PRC);
                    $doc->exportCaption($this->QTY);
                    $doc->exportCaption($this->DT);
                    $doc->exportCaption($this->PC);
                    $doc->exportCaption($this->YM);
                    $doc->exportCaption($this->MFRCODE);
                    $doc->exportCaption($this->Stock);
                    $doc->exportCaption($this->LastMonthSale);
                    $doc->exportCaption($this->Printcheck);
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->poid);
                    $doc->exportCaption($this->grnid);
                    $doc->exportCaption($this->BatchNo);
                    $doc->exportCaption($this->ExpDate);
                    $doc->exportCaption($this->PrName);
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
                    $doc->exportCaption($this->BRCODE);
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
                    $doc->exportCaption($this->BillDate);
                } else {
                    $doc->exportCaption($this->ORDNO);
                    $doc->exportCaption($this->PRC);
                    $doc->exportCaption($this->QTY);
                    $doc->exportCaption($this->DT);
                    $doc->exportCaption($this->PC);
                    $doc->exportCaption($this->YM);
                    $doc->exportCaption($this->MFRCODE);
                    $doc->exportCaption($this->Stock);
                    $doc->exportCaption($this->LastMonthSale);
                    $doc->exportCaption($this->Printcheck);
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->poid);
                    $doc->exportCaption($this->grnid);
                    $doc->exportCaption($this->BatchNo);
                    $doc->exportCaption($this->ExpDate);
                    $doc->exportCaption($this->PrName);
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
                    $doc->exportCaption($this->BRCODE);
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
                    $doc->exportCaption($this->BillDate);
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
                        $doc->exportField($this->ORDNO);
                        $doc->exportField($this->PRC);
                        $doc->exportField($this->QTY);
                        $doc->exportField($this->DT);
                        $doc->exportField($this->PC);
                        $doc->exportField($this->YM);
                        $doc->exportField($this->MFRCODE);
                        $doc->exportField($this->Stock);
                        $doc->exportField($this->LastMonthSale);
                        $doc->exportField($this->Printcheck);
                        $doc->exportField($this->id);
                        $doc->exportField($this->poid);
                        $doc->exportField($this->grnid);
                        $doc->exportField($this->BatchNo);
                        $doc->exportField($this->ExpDate);
                        $doc->exportField($this->PrName);
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
                        $doc->exportField($this->BRCODE);
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
                        $doc->exportField($this->BillDate);
                    } else {
                        $doc->exportField($this->ORDNO);
                        $doc->exportField($this->PRC);
                        $doc->exportField($this->QTY);
                        $doc->exportField($this->DT);
                        $doc->exportField($this->PC);
                        $doc->exportField($this->YM);
                        $doc->exportField($this->MFRCODE);
                        $doc->exportField($this->Stock);
                        $doc->exportField($this->LastMonthSale);
                        $doc->exportField($this->Printcheck);
                        $doc->exportField($this->id);
                        $doc->exportField($this->poid);
                        $doc->exportField($this->grnid);
                        $doc->exportField($this->BatchNo);
                        $doc->exportField($this->ExpDate);
                        $doc->exportField($this->PrName);
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
                        $doc->exportField($this->BRCODE);
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
                        $doc->exportField($this->BillDate);
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
