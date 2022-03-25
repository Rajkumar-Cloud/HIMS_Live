<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for hospital_clients
 */
class HospitalClients extends DbTable
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
    public $logo;
    public $clients_name;
    public $street;
    public $area;
    public $town;
    public $province;
    public $postal_code;
    public $phone_no;
    public $PreFixCode;
    public $status;
    public $createdby;
    public $createddatetime;
    public $modifiedby;
    public $modifieddatetime;
    public $active;
    public $contactperson;
    public $position;
    public $paymentoption;
    public $HospId;
    public $BranchId;
    public $Country;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'hospital_clients';
        $this->TableName = 'hospital_clients';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`hospital_clients`";
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
        $this->id = new DbField('hospital_clients', 'hospital_clients', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // logo
        $this->logo = new DbField('hospital_clients', 'hospital_clients', 'x_logo', 'logo', '`logo`', '`logo`', 201, 450, -1, false, '`logo`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->logo->Sortable = true; // Allow sort
        $this->logo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->logo->Param, "CustomMsg");
        $this->Fields['logo'] = &$this->logo;

        // clients_name
        $this->clients_name = new DbField('hospital_clients', 'hospital_clients', 'x_clients_name', 'clients_name', '`clients_name`', '`clients_name`', 200, 100, -1, false, '`clients_name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->clients_name->Nullable = false; // NOT NULL field
        $this->clients_name->Required = true; // Required field
        $this->clients_name->Sortable = true; // Allow sort
        $this->clients_name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->clients_name->Param, "CustomMsg");
        $this->Fields['clients_name'] = &$this->clients_name;

        // street
        $this->street = new DbField('hospital_clients', 'hospital_clients', 'x_street', 'street', '`street`', '`street`', 200, 100, -1, false, '`street`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->street->Nullable = false; // NOT NULL field
        $this->street->Required = true; // Required field
        $this->street->Sortable = true; // Allow sort
        $this->street->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->street->Param, "CustomMsg");
        $this->Fields['street'] = &$this->street;

        // area
        $this->area = new DbField('hospital_clients', 'hospital_clients', 'x_area', 'area', '`area`', '`area`', 200, 45, -1, false, '`area`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->area->Sortable = true; // Allow sort
        $this->area->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->area->Param, "CustomMsg");
        $this->Fields['area'] = &$this->area;

        // town
        $this->town = new DbField('hospital_clients', 'hospital_clients', 'x_town', 'town', '`town`', '`town`', 200, 50, -1, false, '`town`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->town->Sortable = true; // Allow sort
        $this->town->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->town->Param, "CustomMsg");
        $this->Fields['town'] = &$this->town;

        // province
        $this->province = new DbField('hospital_clients', 'hospital_clients', 'x_province', 'province', '`province`', '`province`', 200, 50, -1, false, '`province`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->province->Sortable = true; // Allow sort
        $this->province->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->province->Param, "CustomMsg");
        $this->Fields['province'] = &$this->province;

        // postal_code
        $this->postal_code = new DbField('hospital_clients', 'hospital_clients', 'x_postal_code', 'postal_code', '`postal_code`', '`postal_code`', 200, 6, -1, false, '`postal_code`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->postal_code->Sortable = true; // Allow sort
        $this->postal_code->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->postal_code->Param, "CustomMsg");
        $this->Fields['postal_code'] = &$this->postal_code;

        // phone_no
        $this->phone_no = new DbField('hospital_clients', 'hospital_clients', 'x_phone_no', 'phone_no', '`phone_no`', '`phone_no`', 200, 50, -1, false, '`phone_no`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->phone_no->Sortable = true; // Allow sort
        $this->phone_no->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->phone_no->Param, "CustomMsg");
        $this->Fields['phone_no'] = &$this->phone_no;

        // PreFixCode
        $this->PreFixCode = new DbField('hospital_clients', 'hospital_clients', 'x_PreFixCode', 'PreFixCode', '`PreFixCode`', '`PreFixCode`', 200, 45, -1, false, '`PreFixCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PreFixCode->Sortable = true; // Allow sort
        $this->PreFixCode->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PreFixCode->Param, "CustomMsg");
        $this->Fields['PreFixCode'] = &$this->PreFixCode;

        // status
        $this->status = new DbField('hospital_clients', 'hospital_clients', 'x_status', 'status', '`status`', '`status`', 3, 11, -1, false, '`status`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->status->Nullable = false; // NOT NULL field
        $this->status->Required = true; // Required field
        $this->status->Sortable = true; // Allow sort
        $this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->status->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->status->Param, "CustomMsg");
        $this->Fields['status'] = &$this->status;

        // createdby
        $this->createdby = new DbField('hospital_clients', 'hospital_clients', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, 11, -1, false, '`createdby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdby->Sortable = true; // Allow sort
        $this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->createdby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createdby->Param, "CustomMsg");
        $this->Fields['createdby'] = &$this->createdby;

        // createddatetime
        $this->createddatetime = new DbField('hospital_clients', 'hospital_clients', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, false, '`createddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddatetime->Sortable = true; // Allow sort
        $this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->createddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createddatetime->Param, "CustomMsg");
        $this->Fields['createddatetime'] = &$this->createddatetime;

        // modifiedby
        $this->modifiedby = new DbField('hospital_clients', 'hospital_clients', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, 11, -1, false, '`modifiedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifiedby->Sortable = true; // Allow sort
        $this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->modifiedby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifiedby->Param, "CustomMsg");
        $this->Fields['modifiedby'] = &$this->modifiedby;

        // modifieddatetime
        $this->modifieddatetime = new DbField('hospital_clients', 'hospital_clients', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, false, '`modifieddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifieddatetime->Sortable = true; // Allow sort
        $this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->modifieddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifieddatetime->Param, "CustomMsg");
        $this->Fields['modifieddatetime'] = &$this->modifieddatetime;

        // active
        $this->active = new DbField('hospital_clients', 'hospital_clients', 'x_active', 'active', '`active`', '`active`', 200, 45, -1, false, '`active`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->active->Sortable = true; // Allow sort
        $this->active->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->active->Param, "CustomMsg");
        $this->Fields['active'] = &$this->active;

        // contactperson
        $this->contactperson = new DbField('hospital_clients', 'hospital_clients', 'x_contactperson', 'contactperson', '`contactperson`', '`contactperson`', 200, 45, -1, false, '`contactperson`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->contactperson->Sortable = true; // Allow sort
        $this->contactperson->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->contactperson->Param, "CustomMsg");
        $this->Fields['contactperson'] = &$this->contactperson;

        // position
        $this->position = new DbField('hospital_clients', 'hospital_clients', 'x_position', 'position', '`position`', '`position`', 200, 45, -1, false, '`position`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->position->Sortable = true; // Allow sort
        $this->position->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->position->Param, "CustomMsg");
        $this->Fields['position'] = &$this->position;

        // paymentoption
        $this->paymentoption = new DbField('hospital_clients', 'hospital_clients', 'x_paymentoption', 'paymentoption', '`paymentoption`', '`paymentoption`', 200, 45, -1, false, '`paymentoption`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->paymentoption->Sortable = true; // Allow sort
        $this->paymentoption->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->paymentoption->Param, "CustomMsg");
        $this->Fields['paymentoption'] = &$this->paymentoption;

        // HospId
        $this->HospId = new DbField('hospital_clients', 'hospital_clients', 'x_HospId', 'HospId', '`HospId`', '`HospId`', 3, 11, -1, false, '`HospId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospId->Sortable = true; // Allow sort
        $this->HospId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->HospId->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospId->Param, "CustomMsg");
        $this->Fields['HospId'] = &$this->HospId;

        // BranchId
        $this->BranchId = new DbField('hospital_clients', 'hospital_clients', 'x_BranchId', 'BranchId', '`BranchId`', '`BranchId`', 3, 11, -1, false, '`BranchId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BranchId->Sortable = true; // Allow sort
        $this->BranchId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->BranchId->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BranchId->Param, "CustomMsg");
        $this->Fields['BranchId'] = &$this->BranchId;

        // Country
        $this->Country = new DbField('hospital_clients', 'hospital_clients', 'x_Country', 'Country', '`Country`', '`Country`', 200, 45, -1, false, '`Country`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Country->Sortable = true; // Allow sort
        $this->Country->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Country->Param, "CustomMsg");
        $this->Fields['Country'] = &$this->Country;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`hospital_clients`";
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
        $this->logo->DbValue = $row['logo'];
        $this->clients_name->DbValue = $row['clients_name'];
        $this->street->DbValue = $row['street'];
        $this->area->DbValue = $row['area'];
        $this->town->DbValue = $row['town'];
        $this->province->DbValue = $row['province'];
        $this->postal_code->DbValue = $row['postal_code'];
        $this->phone_no->DbValue = $row['phone_no'];
        $this->PreFixCode->DbValue = $row['PreFixCode'];
        $this->status->DbValue = $row['status'];
        $this->createdby->DbValue = $row['createdby'];
        $this->createddatetime->DbValue = $row['createddatetime'];
        $this->modifiedby->DbValue = $row['modifiedby'];
        $this->modifieddatetime->DbValue = $row['modifieddatetime'];
        $this->active->DbValue = $row['active'];
        $this->contactperson->DbValue = $row['contactperson'];
        $this->position->DbValue = $row['position'];
        $this->paymentoption->DbValue = $row['paymentoption'];
        $this->HospId->DbValue = $row['HospId'];
        $this->BranchId->DbValue = $row['BranchId'];
        $this->Country->DbValue = $row['Country'];
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
        return $_SESSION[$name] ?? GetUrl("HospitalClientsList");
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
        if ($pageName == "HospitalClientsView") {
            return $Language->phrase("View");
        } elseif ($pageName == "HospitalClientsEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "HospitalClientsAdd") {
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
                return "HospitalClientsView";
            case Config("API_ADD_ACTION"):
                return "HospitalClientsAdd";
            case Config("API_EDIT_ACTION"):
                return "HospitalClientsEdit";
            case Config("API_DELETE_ACTION"):
                return "HospitalClientsDelete";
            case Config("API_LIST_ACTION"):
                return "HospitalClientsList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "HospitalClientsList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("HospitalClientsView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("HospitalClientsView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "HospitalClientsAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "HospitalClientsAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("HospitalClientsEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("HospitalClientsAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("HospitalClientsDelete", $this->getUrlParm());
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
        $this->logo->setDbValue($row['logo']);
        $this->clients_name->setDbValue($row['clients_name']);
        $this->street->setDbValue($row['street']);
        $this->area->setDbValue($row['area']);
        $this->town->setDbValue($row['town']);
        $this->province->setDbValue($row['province']);
        $this->postal_code->setDbValue($row['postal_code']);
        $this->phone_no->setDbValue($row['phone_no']);
        $this->PreFixCode->setDbValue($row['PreFixCode']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->active->setDbValue($row['active']);
        $this->contactperson->setDbValue($row['contactperson']);
        $this->position->setDbValue($row['position']);
        $this->paymentoption->setDbValue($row['paymentoption']);
        $this->HospId->setDbValue($row['HospId']);
        $this->BranchId->setDbValue($row['BranchId']);
        $this->Country->setDbValue($row['Country']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // logo

        // clients_name

        // street

        // area

        // town

        // province

        // postal_code

        // phone_no

        // PreFixCode

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // active

        // contactperson

        // position

        // paymentoption

        // HospId

        // BranchId

        // Country

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // logo
        $this->logo->ViewValue = $this->logo->CurrentValue;
        $this->logo->ViewCustomAttributes = "";

        // clients_name
        $this->clients_name->ViewValue = $this->clients_name->CurrentValue;
        $this->clients_name->ViewCustomAttributes = "";

        // street
        $this->street->ViewValue = $this->street->CurrentValue;
        $this->street->ViewCustomAttributes = "";

        // area
        $this->area->ViewValue = $this->area->CurrentValue;
        $this->area->ViewCustomAttributes = "";

        // town
        $this->town->ViewValue = $this->town->CurrentValue;
        $this->town->ViewCustomAttributes = "";

        // province
        $this->province->ViewValue = $this->province->CurrentValue;
        $this->province->ViewCustomAttributes = "";

        // postal_code
        $this->postal_code->ViewValue = $this->postal_code->CurrentValue;
        $this->postal_code->ViewCustomAttributes = "";

        // phone_no
        $this->phone_no->ViewValue = $this->phone_no->CurrentValue;
        $this->phone_no->ViewCustomAttributes = "";

        // PreFixCode
        $this->PreFixCode->ViewValue = $this->PreFixCode->CurrentValue;
        $this->PreFixCode->ViewCustomAttributes = "";

        // status
        $this->status->ViewValue = $this->status->CurrentValue;
        $this->status->ViewValue = FormatNumber($this->status->ViewValue, 0, -2, -2, -2);
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

        // active
        $this->active->ViewValue = $this->active->CurrentValue;
        $this->active->ViewCustomAttributes = "";

        // contactperson
        $this->contactperson->ViewValue = $this->contactperson->CurrentValue;
        $this->contactperson->ViewCustomAttributes = "";

        // position
        $this->position->ViewValue = $this->position->CurrentValue;
        $this->position->ViewCustomAttributes = "";

        // paymentoption
        $this->paymentoption->ViewValue = $this->paymentoption->CurrentValue;
        $this->paymentoption->ViewCustomAttributes = "";

        // HospId
        $this->HospId->ViewValue = $this->HospId->CurrentValue;
        $this->HospId->ViewValue = FormatNumber($this->HospId->ViewValue, 0, -2, -2, -2);
        $this->HospId->ViewCustomAttributes = "";

        // BranchId
        $this->BranchId->ViewValue = $this->BranchId->CurrentValue;
        $this->BranchId->ViewValue = FormatNumber($this->BranchId->ViewValue, 0, -2, -2, -2);
        $this->BranchId->ViewCustomAttributes = "";

        // Country
        $this->Country->ViewValue = $this->Country->CurrentValue;
        $this->Country->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // logo
        $this->logo->LinkCustomAttributes = "";
        $this->logo->HrefValue = "";
        $this->logo->TooltipValue = "";

        // clients_name
        $this->clients_name->LinkCustomAttributes = "";
        $this->clients_name->HrefValue = "";
        $this->clients_name->TooltipValue = "";

        // street
        $this->street->LinkCustomAttributes = "";
        $this->street->HrefValue = "";
        $this->street->TooltipValue = "";

        // area
        $this->area->LinkCustomAttributes = "";
        $this->area->HrefValue = "";
        $this->area->TooltipValue = "";

        // town
        $this->town->LinkCustomAttributes = "";
        $this->town->HrefValue = "";
        $this->town->TooltipValue = "";

        // province
        $this->province->LinkCustomAttributes = "";
        $this->province->HrefValue = "";
        $this->province->TooltipValue = "";

        // postal_code
        $this->postal_code->LinkCustomAttributes = "";
        $this->postal_code->HrefValue = "";
        $this->postal_code->TooltipValue = "";

        // phone_no
        $this->phone_no->LinkCustomAttributes = "";
        $this->phone_no->HrefValue = "";
        $this->phone_no->TooltipValue = "";

        // PreFixCode
        $this->PreFixCode->LinkCustomAttributes = "";
        $this->PreFixCode->HrefValue = "";
        $this->PreFixCode->TooltipValue = "";

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

        // active
        $this->active->LinkCustomAttributes = "";
        $this->active->HrefValue = "";
        $this->active->TooltipValue = "";

        // contactperson
        $this->contactperson->LinkCustomAttributes = "";
        $this->contactperson->HrefValue = "";
        $this->contactperson->TooltipValue = "";

        // position
        $this->position->LinkCustomAttributes = "";
        $this->position->HrefValue = "";
        $this->position->TooltipValue = "";

        // paymentoption
        $this->paymentoption->LinkCustomAttributes = "";
        $this->paymentoption->HrefValue = "";
        $this->paymentoption->TooltipValue = "";

        // HospId
        $this->HospId->LinkCustomAttributes = "";
        $this->HospId->HrefValue = "";
        $this->HospId->TooltipValue = "";

        // BranchId
        $this->BranchId->LinkCustomAttributes = "";
        $this->BranchId->HrefValue = "";
        $this->BranchId->TooltipValue = "";

        // Country
        $this->Country->LinkCustomAttributes = "";
        $this->Country->HrefValue = "";
        $this->Country->TooltipValue = "";

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

        // logo
        $this->logo->EditAttrs["class"] = "form-control";
        $this->logo->EditCustomAttributes = "";
        $this->logo->EditValue = $this->logo->CurrentValue;
        $this->logo->PlaceHolder = RemoveHtml($this->logo->caption());

        // clients_name
        $this->clients_name->EditAttrs["class"] = "form-control";
        $this->clients_name->EditCustomAttributes = "";
        if (!$this->clients_name->Raw) {
            $this->clients_name->CurrentValue = HtmlDecode($this->clients_name->CurrentValue);
        }
        $this->clients_name->EditValue = $this->clients_name->CurrentValue;
        $this->clients_name->PlaceHolder = RemoveHtml($this->clients_name->caption());

        // street
        $this->street->EditAttrs["class"] = "form-control";
        $this->street->EditCustomAttributes = "";
        if (!$this->street->Raw) {
            $this->street->CurrentValue = HtmlDecode($this->street->CurrentValue);
        }
        $this->street->EditValue = $this->street->CurrentValue;
        $this->street->PlaceHolder = RemoveHtml($this->street->caption());

        // area
        $this->area->EditAttrs["class"] = "form-control";
        $this->area->EditCustomAttributes = "";
        if (!$this->area->Raw) {
            $this->area->CurrentValue = HtmlDecode($this->area->CurrentValue);
        }
        $this->area->EditValue = $this->area->CurrentValue;
        $this->area->PlaceHolder = RemoveHtml($this->area->caption());

        // town
        $this->town->EditAttrs["class"] = "form-control";
        $this->town->EditCustomAttributes = "";
        if (!$this->town->Raw) {
            $this->town->CurrentValue = HtmlDecode($this->town->CurrentValue);
        }
        $this->town->EditValue = $this->town->CurrentValue;
        $this->town->PlaceHolder = RemoveHtml($this->town->caption());

        // province
        $this->province->EditAttrs["class"] = "form-control";
        $this->province->EditCustomAttributes = "";
        if (!$this->province->Raw) {
            $this->province->CurrentValue = HtmlDecode($this->province->CurrentValue);
        }
        $this->province->EditValue = $this->province->CurrentValue;
        $this->province->PlaceHolder = RemoveHtml($this->province->caption());

        // postal_code
        $this->postal_code->EditAttrs["class"] = "form-control";
        $this->postal_code->EditCustomAttributes = "";
        if (!$this->postal_code->Raw) {
            $this->postal_code->CurrentValue = HtmlDecode($this->postal_code->CurrentValue);
        }
        $this->postal_code->EditValue = $this->postal_code->CurrentValue;
        $this->postal_code->PlaceHolder = RemoveHtml($this->postal_code->caption());

        // phone_no
        $this->phone_no->EditAttrs["class"] = "form-control";
        $this->phone_no->EditCustomAttributes = "";
        if (!$this->phone_no->Raw) {
            $this->phone_no->CurrentValue = HtmlDecode($this->phone_no->CurrentValue);
        }
        $this->phone_no->EditValue = $this->phone_no->CurrentValue;
        $this->phone_no->PlaceHolder = RemoveHtml($this->phone_no->caption());

        // PreFixCode
        $this->PreFixCode->EditAttrs["class"] = "form-control";
        $this->PreFixCode->EditCustomAttributes = "";
        if (!$this->PreFixCode->Raw) {
            $this->PreFixCode->CurrentValue = HtmlDecode($this->PreFixCode->CurrentValue);
        }
        $this->PreFixCode->EditValue = $this->PreFixCode->CurrentValue;
        $this->PreFixCode->PlaceHolder = RemoveHtml($this->PreFixCode->caption());

        // status
        $this->status->EditAttrs["class"] = "form-control";
        $this->status->EditCustomAttributes = "";
        $this->status->EditValue = $this->status->CurrentValue;
        $this->status->PlaceHolder = RemoveHtml($this->status->caption());

        // createdby
        $this->createdby->EditAttrs["class"] = "form-control";
        $this->createdby->EditCustomAttributes = "";
        $this->createdby->EditValue = $this->createdby->CurrentValue;
        $this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

        // createddatetime
        $this->createddatetime->EditAttrs["class"] = "form-control";
        $this->createddatetime->EditCustomAttributes = "";
        $this->createddatetime->EditValue = FormatDateTime($this->createddatetime->CurrentValue, 8);
        $this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

        // modifiedby
        $this->modifiedby->EditAttrs["class"] = "form-control";
        $this->modifiedby->EditCustomAttributes = "";
        $this->modifiedby->EditValue = $this->modifiedby->CurrentValue;
        $this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

        // modifieddatetime
        $this->modifieddatetime->EditAttrs["class"] = "form-control";
        $this->modifieddatetime->EditCustomAttributes = "";
        $this->modifieddatetime->EditValue = FormatDateTime($this->modifieddatetime->CurrentValue, 8);
        $this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

        // active
        $this->active->EditAttrs["class"] = "form-control";
        $this->active->EditCustomAttributes = "";
        if (!$this->active->Raw) {
            $this->active->CurrentValue = HtmlDecode($this->active->CurrentValue);
        }
        $this->active->EditValue = $this->active->CurrentValue;
        $this->active->PlaceHolder = RemoveHtml($this->active->caption());

        // contactperson
        $this->contactperson->EditAttrs["class"] = "form-control";
        $this->contactperson->EditCustomAttributes = "";
        if (!$this->contactperson->Raw) {
            $this->contactperson->CurrentValue = HtmlDecode($this->contactperson->CurrentValue);
        }
        $this->contactperson->EditValue = $this->contactperson->CurrentValue;
        $this->contactperson->PlaceHolder = RemoveHtml($this->contactperson->caption());

        // position
        $this->position->EditAttrs["class"] = "form-control";
        $this->position->EditCustomAttributes = "";
        if (!$this->position->Raw) {
            $this->position->CurrentValue = HtmlDecode($this->position->CurrentValue);
        }
        $this->position->EditValue = $this->position->CurrentValue;
        $this->position->PlaceHolder = RemoveHtml($this->position->caption());

        // paymentoption
        $this->paymentoption->EditAttrs["class"] = "form-control";
        $this->paymentoption->EditCustomAttributes = "";
        if (!$this->paymentoption->Raw) {
            $this->paymentoption->CurrentValue = HtmlDecode($this->paymentoption->CurrentValue);
        }
        $this->paymentoption->EditValue = $this->paymentoption->CurrentValue;
        $this->paymentoption->PlaceHolder = RemoveHtml($this->paymentoption->caption());

        // HospId
        $this->HospId->EditAttrs["class"] = "form-control";
        $this->HospId->EditCustomAttributes = "";
        $this->HospId->EditValue = $this->HospId->CurrentValue;
        $this->HospId->PlaceHolder = RemoveHtml($this->HospId->caption());

        // BranchId
        $this->BranchId->EditAttrs["class"] = "form-control";
        $this->BranchId->EditCustomAttributes = "";
        $this->BranchId->EditValue = $this->BranchId->CurrentValue;
        $this->BranchId->PlaceHolder = RemoveHtml($this->BranchId->caption());

        // Country
        $this->Country->EditAttrs["class"] = "form-control";
        $this->Country->EditCustomAttributes = "";
        if (!$this->Country->Raw) {
            $this->Country->CurrentValue = HtmlDecode($this->Country->CurrentValue);
        }
        $this->Country->EditValue = $this->Country->CurrentValue;
        $this->Country->PlaceHolder = RemoveHtml($this->Country->caption());

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
                    $doc->exportCaption($this->logo);
                    $doc->exportCaption($this->clients_name);
                    $doc->exportCaption($this->street);
                    $doc->exportCaption($this->area);
                    $doc->exportCaption($this->town);
                    $doc->exportCaption($this->province);
                    $doc->exportCaption($this->postal_code);
                    $doc->exportCaption($this->phone_no);
                    $doc->exportCaption($this->PreFixCode);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->active);
                    $doc->exportCaption($this->contactperson);
                    $doc->exportCaption($this->position);
                    $doc->exportCaption($this->paymentoption);
                    $doc->exportCaption($this->HospId);
                    $doc->exportCaption($this->BranchId);
                    $doc->exportCaption($this->Country);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->clients_name);
                    $doc->exportCaption($this->street);
                    $doc->exportCaption($this->area);
                    $doc->exportCaption($this->town);
                    $doc->exportCaption($this->province);
                    $doc->exportCaption($this->postal_code);
                    $doc->exportCaption($this->phone_no);
                    $doc->exportCaption($this->PreFixCode);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->active);
                    $doc->exportCaption($this->contactperson);
                    $doc->exportCaption($this->position);
                    $doc->exportCaption($this->paymentoption);
                    $doc->exportCaption($this->HospId);
                    $doc->exportCaption($this->BranchId);
                    $doc->exportCaption($this->Country);
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
                        $doc->exportField($this->logo);
                        $doc->exportField($this->clients_name);
                        $doc->exportField($this->street);
                        $doc->exportField($this->area);
                        $doc->exportField($this->town);
                        $doc->exportField($this->province);
                        $doc->exportField($this->postal_code);
                        $doc->exportField($this->phone_no);
                        $doc->exportField($this->PreFixCode);
                        $doc->exportField($this->status);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->active);
                        $doc->exportField($this->contactperson);
                        $doc->exportField($this->position);
                        $doc->exportField($this->paymentoption);
                        $doc->exportField($this->HospId);
                        $doc->exportField($this->BranchId);
                        $doc->exportField($this->Country);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->clients_name);
                        $doc->exportField($this->street);
                        $doc->exportField($this->area);
                        $doc->exportField($this->town);
                        $doc->exportField($this->province);
                        $doc->exportField($this->postal_code);
                        $doc->exportField($this->phone_no);
                        $doc->exportField($this->PreFixCode);
                        $doc->exportField($this->status);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->active);
                        $doc->exportField($this->contactperson);
                        $doc->exportField($this->position);
                        $doc->exportField($this->paymentoption);
                        $doc->exportField($this->HospId);
                        $doc->exportField($this->BranchId);
                        $doc->exportField($this->Country);
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