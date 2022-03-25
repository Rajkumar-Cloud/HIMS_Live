<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for store_batchmas
 */
class store_batchmas extends DbTable
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
	public $PRC;
	public $BATCHNO;
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
	public $id;
	public $PrName;
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
	public $PUnit;
	public $SUnit;
	public $PurValue;
	public $PurRate;
	public $StoreID;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'store_batchmas';
		$this->TableName = 'store_batchmas';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`store_batchmas`";
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

		// PRC
		$this->PRC = new DbField('store_batchmas', 'store_batchmas', 'x_PRC', 'PRC', '`PRC`', '`PRC`', 200, -1, FALSE, '`PRC`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PRC->Sortable = TRUE; // Allow sort
		$this->fields['PRC'] = &$this->PRC;

		// BATCHNO
		$this->BATCHNO = new DbField('store_batchmas', 'store_batchmas', 'x_BATCHNO', 'BATCHNO', '`BATCHNO`', '`BATCHNO`', 200, -1, FALSE, '`BATCHNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BATCHNO->Sortable = TRUE; // Allow sort
		$this->fields['BATCHNO'] = &$this->BATCHNO;

		// OQ
		$this->OQ = new DbField('store_batchmas', 'store_batchmas', 'x_OQ', 'OQ', '`OQ`', '`OQ`', 131, -1, FALSE, '`OQ`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OQ->Sortable = TRUE; // Allow sort
		$this->OQ->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['OQ'] = &$this->OQ;

		// RQ
		$this->RQ = new DbField('store_batchmas', 'store_batchmas', 'x_RQ', 'RQ', '`RQ`', '`RQ`', 131, -1, FALSE, '`RQ`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RQ->Sortable = TRUE; // Allow sort
		$this->RQ->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['RQ'] = &$this->RQ;

		// MRQ
		$this->MRQ = new DbField('store_batchmas', 'store_batchmas', 'x_MRQ', 'MRQ', '`MRQ`', '`MRQ`', 131, -1, FALSE, '`MRQ`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MRQ->Sortable = TRUE; // Allow sort
		$this->MRQ->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['MRQ'] = &$this->MRQ;

		// IQ
		$this->IQ = new DbField('store_batchmas', 'store_batchmas', 'x_IQ', 'IQ', '`IQ`', '`IQ`', 131, -1, FALSE, '`IQ`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IQ->Sortable = TRUE; // Allow sort
		$this->IQ->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['IQ'] = &$this->IQ;

		// MRP
		$this->MRP = new DbField('store_batchmas', 'store_batchmas', 'x_MRP', 'MRP', '`MRP`', '`MRP`', 131, -1, FALSE, '`MRP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MRP->Sortable = TRUE; // Allow sort
		$this->MRP->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['MRP'] = &$this->MRP;

		// EXPDT
		$this->EXPDT = new DbField('store_batchmas', 'store_batchmas', 'x_EXPDT', 'EXPDT', '`EXPDT`', CastDateFieldForLike('`EXPDT`', 0, "DB"), 135, 0, FALSE, '`EXPDT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->EXPDT->Sortable = TRUE; // Allow sort
		$this->EXPDT->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['EXPDT'] = &$this->EXPDT;

		// UR
		$this->UR = new DbField('store_batchmas', 'store_batchmas', 'x_UR', 'UR', '`UR`', '`UR`', 131, -1, FALSE, '`UR`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->UR->Sortable = TRUE; // Allow sort
		$this->UR->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['UR'] = &$this->UR;

		// RT
		$this->RT = new DbField('store_batchmas', 'store_batchmas', 'x_RT', 'RT', '`RT`', '`RT`', 131, -1, FALSE, '`RT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RT->Sortable = TRUE; // Allow sort
		$this->RT->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['RT'] = &$this->RT;

		// PRCODE
		$this->PRCODE = new DbField('store_batchmas', 'store_batchmas', 'x_PRCODE', 'PRCODE', '`PRCODE`', '`PRCODE`', 200, -1, FALSE, '`PRCODE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PRCODE->Sortable = TRUE; // Allow sort
		$this->fields['PRCODE'] = &$this->PRCODE;

		// BATCH
		$this->BATCH = new DbField('store_batchmas', 'store_batchmas', 'x_BATCH', 'BATCH', '`BATCH`', '`BATCH`', 200, -1, FALSE, '`BATCH`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BATCH->Sortable = TRUE; // Allow sort
		$this->fields['BATCH'] = &$this->BATCH;

		// PC
		$this->PC = new DbField('store_batchmas', 'store_batchmas', 'x_PC', 'PC', '`PC`', '`PC`', 200, -1, FALSE, '`PC`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PC->Sortable = TRUE; // Allow sort
		$this->fields['PC'] = &$this->PC;

		// OLDRT
		$this->OLDRT = new DbField('store_batchmas', 'store_batchmas', 'x_OLDRT', 'OLDRT', '`OLDRT`', '`OLDRT`', 131, -1, FALSE, '`OLDRT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OLDRT->Sortable = TRUE; // Allow sort
		$this->OLDRT->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['OLDRT'] = &$this->OLDRT;

		// TEMPMRQ
		$this->TEMPMRQ = new DbField('store_batchmas', 'store_batchmas', 'x_TEMPMRQ', 'TEMPMRQ', '`TEMPMRQ`', '`TEMPMRQ`', 131, -1, FALSE, '`TEMPMRQ`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TEMPMRQ->Sortable = TRUE; // Allow sort
		$this->TEMPMRQ->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['TEMPMRQ'] = &$this->TEMPMRQ;

		// TAXP
		$this->TAXP = new DbField('store_batchmas', 'store_batchmas', 'x_TAXP', 'TAXP', '`TAXP`', '`TAXP`', 131, -1, FALSE, '`TAXP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TAXP->Sortable = TRUE; // Allow sort
		$this->TAXP->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['TAXP'] = &$this->TAXP;

		// OLDRATE
		$this->OLDRATE = new DbField('store_batchmas', 'store_batchmas', 'x_OLDRATE', 'OLDRATE', '`OLDRATE`', '`OLDRATE`', 131, -1, FALSE, '`OLDRATE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OLDRATE->Sortable = TRUE; // Allow sort
		$this->OLDRATE->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['OLDRATE'] = &$this->OLDRATE;

		// NEWRATE
		$this->NEWRATE = new DbField('store_batchmas', 'store_batchmas', 'x_NEWRATE', 'NEWRATE', '`NEWRATE`', '`NEWRATE`', 131, -1, FALSE, '`NEWRATE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NEWRATE->Sortable = TRUE; // Allow sort
		$this->NEWRATE->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['NEWRATE'] = &$this->NEWRATE;

		// OTEMPMRA
		$this->OTEMPMRA = new DbField('store_batchmas', 'store_batchmas', 'x_OTEMPMRA', 'OTEMPMRA', '`OTEMPMRA`', '`OTEMPMRA`', 131, -1, FALSE, '`OTEMPMRA`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OTEMPMRA->Sortable = TRUE; // Allow sort
		$this->OTEMPMRA->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['OTEMPMRA'] = &$this->OTEMPMRA;

		// ACTIVESTATUS
		$this->ACTIVESTATUS = new DbField('store_batchmas', 'store_batchmas', 'x_ACTIVESTATUS', 'ACTIVESTATUS', '`ACTIVESTATUS`', '`ACTIVESTATUS`', 200, -1, FALSE, '`ACTIVESTATUS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ACTIVESTATUS->Sortable = TRUE; // Allow sort
		$this->fields['ACTIVESTATUS'] = &$this->ACTIVESTATUS;

		// id
		$this->id = new DbField('store_batchmas', 'store_batchmas', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// PrName
		$this->PrName = new DbField('store_batchmas', 'store_batchmas', 'x_PrName', 'PrName', '`PrName`', '`PrName`', 200, -1, FALSE, '`PrName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PrName->Sortable = TRUE; // Allow sort
		$this->fields['PrName'] = &$this->PrName;

		// PSGST
		$this->PSGST = new DbField('store_batchmas', 'store_batchmas', 'x_PSGST', 'PSGST', '`PSGST`', '`PSGST`', 131, -1, FALSE, '`PSGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PSGST->Sortable = TRUE; // Allow sort
		$this->PSGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PSGST'] = &$this->PSGST;

		// PCGST
		$this->PCGST = new DbField('store_batchmas', 'store_batchmas', 'x_PCGST', 'PCGST', '`PCGST`', '`PCGST`', 131, -1, FALSE, '`PCGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PCGST->Sortable = TRUE; // Allow sort
		$this->PCGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PCGST'] = &$this->PCGST;

		// SSGST
		$this->SSGST = new DbField('store_batchmas', 'store_batchmas', 'x_SSGST', 'SSGST', '`SSGST`', '`SSGST`', 131, -1, FALSE, '`SSGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SSGST->Sortable = TRUE; // Allow sort
		$this->SSGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['SSGST'] = &$this->SSGST;

		// SCGST
		$this->SCGST = new DbField('store_batchmas', 'store_batchmas', 'x_SCGST', 'SCGST', '`SCGST`', '`SCGST`', 131, -1, FALSE, '`SCGST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SCGST->Sortable = TRUE; // Allow sort
		$this->SCGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['SCGST'] = &$this->SCGST;

		// MFRCODE
		$this->MFRCODE = new DbField('store_batchmas', 'store_batchmas', 'x_MFRCODE', 'MFRCODE', '`MFRCODE`', '`MFRCODE`', 200, -1, FALSE, '`MFRCODE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MFRCODE->Sortable = TRUE; // Allow sort
		$this->fields['MFRCODE'] = &$this->MFRCODE;

		// BRCODE
		$this->BRCODE = new DbField('store_batchmas', 'store_batchmas', 'x_BRCODE', 'BRCODE', '`BRCODE`', '`BRCODE`', 3, -1, FALSE, '`BRCODE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BRCODE->Sortable = TRUE; // Allow sort
		$this->BRCODE->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['BRCODE'] = &$this->BRCODE;

		// FRQ
		$this->FRQ = new DbField('store_batchmas', 'store_batchmas', 'x_FRQ', 'FRQ', '`FRQ`', '`FRQ`', 131, -1, FALSE, '`FRQ`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FRQ->Sortable = TRUE; // Allow sort
		$this->FRQ->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['FRQ'] = &$this->FRQ;

		// HospID
		$this->HospID = new DbField('store_batchmas', 'store_batchmas', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HospID'] = &$this->HospID;

		// UM
		$this->UM = new DbField('store_batchmas', 'store_batchmas', 'x_UM', 'UM', '`UM`', '`UM`', 200, -1, FALSE, '`UM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->UM->Sortable = TRUE; // Allow sort
		$this->fields['UM'] = &$this->UM;

		// GENNAME
		$this->GENNAME = new DbField('store_batchmas', 'store_batchmas', 'x_GENNAME', 'GENNAME', '`GENNAME`', '`GENNAME`', 200, -1, FALSE, '`GENNAME`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->GENNAME->Sortable = TRUE; // Allow sort
		$this->fields['GENNAME'] = &$this->GENNAME;

		// BILLDATE
		$this->BILLDATE = new DbField('store_batchmas', 'store_batchmas', 'x_BILLDATE', 'BILLDATE', '`BILLDATE`', CastDateFieldForLike('`BILLDATE`', 0, "DB"), 135, 0, FALSE, '`BILLDATE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BILLDATE->Sortable = TRUE; // Allow sort
		$this->BILLDATE->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['BILLDATE'] = &$this->BILLDATE;

		// PUnit
		$this->PUnit = new DbField('store_batchmas', 'store_batchmas', 'x_PUnit', 'PUnit', '`PUnit`', '`PUnit`', 3, -1, FALSE, '`PUnit`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PUnit->Sortable = TRUE; // Allow sort
		$this->PUnit->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['PUnit'] = &$this->PUnit;

		// SUnit
		$this->SUnit = new DbField('store_batchmas', 'store_batchmas', 'x_SUnit', 'SUnit', '`SUnit`', '`SUnit`', 3, -1, FALSE, '`SUnit`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SUnit->Sortable = TRUE; // Allow sort
		$this->SUnit->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['SUnit'] = &$this->SUnit;

		// PurValue
		$this->PurValue = new DbField('store_batchmas', 'store_batchmas', 'x_PurValue', 'PurValue', '`PurValue`', '`PurValue`', 131, -1, FALSE, '`PurValue`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PurValue->Sortable = TRUE; // Allow sort
		$this->PurValue->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PurValue'] = &$this->PurValue;

		// PurRate
		$this->PurRate = new DbField('store_batchmas', 'store_batchmas', 'x_PurRate', 'PurRate', '`PurRate`', '`PurRate`', 131, -1, FALSE, '`PurRate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PurRate->Sortable = TRUE; // Allow sort
		$this->PurRate->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PurRate'] = &$this->PurRate;

		// StoreID
		$this->StoreID = new DbField('store_batchmas', 'store_batchmas', 'x_StoreID', 'StoreID', '`StoreID`', '`StoreID`', 3, -1, FALSE, '`StoreID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
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

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`store_batchmas`";
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
		$this->PRC->DbValue = $row['PRC'];
		$this->BATCHNO->DbValue = $row['BATCHNO'];
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
		$this->id->DbValue = $row['id'];
		$this->PrName->DbValue = $row['PrName'];
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
		$this->PUnit->DbValue = $row['PUnit'];
		$this->SUnit->DbValue = $row['SUnit'];
		$this->PurValue->DbValue = $row['PurValue'];
		$this->PurRate->DbValue = $row['PurRate'];
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
			return "store_batchmaslist.php";
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
		if ($pageName == "store_batchmasview.php")
			return $Language->phrase("View");
		elseif ($pageName == "store_batchmasedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "store_batchmasadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "store_batchmaslist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("store_batchmasview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("store_batchmasview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "store_batchmasadd.php?" . $this->getUrlParm($parm);
		else
			$url = "store_batchmasadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("store_batchmasedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("store_batchmasadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("store_batchmasdelete.php", $this->getUrlParm());
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
		$this->PRC->setDbValue($rs->fields('PRC'));
		$this->BATCHNO->setDbValue($rs->fields('BATCHNO'));
		$this->OQ->setDbValue($rs->fields('OQ'));
		$this->RQ->setDbValue($rs->fields('RQ'));
		$this->MRQ->setDbValue($rs->fields('MRQ'));
		$this->IQ->setDbValue($rs->fields('IQ'));
		$this->MRP->setDbValue($rs->fields('MRP'));
		$this->EXPDT->setDbValue($rs->fields('EXPDT'));
		$this->UR->setDbValue($rs->fields('UR'));
		$this->RT->setDbValue($rs->fields('RT'));
		$this->PRCODE->setDbValue($rs->fields('PRCODE'));
		$this->BATCH->setDbValue($rs->fields('BATCH'));
		$this->PC->setDbValue($rs->fields('PC'));
		$this->OLDRT->setDbValue($rs->fields('OLDRT'));
		$this->TEMPMRQ->setDbValue($rs->fields('TEMPMRQ'));
		$this->TAXP->setDbValue($rs->fields('TAXP'));
		$this->OLDRATE->setDbValue($rs->fields('OLDRATE'));
		$this->NEWRATE->setDbValue($rs->fields('NEWRATE'));
		$this->OTEMPMRA->setDbValue($rs->fields('OTEMPMRA'));
		$this->ACTIVESTATUS->setDbValue($rs->fields('ACTIVESTATUS'));
		$this->id->setDbValue($rs->fields('id'));
		$this->PrName->setDbValue($rs->fields('PrName'));
		$this->PSGST->setDbValue($rs->fields('PSGST'));
		$this->PCGST->setDbValue($rs->fields('PCGST'));
		$this->SSGST->setDbValue($rs->fields('SSGST'));
		$this->SCGST->setDbValue($rs->fields('SCGST'));
		$this->MFRCODE->setDbValue($rs->fields('MFRCODE'));
		$this->BRCODE->setDbValue($rs->fields('BRCODE'));
		$this->FRQ->setDbValue($rs->fields('FRQ'));
		$this->HospID->setDbValue($rs->fields('HospID'));
		$this->UM->setDbValue($rs->fields('UM'));
		$this->GENNAME->setDbValue($rs->fields('GENNAME'));
		$this->BILLDATE->setDbValue($rs->fields('BILLDATE'));
		$this->PUnit->setDbValue($rs->fields('PUnit'));
		$this->SUnit->setDbValue($rs->fields('SUnit'));
		$this->PurValue->setDbValue($rs->fields('PurValue'));
		$this->PurRate->setDbValue($rs->fields('PurRate'));
		$this->StoreID->setDbValue($rs->fields('StoreID'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// PRC
		// BATCHNO
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
		// id
		// PrName
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
		// PUnit
		// SUnit
		// PurValue
		// PurRate
		// StoreID
		// PRC

		$this->PRC->ViewValue = $this->PRC->CurrentValue;
		$this->PRC->ViewCustomAttributes = "";

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

		// id
		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// PrName
		$this->PrName->ViewValue = $this->PrName->CurrentValue;
		$this->PrName->ViewCustomAttributes = "";

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

		// PUnit
		$this->PUnit->ViewValue = $this->PUnit->CurrentValue;
		$this->PUnit->ViewValue = FormatNumber($this->PUnit->ViewValue, 0, -2, -2, -2);
		$this->PUnit->ViewCustomAttributes = "";

		// SUnit
		$this->SUnit->ViewValue = $this->SUnit->CurrentValue;
		$this->SUnit->ViewValue = FormatNumber($this->SUnit->ViewValue, 0, -2, -2, -2);
		$this->SUnit->ViewCustomAttributes = "";

		// PurValue
		$this->PurValue->ViewValue = $this->PurValue->CurrentValue;
		$this->PurValue->ViewValue = FormatNumber($this->PurValue->ViewValue, 2, -2, -2, -2);
		$this->PurValue->ViewCustomAttributes = "";

		// PurRate
		$this->PurRate->ViewValue = $this->PurRate->CurrentValue;
		$this->PurRate->ViewValue = FormatNumber($this->PurRate->ViewValue, 2, -2, -2, -2);
		$this->PurRate->ViewCustomAttributes = "";

		// StoreID
		$this->StoreID->ViewValue = $this->StoreID->CurrentValue;
		$this->StoreID->ViewValue = FormatNumber($this->StoreID->ViewValue, 0, -2, -2, -2);
		$this->StoreID->ViewCustomAttributes = "";

		// PRC
		$this->PRC->LinkCustomAttributes = "";
		$this->PRC->HrefValue = "";
		$this->PRC->TooltipValue = "";

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

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// PrName
		$this->PrName->LinkCustomAttributes = "";
		$this->PrName->HrefValue = "";
		$this->PrName->TooltipValue = "";

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

		// PUnit
		$this->PUnit->LinkCustomAttributes = "";
		$this->PUnit->HrefValue = "";
		$this->PUnit->TooltipValue = "";

		// SUnit
		$this->SUnit->LinkCustomAttributes = "";
		$this->SUnit->HrefValue = "";
		$this->SUnit->TooltipValue = "";

		// PurValue
		$this->PurValue->LinkCustomAttributes = "";
		$this->PurValue->HrefValue = "";
		$this->PurValue->TooltipValue = "";

		// PurRate
		$this->PurRate->LinkCustomAttributes = "";
		$this->PurRate->HrefValue = "";
		$this->PurRate->TooltipValue = "";

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

		// PRC
		$this->PRC->EditAttrs["class"] = "form-control";
		$this->PRC->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
		$this->PRC->EditValue = $this->PRC->CurrentValue;
		$this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

		// BATCHNO
		$this->BATCHNO->EditAttrs["class"] = "form-control";
		$this->BATCHNO->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->BATCHNO->CurrentValue = HtmlDecode($this->BATCHNO->CurrentValue);
		$this->BATCHNO->EditValue = $this->BATCHNO->CurrentValue;
		$this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

		// OQ
		$this->OQ->EditAttrs["class"] = "form-control";
		$this->OQ->EditCustomAttributes = "";
		$this->OQ->EditValue = $this->OQ->CurrentValue;
		$this->OQ->PlaceHolder = RemoveHtml($this->OQ->caption());
		if (strval($this->OQ->EditValue) <> "" && is_numeric($this->OQ->EditValue))
			$this->OQ->EditValue = FormatNumber($this->OQ->EditValue, -2, -2, -2, -2);

		// RQ
		$this->RQ->EditAttrs["class"] = "form-control";
		$this->RQ->EditCustomAttributes = "";
		$this->RQ->EditValue = $this->RQ->CurrentValue;
		$this->RQ->PlaceHolder = RemoveHtml($this->RQ->caption());
		if (strval($this->RQ->EditValue) <> "" && is_numeric($this->RQ->EditValue))
			$this->RQ->EditValue = FormatNumber($this->RQ->EditValue, -2, -2, -2, -2);

		// MRQ
		$this->MRQ->EditAttrs["class"] = "form-control";
		$this->MRQ->EditCustomAttributes = "";
		$this->MRQ->EditValue = $this->MRQ->CurrentValue;
		$this->MRQ->PlaceHolder = RemoveHtml($this->MRQ->caption());
		if (strval($this->MRQ->EditValue) <> "" && is_numeric($this->MRQ->EditValue))
			$this->MRQ->EditValue = FormatNumber($this->MRQ->EditValue, -2, -2, -2, -2);

		// IQ
		$this->IQ->EditAttrs["class"] = "form-control";
		$this->IQ->EditCustomAttributes = "";
		$this->IQ->EditValue = $this->IQ->CurrentValue;
		$this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());
		if (strval($this->IQ->EditValue) <> "" && is_numeric($this->IQ->EditValue))
			$this->IQ->EditValue = FormatNumber($this->IQ->EditValue, -2, -2, -2, -2);

		// MRP
		$this->MRP->EditAttrs["class"] = "form-control";
		$this->MRP->EditCustomAttributes = "";
		$this->MRP->EditValue = $this->MRP->CurrentValue;
		$this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());
		if (strval($this->MRP->EditValue) <> "" && is_numeric($this->MRP->EditValue))
			$this->MRP->EditValue = FormatNumber($this->MRP->EditValue, -2, -2, -2, -2);

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
		if (strval($this->UR->EditValue) <> "" && is_numeric($this->UR->EditValue))
			$this->UR->EditValue = FormatNumber($this->UR->EditValue, -2, -2, -2, -2);

		// RT
		$this->RT->EditAttrs["class"] = "form-control";
		$this->RT->EditCustomAttributes = "";
		$this->RT->EditValue = $this->RT->CurrentValue;
		$this->RT->PlaceHolder = RemoveHtml($this->RT->caption());
		if (strval($this->RT->EditValue) <> "" && is_numeric($this->RT->EditValue))
			$this->RT->EditValue = FormatNumber($this->RT->EditValue, -2, -2, -2, -2);

		// PRCODE
		$this->PRCODE->EditAttrs["class"] = "form-control";
		$this->PRCODE->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PRCODE->CurrentValue = HtmlDecode($this->PRCODE->CurrentValue);
		$this->PRCODE->EditValue = $this->PRCODE->CurrentValue;
		$this->PRCODE->PlaceHolder = RemoveHtml($this->PRCODE->caption());

		// BATCH
		$this->BATCH->EditAttrs["class"] = "form-control";
		$this->BATCH->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->BATCH->CurrentValue = HtmlDecode($this->BATCH->CurrentValue);
		$this->BATCH->EditValue = $this->BATCH->CurrentValue;
		$this->BATCH->PlaceHolder = RemoveHtml($this->BATCH->caption());

		// PC
		$this->PC->EditAttrs["class"] = "form-control";
		$this->PC->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PC->CurrentValue = HtmlDecode($this->PC->CurrentValue);
		$this->PC->EditValue = $this->PC->CurrentValue;
		$this->PC->PlaceHolder = RemoveHtml($this->PC->caption());

		// OLDRT
		$this->OLDRT->EditAttrs["class"] = "form-control";
		$this->OLDRT->EditCustomAttributes = "";
		$this->OLDRT->EditValue = $this->OLDRT->CurrentValue;
		$this->OLDRT->PlaceHolder = RemoveHtml($this->OLDRT->caption());
		if (strval($this->OLDRT->EditValue) <> "" && is_numeric($this->OLDRT->EditValue))
			$this->OLDRT->EditValue = FormatNumber($this->OLDRT->EditValue, -2, -2, -2, -2);

		// TEMPMRQ
		$this->TEMPMRQ->EditAttrs["class"] = "form-control";
		$this->TEMPMRQ->EditCustomAttributes = "";
		$this->TEMPMRQ->EditValue = $this->TEMPMRQ->CurrentValue;
		$this->TEMPMRQ->PlaceHolder = RemoveHtml($this->TEMPMRQ->caption());
		if (strval($this->TEMPMRQ->EditValue) <> "" && is_numeric($this->TEMPMRQ->EditValue))
			$this->TEMPMRQ->EditValue = FormatNumber($this->TEMPMRQ->EditValue, -2, -2, -2, -2);

		// TAXP
		$this->TAXP->EditAttrs["class"] = "form-control";
		$this->TAXP->EditCustomAttributes = "";
		$this->TAXP->EditValue = $this->TAXP->CurrentValue;
		$this->TAXP->PlaceHolder = RemoveHtml($this->TAXP->caption());
		if (strval($this->TAXP->EditValue) <> "" && is_numeric($this->TAXP->EditValue))
			$this->TAXP->EditValue = FormatNumber($this->TAXP->EditValue, -2, -2, -2, -2);

		// OLDRATE
		$this->OLDRATE->EditAttrs["class"] = "form-control";
		$this->OLDRATE->EditCustomAttributes = "";
		$this->OLDRATE->EditValue = $this->OLDRATE->CurrentValue;
		$this->OLDRATE->PlaceHolder = RemoveHtml($this->OLDRATE->caption());
		if (strval($this->OLDRATE->EditValue) <> "" && is_numeric($this->OLDRATE->EditValue))
			$this->OLDRATE->EditValue = FormatNumber($this->OLDRATE->EditValue, -2, -2, -2, -2);

		// NEWRATE
		$this->NEWRATE->EditAttrs["class"] = "form-control";
		$this->NEWRATE->EditCustomAttributes = "";
		$this->NEWRATE->EditValue = $this->NEWRATE->CurrentValue;
		$this->NEWRATE->PlaceHolder = RemoveHtml($this->NEWRATE->caption());
		if (strval($this->NEWRATE->EditValue) <> "" && is_numeric($this->NEWRATE->EditValue))
			$this->NEWRATE->EditValue = FormatNumber($this->NEWRATE->EditValue, -2, -2, -2, -2);

		// OTEMPMRA
		$this->OTEMPMRA->EditAttrs["class"] = "form-control";
		$this->OTEMPMRA->EditCustomAttributes = "";
		$this->OTEMPMRA->EditValue = $this->OTEMPMRA->CurrentValue;
		$this->OTEMPMRA->PlaceHolder = RemoveHtml($this->OTEMPMRA->caption());
		if (strval($this->OTEMPMRA->EditValue) <> "" && is_numeric($this->OTEMPMRA->EditValue))
			$this->OTEMPMRA->EditValue = FormatNumber($this->OTEMPMRA->EditValue, -2, -2, -2, -2);

		// ACTIVESTATUS
		$this->ACTIVESTATUS->EditAttrs["class"] = "form-control";
		$this->ACTIVESTATUS->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ACTIVESTATUS->CurrentValue = HtmlDecode($this->ACTIVESTATUS->CurrentValue);
		$this->ACTIVESTATUS->EditValue = $this->ACTIVESTATUS->CurrentValue;
		$this->ACTIVESTATUS->PlaceHolder = RemoveHtml($this->ACTIVESTATUS->caption());

		// id
		$this->id->EditAttrs["class"] = "form-control";
		$this->id->EditCustomAttributes = "";
		$this->id->EditValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// PrName
		$this->PrName->EditAttrs["class"] = "form-control";
		$this->PrName->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PrName->CurrentValue = HtmlDecode($this->PrName->CurrentValue);
		$this->PrName->EditValue = $this->PrName->CurrentValue;
		$this->PrName->PlaceHolder = RemoveHtml($this->PrName->caption());

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

		// MFRCODE
		$this->MFRCODE->EditAttrs["class"] = "form-control";
		$this->MFRCODE->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->MFRCODE->CurrentValue = HtmlDecode($this->MFRCODE->CurrentValue);
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
		if (strval($this->FRQ->EditValue) <> "" && is_numeric($this->FRQ->EditValue))
			$this->FRQ->EditValue = FormatNumber($this->FRQ->EditValue, -2, -2, -2, -2);

		// HospID
		$this->HospID->EditAttrs["class"] = "form-control";
		$this->HospID->EditCustomAttributes = "";
		$this->HospID->EditValue = $this->HospID->CurrentValue;
		$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

		// UM
		$this->UM->EditAttrs["class"] = "form-control";
		$this->UM->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->UM->CurrentValue = HtmlDecode($this->UM->CurrentValue);
		$this->UM->EditValue = $this->UM->CurrentValue;
		$this->UM->PlaceHolder = RemoveHtml($this->UM->caption());

		// GENNAME
		$this->GENNAME->EditAttrs["class"] = "form-control";
		$this->GENNAME->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->GENNAME->CurrentValue = HtmlDecode($this->GENNAME->CurrentValue);
		$this->GENNAME->EditValue = $this->GENNAME->CurrentValue;
		$this->GENNAME->PlaceHolder = RemoveHtml($this->GENNAME->caption());

		// BILLDATE
		$this->BILLDATE->EditAttrs["class"] = "form-control";
		$this->BILLDATE->EditCustomAttributes = "";
		$this->BILLDATE->EditValue = FormatDateTime($this->BILLDATE->CurrentValue, 8);
		$this->BILLDATE->PlaceHolder = RemoveHtml($this->BILLDATE->caption());

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
					$doc->exportCaption($this->PRC);
					$doc->exportCaption($this->BATCHNO);
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
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->PrName);
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
					$doc->exportCaption($this->PUnit);
					$doc->exportCaption($this->SUnit);
					$doc->exportCaption($this->PurValue);
					$doc->exportCaption($this->PurRate);
					$doc->exportCaption($this->StoreID);
				} else {
					$doc->exportCaption($this->PRC);
					$doc->exportCaption($this->BATCHNO);
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
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->PrName);
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
					$doc->exportCaption($this->PUnit);
					$doc->exportCaption($this->SUnit);
					$doc->exportCaption($this->PurValue);
					$doc->exportCaption($this->PurRate);
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
						$doc->exportField($this->PRC);
						$doc->exportField($this->BATCHNO);
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
						$doc->exportField($this->id);
						$doc->exportField($this->PrName);
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
						$doc->exportField($this->PUnit);
						$doc->exportField($this->SUnit);
						$doc->exportField($this->PurValue);
						$doc->exportField($this->PurRate);
						$doc->exportField($this->StoreID);
					} else {
						$doc->exportField($this->PRC);
						$doc->exportField($this->BATCHNO);
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
						$doc->exportField($this->id);
						$doc->exportField($this->PrName);
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
						$doc->exportField($this->PUnit);
						$doc->exportField($this->SUnit);
						$doc->exportField($this->PurValue);
						$doc->exportField($this->PurRate);
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