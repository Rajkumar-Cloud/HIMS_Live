<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for pres_tradenames_new
 */
class PresTradenamesNew extends DbTable
{
    protected $SqlFrom = "";
    protected $SqlSelect = null;
    protected $SqlSelectList = null;
    protected $SqlWhere = "";
    protected $SqlGroupBy = "";
    protected $SqlHaving = "";
    protected $SqlOrderBy = "";
    public $UseSessionForListSql = true;
    public $UseCustomTemplate = false; // Use custom template

    // Column CSS classes
    public $LeftColumnClass = "col-sm-2 col-form-label ew-label";
    public $RightColumnClass = "col-sm-10";
    public $OffsetColumnClass = "col-sm-10 offset-sm-2";
    public $TableLeftColumnClass = "w-col-2";

    // Export
    public $ExportDoc;

    // Fields
    public $ID;
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
    public $ProductType;
    public $Generic_Name1;
    public $Strength1;
    public $Unit1;
    public $Generic_Name2;
    public $Strength2;
    public $Unit2;
    public $Generic_Name3;
    public $Strength3;
    public $Unit3;
    public $Generic_Name4;
    public $Generic_Name5;
    public $Strength4;
    public $Strength5;
    public $Unit4;
    public $Unit5;
    public $AlterNative1;
    public $AlterNative2;
    public $AlterNative3;
    public $AlterNative4;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'pres_tradenames_new';
        $this->TableName = 'pres_tradenames_new';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`pres_tradenames_new`";
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

        // ID
        $this->ID = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_ID', 'ID', '`ID`', '`ID`', 3, 11, -1, false, '`ID`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->ID->IsAutoIncrement = true; // Autoincrement field
        $this->ID->IsPrimaryKey = true; // Primary key field
        $this->ID->Sortable = true; // Allow sort
        $this->ID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['ID'] = &$this->ID;

        // Drug_Name
        $this->Drug_Name = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Drug_Name', 'Drug_Name', '`Drug_Name`', '`Drug_Name`', 200, 100, -1, false, '`Drug_Name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Drug_Name->Sortable = true; // Allow sort
        $this->Fields['Drug_Name'] = &$this->Drug_Name;

        // Generic_Name
        $this->Generic_Name = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Generic_Name', 'Generic_Name', '`Generic_Name`', '`Generic_Name`', 200, 100, -1, false, '`Generic_Name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Generic_Name->Sortable = true; // Allow sort
        $this->Fields['Generic_Name'] = &$this->Generic_Name;

        // Trade_Name
        $this->Trade_Name = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Trade_Name', 'Trade_Name', '`Trade_Name`', '`Trade_Name`', 200, 100, -1, false, '`Trade_Name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Trade_Name->Nullable = false; // NOT NULL field
        $this->Trade_Name->Required = true; // Required field
        $this->Trade_Name->Sortable = true; // Allow sort
        $this->Fields['Trade_Name'] = &$this->Trade_Name;

        // PR_CODE
        $this->PR_CODE = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_PR_CODE', 'PR_CODE', '`PR_CODE`', '`PR_CODE`', 200, 50, -1, false, '`PR_CODE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PR_CODE->Nullable = false; // NOT NULL field
        $this->PR_CODE->Required = true; // Required field
        $this->PR_CODE->Sortable = true; // Allow sort
        $this->Fields['PR_CODE'] = &$this->PR_CODE;

        // Form
        $this->Form = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Form', 'Form', '`Form`', '`Form`', 200, 50, -1, false, '`Form`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Form->Sortable = true; // Allow sort
        $this->Fields['Form'] = &$this->Form;

        // Strength
        $this->Strength = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Strength', 'Strength', '`Strength`', '`Strength`', 200, 50, -1, false, '`Strength`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Strength->Sortable = true; // Allow sort
        $this->Fields['Strength'] = &$this->Strength;

        // Unit
        $this->Unit = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Unit', 'Unit', '`Unit`', '`Unit`', 200, 50, -1, false, '`Unit`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Unit->Sortable = true; // Allow sort
        $this->Fields['Unit'] = &$this->Unit;

