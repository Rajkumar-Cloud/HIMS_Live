<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for patient_insurance
 */
class PatientInsurance extends DbTable
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
    public $Reception;
    public $PatientId;
    public $PatientName;
    public $Company;
    public $AddressInsuranceCarierName;
    public $ContactName;
    public $ContactMobile;
    public $PolicyType;
    public $PolicyName;
    public $PolicyNo;
    public $PolicyAmount;
    public $RefLetterNo;
    public $ReferenceBy;
    public $ReferenceDate;
    public $DocumentAttatch;
    public $createdby;
    public $createddatetime;
    public $modifiedby;
    public $modifieddatetime;
    public $mrnno;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'patient_insurance';
        $this->TableName = 'patient_insurance';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`patient_insurance`";
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
        $this->id = new DbField('patient_insurance', 'patient_insurance', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // Reception
        $this->Reception = new DbField('patient_insurance', 'patient_insurance', 'x_Reception', 'Reception', '`Reception`', '`Reception`', 3, 11, -1, false, '`Reception`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Reception->IsForeignKey = true; // Foreign key field
        $this->Reception->Sortable = true; // Allow sort
        $this->Reception->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Reception->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Reception->Param, "CustomMsg");
        $this->Fields['Reception'] = &$this->Reception;

        // PatientId
        $this->PatientId = new DbField('patient_insurance', 'patient_insurance', 'x_PatientId', 'PatientId', '`PatientId`', '`PatientId`', 3, 11, -1, false, '`PatientId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientId->IsForeignKey = true; // Foreign key field
        $this->PatientId->Sortable = true; // Allow sort
        $this->PatientId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->PatientId->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientId->Param, "CustomMsg");
        $this->Fields['PatientId'] = &$this->PatientId;

        // PatientName
        $this->PatientName = new DbField('patient_insurance', 'patient_insurance', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, false, '`PatientName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientName->Sortable = true; // Allow sort
        $this->PatientName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientName->Param, "CustomMsg");
        $this->Fields['PatientName'] = &$this->PatientName;

        // Company
        $this->Company = new DbField('patient_insurance', 'patient_insurance', 'x_Company', 'Company', '`Company`', '`Company`', 200, 45, -1, false, '`Company`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Company->Sortable = true; // Allow sort
        $this->Company->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Company->Param, "CustomMsg");
        $this->Fields['Company'] = &$this->Company;

        // AddressInsuranceCarierName
        $this->AddressInsuranceCarierName = new DbField('patient_insurance', 'patient_insurance', 'x_AddressInsuranceCarierName', 'AddressInsuranceCarierName', '`AddressInsuranceCarierName`', '`AddressInsuranceCarierName`', 200, 45, -1, false, '`AddressInsuranceCarierName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AddressInsuranceCarierName->Sortable = true; // Allow sort
        $this->AddressInsuranceCarierName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AddressInsuranceCarierName->Param, "CustomMsg");
        $this->Fields['AddressInsuranceCarierName'] = &$this->AddressInsuranceCarierName;

        // ContactName
        $this->ContactName = new DbField('patient_insurance', 'patient_insurance', 'x_ContactName', 'ContactName', '`ContactName`', '`ContactName`', 200, 45, -1, false, '`ContactName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ContactName->Sortable = true; // Allow sort
        $this->ContactName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ContactName->Param, "CustomMsg");
        $this->Fields['ContactName'] = &$this->ContactName;

        // ContactMobile
        $this->ContactMobile = new DbField('patient_insurance', 'patient_insurance', 'x_ContactMobile', 'ContactMobile', '`ContactMobile`', '`ContactMobile`', 200, 45, -1, false, '`ContactMobile`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ContactMobile->Sortable = true; // Allow sort
        $this->ContactMobile->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ContactMobile->Param, "CustomMsg");
        $this->Fields['ContactMobile'] = &$this->ContactMobile;

        // PolicyType
        $this->PolicyType = new DbField('patient_insurance', 'patient_insurance', 'x_PolicyType', 'PolicyType', '`PolicyType`', '`PolicyType`', 200, 45, -1, false, '`PolicyType`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PolicyType->Sortable = true; // Allow sort
        $this->PolicyType->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PolicyType->Param, "CustomMsg");
        $this->Fields['PolicyType'] = &$this->PolicyType;

        // PolicyName
        $this->PolicyName = new DbField('patient_insurance', 'patient_insurance', 'x_PolicyName', 'PolicyName', '`PolicyName`', '`PolicyName`', 200, 45, -1, false, '`PolicyName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PolicyName->Sortable = true; // Allow sort
        $this->PolicyName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PolicyName->Param, "CustomMsg");
        $this->Fields['PolicyName'] = &$this->PolicyName;

        // PolicyNo
        $this->PolicyNo = new DbField('patient_insurance', 'patient_insurance', 'x_PolicyNo', 'PolicyNo', '`PolicyNo`', '`PolicyNo`', 200, 45, -1, false, '`PolicyNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PolicyNo->Sortable = true; // Allow sort
        $this->PolicyNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PolicyNo->Param, "CustomMsg");
        $this->Fields['PolicyNo'] = &$this->PolicyNo;

        // PolicyAmount
        $this->PolicyAmount = new DbField('patient_insurance', 'patient_insurance', 'x_PolicyAmount', 'PolicyAmount', '`PolicyAmount`', '`PolicyAmount`', 200, 45, -1, false, '`PolicyAmount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PolicyAmount->Sortable = true; // Allow sort
        $this->PolicyAmount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PolicyAmount->Param, "CustomMsg");
        $this->Fields['PolicyAmount'] = &$this->PolicyAmount;

        // RefLetterNo
        $this->RefLetterNo = new DbField('patient_insurance', 'patient_insurance', 'x_RefLetterNo', 'RefLetterNo', '`RefLetterNo`', '`RefLetterNo`', 200, 45, -1, false, '`RefLetterNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RefLetterNo->Sortable = true; // Allow sort
        $this->RefLetterNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RefLetterNo->Param, "CustomMsg");
        $this->Fields['RefLetterNo'] = &$this->RefLetterNo;

        // ReferenceBy
        $this->ReferenceBy = new DbField('patient_insurance', 'patient_insurance', 'x_ReferenceBy', 'ReferenceBy', '`ReferenceBy`', '`ReferenceBy`', 200, 45, -1, false, '`ReferenceBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReferenceBy->Sortable = true; // Allow sort
        $this->ReferenceBy->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ReferenceBy->Param, "CustomMsg");
        $this->Fields['ReferenceBy'] = &$this->ReferenceBy;

        // ReferenceDate
        $this->ReferenceDate = new DbField('patient_insurance', 'patient_insurance', 'x_ReferenceDate', 'ReferenceDate', '`ReferenceDate`', CastDateFieldForLike("`ReferenceDate`", 0, "DB"), 133, 10, 0, false, '`ReferenceDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReferenceDate->Sortable = true; // Allow sort
        $this->ReferenceDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->ReferenceDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ReferenceDate->Param, "CustomMsg");
        $this->Fields['ReferenceDate'] = &$this->ReferenceDate;

        // DocumentAttatch
        $this->DocumentAttatch = new DbField('patient_insurance', 'patient_insurance', 'x_DocumentAttatch', 'DocumentAttatch', '`DocumentAttatch`', '`DocumentAttatch`', 201, 405, -1, true, '`DocumentAttatch`', false, false, false, 'FORMATTED TEXT', 'FILE');
        $this->DocumentAttatch->Sortable = true; // Allow sort
        $this->DocumentAttatch->UploadMultiple = true;
        $this->DocumentAttatch->Upload->UploadMultiple = true;
        $this->DocumentAttatch->UploadMaxFileCount = 0;
        $this->DocumentAttatch->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DocumentAttatch->Param, "CustomMsg");
        $this->Fields['DocumentAttatch'] = &$this->DocumentAttatch;

        // createdby
        $this->createdby = new DbField('patient_insurance', 'patient_insurance', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 200, 45, -1, false, '`createdby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdby->Sortable = true; // Allow sort
        $this->createdby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createdby->Param, "CustomMsg");
        $this->Fields['createdby'] = &$this->createdby;

        // createddatetime
        $this->createddatetime = new DbField('patient_insurance', 'patient_insurance', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, false, '`createddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddatetime->Sortable = true; // Allow sort
        $this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->createddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createddatetime->Param, "CustomMsg");
        $this->Fields['createddatetime'] = &$this->createddatetime;

        // modifiedby
        $this->modifiedby = new DbField('patient_insurance', 'patient_insurance', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 200, 45, -1, false, '`modifiedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifiedby->Sortable = true; // Allow sort
        $this->modifiedby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifiedby->Param, "CustomMsg");
        $this->Fields['modifiedby'] = &$this->modifiedby;

        // modifieddatetime
        $this->modifieddatetime = new DbField('patient_insurance', 'patient_insurance', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, false, '`modifieddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifieddatetime->Sortable = true; // Allow sort
        $this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->modifieddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifieddatetime->Param, "CustomMsg");
        $this->Fields['modifieddatetime'] = &$this->modifieddatetime;

        // mrnno
        $this->mrnno = new DbField('patient_insurance', 'patient_insurance', 'x_mrnno', 'mrnno', '`mrnno`', '`mrnno`', 200, 45, -1, false, '`mrnno`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->mrnno->IsForeignKey = true; // Foreign key field
        $this->mrnno->Sortable = true; // Allow sort
        $this->mrnno->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->mrnno->Param, "CustomMsg");
        $this->Fields['mrnno'] = &$this->mrnno;
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

    // Current master table name
    public function getCurrentMasterTable()
    {
        return Session(PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_MASTER_TABLE"));
    }

    public function setCurrentMasterTable($v)
    {
        $_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_MASTER_TABLE")] = $v;
    }

    // Session master WHERE clause
    public function getMasterFilter()
    {
        // Master filter
        $masterFilter = "";
        if ($this->getCurrentMasterTable() == "ip_admission") {
            if ($this->Reception->getSessionValue() != "") {
                $masterFilter .= "" . GetForeignKeySql("`id`", $this->Reception->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
            if ($this->PatientId->getSessionValue() != "") {
                $masterFilter .= " AND " . GetForeignKeySql("`patient_id`", $this->PatientId->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
            if ($this->mrnno->getSessionValue() != "") {
                $masterFilter .= " AND " . GetForeignKeySql("`mrnNo`", $this->mrnno->getSessionValue(), DATATYPE_STRING, "DB");
            } else {
                return "";
            }
        }
        return $masterFilter;
    }

    // Session detail WHERE clause
    public function getDetailFilter()
    {
        // Detail filter
        $detailFilter = "";
        if ($this->getCurrentMasterTable() == "ip_admission") {
            if ($this->Reception->getSessionValue() != "") {
                $detailFilter .= "" . GetForeignKeySql("`Reception`", $this->Reception->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
            if ($this->PatientId->getSessionValue() != "") {
                $detailFilter .= " AND " . GetForeignKeySql("`PatientId`", $this->PatientId->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
            if ($this->mrnno->getSessionValue() != "") {
                $detailFilter .= " AND " . GetForeignKeySql("`mrnno`", $this->mrnno->getSessionValue(), DATATYPE_STRING, "DB");
            } else {
                return "";
            }
        }
        return $detailFilter;
    }

    // Master filter
    public function sqlMasterFilter_ip_admission()
    {
        return "`id`=@id@ AND `patient_id`=@patient_id@ AND `mrnNo`='@mrnNo@'";
    }
    // Detail filter
    public function sqlDetailFilter_ip_admission()
    {
        return "`Reception`=@Reception@ AND `PatientId`=@PatientId@ AND `mrnno`='@mrnno@'";
    }

    // Table level SQL
    public function getSqlFrom() // From
    {
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`patient_insurance`";
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
        $this->Reception->DbValue = $row['Reception'];
        $this->PatientId->DbValue = $row['PatientId'];
        $this->PatientName->DbValue = $row['PatientName'];
        $this->Company->DbValue = $row['Company'];
        $this->AddressInsuranceCarierName->DbValue = $row['AddressInsuranceCarierName'];
        $this->ContactName->DbValue = $row['ContactName'];
        $this->ContactMobile->DbValue = $row['ContactMobile'];
        $this->PolicyType->DbValue = $row['PolicyType'];
        $this->PolicyName->DbValue = $row['PolicyName'];
        $this->PolicyNo->DbValue = $row['PolicyNo'];
        $this->PolicyAmount->DbValue = $row['PolicyAmount'];
        $this->RefLetterNo->DbValue = $row['RefLetterNo'];
        $this->ReferenceBy->DbValue = $row['ReferenceBy'];
        $this->ReferenceDate->DbValue = $row['ReferenceDate'];
        $this->DocumentAttatch->Upload->DbValue = $row['DocumentAttatch'];
        $this->createdby->DbValue = $row['createdby'];
        $this->createddatetime->DbValue = $row['createddatetime'];
        $this->modifiedby->DbValue = $row['modifiedby'];
        $this->modifieddatetime->DbValue = $row['modifieddatetime'];
        $this->mrnno->DbValue = $row['mrnno'];
    }

    // Delete uploaded files
    public function deleteUploadedFiles($row)
    {
        $this->loadDbValues($row);
        $oldFiles = EmptyValue($row['DocumentAttatch']) ? [] : explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $row['DocumentAttatch']);
        foreach ($oldFiles as $oldFile) {
            if (file_exists($this->DocumentAttatch->oldPhysicalUploadPath() . $oldFile)) {
                @unlink($this->DocumentAttatch->oldPhysicalUploadPath() . $oldFile);
            }
        }
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
        return $_SESSION[$name] ?? GetUrl("PatientInsuranceList");
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
        if ($pageName == "PatientInsuranceView") {
            return $Language->phrase("View");
        } elseif ($pageName == "PatientInsuranceEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "PatientInsuranceAdd") {
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
                return "PatientInsuranceView";
            case Config("API_ADD_ACTION"):
                return "PatientInsuranceAdd";
            case Config("API_EDIT_ACTION"):
                return "PatientInsuranceEdit";
            case Config("API_DELETE_ACTION"):
                return "PatientInsuranceDelete";
            case Config("API_LIST_ACTION"):
                return "PatientInsuranceList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "PatientInsuranceList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("PatientInsuranceView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("PatientInsuranceView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "PatientInsuranceAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "PatientInsuranceAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("PatientInsuranceEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("PatientInsuranceAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("PatientInsuranceDelete", $this->getUrlParm());
    }

    // Add master url
    public function addMasterUrl($url)
    {
        if ($this->getCurrentMasterTable() == "ip_admission" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
            $url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
            $url .= "&" . GetForeignKeyUrl("fk_id", $this->Reception->CurrentValue ?? $this->Reception->getSessionValue());
            $url .= "&" . GetForeignKeyUrl("fk_patient_id", $this->PatientId->CurrentValue ?? $this->PatientId->getSessionValue());
            $url .= "&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnno->CurrentValue ?? $this->mrnno->getSessionValue());
        }
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
        $this->Reception->setDbValue($row['Reception']);
        $this->PatientId->setDbValue($row['PatientId']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->Company->setDbValue($row['Company']);
        $this->AddressInsuranceCarierName->setDbValue($row['AddressInsuranceCarierName']);
        $this->ContactName->setDbValue($row['ContactName']);
        $this->ContactMobile->setDbValue($row['ContactMobile']);
        $this->PolicyType->setDbValue($row['PolicyType']);
        $this->PolicyName->setDbValue($row['PolicyName']);
        $this->PolicyNo->setDbValue($row['PolicyNo']);
        $this->PolicyAmount->setDbValue($row['PolicyAmount']);
        $this->RefLetterNo->setDbValue($row['RefLetterNo']);
        $this->ReferenceBy->setDbValue($row['ReferenceBy']);
        $this->ReferenceDate->setDbValue($row['ReferenceDate']);
        $this->DocumentAttatch->Upload->DbValue = $row['DocumentAttatch'];
        $this->DocumentAttatch->setDbValue($this->DocumentAttatch->Upload->DbValue);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->mrnno->setDbValue($row['mrnno']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // Reception

        // PatientId

        // PatientName

        // Company

        // AddressInsuranceCarierName

        // ContactName

        // ContactMobile

        // PolicyType

        // PolicyName

        // PolicyNo

        // PolicyAmount

        // RefLetterNo

        // ReferenceBy

        // ReferenceDate

        // DocumentAttatch

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // mrnno

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // Reception
        $this->Reception->ViewValue = $this->Reception->CurrentValue;
        $this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
        $this->Reception->ViewCustomAttributes = "";

        // PatientId
        $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
        $this->PatientId->ViewValue = FormatNumber($this->PatientId->ViewValue, 0, -2, -2, -2);
        $this->PatientId->ViewCustomAttributes = "";

        // PatientName
        $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
        $this->PatientName->ViewCustomAttributes = "";

        // Company
        $this->Company->ViewValue = $this->Company->CurrentValue;
        $this->Company->ViewCustomAttributes = "";

        // AddressInsuranceCarierName
        $this->AddressInsuranceCarierName->ViewValue = $this->AddressInsuranceCarierName->CurrentValue;
        $this->AddressInsuranceCarierName->ViewCustomAttributes = "";

        // ContactName
        $this->ContactName->ViewValue = $this->ContactName->CurrentValue;
        $this->ContactName->ViewCustomAttributes = "";

        // ContactMobile
        $this->ContactMobile->ViewValue = $this->ContactMobile->CurrentValue;
        $this->ContactMobile->ViewCustomAttributes = "";

        // PolicyType
        $this->PolicyType->ViewValue = $this->PolicyType->CurrentValue;
        $this->PolicyType->ViewCustomAttributes = "";

        // PolicyName
        $this->PolicyName->ViewValue = $this->PolicyName->CurrentValue;
        $this->PolicyName->ViewCustomAttributes = "";

        // PolicyNo
        $this->PolicyNo->ViewValue = $this->PolicyNo->CurrentValue;
        $this->PolicyNo->ViewCustomAttributes = "";

        // PolicyAmount
        $this->PolicyAmount->ViewValue = $this->PolicyAmount->CurrentValue;
        $this->PolicyAmount->ViewCustomAttributes = "";

        // RefLetterNo
        $this->RefLetterNo->ViewValue = $this->RefLetterNo->CurrentValue;
        $this->RefLetterNo->ViewCustomAttributes = "";

        // ReferenceBy
        $this->ReferenceBy->ViewValue = $this->ReferenceBy->CurrentValue;
        $this->ReferenceBy->ViewCustomAttributes = "";

        // ReferenceDate
        $this->ReferenceDate->ViewValue = $this->ReferenceDate->CurrentValue;
        $this->ReferenceDate->ViewValue = FormatDateTime($this->ReferenceDate->ViewValue, 0);
        $this->ReferenceDate->ViewCustomAttributes = "";

        // DocumentAttatch
        if (!EmptyValue($this->DocumentAttatch->Upload->DbValue)) {
            $this->DocumentAttatch->ViewValue = $this->DocumentAttatch->Upload->DbValue;
        } else {
            $this->DocumentAttatch->ViewValue = "";
        }
        $this->DocumentAttatch->ViewCustomAttributes = "";

        // createdby
        $this->createdby->ViewValue = $this->createdby->CurrentValue;
        $this->createdby->ViewCustomAttributes = "";

        // createddatetime
        $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
        $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
        $this->createddatetime->ViewCustomAttributes = "";

        // modifiedby
        $this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
        $this->modifiedby->ViewCustomAttributes = "";

        // modifieddatetime
        $this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
        $this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
        $this->modifieddatetime->ViewCustomAttributes = "";

        // mrnno
        $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
        $this->mrnno->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // Reception
        $this->Reception->LinkCustomAttributes = "";
        $this->Reception->HrefValue = "";
        $this->Reception->TooltipValue = "";

        // PatientId
        $this->PatientId->LinkCustomAttributes = "";
        $this->PatientId->HrefValue = "";
        $this->PatientId->TooltipValue = "";

        // PatientName
        $this->PatientName->LinkCustomAttributes = "";
        $this->PatientName->HrefValue = "";
        $this->PatientName->TooltipValue = "";

        // Company
        $this->Company->LinkCustomAttributes = "";
        $this->Company->HrefValue = "";
        $this->Company->TooltipValue = "";

        // AddressInsuranceCarierName
        $this->AddressInsuranceCarierName->LinkCustomAttributes = "";
        $this->AddressInsuranceCarierName->HrefValue = "";
        $this->AddressInsuranceCarierName->TooltipValue = "";

        // ContactName
        $this->ContactName->LinkCustomAttributes = "";
        $this->ContactName->HrefValue = "";
        $this->ContactName->TooltipValue = "";

        // ContactMobile
        $this->ContactMobile->LinkCustomAttributes = "";
        $this->ContactMobile->HrefValue = "";
        $this->ContactMobile->TooltipValue = "";

        // PolicyType
        $this->PolicyType->LinkCustomAttributes = "";
        $this->PolicyType->HrefValue = "";
        $this->PolicyType->TooltipValue = "";

        // PolicyName
        $this->PolicyName->LinkCustomAttributes = "";
        $this->PolicyName->HrefValue = "";
        $this->PolicyName->TooltipValue = "";

        // PolicyNo
        $this->PolicyNo->LinkCustomAttributes = "";
        $this->PolicyNo->HrefValue = "";
        $this->PolicyNo->TooltipValue = "";

        // PolicyAmount
        $this->PolicyAmount->LinkCustomAttributes = "";
        $this->PolicyAmount->HrefValue = "";
        $this->PolicyAmount->TooltipValue = "";

        // RefLetterNo
        $this->RefLetterNo->LinkCustomAttributes = "";
        $this->RefLetterNo->HrefValue = "";
        $this->RefLetterNo->TooltipValue = "";

        // ReferenceBy
        $this->ReferenceBy->LinkCustomAttributes = "";
        $this->ReferenceBy->HrefValue = "";
        $this->ReferenceBy->TooltipValue = "";

        // ReferenceDate
        $this->ReferenceDate->LinkCustomAttributes = "";
        $this->ReferenceDate->HrefValue = "";
        $this->ReferenceDate->TooltipValue = "";

        // DocumentAttatch
        $this->DocumentAttatch->LinkCustomAttributes = "";
        $this->DocumentAttatch->HrefValue = "";
        $this->DocumentAttatch->ExportHrefValue = $this->DocumentAttatch->UploadPath . $this->DocumentAttatch->Upload->DbValue;
        $this->DocumentAttatch->TooltipValue = "";

        // createdby
        $this->createdby->LinkCustomAttributes = "";
        $this->createdby->HrefValue = "";
        $this->createdby->TooltipValue = "";

        // createddatetime
        $this->createddatetime->LinkCustomAttributes = "";
        $this->createddatetime->HrefValue = "";
        $this->createddatetime->TooltipValue = "";

        // modifiedby
        $this->modifiedby->LinkCustomAttributes = "";
        $this->modifiedby->HrefValue = "";
        $this->modifiedby->TooltipValue = "";

        // modifieddatetime
        $this->modifieddatetime->LinkCustomAttributes = "";
        $this->modifieddatetime->HrefValue = "";
        $this->modifieddatetime->TooltipValue = "";

        // mrnno
        $this->mrnno->LinkCustomAttributes = "";
        $this->mrnno->HrefValue = "";
        $this->mrnno->TooltipValue = "";

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

        // Reception
        $this->Reception->EditAttrs["class"] = "form-control";
        $this->Reception->EditCustomAttributes = "";
        $this->Reception->EditValue = $this->Reception->CurrentValue;
        $this->Reception->EditValue = FormatNumber($this->Reception->EditValue, 0, -2, -2, -2);
        $this->Reception->ViewCustomAttributes = "";

        // PatientId
        $this->PatientId->EditAttrs["class"] = "form-control";
        $this->PatientId->EditCustomAttributes = "";
        $this->PatientId->EditValue = $this->PatientId->CurrentValue;
        $this->PatientId->EditValue = FormatNumber($this->PatientId->EditValue, 0, -2, -2, -2);
        $this->PatientId->ViewCustomAttributes = "";

        // PatientName
        $this->PatientName->EditAttrs["class"] = "form-control";
        $this->PatientName->EditCustomAttributes = "";
        if (!$this->PatientName->Raw) {
            $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
        }
        $this->PatientName->EditValue = $this->PatientName->CurrentValue;
        $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

        // Company
        $this->Company->EditAttrs["class"] = "form-control";
        $this->Company->EditCustomAttributes = "";
        if (!$this->Company->Raw) {
            $this->Company->CurrentValue = HtmlDecode($this->Company->CurrentValue);
        }
        $this->Company->EditValue = $this->Company->CurrentValue;
        $this->Company->PlaceHolder = RemoveHtml($this->Company->caption());

        // AddressInsuranceCarierName
        $this->AddressInsuranceCarierName->EditAttrs["class"] = "form-control";
        $this->AddressInsuranceCarierName->EditCustomAttributes = "";
        if (!$this->AddressInsuranceCarierName->Raw) {
            $this->AddressInsuranceCarierName->CurrentValue = HtmlDecode($this->AddressInsuranceCarierName->CurrentValue);
        }
        $this->AddressInsuranceCarierName->EditValue = $this->AddressInsuranceCarierName->CurrentValue;
        $this->AddressInsuranceCarierName->PlaceHolder = RemoveHtml($this->AddressInsuranceCarierName->caption());

        // ContactName
        $this->ContactName->EditAttrs["class"] = "form-control";
        $this->ContactName->EditCustomAttributes = "";
        if (!$this->ContactName->Raw) {
            $this->ContactName->CurrentValue = HtmlDecode($this->ContactName->CurrentValue);
        }
        $this->ContactName->EditValue = $this->ContactName->CurrentValue;
        $this->ContactName->PlaceHolder = RemoveHtml($this->ContactName->caption());

        // ContactMobile
        $this->ContactMobile->EditAttrs["class"] = "form-control";
        $this->ContactMobile->EditCustomAttributes = "";
        if (!$this->ContactMobile->Raw) {
            $this->ContactMobile->CurrentValue = HtmlDecode($this->ContactMobile->CurrentValue);
        }
        $this->ContactMobile->EditValue = $this->ContactMobile->CurrentValue;
        $this->ContactMobile->PlaceHolder = RemoveHtml($this->ContactMobile->caption());

        // PolicyType
        $this->PolicyType->EditAttrs["class"] = "form-control";
        $this->PolicyType->EditCustomAttributes = "";
        if (!$this->PolicyType->Raw) {
            $this->PolicyType->CurrentValue = HtmlDecode($this->PolicyType->CurrentValue);
        }
        $this->PolicyType->EditValue = $this->PolicyType->CurrentValue;
        $this->PolicyType->PlaceHolder = RemoveHtml($this->PolicyType->caption());

        // PolicyName
        $this->PolicyName->EditAttrs["class"] = "form-control";
        $this->PolicyName->EditCustomAttributes = "";
        if (!$this->PolicyName->Raw) {
            $this->PolicyName->CurrentValue = HtmlDecode($this->PolicyName->CurrentValue);
        }
        $this->PolicyName->EditValue = $this->PolicyName->CurrentValue;
        $this->PolicyName->PlaceHolder = RemoveHtml($this->PolicyName->caption());

        // PolicyNo
        $this->PolicyNo->EditAttrs["class"] = "form-control";
        $this->PolicyNo->EditCustomAttributes = "";
        if (!$this->PolicyNo->Raw) {
            $this->PolicyNo->CurrentValue = HtmlDecode($this->PolicyNo->CurrentValue);
        }
        $this->PolicyNo->EditValue = $this->PolicyNo->CurrentValue;
        $this->PolicyNo->PlaceHolder = RemoveHtml($this->PolicyNo->caption());

        // PolicyAmount
        $this->PolicyAmount->EditAttrs["class"] = "form-control";
        $this->PolicyAmount->EditCustomAttributes = "";
        if (!$this->PolicyAmount->Raw) {
            $this->PolicyAmount->CurrentValue = HtmlDecode($this->PolicyAmount->CurrentValue);
        }
        $this->PolicyAmount->EditValue = $this->PolicyAmount->CurrentValue;
        $this->PolicyAmount->PlaceHolder = RemoveHtml($this->PolicyAmount->caption());

        // RefLetterNo
        $this->RefLetterNo->EditAttrs["class"] = "form-control";
        $this->RefLetterNo->EditCustomAttributes = "";
        if (!$this->RefLetterNo->Raw) {
            $this->RefLetterNo->CurrentValue = HtmlDecode($this->RefLetterNo->CurrentValue);
        }
        $this->RefLetterNo->EditValue = $this->RefLetterNo->CurrentValue;
        $this->RefLetterNo->PlaceHolder = RemoveHtml($this->RefLetterNo->caption());

        // ReferenceBy
        $this->ReferenceBy->EditAttrs["class"] = "form-control";
        $this->ReferenceBy->EditCustomAttributes = "";
        if (!$this->ReferenceBy->Raw) {
            $this->ReferenceBy->CurrentValue = HtmlDecode($this->ReferenceBy->CurrentValue);
        }
        $this->ReferenceBy->EditValue = $this->ReferenceBy->CurrentValue;
        $this->ReferenceBy->PlaceHolder = RemoveHtml($this->ReferenceBy->caption());

        // ReferenceDate
        $this->ReferenceDate->EditAttrs["class"] = "form-control";
        $this->ReferenceDate->EditCustomAttributes = "";
        $this->ReferenceDate->EditValue = FormatDateTime($this->ReferenceDate->CurrentValue, 8);
        $this->ReferenceDate->PlaceHolder = RemoveHtml($this->ReferenceDate->caption());

        // DocumentAttatch
        $this->DocumentAttatch->EditAttrs["class"] = "form-control";
        $this->DocumentAttatch->EditCustomAttributes = "";
        if (!EmptyValue($this->DocumentAttatch->Upload->DbValue)) {
            $this->DocumentAttatch->EditValue = $this->DocumentAttatch->Upload->DbValue;
        } else {
            $this->DocumentAttatch->EditValue = "";
        }
        if (!EmptyValue($this->DocumentAttatch->CurrentValue)) {
            $this->DocumentAttatch->Upload->FileName = $this->DocumentAttatch->CurrentValue;
        }

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // mrnno
        $this->mrnno->EditAttrs["class"] = "form-control";
        $this->mrnno->EditCustomAttributes = "";
        if ($this->mrnno->getSessionValue() != "") {
            $this->mrnno->CurrentValue = GetForeignKeyValue($this->mrnno->getSessionValue());
            $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";
        } else {
            if (!$this->mrnno->Raw) {
                $this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
            }
            $this->mrnno->EditValue = $this->mrnno->CurrentValue;
            $this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());
        }

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
                    $doc->exportCaption($this->Reception);
                    $doc->exportCaption($this->PatientId);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->Company);
                    $doc->exportCaption($this->AddressInsuranceCarierName);
                    $doc->exportCaption($this->ContactName);
                    $doc->exportCaption($this->ContactMobile);
                    $doc->exportCaption($this->PolicyType);
                    $doc->exportCaption($this->PolicyName);
                    $doc->exportCaption($this->PolicyNo);
                    $doc->exportCaption($this->PolicyAmount);
                    $doc->exportCaption($this->RefLetterNo);
                    $doc->exportCaption($this->ReferenceBy);
                    $doc->exportCaption($this->ReferenceDate);
                    $doc->exportCaption($this->DocumentAttatch);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->mrnno);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->Reception);
                    $doc->exportCaption($this->PatientId);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->Company);
                    $doc->exportCaption($this->AddressInsuranceCarierName);
                    $doc->exportCaption($this->ContactName);
                    $doc->exportCaption($this->ContactMobile);
                    $doc->exportCaption($this->PolicyType);
                    $doc->exportCaption($this->PolicyName);
                    $doc->exportCaption($this->PolicyNo);
                    $doc->exportCaption($this->PolicyAmount);
                    $doc->exportCaption($this->RefLetterNo);
                    $doc->exportCaption($this->ReferenceBy);
                    $doc->exportCaption($this->ReferenceDate);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->mrnno);
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
                        $doc->exportField($this->Reception);
                        $doc->exportField($this->PatientId);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->Company);
                        $doc->exportField($this->AddressInsuranceCarierName);
                        $doc->exportField($this->ContactName);
                        $doc->exportField($this->ContactMobile);
                        $doc->exportField($this->PolicyType);
                        $doc->exportField($this->PolicyName);
                        $doc->exportField($this->PolicyNo);
                        $doc->exportField($this->PolicyAmount);
                        $doc->exportField($this->RefLetterNo);
                        $doc->exportField($this->ReferenceBy);
                        $doc->exportField($this->ReferenceDate);
                        $doc->exportField($this->DocumentAttatch);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->mrnno);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->Reception);
                        $doc->exportField($this->PatientId);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->Company);
                        $doc->exportField($this->AddressInsuranceCarierName);
                        $doc->exportField($this->ContactName);
                        $doc->exportField($this->ContactMobile);
                        $doc->exportField($this->PolicyType);
                        $doc->exportField($this->PolicyName);
                        $doc->exportField($this->PolicyNo);
                        $doc->exportField($this->PolicyAmount);
                        $doc->exportField($this->RefLetterNo);
                        $doc->exportField($this->ReferenceBy);
                        $doc->exportField($this->ReferenceDate);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->mrnno);
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
        $width = ($width > 0) ? $width : Config("THUMBNAIL_DEFAULT_WIDTH");
        $height = ($height > 0) ? $height : Config("THUMBNAIL_DEFAULT_HEIGHT");

        // Set up field name / file name field / file type field
        $fldName = "";
        $fileNameFld = "";
        $fileTypeFld = "";
        if ($fldparm == 'DocumentAttatch') {
            $fldName = "DocumentAttatch";
            $fileNameFld = "DocumentAttatch";
        } else {
            return false; // Incorrect field
        }

        // Set up key values
        $ar = explode(Config("COMPOSITE_KEY_SEPARATOR"), $key);
        if (count($ar) == 1) {
            $this->id->CurrentValue = $ar[0];
        } else {
            return false; // Incorrect key
        }

        // Set up filter (WHERE Clause)
        $filter = $this->getRecordFilter();
        $this->CurrentFilter = $filter;
        $sql = $this->getCurrentSql();
        $conn = $this->getConnection();
        $dbtype = GetConnectionType($this->Dbid);
        if ($row = $conn->fetchAssoc($sql)) {
            $val = $row[$fldName];
            if (!EmptyValue($val)) {
                $fld = $this->Fields[$fldName];

                // Binary data
                if ($fld->DataType == DATATYPE_BLOB) {
                    if ($dbtype != "MYSQL") {
                        if (is_resource($val) && get_resource_type($val) == "stream") { // Byte array
                            $val = stream_get_contents($val);
                        }
                    }
                    if ($resize) {
                        ResizeBinary($val, $width, $height, 100, $plugins);
                    }

                    // Write file type
                    if ($fileTypeFld != "" && !EmptyValue($row[$fileTypeFld])) {
                        AddHeader("Content-type", $row[$fileTypeFld]);
                    } else {
                        AddHeader("Content-type", ContentType($val));
                    }

                    // Write file name
                    $downloadPdf = !Config("EMBED_PDF") && Config("DOWNLOAD_PDF_FILE");
                    if ($fileNameFld != "" && !EmptyValue($row[$fileNameFld])) {
                        $fileName = $row[$fileNameFld];
                        $pathinfo = pathinfo($fileName);
                        $ext = strtolower(@$pathinfo["extension"]);
                        $isPdf = SameText($ext, "pdf");
                        if ($downloadPdf || !$isPdf) { // Skip header if not download PDF
                            AddHeader("Content-Disposition", "attachment; filename=\"" . $fileName . "\"");
                        }
                    } else {
                        $ext = ContentExtension($val);
                        $isPdf = SameText($ext, ".pdf");
                        if ($isPdf && $downloadPdf) { // Add header if download PDF
                            AddHeader("Content-Disposition", "attachment; filename=\"" . $fileName . "\"");
                        }
                    }

                    // Write file data
                    if (
                        StartsString("PK", $val) &&
                        ContainsString($val, "[Content_Types].xml") &&
                        ContainsString($val, "_rels") &&
                        ContainsString($val, "docProps")
                    ) { // Fix Office 2007 documents
                        if (!EndsString("\0\0\0", $val)) { // Not ends with 3 or 4 \0
                            $val .= "\0\0\0\0";
                        }
                    }

                    // Clear any debug message
                    if (ob_get_length()) {
                        ob_end_clean();
                    }

                    // Write binary data
                    Write($val);

                // Upload to folder
                } else {
                    if ($fld->UploadMultiple) {
                        $files = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $val);
                    } else {
                        $files = [$val];
                    }
                    $data = [];
                    $ar = [];
                    foreach ($files as $file) {
                        if (!EmptyValue($file)) {
                            if (Config("ENCRYPT_FILE_PATH")) {
                                $ar[$file] = FullUrl(GetApiUrl(Config("API_FILE_ACTION") .
                                    "/" . $this->TableVar . "/" . Encrypt($fld->physicalUploadPath() . $file)));
                            } else {
                                $ar[$file] = FullUrl($fld->hrefPath() . $file);
                            }
                        }
                    }
                    $data[$fld->Param] = $ar;
                    WriteJson($data);
                }
            }
            return true;
        }
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
    public function rowInserting($rsold, &$rsnew) {
    	// Enter your code here
    	// To cancel, set return value to FALSE
    			if($rsnew["PatID"]=="")
    		{
    				$dbhelper = &DbHelper();
    				$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$rsnew["PatientId"]."'; ";
    				$results2 = $dbhelper->ExecuteRows($sql);
    				$rsnew["PatientName"] = $results2[0]["first_name"];
    				$rsnew["Age"] = $results2[0]["Age"];
    				$rsnew["Gender"] = $results2[0]["gender"];
    				$rsnew["profilePic"] = $results2[0]["profilePic"];
    				$rsnew["PatID"] = $results2[0]["PatientID"];
    				$rsnew["MobileNumber"] = $results2[0]["mobile_no"];
    		}
    	return TRUE;
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
