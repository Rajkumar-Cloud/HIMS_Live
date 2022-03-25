<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for qaqcrecord_endrology
 */
class QaqcrecordEndrology extends DbTable
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
    public $Date;
    public $LN2_Level;
    public $LN2_Checked;
    public $Incubator_Temp;
    public $Incubator_Cleaned;
    public $LAF_MG;
    public $LAF_Cleaned;
    public $REF_Temp;
    public $REF_Cleaned;
    public $Heating_Temp;
    public $Heating_Cleaned;
    public $Createdby;
    public $CreatedDate;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'qaqcrecord_endrology';
        $this->TableName = 'qaqcrecord_endrology';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`qaqcrecord_endrology`";
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
        $this->id = new DbField('qaqcrecord_endrology', 'qaqcrecord_endrology', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // Date
        $this->Date = new DbField('qaqcrecord_endrology', 'qaqcrecord_endrology', 'x_Date', 'Date', '`Date`', CastDateFieldForLike("`Date`", 0, "DB"), 133, 10, 0, false, '`Date`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Date->Nullable = false; // NOT NULL field
        $this->Date->Required = true; // Required field
        $this->Date->Sortable = true; // Allow sort
        $this->Date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Date->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Date->Param, "CustomMsg");
        $this->Fields['Date'] = &$this->Date;

        // LN2_Level
        $this->LN2_Level = new DbField('qaqcrecord_endrology', 'qaqcrecord_endrology', 'x_LN2_Level', 'LN2_Level', '`LN2_Level`', '`LN2_Level`', 131, 10, -1, false, '`LN2_Level`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->LN2_Level->Sortable = true; // Allow sort
        $this->LN2_Level->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->LN2_Level->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->LN2_Level->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->LN2_Level->Param, "CustomMsg");
        $this->Fields['LN2_Level'] = &$this->LN2_Level;

        // LN2_Checked
        $this->LN2_Checked = new DbField('qaqcrecord_endrology', 'qaqcrecord_endrology', 'x_LN2_Checked', 'LN2_Checked', '`LN2_Checked`', '`LN2_Checked`', 200, 45, -1, false, '`LN2_Checked`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->LN2_Checked->Sortable = true; // Allow sort
        $this->LN2_Checked->Lookup = new Lookup('LN2_Checked', 'qaqcrecord_endrology', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->LN2_Checked->OptionCount = 1;
        $this->LN2_Checked->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->LN2_Checked->Param, "CustomMsg");
        $this->Fields['LN2_Checked'] = &$this->LN2_Checked;

        // Incubator_Temp
        $this->Incubator_Temp = new DbField('qaqcrecord_endrology', 'qaqcrecord_endrology', 'x_Incubator_Temp', 'Incubator_Temp', '`Incubator_Temp`', '`Incubator_Temp`', 131, 10, -1, false, '`Incubator_Temp`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Incubator_Temp->Sortable = true; // Allow sort
        $this->Incubator_Temp->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Incubator_Temp->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Incubator_Temp->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Incubator_Temp->Param, "CustomMsg");
        $this->Fields['Incubator_Temp'] = &$this->Incubator_Temp;

        // Incubator_Cleaned
        $this->Incubator_Cleaned = new DbField('qaqcrecord_endrology', 'qaqcrecord_endrology', 'x_Incubator_Cleaned', 'Incubator_Cleaned', '`Incubator_Cleaned`', '`Incubator_Cleaned`', 200, 45, -1, false, '`Incubator_Cleaned`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->Incubator_Cleaned->Sortable = true; // Allow sort
        $this->Incubator_Cleaned->Lookup = new Lookup('Incubator_Cleaned', 'qaqcrecord_endrology', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Incubator_Cleaned->OptionCount = 1;
        $this->Incubator_Cleaned->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Incubator_Cleaned->Param, "CustomMsg");
        $this->Fields['Incubator_Cleaned'] = &$this->Incubator_Cleaned;

        // LAF_MG
        $this->LAF_MG = new DbField('qaqcrecord_endrology', 'qaqcrecord_endrology', 'x_LAF_MG', 'LAF_MG', '`LAF_MG`', '`LAF_MG`', 131, 10, -1, false, '`LAF_MG`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->LAF_MG->Sortable = true; // Allow sort
        $this->LAF_MG->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->LAF_MG->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->LAF_MG->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->LAF_MG->Param, "CustomMsg");
        $this->Fields['LAF_MG'] = &$this->LAF_MG;

        // LAF_Cleaned
        $this->LAF_Cleaned = new DbField('qaqcrecord_endrology', 'qaqcrecord_endrology', 'x_LAF_Cleaned', 'LAF_Cleaned', '`LAF_Cleaned`', '`LAF_Cleaned`', 200, 45, -1, false, '`LAF_Cleaned`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->LAF_Cleaned->Sortable = true; // Allow sort
        $this->LAF_Cleaned->Lookup = new Lookup('LAF_Cleaned', 'qaqcrecord_endrology', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->LAF_Cleaned->OptionCount = 1;
        $this->LAF_Cleaned->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->LAF_Cleaned->Param, "CustomMsg");
        $this->Fields['LAF_Cleaned'] = &$this->LAF_Cleaned;

        // REF_Temp
        $this->REF_Temp = new DbField('qaqcrecord_endrology', 'qaqcrecord_endrology', 'x_REF_Temp', 'REF_Temp', '`REF_Temp`', '`REF_Temp`', 131, 10, -1, false, '`REF_Temp`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->REF_Temp->Sortable = true; // Allow sort
        $this->REF_Temp->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->REF_Temp->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->REF_Temp->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->REF_Temp->Param, "CustomMsg");
        $this->Fields['REF_Temp'] = &$this->REF_Temp;

        // REF_Cleaned
        $this->REF_Cleaned = new DbField('qaqcrecord_endrology', 'qaqcrecord_endrology', 'x_REF_Cleaned', 'REF_Cleaned', '`REF_Cleaned`', '`REF_Cleaned`', 200, 45, -1, false, '`REF_Cleaned`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->REF_Cleaned->Sortable = true; // Allow sort
        $this->REF_Cleaned->Lookup = new Lookup('REF_Cleaned', 'qaqcrecord_endrology', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->REF_Cleaned->OptionCount = 1;
        $this->REF_Cleaned->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->REF_Cleaned->Param, "CustomMsg");
        $this->Fields['REF_Cleaned'] = &$this->REF_Cleaned;

        // Heating_Temp
        $this->Heating_Temp = new DbField('qaqcrecord_endrology', 'qaqcrecord_endrology', 'x_Heating_Temp', 'Heating_Temp', '`Heating_Temp`', '`Heating_Temp`', 131, 10, -1, false, '`Heating_Temp`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Heating_Temp->Nullable = false; // NOT NULL field
        $this->Heating_Temp->Required = true; // Required field
        $this->Heating_Temp->Sortable = true; // Allow sort
        $this->Heating_Temp->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Heating_Temp->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Heating_Temp->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Heating_Temp->Param, "CustomMsg");
        $this->Fields['Heating_Temp'] = &$this->Heating_Temp;

        // Heating_Cleaned
        $this->Heating_Cleaned = new DbField('qaqcrecord_endrology', 'qaqcrecord_endrology', 'x_Heating_Cleaned', 'Heating_Cleaned', '`Heating_Cleaned`', '`Heating_Cleaned`', 200, 45, -1, false, '`Heating_Cleaned`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->Heating_Cleaned->Sortable = true; // Allow sort
        $this->Heating_Cleaned->Lookup = new Lookup('Heating_Cleaned', 'qaqcrecord_endrology', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Heating_Cleaned->OptionCount = 1;
        $this->Heating_Cleaned->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Heating_Cleaned->Param, "CustomMsg");
        $this->Fields['Heating_Cleaned'] = &$this->Heating_Cleaned;

        // Createdby
        $this->Createdby = new DbField('qaqcrecord_endrology', 'qaqcrecord_endrology', 'x_Createdby', 'Createdby', '`Createdby`', '`Createdby`', 200, 45, -1, false, '`Createdby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Createdby->Sortable = true; // Allow sort
        $this->Createdby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Createdby->Param, "CustomMsg");
        $this->Fields['Createdby'] = &$this->Createdby;

        // CreatedDate
        $this->CreatedDate = new DbField('qaqcrecord_endrology', 'qaqcrecord_endrology', 'x_CreatedDate', 'CreatedDate', '`CreatedDate`', CastDateFieldForLike("`CreatedDate`", 0, "DB"), 135, 19, 0, false, '`CreatedDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CreatedDate->Sortable = true; // Allow sort
        $this->CreatedDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->CreatedDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CreatedDate->Param, "CustomMsg");
        $this->Fields['CreatedDate'] = &$this->CreatedDate;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`qaqcrecord_endrology`";
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
        $this->Date->DbValue = $row['Date'];
        $this->LN2_Level->DbValue = $row['LN2_Level'];
        $this->LN2_Checked->DbValue = $row['LN2_Checked'];
        $this->Incubator_Temp->DbValue = $row['Incubator_Temp'];
        $this->Incubator_Cleaned->DbValue = $row['Incubator_Cleaned'];
        $this->LAF_MG->DbValue = $row['LAF_MG'];
        $this->LAF_Cleaned->DbValue = $row['LAF_Cleaned'];
        $this->REF_Temp->DbValue = $row['REF_Temp'];
        $this->REF_Cleaned->DbValue = $row['REF_Cleaned'];
        $this->Heating_Temp->DbValue = $row['Heating_Temp'];
        $this->Heating_Cleaned->DbValue = $row['Heating_Cleaned'];
        $this->Createdby->DbValue = $row['Createdby'];
        $this->CreatedDate->DbValue = $row['CreatedDate'];
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
        return $_SESSION[$name] ?? GetUrl("QaqcrecordEndrologyList");
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
        if ($pageName == "QaqcrecordEndrologyView") {
            return $Language->phrase("View");
        } elseif ($pageName == "QaqcrecordEndrologyEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "QaqcrecordEndrologyAdd") {
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
                return "QaqcrecordEndrologyView";
            case Config("API_ADD_ACTION"):
                return "QaqcrecordEndrologyAdd";
            case Config("API_EDIT_ACTION"):
                return "QaqcrecordEndrologyEdit";
            case Config("API_DELETE_ACTION"):
                return "QaqcrecordEndrologyDelete";
            case Config("API_LIST_ACTION"):
                return "QaqcrecordEndrologyList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "QaqcrecordEndrologyList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("QaqcrecordEndrologyView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("QaqcrecordEndrologyView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "QaqcrecordEndrologyAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "QaqcrecordEndrologyAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("QaqcrecordEndrologyEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("QaqcrecordEndrologyAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("QaqcrecordEndrologyDelete", $this->getUrlParm());
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
        $this->Date->setDbValue($row['Date']);
        $this->LN2_Level->setDbValue($row['LN2_Level']);
        $this->LN2_Checked->setDbValue($row['LN2_Checked']);
        $this->Incubator_Temp->setDbValue($row['Incubator_Temp']);
        $this->Incubator_Cleaned->setDbValue($row['Incubator_Cleaned']);
        $this->LAF_MG->setDbValue($row['LAF_MG']);
        $this->LAF_Cleaned->setDbValue($row['LAF_Cleaned']);
        $this->REF_Temp->setDbValue($row['REF_Temp']);
        $this->REF_Cleaned->setDbValue($row['REF_Cleaned']);
        $this->Heating_Temp->setDbValue($row['Heating_Temp']);
        $this->Heating_Cleaned->setDbValue($row['Heating_Cleaned']);
        $this->Createdby->setDbValue($row['Createdby']);
        $this->CreatedDate->setDbValue($row['CreatedDate']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // Date

        // LN2_Level

        // LN2_Checked

        // Incubator_Temp

        // Incubator_Cleaned

        // LAF_MG

        // LAF_Cleaned

        // REF_Temp

        // REF_Cleaned

        // Heating_Temp

        // Heating_Cleaned

        // Createdby

        // CreatedDate

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // Date
        $this->Date->ViewValue = $this->Date->CurrentValue;
        $this->Date->ViewValue = FormatDateTime($this->Date->ViewValue, 0);
        $this->Date->ViewCustomAttributes = "";

        // LN2_Level
        $this->LN2_Level->ViewValue = $this->LN2_Level->CurrentValue;
        $this->LN2_Level->ViewValue = FormatNumber($this->LN2_Level->ViewValue, 2, -2, -2, -2);
        $this->LN2_Level->ViewCustomAttributes = "";

        // LN2_Checked
        if (strval($this->LN2_Checked->CurrentValue) != "") {
            $this->LN2_Checked->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->LN2_Checked->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->LN2_Checked->ViewValue->add($this->LN2_Checked->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->LN2_Checked->ViewValue = null;
        }
        $this->LN2_Checked->ViewCustomAttributes = "";

        // Incubator_Temp
        $this->Incubator_Temp->ViewValue = $this->Incubator_Temp->CurrentValue;
        $this->Incubator_Temp->ViewValue = FormatNumber($this->Incubator_Temp->ViewValue, 2, -2, -2, -2);
        $this->Incubator_Temp->ViewCustomAttributes = "";

        // Incubator_Cleaned
        if (strval($this->Incubator_Cleaned->CurrentValue) != "") {
            $this->Incubator_Cleaned->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->Incubator_Cleaned->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->Incubator_Cleaned->ViewValue->add($this->Incubator_Cleaned->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->Incubator_Cleaned->ViewValue = null;
        }
        $this->Incubator_Cleaned->ViewCustomAttributes = "";

        // LAF_MG
        $this->LAF_MG->ViewValue = $this->LAF_MG->CurrentValue;
        $this->LAF_MG->ViewValue = FormatNumber($this->LAF_MG->ViewValue, 2, -2, -2, -2);
        $this->LAF_MG->ViewCustomAttributes = "";

        // LAF_Cleaned
        if (strval($this->LAF_Cleaned->CurrentValue) != "") {
            $this->LAF_Cleaned->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->LAF_Cleaned->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->LAF_Cleaned->ViewValue->add($this->LAF_Cleaned->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->LAF_Cleaned->ViewValue = null;
        }
        $this->LAF_Cleaned->ViewCustomAttributes = "";

        // REF_Temp
        $this->REF_Temp->ViewValue = $this->REF_Temp->CurrentValue;
        $this->REF_Temp->ViewValue = FormatNumber($this->REF_Temp->ViewValue, 2, -2, -2, -2);
        $this->REF_Temp->ViewCustomAttributes = "";

        // REF_Cleaned
        if (strval($this->REF_Cleaned->CurrentValue) != "") {
            $this->REF_Cleaned->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->REF_Cleaned->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->REF_Cleaned->ViewValue->add($this->REF_Cleaned->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->REF_Cleaned->ViewValue = null;
        }
        $this->REF_Cleaned->ViewCustomAttributes = "";

        // Heating_Temp
        $this->Heating_Temp->ViewValue = $this->Heating_Temp->CurrentValue;
        $this->Heating_Temp->ViewValue = FormatNumber($this->Heating_Temp->ViewValue, 2, -2, -2, -2);
        $this->Heating_Temp->ViewCustomAttributes = "";

        // Heating_Cleaned
        if (strval($this->Heating_Cleaned->CurrentValue) != "") {
            $this->Heating_Cleaned->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->Heating_Cleaned->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->Heating_Cleaned->ViewValue->add($this->Heating_Cleaned->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->Heating_Cleaned->ViewValue = null;
        }
        $this->Heating_Cleaned->ViewCustomAttributes = "";

        // Createdby
        $this->Createdby->ViewValue = $this->Createdby->CurrentValue;
        $this->Createdby->ViewCustomAttributes = "";

        // CreatedDate
        $this->CreatedDate->ViewValue = $this->CreatedDate->CurrentValue;
        $this->CreatedDate->ViewValue = FormatDateTime($this->CreatedDate->ViewValue, 0);
        $this->CreatedDate->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // Date
        $this->Date->LinkCustomAttributes = "";
        $this->Date->HrefValue = "";
        $this->Date->TooltipValue = "";

        // LN2_Level
        $this->LN2_Level->LinkCustomAttributes = "";
        $this->LN2_Level->HrefValue = "";
        $this->LN2_Level->TooltipValue = "";

        // LN2_Checked
        $this->LN2_Checked->LinkCustomAttributes = "";
        $this->LN2_Checked->HrefValue = "";
        $this->LN2_Checked->TooltipValue = "";

        // Incubator_Temp
        $this->Incubator_Temp->LinkCustomAttributes = "";
        $this->Incubator_Temp->HrefValue = "";
        $this->Incubator_Temp->TooltipValue = "";

        // Incubator_Cleaned
        $this->Incubator_Cleaned->LinkCustomAttributes = "";
        $this->Incubator_Cleaned->HrefValue = "";
        $this->Incubator_Cleaned->TooltipValue = "";

        // LAF_MG
        $this->LAF_MG->LinkCustomAttributes = "";
        $this->LAF_MG->HrefValue = "";
        $this->LAF_MG->TooltipValue = "";

        // LAF_Cleaned
        $this->LAF_Cleaned->LinkCustomAttributes = "";
        $this->LAF_Cleaned->HrefValue = "";
        $this->LAF_Cleaned->TooltipValue = "";

        // REF_Temp
        $this->REF_Temp->LinkCustomAttributes = "";
        $this->REF_Temp->HrefValue = "";
        $this->REF_Temp->TooltipValue = "";

        // REF_Cleaned
        $this->REF_Cleaned->LinkCustomAttributes = "";
        $this->REF_Cleaned->HrefValue = "";
        $this->REF_Cleaned->TooltipValue = "";

        // Heating_Temp
        $this->Heating_Temp->LinkCustomAttributes = "";
        $this->Heating_Temp->HrefValue = "";
        $this->Heating_Temp->TooltipValue = "";

        // Heating_Cleaned
        $this->Heating_Cleaned->LinkCustomAttributes = "";
        $this->Heating_Cleaned->HrefValue = "";
        $this->Heating_Cleaned->TooltipValue = "";

        // Createdby
        $this->Createdby->LinkCustomAttributes = "";
        $this->Createdby->HrefValue = "";
        $this->Createdby->TooltipValue = "";

        // CreatedDate
        $this->CreatedDate->LinkCustomAttributes = "";
        $this->CreatedDate->HrefValue = "";
        $this->CreatedDate->TooltipValue = "";

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

        // Date
        $this->Date->EditAttrs["class"] = "form-control";
        $this->Date->EditCustomAttributes = "";
        $this->Date->EditValue = FormatDateTime($this->Date->CurrentValue, 8);
        $this->Date->PlaceHolder = RemoveHtml($this->Date->caption());

        // LN2_Level
        $this->LN2_Level->EditAttrs["class"] = "form-control";
        $this->LN2_Level->EditCustomAttributes = "";
        $this->LN2_Level->EditValue = $this->LN2_Level->CurrentValue;
        $this->LN2_Level->PlaceHolder = RemoveHtml($this->LN2_Level->caption());
        if (strval($this->LN2_Level->EditValue) != "" && is_numeric($this->LN2_Level->EditValue)) {
            $this->LN2_Level->EditValue = FormatNumber($this->LN2_Level->EditValue, -2, -2, -2, -2);
        }

        // LN2_Checked
        $this->LN2_Checked->EditCustomAttributes = "";
        $this->LN2_Checked->EditValue = $this->LN2_Checked->options(false);
        $this->LN2_Checked->PlaceHolder = RemoveHtml($this->LN2_Checked->caption());

        // Incubator_Temp
        $this->Incubator_Temp->EditAttrs["class"] = "form-control";
        $this->Incubator_Temp->EditCustomAttributes = "";
        $this->Incubator_Temp->EditValue = $this->Incubator_Temp->CurrentValue;
        $this->Incubator_Temp->PlaceHolder = RemoveHtml($this->Incubator_Temp->caption());
        if (strval($this->Incubator_Temp->EditValue) != "" && is_numeric($this->Incubator_Temp->EditValue)) {
            $this->Incubator_Temp->EditValue = FormatNumber($this->Incubator_Temp->EditValue, -2, -2, -2, -2);
        }

        // Incubator_Cleaned
        $this->Incubator_Cleaned->EditCustomAttributes = "";
        $this->Incubator_Cleaned->EditValue = $this->Incubator_Cleaned->options(false);
        $this->Incubator_Cleaned->PlaceHolder = RemoveHtml($this->Incubator_Cleaned->caption());

        // LAF_MG
        $this->LAF_MG->EditAttrs["class"] = "form-control";
        $this->LAF_MG->EditCustomAttributes = "";
        $this->LAF_MG->EditValue = $this->LAF_MG->CurrentValue;
        $this->LAF_MG->PlaceHolder = RemoveHtml($this->LAF_MG->caption());
        if (strval($this->LAF_MG->EditValue) != "" && is_numeric($this->LAF_MG->EditValue)) {
            $this->LAF_MG->EditValue = FormatNumber($this->LAF_MG->EditValue, -2, -2, -2, -2);
        }

        // LAF_Cleaned
        $this->LAF_Cleaned->EditCustomAttributes = "";
        $this->LAF_Cleaned->EditValue = $this->LAF_Cleaned->options(false);
        $this->LAF_Cleaned->PlaceHolder = RemoveHtml($this->LAF_Cleaned->caption());

        // REF_Temp
        $this->REF_Temp->EditAttrs["class"] = "form-control";
        $this->REF_Temp->EditCustomAttributes = "";
        $this->REF_Temp->EditValue = $this->REF_Temp->CurrentValue;
        $this->REF_Temp->PlaceHolder = RemoveHtml($this->REF_Temp->caption());
        if (strval($this->REF_Temp->EditValue) != "" && is_numeric($this->REF_Temp->EditValue)) {
            $this->REF_Temp->EditValue = FormatNumber($this->REF_Temp->EditValue, -2, -2, -2, -2);
        }

        // REF_Cleaned
        $this->REF_Cleaned->EditCustomAttributes = "";
        $this->REF_Cleaned->EditValue = $this->REF_Cleaned->options(false);
        $this->REF_Cleaned->PlaceHolder = RemoveHtml($this->REF_Cleaned->caption());

        // Heating_Temp
        $this->Heating_Temp->EditAttrs["class"] = "form-control";
        $this->Heating_Temp->EditCustomAttributes = "";
        $this->Heating_Temp->EditValue = $this->Heating_Temp->CurrentValue;
        $this->Heating_Temp->PlaceHolder = RemoveHtml($this->Heating_Temp->caption());
        if (strval($this->Heating_Temp->EditValue) != "" && is_numeric($this->Heating_Temp->EditValue)) {
            $this->Heating_Temp->EditValue = FormatNumber($this->Heating_Temp->EditValue, -2, -2, -2, -2);
        }

        // Heating_Cleaned
        $this->Heating_Cleaned->EditCustomAttributes = "";
        $this->Heating_Cleaned->EditValue = $this->Heating_Cleaned->options(false);
        $this->Heating_Cleaned->PlaceHolder = RemoveHtml($this->Heating_Cleaned->caption());

        // Createdby

        // CreatedDate

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
                    $doc->exportCaption($this->Date);
                    $doc->exportCaption($this->LN2_Level);
                    $doc->exportCaption($this->LN2_Checked);
                    $doc->exportCaption($this->Incubator_Temp);
                    $doc->exportCaption($this->Incubator_Cleaned);
                    $doc->exportCaption($this->LAF_MG);
                    $doc->exportCaption($this->LAF_Cleaned);
                    $doc->exportCaption($this->REF_Temp);
                    $doc->exportCaption($this->REF_Cleaned);
                    $doc->exportCaption($this->Heating_Temp);
                    $doc->exportCaption($this->Heating_Cleaned);
                    $doc->exportCaption($this->Createdby);
                    $doc->exportCaption($this->CreatedDate);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->Date);
                    $doc->exportCaption($this->LN2_Level);
                    $doc->exportCaption($this->LN2_Checked);
                    $doc->exportCaption($this->Incubator_Temp);
                    $doc->exportCaption($this->Incubator_Cleaned);
                    $doc->exportCaption($this->LAF_MG);
                    $doc->exportCaption($this->LAF_Cleaned);
                    $doc->exportCaption($this->REF_Temp);
                    $doc->exportCaption($this->REF_Cleaned);
                    $doc->exportCaption($this->Heating_Temp);
                    $doc->exportCaption($this->Heating_Cleaned);
                    $doc->exportCaption($this->Createdby);
                    $doc->exportCaption($this->CreatedDate);
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
                        $doc->exportField($this->Date);
                        $doc->exportField($this->LN2_Level);
                        $doc->exportField($this->LN2_Checked);
                        $doc->exportField($this->Incubator_Temp);
                        $doc->exportField($this->Incubator_Cleaned);
                        $doc->exportField($this->LAF_MG);
                        $doc->exportField($this->LAF_Cleaned);
                        $doc->exportField($this->REF_Temp);
                        $doc->exportField($this->REF_Cleaned);
                        $doc->exportField($this->Heating_Temp);
                        $doc->exportField($this->Heating_Cleaned);
                        $doc->exportField($this->Createdby);
                        $doc->exportField($this->CreatedDate);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->Date);
                        $doc->exportField($this->LN2_Level);
                        $doc->exportField($this->LN2_Checked);
                        $doc->exportField($this->Incubator_Temp);
                        $doc->exportField($this->Incubator_Cleaned);
                        $doc->exportField($this->LAF_MG);
                        $doc->exportField($this->LAF_Cleaned);
                        $doc->exportField($this->REF_Temp);
                        $doc->exportField($this->REF_Cleaned);
                        $doc->exportField($this->Heating_Temp);
                        $doc->exportField($this->Heating_Cleaned);
                        $doc->exportField($this->Createdby);
                        $doc->exportField($this->CreatedDate);
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
