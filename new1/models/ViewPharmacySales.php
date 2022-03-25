<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_pharmacy_sales
 */
class ViewPharmacySales extends DbTable
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
    public $SiNo;
    public $PRC;
    public $Product;
    public $BATCHNO;
    public $EXPDT;
    public $Mfg;
    public $HSN;
    public $IPNO;
    public $OPNO;
    public $IQ;
    public $RT;
    public $DAMT;
    public $BILLDT;
    public $BRCODE;
    public $PSGST;
    public $PCGST;
    public $SSGST;
    public $SCGST;
    public $PurValue;
    public $SalRate;
    public $PurRate;
    public $PAMT;
    public $PSGSTAmount;
    public $PCGSTAmount;
    public $SSGSTAmount;
    public $SCGSTAmount;
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
        $this->TableVar = 'view_pharmacy_sales';
        $this->TableName = 'view_pharmacy_sales';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_pharmacy_sales`";
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
        $this->BillDate = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_BillDate', 'BillDate', '`BillDate`', CastDateFieldForLike("`BillDate`", 0, "DB"), 133, 10, 0, false, '`BillDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BillDate->Sortable = true; // Allow sort
        $this->BillDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['BillDate'] = &$this->BillDate;

        // SiNo
        $this->SiNo = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_SiNo', 'SiNo', '`SiNo`', '`SiNo`', 3, 11, -1, false, '`SiNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SiNo->Sortable = true; // Allow sort
        $this->SiNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['SiNo'] = &$this->SiNo;

        // PRC
        $this->PRC = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_PRC', 'PRC', '`PRC`', '`PRC`', 200, 9, -1, false, '`PRC`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PRC->Sortable = true; // Allow sort
        $this->Fields['PRC'] = &$this->PRC;

        // Product
        $this->Product = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_Product', 'Product', '`Product`', '`Product`', 200, 100, -1, false, '`Product`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Product->Sortable = true; // Allow sort
        $this->Fields['Product'] = &$this->Product;

        // BATCHNO
        $this->BATCHNO = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_BATCHNO', 'BATCHNO', '`BATCHNO`', '`BATCHNO`', 200, 10, -1, false, '`BATCHNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BATCHNO->Sortable = true; // Allow sort
        $this->Fields['BATCHNO'] = &$this->BATCHNO;

        // EXPDT
        $this->EXPDT = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_EXPDT', 'EXPDT', '`EXPDT`', CastDateFieldForLike("`EXPDT`", 0, "DB"), 135, 19, 0, false, '`EXPDT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EXPDT->Sortable = true; // Allow sort
        $this->EXPDT->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['EXPDT'] = &$this->EXPDT;

        // Mfg
        $this->Mfg = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_Mfg', 'Mfg', '`Mfg`', '`Mfg`', 200, 45, -1, false, '`Mfg`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Mfg->Sortable = true; // Allow sort
        $this->Fields['Mfg'] = &$this->Mfg;

        // HSN
        $this->HSN = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_HSN', 'HSN', '`HSN`', '`HSN`', 200, 45, -1, false, '`HSN`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HSN->Sortable = true; // Allow sort
        $this->Fields['HSN'] = &$this->HSN;

        // IPNO
        $this->IPNO = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_IPNO', 'IPNO', '`IPNO`', '`IPNO`', 200, 45, -1, false, '`IPNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IPNO->Sortable = true; // Allow sort
        $this->Fields['IPNO'] = &$this->IPNO;

        // OPNO
        $this->OPNO = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_OPNO', 'OPNO', '`OPNO`', '`OPNO`', 200, 45, -1, false, '`OPNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OPNO->Sortable = true; // Allow sort
        $this->Fields['OPNO'] = &$this->OPNO;

        // IQ
        $this->IQ = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_IQ', 'IQ', '`IQ`', '`IQ`', 131, 12, -1, false, '`IQ`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IQ->Sortable = true; // Allow sort
        $this->IQ->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->IQ->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['IQ'] = &$this->IQ;

        // RT
        $this->RT = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_RT', 'RT', '`RT`', '`RT`', 131, 12, -1, false, '`RT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RT->Sortable = true; // Allow sort
        $this->RT->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->RT->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['RT'] = &$this->RT;

        // DAMT
        $this->DAMT = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_DAMT', 'DAMT', '`DAMT`', '`DAMT`', 131, 12, -1, false, '`DAMT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DAMT->Sortable = true; // Allow sort
        $this->DAMT->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->DAMT->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['DAMT'] = &$this->DAMT;

        // BILLDT
        $this->BILLDT = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_BILLDT', 'BILLDT', '`BILLDT`', CastDateFieldForLike("`BILLDT`", 0, "DB"), 135, 19, 0, false, '`BILLDT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BILLDT->Sortable = true; // Allow sort
        $this->BILLDT->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['BILLDT'] = &$this->BILLDT;

        // BRCODE
        $this->BRCODE = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_BRCODE', 'BRCODE', '`BRCODE`', '`BRCODE`', 3, 11, -1, false, '`BRCODE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BRCODE->Sortable = true; // Allow sort
        $this->BRCODE->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['BRCODE'] = &$this->BRCODE;

        // PSGST
        $this->PSGST = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_PSGST', 'PSGST', '`PSGST`', '`PSGST`', 131, 12, -1, false, '`PSGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PSGST->Sortable = true; // Allow sort
        $this->PSGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PSGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['PSGST'] = &$this->PSGST;

        // PCGST
        $this->PCGST = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_PCGST', 'PCGST', '`PCGST`', '`PCGST`', 131, 12, -1, false, '`PCGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PCGST->Sortable = true; // Allow sort
        $this->PCGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PCGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['PCGST'] = &$this->PCGST;

        // SSGST
        $this->SSGST = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_SSGST', 'SSGST', '`SSGST`', '`SSGST`', 131, 12, -1, false, '`SSGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SSGST->Sortable = true; // Allow sort
        $this->SSGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SSGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['SSGST'] = &$this->SSGST;

        // SCGST
        $this->SCGST = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_SCGST', 'SCGST', '`SCGST`', '`SCGST`', 131, 12, -1, false, '`SCGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SCGST->Sortable = true; // Allow sort
        $this->SCGST->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SCGST->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['SCGST'] = &$this->SCGST;

        // PurValue
        $this->PurValue = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_PurValue', 'PurValue', '`PurValue`', '`PurValue`', 131, 12, -1, false, '`PurValue`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PurValue->Sortable = true; // Allow sort
        $this->PurValue->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PurValue->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['PurValue'] = &$this->PurValue;

        // SalRate
        $this->SalRate = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_SalRate', 'SalRate', '`SalRate`', '`SalRate`', 131, 12, -1, false, '`SalRate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SalRate->Sortable = true; // Allow sort
        $this->SalRate->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SalRate->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['SalRate'] = &$this->SalRate;

        // PurRate
        $this->PurRate = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_PurRate', 'PurRate', '`PurRate`', '`PurRate`', 131, 13, -1, false, '`PurRate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PurRate->Sortable = true; // Allow sort
        $this->PurRate->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PurRate->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['PurRate'] = &$this->PurRate;

        // PAMT
        $this->PAMT = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_PAMT', 'PAMT', '`PAMT`', '`PAMT`', 131, 22, -1, false, '`PAMT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PAMT->Sortable = true; // Allow sort
        $this->PAMT->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PAMT->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['PAMT'] = &$this->PAMT;

        // PSGSTAmount
        $this->PSGSTAmount = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_PSGSTAmount', 'PSGSTAmount', '`PSGSTAmount`', '`PSGSTAmount`', 131, 32, -1, false, '`PSGSTAmount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PSGSTAmount->Sortable = true; // Allow sort
        $this->PSGSTAmount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PSGSTAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['PSGSTAmount'] = &$this->PSGSTAmount;

        // PCGSTAmount
        $this->PCGSTAmount = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_PCGSTAmount', 'PCGSTAmount', '`PCGSTAmount`', '`PCGSTAmount`', 131, 32, -1, false, '`PCGSTAmount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PCGSTAmount->Sortable = true; // Allow sort
        $this->PCGSTAmount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PCGSTAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['PCGSTAmount'] = &$this->PCGSTAmount;

        // SSGSTAmount
        $this->SSGSTAmount = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_SSGSTAmount', 'SSGSTAmount', '`SSGSTAmount`', '`SSGSTAmount`', 131, 23, -1, false, '`SSGSTAmount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SSGSTAmount->Sortable = true; // Allow sort
        $this->SSGSTAmount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SSGSTAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['SSGSTAmount'] = &$this->SSGSTAmount;

        // SCGSTAmount
        $this->SCGSTAmount = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_SCGSTAmount', 'SCGSTAmount', '`SCGSTAmount`', '`SCGSTAmount`', 131, 23, -1, false, '`SCGSTAmount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SCGSTAmount->Sortable = true; // Allow sort
        $this->SCGSTAmount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SCGSTAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['SCGSTAmount'] = &$this->SCGSTAmount;

        // HosoID
        $this->HosoID = new DbField('view_pharmacy_sales', 'view_pharmacy_sales', 'x_HosoID', 'HosoID', '`HosoID`', '`HosoID`', 3, 11, -1, false, '`HosoID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_pharmacy_sales`";
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
        $this->SiNo->DbValue = $row['SiNo'];
        $this->PRC->DbValue = $row['PRC'];
        $this->Product->DbValue = $row['Product'];
        $this->BATCHNO->DbValue = $row['BATCHNO'];
        $this->EXPDT->DbValue = $row['EXPDT'];
        $this->Mfg->DbValue = $row['Mfg'];
        $this->HSN->DbValue = $row['HSN'];
        $this->IPNO->DbValue = $row['IPNO'];
        $this->OPNO->DbValue = $row['OPNO'];
        $this->IQ->DbValue = $row['IQ'];
        $this->RT->DbValue = $row['RT'];
        $this->DAMT->DbValue = $row['DAMT'];
        $this->BILLDT->DbValue = $row['BILLDT'];
        $this->BRCODE->DbValue = $row['BRCODE'];
        $this->PSGST->DbValue = $row['PSGST'];
        $this->PCGST->DbValue = $row['PCGST'];
        $this->SSGST->DbValue = $row['SSGST'];
        $this->SCGST->DbValue = $row['SCGST'];
        $this->PurValue->DbValue = $row['PurValue'];
        $this->SalRate->DbValue = $row['SalRate'];
        $this->PurRate->DbValue = $row['PurRate'];
        $this->PAMT->DbValue = $row['PAMT'];
        $this->PSGSTAmount->DbValue = $row['PSGSTAmount'];
        $this->PCGSTAmount->DbValue = $row['PCGSTAmount'];
        $this->SSGSTAmount->DbValue = $row['SSGSTAmount'];
        $this->SCGSTAmount->DbValue = $row['SCGSTAmount'];
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
            return GetUrl("ViewPharmacySalesList");
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
        if ($pageName == "ViewPharmacySalesView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewPharmacySalesEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewPharmacySalesAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewPharmacySalesList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewPharmacySalesView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewPharmacySalesView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewPharmacySalesAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewPharmacySalesAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewPharmacySalesEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewPharmacySalesAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewPharmacySalesDelete", $this->getUrlParm());
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
        $this->SiNo->setDbValue($row['SiNo']);
        $this->PRC->setDbValue($row['PRC']);
        $this->Product->setDbValue($row['Product']);
        $this->BATCHNO->setDbValue($row['BATCHNO']);
        $this->EXPDT->setDbValue($row['EXPDT']);
        $this->Mfg->setDbValue($row['Mfg']);
        $this->HSN->setDbValue($row['HSN']);
        $this->IPNO->setDbValue($row['IPNO']);
        $this->OPNO->setDbValue($row['OPNO']);
        $this->IQ->setDbValue($row['IQ']);
        $this->RT->setDbValue($row['RT']);
        $this->DAMT->setDbValue($row['DAMT']);
        $this->BILLDT->setDbValue($row['BILLDT']);
        $this->BRCODE->setDbValue($row['BRCODE']);
        $this->PSGST->setDbValue($row['PSGST']);
        $this->PCGST->setDbValue($row['PCGST']);
        $this->SSGST->setDbValue($row['SSGST']);
        $this->SCGST->setDbValue($row['SCGST']);
        $this->PurValue->setDbValue($row['PurValue']);
        $this->SalRate->setDbValue($row['SalRate']);
        $this->PurRate->setDbValue($row['PurRate']);
        $this->PAMT->setDbValue($row['PAMT']);
        $this->PSGSTAmount->setDbValue($row['PSGSTAmount']);
        $this->PCGSTAmount->setDbValue($row['PCGSTAmount']);
        $this->SSGSTAmount->setDbValue($row['SSGSTAmount']);
        $this->SCGSTAmount->setDbValue($row['SCGSTAmount']);
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

        // SiNo

        // PRC

        // Product

        // BATCHNO

        // EXPDT

        // Mfg

        // HSN

        // IPNO

        // OPNO

        // IQ

        // RT

        // DAMT

        // BILLDT

        // BRCODE

        // PSGST

        // PCGST

        // SSGST

        // SCGST

        // PurValue

        // SalRate

        // PurRate

        // PAMT

        // PSGSTAmount

        // PCGSTAmount

        // SSGSTAmount

        // SCGSTAmount

        // HosoID

        // BillDate
        $this->BillDate->ViewValue = $this->BillDate->CurrentValue;
        $this->BillDate->ViewValue = FormatDateTime($this->BillDate->ViewValue, 0);
        $this->BillDate->ViewCustomAttributes = "";

        // SiNo
        $this->SiNo->ViewValue = $this->SiNo->CurrentValue;
        $this->SiNo->ViewValue = FormatNumber($this->SiNo->ViewValue, 0, -2, -2, -2);
        $this->SiNo->ViewCustomAttributes = "";

        // PRC
        $this->PRC->ViewValue = $this->PRC->CurrentValue;
        $this->PRC->ViewCustomAttributes = "";

        // Product
        $this->Product->ViewValue = $this->Product->CurrentValue;
        $this->Product->ViewCustomAttributes = "";

        // BATCHNO
        $this->BATCHNO->ViewValue = $this->BATCHNO->CurrentValue;
        $this->BATCHNO->ViewCustomAttributes = "";

        // EXPDT
        $this->EXPDT->ViewValue = $this->EXPDT->CurrentValue;
        $this->EXPDT->ViewValue = FormatDateTime($this->EXPDT->ViewValue, 0);
        $this->EXPDT->ViewCustomAttributes = "";

        // Mfg
        $this->Mfg->ViewValue = $this->Mfg->CurrentValue;
        $this->Mfg->ViewCustomAttributes = "";

        // HSN
        $this->HSN->ViewValue = $this->HSN->CurrentValue;
        $this->HSN->ViewCustomAttributes = "";

        // IPNO
        $this->IPNO->ViewValue = $this->IPNO->CurrentValue;
        $this->IPNO->ViewCustomAttributes = "";

        // OPNO
        $this->OPNO->ViewValue = $this->OPNO->CurrentValue;
        $this->OPNO->ViewCustomAttributes = "";

        // IQ
        $this->IQ->ViewValue = $this->IQ->CurrentValue;
        $this->IQ->ViewValue = FormatNumber($this->IQ->ViewValue, 2, -2, -2, -2);
        $this->IQ->ViewCustomAttributes = "";

        // RT
        $this->RT->ViewValue = $this->RT->CurrentValue;
        $this->RT->ViewValue = FormatNumber($this->RT->ViewValue, 2, -2, -2, -2);
        $this->RT->ViewCustomAttributes = "";

        // DAMT
        $this->DAMT->ViewValue = $this->DAMT->CurrentValue;
        $this->DAMT->ViewValue = FormatNumber($this->DAMT->ViewValue, 2, -2, -2, -2);
        $this->DAMT->ViewCustomAttributes = "";

        // BILLDT
        $this->BILLDT->ViewValue = $this->BILLDT->CurrentValue;
        $this->BILLDT->ViewValue = FormatDateTime($this->BILLDT->ViewValue, 0);
        $this->BILLDT->ViewCustomAttributes = "";

        // BRCODE
        $this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
        $this->BRCODE->ViewValue = FormatNumber($this->BRCODE->ViewValue, 0, -2, -2, -2);
        $this->BRCODE->ViewCustomAttributes = "";

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

        // PurValue
        $this->PurValue->ViewValue = $this->PurValue->CurrentValue;
        $this->PurValue->ViewValue = FormatNumber($this->PurValue->ViewValue, 2, -2, -2, -2);
        $this->PurValue->ViewCustomAttributes = "";

        // SalRate
        $this->SalRate->ViewValue = $this->SalRate->CurrentValue;
        $this->SalRate->ViewValue = FormatNumber($this->SalRate->ViewValue, 2, -2, -2, -2);
        $this->SalRate->ViewCustomAttributes = "";

        // PurRate
        $this->PurRate->ViewValue = $this->PurRate->CurrentValue;
        $this->PurRate->ViewValue = FormatNumber($this->PurRate->ViewValue, 2, -2, -2, -2);
        $this->PurRate->ViewCustomAttributes = "";

        // PAMT
        $this->PAMT->ViewValue = $this->PAMT->CurrentValue;
        $this->PAMT->ViewValue = FormatNumber($this->PAMT->ViewValue, 2, -2, -2, -2);
        $this->PAMT->ViewCustomAttributes = "";

        // PSGSTAmount
        $this->PSGSTAmount->ViewValue = $this->PSGSTAmount->CurrentValue;
        $this->PSGSTAmount->ViewValue = FormatNumber($this->PSGSTAmount->ViewValue, 2, -2, -2, -2);
        $this->PSGSTAmount->ViewCustomAttributes = "";

        // PCGSTAmount
        $this->PCGSTAmount->ViewValue = $this->PCGSTAmount->CurrentValue;
        $this->PCGSTAmount->ViewValue = FormatNumber($this->PCGSTAmount->ViewValue, 2, -2, -2, -2);
        $this->PCGSTAmount->ViewCustomAttributes = "";

        // SSGSTAmount
        $this->SSGSTAmount->ViewValue = $this->SSGSTAmount->CurrentValue;
        $this->SSGSTAmount->ViewValue = FormatNumber($this->SSGSTAmount->ViewValue, 2, -2, -2, -2);
        $this->SSGSTAmount->ViewCustomAttributes = "";

        // SCGSTAmount
        $this->SCGSTAmount->ViewValue = $this->SCGSTAmount->CurrentValue;
        $this->SCGSTAmount->ViewValue = FormatNumber($this->SCGSTAmount->ViewValue, 2, -2, -2, -2);
        $this->SCGSTAmount->ViewCustomAttributes = "";

        // HosoID
        $this->HosoID->ViewValue = $this->HosoID->CurrentValue;
        $this->HosoID->ViewValue = FormatNumber($this->HosoID->ViewValue, 0, -2, -2, -2);
        $this->HosoID->ViewCustomAttributes = "";

        // BillDate
        $this->BillDate->LinkCustomAttributes = "";
        $this->BillDate->HrefValue = "";
        $this->BillDate->TooltipValue = "";

        // SiNo
        $this->SiNo->LinkCustomAttributes = "";
        $this->SiNo->HrefValue = "";
        $this->SiNo->TooltipValue = "";

        // PRC
        $this->PRC->LinkCustomAttributes = "";
        $this->PRC->HrefValue = "";
        $this->PRC->TooltipValue = "";

        // Product
        $this->Product->LinkCustomAttributes = "";
        $this->Product->HrefValue = "";
        $this->Product->TooltipValue = "";

        // BATCHNO
        $this->BATCHNO->LinkCustomAttributes = "";
        $this->BATCHNO->HrefValue = "";
        $this->BATCHNO->TooltipValue = "";

        // EXPDT
        $this->EXPDT->LinkCustomAttributes = "";
        $this->EXPDT->HrefValue = "";
        $this->EXPDT->TooltipValue = "";

        // Mfg
        $this->Mfg->LinkCustomAttributes = "";
        $this->Mfg->HrefValue = "";
        $this->Mfg->TooltipValue = "";

        // HSN
        $this->HSN->LinkCustomAttributes = "";
        $this->HSN->HrefValue = "";
        $this->HSN->TooltipValue = "";

        // IPNO
        $this->IPNO->LinkCustomAttributes = "";
        $this->IPNO->HrefValue = "";
        $this->IPNO->TooltipValue = "";

        // OPNO
        $this->OPNO->LinkCustomAttributes = "";
        $this->OPNO->HrefValue = "";
        $this->OPNO->TooltipValue = "";

        // IQ
        $this->IQ->LinkCustomAttributes = "";
        $this->IQ->HrefValue = "";
        $this->IQ->TooltipValue = "";

        // RT
        $this->RT->LinkCustomAttributes = "";
        $this->RT->HrefValue = "";
        $this->RT->TooltipValue = "";

        // DAMT
        $this->DAMT->LinkCustomAttributes = "";
        $this->DAMT->HrefValue = "";
        $this->DAMT->TooltipValue = "";

        // BILLDT
        $this->BILLDT->LinkCustomAttributes = "";
        $this->BILLDT->HrefValue = "";
        $this->BILLDT->TooltipValue = "";

        // BRCODE
        $this->BRCODE->LinkCustomAttributes = "";
        $this->BRCODE->HrefValue = "";
        $this->BRCODE->TooltipValue = "";

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

        // PurValue
        $this->PurValue->LinkCustomAttributes = "";
        $this->PurValue->HrefValue = "";
        $this->PurValue->TooltipValue = "";

        // SalRate
        $this->SalRate->LinkCustomAttributes = "";
        $this->SalRate->HrefValue = "";
        $this->SalRate->TooltipValue = "";

        // PurRate
        $this->PurRate->LinkCustomAttributes = "";
        $this->PurRate->HrefValue = "";
        $this->PurRate->TooltipValue = "";

        // PAMT
        $this->PAMT->LinkCustomAttributes = "";
        $this->PAMT->HrefValue = "";
        $this->PAMT->TooltipValue = "";

        // PSGSTAmount
        $this->PSGSTAmount->LinkCustomAttributes = "";
        $this->PSGSTAmount->HrefValue = "";
        $this->PSGSTAmount->TooltipValue = "";

        // PCGSTAmount
        $this->PCGSTAmount->LinkCustomAttributes = "";
        $this->PCGSTAmount->HrefValue = "";
        $this->PCGSTAmount->TooltipValue = "";

        // SSGSTAmount
        $this->SSGSTAmount->LinkCustomAttributes = "";
        $this->SSGSTAmount->HrefValue = "";
        $this->SSGSTAmount->TooltipValue = "";

        // SCGSTAmount
        $this->SCGSTAmount->LinkCustomAttributes = "";
        $this->SCGSTAmount->HrefValue = "";
        $this->SCGSTAmount->TooltipValue = "";

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

        // SiNo
        $this->SiNo->EditAttrs["class"] = "form-control";
        $this->SiNo->EditCustomAttributes = "";
        $this->SiNo->EditValue = $this->SiNo->CurrentValue;
        $this->SiNo->PlaceHolder = RemoveHtml($this->SiNo->caption());

        // PRC
        $this->PRC->EditAttrs["class"] = "form-control";
        $this->PRC->EditCustomAttributes = "";
        if (!$this->PRC->Raw) {
            $this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
        }
        $this->PRC->EditValue = $this->PRC->CurrentValue;
        $this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

        // Product
        $this->Product->EditAttrs["class"] = "form-control";
        $this->Product->EditCustomAttributes = "";
        if (!$this->Product->Raw) {
            $this->Product->CurrentValue = HtmlDecode($this->Product->CurrentValue);
        }
        $this->Product->EditValue = $this->Product->CurrentValue;
        $this->Product->PlaceHolder = RemoveHtml($this->Product->caption());

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

        // Mfg
        $this->Mfg->EditAttrs["class"] = "form-control";
        $this->Mfg->EditCustomAttributes = "";
        if (!$this->Mfg->Raw) {
            $this->Mfg->CurrentValue = HtmlDecode($this->Mfg->CurrentValue);
        }
        $this->Mfg->EditValue = $this->Mfg->CurrentValue;
        $this->Mfg->PlaceHolder = RemoveHtml($this->Mfg->caption());

        // HSN
        $this->HSN->EditAttrs["class"] = "form-control";
        $this->HSN->EditCustomAttributes = "";
        if (!$this->HSN->Raw) {
            $this->HSN->CurrentValue = HtmlDecode($this->HSN->CurrentValue);
        }
        $this->HSN->EditValue = $this->HSN->CurrentValue;
        $this->HSN->PlaceHolder = RemoveHtml($this->HSN->caption());

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

        // IQ
        $this->IQ->EditAttrs["class"] = "form-control";
        $this->IQ->EditCustomAttributes = "";
        $this->IQ->EditValue = $this->IQ->CurrentValue;
        $this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());
        if (strval($this->IQ->EditValue) != "" && is_numeric($this->IQ->EditValue)) {
            $this->IQ->EditValue = FormatNumber($this->IQ->EditValue, -2, -2, -2, -2);
        }

        // RT
        $this->RT->EditAttrs["class"] = "form-control";
        $this->RT->EditCustomAttributes = "";
        $this->RT->EditValue = $this->RT->CurrentValue;
        $this->RT->PlaceHolder = RemoveHtml($this->RT->caption());
        if (strval($this->RT->EditValue) != "" && is_numeric($this->RT->EditValue)) {
            $this->RT->EditValue = FormatNumber($this->RT->EditValue, -2, -2, -2, -2);
        }

        // DAMT
        $this->DAMT->EditAttrs["class"] = "form-control";
        $this->DAMT->EditCustomAttributes = "";
        $this->DAMT->EditValue = $this->DAMT->CurrentValue;
        $this->DAMT->PlaceHolder = RemoveHtml($this->DAMT->caption());
        if (strval($this->DAMT->EditValue) != "" && is_numeric($this->DAMT->EditValue)) {
            $this->DAMT->EditValue = FormatNumber($this->DAMT->EditValue, -2, -2, -2, -2);
        }

        // BILLDT
        $this->BILLDT->EditAttrs["class"] = "form-control";
        $this->BILLDT->EditCustomAttributes = "";
        $this->BILLDT->EditValue = FormatDateTime($this->BILLDT->CurrentValue, 8);
        $this->BILLDT->PlaceHolder = RemoveHtml($this->BILLDT->caption());

        // BRCODE
        $this->BRCODE->EditAttrs["class"] = "form-control";
        $this->BRCODE->EditCustomAttributes = "";
        $this->BRCODE->EditValue = $this->BRCODE->CurrentValue;
        $this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

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

        // PurValue
        $this->PurValue->EditAttrs["class"] = "form-control";
        $this->PurValue->EditCustomAttributes = "";
        $this->PurValue->EditValue = $this->PurValue->CurrentValue;
        $this->PurValue->PlaceHolder = RemoveHtml($this->PurValue->caption());
        if (strval($this->PurValue->EditValue) != "" && is_numeric($this->PurValue->EditValue)) {
            $this->PurValue->EditValue = FormatNumber($this->PurValue->EditValue, -2, -2, -2, -2);
        }

        // SalRate
        $this->SalRate->EditAttrs["class"] = "form-control";
        $this->SalRate->EditCustomAttributes = "";
        $this->SalRate->EditValue = $this->SalRate->CurrentValue;
        $this->SalRate->PlaceHolder = RemoveHtml($this->SalRate->caption());
        if (strval($this->SalRate->EditValue) != "" && is_numeric($this->SalRate->EditValue)) {
            $this->SalRate->EditValue = FormatNumber($this->SalRate->EditValue, -2, -2, -2, -2);
        }

        // PurRate
        $this->PurRate->EditAttrs["class"] = "form-control";
        $this->PurRate->EditCustomAttributes = "";
        $this->PurRate->EditValue = $this->PurRate->CurrentValue;
        $this->PurRate->PlaceHolder = RemoveHtml($this->PurRate->caption());
        if (strval($this->PurRate->EditValue) != "" && is_numeric($this->PurRate->EditValue)) {
            $this->PurRate->EditValue = FormatNumber($this->PurRate->EditValue, -2, -2, -2, -2);
        }

        // PAMT
        $this->PAMT->EditAttrs["class"] = "form-control";
        $this->PAMT->EditCustomAttributes = "";
        $this->PAMT->EditValue = $this->PAMT->CurrentValue;
        $this->PAMT->PlaceHolder = RemoveHtml($this->PAMT->caption());
        if (strval($this->PAMT->EditValue) != "" && is_numeric($this->PAMT->EditValue)) {
            $this->PAMT->EditValue = FormatNumber($this->PAMT->EditValue, -2, -2, -2, -2);
        }

        // PSGSTAmount
        $this->PSGSTAmount->EditAttrs["class"] = "form-control";
        $this->PSGSTAmount->EditCustomAttributes = "";
        $this->PSGSTAmount->EditValue = $this->PSGSTAmount->CurrentValue;
        $this->PSGSTAmount->PlaceHolder = RemoveHtml($this->PSGSTAmount->caption());
        if (strval($this->PSGSTAmount->EditValue) != "" && is_numeric($this->PSGSTAmount->EditValue)) {
            $this->PSGSTAmount->EditValue = FormatNumber($this->PSGSTAmount->EditValue, -2, -2, -2, -2);
        }

        // PCGSTAmount
        $this->PCGSTAmount->EditAttrs["class"] = "form-control";
        $this->PCGSTAmount->EditCustomAttributes = "";
        $this->PCGSTAmount->EditValue = $this->PCGSTAmount->CurrentValue;
        $this->PCGSTAmount->PlaceHolder = RemoveHtml($this->PCGSTAmount->caption());
        if (strval($this->PCGSTAmount->EditValue) != "" && is_numeric($this->PCGSTAmount->EditValue)) {
            $this->PCGSTAmount->EditValue = FormatNumber($this->PCGSTAmount->EditValue, -2, -2, -2, -2);
        }

        // SSGSTAmount
        $this->SSGSTAmount->EditAttrs["class"] = "form-control";
        $this->SSGSTAmount->EditCustomAttributes = "";
        $this->SSGSTAmount->EditValue = $this->SSGSTAmount->CurrentValue;
        $this->SSGSTAmount->PlaceHolder = RemoveHtml($this->SSGSTAmount->caption());
        if (strval($this->SSGSTAmount->EditValue) != "" && is_numeric($this->SSGSTAmount->EditValue)) {
            $this->SSGSTAmount->EditValue = FormatNumber($this->SSGSTAmount->EditValue, -2, -2, -2, -2);
        }

        // SCGSTAmount
        $this->SCGSTAmount->EditAttrs["class"] = "form-control";
        $this->SCGSTAmount->EditCustomAttributes = "";
        $this->SCGSTAmount->EditValue = $this->SCGSTAmount->CurrentValue;
        $this->SCGSTAmount->PlaceHolder = RemoveHtml($this->SCGSTAmount->caption());
        if (strval($this->SCGSTAmount->EditValue) != "" && is_numeric($this->SCGSTAmount->EditValue)) {
            $this->SCGSTAmount->EditValue = FormatNumber($this->SCGSTAmount->EditValue, -2, -2, -2, -2);
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
                    $doc->exportCaption($this->SiNo);
                    $doc->exportCaption($this->PRC);
                    $doc->exportCaption($this->Product);
                    $doc->exportCaption($this->BATCHNO);
                    $doc->exportCaption($this->EXPDT);
                    $doc->exportCaption($this->Mfg);
                    $doc->exportCaption($this->HSN);
                    $doc->exportCaption($this->IPNO);
                    $doc->exportCaption($this->OPNO);
                    $doc->exportCaption($this->IQ);
                    $doc->exportCaption($this->RT);
                    $doc->exportCaption($this->DAMT);
                    $doc->exportCaption($this->BILLDT);
                    $doc->exportCaption($this->BRCODE);
                    $doc->exportCaption($this->PSGST);
                    $doc->exportCaption($this->PCGST);
                    $doc->exportCaption($this->SSGST);
                    $doc->exportCaption($this->SCGST);
                    $doc->exportCaption($this->PurValue);
                    $doc->exportCaption($this->SalRate);
                    $doc->exportCaption($this->PurRate);
                    $doc->exportCaption($this->PAMT);
                    $doc->exportCaption($this->PSGSTAmount);
                    $doc->exportCaption($this->PCGSTAmount);
                    $doc->exportCaption($this->SSGSTAmount);
                    $doc->exportCaption($this->SCGSTAmount);
                    $doc->exportCaption($this->HosoID);
                } else {
                    $doc->exportCaption($this->BillDate);
                    $doc->exportCaption($this->SiNo);
                    $doc->exportCaption($this->PRC);
                    $doc->exportCaption($this->Product);
                    $doc->exportCaption($this->BATCHNO);
                    $doc->exportCaption($this->EXPDT);
                    $doc->exportCaption($this->Mfg);
                    $doc->exportCaption($this->HSN);
                    $doc->exportCaption($this->IPNO);
                    $doc->exportCaption($this->OPNO);
                    $doc->exportCaption($this->IQ);
                    $doc->exportCaption($this->RT);
                    $doc->exportCaption($this->DAMT);
                    $doc->exportCaption($this->BILLDT);
                    $doc->exportCaption($this->BRCODE);
                    $doc->exportCaption($this->PSGST);
                    $doc->exportCaption($this->PCGST);
                    $doc->exportCaption($this->SSGST);
                    $doc->exportCaption($this->SCGST);
                    $doc->exportCaption($this->PurValue);
                    $doc->exportCaption($this->SalRate);
                    $doc->exportCaption($this->PurRate);
                    $doc->exportCaption($this->PAMT);
                    $doc->exportCaption($this->PSGSTAmount);
                    $doc->exportCaption($this->PCGSTAmount);
                    $doc->exportCaption($this->SSGSTAmount);
                    $doc->exportCaption($this->SCGSTAmount);
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
                        $doc->exportField($this->SiNo);
                        $doc->exportField($this->PRC);
                        $doc->exportField($this->Product);
                        $doc->exportField($this->BATCHNO);
                        $doc->exportField($this->EXPDT);
                        $doc->exportField($this->Mfg);
                        $doc->exportField($this->HSN);
                        $doc->exportField($this->IPNO);
                        $doc->exportField($this->OPNO);
                        $doc->exportField($this->IQ);
                        $doc->exportField($this->RT);
                        $doc->exportField($this->DAMT);
                        $doc->exportField($this->BILLDT);
                        $doc->exportField($this->BRCODE);
                        $doc->exportField($this->PSGST);
                        $doc->exportField($this->PCGST);
                        $doc->exportField($this->SSGST);
                        $doc->exportField($this->SCGST);
                        $doc->exportField($this->PurValue);
                        $doc->exportField($this->SalRate);
                        $doc->exportField($this->PurRate);
                        $doc->exportField($this->PAMT);
                        $doc->exportField($this->PSGSTAmount);
                        $doc->exportField($this->PCGSTAmount);
                        $doc->exportField($this->SSGSTAmount);
                        $doc->exportField($this->SCGSTAmount);
                        $doc->exportField($this->HosoID);
                    } else {
                        $doc->exportField($this->BillDate);
                        $doc->exportField($this->SiNo);
                        $doc->exportField($this->PRC);
                        $doc->exportField($this->Product);
                        $doc->exportField($this->BATCHNO);
                        $doc->exportField($this->EXPDT);
                        $doc->exportField($this->Mfg);
                        $doc->exportField($this->HSN);
                        $doc->exportField($this->IPNO);
                        $doc->exportField($this->OPNO);
                        $doc->exportField($this->IQ);
                        $doc->exportField($this->RT);
                        $doc->exportField($this->DAMT);
                        $doc->exportField($this->BILLDT);
                        $doc->exportField($this->BRCODE);
                        $doc->exportField($this->PSGST);
                        $doc->exportField($this->PCGST);
                        $doc->exportField($this->SSGST);
                        $doc->exportField($this->SCGST);
                        $doc->exportField($this->PurValue);
                        $doc->exportField($this->SalRate);
                        $doc->exportField($this->PurRate);
                        $doc->exportField($this->PAMT);
                        $doc->exportField($this->PSGSTAmount);
                        $doc->exportField($this->PCGSTAmount);
                        $doc->exportField($this->SSGSTAmount);
                        $doc->exportField($this->SCGSTAmount);
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
