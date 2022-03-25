<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for hr_leavetypes
 */
class HrLeavetypes extends DbTable
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
    public $name;
    public $supervisor_leave_assign;
    public $employee_can_apply;
    public $apply_beyond_current;
    public $leave_accrue;
    public $carried_forward;
    public $default_per_year;
    public $carried_forward_percentage;
    public $carried_forward_leave_availability;
    public $propotionate_on_joined_date;
    public $send_notification_emails;
    public $leave_group;
    public $leave_color;
    public $max_carried_forward_amount;
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
        $this->TableVar = 'hr_leavetypes';
        $this->TableName = 'hr_leavetypes';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`hr_leavetypes`";
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
        $this->id = new DbField('hr_leavetypes', 'hr_leavetypes', 'x_id', 'id', '`id`', '`id`', 20, 20, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // name
        $this->name = new DbField('hr_leavetypes', 'hr_leavetypes', 'x_name', 'name', '`name`', '`name`', 200, 100, -1, false, '`name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->name->Nullable = false; // NOT NULL field
        $this->name->Required = true; // Required field
        $this->name->Sortable = true; // Allow sort
        $this->name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->name->Param, "CustomMsg");
        $this->Fields['name'] = &$this->name;

        // supervisor_leave_assign
        $this->supervisor_leave_assign = new DbField('hr_leavetypes', 'hr_leavetypes', 'x_supervisor_leave_assign', 'supervisor_leave_assign', '`supervisor_leave_assign`', '`supervisor_leave_assign`', 202, 3, -1, false, '`supervisor_leave_assign`', false, false, false, 'FORMATTED TEXT', 'RADIO');
        $this->supervisor_leave_assign->Sortable = true; // Allow sort
        $this->supervisor_leave_assign->Lookup = new Lookup('supervisor_leave_assign', 'hr_leavetypes', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->supervisor_leave_assign->OptionCount = 2;
        $this->supervisor_leave_assign->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->supervisor_leave_assign->Param, "CustomMsg");
        $this->Fields['supervisor_leave_assign'] = &$this->supervisor_leave_assign;

        // employee_can_apply
        $this->employee_can_apply = new DbField('hr_leavetypes', 'hr_leavetypes', 'x_employee_can_apply', 'employee_can_apply', '`employee_can_apply`', '`employee_can_apply`', 202, 3, -1, false, '`employee_can_apply`', false, false, false, 'FORMATTED TEXT', 'RADIO');
        $this->employee_can_apply->Sortable = true; // Allow sort
        $this->employee_can_apply->Lookup = new Lookup('employee_can_apply', 'hr_leavetypes', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->employee_can_apply->OptionCount = 2;
        $this->employee_can_apply->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->employee_can_apply->Param, "CustomMsg");
        $this->Fields['employee_can_apply'] = &$this->employee_can_apply;

        // apply_beyond_current
        $this->apply_beyond_current = new DbField('hr_leavetypes', 'hr_leavetypes', 'x_apply_beyond_current', 'apply_beyond_current', '`apply_beyond_current`', '`apply_beyond_current`', 202, 3, -1, false, '`apply_beyond_current`', false, false, false, 'FORMATTED TEXT', 'RADIO');
        $this->apply_beyond_current->Sortable = true; // Allow sort
        $this->apply_beyond_current->Lookup = new Lookup('apply_beyond_current', 'hr_leavetypes', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->apply_beyond_current->OptionCount = 2;
        $this->apply_beyond_current->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->apply_beyond_current->Param, "CustomMsg");
        $this->Fields['apply_beyond_current'] = &$this->apply_beyond_current;

        // leave_accrue
        $this->leave_accrue = new DbField('hr_leavetypes', 'hr_leavetypes', 'x_leave_accrue', 'leave_accrue', '`leave_accrue`', '`leave_accrue`', 202, 3, -1, false, '`leave_accrue`', false, false, false, 'FORMATTED TEXT', 'RADIO');
        $this->leave_accrue->Sortable = true; // Allow sort
        $this->leave_accrue->Lookup = new Lookup('leave_accrue', 'hr_leavetypes', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->leave_accrue->OptionCount = 2;
        $this->leave_accrue->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->leave_accrue->Param, "CustomMsg");
        $this->Fields['leave_accrue'] = &$this->leave_accrue;

        // carried_forward
        $this->carried_forward = new DbField('hr_leavetypes', 'hr_leavetypes', 'x_carried_forward', 'carried_forward', '`carried_forward`', '`carried_forward`', 202, 3, -1, false, '`carried_forward`', false, false, false, 'FORMATTED TEXT', 'RADIO');
        $this->carried_forward->Sortable = true; // Allow sort
        $this->carried_forward->Lookup = new Lookup('carried_forward', 'hr_leavetypes', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->carried_forward->OptionCount = 2;
        $this->carried_forward->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->carried_forward->Param, "CustomMsg");
        $this->Fields['carried_forward'] = &$this->carried_forward;

        // default_per_year
        $this->default_per_year = new DbField('hr_leavetypes', 'hr_leavetypes', 'x_default_per_year', 'default_per_year', '`default_per_year`', '`default_per_year`', 131, 10, -1, false, '`default_per_year`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->default_per_year->Nullable = false; // NOT NULL field
        $this->default_per_year->Required = true; // Required field
        $this->default_per_year->Sortable = true; // Allow sort
        $this->default_per_year->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->default_per_year->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->default_per_year->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->default_per_year->Param, "CustomMsg");
        $this->Fields['default_per_year'] = &$this->default_per_year;

        // carried_forward_percentage
        $this->carried_forward_percentage = new DbField('hr_leavetypes', 'hr_leavetypes', 'x_carried_forward_percentage', 'carried_forward_percentage', '`carried_forward_percentage`', '`carried_forward_percentage`', 3, 11, -1, false, '`carried_forward_percentage`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->carried_forward_percentage->Sortable = true; // Allow sort
        $this->carried_forward_percentage->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->carried_forward_percentage->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->carried_forward_percentage->Param, "CustomMsg");
        $this->Fields['carried_forward_percentage'] = &$this->carried_forward_percentage;

        // carried_forward_leave_availability
        $this->carried_forward_leave_availability = new DbField('hr_leavetypes', 'hr_leavetypes', 'x_carried_forward_leave_availability', 'carried_forward_leave_availability', '`carried_forward_leave_availability`', '`carried_forward_leave_availability`', 3, 11, -1, false, '`carried_forward_leave_availability`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->carried_forward_leave_availability->Sortable = true; // Allow sort
        $this->carried_forward_leave_availability->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->carried_forward_leave_availability->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->carried_forward_leave_availability->Param, "CustomMsg");
        $this->Fields['carried_forward_leave_availability'] = &$this->carried_forward_leave_availability;

        // propotionate_on_joined_date
        $this->propotionate_on_joined_date = new DbField('hr_leavetypes', 'hr_leavetypes', 'x_propotionate_on_joined_date', 'propotionate_on_joined_date', '`propotionate_on_joined_date`', '`propotionate_on_joined_date`', 202, 3, -1, false, '`propotionate_on_joined_date`', false, false, false, 'FORMATTED TEXT', 'RADIO');
        $this->propotionate_on_joined_date->Sortable = true; // Allow sort
        $this->propotionate_on_joined_date->Lookup = new Lookup('propotionate_on_joined_date', 'hr_leavetypes', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->propotionate_on_joined_date->OptionCount = 2;
        $this->propotionate_on_joined_date->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->propotionate_on_joined_date->Param, "CustomMsg");
        $this->Fields['propotionate_on_joined_date'] = &$this->propotionate_on_joined_date;

        // send_notification_emails
        $this->send_notification_emails = new DbField('hr_leavetypes', 'hr_leavetypes', 'x_send_notification_emails', 'send_notification_emails', '`send_notification_emails`', '`send_notification_emails`', 202, 3, -1, false, '`send_notification_emails`', false, false, false, 'FORMATTED TEXT', 'RADIO');
        $this->send_notification_emails->Sortable = true; // Allow sort
        $this->send_notification_emails->Lookup = new Lookup('send_notification_emails', 'hr_leavetypes', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->send_notification_emails->OptionCount = 2;
        $this->send_notification_emails->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->send_notification_emails->Param, "CustomMsg");
        $this->Fields['send_notification_emails'] = &$this->send_notification_emails;

        // leave_group
        $this->leave_group = new DbField('hr_leavetypes', 'hr_leavetypes', 'x_leave_group', 'leave_group', '`leave_group`', '`leave_group`', 20, 20, -1, false, '`leave_group`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->leave_group->Sortable = true; // Allow sort
        $this->leave_group->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->leave_group->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->leave_group->Param, "CustomMsg");
        $this->Fields['leave_group'] = &$this->leave_group;

        // leave_color
        $this->leave_color = new DbField('hr_leavetypes', 'hr_leavetypes', 'x_leave_color', 'leave_color', '`leave_color`', '`leave_color`', 200, 10, -1, false, '`leave_color`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->leave_color->Sortable = true; // Allow sort
        $this->leave_color->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->leave_color->Param, "CustomMsg");
        $this->Fields['leave_color'] = &$this->leave_color;

        // max_carried_forward_amount
        $this->max_carried_forward_amount = new DbField('hr_leavetypes', 'hr_leavetypes', 'x_max_carried_forward_amount', 'max_carried_forward_amount', '`max_carried_forward_amount`', '`max_carried_forward_amount`', 3, 11, -1, false, '`max_carried_forward_amount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->max_carried_forward_amount->Sortable = true; // Allow sort
        $this->max_carried_forward_amount->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->max_carried_forward_amount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->max_carried_forward_amount->Param, "CustomMsg");
        $this->Fields['max_carried_forward_amount'] = &$this->max_carried_forward_amount;

        // HospID
        $this->HospID = new DbField('hr_leavetypes', 'hr_leavetypes', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`hr_leavetypes`";
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
        $this->name->DbValue = $row['name'];
        $this->supervisor_leave_assign->DbValue = $row['supervisor_leave_assign'];
        $this->employee_can_apply->DbValue = $row['employee_can_apply'];
        $this->apply_beyond_current->DbValue = $row['apply_beyond_current'];
        $this->leave_accrue->DbValue = $row['leave_accrue'];
        $this->carried_forward->DbValue = $row['carried_forward'];
        $this->default_per_year->DbValue = $row['default_per_year'];
        $this->carried_forward_percentage->DbValue = $row['carried_forward_percentage'];
        $this->carried_forward_leave_availability->DbValue = $row['carried_forward_leave_availability'];
        $this->propotionate_on_joined_date->DbValue = $row['propotionate_on_joined_date'];
        $this->send_notification_emails->DbValue = $row['send_notification_emails'];
        $this->leave_group->DbValue = $row['leave_group'];
        $this->leave_color->DbValue = $row['leave_color'];
        $this->max_carried_forward_amount->DbValue = $row['max_carried_forward_amount'];
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
        return $_SESSION[$name] ?? GetUrl("HrLeavetypesList");
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
        if ($pageName == "HrLeavetypesView") {
            return $Language->phrase("View");
        } elseif ($pageName == "HrLeavetypesEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "HrLeavetypesAdd") {
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
                return "HrLeavetypesView";
            case Config("API_ADD_ACTION"):
                return "HrLeavetypesAdd";
            case Config("API_EDIT_ACTION"):
                return "HrLeavetypesEdit";
            case Config("API_DELETE_ACTION"):
                return "HrLeavetypesDelete";
            case Config("API_LIST_ACTION"):
                return "HrLeavetypesList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "HrLeavetypesList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("HrLeavetypesView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("HrLeavetypesView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "HrLeavetypesAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "HrLeavetypesAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("HrLeavetypesEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("HrLeavetypesAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("HrLeavetypesDelete", $this->getUrlParm());
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
        $this->name->setDbValue($row['name']);
        $this->supervisor_leave_assign->setDbValue($row['supervisor_leave_assign']);
        $this->employee_can_apply->setDbValue($row['employee_can_apply']);
        $this->apply_beyond_current->setDbValue($row['apply_beyond_current']);
        $this->leave_accrue->setDbValue($row['leave_accrue']);
        $this->carried_forward->setDbValue($row['carried_forward']);
        $this->default_per_year->setDbValue($row['default_per_year']);
        $this->carried_forward_percentage->setDbValue($row['carried_forward_percentage']);
        $this->carried_forward_leave_availability->setDbValue($row['carried_forward_leave_availability']);
        $this->propotionate_on_joined_date->setDbValue($row['propotionate_on_joined_date']);
        $this->send_notification_emails->setDbValue($row['send_notification_emails']);
        $this->leave_group->setDbValue($row['leave_group']);
        $this->leave_color->setDbValue($row['leave_color']);
        $this->max_carried_forward_amount->setDbValue($row['max_carried_forward_amount']);
        $this->HospID->setDbValue($row['HospID']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // name

        // supervisor_leave_assign

        // employee_can_apply

        // apply_beyond_current

        // leave_accrue

        // carried_forward

        // default_per_year

        // carried_forward_percentage

        // carried_forward_leave_availability

        // propotionate_on_joined_date

        // send_notification_emails

        // leave_group

        // leave_color

        // max_carried_forward_amount

        // HospID

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // name
        $this->name->ViewValue = $this->name->CurrentValue;
        $this->name->ViewCustomAttributes = "";

        // supervisor_leave_assign
        if (strval($this->supervisor_leave_assign->CurrentValue) != "") {
            $this->supervisor_leave_assign->ViewValue = $this->supervisor_leave_assign->optionCaption($this->supervisor_leave_assign->CurrentValue);
        } else {
            $this->supervisor_leave_assign->ViewValue = null;
        }
        $this->supervisor_leave_assign->ViewCustomAttributes = "";

        // employee_can_apply
        if (strval($this->employee_can_apply->CurrentValue) != "") {
            $this->employee_can_apply->ViewValue = $this->employee_can_apply->optionCaption($this->employee_can_apply->CurrentValue);
        } else {
            $this->employee_can_apply->ViewValue = null;
        }
        $this->employee_can_apply->ViewCustomAttributes = "";

        // apply_beyond_current
        if (strval($this->apply_beyond_current->CurrentValue) != "") {
            $this->apply_beyond_current->ViewValue = $this->apply_beyond_current->optionCaption($this->apply_beyond_current->CurrentValue);
        } else {
            $this->apply_beyond_current->ViewValue = null;
        }
        $this->apply_beyond_current->ViewCustomAttributes = "";

        // leave_accrue
        if (strval($this->leave_accrue->CurrentValue) != "") {
            $this->leave_accrue->ViewValue = $this->leave_accrue->optionCaption($this->leave_accrue->CurrentValue);
        } else {
            $this->leave_accrue->ViewValue = null;
        }
        $this->leave_accrue->ViewCustomAttributes = "";

        // carried_forward
        if (strval($this->carried_forward->CurrentValue) != "") {
            $this->carried_forward->ViewValue = $this->carried_forward->optionCaption($this->carried_forward->CurrentValue);
        } else {
            $this->carried_forward->ViewValue = null;
        }
        $this->carried_forward->ViewCustomAttributes = "";

        // default_per_year
        $this->default_per_year->ViewValue = $this->default_per_year->CurrentValue;
        $this->default_per_year->ViewValue = FormatNumber($this->default_per_year->ViewValue, 2, -2, -2, -2);
        $this->default_per_year->ViewCustomAttributes = "";

        // carried_forward_percentage
        $this->carried_forward_percentage->ViewValue = $this->carried_forward_percentage->CurrentValue;
        $this->carried_forward_percentage->ViewValue = FormatNumber($this->carried_forward_percentage->ViewValue, 0, -2, -2, -2);
        $this->carried_forward_percentage->ViewCustomAttributes = "";

        // carried_forward_leave_availability
        $this->carried_forward_leave_availability->ViewValue = $this->carried_forward_leave_availability->CurrentValue;
        $this->carried_forward_leave_availability->ViewValue = FormatNumber($this->carried_forward_leave_availability->ViewValue, 0, -2, -2, -2);
        $this->carried_forward_leave_availability->ViewCustomAttributes = "";

        // propotionate_on_joined_date
        if (strval($this->propotionate_on_joined_date->CurrentValue) != "") {
            $this->propotionate_on_joined_date->ViewValue = $this->propotionate_on_joined_date->optionCaption($this->propotionate_on_joined_date->CurrentValue);
        } else {
            $this->propotionate_on_joined_date->ViewValue = null;
        }
        $this->propotionate_on_joined_date->ViewCustomAttributes = "";

        // send_notification_emails
        if (strval($this->send_notification_emails->CurrentValue) != "") {
            $this->send_notification_emails->ViewValue = $this->send_notification_emails->optionCaption($this->send_notification_emails->CurrentValue);
        } else {
            $this->send_notification_emails->ViewValue = null;
        }
        $this->send_notification_emails->ViewCustomAttributes = "";

        // leave_group
        $this->leave_group->ViewValue = $this->leave_group->CurrentValue;
        $this->leave_group->ViewValue = FormatNumber($this->leave_group->ViewValue, 0, -2, -2, -2);
        $this->leave_group->ViewCustomAttributes = "";

        // leave_color
        $this->leave_color->ViewValue = $this->leave_color->CurrentValue;
        $this->leave_color->ViewCustomAttributes = "";

        // max_carried_forward_amount
        $this->max_carried_forward_amount->ViewValue = $this->max_carried_forward_amount->CurrentValue;
        $this->max_carried_forward_amount->ViewValue = FormatNumber($this->max_carried_forward_amount->ViewValue, 0, -2, -2, -2);
        $this->max_carried_forward_amount->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // name
        $this->name->LinkCustomAttributes = "";
        $this->name->HrefValue = "";
        $this->name->TooltipValue = "";

        // supervisor_leave_assign
        $this->supervisor_leave_assign->LinkCustomAttributes = "";
        $this->supervisor_leave_assign->HrefValue = "";
        $this->supervisor_leave_assign->TooltipValue = "";

        // employee_can_apply
        $this->employee_can_apply->LinkCustomAttributes = "";
        $this->employee_can_apply->HrefValue = "";
        $this->employee_can_apply->TooltipValue = "";

        // apply_beyond_current
        $this->apply_beyond_current->LinkCustomAttributes = "";
        $this->apply_beyond_current->HrefValue = "";
        $this->apply_beyond_current->TooltipValue = "";

        // leave_accrue
        $this->leave_accrue->LinkCustomAttributes = "";
        $this->leave_accrue->HrefValue = "";
        $this->leave_accrue->TooltipValue = "";

        // carried_forward
        $this->carried_forward->LinkCustomAttributes = "";
        $this->carried_forward->HrefValue = "";
        $this->carried_forward->TooltipValue = "";

        // default_per_year
        $this->default_per_year->LinkCustomAttributes = "";
        $this->default_per_year->HrefValue = "";
        $this->default_per_year->TooltipValue = "";

        // carried_forward_percentage
        $this->carried_forward_percentage->LinkCustomAttributes = "";
        $this->carried_forward_percentage->HrefValue = "";
        $this->carried_forward_percentage->TooltipValue = "";

        // carried_forward_leave_availability
        $this->carried_forward_leave_availability->LinkCustomAttributes = "";
        $this->carried_forward_leave_availability->HrefValue = "";
        $this->carried_forward_leave_availability->TooltipValue = "";

        // propotionate_on_joined_date
        $this->propotionate_on_joined_date->LinkCustomAttributes = "";
        $this->propotionate_on_joined_date->HrefValue = "";
        $this->propotionate_on_joined_date->TooltipValue = "";

        // send_notification_emails
        $this->send_notification_emails->LinkCustomAttributes = "";
        $this->send_notification_emails->HrefValue = "";
        $this->send_notification_emails->TooltipValue = "";

        // leave_group
        $this->leave_group->LinkCustomAttributes = "";
        $this->leave_group->HrefValue = "";
        $this->leave_group->TooltipValue = "";

        // leave_color
        $this->leave_color->LinkCustomAttributes = "";
        $this->leave_color->HrefValue = "";
        $this->leave_color->TooltipValue = "";

        // max_carried_forward_amount
        $this->max_carried_forward_amount->LinkCustomAttributes = "";
        $this->max_carried_forward_amount->HrefValue = "";
        $this->max_carried_forward_amount->TooltipValue = "";

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

        // id
        $this->id->EditAttrs["class"] = "form-control";
        $this->id->EditCustomAttributes = "";
        $this->id->EditValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // name
        $this->name->EditAttrs["class"] = "form-control";
        $this->name->EditCustomAttributes = "";
        if (!$this->name->Raw) {
            $this->name->CurrentValue = HtmlDecode($this->name->CurrentValue);
        }
        $this->name->EditValue = $this->name->CurrentValue;
        $this->name->PlaceHolder = RemoveHtml($this->name->caption());

        // supervisor_leave_assign
        $this->supervisor_leave_assign->EditCustomAttributes = "";
        $this->supervisor_leave_assign->EditValue = $this->supervisor_leave_assign->options(false);
        $this->supervisor_leave_assign->PlaceHolder = RemoveHtml($this->supervisor_leave_assign->caption());

        // employee_can_apply
        $this->employee_can_apply->EditCustomAttributes = "";
        $this->employee_can_apply->EditValue = $this->employee_can_apply->options(false);
        $this->employee_can_apply->PlaceHolder = RemoveHtml($this->employee_can_apply->caption());

        // apply_beyond_current
        $this->apply_beyond_current->EditCustomAttributes = "";
        $this->apply_beyond_current->EditValue = $this->apply_beyond_current->options(false);
        $this->apply_beyond_current->PlaceHolder = RemoveHtml($this->apply_beyond_current->caption());

        // leave_accrue
        $this->leave_accrue->EditCustomAttributes = "";
        $this->leave_accrue->EditValue = $this->leave_accrue->options(false);
        $this->leave_accrue->PlaceHolder = RemoveHtml($this->leave_accrue->caption());

        // carried_forward
        $this->carried_forward->EditCustomAttributes = "";
        $this->carried_forward->EditValue = $this->carried_forward->options(false);
        $this->carried_forward->PlaceHolder = RemoveHtml($this->carried_forward->caption());

        // default_per_year
        $this->default_per_year->EditAttrs["class"] = "form-control";
        $this->default_per_year->EditCustomAttributes = "";
        $this->default_per_year->EditValue = $this->default_per_year->CurrentValue;
        $this->default_per_year->PlaceHolder = RemoveHtml($this->default_per_year->caption());
        if (strval($this->default_per_year->EditValue) != "" && is_numeric($this->default_per_year->EditValue)) {
            $this->default_per_year->EditValue = FormatNumber($this->default_per_year->EditValue, -2, -2, -2, -2);
        }

        // carried_forward_percentage
        $this->carried_forward_percentage->EditAttrs["class"] = "form-control";
        $this->carried_forward_percentage->EditCustomAttributes = "";
        $this->carried_forward_percentage->EditValue = $this->carried_forward_percentage->CurrentValue;
        $this->carried_forward_percentage->PlaceHolder = RemoveHtml($this->carried_forward_percentage->caption());

        // carried_forward_leave_availability
        $this->carried_forward_leave_availability->EditAttrs["class"] = "form-control";
        $this->carried_forward_leave_availability->EditCustomAttributes = "";
        $this->carried_forward_leave_availability->EditValue = $this->carried_forward_leave_availability->CurrentValue;
        $this->carried_forward_leave_availability->PlaceHolder = RemoveHtml($this->carried_forward_leave_availability->caption());

        // propotionate_on_joined_date
        $this->propotionate_on_joined_date->EditCustomAttributes = "";
        $this->propotionate_on_joined_date->EditValue = $this->propotionate_on_joined_date->options(false);
        $this->propotionate_on_joined_date->PlaceHolder = RemoveHtml($this->propotionate_on_joined_date->caption());

        // send_notification_emails
        $this->send_notification_emails->EditCustomAttributes = "";
        $this->send_notification_emails->EditValue = $this->send_notification_emails->options(false);
        $this->send_notification_emails->PlaceHolder = RemoveHtml($this->send_notification_emails->caption());

        // leave_group
        $this->leave_group->EditAttrs["class"] = "form-control";
        $this->leave_group->EditCustomAttributes = "";
        $this->leave_group->EditValue = $this->leave_group->CurrentValue;
        $this->leave_group->PlaceHolder = RemoveHtml($this->leave_group->caption());

        // leave_color
        $this->leave_color->EditAttrs["class"] = "form-control";
        $this->leave_color->EditCustomAttributes = "";
        if (!$this->leave_color->Raw) {
            $this->leave_color->CurrentValue = HtmlDecode($this->leave_color->CurrentValue);
        }
        $this->leave_color->EditValue = $this->leave_color->CurrentValue;
        $this->leave_color->PlaceHolder = RemoveHtml($this->leave_color->caption());

        // max_carried_forward_amount
        $this->max_carried_forward_amount->EditAttrs["class"] = "form-control";
        $this->max_carried_forward_amount->EditCustomAttributes = "";
        $this->max_carried_forward_amount->EditValue = $this->max_carried_forward_amount->CurrentValue;
        $this->max_carried_forward_amount->PlaceHolder = RemoveHtml($this->max_carried_forward_amount->caption());

        // HospID

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
                    $doc->exportCaption($this->name);
                    $doc->exportCaption($this->supervisor_leave_assign);
                    $doc->exportCaption($this->employee_can_apply);
                    $doc->exportCaption($this->apply_beyond_current);
                    $doc->exportCaption($this->leave_accrue);
                    $doc->exportCaption($this->carried_forward);
                    $doc->exportCaption($this->default_per_year);
                    $doc->exportCaption($this->carried_forward_percentage);
                    $doc->exportCaption($this->carried_forward_leave_availability);
                    $doc->exportCaption($this->propotionate_on_joined_date);
                    $doc->exportCaption($this->send_notification_emails);
                    $doc->exportCaption($this->leave_group);
                    $doc->exportCaption($this->leave_color);
                    $doc->exportCaption($this->max_carried_forward_amount);
                    $doc->exportCaption($this->HospID);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->name);
                    $doc->exportCaption($this->supervisor_leave_assign);
                    $doc->exportCaption($this->employee_can_apply);
                    $doc->exportCaption($this->apply_beyond_current);
                    $doc->exportCaption($this->leave_accrue);
                    $doc->exportCaption($this->carried_forward);
                    $doc->exportCaption($this->default_per_year);
                    $doc->exportCaption($this->carried_forward_percentage);
                    $doc->exportCaption($this->carried_forward_leave_availability);
                    $doc->exportCaption($this->propotionate_on_joined_date);
                    $doc->exportCaption($this->send_notification_emails);
                    $doc->exportCaption($this->leave_group);
                    $doc->exportCaption($this->leave_color);
                    $doc->exportCaption($this->max_carried_forward_amount);
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
                        $doc->exportField($this->id);
                        $doc->exportField($this->name);
                        $doc->exportField($this->supervisor_leave_assign);
                        $doc->exportField($this->employee_can_apply);
                        $doc->exportField($this->apply_beyond_current);
                        $doc->exportField($this->leave_accrue);
                        $doc->exportField($this->carried_forward);
                        $doc->exportField($this->default_per_year);
                        $doc->exportField($this->carried_forward_percentage);
                        $doc->exportField($this->carried_forward_leave_availability);
                        $doc->exportField($this->propotionate_on_joined_date);
                        $doc->exportField($this->send_notification_emails);
                        $doc->exportField($this->leave_group);
                        $doc->exportField($this->leave_color);
                        $doc->exportField($this->max_carried_forward_amount);
                        $doc->exportField($this->HospID);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->name);
                        $doc->exportField($this->supervisor_leave_assign);
                        $doc->exportField($this->employee_can_apply);
                        $doc->exportField($this->apply_beyond_current);
                        $doc->exportField($this->leave_accrue);
                        $doc->exportField($this->carried_forward);
                        $doc->exportField($this->default_per_year);
                        $doc->exportField($this->carried_forward_percentage);
                        $doc->exportField($this->carried_forward_leave_availability);
                        $doc->exportField($this->propotionate_on_joined_date);
                        $doc->exportField($this->send_notification_emails);
                        $doc->exportField($this->leave_group);
                        $doc->exportField($this->leave_color);
                        $doc->exportField($this->max_carried_forward_amount);
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
