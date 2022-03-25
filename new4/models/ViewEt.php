<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_et
 */
class ViewEt extends DbTable
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
    public $RIDNo;
    public $PatientName;
    public $TiDNo;
    public $id;
    public $EmbryoNo;
    public $Stage;
    public $FertilisationDate;
    public $Day;
    public $Grade;
    public $Incubator;
    public $Catheter;
    public $Difficulty;
    public $Easy;
    public $Comments;
    public $Doctor;
    public $Embryologist;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'view_et';
        $this->TableName = 'view_et';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_et`";
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

        // RIDNo
        $this->RIDNo = new DbField('view_et', 'view_et', 'x_RIDNo', 'RIDNo', '`RIDNo`', '`RIDNo`', 3, 11, -1, false, '`RIDNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RIDNo->Nullable = false; // NOT NULL field
        $this->RIDNo->Required = true; // Required field
        $this->RIDNo->Sortable = false; // Allow sort
        $this->RIDNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->RIDNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RIDNo->Param, "CustomMsg");
        $this->Fields['RIDNo'] = &$this->RIDNo;

        // PatientName
        $this->PatientName = new DbField('view_et', 'view_et', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, false, '`PatientName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientName->Sortable = false; // Allow sort
        $this->PatientName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientName->Param, "CustomMsg");
        $this->Fields['PatientName'] = &$this->PatientName;

        // TiDNo
        $this->TiDNo = new DbField('view_et', 'view_et', 'x_TiDNo', 'TiDNo', '`TiDNo`', '`TiDNo`', 3, 11, -1, false, '`TiDNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TiDNo->Nullable = false; // NOT NULL field
        $this->TiDNo->Required = true; // Required field
        $this->TiDNo->Sortable = false; // Allow sort
        $this->TiDNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->TiDNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TiDNo->Param, "CustomMsg");
        $this->Fields['TiDNo'] = &$this->TiDNo;

        // id
        $this->id = new DbField('view_et', 'view_et', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = false; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // EmbryoNo
        $this->EmbryoNo = new DbField('view_et', 'view_et', 'x_EmbryoNo', 'EmbryoNo', '`EmbryoNo`', '`EmbryoNo`', 200, 45, -1, false, '`EmbryoNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EmbryoNo->Sortable = true; // Allow sort
        $this->EmbryoNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EmbryoNo->Param, "CustomMsg");
        $this->Fields['EmbryoNo'] = &$this->EmbryoNo;

        // Stage
        $this->Stage = new DbField('view_et', 'view_et', 'x_Stage', 'Stage', '`Stage`', '`Stage`', 200, 45, -1, false, '`Stage`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Stage->Sortable = true; // Allow sort
        $this->Stage->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Stage->Param, "CustomMsg");
        $this->Fields['Stage'] = &$this->Stage;

        // FertilisationDate
        $this->FertilisationDate = new DbField('view_et', 'view_et', 'x_FertilisationDate', 'FertilisationDate', '`FertilisationDate`', CastDateFieldForLike("`FertilisationDate`", 0, "DB"), 135, 19, 0, false, '`FertilisationDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FertilisationDate->Sortable = true; // Allow sort
        $this->FertilisationDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->FertilisationDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FertilisationDate->Param, "CustomMsg");
        $this->Fields['FertilisationDate'] = &$this->FertilisationDate;

        // Day
        $this->Day = new DbField('view_et', 'view_et', 'x_Day', 'Day', '`Day`', '`Day`', 200, 45, -1, false, '`Day`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day->Sortable = true; // Allow sort
        $this->Day->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day->Lookup = new Lookup('Day', 'view_et', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day->OptionCount = 6;
        $this->Day->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day->Param, "CustomMsg");
        $this->Fields['Day'] = &$this->Day;

        // Grade
        $this->Grade = new DbField('view_et', 'view_et', 'x_Grade', 'Grade', '`Grade`', '`Grade`', 200, 45, -1, false, '`Grade`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Grade->Sortable = true; // Allow sort
        $this->Grade->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Grade->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Grade->Lookup = new Lookup('Grade', 'view_et', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Grade->OptionCount = 4;
        $this->Grade->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Grade->Param, "CustomMsg");
        $this->Fields['Grade'] = &$this->Grade;

        // Incubator
        $this->Incubator = new DbField('view_et', 'view_et', 'x_Incubator', 'Incubator', '`Incubator`', '`Incubator`', 200, 45, -1, false, '`Incubator`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Incubator->Sortable = true; // Allow sort
        $this->Incubator->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Incubator->Param, "CustomMsg");
        $this->Fields['Incubator'] = &$this->Incubator;

        // Catheter
        $this->Catheter = new DbField('view_et', 'view_et', 'x_Catheter', 'Catheter', '`Catheter`', '`Catheter`', 200, 45, -1, false, '`Catheter`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Catheter->Sortable = true; // Allow sort
        $this->Catheter->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Catheter->Param, "CustomMsg");
        $this->Fields['Catheter'] = &$this->Catheter;

        // Difficulty
        $this->Difficulty = new DbField('view_et', 'view_et', 'x_Difficulty', 'Difficulty', '`Difficulty`', '`Difficulty`', 200, 45, -1, false, '`Difficulty`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Difficulty->Sortable = true; // Allow sort
        $this->Difficulty->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Difficulty->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Difficulty->Lookup = new Lookup('Difficulty', 'view_et', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Difficulty->OptionCount = 3;
        $this->Difficulty->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Difficulty->Param, "CustomMsg");
        $this->Fields['Difficulty'] = &$this->Difficulty;

        // Easy
        $this->Easy = new DbField('view_et', 'view_et', 'x_Easy', 'Easy', '`Easy`', '`Easy`', 200, 220, -1, false, '`Easy`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->Easy->Sortable = true; // Allow sort
        $this->Easy->Lookup = new Lookup('Easy', 'view_et', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Easy->OptionCount = 5;
        $this->Easy->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Easy->Param, "CustomMsg");
        $this->Fields['Easy'] = &$this->Easy;

        // Comments
        $this->Comments = new DbField('view_et', 'view_et', 'x_Comments', 'Comments', '`Comments`', '`Comments`', 200, 45, -1, false, '`Comments`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Comments->Sortable = true; // Allow sort
        $this->Comments->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Comments->Param, "CustomMsg");
        $this->Fields['Comments'] = &$this->Comments;

        // Doctor
        $this->Doctor = new DbField('view_et', 'view_et', 'x_Doctor', 'Doctor', '`Doctor`', '`Doctor`', 200, 45, -1, false, '`Doctor`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Doctor->Sortable = true; // Allow sort
        $this->Doctor->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Doctor->Param, "CustomMsg");
        $this->Fields['Doctor'] = &$this->Doctor;

        // Embryologist
        $this->Embryologist = new DbField('view_et', 'view_et', 'x_Embryologist', 'Embryologist', '`Embryologist`', '`Embryologist`', 200, 45, -1, false, '`Embryologist`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Embryologist->Sortable = true; // Allow sort
        $this->Embryologist->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Embryologist->Param, "CustomMsg");
        $this->Fields['Embryologist'] = &$this->Embryologist;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_et`";
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
        $this->RIDNo->DbValue = $row['RIDNo'];
        $this->PatientName->DbValue = $row['PatientName'];
        $this->TiDNo->DbValue = $row['TiDNo'];
        $this->id->DbValue = $row['id'];
        $this->EmbryoNo->DbValue = $row['EmbryoNo'];
        $this->Stage->DbValue = $row['Stage'];
        $this->FertilisationDate->DbValue = $row['FertilisationDate'];
        $this->Day->DbValue = $row['Day'];
        $this->Grade->DbValue = $row['Grade'];
        $this->Incubator->DbValue = $row['Incubator'];
        $this->Catheter->DbValue = $row['Catheter'];
        $this->Difficulty->DbValue = $row['Difficulty'];
        $this->Easy->DbValue = $row['Easy'];
        $this->Comments->DbValue = $row['Comments'];
        $this->Doctor->DbValue = $row['Doctor'];
        $this->Embryologist->DbValue = $row['Embryologist'];
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
        return $_SESSION[$name] ?? GetUrl("ViewEtList");
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
        if ($pageName == "ViewEtView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewEtEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewEtAdd") {
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
                return "ViewEtView";
            case Config("API_ADD_ACTION"):
                return "ViewEtAdd";
            case Config("API_EDIT_ACTION"):
                return "ViewEtEdit";
            case Config("API_DELETE_ACTION"):
                return "ViewEtDelete";
            case Config("API_LIST_ACTION"):
                return "ViewEtList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewEtList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewEtView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewEtView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewEtAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewEtAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewEtEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewEtAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewEtDelete", $this->getUrlParm());
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
        $this->RIDNo->setDbValue($row['RIDNo']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->TiDNo->setDbValue($row['TiDNo']);
        $this->id->setDbValue($row['id']);
        $this->EmbryoNo->setDbValue($row['EmbryoNo']);
        $this->Stage->setDbValue($row['Stage']);
        $this->FertilisationDate->setDbValue($row['FertilisationDate']);
        $this->Day->setDbValue($row['Day']);
        $this->Grade->setDbValue($row['Grade']);
        $this->Incubator->setDbValue($row['Incubator']);
        $this->Catheter->setDbValue($row['Catheter']);
        $this->Difficulty->setDbValue($row['Difficulty']);
        $this->Easy->setDbValue($row['Easy']);
        $this->Comments->setDbValue($row['Comments']);
        $this->Doctor->setDbValue($row['Doctor']);
        $this->Embryologist->setDbValue($row['Embryologist']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // RIDNo

        // PatientName

        // TiDNo

        // id

        // EmbryoNo

        // Stage

        // FertilisationDate

        // Day

        // Grade

        // Incubator

        // Catheter

        // Difficulty

        // Easy

        // Comments

        // Doctor

        // Embryologist

        // RIDNo
        $this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
        $this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
        $this->RIDNo->ViewCustomAttributes = "";

        // PatientName
        $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
        $this->PatientName->ViewCustomAttributes = "";

        // TiDNo
        $this->TiDNo->ViewValue = $this->TiDNo->CurrentValue;
        $this->TiDNo->ViewValue = FormatNumber($this->TiDNo->ViewValue, 0, -2, -2, -2);
        $this->TiDNo->ViewCustomAttributes = "";

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // EmbryoNo
        $this->EmbryoNo->ViewValue = $this->EmbryoNo->CurrentValue;
        $this->EmbryoNo->ViewCustomAttributes = "";

        // Stage
        $this->Stage->ViewValue = $this->Stage->CurrentValue;
        $this->Stage->ViewCustomAttributes = "";

        // FertilisationDate
        $this->FertilisationDate->ViewValue = $this->FertilisationDate->CurrentValue;
        $this->FertilisationDate->ViewValue = FormatDateTime($this->FertilisationDate->ViewValue, 0);
        $this->FertilisationDate->ViewCustomAttributes = "";

        // Day
        if (strval($this->Day->CurrentValue) != "") {
            $this->Day->ViewValue = $this->Day->optionCaption($this->Day->CurrentValue);
        } else {
            $this->Day->ViewValue = null;
        }
        $this->Day->ViewCustomAttributes = "";

        // Grade
        if (strval($this->Grade->CurrentValue) != "") {
            $this->Grade->ViewValue = $this->Grade->optionCaption($this->Grade->CurrentValue);
        } else {
            $this->Grade->ViewValue = null;
        }
        $this->Grade->ViewCustomAttributes = "";

        // Incubator
        $this->Incubator->ViewValue = $this->Incubator->CurrentValue;
        $this->Incubator->ViewCustomAttributes = "";

        // Catheter
        $this->Catheter->ViewValue = $this->Catheter->CurrentValue;
        $this->Catheter->ViewCustomAttributes = "";

        // Difficulty
        if (strval($this->Difficulty->CurrentValue) != "") {
            $this->Difficulty->ViewValue = $this->Difficulty->optionCaption($this->Difficulty->CurrentValue);
        } else {
            $this->Difficulty->ViewValue = null;
        }
        $this->Difficulty->ViewCustomAttributes = "";

        // Easy
        if (strval($this->Easy->CurrentValue) != "") {
            $this->Easy->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->Easy->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->Easy->ViewValue->add($this->Easy->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->Easy->ViewValue = null;
        }
        $this->Easy->ViewCustomAttributes = "";

        // Comments
        $this->Comments->ViewValue = $this->Comments->CurrentValue;
        $this->Comments->ViewCustomAttributes = "";

        // Doctor
        $this->Doctor->ViewValue = $this->Doctor->CurrentValue;
        $this->Doctor->ViewCustomAttributes = "";

        // Embryologist
        $this->Embryologist->ViewValue = $this->Embryologist->CurrentValue;
        $this->Embryologist->ViewCustomAttributes = "";

        // RIDNo
        $this->RIDNo->LinkCustomAttributes = "";
        $this->RIDNo->HrefValue = "";
        $this->RIDNo->TooltipValue = "";

        // PatientName
        $this->PatientName->LinkCustomAttributes = "";
        $this->PatientName->HrefValue = "";
        $this->PatientName->TooltipValue = "";

        // TiDNo
        $this->TiDNo->LinkCustomAttributes = "";
        $this->TiDNo->HrefValue = "";
        $this->TiDNo->TooltipValue = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // EmbryoNo
        $this->EmbryoNo->LinkCustomAttributes = "";
        $this->EmbryoNo->HrefValue = "";
        $this->EmbryoNo->TooltipValue = "";

        // Stage
        $this->Stage->LinkCustomAttributes = "";
        $this->Stage->HrefValue = "";
        $this->Stage->TooltipValue = "";

        // FertilisationDate
        $this->FertilisationDate->LinkCustomAttributes = "";
        $this->FertilisationDate->HrefValue = "";
        $this->FertilisationDate->TooltipValue = "";

        // Day
        $this->Day->LinkCustomAttributes = "";
        $this->Day->HrefValue = "";
        $this->Day->TooltipValue = "";

        // Grade
        $this->Grade->LinkCustomAttributes = "";
        $this->Grade->HrefValue = "";
        $this->Grade->TooltipValue = "";

        // Incubator
        $this->Incubator->LinkCustomAttributes = "";
        $this->Incubator->HrefValue = "";
        $this->Incubator->TooltipValue = "";

        // Catheter
        $this->Catheter->LinkCustomAttributes = "";
        $this->Catheter->HrefValue = "";
        $this->Catheter->TooltipValue = "";

        // Difficulty
        $this->Difficulty->LinkCustomAttributes = "";
        $this->Difficulty->HrefValue = "";
        $this->Difficulty->TooltipValue = "";

        // Easy
        $this->Easy->LinkCustomAttributes = "";
        $this->Easy->HrefValue = "";
        $this->Easy->TooltipValue = "";

        // Comments
        $this->Comments->LinkCustomAttributes = "";
        $this->Comments->HrefValue = "";
        $this->Comments->TooltipValue = "";

        // Doctor
        $this->Doctor->LinkCustomAttributes = "";
        $this->Doctor->HrefValue = "";
        $this->Doctor->TooltipValue = "";

        // Embryologist
        $this->Embryologist->LinkCustomAttributes = "";
        $this->Embryologist->HrefValue = "";
        $this->Embryologist->TooltipValue = "";

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

        // RIDNo
        $this->RIDNo->EditAttrs["class"] = "form-control";
        $this->RIDNo->EditCustomAttributes = "";
        $this->RIDNo->EditValue = $this->RIDNo->CurrentValue;
        $this->RIDNo->EditValue = FormatNumber($this->RIDNo->EditValue, 0, -2, -2, -2);
        $this->RIDNo->ViewCustomAttributes = "";

        // PatientName
        $this->PatientName->EditAttrs["class"] = "form-control";
        $this->PatientName->EditCustomAttributes = "";
        $this->PatientName->EditValue = $this->PatientName->CurrentValue;
        $this->PatientName->ViewCustomAttributes = "";

        // TiDNo
        $this->TiDNo->EditAttrs["class"] = "form-control";
        $this->TiDNo->EditCustomAttributes = "";
        $this->TiDNo->EditValue = $this->TiDNo->CurrentValue;
        $this->TiDNo->EditValue = FormatNumber($this->TiDNo->EditValue, 0, -2, -2, -2);
        $this->TiDNo->ViewCustomAttributes = "";

        // id
        $this->id->EditAttrs["class"] = "form-control";
        $this->id->EditCustomAttributes = "";
        $this->id->EditValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // EmbryoNo
        $this->EmbryoNo->EditAttrs["class"] = "form-control";
        $this->EmbryoNo->EditCustomAttributes = "";
        $this->EmbryoNo->EditValue = $this->EmbryoNo->CurrentValue;
        $this->EmbryoNo->ViewCustomAttributes = "";

        // Stage
        $this->Stage->EditAttrs["class"] = "form-control";
        $this->Stage->EditCustomAttributes = "";
        $this->Stage->EditValue = $this->Stage->CurrentValue;
        $this->Stage->ViewCustomAttributes = "";

        // FertilisationDate
        $this->FertilisationDate->EditAttrs["class"] = "form-control";
        $this->FertilisationDate->EditCustomAttributes = "";
        $this->FertilisationDate->EditValue = $this->FertilisationDate->CurrentValue;
        $this->FertilisationDate->EditValue = FormatDateTime($this->FertilisationDate->EditValue, 0);
        $this->FertilisationDate->ViewCustomAttributes = "";

        // Day
        $this->Day->EditAttrs["class"] = "form-control";
        $this->Day->EditCustomAttributes = "";
        if (strval($this->Day->CurrentValue) != "") {
            $this->Day->EditValue = $this->Day->optionCaption($this->Day->CurrentValue);
        } else {
            $this->Day->EditValue = null;
        }
        $this->Day->ViewCustomAttributes = "";

        // Grade
        $this->Grade->EditAttrs["class"] = "form-control";
        $this->Grade->EditCustomAttributes = "";
        if (strval($this->Grade->CurrentValue) != "") {
            $this->Grade->EditValue = $this->Grade->optionCaption($this->Grade->CurrentValue);
        } else {
            $this->Grade->EditValue = null;
        }
        $this->Grade->ViewCustomAttributes = "";

        // Incubator
        $this->Incubator->EditAttrs["class"] = "form-control";
        $this->Incubator->EditCustomAttributes = "";
        $this->Incubator->EditValue = $this->Incubator->CurrentValue;
        $this->Incubator->ViewCustomAttributes = "";

        // Catheter
        $this->Catheter->EditAttrs["class"] = "form-control";
        $this->Catheter->EditCustomAttributes = "";
        if (!$this->Catheter->Raw) {
            $this->Catheter->CurrentValue = HtmlDecode($this->Catheter->CurrentValue);
        }
        $this->Catheter->EditValue = $this->Catheter->CurrentValue;
        $this->Catheter->PlaceHolder = RemoveHtml($this->Catheter->caption());

        // Difficulty
        $this->Difficulty->EditAttrs["class"] = "form-control";
        $this->Difficulty->EditCustomAttributes = "";
        $this->Difficulty->EditValue = $this->Difficulty->options(true);
        $this->Difficulty->PlaceHolder = RemoveHtml($this->Difficulty->caption());

        // Easy
        $this->Easy->EditCustomAttributes = "";
        $this->Easy->EditValue = $this->Easy->options(false);
        $this->Easy->PlaceHolder = RemoveHtml($this->Easy->caption());

        // Comments
        $this->Comments->EditAttrs["class"] = "form-control";
        $this->Comments->EditCustomAttributes = "";
        if (!$this->Comments->Raw) {
            $this->Comments->CurrentValue = HtmlDecode($this->Comments->CurrentValue);
        }
        $this->Comments->EditValue = $this->Comments->CurrentValue;
        $this->Comments->PlaceHolder = RemoveHtml($this->Comments->caption());

        // Doctor
        $this->Doctor->EditAttrs["class"] = "form-control";
        $this->Doctor->EditCustomAttributes = "";
        if (!$this->Doctor->Raw) {
            $this->Doctor->CurrentValue = HtmlDecode($this->Doctor->CurrentValue);
        }
        $this->Doctor->EditValue = $this->Doctor->CurrentValue;
        $this->Doctor->PlaceHolder = RemoveHtml($this->Doctor->caption());

        // Embryologist
        $this->Embryologist->EditAttrs["class"] = "form-control";
        $this->Embryologist->EditCustomAttributes = "";
        if (!$this->Embryologist->Raw) {
            $this->Embryologist->CurrentValue = HtmlDecode($this->Embryologist->CurrentValue);
        }
        $this->Embryologist->EditValue = $this->Embryologist->CurrentValue;
        $this->Embryologist->PlaceHolder = RemoveHtml($this->Embryologist->caption());

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
                    $doc->exportCaption($this->RIDNo);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->TiDNo);
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->EmbryoNo);
                    $doc->exportCaption($this->Stage);
                    $doc->exportCaption($this->FertilisationDate);
                    $doc->exportCaption($this->Day);
                    $doc->exportCaption($this->Grade);
                    $doc->exportCaption($this->Incubator);
                    $doc->exportCaption($this->Catheter);
                    $doc->exportCaption($this->Difficulty);
                    $doc->exportCaption($this->Easy);
                    $doc->exportCaption($this->Comments);
                    $doc->exportCaption($this->Doctor);
                    $doc->exportCaption($this->Embryologist);
                } else {
                    $doc->exportCaption($this->EmbryoNo);
                    $doc->exportCaption($this->Stage);
                    $doc->exportCaption($this->FertilisationDate);
                    $doc->exportCaption($this->Day);
                    $doc->exportCaption($this->Grade);
                    $doc->exportCaption($this->Incubator);
                    $doc->exportCaption($this->Catheter);
                    $doc->exportCaption($this->Difficulty);
                    $doc->exportCaption($this->Easy);
                    $doc->exportCaption($this->Comments);
                    $doc->exportCaption($this->Doctor);
                    $doc->exportCaption($this->Embryologist);
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
                        $doc->exportField($this->RIDNo);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->TiDNo);
                        $doc->exportField($this->id);
                        $doc->exportField($this->EmbryoNo);
                        $doc->exportField($this->Stage);
                        $doc->exportField($this->FertilisationDate);
                        $doc->exportField($this->Day);
                        $doc->exportField($this->Grade);
                        $doc->exportField($this->Incubator);
                        $doc->exportField($this->Catheter);
                        $doc->exportField($this->Difficulty);
                        $doc->exportField($this->Easy);
                        $doc->exportField($this->Comments);
                        $doc->exportField($this->Doctor);
                        $doc->exportField($this->Embryologist);
                    } else {
                        $doc->exportField($this->EmbryoNo);
                        $doc->exportField($this->Stage);
                        $doc->exportField($this->FertilisationDate);
                        $doc->exportField($this->Day);
                        $doc->exportField($this->Grade);
                        $doc->exportField($this->Incubator);
                        $doc->exportField($this->Catheter);
                        $doc->exportField($this->Difficulty);
                        $doc->exportField($this->Easy);
                        $doc->exportField($this->Comments);
                        $doc->exportField($this->Doctor);
                        $doc->exportField($this->Embryologist);
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
