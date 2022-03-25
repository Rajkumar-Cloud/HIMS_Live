<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for task_management
 */
class TaskManagement extends DbTable
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
    public $TaskName;
    public $AssignTo;
    public $Description;
    public $StartDate;
    public $EndDate;
    public $StatusOfTask;
    public $ForwardTo;
    public $createdby;
    public $createddatetime;
    public $modifiedby;
    public $modifieddatetime;
    public $GetUserName;
    public $GetModifiedName;
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
        $this->TableVar = 'task_management';
        $this->TableName = 'task_management';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`task_management`";
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
        $this->id = new DbField('task_management', 'task_management', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // TaskName
        $this->TaskName = new DbField('task_management', 'task_management', 'x_TaskName', 'TaskName', '`TaskName`', '`TaskName`', 200, 45, -1, false, '`TaskName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TaskName->Sortable = true; // Allow sort
        $this->TaskName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TaskName->Param, "CustomMsg");
        $this->Fields['TaskName'] = &$this->TaskName;

        // AssignTo
        $this->AssignTo = new DbField('task_management', 'task_management', 'x_AssignTo', 'AssignTo', '`AssignTo`', '`AssignTo`', 200, 45, -1, false, '`AssignTo`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->AssignTo->Sortable = true; // Allow sort
        $this->AssignTo->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->AssignTo->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->AssignTo->Lookup = new Lookup('AssignTo', 'user_login', false, 'User_Name', ["User_Name","","",""], [], [], [], [], [], [], '', '');
        $this->AssignTo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AssignTo->Param, "CustomMsg");
        $this->Fields['AssignTo'] = &$this->AssignTo;

        // Description
        $this->Description = new DbField('task_management', 'task_management', 'x_Description', 'Description', '`Description`', '`Description`', 201, 65535, -1, false, '`Description`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Description->Sortable = true; // Allow sort
        $this->Description->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Description->Param, "CustomMsg");
        $this->Fields['Description'] = &$this->Description;

        // StartDate
        $this->StartDate = new DbField('task_management', 'task_management', 'x_StartDate', 'StartDate', '`StartDate`', CastDateFieldForLike("`StartDate`", 7, "DB"), 135, 19, 7, false, '`StartDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StartDate->Sortable = true; // Allow sort
        $this->StartDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->StartDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StartDate->Param, "CustomMsg");
        $this->Fields['StartDate'] = &$this->StartDate;

        // EndDate
        $this->EndDate = new DbField('task_management', 'task_management', 'x_EndDate', 'EndDate', '`EndDate`', CastDateFieldForLike("`EndDate`", 7, "DB"), 135, 19, 7, false, '`EndDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EndDate->Sortable = true; // Allow sort
        $this->EndDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->EndDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EndDate->Param, "CustomMsg");
        $this->Fields['EndDate'] = &$this->EndDate;

        // StatusOfTask
        $this->StatusOfTask = new DbField('task_management', 'task_management', 'x_StatusOfTask', 'StatusOfTask', '`StatusOfTask`', '`StatusOfTask`', 200, 45, -1, false, '`StatusOfTask`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->StatusOfTask->Sortable = true; // Allow sort
        $this->StatusOfTask->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->StatusOfTask->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->StatusOfTask->Lookup = new Lookup('StatusOfTask', 'task_management', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->StatusOfTask->OptionCount = 3;
        $this->StatusOfTask->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StatusOfTask->Param, "CustomMsg");
        $this->Fields['StatusOfTask'] = &$this->StatusOfTask;

        // ForwardTo
        $this->ForwardTo = new DbField('task_management', 'task_management', 'x_ForwardTo', 'ForwardTo', '`ForwardTo`', '`ForwardTo`', 200, 45, -1, false, '`ForwardTo`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->ForwardTo->Sortable = true; // Allow sort
        $this->ForwardTo->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->ForwardTo->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->ForwardTo->Lookup = new Lookup('ForwardTo', 'user_login', false, 'User_Name', ["User_Name","","",""], [], [], [], [], [], [], '', '');
        $this->ForwardTo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ForwardTo->Param, "CustomMsg");
        $this->Fields['ForwardTo'] = &$this->ForwardTo;

        // createdby
        $this->createdby = new DbField('task_management', 'task_management', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 200, 45, -1, false, '`createdby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdby->Sortable = true; // Allow sort
        $this->createdby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createdby->Param, "CustomMsg");
        $this->Fields['createdby'] = &$this->createdby;

        // createddatetime
        $this->createddatetime = new DbField('task_management', 'task_management', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, false, '`createddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddatetime->Sortable = true; // Allow sort
        $this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->createddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createddatetime->Param, "CustomMsg");
        $this->Fields['createddatetime'] = &$this->createddatetime;

        // modifiedby
        $this->modifiedby = new DbField('task_management', 'task_management', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 200, 45, -1, false, '`modifiedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifiedby->Sortable = true; // Allow sort
        $this->modifiedby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifiedby->Param, "CustomMsg");
        $this->Fields['modifiedby'] = &$this->modifiedby;

        // modifieddatetime
        $this->modifieddatetime = new DbField('task_management', 'task_management', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, false, '`modifieddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifieddatetime->Sortable = true; // Allow sort
        $this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->modifieddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifieddatetime->Param, "CustomMsg");
        $this->Fields['modifieddatetime'] = &$this->modifieddatetime;

        // GetUserName
        $this->GetUserName = new DbField('task_management', 'task_management', 'x_GetUserName', 'GetUserName', '`GetUserName`', '`GetUserName`', 200, 45, -1, false, '`GetUserName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GetUserName->Sortable = true; // Allow sort
        $this->GetUserName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GetUserName->Param, "CustomMsg");
        $this->Fields['GetUserName'] = &$this->GetUserName;

        // GetModifiedName
        $this->GetModifiedName = new DbField('task_management', 'task_management', 'x_GetModifiedName', 'GetModifiedName', '`GetModifiedName`', '`GetModifiedName`', 200, 45, -1, false, '`GetModifiedName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GetModifiedName->Sortable = true; // Allow sort
        $this->GetModifiedName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GetModifiedName->Param, "CustomMsg");
        $this->Fields['GetModifiedName'] = &$this->GetModifiedName;

        // HospID
        $this->HospID = new DbField('task_management', 'task_management', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`task_management`";
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
        $this->TaskName->DbValue = $row['TaskName'];
        $this->AssignTo->DbValue = $row['AssignTo'];
        $this->Description->DbValue = $row['Description'];
        $this->StartDate->DbValue = $row['StartDate'];
        $this->EndDate->DbValue = $row['EndDate'];
        $this->StatusOfTask->DbValue = $row['StatusOfTask'];
        $this->ForwardTo->DbValue = $row['ForwardTo'];
        $this->createdby->DbValue = $row['createdby'];
        $this->createddatetime->DbValue = $row['createddatetime'];
        $this->modifiedby->DbValue = $row['modifiedby'];
        $this->modifieddatetime->DbValue = $row['modifieddatetime'];
        $this->GetUserName->DbValue = $row['GetUserName'];
        $this->GetModifiedName->DbValue = $row['GetModifiedName'];
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
        return $_SESSION[$name] ?? GetUrl("TaskManagementList");
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
        if ($pageName == "TaskManagementView") {
            return $Language->phrase("View");
        } elseif ($pageName == "TaskManagementEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "TaskManagementAdd") {
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
                return "TaskManagementView";
            case Config("API_ADD_ACTION"):
                return "TaskManagementAdd";
            case Config("API_EDIT_ACTION"):
                return "TaskManagementEdit";
            case Config("API_DELETE_ACTION"):
                return "TaskManagementDelete";
            case Config("API_LIST_ACTION"):
                return "TaskManagementList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "TaskManagementList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("TaskManagementView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("TaskManagementView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "TaskManagementAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "TaskManagementAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("TaskManagementEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("TaskManagementAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("TaskManagementDelete", $this->getUrlParm());
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
        $this->TaskName->setDbValue($row['TaskName']);
        $this->AssignTo->setDbValue($row['AssignTo']);
        $this->Description->setDbValue($row['Description']);
        $this->StartDate->setDbValue($row['StartDate']);
        $this->EndDate->setDbValue($row['EndDate']);
        $this->StatusOfTask->setDbValue($row['StatusOfTask']);
        $this->ForwardTo->setDbValue($row['ForwardTo']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->GetUserName->setDbValue($row['GetUserName']);
        $this->GetModifiedName->setDbValue($row['GetModifiedName']);
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

        // TaskName

        // AssignTo

        // Description

        // StartDate

        // EndDate

        // StatusOfTask

        // ForwardTo

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // GetUserName

        // GetModifiedName

        // HospID

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // TaskName
        $this->TaskName->ViewValue = $this->TaskName->CurrentValue;
        $this->TaskName->ViewCustomAttributes = "";

        // AssignTo
        $curVal = trim(strval($this->AssignTo->CurrentValue));
        if ($curVal != "") {
            $this->AssignTo->ViewValue = $this->AssignTo->lookupCacheOption($curVal);
            if ($this->AssignTo->ViewValue === null) { // Lookup from database
                $filterWrk = "`User_Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $lookupFilter = function() {
                    return "`HospID` = '".HospitalID()."' ";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->AssignTo->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->AssignTo->Lookup->renderViewRow($rswrk[0]);
                    $this->AssignTo->ViewValue = $this->AssignTo->displayValue($arwrk);
                } else {
                    $this->AssignTo->ViewValue = $this->AssignTo->CurrentValue;
                }
            }
        } else {
            $this->AssignTo->ViewValue = null;
        }
        $this->AssignTo->ViewCustomAttributes = "";

        // Description
        $this->Description->ViewValue = $this->Description->CurrentValue;
        $this->Description->ViewCustomAttributes = "";

        // StartDate
        $this->StartDate->ViewValue = $this->StartDate->CurrentValue;
        $this->StartDate->ViewValue = FormatDateTime($this->StartDate->ViewValue, 7);
        $this->StartDate->ViewCustomAttributes = "";

        // EndDate
        $this->EndDate->ViewValue = $this->EndDate->CurrentValue;
        $this->EndDate->ViewValue = FormatDateTime($this->EndDate->ViewValue, 7);
        $this->EndDate->ViewCustomAttributes = "";

        // StatusOfTask
        if (strval($this->StatusOfTask->CurrentValue) != "") {
            $this->StatusOfTask->ViewValue = $this->StatusOfTask->optionCaption($this->StatusOfTask->CurrentValue);
        } else {
            $this->StatusOfTask->ViewValue = null;
        }
        $this->StatusOfTask->ViewCustomAttributes = "";

        // ForwardTo
        $curVal = trim(strval($this->ForwardTo->CurrentValue));
        if ($curVal != "") {
            $this->ForwardTo->ViewValue = $this->ForwardTo->lookupCacheOption($curVal);
            if ($this->ForwardTo->ViewValue === null) { // Lookup from database
                $filterWrk = "`User_Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $lookupFilter = function() {
                    return "`HospID` = '".HospitalID()."' ";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->ForwardTo->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->ForwardTo->Lookup->renderViewRow($rswrk[0]);
                    $this->ForwardTo->ViewValue = $this->ForwardTo->displayValue($arwrk);
                } else {
                    $this->ForwardTo->ViewValue = $this->ForwardTo->CurrentValue;
                }
            }
        } else {
            $this->ForwardTo->ViewValue = null;
        }
        $this->ForwardTo->ViewCustomAttributes = "";

        // createdby
        $this->createdby->ViewValue = $this->createdby->CurrentValue;
        $this->createdby->ViewCustomAttributes = "";

        // createddatetime
        $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
        $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
        $this->createddatetime->ViewCustomAttributes = "";

        // modifiedby
        $this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
        $this->modifiedby->ViewCustomAttributes = "";

        // modifieddatetime
        $this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
        $this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
        $this->modifieddatetime->ViewCustomAttributes = "";

        // GetUserName
        $this->GetUserName->ViewValue = $this->GetUserName->CurrentValue;
        $this->GetUserName->ViewCustomAttributes = "";

        // GetModifiedName
        $this->GetModifiedName->ViewValue = $this->GetModifiedName->CurrentValue;
        $this->GetModifiedName->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // TaskName
        $this->TaskName->LinkCustomAttributes = "";
        $this->TaskName->HrefValue = "";
        $this->TaskName->TooltipValue = "";

        // AssignTo
        $this->AssignTo->LinkCustomAttributes = "";
        $this->AssignTo->HrefValue = "";
        $this->AssignTo->TooltipValue = "";

        // Description
        $this->Description->LinkCustomAttributes = "";
        $this->Description->HrefValue = "";
        $this->Description->TooltipValue = "";

        // StartDate
        $this->StartDate->LinkCustomAttributes = "";
        $this->StartDate->HrefValue = "";
        $this->StartDate->TooltipValue = "";

        // EndDate
        $this->EndDate->LinkCustomAttributes = "";
        $this->EndDate->HrefValue = "";
        $this->EndDate->TooltipValue = "";

        // StatusOfTask
        $this->StatusOfTask->LinkCustomAttributes = "";
        $this->StatusOfTask->HrefValue = "";
        $this->StatusOfTask->TooltipValue = "";

        // ForwardTo
        $this->ForwardTo->LinkCustomAttributes = "";
        $this->ForwardTo->HrefValue = "";
        $this->ForwardTo->TooltipValue = "";

        // createdby
        $this->createdby->LinkCustomAttributes = "";
        $this->createdby->HrefValue = "";
        $this->createdby->TooltipValue = "";

        // createddatetime
        $this->createddatetime->LinkCustomAttributes = "";
        $this->createddatetime->HrefValue = "";
        $this->createddatetime->TooltipValue = "";

        // modifiedby
        $this->modifiedby->LinkCustomAttributes = "";
        $this->modifiedby->HrefValue = "";
        $this->modifiedby->TooltipValue = "";

        // modifieddatetime
        $this->modifieddatetime->LinkCustomAttributes = "";
        $this->modifieddatetime->HrefValue = "";
        $this->modifieddatetime->TooltipValue = "";

        // GetUserName
        $this->GetUserName->LinkCustomAttributes = "";
        $this->GetUserName->HrefValue = "";
        $this->GetUserName->TooltipValue = "";

        // GetModifiedName
        $this->GetModifiedName->LinkCustomAttributes = "";
        $this->GetModifiedName->HrefValue = "";
        $this->GetModifiedName->TooltipValue = "";

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

        // TaskName
        $this->TaskName->EditAttrs["class"] = "form-control";
        $this->TaskName->EditCustomAttributes = "";
        if (!$this->TaskName->Raw) {
            $this->TaskName->CurrentValue = HtmlDecode($this->TaskName->CurrentValue);
        }
        $this->TaskName->EditValue = $this->TaskName->CurrentValue;
        $this->TaskName->PlaceHolder = RemoveHtml($this->TaskName->caption());

        // AssignTo
        $this->AssignTo->EditAttrs["class"] = "form-control";
        $this->AssignTo->EditCustomAttributes = "";
        $this->AssignTo->PlaceHolder = RemoveHtml($this->AssignTo->caption());

        // Description
        $this->Description->EditAttrs["class"] = "form-control";
        $this->Description->EditCustomAttributes = "";
        $this->Description->EditValue = $this->Description->CurrentValue;
        $this->Description->PlaceHolder = RemoveHtml($this->Description->caption());

        // StartDate
        $this->StartDate->EditAttrs["class"] = "form-control";
        $this->StartDate->EditCustomAttributes = "";
        $this->StartDate->EditValue = FormatDateTime($this->StartDate->CurrentValue, 7);
        $this->StartDate->PlaceHolder = RemoveHtml($this->StartDate->caption());

        // EndDate
        $this->EndDate->EditAttrs["class"] = "form-control";
        $this->EndDate->EditCustomAttributes = "";
        $this->EndDate->EditValue = FormatDateTime($this->EndDate->CurrentValue, 7);
        $this->EndDate->PlaceHolder = RemoveHtml($this->EndDate->caption());

        // StatusOfTask
        $this->StatusOfTask->EditAttrs["class"] = "form-control";
        $this->StatusOfTask->EditCustomAttributes = "";
        $this->StatusOfTask->EditValue = $this->StatusOfTask->options(true);
        $this->StatusOfTask->PlaceHolder = RemoveHtml($this->StatusOfTask->caption());

        // ForwardTo
        $this->ForwardTo->EditAttrs["class"] = "form-control";
        $this->ForwardTo->EditCustomAttributes = "";
        $this->ForwardTo->PlaceHolder = RemoveHtml($this->ForwardTo->caption());

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // GetUserName

        // GetModifiedName

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
                    $doc->exportCaption($this->TaskName);
                    $doc->exportCaption($this->AssignTo);
                    $doc->exportCaption($this->Description);
                    $doc->exportCaption($this->StartDate);
                    $doc->exportCaption($this->EndDate);
                    $doc->exportCaption($this->StatusOfTask);
                    $doc->exportCaption($this->ForwardTo);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->GetUserName);
                    $doc->exportCaption($this->GetModifiedName);
                    $doc->exportCaption($this->HospID);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->TaskName);
                    $doc->exportCaption($this->AssignTo);
                    $doc->exportCaption($this->StartDate);
                    $doc->exportCaption($this->EndDate);
                    $doc->exportCaption($this->StatusOfTask);
                    $doc->exportCaption($this->ForwardTo);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->GetUserName);
                    $doc->exportCaption($this->GetModifiedName);
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
                        $doc->exportField($this->TaskName);
                        $doc->exportField($this->AssignTo);
                        $doc->exportField($this->Description);
                        $doc->exportField($this->StartDate);
                        $doc->exportField($this->EndDate);
                        $doc->exportField($this->StatusOfTask);
                        $doc->exportField($this->ForwardTo);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->GetUserName);
                        $doc->exportField($this->GetModifiedName);
                        $doc->exportField($this->HospID);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->TaskName);
                        $doc->exportField($this->AssignTo);
                        $doc->exportField($this->StartDate);
                        $doc->exportField($this->EndDate);
                        $doc->exportField($this->StatusOfTask);
                        $doc->exportField($this->ForwardTo);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->GetUserName);
                        $doc->exportField($this->GetModifiedName);
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
