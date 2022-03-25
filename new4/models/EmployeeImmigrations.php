<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for employee_immigrations
 */
class EmployeeImmigrations extends DbTable
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
    public $document;
    public $documentname;
    public $valid_until;
    public $status;
    public $details;
    public $attachment1;
    public $attachment2;
    public $attachment3;
    public $created;
    public $updated;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'employee_immigrations';
        $this->TableName = 'employee_immigrations';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`employee_immigrations`";
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
        $this->id = new DbField('employee_immigrations', 'employee_immigrations', 'x_id', 'id', '`id`', '`id`', 20, 20, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // employee
        $this->employee = new DbField('employee_immigrations', 'employee_immigrations', 'x_employee', 'employee', '`employee`', '`employee`', 3, 20, -1, false, '`employee`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->employee->Nullable = false; // NOT NULL field
        $this->employee->Required = true; // Required field
        $this->employee->Sortable = true; // Allow sort
        $this->employee->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->employee->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->employee->Param, "CustomMsg");
        $this->Fields['employee'] = &$this->employee;

        // document
        $this->document = new DbField('employee_immigrations', 'employee_immigrations', 'x_document', 'document', '`document`', '`document`', 20, 20, -1, false, '`document`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->document->Sortable = true; // Allow sort
        $this->document->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->document->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->document->Param, "CustomMsg");
        $this->Fields['document'] = &$this->document;

        // documentname
        $this->documentname = new DbField('employee_immigrations', 'employee_immigrations', 'x_documentname', 'documentname', '`documentname`', '`documentname`', 200, 150, -1, false, '`documentname`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->documentname->Nullable = false; // NOT NULL field
        $this->documentname->Required = true; // Required field
        $this->documentname->Sortable = true; // Allow sort
        $this->documentname->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->documentname->Param, "CustomMsg");
        $this->Fields['documentname'] = &$this->documentname;

        // valid_until
        $this->valid_until = new DbField('employee_immigrations', 'employee_immigrations', 'x_valid_until', 'valid_until', '`valid_until`', CastDateFieldForLike("`valid_until`", 0, "DB"), 133, 10, 0, false, '`valid_until`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->valid_until->Nullable = false; // NOT NULL field
        $this->valid_until->Required = true; // Required field
        $this->valid_until->Sortable = true; // Allow sort
        $this->valid_until->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->valid_until->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->valid_until->Param, "CustomMsg");
        $this->Fields['valid_until'] = &$this->valid_until;

        // status
        $this->status = new DbField('employee_immigrations', 'employee_immigrations', 'x_status', 'status', '`status`', '`status`', 202, 8, -1, false, '`status`', false, false, false, 'FORMATTED TEXT', 'RADIO');
        $this->status->Sortable = true; // Allow sort
        $this->status->Lookup = new Lookup('status', 'employee_immigrations', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->status->OptionCount = 3;
        $this->status->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->status->Param, "CustomMsg");
        $this->Fields['status'] = &$this->status;

        // details
        $this->details = new DbField('employee_immigrations', 'employee_immigrations', 'x_details', 'details', '`details`', '`details`', 201, 65535, -1, false, '`details`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->details->Sortable = true; // Allow sort
        $this->details->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->details->Param, "CustomMsg");
        $this->Fields['details'] = &$this->details;

        // attachment1
        $this->attachment1 = new DbField('employee_immigrations', 'employee_immigrations', 'x_attachment1', 'attachment1', '`attachment1`', '`attachment1`', 200, 100, -1, false, '`attachment1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->attachment1->Sortable = true; // Allow sort
        $this->attachment1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->attachment1->Param, "CustomMsg");
        $this->Fields['attachment1'] = &$this->attachment1;

        // attachment2
        $this->attachment2 = new DbField('employee_immigrations', 'employee_immigrations', 'x_attachment2', 'attachment2', '`attachment2`', '`attachment2`', 200, 100, -1, false, '`attachment2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->attachment2->Sortable = true; // Allow sort
        $this->attachment2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->attachment2->Param, "CustomMsg");
        $this->Fields['attachment2'] = &$this->attachment2;

        // attachment3
        $this->attachment3 = new DbField('employee_immigrations', 'employee_immigrations', 'x_attachment3', 'attachment3', '`attachment3`', '`attachment3`', 200, 100, -1, false, '`attachment3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->attachment3->Sortable = true; // Allow sort
        $this->attachment3->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->attachment3->Param, "CustomMsg");
        $this->Fields['attachment3'] = &$this->attachment3;

        // created
        $this->created = new DbField('employee_immigrations', 'employee_immigrations', 'x_created', 'created', '`created`', CastDateFieldForLike("`created`", 0, "DB"), 135, 19, 0, false, '`created`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->created->Sortable = true; // Allow sort
        $this->created->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->created->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->created->Param, "CustomMsg");
        $this->Fields['created'] = &$this->created;

        // updated
        $this->updated = new DbField('employee_immigrations', 'employee_immigrations', 'x_updated', 'updated', '`updated`', CastDateFieldForLike("`updated`", 0, "DB"), 135, 19, 0, false, '`updated`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->updated->Sortable = true; // Allow sort
        $this->updated->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->updated->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->updated->Param, "CustomMsg");
        $this->Fields['updated'] = &$this->updated;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`employee_immigrations`";
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
        $this->document->DbValue = $row['document'];
        $this->documentname->DbValue = $row['documentname'];
        $this->valid_until->DbValue = $row['valid_until'];
        $this->status->DbValue = $row['status'];
        $this->details->DbValue = $row['details'];
        $this->attachment1->DbValue = $row['attachment1'];
        $this->attachment2->DbValue = $row['attachment2'];
        $this->attachment3->DbValue = $row['attachment3'];
        $this->created->DbValue = $row['created'];
        $this->updated->DbValue = $row['updated'];
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
        return $_SESSION[$name] ?? GetUrl("EmployeeImmigrationsList");
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
        if ($pageName == "EmployeeImmigrationsView") {
            return $Language->phrase("View");
        } elseif ($pageName == "EmployeeImmigrationsEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "EmployeeImmigrationsAdd") {
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
                return "EmployeeImmigrationsView";
            case Config("API_ADD_ACTION"):
                return "EmployeeImmigrationsAdd";
            case Config("API_EDIT_ACTION"):
                return "EmployeeImmigrationsEdit";
            case Config("API_DELETE_ACTION"):
                return "EmployeeImmigrationsDelete";
            case Config("API_LIST_ACTION"):
                return "EmployeeImmigrationsList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "EmployeeImmigrationsList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("EmployeeImmigrationsView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("EmployeeImmigrationsView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "EmployeeImmigrationsAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "EmployeeImmigrationsAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("EmployeeImmigrationsEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("EmployeeImmigrationsAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("EmployeeImmigrationsDelete", $this->getUrlParm());
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
        $this->document->setDbValue($row['document']);
        $this->documentname->setDbValue($row['documentname']);
        $this->valid_until->setDbValue($row['valid_until']);
        $this->status->setDbValue($row['status']);
        $this->details->setDbValue($row['details']);
        $this->attachment1->setDbValue($row['attachment1']);
        $this->attachment2->setDbValue($row['attachment2']);
        $this->attachment3->setDbValue($row['attachment3']);
        $this->created->setDbValue($row['created']);
        $this->updated->setDbValue($row['updated']);
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

        // document

        // documentname

        // valid_until

        // status

        // details

        // attachment1

        // attachment2

        // attachment3

        // created

        // updated

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // employee
        $this->employee->ViewValue = $this->employee->CurrentValue;
        $this->employee->ViewValue = FormatNumber($this->employee->ViewValue, 0, -2, -2, -2);
        $this->employee->ViewCustomAttributes = "";

        // document
        $this->document->ViewValue = $this->document->CurrentValue;
        $this->document->ViewValue = FormatNumber($this->document->ViewValue, 0, -2, -2, -2);
        $this->document->ViewCustomAttributes = "";

        // documentname
        $this->documentname->ViewValue = $this->documentname->CurrentValue;
        $this->documentname->ViewCustomAttributes = "";

        // valid_until
        $this->valid_until->ViewValue = $this->valid_until->CurrentValue;
        $this->valid_until->ViewValue = FormatDateTime($this->valid_until->ViewValue, 0);
        $this->valid_until->ViewCustomAttributes = "";

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

        // attachment1
        $this->attachment1->ViewValue = $this->attachment1->CurrentValue;
        $this->attachment1->ViewCustomAttributes = "";

        // attachment2
        $this->attachment2->ViewValue = $this->attachment2->CurrentValue;
        $this->attachment2->ViewCustomAttributes = "";

        // attachment3
        $this->attachment3->ViewValue = $this->attachment3->CurrentValue;
        $this->attachment3->ViewCustomAttributes = "";

        // created
        $this->created->ViewValue = $this->created->CurrentValue;
        $this->created->ViewValue = FormatDateTime($this->created->ViewValue, 0);
        $this->created->ViewCustomAttributes = "";

        // updated
        $this->updated->ViewValue = $this->updated->CurrentValue;
        $this->updated->ViewValue = FormatDateTime($this->updated->ViewValue, 0);
        $this->updated->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // employee
        $this->employee->LinkCustomAttributes = "";
        $this->employee->HrefValue = "";
        $this->employee->TooltipValue = "";

        // document
        $this->document->LinkCustomAttributes = "";
        $this->document->HrefValue = "";
        $this->document->TooltipValue = "";

        // documentname
        $this->documentname->LinkCustomAttributes = "";
        $this->documentname->HrefValue = "";
        $this->documentname->TooltipValue = "";

        // valid_until
        $this->valid_until->LinkCustomAttributes = "";
        $this->valid_until->HrefValue = "";
        $this->valid_until->TooltipValue = "";

        // status
        $this->status->LinkCustomAttributes = "";
        $this->status->HrefValue = "";
        $this->status->TooltipValue = "";

        // details
        $this->details->LinkCustomAttributes = "";
        $this->details->HrefValue = "";
        $this->details->TooltipValue = "";

        // attachment1
        $this->attachment1->LinkCustomAttributes = "";
        $this->attachment1->HrefValue = "";
        $this->attachment1->TooltipValue = "";

        // attachment2
        $this->attachment2->LinkCustomAttributes = "";
        $this->attachment2->HrefValue = "";
        $this->attachment2->TooltipValue = "";

        // attachment3
        $this->attachment3->LinkCustomAttributes = "";
        $this->attachment3->HrefValue = "";
        $this->attachment3->TooltipValue = "";

        // created
        $this->created->LinkCustomAttributes = "";
        $this->created->HrefValue = "";
        $this->created->TooltipValue = "";

        // updated
        $this->updated->LinkCustomAttributes = "";
        $this->updated->HrefValue = "";
        $this->updated->TooltipValue = "";

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

        // document
        $this->document->EditAttrs["class"] = "form-control";
        $this->document->EditCustomAttributes = "";
        $this->document->EditValue = $this->document->CurrentValue;
        $this->document->PlaceHolder = RemoveHtml($this->document->caption());

        // documentname
        $this->documentname->EditAttrs["class"] = "form-control";
        $this->documentname->EditCustomAttributes = "";
        if (!$this->documentname->Raw) {
            $this->documentname->CurrentValue = HtmlDecode($this->documentname->CurrentValue);
        }
        $this->documentname->EditValue = $this->documentname->CurrentValue;
        $this->documentname->PlaceHolder = RemoveHtml($this->documentname->caption());

        // valid_until
        $this->valid_until->EditAttrs["class"] = "form-control";
        $this->valid_until->EditCustomAttributes = "";
        $this->valid_until->EditValue = FormatDateTime($this->valid_until->CurrentValue, 8);
        $this->valid_until->PlaceHolder = RemoveHtml($this->valid_until->caption());

        // status
        $this->status->EditCustomAttributes = "";
        $this->status->EditValue = $this->status->options(false);
        $this->status->PlaceHolder = RemoveHtml($this->status->caption());

        // details
        $this->details->EditAttrs["class"] = "form-control";
        $this->details->EditCustomAttributes = "";
        $this->details->EditValue = $this->details->CurrentValue;
        $this->details->PlaceHolder = RemoveHtml($this->details->caption());

        // attachment1
        $this->attachment1->EditAttrs["class"] = "form-control";
        $this->attachment1->EditCustomAttributes = "";
        if (!$this->attachment1->Raw) {
            $this->attachment1->CurrentValue = HtmlDecode($this->attachment1->CurrentValue);
        }
        $this->attachment1->EditValue = $this->attachment1->CurrentValue;
        $this->attachment1->PlaceHolder = RemoveHtml($this->attachment1->caption());

        // attachment2
        $this->attachment2->EditAttrs["class"] = "form-control";
        $this->attachment2->EditCustomAttributes = "";
        if (!$this->attachment2->Raw) {
            $this->attachment2->CurrentValue = HtmlDecode($this->attachment2->CurrentValue);
        }
        $this->attachment2->EditValue = $this->attachment2->CurrentValue;
        $this->attachment2->PlaceHolder = RemoveHtml($this->attachment2->caption());

        // attachment3
        $this->attachment3->EditAttrs["class"] = "form-control";
        $this->attachment3->EditCustomAttributes = "";
        if (!$this->attachment3->Raw) {
            $this->attachment3->CurrentValue = HtmlDecode($this->attachment3->CurrentValue);
        }
        $this->attachment3->EditValue = $this->attachment3->CurrentValue;
        $this->attachment3->PlaceHolder = RemoveHtml($this->attachment3->caption());

        // created
        $this->created->EditAttrs["class"] = "form-control";
        $this->created->EditCustomAttributes = "";
        $this->created->EditValue = FormatDateTime($this->created->CurrentValue, 8);
        $this->created->PlaceHolder = RemoveHtml($this->created->caption());

        // updated
        $this->updated->EditAttrs["class"] = "form-control";
        $this->updated->EditCustomAttributes = "";
        $this->updated->EditValue = FormatDateTime($this->updated->CurrentValue, 8);
        $this->updated->PlaceHolder = RemoveHtml($this->updated->caption());

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
                    $doc->exportCaption($this->document);
                    $doc->exportCaption($this->documentname);
                    $doc->exportCaption($this->valid_until);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->details);
                    $doc->exportCaption($this->attachment1);
                    $doc->exportCaption($this->attachment2);
                    $doc->exportCaption($this->attachment3);
                    $doc->exportCaption($this->created);
                    $doc->exportCaption($this->updated);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->employee);
                    $doc->exportCaption($this->document);
                    $doc->exportCaption($this->documentname);
                    $doc->exportCaption($this->valid_until);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->attachment1);
                    $doc->exportCaption($this->attachment2);
                    $doc->exportCaption($this->attachment3);
                    $doc->exportCaption($this->created);
                    $doc->exportCaption($this->updated);
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
                        $doc->exportField($this->document);
                        $doc->exportField($this->documentname);
                        $doc->exportField($this->valid_until);
                        $doc->exportField($this->status);
                        $doc->exportField($this->details);
                        $doc->exportField($this->attachment1);
                        $doc->exportField($this->attachment2);
                        $doc->exportField($this->attachment3);
                        $doc->exportField($this->created);
                        $doc->exportField($this->updated);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->employee);
                        $doc->exportField($this->document);
                        $doc->exportField($this->documentname);
                        $doc->exportField($this->valid_until);
                        $doc->exportField($this->status);
                        $doc->exportField($this->attachment1);
                        $doc->exportField($this->attachment2);
                        $doc->exportField($this->attachment3);
                        $doc->exportField($this->created);
                        $doc->exportField($this->updated);
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
