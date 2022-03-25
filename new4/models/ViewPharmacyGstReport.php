<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_pharmacy_gst_report
 */
class ViewPharmacyGstReport extends DbTable
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
    public $DATE;
    public $BillNumber;
    public $PatientId;
    public $PatientName;
    public $Product;
    public $HSN;
    public $QTY;
    public $Amount;
    public $TaxableAmount;
    public $SGST;
    public $CGST;
    public $RateOfTax;
    public $Total;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'view_pharmacy_gst_report';
        $this->TableName = 'view_pharmacy_gst_report';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_pharmacy_gst_report`";
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

        // DATE
        $this->DATE = new DbField('view_pharmacy_gst_report', 'view_pharmacy_gst_report', 'x_DATE', 'DATE', '`DATE`', CastDateFieldForLike("`DATE`", 0, "DB"), 133, 10, 0, false, '`DATE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DATE->Sortable = true; // Allow sort
        $this->DATE->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->DATE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DATE->Param, "CustomMsg");
        $this->Fields['DATE'] = &$this->DATE;

        // BillNumber
        $this->BillNumber = new DbField('view_pharmacy_gst_report', 'view_pharmacy_gst_report', 'x_BillNumber', 'BillNumber', '`BillNumber`', '`BillNumber`', 200, 45, -1, false, '`BillNumber`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BillNumber->Sortable = true; // Allow sort
        $this->BillNumber->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BillNumber->Param, "CustomMsg");
        $this->Fields['BillNumber'] = &$this->BillNumber;

        // PatientId
        $this->PatientId = new DbField('view_pharmacy_gst_report', 'view_pharmacy_gst_report', 'x_PatientId', 'PatientId', '`PatientId`', '`PatientId`', 200, 45, -1, false, '`PatientId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientId->Sortable = true; // Allow sort
        $this->PatientId->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientId->Param, "CustomMsg");
        $this->Fields['PatientId'] = &$this->PatientId;

        // PatientName
        $this->PatientName = new DbField('view_pharmacy_gst_report', 'view_pharmacy_gst_report', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, false, '`PatientName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientName->Sortable = true; // Allow sort
        $this->PatientName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientName->Param, "CustomMsg");
        $this->Fields['PatientName'] = &$this->PatientName;

        // Product
        $this->Product = new DbField('view_pharmacy_gst_report', 'view_pharmacy_gst_report', 'x_Product', 'Product', '`Product`', '`Product`', 200, 100, -1, false, '`Product`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Product->Sortable = true; // Allow sort
        $this->Product->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Product->Param, "CustomMsg");
        $this->Fields['Product'] = &$this->Product;

        // HSN
        $this->HSN = new DbField('view_pharmacy_gst_report', 'view_pharmacy_gst_report', 'x_HSN', 'HSN', '`HSN`', '`HSN`', 200, 45, -1, false, '`HSN`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HSN->Sortable = true; // Allow sort
        $this->HSN->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HSN->Param, "CustomMsg");
        $this->Fields['HSN'] = &$this->HSN;

        // QTY
        $this->QTY = new DbField('view_pharmacy_gst_report', 'view_pharmacy_gst_report', 'x_QTY', 'QTY', '`QTY`', '`QTY`', 200, 14, -1, false, '`QTY`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->QTY->Sortable = true; // Allow sort
        $this->QTY->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->QTY->Param, "CustomMsg");
        $this->Fields['QTY'] = &$this->QTY;

        // Amount
        $this->Amount = new DbField('view_pharmacy_gst_report', 'view_pharmacy_gst_report', 'x_Amount', 'Amount', '`Amount`', '`Amount`', 200, 15, -1, false, '`Amount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Amount->Sortable = true; // Allow sort
        $this->Amount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Amount->Param, "CustomMsg");
        $this->Fields['Amount'] = &$this->Amount;

        // TaxableAmount
        $this->TaxableAmount = new DbField('view_pharmacy_gst_report', 'view_pharmacy_gst_report', 'x_TaxableAmount', 'TaxableAmount', '`TaxableAmount`', '`TaxableAmount`', 200, 25, -1, false, '`TaxableAmount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TaxableAmount->Sortable = true; // Allow sort
        $this->TaxableAmount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TaxableAmount->Param, "CustomMsg");
        $this->Fields['TaxableAmount'] = &$this->TaxableAmount;

        // SGST
        $this->SGST = new DbField('view_pharmacy_gst_report', 'view_pharmacy_gst_report', 'x_SGST', 'SGST', '`SGST`', '`SGST`', 200, 34, -1, false, '`SGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SGST->Sortable = true; // Allow sort
        $this->SGST->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SGST->Param, "CustomMsg");
        $this->Fields['SGST'] = &$this->SGST;

        // CGST
        $this->CGST = new DbField('view_pharmacy_gst_report', 'view_pharmacy_gst_report', 'x_CGST', 'CGST', '`CGST`', '`CGST`', 200, 34, -1, false, '`CGST`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CGST->Sortable = true; // Allow sort
        $this->CGST->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CGST->Param, "CustomMsg");
        $this->Fields['CGST'] = &$this->CGST;

        // RateOfTax
        $this->RateOfTax = new DbField('view_pharmacy_gst_report', 'view_pharmacy_gst_report', 'x_RateOfTax', 'RateOfTax', '`RateOfTax`', '`RateOfTax`', 200, 17, -1, false, '`RateOfTax`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RateOfTax->Sortable = true; // Allow sort
        $this->RateOfTax->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RateOfTax->Param, "CustomMsg");
        $this->Fields['RateOfTax'] = &$this->RateOfTax;

        // Total
        $this->Total = new DbField('view_pharmacy_gst_report', 'view_pharmacy_gst_report', 'x_Total', 'Total', '`Total`', '`Total`', 200, 34, -1, false, '`Total`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Total->Sortable = true; // Allow sort
        $this->Total->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Total->Param, "CustomMsg");
        $this->Fields['Total'] = &$this->Total;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_pharmacy_gst_report`";
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
        $this->DATE->DbValue = $row['DATE'];
        $this->BillNumber->DbValue = $row['BillNumber'];
        $this->PatientId->DbValue = $row['PatientId'];
        $this->PatientName->DbValue = $row['PatientName'];
        $this->Product->DbValue = $row['Product'];
        $this->HSN->DbValue = $row['HSN'];
        $this->QTY->DbValue = $row['QTY'];
        $this->Amount->DbValue = $row['Amount'];
        $this->TaxableAmount->DbValue = $row['TaxableAmount'];
        $this->SGST->DbValue = $row['SGST'];
        $this->CGST->DbValue = $row['CGST'];
        $this->RateOfTax->DbValue = $row['RateOfTax'];
        $this->Total->DbValue = $row['Total'];
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
        return $_SESSION[$name] ?? GetUrl("ViewPharmacyGstReportList");
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
        if ($pageName == "ViewPharmacyGstReportView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewPharmacyGstReportEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewPharmacyGstReportAdd") {
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
                return "ViewPharmacyGstReportView";
            case Config("API_ADD_ACTION"):
                return "ViewPharmacyGstReportAdd";
            case Config("API_EDIT_ACTION"):
                return "ViewPharmacyGstReportEdit";
            case Config("API_DELETE_ACTION"):
                return "ViewPharmacyGstReportDelete";
            case Config("API_LIST_ACTION"):
                return "ViewPharmacyGstReportList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewPharmacyGstReportList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewPharmacyGstReportView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewPharmacyGstReportView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewPharmacyGstReportAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewPharmacyGstReportAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewPharmacyGstReportEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewPharmacyGstReportAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewPharmacyGstReportDelete", $this->getUrlParm());
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
        $this->DATE->setDbValue($row['DATE']);
        $this->BillNumber->setDbValue($row['BillNumber']);
        $this->PatientId->setDbValue($row['PatientId']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->Product->setDbValue($row['Product']);
        $this->HSN->setDbValue($row['HSN']);
        $this->QTY->setDbValue($row['QTY']);
        $this->Amount->setDbValue($row['Amount']);
        $this->TaxableAmount->setDbValue($row['TaxableAmount']);
        $this->SGST->setDbValue($row['SGST']);
        $this->CGST->setDbValue($row['CGST']);
        $this->RateOfTax->setDbValue($row['RateOfTax']);
        $this->Total->setDbValue($row['Total']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // DATE

        // BillNumber

        // PatientId

        // PatientName

        // Product

        // HSN

        // QTY

        // Amount

        // TaxableAmount

        // SGST

        // CGST

        // RateOfTax

        // Total

        // DATE
        $this->DATE->ViewValue = $this->DATE->CurrentValue;
        $this->DATE->ViewValue = FormatDateTime($this->DATE->ViewValue, 0);
        $this->DATE->ViewCustomAttributes = "";

        // BillNumber
        $this->BillNumber->ViewValue = $this->BillNumber->CurrentValue;
        $this->BillNumber->ViewCustomAttributes = "";

        // PatientId
        $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
        $this->PatientId->ViewCustomAttributes = "";

        // PatientName
        $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
        $this->PatientName->ViewCustomAttributes = "";

        // Product
        $this->Product->ViewValue = $this->Product->CurrentValue;
        $this->Product->ViewCustomAttributes = "";

        // HSN
        $this->HSN->ViewValue = $this->HSN->CurrentValue;
        $this->HSN->ViewCustomAttributes = "";

        // QTY
        $this->QTY->ViewValue = $this->QTY->CurrentValue;
        $this->QTY->ViewCustomAttributes = "";

        // Amount
        $this->Amount->ViewValue = $this->Amount->CurrentValue;
        $this->Amount->ViewCustomAttributes = "";

        // TaxableAmount
        $this->TaxableAmount->ViewValue = $this->TaxableAmount->CurrentValue;
        $this->TaxableAmount->ViewCustomAttributes = "";

        // SGST
        $this->SGST->ViewValue = $this->SGST->CurrentValue;
        $this->SGST->ViewCustomAttributes = "";

        // CGST
        $this->CGST->ViewValue = $this->CGST->CurrentValue;
        $this->CGST->ViewCustomAttributes = "";

        // RateOfTax
        $this->RateOfTax->ViewValue = $this->RateOfTax->CurrentValue;
        $this->RateOfTax->ViewCustomAttributes = "";

        // Total
        $this->Total->ViewValue = $this->Total->CurrentValue;
        $this->Total->ViewCustomAttributes = "";

        // DATE
        $this->DATE->LinkCustomAttributes = "";
        $this->DATE->HrefValue = "";
        $this->DATE->TooltipValue = "";

        // BillNumber
        $this->BillNumber->LinkCustomAttributes = "";
        $this->BillNumber->HrefValue = "";
        $this->BillNumber->TooltipValue = "";

        // PatientId
        $this->PatientId->LinkCustomAttributes = "";
        $this->PatientId->HrefValue = "";
        $this->PatientId->TooltipValue = "";

        // PatientName
        $this->PatientName->LinkCustomAttributes = "";
        $this->PatientName->HrefValue = "";
        $this->PatientName->TooltipValue = "";

        // Product
        $this->Product->LinkCustomAttributes = "";
        $this->Product->HrefValue = "";
        $this->Product->TooltipValue = "";

        // HSN
        $this->HSN->LinkCustomAttributes = "";
        $this->HSN->HrefValue = "";
        $this->HSN->TooltipValue = "";

        // QTY
        $this->QTY->LinkCustomAttributes = "";
        $this->QTY->HrefValue = "";
        $this->QTY->TooltipValue = "";

        // Amount
        $this->Amount->LinkCustomAttributes = "";
        $this->Amount->HrefValue = "";
        $this->Amount->TooltipValue = "";

        // TaxableAmount
        $this->TaxableAmount->LinkCustomAttributes = "";
        $this->TaxableAmount->HrefValue = "";
        $this->TaxableAmount->TooltipValue = "";

        // SGST
        $this->SGST->LinkCustomAttributes = "";
        $this->SGST->HrefValue = "";
        $this->SGST->TooltipValue = "";

        // CGST
        $this->CGST->LinkCustomAttributes = "";
        $this->CGST->HrefValue = "";
        $this->CGST->TooltipValue = "";

        // RateOfTax
        $this->RateOfTax->LinkCustomAttributes = "";
        $this->RateOfTax->HrefValue = "";
        $this->RateOfTax->TooltipValue = "";

        // Total
        $this->Total->LinkCustomAttributes = "";
        $this->Total->HrefValue = "";
        $this->Total->TooltipValue = "";

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

        // DATE
        $this->DATE->EditAttrs["class"] = "form-control";
        $this->DATE->EditCustomAttributes = "";
        $this->DATE->EditValue = FormatDateTime($this->DATE->CurrentValue, 8);
        $this->DATE->PlaceHolder = RemoveHtml($this->DATE->caption());

        // BillNumber
        $this->BillNumber->EditAttrs["class"] = "form-control";
        $this->BillNumber->EditCustomAttributes = "";
        if (!$this->BillNumber->Raw) {
            $this->BillNumber->CurrentValue = HtmlDecode($this->BillNumber->CurrentValue);
        }
        $this->BillNumber->EditValue = $this->BillNumber->CurrentValue;
        $this->BillNumber->PlaceHolder = RemoveHtml($this->BillNumber->caption());

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

        // Product
        $this->Product->EditAttrs["class"] = "form-control";
        $this->Product->EditCustomAttributes = "";
        if (!$this->Product->Raw) {
            $this->Product->CurrentValue = HtmlDecode($this->Product->CurrentValue);
        }
        $this->Product->EditValue = $this->Product->CurrentValue;
        $this->Product->PlaceHolder = RemoveHtml($this->Product->caption());

        // HSN
        $this->HSN->EditAttrs["class"] = "form-control";
        $this->HSN->EditCustomAttributes = "";
        if (!$this->HSN->Raw) {
            $this->HSN->CurrentValue = HtmlDecode($this->HSN->CurrentValue);
        }
        $this->HSN->EditValue = $this->HSN->CurrentValue;
        $this->HSN->PlaceHolder = RemoveHtml($this->HSN->caption());

        // QTY
        $this->QTY->EditAttrs["class"] = "form-control";
        $this->QTY->EditCustomAttributes = "";
        if (!$this->QTY->Raw) {
            $this->QTY->CurrentValue = HtmlDecode($this->QTY->CurrentValue);
        }
        $this->QTY->EditValue = $this->QTY->CurrentValue;
        $this->QTY->PlaceHolder = RemoveHtml($this->QTY->caption());

        // Amount
        $this->Amount->EditAttrs["class"] = "form-control";
        $this->Amount->EditCustomAttributes = "";
        if (!$this->Amount->Raw) {
            $this->Amount->CurrentValue = HtmlDecode($this->Amount->CurrentValue);
        }
        $this->Amount->EditValue = $this->Amount->CurrentValue;
        $this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());

        // TaxableAmount
        $this->TaxableAmount->EditAttrs["class"] = "form-control";
        $this->TaxableAmount->EditCustomAttributes = "";
        if (!$this->TaxableAmount->Raw) {
            $this->TaxableAmount->CurrentValue = HtmlDecode($this->TaxableAmount->CurrentValue);
        }
        $this->TaxableAmount->EditValue = $this->TaxableAmount->CurrentValue;
        $this->TaxableAmount->PlaceHolder = RemoveHtml($this->TaxableAmount->caption());

        // SGST
        $this->SGST->EditAttrs["class"] = "form-control";
        $this->SGST->EditCustomAttributes = "";
        if (!$this->SGST->Raw) {
            $this->SGST->CurrentValue = HtmlDecode($this->SGST->CurrentValue);
        }
        $this->SGST->EditValue = $this->SGST->CurrentValue;
        $this->SGST->PlaceHolder = RemoveHtml($this->SGST->caption());

        // CGST
        $this->CGST->EditAttrs["class"] = "form-control";
        $this->CGST->EditCustomAttributes = "";
        if (!$this->CGST->Raw) {
            $this->CGST->CurrentValue = HtmlDecode($this->CGST->CurrentValue);
        }
        $this->CGST->EditValue = $this->CGST->CurrentValue;
        $this->CGST->PlaceHolder = RemoveHtml($this->CGST->caption());

        // RateOfTax
        $this->RateOfTax->EditAttrs["class"] = "form-control";
        $this->RateOfTax->EditCustomAttributes = "";
        if (!$this->RateOfTax->Raw) {
            $this->RateOfTax->CurrentValue = HtmlDecode($this->RateOfTax->CurrentValue);
        }
        $this->RateOfTax->EditValue = $this->RateOfTax->CurrentValue;
        $this->RateOfTax->PlaceHolder = RemoveHtml($this->RateOfTax->caption());

        // Total
        $this->Total->EditAttrs["class"] = "form-control";
        $this->Total->EditCustomAttributes = "";
        if (!$this->Total->Raw) {
            $this->Total->CurrentValue = HtmlDecode($this->Total->CurrentValue);
        }
        $this->Total->EditValue = $this->Total->CurrentValue;
        $this->Total->PlaceHolder = RemoveHtml($this->Total->caption());

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
                    $doc->exportCaption($this->DATE);
                    $doc->exportCaption($this->BillNumber);
                    $doc->exportCaption($this->PatientId);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->Product);
                    $doc->exportCaption($this->HSN);
                    $doc->exportCaption($this->QTY);
                    $doc->exportCaption($this->Amount);
                    $doc->exportCaption($this->TaxableAmount);
                    $doc->exportCaption($this->SGST);
                    $doc->exportCaption($this->CGST);
                    $doc->exportCaption($this->RateOfTax);
                    $doc->exportCaption($this->Total);
                } else {
                    $doc->exportCaption($this->DATE);
                    $doc->exportCaption($this->BillNumber);
                    $doc->exportCaption($this->PatientId);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->Product);
                    $doc->exportCaption($this->HSN);
                    $doc->exportCaption($this->QTY);
                    $doc->exportCaption($this->Amount);
                    $doc->exportCaption($this->TaxableAmount);
                    $doc->exportCaption($this->SGST);
                    $doc->exportCaption($this->CGST);
                    $doc->exportCaption($this->RateOfTax);
                    $doc->exportCaption($this->Total);
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
                        $doc->exportField($this->DATE);
                        $doc->exportField($this->BillNumber);
                        $doc->exportField($this->PatientId);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->Product);
                        $doc->exportField($this->HSN);
                        $doc->exportField($this->QTY);
                        $doc->exportField($this->Amount);
                        $doc->exportField($this->TaxableAmount);
                        $doc->exportField($this->SGST);
                        $doc->exportField($this->CGST);
                        $doc->exportField($this->RateOfTax);
                        $doc->exportField($this->Total);
                    } else {
                        $doc->exportField($this->DATE);
                        $doc->exportField($this->BillNumber);
                        $doc->exportField($this->PatientId);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->Product);
                        $doc->exportField($this->HSN);
                        $doc->exportField($this->QTY);
                        $doc->exportField($this->Amount);
                        $doc->exportField($this->TaxableAmount);
                        $doc->exportField($this->SGST);
                        $doc->exportField($this->CGST);
                        $doc->exportField($this->RateOfTax);
                        $doc->exportField($this->Total);
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
