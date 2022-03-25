<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_bill_collection_summary
 */
class ViewBillCollectionSummary extends DbTable
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
    public $createddate;
    public $_UserName;
    public $CARD;
    public $CASH;
    public $NEFT;
    public $PAYTM;
    public $CHEQUE;
    public $RTGS;
    public $NotSelected;
    public $REFUND;
    public $CANCEL;
    public $Total;
    public $HospID;
    public $BillType;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'view_bill_collection_summary';
        $this->TableName = 'view_bill_collection_summary';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_bill_collection_summary`";
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

        // createddate
        $this->createddate = new DbField('view_bill_collection_summary', 'view_bill_collection_summary', 'x_createddate', 'createddate', '`createddate`', CastDateFieldForLike("`createddate`", 0, "DB"), 133, 10, 0, false, '`createddate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddate->Sortable = true; // Allow sort
        $this->createddate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['createddate'] = &$this->createddate;

        // UserName
        $this->_UserName = new DbField('view_bill_collection_summary', 'view_bill_collection_summary', 'x__UserName', 'UserName', '`UserName`', '`UserName`', 200, 45, -1, false, '`UserName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->_UserName->Sortable = true; // Allow sort
        $this->Fields['UserName'] = &$this->_UserName;

        // CARD
        $this->CARD = new DbField('view_bill_collection_summary', 'view_bill_collection_summary', 'x_CARD', 'CARD', '`CARD`', '`CARD`', 131, 56, -1, false, '`CARD`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CARD->Sortable = true; // Allow sort
        $this->CARD->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->CARD->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['CARD'] = &$this->CARD;

        // CASH
        $this->CASH = new DbField('view_bill_collection_summary', 'view_bill_collection_summary', 'x_CASH', 'CASH', '`CASH`', '`CASH`', 131, 56, -1, false, '`CASH`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CASH->Sortable = true; // Allow sort
        $this->CASH->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->CASH->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['CASH'] = &$this->CASH;

        // NEFT
        $this->NEFT = new DbField('view_bill_collection_summary', 'view_bill_collection_summary', 'x_NEFT', 'NEFT', '`NEFT`', '`NEFT`', 131, 56, -1, false, '`NEFT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NEFT->Sortable = true; // Allow sort
        $this->NEFT->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->NEFT->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['NEFT'] = &$this->NEFT;

        // PAYTM
        $this->PAYTM = new DbField('view_bill_collection_summary', 'view_bill_collection_summary', 'x_PAYTM', 'PAYTM', '`PAYTM`', '`PAYTM`', 131, 56, -1, false, '`PAYTM`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PAYTM->Sortable = true; // Allow sort
        $this->PAYTM->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PAYTM->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['PAYTM'] = &$this->PAYTM;

        // CHEQUE
        $this->CHEQUE = new DbField('view_bill_collection_summary', 'view_bill_collection_summary', 'x_CHEQUE', 'CHEQUE', '`CHEQUE`', '`CHEQUE`', 131, 56, -1, false, '`CHEQUE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CHEQUE->Sortable = true; // Allow sort
        $this->CHEQUE->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->CHEQUE->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['CHEQUE'] = &$this->CHEQUE;

        // RTGS
        $this->RTGS = new DbField('view_bill_collection_summary', 'view_bill_collection_summary', 'x_RTGS', 'RTGS', '`RTGS`', '`RTGS`', 131, 56, -1, false, '`RTGS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RTGS->Sortable = true; // Allow sort
        $this->RTGS->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->RTGS->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['RTGS'] = &$this->RTGS;

        // NotSelected
        $this->NotSelected = new DbField('view_bill_collection_summary', 'view_bill_collection_summary', 'x_NotSelected', 'NotSelected', '`NotSelected`', '`NotSelected`', 131, 56, -1, false, '`NotSelected`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NotSelected->Sortable = true; // Allow sort
        $this->NotSelected->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->NotSelected->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['NotSelected'] = &$this->NotSelected;

        // REFUND
        $this->REFUND = new DbField('view_bill_collection_summary', 'view_bill_collection_summary', 'x_REFUND', 'REFUND', '`REFUND`', '`REFUND`', 131, 56, -1, false, '`REFUND`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->REFUND->Sortable = true; // Allow sort
        $this->REFUND->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->REFUND->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['REFUND'] = &$this->REFUND;

        // CANCEL
        $this->CANCEL = new DbField('view_bill_collection_summary', 'view_bill_collection_summary', 'x_CANCEL', 'CANCEL', '`CANCEL`', '`CANCEL`', 131, 56, -1, false, '`CANCEL`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CANCEL->Sortable = true; // Allow sort
        $this->CANCEL->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->CANCEL->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['CANCEL'] = &$this->CANCEL;

        // Total
        $this->Total = new DbField('view_bill_collection_summary', 'view_bill_collection_summary', 'x_Total', 'Total', '`Total`', '`Total`', 131, 56, -1, false, '`Total`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Total->Sortable = true; // Allow sort
        $this->Total->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Total->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['Total'] = &$this->Total;

        // HospID
        $this->HospID = new DbField('view_bill_collection_summary', 'view_bill_collection_summary', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['HospID'] = &$this->HospID;

        // BillType
        $this->BillType = new DbField('view_bill_collection_summary', 'view_bill_collection_summary', 'x_BillType', 'BillType', '`BillType`', '`BillType`', 200, 8, -1, false, '`BillType`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BillType->Nullable = false; // NOT NULL field
        $this->BillType->Required = true; // Required field
        $this->BillType->Sortable = true; // Allow sort
        $this->Fields['BillType'] = &$this->BillType;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_bill_collection_summary`";
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
        $this->createddate->DbValue = $row['createddate'];
        $this->_UserName->DbValue = $row['UserName'];
        $this->CARD->DbValue = $row['CARD'];
        $this->CASH->DbValue = $row['CASH'];
        $this->NEFT->DbValue = $row['NEFT'];
        $this->PAYTM->DbValue = $row['PAYTM'];
        $this->CHEQUE->DbValue = $row['CHEQUE'];
        $this->RTGS->DbValue = $row['RTGS'];
        $this->NotSelected->DbValue = $row['NotSelected'];
        $this->REFUND->DbValue = $row['REFUND'];
        $this->CANCEL->DbValue = $row['CANCEL'];
        $this->Total->DbValue = $row['Total'];
        $this->HospID->DbValue = $row['HospID'];
        $this->BillType->DbValue = $row['BillType'];
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
            return GetUrl("ViewBillCollectionSummaryList");
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
        if ($pageName == "ViewBillCollectionSummaryView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewBillCollectionSummaryEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewBillCollectionSummaryAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewBillCollectionSummaryList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewBillCollectionSummaryView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewBillCollectionSummaryView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewBillCollectionSummaryAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewBillCollectionSummaryAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewBillCollectionSummaryEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewBillCollectionSummaryAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewBillCollectionSummaryDelete", $this->getUrlParm());
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
        $this->createddate->setDbValue($row['createddate']);
        $this->_UserName->setDbValue($row['UserName']);
        $this->CARD->setDbValue($row['CARD']);
        $this->CASH->setDbValue($row['CASH']);
        $this->NEFT->setDbValue($row['NEFT']);
        $this->PAYTM->setDbValue($row['PAYTM']);
        $this->CHEQUE->setDbValue($row['CHEQUE']);
        $this->RTGS->setDbValue($row['RTGS']);
        $this->NotSelected->setDbValue($row['NotSelected']);
        $this->REFUND->setDbValue($row['REFUND']);
        $this->CANCEL->setDbValue($row['CANCEL']);
        $this->Total->setDbValue($row['Total']);
        $this->HospID->setDbValue($row['HospID']);
        $this->BillType->setDbValue($row['BillType']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // createddate

        // UserName

        // CARD

        // CASH

        // NEFT

        // PAYTM

        // CHEQUE

        // RTGS

        // NotSelected

        // REFUND

        // CANCEL

        // Total

        // HospID

        // BillType

        // createddate
        $this->createddate->ViewValue = $this->createddate->CurrentValue;
        $this->createddate->ViewValue = FormatDateTime($this->createddate->ViewValue, 0);
        $this->createddate->ViewCustomAttributes = "";

        // UserName
        $this->_UserName->ViewValue = $this->_UserName->CurrentValue;
        $this->_UserName->ViewCustomAttributes = "";

        // CARD
        $this->CARD->ViewValue = $this->CARD->CurrentValue;
        $this->CARD->ViewValue = FormatNumber($this->CARD->ViewValue, 2, -2, -2, -2);
        $this->CARD->ViewCustomAttributes = "";

        // CASH
        $this->CASH->ViewValue = $this->CASH->CurrentValue;
        $this->CASH->ViewValue = FormatNumber($this->CASH->ViewValue, 2, -2, -2, -2);
        $this->CASH->ViewCustomAttributes = "";

        // NEFT
        $this->NEFT->ViewValue = $this->NEFT->CurrentValue;
        $this->NEFT->ViewValue = FormatNumber($this->NEFT->ViewValue, 2, -2, -2, -2);
        $this->NEFT->ViewCustomAttributes = "";

        // PAYTM
        $this->PAYTM->ViewValue = $this->PAYTM->CurrentValue;
        $this->PAYTM->ViewValue = FormatNumber($this->PAYTM->ViewValue, 2, -2, -2, -2);
        $this->PAYTM->ViewCustomAttributes = "";

        // CHEQUE
        $this->CHEQUE->ViewValue = $this->CHEQUE->CurrentValue;
        $this->CHEQUE->ViewValue = FormatNumber($this->CHEQUE->ViewValue, 2, -2, -2, -2);
        $this->CHEQUE->ViewCustomAttributes = "";

        // RTGS
        $this->RTGS->ViewValue = $this->RTGS->CurrentValue;
        $this->RTGS->ViewValue = FormatNumber($this->RTGS->ViewValue, 2, -2, -2, -2);
        $this->RTGS->ViewCustomAttributes = "";

        // NotSelected
        $this->NotSelected->ViewValue = $this->NotSelected->CurrentValue;
        $this->NotSelected->ViewValue = FormatNumber($this->NotSelected->ViewValue, 2, -2, -2, -2);
        $this->NotSelected->ViewCustomAttributes = "";

        // REFUND
        $this->REFUND->ViewValue = $this->REFUND->CurrentValue;
        $this->REFUND->ViewValue = FormatNumber($this->REFUND->ViewValue, 2, -2, -2, -2);
        $this->REFUND->ViewCustomAttributes = "";

        // CANCEL
        $this->CANCEL->ViewValue = $this->CANCEL->CurrentValue;
        $this->CANCEL->ViewValue = FormatNumber($this->CANCEL->ViewValue, 2, -2, -2, -2);
        $this->CANCEL->ViewCustomAttributes = "";

        // Total
        $this->Total->ViewValue = $this->Total->CurrentValue;
        $this->Total->ViewValue = FormatNumber($this->Total->ViewValue, 2, -2, -2, -2);
        $this->Total->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

        // BillType
        $this->BillType->ViewValue = $this->BillType->CurrentValue;
        $this->BillType->ViewCustomAttributes = "";

        // createddate
        $this->createddate->LinkCustomAttributes = "";
        $this->createddate->HrefValue = "";
        $this->createddate->TooltipValue = "";

        // UserName
        $this->_UserName->LinkCustomAttributes = "";
        $this->_UserName->HrefValue = "";
        $this->_UserName->TooltipValue = "";

        // CARD
        $this->CARD->LinkCustomAttributes = "";
        $this->CARD->HrefValue = "";
        $this->CARD->TooltipValue = "";

        // CASH
        $this->CASH->LinkCustomAttributes = "";
        $this->CASH->HrefValue = "";
        $this->CASH->TooltipValue = "";

        // NEFT
        $this->NEFT->LinkCustomAttributes = "";
        $this->NEFT->HrefValue = "";
        $this->NEFT->TooltipValue = "";

        // PAYTM
        $this->PAYTM->LinkCustomAttributes = "";
        $this->PAYTM->HrefValue = "";
        $this->PAYTM->TooltipValue = "";

        // CHEQUE
        $this->CHEQUE->LinkCustomAttributes = "";
        $this->CHEQUE->HrefValue = "";
        $this->CHEQUE->TooltipValue = "";

        // RTGS
        $this->RTGS->LinkCustomAttributes = "";
        $this->RTGS->HrefValue = "";
        $this->RTGS->TooltipValue = "";

        // NotSelected
        $this->NotSelected->LinkCustomAttributes = "";
        $this->NotSelected->HrefValue = "";
        $this->NotSelected->TooltipValue = "";

        // REFUND
        $this->REFUND->LinkCustomAttributes = "";
        $this->REFUND->HrefValue = "";
        $this->REFUND->TooltipValue = "";

        // CANCEL
        $this->CANCEL->LinkCustomAttributes = "";
        $this->CANCEL->HrefValue = "";
        $this->CANCEL->TooltipValue = "";

        // Total
        $this->Total->LinkCustomAttributes = "";
        $this->Total->HrefValue = "";
        $this->Total->TooltipValue = "";

        // HospID
        $this->HospID->LinkCustomAttributes = "";
        $this->HospID->HrefValue = "";
        $this->HospID->TooltipValue = "";

        // BillType
        $this->BillType->LinkCustomAttributes = "";
        $this->BillType->HrefValue = "";
        $this->BillType->TooltipValue = "";

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

        // createddate
        $this->createddate->EditAttrs["class"] = "form-control";
        $this->createddate->EditCustomAttributes = "";
        $this->createddate->EditValue = FormatDateTime($this->createddate->CurrentValue, 8);
        $this->createddate->PlaceHolder = RemoveHtml($this->createddate->caption());

        // UserName
        $this->_UserName->EditAttrs["class"] = "form-control";
        $this->_UserName->EditCustomAttributes = "";
        if (!$this->_UserName->Raw) {
            $this->_UserName->CurrentValue = HtmlDecode($this->_UserName->CurrentValue);
        }
        $this->_UserName->EditValue = $this->_UserName->CurrentValue;
        $this->_UserName->PlaceHolder = RemoveHtml($this->_UserName->caption());

        // CARD
        $this->CARD->EditAttrs["class"] = "form-control";
        $this->CARD->EditCustomAttributes = "";
        $this->CARD->EditValue = $this->CARD->CurrentValue;
        $this->CARD->PlaceHolder = RemoveHtml($this->CARD->caption());
        if (strval($this->CARD->EditValue) != "" && is_numeric($this->CARD->EditValue)) {
            $this->CARD->EditValue = FormatNumber($this->CARD->EditValue, -2, -2, -2, -2);
        }

        // CASH
        $this->CASH->EditAttrs["class"] = "form-control";
        $this->CASH->EditCustomAttributes = "";
        $this->CASH->EditValue = $this->CASH->CurrentValue;
        $this->CASH->PlaceHolder = RemoveHtml($this->CASH->caption());
        if (strval($this->CASH->EditValue) != "" && is_numeric($this->CASH->EditValue)) {
            $this->CASH->EditValue = FormatNumber($this->CASH->EditValue, -2, -2, -2, -2);
        }

        // NEFT
        $this->NEFT->EditAttrs["class"] = "form-control";
        $this->NEFT->EditCustomAttributes = "";
        $this->NEFT->EditValue = $this->NEFT->CurrentValue;
        $this->NEFT->PlaceHolder = RemoveHtml($this->NEFT->caption());
        if (strval($this->NEFT->EditValue) != "" && is_numeric($this->NEFT->EditValue)) {
            $this->NEFT->EditValue = FormatNumber($this->NEFT->EditValue, -2, -2, -2, -2);
        }

        // PAYTM
        $this->PAYTM->EditAttrs["class"] = "form-control";
        $this->PAYTM->EditCustomAttributes = "";
        $this->PAYTM->EditValue = $this->PAYTM->CurrentValue;
        $this->PAYTM->PlaceHolder = RemoveHtml($this->PAYTM->caption());
        if (strval($this->PAYTM->EditValue) != "" && is_numeric($this->PAYTM->EditValue)) {
            $this->PAYTM->EditValue = FormatNumber($this->PAYTM->EditValue, -2, -2, -2, -2);
        }

        // CHEQUE
        $this->CHEQUE->EditAttrs["class"] = "form-control";
        $this->CHEQUE->EditCustomAttributes = "";
        $this->CHEQUE->EditValue = $this->CHEQUE->CurrentValue;
        $this->CHEQUE->PlaceHolder = RemoveHtml($this->CHEQUE->caption());
        if (strval($this->CHEQUE->EditValue) != "" && is_numeric($this->CHEQUE->EditValue)) {
            $this->CHEQUE->EditValue = FormatNumber($this->CHEQUE->EditValue, -2, -2, -2, -2);
        }

        // RTGS
        $this->RTGS->EditAttrs["class"] = "form-control";
        $this->RTGS->EditCustomAttributes = "";
        $this->RTGS->EditValue = $this->RTGS->CurrentValue;
        $this->RTGS->PlaceHolder = RemoveHtml($this->RTGS->caption());
        if (strval($this->RTGS->EditValue) != "" && is_numeric($this->RTGS->EditValue)) {
            $this->RTGS->EditValue = FormatNumber($this->RTGS->EditValue, -2, -2, -2, -2);
        }

        // NotSelected
        $this->NotSelected->EditAttrs["class"] = "form-control";
        $this->NotSelected->EditCustomAttributes = "";
        $this->NotSelected->EditValue = $this->NotSelected->CurrentValue;
        $this->NotSelected->PlaceHolder = RemoveHtml($this->NotSelected->caption());
        if (strval($this->NotSelected->EditValue) != "" && is_numeric($this->NotSelected->EditValue)) {
            $this->NotSelected->EditValue = FormatNumber($this->NotSelected->EditValue, -2, -2, -2, -2);
        }

        // REFUND
        $this->REFUND->EditAttrs["class"] = "form-control";
        $this->REFUND->EditCustomAttributes = "";
        $this->REFUND->EditValue = $this->REFUND->CurrentValue;
        $this->REFUND->PlaceHolder = RemoveHtml($this->REFUND->caption());
        if (strval($this->REFUND->EditValue) != "" && is_numeric($this->REFUND->EditValue)) {
            $this->REFUND->EditValue = FormatNumber($this->REFUND->EditValue, -2, -2, -2, -2);
        }

        // CANCEL
        $this->CANCEL->EditAttrs["class"] = "form-control";
        $this->CANCEL->EditCustomAttributes = "";
        $this->CANCEL->EditValue = $this->CANCEL->CurrentValue;
        $this->CANCEL->PlaceHolder = RemoveHtml($this->CANCEL->caption());
        if (strval($this->CANCEL->EditValue) != "" && is_numeric($this->CANCEL->EditValue)) {
            $this->CANCEL->EditValue = FormatNumber($this->CANCEL->EditValue, -2, -2, -2, -2);
        }

        // Total
        $this->Total->EditAttrs["class"] = "form-control";
        $this->Total->EditCustomAttributes = "";
        $this->Total->EditValue = $this->Total->CurrentValue;
        $this->Total->PlaceHolder = RemoveHtml($this->Total->caption());
        if (strval($this->Total->EditValue) != "" && is_numeric($this->Total->EditValue)) {
            $this->Total->EditValue = FormatNumber($this->Total->EditValue, -2, -2, -2, -2);
        }

        // HospID
        $this->HospID->EditAttrs["class"] = "form-control";
        $this->HospID->EditCustomAttributes = "";
        $this->HospID->EditValue = $this->HospID->CurrentValue;
        $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

        // BillType
        $this->BillType->EditAttrs["class"] = "form-control";
        $this->BillType->EditCustomAttributes = "";
        if (!$this->BillType->Raw) {
            $this->BillType->CurrentValue = HtmlDecode($this->BillType->CurrentValue);
        }
        $this->BillType->EditValue = $this->BillType->CurrentValue;
        $this->BillType->PlaceHolder = RemoveHtml($this->BillType->caption());

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
                    $doc->exportCaption($this->createddate);
                    $doc->exportCaption($this->_UserName);
                    $doc->exportCaption($this->CARD);
                    $doc->exportCaption($this->CASH);
                    $doc->exportCaption($this->NEFT);
                    $doc->exportCaption($this->PAYTM);
                    $doc->exportCaption($this->CHEQUE);
                    $doc->exportCaption($this->RTGS);
                    $doc->exportCaption($this->NotSelected);
                    $doc->exportCaption($this->REFUND);
                    $doc->exportCaption($this->CANCEL);
                    $doc->exportCaption($this->Total);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->BillType);
                } else {
                    $doc->exportCaption($this->createddate);
                    $doc->exportCaption($this->_UserName);
                    $doc->exportCaption($this->CARD);
                    $doc->exportCaption($this->CASH);
                    $doc->exportCaption($this->NEFT);
                    $doc->exportCaption($this->PAYTM);
                    $doc->exportCaption($this->CHEQUE);
                    $doc->exportCaption($this->RTGS);
                    $doc->exportCaption($this->NotSelected);
                    $doc->exportCaption($this->REFUND);
                    $doc->exportCaption($this->CANCEL);
                    $doc->exportCaption($this->Total);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->BillType);
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
                        $doc->exportField($this->createddate);
                        $doc->exportField($this->_UserName);
                        $doc->exportField($this->CARD);
                        $doc->exportField($this->CASH);
                        $doc->exportField($this->NEFT);
                        $doc->exportField($this->PAYTM);
                        $doc->exportField($this->CHEQUE);
                        $doc->exportField($this->RTGS);
                        $doc->exportField($this->NotSelected);
                        $doc->exportField($this->REFUND);
                        $doc->exportField($this->CANCEL);
                        $doc->exportField($this->Total);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->BillType);
                    } else {
                        $doc->exportField($this->createddate);
                        $doc->exportField($this->_UserName);
                        $doc->exportField($this->CARD);
                        $doc->exportField($this->CASH);
                        $doc->exportField($this->NEFT);
                        $doc->exportField($this->PAYTM);
                        $doc->exportField($this->CHEQUE);
                        $doc->exportField($this->RTGS);
                        $doc->exportField($this->NotSelected);
                        $doc->exportField($this->REFUND);
                        $doc->exportField($this->CANCEL);
                        $doc->exportField($this->Total);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->BillType);
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
