<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for patient_investigations
 */
class PatientInvestigations extends DbTable
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
    public $Investigation;
    public $Value;
    public $NormalRange;
    public $mrnno;
    public $Age;
    public $Gender;
    public $profilePic;
    public $SampleCollected;
    public $SampleCollectedBy;
    public $ResultedDate;
    public $ResultedBy;
    public $Modified;
    public $ModifiedBy;
    public $Created;
    public $CreatedBy;
    public $GroupHead;
    public $Cost;
    public $PaymentStatus;
    public $PayMode;
    public $VoucherNo;
    public $InvestigationMultiselect;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'patient_investigations';
        $this->TableName = 'patient_investigations';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`patient_investigations`";
        $this->Dbid = 'DB';
        $this->ExportAll = true;
        $this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
        $this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
        $this->ExportPageSize = "a4"; // Page size (PDF only)
        $this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
        $this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
        $this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
        $this->ExportWordColumnWidth = null; // Cell width (PHPWord only)
        $this->DetailAdd = true; // Allow detail add
        $this->DetailEdit = true; // Allow detail edit
        $this->DetailView = true; // Allow detail view
        $this->ShowMultipleDetails = false; // Show multiple details
        $this->GridAddRowCount = 5;
        $this->AllowAddDeleteRow = true; // Allow add/delete row
        $this->UserIDAllowSecurity = Config("DEFAULT_USER_ID_ALLOW_SECURITY"); // Default User ID allowed permissions
        $this->BasicSearch = new BasicSearch($this->TableVar);

        // id
        $this->id = new DbField('patient_investigations', 'patient_investigations', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // Reception
        $this->Reception = new DbField('patient_investigations', 'patient_investigations', 'x_Reception', 'Reception', '`Reception`', '`Reception`', 200, 45, -1, false, '`Reception`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Reception->IsForeignKey = true; // Foreign key field
        $this->Reception->Sortable = false; // Allow sort
        $this->Reception->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Reception->Param, "CustomMsg");
        $this->Fields['Reception'] = &$this->Reception;

        // PatientId
        $this->PatientId = new DbField('patient_investigations', 'patient_investigations', 'x_PatientId', 'PatientId', '`PatientId`', '`PatientId`', 200, 45, -1, false, '`PatientId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientId->IsForeignKey = true; // Foreign key field
        $this->PatientId->Sortable = false; // Allow sort
        $this->PatientId->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientId->Param, "CustomMsg");
        $this->Fields['PatientId'] = &$this->PatientId;

        // PatientName
        $this->PatientName = new DbField('patient_investigations', 'patient_investigations', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, false, '`PatientName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientName->Sortable = false; // Allow sort
        $this->PatientName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientName->Param, "CustomMsg");
        $this->Fields['PatientName'] = &$this->PatientName;

        // Investigation
        $this->Investigation = new DbField('patient_investigations', 'patient_investigations', 'x_Investigation', 'Investigation', '`Investigation`', '`Investigation`', 200, 45, -1, false, '`Investigation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Investigation->Sortable = true; // Allow sort
        $this->Investigation->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Investigation->Param, "CustomMsg");
        $this->Fields['Investigation'] = &$this->Investigation;

        // Value
        $this->Value = new DbField('patient_investigations', 'patient_investigations', 'x_Value', 'Value', '`Value`', '`Value`', 200, 45, -1, false, '`Value`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Value->Sortable = true; // Allow sort
        $this->Value->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Value->Param, "CustomMsg");
        $this->Fields['Value'] = &$this->Value;

        // NormalRange
        $this->NormalRange = new DbField('patient_investigations', 'patient_investigations', 'x_NormalRange', 'NormalRange', '`NormalRange`', '`NormalRange`', 200, 45, -1, false, '`NormalRange`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NormalRange->Sortable = true; // Allow sort
        $this->NormalRange->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->NormalRange->Param, "CustomMsg");
        $this->Fields['NormalRange'] = &$this->NormalRange;

        // mrnno
        $this->mrnno = new DbField('patient_investigations', 'patient_investigations', 'x_mrnno', 'mrnno', '`mrnno`', '`mrnno`', 200, 45, -1, false, '`mrnno`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->mrnno->IsForeignKey = true; // Foreign key field
        $this->mrnno->Sortable = true; // Allow sort
        $this->mrnno->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->mrnno->Param, "CustomMsg");
        $this->Fields['mrnno'] = &$this->mrnno;

        // Age
        $this->Age = new DbField('patient_investigations', 'patient_investigations', 'x_Age', 'Age', '`Age`', '`Age`', 200, 45, -1, false, '`Age`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Age->Sortable = true; // Allow sort
        $this->Age->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Age->Param, "CustomMsg");
        $this->Fields['Age'] = &$this->Age;

        // Gender
        $this->Gender = new DbField('patient_investigations', 'patient_investigations', 'x_Gender', 'Gender', '`Gender`', '`Gender`', 200, 45, -1, false, '`Gender`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Gender->Sortable = true; // Allow sort
        $this->Gender->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Gender->Param, "CustomMsg");
        $this->Fields['Gender'] = &$this->Gender;

        // profilePic
        $this->profilePic = new DbField('patient_investigations', 'patient_investigations', 'x_profilePic', 'profilePic', '`profilePic`', '`profilePic`', 201, 450, -1, false, '`profilePic`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->profilePic->Sortable = true; // Allow sort
        $this->profilePic->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->profilePic->Param, "CustomMsg");
        $this->Fields['profilePic'] = &$this->profilePic;

        // SampleCollected
        $this->SampleCollected = new DbField('patient_investigations', 'patient_investigations', 'x_SampleCollected', 'SampleCollected', '`SampleCollected`', CastDateFieldForLike("`SampleCollected`", 0, "DB"), 135, 19, 0, false, '`SampleCollected`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SampleCollected->Sortable = true; // Allow sort
        $this->SampleCollected->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->SampleCollected->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SampleCollected->Param, "CustomMsg");
        $this->Fields['SampleCollected'] = &$this->SampleCollected;

        // SampleCollectedBy
        $this->SampleCollectedBy = new DbField('patient_investigations', 'patient_investigations', 'x_SampleCollectedBy', 'SampleCollectedBy', '`SampleCollectedBy`', '`SampleCollectedBy`', 200, 45, -1, false, '`SampleCollectedBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SampleCollectedBy->Sortable = true; // Allow sort
        $this->SampleCollectedBy->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SampleCollectedBy->Param, "CustomMsg");
        $this->Fields['SampleCollectedBy'] = &$this->SampleCollectedBy;

        // ResultedDate
        $this->ResultedDate = new DbField('patient_investigations', 'patient_investigations', 'x_ResultedDate', 'ResultedDate', '`ResultedDate`', CastDateFieldForLike("`ResultedDate`", 0, "DB"), 135, 19, 0, false, '`ResultedDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ResultedDate->Sortable = true; // Allow sort
        $this->ResultedDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->ResultedDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ResultedDate->Param, "CustomMsg");
        $this->Fields['ResultedDate'] = &$this->ResultedDate;

        // ResultedBy
        $this->ResultedBy = new DbField('patient_investigations', 'patient_investigations', 'x_ResultedBy', 'ResultedBy', '`ResultedBy`', '`ResultedBy`', 200, 45, -1, false, '`ResultedBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ResultedBy->Sortable = true; // Allow sort
        $this->ResultedBy->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ResultedBy->Param, "CustomMsg");
        $this->Fields['ResultedBy'] = &$this->ResultedBy;

        // Modified
        $this->Modified = new DbField('patient_investigations', 'patient_investigations', 'x_Modified', 'Modified', '`Modified`', CastDateFieldForLike("`Modified`", 0, "DB"), 135, 19, 0, false, '`Modified`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Modified->Sortable = true; // Allow sort
        $this->Modified->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Modified->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Modified->Param, "CustomMsg");
        $this->Fields['Modified'] = &$this->Modified;

        // ModifiedBy
        $this->ModifiedBy = new DbField('patient_investigations', 'patient_investigations', 'x_ModifiedBy', 'ModifiedBy', '`ModifiedBy`', '`ModifiedBy`', 200, 45, -1, false, '`ModifiedBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ModifiedBy->Sortable = true; // Allow sort
        $this->ModifiedBy->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ModifiedBy->Param, "CustomMsg");
        $this->Fields['ModifiedBy'] = &$this->ModifiedBy;

        // Created
        $this->Created = new DbField('patient_investigations', 'patient_investigations', 'x_Created', 'Created', '`Created`', CastDateFieldForLike("`Created`", 0, "DB"), 135, 19, 0, false, '`Created`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Created->Sortable = true; // Allow sort
        $this->Created->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Created->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Created->Param, "CustomMsg");
        $this->Fields['Created'] = &$this->Created;

        // CreatedBy
        $this->CreatedBy = new DbField('patient_investigations', 'patient_investigations', 'x_CreatedBy', 'CreatedBy', '`CreatedBy`', '`CreatedBy`', 200, 45, -1, false, '`CreatedBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CreatedBy->Sortable = true; // Allow sort
        $this->CreatedBy->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CreatedBy->Param, "CustomMsg");
        $this->Fields['CreatedBy'] = &$this->CreatedBy;

        // GroupHead
        $this->GroupHead = new DbField('patient_investigations', 'patient_investigations', 'x_GroupHead', 'GroupHead', '`GroupHead`', '`GroupHead`', 200, 4, -1, false, '`GroupHead`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GroupHead->Sortable = true; // Allow sort
        $this->GroupHead->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GroupHead->Param, "CustomMsg");
        $this->Fields['GroupHead'] = &$this->GroupHead;

        // Cost
        $this->Cost = new DbField('patient_investigations', 'patient_investigations', 'x_Cost', 'Cost', '`Cost`', '`Cost`', 131, 10, -1, false, '`Cost`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Cost->Sortable = true; // Allow sort
        $this->Cost->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Cost->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Cost->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Cost->Param, "CustomMsg");
        $this->Fields['Cost'] = &$this->Cost;

        // PaymentStatus
        $this->PaymentStatus = new DbField('patient_investigations', 'patient_investigations', 'x_PaymentStatus', 'PaymentStatus', '`PaymentStatus`', '`PaymentStatus`', 200, 45, -1, false, '`PaymentStatus`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PaymentStatus->Sortable = true; // Allow sort
        $this->PaymentStatus->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PaymentStatus->Param, "CustomMsg");
        $this->Fields['PaymentStatus'] = &$this->PaymentStatus;

        // PayMode
        $this->PayMode = new DbField('patient_investigations', 'patient_investigations', 'x_PayMode', 'PayMode', '`PayMode`', '`PayMode`', 200, 45, -1, false, '`PayMode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PayMode->Sortable = true; // Allow sort
        $this->PayMode->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PayMode->Param, "CustomMsg");
        $this->Fields['PayMode'] = &$this->PayMode;

        // VoucherNo
        $this->VoucherNo = new DbField('patient_investigations', 'patient_investigations', 'x_VoucherNo', 'VoucherNo', '`VoucherNo`', '`VoucherNo`', 200, 45, -1, false, '`VoucherNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->VoucherNo->Sortable = true; // Allow sort
        $this->VoucherNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->VoucherNo->Param, "CustomMsg");
        $this->Fields['VoucherNo'] = &$this->VoucherNo;

        // InvestigationMultiselect
        $this->InvestigationMultiselect = new DbField('patient_investigations', 'patient_investigations', 'x_InvestigationMultiselect', 'InvestigationMultiselect', '\'\'', '\'\'', 201, 65530, -1, false, '\'\'', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->InvestigationMultiselect->IsCustom = true; // Custom field
        $this->InvestigationMultiselect->Sortable = true; // Allow sort
        $this->InvestigationMultiselect->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->InvestigationMultiselect->Param, "CustomMsg");
        $this->Fields['InvestigationMultiselect'] = &$this->InvestigationMultiselect;
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
                $detailFilter .= "" . GetForeignKeySql("`Reception`", $this->Reception->getSessionValue(), DATATYPE_STRING, "DB");
            } else {
                return "";
            }
            if ($this->PatientId->getSessionValue() != "") {
                $detailFilter .= " AND " . GetForeignKeySql("`PatientId`", $this->PatientId->getSessionValue(), DATATYPE_STRING, "DB");
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
        return "`Reception`='@Reception@' AND `PatientId`='@PatientId@' AND `mrnno`='@mrnno@'";
    }

    // Table level SQL
    public function getSqlFrom() // From
    {
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`patient_investigations`";
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
        return $this->SqlSelect ?? $this->getQueryBuilder()->select("*, '' AS `InvestigationMultiselect`");
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
        $this->Investigation->DbValue = $row['Investigation'];
        $this->Value->DbValue = $row['Value'];
        $this->NormalRange->DbValue = $row['NormalRange'];
        $this->mrnno->DbValue = $row['mrnno'];
        $this->Age->DbValue = $row['Age'];
        $this->Gender->DbValue = $row['Gender'];
        $this->profilePic->DbValue = $row['profilePic'];
        $this->SampleCollected->DbValue = $row['SampleCollected'];
        $this->SampleCollectedBy->DbValue = $row['SampleCollectedBy'];
        $this->ResultedDate->DbValue = $row['ResultedDate'];
        $this->ResultedBy->DbValue = $row['ResultedBy'];
        $this->Modified->DbValue = $row['Modified'];
        $this->ModifiedBy->DbValue = $row['ModifiedBy'];
        $this->Created->DbValue = $row['Created'];
        $this->CreatedBy->DbValue = $row['CreatedBy'];
        $this->GroupHead->DbValue = $row['GroupHead'];
        $this->Cost->DbValue = $row['Cost'];
        $this->PaymentStatus->DbValue = $row['PaymentStatus'];
        $this->PayMode->DbValue = $row['PayMode'];
        $this->VoucherNo->DbValue = $row['VoucherNo'];
        $this->InvestigationMultiselect->DbValue = $row['InvestigationMultiselect'];
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
        return $_SESSION[$name] ?? GetUrl("PatientInvestigationsList");
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
        if ($pageName == "PatientInvestigationsView") {
            return $Language->phrase("View");
        } elseif ($pageName == "PatientInvestigationsEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "PatientInvestigationsAdd") {
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
                return "PatientInvestigationsView";
            case Config("API_ADD_ACTION"):
                return "PatientInvestigationsAdd";
            case Config("API_EDIT_ACTION"):
                return "PatientInvestigationsEdit";
            case Config("API_DELETE_ACTION"):
                return "PatientInvestigationsDelete";
            case Config("API_LIST_ACTION"):
                return "PatientInvestigationsList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "PatientInvestigationsList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("PatientInvestigationsView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("PatientInvestigationsView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "PatientInvestigationsAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "PatientInvestigationsAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("PatientInvestigationsEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("PatientInvestigationsAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("PatientInvestigationsDelete", $this->getUrlParm());
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
        $this->Investigation->setDbValue($row['Investigation']);
        $this->Value->setDbValue($row['Value']);
        $this->NormalRange->setDbValue($row['NormalRange']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->Age->setDbValue($row['Age']);
        $this->Gender->setDbValue($row['Gender']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->SampleCollected->setDbValue($row['SampleCollected']);
        $this->SampleCollectedBy->setDbValue($row['SampleCollectedBy']);
        $this->ResultedDate->setDbValue($row['ResultedDate']);
        $this->ResultedBy->setDbValue($row['ResultedBy']);
        $this->Modified->setDbValue($row['Modified']);
        $this->ModifiedBy->setDbValue($row['ModifiedBy']);
        $this->Created->setDbValue($row['Created']);
        $this->CreatedBy->setDbValue($row['CreatedBy']);
        $this->GroupHead->setDbValue($row['GroupHead']);
        $this->Cost->setDbValue($row['Cost']);
        $this->PaymentStatus->setDbValue($row['PaymentStatus']);
        $this->PayMode->setDbValue($row['PayMode']);
        $this->VoucherNo->setDbValue($row['VoucherNo']);
        $this->InvestigationMultiselect->setDbValue($row['InvestigationMultiselect']);
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

        // Investigation

        // Value

        // NormalRange

        // mrnno

        // Age

        // Gender

        // profilePic

        // SampleCollected

        // SampleCollectedBy

        // ResultedDate

        // ResultedBy

        // Modified

        // ModifiedBy

        // Created

        // CreatedBy

        // GroupHead

        // Cost

        // PaymentStatus

        // PayMode

        // VoucherNo

        // InvestigationMultiselect

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // Reception
        $this->Reception->ViewValue = $this->Reception->CurrentValue;
        $this->Reception->ViewCustomAttributes = "";

        // PatientId
        $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
        $this->PatientId->ViewCustomAttributes = "";

        // PatientName
        $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
        $this->PatientName->ViewCustomAttributes = "";

        // Investigation
        $this->Investigation->ViewValue = $this->Investigation->CurrentValue;
        $this->Investigation->ViewCustomAttributes = "";

        // Value
        $this->Value->ViewValue = $this->Value->CurrentValue;
        $this->Value->ViewCustomAttributes = "";

        // NormalRange
        $this->NormalRange->ViewValue = $this->NormalRange->CurrentValue;
        $this->NormalRange->ViewCustomAttributes = "";

        // mrnno
        $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
        $this->mrnno->ViewCustomAttributes = "";

        // Age
        $this->Age->ViewValue = $this->Age->CurrentValue;
        $this->Age->ViewCustomAttributes = "";

        // Gender
        $this->Gender->ViewValue = $this->Gender->CurrentValue;
        $this->Gender->ViewCustomAttributes = "";

        // profilePic
        $this->profilePic->ViewValue = $this->profilePic->CurrentValue;
        $this->profilePic->ViewCustomAttributes = "";

        // SampleCollected
        $this->SampleCollected->ViewValue = $this->SampleCollected->CurrentValue;
        $this->SampleCollected->ViewValue = FormatDateTime($this->SampleCollected->ViewValue, 0);
        $this->SampleCollected->ViewCustomAttributes = "";

        // SampleCollectedBy
        $this->SampleCollectedBy->ViewValue = $this->SampleCollectedBy->CurrentValue;
        $this->SampleCollectedBy->ViewCustomAttributes = "";

        // ResultedDate
        $this->ResultedDate->ViewValue = $this->ResultedDate->CurrentValue;
        $this->ResultedDate->ViewValue = FormatDateTime($this->ResultedDate->ViewValue, 0);
        $this->ResultedDate->ViewCustomAttributes = "";

        // ResultedBy
        $this->ResultedBy->ViewValue = $this->ResultedBy->CurrentValue;
        $this->ResultedBy->ViewCustomAttributes = "";

        // Modified
        $this->Modified->ViewValue = $this->Modified->CurrentValue;
        $this->Modified->ViewValue = FormatDateTime($this->Modified->ViewValue, 0);
        $this->Modified->ViewCustomAttributes = "";

        // ModifiedBy
        $this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
        $this->ModifiedBy->ViewCustomAttributes = "";

        // Created
        $this->Created->ViewValue = $this->Created->CurrentValue;
        $this->Created->ViewValue = FormatDateTime($this->Created->ViewValue, 0);
        $this->Created->ViewCustomAttributes = "";

        // CreatedBy
        $this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
        $this->CreatedBy->ViewCustomAttributes = "";

        // GroupHead
        $this->GroupHead->ViewValue = $this->GroupHead->CurrentValue;
        $this->GroupHead->ViewCustomAttributes = "";

        // Cost
        $this->Cost->ViewValue = $this->Cost->CurrentValue;
        $this->Cost->ViewValue = FormatNumber($this->Cost->ViewValue, 2, -2, -2, -2);
        $this->Cost->ViewCustomAttributes = "";

        // PaymentStatus
        $this->PaymentStatus->ViewValue = $this->PaymentStatus->CurrentValue;
        $this->PaymentStatus->ViewCustomAttributes = "";

        // PayMode
        $this->PayMode->ViewValue = $this->PayMode->CurrentValue;
        $this->PayMode->ViewCustomAttributes = "";

        // VoucherNo
        $this->VoucherNo->ViewValue = $this->VoucherNo->CurrentValue;
        $this->VoucherNo->ViewCustomAttributes = "";

        // InvestigationMultiselect
        $this->InvestigationMultiselect->ViewValue = $this->InvestigationMultiselect->CurrentValue;
        $this->InvestigationMultiselect->ViewCustomAttributes = "";

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

        // Investigation
        $this->Investigation->LinkCustomAttributes = "";
        $this->Investigation->HrefValue = "";
        $this->Investigation->TooltipValue = "";

        // Value
        $this->Value->LinkCustomAttributes = "";
        $this->Value->HrefValue = "";
        $this->Value->TooltipValue = "";

        // NormalRange
        $this->NormalRange->LinkCustomAttributes = "";
        $this->NormalRange->HrefValue = "";
        $this->NormalRange->TooltipValue = "";

        // mrnno
        $this->mrnno->LinkCustomAttributes = "";
        $this->mrnno->HrefValue = "";
        $this->mrnno->TooltipValue = "";

        // Age
        $this->Age->LinkCustomAttributes = "";
        $this->Age->HrefValue = "";
        $this->Age->TooltipValue = "";

        // Gender
        $this->Gender->LinkCustomAttributes = "";
        $this->Gender->HrefValue = "";
        $this->Gender->TooltipValue = "";

        // profilePic
        $this->profilePic->LinkCustomAttributes = "";
        $this->profilePic->HrefValue = "";
        $this->profilePic->TooltipValue = "";

        // SampleCollected
        $this->SampleCollected->LinkCustomAttributes = "";
        $this->SampleCollected->HrefValue = "";
        $this->SampleCollected->TooltipValue = "";

        // SampleCollectedBy
        $this->SampleCollectedBy->LinkCustomAttributes = "";
        $this->SampleCollectedBy->HrefValue = "";
        $this->SampleCollectedBy->TooltipValue = "";

        // ResultedDate
        $this->ResultedDate->LinkCustomAttributes = "";
        $this->ResultedDate->HrefValue = "";
        $this->ResultedDate->TooltipValue = "";

        // ResultedBy
        $this->ResultedBy->LinkCustomAttributes = "";
        $this->ResultedBy->HrefValue = "";
        $this->ResultedBy->TooltipValue = "";

        // Modified
        $this->Modified->LinkCustomAttributes = "";
        $this->Modified->HrefValue = "";
        $this->Modified->TooltipValue = "";

        // ModifiedBy
        $this->ModifiedBy->LinkCustomAttributes = "";
        $this->ModifiedBy->HrefValue = "";
        $this->ModifiedBy->TooltipValue = "";

        // Created
        $this->Created->LinkCustomAttributes = "";
        $this->Created->HrefValue = "";
        $this->Created->TooltipValue = "";

        // CreatedBy
        $this->CreatedBy->LinkCustomAttributes = "";
        $this->CreatedBy->HrefValue = "";
        $this->CreatedBy->TooltipValue = "";

        // GroupHead
        $this->GroupHead->LinkCustomAttributes = "";
        $this->GroupHead->HrefValue = "";
        $this->GroupHead->TooltipValue = "";

        // Cost
        $this->Cost->LinkCustomAttributes = "";
        $this->Cost->HrefValue = "";
        $this->Cost->TooltipValue = "";

        // PaymentStatus
        $this->PaymentStatus->LinkCustomAttributes = "";
        $this->PaymentStatus->HrefValue = "";
        $this->PaymentStatus->TooltipValue = "";

        // PayMode
        $this->PayMode->LinkCustomAttributes = "";
        $this->PayMode->HrefValue = "";
        $this->PayMode->TooltipValue = "";

        // VoucherNo
        $this->VoucherNo->LinkCustomAttributes = "";
        $this->VoucherNo->HrefValue = "";
        $this->VoucherNo->TooltipValue = "";

        // InvestigationMultiselect
        $this->InvestigationMultiselect->LinkCustomAttributes = "";
        $this->InvestigationMultiselect->HrefValue = "";
        $this->InvestigationMultiselect->TooltipValue = "";

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
        $this->Reception->ViewCustomAttributes = "";

        // PatientId
        $this->PatientId->EditAttrs["class"] = "form-control";
        $this->PatientId->EditCustomAttributes = "";
        $this->PatientId->EditValue = $this->PatientId->CurrentValue;
        $this->PatientId->ViewCustomAttributes = "";

        // PatientName
        $this->PatientName->EditAttrs["class"] = "form-control";
        $this->PatientName->EditCustomAttributes = "";
        if (!$this->PatientName->Raw) {
            $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
        }
        $this->PatientName->EditValue = $this->PatientName->CurrentValue;
        $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

        // Investigation
        $this->Investigation->EditAttrs["class"] = "form-control";
        $this->Investigation->EditCustomAttributes = "";
        if (!$this->Investigation->Raw) {
            $this->Investigation->CurrentValue = HtmlDecode($this->Investigation->CurrentValue);
        }
        $this->Investigation->EditValue = $this->Investigation->CurrentValue;
        $this->Investigation->PlaceHolder = RemoveHtml($this->Investigation->caption());

        // Value
        $this->Value->EditAttrs["class"] = "form-control";
        $this->Value->EditCustomAttributes = "";
        if (!$this->Value->Raw) {
            $this->Value->CurrentValue = HtmlDecode($this->Value->CurrentValue);
        }
        $this->Value->EditValue = $this->Value->CurrentValue;
        $this->Value->PlaceHolder = RemoveHtml($this->Value->caption());

        // NormalRange
        $this->NormalRange->EditAttrs["class"] = "form-control";
        $this->NormalRange->EditCustomAttributes = "";
        if (!$this->NormalRange->Raw) {
            $this->NormalRange->CurrentValue = HtmlDecode($this->NormalRange->CurrentValue);
        }
        $this->NormalRange->EditValue = $this->NormalRange->CurrentValue;
        $this->NormalRange->PlaceHolder = RemoveHtml($this->NormalRange->caption());

        // mrnno
        $this->mrnno->EditAttrs["class"] = "form-control";
        $this->mrnno->EditCustomAttributes = "";
        $this->mrnno->EditValue = $this->mrnno->CurrentValue;
        $this->mrnno->ViewCustomAttributes = "";

        // Age
        $this->Age->EditAttrs["class"] = "form-control";
        $this->Age->EditCustomAttributes = "";
        if (!$this->Age->Raw) {
            $this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
        }
        $this->Age->EditValue = $this->Age->CurrentValue;
        $this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

        // Gender
        $this->Gender->EditAttrs["class"] = "form-control";
        $this->Gender->EditCustomAttributes = "";
        if (!$this->Gender->Raw) {
            $this->Gender->CurrentValue = HtmlDecode($this->Gender->CurrentValue);
        }
        $this->Gender->EditValue = $this->Gender->CurrentValue;
        $this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

        // profilePic
        $this->profilePic->EditAttrs["class"] = "form-control";
        $this->profilePic->EditCustomAttributes = "";
        $this->profilePic->EditValue = $this->profilePic->CurrentValue;
        $this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

        // SampleCollected
        $this->SampleCollected->EditAttrs["class"] = "form-control";
        $this->SampleCollected->EditCustomAttributes = "";
        $this->SampleCollected->EditValue = FormatDateTime($this->SampleCollected->CurrentValue, 8);
        $this->SampleCollected->PlaceHolder = RemoveHtml($this->SampleCollected->caption());

        // SampleCollectedBy
        $this->SampleCollectedBy->EditAttrs["class"] = "form-control";
        $this->SampleCollectedBy->EditCustomAttributes = "";
        if (!$this->SampleCollectedBy->Raw) {
            $this->SampleCollectedBy->CurrentValue = HtmlDecode($this->SampleCollectedBy->CurrentValue);
        }
        $this->SampleCollectedBy->EditValue = $this->SampleCollectedBy->CurrentValue;
        $this->SampleCollectedBy->PlaceHolder = RemoveHtml($this->SampleCollectedBy->caption());

        // ResultedDate
        $this->ResultedDate->EditAttrs["class"] = "form-control";
        $this->ResultedDate->EditCustomAttributes = "";
        $this->ResultedDate->EditValue = FormatDateTime($this->ResultedDate->CurrentValue, 8);
        $this->ResultedDate->PlaceHolder = RemoveHtml($this->ResultedDate->caption());

        // ResultedBy
        $this->ResultedBy->EditAttrs["class"] = "form-control";
        $this->ResultedBy->EditCustomAttributes = "";
        if (!$this->ResultedBy->Raw) {
            $this->ResultedBy->CurrentValue = HtmlDecode($this->ResultedBy->CurrentValue);
        }
        $this->ResultedBy->EditValue = $this->ResultedBy->CurrentValue;
        $this->ResultedBy->PlaceHolder = RemoveHtml($this->ResultedBy->caption());

        // Modified
        $this->Modified->EditAttrs["class"] = "form-control";
        $this->Modified->EditCustomAttributes = "";
        $this->Modified->EditValue = FormatDateTime($this->Modified->CurrentValue, 8);
        $this->Modified->PlaceHolder = RemoveHtml($this->Modified->caption());

        // ModifiedBy
        $this->ModifiedBy->EditAttrs["class"] = "form-control";
        $this->ModifiedBy->EditCustomAttributes = "";
        if (!$this->ModifiedBy->Raw) {
            $this->ModifiedBy->CurrentValue = HtmlDecode($this->ModifiedBy->CurrentValue);
        }
        $this->ModifiedBy->EditValue = $this->ModifiedBy->CurrentValue;
        $this->ModifiedBy->PlaceHolder = RemoveHtml($this->ModifiedBy->caption());

        // Created
        $this->Created->EditAttrs["class"] = "form-control";
        $this->Created->EditCustomAttributes = "";
        $this->Created->EditValue = FormatDateTime($this->Created->CurrentValue, 8);
        $this->Created->PlaceHolder = RemoveHtml($this->Created->caption());

        // CreatedBy
        $this->CreatedBy->EditAttrs["class"] = "form-control";
        $this->CreatedBy->EditCustomAttributes = "";
        if (!$this->CreatedBy->Raw) {
            $this->CreatedBy->CurrentValue = HtmlDecode($this->CreatedBy->CurrentValue);
        }
        $this->CreatedBy->EditValue = $this->CreatedBy->CurrentValue;
        $this->CreatedBy->PlaceHolder = RemoveHtml($this->CreatedBy->caption());

        // GroupHead
        $this->GroupHead->EditAttrs["class"] = "form-control";
        $this->GroupHead->EditCustomAttributes = "";
        if (!$this->GroupHead->Raw) {
            $this->GroupHead->CurrentValue = HtmlDecode($this->GroupHead->CurrentValue);
        }
        $this->GroupHead->EditValue = $this->GroupHead->CurrentValue;
        $this->GroupHead->PlaceHolder = RemoveHtml($this->GroupHead->caption());

        // Cost
        $this->Cost->EditAttrs["class"] = "form-control";
        $this->Cost->EditCustomAttributes = "";
        $this->Cost->EditValue = $this->Cost->CurrentValue;
        $this->Cost->PlaceHolder = RemoveHtml($this->Cost->caption());
        if (strval($this->Cost->EditValue) != "" && is_numeric($this->Cost->EditValue)) {
            $this->Cost->EditValue = FormatNumber($this->Cost->EditValue, -2, -2, -2, -2);
        }

        // PaymentStatus
        $this->PaymentStatus->EditAttrs["class"] = "form-control";
        $this->PaymentStatus->EditCustomAttributes = "";
        if (!$this->PaymentStatus->Raw) {
            $this->PaymentStatus->CurrentValue = HtmlDecode($this->PaymentStatus->CurrentValue);
        }
        $this->PaymentStatus->EditValue = $this->PaymentStatus->CurrentValue;
        $this->PaymentStatus->PlaceHolder = RemoveHtml($this->PaymentStatus->caption());

        // PayMode
        $this->PayMode->EditAttrs["class"] = "form-control";
        $this->PayMode->EditCustomAttributes = "";
        if (!$this->PayMode->Raw) {
            $this->PayMode->CurrentValue = HtmlDecode($this->PayMode->CurrentValue);
        }
        $this->PayMode->EditValue = $this->PayMode->CurrentValue;
        $this->PayMode->PlaceHolder = RemoveHtml($this->PayMode->caption());

        // VoucherNo
        $this->VoucherNo->EditAttrs["class"] = "form-control";
        $this->VoucherNo->EditCustomAttributes = "";
        if (!$this->VoucherNo->Raw) {
            $this->VoucherNo->CurrentValue = HtmlDecode($this->VoucherNo->CurrentValue);
        }
        $this->VoucherNo->EditValue = $this->VoucherNo->CurrentValue;
        $this->VoucherNo->PlaceHolder = RemoveHtml($this->VoucherNo->caption());

        // InvestigationMultiselect
        $this->InvestigationMultiselect->EditAttrs["class"] = "form-control";
        $this->InvestigationMultiselect->EditCustomAttributes = "";
        if (!$this->InvestigationMultiselect->Raw) {
            $this->InvestigationMultiselect->CurrentValue = HtmlDecode($this->InvestigationMultiselect->CurrentValue);
        }
        $this->InvestigationMultiselect->EditValue = $this->InvestigationMultiselect->CurrentValue;
        $this->InvestigationMultiselect->PlaceHolder = RemoveHtml($this->InvestigationMultiselect->caption());

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
                    $doc->exportCaption($this->Investigation);
                    $doc->exportCaption($this->Value);
                    $doc->exportCaption($this->NormalRange);
                    $doc->exportCaption($this->mrnno);
                    $doc->exportCaption($this->Age);
                    $doc->exportCaption($this->Gender);
                    $doc->exportCaption($this->profilePic);
                    $doc->exportCaption($this->SampleCollected);
                    $doc->exportCaption($this->SampleCollectedBy);
                    $doc->exportCaption($this->ResultedDate);
                    $doc->exportCaption($this->ResultedBy);
                    $doc->exportCaption($this->Modified);
                    $doc->exportCaption($this->ModifiedBy);
                    $doc->exportCaption($this->Created);
                    $doc->exportCaption($this->CreatedBy);
                    $doc->exportCaption($this->GroupHead);
                    $doc->exportCaption($this->Cost);
                    $doc->exportCaption($this->PaymentStatus);
                    $doc->exportCaption($this->PayMode);
                    $doc->exportCaption($this->VoucherNo);
                    $doc->exportCaption($this->InvestigationMultiselect);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->Investigation);
                    $doc->exportCaption($this->Value);
                    $doc->exportCaption($this->NormalRange);
                    $doc->exportCaption($this->mrnno);
                    $doc->exportCaption($this->Age);
                    $doc->exportCaption($this->Gender);
                    $doc->exportCaption($this->SampleCollected);
                    $doc->exportCaption($this->SampleCollectedBy);
                    $doc->exportCaption($this->ResultedDate);
                    $doc->exportCaption($this->ResultedBy);
                    $doc->exportCaption($this->Modified);
                    $doc->exportCaption($this->ModifiedBy);
                    $doc->exportCaption($this->Created);
                    $doc->exportCaption($this->CreatedBy);
                    $doc->exportCaption($this->GroupHead);
                    $doc->exportCaption($this->Cost);
                    $doc->exportCaption($this->PaymentStatus);
                    $doc->exportCaption($this->PayMode);
                    $doc->exportCaption($this->VoucherNo);
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
                        $doc->exportField($this->Investigation);
                        $doc->exportField($this->Value);
                        $doc->exportField($this->NormalRange);
                        $doc->exportField($this->mrnno);
                        $doc->exportField($this->Age);
                        $doc->exportField($this->Gender);
                        $doc->exportField($this->profilePic);
                        $doc->exportField($this->SampleCollected);
                        $doc->exportField($this->SampleCollectedBy);
                        $doc->exportField($this->ResultedDate);
                        $doc->exportField($this->ResultedBy);
                        $doc->exportField($this->Modified);
                        $doc->exportField($this->ModifiedBy);
                        $doc->exportField($this->Created);
                        $doc->exportField($this->CreatedBy);
                        $doc->exportField($this->GroupHead);
                        $doc->exportField($this->Cost);
                        $doc->exportField($this->PaymentStatus);
                        $doc->exportField($this->PayMode);
                        $doc->exportField($this->VoucherNo);
                        $doc->exportField($this->InvestigationMultiselect);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->Investigation);
                        $doc->exportField($this->Value);
                        $doc->exportField($this->NormalRange);
                        $doc->exportField($this->mrnno);
                        $doc->exportField($this->Age);
                        $doc->exportField($this->Gender);
                        $doc->exportField($this->SampleCollected);
                        $doc->exportField($this->SampleCollectedBy);
                        $doc->exportField($this->ResultedDate);
                        $doc->exportField($this->ResultedBy);
                        $doc->exportField($this->Modified);
                        $doc->exportField($this->ModifiedBy);
                        $doc->exportField($this->Created);
                        $doc->exportField($this->CreatedBy);
                        $doc->exportField($this->GroupHead);
                        $doc->exportField($this->Cost);
                        $doc->exportField($this->PaymentStatus);
                        $doc->exportField($this->PayMode);
                        $doc->exportField($this->VoucherNo);
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
