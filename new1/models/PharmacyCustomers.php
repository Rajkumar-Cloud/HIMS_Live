<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for pharmacy_customers
 */
class PharmacyCustomers extends DbTable
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
    public $Customercode;
    public $Customername;
    public $Address1;
    public $Address2;
    public $Address3;
    public $State;
    public $Pincode;
    public $Phone;
    public $Fax;
    public $_Email;
    public $Ratetype;
    public $Creationdate;
    public $ContactPerson;
    public $CPPhone;
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
        $this->TableVar = 'pharmacy_customers';
        $this->TableName = 'pharmacy_customers';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`pharmacy_customers`";
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

        // Customercode
        $this->Customercode = new DbField('pharmacy_customers', 'pharmacy_customers', 'x_Customercode', 'Customercode', '`Customercode`', '`Customercode`', 3, 11, -1, false, '`Customercode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Customercode->Nullable = false; // NOT NULL field
        $this->Customercode->Required = true; // Required field
        $this->Customercode->Sortable = true; // Allow sort
        $this->Customercode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['Customercode'] = &$this->Customercode;

        // Customername
        $this->Customername = new DbField('pharmacy_customers', 'pharmacy_customers', 'x_Customername', 'Customername', '`Customername`', '`Customername`', 201, 1000, -1, false, '`Customername`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Customername->Sortable = true; // Allow sort
        $this->Fields['Customername'] = &$this->Customername;

        // Address1
        $this->Address1 = new DbField('pharmacy_customers', 'pharmacy_customers', 'x_Address1', 'Address1', '`Address1`', '`Address1`', 200, 250, -1, false, '`Address1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Address1->Sortable = true; // Allow sort
        $this->Fields['Address1'] = &$this->Address1;

        // Address2
        $this->Address2 = new DbField('pharmacy_customers', 'pharmacy_customers', 'x_Address2', 'Address2', '`Address2`', '`Address2`', 200, 250, -1, false, '`Address2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Address2->Sortable = true; // Allow sort
        $this->Fields['Address2'] = &$this->Address2;

        // Address3
        $this->Address3 = new DbField('pharmacy_customers', 'pharmacy_customers', 'x_Address3', 'Address3', '`Address3`', '`Address3`', 200, 250, -1, false, '`Address3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Address3->Sortable = true; // Allow sort
        $this->Fields['Address3'] = &$this->Address3;

        // State
        $this->State = new DbField('pharmacy_customers', 'pharmacy_customers', 'x_State', 'State', '`State`', '`State`', 200, 50, -1, false, '`State`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->State->Sortable = true; // Allow sort
        $this->Fields['State'] = &$this->State;

        // Pincode
        $this->Pincode = new DbField('pharmacy_customers', 'pharmacy_customers', 'x_Pincode', 'Pincode', '`Pincode`', '`Pincode`', 200, 50, -1, false, '`Pincode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Pincode->Sortable = true; // Allow sort
        $this->Fields['Pincode'] = &$this->Pincode;

        // Phone
        $this->Phone = new DbField('pharmacy_customers', 'pharmacy_customers', 'x_Phone', 'Phone', '`Phone`', '`Phone`', 200, 40, -1, false, '`Phone`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Phone->Sortable = true; // Allow sort
        $this->Fields['Phone'] = &$this->Phone;

        // Fax
        $this->Fax = new DbField('pharmacy_customers', 'pharmacy_customers', 'x_Fax', 'Fax', '`Fax`', '`Fax`', 200, 40, -1, false, '`Fax`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Fax->Sortable = true; // Allow sort
        $this->Fields['Fax'] = &$this->Fax;

        // Email
        $this->_Email = new DbField('pharmacy_customers', 'pharmacy_customers', 'x__Email', 'Email', '`Email`', '`Email`', 200, 100, -1, false, '`Email`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->_Email->Sortable = true; // Allow sort
        $this->Fields['Email'] = &$this->_Email;

        // Ratetype
        $this->Ratetype = new DbField('pharmacy_customers', 'pharmacy_customers', 'x_Ratetype', 'Ratetype', '`Ratetype`', '`Ratetype`', 200, 40, -1, false, '`Ratetype`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Ratetype->Sortable = true; // Allow sort
        $this->Fields['Ratetype'] = &$this->Ratetype;

        // Creationdate
        $this->Creationdate = new DbField('pharmacy_customers', 'pharmacy_customers', 'x_Creationdate', 'Creationdate', '`Creationdate`', CastDateFieldForLike("`Creationdate`", 0, "DB"), 135, 23, 0, false, '`Creationdate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Creationdate->Sortable = true; // Allow sort
        $this->Creationdate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['Creationdate'] = &$this->Creationdate;

        // ContactPerson
        $this->ContactPerson = new DbField('pharmacy_customers', 'pharmacy_customers', 'x_ContactPerson', 'ContactPerson', '`ContactPerson`', '`ContactPerson`', 200, 100, -1, false, '`ContactPerson`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ContactPerson->Sortable = true; // Allow sort
        $this->Fields['ContactPerson'] = &$this->ContactPerson;

        // CPPhone
        $this->CPPhone = new DbField('pharmacy_customers', 'pharmacy_customers', 'x_CPPhone', 'CPPhone', '`CPPhone`', '`CPPhone`', 200, 50, -1, false, '`CPPhone`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CPPhone->Sortable = true; // Allow sort
        $this->Fields['CPPhone'] = &$this->CPPhone;

        // id
        $this->id = new DbField('pharmacy_customers', 'pharmacy_customers', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`pharmacy_customers`";
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
        $this->Customercode->DbValue = $row['Customercode'];
        $this->Customername->DbValue = $row['Customername'];
        $this->Address1->DbValue = $row['Address1'];
        $this->Address2->DbValue = $row['Address2'];
        $this->Address3->DbValue = $row['Address3'];
        $this->State->DbValue = $row['State'];
        $this->Pincode->DbValue = $row['Pincode'];
        $this->Phone->DbValue = $row['Phone'];
        $this->Fax->DbValue = $row['Fax'];
        $this->_Email->DbValue = $row['Email'];
        $this->Ratetype->DbValue = $row['Ratetype'];
        $this->Creationdate->DbValue = $row['Creationdate'];
        $this->ContactPerson->DbValue = $row['ContactPerson'];
        $this->CPPhone->DbValue = $row['CPPhone'];
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
            return GetUrl("PharmacyCustomersList");
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
        if ($pageName == "PharmacyCustomersView") {
            return $Language->phrase("View");
        } elseif ($pageName == "PharmacyCustomersEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "PharmacyCustomersAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "PharmacyCustomersList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("PharmacyCustomersView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("PharmacyCustomersView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "PharmacyCustomersAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "PharmacyCustomersAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("PharmacyCustomersEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("PharmacyCustomersAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("PharmacyCustomersDelete", $this->getUrlParm());
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
        $this->Customercode->setDbValue($row['Customercode']);
        $this->Customername->setDbValue($row['Customername']);
        $this->Address1->setDbValue($row['Address1']);
        $this->Address2->setDbValue($row['Address2']);
        $this->Address3->setDbValue($row['Address3']);
        $this->State->setDbValue($row['State']);
        $this->Pincode->setDbValue($row['Pincode']);
        $this->Phone->setDbValue($row['Phone']);
        $this->Fax->setDbValue($row['Fax']);
        $this->_Email->setDbValue($row['Email']);
        $this->Ratetype->setDbValue($row['Ratetype']);
        $this->Creationdate->setDbValue($row['Creationdate']);
        $this->ContactPerson->setDbValue($row['ContactPerson']);
        $this->CPPhone->setDbValue($row['CPPhone']);
        $this->id->setDbValue($row['id']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // Customercode

        // Customername

        // Address1

        // Address2

        // Address3

        // State

        // Pincode

        // Phone

        // Fax

        // Email

        // Ratetype

        // Creationdate

        // ContactPerson

        // CPPhone

        // id

        // Customercode
        $this->Customercode->ViewValue = $this->Customercode->CurrentValue;
        $this->Customercode->ViewValue = FormatNumber($this->Customercode->ViewValue, 0, -2, -2, -2);
        $this->Customercode->ViewCustomAttributes = "";

        // Customername
        $this->Customername->ViewValue = $this->Customername->CurrentValue;
        $this->Customername->ViewCustomAttributes = "";

        // Address1
        $this->Address1->ViewValue = $this->Address1->CurrentValue;
        $this->Address1->ViewCustomAttributes = "";

        // Address2
        $this->Address2->ViewValue = $this->Address2->CurrentValue;
        $this->Address2->ViewCustomAttributes = "";

        // Address3
        $this->Address3->ViewValue = $this->Address3->CurrentValue;
        $this->Address3->ViewCustomAttributes = "";

        // State
        $this->State->ViewValue = $this->State->CurrentValue;
        $this->State->ViewCustomAttributes = "";

        // Pincode
        $this->Pincode->ViewValue = $this->Pincode->CurrentValue;
        $this->Pincode->ViewCustomAttributes = "";

        // Phone
        $this->Phone->ViewValue = $this->Phone->CurrentValue;
        $this->Phone->ViewCustomAttributes = "";

        // Fax
        $this->Fax->ViewValue = $this->Fax->CurrentValue;
        $this->Fax->ViewCustomAttributes = "";

        // Email
        $this->_Email->ViewValue = $this->_Email->CurrentValue;
        $this->_Email->ViewCustomAttributes = "";

        // Ratetype
        $this->Ratetype->ViewValue = $this->Ratetype->CurrentValue;
        $this->Ratetype->ViewCustomAttributes = "";

        // Creationdate
        $this->Creationdate->ViewValue = $this->Creationdate->CurrentValue;
        $this->Creationdate->ViewValue = FormatDateTime($this->Creationdate->ViewValue, 0);
        $this->Creationdate->ViewCustomAttributes = "";

        // ContactPerson
        $this->ContactPerson->ViewValue = $this->ContactPerson->CurrentValue;
        $this->ContactPerson->ViewCustomAttributes = "";

        // CPPhone
        $this->CPPhone->ViewValue = $this->CPPhone->CurrentValue;
        $this->CPPhone->ViewCustomAttributes = "";

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // Customercode
        $this->Customercode->LinkCustomAttributes = "";
        $this->Customercode->HrefValue = "";
        $this->Customercode->TooltipValue = "";

        // Customername
        $this->Customername->LinkCustomAttributes = "";
        $this->Customername->HrefValue = "";
        $this->Customername->TooltipValue = "";

        // Address1
        $this->Address1->LinkCustomAttributes = "";
        $this->Address1->HrefValue = "";
        $this->Address1->TooltipValue = "";

        // Address2
        $this->Address2->LinkCustomAttributes = "";
        $this->Address2->HrefValue = "";
        $this->Address2->TooltipValue = "";

        // Address3
        $this->Address3->LinkCustomAttributes = "";
        $this->Address3->HrefValue = "";
        $this->Address3->TooltipValue = "";

        // State
        $this->State->LinkCustomAttributes = "";
        $this->State->HrefValue = "";
        $this->State->TooltipValue = "";

        // Pincode
        $this->Pincode->LinkCustomAttributes = "";
        $this->Pincode->HrefValue = "";
        $this->Pincode->TooltipValue = "";

        // Phone
        $this->Phone->LinkCustomAttributes = "";
        $this->Phone->HrefValue = "";
        $this->Phone->TooltipValue = "";

        // Fax
        $this->Fax->LinkCustomAttributes = "";
        $this->Fax->HrefValue = "";
        $this->Fax->TooltipValue = "";

        // Email
        $this->_Email->LinkCustomAttributes = "";
        $this->_Email->HrefValue = "";
        $this->_Email->TooltipValue = "";

        // Ratetype
        $this->Ratetype->LinkCustomAttributes = "";
        $this->Ratetype->HrefValue = "";
        $this->Ratetype->TooltipValue = "";

        // Creationdate
        $this->Creationdate->LinkCustomAttributes = "";
        $this->Creationdate->HrefValue = "";
        $this->Creationdate->TooltipValue = "";

        // ContactPerson
        $this->ContactPerson->LinkCustomAttributes = "";
        $this->ContactPerson->HrefValue = "";
        $this->ContactPerson->TooltipValue = "";

        // CPPhone
        $this->CPPhone->LinkCustomAttributes = "";
        $this->CPPhone->HrefValue = "";
        $this->CPPhone->TooltipValue = "";

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

        // Customercode
        $this->Customercode->EditAttrs["class"] = "form-control";
        $this->Customercode->EditCustomAttributes = "";
        $this->Customercode->EditValue = $this->Customercode->CurrentValue;
        $this->Customercode->PlaceHolder = RemoveHtml($this->Customercode->caption());

        // Customername
        $this->Customername->EditAttrs["class"] = "form-control";
        $this->Customername->EditCustomAttributes = "";
        $this->Customername->EditValue = $this->Customername->CurrentValue;
        $this->Customername->PlaceHolder = RemoveHtml($this->Customername->caption());

        // Address1
        $this->Address1->EditAttrs["class"] = "form-control";
        $this->Address1->EditCustomAttributes = "";
        if (!$this->Address1->Raw) {
            $this->Address1->CurrentValue = HtmlDecode($this->Address1->CurrentValue);
        }
        $this->Address1->EditValue = $this->Address1->CurrentValue;
        $this->Address1->PlaceHolder = RemoveHtml($this->Address1->caption());

        // Address2
        $this->Address2->EditAttrs["class"] = "form-control";
        $this->Address2->EditCustomAttributes = "";
        if (!$this->Address2->Raw) {
            $this->Address2->CurrentValue = HtmlDecode($this->Address2->CurrentValue);
        }
        $this->Address2->EditValue = $this->Address2->CurrentValue;
        $this->Address2->PlaceHolder = RemoveHtml($this->Address2->caption());

        // Address3
        $this->Address3->EditAttrs["class"] = "form-control";
        $this->Address3->EditCustomAttributes = "";
        if (!$this->Address3->Raw) {
            $this->Address3->CurrentValue = HtmlDecode($this->Address3->CurrentValue);
        }
        $this->Address3->EditValue = $this->Address3->CurrentValue;
        $this->Address3->PlaceHolder = RemoveHtml($this->Address3->caption());

        // State
        $this->State->EditAttrs["class"] = "form-control";
        $this->State->EditCustomAttributes = "";
        if (!$this->State->Raw) {
            $this->State->CurrentValue = HtmlDecode($this->State->CurrentValue);
        }
        $this->State->EditValue = $this->State->CurrentValue;
        $this->State->PlaceHolder = RemoveHtml($this->State->caption());

        // Pincode
        $this->Pincode->EditAttrs["class"] = "form-control";
        $this->Pincode->EditCustomAttributes = "";
        if (!$this->Pincode->Raw) {
            $this->Pincode->CurrentValue = HtmlDecode($this->Pincode->CurrentValue);
        }
        $this->Pincode->EditValue = $this->Pincode->CurrentValue;
        $this->Pincode->PlaceHolder = RemoveHtml($this->Pincode->caption());

        // Phone
        $this->Phone->EditAttrs["class"] = "form-control";
        $this->Phone->EditCustomAttributes = "";
        if (!$this->Phone->Raw) {
            $this->Phone->CurrentValue = HtmlDecode($this->Phone->CurrentValue);
        }
        $this->Phone->EditValue = $this->Phone->CurrentValue;
        $this->Phone->PlaceHolder = RemoveHtml($this->Phone->caption());

        // Fax
        $this->Fax->EditAttrs["class"] = "form-control";
        $this->Fax->EditCustomAttributes = "";
        if (!$this->Fax->Raw) {
            $this->Fax->CurrentValue = HtmlDecode($this->Fax->CurrentValue);
        }
        $this->Fax->EditValue = $this->Fax->CurrentValue;
        $this->Fax->PlaceHolder = RemoveHtml($this->Fax->caption());

        // Email
        $this->_Email->EditAttrs["class"] = "form-control";
        $this->_Email->EditCustomAttributes = "";
        if (!$this->_Email->Raw) {
            $this->_Email->CurrentValue = HtmlDecode($this->_Email->CurrentValue);
        }
        $this->_Email->EditValue = $this->_Email->CurrentValue;
        $this->_Email->PlaceHolder = RemoveHtml($this->_Email->caption());

        // Ratetype
        $this->Ratetype->EditAttrs["class"] = "form-control";
        $this->Ratetype->EditCustomAttributes = "";
        if (!$this->Ratetype->Raw) {
            $this->Ratetype->CurrentValue = HtmlDecode($this->Ratetype->CurrentValue);
        }
        $this->Ratetype->EditValue = $this->Ratetype->CurrentValue;
        $this->Ratetype->PlaceHolder = RemoveHtml($this->Ratetype->caption());

        // Creationdate
        $this->Creationdate->EditAttrs["class"] = "form-control";
        $this->Creationdate->EditCustomAttributes = "";
        $this->Creationdate->EditValue = FormatDateTime($this->Creationdate->CurrentValue, 8);
        $this->Creationdate->PlaceHolder = RemoveHtml($this->Creationdate->caption());

        // ContactPerson
        $this->ContactPerson->EditAttrs["class"] = "form-control";
        $this->ContactPerson->EditCustomAttributes = "";
        if (!$this->ContactPerson->Raw) {
            $this->ContactPerson->CurrentValue = HtmlDecode($this->ContactPerson->CurrentValue);
        }
        $this->ContactPerson->EditValue = $this->ContactPerson->CurrentValue;
        $this->ContactPerson->PlaceHolder = RemoveHtml($this->ContactPerson->caption());

        // CPPhone
        $this->CPPhone->EditAttrs["class"] = "form-control";
        $this->CPPhone->EditCustomAttributes = "";
        if (!$this->CPPhone->Raw) {
            $this->CPPhone->CurrentValue = HtmlDecode($this->CPPhone->CurrentValue);
        }
        $this->CPPhone->EditValue = $this->CPPhone->CurrentValue;
        $this->CPPhone->PlaceHolder = RemoveHtml($this->CPPhone->caption());

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
                    $doc->exportCaption($this->Customercode);
                    $doc->exportCaption($this->Customername);
                    $doc->exportCaption($this->Address1);
                    $doc->exportCaption($this->Address2);
                    $doc->exportCaption($this->Address3);
                    $doc->exportCaption($this->State);
                    $doc->exportCaption($this->Pincode);
                    $doc->exportCaption($this->Phone);
                    $doc->exportCaption($this->Fax);
                    $doc->exportCaption($this->_Email);
                    $doc->exportCaption($this->Ratetype);
                    $doc->exportCaption($this->Creationdate);
                    $doc->exportCaption($this->ContactPerson);
                    $doc->exportCaption($this->CPPhone);
                    $doc->exportCaption($this->id);
                } else {
                    $doc->exportCaption($this->Customercode);
                    $doc->exportCaption($this->Address1);
                    $doc->exportCaption($this->Address2);
                    $doc->exportCaption($this->Address3);
                    $doc->exportCaption($this->State);
                    $doc->exportCaption($this->Pincode);
                    $doc->exportCaption($this->Phone);
                    $doc->exportCaption($this->Fax);
                    $doc->exportCaption($this->_Email);
                    $doc->exportCaption($this->Ratetype);
                    $doc->exportCaption($this->Creationdate);
                    $doc->exportCaption($this->ContactPerson);
                    $doc->exportCaption($this->CPPhone);
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
                        $doc->exportField($this->Customercode);
                        $doc->exportField($this->Customername);
                        $doc->exportField($this->Address1);
                        $doc->exportField($this->Address2);
                        $doc->exportField($this->Address3);
                        $doc->exportField($this->State);
                        $doc->exportField($this->Pincode);
                        $doc->exportField($this->Phone);
                        $doc->exportField($this->Fax);
                        $doc->exportField($this->_Email);
                        $doc->exportField($this->Ratetype);
                        $doc->exportField($this->Creationdate);
                        $doc->exportField($this->ContactPerson);
                        $doc->exportField($this->CPPhone);
                        $doc->exportField($this->id);
                    } else {
                        $doc->exportField($this->Customercode);
                        $doc->exportField($this->Address1);
                        $doc->exportField($this->Address2);
                        $doc->exportField($this->Address3);
                        $doc->exportField($this->State);
                        $doc->exportField($this->Pincode);
                        $doc->exportField($this->Phone);
                        $doc->exportField($this->Fax);
                        $doc->exportField($this->_Email);
                        $doc->exportField($this->Ratetype);
                        $doc->exportField($this->Creationdate);
                        $doc->exportField($this->ContactPerson);
                        $doc->exportField($this->CPPhone);
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
