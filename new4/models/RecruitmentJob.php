<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for recruitment_job
 */
class RecruitmentJob extends DbTable
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
    public $title;
    public $shortDescription;
    public $description;
    public $requirements;
    public $benefits;
    public $country;
    public $company;
    public $department;
    public $code;
    public $employementType;
    public $industry;
    public $experienceLevel;
    public $jobFunction;
    public $educationLevel;
    public $currency;
    public $showSalary;
    public $salaryMin;
    public $salaryMax;
    public $keywords;
    public $status;
    public $closingDate;
    public $attachment;
    public $display;
    public $postedBy;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'recruitment_job';
        $this->TableName = 'recruitment_job';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`recruitment_job`";
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
        $this->id = new DbField('recruitment_job', 'recruitment_job', 'x_id', 'id', '`id`', '`id`', 20, 20, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // title
        $this->title = new DbField('recruitment_job', 'recruitment_job', 'x_title', 'title', '`title`', '`title`', 200, 200, -1, false, '`title`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->title->Nullable = false; // NOT NULL field
        $this->title->Required = true; // Required field
        $this->title->Sortable = true; // Allow sort
        $this->title->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->title->Param, "CustomMsg");
        $this->Fields['title'] = &$this->title;

        // shortDescription
        $this->shortDescription = new DbField('recruitment_job', 'recruitment_job', 'x_shortDescription', 'shortDescription', '`shortDescription`', '`shortDescription`', 201, 65535, -1, false, '`shortDescription`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->shortDescription->Sortable = true; // Allow sort
        $this->shortDescription->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->shortDescription->Param, "CustomMsg");
        $this->Fields['shortDescription'] = &$this->shortDescription;

        // description
        $this->description = new DbField('recruitment_job', 'recruitment_job', 'x_description', 'description', '`description`', '`description`', 201, 65535, -1, false, '`description`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->description->Sortable = true; // Allow sort
        $this->description->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->description->Param, "CustomMsg");
        $this->Fields['description'] = &$this->description;

        // requirements
        $this->requirements = new DbField('recruitment_job', 'recruitment_job', 'x_requirements', 'requirements', '`requirements`', '`requirements`', 201, 65535, -1, false, '`requirements`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->requirements->Sortable = true; // Allow sort
        $this->requirements->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->requirements->Param, "CustomMsg");
        $this->Fields['requirements'] = &$this->requirements;

        // benefits
        $this->benefits = new DbField('recruitment_job', 'recruitment_job', 'x_benefits', 'benefits', '`benefits`', '`benefits`', 201, 65535, -1, false, '`benefits`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->benefits->Sortable = true; // Allow sort
        $this->benefits->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->benefits->Param, "CustomMsg");
        $this->Fields['benefits'] = &$this->benefits;

        // country
        $this->country = new DbField('recruitment_job', 'recruitment_job', 'x_country', 'country', '`country`', '`country`', 20, 20, -1, false, '`country`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->country->Sortable = true; // Allow sort
        $this->country->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->country->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->country->Param, "CustomMsg");
        $this->Fields['country'] = &$this->country;

        // company
        $this->company = new DbField('recruitment_job', 'recruitment_job', 'x_company', 'company', '`company`', '`company`', 20, 20, -1, false, '`company`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->company->Sortable = true; // Allow sort
        $this->company->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->company->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->company->Param, "CustomMsg");
        $this->Fields['company'] = &$this->company;

        // department
        $this->department = new DbField('recruitment_job', 'recruitment_job', 'x_department', 'department', '`department`', '`department`', 200, 100, -1, false, '`department`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->department->Sortable = true; // Allow sort
        $this->department->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->department->Param, "CustomMsg");
        $this->Fields['department'] = &$this->department;

        // code
        $this->code = new DbField('recruitment_job', 'recruitment_job', 'x_code', 'code', '`code`', '`code`', 200, 20, -1, false, '`code`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->code->Sortable = true; // Allow sort
        $this->code->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->code->Param, "CustomMsg");
        $this->Fields['code'] = &$this->code;

        // employementType
        $this->employementType = new DbField('recruitment_job', 'recruitment_job', 'x_employementType', 'employementType', '`employementType`', '`employementType`', 20, 20, -1, false, '`employementType`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->employementType->Sortable = true; // Allow sort
        $this->employementType->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->employementType->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->employementType->Param, "CustomMsg");
        $this->Fields['employementType'] = &$this->employementType;

        // industry
        $this->industry = new DbField('recruitment_job', 'recruitment_job', 'x_industry', 'industry', '`industry`', '`industry`', 20, 20, -1, false, '`industry`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->industry->Sortable = true; // Allow sort
        $this->industry->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->industry->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->industry->Param, "CustomMsg");
        $this->Fields['industry'] = &$this->industry;

        // experienceLevel
        $this->experienceLevel = new DbField('recruitment_job', 'recruitment_job', 'x_experienceLevel', 'experienceLevel', '`experienceLevel`', '`experienceLevel`', 20, 20, -1, false, '`experienceLevel`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->experienceLevel->Sortable = true; // Allow sort
        $this->experienceLevel->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->experienceLevel->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->experienceLevel->Param, "CustomMsg");
        $this->Fields['experienceLevel'] = &$this->experienceLevel;

        // jobFunction
        $this->jobFunction = new DbField('recruitment_job', 'recruitment_job', 'x_jobFunction', 'jobFunction', '`jobFunction`', '`jobFunction`', 20, 20, -1, false, '`jobFunction`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->jobFunction->Sortable = true; // Allow sort
        $this->jobFunction->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->jobFunction->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->jobFunction->Param, "CustomMsg");
        $this->Fields['jobFunction'] = &$this->jobFunction;

        // educationLevel
        $this->educationLevel = new DbField('recruitment_job', 'recruitment_job', 'x_educationLevel', 'educationLevel', '`educationLevel`', '`educationLevel`', 20, 20, -1, false, '`educationLevel`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->educationLevel->Sortable = true; // Allow sort
        $this->educationLevel->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->educationLevel->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->educationLevel->Param, "CustomMsg");
        $this->Fields['educationLevel'] = &$this->educationLevel;

        // currency
        $this->currency = new DbField('recruitment_job', 'recruitment_job', 'x_currency', 'currency', '`currency`', '`currency`', 20, 20, -1, false, '`currency`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->currency->Sortable = true; // Allow sort
        $this->currency->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->currency->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->currency->Param, "CustomMsg");
        $this->Fields['currency'] = &$this->currency;

        // showSalary
        $this->showSalary = new DbField('recruitment_job', 'recruitment_job', 'x_showSalary', 'showSalary', '`showSalary`', '`showSalary`', 202, 3, -1, false, '`showSalary`', false, false, false, 'FORMATTED TEXT', 'RADIO');
        $this->showSalary->Sortable = true; // Allow sort
        $this->showSalary->Lookup = new Lookup('showSalary', 'recruitment_job', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->showSalary->OptionCount = 2;
        $this->showSalary->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->showSalary->Param, "CustomMsg");
        $this->Fields['showSalary'] = &$this->showSalary;

        // salaryMin
        $this->salaryMin = new DbField('recruitment_job', 'recruitment_job', 'x_salaryMin', 'salaryMin', '`salaryMin`', '`salaryMin`', 20, 20, -1, false, '`salaryMin`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->salaryMin->Sortable = true; // Allow sort
        $this->salaryMin->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->salaryMin->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->salaryMin->Param, "CustomMsg");
        $this->Fields['salaryMin'] = &$this->salaryMin;

        // salaryMax
        $this->salaryMax = new DbField('recruitment_job', 'recruitment_job', 'x_salaryMax', 'salaryMax', '`salaryMax`', '`salaryMax`', 20, 20, -1, false, '`salaryMax`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->salaryMax->Sortable = true; // Allow sort
        $this->salaryMax->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->salaryMax->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->salaryMax->Param, "CustomMsg");
        $this->Fields['salaryMax'] = &$this->salaryMax;

        // keywords
        $this->keywords = new DbField('recruitment_job', 'recruitment_job', 'x_keywords', 'keywords', '`keywords`', '`keywords`', 201, 65535, -1, false, '`keywords`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->keywords->Sortable = true; // Allow sort
        $this->keywords->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->keywords->Param, "CustomMsg");
        $this->Fields['keywords'] = &$this->keywords;

        // status
        $this->status = new DbField('recruitment_job', 'recruitment_job', 'x_status', 'status', '`status`', '`status`', 202, 7, -1, false, '`status`', false, false, false, 'FORMATTED TEXT', 'RADIO');
        $this->status->Sortable = true; // Allow sort
        $this->status->Lookup = new Lookup('status', 'recruitment_job', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->status->OptionCount = 3;
        $this->status->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->status->Param, "CustomMsg");
        $this->Fields['status'] = &$this->status;

        // closingDate
        $this->closingDate = new DbField('recruitment_job', 'recruitment_job', 'x_closingDate', 'closingDate', '`closingDate`', CastDateFieldForLike("`closingDate`", 0, "DB"), 135, 19, 0, false, '`closingDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->closingDate->Sortable = true; // Allow sort
        $this->closingDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->closingDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->closingDate->Param, "CustomMsg");
        $this->Fields['closingDate'] = &$this->closingDate;

        // attachment
        $this->attachment = new DbField('recruitment_job', 'recruitment_job', 'x_attachment', 'attachment', '`attachment`', '`attachment`', 200, 100, -1, false, '`attachment`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->attachment->Sortable = true; // Allow sort
        $this->attachment->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->attachment->Param, "CustomMsg");
        $this->Fields['attachment'] = &$this->attachment;

        // display
        $this->display = new DbField('recruitment_job', 'recruitment_job', 'x_display', 'display', '`display`', '`display`', 200, 200, -1, false, '`display`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->display->Nullable = false; // NOT NULL field
        $this->display->Required = true; // Required field
        $this->display->Sortable = true; // Allow sort
        $this->display->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->display->Param, "CustomMsg");
        $this->Fields['display'] = &$this->display;

        // postedBy
        $this->postedBy = new DbField('recruitment_job', 'recruitment_job', 'x_postedBy', 'postedBy', '`postedBy`', '`postedBy`', 20, 20, -1, false, '`postedBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->postedBy->Sortable = true; // Allow sort
        $this->postedBy->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->postedBy->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->postedBy->Param, "CustomMsg");
        $this->Fields['postedBy'] = &$this->postedBy;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`recruitment_job`";
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
        $this->title->DbValue = $row['title'];
        $this->shortDescription->DbValue = $row['shortDescription'];
        $this->description->DbValue = $row['description'];
        $this->requirements->DbValue = $row['requirements'];
        $this->benefits->DbValue = $row['benefits'];
        $this->country->DbValue = $row['country'];
        $this->company->DbValue = $row['company'];
        $this->department->DbValue = $row['department'];
        $this->code->DbValue = $row['code'];
        $this->employementType->DbValue = $row['employementType'];
        $this->industry->DbValue = $row['industry'];
        $this->experienceLevel->DbValue = $row['experienceLevel'];
        $this->jobFunction->DbValue = $row['jobFunction'];
        $this->educationLevel->DbValue = $row['educationLevel'];
        $this->currency->DbValue = $row['currency'];
        $this->showSalary->DbValue = $row['showSalary'];
        $this->salaryMin->DbValue = $row['salaryMin'];
        $this->salaryMax->DbValue = $row['salaryMax'];
        $this->keywords->DbValue = $row['keywords'];
        $this->status->DbValue = $row['status'];
        $this->closingDate->DbValue = $row['closingDate'];
        $this->attachment->DbValue = $row['attachment'];
        $this->display->DbValue = $row['display'];
        $this->postedBy->DbValue = $row['postedBy'];
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
        return $_SESSION[$name] ?? GetUrl("RecruitmentJobList");
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
        if ($pageName == "RecruitmentJobView") {
            return $Language->phrase("View");
        } elseif ($pageName == "RecruitmentJobEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "RecruitmentJobAdd") {
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
                return "RecruitmentJobView";
            case Config("API_ADD_ACTION"):
                return "RecruitmentJobAdd";
            case Config("API_EDIT_ACTION"):
                return "RecruitmentJobEdit";
            case Config("API_DELETE_ACTION"):
                return "RecruitmentJobDelete";
            case Config("API_LIST_ACTION"):
                return "RecruitmentJobList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "RecruitmentJobList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("RecruitmentJobView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("RecruitmentJobView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "RecruitmentJobAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "RecruitmentJobAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("RecruitmentJobEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("RecruitmentJobAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("RecruitmentJobDelete", $this->getUrlParm());
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
        $this->title->setDbValue($row['title']);
        $this->shortDescription->setDbValue($row['shortDescription']);
        $this->description->setDbValue($row['description']);
        $this->requirements->setDbValue($row['requirements']);
        $this->benefits->setDbValue($row['benefits']);
        $this->country->setDbValue($row['country']);
        $this->company->setDbValue($row['company']);
        $this->department->setDbValue($row['department']);
        $this->code->setDbValue($row['code']);
        $this->employementType->setDbValue($row['employementType']);
        $this->industry->setDbValue($row['industry']);
        $this->experienceLevel->setDbValue($row['experienceLevel']);
        $this->jobFunction->setDbValue($row['jobFunction']);
        $this->educationLevel->setDbValue($row['educationLevel']);
        $this->currency->setDbValue($row['currency']);
        $this->showSalary->setDbValue($row['showSalary']);
        $this->salaryMin->setDbValue($row['salaryMin']);
        $this->salaryMax->setDbValue($row['salaryMax']);
        $this->keywords->setDbValue($row['keywords']);
        $this->status->setDbValue($row['status']);
        $this->closingDate->setDbValue($row['closingDate']);
        $this->attachment->setDbValue($row['attachment']);
        $this->display->setDbValue($row['display']);
        $this->postedBy->setDbValue($row['postedBy']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // title

        // shortDescription

        // description

        // requirements

        // benefits

        // country

        // company

        // department

        // code

        // employementType

        // industry

        // experienceLevel

        // jobFunction

        // educationLevel

        // currency

        // showSalary

        // salaryMin

        // salaryMax

        // keywords

        // status

        // closingDate

        // attachment

        // display

        // postedBy

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // title
        $this->title->ViewValue = $this->title->CurrentValue;
        $this->title->ViewCustomAttributes = "";

        // shortDescription
        $this->shortDescription->ViewValue = $this->shortDescription->CurrentValue;
        $this->shortDescription->ViewCustomAttributes = "";

        // description
        $this->description->ViewValue = $this->description->CurrentValue;
        $this->description->ViewCustomAttributes = "";

        // requirements
        $this->requirements->ViewValue = $this->requirements->CurrentValue;
        $this->requirements->ViewCustomAttributes = "";

        // benefits
        $this->benefits->ViewValue = $this->benefits->CurrentValue;
        $this->benefits->ViewCustomAttributes = "";

        // country
        $this->country->ViewValue = $this->country->CurrentValue;
        $this->country->ViewValue = FormatNumber($this->country->ViewValue, 0, -2, -2, -2);
        $this->country->ViewCustomAttributes = "";

        // company
        $this->company->ViewValue = $this->company->CurrentValue;
        $this->company->ViewValue = FormatNumber($this->company->ViewValue, 0, -2, -2, -2);
        $this->company->ViewCustomAttributes = "";

        // department
        $this->department->ViewValue = $this->department->CurrentValue;
        $this->department->ViewCustomAttributes = "";

        // code
        $this->code->ViewValue = $this->code->CurrentValue;
        $this->code->ViewCustomAttributes = "";

        // employementType
        $this->employementType->ViewValue = $this->employementType->CurrentValue;
        $this->employementType->ViewValue = FormatNumber($this->employementType->ViewValue, 0, -2, -2, -2);
        $this->employementType->ViewCustomAttributes = "";

        // industry
        $this->industry->ViewValue = $this->industry->CurrentValue;
        $this->industry->ViewValue = FormatNumber($this->industry->ViewValue, 0, -2, -2, -2);
        $this->industry->ViewCustomAttributes = "";

        // experienceLevel
        $this->experienceLevel->ViewValue = $this->experienceLevel->CurrentValue;
        $this->experienceLevel->ViewValue = FormatNumber($this->experienceLevel->ViewValue, 0, -2, -2, -2);
        $this->experienceLevel->ViewCustomAttributes = "";

        // jobFunction
        $this->jobFunction->ViewValue = $this->jobFunction->CurrentValue;
        $this->jobFunction->ViewValue = FormatNumber($this->jobFunction->ViewValue, 0, -2, -2, -2);
        $this->jobFunction->ViewCustomAttributes = "";

        // educationLevel
        $this->educationLevel->ViewValue = $this->educationLevel->CurrentValue;
        $this->educationLevel->ViewValue = FormatNumber($this->educationLevel->ViewValue, 0, -2, -2, -2);
        $this->educationLevel->ViewCustomAttributes = "";

        // currency
        $this->currency->ViewValue = $this->currency->CurrentValue;
        $this->currency->ViewValue = FormatNumber($this->currency->ViewValue, 0, -2, -2, -2);
        $this->currency->ViewCustomAttributes = "";

        // showSalary
        if (strval($this->showSalary->CurrentValue) != "") {
            $this->showSalary->ViewValue = $this->showSalary->optionCaption($this->showSalary->CurrentValue);
        } else {
            $this->showSalary->ViewValue = null;
        }
        $this->showSalary->ViewCustomAttributes = "";

        // salaryMin
        $this->salaryMin->ViewValue = $this->salaryMin->CurrentValue;
        $this->salaryMin->ViewValue = FormatNumber($this->salaryMin->ViewValue, 0, -2, -2, -2);
        $this->salaryMin->ViewCustomAttributes = "";

        // salaryMax
        $this->salaryMax->ViewValue = $this->salaryMax->CurrentValue;
        $this->salaryMax->ViewValue = FormatNumber($this->salaryMax->ViewValue, 0, -2, -2, -2);
        $this->salaryMax->ViewCustomAttributes = "";

        // keywords
        $this->keywords->ViewValue = $this->keywords->CurrentValue;
        $this->keywords->ViewCustomAttributes = "";

        // status
        if (strval($this->status->CurrentValue) != "") {
            $this->status->ViewValue = $this->status->optionCaption($this->status->CurrentValue);
        } else {
            $this->status->ViewValue = null;
        }
        $this->status->ViewCustomAttributes = "";

        // closingDate
        $this->closingDate->ViewValue = $this->closingDate->CurrentValue;
        $this->closingDate->ViewValue = FormatDateTime($this->closingDate->ViewValue, 0);
        $this->closingDate->ViewCustomAttributes = "";

        // attachment
        $this->attachment->ViewValue = $this->attachment->CurrentValue;
        $this->attachment->ViewCustomAttributes = "";

        // display
        $this->display->ViewValue = $this->display->CurrentValue;
        $this->display->ViewCustomAttributes = "";

        // postedBy
        $this->postedBy->ViewValue = $this->postedBy->CurrentValue;
        $this->postedBy->ViewValue = FormatNumber($this->postedBy->ViewValue, 0, -2, -2, -2);
        $this->postedBy->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // title
        $this->title->LinkCustomAttributes = "";
        $this->title->HrefValue = "";
        $this->title->TooltipValue = "";

        // shortDescription
        $this->shortDescription->LinkCustomAttributes = "";
        $this->shortDescription->HrefValue = "";
        $this->shortDescription->TooltipValue = "";

        // description
        $this->description->LinkCustomAttributes = "";
        $this->description->HrefValue = "";
        $this->description->TooltipValue = "";

        // requirements
        $this->requirements->LinkCustomAttributes = "";
        $this->requirements->HrefValue = "";
        $this->requirements->TooltipValue = "";

        // benefits
        $this->benefits->LinkCustomAttributes = "";
        $this->benefits->HrefValue = "";
        $this->benefits->TooltipValue = "";

        // country
        $this->country->LinkCustomAttributes = "";
        $this->country->HrefValue = "";
        $this->country->TooltipValue = "";

        // company
        $this->company->LinkCustomAttributes = "";
        $this->company->HrefValue = "";
        $this->company->TooltipValue = "";

        // department
        $this->department->LinkCustomAttributes = "";
        $this->department->HrefValue = "";
        $this->department->TooltipValue = "";

        // code
        $this->code->LinkCustomAttributes = "";
        $this->code->HrefValue = "";
        $this->code->TooltipValue = "";

        // employementType
        $this->employementType->LinkCustomAttributes = "";
        $this->employementType->HrefValue = "";
        $this->employementType->TooltipValue = "";

        // industry
        $this->industry->LinkCustomAttributes = "";
        $this->industry->HrefValue = "";
        $this->industry->TooltipValue = "";

        // experienceLevel
        $this->experienceLevel->LinkCustomAttributes = "";
        $this->experienceLevel->HrefValue = "";
        $this->experienceLevel->TooltipValue = "";

        // jobFunction
        $this->jobFunction->LinkCustomAttributes = "";
        $this->jobFunction->HrefValue = "";
        $this->jobFunction->TooltipValue = "";

        // educationLevel
        $this->educationLevel->LinkCustomAttributes = "";
        $this->educationLevel->HrefValue = "";
        $this->educationLevel->TooltipValue = "";

        // currency
        $this->currency->LinkCustomAttributes = "";
        $this->currency->HrefValue = "";
        $this->currency->TooltipValue = "";

        // showSalary
        $this->showSalary->LinkCustomAttributes = "";
        $this->showSalary->HrefValue = "";
        $this->showSalary->TooltipValue = "";

        // salaryMin
        $this->salaryMin->LinkCustomAttributes = "";
        $this->salaryMin->HrefValue = "";
        $this->salaryMin->TooltipValue = "";

        // salaryMax
        $this->salaryMax->LinkCustomAttributes = "";
        $this->salaryMax->HrefValue = "";
        $this->salaryMax->TooltipValue = "";

        // keywords
        $this->keywords->LinkCustomAttributes = "";
        $this->keywords->HrefValue = "";
        $this->keywords->TooltipValue = "";

        // status
        $this->status->LinkCustomAttributes = "";
        $this->status->HrefValue = "";
        $this->status->TooltipValue = "";

        // closingDate
        $this->closingDate->LinkCustomAttributes = "";
        $this->closingDate->HrefValue = "";
        $this->closingDate->TooltipValue = "";

        // attachment
        $this->attachment->LinkCustomAttributes = "";
        $this->attachment->HrefValue = "";
        $this->attachment->TooltipValue = "";

        // display
        $this->display->LinkCustomAttributes = "";
        $this->display->HrefValue = "";
        $this->display->TooltipValue = "";

        // postedBy
        $this->postedBy->LinkCustomAttributes = "";
        $this->postedBy->HrefValue = "";
        $this->postedBy->TooltipValue = "";

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

        // title
        $this->title->EditAttrs["class"] = "form-control";
        $this->title->EditCustomAttributes = "";
        if (!$this->title->Raw) {
            $this->title->CurrentValue = HtmlDecode($this->title->CurrentValue);
        }
        $this->title->EditValue = $this->title->CurrentValue;
        $this->title->PlaceHolder = RemoveHtml($this->title->caption());

        // shortDescription
        $this->shortDescription->EditAttrs["class"] = "form-control";
        $this->shortDescription->EditCustomAttributes = "";
        $this->shortDescription->EditValue = $this->shortDescription->CurrentValue;
        $this->shortDescription->PlaceHolder = RemoveHtml($this->shortDescription->caption());

        // description
        $this->description->EditAttrs["class"] = "form-control";
        $this->description->EditCustomAttributes = "";
        $this->description->EditValue = $this->description->CurrentValue;
        $this->description->PlaceHolder = RemoveHtml($this->description->caption());

        // requirements
        $this->requirements->EditAttrs["class"] = "form-control";
        $this->requirements->EditCustomAttributes = "";
        $this->requirements->EditValue = $this->requirements->CurrentValue;
        $this->requirements->PlaceHolder = RemoveHtml($this->requirements->caption());

        // benefits
        $this->benefits->EditAttrs["class"] = "form-control";
        $this->benefits->EditCustomAttributes = "";
        $this->benefits->EditValue = $this->benefits->CurrentValue;
        $this->benefits->PlaceHolder = RemoveHtml($this->benefits->caption());

        // country
        $this->country->EditAttrs["class"] = "form-control";
        $this->country->EditCustomAttributes = "";
        $this->country->EditValue = $this->country->CurrentValue;
        $this->country->PlaceHolder = RemoveHtml($this->country->caption());

        // company
        $this->company->EditAttrs["class"] = "form-control";
        $this->company->EditCustomAttributes = "";
        $this->company->EditValue = $this->company->CurrentValue;
        $this->company->PlaceHolder = RemoveHtml($this->company->caption());

        // department
        $this->department->EditAttrs["class"] = "form-control";
        $this->department->EditCustomAttributes = "";
        if (!$this->department->Raw) {
            $this->department->CurrentValue = HtmlDecode($this->department->CurrentValue);
        }
        $this->department->EditValue = $this->department->CurrentValue;
        $this->department->PlaceHolder = RemoveHtml($this->department->caption());

        // code
        $this->code->EditAttrs["class"] = "form-control";
        $this->code->EditCustomAttributes = "";
        if (!$this->code->Raw) {
            $this->code->CurrentValue = HtmlDecode($this->code->CurrentValue);
        }
        $this->code->EditValue = $this->code->CurrentValue;
        $this->code->PlaceHolder = RemoveHtml($this->code->caption());

        // employementType
        $this->employementType->EditAttrs["class"] = "form-control";
        $this->employementType->EditCustomAttributes = "";
        $this->employementType->EditValue = $this->employementType->CurrentValue;
        $this->employementType->PlaceHolder = RemoveHtml($this->employementType->caption());

        // industry
        $this->industry->EditAttrs["class"] = "form-control";
        $this->industry->EditCustomAttributes = "";
        $this->industry->EditValue = $this->industry->CurrentValue;
        $this->industry->PlaceHolder = RemoveHtml($this->industry->caption());

        // experienceLevel
        $this->experienceLevel->EditAttrs["class"] = "form-control";
        $this->experienceLevel->EditCustomAttributes = "";
        $this->experienceLevel->EditValue = $this->experienceLevel->CurrentValue;
        $this->experienceLevel->PlaceHolder = RemoveHtml($this->experienceLevel->caption());

        // jobFunction
        $this->jobFunction->EditAttrs["class"] = "form-control";
        $this->jobFunction->EditCustomAttributes = "";
        $this->jobFunction->EditValue = $this->jobFunction->CurrentValue;
        $this->jobFunction->PlaceHolder = RemoveHtml($this->jobFunction->caption());

        // educationLevel
        $this->educationLevel->EditAttrs["class"] = "form-control";
        $this->educationLevel->EditCustomAttributes = "";
        $this->educationLevel->EditValue = $this->educationLevel->CurrentValue;
        $this->educationLevel->PlaceHolder = RemoveHtml($this->educationLevel->caption());

        // currency
        $this->currency->EditAttrs["class"] = "form-control";
        $this->currency->EditCustomAttributes = "";
        $this->currency->EditValue = $this->currency->CurrentValue;
        $this->currency->PlaceHolder = RemoveHtml($this->currency->caption());

        // showSalary
        $this->showSalary->EditCustomAttributes = "";
        $this->showSalary->EditValue = $this->showSalary->options(false);
        $this->showSalary->PlaceHolder = RemoveHtml($this->showSalary->caption());

        // salaryMin
        $this->salaryMin->EditAttrs["class"] = "form-control";
        $this->salaryMin->EditCustomAttributes = "";
        $this->salaryMin->EditValue = $this->salaryMin->CurrentValue;
        $this->salaryMin->PlaceHolder = RemoveHtml($this->salaryMin->caption());

        // salaryMax
        $this->salaryMax->EditAttrs["class"] = "form-control";
        $this->salaryMax->EditCustomAttributes = "";
        $this->salaryMax->EditValue = $this->salaryMax->CurrentValue;
        $this->salaryMax->PlaceHolder = RemoveHtml($this->salaryMax->caption());

        // keywords
        $this->keywords->EditAttrs["class"] = "form-control";
        $this->keywords->EditCustomAttributes = "";
        $this->keywords->EditValue = $this->keywords->CurrentValue;
        $this->keywords->PlaceHolder = RemoveHtml($this->keywords->caption());

        // status
        $this->status->EditCustomAttributes = "";
        $this->status->EditValue = $this->status->options(false);
        $this->status->PlaceHolder = RemoveHtml($this->status->caption());

        // closingDate
        $this->closingDate->EditAttrs["class"] = "form-control";
        $this->closingDate->EditCustomAttributes = "";
        $this->closingDate->EditValue = FormatDateTime($this->closingDate->CurrentValue, 8);
        $this->closingDate->PlaceHolder = RemoveHtml($this->closingDate->caption());

        // attachment
        $this->attachment->EditAttrs["class"] = "form-control";
        $this->attachment->EditCustomAttributes = "";
        if (!$this->attachment->Raw) {
            $this->attachment->CurrentValue = HtmlDecode($this->attachment->CurrentValue);
        }
        $this->attachment->EditValue = $this->attachment->CurrentValue;
        $this->attachment->PlaceHolder = RemoveHtml($this->attachment->caption());

        // display
        $this->display->EditAttrs["class"] = "form-control";
        $this->display->EditCustomAttributes = "";
        if (!$this->display->Raw) {
            $this->display->CurrentValue = HtmlDecode($this->display->CurrentValue);
        }
        $this->display->EditValue = $this->display->CurrentValue;
        $this->display->PlaceHolder = RemoveHtml($this->display->caption());

        // postedBy
        $this->postedBy->EditAttrs["class"] = "form-control";
        $this->postedBy->EditCustomAttributes = "";
        $this->postedBy->EditValue = $this->postedBy->CurrentValue;
        $this->postedBy->PlaceHolder = RemoveHtml($this->postedBy->caption());

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
                    $doc->exportCaption($this->title);
                    $doc->exportCaption($this->shortDescription);
                    $doc->exportCaption($this->description);
                    $doc->exportCaption($this->requirements);
                    $doc->exportCaption($this->benefits);
                    $doc->exportCaption($this->country);
                    $doc->exportCaption($this->company);
                    $doc->exportCaption($this->department);
                    $doc->exportCaption($this->code);
                    $doc->exportCaption($this->employementType);
                    $doc->exportCaption($this->industry);
                    $doc->exportCaption($this->experienceLevel);
                    $doc->exportCaption($this->jobFunction);
                    $doc->exportCaption($this->educationLevel);
                    $doc->exportCaption($this->currency);
                    $doc->exportCaption($this->showSalary);
                    $doc->exportCaption($this->salaryMin);
                    $doc->exportCaption($this->salaryMax);
                    $doc->exportCaption($this->keywords);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->closingDate);
                    $doc->exportCaption($this->attachment);
                    $doc->exportCaption($this->display);
                    $doc->exportCaption($this->postedBy);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->title);
                    $doc->exportCaption($this->country);
                    $doc->exportCaption($this->company);
                    $doc->exportCaption($this->department);
                    $doc->exportCaption($this->code);
                    $doc->exportCaption($this->employementType);
                    $doc->exportCaption($this->industry);
                    $doc->exportCaption($this->experienceLevel);
                    $doc->exportCaption($this->jobFunction);
                    $doc->exportCaption($this->educationLevel);
                    $doc->exportCaption($this->currency);
                    $doc->exportCaption($this->showSalary);
                    $doc->exportCaption($this->salaryMin);
                    $doc->exportCaption($this->salaryMax);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->closingDate);
                    $doc->exportCaption($this->attachment);
                    $doc->exportCaption($this->display);
                    $doc->exportCaption($this->postedBy);
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
                        $doc->exportField($this->title);
                        $doc->exportField($this->shortDescription);
                        $doc->exportField($this->description);
                        $doc->exportField($this->requirements);
                        $doc->exportField($this->benefits);
                        $doc->exportField($this->country);
                        $doc->exportField($this->company);
                        $doc->exportField($this->department);
                        $doc->exportField($this->code);
                        $doc->exportField($this->employementType);
                        $doc->exportField($this->industry);
                        $doc->exportField($this->experienceLevel);
                        $doc->exportField($this->jobFunction);
                        $doc->exportField($this->educationLevel);
                        $doc->exportField($this->currency);
                        $doc->exportField($this->showSalary);
                        $doc->exportField($this->salaryMin);
                        $doc->exportField($this->salaryMax);
                        $doc->exportField($this->keywords);
                        $doc->exportField($this->status);
                        $doc->exportField($this->closingDate);
                        $doc->exportField($this->attachment);
                        $doc->exportField($this->display);
                        $doc->exportField($this->postedBy);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->title);
                        $doc->exportField($this->country);
                        $doc->exportField($this->company);
                        $doc->exportField($this->department);
                        $doc->exportField($this->code);
                        $doc->exportField($this->employementType);
                        $doc->exportField($this->industry);
                        $doc->exportField($this->experienceLevel);
                        $doc->exportField($this->jobFunction);
                        $doc->exportField($this->educationLevel);
                        $doc->exportField($this->currency);
                        $doc->exportField($this->showSalary);
                        $doc->exportField($this->salaryMin);
                        $doc->exportField($this->salaryMax);
                        $doc->exportField($this->status);
                        $doc->exportField($this->closingDate);
                        $doc->exportField($this->attachment);
                        $doc->exportField($this->display);
                        $doc->exportField($this->postedBy);
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
