<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for deposit_pettycash
 */
class DepositPettycash extends DbTable
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
    public $TransType;
    public $ShiftNumber;
    public $TerminalNumber;
    public $User;
    public $OpenedDateTime;
    public $AccoundHead;
    public $Amount;
    public $Narration;
    public $CreatedBy;
    public $CreatedDateTime;
    public $ModifiedBy;
    public $ModifiedDateTime;
    public $HospID;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'deposit_pettycash';
        $this->TableName = 'deposit_pettycash';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`deposit_pettycash`";
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
        $this->id = new DbField('deposit_pettycash', 'deposit_pettycash', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // TransType
        $this->TransType = new DbField('deposit_pettycash', 'deposit_pettycash', 'x_TransType', 'TransType', '`TransType`', '`TransType`', 200, 45, -1, false, '`TransType`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->TransType->Sortable = true; // Allow sort
        $this->TransType->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->TransType->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->TransType->Lookup = new Lookup('TransType', 'deposit_pettycash', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->TransType->OptionCount = 2;
        $this->TransType->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TransType->Param, "CustomMsg");
        $this->Fields['TransType'] = &$this->TransType;

        // ShiftNumber
        $this->ShiftNumber = new DbField('deposit_pettycash', 'deposit_pettycash', 'x_ShiftNumber', 'ShiftNumber', '`ShiftNumber`', '`ShiftNumber`', 200, 45, -1, false, '`ShiftNumber`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ShiftNumber->Sortable = true; // Allow sort
        $this->ShiftNumber->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ShiftNumber->Param, "CustomMsg");
        $this->Fields['ShiftNumber'] = &$this->ShiftNumber;

        // TerminalNumber
        $this->TerminalNumber = new DbField('deposit_pettycash', 'deposit_pettycash', 'x_TerminalNumber', 'TerminalNumber', '`TerminalNumber`', '`TerminalNumber`', 200, 45, -1, false, '`TerminalNumber`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->TerminalNumber->Sortable = true; // Allow sort
        $this->TerminalNumber->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->TerminalNumber->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->TerminalNumber->Lookup = new Lookup('TerminalNumber', 'deposit_pettycash', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->TerminalNumber->OptionCount = 2;
        $this->TerminalNumber->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TerminalNumber->Param, "CustomMsg");
        $this->Fields['TerminalNumber'] = &$this->TerminalNumber;

        // User
        $this->User = new DbField('deposit_pettycash', 'deposit_pettycash', 'x_User', 'User', '`User`', '`User`', 200, 45, -1, false, '`User`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->User->Sortable = true; // Allow sort
        $this->User->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->User->Param, "CustomMsg");
        $this->Fields['User'] = &$this->User;

        // OpenedDateTime
        $this->OpenedDateTime = new DbField('deposit_pettycash', 'deposit_pettycash', 'x_OpenedDateTime', 'OpenedDateTime', '`OpenedDateTime`', CastDateFieldForLike("`OpenedDateTime`", 7, "DB"), 135, 19, 7, false, '`OpenedDateTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OpenedDateTime->Sortable = true; // Allow sort
        $this->OpenedDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->OpenedDateTime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OpenedDateTime->Param, "CustomMsg");
        $this->Fields['OpenedDateTime'] = &$this->OpenedDateTime;

        // AccoundHead
        $this->AccoundHead = new DbField('deposit_pettycash', 'deposit_pettycash', 'x_AccoundHead', 'AccoundHead', '`AccoundHead`', '`AccoundHead`', 200, 45, -1, false, '`AccoundHead`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->AccoundHead->Sortable = true; // Allow sort
        $this->AccoundHead->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->AccoundHead->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->AccoundHead->Lookup = new Lookup('AccoundHead', 'deposit_account_head', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->AccoundHead->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AccoundHead->Param, "CustomMsg");
        $this->Fields['AccoundHead'] = &$this->AccoundHead;

        // Amount
        $this->Amount = new DbField('deposit_pettycash', 'deposit_pettycash', 'x_Amount', 'Amount', '`Amount`', '`Amount`', 131, 10, -1, false, '`Amount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Amount->Sortable = true; // Allow sort
        $this->Amount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Amount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Amount->Param, "CustomMsg");
        $this->Fields['Amount'] = &$this->Amount;

        // Narration
        $this->Narration = new DbField('deposit_pettycash', 'deposit_pettycash', 'x_Narration', 'Narration', '`Narration`', '`Narration`', 201, 405, -1, false, '`Narration`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Narration->Sortable = true; // Allow sort
        $this->Narration->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Narration->Param, "CustomMsg");
        $this->Fields['Narration'] = &$this->Narration;

        // CreatedBy
        $this->CreatedBy = new DbField('deposit_pettycash', 'deposit_pettycash', 'x_CreatedBy', 'CreatedBy', '`CreatedBy`', '`CreatedBy`', 200, 45, -1, false, '`CreatedBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CreatedBy->Sortable = true; // Allow sort
        $this->CreatedBy->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CreatedBy->Param, "CustomMsg");
        $this->Fields['CreatedBy'] = &$this->CreatedBy;

        // CreatedDateTime
        $this->CreatedDateTime = new DbField('deposit_pettycash', 'deposit_pettycash', 'x_CreatedDateTime', 'CreatedDateTime', '`CreatedDateTime`', CastDateFieldForLike("`CreatedDateTime`", 0, "DB"), 135, 19, 0, false, '`CreatedDateTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CreatedDateTime->Sortable = true; // Allow sort
        $this->CreatedDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->CreatedDateTime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CreatedDateTime->Param, "CustomMsg");
        $this->Fields['CreatedDateTime'] = &$this->CreatedDateTime;

        // ModifiedBy
        $this->ModifiedBy = new DbField('deposit_pettycash', 'deposit_pettycash', 'x_ModifiedBy', 'ModifiedBy', '`ModifiedBy`', '`ModifiedBy`', 200, 45, -1, false, '`ModifiedBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ModifiedBy->Sortable = true; // Allow sort
        $this->ModifiedBy->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ModifiedBy->Param, "CustomMsg");
        $this->Fields['ModifiedBy'] = &$this->ModifiedBy;

        // ModifiedDateTime
        $this->ModifiedDateTime = new DbField('deposit_pettycash', 'deposit_pettycash', 'x_ModifiedDateTime', 'ModifiedDateTime', '`ModifiedDateTime`', CastDateFieldForLike("`ModifiedDateTime`", 0, "DB"), 135, 19, 0, false, '`ModifiedDateTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ModifiedDateTime->Sortable = true; // Allow sort
        $this->ModifiedDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->ModifiedDateTime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ModifiedDateTime->Param, "CustomMsg");
        $this->Fields['ModifiedDateTime'] = &$this->ModifiedDateTime;

        // HospID
        $this->HospID = new DbField('deposit_pettycash', 'deposit_pettycash', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->HospID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospID->Param, "CustomMsg");
        $this->Fields['HospID'] = &$this->HospID;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`deposit_pettycash`";
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
        $this->DefaultFilter = "`HospID`='".HospitalID()."'";
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
        $this->TransType->DbValue = $row['TransType'];
        $this->ShiftNumber->DbValue = $row['ShiftNumber'];
        $this->TerminalNumber->DbValue = $row['TerminalNumber'];
        $this->User->DbValue = $row['User'];
        $this->OpenedDateTime->DbValue = $row['OpenedDateTime'];
        $this->AccoundHead->DbValue = $row['AccoundHead'];
        $this->Amount->DbValue = $row['Amount'];
        $this->Narration->DbValue = $row['Narration'];
        $this->CreatedBy->DbValue = $row['CreatedBy'];
        $this->CreatedDateTime->DbValue = $row['CreatedDateTime'];
        $this->ModifiedBy->DbValue = $row['ModifiedBy'];
        $this->ModifiedDateTime->DbValue = $row['ModifiedDateTime'];
        $this->HospID->DbValue = $row['HospID'];
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
        return $_SESSION[$name] ?? GetUrl("DepositPettycashList");
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
        if ($pageName == "DepositPettycashView") {
            return $Language->phrase("View");
        } elseif ($pageName == "DepositPettycashEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "DepositPettycashAdd") {
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
                return "DepositPettycashView";
            case Config("API_ADD_ACTION"):
                return "DepositPettycashAdd";
            case Config("API_EDIT_ACTION"):
                return "DepositPettycashEdit";
            case Config("API_DELETE_ACTION"):
                return "DepositPettycashDelete";
            case Config("API_LIST_ACTION"):
                return "DepositPettycashList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "DepositPettycashList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("DepositPettycashView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("DepositPettycashView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "DepositPettycashAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "DepositPettycashAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("DepositPettycashEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("DepositPettycashAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("DepositPettycashDelete", $this->getUrlParm());
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
        $this->TransType->setDbValue($row['TransType']);
        $this->ShiftNumber->setDbValue($row['ShiftNumber']);
        $this->TerminalNumber->setDbValue($row['TerminalNumber']);
        $this->User->setDbValue($row['User']);
        $this->OpenedDateTime->setDbValue($row['OpenedDateTime']);
        $this->AccoundHead->setDbValue($row['AccoundHead']);
        $this->Amount->setDbValue($row['Amount']);
        $this->Narration->setDbValue($row['Narration']);
        $this->CreatedBy->setDbValue($row['CreatedBy']);
        $this->CreatedDateTime->setDbValue($row['CreatedDateTime']);
        $this->ModifiedBy->setDbValue($row['ModifiedBy']);
        $this->ModifiedDateTime->setDbValue($row['ModifiedDateTime']);
        $this->HospID->setDbValue($row['HospID']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // TransType

        // ShiftNumber

        // TerminalNumber

        // User

        // OpenedDateTime

        // AccoundHead

        // Amount

        // Narration

        // CreatedBy

        // CreatedDateTime

        // ModifiedBy

        // ModifiedDateTime

        // HospID

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // TransType
        if (strval($this->TransType->CurrentValue) != "") {
            $this->TransType->ViewValue = $this->TransType->optionCaption($this->TransType->CurrentValue);
        } else {
            $this->TransType->ViewValue = null;
        }
        $this->TransType->ViewCustomAttributes = "";

        // ShiftNumber
        $this->ShiftNumber->ViewValue = $this->ShiftNumber->CurrentValue;
        $this->ShiftNumber->ViewCustomAttributes = "";

        // TerminalNumber
        if (strval($this->TerminalNumber->CurrentValue) != "") {
            $this->TerminalNumber->ViewValue = $this->TerminalNumber->optionCaption($this->TerminalNumber->CurrentValue);
        } else {
            $this->TerminalNumber->ViewValue = null;
        }
        $this->TerminalNumber->ViewCustomAttributes = "";

        // User
        $this->User->ViewValue = $this->User->CurrentValue;
        $this->User->ViewCustomAttributes = "";

        // OpenedDateTime
        $this->OpenedDateTime->ViewValue = $this->OpenedDateTime->CurrentValue;
        $this->OpenedDateTime->ViewValue = FormatDateTime($this->OpenedDateTime->ViewValue, 7);
        $this->OpenedDateTime->ViewCustomAttributes = "";

        // AccoundHead
        $curVal = trim(strval($this->AccoundHead->CurrentValue));
        if ($curVal != "") {
            $this->AccoundHead->ViewValue = $this->AccoundHead->lookupCacheOption($curVal);
            if ($this->AccoundHead->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->AccoundHead->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->AccoundHead->Lookup->renderViewRow($rswrk[0]);
                    $this->AccoundHead->ViewValue = $this->AccoundHead->displayValue($arwrk);
                } else {
                    $this->AccoundHead->ViewValue = $this->AccoundHead->CurrentValue;
                }
            }
        } else {
            $this->AccoundHead->ViewValue = null;
        }
        $this->AccoundHead->ViewCustomAttributes = "";

        // Amount
        $this->Amount->ViewValue = $this->Amount->CurrentValue;
        $this->Amount->ViewValue = FormatNumber($this->Amount->ViewValue, 2, -2, -2, -2);
        $this->Amount->ViewCustomAttributes = "";

        // Narration
        $this->Narration->ViewValue = $this->Narration->CurrentValue;
        $this->Narration->ViewCustomAttributes = "";

        // CreatedBy
        $this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
        $this->CreatedBy->ViewCustomAttributes = "";

        // CreatedDateTime
        $this->CreatedDateTime->ViewValue = $this->CreatedDateTime->CurrentValue;
        $this->CreatedDateTime->ViewValue = FormatDateTime($this->CreatedDateTime->ViewValue, 0);
        $this->CreatedDateTime->ViewCustomAttributes = "";

        // ModifiedBy
        $this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
        $this->ModifiedBy->ViewCustomAttributes = "";

        // ModifiedDateTime
        $this->ModifiedDateTime->ViewValue = $this->ModifiedDateTime->CurrentValue;
        $this->ModifiedDateTime->ViewValue = FormatDateTime($this->ModifiedDateTime->ViewValue, 0);
        $this->ModifiedDateTime->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // TransType
        $this->TransType->LinkCustomAttributes = "";
        $this->TransType->HrefValue = "";
        $this->TransType->TooltipValue = "";

        // ShiftNumber
        $this->ShiftNumber->LinkCustomAttributes = "";
        $this->ShiftNumber->HrefValue = "";
        $this->ShiftNumber->TooltipValue = "";

        // TerminalNumber
        $this->TerminalNumber->LinkCustomAttributes = "";
        $this->TerminalNumber->HrefValue = "";
        $this->TerminalNumber->TooltipValue = "";

        // User
        $this->User->LinkCustomAttributes = "";
        $this->User->HrefValue = "";
        $this->User->TooltipValue = "";

        // OpenedDateTime
        $this->OpenedDateTime->LinkCustomAttributes = "";
        $this->OpenedDateTime->HrefValue = "";
        $this->OpenedDateTime->TooltipValue = "";

        // AccoundHead
        $this->AccoundHead->LinkCustomAttributes = "";
        $this->AccoundHead->HrefValue = "";
        $this->AccoundHead->TooltipValue = "";

        // Amount
        $this->Amount->LinkCustomAttributes = "";
        $this->Amount->HrefValue = "";
        $this->Amount->TooltipValue = "";

        // Narration
        $this->Narration->LinkCustomAttributes = "";
        $this->Narration->HrefValue = "";
        $this->Narration->TooltipValue = "";

        // CreatedBy
        $this->CreatedBy->LinkCustomAttributes = "";
        $this->CreatedBy->HrefValue = "";
        $this->CreatedBy->TooltipValue = "";

        // CreatedDateTime
        $this->CreatedDateTime->LinkCustomAttributes = "";
        $this->CreatedDateTime->HrefValue = "";
        $this->CreatedDateTime->TooltipValue = "";

        // ModifiedBy
        $this->ModifiedBy->LinkCustomAttributes = "";
        $this->ModifiedBy->HrefValue = "";
        $this->ModifiedBy->TooltipValue = "";

        // ModifiedDateTime
        $this->ModifiedDateTime->LinkCustomAttributes = "";
        $this->ModifiedDateTime->HrefValue = "";
        $this->ModifiedDateTime->TooltipValue = "";

        // HospID
        $this->HospID->LinkCustomAttributes = "";
        $this->HospID->HrefValue = "";
        $this->HospID->TooltipValue = "";

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

        // TransType
        $this->TransType->EditAttrs["class"] = "form-control";
        $this->TransType->EditCustomAttributes = "";
        $this->TransType->EditValue = $this->TransType->options(true);
        $this->TransType->PlaceHolder = RemoveHtml($this->TransType->caption());

        // ShiftNumber
        $this->ShiftNumber->EditAttrs["class"] = "form-control";
        $this->ShiftNumber->EditCustomAttributes = "";
        if (!$this->ShiftNumber->Raw) {
            $this->ShiftNumber->CurrentValue = HtmlDecode($this->ShiftNumber->CurrentValue);
        }
        $this->ShiftNumber->EditValue = $this->ShiftNumber->CurrentValue;
        $this->ShiftNumber->PlaceHolder = RemoveHtml($this->ShiftNumber->caption());

        // TerminalNumber
        $this->TerminalNumber->EditAttrs["class"] = "form-control";
        $this->TerminalNumber->EditCustomAttributes = "";
        $this->TerminalNumber->EditValue = $this->TerminalNumber->options(true);
        $this->TerminalNumber->PlaceHolder = RemoveHtml($this->TerminalNumber->caption());

        // User
        $this->User->EditAttrs["class"] = "form-control";
        $this->User->EditCustomAttributes = "";
        if (!$this->User->Raw) {
            $this->User->CurrentValue = HtmlDecode($this->User->CurrentValue);
        }
        $this->User->EditValue = $this->User->CurrentValue;
        $this->User->PlaceHolder = RemoveHtml($this->User->caption());

        // OpenedDateTime
        $this->OpenedDateTime->EditAttrs["class"] = "form-control";
        $this->OpenedDateTime->EditCustomAttributes = "";
        $this->OpenedDateTime->EditValue = FormatDateTime($this->OpenedDateTime->CurrentValue, 7);
        $this->OpenedDateTime->PlaceHolder = RemoveHtml($this->OpenedDateTime->caption());

        // AccoundHead
        $this->AccoundHead->EditAttrs["class"] = "form-control";
        $this->AccoundHead->EditCustomAttributes = "";
        $this->AccoundHead->PlaceHolder = RemoveHtml($this->AccoundHead->caption());

        // Amount
        $this->Amount->EditAttrs["class"] = "form-control";
        $this->Amount->EditCustomAttributes = "";
        $this->Amount->EditValue = $this->Amount->CurrentValue;
        $this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());
        if (strval($this->Amount->EditValue) != "" && is_numeric($this->Amount->EditValue)) {
            $this->Amount->EditValue = FormatNumber($this->Amount->EditValue, -2, -2, -2, -2);
        }

        // Narration
        $this->Narration->EditAttrs["class"] = "form-control";
        $this->Narration->EditCustomAttributes = "";
        $this->Narration->EditValue = $this->Narration->CurrentValue;
        $this->Narration->PlaceHolder = RemoveHtml($this->Narration->caption());

        // CreatedBy

        // CreatedDateTime

        // ModifiedBy

        // ModifiedDateTime

        // HospID

        // Call Row Rendered event
        $this->rowRendered();
    }

    // Aggregate list row values
    public function aggregateListRowValues()
    {
            if (is_numeric($this->Amount->CurrentValue)) {
                $this->Amount->Total += $this->Amount->CurrentValue; // Accumulate total
            }
    }

    // Aggregate list row (for rendering)
    public function aggregateListRow()
    {
            $this->Amount->CurrentValue = $this->Amount->Total;
            $this->Amount->ViewValue = $this->Amount->CurrentValue;
            $this->Amount->ViewValue = FormatNumber($this->Amount->ViewValue, 2, -2, -2, -2);
            $this->Amount->ViewCustomAttributes = "";
            $this->Amount->HrefValue = ""; // Clear href value

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
                    $doc->exportCaption($this->TransType);
                    $doc->exportCaption($this->ShiftNumber);
                    $doc->exportCaption($this->TerminalNumber);
                    $doc->exportCaption($this->User);
                    $doc->exportCaption($this->OpenedDateTime);
                    $doc->exportCaption($this->AccoundHead);
                    $doc->exportCaption($this->Amount);
                    $doc->exportCaption($this->Narration);
                    $doc->exportCaption($this->CreatedBy);
                    $doc->exportCaption($this->CreatedDateTime);
                    $doc->exportCaption($this->ModifiedBy);
                    $doc->exportCaption($this->ModifiedDateTime);
                    $doc->exportCaption($this->HospID);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->TransType);
                    $doc->exportCaption($this->ShiftNumber);
                    $doc->exportCaption($this->TerminalNumber);
                    $doc->exportCaption($this->User);
                    $doc->exportCaption($this->OpenedDateTime);
                    $doc->exportCaption($this->AccoundHead);
                    $doc->exportCaption($this->Amount);
                    $doc->exportCaption($this->CreatedBy);
                    $doc->exportCaption($this->CreatedDateTime);
                    $doc->exportCaption($this->ModifiedBy);
                    $doc->exportCaption($this->ModifiedDateTime);
                    $doc->exportCaption($this->HospID);
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
                $this->aggregateListRowValues(); // Aggregate row values

                // Render row
                $this->RowType = ROWTYPE_VIEW; // Render view
                $this->resetAttributes();
                $this->renderListRow();
                if (!$doc->ExportCustom) {
                    $doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
                    if ($exportPageType == "view") {
                        $doc->exportField($this->id);
                        $doc->exportField($this->TransType);
                        $doc->exportField($this->ShiftNumber);
                        $doc->exportField($this->TerminalNumber);
                        $doc->exportField($this->User);
                        $doc->exportField($this->OpenedDateTime);
                        $doc->exportField($this->AccoundHead);
                        $doc->exportField($this->Amount);
                        $doc->exportField($this->Narration);
                        $doc->exportField($this->CreatedBy);
                        $doc->exportField($this->CreatedDateTime);
                        $doc->exportField($this->ModifiedBy);
                        $doc->exportField($this->ModifiedDateTime);
                        $doc->exportField($this->HospID);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->TransType);
                        $doc->exportField($this->ShiftNumber);
                        $doc->exportField($this->TerminalNumber);
                        $doc->exportField($this->User);
                        $doc->exportField($this->OpenedDateTime);
                        $doc->exportField($this->AccoundHead);
                        $doc->exportField($this->Amount);
                        $doc->exportField($this->CreatedBy);
                        $doc->exportField($this->CreatedDateTime);
                        $doc->exportField($this->ModifiedBy);
                        $doc->exportField($this->ModifiedDateTime);
                        $doc->exportField($this->HospID);
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

        // Export aggregates (horizontal format only)
        if ($doc->Horizontal) {
            $this->RowType = ROWTYPE_AGGREGATE;
            $this->resetAttributes();
            $this->aggregateListRow();
            if (!$doc->ExportCustom) {
                $doc->beginExportRow(-1);
                $doc->exportAggregate($this->id, '');
                $doc->exportAggregate($this->TransType, '');
                $doc->exportAggregate($this->ShiftNumber, '');
                $doc->exportAggregate($this->TerminalNumber, '');
                $doc->exportAggregate($this->User, '');
                $doc->exportAggregate($this->OpenedDateTime, '');
                $doc->exportAggregate($this->AccoundHead, '');
                $doc->exportAggregate($this->Amount, 'TOTAL');
                $doc->exportAggregate($this->CreatedBy, '');
                $doc->exportAggregate($this->CreatedDateTime, '');
                $doc->exportAggregate($this->ModifiedBy, '');
                $doc->exportAggregate($this->ModifiedDateTime, '');
                $doc->exportAggregate($this->HospID, '');
                $doc->endExportRow();
            }
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
