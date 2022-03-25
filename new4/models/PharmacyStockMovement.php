<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for pharmacy_stock_movement
 */
class PharmacyStockMovement extends DbTable
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
    public $PRC;
    public $PrName;
    public $BATCHNO;
    public $OpeningStk;
    public $PurchaseQty;
    public $SalesQty;
    public $ClosingStk;
    public $PurchasefreeQty;
    public $TransferingQty;
    public $UnitPurchaseRate;
    public $UnitSaleRate;
    public $CreatedDate;
    public $OQ;
    public $RQ;
    public $MRQ;
    public $IQ;
    public $MRP;
    public $EXPDT;
    public $UR;
    public $RT;
    public $PRCODE;
    public $BATCH;
    public $PC;
    public $OLDRT;
    public $TEMPMRQ;
    public $TAXP;
    public $OLDRATE;
    public $NEWRATE;
    public $OTEMPMRA;
    public $ACTIVESTATUS;
    public $PSGST;
    public $PCGST;
    public $SSGST;
    public $SCGST;
    public $MFRCODE;
    public $BRCODE;
    public $FRQ;
    public $HospID;
    public $UM;
    public $GENNAME;
    public $BILLDATE;
    public $CreatedDateTime;
    public $baid;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'pharmacy_stock_movement';
        $this->TableName = 'pharmacy_stock_movement';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`pharmacy_stock_movement`";
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
        $this->id = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // PRC
        $this->PRC = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_PRC', 'PRC', '`PRC`', '`PRC`', 200, 9, -1, false, '`PRC`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PRC->Sortable = true; // Allow sort
        $this->PRC->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PRC->Param, "CustomMsg");
        $this->Fields['PRC'] = &$this->PRC;

        // PrName
        $this->PrName = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_PrName', 'PrName', '`PrName`', '`PrName`', 200, 100, -1, false, '`PrName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PrName->Sortable = true; // Allow sort
        $this->PrName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PrName->Param, "CustomMsg");
        $this->Fields['PrName'] = &$this->PrName;

        // BATCHNO
        $this->BATCHNO = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_BATCHNO', 'BATCHNO', '`BATCHNO`', '`BATCHNO`', 200, 10, -1, false, '`BATCHNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BATCHNO->Sortable = true; // Allow sort
        $this->BATCHNO->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BATCHNO->Param, "CustomMsg");
        $this->Fields['BATCHNO'] = &$this->BATCHNO;

        // OpeningStk
        $this->OpeningStk = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_OpeningStk', 'OpeningStk', '`OpeningStk`', '`OpeningStk`', 131, 12, -1, false, '`OpeningStk`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OpeningStk->Sortable = true; // Allow sort
        $this->OpeningStk->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OpeningStk->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->OpeningStk->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OpeningStk->Param, "CustomMsg");
        $this->Fields['OpeningStk'] = &$this->OpeningStk;

        // PurchaseQty
        $this->PurchaseQty = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_PurchaseQty', 'PurchaseQty', '`PurchaseQty`', '`PurchaseQty`', 131, 12, -1, false, '`PurchaseQty`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PurchaseQty->Sortable = true; // Allow sort
        $this->PurchaseQty->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PurchaseQty->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->PurchaseQty->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PurchaseQty->Param, "CustomMsg");
        $this->Fields['PurchaseQty'] = &$this->PurchaseQty;

        // SalesQty
        $this->SalesQty = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_SalesQty', 'SalesQty', '`SalesQty`', '`SalesQty`', 131, 12, -1, false, '`SalesQty`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SalesQty->Sortable = true; // Allow sort
        $this->SalesQty->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SalesQty->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->SalesQty->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SalesQty->Param, "CustomMsg");
        $this->Fields['SalesQty'] = &$this->SalesQty;

        // ClosingStk
        $this->ClosingStk = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_ClosingStk', 'ClosingStk', '`ClosingStk`', '`ClosingStk`', 131, 12, -1, false, '`ClosingStk`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ClosingStk->Sortable = true; // Allow sort
        $this->ClosingStk->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->ClosingStk->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->ClosingStk->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ClosingStk->Param, "CustomMsg");
        $this->Fields['ClosingStk'] = &$this->ClosingStk;

        // PurchasefreeQty
        $this->PurchasefreeQty = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_PurchasefreeQty', 'PurchasefreeQty', '`PurchasefreeQty`', '`PurchasefreeQty`', 131, 12, -1, false, '`PurchasefreeQty`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PurchasefreeQty->Sortable = true; // Allow sort
        $this->PurchasefreeQty->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PurchasefreeQty->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->PurchasefreeQty->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PurchasefreeQty->Param, "CustomMsg");
        $this->Fields['PurchasefreeQty'] = &$this->PurchasefreeQty;

        // TransferingQty
        $this->TransferingQty = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_TransferingQty', 'TransferingQty', '`TransferingQty`', '`TransferingQty`', 131, 12, -1, false, '`TransferingQty`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TransferingQty->Sortable = true; // Allow sort
        $this->TransferingQty->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->TransferingQty->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->TransferingQty->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TransferingQty->Param, "CustomMsg");
        $this->Fields['TransferingQty'] = &$this->TransferingQty;

        // UnitPurchaseRate
        $this->UnitPurchaseRate = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_UnitPurchaseRate', 'UnitPurchaseRate', '`UnitPurchaseRate`', '`UnitPurchaseRate`', 131, 12, -1, false, '`UnitPurchaseRate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->UnitPurchaseRate->Sortable = true; // Allow sort
        $this->UnitPurchaseRate->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->UnitPurchaseRate->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->UnitPurchaseRate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->UnitPurchaseRate->Param, "CustomMsg");
        $this->Fields['UnitPurchaseRate'] = &$this->UnitPurchaseRate;

        // UnitSaleRate
        $this->UnitSaleRate = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_UnitSaleRate', 'UnitSaleRate', '`UnitSaleRate`', '`UnitSaleRate`', 131, 12, -1, false, '`UnitSaleRate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->UnitSaleRate->Sortable = true; // Allow sort
        $this->UnitSaleRate->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->UnitSaleRate->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->UnitSaleRate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->UnitSaleRate->Param, "CustomMsg");
        $this->Fields['UnitSaleRate'] = &$this->UnitSaleRate;

        // CreatedDate
        $this->CreatedDate = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_CreatedDate', 'CreatedDate', '`CreatedDate`', CastDateFieldForLike("`CreatedDate`", 0, "DB"), 133, 10, 0, false, '`CreatedDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CreatedDate->Sortable = true; // Allow sort
        $this->CreatedDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->CreatedDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CreatedDate->Param, "CustomMsg");
        $this->Fields['CreatedDate'] = &$this->CreatedDate;

        // OQ
        $this->OQ = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_OQ', 'OQ', '`OQ`', '`OQ`', 131, 12, -1, false, '`OQ`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OQ->Sortable = true; // Allow sort
        $this->OQ->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OQ->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->OQ->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OQ->Param, "CustomMsg");
        $this->Fields['OQ'] = &$this->OQ;

        // RQ
        $this->RQ = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_RQ', 'RQ', '`RQ`', '`RQ`', 131, 12, -1, false, '`RQ`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RQ->Sortable = true; // Allow sort
        $this->RQ->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->RQ->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->RQ->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RQ->Param, "CustomMsg");
        $this->Fields['RQ'] = &$this->RQ;

        // MRQ
        $this->MRQ = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_MRQ', 'MRQ', '`MRQ`', '`MRQ`', 131, 12, -1, false, '`MRQ`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MRQ->Sortable = true; // Allow sort
        $this->MRQ->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->MRQ->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->MRQ->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MRQ->Param, "CustomMsg");
        $this->Fields['MRQ'] = &$this->MRQ;

        // IQ
        $this->IQ = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_IQ', 'IQ', '`IQ`', '`IQ`', 131, 12, -1, false, '`IQ`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IQ->Sortable = true; // Allow sort
        $this->IQ->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->IQ->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->IQ->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IQ->Param, "CustomMsg");
        $this->Fields['IQ'] = &$this->IQ;

        // MRP
        $this->MRP = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_MRP', 'MRP', '`MRP`', '`MRP`', 131, 12, -1, false, '`MRP`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MRP->Sortable = true; // Allow sort
        $this->MRP->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->MRP->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->MRP->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MRP->Param, "CustomMsg");
        $this->Fields['MRP'] = &$this->MRP;

        // EXPDT
        $this->EXPDT = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_EXPDT', 'EXPDT', '`EXPDT`', CastDateFieldForLike("`EXPDT`", 0, "DB"), 135, 19, 0, false, '`EXPDT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EXPDT->Sortable = true; // Allow sort
        $this->EXPDT->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->EXPDT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EXPDT->Param, "CustomMsg");
        $this->Fields['EXPDT'] = &$this->EXPDT;

        // UR
        $this->UR = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_UR', 'UR', '`UR`', '`UR`', 131, 12, -1, false, '`UR`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->UR->Sortable = true; // Allow sort
        $this->UR->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->UR->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->UR->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->UR->Param, "CustomMsg");
        $this->Fields['UR'] = &$this->UR;

        // RT
        $this->RT = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_RT', 'RT', '`RT`', '`RT`', 131, 12, -1, false, '`RT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RT->Sortable = true; // Allow sort
        $this->RT->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->RT->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->RT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RT->Param, "CustomMsg");
        $this->Fields['RT'] = &$this->RT;

        // PRCODE
        $this->PRCODE = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_PRCODE', 'PRCODE', '`PRCODE`', '`PRCODE`', 200, 9, -1, false, '`PRCODE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PRCODE->Sortable = true; // Allow sort
        $this->PRCODE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PRCODE->Param, "CustomMsg");
        $this->Fields['PRCODE'] = &$this->PRCODE;

        // BATCH
        $this->BATCH = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_BATCH', 'BATCH', '`BATCH`', '`BATCH`', 200, 10, -1, false, '`BATCH`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BATCH->Sortable = true; // Allow sort
        $this->BATCH->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BATCH->Param, "CustomMsg");
        $this->Fields['BATCH'] = &$this->BATCH;

        // PC
        $this->PC = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_PC', 'PC', '`PC`', '`PC`', 200, 5, -1, false, '`PC`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PC->Sortable = true; // Allow sort
        $this->PC->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PC->Param, "CustomMsg");
        $this->Fields['PC'] = &$this->PC;

        // OLDRT
        $this->OLDRT = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_OLDRT', 'OLDRT', '`OLDRT`', '`OLDRT`', 131, 12, -1, false, '`OLDRT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OLDRT->Sortable = true; // Allow sort
        $this->OLDRT->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OLDRT->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->OLDRT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OLDRT->Param, "CustomMsg");
        $this->Fields['OLDRT'] = &$this->OLDRT;

        // TEMPMRQ
        $this->TEMPMRQ = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_TEMPMRQ', 'TEMPMRQ', '`TEMPMRQ`', '`TEMPMRQ`', 131, 12, -1, false, '`TEMPMRQ`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TEMPMRQ->Sortable = true; // Allow sort
        $this->TEMPMRQ->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->TEMPMRQ->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->TEMPMRQ->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TEMPMRQ->Param, "CustomMsg");
        $this->Fields['TEMPMRQ'] = &$this->TEMPMRQ;

        // TAXP
        $this->TAXP = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_TAXP', 'TAXP', '`TAXP`', '`TAXP`', 131, 12, -1, false, '`TAXP`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TAXP->Sortable = true; // Allow sort
        $this->TAXP->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->TAXP->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->TAXP->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TAXP->Param, "CustomMsg");
        $this->Fields['TAXP'] = &$this->TAXP;

        // OLDRATE
        $this->OLDRATE = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_OLDRATE', 'OLDRATE', '`OLDRATE`', '`OLDRATE`', 131, 12, -1, false, '`OLDRATE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OLDRATE->Sortable = true; // Allow sort
        $this->OLDRATE->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OLDRATE->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->OLDRATE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OLDRATE->Param, "CustomMsg");
        $this->Fields['OLDRATE'] = &$this->OLDRATE;

        // NEWRATE
        $this->NEWRATE = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_NEWRATE', 'NEWRATE', '`NEWRATE`', '`NEWRATE`', 131, 12, -1, false, '`NEWRATE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NEWRATE->Sortable = true; // Allow sort
        $this->NEWRATE->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->NEWRATE->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->NEWRATE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->NEWRATE->Param, "CustomMsg");
        $this->Fields['NEWRATE'] = &$this->NEWRATE;

        // OTEMPMRA
        $this->OTEMPMRA = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_OTEMPMRA', 'OTEMPMRA', '`OTEMPMRA`', '`OTEMPMRA`', 131, 12, -1, false, '`OTEMPMRA`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OTEMPMRA->Sortable = true; // Allow sort
        $this->OTEMPMRA->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OTEMPMRA->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->OTEMPMRA->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OTEMPMRA->Param, "CustomMsg");
        $this->Fields['OTEMPMRA'] = &$this->OTEMPMRA;

        // ACTIVESTATUS
        $this->ACTIVESTATUS = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_ACTIVESTATUS', 'ACTIVESTATUS', '`ACTIVESTATUS`', '`ACTIVESTATUS`', 200, 99, -1, false, '`ACTIVESTATUS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ACTIVESTATUS->Sortable = true; // Allow sort
        $this->ACTIVESTATUS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ACTIVESTATUS->Param, "CustomMsg");
        $this->Fields['ACTIVESTATUS'] = &$this->ACTIVESTATUS;

        // PSGST
        $this->PSGST = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_PSGST', 'PSGST', '`PSGST`', '`PSGST`', 131, 12, -1, false, '`PSGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PSGST->Sortable = true; // Allow sort
        $this->PSGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PSGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->PSGST->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PSGST->Param, "CustomMsg");
        $this->Fields['PSGST'] = &$this->PSGST;

        // PCGST
        $this->PCGST = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_PCGST', 'PCGST', '`PCGST`', '`PCGST`', 131, 12, -1, false, '`PCGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PCGST->Sortable = true; // Allow sort
        $this->PCGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PCGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->PCGST->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PCGST->Param, "CustomMsg");
        $this->Fields['PCGST'] = &$this->PCGST;

        // SSGST
        $this->SSGST = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_SSGST', 'SSGST', '`SSGST`', '`SSGST`', 131, 12, -1, false, '`SSGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SSGST->Sortable = true; // Allow sort
        $this->SSGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SSGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->SSGST->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SSGST->Param, "CustomMsg");
        $this->Fields['SSGST'] = &$this->SSGST;

        // SCGST
        $this->SCGST = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_SCGST', 'SCGST', '`SCGST`', '`SCGST`', 131, 12, -1, false, '`SCGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SCGST->Sortable = true; // Allow sort
        $this->SCGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SCGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->SCGST->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SCGST->Param, "CustomMsg");
        $this->Fields['SCGST'] = &$this->SCGST;

        // MFRCODE
        $this->MFRCODE = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_MFRCODE', 'MFRCODE', '`MFRCODE`', '`MFRCODE`', 200, 45, -1, false, '`MFRCODE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MFRCODE->Sortable = true; // Allow sort
        $this->MFRCODE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MFRCODE->Param, "CustomMsg");
        $this->Fields['MFRCODE'] = &$this->MFRCODE;

        // BRCODE
        $this->BRCODE = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_BRCODE', 'BRCODE', '`BRCODE`', '`BRCODE`', 3, 11, -1, false, '`BRCODE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BRCODE->Sortable = true; // Allow sort
        $this->BRCODE->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->BRCODE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BRCODE->Param, "CustomMsg");
        $this->Fields['BRCODE'] = &$this->BRCODE;

        // FRQ
        $this->FRQ = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_FRQ', 'FRQ', '`FRQ`', '`FRQ`', 131, 12, -1, false, '`FRQ`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FRQ->Sortable = true; // Allow sort
        $this->FRQ->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->FRQ->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->FRQ->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FRQ->Param, "CustomMsg");
        $this->Fields['FRQ'] = &$this->FRQ;

        // HospID
        $this->HospID = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->HospID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospID->Param, "CustomMsg");
        $this->Fields['HospID'] = &$this->HospID;

        // UM
        $this->UM = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_UM', 'UM', '`UM`', '`UM`', 200, 45, -1, false, '`UM`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->UM->Sortable = true; // Allow sort
        $this->UM->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->UM->Param, "CustomMsg");
        $this->Fields['UM'] = &$this->UM;

        // GENNAME
        $this->GENNAME = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_GENNAME', 'GENNAME', '`GENNAME`', '`GENNAME`', 200, 150, -1, false, '`GENNAME`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GENNAME->Sortable = true; // Allow sort
        $this->GENNAME->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GENNAME->Param, "CustomMsg");
        $this->Fields['GENNAME'] = &$this->GENNAME;

        // BILLDATE
        $this->BILLDATE = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_BILLDATE', 'BILLDATE', '`BILLDATE`', CastDateFieldForLike("`BILLDATE`", 0, "DB"), 135, 19, 0, false, '`BILLDATE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BILLDATE->Sortable = true; // Allow sort
        $this->BILLDATE->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->BILLDATE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BILLDATE->Param, "CustomMsg");
        $this->Fields['BILLDATE'] = &$this->BILLDATE;

        // CreatedDateTime
        $this->CreatedDateTime = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_CreatedDateTime', 'CreatedDateTime', '`CreatedDateTime`', CastDateFieldForLike("`CreatedDateTime`", 0, "DB"), 135, 19, 0, false, '`CreatedDateTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CreatedDateTime->Sortable = true; // Allow sort
        $this->CreatedDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->CreatedDateTime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CreatedDateTime->Param, "CustomMsg");
        $this->Fields['CreatedDateTime'] = &$this->CreatedDateTime;

        // baid
        $this->baid = new DbField('pharmacy_stock_movement', 'pharmacy_stock_movement', 'x_baid', 'baid', '`baid`', '`baid`', 3, 11, -1, false, '`baid`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->baid->Sortable = true; // Allow sort
        $this->baid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->baid->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->baid->Param, "CustomMsg");
        $this->Fields['baid'] = &$this->baid;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`pharmacy_stock_movement`";
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
        $this->DefaultFilter = "`HospID`='".HospitalID()."'  and  `BRCODE`='".PharmacyID()."'";
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
        $this->PRC->DbValue = $row['PRC'];
        $this->PrName->DbValue = $row['PrName'];
        $this->BATCHNO->DbValue = $row['BATCHNO'];
        $this->OpeningStk->DbValue = $row['OpeningStk'];
        $this->PurchaseQty->DbValue = $row['PurchaseQty'];
        $this->SalesQty->DbValue = $row['SalesQty'];
        $this->ClosingStk->DbValue = $row['ClosingStk'];
        $this->PurchasefreeQty->DbValue = $row['PurchasefreeQty'];
        $this->TransferingQty->DbValue = $row['TransferingQty'];
        $this->UnitPurchaseRate->DbValue = $row['UnitPurchaseRate'];
        $this->UnitSaleRate->DbValue = $row['UnitSaleRate'];
        $this->CreatedDate->DbValue = $row['CreatedDate'];
        $this->OQ->DbValue = $row['OQ'];
        $this->RQ->DbValue = $row['RQ'];
        $this->MRQ->DbValue = $row['MRQ'];
        $this->IQ->DbValue = $row['IQ'];
        $this->MRP->DbValue = $row['MRP'];
        $this->EXPDT->DbValue = $row['EXPDT'];
        $this->UR->DbValue = $row['UR'];
        $this->RT->DbValue = $row['RT'];
        $this->PRCODE->DbValue = $row['PRCODE'];
        $this->BATCH->DbValue = $row['BATCH'];
        $this->PC->DbValue = $row['PC'];
        $this->OLDRT->DbValue = $row['OLDRT'];
        $this->TEMPMRQ->DbValue = $row['TEMPMRQ'];
        $this->TAXP->DbValue = $row['TAXP'];
        $this->OLDRATE->DbValue = $row['OLDRATE'];
        $this->NEWRATE->DbValue = $row['NEWRATE'];
        $this->OTEMPMRA->DbValue = $row['OTEMPMRA'];
        $this->ACTIVESTATUS->DbValue = $row['ACTIVESTATUS'];
        $this->PSGST->DbValue = $row['PSGST'];
        $this->PCGST->DbValue = $row['PCGST'];
        $this->SSGST->DbValue = $row['SSGST'];
        $this->SCGST->DbValue = $row['SCGST'];
        $this->MFRCODE->DbValue = $row['MFRCODE'];
        $this->BRCODE->DbValue = $row['BRCODE'];
        $this->FRQ->DbValue = $row['FRQ'];
        $this->HospID->DbValue = $row['HospID'];
        $this->UM->DbValue = $row['UM'];
        $this->GENNAME->DbValue = $row['GENNAME'];
        $this->BILLDATE->DbValue = $row['BILLDATE'];
        $this->CreatedDateTime->DbValue = $row['CreatedDateTime'];
        $this->baid->DbValue = $row['baid'];
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
        return $_SESSION[$name] ?? GetUrl("PharmacyStockMovementList");
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
        if ($pageName == "PharmacyStockMovementView") {
            return $Language->phrase("View");
        } elseif ($pageName == "PharmacyStockMovementEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "PharmacyStockMovementAdd") {
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
                return "PharmacyStockMovementView";
            case Config("API_ADD_ACTION"):
                return "PharmacyStockMovementAdd";
            case Config("API_EDIT_ACTION"):
                return "PharmacyStockMovementEdit";
            case Config("API_DELETE_ACTION"):
                return "PharmacyStockMovementDelete";
            case Config("API_LIST_ACTION"):
                return "PharmacyStockMovementList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "PharmacyStockMovementList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("PharmacyStockMovementView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("PharmacyStockMovementView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "PharmacyStockMovementAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "PharmacyStockMovementAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("PharmacyStockMovementEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("PharmacyStockMovementAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("PharmacyStockMovementDelete", $this->getUrlParm());
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
        $this->PRC->setDbValue($row['PRC']);
        $this->PrName->setDbValue($row['PrName']);
        $this->BATCHNO->setDbValue($row['BATCHNO']);
        $this->OpeningStk->setDbValue($row['OpeningStk']);
        $this->PurchaseQty->setDbValue($row['PurchaseQty']);
        $this->SalesQty->setDbValue($row['SalesQty']);
        $this->ClosingStk->setDbValue($row['ClosingStk']);
        $this->PurchasefreeQty->setDbValue($row['PurchasefreeQty']);
        $this->TransferingQty->setDbValue($row['TransferingQty']);
        $this->UnitPurchaseRate->setDbValue($row['UnitPurchaseRate']);
        $this->UnitSaleRate->setDbValue($row['UnitSaleRate']);
        $this->CreatedDate->setDbValue($row['CreatedDate']);
        $this->OQ->setDbValue($row['OQ']);
        $this->RQ->setDbValue($row['RQ']);
        $this->MRQ->setDbValue($row['MRQ']);
        $this->IQ->setDbValue($row['IQ']);
        $this->MRP->setDbValue($row['MRP']);
        $this->EXPDT->setDbValue($row['EXPDT']);
        $this->UR->setDbValue($row['UR']);
        $this->RT->setDbValue($row['RT']);
        $this->PRCODE->setDbValue($row['PRCODE']);
        $this->BATCH->setDbValue($row['BATCH']);
        $this->PC->setDbValue($row['PC']);
        $this->OLDRT->setDbValue($row['OLDRT']);
        $this->TEMPMRQ->setDbValue($row['TEMPMRQ']);
        $this->TAXP->setDbValue($row['TAXP']);
        $this->OLDRATE->setDbValue($row['OLDRATE']);
        $this->NEWRATE->setDbValue($row['NEWRATE']);
        $this->OTEMPMRA->setDbValue($row['OTEMPMRA']);
        $this->ACTIVESTATUS->setDbValue($row['ACTIVESTATUS']);
        $this->PSGST->setDbValue($row['PSGST']);
        $this->PCGST->setDbValue($row['PCGST']);
        $this->SSGST->setDbValue($row['SSGST']);
        $this->SCGST->setDbValue($row['SCGST']);
        $this->MFRCODE->setDbValue($row['MFRCODE']);
        $this->BRCODE->setDbValue($row['BRCODE']);
        $this->FRQ->setDbValue($row['FRQ']);
        $this->HospID->setDbValue($row['HospID']);
        $this->UM->setDbValue($row['UM']);
        $this->GENNAME->setDbValue($row['GENNAME']);
        $this->BILLDATE->setDbValue($row['BILLDATE']);
        $this->CreatedDateTime->setDbValue($row['CreatedDateTime']);
        $this->baid->setDbValue($row['baid']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // PRC

        // PrName

        // BATCHNO

        // OpeningStk

        // PurchaseQty

        // SalesQty

        // ClosingStk

        // PurchasefreeQty

        // TransferingQty

        // UnitPurchaseRate

        // UnitSaleRate

        // CreatedDate

        // OQ

        // RQ

        // MRQ

        // IQ

        // MRP

        // EXPDT

        // UR

        // RT

        // PRCODE

        // BATCH

        // PC

        // OLDRT

        // TEMPMRQ

        // TAXP

        // OLDRATE

        // NEWRATE

        // OTEMPMRA

        // ACTIVESTATUS

        // PSGST

        // PCGST

        // SSGST

        // SCGST

        // MFRCODE

        // BRCODE

        // FRQ

        // HospID

        // UM

        // GENNAME

        // BILLDATE

        // CreatedDateTime

        // baid

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // PRC
        $this->PRC->ViewValue = $this->PRC->CurrentValue;
        $this->PRC->ViewCustomAttributes = "";

        // PrName
        $this->PrName->ViewValue = $this->PrName->CurrentValue;
        $this->PrName->ViewCustomAttributes = "";

        // BATCHNO
        $this->BATCHNO->ViewValue = $this->BATCHNO->CurrentValue;
        $this->BATCHNO->ViewCustomAttributes = "";

        // OpeningStk
        $this->OpeningStk->ViewValue = $this->OpeningStk->CurrentValue;
        $this->OpeningStk->ViewValue = FormatNumber($this->OpeningStk->ViewValue, 2, -2, -2, -2);
        $this->OpeningStk->ViewCustomAttributes = "";

        // PurchaseQty
        $this->PurchaseQty->ViewValue = $this->PurchaseQty->CurrentValue;
        $this->PurchaseQty->ViewValue = FormatNumber($this->PurchaseQty->ViewValue, 2, -2, -2, -2);
        $this->PurchaseQty->ViewCustomAttributes = "";

        // SalesQty
        $this->SalesQty->ViewValue = $this->SalesQty->CurrentValue;
        $this->SalesQty->ViewValue = FormatNumber($this->SalesQty->ViewValue, 2, -2, -2, -2);
        $this->SalesQty->ViewCustomAttributes = "";

        // ClosingStk
        $this->ClosingStk->ViewValue = $this->ClosingStk->CurrentValue;
        $this->ClosingStk->ViewValue = FormatNumber($this->ClosingStk->ViewValue, 2, -2, -2, -2);
        $this->ClosingStk->ViewCustomAttributes = "";

        // PurchasefreeQty
        $this->PurchasefreeQty->ViewValue = $this->PurchasefreeQty->CurrentValue;
        $this->PurchasefreeQty->ViewValue = FormatNumber($this->PurchasefreeQty->ViewValue, 2, -2, -2, -2);
        $this->PurchasefreeQty->ViewCustomAttributes = "";

        // TransferingQty
        $this->TransferingQty->ViewValue = $this->TransferingQty->CurrentValue;
        $this->TransferingQty->ViewValue = FormatNumber($this->TransferingQty->ViewValue, 2, -2, -2, -2);
        $this->TransferingQty->ViewCustomAttributes = "";

        // UnitPurchaseRate
        $this->UnitPurchaseRate->ViewValue = $this->UnitPurchaseRate->CurrentValue;
        $this->UnitPurchaseRate->ViewValue = FormatNumber($this->UnitPurchaseRate->ViewValue, 2, -2, -2, -2);
        $this->UnitPurchaseRate->ViewCustomAttributes = "";

        // UnitSaleRate
        $this->UnitSaleRate->ViewValue = $this->UnitSaleRate->CurrentValue;
        $this->UnitSaleRate->ViewValue = FormatNumber($this->UnitSaleRate->ViewValue, 2, -2, -2, -2);
        $this->UnitSaleRate->ViewCustomAttributes = "";

        // CreatedDate
        $this->CreatedDate->ViewValue = $this->CreatedDate->CurrentValue;
        $this->CreatedDate->ViewValue = FormatDateTime($this->CreatedDate->ViewValue, 0);
        $this->CreatedDate->ViewCustomAttributes = "";

        // OQ
        $this->OQ->ViewValue = $this->OQ->CurrentValue;
        $this->OQ->ViewValue = FormatNumber($this->OQ->ViewValue, 2, -2, -2, -2);
        $this->OQ->ViewCustomAttributes = "";

        // RQ
        $this->RQ->ViewValue = $this->RQ->CurrentValue;
        $this->RQ->ViewValue = FormatNumber($this->RQ->ViewValue, 2, -2, -2, -2);
        $this->RQ->ViewCustomAttributes = "";

        // MRQ
        $this->MRQ->ViewValue = $this->MRQ->CurrentValue;
        $this->MRQ->ViewValue = FormatNumber($this->MRQ->ViewValue, 2, -2, -2, -2);
        $this->MRQ->ViewCustomAttributes = "";

        // IQ
        $this->IQ->ViewValue = $this->IQ->CurrentValue;
        $this->IQ->ViewValue = FormatNumber($this->IQ->ViewValue, 2, -2, -2, -2);
        $this->IQ->ViewCustomAttributes = "";

        // MRP
        $this->MRP->ViewValue = $this->MRP->CurrentValue;
        $this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
        $this->MRP->ViewCustomAttributes = "";

        // EXPDT
        $this->EXPDT->ViewValue = $this->EXPDT->CurrentValue;
        $this->EXPDT->ViewValue = FormatDateTime($this->EXPDT->ViewValue, 0);
        $this->EXPDT->ViewCustomAttributes = "";

        // UR
        $this->UR->ViewValue = $this->UR->CurrentValue;
        $this->UR->ViewValue = FormatNumber($this->UR->ViewValue, 2, -2, -2, -2);
        $this->UR->ViewCustomAttributes = "";

        // RT
        $this->RT->ViewValue = $this->RT->CurrentValue;
        $this->RT->ViewValue = FormatNumber($this->RT->ViewValue, 2, -2, -2, -2);
        $this->RT->ViewCustomAttributes = "";

        // PRCODE
        $this->PRCODE->ViewValue = $this->PRCODE->CurrentValue;
        $this->PRCODE->ViewCustomAttributes = "";

        // BATCH
        $this->BATCH->ViewValue = $this->BATCH->CurrentValue;
        $this->BATCH->ViewCustomAttributes = "";

        // PC
        $this->PC->ViewValue = $this->PC->CurrentValue;
        $this->PC->ViewCustomAttributes = "";

        // OLDRT
        $this->OLDRT->ViewValue = $this->OLDRT->CurrentValue;
        $this->OLDRT->ViewValue = FormatNumber($this->OLDRT->ViewValue, 2, -2, -2, -2);
        $this->OLDRT->ViewCustomAttributes = "";

        // TEMPMRQ
        $this->TEMPMRQ->ViewValue = $this->TEMPMRQ->CurrentValue;
        $this->TEMPMRQ->ViewValue = FormatNumber($this->TEMPMRQ->ViewValue, 2, -2, -2, -2);
        $this->TEMPMRQ->ViewCustomAttributes = "";

        // TAXP
        $this->TAXP->ViewValue = $this->TAXP->CurrentValue;
        $this->TAXP->ViewValue = FormatNumber($this->TAXP->ViewValue, 2, -2, -2, -2);
        $this->TAXP->ViewCustomAttributes = "";

        // OLDRATE
        $this->OLDRATE->ViewValue = $this->OLDRATE->CurrentValue;
        $this->OLDRATE->ViewValue = FormatNumber($this->OLDRATE->ViewValue, 2, -2, -2, -2);
        $this->OLDRATE->ViewCustomAttributes = "";

        // NEWRATE
        $this->NEWRATE->ViewValue = $this->NEWRATE->CurrentValue;
        $this->NEWRATE->ViewValue = FormatNumber($this->NEWRATE->ViewValue, 2, -2, -2, -2);
        $this->NEWRATE->ViewCustomAttributes = "";

        // OTEMPMRA
        $this->OTEMPMRA->ViewValue = $this->OTEMPMRA->CurrentValue;
        $this->OTEMPMRA->ViewValue = FormatNumber($this->OTEMPMRA->ViewValue, 2, -2, -2, -2);
        $this->OTEMPMRA->ViewCustomAttributes = "";

        // ACTIVESTATUS
        $this->ACTIVESTATUS->ViewValue = $this->ACTIVESTATUS->CurrentValue;
        $this->ACTIVESTATUS->ViewCustomAttributes = "";

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

        // MFRCODE
        $this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
        $this->MFRCODE->ViewCustomAttributes = "";

        // BRCODE
        $this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
        $this->BRCODE->ViewValue = FormatNumber($this->BRCODE->ViewValue, 0, -2, -2, -2);
        $this->BRCODE->ViewCustomAttributes = "";

        // FRQ
        $this->FRQ->ViewValue = $this->FRQ->CurrentValue;
        $this->FRQ->ViewValue = FormatNumber($this->FRQ->ViewValue, 2, -2, -2, -2);
        $this->FRQ->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

        // UM
        $this->UM->ViewValue = $this->UM->CurrentValue;
        $this->UM->ViewCustomAttributes = "";

        // GENNAME
        $this->GENNAME->ViewValue = $this->GENNAME->CurrentValue;
        $this->GENNAME->ViewCustomAttributes = "";

        // BILLDATE
        $this->BILLDATE->ViewValue = $this->BILLDATE->CurrentValue;
        $this->BILLDATE->ViewValue = FormatDateTime($this->BILLDATE->ViewValue, 0);
        $this->BILLDATE->ViewCustomAttributes = "";

        // CreatedDateTime
        $this->CreatedDateTime->ViewValue = $this->CreatedDateTime->CurrentValue;
        $this->CreatedDateTime->ViewValue = FormatDateTime($this->CreatedDateTime->ViewValue, 0);
        $this->CreatedDateTime->ViewCustomAttributes = "";

        // baid
        $this->baid->ViewValue = $this->baid->CurrentValue;
        $this->baid->ViewValue = FormatNumber($this->baid->ViewValue, 0, -2, -2, -2);
        $this->baid->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // PRC
        $this->PRC->LinkCustomAttributes = "";
        $this->PRC->HrefValue = "";
        $this->PRC->TooltipValue = "";

        // PrName
        $this->PrName->LinkCustomAttributes = "";
        $this->PrName->HrefValue = "";
        $this->PrName->TooltipValue = "";

        // BATCHNO
        $this->BATCHNO->LinkCustomAttributes = "";
        $this->BATCHNO->HrefValue = "";
        $this->BATCHNO->TooltipValue = "";

        // OpeningStk
        $this->OpeningStk->LinkCustomAttributes = "";
        $this->OpeningStk->HrefValue = "";
        $this->OpeningStk->TooltipValue = "";

        // PurchaseQty
        $this->PurchaseQty->LinkCustomAttributes = "";
        $this->PurchaseQty->HrefValue = "";
        $this->PurchaseQty->TooltipValue = "";

        // SalesQty
        $this->SalesQty->LinkCustomAttributes = "";
        $this->SalesQty->HrefValue = "";
        $this->SalesQty->TooltipValue = "";

        // ClosingStk
        $this->ClosingStk->LinkCustomAttributes = "";
        $this->ClosingStk->HrefValue = "";
        $this->ClosingStk->TooltipValue = "";

        // PurchasefreeQty
        $this->PurchasefreeQty->LinkCustomAttributes = "";
        $this->PurchasefreeQty->HrefValue = "";
        $this->PurchasefreeQty->TooltipValue = "";

        // TransferingQty
        $this->TransferingQty->LinkCustomAttributes = "";
        $this->TransferingQty->HrefValue = "";
        $this->TransferingQty->TooltipValue = "";

        // UnitPurchaseRate
        $this->UnitPurchaseRate->LinkCustomAttributes = "";
        $this->UnitPurchaseRate->HrefValue = "";
        $this->UnitPurchaseRate->TooltipValue = "";

        // UnitSaleRate
        $this->UnitSaleRate->LinkCustomAttributes = "";
        $this->UnitSaleRate->HrefValue = "";
        $this->UnitSaleRate->TooltipValue = "";

        // CreatedDate
        $this->CreatedDate->LinkCustomAttributes = "";
        $this->CreatedDate->HrefValue = "";
        $this->CreatedDate->TooltipValue = "";

        // OQ
        $this->OQ->LinkCustomAttributes = "";
        $this->OQ->HrefValue = "";
        $this->OQ->TooltipValue = "";

        // RQ
        $this->RQ->LinkCustomAttributes = "";
        $this->RQ->HrefValue = "";
        $this->RQ->TooltipValue = "";

        // MRQ
        $this->MRQ->LinkCustomAttributes = "";
        $this->MRQ->HrefValue = "";
        $this->MRQ->TooltipValue = "";

        // IQ
        $this->IQ->LinkCustomAttributes = "";
        $this->IQ->HrefValue = "";
        $this->IQ->TooltipValue = "";

        // MRP
        $this->MRP->LinkCustomAttributes = "";
        $this->MRP->HrefValue = "";
        $this->MRP->TooltipValue = "";

        // EXPDT
        $this->EXPDT->LinkCustomAttributes = "";
        $this->EXPDT->HrefValue = "";
        $this->EXPDT->TooltipValue = "";

        // UR
        $this->UR->LinkCustomAttributes = "";
        $this->UR->HrefValue = "";
        $this->UR->TooltipValue = "";

        // RT
        $this->RT->LinkCustomAttributes = "";
        $this->RT->HrefValue = "";
        $this->RT->TooltipValue = "";

        // PRCODE
        $this->PRCODE->LinkCustomAttributes = "";
        $this->PRCODE->HrefValue = "";
        $this->PRCODE->TooltipValue = "";

        // BATCH
        $this->BATCH->LinkCustomAttributes = "";
        $this->BATCH->HrefValue = "";
        $this->BATCH->TooltipValue = "";

        // PC
        $this->PC->LinkCustomAttributes = "";
        $this->PC->HrefValue = "";
        $this->PC->TooltipValue = "";

        // OLDRT
        $this->OLDRT->LinkCustomAttributes = "";
        $this->OLDRT->HrefValue = "";
        $this->OLDRT->TooltipValue = "";

        // TEMPMRQ
        $this->TEMPMRQ->LinkCustomAttributes = "";
        $this->TEMPMRQ->HrefValue = "";
        $this->TEMPMRQ->TooltipValue = "";

        // TAXP
        $this->TAXP->LinkCustomAttributes = "";
        $this->TAXP->HrefValue = "";
        $this->TAXP->TooltipValue = "";

        // OLDRATE
        $this->OLDRATE->LinkCustomAttributes = "";
        $this->OLDRATE->HrefValue = "";
        $this->OLDRATE->TooltipValue = "";

        // NEWRATE
        $this->NEWRATE->LinkCustomAttributes = "";
        $this->NEWRATE->HrefValue = "";
        $this->NEWRATE->TooltipValue = "";

        // OTEMPMRA
        $this->OTEMPMRA->LinkCustomAttributes = "";
        $this->OTEMPMRA->HrefValue = "";
        $this->OTEMPMRA->TooltipValue = "";

        // ACTIVESTATUS
        $this->ACTIVESTATUS->LinkCustomAttributes = "";
        $this->ACTIVESTATUS->HrefValue = "";
        $this->ACTIVESTATUS->TooltipValue = "";

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

        // MFRCODE
        $this->MFRCODE->LinkCustomAttributes = "";
        $this->MFRCODE->HrefValue = "";
        $this->MFRCODE->TooltipValue = "";

        // BRCODE
        $this->BRCODE->LinkCustomAttributes = "";
        $this->BRCODE->HrefValue = "";
        $this->BRCODE->TooltipValue = "";

        // FRQ
        $this->FRQ->LinkCustomAttributes = "";
        $this->FRQ->HrefValue = "";
        $this->FRQ->TooltipValue = "";

        // HospID
        $this->HospID->LinkCustomAttributes = "";
        $this->HospID->HrefValue = "";
        $this->HospID->TooltipValue = "";

        // UM
        $this->UM->LinkCustomAttributes = "";
        $this->UM->HrefValue = "";
        $this->UM->TooltipValue = "";

        // GENNAME
        $this->GENNAME->LinkCustomAttributes = "";
        $this->GENNAME->HrefValue = "";
        $this->GENNAME->TooltipValue = "";

        // BILLDATE
        $this->BILLDATE->LinkCustomAttributes = "";
        $this->BILLDATE->HrefValue = "";
        $this->BILLDATE->TooltipValue = "";

        // CreatedDateTime
        $this->CreatedDateTime->LinkCustomAttributes = "";
        $this->CreatedDateTime->HrefValue = "";
        $this->CreatedDateTime->TooltipValue = "";

        // baid
        $this->baid->LinkCustomAttributes = "";
        $this->baid->HrefValue = "";
        $this->baid->TooltipValue = "";

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

        // PRC
        $this->PRC->EditAttrs["class"] = "form-control";
        $this->PRC->EditCustomAttributes = "";
        if (!$this->PRC->Raw) {
            $this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
        }
        $this->PRC->EditValue = $this->PRC->CurrentValue;
        $this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

        // PrName
        $this->PrName->EditAttrs["class"] = "form-control";
        $this->PrName->EditCustomAttributes = "";
        if (!$this->PrName->Raw) {
            $this->PrName->CurrentValue = HtmlDecode($this->PrName->CurrentValue);
        }
        $this->PrName->EditValue = $this->PrName->CurrentValue;
        $this->PrName->PlaceHolder = RemoveHtml($this->PrName->caption());

        // BATCHNO
        $this->BATCHNO->EditAttrs["class"] = "form-control";
        $this->BATCHNO->EditCustomAttributes = "";
        if (!$this->BATCHNO->Raw) {
            $this->BATCHNO->CurrentValue = HtmlDecode($this->BATCHNO->CurrentValue);
        }
        $this->BATCHNO->EditValue = $this->BATCHNO->CurrentValue;
        $this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

        // OpeningStk
        $this->OpeningStk->EditAttrs["class"] = "form-control";
        $this->OpeningStk->EditCustomAttributes = "";
        $this->OpeningStk->EditValue = $this->OpeningStk->CurrentValue;
        $this->OpeningStk->PlaceHolder = RemoveHtml($this->OpeningStk->caption());
        if (strval($this->OpeningStk->EditValue) != "" && is_numeric($this->OpeningStk->EditValue)) {
            $this->OpeningStk->EditValue = FormatNumber($this->OpeningStk->EditValue, -2, -2, -2, -2);
        }

        // PurchaseQty
        $this->PurchaseQty->EditAttrs["class"] = "form-control";
        $this->PurchaseQty->EditCustomAttributes = "";
        $this->PurchaseQty->EditValue = $this->PurchaseQty->CurrentValue;
        $this->PurchaseQty->PlaceHolder = RemoveHtml($this->PurchaseQty->caption());
        if (strval($this->PurchaseQty->EditValue) != "" && is_numeric($this->PurchaseQty->EditValue)) {
            $this->PurchaseQty->EditValue = FormatNumber($this->PurchaseQty->EditValue, -2, -2, -2, -2);
        }

        // SalesQty
        $this->SalesQty->EditAttrs["class"] = "form-control";
        $this->SalesQty->EditCustomAttributes = "";
        $this->SalesQty->EditValue = $this->SalesQty->CurrentValue;
        $this->SalesQty->PlaceHolder = RemoveHtml($this->SalesQty->caption());
        if (strval($this->SalesQty->EditValue) != "" && is_numeric($this->SalesQty->EditValue)) {
            $this->SalesQty->EditValue = FormatNumber($this->SalesQty->EditValue, -2, -2, -2, -2);
        }

        // ClosingStk
        $this->ClosingStk->EditAttrs["class"] = "form-control";
        $this->ClosingStk->EditCustomAttributes = "";
        $this->ClosingStk->EditValue = $this->ClosingStk->CurrentValue;
        $this->ClosingStk->PlaceHolder = RemoveHtml($this->ClosingStk->caption());
        if (strval($this->ClosingStk->EditValue) != "" && is_numeric($this->ClosingStk->EditValue)) {
            $this->ClosingStk->EditValue = FormatNumber($this->ClosingStk->EditValue, -2, -2, -2, -2);
        }

        // PurchasefreeQty
        $this->PurchasefreeQty->EditAttrs["class"] = "form-control";
        $this->PurchasefreeQty->EditCustomAttributes = "";
        $this->PurchasefreeQty->EditValue = $this->PurchasefreeQty->CurrentValue;
        $this->PurchasefreeQty->PlaceHolder = RemoveHtml($this->PurchasefreeQty->caption());
        if (strval($this->PurchasefreeQty->EditValue) != "" && is_numeric($this->PurchasefreeQty->EditValue)) {
            $this->PurchasefreeQty->EditValue = FormatNumber($this->PurchasefreeQty->EditValue, -2, -2, -2, -2);
        }

        // TransferingQty
        $this->TransferingQty->EditAttrs["class"] = "form-control";
        $this->TransferingQty->EditCustomAttributes = "";
        $this->TransferingQty->EditValue = $this->TransferingQty->CurrentValue;
        $this->TransferingQty->PlaceHolder = RemoveHtml($this->TransferingQty->caption());
        if (strval($this->TransferingQty->EditValue) != "" && is_numeric($this->TransferingQty->EditValue)) {
            $this->TransferingQty->EditValue = FormatNumber($this->TransferingQty->EditValue, -2, -2, -2, -2);
        }

        // UnitPurchaseRate
        $this->UnitPurchaseRate->EditAttrs["class"] = "form-control";
        $this->UnitPurchaseRate->EditCustomAttributes = "";
        $this->UnitPurchaseRate->EditValue = $this->UnitPurchaseRate->CurrentValue;
        $this->UnitPurchaseRate->PlaceHolder = RemoveHtml($this->UnitPurchaseRate->caption());
        if (strval($this->UnitPurchaseRate->EditValue) != "" && is_numeric($this->UnitPurchaseRate->EditValue)) {
            $this->UnitPurchaseRate->EditValue = FormatNumber($this->UnitPurchaseRate->EditValue, -2, -2, -2, -2);
        }

        // UnitSaleRate
        $this->UnitSaleRate->EditAttrs["class"] = "form-control";
        $this->UnitSaleRate->EditCustomAttributes = "";
        $this->UnitSaleRate->EditValue = $this->UnitSaleRate->CurrentValue;
        $this->UnitSaleRate->PlaceHolder = RemoveHtml($this->UnitSaleRate->caption());
        if (strval($this->UnitSaleRate->EditValue) != "" && is_numeric($this->UnitSaleRate->EditValue)) {
            $this->UnitSaleRate->EditValue = FormatNumber($this->UnitSaleRate->EditValue, -2, -2, -2, -2);
        }

        // CreatedDate
        $this->CreatedDate->EditAttrs["class"] = "form-control";
        $this->CreatedDate->EditCustomAttributes = "";
        $this->CreatedDate->EditValue = FormatDateTime($this->CreatedDate->CurrentValue, 8);
        $this->CreatedDate->PlaceHolder = RemoveHtml($this->CreatedDate->caption());

        // OQ
        $this->OQ->EditAttrs["class"] = "form-control";
        $this->OQ->EditCustomAttributes = "";
        $this->OQ->EditValue = $this->OQ->CurrentValue;
        $this->OQ->PlaceHolder = RemoveHtml($this->OQ->caption());
        if (strval($this->OQ->EditValue) != "" && is_numeric($this->OQ->EditValue)) {
            $this->OQ->EditValue = FormatNumber($this->OQ->EditValue, -2, -2, -2, -2);
        }

        // RQ
        $this->RQ->EditAttrs["class"] = "form-control";
        $this->RQ->EditCustomAttributes = "";
        $this->RQ->EditValue = $this->RQ->CurrentValue;
        $this->RQ->PlaceHolder = RemoveHtml($this->RQ->caption());
        if (strval($this->RQ->EditValue) != "" && is_numeric($this->RQ->EditValue)) {
            $this->RQ->EditValue = FormatNumber($this->RQ->EditValue, -2, -2, -2, -2);
        }

        // MRQ
        $this->MRQ->EditAttrs["class"] = "form-control";
        $this->MRQ->EditCustomAttributes = "";
        $this->MRQ->EditValue = $this->MRQ->CurrentValue;
        $this->MRQ->PlaceHolder = RemoveHtml($this->MRQ->caption());
        if (strval($this->MRQ->EditValue) != "" && is_numeric($this->MRQ->EditValue)) {
            $this->MRQ->EditValue = FormatNumber($this->MRQ->EditValue, -2, -2, -2, -2);
        }

        // IQ
        $this->IQ->EditAttrs["class"] = "form-control";
        $this->IQ->EditCustomAttributes = "";
        $this->IQ->EditValue = $this->IQ->CurrentValue;
        $this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());
        if (strval($this->IQ->EditValue) != "" && is_numeric($this->IQ->EditValue)) {
            $this->IQ->EditValue = FormatNumber($this->IQ->EditValue, -2, -2, -2, -2);
        }

        // MRP
        $this->MRP->EditAttrs["class"] = "form-control";
        $this->MRP->EditCustomAttributes = "";
        $this->MRP->EditValue = $this->MRP->CurrentValue;
        $this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());
        if (strval($this->MRP->EditValue) != "" && is_numeric($this->MRP->EditValue)) {
            $this->MRP->EditValue = FormatNumber($this->MRP->EditValue, -2, -2, -2, -2);
        }

        // EXPDT
        $this->EXPDT->EditAttrs["class"] = "form-control";
        $this->EXPDT->EditCustomAttributes = "";
        $this->EXPDT->EditValue = FormatDateTime($this->EXPDT->CurrentValue, 8);
        $this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());

        // UR
        $this->UR->EditAttrs["class"] = "form-control";
        $this->UR->EditCustomAttributes = "";
        $this->UR->EditValue = $this->UR->CurrentValue;
        $this->UR->PlaceHolder = RemoveHtml($this->UR->caption());
        if (strval($this->UR->EditValue) != "" && is_numeric($this->UR->EditValue)) {
            $this->UR->EditValue = FormatNumber($this->UR->EditValue, -2, -2, -2, -2);
        }

        // RT
        $this->RT->EditAttrs["class"] = "form-control";
        $this->RT->EditCustomAttributes = "";
        $this->RT->EditValue = $this->RT->CurrentValue;
        $this->RT->PlaceHolder = RemoveHtml($this->RT->caption());
        if (strval($this->RT->EditValue) != "" && is_numeric($this->RT->EditValue)) {
            $this->RT->EditValue = FormatNumber($this->RT->EditValue, -2, -2, -2, -2);
        }

        // PRCODE
        $this->PRCODE->EditAttrs["class"] = "form-control";
        $this->PRCODE->EditCustomAttributes = "";
        if (!$this->PRCODE->Raw) {
            $this->PRCODE->CurrentValue = HtmlDecode($this->PRCODE->CurrentValue);
        }
        $this->PRCODE->EditValue = $this->PRCODE->CurrentValue;
        $this->PRCODE->PlaceHolder = RemoveHtml($this->PRCODE->caption());

        // BATCH
        $this->BATCH->EditAttrs["class"] = "form-control";
        $this->BATCH->EditCustomAttributes = "";
        if (!$this->BATCH->Raw) {
            $this->BATCH->CurrentValue = HtmlDecode($this->BATCH->CurrentValue);
        }
        $this->BATCH->EditValue = $this->BATCH->CurrentValue;
        $this->BATCH->PlaceHolder = RemoveHtml($this->BATCH->caption());

        // PC
        $this->PC->EditAttrs["class"] = "form-control";
        $this->PC->EditCustomAttributes = "";
        if (!$this->PC->Raw) {
            $this->PC->CurrentValue = HtmlDecode($this->PC->CurrentValue);
        }
        $this->PC->EditValue = $this->PC->CurrentValue;
        $this->PC->PlaceHolder = RemoveHtml($this->PC->caption());

        // OLDRT
        $this->OLDRT->EditAttrs["class"] = "form-control";
        $this->OLDRT->EditCustomAttributes = "";
        $this->OLDRT->EditValue = $this->OLDRT->CurrentValue;
        $this->OLDRT->PlaceHolder = RemoveHtml($this->OLDRT->caption());
        if (strval($this->OLDRT->EditValue) != "" && is_numeric($this->OLDRT->EditValue)) {
            $this->OLDRT->EditValue = FormatNumber($this->OLDRT->EditValue, -2, -2, -2, -2);
        }

        // TEMPMRQ
        $this->TEMPMRQ->EditAttrs["class"] = "form-control";
        $this->TEMPMRQ->EditCustomAttributes = "";
        $this->TEMPMRQ->EditValue = $this->TEMPMRQ->CurrentValue;
        $this->TEMPMRQ->PlaceHolder = RemoveHtml($this->TEMPMRQ->caption());
        if (strval($this->TEMPMRQ->EditValue) != "" && is_numeric($this->TEMPMRQ->EditValue)) {
            $this->TEMPMRQ->EditValue = FormatNumber($this->TEMPMRQ->EditValue, -2, -2, -2, -2);
        }

        // TAXP
        $this->TAXP->EditAttrs["class"] = "form-control";
        $this->TAXP->EditCustomAttributes = "";
        $this->TAXP->EditValue = $this->TAXP->CurrentValue;
        $this->TAXP->PlaceHolder = RemoveHtml($this->TAXP->caption());
        if (strval($this->TAXP->EditValue) != "" && is_numeric($this->TAXP->EditValue)) {
            $this->TAXP->EditValue = FormatNumber($this->TAXP->EditValue, -2, -2, -2, -2);
        }

        // OLDRATE
        $this->OLDRATE->EditAttrs["class"] = "form-control";
        $this->OLDRATE->EditCustomAttributes = "";
        $this->OLDRATE->EditValue = $this->OLDRATE->CurrentValue;
        $this->OLDRATE->PlaceHolder = RemoveHtml($this->OLDRATE->caption());
        if (strval($this->OLDRATE->EditValue) != "" && is_numeric($this->OLDRATE->EditValue)) {
            $this->OLDRATE->EditValue = FormatNumber($this->OLDRATE->EditValue, -2, -2, -2, -2);
        }

        // NEWRATE
        $this->NEWRATE->EditAttrs["class"] = "form-control";
        $this->NEWRATE->EditCustomAttributes = "";
        $this->NEWRATE->EditValue = $this->NEWRATE->CurrentValue;
        $this->NEWRATE->PlaceHolder = RemoveHtml($this->NEWRATE->caption());
        if (strval($this->NEWRATE->EditValue) != "" && is_numeric($this->NEWRATE->EditValue)) {
            $this->NEWRATE->EditValue = FormatNumber($this->NEWRATE->EditValue, -2, -2, -2, -2);
        }

        // OTEMPMRA
        $this->OTEMPMRA->EditAttrs["class"] = "form-control";
        $this->OTEMPMRA->EditCustomAttributes = "";
        $this->OTEMPMRA->EditValue = $this->OTEMPMRA->CurrentValue;
        $this->OTEMPMRA->PlaceHolder = RemoveHtml($this->OTEMPMRA->caption());
        if (strval($this->OTEMPMRA->EditValue) != "" && is_numeric($this->OTEMPMRA->EditValue)) {
            $this->OTEMPMRA->EditValue = FormatNumber($this->OTEMPMRA->EditValue, -2, -2, -2, -2);
        }

        // ACTIVESTATUS
        $this->ACTIVESTATUS->EditAttrs["class"] = "form-control";
        $this->ACTIVESTATUS->EditCustomAttributes = "";
        if (!$this->ACTIVESTATUS->Raw) {
            $this->ACTIVESTATUS->CurrentValue = HtmlDecode($this->ACTIVESTATUS->CurrentValue);
        }
        $this->ACTIVESTATUS->EditValue = $this->ACTIVESTATUS->CurrentValue;
        $this->ACTIVESTATUS->PlaceHolder = RemoveHtml($this->ACTIVESTATUS->caption());

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

        // MFRCODE
        $this->MFRCODE->EditAttrs["class"] = "form-control";
        $this->MFRCODE->EditCustomAttributes = "";
        if (!$this->MFRCODE->Raw) {
            $this->MFRCODE->CurrentValue = HtmlDecode($this->MFRCODE->CurrentValue);
        }
        $this->MFRCODE->EditValue = $this->MFRCODE->CurrentValue;
        $this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

        // BRCODE
        $this->BRCODE->EditAttrs["class"] = "form-control";
        $this->BRCODE->EditCustomAttributes = "";
        $this->BRCODE->EditValue = $this->BRCODE->CurrentValue;
        $this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

        // FRQ
        $this->FRQ->EditAttrs["class"] = "form-control";
        $this->FRQ->EditCustomAttributes = "";
        $this->FRQ->EditValue = $this->FRQ->CurrentValue;
        $this->FRQ->PlaceHolder = RemoveHtml($this->FRQ->caption());
        if (strval($this->FRQ->EditValue) != "" && is_numeric($this->FRQ->EditValue)) {
            $this->FRQ->EditValue = FormatNumber($this->FRQ->EditValue, -2, -2, -2, -2);
        }

        // HospID
        $this->HospID->EditAttrs["class"] = "form-control";
        $this->HospID->EditCustomAttributes = "";
        $this->HospID->EditValue = $this->HospID->CurrentValue;
        $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

        // UM
        $this->UM->EditAttrs["class"] = "form-control";
        $this->UM->EditCustomAttributes = "";
        if (!$this->UM->Raw) {
            $this->UM->CurrentValue = HtmlDecode($this->UM->CurrentValue);
        }
        $this->UM->EditValue = $this->UM->CurrentValue;
        $this->UM->PlaceHolder = RemoveHtml($this->UM->caption());

        // GENNAME
        $this->GENNAME->EditAttrs["class"] = "form-control";
        $this->GENNAME->EditCustomAttributes = "";
        if (!$this->GENNAME->Raw) {
            $this->GENNAME->CurrentValue = HtmlDecode($this->GENNAME->CurrentValue);
        }
        $this->GENNAME->EditValue = $this->GENNAME->CurrentValue;
        $this->GENNAME->PlaceHolder = RemoveHtml($this->GENNAME->caption());

        // BILLDATE
        $this->BILLDATE->EditAttrs["class"] = "form-control";
        $this->BILLDATE->EditCustomAttributes = "";
        $this->BILLDATE->EditValue = FormatDateTime($this->BILLDATE->CurrentValue, 8);
        $this->BILLDATE->PlaceHolder = RemoveHtml($this->BILLDATE->caption());

        // CreatedDateTime
        $this->CreatedDateTime->EditAttrs["class"] = "form-control";
        $this->CreatedDateTime->EditCustomAttributes = "";
        $this->CreatedDateTime->EditValue = FormatDateTime($this->CreatedDateTime->CurrentValue, 8);
        $this->CreatedDateTime->PlaceHolder = RemoveHtml($this->CreatedDateTime->caption());

        // baid
        $this->baid->EditAttrs["class"] = "form-control";
        $this->baid->EditCustomAttributes = "";
        $this->baid->EditValue = $this->baid->CurrentValue;
        $this->baid->PlaceHolder = RemoveHtml($this->baid->caption());

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
                    $doc->exportCaption($this->PRC);
                    $doc->exportCaption($this->PrName);
                    $doc->exportCaption($this->BATCHNO);
                    $doc->exportCaption($this->OpeningStk);
                    $doc->exportCaption($this->PurchaseQty);
                    $doc->exportCaption($this->SalesQty);
                    $doc->exportCaption($this->ClosingStk);
                    $doc->exportCaption($this->PurchasefreeQty);
                    $doc->exportCaption($this->TransferingQty);
                    $doc->exportCaption($this->UnitPurchaseRate);
                    $doc->exportCaption($this->UnitSaleRate);
                    $doc->exportCaption($this->CreatedDate);
                    $doc->exportCaption($this->OQ);
                    $doc->exportCaption($this->RQ);
                    $doc->exportCaption($this->MRQ);
                    $doc->exportCaption($this->IQ);
                    $doc->exportCaption($this->MRP);
                    $doc->exportCaption($this->EXPDT);
                    $doc->exportCaption($this->UR);
                    $doc->exportCaption($this->RT);
                    $doc->exportCaption($this->PRCODE);
                    $doc->exportCaption($this->BATCH);
                    $doc->exportCaption($this->PC);
                    $doc->exportCaption($this->OLDRT);
                    $doc->exportCaption($this->TEMPMRQ);
                    $doc->exportCaption($this->TAXP);
                    $doc->exportCaption($this->OLDRATE);
                    $doc->exportCaption($this->NEWRATE);
                    $doc->exportCaption($this->OTEMPMRA);
                    $doc->exportCaption($this->ACTIVESTATUS);
                    $doc->exportCaption($this->PSGST);
                    $doc->exportCaption($this->PCGST);
                    $doc->exportCaption($this->SSGST);
                    $doc->exportCaption($this->SCGST);
                    $doc->exportCaption($this->MFRCODE);
                    $doc->exportCaption($this->BRCODE);
                    $doc->exportCaption($this->FRQ);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->UM);
                    $doc->exportCaption($this->GENNAME);
                    $doc->exportCaption($this->BILLDATE);
                    $doc->exportCaption($this->CreatedDateTime);
                    $doc->exportCaption($this->baid);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->PRC);
                    $doc->exportCaption($this->PrName);
                    $doc->exportCaption($this->BATCHNO);
                    $doc->exportCaption($this->OpeningStk);
                    $doc->exportCaption($this->PurchaseQty);
                    $doc->exportCaption($this->SalesQty);
                    $doc->exportCaption($this->ClosingStk);
                    $doc->exportCaption($this->PurchasefreeQty);
                    $doc->exportCaption($this->TransferingQty);
                    $doc->exportCaption($this->UnitPurchaseRate);
                    $doc->exportCaption($this->UnitSaleRate);
                    $doc->exportCaption($this->CreatedDate);
                    $doc->exportCaption($this->OQ);
                    $doc->exportCaption($this->RQ);
                    $doc->exportCaption($this->MRQ);
                    $doc->exportCaption($this->IQ);
                    $doc->exportCaption($this->MRP);
                    $doc->exportCaption($this->EXPDT);
                    $doc->exportCaption($this->UR);
                    $doc->exportCaption($this->RT);
                    $doc->exportCaption($this->PRCODE);
                    $doc->exportCaption($this->BATCH);
                    $doc->exportCaption($this->PC);
                    $doc->exportCaption($this->OLDRT);
                    $doc->exportCaption($this->TEMPMRQ);
                    $doc->exportCaption($this->TAXP);
                    $doc->exportCaption($this->OLDRATE);
                    $doc->exportCaption($this->NEWRATE);
                    $doc->exportCaption($this->OTEMPMRA);
                    $doc->exportCaption($this->ACTIVESTATUS);
                    $doc->exportCaption($this->PSGST);
                    $doc->exportCaption($this->PCGST);
                    $doc->exportCaption($this->SSGST);
                    $doc->exportCaption($this->SCGST);
                    $doc->exportCaption($this->MFRCODE);
                    $doc->exportCaption($this->BRCODE);
                    $doc->exportCaption($this->FRQ);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->UM);
                    $doc->exportCaption($this->GENNAME);
                    $doc->exportCaption($this->BILLDATE);
                    $doc->exportCaption($this->CreatedDateTime);
                    $doc->exportCaption($this->baid);
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
                        $doc->exportField($this->PRC);
                        $doc->exportField($this->PrName);
                        $doc->exportField($this->BATCHNO);
                        $doc->exportField($this->OpeningStk);
                        $doc->exportField($this->PurchaseQty);
                        $doc->exportField($this->SalesQty);
                        $doc->exportField($this->ClosingStk);
                        $doc->exportField($this->PurchasefreeQty);
                        $doc->exportField($this->TransferingQty);
                        $doc->exportField($this->UnitPurchaseRate);
                        $doc->exportField($this->UnitSaleRate);
                        $doc->exportField($this->CreatedDate);
                        $doc->exportField($this->OQ);
                        $doc->exportField($this->RQ);
                        $doc->exportField($this->MRQ);
                        $doc->exportField($this->IQ);
                        $doc->exportField($this->MRP);
                        $doc->exportField($this->EXPDT);
                        $doc->exportField($this->UR);
                        $doc->exportField($this->RT);
                        $doc->exportField($this->PRCODE);
                        $doc->exportField($this->BATCH);
                        $doc->exportField($this->PC);
                        $doc->exportField($this->OLDRT);
                        $doc->exportField($this->TEMPMRQ);
                        $doc->exportField($this->TAXP);
                        $doc->exportField($this->OLDRATE);
                        $doc->exportField($this->NEWRATE);
                        $doc->exportField($this->OTEMPMRA);
                        $doc->exportField($this->ACTIVESTATUS);
                        $doc->exportField($this->PSGST);
                        $doc->exportField($this->PCGST);
                        $doc->exportField($this->SSGST);
                        $doc->exportField($this->SCGST);
                        $doc->exportField($this->MFRCODE);
                        $doc->exportField($this->BRCODE);
                        $doc->exportField($this->FRQ);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->UM);
                        $doc->exportField($this->GENNAME);
                        $doc->exportField($this->BILLDATE);
                        $doc->exportField($this->CreatedDateTime);
                        $doc->exportField($this->baid);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->PRC);
                        $doc->exportField($this->PrName);
                        $doc->exportField($this->BATCHNO);
                        $doc->exportField($this->OpeningStk);
                        $doc->exportField($this->PurchaseQty);
                        $doc->exportField($this->SalesQty);
                        $doc->exportField($this->ClosingStk);
                        $doc->exportField($this->PurchasefreeQty);
                        $doc->exportField($this->TransferingQty);
                        $doc->exportField($this->UnitPurchaseRate);
                        $doc->exportField($this->UnitSaleRate);
                        $doc->exportField($this->CreatedDate);
                        $doc->exportField($this->OQ);
                        $doc->exportField($this->RQ);
                        $doc->exportField($this->MRQ);
                        $doc->exportField($this->IQ);
                        $doc->exportField($this->MRP);
                        $doc->exportField($this->EXPDT);
                        $doc->exportField($this->UR);
                        $doc->exportField($this->RT);
                        $doc->exportField($this->PRCODE);
                        $doc->exportField($this->BATCH);
                        $doc->exportField($this->PC);
                        $doc->exportField($this->OLDRT);
                        $doc->exportField($this->TEMPMRQ);
                        $doc->exportField($this->TAXP);
                        $doc->exportField($this->OLDRATE);
                        $doc->exportField($this->NEWRATE);
                        $doc->exportField($this->OTEMPMRA);
                        $doc->exportField($this->ACTIVESTATUS);
                        $doc->exportField($this->PSGST);
                        $doc->exportField($this->PCGST);
                        $doc->exportField($this->SSGST);
                        $doc->exportField($this->SCGST);
                        $doc->exportField($this->MFRCODE);
                        $doc->exportField($this->BRCODE);
                        $doc->exportField($this->FRQ);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->UM);
                        $doc->exportField($this->GENNAME);
                        $doc->exportField($this->BILLDATE);
                        $doc->exportField($this->CreatedDateTime);
                        $doc->exportField($this->baid);
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