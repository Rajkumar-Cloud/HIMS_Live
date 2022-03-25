<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_pharmacy_report_earning
 */
class ViewPharmacyReportEarning extends DbTable
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
    public $ProductCode;
    public $ProductName;
    public $SaleQuantity;
    public $RT;
    public $SaleValue;
    public $PurRate;
    public $PurchaseCostValue;
    public $MarginAmount;
    public $MarginOnSale;
    public $MarginOnCost;
    public $PurchaseCostValue1;
    public $MarginAmount1;
    public $MarginOnSale1;
    public $MarginOnCost1;
    public $Date;
    public $BRCODE;
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
        $this->TableVar = 'view_pharmacy_report_earning';
        $this->TableName = 'view_pharmacy_report_earning';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_pharmacy_report_earning`";
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

        // ProductCode
        $this->ProductCode = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_ProductCode', 'ProductCode', '`ProductCode`', '`ProductCode`', 200, 9, -1, false, '`ProductCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ProductCode->Sortable = true; // Allow sort
        $this->ProductCode->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ProductCode->Param, "CustomMsg");
        $this->Fields['ProductCode'] = &$this->ProductCode;

        // ProductName
        $this->ProductName = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_ProductName', 'ProductName', '`ProductName`', '`ProductName`', 200, 100, -1, false, '`ProductName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ProductName->Sortable = true; // Allow sort
        $this->ProductName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ProductName->Param, "CustomMsg");
        $this->Fields['ProductName'] = &$this->ProductName;

        // SaleQuantity
        $this->SaleQuantity = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_SaleQuantity', 'SaleQuantity', '`SaleQuantity`', '`SaleQuantity`', 131, 34, -1, false, '`SaleQuantity`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SaleQuantity->Sortable = true; // Allow sort
        $this->SaleQuantity->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SaleQuantity->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->SaleQuantity->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SaleQuantity->Param, "CustomMsg");
        $this->Fields['SaleQuantity'] = &$this->SaleQuantity;

        // RT
        $this->RT = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_RT', 'RT', '`RT`', '`RT`', 131, 12, -1, false, '`RT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RT->Sortable = true; // Allow sort
        $this->RT->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->RT->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->RT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RT->Param, "CustomMsg");
        $this->Fields['RT'] = &$this->RT;

        // SaleValue
        $this->SaleValue = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_SaleValue', 'SaleValue', '`SaleValue`', '`SaleValue`', 131, 34, -1, false, '`SaleValue`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SaleValue->Sortable = true; // Allow sort
        $this->SaleValue->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SaleValue->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->SaleValue->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SaleValue->Param, "CustomMsg");
        $this->Fields['SaleValue'] = &$this->SaleValue;

        // PurRate
        $this->PurRate = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_PurRate', 'PurRate', '`PurRate`', '`PurRate`', 131, 30, -1, false, '`PurRate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PurRate->Sortable = true; // Allow sort
        $this->PurRate->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PurRate->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->PurRate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PurRate->Param, "CustomMsg");
        $this->Fields['PurRate'] = &$this->PurRate;

        // PurchaseCostValue
        $this->PurchaseCostValue = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_PurchaseCostValue', 'PurchaseCostValue', '`PurchaseCostValue`', '`PurchaseCostValue`', 131, 50, -1, false, '`PurchaseCostValue`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PurchaseCostValue->Sortable = false; // Allow sort
        $this->PurchaseCostValue->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PurchaseCostValue->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->PurchaseCostValue->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PurchaseCostValue->Param, "CustomMsg");
        $this->Fields['PurchaseCostValue'] = &$this->PurchaseCostValue;

        // MarginAmount
        $this->MarginAmount = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_MarginAmount', 'MarginAmount', '`MarginAmount`', '`MarginAmount`', 131, 51, -1, false, '`MarginAmount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MarginAmount->Sortable = false; // Allow sort
        $this->MarginAmount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->MarginAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->MarginAmount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MarginAmount->Param, "CustomMsg");
        $this->Fields['MarginAmount'] = &$this->MarginAmount;

        // MarginOnSale
        $this->MarginOnSale = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_MarginOnSale', 'MarginOnSale', '`MarginOnSale`', '`MarginOnSale`', 131, 60, -1, false, '`MarginOnSale`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MarginOnSale->Sortable = false; // Allow sort
        $this->MarginOnSale->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->MarginOnSale->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->MarginOnSale->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MarginOnSale->Param, "CustomMsg");
        $this->Fields['MarginOnSale'] = &$this->MarginOnSale;

        // MarginOnCost
        $this->MarginOnCost = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_MarginOnCost', 'MarginOnCost', '`MarginOnCost`', '`MarginOnCost`', 131, 65, -1, false, '`MarginOnCost`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MarginOnCost->Sortable = false; // Allow sort
        $this->MarginOnCost->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->MarginOnCost->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->MarginOnCost->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MarginOnCost->Param, "CustomMsg");
        $this->Fields['MarginOnCost'] = &$this->MarginOnCost;

        // PurchaseCostValue1
        $this->PurchaseCostValue1 = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_PurchaseCostValue1', 'PurchaseCostValue1', 'SaleQuantity*PurRate', 'SaleQuantity*PurRate', 131, 64, -1, false, 'SaleQuantity*PurRate', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PurchaseCostValue1->IsCustom = true; // Custom field
        $this->PurchaseCostValue1->Sortable = true; // Allow sort
        $this->PurchaseCostValue1->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PurchaseCostValue1->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->PurchaseCostValue1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PurchaseCostValue1->Param, "CustomMsg");
        $this->Fields['PurchaseCostValue1'] = &$this->PurchaseCostValue1;

        // MarginAmount1
        $this->MarginAmount1 = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_MarginAmount1', 'MarginAmount1', 'SaleValue-(SaleQuantity * PurRate)', 'SaleValue-(SaleQuantity * PurRate)', 131, 65, -1, false, 'SaleValue-(SaleQuantity * PurRate)', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MarginAmount1->IsCustom = true; // Custom field
        $this->MarginAmount1->Sortable = true; // Allow sort
        $this->MarginAmount1->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->MarginAmount1->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->MarginAmount1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MarginAmount1->Param, "CustomMsg");
        $this->Fields['MarginAmount1'] = &$this->MarginAmount1;

        // MarginOnSale1
        $this->MarginOnSale1 = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_MarginOnSale1', 'MarginOnSale1', '((SaleValue-(SaleQuantity * PurRate))/SaleValue)*100', '((SaleValue-(SaleQuantity * PurRate))/SaleValue)*100', 131, 65, -1, false, '((SaleValue-(SaleQuantity * PurRate))/SaleValue)*100', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MarginOnSale1->IsCustom = true; // Custom field
        $this->MarginOnSale1->Sortable = true; // Allow sort
        $this->MarginOnSale1->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->MarginOnSale1->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->MarginOnSale1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MarginOnSale1->Param, "CustomMsg");
        $this->Fields['MarginOnSale1'] = &$this->MarginOnSale1;

        // MarginOnCost1
        $this->MarginOnCost1 = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_MarginOnCost1', 'MarginOnCost1', '((SaleValue-(SaleQuantity * PurRate))/(SaleQuantity*PurRate ))*100', '((SaleValue-(SaleQuantity * PurRate))/(SaleQuantity*PurRate ))*100', 131, 65, -1, false, '((SaleValue-(SaleQuantity * PurRate))/(SaleQuantity*PurRate ))*100', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MarginOnCost1->IsCustom = true; // Custom field
        $this->MarginOnCost1->Sortable = true; // Allow sort
        $this->MarginOnCost1->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->MarginOnCost1->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->MarginOnCost1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MarginOnCost1->Param, "CustomMsg");
        $this->Fields['MarginOnCost1'] = &$this->MarginOnCost1;

        // Date
        $this->Date = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_Date', 'Date', '`Date`', CastDateFieldForLike("`Date`", 0, "DB"), 133, 10, 0, false, '`Date`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Date->Sortable = true; // Allow sort
        $this->Date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Date->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Date->Param, "CustomMsg");
        $this->Fields['Date'] = &$this->Date;

        // BRCODE
        $this->BRCODE = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_BRCODE', 'BRCODE', '`BRCODE`', '`BRCODE`', 3, 11, -1, false, '`BRCODE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BRCODE->Sortable = true; // Allow sort
        $this->BRCODE->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->BRCODE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BRCODE->Param, "CustomMsg");
        $this->Fields['BRCODE'] = &$this->BRCODE;

        // HosoID
        $this->HosoID = new DbField('view_pharmacy_report_earning', 'view_pharmacy_report_earning', 'x_HosoID', 'HosoID', '`HosoID`', '`HosoID`', 3, 11, -1, false, '`HosoID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_pharmacy_report_earning`";
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
        return $this->SqlSelect ?? $this->getQueryBuilder()->select("*, SaleQuantity*PurRate AS `PurchaseCostValue1`, SaleValue-(SaleQuantity * PurRate) AS `MarginAmount1`, ((SaleValue-(SaleQuantity * PurRate))/SaleValue)*100 AS `MarginOnSale1`, ((SaleValue-(SaleQuantity * PurRate))/(SaleQuantity*PurRate ))*100 AS `MarginOnCost1`");
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
        $this->DefaultFilter = "`HosoID`='".HospitalID()."'  and  `BRCODE`='".PharmacyID()."'";
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
        $this->ProductCode->DbValue = $row['ProductCode'];
        $this->ProductName->DbValue = $row['ProductName'];
        $this->SaleQuantity->DbValue = $row['SaleQuantity'];
        $this->RT->DbValue = $row['RT'];
        $this->SaleValue->DbValue = $row['SaleValue'];
        $this->PurRate->DbValue = $row['PurRate'];
        $this->PurchaseCostValue->DbValue = $row['PurchaseCostValue'];
        $this->MarginAmount->DbValue = $row['MarginAmount'];
        $this->MarginOnSale->DbValue = $row['MarginOnSale'];
        $this->MarginOnCost->DbValue = $row['MarginOnCost'];
        $this->PurchaseCostValue1->DbValue = $row['PurchaseCostValue1'];
        $this->MarginAmount1->DbValue = $row['MarginAmount1'];
        $this->MarginOnSale1->DbValue = $row['MarginOnSale1'];
        $this->MarginOnCost1->DbValue = $row['MarginOnCost1'];
        $this->Date->DbValue = $row['Date'];
        $this->BRCODE->DbValue = $row['BRCODE'];
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
        return $_SESSION[$name] ?? GetUrl("ViewPharmacyReportEarningList");
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
        if ($pageName == "ViewPharmacyReportEarningView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewPharmacyReportEarningEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewPharmacyReportEarningAdd") {
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
                return "ViewPharmacyReportEarningView";
            case Config("API_ADD_ACTION"):
                return "ViewPharmacyReportEarningAdd";
            case Config("API_EDIT_ACTION"):
                return "ViewPharmacyReportEarningEdit";
            case Config("API_DELETE_ACTION"):
                return "ViewPharmacyReportEarningDelete";
            case Config("API_LIST_ACTION"):
                return "ViewPharmacyReportEarningList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewPharmacyReportEarningList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewPharmacyReportEarningView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewPharmacyReportEarningView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewPharmacyReportEarningAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewPharmacyReportEarningAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewPharmacyReportEarningEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewPharmacyReportEarningAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewPharmacyReportEarningDelete", $this->getUrlParm());
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
        $this->ProductCode->setDbValue($row['ProductCode']);
        $this->ProductName->setDbValue($row['ProductName']);
        $this->SaleQuantity->setDbValue($row['SaleQuantity']);
        $this->RT->setDbValue($row['RT']);
        $this->SaleValue->setDbValue($row['SaleValue']);
        $this->PurRate->setDbValue($row['PurRate']);
        $this->PurchaseCostValue->setDbValue($row['PurchaseCostValue']);
        $this->MarginAmount->setDbValue($row['MarginAmount']);
        $this->MarginOnSale->setDbValue($row['MarginOnSale']);
        $this->MarginOnCost->setDbValue($row['MarginOnCost']);
        $this->PurchaseCostValue1->setDbValue($row['PurchaseCostValue1']);
        $this->MarginAmount1->setDbValue($row['MarginAmount1']);
        $this->MarginOnSale1->setDbValue($row['MarginOnSale1']);
        $this->MarginOnCost1->setDbValue($row['MarginOnCost1']);
        $this->Date->setDbValue($row['Date']);
        $this->BRCODE->setDbValue($row['BRCODE']);
        $this->HosoID->setDbValue($row['HosoID']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // ProductCode

        // ProductName

        // SaleQuantity

        // RT

        // SaleValue

        // PurRate

        // PurchaseCostValue

        // MarginAmount

        // MarginOnSale

        // MarginOnCost

        // PurchaseCostValue1

        // MarginAmount1

        // MarginOnSale1

        // MarginOnCost1

        // Date

        // BRCODE

        // HosoID

        // ProductCode
        $this->ProductCode->ViewValue = $this->ProductCode->CurrentValue;
        $this->ProductCode->ViewCustomAttributes = "";

        // ProductName
        $this->ProductName->ViewValue = $this->ProductName->CurrentValue;
        $this->ProductName->ViewCustomAttributes = "";

        // SaleQuantity
        $this->SaleQuantity->ViewValue = $this->SaleQuantity->CurrentValue;
        $this->SaleQuantity->ViewValue = FormatNumber($this->SaleQuantity->ViewValue, 2, -2, -2, -2);
        $this->SaleQuantity->ViewCustomAttributes = "";

        // RT
        $this->RT->ViewValue = $this->RT->CurrentValue;
        $this->RT->ViewValue = FormatNumber($this->RT->ViewValue, 2, -2, -2, -2);
        $this->RT->ViewCustomAttributes = "";

        // SaleValue
        $this->SaleValue->ViewValue = $this->SaleValue->CurrentValue;
        $this->SaleValue->ViewValue = FormatNumber($this->SaleValue->ViewValue, 2, -2, -2, -2);
        $this->SaleValue->ViewCustomAttributes = "";

        // PurRate
        $this->PurRate->ViewValue = $this->PurRate->CurrentValue;
        $this->PurRate->ViewValue = FormatNumber($this->PurRate->ViewValue, 2, -2, -2, -2);
        $this->PurRate->ViewCustomAttributes = "";

        // PurchaseCostValue
        $this->PurchaseCostValue->ViewValue = $this->PurchaseCostValue->CurrentValue;
        $this->PurchaseCostValue->ViewValue = FormatNumber($this->PurchaseCostValue->ViewValue, 2, -2, -2, -2);
        $this->PurchaseCostValue->ViewCustomAttributes = "";

        // MarginAmount
        $this->MarginAmount->ViewValue = $this->MarginAmount->CurrentValue;
        $this->MarginAmount->ViewValue = FormatNumber($this->MarginAmount->ViewValue, 2, -2, -2, -2);
        $this->MarginAmount->ViewCustomAttributes = "";

        // MarginOnSale
        $this->MarginOnSale->ViewValue = $this->MarginOnSale->CurrentValue;
        $this->MarginOnSale->ViewValue = FormatNumber($this->MarginOnSale->ViewValue, 2, -2, -2, -2);
        $this->MarginOnSale->ViewCustomAttributes = "";

        // MarginOnCost
        $this->MarginOnCost->ViewValue = $this->MarginOnCost->CurrentValue;
        $this->MarginOnCost->ViewValue = FormatNumber($this->MarginOnCost->ViewValue, 2, -2, -2, -2);
        $this->MarginOnCost->ViewCustomAttributes = "";

        // PurchaseCostValue1
        $this->PurchaseCostValue1->ViewValue = $this->PurchaseCostValue1->CurrentValue;
        $this->PurchaseCostValue1->ViewValue = FormatNumber($this->PurchaseCostValue1->ViewValue, 2, -2, -2, -2);
        $this->PurchaseCostValue1->ViewCustomAttributes = "";

        // MarginAmount1
        $this->MarginAmount1->ViewValue = $this->MarginAmount1->CurrentValue;
        $this->MarginAmount1->ViewValue = FormatNumber($this->MarginAmount1->ViewValue, 2, -2, -2, -2);
        $this->MarginAmount1->ViewCustomAttributes = "";

        // MarginOnSale1
        $this->MarginOnSale1->ViewValue = $this->MarginOnSale1->CurrentValue;
        $this->MarginOnSale1->ViewValue = FormatNumber($this->MarginOnSale1->ViewValue, 2, -2, -2, -2);
        $this->MarginOnSale1->ViewCustomAttributes = "";

        // MarginOnCost1
        $this->MarginOnCost1->ViewValue = $this->MarginOnCost1->CurrentValue;
        $this->MarginOnCost1->ViewValue = FormatNumber($this->MarginOnCost1->ViewValue, 2, -2, -2, -2);
        $this->MarginOnCost1->ViewCustomAttributes = "";

        // Date
        $this->Date->ViewValue = $this->Date->CurrentValue;
        $this->Date->ViewValue = FormatDateTime($this->Date->ViewValue, 0);
        $this->Date->ViewCustomAttributes = "";

        // BRCODE
        $this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
        $this->BRCODE->ViewValue = FormatNumber($this->BRCODE->ViewValue, 0, -2, -2, -2);
        $this->BRCODE->ViewCustomAttributes = "";

        // HosoID
        $this->HosoID->ViewValue = $this->HosoID->CurrentValue;
        $this->HosoID->ViewValue = FormatNumber($this->HosoID->ViewValue, 0, -2, -2, -2);
        $this->HosoID->ViewCustomAttributes = "";

        // ProductCode
        $this->ProductCode->LinkCustomAttributes = "";
        $this->ProductCode->HrefValue = "";
        $this->ProductCode->TooltipValue = "";

        // ProductName
        $this->ProductName->LinkCustomAttributes = "";
        $this->ProductName->HrefValue = "";
        $this->ProductName->TooltipValue = "";

        // SaleQuantity
        $this->SaleQuantity->LinkCustomAttributes = "";
        $this->SaleQuantity->HrefValue = "";
        $this->SaleQuantity->TooltipValue = "";

        // RT
        $this->RT->LinkCustomAttributes = "";
        $this->RT->HrefValue = "";
        $this->RT->TooltipValue = "";

        // SaleValue
        $this->SaleValue->LinkCustomAttributes = "";
        $this->SaleValue->HrefValue = "";
        $this->SaleValue->TooltipValue = "";

        // PurRate
        $this->PurRate->LinkCustomAttributes = "";
        $this->PurRate->HrefValue = "";
        $this->PurRate->TooltipValue = "";

        // PurchaseCostValue
        $this->PurchaseCostValue->LinkCustomAttributes = "";
        $this->PurchaseCostValue->HrefValue = "";
        $this->PurchaseCostValue->TooltipValue = "";

        // MarginAmount
        $this->MarginAmount->LinkCustomAttributes = "";
        $this->MarginAmount->HrefValue = "";
        $this->MarginAmount->TooltipValue = "";

        // MarginOnSale
        $this->MarginOnSale->LinkCustomAttributes = "";
        $this->MarginOnSale->HrefValue = "";
        $this->MarginOnSale->TooltipValue = "";

        // MarginOnCost
        $this->MarginOnCost->LinkCustomAttributes = "";
        $this->MarginOnCost->HrefValue = "";
        $this->MarginOnCost->TooltipValue = "";

        // PurchaseCostValue1
        $this->PurchaseCostValue1->LinkCustomAttributes = "";
        $this->PurchaseCostValue1->HrefValue = "";
        $this->PurchaseCostValue1->TooltipValue = "";

        // MarginAmount1
        $this->MarginAmount1->LinkCustomAttributes = "";
        $this->MarginAmount1->HrefValue = "";
        $this->MarginAmount1->TooltipValue = "";

        // MarginOnSale1
        $this->MarginOnSale1->LinkCustomAttributes = "";
        $this->MarginOnSale1->HrefValue = "";
        $this->MarginOnSale1->TooltipValue = "";

        // MarginOnCost1
        $this->MarginOnCost1->LinkCustomAttributes = "";
        $this->MarginOnCost1->HrefValue = "";
        $this->MarginOnCost1->TooltipValue = "";

        // Date
        $this->Date->LinkCustomAttributes = "";
        $this->Date->HrefValue = "";
        $this->Date->TooltipValue = "";

        // BRCODE
        $this->BRCODE->LinkCustomAttributes = "";
        $this->BRCODE->HrefValue = "";
        $this->BRCODE->TooltipValue = "";

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

        // ProductCode
        $this->ProductCode->EditAttrs["class"] = "form-control";
        $this->ProductCode->EditCustomAttributes = "";
        if (!$this->ProductCode->Raw) {
            $this->ProductCode->CurrentValue = HtmlDecode($this->ProductCode->CurrentValue);
        }
        $this->ProductCode->EditValue = $this->ProductCode->CurrentValue;
        $this->ProductCode->PlaceHolder = RemoveHtml($this->ProductCode->caption());

        // ProductName
        $this->ProductName->EditAttrs["class"] = "form-control";
        $this->ProductName->EditCustomAttributes = "";
        if (!$this->ProductName->Raw) {
            $this->ProductName->CurrentValue = HtmlDecode($this->ProductName->CurrentValue);
        }
        $this->ProductName->EditValue = $this->ProductName->CurrentValue;
        $this->ProductName->PlaceHolder = RemoveHtml($this->ProductName->caption());

        // SaleQuantity
        $this->SaleQuantity->EditAttrs["class"] = "form-control";
        $this->SaleQuantity->EditCustomAttributes = "";
        $this->SaleQuantity->EditValue = $this->SaleQuantity->CurrentValue;
        $this->SaleQuantity->PlaceHolder = RemoveHtml($this->SaleQuantity->caption());
        if (strval($this->SaleQuantity->EditValue) != "" && is_numeric($this->SaleQuantity->EditValue)) {
            $this->SaleQuantity->EditValue = FormatNumber($this->SaleQuantity->EditValue, -2, -2, -2, -2);
        }

        // RT
        $this->RT->EditAttrs["class"] = "form-control";
        $this->RT->EditCustomAttributes = "";
        $this->RT->EditValue = $this->RT->CurrentValue;
        $this->RT->PlaceHolder = RemoveHtml($this->RT->caption());
        if (strval($this->RT->EditValue) != "" && is_numeric($this->RT->EditValue)) {
            $this->RT->EditValue = FormatNumber($this->RT->EditValue, -2, -2, -2, -2);
        }

        // SaleValue
        $this->SaleValue->EditAttrs["class"] = "form-control";
        $this->SaleValue->EditCustomAttributes = "";
        $this->SaleValue->EditValue = $this->SaleValue->CurrentValue;
        $this->SaleValue->PlaceHolder = RemoveHtml($this->SaleValue->caption());
        if (strval($this->SaleValue->EditValue) != "" && is_numeric($this->SaleValue->EditValue)) {
            $this->SaleValue->EditValue = FormatNumber($this->SaleValue->EditValue, -2, -2, -2, -2);
        }

        // PurRate
        $this->PurRate->EditAttrs["class"] = "form-control";
        $this->PurRate->EditCustomAttributes = "";
        $this->PurRate->EditValue = $this->PurRate->CurrentValue;
        $this->PurRate->PlaceHolder = RemoveHtml($this->PurRate->caption());
        if (strval($this->PurRate->EditValue) != "" && is_numeric($this->PurRate->EditValue)) {
            $this->PurRate->EditValue = FormatNumber($this->PurRate->EditValue, -2, -2, -2, -2);
        }

        // PurchaseCostValue
        $this->PurchaseCostValue->EditAttrs["class"] = "form-control";
        $this->PurchaseCostValue->EditCustomAttributes = "";
        $this->PurchaseCostValue->EditValue = $this->PurchaseCostValue->CurrentValue;
        $this->PurchaseCostValue->PlaceHolder = RemoveHtml($this->PurchaseCostValue->caption());
        if (strval($this->PurchaseCostValue->EditValue) != "" && is_numeric($this->PurchaseCostValue->EditValue)) {
            $this->PurchaseCostValue->EditValue = FormatNumber($this->PurchaseCostValue->EditValue, -2, -2, -2, -2);
        }

        // MarginAmount
        $this->MarginAmount->EditAttrs["class"] = "form-control";
        $this->MarginAmount->EditCustomAttributes = "";
        $this->MarginAmount->EditValue = $this->MarginAmount->CurrentValue;
        $this->MarginAmount->PlaceHolder = RemoveHtml($this->MarginAmount->caption());
        if (strval($this->MarginAmount->EditValue) != "" && is_numeric($this->MarginAmount->EditValue)) {
            $this->MarginAmount->EditValue = FormatNumber($this->MarginAmount->EditValue, -2, -2, -2, -2);
        }

        // MarginOnSale
        $this->MarginOnSale->EditAttrs["class"] = "form-control";
        $this->MarginOnSale->EditCustomAttributes = "";
        $this->MarginOnSale->EditValue = $this->MarginOnSale->CurrentValue;
        $this->MarginOnSale->PlaceHolder = RemoveHtml($this->MarginOnSale->caption());
        if (strval($this->MarginOnSale->EditValue) != "" && is_numeric($this->MarginOnSale->EditValue)) {
            $this->MarginOnSale->EditValue = FormatNumber($this->MarginOnSale->EditValue, -2, -2, -2, -2);
        }

        // MarginOnCost
        $this->MarginOnCost->EditAttrs["class"] = "form-control";
        $this->MarginOnCost->EditCustomAttributes = "";
        $this->MarginOnCost->EditValue = $this->MarginOnCost->CurrentValue;
        $this->MarginOnCost->PlaceHolder = RemoveHtml($this->MarginOnCost->caption());
        if (strval($this->MarginOnCost->EditValue) != "" && is_numeric($this->MarginOnCost->EditValue)) {
            $this->MarginOnCost->EditValue = FormatNumber($this->MarginOnCost->EditValue, -2, -2, -2, -2);
        }

        // PurchaseCostValue1
        $this->PurchaseCostValue1->EditAttrs["class"] = "form-control";
        $this->PurchaseCostValue1->EditCustomAttributes = "";
        $this->PurchaseCostValue1->EditValue = $this->PurchaseCostValue1->CurrentValue;
        $this->PurchaseCostValue1->PlaceHolder = RemoveHtml($this->PurchaseCostValue1->caption());
        if (strval($this->PurchaseCostValue1->EditValue) != "" && is_numeric($this->PurchaseCostValue1->EditValue)) {
            $this->PurchaseCostValue1->EditValue = FormatNumber($this->PurchaseCostValue1->EditValue, -2, -2, -2, -2);
        }

        // MarginAmount1
        $this->MarginAmount1->EditAttrs["class"] = "form-control";
        $this->MarginAmount1->EditCustomAttributes = "";
        $this->MarginAmount1->EditValue = $this->MarginAmount1->CurrentValue;
        $this->MarginAmount1->PlaceHolder = RemoveHtml($this->MarginAmount1->caption());
        if (strval($this->MarginAmount1->EditValue) != "" && is_numeric($this->MarginAmount1->EditValue)) {
            $this->MarginAmount1->EditValue = FormatNumber($this->MarginAmount1->EditValue, -2, -2, -2, -2);
        }

        // MarginOnSale1
        $this->MarginOnSale1->EditAttrs["class"] = "form-control";
        $this->MarginOnSale1->EditCustomAttributes = "";
        $this->MarginOnSale1->EditValue = $this->MarginOnSale1->CurrentValue;
        $this->MarginOnSale1->PlaceHolder = RemoveHtml($this->MarginOnSale1->caption());
        if (strval($this->MarginOnSale1->EditValue) != "" && is_numeric($this->MarginOnSale1->EditValue)) {
            $this->MarginOnSale1->EditValue = FormatNumber($this->MarginOnSale1->EditValue, -2, -2, -2, -2);
        }

        // MarginOnCost1
        $this->MarginOnCost1->EditAttrs["class"] = "form-control";
        $this->MarginOnCost1->EditCustomAttributes = "";
        $this->MarginOnCost1->EditValue = $this->MarginOnCost1->CurrentValue;
        $this->MarginOnCost1->PlaceHolder = RemoveHtml($this->MarginOnCost1->caption());
        if (strval($this->MarginOnCost1->EditValue) != "" && is_numeric($this->MarginOnCost1->EditValue)) {
            $this->MarginOnCost1->EditValue = FormatNumber($this->MarginOnCost1->EditValue, -2, -2, -2, -2);
        }

        // Date
        $this->Date->EditAttrs["class"] = "form-control";
        $this->Date->EditCustomAttributes = "";
        $this->Date->EditValue = FormatDateTime($this->Date->CurrentValue, 8);
        $this->Date->PlaceHolder = RemoveHtml($this->Date->caption());

        // BRCODE
        $this->BRCODE->EditAttrs["class"] = "form-control";
        $this->BRCODE->EditCustomAttributes = "";
        $this->BRCODE->EditValue = $this->BRCODE->CurrentValue;
        $this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

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
            if (is_numeric($this->SaleValue->CurrentValue)) {
                $this->SaleValue->Total += $this->SaleValue->CurrentValue; // Accumulate total
            }
            if (is_numeric($this->PurchaseCostValue->CurrentValue)) {
                $this->PurchaseCostValue->Total += $this->PurchaseCostValue->CurrentValue; // Accumulate total
            }
            if (is_numeric($this->MarginAmount->CurrentValue)) {
                $this->MarginAmount->Total += $this->MarginAmount->CurrentValue; // Accumulate total
            }
            if (is_numeric($this->PurchaseCostValue1->CurrentValue)) {
                $this->PurchaseCostValue1->Total += $this->PurchaseCostValue1->CurrentValue; // Accumulate total
            }
            if (is_numeric($this->MarginAmount1->CurrentValue)) {
                $this->MarginAmount1->Total += $this->MarginAmount1->CurrentValue; // Accumulate total
            }
            if (is_numeric($this->MarginOnSale1->CurrentValue)) {
                $this->MarginOnSale1->Total += $this->MarginOnSale1->CurrentValue; // Accumulate total
            }
            if (is_numeric($this->MarginOnCost1->CurrentValue)) {
                $this->MarginOnCost1->Total += $this->MarginOnCost1->CurrentValue; // Accumulate total
            }
    }

    // Aggregate list row (for rendering)
    public function aggregateListRow()
    {
            $this->SaleValue->CurrentValue = $this->SaleValue->Total;
            $this->SaleValue->ViewValue = $this->SaleValue->CurrentValue;
            $this->SaleValue->ViewValue = FormatNumber($this->SaleValue->ViewValue, 2, -2, -2, -2);
            $this->SaleValue->ViewCustomAttributes = "";
            $this->SaleValue->HrefValue = ""; // Clear href value
            $this->PurchaseCostValue->CurrentValue = $this->PurchaseCostValue->Total;
            $this->PurchaseCostValue->ViewValue = $this->PurchaseCostValue->CurrentValue;
            $this->PurchaseCostValue->ViewValue = FormatNumber($this->PurchaseCostValue->ViewValue, 2, -2, -2, -2);
            $this->PurchaseCostValue->ViewCustomAttributes = "";
            $this->PurchaseCostValue->HrefValue = ""; // Clear href value
            $this->MarginAmount->CurrentValue = $this->MarginAmount->Total;
            $this->MarginAmount->ViewValue = $this->MarginAmount->CurrentValue;
            $this->MarginAmount->ViewValue = FormatNumber($this->MarginAmount->ViewValue, 2, -2, -2, -2);
            $this->MarginAmount->ViewCustomAttributes = "";
            $this->MarginAmount->HrefValue = ""; // Clear href value
            $this->PurchaseCostValue1->CurrentValue = $this->PurchaseCostValue1->Total;
            $this->PurchaseCostValue1->ViewValue = $this->PurchaseCostValue1->CurrentValue;
            $this->PurchaseCostValue1->ViewValue = FormatNumber($this->PurchaseCostValue1->ViewValue, 2, -2, -2, -2);
            $this->PurchaseCostValue1->ViewCustomAttributes = "";
            $this->PurchaseCostValue1->HrefValue = ""; // Clear href value
            $this->MarginAmount1->CurrentValue = $this->MarginAmount1->Total;
            $this->MarginAmount1->ViewValue = $this->MarginAmount1->CurrentValue;
            $this->MarginAmount1->ViewValue = FormatNumber($this->MarginAmount1->ViewValue, 2, -2, -2, -2);
            $this->MarginAmount1->ViewCustomAttributes = "";
            $this->MarginAmount1->HrefValue = ""; // Clear href value
            $this->MarginOnSale1->CurrentValue = $this->MarginOnSale1->Total;
            $this->MarginOnSale1->ViewValue = $this->MarginOnSale1->CurrentValue;
            $this->MarginOnSale1->ViewValue = FormatNumber($this->MarginOnSale1->ViewValue, 2, -2, -2, -2);
            $this->MarginOnSale1->ViewCustomAttributes = "";
            $this->MarginOnSale1->HrefValue = ""; // Clear href value
            $this->MarginOnCost1->CurrentValue = $this->MarginOnCost1->Total;
            $this->MarginOnCost1->ViewValue = $this->MarginOnCost1->CurrentValue;
            $this->MarginOnCost1->ViewValue = FormatNumber($this->MarginOnCost1->ViewValue, 2, -2, -2, -2);
            $this->MarginOnCost1->ViewCustomAttributes = "";
            $this->MarginOnCost1->HrefValue = ""; // Clear href value

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
                    $doc->exportCaption($this->ProductCode);
                    $doc->exportCaption($this->ProductName);
                    $doc->exportCaption($this->SaleQuantity);
                    $doc->exportCaption($this->RT);
                    $doc->exportCaption($this->SaleValue);
                    $doc->exportCaption($this->PurRate);
                    $doc->exportCaption($this->PurchaseCostValue);
                    $doc->exportCaption($this->MarginAmount);
                    $doc->exportCaption($this->MarginOnSale);
                    $doc->exportCaption($this->MarginOnCost);
                    $doc->exportCaption($this->PurchaseCostValue1);
                    $doc->exportCaption($this->MarginAmount1);
                    $doc->exportCaption($this->MarginOnSale1);
                    $doc->exportCaption($this->MarginOnCost1);
                    $doc->exportCaption($this->Date);
                    $doc->exportCaption($this->BRCODE);
                    $doc->exportCaption($this->HosoID);
                } else {
                    $doc->exportCaption($this->ProductCode);
                    $doc->exportCaption($this->ProductName);
                    $doc->exportCaption($this->SaleQuantity);
                    $doc->exportCaption($this->RT);
                    $doc->exportCaption($this->SaleValue);
                    $doc->exportCaption($this->PurRate);
                    $doc->exportCaption($this->PurchaseCostValue1);
                    $doc->exportCaption($this->MarginAmount1);
                    $doc->exportCaption($this->MarginOnSale1);
                    $doc->exportCaption($this->MarginOnCost1);
                    $doc->exportCaption($this->Date);
                    $doc->exportCaption($this->BRCODE);
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
                $this->aggregateListRowValues(); // Aggregate row values

                // Render row
                $this->RowType = ROWTYPE_VIEW; // Render view
                $this->resetAttributes();
                $this->renderListRow();
                if (!$doc->ExportCustom) {
                    $doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
                    if ($exportPageType == "view") {
                        $doc->exportField($this->ProductCode);
                        $doc->exportField($this->ProductName);
                        $doc->exportField($this->SaleQuantity);
                        $doc->exportField($this->RT);
                        $doc->exportField($this->SaleValue);
                        $doc->exportField($this->PurRate);
                        $doc->exportField($this->PurchaseCostValue);
                        $doc->exportField($this->MarginAmount);
                        $doc->exportField($this->MarginOnSale);
                        $doc->exportField($this->MarginOnCost);
                        $doc->exportField($this->PurchaseCostValue1);
                        $doc->exportField($this->MarginAmount1);
                        $doc->exportField($this->MarginOnSale1);
                        $doc->exportField($this->MarginOnCost1);
                        $doc->exportField($this->Date);
                        $doc->exportField($this->BRCODE);
                        $doc->exportField($this->HosoID);
                    } else {
                        $doc->exportField($this->ProductCode);
                        $doc->exportField($this->ProductName);
                        $doc->exportField($this->SaleQuantity);
                        $doc->exportField($this->RT);
                        $doc->exportField($this->SaleValue);
                        $doc->exportField($this->PurRate);
                        $doc->exportField($this->PurchaseCostValue1);
                        $doc->exportField($this->MarginAmount1);
                        $doc->exportField($this->MarginOnSale1);
                        $doc->exportField($this->MarginOnCost1);
                        $doc->exportField($this->Date);
                        $doc->exportField($this->BRCODE);
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

        // Export aggregates (horizontal format only)
        if ($doc->Horizontal) {
            $this->RowType = ROWTYPE_AGGREGATE;
            $this->resetAttributes();
            $this->aggregateListRow();
            if (!$doc->ExportCustom) {
                $doc->beginExportRow(-1);
                $doc->exportAggregate($this->ProductCode, '');
                $doc->exportAggregate($this->ProductName, '');
                $doc->exportAggregate($this->SaleQuantity, '');
                $doc->exportAggregate($this->RT, '');
                $doc->exportAggregate($this->SaleValue, 'TOTAL');
                $doc->exportAggregate($this->PurRate, '');
                $doc->exportAggregate($this->PurchaseCostValue1, 'TOTAL');
                $doc->exportAggregate($this->MarginAmount1, 'TOTAL');
                $doc->exportAggregate($this->MarginOnSale1, 'TOTAL');
                $doc->exportAggregate($this->MarginOnCost1, 'TOTAL');
                $doc->exportAggregate($this->Date, '');
                $doc->exportAggregate($this->BRCODE, '');
                $doc->exportAggregate($this->HosoID, '');
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
