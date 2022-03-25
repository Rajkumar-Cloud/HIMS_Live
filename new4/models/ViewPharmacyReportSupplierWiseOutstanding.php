<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_pharmacy_report_supplier_wise_outstanding
 */
class ViewPharmacyReportSupplierWiseOutstanding extends DbTable
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
    public $pc;
    public $Customername;
    public $Address1;
    public $Address2;
    public $Address3;
    public $State;
    public $Pincode;
    public $Phone;
    public $HospID;
    public $NoOfBills;
    public $TotalAmount;
    public $BRCODE;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'view_pharmacy_report_supplier_wise_outstanding';
        $this->TableName = 'view_pharmacy_report_supplier_wise_outstanding';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_pharmacy_report_supplier_wise_outstanding`";
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

        // pc
        $this->pc = new DbField('view_pharmacy_report_supplier_wise_outstanding', 'view_pharmacy_report_supplier_wise_outstanding', 'x_pc', 'pc', '`pc`', '`pc`', 200, 45, -1, false, '`pc`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->pc->Sortable = true; // Allow sort
        $this->pc->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->pc->Param, "CustomMsg");
        $this->Fields['pc'] = &$this->pc;

        // Customername
        $this->Customername = new DbField('view_pharmacy_report_supplier_wise_outstanding', 'view_pharmacy_report_supplier_wise_outstanding', 'x_Customername', 'Customername', '`Customername`', '`Customername`', 200, 45, -1, false, '`Customername`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Customername->Sortable = true; // Allow sort
        $this->Customername->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Customername->Param, "CustomMsg");
        $this->Fields['Customername'] = &$this->Customername;

        // Address1
        $this->Address1 = new DbField('view_pharmacy_report_supplier_wise_outstanding', 'view_pharmacy_report_supplier_wise_outstanding', 'x_Address1', 'Address1', '`Address1`', '`Address1`', 201, 405, -1, false, '`Address1`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Address1->Sortable = true; // Allow sort
        $this->Address1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Address1->Param, "CustomMsg");
        $this->Fields['Address1'] = &$this->Address1;

        // Address2
        $this->Address2 = new DbField('view_pharmacy_report_supplier_wise_outstanding', 'view_pharmacy_report_supplier_wise_outstanding', 'x_Address2', 'Address2', '`Address2`', '`Address2`', 201, 405, -1, false, '`Address2`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Address2->Sortable = true; // Allow sort
        $this->Address2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Address2->Param, "CustomMsg");
        $this->Fields['Address2'] = &$this->Address2;

        // Address3
        $this->Address3 = new DbField('view_pharmacy_report_supplier_wise_outstanding', 'view_pharmacy_report_supplier_wise_outstanding', 'x_Address3', 'Address3', '`Address3`', '`Address3`', 201, 405, -1, false, '`Address3`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Address3->Sortable = true; // Allow sort
        $this->Address3->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Address3->Param, "CustomMsg");
        $this->Fields['Address3'] = &$this->Address3;

        // State
        $this->State = new DbField('view_pharmacy_report_supplier_wise_outstanding', 'view_pharmacy_report_supplier_wise_outstanding', 'x_State', 'State', '`State`', '`State`', 200, 45, -1, false, '`State`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->State->Sortable = true; // Allow sort
        $this->State->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->State->Param, "CustomMsg");
        $this->Fields['State'] = &$this->State;

        // Pincode
        $this->Pincode = new DbField('view_pharmacy_report_supplier_wise_outstanding', 'view_pharmacy_report_supplier_wise_outstanding', 'x_Pincode', 'Pincode', '`Pincode`', '`Pincode`', 200, 45, -1, false, '`Pincode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Pincode->Sortable = true; // Allow sort
        $this->Pincode->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Pincode->Param, "CustomMsg");
        $this->Fields['Pincode'] = &$this->Pincode;

        // Phone
        $this->Phone = new DbField('view_pharmacy_report_supplier_wise_outstanding', 'view_pharmacy_report_supplier_wise_outstanding', 'x_Phone', 'Phone', '`Phone`', '`Phone`', 200, 45, -1, false, '`Phone`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Phone->Sortable = true; // Allow sort
        $this->Phone->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Phone->Param, "CustomMsg");
        $this->Fields['Phone'] = &$this->Phone;

        // HospID
        $this->HospID = new DbField('view_pharmacy_report_supplier_wise_outstanding', 'view_pharmacy_report_supplier_wise_outstanding', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = false; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->HospID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospID->Param, "CustomMsg");
        $this->Fields['HospID'] = &$this->HospID;

        // NoOfBills
        $this->NoOfBills = new DbField('view_pharmacy_report_supplier_wise_outstanding', 'view_pharmacy_report_supplier_wise_outstanding', 'x_NoOfBills', 'NoOfBills', '`NoOfBills`', '`NoOfBills`', 20, 21, -1, false, '`NoOfBills`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NoOfBills->Nullable = false; // NOT NULL field
        $this->NoOfBills->Sortable = true; // Allow sort
        $this->NoOfBills->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->NoOfBills->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->NoOfBills->Param, "CustomMsg");
        $this->Fields['NoOfBills'] = &$this->NoOfBills;

        // TotalAmount
        $this->TotalAmount = new DbField('view_pharmacy_report_supplier_wise_outstanding', 'view_pharmacy_report_supplier_wise_outstanding', 'x_TotalAmount', 'TotalAmount', '`TotalAmount`', '`TotalAmount`', 131, 32, -1, false, '`TotalAmount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TotalAmount->Sortable = true; // Allow sort
        $this->TotalAmount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->TotalAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->TotalAmount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TotalAmount->Param, "CustomMsg");
        $this->Fields['TotalAmount'] = &$this->TotalAmount;

        // BRCODE
        $this->BRCODE = new DbField('view_pharmacy_report_supplier_wise_outstanding', 'view_pharmacy_report_supplier_wise_outstanding', 'x_BRCODE', 'BRCODE', '`BRCODE`', '`BRCODE`', 3, 11, -1, false, '`BRCODE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BRCODE->Sortable = false; // Allow sort
        $this->BRCODE->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->BRCODE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BRCODE->Param, "CustomMsg");
        $this->Fields['BRCODE'] = &$this->BRCODE;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_pharmacy_report_supplier_wise_outstanding`";
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
        $this->DefaultFilter = "`HospID`='".HospitalID()."'  and  `BRCODE`='".PharmacyID()."'";
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
        $this->pc->DbValue = $row['pc'];
        $this->Customername->DbValue = $row['Customername'];
        $this->Address1->DbValue = $row['Address1'];
        $this->Address2->DbValue = $row['Address2'];
        $this->Address3->DbValue = $row['Address3'];
        $this->State->DbValue = $row['State'];
        $this->Pincode->DbValue = $row['Pincode'];
        $this->Phone->DbValue = $row['Phone'];
        $this->HospID->DbValue = $row['HospID'];
        $this->NoOfBills->DbValue = $row['NoOfBills'];
        $this->TotalAmount->DbValue = $row['TotalAmount'];
        $this->BRCODE->DbValue = $row['BRCODE'];
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

    // Get Key
    public function getKey($current = false)
    {
        $keys = [];
        return implode(Config("COMPOSITE_KEY_SEPARATOR"), $keys);
    }

    // Set Key
    public function setKey($key, $current = false)
    {
        $this->OldKey = strval($key);
        $keys = explode(Config("COMPOSITE_KEY_SEPARATOR"), $this->OldKey);
        if (count($keys) == 0) {
        }
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
        $referUrl = ReferUrl();
        $referPageName = ReferPageName();
        $name = PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL");
        // Get referer URL automatically
        if ($referUrl != "" && $referPageName != CurrentPageName() && $referPageName != "login") { // Referer not same page or login page
            $_SESSION[$name] = $referUrl; // Save to Session
        }
        return $_SESSION[$name] ?? GetUrl("ViewPharmacyReportSupplierWiseOutstandingList");
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
        if ($pageName == "ViewPharmacyReportSupplierWiseOutstandingView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewPharmacyReportSupplierWiseOutstandingEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewPharmacyReportSupplierWiseOutstandingAdd") {
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
                return "ViewPharmacyReportSupplierWiseOutstandingView";
            case Config("API_ADD_ACTION"):
                return "ViewPharmacyReportSupplierWiseOutstandingAdd";
            case Config("API_EDIT_ACTION"):
                return "ViewPharmacyReportSupplierWiseOutstandingEdit";
            case Config("API_DELETE_ACTION"):
                return "ViewPharmacyReportSupplierWiseOutstandingDelete";
            case Config("API_LIST_ACTION"):
                return "ViewPharmacyReportSupplierWiseOutstandingList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewPharmacyReportSupplierWiseOutstandingList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewPharmacyReportSupplierWiseOutstandingView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewPharmacyReportSupplierWiseOutstandingView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewPharmacyReportSupplierWiseOutstandingAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewPharmacyReportSupplierWiseOutstandingAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewPharmacyReportSupplierWiseOutstandingEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewPharmacyReportSupplierWiseOutstandingAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewPharmacyReportSupplierWiseOutstandingDelete", $this->getUrlParm());
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
        $this->pc->setDbValue($row['pc']);
        $this->Customername->setDbValue($row['Customername']);
        $this->Address1->setDbValue($row['Address1']);
        $this->Address2->setDbValue($row['Address2']);
        $this->Address3->setDbValue($row['Address3']);
        $this->State->setDbValue($row['State']);
        $this->Pincode->setDbValue($row['Pincode']);
        $this->Phone->setDbValue($row['Phone']);
        $this->HospID->setDbValue($row['HospID']);
        $this->NoOfBills->setDbValue($row['NoOfBills']);
        $this->TotalAmount->setDbValue($row['TotalAmount']);
        $this->BRCODE->setDbValue($row['BRCODE']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // pc

        // Customername

        // Address1

        // Address2

        // Address3

        // State

        // Pincode

        // Phone

        // HospID

        // NoOfBills

        // TotalAmount

        // BRCODE

        // pc
        $this->pc->ViewValue = $this->pc->CurrentValue;
        $this->pc->ViewCustomAttributes = "";

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

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

        // NoOfBills
        $this->NoOfBills->ViewValue = $this->NoOfBills->CurrentValue;
        $this->NoOfBills->ViewValue = FormatNumber($this->NoOfBills->ViewValue, 0, -2, -2, -2);
        $this->NoOfBills->ViewCustomAttributes = "";

        // TotalAmount
        $this->TotalAmount->ViewValue = $this->TotalAmount->CurrentValue;
        $this->TotalAmount->ViewValue = FormatNumber($this->TotalAmount->ViewValue, 2, -2, -2, -2);
        $this->TotalAmount->ViewCustomAttributes = "";

        // BRCODE
        $this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
        $this->BRCODE->ViewValue = FormatNumber($this->BRCODE->ViewValue, 0, -2, -2, -2);
        $this->BRCODE->ViewCustomAttributes = "";

        // pc
        $this->pc->LinkCustomAttributes = "";
        $this->pc->HrefValue = "";
        $this->pc->TooltipValue = "";

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

        // HospID
        $this->HospID->LinkCustomAttributes = "";
        $this->HospID->HrefValue = "";
        $this->HospID->TooltipValue = "";

        // NoOfBills
        $this->NoOfBills->LinkCustomAttributes = "";
        $this->NoOfBills->HrefValue = "";
        $this->NoOfBills->TooltipValue = "";

        // TotalAmount
        $this->TotalAmount->LinkCustomAttributes = "";
        $this->TotalAmount->HrefValue = "";
        $this->TotalAmount->TooltipValue = "";

        // BRCODE
        $this->BRCODE->LinkCustomAttributes = "";
        $this->BRCODE->HrefValue = "";
        $this->BRCODE->TooltipValue = "";

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

        // pc
        $this->pc->EditAttrs["class"] = "form-control";
        $this->pc->EditCustomAttributes = "";
        if (!$this->pc->Raw) {
            $this->pc->CurrentValue = HtmlDecode($this->pc->CurrentValue);
        }
        $this->pc->EditValue = $this->pc->CurrentValue;
        $this->pc->PlaceHolder = RemoveHtml($this->pc->caption());

        // Customername
        $this->Customername->EditAttrs["class"] = "form-control";
        $this->Customername->EditCustomAttributes = "";
        if (!$this->Customername->Raw) {
            $this->Customername->CurrentValue = HtmlDecode($this->Customername->CurrentValue);
        }
        $this->Customername->EditValue = $this->Customername->CurrentValue;
        $this->Customername->PlaceHolder = RemoveHtml($this->Customername->caption());

        // Address1
        $this->Address1->EditAttrs["class"] = "form-control";
        $this->Address1->EditCustomAttributes = "";
        $this->Address1->EditValue = $this->Address1->CurrentValue;
        $this->Address1->PlaceHolder = RemoveHtml($this->Address1->caption());

        // Address2
        $this->Address2->EditAttrs["class"] = "form-control";
        $this->Address2->EditCustomAttributes = "";
        $this->Address2->EditValue = $this->Address2->CurrentValue;
        $this->Address2->PlaceHolder = RemoveHtml($this->Address2->caption());

        // Address3
        $this->Address3->EditAttrs["class"] = "form-control";
        $this->Address3->EditCustomAttributes = "";
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

        // HospID
        $this->HospID->EditAttrs["class"] = "form-control";
        $this->HospID->EditCustomAttributes = "";
        $this->HospID->EditValue = $this->HospID->CurrentValue;
        $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

        // NoOfBills
        $this->NoOfBills->EditAttrs["class"] = "form-control";
        $this->NoOfBills->EditCustomAttributes = "";
        $this->NoOfBills->EditValue = $this->NoOfBills->CurrentValue;
        $this->NoOfBills->PlaceHolder = RemoveHtml($this->NoOfBills->caption());

        // TotalAmount
        $this->TotalAmount->EditAttrs["class"] = "form-control";
        $this->TotalAmount->EditCustomAttributes = "";
        $this->TotalAmount->EditValue = $this->TotalAmount->CurrentValue;
        $this->TotalAmount->PlaceHolder = RemoveHtml($this->TotalAmount->caption());
        if (strval($this->TotalAmount->EditValue) != "" && is_numeric($this->TotalAmount->EditValue)) {
            $this->TotalAmount->EditValue = FormatNumber($this->TotalAmount->EditValue, -2, -2, -2, -2);
        }

        // BRCODE
        $this->BRCODE->EditAttrs["class"] = "form-control";
        $this->BRCODE->EditCustomAttributes = "";
        $this->BRCODE->EditValue = $this->BRCODE->CurrentValue;
        $this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

        // Call Row Rendered event
        $this->rowRendered();
    }

    // Aggregate list row values
    public function aggregateListRowValues()
    {
            if (is_numeric($this->TotalAmount->CurrentValue)) {
                $this->TotalAmount->Total += $this->TotalAmount->CurrentValue; // Accumulate total
            }
    }

    // Aggregate list row (for rendering)
    public function aggregateListRow()
    {
            $this->TotalAmount->CurrentValue = $this->TotalAmount->Total;
            $this->TotalAmount->ViewValue = $this->TotalAmount->CurrentValue;
            $this->TotalAmount->ViewValue = FormatNumber($this->TotalAmount->ViewValue, 2, -2, -2, -2);
            $this->TotalAmount->ViewCustomAttributes = "";
            $this->TotalAmount->HrefValue = ""; // Clear href value

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
                    $doc->exportCaption($this->pc);
                    $doc->exportCaption($this->Customername);
                    $doc->exportCaption($this->Address1);
                    $doc->exportCaption($this->Address2);
                    $doc->exportCaption($this->Address3);
                    $doc->exportCaption($this->State);
                    $doc->exportCaption($this->Pincode);
                    $doc->exportCaption($this->Phone);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->NoOfBills);
                    $doc->exportCaption($this->TotalAmount);
                    $doc->exportCaption($this->BRCODE);
                } else {
                    $doc->exportCaption($this->pc);
                    $doc->exportCaption($this->Customername);
                    $doc->exportCaption($this->State);
                    $doc->exportCaption($this->Pincode);
                    $doc->exportCaption($this->Phone);
                    $doc->exportCaption($this->NoOfBills);
                    $doc->exportCaption($this->TotalAmount);
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
                        $doc->exportField($this->pc);
                        $doc->exportField($this->Customername);
                        $doc->exportField($this->Address1);
                        $doc->exportField($this->Address2);
                        $doc->exportField($this->Address3);
                        $doc->exportField($this->State);
                        $doc->exportField($this->Pincode);
                        $doc->exportField($this->Phone);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->NoOfBills);
                        $doc->exportField($this->TotalAmount);
                        $doc->exportField($this->BRCODE);
                    } else {
                        $doc->exportField($this->pc);
                        $doc->exportField($this->Customername);
                        $doc->exportField($this->State);
                        $doc->exportField($this->Pincode);
                        $doc->exportField($this->Phone);
                        $doc->exportField($this->NoOfBills);
                        $doc->exportField($this->TotalAmount);
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
                $doc->exportAggregate($this->pc, '');
                $doc->exportAggregate($this->Customername, '');
                $doc->exportAggregate($this->State, '');
                $doc->exportAggregate($this->Pincode, '');
                $doc->exportAggregate($this->Phone, '');
                $doc->exportAggregate($this->NoOfBills, '');
                $doc->exportAggregate($this->TotalAmount, 'TOTAL');
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