        // CONTAINER_TYPE
        $this->CONTAINER_TYPE = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_CONTAINER_TYPE', 'CONTAINER_TYPE', '`CONTAINER_TYPE`', '`CONTAINER_TYPE`', 200, 50, -1, false, '`CONTAINER_TYPE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CONTAINER_TYPE->Sortable = true; // Allow sort
        $this->Fields['CONTAINER_TYPE'] = &$this->CONTAINER_TYPE;

        // CONTAINER_STRENGTH
        $this->CONTAINER_STRENGTH = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_CONTAINER_STRENGTH', 'CONTAINER_STRENGTH', '`CONTAINER_STRENGTH`', '`CONTAINER_STRENGTH`', 200, 50, -1, false, '`CONTAINER_STRENGTH`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CONTAINER_STRENGTH->Sortable = true; // Allow sort
        $this->Fields['CONTAINER_STRENGTH'] = &$this->CONTAINER_STRENGTH;

        // TypeOfDrug
        $this->TypeOfDrug = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_TypeOfDrug', 'TypeOfDrug', '`TypeOfDrug`', '`TypeOfDrug`', 200, 45, -1, false, '`TypeOfDrug`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TypeOfDrug->Sortable = true; // Allow sort
        $this->Fields['TypeOfDrug'] = &$this->TypeOfDrug;

        // ProductType
        $this->ProductType = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_ProductType', 'ProductType', '`ProductType`', '`ProductType`', 200, 45, -1, false, '`ProductType`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ProductType->Sortable = true; // Allow sort
        $this->Fields['ProductType'] = &$this->ProductType;

        // Generic_Name1
        $this->Generic_Name1 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Generic_Name1', 'Generic_Name1', '`Generic_Name1`', '`Generic_Name1`', 200, 100, -1, false, '`Generic_Name1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Generic_Name1->Sortable = true; // Allow sort
        $this->Fields['Generic_Name1'] = &$this->Generic_Name1;

        // Strength1
        $this->Strength1 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Strength1', 'Strength1', '`Strength1`', '`Strength1`', 200, 45, -1, false, '`Strength1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Strength1->Sortable = true; // Allow sort
        $this->Fields['Strength1'] = &$this->Strength1;

        // Unit1
        $this->Unit1 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Unit1', 'Unit1', '`Unit1`', '`Unit1`', 200, 45, -1, false, '`Unit1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Unit1->Sortable = true; // Allow sort
        $this->Fields['Unit1'] = &$this->Unit1;

        // Generic_Name2
        $this->Generic_Name2 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Generic_Name2', 'Generic_Name2', '`Generic_Name2`', '`Generic_Name2`', 200, 100, -1, false, '`Generic_Name2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Generic_Name2->Sortable = true; // Allow sort
        $this->Fields['Generic_Name2'] = &$this->Generic_Name2;

        // Strength2
        $this->Strength2 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Strength2', 'Strength2', '`Strength2`', '`Strength2`', 200, 45, -1, false, '`Strength2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Strength2->Sortable = true; // Allow sort
        $this->Fields['Strength2'] = &$this->Strength2;

        // Unit2
        $this->Unit2 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Unit2', 'Unit2', '`Unit2`', '`Unit2`', 200, 45, -1, false, '`Unit2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Unit2->Sortable = true; // Allow sort
        $this->Fields['Unit2'] = &$this->Unit2;

        // Generic_Name3
        $this->Generic_Name3 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Generic_Name3', 'Generic_Name3', '`Generic_Name3`', '`Generic_Name3`', 200, 45, -1, false, '`Generic_Name3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Generic_Name3->Sortable = true; // Allow sort
        $this->Fields['Generic_Name3'] = &$this->Generic_Name3;

        // Strength3
        $this->Strength3 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Strength3', 'Strength3', '`Strength3`', '`Strength3`', 200, 45, -1, false, '`Strength3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Strength3->Sortable = true; // Allow sort
        $this->Fields['Strength3'] = &$this->Strength3;

        // Unit3
        $this->Unit3 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Unit3', 'Unit3', '`Unit3`', '`Unit3`', 200, 45, -1, false, '`Unit3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Unit3->Sortable = true; // Allow sort
        $this->Fields['Unit3'] = &$this->Unit3;

        // Generic_Name4
        $this->Generic_Name4 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Generic_Name4', 'Generic_Name4', '`Generic_Name4`', '`Generic_Name4`', 200, 45, -1, false, '`Generic_Name4`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Generic_Name4->Sortable = true; // Allow sort
        $this->Fields['Generic_Name4'] = &$this->Generic_Name4;

        // Generic_Name5
        $this->Generic_Name5 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Generic_Name5', 'Generic_Name5', '`Generic_Name5`', '`Generic_Name5`', 200, 45, -1, false, '`Generic_Name5`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Generic_Name5->Sortable = true; // Allow sort
        $this->Fields['Generic_Name5'] = &$this->Generic_Name5;

        // Strength4
        $this->Strength4 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Strength4', 'Strength4', '`Strength4`', '`Strength4`', 200, 45, -1, false, '`Strength4`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Strength4->Sortable = true; // Allow sort
        $this->Fields['Strength4'] = &$this->Strength4;

        // Strength5
        $this->Strength5 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Strength5', 'Strength5', '`Strength5`', '`Strength5`', 200, 45, -1, false, '`Strength5`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Strength5->Sortable = true; // Allow sort
        $this->Fields['Strength5'] = &$this->Strength5;

        // Unit4
        $this->Unit4 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Unit4', 'Unit4', '`Unit4`', '`Unit4`', 200, 45, -1, false, '`Unit4`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Unit4->Sortable = true; // Allow sort
        $this->Fields['Unit4'] = &$this->Unit4;

        // Unit5
        $this->Unit5 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Unit5', 'Unit5', '`Unit5`', '`Unit5`', 200, 45, -1, false, '`Unit5`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Unit5->Sortable = true; // Allow sort
        $this->Fields['Unit5'] = &$this->Unit5;

