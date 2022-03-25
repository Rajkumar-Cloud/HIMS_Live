<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for crm_crmentity
 */
class CrmCrmentity extends DbTable
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
    public $crmid;
    public $smcreatorid;
    public $smownerid;
    public $shownerid;
    public $modifiedby;
    public $setype;
    public $description;
    public $attention;
    public $createdtime;
    public $modifiedtime;
    public $viewedtime;
    public $status;
    public $version;
    public $presence;
    public $deleted;
    public $was_read;
    public $_private;
    public $users;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'crm_crmentity';
        $this->TableName = 'crm_crmentity';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`crm_crmentity`";
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

        // crmid
        $this->crmid = new DbField('crm_crmentity', 'crm_crmentity', 'x_crmid', 'crmid', '`crmid`', '`crmid`', 3, 10, -1, false, '`crmid`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->crmid->IsAutoIncrement = true; // Autoincrement field
        $this->crmid->IsPrimaryKey = true; // Primary key field
        $this->crmid->Sortable = true; // Allow sort
        $this->crmid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->crmid->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->crmid->Param, "CustomMsg");
        $this->Fields['crmid'] = &$this->crmid;

        // smcreatorid
        $this->smcreatorid = new DbField('crm_crmentity', 'crm_crmentity', 'x_smcreatorid', 'smcreatorid', '`smcreatorid`', '`smcreatorid`', 18, 5, -1, false, '`smcreatorid`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->smcreatorid->Nullable = false; // NOT NULL field
        $this->smcreatorid->Sortable = true; // Allow sort
        $this->smcreatorid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->smcreatorid->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->smcreatorid->Param, "CustomMsg");
        $this->Fields['smcreatorid'] = &$this->smcreatorid;

        // smownerid
        $this->smownerid = new DbField('crm_crmentity', 'crm_crmentity', 'x_smownerid', 'smownerid', '`smownerid`', '`smownerid`', 18, 5, -1, false, '`smownerid`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->smownerid->Nullable = false; // NOT NULL field
        $this->smownerid->Sortable = true; // Allow sort
        $this->smownerid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->smownerid->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->smownerid->Param, "CustomMsg");
        $this->Fields['smownerid'] = &$this->smownerid;

        // shownerid
        $this->shownerid = new DbField('crm_crmentity', 'crm_crmentity', 'x_shownerid', 'shownerid', '`shownerid`', '`shownerid`', 16, 1, -1, false, '`shownerid`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->shownerid->Sortable = true; // Allow sort
        $this->shownerid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->shownerid->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->shownerid->Param, "CustomMsg");
        $this->Fields['shownerid'] = &$this->shownerid;

        // modifiedby
        $this->modifiedby = new DbField('crm_crmentity', 'crm_crmentity', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 18, 5, -1, false, '`modifiedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifiedby->Nullable = false; // NOT NULL field
        $this->modifiedby->Sortable = true; // Allow sort
        $this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->modifiedby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifiedby->Param, "CustomMsg");
        $this->Fields['modifiedby'] = &$this->modifiedby;

        // setype
        $this->setype = new DbField('crm_crmentity', 'crm_crmentity', 'x_setype', 'setype', '`setype`', '`setype`', 200, 30, -1, false, '`setype`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->setype->Nullable = false; // NOT NULL field
        $this->setype->Required = true; // Required field
        $this->setype->Sortable = true; // Allow sort
        $this->setype->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->setype->Param, "CustomMsg");
        $this->Fields['setype'] = &$this->setype;

        // description
        $this->description = new DbField('crm_crmentity', 'crm_crmentity', 'x_description', 'description', '`description`', '`description`', 201, 65535, -1, false, '`description`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->description->Sortable = true; // Allow sort
        $this->description->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->description->Param, "CustomMsg");
        $this->Fields['description'] = &$this->description;

        // attention
        $this->attention = new DbField('crm_crmentity', 'crm_crmentity', 'x_attention', 'attention', '`attention`', '`attention`', 201, 65535, -1, false, '`attention`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->attention->Sortable = true; // Allow sort
        $this->attention->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->attention->Param, "CustomMsg");
        $this->Fields['attention'] = &$this->attention;

        // createdtime
        $this->createdtime = new DbField('crm_crmentity', 'crm_crmentity', 'x_createdtime', 'createdtime', '`createdtime`', CastDateFieldForLike("`createdtime`", 0, "DB"), 135, 19, 0, false, '`createdtime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdtime->Nullable = false; // NOT NULL field
        $this->createdtime->Required = true; // Required field
        $this->createdtime->Sortable = true; // Allow sort
        $this->createdtime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->createdtime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createdtime->Param, "CustomMsg");
        $this->Fields['createdtime'] = &$this->createdtime;

        // modifiedtime
        $this->modifiedtime = new DbField('crm_crmentity', 'crm_crmentity', 'x_modifiedtime', 'modifiedtime', '`modifiedtime`', CastDateFieldForLike("`modifiedtime`", 0, "DB"), 135, 19, 0, false, '`modifiedtime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifiedtime->Nullable = false; // NOT NULL field
        $this->modifiedtime->Required = true; // Required field
        $this->modifiedtime->Sortable = true; // Allow sort
        $this->modifiedtime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->modifiedtime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifiedtime->Param, "CustomMsg");
        $this->Fields['modifiedtime'] = &$this->modifiedtime;

        // viewedtime
        $this->viewedtime = new DbField('crm_crmentity', 'crm_crmentity', 'x_viewedtime', 'viewedtime', '`viewedtime`', CastDateFieldForLike("`viewedtime`", 0, "DB"), 135, 19, 0, false, '`viewedtime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->viewedtime->Sortable = true; // Allow sort
        $this->viewedtime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->viewedtime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->viewedtime->Param, "CustomMsg");
        $this->Fields['viewedtime'] = &$this->viewedtime;

        // status
        $this->status = new DbField('crm_crmentity', 'crm_crmentity', 'x_status', 'status', '`status`', '`status`', 200, 50, -1, false, '`status`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->status->Sortable = true; // Allow sort
        $this->status->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->status->Param, "CustomMsg");
        $this->Fields['status'] = &$this->status;

        // version
        $this->version = new DbField('crm_crmentity', 'crm_crmentity', 'x_version', 'version', '`version`', '`version`', 19, 10, -1, false, '`version`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->version->Nullable = false; // NOT NULL field
        $this->version->Sortable = true; // Allow sort
        $this->version->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->version->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->version->Param, "CustomMsg");
        $this->Fields['version'] = &$this->version;

        // presence
        $this->presence = new DbField('crm_crmentity', 'crm_crmentity', 'x_presence', 'presence', '`presence`', '`presence`', 17, 1, -1, false, '`presence`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->presence->Nullable = false; // NOT NULL field
        $this->presence->Sortable = true; // Allow sort
        $this->presence->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->presence->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->presence->Param, "CustomMsg");
        $this->Fields['presence'] = &$this->presence;

        // deleted
        $this->deleted = new DbField('crm_crmentity', 'crm_crmentity', 'x_deleted', 'deleted', '`deleted`', '`deleted`', 17, 1, -1, false, '`deleted`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->deleted->Nullable = false; // NOT NULL field
        $this->deleted->Sortable = true; // Allow sort
        $this->deleted->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->deleted->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->deleted->Param, "CustomMsg");
        $this->Fields['deleted'] = &$this->deleted;

        // was_read
        $this->was_read = new DbField('crm_crmentity', 'crm_crmentity', 'x_was_read', 'was_read', '`was_read`', '`was_read`', 16, 1, -1, false, '`was_read`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->was_read->Sortable = true; // Allow sort
        $this->was_read->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->was_read->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->was_read->Param, "CustomMsg");
        $this->Fields['was_read'] = &$this->was_read;

        // private
        $this->_private = new DbField('crm_crmentity', 'crm_crmentity', 'x__private', 'private', '`private`', '`private`', 16, 1, -1, false, '`private`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->_private->Sortable = true; // Allow sort
        $this->_private->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->_private->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->_private->Param, "CustomMsg");
        $this->Fields['private'] = &$this->_private;

        // users
        $this->users = new DbField('crm_crmentity', 'crm_crmentity', 'x_users', 'users', '`users`', '`users`', 201, 65535, -1, false, '`users`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->users->Sortable = true; // Allow sort
        $this->users->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->users->Param, "CustomMsg");
        $this->Fields['users'] = &$this->users;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`crm_crmentity`";
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
            $this->crmid->setDbValue($conn->lastInsertId());
            $rs['crmid'] = $this->crmid->DbValue;
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
            if (array_key_exists('crmid', $rs)) {
                AddFilter($where, QuotedName('crmid', $this->Dbid) . '=' . QuotedValue($rs['crmid'], $this->crmid->DataType, $this->Dbid));
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
        $this->crmid->DbValue = $row['crmid'];
        $this->smcreatorid->DbValue = $row['smcreatorid'];
        $this->smownerid->DbValue = $row['smownerid'];
        $this->shownerid->DbValue = $row['shownerid'];
        $this->modifiedby->DbValue = $row['modifiedby'];
        $this->setype->DbValue = $row['setype'];
        $this->description->DbValue = $row['description'];
        $this->attention->DbValue = $row['attention'];
        $this->createdtime->DbValue = $row['createdtime'];
        $this->modifiedtime->DbValue = $row['modifiedtime'];
        $this->viewedtime->DbValue = $row['viewedtime'];
        $this->status->DbValue = $row['status'];
        $this->version->DbValue = $row['version'];
        $this->presence->DbValue = $row['presence'];
        $this->deleted->DbValue = $row['deleted'];
        $this->was_read->DbValue = $row['was_read'];
        $this->_private->DbValue = $row['private'];
        $this->users->DbValue = $row['users'];
    }

    // Delete uploaded files
    public function deleteUploadedFiles($row)
    {
        $this->loadDbValues($row);
    }

    // Record filter WHERE clause
    protected function sqlKeyFilter()
    {
        return "`crmid` = @crmid@";
    }

    // Get Key
    public function getKey($current = false)
    {
        $keys = [];
        $val = $current ? $this->crmid->CurrentValue : $this->crmid->OldValue;
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
                $this->crmid->CurrentValue = $keys[0];
            } else {
                $this->crmid->OldValue = $keys[0];
            }
        }
    }

    // Get record filter
    public function getRecordFilter($row = null)
    {
        $keyFilter = $this->sqlKeyFilter();
        if (is_array($row)) {
            $val = array_key_exists('crmid', $row) ? $row['crmid'] : null;
        } else {
            $val = $this->crmid->OldValue !== null ? $this->crmid->OldValue : $this->crmid->CurrentValue;
        }
        if (!is_numeric($val)) {
            return "0=1"; // Invalid key
        }
        if ($val === null) {
            return "0=1"; // Invalid key
        } else {
            $keyFilter = str_replace("@crmid@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
        return $_SESSION[$name] ?? GetUrl("CrmCrmentityList");
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
        if ($pageName == "CrmCrmentityView") {
            return $Language->phrase("View");
        } elseif ($pageName == "CrmCrmentityEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "CrmCrmentityAdd") {
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
                return "CrmCrmentityView";
            case Config("API_ADD_ACTION"):
                return "CrmCrmentityAdd";
            case Config("API_EDIT_ACTION"):
                return "CrmCrmentityEdit";
            case Config("API_DELETE_ACTION"):
                return "CrmCrmentityDelete";
            case Config("API_LIST_ACTION"):
                return "CrmCrmentityList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "CrmCrmentityList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("CrmCrmentityView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("CrmCrmentityView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "CrmCrmentityAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "CrmCrmentityAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("CrmCrmentityEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("CrmCrmentityAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("CrmCrmentityDelete", $this->getUrlParm());
    }

    // Add master url
    public function addMasterUrl($url)
    {
        return $url;
    }

    public function keyToJson($htmlEncode = false)
    {
        $json = "";
        $json .= "crmid:" . JsonEncode($this->crmid->CurrentValue, "number");
        $json = "{" . $json . "}";
        if ($htmlEncode) {
            $json = HtmlEncode($json);
        }
        return $json;
    }

    // Add key value to URL
    public function keyUrl($url, $parm = "")
    {
        if ($this->crmid->CurrentValue !== null) {
            $url .= "/" . rawurlencode($this->crmid->CurrentValue);
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
            if (($keyValue = Param("crmid") ?? Route("crmid")) !== null) {
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
                $this->crmid->CurrentValue = $key;
            } else {
                $this->crmid->OldValue = $key;
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
        $this->crmid->setDbValue($row['crmid']);
        $this->smcreatorid->setDbValue($row['smcreatorid']);
        $this->smownerid->setDbValue($row['smownerid']);
        $this->shownerid->setDbValue($row['shownerid']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->setype->setDbValue($row['setype']);
        $this->description->setDbValue($row['description']);
        $this->attention->setDbValue($row['attention']);
        $this->createdtime->setDbValue($row['createdtime']);
        $this->modifiedtime->setDbValue($row['modifiedtime']);
        $this->viewedtime->setDbValue($row['viewedtime']);
        $this->status->setDbValue($row['status']);
        $this->version->setDbValue($row['version']);
        $this->presence->setDbValue($row['presence']);
        $this->deleted->setDbValue($row['deleted']);
        $this->was_read->setDbValue($row['was_read']);
        $this->_private->setDbValue($row['private']);
        $this->users->setDbValue($row['users']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // crmid

        // smcreatorid

        // smownerid

        // shownerid

        // modifiedby

        // setype

        // description

        // attention

        // createdtime

        // modifiedtime

        // viewedtime

        // status

        // version

        // presence

        // deleted

        // was_read

        // private

        // users

        // crmid
        $this->crmid->ViewValue = $this->crmid->CurrentValue;
        $this->crmid->ViewCustomAttributes = "";

        // smcreatorid
        $this->smcreatorid->ViewValue = $this->smcreatorid->CurrentValue;
        $this->smcreatorid->ViewValue = FormatNumber($this->smcreatorid->ViewValue, 0, -2, -2, -2);
        $this->smcreatorid->ViewCustomAttributes = "";

        // smownerid
        $this->smownerid->ViewValue = $this->smownerid->CurrentValue;
        $this->smownerid->ViewValue = FormatNumber($this->smownerid->ViewValue, 0, -2, -2, -2);
        $this->smownerid->ViewCustomAttributes = "";

        // shownerid
        $this->shownerid->ViewValue = $this->shownerid->CurrentValue;
        $this->shownerid->ViewValue = FormatNumber($this->shownerid->ViewValue, 0, -2, -2, -2);
        $this->shownerid->ViewCustomAttributes = "";

        // modifiedby
        $this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
        $this->modifiedby->ViewValue = FormatNumber($this->modifiedby->ViewValue, 0, -2, -2, -2);
        $this->modifiedby->ViewCustomAttributes = "";

        // setype
        $this->setype->ViewValue = $this->setype->CurrentValue;
        $this->setype->ViewCustomAttributes = "";

        // description
        $this->description->ViewValue = $this->description->CurrentValue;
        $this->description->ViewCustomAttributes = "";

        // attention
        $this->attention->ViewValue = $this->attention->CurrentValue;
        $this->attention->ViewCustomAttributes = "";

        // createdtime
        $this->createdtime->ViewValue = $this->createdtime->CurrentValue;
        $this->createdtime->ViewValue = FormatDateTime($this->createdtime->ViewValue, 0);
        $this->createdtime->ViewCustomAttributes = "";

        // modifiedtime
        $this->modifiedtime->ViewValue = $this->modifiedtime->CurrentValue;
        $this->modifiedtime->ViewValue = FormatDateTime($this->modifiedtime->ViewValue, 0);
        $this->modifiedtime->ViewCustomAttributes = "";

        // viewedtime
        $this->viewedtime->ViewValue = $this->viewedtime->CurrentValue;
        $this->viewedtime->ViewValue = FormatDateTime($this->viewedtime->ViewValue, 0);
        $this->viewedtime->ViewCustomAttributes = "";

        // status
        $this->status->ViewValue = $this->status->CurrentValue;
        $this->status->ViewCustomAttributes = "";

        // version
        $this->version->ViewValue = $this->version->CurrentValue;
        $this->version->ViewValue = FormatNumber($this->version->ViewValue, 0, -2, -2, -2);
        $this->version->ViewCustomAttributes = "";

        // presence
        $this->presence->ViewValue = $this->presence->CurrentValue;
        $this->presence->ViewValue = FormatNumber($this->presence->ViewValue, 0, -2, -2, -2);
        $this->presence->ViewCustomAttributes = "";

        // deleted
        $this->deleted->ViewValue = $this->deleted->CurrentValue;
        $this->deleted->ViewValue = FormatNumber($this->deleted->ViewValue, 0, -2, -2, -2);
        $this->deleted->ViewCustomAttributes = "";

        // was_read
        $this->was_read->ViewValue = $this->was_read->CurrentValue;
        $this->was_read->ViewValue = FormatNumber($this->was_read->ViewValue, 0, -2, -2, -2);
        $this->was_read->ViewCustomAttributes = "";

        // private
        $this->_private->ViewValue = $this->_private->CurrentValue;
        $this->_private->ViewValue = FormatNumber($this->_private->ViewValue, 0, -2, -2, -2);
        $this->_private->ViewCustomAttributes = "";

        // users
        $this->users->ViewValue = $this->users->CurrentValue;
        $this->users->ViewCustomAttributes = "";

        // crmid
        $this->crmid->LinkCustomAttributes = "";
        $this->crmid->HrefValue = "";
        $this->crmid->TooltipValue = "";

        // smcreatorid
        $this->smcreatorid->LinkCustomAttributes = "";
        $this->smcreatorid->HrefValue = "";
        $this->smcreatorid->TooltipValue = "";

        // smownerid
        $this->smownerid->LinkCustomAttributes = "";
        $this->smownerid->HrefValue = "";
        $this->smownerid->TooltipValue = "";

        // shownerid
        $this->shownerid->LinkCustomAttributes = "";
        $this->shownerid->HrefValue = "";
        $this->shownerid->TooltipValue = "";

        // modifiedby
        $this->modifiedby->LinkCustomAttributes = "";
        $this->modifiedby->HrefValue = "";
        $this->modifiedby->TooltipValue = "";

        // setype
        $this->setype->LinkCustomAttributes = "";
        $this->setype->HrefValue = "";
        $this->setype->TooltipValue = "";

        // description
        $this->description->LinkCustomAttributes = "";
        $this->description->HrefValue = "";
        $this->description->TooltipValue = "";

        // attention
        $this->attention->LinkCustomAttributes = "";
        $this->attention->HrefValue = "";
        $this->attention->TooltipValue = "";

        // createdtime
        $this->createdtime->LinkCustomAttributes = "";
        $this->createdtime->HrefValue = "";
        $this->createdtime->TooltipValue = "";

        // modifiedtime
        $this->modifiedtime->LinkCustomAttributes = "";
        $this->modifiedtime->HrefValue = "";
        $this->modifiedtime->TooltipValue = "";

        // viewedtime
        $this->viewedtime->LinkCustomAttributes = "";
        $this->viewedtime->HrefValue = "";
        $this->viewedtime->TooltipValue = "";

        // status
        $this->status->LinkCustomAttributes = "";
        $this->status->HrefValue = "";
        $this->status->TooltipValue = "";

        // version
        $this->version->LinkCustomAttributes = "";
        $this->version->HrefValue = "";
        $this->version->TooltipValue = "";

        // presence
        $this->presence->LinkCustomAttributes = "";
        $this->presence->HrefValue = "";
        $this->presence->TooltipValue = "";

        // deleted
        $this->deleted->LinkCustomAttributes = "";
        $this->deleted->HrefValue = "";
        $this->deleted->TooltipValue = "";

        // was_read
        $this->was_read->LinkCustomAttributes = "";
        $this->was_read->HrefValue = "";
        $this->was_read->TooltipValue = "";

        // private
        $this->_private->LinkCustomAttributes = "";
        $this->_private->HrefValue = "";
        $this->_private->TooltipValue = "";

        // users
        $this->users->LinkCustomAttributes = "";
        $this->users->HrefValue = "";
        $this->users->TooltipValue = "";

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

        // crmid
        $this->crmid->EditAttrs["class"] = "form-control";
        $this->crmid->EditCustomAttributes = "";
        $this->crmid->EditValue = $this->crmid->CurrentValue;
        $this->crmid->ViewCustomAttributes = "";

        // smcreatorid
        $this->smcreatorid->EditAttrs["class"] = "form-control";
        $this->smcreatorid->EditCustomAttributes = "";
        $this->smcreatorid->EditValue = $this->smcreatorid->CurrentValue;
        $this->smcreatorid->PlaceHolder = RemoveHtml($this->smcreatorid->caption());

        // smownerid
        $this->smownerid->EditAttrs["class"] = "form-control";
        $this->smownerid->EditCustomAttributes = "";
        $this->smownerid->EditValue = $this->smownerid->CurrentValue;
        $this->smownerid->PlaceHolder = RemoveHtml($this->smownerid->caption());

        // shownerid
        $this->shownerid->EditAttrs["class"] = "form-control";
        $this->shownerid->EditCustomAttributes = "";
        $this->shownerid->EditValue = $this->shownerid->CurrentValue;
        $this->shownerid->PlaceHolder = RemoveHtml($this->shownerid->caption());

        // modifiedby
        $this->modifiedby->EditAttrs["class"] = "form-control";
        $this->modifiedby->EditCustomAttributes = "";
        $this->modifiedby->EditValue = $this->modifiedby->CurrentValue;
        $this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

        // setype
        $this->setype->EditAttrs["class"] = "form-control";
        $this->setype->EditCustomAttributes = "";
        if (!$this->setype->Raw) {
            $this->setype->CurrentValue = HtmlDecode($this->setype->CurrentValue);
        }
        $this->setype->EditValue = $this->setype->CurrentValue;
        $this->setype->PlaceHolder = RemoveHtml($this->setype->caption());

        // description
        $this->description->EditAttrs["class"] = "form-control";
        $this->description->EditCustomAttributes = "";
        $this->description->EditValue = $this->description->CurrentValue;
        $this->description->PlaceHolder = RemoveHtml($this->description->caption());

        // attention
        $this->attention->EditAttrs["class"] = "form-control";
        $this->attention->EditCustomAttributes = "";
        $this->attention->EditValue = $this->attention->CurrentValue;
        $this->attention->PlaceHolder = RemoveHtml($this->attention->caption());

        // createdtime
        $this->createdtime->EditAttrs["class"] = "form-control";
        $this->createdtime->EditCustomAttributes = "";
        $this->createdtime->EditValue = FormatDateTime($this->createdtime->CurrentValue, 8);
        $this->createdtime->PlaceHolder = RemoveHtml($this->createdtime->caption());

        // modifiedtime
        $this->modifiedtime->EditAttrs["class"] = "form-control";
        $this->modifiedtime->EditCustomAttributes = "";
        $this->modifiedtime->EditValue = FormatDateTime($this->modifiedtime->CurrentValue, 8);
        $this->modifiedtime->PlaceHolder = RemoveHtml($this->modifiedtime->caption());

        // viewedtime
        $this->viewedtime->EditAttrs["class"] = "form-control";
        $this->viewedtime->EditCustomAttributes = "";
        $this->viewedtime->EditValue = FormatDateTime($this->viewedtime->CurrentValue, 8);
        $this->viewedtime->PlaceHolder = RemoveHtml($this->viewedtime->caption());

        // status
        $this->status->EditAttrs["class"] = "form-control";
        $this->status->EditCustomAttributes = "";
        if (!$this->status->Raw) {
            $this->status->CurrentValue = HtmlDecode($this->status->CurrentValue);
        }
        $this->status->EditValue = $this->status->CurrentValue;
        $this->status->PlaceHolder = RemoveHtml($this->status->caption());

        // version
        $this->version->EditAttrs["class"] = "form-control";
        $this->version->EditCustomAttributes = "";
        $this->version->EditValue = $this->version->CurrentValue;
        $this->version->PlaceHolder = RemoveHtml($this->version->caption());

        // presence
        $this->presence->EditAttrs["class"] = "form-control";
        $this->presence->EditCustomAttributes = "";
        $this->presence->EditValue = $this->presence->CurrentValue;
        $this->presence->PlaceHolder = RemoveHtml($this->presence->caption());

        // deleted
        $this->deleted->EditAttrs["class"] = "form-control";
        $this->deleted->EditCustomAttributes = "";
        $this->deleted->EditValue = $this->deleted->CurrentValue;
        $this->deleted->PlaceHolder = RemoveHtml($this->deleted->caption());

        // was_read
        $this->was_read->EditAttrs["class"] = "form-control";
        $this->was_read->EditCustomAttributes = "";
        $this->was_read->EditValue = $this->was_read->CurrentValue;
        $this->was_read->PlaceHolder = RemoveHtml($this->was_read->caption());

        // private
        $this->_private->EditAttrs["class"] = "form-control";
        $this->_private->EditCustomAttributes = "";
        $this->_private->EditValue = $this->_private->CurrentValue;
        $this->_private->PlaceHolder = RemoveHtml($this->_private->caption());

        // users
        $this->users->EditAttrs["class"] = "form-control";
        $this->users->EditCustomAttributes = "";
        $this->users->EditValue = $this->users->CurrentValue;
        $this->users->PlaceHolder = RemoveHtml($this->users->caption());

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
                    $doc->exportCaption($this->crmid);
                    $doc->exportCaption($this->smcreatorid);
                    $doc->exportCaption($this->smownerid);
                    $doc->exportCaption($this->shownerid);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->setype);
                    $doc->exportCaption($this->description);
                    $doc->exportCaption($this->attention);
                    $doc->exportCaption($this->createdtime);
                    $doc->exportCaption($this->modifiedtime);
                    $doc->exportCaption($this->viewedtime);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->version);
                    $doc->exportCaption($this->presence);
                    $doc->exportCaption($this->deleted);
                    $doc->exportCaption($this->was_read);
                    $doc->exportCaption($this->_private);
                    $doc->exportCaption($this->users);
                } else {
                    $doc->exportCaption($this->crmid);
                    $doc->exportCaption($this->smcreatorid);
                    $doc->exportCaption($this->smownerid);
                    $doc->exportCaption($this->shownerid);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->setype);
                    $doc->exportCaption($this->createdtime);
                    $doc->exportCaption($this->modifiedtime);
                    $doc->exportCaption($this->viewedtime);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->version);
                    $doc->exportCaption($this->presence);
                    $doc->exportCaption($this->deleted);
                    $doc->exportCaption($this->was_read);
                    $doc->exportCaption($this->_private);
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
                        $doc->exportField($this->crmid);
                        $doc->exportField($this->smcreatorid);
                        $doc->exportField($this->smownerid);
                        $doc->exportField($this->shownerid);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->setype);
                        $doc->exportField($this->description);
                        $doc->exportField($this->attention);
                        $doc->exportField($this->createdtime);
                        $doc->exportField($this->modifiedtime);
                        $doc->exportField($this->viewedtime);
                        $doc->exportField($this->status);
                        $doc->exportField($this->version);
                        $doc->exportField($this->presence);
                        $doc->exportField($this->deleted);
                        $doc->exportField($this->was_read);
                        $doc->exportField($this->_private);
                        $doc->exportField($this->users);
                    } else {
                        $doc->exportField($this->crmid);
                        $doc->exportField($this->smcreatorid);
                        $doc->exportField($this->smownerid);
                        $doc->exportField($this->shownerid);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->setype);
                        $doc->exportField($this->createdtime);
                        $doc->exportField($this->modifiedtime);
                        $doc->exportField($this->viewedtime);
                        $doc->exportField($this->status);
                        $doc->exportField($this->version);
                        $doc->exportField($this->presence);
                        $doc->exportField($this->deleted);
                        $doc->exportField($this->was_read);
                        $doc->exportField($this->_private);
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
