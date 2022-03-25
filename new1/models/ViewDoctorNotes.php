<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_doctor_notes
 */
class ViewDoctorNotes extends DbTable
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
    public $patientID;
    public $patientName;
    public $DoctorName;
    public $Referal;
    public $PatientTypee;
    public $procedurenotes;
    public $HospID;
    public $Created;
    public $Started;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'view_doctor_notes';
        $this->TableName = 'view_doctor_notes';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_doctor_notes`";
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

        // patientID
        $this->patientID = new DbField('view_doctor_notes', 'view_doctor_notes', 'x_patientID', 'patientID', '`patientID`', '`patientID`', 200, 45, -1, false, '`patientID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->patientID->Sortable = true; // Allow sort
        $this->Fields['patientID'] = &$this->patientID;

        // patientName
        $this->patientName = new DbField('view_doctor_notes', 'view_doctor_notes', 'x_patientName', 'patientName', '`patientName`', '`patientName`', 200, 45, -1, false, '`patientName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->patientName->Sortable = true; // Allow sort
        $this->Fields['patientName'] = &$this->patientName;

        // DoctorName
        $this->DoctorName = new DbField('view_doctor_notes', 'view_doctor_notes', 'x_DoctorName', 'DoctorName', '`DoctorName`', '`DoctorName`', 200, 45, -1, false, '`DoctorName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DoctorName->Sortable = true; // Allow sort
        $this->Fields['DoctorName'] = &$this->DoctorName;

        // Referal
        $this->Referal = new DbField('view_doctor_notes', 'view_doctor_notes', 'x_Referal', 'Referal', '`Referal`', '`Referal`', 200, 45, -1, false, '`Referal`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Referal->Sortable = true; // Allow sort
        $this->Fields['Referal'] = &$this->Referal;

        // PatientTypee
        $this->PatientTypee = new DbField('view_doctor_notes', 'view_doctor_notes', 'x_PatientTypee', 'PatientTypee', '`PatientTypee`', '`PatientTypee`', 200, 45, -1, false, '`PatientTypee`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientTypee->Sortable = true; // Allow sort
        $this->Fields['PatientTypee'] = &$this->PatientTypee;

        // procedurenotes
        $this->procedurenotes = new DbField('view_doctor_notes', 'view_doctor_notes', 'x_procedurenotes', 'procedurenotes', '`procedurenotes`', '`procedurenotes`', 201, -1, -1, false, '`procedurenotes`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->procedurenotes->Sortable = true; // Allow sort
        $this->Fields['procedurenotes'] = &$this->procedurenotes;

        // HospID
        $this->HospID = new DbField('view_doctor_notes', 'view_doctor_notes', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 200, 45, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->Fields['HospID'] = &$this->HospID;

        // Created
        $this->Created = new DbField('view_doctor_notes', 'view_doctor_notes', 'x_Created', 'Created', '`Created`', CastDateFieldForLike("`Created`", 0, "DB"), 133, 10, 0, false, '`Created`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Created->Sortable = true; // Allow sort
        $this->Created->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['Created'] = &$this->Created;

        // Started
        $this->Started = new DbField('view_doctor_notes', 'view_doctor_notes', 'x_Started', 'Started', '`Started`', CastDateFieldForLike("`Started`", 0, "DB"), 133, 10, 0, false, '`Started`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Started->Sortable = true; // Allow sort
        $this->Started->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['Started'] = &$this->Started;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_doctor_notes`";
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
        $this->patientID->DbValue = $row['patientID'];
        $this->patientName->DbValue = $row['patientName'];
        $this->DoctorName->DbValue = $row['DoctorName'];
        $this->Referal->DbValue = $row['Referal'];
        $this->PatientTypee->DbValue = $row['PatientTypee'];
        $this->procedurenotes->DbValue = $row['procedurenotes'];
        $this->HospID->DbValue = $row['HospID'];
        $this->Created->DbValue = $row['Created'];
        $this->Started->DbValue = $row['Started'];
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
            return GetUrl("ViewDoctorNotesList");
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
        if ($pageName == "ViewDoctorNotesView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewDoctorNotesEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewDoctorNotesAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewDoctorNotesList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewDoctorNotesView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewDoctorNotesView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewDoctorNotesAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewDoctorNotesAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewDoctorNotesEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewDoctorNotesAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewDoctorNotesDelete", $this->getUrlParm());
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
        $this->patientID->setDbValue($row['patientID']);
        $this->patientName->setDbValue($row['patientName']);
        $this->DoctorName->setDbValue($row['DoctorName']);
        $this->Referal->setDbValue($row['Referal']);
        $this->PatientTypee->setDbValue($row['PatientTypee']);
        $this->procedurenotes->setDbValue($row['procedurenotes']);
        $this->HospID->setDbValue($row['HospID']);
        $this->Created->setDbValue($row['Created']);
        $this->Started->setDbValue($row['Started']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // patientID

        // patientName

        // DoctorName

        // Referal

        // PatientTypee

        // procedurenotes

        // HospID

        // Created

        // Started

        // patientID
        $this->patientID->ViewValue = $this->patientID->CurrentValue;
        $this->patientID->ViewCustomAttributes = "";

        // patientName
        $this->patientName->ViewValue = $this->patientName->CurrentValue;
        $this->patientName->ViewCustomAttributes = "";

        // DoctorName
        $this->DoctorName->ViewValue = $this->DoctorName->CurrentValue;
        $this->DoctorName->ViewCustomAttributes = "";

        // Referal
        $this->Referal->ViewValue = $this->Referal->CurrentValue;
        $this->Referal->ViewCustomAttributes = "";

        // PatientTypee
        $this->PatientTypee->ViewValue = $this->PatientTypee->CurrentValue;
        $this->PatientTypee->ViewCustomAttributes = "";

        // procedurenotes
        $this->procedurenotes->ViewValue = $this->procedurenotes->CurrentValue;
        $this->procedurenotes->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewCustomAttributes = "";

        // Created
        $this->Created->ViewValue = $this->Created->CurrentValue;
        $this->Created->ViewValue = FormatDateTime($this->Created->ViewValue, 0);
        $this->Created->ViewCustomAttributes = "";

        // Started
        $this->Started->ViewValue = $this->Started->CurrentValue;
        $this->Started->ViewValue = FormatDateTime($this->Started->ViewValue, 0);
        $this->Started->ViewCustomAttributes = "";

        // patientID
        $this->patientID->LinkCustomAttributes = "";
        $this->patientID->HrefValue = "";
        $this->patientID->TooltipValue = "";

        // patientName
        $this->patientName->LinkCustomAttributes = "";
        $this->patientName->HrefValue = "";
        $this->patientName->TooltipValue = "";

        // DoctorName
        $this->DoctorName->LinkCustomAttributes = "";
        $this->DoctorName->HrefValue = "";
        $this->DoctorName->TooltipValue = "";

        // Referal
        $this->Referal->LinkCustomAttributes = "";
        $this->Referal->HrefValue = "";
        $this->Referal->TooltipValue = "";

        // PatientTypee
        $this->PatientTypee->LinkCustomAttributes = "";
        $this->PatientTypee->HrefValue = "";
        $this->PatientTypee->TooltipValue = "";

        // procedurenotes
        $this->procedurenotes->LinkCustomAttributes = "";
        $this->procedurenotes->HrefValue = "";
        $this->procedurenotes->TooltipValue = "";

        // HospID
        $this->HospID->LinkCustomAttributes = "";
        $this->HospID->HrefValue = "";
        $this->HospID->TooltipValue = "";

        // Created
        $this->Created->LinkCustomAttributes = "";
        $this->Created->HrefValue = "";
        $this->Created->TooltipValue = "";

        // Started
        $this->Started->LinkCustomAttributes = "";
        $this->Started->HrefValue = "";
        $this->Started->TooltipValue = "";

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

        // DoctorName
        $this->DoctorName->EditAttrs["class"] = "form-control";
        $this->DoctorName->EditCustomAttributes = "";
        if (!$this->DoctorName->Raw) {
            $this->DoctorName->CurrentValue = HtmlDecode($this->DoctorName->CurrentValue);
        }
        $this->DoctorName->EditValue = $this->DoctorName->CurrentValue;
        $this->DoctorName->PlaceHolder = RemoveHtml($this->DoctorName->caption());

        // Referal
        $this->Referal->EditAttrs["class"] = "form-control";
        $this->Referal->EditCustomAttributes = "";
        if (!$this->Referal->Raw) {
            $this->Referal->CurrentValue = HtmlDecode($this->Referal->CurrentValue);
        }
        $this->Referal->EditValue = $this->Referal->CurrentValue;
        $this->Referal->PlaceHolder = RemoveHtml($this->Referal->caption());

        // PatientTypee
        $this->PatientTypee->EditAttrs["class"] = "form-control";
        $this->PatientTypee->EditCustomAttributes = "";
        if (!$this->PatientTypee->Raw) {
            $this->PatientTypee->CurrentValue = HtmlDecode($this->PatientTypee->CurrentValue);
        }
        $this->PatientTypee->EditValue = $this->PatientTypee->CurrentValue;
        $this->PatientTypee->PlaceHolder = RemoveHtml($this->PatientTypee->caption());

        // procedurenotes
        $this->procedurenotes->EditAttrs["class"] = "form-control";
        $this->procedurenotes->EditCustomAttributes = "";
        $this->procedurenotes->EditValue = $this->procedurenotes->CurrentValue;
        $this->procedurenotes->PlaceHolder = RemoveHtml($this->procedurenotes->caption());

        // HospID
        $this->HospID->EditAttrs["class"] = "form-control";
        $this->HospID->EditCustomAttributes = "";
        if (!$this->HospID->Raw) {
            $this->HospID->CurrentValue = HtmlDecode($this->HospID->CurrentValue);
        }
        $this->HospID->EditValue = $this->HospID->CurrentValue;
        $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

        // Created
        $this->Created->EditAttrs["class"] = "form-control";
        $this->Created->EditCustomAttributes = "";
        $this->Created->EditValue = FormatDateTime($this->Created->CurrentValue, 8);
        $this->Created->PlaceHolder = RemoveHtml($this->Created->caption());

        // Started
        $this->Started->EditAttrs["class"] = "form-control";
        $this->Started->EditCustomAttributes = "";
        $this->Started->EditValue = FormatDateTime($this->Started->CurrentValue, 8);
        $this->Started->PlaceHolder = RemoveHtml($this->Started->caption());

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
                    $doc->exportCaption($this->patientID);
                    $doc->exportCaption($this->patientName);
                    $doc->exportCaption($this->DoctorName);
                    $doc->exportCaption($this->Referal);
                    $doc->exportCaption($this->PatientTypee);
                    $doc->exportCaption($this->procedurenotes);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->Created);
                    $doc->exportCaption($this->Started);
                } else {
                    $doc->exportCaption($this->patientID);
                    $doc->exportCaption($this->patientName);
                    $doc->exportCaption($this->DoctorName);
                    $doc->exportCaption($this->Referal);
                    $doc->exportCaption($this->PatientTypee);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->Created);
                    $doc->exportCaption($this->Started);
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
                        $doc->exportField($this->patientID);
                        $doc->exportField($this->patientName);
                        $doc->exportField($this->DoctorName);
                        $doc->exportField($this->Referal);
                        $doc->exportField($this->PatientTypee);
                        $doc->exportField($this->procedurenotes);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->Created);
                        $doc->exportField($this->Started);
                    } else {
                        $doc->exportField($this->patientID);
                        $doc->exportField($this->patientName);
                        $doc->exportField($this->DoctorName);
                        $doc->exportField($this->Referal);
                        $doc->exportField($this->PatientTypee);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->Created);
                        $doc->exportField($this->Started);
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
