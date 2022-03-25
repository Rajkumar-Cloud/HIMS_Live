<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for pres_trade_combination_names_new
 */
class PresTradeCombinationNamesNew extends DbTable
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
    public $ID;
    public $tradenames_id;
    public $Drug_Name;
    public $Generic_Name;
    public $Trade_Name;
    public $PR_CODE;
    public $Form;
    public $Strength;
    public $Unit;
    public $CONTAINER_TYPE;
    public $CONTAINER_STRENGTH;
    public $TypeOfDrug;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'pres_trade_combination_names_new';
        $this->TableName = 'pres_trade_combination_names_new';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`pres_trade_combination_names_new`";
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

        // ID
        $this->ID = new DbField('pres_trade_combination_names_new', 'pres_trade_combination_names_new', 'x_ID', 'ID', '`ID`', '`ID`', 3, 11, -1, false, '`ID`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->ID->IsAutoIncrement = true; // Autoincrement field
        $this->ID->IsPrimaryKey = true; // Primary key field
        $this->ID->Sortable = true; // Allow sort
        $this->ID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->ID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ID->Param, "CustomMsg");
        $this->Fields['ID'] = &$this->ID;

        // tradenames_id
        $this->tradenames_id = new DbField('pres_trade_combination_names_new', 'pres_trade_combination_names_new', 'x_tradenames_id', 'tradenames_id', '`tradenames_id`', '`tradenames_id`', 3, 11, -1, false, '`tradenames_id`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->tradenames_id->IsForeignKey = true; // Foreign key field
        $this->tradenames_id->Nullable = false; // NOT NULL field
        $this->tradenames_id->Required = true; // Required field
        $this->tradenames_id->Sortable = true; // Allow sort
        $this->tradenames_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->tradenames_id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->tradenames_id->Param, "CustomMsg");
        $this->Fields['tradenames_id'] = &$this->tradenames_id;

        // Drug_Name
        $this->Drug_Name = new DbField('pres_trade_combination_names_new', 'pres_trade_combination_names_new', 'x_Drug_Name', 'Drug_Name', '`Drug_Name`', '`Drug_Name`', 200, 100, -1, false, '`Drug_Name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Drug_Name->Nullable = false; // NOT NULL field
        $this->Drug_Name->Required = true; // Required field
        $this->Drug_Name->Sortable = true; // Allow sort
        $this->Drug_Name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Drug_Name->Param, "CustomMsg");
        $this->Fields['Drug_Name'] = &$this->Drug_Name;

        // Generic_Name
        $this->Generic_Name = new DbField('pres_trade_combination_names_new', 'pres_trade_combination_names_new', 'x_Generic_Name', 'Generic_Name', '`Generic_Name`', '`Generic_Name`', 200, 100, -1, false, '`Generic_Name`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Generic_Name->Nullable = false; // NOT NULL field
        $this->Generic_Name->Required = true; // Required field
        $this->Generic_Name->Sortable = true; // Allow sort
        $this->Generic_Name->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Generic_Name->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Generic_Name->Lookup = new Lookup('Generic_Name', 'pres_mas_generic', false, 'Generic', ["Generic","","",""], [], [], [], [], [], [], '', '');
        $this->Generic_Name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Generic_Name->Param, "CustomMsg");
        $this->Fields['Generic_Name'] = &$this->Generic_Name;

        // Trade_Name
        $this->Trade_Name = new DbField('pres_trade_combination_names_new', 'pres_trade_combination_names_new', 'x_Trade_Name', 'Trade_Name', '`Trade_Name`', '`Trade_Name`', 200, 100, -1, false, '`Trade_Name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Trade_Name->Nullable = false; // NOT NULL field
        $this->Trade_Name->Required = true; // Required field
        $this->Trade_Name->Sortable = true; // Allow sort
        $this->Trade_Name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Trade_Name->Param, "CustomMsg");
        $this->Fields['Trade_Name'] = &$this->Trade_Name;

        // PR_CODE
        $this->PR_CODE = new DbField('pres_trade_combination_names_new', 'pres_trade_combination_names_new', 'x_PR_CODE', 'PR_CODE', '`PR_CODE`', '`PR_CODE`', 200, 50, -1, false, '`PR_CODE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PR_CODE->Nullable = false; // NOT NULL field
        $this->PR_CODE->Required = true; // Required field
        $this->PR_CODE->Sortable = true; // Allow sort
        $this->PR_CODE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PR_CODE->Param, "CustomMsg");
        $this->Fields['PR_CODE'] = &$this->PR_CODE;

        // Form
        $this->Form = new DbField('pres_trade_combination_names_new', 'pres_trade_combination_names_new', 'x_Form', 'Form', '`Form`', '`Form`', 200, 50, -1, false, '`Form`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Form->Nullable = false; // NOT NULL field
        $this->Form->Required = true; // Required field
        $this->Form->Sortable = true; // Allow sort
        $this->Form->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Form->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Form->Lookup = new Lookup('Form', 'pres_mas_forms', false, 'Forms', ["Forms","","",""], [], [], [], [], [], [], '', '');
        $this->Form->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Form->Param, "CustomMsg");
        $this->Fields['Form'] = &$this->Form;

        // Strength
        $this->Strength = new DbField('pres_trade_combination_names_new', 'pres_trade_combination_names_new', 'x_Strength', 'Strength', '`Strength`', '`Strength`', 200, 50, -1, false, '`Strength`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Strength->Nullable = false; // NOT NULL field
        $this->Strength->Required = true; // Required field
        $this->Strength->Sortable = true; // Allow sort
        $this->Strength->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Strength->Param, "CustomMsg");
        $this->Fields['Strength'] = &$this->Strength;

        // Unit
        $this->Unit = new DbField('pres_trade_combination_names_new', 'pres_trade_combination_names_new', 'x_Unit', 'Unit', '`Unit`', '`Unit`', 200, 50, -1, false, '`Unit`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Unit->Nullable = false; // NOT NULL field
        $this->Unit->Required = true; // Required field
        $this->Unit->Sortable = true; // Allow sort
        $this->Unit->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Unit->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Unit->Lookup = new Lookup('Unit', 'pres_mas_unit', false, 'Units', ["Units","","",""], [], [], [], [], [], [], '', '');
        $this->Unit->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Unit->Param, "CustomMsg");
        $this->Fields['Unit'] = &$this->Unit;

        // CONTAINER_TYPE
        $this->CONTAINER_TYPE = new DbField('pres_trade_combination_names_new', 'pres_trade_combination_names_new', 'x_CONTAINER_TYPE', 'CONTAINER_TYPE', '`CONTAINER_TYPE`', '`CONTAINER_TYPE`', 200, 50, -1, false, '`CONTAINER_TYPE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CONTAINER_TYPE->Sortable = true; // Allow sort
        $this->CONTAINER_TYPE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CONTAINER_TYPE->Param, "CustomMsg");
        $this->Fields['CONTAINER_TYPE'] = &$this->CONTAINER_TYPE;

        // CONTAINER_STRENGTH
        $this->CONTAINER_STRENGTH = new DbField('pres_trade_combination_names_new', 'pres_trade_combination_names_new', 'x_CONTAINER_STRENGTH', 'CONTAINER_STRENGTH', '`CONTAINER_STRENGTH`', '`CONTAINER_STRENGTH`', 200, 50, -1, false, '`CONTAINER_STRENGTH`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CONTAINER_STRENGTH->Sortable = true; // Allow sort
        $this->CONTAINER_STRENGTH->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CONTAINER_STRENGTH->Param, "CustomMsg");
        $this->Fields['CONTAINER_STRENGTH'] = &$this->CONTAINER_STRENGTH;

        // TypeOfDrug
        $this->TypeOfDrug = new DbField('pres_trade_combination_names_new', 'pres_trade_combination_names_new', 'x_TypeOfDrug', 'TypeOfDrug', '`TypeOfDrug`', '`TypeOfDrug`', 200, 45, -1, false, '`TypeOfDrug`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->TypeOfDrug->Nullable = false; // NOT NULL field
        $this->TypeOfDrug->Required = true; // Required field
        $this->TypeOfDrug->Sortable = true; // Allow sort
        $this->TypeOfDrug->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->TypeOfDrug->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->TypeOfDrug->Lookup = new Lookup('TypeOfDrug', 'pres_trade_combination_names_new', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->TypeOfDrug->OptionCount = 2;
        $this->TypeOfDrug->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TypeOfDrug->Param, "CustomMsg");
        $this->Fields['TypeOfDrug'] = &$this->TypeOfDrug;
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
        if ($this->getCurrentMasterTable() == "pres_tradenames_new") {
            if ($this->tradenames_id->getSessionValue() != "") {
                $masterFilter .= "" . GetForeignKeySql("`ID`", $this->tradenames_id->getSessionValue(), DATATYPE_NUMBER, "DB");
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
        if ($this->getCurrentMasterTable() == "pres_tradenames_new") {
            if ($this->tradenames_id->getSessionValue() != "") {
                $detailFilter .= "" . GetForeignKeySql("`tradenames_id`", $this->tradenames_id->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
        }
        return $detailFilter;
    }

    // Master filter
    public function sqlMasterFilter_pres_tradenames_new()
    {
        return "`ID`=@ID@";
    }
    // Detail filter
    public function sqlDetailFilter_pres_tradenames_new()
    {
        return "`tradenames_id`=@tradenames_id@";
    }

    // Table level SQL
    public function getSqlFrom() // From
    {
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`pres_trade_combination_names_new`";
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
            $this->ID->setDbValue($conn->lastInsertId());
            $rs['ID'] = $this->ID->DbValue;
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
            if (array_key_exists('ID', $rs)) {
                AddFilter($where, QuotedName('ID', $this->Dbid) . '=' . QuotedValue($rs['ID'], $this->ID->DataType, $this->Dbid));
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
        $this->ID->DbValue = $row['ID'];
        $this->tradenames_id->DbValue = $row['tradenames_id'];
        $this->Drug_Name->DbValue = $row['Drug_Name'];
        $this->Generic_Name->DbValue = $row['Generic_Name'];
        $this->Trade_Name->DbValue = $row['Trade_Name'];
        $this->PR_CODE->DbValue = $row['PR_CODE'];
        $this->Form->DbValue = $row['Form'];
        $this->Strength->DbValue = $row['Strength'];
        $this->Unit->DbValue = $row['Unit'];
        $this->CONTAINER_TYPE->DbValue = $row['CONTAINER_TYPE'];
        $this->CONTAINER_STRENGTH->DbValue = $row['CONTAINER_STRENGTH'];
        $this->TypeOfDrug->DbValue = $row['TypeOfDrug'];
    }

    // Delete uploaded files
    public function deleteUploadedFiles($row)
    {
        $this->loadDbValues($row);
    }

    // Record filter WHERE clause
    protected function sqlKeyFilter()
    {
        return "`ID` = @ID@";
    }

    // Get Key
    public function getKey($current = false)
    {
        $keys = [];
        $val = $current ? $this->ID->CurrentValue : $this->ID->OldValue;
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
                $this->ID->CurrentValue = $keys[0];
            } else {
                $this->ID->OldValue = $keys[0];
            }
        }
    }

    // Get record filter
    public function getRecordFilter($row = null)
    {
        $keyFilter = $this->sqlKeyFilter();
        if (is_array($row)) {
            $val = array_key_exists('ID', $row) ? $row['ID'] : null;
        } else {
            $val = $this->ID->OldValue !== null ? $this->ID->OldValue : $this->ID->CurrentValue;
        }
        if (!is_numeric($val)) {
            return "0=1"; // Invalid key
        }
        if ($val === null) {
            return "0=1"; // Invalid key
        } else {
            $keyFilter = str_replace("@ID@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
        return $_SESSION[$name] ?? GetUrl("PresTradeCombinationNamesNewList");
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
        if ($pageName == "PresTradeCombinationNamesNewView") {
            return $Language->phrase("View");
        } elseif ($pageName == "PresTradeCombinationNamesNewEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "PresTradeCombinationNamesNewAdd") {
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
                return "PresTradeCombinationNamesNewView";
            case Config("API_ADD_ACTION"):
                return "PresTradeCombinationNamesNewAdd";
            case Config("API_EDIT_ACTION"):
                return "PresTradeCombinationNamesNewEdit";
            case Config("API_DELETE_ACTION"):
                return "PresTradeCombinationNamesNewDelete";
            case Config("API_LIST_ACTION"):
                return "PresTradeCombinationNamesNewList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "PresTradeCombinationNamesNewList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("PresTradeCombinationNamesNewView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("PresTradeCombinationNamesNewView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "PresTradeCombinationNamesNewAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "PresTradeCombinationNamesNewAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("PresTradeCombinationNamesNewEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("PresTradeCombinationNamesNewAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("PresTradeCombinationNamesNewDelete", $this->getUrlParm());
    }

    // Add master url
    public function addMasterUrl($url)
    {
        if ($this->getCurrentMasterTable() == "pres_tradenames_new" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
            $url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
            $url .= "&" . GetForeignKeyUrl("fk_ID", $this->tradenames_id->CurrentValue ?? $this->tradenames_id->getSessionValue());
        }
        return $url;
    }

    public function keyToJson($htmlEncode = false)
    {
        $json = "";
        $json .= "ID:" . JsonEncode($this->ID->CurrentValue, "number");
        $json = "{" . $json . "}";
        if ($htmlEncode) {
            $json = HtmlEncode($json);
        }
        return $json;
    }

    // Add key value to URL
    public function keyUrl($url, $parm = "")
    {
        if ($this->ID->CurrentValue !== null) {
            $url .= "/" . rawurlencode($this->ID->CurrentValue);
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
            if (($keyValue = Param("ID") ?? Route("ID")) !== null) {
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
                $this->ID->CurrentValue = $key;
            } else {
                $this->ID->OldValue = $key;
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
        $this->ID->setDbValue($row['ID']);
        $this->tradenames_id->setDbValue($row['tradenames_id']);
        $this->Drug_Name->setDbValue($row['Drug_Name']);
        $this->Generic_Name->setDbValue($row['Generic_Name']);
        $this->Trade_Name->setDbValue($row['Trade_Name']);
        $this->PR_CODE->setDbValue($row['PR_CODE']);
        $this->Form->setDbValue($row['Form']);
        $this->Strength->setDbValue($row['Strength']);
        $this->Unit->setDbValue($row['Unit']);
        $this->CONTAINER_TYPE->setDbValue($row['CONTAINER_TYPE']);
        $this->CONTAINER_STRENGTH->setDbValue($row['CONTAINER_STRENGTH']);
        $this->TypeOfDrug->setDbValue($row['TypeOfDrug']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // ID

        // tradenames_id

        // Drug_Name

        // Generic_Name

        // Trade_Name

        // PR_CODE

        // Form

        // Strength

        // Unit

        // CONTAINER_TYPE

        // CONTAINER_STRENGTH

        // TypeOfDrug

        // ID
        $this->ID->ViewValue = $this->ID->CurrentValue;
        $this->ID->ViewCustomAttributes = "";

        // tradenames_id
        $this->tradenames_id->ViewValue = $this->tradenames_id->CurrentValue;
        $this->tradenames_id->ViewValue = FormatNumber($this->tradenames_id->ViewValue, 0, -2, -2, -2);
        $this->tradenames_id->ViewCustomAttributes = "";

        // Drug_Name
        $this->Drug_Name->ViewValue = $this->Drug_Name->CurrentValue;
        $this->Drug_Name->ViewCustomAttributes = "";

        // Generic_Name
        $curVal = trim(strval($this->Generic_Name->CurrentValue));
        if ($curVal != "") {
            $this->Generic_Name->ViewValue = $this->Generic_Name->lookupCacheOption($curVal);
            if ($this->Generic_Name->ViewValue === null) { // Lookup from database
                $filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Generic_Name->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Generic_Name->Lookup->renderViewRow($rswrk[0]);
                    $this->Generic_Name->ViewValue = $this->Generic_Name->displayValue($arwrk);
                } else {
                    $this->Generic_Name->ViewValue = $this->Generic_Name->CurrentValue;
                }
            }
        } else {
            $this->Generic_Name->ViewValue = null;
        }
        $this->Generic_Name->ViewCustomAttributes = "";

        // Trade_Name
        $this->Trade_Name->ViewValue = $this->Trade_Name->CurrentValue;
        $this->Trade_Name->ViewCustomAttributes = "";

        // PR_CODE
        $this->PR_CODE->ViewValue = $this->PR_CODE->CurrentValue;
        $this->PR_CODE->ViewCustomAttributes = "";

        // Form
        $curVal = trim(strval($this->Form->CurrentValue));
        if ($curVal != "") {
            $this->Form->ViewValue = $this->Form->lookupCacheOption($curVal);
            if ($this->Form->ViewValue === null) { // Lookup from database
                $filterWrk = "`Forms`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Form->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Form->Lookup->renderViewRow($rswrk[0]);
                    $this->Form->ViewValue = $this->Form->displayValue($arwrk);
                } else {
                    $this->Form->ViewValue = $this->Form->CurrentValue;
                }
            }
        } else {
            $this->Form->ViewValue = null;
        }
        $this->Form->ViewCustomAttributes = "";

        // Strength
        $this->Strength->ViewValue = $this->Strength->CurrentValue;
        $this->Strength->ViewCustomAttributes = "";

        // Unit
        $curVal = trim(strval($this->Unit->CurrentValue));
        if ($curVal != "") {
            $this->Unit->ViewValue = $this->Unit->lookupCacheOption($curVal);
            if ($this->Unit->ViewValue === null) { // Lookup from database
                $filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Unit->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Unit->Lookup->renderViewRow($rswrk[0]);
                    $this->Unit->ViewValue = $this->Unit->displayValue($arwrk);
                } else {
                    $this->Unit->ViewValue = $this->Unit->CurrentValue;
                }
            }
        } else {
            $this->Unit->ViewValue = null;
        }
        $this->Unit->ViewCustomAttributes = "";

        // CONTAINER_TYPE
        $this->CONTAINER_TYPE->ViewValue = $this->CONTAINER_TYPE->CurrentValue;
        $this->CONTAINER_TYPE->ViewCustomAttributes = "";

        // CONTAINER_STRENGTH
        $this->CONTAINER_STRENGTH->ViewValue = $this->CONTAINER_STRENGTH->CurrentValue;
        $this->CONTAINER_STRENGTH->ViewCustomAttributes = "";

        // TypeOfDrug
        if (strval($this->TypeOfDrug->CurrentValue) != "") {
            $this->TypeOfDrug->ViewValue = $this->TypeOfDrug->optionCaption($this->TypeOfDrug->CurrentValue);
        } else {
            $this->TypeOfDrug->ViewValue = null;
        }
        $this->TypeOfDrug->ViewCustomAttributes = "";

        // ID
        $this->ID->LinkCustomAttributes = "";
        $this->ID->HrefValue = "";
        $this->ID->TooltipValue = "";

        // tradenames_id
        $this->tradenames_id->LinkCustomAttributes = "";
        $this->tradenames_id->HrefValue = "";
        $this->tradenames_id->TooltipValue = "";

        // Drug_Name
        $this->Drug_Name->LinkCustomAttributes = "";
        $this->Drug_Name->HrefValue = "";
        $this->Drug_Name->TooltipValue = "";

        // Generic_Name
        $this->Generic_Name->LinkCustomAttributes = "";
        $this->Generic_Name->HrefValue = "";
        $this->Generic_Name->TooltipValue = "";

        // Trade_Name
        $this->Trade_Name->LinkCustomAttributes = "";
        $this->Trade_Name->HrefValue = "";
        $this->Trade_Name->TooltipValue = "";

        // PR_CODE
        $this->PR_CODE->LinkCustomAttributes = "";
        $this->PR_CODE->HrefValue = "";
        $this->PR_CODE->TooltipValue = "";

        // Form
        $this->Form->LinkCustomAttributes = "";
        $this->Form->HrefValue = "";
        $this->Form->TooltipValue = "";

        // Strength
        $this->Strength->LinkCustomAttributes = "";
        $this->Strength->HrefValue = "";
        $this->Strength->TooltipValue = "";

        // Unit
        $this->Unit->LinkCustomAttributes = "";
        $this->Unit->HrefValue = "";
        $this->Unit->TooltipValue = "";

        // CONTAINER_TYPE
        $this->CONTAINER_TYPE->LinkCustomAttributes = "";
        $this->CONTAINER_TYPE->HrefValue = "";
        $this->CONTAINER_TYPE->TooltipValue = "";

        // CONTAINER_STRENGTH
        $this->CONTAINER_STRENGTH->LinkCustomAttributes = "";
        $this->CONTAINER_STRENGTH->HrefValue = "";
        $this->CONTAINER_STRENGTH->TooltipValue = "";

        // TypeOfDrug
        $this->TypeOfDrug->LinkCustomAttributes = "";
        $this->TypeOfDrug->HrefValue = "";
        $this->TypeOfDrug->TooltipValue = "";

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

        // ID
        $this->ID->EditAttrs["class"] = "form-control";
        $this->ID->EditCustomAttributes = "";
        $this->ID->EditValue = $this->ID->CurrentValue;
        $this->ID->ViewCustomAttributes = "";

        // tradenames_id
        $this->tradenames_id->EditAttrs["class"] = "form-control";
        $this->tradenames_id->EditCustomAttributes = "";
        if ($this->tradenames_id->getSessionValue() != "") {
            $this->tradenames_id->CurrentValue = GetForeignKeyValue($this->tradenames_id->getSessionValue());
            $this->tradenames_id->ViewValue = $this->tradenames_id->CurrentValue;
            $this->tradenames_id->ViewValue = FormatNumber($this->tradenames_id->ViewValue, 0, -2, -2, -2);
            $this->tradenames_id->ViewCustomAttributes = "";
        } else {
            $this->tradenames_id->EditValue = $this->tradenames_id->CurrentValue;
            $this->tradenames_id->PlaceHolder = RemoveHtml($this->tradenames_id->caption());
        }

        // Drug_Name
        $this->Drug_Name->EditAttrs["class"] = "form-control";
        $this->Drug_Name->EditCustomAttributes = "";
        if (!$this->Drug_Name->Raw) {
            $this->Drug_Name->CurrentValue = HtmlDecode($this->Drug_Name->CurrentValue);
        }
        $this->Drug_Name->EditValue = $this->Drug_Name->CurrentValue;
        $this->Drug_Name->PlaceHolder = RemoveHtml($this->Drug_Name->caption());

        // Generic_Name
        $this->Generic_Name->EditAttrs["class"] = "form-control";
        $this->Generic_Name->EditCustomAttributes = "";
        $this->Generic_Name->PlaceHolder = RemoveHtml($this->Generic_Name->caption());

        // Trade_Name
        $this->Trade_Name->EditAttrs["class"] = "form-control";
        $this->Trade_Name->EditCustomAttributes = "";
        if (!$this->Trade_Name->Raw) {
            $this->Trade_Name->CurrentValue = HtmlDecode($this->Trade_Name->CurrentValue);
        }
        $this->Trade_Name->EditValue = $this->Trade_Name->CurrentValue;
        $this->Trade_Name->PlaceHolder = RemoveHtml($this->Trade_Name->caption());

        // PR_CODE
        $this->PR_CODE->EditAttrs["class"] = "form-control";
        $this->PR_CODE->EditCustomAttributes = "";
        if (!$this->PR_CODE->Raw) {
            $this->PR_CODE->CurrentValue = HtmlDecode($this->PR_CODE->CurrentValue);
        }
        $this->PR_CODE->EditValue = $this->PR_CODE->CurrentValue;
        $this->PR_CODE->PlaceHolder = RemoveHtml($this->PR_CODE->caption());

        // Form
        $this->Form->EditAttrs["class"] = "form-control";
        $this->Form->EditCustomAttributes = "";
        $this->Form->PlaceHolder = RemoveHtml($this->Form->caption());

        // Strength
        $this->Strength->EditAttrs["class"] = "form-control";
        $this->Strength->EditCustomAttributes = "";
        if (!$this->Strength->Raw) {
            $this->Strength->CurrentValue = HtmlDecode($this->Strength->CurrentValue);
        }
        $this->Strength->EditValue = $this->Strength->CurrentValue;
        $this->Strength->PlaceHolder = RemoveHtml($this->Strength->caption());

        // Unit
        $this->Unit->EditAttrs["class"] = "form-control";
        $this->Unit->EditCustomAttributes = "";
        $this->Unit->PlaceHolder = RemoveHtml($this->Unit->caption());

        // CONTAINER_TYPE
        $this->CONTAINER_TYPE->EditAttrs["class"] = "form-control";
        $this->CONTAINER_TYPE->EditCustomAttributes = "";
        if (!$this->CONTAINER_TYPE->Raw) {
            $this->CONTAINER_TYPE->CurrentValue = HtmlDecode($this->CONTAINER_TYPE->CurrentValue);
        }
        $this->CONTAINER_TYPE->EditValue = $this->CONTAINER_TYPE->CurrentValue;
        $this->CONTAINER_TYPE->PlaceHolder = RemoveHtml($this->CONTAINER_TYPE->caption());

        // CONTAINER_STRENGTH
        $this->CONTAINER_STRENGTH->EditAttrs["class"] = "form-control";
        $this->CONTAINER_STRENGTH->EditCustomAttributes = "";
        if (!$this->CONTAINER_STRENGTH->Raw) {
            $this->CONTAINER_STRENGTH->CurrentValue = HtmlDecode($this->CONTAINER_STRENGTH->CurrentValue);
        }
        $this->CONTAINER_STRENGTH->EditValue = $this->CONTAINER_STRENGTH->CurrentValue;
        $this->CONTAINER_STRENGTH->PlaceHolder = RemoveHtml($this->CONTAINER_STRENGTH->caption());

        // TypeOfDrug
        $this->TypeOfDrug->EditAttrs["class"] = "form-control";
        $this->TypeOfDrug->EditCustomAttributes = "";
        $this->TypeOfDrug->EditValue = $this->TypeOfDrug->options(true);
        $this->TypeOfDrug->PlaceHolder = RemoveHtml($this->TypeOfDrug->caption());

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
                    $doc->exportCaption($this->ID);
                    $doc->exportCaption($this->tradenames_id);
                    $doc->exportCaption($this->Drug_Name);
                    $doc->exportCaption($this->Generic_Name);
                    $doc->exportCaption($this->Trade_Name);
                    $doc->exportCaption($this->PR_CODE);
                    $doc->exportCaption($this->Form);
                    $doc->exportCaption($this->Strength);
                    $doc->exportCaption($this->Unit);
                    $doc->exportCaption($this->CONTAINER_TYPE);
                    $doc->exportCaption($this->CONTAINER_STRENGTH);
                    $doc->exportCaption($this->TypeOfDrug);
                } else {
                    $doc->exportCaption($this->ID);
                    $doc->exportCaption($this->tradenames_id);
                    $doc->exportCaption($this->Drug_Name);
                    $doc->exportCaption($this->Generic_Name);
                    $doc->exportCaption($this->Trade_Name);
                    $doc->exportCaption($this->PR_CODE);
                    $doc->exportCaption($this->Form);
                    $doc->exportCaption($this->Strength);
                    $doc->exportCaption($this->Unit);
                    $doc->exportCaption($this->CONTAINER_TYPE);
                    $doc->exportCaption($this->CONTAINER_STRENGTH);
                    $doc->exportCaption($this->TypeOfDrug);
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
                        $doc->exportField($this->ID);
                        $doc->exportField($this->tradenames_id);
                        $doc->exportField($this->Drug_Name);
                        $doc->exportField($this->Generic_Name);
                        $doc->exportField($this->Trade_Name);
                        $doc->exportField($this->PR_CODE);
                        $doc->exportField($this->Form);
                        $doc->exportField($this->Strength);
                        $doc->exportField($this->Unit);
                        $doc->exportField($this->CONTAINER_TYPE);
                        $doc->exportField($this->CONTAINER_STRENGTH);
                        $doc->exportField($this->TypeOfDrug);
                    } else {
                        $doc->exportField($this->ID);
                        $doc->exportField($this->tradenames_id);
                        $doc->exportField($this->Drug_Name);
                        $doc->exportField($this->Generic_Name);
                        $doc->exportField($this->Trade_Name);
                        $doc->exportField($this->PR_CODE);
                        $doc->exportField($this->Form);
                        $doc->exportField($this->Strength);
                        $doc->exportField($this->Unit);
                        $doc->exportField($this->CONTAINER_TYPE);
                        $doc->exportField($this->CONTAINER_STRENGTH);
                        $doc->exportField($this->TypeOfDrug);
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
