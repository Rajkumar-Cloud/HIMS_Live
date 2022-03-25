<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for employees_archived
 */
class EmployeesArchived extends DbTable
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
    public $ref_id;
    public $employee_id;
    public $first_name;
    public $last_name;
    public $gender;
    public $ssn_num;
    public $nic_num;
    public $other_id;
    public $work_email;
    public $joined_date;
    public $confirmation_date;
    public $supervisor;
    public $department;
    public $termination_date;
    public $notes;
    public $data;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'employees_archived';
        $this->TableName = 'employees_archived';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`employees_archived`";
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
        $this->id = new DbField('employees_archived', 'employees_archived', 'x_id', 'id', '`id`', '`id`', 20, 20, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // ref_id
        $this->ref_id = new DbField('employees_archived', 'employees_archived', 'x_ref_id', 'ref_id', '`ref_id`', '`ref_id`', 20, 20, -1, false, '`ref_id`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ref_id->Nullable = false; // NOT NULL field
        $this->ref_id->Required = true; // Required field
        $this->ref_id->Sortable = true; // Allow sort
        $this->ref_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->ref_id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ref_id->Param, "CustomMsg");
        $this->Fields['ref_id'] = &$this->ref_id;

        // employee_id
        $this->employee_id = new DbField('employees_archived', 'employees_archived', 'x_employee_id', 'employee_id', '`employee_id`', '`employee_id`', 200, 50, -1, false, '`employee_id`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->employee_id->Sortable = true; // Allow sort
        $this->employee_id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->employee_id->Param, "CustomMsg");
        $this->Fields['employee_id'] = &$this->employee_id;

        // first_name
        $this->first_name = new DbField('employees_archived', 'employees_archived', 'x_first_name', 'first_name', '`first_name`', '`first_name`', 200, 100, -1, false, '`first_name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->first_name->Nullable = false; // NOT NULL field
        $this->first_name->Required = true; // Required field
        $this->first_name->Sortable = true; // Allow sort
        $this->first_name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->first_name->Param, "CustomMsg");
        $this->Fields['first_name'] = &$this->first_name;

        // last_name
        $this->last_name = new DbField('employees_archived', 'employees_archived', 'x_last_name', 'last_name', '`last_name`', '`last_name`', 200, 100, -1, false, '`last_name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->last_name->Nullable = false; // NOT NULL field
        $this->last_name->Required = true; // Required field
        $this->last_name->Sortable = true; // Allow sort
        $this->last_name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->last_name->Param, "CustomMsg");
        $this->Fields['last_name'] = &$this->last_name;

        // gender
        $this->gender = new DbField('employees_archived', 'employees_archived', 'x_gender', 'gender', '`gender`', '`gender`', 202, 6, -1, false, '`gender`', false, false, false, 'FORMATTED TEXT', 'RADIO');
        $this->gender->Sortable = true; // Allow sort
        $this->gender->Lookup = new Lookup('gender', 'employees_archived', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->gender->OptionCount = 2;
        $this->gender->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->gender->Param, "CustomMsg");
        $this->Fields['gender'] = &$this->gender;

        // ssn_num
        $this->ssn_num = new DbField('employees_archived', 'employees_archived', 'x_ssn_num', 'ssn_num', '`ssn_num`', '`ssn_num`', 200, 100, -1, false, '`ssn_num`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ssn_num->Sortable = true; // Allow sort
        $this->ssn_num->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ssn_num->Param, "CustomMsg");
        $this->Fields['ssn_num'] = &$this->ssn_num;

        // nic_num
        $this->nic_num = new DbField('employees_archived', 'employees_archived', 'x_nic_num', 'nic_num', '`nic_num`', '`nic_num`', 200, 100, -1, false, '`nic_num`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->nic_num->Sortable = true; // Allow sort
        $this->nic_num->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->nic_num->Param, "CustomMsg");
        $this->Fields['nic_num'] = &$this->nic_num;

        // other_id
        $this->other_id = new DbField('employees_archived', 'employees_archived', 'x_other_id', 'other_id', '`other_id`', '`other_id`', 200, 100, -1, false, '`other_id`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->other_id->Sortable = true; // Allow sort
        $this->other_id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->other_id->Param, "CustomMsg");
        $this->Fields['other_id'] = &$this->other_id;

        // work_email
        $this->work_email = new DbField('employees_archived', 'employees_archived', 'x_work_email', 'work_email', '`work_email`', '`work_email`', 200, 100, -1, false, '`work_email`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->work_email->Sortable = true; // Allow sort
        $this->work_email->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->work_email->Param, "CustomMsg");
        $this->Fields['work_email'] = &$this->work_email;

        // joined_date
        $this->joined_date = new DbField('employees_archived', 'employees_archived', 'x_joined_date', 'joined_date', '`joined_date`', CastDateFieldForLike("`joined_date`", 0, "DB"), 135, 19, 0, false, '`joined_date`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->joined_date->Sortable = true; // Allow sort
        $this->joined_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->joined_date->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->joined_date->Param, "CustomMsg");
        $this->Fields['joined_date'] = &$this->joined_date;

        // confirmation_date
        $this->confirmation_date = new DbField('employees_archived', 'employees_archived', 'x_confirmation_date', 'confirmation_date', '`confirmation_date`', CastDateFieldForLike("`confirmation_date`", 0, "DB"), 135, 19, 0, false, '`confirmation_date`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->confirmation_date->Sortable = true; // Allow sort
        $this->confirmation_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->confirmation_date->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->confirmation_date->Param, "CustomMsg");
        $this->Fields['confirmation_date'] = &$this->confirmation_date;

        // supervisor
        $this->supervisor = new DbField('employees_archived', 'employees_archived', 'x_supervisor', 'supervisor', '`supervisor`', '`supervisor`', 20, 20, -1, false, '`supervisor`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->supervisor->Sortable = true; // Allow sort
        $this->supervisor->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->supervisor->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->supervisor->Param, "CustomMsg");
        $this->Fields['supervisor'] = &$this->supervisor;

        // department
        $this->department = new DbField('employees_archived', 'employees_archived', 'x_department', 'department', '`department`', '`department`', 20, 20, -1, false, '`department`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->department->Sortable = true; // Allow sort
        $this->department->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->department->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->department->Param, "CustomMsg");
        $this->Fields['department'] = &$this->department;

        // termination_date
        $this->termination_date = new DbField('employees_archived', 'employees_archived', 'x_termination_date', 'termination_date', '`termination_date`', CastDateFieldForLike("`termination_date`", 0, "DB"), 135, 19, 0, false, '`termination_date`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->termination_date->Sortable = true; // Allow sort
        $this->termination_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->termination_date->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->termination_date->Param, "CustomMsg");
        $this->Fields['termination_date'] = &$this->termination_date;

        // notes
        $this->notes = new DbField('employees_archived', 'employees_archived', 'x_notes', 'notes', '`notes`', '`notes`', 201, 65535, -1, false, '`notes`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->notes->Sortable = true; // Allow sort
        $this->notes->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->notes->Param, "CustomMsg");
        $this->Fields['notes'] = &$this->notes;

        // data
        $this->data = new DbField('employees_archived', 'employees_archived', 'x_data', 'data', '`data`', '`data`', 201, -1, -1, false, '`data`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->data->Sortable = true; // Allow sort
        $this->data->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->data->Param, "CustomMsg");
        $this->Fields['data'] = &$this->data;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`employees_archived`";
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
        $this->ref_id->DbValue = $row['ref_id'];
        $this->employee_id->DbValue = $row['employee_id'];
        $this->first_name->DbValue = $row['first_name'];
        $this->last_name->DbValue = $row['last_name'];
        $this->gender->DbValue = $row['gender'];
        $this->ssn_num->DbValue = $row['ssn_num'];
        $this->nic_num->DbValue = $row['nic_num'];
        $this->other_id->DbValue = $row['other_id'];
        $this->work_email->DbValue = $row['work_email'];
        $this->joined_date->DbValue = $row['joined_date'];
        $this->confirmation_date->DbValue = $row['confirmation_date'];
        $this->supervisor->DbValue = $row['supervisor'];
        $this->department->DbValue = $row['department'];
        $this->termination_date->DbValue = $row['termination_date'];
        $this->notes->DbValue = $row['notes'];
        $this->data->DbValue = $row['data'];
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
        return $_SESSION[$name] ?? GetUrl("EmployeesArchivedList");
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
        if ($pageName == "EmployeesArchivedView") {
            return $Language->phrase("View");
        } elseif ($pageName == "EmployeesArchivedEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "EmployeesArchivedAdd") {
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
                return "EmployeesArchivedView";
            case Config("API_ADD_ACTION"):
                return "EmployeesArchivedAdd";
            case Config("API_EDIT_ACTION"):
                return "EmployeesArchivedEdit";
            case Config("API_DELETE_ACTION"):
                return "EmployeesArchivedDelete";
            case Config("API_LIST_ACTION"):
                return "EmployeesArchivedList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "EmployeesArchivedList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("EmployeesArchivedView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("EmployeesArchivedView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "EmployeesArchivedAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "EmployeesArchivedAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("EmployeesArchivedEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("EmployeesArchivedAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("EmployeesArchivedDelete", $this->getUrlParm());
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
        $this->ref_id->setDbValue($row['ref_id']);
        $this->employee_id->setDbValue($row['employee_id']);
        $this->first_name->setDbValue($row['first_name']);
        $this->last_name->setDbValue($row['last_name']);
        $this->gender->setDbValue($row['gender']);
        $this->ssn_num->setDbValue($row['ssn_num']);
        $this->nic_num->setDbValue($row['nic_num']);
        $this->other_id->setDbValue($row['other_id']);
        $this->work_email->setDbValue($row['work_email']);
        $this->joined_date->setDbValue($row['joined_date']);
        $this->confirmation_date->setDbValue($row['confirmation_date']);
        $this->supervisor->setDbValue($row['supervisor']);
        $this->department->setDbValue($row['department']);
        $this->termination_date->setDbValue($row['termination_date']);
        $this->notes->setDbValue($row['notes']);
        $this->data->setDbValue($row['data']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // ref_id

        // employee_id

        // first_name

        // last_name

        // gender

        // ssn_num

        // nic_num

        // other_id

        // work_email

        // joined_date

        // confirmation_date

        // supervisor

        // department

        // termination_date

        // notes

        // data

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // ref_id
        $this->ref_id->ViewValue = $this->ref_id->CurrentValue;
        $this->ref_id->ViewValue = FormatNumber($this->ref_id->ViewValue, 0, -2, -2, -2);
        $this->ref_id->ViewCustomAttributes = "";

        // employee_id
        $this->employee_id->ViewValue = $this->employee_id->CurrentValue;
        $this->employee_id->ViewCustomAttributes = "";

        // first_name
        $this->first_name->ViewValue = $this->first_name->CurrentValue;
        $this->first_name->ViewCustomAttributes = "";

        // last_name
        $this->last_name->ViewValue = $this->last_name->CurrentValue;
        $this->last_name->ViewCustomAttributes = "";

        // gender
        if (strval($this->gender->CurrentValue) != "") {
            $this->gender->ViewValue = $this->gender->optionCaption($this->gender->CurrentValue);
        } else {
            $this->gender->ViewValue = null;
        }
        $this->gender->ViewCustomAttributes = "";

        // ssn_num
        $this->ssn_num->ViewValue = $this->ssn_num->CurrentValue;
        $this->ssn_num->ViewCustomAttributes = "";

        // nic_num
        $this->nic_num->ViewValue = $this->nic_num->CurrentValue;
        $this->nic_num->ViewCustomAttributes = "";

        // other_id
        $this->other_id->ViewValue = $this->other_id->CurrentValue;
        $this->other_id->ViewCustomAttributes = "";

        // work_email
        $this->work_email->ViewValue = $this->work_email->CurrentValue;
        $this->work_email->ViewCustomAttributes = "";

        // joined_date
        $this->joined_date->ViewValue = $this->joined_date->CurrentValue;
        $this->joined_date->ViewValue = FormatDateTime($this->joined_date->ViewValue, 0);
        $this->joined_date->ViewCustomAttributes = "";

        // confirmation_date
        $this->confirmation_date->ViewValue = $this->confirmation_date->CurrentValue;
        $this->confirmation_date->ViewValue = FormatDateTime($this->confirmation_date->ViewValue, 0);
        $this->confirmation_date->ViewCustomAttributes = "";

        // supervisor
        $this->supervisor->ViewValue = $this->supervisor->CurrentValue;
        $this->supervisor->ViewValue = FormatNumber($this->supervisor->ViewValue, 0, -2, -2, -2);
        $this->supervisor->ViewCustomAttributes = "";

        // department
        $this->department->ViewValue = $this->department->CurrentValue;
        $this->department->ViewValue = FormatNumber($this->department->ViewValue, 0, -2, -2, -2);
        $this->department->ViewCustomAttributes = "";

        // termination_date
        $this->termination_date->ViewValue = $this->termination_date->CurrentValue;
        $this->termination_date->ViewValue = FormatDateTime($this->termination_date->ViewValue, 0);
        $this->termination_date->ViewCustomAttributes = "";

        // notes
        $this->notes->ViewValue = $this->notes->CurrentValue;
        $this->notes->ViewCustomAttributes = "";

        // data
        $this->data->ViewValue = $this->data->CurrentValue;
        $this->data->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // ref_id
        $this->ref_id->LinkCustomAttributes = "";
        $this->ref_id->HrefValue = "";
        $this->ref_id->TooltipValue = "";

        // employee_id
        $this->employee_id->LinkCustomAttributes = "";
        $this->employee_id->HrefValue = "";
        $this->employee_id->TooltipValue = "";

        // first_name
        $this->first_name->LinkCustomAttributes = "";
        $this->first_name->HrefValue = "";
        $this->first_name->TooltipValue = "";

        // last_name
        $this->last_name->LinkCustomAttributes = "";
        $this->last_name->HrefValue = "";
        $this->last_name->TooltipValue = "";

        // gender
        $this->gender->LinkCustomAttributes = "";
        $this->gender->HrefValue = "";
        $this->gender->TooltipValue = "";

        // ssn_num
        $this->ssn_num->LinkCustomAttributes = "";
        $this->ssn_num->HrefValue = "";
        $this->ssn_num->TooltipValue = "";

        // nic_num
        $this->nic_num->LinkCustomAttributes = "";
        $this->nic_num->HrefValue = "";
        $this->nic_num->TooltipValue = "";

        // other_id
        $this->other_id->LinkCustomAttributes = "";
        $this->other_id->HrefValue = "";
        $this->other_id->TooltipValue = "";

        // work_email
        $this->work_email->LinkCustomAttributes = "";
        $this->work_email->HrefValue = "";
        $this->work_email->TooltipValue = "";

        // joined_date
        $this->joined_date->LinkCustomAttributes = "";
        $this->joined_date->HrefValue = "";
        $this->joined_date->TooltipValue = "";

        // confirmation_date
        $this->confirmation_date->LinkCustomAttributes = "";
        $this->confirmation_date->HrefValue = "";
        $this->confirmation_date->TooltipValue = "";

        // supervisor
        $this->supervisor->LinkCustomAttributes = "";
        $this->supervisor->HrefValue = "";
        $this->supervisor->TooltipValue = "";

        // department
        $this->department->LinkCustomAttributes = "";
        $this->department->HrefValue = "";
        $this->department->TooltipValue = "";

        // termination_date
        $this->termination_date->LinkCustomAttributes = "";
        $this->termination_date->HrefValue = "";
        $this->termination_date->TooltipValue = "";

        // notes
        $this->notes->LinkCustomAttributes = "";
        $this->notes->HrefValue = "";
        $this->notes->TooltipValue = "";

        // data
        $this->data->LinkCustomAttributes = "";
        $this->data->HrefValue = "";
        $this->data->TooltipValue = "";

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

        // ref_id
        $this->ref_id->EditAttrs["class"] = "form-control";
        $this->ref_id->EditCustomAttributes = "";
        $this->ref_id->EditValue = $this->ref_id->CurrentValue;
        $this->ref_id->PlaceHolder = RemoveHtml($this->ref_id->caption());

        // employee_id
        $this->employee_id->EditAttrs["class"] = "form-control";
        $this->employee_id->EditCustomAttributes = "";
        if (!$this->employee_id->Raw) {
            $this->employee_id->CurrentValue = HtmlDecode($this->employee_id->CurrentValue);
        }
        $this->employee_id->EditValue = $this->employee_id->CurrentValue;
        $this->employee_id->PlaceHolder = RemoveHtml($this->employee_id->caption());

        // first_name
        $this->first_name->EditAttrs["class"] = "form-control";
        $this->first_name->EditCustomAttributes = "";
        if (!$this->first_name->Raw) {
            $this->first_name->CurrentValue = HtmlDecode($this->first_name->CurrentValue);
        }
        $this->first_name->EditValue = $this->first_name->CurrentValue;
        $this->first_name->PlaceHolder = RemoveHtml($this->first_name->caption());

        // last_name
        $this->last_name->EditAttrs["class"] = "form-control";
        $this->last_name->EditCustomAttributes = "";
        if (!$this->last_name->Raw) {
            $this->last_name->CurrentValue = HtmlDecode($this->last_name->CurrentValue);
        }
        $this->last_name->EditValue = $this->last_name->CurrentValue;
        $this->last_name->PlaceHolder = RemoveHtml($this->last_name->caption());

        // gender
        $this->gender->EditCustomAttributes = "";
        $this->gender->EditValue = $this->gender->options(false);
        $this->gender->PlaceHolder = RemoveHtml($this->gender->caption());

        // ssn_num
        $this->ssn_num->EditAttrs["class"] = "form-control";
        $this->ssn_num->EditCustomAttributes = "";
        if (!$this->ssn_num->Raw) {
            $this->ssn_num->CurrentValue = HtmlDecode($this->ssn_num->CurrentValue);
        }
        $this->ssn_num->EditValue = $this->ssn_num->CurrentValue;
        $this->ssn_num->PlaceHolder = RemoveHtml($this->ssn_num->caption());

        // nic_num
        $this->nic_num->EditAttrs["class"] = "form-control";
        $this->nic_num->EditCustomAttributes = "";
        if (!$this->nic_num->Raw) {
            $this->nic_num->CurrentValue = HtmlDecode($this->nic_num->CurrentValue);
        }
        $this->nic_num->EditValue = $this->nic_num->CurrentValue;
        $this->nic_num->PlaceHolder = RemoveHtml($this->nic_num->caption());

        // other_id
        $this->other_id->EditAttrs["class"] = "form-control";
        $this->other_id->EditCustomAttributes = "";
        if (!$this->other_id->Raw) {
            $this->other_id->CurrentValue = HtmlDecode($this->other_id->CurrentValue);
        }
        $this->other_id->EditValue = $this->other_id->CurrentValue;
        $this->other_id->PlaceHolder = RemoveHtml($this->other_id->caption());

        // work_email
        $this->work_email->EditAttrs["class"] = "form-control";
        $this->work_email->EditCustomAttributes = "";
        if (!$this->work_email->Raw) {
            $this->work_email->CurrentValue = HtmlDecode($this->work_email->CurrentValue);
        }
        $this->work_email->EditValue = $this->work_email->CurrentValue;
        $this->work_email->PlaceHolder = RemoveHtml($this->work_email->caption());

        // joined_date
        $this->joined_date->EditAttrs["class"] = "form-control";
        $this->joined_date->EditCustomAttributes = "";
        $this->joined_date->EditValue = FormatDateTime($this->joined_date->CurrentValue, 8);
        $this->joined_date->PlaceHolder = RemoveHtml($this->joined_date->caption());

        // confirmation_date
        $this->confirmation_date->EditAttrs["class"] = "form-control";
        $this->confirmation_date->EditCustomAttributes = "";
        $this->confirmation_date->EditValue = FormatDateTime($this->confirmation_date->CurrentValue, 8);
        $this->confirmation_date->PlaceHolder = RemoveHtml($this->confirmation_date->caption());

        // supervisor
        $this->supervisor->EditAttrs["class"] = "form-control";
        $this->supervisor->EditCustomAttributes = "";
        $this->supervisor->EditValue = $this->supervisor->CurrentValue;
        $this->supervisor->PlaceHolder = RemoveHtml($this->supervisor->caption());

        // department
        $this->department->EditAttrs["class"] = "form-control";
        $this->department->EditCustomAttributes = "";
        $this->department->EditValue = $this->department->CurrentValue;
        $this->department->PlaceHolder = RemoveHtml($this->department->caption());

        // termination_date
        $this->termination_date->EditAttrs["class"] = "form-control";
        $this->termination_date->EditCustomAttributes = "";
        $this->termination_date->EditValue = FormatDateTime($this->termination_date->CurrentValue, 8);
        $this->termination_date->PlaceHolder = RemoveHtml($this->termination_date->caption());

        // notes
        $this->notes->EditAttrs["class"] = "form-control";
        $this->notes->EditCustomAttributes = "";
        $this->notes->EditValue = $this->notes->CurrentValue;
        $this->notes->PlaceHolder = RemoveHtml($this->notes->caption());

        // data
        $this->data->EditAttrs["class"] = "form-control";
        $this->data->EditCustomAttributes = "";
        $this->data->EditValue = $this->data->CurrentValue;
        $this->data->PlaceHolder = RemoveHtml($this->data->caption());

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
                    $doc->exportCaption($this->ref_id);
                    $doc->exportCaption($this->employee_id);
                    $doc->exportCaption($this->first_name);
                    $doc->exportCaption($this->last_name);
                    $doc->exportCaption($this->gender);
                    $doc->exportCaption($this->ssn_num);
                    $doc->exportCaption($this->nic_num);
                    $doc->exportCaption($this->other_id);
                    $doc->exportCaption($this->work_email);
                    $doc->exportCaption($this->joined_date);
                    $doc->exportCaption($this->confirmation_date);
                    $doc->exportCaption($this->supervisor);
                    $doc->exportCaption($this->department);
                    $doc->exportCaption($this->termination_date);
                    $doc->exportCaption($this->notes);
                    $doc->exportCaption($this->data);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->ref_id);
                    $doc->exportCaption($this->employee_id);
                    $doc->exportCaption($this->first_name);
                    $doc->exportCaption($this->last_name);
                    $doc->exportCaption($this->gender);
                    $doc->exportCaption($this->ssn_num);
                    $doc->exportCaption($this->nic_num);
                    $doc->exportCaption($this->other_id);
                    $doc->exportCaption($this->work_email);
                    $doc->exportCaption($this->joined_date);
                    $doc->exportCaption($this->confirmation_date);
                    $doc->exportCaption($this->supervisor);
                    $doc->exportCaption($this->department);
                    $doc->exportCaption($this->termination_date);
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
                        $doc->exportField($this->ref_id);
                        $doc->exportField($this->employee_id);
                        $doc->exportField($this->first_name);
                        $doc->exportField($this->last_name);
                        $doc->exportField($this->gender);
                        $doc->exportField($this->ssn_num);
                        $doc->exportField($this->nic_num);
                        $doc->exportField($this->other_id);
                        $doc->exportField($this->work_email);
                        $doc->exportField($this->joined_date);
                        $doc->exportField($this->confirmation_date);
                        $doc->exportField($this->supervisor);
                        $doc->exportField($this->department);
                        $doc->exportField($this->termination_date);
                        $doc->exportField($this->notes);
                        $doc->exportField($this->data);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->ref_id);
                        $doc->exportField($this->employee_id);
                        $doc->exportField($this->first_name);
                        $doc->exportField($this->last_name);
                        $doc->exportField($this->gender);
                        $doc->exportField($this->ssn_num);
                        $doc->exportField($this->nic_num);
                        $doc->exportField($this->other_id);
                        $doc->exportField($this->work_email);
                        $doc->exportField($this->joined_date);
                        $doc->exportField($this->confirmation_date);
                        $doc->exportField($this->supervisor);
                        $doc->exportField($this->department);
                        $doc->exportField($this->termination_date);
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
