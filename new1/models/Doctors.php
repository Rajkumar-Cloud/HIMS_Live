<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for doctors
 */
class Doctors extends DbTable
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
    public $id;
    public $CODE;
    public $NAME;
    public $DEPARTMENT;
    public $start_time;
    public $end_time;
    public $slot_time;
    public $slot_days;
    public $scheduler_id;
    public $ProfilePic;
    public $Fees;
    public $Status;
    public $HospID;
    public $start_time1;
    public $end_time1;
    public $start_time2;
    public $end_time2;
    public $Designation;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'doctors';
        $this->TableName = 'doctors';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`doctors`";
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
        $this->id = new DbField('doctors', 'doctors', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['id'] = &$this->id;

        // CODE
        $this->CODE = new DbField('doctors', 'doctors', 'x_CODE', 'CODE', '`CODE`', '`CODE`', 200, 45, -1, false, '`CODE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CODE->Sortable = true; // Allow sort
        $this->Fields['CODE'] = &$this->CODE;

        // NAME
        $this->NAME = new DbField('doctors', 'doctors', 'x_NAME', 'NAME', '`NAME`', '`NAME`', 200, 45, -1, false, '`NAME`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NAME->Sortable = true; // Allow sort
        $this->Fields['NAME'] = &$this->NAME;

        // DEPARTMENT
        $this->DEPARTMENT = new DbField('doctors', 'doctors', 'x_DEPARTMENT', 'DEPARTMENT', '`DEPARTMENT`', '`DEPARTMENT`', 200, 45, -1, false, '`DEPARTMENT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DEPARTMENT->Sortable = true; // Allow sort
        $this->Fields['DEPARTMENT'] = &$this->DEPARTMENT;

        // start_time
        $this->start_time = new DbField('doctors', 'doctors', 'x_start_time', 'start_time', '`start_time`', '`start_time`', 200, 45, -1, false, '`start_time`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->start_time->Sortable = true; // Allow sort
        $this->Fields['start_time'] = &$this->start_time;

        // end_time
        $this->end_time = new DbField('doctors', 'doctors', 'x_end_time', 'end_time', '`end_time`', '`end_time`', 200, 45, -1, false, '`end_time`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->end_time->Sortable = true; // Allow sort
        $this->Fields['end_time'] = &$this->end_time;

        // slot_time
        $this->slot_time = new DbField('doctors', 'doctors', 'x_slot_time', 'slot_time', '`slot_time`', '`slot_time`', 200, 45, -1, false, '`slot_time`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->slot_time->Sortable = true; // Allow sort
        $this->Fields['slot_time'] = &$this->slot_time;

        // slot_days
        $this->slot_days = new DbField('doctors', 'doctors', 'x_slot_days', 'slot_days', '`slot_days`', '`slot_days`', 200, 45, -1, false, '`slot_days`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->slot_days->Sortable = true; // Allow sort
        $this->Fields['slot_days'] = &$this->slot_days;

        // scheduler_id
        $this->scheduler_id = new DbField('doctors', 'doctors', 'x_scheduler_id', 'scheduler_id', '`scheduler_id`', '`scheduler_id`', 200, 45, -1, false, '`scheduler_id`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->scheduler_id->Sortable = true; // Allow sort
        $this->Fields['scheduler_id'] = &$this->scheduler_id;

        // ProfilePic
        $this->ProfilePic = new DbField('doctors', 'doctors', 'x_ProfilePic', 'ProfilePic', '`ProfilePic`', '`ProfilePic`', 201, 450, -1, false, '`ProfilePic`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->ProfilePic->Sortable = true; // Allow sort
        $this->Fields['ProfilePic'] = &$this->ProfilePic;

        // Fees
        $this->Fees = new DbField('doctors', 'doctors', 'x_Fees', 'Fees', '`Fees`', '`Fees`', 5, 22, -1, false, '`Fees`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Fees->Sortable = true; // Allow sort
        $this->Fees->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Fees->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['Fees'] = &$this->Fees;

        // Status
        $this->Status = new DbField('doctors', 'doctors', 'x_Status', 'Status', '`Status`', '`Status`', 3, 11, -1, false, '`Status`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Status->Sortable = true; // Allow sort
        $this->Status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['Status'] = &$this->Status;

        // HospID
        $this->HospID = new DbField('doctors', 'doctors', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['HospID'] = &$this->HospID;

        // start_time1
        $this->start_time1 = new DbField('doctors', 'doctors', 'x_start_time1', 'start_time1', '`start_time1`', '`start_time1`', 200, 45, -1, false, '`start_time1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->start_time1->Sortable = true; // Allow sort
        $this->Fields['start_time1'] = &$this->start_time1;

        // end_time1
        $this->end_time1 = new DbField('doctors', 'doctors', 'x_end_time1', 'end_time1', '`end_time1`', '`end_time1`', 200, 45, -1, false, '`end_time1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->end_time1->Sortable = true; // Allow sort
        $this->Fields['end_time1'] = &$this->end_time1;

        // start_time2
        $this->start_time2 = new DbField('doctors', 'doctors', 'x_start_time2', 'start_time2', '`start_time2`', '`start_time2`', 200, 45, -1, false, '`start_time2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->start_time2->Sortable = true; // Allow sort
        $this->Fields['start_time2'] = &$this->start_time2;

        // end_time2
        $this->end_time2 = new DbField('doctors', 'doctors', 'x_end_time2', 'end_time2', '`end_time2`', '`end_time2`', 200, 45, -1, false, '`end_time2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->end_time2->Sortable = true; // Allow sort
        $this->Fields['end_time2'] = &$this->end_time2;

        // Designation
        $this->Designation = new DbField('doctors', 'doctors', 'x_Designation', 'Designation', '`Designation`', '`Designation`', 200, 45, -1, false, '`Designation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Designation->Sortable = true; // Allow sort
        $this->Fields['Designation'] = &$this->Designation;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`doctors`";
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
        $this->CODE->DbValue = $row['CODE'];
        $this->NAME->DbValue = $row['NAME'];
        $this->DEPARTMENT->DbValue = $row['DEPARTMENT'];
        $this->start_time->DbValue = $row['start_time'];
        $this->end_time->DbValue = $row['end_time'];
        $this->slot_time->DbValue = $row['slot_time'];
        $this->slot_days->DbValue = $row['slot_days'];
        $this->scheduler_id->DbValue = $row['scheduler_id'];
        $this->ProfilePic->DbValue = $row['ProfilePic'];
        $this->Fees->DbValue = $row['Fees'];
        $this->Status->DbValue = $row['Status'];
        $this->HospID->DbValue = $row['HospID'];
        $this->start_time1->DbValue = $row['start_time1'];
        $this->end_time1->DbValue = $row['end_time1'];
        $this->start_time2->DbValue = $row['start_time2'];
        $this->end_time2->DbValue = $row['end_time2'];
        $this->Designation->DbValue = $row['Designation'];
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
        $name = PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL");
        // Get referer URL automatically
        if (ReferUrl() != "" && ReferPageName() != CurrentPageName() && ReferPageName() != "login") { // Referer not same page or login page
            $_SESSION[$name] = ReferUrl(); // Save to Session
        }
        if (@$_SESSION[$name] != "") {
            return $_SESSION[$name];
        } else {
            return GetUrl("DoctorsList");
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
        if ($pageName == "DoctorsView") {
            return $Language->phrase("View");
        } elseif ($pageName == "DoctorsEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "DoctorsAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "DoctorsList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("DoctorsView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("DoctorsView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "DoctorsAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "DoctorsAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("DoctorsEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("DoctorsAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("DoctorsDelete", $this->getUrlParm());
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
        $this->CODE->setDbValue($row['CODE']);
        $this->NAME->setDbValue($row['NAME']);
        $this->DEPARTMENT->setDbValue($row['DEPARTMENT']);
        $this->start_time->setDbValue($row['start_time']);
        $this->end_time->setDbValue($row['end_time']);
        $this->slot_time->setDbValue($row['slot_time']);
        $this->slot_days->setDbValue($row['slot_days']);
        $this->scheduler_id->setDbValue($row['scheduler_id']);
        $this->ProfilePic->setDbValue($row['ProfilePic']);
        $this->Fees->setDbValue($row['Fees']);
        $this->Status->setDbValue($row['Status']);
        $this->HospID->setDbValue($row['HospID']);
        $this->start_time1->setDbValue($row['start_time1']);
        $this->end_time1->setDbValue($row['end_time1']);
        $this->start_time2->setDbValue($row['start_time2']);
        $this->end_time2->setDbValue($row['end_time2']);
        $this->Designation->setDbValue($row['Designation']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // CODE

        // NAME

        // DEPARTMENT

        // start_time

        // end_time

        // slot_time

        // slot_days

        // scheduler_id

        // ProfilePic

        // Fees

        // Status

        // HospID

        // start_time1

        // end_time1

        // start_time2

        // end_time2

        // Designation

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // CODE
        $this->CODE->ViewValue = $this->CODE->CurrentValue;
        $this->CODE->ViewCustomAttributes = "";

        // NAME
        $this->NAME->ViewValue = $this->NAME->CurrentValue;
        $this->NAME->ViewCustomAttributes = "";

        // DEPARTMENT
        $this->DEPARTMENT->ViewValue = $this->DEPARTMENT->CurrentValue;
        $this->DEPARTMENT->ViewCustomAttributes = "";

        // start_time
        $this->start_time->ViewValue = $this->start_time->CurrentValue;
        $this->start_time->ViewCustomAttributes = "";

        // end_time
        $this->end_time->ViewValue = $this->end_time->CurrentValue;
        $this->end_time->ViewCustomAttributes = "";

        // slot_time
        $this->slot_time->ViewValue = $this->slot_time->CurrentValue;
        $this->slot_time->ViewCustomAttributes = "";

        // slot_days
        $this->slot_days->ViewValue = $this->slot_days->CurrentValue;
        $this->slot_days->ViewCustomAttributes = "";

        // scheduler_id
        $this->scheduler_id->ViewValue = $this->scheduler_id->CurrentValue;
        $this->scheduler_id->ViewCustomAttributes = "";

        // ProfilePic
        $this->ProfilePic->ViewValue = $this->ProfilePic->CurrentValue;
        $this->ProfilePic->ViewCustomAttributes = "";

        // Fees
        $this->Fees->ViewValue = $this->Fees->CurrentValue;
        $this->Fees->ViewValue = FormatNumber($this->Fees->ViewValue, 2, -2, -2, -2);
        $this->Fees->ViewCustomAttributes = "";

        // Status
        $this->Status->ViewValue = $this->Status->CurrentValue;
        $this->Status->ViewValue = FormatNumber($this->Status->ViewValue, 0, -2, -2, -2);
        $this->Status->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

        // start_time1
        $this->start_time1->ViewValue = $this->start_time1->CurrentValue;
        $this->start_time1->ViewCustomAttributes = "";

        // end_time1
        $this->end_time1->ViewValue = $this->end_time1->CurrentValue;
        $this->end_time1->ViewCustomAttributes = "";

        // start_time2
        $this->start_time2->ViewValue = $this->start_time2->CurrentValue;
        $this->start_time2->ViewCustomAttributes = "";

        // end_time2
        $this->end_time2->ViewValue = $this->end_time2->CurrentValue;
        $this->end_time2->ViewCustomAttributes = "";

        // Designation
        $this->Designation->ViewValue = $this->Designation->CurrentValue;
        $this->Designation->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // CODE
        $this->CODE->LinkCustomAttributes = "";
        $this->CODE->HrefValue = "";
        $this->CODE->TooltipValue = "";

        // NAME
        $this->NAME->LinkCustomAttributes = "";
        $this->NAME->HrefValue = "";
        $this->NAME->TooltipValue = "";

        // DEPARTMENT
        $this->DEPARTMENT->LinkCustomAttributes = "";
        $this->DEPARTMENT->HrefValue = "";
        $this->DEPARTMENT->TooltipValue = "";

        // start_time
        $this->start_time->LinkCustomAttributes = "";
        $this->start_time->HrefValue = "";
        $this->start_time->TooltipValue = "";

        // end_time
        $this->end_time->LinkCustomAttributes = "";
        $this->end_time->HrefValue = "";
        $this->end_time->TooltipValue = "";

        // slot_time
        $this->slot_time->LinkCustomAttributes = "";
        $this->slot_time->HrefValue = "";
        $this->slot_time->TooltipValue = "";

        // slot_days
        $this->slot_days->LinkCustomAttributes = "";
        $this->slot_days->HrefValue = "";
        $this->slot_days->TooltipValue = "";

        // scheduler_id
        $this->scheduler_id->LinkCustomAttributes = "";
        $this->scheduler_id->HrefValue = "";
        $this->scheduler_id->TooltipValue = "";

        // ProfilePic
        $this->ProfilePic->LinkCustomAttributes = "";
        $this->ProfilePic->HrefValue = "";
        $this->ProfilePic->TooltipValue = "";

        // Fees
        $this->Fees->LinkCustomAttributes = "";
        $this->Fees->HrefValue = "";
        $this->Fees->TooltipValue = "";

        // Status
        $this->Status->LinkCustomAttributes = "";
        $this->Status->HrefValue = "";
        $this->Status->TooltipValue = "";

        // HospID
        $this->HospID->LinkCustomAttributes = "";
        $this->HospID->HrefValue = "";
        $this->HospID->TooltipValue = "";

        // start_time1
        $this->start_time1->LinkCustomAttributes = "";
        $this->start_time1->HrefValue = "";
        $this->start_time1->TooltipValue = "";

        // end_time1
        $this->end_time1->LinkCustomAttributes = "";
        $this->end_time1->HrefValue = "";
        $this->end_time1->TooltipValue = "";

        // start_time2
        $this->start_time2->LinkCustomAttributes = "";
        $this->start_time2->HrefValue = "";
        $this->start_time2->TooltipValue = "";

        // end_time2
        $this->end_time2->LinkCustomAttributes = "";
        $this->end_time2->HrefValue = "";
        $this->end_time2->TooltipValue = "";

        // Designation
        $this->Designation->LinkCustomAttributes = "";
        $this->Designation->HrefValue = "";
        $this->Designation->TooltipValue = "";

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

        // CODE
        $this->CODE->EditAttrs["class"] = "form-control";
        $this->CODE->EditCustomAttributes = "";
        if (!$this->CODE->Raw) {
            $this->CODE->CurrentValue = HtmlDecode($this->CODE->CurrentValue);
        }
        $this->CODE->EditValue = $this->CODE->CurrentValue;
        $this->CODE->PlaceHolder = RemoveHtml($this->CODE->caption());

        // NAME
        $this->NAME->EditAttrs["class"] = "form-control";
        $this->NAME->EditCustomAttributes = "";
        if (!$this->NAME->Raw) {
            $this->NAME->CurrentValue = HtmlDecode($this->NAME->CurrentValue);
        }
        $this->NAME->EditValue = $this->NAME->CurrentValue;
        $this->NAME->PlaceHolder = RemoveHtml($this->NAME->caption());

        // DEPARTMENT
        $this->DEPARTMENT->EditAttrs["class"] = "form-control";
        $this->DEPARTMENT->EditCustomAttributes = "";
        if (!$this->DEPARTMENT->Raw) {
            $this->DEPARTMENT->CurrentValue = HtmlDecode($this->DEPARTMENT->CurrentValue);
        }
        $this->DEPARTMENT->EditValue = $this->DEPARTMENT->CurrentValue;
        $this->DEPARTMENT->PlaceHolder = RemoveHtml($this->DEPARTMENT->caption());

        // start_time
        $this->start_time->EditAttrs["class"] = "form-control";
        $this->start_time->EditCustomAttributes = "";
        if (!$this->start_time->Raw) {
            $this->start_time->CurrentValue = HtmlDecode($this->start_time->CurrentValue);
        }
        $this->start_time->EditValue = $this->start_time->CurrentValue;
        $this->start_time->PlaceHolder = RemoveHtml($this->start_time->caption());

        // end_time
        $this->end_time->EditAttrs["class"] = "form-control";
        $this->end_time->EditCustomAttributes = "";
        if (!$this->end_time->Raw) {
            $this->end_time->CurrentValue = HtmlDecode($this->end_time->CurrentValue);
        }
        $this->end_time->EditValue = $this->end_time->CurrentValue;
        $this->end_time->PlaceHolder = RemoveHtml($this->end_time->caption());

        // slot_time
        $this->slot_time->EditAttrs["class"] = "form-control";
        $this->slot_time->EditCustomAttributes = "";
        if (!$this->slot_time->Raw) {
            $this->slot_time->CurrentValue = HtmlDecode($this->slot_time->CurrentValue);
        }
        $this->slot_time->EditValue = $this->slot_time->CurrentValue;
        $this->slot_time->PlaceHolder = RemoveHtml($this->slot_time->caption());

        // slot_days
        $this->slot_days->EditAttrs["class"] = "form-control";
        $this->slot_days->EditCustomAttributes = "";
        if (!$this->slot_days->Raw) {
            $this->slot_days->CurrentValue = HtmlDecode($this->slot_days->CurrentValue);
        }
        $this->slot_days->EditValue = $this->slot_days->CurrentValue;
        $this->slot_days->PlaceHolder = RemoveHtml($this->slot_days->caption());

        // scheduler_id
        $this->scheduler_id->EditAttrs["class"] = "form-control";
        $this->scheduler_id->EditCustomAttributes = "";
        if (!$this->scheduler_id->Raw) {
            $this->scheduler_id->CurrentValue = HtmlDecode($this->scheduler_id->CurrentValue);
        }
        $this->scheduler_id->EditValue = $this->scheduler_id->CurrentValue;
        $this->scheduler_id->PlaceHolder = RemoveHtml($this->scheduler_id->caption());

        // ProfilePic
        $this->ProfilePic->EditAttrs["class"] = "form-control";
        $this->ProfilePic->EditCustomAttributes = "";
        $this->ProfilePic->EditValue = $this->ProfilePic->CurrentValue;
        $this->ProfilePic->PlaceHolder = RemoveHtml($this->ProfilePic->caption());

        // Fees
        $this->Fees->EditAttrs["class"] = "form-control";
        $this->Fees->EditCustomAttributes = "";
        $this->Fees->EditValue = $this->Fees->CurrentValue;
        $this->Fees->PlaceHolder = RemoveHtml($this->Fees->caption());
        if (strval($this->Fees->EditValue) != "" && is_numeric($this->Fees->EditValue)) {
            $this->Fees->EditValue = FormatNumber($this->Fees->EditValue, -2, -2, -2, -2);
        }

        // Status
        $this->Status->EditAttrs["class"] = "form-control";
        $this->Status->EditCustomAttributes = "";
        $this->Status->EditValue = $this->Status->CurrentValue;
        $this->Status->PlaceHolder = RemoveHtml($this->Status->caption());

        // HospID
        $this->HospID->EditAttrs["class"] = "form-control";
        $this->HospID->EditCustomAttributes = "";
        $this->HospID->EditValue = $this->HospID->CurrentValue;
        $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

        // start_time1
        $this->start_time1->EditAttrs["class"] = "form-control";
        $this->start_time1->EditCustomAttributes = "";
        if (!$this->start_time1->Raw) {
            $this->start_time1->CurrentValue = HtmlDecode($this->start_time1->CurrentValue);
        }
        $this->start_time1->EditValue = $this->start_time1->CurrentValue;
        $this->start_time1->PlaceHolder = RemoveHtml($this->start_time1->caption());

        // end_time1
        $this->end_time1->EditAttrs["class"] = "form-control";
        $this->end_time1->EditCustomAttributes = "";
        if (!$this->end_time1->Raw) {
            $this->end_time1->CurrentValue = HtmlDecode($this->end_time1->CurrentValue);
        }
        $this->end_time1->EditValue = $this->end_time1->CurrentValue;
        $this->end_time1->PlaceHolder = RemoveHtml($this->end_time1->caption());

        // start_time2
        $this->start_time2->EditAttrs["class"] = "form-control";
        $this->start_time2->EditCustomAttributes = "";
        if (!$this->start_time2->Raw) {
            $this->start_time2->CurrentValue = HtmlDecode($this->start_time2->CurrentValue);
        }
        $this->start_time2->EditValue = $this->start_time2->CurrentValue;
        $this->start_time2->PlaceHolder = RemoveHtml($this->start_time2->caption());

        // end_time2
        $this->end_time2->EditAttrs["class"] = "form-control";
        $this->end_time2->EditCustomAttributes = "";
        if (!$this->end_time2->Raw) {
            $this->end_time2->CurrentValue = HtmlDecode($this->end_time2->CurrentValue);
        }
        $this->end_time2->EditValue = $this->end_time2->CurrentValue;
        $this->end_time2->PlaceHolder = RemoveHtml($this->end_time2->caption());

        // Designation
        $this->Designation->EditAttrs["class"] = "form-control";
        $this->Designation->EditCustomAttributes = "";
        if (!$this->Designation->Raw) {
            $this->Designation->CurrentValue = HtmlDecode($this->Designation->CurrentValue);
        }
        $this->Designation->EditValue = $this->Designation->CurrentValue;
        $this->Designation->PlaceHolder = RemoveHtml($this->Designation->caption());

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
                    $doc->exportCaption($this->CODE);
                    $doc->exportCaption($this->NAME);
                    $doc->exportCaption($this->DEPARTMENT);
                    $doc->exportCaption($this->start_time);
                    $doc->exportCaption($this->end_time);
                    $doc->exportCaption($this->slot_time);
                    $doc->exportCaption($this->slot_days);
                    $doc->exportCaption($this->scheduler_id);
                    $doc->exportCaption($this->ProfilePic);
                    $doc->exportCaption($this->Fees);
                    $doc->exportCaption($this->Status);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->start_time1);
                    $doc->exportCaption($this->end_time1);
                    $doc->exportCaption($this->start_time2);
                    $doc->exportCaption($this->end_time2);
                    $doc->exportCaption($this->Designation);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->CODE);
                    $doc->exportCaption($this->NAME);
                    $doc->exportCaption($this->DEPARTMENT);
                    $doc->exportCaption($this->start_time);
                    $doc->exportCaption($this->end_time);
                    $doc->exportCaption($this->slot_time);
                    $doc->exportCaption($this->slot_days);
                    $doc->exportCaption($this->scheduler_id);
                    $doc->exportCaption($this->Fees);
                    $doc->exportCaption($this->Status);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->start_time1);
                    $doc->exportCaption($this->end_time1);
                    $doc->exportCaption($this->start_time2);
                    $doc->exportCaption($this->end_time2);
                    $doc->exportCaption($this->Designation);
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
                        $doc->exportField($this->CODE);
                        $doc->exportField($this->NAME);
                        $doc->exportField($this->DEPARTMENT);
                        $doc->exportField($this->start_time);
                        $doc->exportField($this->end_time);
                        $doc->exportField($this->slot_time);
                        $doc->exportField($this->slot_days);
                        $doc->exportField($this->scheduler_id);
                        $doc->exportField($this->ProfilePic);
                        $doc->exportField($this->Fees);
                        $doc->exportField($this->Status);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->start_time1);
                        $doc->exportField($this->end_time1);
                        $doc->exportField($this->start_time2);
                        $doc->exportField($this->end_time2);
                        $doc->exportField($this->Designation);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->CODE);
                        $doc->exportField($this->NAME);
                        $doc->exportField($this->DEPARTMENT);
                        $doc->exportField($this->start_time);
                        $doc->exportField($this->end_time);
                        $doc->exportField($this->slot_time);
                        $doc->exportField($this->slot_days);
                        $doc->exportField($this->scheduler_id);
                        $doc->exportField($this->Fees);
                        $doc->exportField($this->Status);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->start_time1);
                        $doc->exportField($this->end_time1);
                        $doc->exportField($this->start_time2);
                        $doc->exportField($this->end_time2);
                        $doc->exportField($this->Designation);
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
