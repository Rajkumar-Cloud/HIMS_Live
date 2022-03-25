<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for pharmacy_storemast
 */
class PharmacyStoremast extends DbTable
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
    public $PRC;
    public $TYPE;
    public $DES;
    public $UM;
    public $RT;
    public $UR;
    public $TAXP;
    public $BATCHNO;
    public $OQ;
    public $RQ;
    public $MRQ;
    public $IQ;
    public $MRP;
    public $EXPDT;
    public $SALQTY;
    public $LASTPURDT;
    public $LASTSUPP;
    public $GENNAME;
    public $LASTISSDT;
    public $CREATEDDT;
    public $OPPRC;
    public $RESTRICT;
    public $BAWAPRC;
    public $STAXPER;
    public $TAXTYPE;
    public $OLDTAXP;
    public $TAXUPD;
    public $PACKAGE;
    public $NEWRT;
    public $NEWMRP;
    public $NEWUR;
    public $STATUS;
    public $RETNQTY;
    public $KEMODISC;
    public $PATSALE;
    public $ORGAN;
    public $OLDRQ;
    public $DRID;
    public $MFRCODE;
    public $COMBCODE;
    public $GENCODE;
    public $STRENGTH;
    public $UNIT;
    public $FORMULARY;
    public $STOCK;
    public $RACKNO;
    public $SUPPNAME;
    public $COMBNAME;
    public $GENERICNAME;
    public $REMARK;
    public $TEMP;
    public $PACKING;
    public $PhysQty;
    public $LedQty;
    public $id;
    public $PurValue;
    public $PSGST;
    public $PCGST;
    public $SaleValue;
    public $SSGST;
    public $SCGST;
    public $SaleRate;
    public $HospID;
    public $BRNAME;
    public $OV;
    public $LATESTOV;
    public $ITEMTYPE;
    public $ROWID;
    public $MOVED;
    public $NEWTAX;
    public $HSNCODE;
    public $OLDTAX;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'pharmacy_storemast';
        $this->TableName = 'pharmacy_storemast';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`pharmacy_storemast`";
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
        $this->BRCODE = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_BRCODE', 'BRCODE', '`BRCODE`', '`BRCODE`', 3, 11, -1, false, '`BRCODE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BRCODE->Sortable = true; // Allow sort
        $this->BRCODE->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['BRCODE'] = &$this->BRCODE;

        // PRC
        $this->PRC = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_PRC', 'PRC', '`PRC`', '`PRC`', 200, 9, -1, false, '`PRC`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PRC->Sortable = true; // Allow sort
        $this->Fields['PRC'] = &$this->PRC;

        // TYPE
        $this->TYPE = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_TYPE', 'TYPE', '`TYPE`', '`TYPE`', 200, 3, -1, false, '`TYPE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TYPE->Sortable = true; // Allow sort
        $this->Fields['TYPE'] = &$this->TYPE;

        // DES
        $this->DES = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_DES', 'DES', '`DES`', '`DES`', 200, 100, -1, false, '`DES`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DES->Sortable = true; // Allow sort
        $this->Fields['DES'] = &$this->DES;

        // UM
        $this->UM = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_UM', 'UM', '`UM`', '`UM`', 200, 3, -1, false, '`UM`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->UM->Sortable = true; // Allow sort
        $this->Fields['UM'] = &$this->UM;

        // RT
        $this->RT = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_RT', 'RT', '`RT`', '`RT`', 131, 12, -1, false, '`RT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RT->Sortable = true; // Allow sort
        $this->RT->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->RT->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['RT'] = &$this->RT;

        // UR
        $this->UR = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_UR', 'UR', '`UR`', '`UR`', 131, 12, -1, false, '`UR`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->UR->Sortable = true; // Allow sort
        $this->UR->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->UR->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['UR'] = &$this->UR;

        // TAXP
        $this->TAXP = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_TAXP', 'TAXP', '`TAXP`', '`TAXP`', 131, 8, -1, false, '`TAXP`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TAXP->Sortable = true; // Allow sort
        $this->TAXP->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->TAXP->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['TAXP'] = &$this->TAXP;

        // BATCHNO
        $this->BATCHNO = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_BATCHNO', 'BATCHNO', '`BATCHNO`', '`BATCHNO`', 200, 14, -1, false, '`BATCHNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BATCHNO->Sortable = true; // Allow sort
        $this->Fields['BATCHNO'] = &$this->BATCHNO;

        // OQ
        $this->OQ = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_OQ', 'OQ', '`OQ`', '`OQ`', 131, 12, -1, false, '`OQ`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OQ->Sortable = true; // Allow sort
        $this->OQ->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OQ->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['OQ'] = &$this->OQ;

        // RQ
        $this->RQ = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_RQ', 'RQ', '`RQ`', '`RQ`', 131, 12, -1, false, '`RQ`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RQ->Sortable = true; // Allow sort
        $this->RQ->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->RQ->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['RQ'] = &$this->RQ;

        // MRQ
        $this->MRQ = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_MRQ', 'MRQ', '`MRQ`', '`MRQ`', 131, 12, -1, false, '`MRQ`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MRQ->Sortable = true; // Allow sort
        $this->MRQ->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->MRQ->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['MRQ'] = &$this->MRQ;

        // IQ
        $this->IQ = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_IQ', 'IQ', '`IQ`', '`IQ`', 131, 12, -1, false, '`IQ`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IQ->Sortable = true; // Allow sort
        $this->IQ->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->IQ->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['IQ'] = &$this->IQ;

        // MRP
        $this->MRP = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_MRP', 'MRP', '`MRP`', '`MRP`', 131, 12, -1, false, '`MRP`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MRP->Sortable = true; // Allow sort
        $this->MRP->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->MRP->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['MRP'] = &$this->MRP;

        // EXPDT
        $this->EXPDT = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_EXPDT', 'EXPDT', '`EXPDT`', CastDateFieldForLike("`EXPDT`", 0, "DB"), 135, 19, 0, false, '`EXPDT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EXPDT->Sortable = true; // Allow sort
        $this->EXPDT->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['EXPDT'] = &$this->EXPDT;

        // SALQTY
        $this->SALQTY = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_SALQTY', 'SALQTY', '`SALQTY`', '`SALQTY`', 131, 12, -1, false, '`SALQTY`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SALQTY->Sortable = true; // Allow sort
        $this->SALQTY->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SALQTY->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['SALQTY'] = &$this->SALQTY;

        // LASTPURDT
        $this->LASTPURDT = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_LASTPURDT', 'LASTPURDT', '`LASTPURDT`', CastDateFieldForLike("`LASTPURDT`", 0, "DB"), 135, 19, 0, false, '`LASTPURDT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->LASTPURDT->Sortable = true; // Allow sort
        $this->LASTPURDT->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['LASTPURDT'] = &$this->LASTPURDT;

        // LASTSUPP
        $this->LASTSUPP = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_LASTSUPP', 'LASTSUPP', '`LASTSUPP`', '`LASTSUPP`', 200, 5, -1, false, '`LASTSUPP`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->LASTSUPP->Sortable = true; // Allow sort
        $this->Fields['LASTSUPP'] = &$this->LASTSUPP;

        // GENNAME
        $this->GENNAME = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_GENNAME', 'GENNAME', '`GENNAME`', '`GENNAME`', 200, 75, -1, false, '`GENNAME`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GENNAME->Sortable = true; // Allow sort
        $this->Fields['GENNAME'] = &$this->GENNAME;

        // LASTISSDT
        $this->LASTISSDT = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_LASTISSDT', 'LASTISSDT', '`LASTISSDT`', CastDateFieldForLike("`LASTISSDT`", 0, "DB"), 135, 19, 0, false, '`LASTISSDT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->LASTISSDT->Sortable = true; // Allow sort
        $this->LASTISSDT->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['LASTISSDT'] = &$this->LASTISSDT;

        // CREATEDDT
        $this->CREATEDDT = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_CREATEDDT', 'CREATEDDT', '`CREATEDDT`', CastDateFieldForLike("`CREATEDDT`", 0, "DB"), 135, 19, 0, false, '`CREATEDDT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CREATEDDT->Sortable = true; // Allow sort
        $this->CREATEDDT->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['CREATEDDT'] = &$this->CREATEDDT;

        // OPPRC
        $this->OPPRC = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_OPPRC', 'OPPRC', '`OPPRC`', '`OPPRC`', 200, 9, -1, false, '`OPPRC`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OPPRC->Sortable = true; // Allow sort
        $this->Fields['OPPRC'] = &$this->OPPRC;

        // RESTRICT
        $this->RESTRICT = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_RESTRICT', 'RESTRICT', '`RESTRICT`', '`RESTRICT`', 200, 1, -1, false, '`RESTRICT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RESTRICT->Sortable = true; // Allow sort
        $this->Fields['RESTRICT'] = &$this->RESTRICT;

        // BAWAPRC
        $this->BAWAPRC = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_BAWAPRC', 'BAWAPRC', '`BAWAPRC`', '`BAWAPRC`', 200, 9, -1, false, '`BAWAPRC`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BAWAPRC->Sortable = true; // Allow sort
        $this->Fields['BAWAPRC'] = &$this->BAWAPRC;

        // STAXPER
        $this->STAXPER = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_STAXPER', 'STAXPER', '`STAXPER`', '`STAXPER`', 131, 8, -1, false, '`STAXPER`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->STAXPER->Sortable = true; // Allow sort
        $this->STAXPER->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->STAXPER->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['STAXPER'] = &$this->STAXPER;

        // TAXTYPE
        $this->TAXTYPE = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_TAXTYPE', 'TAXTYPE', '`TAXTYPE`', '`TAXTYPE`', 200, 1, -1, false, '`TAXTYPE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TAXTYPE->Sortable = true; // Allow sort
        $this->Fields['TAXTYPE'] = &$this->TAXTYPE;

        // OLDTAXP
        $this->OLDTAXP = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_OLDTAXP', 'OLDTAXP', '`OLDTAXP`', '`OLDTAXP`', 131, 12, -1, false, '`OLDTAXP`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OLDTAXP->Sortable = true; // Allow sort
        $this->OLDTAXP->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OLDTAXP->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['OLDTAXP'] = &$this->OLDTAXP;

        // TAXUPD
        $this->TAXUPD = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_TAXUPD', 'TAXUPD', '`TAXUPD`', '`TAXUPD`', 200, 1, -1, false, '`TAXUPD`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TAXUPD->Sortable = true; // Allow sort
        $this->Fields['TAXUPD'] = &$this->TAXUPD;

        // PACKAGE
        $this->PACKAGE = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_PACKAGE', 'PACKAGE', '`PACKAGE`', '`PACKAGE`', 200, 1, -1, false, '`PACKAGE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PACKAGE->Sortable = true; // Allow sort
        $this->Fields['PACKAGE'] = &$this->PACKAGE;

        // NEWRT
        $this->NEWRT = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_NEWRT', 'NEWRT', '`NEWRT`', '`NEWRT`', 131, 12, -1, false, '`NEWRT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NEWRT->Sortable = true; // Allow sort
        $this->NEWRT->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->NEWRT->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['NEWRT'] = &$this->NEWRT;

        // NEWMRP
        $this->NEWMRP = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_NEWMRP', 'NEWMRP', '`NEWMRP`', '`NEWMRP`', 131, 12, -1, false, '`NEWMRP`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NEWMRP->Sortable = true; // Allow sort
        $this->NEWMRP->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->NEWMRP->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['NEWMRP'] = &$this->NEWMRP;

        // NEWUR
        $this->NEWUR = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_NEWUR', 'NEWUR', '`NEWUR`', '`NEWUR`', 131, 12, -1, false, '`NEWUR`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NEWUR->Sortable = true; // Allow sort
        $this->NEWUR->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->NEWUR->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['NEWUR'] = &$this->NEWUR;

        // STATUS
        $this->STATUS = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_STATUS', 'STATUS', '`STATUS`', '`STATUS`', 200, 10, -1, false, '`STATUS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->STATUS->Sortable = true; // Allow sort
        $this->Fields['STATUS'] = &$this->STATUS;

        // RETNQTY
        $this->RETNQTY = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_RETNQTY', 'RETNQTY', '`RETNQTY`', '`RETNQTY`', 131, 12, -1, false, '`RETNQTY`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RETNQTY->Sortable = true; // Allow sort
        $this->RETNQTY->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->RETNQTY->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['RETNQTY'] = &$this->RETNQTY;

        // KEMODISC
        $this->KEMODISC = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_KEMODISC', 'KEMODISC', '`KEMODISC`', '`KEMODISC`', 200, 1, -1, false, '`KEMODISC`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->KEMODISC->Sortable = true; // Allow sort
        $this->Fields['KEMODISC'] = &$this->KEMODISC;

        // PATSALE
        $this->PATSALE = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_PATSALE', 'PATSALE', '`PATSALE`', '`PATSALE`', 131, 12, -1, false, '`PATSALE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PATSALE->Sortable = true; // Allow sort
        $this->PATSALE->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PATSALE->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['PATSALE'] = &$this->PATSALE;

        // ORGAN
        $this->ORGAN = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_ORGAN', 'ORGAN', '`ORGAN`', '`ORGAN`', 200, 50, -1, false, '`ORGAN`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ORGAN->Sortable = true; // Allow sort
        $this->Fields['ORGAN'] = &$this->ORGAN;

        // OLDRQ
        $this->OLDRQ = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_OLDRQ', 'OLDRQ', '`OLDRQ`', '`OLDRQ`', 131, 12, -1, false, '`OLDRQ`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OLDRQ->Sortable = true; // Allow sort
        $this->OLDRQ->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OLDRQ->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['OLDRQ'] = &$this->OLDRQ;

        // DRID
        $this->DRID = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_DRID', 'DRID', '`DRID`', '`DRID`', 200, 5, -1, false, '`DRID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DRID->Sortable = true; // Allow sort
        $this->Fields['DRID'] = &$this->DRID;

        // MFRCODE
        $this->MFRCODE = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_MFRCODE', 'MFRCODE', '`MFRCODE`', '`MFRCODE`', 200, 3, -1, false, '`MFRCODE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MFRCODE->Sortable = true; // Allow sort
        $this->Fields['MFRCODE'] = &$this->MFRCODE;

        // COMBCODE
        $this->COMBCODE = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_COMBCODE', 'COMBCODE', '`COMBCODE`', '`COMBCODE`', 200, 50, -1, false, '`COMBCODE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->COMBCODE->Sortable = true; // Allow sort
        $this->Fields['COMBCODE'] = &$this->COMBCODE;

        // GENCODE
        $this->GENCODE = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_GENCODE', 'GENCODE', '`GENCODE`', '`GENCODE`', 200, 10, -1, false, '`GENCODE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GENCODE->Sortable = true; // Allow sort
        $this->Fields['GENCODE'] = &$this->GENCODE;

        // STRENGTH
        $this->STRENGTH = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_STRENGTH', 'STRENGTH', '`STRENGTH`', '`STRENGTH`', 131, 11, -1, false, '`STRENGTH`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->STRENGTH->Sortable = true; // Allow sort
        $this->STRENGTH->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->STRENGTH->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['STRENGTH'] = &$this->STRENGTH;

        // UNIT
        $this->UNIT = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_UNIT', 'UNIT', '`UNIT`', '`UNIT`', 200, 3, -1, false, '`UNIT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->UNIT->Sortable = true; // Allow sort
        $this->Fields['UNIT'] = &$this->UNIT;

        // FORMULARY
        $this->FORMULARY = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_FORMULARY', 'FORMULARY', '`FORMULARY`', '`FORMULARY`', 200, 2, -1, false, '`FORMULARY`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FORMULARY->Sortable = true; // Allow sort
        $this->Fields['FORMULARY'] = &$this->FORMULARY;

        // STOCK
        $this->STOCK = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_STOCK', 'STOCK', '`STOCK`', '`STOCK`', 131, 12, -1, false, '`STOCK`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->STOCK->Sortable = true; // Allow sort
        $this->STOCK->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->STOCK->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['STOCK'] = &$this->STOCK;

        // RACKNO
        $this->RACKNO = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_RACKNO', 'RACKNO', '`RACKNO`', '`RACKNO`', 200, 10, -1, false, '`RACKNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RACKNO->Sortable = true; // Allow sort
        $this->Fields['RACKNO'] = &$this->RACKNO;

        // SUPPNAME
        $this->SUPPNAME = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_SUPPNAME', 'SUPPNAME', '`SUPPNAME`', '`SUPPNAME`', 200, 50, -1, false, '`SUPPNAME`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SUPPNAME->Sortable = true; // Allow sort
        $this->Fields['SUPPNAME'] = &$this->SUPPNAME;

        // COMBNAME
        $this->COMBNAME = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_COMBNAME', 'COMBNAME', '`COMBNAME`', '`COMBNAME`', 200, 100, -1, false, '`COMBNAME`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->COMBNAME->Sortable = true; // Allow sort
        $this->Fields['COMBNAME'] = &$this->COMBNAME;

        // GENERICNAME
        $this->GENERICNAME = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_GENERICNAME', 'GENERICNAME', '`GENERICNAME`', '`GENERICNAME`', 200, 100, -1, false, '`GENERICNAME`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GENERICNAME->Sortable = true; // Allow sort
        $this->Fields['GENERICNAME'] = &$this->GENERICNAME;

        // REMARK
        $this->REMARK = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_REMARK', 'REMARK', '`REMARK`', '`REMARK`', 200, 50, -1, false, '`REMARK`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->REMARK->Sortable = true; // Allow sort
        $this->Fields['REMARK'] = &$this->REMARK;

        // TEMP
        $this->TEMP = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_TEMP', 'TEMP', '`TEMP`', '`TEMP`', 200, 5, -1, false, '`TEMP`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TEMP->Sortable = true; // Allow sort
        $this->Fields['TEMP'] = &$this->TEMP;

        // PACKING
        $this->PACKING = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_PACKING', 'PACKING', '`PACKING`', '`PACKING`', 131, 4, -1, false, '`PACKING`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PACKING->Sortable = true; // Allow sort
        $this->PACKING->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PACKING->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['PACKING'] = &$this->PACKING;

        // PhysQty
        $this->PhysQty = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_PhysQty', 'PhysQty', '`PhysQty`', '`PhysQty`', 131, 12, -1, false, '`PhysQty`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PhysQty->Sortable = true; // Allow sort
        $this->PhysQty->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PhysQty->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['PhysQty'] = &$this->PhysQty;

        // LedQty
        $this->LedQty = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_LedQty', 'LedQty', '`LedQty`', '`LedQty`', 131, 12, -1, false, '`LedQty`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->LedQty->Sortable = true; // Allow sort
        $this->LedQty->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->LedQty->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['LedQty'] = &$this->LedQty;

        // id
        $this->id = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['id'] = &$this->id;

        // PurValue
        $this->PurValue = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_PurValue', 'PurValue', '`PurValue`', '`PurValue`', 131, 12, -1, false, '`PurValue`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PurValue->Sortable = true; // Allow sort
        $this->PurValue->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PurValue->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['PurValue'] = &$this->PurValue;

        // PSGST
        $this->PSGST = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_PSGST', 'PSGST', '`PSGST`', '`PSGST`', 131, 12, -1, false, '`PSGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PSGST->Sortable = true; // Allow sort
        $this->PSGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PSGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['PSGST'] = &$this->PSGST;

        // PCGST
        $this->PCGST = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_PCGST', 'PCGST', '`PCGST`', '`PCGST`', 131, 12, -1, false, '`PCGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PCGST->Sortable = true; // Allow sort
        $this->PCGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PCGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['PCGST'] = &$this->PCGST;

        // SaleValue
        $this->SaleValue = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_SaleValue', 'SaleValue', '`SaleValue`', '`SaleValue`', 131, 12, -1, false, '`SaleValue`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SaleValue->Sortable = true; // Allow sort
        $this->SaleValue->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SaleValue->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['SaleValue'] = &$this->SaleValue;

        // SSGST
        $this->SSGST = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_SSGST', 'SSGST', '`SSGST`', '`SSGST`', 131, 12, -1, false, '`SSGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SSGST->Sortable = true; // Allow sort
        $this->SSGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SSGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['SSGST'] = &$this->SSGST;

        // SCGST
        $this->SCGST = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_SCGST', 'SCGST', '`SCGST`', '`SCGST`', 131, 12, -1, false, '`SCGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SCGST->Sortable = true; // Allow sort
        $this->SCGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SCGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['SCGST'] = &$this->SCGST;

        // SaleRate
        $this->SaleRate = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_SaleRate', 'SaleRate', '`SaleRate`', '`SaleRate`', 131, 12, -1, false, '`SaleRate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SaleRate->Sortable = true; // Allow sort
        $this->SaleRate->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SaleRate->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['SaleRate'] = &$this->SaleRate;

        // HospID
        $this->HospID = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['HospID'] = &$this->HospID;

        // BRNAME
        $this->BRNAME = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_BRNAME', 'BRNAME', '`BRNAME`', '`BRNAME`', 200, 45, -1, false, '`BRNAME`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BRNAME->Sortable = true; // Allow sort
        $this->Fields['BRNAME'] = &$this->BRNAME;

        // OV
        $this->OV = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_OV', 'OV', '`OV`', '`OV`', 131, 12, -1, false, '`OV`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OV->Sortable = true; // Allow sort
        $this->OV->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OV->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['OV'] = &$this->OV;

        // LATESTOV
        $this->LATESTOV = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_LATESTOV', 'LATESTOV', '`LATESTOV`', '`LATESTOV`', 131, 12, -1, false, '`LATESTOV`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->LATESTOV->Sortable = true; // Allow sort
        $this->LATESTOV->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->LATESTOV->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['LATESTOV'] = &$this->LATESTOV;

        // ITEMTYPE
        $this->ITEMTYPE = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_ITEMTYPE', 'ITEMTYPE', '`ITEMTYPE`', '`ITEMTYPE`', 200, 45, -1, false, '`ITEMTYPE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ITEMTYPE->Sortable = true; // Allow sort
        $this->Fields['ITEMTYPE'] = &$this->ITEMTYPE;

        // ROWID
        $this->ROWID = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_ROWID', 'ROWID', '`ROWID`', '`ROWID`', 200, 45, -1, false, '`ROWID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ROWID->Sortable = true; // Allow sort
        $this->Fields['ROWID'] = &$this->ROWID;

        // MOVED
        $this->MOVED = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_MOVED', 'MOVED', '`MOVED`', '`MOVED`', 3, 11, -1, false, '`MOVED`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MOVED->Sortable = true; // Allow sort
        $this->MOVED->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['MOVED'] = &$this->MOVED;

        // NEWTAX
        $this->NEWTAX = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_NEWTAX', 'NEWTAX', '`NEWTAX`', '`NEWTAX`', 131, 12, -1, false, '`NEWTAX`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NEWTAX->Sortable = true; // Allow sort
        $this->NEWTAX->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->NEWTAX->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['NEWTAX'] = &$this->NEWTAX;

        // HSNCODE
        $this->HSNCODE = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_HSNCODE', 'HSNCODE', '`HSNCODE`', '`HSNCODE`', 200, 45, -1, false, '`HSNCODE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HSNCODE->Sortable = true; // Allow sort
        $this->Fields['HSNCODE'] = &$this->HSNCODE;

        // OLDTAX
        $this->OLDTAX = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_OLDTAX', 'OLDTAX', '`OLDTAX`', '`OLDTAX`', 131, 12, -1, false, '`OLDTAX`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OLDTAX->Sortable = true; // Allow sort
        $this->OLDTAX->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OLDTAX->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['OLDTAX'] = &$this->OLDTAX;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`pharmacy_storemast`";
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
        $this->PRC->DbValue = $row['PRC'];
        $this->TYPE->DbValue = $row['TYPE'];
        $this->DES->DbValue = $row['DES'];
        $this->UM->DbValue = $row['UM'];
        $this->RT->DbValue = $row['RT'];
        $this->UR->DbValue = $row['UR'];
        $this->TAXP->DbValue = $row['TAXP'];
        $this->BATCHNO->DbValue = $row['BATCHNO'];
        $this->OQ->DbValue = $row['OQ'];
        $this->RQ->DbValue = $row['RQ'];
        $this->MRQ->DbValue = $row['MRQ'];
        $this->IQ->DbValue = $row['IQ'];
        $this->MRP->DbValue = $row['MRP'];
        $this->EXPDT->DbValue = $row['EXPDT'];
        $this->SALQTY->DbValue = $row['SALQTY'];
        $this->LASTPURDT->DbValue = $row['LASTPURDT'];
        $this->LASTSUPP->DbValue = $row['LASTSUPP'];
        $this->GENNAME->DbValue = $row['GENNAME'];
        $this->LASTISSDT->DbValue = $row['LASTISSDT'];
        $this->CREATEDDT->DbValue = $row['CREATEDDT'];
        $this->OPPRC->DbValue = $row['OPPRC'];
        $this->RESTRICT->DbValue = $row['RESTRICT'];
        $this->BAWAPRC->DbValue = $row['BAWAPRC'];
        $this->STAXPER->DbValue = $row['STAXPER'];
        $this->TAXTYPE->DbValue = $row['TAXTYPE'];
        $this->OLDTAXP->DbValue = $row['OLDTAXP'];
        $this->TAXUPD->DbValue = $row['TAXUPD'];
        $this->PACKAGE->DbValue = $row['PACKAGE'];
        $this->NEWRT->DbValue = $row['NEWRT'];
        $this->NEWMRP->DbValue = $row['NEWMRP'];
        $this->NEWUR->DbValue = $row['NEWUR'];
        $this->STATUS->DbValue = $row['STATUS'];
        $this->RETNQTY->DbValue = $row['RETNQTY'];
        $this->KEMODISC->DbValue = $row['KEMODISC'];
        $this->PATSALE->DbValue = $row['PATSALE'];
        $this->ORGAN->DbValue = $row['ORGAN'];
        $this->OLDRQ->DbValue = $row['OLDRQ'];
        $this->DRID->DbValue = $row['DRID'];
        $this->MFRCODE->DbValue = $row['MFRCODE'];
        $this->COMBCODE->DbValue = $row['COMBCODE'];
        $this->GENCODE->DbValue = $row['GENCODE'];
        $this->STRENGTH->DbValue = $row['STRENGTH'];
        $this->UNIT->DbValue = $row['UNIT'];
        $this->FORMULARY->DbValue = $row['FORMULARY'];
        $this->STOCK->DbValue = $row['STOCK'];
        $this->RACKNO->DbValue = $row['RACKNO'];
        $this->SUPPNAME->DbValue = $row['SUPPNAME'];
        $this->COMBNAME->DbValue = $row['COMBNAME'];
        $this->GENERICNAME->DbValue = $row['GENERICNAME'];
        $this->REMARK->DbValue = $row['REMARK'];
        $this->TEMP->DbValue = $row['TEMP'];
        $this->PACKING->DbValue = $row['PACKING'];
        $this->PhysQty->DbValue = $row['PhysQty'];
        $this->LedQty->DbValue = $row['LedQty'];
        $this->id->DbValue = $row['id'];
        $this->PurValue->DbValue = $row['PurValue'];
        $this->PSGST->DbValue = $row['PSGST'];
        $this->PCGST->DbValue = $row['PCGST'];
        $this->SaleValue->DbValue = $row['SaleValue'];
        $this->SSGST->DbValue = $row['SSGST'];
        $this->SCGST->DbValue = $row['SCGST'];
        $this->SaleRate->DbValue = $row['SaleRate'];
        $this->HospID->DbValue = $row['HospID'];
        $this->BRNAME->DbValue = $row['BRNAME'];
        $this->OV->DbValue = $row['OV'];
        $this->LATESTOV->DbValue = $row['LATESTOV'];
        $this->ITEMTYPE->DbValue = $row['ITEMTYPE'];
        $this->ROWID->DbValue = $row['ROWID'];
        $this->MOVED->DbValue = $row['MOVED'];
        $this->NEWTAX->DbValue = $row['NEWTAX'];
        $this->HSNCODE->DbValue = $row['HSNCODE'];
        $this->OLDTAX->DbValue = $row['OLDTAX'];
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
            return GetUrl("PharmacyStoremastList");
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
        if ($pageName == "PharmacyStoremastView") {
            return $Language->phrase("View");
        } elseif ($pageName == "PharmacyStoremastEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "PharmacyStoremastAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "PharmacyStoremastList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("PharmacyStoremastView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("PharmacyStoremastView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "PharmacyStoremastAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "PharmacyStoremastAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("PharmacyStoremastEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("PharmacyStoremastAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("PharmacyStoremastDelete", $this->getUrlParm());
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
        $this->PRC->setDbValue($row['PRC']);
        $this->TYPE->setDbValue($row['TYPE']);
        $this->DES->setDbValue($row['DES']);
        $this->UM->setDbValue($row['UM']);
        $this->RT->setDbValue($row['RT']);
        $this->UR->setDbValue($row['UR']);
        $this->TAXP->setDbValue($row['TAXP']);
        $this->BATCHNO->setDbValue($row['BATCHNO']);
        $this->OQ->setDbValue($row['OQ']);
        $this->RQ->setDbValue($row['RQ']);
        $this->MRQ->setDbValue($row['MRQ']);
        $this->IQ->setDbValue($row['IQ']);
        $this->MRP->setDbValue($row['MRP']);
        $this->EXPDT->setDbValue($row['EXPDT']);
        $this->SALQTY->setDbValue($row['SALQTY']);
        $this->LASTPURDT->setDbValue($row['LASTPURDT']);
        $this->LASTSUPP->setDbValue($row['LASTSUPP']);
        $this->GENNAME->setDbValue($row['GENNAME']);
        $this->LASTISSDT->setDbValue($row['LASTISSDT']);
        $this->CREATEDDT->setDbValue($row['CREATEDDT']);
        $this->OPPRC->setDbValue($row['OPPRC']);
        $this->RESTRICT->setDbValue($row['RESTRICT']);
        $this->BAWAPRC->setDbValue($row['BAWAPRC']);
        $this->STAXPER->setDbValue($row['STAXPER']);
        $this->TAXTYPE->setDbValue($row['TAXTYPE']);
        $this->OLDTAXP->setDbValue($row['OLDTAXP']);
        $this->TAXUPD->setDbValue($row['TAXUPD']);
        $this->PACKAGE->setDbValue($row['PACKAGE']);
        $this->NEWRT->setDbValue($row['NEWRT']);
        $this->NEWMRP->setDbValue($row['NEWMRP']);
        $this->NEWUR->setDbValue($row['NEWUR']);
        $this->STATUS->setDbValue($row['STATUS']);
        $this->RETNQTY->setDbValue($row['RETNQTY']);
        $this->KEMODISC->setDbValue($row['KEMODISC']);
        $this->PATSALE->setDbValue($row['PATSALE']);
        $this->ORGAN->setDbValue($row['ORGAN']);
        $this->OLDRQ->setDbValue($row['OLDRQ']);
        $this->DRID->setDbValue($row['DRID']);
        $this->MFRCODE->setDbValue($row['MFRCODE']);
        $this->COMBCODE->setDbValue($row['COMBCODE']);
        $this->GENCODE->setDbValue($row['GENCODE']);
        $this->STRENGTH->setDbValue($row['STRENGTH']);
        $this->UNIT->setDbValue($row['UNIT']);
        $this->FORMULARY->setDbValue($row['FORMULARY']);
        $this->STOCK->setDbValue($row['STOCK']);
        $this->RACKNO->setDbValue($row['RACKNO']);
        $this->SUPPNAME->setDbValue($row['SUPPNAME']);
        $this->COMBNAME->setDbValue($row['COMBNAME']);
        $this->GENERICNAME->setDbValue($row['GENERICNAME']);
        $this->REMARK->setDbValue($row['REMARK']);
        $this->TEMP->setDbValue($row['TEMP']);
        $this->PACKING->setDbValue($row['PACKING']);
        $this->PhysQty->setDbValue($row['PhysQty']);
        $this->LedQty->setDbValue($row['LedQty']);
        $this->id->setDbValue($row['id']);
        $this->PurValue->setDbValue($row['PurValue']);
        $this->PSGST->setDbValue($row['PSGST']);
        $this->PCGST->setDbValue($row['PCGST']);
        $this->SaleValue->setDbValue($row['SaleValue']);
        $this->SSGST->setDbValue($row['SSGST']);
        $this->SCGST->setDbValue($row['SCGST']);
        $this->SaleRate->setDbValue($row['SaleRate']);
        $this->HospID->setDbValue($row['HospID']);
        $this->BRNAME->setDbValue($row['BRNAME']);
        $this->OV->setDbValue($row['OV']);
        $this->LATESTOV->setDbValue($row['LATESTOV']);
        $this->ITEMTYPE->setDbValue($row['ITEMTYPE']);
        $this->ROWID->setDbValue($row['ROWID']);
        $this->MOVED->setDbValue($row['MOVED']);
        $this->NEWTAX->setDbValue($row['NEWTAX']);
        $this->HSNCODE->setDbValue($row['HSNCODE']);
        $this->OLDTAX->setDbValue($row['OLDTAX']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // BRCODE

        // PRC

        // TYPE

        // DES

        // UM

        // RT

        // UR

        // TAXP

        // BATCHNO

        // OQ

        // RQ

        // MRQ

        // IQ

        // MRP

        // EXPDT

        // SALQTY

        // LASTPURDT

        // LASTSUPP

        // GENNAME

        // LASTISSDT

        // CREATEDDT

        // OPPRC

        // RESTRICT

        // BAWAPRC

        // STAXPER

        // TAXTYPE

        // OLDTAXP

        // TAXUPD

        // PACKAGE

        // NEWRT

        // NEWMRP

        // NEWUR

        // STATUS

        // RETNQTY

        // KEMODISC

        // PATSALE

        // ORGAN

        // OLDRQ

        // DRID

        // MFRCODE

        // COMBCODE

        // GENCODE

        // STRENGTH

        // UNIT

        // FORMULARY

        // STOCK

        // RACKNO

        // SUPPNAME

        // COMBNAME

        // GENERICNAME

        // REMARK

        // TEMP

        // PACKING

        // PhysQty

        // LedQty

        // id

        // PurValue

        // PSGST

        // PCGST

        // SaleValue

        // SSGST

        // SCGST

        // SaleRate

        // HospID

        // BRNAME

        // OV

        // LATESTOV

        // ITEMTYPE

        // ROWID

        // MOVED

        // NEWTAX

        // HSNCODE

        // OLDTAX

        // BRCODE
        $this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
        $this->BRCODE->ViewValue = FormatNumber($this->BRCODE->ViewValue, 0, -2, -2, -2);
        $this->BRCODE->ViewCustomAttributes = "";

        // PRC
        $this->PRC->ViewValue = $this->PRC->CurrentValue;
        $this->PRC->ViewCustomAttributes = "";

        // TYPE
        $this->TYPE->ViewValue = $this->TYPE->CurrentValue;
        $this->TYPE->ViewCustomAttributes = "";

        // DES
        $this->DES->ViewValue = $this->DES->CurrentValue;
        $this->DES->ViewCustomAttributes = "";

        // UM
        $this->UM->ViewValue = $this->UM->CurrentValue;
        $this->UM->ViewCustomAttributes = "";

        // RT
        $this->RT->ViewValue = $this->RT->CurrentValue;
        $this->RT->ViewValue = FormatNumber($this->RT->ViewValue, 2, -2, -2, -2);
        $this->RT->ViewCustomAttributes = "";

        // UR
        $this->UR->ViewValue = $this->UR->CurrentValue;
        $this->UR->ViewValue = FormatNumber($this->UR->ViewValue, 2, -2, -2, -2);
        $this->UR->ViewCustomAttributes = "";

        // TAXP
        $this->TAXP->ViewValue = $this->TAXP->CurrentValue;
        $this->TAXP->ViewValue = FormatNumber($this->TAXP->ViewValue, 2, -2, -2, -2);
        $this->TAXP->ViewCustomAttributes = "";

        // BATCHNO
        $this->BATCHNO->ViewValue = $this->BATCHNO->CurrentValue;
        $this->BATCHNO->ViewCustomAttributes = "";

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

        // SALQTY
        $this->SALQTY->ViewValue = $this->SALQTY->CurrentValue;
        $this->SALQTY->ViewValue = FormatNumber($this->SALQTY->ViewValue, 2, -2, -2, -2);
        $this->SALQTY->ViewCustomAttributes = "";

        // LASTPURDT
        $this->LASTPURDT->ViewValue = $this->LASTPURDT->CurrentValue;
        $this->LASTPURDT->ViewValue = FormatDateTime($this->LASTPURDT->ViewValue, 0);
        $this->LASTPURDT->ViewCustomAttributes = "";

        // LASTSUPP
        $this->LASTSUPP->ViewValue = $this->LASTSUPP->CurrentValue;
        $this->LASTSUPP->ViewCustomAttributes = "";

        // GENNAME
        $this->GENNAME->ViewValue = $this->GENNAME->CurrentValue;
        $this->GENNAME->ViewCustomAttributes = "";

        // LASTISSDT
        $this->LASTISSDT->ViewValue = $this->LASTISSDT->CurrentValue;
        $this->LASTISSDT->ViewValue = FormatDateTime($this->LASTISSDT->ViewValue, 0);
        $this->LASTISSDT->ViewCustomAttributes = "";

        // CREATEDDT
        $this->CREATEDDT->ViewValue = $this->CREATEDDT->CurrentValue;
        $this->CREATEDDT->ViewValue = FormatDateTime($this->CREATEDDT->ViewValue, 0);
        $this->CREATEDDT->ViewCustomAttributes = "";

        // OPPRC
        $this->OPPRC->ViewValue = $this->OPPRC->CurrentValue;
        $this->OPPRC->ViewCustomAttributes = "";

        // RESTRICT
        $this->RESTRICT->ViewValue = $this->RESTRICT->CurrentValue;
        $this->RESTRICT->ViewCustomAttributes = "";

        // BAWAPRC
        $this->BAWAPRC->ViewValue = $this->BAWAPRC->CurrentValue;
        $this->BAWAPRC->ViewCustomAttributes = "";

        // STAXPER
        $this->STAXPER->ViewValue = $this->STAXPER->CurrentValue;
        $this->STAXPER->ViewValue = FormatNumber($this->STAXPER->ViewValue, 2, -2, -2, -2);
        $this->STAXPER->ViewCustomAttributes = "";

        // TAXTYPE
        $this->TAXTYPE->ViewValue = $this->TAXTYPE->CurrentValue;
        $this->TAXTYPE->ViewCustomAttributes = "";

        // OLDTAXP
        $this->OLDTAXP->ViewValue = $this->OLDTAXP->CurrentValue;
        $this->OLDTAXP->ViewValue = FormatNumber($this->OLDTAXP->ViewValue, 2, -2, -2, -2);
        $this->OLDTAXP->ViewCustomAttributes = "";

        // TAXUPD
        $this->TAXUPD->ViewValue = $this->TAXUPD->CurrentValue;
        $this->TAXUPD->ViewCustomAttributes = "";

        // PACKAGE
        $this->PACKAGE->ViewValue = $this->PACKAGE->CurrentValue;
        $this->PACKAGE->ViewCustomAttributes = "";

        // NEWRT
        $this->NEWRT->ViewValue = $this->NEWRT->CurrentValue;
        $this->NEWRT->ViewValue = FormatNumber($this->NEWRT->ViewValue, 2, -2, -2, -2);
        $this->NEWRT->ViewCustomAttributes = "";

        // NEWMRP
        $this->NEWMRP->ViewValue = $this->NEWMRP->CurrentValue;
        $this->NEWMRP->ViewValue = FormatNumber($this->NEWMRP->ViewValue, 2, -2, -2, -2);
        $this->NEWMRP->ViewCustomAttributes = "";

        // NEWUR
        $this->NEWUR->ViewValue = $this->NEWUR->CurrentValue;
        $this->NEWUR->ViewValue = FormatNumber($this->NEWUR->ViewValue, 2, -2, -2, -2);
        $this->NEWUR->ViewCustomAttributes = "";

        // STATUS
        $this->STATUS->ViewValue = $this->STATUS->CurrentValue;
        $this->STATUS->ViewCustomAttributes = "";

        // RETNQTY
        $this->RETNQTY->ViewValue = $this->RETNQTY->CurrentValue;
        $this->RETNQTY->ViewValue = FormatNumber($this->RETNQTY->ViewValue, 2, -2, -2, -2);
        $this->RETNQTY->ViewCustomAttributes = "";

        // KEMODISC
        $this->KEMODISC->ViewValue = $this->KEMODISC->CurrentValue;
        $this->KEMODISC->ViewCustomAttributes = "";

        // PATSALE
        $this->PATSALE->ViewValue = $this->PATSALE->CurrentValue;
        $this->PATSALE->ViewValue = FormatNumber($this->PATSALE->ViewValue, 2, -2, -2, -2);
        $this->PATSALE->ViewCustomAttributes = "";

        // ORGAN
        $this->ORGAN->ViewValue = $this->ORGAN->CurrentValue;
        $this->ORGAN->ViewCustomAttributes = "";

        // OLDRQ
        $this->OLDRQ->ViewValue = $this->OLDRQ->CurrentValue;
        $this->OLDRQ->ViewValue = FormatNumber($this->OLDRQ->ViewValue, 2, -2, -2, -2);
        $this->OLDRQ->ViewCustomAttributes = "";

        // DRID
        $this->DRID->ViewValue = $this->DRID->CurrentValue;
        $this->DRID->ViewCustomAttributes = "";

        // MFRCODE
        $this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
        $this->MFRCODE->ViewCustomAttributes = "";

        // COMBCODE
        $this->COMBCODE->ViewValue = $this->COMBCODE->CurrentValue;
        $this->COMBCODE->ViewCustomAttributes = "";

        // GENCODE
        $this->GENCODE->ViewValue = $this->GENCODE->CurrentValue;
        $this->GENCODE->ViewCustomAttributes = "";

        // STRENGTH
        $this->STRENGTH->ViewValue = $this->STRENGTH->CurrentValue;
        $this->STRENGTH->ViewValue = FormatNumber($this->STRENGTH->ViewValue, 2, -2, -2, -2);
        $this->STRENGTH->ViewCustomAttributes = "";

        // UNIT
        $this->UNIT->ViewValue = $this->UNIT->CurrentValue;
        $this->UNIT->ViewCustomAttributes = "";

        // FORMULARY
        $this->FORMULARY->ViewValue = $this->FORMULARY->CurrentValue;
        $this->FORMULARY->ViewCustomAttributes = "";

        // STOCK
        $this->STOCK->ViewValue = $this->STOCK->CurrentValue;
        $this->STOCK->ViewValue = FormatNumber($this->STOCK->ViewValue, 2, -2, -2, -2);
        $this->STOCK->ViewCustomAttributes = "";

        // RACKNO
        $this->RACKNO->ViewValue = $this->RACKNO->CurrentValue;
        $this->RACKNO->ViewCustomAttributes = "";

        // SUPPNAME
        $this->SUPPNAME->ViewValue = $this->SUPPNAME->CurrentValue;
        $this->SUPPNAME->ViewCustomAttributes = "";

        // COMBNAME
        $this->COMBNAME->ViewValue = $this->COMBNAME->CurrentValue;
        $this->COMBNAME->ViewCustomAttributes = "";

        // GENERICNAME
        $this->GENERICNAME->ViewValue = $this->GENERICNAME->CurrentValue;
        $this->GENERICNAME->ViewCustomAttributes = "";

        // REMARK
        $this->REMARK->ViewValue = $this->REMARK->CurrentValue;
        $this->REMARK->ViewCustomAttributes = "";

        // TEMP
        $this->TEMP->ViewValue = $this->TEMP->CurrentValue;
        $this->TEMP->ViewCustomAttributes = "";

        // PACKING
        $this->PACKING->ViewValue = $this->PACKING->CurrentValue;
        $this->PACKING->ViewValue = FormatNumber($this->PACKING->ViewValue, 2, -2, -2, -2);
        $this->PACKING->ViewCustomAttributes = "";

        // PhysQty
        $this->PhysQty->ViewValue = $this->PhysQty->CurrentValue;
        $this->PhysQty->ViewValue = FormatNumber($this->PhysQty->ViewValue, 2, -2, -2, -2);
        $this->PhysQty->ViewCustomAttributes = "";

        // LedQty
        $this->LedQty->ViewValue = $this->LedQty->CurrentValue;
        $this->LedQty->ViewValue = FormatNumber($this->LedQty->ViewValue, 2, -2, -2, -2);
        $this->LedQty->ViewCustomAttributes = "";

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // PurValue
        $this->PurValue->ViewValue = $this->PurValue->CurrentValue;
        $this->PurValue->ViewValue = FormatNumber($this->PurValue->ViewValue, 2, -2, -2, -2);
        $this->PurValue->ViewCustomAttributes = "";

        // PSGST
        $this->PSGST->ViewValue = $this->PSGST->CurrentValue;
        $this->PSGST->ViewValue = FormatNumber($this->PSGST->ViewValue, 2, -2, -2, -2);
        $this->PSGST->ViewCustomAttributes = "";

        // PCGST
        $this->PCGST->ViewValue = $this->PCGST->CurrentValue;
        $this->PCGST->ViewValue = FormatNumber($this->PCGST->ViewValue, 2, -2, -2, -2);
        $this->PCGST->ViewCustomAttributes = "";

        // SaleValue
        $this->SaleValue->ViewValue = $this->SaleValue->CurrentValue;
        $this->SaleValue->ViewValue = FormatNumber($this->SaleValue->ViewValue, 2, -2, -2, -2);
        $this->SaleValue->ViewCustomAttributes = "";

        // SSGST
        $this->SSGST->ViewValue = $this->SSGST->CurrentValue;
        $this->SSGST->ViewValue = FormatNumber($this->SSGST->ViewValue, 2, -2, -2, -2);
        $this->SSGST->ViewCustomAttributes = "";

        // SCGST
        $this->SCGST->ViewValue = $this->SCGST->CurrentValue;
        $this->SCGST->ViewValue = FormatNumber($this->SCGST->ViewValue, 2, -2, -2, -2);
        $this->SCGST->ViewCustomAttributes = "";

        // SaleRate
        $this->SaleRate->ViewValue = $this->SaleRate->CurrentValue;
        $this->SaleRate->ViewValue = FormatNumber($this->SaleRate->ViewValue, 2, -2, -2, -2);
        $this->SaleRate->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

        // BRNAME
        $this->BRNAME->ViewValue = $this->BRNAME->CurrentValue;
        $this->BRNAME->ViewCustomAttributes = "";

        // OV
        $this->OV->ViewValue = $this->OV->CurrentValue;
        $this->OV->ViewValue = FormatNumber($this->OV->ViewValue, 2, -2, -2, -2);
        $this->OV->ViewCustomAttributes = "";

        // LATESTOV
        $this->LATESTOV->ViewValue = $this->LATESTOV->CurrentValue;
        $this->LATESTOV->ViewValue = FormatNumber($this->LATESTOV->ViewValue, 2, -2, -2, -2);
        $this->LATESTOV->ViewCustomAttributes = "";

        // ITEMTYPE
        $this->ITEMTYPE->ViewValue = $this->ITEMTYPE->CurrentValue;
        $this->ITEMTYPE->ViewCustomAttributes = "";

        // ROWID
        $this->ROWID->ViewValue = $this->ROWID->CurrentValue;
        $this->ROWID->ViewCustomAttributes = "";

        // MOVED
        $this->MOVED->ViewValue = $this->MOVED->CurrentValue;
        $this->MOVED->ViewValue = FormatNumber($this->MOVED->ViewValue, 0, -2, -2, -2);
        $this->MOVED->ViewCustomAttributes = "";

        // NEWTAX
        $this->NEWTAX->ViewValue = $this->NEWTAX->CurrentValue;
        $this->NEWTAX->ViewValue = FormatNumber($this->NEWTAX->ViewValue, 2, -2, -2, -2);
        $this->NEWTAX->ViewCustomAttributes = "";

        // HSNCODE
        $this->HSNCODE->ViewValue = $this->HSNCODE->CurrentValue;
        $this->HSNCODE->ViewCustomAttributes = "";

        // OLDTAX
        $this->OLDTAX->ViewValue = $this->OLDTAX->CurrentValue;
        $this->OLDTAX->ViewValue = FormatNumber($this->OLDTAX->ViewValue, 2, -2, -2, -2);
        $this->OLDTAX->ViewCustomAttributes = "";

        // BRCODE
        $this->BRCODE->LinkCustomAttributes = "";
        $this->BRCODE->HrefValue = "";
        $this->BRCODE->TooltipValue = "";

        // PRC
        $this->PRC->LinkCustomAttributes = "";
        $this->PRC->HrefValue = "";
        $this->PRC->TooltipValue = "";

        // TYPE
        $this->TYPE->LinkCustomAttributes = "";
        $this->TYPE->HrefValue = "";
        $this->TYPE->TooltipValue = "";

        // DES
        $this->DES->LinkCustomAttributes = "";
        $this->DES->HrefValue = "";
        $this->DES->TooltipValue = "";

        // UM
        $this->UM->LinkCustomAttributes = "";
        $this->UM->HrefValue = "";
        $this->UM->TooltipValue = "";

        // RT
        $this->RT->LinkCustomAttributes = "";
        $this->RT->HrefValue = "";
        $this->RT->TooltipValue = "";

        // UR
        $this->UR->LinkCustomAttributes = "";
        $this->UR->HrefValue = "";
        $this->UR->TooltipValue = "";

        // TAXP
        $this->TAXP->LinkCustomAttributes = "";
        $this->TAXP->HrefValue = "";
        $this->TAXP->TooltipValue = "";

        // BATCHNO
        $this->BATCHNO->LinkCustomAttributes = "";
        $this->BATCHNO->HrefValue = "";
        $this->BATCHNO->TooltipValue = "";

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

        // SALQTY
        $this->SALQTY->LinkCustomAttributes = "";
        $this->SALQTY->HrefValue = "";
        $this->SALQTY->TooltipValue = "";

        // LASTPURDT
        $this->LASTPURDT->LinkCustomAttributes = "";
        $this->LASTPURDT->HrefValue = "";
        $this->LASTPURDT->TooltipValue = "";

        // LASTSUPP
        $this->LASTSUPP->LinkCustomAttributes = "";
        $this->LASTSUPP->HrefValue = "";
        $this->LASTSUPP->TooltipValue = "";

        // GENNAME
        $this->GENNAME->LinkCustomAttributes = "";
        $this->GENNAME->HrefValue = "";
        $this->GENNAME->TooltipValue = "";

        // LASTISSDT
        $this->LASTISSDT->LinkCustomAttributes = "";
        $this->LASTISSDT->HrefValue = "";
        $this->LASTISSDT->TooltipValue = "";

        // CREATEDDT
        $this->CREATEDDT->LinkCustomAttributes = "";
        $this->CREATEDDT->HrefValue = "";
        $this->CREATEDDT->TooltipValue = "";

        // OPPRC
        $this->OPPRC->LinkCustomAttributes = "";
        $this->OPPRC->HrefValue = "";
        $this->OPPRC->TooltipValue = "";

        // RESTRICT
        $this->RESTRICT->LinkCustomAttributes = "";
        $this->RESTRICT->HrefValue = "";
        $this->RESTRICT->TooltipValue = "";

        // BAWAPRC
        $this->BAWAPRC->LinkCustomAttributes = "";
        $this->BAWAPRC->HrefValue = "";
        $this->BAWAPRC->TooltipValue = "";

        // STAXPER
        $this->STAXPER->LinkCustomAttributes = "";
        $this->STAXPER->HrefValue = "";
        $this->STAXPER->TooltipValue = "";

        // TAXTYPE
        $this->TAXTYPE->LinkCustomAttributes = "";
        $this->TAXTYPE->HrefValue = "";
        $this->TAXTYPE->TooltipValue = "";

        // OLDTAXP
        $this->OLDTAXP->LinkCustomAttributes = "";
        $this->OLDTAXP->HrefValue = "";
        $this->OLDTAXP->TooltipValue = "";

        // TAXUPD
        $this->TAXUPD->LinkCustomAttributes = "";
        $this->TAXUPD->HrefValue = "";
        $this->TAXUPD->TooltipValue = "";

        // PACKAGE
        $this->PACKAGE->LinkCustomAttributes = "";
        $this->PACKAGE->HrefValue = "";
        $this->PACKAGE->TooltipValue = "";

        // NEWRT
        $this->NEWRT->LinkCustomAttributes = "";
        $this->NEWRT->HrefValue = "";
        $this->NEWRT->TooltipValue = "";

        // NEWMRP
        $this->NEWMRP->LinkCustomAttributes = "";
        $this->NEWMRP->HrefValue = "";
        $this->NEWMRP->TooltipValue = "";

        // NEWUR
        $this->NEWUR->LinkCustomAttributes = "";
        $this->NEWUR->HrefValue = "";
        $this->NEWUR->TooltipValue = "";

        // STATUS
        $this->STATUS->LinkCustomAttributes = "";
        $this->STATUS->HrefValue = "";
        $this->STATUS->TooltipValue = "";

        // RETNQTY
        $this->RETNQTY->LinkCustomAttributes = "";
        $this->RETNQTY->HrefValue = "";
        $this->RETNQTY->TooltipValue = "";

        // KEMODISC
        $this->KEMODISC->LinkCustomAttributes = "";
        $this->KEMODISC->HrefValue = "";
        $this->KEMODISC->TooltipValue = "";

        // PATSALE
        $this->PATSALE->LinkCustomAttributes = "";
        $this->PATSALE->HrefValue = "";
        $this->PATSALE->TooltipValue = "";

        // ORGAN
        $this->ORGAN->LinkCustomAttributes = "";
        $this->ORGAN->HrefValue = "";
        $this->ORGAN->TooltipValue = "";

        // OLDRQ
        $this->OLDRQ->LinkCustomAttributes = "";
        $this->OLDRQ->HrefValue = "";
        $this->OLDRQ->TooltipValue = "";

        // DRID
        $this->DRID->LinkCustomAttributes = "";
        $this->DRID->HrefValue = "";
        $this->DRID->TooltipValue = "";

        // MFRCODE
        $this->MFRCODE->LinkCustomAttributes = "";
        $this->MFRCODE->HrefValue = "";
        $this->MFRCODE->TooltipValue = "";

        // COMBCODE
        $this->COMBCODE->LinkCustomAttributes = "";
        $this->COMBCODE->HrefValue = "";
        $this->COMBCODE->TooltipValue = "";

        // GENCODE
        $this->GENCODE->LinkCustomAttributes = "";
        $this->GENCODE->HrefValue = "";
        $this->GENCODE->TooltipValue = "";

        // STRENGTH
        $this->STRENGTH->LinkCustomAttributes = "";
        $this->STRENGTH->HrefValue = "";
        $this->STRENGTH->TooltipValue = "";

        // UNIT
        $this->UNIT->LinkCustomAttributes = "";
        $this->UNIT->HrefValue = "";
        $this->UNIT->TooltipValue = "";

        // FORMULARY
        $this->FORMULARY->LinkCustomAttributes = "";
        $this->FORMULARY->HrefValue = "";
        $this->FORMULARY->TooltipValue = "";

        // STOCK
        $this->STOCK->LinkCustomAttributes = "";
        $this->STOCK->HrefValue = "";
        $this->STOCK->TooltipValue = "";

        // RACKNO
        $this->RACKNO->LinkCustomAttributes = "";
        $this->RACKNO->HrefValue = "";
        $this->RACKNO->TooltipValue = "";

        // SUPPNAME
        $this->SUPPNAME->LinkCustomAttributes = "";
        $this->SUPPNAME->HrefValue = "";
        $this->SUPPNAME->TooltipValue = "";

        // COMBNAME
        $this->COMBNAME->LinkCustomAttributes = "";
        $this->COMBNAME->HrefValue = "";
        $this->COMBNAME->TooltipValue = "";

        // GENERICNAME
        $this->GENERICNAME->LinkCustomAttributes = "";
        $this->GENERICNAME->HrefValue = "";
        $this->GENERICNAME->TooltipValue = "";

        // REMARK
        $this->REMARK->LinkCustomAttributes = "";
        $this->REMARK->HrefValue = "";
        $this->REMARK->TooltipValue = "";

        // TEMP
        $this->TEMP->LinkCustomAttributes = "";
        $this->TEMP->HrefValue = "";
        $this->TEMP->TooltipValue = "";

        // PACKING
        $this->PACKING->LinkCustomAttributes = "";
        $this->PACKING->HrefValue = "";
        $this->PACKING->TooltipValue = "";

        // PhysQty
        $this->PhysQty->LinkCustomAttributes = "";
        $this->PhysQty->HrefValue = "";
        $this->PhysQty->TooltipValue = "";

        // LedQty
        $this->LedQty->LinkCustomAttributes = "";
        $this->LedQty->HrefValue = "";
        $this->LedQty->TooltipValue = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // PurValue
        $this->PurValue->LinkCustomAttributes = "";
        $this->PurValue->HrefValue = "";
        $this->PurValue->TooltipValue = "";

        // PSGST
        $this->PSGST->LinkCustomAttributes = "";
        $this->PSGST->HrefValue = "";
        $this->PSGST->TooltipValue = "";

        // PCGST
        $this->PCGST->LinkCustomAttributes = "";
        $this->PCGST->HrefValue = "";
        $this->PCGST->TooltipValue = "";

        // SaleValue
        $this->SaleValue->LinkCustomAttributes = "";
        $this->SaleValue->HrefValue = "";
        $this->SaleValue->TooltipValue = "";

        // SSGST
        $this->SSGST->LinkCustomAttributes = "";
        $this->SSGST->HrefValue = "";
        $this->SSGST->TooltipValue = "";

        // SCGST
        $this->SCGST->LinkCustomAttributes = "";
        $this->SCGST->HrefValue = "";
        $this->SCGST->TooltipValue = "";

        // SaleRate
        $this->SaleRate->LinkCustomAttributes = "";
        $this->SaleRate->HrefValue = "";
        $this->SaleRate->TooltipValue = "";

        // HospID
        $this->HospID->LinkCustomAttributes = "";
        $this->HospID->HrefValue = "";
        $this->HospID->TooltipValue = "";

        // BRNAME
        $this->BRNAME->LinkCustomAttributes = "";
        $this->BRNAME->HrefValue = "";
        $this->BRNAME->TooltipValue = "";

        // OV
        $this->OV->LinkCustomAttributes = "";
        $this->OV->HrefValue = "";
        $this->OV->TooltipValue = "";

        // LATESTOV
        $this->LATESTOV->LinkCustomAttributes = "";
        $this->LATESTOV->HrefValue = "";
        $this->LATESTOV->TooltipValue = "";

        // ITEMTYPE
        $this->ITEMTYPE->LinkCustomAttributes = "";
        $this->ITEMTYPE->HrefValue = "";
        $this->ITEMTYPE->TooltipValue = "";

        // ROWID
        $this->ROWID->LinkCustomAttributes = "";
        $this->ROWID->HrefValue = "";
        $this->ROWID->TooltipValue = "";

        // MOVED
        $this->MOVED->LinkCustomAttributes = "";
        $this->MOVED->HrefValue = "";
        $this->MOVED->TooltipValue = "";

        // NEWTAX
        $this->NEWTAX->LinkCustomAttributes = "";
        $this->NEWTAX->HrefValue = "";
        $this->NEWTAX->TooltipValue = "";

        // HSNCODE
        $this->HSNCODE->LinkCustomAttributes = "";
        $this->HSNCODE->HrefValue = "";
        $this->HSNCODE->TooltipValue = "";

        // OLDTAX
        $this->OLDTAX->LinkCustomAttributes = "";
        $this->OLDTAX->HrefValue = "";
        $this->OLDTAX->TooltipValue = "";

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

        // PRC
        $this->PRC->EditAttrs["class"] = "form-control";
        $this->PRC->EditCustomAttributes = "";
        if (!$this->PRC->Raw) {
            $this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
        }
        $this->PRC->EditValue = $this->PRC->CurrentValue;
        $this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

        // TYPE
        $this->TYPE->EditAttrs["class"] = "form-control";
        $this->TYPE->EditCustomAttributes = "";
        if (!$this->TYPE->Raw) {
            $this->TYPE->CurrentValue = HtmlDecode($this->TYPE->CurrentValue);
        }
        $this->TYPE->EditValue = $this->TYPE->CurrentValue;
        $this->TYPE->PlaceHolder = RemoveHtml($this->TYPE->caption());

        // DES
        $this->DES->EditAttrs["class"] = "form-control";
        $this->DES->EditCustomAttributes = "";
        if (!$this->DES->Raw) {
            $this->DES->CurrentValue = HtmlDecode($this->DES->CurrentValue);
        }
        $this->DES->EditValue = $this->DES->CurrentValue;
        $this->DES->PlaceHolder = RemoveHtml($this->DES->caption());

        // UM
        $this->UM->EditAttrs["class"] = "form-control";
        $this->UM->EditCustomAttributes = "";
        if (!$this->UM->Raw) {
            $this->UM->CurrentValue = HtmlDecode($this->UM->CurrentValue);
        }
        $this->UM->EditValue = $this->UM->CurrentValue;
        $this->UM->PlaceHolder = RemoveHtml($this->UM->caption());

        // RT
        $this->RT->EditAttrs["class"] = "form-control";
        $this->RT->EditCustomAttributes = "";
        $this->RT->EditValue = $this->RT->CurrentValue;
        $this->RT->PlaceHolder = RemoveHtml($this->RT->caption());
        if (strval($this->RT->EditValue) != "" && is_numeric($this->RT->EditValue)) {
            $this->RT->EditValue = FormatNumber($this->RT->EditValue, -2, -2, -2, -2);
        }

        // UR
        $this->UR->EditAttrs["class"] = "form-control";
        $this->UR->EditCustomAttributes = "";
        $this->UR->EditValue = $this->UR->CurrentValue;
        $this->UR->PlaceHolder = RemoveHtml($this->UR->caption());
        if (strval($this->UR->EditValue) != "" && is_numeric($this->UR->EditValue)) {
            $this->UR->EditValue = FormatNumber($this->UR->EditValue, -2, -2, -2, -2);
        }

        // TAXP
        $this->TAXP->EditAttrs["class"] = "form-control";
        $this->TAXP->EditCustomAttributes = "";
        $this->TAXP->EditValue = $this->TAXP->CurrentValue;
        $this->TAXP->PlaceHolder = RemoveHtml($this->TAXP->caption());
        if (strval($this->TAXP->EditValue) != "" && is_numeric($this->TAXP->EditValue)) {
            $this->TAXP->EditValue = FormatNumber($this->TAXP->EditValue, -2, -2, -2, -2);
        }

        // BATCHNO
        $this->BATCHNO->EditAttrs["class"] = "form-control";
        $this->BATCHNO->EditCustomAttributes = "";
        if (!$this->BATCHNO->Raw) {
            $this->BATCHNO->CurrentValue = HtmlDecode($this->BATCHNO->CurrentValue);
        }
        $this->BATCHNO->EditValue = $this->BATCHNO->CurrentValue;
        $this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

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

        // SALQTY
        $this->SALQTY->EditAttrs["class"] = "form-control";
        $this->SALQTY->EditCustomAttributes = "";
        $this->SALQTY->EditValue = $this->SALQTY->CurrentValue;
        $this->SALQTY->PlaceHolder = RemoveHtml($this->SALQTY->caption());
        if (strval($this->SALQTY->EditValue) != "" && is_numeric($this->SALQTY->EditValue)) {
            $this->SALQTY->EditValue = FormatNumber($this->SALQTY->EditValue, -2, -2, -2, -2);
        }

        // LASTPURDT
        $this->LASTPURDT->EditAttrs["class"] = "form-control";
        $this->LASTPURDT->EditCustomAttributes = "";
        $this->LASTPURDT->EditValue = FormatDateTime($this->LASTPURDT->CurrentValue, 8);
        $this->LASTPURDT->PlaceHolder = RemoveHtml($this->LASTPURDT->caption());

        // LASTSUPP
        $this->LASTSUPP->EditAttrs["class"] = "form-control";
        $this->LASTSUPP->EditCustomAttributes = "";
        if (!$this->LASTSUPP->Raw) {
            $this->LASTSUPP->CurrentValue = HtmlDecode($this->LASTSUPP->CurrentValue);
        }
        $this->LASTSUPP->EditValue = $this->LASTSUPP->CurrentValue;
        $this->LASTSUPP->PlaceHolder = RemoveHtml($this->LASTSUPP->caption());

        // GENNAME
        $this->GENNAME->EditAttrs["class"] = "form-control";
        $this->GENNAME->EditCustomAttributes = "";
        if (!$this->GENNAME->Raw) {
            $this->GENNAME->CurrentValue = HtmlDecode($this->GENNAME->CurrentValue);
        }
        $this->GENNAME->EditValue = $this->GENNAME->CurrentValue;
        $this->GENNAME->PlaceHolder = RemoveHtml($this->GENNAME->caption());

        // LASTISSDT
        $this->LASTISSDT->EditAttrs["class"] = "form-control";
        $this->LASTISSDT->EditCustomAttributes = "";
        $this->LASTISSDT->EditValue = FormatDateTime($this->LASTISSDT->CurrentValue, 8);
        $this->LASTISSDT->PlaceHolder = RemoveHtml($this->LASTISSDT->caption());

        // CREATEDDT
        $this->CREATEDDT->EditAttrs["class"] = "form-control";
        $this->CREATEDDT->EditCustomAttributes = "";
        $this->CREATEDDT->EditValue = FormatDateTime($this->CREATEDDT->CurrentValue, 8);
        $this->CREATEDDT->PlaceHolder = RemoveHtml($this->CREATEDDT->caption());

        // OPPRC
        $this->OPPRC->EditAttrs["class"] = "form-control";
        $this->OPPRC->EditCustomAttributes = "";
        if (!$this->OPPRC->Raw) {
            $this->OPPRC->CurrentValue = HtmlDecode($this->OPPRC->CurrentValue);
        }
        $this->OPPRC->EditValue = $this->OPPRC->CurrentValue;
        $this->OPPRC->PlaceHolder = RemoveHtml($this->OPPRC->caption());

        // RESTRICT
        $this->RESTRICT->EditAttrs["class"] = "form-control";
        $this->RESTRICT->EditCustomAttributes = "";
        if (!$this->RESTRICT->Raw) {
            $this->RESTRICT->CurrentValue = HtmlDecode($this->RESTRICT->CurrentValue);
        }
        $this->RESTRICT->EditValue = $this->RESTRICT->CurrentValue;
        $this->RESTRICT->PlaceHolder = RemoveHtml($this->RESTRICT->caption());

        // BAWAPRC
        $this->BAWAPRC->EditAttrs["class"] = "form-control";
        $this->BAWAPRC->EditCustomAttributes = "";
        if (!$this->BAWAPRC->Raw) {
            $this->BAWAPRC->CurrentValue = HtmlDecode($this->BAWAPRC->CurrentValue);
        }
        $this->BAWAPRC->EditValue = $this->BAWAPRC->CurrentValue;
        $this->BAWAPRC->PlaceHolder = RemoveHtml($this->BAWAPRC->caption());

        // STAXPER
        $this->STAXPER->EditAttrs["class"] = "form-control";
        $this->STAXPER->EditCustomAttributes = "";
        $this->STAXPER->EditValue = $this->STAXPER->CurrentValue;
        $this->STAXPER->PlaceHolder = RemoveHtml($this->STAXPER->caption());
        if (strval($this->STAXPER->EditValue) != "" && is_numeric($this->STAXPER->EditValue)) {
            $this->STAXPER->EditValue = FormatNumber($this->STAXPER->EditValue, -2, -2, -2, -2);
        }

        // TAXTYPE
        $this->TAXTYPE->EditAttrs["class"] = "form-control";
        $this->TAXTYPE->EditCustomAttributes = "";
        if (!$this->TAXTYPE->Raw) {
            $this->TAXTYPE->CurrentValue = HtmlDecode($this->TAXTYPE->CurrentValue);
        }
        $this->TAXTYPE->EditValue = $this->TAXTYPE->CurrentValue;
        $this->TAXTYPE->PlaceHolder = RemoveHtml($this->TAXTYPE->caption());

        // OLDTAXP
        $this->OLDTAXP->EditAttrs["class"] = "form-control";
        $this->OLDTAXP->EditCustomAttributes = "";
        $this->OLDTAXP->EditValue = $this->OLDTAXP->CurrentValue;
        $this->OLDTAXP->PlaceHolder = RemoveHtml($this->OLDTAXP->caption());
        if (strval($this->OLDTAXP->EditValue) != "" && is_numeric($this->OLDTAXP->EditValue)) {
            $this->OLDTAXP->EditValue = FormatNumber($this->OLDTAXP->EditValue, -2, -2, -2, -2);
        }

        // TAXUPD
        $this->TAXUPD->EditAttrs["class"] = "form-control";
        $this->TAXUPD->EditCustomAttributes = "";
        if (!$this->TAXUPD->Raw) {
            $this->TAXUPD->CurrentValue = HtmlDecode($this->TAXUPD->CurrentValue);
        }
        $this->TAXUPD->EditValue = $this->TAXUPD->CurrentValue;
        $this->TAXUPD->PlaceHolder = RemoveHtml($this->TAXUPD->caption());

        // PACKAGE
        $this->PACKAGE->EditAttrs["class"] = "form-control";
        $this->PACKAGE->EditCustomAttributes = "";
        if (!$this->PACKAGE->Raw) {
            $this->PACKAGE->CurrentValue = HtmlDecode($this->PACKAGE->CurrentValue);
        }
        $this->PACKAGE->EditValue = $this->PACKAGE->CurrentValue;
        $this->PACKAGE->PlaceHolder = RemoveHtml($this->PACKAGE->caption());

        // NEWRT
        $this->NEWRT->EditAttrs["class"] = "form-control";
        $this->NEWRT->EditCustomAttributes = "";
        $this->NEWRT->EditValue = $this->NEWRT->CurrentValue;
        $this->NEWRT->PlaceHolder = RemoveHtml($this->NEWRT->caption());
        if (strval($this->NEWRT->EditValue) != "" && is_numeric($this->NEWRT->EditValue)) {
            $this->NEWRT->EditValue = FormatNumber($this->NEWRT->EditValue, -2, -2, -2, -2);
        }

        // NEWMRP
        $this->NEWMRP->EditAttrs["class"] = "form-control";
        $this->NEWMRP->EditCustomAttributes = "";
        $this->NEWMRP->EditValue = $this->NEWMRP->CurrentValue;
        $this->NEWMRP->PlaceHolder = RemoveHtml($this->NEWMRP->caption());
        if (strval($this->NEWMRP->EditValue) != "" && is_numeric($this->NEWMRP->EditValue)) {
            $this->NEWMRP->EditValue = FormatNumber($this->NEWMRP->EditValue, -2, -2, -2, -2);
        }

        // NEWUR
        $this->NEWUR->EditAttrs["class"] = "form-control";
        $this->NEWUR->EditCustomAttributes = "";
        $this->NEWUR->EditValue = $this->NEWUR->CurrentValue;
        $this->NEWUR->PlaceHolder = RemoveHtml($this->NEWUR->caption());
        if (strval($this->NEWUR->EditValue) != "" && is_numeric($this->NEWUR->EditValue)) {
            $this->NEWUR->EditValue = FormatNumber($this->NEWUR->EditValue, -2, -2, -2, -2);
        }

        // STATUS
        $this->STATUS->EditAttrs["class"] = "form-control";
        $this->STATUS->EditCustomAttributes = "";
        if (!$this->STATUS->Raw) {
            $this->STATUS->CurrentValue = HtmlDecode($this->STATUS->CurrentValue);
        }
        $this->STATUS->EditValue = $this->STATUS->CurrentValue;
        $this->STATUS->PlaceHolder = RemoveHtml($this->STATUS->caption());

        // RETNQTY
        $this->RETNQTY->EditAttrs["class"] = "form-control";
        $this->RETNQTY->EditCustomAttributes = "";
        $this->RETNQTY->EditValue = $this->RETNQTY->CurrentValue;
        $this->RETNQTY->PlaceHolder = RemoveHtml($this->RETNQTY->caption());
        if (strval($this->RETNQTY->EditValue) != "" && is_numeric($this->RETNQTY->EditValue)) {
            $this->RETNQTY->EditValue = FormatNumber($this->RETNQTY->EditValue, -2, -2, -2, -2);
        }

        // KEMODISC
        $this->KEMODISC->EditAttrs["class"] = "form-control";
        $this->KEMODISC->EditCustomAttributes = "";
        if (!$this->KEMODISC->Raw) {
            $this->KEMODISC->CurrentValue = HtmlDecode($this->KEMODISC->CurrentValue);
        }
        $this->KEMODISC->EditValue = $this->KEMODISC->CurrentValue;
        $this->KEMODISC->PlaceHolder = RemoveHtml($this->KEMODISC->caption());

        // PATSALE
        $this->PATSALE->EditAttrs["class"] = "form-control";
        $this->PATSALE->EditCustomAttributes = "";
        $this->PATSALE->EditValue = $this->PATSALE->CurrentValue;
        $this->PATSALE->PlaceHolder = RemoveHtml($this->PATSALE->caption());
        if (strval($this->PATSALE->EditValue) != "" && is_numeric($this->PATSALE->EditValue)) {
            $this->PATSALE->EditValue = FormatNumber($this->PATSALE->EditValue, -2, -2, -2, -2);
        }

        // ORGAN
        $this->ORGAN->EditAttrs["class"] = "form-control";
        $this->ORGAN->EditCustomAttributes = "";
        if (!$this->ORGAN->Raw) {
            $this->ORGAN->CurrentValue = HtmlDecode($this->ORGAN->CurrentValue);
        }
        $this->ORGAN->EditValue = $this->ORGAN->CurrentValue;
        $this->ORGAN->PlaceHolder = RemoveHtml($this->ORGAN->caption());

        // OLDRQ
        $this->OLDRQ->EditAttrs["class"] = "form-control";
        $this->OLDRQ->EditCustomAttributes = "";
        $this->OLDRQ->EditValue = $this->OLDRQ->CurrentValue;
        $this->OLDRQ->PlaceHolder = RemoveHtml($this->OLDRQ->caption());
        if (strval($this->OLDRQ->EditValue) != "" && is_numeric($this->OLDRQ->EditValue)) {
            $this->OLDRQ->EditValue = FormatNumber($this->OLDRQ->EditValue, -2, -2, -2, -2);
        }

        // DRID
        $this->DRID->EditAttrs["class"] = "form-control";
        $this->DRID->EditCustomAttributes = "";
        if (!$this->DRID->Raw) {
            $this->DRID->CurrentValue = HtmlDecode($this->DRID->CurrentValue);
        }
        $this->DRID->EditValue = $this->DRID->CurrentValue;
        $this->DRID->PlaceHolder = RemoveHtml($this->DRID->caption());

        // MFRCODE
        $this->MFRCODE->EditAttrs["class"] = "form-control";
        $this->MFRCODE->EditCustomAttributes = "";
        if (!$this->MFRCODE->Raw) {
            $this->MFRCODE->CurrentValue = HtmlDecode($this->MFRCODE->CurrentValue);
        }
        $this->MFRCODE->EditValue = $this->MFRCODE->CurrentValue;
        $this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

        // COMBCODE
        $this->COMBCODE->EditAttrs["class"] = "form-control";
        $this->COMBCODE->EditCustomAttributes = "";
        if (!$this->COMBCODE->Raw) {
            $this->COMBCODE->CurrentValue = HtmlDecode($this->COMBCODE->CurrentValue);
        }
        $this->COMBCODE->EditValue = $this->COMBCODE->CurrentValue;
        $this->COMBCODE->PlaceHolder = RemoveHtml($this->COMBCODE->caption());

        // GENCODE
        $this->GENCODE->EditAttrs["class"] = "form-control";
        $this->GENCODE->EditCustomAttributes = "";
        if (!$this->GENCODE->Raw) {
            $this->GENCODE->CurrentValue = HtmlDecode($this->GENCODE->CurrentValue);
        }
        $this->GENCODE->EditValue = $this->GENCODE->CurrentValue;
        $this->GENCODE->PlaceHolder = RemoveHtml($this->GENCODE->caption());

        // STRENGTH
        $this->STRENGTH->EditAttrs["class"] = "form-control";
        $this->STRENGTH->EditCustomAttributes = "";
        $this->STRENGTH->EditValue = $this->STRENGTH->CurrentValue;
        $this->STRENGTH->PlaceHolder = RemoveHtml($this->STRENGTH->caption());
        if (strval($this->STRENGTH->EditValue) != "" && is_numeric($this->STRENGTH->EditValue)) {
            $this->STRENGTH->EditValue = FormatNumber($this->STRENGTH->EditValue, -2, -2, -2, -2);
        }

        // UNIT
        $this->UNIT->EditAttrs["class"] = "form-control";
        $this->UNIT->EditCustomAttributes = "";
        if (!$this->UNIT->Raw) {
            $this->UNIT->CurrentValue = HtmlDecode($this->UNIT->CurrentValue);
        }
        $this->UNIT->EditValue = $this->UNIT->CurrentValue;
        $this->UNIT->PlaceHolder = RemoveHtml($this->UNIT->caption());

        // FORMULARY
        $this->FORMULARY->EditAttrs["class"] = "form-control";
        $this->FORMULARY->EditCustomAttributes = "";
        if (!$this->FORMULARY->Raw) {
            $this->FORMULARY->CurrentValue = HtmlDecode($this->FORMULARY->CurrentValue);
        }
        $this->FORMULARY->EditValue = $this->FORMULARY->CurrentValue;
        $this->FORMULARY->PlaceHolder = RemoveHtml($this->FORMULARY->caption());

        // STOCK
        $this->STOCK->EditAttrs["class"] = "form-control";
        $this->STOCK->EditCustomAttributes = "";
        $this->STOCK->EditValue = $this->STOCK->CurrentValue;
        $this->STOCK->PlaceHolder = RemoveHtml($this->STOCK->caption());
        if (strval($this->STOCK->EditValue) != "" && is_numeric($this->STOCK->EditValue)) {
            $this->STOCK->EditValue = FormatNumber($this->STOCK->EditValue, -2, -2, -2, -2);
        }

        // RACKNO
        $this->RACKNO->EditAttrs["class"] = "form-control";
        $this->RACKNO->EditCustomAttributes = "";
        if (!$this->RACKNO->Raw) {
            $this->RACKNO->CurrentValue = HtmlDecode($this->RACKNO->CurrentValue);
        }
        $this->RACKNO->EditValue = $this->RACKNO->CurrentValue;
        $this->RACKNO->PlaceHolder = RemoveHtml($this->RACKNO->caption());

        // SUPPNAME
        $this->SUPPNAME->EditAttrs["class"] = "form-control";
        $this->SUPPNAME->EditCustomAttributes = "";
        if (!$this->SUPPNAME->Raw) {
            $this->SUPPNAME->CurrentValue = HtmlDecode($this->SUPPNAME->CurrentValue);
        }
        $this->SUPPNAME->EditValue = $this->SUPPNAME->CurrentValue;
        $this->SUPPNAME->PlaceHolder = RemoveHtml($this->SUPPNAME->caption());

        // COMBNAME
        $this->COMBNAME->EditAttrs["class"] = "form-control";
        $this->COMBNAME->EditCustomAttributes = "";
        if (!$this->COMBNAME->Raw) {
            $this->COMBNAME->CurrentValue = HtmlDecode($this->COMBNAME->CurrentValue);
        }
        $this->COMBNAME->EditValue = $this->COMBNAME->CurrentValue;
        $this->COMBNAME->PlaceHolder = RemoveHtml($this->COMBNAME->caption());

        // GENERICNAME
        $this->GENERICNAME->EditAttrs["class"] = "form-control";
        $this->GENERICNAME->EditCustomAttributes = "";
        if (!$this->GENERICNAME->Raw) {
            $this->GENERICNAME->CurrentValue = HtmlDecode($this->GENERICNAME->CurrentValue);
        }
        $this->GENERICNAME->EditValue = $this->GENERICNAME->CurrentValue;
        $this->GENERICNAME->PlaceHolder = RemoveHtml($this->GENERICNAME->caption());

        // REMARK
        $this->REMARK->EditAttrs["class"] = "form-control";
        $this->REMARK->EditCustomAttributes = "";
        if (!$this->REMARK->Raw) {
            $this->REMARK->CurrentValue = HtmlDecode($this->REMARK->CurrentValue);
        }
        $this->REMARK->EditValue = $this->REMARK->CurrentValue;
        $this->REMARK->PlaceHolder = RemoveHtml($this->REMARK->caption());

        // TEMP
        $this->TEMP->EditAttrs["class"] = "form-control";
        $this->TEMP->EditCustomAttributes = "";
        if (!$this->TEMP->Raw) {
            $this->TEMP->CurrentValue = HtmlDecode($this->TEMP->CurrentValue);
        }
        $this->TEMP->EditValue = $this->TEMP->CurrentValue;
        $this->TEMP->PlaceHolder = RemoveHtml($this->TEMP->caption());

        // PACKING
        $this->PACKING->EditAttrs["class"] = "form-control";
        $this->PACKING->EditCustomAttributes = "";
        $this->PACKING->EditValue = $this->PACKING->CurrentValue;
        $this->PACKING->PlaceHolder = RemoveHtml($this->PACKING->caption());
        if (strval($this->PACKING->EditValue) != "" && is_numeric($this->PACKING->EditValue)) {
            $this->PACKING->EditValue = FormatNumber($this->PACKING->EditValue, -2, -2, -2, -2);
        }

        // PhysQty
        $this->PhysQty->EditAttrs["class"] = "form-control";
        $this->PhysQty->EditCustomAttributes = "";
        $this->PhysQty->EditValue = $this->PhysQty->CurrentValue;
        $this->PhysQty->PlaceHolder = RemoveHtml($this->PhysQty->caption());
        if (strval($this->PhysQty->EditValue) != "" && is_numeric($this->PhysQty->EditValue)) {
            $this->PhysQty->EditValue = FormatNumber($this->PhysQty->EditValue, -2, -2, -2, -2);
        }

        // LedQty
        $this->LedQty->EditAttrs["class"] = "form-control";
        $this->LedQty->EditCustomAttributes = "";
        $this->LedQty->EditValue = $this->LedQty->CurrentValue;
        $this->LedQty->PlaceHolder = RemoveHtml($this->LedQty->caption());
        if (strval($this->LedQty->EditValue) != "" && is_numeric($this->LedQty->EditValue)) {
            $this->LedQty->EditValue = FormatNumber($this->LedQty->EditValue, -2, -2, -2, -2);
        }

        // id
        $this->id->EditAttrs["class"] = "form-control";
        $this->id->EditCustomAttributes = "";
        $this->id->EditValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // PurValue
        $this->PurValue->EditAttrs["class"] = "form-control";
        $this->PurValue->EditCustomAttributes = "";
        $this->PurValue->EditValue = $this->PurValue->CurrentValue;
        $this->PurValue->PlaceHolder = RemoveHtml($this->PurValue->caption());
        if (strval($this->PurValue->EditValue) != "" && is_numeric($this->PurValue->EditValue)) {
            $this->PurValue->EditValue = FormatNumber($this->PurValue->EditValue, -2, -2, -2, -2);
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

        // SaleValue
        $this->SaleValue->EditAttrs["class"] = "form-control";
        $this->SaleValue->EditCustomAttributes = "";
        $this->SaleValue->EditValue = $this->SaleValue->CurrentValue;
        $this->SaleValue->PlaceHolder = RemoveHtml($this->SaleValue->caption());
        if (strval($this->SaleValue->EditValue) != "" && is_numeric($this->SaleValue->EditValue)) {
            $this->SaleValue->EditValue = FormatNumber($this->SaleValue->EditValue, -2, -2, -2, -2);
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

        // SaleRate
        $this->SaleRate->EditAttrs["class"] = "form-control";
        $this->SaleRate->EditCustomAttributes = "";
        $this->SaleRate->EditValue = $this->SaleRate->CurrentValue;
        $this->SaleRate->PlaceHolder = RemoveHtml($this->SaleRate->caption());
        if (strval($this->SaleRate->EditValue) != "" && is_numeric($this->SaleRate->EditValue)) {
            $this->SaleRate->EditValue = FormatNumber($this->SaleRate->EditValue, -2, -2, -2, -2);
        }

        // HospID
        $this->HospID->EditAttrs["class"] = "form-control";
        $this->HospID->EditCustomAttributes = "";
        $this->HospID->EditValue = $this->HospID->CurrentValue;
        $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

        // BRNAME
        $this->BRNAME->EditAttrs["class"] = "form-control";
        $this->BRNAME->EditCustomAttributes = "";
        if (!$this->BRNAME->Raw) {
            $this->BRNAME->CurrentValue = HtmlDecode($this->BRNAME->CurrentValue);
        }
        $this->BRNAME->EditValue = $this->BRNAME->CurrentValue;
        $this->BRNAME->PlaceHolder = RemoveHtml($this->BRNAME->caption());

        // OV
        $this->OV->EditAttrs["class"] = "form-control";
        $this->OV->EditCustomAttributes = "";
        $this->OV->EditValue = $this->OV->CurrentValue;
        $this->OV->PlaceHolder = RemoveHtml($this->OV->caption());
        if (strval($this->OV->EditValue) != "" && is_numeric($this->OV->EditValue)) {
            $this->OV->EditValue = FormatNumber($this->OV->EditValue, -2, -2, -2, -2);
        }

        // LATESTOV
        $this->LATESTOV->EditAttrs["class"] = "form-control";
        $this->LATESTOV->EditCustomAttributes = "";
        $this->LATESTOV->EditValue = $this->LATESTOV->CurrentValue;
        $this->LATESTOV->PlaceHolder = RemoveHtml($this->LATESTOV->caption());
        if (strval($this->LATESTOV->EditValue) != "" && is_numeric($this->LATESTOV->EditValue)) {
            $this->LATESTOV->EditValue = FormatNumber($this->LATESTOV->EditValue, -2, -2, -2, -2);
        }

        // ITEMTYPE
        $this->ITEMTYPE->EditAttrs["class"] = "form-control";
        $this->ITEMTYPE->EditCustomAttributes = "";
        if (!$this->ITEMTYPE->Raw) {
            $this->ITEMTYPE->CurrentValue = HtmlDecode($this->ITEMTYPE->CurrentValue);
        }
        $this->ITEMTYPE->EditValue = $this->ITEMTYPE->CurrentValue;
        $this->ITEMTYPE->PlaceHolder = RemoveHtml($this->ITEMTYPE->caption());

        // ROWID
        $this->ROWID->EditAttrs["class"] = "form-control";
        $this->ROWID->EditCustomAttributes = "";
        if (!$this->ROWID->Raw) {
            $this->ROWID->CurrentValue = HtmlDecode($this->ROWID->CurrentValue);
        }
        $this->ROWID->EditValue = $this->ROWID->CurrentValue;
        $this->ROWID->PlaceHolder = RemoveHtml($this->ROWID->caption());

        // MOVED
        $this->MOVED->EditAttrs["class"] = "form-control";
        $this->MOVED->EditCustomAttributes = "";
        $this->MOVED->EditValue = $this->MOVED->CurrentValue;
        $this->MOVED->PlaceHolder = RemoveHtml($this->MOVED->caption());

        // NEWTAX
        $this->NEWTAX->EditAttrs["class"] = "form-control";
        $this->NEWTAX->EditCustomAttributes = "";
        $this->NEWTAX->EditValue = $this->NEWTAX->CurrentValue;
        $this->NEWTAX->PlaceHolder = RemoveHtml($this->NEWTAX->caption());
        if (strval($this->NEWTAX->EditValue) != "" && is_numeric($this->NEWTAX->EditValue)) {
            $this->NEWTAX->EditValue = FormatNumber($this->NEWTAX->EditValue, -2, -2, -2, -2);
        }

        // HSNCODE
        $this->HSNCODE->EditAttrs["class"] = "form-control";
        $this->HSNCODE->EditCustomAttributes = "";
        if (!$this->HSNCODE->Raw) {
            $this->HSNCODE->CurrentValue = HtmlDecode($this->HSNCODE->CurrentValue);
        }
        $this->HSNCODE->EditValue = $this->HSNCODE->CurrentValue;
        $this->HSNCODE->PlaceHolder = RemoveHtml($this->HSNCODE->caption());

        // OLDTAX
        $this->OLDTAX->EditAttrs["class"] = "form-control";
        $this->OLDTAX->EditCustomAttributes = "";
        $this->OLDTAX->EditValue = $this->OLDTAX->CurrentValue;
        $this->OLDTAX->PlaceHolder = RemoveHtml($this->OLDTAX->caption());
        if (strval($this->OLDTAX->EditValue) != "" && is_numeric($this->OLDTAX->EditValue)) {
            $this->OLDTAX->EditValue = FormatNumber($this->OLDTAX->EditValue, -2, -2, -2, -2);
        }

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
                    $doc->exportCaption($this->PRC);
                    $doc->exportCaption($this->TYPE);
                    $doc->exportCaption($this->DES);
                    $doc->exportCaption($this->UM);
                    $doc->exportCaption($this->RT);
                    $doc->exportCaption($this->UR);
                    $doc->exportCaption($this->TAXP);
                    $doc->exportCaption($this->BATCHNO);
                    $doc->exportCaption($this->OQ);
                    $doc->exportCaption($this->RQ);
                    $doc->exportCaption($this->MRQ);
                    $doc->exportCaption($this->IQ);
                    $doc->exportCaption($this->MRP);
                    $doc->exportCaption($this->EXPDT);
                    $doc->exportCaption($this->SALQTY);
                    $doc->exportCaption($this->LASTPURDT);
                    $doc->exportCaption($this->LASTSUPP);
                    $doc->exportCaption($this->GENNAME);
                    $doc->exportCaption($this->LASTISSDT);
                    $doc->exportCaption($this->CREATEDDT);
                    $doc->exportCaption($this->OPPRC);
                    $doc->exportCaption($this->RESTRICT);
                    $doc->exportCaption($this->BAWAPRC);
                    $doc->exportCaption($this->STAXPER);
                    $doc->exportCaption($this->TAXTYPE);
                    $doc->exportCaption($this->OLDTAXP);
                    $doc->exportCaption($this->TAXUPD);
                    $doc->exportCaption($this->PACKAGE);
                    $doc->exportCaption($this->NEWRT);
                    $doc->exportCaption($this->NEWMRP);
                    $doc->exportCaption($this->NEWUR);
                    $doc->exportCaption($this->STATUS);
                    $doc->exportCaption($this->RETNQTY);
                    $doc->exportCaption($this->KEMODISC);
                    $doc->exportCaption($this->PATSALE);
                    $doc->exportCaption($this->ORGAN);
                    $doc->exportCaption($this->OLDRQ);
                    $doc->exportCaption($this->DRID);
                    $doc->exportCaption($this->MFRCODE);
                    $doc->exportCaption($this->COMBCODE);
                    $doc->exportCaption($this->GENCODE);
                    $doc->exportCaption($this->STRENGTH);
                    $doc->exportCaption($this->UNIT);
                    $doc->exportCaption($this->FORMULARY);
                    $doc->exportCaption($this->STOCK);
                    $doc->exportCaption($this->RACKNO);
                    $doc->exportCaption($this->SUPPNAME);
                    $doc->exportCaption($this->COMBNAME);
                    $doc->exportCaption($this->GENERICNAME);
                    $doc->exportCaption($this->REMARK);
                    $doc->exportCaption($this->TEMP);
                    $doc->exportCaption($this->PACKING);
                    $doc->exportCaption($this->PhysQty);
                    $doc->exportCaption($this->LedQty);
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->PurValue);
                    $doc->exportCaption($this->PSGST);
                    $doc->exportCaption($this->PCGST);
                    $doc->exportCaption($this->SaleValue);
                    $doc->exportCaption($this->SSGST);
                    $doc->exportCaption($this->SCGST);
                    $doc->exportCaption($this->SaleRate);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->BRNAME);
                    $doc->exportCaption($this->OV);
                    $doc->exportCaption($this->LATESTOV);
                    $doc->exportCaption($this->ITEMTYPE);
                    $doc->exportCaption($this->ROWID);
                    $doc->exportCaption($this->MOVED);
                    $doc->exportCaption($this->NEWTAX);
                    $doc->exportCaption($this->HSNCODE);
                    $doc->exportCaption($this->OLDTAX);
                } else {
                    $doc->exportCaption($this->BRCODE);
                    $doc->exportCaption($this->PRC);
                    $doc->exportCaption($this->TYPE);
                    $doc->exportCaption($this->DES);
                    $doc->exportCaption($this->UM);
                    $doc->exportCaption($this->RT);
                    $doc->exportCaption($this->UR);
                    $doc->exportCaption($this->TAXP);
                    $doc->exportCaption($this->BATCHNO);
                    $doc->exportCaption($this->OQ);
                    $doc->exportCaption($this->RQ);
                    $doc->exportCaption($this->MRQ);
                    $doc->exportCaption($this->IQ);
                    $doc->exportCaption($this->MRP);
                    $doc->exportCaption($this->EXPDT);
                    $doc->exportCaption($this->SALQTY);
                    $doc->exportCaption($this->LASTPURDT);
                    $doc->exportCaption($this->LASTSUPP);
                    $doc->exportCaption($this->GENNAME);
                    $doc->exportCaption($this->LASTISSDT);
                    $doc->exportCaption($this->CREATEDDT);
                    $doc->exportCaption($this->OPPRC);
                    $doc->exportCaption($this->RESTRICT);
                    $doc->exportCaption($this->BAWAPRC);
                    $doc->exportCaption($this->STAXPER);
                    $doc->exportCaption($this->TAXTYPE);
                    $doc->exportCaption($this->OLDTAXP);
                    $doc->exportCaption($this->TAXUPD);
                    $doc->exportCaption($this->PACKAGE);
                    $doc->exportCaption($this->NEWRT);
                    $doc->exportCaption($this->NEWMRP);
                    $doc->exportCaption($this->NEWUR);
                    $doc->exportCaption($this->STATUS);
                    $doc->exportCaption($this->RETNQTY);
                    $doc->exportCaption($this->KEMODISC);
                    $doc->exportCaption($this->PATSALE);
                    $doc->exportCaption($this->ORGAN);
                    $doc->exportCaption($this->OLDRQ);
                    $doc->exportCaption($this->DRID);
                    $doc->exportCaption($this->MFRCODE);
                    $doc->exportCaption($this->COMBCODE);
                    $doc->exportCaption($this->GENCODE);
                    $doc->exportCaption($this->STRENGTH);
                    $doc->exportCaption($this->UNIT);
                    $doc->exportCaption($this->FORMULARY);
                    $doc->exportCaption($this->STOCK);
                    $doc->exportCaption($this->RACKNO);
                    $doc->exportCaption($this->SUPPNAME);
                    $doc->exportCaption($this->COMBNAME);
                    $doc->exportCaption($this->GENERICNAME);
                    $doc->exportCaption($this->REMARK);
                    $doc->exportCaption($this->TEMP);
                    $doc->exportCaption($this->PACKING);
                    $doc->exportCaption($this->PhysQty);
                    $doc->exportCaption($this->LedQty);
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->PurValue);
                    $doc->exportCaption($this->PSGST);
                    $doc->exportCaption($this->PCGST);
                    $doc->exportCaption($this->SaleValue);
                    $doc->exportCaption($this->SSGST);
                    $doc->exportCaption($this->SCGST);
                    $doc->exportCaption($this->SaleRate);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->BRNAME);
                    $doc->exportCaption($this->OV);
                    $doc->exportCaption($this->LATESTOV);
                    $doc->exportCaption($this->ITEMTYPE);
                    $doc->exportCaption($this->ROWID);
                    $doc->exportCaption($this->MOVED);
                    $doc->exportCaption($this->NEWTAX);
                    $doc->exportCaption($this->HSNCODE);
                    $doc->exportCaption($this->OLDTAX);
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
                        $doc->exportField($this->PRC);
                        $doc->exportField($this->TYPE);
                        $doc->exportField($this->DES);
                        $doc->exportField($this->UM);
                        $doc->exportField($this->RT);
                        $doc->exportField($this->UR);
                        $doc->exportField($this->TAXP);
                        $doc->exportField($this->BATCHNO);
                        $doc->exportField($this->OQ);
                        $doc->exportField($this->RQ);
                        $doc->exportField($this->MRQ);
                        $doc->exportField($this->IQ);
                        $doc->exportField($this->MRP);
                        $doc->exportField($this->EXPDT);
                        $doc->exportField($this->SALQTY);
                        $doc->exportField($this->LASTPURDT);
                        $doc->exportField($this->LASTSUPP);
                        $doc->exportField($this->GENNAME);
                        $doc->exportField($this->LASTISSDT);
                        $doc->exportField($this->CREATEDDT);
                        $doc->exportField($this->OPPRC);
                        $doc->exportField($this->RESTRICT);
                        $doc->exportField($this->BAWAPRC);
                        $doc->exportField($this->STAXPER);
                        $doc->exportField($this->TAXTYPE);
                        $doc->exportField($this->OLDTAXP);
                        $doc->exportField($this->TAXUPD);
                        $doc->exportField($this->PACKAGE);
                        $doc->exportField($this->NEWRT);
                        $doc->exportField($this->NEWMRP);
                        $doc->exportField($this->NEWUR);
                        $doc->exportField($this->STATUS);
                        $doc->exportField($this->RETNQTY);
                        $doc->exportField($this->KEMODISC);
                        $doc->exportField($this->PATSALE);
                        $doc->exportField($this->ORGAN);
                        $doc->exportField($this->OLDRQ);
                        $doc->exportField($this->DRID);
                        $doc->exportField($this->MFRCODE);
                        $doc->exportField($this->COMBCODE);
                        $doc->exportField($this->GENCODE);
                        $doc->exportField($this->STRENGTH);
                        $doc->exportField($this->UNIT);
                        $doc->exportField($this->FORMULARY);
                        $doc->exportField($this->STOCK);
                        $doc->exportField($this->RACKNO);
                        $doc->exportField($this->SUPPNAME);
                        $doc->exportField($this->COMBNAME);
                        $doc->exportField($this->GENERICNAME);
                        $doc->exportField($this->REMARK);
                        $doc->exportField($this->TEMP);
                        $doc->exportField($this->PACKING);
                        $doc->exportField($this->PhysQty);
                        $doc->exportField($this->LedQty);
                        $doc->exportField($this->id);
                        $doc->exportField($this->PurValue);
                        $doc->exportField($this->PSGST);
                        $doc->exportField($this->PCGST);
                        $doc->exportField($this->SaleValue);
                        $doc->exportField($this->SSGST);
                        $doc->exportField($this->SCGST);
                        $doc->exportField($this->SaleRate);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->BRNAME);
                        $doc->exportField($this->OV);
                        $doc->exportField($this->LATESTOV);
                        $doc->exportField($this->ITEMTYPE);
                        $doc->exportField($this->ROWID);
                        $doc->exportField($this->MOVED);
                        $doc->exportField($this->NEWTAX);
                        $doc->exportField($this->HSNCODE);
                        $doc->exportField($this->OLDTAX);
                    } else {
                        $doc->exportField($this->BRCODE);
                        $doc->exportField($this->PRC);
                        $doc->exportField($this->TYPE);
                        $doc->exportField($this->DES);
                        $doc->exportField($this->UM);
                        $doc->exportField($this->RT);
                        $doc->exportField($this->UR);
                        $doc->exportField($this->TAXP);
                        $doc->exportField($this->BATCHNO);
                        $doc->exportField($this->OQ);
                        $doc->exportField($this->RQ);
                        $doc->exportField($this->MRQ);
                        $doc->exportField($this->IQ);
                        $doc->exportField($this->MRP);
                        $doc->exportField($this->EXPDT);
                        $doc->exportField($this->SALQTY);
                        $doc->exportField($this->LASTPURDT);
                        $doc->exportField($this->LASTSUPP);
                        $doc->exportField($this->GENNAME);
                        $doc->exportField($this->LASTISSDT);
                        $doc->exportField($this->CREATEDDT);
                        $doc->exportField($this->OPPRC);
                        $doc->exportField($this->RESTRICT);
                        $doc->exportField($this->BAWAPRC);
                        $doc->exportField($this->STAXPER);
                        $doc->exportField($this->TAXTYPE);
                        $doc->exportField($this->OLDTAXP);
                        $doc->exportField($this->TAXUPD);
                        $doc->exportField($this->PACKAGE);
                        $doc->exportField($this->NEWRT);
                        $doc->exportField($this->NEWMRP);
                        $doc->exportField($this->NEWUR);
                        $doc->exportField($this->STATUS);
                        $doc->exportField($this->RETNQTY);
                        $doc->exportField($this->KEMODISC);
                        $doc->exportField($this->PATSALE);
                        $doc->exportField($this->ORGAN);
                        $doc->exportField($this->OLDRQ);
                        $doc->exportField($this->DRID);
                        $doc->exportField($this->MFRCODE);
                        $doc->exportField($this->COMBCODE);
                        $doc->exportField($this->GENCODE);
                        $doc->exportField($this->STRENGTH);
                        $doc->exportField($this->UNIT);
                        $doc->exportField($this->FORMULARY);
                        $doc->exportField($this->STOCK);
                        $doc->exportField($this->RACKNO);
                        $doc->exportField($this->SUPPNAME);
                        $doc->exportField($this->COMBNAME);
                        $doc->exportField($this->GENERICNAME);
                        $doc->exportField($this->REMARK);
                        $doc->exportField($this->TEMP);
                        $doc->exportField($this->PACKING);
                        $doc->exportField($this->PhysQty);
                        $doc->exportField($this->LedQty);
                        $doc->exportField($this->id);
                        $doc->exportField($this->PurValue);
                        $doc->exportField($this->PSGST);
                        $doc->exportField($this->PCGST);
                        $doc->exportField($this->SaleValue);
                        $doc->exportField($this->SSGST);
                        $doc->exportField($this->SCGST);
                        $doc->exportField($this->SaleRate);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->BRNAME);
                        $doc->exportField($this->OV);
                        $doc->exportField($this->LATESTOV);
                        $doc->exportField($this->ITEMTYPE);
                        $doc->exportField($this->ROWID);
                        $doc->exportField($this->MOVED);
                        $doc->exportField($this->NEWTAX);
                        $doc->exportField($this->HSNCODE);
                        $doc->exportField($this->OLDTAX);
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
