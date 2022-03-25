<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for lab_dept_mast
 */
class LabDeptMast extends DbTable
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
    public $MainCD;
    public $Code;
    public $Name;
    public $Order;
    public $SignCD;
    public $Collection;
    public $EditDate;
    public $SMS;
    public $Note;
    public $WorkList;
    public $_Page;
    public $Incharge;
    public $AutoNum;
    public $id;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'lab_dept_mast';
        $this->TableName = 'lab_dept_mast';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`lab_dept_mast`";
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

        // MainCD
        $this->MainCD = new DbField('lab_dept_mast', 'lab_dept_mast', 'x_MainCD', 'MainCD', '`MainCD`', '`MainCD`', 200, 3, -1, false, '`MainCD`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MainCD->Nullable = false; // NOT NULL field
        $this->MainCD->Required = true; // Required field
        $this->MainCD->Sortable = true; // Allow sort
        $this->MainCD->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MainCD->Param, "CustomMsg");
        $this->Fields['MainCD'] = &$this->MainCD;

        // Code
        $this->Code = new DbField('lab_dept_mast', 'lab_dept_mast', 'x_Code', 'Code', '`Code`', '`Code`', 200, 2, -1, false, '`Code`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Code->Nullable = false; // NOT NULL field
        $this->Code->Required = true; // Required field
        $this->Code->Sortable = true; // Allow sort
        $this->Code->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Code->Param, "CustomMsg");
        $this->Fields['Code'] = &$this->Code;

        // Name
        $this->Name = new DbField('lab_dept_mast', 'lab_dept_mast', 'x_Name', 'Name', '`Name`', '`Name`', 200, 50, -1, false, '`Name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Name->Nullable = false; // NOT NULL field
        $this->Name->Required = true; // Required field
        $this->Name->Sortable = true; // Allow sort
        $this->Name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Name->Param, "CustomMsg");
        $this->Fields['Name'] = &$this->Name;

        // Order
        $this->Order = new DbField('lab_dept_mast', 'lab_dept_mast', 'x_Order', 'Order', '`Order`', '`Order`', 131, 3, -1, false, '`Order`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Order->Nullable = false; // NOT NULL field
        $this->Order->Required = true; // Required field
        $this->Order->Sortable = true; // Allow sort
        $this->Order->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Order->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Order->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Order->Param, "CustomMsg");
        $this->Fields['Order'] = &$this->Order;

        // SignCD
        $this->SignCD = new DbField('lab_dept_mast', 'lab_dept_mast', 'x_SignCD', 'SignCD', '`SignCD`', '`SignCD`', 200, 4, -1, false, '`SignCD`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SignCD->Nullable = false; // NOT NULL field
        $this->SignCD->Required = true; // Required field
        $this->SignCD->Sortable = true; // Allow sort
        $this->SignCD->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SignCD->Param, "CustomMsg");
        $this->Fields['SignCD'] = &$this->SignCD;

        // Collection
        $this->Collection = new DbField('lab_dept_mast', 'lab_dept_mast', 'x_Collection', 'Collection', '`Collection`', '`Collection`', 200, 1, -1, false, '`Collection`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Collection->Nullable = false; // NOT NULL field
        $this->Collection->Required = true; // Required field
        $this->Collection->Sortable = true; // Allow sort
        $this->Collection->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Collection->Param, "CustomMsg");
        $this->Fields['Collection'] = &$this->Collection;

        // EditDate
        $this->EditDate = new DbField('lab_dept_mast', 'lab_dept_mast', 'x_EditDate', 'EditDate', '`EditDate`', CastDateFieldForLike("`EditDate`", 0, "DB"), 135, 23, 0, false, '`EditDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EditDate->Sortable = true; // Allow sort
        $this->EditDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->EditDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EditDate->Param, "CustomMsg");
        $this->Fields['EditDate'] = &$this->EditDate;

        // SMS
        $this->SMS = new DbField('lab_dept_mast', 'lab_dept_mast', 'x_SMS', 'SMS', '`SMS`', '`SMS`', 200, 1, -1, false, '`SMS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SMS->Nullable = false; // NOT NULL field
        $this->SMS->Required = true; // Required field
        $this->SMS->Sortable = true; // Allow sort
        $this->SMS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SMS->Param, "CustomMsg");
        $this->Fields['SMS'] = &$this->SMS;

        // Note
        $this->Note = new DbField('lab_dept_mast', 'lab_dept_mast', 'x_Note', 'Note', '`Note`', '`Note`', 201, 1000, -1, false, '`Note`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Note->Nullable = false; // NOT NULL field
        $this->Note->Required = true; // Required field
        $this->Note->Sortable = true; // Allow sort
        $this->Note->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Note->Param, "CustomMsg");
        $this->Fields['Note'] = &$this->Note;

        // WorkList
        $this->WorkList = new DbField('lab_dept_mast', 'lab_dept_mast', 'x_WorkList', 'WorkList', '`WorkList`', '`WorkList`', 200, 1, -1, false, '`WorkList`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->WorkList->Nullable = false; // NOT NULL field
        $this->WorkList->Required = true; // Required field
        $this->WorkList->Sortable = true; // Allow sort
        $this->WorkList->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->WorkList->Param, "CustomMsg");
        $this->Fields['WorkList'] = &$this->WorkList;

        // Page
        $this->_Page = new DbField('lab_dept_mast', 'lab_dept_mast', 'x__Page', 'Page', '`Page`', '`Page`', 131, 3, -1, false, '`Page`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->_Page->Nullable = false; // NOT NULL field
        $this->_Page->Required = true; // Required field
        $this->_Page->Sortable = true; // Allow sort
        $this->_Page->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->_Page->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->_Page->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->_Page->Param, "CustomMsg");
        $this->Fields['Page'] = &$this->_Page;

        // Incharge
        $this->Incharge = new DbField('lab_dept_mast', 'lab_dept_mast', 'x_Incharge', 'Incharge', '`Incharge`', '`Incharge`', 200, 20, -1, false, '`Incharge`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Incharge->Nullable = false; // NOT NULL field
        $this->Incharge->Required = true; // Required field
        $this->Incharge->Sortable = true; // Allow sort
        $this->Incharge->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Incharge->Param, "CustomMsg");
        $this->Fields['Incharge'] = &$this->Incharge;

        // AutoNum
        $this->AutoNum = new DbField('lab_dept_mast', 'lab_dept_mast', 'x_AutoNum', 'AutoNum', '`AutoNum`', '`AutoNum`', 200, 1, -1, false, '`AutoNum`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AutoNum->Nullable = false; // NOT NULL field
        $this->AutoNum->Required = true; // Required field
        $this->AutoNum->Sortable = true; // Allow sort
        $this->AutoNum->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AutoNum->Param, "CustomMsg");
        $this->Fields['AutoNum'] = &$this->AutoNum;

        // id
        $this->id = new DbField('lab_dept_mast', 'lab_dept_mast', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`lab_dept_mast`";
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
        $this->MainCD->DbValue = $row['MainCD'];
        $this->Code->DbValue = $row['Code'];
        $this->Name->DbValue = $row['Name'];
        $this->Order->DbValue = $row['Order'];
        $this->SignCD->DbValue = $row['SignCD'];
        $this->Collection->DbValue = $row['Collection'];
        $this->EditDate->DbValue = $row['EditDate'];
        $this->SMS->DbValue = $row['SMS'];
        $this->Note->DbValue = $row['Note'];
        $this->WorkList->DbValue = $row['WorkList'];
        $this->_Page->DbValue = $row['Page'];
        $this->Incharge->DbValue = $row['Incharge'];
        $this->AutoNum->DbValue = $row['AutoNum'];
        $this->id->DbValue = $row['id'];
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
        return $_SESSION[$name] ?? GetUrl("LabDeptMastList");
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
        if ($pageName == "LabDeptMastView") {
            return $Language->phrase("View");
        } elseif ($pageName == "LabDeptMastEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "LabDeptMastAdd") {
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
                return "LabDeptMastView";
            case Config("API_ADD_ACTION"):
                return "LabDeptMastAdd";
            case Config("API_EDIT_ACTION"):
                return "LabDeptMastEdit";
            case Config("API_DELETE_ACTION"):
                return "LabDeptMastDelete";
            case Config("API_LIST_ACTION"):
                return "LabDeptMastList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "LabDeptMastList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("LabDeptMastView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("LabDeptMastView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "LabDeptMastAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "LabDeptMastAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("LabDeptMastEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("LabDeptMastAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("LabDeptMastDelete", $this->getUrlParm());
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
        $this->MainCD->setDbValue($row['MainCD']);
        $this->Code->setDbValue($row['Code']);
        $this->Name->setDbValue($row['Name']);
        $this->Order->setDbValue($row['Order']);
        $this->SignCD->setDbValue($row['SignCD']);
        $this->Collection->setDbValue($row['Collection']);
        $this->EditDate->setDbValue($row['EditDate']);
        $this->SMS->setDbValue($row['SMS']);
        $this->Note->setDbValue($row['Note']);
        $this->WorkList->setDbValue($row['WorkList']);
        $this->_Page->setDbValue($row['Page']);
        $this->Incharge->setDbValue($row['Incharge']);
        $this->AutoNum->setDbValue($row['AutoNum']);
        $this->id->setDbValue($row['id']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // MainCD

        // Code

        // Name

        // Order

        // SignCD

        // Collection

        // EditDate

        // SMS

        // Note

        // WorkList

        // Page

        // Incharge

        // AutoNum

        // id

        // MainCD
        $this->MainCD->ViewValue = $this->MainCD->CurrentValue;
        $this->MainCD->ViewCustomAttributes = "";

        // Code
        $this->Code->ViewValue = $this->Code->CurrentValue;
        $this->Code->ViewCustomAttributes = "";

        // Name
        $this->Name->ViewValue = $this->Name->CurrentValue;
        $this->Name->ViewCustomAttributes = "";

        // Order
        $this->Order->ViewValue = $this->Order->CurrentValue;
        $this->Order->ViewValue = FormatNumber($this->Order->ViewValue, 2, -2, -2, -2);
        $this->Order->ViewCustomAttributes = "";

        // SignCD
        $this->SignCD->ViewValue = $this->SignCD->CurrentValue;
        $this->SignCD->ViewCustomAttributes = "";

        // Collection
        $this->Collection->ViewValue = $this->Collection->CurrentValue;
        $this->Collection->ViewCustomAttributes = "";

        // EditDate
        $this->EditDate->ViewValue = $this->EditDate->CurrentValue;
        $this->EditDate->ViewValue = FormatDateTime($this->EditDate->ViewValue, 0);
        $this->EditDate->ViewCustomAttributes = "";

        // SMS
        $this->SMS->ViewValue = $this->SMS->CurrentValue;
        $this->SMS->ViewCustomAttributes = "";

        // Note
        $this->Note->ViewValue = $this->Note->CurrentValue;
        $this->Note->ViewCustomAttributes = "";

        // WorkList
        $this->WorkList->ViewValue = $this->WorkList->CurrentValue;
        $this->WorkList->ViewCustomAttributes = "";

        // Page
        $this->_Page->ViewValue = $this->_Page->CurrentValue;
        $this->_Page->ViewValue = FormatNumber($this->_Page->ViewValue, 2, -2, -2, -2);
        $this->_Page->ViewCustomAttributes = "";

        // Incharge
        $this->Incharge->ViewValue = $this->Incharge->CurrentValue;
        $this->Incharge->ViewCustomAttributes = "";

        // AutoNum
        $this->AutoNum->ViewValue = $this->AutoNum->CurrentValue;
        $this->AutoNum->ViewCustomAttributes = "";

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // MainCD
        $this->MainCD->LinkCustomAttributes = "";
        $this->MainCD->HrefValue = "";
        $this->MainCD->TooltipValue = "";

        // Code
        $this->Code->LinkCustomAttributes = "";
        $this->Code->HrefValue = "";
        $this->Code->TooltipValue = "";

        // Name
        $this->Name->LinkCustomAttributes = "";
        $this->Name->HrefValue = "";
        $this->Name->TooltipValue = "";

        // Order
        $this->Order->LinkCustomAttributes = "";
        $this->Order->HrefValue = "";
        $this->Order->TooltipValue = "";

        // SignCD
        $this->SignCD->LinkCustomAttributes = "";
        $this->SignCD->HrefValue = "";
        $this->SignCD->TooltipValue = "";

        // Collection
        $this->Collection->LinkCustomAttributes = "";
        $this->Collection->HrefValue = "";
        $this->Collection->TooltipValue = "";

        // EditDate
        $this->EditDate->LinkCustomAttributes = "";
        $this->EditDate->HrefValue = "";
        $this->EditDate->TooltipValue = "";

        // SMS
        $this->SMS->LinkCustomAttributes = "";
        $this->SMS->HrefValue = "";
        $this->SMS->TooltipValue = "";

        // Note
        $this->Note->LinkCustomAttributes = "";
        $this->Note->HrefValue = "";
        $this->Note->TooltipValue = "";

        // WorkList
        $this->WorkList->LinkCustomAttributes = "";
        $this->WorkList->HrefValue = "";
        $this->WorkList->TooltipValue = "";

        // Page
        $this->_Page->LinkCustomAttributes = "";
        $this->_Page->HrefValue = "";
        $this->_Page->TooltipValue = "";

        // Incharge
        $this->Incharge->LinkCustomAttributes = "";
        $this->Incharge->HrefValue = "";
        $this->Incharge->TooltipValue = "";

        // AutoNum
        $this->AutoNum->LinkCustomAttributes = "";
        $this->AutoNum->HrefValue = "";
        $this->AutoNum->TooltipValue = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

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

        // MainCD
        $this->MainCD->EditAttrs["class"] = "form-control";
        $this->MainCD->EditCustomAttributes = "";
        if (!$this->MainCD->Raw) {
            $this->MainCD->CurrentValue = HtmlDecode($this->MainCD->CurrentValue);
        }
        $this->MainCD->EditValue = $this->MainCD->CurrentValue;
        $this->MainCD->PlaceHolder = RemoveHtml($this->MainCD->caption());

        // Code
        $this->Code->EditAttrs["class"] = "form-control";
        $this->Code->EditCustomAttributes = "";
        if (!$this->Code->Raw) {
            $this->Code->CurrentValue = HtmlDecode($this->Code->CurrentValue);
        }
        $this->Code->EditValue = $this->Code->CurrentValue;
        $this->Code->PlaceHolder = RemoveHtml($this->Code->caption());

        // Name
        $this->Name->EditAttrs["class"] = "form-control";
        $this->Name->EditCustomAttributes = "";
        if (!$this->Name->Raw) {
            $this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
        }
        $this->Name->EditValue = $this->Name->CurrentValue;
        $this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

        // Order
        $this->Order->EditAttrs["class"] = "form-control";
        $this->Order->EditCustomAttributes = "";
        $this->Order->EditValue = $this->Order->CurrentValue;
        $this->Order->PlaceHolder = RemoveHtml($this->Order->caption());
        if (strval($this->Order->EditValue) != "" && is_numeric($this->Order->EditValue)) {
            $this->Order->EditValue = FormatNumber($this->Order->EditValue, -2, -2, -2, -2);
        }

        // SignCD
        $this->SignCD->EditAttrs["class"] = "form-control";
        $this->SignCD->EditCustomAttributes = "";
        if (!$this->SignCD->Raw) {
            $this->SignCD->CurrentValue = HtmlDecode($this->SignCD->CurrentValue);
        }
        $this->SignCD->EditValue = $this->SignCD->CurrentValue;
        $this->SignCD->PlaceHolder = RemoveHtml($this->SignCD->caption());

        // Collection
        $this->Collection->EditAttrs["class"] = "form-control";
        $this->Collection->EditCustomAttributes = "";
        if (!$this->Collection->Raw) {
            $this->Collection->CurrentValue = HtmlDecode($this->Collection->CurrentValue);
        }
        $this->Collection->EditValue = $this->Collection->CurrentValue;
        $this->Collection->PlaceHolder = RemoveHtml($this->Collection->caption());

        // EditDate
        $this->EditDate->EditAttrs["class"] = "form-control";
        $this->EditDate->EditCustomAttributes = "";
        $this->EditDate->EditValue = FormatDateTime($this->EditDate->CurrentValue, 8);
        $this->EditDate->PlaceHolder = RemoveHtml($this->EditDate->caption());

        // SMS
        $this->SMS->EditAttrs["class"] = "form-control";
        $this->SMS->EditCustomAttributes = "";
        if (!$this->SMS->Raw) {
            $this->SMS->CurrentValue = HtmlDecode($this->SMS->CurrentValue);
        }
        $this->SMS->EditValue = $this->SMS->CurrentValue;
        $this->SMS->PlaceHolder = RemoveHtml($this->SMS->caption());

        // Note
        $this->Note->EditAttrs["class"] = "form-control";
        $this->Note->EditCustomAttributes = "";
        $this->Note->EditValue = $this->Note->CurrentValue;
        $this->Note->PlaceHolder = RemoveHtml($this->Note->caption());

        // WorkList
        $this->WorkList->EditAttrs["class"] = "form-control";
        $this->WorkList->EditCustomAttributes = "";
        if (!$this->WorkList->Raw) {
            $this->WorkList->CurrentValue = HtmlDecode($this->WorkList->CurrentValue);
        }
        $this->WorkList->EditValue = $this->WorkList->CurrentValue;
        $this->WorkList->PlaceHolder = RemoveHtml($this->WorkList->caption());

        // Page
        $this->_Page->EditAttrs["class"] = "form-control";
        $this->_Page->EditCustomAttributes = "";
        $this->_Page->EditValue = $this->_Page->CurrentValue;
        $this->_Page->PlaceHolder = RemoveHtml($this->_Page->caption());
        if (strval($this->_Page->EditValue) != "" && is_numeric($this->_Page->EditValue)) {
            $this->_Page->EditValue = FormatNumber($this->_Page->EditValue, -2, -2, -2, -2);
        }

        // Incharge
        $this->Incharge->EditAttrs["class"] = "form-control";
        $this->Incharge->EditCustomAttributes = "";
        if (!$this->Incharge->Raw) {
            $this->Incharge->CurrentValue = HtmlDecode($this->Incharge->CurrentValue);
        }
        $this->Incharge->EditValue = $this->Incharge->CurrentValue;
        $this->Incharge->PlaceHolder = RemoveHtml($this->Incharge->caption());

        // AutoNum
        $this->AutoNum->EditAttrs["class"] = "form-control";
        $this->AutoNum->EditCustomAttributes = "";
        if (!$this->AutoNum->Raw) {
            $this->AutoNum->CurrentValue = HtmlDecode($this->AutoNum->CurrentValue);
        }
        $this->AutoNum->EditValue = $this->AutoNum->CurrentValue;
        $this->AutoNum->PlaceHolder = RemoveHtml($this->AutoNum->caption());

        // id
        $this->id->EditAttrs["class"] = "form-control";
        $this->id->EditCustomAttributes = "";
        $this->id->EditValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

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
                    $doc->exportCaption($this->MainCD);
                    $doc->exportCaption($this->Code);
                    $doc->exportCaption($this->Name);
                    $doc->exportCaption($this->Order);
                    $doc->exportCaption($this->SignCD);
                    $doc->exportCaption($this->Collection);
                    $doc->exportCaption($this->EditDate);
                    $doc->exportCaption($this->SMS);
                    $doc->exportCaption($this->Note);
                    $doc->exportCaption($this->WorkList);
                    $doc->exportCaption($this->_Page);
                    $doc->exportCaption($this->Incharge);
                    $doc->exportCaption($this->AutoNum);
                    $doc->exportCaption($this->id);
                } else {
                    $doc->exportCaption($this->MainCD);
                    $doc->exportCaption($this->Code);
                    $doc->exportCaption($this->Name);
                    $doc->exportCaption($this->Order);
                    $doc->exportCaption($this->SignCD);
                    $doc->exportCaption($this->Collection);
                    $doc->exportCaption($this->EditDate);
                    $doc->exportCaption($this->SMS);
                    $doc->exportCaption($this->WorkList);
                    $doc->exportCaption($this->_Page);
                    $doc->exportCaption($this->Incharge);
                    $doc->exportCaption($this->AutoNum);
                    $doc->exportCaption($this->id);
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
                        $doc->exportField($this->MainCD);
                        $doc->exportField($this->Code);
                        $doc->exportField($this->Name);
                        $doc->exportField($this->Order);
                        $doc->exportField($this->SignCD);
                        $doc->exportField($this->Collection);
                        $doc->exportField($this->EditDate);
                        $doc->exportField($this->SMS);
                        $doc->exportField($this->Note);
                        $doc->exportField($this->WorkList);
                        $doc->exportField($this->_Page);
                        $doc->exportField($this->Incharge);
                        $doc->exportField($this->AutoNum);
                        $doc->exportField($this->id);
                    } else {
                        $doc->exportField($this->MainCD);
                        $doc->exportField($this->Code);
                        $doc->exportField($this->Name);
                        $doc->exportField($this->Order);
                        $doc->exportField($this->SignCD);
                        $doc->exportField($this->Collection);
                        $doc->exportField($this->EditDate);
                        $doc->exportField($this->SMS);
                        $doc->exportField($this->WorkList);
                        $doc->exportField($this->_Page);
                        $doc->exportField($this->Incharge);
                        $doc->exportField($this->AutoNum);
                        $doc->exportField($this->id);
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
