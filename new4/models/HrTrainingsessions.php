<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for hr_trainingsessions
 */
class HrTrainingsessions extends DbTable
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
    public $course;
    public $description;
    public $scheduled;
    public $dueDate;
    public $deliveryMethod;
    public $deliveryLocation;
    public $status;
    public $attendanceType;
    public $attachment;
    public $created;
    public $updated;
    public $requireProof;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'hr_trainingsessions';
        $this->TableName = 'hr_trainingsessions';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`hr_trainingsessions`";
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
        $this->id = new DbField('hr_trainingsessions', 'hr_trainingsessions', 'x_id', 'id', '`id`', '`id`', 20, 20, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // name
        $this->name = new DbField('hr_trainingsessions', 'hr_trainingsessions', 'x_name', 'name', '`name`', '`name`', 201, 300, -1, false, '`name`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->name->Nullable = false; // NOT NULL field
        $this->name->Required = true; // Required field
        $this->name->Sortable = true; // Allow sort
        $this->name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->name->Param, "CustomMsg");
        $this->Fields['name'] = &$this->name;

        // course
        $this->course = new DbField('hr_trainingsessions', 'hr_trainingsessions', 'x_course', 'course', '`course`', '`course`', 20, 20, -1, false, '`course`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->course->Nullable = false; // NOT NULL field
        $this->course->Required = true; // Required field
        $this->course->Sortable = true; // Allow sort
        $this->course->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->course->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->course->Param, "CustomMsg");
        $this->Fields['course'] = &$this->course;

        // description
        $this->description = new DbField('hr_trainingsessions', 'hr_trainingsessions', 'x_description', 'description', '`description`', '`description`', 201, 65535, -1, false, '`description`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->description->Sortable = true; // Allow sort
        $this->description->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->description->Param, "CustomMsg");
        $this->Fields['description'] = &$this->description;

        // scheduled
        $this->scheduled = new DbField('hr_trainingsessions', 'hr_trainingsessions', 'x_scheduled', 'scheduled', '`scheduled`', CastDateFieldForLike("`scheduled`", 0, "DB"), 135, 19, 0, false, '`scheduled`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->scheduled->Sortable = true; // Allow sort
        $this->scheduled->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->scheduled->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->scheduled->Param, "CustomMsg");
        $this->Fields['scheduled'] = &$this->scheduled;

        // dueDate
        $this->dueDate = new DbField('hr_trainingsessions', 'hr_trainingsessions', 'x_dueDate', 'dueDate', '`dueDate`', CastDateFieldForLike("`dueDate`", 0, "DB"), 135, 19, 0, false, '`dueDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->dueDate->Sortable = true; // Allow sort
        $this->dueDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->dueDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->dueDate->Param, "CustomMsg");
        $this->Fields['dueDate'] = &$this->dueDate;

        // deliveryMethod
        $this->deliveryMethod = new DbField('hr_trainingsessions', 'hr_trainingsessions', 'x_deliveryMethod', 'deliveryMethod', '`deliveryMethod`', '`deliveryMethod`', 202, 10, -1, false, '`deliveryMethod`', false, false, false, 'FORMATTED TEXT', 'RADIO');
        $this->deliveryMethod->Sortable = true; // Allow sort
        $this->deliveryMethod->Lookup = new Lookup('deliveryMethod', 'hr_trainingsessions', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->deliveryMethod->OptionCount = 3;
        $this->deliveryMethod->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->deliveryMethod->Param, "CustomMsg");
        $this->Fields['deliveryMethod'] = &$this->deliveryMethod;

        // deliveryLocation
        $this->deliveryLocation = new DbField('hr_trainingsessions', 'hr_trainingsessions', 'x_deliveryLocation', 'deliveryLocation', '`deliveryLocation`', '`deliveryLocation`', 201, 500, -1, false, '`deliveryLocation`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->deliveryLocation->Sortable = true; // Allow sort
        $this->deliveryLocation->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->deliveryLocation->Param, "CustomMsg");
        $this->Fields['deliveryLocation'] = &$this->deliveryLocation;

        // status
        $this->status = new DbField('hr_trainingsessions', 'hr_trainingsessions', 'x_status', 'status', '`status`', '`status`', 202, 9, -1, false, '`status`', false, false, false, 'FORMATTED TEXT', 'RADIO');
        $this->status->Sortable = true; // Allow sort
        $this->status->Lookup = new Lookup('status', 'hr_trainingsessions', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->status->OptionCount = 4;
        $this->status->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->status->Param, "CustomMsg");
        $this->Fields['status'] = &$this->status;

        // attendanceType
        $this->attendanceType = new DbField('hr_trainingsessions', 'hr_trainingsessions', 'x_attendanceType', 'attendanceType', '`attendanceType`', '`attendanceType`', 202, 7, -1, false, '`attendanceType`', false, false, false, 'FORMATTED TEXT', 'RADIO');
        $this->attendanceType->Sortable = true; // Allow sort
        $this->attendanceType->Lookup = new Lookup('attendanceType', 'hr_trainingsessions', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->attendanceType->OptionCount = 2;
        $this->attendanceType->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->attendanceType->Param, "CustomMsg");
        $this->Fields['attendanceType'] = &$this->attendanceType;

        // attachment
        $this->attachment = new DbField('hr_trainingsessions', 'hr_trainingsessions', 'x_attachment', 'attachment', '`attachment`', '`attachment`', 201, 300, -1, false, '`attachment`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->attachment->Sortable = true; // Allow sort
        $this->attachment->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->attachment->Param, "CustomMsg");
        $this->Fields['attachment'] = &$this->attachment;

        // created
        $this->created = new DbField('hr_trainingsessions', 'hr_trainingsessions', 'x_created', 'created', '`created`', CastDateFieldForLike("`created`", 0, "DB"), 135, 19, 0, false, '`created`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->created->Sortable = true; // Allow sort
        $this->created->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->created->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->created->Param, "CustomMsg");
        $this->Fields['created'] = &$this->created;

        // updated
        $this->updated = new DbField('hr_trainingsessions', 'hr_trainingsessions', 'x_updated', 'updated', '`updated`', CastDateFieldForLike("`updated`", 0, "DB"), 135, 19, 0, false, '`updated`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->updated->Sortable = true; // Allow sort
        $this->updated->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->updated->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->updated->Param, "CustomMsg");
        $this->Fields['updated'] = &$this->updated;

        // requireProof
        $this->requireProof = new DbField('hr_trainingsessions', 'hr_trainingsessions', 'x_requireProof', 'requireProof', '`requireProof`', '`requireProof`', 202, 3, -1, false, '`requireProof`', false, false, false, 'FORMATTED TEXT', 'RADIO');
        $this->requireProof->Sortable = true; // Allow sort
        $this->requireProof->Lookup = new Lookup('requireProof', 'hr_trainingsessions', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->requireProof->OptionCount = 2;
        $this->requireProof->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->requireProof->Param, "CustomMsg");
        $this->Fields['requireProof'] = &$this->requireProof;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`hr_trainingsessions`";
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
        $this->course->DbValue = $row['course'];
        $this->description->DbValue = $row['description'];
        $this->scheduled->DbValue = $row['scheduled'];
        $this->dueDate->DbValue = $row['dueDate'];
        $this->deliveryMethod->DbValue = $row['deliveryMethod'];
        $this->deliveryLocation->DbValue = $row['deliveryLocation'];
        $this->status->DbValue = $row['status'];
        $this->attendanceType->DbValue = $row['attendanceType'];
        $this->attachment->DbValue = $row['attachment'];
        $this->created->DbValue = $row['created'];
        $this->updated->DbValue = $row['updated'];
        $this->requireProof->DbValue = $row['requireProof'];
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
        return $_SESSION[$name] ?? GetUrl("HrTrainingsessionsList");
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
        if ($pageName == "HrTrainingsessionsView") {
            return $Language->phrase("View");
        } elseif ($pageName == "HrTrainingsessionsEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "HrTrainingsessionsAdd") {
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
                return "HrTrainingsessionsView";
            case Config("API_ADD_ACTION"):
                return "HrTrainingsessionsAdd";
            case Config("API_EDIT_ACTION"):
                return "HrTrainingsessionsEdit";
            case Config("API_DELETE_ACTION"):
                return "HrTrainingsessionsDelete";
            case Config("API_LIST_ACTION"):
                return "HrTrainingsessionsList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "HrTrainingsessionsList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("HrTrainingsessionsView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("HrTrainingsessionsView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "HrTrainingsessionsAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "HrTrainingsessionsAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("HrTrainingsessionsEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("HrTrainingsessionsAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("HrTrainingsessionsDelete", $this->getUrlParm());
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
        $this->course->setDbValue($row['course']);
        $this->description->setDbValue($row['description']);
        $this->scheduled->setDbValue($row['scheduled']);
        $this->dueDate->setDbValue($row['dueDate']);
        $this->deliveryMethod->setDbValue($row['deliveryMethod']);
        $this->deliveryLocation->setDbValue($row['deliveryLocation']);
        $this->status->setDbValue($row['status']);
        $this->attendanceType->setDbValue($row['attendanceType']);
        $this->attachment->setDbValue($row['attachment']);
        $this->created->setDbValue($row['created']);
        $this->updated->setDbValue($row['updated']);
        $this->requireProof->setDbValue($row['requireProof']);
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

        // course

        // description

        // scheduled

        // dueDate

        // deliveryMethod

        // deliveryLocation

        // status

        // attendanceType

        // attachment

        // created

        // updated

        // requireProof

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // name
        $this->name->ViewValue = $this->name->CurrentValue;
        $this->name->ViewCustomAttributes = "";

        // course
        $this->course->ViewValue = $this->course->CurrentValue;
        $this->course->ViewValue = FormatNumber($this->course->ViewValue, 0, -2, -2, -2);
        $this->course->ViewCustomAttributes = "";

        // description
        $this->description->ViewValue = $this->description->CurrentValue;
        $this->description->ViewCustomAttributes = "";

        // scheduled
        $this->scheduled->ViewValue = $this->scheduled->CurrentValue;
        $this->scheduled->ViewValue = FormatDateTime($this->scheduled->ViewValue, 0);
        $this->scheduled->ViewCustomAttributes = "";

        // dueDate
        $this->dueDate->ViewValue = $this->dueDate->CurrentValue;
        $this->dueDate->ViewValue = FormatDateTime($this->dueDate->ViewValue, 0);
        $this->dueDate->ViewCustomAttributes = "";

        // deliveryMethod
        if (strval($this->deliveryMethod->CurrentValue) != "") {
            $this->deliveryMethod->ViewValue = $this->deliveryMethod->optionCaption($this->deliveryMethod->CurrentValue);
        } else {
            $this->deliveryMethod->ViewValue = null;
        }
        $this->deliveryMethod->ViewCustomAttributes = "";

        // deliveryLocation
        $this->deliveryLocation->ViewValue = $this->deliveryLocation->CurrentValue;
        $this->deliveryLocation->ViewCustomAttributes = "";

        // status
        if (strval($this->status->CurrentValue) != "") {
            $this->status->ViewValue = $this->status->optionCaption($this->status->CurrentValue);
        } else {
            $this->status->ViewValue = null;
        }
        $this->status->ViewCustomAttributes = "";

        // attendanceType
        if (strval($this->attendanceType->CurrentValue) != "") {
            $this->attendanceType->ViewValue = $this->attendanceType->optionCaption($this->attendanceType->CurrentValue);
        } else {
            $this->attendanceType->ViewValue = null;
        }
        $this->attendanceType->ViewCustomAttributes = "";

        // attachment
        $this->attachment->ViewValue = $this->attachment->CurrentValue;
        $this->attachment->ViewCustomAttributes = "";

        // created
        $this->created->ViewValue = $this->created->CurrentValue;
        $this->created->ViewValue = FormatDateTime($this->created->ViewValue, 0);
        $this->created->ViewCustomAttributes = "";

        // updated
        $this->updated->ViewValue = $this->updated->CurrentValue;
        $this->updated->ViewValue = FormatDateTime($this->updated->ViewValue, 0);
        $this->updated->ViewCustomAttributes = "";

        // requireProof
        if (strval($this->requireProof->CurrentValue) != "") {
            $this->requireProof->ViewValue = $this->requireProof->optionCaption($this->requireProof->CurrentValue);
        } else {
            $this->requireProof->ViewValue = null;
        }
        $this->requireProof->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // name
        $this->name->LinkCustomAttributes = "";
        $this->name->HrefValue = "";
        $this->name->TooltipValue = "";

        // course
        $this->course->LinkCustomAttributes = "";
        $this->course->HrefValue = "";
        $this->course->TooltipValue = "";

        // description
        $this->description->LinkCustomAttributes = "";
        $this->description->HrefValue = "";
        $this->description->TooltipValue = "";

        // scheduled
        $this->scheduled->LinkCustomAttributes = "";
        $this->scheduled->HrefValue = "";
        $this->scheduled->TooltipValue = "";

        // dueDate
        $this->dueDate->LinkCustomAttributes = "";
        $this->dueDate->HrefValue = "";
        $this->dueDate->TooltipValue = "";

        // deliveryMethod
        $this->deliveryMethod->LinkCustomAttributes = "";
        $this->deliveryMethod->HrefValue = "";
        $this->deliveryMethod->TooltipValue = "";

        // deliveryLocation
        $this->deliveryLocation->LinkCustomAttributes = "";
        $this->deliveryLocation->HrefValue = "";
        $this->deliveryLocation->TooltipValue = "";

        // status
        $this->status->LinkCustomAttributes = "";
        $this->status->HrefValue = "";
        $this->status->TooltipValue = "";

        // attendanceType
        $this->attendanceType->LinkCustomAttributes = "";
        $this->attendanceType->HrefValue = "";
        $this->attendanceType->TooltipValue = "";

        // attachment
        $this->attachment->LinkCustomAttributes = "";
        $this->attachment->HrefValue = "";
        $this->attachment->TooltipValue = "";

        // created
        $this->created->LinkCustomAttributes = "";
        $this->created->HrefValue = "";
        $this->created->TooltipValue = "";

        // updated
        $this->updated->LinkCustomAttributes = "";
        $this->updated->HrefValue = "";
        $this->updated->TooltipValue = "";

        // requireProof
        $this->requireProof->LinkCustomAttributes = "";
        $this->requireProof->HrefValue = "";
        $this->requireProof->TooltipValue = "";

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
        $this->name->EditValue = $this->name->CurrentValue;
        $this->name->PlaceHolder = RemoveHtml($this->name->caption());

        // course
        $this->course->EditAttrs["class"] = "form-control";
        $this->course->EditCustomAttributes = "";
        $this->course->EditValue = $this->course->CurrentValue;
        $this->course->PlaceHolder = RemoveHtml($this->course->caption());

        // description
        $this->description->EditAttrs["class"] = "form-control";
        $this->description->EditCustomAttributes = "";
        $this->description->EditValue = $this->description->CurrentValue;
        $this->description->PlaceHolder = RemoveHtml($this->description->caption());

        // scheduled
        $this->scheduled->EditAttrs["class"] = "form-control";
        $this->scheduled->EditCustomAttributes = "";
        $this->scheduled->EditValue = FormatDateTime($this->scheduled->CurrentValue, 8);
        $this->scheduled->PlaceHolder = RemoveHtml($this->scheduled->caption());

        // dueDate
        $this->dueDate->EditAttrs["class"] = "form-control";
        $this->dueDate->EditCustomAttributes = "";
        $this->dueDate->EditValue = FormatDateTime($this->dueDate->CurrentValue, 8);
        $this->dueDate->PlaceHolder = RemoveHtml($this->dueDate->caption());

        // deliveryMethod
        $this->deliveryMethod->EditCustomAttributes = "";
        $this->deliveryMethod->EditValue = $this->deliveryMethod->options(false);
        $this->deliveryMethod->PlaceHolder = RemoveHtml($this->deliveryMethod->caption());

        // deliveryLocation
        $this->deliveryLocation->EditAttrs["class"] = "form-control";
        $this->deliveryLocation->EditCustomAttributes = "";
        $this->deliveryLocation->EditValue = $this->deliveryLocation->CurrentValue;
        $this->deliveryLocation->PlaceHolder = RemoveHtml($this->deliveryLocation->caption());

        // status
        $this->status->EditCustomAttributes = "";
        $this->status->EditValue = $this->status->options(false);
        $this->status->PlaceHolder = RemoveHtml($this->status->caption());

        // attendanceType
        $this->attendanceType->EditCustomAttributes = "";
        $this->attendanceType->EditValue = $this->attendanceType->options(false);
        $this->attendanceType->PlaceHolder = RemoveHtml($this->attendanceType->caption());

        // attachment
        $this->attachment->EditAttrs["class"] = "form-control";
        $this->attachment->EditCustomAttributes = "";
        $this->attachment->EditValue = $this->attachment->CurrentValue;
        $this->attachment->PlaceHolder = RemoveHtml($this->attachment->caption());

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

        // requireProof
        $this->requireProof->EditCustomAttributes = "";
        $this->requireProof->EditValue = $this->requireProof->options(false);
        $this->requireProof->PlaceHolder = RemoveHtml($this->requireProof->caption());

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
                    $doc->exportCaption($this->course);
                    $doc->exportCaption($this->description);
                    $doc->exportCaption($this->scheduled);
                    $doc->exportCaption($this->dueDate);
                    $doc->exportCaption($this->deliveryMethod);
                    $doc->exportCaption($this->deliveryLocation);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->attendanceType);
                    $doc->exportCaption($this->attachment);
                    $doc->exportCaption($this->created);
                    $doc->exportCaption($this->updated);
                    $doc->exportCaption($this->requireProof);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->course);
                    $doc->exportCaption($this->scheduled);
                    $doc->exportCaption($this->dueDate);
                    $doc->exportCaption($this->deliveryMethod);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->attendanceType);
                    $doc->exportCaption($this->created);
                    $doc->exportCaption($this->updated);
                    $doc->exportCaption($this->requireProof);
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
                        $doc->exportField($this->course);
                        $doc->exportField($this->description);
                        $doc->exportField($this->scheduled);
                        $doc->exportField($this->dueDate);
                        $doc->exportField($this->deliveryMethod);
                        $doc->exportField($this->deliveryLocation);
                        $doc->exportField($this->status);
                        $doc->exportField($this->attendanceType);
                        $doc->exportField($this->attachment);
                        $doc->exportField($this->created);
                        $doc->exportField($this->updated);
                        $doc->exportField($this->requireProof);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->course);
                        $doc->exportField($this->scheduled);
                        $doc->exportField($this->dueDate);
                        $doc->exportField($this->deliveryMethod);
                        $doc->exportField($this->status);
                        $doc->exportField($this->attendanceType);
                        $doc->exportField($this->created);
                        $doc->exportField($this->updated);
                        $doc->exportField($this->requireProof);
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
