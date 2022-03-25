<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_barcode_ivf
 */
class ViewBarcodeIvf extends DbTable
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
    public $id;
    public $_Barcode;
    public $CoupleID;
    public $PatientName;
    public $PatientID;
    public $PartnerName;
    public $PartnerID;
    public $WifeCell;
    public $HusbandCell;
    public $WifeEmail;
    public $HusbandEmail;
    public $ARTCYCLE;
    public $RESULT;
    public $HospID;
    public $DrID;
    public $DrDepartment;
    public $Doctor;
    public $Male;
    public $Female;
    public $status;
    public $createdby;
    public $createddatetime;
    public $modifiedby;
    public $modifieddatetime;
    public $malepropic;
    public $femalepropic;
    public $HusbandEducation;
    public $WifeEducation;
    public $HusbandWorkHours;
    public $WifeWorkHours;
    public $PatientLanguage;
    public $ReferedBy;
    public $ReferPhNo;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'view_barcode_ivf';
        $this->TableName = 'view_barcode_ivf';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_barcode_ivf`";
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
        $this->id = new DbField('view_barcode_ivf', 'view_barcode_ivf', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['id'] = &$this->id;

        // Barcode
        $this->_Barcode = new DbField('view_barcode_ivf', 'view_barcode_ivf', 'x__Barcode', 'Barcode', '`Barcode`', '`Barcode`', 200, 45, -1, false, '`Barcode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->_Barcode->Sortable = true; // Allow sort
        $this->Fields['Barcode'] = &$this->_Barcode;

        // CoupleID
        $this->CoupleID = new DbField('view_barcode_ivf', 'view_barcode_ivf', 'x_CoupleID', 'CoupleID', '`CoupleID`', '`CoupleID`', 200, 45, -1, false, '`CoupleID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CoupleID->Sortable = true; // Allow sort
        $this->Fields['CoupleID'] = &$this->CoupleID;

        // PatientName
        $this->PatientName = new DbField('view_barcode_ivf', 'view_barcode_ivf', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, false, '`PatientName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientName->Sortable = true; // Allow sort
        $this->Fields['PatientName'] = &$this->PatientName;

        // PatientID
        $this->PatientID = new DbField('view_barcode_ivf', 'view_barcode_ivf', 'x_PatientID', 'PatientID', '`PatientID`', '`PatientID`', 200, 45, -1, false, '`PatientID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientID->Sortable = true; // Allow sort
        $this->Fields['PatientID'] = &$this->PatientID;

        // PartnerName
        $this->PartnerName = new DbField('view_barcode_ivf', 'view_barcode_ivf', 'x_PartnerName', 'PartnerName', '`PartnerName`', '`PartnerName`', 200, 45, -1, false, '`PartnerName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PartnerName->Sortable = true; // Allow sort
        $this->Fields['PartnerName'] = &$this->PartnerName;

        // PartnerID
        $this->PartnerID = new DbField('view_barcode_ivf', 'view_barcode_ivf', 'x_PartnerID', 'PartnerID', '`PartnerID`', '`PartnerID`', 200, 45, -1, false, '`PartnerID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PartnerID->Sortable = true; // Allow sort
        $this->Fields['PartnerID'] = &$this->PartnerID;

        // WifeCell
        $this->WifeCell = new DbField('view_barcode_ivf', 'view_barcode_ivf', 'x_WifeCell', 'WifeCell', '`WifeCell`', '`WifeCell`', 200, 45, -1, false, '`WifeCell`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->WifeCell->Sortable = true; // Allow sort
        $this->Fields['WifeCell'] = &$this->WifeCell;

        // HusbandCell
        $this->HusbandCell = new DbField('view_barcode_ivf', 'view_barcode_ivf', 'x_HusbandCell', 'HusbandCell', '`HusbandCell`', '`HusbandCell`', 200, 45, -1, false, '`HusbandCell`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HusbandCell->Sortable = true; // Allow sort
        $this->Fields['HusbandCell'] = &$this->HusbandCell;

        // WifeEmail
        $this->WifeEmail = new DbField('view_barcode_ivf', 'view_barcode_ivf', 'x_WifeEmail', 'WifeEmail', '`WifeEmail`', '`WifeEmail`', 200, 45, -1, false, '`WifeEmail`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->WifeEmail->Sortable = true; // Allow sort
        $this->Fields['WifeEmail'] = &$this->WifeEmail;

        // HusbandEmail
        $this->HusbandEmail = new DbField('view_barcode_ivf', 'view_barcode_ivf', 'x_HusbandEmail', 'HusbandEmail', '`HusbandEmail`', '`HusbandEmail`', 200, 45, -1, false, '`HusbandEmail`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HusbandEmail->Sortable = true; // Allow sort
        $this->Fields['HusbandEmail'] = &$this->HusbandEmail;

        // ARTCYCLE
        $this->ARTCYCLE = new DbField('view_barcode_ivf', 'view_barcode_ivf', 'x_ARTCYCLE', 'ARTCYCLE', '`ARTCYCLE`', '`ARTCYCLE`', 200, 45, -1, false, '`ARTCYCLE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ARTCYCLE->Sortable = true; // Allow sort
        $this->Fields['ARTCYCLE'] = &$this->ARTCYCLE;

        // RESULT
        $this->RESULT = new DbField('view_barcode_ivf', 'view_barcode_ivf', 'x_RESULT', 'RESULT', '`RESULT`', '`RESULT`', 200, 45, -1, false, '`RESULT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RESULT->Sortable = true; // Allow sort
        $this->Fields['RESULT'] = &$this->RESULT;

        // HospID
        $this->HospID = new DbField('view_barcode_ivf', 'view_barcode_ivf', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['HospID'] = &$this->HospID;

        // DrID
        $this->DrID = new DbField('view_barcode_ivf', 'view_barcode_ivf', 'x_DrID', 'DrID', '`DrID`', '`DrID`', 3, 11, -1, false, '`DrID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DrID->Sortable = true; // Allow sort
        $this->DrID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['DrID'] = &$this->DrID;

        // DrDepartment
        $this->DrDepartment = new DbField('view_barcode_ivf', 'view_barcode_ivf', 'x_DrDepartment', 'DrDepartment', '`DrDepartment`', '`DrDepartment`', 200, 45, -1, false, '`DrDepartment`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DrDepartment->Sortable = true; // Allow sort
        $this->Fields['DrDepartment'] = &$this->DrDepartment;

        // Doctor
        $this->Doctor = new DbField('view_barcode_ivf', 'view_barcode_ivf', 'x_Doctor', 'Doctor', '`Doctor`', '`Doctor`', 200, 45, -1, false, '`Doctor`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Doctor->Sortable = true; // Allow sort
        $this->Fields['Doctor'] = &$this->Doctor;

        // Male
        $this->Male = new DbField('view_barcode_ivf', 'view_barcode_ivf', 'x_Male', 'Male', '`Male`', '`Male`', 3, 11, -1, false, '`Male`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Male->Nullable = false; // NOT NULL field
        $this->Male->Required = true; // Required field
        $this->Male->Sortable = true; // Allow sort
        $this->Male->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['Male'] = &$this->Male;

        // Female
        $this->Female = new DbField('view_barcode_ivf', 'view_barcode_ivf', 'x_Female', 'Female', '`Female`', '`Female`', 3, 11, -1, false, '`Female`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Female->Nullable = false; // NOT NULL field
        $this->Female->Required = true; // Required field
        $this->Female->Sortable = true; // Allow sort
        $this->Female->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['Female'] = &$this->Female;

        // status
        $this->status = new DbField('view_barcode_ivf', 'view_barcode_ivf', 'x_status', 'status', '`status`', '`status`', 3, 11, -1, false, '`status`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->status->Sortable = true; // Allow sort
        $this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['status'] = &$this->status;

        // createdby
        $this->createdby = new DbField('view_barcode_ivf', 'view_barcode_ivf', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, 11, -1, false, '`createdby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdby->Sortable = true; // Allow sort
        $this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['createdby'] = &$this->createdby;

        // createddatetime
        $this->createddatetime = new DbField('view_barcode_ivf', 'view_barcode_ivf', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, false, '`createddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddatetime->Sortable = true; // Allow sort
        $this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['createddatetime'] = &$this->createddatetime;

        // modifiedby
        $this->modifiedby = new DbField('view_barcode_ivf', 'view_barcode_ivf', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, 11, -1, false, '`modifiedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifiedby->Sortable = true; // Allow sort
        $this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['modifiedby'] = &$this->modifiedby;

        // modifieddatetime
        $this->modifieddatetime = new DbField('view_barcode_ivf', 'view_barcode_ivf', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, false, '`modifieddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifieddatetime->Sortable = true; // Allow sort
        $this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['modifieddatetime'] = &$this->modifieddatetime;

        // malepropic
        $this->malepropic = new DbField('view_barcode_ivf', 'view_barcode_ivf', 'x_malepropic', 'malepropic', '`malepropic`', '`malepropic`', 201, 450, -1, false, '`malepropic`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->malepropic->Sortable = true; // Allow sort
        $this->Fields['malepropic'] = &$this->malepropic;

        // femalepropic
        $this->femalepropic = new DbField('view_barcode_ivf', 'view_barcode_ivf', 'x_femalepropic', 'femalepropic', '`femalepropic`', '`femalepropic`', 201, 450, -1, false, '`femalepropic`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->femalepropic->Sortable = true; // Allow sort
        $this->Fields['femalepropic'] = &$this->femalepropic;

        // HusbandEducation
        $this->HusbandEducation = new DbField('view_barcode_ivf', 'view_barcode_ivf', 'x_HusbandEducation', 'HusbandEducation', '`HusbandEducation`', '`HusbandEducation`', 200, 45, -1, false, '`HusbandEducation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HusbandEducation->Sortable = true; // Allow sort
        $this->Fields['HusbandEducation'] = &$this->HusbandEducation;

        // WifeEducation
        $this->WifeEducation = new DbField('view_barcode_ivf', 'view_barcode_ivf', 'x_WifeEducation', 'WifeEducation', '`WifeEducation`', '`WifeEducation`', 200, 45, -1, false, '`WifeEducation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->WifeEducation->Sortable = true; // Allow sort
        $this->Fields['WifeEducation'] = &$this->WifeEducation;

        // HusbandWorkHours
        $this->HusbandWorkHours = new DbField('view_barcode_ivf', 'view_barcode_ivf', 'x_HusbandWorkHours', 'HusbandWorkHours', '`HusbandWorkHours`', '`HusbandWorkHours`', 200, 45, -1, false, '`HusbandWorkHours`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HusbandWorkHours->Sortable = true; // Allow sort
        $this->Fields['HusbandWorkHours'] = &$this->HusbandWorkHours;

        // WifeWorkHours
        $this->WifeWorkHours = new DbField('view_barcode_ivf', 'view_barcode_ivf', 'x_WifeWorkHours', 'WifeWorkHours', '`WifeWorkHours`', '`WifeWorkHours`', 200, 45, -1, false, '`WifeWorkHours`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->WifeWorkHours->Sortable = true; // Allow sort
        $this->Fields['WifeWorkHours'] = &$this->WifeWorkHours;

        // PatientLanguage
        $this->PatientLanguage = new DbField('view_barcode_ivf', 'view_barcode_ivf', 'x_PatientLanguage', 'PatientLanguage', '`PatientLanguage`', '`PatientLanguage`', 200, 45, -1, false, '`PatientLanguage`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientLanguage->Sortable = true; // Allow sort
        $this->Fields['PatientLanguage'] = &$this->PatientLanguage;

        // ReferedBy
        $this->ReferedBy = new DbField('view_barcode_ivf', 'view_barcode_ivf', 'x_ReferedBy', 'ReferedBy', '`ReferedBy`', '`ReferedBy`', 200, 45, -1, false, '`ReferedBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReferedBy->Sortable = true; // Allow sort
        $this->Fields['ReferedBy'] = &$this->ReferedBy;

        // ReferPhNo
        $this->ReferPhNo = new DbField('view_barcode_ivf', 'view_barcode_ivf', 'x_ReferPhNo', 'ReferPhNo', '`ReferPhNo`', '`ReferPhNo`', 200, 45, -1, false, '`ReferPhNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReferPhNo->Sortable = true; // Allow sort
        $this->Fields['ReferPhNo'] = &$this->ReferPhNo;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_barcode_ivf`";
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
        $this->_Barcode->DbValue = $row['Barcode'];
        $this->CoupleID->DbValue = $row['CoupleID'];
        $this->PatientName->DbValue = $row['PatientName'];
        $this->PatientID->DbValue = $row['PatientID'];
        $this->PartnerName->DbValue = $row['PartnerName'];
        $this->PartnerID->DbValue = $row['PartnerID'];
        $this->WifeCell->DbValue = $row['WifeCell'];
        $this->HusbandCell->DbValue = $row['HusbandCell'];
        $this->WifeEmail->DbValue = $row['WifeEmail'];
        $this->HusbandEmail->DbValue = $row['HusbandEmail'];
        $this->ARTCYCLE->DbValue = $row['ARTCYCLE'];
        $this->RESULT->DbValue = $row['RESULT'];
        $this->HospID->DbValue = $row['HospID'];
        $this->DrID->DbValue = $row['DrID'];
        $this->DrDepartment->DbValue = $row['DrDepartment'];
        $this->Doctor->DbValue = $row['Doctor'];
        $this->Male->DbValue = $row['Male'];
        $this->Female->DbValue = $row['Female'];
        $this->status->DbValue = $row['status'];
        $this->createdby->DbValue = $row['createdby'];
        $this->createddatetime->DbValue = $row['createddatetime'];
        $this->modifiedby->DbValue = $row['modifiedby'];
        $this->modifieddatetime->DbValue = $row['modifieddatetime'];
        $this->malepropic->DbValue = $row['malepropic'];
        $this->femalepropic->DbValue = $row['femalepropic'];
        $this->HusbandEducation->DbValue = $row['HusbandEducation'];
        $this->WifeEducation->DbValue = $row['WifeEducation'];
        $this->HusbandWorkHours->DbValue = $row['HusbandWorkHours'];
        $this->WifeWorkHours->DbValue = $row['WifeWorkHours'];
        $this->PatientLanguage->DbValue = $row['PatientLanguage'];
        $this->ReferedBy->DbValue = $row['ReferedBy'];
        $this->ReferPhNo->DbValue = $row['ReferPhNo'];
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
        $name = PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL");
        // Get referer URL automatically
        if (ReferUrl() != "" && ReferPageName() != CurrentPageName() && ReferPageName() != "login") { // Referer not same page or login page
            $_SESSION[$name] = ReferUrl(); // Save to Session
        }
        if (@$_SESSION[$name] != "") {
            return $_SESSION[$name];
        } else {
            return GetUrl("ViewBarcodeIvfList");
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
        if ($pageName == "ViewBarcodeIvfView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewBarcodeIvfEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewBarcodeIvfAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewBarcodeIvfList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewBarcodeIvfView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewBarcodeIvfView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewBarcodeIvfAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewBarcodeIvfAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewBarcodeIvfEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewBarcodeIvfAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewBarcodeIvfDelete", $this->getUrlParm());
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
        $this->_Barcode->setDbValue($row['Barcode']);
        $this->CoupleID->setDbValue($row['CoupleID']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->PatientID->setDbValue($row['PatientID']);
        $this->PartnerName->setDbValue($row['PartnerName']);
        $this->PartnerID->setDbValue($row['PartnerID']);
        $this->WifeCell->setDbValue($row['WifeCell']);
        $this->HusbandCell->setDbValue($row['HusbandCell']);
        $this->WifeEmail->setDbValue($row['WifeEmail']);
        $this->HusbandEmail->setDbValue($row['HusbandEmail']);
        $this->ARTCYCLE->setDbValue($row['ARTCYCLE']);
        $this->RESULT->setDbValue($row['RESULT']);
        $this->HospID->setDbValue($row['HospID']);
        $this->DrID->setDbValue($row['DrID']);
        $this->DrDepartment->setDbValue($row['DrDepartment']);
        $this->Doctor->setDbValue($row['Doctor']);
        $this->Male->setDbValue($row['Male']);
        $this->Female->setDbValue($row['Female']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->malepropic->setDbValue($row['malepropic']);
        $this->femalepropic->setDbValue($row['femalepropic']);
        $this->HusbandEducation->setDbValue($row['HusbandEducation']);
        $this->WifeEducation->setDbValue($row['WifeEducation']);
        $this->HusbandWorkHours->setDbValue($row['HusbandWorkHours']);
        $this->WifeWorkHours->setDbValue($row['WifeWorkHours']);
        $this->PatientLanguage->setDbValue($row['PatientLanguage']);
        $this->ReferedBy->setDbValue($row['ReferedBy']);
        $this->ReferPhNo->setDbValue($row['ReferPhNo']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // Barcode

        // CoupleID

        // PatientName

        // PatientID

        // PartnerName

        // PartnerID

        // WifeCell

        // HusbandCell

        // WifeEmail

        // HusbandEmail

        // ARTCYCLE

        // RESULT

        // HospID

        // DrID

        // DrDepartment

        // Doctor

        // Male

        // Female

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // malepropic

        // femalepropic

        // HusbandEducation

        // WifeEducation

        // HusbandWorkHours

        // WifeWorkHours

        // PatientLanguage

        // ReferedBy

        // ReferPhNo

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // Barcode
        $this->_Barcode->ViewValue = $this->_Barcode->CurrentValue;
        $this->_Barcode->ViewCustomAttributes = "";

        // CoupleID
        $this->CoupleID->ViewValue = $this->CoupleID->CurrentValue;
        $this->CoupleID->ViewCustomAttributes = "";

        // PatientName
        $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
        $this->PatientName->ViewCustomAttributes = "";

        // PatientID
        $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
        $this->PatientID->ViewCustomAttributes = "";

        // PartnerName
        $this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
        $this->PartnerName->ViewCustomAttributes = "";

        // PartnerID
        $this->PartnerID->ViewValue = $this->PartnerID->CurrentValue;
        $this->PartnerID->ViewCustomAttributes = "";

        // WifeCell
        $this->WifeCell->ViewValue = $this->WifeCell->CurrentValue;
        $this->WifeCell->ViewCustomAttributes = "";

        // HusbandCell
        $this->HusbandCell->ViewValue = $this->HusbandCell->CurrentValue;
        $this->HusbandCell->ViewCustomAttributes = "";

        // WifeEmail
        $this->WifeEmail->ViewValue = $this->WifeEmail->CurrentValue;
        $this->WifeEmail->ViewCustomAttributes = "";

        // HusbandEmail
        $this->HusbandEmail->ViewValue = $this->HusbandEmail->CurrentValue;
        $this->HusbandEmail->ViewCustomAttributes = "";

        // ARTCYCLE
        $this->ARTCYCLE->ViewValue = $this->ARTCYCLE->CurrentValue;
        $this->ARTCYCLE->ViewCustomAttributes = "";

        // RESULT
        $this->RESULT->ViewValue = $this->RESULT->CurrentValue;
        $this->RESULT->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

        // DrID
        $this->DrID->ViewValue = $this->DrID->CurrentValue;
        $this->DrID->ViewValue = FormatNumber($this->DrID->ViewValue, 0, -2, -2, -2);
        $this->DrID->ViewCustomAttributes = "";

        // DrDepartment
        $this->DrDepartment->ViewValue = $this->DrDepartment->CurrentValue;
        $this->DrDepartment->ViewCustomAttributes = "";

        // Doctor
        $this->Doctor->ViewValue = $this->Doctor->CurrentValue;
        $this->Doctor->ViewCustomAttributes = "";

        // Male
        $this->Male->ViewValue = $this->Male->CurrentValue;
        $this->Male->ViewValue = FormatNumber($this->Male->ViewValue, 0, -2, -2, -2);
        $this->Male->ViewCustomAttributes = "";

        // Female
        $this->Female->ViewValue = $this->Female->CurrentValue;
        $this->Female->ViewValue = FormatNumber($this->Female->ViewValue, 0, -2, -2, -2);
        $this->Female->ViewCustomAttributes = "";

        // status
        $this->status->ViewValue = $this->status->CurrentValue;
        $this->status->ViewValue = FormatNumber($this->status->ViewValue, 0, -2, -2, -2);
        $this->status->ViewCustomAttributes = "";

        // createdby
        $this->createdby->ViewValue = $this->createdby->CurrentValue;
        $this->createdby->ViewValue = FormatNumber($this->createdby->ViewValue, 0, -2, -2, -2);
        $this->createdby->ViewCustomAttributes = "";

        // createddatetime
        $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
        $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
        $this->createddatetime->ViewCustomAttributes = "";

        // modifiedby
        $this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
        $this->modifiedby->ViewValue = FormatNumber($this->modifiedby->ViewValue, 0, -2, -2, -2);
        $this->modifiedby->ViewCustomAttributes = "";

        // modifieddatetime
        $this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
        $this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
        $this->modifieddatetime->ViewCustomAttributes = "";

        // malepropic
        $this->malepropic->ViewValue = $this->malepropic->CurrentValue;
        $this->malepropic->ViewCustomAttributes = "";

        // femalepropic
        $this->femalepropic->ViewValue = $this->femalepropic->CurrentValue;
        $this->femalepropic->ViewCustomAttributes = "";

        // HusbandEducation
        $this->HusbandEducation->ViewValue = $this->HusbandEducation->CurrentValue;
        $this->HusbandEducation->ViewCustomAttributes = "";

        // WifeEducation
        $this->WifeEducation->ViewValue = $this->WifeEducation->CurrentValue;
        $this->WifeEducation->ViewCustomAttributes = "";

        // HusbandWorkHours
        $this->HusbandWorkHours->ViewValue = $this->HusbandWorkHours->CurrentValue;
        $this->HusbandWorkHours->ViewCustomAttributes = "";

        // WifeWorkHours
        $this->WifeWorkHours->ViewValue = $this->WifeWorkHours->CurrentValue;
        $this->WifeWorkHours->ViewCustomAttributes = "";

        // PatientLanguage
        $this->PatientLanguage->ViewValue = $this->PatientLanguage->CurrentValue;
        $this->PatientLanguage->ViewCustomAttributes = "";

        // ReferedBy
        $this->ReferedBy->ViewValue = $this->ReferedBy->CurrentValue;
        $this->ReferedBy->ViewCustomAttributes = "";

        // ReferPhNo
        $this->ReferPhNo->ViewValue = $this->ReferPhNo->CurrentValue;
        $this->ReferPhNo->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // Barcode
        $this->_Barcode->LinkCustomAttributes = "";
        $this->_Barcode->HrefValue = "";
        $this->_Barcode->TooltipValue = "";

        // CoupleID
        $this->CoupleID->LinkCustomAttributes = "";
        $this->CoupleID->HrefValue = "";
        $this->CoupleID->TooltipValue = "";

        // PatientName
        $this->PatientName->LinkCustomAttributes = "";
        $this->PatientName->HrefValue = "";
        $this->PatientName->TooltipValue = "";

        // PatientID
        $this->PatientID->LinkCustomAttributes = "";
        $this->PatientID->HrefValue = "";
        $this->PatientID->TooltipValue = "";

        // PartnerName
        $this->PartnerName->LinkCustomAttributes = "";
        $this->PartnerName->HrefValue = "";
        $this->PartnerName->TooltipValue = "";

        // PartnerID
        $this->PartnerID->LinkCustomAttributes = "";
        $this->PartnerID->HrefValue = "";
        $this->PartnerID->TooltipValue = "";

        // WifeCell
        $this->WifeCell->LinkCustomAttributes = "";
        $this->WifeCell->HrefValue = "";
        $this->WifeCell->TooltipValue = "";

        // HusbandCell
        $this->HusbandCell->LinkCustomAttributes = "";
        $this->HusbandCell->HrefValue = "";
        $this->HusbandCell->TooltipValue = "";

        // WifeEmail
        $this->WifeEmail->LinkCustomAttributes = "";
        $this->WifeEmail->HrefValue = "";
        $this->WifeEmail->TooltipValue = "";

        // HusbandEmail
        $this->HusbandEmail->LinkCustomAttributes = "";
        $this->HusbandEmail->HrefValue = "";
        $this->HusbandEmail->TooltipValue = "";

        // ARTCYCLE
        $this->ARTCYCLE->LinkCustomAttributes = "";
        $this->ARTCYCLE->HrefValue = "";
        $this->ARTCYCLE->TooltipValue = "";

        // RESULT
        $this->RESULT->LinkCustomAttributes = "";
        $this->RESULT->HrefValue = "";
        $this->RESULT->TooltipValue = "";

        // HospID
        $this->HospID->LinkCustomAttributes = "";
        $this->HospID->HrefValue = "";
        $this->HospID->TooltipValue = "";

        // DrID
        $this->DrID->LinkCustomAttributes = "";
        $this->DrID->HrefValue = "";
        $this->DrID->TooltipValue = "";

        // DrDepartment
        $this->DrDepartment->LinkCustomAttributes = "";
        $this->DrDepartment->HrefValue = "";
        $this->DrDepartment->TooltipValue = "";

        // Doctor
        $this->Doctor->LinkCustomAttributes = "";
        $this->Doctor->HrefValue = "";
        $this->Doctor->TooltipValue = "";

        // Male
        $this->Male->LinkCustomAttributes = "";
        $this->Male->HrefValue = "";
        $this->Male->TooltipValue = "";

        // Female
        $this->Female->LinkCustomAttributes = "";
        $this->Female->HrefValue = "";
        $this->Female->TooltipValue = "";

        // status
        $this->status->LinkCustomAttributes = "";
        $this->status->HrefValue = "";
        $this->status->TooltipValue = "";

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

        // malepropic
        $this->malepropic->LinkCustomAttributes = "";
        $this->malepropic->HrefValue = "";
        $this->malepropic->TooltipValue = "";

        // femalepropic
        $this->femalepropic->LinkCustomAttributes = "";
        $this->femalepropic->HrefValue = "";
        $this->femalepropic->TooltipValue = "";

        // HusbandEducation
        $this->HusbandEducation->LinkCustomAttributes = "";
        $this->HusbandEducation->HrefValue = "";
        $this->HusbandEducation->TooltipValue = "";

        // WifeEducation
        $this->WifeEducation->LinkCustomAttributes = "";
        $this->WifeEducation->HrefValue = "";
        $this->WifeEducation->TooltipValue = "";

        // HusbandWorkHours
        $this->HusbandWorkHours->LinkCustomAttributes = "";
        $this->HusbandWorkHours->HrefValue = "";
        $this->HusbandWorkHours->TooltipValue = "";

        // WifeWorkHours
        $this->WifeWorkHours->LinkCustomAttributes = "";
        $this->WifeWorkHours->HrefValue = "";
        $this->WifeWorkHours->TooltipValue = "";

        // PatientLanguage
        $this->PatientLanguage->LinkCustomAttributes = "";
        $this->PatientLanguage->HrefValue = "";
        $this->PatientLanguage->TooltipValue = "";

        // ReferedBy
        $this->ReferedBy->LinkCustomAttributes = "";
        $this->ReferedBy->HrefValue = "";
        $this->ReferedBy->TooltipValue = "";

        // ReferPhNo
        $this->ReferPhNo->LinkCustomAttributes = "";
        $this->ReferPhNo->HrefValue = "";
        $this->ReferPhNo->TooltipValue = "";

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

        // Barcode
        $this->_Barcode->EditAttrs["class"] = "form-control";
        $this->_Barcode->EditCustomAttributes = "";
        if (!$this->_Barcode->Raw) {
            $this->_Barcode->CurrentValue = HtmlDecode($this->_Barcode->CurrentValue);
        }
        $this->_Barcode->EditValue = $this->_Barcode->CurrentValue;
        $this->_Barcode->PlaceHolder = RemoveHtml($this->_Barcode->caption());

        // CoupleID
        $this->CoupleID->EditAttrs["class"] = "form-control";
        $this->CoupleID->EditCustomAttributes = "";
        if (!$this->CoupleID->Raw) {
            $this->CoupleID->CurrentValue = HtmlDecode($this->CoupleID->CurrentValue);
        }
        $this->CoupleID->EditValue = $this->CoupleID->CurrentValue;
        $this->CoupleID->PlaceHolder = RemoveHtml($this->CoupleID->caption());

        // PatientName
        $this->PatientName->EditAttrs["class"] = "form-control";
        $this->PatientName->EditCustomAttributes = "";
        if (!$this->PatientName->Raw) {
            $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
        }
        $this->PatientName->EditValue = $this->PatientName->CurrentValue;
        $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

        // PatientID
        $this->PatientID->EditAttrs["class"] = "form-control";
        $this->PatientID->EditCustomAttributes = "";
        if (!$this->PatientID->Raw) {
            $this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
        }
        $this->PatientID->EditValue = $this->PatientID->CurrentValue;
        $this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

        // PartnerName
        $this->PartnerName->EditAttrs["class"] = "form-control";
        $this->PartnerName->EditCustomAttributes = "";
        if (!$this->PartnerName->Raw) {
            $this->PartnerName->CurrentValue = HtmlDecode($this->PartnerName->CurrentValue);
        }
        $this->PartnerName->EditValue = $this->PartnerName->CurrentValue;
        $this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

        // PartnerID
        $this->PartnerID->EditAttrs["class"] = "form-control";
        $this->PartnerID->EditCustomAttributes = "";
        if (!$this->PartnerID->Raw) {
            $this->PartnerID->CurrentValue = HtmlDecode($this->PartnerID->CurrentValue);
        }
        $this->PartnerID->EditValue = $this->PartnerID->CurrentValue;
        $this->PartnerID->PlaceHolder = RemoveHtml($this->PartnerID->caption());

        // WifeCell
        $this->WifeCell->EditAttrs["class"] = "form-control";
        $this->WifeCell->EditCustomAttributes = "";
        if (!$this->WifeCell->Raw) {
            $this->WifeCell->CurrentValue = HtmlDecode($this->WifeCell->CurrentValue);
        }
        $this->WifeCell->EditValue = $this->WifeCell->CurrentValue;
        $this->WifeCell->PlaceHolder = RemoveHtml($this->WifeCell->caption());

        // HusbandCell
        $this->HusbandCell->EditAttrs["class"] = "form-control";
        $this->HusbandCell->EditCustomAttributes = "";
        if (!$this->HusbandCell->Raw) {
            $this->HusbandCell->CurrentValue = HtmlDecode($this->HusbandCell->CurrentValue);
        }
        $this->HusbandCell->EditValue = $this->HusbandCell->CurrentValue;
        $this->HusbandCell->PlaceHolder = RemoveHtml($this->HusbandCell->caption());

        // WifeEmail
        $this->WifeEmail->EditAttrs["class"] = "form-control";
        $this->WifeEmail->EditCustomAttributes = "";
        if (!$this->WifeEmail->Raw) {
            $this->WifeEmail->CurrentValue = HtmlDecode($this->WifeEmail->CurrentValue);
        }
        $this->WifeEmail->EditValue = $this->WifeEmail->CurrentValue;
        $this->WifeEmail->PlaceHolder = RemoveHtml($this->WifeEmail->caption());

        // HusbandEmail
        $this->HusbandEmail->EditAttrs["class"] = "form-control";
        $this->HusbandEmail->EditCustomAttributes = "";
        if (!$this->HusbandEmail->Raw) {
            $this->HusbandEmail->CurrentValue = HtmlDecode($this->HusbandEmail->CurrentValue);
        }
        $this->HusbandEmail->EditValue = $this->HusbandEmail->CurrentValue;
        $this->HusbandEmail->PlaceHolder = RemoveHtml($this->HusbandEmail->caption());

        // ARTCYCLE
        $this->ARTCYCLE->EditAttrs["class"] = "form-control";
        $this->ARTCYCLE->EditCustomAttributes = "";
        if (!$this->ARTCYCLE->Raw) {
            $this->ARTCYCLE->CurrentValue = HtmlDecode($this->ARTCYCLE->CurrentValue);
        }
        $this->ARTCYCLE->EditValue = $this->ARTCYCLE->CurrentValue;
        $this->ARTCYCLE->PlaceHolder = RemoveHtml($this->ARTCYCLE->caption());

        // RESULT
        $this->RESULT->EditAttrs["class"] = "form-control";
        $this->RESULT->EditCustomAttributes = "";
        if (!$this->RESULT->Raw) {
            $this->RESULT->CurrentValue = HtmlDecode($this->RESULT->CurrentValue);
        }
        $this->RESULT->EditValue = $this->RESULT->CurrentValue;
        $this->RESULT->PlaceHolder = RemoveHtml($this->RESULT->caption());

        // HospID
        $this->HospID->EditAttrs["class"] = "form-control";
        $this->HospID->EditCustomAttributes = "";
        $this->HospID->EditValue = $this->HospID->CurrentValue;
        $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

        // DrID
        $this->DrID->EditAttrs["class"] = "form-control";
        $this->DrID->EditCustomAttributes = "";
        $this->DrID->EditValue = $this->DrID->CurrentValue;
        $this->DrID->PlaceHolder = RemoveHtml($this->DrID->caption());

        // DrDepartment
        $this->DrDepartment->EditAttrs["class"] = "form-control";
        $this->DrDepartment->EditCustomAttributes = "";
        if (!$this->DrDepartment->Raw) {
            $this->DrDepartment->CurrentValue = HtmlDecode($this->DrDepartment->CurrentValue);
        }
        $this->DrDepartment->EditValue = $this->DrDepartment->CurrentValue;
        $this->DrDepartment->PlaceHolder = RemoveHtml($this->DrDepartment->caption());

        // Doctor
        $this->Doctor->EditAttrs["class"] = "form-control";
        $this->Doctor->EditCustomAttributes = "";
        if (!$this->Doctor->Raw) {
            $this->Doctor->CurrentValue = HtmlDecode($this->Doctor->CurrentValue);
        }
        $this->Doctor->EditValue = $this->Doctor->CurrentValue;
        $this->Doctor->PlaceHolder = RemoveHtml($this->Doctor->caption());

        // Male
        $this->Male->EditAttrs["class"] = "form-control";
        $this->Male->EditCustomAttributes = "";
        $this->Male->EditValue = $this->Male->CurrentValue;
        $this->Male->PlaceHolder = RemoveHtml($this->Male->caption());

        // Female
        $this->Female->EditAttrs["class"] = "form-control";
        $this->Female->EditCustomAttributes = "";
        $this->Female->EditValue = $this->Female->CurrentValue;
        $this->Female->PlaceHolder = RemoveHtml($this->Female->caption());

        // status
        $this->status->EditAttrs["class"] = "form-control";
        $this->status->EditCustomAttributes = "";
        $this->status->EditValue = $this->status->CurrentValue;
        $this->status->PlaceHolder = RemoveHtml($this->status->caption());

        // createdby
        $this->createdby->EditAttrs["class"] = "form-control";
        $this->createdby->EditCustomAttributes = "";
        $this->createdby->EditValue = $this->createdby->CurrentValue;
        $this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

        // createddatetime
        $this->createddatetime->EditAttrs["class"] = "form-control";
        $this->createddatetime->EditCustomAttributes = "";
        $this->createddatetime->EditValue = FormatDateTime($this->createddatetime->CurrentValue, 8);
        $this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

        // modifiedby
        $this->modifiedby->EditAttrs["class"] = "form-control";
        $this->modifiedby->EditCustomAttributes = "";
        $this->modifiedby->EditValue = $this->modifiedby->CurrentValue;
        $this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

        // modifieddatetime
        $this->modifieddatetime->EditAttrs["class"] = "form-control";
        $this->modifieddatetime->EditCustomAttributes = "";
        $this->modifieddatetime->EditValue = FormatDateTime($this->modifieddatetime->CurrentValue, 8);
        $this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

        // malepropic
        $this->malepropic->EditAttrs["class"] = "form-control";
        $this->malepropic->EditCustomAttributes = "";
        $this->malepropic->EditValue = $this->malepropic->CurrentValue;
        $this->malepropic->PlaceHolder = RemoveHtml($this->malepropic->caption());

        // femalepropic
        $this->femalepropic->EditAttrs["class"] = "form-control";
        $this->femalepropic->EditCustomAttributes = "";
        $this->femalepropic->EditValue = $this->femalepropic->CurrentValue;
        $this->femalepropic->PlaceHolder = RemoveHtml($this->femalepropic->caption());

        // HusbandEducation
        $this->HusbandEducation->EditAttrs["class"] = "form-control";
        $this->HusbandEducation->EditCustomAttributes = "";
        if (!$this->HusbandEducation->Raw) {
            $this->HusbandEducation->CurrentValue = HtmlDecode($this->HusbandEducation->CurrentValue);
        }
        $this->HusbandEducation->EditValue = $this->HusbandEducation->CurrentValue;
        $this->HusbandEducation->PlaceHolder = RemoveHtml($this->HusbandEducation->caption());

        // WifeEducation
        $this->WifeEducation->EditAttrs["class"] = "form-control";
        $this->WifeEducation->EditCustomAttributes = "";
        if (!$this->WifeEducation->Raw) {
            $this->WifeEducation->CurrentValue = HtmlDecode($this->WifeEducation->CurrentValue);
        }
        $this->WifeEducation->EditValue = $this->WifeEducation->CurrentValue;
        $this->WifeEducation->PlaceHolder = RemoveHtml($this->WifeEducation->caption());

        // HusbandWorkHours
        $this->HusbandWorkHours->EditAttrs["class"] = "form-control";
        $this->HusbandWorkHours->EditCustomAttributes = "";
        if (!$this->HusbandWorkHours->Raw) {
            $this->HusbandWorkHours->CurrentValue = HtmlDecode($this->HusbandWorkHours->CurrentValue);
        }
        $this->HusbandWorkHours->EditValue = $this->HusbandWorkHours->CurrentValue;
        $this->HusbandWorkHours->PlaceHolder = RemoveHtml($this->HusbandWorkHours->caption());

        // WifeWorkHours
        $this->WifeWorkHours->EditAttrs["class"] = "form-control";
        $this->WifeWorkHours->EditCustomAttributes = "";
        if (!$this->WifeWorkHours->Raw) {
            $this->WifeWorkHours->CurrentValue = HtmlDecode($this->WifeWorkHours->CurrentValue);
        }
        $this->WifeWorkHours->EditValue = $this->WifeWorkHours->CurrentValue;
        $this->WifeWorkHours->PlaceHolder = RemoveHtml($this->WifeWorkHours->caption());

        // PatientLanguage
        $this->PatientLanguage->EditAttrs["class"] = "form-control";
        $this->PatientLanguage->EditCustomAttributes = "";
        if (!$this->PatientLanguage->Raw) {
            $this->PatientLanguage->CurrentValue = HtmlDecode($this->PatientLanguage->CurrentValue);
        }
        $this->PatientLanguage->EditValue = $this->PatientLanguage->CurrentValue;
        $this->PatientLanguage->PlaceHolder = RemoveHtml($this->PatientLanguage->caption());

        // ReferedBy
        $this->ReferedBy->EditAttrs["class"] = "form-control";
        $this->ReferedBy->EditCustomAttributes = "";
        if (!$this->ReferedBy->Raw) {
            $this->ReferedBy->CurrentValue = HtmlDecode($this->ReferedBy->CurrentValue);
        }
        $this->ReferedBy->EditValue = $this->ReferedBy->CurrentValue;
        $this->ReferedBy->PlaceHolder = RemoveHtml($this->ReferedBy->caption());

        // ReferPhNo
        $this->ReferPhNo->EditAttrs["class"] = "form-control";
        $this->ReferPhNo->EditCustomAttributes = "";
        if (!$this->ReferPhNo->Raw) {
            $this->ReferPhNo->CurrentValue = HtmlDecode($this->ReferPhNo->CurrentValue);
        }
        $this->ReferPhNo->EditValue = $this->ReferPhNo->CurrentValue;
        $this->ReferPhNo->PlaceHolder = RemoveHtml($this->ReferPhNo->caption());

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
                    $doc->exportCaption($this->_Barcode);
                    $doc->exportCaption($this->CoupleID);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->PatientID);
                    $doc->exportCaption($this->PartnerName);
                    $doc->exportCaption($this->PartnerID);
                    $doc->exportCaption($this->WifeCell);
                    $doc->exportCaption($this->HusbandCell);
                    $doc->exportCaption($this->WifeEmail);
                    $doc->exportCaption($this->HusbandEmail);
                    $doc->exportCaption($this->ARTCYCLE);
                    $doc->exportCaption($this->RESULT);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->DrID);
                    $doc->exportCaption($this->DrDepartment);
                    $doc->exportCaption($this->Doctor);
                    $doc->exportCaption($this->Male);
                    $doc->exportCaption($this->Female);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->malepropic);
                    $doc->exportCaption($this->femalepropic);
                    $doc->exportCaption($this->HusbandEducation);
                    $doc->exportCaption($this->WifeEducation);
                    $doc->exportCaption($this->HusbandWorkHours);
                    $doc->exportCaption($this->WifeWorkHours);
                    $doc->exportCaption($this->PatientLanguage);
                    $doc->exportCaption($this->ReferedBy);
                    $doc->exportCaption($this->ReferPhNo);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->_Barcode);
                    $doc->exportCaption($this->CoupleID);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->PatientID);
                    $doc->exportCaption($this->PartnerName);
                    $doc->exportCaption($this->PartnerID);
                    $doc->exportCaption($this->WifeCell);
                    $doc->exportCaption($this->HusbandCell);
                    $doc->exportCaption($this->WifeEmail);
                    $doc->exportCaption($this->HusbandEmail);
                    $doc->exportCaption($this->ARTCYCLE);
                    $doc->exportCaption($this->RESULT);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->DrID);
                    $doc->exportCaption($this->DrDepartment);
                    $doc->exportCaption($this->Doctor);
                    $doc->exportCaption($this->Male);
                    $doc->exportCaption($this->Female);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->HusbandEducation);
                    $doc->exportCaption($this->WifeEducation);
                    $doc->exportCaption($this->HusbandWorkHours);
                    $doc->exportCaption($this->WifeWorkHours);
                    $doc->exportCaption($this->PatientLanguage);
                    $doc->exportCaption($this->ReferedBy);
                    $doc->exportCaption($this->ReferPhNo);
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
                        $doc->exportField($this->_Barcode);
                        $doc->exportField($this->CoupleID);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->PatientID);
                        $doc->exportField($this->PartnerName);
                        $doc->exportField($this->PartnerID);
                        $doc->exportField($this->WifeCell);
                        $doc->exportField($this->HusbandCell);
                        $doc->exportField($this->WifeEmail);
                        $doc->exportField($this->HusbandEmail);
                        $doc->exportField($this->ARTCYCLE);
                        $doc->exportField($this->RESULT);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->DrID);
                        $doc->exportField($this->DrDepartment);
                        $doc->exportField($this->Doctor);
                        $doc->exportField($this->Male);
                        $doc->exportField($this->Female);
                        $doc->exportField($this->status);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->malepropic);
                        $doc->exportField($this->femalepropic);
                        $doc->exportField($this->HusbandEducation);
                        $doc->exportField($this->WifeEducation);
                        $doc->exportField($this->HusbandWorkHours);
                        $doc->exportField($this->WifeWorkHours);
                        $doc->exportField($this->PatientLanguage);
                        $doc->exportField($this->ReferedBy);
                        $doc->exportField($this->ReferPhNo);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->_Barcode);
                        $doc->exportField($this->CoupleID);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->PatientID);
                        $doc->exportField($this->PartnerName);
                        $doc->exportField($this->PartnerID);
                        $doc->exportField($this->WifeCell);
                        $doc->exportField($this->HusbandCell);
                        $doc->exportField($this->WifeEmail);
                        $doc->exportField($this->HusbandEmail);
                        $doc->exportField($this->ARTCYCLE);
                        $doc->exportField($this->RESULT);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->DrID);
                        $doc->exportField($this->DrDepartment);
                        $doc->exportField($this->Doctor);
                        $doc->exportField($this->Male);
                        $doc->exportField($this->Female);
                        $doc->exportField($this->status);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->HusbandEducation);
                        $doc->exportField($this->WifeEducation);
                        $doc->exportField($this->HusbandWorkHours);
                        $doc->exportField($this->WifeWorkHours);
                        $doc->exportField($this->PatientLanguage);
                        $doc->exportField($this->ReferedBy);
                        $doc->exportField($this->ReferPhNo);
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
