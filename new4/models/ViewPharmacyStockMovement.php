<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_pharmacy_stock_movement
 */
class ViewPharmacyStockMovement extends DbTable
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
    public $OpeningStk;
    public $PurchaseQty;
    public $SalesQty;
    public $ClosingStk;
    public $PurchasefreeQty;
    public $TransferingQty;
    public $UnitPurchaseRate;
    public $UnitSaleRate;
    public $CreatedDate;
    public $HospID;
    public $BRCODE;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'view_pharmacy_stock_movement';
        $this->TableName = 'view_pharmacy_stock_movement';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_pharmacy_stock_movement`";
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
        $this->id = new DbField('view_pharmacy_stock_movement', 'view_pharmacy_stock_movement', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // PRC
        $this->PRC = new DbField('view_pharmacy_stock_movement', 'view_pharmacy_stock_movement', 'x_PRC', 'PRC', '`PRC`', '`PRC`', 200, 9, -1, false, '`PRC`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PRC->Sortable = true; // Allow sort
        $this->PRC->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PRC->Param, "CustomMsg");
        $this->Fields['PRC'] = &$this->PRC;

        // PrName
        $this->PrName = new DbField('view_pharmacy_stock_movement', 'view_pharmacy_stock_movement', 'x_PrName', 'PrName', '`PrName`', '`PrName`', 200, 100, -1, false, '`PrName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PrName->Sortable = true; // Allow sort
        $this->PrName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PrName->Param, "CustomMsg");
        $this->Fields['PrName'] = &$this->PrName;

        // OpeningStk
        $this->OpeningStk = new DbField('view_pharmacy_stock_movement', 'view_pharmacy_stock_movement', 'x_OpeningStk', 'OpeningStk', '`OpeningStk`', '`OpeningStk`', 131, 12, -1, false, '`OpeningStk`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OpeningStk->Sortable = true; // Allow sort
        $this->OpeningStk->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OpeningStk->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->OpeningStk->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OpeningStk->Param, "CustomMsg");
        $this->Fields['OpeningStk'] = &$this->OpeningStk;

        // PurchaseQty
        $this->PurchaseQty = new DbField('view_pharmacy_stock_movement', 'view_pharmacy_stock_movement', 'x_PurchaseQty', 'PurchaseQty', '`PurchaseQty`', '`PurchaseQty`', 131, 12, -1, false, '`PurchaseQty`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PurchaseQty->Sortable = true; // Allow sort
        $this->PurchaseQty->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PurchaseQty->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->PurchaseQty->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PurchaseQty->Param, "CustomMsg");
        $this->Fields['PurchaseQty'] = &$this->PurchaseQty;

        // SalesQty
        $this->SalesQty = new DbField('view_pharmacy_stock_movement', 'view_pharmacy_stock_movement', 'x_SalesQty', 'SalesQty', '`SalesQty`', '`SalesQty`', 131, 12, -1, false, '`SalesQty`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SalesQty->Sortable = true; // Allow sort
        $this->SalesQty->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SalesQty->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->SalesQty->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SalesQty->Param, "CustomMsg");
        $this->Fields['SalesQty'] = &$this->SalesQty;

        // ClosingStk
        $this->ClosingStk = new DbField('view_pharmacy_stock_movement', 'view_pharmacy_stock_movement', 'x_ClosingStk', 'ClosingStk', '`ClosingStk`', '`ClosingStk`', 131, 12, -1, false, '`ClosingStk`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ClosingStk->Sortable = true; // Allow sort
        $this->ClosingStk->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->ClosingStk->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->ClosingStk->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ClosingStk->Param, "CustomMsg");
        $this->Fields['ClosingStk'] = &$this->ClosingStk;

        // PurchasefreeQty
        $this->PurchasefreeQty = new DbField('view_pharmacy_stock_movement', 'view_pharmacy_stock_movement', 'x_PurchasefreeQty', 'PurchasefreeQty', '`PurchasefreeQty`', '`PurchasefreeQty`', 131, 12, -1, false, '`PurchasefreeQty`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PurchasefreeQty->Sortable = true; // Allow sort
        $this->PurchasefreeQty->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PurchasefreeQty->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->PurchasefreeQty->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PurchasefreeQty->Param, "CustomMsg");
        $this->Fields['PurchasefreeQty'] = &$this->PurchasefreeQty;

        // TransferingQty
        $this->TransferingQty = new DbField('view_pharmacy_stock_movement', 'view_pharmacy_stock_movement', 'x_TransferingQty', 'TransferingQty', '`TransferingQty`', '`TransferingQty`', 131, 12, -1, false, '`TransferingQty`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TransferingQty->Sortable = true; // Allow sort
        $this->TransferingQty->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->TransferingQty->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->TransferingQty->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TransferingQty->Param, "CustomMsg");
        $this->Fields['TransferingQty'] = &$this->TransferingQty;

        // UnitPurchaseRate
        $this->UnitPurchaseRate = new DbField('view_pharmacy_stock_movement', 'view_pharmacy_stock_movement', 'x_UnitPurchaseRate', 'UnitPurchaseRate', '`UnitPurchaseRate`', '`UnitPurchaseRate`', 131, 12, -1, false, '`UnitPurchaseRate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->UnitPurchaseRate->Sortable = true; // Allow sort
        $this->UnitPurchaseRate->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->UnitPurchaseRate->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->UnitPurchaseRate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->UnitPurchaseRate->Param, "CustomMsg");
        $this->Fields['UnitPurchaseRate'] = &$this->UnitPurchaseRate;

        // UnitSaleRate
        $this->UnitSaleRate = new DbField('view_pharmacy_stock_movement', 'view_pharmacy_stock_movement', 'x_UnitSaleRate', 'UnitSaleRate', '`UnitSaleRate`', '`UnitSaleRate`', 131, 12, -1, false, '`UnitSaleRate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->UnitSaleRate->Sortable = true; // Allow sort
        $this->UnitSaleRate->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->UnitSaleRate->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->UnitSaleRate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->UnitSaleRate->Param, "CustomMsg");
        $this->Fields['UnitSaleRate'] = &$this->UnitSaleRate;

        // CreatedDate
        $this->CreatedDate = new DbField('view_pharmacy_stock_movement', 'view_pharmacy_stock_movement', 'x_CreatedDate', 'CreatedDate', '`CreatedDate`', CastDateFieldForLike("`CreatedDate`", 0, "DB"), 133, 10, 0, false, '`CreatedDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CreatedDate->Sortable = true; // Allow sort
        $this->CreatedDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->CreatedDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CreatedDate->Param, "CustomMsg");
        $this->Fields['CreatedDate'] = &$this->CreatedDate;

        // HospID
        $this->HospID = new DbField('view_pharmacy_stock_movement', 'view_pharmacy_stock_movement', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->HospID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospID->Param, "CustomMsg");
        $this->Fields['HospID'] = &$this->HospID;

        // BRCODE
        $this->BRCODE = new DbField('view_pharmacy_stock_movement', 'view_pharmacy_stock_movement', 'x_BRCODE', 'BRCODE', '`BRCODE`', '`BRCODE`', 3, 11, -1, false, '`BRCODE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BRCODE->Sortable = true; // Allow sort
        $this->BRCODE->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->BRCODE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BRCODE->Param, "CustomMsg");
        $this->Fields['BRCODE'] = &$this->BRCODE;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_pharmacy_stock_movement`";
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
        $this->OpeningStk->DbValue = $row['OpeningStk'];
        $this->PurchaseQty->DbValue = $row['PurchaseQty'];
        $this->SalesQty->DbValue = $row['SalesQty'];
        $this->ClosingStk->DbValue = $row['ClosingStk'];
        $this->PurchasefreeQty->DbValue = $row['PurchasefreeQty'];
        $this->TransferingQty->DbValue = $row['TransferingQty'];
        $this->UnitPurchaseRate->DbValue = $row['UnitPurchaseRate'];
        $this->UnitSaleRate->DbValue = $row['UnitSaleRate'];
        $this->CreatedDate->DbValue = $row['CreatedDate'];
        $this->HospID->DbValue = $row['HospID'];
        $this->BRCODE->DbValue = $row['BRCODE'];
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
        return $_SESSION[$name] ?? GetUrl("ViewPharmacyStockMovementList");
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
        if ($pageName == "ViewPharmacyStockMovementView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewPharmacyStockMovementEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewPharmacyStockMovementAdd") {
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
                return "ViewPharmacyStockMovementView";
            case Config("API_ADD_ACTION"):
                return "ViewPharmacyStockMovementAdd";
            case Config("API_EDIT_ACTION"):
                return "ViewPharmacyStockMovementEdit";
            case Config("API_DELETE_ACTION"):
                return "ViewPharmacyStockMovementDelete";
            case Config("API_LIST_ACTION"):
                return "ViewPharmacyStockMovementList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewPharmacyStockMovementList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewPharmacyStockMovementView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewPharmacyStockMovementView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewPharmacyStockMovementAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewPharmacyStockMovementAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewPharmacyStockMovementEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewPharmacyStockMovementAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewPharmacyStockMovementDelete", $this->getUrlParm());
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
        $this->OpeningStk->setDbValue($row['OpeningStk']);
        $this->PurchaseQty->setDbValue($row['PurchaseQty']);
        $this->SalesQty->setDbValue($row['SalesQty']);
        $this->ClosingStk->setDbValue($row['ClosingStk']);
        $this->PurchasefreeQty->setDbValue($row['PurchasefreeQty']);
        $this->TransferingQty->setDbValue($row['TransferingQty']);
        $this->UnitPurchaseRate->setDbValue($row['UnitPurchaseRate']);
        $this->UnitSaleRate->setDbValue($row['UnitSaleRate']);
        $this->CreatedDate->setDbValue($row['CreatedDate']);
        $this->HospID->setDbValue($row['HospID']);
        $this->BRCODE->setDbValue($row['BRCODE']);
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

        // OpeningStk

        // PurchaseQty

        // SalesQty

        // ClosingStk

        // PurchasefreeQty

        // TransferingQty

        // UnitPurchaseRate

        // UnitSaleRate

        // CreatedDate

        // HospID

        // BRCODE

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // PRC
        $this->PRC->ViewValue = $this->PRC->CurrentValue;
        $this->PRC->ViewCustomAttributes = "";

        // PrName
        $this->PrName->ViewValue = $this->PrName->CurrentValue;
        $this->PrName->ViewCustomAttributes = "";

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

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

        // BRCODE
        $this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
        $this->BRCODE->ViewValue = FormatNumber($this->BRCODE->ViewValue, 0, -2, -2, -2);
        $this->BRCODE->ViewCustomAttributes = "";

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

        // HospID
        $this->HospID->LinkCustomAttributes = "";
        $this->HospID->HrefValue = "";
        $this->HospID->TooltipValue = "";

        // BRCODE
        $this->BRCODE->LinkCustomAttributes = "";
        $this->BRCODE->HrefValue = "";
        $this->BRCODE->TooltipValue = "";

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

        // HospID
        $this->HospID->EditAttrs["class"] = "form-control";
        $this->HospID->EditCustomAttributes = "";
        $this->HospID->EditValue = $this->HospID->CurrentValue;
        $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

        // BRCODE
        $this->BRCODE->EditAttrs["class"] = "form-control";
        $this->BRCODE->EditCustomAttributes = "";
        $this->BRCODE->EditValue = $this->BRCODE->CurrentValue;
        $this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

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
                    $doc->exportCaption($this->OpeningStk);
                    $doc->exportCaption($this->PurchaseQty);
                    $doc->exportCaption($this->SalesQty);
                    $doc->exportCaption($this->ClosingStk);
                    $doc->exportCaption($this->PurchasefreeQty);
                    $doc->exportCaption($this->TransferingQty);
                    $doc->exportCaption($this->UnitPurchaseRate);
                    $doc->exportCaption($this->UnitSaleRate);
                    $doc->exportCaption($this->CreatedDate);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->BRCODE);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->PRC);
                    $doc->exportCaption($this->PrName);
                    $doc->exportCaption($this->OpeningStk);
                    $doc->exportCaption($this->PurchaseQty);
                    $doc->exportCaption($this->SalesQty);
                    $doc->exportCaption($this->ClosingStk);
                    $doc->exportCaption($this->PurchasefreeQty);
                    $doc->exportCaption($this->TransferingQty);
                    $doc->exportCaption($this->UnitPurchaseRate);
                    $doc->exportCaption($this->UnitSaleRate);
                    $doc->exportCaption($this->CreatedDate);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->BRCODE);
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
                        $doc->exportField($this->OpeningStk);
                        $doc->exportField($this->PurchaseQty);
                        $doc->exportField($this->SalesQty);
                        $doc->exportField($this->ClosingStk);
                        $doc->exportField($this->PurchasefreeQty);
                        $doc->exportField($this->TransferingQty);
                        $doc->exportField($this->UnitPurchaseRate);
                        $doc->exportField($this->UnitSaleRate);
                        $doc->exportField($this->CreatedDate);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->BRCODE);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->PRC);
                        $doc->exportField($this->PrName);
                        $doc->exportField($this->OpeningStk);
                        $doc->exportField($this->PurchaseQty);
                        $doc->exportField($this->SalesQty);
                        $doc->exportField($this->ClosingStk);
                        $doc->exportField($this->PurchasefreeQty);
                        $doc->exportField($this->TransferingQty);
                        $doc->exportField($this->UnitPurchaseRate);
                        $doc->exportField($this->UnitSaleRate);
                        $doc->exportField($this->CreatedDate);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->BRCODE);
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
