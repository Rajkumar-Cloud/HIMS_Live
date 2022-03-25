<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_dashboard_service_details
 */
class ViewDashboardServiceDetails extends DbTable
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
    public $PatientId;
    public $PatientName;
    public $Services;
    public $amount;
    public $SubTotal;
    public $createdby;
    public $createddatetime;
    public $createdDate;
    public $DrName;
    public $DRDepartment;
    public $ItemCode;
    public $DEptCd;
    public $CODE;
    public $SERVICE;
    public $SERVICE_TYPE;
    public $DEPARTMENT;
    public $HospID;
    public $vid;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'view_dashboard_service_details';
        $this->TableName = 'view_dashboard_service_details';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_dashboard_service_details`";
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

        // PatientId
        $this->PatientId = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_PatientId', 'PatientId', '`PatientId`', '`PatientId`', 200, 45, -1, false, '`PatientId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientId->Sortable = true; // Allow sort
        $this->Fields['PatientId'] = &$this->PatientId;

        // PatientName
        $this->PatientName = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, false, '`PatientName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientName->Sortable = true; // Allow sort
        $this->Fields['PatientName'] = &$this->PatientName;

        // Services
        $this->Services = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_Services', 'Services', '`Services`', '`Services`', 200, 50, -1, false, '`Services`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Services->Nullable = false; // NOT NULL field
        $this->Services->Required = true; // Required field
        $this->Services->Sortable = true; // Allow sort
        $this->Fields['Services'] = &$this->Services;

        // amount
        $this->amount = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_amount', 'amount', '`amount`', '`amount`', 131, 12, -1, false, '`amount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->amount->Nullable = false; // NOT NULL field
        $this->amount->Required = true; // Required field
        $this->amount->Sortable = true; // Allow sort
        $this->amount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['amount'] = &$this->amount;

        // SubTotal
        $this->SubTotal = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_SubTotal', 'SubTotal', '`SubTotal`', '`SubTotal`', 131, 12, -1, false, '`SubTotal`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SubTotal->Sortable = true; // Allow sort
        $this->SubTotal->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SubTotal->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['SubTotal'] = &$this->SubTotal;

        // createdby
        $this->createdby = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 200, 45, -1, false, '`createdby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdby->Sortable = true; // Allow sort
        $this->Fields['createdby'] = &$this->createdby;

        // createddatetime
        $this->createddatetime = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, false, '`createddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddatetime->Sortable = true; // Allow sort
        $this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['createddatetime'] = &$this->createddatetime;

        // createdDate
        $this->createdDate = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_createdDate', 'createdDate', '`createdDate`', CastDateFieldForLike("`createdDate`", 0, "DB"), 133, 10, 0, false, '`createdDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdDate->Sortable = true; // Allow sort
        $this->createdDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['createdDate'] = &$this->createdDate;

        // DrName
        $this->DrName = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_DrName', 'DrName', '`DrName`', '`DrName`', 200, 45, -1, false, '`DrName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DrName->Sortable = true; // Allow sort
        $this->Fields['DrName'] = &$this->DrName;

        // DRDepartment
        $this->DRDepartment = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_DRDepartment', 'DRDepartment', '`DRDepartment`', '`DRDepartment`', 200, 45, -1, false, '`DRDepartment`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DRDepartment->Sortable = true; // Allow sort
        $this->Fields['DRDepartment'] = &$this->DRDepartment;

        // ItemCode
        $this->ItemCode = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_ItemCode', 'ItemCode', '`ItemCode`', '`ItemCode`', 200, 45, -1, false, '`ItemCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ItemCode->Sortable = true; // Allow sort
        $this->Fields['ItemCode'] = &$this->ItemCode;

        // DEptCd
        $this->DEptCd = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_DEptCd', 'DEptCd', '`DEptCd`', '`DEptCd`', 200, 45, -1, false, '`DEptCd`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DEptCd->Sortable = true; // Allow sort
        $this->Fields['DEptCd'] = &$this->DEptCd;

        // CODE
        $this->CODE = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_CODE', 'CODE', '`CODE`', '`CODE`', 200, 50, -1, false, '`CODE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CODE->Sortable = true; // Allow sort
        $this->Fields['CODE'] = &$this->CODE;

        // SERVICE
        $this->SERVICE = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_SERVICE', 'SERVICE', '`SERVICE`', '`SERVICE`', 200, 50, -1, false, '`SERVICE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SERVICE->Sortable = true; // Allow sort
        $this->Fields['SERVICE'] = &$this->SERVICE;

        // SERVICE_TYPE
        $this->SERVICE_TYPE = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_SERVICE_TYPE', 'SERVICE_TYPE', '`SERVICE_TYPE`', '`SERVICE_TYPE`', 200, 50, -1, false, '`SERVICE_TYPE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SERVICE_TYPE->Sortable = true; // Allow sort
        $this->Fields['SERVICE_TYPE'] = &$this->SERVICE_TYPE;

        // DEPARTMENT
        $this->DEPARTMENT = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_DEPARTMENT', 'DEPARTMENT', '`DEPARTMENT`', '`DEPARTMENT`', 200, 50, -1, false, '`DEPARTMENT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DEPARTMENT->Sortable = true; // Allow sort
        $this->Fields['DEPARTMENT'] = &$this->DEPARTMENT;

        // HospID
        $this->HospID = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['HospID'] = &$this->HospID;

        // vid
        $this->vid = new DbField('view_dashboard_service_details', 'view_dashboard_service_details', 'x_vid', 'vid', '`vid`', '`vid`', 3, 11, -1, false, '`vid`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->vid->Sortable = true; // Allow sort
        $this->vid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['vid'] = &$this->vid;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_dashboard_service_details`";
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
        $this->PatientId->DbValue = $row['PatientId'];
        $this->PatientName->DbValue = $row['PatientName'];
        $this->Services->DbValue = $row['Services'];
        $this->amount->DbValue = $row['amount'];
        $this->SubTotal->DbValue = $row['SubTotal'];
        $this->createdby->DbValue = $row['createdby'];
        $this->createddatetime->DbValue = $row['createddatetime'];
        $this->createdDate->DbValue = $row['createdDate'];
        $this->DrName->DbValue = $row['DrName'];
        $this->DRDepartment->DbValue = $row['DRDepartment'];
        $this->ItemCode->DbValue = $row['ItemCode'];
        $this->DEptCd->DbValue = $row['DEptCd'];
        $this->CODE->DbValue = $row['CODE'];
        $this->SERVICE->DbValue = $row['SERVICE'];
        $this->SERVICE_TYPE->DbValue = $row['SERVICE_TYPE'];
        $this->DEPARTMENT->DbValue = $row['DEPARTMENT'];
        $this->HospID->DbValue = $row['HospID'];
        $this->vid->DbValue = $row['vid'];
    }

    // Delete uploaded files
    public function deleteUploadedFiles($row)
    {
        $this->loadDbValues($row);
    }

    // Record filter WHERE clause
    protected function sqlKeyFilter()
    {
        return "";
    }

    // Get record filter
    public function getRecordFilter($row = null)
    {
        $keyFilter = $this->sqlKeyFilter();
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
            return GetUrl("ViewDashboardServiceDetailsList");
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
        if ($pageName == "ViewDashboardServiceDetailsView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewDashboardServiceDetailsEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewDashboardServiceDetailsAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewDashboardServiceDetailsList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewDashboardServiceDetailsView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewDashboardServiceDetailsView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewDashboardServiceDetailsAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewDashboardServiceDetailsAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewDashboardServiceDetailsEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewDashboardServiceDetailsAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewDashboardServiceDetailsDelete", $this->getUrlParm());
    }

    // Add master url
    public function addMasterUrl($url)
    {
        return $url;
    }

    public function keyToJson($htmlEncode = false)
    {
        $json = "";
        $json = "{" . $json . "}";
        if ($htmlEncode) {
            $json = HtmlEncode($json);
        }
        return $json;
    }

    // Add key value to URL
    public function keyUrl($url, $parm = "")
    {
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
            //return $arKeys; // Do not return yet, so the values will also be checked by the following code
        }
        // Check keys
        $ar = [];
        if (is_array($arKeys)) {
            foreach ($arKeys as $key) {
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
        $this->PatientId->setDbValue($row['PatientId']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->Services->setDbValue($row['Services']);
        $this->amount->setDbValue($row['amount']);
        $this->SubTotal->setDbValue($row['SubTotal']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->createdDate->setDbValue($row['createdDate']);
        $this->DrName->setDbValue($row['DrName']);
        $this->DRDepartment->setDbValue($row['DRDepartment']);
        $this->ItemCode->setDbValue($row['ItemCode']);
        $this->DEptCd->setDbValue($row['DEptCd']);
        $this->CODE->setDbValue($row['CODE']);
        $this->SERVICE->setDbValue($row['SERVICE']);
        $this->SERVICE_TYPE->setDbValue($row['SERVICE_TYPE']);
        $this->DEPARTMENT->setDbValue($row['DEPARTMENT']);
        $this->HospID->setDbValue($row['HospID']);
        $this->vid->setDbValue($row['vid']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // PatientId

        // PatientName

        // Services

        // amount

        // SubTotal

        // createdby

        // createddatetime

        // createdDate

        // DrName

        // DRDepartment

        // ItemCode

        // DEptCd

        // CODE

        // SERVICE

        // SERVICE_TYPE

        // DEPARTMENT

        // HospID

        // vid

        // PatientId
        $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
        $this->PatientId->ViewCustomAttributes = "";

        // PatientName
        $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
        $this->PatientName->ViewCustomAttributes = "";

        // Services
        $this->Services->ViewValue = $this->Services->CurrentValue;
        $this->Services->ViewCustomAttributes = "";

        // amount
        $this->amount->ViewValue = $this->amount->CurrentValue;
        $this->amount->ViewValue = FormatNumber($this->amount->ViewValue, 2, -2, -2, -2);
        $this->amount->ViewCustomAttributes = "";

        // SubTotal
        $this->SubTotal->ViewValue = $this->SubTotal->CurrentValue;
        $this->SubTotal->ViewValue = FormatNumber($this->SubTotal->ViewValue, 2, -2, -2, -2);
        $this->SubTotal->ViewCustomAttributes = "";

        // createdby
        $this->createdby->ViewValue = $this->createdby->CurrentValue;
        $this->createdby->ViewCustomAttributes = "";

        // createddatetime
        $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
        $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
        $this->createddatetime->ViewCustomAttributes = "";

        // createdDate
        $this->createdDate->ViewValue = $this->createdDate->CurrentValue;
        $this->createdDate->ViewValue = FormatDateTime($this->createdDate->ViewValue, 0);
        $this->createdDate->ViewCustomAttributes = "";

        // DrName
        $this->DrName->ViewValue = $this->DrName->CurrentValue;
        $this->DrName->ViewCustomAttributes = "";

        // DRDepartment
        $this->DRDepartment->ViewValue = $this->DRDepartment->CurrentValue;
        $this->DRDepartment->ViewCustomAttributes = "";

        // ItemCode
        $this->ItemCode->ViewValue = $this->ItemCode->CurrentValue;
        $this->ItemCode->ViewCustomAttributes = "";

        // DEptCd
        $this->DEptCd->ViewValue = $this->DEptCd->CurrentValue;
        $this->DEptCd->ViewCustomAttributes = "";

        // CODE
        $this->CODE->ViewValue = $this->CODE->CurrentValue;
        $this->CODE->ViewCustomAttributes = "";

        // SERVICE
        $this->SERVICE->ViewValue = $this->SERVICE->CurrentValue;
        $this->SERVICE->ViewCustomAttributes = "";

        // SERVICE_TYPE
        $this->SERVICE_TYPE->ViewValue = $this->SERVICE_TYPE->CurrentValue;
        $this->SERVICE_TYPE->ViewCustomAttributes = "";

        // DEPARTMENT
        $this->DEPARTMENT->ViewValue = $this->DEPARTMENT->CurrentValue;
        $this->DEPARTMENT->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

        // vid
        $this->vid->ViewValue = $this->vid->CurrentValue;
        $this->vid->ViewValue = FormatNumber($this->vid->ViewValue, 0, -2, -2, -2);
        $this->vid->ViewCustomAttributes = "";

        // PatientId
        $this->PatientId->LinkCustomAttributes = "";
        $this->PatientId->HrefValue = "";
        $this->PatientId->TooltipValue = "";

        // PatientName
        $this->PatientName->LinkCustomAttributes = "";
        $this->PatientName->HrefValue = "";
        $this->PatientName->TooltipValue = "";

        // Services
        $this->Services->LinkCustomAttributes = "";
        $this->Services->HrefValue = "";
        $this->Services->TooltipValue = "";

        // amount
        $this->amount->LinkCustomAttributes = "";
        $this->amount->HrefValue = "";
        $this->amount->TooltipValue = "";

        // SubTotal
        $this->SubTotal->LinkCustomAttributes = "";
        $this->SubTotal->HrefValue = "";
        $this->SubTotal->TooltipValue = "";

        // createdby
        $this->createdby->LinkCustomAttributes = "";
        $this->createdby->HrefValue = "";
        $this->createdby->TooltipValue = "";

        // createddatetime
        $this->createddatetime->LinkCustomAttributes = "";
        $this->createddatetime->HrefValue = "";
        $this->createddatetime->TooltipValue = "";

        // createdDate
        $this->createdDate->LinkCustomAttributes = "";
        $this->createdDate->HrefValue = "";
        $this->createdDate->TooltipValue = "";

        // DrName
        $this->DrName->LinkCustomAttributes = "";
        $this->DrName->HrefValue = "";
        $this->DrName->TooltipValue = "";

        // DRDepartment
        $this->DRDepartment->LinkCustomAttributes = "";
        $this->DRDepartment->HrefValue = "";
        $this->DRDepartment->TooltipValue = "";

        // ItemCode
        $this->ItemCode->LinkCustomAttributes = "";
        $this->ItemCode->HrefValue = "";
        $this->ItemCode->TooltipValue = "";

        // DEptCd
        $this->DEptCd->LinkCustomAttributes = "";
        $this->DEptCd->HrefValue = "";
        $this->DEptCd->TooltipValue = "";

        // CODE
        $this->CODE->LinkCustomAttributes = "";
        $this->CODE->HrefValue = "";
        $this->CODE->TooltipValue = "";

        // SERVICE
        $this->SERVICE->LinkCustomAttributes = "";
        $this->SERVICE->HrefValue = "";
        $this->SERVICE->TooltipValue = "";

        // SERVICE_TYPE
        $this->SERVICE_TYPE->LinkCustomAttributes = "";
        $this->SERVICE_TYPE->HrefValue = "";
        $this->SERVICE_TYPE->TooltipValue = "";

        // DEPARTMENT
        $this->DEPARTMENT->LinkCustomAttributes = "";
        $this->DEPARTMENT->HrefValue = "";
        $this->DEPARTMENT->TooltipValue = "";

        // HospID
        $this->HospID->LinkCustomAttributes = "";
        $this->HospID->HrefValue = "";
        $this->HospID->TooltipValue = "";

        // vid
        $this->vid->LinkCustomAttributes = "";
        $this->vid->HrefValue = "";
        $this->vid->TooltipValue = "";

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

        // PatientId
        $this->PatientId->EditAttrs["class"] = "form-control";
        $this->PatientId->EditCustomAttributes = "";
        if (!$this->PatientId->Raw) {
            $this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
        }
        $this->PatientId->EditValue = $this->PatientId->CurrentValue;
        $this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

        // PatientName
        $this->PatientName->EditAttrs["class"] = "form-control";
        $this->PatientName->EditCustomAttributes = "";
        if (!$this->PatientName->Raw) {
            $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
        }
        $this->PatientName->EditValue = $this->PatientName->CurrentValue;
        $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

        // Services
        $this->Services->EditAttrs["class"] = "form-control";
        $this->Services->EditCustomAttributes = "";
        if (!$this->Services->Raw) {
            $this->Services->CurrentValue = HtmlDecode($this->Services->CurrentValue);
        }
        $this->Services->EditValue = $this->Services->CurrentValue;
        $this->Services->PlaceHolder = RemoveHtml($this->Services->caption());

        // amount
        $this->amount->EditAttrs["class"] = "form-control";
        $this->amount->EditCustomAttributes = "";
        $this->amount->EditValue = $this->amount->CurrentValue;
        $this->amount->PlaceHolder = RemoveHtml($this->amount->caption());
        if (strval($this->amount->EditValue) != "" && is_numeric($this->amount->EditValue)) {
            $this->amount->EditValue = FormatNumber($this->amount->EditValue, -2, -2, -2, -2);
        }

        // SubTotal
        $this->SubTotal->EditAttrs["class"] = "form-control";
        $this->SubTotal->EditCustomAttributes = "";
        $this->SubTotal->EditValue = $this->SubTotal->CurrentValue;
        $this->SubTotal->PlaceHolder = RemoveHtml($this->SubTotal->caption());
        if (strval($this->SubTotal->EditValue) != "" && is_numeric($this->SubTotal->EditValue)) {
            $this->SubTotal->EditValue = FormatNumber($this->SubTotal->EditValue, -2, -2, -2, -2);
        }

        // createdby
        $this->createdby->EditAttrs["class"] = "form-control";
        $this->createdby->EditCustomAttributes = "";
        if (!$this->createdby->Raw) {
            $this->createdby->CurrentValue = HtmlDecode($this->createdby->CurrentValue);
        }
        $this->createdby->EditValue = $this->createdby->CurrentValue;
        $this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

        // createddatetime
        $this->createddatetime->EditAttrs["class"] = "form-control";
        $this->createddatetime->EditCustomAttributes = "";
        $this->createddatetime->EditValue = FormatDateTime($this->createddatetime->CurrentValue, 8);
        $this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

        // createdDate
        $this->createdDate->EditAttrs["class"] = "form-control";
        $this->createdDate->EditCustomAttributes = "";
        $this->createdDate->EditValue = FormatDateTime($this->createdDate->CurrentValue, 8);
        $this->createdDate->PlaceHolder = RemoveHtml($this->createdDate->caption());

        // DrName
        $this->DrName->EditAttrs["class"] = "form-control";
        $this->DrName->EditCustomAttributes = "";
        if (!$this->DrName->Raw) {
            $this->DrName->CurrentValue = HtmlDecode($this->DrName->CurrentValue);
        }
        $this->DrName->EditValue = $this->DrName->CurrentValue;
        $this->DrName->PlaceHolder = RemoveHtml($this->DrName->caption());

        // DRDepartment
        $this->DRDepartment->EditAttrs["class"] = "form-control";
        $this->DRDepartment->EditCustomAttributes = "";
        if (!$this->DRDepartment->Raw) {
            $this->DRDepartment->CurrentValue = HtmlDecode($this->DRDepartment->CurrentValue);
        }
        $this->DRDepartment->EditValue = $this->DRDepartment->CurrentValue;
        $this->DRDepartment->PlaceHolder = RemoveHtml($this->DRDepartment->caption());

        // ItemCode
        $this->ItemCode->EditAttrs["class"] = "form-control";
        $this->ItemCode->EditCustomAttributes = "";
        if (!$this->ItemCode->Raw) {
            $this->ItemCode->CurrentValue = HtmlDecode($this->ItemCode->CurrentValue);
        }
        $this->ItemCode->EditValue = $this->ItemCode->CurrentValue;
        $this->ItemCode->PlaceHolder = RemoveHtml($this->ItemCode->caption());

        // DEptCd
        $this->DEptCd->EditAttrs["class"] = "form-control";
        $this->DEptCd->EditCustomAttributes = "";
        if (!$this->DEptCd->Raw) {
            $this->DEptCd->CurrentValue = HtmlDecode($this->DEptCd->CurrentValue);
        }
        $this->DEptCd->EditValue = $this->DEptCd->CurrentValue;
        $this->DEptCd->PlaceHolder = RemoveHtml($this->DEptCd->caption());

        // CODE
        $this->CODE->EditAttrs["class"] = "form-control";
        $this->CODE->EditCustomAttributes = "";
        if (!$this->CODE->Raw) {
            $this->CODE->CurrentValue = HtmlDecode($this->CODE->CurrentValue);
        }
        $this->CODE->EditValue = $this->CODE->CurrentValue;
        $this->CODE->PlaceHolder = RemoveHtml($this->CODE->caption());

        // SERVICE
        $this->SERVICE->EditAttrs["class"] = "form-control";
        $this->SERVICE->EditCustomAttributes = "";
        if (!$this->SERVICE->Raw) {
            $this->SERVICE->CurrentValue = HtmlDecode($this->SERVICE->CurrentValue);
        }
        $this->SERVICE->EditValue = $this->SERVICE->CurrentValue;
        $this->SERVICE->PlaceHolder = RemoveHtml($this->SERVICE->caption());

        // SERVICE_TYPE
        $this->SERVICE_TYPE->EditAttrs["class"] = "form-control";
        $this->SERVICE_TYPE->EditCustomAttributes = "";
        if (!$this->SERVICE_TYPE->Raw) {
            $this->SERVICE_TYPE->CurrentValue = HtmlDecode($this->SERVICE_TYPE->CurrentValue);
        }
        $this->SERVICE_TYPE->EditValue = $this->SERVICE_TYPE->CurrentValue;
        $this->SERVICE_TYPE->PlaceHolder = RemoveHtml($this->SERVICE_TYPE->caption());

        // DEPARTMENT
        $this->DEPARTMENT->EditAttrs["class"] = "form-control";
        $this->DEPARTMENT->EditCustomAttributes = "";
        if (!$this->DEPARTMENT->Raw) {
            $this->DEPARTMENT->CurrentValue = HtmlDecode($this->DEPARTMENT->CurrentValue);
        }
        $this->DEPARTMENT->EditValue = $this->DEPARTMENT->CurrentValue;
        $this->DEPARTMENT->PlaceHolder = RemoveHtml($this->DEPARTMENT->caption());

        // HospID
        $this->HospID->EditAttrs["class"] = "form-control";
        $this->HospID->EditCustomAttributes = "";
        $this->HospID->EditValue = $this->HospID->CurrentValue;
        $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

        // vid
        $this->vid->EditAttrs["class"] = "form-control";
        $this->vid->EditCustomAttributes = "";
        $this->vid->EditValue = $this->vid->CurrentValue;
        $this->vid->PlaceHolder = RemoveHtml($this->vid->caption());

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
                    $doc->exportCaption($this->PatientId);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->Services);
                    $doc->exportCaption($this->amount);
                    $doc->exportCaption($this->SubTotal);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->createdDate);
                    $doc->exportCaption($this->DrName);
                    $doc->exportCaption($this->DRDepartment);
                    $doc->exportCaption($this->ItemCode);
                    $doc->exportCaption($this->DEptCd);
                    $doc->exportCaption($this->CODE);
                    $doc->exportCaption($this->SERVICE);
                    $doc->exportCaption($this->SERVICE_TYPE);
                    $doc->exportCaption($this->DEPARTMENT);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->vid);
                } else {
                    $doc->exportCaption($this->PatientId);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->Services);
                    $doc->exportCaption($this->amount);
                    $doc->exportCaption($this->SubTotal);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->createdDate);
                    $doc->exportCaption($this->DrName);
                    $doc->exportCaption($this->DRDepartment);
                    $doc->exportCaption($this->ItemCode);
                    $doc->exportCaption($this->DEptCd);
                    $doc->exportCaption($this->CODE);
                    $doc->exportCaption($this->SERVICE);
                    $doc->exportCaption($this->SERVICE_TYPE);
                    $doc->exportCaption($this->DEPARTMENT);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->vid);
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
                        $doc->exportField($this->PatientId);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->Services);
                        $doc->exportField($this->amount);
                        $doc->exportField($this->SubTotal);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->createdDate);
                        $doc->exportField($this->DrName);
                        $doc->exportField($this->DRDepartment);
                        $doc->exportField($this->ItemCode);
                        $doc->exportField($this->DEptCd);
                        $doc->exportField($this->CODE);
                        $doc->exportField($this->SERVICE);
                        $doc->exportField($this->SERVICE_TYPE);
                        $doc->exportField($this->DEPARTMENT);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->vid);
                    } else {
                        $doc->exportField($this->PatientId);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->Services);
                        $doc->exportField($this->amount);
                        $doc->exportField($this->SubTotal);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->createdDate);
                        $doc->exportField($this->DrName);
                        $doc->exportField($this->DRDepartment);
                        $doc->exportField($this->ItemCode);
                        $doc->exportField($this->DEptCd);
                        $doc->exportField($this->CODE);
                        $doc->exportField($this->SERVICE);
                        $doc->exportField($this->SERVICE_TYPE);
                        $doc->exportField($this->DEPARTMENT);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->vid);
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
