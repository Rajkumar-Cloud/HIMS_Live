<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for crm_leadaddress
 */
class CrmLeadaddress extends DbTable
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
    public $leadaddressid;
    public $phone;
    public $mobile;
    public $fax;
    public $addresslevel1a;
    public $addresslevel2a;
    public $addresslevel3a;
    public $addresslevel4a;
    public $addresslevel5a;
    public $addresslevel6a;
    public $addresslevel7a;
    public $addresslevel8a;
    public $buildingnumbera;
    public $localnumbera;
    public $poboxa;
    public $phone_extra;
    public $mobile_extra;
    public $fax_extra;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'crm_leadaddress';
        $this->TableName = 'crm_leadaddress';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`crm_leadaddress`";
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

        // leadaddressid
        $this->leadaddressid = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_leadaddressid', 'leadaddressid', '`leadaddressid`', '`leadaddressid`', 3, 10, -1, false, '`leadaddressid`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->leadaddressid->IsPrimaryKey = true; // Primary key field
        $this->leadaddressid->Nullable = false; // NOT NULL field
        $this->leadaddressid->Sortable = true; // Allow sort
        $this->leadaddressid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->leadaddressid->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->leadaddressid->Param, "CustomMsg");
        $this->Fields['leadaddressid'] = &$this->leadaddressid;

        // phone
        $this->phone = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_phone', 'phone', '`phone`', '`phone`', 200, 50, -1, false, '`phone`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->phone->Sortable = true; // Allow sort
        $this->phone->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->phone->Param, "CustomMsg");
        $this->Fields['phone'] = &$this->phone;

        // mobile
        $this->mobile = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_mobile', 'mobile', '`mobile`', '`mobile`', 200, 50, -1, false, '`mobile`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->mobile->Sortable = true; // Allow sort
        $this->mobile->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->mobile->Param, "CustomMsg");
        $this->Fields['mobile'] = &$this->mobile;

        // fax
        $this->fax = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_fax', 'fax', '`fax`', '`fax`', 200, 50, -1, false, '`fax`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->fax->Sortable = true; // Allow sort
        $this->fax->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->fax->Param, "CustomMsg");
        $this->Fields['fax'] = &$this->fax;

        // addresslevel1a
        $this->addresslevel1a = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_addresslevel1a', 'addresslevel1a', '`addresslevel1a`', '`addresslevel1a`', 200, 255, -1, false, '`addresslevel1a`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->addresslevel1a->Sortable = true; // Allow sort
        $this->addresslevel1a->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->addresslevel1a->Param, "CustomMsg");
        $this->Fields['addresslevel1a'] = &$this->addresslevel1a;

        // addresslevel2a
        $this->addresslevel2a = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_addresslevel2a', 'addresslevel2a', '`addresslevel2a`', '`addresslevel2a`', 200, 255, -1, false, '`addresslevel2a`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->addresslevel2a->Sortable = true; // Allow sort
        $this->addresslevel2a->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->addresslevel2a->Param, "CustomMsg");
        $this->Fields['addresslevel2a'] = &$this->addresslevel2a;

        // addresslevel3a
        $this->addresslevel3a = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_addresslevel3a', 'addresslevel3a', '`addresslevel3a`', '`addresslevel3a`', 200, 255, -1, false, '`addresslevel3a`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->addresslevel3a->Sortable = true; // Allow sort
        $this->addresslevel3a->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->addresslevel3a->Param, "CustomMsg");
        $this->Fields['addresslevel3a'] = &$this->addresslevel3a;

        // addresslevel4a
        $this->addresslevel4a = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_addresslevel4a', 'addresslevel4a', '`addresslevel4a`', '`addresslevel4a`', 200, 255, -1, false, '`addresslevel4a`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->addresslevel4a->Sortable = true; // Allow sort
        $this->addresslevel4a->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->addresslevel4a->Param, "CustomMsg");
        $this->Fields['addresslevel4a'] = &$this->addresslevel4a;

        // addresslevel5a
        $this->addresslevel5a = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_addresslevel5a', 'addresslevel5a', '`addresslevel5a`', '`addresslevel5a`', 200, 255, -1, false, '`addresslevel5a`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->addresslevel5a->Sortable = true; // Allow sort
        $this->addresslevel5a->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->addresslevel5a->Param, "CustomMsg");
        $this->Fields['addresslevel5a'] = &$this->addresslevel5a;

        // addresslevel6a
        $this->addresslevel6a = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_addresslevel6a', 'addresslevel6a', '`addresslevel6a`', '`addresslevel6a`', 200, 255, -1, false, '`addresslevel6a`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->addresslevel6a->Sortable = true; // Allow sort
        $this->addresslevel6a->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->addresslevel6a->Param, "CustomMsg");
        $this->Fields['addresslevel6a'] = &$this->addresslevel6a;

        // addresslevel7a
        $this->addresslevel7a = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_addresslevel7a', 'addresslevel7a', '`addresslevel7a`', '`addresslevel7a`', 200, 255, -1, false, '`addresslevel7a`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->addresslevel7a->Sortable = true; // Allow sort
        $this->addresslevel7a->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->addresslevel7a->Param, "CustomMsg");
        $this->Fields['addresslevel7a'] = &$this->addresslevel7a;

        // addresslevel8a
        $this->addresslevel8a = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_addresslevel8a', 'addresslevel8a', '`addresslevel8a`', '`addresslevel8a`', 200, 255, -1, false, '`addresslevel8a`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->addresslevel8a->Sortable = true; // Allow sort
        $this->addresslevel8a->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->addresslevel8a->Param, "CustomMsg");
        $this->Fields['addresslevel8a'] = &$this->addresslevel8a;

        // buildingnumbera
        $this->buildingnumbera = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_buildingnumbera', 'buildingnumbera', '`buildingnumbera`', '`buildingnumbera`', 200, 255, -1, false, '`buildingnumbera`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->buildingnumbera->Sortable = true; // Allow sort
        $this->buildingnumbera->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->buildingnumbera->Param, "CustomMsg");
        $this->Fields['buildingnumbera'] = &$this->buildingnumbera;

        // localnumbera
        $this->localnumbera = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_localnumbera', 'localnumbera', '`localnumbera`', '`localnumbera`', 200, 50, -1, false, '`localnumbera`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->localnumbera->Sortable = true; // Allow sort
        $this->localnumbera->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->localnumbera->Param, "CustomMsg");
        $this->Fields['localnumbera'] = &$this->localnumbera;

        // poboxa
        $this->poboxa = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_poboxa', 'poboxa', '`poboxa`', '`poboxa`', 200, 50, -1, false, '`poboxa`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->poboxa->Sortable = true; // Allow sort
        $this->poboxa->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->poboxa->Param, "CustomMsg");
        $this->Fields['poboxa'] = &$this->poboxa;

        // phone_extra
        $this->phone_extra = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_phone_extra', 'phone_extra', '`phone_extra`', '`phone_extra`', 200, 100, -1, false, '`phone_extra`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->phone_extra->Sortable = true; // Allow sort
        $this->phone_extra->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->phone_extra->Param, "CustomMsg");
        $this->Fields['phone_extra'] = &$this->phone_extra;

        // mobile_extra
        $this->mobile_extra = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_mobile_extra', 'mobile_extra', '`mobile_extra`', '`mobile_extra`', 200, 100, -1, false, '`mobile_extra`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->mobile_extra->Sortable = true; // Allow sort
        $this->mobile_extra->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->mobile_extra->Param, "CustomMsg");
        $this->Fields['mobile_extra'] = &$this->mobile_extra;

        // fax_extra
        $this->fax_extra = new DbField('crm_leadaddress', 'crm_leadaddress', 'x_fax_extra', 'fax_extra', '`fax_extra`', '`fax_extra`', 200, 100, -1, false, '`fax_extra`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->fax_extra->Sortable = true; // Allow sort
        $this->fax_extra->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->fax_extra->Param, "CustomMsg");
        $this->Fields['fax_extra'] = &$this->fax_extra;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`crm_leadaddress`";
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
            if (array_key_exists('leadaddressid', $rs)) {
                AddFilter($where, QuotedName('leadaddressid', $this->Dbid) . '=' . QuotedValue($rs['leadaddressid'], $this->leadaddressid->DataType, $this->Dbid));
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
        $this->leadaddressid->DbValue = $row['leadaddressid'];
        $this->phone->DbValue = $row['phone'];
        $this->mobile->DbValue = $row['mobile'];
        $this->fax->DbValue = $row['fax'];
        $this->addresslevel1a->DbValue = $row['addresslevel1a'];
        $this->addresslevel2a->DbValue = $row['addresslevel2a'];
        $this->addresslevel3a->DbValue = $row['addresslevel3a'];
        $this->addresslevel4a->DbValue = $row['addresslevel4a'];
        $this->addresslevel5a->DbValue = $row['addresslevel5a'];
        $this->addresslevel6a->DbValue = $row['addresslevel6a'];
        $this->addresslevel7a->DbValue = $row['addresslevel7a'];
        $this->addresslevel8a->DbValue = $row['addresslevel8a'];
        $this->buildingnumbera->DbValue = $row['buildingnumbera'];
        $this->localnumbera->DbValue = $row['localnumbera'];
        $this->poboxa->DbValue = $row['poboxa'];
        $this->phone_extra->DbValue = $row['phone_extra'];
        $this->mobile_extra->DbValue = $row['mobile_extra'];
        $this->fax_extra->DbValue = $row['fax_extra'];
    }

    // Delete uploaded files
    public function deleteUploadedFiles($row)
    {
        $this->loadDbValues($row);
    }

    // Record filter WHERE clause
    protected function sqlKeyFilter()
    {
        return "`leadaddressid` = @leadaddressid@";
    }

    // Get Key
    public function getKey($current = false)
    {
        $keys = [];
        $val = $current ? $this->leadaddressid->CurrentValue : $this->leadaddressid->OldValue;
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
                $this->leadaddressid->CurrentValue = $keys[0];
            } else {
                $this->leadaddressid->OldValue = $keys[0];
            }
        }
    }

    // Get record filter
    public function getRecordFilter($row = null)
    {
        $keyFilter = $this->sqlKeyFilter();
        if (is_array($row)) {
            $val = array_key_exists('leadaddressid', $row) ? $row['leadaddressid'] : null;
        } else {
            $val = $this->leadaddressid->OldValue !== null ? $this->leadaddressid->OldValue : $this->leadaddressid->CurrentValue;
        }
        if (!is_numeric($val)) {
            return "0=1"; // Invalid key
        }
        if ($val === null) {
            return "0=1"; // Invalid key
        } else {
            $keyFilter = str_replace("@leadaddressid@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
        return $_SESSION[$name] ?? GetUrl("CrmLeadaddressList");
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
        if ($pageName == "CrmLeadaddressView") {
            return $Language->phrase("View");
        } elseif ($pageName == "CrmLeadaddressEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "CrmLeadaddressAdd") {
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
                return "CrmLeadaddressView";
            case Config("API_ADD_ACTION"):
                return "CrmLeadaddressAdd";
            case Config("API_EDIT_ACTION"):
                return "CrmLeadaddressEdit";
            case Config("API_DELETE_ACTION"):
                return "CrmLeadaddressDelete";
            case Config("API_LIST_ACTION"):
                return "CrmLeadaddressList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "CrmLeadaddressList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("CrmLeadaddressView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("CrmLeadaddressView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "CrmLeadaddressAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "CrmLeadaddressAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("CrmLeadaddressEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("CrmLeadaddressAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("CrmLeadaddressDelete", $this->getUrlParm());
    }

    // Add master url
    public function addMasterUrl($url)
    {
        return $url;
    }

    public function keyToJson($htmlEncode = false)
    {
        $json = "";
        $json .= "leadaddressid:" . JsonEncode($this->leadaddressid->CurrentValue, "number");
        $json = "{" . $json . "}";
        if ($htmlEncode) {
            $json = HtmlEncode($json);
        }
        return $json;
    }

    // Add key value to URL
    public function keyUrl($url, $parm = "")
    {
        if ($this->leadaddressid->CurrentValue !== null) {
            $url .= "/" . rawurlencode($this->leadaddressid->CurrentValue);
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
            if (($keyValue = Param("leadaddressid") ?? Route("leadaddressid")) !== null) {
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
                $this->leadaddressid->CurrentValue = $key;
            } else {
                $this->leadaddressid->OldValue = $key;
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
        $this->leadaddressid->setDbValue($row['leadaddressid']);
        $this->phone->setDbValue($row['phone']);
        $this->mobile->setDbValue($row['mobile']);
        $this->fax->setDbValue($row['fax']);
        $this->addresslevel1a->setDbValue($row['addresslevel1a']);
        $this->addresslevel2a->setDbValue($row['addresslevel2a']);
        $this->addresslevel3a->setDbValue($row['addresslevel3a']);
        $this->addresslevel4a->setDbValue($row['addresslevel4a']);
        $this->addresslevel5a->setDbValue($row['addresslevel5a']);
        $this->addresslevel6a->setDbValue($row['addresslevel6a']);
        $this->addresslevel7a->setDbValue($row['addresslevel7a']);
        $this->addresslevel8a->setDbValue($row['addresslevel8a']);
        $this->buildingnumbera->setDbValue($row['buildingnumbera']);
        $this->localnumbera->setDbValue($row['localnumbera']);
        $this->poboxa->setDbValue($row['poboxa']);
        $this->phone_extra->setDbValue($row['phone_extra']);
        $this->mobile_extra->setDbValue($row['mobile_extra']);
        $this->fax_extra->setDbValue($row['fax_extra']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // leadaddressid

        // phone

        // mobile

        // fax

        // addresslevel1a

        // addresslevel2a

        // addresslevel3a

        // addresslevel4a

        // addresslevel5a

        // addresslevel6a

        // addresslevel7a

        // addresslevel8a

        // buildingnumbera

        // localnumbera

        // poboxa

        // phone_extra

        // mobile_extra

        // fax_extra

        // leadaddressid
        $this->leadaddressid->ViewValue = $this->leadaddressid->CurrentValue;
        $this->leadaddressid->ViewValue = FormatNumber($this->leadaddressid->ViewValue, 0, -2, -2, -2);
        $this->leadaddressid->ViewCustomAttributes = "";

        // phone
        $this->phone->ViewValue = $this->phone->CurrentValue;
        $this->phone->ViewCustomAttributes = "";

        // mobile
        $this->mobile->ViewValue = $this->mobile->CurrentValue;
        $this->mobile->ViewCustomAttributes = "";

        // fax
        $this->fax->ViewValue = $this->fax->CurrentValue;
        $this->fax->ViewCustomAttributes = "";

        // addresslevel1a
        $this->addresslevel1a->ViewValue = $this->addresslevel1a->CurrentValue;
        $this->addresslevel1a->ViewCustomAttributes = "";

        // addresslevel2a
        $this->addresslevel2a->ViewValue = $this->addresslevel2a->CurrentValue;
        $this->addresslevel2a->ViewCustomAttributes = "";

        // addresslevel3a
        $this->addresslevel3a->ViewValue = $this->addresslevel3a->CurrentValue;
        $this->addresslevel3a->ViewCustomAttributes = "";

        // addresslevel4a
        $this->addresslevel4a->ViewValue = $this->addresslevel4a->CurrentValue;
        $this->addresslevel4a->ViewCustomAttributes = "";

        // addresslevel5a
        $this->addresslevel5a->ViewValue = $this->addresslevel5a->CurrentValue;
        $this->addresslevel5a->ViewCustomAttributes = "";

        // addresslevel6a
        $this->addresslevel6a->ViewValue = $this->addresslevel6a->CurrentValue;
        $this->addresslevel6a->ViewCustomAttributes = "";

        // addresslevel7a
        $this->addresslevel7a->ViewValue = $this->addresslevel7a->CurrentValue;
        $this->addresslevel7a->ViewCustomAttributes = "";

        // addresslevel8a
        $this->addresslevel8a->ViewValue = $this->addresslevel8a->CurrentValue;
        $this->addresslevel8a->ViewCustomAttributes = "";

        // buildingnumbera
        $this->buildingnumbera->ViewValue = $this->buildingnumbera->CurrentValue;
        $this->buildingnumbera->ViewCustomAttributes = "";

        // localnumbera
        $this->localnumbera->ViewValue = $this->localnumbera->CurrentValue;
        $this->localnumbera->ViewCustomAttributes = "";

        // poboxa
        $this->poboxa->ViewValue = $this->poboxa->CurrentValue;
        $this->poboxa->ViewCustomAttributes = "";

        // phone_extra
        $this->phone_extra->ViewValue = $this->phone_extra->CurrentValue;
        $this->phone_extra->ViewCustomAttributes = "";

        // mobile_extra
        $this->mobile_extra->ViewValue = $this->mobile_extra->CurrentValue;
        $this->mobile_extra->ViewCustomAttributes = "";

        // fax_extra
        $this->fax_extra->ViewValue = $this->fax_extra->CurrentValue;
        $this->fax_extra->ViewCustomAttributes = "";

        // leadaddressid
        $this->leadaddressid->LinkCustomAttributes = "";
        $this->leadaddressid->HrefValue = "";
        $this->leadaddressid->TooltipValue = "";

        // phone
        $this->phone->LinkCustomAttributes = "";
        $this->phone->HrefValue = "";
        $this->phone->TooltipValue = "";

        // mobile
        $this->mobile->LinkCustomAttributes = "";
        $this->mobile->HrefValue = "";
        $this->mobile->TooltipValue = "";

        // fax
        $this->fax->LinkCustomAttributes = "";
        $this->fax->HrefValue = "";
        $this->fax->TooltipValue = "";

        // addresslevel1a
        $this->addresslevel1a->LinkCustomAttributes = "";
        $this->addresslevel1a->HrefValue = "";
        $this->addresslevel1a->TooltipValue = "";

        // addresslevel2a
        $this->addresslevel2a->LinkCustomAttributes = "";
        $this->addresslevel2a->HrefValue = "";
        $this->addresslevel2a->TooltipValue = "";

        // addresslevel3a
        $this->addresslevel3a->LinkCustomAttributes = "";
        $this->addresslevel3a->HrefValue = "";
        $this->addresslevel3a->TooltipValue = "";

        // addresslevel4a
        $this->addresslevel4a->LinkCustomAttributes = "";
        $this->addresslevel4a->HrefValue = "";
        $this->addresslevel4a->TooltipValue = "";

        // addresslevel5a
        $this->addresslevel5a->LinkCustomAttributes = "";
        $this->addresslevel5a->HrefValue = "";
        $this->addresslevel5a->TooltipValue = "";

        // addresslevel6a
        $this->addresslevel6a->LinkCustomAttributes = "";
        $this->addresslevel6a->HrefValue = "";
        $this->addresslevel6a->TooltipValue = "";

        // addresslevel7a
        $this->addresslevel7a->LinkCustomAttributes = "";
        $this->addresslevel7a->HrefValue = "";
        $this->addresslevel7a->TooltipValue = "";

        // addresslevel8a
        $this->addresslevel8a->LinkCustomAttributes = "";
        $this->addresslevel8a->HrefValue = "";
        $this->addresslevel8a->TooltipValue = "";

        // buildingnumbera
        $this->buildingnumbera->LinkCustomAttributes = "";
        $this->buildingnumbera->HrefValue = "";
        $this->buildingnumbera->TooltipValue = "";

        // localnumbera
        $this->localnumbera->LinkCustomAttributes = "";
        $this->localnumbera->HrefValue = "";
        $this->localnumbera->TooltipValue = "";

        // poboxa
        $this->poboxa->LinkCustomAttributes = "";
        $this->poboxa->HrefValue = "";
        $this->poboxa->TooltipValue = "";

        // phone_extra
        $this->phone_extra->LinkCustomAttributes = "";
        $this->phone_extra->HrefValue = "";
        $this->phone_extra->TooltipValue = "";

        // mobile_extra
        $this->mobile_extra->LinkCustomAttributes = "";
        $this->mobile_extra->HrefValue = "";
        $this->mobile_extra->TooltipValue = "";

        // fax_extra
        $this->fax_extra->LinkCustomAttributes = "";
        $this->fax_extra->HrefValue = "";
        $this->fax_extra->TooltipValue = "";

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

        // leadaddressid
        $this->leadaddressid->EditAttrs["class"] = "form-control";
        $this->leadaddressid->EditCustomAttributes = "";
        $this->leadaddressid->EditValue = $this->leadaddressid->CurrentValue;
        $this->leadaddressid->PlaceHolder = RemoveHtml($this->leadaddressid->caption());

        // phone
        $this->phone->EditAttrs["class"] = "form-control";
        $this->phone->EditCustomAttributes = "";
        if (!$this->phone->Raw) {
            $this->phone->CurrentValue = HtmlDecode($this->phone->CurrentValue);
        }
        $this->phone->EditValue = $this->phone->CurrentValue;
        $this->phone->PlaceHolder = RemoveHtml($this->phone->caption());

        // mobile
        $this->mobile->EditAttrs["class"] = "form-control";
        $this->mobile->EditCustomAttributes = "";
        if (!$this->mobile->Raw) {
            $this->mobile->CurrentValue = HtmlDecode($this->mobile->CurrentValue);
        }
        $this->mobile->EditValue = $this->mobile->CurrentValue;
        $this->mobile->PlaceHolder = RemoveHtml($this->mobile->caption());

        // fax
        $this->fax->EditAttrs["class"] = "form-control";
        $this->fax->EditCustomAttributes = "";
        if (!$this->fax->Raw) {
            $this->fax->CurrentValue = HtmlDecode($this->fax->CurrentValue);
        }
        $this->fax->EditValue = $this->fax->CurrentValue;
        $this->fax->PlaceHolder = RemoveHtml($this->fax->caption());

        // addresslevel1a
        $this->addresslevel1a->EditAttrs["class"] = "form-control";
        $this->addresslevel1a->EditCustomAttributes = "";
        if (!$this->addresslevel1a->Raw) {
            $this->addresslevel1a->CurrentValue = HtmlDecode($this->addresslevel1a->CurrentValue);
        }
        $this->addresslevel1a->EditValue = $this->addresslevel1a->CurrentValue;
        $this->addresslevel1a->PlaceHolder = RemoveHtml($this->addresslevel1a->caption());

        // addresslevel2a
        $this->addresslevel2a->EditAttrs["class"] = "form-control";
        $this->addresslevel2a->EditCustomAttributes = "";
        if (!$this->addresslevel2a->Raw) {
            $this->addresslevel2a->CurrentValue = HtmlDecode($this->addresslevel2a->CurrentValue);
        }
        $this->addresslevel2a->EditValue = $this->addresslevel2a->CurrentValue;
        $this->addresslevel2a->PlaceHolder = RemoveHtml($this->addresslevel2a->caption());

        // addresslevel3a
        $this->addresslevel3a->EditAttrs["class"] = "form-control";
        $this->addresslevel3a->EditCustomAttributes = "";
        if (!$this->addresslevel3a->Raw) {
            $this->addresslevel3a->CurrentValue = HtmlDecode($this->addresslevel3a->CurrentValue);
        }
        $this->addresslevel3a->EditValue = $this->addresslevel3a->CurrentValue;
        $this->addresslevel3a->PlaceHolder = RemoveHtml($this->addresslevel3a->caption());

        // addresslevel4a
        $this->addresslevel4a->EditAttrs["class"] = "form-control";
        $this->addresslevel4a->EditCustomAttributes = "";
        if (!$this->addresslevel4a->Raw) {
            $this->addresslevel4a->CurrentValue = HtmlDecode($this->addresslevel4a->CurrentValue);
        }
        $this->addresslevel4a->EditValue = $this->addresslevel4a->CurrentValue;
        $this->addresslevel4a->PlaceHolder = RemoveHtml($this->addresslevel4a->caption());

        // addresslevel5a
        $this->addresslevel5a->EditAttrs["class"] = "form-control";
        $this->addresslevel5a->EditCustomAttributes = "";
        if (!$this->addresslevel5a->Raw) {
            $this->addresslevel5a->CurrentValue = HtmlDecode($this->addresslevel5a->CurrentValue);
        }
        $this->addresslevel5a->EditValue = $this->addresslevel5a->CurrentValue;
        $this->addresslevel5a->PlaceHolder = RemoveHtml($this->addresslevel5a->caption());

        // addresslevel6a
        $this->addresslevel6a->EditAttrs["class"] = "form-control";
        $this->addresslevel6a->EditCustomAttributes = "";
        if (!$this->addresslevel6a->Raw) {
            $this->addresslevel6a->CurrentValue = HtmlDecode($this->addresslevel6a->CurrentValue);
        }
        $this->addresslevel6a->EditValue = $this->addresslevel6a->CurrentValue;
        $this->addresslevel6a->PlaceHolder = RemoveHtml($this->addresslevel6a->caption());

        // addresslevel7a
        $this->addresslevel7a->EditAttrs["class"] = "form-control";
        $this->addresslevel7a->EditCustomAttributes = "";
        if (!$this->addresslevel7a->Raw) {
            $this->addresslevel7a->CurrentValue = HtmlDecode($this->addresslevel7a->CurrentValue);
        }
        $this->addresslevel7a->EditValue = $this->addresslevel7a->CurrentValue;
        $this->addresslevel7a->PlaceHolder = RemoveHtml($this->addresslevel7a->caption());

        // addresslevel8a
        $this->addresslevel8a->EditAttrs["class"] = "form-control";
        $this->addresslevel8a->EditCustomAttributes = "";
        if (!$this->addresslevel8a->Raw) {
            $this->addresslevel8a->CurrentValue = HtmlDecode($this->addresslevel8a->CurrentValue);
        }
        $this->addresslevel8a->EditValue = $this->addresslevel8a->CurrentValue;
        $this->addresslevel8a->PlaceHolder = RemoveHtml($this->addresslevel8a->caption());

        // buildingnumbera
        $this->buildingnumbera->EditAttrs["class"] = "form-control";
        $this->buildingnumbera->EditCustomAttributes = "";
        if (!$this->buildingnumbera->Raw) {
            $this->buildingnumbera->CurrentValue = HtmlDecode($this->buildingnumbera->CurrentValue);
        }
        $this->buildingnumbera->EditValue = $this->buildingnumbera->CurrentValue;
        $this->buildingnumbera->PlaceHolder = RemoveHtml($this->buildingnumbera->caption());

        // localnumbera
        $this->localnumbera->EditAttrs["class"] = "form-control";
        $this->localnumbera->EditCustomAttributes = "";
        if (!$this->localnumbera->Raw) {
            $this->localnumbera->CurrentValue = HtmlDecode($this->localnumbera->CurrentValue);
        }
        $this->localnumbera->EditValue = $this->localnumbera->CurrentValue;
        $this->localnumbera->PlaceHolder = RemoveHtml($this->localnumbera->caption());

        // poboxa
        $this->poboxa->EditAttrs["class"] = "form-control";
        $this->poboxa->EditCustomAttributes = "";
        if (!$this->poboxa->Raw) {
            $this->poboxa->CurrentValue = HtmlDecode($this->poboxa->CurrentValue);
        }
        $this->poboxa->EditValue = $this->poboxa->CurrentValue;
        $this->poboxa->PlaceHolder = RemoveHtml($this->poboxa->caption());

        // phone_extra
        $this->phone_extra->EditAttrs["class"] = "form-control";
        $this->phone_extra->EditCustomAttributes = "";
        if (!$this->phone_extra->Raw) {
            $this->phone_extra->CurrentValue = HtmlDecode($this->phone_extra->CurrentValue);
        }
        $this->phone_extra->EditValue = $this->phone_extra->CurrentValue;
        $this->phone_extra->PlaceHolder = RemoveHtml($this->phone_extra->caption());

        // mobile_extra
        $this->mobile_extra->EditAttrs["class"] = "form-control";
        $this->mobile_extra->EditCustomAttributes = "";
        if (!$this->mobile_extra->Raw) {
            $this->mobile_extra->CurrentValue = HtmlDecode($this->mobile_extra->CurrentValue);
        }
        $this->mobile_extra->EditValue = $this->mobile_extra->CurrentValue;
        $this->mobile_extra->PlaceHolder = RemoveHtml($this->mobile_extra->caption());

        // fax_extra
        $this->fax_extra->EditAttrs["class"] = "form-control";
        $this->fax_extra->EditCustomAttributes = "";
        if (!$this->fax_extra->Raw) {
            $this->fax_extra->CurrentValue = HtmlDecode($this->fax_extra->CurrentValue);
        }
        $this->fax_extra->EditValue = $this->fax_extra->CurrentValue;
        $this->fax_extra->PlaceHolder = RemoveHtml($this->fax_extra->caption());

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
                    $doc->exportCaption($this->leadaddressid);
                    $doc->exportCaption($this->phone);
                    $doc->exportCaption($this->mobile);
                    $doc->exportCaption($this->fax);
                    $doc->exportCaption($this->addresslevel1a);
                    $doc->exportCaption($this->addresslevel2a);
                    $doc->exportCaption($this->addresslevel3a);
                    $doc->exportCaption($this->addresslevel4a);
                    $doc->exportCaption($this->addresslevel5a);
                    $doc->exportCaption($this->addresslevel6a);
                    $doc->exportCaption($this->addresslevel7a);
                    $doc->exportCaption($this->addresslevel8a);
                    $doc->exportCaption($this->buildingnumbera);
                    $doc->exportCaption($this->localnumbera);
                    $doc->exportCaption($this->poboxa);
                    $doc->exportCaption($this->phone_extra);
                    $doc->exportCaption($this->mobile_extra);
                    $doc->exportCaption($this->fax_extra);
                } else {
                    $doc->exportCaption($this->leadaddressid);
                    $doc->exportCaption($this->phone);
                    $doc->exportCaption($this->mobile);
                    $doc->exportCaption($this->fax);
                    $doc->exportCaption($this->addresslevel1a);
                    $doc->exportCaption($this->addresslevel2a);
                    $doc->exportCaption($this->addresslevel3a);
                    $doc->exportCaption($this->addresslevel4a);
                    $doc->exportCaption($this->addresslevel5a);
                    $doc->exportCaption($this->addresslevel6a);
                    $doc->exportCaption($this->addresslevel7a);
                    $doc->exportCaption($this->addresslevel8a);
                    $doc->exportCaption($this->buildingnumbera);
                    $doc->exportCaption($this->localnumbera);
                    $doc->exportCaption($this->poboxa);
                    $doc->exportCaption($this->phone_extra);
                    $doc->exportCaption($this->mobile_extra);
                    $doc->exportCaption($this->fax_extra);
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
                        $doc->exportField($this->leadaddressid);
                        $doc->exportField($this->phone);
                        $doc->exportField($this->mobile);
                        $doc->exportField($this->fax);
                        $doc->exportField($this->addresslevel1a);
                        $doc->exportField($this->addresslevel2a);
                        $doc->exportField($this->addresslevel3a);
                        $doc->exportField($this->addresslevel4a);
                        $doc->exportField($this->addresslevel5a);
                        $doc->exportField($this->addresslevel6a);
                        $doc->exportField($this->addresslevel7a);
                        $doc->exportField($this->addresslevel8a);
                        $doc->exportField($this->buildingnumbera);
                        $doc->exportField($this->localnumbera);
                        $doc->exportField($this->poboxa);
                        $doc->exportField($this->phone_extra);
                        $doc->exportField($this->mobile_extra);
                        $doc->exportField($this->fax_extra);
                    } else {
                        $doc->exportField($this->leadaddressid);
                        $doc->exportField($this->phone);
                        $doc->exportField($this->mobile);
                        $doc->exportField($this->fax);
                        $doc->exportField($this->addresslevel1a);
                        $doc->exportField($this->addresslevel2a);
                        $doc->exportField($this->addresslevel3a);
                        $doc->exportField($this->addresslevel4a);
                        $doc->exportField($this->addresslevel5a);
                        $doc->exportField($this->addresslevel6a);
                        $doc->exportField($this->addresslevel7a);
                        $doc->exportField($this->addresslevel8a);
                        $doc->exportField($this->buildingnumbera);
                        $doc->exportField($this->localnumbera);
                        $doc->exportField($this->poboxa);
                        $doc->exportField($this->phone_extra);
                        $doc->exportField($this->mobile_extra);
                        $doc->exportField($this->fax_extra);
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
