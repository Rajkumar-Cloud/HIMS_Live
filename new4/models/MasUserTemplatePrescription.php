<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for mas_user_template_prescription
 */
class MasUserTemplatePrescription extends DbTable
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
    public $TemplateName;
    public $Medicine;
    public $M;
    public $A;
    public $N;
    public $NoOfDays;
    public $PreRoute;
    public $TimeOfTaking;
    public $Type;
    public $Status;
    public $CreatedBy;
    public $CreateDateTime;
    public $ModifiedBy;
    public $ModifiedDateTime;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'mas_user_template_prescription';
        $this->TableName = 'mas_user_template_prescription';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`mas_user_template_prescription`";
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
        $this->id = new DbField('mas_user_template_prescription', 'mas_user_template_prescription', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // TemplateName
        $this->TemplateName = new DbField('mas_user_template_prescription', 'mas_user_template_prescription', 'x_TemplateName', 'TemplateName', '`TemplateName`', '`TemplateName`', 200, 45, -1, false, '`TemplateName`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->TemplateName->Nullable = false; // NOT NULL field
        $this->TemplateName->Required = true; // Required field
        $this->TemplateName->Sortable = true; // Allow sort
        $this->TemplateName->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->TemplateName->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->TemplateName->Lookup = new Lookup('TemplateName', 'mas_template_prescription_type', false, 'TemplateName', ["TemplateName","","",""], [], [], [], [], [], [], '', '');
        $this->TemplateName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TemplateName->Param, "CustomMsg");
        $this->Fields['TemplateName'] = &$this->TemplateName;

        // Medicine
        $this->Medicine = new DbField('mas_user_template_prescription', 'mas_user_template_prescription', 'x_Medicine', 'Medicine', '`Medicine`', '`Medicine`', 200, 100, -1, false, '`Medicine`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Medicine->Nullable = false; // NOT NULL field
        $this->Medicine->Required = true; // Required field
        $this->Medicine->Sortable = true; // Allow sort
        $this->Medicine->Lookup = new Lookup('Medicine', 'pres_tradenames_new', false, 'Trade_Name', ["Trade_Name","","",""], [], [], [], [], [], [], '', '');
        $this->Medicine->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Medicine->Param, "CustomMsg");
        $this->Fields['Medicine'] = &$this->Medicine;

        // M
        $this->M = new DbField('mas_user_template_prescription', 'mas_user_template_prescription', 'x_M', 'M', '`M`', '`M`', 200, 45, -1, false, '`M`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->M->Nullable = false; // NOT NULL field
        $this->M->Required = true; // Required field
        $this->M->Sortable = true; // Allow sort
        $this->M->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->M->Param, "CustomMsg");
        $this->Fields['M'] = &$this->M;

        // A
        $this->A = new DbField('mas_user_template_prescription', 'mas_user_template_prescription', 'x_A', 'A', '`A`', '`A`', 200, 45, -1, false, '`A`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->A->Nullable = false; // NOT NULL field
        $this->A->Required = true; // Required field
        $this->A->Sortable = true; // Allow sort
        $this->A->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->A->Param, "CustomMsg");
        $this->Fields['A'] = &$this->A;

        // N
        $this->N = new DbField('mas_user_template_prescription', 'mas_user_template_prescription', 'x_N', 'N', '`N`', '`N`', 200, 45, -1, false, '`N`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->N->Nullable = false; // NOT NULL field
        $this->N->Required = true; // Required field
        $this->N->Sortable = true; // Allow sort
        $this->N->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->N->Param, "CustomMsg");
        $this->Fields['N'] = &$this->N;

        // NoOfDays
        $this->NoOfDays = new DbField('mas_user_template_prescription', 'mas_user_template_prescription', 'x_NoOfDays', 'NoOfDays', '`NoOfDays`', '`NoOfDays`', 200, 45, -1, false, '`NoOfDays`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NoOfDays->Nullable = false; // NOT NULL field
        $this->NoOfDays->Required = true; // Required field
        $this->NoOfDays->Sortable = true; // Allow sort
        $this->NoOfDays->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->NoOfDays->Param, "CustomMsg");
        $this->Fields['NoOfDays'] = &$this->NoOfDays;

        // PreRoute
        $this->PreRoute = new DbField('mas_user_template_prescription', 'mas_user_template_prescription', 'x_PreRoute', 'PreRoute', '`PreRoute`', '`PreRoute`', 200, 45, -1, false, '`EV__PreRoute`', true, false, true, 'FORMATTED TEXT', 'TEXT');
        $this->PreRoute->Nullable = false; // NOT NULL field
        $this->PreRoute->Required = true; // Required field
        $this->PreRoute->Sortable = true; // Allow sort
        $this->PreRoute->Lookup = new Lookup('PreRoute', 'pres_mas_route', false, 'Route', ["Route","","",""], [], [], [], [], [], [], '', '');
        $this->PreRoute->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PreRoute->Param, "CustomMsg");
        $this->Fields['PreRoute'] = &$this->PreRoute;

        // TimeOfTaking
        $this->TimeOfTaking = new DbField('mas_user_template_prescription', 'mas_user_template_prescription', 'x_TimeOfTaking', 'TimeOfTaking', '`TimeOfTaking`', '`TimeOfTaking`', 200, 45, -1, false, '`EV__TimeOfTaking`', true, false, true, 'FORMATTED TEXT', 'TEXT');
        $this->TimeOfTaking->Nullable = false; // NOT NULL field
        $this->TimeOfTaking->Required = true; // Required field
        $this->TimeOfTaking->Sortable = true; // Allow sort
        $this->TimeOfTaking->Lookup = new Lookup('TimeOfTaking', 'pres_mas_timeoftaking', false, 'Time Of Taking', ["Time Of Taking","","",""], [], [], [], [], [], [], '', '');
        $this->TimeOfTaking->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TimeOfTaking->Param, "CustomMsg");
        $this->Fields['TimeOfTaking'] = &$this->TimeOfTaking;

        // Type
        $this->Type = new DbField('mas_user_template_prescription', 'mas_user_template_prescription', 'x_Type', 'Type', '`Type`', '`Type`', 200, 45, -1, false, '`Type`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Type->Nullable = false; // NOT NULL field
        $this->Type->Required = true; // Required field
        $this->Type->Sortable = false; // Allow sort
        $this->Type->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Type->Param, "CustomMsg");
        $this->Fields['Type'] = &$this->Type;

        // Status
        $this->Status = new DbField('mas_user_template_prescription', 'mas_user_template_prescription', 'x_Status', 'Status', '`Status`', '`Status`', 200, 45, -1, false, '`Status`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Status->Nullable = false; // NOT NULL field
        $this->Status->Required = true; // Required field
        $this->Status->Sortable = false; // Allow sort
        $this->Status->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Status->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Status->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Status->Param, "CustomMsg");
        $this->Fields['Status'] = &$this->Status;

        // CreatedBy
        $this->CreatedBy = new DbField('mas_user_template_prescription', 'mas_user_template_prescription', 'x_CreatedBy', 'CreatedBy', '`CreatedBy`', '`CreatedBy`', 200, 45, -1, false, '`CreatedBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CreatedBy->Sortable = true; // Allow sort
        $this->CreatedBy->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CreatedBy->Param, "CustomMsg");
        $this->Fields['CreatedBy'] = &$this->CreatedBy;

        // CreateDateTime
        $this->CreateDateTime = new DbField('mas_user_template_prescription', 'mas_user_template_prescription', 'x_CreateDateTime', 'CreateDateTime', '`CreateDateTime`', '`CreateDateTime`', 200, 45, -1, false, '`CreateDateTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CreateDateTime->Sortable = true; // Allow sort
        $this->CreateDateTime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CreateDateTime->Param, "CustomMsg");
        $this->Fields['CreateDateTime'] = &$this->CreateDateTime;

        // ModifiedBy
        $this->ModifiedBy = new DbField('mas_user_template_prescription', 'mas_user_template_prescription', 'x_ModifiedBy', 'ModifiedBy', '`ModifiedBy`', '`ModifiedBy`', 200, 45, -1, false, '`ModifiedBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ModifiedBy->Sortable = true; // Allow sort
        $this->ModifiedBy->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ModifiedBy->Param, "CustomMsg");
        $this->Fields['ModifiedBy'] = &$this->ModifiedBy;

        // ModifiedDateTime
        $this->ModifiedDateTime = new DbField('mas_user_template_prescription', 'mas_user_template_prescription', 'x_ModifiedDateTime', 'ModifiedDateTime', '`ModifiedDateTime`', '`ModifiedDateTime`', 200, 45, -1, false, '`ModifiedDateTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ModifiedDateTime->Sortable = true; // Allow sort
        $this->ModifiedDateTime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ModifiedDateTime->Param, "CustomMsg");
        $this->Fields['ModifiedDateTime'] = &$this->ModifiedDateTime;
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
            $sortFieldList = ($fld->VirtualExpression != "") ? $fld->VirtualExpression : $sortField;
            $orderBy = in_array($curSort, ["ASC", "DESC"]) ? $sortFieldList . " " . $curSort : "";
            $this->setSessionOrderByList($orderBy); // Save to Session
        } else {
            $fld->setSort("");
        }
    }

    // Session ORDER BY for List page
    public function getSessionOrderByList()
    {
        return Session(PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_ORDER_BY_LIST"));
    }

    public function setSessionOrderByList($v)
    {
        $_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_ORDER_BY_LIST")] = $v;
    }

    // Table level SQL
    public function getSqlFrom() // From
    {
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`mas_user_template_prescription`";
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

    public function getSqlSelectList() // Select for List page
    {
        if ($this->SqlSelectList) {
            return $this->SqlSelectList;
        }
        $from = "(SELECT *, (SELECT `Route` FROM `pres_mas_route` `TMP_LOOKUPTABLE` WHERE `TMP_LOOKUPTABLE`.`Route` = `mas_user_template_prescription`.`PreRoute` LIMIT 1) AS `EV__PreRoute`, (SELECT `Time Of Taking` FROM `pres_mas_timeoftaking` `TMP_LOOKUPTABLE` WHERE `TMP_LOOKUPTABLE`.`Time Of Taking` = `mas_user_template_prescription`.`TimeOfTaking` LIMIT 1) AS `EV__TimeOfTaking` FROM `mas_user_template_prescription`)";
        return $from . " `TMP_TABLE`";
    }

    public function sqlSelectList() // For backward compatibility
    {
        return $this->getSqlSelectList();
    }

    public function setSqlSelectList($v)
    {
        $this->SqlSelectList = $v;
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
        if ($this->useVirtualFields()) {
            $select = "*";
            $from = $this->getSqlSelectList();
            $sort = $this->UseSessionForListSql ? $this->getSessionOrderByList() : "";
        } else {
            $select = $this->getSqlSelect();
            $from = $this->getSqlFrom();
            $sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
        }
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
        $sort = ($this->useVirtualFields()) ? $this->getSessionOrderByList() : $this->getSessionOrderBy();
        if ($orderBy != "" && $sort != "") {
            $orderBy .= ", " . $sort;
        } elseif ($sort != "") {
            $orderBy = $sort;
        }
        return $orderBy;
    }

    // Check if virtual fields is used in SQL
    protected function useVirtualFields()
    {
        $where = $this->UseSessionForListSql ? $this->getSessionWhere() : $this->CurrentFilter;
        $orderBy = $this->UseSessionForListSql ? $this->getSessionOrderByList() : "";
        if ($where != "") {
            $where = " " . str_replace(["(", ")"], ["", ""], $where) . " ";
        }
        if ($orderBy != "") {
            $orderBy = " " . str_replace(["(", ")"], ["", ""], $orderBy) . " ";
        }
        if ($this->BasicSearch->getKeyword() != "") {
            return true;
        }
        if (
            $this->PreRoute->AdvancedSearch->SearchValue != "" ||
            $this->PreRoute->AdvancedSearch->SearchValue2 != "" ||
            ContainsString($where, " " . $this->PreRoute->VirtualExpression . " ")
        ) {
            return true;
        }
        if (ContainsString($orderBy, " " . $this->PreRoute->VirtualExpression . " ")) {
            return true;
        }
        if (
            $this->TimeOfTaking->AdvancedSearch->SearchValue != "" ||
            $this->TimeOfTaking->AdvancedSearch->SearchValue2 != "" ||
            ContainsString($where, " " . $this->TimeOfTaking->VirtualExpression . " ")
        ) {
            return true;
        }
        if (ContainsString($orderBy, " " . $this->TimeOfTaking->VirtualExpression . " ")) {
            return true;
        }
        return false;
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
        if ($this->useVirtualFields()) {
            $sql = $this->buildSelectSql("*", $this->getSqlSelectList(), $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
        } else {
            $sql = $this->buildSelectSql($select, $this->getSqlFrom(), $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
        }
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
        $this->TemplateName->DbValue = $row['TemplateName'];
        $this->Medicine->DbValue = $row['Medicine'];
        $this->M->DbValue = $row['M'];
        $this->A->DbValue = $row['A'];
        $this->N->DbValue = $row['N'];
        $this->NoOfDays->DbValue = $row['NoOfDays'];
        $this->PreRoute->DbValue = $row['PreRoute'];
        $this->TimeOfTaking->DbValue = $row['TimeOfTaking'];
        $this->Type->DbValue = $row['Type'];
        $this->Status->DbValue = $row['Status'];
        $this->CreatedBy->DbValue = $row['CreatedBy'];
        $this->CreateDateTime->DbValue = $row['CreateDateTime'];
        $this->ModifiedBy->DbValue = $row['ModifiedBy'];
        $this->ModifiedDateTime->DbValue = $row['ModifiedDateTime'];
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
        return $_SESSION[$name] ?? GetUrl("MasUserTemplatePrescriptionList");
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
        if ($pageName == "MasUserTemplatePrescriptionView") {
            return $Language->phrase("View");
        } elseif ($pageName == "MasUserTemplatePrescriptionEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "MasUserTemplatePrescriptionAdd") {
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
                return "MasUserTemplatePrescriptionView";
            case Config("API_ADD_ACTION"):
                return "MasUserTemplatePrescriptionAdd";
            case Config("API_EDIT_ACTION"):
                return "MasUserTemplatePrescriptionEdit";
            case Config("API_DELETE_ACTION"):
                return "MasUserTemplatePrescriptionDelete";
            case Config("API_LIST_ACTION"):
                return "MasUserTemplatePrescriptionList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "MasUserTemplatePrescriptionList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("MasUserTemplatePrescriptionView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("MasUserTemplatePrescriptionView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "MasUserTemplatePrescriptionAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "MasUserTemplatePrescriptionAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("MasUserTemplatePrescriptionEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("MasUserTemplatePrescriptionAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("MasUserTemplatePrescriptionDelete", $this->getUrlParm());
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
        $this->TemplateName->setDbValue($row['TemplateName']);
        $this->Medicine->setDbValue($row['Medicine']);
        $this->M->setDbValue($row['M']);
        $this->A->setDbValue($row['A']);
        $this->N->setDbValue($row['N']);
        $this->NoOfDays->setDbValue($row['NoOfDays']);
        $this->PreRoute->setDbValue($row['PreRoute']);
        $this->TimeOfTaking->setDbValue($row['TimeOfTaking']);
        $this->Type->setDbValue($row['Type']);
        $this->Status->setDbValue($row['Status']);
        $this->CreatedBy->setDbValue($row['CreatedBy']);
        $this->CreateDateTime->setDbValue($row['CreateDateTime']);
        $this->ModifiedBy->setDbValue($row['ModifiedBy']);
        $this->ModifiedDateTime->setDbValue($row['ModifiedDateTime']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // TemplateName

        // Medicine

        // M

        // A

        // N

        // NoOfDays

        // PreRoute

        // TimeOfTaking

        // Type
        $this->Type->CellCssStyle = "white-space: nowrap;";

        // Status
        $this->Status->CellCssStyle = "white-space: nowrap;";

        // CreatedBy

        // CreateDateTime

        // ModifiedBy

        // ModifiedDateTime

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // TemplateName
        $curVal = trim(strval($this->TemplateName->CurrentValue));
        if ($curVal != "") {
            $this->TemplateName->ViewValue = $this->TemplateName->lookupCacheOption($curVal);
            if ($this->TemplateName->ViewValue === null) { // Lookup from database
                $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->TemplateName->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->TemplateName->Lookup->renderViewRow($rswrk[0]);
                    $this->TemplateName->ViewValue = $this->TemplateName->displayValue($arwrk);
                } else {
                    $this->TemplateName->ViewValue = $this->TemplateName->CurrentValue;
                }
            }
        } else {
            $this->TemplateName->ViewValue = null;
        }
        $this->TemplateName->ViewCustomAttributes = "";

        // Medicine
        $this->Medicine->ViewValue = $this->Medicine->CurrentValue;
        $curVal = trim(strval($this->Medicine->CurrentValue));
        if ($curVal != "") {
            $this->Medicine->ViewValue = $this->Medicine->lookupCacheOption($curVal);
            if ($this->Medicine->ViewValue === null) { // Lookup from database
                $filterWrk = "`Trade_Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Medicine->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Medicine->Lookup->renderViewRow($rswrk[0]);
                    $this->Medicine->ViewValue = $this->Medicine->displayValue($arwrk);
                } else {
                    $this->Medicine->ViewValue = $this->Medicine->CurrentValue;
                }
            }
        } else {
            $this->Medicine->ViewValue = null;
        }
        $this->Medicine->ViewCustomAttributes = "";

        // M
        $this->M->ViewValue = $this->M->CurrentValue;
        $this->M->ViewCustomAttributes = "";

        // A
        $this->A->ViewValue = $this->A->CurrentValue;
        $this->A->ViewCustomAttributes = "";

        // N
        $this->N->ViewValue = $this->N->CurrentValue;
        $this->N->ViewCustomAttributes = "";

        // NoOfDays
        $this->NoOfDays->ViewValue = $this->NoOfDays->CurrentValue;
        $this->NoOfDays->ViewCustomAttributes = "";

        // PreRoute
        if ($this->PreRoute->VirtualValue != "") {
            $this->PreRoute->ViewValue = $this->PreRoute->VirtualValue;
        } else {
            $this->PreRoute->ViewValue = $this->PreRoute->CurrentValue;
            $curVal = trim(strval($this->PreRoute->CurrentValue));
            if ($curVal != "") {
                $this->PreRoute->ViewValue = $this->PreRoute->lookupCacheOption($curVal);
                if ($this->PreRoute->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Route`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->PreRoute->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->PreRoute->Lookup->renderViewRow($rswrk[0]);
                        $this->PreRoute->ViewValue = $this->PreRoute->displayValue($arwrk);
                    } else {
                        $this->PreRoute->ViewValue = $this->PreRoute->CurrentValue;
                    }
                }
            } else {
                $this->PreRoute->ViewValue = null;
            }
        }
        $this->PreRoute->ViewCustomAttributes = "";

        // TimeOfTaking
        if ($this->TimeOfTaking->VirtualValue != "") {
            $this->TimeOfTaking->ViewValue = $this->TimeOfTaking->VirtualValue;
        } else {
            $this->TimeOfTaking->ViewValue = $this->TimeOfTaking->CurrentValue;
            $curVal = trim(strval($this->TimeOfTaking->CurrentValue));
            if ($curVal != "") {
                $this->TimeOfTaking->ViewValue = $this->TimeOfTaking->lookupCacheOption($curVal);
                if ($this->TimeOfTaking->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Time Of Taking`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->TimeOfTaking->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TimeOfTaking->Lookup->renderViewRow($rswrk[0]);
                        $this->TimeOfTaking->ViewValue = $this->TimeOfTaking->displayValue($arwrk);
                    } else {
                        $this->TimeOfTaking->ViewValue = $this->TimeOfTaking->CurrentValue;
                    }
                }
            } else {
                $this->TimeOfTaking->ViewValue = null;
            }
        }
        $this->TimeOfTaking->ViewCustomAttributes = "";

        // Type
        $this->Type->ViewValue = $this->Type->CurrentValue;
        $this->Type->ViewCustomAttributes = "";

        // Status
        $this->Status->ViewCustomAttributes = "";

        // CreatedBy
        $this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
        $this->CreatedBy->ViewCustomAttributes = "";

        // CreateDateTime
        $this->CreateDateTime->ViewValue = $this->CreateDateTime->CurrentValue;
        $this->CreateDateTime->ViewCustomAttributes = "";

        // ModifiedBy
        $this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
        $this->ModifiedBy->ViewCustomAttributes = "";

        // ModifiedDateTime
        $this->ModifiedDateTime->ViewValue = $this->ModifiedDateTime->CurrentValue;
        $this->ModifiedDateTime->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // TemplateName
        $this->TemplateName->LinkCustomAttributes = "";
        $this->TemplateName->HrefValue = "";
        $this->TemplateName->TooltipValue = "";

        // Medicine
        $this->Medicine->LinkCustomAttributes = "";
        $this->Medicine->HrefValue = "";
        $this->Medicine->TooltipValue = "";

        // M
        $this->M->LinkCustomAttributes = "";
        $this->M->HrefValue = "";
        $this->M->TooltipValue = "";

        // A
        $this->A->LinkCustomAttributes = "";
        $this->A->HrefValue = "";
        $this->A->TooltipValue = "";

        // N
        $this->N->LinkCustomAttributes = "";
        $this->N->HrefValue = "";
        $this->N->TooltipValue = "";

        // NoOfDays
        $this->NoOfDays->LinkCustomAttributes = "";
        $this->NoOfDays->HrefValue = "";
        $this->NoOfDays->TooltipValue = "";

        // PreRoute
        $this->PreRoute->LinkCustomAttributes = "";
        $this->PreRoute->HrefValue = "";
        $this->PreRoute->TooltipValue = "";

        // TimeOfTaking
        $this->TimeOfTaking->LinkCustomAttributes = "";
        $this->TimeOfTaking->HrefValue = "";
        $this->TimeOfTaking->TooltipValue = "";

        // Type
        $this->Type->LinkCustomAttributes = "";
        $this->Type->HrefValue = "";
        $this->Type->TooltipValue = "";

        // Status
        $this->Status->LinkCustomAttributes = "";
        $this->Status->HrefValue = "";
        $this->Status->TooltipValue = "";

        // CreatedBy
        $this->CreatedBy->LinkCustomAttributes = "";
        $this->CreatedBy->HrefValue = "";
        $this->CreatedBy->TooltipValue = "";

        // CreateDateTime
        $this->CreateDateTime->LinkCustomAttributes = "";
        $this->CreateDateTime->HrefValue = "";
        $this->CreateDateTime->TooltipValue = "";

        // ModifiedBy
        $this->ModifiedBy->LinkCustomAttributes = "";
        $this->ModifiedBy->HrefValue = "";
        $this->ModifiedBy->TooltipValue = "";

        // ModifiedDateTime
        $this->ModifiedDateTime->LinkCustomAttributes = "";
        $this->ModifiedDateTime->HrefValue = "";
        $this->ModifiedDateTime->TooltipValue = "";

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

        // TemplateName
        $this->TemplateName->EditAttrs["class"] = "form-control";
        $this->TemplateName->EditCustomAttributes = "";
        $this->TemplateName->PlaceHolder = RemoveHtml($this->TemplateName->caption());

        // Medicine
        $this->Medicine->EditAttrs["class"] = "form-control";
        $this->Medicine->EditCustomAttributes = "";
        if (!$this->Medicine->Raw) {
            $this->Medicine->CurrentValue = HtmlDecode($this->Medicine->CurrentValue);
        }
        $this->Medicine->EditValue = $this->Medicine->CurrentValue;
        $this->Medicine->PlaceHolder = RemoveHtml($this->Medicine->caption());

        // M
        $this->M->EditAttrs["class"] = "form-control";
        $this->M->EditCustomAttributes = "";
        if (!$this->M->Raw) {
            $this->M->CurrentValue = HtmlDecode($this->M->CurrentValue);
        }
        $this->M->EditValue = $this->M->CurrentValue;
        $this->M->PlaceHolder = RemoveHtml($this->M->caption());

        // A
        $this->A->EditAttrs["class"] = "form-control";
        $this->A->EditCustomAttributes = "";
        if (!$this->A->Raw) {
            $this->A->CurrentValue = HtmlDecode($this->A->CurrentValue);
        }
        $this->A->EditValue = $this->A->CurrentValue;
        $this->A->PlaceHolder = RemoveHtml($this->A->caption());

        // N
        $this->N->EditAttrs["class"] = "form-control";
        $this->N->EditCustomAttributes = "";
        if (!$this->N->Raw) {
            $this->N->CurrentValue = HtmlDecode($this->N->CurrentValue);
        }
        $this->N->EditValue = $this->N->CurrentValue;
        $this->N->PlaceHolder = RemoveHtml($this->N->caption());

        // NoOfDays
        $this->NoOfDays->EditAttrs["class"] = "form-control";
        $this->NoOfDays->EditCustomAttributes = "";
        if (!$this->NoOfDays->Raw) {
            $this->NoOfDays->CurrentValue = HtmlDecode($this->NoOfDays->CurrentValue);
        }
        $this->NoOfDays->EditValue = $this->NoOfDays->CurrentValue;
        $this->NoOfDays->PlaceHolder = RemoveHtml($this->NoOfDays->caption());

        // PreRoute
        $this->PreRoute->EditAttrs["class"] = "form-control";
        $this->PreRoute->EditCustomAttributes = "";
        if (!$this->PreRoute->Raw) {
            $this->PreRoute->CurrentValue = HtmlDecode($this->PreRoute->CurrentValue);
        }
        $this->PreRoute->EditValue = $this->PreRoute->CurrentValue;
        $this->PreRoute->PlaceHolder = RemoveHtml($this->PreRoute->caption());

        // TimeOfTaking
        $this->TimeOfTaking->EditAttrs["class"] = "form-control";
        $this->TimeOfTaking->EditCustomAttributes = "";
        if (!$this->TimeOfTaking->Raw) {
            $this->TimeOfTaking->CurrentValue = HtmlDecode($this->TimeOfTaking->CurrentValue);
        }
        $this->TimeOfTaking->EditValue = $this->TimeOfTaking->CurrentValue;
        $this->TimeOfTaking->PlaceHolder = RemoveHtml($this->TimeOfTaking->caption());

        // Type
        $this->Type->EditAttrs["class"] = "form-control";
        $this->Type->EditCustomAttributes = "";
        if (!$this->Type->Raw) {
            $this->Type->CurrentValue = HtmlDecode($this->Type->CurrentValue);
        }
        $this->Type->EditValue = $this->Type->CurrentValue;
        $this->Type->PlaceHolder = RemoveHtml($this->Type->caption());

        // Status
        $this->Status->EditAttrs["class"] = "form-control";
        $this->Status->EditCustomAttributes = "";
        $this->Status->PlaceHolder = RemoveHtml($this->Status->caption());

        // CreatedBy

        // CreateDateTime

        // ModifiedBy

        // ModifiedDateTime

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
                    $doc->exportCaption($this->TemplateName);
                    $doc->exportCaption($this->Medicine);
                    $doc->exportCaption($this->M);
                    $doc->exportCaption($this->A);
                    $doc->exportCaption($this->N);
                    $doc->exportCaption($this->NoOfDays);
                    $doc->exportCaption($this->PreRoute);
                    $doc->exportCaption($this->TimeOfTaking);
                    $doc->exportCaption($this->CreatedBy);
                    $doc->exportCaption($this->CreateDateTime);
                    $doc->exportCaption($this->ModifiedBy);
                    $doc->exportCaption($this->ModifiedDateTime);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->TemplateName);
                    $doc->exportCaption($this->Medicine);
                    $doc->exportCaption($this->M);
                    $doc->exportCaption($this->A);
                    $doc->exportCaption($this->N);
                    $doc->exportCaption($this->NoOfDays);
                    $doc->exportCaption($this->PreRoute);
                    $doc->exportCaption($this->TimeOfTaking);
                    $doc->exportCaption($this->CreatedBy);
                    $doc->exportCaption($this->CreateDateTime);
                    $doc->exportCaption($this->ModifiedBy);
                    $doc->exportCaption($this->ModifiedDateTime);
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
                        $doc->exportField($this->TemplateName);
                        $doc->exportField($this->Medicine);
                        $doc->exportField($this->M);
                        $doc->exportField($this->A);
                        $doc->exportField($this->N);
                        $doc->exportField($this->NoOfDays);
                        $doc->exportField($this->PreRoute);
                        $doc->exportField($this->TimeOfTaking);
                        $doc->exportField($this->CreatedBy);
                        $doc->exportField($this->CreateDateTime);
                        $doc->exportField($this->ModifiedBy);
                        $doc->exportField($this->ModifiedDateTime);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->TemplateName);
                        $doc->exportField($this->Medicine);
                        $doc->exportField($this->M);
                        $doc->exportField($this->A);
                        $doc->exportField($this->N);
                        $doc->exportField($this->NoOfDays);
                        $doc->exportField($this->PreRoute);
                        $doc->exportField($this->TimeOfTaking);
                        $doc->exportField($this->CreatedBy);
                        $doc->exportField($this->CreateDateTime);
                        $doc->exportField($this->ModifiedBy);
                        $doc->exportField($this->ModifiedDateTime);
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
