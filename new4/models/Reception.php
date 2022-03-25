<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for reception
 */
class Reception extends DbTable
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
    public $PatientID;
    public $PatientName;
    public $OorN;
    public $PRIMARY_CONSULTANT;
    public $CATEGORY;
    public $PROCEDURE;
    public $Amount;
    public $MODEOFPAYMENT;
    public $NEXTREVIEWDATE;
    public $REMARKS;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'reception';
        $this->TableName = 'reception';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`reception`";
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
        $this->id = new DbField('reception', 'reception', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // PatientID
        $this->PatientID = new DbField('reception', 'reception', 'x_PatientID', 'PatientID', '`PatientID`', '`PatientID`', 200, 45, -1, false, '`PatientID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientID->Sortable = true; // Allow sort
        $this->PatientID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientID->Param, "CustomMsg");
        $this->Fields['PatientID'] = &$this->PatientID;

        // PatientName
        $this->PatientName = new DbField('reception', 'reception', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, false, '`PatientName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientName->Sortable = true; // Allow sort
        $this->PatientName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientName->Param, "CustomMsg");
        $this->Fields['PatientName'] = &$this->PatientName;

        // OorN
        $this->OorN = new DbField('reception', 'reception', 'x_OorN', 'OorN', '`OorN`', '`OorN`', 200, 45, -1, false, '`OorN`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OorN->Sortable = true; // Allow sort
        $this->OorN->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OorN->Param, "CustomMsg");
        $this->Fields['OorN'] = &$this->OorN;

        // PRIMARY_CONSULTANT
        $this->PRIMARY_CONSULTANT = new DbField('reception', 'reception', 'x_PRIMARY_CONSULTANT', 'PRIMARY_CONSULTANT', '`PRIMARY_CONSULTANT`', '`PRIMARY_CONSULTANT`', 200, 45, -1, false, '`PRIMARY_CONSULTANT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PRIMARY_CONSULTANT->Sortable = true; // Allow sort
        $this->PRIMARY_CONSULTANT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PRIMARY_CONSULTANT->Param, "CustomMsg");
        $this->Fields['PRIMARY_CONSULTANT'] = &$this->PRIMARY_CONSULTANT;

        // CATEGORY
        $this->CATEGORY = new DbField('reception', 'reception', 'x_CATEGORY', 'CATEGORY', '`CATEGORY`', '`CATEGORY`', 200, 45, -1, false, '`CATEGORY`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->CATEGORY->Sortable = true; // Allow sort
        $this->CATEGORY->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->CATEGORY->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->CATEGORY->Lookup = new Lookup('CATEGORY', 'mas_category', false, 'CATEGORY', ["CATEGORY","","",""], [], [], [], [], [], [], '', '');
        $this->CATEGORY->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CATEGORY->Param, "CustomMsg");
        $this->Fields['CATEGORY'] = &$this->CATEGORY;

        // PROCEDURE
        $this->PROCEDURE = new DbField('reception', 'reception', 'x_PROCEDURE', 'PROCEDURE', '`PROCEDURE`', '`PROCEDURE`', 200, 45, -1, false, '`PROCEDURE`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->PROCEDURE->Sortable = true; // Allow sort
        $this->PROCEDURE->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->PROCEDURE->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->PROCEDURE->Lookup = new Lookup('PROCEDURE', 'mas_procedure', false, 'PROCEDURE', ["PROCEDURE","","",""], [], [], [], [], [], [], '', '');
        $this->PROCEDURE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PROCEDURE->Param, "CustomMsg");
        $this->Fields['PROCEDURE'] = &$this->PROCEDURE;

        // Amount
        $this->Amount = new DbField('reception', 'reception', 'x_Amount', 'Amount', '`Amount`', '`Amount`', 200, 45, -1, false, '`Amount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Amount->Sortable = true; // Allow sort
        $this->Amount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Amount->Param, "CustomMsg");
        $this->Fields['Amount'] = &$this->Amount;

        // MODE OF PAYMENT
        $this->MODEOFPAYMENT = new DbField('reception', 'reception', 'x_MODEOFPAYMENT', 'MODE OF PAYMENT', '`MODE OF PAYMENT`', '`MODE OF PAYMENT`', 200, 45, -1, false, '`MODE OF PAYMENT`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->MODEOFPAYMENT->Sortable = true; // Allow sort
        $this->MODEOFPAYMENT->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->MODEOFPAYMENT->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->MODEOFPAYMENT->Lookup = new Lookup('MODE OF PAYMENT', 'mas_modepayment', false, 'Mode', ["Mode","","",""], [], [], [], [], [], [], '', '');
        $this->MODEOFPAYMENT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MODEOFPAYMENT->Param, "CustomMsg");
        $this->Fields['MODE OF PAYMENT'] = &$this->MODEOFPAYMENT;

        // NEXT REVIEW DATE
        $this->NEXTREVIEWDATE = new DbField('reception', 'reception', 'x_NEXTREVIEWDATE', 'NEXT REVIEW DATE', '`NEXT REVIEW DATE`', CastDateFieldForLike("`NEXT REVIEW DATE`", 0, "DB"), 133, 10, 0, false, '`NEXT REVIEW DATE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NEXTREVIEWDATE->Sortable = true; // Allow sort
        $this->NEXTREVIEWDATE->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->NEXTREVIEWDATE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->NEXTREVIEWDATE->Param, "CustomMsg");
        $this->Fields['NEXT REVIEW DATE'] = &$this->NEXTREVIEWDATE;

        // REMARKS
        $this->REMARKS = new DbField('reception', 'reception', 'x_REMARKS', 'REMARKS', '`REMARKS`', '`REMARKS`', 200, 45, -1, false, '`REMARKS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->REMARKS->Sortable = true; // Allow sort
        $this->REMARKS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->REMARKS->Param, "CustomMsg");
        $this->Fields['REMARKS'] = &$this->REMARKS;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`reception`";
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
        $this->PatientID->DbValue = $row['PatientID'];
        $this->PatientName->DbValue = $row['PatientName'];
        $this->OorN->DbValue = $row['OorN'];
        $this->PRIMARY_CONSULTANT->DbValue = $row['PRIMARY_CONSULTANT'];
        $this->CATEGORY->DbValue = $row['CATEGORY'];
        $this->PROCEDURE->DbValue = $row['PROCEDURE'];
        $this->Amount->DbValue = $row['Amount'];
        $this->MODEOFPAYMENT->DbValue = $row['MODE OF PAYMENT'];
        $this->NEXTREVIEWDATE->DbValue = $row['NEXT REVIEW DATE'];
        $this->REMARKS->DbValue = $row['REMARKS'];
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
        return $_SESSION[$name] ?? GetUrl("ReceptionList");
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
        if ($pageName == "ReceptionView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ReceptionEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ReceptionAdd") {
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
                return "ReceptionView";
            case Config("API_ADD_ACTION"):
                return "ReceptionAdd";
            case Config("API_EDIT_ACTION"):
                return "ReceptionEdit";
            case Config("API_DELETE_ACTION"):
                return "ReceptionDelete";
            case Config("API_LIST_ACTION"):
                return "ReceptionList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ReceptionList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ReceptionView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ReceptionView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ReceptionAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ReceptionAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ReceptionEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ReceptionAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ReceptionDelete", $this->getUrlParm());
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
        $this->PatientID->setDbValue($row['PatientID']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->OorN->setDbValue($row['OorN']);
        $this->PRIMARY_CONSULTANT->setDbValue($row['PRIMARY_CONSULTANT']);
        $this->CATEGORY->setDbValue($row['CATEGORY']);
        $this->PROCEDURE->setDbValue($row['PROCEDURE']);
        $this->Amount->setDbValue($row['Amount']);
        $this->MODEOFPAYMENT->setDbValue($row['MODE OF PAYMENT']);
        $this->NEXTREVIEWDATE->setDbValue($row['NEXT REVIEW DATE']);
        $this->REMARKS->setDbValue($row['REMARKS']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // PatientID

        // PatientName

        // OorN

        // PRIMARY_CONSULTANT

        // CATEGORY

        // PROCEDURE

        // Amount

        // MODE OF PAYMENT

        // NEXT REVIEW DATE

        // REMARKS

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // PatientID
        $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
        $this->PatientID->ViewCustomAttributes = "";

        // PatientName
        $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
        $this->PatientName->ViewCustomAttributes = "";

        // OorN
        $this->OorN->ViewValue = $this->OorN->CurrentValue;
        $this->OorN->ViewCustomAttributes = "";

        // PRIMARY_CONSULTANT
        $this->PRIMARY_CONSULTANT->ViewValue = $this->PRIMARY_CONSULTANT->CurrentValue;
        $this->PRIMARY_CONSULTANT->ViewCustomAttributes = "";

        // CATEGORY
        $curVal = trim(strval($this->CATEGORY->CurrentValue));
        if ($curVal != "") {
            $this->CATEGORY->ViewValue = $this->CATEGORY->lookupCacheOption($curVal);
            if ($this->CATEGORY->ViewValue === null) { // Lookup from database
                $filterWrk = "`CATEGORY`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->CATEGORY->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->CATEGORY->Lookup->renderViewRow($rswrk[0]);
                    $this->CATEGORY->ViewValue = $this->CATEGORY->displayValue($arwrk);
                } else {
                    $this->CATEGORY->ViewValue = $this->CATEGORY->CurrentValue;
                }
            }
        } else {
            $this->CATEGORY->ViewValue = null;
        }
        $this->CATEGORY->ViewCustomAttributes = "";

        // PROCEDURE
        $curVal = trim(strval($this->PROCEDURE->CurrentValue));
        if ($curVal != "") {
            $this->PROCEDURE->ViewValue = $this->PROCEDURE->lookupCacheOption($curVal);
            if ($this->PROCEDURE->ViewValue === null) { // Lookup from database
                $filterWrk = "`PROCEDURE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->PROCEDURE->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->PROCEDURE->Lookup->renderViewRow($rswrk[0]);
                    $this->PROCEDURE->ViewValue = $this->PROCEDURE->displayValue($arwrk);
                } else {
                    $this->PROCEDURE->ViewValue = $this->PROCEDURE->CurrentValue;
                }
            }
        } else {
            $this->PROCEDURE->ViewValue = null;
        }
        $this->PROCEDURE->ViewCustomAttributes = "";

        // Amount
        $this->Amount->ViewValue = $this->Amount->CurrentValue;
        $this->Amount->ViewCustomAttributes = "";

        // MODE OF PAYMENT
        $curVal = trim(strval($this->MODEOFPAYMENT->CurrentValue));
        if ($curVal != "") {
            $this->MODEOFPAYMENT->ViewValue = $this->MODEOFPAYMENT->lookupCacheOption($curVal);
            if ($this->MODEOFPAYMENT->ViewValue === null) { // Lookup from database
                $filterWrk = "`Mode`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->MODEOFPAYMENT->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->MODEOFPAYMENT->Lookup->renderViewRow($rswrk[0]);
                    $this->MODEOFPAYMENT->ViewValue = $this->MODEOFPAYMENT->displayValue($arwrk);
                } else {
                    $this->MODEOFPAYMENT->ViewValue = $this->MODEOFPAYMENT->CurrentValue;
                }
            }
        } else {
            $this->MODEOFPAYMENT->ViewValue = null;
        }
        $this->MODEOFPAYMENT->ViewCustomAttributes = "";

        // NEXT REVIEW DATE
        $this->NEXTREVIEWDATE->ViewValue = $this->NEXTREVIEWDATE->CurrentValue;
        $this->NEXTREVIEWDATE->ViewValue = FormatDateTime($this->NEXTREVIEWDATE->ViewValue, 0);
        $this->NEXTREVIEWDATE->ViewCustomAttributes = "";

        // REMARKS
        $this->REMARKS->ViewValue = $this->REMARKS->CurrentValue;
        $this->REMARKS->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // PatientID
        $this->PatientID->LinkCustomAttributes = "";
        $this->PatientID->HrefValue = "";
        $this->PatientID->TooltipValue = "";

        // PatientName
        $this->PatientName->LinkCustomAttributes = "";
        $this->PatientName->HrefValue = "";
        $this->PatientName->TooltipValue = "";

        // OorN
        $this->OorN->LinkCustomAttributes = "";
        $this->OorN->HrefValue = "";
        $this->OorN->TooltipValue = "";

        // PRIMARY_CONSULTANT
        $this->PRIMARY_CONSULTANT->LinkCustomAttributes = "";
        $this->PRIMARY_CONSULTANT->HrefValue = "";
        $this->PRIMARY_CONSULTANT->TooltipValue = "";

        // CATEGORY
        $this->CATEGORY->LinkCustomAttributes = "";
        $this->CATEGORY->HrefValue = "";
        $this->CATEGORY->TooltipValue = "";

        // PROCEDURE
        $this->PROCEDURE->LinkCustomAttributes = "";
        $this->PROCEDURE->HrefValue = "";
        $this->PROCEDURE->TooltipValue = "";

        // Amount
        $this->Amount->LinkCustomAttributes = "";
        $this->Amount->HrefValue = "";
        $this->Amount->TooltipValue = "";

        // MODE OF PAYMENT
        $this->MODEOFPAYMENT->LinkCustomAttributes = "";
        $this->MODEOFPAYMENT->HrefValue = "";
        $this->MODEOFPAYMENT->TooltipValue = "";

        // NEXT REVIEW DATE
        $this->NEXTREVIEWDATE->LinkCustomAttributes = "";
        $this->NEXTREVIEWDATE->HrefValue = "";
        $this->NEXTREVIEWDATE->TooltipValue = "";

        // REMARKS
        $this->REMARKS->LinkCustomAttributes = "";
        $this->REMARKS->HrefValue = "";
        $this->REMARKS->TooltipValue = "";

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

        // PatientID
        $this->PatientID->EditAttrs["class"] = "form-control";
        $this->PatientID->EditCustomAttributes = "";
        if (!$this->PatientID->Raw) {
            $this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
        }
        $this->PatientID->EditValue = $this->PatientID->CurrentValue;
        $this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

        // PatientName
        $this->PatientName->EditAttrs["class"] = "form-control";
        $this->PatientName->EditCustomAttributes = "";
        if (!$this->PatientName->Raw) {
            $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
        }
        $this->PatientName->EditValue = $this->PatientName->CurrentValue;
        $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

        // OorN
        $this->OorN->EditAttrs["class"] = "form-control";
        $this->OorN->EditCustomAttributes = "";
        if (!$this->OorN->Raw) {
            $this->OorN->CurrentValue = HtmlDecode($this->OorN->CurrentValue);
        }
        $this->OorN->EditValue = $this->OorN->CurrentValue;
        $this->OorN->PlaceHolder = RemoveHtml($this->OorN->caption());

        // PRIMARY_CONSULTANT
        $this->PRIMARY_CONSULTANT->EditAttrs["class"] = "form-control";
        $this->PRIMARY_CONSULTANT->EditCustomAttributes = "";
        if (!$this->PRIMARY_CONSULTANT->Raw) {
            $this->PRIMARY_CONSULTANT->CurrentValue = HtmlDecode($this->PRIMARY_CONSULTANT->CurrentValue);
        }
        $this->PRIMARY_CONSULTANT->EditValue = $this->PRIMARY_CONSULTANT->CurrentValue;
        $this->PRIMARY_CONSULTANT->PlaceHolder = RemoveHtml($this->PRIMARY_CONSULTANT->caption());

        // CATEGORY
        $this->CATEGORY->EditAttrs["class"] = "form-control";
        $this->CATEGORY->EditCustomAttributes = "";
        $this->CATEGORY->PlaceHolder = RemoveHtml($this->CATEGORY->caption());

        // PROCEDURE
        $this->PROCEDURE->EditAttrs["class"] = "form-control";
        $this->PROCEDURE->EditCustomAttributes = "";
        $this->PROCEDURE->PlaceHolder = RemoveHtml($this->PROCEDURE->caption());

        // Amount
        $this->Amount->EditAttrs["class"] = "form-control";
        $this->Amount->EditCustomAttributes = "";
        if (!$this->Amount->Raw) {
            $this->Amount->CurrentValue = HtmlDecode($this->Amount->CurrentValue);
        }
        $this->Amount->EditValue = $this->Amount->CurrentValue;
        $this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());

        // MODE OF PAYMENT
        $this->MODEOFPAYMENT->EditAttrs["class"] = "form-control";
        $this->MODEOFPAYMENT->EditCustomAttributes = "";
        $this->MODEOFPAYMENT->PlaceHolder = RemoveHtml($this->MODEOFPAYMENT->caption());

        // NEXT REVIEW DATE
        $this->NEXTREVIEWDATE->EditAttrs["class"] = "form-control";
        $this->NEXTREVIEWDATE->EditCustomAttributes = "";
        $this->NEXTREVIEWDATE->EditValue = FormatDateTime($this->NEXTREVIEWDATE->CurrentValue, 8);
        $this->NEXTREVIEWDATE->PlaceHolder = RemoveHtml($this->NEXTREVIEWDATE->caption());

        // REMARKS
        $this->REMARKS->EditAttrs["class"] = "form-control";
        $this->REMARKS->EditCustomAttributes = "";
        if (!$this->REMARKS->Raw) {
            $this->REMARKS->CurrentValue = HtmlDecode($this->REMARKS->CurrentValue);
        }
        $this->REMARKS->EditValue = $this->REMARKS->CurrentValue;
        $this->REMARKS->PlaceHolder = RemoveHtml($this->REMARKS->caption());

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
                    $doc->exportCaption($this->PatientID);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->OorN);
                    $doc->exportCaption($this->PRIMARY_CONSULTANT);
                    $doc->exportCaption($this->CATEGORY);
                    $doc->exportCaption($this->PROCEDURE);
                    $doc->exportCaption($this->Amount);
                    $doc->exportCaption($this->MODEOFPAYMENT);
                    $doc->exportCaption($this->NEXTREVIEWDATE);
                    $doc->exportCaption($this->REMARKS);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->PatientID);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->OorN);
                    $doc->exportCaption($this->PRIMARY_CONSULTANT);
                    $doc->exportCaption($this->CATEGORY);
                    $doc->exportCaption($this->PROCEDURE);
                    $doc->exportCaption($this->Amount);
                    $doc->exportCaption($this->MODEOFPAYMENT);
                    $doc->exportCaption($this->NEXTREVIEWDATE);
                    $doc->exportCaption($this->REMARKS);
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
                        $doc->exportField($this->PatientID);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->OorN);
                        $doc->exportField($this->PRIMARY_CONSULTANT);
                        $doc->exportField($this->CATEGORY);
                        $doc->exportField($this->PROCEDURE);
                        $doc->exportField($this->Amount);
                        $doc->exportField($this->MODEOFPAYMENT);
                        $doc->exportField($this->NEXTREVIEWDATE);
                        $doc->exportField($this->REMARKS);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->PatientID);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->OorN);
                        $doc->exportField($this->PRIMARY_CONSULTANT);
                        $doc->exportField($this->CATEGORY);
                        $doc->exportField($this->PROCEDURE);
                        $doc->exportField($this->Amount);
                        $doc->exportField($this->MODEOFPAYMENT);
                        $doc->exportField($this->NEXTREVIEWDATE);
                        $doc->exportField($this->REMARKS);
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
