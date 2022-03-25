<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for lab_drug_mast
 */
class LabDrugMast extends DbTable
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
    public $DrugName;
    public $Positive;
    public $Negative;
    public $ShortName;
    public $GroupCD;
    public $_Content;
    public $Order;
    public $DrugCD;
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
        $this->TableVar = 'lab_drug_mast';
        $this->TableName = 'lab_drug_mast';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`lab_drug_mast`";
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

        // DrugName
        $this->DrugName = new DbField('lab_drug_mast', 'lab_drug_mast', 'x_DrugName', 'DrugName', '`DrugName`', '`DrugName`', 200, 100, -1, false, '`DrugName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DrugName->Nullable = false; // NOT NULL field
        $this->DrugName->Required = true; // Required field
        $this->DrugName->Sortable = true; // Allow sort
        $this->Fields['DrugName'] = &$this->DrugName;

        // Positive
        $this->Positive = new DbField('lab_drug_mast', 'lab_drug_mast', 'x_Positive', 'Positive', '`Positive`', '`Positive`', 200, 1, -1, false, '`Positive`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Positive->Nullable = false; // NOT NULL field
        $this->Positive->Required = true; // Required field
        $this->Positive->Sortable = true; // Allow sort
        $this->Fields['Positive'] = &$this->Positive;

        // Negative
        $this->Negative = new DbField('lab_drug_mast', 'lab_drug_mast', 'x_Negative', 'Negative', '`Negative`', '`Negative`', 200, 1, -1, false, '`Negative`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Negative->Nullable = false; // NOT NULL field
        $this->Negative->Required = true; // Required field
        $this->Negative->Sortable = true; // Allow sort
        $this->Fields['Negative'] = &$this->Negative;

        // ShortName
        $this->ShortName = new DbField('lab_drug_mast', 'lab_drug_mast', 'x_ShortName', 'ShortName', '`ShortName`', '`ShortName`', 200, 5, -1, false, '`ShortName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ShortName->Nullable = false; // NOT NULL field
        $this->ShortName->Required = true; // Required field
        $this->ShortName->Sortable = true; // Allow sort
        $this->Fields['ShortName'] = &$this->ShortName;

        // GroupCD
        $this->GroupCD = new DbField('lab_drug_mast', 'lab_drug_mast', 'x_GroupCD', 'GroupCD', '`GroupCD`', '`GroupCD`', 200, 3, -1, false, '`GroupCD`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GroupCD->Nullable = false; // NOT NULL field
        $this->GroupCD->Required = true; // Required field
        $this->GroupCD->Sortable = true; // Allow sort
        $this->Fields['GroupCD'] = &$this->GroupCD;

        // Content
        $this->_Content = new DbField('lab_drug_mast', 'lab_drug_mast', 'x__Content', 'Content', '`Content`', '`Content`', 200, 50, -1, false, '`Content`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->_Content->Nullable = false; // NOT NULL field
        $this->_Content->Required = true; // Required field
        $this->_Content->Sortable = true; // Allow sort
        $this->Fields['Content'] = &$this->_Content;

        // Order
        $this->Order = new DbField('lab_drug_mast', 'lab_drug_mast', 'x_Order', 'Order', '`Order`', '`Order`', 131, 3, -1, false, '`Order`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Order->Nullable = false; // NOT NULL field
        $this->Order->Required = true; // Required field
        $this->Order->Sortable = true; // Allow sort
        $this->Order->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Order->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['Order'] = &$this->Order;

        // DrugCD
        $this->DrugCD = new DbField('lab_drug_mast', 'lab_drug_mast', 'x_DrugCD', 'DrugCD', '`DrugCD`', '`DrugCD`', 200, 3, -1, false, '`DrugCD`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DrugCD->Nullable = false; // NOT NULL field
        $this->DrugCD->Required = true; // Required field
        $this->DrugCD->Sortable = true; // Allow sort
        $this->Fields['DrugCD'] = &$this->DrugCD;

        // id
        $this->id = new DbField('lab_drug_mast', 'lab_drug_mast', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`lab_drug_mast`";
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
        $this->DrugName->DbValue = $row['DrugName'];
        $this->Positive->DbValue = $row['Positive'];
        $this->Negative->DbValue = $row['Negative'];
        $this->ShortName->DbValue = $row['ShortName'];
        $this->GroupCD->DbValue = $row['GroupCD'];
        $this->_Content->DbValue = $row['Content'];
        $this->Order->DbValue = $row['Order'];
        $this->DrugCD->DbValue = $row['DrugCD'];
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
            return GetUrl("LabDrugMastList");
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
        if ($pageName == "LabDrugMastView") {
            return $Language->phrase("View");
        } elseif ($pageName == "LabDrugMastEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "LabDrugMastAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "LabDrugMastList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("LabDrugMastView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("LabDrugMastView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "LabDrugMastAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "LabDrugMastAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("LabDrugMastEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("LabDrugMastAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("LabDrugMastDelete", $this->getUrlParm());
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
        $this->DrugName->setDbValue($row['DrugName']);
        $this->Positive->setDbValue($row['Positive']);
        $this->Negative->setDbValue($row['Negative']);
        $this->ShortName->setDbValue($row['ShortName']);
        $this->GroupCD->setDbValue($row['GroupCD']);
        $this->_Content->setDbValue($row['Content']);
        $this->Order->setDbValue($row['Order']);
        $this->DrugCD->setDbValue($row['DrugCD']);
        $this->id->setDbValue($row['id']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // DrugName

        // Positive

        // Negative

        // ShortName

        // GroupCD

        // Content

        // Order

        // DrugCD

        // id

        // DrugName
        $this->DrugName->ViewValue = $this->DrugName->CurrentValue;
        $this->DrugName->ViewCustomAttributes = "";

        // Positive
        $this->Positive->ViewValue = $this->Positive->CurrentValue;
        $this->Positive->ViewCustomAttributes = "";

        // Negative
        $this->Negative->ViewValue = $this->Negative->CurrentValue;
        $this->Negative->ViewCustomAttributes = "";

        // ShortName
        $this->ShortName->ViewValue = $this->ShortName->CurrentValue;
        $this->ShortName->ViewCustomAttributes = "";

        // GroupCD
        $this->GroupCD->ViewValue = $this->GroupCD->CurrentValue;
        $this->GroupCD->ViewCustomAttributes = "";

        // Content
        $this->_Content->ViewValue = $this->_Content->CurrentValue;
        $this->_Content->ViewCustomAttributes = "";

        // Order
        $this->Order->ViewValue = $this->Order->CurrentValue;
        $this->Order->ViewValue = FormatNumber($this->Order->ViewValue, 2, -2, -2, -2);
        $this->Order->ViewCustomAttributes = "";

        // DrugCD
        $this->DrugCD->ViewValue = $this->DrugCD->CurrentValue;
        $this->DrugCD->ViewCustomAttributes = "";

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // DrugName
        $this->DrugName->LinkCustomAttributes = "";
        $this->DrugName->HrefValue = "";
        $this->DrugName->TooltipValue = "";

        // Positive
        $this->Positive->LinkCustomAttributes = "";
        $this->Positive->HrefValue = "";
        $this->Positive->TooltipValue = "";

        // Negative
        $this->Negative->LinkCustomAttributes = "";
        $this->Negative->HrefValue = "";
        $this->Negative->TooltipValue = "";

        // ShortName
        $this->ShortName->LinkCustomAttributes = "";
        $this->ShortName->HrefValue = "";
        $this->ShortName->TooltipValue = "";

        // GroupCD
        $this->GroupCD->LinkCustomAttributes = "";
        $this->GroupCD->HrefValue = "";
        $this->GroupCD->TooltipValue = "";

        // Content
        $this->_Content->LinkCustomAttributes = "";
        $this->_Content->HrefValue = "";
        $this->_Content->TooltipValue = "";

        // Order
        $this->Order->LinkCustomAttributes = "";
        $this->Order->HrefValue = "";
        $this->Order->TooltipValue = "";

        // DrugCD
        $this->DrugCD->LinkCustomAttributes = "";
        $this->DrugCD->HrefValue = "";
        $this->DrugCD->TooltipValue = "";

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

        // DrugName
        $this->DrugName->EditAttrs["class"] = "form-control";
        $this->DrugName->EditCustomAttributes = "";
        if (!$this->DrugName->Raw) {
            $this->DrugName->CurrentValue = HtmlDecode($this->DrugName->CurrentValue);
        }
        $this->DrugName->EditValue = $this->DrugName->CurrentValue;
        $this->DrugName->PlaceHolder = RemoveHtml($this->DrugName->caption());

        // Positive
        $this->Positive->EditAttrs["class"] = "form-control";
        $this->Positive->EditCustomAttributes = "";
        if (!$this->Positive->Raw) {
            $this->Positive->CurrentValue = HtmlDecode($this->Positive->CurrentValue);
        }
        $this->Positive->EditValue = $this->Positive->CurrentValue;
        $this->Positive->PlaceHolder = RemoveHtml($this->Positive->caption());

        // Negative
        $this->Negative->EditAttrs["class"] = "form-control";
        $this->Negative->EditCustomAttributes = "";
        if (!$this->Negative->Raw) {
            $this->Negative->CurrentValue = HtmlDecode($this->Negative->CurrentValue);
        }
        $this->Negative->EditValue = $this->Negative->CurrentValue;
        $this->Negative->PlaceHolder = RemoveHtml($this->Negative->caption());

        // ShortName
        $this->ShortName->EditAttrs["class"] = "form-control";
        $this->ShortName->EditCustomAttributes = "";
        if (!$this->ShortName->Raw) {
            $this->ShortName->CurrentValue = HtmlDecode($this->ShortName->CurrentValue);
        }
        $this->ShortName->EditValue = $this->ShortName->CurrentValue;
        $this->ShortName->PlaceHolder = RemoveHtml($this->ShortName->caption());

        // GroupCD
        $this->GroupCD->EditAttrs["class"] = "form-control";
        $this->GroupCD->EditCustomAttributes = "";
        if (!$this->GroupCD->Raw) {
            $this->GroupCD->CurrentValue = HtmlDecode($this->GroupCD->CurrentValue);
        }
        $this->GroupCD->EditValue = $this->GroupCD->CurrentValue;
        $this->GroupCD->PlaceHolder = RemoveHtml($this->GroupCD->caption());

        // Content
        $this->_Content->EditAttrs["class"] = "form-control";
        $this->_Content->EditCustomAttributes = "";
        if (!$this->_Content->Raw) {
            $this->_Content->CurrentValue = HtmlDecode($this->_Content->CurrentValue);
        }
        $this->_Content->EditValue = $this->_Content->CurrentValue;
        $this->_Content->PlaceHolder = RemoveHtml($this->_Content->caption());

        // Order
        $this->Order->EditAttrs["class"] = "form-control";
        $this->Order->EditCustomAttributes = "";
        $this->Order->EditValue = $this->Order->CurrentValue;
        $this->Order->PlaceHolder = RemoveHtml($this->Order->caption());
        if (strval($this->Order->EditValue) != "" && is_numeric($this->Order->EditValue)) {
            $this->Order->EditValue = FormatNumber($this->Order->EditValue, -2, -2, -2, -2);
        }

        // DrugCD
        $this->DrugCD->EditAttrs["class"] = "form-control";
        $this->DrugCD->EditCustomAttributes = "";
        if (!$this->DrugCD->Raw) {
            $this->DrugCD->CurrentValue = HtmlDecode($this->DrugCD->CurrentValue);
        }
        $this->DrugCD->EditValue = $this->DrugCD->CurrentValue;
        $this->DrugCD->PlaceHolder = RemoveHtml($this->DrugCD->caption());

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
                    $doc->exportCaption($this->DrugName);
                    $doc->exportCaption($this->Positive);
                    $doc->exportCaption($this->Negative);
                    $doc->exportCaption($this->ShortName);
                    $doc->exportCaption($this->GroupCD);
                    $doc->exportCaption($this->_Content);
                    $doc->exportCaption($this->Order);
                    $doc->exportCaption($this->DrugCD);
                    $doc->exportCaption($this->id);
                } else {
                    $doc->exportCaption($this->DrugName);
                    $doc->exportCaption($this->Positive);
                    $doc->exportCaption($this->Negative);
                    $doc->exportCaption($this->ShortName);
                    $doc->exportCaption($this->GroupCD);
                    $doc->exportCaption($this->_Content);
                    $doc->exportCaption($this->Order);
                    $doc->exportCaption($this->DrugCD);
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
                        $doc->exportField($this->DrugName);
                        $doc->exportField($this->Positive);
                        $doc->exportField($this->Negative);
                        $doc->exportField($this->ShortName);
                        $doc->exportField($this->GroupCD);
                        $doc->exportField($this->_Content);
                        $doc->exportField($this->Order);
                        $doc->exportField($this->DrugCD);
                        $doc->exportField($this->id);
                    } else {
                        $doc->exportField($this->DrugName);
                        $doc->exportField($this->Positive);
                        $doc->exportField($this->Negative);
                        $doc->exportField($this->ShortName);
                        $doc->exportField($this->GroupCD);
                        $doc->exportField($this->_Content);
                        $doc->exportField($this->Order);
                        $doc->exportField($this->DrugCD);
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
