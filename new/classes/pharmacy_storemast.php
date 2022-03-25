<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for pharmacy_storemast
 */
class pharmacy_storemast extends DbTable
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

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'pharmacy_storemast';
		$this->TableName = 'pharmacy_storemast';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`pharmacy_storemast`";
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

		// BRCODE
		$this->BRCODE = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_BRCODE', 'BRCODE', '`BRCODE`', '`BRCODE`', 3, 11, -1, FALSE, '`BRCODE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BRCODE->Sortable = TRUE; // Allow sort
		$this->fields['BRCODE'] = &$this->BRCODE;

		// PRC
		$this->PRC = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_PRC', 'PRC', '`PRC`', '`PRC`', 200, 9, -1, FALSE, '`PRC`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PRC->Required = TRUE; // Required field
		$this->PRC->Sortable = TRUE; // Allow sort
		$this->fields['PRC'] = &$this->PRC;

		// TYPE
		$this->TYPE = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_TYPE', 'TYPE', '`TYPE`', '`TYPE`', 200, 3, -1, FALSE, '`TYPE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TYPE->Sortable = TRUE; // Allow sort
		$this->TYPE->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TYPE->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->TYPE->Lookup = new Lookup('TYPE', 'pharmacy_storemast', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->TYPE->OptionCount = 23;
		$this->fields['TYPE'] = &$this->TYPE;

		// DES
		$this->DES = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_DES', 'DES', '`DES`', '`DES`', 200, 100, -1, FALSE, '`DES`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DES->Sortable = TRUE; // Allow sort
		$this->fields['DES'] = &$this->DES;

		// UM
		$this->UM = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_UM', 'UM', '`UM`', '`UM`', 200, 3, -1, FALSE, '`UM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->UM->Sortable = TRUE; // Allow sort
		$this->fields['UM'] = &$this->UM;

		// RT
		$this->RT = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_RT', 'RT', '`RT`', '`RT`', 131, 12, -1, FALSE, '`RT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RT->Sortable = TRUE; // Allow sort
		$this->RT->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['RT'] = &$this->RT;

		// UR
		$this->UR = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_UR', 'UR', '`UR`', '`UR`', 131, 12, -1, FALSE, '`UR`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->UR->Sortable = FALSE; // Allow sort
		$this->UR->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['UR'] = &$this->UR;

		// TAXP
		$this->TAXP = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_TAXP', 'TAXP', '`TAXP`', '`TAXP`', 131, 8, -1, FALSE, '`TAXP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TAXP->Sortable = FALSE; // Allow sort
		$this->TAXP->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['TAXP'] = &$this->TAXP;

		// BATCHNO
		$this->BATCHNO = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_BATCHNO', 'BATCHNO', '`BATCHNO`', '`BATCHNO`', 200, 14, -1, FALSE, '`BATCHNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BATCHNO->Sortable = TRUE; // Allow sort
		$this->fields['BATCHNO'] = &$this->BATCHNO;

		// OQ
		$this->OQ = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_OQ', 'OQ', '`OQ`', '`OQ`', 131, 12, -1, FALSE, '`OQ`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OQ->Sortable = FALSE; // Allow sort
		$this->OQ->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['OQ'] = &$this->OQ;

		// RQ
		$this->RQ = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_RQ', 'RQ', '`RQ`', '`RQ`', 131, 12, -1, FALSE, '`RQ`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RQ->Sortable = FALSE; // Allow sort
		$this->RQ->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['RQ'] = &$this->RQ;

		// MRQ
		$this->MRQ = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_MRQ', 'MRQ', '`MRQ`', '`MRQ`', 131, 12, -1, FALSE, '`MRQ`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MRQ->Sortable = FALSE; // Allow sort
		$this->MRQ->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['MRQ'] = &$this->MRQ;

		// IQ
		$this->IQ = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_IQ', 'IQ', '`IQ`', '`IQ`', 131, 12, -1, FALSE, '`IQ`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IQ->Sortable = FALSE; // Allow sort
		$this->IQ->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['IQ'] = &$this->IQ;

		// MRP
		$this->MRP = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_MRP', 'MRP', '`MRP`', '`MRP`', 131, 12, -1, FALSE, '`MRP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MRP->Sortable = TRUE; // Allow sort
		$this->MRP->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['MRP'] = &$this->MRP;

		// EXPDT
		$this->EXPDT = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_EXPDT', 'EXPDT', '`EXPDT`', CastDateFieldForLike("`EXPDT`", 0, "DB"), 135, 19, 0, FALSE, '`EXPDT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->EXPDT->Sortable = TRUE; // Allow sort
		$this->EXPDT->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['EXPDT'] = &$this->EXPDT;

		// SALQTY
		$this->SALQTY = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_SALQTY', 'SALQTY', '`SALQTY`', '`SALQTY`', 131, 12, -1, FALSE, '`SALQTY`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SALQTY->Sortable = FALSE; // Allow sort
		$this->SALQTY->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['SALQTY'] = &$this->SALQTY;

		// LASTPURDT
		$this->LASTPURDT = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_LASTPURDT', 'LASTPURDT', '`LASTPURDT`', CastDateFieldForLike("`LASTPURDT`", 0, "DB"), 135, 19, 0, FALSE, '`LASTPURDT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->LASTPURDT->Sortable = TRUE; // Allow sort
		$this->LASTPURDT->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['LASTPURDT'] = &$this->LASTPURDT;

		// LASTSUPP
		$this->LASTSUPP = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_LASTSUPP', 'LASTSUPP', '`LASTSUPP`', '`LASTSUPP`', 200, 5, -1, FALSE, '`LASTSUPP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->LASTSUPP->Sortable = TRUE; // Allow sort
		$this->LASTSUPP->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->LASTSUPP->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->LASTSUPP->Lookup = new Lookup('LASTSUPP', 'pharmacy_suppliers', FALSE, 'Suppliername', ["Suppliername","","",""], [], [], [], [], [], [], '', '');
		$this->fields['LASTSUPP'] = &$this->LASTSUPP;

		// GENNAME
		$this->GENNAME = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_GENNAME', 'GENNAME', '`GENNAME`', '`GENNAME`', 200, 75, -1, FALSE, '`GENNAME`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->GENNAME->Sortable = TRUE; // Allow sort
		$this->GENNAME->Lookup = new Lookup('GENNAME', 'pharmacy_master_generic', FALSE, 'GENNAME', ["GENNAME","","",""], [], [], [], [], [], [], '', '');
		$this->fields['GENNAME'] = &$this->GENNAME;

		// LASTISSDT
		$this->LASTISSDT = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_LASTISSDT', 'LASTISSDT', '`LASTISSDT`', CastDateFieldForLike("`LASTISSDT`", 0, "DB"), 135, 19, 0, FALSE, '`LASTISSDT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->LASTISSDT->Sortable = TRUE; // Allow sort
		$this->LASTISSDT->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['LASTISSDT'] = &$this->LASTISSDT;

		// CREATEDDT
		$this->CREATEDDT = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_CREATEDDT', 'CREATEDDT', '`CREATEDDT`', CastDateFieldForLike("`CREATEDDT`", 0, "DB"), 135, 19, 0, FALSE, '`CREATEDDT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CREATEDDT->Sortable = TRUE; // Allow sort
		$this->CREATEDDT->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['CREATEDDT'] = &$this->CREATEDDT;

		// OPPRC
		$this->OPPRC = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_OPPRC', 'OPPRC', '`OPPRC`', '`OPPRC`', 200, 9, -1, FALSE, '`OPPRC`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OPPRC->Sortable = FALSE; // Allow sort
		$this->fields['OPPRC'] = &$this->OPPRC;

		// RESTRICT
		$this->RESTRICT = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_RESTRICT', 'RESTRICT', '`RESTRICT`', '`RESTRICT`', 200, 1, -1, FALSE, '`RESTRICT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RESTRICT->Sortable = FALSE; // Allow sort
		$this->fields['RESTRICT'] = &$this->RESTRICT;

		// BAWAPRC
		$this->BAWAPRC = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_BAWAPRC', 'BAWAPRC', '`BAWAPRC`', '`BAWAPRC`', 200, 9, -1, FALSE, '`BAWAPRC`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BAWAPRC->Sortable = FALSE; // Allow sort
		$this->fields['BAWAPRC'] = &$this->BAWAPRC;

		// STAXPER
		$this->STAXPER = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_STAXPER', 'STAXPER', '`STAXPER`', '`STAXPER`', 131, 8, -1, FALSE, '`STAXPER`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->STAXPER->Sortable = FALSE; // Allow sort
		$this->STAXPER->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['STAXPER'] = &$this->STAXPER;

		// TAXTYPE
		$this->TAXTYPE = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_TAXTYPE', 'TAXTYPE', '`TAXTYPE`', '`TAXTYPE`', 200, 1, -1, FALSE, '`TAXTYPE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TAXTYPE->Sortable = FALSE; // Allow sort
		$this->fields['TAXTYPE'] = &$this->TAXTYPE;

		// OLDTAXP
		$this->OLDTAXP = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_OLDTAXP', 'OLDTAXP', '`OLDTAXP`', '`OLDTAXP`', 131, 12, -1, FALSE, '`OLDTAXP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OLDTAXP->Sortable = FALSE; // Allow sort
		$this->OLDTAXP->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['OLDTAXP'] = &$this->OLDTAXP;

		// TAXUPD
		$this->TAXUPD = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_TAXUPD', 'TAXUPD', '`TAXUPD`', '`TAXUPD`', 200, 1, -1, FALSE, '`TAXUPD`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TAXUPD->Sortable = FALSE; // Allow sort
		$this->fields['TAXUPD'] = &$this->TAXUPD;

		// PACKAGE
		$this->PACKAGE = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_PACKAGE', 'PACKAGE', '`PACKAGE`', '`PACKAGE`', 200, 1, -1, FALSE, '`PACKAGE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PACKAGE->Sortable = FALSE; // Allow sort
		$this->fields['PACKAGE'] = &$this->PACKAGE;

		// NEWRT
		$this->NEWRT = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_NEWRT', 'NEWRT', '`NEWRT`', '`NEWRT`', 131, 12, -1, FALSE, '`NEWRT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NEWRT->Sortable = FALSE; // Allow sort
		$this->NEWRT->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['NEWRT'] = &$this->NEWRT;

		// NEWMRP
		$this->NEWMRP = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_NEWMRP', 'NEWMRP', '`NEWMRP`', '`NEWMRP`', 131, 12, -1, FALSE, '`NEWMRP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NEWMRP->Sortable = FALSE; // Allow sort
		$this->NEWMRP->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['NEWMRP'] = &$this->NEWMRP;

		// NEWUR
		$this->NEWUR = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_NEWUR', 'NEWUR', '`NEWUR`', '`NEWUR`', 131, 12, -1, FALSE, '`NEWUR`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NEWUR->Sortable = FALSE; // Allow sort
		$this->NEWUR->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['NEWUR'] = &$this->NEWUR;

		// STATUS
		$this->STATUS = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_STATUS', 'STATUS', '`STATUS`', '`STATUS`', 200, 10, -1, FALSE, '`STATUS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->STATUS->Sortable = FALSE; // Allow sort
		$this->fields['STATUS'] = &$this->STATUS;

		// RETNQTY
		$this->RETNQTY = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_RETNQTY', 'RETNQTY', '`RETNQTY`', '`RETNQTY`', 131, 12, -1, FALSE, '`RETNQTY`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RETNQTY->Sortable = FALSE; // Allow sort
		$this->RETNQTY->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['RETNQTY'] = &$this->RETNQTY;

		// KEMODISC
		$this->KEMODISC = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_KEMODISC', 'KEMODISC', '`KEMODISC`', '`KEMODISC`', 200, 1, -1, FALSE, '`KEMODISC`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->KEMODISC->Sortable = FALSE; // Allow sort
		$this->fields['KEMODISC'] = &$this->KEMODISC;

		// PATSALE
		$this->PATSALE = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_PATSALE', 'PATSALE', '`PATSALE`', '`PATSALE`', 131, 12, -1, FALSE, '`PATSALE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PATSALE->Sortable = FALSE; // Allow sort
		$this->PATSALE->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PATSALE'] = &$this->PATSALE;

		// ORGAN
		$this->ORGAN = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_ORGAN', 'ORGAN', '`ORGAN`', '`ORGAN`', 200, 50, -1, FALSE, '`ORGAN`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ORGAN->Sortable = FALSE; // Allow sort
		$this->fields['ORGAN'] = &$this->ORGAN;

		// OLDRQ
		$this->OLDRQ = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_OLDRQ', 'OLDRQ', '`OLDRQ`', '`OLDRQ`', 131, 12, -1, FALSE, '`OLDRQ`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OLDRQ->Sortable = FALSE; // Allow sort
		$this->OLDRQ->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['OLDRQ'] = &$this->OLDRQ;

		// DRID
		$this->DRID = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_DRID', 'DRID', '`DRID`', '`DRID`', 200, 5, -1, FALSE, '`DRID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->DRID->Sortable = TRUE; // Allow sort
		$this->DRID->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->DRID->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->DRID->Lookup = new Lookup('DRID', 'doctors', FALSE, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
		$this->fields['DRID'] = &$this->DRID;

		// MFRCODE
		$this->MFRCODE = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_MFRCODE', 'MFRCODE', '`MFRCODE`', '`MFRCODE`', 200, 3, -1, FALSE, '`MFRCODE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->MFRCODE->Sortable = TRUE; // Allow sort
		$this->MFRCODE->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->MFRCODE->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->MFRCODE->Lookup = new Lookup('MFRCODE', 'pharmacy_master_mfr_master', FALSE, 'CODE', ["NAME","","",""], [], [], [], [], [], [], '', '');
		$this->fields['MFRCODE'] = &$this->MFRCODE;

		// COMBCODE
		$this->COMBCODE = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_COMBCODE', 'COMBCODE', '`COMBCODE`', '`COMBCODE`', 200, 50, -1, FALSE, '`COMBCODE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->COMBCODE->Sortable = TRUE; // Allow sort
		$this->COMBCODE->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->COMBCODE->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->COMBCODE->Lookup = new Lookup('COMBCODE', 'pharmacy_comb_master', FALSE, 'CODE', ["CODE","NAME","",""], [], [], [], [], ["NAME"], ["x_COMBNAME"], '', '');
		$this->fields['COMBCODE'] = &$this->COMBCODE;

		// GENCODE
		$this->GENCODE = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_GENCODE', 'GENCODE', '`GENCODE`', '`GENCODE`', 200, 10, -1, FALSE, '`GENCODE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->GENCODE->Sortable = TRUE; // Allow sort
		$this->GENCODE->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->GENCODE->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->GENCODE->Lookup = new Lookup('GENCODE', 'pharmacy_master_generic', FALSE, 'CODE', ["CODE","GENNAME","",""], [], [], [], [], ["GENNAME"], ["x_GENERICNAME"], '', '');
		$this->fields['GENCODE'] = &$this->GENCODE;

		// STRENGTH
		$this->STRENGTH = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_STRENGTH', 'STRENGTH', '`STRENGTH`', '`STRENGTH`', 131, 11, -1, FALSE, '`STRENGTH`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->STRENGTH->Sortable = TRUE; // Allow sort
		$this->STRENGTH->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['STRENGTH'] = &$this->STRENGTH;

		// UNIT
		$this->UNIT = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_UNIT', 'UNIT', '`UNIT`', '`UNIT`', 200, 3, -1, FALSE, '`UNIT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->UNIT->Sortable = TRUE; // Allow sort
		$this->UNIT->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->UNIT->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->UNIT->Lookup = new Lookup('UNIT', 'pharmacy_storemast', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->UNIT->OptionCount = 7;
		$this->fields['UNIT'] = &$this->UNIT;

		// FORMULARY
		$this->FORMULARY = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_FORMULARY', 'FORMULARY', '`FORMULARY`', '`FORMULARY`', 200, 2, -1, FALSE, '`FORMULARY`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->FORMULARY->Sortable = TRUE; // Allow sort
		$this->FORMULARY->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->FORMULARY->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->FORMULARY->Lookup = new Lookup('FORMULARY', 'pharmacy_storemast', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->FORMULARY->OptionCount = 2;
		$this->fields['FORMULARY'] = &$this->FORMULARY;

		// STOCK
		$this->STOCK = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_STOCK', 'STOCK', '`STOCK`', '`STOCK`', 131, 12, -1, FALSE, '`STOCK`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->STOCK->Sortable = FALSE; // Allow sort
		$this->STOCK->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['STOCK'] = &$this->STOCK;

		// RACKNO
		$this->RACKNO = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_RACKNO', 'RACKNO', '`RACKNO`', '`RACKNO`', 200, 10, -1, FALSE, '`RACKNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RACKNO->Sortable = TRUE; // Allow sort
		$this->fields['RACKNO'] = &$this->RACKNO;

		// SUPPNAME
		$this->SUPPNAME = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_SUPPNAME', 'SUPPNAME', '`SUPPNAME`', '`SUPPNAME`', 200, 50, -1, FALSE, '`SUPPNAME`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->SUPPNAME->Sortable = TRUE; // Allow sort
		$this->SUPPNAME->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->SUPPNAME->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->SUPPNAME->Lookup = new Lookup('SUPPNAME', 'pharmacy_suppliers', FALSE, 'Suppliername', ["Suppliername","","",""], [], [], [], [], [], [], '', '');
		$this->fields['SUPPNAME'] = &$this->SUPPNAME;

		// COMBNAME
		$this->COMBNAME = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_COMBNAME', 'COMBNAME', '`COMBNAME`', '`COMBNAME`', 200, 100, -1, FALSE, '`COMBNAME`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->COMBNAME->Sortable = TRUE; // Allow sort
		$this->COMBNAME->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->COMBNAME->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->COMBNAME->Lookup = new Lookup('COMBNAME', 'pharmacy_comb_master', FALSE, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
		$this->fields['COMBNAME'] = &$this->COMBNAME;

		// GENERICNAME
		$this->GENERICNAME = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_GENERICNAME', 'GENERICNAME', '`GENERICNAME`', '`GENERICNAME`', 200, 100, -1, FALSE, '`GENERICNAME`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->GENERICNAME->Sortable = TRUE; // Allow sort
		$this->GENERICNAME->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->GENERICNAME->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->GENERICNAME->Lookup = new Lookup('GENERICNAME', 'pharmacy_master_generic', FALSE, 'GENNAME', ["GENNAME","","",""], [], [], [], [], [], [], '', '');
		$this->fields['GENERICNAME'] = &$this->GENERICNAME;

		// REMARK
		$this->REMARK = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_REMARK', 'REMARK', '`REMARK`', '`REMARK`', 200, 50, -1, FALSE, '`REMARK`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->REMARK->Sortable = TRUE; // Allow sort
		$this->fields['REMARK'] = &$this->REMARK;

		// TEMP
		$this->TEMP = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_TEMP', 'TEMP', '`TEMP`', '`TEMP`', 200, 5, -1, FALSE, '`TEMP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TEMP->Sortable = TRUE; // Allow sort
		$this->fields['TEMP'] = &$this->TEMP;

		// PACKING
		$this->PACKING = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_PACKING', 'PACKING', '`PACKING`', '`PACKING`', 131, 4, -1, FALSE, '`PACKING`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PACKING->Sortable = FALSE; // Allow sort
		$this->PACKING->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PACKING'] = &$this->PACKING;

		// PhysQty
		$this->PhysQty = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_PhysQty', 'PhysQty', '`PhysQty`', '`PhysQty`', 131, 12, -1, FALSE, '`PhysQty`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PhysQty->Sortable = FALSE; // Allow sort
		$this->PhysQty->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PhysQty'] = &$this->PhysQty;

		// LedQty
		$this->LedQty = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_LedQty', 'LedQty', '`LedQty`', '`LedQty`', 131, 12, -1, FALSE, '`LedQty`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->LedQty->Sortable = FALSE; // Allow sort
		$this->LedQty->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['LedQty'] = &$this->LedQty;

		// id
		$this->id = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// PurValue
		$this->PurValue = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_PurValue', 'PurValue', '`PurValue`', '`PurValue`', 131, 12, -1, FALSE, '`PurValue`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PurValue->Sortable = TRUE; // Allow sort
		$this->PurValue->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PurValue'] = &$this->PurValue;

		// PSGST
		$this->PSGST = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_PSGST', 'PSGST', '`PSGST`', '`PSGST`', 131, 12, -1, FALSE, '`PSGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PSGST->Sortable = TRUE; // Allow sort
		$this->PSGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PSGST'] = &$this->PSGST;

		// PCGST
		$this->PCGST = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_PCGST', 'PCGST', '`PCGST`', '`PCGST`', 131, 12, -1, FALSE, '`PCGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PCGST->Sortable = TRUE; // Allow sort
		$this->PCGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PCGST'] = &$this->PCGST;

		// SaleValue
		$this->SaleValue = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_SaleValue', 'SaleValue', '`SaleValue`', '`SaleValue`', 131, 12, -1, FALSE, '`SaleValue`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SaleValue->Sortable = TRUE; // Allow sort
		$this->SaleValue->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['SaleValue'] = &$this->SaleValue;

		// SSGST
		$this->SSGST = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_SSGST', 'SSGST', '`SSGST`', '`SSGST`', 131, 12, -1, FALSE, '`SSGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SSGST->Sortable = TRUE; // Allow sort
		$this->SSGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['SSGST'] = &$this->SSGST;

		// SCGST
		$this->SCGST = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_SCGST', 'SCGST', '`SCGST`', '`SCGST`', 131, 12, -1, FALSE, '`SCGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SCGST->Sortable = TRUE; // Allow sort
		$this->SCGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['SCGST'] = &$this->SCGST;

		// SaleRate
		$this->SaleRate = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_SaleRate', 'SaleRate', '`SaleRate`', '`SaleRate`', 131, 12, -1, FALSE, '`SaleRate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SaleRate->Sortable = TRUE; // Allow sort
		$this->SaleRate->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['SaleRate'] = &$this->SaleRate;

		// HospID
		$this->HospID = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HospID'] = &$this->HospID;

		// BRNAME
		$this->BRNAME = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_BRNAME', 'BRNAME', '`BRNAME`', '`BRNAME`', 200, 45, -1, FALSE, '`BRNAME`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BRNAME->Sortable = TRUE; // Allow sort
		$this->fields['BRNAME'] = &$this->BRNAME;

		// OV
		$this->OV = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_OV', 'OV', '`OV`', '`OV`', 131, 12, -1, FALSE, '`OV`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OV->Sortable = FALSE; // Allow sort
		$this->OV->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['OV'] = &$this->OV;

		// LATESTOV
		$this->LATESTOV = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_LATESTOV', 'LATESTOV', '`LATESTOV`', '`LATESTOV`', 131, 12, -1, FALSE, '`LATESTOV`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->LATESTOV->Sortable = FALSE; // Allow sort
		$this->LATESTOV->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['LATESTOV'] = &$this->LATESTOV;

		// ITEMTYPE
		$this->ITEMTYPE = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_ITEMTYPE', 'ITEMTYPE', '`ITEMTYPE`', '`ITEMTYPE`', 200, 45, -1, FALSE, '`ITEMTYPE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ITEMTYPE->Sortable = FALSE; // Allow sort
		$this->fields['ITEMTYPE'] = &$this->ITEMTYPE;

		// ROWID
		$this->ROWID = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_ROWID', 'ROWID', '`ROWID`', '`ROWID`', 200, 45, -1, FALSE, '`ROWID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ROWID->Sortable = FALSE; // Allow sort
		$this->fields['ROWID'] = &$this->ROWID;

		// MOVED
		$this->MOVED = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_MOVED', 'MOVED', '`MOVED`', '`MOVED`', 3, 11, -1, FALSE, '`MOVED`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MOVED->Sortable = FALSE; // Allow sort
		$this->MOVED->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['MOVED'] = &$this->MOVED;

		// NEWTAX
		$this->NEWTAX = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_NEWTAX', 'NEWTAX', '`NEWTAX`', '`NEWTAX`', 131, 12, -1, FALSE, '`NEWTAX`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NEWTAX->Sortable = FALSE; // Allow sort
		$this->NEWTAX->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['NEWTAX'] = &$this->NEWTAX;

		// HSNCODE
		$this->HSNCODE = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_HSNCODE', 'HSNCODE', '`HSNCODE`', '`HSNCODE`', 200, 45, -1, FALSE, '`HSNCODE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HSNCODE->Sortable = FALSE; // Allow sort
		$this->fields['HSNCODE'] = &$this->HSNCODE;

		// OLDTAX
		$this->OLDTAX = new DbField('pharmacy_storemast', 'pharmacy_storemast', 'x_OLDTAX', 'OLDTAX', '`OLDTAX`', '`OLDTAX`', 131, 12, -1, FALSE, '`OLDTAX`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OLDTAX->Sortable = FALSE; // Allow sort
		$this->OLDTAX->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['OLDTAX'] = &$this->OLDTAX;
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
		$this->TableFilter = "";
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
			return "pharmacy_storemastlist.php";
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
		if ($pageName == "pharmacy_storemastview.php")
			return $Language->phrase("View");
		elseif ($pageName == "pharmacy_storemastedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "pharmacy_storemastadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "pharmacy_storemastlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("pharmacy_storemastview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("pharmacy_storemastview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "pharmacy_storemastadd.php?" . $this->getUrlParm($parm);
		else
			$url = "pharmacy_storemastadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("pharmacy_storemastedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("pharmacy_storemastadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("pharmacy_storemastdelete.php", $this->getUrlParm());
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
		$this->BRCODE->setDbValue($rs->fields('BRCODE'));
		$this->PRC->setDbValue($rs->fields('PRC'));
		$this->TYPE->setDbValue($rs->fields('TYPE'));
		$this->DES->setDbValue($rs->fields('DES'));
		$this->UM->setDbValue($rs->fields('UM'));
		$this->RT->setDbValue($rs->fields('RT'));
		$this->UR->setDbValue($rs->fields('UR'));
		$this->TAXP->setDbValue($rs->fields('TAXP'));
		$this->BATCHNO->setDbValue($rs->fields('BATCHNO'));
		$this->OQ->setDbValue($rs->fields('OQ'));
		$this->RQ->setDbValue($rs->fields('RQ'));
		$this->MRQ->setDbValue($rs->fields('MRQ'));
		$this->IQ->setDbValue($rs->fields('IQ'));
		$this->MRP->setDbValue($rs->fields('MRP'));
		$this->EXPDT->setDbValue($rs->fields('EXPDT'));
		$this->SALQTY->setDbValue($rs->fields('SALQTY'));
		$this->LASTPURDT->setDbValue($rs->fields('LASTPURDT'));
		$this->LASTSUPP->setDbValue($rs->fields('LASTSUPP'));
		$this->GENNAME->setDbValue($rs->fields('GENNAME'));
		$this->LASTISSDT->setDbValue($rs->fields('LASTISSDT'));
		$this->CREATEDDT->setDbValue($rs->fields('CREATEDDT'));
		$this->OPPRC->setDbValue($rs->fields('OPPRC'));
		$this->RESTRICT->setDbValue($rs->fields('RESTRICT'));
		$this->BAWAPRC->setDbValue($rs->fields('BAWAPRC'));
		$this->STAXPER->setDbValue($rs->fields('STAXPER'));
		$this->TAXTYPE->setDbValue($rs->fields('TAXTYPE'));
		$this->OLDTAXP->setDbValue($rs->fields('OLDTAXP'));
		$this->TAXUPD->setDbValue($rs->fields('TAXUPD'));
		$this->PACKAGE->setDbValue($rs->fields('PACKAGE'));
		$this->NEWRT->setDbValue($rs->fields('NEWRT'));
		$this->NEWMRP->setDbValue($rs->fields('NEWMRP'));
		$this->NEWUR->setDbValue($rs->fields('NEWUR'));
		$this->STATUS->setDbValue($rs->fields('STATUS'));
		$this->RETNQTY->setDbValue($rs->fields('RETNQTY'));
		$this->KEMODISC->setDbValue($rs->fields('KEMODISC'));
		$this->PATSALE->setDbValue($rs->fields('PATSALE'));
		$this->ORGAN->setDbValue($rs->fields('ORGAN'));
		$this->OLDRQ->setDbValue($rs->fields('OLDRQ'));
		$this->DRID->setDbValue($rs->fields('DRID'));
		$this->MFRCODE->setDbValue($rs->fields('MFRCODE'));
		$this->COMBCODE->setDbValue($rs->fields('COMBCODE'));
		$this->GENCODE->setDbValue($rs->fields('GENCODE'));
		$this->STRENGTH->setDbValue($rs->fields('STRENGTH'));
		$this->UNIT->setDbValue($rs->fields('UNIT'));
		$this->FORMULARY->setDbValue($rs->fields('FORMULARY'));
		$this->STOCK->setDbValue($rs->fields('STOCK'));
		$this->RACKNO->setDbValue($rs->fields('RACKNO'));
		$this->SUPPNAME->setDbValue($rs->fields('SUPPNAME'));
		$this->COMBNAME->setDbValue($rs->fields('COMBNAME'));
		$this->GENERICNAME->setDbValue($rs->fields('GENERICNAME'));
		$this->REMARK->setDbValue($rs->fields('REMARK'));
		$this->TEMP->setDbValue($rs->fields('TEMP'));
		$this->PACKING->setDbValue($rs->fields('PACKING'));
		$this->PhysQty->setDbValue($rs->fields('PhysQty'));
		$this->LedQty->setDbValue($rs->fields('LedQty'));
		$this->id->setDbValue($rs->fields('id'));
		$this->PurValue->setDbValue($rs->fields('PurValue'));
		$this->PSGST->setDbValue($rs->fields('PSGST'));
		$this->PCGST->setDbValue($rs->fields('PCGST'));
		$this->SaleValue->setDbValue($rs->fields('SaleValue'));
		$this->SSGST->setDbValue($rs->fields('SSGST'));
		$this->SCGST->setDbValue($rs->fields('SCGST'));
		$this->SaleRate->setDbValue($rs->fields('SaleRate'));
		$this->HospID->setDbValue($rs->fields('HospID'));
		$this->BRNAME->setDbValue($rs->fields('BRNAME'));
		$this->OV->setDbValue($rs->fields('OV'));
		$this->LATESTOV->setDbValue($rs->fields('LATESTOV'));
		$this->ITEMTYPE->setDbValue($rs->fields('ITEMTYPE'));
		$this->ROWID->setDbValue($rs->fields('ROWID'));
		$this->MOVED->setDbValue($rs->fields('MOVED'));
		$this->NEWTAX->setDbValue($rs->fields('NEWTAX'));
		$this->HSNCODE->setDbValue($rs->fields('HSNCODE'));
		$this->OLDTAX->setDbValue($rs->fields('OLDTAX'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

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

		$this->OV->CellCssStyle = "white-space: nowrap;";

		// LATESTOV
		$this->LATESTOV->CellCssStyle = "white-space: nowrap;";

		// ITEMTYPE
		$this->ITEMTYPE->CellCssStyle = "white-space: nowrap;";

		// ROWID
		$this->ROWID->CellCssStyle = "white-space: nowrap;";

		// MOVED
		$this->MOVED->CellCssStyle = "white-space: nowrap;";

		// NEWTAX
		$this->NEWTAX->CellCssStyle = "white-space: nowrap;";

		// HSNCODE
		$this->HSNCODE->CellCssStyle = "white-space: nowrap;";

		// OLDTAX
		$this->OLDTAX->CellCssStyle = "white-space: nowrap;";

		// BRCODE
		$this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
		$this->BRCODE->ViewCustomAttributes = "";

		// PRC
		$this->PRC->ViewValue = $this->PRC->CurrentValue;
		$this->PRC->ViewCustomAttributes = "";

		// TYPE
		if (strval($this->TYPE->CurrentValue) != "") {
			$this->TYPE->ViewValue = $this->TYPE->optionCaption($this->TYPE->CurrentValue);
		} else {
			$this->TYPE->ViewValue = NULL;
		}
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
		$curVal = strval($this->LASTSUPP->CurrentValue);
		if ($curVal != "") {
			$this->LASTSUPP->ViewValue = $this->LASTSUPP->lookupCacheOption($curVal);
			if ($this->LASTSUPP->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Suppliername`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->LASTSUPP->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->LASTSUPP->ViewValue = $this->LASTSUPP->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->LASTSUPP->ViewValue = $this->LASTSUPP->CurrentValue;
				}
			}
		} else {
			$this->LASTSUPP->ViewValue = NULL;
		}
		$this->LASTSUPP->ViewCustomAttributes = "";

		// GENNAME
		$this->GENNAME->ViewValue = $this->GENNAME->CurrentValue;
		$curVal = strval($this->GENNAME->CurrentValue);
		if ($curVal != "") {
			$this->GENNAME->ViewValue = $this->GENNAME->lookupCacheOption($curVal);
			if ($this->GENNAME->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`GENNAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->GENNAME->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->GENNAME->ViewValue = $this->GENNAME->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->GENNAME->ViewValue = $this->GENNAME->CurrentValue;
				}
			}
		} else {
			$this->GENNAME->ViewValue = NULL;
		}
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
		$curVal = strval($this->DRID->CurrentValue);
		if ($curVal != "") {
			$this->DRID->ViewValue = $this->DRID->lookupCacheOption($curVal);
			if ($this->DRID->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->DRID->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->DRID->ViewValue = $this->DRID->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->DRID->ViewValue = $this->DRID->CurrentValue;
				}
			}
		} else {
			$this->DRID->ViewValue = NULL;
		}
		$this->DRID->ViewCustomAttributes = "";

		// MFRCODE
		$curVal = strval($this->MFRCODE->CurrentValue);
		if ($curVal != "") {
			$this->MFRCODE->ViewValue = $this->MFRCODE->lookupCacheOption($curVal);
			if ($this->MFRCODE->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`CODE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->MFRCODE->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->MFRCODE->ViewValue = $this->MFRCODE->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
				}
			}
		} else {
			$this->MFRCODE->ViewValue = NULL;
		}
		$this->MFRCODE->ViewCustomAttributes = "";

		// COMBCODE
		$curVal = strval($this->COMBCODE->CurrentValue);
		if ($curVal != "") {
			$this->COMBCODE->ViewValue = $this->COMBCODE->lookupCacheOption($curVal);
			if ($this->COMBCODE->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`CODE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->COMBCODE->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$this->COMBCODE->ViewValue = $this->COMBCODE->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->COMBCODE->ViewValue = $this->COMBCODE->CurrentValue;
				}
			}
		} else {
			$this->COMBCODE->ViewValue = NULL;
		}
		$this->COMBCODE->ViewCustomAttributes = "";

		// GENCODE
		$curVal = strval($this->GENCODE->CurrentValue);
		if ($curVal != "") {
			$this->GENCODE->ViewValue = $this->GENCODE->lookupCacheOption($curVal);
			if ($this->GENCODE->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`CODE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->GENCODE->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$this->GENCODE->ViewValue = $this->GENCODE->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->GENCODE->ViewValue = $this->GENCODE->CurrentValue;
				}
			}
		} else {
			$this->GENCODE->ViewValue = NULL;
		}
		$this->GENCODE->ViewCustomAttributes = "";

		// STRENGTH
		$this->STRENGTH->ViewValue = $this->STRENGTH->CurrentValue;
		$this->STRENGTH->ViewValue = FormatNumber($this->STRENGTH->ViewValue, 2, -2, -2, -2);
		$this->STRENGTH->ViewCustomAttributes = "";

		// UNIT
		if (strval($this->UNIT->CurrentValue) != "") {
			$this->UNIT->ViewValue = $this->UNIT->optionCaption($this->UNIT->CurrentValue);
		} else {
			$this->UNIT->ViewValue = NULL;
		}
		$this->UNIT->ViewCustomAttributes = "";

		// FORMULARY
		if (strval($this->FORMULARY->CurrentValue) != "") {
			$this->FORMULARY->ViewValue = $this->FORMULARY->optionCaption($this->FORMULARY->CurrentValue);
		} else {
			$this->FORMULARY->ViewValue = NULL;
		}
		$this->FORMULARY->ViewCustomAttributes = "";

		// STOCK
		$this->STOCK->ViewValue = $this->STOCK->CurrentValue;
		$this->STOCK->ViewValue = FormatNumber($this->STOCK->ViewValue, 2, -2, -2, -2);
		$this->STOCK->ViewCustomAttributes = "";

		// RACKNO
		$this->RACKNO->ViewValue = $this->RACKNO->CurrentValue;
		$this->RACKNO->ViewCustomAttributes = "";

		// SUPPNAME
		$curVal = strval($this->SUPPNAME->CurrentValue);
		if ($curVal != "") {
			$this->SUPPNAME->ViewValue = $this->SUPPNAME->lookupCacheOption($curVal);
			if ($this->SUPPNAME->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Suppliername`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->SUPPNAME->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->SUPPNAME->ViewValue = $this->SUPPNAME->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->SUPPNAME->ViewValue = $this->SUPPNAME->CurrentValue;
				}
			}
		} else {
			$this->SUPPNAME->ViewValue = NULL;
		}
		$this->SUPPNAME->ViewCustomAttributes = "";

		// COMBNAME
		$curVal = strval($this->COMBNAME->CurrentValue);
		if ($curVal != "") {
			$this->COMBNAME->ViewValue = $this->COMBNAME->lookupCacheOption($curVal);
			if ($this->COMBNAME->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->COMBNAME->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->COMBNAME->ViewValue = $this->COMBNAME->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->COMBNAME->ViewValue = $this->COMBNAME->CurrentValue;
				}
			}
		} else {
			$this->COMBNAME->ViewValue = NULL;
		}
		$this->COMBNAME->ViewCustomAttributes = "";

		// GENERICNAME
		$curVal = strval($this->GENERICNAME->CurrentValue);
		if ($curVal != "") {
			$this->GENERICNAME->ViewValue = $this->GENERICNAME->lookupCacheOption($curVal);
			if ($this->GENERICNAME->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`GENNAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->GENERICNAME->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->GENERICNAME->ViewValue = $this->GENERICNAME->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->GENERICNAME->ViewValue = $this->GENERICNAME->CurrentValue;
				}
			}
		} else {
			$this->GENERICNAME->ViewValue = NULL;
		}
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

		// BRCODE
		// PRC

		$this->PRC->EditAttrs["class"] = "form-control";
		$this->PRC->EditCustomAttributes = "";
		if (!$this->PRC->Raw)
			$this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
		$this->PRC->EditValue = $this->PRC->CurrentValue;
		$this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

		// TYPE
		$this->TYPE->EditAttrs["class"] = "form-control";
		$this->TYPE->EditCustomAttributes = "";
		$this->TYPE->EditValue = $this->TYPE->options(TRUE);

		// DES
		$this->DES->EditAttrs["class"] = "form-control";
		$this->DES->EditCustomAttributes = "";
		if (!$this->DES->Raw)
			$this->DES->CurrentValue = HtmlDecode($this->DES->CurrentValue);
		$this->DES->EditValue = $this->DES->CurrentValue;
		$this->DES->PlaceHolder = RemoveHtml($this->DES->caption());

		// UM
		$this->UM->EditAttrs["class"] = "form-control";
		$this->UM->EditCustomAttributes = "";
		if (!$this->UM->Raw)
			$this->UM->CurrentValue = HtmlDecode($this->UM->CurrentValue);
		$this->UM->EditValue = $this->UM->CurrentValue;
		$this->UM->PlaceHolder = RemoveHtml($this->UM->caption());

		// RT
		$this->RT->EditAttrs["class"] = "form-control";
		$this->RT->EditCustomAttributes = "";
		$this->RT->EditValue = $this->RT->CurrentValue;
		$this->RT->PlaceHolder = RemoveHtml($this->RT->caption());
		if (strval($this->RT->EditValue) != "" && is_numeric($this->RT->EditValue))
			$this->RT->EditValue = FormatNumber($this->RT->EditValue, -2, -2, -2, -2);
		

		// UR
		$this->UR->EditAttrs["class"] = "form-control";
		$this->UR->EditCustomAttributes = "";
		$this->UR->EditValue = $this->UR->CurrentValue;
		$this->UR->PlaceHolder = RemoveHtml($this->UR->caption());
		if (strval($this->UR->EditValue) != "" && is_numeric($this->UR->EditValue))
			$this->UR->EditValue = FormatNumber($this->UR->EditValue, -2, -2, -2, -2);
		

		// TAXP
		$this->TAXP->EditAttrs["class"] = "form-control";
		$this->TAXP->EditCustomAttributes = "";
		$this->TAXP->EditValue = $this->TAXP->CurrentValue;
		$this->TAXP->PlaceHolder = RemoveHtml($this->TAXP->caption());
		if (strval($this->TAXP->EditValue) != "" && is_numeric($this->TAXP->EditValue))
			$this->TAXP->EditValue = FormatNumber($this->TAXP->EditValue, -2, -2, -2, -2);
		

		// BATCHNO
		$this->BATCHNO->EditAttrs["class"] = "form-control";
		$this->BATCHNO->EditCustomAttributes = "";
		if (!$this->BATCHNO->Raw)
			$this->BATCHNO->CurrentValue = HtmlDecode($this->BATCHNO->CurrentValue);
		$this->BATCHNO->EditValue = $this->BATCHNO->CurrentValue;
		$this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

		// OQ
		$this->OQ->EditAttrs["class"] = "form-control";
		$this->OQ->EditCustomAttributes = "";
		$this->OQ->EditValue = $this->OQ->CurrentValue;
		$this->OQ->PlaceHolder = RemoveHtml($this->OQ->caption());
		if (strval($this->OQ->EditValue) != "" && is_numeric($this->OQ->EditValue))
			$this->OQ->EditValue = FormatNumber($this->OQ->EditValue, -2, -2, -2, -2);
		

		// RQ
		$this->RQ->EditAttrs["class"] = "form-control";
		$this->RQ->EditCustomAttributes = "";
		$this->RQ->EditValue = $this->RQ->CurrentValue;
		$this->RQ->PlaceHolder = RemoveHtml($this->RQ->caption());
		if (strval($this->RQ->EditValue) != "" && is_numeric($this->RQ->EditValue))
			$this->RQ->EditValue = FormatNumber($this->RQ->EditValue, -2, -2, -2, -2);
		

		// MRQ
		$this->MRQ->EditAttrs["class"] = "form-control";
		$this->MRQ->EditCustomAttributes = "";
		$this->MRQ->EditValue = $this->MRQ->CurrentValue;
		$this->MRQ->PlaceHolder = RemoveHtml($this->MRQ->caption());
		if (strval($this->MRQ->EditValue) != "" && is_numeric($this->MRQ->EditValue))
			$this->MRQ->EditValue = FormatNumber($this->MRQ->EditValue, -2, -2, -2, -2);
		

		// IQ
		$this->IQ->EditAttrs["class"] = "form-control";
		$this->IQ->EditCustomAttributes = "";
		$this->IQ->EditValue = $this->IQ->CurrentValue;
		$this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());
		if (strval($this->IQ->EditValue) != "" && is_numeric($this->IQ->EditValue))
			$this->IQ->EditValue = FormatNumber($this->IQ->EditValue, -2, -2, -2, -2);
		

		// MRP
		$this->MRP->EditAttrs["class"] = "form-control";
		$this->MRP->EditCustomAttributes = "";
		$this->MRP->EditValue = $this->MRP->CurrentValue;
		$this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());
		if (strval($this->MRP->EditValue) != "" && is_numeric($this->MRP->EditValue))
			$this->MRP->EditValue = FormatNumber($this->MRP->EditValue, -2, -2, -2, -2);
		

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
		if (strval($this->SALQTY->EditValue) != "" && is_numeric($this->SALQTY->EditValue))
			$this->SALQTY->EditValue = FormatNumber($this->SALQTY->EditValue, -2, -2, -2, -2);
		

		// LASTPURDT
		$this->LASTPURDT->EditAttrs["class"] = "form-control";
		$this->LASTPURDT->EditCustomAttributes = "";
		$this->LASTPURDT->EditValue = FormatDateTime($this->LASTPURDT->CurrentValue, 8);
		$this->LASTPURDT->PlaceHolder = RemoveHtml($this->LASTPURDT->caption());

		// LASTSUPP
		$this->LASTSUPP->EditAttrs["class"] = "form-control";
		$this->LASTSUPP->EditCustomAttributes = "";

		// GENNAME
		$this->GENNAME->EditAttrs["class"] = "form-control";
		$this->GENNAME->EditCustomAttributes = "";
		if (!$this->GENNAME->Raw)
			$this->GENNAME->CurrentValue = HtmlDecode($this->GENNAME->CurrentValue);
		$this->GENNAME->EditValue = $this->GENNAME->CurrentValue;
		$this->GENNAME->PlaceHolder = RemoveHtml($this->GENNAME->caption());

		// LASTISSDT
		$this->LASTISSDT->EditAttrs["class"] = "form-control";
		$this->LASTISSDT->EditCustomAttributes = "";
		$this->LASTISSDT->EditValue = FormatDateTime($this->LASTISSDT->CurrentValue, 8);
		$this->LASTISSDT->PlaceHolder = RemoveHtml($this->LASTISSDT->caption());

		// CREATEDDT
		// OPPRC

		$this->OPPRC->EditAttrs["class"] = "form-control";
		$this->OPPRC->EditCustomAttributes = "";
		if (!$this->OPPRC->Raw)
			$this->OPPRC->CurrentValue = HtmlDecode($this->OPPRC->CurrentValue);
		$this->OPPRC->EditValue = $this->OPPRC->CurrentValue;
		$this->OPPRC->PlaceHolder = RemoveHtml($this->OPPRC->caption());

		// RESTRICT
		$this->RESTRICT->EditAttrs["class"] = "form-control";
		$this->RESTRICT->EditCustomAttributes = "";
		if (!$this->RESTRICT->Raw)
			$this->RESTRICT->CurrentValue = HtmlDecode($this->RESTRICT->CurrentValue);
		$this->RESTRICT->EditValue = $this->RESTRICT->CurrentValue;
		$this->RESTRICT->PlaceHolder = RemoveHtml($this->RESTRICT->caption());

		// BAWAPRC
		$this->BAWAPRC->EditAttrs["class"] = "form-control";
		$this->BAWAPRC->EditCustomAttributes = "";
		if (!$this->BAWAPRC->Raw)
			$this->BAWAPRC->CurrentValue = HtmlDecode($this->BAWAPRC->CurrentValue);
		$this->BAWAPRC->EditValue = $this->BAWAPRC->CurrentValue;
		$this->BAWAPRC->PlaceHolder = RemoveHtml($this->BAWAPRC->caption());

		// STAXPER
		$this->STAXPER->EditAttrs["class"] = "form-control";
		$this->STAXPER->EditCustomAttributes = "";
		$this->STAXPER->EditValue = $this->STAXPER->CurrentValue;
		$this->STAXPER->PlaceHolder = RemoveHtml($this->STAXPER->caption());
		if (strval($this->STAXPER->EditValue) != "" && is_numeric($this->STAXPER->EditValue))
			$this->STAXPER->EditValue = FormatNumber($this->STAXPER->EditValue, -2, -2, -2, -2);
		

		// TAXTYPE
		$this->TAXTYPE->EditAttrs["class"] = "form-control";
		$this->TAXTYPE->EditCustomAttributes = "";
		if (!$this->TAXTYPE->Raw)
			$this->TAXTYPE->CurrentValue = HtmlDecode($this->TAXTYPE->CurrentValue);
		$this->TAXTYPE->EditValue = $this->TAXTYPE->CurrentValue;
		$this->TAXTYPE->PlaceHolder = RemoveHtml($this->TAXTYPE->caption());

		// OLDTAXP
		$this->OLDTAXP->EditAttrs["class"] = "form-control";
		$this->OLDTAXP->EditCustomAttributes = "";
		$this->OLDTAXP->EditValue = $this->OLDTAXP->CurrentValue;
		$this->OLDTAXP->PlaceHolder = RemoveHtml($this->OLDTAXP->caption());
		if (strval($this->OLDTAXP->EditValue) != "" && is_numeric($this->OLDTAXP->EditValue))
			$this->OLDTAXP->EditValue = FormatNumber($this->OLDTAXP->EditValue, -2, -2, -2, -2);
		

		// TAXUPD
		$this->TAXUPD->EditAttrs["class"] = "form-control";
		$this->TAXUPD->EditCustomAttributes = "";
		if (!$this->TAXUPD->Raw)
			$this->TAXUPD->CurrentValue = HtmlDecode($this->TAXUPD->CurrentValue);
		$this->TAXUPD->EditValue = $this->TAXUPD->CurrentValue;
		$this->TAXUPD->PlaceHolder = RemoveHtml($this->TAXUPD->caption());

		// PACKAGE
		$this->PACKAGE->EditAttrs["class"] = "form-control";
		$this->PACKAGE->EditCustomAttributes = "";
		if (!$this->PACKAGE->Raw)
			$this->PACKAGE->CurrentValue = HtmlDecode($this->PACKAGE->CurrentValue);
		$this->PACKAGE->EditValue = $this->PACKAGE->CurrentValue;
		$this->PACKAGE->PlaceHolder = RemoveHtml($this->PACKAGE->caption());

		// NEWRT
		$this->NEWRT->EditAttrs["class"] = "form-control";
		$this->NEWRT->EditCustomAttributes = "";
		$this->NEWRT->EditValue = $this->NEWRT->CurrentValue;
		$this->NEWRT->PlaceHolder = RemoveHtml($this->NEWRT->caption());
		if (strval($this->NEWRT->EditValue) != "" && is_numeric($this->NEWRT->EditValue))
			$this->NEWRT->EditValue = FormatNumber($this->NEWRT->EditValue, -2, -2, -2, -2);
		

		// NEWMRP
		$this->NEWMRP->EditAttrs["class"] = "form-control";
		$this->NEWMRP->EditCustomAttributes = "";
		$this->NEWMRP->EditValue = $this->NEWMRP->CurrentValue;
		$this->NEWMRP->PlaceHolder = RemoveHtml($this->NEWMRP->caption());
		if (strval($this->NEWMRP->EditValue) != "" && is_numeric($this->NEWMRP->EditValue))
			$this->NEWMRP->EditValue = FormatNumber($this->NEWMRP->EditValue, -2, -2, -2, -2);
		

		// NEWUR
		$this->NEWUR->EditAttrs["class"] = "form-control";
		$this->NEWUR->EditCustomAttributes = "";
		$this->NEWUR->EditValue = $this->NEWUR->CurrentValue;
		$this->NEWUR->PlaceHolder = RemoveHtml($this->NEWUR->caption());
		if (strval($this->NEWUR->EditValue) != "" && is_numeric($this->NEWUR->EditValue))
			$this->NEWUR->EditValue = FormatNumber($this->NEWUR->EditValue, -2, -2, -2, -2);
		

		// STATUS
		$this->STATUS->EditAttrs["class"] = "form-control";
		$this->STATUS->EditCustomAttributes = "";
		if (!$this->STATUS->Raw)
			$this->STATUS->CurrentValue = HtmlDecode($this->STATUS->CurrentValue);
		$this->STATUS->EditValue = $this->STATUS->CurrentValue;
		$this->STATUS->PlaceHolder = RemoveHtml($this->STATUS->caption());

		// RETNQTY
		$this->RETNQTY->EditAttrs["class"] = "form-control";
		$this->RETNQTY->EditCustomAttributes = "";
		$this->RETNQTY->EditValue = $this->RETNQTY->CurrentValue;
		$this->RETNQTY->PlaceHolder = RemoveHtml($this->RETNQTY->caption());
		if (strval($this->RETNQTY->EditValue) != "" && is_numeric($this->RETNQTY->EditValue))
			$this->RETNQTY->EditValue = FormatNumber($this->RETNQTY->EditValue, -2, -2, -2, -2);
		

		// KEMODISC
		$this->KEMODISC->EditAttrs["class"] = "form-control";
		$this->KEMODISC->EditCustomAttributes = "";
		if (!$this->KEMODISC->Raw)
			$this->KEMODISC->CurrentValue = HtmlDecode($this->KEMODISC->CurrentValue);
		$this->KEMODISC->EditValue = $this->KEMODISC->CurrentValue;
		$this->KEMODISC->PlaceHolder = RemoveHtml($this->KEMODISC->caption());

		// PATSALE
		$this->PATSALE->EditAttrs["class"] = "form-control";
		$this->PATSALE->EditCustomAttributes = "";
		$this->PATSALE->EditValue = $this->PATSALE->CurrentValue;
		$this->PATSALE->PlaceHolder = RemoveHtml($this->PATSALE->caption());
		if (strval($this->PATSALE->EditValue) != "" && is_numeric($this->PATSALE->EditValue))
			$this->PATSALE->EditValue = FormatNumber($this->PATSALE->EditValue, -2, -2, -2, -2);
		

		// ORGAN
		$this->ORGAN->EditAttrs["class"] = "form-control";
		$this->ORGAN->EditCustomAttributes = "";
		if (!$this->ORGAN->Raw)
			$this->ORGAN->CurrentValue = HtmlDecode($this->ORGAN->CurrentValue);
		$this->ORGAN->EditValue = $this->ORGAN->CurrentValue;
		$this->ORGAN->PlaceHolder = RemoveHtml($this->ORGAN->caption());

		// OLDRQ
		$this->OLDRQ->EditAttrs["class"] = "form-control";
		$this->OLDRQ->EditCustomAttributes = "";
		$this->OLDRQ->EditValue = $this->OLDRQ->CurrentValue;
		$this->OLDRQ->PlaceHolder = RemoveHtml($this->OLDRQ->caption());
		if (strval($this->OLDRQ->EditValue) != "" && is_numeric($this->OLDRQ->EditValue))
			$this->OLDRQ->EditValue = FormatNumber($this->OLDRQ->EditValue, -2, -2, -2, -2);
		

		// DRID
		$this->DRID->EditAttrs["class"] = "form-control";
		$this->DRID->EditCustomAttributes = "";

		// MFRCODE
		$this->MFRCODE->EditAttrs["class"] = "form-control";
		$this->MFRCODE->EditCustomAttributes = "";

		// COMBCODE
		$this->COMBCODE->EditAttrs["class"] = "form-control";
		$this->COMBCODE->EditCustomAttributes = "";

		// GENCODE
		$this->GENCODE->EditAttrs["class"] = "form-control";
		$this->GENCODE->EditCustomAttributes = "";

		// STRENGTH
		$this->STRENGTH->EditAttrs["class"] = "form-control";
		$this->STRENGTH->EditCustomAttributes = "";
		$this->STRENGTH->EditValue = $this->STRENGTH->CurrentValue;
		$this->STRENGTH->PlaceHolder = RemoveHtml($this->STRENGTH->caption());
		if (strval($this->STRENGTH->EditValue) != "" && is_numeric($this->STRENGTH->EditValue))
			$this->STRENGTH->EditValue = FormatNumber($this->STRENGTH->EditValue, -2, -2, -2, -2);
		

		// UNIT
		$this->UNIT->EditAttrs["class"] = "form-control";
		$this->UNIT->EditCustomAttributes = "";
		$this->UNIT->EditValue = $this->UNIT->options(TRUE);

		// FORMULARY
		$this->FORMULARY->EditAttrs["class"] = "form-control";
		$this->FORMULARY->EditCustomAttributes = "";
		$this->FORMULARY->EditValue = $this->FORMULARY->options(TRUE);

		// STOCK
		$this->STOCK->EditAttrs["class"] = "form-control";
		$this->STOCK->EditCustomAttributes = "";
		$this->STOCK->EditValue = $this->STOCK->CurrentValue;
		$this->STOCK->PlaceHolder = RemoveHtml($this->STOCK->caption());
		if (strval($this->STOCK->EditValue) != "" && is_numeric($this->STOCK->EditValue))
			$this->STOCK->EditValue = FormatNumber($this->STOCK->EditValue, -2, -2, -2, -2);
		

		// RACKNO
		$this->RACKNO->EditAttrs["class"] = "form-control";
		$this->RACKNO->EditCustomAttributes = "";
		if (!$this->RACKNO->Raw)
			$this->RACKNO->CurrentValue = HtmlDecode($this->RACKNO->CurrentValue);
		$this->RACKNO->EditValue = $this->RACKNO->CurrentValue;
		$this->RACKNO->PlaceHolder = RemoveHtml($this->RACKNO->caption());

		// SUPPNAME
		$this->SUPPNAME->EditAttrs["class"] = "form-control";
		$this->SUPPNAME->EditCustomAttributes = "";

		// COMBNAME
		$this->COMBNAME->EditAttrs["class"] = "form-control";
		$this->COMBNAME->EditCustomAttributes = "";

		// GENERICNAME
		$this->GENERICNAME->EditAttrs["class"] = "form-control";
		$this->GENERICNAME->EditCustomAttributes = "";

		// REMARK
		$this->REMARK->EditAttrs["class"] = "form-control";
		$this->REMARK->EditCustomAttributes = "";
		if (!$this->REMARK->Raw)
			$this->REMARK->CurrentValue = HtmlDecode($this->REMARK->CurrentValue);
		$this->REMARK->EditValue = $this->REMARK->CurrentValue;
		$this->REMARK->PlaceHolder = RemoveHtml($this->REMARK->caption());

		// TEMP
		$this->TEMP->EditAttrs["class"] = "form-control";
		$this->TEMP->EditCustomAttributes = "";
		if (!$this->TEMP->Raw)
			$this->TEMP->CurrentValue = HtmlDecode($this->TEMP->CurrentValue);
		$this->TEMP->EditValue = $this->TEMP->CurrentValue;
		$this->TEMP->PlaceHolder = RemoveHtml($this->TEMP->caption());

		// PACKING
		$this->PACKING->EditAttrs["class"] = "form-control";
		$this->PACKING->EditCustomAttributes = "";
		$this->PACKING->EditValue = $this->PACKING->CurrentValue;
		$this->PACKING->PlaceHolder = RemoveHtml($this->PACKING->caption());
		if (strval($this->PACKING->EditValue) != "" && is_numeric($this->PACKING->EditValue))
			$this->PACKING->EditValue = FormatNumber($this->PACKING->EditValue, -2, -2, -2, -2);
		

		// PhysQty
		$this->PhysQty->EditAttrs["class"] = "form-control";
		$this->PhysQty->EditCustomAttributes = "";
		$this->PhysQty->EditValue = $this->PhysQty->CurrentValue;
		$this->PhysQty->PlaceHolder = RemoveHtml($this->PhysQty->caption());
		if (strval($this->PhysQty->EditValue) != "" && is_numeric($this->PhysQty->EditValue))
			$this->PhysQty->EditValue = FormatNumber($this->PhysQty->EditValue, -2, -2, -2, -2);
		

		// LedQty
		$this->LedQty->EditAttrs["class"] = "form-control";
		$this->LedQty->EditCustomAttributes = "";
		$this->LedQty->EditValue = $this->LedQty->CurrentValue;
		$this->LedQty->PlaceHolder = RemoveHtml($this->LedQty->caption());
		if (strval($this->LedQty->EditValue) != "" && is_numeric($this->LedQty->EditValue))
			$this->LedQty->EditValue = FormatNumber($this->LedQty->EditValue, -2, -2, -2, -2);
		

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
		if (strval($this->PurValue->EditValue) != "" && is_numeric($this->PurValue->EditValue))
			$this->PurValue->EditValue = FormatNumber($this->PurValue->EditValue, -2, -2, -2, -2);
		

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
		

		// SaleValue
		$this->SaleValue->EditAttrs["class"] = "form-control";
		$this->SaleValue->EditCustomAttributes = "";
		$this->SaleValue->EditValue = $this->SaleValue->CurrentValue;
		$this->SaleValue->PlaceHolder = RemoveHtml($this->SaleValue->caption());
		if (strval($this->SaleValue->EditValue) != "" && is_numeric($this->SaleValue->EditValue))
			$this->SaleValue->EditValue = FormatNumber($this->SaleValue->EditValue, -2, -2, -2, -2);
		

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
		

		// SaleRate
		$this->SaleRate->EditAttrs["class"] = "form-control";
		$this->SaleRate->EditCustomAttributes = "";
		$this->SaleRate->EditValue = $this->SaleRate->CurrentValue;
		$this->SaleRate->PlaceHolder = RemoveHtml($this->SaleRate->caption());
		if (strval($this->SaleRate->EditValue) != "" && is_numeric($this->SaleRate->EditValue))
			$this->SaleRate->EditValue = FormatNumber($this->SaleRate->EditValue, -2, -2, -2, -2);
		

		// HospID
		// BRNAME
		// OV

		$this->OV->EditAttrs["class"] = "form-control";
		$this->OV->EditCustomAttributes = "";
		$this->OV->EditValue = $this->OV->CurrentValue;
		$this->OV->PlaceHolder = RemoveHtml($this->OV->caption());
		if (strval($this->OV->EditValue) != "" && is_numeric($this->OV->EditValue))
			$this->OV->EditValue = FormatNumber($this->OV->EditValue, -2, -2, -2, -2);
		

		// LATESTOV
		$this->LATESTOV->EditAttrs["class"] = "form-control";
		$this->LATESTOV->EditCustomAttributes = "";
		$this->LATESTOV->EditValue = $this->LATESTOV->CurrentValue;
		$this->LATESTOV->PlaceHolder = RemoveHtml($this->LATESTOV->caption());
		if (strval($this->LATESTOV->EditValue) != "" && is_numeric($this->LATESTOV->EditValue))
			$this->LATESTOV->EditValue = FormatNumber($this->LATESTOV->EditValue, -2, -2, -2, -2);
		

		// ITEMTYPE
		$this->ITEMTYPE->EditAttrs["class"] = "form-control";
		$this->ITEMTYPE->EditCustomAttributes = "";
		if (!$this->ITEMTYPE->Raw)
			$this->ITEMTYPE->CurrentValue = HtmlDecode($this->ITEMTYPE->CurrentValue);
		$this->ITEMTYPE->EditValue = $this->ITEMTYPE->CurrentValue;
		$this->ITEMTYPE->PlaceHolder = RemoveHtml($this->ITEMTYPE->caption());

		// ROWID
		$this->ROWID->EditAttrs["class"] = "form-control";
		$this->ROWID->EditCustomAttributes = "";
		if (!$this->ROWID->Raw)
			$this->ROWID->CurrentValue = HtmlDecode($this->ROWID->CurrentValue);
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
		if (strval($this->NEWTAX->EditValue) != "" && is_numeric($this->NEWTAX->EditValue))
			$this->NEWTAX->EditValue = FormatNumber($this->NEWTAX->EditValue, -2, -2, -2, -2);
		

		// HSNCODE
		$this->HSNCODE->EditAttrs["class"] = "form-control";
		$this->HSNCODE->EditCustomAttributes = "";
		if (!$this->HSNCODE->Raw)
			$this->HSNCODE->CurrentValue = HtmlDecode($this->HSNCODE->CurrentValue);
		$this->HSNCODE->EditValue = $this->HSNCODE->CurrentValue;
		$this->HSNCODE->PlaceHolder = RemoveHtml($this->HSNCODE->caption());

		// OLDTAX
		$this->OLDTAX->EditAttrs["class"] = "form-control";
		$this->OLDTAX->EditCustomAttributes = "";
		$this->OLDTAX->EditValue = $this->OLDTAX->CurrentValue;
		$this->OLDTAX->PlaceHolder = RemoveHtml($this->OLDTAX->caption());
		if (strval($this->OLDTAX->EditValue) != "" && is_numeric($this->OLDTAX->EditValue))
			$this->OLDTAX->EditValue = FormatNumber($this->OLDTAX->EditValue, -2, -2, -2, -2);
		

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
					$doc->exportCaption($this->BRCODE);
					$doc->exportCaption($this->PRC);
					$doc->exportCaption($this->TYPE);
					$doc->exportCaption($this->DES);
					$doc->exportCaption($this->UM);
					$doc->exportCaption($this->RT);
					$doc->exportCaption($this->BATCHNO);
					$doc->exportCaption($this->MRP);
					$doc->exportCaption($this->EXPDT);
					$doc->exportCaption($this->LASTPURDT);
					$doc->exportCaption($this->LASTSUPP);
					$doc->exportCaption($this->GENNAME);
					$doc->exportCaption($this->LASTISSDT);
					$doc->exportCaption($this->CREATEDDT);
					$doc->exportCaption($this->DRID);
					$doc->exportCaption($this->MFRCODE);
					$doc->exportCaption($this->COMBCODE);
					$doc->exportCaption($this->GENCODE);
					$doc->exportCaption($this->STRENGTH);
					$doc->exportCaption($this->UNIT);
					$doc->exportCaption($this->FORMULARY);
					$doc->exportCaption($this->RACKNO);
					$doc->exportCaption($this->SUPPNAME);
					$doc->exportCaption($this->COMBNAME);
					$doc->exportCaption($this->GENERICNAME);
					$doc->exportCaption($this->REMARK);
					$doc->exportCaption($this->TEMP);
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
					$doc->exportCaption($this->BATCHNO);
					$doc->exportCaption($this->MRP);
					$doc->exportCaption($this->EXPDT);
					$doc->exportCaption($this->LASTPURDT);
					$doc->exportCaption($this->LASTSUPP);
					$doc->exportCaption($this->GENNAME);
					$doc->exportCaption($this->LASTISSDT);
					$doc->exportCaption($this->CREATEDDT);
					$doc->exportCaption($this->DRID);
					$doc->exportCaption($this->MFRCODE);
					$doc->exportCaption($this->COMBCODE);
					$doc->exportCaption($this->GENCODE);
					$doc->exportCaption($this->STRENGTH);
					$doc->exportCaption($this->UNIT);
					$doc->exportCaption($this->FORMULARY);
					$doc->exportCaption($this->RACKNO);
					$doc->exportCaption($this->SUPPNAME);
					$doc->exportCaption($this->COMBNAME);
					$doc->exportCaption($this->GENERICNAME);
					$doc->exportCaption($this->REMARK);
					$doc->exportCaption($this->TEMP);
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
						$doc->exportField($this->BRCODE);
						$doc->exportField($this->PRC);
						$doc->exportField($this->TYPE);
						$doc->exportField($this->DES);
						$doc->exportField($this->UM);
						$doc->exportField($this->RT);
						$doc->exportField($this->BATCHNO);
						$doc->exportField($this->MRP);
						$doc->exportField($this->EXPDT);
						$doc->exportField($this->LASTPURDT);
						$doc->exportField($this->LASTSUPP);
						$doc->exportField($this->GENNAME);
						$doc->exportField($this->LASTISSDT);
						$doc->exportField($this->CREATEDDT);
						$doc->exportField($this->DRID);
						$doc->exportField($this->MFRCODE);
						$doc->exportField($this->COMBCODE);
						$doc->exportField($this->GENCODE);
						$doc->exportField($this->STRENGTH);
						$doc->exportField($this->UNIT);
						$doc->exportField($this->FORMULARY);
						$doc->exportField($this->RACKNO);
						$doc->exportField($this->SUPPNAME);
						$doc->exportField($this->COMBNAME);
						$doc->exportField($this->GENERICNAME);
						$doc->exportField($this->REMARK);
						$doc->exportField($this->TEMP);
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
						$doc->exportField($this->BATCHNO);
						$doc->exportField($this->MRP);
						$doc->exportField($this->EXPDT);
						$doc->exportField($this->LASTPURDT);
						$doc->exportField($this->LASTSUPP);
						$doc->exportField($this->GENNAME);
						$doc->exportField($this->LASTISSDT);
						$doc->exportField($this->CREATEDDT);
						$doc->exportField($this->DRID);
						$doc->exportField($this->MFRCODE);
						$doc->exportField($this->COMBCODE);
						$doc->exportField($this->GENCODE);
						$doc->exportField($this->STRENGTH);
						$doc->exportField($this->UNIT);
						$doc->exportField($this->FORMULARY);
						$doc->exportField($this->RACKNO);
						$doc->exportField($this->SUPPNAME);
						$doc->exportField($this->COMBNAME);
						$doc->exportField($this->GENERICNAME);
						$doc->exportField($this->REMARK);
						$doc->exportField($this->TEMP);
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