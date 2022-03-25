<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_pharmacy_report_stock_value
 */
class ViewPharmacyReportStockValue extends DbTable
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
    public $Batch;
    public $MFRCODE;
    public $stock;
    public $Mrp;
    public $PurValue;
    public $PurValue1;
    public $ssgst;
    public $scgst;
    public $stockvalue;
    public $stockvalue1;
    public $brcode;
    public $hospid;
    public $PUnit;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'view_pharmacy_report_stock_value';
        $this->TableName = 'view_pharmacy_report_stock_value';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_pharmacy_report_stock_value`";
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

        // PRC
        $this->PRC = new DbField('view_pharmacy_report_stock_value', 'view_pharmacy_report_stock_value', 'x_PRC', 'PRC', '`PRC`', '`PRC`', 200, 9, -1, false, '`PRC`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PRC->Sortable = true; // Allow sort
        $this->PRC->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PRC->Param, "CustomMsg");
        $this->Fields['PRC'] = &$this->PRC;

        // DES
        $this->DES = new DbField('view_pharmacy_report_stock_value', 'view_pharmacy_report_stock_value', 'x_DES', 'DES', '`DES`', '`DES`', 200, 100, -1, false, '`DES`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DES->Sortable = true; // Allow sort
        $this->DES->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DES->Param, "CustomMsg");
        $this->Fields['DES'] = &$this->DES;

        // Batch
        $this->Batch = new DbField('view_pharmacy_report_stock_value', 'view_pharmacy_report_stock_value', 'x_Batch', 'Batch', '`Batch`', '`Batch`', 200, 10, -1, false, '`Batch`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Batch->Sortable = true; // Allow sort
        $this->Batch->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Batch->Param, "CustomMsg");
        $this->Fields['Batch'] = &$this->Batch;

        // MFRCODE
        $this->MFRCODE = new DbField('view_pharmacy_report_stock_value', 'view_pharmacy_report_stock_value', 'x_MFRCODE', 'MFRCODE', '`MFRCODE`', '`MFRCODE`', 200, 45, -1, false, '`MFRCODE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MFRCODE->Sortable = true; // Allow sort
        $this->MFRCODE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MFRCODE->Param, "CustomMsg");
        $this->Fields['MFRCODE'] = &$this->MFRCODE;

        // stock
        $this->stock = new DbField('view_pharmacy_report_stock_value', 'view_pharmacy_report_stock_value', 'x_stock', 'stock', '`stock`', '`stock`', 20, 16, -1, false, '`stock`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->stock->Sortable = true; // Allow sort
        $this->stock->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->stock->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->stock->Param, "CustomMsg");
        $this->Fields['stock'] = &$this->stock;

        // Mrp
        $this->Mrp = new DbField('view_pharmacy_report_stock_value', 'view_pharmacy_report_stock_value', 'x_Mrp', 'Mrp', '`Mrp`', '`Mrp`', 131, 12, -1, false, '`Mrp`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Mrp->Sortable = true; // Allow sort
        $this->Mrp->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Mrp->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Mrp->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Mrp->Param, "CustomMsg");
        $this->Fields['Mrp'] = &$this->Mrp;

        // PurValue
        $this->PurValue = new DbField('view_pharmacy_report_stock_value', 'view_pharmacy_report_stock_value', 'x_PurValue', 'PurValue', '`PurValue`', '`PurValue`', 131, 12, -1, false, '`PurValue`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PurValue->Sortable = false; // Allow sort
        $this->PurValue->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PurValue->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->PurValue->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PurValue->Param, "CustomMsg");
        $this->Fields['PurValue'] = &$this->PurValue;

        // PurValue1
        $this->PurValue1 = new DbField('view_pharmacy_report_stock_value', 'view_pharmacy_report_stock_value', 'x_PurValue1', 'PurValue1', 'PurValue + (( PurValue /100 ) * (ssgst + scgst))', 'PurValue + (( PurValue /100 ) * (ssgst + scgst))', 131, 30, -1, false, 'PurValue + (( PurValue /100 ) * (ssgst + scgst))', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PurValue1->IsCustom = true; // Custom field
        $this->PurValue1->Sortable = true; // Allow sort
        $this->PurValue1->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PurValue1->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->PurValue1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PurValue1->Param, "CustomMsg");
        $this->Fields['PurValue1'] = &$this->PurValue1;

        // ssgst
        $this->ssgst = new DbField('view_pharmacy_report_stock_value', 'view_pharmacy_report_stock_value', 'x_ssgst', 'ssgst', '`ssgst`', '`ssgst`', 131, 12, -1, false, '`ssgst`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ssgst->Sortable = true; // Allow sort
        $this->ssgst->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->ssgst->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->ssgst->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ssgst->Param, "CustomMsg");
        $this->Fields['ssgst'] = &$this->ssgst;

        // scgst
        $this->scgst = new DbField('view_pharmacy_report_stock_value', 'view_pharmacy_report_stock_value', 'x_scgst', 'scgst', '`scgst`', '`scgst`', 131, 12, -1, false, '`scgst`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->scgst->Sortable = true; // Allow sort
        $this->scgst->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->scgst->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->scgst->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->scgst->Param, "CustomMsg");
        $this->Fields['scgst'] = &$this->scgst;

        // stockvalue
        $this->stockvalue = new DbField('view_pharmacy_report_stock_value', 'view_pharmacy_report_stock_value', 'x_stockvalue', 'stockvalue', '`stockvalue`', '`stockvalue`', 131, 27, -1, false, '`stockvalue`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->stockvalue->Sortable = false; // Allow sort
        $this->stockvalue->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->stockvalue->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->stockvalue->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->stockvalue->Param, "CustomMsg");
        $this->Fields['stockvalue'] = &$this->stockvalue;

        // stockvalue1
        $this->stockvalue1 = new DbField('view_pharmacy_report_stock_value', 'view_pharmacy_report_stock_value', 'x_stockvalue1', 'stockvalue1', '(stock/PUnit) * ( PurValue + (( PurValue /100 ) * (ssgst + scgst)) )', '(stock/PUnit) * ( PurValue + (( PurValue /100 ) * (ssgst + scgst)) )', 131, 53, -1, false, '(stock/PUnit) * ( PurValue + (( PurValue /100 ) * (ssgst + scgst)) )', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->stockvalue1->IsCustom = true; // Custom field
        $this->stockvalue1->Sortable = true; // Allow sort
        $this->stockvalue1->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->stockvalue1->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->stockvalue1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->stockvalue1->Param, "CustomMsg");
        $this->Fields['stockvalue1'] = &$this->stockvalue1;

        // brcode
        $this->brcode = new DbField('view_pharmacy_report_stock_value', 'view_pharmacy_report_stock_value', 'x_brcode', 'brcode', '`brcode`', '`brcode`', 3, 11, -1, false, '`brcode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->brcode->Sortable = false; // Allow sort
        $this->brcode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->brcode->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->brcode->Param, "CustomMsg");
        $this->Fields['brcode'] = &$this->brcode;

        // hospid
        $this->hospid = new DbField('view_pharmacy_report_stock_value', 'view_pharmacy_report_stock_value', 'x_hospid', 'hospid', '`hospid`', '`hospid`', 3, 11, -1, false, '`hospid`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->hospid->Sortable = false; // Allow sort
        $this->hospid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->hospid->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->hospid->Param, "CustomMsg");
        $this->Fields['hospid'] = &$this->hospid;

        // PUnit
        $this->PUnit = new DbField('view_pharmacy_report_stock_value', 'view_pharmacy_report_stock_value', 'x_PUnit', 'PUnit', '`PUnit`', '`PUnit`', 3, 11, -1, false, '`PUnit`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PUnit->Sortable = true; // Allow sort
        $this->PUnit->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->PUnit->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PUnit->Param, "CustomMsg");
        $this->Fields['PUnit'] = &$this->PUnit;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_pharmacy_report_stock_value`";
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
        return $this->SqlSelect ?? $this->getQueryBuilder()->select("*, PurValue + (( PurValue /100 ) * (ssgst + scgst)) AS `PurValue1`, (stock/PUnit) * ( PurValue + (( PurValue /100 ) * (ssgst + scgst)) ) AS `stockvalue1`");
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
        $this->DefaultFilter = "`hospid`='".HospitalID()."'  and  `brcode`='".PharmacyID()."'";
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
        $this->Batch->DbValue = $row['Batch'];
        $this->MFRCODE->DbValue = $row['MFRCODE'];
        $this->stock->DbValue = $row['stock'];
        $this->Mrp->DbValue = $row['Mrp'];
        $this->PurValue->DbValue = $row['PurValue'];
        $this->PurValue1->DbValue = $row['PurValue1'];
        $this->ssgst->DbValue = $row['ssgst'];
        $this->scgst->DbValue = $row['scgst'];
        $this->stockvalue->DbValue = $row['stockvalue'];
        $this->stockvalue1->DbValue = $row['stockvalue1'];
        $this->brcode->DbValue = $row['brcode'];
        $this->hospid->DbValue = $row['hospid'];
        $this->PUnit->DbValue = $row['PUnit'];
    }

    // Delete uploaded files
    public function deleteUploadedFiles($row)
    {
        $this->loadDbValues($row);
    }

    // Record filter WHERE clause
    protected function sqlKeyFilter()
    {
        return "";
    }

    // Get Key
    public function getKey($current = false)
    {
        $keys = [];
        return implode(Config("COMPOSITE_KEY_SEPARATOR"), $keys);
    }

    // Set Key
    public function setKey($key, $current = false)
    {
        $this->OldKey = strval($key);
        $keys = explode(Config("COMPOSITE_KEY_SEPARATOR"), $this->OldKey);
        if (count($keys) == 0) {
        }
    }

    // Get record filter
    public function getRecordFilter($row = null)
    {
        $keyFilter = $this->sqlKeyFilter();
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
        return $_SESSION[$name] ?? GetUrl("ViewPharmacyReportStockValueList");
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
        if ($pageName == "ViewPharmacyReportStockValueView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewPharmacyReportStockValueEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewPharmacyReportStockValueAdd") {
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
                return "ViewPharmacyReportStockValueView";
            case Config("API_ADD_ACTION"):
                return "ViewPharmacyReportStockValueAdd";
            case Config("API_EDIT_ACTION"):
                return "ViewPharmacyReportStockValueEdit";
            case Config("API_DELETE_ACTION"):
                return "ViewPharmacyReportStockValueDelete";
            case Config("API_LIST_ACTION"):
                return "ViewPharmacyReportStockValueList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewPharmacyReportStockValueList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewPharmacyReportStockValueView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewPharmacyReportStockValueView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewPharmacyReportStockValueAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewPharmacyReportStockValueAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewPharmacyReportStockValueEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewPharmacyReportStockValueAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewPharmacyReportStockValueDelete", $this->getUrlParm());
    }

    // Add master url
    public function addMasterUrl($url)
    {
        return $url;
    }

    public function keyToJson($htmlEncode = false)
    {
        $json = "";
        $json = "{" . $json . "}";
        if ($htmlEncode) {
            $json = HtmlEncode($json);
        }
        return $json;
    }

    // Add key value to URL
    public function keyUrl($url, $parm = "")
    {
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
            //return $arKeys; // Do not return yet, so the values will also be checked by the following code
        }
        // Check keys
        $ar = [];
        if (is_array($arKeys)) {
            foreach ($arKeys as $key) {
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
        $this->Batch->setDbValue($row['Batch']);
        $this->MFRCODE->setDbValue($row['MFRCODE']);
        $this->stock->setDbValue($row['stock']);
        $this->Mrp->setDbValue($row['Mrp']);
        $this->PurValue->setDbValue($row['PurValue']);
        $this->PurValue1->setDbValue($row['PurValue1']);
        $this->ssgst->setDbValue($row['ssgst']);
        $this->scgst->setDbValue($row['scgst']);
        $this->stockvalue->setDbValue($row['stockvalue']);
        $this->stockvalue1->setDbValue($row['stockvalue1']);
        $this->brcode->setDbValue($row['brcode']);
        $this->hospid->setDbValue($row['hospid']);
        $this->PUnit->setDbValue($row['PUnit']);
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

        // Batch

        // MFRCODE

        // stock

        // Mrp

        // PurValue

        // PurValue1

        // ssgst

        // scgst

        // stockvalue

        // stockvalue1

        // brcode

        // hospid

        // PUnit

        // PRC
        $this->PRC->ViewValue = $this->PRC->CurrentValue;
        $this->PRC->ViewCustomAttributes = "";

        // DES
        $this->DES->ViewValue = $this->DES->CurrentValue;
        $this->DES->ViewCustomAttributes = "";

        // Batch
        $this->Batch->ViewValue = $this->Batch->CurrentValue;
        $this->Batch->ViewCustomAttributes = "";

        // MFRCODE
        $this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
        $this->MFRCODE->ViewCustomAttributes = "";

        // stock
        $this->stock->ViewValue = $this->stock->CurrentValue;
        $this->stock->ViewValue = FormatNumber($this->stock->ViewValue, 0, -2, -2, -2);
        $this->stock->ViewCustomAttributes = "";

        // Mrp
        $this->Mrp->ViewValue = $this->Mrp->CurrentValue;
        $this->Mrp->ViewValue = FormatNumber($this->Mrp->ViewValue, 2, -2, -2, -2);
        $this->Mrp->ViewCustomAttributes = "";

        // PurValue
        $this->PurValue->ViewValue = $this->PurValue->CurrentValue;
        $this->PurValue->ViewValue = FormatNumber($this->PurValue->ViewValue, 2, -2, -2, -2);
        $this->PurValue->ViewCustomAttributes = "";

        // PurValue1
        $this->PurValue1->ViewValue = $this->PurValue1->CurrentValue;
        $this->PurValue1->ViewValue = FormatNumber($this->PurValue1->ViewValue, 2, -2, -2, -2);
        $this->PurValue1->ViewCustomAttributes = "";

        // ssgst
        $this->ssgst->ViewValue = $this->ssgst->CurrentValue;
        $this->ssgst->ViewValue = FormatNumber($this->ssgst->ViewValue, 2, -2, -2, -2);
        $this->ssgst->ViewCustomAttributes = "";

        // scgst
        $this->scgst->ViewValue = $this->scgst->CurrentValue;
        $this->scgst->ViewValue = FormatNumber($this->scgst->ViewValue, 2, -2, -2, -2);
        $this->scgst->ViewCustomAttributes = "";

        // stockvalue
        $this->stockvalue->ViewValue = $this->stockvalue->CurrentValue;
        $this->stockvalue->ViewValue = FormatNumber($this->stockvalue->ViewValue, 2, -2, -2, -2);
        $this->stockvalue->ViewCustomAttributes = "";

        // stockvalue1
        $this->stockvalue1->ViewValue = $this->stockvalue1->CurrentValue;
        $this->stockvalue1->ViewValue = FormatNumber($this->stockvalue1->ViewValue, 2, -2, -2, -2);
        $this->stockvalue1->ViewCustomAttributes = "";

        // brcode
        $this->brcode->ViewValue = $this->brcode->CurrentValue;
        $this->brcode->ViewValue = FormatNumber($this->brcode->ViewValue, 0, -2, -2, -2);
        $this->brcode->ViewCustomAttributes = "";

        // hospid
        $this->hospid->ViewValue = $this->hospid->CurrentValue;
        $this->hospid->ViewValue = FormatNumber($this->hospid->ViewValue, 0, -2, -2, -2);
        $this->hospid->ViewCustomAttributes = "";

        // PUnit
        $this->PUnit->ViewValue = $this->PUnit->CurrentValue;
        $this->PUnit->ViewValue = FormatNumber($this->PUnit->ViewValue, 0, -2, -2, -2);
        $this->PUnit->ViewCustomAttributes = "";

        // PRC
        $this->PRC->LinkCustomAttributes = "";
        $this->PRC->HrefValue = "";
        $this->PRC->TooltipValue = "";

        // DES
        $this->DES->LinkCustomAttributes = "";
        $this->DES->HrefValue = "";
        $this->DES->TooltipValue = "";

        // Batch
        $this->Batch->LinkCustomAttributes = "";
        $this->Batch->HrefValue = "";
        $this->Batch->TooltipValue = "";

        // MFRCODE
        $this->MFRCODE->LinkCustomAttributes = "";
        $this->MFRCODE->HrefValue = "";
        $this->MFRCODE->TooltipValue = "";

        // stock
        $this->stock->LinkCustomAttributes = "";
        $this->stock->HrefValue = "";
        $this->stock->TooltipValue = "";

        // Mrp
        $this->Mrp->LinkCustomAttributes = "";
        $this->Mrp->HrefValue = "";
        $this->Mrp->TooltipValue = "";

        // PurValue
        $this->PurValue->LinkCustomAttributes = "";
        $this->PurValue->HrefValue = "";
        $this->PurValue->TooltipValue = "";

        // PurValue1
        $this->PurValue1->LinkCustomAttributes = "";
        $this->PurValue1->HrefValue = "";
        $this->PurValue1->TooltipValue = "";

        // ssgst
        $this->ssgst->LinkCustomAttributes = "";
        $this->ssgst->HrefValue = "";
        $this->ssgst->TooltipValue = "";

        // scgst
        $this->scgst->LinkCustomAttributes = "";
        $this->scgst->HrefValue = "";
        $this->scgst->TooltipValue = "";

        // stockvalue
        $this->stockvalue->LinkCustomAttributes = "";
        $this->stockvalue->HrefValue = "";
        $this->stockvalue->TooltipValue = "";

        // stockvalue1
        $this->stockvalue1->LinkCustomAttributes = "";
        $this->stockvalue1->HrefValue = "";
        $this->stockvalue1->TooltipValue = "";

        // brcode
        $this->brcode->LinkCustomAttributes = "";
        $this->brcode->HrefValue = "";
        $this->brcode->TooltipValue = "";

        // hospid
        $this->hospid->LinkCustomAttributes = "";
        $this->hospid->HrefValue = "";
        $this->hospid->TooltipValue = "";

        // PUnit
        $this->PUnit->LinkCustomAttributes = "";
        $this->PUnit->HrefValue = "";
        $this->PUnit->TooltipValue = "";

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

        // Batch
        $this->Batch->EditAttrs["class"] = "form-control";
        $this->Batch->EditCustomAttributes = "";
        if (!$this->Batch->Raw) {
            $this->Batch->CurrentValue = HtmlDecode($this->Batch->CurrentValue);
        }
        $this->Batch->EditValue = $this->Batch->CurrentValue;
        $this->Batch->PlaceHolder = RemoveHtml($this->Batch->caption());

        // MFRCODE
        $this->MFRCODE->EditAttrs["class"] = "form-control";
        $this->MFRCODE->EditCustomAttributes = "";
        if (!$this->MFRCODE->Raw) {
            $this->MFRCODE->CurrentValue = HtmlDecode($this->MFRCODE->CurrentValue);
        }
        $this->MFRCODE->EditValue = $this->MFRCODE->CurrentValue;
        $this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

        // stock
        $this->stock->EditAttrs["class"] = "form-control";
        $this->stock->EditCustomAttributes = "";
        $this->stock->EditValue = $this->stock->CurrentValue;
        $this->stock->PlaceHolder = RemoveHtml($this->stock->caption());

        // Mrp
        $this->Mrp->EditAttrs["class"] = "form-control";
        $this->Mrp->EditCustomAttributes = "";
        $this->Mrp->EditValue = $this->Mrp->CurrentValue;
        $this->Mrp->PlaceHolder = RemoveHtml($this->Mrp->caption());
        if (strval($this->Mrp->EditValue) != "" && is_numeric($this->Mrp->EditValue)) {
            $this->Mrp->EditValue = FormatNumber($this->Mrp->EditValue, -2, -2, -2, -2);
        }

        // PurValue
        $this->PurValue->EditAttrs["class"] = "form-control";
        $this->PurValue->EditCustomAttributes = "";
        $this->PurValue->EditValue = $this->PurValue->CurrentValue;
        $this->PurValue->PlaceHolder = RemoveHtml($this->PurValue->caption());
        if (strval($this->PurValue->EditValue) != "" && is_numeric($this->PurValue->EditValue)) {
            $this->PurValue->EditValue = FormatNumber($this->PurValue->EditValue, -2, -2, -2, -2);
        }

        // PurValue1
        $this->PurValue1->EditAttrs["class"] = "form-control";
        $this->PurValue1->EditCustomAttributes = "";
        $this->PurValue1->EditValue = $this->PurValue1->CurrentValue;
        $this->PurValue1->PlaceHolder = RemoveHtml($this->PurValue1->caption());
        if (strval($this->PurValue1->EditValue) != "" && is_numeric($this->PurValue1->EditValue)) {
            $this->PurValue1->EditValue = FormatNumber($this->PurValue1->EditValue, -2, -2, -2, -2);
        }

        // ssgst
        $this->ssgst->EditAttrs["class"] = "form-control";
        $this->ssgst->EditCustomAttributes = "";
        $this->ssgst->EditValue = $this->ssgst->CurrentValue;
        $this->ssgst->PlaceHolder = RemoveHtml($this->ssgst->caption());
        if (strval($this->ssgst->EditValue) != "" && is_numeric($this->ssgst->EditValue)) {
            $this->ssgst->EditValue = FormatNumber($this->ssgst->EditValue, -2, -2, -2, -2);
        }

        // scgst
        $this->scgst->EditAttrs["class"] = "form-control";
        $this->scgst->EditCustomAttributes = "";
        $this->scgst->EditValue = $this->scgst->CurrentValue;
        $this->scgst->PlaceHolder = RemoveHtml($this->scgst->caption());
        if (strval($this->scgst->EditValue) != "" && is_numeric($this->scgst->EditValue)) {
            $this->scgst->EditValue = FormatNumber($this->scgst->EditValue, -2, -2, -2, -2);
        }

        // stockvalue
        $this->stockvalue->EditAttrs["class"] = "form-control";
        $this->stockvalue->EditCustomAttributes = "";
        $this->stockvalue->EditValue = $this->stockvalue->CurrentValue;
        $this->stockvalue->PlaceHolder = RemoveHtml($this->stockvalue->caption());
        if (strval($this->stockvalue->EditValue) != "" && is_numeric($this->stockvalue->EditValue)) {
            $this->stockvalue->EditValue = FormatNumber($this->stockvalue->EditValue, -2, -2, -2, -2);
        }

        // stockvalue1
        $this->stockvalue1->EditAttrs["class"] = "form-control";
        $this->stockvalue1->EditCustomAttributes = "";
        $this->stockvalue1->EditValue = $this->stockvalue1->CurrentValue;
        $this->stockvalue1->PlaceHolder = RemoveHtml($this->stockvalue1->caption());
        if (strval($this->stockvalue1->EditValue) != "" && is_numeric($this->stockvalue1->EditValue)) {
            $this->stockvalue1->EditValue = FormatNumber($this->stockvalue1->EditValue, -2, -2, -2, -2);
        }

        // brcode
        $this->brcode->EditAttrs["class"] = "form-control";
        $this->brcode->EditCustomAttributes = "";
        $this->brcode->EditValue = $this->brcode->CurrentValue;
        $this->brcode->PlaceHolder = RemoveHtml($this->brcode->caption());

        // hospid
        $this->hospid->EditAttrs["class"] = "form-control";
        $this->hospid->EditCustomAttributes = "";
        $this->hospid->EditValue = $this->hospid->CurrentValue;
        $this->hospid->PlaceHolder = RemoveHtml($this->hospid->caption());

        // PUnit
        $this->PUnit->EditAttrs["class"] = "form-control";
        $this->PUnit->EditCustomAttributes = "";
        $this->PUnit->EditValue = $this->PUnit->CurrentValue;
        $this->PUnit->PlaceHolder = RemoveHtml($this->PUnit->caption());

        // Call Row Rendered event
        $this->rowRendered();
    }

    // Aggregate list row values
    public function aggregateListRowValues()
    {
            if (is_numeric($this->PurValue->CurrentValue)) {
                $this->PurValue->Total += $this->PurValue->CurrentValue; // Accumulate total
            }
            if (is_numeric($this->PurValue1->CurrentValue)) {
                $this->PurValue1->Total += $this->PurValue1->CurrentValue; // Accumulate total
            }
            if (is_numeric($this->stockvalue->CurrentValue)) {
                $this->stockvalue->Total += $this->stockvalue->CurrentValue; // Accumulate total
            }
            if (is_numeric($this->stockvalue1->CurrentValue)) {
                $this->stockvalue1->Total += $this->stockvalue1->CurrentValue; // Accumulate total
            }
    }

    // Aggregate list row (for rendering)
    public function aggregateListRow()
    {
            $this->PurValue->CurrentValue = $this->PurValue->Total;
            $this->PurValue->ViewValue = $this->PurValue->CurrentValue;
            $this->PurValue->ViewValue = FormatNumber($this->PurValue->ViewValue, 2, -2, -2, -2);
            $this->PurValue->ViewCustomAttributes = "";
            $this->PurValue->HrefValue = ""; // Clear href value
            $this->PurValue1->CurrentValue = $this->PurValue1->Total;
            $this->PurValue1->ViewValue = $this->PurValue1->CurrentValue;
            $this->PurValue1->ViewValue = FormatNumber($this->PurValue1->ViewValue, 2, -2, -2, -2);
            $this->PurValue1->ViewCustomAttributes = "";
            $this->PurValue1->HrefValue = ""; // Clear href value
            $this->stockvalue->CurrentValue = $this->stockvalue->Total;
            $this->stockvalue->ViewValue = $this->stockvalue->CurrentValue;
            $this->stockvalue->ViewValue = FormatNumber($this->stockvalue->ViewValue, 2, -2, -2, -2);
            $this->stockvalue->ViewCustomAttributes = "";
            $this->stockvalue->HrefValue = ""; // Clear href value
            $this->stockvalue1->CurrentValue = $this->stockvalue1->Total;
            $this->stockvalue1->ViewValue = $this->stockvalue1->CurrentValue;
            $this->stockvalue1->ViewValue = FormatNumber($this->stockvalue1->ViewValue, 2, -2, -2, -2);
            $this->stockvalue1->ViewCustomAttributes = "";
            $this->stockvalue1->HrefValue = ""; // Clear href value

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
                    $doc->exportCaption($this->Batch);
                    $doc->exportCaption($this->MFRCODE);
                    $doc->exportCaption($this->stock);
                    $doc->exportCaption($this->Mrp);
                    $doc->exportCaption($this->PurValue);
                    $doc->exportCaption($this->PurValue1);
                    $doc->exportCaption($this->ssgst);
                    $doc->exportCaption($this->scgst);
                    $doc->exportCaption($this->stockvalue);
                    $doc->exportCaption($this->stockvalue1);
                    $doc->exportCaption($this->brcode);
                    $doc->exportCaption($this->hospid);
                    $doc->exportCaption($this->PUnit);
                } else {
                    $doc->exportCaption($this->PRC);
                    $doc->exportCaption($this->DES);
                    $doc->exportCaption($this->Batch);
                    $doc->exportCaption($this->MFRCODE);
                    $doc->exportCaption($this->stock);
                    $doc->exportCaption($this->Mrp);
                    $doc->exportCaption($this->PurValue1);
                    $doc->exportCaption($this->ssgst);
                    $doc->exportCaption($this->scgst);
                    $doc->exportCaption($this->stockvalue1);
                    $doc->exportCaption($this->PUnit);
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
                $this->aggregateListRowValues(); // Aggregate row values

                // Render row
                $this->RowType = ROWTYPE_VIEW; // Render view
                $this->resetAttributes();
                $this->renderListRow();
                if (!$doc->ExportCustom) {
                    $doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
                    if ($exportPageType == "view") {
                        $doc->exportField($this->PRC);
                        $doc->exportField($this->DES);
                        $doc->exportField($this->Batch);
                        $doc->exportField($this->MFRCODE);
                        $doc->exportField($this->stock);
                        $doc->exportField($this->Mrp);
                        $doc->exportField($this->PurValue);
                        $doc->exportField($this->PurValue1);
                        $doc->exportField($this->ssgst);
                        $doc->exportField($this->scgst);
                        $doc->exportField($this->stockvalue);
                        $doc->exportField($this->stockvalue1);
                        $doc->exportField($this->brcode);
                        $doc->exportField($this->hospid);
                        $doc->exportField($this->PUnit);
                    } else {
                        $doc->exportField($this->PRC);
                        $doc->exportField($this->DES);
                        $doc->exportField($this->Batch);
                        $doc->exportField($this->MFRCODE);
                        $doc->exportField($this->stock);
                        $doc->exportField($this->Mrp);
                        $doc->exportField($this->PurValue1);
                        $doc->exportField($this->ssgst);
                        $doc->exportField($this->scgst);
                        $doc->exportField($this->stockvalue1);
                        $doc->exportField($this->PUnit);
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

        // Export aggregates (horizontal format only)
        if ($doc->Horizontal) {
            $this->RowType = ROWTYPE_AGGREGATE;
            $this->resetAttributes();
            $this->aggregateListRow();
            if (!$doc->ExportCustom) {
                $doc->beginExportRow(-1);
                $doc->exportAggregate($this->PRC, '');
                $doc->exportAggregate($this->DES, '');
                $doc->exportAggregate($this->Batch, '');
                $doc->exportAggregate($this->MFRCODE, '');
                $doc->exportAggregate($this->stock, '');
                $doc->exportAggregate($this->Mrp, '');
                $doc->exportAggregate($this->PurValue1, 'TOTAL');
                $doc->exportAggregate($this->ssgst, '');
                $doc->exportAggregate($this->scgst, '');
                $doc->exportAggregate($this->stockvalue1, 'TOTAL');
                $doc->exportAggregate($this->PUnit, '');
                $doc->endExportRow();
            }
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
