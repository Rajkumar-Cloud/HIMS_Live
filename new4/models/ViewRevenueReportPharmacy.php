<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_revenue_report_pharmacy
 */
class ViewRevenueReportPharmacy extends DbTable
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
    public $DATE;
    public $BillNumber;
    public $PatientId;
    public $_5Tax;
    public $TAXABLE5;
    public $_12Tax;
    public $TAXABLE12;
    public $_18Tax;
    public $TAXABLE18;
    public $Amount;
    public $ModeofPayment;
    public $Cash;
    public $Card;
    public $DiscountAmount;
    public $DiscountRemarks;
    public $Remarks;
    public $HospID;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'view_revenue_report_pharmacy';
        $this->TableName = 'view_revenue_report_pharmacy';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_revenue_report_pharmacy`";
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

        // DATE
        $this->DATE = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x_DATE', 'DATE', '`DATE`', CastDateFieldForLike("`DATE`", 0, "DB"), 133, 10, 0, false, '`DATE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DATE->Sortable = true; // Allow sort
        $this->DATE->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->DATE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DATE->Param, "CustomMsg");
        $this->Fields['DATE'] = &$this->DATE;

        // BillNumber
        $this->BillNumber = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x_BillNumber', 'BillNumber', '`BillNumber`', '`BillNumber`', 200, 45, -1, false, '`BillNumber`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BillNumber->Sortable = true; // Allow sort
        $this->BillNumber->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BillNumber->Param, "CustomMsg");
        $this->Fields['BillNumber'] = &$this->BillNumber;

        // PatientId
        $this->PatientId = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x_PatientId', 'PatientId', '`PatientId`', '`PatientId`', 200, 45, -1, false, '`PatientId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientId->Sortable = true; // Allow sort
        $this->PatientId->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientId->Param, "CustomMsg");
        $this->Fields['PatientId'] = &$this->PatientId;

        // 5%Tax
        $this->_5Tax = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x__5Tax', '5%Tax', '`5%Tax`', '`5%Tax`', 201, 417, -1, false, '`5%Tax`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->_5Tax->Sortable = true; // Allow sort
        $this->_5Tax->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->_5Tax->Param, "CustomMsg");
        $this->Fields['5%Tax'] = &$this->_5Tax;

        // TAXABLE 5%
        $this->TAXABLE5 = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x_TAXABLE5', 'TAXABLE 5%', '`TAXABLE 5%`', '`TAXABLE 5%`', 200, 22, -1, false, '`TAXABLE 5%`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TAXABLE5->Sortable = true; // Allow sort
        $this->TAXABLE5->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TAXABLE5->Param, "CustomMsg");
        $this->Fields['TAXABLE 5%'] = &$this->TAXABLE5;

        // 12%Tax
        $this->_12Tax = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x__12Tax', '12%Tax', '`12%Tax`', '`12%Tax`', 201, 417, -1, false, '`12%Tax`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->_12Tax->Sortable = true; // Allow sort
        $this->_12Tax->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->_12Tax->Param, "CustomMsg");
        $this->Fields['12%Tax'] = &$this->_12Tax;

        // TAXABLE 12%
        $this->TAXABLE12 = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x_TAXABLE12', 'TAXABLE 12%', '`TAXABLE 12%`', '`TAXABLE 12%`', 200, 22, -1, false, '`TAXABLE 12%`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TAXABLE12->Sortable = true; // Allow sort
        $this->TAXABLE12->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TAXABLE12->Param, "CustomMsg");
        $this->Fields['TAXABLE 12%'] = &$this->TAXABLE12;

        // 18%Tax
        $this->_18Tax = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x__18Tax', '18%Tax', '`18%Tax`', '`18%Tax`', 201, 417, -1, false, '`18%Tax`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->_18Tax->Sortable = true; // Allow sort
        $this->_18Tax->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->_18Tax->Param, "CustomMsg");
        $this->Fields['18%Tax'] = &$this->_18Tax;

        // TAXABLE 18%
        $this->TAXABLE18 = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x_TAXABLE18', 'TAXABLE 18%', '`TAXABLE 18%`', '`TAXABLE 18%`', 200, 22, -1, false, '`TAXABLE 18%`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TAXABLE18->Sortable = true; // Allow sort
        $this->TAXABLE18->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TAXABLE18->Param, "CustomMsg");
        $this->Fields['TAXABLE 18%'] = &$this->TAXABLE18;

        // Amount
        $this->Amount = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x_Amount', 'Amount', '`Amount`', '`Amount`', 131, 10, -1, false, '`Amount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Amount->Sortable = true; // Allow sort
        $this->Amount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Amount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Amount->Param, "CustomMsg");
        $this->Fields['Amount'] = &$this->Amount;

        // ModeofPayment
        $this->ModeofPayment = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x_ModeofPayment', 'ModeofPayment', '`ModeofPayment`', '`ModeofPayment`', 200, 45, -1, false, '`ModeofPayment`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ModeofPayment->Sortable = true; // Allow sort
        $this->ModeofPayment->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ModeofPayment->Param, "CustomMsg");
        $this->Fields['ModeofPayment'] = &$this->ModeofPayment;

        // Cash
        $this->Cash = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x_Cash', 'Cash', '`Cash`', '`Cash`', 131, 10, -1, false, '`Cash`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Cash->Sortable = true; // Allow sort
        $this->Cash->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Cash->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Cash->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Cash->Param, "CustomMsg");
        $this->Fields['Cash'] = &$this->Cash;

        // Card
        $this->Card = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x_Card', 'Card', '`Card`', '`Card`', 131, 10, -1, false, '`Card`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Card->Sortable = true; // Allow sort
        $this->Card->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Card->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Card->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Card->Param, "CustomMsg");
        $this->Fields['Card'] = &$this->Card;

        // DiscountAmount
        $this->DiscountAmount = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x_DiscountAmount', 'DiscountAmount', '`DiscountAmount`', '`DiscountAmount`', 131, 10, -1, false, '`DiscountAmount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DiscountAmount->Sortable = true; // Allow sort
        $this->DiscountAmount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->DiscountAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->DiscountAmount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DiscountAmount->Param, "CustomMsg");
        $this->Fields['DiscountAmount'] = &$this->DiscountAmount;

        // DiscountRemarks
        $this->DiscountRemarks = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x_DiscountRemarks', 'DiscountRemarks', '`DiscountRemarks`', '`DiscountRemarks`', 200, 45, -1, false, '`DiscountRemarks`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DiscountRemarks->Sortable = true; // Allow sort
        $this->DiscountRemarks->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DiscountRemarks->Param, "CustomMsg");
        $this->Fields['DiscountRemarks'] = &$this->DiscountRemarks;

        // Remarks
        $this->Remarks = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x_Remarks', 'Remarks', '`Remarks`', '`Remarks`', 200, 45, -1, false, '`Remarks`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Remarks->Sortable = true; // Allow sort
        $this->Remarks->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Remarks->Param, "CustomMsg");
        $this->Fields['Remarks'] = &$this->Remarks;

        // HospID
        $this->HospID = new DbField('view_revenue_report_pharmacy', 'view_revenue_report_pharmacy', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->HospID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospID->Param, "CustomMsg");
        $this->Fields['HospID'] = &$this->HospID;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_revenue_report_pharmacy`";
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
        $this->DefaultFilter = "`HospID`='".HospitalID()."'  ";
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
        $this->DATE->DbValue = $row['DATE'];
        $this->BillNumber->DbValue = $row['BillNumber'];
        $this->PatientId->DbValue = $row['PatientId'];
        $this->_5Tax->DbValue = $row['5%Tax'];
        $this->TAXABLE5->DbValue = $row['TAXABLE 5%'];
        $this->_12Tax->DbValue = $row['12%Tax'];
        $this->TAXABLE12->DbValue = $row['TAXABLE 12%'];
        $this->_18Tax->DbValue = $row['18%Tax'];
        $this->TAXABLE18->DbValue = $row['TAXABLE 18%'];
        $this->Amount->DbValue = $row['Amount'];
        $this->ModeofPayment->DbValue = $row['ModeofPayment'];
        $this->Cash->DbValue = $row['Cash'];
        $this->Card->DbValue = $row['Card'];
        $this->DiscountAmount->DbValue = $row['DiscountAmount'];
        $this->DiscountRemarks->DbValue = $row['DiscountRemarks'];
        $this->Remarks->DbValue = $row['Remarks'];
        $this->HospID->DbValue = $row['HospID'];
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
        return $_SESSION[$name] ?? GetUrl("ViewRevenueReportPharmacyList");
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
        if ($pageName == "ViewRevenueReportPharmacyView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewRevenueReportPharmacyEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewRevenueReportPharmacyAdd") {
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
                return "ViewRevenueReportPharmacyView";
            case Config("API_ADD_ACTION"):
                return "ViewRevenueReportPharmacyAdd";
            case Config("API_EDIT_ACTION"):
                return "ViewRevenueReportPharmacyEdit";
            case Config("API_DELETE_ACTION"):
                return "ViewRevenueReportPharmacyDelete";
            case Config("API_LIST_ACTION"):
                return "ViewRevenueReportPharmacyList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewRevenueReportPharmacyList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewRevenueReportPharmacyView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewRevenueReportPharmacyView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewRevenueReportPharmacyAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewRevenueReportPharmacyAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewRevenueReportPharmacyEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewRevenueReportPharmacyAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewRevenueReportPharmacyDelete", $this->getUrlParm());
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
        $this->DATE->setDbValue($row['DATE']);
        $this->BillNumber->setDbValue($row['BillNumber']);
        $this->PatientId->setDbValue($row['PatientId']);
        $this->_5Tax->setDbValue($row['5%Tax']);
        $this->TAXABLE5->setDbValue($row['TAXABLE 5%']);
        $this->_12Tax->setDbValue($row['12%Tax']);
        $this->TAXABLE12->setDbValue($row['TAXABLE 12%']);
        $this->_18Tax->setDbValue($row['18%Tax']);
        $this->TAXABLE18->setDbValue($row['TAXABLE 18%']);
        $this->Amount->setDbValue($row['Amount']);
        $this->ModeofPayment->setDbValue($row['ModeofPayment']);
        $this->Cash->setDbValue($row['Cash']);
        $this->Card->setDbValue($row['Card']);
        $this->DiscountAmount->setDbValue($row['DiscountAmount']);
        $this->DiscountRemarks->setDbValue($row['DiscountRemarks']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->HospID->setDbValue($row['HospID']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // DATE

        // BillNumber

        // PatientId

        // 5%Tax

        // TAXABLE 5%

        // 12%Tax

        // TAXABLE 12%

        // 18%Tax

        // TAXABLE 18%

        // Amount

        // ModeofPayment

        // Cash

        // Card

        // DiscountAmount

        // DiscountRemarks

        // Remarks

        // HospID

        // DATE
        $this->DATE->ViewValue = $this->DATE->CurrentValue;
        $this->DATE->ViewValue = FormatDateTime($this->DATE->ViewValue, 0);
        $this->DATE->ViewCustomAttributes = "";

        // BillNumber
        $this->BillNumber->ViewValue = $this->BillNumber->CurrentValue;
        $this->BillNumber->ViewCustomAttributes = "";

        // PatientId
        $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
        $this->PatientId->ViewCustomAttributes = "";

        // 5%Tax
        $this->_5Tax->ViewValue = $this->_5Tax->CurrentValue;
        $this->_5Tax->ViewCustomAttributes = "";

        // TAXABLE 5%
        $this->TAXABLE5->ViewValue = $this->TAXABLE5->CurrentValue;
        $this->TAXABLE5->ViewCustomAttributes = "";

        // 12%Tax
        $this->_12Tax->ViewValue = $this->_12Tax->CurrentValue;
        $this->_12Tax->ViewCustomAttributes = "";

        // TAXABLE 12%
        $this->TAXABLE12->ViewValue = $this->TAXABLE12->CurrentValue;
        $this->TAXABLE12->ViewCustomAttributes = "";

        // 18%Tax
        $this->_18Tax->ViewValue = $this->_18Tax->CurrentValue;
        $this->_18Tax->ViewCustomAttributes = "";

        // TAXABLE 18%
        $this->TAXABLE18->ViewValue = $this->TAXABLE18->CurrentValue;
        $this->TAXABLE18->ViewCustomAttributes = "";

        // Amount
        $this->Amount->ViewValue = $this->Amount->CurrentValue;
        $this->Amount->ViewValue = FormatNumber($this->Amount->ViewValue, 2, -2, -2, -2);
        $this->Amount->ViewCustomAttributes = "";

        // ModeofPayment
        $this->ModeofPayment->ViewValue = $this->ModeofPayment->CurrentValue;
        $this->ModeofPayment->ViewCustomAttributes = "";

        // Cash
        $this->Cash->ViewValue = $this->Cash->CurrentValue;
        $this->Cash->ViewValue = FormatNumber($this->Cash->ViewValue, 2, -2, -2, -2);
        $this->Cash->ViewCustomAttributes = "";

        // Card
        $this->Card->ViewValue = $this->Card->CurrentValue;
        $this->Card->ViewValue = FormatNumber($this->Card->ViewValue, 2, -2, -2, -2);
        $this->Card->ViewCustomAttributes = "";

        // DiscountAmount
        $this->DiscountAmount->ViewValue = $this->DiscountAmount->CurrentValue;
        $this->DiscountAmount->ViewValue = FormatNumber($this->DiscountAmount->ViewValue, 2, -2, -2, -2);
        $this->DiscountAmount->ViewCustomAttributes = "";

        // DiscountRemarks
        $this->DiscountRemarks->ViewValue = $this->DiscountRemarks->CurrentValue;
        $this->DiscountRemarks->ViewCustomAttributes = "";

        // Remarks
        $this->Remarks->ViewValue = $this->Remarks->CurrentValue;
        $this->Remarks->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

        // DATE
        $this->DATE->LinkCustomAttributes = "";
        $this->DATE->HrefValue = "";
        $this->DATE->TooltipValue = "";

        // BillNumber
        $this->BillNumber->LinkCustomAttributes = "";
        $this->BillNumber->HrefValue = "";
        $this->BillNumber->TooltipValue = "";

        // PatientId
        $this->PatientId->LinkCustomAttributes = "";
        $this->PatientId->HrefValue = "";
        $this->PatientId->TooltipValue = "";

        // 5%Tax
        $this->_5Tax->LinkCustomAttributes = "";
        $this->_5Tax->HrefValue = "";
        $this->_5Tax->TooltipValue = "";

        // TAXABLE 5%
        $this->TAXABLE5->LinkCustomAttributes = "";
        $this->TAXABLE5->HrefValue = "";
        $this->TAXABLE5->TooltipValue = "";

        // 12%Tax
        $this->_12Tax->LinkCustomAttributes = "";
        $this->_12Tax->HrefValue = "";
        $this->_12Tax->TooltipValue = "";

        // TAXABLE 12%
        $this->TAXABLE12->LinkCustomAttributes = "";
        $this->TAXABLE12->HrefValue = "";
        $this->TAXABLE12->TooltipValue = "";

        // 18%Tax
        $this->_18Tax->LinkCustomAttributes = "";
        $this->_18Tax->HrefValue = "";
        $this->_18Tax->TooltipValue = "";

        // TAXABLE 18%
        $this->TAXABLE18->LinkCustomAttributes = "";
        $this->TAXABLE18->HrefValue = "";
        $this->TAXABLE18->TooltipValue = "";

        // Amount
        $this->Amount->LinkCustomAttributes = "";
        $this->Amount->HrefValue = "";
        $this->Amount->TooltipValue = "";

        // ModeofPayment
        $this->ModeofPayment->LinkCustomAttributes = "";
        $this->ModeofPayment->HrefValue = "";
        $this->ModeofPayment->TooltipValue = "";

        // Cash
        $this->Cash->LinkCustomAttributes = "";
        $this->Cash->HrefValue = "";
        $this->Cash->TooltipValue = "";

        // Card
        $this->Card->LinkCustomAttributes = "";
        $this->Card->HrefValue = "";
        $this->Card->TooltipValue = "";

        // DiscountAmount
        $this->DiscountAmount->LinkCustomAttributes = "";
        $this->DiscountAmount->HrefValue = "";
        $this->DiscountAmount->TooltipValue = "";

        // DiscountRemarks
        $this->DiscountRemarks->LinkCustomAttributes = "";
        $this->DiscountRemarks->HrefValue = "";
        $this->DiscountRemarks->TooltipValue = "";

        // Remarks
        $this->Remarks->LinkCustomAttributes = "";
        $this->Remarks->HrefValue = "";
        $this->Remarks->TooltipValue = "";

        // HospID
        $this->HospID->LinkCustomAttributes = "";
        $this->HospID->HrefValue = "";
        $this->HospID->TooltipValue = "";

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

        // DATE
        $this->DATE->EditAttrs["class"] = "form-control";
        $this->DATE->EditCustomAttributes = "";
        $this->DATE->EditValue = FormatDateTime($this->DATE->CurrentValue, 8);
        $this->DATE->PlaceHolder = RemoveHtml($this->DATE->caption());

        // BillNumber
        $this->BillNumber->EditAttrs["class"] = "form-control";
        $this->BillNumber->EditCustomAttributes = "";
        if (!$this->BillNumber->Raw) {
            $this->BillNumber->CurrentValue = HtmlDecode($this->BillNumber->CurrentValue);
        }
        $this->BillNumber->EditValue = $this->BillNumber->CurrentValue;
        $this->BillNumber->PlaceHolder = RemoveHtml($this->BillNumber->caption());

        // PatientId
        $this->PatientId->EditAttrs["class"] = "form-control";
        $this->PatientId->EditCustomAttributes = "";
        if (!$this->PatientId->Raw) {
            $this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
        }
        $this->PatientId->EditValue = $this->PatientId->CurrentValue;
        $this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

        // 5%Tax
        $this->_5Tax->EditAttrs["class"] = "form-control";
        $this->_5Tax->EditCustomAttributes = "";
        $this->_5Tax->EditValue = $this->_5Tax->CurrentValue;
        $this->_5Tax->PlaceHolder = RemoveHtml($this->_5Tax->caption());

        // TAXABLE 5%
        $this->TAXABLE5->EditAttrs["class"] = "form-control";
        $this->TAXABLE5->EditCustomAttributes = "";
        if (!$this->TAXABLE5->Raw) {
            $this->TAXABLE5->CurrentValue = HtmlDecode($this->TAXABLE5->CurrentValue);
        }
        $this->TAXABLE5->EditValue = $this->TAXABLE5->CurrentValue;
        $this->TAXABLE5->PlaceHolder = RemoveHtml($this->TAXABLE5->caption());

        // 12%Tax
        $this->_12Tax->EditAttrs["class"] = "form-control";
        $this->_12Tax->EditCustomAttributes = "";
        $this->_12Tax->EditValue = $this->_12Tax->CurrentValue;
        $this->_12Tax->PlaceHolder = RemoveHtml($this->_12Tax->caption());

        // TAXABLE 12%
        $this->TAXABLE12->EditAttrs["class"] = "form-control";
        $this->TAXABLE12->EditCustomAttributes = "";
        if (!$this->TAXABLE12->Raw) {
            $this->TAXABLE12->CurrentValue = HtmlDecode($this->TAXABLE12->CurrentValue);
        }
        $this->TAXABLE12->EditValue = $this->TAXABLE12->CurrentValue;
        $this->TAXABLE12->PlaceHolder = RemoveHtml($this->TAXABLE12->caption());

        // 18%Tax
        $this->_18Tax->EditAttrs["class"] = "form-control";
        $this->_18Tax->EditCustomAttributes = "";
        $this->_18Tax->EditValue = $this->_18Tax->CurrentValue;
        $this->_18Tax->PlaceHolder = RemoveHtml($this->_18Tax->caption());

        // TAXABLE 18%
        $this->TAXABLE18->EditAttrs["class"] = "form-control";
        $this->TAXABLE18->EditCustomAttributes = "";
        if (!$this->TAXABLE18->Raw) {
            $this->TAXABLE18->CurrentValue = HtmlDecode($this->TAXABLE18->CurrentValue);
        }
        $this->TAXABLE18->EditValue = $this->TAXABLE18->CurrentValue;
        $this->TAXABLE18->PlaceHolder = RemoveHtml($this->TAXABLE18->caption());

        // Amount
        $this->Amount->EditAttrs["class"] = "form-control";
        $this->Amount->EditCustomAttributes = "";
        $this->Amount->EditValue = $this->Amount->CurrentValue;
        $this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());
        if (strval($this->Amount->EditValue) != "" && is_numeric($this->Amount->EditValue)) {
            $this->Amount->EditValue = FormatNumber($this->Amount->EditValue, -2, -2, -2, -2);
        }

        // ModeofPayment
        $this->ModeofPayment->EditAttrs["class"] = "form-control";
        $this->ModeofPayment->EditCustomAttributes = "";
        if (!$this->ModeofPayment->Raw) {
            $this->ModeofPayment->CurrentValue = HtmlDecode($this->ModeofPayment->CurrentValue);
        }
        $this->ModeofPayment->EditValue = $this->ModeofPayment->CurrentValue;
        $this->ModeofPayment->PlaceHolder = RemoveHtml($this->ModeofPayment->caption());

        // Cash
        $this->Cash->EditAttrs["class"] = "form-control";
        $this->Cash->EditCustomAttributes = "";
        $this->Cash->EditValue = $this->Cash->CurrentValue;
        $this->Cash->PlaceHolder = RemoveHtml($this->Cash->caption());
        if (strval($this->Cash->EditValue) != "" && is_numeric($this->Cash->EditValue)) {
            $this->Cash->EditValue = FormatNumber($this->Cash->EditValue, -2, -2, -2, -2);
        }

        // Card
        $this->Card->EditAttrs["class"] = "form-control";
        $this->Card->EditCustomAttributes = "";
        $this->Card->EditValue = $this->Card->CurrentValue;
        $this->Card->PlaceHolder = RemoveHtml($this->Card->caption());
        if (strval($this->Card->EditValue) != "" && is_numeric($this->Card->EditValue)) {
            $this->Card->EditValue = FormatNumber($this->Card->EditValue, -2, -2, -2, -2);
        }

        // DiscountAmount
        $this->DiscountAmount->EditAttrs["class"] = "form-control";
        $this->DiscountAmount->EditCustomAttributes = "";
        $this->DiscountAmount->EditValue = $this->DiscountAmount->CurrentValue;
        $this->DiscountAmount->PlaceHolder = RemoveHtml($this->DiscountAmount->caption());
        if (strval($this->DiscountAmount->EditValue) != "" && is_numeric($this->DiscountAmount->EditValue)) {
            $this->DiscountAmount->EditValue = FormatNumber($this->DiscountAmount->EditValue, -2, -2, -2, -2);
        }

        // DiscountRemarks
        $this->DiscountRemarks->EditAttrs["class"] = "form-control";
        $this->DiscountRemarks->EditCustomAttributes = "";
        if (!$this->DiscountRemarks->Raw) {
            $this->DiscountRemarks->CurrentValue = HtmlDecode($this->DiscountRemarks->CurrentValue);
        }
        $this->DiscountRemarks->EditValue = $this->DiscountRemarks->CurrentValue;
        $this->DiscountRemarks->PlaceHolder = RemoveHtml($this->DiscountRemarks->caption());

        // Remarks
        $this->Remarks->EditAttrs["class"] = "form-control";
        $this->Remarks->EditCustomAttributes = "";
        if (!$this->Remarks->Raw) {
            $this->Remarks->CurrentValue = HtmlDecode($this->Remarks->CurrentValue);
        }
        $this->Remarks->EditValue = $this->Remarks->CurrentValue;
        $this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

        // HospID
        $this->HospID->EditAttrs["class"] = "form-control";
        $this->HospID->EditCustomAttributes = "";
        $this->HospID->EditValue = $this->HospID->CurrentValue;
        $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

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
                    $doc->exportCaption($this->DATE);
                    $doc->exportCaption($this->BillNumber);
                    $doc->exportCaption($this->PatientId);
                    $doc->exportCaption($this->_5Tax);
                    $doc->exportCaption($this->TAXABLE5);
                    $doc->exportCaption($this->_12Tax);
                    $doc->exportCaption($this->TAXABLE12);
                    $doc->exportCaption($this->_18Tax);
                    $doc->exportCaption($this->TAXABLE18);
                    $doc->exportCaption($this->Amount);
                    $doc->exportCaption($this->ModeofPayment);
                    $doc->exportCaption($this->Cash);
                    $doc->exportCaption($this->Card);
                    $doc->exportCaption($this->DiscountAmount);
                    $doc->exportCaption($this->DiscountRemarks);
                    $doc->exportCaption($this->Remarks);
                    $doc->exportCaption($this->HospID);
                } else {
                    $doc->exportCaption($this->DATE);
                    $doc->exportCaption($this->BillNumber);
                    $doc->exportCaption($this->PatientId);
                    $doc->exportCaption($this->TAXABLE5);
                    $doc->exportCaption($this->TAXABLE12);
                    $doc->exportCaption($this->TAXABLE18);
                    $doc->exportCaption($this->Amount);
                    $doc->exportCaption($this->ModeofPayment);
                    $doc->exportCaption($this->Cash);
                    $doc->exportCaption($this->Card);
                    $doc->exportCaption($this->DiscountAmount);
                    $doc->exportCaption($this->DiscountRemarks);
                    $doc->exportCaption($this->Remarks);
                    $doc->exportCaption($this->HospID);
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
                        $doc->exportField($this->DATE);
                        $doc->exportField($this->BillNumber);
                        $doc->exportField($this->PatientId);
                        $doc->exportField($this->_5Tax);
                        $doc->exportField($this->TAXABLE5);
                        $doc->exportField($this->_12Tax);
                        $doc->exportField($this->TAXABLE12);
                        $doc->exportField($this->_18Tax);
                        $doc->exportField($this->TAXABLE18);
                        $doc->exportField($this->Amount);
                        $doc->exportField($this->ModeofPayment);
                        $doc->exportField($this->Cash);
                        $doc->exportField($this->Card);
                        $doc->exportField($this->DiscountAmount);
                        $doc->exportField($this->DiscountRemarks);
                        $doc->exportField($this->Remarks);
                        $doc->exportField($this->HospID);
                    } else {
                        $doc->exportField($this->DATE);
                        $doc->exportField($this->BillNumber);
                        $doc->exportField($this->PatientId);
                        $doc->exportField($this->TAXABLE5);
                        $doc->exportField($this->TAXABLE12);
                        $doc->exportField($this->TAXABLE18);
                        $doc->exportField($this->Amount);
                        $doc->exportField($this->ModeofPayment);
                        $doc->exportField($this->Cash);
                        $doc->exportField($this->Card);
                        $doc->exportField($this->DiscountAmount);
                        $doc->exportField($this->DiscountRemarks);
                        $doc->exportField($this->Remarks);
                        $doc->exportField($this->HospID);
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
