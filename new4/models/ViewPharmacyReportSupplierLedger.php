<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_pharmacy_report_supplier_ledger
 */
class ViewPharmacyReportSupplierLedger extends DbTable
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
    public $Date;
    public $SupplierName;
    public $RefNo;
    public $Particulars;
    public $Debit;
    public $Credit;
    public $Balance;
    public $ClBalance;
    public $Pid;
    public $PaymentNo;
    public $HospID;
    public $BRCODE;
    public $IOrder;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'view_pharmacy_report_supplier_ledger';
        $this->TableName = 'view_pharmacy_report_supplier_ledger';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_pharmacy_report_supplier_ledger`";
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

        // Date
        $this->Date = new DbField('view_pharmacy_report_supplier_ledger', 'view_pharmacy_report_supplier_ledger', 'x_Date', 'Date', '`Date`', '`Date`', 200, 19, -1, false, '`Date`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Date->Sortable = true; // Allow sort
        $this->Date->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Date->Param, "CustomMsg");
        $this->Fields['Date'] = &$this->Date;

        // SupplierName
        $this->SupplierName = new DbField('view_pharmacy_report_supplier_ledger', 'view_pharmacy_report_supplier_ledger', 'x_SupplierName', 'SupplierName', '`SupplierName`', '`SupplierName`', 200, 45, -1, false, '`SupplierName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SupplierName->Sortable = true; // Allow sort
        $this->SupplierName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SupplierName->Param, "CustomMsg");
        $this->Fields['SupplierName'] = &$this->SupplierName;

        // RefNo
        $this->RefNo = new DbField('view_pharmacy_report_supplier_ledger', 'view_pharmacy_report_supplier_ledger', 'x_RefNo', 'RefNo', '`RefNo`', '`RefNo`', 200, 45, -1, false, '`RefNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RefNo->Sortable = true; // Allow sort
        $this->RefNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RefNo->Param, "CustomMsg");
        $this->Fields['RefNo'] = &$this->RefNo;

        // Particulars
        $this->Particulars = new DbField('view_pharmacy_report_supplier_ledger', 'view_pharmacy_report_supplier_ledger', 'x_Particulars', 'Particulars', '`Particulars`', '`Particulars`', 200, 141, -1, false, '`Particulars`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Particulars->Sortable = true; // Allow sort
        $this->Particulars->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Particulars->Param, "CustomMsg");
        $this->Fields['Particulars'] = &$this->Particulars;

        // Debit
        $this->Debit = new DbField('view_pharmacy_report_supplier_ledger', 'view_pharmacy_report_supplier_ledger', 'x_Debit', 'Debit', '`Debit`', '`Debit`', 200, 11, -1, false, '`Debit`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Debit->Sortable = true; // Allow sort
        $this->Debit->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Debit->Param, "CustomMsg");
        $this->Fields['Debit'] = &$this->Debit;

        // Credit
        $this->Credit = new DbField('view_pharmacy_report_supplier_ledger', 'view_pharmacy_report_supplier_ledger', 'x_Credit', 'Credit', '`Credit`', '`Credit`', 200, 34, -1, false, '`Credit`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Credit->Sortable = true; // Allow sort
        $this->Credit->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Credit->Param, "CustomMsg");
        $this->Fields['Credit'] = &$this->Credit;

        // Balance
        $this->Balance = new DbField('view_pharmacy_report_supplier_ledger', 'view_pharmacy_report_supplier_ledger', 'x_Balance', 'Balance', '`Balance`', '`Balance`', 200, 34, -1, false, '`Balance`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Balance->Sortable = true; // Allow sort
        $this->Balance->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Balance->Param, "CustomMsg");
        $this->Fields['Balance'] = &$this->Balance;

        // ClBalance
        $this->ClBalance = new DbField('view_pharmacy_report_supplier_ledger', 'view_pharmacy_report_supplier_ledger', 'x_ClBalance', 'ClBalance', '`ClBalance`', '`ClBalance`', 200, 34, -1, false, '`ClBalance`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ClBalance->Sortable = true; // Allow sort
        $this->ClBalance->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ClBalance->Param, "CustomMsg");
        $this->Fields['ClBalance'] = &$this->ClBalance;

        // Pid
        $this->Pid = new DbField('view_pharmacy_report_supplier_ledger', 'view_pharmacy_report_supplier_ledger', 'x_Pid', 'Pid', '`Pid`', '`Pid`', 3, 11, -1, false, '`Pid`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Pid->Sortable = true; // Allow sort
        $this->Pid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Pid->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Pid->Param, "CustomMsg");
        $this->Fields['Pid'] = &$this->Pid;

        // PaymentNo
        $this->PaymentNo = new DbField('view_pharmacy_report_supplier_ledger', 'view_pharmacy_report_supplier_ledger', 'x_PaymentNo', 'PaymentNo', '`PaymentNo`', '`PaymentNo`', 200, 45, -1, false, '`PaymentNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PaymentNo->Sortable = true; // Allow sort
        $this->PaymentNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PaymentNo->Param, "CustomMsg");
        $this->Fields['PaymentNo'] = &$this->PaymentNo;

        // HospID
        $this->HospID = new DbField('view_pharmacy_report_supplier_ledger', 'view_pharmacy_report_supplier_ledger', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = false; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->HospID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospID->Param, "CustomMsg");
        $this->Fields['HospID'] = &$this->HospID;

        // BRCODE
        $this->BRCODE = new DbField('view_pharmacy_report_supplier_ledger', 'view_pharmacy_report_supplier_ledger', 'x_BRCODE', 'BRCODE', '`BRCODE`', '`BRCODE`', 3, 11, -1, false, '`BRCODE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BRCODE->Sortable = false; // Allow sort
        $this->BRCODE->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->BRCODE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BRCODE->Param, "CustomMsg");
        $this->Fields['BRCODE'] = &$this->BRCODE;

        // IOrder
        $this->IOrder = new DbField('view_pharmacy_report_supplier_ledger', 'view_pharmacy_report_supplier_ledger', 'x_IOrder', 'IOrder', '`IOrder`', '`IOrder`', 200, 1, -1, false, '`IOrder`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IOrder->Nullable = false; // NOT NULL field
        $this->IOrder->Required = true; // Required field
        $this->IOrder->Sortable = true; // Allow sort
        $this->IOrder->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IOrder->Param, "CustomMsg");
        $this->Fields['IOrder'] = &$this->IOrder;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_pharmacy_report_supplier_ledger`";
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
        $this->Date->DbValue = $row['Date'];
        $this->SupplierName->DbValue = $row['SupplierName'];
        $this->RefNo->DbValue = $row['RefNo'];
        $this->Particulars->DbValue = $row['Particulars'];
        $this->Debit->DbValue = $row['Debit'];
        $this->Credit->DbValue = $row['Credit'];
        $this->Balance->DbValue = $row['Balance'];
        $this->ClBalance->DbValue = $row['ClBalance'];
        $this->Pid->DbValue = $row['Pid'];
        $this->PaymentNo->DbValue = $row['PaymentNo'];
        $this->HospID->DbValue = $row['HospID'];
        $this->BRCODE->DbValue = $row['BRCODE'];
        $this->IOrder->DbValue = $row['IOrder'];
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
        return $_SESSION[$name] ?? GetUrl("ViewPharmacyReportSupplierLedgerList");
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
        if ($pageName == "ViewPharmacyReportSupplierLedgerView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewPharmacyReportSupplierLedgerEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewPharmacyReportSupplierLedgerAdd") {
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
                return "ViewPharmacyReportSupplierLedgerView";
            case Config("API_ADD_ACTION"):
                return "ViewPharmacyReportSupplierLedgerAdd";
            case Config("API_EDIT_ACTION"):
                return "ViewPharmacyReportSupplierLedgerEdit";
            case Config("API_DELETE_ACTION"):
                return "ViewPharmacyReportSupplierLedgerDelete";
            case Config("API_LIST_ACTION"):
                return "ViewPharmacyReportSupplierLedgerList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewPharmacyReportSupplierLedgerList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewPharmacyReportSupplierLedgerView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewPharmacyReportSupplierLedgerView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewPharmacyReportSupplierLedgerAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewPharmacyReportSupplierLedgerAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewPharmacyReportSupplierLedgerEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewPharmacyReportSupplierLedgerAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewPharmacyReportSupplierLedgerDelete", $this->getUrlParm());
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
        $this->Date->setDbValue($row['Date']);
        $this->SupplierName->setDbValue($row['SupplierName']);
        $this->RefNo->setDbValue($row['RefNo']);
        $this->Particulars->setDbValue($row['Particulars']);
        $this->Debit->setDbValue($row['Debit']);
        $this->Credit->setDbValue($row['Credit']);
        $this->Balance->setDbValue($row['Balance']);
        $this->ClBalance->setDbValue($row['ClBalance']);
        $this->Pid->setDbValue($row['Pid']);
        $this->PaymentNo->setDbValue($row['PaymentNo']);
        $this->HospID->setDbValue($row['HospID']);
        $this->BRCODE->setDbValue($row['BRCODE']);
        $this->IOrder->setDbValue($row['IOrder']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // Date

        // SupplierName

        // RefNo

        // Particulars

        // Debit

        // Credit

        // Balance

        // ClBalance

        // Pid

        // PaymentNo

        // HospID

        // BRCODE

        // IOrder

        // Date
        $this->Date->ViewValue = $this->Date->CurrentValue;
        $this->Date->ViewCustomAttributes = "";

        // SupplierName
        $this->SupplierName->ViewValue = $this->SupplierName->CurrentValue;
        $this->SupplierName->ViewCustomAttributes = "";

        // RefNo
        $this->RefNo->ViewValue = $this->RefNo->CurrentValue;
        $this->RefNo->ViewCustomAttributes = "";

        // Particulars
        $this->Particulars->ViewValue = $this->Particulars->CurrentValue;
        $this->Particulars->ViewCustomAttributes = "";

        // Debit
        $this->Debit->ViewValue = $this->Debit->CurrentValue;
        $this->Debit->ViewCustomAttributes = "";

        // Credit
        $this->Credit->ViewValue = $this->Credit->CurrentValue;
        $this->Credit->ViewCustomAttributes = "";

        // Balance
        $this->Balance->ViewValue = $this->Balance->CurrentValue;
        $this->Balance->ViewCustomAttributes = "";

        // ClBalance
        $this->ClBalance->ViewValue = $this->ClBalance->CurrentValue;
        $this->ClBalance->ViewCustomAttributes = "";

        // Pid
        $this->Pid->ViewValue = $this->Pid->CurrentValue;
        $this->Pid->ViewValue = FormatNumber($this->Pid->ViewValue, 0, -2, -2, -2);
        $this->Pid->ViewCustomAttributes = "";

        // PaymentNo
        $this->PaymentNo->ViewValue = $this->PaymentNo->CurrentValue;
        $this->PaymentNo->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

        // BRCODE
        $this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
        $this->BRCODE->ViewValue = FormatNumber($this->BRCODE->ViewValue, 0, -2, -2, -2);
        $this->BRCODE->ViewCustomAttributes = "";

        // IOrder
        $this->IOrder->ViewValue = $this->IOrder->CurrentValue;
        $this->IOrder->ViewCustomAttributes = "";

        // Date
        $this->Date->LinkCustomAttributes = "";
        $this->Date->HrefValue = "";
        $this->Date->TooltipValue = "";

        // SupplierName
        $this->SupplierName->LinkCustomAttributes = "";
        $this->SupplierName->HrefValue = "";
        $this->SupplierName->TooltipValue = "";

        // RefNo
        $this->RefNo->LinkCustomAttributes = "";
        $this->RefNo->HrefValue = "";
        $this->RefNo->TooltipValue = "";

        // Particulars
        $this->Particulars->LinkCustomAttributes = "";
        $this->Particulars->HrefValue = "";
        $this->Particulars->TooltipValue = "";

        // Debit
        $this->Debit->LinkCustomAttributes = "";
        $this->Debit->HrefValue = "";
        $this->Debit->TooltipValue = "";

        // Credit
        $this->Credit->LinkCustomAttributes = "";
        $this->Credit->HrefValue = "";
        $this->Credit->TooltipValue = "";

        // Balance
        $this->Balance->LinkCustomAttributes = "";
        $this->Balance->HrefValue = "";
        $this->Balance->TooltipValue = "";

        // ClBalance
        $this->ClBalance->LinkCustomAttributes = "";
        $this->ClBalance->HrefValue = "";
        $this->ClBalance->TooltipValue = "";

        // Pid
        $this->Pid->LinkCustomAttributes = "";
        $this->Pid->HrefValue = "";
        $this->Pid->TooltipValue = "";

        // PaymentNo
        $this->PaymentNo->LinkCustomAttributes = "";
        $this->PaymentNo->HrefValue = "";
        $this->PaymentNo->TooltipValue = "";

        // HospID
        $this->HospID->LinkCustomAttributes = "";
        $this->HospID->HrefValue = "";
        $this->HospID->TooltipValue = "";

        // BRCODE
        $this->BRCODE->LinkCustomAttributes = "";
        $this->BRCODE->HrefValue = "";
        $this->BRCODE->TooltipValue = "";

        // IOrder
        $this->IOrder->LinkCustomAttributes = "";
        $this->IOrder->HrefValue = "";
        $this->IOrder->TooltipValue = "";

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

        // Date
        $this->Date->EditAttrs["class"] = "form-control";
        $this->Date->EditCustomAttributes = "";
        if (!$this->Date->Raw) {
            $this->Date->CurrentValue = HtmlDecode($this->Date->CurrentValue);
        }
        $this->Date->EditValue = $this->Date->CurrentValue;
        $this->Date->PlaceHolder = RemoveHtml($this->Date->caption());

        // SupplierName
        $this->SupplierName->EditAttrs["class"] = "form-control";
        $this->SupplierName->EditCustomAttributes = "";
        if (!$this->SupplierName->Raw) {
            $this->SupplierName->CurrentValue = HtmlDecode($this->SupplierName->CurrentValue);
        }
        $this->SupplierName->EditValue = $this->SupplierName->CurrentValue;
        $this->SupplierName->PlaceHolder = RemoveHtml($this->SupplierName->caption());

        // RefNo
        $this->RefNo->EditAttrs["class"] = "form-control";
        $this->RefNo->EditCustomAttributes = "";
        if (!$this->RefNo->Raw) {
            $this->RefNo->CurrentValue = HtmlDecode($this->RefNo->CurrentValue);
        }
        $this->RefNo->EditValue = $this->RefNo->CurrentValue;
        $this->RefNo->PlaceHolder = RemoveHtml($this->RefNo->caption());

        // Particulars
        $this->Particulars->EditAttrs["class"] = "form-control";
        $this->Particulars->EditCustomAttributes = "";
        if (!$this->Particulars->Raw) {
            $this->Particulars->CurrentValue = HtmlDecode($this->Particulars->CurrentValue);
        }
        $this->Particulars->EditValue = $this->Particulars->CurrentValue;
        $this->Particulars->PlaceHolder = RemoveHtml($this->Particulars->caption());

        // Debit
        $this->Debit->EditAttrs["class"] = "form-control";
        $this->Debit->EditCustomAttributes = "";
        if (!$this->Debit->Raw) {
            $this->Debit->CurrentValue = HtmlDecode($this->Debit->CurrentValue);
        }
        $this->Debit->EditValue = $this->Debit->CurrentValue;
        $this->Debit->PlaceHolder = RemoveHtml($this->Debit->caption());

        // Credit
        $this->Credit->EditAttrs["class"] = "form-control";
        $this->Credit->EditCustomAttributes = "";
        if (!$this->Credit->Raw) {
            $this->Credit->CurrentValue = HtmlDecode($this->Credit->CurrentValue);
        }
        $this->Credit->EditValue = $this->Credit->CurrentValue;
        $this->Credit->PlaceHolder = RemoveHtml($this->Credit->caption());

        // Balance
        $this->Balance->EditAttrs["class"] = "form-control";
        $this->Balance->EditCustomAttributes = "";
        if (!$this->Balance->Raw) {
            $this->Balance->CurrentValue = HtmlDecode($this->Balance->CurrentValue);
        }
        $this->Balance->EditValue = $this->Balance->CurrentValue;
        $this->Balance->PlaceHolder = RemoveHtml($this->Balance->caption());

        // ClBalance
        $this->ClBalance->EditAttrs["class"] = "form-control";
        $this->ClBalance->EditCustomAttributes = "";
        if (!$this->ClBalance->Raw) {
            $this->ClBalance->CurrentValue = HtmlDecode($this->ClBalance->CurrentValue);
        }
        $this->ClBalance->EditValue = $this->ClBalance->CurrentValue;
        $this->ClBalance->PlaceHolder = RemoveHtml($this->ClBalance->caption());

        // Pid
        $this->Pid->EditAttrs["class"] = "form-control";
        $this->Pid->EditCustomAttributes = "";
        $this->Pid->EditValue = $this->Pid->CurrentValue;
        $this->Pid->PlaceHolder = RemoveHtml($this->Pid->caption());

        // PaymentNo
        $this->PaymentNo->EditAttrs["class"] = "form-control";
        $this->PaymentNo->EditCustomAttributes = "";
        if (!$this->PaymentNo->Raw) {
            $this->PaymentNo->CurrentValue = HtmlDecode($this->PaymentNo->CurrentValue);
        }
        $this->PaymentNo->EditValue = $this->PaymentNo->CurrentValue;
        $this->PaymentNo->PlaceHolder = RemoveHtml($this->PaymentNo->caption());

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

        // IOrder
        $this->IOrder->EditAttrs["class"] = "form-control";
        $this->IOrder->EditCustomAttributes = "";
        if (!$this->IOrder->Raw) {
            $this->IOrder->CurrentValue = HtmlDecode($this->IOrder->CurrentValue);
        }
        $this->IOrder->EditValue = $this->IOrder->CurrentValue;
        $this->IOrder->PlaceHolder = RemoveHtml($this->IOrder->caption());

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
                    $doc->exportCaption($this->Date);
                    $doc->exportCaption($this->SupplierName);
                    $doc->exportCaption($this->RefNo);
                    $doc->exportCaption($this->Particulars);
                    $doc->exportCaption($this->Debit);
                    $doc->exportCaption($this->Credit);
                    $doc->exportCaption($this->Balance);
                    $doc->exportCaption($this->ClBalance);
                    $doc->exportCaption($this->Pid);
                    $doc->exportCaption($this->PaymentNo);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->BRCODE);
                    $doc->exportCaption($this->IOrder);
                } else {
                    $doc->exportCaption($this->Date);
                    $doc->exportCaption($this->SupplierName);
                    $doc->exportCaption($this->RefNo);
                    $doc->exportCaption($this->Particulars);
                    $doc->exportCaption($this->Debit);
                    $doc->exportCaption($this->Credit);
                    $doc->exportCaption($this->Balance);
                    $doc->exportCaption($this->ClBalance);
                    $doc->exportCaption($this->Pid);
                    $doc->exportCaption($this->PaymentNo);
                    $doc->exportCaption($this->IOrder);
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
                        $doc->exportField($this->Date);
                        $doc->exportField($this->SupplierName);
                        $doc->exportField($this->RefNo);
                        $doc->exportField($this->Particulars);
                        $doc->exportField($this->Debit);
                        $doc->exportField($this->Credit);
                        $doc->exportField($this->Balance);
                        $doc->exportField($this->ClBalance);
                        $doc->exportField($this->Pid);
                        $doc->exportField($this->PaymentNo);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->BRCODE);
                        $doc->exportField($this->IOrder);
                    } else {
                        $doc->exportField($this->Date);
                        $doc->exportField($this->SupplierName);
                        $doc->exportField($this->RefNo);
                        $doc->exportField($this->Particulars);
                        $doc->exportField($this->Debit);
                        $doc->exportField($this->Credit);
                        $doc->exportField($this->Balance);
                        $doc->exportField($this->ClBalance);
                        $doc->exportField($this->Pid);
                        $doc->exportField($this->PaymentNo);
                        $doc->exportField($this->IOrder);
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
