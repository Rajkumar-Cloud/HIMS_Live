<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_treatment_culture
 */
class ViewTreatmentCulture extends DbTable
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
    public $TidNo;
    public $Day0OocyteStage;
    public $Day1;
    public $Day2;
    public $Day3;
    public $Day4;
    public $Day5;
    public $Day6;
    public $ET;
    public $ETDate;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'view_treatment_culture';
        $this->TableName = 'view_treatment_culture';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_treatment_culture`";
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

        // TidNo
        $this->TidNo = new DbField('view_treatment_culture', 'view_treatment_culture', 'x_TidNo', 'TidNo', '`TidNo`', '`TidNo`', 3, 11, -1, false, '`TidNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TidNo->Sortable = true; // Allow sort
        $this->TidNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->TidNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TidNo->Param, "CustomMsg");
        $this->Fields['TidNo'] = &$this->TidNo;

        // Day0OocyteStage
        $this->Day0OocyteStage = new DbField('view_treatment_culture', 'view_treatment_culture', 'x_Day0OocyteStage', 'Day0OocyteStage', '`Day0OocyteStage`', '`Day0OocyteStage`', 20, 21, -1, false, '`Day0OocyteStage`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day0OocyteStage->Nullable = false; // NOT NULL field
        $this->Day0OocyteStage->Sortable = true; // Allow sort
        $this->Day0OocyteStage->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Day0OocyteStage->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day0OocyteStage->Param, "CustomMsg");
        $this->Fields['Day0OocyteStage'] = &$this->Day0OocyteStage;

        // Day1
        $this->Day1 = new DbField('view_treatment_culture', 'view_treatment_culture', 'x_Day1', 'Day1', '`Day1`', '`Day1`', 20, 21, -1, false, '`Day1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day1->Nullable = false; // NOT NULL field
        $this->Day1->Sortable = true; // Allow sort
        $this->Day1->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Day1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day1->Param, "CustomMsg");
        $this->Fields['Day1'] = &$this->Day1;

        // Day2
        $this->Day2 = new DbField('view_treatment_culture', 'view_treatment_culture', 'x_Day2', 'Day2', '`Day2`', '`Day2`', 20, 21, -1, false, '`Day2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day2->Nullable = false; // NOT NULL field
        $this->Day2->Sortable = true; // Allow sort
        $this->Day2->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Day2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day2->Param, "CustomMsg");
        $this->Fields['Day2'] = &$this->Day2;

        // Day3
        $this->Day3 = new DbField('view_treatment_culture', 'view_treatment_culture', 'x_Day3', 'Day3', '`Day3`', '`Day3`', 20, 21, -1, false, '`Day3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day3->Nullable = false; // NOT NULL field
        $this->Day3->Sortable = true; // Allow sort
        $this->Day3->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Day3->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day3->Param, "CustomMsg");
        $this->Fields['Day3'] = &$this->Day3;

        // Day4
        $this->Day4 = new DbField('view_treatment_culture', 'view_treatment_culture', 'x_Day4', 'Day4', '`Day4`', '`Day4`', 20, 21, -1, false, '`Day4`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day4->Nullable = false; // NOT NULL field
        $this->Day4->Sortable = true; // Allow sort
        $this->Day4->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Day4->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day4->Param, "CustomMsg");
        $this->Fields['Day4'] = &$this->Day4;

        // Day5
        $this->Day5 = new DbField('view_treatment_culture', 'view_treatment_culture', 'x_Day5', 'Day5', '`Day5`', '`Day5`', 20, 21, -1, false, '`Day5`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day5->Nullable = false; // NOT NULL field
        $this->Day5->Sortable = true; // Allow sort
        $this->Day5->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Day5->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day5->Param, "CustomMsg");
        $this->Fields['Day5'] = &$this->Day5;

        // Day6
        $this->Day6 = new DbField('view_treatment_culture', 'view_treatment_culture', 'x_Day6', 'Day6', '`Day6`', '`Day6`', 20, 21, -1, false, '`Day6`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day6->Nullable = false; // NOT NULL field
        $this->Day6->Sortable = true; // Allow sort
        $this->Day6->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Day6->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day6->Param, "CustomMsg");
        $this->Fields['Day6'] = &$this->Day6;

        // ET
        $this->ET = new DbField('view_treatment_culture', 'view_treatment_culture', 'x_ET', 'ET', '`ET`', '`ET`', 20, 21, -1, false, '`ET`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ET->Nullable = false; // NOT NULL field
        $this->ET->Sortable = true; // Allow sort
        $this->ET->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->ET->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ET->Param, "CustomMsg");
        $this->Fields['ET'] = &$this->ET;

        // ETDate
        $this->ETDate = new DbField('view_treatment_culture', 'view_treatment_culture', 'x_ETDate', 'ETDate', '`ETDate`', '`ETDate`', 20, 21, -1, false, '`ETDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ETDate->Nullable = false; // NOT NULL field
        $this->ETDate->Sortable = true; // Allow sort
        $this->ETDate->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->ETDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ETDate->Param, "CustomMsg");
        $this->Fields['ETDate'] = &$this->ETDate;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_treatment_culture`";
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
        $this->TidNo->DbValue = $row['TidNo'];
        $this->Day0OocyteStage->DbValue = $row['Day0OocyteStage'];
        $this->Day1->DbValue = $row['Day1'];
        $this->Day2->DbValue = $row['Day2'];
        $this->Day3->DbValue = $row['Day3'];
        $this->Day4->DbValue = $row['Day4'];
        $this->Day5->DbValue = $row['Day5'];
        $this->Day6->DbValue = $row['Day6'];
        $this->ET->DbValue = $row['ET'];
        $this->ETDate->DbValue = $row['ETDate'];
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
        return $_SESSION[$name] ?? GetUrl("ViewTreatmentCultureList");
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
        if ($pageName == "ViewTreatmentCultureView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewTreatmentCultureEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewTreatmentCultureAdd") {
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
                return "ViewTreatmentCultureView";
            case Config("API_ADD_ACTION"):
                return "ViewTreatmentCultureAdd";
            case Config("API_EDIT_ACTION"):
                return "ViewTreatmentCultureEdit";
            case Config("API_DELETE_ACTION"):
                return "ViewTreatmentCultureDelete";
            case Config("API_LIST_ACTION"):
                return "ViewTreatmentCultureList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewTreatmentCultureList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewTreatmentCultureView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewTreatmentCultureView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewTreatmentCultureAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewTreatmentCultureAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewTreatmentCultureEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewTreatmentCultureAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewTreatmentCultureDelete", $this->getUrlParm());
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
        $this->TidNo->setDbValue($row['TidNo']);
        $this->Day0OocyteStage->setDbValue($row['Day0OocyteStage']);
        $this->Day1->setDbValue($row['Day1']);
        $this->Day2->setDbValue($row['Day2']);
        $this->Day3->setDbValue($row['Day3']);
        $this->Day4->setDbValue($row['Day4']);
        $this->Day5->setDbValue($row['Day5']);
        $this->Day6->setDbValue($row['Day6']);
        $this->ET->setDbValue($row['ET']);
        $this->ETDate->setDbValue($row['ETDate']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // TidNo

        // Day0OocyteStage

        // Day1

        // Day2

        // Day3

        // Day4

        // Day5

        // Day6

        // ET

        // ETDate

        // TidNo
        $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
        $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
        $this->TidNo->ViewCustomAttributes = "";

        // Day0OocyteStage
        $this->Day0OocyteStage->ViewValue = $this->Day0OocyteStage->CurrentValue;
        $this->Day0OocyteStage->ViewValue = FormatNumber($this->Day0OocyteStage->ViewValue, 0, -2, -2, -2);
        $this->Day0OocyteStage->ViewCustomAttributes = "";

        // Day1
        $this->Day1->ViewValue = $this->Day1->CurrentValue;
        $this->Day1->ViewValue = FormatNumber($this->Day1->ViewValue, 0, -2, -2, -2);
        $this->Day1->ViewCustomAttributes = "";

        // Day2
        $this->Day2->ViewValue = $this->Day2->CurrentValue;
        $this->Day2->ViewValue = FormatNumber($this->Day2->ViewValue, 0, -2, -2, -2);
        $this->Day2->ViewCustomAttributes = "";

        // Day3
        $this->Day3->ViewValue = $this->Day3->CurrentValue;
        $this->Day3->ViewValue = FormatNumber($this->Day3->ViewValue, 0, -2, -2, -2);
        $this->Day3->ViewCustomAttributes = "";

        // Day4
        $this->Day4->ViewValue = $this->Day4->CurrentValue;
        $this->Day4->ViewValue = FormatNumber($this->Day4->ViewValue, 0, -2, -2, -2);
        $this->Day4->ViewCustomAttributes = "";

        // Day5
        $this->Day5->ViewValue = $this->Day5->CurrentValue;
        $this->Day5->ViewValue = FormatNumber($this->Day5->ViewValue, 0, -2, -2, -2);
        $this->Day5->ViewCustomAttributes = "";

        // Day6
        $this->Day6->ViewValue = $this->Day6->CurrentValue;
        $this->Day6->ViewValue = FormatNumber($this->Day6->ViewValue, 0, -2, -2, -2);
        $this->Day6->ViewCustomAttributes = "";

        // ET
        $this->ET->ViewValue = $this->ET->CurrentValue;
        $this->ET->ViewValue = FormatNumber($this->ET->ViewValue, 0, -2, -2, -2);
        $this->ET->ViewCustomAttributes = "";

        // ETDate
        $this->ETDate->ViewValue = $this->ETDate->CurrentValue;
        $this->ETDate->ViewValue = FormatNumber($this->ETDate->ViewValue, 0, -2, -2, -2);
        $this->ETDate->ViewCustomAttributes = "";

        // TidNo
        $this->TidNo->LinkCustomAttributes = "";
        $this->TidNo->HrefValue = "";
        $this->TidNo->TooltipValue = "";

        // Day0OocyteStage
        $this->Day0OocyteStage->LinkCustomAttributes = "";
        $this->Day0OocyteStage->HrefValue = "";
        $this->Day0OocyteStage->TooltipValue = "";

        // Day1
        $this->Day1->LinkCustomAttributes = "";
        $this->Day1->HrefValue = "";
        $this->Day1->TooltipValue = "";

        // Day2
        $this->Day2->LinkCustomAttributes = "";
        $this->Day2->HrefValue = "";
        $this->Day2->TooltipValue = "";

        // Day3
        $this->Day3->LinkCustomAttributes = "";
        $this->Day3->HrefValue = "";
        $this->Day3->TooltipValue = "";

        // Day4
        $this->Day4->LinkCustomAttributes = "";
        $this->Day4->HrefValue = "";
        $this->Day4->TooltipValue = "";

        // Day5
        $this->Day5->LinkCustomAttributes = "";
        $this->Day5->HrefValue = "";
        $this->Day5->TooltipValue = "";

        // Day6
        $this->Day6->LinkCustomAttributes = "";
        $this->Day6->HrefValue = "";
        $this->Day6->TooltipValue = "";

        // ET
        $this->ET->LinkCustomAttributes = "";
        $this->ET->HrefValue = "";
        $this->ET->TooltipValue = "";

        // ETDate
        $this->ETDate->LinkCustomAttributes = "";
        $this->ETDate->HrefValue = "";
        $this->ETDate->TooltipValue = "";

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

        // TidNo
        $this->TidNo->EditAttrs["class"] = "form-control";
        $this->TidNo->EditCustomAttributes = "";
        $this->TidNo->EditValue = $this->TidNo->CurrentValue;
        $this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

        // Day0OocyteStage
        $this->Day0OocyteStage->EditAttrs["class"] = "form-control";
        $this->Day0OocyteStage->EditCustomAttributes = "";
        $this->Day0OocyteStage->EditValue = $this->Day0OocyteStage->CurrentValue;
        $this->Day0OocyteStage->PlaceHolder = RemoveHtml($this->Day0OocyteStage->caption());

        // Day1
        $this->Day1->EditAttrs["class"] = "form-control";
        $this->Day1->EditCustomAttributes = "";
        $this->Day1->EditValue = $this->Day1->CurrentValue;
        $this->Day1->PlaceHolder = RemoveHtml($this->Day1->caption());

        // Day2
        $this->Day2->EditAttrs["class"] = "form-control";
        $this->Day2->EditCustomAttributes = "";
        $this->Day2->EditValue = $this->Day2->CurrentValue;
        $this->Day2->PlaceHolder = RemoveHtml($this->Day2->caption());

        // Day3
        $this->Day3->EditAttrs["class"] = "form-control";
        $this->Day3->EditCustomAttributes = "";
        $this->Day3->EditValue = $this->Day3->CurrentValue;
        $this->Day3->PlaceHolder = RemoveHtml($this->Day3->caption());

        // Day4
        $this->Day4->EditAttrs["class"] = "form-control";
        $this->Day4->EditCustomAttributes = "";
        $this->Day4->EditValue = $this->Day4->CurrentValue;
        $this->Day4->PlaceHolder = RemoveHtml($this->Day4->caption());

        // Day5
        $this->Day5->EditAttrs["class"] = "form-control";
        $this->Day5->EditCustomAttributes = "";
        $this->Day5->EditValue = $this->Day5->CurrentValue;
        $this->Day5->PlaceHolder = RemoveHtml($this->Day5->caption());

        // Day6
        $this->Day6->EditAttrs["class"] = "form-control";
        $this->Day6->EditCustomAttributes = "";
        $this->Day6->EditValue = $this->Day6->CurrentValue;
        $this->Day6->PlaceHolder = RemoveHtml($this->Day6->caption());

        // ET
        $this->ET->EditAttrs["class"] = "form-control";
        $this->ET->EditCustomAttributes = "";
        $this->ET->EditValue = $this->ET->CurrentValue;
        $this->ET->PlaceHolder = RemoveHtml($this->ET->caption());

        // ETDate
        $this->ETDate->EditAttrs["class"] = "form-control";
        $this->ETDate->EditCustomAttributes = "";
        $this->ETDate->EditValue = $this->ETDate->CurrentValue;
        $this->ETDate->PlaceHolder = RemoveHtml($this->ETDate->caption());

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
                    $doc->exportCaption($this->TidNo);
                    $doc->exportCaption($this->Day0OocyteStage);
                    $doc->exportCaption($this->Day1);
                    $doc->exportCaption($this->Day2);
                    $doc->exportCaption($this->Day3);
                    $doc->exportCaption($this->Day4);
                    $doc->exportCaption($this->Day5);
                    $doc->exportCaption($this->Day6);
                    $doc->exportCaption($this->ET);
                    $doc->exportCaption($this->ETDate);
                } else {
                    $doc->exportCaption($this->TidNo);
                    $doc->exportCaption($this->Day0OocyteStage);
                    $doc->exportCaption($this->Day1);
                    $doc->exportCaption($this->Day2);
                    $doc->exportCaption($this->Day3);
                    $doc->exportCaption($this->Day4);
                    $doc->exportCaption($this->Day5);
                    $doc->exportCaption($this->Day6);
                    $doc->exportCaption($this->ET);
                    $doc->exportCaption($this->ETDate);
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
                        $doc->exportField($this->TidNo);
                        $doc->exportField($this->Day0OocyteStage);
                        $doc->exportField($this->Day1);
                        $doc->exportField($this->Day2);
                        $doc->exportField($this->Day3);
                        $doc->exportField($this->Day4);
                        $doc->exportField($this->Day5);
                        $doc->exportField($this->Day6);
                        $doc->exportField($this->ET);
                        $doc->exportField($this->ETDate);
                    } else {
                        $doc->exportField($this->TidNo);
                        $doc->exportField($this->Day0OocyteStage);
                        $doc->exportField($this->Day1);
                        $doc->exportField($this->Day2);
                        $doc->exportField($this->Day3);
                        $doc->exportField($this->Day4);
                        $doc->exportField($this->Day5);
                        $doc->exportField($this->Day6);
                        $doc->exportField($this->ET);
                        $doc->exportField($this->ETDate);
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
