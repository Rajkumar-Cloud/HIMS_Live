<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for employee_has_degree
 */
class EmployeeHasDegree extends DbTable
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
    public $employee_id;
    public $degree_id;
    public $college_or_school;
    public $university_or_board;
    public $year_of_passing;
    public $scoring_marks;
    public $certificates;
    public $_others;
    public $status;
    public $createdby;
    public $createddatetime;
    public $modifiedby;
    public $modifieddatetime;
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
        $this->TableVar = 'employee_has_degree';
        $this->TableName = 'employee_has_degree';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`employee_has_degree`";
        $this->Dbid = 'DB';
        $this->ExportAll = true;
        $this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
        $this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
        $this->ExportPageSize = "a4"; // Page size (PDF only)
        $this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
        $this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
        $this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
        $this->ExportWordColumnWidth = null; // Cell width (PHPWord only)
        $this->DetailAdd = true; // Allow detail add
        $this->DetailEdit = true; // Allow detail edit
        $this->DetailView = true; // Allow detail view
        $this->ShowMultipleDetails = false; // Show multiple details
        $this->GridAddRowCount = 5;
        $this->AllowAddDeleteRow = true; // Allow add/delete row
        $this->UserIDAllowSecurity = Config("DEFAULT_USER_ID_ALLOW_SECURITY"); // Default User ID allowed permissions
        $this->BasicSearch = new BasicSearch($this->TableVar);

        // id
        $this->id = new DbField('employee_has_degree', 'employee_has_degree', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // employee_id
        $this->employee_id = new DbField('employee_has_degree', 'employee_has_degree', 'x_employee_id', 'employee_id', '`employee_id`', '`employee_id`', 3, 11, -1, false, '`employee_id`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->employee_id->IsForeignKey = true; // Foreign key field
        $this->employee_id->Nullable = false; // NOT NULL field
        $this->employee_id->Required = true; // Required field
        $this->employee_id->Sortable = true; // Allow sort
        $this->employee_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->employee_id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->employee_id->Param, "CustomMsg");
        $this->Fields['employee_id'] = &$this->employee_id;

        // degree_id
        $this->degree_id = new DbField('employee_has_degree', 'employee_has_degree', 'x_degree_id', 'degree_id', '`degree_id`', '`degree_id`', 3, 11, -1, false, '`degree_id`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->degree_id->Nullable = false; // NOT NULL field
        $this->degree_id->Required = true; // Required field
        $this->degree_id->Sortable = true; // Allow sort
        $this->degree_id->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->degree_id->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->degree_id->Lookup = new Lookup('degree_id', 'mas_degree', false, 'id', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->degree_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->degree_id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->degree_id->Param, "CustomMsg");
        $this->Fields['degree_id'] = &$this->degree_id;

        // college_or_school
        $this->college_or_school = new DbField('employee_has_degree', 'employee_has_degree', 'x_college_or_school', 'college_or_school', '`college_or_school`', '`college_or_school`', 200, 100, -1, false, '`college_or_school`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->college_or_school->Nullable = false; // NOT NULL field
        $this->college_or_school->Required = true; // Required field
        $this->college_or_school->Sortable = true; // Allow sort
        $this->college_or_school->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->college_or_school->Param, "CustomMsg");
        $this->Fields['college_or_school'] = &$this->college_or_school;

        // university_or_board
        $this->university_or_board = new DbField('employee_has_degree', 'employee_has_degree', 'x_university_or_board', 'university_or_board', '`university_or_board`', '`university_or_board`', 200, 100, -1, false, '`university_or_board`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->university_or_board->Nullable = false; // NOT NULL field
        $this->university_or_board->Required = true; // Required field
        $this->university_or_board->Sortable = true; // Allow sort
        $this->university_or_board->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->university_or_board->Param, "CustomMsg");
        $this->Fields['university_or_board'] = &$this->university_or_board;

        // year_of_passing
        $this->year_of_passing = new DbField('employee_has_degree', 'employee_has_degree', 'x_year_of_passing', 'year_of_passing', '`year_of_passing`', '`year_of_passing`', 200, 100, -1, false, '`year_of_passing`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->year_of_passing->Nullable = false; // NOT NULL field
        $this->year_of_passing->Required = true; // Required field
        $this->year_of_passing->Sortable = true; // Allow sort
        $this->year_of_passing->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->year_of_passing->Param, "CustomMsg");
        $this->Fields['year_of_passing'] = &$this->year_of_passing;

        // scoring_marks
        $this->scoring_marks = new DbField('employee_has_degree', 'employee_has_degree', 'x_scoring_marks', 'scoring_marks', '`scoring_marks`', '`scoring_marks`', 200, 100, -1, false, '`scoring_marks`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->scoring_marks->Nullable = false; // NOT NULL field
        $this->scoring_marks->Required = true; // Required field
        $this->scoring_marks->Sortable = true; // Allow sort
        $this->scoring_marks->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->scoring_marks->Param, "CustomMsg");
        $this->Fields['scoring_marks'] = &$this->scoring_marks;

        // certificates
        $this->certificates = new DbField('employee_has_degree', 'employee_has_degree', 'x_certificates', 'certificates', '`certificates`', '`certificates`', 200, 100, -1, true, '`certificates`', false, false, false, 'IMAGE', 'FILE');
        $this->certificates->Nullable = false; // NOT NULL field
        $this->certificates->Required = true; // Required field
        $this->certificates->Sortable = true; // Allow sort
        $this->certificates->UploadMultiple = true;
        $this->certificates->Upload->UploadMultiple = true;
        $this->certificates->UploadMaxFileCount = 0;
        $this->certificates->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->certificates->Param, "CustomMsg");
        $this->Fields['certificates'] = &$this->certificates;

        // others
        $this->_others = new DbField('employee_has_degree', 'employee_has_degree', 'x__others', 'others', '`others`', '`others`', 200, 100, -1, true, '`others`', false, false, false, 'FORMATTED TEXT', 'FILE');
        $this->_others->Nullable = false; // NOT NULL field
        $this->_others->Required = true; // Required field
        $this->_others->Sortable = true; // Allow sort
        $this->_others->UploadMultiple = true;
        $this->_others->Upload->UploadMultiple = true;
        $this->_others->UploadMaxFileCount = 0;
        $this->_others->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->_others->Param, "CustomMsg");
        $this->Fields['others'] = &$this->_others;

        // status
        $this->status = new DbField('employee_has_degree', 'employee_has_degree', 'x_status', 'status', '`status`', '`status`', 3, 11, -1, false, '`status`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->status->Nullable = false; // NOT NULL field
        $this->status->Required = true; // Required field
        $this->status->Sortable = true; // Allow sort
        $this->status->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->status->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->status->Lookup = new Lookup('status', 'sys_status', false, 'id', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->status->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->status->Param, "CustomMsg");
        $this->Fields['status'] = &$this->status;

        // createdby
        $this->createdby = new DbField('employee_has_degree', 'employee_has_degree', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, 11, -1, false, '`createdby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdby->Sortable = false; // Allow sort
        $this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->createdby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createdby->Param, "CustomMsg");
        $this->Fields['createdby'] = &$this->createdby;

        // createddatetime
        $this->createddatetime = new DbField('employee_has_degree', 'employee_has_degree', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, false, '`createddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddatetime->Sortable = false; // Allow sort
        $this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->createddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createddatetime->Param, "CustomMsg");
        $this->Fields['createddatetime'] = &$this->createddatetime;

        // modifiedby
        $this->modifiedby = new DbField('employee_has_degree', 'employee_has_degree', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, 11, -1, false, '`modifiedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifiedby->Sortable = false; // Allow sort
        $this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->modifiedby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifiedby->Param, "CustomMsg");
        $this->Fields['modifiedby'] = &$this->modifiedby;

        // modifieddatetime
        $this->modifieddatetime = new DbField('employee_has_degree', 'employee_has_degree', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, false, '`modifieddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifieddatetime->Sortable = false; // Allow sort
        $this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->modifieddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifieddatetime->Param, "CustomMsg");
        $this->Fields['modifieddatetime'] = &$this->modifieddatetime;

        // HospID
        $this->HospID = new DbField('employee_has_degree', 'employee_has_degree', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
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

    // Current master table name
    public function getCurrentMasterTable()
    {
        return Session(PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_MASTER_TABLE"));
    }

    public function setCurrentMasterTable($v)
    {
        $_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_MASTER_TABLE")] = $v;
    }

    // Session master WHERE clause
    public function getMasterFilter()
    {
        // Master filter
        $masterFilter = "";
        if ($this->getCurrentMasterTable() == "employee") {
            if ($this->employee_id->getSessionValue() != "") {
                $masterFilter .= "" . GetForeignKeySql("`id`", $this->employee_id->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
        }
        return $masterFilter;
    }

    // Session detail WHERE clause
    public function getDetailFilter()
    {
        // Detail filter
        $detailFilter = "";
        if ($this->getCurrentMasterTable() == "employee") {
            if ($this->employee_id->getSessionValue() != "") {
                $detailFilter .= "" . GetForeignKeySql("`employee_id`", $this->employee_id->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
        }
        return $detailFilter;
    }

    // Master filter
    public function sqlMasterFilter_employee()
    {
        return "`id`=@id@";
    }
    // Detail filter
    public function sqlDetailFilter_employee()
    {
        return "`employee_id`=@employee_id@";
    }

    // Table level SQL
    public function getSqlFrom() // From
    {
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`employee_has_degree`";
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
        $this->DefaultFilter = "`HospID`='".HospitalID()."'";
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
        $this->employee_id->DbValue = $row['employee_id'];
        $this->degree_id->DbValue = $row['degree_id'];
        $this->college_or_school->DbValue = $row['college_or_school'];
        $this->university_or_board->DbValue = $row['university_or_board'];
        $this->year_of_passing->DbValue = $row['year_of_passing'];
        $this->scoring_marks->DbValue = $row['scoring_marks'];
        $this->certificates->Upload->DbValue = $row['certificates'];
        $this->_others->Upload->DbValue = $row['others'];
        $this->status->DbValue = $row['status'];
        $this->createdby->DbValue = $row['createdby'];
        $this->createddatetime->DbValue = $row['createddatetime'];
        $this->modifiedby->DbValue = $row['modifiedby'];
        $this->modifieddatetime->DbValue = $row['modifieddatetime'];
        $this->HospID->DbValue = $row['HospID'];
    }

    // Delete uploaded files
    public function deleteUploadedFiles($row)
    {
        $this->loadDbValues($row);
        $oldFiles = EmptyValue($row['certificates']) ? [] : explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $row['certificates']);
        foreach ($oldFiles as $oldFile) {
            if (file_exists($this->certificates->oldPhysicalUploadPath() . $oldFile)) {
                @unlink($this->certificates->oldPhysicalUploadPath() . $oldFile);
            }
        }
        $oldFiles = EmptyValue($row['others']) ? [] : explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $row['others']);
        foreach ($oldFiles as $oldFile) {
            if (file_exists($this->_others->oldPhysicalUploadPath() . $oldFile)) {
                @unlink($this->_others->oldPhysicalUploadPath() . $oldFile);
            }
        }
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
        return $_SESSION[$name] ?? GetUrl("EmployeeHasDegreeList");
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
        if ($pageName == "EmployeeHasDegreeView") {
            return $Language->phrase("View");
        } elseif ($pageName == "EmployeeHasDegreeEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "EmployeeHasDegreeAdd") {
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
                return "EmployeeHasDegreeView";
            case Config("API_ADD_ACTION"):
                return "EmployeeHasDegreeAdd";
            case Config("API_EDIT_ACTION"):
                return "EmployeeHasDegreeEdit";
            case Config("API_DELETE_ACTION"):
                return "EmployeeHasDegreeDelete";
            case Config("API_LIST_ACTION"):
                return "EmployeeHasDegreeList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "EmployeeHasDegreeList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("EmployeeHasDegreeView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("EmployeeHasDegreeView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "EmployeeHasDegreeAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "EmployeeHasDegreeAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("EmployeeHasDegreeEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("EmployeeHasDegreeAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("EmployeeHasDegreeDelete", $this->getUrlParm());
    }

    // Add master url
    public function addMasterUrl($url)
    {
        if ($this->getCurrentMasterTable() == "employee" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
            $url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
            $url .= "&" . GetForeignKeyUrl("fk_id", $this->employee_id->CurrentValue ?? $this->employee_id->getSessionValue());
        }
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
        $this->employee_id->setDbValue($row['employee_id']);
        $this->degree_id->setDbValue($row['degree_id']);
        $this->college_or_school->setDbValue($row['college_or_school']);
        $this->university_or_board->setDbValue($row['university_or_board']);
        $this->year_of_passing->setDbValue($row['year_of_passing']);
        $this->scoring_marks->setDbValue($row['scoring_marks']);
        $this->certificates->Upload->DbValue = $row['certificates'];
        $this->certificates->setDbValue($this->certificates->Upload->DbValue);
        $this->_others->Upload->DbValue = $row['others'];
        $this->_others->setDbValue($this->_others->Upload->DbValue);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
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

        // employee_id

        // degree_id

        // college_or_school

        // university_or_board

        // year_of_passing

        // scoring_marks

        // certificates

        // others

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // HospID

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // employee_id
        $this->employee_id->ViewValue = $this->employee_id->CurrentValue;
        $this->employee_id->ViewValue = FormatNumber($this->employee_id->ViewValue, 0, -2, -2, -2);
        $this->employee_id->ViewCustomAttributes = "";

        // degree_id
        $curVal = trim(strval($this->degree_id->CurrentValue));
        if ($curVal != "") {
            $this->degree_id->ViewValue = $this->degree_id->lookupCacheOption($curVal);
            if ($this->degree_id->ViewValue === null) { // Lookup from database
                $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                $sqlWrk = $this->degree_id->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->degree_id->Lookup->renderViewRow($rswrk[0]);
                    $this->degree_id->ViewValue = $this->degree_id->displayValue($arwrk);
                } else {
                    $this->degree_id->ViewValue = $this->degree_id->CurrentValue;
                }
            }
        } else {
            $this->degree_id->ViewValue = null;
        }
        $this->degree_id->ViewCustomAttributes = "";

        // college_or_school
        $this->college_or_school->ViewValue = $this->college_or_school->CurrentValue;
        $this->college_or_school->ViewCustomAttributes = "";

        // university_or_board
        $this->university_or_board->ViewValue = $this->university_or_board->CurrentValue;
        $this->university_or_board->ViewCustomAttributes = "";

        // year_of_passing
        $this->year_of_passing->ViewValue = $this->year_of_passing->CurrentValue;
        $this->year_of_passing->ViewCustomAttributes = "";

        // scoring_marks
        $this->scoring_marks->ViewValue = $this->scoring_marks->CurrentValue;
        $this->scoring_marks->ViewCustomAttributes = "";

        // certificates
        if (!EmptyValue($this->certificates->Upload->DbValue)) {
            $this->certificates->ImageWidth = 100;
            $this->certificates->ImageHeight = 100;
            $this->certificates->ImageAlt = $this->certificates->alt();
            $this->certificates->ViewValue = $this->certificates->Upload->DbValue;
        } else {
            $this->certificates->ViewValue = "";
        }
        $this->certificates->ViewCustomAttributes = "";

        // others
        if (!EmptyValue($this->_others->Upload->DbValue)) {
            $this->_others->ViewValue = $this->_others->Upload->DbValue;
        } else {
            $this->_others->ViewValue = "";
        }
        $this->_others->ViewCustomAttributes = "";

        // status
        $curVal = trim(strval($this->status->CurrentValue));
        if ($curVal != "") {
            $this->status->ViewValue = $this->status->lookupCacheOption($curVal);
            if ($this->status->ViewValue === null) { // Lookup from database
                $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                $sqlWrk = $this->status->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->status->Lookup->renderViewRow($rswrk[0]);
                    $this->status->ViewValue = $this->status->displayValue($arwrk);
                } else {
                    $this->status->ViewValue = $this->status->CurrentValue;
                }
            }
        } else {
            $this->status->ViewValue = null;
        }
        $this->status->ViewCustomAttributes = "";

        // createdby
        $this->createdby->ViewValue = $this->createdby->CurrentValue;
        $this->createdby->ViewValue = FormatNumber($this->createdby->ViewValue, 0, -2, -2, -2);
        $this->createdby->ViewCustomAttributes = "";

        // createddatetime
        $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
        $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
        $this->createddatetime->ViewCustomAttributes = "";

        // modifiedby
        $this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
        $this->modifiedby->ViewValue = FormatNumber($this->modifiedby->ViewValue, 0, -2, -2, -2);
        $this->modifiedby->ViewCustomAttributes = "";

        // modifieddatetime
        $this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
        $this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
        $this->modifieddatetime->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // employee_id
        $this->employee_id->LinkCustomAttributes = "";
        $this->employee_id->HrefValue = "";
        $this->employee_id->TooltipValue = "";

        // degree_id
        $this->degree_id->LinkCustomAttributes = "";
        $this->degree_id->HrefValue = "";
        $this->degree_id->TooltipValue = "";

        // college_or_school
        $this->college_or_school->LinkCustomAttributes = "";
        $this->college_or_school->HrefValue = "";
        $this->college_or_school->TooltipValue = "";

        // university_or_board
        $this->university_or_board->LinkCustomAttributes = "";
        $this->university_or_board->HrefValue = "";
        $this->university_or_board->TooltipValue = "";

        // year_of_passing
        $this->year_of_passing->LinkCustomAttributes = "";
        $this->year_of_passing->HrefValue = "";
        $this->year_of_passing->TooltipValue = "";

        // scoring_marks
        $this->scoring_marks->LinkCustomAttributes = "";
        $this->scoring_marks->HrefValue = "";
        $this->scoring_marks->TooltipValue = "";

        // certificates
        $this->certificates->LinkCustomAttributes = "";
        if (!EmptyValue($this->certificates->Upload->DbValue)) {
            $this->certificates->HrefValue = "%u"; // Add prefix/suffix
            $this->certificates->LinkAttrs["target"] = ""; // Add target
            if ($this->isExport()) {
                $this->certificates->HrefValue = FullUrl($this->certificates->HrefValue, "href");
            }
        } else {
            $this->certificates->HrefValue = "";
        }
        $this->certificates->ExportHrefValue = $this->certificates->UploadPath . $this->certificates->Upload->DbValue;
        $this->certificates->TooltipValue = "";
        if ($this->certificates->UseColorbox) {
            if (EmptyValue($this->certificates->TooltipValue)) {
                $this->certificates->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
            }
            $this->certificates->LinkAttrs["data-rel"] = "employee_has_degree_x_certificates";
            $this->certificates->LinkAttrs->appendClass("ew-lightbox");
        }

        // others
        $this->_others->LinkCustomAttributes = "";
        $this->_others->HrefValue = "";
        $this->_others->ExportHrefValue = $this->_others->UploadPath . $this->_others->Upload->DbValue;
        $this->_others->TooltipValue = "";

        // status
        $this->status->LinkCustomAttributes = "";
        $this->status->HrefValue = "";
        $this->status->TooltipValue = "";

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

        // employee_id
        $this->employee_id->EditAttrs["class"] = "form-control";
        $this->employee_id->EditCustomAttributes = "";
        if ($this->employee_id->getSessionValue() != "") {
            $this->employee_id->CurrentValue = GetForeignKeyValue($this->employee_id->getSessionValue());
            $this->employee_id->ViewValue = $this->employee_id->CurrentValue;
            $this->employee_id->ViewValue = FormatNumber($this->employee_id->ViewValue, 0, -2, -2, -2);
            $this->employee_id->ViewCustomAttributes = "";
        } else {
            $this->employee_id->EditValue = $this->employee_id->CurrentValue;
            $this->employee_id->PlaceHolder = RemoveHtml($this->employee_id->caption());
        }

        // degree_id
        $this->degree_id->EditAttrs["class"] = "form-control";
        $this->degree_id->EditCustomAttributes = "";
        $this->degree_id->PlaceHolder = RemoveHtml($this->degree_id->caption());

        // college_or_school
        $this->college_or_school->EditAttrs["class"] = "form-control";
        $this->college_or_school->EditCustomAttributes = "";
        if (!$this->college_or_school->Raw) {
            $this->college_or_school->CurrentValue = HtmlDecode($this->college_or_school->CurrentValue);
        }
        $this->college_or_school->EditValue = $this->college_or_school->CurrentValue;
        $this->college_or_school->PlaceHolder = RemoveHtml($this->college_or_school->caption());

        // university_or_board
        $this->university_or_board->EditAttrs["class"] = "form-control";
        $this->university_or_board->EditCustomAttributes = "";
        if (!$this->university_or_board->Raw) {
            $this->university_or_board->CurrentValue = HtmlDecode($this->university_or_board->CurrentValue);
        }
        $this->university_or_board->EditValue = $this->university_or_board->CurrentValue;
        $this->university_or_board->PlaceHolder = RemoveHtml($this->university_or_board->caption());

        // year_of_passing
        $this->year_of_passing->EditAttrs["class"] = "form-control";
        $this->year_of_passing->EditCustomAttributes = "";
        if (!$this->year_of_passing->Raw) {
            $this->year_of_passing->CurrentValue = HtmlDecode($this->year_of_passing->CurrentValue);
        }
        $this->year_of_passing->EditValue = $this->year_of_passing->CurrentValue;
        $this->year_of_passing->PlaceHolder = RemoveHtml($this->year_of_passing->caption());

        // scoring_marks
        $this->scoring_marks->EditAttrs["class"] = "form-control";
        $this->scoring_marks->EditCustomAttributes = "";
        if (!$this->scoring_marks->Raw) {
            $this->scoring_marks->CurrentValue = HtmlDecode($this->scoring_marks->CurrentValue);
        }
        $this->scoring_marks->EditValue = $this->scoring_marks->CurrentValue;
        $this->scoring_marks->PlaceHolder = RemoveHtml($this->scoring_marks->caption());

        // certificates
        $this->certificates->EditAttrs["class"] = "form-control";
        $this->certificates->EditCustomAttributes = "";
        if (!EmptyValue($this->certificates->Upload->DbValue)) {
            $this->certificates->ImageWidth = 100;
            $this->certificates->ImageHeight = 100;
            $this->certificates->ImageAlt = $this->certificates->alt();
            $this->certificates->EditValue = $this->certificates->Upload->DbValue;
        } else {
            $this->certificates->EditValue = "";
        }
        if (!EmptyValue($this->certificates->CurrentValue)) {
            $this->certificates->Upload->FileName = $this->certificates->CurrentValue;
        }

        // others
        $this->_others->EditAttrs["class"] = "form-control";
        $this->_others->EditCustomAttributes = "";
        if (!EmptyValue($this->_others->Upload->DbValue)) {
            $this->_others->EditValue = $this->_others->Upload->DbValue;
        } else {
            $this->_others->EditValue = "";
        }
        if (!EmptyValue($this->_others->CurrentValue)) {
            $this->_others->Upload->FileName = $this->_others->CurrentValue;
        }

        // status
        $this->status->EditAttrs["class"] = "form-control";
        $this->status->EditCustomAttributes = "";
        $this->status->PlaceHolder = RemoveHtml($this->status->caption());

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // HospID
        $this->HospID->EditAttrs["class"] = "form-control";
        $this->HospID->EditCustomAttributes = "";
        $this->HospID->EditValue = $this->HospID->CurrentValue;
        $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

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
                    $doc->exportCaption($this->employee_id);
                    $doc->exportCaption($this->degree_id);
                    $doc->exportCaption($this->college_or_school);
                    $doc->exportCaption($this->university_or_board);
                    $doc->exportCaption($this->year_of_passing);
                    $doc->exportCaption($this->scoring_marks);
                    $doc->exportCaption($this->certificates);
                    $doc->exportCaption($this->_others);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->HospID);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->employee_id);
                    $doc->exportCaption($this->degree_id);
                    $doc->exportCaption($this->college_or_school);
                    $doc->exportCaption($this->university_or_board);
                    $doc->exportCaption($this->year_of_passing);
                    $doc->exportCaption($this->scoring_marks);
                    $doc->exportCaption($this->certificates);
                    $doc->exportCaption($this->_others);
                    $doc->exportCaption($this->status);
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
                        $doc->exportField($this->employee_id);
                        $doc->exportField($this->degree_id);
                        $doc->exportField($this->college_or_school);
                        $doc->exportField($this->university_or_board);
                        $doc->exportField($this->year_of_passing);
                        $doc->exportField($this->scoring_marks);
                        $doc->exportField($this->certificates);
                        $doc->exportField($this->_others);
                        $doc->exportField($this->status);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->HospID);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->employee_id);
                        $doc->exportField($this->degree_id);
                        $doc->exportField($this->college_or_school);
                        $doc->exportField($this->university_or_board);
                        $doc->exportField($this->year_of_passing);
                        $doc->exportField($this->scoring_marks);
                        $doc->exportField($this->certificates);
                        $doc->exportField($this->_others);
                        $doc->exportField($this->status);
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
        $width = ($width > 0) ? $width : Config("THUMBNAIL_DEFAULT_WIDTH");
        $height = ($height > 0) ? $height : Config("THUMBNAIL_DEFAULT_HEIGHT");

        // Set up field name / file name field / file type field
        $fldName = "";
        $fileNameFld = "";
        $fileTypeFld = "";
        if ($fldparm == 'certificates') {
            $fldName = "certificates";
            $fileNameFld = "certificates";
        } elseif ($fldparm == '_others') {
            $fldName = "others";
            $fileNameFld = "others";
        } else {
            return false; // Incorrect field
        }

        // Set up key values
        $ar = explode(Config("COMPOSITE_KEY_SEPARATOR"), $key);
        if (count($ar) == 1) {
            $this->id->CurrentValue = $ar[0];
        } else {
            return false; // Incorrect key
        }

        // Set up filter (WHERE Clause)
        $filter = $this->getRecordFilter();
        $this->CurrentFilter = $filter;
        $sql = $this->getCurrentSql();
        $conn = $this->getConnection();
        $dbtype = GetConnectionType($this->Dbid);
        if ($row = $conn->fetchAssoc($sql)) {
            $val = $row[$fldName];
            if (!EmptyValue($val)) {
                $fld = $this->Fields[$fldName];

                // Binary data
                if ($fld->DataType == DATATYPE_BLOB) {
                    if ($dbtype != "MYSQL") {
                        if (is_resource($val) && get_resource_type($val) == "stream") { // Byte array
                            $val = stream_get_contents($val);
                        }
                    }
                    if ($resize) {
                        ResizeBinary($val, $width, $height, 100, $plugins);
                    }

                    // Write file type
                    if ($fileTypeFld != "" && !EmptyValue($row[$fileTypeFld])) {
                        AddHeader("Content-type", $row[$fileTypeFld]);
                    } else {
                        AddHeader("Content-type", ContentType($val));
                    }

                    // Write file name
                    $downloadPdf = !Config("EMBED_PDF") && Config("DOWNLOAD_PDF_FILE");
                    if ($fileNameFld != "" && !EmptyValue($row[$fileNameFld])) {
                        $fileName = $row[$fileNameFld];
                        $pathinfo = pathinfo($fileName);
                        $ext = strtolower(@$pathinfo["extension"]);
                        $isPdf = SameText($ext, "pdf");
                        if ($downloadPdf || !$isPdf) { // Skip header if not download PDF
                            AddHeader("Content-Disposition", "attachment; filename=\"" . $fileName . "\"");
                        }
                    } else {
                        $ext = ContentExtension($val);
                        $isPdf = SameText($ext, ".pdf");
                        if ($isPdf && $downloadPdf) { // Add header if download PDF
                            AddHeader("Content-Disposition", "attachment; filename=\"" . $fileName . "\"");
                        }
                    }

                    // Write file data
                    if (
                        StartsString("PK", $val) &&
                        ContainsString($val, "[Content_Types].xml") &&
                        ContainsString($val, "_rels") &&
                        ContainsString($val, "docProps")
                    ) { // Fix Office 2007 documents
                        if (!EndsString("\0\0\0", $val)) { // Not ends with 3 or 4 \0
                            $val .= "\0\0\0\0";
                        }
                    }

                    // Clear any debug message
                    if (ob_get_length()) {
                        ob_end_clean();
                    }

                    // Write binary data
                    Write($val);

                // Upload to folder
                } else {
                    if ($fld->UploadMultiple) {
                        $files = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $val);
                    } else {
                        $files = [$val];
                    }
                    $data = [];
                    $ar = [];
                    foreach ($files as $file) {
                        if (!EmptyValue($file)) {
                            if (Config("ENCRYPT_FILE_PATH")) {
                                $ar[$file] = FullUrl(GetApiUrl(Config("API_FILE_ACTION") .
                                    "/" . $this->TableVar . "/" . Encrypt($fld->physicalUploadPath() . $file)));
                            } else {
                                $ar[$file] = FullUrl($fld->hrefPath() . $file);
                            }
                        }
                    }
                    $data[$fld->Param] = $ar;
                    WriteJson($data);
                }
            }
            return true;
        }
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
