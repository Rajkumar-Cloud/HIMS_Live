<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for pres_genericinteractions
 */
class PresGenericinteractions extends DbTable
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
    public $Genericname;
    public $Catid;
    public $Interactions;
    public $Intid;
    public $Createddt;
    public $Createdtm;
    public $Statusbit;
    public $Remarks;
    public $_Username;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'pres_genericinteractions';
        $this->TableName = 'pres_genericinteractions';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`pres_genericinteractions`";
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
        $this->id = new DbField('pres_genericinteractions', 'pres_genericinteractions', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['id'] = &$this->id;

        // Genericname
        $this->Genericname = new DbField('pres_genericinteractions', 'pres_genericinteractions', 'x_Genericname', 'Genericname', '`Genericname`', '`Genericname`', 200, 50, -1, false, '`Genericname`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Genericname->Sortable = true; // Allow sort
        $this->Fields['Genericname'] = &$this->Genericname;

        // Catid
        $this->Catid = new DbField('pres_genericinteractions', 'pres_genericinteractions', 'x_Catid', 'Catid', '`Catid`', '`Catid`', 3, 11, -1, false, '`Catid`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Catid->Sortable = true; // Allow sort
        $this->Catid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['Catid'] = &$this->Catid;

        // Interactions
        $this->Interactions = new DbField('pres_genericinteractions', 'pres_genericinteractions', 'x_Interactions', 'Interactions', '`Interactions`', '`Interactions`', 200, 50, -1, false, '`Interactions`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Interactions->Sortable = true; // Allow sort
        $this->Fields['Interactions'] = &$this->Interactions;

        // Intid
        $this->Intid = new DbField('pres_genericinteractions', 'pres_genericinteractions', 'x_Intid', 'Intid', '`Intid`', '`Intid`', 3, 11, -1, false, '`Intid`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Intid->Sortable = true; // Allow sort
        $this->Intid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['Intid'] = &$this->Intid;

        // Createddt
        $this->Createddt = new DbField('pres_genericinteractions', 'pres_genericinteractions', 'x_Createddt', 'Createddt', '`Createddt`', CastDateFieldForLike("`Createddt`", 0, "DB"), 133, 10, 0, false, '`Createddt`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Createddt->Sortable = true; // Allow sort
        $this->Createddt->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['Createddt'] = &$this->Createddt;

        // Createdtm
        $this->Createdtm = new DbField('pres_genericinteractions', 'pres_genericinteractions', 'x_Createdtm', 'Createdtm', '`Createdtm`', CastDateFieldForLike("`Createdtm`", 4, "DB"), 134, 10, 4, false, '`Createdtm`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Createdtm->Sortable = true; // Allow sort
        $this->Createdtm->DefaultErrorMessage = str_replace("%s", $GLOBALS["TIME_SEPARATOR"], $Language->phrase("IncorrectTime"));
        $this->Fields['Createdtm'] = &$this->Createdtm;

        // Statusbit
        $this->Statusbit = new DbField('pres_genericinteractions', 'pres_genericinteractions', 'x_Statusbit', 'Statusbit', '`Statusbit`', '`Statusbit`', 3, 11, -1, false, '`Statusbit`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Statusbit->Sortable = true; // Allow sort
        $this->Statusbit->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['Statusbit'] = &$this->Statusbit;

        // Remarks
        $this->Remarks = new DbField('pres_genericinteractions', 'pres_genericinteractions', 'x_Remarks', 'Remarks', '`Remarks`', '`Remarks`', 201, 500, -1, false, '`Remarks`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Remarks->Sortable = true; // Allow sort
        $this->Fields['Remarks'] = &$this->Remarks;

        // Username
        $this->_Username = new DbField('pres_genericinteractions', 'pres_genericinteractions', 'x__Username', 'Username', '`Username`', '`Username`', 200, 50, -1, false, '`Username`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->_Username->Sortable = true; // Allow sort
        $this->Fields['Username'] = &$this->_Username;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`pres_genericinteractions`";
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
        $this->Genericname->DbValue = $row['Genericname'];
        $this->Catid->DbValue = $row['Catid'];
        $this->Interactions->DbValue = $row['Interactions'];
        $this->Intid->DbValue = $row['Intid'];
        $this->Createddt->DbValue = $row['Createddt'];
        $this->Createdtm->DbValue = $row['Createdtm'];
        $this->Statusbit->DbValue = $row['Statusbit'];
        $this->Remarks->DbValue = $row['Remarks'];
        $this->_Username->DbValue = $row['Username'];
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
            return GetUrl("PresGenericinteractionsList");
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
        if ($pageName == "PresGenericinteractionsView") {
            return $Language->phrase("View");
        } elseif ($pageName == "PresGenericinteractionsEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "PresGenericinteractionsAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "PresGenericinteractionsList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("PresGenericinteractionsView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("PresGenericinteractionsView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "PresGenericinteractionsAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "PresGenericinteractionsAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("PresGenericinteractionsEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("PresGenericinteractionsAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("PresGenericinteractionsDelete", $this->getUrlParm());
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
        $this->Genericname->setDbValue($row['Genericname']);
        $this->Catid->setDbValue($row['Catid']);
        $this->Interactions->setDbValue($row['Interactions']);
        $this->Intid->setDbValue($row['Intid']);
        $this->Createddt->setDbValue($row['Createddt']);
        $this->Createdtm->setDbValue($row['Createdtm']);
        $this->Statusbit->setDbValue($row['Statusbit']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->_Username->setDbValue($row['Username']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // Genericname

        // Catid

        // Interactions

        // Intid

        // Createddt

        // Createdtm

        // Statusbit

        // Remarks

        // Username

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // Genericname
        $this->Genericname->ViewValue = $this->Genericname->CurrentValue;
        $this->Genericname->ViewCustomAttributes = "";

        // Catid
        $this->Catid->ViewValue = $this->Catid->CurrentValue;
        $this->Catid->ViewValue = FormatNumber($this->Catid->ViewValue, 0, -2, -2, -2);
        $this->Catid->ViewCustomAttributes = "";

        // Interactions
        $this->Interactions->ViewValue = $this->Interactions->CurrentValue;
        $this->Interactions->ViewCustomAttributes = "";

        // Intid
        $this->Intid->ViewValue = $this->Intid->CurrentValue;
        $this->Intid->ViewValue = FormatNumber($this->Intid->ViewValue, 0, -2, -2, -2);
        $this->Intid->ViewCustomAttributes = "";

        // Createddt
        $this->Createddt->ViewValue = $this->Createddt->CurrentValue;
        $this->Createddt->ViewValue = FormatDateTime($this->Createddt->ViewValue, 0);
        $this->Createddt->ViewCustomAttributes = "";

        // Createdtm
        $this->Createdtm->ViewValue = $this->Createdtm->CurrentValue;
        $this->Createdtm->ViewValue = FormatDateTime($this->Createdtm->ViewValue, 4);
        $this->Createdtm->ViewCustomAttributes = "";

        // Statusbit
        $this->Statusbit->ViewValue = $this->Statusbit->CurrentValue;
        $this->Statusbit->ViewValue = FormatNumber($this->Statusbit->ViewValue, 0, -2, -2, -2);
        $this->Statusbit->ViewCustomAttributes = "";

        // Remarks
        $this->Remarks->ViewValue = $this->Remarks->CurrentValue;
        $this->Remarks->ViewCustomAttributes = "";

        // Username
        $this->_Username->ViewValue = $this->_Username->CurrentValue;
        $this->_Username->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // Genericname
        $this->Genericname->LinkCustomAttributes = "";
        $this->Genericname->HrefValue = "";
        $this->Genericname->TooltipValue = "";

        // Catid
        $this->Catid->LinkCustomAttributes = "";
        $this->Catid->HrefValue = "";
        $this->Catid->TooltipValue = "";

        // Interactions
        $this->Interactions->LinkCustomAttributes = "";
        $this->Interactions->HrefValue = "";
        $this->Interactions->TooltipValue = "";

        // Intid
        $this->Intid->LinkCustomAttributes = "";
        $this->Intid->HrefValue = "";
        $this->Intid->TooltipValue = "";

        // Createddt
        $this->Createddt->LinkCustomAttributes = "";
        $this->Createddt->HrefValue = "";
        $this->Createddt->TooltipValue = "";

        // Createdtm
        $this->Createdtm->LinkCustomAttributes = "";
        $this->Createdtm->HrefValue = "";
        $this->Createdtm->TooltipValue = "";

        // Statusbit
        $this->Statusbit->LinkCustomAttributes = "";
        $this->Statusbit->HrefValue = "";
        $this->Statusbit->TooltipValue = "";

        // Remarks
        $this->Remarks->LinkCustomAttributes = "";
        $this->Remarks->HrefValue = "";
        $this->Remarks->TooltipValue = "";

        // Username
        $this->_Username->LinkCustomAttributes = "";
        $this->_Username->HrefValue = "";
        $this->_Username->TooltipValue = "";

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

        // Genericname
        $this->Genericname->EditAttrs["class"] = "form-control";
        $this->Genericname->EditCustomAttributes = "";
        if (!$this->Genericname->Raw) {
            $this->Genericname->CurrentValue = HtmlDecode($this->Genericname->CurrentValue);
        }
        $this->Genericname->EditValue = $this->Genericname->CurrentValue;
        $this->Genericname->PlaceHolder = RemoveHtml($this->Genericname->caption());

        // Catid
        $this->Catid->EditAttrs["class"] = "form-control";
        $this->Catid->EditCustomAttributes = "";
        $this->Catid->EditValue = $this->Catid->CurrentValue;
        $this->Catid->PlaceHolder = RemoveHtml($this->Catid->caption());

        // Interactions
        $this->Interactions->EditAttrs["class"] = "form-control";
        $this->Interactions->EditCustomAttributes = "";
        if (!$this->Interactions->Raw) {
            $this->Interactions->CurrentValue = HtmlDecode($this->Interactions->CurrentValue);
        }
        $this->Interactions->EditValue = $this->Interactions->CurrentValue;
        $this->Interactions->PlaceHolder = RemoveHtml($this->Interactions->caption());

        // Intid
        $this->Intid->EditAttrs["class"] = "form-control";
        $this->Intid->EditCustomAttributes = "";
        $this->Intid->EditValue = $this->Intid->CurrentValue;
        $this->Intid->PlaceHolder = RemoveHtml($this->Intid->caption());

        // Createddt
        $this->Createddt->EditAttrs["class"] = "form-control";
        $this->Createddt->EditCustomAttributes = "";
        $this->Createddt->EditValue = FormatDateTime($this->Createddt->CurrentValue, 8);
        $this->Createddt->PlaceHolder = RemoveHtml($this->Createddt->caption());

        // Createdtm
        $this->Createdtm->EditAttrs["class"] = "form-control";
        $this->Createdtm->EditCustomAttributes = "";
        $this->Createdtm->EditValue = $this->Createdtm->CurrentValue;
        $this->Createdtm->PlaceHolder = RemoveHtml($this->Createdtm->caption());

        // Statusbit
        $this->Statusbit->EditAttrs["class"] = "form-control";
        $this->Statusbit->EditCustomAttributes = "";
        $this->Statusbit->EditValue = $this->Statusbit->CurrentValue;
        $this->Statusbit->PlaceHolder = RemoveHtml($this->Statusbit->caption());

        // Remarks
        $this->Remarks->EditAttrs["class"] = "form-control";
        $this->Remarks->EditCustomAttributes = "";
        $this->Remarks->EditValue = $this->Remarks->CurrentValue;
        $this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

        // Username
        $this->_Username->EditAttrs["class"] = "form-control";
        $this->_Username->EditCustomAttributes = "";
        if (!$this->_Username->Raw) {
            $this->_Username->CurrentValue = HtmlDecode($this->_Username->CurrentValue);
        }
        $this->_Username->EditValue = $this->_Username->CurrentValue;
        $this->_Username->PlaceHolder = RemoveHtml($this->_Username->caption());

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
                    $doc->exportCaption($this->Genericname);
                    $doc->exportCaption($this->Catid);
                    $doc->exportCaption($this->Interactions);
                    $doc->exportCaption($this->Intid);
                    $doc->exportCaption($this->Createddt);
                    $doc->exportCaption($this->Createdtm);
                    $doc->exportCaption($this->Statusbit);
                    $doc->exportCaption($this->Remarks);
                    $doc->exportCaption($this->_Username);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->Genericname);
                    $doc->exportCaption($this->Catid);
                    $doc->exportCaption($this->Interactions);
                    $doc->exportCaption($this->Intid);
                    $doc->exportCaption($this->Createddt);
                    $doc->exportCaption($this->Createdtm);
                    $doc->exportCaption($this->Statusbit);
                    $doc->exportCaption($this->_Username);
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
                        $doc->exportField($this->Genericname);
                        $doc->exportField($this->Catid);
                        $doc->exportField($this->Interactions);
                        $doc->exportField($this->Intid);
                        $doc->exportField($this->Createddt);
                        $doc->exportField($this->Createdtm);
                        $doc->exportField($this->Statusbit);
                        $doc->exportField($this->Remarks);
                        $doc->exportField($this->_Username);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->Genericname);
                        $doc->exportField($this->Catid);
                        $doc->exportField($this->Interactions);
                        $doc->exportField($this->Intid);
                        $doc->exportField($this->Createddt);
                        $doc->exportField($this->Createdtm);
                        $doc->exportField($this->Statusbit);
                        $doc->exportField($this->_Username);
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
