<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_appointment_scheduler_new
 */
class ViewAppointmentSchedulerNew extends DbTable
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
    public $Id;
    public $patientID;
    public $patientName;
    public $MobileNumber;
    public $start_time;
    public $start_date;
    public $Purpose;
    public $patienttype;
    public $Referal;
    public $DoctorName;
    public $HospID;
    public $PatientTypee;
    public $Notes;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'view_appointment_scheduler_new';
        $this->TableName = 'view_appointment_scheduler_new';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_appointment_scheduler_new`";
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

        // Id
        $this->Id = new DbField('view_appointment_scheduler_new', 'view_appointment_scheduler_new', 'x_Id', 'Id', '`Id`', '`Id`', 3, 11, -1, false, '`Id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->Id->IsAutoIncrement = true; // Autoincrement field
        $this->Id->IsPrimaryKey = true; // Primary key field
        $this->Id->Sortable = true; // Allow sort
        $this->Id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['Id'] = &$this->Id;

        // patientID
        $this->patientID = new DbField('view_appointment_scheduler_new', 'view_appointment_scheduler_new', 'x_patientID', 'patientID', '`patientID`', '`patientID`', 200, 45, -1, false, '`patientID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->patientID->Sortable = true; // Allow sort
        $this->Fields['patientID'] = &$this->patientID;

        // patientName
        $this->patientName = new DbField('view_appointment_scheduler_new', 'view_appointment_scheduler_new', 'x_patientName', 'patientName', '`patientName`', '`patientName`', 200, 45, -1, false, '`patientName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->patientName->Sortable = true; // Allow sort
        $this->Fields['patientName'] = &$this->patientName;

        // MobileNumber
        $this->MobileNumber = new DbField('view_appointment_scheduler_new', 'view_appointment_scheduler_new', 'x_MobileNumber', 'MobileNumber', '`MobileNumber`', '`MobileNumber`', 200, 45, -1, false, '`MobileNumber`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MobileNumber->Sortable = true; // Allow sort
        $this->Fields['MobileNumber'] = &$this->MobileNumber;

        // start_time
        $this->start_time = new DbField('view_appointment_scheduler_new', 'view_appointment_scheduler_new', 'x_start_time', 'start_time', '`start_time`', CastDateFieldForLike("`start_time`", 0, "DB"), 135, 19, 0, false, '`start_time`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->start_time->Sortable = true; // Allow sort
        $this->start_time->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['start_time'] = &$this->start_time;

        // start_date
        $this->start_date = new DbField('view_appointment_scheduler_new', 'view_appointment_scheduler_new', 'x_start_date', 'start_date', '`start_date`', CastDateFieldForLike("`start_date`", 0, "DB"), 135, 19, 0, false, '`start_date`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->start_date->Sortable = true; // Allow sort
        $this->start_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['start_date'] = &$this->start_date;

        // Purpose
        $this->Purpose = new DbField('view_appointment_scheduler_new', 'view_appointment_scheduler_new', 'x_Purpose', 'Purpose', '`Purpose`', '`Purpose`', 200, 45, -1, false, '`Purpose`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Purpose->Sortable = true; // Allow sort
        $this->Fields['Purpose'] = &$this->Purpose;

        // patienttype
        $this->patienttype = new DbField('view_appointment_scheduler_new', 'view_appointment_scheduler_new', 'x_patienttype', 'patienttype', '`patienttype`', '`patienttype`', 200, 45, -1, false, '`patienttype`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->patienttype->Sortable = true; // Allow sort
        $this->Fields['patienttype'] = &$this->patienttype;

        // Referal
        $this->Referal = new DbField('view_appointment_scheduler_new', 'view_appointment_scheduler_new', 'x_Referal', 'Referal', '`Referal`', '`Referal`', 200, 45, -1, false, '`Referal`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Referal->Sortable = true; // Allow sort
        $this->Fields['Referal'] = &$this->Referal;

        // DoctorName
        $this->DoctorName = new DbField('view_appointment_scheduler_new', 'view_appointment_scheduler_new', 'x_DoctorName', 'DoctorName', '`DoctorName`', '`DoctorName`', 200, 45, -1, false, '`DoctorName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DoctorName->Sortable = true; // Allow sort
        $this->Fields['DoctorName'] = &$this->DoctorName;

        // HospID
        $this->HospID = new DbField('view_appointment_scheduler_new', 'view_appointment_scheduler_new', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['HospID'] = &$this->HospID;

        // PatientTypee
        $this->PatientTypee = new DbField('view_appointment_scheduler_new', 'view_appointment_scheduler_new', 'x_PatientTypee', 'PatientTypee', '`PatientTypee`', '`PatientTypee`', 200, 45, -1, false, '`PatientTypee`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientTypee->Sortable = true; // Allow sort
        $this->Fields['PatientTypee'] = &$this->PatientTypee;

        // Notes
        $this->Notes = new DbField('view_appointment_scheduler_new', 'view_appointment_scheduler_new', 'x_Notes', 'Notes', '`Notes`', '`Notes`', 200, 45, -1, false, '`Notes`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Notes->Sortable = true; // Allow sort
        $this->Fields['Notes'] = &$this->Notes;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_appointment_scheduler_new`";
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
            $this->Id->setDbValue($conn->lastInsertId());
            $rs['Id'] = $this->Id->DbValue;
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
            if (array_key_exists('Id', $rs)) {
                AddFilter($where, QuotedName('Id', $this->Dbid) . '=' . QuotedValue($rs['Id'], $this->Id->DataType, $this->Dbid));
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
        $this->Id->DbValue = $row['Id'];
        $this->patientID->DbValue = $row['patientID'];
        $this->patientName->DbValue = $row['patientName'];
        $this->MobileNumber->DbValue = $row['MobileNumber'];
        $this->start_time->DbValue = $row['start_time'];
        $this->start_date->DbValue = $row['start_date'];
        $this->Purpose->DbValue = $row['Purpose'];
        $this->patienttype->DbValue = $row['patienttype'];
        $this->Referal->DbValue = $row['Referal'];
        $this->DoctorName->DbValue = $row['DoctorName'];
        $this->HospID->DbValue = $row['HospID'];
        $this->PatientTypee->DbValue = $row['PatientTypee'];
        $this->Notes->DbValue = $row['Notes'];
    }

    // Delete uploaded files
    public function deleteUploadedFiles($row)
    {
        $this->loadDbValues($row);
    }

    // Record filter WHERE clause
    protected function sqlKeyFilter()
    {
        return "`Id` = @Id@";
    }

    // Get record filter
    public function getRecordFilter($row = null)
    {
        $keyFilter = $this->sqlKeyFilter();
        if (is_array($row)) {
            $val = array_key_exists('Id', $row) ? $row['Id'] : null;
        } else {
            $val = $this->Id->OldValue !== null ? $this->Id->OldValue : $this->Id->CurrentValue;
        }
        if (!is_numeric($val)) {
            return "0=1"; // Invalid key
        }
        if ($val === null) {
            return "0=1"; // Invalid key
        } else {
            $keyFilter = str_replace("@Id@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
            return GetUrl("ViewAppointmentSchedulerNewList");
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
        if ($pageName == "ViewAppointmentSchedulerNewView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewAppointmentSchedulerNewEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewAppointmentSchedulerNewAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewAppointmentSchedulerNewList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewAppointmentSchedulerNewView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewAppointmentSchedulerNewView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewAppointmentSchedulerNewAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewAppointmentSchedulerNewAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewAppointmentSchedulerNewEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewAppointmentSchedulerNewAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewAppointmentSchedulerNewDelete", $this->getUrlParm());
    }

    // Add master url
    public function addMasterUrl($url)
    {
        return $url;
    }

    public function keyToJson($htmlEncode = false)
    {
        $json = "";
        $json .= "Id:" . JsonEncode($this->Id->CurrentValue, "number");
        $json = "{" . $json . "}";
        if ($htmlEncode) {
            $json = HtmlEncode($json);
        }
        return $json;
    }

    // Add key value to URL
    public function keyUrl($url, $parm = "")
    {
        if ($this->Id->CurrentValue !== null) {
            $url .= "/" . rawurlencode($this->Id->CurrentValue);
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
            if (($keyValue = Param("Id") ?? Route("Id")) !== null) {
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
                $this->Id->CurrentValue = $key;
            } else {
                $this->Id->OldValue = $key;
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
        $this->Id->setDbValue($row['Id']);
        $this->patientID->setDbValue($row['patientID']);
        $this->patientName->setDbValue($row['patientName']);
        $this->MobileNumber->setDbValue($row['MobileNumber']);
        $this->start_time->setDbValue($row['start_time']);
        $this->start_date->setDbValue($row['start_date']);
        $this->Purpose->setDbValue($row['Purpose']);
        $this->patienttype->setDbValue($row['patienttype']);
        $this->Referal->setDbValue($row['Referal']);
        $this->DoctorName->setDbValue($row['DoctorName']);
        $this->HospID->setDbValue($row['HospID']);
        $this->PatientTypee->setDbValue($row['PatientTypee']);
        $this->Notes->setDbValue($row['Notes']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // Id

        // patientID

        // patientName

        // MobileNumber

        // start_time

        // start_date

        // Purpose

        // patienttype

        // Referal

        // DoctorName

        // HospID

        // PatientTypee

        // Notes

        // Id
        $this->Id->ViewValue = $this->Id->CurrentValue;
        $this->Id->ViewCustomAttributes = "";

        // patientID
        $this->patientID->ViewValue = $this->patientID->CurrentValue;
        $this->patientID->ViewCustomAttributes = "";

        // patientName
        $this->patientName->ViewValue = $this->patientName->CurrentValue;
        $this->patientName->ViewCustomAttributes = "";

        // MobileNumber
        $this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
        $this->MobileNumber->ViewCustomAttributes = "";

        // start_time
        $this->start_time->ViewValue = $this->start_time->CurrentValue;
        $this->start_time->ViewValue = FormatDateTime($this->start_time->ViewValue, 0);
        $this->start_time->ViewCustomAttributes = "";

        // start_date
        $this->start_date->ViewValue = $this->start_date->CurrentValue;
        $this->start_date->ViewValue = FormatDateTime($this->start_date->ViewValue, 0);
        $this->start_date->ViewCustomAttributes = "";

        // Purpose
        $this->Purpose->ViewValue = $this->Purpose->CurrentValue;
        $this->Purpose->ViewCustomAttributes = "";

        // patienttype
        $this->patienttype->ViewValue = $this->patienttype->CurrentValue;
        $this->patienttype->ViewCustomAttributes = "";

        // Referal
        $this->Referal->ViewValue = $this->Referal->CurrentValue;
        $this->Referal->ViewCustomAttributes = "";

        // DoctorName
        $this->DoctorName->ViewValue = $this->DoctorName->CurrentValue;
        $this->DoctorName->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

        // PatientTypee
        $this->PatientTypee->ViewValue = $this->PatientTypee->CurrentValue;
        $this->PatientTypee->ViewCustomAttributes = "";

        // Notes
        $this->Notes->ViewValue = $this->Notes->CurrentValue;
        $this->Notes->ViewCustomAttributes = "";

        // Id
        $this->Id->LinkCustomAttributes = "";
        $this->Id->HrefValue = "";
        $this->Id->TooltipValue = "";

        // patientID
        $this->patientID->LinkCustomAttributes = "";
        $this->patientID->HrefValue = "";
        $this->patientID->TooltipValue = "";

        // patientName
        $this->patientName->LinkCustomAttributes = "";
        $this->patientName->HrefValue = "";
        $this->patientName->TooltipValue = "";

        // MobileNumber
        $this->MobileNumber->LinkCustomAttributes = "";
        $this->MobileNumber->HrefValue = "";
        $this->MobileNumber->TooltipValue = "";

        // start_time
        $this->start_time->LinkCustomAttributes = "";
        $this->start_time->HrefValue = "";
        $this->start_time->TooltipValue = "";

        // start_date
        $this->start_date->LinkCustomAttributes = "";
        $this->start_date->HrefValue = "";
        $this->start_date->TooltipValue = "";

        // Purpose
        $this->Purpose->LinkCustomAttributes = "";
        $this->Purpose->HrefValue = "";
        $this->Purpose->TooltipValue = "";

        // patienttype
        $this->patienttype->LinkCustomAttributes = "";
        $this->patienttype->HrefValue = "";
        $this->patienttype->TooltipValue = "";

        // Referal
        $this->Referal->LinkCustomAttributes = "";
        $this->Referal->HrefValue = "";
        $this->Referal->TooltipValue = "";

        // DoctorName
        $this->DoctorName->LinkCustomAttributes = "";
        $this->DoctorName->HrefValue = "";
        $this->DoctorName->TooltipValue = "";

        // HospID
        $this->HospID->LinkCustomAttributes = "";
        $this->HospID->HrefValue = "";
        $this->HospID->TooltipValue = "";

        // PatientTypee
        $this->PatientTypee->LinkCustomAttributes = "";
        $this->PatientTypee->HrefValue = "";
        $this->PatientTypee->TooltipValue = "";

        // Notes
        $this->Notes->LinkCustomAttributes = "";
        $this->Notes->HrefValue = "";
        $this->Notes->TooltipValue = "";

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

        // Id
        $this->Id->EditAttrs["class"] = "form-control";
        $this->Id->EditCustomAttributes = "";
        $this->Id->EditValue = $this->Id->CurrentValue;
        $this->Id->ViewCustomAttributes = "";

        // patientID
        $this->patientID->EditAttrs["class"] = "form-control";
        $this->patientID->EditCustomAttributes = "";
        if (!$this->patientID->Raw) {
            $this->patientID->CurrentValue = HtmlDecode($this->patientID->CurrentValue);
        }
        $this->patientID->EditValue = $this->patientID->CurrentValue;
        $this->patientID->PlaceHolder = RemoveHtml($this->patientID->caption());

        // patientName
        $this->patientName->EditAttrs["class"] = "form-control";
        $this->patientName->EditCustomAttributes = "";
        if (!$this->patientName->Raw) {
            $this->patientName->CurrentValue = HtmlDecode($this->patientName->CurrentValue);
        }
        $this->patientName->EditValue = $this->patientName->CurrentValue;
        $this->patientName->PlaceHolder = RemoveHtml($this->patientName->caption());

        // MobileNumber
        $this->MobileNumber->EditAttrs["class"] = "form-control";
        $this->MobileNumber->EditCustomAttributes = "";
        if (!$this->MobileNumber->Raw) {
            $this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
        }
        $this->MobileNumber->EditValue = $this->MobileNumber->CurrentValue;
        $this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

        // start_time
        $this->start_time->EditAttrs["class"] = "form-control";
        $this->start_time->EditCustomAttributes = "";
        $this->start_time->EditValue = FormatDateTime($this->start_time->CurrentValue, 8);
        $this->start_time->PlaceHolder = RemoveHtml($this->start_time->caption());

        // start_date
        $this->start_date->EditAttrs["class"] = "form-control";
        $this->start_date->EditCustomAttributes = "";
        $this->start_date->EditValue = FormatDateTime($this->start_date->CurrentValue, 8);
        $this->start_date->PlaceHolder = RemoveHtml($this->start_date->caption());

        // Purpose
        $this->Purpose->EditAttrs["class"] = "form-control";
        $this->Purpose->EditCustomAttributes = "";
        if (!$this->Purpose->Raw) {
            $this->Purpose->CurrentValue = HtmlDecode($this->Purpose->CurrentValue);
        }
        $this->Purpose->EditValue = $this->Purpose->CurrentValue;
        $this->Purpose->PlaceHolder = RemoveHtml($this->Purpose->caption());

        // patienttype
        $this->patienttype->EditAttrs["class"] = "form-control";
        $this->patienttype->EditCustomAttributes = "";
        if (!$this->patienttype->Raw) {
            $this->patienttype->CurrentValue = HtmlDecode($this->patienttype->CurrentValue);
        }
        $this->patienttype->EditValue = $this->patienttype->CurrentValue;
        $this->patienttype->PlaceHolder = RemoveHtml($this->patienttype->caption());

        // Referal
        $this->Referal->EditAttrs["class"] = "form-control";
        $this->Referal->EditCustomAttributes = "";
        if (!$this->Referal->Raw) {
            $this->Referal->CurrentValue = HtmlDecode($this->Referal->CurrentValue);
        }
        $this->Referal->EditValue = $this->Referal->CurrentValue;
        $this->Referal->PlaceHolder = RemoveHtml($this->Referal->caption());

        // DoctorName
        $this->DoctorName->EditAttrs["class"] = "form-control";
        $this->DoctorName->EditCustomAttributes = "";
        if (!$this->DoctorName->Raw) {
            $this->DoctorName->CurrentValue = HtmlDecode($this->DoctorName->CurrentValue);
        }
        $this->DoctorName->EditValue = $this->DoctorName->CurrentValue;
        $this->DoctorName->PlaceHolder = RemoveHtml($this->DoctorName->caption());

        // HospID
        $this->HospID->EditAttrs["class"] = "form-control";
        $this->HospID->EditCustomAttributes = "";
        $this->HospID->EditValue = $this->HospID->CurrentValue;
        $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

        // PatientTypee
        $this->PatientTypee->EditAttrs["class"] = "form-control";
        $this->PatientTypee->EditCustomAttributes = "";
        if (!$this->PatientTypee->Raw) {
            $this->PatientTypee->CurrentValue = HtmlDecode($this->PatientTypee->CurrentValue);
        }
        $this->PatientTypee->EditValue = $this->PatientTypee->CurrentValue;
        $this->PatientTypee->PlaceHolder = RemoveHtml($this->PatientTypee->caption());

        // Notes
        $this->Notes->EditAttrs["class"] = "form-control";
        $this->Notes->EditCustomAttributes = "";
        if (!$this->Notes->Raw) {
            $this->Notes->CurrentValue = HtmlDecode($this->Notes->CurrentValue);
        }
        $this->Notes->EditValue = $this->Notes->CurrentValue;
        $this->Notes->PlaceHolder = RemoveHtml($this->Notes->caption());

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
                    $doc->exportCaption($this->Id);
                    $doc->exportCaption($this->patientID);
                    $doc->exportCaption($this->patientName);
                    $doc->exportCaption($this->MobileNumber);
                    $doc->exportCaption($this->start_time);
                    $doc->exportCaption($this->start_date);
                    $doc->exportCaption($this->Purpose);
                    $doc->exportCaption($this->patienttype);
                    $doc->exportCaption($this->Referal);
                    $doc->exportCaption($this->DoctorName);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->PatientTypee);
                    $doc->exportCaption($this->Notes);
                } else {
                    $doc->exportCaption($this->Id);
                    $doc->exportCaption($this->patientID);
                    $doc->exportCaption($this->patientName);
                    $doc->exportCaption($this->MobileNumber);
                    $doc->exportCaption($this->start_time);
                    $doc->exportCaption($this->start_date);
                    $doc->exportCaption($this->Purpose);
                    $doc->exportCaption($this->patienttype);
                    $doc->exportCaption($this->Referal);
                    $doc->exportCaption($this->DoctorName);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->PatientTypee);
                    $doc->exportCaption($this->Notes);
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
                        $doc->exportField($this->Id);
                        $doc->exportField($this->patientID);
                        $doc->exportField($this->patientName);
                        $doc->exportField($this->MobileNumber);
                        $doc->exportField($this->start_time);
                        $doc->exportField($this->start_date);
                        $doc->exportField($this->Purpose);
                        $doc->exportField($this->patienttype);
                        $doc->exportField($this->Referal);
                        $doc->exportField($this->DoctorName);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->PatientTypee);
                        $doc->exportField($this->Notes);
                    } else {
                        $doc->exportField($this->Id);
                        $doc->exportField($this->patientID);
                        $doc->exportField($this->patientName);
                        $doc->exportField($this->MobileNumber);
                        $doc->exportField($this->start_time);
                        $doc->exportField($this->start_date);
                        $doc->exportField($this->Purpose);
                        $doc->exportField($this->patienttype);
                        $doc->exportField($this->Referal);
                        $doc->exportField($this->DoctorName);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->PatientTypee);
                        $doc->exportField($this->Notes);
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
