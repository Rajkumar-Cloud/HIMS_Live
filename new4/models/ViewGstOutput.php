<?php

namespace PHPMaker2021\HIMS;

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

    // Column CSS classes
    public $LeftColumnClass = "col-sm-2 col-form-label ew-label";
    public $RightColumnClass = "col-sm-10";
    public $OffsetColumnClass = "col-sm-10 offset-sm-2";
    public $TableLeftColumnClass = "w-col-2";

    // Export
    public $ExportDoc;

    // Fields
    public $BillDate;
    public $IP25SGST;
    public $IP25CGST;
    public $IP60SGST;
    public $IP60CGST;
    public $IP90SGST;
    public $IP90CGST;
    public $IP140SGST;
    public $IP140CGST;
    public $OP25SGST;
    public $OP25CGST;
    public $OP60SGST;
    public $OP60CGST;
    public $OP90SGST;
    public $OP90CGST;
    public $OP140SGST;
    public $OP140CGST;
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
        $this->BillDate = new DbField('view_gst_output', 'view_gst_output', 'x_BillDate', 'BillDate', '`BillDate`', CastDateFieldForLike("`BillDate`", 7, "DB"), 133, 10, 7, false, '`BillDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BillDate->Sortable = true; // Allow sort
        $this->BillDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->BillDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BillDate->Param, "CustomMsg");
        $this->Fields['BillDate'] = &$this->BillDate;

        // IP 2.5% SGST
        $this->IP25SGST = new DbField('view_gst_output', 'view_gst_output', 'x_IP25SGST', 'IP 2.5% SGST', '`IP 2.5% SGST`', '`IP 2.5% SGST`', 131, 54, -1, false, '`IP 2.5% SGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IP25SGST->Sortable = true; // Allow sort
        $this->IP25SGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->IP25SGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->IP25SGST->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IP25SGST->Param, "CustomMsg");
        $this->Fields['IP 2.5% SGST'] = &$this->IP25SGST;

        // IP 2.5% CGST
        $this->IP25CGST = new DbField('view_gst_output', 'view_gst_output', 'x_IP25CGST', 'IP 2.5% CGST', '`IP 2.5% CGST`', '`IP 2.5% CGST`', 131, 54, -1, false, '`IP 2.5% CGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IP25CGST->Sortable = true; // Allow sort
        $this->IP25CGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->IP25CGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->IP25CGST->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IP25CGST->Param, "CustomMsg");
        $this->Fields['IP 2.5% CGST'] = &$this->IP25CGST;

        // IP 6.0% SGST
        $this->IP60SGST = new DbField('view_gst_output', 'view_gst_output', 'x_IP60SGST', 'IP 6.0% SGST', '`IP 6.0% SGST`', '`IP 6.0% SGST`', 131, 54, -1, false, '`IP 6.0% SGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IP60SGST->Sortable = true; // Allow sort
        $this->IP60SGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->IP60SGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->IP60SGST->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IP60SGST->Param, "CustomMsg");
        $this->Fields['IP 6.0% SGST'] = &$this->IP60SGST;

        // IP 6.0% CGST
        $this->IP60CGST = new DbField('view_gst_output', 'view_gst_output', 'x_IP60CGST', 'IP 6.0% CGST', '`IP 6.0% CGST`', '`IP 6.0% CGST`', 131, 54, -1, false, '`IP 6.0% CGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IP60CGST->Sortable = true; // Allow sort
        $this->IP60CGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->IP60CGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->IP60CGST->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IP60CGST->Param, "CustomMsg");
        $this->Fields['IP 6.0% CGST'] = &$this->IP60CGST;

        // IP 9.0% SGST
        $this->IP90SGST = new DbField('view_gst_output', 'view_gst_output', 'x_IP90SGST', 'IP 9.0% SGST', '`IP 9.0% SGST`', '`IP 9.0% SGST`', 131, 54, -1, false, '`IP 9.0% SGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IP90SGST->Sortable = true; // Allow sort
        $this->IP90SGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->IP90SGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->IP90SGST->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IP90SGST->Param, "CustomMsg");
        $this->Fields['IP 9.0% SGST'] = &$this->IP90SGST;

        // IP 9.0% CGST
        $this->IP90CGST = new DbField('view_gst_output', 'view_gst_output', 'x_IP90CGST', 'IP 9.0% CGST', '`IP 9.0% CGST`', '`IP 9.0% CGST`', 131, 54, -1, false, '`IP 9.0% CGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IP90CGST->Sortable = true; // Allow sort
        $this->IP90CGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->IP90CGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->IP90CGST->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IP90CGST->Param, "CustomMsg");
        $this->Fields['IP 9.0% CGST'] = &$this->IP90CGST;

        // IP 14.0% SGST
        $this->IP140SGST = new DbField('view_gst_output', 'view_gst_output', 'x_IP140SGST', 'IP 14.0% SGST', '`IP 14.0% SGST`', '`IP 14.0% SGST`', 131, 54, -1, false, '`IP 14.0% SGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IP140SGST->Sortable = true; // Allow sort
        $this->IP140SGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->IP140SGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->IP140SGST->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IP140SGST->Param, "CustomMsg");
        $this->Fields['IP 14.0% SGST'] = &$this->IP140SGST;

        // IP 14.0% CGST
        $this->IP140CGST = new DbField('view_gst_output', 'view_gst_output', 'x_IP140CGST', 'IP 14.0% CGST', '`IP 14.0% CGST`', '`IP 14.0% CGST`', 131, 54, -1, false, '`IP 14.0% CGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IP140CGST->Sortable = true; // Allow sort
        $this->IP140CGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->IP140CGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->IP140CGST->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IP140CGST->Param, "CustomMsg");
        $this->Fields['IP 14.0% CGST'] = &$this->IP140CGST;

        // OP 2.5% SGST
        $this->OP25SGST = new DbField('view_gst_output', 'view_gst_output', 'x_OP25SGST', 'OP 2.5% SGST', '`OP 2.5% SGST`', '`OP 2.5% SGST`', 131, 47, -1, false, '`OP 2.5% SGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OP25SGST->Sortable = true; // Allow sort
        $this->OP25SGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OP25SGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->OP25SGST->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OP25SGST->Param, "CustomMsg");
        $this->Fields['OP 2.5% SGST'] = &$this->OP25SGST;

        // OP 2.5% CGST
        $this->OP25CGST = new DbField('view_gst_output', 'view_gst_output', 'x_OP25CGST', 'OP 2.5% CGST', '`OP 2.5% CGST`', '`OP 2.5% CGST`', 131, 47, -1, false, '`OP 2.5% CGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OP25CGST->Sortable = true; // Allow sort
        $this->OP25CGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OP25CGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->OP25CGST->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OP25CGST->Param, "CustomMsg");
        $this->Fields['OP 2.5% CGST'] = &$this->OP25CGST;

        // OP 6.0% SGST
        $this->OP60SGST = new DbField('view_gst_output', 'view_gst_output', 'x_OP60SGST', 'OP 6.0% SGST', '`OP 6.0% SGST`', '`OP 6.0% SGST`', 131, 47, -1, false, '`OP 6.0% SGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OP60SGST->Sortable = true; // Allow sort
        $this->OP60SGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OP60SGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->OP60SGST->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OP60SGST->Param, "CustomMsg");
        $this->Fields['OP 6.0% SGST'] = &$this->OP60SGST;

        // OP 6.0% CGST
        $this->OP60CGST = new DbField('view_gst_output', 'view_gst_output', 'x_OP60CGST', 'OP 6.0% CGST', '`OP 6.0% CGST`', '`OP 6.0% CGST`', 131, 47, -1, false, '`OP 6.0% CGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OP60CGST->Sortable = true; // Allow sort
        $this->OP60CGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OP60CGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->OP60CGST->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OP60CGST->Param, "CustomMsg");
        $this->Fields['OP 6.0% CGST'] = &$this->OP60CGST;

        // OP 9.0% SGST
        $this->OP90SGST = new DbField('view_gst_output', 'view_gst_output', 'x_OP90SGST', 'OP 9.0% SGST', '`OP 9.0% SGST`', '`OP 9.0% SGST`', 131, 47, -1, false, '`OP 9.0% SGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OP90SGST->Sortable = true; // Allow sort
        $this->OP90SGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OP90SGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->OP90SGST->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OP90SGST->Param, "CustomMsg");
        $this->Fields['OP 9.0% SGST'] = &$this->OP90SGST;

        // OP 9.0% CGST
        $this->OP90CGST = new DbField('view_gst_output', 'view_gst_output', 'x_OP90CGST', 'OP 9.0% CGST', '`OP 9.0% CGST`', '`OP 9.0% CGST`', 131, 47, -1, false, '`OP 9.0% CGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OP90CGST->Sortable = true; // Allow sort
        $this->OP90CGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OP90CGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->OP90CGST->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OP90CGST->Param, "CustomMsg");
        $this->Fields['OP 9.0% CGST'] = &$this->OP90CGST;

        // OP 14.0% SGST
        $this->OP140SGST = new DbField('view_gst_output', 'view_gst_output', 'x_OP140SGST', 'OP 14.0% SGST', '`OP 14.0% SGST`', '`OP 14.0% SGST`', 131, 47, -1, false, '`OP 14.0% SGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OP140SGST->Sortable = true; // Allow sort
        $this->OP140SGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OP140SGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->OP140SGST->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OP140SGST->Param, "CustomMsg");
        $this->Fields['OP 14.0% SGST'] = &$this->OP140SGST;

        // OP 14.0% CGST
        $this->OP140CGST = new DbField('view_gst_output', 'view_gst_output', 'x_OP140CGST', 'OP 14.0% CGST', '`OP 14.0% CGST`', '`OP 14.0% CGST`', 131, 47, -1, false, '`OP 14.0% CGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OP140CGST->Sortable = true; // Allow sort
        $this->OP140CGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OP140CGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->OP140CGST->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OP140CGST->Param, "CustomMsg");
        $this->Fields['OP 14.0% CGST'] = &$this->OP140CGST;

        // HosoID
        $this->HosoID = new DbField('view_gst_output', 'view_gst_output', 'x_HosoID', 'HosoID', '`HosoID`', '`HosoID`', 3, 11, -1, false, '`HosoID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HosoID->Sortable = true; // Allow sort
        $this->HosoID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->HosoID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HosoID->Param, "CustomMsg");
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
        $this->DefaultFilter = "`HosoID`='".HospitalID()."'";
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
        $this->BillDate->DbValue = $row['BillDate'];
        $this->IP25SGST->DbValue = $row['IP 2.5% SGST'];
        $this->IP25CGST->DbValue = $row['IP 2.5% CGST'];
        $this->IP60SGST->DbValue = $row['IP 6.0% SGST'];
        $this->IP60CGST->DbValue = $row['IP 6.0% CGST'];
        $this->IP90SGST->DbValue = $row['IP 9.0% SGST'];
        $this->IP90CGST->DbValue = $row['IP 9.0% CGST'];
        $this->IP140SGST->DbValue = $row['IP 14.0% SGST'];
        $this->IP140CGST->DbValue = $row['IP 14.0% CGST'];
        $this->OP25SGST->DbValue = $row['OP 2.5% SGST'];
        $this->OP25CGST->DbValue = $row['OP 2.5% CGST'];
        $this->OP60SGST->DbValue = $row['OP 6.0% SGST'];
        $this->OP60CGST->DbValue = $row['OP 6.0% CGST'];
        $this->OP90SGST->DbValue = $row['OP 9.0% SGST'];
        $this->OP90CGST->DbValue = $row['OP 9.0% CGST'];
        $this->OP140SGST->DbValue = $row['OP 14.0% SGST'];
        $this->OP140CGST->DbValue = $row['OP 14.0% CGST'];
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
        return $_SESSION[$name] ?? GetUrl("ViewGstOutputList");
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

    // API page name
    public function getApiPageName($action)
    {
        switch (strtolower($action)) {
            case Config("API_VIEW_ACTION"):
                return "ViewGstOutputView";
            case Config("API_ADD_ACTION"):
                return "ViewGstOutputAdd";
            case Config("API_EDIT_ACTION"):
                return "ViewGstOutputEdit";
            case Config("API_DELETE_ACTION"):
                return "ViewGstOutputDelete";
            case Config("API_LIST_ACTION"):
                return "ViewGstOutputList";
            default:
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
        $this->IP25SGST->setDbValue($row['IP 2.5% SGST']);
        $this->IP25CGST->setDbValue($row['IP 2.5% CGST']);
        $this->IP60SGST->setDbValue($row['IP 6.0% SGST']);
        $this->IP60CGST->setDbValue($row['IP 6.0% CGST']);
        $this->IP90SGST->setDbValue($row['IP 9.0% SGST']);
        $this->IP90CGST->setDbValue($row['IP 9.0% CGST']);
        $this->IP140SGST->setDbValue($row['IP 14.0% SGST']);
        $this->IP140CGST->setDbValue($row['IP 14.0% CGST']);
        $this->OP25SGST->setDbValue($row['OP 2.5% SGST']);
        $this->OP25CGST->setDbValue($row['OP 2.5% CGST']);
        $this->OP60SGST->setDbValue($row['OP 6.0% SGST']);
        $this->OP60CGST->setDbValue($row['OP 6.0% CGST']);
        $this->OP90SGST->setDbValue($row['OP 9.0% SGST']);
        $this->OP90CGST->setDbValue($row['OP 9.0% CGST']);
        $this->OP140SGST->setDbValue($row['OP 14.0% SGST']);
        $this->OP140CGST->setDbValue($row['OP 14.0% CGST']);
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
        $this->BillDate->ViewValue = FormatDateTime($this->BillDate->ViewValue, 7);
        $this->BillDate->ViewCustomAttributes = "";

        // IP 2.5% SGST
        $this->IP25SGST->ViewValue = $this->IP25SGST->CurrentValue;
        $this->IP25SGST->ViewValue = FormatNumber($this->IP25SGST->ViewValue, 2, -2, -2, -2);
        $this->IP25SGST->ViewCustomAttributes = "";

        // IP 2.5% CGST
        $this->IP25CGST->ViewValue = $this->IP25CGST->CurrentValue;
        $this->IP25CGST->ViewValue = FormatNumber($this->IP25CGST->ViewValue, 2, -2, -2, -2);
        $this->IP25CGST->ViewCustomAttributes = "";

        // IP 6.0% SGST
        $this->IP60SGST->ViewValue = $this->IP60SGST->CurrentValue;
        $this->IP60SGST->ViewValue = FormatNumber($this->IP60SGST->ViewValue, 2, -2, -2, -2);
        $this->IP60SGST->ViewCustomAttributes = "";

        // IP 6.0% CGST
        $this->IP60CGST->ViewValue = $this->IP60CGST->CurrentValue;
        $this->IP60CGST->ViewValue = FormatNumber($this->IP60CGST->ViewValue, 2, -2, -2, -2);
        $this->IP60CGST->ViewCustomAttributes = "";

        // IP 9.0% SGST
        $this->IP90SGST->ViewValue = $this->IP90SGST->CurrentValue;
        $this->IP90SGST->ViewValue = FormatNumber($this->IP90SGST->ViewValue, 2, -2, -2, -2);
        $this->IP90SGST->ViewCustomAttributes = "";

        // IP 9.0% CGST
        $this->IP90CGST->ViewValue = $this->IP90CGST->CurrentValue;
        $this->IP90CGST->ViewValue = FormatNumber($this->IP90CGST->ViewValue, 2, -2, -2, -2);
        $this->IP90CGST->ViewCustomAttributes = "";

        // IP 14.0% SGST
        $this->IP140SGST->ViewValue = $this->IP140SGST->CurrentValue;
        $this->IP140SGST->ViewValue = FormatNumber($this->IP140SGST->ViewValue, 2, -2, -2, -2);
        $this->IP140SGST->ViewCustomAttributes = "";

        // IP 14.0% CGST
        $this->IP140CGST->ViewValue = $this->IP140CGST->CurrentValue;
        $this->IP140CGST->ViewValue = FormatNumber($this->IP140CGST->ViewValue, 2, -2, -2, -2);
        $this->IP140CGST->ViewCustomAttributes = "";

        // OP 2.5% SGST
        $this->OP25SGST->ViewValue = $this->OP25SGST->CurrentValue;
        $this->OP25SGST->ViewValue = FormatNumber($this->OP25SGST->ViewValue, 2, -2, -2, -2);
        $this->OP25SGST->ViewCustomAttributes = "";

        // OP 2.5% CGST
        $this->OP25CGST->ViewValue = $this->OP25CGST->CurrentValue;
        $this->OP25CGST->ViewValue = FormatNumber($this->OP25CGST->ViewValue, 2, -2, -2, -2);
        $this->OP25CGST->ViewCustomAttributes = "";

        // OP 6.0% SGST
        $this->OP60SGST->ViewValue = $this->OP60SGST->CurrentValue;
        $this->OP60SGST->ViewValue = FormatNumber($this->OP60SGST->ViewValue, 2, -2, -2, -2);
        $this->OP60SGST->ViewCustomAttributes = "";

        // OP 6.0% CGST
        $this->OP60CGST->ViewValue = $this->OP60CGST->CurrentValue;
        $this->OP60CGST->ViewValue = FormatNumber($this->OP60CGST->ViewValue, 2, -2, -2, -2);
        $this->OP60CGST->ViewCustomAttributes = "";

        // OP 9.0% SGST
        $this->OP90SGST->ViewValue = $this->OP90SGST->CurrentValue;
        $this->OP90SGST->ViewValue = FormatNumber($this->OP90SGST->ViewValue, 2, -2, -2, -2);
        $this->OP90SGST->ViewCustomAttributes = "";

        // OP 9.0% CGST
        $this->OP90CGST->ViewValue = $this->OP90CGST->CurrentValue;
        $this->OP90CGST->ViewValue = FormatNumber($this->OP90CGST->ViewValue, 2, -2, -2, -2);
        $this->OP90CGST->ViewCustomAttributes = "";

        // OP 14.0% SGST
        $this->OP140SGST->ViewValue = $this->OP140SGST->CurrentValue;
        $this->OP140SGST->ViewValue = FormatNumber($this->OP140SGST->ViewValue, 2, -2, -2, -2);
        $this->OP140SGST->ViewCustomAttributes = "";

        // OP 14.0% CGST
        $this->OP140CGST->ViewValue = $this->OP140CGST->CurrentValue;
        $this->OP140CGST->ViewValue = FormatNumber($this->OP140CGST->ViewValue, 2, -2, -2, -2);
        $this->OP140CGST->ViewCustomAttributes = "";

        // HosoID
        $this->HosoID->ViewValue = $this->HosoID->CurrentValue;
        $this->HosoID->ViewValue = FormatNumber($this->HosoID->ViewValue, 0, -2, -2, -2);
        $this->HosoID->ViewCustomAttributes = "";

        // BillDate
        $this->BillDate->LinkCustomAttributes = "";
        $this->BillDate->HrefValue = "";
        $this->BillDate->TooltipValue = "";

        // IP 2.5% SGST
        $this->IP25SGST->LinkCustomAttributes = "";
        $this->IP25SGST->HrefValue = "";
        $this->IP25SGST->TooltipValue = "";

        // IP 2.5% CGST
        $this->IP25CGST->LinkCustomAttributes = "";
        $this->IP25CGST->HrefValue = "";
        $this->IP25CGST->TooltipValue = "";

        // IP 6.0% SGST
        $this->IP60SGST->LinkCustomAttributes = "";
        $this->IP60SGST->HrefValue = "";
        $this->IP60SGST->TooltipValue = "";

        // IP 6.0% CGST
        $this->IP60CGST->LinkCustomAttributes = "";
        $this->IP60CGST->HrefValue = "";
        $this->IP60CGST->TooltipValue = "";

        // IP 9.0% SGST
        $this->IP90SGST->LinkCustomAttributes = "";
        $this->IP90SGST->HrefValue = "";
        $this->IP90SGST->TooltipValue = "";

        // IP 9.0% CGST
        $this->IP90CGST->LinkCustomAttributes = "";
        $this->IP90CGST->HrefValue = "";
        $this->IP90CGST->TooltipValue = "";

        // IP 14.0% SGST
        $this->IP140SGST->LinkCustomAttributes = "";
        $this->IP140SGST->HrefValue = "";
        $this->IP140SGST->TooltipValue = "";

        // IP 14.0% CGST
        $this->IP140CGST->LinkCustomAttributes = "";
        $this->IP140CGST->HrefValue = "";
        $this->IP140CGST->TooltipValue = "";

        // OP 2.5% SGST
        $this->OP25SGST->LinkCustomAttributes = "";
        $this->OP25SGST->HrefValue = "";
        $this->OP25SGST->TooltipValue = "";

        // OP 2.5% CGST
        $this->OP25CGST->LinkCustomAttributes = "";
        $this->OP25CGST->HrefValue = "";
        $this->OP25CGST->TooltipValue = "";

        // OP 6.0% SGST
        $this->OP60SGST->LinkCustomAttributes = "";
        $this->OP60SGST->HrefValue = "";
        $this->OP60SGST->TooltipValue = "";

        // OP 6.0% CGST
        $this->OP60CGST->LinkCustomAttributes = "";
        $this->OP60CGST->HrefValue = "";
        $this->OP60CGST->TooltipValue = "";

        // OP 9.0% SGST
        $this->OP90SGST->LinkCustomAttributes = "";
        $this->OP90SGST->HrefValue = "";
        $this->OP90SGST->TooltipValue = "";

        // OP 9.0% CGST
        $this->OP90CGST->LinkCustomAttributes = "";
        $this->OP90CGST->HrefValue = "";
        $this->OP90CGST->TooltipValue = "";

        // OP 14.0% SGST
        $this->OP140SGST->LinkCustomAttributes = "";
        $this->OP140SGST->HrefValue = "";
        $this->OP140SGST->TooltipValue = "";

        // OP 14.0% CGST
        $this->OP140CGST->LinkCustomAttributes = "";
        $this->OP140CGST->HrefValue = "";
        $this->OP140CGST->TooltipValue = "";

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
        $this->BillDate->EditValue = FormatDateTime($this->BillDate->CurrentValue, 7);
        $this->BillDate->PlaceHolder = RemoveHtml($this->BillDate->caption());

        // IP 2.5% SGST
        $this->IP25SGST->EditAttrs["class"] = "form-control";
        $this->IP25SGST->EditCustomAttributes = "";
        $this->IP25SGST->EditValue = $this->IP25SGST->CurrentValue;
        $this->IP25SGST->PlaceHolder = RemoveHtml($this->IP25SGST->caption());
        if (strval($this->IP25SGST->EditValue) != "" && is_numeric($this->IP25SGST->EditValue)) {
            $this->IP25SGST->EditValue = FormatNumber($this->IP25SGST->EditValue, -2, -2, -2, -2);
        }

        // IP 2.5% CGST
        $this->IP25CGST->EditAttrs["class"] = "form-control";
        $this->IP25CGST->EditCustomAttributes = "";
        $this->IP25CGST->EditValue = $this->IP25CGST->CurrentValue;
        $this->IP25CGST->PlaceHolder = RemoveHtml($this->IP25CGST->caption());
        if (strval($this->IP25CGST->EditValue) != "" && is_numeric($this->IP25CGST->EditValue)) {
            $this->IP25CGST->EditValue = FormatNumber($this->IP25CGST->EditValue, -2, -2, -2, -2);
        }

        // IP 6.0% SGST
        $this->IP60SGST->EditAttrs["class"] = "form-control";
        $this->IP60SGST->EditCustomAttributes = "";
        $this->IP60SGST->EditValue = $this->IP60SGST->CurrentValue;
        $this->IP60SGST->PlaceHolder = RemoveHtml($this->IP60SGST->caption());
        if (strval($this->IP60SGST->EditValue) != "" && is_numeric($this->IP60SGST->EditValue)) {
            $this->IP60SGST->EditValue = FormatNumber($this->IP60SGST->EditValue, -2, -2, -2, -2);
        }

        // IP 6.0% CGST
        $this->IP60CGST->EditAttrs["class"] = "form-control";
        $this->IP60CGST->EditCustomAttributes = "";
        $this->IP60CGST->EditValue = $this->IP60CGST->CurrentValue;
        $this->IP60CGST->PlaceHolder = RemoveHtml($this->IP60CGST->caption());
        if (strval($this->IP60CGST->EditValue) != "" && is_numeric($this->IP60CGST->EditValue)) {
            $this->IP60CGST->EditValue = FormatNumber($this->IP60CGST->EditValue, -2, -2, -2, -2);
        }

        // IP 9.0% SGST
        $this->IP90SGST->EditAttrs["class"] = "form-control";
        $this->IP90SGST->EditCustomAttributes = "";
        $this->IP90SGST->EditValue = $this->IP90SGST->CurrentValue;
        $this->IP90SGST->PlaceHolder = RemoveHtml($this->IP90SGST->caption());
        if (strval($this->IP90SGST->EditValue) != "" && is_numeric($this->IP90SGST->EditValue)) {
            $this->IP90SGST->EditValue = FormatNumber($this->IP90SGST->EditValue, -2, -2, -2, -2);
        }

        // IP 9.0% CGST
        $this->IP90CGST->EditAttrs["class"] = "form-control";
        $this->IP90CGST->EditCustomAttributes = "";
        $this->IP90CGST->EditValue = $this->IP90CGST->CurrentValue;
        $this->IP90CGST->PlaceHolder = RemoveHtml($this->IP90CGST->caption());
        if (strval($this->IP90CGST->EditValue) != "" && is_numeric($this->IP90CGST->EditValue)) {
            $this->IP90CGST->EditValue = FormatNumber($this->IP90CGST->EditValue, -2, -2, -2, -2);
        }

        // IP 14.0% SGST
        $this->IP140SGST->EditAttrs["class"] = "form-control";
        $this->IP140SGST->EditCustomAttributes = "";
        $this->IP140SGST->EditValue = $this->IP140SGST->CurrentValue;
        $this->IP140SGST->PlaceHolder = RemoveHtml($this->IP140SGST->caption());
        if (strval($this->IP140SGST->EditValue) != "" && is_numeric($this->IP140SGST->EditValue)) {
            $this->IP140SGST->EditValue = FormatNumber($this->IP140SGST->EditValue, -2, -2, -2, -2);
        }

        // IP 14.0% CGST
        $this->IP140CGST->EditAttrs["class"] = "form-control";
        $this->IP140CGST->EditCustomAttributes = "";
        $this->IP140CGST->EditValue = $this->IP140CGST->CurrentValue;
        $this->IP140CGST->PlaceHolder = RemoveHtml($this->IP140CGST->caption());
        if (strval($this->IP140CGST->EditValue) != "" && is_numeric($this->IP140CGST->EditValue)) {
            $this->IP140CGST->EditValue = FormatNumber($this->IP140CGST->EditValue, -2, -2, -2, -2);
        }

        // OP 2.5% SGST
        $this->OP25SGST->EditAttrs["class"] = "form-control";
        $this->OP25SGST->EditCustomAttributes = "";
        $this->OP25SGST->EditValue = $this->OP25SGST->CurrentValue;
        $this->OP25SGST->PlaceHolder = RemoveHtml($this->OP25SGST->caption());
        if (strval($this->OP25SGST->EditValue) != "" && is_numeric($this->OP25SGST->EditValue)) {
            $this->OP25SGST->EditValue = FormatNumber($this->OP25SGST->EditValue, -2, -2, -2, -2);
        }

        // OP 2.5% CGST
        $this->OP25CGST->EditAttrs["class"] = "form-control";
        $this->OP25CGST->EditCustomAttributes = "";
        $this->OP25CGST->EditValue = $this->OP25CGST->CurrentValue;
        $this->OP25CGST->PlaceHolder = RemoveHtml($this->OP25CGST->caption());
        if (strval($this->OP25CGST->EditValue) != "" && is_numeric($this->OP25CGST->EditValue)) {
            $this->OP25CGST->EditValue = FormatNumber($this->OP25CGST->EditValue, -2, -2, -2, -2);
        }

        // OP 6.0% SGST
        $this->OP60SGST->EditAttrs["class"] = "form-control";
        $this->OP60SGST->EditCustomAttributes = "";
        $this->OP60SGST->EditValue = $this->OP60SGST->CurrentValue;
        $this->OP60SGST->PlaceHolder = RemoveHtml($this->OP60SGST->caption());
        if (strval($this->OP60SGST->EditValue) != "" && is_numeric($this->OP60SGST->EditValue)) {
            $this->OP60SGST->EditValue = FormatNumber($this->OP60SGST->EditValue, -2, -2, -2, -2);
        }

        // OP 6.0% CGST
        $this->OP60CGST->EditAttrs["class"] = "form-control";
        $this->OP60CGST->EditCustomAttributes = "";
        $this->OP60CGST->EditValue = $this->OP60CGST->CurrentValue;
        $this->OP60CGST->PlaceHolder = RemoveHtml($this->OP60CGST->caption());
        if (strval($this->OP60CGST->EditValue) != "" && is_numeric($this->OP60CGST->EditValue)) {
            $this->OP60CGST->EditValue = FormatNumber($this->OP60CGST->EditValue, -2, -2, -2, -2);
        }

        // OP 9.0% SGST
        $this->OP90SGST->EditAttrs["class"] = "form-control";
        $this->OP90SGST->EditCustomAttributes = "";
        $this->OP90SGST->EditValue = $this->OP90SGST->CurrentValue;
        $this->OP90SGST->PlaceHolder = RemoveHtml($this->OP90SGST->caption());
        if (strval($this->OP90SGST->EditValue) != "" && is_numeric($this->OP90SGST->EditValue)) {
            $this->OP90SGST->EditValue = FormatNumber($this->OP90SGST->EditValue, -2, -2, -2, -2);
        }

        // OP 9.0% CGST
        $this->OP90CGST->EditAttrs["class"] = "form-control";
        $this->OP90CGST->EditCustomAttributes = "";
        $this->OP90CGST->EditValue = $this->OP90CGST->CurrentValue;
        $this->OP90CGST->PlaceHolder = RemoveHtml($this->OP90CGST->caption());
        if (strval($this->OP90CGST->EditValue) != "" && is_numeric($this->OP90CGST->EditValue)) {
            $this->OP90CGST->EditValue = FormatNumber($this->OP90CGST->EditValue, -2, -2, -2, -2);
        }

        // OP 14.0% SGST
        $this->OP140SGST->EditAttrs["class"] = "form-control";
        $this->OP140SGST->EditCustomAttributes = "";
        $this->OP140SGST->EditValue = $this->OP140SGST->CurrentValue;
        $this->OP140SGST->PlaceHolder = RemoveHtml($this->OP140SGST->caption());
        if (strval($this->OP140SGST->EditValue) != "" && is_numeric($this->OP140SGST->EditValue)) {
            $this->OP140SGST->EditValue = FormatNumber($this->OP140SGST->EditValue, -2, -2, -2, -2);
        }

        // OP 14.0% CGST
        $this->OP140CGST->EditAttrs["class"] = "form-control";
        $this->OP140CGST->EditCustomAttributes = "";
        $this->OP140CGST->EditValue = $this->OP140CGST->CurrentValue;
        $this->OP140CGST->PlaceHolder = RemoveHtml($this->OP140CGST->caption());
        if (strval($this->OP140CGST->EditValue) != "" && is_numeric($this->OP140CGST->EditValue)) {
            $this->OP140CGST->EditValue = FormatNumber($this->OP140CGST->EditValue, -2, -2, -2, -2);
        }

        // HosoID

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
                    $doc->exportCaption($this->IP25SGST);
                    $doc->exportCaption($this->IP25CGST);
                    $doc->exportCaption($this->IP60SGST);
                    $doc->exportCaption($this->IP60CGST);
                    $doc->exportCaption($this->IP90SGST);
                    $doc->exportCaption($this->IP90CGST);
                    $doc->exportCaption($this->IP140SGST);
                    $doc->exportCaption($this->IP140CGST);
                    $doc->exportCaption($this->OP25SGST);
                    $doc->exportCaption($this->OP25CGST);
                    $doc->exportCaption($this->OP60SGST);
                    $doc->exportCaption($this->OP60CGST);
                    $doc->exportCaption($this->OP90SGST);
                    $doc->exportCaption($this->OP90CGST);
                    $doc->exportCaption($this->OP140SGST);
                    $doc->exportCaption($this->OP140CGST);
                    $doc->exportCaption($this->HosoID);
                } else {
                    $doc->exportCaption($this->BillDate);
                    $doc->exportCaption($this->IP25SGST);
                    $doc->exportCaption($this->IP25CGST);
                    $doc->exportCaption($this->IP60SGST);
                    $doc->exportCaption($this->IP60CGST);
                    $doc->exportCaption($this->IP90SGST);
                    $doc->exportCaption($this->IP90CGST);
                    $doc->exportCaption($this->IP140SGST);
                    $doc->exportCaption($this->IP140CGST);
                    $doc->exportCaption($this->OP25SGST);
                    $doc->exportCaption($this->OP25CGST);
                    $doc->exportCaption($this->OP60SGST);
                    $doc->exportCaption($this->OP60CGST);
                    $doc->exportCaption($this->OP90SGST);
                    $doc->exportCaption($this->OP90CGST);
                    $doc->exportCaption($this->OP140SGST);
                    $doc->exportCaption($this->OP140CGST);
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
                        $doc->exportField($this->IP25SGST);
                        $doc->exportField($this->IP25CGST);
                        $doc->exportField($this->IP60SGST);
                        $doc->exportField($this->IP60CGST);
                        $doc->exportField($this->IP90SGST);
                        $doc->exportField($this->IP90CGST);
                        $doc->exportField($this->IP140SGST);
                        $doc->exportField($this->IP140CGST);
                        $doc->exportField($this->OP25SGST);
                        $doc->exportField($this->OP25CGST);
                        $doc->exportField($this->OP60SGST);
                        $doc->exportField($this->OP60CGST);
                        $doc->exportField($this->OP90SGST);
                        $doc->exportField($this->OP90CGST);
                        $doc->exportField($this->OP140SGST);
                        $doc->exportField($this->OP140CGST);
                        $doc->exportField($this->HosoID);
                    } else {
                        $doc->exportField($this->BillDate);
                        $doc->exportField($this->IP25SGST);
                        $doc->exportField($this->IP25CGST);
                        $doc->exportField($this->IP60SGST);
                        $doc->exportField($this->IP60CGST);
                        $doc->exportField($this->IP90SGST);
                        $doc->exportField($this->IP90CGST);
                        $doc->exportField($this->IP140SGST);
                        $doc->exportField($this->IP140CGST);
                        $doc->exportField($this->OP25SGST);
                        $doc->exportField($this->OP25CGST);
                        $doc->exportField($this->OP60SGST);
                        $doc->exportField($this->OP60CGST);
                        $doc->exportField($this->OP90SGST);
                        $doc->exportField($this->OP90CGST);
                        $doc->exportField($this->OP140SGST);
                        $doc->exportField($this->OP140CGST);
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
