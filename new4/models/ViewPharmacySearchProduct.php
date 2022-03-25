<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_pharmacy_search_product
 */
class ViewPharmacySearchProduct extends DbTable
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
    public $PRC;
    public $DES;
    public $BATCH;
    public $Stock;
    public $EXPDT;
    public $UNIT;
    public $RT;
    public $OQ;
    public $GENNAME;
    public $SSGST;
    public $SCGST;
    public $MFRCODE;
    public $BRCODE;
    public $HospID;
    public $BILLDATE;
    public $id;
    public $PUnit;
    public $PurRate;
    public $PurValue;
    public $SUnit;
    public $PSGST;
    public $PCGST;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'view_pharmacy_search_product';
        $this->TableName = 'view_pharmacy_search_product';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_pharmacy_search_product`";
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
        $this->BasicSearch->TypeDefault = "OR";

        // PRC
        $this->PRC = new DbField('view_pharmacy_search_product', 'view_pharmacy_search_product', 'x_PRC', 'PRC', '`PRC`', '`PRC`', 200, 9, -1, false, '`PRC`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PRC->Sortable = true; // Allow sort
        $this->PRC->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PRC->Param, "CustomMsg");
        $this->Fields['PRC'] = &$this->PRC;

        // DES
        $this->DES = new DbField('view_pharmacy_search_product', 'view_pharmacy_search_product', 'x_DES', 'DES', '`DES`', '`DES`', 200, 100, -1, false, '`DES`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DES->Sortable = true; // Allow sort
        $this->DES->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DES->Param, "CustomMsg");
        $this->Fields['DES'] = &$this->DES;

        // BATCH
        $this->BATCH = new DbField('view_pharmacy_search_product', 'view_pharmacy_search_product', 'x_BATCH', 'BATCH', '`BATCH`', '`BATCH`', 200, 10, -1, false, '`BATCH`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BATCH->Sortable = true; // Allow sort
        $this->BATCH->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BATCH->Param, "CustomMsg");
        $this->Fields['BATCH'] = &$this->BATCH;

        // Stock
        $this->Stock = new DbField('view_pharmacy_search_product', 'view_pharmacy_search_product', 'x_Stock', 'Stock', '`Stock`', '`Stock`', 20, 16, -1, false, '`Stock`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Stock->Sortable = true; // Allow sort
        $this->Stock->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Stock->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Stock->Param, "CustomMsg");
        $this->Fields['Stock'] = &$this->Stock;

        // EXPDT
        $this->EXPDT = new DbField('view_pharmacy_search_product', 'view_pharmacy_search_product', 'x_EXPDT', 'EXPDT', '`EXPDT`', CastDateFieldForLike("`EXPDT`", 0, "DB"), 135, 19, 0, false, '`EXPDT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EXPDT->Sortable = true; // Allow sort
        $this->EXPDT->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->EXPDT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EXPDT->Param, "CustomMsg");
        $this->Fields['EXPDT'] = &$this->EXPDT;

        // UNIT
        $this->UNIT = new DbField('view_pharmacy_search_product', 'view_pharmacy_search_product', 'x_UNIT', 'UNIT', '`UNIT`', '`UNIT`', 200, 45, -1, false, '`UNIT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->UNIT->Sortable = true; // Allow sort
        $this->UNIT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->UNIT->Param, "CustomMsg");
        $this->Fields['UNIT'] = &$this->UNIT;

        // RT
        $this->RT = new DbField('view_pharmacy_search_product', 'view_pharmacy_search_product', 'x_RT', 'RT', '`RT`', '`RT`', 131, 12, -1, false, '`RT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RT->Sortable = true; // Allow sort
        $this->RT->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->RT->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->RT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RT->Param, "CustomMsg");
        $this->Fields['RT'] = &$this->RT;

        // OQ
        $this->OQ = new DbField('view_pharmacy_search_product', 'view_pharmacy_search_product', 'x_OQ', 'OQ', '`OQ`', '`OQ`', 131, 12, -1, false, '`OQ`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OQ->Sortable = true; // Allow sort
        $this->OQ->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OQ->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->OQ->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OQ->Param, "CustomMsg");
        $this->Fields['OQ'] = &$this->OQ;

        // GENNAME
        $this->GENNAME = new DbField('view_pharmacy_search_product', 'view_pharmacy_search_product', 'x_GENNAME', 'GENNAME', '`GENNAME`', '`GENNAME`', 200, 150, -1, false, '`GENNAME`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GENNAME->Sortable = true; // Allow sort
        $this->GENNAME->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GENNAME->Param, "CustomMsg");
        $this->Fields['GENNAME'] = &$this->GENNAME;

        // SSGST
        $this->SSGST = new DbField('view_pharmacy_search_product', 'view_pharmacy_search_product', 'x_SSGST', 'SSGST', '`SSGST`', '`SSGST`', 131, 12, -1, false, '`SSGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SSGST->Sortable = true; // Allow sort
        $this->SSGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SSGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->SSGST->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SSGST->Param, "CustomMsg");
        $this->Fields['SSGST'] = &$this->SSGST;

        // SCGST
        $this->SCGST = new DbField('view_pharmacy_search_product', 'view_pharmacy_search_product', 'x_SCGST', 'SCGST', '`SCGST`', '`SCGST`', 131, 12, -1, false, '`SCGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SCGST->Sortable = true; // Allow sort
        $this->SCGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SCGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->SCGST->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SCGST->Param, "CustomMsg");
        $this->Fields['SCGST'] = &$this->SCGST;

        // MFRCODE
        $this->MFRCODE = new DbField('view_pharmacy_search_product', 'view_pharmacy_search_product', 'x_MFRCODE', 'MFRCODE', '`MFRCODE`', '`MFRCODE`', 200, 45, -1, false, '`MFRCODE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MFRCODE->Sortable = true; // Allow sort
        $this->MFRCODE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MFRCODE->Param, "CustomMsg");
        $this->Fields['MFRCODE'] = &$this->MFRCODE;

        // BRCODE
        $this->BRCODE = new DbField('view_pharmacy_search_product', 'view_pharmacy_search_product', 'x_BRCODE', 'BRCODE', '`BRCODE`', '`BRCODE`', 3, 11, -1, false, '`BRCODE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BRCODE->Sortable = true; // Allow sort
        $this->BRCODE->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->BRCODE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BRCODE->Param, "CustomMsg");
        $this->Fields['BRCODE'] = &$this->BRCODE;

        // HospID
        $this->HospID = new DbField('view_pharmacy_search_product', 'view_pharmacy_search_product', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->HospID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospID->Param, "CustomMsg");
        $this->Fields['HospID'] = &$this->HospID;

        // BILLDATE
        $this->BILLDATE = new DbField('view_pharmacy_search_product', 'view_pharmacy_search_product', 'x_BILLDATE', 'BILLDATE', '`BILLDATE`', CastDateFieldForLike("`BILLDATE`", 0, "DB"), 135, 19, 0, false, '`BILLDATE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BILLDATE->Sortable = true; // Allow sort
        $this->BILLDATE->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->BILLDATE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BILLDATE->Param, "CustomMsg");
        $this->Fields['BILLDATE'] = &$this->BILLDATE;

        // id
        $this->id = new DbField('view_pharmacy_search_product', 'view_pharmacy_search_product', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // PUnit
        $this->PUnit = new DbField('view_pharmacy_search_product', 'view_pharmacy_search_product', 'x_PUnit', 'PUnit', '`PUnit`', '`PUnit`', 3, 11, -1, false, '`PUnit`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PUnit->Sortable = true; // Allow sort
        $this->PUnit->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->PUnit->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PUnit->Param, "CustomMsg");
        $this->Fields['PUnit'] = &$this->PUnit;

        // PurRate
        $this->PurRate = new DbField('view_pharmacy_search_product', 'view_pharmacy_search_product', 'x_PurRate', 'PurRate', '`PurRate`', '`PurRate`', 131, 12, -1, false, '`PurRate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PurRate->Sortable = true; // Allow sort
        $this->PurRate->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PurRate->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->PurRate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PurRate->Param, "CustomMsg");
        $this->Fields['PurRate'] = &$this->PurRate;

        // PurValue
        $this->PurValue = new DbField('view_pharmacy_search_product', 'view_pharmacy_search_product', 'x_PurValue', 'PurValue', '`PurValue`', '`PurValue`', 131, 12, -1, false, '`PurValue`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PurValue->Sortable = true; // Allow sort
        $this->PurValue->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PurValue->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->PurValue->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PurValue->Param, "CustomMsg");
        $this->Fields['PurValue'] = &$this->PurValue;

        // SUnit
        $this->SUnit = new DbField('view_pharmacy_search_product', 'view_pharmacy_search_product', 'x_SUnit', 'SUnit', '`SUnit`', '`SUnit`', 3, 11, -1, false, '`SUnit`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SUnit->Sortable = true; // Allow sort
        $this->SUnit->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->SUnit->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SUnit->Param, "CustomMsg");
        $this->Fields['SUnit'] = &$this->SUnit;

        // PSGST
        $this->PSGST = new DbField('view_pharmacy_search_product', 'view_pharmacy_search_product', 'x_PSGST', 'PSGST', '`PSGST`', '`PSGST`', 131, 12, -1, false, '`PSGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PSGST->Sortable = true; // Allow sort
        $this->PSGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PSGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->PSGST->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PSGST->Param, "CustomMsg");
        $this->Fields['PSGST'] = &$this->PSGST;

        // PCGST
        $this->PCGST = new DbField('view_pharmacy_search_product', 'view_pharmacy_search_product', 'x_PCGST', 'PCGST', '`PCGST`', '`PCGST`', 131, 12, -1, false, '`PCGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PCGST->Sortable = true; // Allow sort
        $this->PCGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PCGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->PCGST->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PCGST->Param, "CustomMsg");
        $this->Fields['PCGST'] = &$this->PCGST;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_pharmacy_search_product`";
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
        $this->PRC->DbValue = $row['PRC'];
        $this->DES->DbValue = $row['DES'];
        $this->BATCH->DbValue = $row['BATCH'];
        $this->Stock->DbValue = $row['Stock'];
        $this->EXPDT->DbValue = $row['EXPDT'];
        $this->UNIT->DbValue = $row['UNIT'];
        $this->RT->DbValue = $row['RT'];
        $this->OQ->DbValue = $row['OQ'];
        $this->GENNAME->DbValue = $row['GENNAME'];
        $this->SSGST->DbValue = $row['SSGST'];
        $this->SCGST->DbValue = $row['SCGST'];
        $this->MFRCODE->DbValue = $row['MFRCODE'];
        $this->BRCODE->DbValue = $row['BRCODE'];
        $this->HospID->DbValue = $row['HospID'];
        $this->BILLDATE->DbValue = $row['BILLDATE'];
        $this->id->DbValue = $row['id'];
        $this->PUnit->DbValue = $row['PUnit'];
        $this->PurRate->DbValue = $row['PurRate'];
        $this->PurValue->DbValue = $row['PurValue'];
        $this->SUnit->DbValue = $row['SUnit'];
        $this->PSGST->DbValue = $row['PSGST'];
        $this->PCGST->DbValue = $row['PCGST'];
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
        return $_SESSION[$name] ?? GetUrl("ViewPharmacySearchProductList");
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
        if ($pageName == "ViewPharmacySearchProductView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewPharmacySearchProductEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewPharmacySearchProductAdd") {
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
                return "ViewPharmacySearchProductView";
            case Config("API_ADD_ACTION"):
                return "ViewPharmacySearchProductAdd";
            case Config("API_EDIT_ACTION"):
                return "ViewPharmacySearchProductEdit";
            case Config("API_DELETE_ACTION"):
                return "ViewPharmacySearchProductDelete";
            case Config("API_LIST_ACTION"):
                return "ViewPharmacySearchProductList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewPharmacySearchProductList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewPharmacySearchProductView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewPharmacySearchProductView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewPharmacySearchProductAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewPharmacySearchProductAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewPharmacySearchProductEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewPharmacySearchProductAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewPharmacySearchProductDelete", $this->getUrlParm());
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
        $this->PRC->setDbValue($row['PRC']);
        $this->DES->setDbValue($row['DES']);
        $this->BATCH->setDbValue($row['BATCH']);
        $this->Stock->setDbValue($row['Stock']);
        $this->EXPDT->setDbValue($row['EXPDT']);
        $this->UNIT->setDbValue($row['UNIT']);
        $this->RT->setDbValue($row['RT']);
        $this->OQ->setDbValue($row['OQ']);
        $this->GENNAME->setDbValue($row['GENNAME']);
        $this->SSGST->setDbValue($row['SSGST']);
        $this->SCGST->setDbValue($row['SCGST']);
        $this->MFRCODE->setDbValue($row['MFRCODE']);
        $this->BRCODE->setDbValue($row['BRCODE']);
        $this->HospID->setDbValue($row['HospID']);
        $this->BILLDATE->setDbValue($row['BILLDATE']);
        $this->id->setDbValue($row['id']);
        $this->PUnit->setDbValue($row['PUnit']);
        $this->PurRate->setDbValue($row['PurRate']);
        $this->PurValue->setDbValue($row['PurValue']);
        $this->SUnit->setDbValue($row['SUnit']);
        $this->PSGST->setDbValue($row['PSGST']);
        $this->PCGST->setDbValue($row['PCGST']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // PRC

        // DES

        // BATCH

        // Stock

        // EXPDT

        // UNIT

        // RT

        // OQ

        // GENNAME

        // SSGST

        // SCGST

        // MFRCODE

        // BRCODE

        // HospID

        // BILLDATE

        // id

        // PUnit

        // PurRate

        // PurValue

        // SUnit

        // PSGST

        // PCGST

        // PRC
        $this->PRC->ViewValue = $this->PRC->CurrentValue;
        $this->PRC->ViewCustomAttributes = "";

        // DES
        $this->DES->ViewValue = $this->DES->CurrentValue;
        $this->DES->ViewCustomAttributes = "";

        // BATCH
        $this->BATCH->ViewValue = $this->BATCH->CurrentValue;
        $this->BATCH->ViewCustomAttributes = "";

        // Stock
        $this->Stock->ViewValue = $this->Stock->CurrentValue;
        $this->Stock->ViewValue = FormatNumber($this->Stock->ViewValue, 0, -2, -2, -2);
        $this->Stock->ViewCustomAttributes = "";

        // EXPDT
        $this->EXPDT->ViewValue = $this->EXPDT->CurrentValue;
        $this->EXPDT->ViewValue = FormatDateTime($this->EXPDT->ViewValue, 0);
        $this->EXPDT->ViewCustomAttributes = "";

        // UNIT
        $this->UNIT->ViewValue = $this->UNIT->CurrentValue;
        $this->UNIT->ViewCustomAttributes = "";

        // RT
        $this->RT->ViewValue = $this->RT->CurrentValue;
        $this->RT->ViewValue = FormatNumber($this->RT->ViewValue, 2, -2, -2, -2);
        $this->RT->ViewCustomAttributes = "";

        // OQ
        $this->OQ->ViewValue = $this->OQ->CurrentValue;
        $this->OQ->ViewValue = FormatNumber($this->OQ->ViewValue, 2, -2, -2, -2);
        $this->OQ->ViewCustomAttributes = "";

        // GENNAME
        $this->GENNAME->ViewValue = $this->GENNAME->CurrentValue;
        $this->GENNAME->ViewCustomAttributes = "";

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

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

        // BILLDATE
        $this->BILLDATE->ViewValue = $this->BILLDATE->CurrentValue;
        $this->BILLDATE->ViewValue = FormatDateTime($this->BILLDATE->ViewValue, 0);
        $this->BILLDATE->ViewCustomAttributes = "";

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewValue = FormatNumber($this->id->ViewValue, 0, -2, -2, -2);
        $this->id->ViewCustomAttributes = "";

        // PUnit
        $this->PUnit->ViewValue = $this->PUnit->CurrentValue;
        $this->PUnit->ViewValue = FormatNumber($this->PUnit->ViewValue, 0, -2, -2, -2);
        $this->PUnit->ViewCustomAttributes = "";

        // PurRate
        $this->PurRate->ViewValue = $this->PurRate->CurrentValue;
        $this->PurRate->ViewValue = FormatNumber($this->PurRate->ViewValue, 2, -2, -2, -2);
        $this->PurRate->ViewCustomAttributes = "";

        // PurValue
        $this->PurValue->ViewValue = $this->PurValue->CurrentValue;
        $this->PurValue->ViewValue = FormatNumber($this->PurValue->ViewValue, 2, -2, -2, -2);
        $this->PurValue->ViewCustomAttributes = "";

        // SUnit
        $this->SUnit->ViewValue = $this->SUnit->CurrentValue;
        $this->SUnit->ViewValue = FormatNumber($this->SUnit->ViewValue, 0, -2, -2, -2);
        $this->SUnit->ViewCustomAttributes = "";

        // PSGST
        $this->PSGST->ViewValue = $this->PSGST->CurrentValue;
        $this->PSGST->ViewValue = FormatNumber($this->PSGST->ViewValue, 2, -2, -2, -2);
        $this->PSGST->ViewCustomAttributes = "";

        // PCGST
        $this->PCGST->ViewValue = $this->PCGST->CurrentValue;
        $this->PCGST->ViewValue = FormatNumber($this->PCGST->ViewValue, 2, -2, -2, -2);
        $this->PCGST->ViewCustomAttributes = "";

        // PRC
        $this->PRC->LinkCustomAttributes = "";
        $this->PRC->HrefValue = "";
        $this->PRC->TooltipValue = "";

        // DES
        $this->DES->LinkCustomAttributes = "";
        $this->DES->HrefValue = "";
        $this->DES->TooltipValue = "";

        // BATCH
        $this->BATCH->LinkCustomAttributes = "";
        $this->BATCH->HrefValue = "";
        $this->BATCH->TooltipValue = "";

        // Stock
        $this->Stock->LinkCustomAttributes = "";
        $this->Stock->HrefValue = "";
        $this->Stock->TooltipValue = "";

        // EXPDT
        $this->EXPDT->LinkCustomAttributes = "";
        $this->EXPDT->HrefValue = "";
        $this->EXPDT->TooltipValue = "";

        // UNIT
        $this->UNIT->LinkCustomAttributes = "";
        $this->UNIT->HrefValue = "";
        $this->UNIT->TooltipValue = "";

        // RT
        $this->RT->LinkCustomAttributes = "";
        $this->RT->HrefValue = "";
        $this->RT->TooltipValue = "";

        // OQ
        $this->OQ->LinkCustomAttributes = "";
        $this->OQ->HrefValue = "";
        $this->OQ->TooltipValue = "";

        // GENNAME
        $this->GENNAME->LinkCustomAttributes = "";
        $this->GENNAME->HrefValue = "";
        $this->GENNAME->TooltipValue = "";

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

        // HospID
        $this->HospID->LinkCustomAttributes = "";
        $this->HospID->HrefValue = "";
        $this->HospID->TooltipValue = "";

        // BILLDATE
        $this->BILLDATE->LinkCustomAttributes = "";
        $this->BILLDATE->HrefValue = "";
        $this->BILLDATE->TooltipValue = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // PUnit
        $this->PUnit->LinkCustomAttributes = "";
        $this->PUnit->HrefValue = "";
        $this->PUnit->TooltipValue = "";

        // PurRate
        $this->PurRate->LinkCustomAttributes = "";
        $this->PurRate->HrefValue = "";
        $this->PurRate->TooltipValue = "";

        // PurValue
        $this->PurValue->LinkCustomAttributes = "";
        $this->PurValue->HrefValue = "";
        $this->PurValue->TooltipValue = "";

        // SUnit
        $this->SUnit->LinkCustomAttributes = "";
        $this->SUnit->HrefValue = "";
        $this->SUnit->TooltipValue = "";

        // PSGST
        $this->PSGST->LinkCustomAttributes = "";
        $this->PSGST->HrefValue = "";
        $this->PSGST->TooltipValue = "";

        // PCGST
        $this->PCGST->LinkCustomAttributes = "";
        $this->PCGST->HrefValue = "";
        $this->PCGST->TooltipValue = "";

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

        // PRC
        $this->PRC->EditAttrs["class"] = "form-control";
        $this->PRC->EditCustomAttributes = "";
        if (!$this->PRC->Raw) {
            $this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
        }
        $this->PRC->EditValue = $this->PRC->CurrentValue;
        $this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

        // DES
        $this->DES->EditAttrs["class"] = "form-control";
        $this->DES->EditCustomAttributes = "";
        if (!$this->DES->Raw) {
            $this->DES->CurrentValue = HtmlDecode($this->DES->CurrentValue);
        }
        $this->DES->EditValue = $this->DES->CurrentValue;
        $this->DES->PlaceHolder = RemoveHtml($this->DES->caption());

        // BATCH
        $this->BATCH->EditAttrs["class"] = "form-control";
        $this->BATCH->EditCustomAttributes = "";
        if (!$this->BATCH->Raw) {
            $this->BATCH->CurrentValue = HtmlDecode($this->BATCH->CurrentValue);
        }
        $this->BATCH->EditValue = $this->BATCH->CurrentValue;
        $this->BATCH->PlaceHolder = RemoveHtml($this->BATCH->caption());

        // Stock
        $this->Stock->EditAttrs["class"] = "form-control";
        $this->Stock->EditCustomAttributes = "";
        $this->Stock->EditValue = $this->Stock->CurrentValue;
        $this->Stock->PlaceHolder = RemoveHtml($this->Stock->caption());

        // EXPDT
        $this->EXPDT->EditAttrs["class"] = "form-control";
        $this->EXPDT->EditCustomAttributes = "";
        $this->EXPDT->EditValue = FormatDateTime($this->EXPDT->CurrentValue, 8);
        $this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());

        // UNIT
        $this->UNIT->EditAttrs["class"] = "form-control";
        $this->UNIT->EditCustomAttributes = "";
        if (!$this->UNIT->Raw) {
            $this->UNIT->CurrentValue = HtmlDecode($this->UNIT->CurrentValue);
        }
        $this->UNIT->EditValue = $this->UNIT->CurrentValue;
        $this->UNIT->PlaceHolder = RemoveHtml($this->UNIT->caption());

        // RT
        $this->RT->EditAttrs["class"] = "form-control";
        $this->RT->EditCustomAttributes = "";
        $this->RT->EditValue = $this->RT->CurrentValue;
        $this->RT->PlaceHolder = RemoveHtml($this->RT->caption());
        if (strval($this->RT->EditValue) != "" && is_numeric($this->RT->EditValue)) {
            $this->RT->EditValue = FormatNumber($this->RT->EditValue, -2, -2, -2, -2);
        }

        // OQ
        $this->OQ->EditAttrs["class"] = "form-control";
        $this->OQ->EditCustomAttributes = "";
        $this->OQ->EditValue = $this->OQ->CurrentValue;
        $this->OQ->PlaceHolder = RemoveHtml($this->OQ->caption());
        if (strval($this->OQ->EditValue) != "" && is_numeric($this->OQ->EditValue)) {
            $this->OQ->EditValue = FormatNumber($this->OQ->EditValue, -2, -2, -2, -2);
        }

        // GENNAME
        $this->GENNAME->EditAttrs["class"] = "form-control";
        $this->GENNAME->EditCustomAttributes = "";
        if (!$this->GENNAME->Raw) {
            $this->GENNAME->CurrentValue = HtmlDecode($this->GENNAME->CurrentValue);
        }
        $this->GENNAME->EditValue = $this->GENNAME->CurrentValue;
        $this->GENNAME->PlaceHolder = RemoveHtml($this->GENNAME->caption());

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

        // HospID
        $this->HospID->EditAttrs["class"] = "form-control";
        $this->HospID->EditCustomAttributes = "";
        $this->HospID->EditValue = $this->HospID->CurrentValue;
        $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

        // BILLDATE
        $this->BILLDATE->EditAttrs["class"] = "form-control";
        $this->BILLDATE->EditCustomAttributes = "";
        $this->BILLDATE->EditValue = FormatDateTime($this->BILLDATE->CurrentValue, 8);
        $this->BILLDATE->PlaceHolder = RemoveHtml($this->BILLDATE->caption());

        // id
        $this->id->EditAttrs["class"] = "form-control";
        $this->id->EditCustomAttributes = "";
        $this->id->EditValue = $this->id->CurrentValue;
        $this->id->EditValue = FormatNumber($this->id->EditValue, 0, -2, -2, -2);
        $this->id->ViewCustomAttributes = "";

        // PUnit
        $this->PUnit->EditAttrs["class"] = "form-control";
        $this->PUnit->EditCustomAttributes = "";
        $this->PUnit->EditValue = $this->PUnit->CurrentValue;
        $this->PUnit->PlaceHolder = RemoveHtml($this->PUnit->caption());

        // PurRate
        $this->PurRate->EditAttrs["class"] = "form-control";
        $this->PurRate->EditCustomAttributes = "";
        $this->PurRate->EditValue = $this->PurRate->CurrentValue;
        $this->PurRate->PlaceHolder = RemoveHtml($this->PurRate->caption());
        if (strval($this->PurRate->EditValue) != "" && is_numeric($this->PurRate->EditValue)) {
            $this->PurRate->EditValue = FormatNumber($this->PurRate->EditValue, -2, -2, -2, -2);
        }

        // PurValue
        $this->PurValue->EditAttrs["class"] = "form-control";
        $this->PurValue->EditCustomAttributes = "";
        $this->PurValue->EditValue = $this->PurValue->CurrentValue;
        $this->PurValue->PlaceHolder = RemoveHtml($this->PurValue->caption());
        if (strval($this->PurValue->EditValue) != "" && is_numeric($this->PurValue->EditValue)) {
            $this->PurValue->EditValue = FormatNumber($this->PurValue->EditValue, -2, -2, -2, -2);
        }

        // SUnit
        $this->SUnit->EditAttrs["class"] = "form-control";
        $this->SUnit->EditCustomAttributes = "";
        $this->SUnit->EditValue = $this->SUnit->CurrentValue;
        $this->SUnit->PlaceHolder = RemoveHtml($this->SUnit->caption());

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
                    $doc->exportCaption($this->PRC);
                    $doc->exportCaption($this->DES);
                    $doc->exportCaption($this->BATCH);
                    $doc->exportCaption($this->Stock);
                    $doc->exportCaption($this->EXPDT);
                    $doc->exportCaption($this->UNIT);
                    $doc->exportCaption($this->RT);
                    $doc->exportCaption($this->OQ);
                    $doc->exportCaption($this->GENNAME);
                    $doc->exportCaption($this->SSGST);
                    $doc->exportCaption($this->SCGST);
                    $doc->exportCaption($this->MFRCODE);
                    $doc->exportCaption($this->BRCODE);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->BILLDATE);
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->PUnit);
                    $doc->exportCaption($this->PurRate);
                    $doc->exportCaption($this->PurValue);
                    $doc->exportCaption($this->SUnit);
                    $doc->exportCaption($this->PSGST);
                    $doc->exportCaption($this->PCGST);
                } else {
                    $doc->exportCaption($this->PRC);
                    $doc->exportCaption($this->DES);
                    $doc->exportCaption($this->BATCH);
                    $doc->exportCaption($this->Stock);
                    $doc->exportCaption($this->EXPDT);
                    $doc->exportCaption($this->UNIT);
                    $doc->exportCaption($this->RT);
                    $doc->exportCaption($this->OQ);
                    $doc->exportCaption($this->GENNAME);
                    $doc->exportCaption($this->SSGST);
                    $doc->exportCaption($this->SCGST);
                    $doc->exportCaption($this->MFRCODE);
                    $doc->exportCaption($this->BRCODE);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->BILLDATE);
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->PUnit);
                    $doc->exportCaption($this->PurRate);
                    $doc->exportCaption($this->PurValue);
                    $doc->exportCaption($this->SUnit);
                    $doc->exportCaption($this->PSGST);
                    $doc->exportCaption($this->PCGST);
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
                        $doc->exportField($this->PRC);
                        $doc->exportField($this->DES);
                        $doc->exportField($this->BATCH);
                        $doc->exportField($this->Stock);
                        $doc->exportField($this->EXPDT);
                        $doc->exportField($this->UNIT);
                        $doc->exportField($this->RT);
                        $doc->exportField($this->OQ);
                        $doc->exportField($this->GENNAME);
                        $doc->exportField($this->SSGST);
                        $doc->exportField($this->SCGST);
                        $doc->exportField($this->MFRCODE);
                        $doc->exportField($this->BRCODE);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->BILLDATE);
                        $doc->exportField($this->id);
                        $doc->exportField($this->PUnit);
                        $doc->exportField($this->PurRate);
                        $doc->exportField($this->PurValue);
                        $doc->exportField($this->SUnit);
                        $doc->exportField($this->PSGST);
                        $doc->exportField($this->PCGST);
                    } else {
                        $doc->exportField($this->PRC);
                        $doc->exportField($this->DES);
                        $doc->exportField($this->BATCH);
                        $doc->exportField($this->Stock);
                        $doc->exportField($this->EXPDT);
                        $doc->exportField($this->UNIT);
                        $doc->exportField($this->RT);
                        $doc->exportField($this->OQ);
                        $doc->exportField($this->GENNAME);
                        $doc->exportField($this->SSGST);
                        $doc->exportField($this->SCGST);
                        $doc->exportField($this->MFRCODE);
                        $doc->exportField($this->BRCODE);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->BILLDATE);
                        $doc->exportField($this->id);
                        $doc->exportField($this->PUnit);
                        $doc->exportField($this->PurRate);
                        $doc->exportField($this->PurValue);
                        $doc->exportField($this->SUnit);
                        $doc->exportField($this->PSGST);
                        $doc->exportField($this->PCGST);
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
