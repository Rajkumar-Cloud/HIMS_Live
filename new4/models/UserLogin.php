<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for user_login
 */
class UserLogin extends DbTable
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
    public $User_Name;
    public $mail_id;
    public $mobile_no;
    public $_password;
    public $email_verified;
    public $ReportTo;
    public $_UserLevel;
    public $CreatedDateTime;
    public $profilefield;
    public $_UserID;
    public $GroupID;
    public $HospID;
    public $PharID;
    public $StoreID;
    public $OTP;
    public $_LoginType;
    public $BranchId;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'user_login';
        $this->TableName = 'user_login';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`user_login`";
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
        $this->id = new DbField('user_login', 'user_login', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // User_Name
        $this->User_Name = new DbField('user_login', 'user_login', 'x_User_Name', 'User_Name', '`User_Name`', '`User_Name`', 200, 45, -1, false, '`User_Name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->User_Name->Nullable = false; // NOT NULL field
        $this->User_Name->Required = true; // Required field
        $this->User_Name->Sortable = true; // Allow sort
        $this->User_Name->Lookup = new Lookup('User_Name', 'employee', false, 'first_name', ["first_name","","",""], [], [], [], [], [], [], '', '');
        $this->User_Name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->User_Name->Param, "CustomMsg");
        $this->Fields['User_Name'] = &$this->User_Name;

        // mail_id
        $this->mail_id = new DbField('user_login', 'user_login', 'x_mail_id', 'mail_id', '`mail_id`', '`mail_id`', 200, 45, -1, false, '`mail_id`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->mail_id->Nullable = false; // NOT NULL field
        $this->mail_id->Required = true; // Required field
        $this->mail_id->Sortable = true; // Allow sort
        $this->mail_id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->mail_id->Param, "CustomMsg");
        $this->Fields['mail_id'] = &$this->mail_id;

        // mobile_no
        $this->mobile_no = new DbField('user_login', 'user_login', 'x_mobile_no', 'mobile_no', '`mobile_no`', '`mobile_no`', 200, 45, -1, false, '`mobile_no`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->mobile_no->Nullable = false; // NOT NULL field
        $this->mobile_no->Required = true; // Required field
        $this->mobile_no->Sortable = true; // Allow sort
        $this->mobile_no->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->mobile_no->Param, "CustomMsg");
        $this->Fields['mobile_no'] = &$this->mobile_no;

        // password
        $this->_password = new DbField('user_login', 'user_login', 'x__password', 'password', '`password`', '`password`', 200, 45, -1, false, '`password`', false, false, false, 'FORMATTED TEXT', 'PASSWORD');
        if (Config("ENCRYPTED_PASSWORD")) {
            $this->_password->Raw = true;
        }
        $this->_password->Nullable = false; // NOT NULL field
        $this->_password->Required = true; // Required field
        $this->_password->Sortable = true; // Allow sort
        $this->_password->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->_password->Param, "CustomMsg");
        $this->Fields['password'] = &$this->_password;

        // email_verified
        $this->email_verified = new DbField('user_login', 'user_login', 'x_email_verified', 'email_verified', '`email_verified`', '`email_verified`', 200, 45, -1, false, '`email_verified`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->email_verified->Sortable = true; // Allow sort
        $this->email_verified->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->email_verified->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->email_verified->Lookup = new Lookup('email_verified', 'user_login', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->email_verified->OptionCount = 2;
        $this->email_verified->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->email_verified->Param, "CustomMsg");
        $this->Fields['email_verified'] = &$this->email_verified;

        // ReportTo
        $this->ReportTo = new DbField('user_login', 'user_login', 'x_ReportTo', 'ReportTo', '`ReportTo`', '`ReportTo`', 3, 11, -1, false, '`ReportTo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReportTo->Sortable = true; // Allow sort
        $this->ReportTo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->ReportTo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ReportTo->Param, "CustomMsg");
        $this->Fields['ReportTo'] = &$this->ReportTo;

        // UserLevel
        $this->_UserLevel = new DbField('user_login', 'user_login', 'x__UserLevel', 'UserLevel', '`UserLevel`', '`UserLevel`', 3, 11, -1, false, '`UserLevel`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->_UserLevel->Sortable = true; // Allow sort
        $this->_UserLevel->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->_UserLevel->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->_UserLevel->Lookup = new Lookup('UserLevel', 'userlevels', false, 'id', ["UserLevelsName","","",""], [], [], [], [], [], [], '', '');
        $this->_UserLevel->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->_UserLevel->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->_UserLevel->Param, "CustomMsg");
        $this->Fields['UserLevel'] = &$this->_UserLevel;

        // CreatedDateTime
        $this->CreatedDateTime = new DbField('user_login', 'user_login', 'x_CreatedDateTime', 'CreatedDateTime', '`CreatedDateTime`', CastDateFieldForLike("`CreatedDateTime`", 0, "DB"), 135, 19, 0, false, '`CreatedDateTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CreatedDateTime->Sortable = true; // Allow sort
        $this->CreatedDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->CreatedDateTime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CreatedDateTime->Param, "CustomMsg");
        $this->Fields['CreatedDateTime'] = &$this->CreatedDateTime;

        // profilefield
        $this->profilefield = new DbField('user_login', 'user_login', 'x_profilefield', 'profilefield', '`profilefield`', '`profilefield`', 200, 45, -1, false, '`profilefield`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->profilefield->Sortable = true; // Allow sort
        $this->profilefield->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->profilefield->Param, "CustomMsg");
        $this->Fields['profilefield'] = &$this->profilefield;

        // UserID
        $this->_UserID = new DbField('user_login', 'user_login', 'x__UserID', 'UserID', '`UserID`', '`UserID`', 3, 11, -1, false, '`UserID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->_UserID->Sortable = true; // Allow sort
        $this->_UserID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->_UserID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->_UserID->Param, "CustomMsg");
        $this->Fields['UserID'] = &$this->_UserID;

        // GroupID
        $this->GroupID = new DbField('user_login', 'user_login', 'x_GroupID', 'GroupID', '`GroupID`', '`GroupID`', 3, 11, -1, false, '`GroupID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GroupID->Sortable = true; // Allow sort
        $this->GroupID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->GroupID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GroupID->Param, "CustomMsg");
        $this->Fields['GroupID'] = &$this->GroupID;

        // HospID
        $this->HospID = new DbField('user_login', 'user_login', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->HospID->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->HospID->Lookup = new Lookup('HospID', 'hospital', false, 'id', ["hospital","","",""], [], [], [], [], [], [], '', '');
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->HospID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospID->Param, "CustomMsg");
        $this->Fields['HospID'] = &$this->HospID;

        // PharID
        $this->PharID = new DbField('user_login', 'user_login', 'x_PharID', 'PharID', '`PharID`', '`PharID`', 3, 11, -1, false, '`PharID`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->PharID->Sortable = true; // Allow sort
        $this->PharID->Lookup = new Lookup('PharID', 'hospital_pharmacy', false, 'id', ["pharmacy","","",""], [], [], [], [], [], [], '', '');
        $this->PharID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->PharID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PharID->Param, "CustomMsg");
        $this->Fields['PharID'] = &$this->PharID;

        // StoreID
        $this->StoreID = new DbField('user_login', 'user_login', 'x_StoreID', 'StoreID', '`StoreID`', '`StoreID`', 3, 11, -1, false, '`StoreID`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->StoreID->Sortable = true; // Allow sort
        $this->StoreID->Lookup = new Lookup('StoreID', 'hospital_store', false, 'id', ["pharmacy","","",""], [], [], [], [], [], [], '', '');
        $this->StoreID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->StoreID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StoreID->Param, "CustomMsg");
        $this->Fields['StoreID'] = &$this->StoreID;

        // OTP
        $this->OTP = new DbField('user_login', 'user_login', 'x_OTP', 'OTP', '`OTP`', '`OTP`', 200, 45, -1, false, '`OTP`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OTP->Sortable = true; // Allow sort
        $this->OTP->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OTP->Param, "CustomMsg");
        $this->Fields['OTP'] = &$this->OTP;

        // LoginType
        $this->_LoginType = new DbField('user_login', 'user_login', 'x__LoginType', 'LoginType', '`LoginType`', '`LoginType`', 3, 11, -1, false, '`LoginType`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->_LoginType->Sortable = true; // Allow sort
        $this->_LoginType->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->_LoginType->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->_LoginType->Param, "CustomMsg");
        $this->Fields['LoginType'] = &$this->_LoginType;

        // BranchId
        $this->BranchId = new DbField('user_login', 'user_login', 'x_BranchId', 'BranchId', '`BranchId`', '`BranchId`', 3, 11, -1, false, '`BranchId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BranchId->Sortable = true; // Allow sort
        $this->BranchId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->BranchId->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BranchId->Param, "CustomMsg");
        $this->Fields['BranchId'] = &$this->BranchId;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`user_login`";
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
            if (Config("ENCRYPTED_PASSWORD") && $name == Config("LOGIN_PASSWORD_FIELD_NAME")) {
                $value = Config("CASE_SENSITIVE_PASSWORD") ? EncryptPassword($value) : EncryptPassword(strtolower($value));
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
            if (Config("ENCRYPTED_PASSWORD") && $name == Config("LOGIN_PASSWORD_FIELD_NAME")) {
                if ($value == $this->Fields[$name]->OldValue) { // No need to update hashed password if not changed
                    continue;
                }
                $value = Config("CASE_SENSITIVE_PASSWORD") ? EncryptPassword($value) : EncryptPassword(strtolower($value));
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
        $this->User_Name->DbValue = $row['User_Name'];
        $this->mail_id->DbValue = $row['mail_id'];
        $this->mobile_no->DbValue = $row['mobile_no'];
        $this->_password->DbValue = $row['password'];
        $this->email_verified->DbValue = $row['email_verified'];
        $this->ReportTo->DbValue = $row['ReportTo'];
        $this->_UserLevel->DbValue = $row['UserLevel'];
        $this->CreatedDateTime->DbValue = $row['CreatedDateTime'];
        $this->profilefield->DbValue = $row['profilefield'];
        $this->_UserID->DbValue = $row['UserID'];
        $this->GroupID->DbValue = $row['GroupID'];
        $this->HospID->DbValue = $row['HospID'];
        $this->PharID->DbValue = $row['PharID'];
        $this->StoreID->DbValue = $row['StoreID'];
        $this->OTP->DbValue = $row['OTP'];
        $this->_LoginType->DbValue = $row['LoginType'];
        $this->BranchId->DbValue = $row['BranchId'];
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
        return $_SESSION[$name] ?? GetUrl("UserLoginList");
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
        if ($pageName == "UserLoginView") {
            return $Language->phrase("View");
        } elseif ($pageName == "UserLoginEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "UserLoginAdd") {
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
                return "UserLoginView";
            case Config("API_ADD_ACTION"):
                return "UserLoginAdd";
            case Config("API_EDIT_ACTION"):
                return "UserLoginEdit";
            case Config("API_DELETE_ACTION"):
                return "UserLoginDelete";
            case Config("API_LIST_ACTION"):
                return "UserLoginList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "UserLoginList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("UserLoginView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("UserLoginView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "UserLoginAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "UserLoginAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("UserLoginEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("UserLoginAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("UserLoginDelete", $this->getUrlParm());
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
        $this->User_Name->setDbValue($row['User_Name']);
        $this->mail_id->setDbValue($row['mail_id']);
        $this->mobile_no->setDbValue($row['mobile_no']);
        $this->_password->setDbValue($row['password']);
        $this->email_verified->setDbValue($row['email_verified']);
        $this->ReportTo->setDbValue($row['ReportTo']);
        $this->_UserLevel->setDbValue($row['UserLevel']);
        $this->CreatedDateTime->setDbValue($row['CreatedDateTime']);
        $this->profilefield->setDbValue($row['profilefield']);
        $this->_UserID->setDbValue($row['UserID']);
        $this->GroupID->setDbValue($row['GroupID']);
        $this->HospID->setDbValue($row['HospID']);
        $this->PharID->setDbValue($row['PharID']);
        $this->StoreID->setDbValue($row['StoreID']);
        $this->OTP->setDbValue($row['OTP']);
        $this->_LoginType->setDbValue($row['LoginType']);
        $this->BranchId->setDbValue($row['BranchId']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // User_Name

        // mail_id

        // mobile_no

        // password

        // email_verified

        // ReportTo

        // UserLevel

        // CreatedDateTime

        // profilefield

        // UserID

        // GroupID

        // HospID

        // PharID

        // StoreID

        // OTP

        // LoginType

        // BranchId

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // User_Name
        $this->User_Name->ViewValue = $this->User_Name->CurrentValue;
        $curVal = trim(strval($this->User_Name->CurrentValue));
        if ($curVal != "") {
            $this->User_Name->ViewValue = $this->User_Name->lookupCacheOption($curVal);
            if ($this->User_Name->ViewValue === null) { // Lookup from database
                $filterWrk = "`first_name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->User_Name->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->User_Name->Lookup->renderViewRow($rswrk[0]);
                    $this->User_Name->ViewValue = $this->User_Name->displayValue($arwrk);
                } else {
                    $this->User_Name->ViewValue = $this->User_Name->CurrentValue;
                }
            }
        } else {
            $this->User_Name->ViewValue = null;
        }
        $this->User_Name->ViewCustomAttributes = "";

        // mail_id
        $this->mail_id->ViewValue = $this->mail_id->CurrentValue;
        $this->mail_id->ViewCustomAttributes = "";

        // mobile_no
        $this->mobile_no->ViewValue = $this->mobile_no->CurrentValue;
        $this->mobile_no->ViewCustomAttributes = "";

        // password
        $this->_password->ViewValue = $Language->phrase("PasswordMask");
        $this->_password->ViewCustomAttributes = "";

        // email_verified
        if (strval($this->email_verified->CurrentValue) != "") {
            $this->email_verified->ViewValue = $this->email_verified->optionCaption($this->email_verified->CurrentValue);
        } else {
            $this->email_verified->ViewValue = null;
        }
        $this->email_verified->ViewCustomAttributes = "";

        // ReportTo
        $this->ReportTo->ViewValue = $this->ReportTo->CurrentValue;
        $this->ReportTo->ViewValue = FormatNumber($this->ReportTo->ViewValue, 0, -2, -2, -2);
        $this->ReportTo->ViewCustomAttributes = "";

        // UserLevel
        if ($Security->canAdmin()) { // System admin
            $curVal = trim(strval($this->_UserLevel->CurrentValue));
            if ($curVal != "") {
                $this->_UserLevel->ViewValue = $this->_UserLevel->lookupCacheOption($curVal);
                if ($this->_UserLevel->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->_UserLevel->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->_UserLevel->Lookup->renderViewRow($rswrk[0]);
                        $this->_UserLevel->ViewValue = $this->_UserLevel->displayValue($arwrk);
                    } else {
                        $this->_UserLevel->ViewValue = $this->_UserLevel->CurrentValue;
                    }
                }
            } else {
                $this->_UserLevel->ViewValue = null;
            }
        } else {
            $this->_UserLevel->ViewValue = $Language->phrase("PasswordMask");
        }
        $this->_UserLevel->ViewCustomAttributes = "";

        // CreatedDateTime
        $this->CreatedDateTime->ViewValue = $this->CreatedDateTime->CurrentValue;
        $this->CreatedDateTime->ViewValue = FormatDateTime($this->CreatedDateTime->ViewValue, 0);
        $this->CreatedDateTime->ViewCustomAttributes = "";

        // profilefield
        $this->profilefield->ViewValue = $this->profilefield->CurrentValue;
        $this->profilefield->ViewCustomAttributes = "";

        // UserID
        $this->_UserID->ViewValue = $this->_UserID->CurrentValue;
        $this->_UserID->ViewValue = FormatNumber($this->_UserID->ViewValue, 0, -2, -2, -2);
        $this->_UserID->ViewCustomAttributes = "";

        // GroupID
        $this->GroupID->ViewValue = $this->GroupID->CurrentValue;
        $this->GroupID->ViewValue = FormatNumber($this->GroupID->ViewValue, 0, -2, -2, -2);
        $this->GroupID->ViewCustomAttributes = "";

        // HospID
        $curVal = trim(strval($this->HospID->CurrentValue));
        if ($curVal != "") {
            $this->HospID->ViewValue = $this->HospID->lookupCacheOption($curVal);
            if ($this->HospID->ViewValue === null) { // Lookup from database
                $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                $sqlWrk = $this->HospID->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->HospID->Lookup->renderViewRow($rswrk[0]);
                    $this->HospID->ViewValue = $this->HospID->displayValue($arwrk);
                } else {
                    $this->HospID->ViewValue = $this->HospID->CurrentValue;
                }
            }
        } else {
            $this->HospID->ViewValue = null;
        }
        $this->HospID->ViewCustomAttributes = "";

        // PharID
        $curVal = trim(strval($this->PharID->CurrentValue));
        if ($curVal != "") {
            $this->PharID->ViewValue = $this->PharID->lookupCacheOption($curVal);
            if ($this->PharID->ViewValue === null) { // Lookup from database
                $arwrk = explode(",", $curVal);
                $filterWrk = "";
                foreach ($arwrk as $wrk) {
                    if ($filterWrk != "") {
                        $filterWrk .= " OR ";
                    }
                    $filterWrk .= "`id`" . SearchString("=", trim($wrk), DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->PharID->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $this->PharID->ViewValue = new OptionValues();
                    foreach ($rswrk as $row) {
                        $arwrk = $this->PharID->Lookup->renderViewRow($row);
                        $this->PharID->ViewValue->add($this->PharID->displayValue($arwrk));
                    }
                } else {
                    $this->PharID->ViewValue = $this->PharID->CurrentValue;
                }
            }
        } else {
            $this->PharID->ViewValue = null;
        }
        $this->PharID->ViewCustomAttributes = "";

        // StoreID
        $curVal = trim(strval($this->StoreID->CurrentValue));
        if ($curVal != "") {
            $this->StoreID->ViewValue = $this->StoreID->lookupCacheOption($curVal);
            if ($this->StoreID->ViewValue === null) { // Lookup from database
                $arwrk = explode(",", $curVal);
                $filterWrk = "";
                foreach ($arwrk as $wrk) {
                    if ($filterWrk != "") {
                        $filterWrk .= " OR ";
                    }
                    $filterWrk .= "`id`" . SearchString("=", trim($wrk), DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->StoreID->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $this->StoreID->ViewValue = new OptionValues();
                    foreach ($rswrk as $row) {
                        $arwrk = $this->StoreID->Lookup->renderViewRow($row);
                        $this->StoreID->ViewValue->add($this->StoreID->displayValue($arwrk));
                    }
                } else {
                    $this->StoreID->ViewValue = $this->StoreID->CurrentValue;
                }
            }
        } else {
            $this->StoreID->ViewValue = null;
        }
        $this->StoreID->ViewCustomAttributes = "";

        // OTP
        $this->OTP->ViewValue = $this->OTP->CurrentValue;
        $this->OTP->ViewCustomAttributes = "";

        // LoginType
        $this->_LoginType->ViewValue = $this->_LoginType->CurrentValue;
        $this->_LoginType->ViewValue = FormatNumber($this->_LoginType->ViewValue, 0, -2, -2, -2);
        $this->_LoginType->ViewCustomAttributes = "";

        // BranchId
        $this->BranchId->ViewValue = $this->BranchId->CurrentValue;
        $this->BranchId->ViewValue = FormatNumber($this->BranchId->ViewValue, 0, -2, -2, -2);
        $this->BranchId->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // User_Name
        $this->User_Name->LinkCustomAttributes = "";
        $this->User_Name->HrefValue = "";
        $this->User_Name->TooltipValue = "";

        // mail_id
        $this->mail_id->LinkCustomAttributes = "";
        $this->mail_id->HrefValue = "";
        $this->mail_id->TooltipValue = "";

        // mobile_no
        $this->mobile_no->LinkCustomAttributes = "";
        $this->mobile_no->HrefValue = "";
        $this->mobile_no->TooltipValue = "";

        // password
        $this->_password->LinkCustomAttributes = "";
        $this->_password->HrefValue = "";
        $this->_password->TooltipValue = "";

        // email_verified
        $this->email_verified->LinkCustomAttributes = "";
        $this->email_verified->HrefValue = "";
        $this->email_verified->TooltipValue = "";

        // ReportTo
        $this->ReportTo->LinkCustomAttributes = "";
        $this->ReportTo->HrefValue = "";
        $this->ReportTo->TooltipValue = "";

        // UserLevel
        $this->_UserLevel->LinkCustomAttributes = "";
        $this->_UserLevel->HrefValue = "";
        $this->_UserLevel->TooltipValue = "";

        // CreatedDateTime
        $this->CreatedDateTime->LinkCustomAttributes = "";
        $this->CreatedDateTime->HrefValue = "";
        $this->CreatedDateTime->TooltipValue = "";

        // profilefield
        $this->profilefield->LinkCustomAttributes = "";
        $this->profilefield->HrefValue = "";
        $this->profilefield->TooltipValue = "";

        // UserID
        $this->_UserID->LinkCustomAttributes = "";
        $this->_UserID->HrefValue = "";
        $this->_UserID->TooltipValue = "";

        // GroupID
        $this->GroupID->LinkCustomAttributes = "";
        $this->GroupID->HrefValue = "";
        $this->GroupID->TooltipValue = "";

        // HospID
        $this->HospID->LinkCustomAttributes = "";
        $this->HospID->HrefValue = "";
        $this->HospID->TooltipValue = "";

        // PharID
        $this->PharID->LinkCustomAttributes = "";
        $this->PharID->HrefValue = "";
        $this->PharID->TooltipValue = "";

        // StoreID
        $this->StoreID->LinkCustomAttributes = "";
        $this->StoreID->HrefValue = "";
        $this->StoreID->TooltipValue = "";

        // OTP
        $this->OTP->LinkCustomAttributes = "";
        $this->OTP->HrefValue = "";
        $this->OTP->TooltipValue = "";

        // LoginType
        $this->_LoginType->LinkCustomAttributes = "";
        $this->_LoginType->HrefValue = "";
        $this->_LoginType->TooltipValue = "";

        // BranchId
        $this->BranchId->LinkCustomAttributes = "";
        $this->BranchId->HrefValue = "";
        $this->BranchId->TooltipValue = "";

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

        // User_Name
        $this->User_Name->EditAttrs["class"] = "form-control";
        $this->User_Name->EditCustomAttributes = "";
        if (!$this->User_Name->Raw) {
            $this->User_Name->CurrentValue = HtmlDecode($this->User_Name->CurrentValue);
        }
        $this->User_Name->EditValue = $this->User_Name->CurrentValue;
        $this->User_Name->PlaceHolder = RemoveHtml($this->User_Name->caption());

        // mail_id
        $this->mail_id->EditAttrs["class"] = "form-control";
        $this->mail_id->EditCustomAttributes = "";
        if (!$this->mail_id->Raw) {
            $this->mail_id->CurrentValue = HtmlDecode($this->mail_id->CurrentValue);
        }
        $this->mail_id->EditValue = $this->mail_id->CurrentValue;
        $this->mail_id->PlaceHolder = RemoveHtml($this->mail_id->caption());

        // mobile_no
        $this->mobile_no->EditAttrs["class"] = "form-control";
        $this->mobile_no->EditCustomAttributes = "";
        if (!$this->mobile_no->Raw) {
            $this->mobile_no->CurrentValue = HtmlDecode($this->mobile_no->CurrentValue);
        }
        $this->mobile_no->EditValue = $this->mobile_no->CurrentValue;
        $this->mobile_no->PlaceHolder = RemoveHtml($this->mobile_no->caption());

        // password
        $this->_password->EditAttrs["class"] = "form-control";
        $this->_password->EditCustomAttributes = "";
        $this->_password->EditValue = $Language->phrase("PasswordMask"); // Show as masked password
        $this->_password->PlaceHolder = RemoveHtml($this->_password->caption());

        // email_verified
        $this->email_verified->EditAttrs["class"] = "form-control";
        $this->email_verified->EditCustomAttributes = "";
        $this->email_verified->EditValue = $this->email_verified->options(true);
        $this->email_verified->PlaceHolder = RemoveHtml($this->email_verified->caption());

        // ReportTo

        // UserLevel
        $this->_UserLevel->EditAttrs["class"] = "form-control";
        $this->_UserLevel->EditCustomAttributes = "";
        if (!$Security->canAdmin()) { // System admin
            $this->_UserLevel->EditValue = $Language->phrase("PasswordMask");
        } else {
            $this->_UserLevel->PlaceHolder = RemoveHtml($this->_UserLevel->caption());
        }

        // CreatedDateTime

        // profilefield

        // UserID
        $this->_UserID->EditAttrs["class"] = "form-control";
        $this->_UserID->EditCustomAttributes = "";
        $this->_UserID->EditValue = $this->_UserID->CurrentValue;
        $this->_UserID->PlaceHolder = RemoveHtml($this->_UserID->caption());

        // GroupID

        // HospID
        $this->HospID->EditAttrs["class"] = "form-control";
        $this->HospID->EditCustomAttributes = "";
        $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

        // PharID
        $this->PharID->EditCustomAttributes = "";
        $this->PharID->PlaceHolder = RemoveHtml($this->PharID->caption());

        // StoreID
        $this->StoreID->EditCustomAttributes = "";
        $this->StoreID->PlaceHolder = RemoveHtml($this->StoreID->caption());

        // OTP
        $this->OTP->EditAttrs["class"] = "form-control";
        $this->OTP->EditCustomAttributes = "";
        if (!$this->OTP->Raw) {
            $this->OTP->CurrentValue = HtmlDecode($this->OTP->CurrentValue);
        }
        $this->OTP->EditValue = $this->OTP->CurrentValue;
        $this->OTP->PlaceHolder = RemoveHtml($this->OTP->caption());

        // LoginType
        $this->_LoginType->EditAttrs["class"] = "form-control";
        $this->_LoginType->EditCustomAttributes = "";
        $this->_LoginType->EditValue = $this->_LoginType->CurrentValue;
        $this->_LoginType->PlaceHolder = RemoveHtml($this->_LoginType->caption());

        // BranchId
        $this->BranchId->EditAttrs["class"] = "form-control";
        $this->BranchId->EditCustomAttributes = "";
        $this->BranchId->EditValue = $this->BranchId->CurrentValue;
        $this->BranchId->PlaceHolder = RemoveHtml($this->BranchId->caption());

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
                    $doc->exportCaption($this->User_Name);
                    $doc->exportCaption($this->mail_id);
                    $doc->exportCaption($this->mobile_no);
                    $doc->exportCaption($this->_password);
                    $doc->exportCaption($this->email_verified);
                    $doc->exportCaption($this->ReportTo);
                    $doc->exportCaption($this->_UserLevel);
                    $doc->exportCaption($this->CreatedDateTime);
                    $doc->exportCaption($this->profilefield);
                    $doc->exportCaption($this->_UserID);
                    $doc->exportCaption($this->GroupID);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->PharID);
                    $doc->exportCaption($this->StoreID);
                    $doc->exportCaption($this->OTP);
                    $doc->exportCaption($this->_LoginType);
                    $doc->exportCaption($this->BranchId);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->User_Name);
                    $doc->exportCaption($this->mail_id);
                    $doc->exportCaption($this->mobile_no);
                    $doc->exportCaption($this->_password);
                    $doc->exportCaption($this->email_verified);
                    $doc->exportCaption($this->ReportTo);
                    $doc->exportCaption($this->_UserLevel);
                    $doc->exportCaption($this->CreatedDateTime);
                    $doc->exportCaption($this->profilefield);
                    $doc->exportCaption($this->_UserID);
                    $doc->exportCaption($this->GroupID);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->PharID);
                    $doc->exportCaption($this->StoreID);
                    $doc->exportCaption($this->OTP);
                    $doc->exportCaption($this->_LoginType);
                    $doc->exportCaption($this->BranchId);
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
                        $doc->exportField($this->User_Name);
                        $doc->exportField($this->mail_id);
                        $doc->exportField($this->mobile_no);
                        $doc->exportField($this->_password);
                        $doc->exportField($this->email_verified);
                        $doc->exportField($this->ReportTo);
                        $doc->exportField($this->_UserLevel);
                        $doc->exportField($this->CreatedDateTime);
                        $doc->exportField($this->profilefield);
                        $doc->exportField($this->_UserID);
                        $doc->exportField($this->GroupID);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->PharID);
                        $doc->exportField($this->StoreID);
                        $doc->exportField($this->OTP);
                        $doc->exportField($this->_LoginType);
                        $doc->exportField($this->BranchId);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->User_Name);
                        $doc->exportField($this->mail_id);
                        $doc->exportField($this->mobile_no);
                        $doc->exportField($this->_password);
                        $doc->exportField($this->email_verified);
                        $doc->exportField($this->ReportTo);
                        $doc->exportField($this->_UserLevel);
                        $doc->exportField($this->CreatedDateTime);
                        $doc->exportField($this->profilefield);
                        $doc->exportField($this->_UserID);
                        $doc->exportField($this->GroupID);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->PharID);
                        $doc->exportField($this->StoreID);
                        $doc->exportField($this->OTP);
                        $doc->exportField($this->_LoginType);
                        $doc->exportField($this->BranchId);
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
