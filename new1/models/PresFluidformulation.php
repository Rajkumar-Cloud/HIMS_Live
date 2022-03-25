<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for pres_fluidformulation
 */
class PresFluidformulation extends DbTable
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
    public $id;
    public $Tradename;
    public $Itemcode;
    public $Genericname;
    public $Volume;
    public $VolumeUnit;
    public $Strength;
    public $StrengthUnit;
    public $_Route;
    public $Forms;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'pres_fluidformulation';
        $this->TableName = 'pres_fluidformulation';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`pres_fluidformulation`";
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
        $this->id = new DbField('pres_fluidformulation', 'pres_fluidformulation', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['id'] = &$this->id;

        // Tradename
        $this->Tradename = new DbField('pres_fluidformulation', 'pres_fluidformulation', 'x_Tradename', 'Tradename', '`Tradename`', '`Tradename`', 201, -1, -1, false, '`Tradename`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Tradename->Sortable = true; // Allow sort
        $this->Fields['Tradename'] = &$this->Tradename;

        // Itemcode
        $this->Itemcode = new DbField('pres_fluidformulation', 'pres_fluidformulation', 'x_Itemcode', 'Itemcode', '`Itemcode`', '`Itemcode`', 200, 10, -1, false, '`Itemcode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Itemcode->Sortable = true; // Allow sort
        $this->Fields['Itemcode'] = &$this->Itemcode;

        // Genericname
        $this->Genericname = new DbField('pres_fluidformulation', 'pres_fluidformulation', 'x_Genericname', 'Genericname', '`Genericname`', '`Genericname`', 200, 100, -1, false, '`Genericname`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Genericname->Sortable = true; // Allow sort
        $this->Fields['Genericname'] = &$this->Genericname;

        // Volume
        $this->Volume = new DbField('pres_fluidformulation', 'pres_fluidformulation', 'x_Volume', 'Volume', '`Volume`', '`Volume`', 5, 22, -1, false, '`Volume`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Volume->Sortable = true; // Allow sort
        $this->Volume->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Volume->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['Volume'] = &$this->Volume;

        // VolumeUnit
        $this->VolumeUnit = new DbField('pres_fluidformulation', 'pres_fluidformulation', 'x_VolumeUnit', 'VolumeUnit', '`VolumeUnit`', '`VolumeUnit`', 200, 15, -1, false, '`VolumeUnit`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->VolumeUnit->Sortable = true; // Allow sort
        $this->Fields['VolumeUnit'] = &$this->VolumeUnit;

        // Strength
        $this->Strength = new DbField('pres_fluidformulation', 'pres_fluidformulation', 'x_Strength', 'Strength', '`Strength`', '`Strength`', 5, 22, -1, false, '`Strength`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Strength->Sortable = true; // Allow sort
        $this->Strength->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Strength->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['Strength'] = &$this->Strength;

        // StrengthUnit
        $this->StrengthUnit = new DbField('pres_fluidformulation', 'pres_fluidformulation', 'x_StrengthUnit', 'StrengthUnit', '`StrengthUnit`', '`StrengthUnit`', 200, 15, -1, false, '`StrengthUnit`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StrengthUnit->Sortable = true; // Allow sort
        $this->Fields['StrengthUnit'] = &$this->StrengthUnit;

        // Route
        $this->_Route = new DbField('pres_fluidformulation', 'pres_fluidformulation', 'x__Route', 'Route', '`Route`', '`Route`', 200, 10, -1, false, '`Route`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->_Route->Sortable = true; // Allow sort
        $this->Fields['Route'] = &$this->_Route;

        // Forms
        $this->Forms = new DbField('pres_fluidformulation', 'pres_fluidformulation', 'x_Forms', 'Forms', '`Forms`', '`Forms`', 200, 10, -1, false, '`Forms`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Forms->Sortable = true; // Allow sort
        $this->Fields['Forms'] = &$this->Forms;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`pres_fluidformulation`";
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
        $this->Tradename->DbValue = $row['Tradename'];
        $this->Itemcode->DbValue = $row['Itemcode'];
        $this->Genericname->DbValue = $row['Genericname'];
        $this->Volume->DbValue = $row['Volume'];
        $this->VolumeUnit->DbValue = $row['VolumeUnit'];
        $this->Strength->DbValue = $row['Strength'];
        $this->StrengthUnit->DbValue = $row['StrengthUnit'];
        $this->_Route->DbValue = $row['Route'];
        $this->Forms->DbValue = $row['Forms'];
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
        $name = PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL");
        // Get referer URL automatically
        if (ReferUrl() != "" && ReferPageName() != CurrentPageName() && ReferPageName() != "login") { // Referer not same page or login page
            $_SESSION[$name] = ReferUrl(); // Save to Session
        }
        if (@$_SESSION[$name] != "") {
            return $_SESSION[$name];
        } else {
            return GetUrl("PresFluidformulationList");
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
        if ($pageName == "PresFluidformulationView") {
            return $Language->phrase("View");
        } elseif ($pageName == "PresFluidformulationEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "PresFluidformulationAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "PresFluidformulationList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("PresFluidformulationView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("PresFluidformulationView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "PresFluidformulationAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "PresFluidformulationAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("PresFluidformulationEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("PresFluidformulationAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("PresFluidformulationDelete", $this->getUrlParm());
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
        $this->Tradename->setDbValue($row['Tradename']);
        $this->Itemcode->setDbValue($row['Itemcode']);
        $this->Genericname->setDbValue($row['Genericname']);
        $this->Volume->setDbValue($row['Volume']);
        $this->VolumeUnit->setDbValue($row['VolumeUnit']);
        $this->Strength->setDbValue($row['Strength']);
        $this->StrengthUnit->setDbValue($row['StrengthUnit']);
        $this->_Route->setDbValue($row['Route']);
        $this->Forms->setDbValue($row['Forms']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // Tradename

        // Itemcode

        // Genericname

        // Volume

        // VolumeUnit

        // Strength

        // StrengthUnit

        // Route

        // Forms

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // Tradename
        $this->Tradename->ViewValue = $this->Tradename->CurrentValue;
        $this->Tradename->ViewCustomAttributes = "";

        // Itemcode
        $this->Itemcode->ViewValue = $this->Itemcode->CurrentValue;
        $this->Itemcode->ViewCustomAttributes = "";

        // Genericname
        $this->Genericname->ViewValue = $this->Genericname->CurrentValue;
        $this->Genericname->ViewCustomAttributes = "";

        // Volume
        $this->Volume->ViewValue = $this->Volume->CurrentValue;
        $this->Volume->ViewValue = FormatNumber($this->Volume->ViewValue, 2, -2, -2, -2);
        $this->Volume->ViewCustomAttributes = "";

        // VolumeUnit
        $this->VolumeUnit->ViewValue = $this->VolumeUnit->CurrentValue;
        $this->VolumeUnit->ViewCustomAttributes = "";

        // Strength
        $this->Strength->ViewValue = $this->Strength->CurrentValue;
        $this->Strength->ViewValue = FormatNumber($this->Strength->ViewValue, 2, -2, -2, -2);
        $this->Strength->ViewCustomAttributes = "";

        // StrengthUnit
        $this->StrengthUnit->ViewValue = $this->StrengthUnit->CurrentValue;
        $this->StrengthUnit->ViewCustomAttributes = "";

        // Route
        $this->_Route->ViewValue = $this->_Route->CurrentValue;
        $this->_Route->ViewCustomAttributes = "";

        // Forms
        $this->Forms->ViewValue = $this->Forms->CurrentValue;
        $this->Forms->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // Tradename
        $this->Tradename->LinkCustomAttributes = "";
        $this->Tradename->HrefValue = "";
        $this->Tradename->TooltipValue = "";

        // Itemcode
        $this->Itemcode->LinkCustomAttributes = "";
        $this->Itemcode->HrefValue = "";
        $this->Itemcode->TooltipValue = "";

        // Genericname
        $this->Genericname->LinkCustomAttributes = "";
        $this->Genericname->HrefValue = "";
        $this->Genericname->TooltipValue = "";

        // Volume
        $this->Volume->LinkCustomAttributes = "";
        $this->Volume->HrefValue = "";
        $this->Volume->TooltipValue = "";

        // VolumeUnit
        $this->VolumeUnit->LinkCustomAttributes = "";
        $this->VolumeUnit->HrefValue = "";
        $this->VolumeUnit->TooltipValue = "";

        // Strength
        $this->Strength->LinkCustomAttributes = "";
        $this->Strength->HrefValue = "";
        $this->Strength->TooltipValue = "";

        // StrengthUnit
        $this->StrengthUnit->LinkCustomAttributes = "";
        $this->StrengthUnit->HrefValue = "";
        $this->StrengthUnit->TooltipValue = "";

        // Route
        $this->_Route->LinkCustomAttributes = "";
        $this->_Route->HrefValue = "";
        $this->_Route->TooltipValue = "";

        // Forms
        $this->Forms->LinkCustomAttributes = "";
        $this->Forms->HrefValue = "";
        $this->Forms->TooltipValue = "";

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

        // Tradename
        $this->Tradename->EditAttrs["class"] = "form-control";
        $this->Tradename->EditCustomAttributes = "";
        $this->Tradename->EditValue = $this->Tradename->CurrentValue;
        $this->Tradename->PlaceHolder = RemoveHtml($this->Tradename->caption());

        // Itemcode
        $this->Itemcode->EditAttrs["class"] = "form-control";
        $this->Itemcode->EditCustomAttributes = "";
        if (!$this->Itemcode->Raw) {
            $this->Itemcode->CurrentValue = HtmlDecode($this->Itemcode->CurrentValue);
        }
        $this->Itemcode->EditValue = $this->Itemcode->CurrentValue;
        $this->Itemcode->PlaceHolder = RemoveHtml($this->Itemcode->caption());

        // Genericname
        $this->Genericname->EditAttrs["class"] = "form-control";
        $this->Genericname->EditCustomAttributes = "";
        if (!$this->Genericname->Raw) {
            $this->Genericname->CurrentValue = HtmlDecode($this->Genericname->CurrentValue);
        }
        $this->Genericname->EditValue = $this->Genericname->CurrentValue;
        $this->Genericname->PlaceHolder = RemoveHtml($this->Genericname->caption());

        // Volume
        $this->Volume->EditAttrs["class"] = "form-control";
        $this->Volume->EditCustomAttributes = "";
        $this->Volume->EditValue = $this->Volume->CurrentValue;
        $this->Volume->PlaceHolder = RemoveHtml($this->Volume->caption());
        if (strval($this->Volume->EditValue) != "" && is_numeric($this->Volume->EditValue)) {
            $this->Volume->EditValue = FormatNumber($this->Volume->EditValue, -2, -2, -2, -2);
        }

        // VolumeUnit
        $this->VolumeUnit->EditAttrs["class"] = "form-control";
        $this->VolumeUnit->EditCustomAttributes = "";
        if (!$this->VolumeUnit->Raw) {
            $this->VolumeUnit->CurrentValue = HtmlDecode($this->VolumeUnit->CurrentValue);
        }
        $this->VolumeUnit->EditValue = $this->VolumeUnit->CurrentValue;
        $this->VolumeUnit->PlaceHolder = RemoveHtml($this->VolumeUnit->caption());

        // Strength
        $this->Strength->EditAttrs["class"] = "form-control";
        $this->Strength->EditCustomAttributes = "";
        $this->Strength->EditValue = $this->Strength->CurrentValue;
        $this->Strength->PlaceHolder = RemoveHtml($this->Strength->caption());
        if (strval($this->Strength->EditValue) != "" && is_numeric($this->Strength->EditValue)) {
            $this->Strength->EditValue = FormatNumber($this->Strength->EditValue, -2, -2, -2, -2);
        }

        // StrengthUnit
        $this->StrengthUnit->EditAttrs["class"] = "form-control";
        $this->StrengthUnit->EditCustomAttributes = "";
        if (!$this->StrengthUnit->Raw) {
            $this->StrengthUnit->CurrentValue = HtmlDecode($this->StrengthUnit->CurrentValue);
        }
        $this->StrengthUnit->EditValue = $this->StrengthUnit->CurrentValue;
        $this->StrengthUnit->PlaceHolder = RemoveHtml($this->StrengthUnit->caption());

        // Route
        $this->_Route->EditAttrs["class"] = "form-control";
        $this->_Route->EditCustomAttributes = "";
        if (!$this->_Route->Raw) {
            $this->_Route->CurrentValue = HtmlDecode($this->_Route->CurrentValue);
        }
        $this->_Route->EditValue = $this->_Route->CurrentValue;
        $this->_Route->PlaceHolder = RemoveHtml($this->_Route->caption());

        // Forms
        $this->Forms->EditAttrs["class"] = "form-control";
        $this->Forms->EditCustomAttributes = "";
        if (!$this->Forms->Raw) {
            $this->Forms->CurrentValue = HtmlDecode($this->Forms->CurrentValue);
        }
        $this->Forms->EditValue = $this->Forms->CurrentValue;
        $this->Forms->PlaceHolder = RemoveHtml($this->Forms->caption());

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
                    $doc->exportCaption($this->Tradename);
                    $doc->exportCaption($this->Itemcode);
                    $doc->exportCaption($this->Genericname);
                    $doc->exportCaption($this->Volume);
                    $doc->exportCaption($this->VolumeUnit);
                    $doc->exportCaption($this->Strength);
                    $doc->exportCaption($this->StrengthUnit);
                    $doc->exportCaption($this->_Route);
                    $doc->exportCaption($this->Forms);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->Itemcode);
                    $doc->exportCaption($this->Genericname);
                    $doc->exportCaption($this->Volume);
                    $doc->exportCaption($this->VolumeUnit);
                    $doc->exportCaption($this->Strength);
                    $doc->exportCaption($this->StrengthUnit);
                    $doc->exportCaption($this->_Route);
                    $doc->exportCaption($this->Forms);
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
                        $doc->exportField($this->Tradename);
                        $doc->exportField($this->Itemcode);
                        $doc->exportField($this->Genericname);
                        $doc->exportField($this->Volume);
                        $doc->exportField($this->VolumeUnit);
                        $doc->exportField($this->Strength);
                        $doc->exportField($this->StrengthUnit);
                        $doc->exportField($this->_Route);
                        $doc->exportField($this->Forms);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->Itemcode);
                        $doc->exportField($this->Genericname);
                        $doc->exportField($this->Volume);
                        $doc->exportField($this->VolumeUnit);
                        $doc->exportField($this->Strength);
                        $doc->exportField($this->StrengthUnit);
                        $doc->exportField($this->_Route);
                        $doc->exportField($this->Forms);
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
