<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for patient_history
 */
class PatientHistory extends DbTable
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
    public $mrnno;
    public $PatientName;
    public $PatientId;
    public $MobileNumber;
    public $MaritalHistory;
    public $MenstrualHistory;
    public $ObstetricHistory;
    public $MedicalHistory;
    public $SurgicalHistory;
    public $PastHistory;
    public $TreatmentHistory;
    public $FamilyHistory;
    public $Age;
    public $Gender;
    public $profilePic;
    public $Complaints;
    public $illness;
    public $PersonalHistory;
    public $PatientSearch;
    public $PatID;
    public $Reception;
    public $HospID;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'patient_history';
        $this->TableName = 'patient_history';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`patient_history`";
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
        $this->id = new DbField('patient_history', 'patient_history', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // mrnno
        $this->mrnno = new DbField('patient_history', 'patient_history', 'x_mrnno', 'mrnno', '`mrnno`', '`mrnno`', 200, 45, -1, false, '`mrnno`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->mrnno->IsForeignKey = true; // Foreign key field
        $this->mrnno->Sortable = true; // Allow sort
        $this->mrnno->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->mrnno->Param, "CustomMsg");
        $this->Fields['mrnno'] = &$this->mrnno;

        // PatientName
        $this->PatientName = new DbField('patient_history', 'patient_history', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, false, '`PatientName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientName->Sortable = true; // Allow sort
        $this->PatientName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientName->Param, "CustomMsg");
        $this->Fields['PatientName'] = &$this->PatientName;

        // PatientId
        $this->PatientId = new DbField('patient_history', 'patient_history', 'x_PatientId', 'PatientId', '`PatientId`', '`PatientId`', 3, 11, -1, false, '`PatientId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientId->IsForeignKey = true; // Foreign key field
        $this->PatientId->Sortable = true; // Allow sort
        $this->PatientId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->PatientId->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientId->Param, "CustomMsg");
        $this->Fields['PatientId'] = &$this->PatientId;

        // MobileNumber
        $this->MobileNumber = new DbField('patient_history', 'patient_history', 'x_MobileNumber', 'MobileNumber', '`MobileNumber`', '`MobileNumber`', 200, 45, -1, false, '`MobileNumber`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MobileNumber->Sortable = true; // Allow sort
        $this->MobileNumber->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MobileNumber->Param, "CustomMsg");
        $this->Fields['MobileNumber'] = &$this->MobileNumber;

        // MaritalHistory
        $this->MaritalHistory = new DbField('patient_history', 'patient_history', 'x_MaritalHistory', 'MaritalHistory', '`MaritalHistory`', '`MaritalHistory`', 201, 450, -1, false, '`MaritalHistory`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->MaritalHistory->Sortable = true; // Allow sort
        $this->MaritalHistory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MaritalHistory->Param, "CustomMsg");
        $this->Fields['MaritalHistory'] = &$this->MaritalHistory;

        // MenstrualHistory
        $this->MenstrualHistory = new DbField('patient_history', 'patient_history', 'x_MenstrualHistory', 'MenstrualHistory', '`MenstrualHistory`', '`MenstrualHistory`', 201, 450, -1, false, '`MenstrualHistory`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->MenstrualHistory->Sortable = true; // Allow sort
        $this->MenstrualHistory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MenstrualHistory->Param, "CustomMsg");
        $this->Fields['MenstrualHistory'] = &$this->MenstrualHistory;

        // ObstetricHistory
        $this->ObstetricHistory = new DbField('patient_history', 'patient_history', 'x_ObstetricHistory', 'ObstetricHistory', '`ObstetricHistory`', '`ObstetricHistory`', 201, 450, -1, false, '`ObstetricHistory`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->ObstetricHistory->Sortable = true; // Allow sort
        $this->ObstetricHistory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ObstetricHistory->Param, "CustomMsg");
        $this->Fields['ObstetricHistory'] = &$this->ObstetricHistory;

        // MedicalHistory
        $this->MedicalHistory = new DbField('patient_history', 'patient_history', 'x_MedicalHistory', 'MedicalHistory', '`MedicalHistory`', '`MedicalHistory`', 201, 450, -1, false, '`MedicalHistory`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->MedicalHistory->Sortable = true; // Allow sort
        $this->MedicalHistory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MedicalHistory->Param, "CustomMsg");
        $this->Fields['MedicalHistory'] = &$this->MedicalHistory;

        // SurgicalHistory
        $this->SurgicalHistory = new DbField('patient_history', 'patient_history', 'x_SurgicalHistory', 'SurgicalHistory', '`SurgicalHistory`', '`SurgicalHistory`', 201, 450, -1, false, '`SurgicalHistory`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->SurgicalHistory->Sortable = true; // Allow sort
        $this->SurgicalHistory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SurgicalHistory->Param, "CustomMsg");
        $this->Fields['SurgicalHistory'] = &$this->SurgicalHistory;

        // PastHistory
        $this->PastHistory = new DbField('patient_history', 'patient_history', 'x_PastHistory', 'PastHistory', '`PastHistory`', '`PastHistory`', 201, 450, -1, false, '`PastHistory`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->PastHistory->Sortable = true; // Allow sort
        $this->PastHistory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PastHistory->Param, "CustomMsg");
        $this->Fields['PastHistory'] = &$this->PastHistory;

        // TreatmentHistory
        $this->TreatmentHistory = new DbField('patient_history', 'patient_history', 'x_TreatmentHistory', 'TreatmentHistory', '`TreatmentHistory`', '`TreatmentHistory`', 201, 450, -1, false, '`TreatmentHistory`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->TreatmentHistory->Sortable = true; // Allow sort
        $this->TreatmentHistory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TreatmentHistory->Param, "CustomMsg");
        $this->Fields['TreatmentHistory'] = &$this->TreatmentHistory;

        // FamilyHistory
        $this->FamilyHistory = new DbField('patient_history', 'patient_history', 'x_FamilyHistory', 'FamilyHistory', '`FamilyHistory`', '`FamilyHistory`', 201, 450, -1, false, '`FamilyHistory`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->FamilyHistory->Sortable = true; // Allow sort
        $this->FamilyHistory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FamilyHistory->Param, "CustomMsg");
        $this->Fields['FamilyHistory'] = &$this->FamilyHistory;

        // Age
        $this->Age = new DbField('patient_history', 'patient_history', 'x_Age', 'Age', '`Age`', '`Age`', 200, 45, -1, false, '`Age`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Age->Sortable = true; // Allow sort
        $this->Age->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Age->Param, "CustomMsg");
        $this->Fields['Age'] = &$this->Age;

        // Gender
        $this->Gender = new DbField('patient_history', 'patient_history', 'x_Gender', 'Gender', '`Gender`', '`Gender`', 200, 45, -1, false, '`Gender`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Gender->Sortable = true; // Allow sort
        $this->Gender->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Gender->Param, "CustomMsg");
        $this->Fields['Gender'] = &$this->Gender;

        // profilePic
        $this->profilePic = new DbField('patient_history', 'patient_history', 'x_profilePic', 'profilePic', '`profilePic`', '`profilePic`', 201, 450, -1, false, '`profilePic`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->profilePic->Sortable = true; // Allow sort
        $this->profilePic->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->profilePic->Param, "CustomMsg");
        $this->Fields['profilePic'] = &$this->profilePic;

        // Complaints
        $this->Complaints = new DbField('patient_history', 'patient_history', 'x_Complaints', 'Complaints', '`Complaints`', '`Complaints`', 201, 450, -1, false, '`Complaints`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Complaints->Sortable = true; // Allow sort
        $this->Complaints->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Complaints->Param, "CustomMsg");
        $this->Fields['Complaints'] = &$this->Complaints;

        // illness
        $this->illness = new DbField('patient_history', 'patient_history', 'x_illness', 'illness', '`illness`', '`illness`', 201, 450, -1, false, '`illness`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->illness->Sortable = true; // Allow sort
        $this->illness->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->illness->Param, "CustomMsg");
        $this->Fields['illness'] = &$this->illness;

        // PersonalHistory
        $this->PersonalHistory = new DbField('patient_history', 'patient_history', 'x_PersonalHistory', 'PersonalHistory', '`PersonalHistory`', '`PersonalHistory`', 201, 450, -1, false, '`PersonalHistory`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->PersonalHistory->Sortable = true; // Allow sort
        $this->PersonalHistory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PersonalHistory->Param, "CustomMsg");
        $this->Fields['PersonalHistory'] = &$this->PersonalHistory;

        // PatientSearch
        $this->PatientSearch = new DbField('patient_history', 'patient_history', 'x_PatientSearch', 'PatientSearch', '\'\'', '\'\'', 201, 65530, -1, false, '\'\'', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->PatientSearch->IsCustom = true; // Custom field
        $this->PatientSearch->Sortable = true; // Allow sort
        $this->PatientSearch->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->PatientSearch->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->PatientSearch->Lookup = new Lookup('PatientSearch', 'ip_admission', false, 'id', ["patient_id","patient_name","mobileno","mrnNo"], [], [], [], [], [], [], '`id` DESC', '');
        $this->PatientSearch->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientSearch->Param, "CustomMsg");
        $this->Fields['PatientSearch'] = &$this->PatientSearch;

        // PatID
        $this->PatID = new DbField('patient_history', 'patient_history', 'x_PatID', 'PatID', '`PatID`', '`PatID`', 200, 45, -1, false, '`PatID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatID->Sortable = true; // Allow sort
        $this->PatID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatID->Param, "CustomMsg");
        $this->Fields['PatID'] = &$this->PatID;

        // Reception
        $this->Reception = new DbField('patient_history', 'patient_history', 'x_Reception', 'Reception', '`Reception`', '`Reception`', 3, 11, -1, false, '`Reception`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Reception->IsForeignKey = true; // Foreign key field
        $this->Reception->Sortable = true; // Allow sort
        $this->Reception->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Reception->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Reception->Param, "CustomMsg");
        $this->Fields['Reception'] = &$this->Reception;

        // HospID
        $this->HospID = new DbField('patient_history', 'patient_history', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->HospID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospID->Param, "CustomMsg");
        $this->Fields['HospID'] = &$this->HospID;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`patient_history`";
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
        return $this->SqlSelect ?? $this->getQueryBuilder()->select("*, '' AS `PatientSearch`");
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
        $this->mrnno->DbValue = $row['mrnno'];
        $this->PatientName->DbValue = $row['PatientName'];
        $this->PatientId->DbValue = $row['PatientId'];
        $this->MobileNumber->DbValue = $row['MobileNumber'];
        $this->MaritalHistory->DbValue = $row['MaritalHistory'];
        $this->MenstrualHistory->DbValue = $row['MenstrualHistory'];
        $this->ObstetricHistory->DbValue = $row['ObstetricHistory'];
        $this->MedicalHistory->DbValue = $row['MedicalHistory'];
        $this->SurgicalHistory->DbValue = $row['SurgicalHistory'];
        $this->PastHistory->DbValue = $row['PastHistory'];
        $this->TreatmentHistory->DbValue = $row['TreatmentHistory'];
        $this->FamilyHistory->DbValue = $row['FamilyHistory'];
        $this->Age->DbValue = $row['Age'];
        $this->Gender->DbValue = $row['Gender'];
        $this->profilePic->DbValue = $row['profilePic'];
        $this->Complaints->DbValue = $row['Complaints'];
        $this->illness->DbValue = $row['illness'];
        $this->PersonalHistory->DbValue = $row['PersonalHistory'];
        $this->PatientSearch->DbValue = $row['PatientSearch'];
        $this->PatID->DbValue = $row['PatID'];
        $this->Reception->DbValue = $row['Reception'];
        $this->HospID->DbValue = $row['HospID'];
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
        return $_SESSION[$name] ?? GetUrl("PatientHistoryList");
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
        if ($pageName == "PatientHistoryView") {
            return $Language->phrase("View");
        } elseif ($pageName == "PatientHistoryEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "PatientHistoryAdd") {
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
                return "PatientHistoryView";
            case Config("API_ADD_ACTION"):
                return "PatientHistoryAdd";
            case Config("API_EDIT_ACTION"):
                return "PatientHistoryEdit";
            case Config("API_DELETE_ACTION"):
                return "PatientHistoryDelete";
            case Config("API_LIST_ACTION"):
                return "PatientHistoryList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "PatientHistoryList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("PatientHistoryView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("PatientHistoryView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "PatientHistoryAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "PatientHistoryAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("PatientHistoryEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("PatientHistoryAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("PatientHistoryDelete", $this->getUrlParm());
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
        $this->mrnno->setDbValue($row['mrnno']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->PatientId->setDbValue($row['PatientId']);
        $this->MobileNumber->setDbValue($row['MobileNumber']);
        $this->MaritalHistory->setDbValue($row['MaritalHistory']);
        $this->MenstrualHistory->setDbValue($row['MenstrualHistory']);
        $this->ObstetricHistory->setDbValue($row['ObstetricHistory']);
        $this->MedicalHistory->setDbValue($row['MedicalHistory']);
        $this->SurgicalHistory->setDbValue($row['SurgicalHistory']);
        $this->PastHistory->setDbValue($row['PastHistory']);
        $this->TreatmentHistory->setDbValue($row['TreatmentHistory']);
        $this->FamilyHistory->setDbValue($row['FamilyHistory']);
        $this->Age->setDbValue($row['Age']);
        $this->Gender->setDbValue($row['Gender']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->Complaints->setDbValue($row['Complaints']);
        $this->illness->setDbValue($row['illness']);
        $this->PersonalHistory->setDbValue($row['PersonalHistory']);
        $this->PatientSearch->setDbValue($row['PatientSearch']);
        $this->PatID->setDbValue($row['PatID']);
        $this->Reception->setDbValue($row['Reception']);
        $this->HospID->setDbValue($row['HospID']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // mrnno

        // PatientName

        // PatientId

        // MobileNumber

        // MaritalHistory

        // MenstrualHistory

        // ObstetricHistory

        // MedicalHistory

        // SurgicalHistory

        // PastHistory

        // TreatmentHistory

        // FamilyHistory

        // Age

        // Gender

        // profilePic

        // Complaints

        // illness

        // PersonalHistory

        // PatientSearch

        // PatID

        // Reception

        // HospID

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // mrnno
        $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
        $this->mrnno->ViewCustomAttributes = "";

        // PatientName
        $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
        $this->PatientName->ViewCustomAttributes = "";

        // PatientId
        $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
        $this->PatientId->ViewValue = FormatNumber($this->PatientId->ViewValue, 0, -2, -2, -2);
        $this->PatientId->ViewCustomAttributes = "";

        // MobileNumber
        $this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
        $this->MobileNumber->ViewCustomAttributes = "";

        // MaritalHistory
        $this->MaritalHistory->ViewValue = $this->MaritalHistory->CurrentValue;
        $this->MaritalHistory->ViewCustomAttributes = "";

        // MenstrualHistory
        $this->MenstrualHistory->ViewValue = $this->MenstrualHistory->CurrentValue;
        $this->MenstrualHistory->ViewCustomAttributes = "";

        // ObstetricHistory
        $this->ObstetricHistory->ViewValue = $this->ObstetricHistory->CurrentValue;
        $this->ObstetricHistory->ViewCustomAttributes = "";

        // MedicalHistory
        $this->MedicalHistory->ViewValue = $this->MedicalHistory->CurrentValue;
        $this->MedicalHistory->ViewCustomAttributes = "";

        // SurgicalHistory
        $this->SurgicalHistory->ViewValue = $this->SurgicalHistory->CurrentValue;
        $this->SurgicalHistory->ViewCustomAttributes = "";

        // PastHistory
        $this->PastHistory->ViewValue = $this->PastHistory->CurrentValue;
        $this->PastHistory->ViewCustomAttributes = "";

        // TreatmentHistory
        $this->TreatmentHistory->ViewValue = $this->TreatmentHistory->CurrentValue;
        $this->TreatmentHistory->ViewCustomAttributes = "";

        // FamilyHistory
        $this->FamilyHistory->ViewValue = $this->FamilyHistory->CurrentValue;
        $this->FamilyHistory->ViewCustomAttributes = "";

        // Age
        $this->Age->ViewValue = $this->Age->CurrentValue;
        $this->Age->ViewCustomAttributes = "";

        // Gender
        $this->Gender->ViewValue = $this->Gender->CurrentValue;
        $this->Gender->ViewCustomAttributes = "";

        // profilePic
        $this->profilePic->ViewValue = $this->profilePic->CurrentValue;
        $this->profilePic->ViewCustomAttributes = "";

        // Complaints
        $this->Complaints->ViewValue = $this->Complaints->CurrentValue;
        $this->Complaints->ViewCustomAttributes = "";

        // illness
        $this->illness->ViewValue = $this->illness->CurrentValue;
        $this->illness->ViewCustomAttributes = "";

        // PersonalHistory
        $this->PersonalHistory->ViewValue = $this->PersonalHistory->CurrentValue;
        $this->PersonalHistory->ViewCustomAttributes = "";

        // PatientSearch
        $curVal = trim(strval($this->PatientSearch->CurrentValue));
        if ($curVal != "") {
            $this->PatientSearch->ViewValue = $this->PatientSearch->lookupCacheOption($curVal);
            if ($this->PatientSearch->ViewValue === null) { // Lookup from database
                $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                $sqlWrk = $this->PatientSearch->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->PatientSearch->Lookup->renderViewRow($rswrk[0]);
                    $this->PatientSearch->ViewValue = $this->PatientSearch->displayValue($arwrk);
                } else {
                    $this->PatientSearch->ViewValue = $this->PatientSearch->CurrentValue;
                }
            }
        } else {
            $this->PatientSearch->ViewValue = null;
        }
        $this->PatientSearch->ViewCustomAttributes = "";

        // PatID
        $this->PatID->ViewValue = $this->PatID->CurrentValue;
        $this->PatID->ViewCustomAttributes = "";

        // Reception
        $this->Reception->ViewValue = $this->Reception->CurrentValue;
        $this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
        $this->Reception->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // mrnno
        $this->mrnno->LinkCustomAttributes = "";
        $this->mrnno->HrefValue = "";
        $this->mrnno->TooltipValue = "";

        // PatientName
        $this->PatientName->LinkCustomAttributes = "";
        $this->PatientName->HrefValue = "";
        $this->PatientName->TooltipValue = "";

        // PatientId
        $this->PatientId->LinkCustomAttributes = "";
        $this->PatientId->HrefValue = "";
        $this->PatientId->TooltipValue = "";

        // MobileNumber
        $this->MobileNumber->LinkCustomAttributes = "";
        $this->MobileNumber->HrefValue = "";
        $this->MobileNumber->TooltipValue = "";

        // MaritalHistory
        $this->MaritalHistory->LinkCustomAttributes = "";
        $this->MaritalHistory->HrefValue = "";
        $this->MaritalHistory->TooltipValue = "";

        // MenstrualHistory
        $this->MenstrualHistory->LinkCustomAttributes = "";
        $this->MenstrualHistory->HrefValue = "";
        $this->MenstrualHistory->TooltipValue = "";

        // ObstetricHistory
        $this->ObstetricHistory->LinkCustomAttributes = "";
        $this->ObstetricHistory->HrefValue = "";
        $this->ObstetricHistory->TooltipValue = "";

        // MedicalHistory
        $this->MedicalHistory->LinkCustomAttributes = "";
        $this->MedicalHistory->HrefValue = "";
        $this->MedicalHistory->TooltipValue = "";

        // SurgicalHistory
        $this->SurgicalHistory->LinkCustomAttributes = "";
        $this->SurgicalHistory->HrefValue = "";
        $this->SurgicalHistory->TooltipValue = "";

        // PastHistory
        $this->PastHistory->LinkCustomAttributes = "";
        $this->PastHistory->HrefValue = "";
        $this->PastHistory->TooltipValue = "";

        // TreatmentHistory
        $this->TreatmentHistory->LinkCustomAttributes = "";
        $this->TreatmentHistory->HrefValue = "";
        $this->TreatmentHistory->TooltipValue = "";

        // FamilyHistory
        $this->FamilyHistory->LinkCustomAttributes = "";
        $this->FamilyHistory->HrefValue = "";
        $this->FamilyHistory->TooltipValue = "";

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

        // Complaints
        $this->Complaints->LinkCustomAttributes = "";
        $this->Complaints->HrefValue = "";
        $this->Complaints->TooltipValue = "";

        // illness
        $this->illness->LinkCustomAttributes = "";
        $this->illness->HrefValue = "";
        $this->illness->TooltipValue = "";

        // PersonalHistory
        $this->PersonalHistory->LinkCustomAttributes = "";
        $this->PersonalHistory->HrefValue = "";
        $this->PersonalHistory->TooltipValue = "";

        // PatientSearch
        $this->PatientSearch->LinkCustomAttributes = "";
        $this->PatientSearch->HrefValue = "";
        $this->PatientSearch->TooltipValue = "";

        // PatID
        $this->PatID->LinkCustomAttributes = "";
        $this->PatID->HrefValue = "";
        $this->PatID->TooltipValue = "";

        // Reception
        $this->Reception->LinkCustomAttributes = "";
        $this->Reception->HrefValue = "";
        $this->Reception->TooltipValue = "";

        // HospID
        $this->HospID->LinkCustomAttributes = "";
        $this->HospID->HrefValue = "";
        $this->HospID->TooltipValue = "";

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

        // mrnno
        $this->mrnno->EditAttrs["class"] = "form-control";
        $this->mrnno->EditCustomAttributes = "";
        $this->mrnno->EditValue = $this->mrnno->CurrentValue;
        $this->mrnno->ViewCustomAttributes = "";

        // PatientName
        $this->PatientName->EditAttrs["class"] = "form-control";
        $this->PatientName->EditCustomAttributes = "";
        if (!$this->PatientName->Raw) {
            $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
        }
        $this->PatientName->EditValue = $this->PatientName->CurrentValue;
        $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

        // PatientId
        $this->PatientId->EditAttrs["class"] = "form-control";
        $this->PatientId->EditCustomAttributes = "";
        $this->PatientId->EditValue = $this->PatientId->CurrentValue;
        $this->PatientId->EditValue = FormatNumber($this->PatientId->EditValue, 0, -2, -2, -2);
        $this->PatientId->ViewCustomAttributes = "";

        // MobileNumber
        $this->MobileNumber->EditAttrs["class"] = "form-control";
        $this->MobileNumber->EditCustomAttributes = "";
        if (!$this->MobileNumber->Raw) {
            $this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
        }
        $this->MobileNumber->EditValue = $this->MobileNumber->CurrentValue;
        $this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

        // MaritalHistory
        $this->MaritalHistory->EditAttrs["class"] = "form-control";
        $this->MaritalHistory->EditCustomAttributes = "";
        $this->MaritalHistory->EditValue = $this->MaritalHistory->CurrentValue;
        $this->MaritalHistory->PlaceHolder = RemoveHtml($this->MaritalHistory->caption());

        // MenstrualHistory
        $this->MenstrualHistory->EditAttrs["class"] = "form-control";
        $this->MenstrualHistory->EditCustomAttributes = "";
        $this->MenstrualHistory->EditValue = $this->MenstrualHistory->CurrentValue;
        $this->MenstrualHistory->PlaceHolder = RemoveHtml($this->MenstrualHistory->caption());

        // ObstetricHistory
        $this->ObstetricHistory->EditAttrs["class"] = "form-control";
        $this->ObstetricHistory->EditCustomAttributes = "";
        $this->ObstetricHistory->EditValue = $this->ObstetricHistory->CurrentValue;
        $this->ObstetricHistory->PlaceHolder = RemoveHtml($this->ObstetricHistory->caption());

        // MedicalHistory
        $this->MedicalHistory->EditAttrs["class"] = "form-control";
        $this->MedicalHistory->EditCustomAttributes = "";
        $this->MedicalHistory->EditValue = $this->MedicalHistory->CurrentValue;
        $this->MedicalHistory->PlaceHolder = RemoveHtml($this->MedicalHistory->caption());

        // SurgicalHistory
        $this->SurgicalHistory->EditAttrs["class"] = "form-control";
        $this->SurgicalHistory->EditCustomAttributes = "";
        $this->SurgicalHistory->EditValue = $this->SurgicalHistory->CurrentValue;
        $this->SurgicalHistory->PlaceHolder = RemoveHtml($this->SurgicalHistory->caption());

        // PastHistory
        $this->PastHistory->EditAttrs["class"] = "form-control";
        $this->PastHistory->EditCustomAttributes = "";
        $this->PastHistory->EditValue = $this->PastHistory->CurrentValue;
        $this->PastHistory->PlaceHolder = RemoveHtml($this->PastHistory->caption());

        // TreatmentHistory
        $this->TreatmentHistory->EditAttrs["class"] = "form-control";
        $this->TreatmentHistory->EditCustomAttributes = "";
        $this->TreatmentHistory->EditValue = $this->TreatmentHistory->CurrentValue;
        $this->TreatmentHistory->PlaceHolder = RemoveHtml($this->TreatmentHistory->caption());

        // FamilyHistory
        $this->FamilyHistory->EditAttrs["class"] = "form-control";
        $this->FamilyHistory->EditCustomAttributes = "";
        $this->FamilyHistory->EditValue = $this->FamilyHistory->CurrentValue;
        $this->FamilyHistory->PlaceHolder = RemoveHtml($this->FamilyHistory->caption());

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

        // Complaints
        $this->Complaints->EditAttrs["class"] = "form-control";
        $this->Complaints->EditCustomAttributes = "";
        $this->Complaints->EditValue = $this->Complaints->CurrentValue;
        $this->Complaints->PlaceHolder = RemoveHtml($this->Complaints->caption());

        // illness
        $this->illness->EditAttrs["class"] = "form-control";
        $this->illness->EditCustomAttributes = "";
        $this->illness->EditValue = $this->illness->CurrentValue;
        $this->illness->PlaceHolder = RemoveHtml($this->illness->caption());

        // PersonalHistory
        $this->PersonalHistory->EditAttrs["class"] = "form-control";
        $this->PersonalHistory->EditCustomAttributes = "";
        $this->PersonalHistory->EditValue = $this->PersonalHistory->CurrentValue;
        $this->PersonalHistory->PlaceHolder = RemoveHtml($this->PersonalHistory->caption());

        // PatientSearch
        $this->PatientSearch->EditAttrs["class"] = "form-control";
        $this->PatientSearch->EditCustomAttributes = "";
        $this->PatientSearch->PlaceHolder = RemoveHtml($this->PatientSearch->caption());

        // PatID
        $this->PatID->EditAttrs["class"] = "form-control";
        $this->PatID->EditCustomAttributes = "";
        if (!$this->PatID->Raw) {
            $this->PatID->CurrentValue = HtmlDecode($this->PatID->CurrentValue);
        }
        $this->PatID->EditValue = $this->PatID->CurrentValue;
        $this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

        // Reception
        $this->Reception->EditAttrs["class"] = "form-control";
        $this->Reception->EditCustomAttributes = "";
        $this->Reception->EditValue = $this->Reception->CurrentValue;
        $this->Reception->EditValue = FormatNumber($this->Reception->EditValue, 0, -2, -2, -2);
        $this->Reception->ViewCustomAttributes = "";

        // HospID

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
                    $doc->exportCaption($this->mrnno);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->PatientId);
                    $doc->exportCaption($this->MobileNumber);
                    $doc->exportCaption($this->MaritalHistory);
                    $doc->exportCaption($this->MenstrualHistory);
                    $doc->exportCaption($this->ObstetricHistory);
                    $doc->exportCaption($this->MedicalHistory);
                    $doc->exportCaption($this->SurgicalHistory);
                    $doc->exportCaption($this->PastHistory);
                    $doc->exportCaption($this->TreatmentHistory);
                    $doc->exportCaption($this->FamilyHistory);
                    $doc->exportCaption($this->Age);
                    $doc->exportCaption($this->Gender);
                    $doc->exportCaption($this->profilePic);
                    $doc->exportCaption($this->Complaints);
                    $doc->exportCaption($this->illness);
                    $doc->exportCaption($this->PersonalHistory);
                    $doc->exportCaption($this->PatientSearch);
                    $doc->exportCaption($this->PatID);
                    $doc->exportCaption($this->Reception);
                    $doc->exportCaption($this->HospID);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->mrnno);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->PatientId);
                    $doc->exportCaption($this->MobileNumber);
                    $doc->exportCaption($this->MaritalHistory);
                    $doc->exportCaption($this->MenstrualHistory);
                    $doc->exportCaption($this->ObstetricHistory);
                    $doc->exportCaption($this->Age);
                    $doc->exportCaption($this->Gender);
                    $doc->exportCaption($this->PatID);
                    $doc->exportCaption($this->Reception);
                    $doc->exportCaption($this->HospID);
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
                        $doc->exportField($this->mrnno);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->PatientId);
                        $doc->exportField($this->MobileNumber);
                        $doc->exportField($this->MaritalHistory);
                        $doc->exportField($this->MenstrualHistory);
                        $doc->exportField($this->ObstetricHistory);
                        $doc->exportField($this->MedicalHistory);
                        $doc->exportField($this->SurgicalHistory);
                        $doc->exportField($this->PastHistory);
                        $doc->exportField($this->TreatmentHistory);
                        $doc->exportField($this->FamilyHistory);
                        $doc->exportField($this->Age);
                        $doc->exportField($this->Gender);
                        $doc->exportField($this->profilePic);
                        $doc->exportField($this->Complaints);
                        $doc->exportField($this->illness);
                        $doc->exportField($this->PersonalHistory);
                        $doc->exportField($this->PatientSearch);
                        $doc->exportField($this->PatID);
                        $doc->exportField($this->Reception);
                        $doc->exportField($this->HospID);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->mrnno);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->PatientId);
                        $doc->exportField($this->MobileNumber);
                        $doc->exportField($this->MaritalHistory);
                        $doc->exportField($this->MenstrualHistory);
                        $doc->exportField($this->ObstetricHistory);
                        $doc->exportField($this->Age);
                        $doc->exportField($this->Gender);
                        $doc->exportField($this->PatID);
                        $doc->exportField($this->Reception);
                        $doc->exportField($this->HospID);
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