        // AlterNative1
        $this->AlterNative1 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_AlterNative1', 'AlterNative1', '`AlterNative1`', '`AlterNative1`', 200, 45, -1, false, '`AlterNative1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AlterNative1->Sortable = true; // Allow sort
        $this->Fields['AlterNative1'] = &$this->AlterNative1;

        // AlterNative2
        $this->AlterNative2 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_AlterNative2', 'AlterNative2', '`AlterNative2`', '`AlterNative2`', 200, 45, -1, false, '`AlterNative2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AlterNative2->Sortable = true; // Allow sort
        $this->Fields['AlterNative2'] = &$this->AlterNative2;

        // AlterNative3
        $this->AlterNative3 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_AlterNative3', 'AlterNative3', '`AlterNative3`', '`AlterNative3`', 200, 45, -1, false, '`AlterNative3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AlterNative3->Sortable = true; // Allow sort
        $this->Fields['AlterNative3'] = &$this->AlterNative3;

        // AlterNative4
        $this->AlterNative4 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_AlterNative4', 'AlterNative4', '`AlterNative4`', '`AlterNative4`', 200, 45, -1, false, '`AlterNative4`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AlterNative4->Sortable = true; // Allow sort
        $this->Fields['AlterNative4'] = &$this->AlterNative4;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`pres_tradenames_new`";
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
            $sql = $sql->resetQueryPart("orderBy")->getSQL();
        }
        $pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';
        // Skip Custom View / SubQuery / SELECT DISTINCT / ORDER BY
        if (
            ($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
            preg_match($pattern, $sql) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sql) &&
            !preg_match('/^\s*select\s+distinct\s+/i', $sql) && !preg_match('/\s+order\s+by\s+/i', $sql)
        ) {
            $sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sql);
        } else {
            $sqlwrk = "SELECT COUNT(*) FROM (" . $sql . ") COUNT_TABLE";
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
        $this->ProductType->DbValue = $row['ProductType'];
        $this->Generic_Name1->DbValue = $row['Generic_Name1'];
        $this->Strength1->DbValue = $row['Strength1'];
        $this->Unit1->DbValue = $row['Unit1'];
        $this->Generic_Name2->DbValue = $row['Generic_Name2'];
        $this->Strength2->DbValue = $row['Strength2'];
        $this->Unit2->DbValue = $row['Unit2'];
        $this->Generic_Name3->DbValue = $row['Generic_Name3'];
        $this->Strength3->DbValue = $row['Strength3'];
        $this->Unit3->DbValue = $row['Unit3'];
        $this->Generic_Name4->DbValue = $row['Generic_Name4'];
        $this->Generic_Name5->DbValue = $row['Generic_Name5'];
        $this->Strength4->DbValue = $row['Strength4'];
        $this->Strength5->DbValue = $row['Strength5'];
        $this->Unit4->DbValue = $row['Unit4'];
        $this->Unit5->DbValue = $row['Unit5'];
        $this->AlterNative1->DbValue = $row['AlterNative1'];
        $this->AlterNative2->DbValue = $row['AlterNative2'];
        $this->AlterNative3->DbValue = $row['AlterNative3'];
        $this->AlterNative4->DbValue = $row['AlterNative4'];
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
        $name = PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL");
        // Get referer URL automatically
        if (ReferUrl() != "" && ReferPageName() != CurrentPageName() && ReferPageName() != "login") { // Referer not same page or login page
            $_SESSION[$name] = ReferUrl(); // Save to Session
        }
        if (@$_SESSION[$name] != "") {
            return $_SESSION[$name];
        } else {
            return GetUrl("PresTradenamesNewList");
        }
    }

    public function setReturnUrl($v)
    {
        $_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL")] = $v;
    }

    // Get modal caption
    public function getModalCaption($pageName)
    {
        global $Language;
        if ($pageName == "PresTradenamesNewView") {
            return $Language->phrase("View");
        } elseif ($pageName == "PresTradenamesNewEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "PresTradenamesNewAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "PresTradenamesNewList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("PresTradenamesNewView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("PresTradenamesNewView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "PresTradenamesNewAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "PresTradenamesNewAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("PresTradenamesNewEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("PresTradenamesNewAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("PresTradenamesNewDelete", $this->getUrlParm());
    }

    // Add master url
    public function addMasterUrl($url)
    {
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
        $this->ProductType->setDbValue($row['ProductType']);
        $this->Generic_Name1->setDbValue($row['Generic_Name1']);
        $this->Strength1->setDbValue($row['Strength1']);
        $this->Unit1->setDbValue($row['Unit1']);
        $this->Generic_Name2->setDbValue($row['Generic_Name2']);
        $this->Strength2->setDbValue($row['Strength2']);
        $this->Unit2->setDbValue($row['Unit2']);
        $this->Generic_Name3->setDbValue($row['Generic_Name3']);
        $this->Strength3->setDbValue($row['Strength3']);
        $this->Unit3->setDbValue($row['Unit3']);
        $this->Generic_Name4->setDbValue($row['Generic_Name4']);
        $this->Generic_Name5->setDbValue($row['Generic_Name5']);
        $this->Strength4->setDbValue($row['Strength4']);
        $this->Strength5->setDbValue($row['Strength5']);
        $this->Unit4->setDbValue($row['Unit4']);
        $this->Unit5->setDbValue($row['Unit5']);
        $this->AlterNative1->setDbValue($row['AlterNative1']);
        $this->AlterNative2->setDbValue($row['AlterNative2']);
        $this->AlterNative3->setDbValue($row['AlterNative3']);
        $this->AlterNative4->setDbValue($row['AlterNative4']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // ID

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

        // ProductType

        // Generic_Name1

        // Strength1

        // Unit1

        // Generic_Name2

        // Strength2

        // Unit2

        // Generic_Name3

        // Strength3

        // Unit3

        // Generic_Name4

        // Generic_Name5

        // Strength4

        // Strength5

        // Unit4

        // Unit5

        // AlterNative1

        // AlterNative2

        // AlterNative3

        // AlterNative4

        // ID
        $this->ID->ViewValue = $this->ID->CurrentValue;
        $this->ID->ViewCustomAttributes = "";

        // Drug_Name
        $this->Drug_Name->ViewValue = $this->Drug_Name->CurrentValue;
        $this->Drug_Name->ViewCustomAttributes = "";

        // Generic_Name
        $this->Generic_Name->ViewValue = $this->Generic_Name->CurrentValue;
        $this->Generic_Name->ViewCustomAttributes = "";

        // Trade_Name
        $this->Trade_Name->ViewValue = $this->Trade_Name->CurrentValue;
        $this->Trade_Name->ViewCustomAttributes = "";

        // PR_CODE
        $this->PR_CODE->ViewValue = $this->PR_CODE->CurrentValue;
        $this->PR_CODE->ViewCustomAttributes = "";

        // Form
        $this->Form->ViewValue = $this->Form->CurrentValue;
        $this->Form->ViewCustomAttributes = "";

        // Strength
        $this->Strength->ViewValue = $this->Strength->CurrentValue;
        $this->Strength->ViewCustomAttributes = "";

        // Unit
        $this->Unit->ViewValue = $this->Unit->CurrentValue;
        $this->Unit->ViewCustomAttributes = "";

        // CONTAINER_TYPE
        $this->CONTAINER_TYPE->ViewValue = $this->CONTAINER_TYPE->CurrentValue;
        $this->CONTAINER_TYPE->ViewCustomAttributes = "";

        // CONTAINER_STRENGTH
        $this->CONTAINER_STRENGTH->ViewValue = $this->CONTAINER_STRENGTH->CurrentValue;
        $this->CONTAINER_STRENGTH->ViewCustomAttributes = "";

        // TypeOfDrug
        $this->TypeOfDrug->ViewValue = $this->TypeOfDrug->CurrentValue;
        $this->TypeOfDrug->ViewCustomAttributes = "";

        // ProductType
        $this->ProductType->ViewValue = $this->ProductType->CurrentValue;
        $this->ProductType->ViewCustomAttributes = "";

        // Generic_Name1
        $this->Generic_Name1->ViewValue = $this->Generic_Name1->CurrentValue;
        $this->Generic_Name1->ViewCustomAttributes = "";

        // Strength1
        $this->Strength1->ViewValue = $this->Strength1->CurrentValue;
        $this->Strength1->ViewCustomAttributes = "";

        // Unit1
        $this->Unit1->ViewValue = $this->Unit1->CurrentValue;
        $this->Unit1->ViewCustomAttributes = "";

        // Generic_Name2
        $this->Generic_Name2->ViewValue = $this->Generic_Name2->CurrentValue;
        $this->Generic_Name2->ViewCustomAttributes = "";

        // Strength2
        $this->Strength2->ViewValue = $this->Strength2->CurrentValue;
        $this->Strength2->ViewCustomAttributes = "";

        // Unit2
        $this->Unit2->ViewValue = $this->Unit2->CurrentValue;
        $this->Unit2->ViewCustomAttributes = "";

        // Generic_Name3
        $this->Generic_Name3->ViewValue = $this->Generic_Name3->CurrentValue;
        $this->Generic_Name3->ViewCustomAttributes = "";

        // Strength3
        $this->Strength3->ViewValue = $this->Strength3->CurrentValue;
        $this->Strength3->ViewCustomAttributes = "";

        // Unit3
        $this->Unit3->ViewValue = $this->Unit3->CurrentValue;
        $this->Unit3->ViewCustomAttributes = "";

        // Generic_Name4
        $this->Generic_Name4->ViewValue = $this->Generic_Name4->CurrentValue;
        $this->Generic_Name4->ViewCustomAttributes = "";

        // Generic_Name5
        $this->Generic_Name5->ViewValue = $this->Generic_Name5->CurrentValue;
        $this->Generic_Name5->ViewCustomAttributes = "";

        // Strength4
        $this->Strength4->ViewValue = $this->Strength4->CurrentValue;
        $this->Strength4->ViewCustomAttributes = "";

        // Strength5
        $this->Strength5->ViewValue = $this->Strength5->CurrentValue;
        $this->Strength5->ViewCustomAttributes = "";

        // Unit4
        $this->Unit4->ViewValue = $this->Unit4->CurrentValue;
        $this->Unit4->ViewCustomAttributes = "";

        // Unit5
        $this->Unit5->ViewValue = $this->Unit5->CurrentValue;
        $this->Unit5->ViewCustomAttributes = "";

        // AlterNative1
        $this->AlterNative1->ViewValue = $this->AlterNative1->CurrentValue;
        $this->AlterNative1->ViewCustomAttributes = "";

        // AlterNative2
        $this->AlterNative2->ViewValue = $this->AlterNative2->CurrentValue;
        $this->AlterNative2->ViewCustomAttributes = "";

        // AlterNative3
        $this->AlterNative3->ViewValue = $this->AlterNative3->CurrentValue;
        $this->AlterNative3->ViewCustomAttributes = "";

        // AlterNative4
        $this->AlterNative4->ViewValue = $this->AlterNative4->CurrentValue;
        $this->AlterNative4->ViewCustomAttributes = "";

        // ID
        $this->ID->LinkCustomAttributes = "";
        $this->ID->HrefValue = "";
        $this->ID->TooltipValue = "";

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

        // ProductType
        $this->ProductType->LinkCustomAttributes = "";
        $this->ProductType->HrefValue = "";
        $this->ProductType->TooltipValue = "";

        // Generic_Name1
        $this->Generic_Name1->LinkCustomAttributes = "";
        $this->Generic_Name1->HrefValue = "";
        $this->Generic_Name1->TooltipValue = "";

        // Strength1
        $this->Strength1->LinkCustomAttributes = "";
        $this->Strength1->HrefValue = "";
        $this->Strength1->TooltipValue = "";

        // Unit1
        $this->Unit1->LinkCustomAttributes = "";
        $this->Unit1->HrefValue = "";
        $this->Unit1->TooltipValue = "";

        // Generic_Name2
        $this->Generic_Name2->LinkCustomAttributes = "";
        $this->Generic_Name2->HrefValue = "";
        $this->Generic_Name2->TooltipValue = "";

        // Strength2
        $this->Strength2->LinkCustomAttributes = "";
        $this->Strength2->HrefValue = "";
        $this->Strength2->TooltipValue = "";

        // Unit2
        $this->Unit2->LinkCustomAttributes = "";
        $this->Unit2->HrefValue = "";
        $this->Unit2->TooltipValue = "";

        // Generic_Name3
        $this->Generic_Name3->LinkCustomAttributes = "";
        $this->Generic_Name3->HrefValue = "";
        $this->Generic_Name3->TooltipValue = "";

        // Strength3
        $this->Strength3->LinkCustomAttributes = "";
        $this->Strength3->HrefValue = "";
        $this->Strength3->TooltipValue = "";

        // Unit3
        $this->Unit3->LinkCustomAttributes = "";
        $this->Unit3->HrefValue = "";
        $this->Unit3->TooltipValue = "";

        // Generic_Name4
        $this->Generic_Name4->LinkCustomAttributes = "";
        $this->Generic_Name4->HrefValue = "";
        $this->Generic_Name4->TooltipValue = "";

        // Generic_Name5
        $this->Generic_Name5->LinkCustomAttributes = "";
        $this->Generic_Name5->HrefValue = "";
        $this->Generic_Name5->TooltipValue = "";

        // Strength4
        $this->Strength4->LinkCustomAttributes = "";
        $this->Strength4->HrefValue = "";
        $this->Strength4->TooltipValue = "";

        // Strength5
        $this->Strength5->LinkCustomAttributes = "";
        $this->Strength5->HrefValue = "";
        $this->Strength5->TooltipValue = "";

        // Unit4
        $this->Unit4->LinkCustomAttributes = "";
        $this->Unit4->HrefValue = "";
        $this->Unit4->TooltipValue = "";

        // Unit5
        $this->Unit5->LinkCustomAttributes = "";
        $this->Unit5->HrefValue = "";
        $this->Unit5->TooltipValue = "";

        // AlterNative1
        $this->AlterNative1->LinkCustomAttributes = "";
        $this->AlterNative1->HrefValue = "";
        $this->AlterNative1->TooltipValue = "";

        // AlterNative2
        $this->AlterNative2->LinkCustomAttributes = "";
        $this->AlterNative2->HrefValue = "";
        $this->AlterNative2->TooltipValue = "";

        // AlterNative3
        $this->AlterNative3->LinkCustomAttributes = "";
        $this->AlterNative3->HrefValue = "";
        $this->AlterNative3->TooltipValue = "";

        // AlterNative4
        $this->AlterNative4->LinkCustomAttributes = "";
        $this->AlterNative4->HrefValue = "";
        $this->AlterNative4->TooltipValue = "";

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
        if (!$this->Generic_Name->Raw) {
            $this->Generic_Name->CurrentValue = HtmlDecode($this->Generic_Name->CurrentValue);
        }
        $this->Generic_Name->EditValue = $this->Generic_Name->CurrentValue;
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
        if (!$this->Form->Raw) {
            $this->Form->CurrentValue = HtmlDecode($this->Form->CurrentValue);
        }
        $this->Form->EditValue = $this->Form->CurrentValue;
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
        if (!$this->Unit->Raw) {
            $this->Unit->CurrentValue = HtmlDecode($this->Unit->CurrentValue);
        }
        $this->Unit->EditValue = $this->Unit->CurrentValue;
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
        if (!$this->TypeOfDrug->Raw) {
            $this->TypeOfDrug->CurrentValue = HtmlDecode($this->TypeOfDrug->CurrentValue);
        }
        $this->TypeOfDrug->EditValue = $this->TypeOfDrug->CurrentValue;
        $this->TypeOfDrug->PlaceHolder = RemoveHtml($this->TypeOfDrug->caption());

        // ProductType
        $this->ProductType->EditAttrs["class"] = "form-control";
        $this->ProductType->EditCustomAttributes = "";
        if (!$this->ProductType->Raw) {
            $this->ProductType->CurrentValue = HtmlDecode($this->ProductType->CurrentValue);
        }
        $this->ProductType->EditValue = $this->ProductType->CurrentValue;
        $this->ProductType->PlaceHolder = RemoveHtml($this->ProductType->caption());

        // Generic_Name1
        $this->Generic_Name1->EditAttrs["class"] = "form-control";
        $this->Generic_Name1->EditCustomAttributes = "";
        if (!$this->Generic_Name1->Raw) {
            $this->Generic_Name1->CurrentValue = HtmlDecode($this->Generic_Name1->CurrentValue);
        }
        $this->Generic_Name1->EditValue = $this->Generic_Name1->CurrentValue;
        $this->Generic_Name1->PlaceHolder = RemoveHtml($this->Generic_Name1->caption());

        // Strength1
        $this->Strength1->EditAttrs["class"] = "form-control";
        $this->Strength1->EditCustomAttributes = "";
        if (!$this->Strength1->Raw) {
            $this->Strength1->CurrentValue = HtmlDecode($this->Strength1->CurrentValue);
        }
        $this->Strength1->EditValue = $this->Strength1->CurrentValue;
        $this->Strength1->PlaceHolder = RemoveHtml($this->Strength1->caption());

        // Unit1
        $this->Unit1->EditAttrs["class"] = "form-control";
        $this->Unit1->EditCustomAttributes = "";
        if (!$this->Unit1->Raw) {
            $this->Unit1->CurrentValue = HtmlDecode($this->Unit1->CurrentValue);
        }
        $this->Unit1->EditValue = $this->Unit1->CurrentValue;
        $this->Unit1->PlaceHolder = RemoveHtml($this->Unit1->caption());

        // Generic_Name2
        $this->Generic_Name2->EditAttrs["class"] = "form-control";
        $this->Generic_Name2->EditCustomAttributes = "";
        if (!$this->Generic_Name2->Raw) {
            $this->Generic_Name2->CurrentValue = HtmlDecode($this->Generic_Name2->CurrentValue);
        }
        $this->Generic_Name2->EditValue = $this->Generic_Name2->CurrentValue;
        $this->Generic_Name2->PlaceHolder = RemoveHtml($this->Generic_Name2->caption());

        // Strength2
        $this->Strength2->EditAttrs["class"] = "form-control";
        $this->Strength2->EditCustomAttributes = "";
        if (!$this->Strength2->Raw) {
            $this->Strength2->CurrentValue = HtmlDecode($this->Strength2->CurrentValue);
        }
        $this->Strength2->EditValue = $this->Strength2->CurrentValue;
        $this->Strength2->PlaceHolder = RemoveHtml($this->Strength2->caption());

        // Unit2
        $this->Unit2->EditAttrs["class"] = "form-control";
        $this->Unit2->EditCustomAttributes = "";
        if (!$this->Unit2->Raw) {
            $this->Unit2->CurrentValue = HtmlDecode($this->Unit2->CurrentValue);
        }
        $this->Unit2->EditValue = $this->Unit2->CurrentValue;
        $this->Unit2->PlaceHolder = RemoveHtml($this->Unit2->caption());

        // Generic_Name3
        $this->Generic_Name3->EditAttrs["class"] = "form-control";
        $this->Generic_Name3->EditCustomAttributes = "";
        if (!$this->Generic_Name3->Raw) {
            $this->Generic_Name3->CurrentValue = HtmlDecode($this->Generic_Name3->CurrentValue);
        }
        $this->Generic_Name3->EditValue = $this->Generic_Name3->CurrentValue;
        $this->Generic_Name3->PlaceHolder = RemoveHtml($this->Generic_Name3->caption());

        // Strength3
        $this->Strength3->EditAttrs["class"] = "form-control";
        $this->Strength3->EditCustomAttributes = "";
        if (!$this->Strength3->Raw) {
            $this->Strength3->CurrentValue = HtmlDecode($this->Strength3->CurrentValue);
        }
        $this->Strength3->EditValue = $this->Strength3->CurrentValue;
        $this->Strength3->PlaceHolder = RemoveHtml($this->Strength3->caption());

        // Unit3
        $this->Unit3->EditAttrs["class"] = "form-control";
        $this->Unit3->EditCustomAttributes = "";
        if (!$this->Unit3->Raw) {
            $this->Unit3->CurrentValue = HtmlDecode($this->Unit3->CurrentValue);
        }
        $this->Unit3->EditValue = $this->Unit3->CurrentValue;
        $this->Unit3->PlaceHolder = RemoveHtml($this->Unit3->caption());

        // Generic_Name4
        $this->Generic_Name4->EditAttrs["class"] = "form-control";
        $this->Generic_Name4->EditCustomAttributes = "";
        if (!$this->Generic_Name4->Raw) {
            $this->Generic_Name4->CurrentValue = HtmlDecode($this->Generic_Name4->CurrentValue);
        }
        $this->Generic_Name4->EditValue = $this->Generic_Name4->CurrentValue;
        $this->Generic_Name4->PlaceHolder = RemoveHtml($this->Generic_Name4->caption());

        // Generic_Name5
        $this->Generic_Name5->EditAttrs["class"] = "form-control";
        $this->Generic_Name5->EditCustomAttributes = "";
        if (!$this->Generic_Name5->Raw) {
            $this->Generic_Name5->CurrentValue = HtmlDecode($this->Generic_Name5->CurrentValue);
        }
        $this->Generic_Name5->EditValue = $this->Generic_Name5->CurrentValue;
        $this->Generic_Name5->PlaceHolder = RemoveHtml($this->Generic_Name5->caption());

        // Strength4
        $this->Strength4->EditAttrs["class"] = "form-control";
        $this->Strength4->EditCustomAttributes = "";
        if (!$this->Strength4->Raw) {
            $this->Strength4->CurrentValue = HtmlDecode($this->Strength4->CurrentValue);
        }
        $this->Strength4->EditValue = $this->Strength4->CurrentValue;
        $this->Strength4->PlaceHolder = RemoveHtml($this->Strength4->caption());

        // Strength5
        $this->Strength5->EditAttrs["class"] = "form-control";
        $this->Strength5->EditCustomAttributes = "";
        if (!$this->Strength5->Raw) {
            $this->Strength5->CurrentValue = HtmlDecode($this->Strength5->CurrentValue);
        }
        $this->Strength5->EditValue = $this->Strength5->CurrentValue;
        $this->Strength5->PlaceHolder = RemoveHtml($this->Strength5->caption());

        // Unit4
        $this->Unit4->EditAttrs["class"] = "form-control";
        $this->Unit4->EditCustomAttributes = "";
        if (!$this->Unit4->Raw) {
            $this->Unit4->CurrentValue = HtmlDecode($this->Unit4->CurrentValue);
        }
        $this->Unit4->EditValue = $this->Unit4->CurrentValue;
        $this->Unit4->PlaceHolder = RemoveHtml($this->Unit4->caption());

        // Unit5
        $this->Unit5->EditAttrs["class"] = "form-control";
        $this->Unit5->EditCustomAttributes = "";
        if (!$this->Unit5->Raw) {
            $this->Unit5->CurrentValue = HtmlDecode($this->Unit5->CurrentValue);
        }
        $this->Unit5->EditValue = $this->Unit5->CurrentValue;
        $this->Unit5->PlaceHolder = RemoveHtml($this->Unit5->caption());

        // AlterNative1
        $this->AlterNative1->EditAttrs["class"] = "form-control";
        $this->AlterNative1->EditCustomAttributes = "";
        if (!$this->AlterNative1->Raw) {
            $this->AlterNative1->CurrentValue = HtmlDecode($this->AlterNative1->CurrentValue);
        }
        $this->AlterNative1->EditValue = $this->AlterNative1->CurrentValue;
        $this->AlterNative1->PlaceHolder = RemoveHtml($this->AlterNative1->caption());

        // AlterNative2
        $this->AlterNative2->EditAttrs["class"] = "form-control";
        $this->AlterNative2->EditCustomAttributes = "";
        if (!$this->AlterNative2->Raw) {
            $this->AlterNative2->CurrentValue = HtmlDecode($this->AlterNative2->CurrentValue);
        }
        $this->AlterNative2->EditValue = $this->AlterNative2->CurrentValue;
        $this->AlterNative2->PlaceHolder = RemoveHtml($this->AlterNative2->caption());

        // AlterNative3
        $this->AlterNative3->EditAttrs["class"] = "form-control";
        $this->AlterNative3->EditCustomAttributes = "";
        if (!$this->AlterNative3->Raw) {
            $this->AlterNative3->CurrentValue = HtmlDecode($this->AlterNative3->CurrentValue);
        }
        $this->AlterNative3->EditValue = $this->AlterNative3->CurrentValue;
        $this->AlterNative3->PlaceHolder = RemoveHtml($this->AlterNative3->caption());

        // AlterNative4
        $this->AlterNative4->EditAttrs["class"] = "form-control";
        $this->AlterNative4->EditCustomAttributes = "";
        if (!$this->AlterNative4->Raw) {
            $this->AlterNative4->CurrentValue = HtmlDecode($this->AlterNative4->CurrentValue);
        }
        $this->AlterNative4->EditValue = $this->AlterNative4->CurrentValue;
        $this->AlterNative4->PlaceHolder = RemoveHtml($this->AlterNative4->caption());

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
                    $doc->exportCaption($this->ProductType);
                    $doc->exportCaption($this->Generic_Name1);
                    $doc->exportCaption($this->Strength1);
                    $doc->exportCaption($this->Unit1);
                    $doc->exportCaption($this->Generic_Name2);
                    $doc->exportCaption($this->Strength2);
                    $doc->exportCaption($this->Unit2);
                    $doc->exportCaption($this->Generic_Name3);
                    $doc->exportCaption($this->Strength3);
                    $doc->exportCaption($this->Unit3);
                    $doc->exportCaption($this->Generic_Name4);
                    $doc->exportCaption($this->Generic_Name5);
                    $doc->exportCaption($this->Strength4);
                    $doc->exportCaption($this->Strength5);
                    $doc->exportCaption($this->Unit4);
                    $doc->exportCaption($this->Unit5);
                    $doc->exportCaption($this->AlterNative1);
                    $doc->exportCaption($this->AlterNative2);
                    $doc->exportCaption($this->AlterNative3);
                    $doc->exportCaption($this->AlterNative4);
                } else {
                    $doc->exportCaption($this->ID);
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
                    $doc->exportCaption($this->ProductType);
                    $doc->exportCaption($this->Generic_Name1);
                    $doc->exportCaption($this->Strength1);
                    $doc->exportCaption($this->Unit1);
                    $doc->exportCaption($this->Generic_Name2);
                    $doc->exportCaption($this->Strength2);
                    $doc->exportCaption($this->Unit2);
                    $doc->exportCaption($this->Generic_Name3);
                    $doc->exportCaption($this->Strength3);
                    $doc->exportCaption($this->Unit3);
                    $doc->exportCaption($this->Generic_Name4);
                    $doc->exportCaption($this->Generic_Name5);
                    $doc->exportCaption($this->Strength4);
                    $doc->exportCaption($this->Strength5);
                    $doc->exportCaption($this->Unit4);
                    $doc->exportCaption($this->Unit5);
                    $doc->exportCaption($this->AlterNative1);
                    $doc->exportCaption($this->AlterNative2);
                    $doc->exportCaption($this->AlterNative3);
                    $doc->exportCaption($this->AlterNative4);
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
                        $doc->exportField($this->ProductType);
                        $doc->exportField($this->Generic_Name1);
                        $doc->exportField($this->Strength1);
                        $doc->exportField($this->Unit1);
                        $doc->exportField($this->Generic_Name2);
                        $doc->exportField($this->Strength2);
                        $doc->exportField($this->Unit2);
                        $doc->exportField($this->Generic_Name3);
                        $doc->exportField($this->Strength3);
                        $doc->exportField($this->Unit3);
                        $doc->exportField($this->Generic_Name4);
                        $doc->exportField($this->Generic_Name5);
                        $doc->exportField($this->Strength4);
                        $doc->exportField($this->Strength5);
                        $doc->exportField($this->Unit4);
                        $doc->exportField($this->Unit5);
                        $doc->exportField($this->AlterNative1);
                        $doc->exportField($this->AlterNative2);
                        $doc->exportField($this->AlterNative3);
                        $doc->exportField($this->AlterNative4);
                    } else {
                        $doc->exportField($this->ID);
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
                        $doc->exportField($this->ProductType);
                        $doc->exportField($this->Generic_Name1);
                        $doc->exportField($this->Strength1);
                        $doc->exportField($this->Unit1);
                        $doc->exportField($this->Generic_Name2);
                        $doc->exportField($this->Strength2);
                        $doc->exportField($this->Unit2);
                        $doc->exportField($this->Generic_Name3);
                        $doc->exportField($this->Strength3);
                        $doc->exportField($this->Unit3);
                        $doc->exportField($this->Generic_Name4);
                        $doc->exportField($this->Generic_Name5);
                        $doc->exportField($this->Strength4);
                        $doc->exportField($this->Strength5);
                        $doc->exportField($this->Unit4);
                        $doc->exportField($this->Unit5);
                        $doc->exportField($this->AlterNative1);
                        $doc->exportField($this->AlterNative2);
                        $doc->exportField($this->AlterNative3);
                        $doc->exportField($this->AlterNative4);
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
