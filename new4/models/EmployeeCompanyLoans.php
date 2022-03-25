<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for employee_company_loans
 */
class EmployeeCompanyLoans extends DbTable
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
    public $employee;
    public $loan;
    public $start_date;
    public $last_installment_date;
    public $period_months;
    public $currency;
    public $amount;
    public $monthly_installment;
    public $status;
    public $details;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'employee_company_loans';
        $this->TableName = 'employee_company_loans';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`employee_company_loans`";
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
        $this->id = new DbField('employee_company_loans', 'employee_company_loans', 'x_id', 'id', '`id`', '`id`', 20, 20, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // employee
        $this->employee = new DbField('employee_company_loans', 'employee_company_loans', 'x_employee', 'employee', '`employee`', '`employee`', 3, 20, -1, false, '`employee`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->employee->Nullable = false; // NOT NULL field
        $this->employee->Required = true; // Required field
        $this->employee->Sortable = true; // Allow sort
        $this->employee->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->employee->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->employee->Param, "CustomMsg");
        $this->Fields['employee'] = &$this->employee;

        // loan
        $this->loan = new DbField('employee_company_loans', 'employee_company_loans', 'x_loan', 'loan', '`loan`', '`loan`', 20, 20, -1, false, '`loan`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->loan->Sortable = true; // Allow sort
        $this->loan->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->loan->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->loan->Param, "CustomMsg");
        $this->Fields['loan'] = &$this->loan;

        // start_date
        $this->start_date = new DbField('employee_company_loans', 'employee_company_loans', 'x_start_date', 'start_date', '`start_date`', CastDateFieldForLike("`start_date`", 0, "DB"), 133, 10, 0, false, '`start_date`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->start_date->Nullable = false; // NOT NULL field
        $this->start_date->Required = true; // Required field
        $this->start_date->Sortable = true; // Allow sort
        $this->start_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->start_date->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->start_date->Param, "CustomMsg");
        $this->Fields['start_date'] = &$this->start_date;

        // last_installment_date
        $this->last_installment_date = new DbField('employee_company_loans', 'employee_company_loans', 'x_last_installment_date', 'last_installment_date', '`last_installment_date`', CastDateFieldForLike("`last_installment_date`", 0, "DB"), 133, 10, 0, false, '`last_installment_date`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->last_installment_date->Nullable = false; // NOT NULL field
        $this->last_installment_date->Required = true; // Required field
        $this->last_installment_date->Sortable = true; // Allow sort
        $this->last_installment_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->last_installment_date->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->last_installment_date->Param, "CustomMsg");
        $this->Fields['last_installment_date'] = &$this->last_installment_date;

        // period_months
        $this->period_months = new DbField('employee_company_loans', 'employee_company_loans', 'x_period_months', 'period_months', '`period_months`', '`period_months`', 20, 20, -1, false, '`period_months`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->period_months->Sortable = true; // Allow sort
        $this->period_months->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->period_months->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->period_months->Param, "CustomMsg");
        $this->Fields['period_months'] = &$this->period_months;

        // currency
        $this->currency = new DbField('employee_company_loans', 'employee_company_loans', 'x_currency', 'currency', '`currency`', '`currency`', 20, 20, -1, false, '`currency`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->currency->Sortable = true; // Allow sort
        $this->currency->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->currency->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->currency->Param, "CustomMsg");
        $this->Fields['currency'] = &$this->currency;

        // amount
        $this->amount = new DbField('employee_company_loans', 'employee_company_loans', 'x_amount', 'amount', '`amount`', '`amount`', 131, 10, -1, false, '`amount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->amount->Nullable = false; // NOT NULL field
        $this->amount->Required = true; // Required field
        $this->amount->Sortable = true; // Allow sort
        $this->amount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->amount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->amount->Param, "CustomMsg");
        $this->Fields['amount'] = &$this->amount;

        // monthly_installment
        $this->monthly_installment = new DbField('employee_company_loans', 'employee_company_loans', 'x_monthly_installment', 'monthly_installment', '`monthly_installment`', '`monthly_installment`', 131, 10, -1, false, '`monthly_installment`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->monthly_installment->Nullable = false; // NOT NULL field
        $this->monthly_installment->Required = true; // Required field
        $this->monthly_installment->Sortable = true; // Allow sort
        $this->monthly_installment->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->monthly_installment->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->monthly_installment->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->monthly_installment->Param, "CustomMsg");
        $this->Fields['monthly_installment'] = &$this->monthly_installment;

        // status
        $this->status = new DbField('employee_company_loans', 'employee_company_loans', 'x_status', 'status', '`status`', '`status`', 202, 9, -1, false, '`status`', false, false, false, 'FORMATTED TEXT', 'RADIO');
        $this->status->Sortable = true; // Allow sort
        $this->status->Lookup = new Lookup('status', 'employee_company_loans', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->status->OptionCount = 4;
        $this->status->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->status->Param, "CustomMsg");
        $this->Fields['status'] = &$this->status;

        // details
        $this->details = new DbField('employee_company_loans', 'employee_company_loans', 'x_details', 'details', '`details`', '`details`', 201, 65535, -1, false, '`details`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->details->Sortable = true; // Allow sort
        $this->details->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->details->Param, "CustomMsg");
        $this->Fields['details'] = &$this->details;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`employee_company_loans`";
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
        $this->employee->DbValue = $row['employee'];
        $this->loan->DbValue = $row['loan'];
        $this->start_date->DbValue = $row['start_date'];
        $this->last_installment_date->DbValue = $row['last_installment_date'];
        $this->period_months->DbValue = $row['period_months'];
        $this->currency->DbValue = $row['currency'];
        $this->amount->DbValue = $row['amount'];
        $this->monthly_installment->DbValue = $row['monthly_installment'];
        $this->status->DbValue = $row['status'];
        $this->details->DbValue = $row['details'];
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
        return $_SESSION[$name] ?? GetUrl("EmployeeCompanyLoansList");
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
        if ($pageName == "EmployeeCompanyLoansView") {
            return $Language->phrase("View");
        } elseif ($pageName == "EmployeeCompanyLoansEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "EmployeeCompanyLoansAdd") {
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
                return "EmployeeCompanyLoansView";
            case Config("API_ADD_ACTION"):
                return "EmployeeCompanyLoansAdd";
            case Config("API_EDIT_ACTION"):
                return "EmployeeCompanyLoansEdit";
            case Config("API_DELETE_ACTION"):
                return "EmployeeCompanyLoansDelete";
            case Config("API_LIST_ACTION"):
                return "EmployeeCompanyLoansList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "EmployeeCompanyLoansList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("EmployeeCompanyLoansView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("EmployeeCompanyLoansView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "EmployeeCompanyLoansAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "EmployeeCompanyLoansAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("EmployeeCompanyLoansEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("EmployeeCompanyLoansAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("EmployeeCompanyLoansDelete", $this->getUrlParm());
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
        $this->employee->setDbValue($row['employee']);
        $this->loan->setDbValue($row['loan']);
        $this->start_date->setDbValue($row['start_date']);
        $this->last_installment_date->setDbValue($row['last_installment_date']);
        $this->period_months->setDbValue($row['period_months']);
        $this->currency->setDbValue($row['currency']);
        $this->amount->setDbValue($row['amount']);
        $this->monthly_installment->setDbValue($row['monthly_installment']);
        $this->status->setDbValue($row['status']);
        $this->details->setDbValue($row['details']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // employee

        // loan

        // start_date

        // last_installment_date

        // period_months

        // currency

        // amount

        // monthly_installment

        // status

        // details

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // employee
        $this->employee->ViewValue = $this->employee->CurrentValue;
        $this->employee->ViewValue = FormatNumber($this->employee->ViewValue, 0, -2, -2, -2);
        $this->employee->ViewCustomAttributes = "";

        // loan
        $this->loan->ViewValue = $this->loan->CurrentValue;
        $this->loan->ViewValue = FormatNumber($this->loan->ViewValue, 0, -2, -2, -2);
        $this->loan->ViewCustomAttributes = "";

        // start_date
        $this->start_date->ViewValue = $this->start_date->CurrentValue;
        $this->start_date->ViewValue = FormatDateTime($this->start_date->ViewValue, 0);
        $this->start_date->ViewCustomAttributes = "";

        // last_installment_date
        $this->last_installment_date->ViewValue = $this->last_installment_date->CurrentValue;
        $this->last_installment_date->ViewValue = FormatDateTime($this->last_installment_date->ViewValue, 0);
        $this->last_installment_date->ViewCustomAttributes = "";

        // period_months
        $this->period_months->ViewValue = $this->period_months->CurrentValue;
        $this->period_months->ViewValue = FormatNumber($this->period_months->ViewValue, 0, -2, -2, -2);
        $this->period_months->ViewCustomAttributes = "";

        // currency
        $this->currency->ViewValue = $this->currency->CurrentValue;
        $this->currency->ViewValue = FormatNumber($this->currency->ViewValue, 0, -2, -2, -2);
        $this->currency->ViewCustomAttributes = "";

        // amount
        $this->amount->ViewValue = $this->amount->CurrentValue;
        $this->amount->ViewValue = FormatNumber($this->amount->ViewValue, 2, -2, -2, -2);
        $this->amount->ViewCustomAttributes = "";

        // monthly_installment
        $this->monthly_installment->ViewValue = $this->monthly_installment->CurrentValue;
        $this->monthly_installment->ViewValue = FormatNumber($this->monthly_installment->ViewValue, 2, -2, -2, -2);
        $this->monthly_installment->ViewCustomAttributes = "";

        // status
        if (strval($this->status->CurrentValue) != "") {
            $this->status->ViewValue = $this->status->optionCaption($this->status->CurrentValue);
        } else {
            $this->status->ViewValue = null;
        }
        $this->status->ViewCustomAttributes = "";

        // details
        $this->details->ViewValue = $this->details->CurrentValue;
        $this->details->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // employee
        $this->employee->LinkCustomAttributes = "";
        $this->employee->HrefValue = "";
        $this->employee->TooltipValue = "";

        // loan
        $this->loan->LinkCustomAttributes = "";
        $this->loan->HrefValue = "";
        $this->loan->TooltipValue = "";

        // start_date
        $this->start_date->LinkCustomAttributes = "";
        $this->start_date->HrefValue = "";
        $this->start_date->TooltipValue = "";

        // last_installment_date
        $this->last_installment_date->LinkCustomAttributes = "";
        $this->last_installment_date->HrefValue = "";
        $this->last_installment_date->TooltipValue = "";

        // period_months
        $this->period_months->LinkCustomAttributes = "";
        $this->period_months->HrefValue = "";
        $this->period_months->TooltipValue = "";

        // currency
        $this->currency->LinkCustomAttributes = "";
        $this->currency->HrefValue = "";
        $this->currency->TooltipValue = "";

        // amount
        $this->amount->LinkCustomAttributes = "";
        $this->amount->HrefValue = "";
        $this->amount->TooltipValue = "";

        // monthly_installment
        $this->monthly_installment->LinkCustomAttributes = "";
        $this->monthly_installment->HrefValue = "";
        $this->monthly_installment->TooltipValue = "";

        // status
        $this->status->LinkCustomAttributes = "";
        $this->status->HrefValue = "";
        $this->status->TooltipValue = "";

        // details
        $this->details->LinkCustomAttributes = "";
        $this->details->HrefValue = "";
        $this->details->TooltipValue = "";

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

        // employee
        $this->employee->EditAttrs["class"] = "form-control";
        $this->employee->EditCustomAttributes = "";
        $this->employee->EditValue = $this->employee->CurrentValue;
        $this->employee->PlaceHolder = RemoveHtml($this->employee->caption());

        // loan
        $this->loan->EditAttrs["class"] = "form-control";
        $this->loan->EditCustomAttributes = "";
        $this->loan->EditValue = $this->loan->CurrentValue;
        $this->loan->PlaceHolder = RemoveHtml($this->loan->caption());

        // start_date
        $this->start_date->EditAttrs["class"] = "form-control";
        $this->start_date->EditCustomAttributes = "";
        $this->start_date->EditValue = FormatDateTime($this->start_date->CurrentValue, 8);
        $this->start_date->PlaceHolder = RemoveHtml($this->start_date->caption());

        // last_installment_date
        $this->last_installment_date->EditAttrs["class"] = "form-control";
        $this->last_installment_date->EditCustomAttributes = "";
        $this->last_installment_date->EditValue = FormatDateTime($this->last_installment_date->CurrentValue, 8);
        $this->last_installment_date->PlaceHolder = RemoveHtml($this->last_installment_date->caption());

        // period_months
        $this->period_months->EditAttrs["class"] = "form-control";
        $this->period_months->EditCustomAttributes = "";
        $this->period_months->EditValue = $this->period_months->CurrentValue;
        $this->period_months->PlaceHolder = RemoveHtml($this->period_months->caption());

        // currency
        $this->currency->EditAttrs["class"] = "form-control";
        $this->currency->EditCustomAttributes = "";
        $this->currency->EditValue = $this->currency->CurrentValue;
        $this->currency->PlaceHolder = RemoveHtml($this->currency->caption());

        // amount
        $this->amount->EditAttrs["class"] = "form-control";
        $this->amount->EditCustomAttributes = "";
        $this->amount->EditValue = $this->amount->CurrentValue;
        $this->amount->PlaceHolder = RemoveHtml($this->amount->caption());
        if (strval($this->amount->EditValue) != "" && is_numeric($this->amount->EditValue)) {
            $this->amount->EditValue = FormatNumber($this->amount->EditValue, -2, -2, -2, -2);
        }

        // monthly_installment
        $this->monthly_installment->EditAttrs["class"] = "form-control";
        $this->monthly_installment->EditCustomAttributes = "";
        $this->monthly_installment->EditValue = $this->monthly_installment->CurrentValue;
        $this->monthly_installment->PlaceHolder = RemoveHtml($this->monthly_installment->caption());
        if (strval($this->monthly_installment->EditValue) != "" && is_numeric($this->monthly_installment->EditValue)) {
            $this->monthly_installment->EditValue = FormatNumber($this->monthly_installment->EditValue, -2, -2, -2, -2);
        }

        // status
        $this->status->EditCustomAttributes = "";
        $this->status->EditValue = $this->status->options(false);
        $this->status->PlaceHolder = RemoveHtml($this->status->caption());

        // details
        $this->details->EditAttrs["class"] = "form-control";
        $this->details->EditCustomAttributes = "";
        $this->details->EditValue = $this->details->CurrentValue;
        $this->details->PlaceHolder = RemoveHtml($this->details->caption());

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
                    $doc->exportCaption($this->employee);
                    $doc->exportCaption($this->loan);
                    $doc->exportCaption($this->start_date);
                    $doc->exportCaption($this->last_installment_date);
                    $doc->exportCaption($this->period_months);
                    $doc->exportCaption($this->currency);
                    $doc->exportCaption($this->amount);
                    $doc->exportCaption($this->monthly_installment);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->details);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->employee);
                    $doc->exportCaption($this->loan);
                    $doc->exportCaption($this->start_date);
                    $doc->exportCaption($this->last_installment_date);
                    $doc->exportCaption($this->period_months);
                    $doc->exportCaption($this->currency);
                    $doc->exportCaption($this->amount);
                    $doc->exportCaption($this->monthly_installment);
                    $doc->exportCaption($this->status);
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
                        $doc->exportField($this->employee);
                        $doc->exportField($this->loan);
                        $doc->exportField($this->start_date);
                        $doc->exportField($this->last_installment_date);
                        $doc->exportField($this->period_months);
                        $doc->exportField($this->currency);
                        $doc->exportField($this->amount);
                        $doc->exportField($this->monthly_installment);
                        $doc->exportField($this->status);
                        $doc->exportField($this->details);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->employee);
                        $doc->exportField($this->loan);
                        $doc->exportField($this->start_date);
                        $doc->exportField($this->last_installment_date);
                        $doc->exportField($this->period_months);
                        $doc->exportField($this->currency);
                        $doc->exportField($this->amount);
                        $doc->exportField($this->monthly_installment);
                        $doc->exportField($this->status);
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
