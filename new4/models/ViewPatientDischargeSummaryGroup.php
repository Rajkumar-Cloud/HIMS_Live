<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_patient_discharge_summary_group
 */
class ViewPatientDischargeSummaryGroup extends DbTable
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
    public $patient_id;
    public $patient_name;
    public $PatientID;
    public $mrnNo;
    public $profilePic;
    public $gender;
    public $physician_id;
    public $typeRegsisteration;
    public $HospID;
    public $AdviceToOtherHospital;
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
        $this->TableVar = 'view_patient_discharge_summary_group';
        $this->TableName = 'view_patient_discharge_summary_group';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_patient_discharge_summary_group`";
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
        $this->id = new DbField('view_patient_discharge_summary_group', 'view_patient_discharge_summary_group', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->id->Nullable = false; // NOT NULL field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // patient_id
        $this->patient_id = new DbField('view_patient_discharge_summary_group', 'view_patient_discharge_summary_group', 'x_patient_id', 'patient_id', '`patient_id`', '`patient_id`', 3, 11, -1, false, '`patient_id`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->patient_id->Nullable = false; // NOT NULL field
        $this->patient_id->Required = true; // Required field
        $this->patient_id->Sortable = true; // Allow sort
        $this->patient_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->patient_id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->patient_id->Param, "CustomMsg");
        $this->Fields['patient_id'] = &$this->patient_id;

        // patient_name
        $this->patient_name = new DbField('view_patient_discharge_summary_group', 'view_patient_discharge_summary_group', 'x_patient_name', 'patient_name', '`patient_name`', '`patient_name`', 200, 45, -1, false, '`patient_name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->patient_name->Sortable = true; // Allow sort
        $this->patient_name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->patient_name->Param, "CustomMsg");
        $this->Fields['patient_name'] = &$this->patient_name;

        // PatientID
        $this->PatientID = new DbField('view_patient_discharge_summary_group', 'view_patient_discharge_summary_group', 'x_PatientID', 'PatientID', '`PatientID`', '`PatientID`', 200, 45, -1, false, '`PatientID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientID->Sortable = true; // Allow sort
        $this->PatientID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientID->Param, "CustomMsg");
        $this->Fields['PatientID'] = &$this->PatientID;

        // mrnNo
        $this->mrnNo = new DbField('view_patient_discharge_summary_group', 'view_patient_discharge_summary_group', 'x_mrnNo', 'mrnNo', '`mrnNo`', '`mrnNo`', 200, 45, -1, false, '`mrnNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->mrnNo->Nullable = false; // NOT NULL field
        $this->mrnNo->Required = true; // Required field
        $this->mrnNo->Sortable = true; // Allow sort
        $this->mrnNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->mrnNo->Param, "CustomMsg");
        $this->Fields['mrnNo'] = &$this->mrnNo;

        // profilePic
        $this->profilePic = new DbField('view_patient_discharge_summary_group', 'view_patient_discharge_summary_group', 'x_profilePic', 'profilePic', '`profilePic`', '`profilePic`', 201, 450, -1, false, '`profilePic`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->profilePic->Sortable = true; // Allow sort
        $this->profilePic->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->profilePic->Param, "CustomMsg");
        $this->Fields['profilePic'] = &$this->profilePic;

        // gender
        $this->gender = new DbField('view_patient_discharge_summary_group', 'view_patient_discharge_summary_group', 'x_gender', 'gender', '`gender`', '`gender`', 200, 45, -1, false, '`gender`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->gender->Sortable = true; // Allow sort
        $this->gender->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->gender->Param, "CustomMsg");
        $this->Fields['gender'] = &$this->gender;

        // physician_id
        $this->physician_id = new DbField('view_patient_discharge_summary_group', 'view_patient_discharge_summary_group', 'x_physician_id', 'physician_id', '`physician_id`', '`physician_id`', 3, 11, -1, false, '`physician_id`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->physician_id->Sortable = true; // Allow sort
        $this->physician_id->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->physician_id->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->physician_id->Lookup = new Lookup('physician_id', 'doctors', false, 'id', ["NAME","","",""], [], [], [], [], [], [], '', '');
        $this->physician_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->physician_id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->physician_id->Param, "CustomMsg");
        $this->Fields['physician_id'] = &$this->physician_id;

        // typeRegsisteration
        $this->typeRegsisteration = new DbField('view_patient_discharge_summary_group', 'view_patient_discharge_summary_group', 'x_typeRegsisteration', 'typeRegsisteration', '`typeRegsisteration`', '`typeRegsisteration`', 200, 45, -1, false, '`typeRegsisteration`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->typeRegsisteration->Sortable = true; // Allow sort
        $this->typeRegsisteration->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->typeRegsisteration->Param, "CustomMsg");
        $this->Fields['typeRegsisteration'] = &$this->typeRegsisteration;

        // HospID
        $this->HospID = new DbField('view_patient_discharge_summary_group', 'view_patient_discharge_summary_group', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 200, 45, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospID->Param, "CustomMsg");
        $this->Fields['HospID'] = &$this->HospID;

        // AdviceToOtherHospital
        $this->AdviceToOtherHospital = new DbField('view_patient_discharge_summary_group', 'view_patient_discharge_summary_group', 'x_AdviceToOtherHospital', 'AdviceToOtherHospital', '`AdviceToOtherHospital`', '`AdviceToOtherHospital`', 200, 45, -1, false, '`AdviceToOtherHospital`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AdviceToOtherHospital->Sortable = true; // Allow sort
        $this->AdviceToOtherHospital->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AdviceToOtherHospital->Param, "CustomMsg");
        $this->Fields['AdviceToOtherHospital'] = &$this->AdviceToOtherHospital;

        // vid
        $this->vid = new DbField('view_patient_discharge_summary_group', 'view_patient_discharge_summary_group', 'x_vid', 'vid', '`vid`', '`vid`', 3, 11, -1, false, '`vid`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->vid->Nullable = false; // NOT NULL field
        $this->vid->Sortable = true; // Allow sort
        $this->vid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->vid->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->vid->Param, "CustomMsg");
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_patient_discharge_summary_group`";
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
        $this->id->DbValue = $row['id'];
        $this->patient_id->DbValue = $row['patient_id'];
        $this->patient_name->DbValue = $row['patient_name'];
        $this->PatientID->DbValue = $row['PatientID'];
        $this->mrnNo->DbValue = $row['mrnNo'];
        $this->profilePic->DbValue = $row['profilePic'];
        $this->gender->DbValue = $row['gender'];
        $this->physician_id->DbValue = $row['physician_id'];
        $this->typeRegsisteration->DbValue = $row['typeRegsisteration'];
        $this->HospID->DbValue = $row['HospID'];
        $this->AdviceToOtherHospital->DbValue = $row['AdviceToOtherHospital'];
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
        return $_SESSION[$name] ?? GetUrl("ViewPatientDischargeSummaryGroupList");
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
        if ($pageName == "ViewPatientDischargeSummaryGroupView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewPatientDischargeSummaryGroupEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewPatientDischargeSummaryGroupAdd") {
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
                return "ViewPatientDischargeSummaryGroupView";
            case Config("API_ADD_ACTION"):
                return "ViewPatientDischargeSummaryGroupAdd";
            case Config("API_EDIT_ACTION"):
                return "ViewPatientDischargeSummaryGroupEdit";
            case Config("API_DELETE_ACTION"):
                return "ViewPatientDischargeSummaryGroupDelete";
            case Config("API_LIST_ACTION"):
                return "ViewPatientDischargeSummaryGroupList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewPatientDischargeSummaryGroupList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewPatientDischargeSummaryGroupView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewPatientDischargeSummaryGroupView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewPatientDischargeSummaryGroupAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewPatientDischargeSummaryGroupAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewPatientDischargeSummaryGroupEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewPatientDischargeSummaryGroupAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewPatientDischargeSummaryGroupDelete", $this->getUrlParm());
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
        $this->id->setDbValue($row['id']);
        $this->patient_id->setDbValue($row['patient_id']);
        $this->patient_name->setDbValue($row['patient_name']);
        $this->PatientID->setDbValue($row['PatientID']);
        $this->mrnNo->setDbValue($row['mrnNo']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->gender->setDbValue($row['gender']);
        $this->physician_id->setDbValue($row['physician_id']);
        $this->typeRegsisteration->setDbValue($row['typeRegsisteration']);
        $this->HospID->setDbValue($row['HospID']);
        $this->AdviceToOtherHospital->setDbValue($row['AdviceToOtherHospital']);
        $this->vid->setDbValue($row['vid']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // patient_id

        // patient_name

        // PatientID

        // mrnNo

        // profilePic

        // gender

        // physician_id

        // typeRegsisteration

        // HospID

        // AdviceToOtherHospital

        // vid

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewValue = FormatNumber($this->id->ViewValue, 0, -2, -2, -2);
        $this->id->ViewCustomAttributes = "";

        // patient_id
        $this->patient_id->ViewValue = $this->patient_id->CurrentValue;
        $this->patient_id->ViewValue = FormatNumber($this->patient_id->ViewValue, 0, -2, -2, -2);
        $this->patient_id->ViewCustomAttributes = "";

        // patient_name
        $this->patient_name->ViewValue = $this->patient_name->CurrentValue;
        $this->patient_name->ViewCustomAttributes = "";

        // PatientID
        $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
        $this->PatientID->ViewCustomAttributes = "";

        // mrnNo
        $this->mrnNo->ViewValue = $this->mrnNo->CurrentValue;
        $this->mrnNo->ViewCustomAttributes = "";

        // profilePic
        $this->profilePic->ViewValue = $this->profilePic->CurrentValue;
        $this->profilePic->ViewCustomAttributes = "";

        // gender
        $this->gender->ViewValue = $this->gender->CurrentValue;
        $this->gender->ViewCustomAttributes = "";

        // physician_id
        $curVal = trim(strval($this->physician_id->CurrentValue));
        if ($curVal != "") {
            $this->physician_id->ViewValue = $this->physician_id->lookupCacheOption($curVal);
            if ($this->physician_id->ViewValue === null) { // Lookup from database
                $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                $sqlWrk = $this->physician_id->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->physician_id->Lookup->renderViewRow($rswrk[0]);
                    $this->physician_id->ViewValue = $this->physician_id->displayValue($arwrk);
                } else {
                    $this->physician_id->ViewValue = $this->physician_id->CurrentValue;
                }
            }
        } else {
            $this->physician_id->ViewValue = null;
        }
        $this->physician_id->ViewCustomAttributes = "";

        // typeRegsisteration
        $this->typeRegsisteration->ViewValue = $this->typeRegsisteration->CurrentValue;
        $this->typeRegsisteration->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewCustomAttributes = "";

        // AdviceToOtherHospital
        $this->AdviceToOtherHospital->ViewValue = $this->AdviceToOtherHospital->CurrentValue;
        $this->AdviceToOtherHospital->ViewCustomAttributes = "";

        // vid
        $this->vid->ViewValue = $this->vid->CurrentValue;
        $this->vid->ViewValue = FormatNumber($this->vid->ViewValue, 0, -2, -2, -2);
        $this->vid->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // patient_id
        $this->patient_id->LinkCustomAttributes = "";
        $this->patient_id->HrefValue = "";
        $this->patient_id->TooltipValue = "";

        // patient_name
        $this->patient_name->LinkCustomAttributes = "";
        $this->patient_name->HrefValue = "";
        $this->patient_name->TooltipValue = "";

        // PatientID
        $this->PatientID->LinkCustomAttributes = "";
        $this->PatientID->HrefValue = "";
        $this->PatientID->TooltipValue = "";

        // mrnNo
        $this->mrnNo->LinkCustomAttributes = "";
        $this->mrnNo->HrefValue = "";
        $this->mrnNo->TooltipValue = "";

        // profilePic
        $this->profilePic->LinkCustomAttributes = "";
        $this->profilePic->HrefValue = "";
        $this->profilePic->TooltipValue = "";

        // gender
        $this->gender->LinkCustomAttributes = "";
        $this->gender->HrefValue = "";
        $this->gender->TooltipValue = "";

        // physician_id
        $this->physician_id->LinkCustomAttributes = "";
        $this->physician_id->HrefValue = "";
        $this->physician_id->TooltipValue = "";

        // typeRegsisteration
        $this->typeRegsisteration->LinkCustomAttributes = "";
        $this->typeRegsisteration->HrefValue = "";
        $this->typeRegsisteration->TooltipValue = "";

        // HospID
        $this->HospID->LinkCustomAttributes = "";
        $this->HospID->HrefValue = "";
        $this->HospID->TooltipValue = "";

        // AdviceToOtherHospital
        $this->AdviceToOtherHospital->LinkCustomAttributes = "";
        $this->AdviceToOtherHospital->HrefValue = "";
        $this->AdviceToOtherHospital->TooltipValue = "";

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

        // id
        $this->id->EditAttrs["class"] = "form-control";
        $this->id->EditCustomAttributes = "";
        $this->id->EditValue = $this->id->CurrentValue;
        $this->id->PlaceHolder = RemoveHtml($this->id->caption());

        // patient_id
        $this->patient_id->EditAttrs["class"] = "form-control";
        $this->patient_id->EditCustomAttributes = "";
        $this->patient_id->EditValue = $this->patient_id->CurrentValue;
        $this->patient_id->PlaceHolder = RemoveHtml($this->patient_id->caption());

        // patient_name
        $this->patient_name->EditAttrs["class"] = "form-control";
        $this->patient_name->EditCustomAttributes = "";
        if (!$this->patient_name->Raw) {
            $this->patient_name->CurrentValue = HtmlDecode($this->patient_name->CurrentValue);
        }
        $this->patient_name->EditValue = $this->patient_name->CurrentValue;
        $this->patient_name->PlaceHolder = RemoveHtml($this->patient_name->caption());

        // PatientID
        $this->PatientID->EditAttrs["class"] = "form-control";
        $this->PatientID->EditCustomAttributes = "";
        if (!$this->PatientID->Raw) {
            $this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
        }
        $this->PatientID->EditValue = $this->PatientID->CurrentValue;
        $this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

        // mrnNo
        $this->mrnNo->EditAttrs["class"] = "form-control";
        $this->mrnNo->EditCustomAttributes = "";
        if (!$this->mrnNo->Raw) {
            $this->mrnNo->CurrentValue = HtmlDecode($this->mrnNo->CurrentValue);
        }
        $this->mrnNo->EditValue = $this->mrnNo->CurrentValue;
        $this->mrnNo->PlaceHolder = RemoveHtml($this->mrnNo->caption());

        // profilePic
        $this->profilePic->EditAttrs["class"] = "form-control";
        $this->profilePic->EditCustomAttributes = "";
        if (!$this->profilePic->Raw) {
            $this->profilePic->CurrentValue = HtmlDecode($this->profilePic->CurrentValue);
        }
        $this->profilePic->EditValue = $this->profilePic->CurrentValue;
        $this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

        // gender
        $this->gender->EditAttrs["class"] = "form-control";
        $this->gender->EditCustomAttributes = "";
        if (!$this->gender->Raw) {
            $this->gender->CurrentValue = HtmlDecode($this->gender->CurrentValue);
        }
        $this->gender->EditValue = $this->gender->CurrentValue;
        $this->gender->PlaceHolder = RemoveHtml($this->gender->caption());

        // physician_id
        $this->physician_id->EditAttrs["class"] = "form-control";
        $this->physician_id->EditCustomAttributes = "";
        $this->physician_id->PlaceHolder = RemoveHtml($this->physician_id->caption());

        // typeRegsisteration
        $this->typeRegsisteration->EditAttrs["class"] = "form-control";
        $this->typeRegsisteration->EditCustomAttributes = "";
        if (!$this->typeRegsisteration->Raw) {
            $this->typeRegsisteration->CurrentValue = HtmlDecode($this->typeRegsisteration->CurrentValue);
        }
        $this->typeRegsisteration->EditValue = $this->typeRegsisteration->CurrentValue;
        $this->typeRegsisteration->PlaceHolder = RemoveHtml($this->typeRegsisteration->caption());

        // HospID
        $this->HospID->EditAttrs["class"] = "form-control";
        $this->HospID->EditCustomAttributes = "";
        if (!$this->HospID->Raw) {
            $this->HospID->CurrentValue = HtmlDecode($this->HospID->CurrentValue);
        }
        $this->HospID->EditValue = $this->HospID->CurrentValue;
        $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

        // AdviceToOtherHospital
        $this->AdviceToOtherHospital->EditAttrs["class"] = "form-control";
        $this->AdviceToOtherHospital->EditCustomAttributes = "";
        if (!$this->AdviceToOtherHospital->Raw) {
            $this->AdviceToOtherHospital->CurrentValue = HtmlDecode($this->AdviceToOtherHospital->CurrentValue);
        }
        $this->AdviceToOtherHospital->EditValue = $this->AdviceToOtherHospital->CurrentValue;
        $this->AdviceToOtherHospital->PlaceHolder = RemoveHtml($this->AdviceToOtherHospital->caption());

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
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->patient_id);
                    $doc->exportCaption($this->patient_name);
                    $doc->exportCaption($this->PatientID);
                    $doc->exportCaption($this->mrnNo);
                    $doc->exportCaption($this->profilePic);
                    $doc->exportCaption($this->gender);
                    $doc->exportCaption($this->physician_id);
                    $doc->exportCaption($this->typeRegsisteration);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->AdviceToOtherHospital);
                    $doc->exportCaption($this->vid);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->patient_id);
                    $doc->exportCaption($this->patient_name);
                    $doc->exportCaption($this->PatientID);
                    $doc->exportCaption($this->mrnNo);
                    $doc->exportCaption($this->profilePic);
                    $doc->exportCaption($this->gender);
                    $doc->exportCaption($this->physician_id);
                    $doc->exportCaption($this->typeRegsisteration);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->AdviceToOtherHospital);
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
                        $doc->exportField($this->id);
                        $doc->exportField($this->patient_id);
                        $doc->exportField($this->patient_name);
                        $doc->exportField($this->PatientID);
                        $doc->exportField($this->mrnNo);
                        $doc->exportField($this->profilePic);
                        $doc->exportField($this->gender);
                        $doc->exportField($this->physician_id);
                        $doc->exportField($this->typeRegsisteration);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->AdviceToOtherHospital);
                        $doc->exportField($this->vid);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->patient_id);
                        $doc->exportField($this->patient_name);
                        $doc->exportField($this->PatientID);
                        $doc->exportField($this->mrnNo);
                        $doc->exportField($this->profilePic);
                        $doc->exportField($this->gender);
                        $doc->exportField($this->physician_id);
                        $doc->exportField($this->typeRegsisteration);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->AdviceToOtherHospital);
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
