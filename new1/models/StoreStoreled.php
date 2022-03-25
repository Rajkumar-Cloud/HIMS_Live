<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for store_storeled
 */
class StoreStoreled extends DbTable
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
    public $BRCODE;
    public $TYPE;
    public $DN;
    public $RDN;
    public $DT;
    public $PRC;
    public $OQ;
    public $RQ;
    public $MRQ;
    public $IQ;
    public $BATCHNO;
    public $EXPDT;
    public $BILLNO;
    public $BILLDT;
    public $RT;
    public $VALUE;
    public $DISC;
    public $TAXP;
    public $TAX;
    public $TAXR;
    public $DAMT;
    public $EMPNO;
    public $PC;
    public $DRNAME;
    public $BTIME;
    public $ONO;
    public $ODT;
    public $PURRT;
    public $GRP;
    public $IBATCH;
    public $IPNO;
    public $OPNO;
    public $RECID;
    public $FQTY;
    public $UR;
    public $DCID;
    public $_USERID;
    public $MODDT;
    public $FYM;
    public $PRCBATCH;
    public $SLNO;
    public $MRP;
    public $BILLYM;
    public $BILLGRP;
    public $STAFF;
    public $TEMPIPNO;
    public $PRNTED;
    public $PATNAME;
    public $PJVNO;
    public $PJVSLNO;
    public $OTHDISC;
    public $PJVYM;
    public $PURDISCPER;
    public $CASHIER;
    public $CASHTIME;
    public $CASHRECD;
    public $CASHREFNO;
    public $CASHIERSHIFT;
    public $PRCODE;
    public $RELEASEBY;
    public $CRAUTHOR;
    public $PAYMENT;
    public $DRID;
    public $WARD;
    public $STAXTYPE;
    public $PURDISCVAL;
    public $RNDOFF;
    public $DISCONMRP;
    public $DELVDT;
    public $DELVTIME;
    public $DELVBY;
    public $HOSPNO;
    public $id;
    public $pbv;
    public $pbt;
    public $SiNo;
    public $Product;
    public $Mfg;
    public $HosoID;
    public $createdby;
    public $createddatetime;
    public $modifiedby;
    public $modifieddatetime;
    public $MFRCODE;
    public $Reception;
    public $PatID;
    public $mrnno;
    public $BRNAME;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'store_storeled';
        $this->TableName = 'store_storeled';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`store_storeled`";
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

        // BRCODE
        $this->BRCODE = new DbField('store_storeled', 'store_storeled', 'x_BRCODE', 'BRCODE', '`BRCODE`', '`BRCODE`', 3, 11, -1, false, '`BRCODE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BRCODE->Sortable = true; // Allow sort
        $this->BRCODE->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['BRCODE'] = &$this->BRCODE;

        // TYPE
        $this->TYPE = new DbField('store_storeled', 'store_storeled', 'x_TYPE', 'TYPE', '`TYPE`', '`TYPE`', 200, 4, -1, false, '`TYPE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TYPE->Sortable = true; // Allow sort
        $this->Fields['TYPE'] = &$this->TYPE;

        // DN
        $this->DN = new DbField('store_storeled', 'store_storeled', 'x_DN', 'DN', '`DN`', '`DN`', 200, 46, -1, false, '`DN`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DN->Sortable = true; // Allow sort
        $this->Fields['DN'] = &$this->DN;

        // RDN
        $this->RDN = new DbField('store_storeled', 'store_storeled', 'x_RDN', 'RDN', '`RDN`', '`RDN`', 200, 6, -1, false, '`RDN`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RDN->Sortable = true; // Allow sort
        $this->Fields['RDN'] = &$this->RDN;

        // DT
        $this->DT = new DbField('store_storeled', 'store_storeled', 'x_DT', 'DT', '`DT`', CastDateFieldForLike("`DT`", 0, "DB"), 135, 19, 0, false, '`DT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DT->Sortable = true; // Allow sort
        $this->DT->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['DT'] = &$this->DT;

        // PRC
        $this->PRC = new DbField('store_storeled', 'store_storeled', 'x_PRC', 'PRC', '`PRC`', '`PRC`', 200, 9, -1, false, '`PRC`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PRC->Sortable = true; // Allow sort
        $this->Fields['PRC'] = &$this->PRC;

        // OQ
        $this->OQ = new DbField('store_storeled', 'store_storeled', 'x_OQ', 'OQ', '`OQ`', '`OQ`', 131, 12, -1, false, '`OQ`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OQ->Sortable = true; // Allow sort
        $this->OQ->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OQ->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['OQ'] = &$this->OQ;

        // RQ
        $this->RQ = new DbField('store_storeled', 'store_storeled', 'x_RQ', 'RQ', '`RQ`', '`RQ`', 131, 12, -1, false, '`RQ`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RQ->Sortable = true; // Allow sort
        $this->RQ->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->RQ->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['RQ'] = &$this->RQ;

        // MRQ
        $this->MRQ = new DbField('store_storeled', 'store_storeled', 'x_MRQ', 'MRQ', '`MRQ`', '`MRQ`', 131, 12, -1, false, '`MRQ`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MRQ->Sortable = true; // Allow sort
        $this->MRQ->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->MRQ->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['MRQ'] = &$this->MRQ;

        // IQ
        $this->IQ = new DbField('store_storeled', 'store_storeled', 'x_IQ', 'IQ', '`IQ`', '`IQ`', 131, 12, -1, false, '`IQ`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IQ->Sortable = true; // Allow sort
        $this->IQ->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->IQ->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['IQ'] = &$this->IQ;

        // BATCHNO
        $this->BATCHNO = new DbField('store_storeled', 'store_storeled', 'x_BATCHNO', 'BATCHNO', '`BATCHNO`', '`BATCHNO`', 200, 10, -1, false, '`BATCHNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BATCHNO->Sortable = true; // Allow sort
        $this->Fields['BATCHNO'] = &$this->BATCHNO;

        // EXPDT
        $this->EXPDT = new DbField('store_storeled', 'store_storeled', 'x_EXPDT', 'EXPDT', '`EXPDT`', CastDateFieldForLike("`EXPDT`", 0, "DB"), 135, 19, 0, false, '`EXPDT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EXPDT->Sortable = true; // Allow sort
        $this->EXPDT->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['EXPDT'] = &$this->EXPDT;

        // BILLNO
        $this->BILLNO = new DbField('store_storeled', 'store_storeled', 'x_BILLNO', 'BILLNO', '`BILLNO`', '`BILLNO`', 200, 50, -1, false, '`BILLNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BILLNO->Sortable = true; // Allow sort
        $this->Fields['BILLNO'] = &$this->BILLNO;

        // BILLDT
        $this->BILLDT = new DbField('store_storeled', 'store_storeled', 'x_BILLDT', 'BILLDT', '`BILLDT`', CastDateFieldForLike("`BILLDT`", 0, "DB"), 135, 19, 0, false, '`BILLDT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BILLDT->Sortable = true; // Allow sort
        $this->BILLDT->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['BILLDT'] = &$this->BILLDT;

        // RT
        $this->RT = new DbField('store_storeled', 'store_storeled', 'x_RT', 'RT', '`RT`', '`RT`', 131, 12, -1, false, '`RT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RT->Sortable = true; // Allow sort
        $this->RT->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->RT->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['RT'] = &$this->RT;

        // VALUE
        $this->VALUE = new DbField('store_storeled', 'store_storeled', 'x_VALUE', 'VALUE', '`VALUE`', '`VALUE`', 131, 12, -1, false, '`VALUE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->VALUE->Sortable = true; // Allow sort
        $this->VALUE->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->VALUE->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['VALUE'] = &$this->VALUE;

        // DISC
        $this->DISC = new DbField('store_storeled', 'store_storeled', 'x_DISC', 'DISC', '`DISC`', '`DISC`', 131, 12, -1, false, '`DISC`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DISC->Sortable = true; // Allow sort
        $this->DISC->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->DISC->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['DISC'] = &$this->DISC;

        // TAXP
        $this->TAXP = new DbField('store_storeled', 'store_storeled', 'x_TAXP', 'TAXP', '`TAXP`', '`TAXP`', 131, 8, -1, false, '`TAXP`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TAXP->Sortable = true; // Allow sort
        $this->TAXP->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->TAXP->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['TAXP'] = &$this->TAXP;

        // TAX
        $this->TAX = new DbField('store_storeled', 'store_storeled', 'x_TAX', 'TAX', '`TAX`', '`TAX`', 131, 12, -1, false, '`TAX`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TAX->Sortable = true; // Allow sort
        $this->TAX->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->TAX->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['TAX'] = &$this->TAX;

        // TAXR
        $this->TAXR = new DbField('store_storeled', 'store_storeled', 'x_TAXR', 'TAXR', '`TAXR`', '`TAXR`', 131, 12, -1, false, '`TAXR`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TAXR->Sortable = true; // Allow sort
        $this->TAXR->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->TAXR->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['TAXR'] = &$this->TAXR;

        // DAMT
        $this->DAMT = new DbField('store_storeled', 'store_storeled', 'x_DAMT', 'DAMT', '`DAMT`', '`DAMT`', 131, 12, -1, false, '`DAMT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DAMT->Sortable = true; // Allow sort
        $this->DAMT->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->DAMT->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['DAMT'] = &$this->DAMT;

        // EMPNO
        $this->EMPNO = new DbField('store_storeled', 'store_storeled', 'x_EMPNO', 'EMPNO', '`EMPNO`', '`EMPNO`', 200, 100, -1, false, '`EMPNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EMPNO->Sortable = true; // Allow sort
        $this->Fields['EMPNO'] = &$this->EMPNO;

        // PC
        $this->PC = new DbField('store_storeled', 'store_storeled', 'x_PC', 'PC', '`PC`', '`PC`', 200, 5, -1, false, '`PC`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PC->Sortable = true; // Allow sort
        $this->Fields['PC'] = &$this->PC;

        // DRNAME
        $this->DRNAME = new DbField('store_storeled', 'store_storeled', 'x_DRNAME', 'DRNAME', '`DRNAME`', '`DRNAME`', 200, 40, -1, false, '`DRNAME`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DRNAME->Sortable = true; // Allow sort
        $this->Fields['DRNAME'] = &$this->DRNAME;

        // BTIME
        $this->BTIME = new DbField('store_storeled', 'store_storeled', 'x_BTIME', 'BTIME', '`BTIME`', '`BTIME`', 200, 8, -1, false, '`BTIME`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BTIME->Sortable = true; // Allow sort
        $this->Fields['BTIME'] = &$this->BTIME;

        // ONO
        $this->ONO = new DbField('store_storeled', 'store_storeled', 'x_ONO', 'ONO', '`ONO`', '`ONO`', 200, 15, -1, false, '`ONO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ONO->Sortable = true; // Allow sort
        $this->Fields['ONO'] = &$this->ONO;

        // ODT
        $this->ODT = new DbField('store_storeled', 'store_storeled', 'x_ODT', 'ODT', '`ODT`', CastDateFieldForLike("`ODT`", 0, "DB"), 135, 19, 0, false, '`ODT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ODT->Sortable = true; // Allow sort
        $this->ODT->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['ODT'] = &$this->ODT;

        // PURRT
        $this->PURRT = new DbField('store_storeled', 'store_storeled', 'x_PURRT', 'PURRT', '`PURRT`', '`PURRT`', 131, 12, -1, false, '`PURRT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PURRT->Sortable = true; // Allow sort
        $this->PURRT->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PURRT->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['PURRT'] = &$this->PURRT;

        // GRP
        $this->GRP = new DbField('store_storeled', 'store_storeled', 'x_GRP', 'GRP', '`GRP`', '`GRP`', 200, 21, -1, false, '`GRP`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GRP->Sortable = true; // Allow sort
        $this->Fields['GRP'] = &$this->GRP;

        // IBATCH
        $this->IBATCH = new DbField('store_storeled', 'store_storeled', 'x_IBATCH', 'IBATCH', '`IBATCH`', '`IBATCH`', 200, 11, -1, false, '`IBATCH`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IBATCH->Sortable = true; // Allow sort
        $this->Fields['IBATCH'] = &$this->IBATCH;

        // IPNO
        $this->IPNO = new DbField('store_storeled', 'store_storeled', 'x_IPNO', 'IPNO', '`IPNO`', '`IPNO`', 200, 16, -1, false, '`IPNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IPNO->Sortable = true; // Allow sort
        $this->Fields['IPNO'] = &$this->IPNO;

        // OPNO
        $this->OPNO = new DbField('store_storeled', 'store_storeled', 'x_OPNO', 'OPNO', '`OPNO`', '`OPNO`', 200, 10, -1, false, '`OPNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OPNO->Sortable = true; // Allow sort
        $this->Fields['OPNO'] = &$this->OPNO;

        // RECID
        $this->RECID = new DbField('store_storeled', 'store_storeled', 'x_RECID', 'RECID', '`RECID`', '`RECID`', 200, 18, -1, false, '`RECID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RECID->Sortable = true; // Allow sort
        $this->Fields['RECID'] = &$this->RECID;

        // FQTY
        $this->FQTY = new DbField('store_storeled', 'store_storeled', 'x_FQTY', 'FQTY', '`FQTY`', '`FQTY`', 131, 12, -1, false, '`FQTY`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FQTY->Sortable = true; // Allow sort
        $this->FQTY->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->FQTY->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['FQTY'] = &$this->FQTY;

        // UR
        $this->UR = new DbField('store_storeled', 'store_storeled', 'x_UR', 'UR', '`UR`', '`UR`', 131, 12, -1, false, '`UR`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->UR->Sortable = true; // Allow sort
        $this->UR->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->UR->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['UR'] = &$this->UR;

        // DCID
        $this->DCID = new DbField('store_storeled', 'store_storeled', 'x_DCID', 'DCID', '`DCID`', '`DCID`', 200, 1, -1, false, '`DCID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DCID->Sortable = true; // Allow sort
        $this->Fields['DCID'] = &$this->DCID;

        // USERID
        $this->_USERID = new DbField('store_storeled', 'store_storeled', 'x__USERID', 'USERID', '`USERID`', '`USERID`', 200, 5, -1, false, '`USERID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->_USERID->Sortable = true; // Allow sort
        $this->Fields['USERID'] = &$this->_USERID;

        // MODDT
        $this->MODDT = new DbField('store_storeled', 'store_storeled', 'x_MODDT', 'MODDT', '`MODDT`', CastDateFieldForLike("`MODDT`", 0, "DB"), 135, 19, 0, false, '`MODDT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MODDT->Sortable = true; // Allow sort
        $this->MODDT->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['MODDT'] = &$this->MODDT;

        // FYM
        $this->FYM = new DbField('store_storeled', 'store_storeled', 'x_FYM', 'FYM', '`FYM`', '`FYM`', 200, 8, -1, false, '`FYM`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FYM->Sortable = true; // Allow sort
        $this->Fields['FYM'] = &$this->FYM;

        // PRCBATCH
        $this->PRCBATCH = new DbField('store_storeled', 'store_storeled', 'x_PRCBATCH', 'PRCBATCH', '`PRCBATCH`', '`PRCBATCH`', 200, 23, -1, false, '`PRCBATCH`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PRCBATCH->Sortable = true; // Allow sort
        $this->Fields['PRCBATCH'] = &$this->PRCBATCH;

        // SLNO
        $this->SLNO = new DbField('store_storeled', 'store_storeled', 'x_SLNO', 'SLNO', '`SLNO`', '`SLNO`', 3, 11, -1, false, '`SLNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SLNO->Sortable = true; // Allow sort
        $this->SLNO->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['SLNO'] = &$this->SLNO;

        // MRP
        $this->MRP = new DbField('store_storeled', 'store_storeled', 'x_MRP', 'MRP', '`MRP`', '`MRP`', 131, 12, -1, false, '`MRP`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MRP->Sortable = true; // Allow sort
        $this->MRP->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->MRP->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['MRP'] = &$this->MRP;

        // BILLYM
        $this->BILLYM = new DbField('store_storeled', 'store_storeled', 'x_BILLYM', 'BILLYM', '`BILLYM`', '`BILLYM`', 200, 8, -1, false, '`BILLYM`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BILLYM->Sortable = true; // Allow sort
        $this->Fields['BILLYM'] = &$this->BILLYM;

        // BILLGRP
        $this->BILLGRP = new DbField('store_storeled', 'store_storeled', 'x_BILLGRP', 'BILLGRP', '`BILLGRP`', '`BILLGRP`', 200, 21, -1, false, '`BILLGRP`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BILLGRP->Sortable = true; // Allow sort
        $this->Fields['BILLGRP'] = &$this->BILLGRP;

        // STAFF
        $this->STAFF = new DbField('store_storeled', 'store_storeled', 'x_STAFF', 'STAFF', '`STAFF`', '`STAFF`', 200, 80, -1, false, '`STAFF`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->STAFF->Sortable = true; // Allow sort
        $this->Fields['STAFF'] = &$this->STAFF;

        // TEMPIPNO
        $this->TEMPIPNO = new DbField('store_storeled', 'store_storeled', 'x_TEMPIPNO', 'TEMPIPNO', '`TEMPIPNO`', '`TEMPIPNO`', 200, 16, -1, false, '`TEMPIPNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TEMPIPNO->Sortable = true; // Allow sort
        $this->Fields['TEMPIPNO'] = &$this->TEMPIPNO;

        // PRNTED
        $this->PRNTED = new DbField('store_storeled', 'store_storeled', 'x_PRNTED', 'PRNTED', '`PRNTED`', '`PRNTED`', 200, 1, -1, false, '`PRNTED`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PRNTED->Sortable = true; // Allow sort
        $this->Fields['PRNTED'] = &$this->PRNTED;

        // PATNAME
        $this->PATNAME = new DbField('store_storeled', 'store_storeled', 'x_PATNAME', 'PATNAME', '`PATNAME`', '`PATNAME`', 200, 99, -1, false, '`PATNAME`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PATNAME->Sortable = true; // Allow sort
        $this->Fields['PATNAME'] = &$this->PATNAME;

        // PJVNO
        $this->PJVNO = new DbField('store_storeled', 'store_storeled', 'x_PJVNO', 'PJVNO', '`PJVNO`', '`PJVNO`', 200, 5, -1, false, '`PJVNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PJVNO->Sortable = true; // Allow sort
        $this->Fields['PJVNO'] = &$this->PJVNO;

        // PJVSLNO
        $this->PJVSLNO = new DbField('store_storeled', 'store_storeled', 'x_PJVSLNO', 'PJVSLNO', '`PJVSLNO`', '`PJVSLNO`', 200, 3, -1, false, '`PJVSLNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PJVSLNO->Sortable = true; // Allow sort
        $this->Fields['PJVSLNO'] = &$this->PJVSLNO;

        // OTHDISC
        $this->OTHDISC = new DbField('store_storeled', 'store_storeled', 'x_OTHDISC', 'OTHDISC', '`OTHDISC`', '`OTHDISC`', 131, 12, -1, false, '`OTHDISC`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OTHDISC->Sortable = true; // Allow sort
        $this->OTHDISC->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OTHDISC->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['OTHDISC'] = &$this->OTHDISC;

        // PJVYM
        $this->PJVYM = new DbField('store_storeled', 'store_storeled', 'x_PJVYM', 'PJVYM', '`PJVYM`', '`PJVYM`', 200, 6, -1, false, '`PJVYM`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PJVYM->Sortable = true; // Allow sort
        $this->Fields['PJVYM'] = &$this->PJVYM;

        // PURDISCPER
        $this->PURDISCPER = new DbField('store_storeled', 'store_storeled', 'x_PURDISCPER', 'PURDISCPER', '`PURDISCPER`', '`PURDISCPER`', 131, 5, -1, false, '`PURDISCPER`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PURDISCPER->Sortable = true; // Allow sort
        $this->PURDISCPER->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PURDISCPER->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['PURDISCPER'] = &$this->PURDISCPER;

        // CASHIER
        $this->CASHIER = new DbField('store_storeled', 'store_storeled', 'x_CASHIER', 'CASHIER', '`CASHIER`', '`CASHIER`', 200, 5, -1, false, '`CASHIER`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CASHIER->Sortable = true; // Allow sort
        $this->Fields['CASHIER'] = &$this->CASHIER;

        // CASHTIME
        $this->CASHTIME = new DbField('store_storeled', 'store_storeled', 'x_CASHTIME', 'CASHTIME', '`CASHTIME`', '`CASHTIME`', 200, 8, -1, false, '`CASHTIME`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CASHTIME->Sortable = true; // Allow sort
        $this->Fields['CASHTIME'] = &$this->CASHTIME;

        // CASHRECD
        $this->CASHRECD = new DbField('store_storeled', 'store_storeled', 'x_CASHRECD', 'CASHRECD', '`CASHRECD`', '`CASHRECD`', 131, 12, -1, false, '`CASHRECD`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CASHRECD->Sortable = true; // Allow sort
        $this->CASHRECD->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->CASHRECD->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['CASHRECD'] = &$this->CASHRECD;

        // CASHREFNO
        $this->CASHREFNO = new DbField('store_storeled', 'store_storeled', 'x_CASHREFNO', 'CASHREFNO', '`CASHREFNO`', '`CASHREFNO`', 200, 5, -1, false, '`CASHREFNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CASHREFNO->Sortable = true; // Allow sort
        $this->Fields['CASHREFNO'] = &$this->CASHREFNO;

        // CASHIERSHIFT
        $this->CASHIERSHIFT = new DbField('store_storeled', 'store_storeled', 'x_CASHIERSHIFT', 'CASHIERSHIFT', '`CASHIERSHIFT`', '`CASHIERSHIFT`', 200, 1, -1, false, '`CASHIERSHIFT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CASHIERSHIFT->Sortable = true; // Allow sort
        $this->Fields['CASHIERSHIFT'] = &$this->CASHIERSHIFT;

        // PRCODE
        $this->PRCODE = new DbField('store_storeled', 'store_storeled', 'x_PRCODE', 'PRCODE', '`PRCODE`', '`PRCODE`', 200, 9, -1, false, '`PRCODE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PRCODE->Sortable = true; // Allow sort
        $this->Fields['PRCODE'] = &$this->PRCODE;

        // RELEASEBY
        $this->RELEASEBY = new DbField('store_storeled', 'store_storeled', 'x_RELEASEBY', 'RELEASEBY', '`RELEASEBY`', '`RELEASEBY`', 200, 15, -1, false, '`RELEASEBY`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RELEASEBY->Sortable = true; // Allow sort
        $this->Fields['RELEASEBY'] = &$this->RELEASEBY;

        // CRAUTHOR
        $this->CRAUTHOR = new DbField('store_storeled', 'store_storeled', 'x_CRAUTHOR', 'CRAUTHOR', '`CRAUTHOR`', '`CRAUTHOR`', 200, 15, -1, false, '`CRAUTHOR`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CRAUTHOR->Sortable = true; // Allow sort
        $this->Fields['CRAUTHOR'] = &$this->CRAUTHOR;

        // PAYMENT
        $this->PAYMENT = new DbField('store_storeled', 'store_storeled', 'x_PAYMENT', 'PAYMENT', '`PAYMENT`', '`PAYMENT`', 200, 4, -1, false, '`PAYMENT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PAYMENT->Sortable = true; // Allow sort
        $this->Fields['PAYMENT'] = &$this->PAYMENT;

        // DRID
        $this->DRID = new DbField('store_storeled', 'store_storeled', 'x_DRID', 'DRID', '`DRID`', '`DRID`', 200, 5, -1, false, '`DRID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DRID->Sortable = true; // Allow sort
        $this->Fields['DRID'] = &$this->DRID;

        // WARD
        $this->WARD = new DbField('store_storeled', 'store_storeled', 'x_WARD', 'WARD', '`WARD`', '`WARD`', 200, 30, -1, false, '`WARD`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->WARD->Sortable = true; // Allow sort
        $this->Fields['WARD'] = &$this->WARD;

        // STAXTYPE
        $this->STAXTYPE = new DbField('store_storeled', 'store_storeled', 'x_STAXTYPE', 'STAXTYPE', '`STAXTYPE`', '`STAXTYPE`', 200, 1, -1, false, '`STAXTYPE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->STAXTYPE->Sortable = true; // Allow sort
        $this->Fields['STAXTYPE'] = &$this->STAXTYPE;

        // PURDISCVAL
        $this->PURDISCVAL = new DbField('store_storeled', 'store_storeled', 'x_PURDISCVAL', 'PURDISCVAL', '`PURDISCVAL`', '`PURDISCVAL`', 131, 12, -1, false, '`PURDISCVAL`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PURDISCVAL->Sortable = true; // Allow sort
        $this->PURDISCVAL->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PURDISCVAL->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['PURDISCVAL'] = &$this->PURDISCVAL;

        // RNDOFF
        $this->RNDOFF = new DbField('store_storeled', 'store_storeled', 'x_RNDOFF', 'RNDOFF', '`RNDOFF`', '`RNDOFF`', 131, 10, -1, false, '`RNDOFF`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RNDOFF->Sortable = true; // Allow sort
        $this->RNDOFF->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->RNDOFF->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['RNDOFF'] = &$this->RNDOFF;

        // DISCONMRP
        $this->DISCONMRP = new DbField('store_storeled', 'store_storeled', 'x_DISCONMRP', 'DISCONMRP', '`DISCONMRP`', '`DISCONMRP`', 131, 12, -1, false, '`DISCONMRP`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DISCONMRP->Sortable = true; // Allow sort
        $this->DISCONMRP->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->DISCONMRP->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['DISCONMRP'] = &$this->DISCONMRP;

        // DELVDT
        $this->DELVDT = new DbField('store_storeled', 'store_storeled', 'x_DELVDT', 'DELVDT', '`DELVDT`', CastDateFieldForLike("`DELVDT`", 0, "DB"), 135, 19, 0, false, '`DELVDT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DELVDT->Sortable = true; // Allow sort
        $this->DELVDT->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['DELVDT'] = &$this->DELVDT;

        // DELVTIME
        $this->DELVTIME = new DbField('store_storeled', 'store_storeled', 'x_DELVTIME', 'DELVTIME', '`DELVTIME`', '`DELVTIME`', 200, 8, -1, false, '`DELVTIME`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DELVTIME->Sortable = true; // Allow sort
        $this->Fields['DELVTIME'] = &$this->DELVTIME;

        // DELVBY
        $this->DELVBY = new DbField('store_storeled', 'store_storeled', 'x_DELVBY', 'DELVBY', '`DELVBY`', '`DELVBY`', 200, 5, -1, false, '`DELVBY`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DELVBY->Sortable = true; // Allow sort
        $this->Fields['DELVBY'] = &$this->DELVBY;

        // HOSPNO
        $this->HOSPNO = new DbField('store_storeled', 'store_storeled', 'x_HOSPNO', 'HOSPNO', '`HOSPNO`', '`HOSPNO`', 200, 10, -1, false, '`HOSPNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HOSPNO->Sortable = true; // Allow sort
        $this->Fields['HOSPNO'] = &$this->HOSPNO;

        // id
        $this->id = new DbField('store_storeled', 'store_storeled', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['id'] = &$this->id;

        // pbv
        $this->pbv = new DbField('store_storeled', 'store_storeled', 'x_pbv', 'pbv', '`pbv`', '`pbv`', 3, 11, -1, false, '`pbv`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->pbv->Sortable = true; // Allow sort
        $this->pbv->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['pbv'] = &$this->pbv;

        // pbt
        $this->pbt = new DbField('store_storeled', 'store_storeled', 'x_pbt', 'pbt', '`pbt`', '`pbt`', 3, 11, -1, false, '`pbt`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->pbt->Sortable = true; // Allow sort
        $this->pbt->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['pbt'] = &$this->pbt;

        // SiNo
        $this->SiNo = new DbField('store_storeled', 'store_storeled', 'x_SiNo', 'SiNo', '`SiNo`', '`SiNo`', 3, 11, -1, false, '`SiNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SiNo->Sortable = true; // Allow sort
        $this->SiNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['SiNo'] = &$this->SiNo;

        // Product
        $this->Product = new DbField('store_storeled', 'store_storeled', 'x_Product', 'Product', '`Product`', '`Product`', 200, 45, -1, false, '`Product`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Product->Sortable = true; // Allow sort
        $this->Fields['Product'] = &$this->Product;

        // Mfg
        $this->Mfg = new DbField('store_storeled', 'store_storeled', 'x_Mfg', 'Mfg', '`Mfg`', '`Mfg`', 200, 45, -1, false, '`Mfg`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Mfg->Sortable = true; // Allow sort
        $this->Fields['Mfg'] = &$this->Mfg;

        // HosoID
        $this->HosoID = new DbField('store_storeled', 'store_storeled', 'x_HosoID', 'HosoID', '`HosoID`', '`HosoID`', 3, 11, -1, false, '`HosoID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HosoID->Sortable = true; // Allow sort
        $this->HosoID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['HosoID'] = &$this->HosoID;

        // createdby
        $this->createdby = new DbField('store_storeled', 'store_storeled', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 200, 45, -1, false, '`createdby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdby->Sortable = true; // Allow sort
        $this->Fields['createdby'] = &$this->createdby;

        // createddatetime
        $this->createddatetime = new DbField('store_storeled', 'store_storeled', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, false, '`createddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddatetime->Sortable = true; // Allow sort
        $this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['createddatetime'] = &$this->createddatetime;

        // modifiedby
        $this->modifiedby = new DbField('store_storeled', 'store_storeled', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 200, 45, -1, false, '`modifiedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifiedby->Sortable = true; // Allow sort
        $this->Fields['modifiedby'] = &$this->modifiedby;

        // modifieddatetime
        $this->modifieddatetime = new DbField('store_storeled', 'store_storeled', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, false, '`modifieddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifieddatetime->Sortable = true; // Allow sort
        $this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['modifieddatetime'] = &$this->modifieddatetime;

        // MFRCODE
        $this->MFRCODE = new DbField('store_storeled', 'store_storeled', 'x_MFRCODE', 'MFRCODE', '`MFRCODE`', '`MFRCODE`', 200, 45, -1, false, '`MFRCODE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MFRCODE->Sortable = true; // Allow sort
        $this->Fields['MFRCODE'] = &$this->MFRCODE;

        // Reception
        $this->Reception = new DbField('store_storeled', 'store_storeled', 'x_Reception', 'Reception', '`Reception`', '`Reception`', 3, 11, -1, false, '`Reception`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Reception->Sortable = true; // Allow sort
        $this->Reception->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['Reception'] = &$this->Reception;

        // PatID
        $this->PatID = new DbField('store_storeled', 'store_storeled', 'x_PatID', 'PatID', '`PatID`', '`PatID`', 3, 11, -1, false, '`PatID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatID->Sortable = true; // Allow sort
        $this->PatID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['PatID'] = &$this->PatID;

        // mrnno
        $this->mrnno = new DbField('store_storeled', 'store_storeled', 'x_mrnno', 'mrnno', '`mrnno`', '`mrnno`', 200, 45, -1, false, '`mrnno`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->mrnno->Sortable = true; // Allow sort
        $this->Fields['mrnno'] = &$this->mrnno;

        // BRNAME
        $this->BRNAME = new DbField('store_storeled', 'store_storeled', 'x_BRNAME', 'BRNAME', '`BRNAME`', '`BRNAME`', 200, 45, -1, false, '`BRNAME`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BRNAME->Sortable = true; // Allow sort
        $this->Fields['BRNAME'] = &$this->BRNAME;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`store_storeled`";
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
        $this->BRCODE->DbValue = $row['BRCODE'];
        $this->TYPE->DbValue = $row['TYPE'];
        $this->DN->DbValue = $row['DN'];
        $this->RDN->DbValue = $row['RDN'];
        $this->DT->DbValue = $row['DT'];
        $this->PRC->DbValue = $row['PRC'];
        $this->OQ->DbValue = $row['OQ'];
        $this->RQ->DbValue = $row['RQ'];
        $this->MRQ->DbValue = $row['MRQ'];
        $this->IQ->DbValue = $row['IQ'];
        $this->BATCHNO->DbValue = $row['BATCHNO'];
        $this->EXPDT->DbValue = $row['EXPDT'];
        $this->BILLNO->DbValue = $row['BILLNO'];
        $this->BILLDT->DbValue = $row['BILLDT'];
        $this->RT->DbValue = $row['RT'];
        $this->VALUE->DbValue = $row['VALUE'];
        $this->DISC->DbValue = $row['DISC'];
        $this->TAXP->DbValue = $row['TAXP'];
        $this->TAX->DbValue = $row['TAX'];
        $this->TAXR->DbValue = $row['TAXR'];
        $this->DAMT->DbValue = $row['DAMT'];
        $this->EMPNO->DbValue = $row['EMPNO'];
        $this->PC->DbValue = $row['PC'];
        $this->DRNAME->DbValue = $row['DRNAME'];
        $this->BTIME->DbValue = $row['BTIME'];
        $this->ONO->DbValue = $row['ONO'];
        $this->ODT->DbValue = $row['ODT'];
        $this->PURRT->DbValue = $row['PURRT'];
        $this->GRP->DbValue = $row['GRP'];
        $this->IBATCH->DbValue = $row['IBATCH'];
        $this->IPNO->DbValue = $row['IPNO'];
        $this->OPNO->DbValue = $row['OPNO'];
        $this->RECID->DbValue = $row['RECID'];
        $this->FQTY->DbValue = $row['FQTY'];
        $this->UR->DbValue = $row['UR'];
        $this->DCID->DbValue = $row['DCID'];
        $this->_USERID->DbValue = $row['USERID'];
        $this->MODDT->DbValue = $row['MODDT'];
        $this->FYM->DbValue = $row['FYM'];
        $this->PRCBATCH->DbValue = $row['PRCBATCH'];
        $this->SLNO->DbValue = $row['SLNO'];
        $this->MRP->DbValue = $row['MRP'];
        $this->BILLYM->DbValue = $row['BILLYM'];
        $this->BILLGRP->DbValue = $row['BILLGRP'];
        $this->STAFF->DbValue = $row['STAFF'];
        $this->TEMPIPNO->DbValue = $row['TEMPIPNO'];
        $this->PRNTED->DbValue = $row['PRNTED'];
        $this->PATNAME->DbValue = $row['PATNAME'];
        $this->PJVNO->DbValue = $row['PJVNO'];
        $this->PJVSLNO->DbValue = $row['PJVSLNO'];
        $this->OTHDISC->DbValue = $row['OTHDISC'];
        $this->PJVYM->DbValue = $row['PJVYM'];
        $this->PURDISCPER->DbValue = $row['PURDISCPER'];
        $this->CASHIER->DbValue = $row['CASHIER'];
        $this->CASHTIME->DbValue = $row['CASHTIME'];
        $this->CASHRECD->DbValue = $row['CASHRECD'];
        $this->CASHREFNO->DbValue = $row['CASHREFNO'];
        $this->CASHIERSHIFT->DbValue = $row['CASHIERSHIFT'];
        $this->PRCODE->DbValue = $row['PRCODE'];
        $this->RELEASEBY->DbValue = $row['RELEASEBY'];
        $this->CRAUTHOR->DbValue = $row['CRAUTHOR'];
        $this->PAYMENT->DbValue = $row['PAYMENT'];
        $this->DRID->DbValue = $row['DRID'];
        $this->WARD->DbValue = $row['WARD'];
        $this->STAXTYPE->DbValue = $row['STAXTYPE'];
        $this->PURDISCVAL->DbValue = $row['PURDISCVAL'];
        $this->RNDOFF->DbValue = $row['RNDOFF'];
        $this->DISCONMRP->DbValue = $row['DISCONMRP'];
        $this->DELVDT->DbValue = $row['DELVDT'];
        $this->DELVTIME->DbValue = $row['DELVTIME'];
        $this->DELVBY->DbValue = $row['DELVBY'];
        $this->HOSPNO->DbValue = $row['HOSPNO'];
        $this->id->DbValue = $row['id'];
        $this->pbv->DbValue = $row['pbv'];
        $this->pbt->DbValue = $row['pbt'];
        $this->SiNo->DbValue = $row['SiNo'];
        $this->Product->DbValue = $row['Product'];
        $this->Mfg->DbValue = $row['Mfg'];
        $this->HosoID->DbValue = $row['HosoID'];
        $this->createdby->DbValue = $row['createdby'];
        $this->createddatetime->DbValue = $row['createddatetime'];
        $this->modifiedby->DbValue = $row['modifiedby'];
        $this->modifieddatetime->DbValue = $row['modifieddatetime'];
        $this->MFRCODE->DbValue = $row['MFRCODE'];
        $this->Reception->DbValue = $row['Reception'];
        $this->PatID->DbValue = $row['PatID'];
        $this->mrnno->DbValue = $row['mrnno'];
        $this->BRNAME->DbValue = $row['BRNAME'];
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
            return GetUrl("StoreStoreledList");
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
        if ($pageName == "StoreStoreledView") {
            return $Language->phrase("View");
        } elseif ($pageName == "StoreStoreledEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "StoreStoreledAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "StoreStoreledList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("StoreStoreledView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("StoreStoreledView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "StoreStoreledAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "StoreStoreledAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("StoreStoreledEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("StoreStoreledAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("StoreStoreledDelete", $this->getUrlParm());
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
        $this->BRCODE->setDbValue($row['BRCODE']);
        $this->TYPE->setDbValue($row['TYPE']);
        $this->DN->setDbValue($row['DN']);
        $this->RDN->setDbValue($row['RDN']);
        $this->DT->setDbValue($row['DT']);
        $this->PRC->setDbValue($row['PRC']);
        $this->OQ->setDbValue($row['OQ']);
        $this->RQ->setDbValue($row['RQ']);
        $this->MRQ->setDbValue($row['MRQ']);
        $this->IQ->setDbValue($row['IQ']);
        $this->BATCHNO->setDbValue($row['BATCHNO']);
        $this->EXPDT->setDbValue($row['EXPDT']);
        $this->BILLNO->setDbValue($row['BILLNO']);
        $this->BILLDT->setDbValue($row['BILLDT']);
        $this->RT->setDbValue($row['RT']);
        $this->VALUE->setDbValue($row['VALUE']);
        $this->DISC->setDbValue($row['DISC']);
        $this->TAXP->setDbValue($row['TAXP']);
        $this->TAX->setDbValue($row['TAX']);
        $this->TAXR->setDbValue($row['TAXR']);
        $this->DAMT->setDbValue($row['DAMT']);
        $this->EMPNO->setDbValue($row['EMPNO']);
        $this->PC->setDbValue($row['PC']);
        $this->DRNAME->setDbValue($row['DRNAME']);
        $this->BTIME->setDbValue($row['BTIME']);
        $this->ONO->setDbValue($row['ONO']);
        $this->ODT->setDbValue($row['ODT']);
        $this->PURRT->setDbValue($row['PURRT']);
        $this->GRP->setDbValue($row['GRP']);
        $this->IBATCH->setDbValue($row['IBATCH']);
        $this->IPNO->setDbValue($row['IPNO']);
        $this->OPNO->setDbValue($row['OPNO']);
        $this->RECID->setDbValue($row['RECID']);
        $this->FQTY->setDbValue($row['FQTY']);
        $this->UR->setDbValue($row['UR']);
        $this->DCID->setDbValue($row['DCID']);
        $this->_USERID->setDbValue($row['USERID']);
        $this->MODDT->setDbValue($row['MODDT']);
        $this->FYM->setDbValue($row['FYM']);
        $this->PRCBATCH->setDbValue($row['PRCBATCH']);
        $this->SLNO->setDbValue($row['SLNO']);
        $this->MRP->setDbValue($row['MRP']);
        $this->BILLYM->setDbValue($row['BILLYM']);
        $this->BILLGRP->setDbValue($row['BILLGRP']);
        $this->STAFF->setDbValue($row['STAFF']);
        $this->TEMPIPNO->setDbValue($row['TEMPIPNO']);
        $this->PRNTED->setDbValue($row['PRNTED']);
        $this->PATNAME->setDbValue($row['PATNAME']);
        $this->PJVNO->setDbValue($row['PJVNO']);
        $this->PJVSLNO->setDbValue($row['PJVSLNO']);
        $this->OTHDISC->setDbValue($row['OTHDISC']);
        $this->PJVYM->setDbValue($row['PJVYM']);
        $this->PURDISCPER->setDbValue($row['PURDISCPER']);
        $this->CASHIER->setDbValue($row['CASHIER']);
        $this->CASHTIME->setDbValue($row['CASHTIME']);
        $this->CASHRECD->setDbValue($row['CASHRECD']);
        $this->CASHREFNO->setDbValue($row['CASHREFNO']);
        $this->CASHIERSHIFT->setDbValue($row['CASHIERSHIFT']);
        $this->PRCODE->setDbValue($row['PRCODE']);
        $this->RELEASEBY->setDbValue($row['RELEASEBY']);
        $this->CRAUTHOR->setDbValue($row['CRAUTHOR']);
        $this->PAYMENT->setDbValue($row['PAYMENT']);
        $this->DRID->setDbValue($row['DRID']);
        $this->WARD->setDbValue($row['WARD']);
        $this->STAXTYPE->setDbValue($row['STAXTYPE']);
        $this->PURDISCVAL->setDbValue($row['PURDISCVAL']);
        $this->RNDOFF->setDbValue($row['RNDOFF']);
        $this->DISCONMRP->setDbValue($row['DISCONMRP']);
        $this->DELVDT->setDbValue($row['DELVDT']);
        $this->DELVTIME->setDbValue($row['DELVTIME']);
        $this->DELVBY->setDbValue($row['DELVBY']);
        $this->HOSPNO->setDbValue($row['HOSPNO']);
        $this->id->setDbValue($row['id']);
        $this->pbv->setDbValue($row['pbv']);
        $this->pbt->setDbValue($row['pbt']);
        $this->SiNo->setDbValue($row['SiNo']);
        $this->Product->setDbValue($row['Product']);
        $this->Mfg->setDbValue($row['Mfg']);
        $this->HosoID->setDbValue($row['HosoID']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->MFRCODE->setDbValue($row['MFRCODE']);
        $this->Reception->setDbValue($row['Reception']);
        $this->PatID->setDbValue($row['PatID']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->BRNAME->setDbValue($row['BRNAME']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // BRCODE

        // TYPE

        // DN

        // RDN

        // DT

        // PRC

        // OQ

        // RQ

        // MRQ

        // IQ

        // BATCHNO

        // EXPDT

        // BILLNO

        // BILLDT

        // RT

        // VALUE

        // DISC

        // TAXP

        // TAX

        // TAXR

        // DAMT

        // EMPNO

        // PC

        // DRNAME

        // BTIME

        // ONO

        // ODT

        // PURRT

        // GRP

        // IBATCH

        // IPNO

        // OPNO

        // RECID

        // FQTY

        // UR

        // DCID

        // USERID

        // MODDT

        // FYM

        // PRCBATCH

        // SLNO

        // MRP

        // BILLYM

        // BILLGRP

        // STAFF

        // TEMPIPNO

        // PRNTED

        // PATNAME

        // PJVNO

        // PJVSLNO

        // OTHDISC

        // PJVYM

        // PURDISCPER

        // CASHIER

        // CASHTIME

        // CASHRECD

        // CASHREFNO

        // CASHIERSHIFT

        // PRCODE

        // RELEASEBY

        // CRAUTHOR

        // PAYMENT

        // DRID

        // WARD

        // STAXTYPE

        // PURDISCVAL

        // RNDOFF

        // DISCONMRP

        // DELVDT

        // DELVTIME

        // DELVBY

        // HOSPNO

        // id

        // pbv

        // pbt

        // SiNo

        // Product

        // Mfg

        // HosoID

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // MFRCODE

        // Reception

        // PatID

        // mrnno

        // BRNAME

        // BRCODE
        $this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
        $this->BRCODE->ViewValue = FormatNumber($this->BRCODE->ViewValue, 0, -2, -2, -2);
        $this->BRCODE->ViewCustomAttributes = "";

        // TYPE
        $this->TYPE->ViewValue = $this->TYPE->CurrentValue;
        $this->TYPE->ViewCustomAttributes = "";

        // DN
        $this->DN->ViewValue = $this->DN->CurrentValue;
        $this->DN->ViewCustomAttributes = "";

        // RDN
        $this->RDN->ViewValue = $this->RDN->CurrentValue;
        $this->RDN->ViewCustomAttributes = "";

        // DT
        $this->DT->ViewValue = $this->DT->CurrentValue;
        $this->DT->ViewValue = FormatDateTime($this->DT->ViewValue, 0);
        $this->DT->ViewCustomAttributes = "";

        // PRC
        $this->PRC->ViewValue = $this->PRC->CurrentValue;
        $this->PRC->ViewCustomAttributes = "";

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

        // BATCHNO
        $this->BATCHNO->ViewValue = $this->BATCHNO->CurrentValue;
        $this->BATCHNO->ViewCustomAttributes = "";

        // EXPDT
        $this->EXPDT->ViewValue = $this->EXPDT->CurrentValue;
        $this->EXPDT->ViewValue = FormatDateTime($this->EXPDT->ViewValue, 0);
        $this->EXPDT->ViewCustomAttributes = "";

        // BILLNO
        $this->BILLNO->ViewValue = $this->BILLNO->CurrentValue;
        $this->BILLNO->ViewCustomAttributes = "";

        // BILLDT
        $this->BILLDT->ViewValue = $this->BILLDT->CurrentValue;
        $this->BILLDT->ViewValue = FormatDateTime($this->BILLDT->ViewValue, 0);
        $this->BILLDT->ViewCustomAttributes = "";

        // RT
        $this->RT->ViewValue = $this->RT->CurrentValue;
        $this->RT->ViewValue = FormatNumber($this->RT->ViewValue, 2, -2, -2, -2);
        $this->RT->ViewCustomAttributes = "";

        // VALUE
        $this->VALUE->ViewValue = $this->VALUE->CurrentValue;
        $this->VALUE->ViewValue = FormatNumber($this->VALUE->ViewValue, 2, -2, -2, -2);
        $this->VALUE->ViewCustomAttributes = "";

        // DISC
        $this->DISC->ViewValue = $this->DISC->CurrentValue;
        $this->DISC->ViewValue = FormatNumber($this->DISC->ViewValue, 2, -2, -2, -2);
        $this->DISC->ViewCustomAttributes = "";

        // TAXP
        $this->TAXP->ViewValue = $this->TAXP->CurrentValue;
        $this->TAXP->ViewValue = FormatNumber($this->TAXP->ViewValue, 2, -2, -2, -2);
        $this->TAXP->ViewCustomAttributes = "";

        // TAX
        $this->TAX->ViewValue = $this->TAX->CurrentValue;
        $this->TAX->ViewValue = FormatNumber($this->TAX->ViewValue, 2, -2, -2, -2);
        $this->TAX->ViewCustomAttributes = "";

        // TAXR
        $this->TAXR->ViewValue = $this->TAXR->CurrentValue;
        $this->TAXR->ViewValue = FormatNumber($this->TAXR->ViewValue, 2, -2, -2, -2);
        $this->TAXR->ViewCustomAttributes = "";

        // DAMT
        $this->DAMT->ViewValue = $this->DAMT->CurrentValue;
        $this->DAMT->ViewValue = FormatNumber($this->DAMT->ViewValue, 2, -2, -2, -2);
        $this->DAMT->ViewCustomAttributes = "";

        // EMPNO
        $this->EMPNO->ViewValue = $this->EMPNO->CurrentValue;
        $this->EMPNO->ViewCustomAttributes = "";

        // PC
        $this->PC->ViewValue = $this->PC->CurrentValue;
        $this->PC->ViewCustomAttributes = "";

        // DRNAME
        $this->DRNAME->ViewValue = $this->DRNAME->CurrentValue;
        $this->DRNAME->ViewCustomAttributes = "";

        // BTIME
        $this->BTIME->ViewValue = $this->BTIME->CurrentValue;
        $this->BTIME->ViewCustomAttributes = "";

        // ONO
        $this->ONO->ViewValue = $this->ONO->CurrentValue;
        $this->ONO->ViewCustomAttributes = "";

        // ODT
        $this->ODT->ViewValue = $this->ODT->CurrentValue;
        $this->ODT->ViewValue = FormatDateTime($this->ODT->ViewValue, 0);
        $this->ODT->ViewCustomAttributes = "";

        // PURRT
        $this->PURRT->ViewValue = $this->PURRT->CurrentValue;
        $this->PURRT->ViewValue = FormatNumber($this->PURRT->ViewValue, 2, -2, -2, -2);
        $this->PURRT->ViewCustomAttributes = "";

        // GRP
        $this->GRP->ViewValue = $this->GRP->CurrentValue;
        $this->GRP->ViewCustomAttributes = "";

        // IBATCH
        $this->IBATCH->ViewValue = $this->IBATCH->CurrentValue;
        $this->IBATCH->ViewCustomAttributes = "";

        // IPNO
        $this->IPNO->ViewValue = $this->IPNO->CurrentValue;
        $this->IPNO->ViewCustomAttributes = "";

        // OPNO
        $this->OPNO->ViewValue = $this->OPNO->CurrentValue;
        $this->OPNO->ViewCustomAttributes = "";

        // RECID
        $this->RECID->ViewValue = $this->RECID->CurrentValue;
        $this->RECID->ViewCustomAttributes = "";

        // FQTY
        $this->FQTY->ViewValue = $this->FQTY->CurrentValue;
        $this->FQTY->ViewValue = FormatNumber($this->FQTY->ViewValue, 2, -2, -2, -2);
        $this->FQTY->ViewCustomAttributes = "";

        // UR
        $this->UR->ViewValue = $this->UR->CurrentValue;
        $this->UR->ViewValue = FormatNumber($this->UR->ViewValue, 2, -2, -2, -2);
        $this->UR->ViewCustomAttributes = "";

        // DCID
        $this->DCID->ViewValue = $this->DCID->CurrentValue;
        $this->DCID->ViewCustomAttributes = "";

        // USERID
        $this->_USERID->ViewValue = $this->_USERID->CurrentValue;
        $this->_USERID->ViewCustomAttributes = "";

        // MODDT
        $this->MODDT->ViewValue = $this->MODDT->CurrentValue;
        $this->MODDT->ViewValue = FormatDateTime($this->MODDT->ViewValue, 0);
        $this->MODDT->ViewCustomAttributes = "";

        // FYM
        $this->FYM->ViewValue = $this->FYM->CurrentValue;
        $this->FYM->ViewCustomAttributes = "";

        // PRCBATCH
        $this->PRCBATCH->ViewValue = $this->PRCBATCH->CurrentValue;
        $this->PRCBATCH->ViewCustomAttributes = "";

        // SLNO
        $this->SLNO->ViewValue = $this->SLNO->CurrentValue;
        $this->SLNO->ViewValue = FormatNumber($this->SLNO->ViewValue, 0, -2, -2, -2);
        $this->SLNO->ViewCustomAttributes = "";

        // MRP
        $this->MRP->ViewValue = $this->MRP->CurrentValue;
        $this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
        $this->MRP->ViewCustomAttributes = "";

        // BILLYM
        $this->BILLYM->ViewValue = $this->BILLYM->CurrentValue;
        $this->BILLYM->ViewCustomAttributes = "";

        // BILLGRP
        $this->BILLGRP->ViewValue = $this->BILLGRP->CurrentValue;
        $this->BILLGRP->ViewCustomAttributes = "";

        // STAFF
        $this->STAFF->ViewValue = $this->STAFF->CurrentValue;
        $this->STAFF->ViewCustomAttributes = "";

        // TEMPIPNO
        $this->TEMPIPNO->ViewValue = $this->TEMPIPNO->CurrentValue;
        $this->TEMPIPNO->ViewCustomAttributes = "";

        // PRNTED
        $this->PRNTED->ViewValue = $this->PRNTED->CurrentValue;
        $this->PRNTED->ViewCustomAttributes = "";

        // PATNAME
        $this->PATNAME->ViewValue = $this->PATNAME->CurrentValue;
        $this->PATNAME->ViewCustomAttributes = "";

        // PJVNO
        $this->PJVNO->ViewValue = $this->PJVNO->CurrentValue;
        $this->PJVNO->ViewCustomAttributes = "";

        // PJVSLNO
        $this->PJVSLNO->ViewValue = $this->PJVSLNO->CurrentValue;
        $this->PJVSLNO->ViewCustomAttributes = "";

        // OTHDISC
        $this->OTHDISC->ViewValue = $this->OTHDISC->CurrentValue;
        $this->OTHDISC->ViewValue = FormatNumber($this->OTHDISC->ViewValue, 2, -2, -2, -2);
        $this->OTHDISC->ViewCustomAttributes = "";

        // PJVYM
        $this->PJVYM->ViewValue = $this->PJVYM->CurrentValue;
        $this->PJVYM->ViewCustomAttributes = "";

        // PURDISCPER
        $this->PURDISCPER->ViewValue = $this->PURDISCPER->CurrentValue;
        $this->PURDISCPER->ViewValue = FormatNumber($this->PURDISCPER->ViewValue, 2, -2, -2, -2);
        $this->PURDISCPER->ViewCustomAttributes = "";

        // CASHIER
        $this->CASHIER->ViewValue = $this->CASHIER->CurrentValue;
        $this->CASHIER->ViewCustomAttributes = "";

        // CASHTIME
        $this->CASHTIME->ViewValue = $this->CASHTIME->CurrentValue;
        $this->CASHTIME->ViewCustomAttributes = "";

        // CASHRECD
        $this->CASHRECD->ViewValue = $this->CASHRECD->CurrentValue;
        $this->CASHRECD->ViewValue = FormatNumber($this->CASHRECD->ViewValue, 2, -2, -2, -2);
        $this->CASHRECD->ViewCustomAttributes = "";

        // CASHREFNO
        $this->CASHREFNO->ViewValue = $this->CASHREFNO->CurrentValue;
        $this->CASHREFNO->ViewCustomAttributes = "";

        // CASHIERSHIFT
        $this->CASHIERSHIFT->ViewValue = $this->CASHIERSHIFT->CurrentValue;
        $this->CASHIERSHIFT->ViewCustomAttributes = "";

        // PRCODE
        $this->PRCODE->ViewValue = $this->PRCODE->CurrentValue;
        $this->PRCODE->ViewCustomAttributes = "";

        // RELEASEBY
        $this->RELEASEBY->ViewValue = $this->RELEASEBY->CurrentValue;
        $this->RELEASEBY->ViewCustomAttributes = "";

        // CRAUTHOR
        $this->CRAUTHOR->ViewValue = $this->CRAUTHOR->CurrentValue;
        $this->CRAUTHOR->ViewCustomAttributes = "";

        // PAYMENT
        $this->PAYMENT->ViewValue = $this->PAYMENT->CurrentValue;
        $this->PAYMENT->ViewCustomAttributes = "";

        // DRID
        $this->DRID->ViewValue = $this->DRID->CurrentValue;
        $this->DRID->ViewCustomAttributes = "";

        // WARD
        $this->WARD->ViewValue = $this->WARD->CurrentValue;
        $this->WARD->ViewCustomAttributes = "";

        // STAXTYPE
        $this->STAXTYPE->ViewValue = $this->STAXTYPE->CurrentValue;
        $this->STAXTYPE->ViewCustomAttributes = "";

        // PURDISCVAL
        $this->PURDISCVAL->ViewValue = $this->PURDISCVAL->CurrentValue;
        $this->PURDISCVAL->ViewValue = FormatNumber($this->PURDISCVAL->ViewValue, 2, -2, -2, -2);
        $this->PURDISCVAL->ViewCustomAttributes = "";

        // RNDOFF
        $this->RNDOFF->ViewValue = $this->RNDOFF->CurrentValue;
        $this->RNDOFF->ViewValue = FormatNumber($this->RNDOFF->ViewValue, 2, -2, -2, -2);
        $this->RNDOFF->ViewCustomAttributes = "";

        // DISCONMRP
        $this->DISCONMRP->ViewValue = $this->DISCONMRP->CurrentValue;
        $this->DISCONMRP->ViewValue = FormatNumber($this->DISCONMRP->ViewValue, 2, -2, -2, -2);
        $this->DISCONMRP->ViewCustomAttributes = "";

        // DELVDT
        $this->DELVDT->ViewValue = $this->DELVDT->CurrentValue;
        $this->DELVDT->ViewValue = FormatDateTime($this->DELVDT->ViewValue, 0);
        $this->DELVDT->ViewCustomAttributes = "";

        // DELVTIME
        $this->DELVTIME->ViewValue = $this->DELVTIME->CurrentValue;
        $this->DELVTIME->ViewCustomAttributes = "";

        // DELVBY
        $this->DELVBY->ViewValue = $this->DELVBY->CurrentValue;
        $this->DELVBY->ViewCustomAttributes = "";

        // HOSPNO
        $this->HOSPNO->ViewValue = $this->HOSPNO->CurrentValue;
        $this->HOSPNO->ViewCustomAttributes = "";

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // pbv
        $this->pbv->ViewValue = $this->pbv->CurrentValue;
        $this->pbv->ViewValue = FormatNumber($this->pbv->ViewValue, 0, -2, -2, -2);
        $this->pbv->ViewCustomAttributes = "";

        // pbt
        $this->pbt->ViewValue = $this->pbt->CurrentValue;
        $this->pbt->ViewValue = FormatNumber($this->pbt->ViewValue, 0, -2, -2, -2);
        $this->pbt->ViewCustomAttributes = "";

        // SiNo
        $this->SiNo->ViewValue = $this->SiNo->CurrentValue;
        $this->SiNo->ViewValue = FormatNumber($this->SiNo->ViewValue, 0, -2, -2, -2);
        $this->SiNo->ViewCustomAttributes = "";

        // Product
        $this->Product->ViewValue = $this->Product->CurrentValue;
        $this->Product->ViewCustomAttributes = "";

        // Mfg
        $this->Mfg->ViewValue = $this->Mfg->CurrentValue;
        $this->Mfg->ViewCustomAttributes = "";

        // HosoID
        $this->HosoID->ViewValue = $this->HosoID->CurrentValue;
        $this->HosoID->ViewValue = FormatNumber($this->HosoID->ViewValue, 0, -2, -2, -2);
        $this->HosoID->ViewCustomAttributes = "";

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

        // MFRCODE
        $this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
        $this->MFRCODE->ViewCustomAttributes = "";

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

        // BRNAME
        $this->BRNAME->ViewValue = $this->BRNAME->CurrentValue;
        $this->BRNAME->ViewCustomAttributes = "";

        // BRCODE
        $this->BRCODE->LinkCustomAttributes = "";
        $this->BRCODE->HrefValue = "";
        $this->BRCODE->TooltipValue = "";

        // TYPE
        $this->TYPE->LinkCustomAttributes = "";
        $this->TYPE->HrefValue = "";
        $this->TYPE->TooltipValue = "";

        // DN
        $this->DN->LinkCustomAttributes = "";
        $this->DN->HrefValue = "";
        $this->DN->TooltipValue = "";

        // RDN
        $this->RDN->LinkCustomAttributes = "";
        $this->RDN->HrefValue = "";
        $this->RDN->TooltipValue = "";

        // DT
        $this->DT->LinkCustomAttributes = "";
        $this->DT->HrefValue = "";
        $this->DT->TooltipValue = "";

        // PRC
        $this->PRC->LinkCustomAttributes = "";
        $this->PRC->HrefValue = "";
        $this->PRC->TooltipValue = "";

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

        // BATCHNO
        $this->BATCHNO->LinkCustomAttributes = "";
        $this->BATCHNO->HrefValue = "";
        $this->BATCHNO->TooltipValue = "";

        // EXPDT
        $this->EXPDT->LinkCustomAttributes = "";
        $this->EXPDT->HrefValue = "";
        $this->EXPDT->TooltipValue = "";

        // BILLNO
        $this->BILLNO->LinkCustomAttributes = "";
        $this->BILLNO->HrefValue = "";
        $this->BILLNO->TooltipValue = "";

        // BILLDT
        $this->BILLDT->LinkCustomAttributes = "";
        $this->BILLDT->HrefValue = "";
        $this->BILLDT->TooltipValue = "";

        // RT
        $this->RT->LinkCustomAttributes = "";
        $this->RT->HrefValue = "";
        $this->RT->TooltipValue = "";

        // VALUE
        $this->VALUE->LinkCustomAttributes = "";
        $this->VALUE->HrefValue = "";
        $this->VALUE->TooltipValue = "";

        // DISC
        $this->DISC->LinkCustomAttributes = "";
        $this->DISC->HrefValue = "";
        $this->DISC->TooltipValue = "";

        // TAXP
        $this->TAXP->LinkCustomAttributes = "";
        $this->TAXP->HrefValue = "";
        $this->TAXP->TooltipValue = "";

        // TAX
        $this->TAX->LinkCustomAttributes = "";
        $this->TAX->HrefValue = "";
        $this->TAX->TooltipValue = "";

        // TAXR
        $this->TAXR->LinkCustomAttributes = "";
        $this->TAXR->HrefValue = "";
        $this->TAXR->TooltipValue = "";

        // DAMT
        $this->DAMT->LinkCustomAttributes = "";
        $this->DAMT->HrefValue = "";
        $this->DAMT->TooltipValue = "";

        // EMPNO
        $this->EMPNO->LinkCustomAttributes = "";
        $this->EMPNO->HrefValue = "";
        $this->EMPNO->TooltipValue = "";

        // PC
        $this->PC->LinkCustomAttributes = "";
        $this->PC->HrefValue = "";
        $this->PC->TooltipValue = "";

        // DRNAME
        $this->DRNAME->LinkCustomAttributes = "";
        $this->DRNAME->HrefValue = "";
        $this->DRNAME->TooltipValue = "";

        // BTIME
        $this->BTIME->LinkCustomAttributes = "";
        $this->BTIME->HrefValue = "";
        $this->BTIME->TooltipValue = "";

        // ONO
        $this->ONO->LinkCustomAttributes = "";
        $this->ONO->HrefValue = "";
        $this->ONO->TooltipValue = "";

        // ODT
        $this->ODT->LinkCustomAttributes = "";
        $this->ODT->HrefValue = "";
        $this->ODT->TooltipValue = "";

        // PURRT
        $this->PURRT->LinkCustomAttributes = "";
        $this->PURRT->HrefValue = "";
        $this->PURRT->TooltipValue = "";

        // GRP
        $this->GRP->LinkCustomAttributes = "";
        $this->GRP->HrefValue = "";
        $this->GRP->TooltipValue = "";

        // IBATCH
        $this->IBATCH->LinkCustomAttributes = "";
        $this->IBATCH->HrefValue = "";
        $this->IBATCH->TooltipValue = "";

        // IPNO
        $this->IPNO->LinkCustomAttributes = "";
        $this->IPNO->HrefValue = "";
        $this->IPNO->TooltipValue = "";

        // OPNO
        $this->OPNO->LinkCustomAttributes = "";
        $this->OPNO->HrefValue = "";
        $this->OPNO->TooltipValue = "";

        // RECID
        $this->RECID->LinkCustomAttributes = "";
        $this->RECID->HrefValue = "";
        $this->RECID->TooltipValue = "";

        // FQTY
        $this->FQTY->LinkCustomAttributes = "";
        $this->FQTY->HrefValue = "";
        $this->FQTY->TooltipValue = "";

        // UR
        $this->UR->LinkCustomAttributes = "";
        $this->UR->HrefValue = "";
        $this->UR->TooltipValue = "";

        // DCID
        $this->DCID->LinkCustomAttributes = "";
        $this->DCID->HrefValue = "";
        $this->DCID->TooltipValue = "";

        // USERID
        $this->_USERID->LinkCustomAttributes = "";
        $this->_USERID->HrefValue = "";
        $this->_USERID->TooltipValue = "";

        // MODDT
        $this->MODDT->LinkCustomAttributes = "";
        $this->MODDT->HrefValue = "";
        $this->MODDT->TooltipValue = "";

        // FYM
        $this->FYM->LinkCustomAttributes = "";
        $this->FYM->HrefValue = "";
        $this->FYM->TooltipValue = "";

        // PRCBATCH
        $this->PRCBATCH->LinkCustomAttributes = "";
        $this->PRCBATCH->HrefValue = "";
        $this->PRCBATCH->TooltipValue = "";

        // SLNO
        $this->SLNO->LinkCustomAttributes = "";
        $this->SLNO->HrefValue = "";
        $this->SLNO->TooltipValue = "";

        // MRP
        $this->MRP->LinkCustomAttributes = "";
        $this->MRP->HrefValue = "";
        $this->MRP->TooltipValue = "";

        // BILLYM
        $this->BILLYM->LinkCustomAttributes = "";
        $this->BILLYM->HrefValue = "";
        $this->BILLYM->TooltipValue = "";

        // BILLGRP
        $this->BILLGRP->LinkCustomAttributes = "";
        $this->BILLGRP->HrefValue = "";
        $this->BILLGRP->TooltipValue = "";

        // STAFF
        $this->STAFF->LinkCustomAttributes = "";
        $this->STAFF->HrefValue = "";
        $this->STAFF->TooltipValue = "";

        // TEMPIPNO
        $this->TEMPIPNO->LinkCustomAttributes = "";
        $this->TEMPIPNO->HrefValue = "";
        $this->TEMPIPNO->TooltipValue = "";

        // PRNTED
        $this->PRNTED->LinkCustomAttributes = "";
        $this->PRNTED->HrefValue = "";
        $this->PRNTED->TooltipValue = "";

        // PATNAME
        $this->PATNAME->LinkCustomAttributes = "";
        $this->PATNAME->HrefValue = "";
        $this->PATNAME->TooltipValue = "";

        // PJVNO
        $this->PJVNO->LinkCustomAttributes = "";
        $this->PJVNO->HrefValue = "";
        $this->PJVNO->TooltipValue = "";

        // PJVSLNO
        $this->PJVSLNO->LinkCustomAttributes = "";
        $this->PJVSLNO->HrefValue = "";
        $this->PJVSLNO->TooltipValue = "";

        // OTHDISC
        $this->OTHDISC->LinkCustomAttributes = "";
        $this->OTHDISC->HrefValue = "";
        $this->OTHDISC->TooltipValue = "";

        // PJVYM
        $this->PJVYM->LinkCustomAttributes = "";
        $this->PJVYM->HrefValue = "";
        $this->PJVYM->TooltipValue = "";

        // PURDISCPER
        $this->PURDISCPER->LinkCustomAttributes = "";
        $this->PURDISCPER->HrefValue = "";
        $this->PURDISCPER->TooltipValue = "";

        // CASHIER
        $this->CASHIER->LinkCustomAttributes = "";
        $this->CASHIER->HrefValue = "";
        $this->CASHIER->TooltipValue = "";

        // CASHTIME
        $this->CASHTIME->LinkCustomAttributes = "";
        $this->CASHTIME->HrefValue = "";
        $this->CASHTIME->TooltipValue = "";

        // CASHRECD
        $this->CASHRECD->LinkCustomAttributes = "";
        $this->CASHRECD->HrefValue = "";
        $this->CASHRECD->TooltipValue = "";

        // CASHREFNO
        $this->CASHREFNO->LinkCustomAttributes = "";
        $this->CASHREFNO->HrefValue = "";
        $this->CASHREFNO->TooltipValue = "";

        // CASHIERSHIFT
        $this->CASHIERSHIFT->LinkCustomAttributes = "";
        $this->CASHIERSHIFT->HrefValue = "";
        $this->CASHIERSHIFT->TooltipValue = "";

        // PRCODE
        $this->PRCODE->LinkCustomAttributes = "";
        $this->PRCODE->HrefValue = "";
        $this->PRCODE->TooltipValue = "";

        // RELEASEBY
        $this->RELEASEBY->LinkCustomAttributes = "";
        $this->RELEASEBY->HrefValue = "";
        $this->RELEASEBY->TooltipValue = "";

        // CRAUTHOR
        $this->CRAUTHOR->LinkCustomAttributes = "";
        $this->CRAUTHOR->HrefValue = "";
        $this->CRAUTHOR->TooltipValue = "";

        // PAYMENT
        $this->PAYMENT->LinkCustomAttributes = "";
        $this->PAYMENT->HrefValue = "";
        $this->PAYMENT->TooltipValue = "";

        // DRID
        $this->DRID->LinkCustomAttributes = "";
        $this->DRID->HrefValue = "";
        $this->DRID->TooltipValue = "";

        // WARD
        $this->WARD->LinkCustomAttributes = "";
        $this->WARD->HrefValue = "";
        $this->WARD->TooltipValue = "";

        // STAXTYPE
        $this->STAXTYPE->LinkCustomAttributes = "";
        $this->STAXTYPE->HrefValue = "";
        $this->STAXTYPE->TooltipValue = "";

        // PURDISCVAL
        $this->PURDISCVAL->LinkCustomAttributes = "";
        $this->PURDISCVAL->HrefValue = "";
        $this->PURDISCVAL->TooltipValue = "";

        // RNDOFF
        $this->RNDOFF->LinkCustomAttributes = "";
        $this->RNDOFF->HrefValue = "";
        $this->RNDOFF->TooltipValue = "";

        // DISCONMRP
        $this->DISCONMRP->LinkCustomAttributes = "";
        $this->DISCONMRP->HrefValue = "";
        $this->DISCONMRP->TooltipValue = "";

        // DELVDT
        $this->DELVDT->LinkCustomAttributes = "";
        $this->DELVDT->HrefValue = "";
        $this->DELVDT->TooltipValue = "";

        // DELVTIME
        $this->DELVTIME->LinkCustomAttributes = "";
        $this->DELVTIME->HrefValue = "";
        $this->DELVTIME->TooltipValue = "";

        // DELVBY
        $this->DELVBY->LinkCustomAttributes = "";
        $this->DELVBY->HrefValue = "";
        $this->DELVBY->TooltipValue = "";

        // HOSPNO
        $this->HOSPNO->LinkCustomAttributes = "";
        $this->HOSPNO->HrefValue = "";
        $this->HOSPNO->TooltipValue = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // pbv
        $this->pbv->LinkCustomAttributes = "";
        $this->pbv->HrefValue = "";
        $this->pbv->TooltipValue = "";

        // pbt
        $this->pbt->LinkCustomAttributes = "";
        $this->pbt->HrefValue = "";
        $this->pbt->TooltipValue = "";

        // SiNo
        $this->SiNo->LinkCustomAttributes = "";
        $this->SiNo->HrefValue = "";
        $this->SiNo->TooltipValue = "";

        // Product
        $this->Product->LinkCustomAttributes = "";
        $this->Product->HrefValue = "";
        $this->Product->TooltipValue = "";

        // Mfg
        $this->Mfg->LinkCustomAttributes = "";
        $this->Mfg->HrefValue = "";
        $this->Mfg->TooltipValue = "";

        // HosoID
        $this->HosoID->LinkCustomAttributes = "";
        $this->HosoID->HrefValue = "";
        $this->HosoID->TooltipValue = "";

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

        // MFRCODE
        $this->MFRCODE->LinkCustomAttributes = "";
        $this->MFRCODE->HrefValue = "";
        $this->MFRCODE->TooltipValue = "";

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

        // BRNAME
        $this->BRNAME->LinkCustomAttributes = "";
        $this->BRNAME->HrefValue = "";
        $this->BRNAME->TooltipValue = "";

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

        // BRCODE
        $this->BRCODE->EditAttrs["class"] = "form-control";
        $this->BRCODE->EditCustomAttributes = "";
        $this->BRCODE->EditValue = $this->BRCODE->CurrentValue;
        $this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

        // TYPE
        $this->TYPE->EditAttrs["class"] = "form-control";
        $this->TYPE->EditCustomAttributes = "";
        if (!$this->TYPE->Raw) {
            $this->TYPE->CurrentValue = HtmlDecode($this->TYPE->CurrentValue);
        }
        $this->TYPE->EditValue = $this->TYPE->CurrentValue;
        $this->TYPE->PlaceHolder = RemoveHtml($this->TYPE->caption());

        // DN
        $this->DN->EditAttrs["class"] = "form-control";
        $this->DN->EditCustomAttributes = "";
        if (!$this->DN->Raw) {
            $this->DN->CurrentValue = HtmlDecode($this->DN->CurrentValue);
        }
        $this->DN->EditValue = $this->DN->CurrentValue;
        $this->DN->PlaceHolder = RemoveHtml($this->DN->caption());

        // RDN
        $this->RDN->EditAttrs["class"] = "form-control";
        $this->RDN->EditCustomAttributes = "";
        if (!$this->RDN->Raw) {
            $this->RDN->CurrentValue = HtmlDecode($this->RDN->CurrentValue);
        }
        $this->RDN->EditValue = $this->RDN->CurrentValue;
        $this->RDN->PlaceHolder = RemoveHtml($this->RDN->caption());

        // DT
        $this->DT->EditAttrs["class"] = "form-control";
        $this->DT->EditCustomAttributes = "";
        $this->DT->EditValue = FormatDateTime($this->DT->CurrentValue, 8);
        $this->DT->PlaceHolder = RemoveHtml($this->DT->caption());

        // PRC
        $this->PRC->EditAttrs["class"] = "form-control";
        $this->PRC->EditCustomAttributes = "";
        if (!$this->PRC->Raw) {
            $this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
        }
        $this->PRC->EditValue = $this->PRC->CurrentValue;
        $this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

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

        // BATCHNO
        $this->BATCHNO->EditAttrs["class"] = "form-control";
        $this->BATCHNO->EditCustomAttributes = "";
        if (!$this->BATCHNO->Raw) {
            $this->BATCHNO->CurrentValue = HtmlDecode($this->BATCHNO->CurrentValue);
        }
        $this->BATCHNO->EditValue = $this->BATCHNO->CurrentValue;
        $this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

        // EXPDT
        $this->EXPDT->EditAttrs["class"] = "form-control";
        $this->EXPDT->EditCustomAttributes = "";
        $this->EXPDT->EditValue = FormatDateTime($this->EXPDT->CurrentValue, 8);
        $this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());

        // BILLNO
        $this->BILLNO->EditAttrs["class"] = "form-control";
        $this->BILLNO->EditCustomAttributes = "";
        if (!$this->BILLNO->Raw) {
            $this->BILLNO->CurrentValue = HtmlDecode($this->BILLNO->CurrentValue);
        }
        $this->BILLNO->EditValue = $this->BILLNO->CurrentValue;
        $this->BILLNO->PlaceHolder = RemoveHtml($this->BILLNO->caption());

        // BILLDT
        $this->BILLDT->EditAttrs["class"] = "form-control";
        $this->BILLDT->EditCustomAttributes = "";
        $this->BILLDT->EditValue = FormatDateTime($this->BILLDT->CurrentValue, 8);
        $this->BILLDT->PlaceHolder = RemoveHtml($this->BILLDT->caption());

        // RT
        $this->RT->EditAttrs["class"] = "form-control";
        $this->RT->EditCustomAttributes = "";
        $this->RT->EditValue = $this->RT->CurrentValue;
        $this->RT->PlaceHolder = RemoveHtml($this->RT->caption());
        if (strval($this->RT->EditValue) != "" && is_numeric($this->RT->EditValue)) {
            $this->RT->EditValue = FormatNumber($this->RT->EditValue, -2, -2, -2, -2);
        }

        // VALUE
        $this->VALUE->EditAttrs["class"] = "form-control";
        $this->VALUE->EditCustomAttributes = "";
        $this->VALUE->EditValue = $this->VALUE->CurrentValue;
        $this->VALUE->PlaceHolder = RemoveHtml($this->VALUE->caption());
        if (strval($this->VALUE->EditValue) != "" && is_numeric($this->VALUE->EditValue)) {
            $this->VALUE->EditValue = FormatNumber($this->VALUE->EditValue, -2, -2, -2, -2);
        }

        // DISC
        $this->DISC->EditAttrs["class"] = "form-control";
        $this->DISC->EditCustomAttributes = "";
        $this->DISC->EditValue = $this->DISC->CurrentValue;
        $this->DISC->PlaceHolder = RemoveHtml($this->DISC->caption());
        if (strval($this->DISC->EditValue) != "" && is_numeric($this->DISC->EditValue)) {
            $this->DISC->EditValue = FormatNumber($this->DISC->EditValue, -2, -2, -2, -2);
        }

        // TAXP
        $this->TAXP->EditAttrs["class"] = "form-control";
        $this->TAXP->EditCustomAttributes = "";
        $this->TAXP->EditValue = $this->TAXP->CurrentValue;
        $this->TAXP->PlaceHolder = RemoveHtml($this->TAXP->caption());
        if (strval($this->TAXP->EditValue) != "" && is_numeric($this->TAXP->EditValue)) {
            $this->TAXP->EditValue = FormatNumber($this->TAXP->EditValue, -2, -2, -2, -2);
        }

        // TAX
        $this->TAX->EditAttrs["class"] = "form-control";
        $this->TAX->EditCustomAttributes = "";
        $this->TAX->EditValue = $this->TAX->CurrentValue;
        $this->TAX->PlaceHolder = RemoveHtml($this->TAX->caption());
        if (strval($this->TAX->EditValue) != "" && is_numeric($this->TAX->EditValue)) {
            $this->TAX->EditValue = FormatNumber($this->TAX->EditValue, -2, -2, -2, -2);
        }

        // TAXR
        $this->TAXR->EditAttrs["class"] = "form-control";
        $this->TAXR->EditCustomAttributes = "";
        $this->TAXR->EditValue = $this->TAXR->CurrentValue;
        $this->TAXR->PlaceHolder = RemoveHtml($this->TAXR->caption());
        if (strval($this->TAXR->EditValue) != "" && is_numeric($this->TAXR->EditValue)) {
            $this->TAXR->EditValue = FormatNumber($this->TAXR->EditValue, -2, -2, -2, -2);
        }

        // DAMT
        $this->DAMT->EditAttrs["class"] = "form-control";
        $this->DAMT->EditCustomAttributes = "";
        $this->DAMT->EditValue = $this->DAMT->CurrentValue;
        $this->DAMT->PlaceHolder = RemoveHtml($this->DAMT->caption());
        if (strval($this->DAMT->EditValue) != "" && is_numeric($this->DAMT->EditValue)) {
            $this->DAMT->EditValue = FormatNumber($this->DAMT->EditValue, -2, -2, -2, -2);
        }

        // EMPNO
        $this->EMPNO->EditAttrs["class"] = "form-control";
        $this->EMPNO->EditCustomAttributes = "";
        if (!$this->EMPNO->Raw) {
            $this->EMPNO->CurrentValue = HtmlDecode($this->EMPNO->CurrentValue);
        }
        $this->EMPNO->EditValue = $this->EMPNO->CurrentValue;
        $this->EMPNO->PlaceHolder = RemoveHtml($this->EMPNO->caption());

        // PC
        $this->PC->EditAttrs["class"] = "form-control";
        $this->PC->EditCustomAttributes = "";
        if (!$this->PC->Raw) {
            $this->PC->CurrentValue = HtmlDecode($this->PC->CurrentValue);
        }
        $this->PC->EditValue = $this->PC->CurrentValue;
        $this->PC->PlaceHolder = RemoveHtml($this->PC->caption());

        // DRNAME
        $this->DRNAME->EditAttrs["class"] = "form-control";
        $this->DRNAME->EditCustomAttributes = "";
        if (!$this->DRNAME->Raw) {
            $this->DRNAME->CurrentValue = HtmlDecode($this->DRNAME->CurrentValue);
        }
        $this->DRNAME->EditValue = $this->DRNAME->CurrentValue;
        $this->DRNAME->PlaceHolder = RemoveHtml($this->DRNAME->caption());

        // BTIME
        $this->BTIME->EditAttrs["class"] = "form-control";
        $this->BTIME->EditCustomAttributes = "";
        if (!$this->BTIME->Raw) {
            $this->BTIME->CurrentValue = HtmlDecode($this->BTIME->CurrentValue);
        }
        $this->BTIME->EditValue = $this->BTIME->CurrentValue;
        $this->BTIME->PlaceHolder = RemoveHtml($this->BTIME->caption());

        // ONO
        $this->ONO->EditAttrs["class"] = "form-control";
        $this->ONO->EditCustomAttributes = "";
        if (!$this->ONO->Raw) {
            $this->ONO->CurrentValue = HtmlDecode($this->ONO->CurrentValue);
        }
        $this->ONO->EditValue = $this->ONO->CurrentValue;
        $this->ONO->PlaceHolder = RemoveHtml($this->ONO->caption());

        // ODT
        $this->ODT->EditAttrs["class"] = "form-control";
        $this->ODT->EditCustomAttributes = "";
        $this->ODT->EditValue = FormatDateTime($this->ODT->CurrentValue, 8);
        $this->ODT->PlaceHolder = RemoveHtml($this->ODT->caption());

        // PURRT
        $this->PURRT->EditAttrs["class"] = "form-control";
        $this->PURRT->EditCustomAttributes = "";
        $this->PURRT->EditValue = $this->PURRT->CurrentValue;
        $this->PURRT->PlaceHolder = RemoveHtml($this->PURRT->caption());
        if (strval($this->PURRT->EditValue) != "" && is_numeric($this->PURRT->EditValue)) {
            $this->PURRT->EditValue = FormatNumber($this->PURRT->EditValue, -2, -2, -2, -2);
        }

        // GRP
        $this->GRP->EditAttrs["class"] = "form-control";
        $this->GRP->EditCustomAttributes = "";
        if (!$this->GRP->Raw) {
            $this->GRP->CurrentValue = HtmlDecode($this->GRP->CurrentValue);
        }
        $this->GRP->EditValue = $this->GRP->CurrentValue;
        $this->GRP->PlaceHolder = RemoveHtml($this->GRP->caption());

        // IBATCH
        $this->IBATCH->EditAttrs["class"] = "form-control";
        $this->IBATCH->EditCustomAttributes = "";
        if (!$this->IBATCH->Raw) {
            $this->IBATCH->CurrentValue = HtmlDecode($this->IBATCH->CurrentValue);
        }
        $this->IBATCH->EditValue = $this->IBATCH->CurrentValue;
        $this->IBATCH->PlaceHolder = RemoveHtml($this->IBATCH->caption());

        // IPNO
        $this->IPNO->EditAttrs["class"] = "form-control";
        $this->IPNO->EditCustomAttributes = "";
        if (!$this->IPNO->Raw) {
            $this->IPNO->CurrentValue = HtmlDecode($this->IPNO->CurrentValue);
        }
        $this->IPNO->EditValue = $this->IPNO->CurrentValue;
        $this->IPNO->PlaceHolder = RemoveHtml($this->IPNO->caption());

        // OPNO
        $this->OPNO->EditAttrs["class"] = "form-control";
        $this->OPNO->EditCustomAttributes = "";
        if (!$this->OPNO->Raw) {
            $this->OPNO->CurrentValue = HtmlDecode($this->OPNO->CurrentValue);
        }
        $this->OPNO->EditValue = $this->OPNO->CurrentValue;
        $this->OPNO->PlaceHolder = RemoveHtml($this->OPNO->caption());

        // RECID
        $this->RECID->EditAttrs["class"] = "form-control";
        $this->RECID->EditCustomAttributes = "";
        if (!$this->RECID->Raw) {
            $this->RECID->CurrentValue = HtmlDecode($this->RECID->CurrentValue);
        }
        $this->RECID->EditValue = $this->RECID->CurrentValue;
        $this->RECID->PlaceHolder = RemoveHtml($this->RECID->caption());

        // FQTY
        $this->FQTY->EditAttrs["class"] = "form-control";
        $this->FQTY->EditCustomAttributes = "";
        $this->FQTY->EditValue = $this->FQTY->CurrentValue;
        $this->FQTY->PlaceHolder = RemoveHtml($this->FQTY->caption());
        if (strval($this->FQTY->EditValue) != "" && is_numeric($this->FQTY->EditValue)) {
            $this->FQTY->EditValue = FormatNumber($this->FQTY->EditValue, -2, -2, -2, -2);
        }

        // UR
        $this->UR->EditAttrs["class"] = "form-control";
        $this->UR->EditCustomAttributes = "";
        $this->UR->EditValue = $this->UR->CurrentValue;
        $this->UR->PlaceHolder = RemoveHtml($this->UR->caption());
        if (strval($this->UR->EditValue) != "" && is_numeric($this->UR->EditValue)) {
            $this->UR->EditValue = FormatNumber($this->UR->EditValue, -2, -2, -2, -2);
        }

        // DCID
        $this->DCID->EditAttrs["class"] = "form-control";
        $this->DCID->EditCustomAttributes = "";
        if (!$this->DCID->Raw) {
            $this->DCID->CurrentValue = HtmlDecode($this->DCID->CurrentValue);
        }
        $this->DCID->EditValue = $this->DCID->CurrentValue;
        $this->DCID->PlaceHolder = RemoveHtml($this->DCID->caption());

        // USERID
        $this->_USERID->EditAttrs["class"] = "form-control";
        $this->_USERID->EditCustomAttributes = "";
        if (!$this->_USERID->Raw) {
            $this->_USERID->CurrentValue = HtmlDecode($this->_USERID->CurrentValue);
        }
        $this->_USERID->EditValue = $this->_USERID->CurrentValue;
        $this->_USERID->PlaceHolder = RemoveHtml($this->_USERID->caption());

        // MODDT
        $this->MODDT->EditAttrs["class"] = "form-control";
        $this->MODDT->EditCustomAttributes = "";
        $this->MODDT->EditValue = FormatDateTime($this->MODDT->CurrentValue, 8);
        $this->MODDT->PlaceHolder = RemoveHtml($this->MODDT->caption());

        // FYM
        $this->FYM->EditAttrs["class"] = "form-control";
        $this->FYM->EditCustomAttributes = "";
        if (!$this->FYM->Raw) {
            $this->FYM->CurrentValue = HtmlDecode($this->FYM->CurrentValue);
        }
        $this->FYM->EditValue = $this->FYM->CurrentValue;
        $this->FYM->PlaceHolder = RemoveHtml($this->FYM->caption());

        // PRCBATCH
        $this->PRCBATCH->EditAttrs["class"] = "form-control";
        $this->PRCBATCH->EditCustomAttributes = "";
        if (!$this->PRCBATCH->Raw) {
            $this->PRCBATCH->CurrentValue = HtmlDecode($this->PRCBATCH->CurrentValue);
        }
        $this->PRCBATCH->EditValue = $this->PRCBATCH->CurrentValue;
        $this->PRCBATCH->PlaceHolder = RemoveHtml($this->PRCBATCH->caption());

        // SLNO
        $this->SLNO->EditAttrs["class"] = "form-control";
        $this->SLNO->EditCustomAttributes = "";
        $this->SLNO->EditValue = $this->SLNO->CurrentValue;
        $this->SLNO->PlaceHolder = RemoveHtml($this->SLNO->caption());

        // MRP
        $this->MRP->EditAttrs["class"] = "form-control";
        $this->MRP->EditCustomAttributes = "";
        $this->MRP->EditValue = $this->MRP->CurrentValue;
        $this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());
        if (strval($this->MRP->EditValue) != "" && is_numeric($this->MRP->EditValue)) {
            $this->MRP->EditValue = FormatNumber($this->MRP->EditValue, -2, -2, -2, -2);
        }

        // BILLYM
        $this->BILLYM->EditAttrs["class"] = "form-control";
        $this->BILLYM->EditCustomAttributes = "";
        if (!$this->BILLYM->Raw) {
            $this->BILLYM->CurrentValue = HtmlDecode($this->BILLYM->CurrentValue);
        }
        $this->BILLYM->EditValue = $this->BILLYM->CurrentValue;
        $this->BILLYM->PlaceHolder = RemoveHtml($this->BILLYM->caption());

        // BILLGRP
        $this->BILLGRP->EditAttrs["class"] = "form-control";
        $this->BILLGRP->EditCustomAttributes = "";
        if (!$this->BILLGRP->Raw) {
            $this->BILLGRP->CurrentValue = HtmlDecode($this->BILLGRP->CurrentValue);
        }
        $this->BILLGRP->EditValue = $this->BILLGRP->CurrentValue;
        $this->BILLGRP->PlaceHolder = RemoveHtml($this->BILLGRP->caption());

        // STAFF
        $this->STAFF->EditAttrs["class"] = "form-control";
        $this->STAFF->EditCustomAttributes = "";
        if (!$this->STAFF->Raw) {
            $this->STAFF->CurrentValue = HtmlDecode($this->STAFF->CurrentValue);
        }
        $this->STAFF->EditValue = $this->STAFF->CurrentValue;
        $this->STAFF->PlaceHolder = RemoveHtml($this->STAFF->caption());

        // TEMPIPNO
        $this->TEMPIPNO->EditAttrs["class"] = "form-control";
        $this->TEMPIPNO->EditCustomAttributes = "";
        if (!$this->TEMPIPNO->Raw) {
            $this->TEMPIPNO->CurrentValue = HtmlDecode($this->TEMPIPNO->CurrentValue);
        }
        $this->TEMPIPNO->EditValue = $this->TEMPIPNO->CurrentValue;
        $this->TEMPIPNO->PlaceHolder = RemoveHtml($this->TEMPIPNO->caption());

        // PRNTED
        $this->PRNTED->EditAttrs["class"] = "form-control";
        $this->PRNTED->EditCustomAttributes = "";
        if (!$this->PRNTED->Raw) {
            $this->PRNTED->CurrentValue = HtmlDecode($this->PRNTED->CurrentValue);
        }
        $this->PRNTED->EditValue = $this->PRNTED->CurrentValue;
        $this->PRNTED->PlaceHolder = RemoveHtml($this->PRNTED->caption());

        // PATNAME
        $this->PATNAME->EditAttrs["class"] = "form-control";
        $this->PATNAME->EditCustomAttributes = "";
        if (!$this->PATNAME->Raw) {
            $this->PATNAME->CurrentValue = HtmlDecode($this->PATNAME->CurrentValue);
        }
        $this->PATNAME->EditValue = $this->PATNAME->CurrentValue;
        $this->PATNAME->PlaceHolder = RemoveHtml($this->PATNAME->caption());

        // PJVNO
        $this->PJVNO->EditAttrs["class"] = "form-control";
        $this->PJVNO->EditCustomAttributes = "";
        if (!$this->PJVNO->Raw) {
            $this->PJVNO->CurrentValue = HtmlDecode($this->PJVNO->CurrentValue);
        }
        $this->PJVNO->EditValue = $this->PJVNO->CurrentValue;
        $this->PJVNO->PlaceHolder = RemoveHtml($this->PJVNO->caption());

        // PJVSLNO
        $this->PJVSLNO->EditAttrs["class"] = "form-control";
        $this->PJVSLNO->EditCustomAttributes = "";
        if (!$this->PJVSLNO->Raw) {
            $this->PJVSLNO->CurrentValue = HtmlDecode($this->PJVSLNO->CurrentValue);
        }
        $this->PJVSLNO->EditValue = $this->PJVSLNO->CurrentValue;
        $this->PJVSLNO->PlaceHolder = RemoveHtml($this->PJVSLNO->caption());

        // OTHDISC
        $this->OTHDISC->EditAttrs["class"] = "form-control";
        $this->OTHDISC->EditCustomAttributes = "";
        $this->OTHDISC->EditValue = $this->OTHDISC->CurrentValue;
        $this->OTHDISC->PlaceHolder = RemoveHtml($this->OTHDISC->caption());
        if (strval($this->OTHDISC->EditValue) != "" && is_numeric($this->OTHDISC->EditValue)) {
            $this->OTHDISC->EditValue = FormatNumber($this->OTHDISC->EditValue, -2, -2, -2, -2);
        }

        // PJVYM
        $this->PJVYM->EditAttrs["class"] = "form-control";
        $this->PJVYM->EditCustomAttributes = "";
        if (!$this->PJVYM->Raw) {
            $this->PJVYM->CurrentValue = HtmlDecode($this->PJVYM->CurrentValue);
        }
        $this->PJVYM->EditValue = $this->PJVYM->CurrentValue;
        $this->PJVYM->PlaceHolder = RemoveHtml($this->PJVYM->caption());

        // PURDISCPER
        $this->PURDISCPER->EditAttrs["class"] = "form-control";
        $this->PURDISCPER->EditCustomAttributes = "";
        $this->PURDISCPER->EditValue = $this->PURDISCPER->CurrentValue;
        $this->PURDISCPER->PlaceHolder = RemoveHtml($this->PURDISCPER->caption());
        if (strval($this->PURDISCPER->EditValue) != "" && is_numeric($this->PURDISCPER->EditValue)) {
            $this->PURDISCPER->EditValue = FormatNumber($this->PURDISCPER->EditValue, -2, -2, -2, -2);
        }

        // CASHIER
        $this->CASHIER->EditAttrs["class"] = "form-control";
        $this->CASHIER->EditCustomAttributes = "";
        if (!$this->CASHIER->Raw) {
            $this->CASHIER->CurrentValue = HtmlDecode($this->CASHIER->CurrentValue);
        }
        $this->CASHIER->EditValue = $this->CASHIER->CurrentValue;
        $this->CASHIER->PlaceHolder = RemoveHtml($this->CASHIER->caption());

        // CASHTIME
        $this->CASHTIME->EditAttrs["class"] = "form-control";
        $this->CASHTIME->EditCustomAttributes = "";
        if (!$this->CASHTIME->Raw) {
            $this->CASHTIME->CurrentValue = HtmlDecode($this->CASHTIME->CurrentValue);
        }
        $this->CASHTIME->EditValue = $this->CASHTIME->CurrentValue;
        $this->CASHTIME->PlaceHolder = RemoveHtml($this->CASHTIME->caption());

        // CASHRECD
        $this->CASHRECD->EditAttrs["class"] = "form-control";
        $this->CASHRECD->EditCustomAttributes = "";
        $this->CASHRECD->EditValue = $this->CASHRECD->CurrentValue;
        $this->CASHRECD->PlaceHolder = RemoveHtml($this->CASHRECD->caption());
        if (strval($this->CASHRECD->EditValue) != "" && is_numeric($this->CASHRECD->EditValue)) {
            $this->CASHRECD->EditValue = FormatNumber($this->CASHRECD->EditValue, -2, -2, -2, -2);
        }

        // CASHREFNO
        $this->CASHREFNO->EditAttrs["class"] = "form-control";
        $this->CASHREFNO->EditCustomAttributes = "";
        if (!$this->CASHREFNO->Raw) {
            $this->CASHREFNO->CurrentValue = HtmlDecode($this->CASHREFNO->CurrentValue);
        }
        $this->CASHREFNO->EditValue = $this->CASHREFNO->CurrentValue;
        $this->CASHREFNO->PlaceHolder = RemoveHtml($this->CASHREFNO->caption());

        // CASHIERSHIFT
        $this->CASHIERSHIFT->EditAttrs["class"] = "form-control";
        $this->CASHIERSHIFT->EditCustomAttributes = "";
        if (!$this->CASHIERSHIFT->Raw) {
            $this->CASHIERSHIFT->CurrentValue = HtmlDecode($this->CASHIERSHIFT->CurrentValue);
        }
        $this->CASHIERSHIFT->EditValue = $this->CASHIERSHIFT->CurrentValue;
        $this->CASHIERSHIFT->PlaceHolder = RemoveHtml($this->CASHIERSHIFT->caption());

        // PRCODE
        $this->PRCODE->EditAttrs["class"] = "form-control";
        $this->PRCODE->EditCustomAttributes = "";
        if (!$this->PRCODE->Raw) {
            $this->PRCODE->CurrentValue = HtmlDecode($this->PRCODE->CurrentValue);
        }
        $this->PRCODE->EditValue = $this->PRCODE->CurrentValue;
        $this->PRCODE->PlaceHolder = RemoveHtml($this->PRCODE->caption());

        // RELEASEBY
        $this->RELEASEBY->EditAttrs["class"] = "form-control";
        $this->RELEASEBY->EditCustomAttributes = "";
        if (!$this->RELEASEBY->Raw) {
            $this->RELEASEBY->CurrentValue = HtmlDecode($this->RELEASEBY->CurrentValue);
        }
        $this->RELEASEBY->EditValue = $this->RELEASEBY->CurrentValue;
        $this->RELEASEBY->PlaceHolder = RemoveHtml($this->RELEASEBY->caption());

        // CRAUTHOR
        $this->CRAUTHOR->EditAttrs["class"] = "form-control";
        $this->CRAUTHOR->EditCustomAttributes = "";
        if (!$this->CRAUTHOR->Raw) {
            $this->CRAUTHOR->CurrentValue = HtmlDecode($this->CRAUTHOR->CurrentValue);
        }
        $this->CRAUTHOR->EditValue = $this->CRAUTHOR->CurrentValue;
        $this->CRAUTHOR->PlaceHolder = RemoveHtml($this->CRAUTHOR->caption());

        // PAYMENT
        $this->PAYMENT->EditAttrs["class"] = "form-control";
        $this->PAYMENT->EditCustomAttributes = "";
        if (!$this->PAYMENT->Raw) {
            $this->PAYMENT->CurrentValue = HtmlDecode($this->PAYMENT->CurrentValue);
        }
        $this->PAYMENT->EditValue = $this->PAYMENT->CurrentValue;
        $this->PAYMENT->PlaceHolder = RemoveHtml($this->PAYMENT->caption());

        // DRID
        $this->DRID->EditAttrs["class"] = "form-control";
        $this->DRID->EditCustomAttributes = "";
        if (!$this->DRID->Raw) {
            $this->DRID->CurrentValue = HtmlDecode($this->DRID->CurrentValue);
        }
        $this->DRID->EditValue = $this->DRID->CurrentValue;
        $this->DRID->PlaceHolder = RemoveHtml($this->DRID->caption());

        // WARD
        $this->WARD->EditAttrs["class"] = "form-control";
        $this->WARD->EditCustomAttributes = "";
        if (!$this->WARD->Raw) {
            $this->WARD->CurrentValue = HtmlDecode($this->WARD->CurrentValue);
        }
        $this->WARD->EditValue = $this->WARD->CurrentValue;
        $this->WARD->PlaceHolder = RemoveHtml($this->WARD->caption());

        // STAXTYPE
        $this->STAXTYPE->EditAttrs["class"] = "form-control";
        $this->STAXTYPE->EditCustomAttributes = "";
        if (!$this->STAXTYPE->Raw) {
            $this->STAXTYPE->CurrentValue = HtmlDecode($this->STAXTYPE->CurrentValue);
        }
        $this->STAXTYPE->EditValue = $this->STAXTYPE->CurrentValue;
        $this->STAXTYPE->PlaceHolder = RemoveHtml($this->STAXTYPE->caption());

        // PURDISCVAL
        $this->PURDISCVAL->EditAttrs["class"] = "form-control";
        $this->PURDISCVAL->EditCustomAttributes = "";
        $this->PURDISCVAL->EditValue = $this->PURDISCVAL->CurrentValue;
        $this->PURDISCVAL->PlaceHolder = RemoveHtml($this->PURDISCVAL->caption());
        if (strval($this->PURDISCVAL->EditValue) != "" && is_numeric($this->PURDISCVAL->EditValue)) {
            $this->PURDISCVAL->EditValue = FormatNumber($this->PURDISCVAL->EditValue, -2, -2, -2, -2);
        }

        // RNDOFF
        $this->RNDOFF->EditAttrs["class"] = "form-control";
        $this->RNDOFF->EditCustomAttributes = "";
        $this->RNDOFF->EditValue = $this->RNDOFF->CurrentValue;
        $this->RNDOFF->PlaceHolder = RemoveHtml($this->RNDOFF->caption());
        if (strval($this->RNDOFF->EditValue) != "" && is_numeric($this->RNDOFF->EditValue)) {
            $this->RNDOFF->EditValue = FormatNumber($this->RNDOFF->EditValue, -2, -2, -2, -2);
        }

        // DISCONMRP
        $this->DISCONMRP->EditAttrs["class"] = "form-control";
        $this->DISCONMRP->EditCustomAttributes = "";
        $this->DISCONMRP->EditValue = $this->DISCONMRP->CurrentValue;
        $this->DISCONMRP->PlaceHolder = RemoveHtml($this->DISCONMRP->caption());
        if (strval($this->DISCONMRP->EditValue) != "" && is_numeric($this->DISCONMRP->EditValue)) {
            $this->DISCONMRP->EditValue = FormatNumber($this->DISCONMRP->EditValue, -2, -2, -2, -2);
        }

        // DELVDT
        $this->DELVDT->EditAttrs["class"] = "form-control";
        $this->DELVDT->EditCustomAttributes = "";
        $this->DELVDT->EditValue = FormatDateTime($this->DELVDT->CurrentValue, 8);
        $this->DELVDT->PlaceHolder = RemoveHtml($this->DELVDT->caption());

        // DELVTIME
        $this->DELVTIME->EditAttrs["class"] = "form-control";
        $this->DELVTIME->EditCustomAttributes = "";
        if (!$this->DELVTIME->Raw) {
            $this->DELVTIME->CurrentValue = HtmlDecode($this->DELVTIME->CurrentValue);
        }
        $this->DELVTIME->EditValue = $this->DELVTIME->CurrentValue;
        $this->DELVTIME->PlaceHolder = RemoveHtml($this->DELVTIME->caption());

        // DELVBY
        $this->DELVBY->EditAttrs["class"] = "form-control";
        $this->DELVBY->EditCustomAttributes = "";
        if (!$this->DELVBY->Raw) {
            $this->DELVBY->CurrentValue = HtmlDecode($this->DELVBY->CurrentValue);
        }
        $this->DELVBY->EditValue = $this->DELVBY->CurrentValue;
        $this->DELVBY->PlaceHolder = RemoveHtml($this->DELVBY->caption());

        // HOSPNO
        $this->HOSPNO->EditAttrs["class"] = "form-control";
        $this->HOSPNO->EditCustomAttributes = "";
        if (!$this->HOSPNO->Raw) {
            $this->HOSPNO->CurrentValue = HtmlDecode($this->HOSPNO->CurrentValue);
        }
        $this->HOSPNO->EditValue = $this->HOSPNO->CurrentValue;
        $this->HOSPNO->PlaceHolder = RemoveHtml($this->HOSPNO->caption());

        // id
        $this->id->EditAttrs["class"] = "form-control";
        $this->id->EditCustomAttributes = "";
        $this->id->EditValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // pbv
        $this->pbv->EditAttrs["class"] = "form-control";
        $this->pbv->EditCustomAttributes = "";
        $this->pbv->EditValue = $this->pbv->CurrentValue;
        $this->pbv->PlaceHolder = RemoveHtml($this->pbv->caption());

        // pbt
        $this->pbt->EditAttrs["class"] = "form-control";
        $this->pbt->EditCustomAttributes = "";
        $this->pbt->EditValue = $this->pbt->CurrentValue;
        $this->pbt->PlaceHolder = RemoveHtml($this->pbt->caption());

        // SiNo
        $this->SiNo->EditAttrs["class"] = "form-control";
        $this->SiNo->EditCustomAttributes = "";
        $this->SiNo->EditValue = $this->SiNo->CurrentValue;
        $this->SiNo->PlaceHolder = RemoveHtml($this->SiNo->caption());

        // Product
        $this->Product->EditAttrs["class"] = "form-control";
        $this->Product->EditCustomAttributes = "";
        if (!$this->Product->Raw) {
            $this->Product->CurrentValue = HtmlDecode($this->Product->CurrentValue);
        }
        $this->Product->EditValue = $this->Product->CurrentValue;
        $this->Product->PlaceHolder = RemoveHtml($this->Product->caption());

        // Mfg
        $this->Mfg->EditAttrs["class"] = "form-control";
        $this->Mfg->EditCustomAttributes = "";
        if (!$this->Mfg->Raw) {
            $this->Mfg->CurrentValue = HtmlDecode($this->Mfg->CurrentValue);
        }
        $this->Mfg->EditValue = $this->Mfg->CurrentValue;
        $this->Mfg->PlaceHolder = RemoveHtml($this->Mfg->caption());

        // HosoID
        $this->HosoID->EditAttrs["class"] = "form-control";
        $this->HosoID->EditCustomAttributes = "";
        $this->HosoID->EditValue = $this->HosoID->CurrentValue;
        $this->HosoID->PlaceHolder = RemoveHtml($this->HosoID->caption());

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

        // MFRCODE
        $this->MFRCODE->EditAttrs["class"] = "form-control";
        $this->MFRCODE->EditCustomAttributes = "";
        if (!$this->MFRCODE->Raw) {
            $this->MFRCODE->CurrentValue = HtmlDecode($this->MFRCODE->CurrentValue);
        }
        $this->MFRCODE->EditValue = $this->MFRCODE->CurrentValue;
        $this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

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

        // BRNAME
        $this->BRNAME->EditAttrs["class"] = "form-control";
        $this->BRNAME->EditCustomAttributes = "";
        if (!$this->BRNAME->Raw) {
            $this->BRNAME->CurrentValue = HtmlDecode($this->BRNAME->CurrentValue);
        }
        $this->BRNAME->EditValue = $this->BRNAME->CurrentValue;
        $this->BRNAME->PlaceHolder = RemoveHtml($this->BRNAME->caption());

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
                    $doc->exportCaption($this->BRCODE);
                    $doc->exportCaption($this->TYPE);
                    $doc->exportCaption($this->DN);
                    $doc->exportCaption($this->RDN);
                    $doc->exportCaption($this->DT);
                    $doc->exportCaption($this->PRC);
                    $doc->exportCaption($this->OQ);
                    $doc->exportCaption($this->RQ);
                    $doc->exportCaption($this->MRQ);
                    $doc->exportCaption($this->IQ);
                    $doc->exportCaption($this->BATCHNO);
                    $doc->exportCaption($this->EXPDT);
                    $doc->exportCaption($this->BILLNO);
                    $doc->exportCaption($this->BILLDT);
                    $doc->exportCaption($this->RT);
                    $doc->exportCaption($this->VALUE);
                    $doc->exportCaption($this->DISC);
                    $doc->exportCaption($this->TAXP);
                    $doc->exportCaption($this->TAX);
                    $doc->exportCaption($this->TAXR);
                    $doc->exportCaption($this->DAMT);
                    $doc->exportCaption($this->EMPNO);
                    $doc->exportCaption($this->PC);
                    $doc->exportCaption($this->DRNAME);
                    $doc->exportCaption($this->BTIME);
                    $doc->exportCaption($this->ONO);
                    $doc->exportCaption($this->ODT);
                    $doc->exportCaption($this->PURRT);
                    $doc->exportCaption($this->GRP);
                    $doc->exportCaption($this->IBATCH);
                    $doc->exportCaption($this->IPNO);
                    $doc->exportCaption($this->OPNO);
                    $doc->exportCaption($this->RECID);
                    $doc->exportCaption($this->FQTY);
                    $doc->exportCaption($this->UR);
                    $doc->exportCaption($this->DCID);
                    $doc->exportCaption($this->_USERID);
                    $doc->exportCaption($this->MODDT);
                    $doc->exportCaption($this->FYM);
                    $doc->exportCaption($this->PRCBATCH);
                    $doc->exportCaption($this->SLNO);
                    $doc->exportCaption($this->MRP);
                    $doc->exportCaption($this->BILLYM);
                    $doc->exportCaption($this->BILLGRP);
                    $doc->exportCaption($this->STAFF);
                    $doc->exportCaption($this->TEMPIPNO);
                    $doc->exportCaption($this->PRNTED);
                    $doc->exportCaption($this->PATNAME);
                    $doc->exportCaption($this->PJVNO);
                    $doc->exportCaption($this->PJVSLNO);
                    $doc->exportCaption($this->OTHDISC);
                    $doc->exportCaption($this->PJVYM);
                    $doc->exportCaption($this->PURDISCPER);
                    $doc->exportCaption($this->CASHIER);
                    $doc->exportCaption($this->CASHTIME);
                    $doc->exportCaption($this->CASHRECD);
                    $doc->exportCaption($this->CASHREFNO);
                    $doc->exportCaption($this->CASHIERSHIFT);
                    $doc->exportCaption($this->PRCODE);
                    $doc->exportCaption($this->RELEASEBY);
                    $doc->exportCaption($this->CRAUTHOR);
                    $doc->exportCaption($this->PAYMENT);
                    $doc->exportCaption($this->DRID);
                    $doc->exportCaption($this->WARD);
                    $doc->exportCaption($this->STAXTYPE);
                    $doc->exportCaption($this->PURDISCVAL);
                    $doc->exportCaption($this->RNDOFF);
                    $doc->exportCaption($this->DISCONMRP);
                    $doc->exportCaption($this->DELVDT);
                    $doc->exportCaption($this->DELVTIME);
                    $doc->exportCaption($this->DELVBY);
                    $doc->exportCaption($this->HOSPNO);
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->pbv);
                    $doc->exportCaption($this->pbt);
                    $doc->exportCaption($this->SiNo);
                    $doc->exportCaption($this->Product);
                    $doc->exportCaption($this->Mfg);
                    $doc->exportCaption($this->HosoID);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->MFRCODE);
                    $doc->exportCaption($this->Reception);
                    $doc->exportCaption($this->PatID);
                    $doc->exportCaption($this->mrnno);
                    $doc->exportCaption($this->BRNAME);
                } else {
                    $doc->exportCaption($this->BRCODE);
                    $doc->exportCaption($this->TYPE);
                    $doc->exportCaption($this->DN);
                    $doc->exportCaption($this->RDN);
                    $doc->exportCaption($this->DT);
                    $doc->exportCaption($this->PRC);
                    $doc->exportCaption($this->OQ);
                    $doc->exportCaption($this->RQ);
                    $doc->exportCaption($this->MRQ);
                    $doc->exportCaption($this->IQ);
                    $doc->exportCaption($this->BATCHNO);
                    $doc->exportCaption($this->EXPDT);
                    $doc->exportCaption($this->BILLNO);
                    $doc->exportCaption($this->BILLDT);
                    $doc->exportCaption($this->RT);
                    $doc->exportCaption($this->VALUE);
                    $doc->exportCaption($this->DISC);
                    $doc->exportCaption($this->TAXP);
                    $doc->exportCaption($this->TAX);
                    $doc->exportCaption($this->TAXR);
                    $doc->exportCaption($this->DAMT);
                    $doc->exportCaption($this->EMPNO);
                    $doc->exportCaption($this->PC);
                    $doc->exportCaption($this->DRNAME);
                    $doc->exportCaption($this->BTIME);
                    $doc->exportCaption($this->ONO);
                    $doc->exportCaption($this->ODT);
                    $doc->exportCaption($this->PURRT);
                    $doc->exportCaption($this->GRP);
                    $doc->exportCaption($this->IBATCH);
                    $doc->exportCaption($this->IPNO);
                    $doc->exportCaption($this->OPNO);
                    $doc->exportCaption($this->RECID);
                    $doc->exportCaption($this->FQTY);
                    $doc->exportCaption($this->UR);
                    $doc->exportCaption($this->DCID);
                    $doc->exportCaption($this->_USERID);
                    $doc->exportCaption($this->MODDT);
                    $doc->exportCaption($this->FYM);
                    $doc->exportCaption($this->PRCBATCH);
                    $doc->exportCaption($this->SLNO);
                    $doc->exportCaption($this->MRP);
                    $doc->exportCaption($this->BILLYM);
                    $doc->exportCaption($this->BILLGRP);
                    $doc->exportCaption($this->STAFF);
                    $doc->exportCaption($this->TEMPIPNO);
                    $doc->exportCaption($this->PRNTED);
                    $doc->exportCaption($this->PATNAME);
                    $doc->exportCaption($this->PJVNO);
                    $doc->exportCaption($this->PJVSLNO);
                    $doc->exportCaption($this->OTHDISC);
                    $doc->exportCaption($this->PJVYM);
                    $doc->exportCaption($this->PURDISCPER);
                    $doc->exportCaption($this->CASHIER);
                    $doc->exportCaption($this->CASHTIME);
                    $doc->exportCaption($this->CASHRECD);
                    $doc->exportCaption($this->CASHREFNO);
                    $doc->exportCaption($this->CASHIERSHIFT);
                    $doc->exportCaption($this->PRCODE);
                    $doc->exportCaption($this->RELEASEBY);
                    $doc->exportCaption($this->CRAUTHOR);
                    $doc->exportCaption($this->PAYMENT);
                    $doc->exportCaption($this->DRID);
                    $doc->exportCaption($this->WARD);
                    $doc->exportCaption($this->STAXTYPE);
                    $doc->exportCaption($this->PURDISCVAL);
                    $doc->exportCaption($this->RNDOFF);
                    $doc->exportCaption($this->DISCONMRP);
                    $doc->exportCaption($this->DELVDT);
                    $doc->exportCaption($this->DELVTIME);
                    $doc->exportCaption($this->DELVBY);
                    $doc->exportCaption($this->HOSPNO);
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->pbv);
                    $doc->exportCaption($this->pbt);
                    $doc->exportCaption($this->SiNo);
                    $doc->exportCaption($this->Product);
                    $doc->exportCaption($this->Mfg);
                    $doc->exportCaption($this->HosoID);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->MFRCODE);
                    $doc->exportCaption($this->Reception);
                    $doc->exportCaption($this->PatID);
                    $doc->exportCaption($this->mrnno);
                    $doc->exportCaption($this->BRNAME);
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
                        $doc->exportField($this->BRCODE);
                        $doc->exportField($this->TYPE);
                        $doc->exportField($this->DN);
                        $doc->exportField($this->RDN);
                        $doc->exportField($this->DT);
                        $doc->exportField($this->PRC);
                        $doc->exportField($this->OQ);
                        $doc->exportField($this->RQ);
                        $doc->exportField($this->MRQ);
                        $doc->exportField($this->IQ);
                        $doc->exportField($this->BATCHNO);
                        $doc->exportField($this->EXPDT);
                        $doc->exportField($this->BILLNO);
                        $doc->exportField($this->BILLDT);
                        $doc->exportField($this->RT);
                        $doc->exportField($this->VALUE);
                        $doc->exportField($this->DISC);
                        $doc->exportField($this->TAXP);
                        $doc->exportField($this->TAX);
                        $doc->exportField($this->TAXR);
                        $doc->exportField($this->DAMT);
                        $doc->exportField($this->EMPNO);
                        $doc->exportField($this->PC);
                        $doc->exportField($this->DRNAME);
                        $doc->exportField($this->BTIME);
                        $doc->exportField($this->ONO);
                        $doc->exportField($this->ODT);
                        $doc->exportField($this->PURRT);
                        $doc->exportField($this->GRP);
                        $doc->exportField($this->IBATCH);
                        $doc->exportField($this->IPNO);
                        $doc->exportField($this->OPNO);
                        $doc->exportField($this->RECID);
                        $doc->exportField($this->FQTY);
                        $doc->exportField($this->UR);
                        $doc->exportField($this->DCID);
                        $doc->exportField($this->_USERID);
                        $doc->exportField($this->MODDT);
                        $doc->exportField($this->FYM);
                        $doc->exportField($this->PRCBATCH);
                        $doc->exportField($this->SLNO);
                        $doc->exportField($this->MRP);
                        $doc->exportField($this->BILLYM);
                        $doc->exportField($this->BILLGRP);
                        $doc->exportField($this->STAFF);
                        $doc->exportField($this->TEMPIPNO);
                        $doc->exportField($this->PRNTED);
                        $doc->exportField($this->PATNAME);
                        $doc->exportField($this->PJVNO);
                        $doc->exportField($this->PJVSLNO);
                        $doc->exportField($this->OTHDISC);
                        $doc->exportField($this->PJVYM);
                        $doc->exportField($this->PURDISCPER);
                        $doc->exportField($this->CASHIER);
                        $doc->exportField($this->CASHTIME);
                        $doc->exportField($this->CASHRECD);
                        $doc->exportField($this->CASHREFNO);
                        $doc->exportField($this->CASHIERSHIFT);
                        $doc->exportField($this->PRCODE);
                        $doc->exportField($this->RELEASEBY);
                        $doc->exportField($this->CRAUTHOR);
                        $doc->exportField($this->PAYMENT);
                        $doc->exportField($this->DRID);
                        $doc->exportField($this->WARD);
                        $doc->exportField($this->STAXTYPE);
                        $doc->exportField($this->PURDISCVAL);
                        $doc->exportField($this->RNDOFF);
                        $doc->exportField($this->DISCONMRP);
                        $doc->exportField($this->DELVDT);
                        $doc->exportField($this->DELVTIME);
                        $doc->exportField($this->DELVBY);
                        $doc->exportField($this->HOSPNO);
                        $doc->exportField($this->id);
                        $doc->exportField($this->pbv);
                        $doc->exportField($this->pbt);
                        $doc->exportField($this->SiNo);
                        $doc->exportField($this->Product);
                        $doc->exportField($this->Mfg);
                        $doc->exportField($this->HosoID);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->MFRCODE);
                        $doc->exportField($this->Reception);
                        $doc->exportField($this->PatID);
                        $doc->exportField($this->mrnno);
                        $doc->exportField($this->BRNAME);
                    } else {
                        $doc->exportField($this->BRCODE);
                        $doc->exportField($this->TYPE);
                        $doc->exportField($this->DN);
                        $doc->exportField($this->RDN);
                        $doc->exportField($this->DT);
                        $doc->exportField($this->PRC);
                        $doc->exportField($this->OQ);
                        $doc->exportField($this->RQ);
                        $doc->exportField($this->MRQ);
                        $doc->exportField($this->IQ);
                        $doc->exportField($this->BATCHNO);
                        $doc->exportField($this->EXPDT);
                        $doc->exportField($this->BILLNO);
                        $doc->exportField($this->BILLDT);
                        $doc->exportField($this->RT);
                        $doc->exportField($this->VALUE);
                        $doc->exportField($this->DISC);
                        $doc->exportField($this->TAXP);
                        $doc->exportField($this->TAX);
                        $doc->exportField($this->TAXR);
                        $doc->exportField($this->DAMT);
                        $doc->exportField($this->EMPNO);
                        $doc->exportField($this->PC);
                        $doc->exportField($this->DRNAME);
                        $doc->exportField($this->BTIME);
                        $doc->exportField($this->ONO);
                        $doc->exportField($this->ODT);
                        $doc->exportField($this->PURRT);
                        $doc->exportField($this->GRP);
                        $doc->exportField($this->IBATCH);
                        $doc->exportField($this->IPNO);
                        $doc->exportField($this->OPNO);
                        $doc->exportField($this->RECID);
                        $doc->exportField($this->FQTY);
                        $doc->exportField($this->UR);
                        $doc->exportField($this->DCID);
                        $doc->exportField($this->_USERID);
                        $doc->exportField($this->MODDT);
                        $doc->exportField($this->FYM);
                        $doc->exportField($this->PRCBATCH);
                        $doc->exportField($this->SLNO);
                        $doc->exportField($this->MRP);
                        $doc->exportField($this->BILLYM);
                        $doc->exportField($this->BILLGRP);
                        $doc->exportField($this->STAFF);
                        $doc->exportField($this->TEMPIPNO);
                        $doc->exportField($this->PRNTED);
                        $doc->exportField($this->PATNAME);
                        $doc->exportField($this->PJVNO);
                        $doc->exportField($this->PJVSLNO);
                        $doc->exportField($this->OTHDISC);
                        $doc->exportField($this->PJVYM);
                        $doc->exportField($this->PURDISCPER);
                        $doc->exportField($this->CASHIER);
                        $doc->exportField($this->CASHTIME);
                        $doc->exportField($this->CASHRECD);
                        $doc->exportField($this->CASHREFNO);
                        $doc->exportField($this->CASHIERSHIFT);
                        $doc->exportField($this->PRCODE);
                        $doc->exportField($this->RELEASEBY);
                        $doc->exportField($this->CRAUTHOR);
                        $doc->exportField($this->PAYMENT);
                        $doc->exportField($this->DRID);
                        $doc->exportField($this->WARD);
                        $doc->exportField($this->STAXTYPE);
                        $doc->exportField($this->PURDISCVAL);
                        $doc->exportField($this->RNDOFF);
                        $doc->exportField($this->DISCONMRP);
                        $doc->exportField($this->DELVDT);
                        $doc->exportField($this->DELVTIME);
                        $doc->exportField($this->DELVBY);
                        $doc->exportField($this->HOSPNO);
                        $doc->exportField($this->id);
                        $doc->exportField($this->pbv);
                        $doc->exportField($this->pbt);
                        $doc->exportField($this->SiNo);
                        $doc->exportField($this->Product);
                        $doc->exportField($this->Mfg);
                        $doc->exportField($this->HosoID);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->MFRCODE);
                        $doc->exportField($this->Reception);
                        $doc->exportField($this->PatID);
                        $doc->exportField($this->mrnno);
                        $doc->exportField($this->BRNAME);
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
