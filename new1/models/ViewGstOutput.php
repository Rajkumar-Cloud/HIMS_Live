<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_gst_output
 */
class ViewGstOutput extends DbTable
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
    public $BillDate;
    public $IP_25_SGST;
    public $IP_25_CGST;
    public $IP_60_SGST;
    public $IP_60_CGST;
    public $IP_90_SGST;
    public $IP_90_CGST;
    public $IP_140_SGST;
    public $IP_140_CGST;
    public $OP_25_SGST;
    public $OP_25_CGST;
    public $OP_60_SGST;
    public $OP_60_CGST;
    public $OP_90_SGST;
    public $OP_90_CGST;
    public $OP_140_SGST;
    public $OP_140_CGST;
    public $HosoID;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'view_gst_output';
        $this->TableName = 'view_gst_output';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_gst_output`";
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

        // BillDate
        $this->BillDate = new DbField('view_gst_output', 'view_gst_output', 'x_BillDate', 'BillDate', '`BillDate`', CastDateFieldForLike("`BillDate`", 0, "DB"), 133, 10, 0, false, '`BillDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BillDate->Sortable = true; // Allow sort
        $this->BillDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['BillDate'] = &$this->BillDate;

        // IP 2.5% SGST
        $this->IP_25_SGST = new DbField('view_gst_output', 'view_gst_output', 'x_IP_25_SGST', 'IP 2.5% SGST', '`IP 2.5% SGST`', '`IP 2.5% SGST`', 131, 54, -1, false, '`IP 2.5% SGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IP_25_SGST->Sortable = true; // Allow sort
        $this->IP_25_SGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->IP_25_SGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['IP 2.5% SGST'] = &$this->IP_25_SGST;

        // IP 2.5% CGST
        $this->IP_25_CGST = new DbField('view_gst_output', 'view_gst_output', 'x_IP_25_CGST', 'IP 2.5% CGST', '`IP 2.5% CGST`', '`IP 2.5% CGST`', 131, 54, -1, false, '`IP 2.5% CGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IP_25_CGST->Sortable = true; // Allow sort
        $this->IP_25_CGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->IP_25_CGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['IP 2.5% CGST'] = &$this->IP_25_CGST;

        // IP 6.0% SGST
        $this->IP_60_SGST = new DbField('view_gst_output', 'view_gst_output', 'x_IP_60_SGST', 'IP 6.0% SGST', '`IP 6.0% SGST`', '`IP 6.0% SGST`', 131, 54, -1, false, '`IP 6.0% SGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IP_60_SGST->Sortable = true; // Allow sort
        $this->IP_60_SGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->IP_60_SGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['IP 6.0% SGST'] = &$this->IP_60_SGST;

        // IP 6.0% CGST
        $this->IP_60_CGST = new DbField('view_gst_output', 'view_gst_output', 'x_IP_60_CGST', 'IP 6.0% CGST', '`IP 6.0% CGST`', '`IP 6.0% CGST`', 131, 54, -1, false, '`IP 6.0% CGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IP_60_CGST->Sortable = true; // Allow sort
        $this->IP_60_CGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->IP_60_CGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['IP 6.0% CGST'] = &$this->IP_60_CGST;

        // IP 9.0% SGST
        $this->IP_90_SGST = new DbField('view_gst_output', 'view_gst_output', 'x_IP_90_SGST', 'IP 9.0% SGST', '`IP 9.0% SGST`', '`IP 9.0% SGST`', 131, 54, -1, false, '`IP 9.0% SGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IP_90_SGST->Sortable = true; // Allow sort
        $this->IP_90_SGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->IP_90_SGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['IP 9.0% SGST'] = &$this->IP_90_SGST;

        // IP 9.0% CGST
        $this->IP_90_CGST = new DbField('view_gst_output', 'view_gst_output', 'x_IP_90_CGST', 'IP 9.0% CGST', '`IP 9.0% CGST`', '`IP 9.0% CGST`', 131, 54, -1, false, '`IP 9.0% CGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IP_90_CGST->Sortable = true; // Allow sort
        $this->IP_90_CGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->IP_90_CGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['IP 9.0% CGST'] = &$this->IP_90_CGST;

        // IP 14.0% SGST
        $this->IP_140_SGST = new DbField('view_gst_output', 'view_gst_output', 'x_IP_140_SGST', 'IP 14.0% SGST', '`IP 14.0% SGST`', '`IP 14.0% SGST`', 131, 54, -1, false, '`IP 14.0% SGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IP_140_SGST->Sortable = true; // Allow sort
        $this->IP_140_SGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->IP_140_SGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['IP 14.0% SGST'] = &$this->IP_140_SGST;

        // IP 14.0% CGST
        $this->IP_140_CGST = new DbField('view_gst_output', 'view_gst_output', 'x_IP_140_CGST', 'IP 14.0% CGST', '`IP 14.0% CGST`', '`IP 14.0% CGST`', 131, 54, -1, false, '`IP 14.0% CGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IP_140_CGST->Sortable = true; // Allow sort
        $this->IP_140_CGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->IP_140_CGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['IP 14.0% CGST'] = &$this->IP_140_CGST;

        // OP 2.5% SGST
        $this->OP_25_SGST = new DbField('view_gst_output', 'view_gst_output', 'x_OP_25_SGST', 'OP 2.5% SGST', '`OP 2.5% SGST`', '`OP 2.5% SGST`', 131, 45, -1, false, '`OP 2.5% SGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OP_25_SGST->Sortable = true; // Allow sort
        $this->OP_25_SGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OP_25_SGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['OP 2.5% SGST'] = &$this->OP_25_SGST;

        // OP 2.5% CGST
        $this->OP_25_CGST = new DbField('view_gst_output', 'view_gst_output', 'x_OP_25_CGST', 'OP 2.5% CGST', '`OP 2.5% CGST`', '`OP 2.5% CGST`', 131, 45, -1, false, '`OP 2.5% CGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OP_25_CGST->Sortable = true; // Allow sort
        $this->OP_25_CGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OP_25_CGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['OP 2.5% CGST'] = &$this->OP_25_CGST;

        // OP 6.0% SGST
        $this->OP_60_SGST = new DbField('view_gst_output', 'view_gst_output', 'x_OP_60_SGST', 'OP 6.0% SGST', '`OP 6.0% SGST`', '`OP 6.0% SGST`', 131, 45, -1, false, '`OP 6.0% SGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OP_60_SGST->Sortable = true; // Allow sort
        $this->OP_60_SGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OP_60_SGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['OP 6.0% SGST'] = &$this->OP_60_SGST;

        // OP 6.0% CGST
        $this->OP_60_CGST = new DbField('view_gst_output', 'view_gst_output', 'x_OP_60_CGST', 'OP 6.0% CGST', '`OP 6.0% CGST`', '`OP 6.0% CGST`', 131, 45, -1, false, '`OP 6.0% CGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OP_60_CGST->Sortable = true; // Allow sort
        $this->OP_60_CGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OP_60_CGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['OP 6.0% CGST'] = &$this->OP_60_CGST;

        // OP 9.0% SGST
        $this->OP_90_SGST = new DbField('view_gst_output', 'view_gst_output', 'x_OP_90_SGST', 'OP 9.0% SGST', '`OP 9.0% SGST`', '`OP 9.0% SGST`', 131, 45, -1, false, '`OP 9.0% SGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OP_90_SGST->Sortable = true; // Allow sort
        $this->OP_90_SGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OP_90_SGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['OP 9.0% SGST'] = &$this->OP_90_SGST;

        // OP 9.0% CGST
        $this->OP_90_CGST = new DbField('view_gst_output', 'view_gst_output', 'x_OP_90_CGST', 'OP 9.0% CGST', '`OP 9.0% CGST`', '`OP 9.0% CGST`', 131, 45, -1, false, '`OP 9.0% CGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OP_90_CGST->Sortable = true; // Allow sort
        $this->OP_90_CGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OP_90_CGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['OP 9.0% CGST'] = &$this->OP_90_CGST;

        // OP 14.0% SGST
        $this->OP_140_SGST = new DbField('view_gst_output', 'view_gst_output', 'x_OP_140_SGST', 'OP 14.0% SGST', '`OP 14.0% SGST`', '`OP 14.0% SGST`', 131, 45, -1, false, '`OP 14.0% SGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OP_140_SGST->Sortable = true; // Allow sort
        $this->OP_140_SGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OP_140_SGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['OP 14.0% SGST'] = &$this->OP_140_SGST;

        // OP 14.0% CGST
        $this->OP_140_CGST = new DbField('view_gst_output', 'view_gst_output', 'x_OP_140_CGST', 'OP 14.0% CGST', '`OP 14.0% CGST`', '`OP 14.0% CGST`', 131, 45, -1, false, '`OP 14.0% CGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OP_140_CGST->Sortable = true; // Allow sort
        $this->OP_140_CGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OP_140_CGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['OP 14.0% CGST'] = &$this->OP_140_CGST;

        // HosoID
        $this->HosoID = new DbField('view_gst_output', 'view_gst_output', 'x_HosoID', 'HosoID', '`HosoID`', '`HosoID`', 3, 11, -1, false, '`HosoID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HosoID->Sortable = true; // Allow sort
        $this->HosoID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['HosoID'] = &$this->HosoID;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_gst_output`";
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
        $this->BillDate->DbValue = $row['BillDate'];
        $this->IP_25_SGST->DbValue = $row['IP 2.5% SGST'];
        $this->IP_25_CGST->DbValue = $row['IP 2.5% CGST'];
        $this->IP_60_SGST->DbValue = $row['IP 6.0% SGST'];
        $this->IP_60_CGST->DbValue = $row['IP 6.0% CGST'];
        $this->IP_90_SGST->DbValue = $row['IP 9.0% SGST'];
        $this->IP_90_CGST->DbValue = $row['IP 9.0% CGST'];
        $this->IP_140_SGST->DbValue = $row['IP 14.0% SGST'];
        $this->IP_140_CGST->DbValue = $row['IP 14.0% CGST'];
        $this->OP_25_SGST->DbValue = $row['OP 2.5% SGST'];
        $this->OP_25_CGST->DbValue = $row['OP 2.5% CGST'];
        $this->OP_60_SGST->DbValue = $row['OP 6.0% SGST'];
        $this->OP_60_CGST->DbValue = $row['OP 6.0% CGST'];
        $this->OP_90_SGST->DbValue = $row['OP 9.0% SGST'];
        $this->OP_90_CGST->DbValue = $row['OP 9.0% CGST'];
        $this->OP_140_SGST->DbValue = $row['OP 14.0% SGST'];
        $this->OP_140_CGST->DbValue = $row['OP 14.0% CGST'];
        $this->HosoID->DbValue = $row['HosoID'];
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

    // Get record filter
    public function getRecordFilter($row = null)
    {
        $keyFilter = $this->sqlKeyFilter();
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
            return GetUrl("ViewGstOutputList");
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
        if ($pageName == "ViewGstOutputView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewGstOutputEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewGstOutputAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewGstOutputList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewGstOutputView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewGstOutputView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewGstOutputAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewGstOutputAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewGstOutputEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewGstOutputAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewGstOutputDelete", $this->getUrlParm());
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
        $this->BillDate->setDbValue($row['BillDate']);
        $this->IP_25_SGST->setDbValue($row['IP 2.5% SGST']);
        $this->IP_25_CGST->setDbValue($row['IP 2.5% CGST']);
        $this->IP_60_SGST->setDbValue($row['IP 6.0% SGST']);
        $this->IP_60_CGST->setDbValue($row['IP 6.0% CGST']);
        $this->IP_90_SGST->setDbValue($row['IP 9.0% SGST']);
        $this->IP_90_CGST->setDbValue($row['IP 9.0% CGST']);
        $this->IP_140_SGST->setDbValue($row['IP 14.0% SGST']);
        $this->IP_140_CGST->setDbValue($row['IP 14.0% CGST']);
        $this->OP_25_SGST->setDbValue($row['OP 2.5% SGST']);
        $this->OP_25_CGST->setDbValue($row['OP 2.5% CGST']);
        $this->OP_60_SGST->setDbValue($row['OP 6.0% SGST']);
        $this->OP_60_CGST->setDbValue($row['OP 6.0% CGST']);
        $this->OP_90_SGST->setDbValue($row['OP 9.0% SGST']);
        $this->OP_90_CGST->setDbValue($row['OP 9.0% CGST']);
        $this->OP_140_SGST->setDbValue($row['OP 14.0% SGST']);
        $this->OP_140_CGST->setDbValue($row['OP 14.0% CGST']);
        $this->HosoID->setDbValue($row['HosoID']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // BillDate

        // IP 2.5% SGST

        // IP 2.5% CGST

        // IP 6.0% SGST

        // IP 6.0% CGST

        // IP 9.0% SGST

        // IP 9.0% CGST

        // IP 14.0% SGST

        // IP 14.0% CGST

        // OP 2.5% SGST

        // OP 2.5% CGST

        // OP 6.0% SGST

        // OP 6.0% CGST

        // OP 9.0% SGST

        // OP 9.0% CGST

        // OP 14.0% SGST

        // OP 14.0% CGST

        // HosoID

        // BillDate
        $this->BillDate->ViewValue = $this->BillDate->CurrentValue;
        $this->BillDate->ViewValue = FormatDateTime($this->BillDate->ViewValue, 0);
        $this->BillDate->ViewCustomAttributes = "";

        // IP 2.5% SGST
        $this->IP_25_SGST->ViewValue = $this->IP_25_SGST->CurrentValue;
        $this->IP_25_SGST->ViewValue = FormatNumber($this->IP_25_SGST->ViewValue, 2, -2, -2, -2);
        $this->IP_25_SGST->ViewCustomAttributes = "";

        // IP 2.5% CGST
        $this->IP_25_CGST->ViewValue = $this->IP_25_CGST->CurrentValue;
        $this->IP_25_CGST->ViewValue = FormatNumber($this->IP_25_CGST->ViewValue, 2, -2, -2, -2);
        $this->IP_25_CGST->ViewCustomAttributes = "";

        // IP 6.0% SGST
        $this->IP_60_SGST->ViewValue = $this->IP_60_SGST->CurrentValue;
        $this->IP_60_SGST->ViewValue = FormatNumber($this->IP_60_SGST->ViewValue, 2, -2, -2, -2);
        $this->IP_60_SGST->ViewCustomAttributes = "";

        // IP 6.0% CGST
        $this->IP_60_CGST->ViewValue = $this->IP_60_CGST->CurrentValue;
        $this->IP_60_CGST->ViewValue = FormatNumber($this->IP_60_CGST->ViewValue, 2, -2, -2, -2);
        $this->IP_60_CGST->ViewCustomAttributes = "";

        // IP 9.0% SGST
        $this->IP_90_SGST->ViewValue = $this->IP_90_SGST->CurrentValue;
        $this->IP_90_SGST->ViewValue = FormatNumber($this->IP_90_SGST->ViewValue, 2, -2, -2, -2);
        $this->IP_90_SGST->ViewCustomAttributes = "";

        // IP 9.0% CGST
        $this->IP_90_CGST->ViewValue = $this->IP_90_CGST->CurrentValue;
        $this->IP_90_CGST->ViewValue = FormatNumber($this->IP_90_CGST->ViewValue, 2, -2, -2, -2);
        $this->IP_90_CGST->ViewCustomAttributes = "";

        // IP 14.0% SGST
        $this->IP_140_SGST->ViewValue = $this->IP_140_SGST->CurrentValue;
        $this->IP_140_SGST->ViewValue = FormatNumber($this->IP_140_SGST->ViewValue, 2, -2, -2, -2);
        $this->IP_140_SGST->ViewCustomAttributes = "";

        // IP 14.0% CGST
        $this->IP_140_CGST->ViewValue = $this->IP_140_CGST->CurrentValue;
        $this->IP_140_CGST->ViewValue = FormatNumber($this->IP_140_CGST->ViewValue, 2, -2, -2, -2);
        $this->IP_140_CGST->ViewCustomAttributes = "";

        // OP 2.5% SGST
        $this->OP_25_SGST->ViewValue = $this->OP_25_SGST->CurrentValue;
        $this->OP_25_SGST->ViewValue = FormatNumber($this->OP_25_SGST->ViewValue, 2, -2, -2, -2);
        $this->OP_25_SGST->ViewCustomAttributes = "";

        // OP 2.5% CGST
        $this->OP_25_CGST->ViewValue = $this->OP_25_CGST->CurrentValue;
        $this->OP_25_CGST->ViewValue = FormatNumber($this->OP_25_CGST->ViewValue, 2, -2, -2, -2);
        $this->OP_25_CGST->ViewCustomAttributes = "";

        // OP 6.0% SGST
        $this->OP_60_SGST->ViewValue = $this->OP_60_SGST->CurrentValue;
        $this->OP_60_SGST->ViewValue = FormatNumber($this->OP_60_SGST->ViewValue, 2, -2, -2, -2);
        $this->OP_60_SGST->ViewCustomAttributes = "";

        // OP 6.0% CGST
        $this->OP_60_CGST->ViewValue = $this->OP_60_CGST->CurrentValue;
        $this->OP_60_CGST->ViewValue = FormatNumber($this->OP_60_CGST->ViewValue, 2, -2, -2, -2);
        $this->OP_60_CGST->ViewCustomAttributes = "";

        // OP 9.0% SGST
        $this->OP_90_SGST->ViewValue = $this->OP_90_SGST->CurrentValue;
        $this->OP_90_SGST->ViewValue = FormatNumber($this->OP_90_SGST->ViewValue, 2, -2, -2, -2);
        $this->OP_90_SGST->ViewCustomAttributes = "";

        // OP 9.0% CGST
        $this->OP_90_CGST->ViewValue = $this->OP_90_CGST->CurrentValue;
        $this->OP_90_CGST->ViewValue = FormatNumber($this->OP_90_CGST->ViewValue, 2, -2, -2, -2);
        $this->OP_90_CGST->ViewCustomAttributes = "";

        // OP 14.0% SGST
        $this->OP_140_SGST->ViewValue = $this->OP_140_SGST->CurrentValue;
        $this->OP_140_SGST->ViewValue = FormatNumber($this->OP_140_SGST->ViewValue, 2, -2, -2, -2);
        $this->OP_140_SGST->ViewCustomAttributes = "";

        // OP 14.0% CGST
        $this->OP_140_CGST->ViewValue = $this->OP_140_CGST->CurrentValue;
        $this->OP_140_CGST->ViewValue = FormatNumber($this->OP_140_CGST->ViewValue, 2, -2, -2, -2);
        $this->OP_140_CGST->ViewCustomAttributes = "";

        // HosoID
        $this->HosoID->ViewValue = $this->HosoID->CurrentValue;
        $this->HosoID->ViewValue = FormatNumber($this->HosoID->ViewValue, 0, -2, -2, -2);
        $this->HosoID->ViewCustomAttributes = "";

        // BillDate
        $this->BillDate->LinkCustomAttributes = "";
        $this->BillDate->HrefValue = "";
        $this->BillDate->TooltipValue = "";

        // IP 2.5% SGST
        $this->IP_25_SGST->LinkCustomAttributes = "";
        $this->IP_25_SGST->HrefValue = "";
        $this->IP_25_SGST->TooltipValue = "";

        // IP 2.5% CGST
        $this->IP_25_CGST->LinkCustomAttributes = "";
        $this->IP_25_CGST->HrefValue = "";
        $this->IP_25_CGST->TooltipValue = "";

        // IP 6.0% SGST
        $this->IP_60_SGST->LinkCustomAttributes = "";
        $this->IP_60_SGST->HrefValue = "";
        $this->IP_60_SGST->TooltipValue = "";

        // IP 6.0% CGST
        $this->IP_60_CGST->LinkCustomAttributes = "";
        $this->IP_60_CGST->HrefValue = "";
        $this->IP_60_CGST->TooltipValue = "";

        // IP 9.0% SGST
        $this->IP_90_SGST->LinkCustomAttributes = "";
        $this->IP_90_SGST->HrefValue = "";
        $this->IP_90_SGST->TooltipValue = "";

        // IP 9.0% CGST
        $this->IP_90_CGST->LinkCustomAttributes = "";
        $this->IP_90_CGST->HrefValue = "";
        $this->IP_90_CGST->TooltipValue = "";

        // IP 14.0% SGST
        $this->IP_140_SGST->LinkCustomAttributes = "";
        $this->IP_140_SGST->HrefValue = "";
        $this->IP_140_SGST->TooltipValue = "";

        // IP 14.0% CGST
        $this->IP_140_CGST->LinkCustomAttributes = "";
        $this->IP_140_CGST->HrefValue = "";
        $this->IP_140_CGST->TooltipValue = "";

        // OP 2.5% SGST
        $this->OP_25_SGST->LinkCustomAttributes = "";
        $this->OP_25_SGST->HrefValue = "";
        $this->OP_25_SGST->TooltipValue = "";

        // OP 2.5% CGST
        $this->OP_25_CGST->LinkCustomAttributes = "";
        $this->OP_25_CGST->HrefValue = "";
        $this->OP_25_CGST->TooltipValue = "";

        // OP 6.0% SGST
        $this->OP_60_SGST->LinkCustomAttributes = "";
        $this->OP_60_SGST->HrefValue = "";
        $this->OP_60_SGST->TooltipValue = "";

        // OP 6.0% CGST
        $this->OP_60_CGST->LinkCustomAttributes = "";
        $this->OP_60_CGST->HrefValue = "";
        $this->OP_60_CGST->TooltipValue = "";

        // OP 9.0% SGST
        $this->OP_90_SGST->LinkCustomAttributes = "";
        $this->OP_90_SGST->HrefValue = "";
        $this->OP_90_SGST->TooltipValue = "";

        // OP 9.0% CGST
        $this->OP_90_CGST->LinkCustomAttributes = "";
        $this->OP_90_CGST->HrefValue = "";
        $this->OP_90_CGST->TooltipValue = "";

        // OP 14.0% SGST
        $this->OP_140_SGST->LinkCustomAttributes = "";
        $this->OP_140_SGST->HrefValue = "";
        $this->OP_140_SGST->TooltipValue = "";

        // OP 14.0% CGST
        $this->OP_140_CGST->LinkCustomAttributes = "";
        $this->OP_140_CGST->HrefValue = "";
        $this->OP_140_CGST->TooltipValue = "";

        // HosoID
        $this->HosoID->LinkCustomAttributes = "";
        $this->HosoID->HrefValue = "";
        $this->HosoID->TooltipValue = "";

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

        // BillDate
        $this->BillDate->EditAttrs["class"] = "form-control";
        $this->BillDate->EditCustomAttributes = "";
        $this->BillDate->EditValue = FormatDateTime($this->BillDate->CurrentValue, 8);
        $this->BillDate->PlaceHolder = RemoveHtml($this->BillDate->caption());

        // IP 2.5% SGST
        $this->IP_25_SGST->EditAttrs["class"] = "form-control";
        $this->IP_25_SGST->EditCustomAttributes = "";
        $this->IP_25_SGST->EditValue = $this->IP_25_SGST->CurrentValue;
        $this->IP_25_SGST->PlaceHolder = RemoveHtml($this->IP_25_SGST->caption());
        if (strval($this->IP_25_SGST->EditValue) != "" && is_numeric($this->IP_25_SGST->EditValue)) {
            $this->IP_25_SGST->EditValue = FormatNumber($this->IP_25_SGST->EditValue, -2, -2, -2, -2);
        }

        // IP 2.5% CGST
        $this->IP_25_CGST->EditAttrs["class"] = "form-control";
        $this->IP_25_CGST->EditCustomAttributes = "";
        $this->IP_25_CGST->EditValue = $this->IP_25_CGST->CurrentValue;
        $this->IP_25_CGST->PlaceHolder = RemoveHtml($this->IP_25_CGST->caption());
        if (strval($this->IP_25_CGST->EditValue) != "" && is_numeric($this->IP_25_CGST->EditValue)) {
            $this->IP_25_CGST->EditValue = FormatNumber($this->IP_25_CGST->EditValue, -2, -2, -2, -2);
        }

        // IP 6.0% SGST
        $this->IP_60_SGST->EditAttrs["class"] = "form-control";
        $this->IP_60_SGST->EditCustomAttributes = "";
        $this->IP_60_SGST->EditValue = $this->IP_60_SGST->CurrentValue;
        $this->IP_60_SGST->PlaceHolder = RemoveHtml($this->IP_60_SGST->caption());
        if (strval($this->IP_60_SGST->EditValue) != "" && is_numeric($this->IP_60_SGST->EditValue)) {
            $this->IP_60_SGST->EditValue = FormatNumber($this->IP_60_SGST->EditValue, -2, -2, -2, -2);
        }

        // IP 6.0% CGST
        $this->IP_60_CGST->EditAttrs["class"] = "form-control";
        $this->IP_60_CGST->EditCustomAttributes = "";
        $this->IP_60_CGST->EditValue = $this->IP_60_CGST->CurrentValue;
        $this->IP_60_CGST->PlaceHolder = RemoveHtml($this->IP_60_CGST->caption());
        if (strval($this->IP_60_CGST->EditValue) != "" && is_numeric($this->IP_60_CGST->EditValue)) {
            $this->IP_60_CGST->EditValue = FormatNumber($this->IP_60_CGST->EditValue, -2, -2, -2, -2);
        }

        // IP 9.0% SGST
        $this->IP_90_SGST->EditAttrs["class"] = "form-control";
        $this->IP_90_SGST->EditCustomAttributes = "";
        $this->IP_90_SGST->EditValue = $this->IP_90_SGST->CurrentValue;
        $this->IP_90_SGST->PlaceHolder = RemoveHtml($this->IP_90_SGST->caption());
        if (strval($this->IP_90_SGST->EditValue) != "" && is_numeric($this->IP_90_SGST->EditValue)) {
            $this->IP_90_SGST->EditValue = FormatNumber($this->IP_90_SGST->EditValue, -2, -2, -2, -2);
        }

        // IP 9.0% CGST
        $this->IP_90_CGST->EditAttrs["class"] = "form-control";
        $this->IP_90_CGST->EditCustomAttributes = "";
        $this->IP_90_CGST->EditValue = $this->IP_90_CGST->CurrentValue;
        $this->IP_90_CGST->PlaceHolder = RemoveHtml($this->IP_90_CGST->caption());
        if (strval($this->IP_90_CGST->EditValue) != "" && is_numeric($this->IP_90_CGST->EditValue)) {
            $this->IP_90_CGST->EditValue = FormatNumber($this->IP_90_CGST->EditValue, -2, -2, -2, -2);
        }

        // IP 14.0% SGST
        $this->IP_140_SGST->EditAttrs["class"] = "form-control";
        $this->IP_140_SGST->EditCustomAttributes = "";
        $this->IP_140_SGST->EditValue = $this->IP_140_SGST->CurrentValue;
        $this->IP_140_SGST->PlaceHolder = RemoveHtml($this->IP_140_SGST->caption());
        if (strval($this->IP_140_SGST->EditValue) != "" && is_numeric($this->IP_140_SGST->EditValue)) {
            $this->IP_140_SGST->EditValue = FormatNumber($this->IP_140_SGST->EditValue, -2, -2, -2, -2);
        }

        // IP 14.0% CGST
        $this->IP_140_CGST->EditAttrs["class"] = "form-control";
        $this->IP_140_CGST->EditCustomAttributes = "";
        $this->IP_140_CGST->EditValue = $this->IP_140_CGST->CurrentValue;
        $this->IP_140_CGST->PlaceHolder = RemoveHtml($this->IP_140_CGST->caption());
        if (strval($this->IP_140_CGST->EditValue) != "" && is_numeric($this->IP_140_CGST->EditValue)) {
            $this->IP_140_CGST->EditValue = FormatNumber($this->IP_140_CGST->EditValue, -2, -2, -2, -2);
        }

        // OP 2.5% SGST
        $this->OP_25_SGST->EditAttrs["class"] = "form-control";
        $this->OP_25_SGST->EditCustomAttributes = "";
        $this->OP_25_SGST->EditValue = $this->OP_25_SGST->CurrentValue;
        $this->OP_25_SGST->PlaceHolder = RemoveHtml($this->OP_25_SGST->caption());
        if (strval($this->OP_25_SGST->EditValue) != "" && is_numeric($this->OP_25_SGST->EditValue)) {
            $this->OP_25_SGST->EditValue = FormatNumber($this->OP_25_SGST->EditValue, -2, -2, -2, -2);
        }

        // OP 2.5% CGST
        $this->OP_25_CGST->EditAttrs["class"] = "form-control";
        $this->OP_25_CGST->EditCustomAttributes = "";
        $this->OP_25_CGST->EditValue = $this->OP_25_CGST->CurrentValue;
        $this->OP_25_CGST->PlaceHolder = RemoveHtml($this->OP_25_CGST->caption());
        if (strval($this->OP_25_CGST->EditValue) != "" && is_numeric($this->OP_25_CGST->EditValue)) {
            $this->OP_25_CGST->EditValue = FormatNumber($this->OP_25_CGST->EditValue, -2, -2, -2, -2);
        }

        // OP 6.0% SGST
        $this->OP_60_SGST->EditAttrs["class"] = "form-control";
        $this->OP_60_SGST->EditCustomAttributes = "";
        $this->OP_60_SGST->EditValue = $this->OP_60_SGST->CurrentValue;
        $this->OP_60_SGST->PlaceHolder = RemoveHtml($this->OP_60_SGST->caption());
        if (strval($this->OP_60_SGST->EditValue) != "" && is_numeric($this->OP_60_SGST->EditValue)) {
            $this->OP_60_SGST->EditValue = FormatNumber($this->OP_60_SGST->EditValue, -2, -2, -2, -2);
        }

        // OP 6.0% CGST
        $this->OP_60_CGST->EditAttrs["class"] = "form-control";
        $this->OP_60_CGST->EditCustomAttributes = "";
        $this->OP_60_CGST->EditValue = $this->OP_60_CGST->CurrentValue;
        $this->OP_60_CGST->PlaceHolder = RemoveHtml($this->OP_60_CGST->caption());
        if (strval($this->OP_60_CGST->EditValue) != "" && is_numeric($this->OP_60_CGST->EditValue)) {
            $this->OP_60_CGST->EditValue = FormatNumber($this->OP_60_CGST->EditValue, -2, -2, -2, -2);
        }

        // OP 9.0% SGST
        $this->OP_90_SGST->EditAttrs["class"] = "form-control";
        $this->OP_90_SGST->EditCustomAttributes = "";
        $this->OP_90_SGST->EditValue = $this->OP_90_SGST->CurrentValue;
        $this->OP_90_SGST->PlaceHolder = RemoveHtml($this->OP_90_SGST->caption());
        if (strval($this->OP_90_SGST->EditValue) != "" && is_numeric($this->OP_90_SGST->EditValue)) {
            $this->OP_90_SGST->EditValue = FormatNumber($this->OP_90_SGST->EditValue, -2, -2, -2, -2);
        }

        // OP 9.0% CGST
        $this->OP_90_CGST->EditAttrs["class"] = "form-control";
        $this->OP_90_CGST->EditCustomAttributes = "";
        $this->OP_90_CGST->EditValue = $this->OP_90_CGST->CurrentValue;
        $this->OP_90_CGST->PlaceHolder = RemoveHtml($this->OP_90_CGST->caption());
        if (strval($this->OP_90_CGST->EditValue) != "" && is_numeric($this->OP_90_CGST->EditValue)) {
            $this->OP_90_CGST->EditValue = FormatNumber($this->OP_90_CGST->EditValue, -2, -2, -2, -2);
        }

        // OP 14.0% SGST
        $this->OP_140_SGST->EditAttrs["class"] = "form-control";
        $this->OP_140_SGST->EditCustomAttributes = "";
        $this->OP_140_SGST->EditValue = $this->OP_140_SGST->CurrentValue;
        $this->OP_140_SGST->PlaceHolder = RemoveHtml($this->OP_140_SGST->caption());
        if (strval($this->OP_140_SGST->EditValue) != "" && is_numeric($this->OP_140_SGST->EditValue)) {
            $this->OP_140_SGST->EditValue = FormatNumber($this->OP_140_SGST->EditValue, -2, -2, -2, -2);
        }

        // OP 14.0% CGST
        $this->OP_140_CGST->EditAttrs["class"] = "form-control";
        $this->OP_140_CGST->EditCustomAttributes = "";
        $this->OP_140_CGST->EditValue = $this->OP_140_CGST->CurrentValue;
        $this->OP_140_CGST->PlaceHolder = RemoveHtml($this->OP_140_CGST->caption());
        if (strval($this->OP_140_CGST->EditValue) != "" && is_numeric($this->OP_140_CGST->EditValue)) {
            $this->OP_140_CGST->EditValue = FormatNumber($this->OP_140_CGST->EditValue, -2, -2, -2, -2);
        }

        // HosoID
        $this->HosoID->EditAttrs["class"] = "form-control";
        $this->HosoID->EditCustomAttributes = "";
        $this->HosoID->EditValue = $this->HosoID->CurrentValue;
        $this->HosoID->PlaceHolder = RemoveHtml($this->HosoID->caption());

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
                    $doc->exportCaption($this->BillDate);
                    $doc->exportCaption($this->IP_25_SGST);
                    $doc->exportCaption($this->IP_25_CGST);
                    $doc->exportCaption($this->IP_60_SGST);
                    $doc->exportCaption($this->IP_60_CGST);
                    $doc->exportCaption($this->IP_90_SGST);
                    $doc->exportCaption($this->IP_90_CGST);
                    $doc->exportCaption($this->IP_140_SGST);
                    $doc->exportCaption($this->IP_140_CGST);
                    $doc->exportCaption($this->OP_25_SGST);
                    $doc->exportCaption($this->OP_25_CGST);
                    $doc->exportCaption($this->OP_60_SGST);
                    $doc->exportCaption($this->OP_60_CGST);
                    $doc->exportCaption($this->OP_90_SGST);
                    $doc->exportCaption($this->OP_90_CGST);
                    $doc->exportCaption($this->OP_140_SGST);
                    $doc->exportCaption($this->OP_140_CGST);
                    $doc->exportCaption($this->HosoID);
                } else {
                    $doc->exportCaption($this->BillDate);
                    $doc->exportCaption($this->IP_25_SGST);
                    $doc->exportCaption($this->IP_25_CGST);
                    $doc->exportCaption($this->IP_60_SGST);
                    $doc->exportCaption($this->IP_60_CGST);
                    $doc->exportCaption($this->IP_90_SGST);
                    $doc->exportCaption($this->IP_90_CGST);
                    $doc->exportCaption($this->IP_140_SGST);
                    $doc->exportCaption($this->IP_140_CGST);
                    $doc->exportCaption($this->OP_25_SGST);
                    $doc->exportCaption($this->OP_25_CGST);
                    $doc->exportCaption($this->OP_60_SGST);
                    $doc->exportCaption($this->OP_60_CGST);
                    $doc->exportCaption($this->OP_90_SGST);
                    $doc->exportCaption($this->OP_90_CGST);
                    $doc->exportCaption($this->OP_140_SGST);
                    $doc->exportCaption($this->OP_140_CGST);
                    $doc->exportCaption($this->HosoID);
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
                        $doc->exportField($this->BillDate);
                        $doc->exportField($this->IP_25_SGST);
                        $doc->exportField($this->IP_25_CGST);
                        $doc->exportField($this->IP_60_SGST);
                        $doc->exportField($this->IP_60_CGST);
                        $doc->exportField($this->IP_90_SGST);
                        $doc->exportField($this->IP_90_CGST);
                        $doc->exportField($this->IP_140_SGST);
                        $doc->exportField($this->IP_140_CGST);
                        $doc->exportField($this->OP_25_SGST);
                        $doc->exportField($this->OP_25_CGST);
                        $doc->exportField($this->OP_60_SGST);
                        $doc->exportField($this->OP_60_CGST);
                        $doc->exportField($this->OP_90_SGST);
                        $doc->exportField($this->OP_90_CGST);
                        $doc->exportField($this->OP_140_SGST);
                        $doc->exportField($this->OP_140_CGST);
                        $doc->exportField($this->HosoID);
                    } else {
                        $doc->exportField($this->BillDate);
                        $doc->exportField($this->IP_25_SGST);
                        $doc->exportField($this->IP_25_CGST);
                        $doc->exportField($this->IP_60_SGST);
                        $doc->exportField($this->IP_60_CGST);
                        $doc->exportField($this->IP_90_SGST);
                        $doc->exportField($this->IP_90_CGST);
                        $doc->exportField($this->IP_140_SGST);
                        $doc->exportField($this->IP_140_CGST);
                        $doc->exportField($this->OP_25_SGST);
                        $doc->exportField($this->OP_25_CGST);
                        $doc->exportField($this->OP_60_SGST);
                        $doc->exportField($this->OP_60_CGST);
                        $doc->exportField($this->OP_90_SGST);
                        $doc->exportField($this->OP_90_CGST);
                        $doc->exportField($this->OP_140_SGST);
                        $doc->exportField($this->OP_140_CGST);
                        $doc->exportField($this->HosoID);
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
