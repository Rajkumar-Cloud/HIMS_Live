<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for patient_room
 */
class PatientRoom extends DbTable
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
    public $mrnno;
    public $PatientName;
    public $Gender;
    public $RoomID;
    public $RoomNo;
    public $RoomType;
    public $SharingRoom;
    public $Amount;
    public $Startdatetime;
    public $Enddatetime;
    public $DaysHours;
    public $Days;
    public $Hours;
    public $TotalAmount;
    public $PatID;
    public $MobileNumber;
    public $HospID;
    public $status;
    public $createdby;
    public $createddatetime;
    public $modifiedby;
    public $modifieddatetime;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'patient_room';
        $this->TableName = 'patient_room';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`patient_room`";
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
        $this->id = new DbField('patient_room', 'patient_room', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // Reception
        $this->Reception = new DbField('patient_room', 'patient_room', 'x_Reception', 'Reception', '`Reception`', '`Reception`', 3, 11, -1, false, '`Reception`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Reception->IsForeignKey = true; // Foreign key field
        $this->Reception->Sortable = true; // Allow sort
        $this->Reception->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Reception->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Reception->Lookup = new Lookup('Reception', 'ip_admission', false, 'id', ["PatientID","patient_name","mobileno","mrnNo"], [], [], [], [], [], [], '', '');
        $this->Reception->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Reception->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Reception->Param, "CustomMsg");
        $this->Fields['Reception'] = &$this->Reception;

        // PatientId
        $this->PatientId = new DbField('patient_room', 'patient_room', 'x_PatientId', 'PatientId', '`PatientId`', '`PatientId`', 3, 11, -1, false, '`PatientId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientId->Sortable = true; // Allow sort
        $this->PatientId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->PatientId->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientId->Param, "CustomMsg");
        $this->Fields['PatientId'] = &$this->PatientId;

        // mrnno
        $this->mrnno = new DbField('patient_room', 'patient_room', 'x_mrnno', 'mrnno', '`mrnno`', '`mrnno`', 200, 45, -1, false, '`mrnno`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->mrnno->IsForeignKey = true; // Foreign key field
        $this->mrnno->Sortable = true; // Allow sort
        $this->mrnno->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->mrnno->Param, "CustomMsg");
        $this->Fields['mrnno'] = &$this->mrnno;

        // PatientName
        $this->PatientName = new DbField('patient_room', 'patient_room', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, false, '`PatientName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientName->Sortable = true; // Allow sort
        $this->PatientName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientName->Param, "CustomMsg");
        $this->Fields['PatientName'] = &$this->PatientName;

        // Gender
        $this->Gender = new DbField('patient_room', 'patient_room', 'x_Gender', 'Gender', '`Gender`', '`Gender`', 200, 45, -1, false, '`Gender`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Gender->Sortable = true; // Allow sort
        $this->Gender->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Gender->Param, "CustomMsg");
        $this->Fields['Gender'] = &$this->Gender;

        // RoomID
        $this->RoomID = new DbField('patient_room', 'patient_room', 'x_RoomID', 'RoomID', '`RoomID`', '`RoomID`', 3, 11, -1, false, '`RoomID`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->RoomID->Sortable = true; // Allow sort
        $this->RoomID->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->RoomID->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->RoomID->Lookup = new Lookup('RoomID', 'room_master', false, 'id', ["RoomNo","RoomType","SharingRoom","Amount"], [], [], [], [], ["RoomNo","RoomType","SharingRoom","Amount"], ["x_RoomNo","x_RoomType","x_SharingRoom","x_Amount"], '', '');
        $this->RoomID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->RoomID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RoomID->Param, "CustomMsg");
        $this->Fields['RoomID'] = &$this->RoomID;

        // RoomNo
        $this->RoomNo = new DbField('patient_room', 'patient_room', 'x_RoomNo', 'RoomNo', '`RoomNo`', '`RoomNo`', 200, 45, -1, false, '`RoomNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RoomNo->Sortable = true; // Allow sort
        $this->RoomNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RoomNo->Param, "CustomMsg");
        $this->Fields['RoomNo'] = &$this->RoomNo;

        // RoomType
        $this->RoomType = new DbField('patient_room', 'patient_room', 'x_RoomType', 'RoomType', '`RoomType`', '`RoomType`', 200, 45, -1, false, '`RoomType`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RoomType->Sortable = true; // Allow sort
        $this->RoomType->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RoomType->Param, "CustomMsg");
        $this->Fields['RoomType'] = &$this->RoomType;

        // SharingRoom
        $this->SharingRoom = new DbField('patient_room', 'patient_room', 'x_SharingRoom', 'SharingRoom', '`SharingRoom`', '`SharingRoom`', 200, 45, -1, false, '`SharingRoom`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SharingRoom->Sortable = true; // Allow sort
        $this->SharingRoom->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SharingRoom->Param, "CustomMsg");
        $this->Fields['SharingRoom'] = &$this->SharingRoom;

        // Amount
        $this->Amount = new DbField('patient_room', 'patient_room', 'x_Amount', 'Amount', '`Amount`', '`Amount`', 131, 8, -1, false, '`Amount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Amount->Sortable = true; // Allow sort
        $this->Amount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Amount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Amount->Param, "CustomMsg");
        $this->Fields['Amount'] = &$this->Amount;

        // Startdatetime
        $this->Startdatetime = new DbField('patient_room', 'patient_room', 'x_Startdatetime', 'Startdatetime', '`Startdatetime`', CastDateFieldForLike("`Startdatetime`", 0, "DB"), 135, 19, 0, false, '`Startdatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Startdatetime->Sortable = true; // Allow sort
        $this->Startdatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Startdatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Startdatetime->Param, "CustomMsg");
        $this->Fields['Startdatetime'] = &$this->Startdatetime;

        // Enddatetime
        $this->Enddatetime = new DbField('patient_room', 'patient_room', 'x_Enddatetime', 'Enddatetime', '`Enddatetime`', CastDateFieldForLike("`Enddatetime`", 0, "DB"), 135, 19, 0, false, '`Enddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Enddatetime->Sortable = true; // Allow sort
        $this->Enddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Enddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Enddatetime->Param, "CustomMsg");
        $this->Fields['Enddatetime'] = &$this->Enddatetime;

        // DaysHours
        $this->DaysHours = new DbField('patient_room', 'patient_room', 'x_DaysHours', 'DaysHours', '`DaysHours`', '`DaysHours`', 200, 45, -1, false, '`DaysHours`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DaysHours->Sortable = true; // Allow sort
        $this->DaysHours->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DaysHours->Param, "CustomMsg");
        $this->Fields['DaysHours'] = &$this->DaysHours;

        // Days
        $this->Days = new DbField('patient_room', 'patient_room', 'x_Days', 'Days', '`Days`', '`Days`', 3, 11, -1, false, '`Days`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Days->Sortable = true; // Allow sort
        $this->Days->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Days->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Days->Param, "CustomMsg");
        $this->Fields['Days'] = &$this->Days;

        // Hours
        $this->Hours = new DbField('patient_room', 'patient_room', 'x_Hours', 'Hours', '`Hours`', '`Hours`', 3, 11, -1, false, '`Hours`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Hours->Sortable = true; // Allow sort
        $this->Hours->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Hours->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Hours->Param, "CustomMsg");
        $this->Fields['Hours'] = &$this->Hours;

        // TotalAmount
        $this->TotalAmount = new DbField('patient_room', 'patient_room', 'x_TotalAmount', 'TotalAmount', '`TotalAmount`', '`TotalAmount`', 131, 8, -1, false, '`TotalAmount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TotalAmount->Sortable = true; // Allow sort
        $this->TotalAmount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->TotalAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->TotalAmount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TotalAmount->Param, "CustomMsg");
        $this->Fields['TotalAmount'] = &$this->TotalAmount;

        // PatID
        $this->PatID = new DbField('patient_room', 'patient_room', 'x_PatID', 'PatID', '`PatID`', '`PatID`', 200, 45, -1, false, '`PatID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatID->IsForeignKey = true; // Foreign key field
        $this->PatID->Sortable = true; // Allow sort
        $this->PatID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatID->Param, "CustomMsg");
        $this->Fields['PatID'] = &$this->PatID;

        // MobileNumber
        $this->MobileNumber = new DbField('patient_room', 'patient_room', 'x_MobileNumber', 'MobileNumber', '`MobileNumber`', '`MobileNumber`', 200, 45, -1, false, '`MobileNumber`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MobileNumber->Sortable = true; // Allow sort
        $this->MobileNumber->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MobileNumber->Param, "CustomMsg");
        $this->Fields['MobileNumber'] = &$this->MobileNumber;

        // HospID
        $this->HospID = new DbField('patient_room', 'patient_room', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->HospID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospID->Param, "CustomMsg");
        $this->Fields['HospID'] = &$this->HospID;

        // status
        $this->status = new DbField('patient_room', 'patient_room', 'x_status', 'status', '`status`', '`status`', 3, 11, -1, false, '`status`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->status->Sortable = true; // Allow sort
        $this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->status->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->status->Param, "CustomMsg");
        $this->Fields['status'] = &$this->status;

        // createdby
        $this->createdby = new DbField('patient_room', 'patient_room', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, 11, -1, false, '`createdby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdby->Sortable = true; // Allow sort
        $this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->createdby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createdby->Param, "CustomMsg");
        $this->Fields['createdby'] = &$this->createdby;

        // createddatetime
        $this->createddatetime = new DbField('patient_room', 'patient_room', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, false, '`createddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddatetime->Sortable = true; // Allow sort
        $this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->createddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createddatetime->Param, "CustomMsg");
        $this->Fields['createddatetime'] = &$this->createddatetime;

        // modifiedby
        $this->modifiedby = new DbField('patient_room', 'patient_room', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, 11, -1, false, '`modifiedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifiedby->Sortable = true; // Allow sort
        $this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->modifiedby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifiedby->Param, "CustomMsg");
        $this->Fields['modifiedby'] = &$this->modifiedby;

        // modifieddatetime
        $this->modifieddatetime = new DbField('patient_room', 'patient_room', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, false, '`modifieddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifieddatetime->Sortable = true; // Allow sort
        $this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->modifieddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifieddatetime->Param, "CustomMsg");
        $this->Fields['modifieddatetime'] = &$this->modifieddatetime;
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
            if ($this->mrnno->getSessionValue() != "") {
                $masterFilter .= " AND " . GetForeignKeySql("`mrnNo`", $this->mrnno->getSessionValue(), DATATYPE_STRING, "DB");
            } else {
                return "";
            }
            if ($this->PatID->getSessionValue() != "") {
                $masterFilter .= " AND " . GetForeignKeySql("`patient_id`", $this->PatID->getSessionValue(), DATATYPE_NUMBER, "DB");
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
            if ($this->mrnno->getSessionValue() != "") {
                $detailFilter .= " AND " . GetForeignKeySql("`mrnno`", $this->mrnno->getSessionValue(), DATATYPE_STRING, "DB");
            } else {
                return "";
            }
            if ($this->PatID->getSessionValue() != "") {
                $detailFilter .= " AND " . GetForeignKeySql("`PatID`", $this->PatID->getSessionValue(), DATATYPE_STRING, "DB");
            } else {
                return "";
            }
        }
        return $detailFilter;
    }

    // Master filter
    public function sqlMasterFilter_ip_admission()
    {
        return "`id`=@id@ AND `mrnNo`='@mrnNo@' AND `patient_id`=@patient_id@";
    }
    // Detail filter
    public function sqlDetailFilter_ip_admission()
    {
        return "`Reception`=@Reception@ AND `mrnno`='@mrnno@' AND `PatID`='@PatID@'";
    }

    // Table level SQL
    public function getSqlFrom() // From
    {
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`patient_room`";
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
        $this->mrnno->DbValue = $row['mrnno'];
        $this->PatientName->DbValue = $row['PatientName'];
        $this->Gender->DbValue = $row['Gender'];
        $this->RoomID->DbValue = $row['RoomID'];
        $this->RoomNo->DbValue = $row['RoomNo'];
        $this->RoomType->DbValue = $row['RoomType'];
        $this->SharingRoom->DbValue = $row['SharingRoom'];
        $this->Amount->DbValue = $row['Amount'];
        $this->Startdatetime->DbValue = $row['Startdatetime'];
        $this->Enddatetime->DbValue = $row['Enddatetime'];
        $this->DaysHours->DbValue = $row['DaysHours'];
        $this->Days->DbValue = $row['Days'];
        $this->Hours->DbValue = $row['Hours'];
        $this->TotalAmount->DbValue = $row['TotalAmount'];
        $this->PatID->DbValue = $row['PatID'];
        $this->MobileNumber->DbValue = $row['MobileNumber'];
        $this->HospID->DbValue = $row['HospID'];
        $this->status->DbValue = $row['status'];
        $this->createdby->DbValue = $row['createdby'];
        $this->createddatetime->DbValue = $row['createddatetime'];
        $this->modifiedby->DbValue = $row['modifiedby'];
        $this->modifieddatetime->DbValue = $row['modifieddatetime'];
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
        return $_SESSION[$name] ?? GetUrl("PatientRoomList");
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
        if ($pageName == "PatientRoomView") {
            return $Language->phrase("View");
        } elseif ($pageName == "PatientRoomEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "PatientRoomAdd") {
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
                return "PatientRoomView";
            case Config("API_ADD_ACTION"):
                return "PatientRoomAdd";
            case Config("API_EDIT_ACTION"):
                return "PatientRoomEdit";
            case Config("API_DELETE_ACTION"):
                return "PatientRoomDelete";
            case Config("API_LIST_ACTION"):
                return "PatientRoomList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "PatientRoomList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("PatientRoomView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("PatientRoomView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "PatientRoomAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "PatientRoomAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("PatientRoomEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("PatientRoomAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("PatientRoomDelete", $this->getUrlParm());
    }

    // Add master url
    public function addMasterUrl($url)
    {
        if ($this->getCurrentMasterTable() == "ip_admission" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
            $url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
            $url .= "&" . GetForeignKeyUrl("fk_id", $this->Reception->CurrentValue ?? $this->Reception->getSessionValue());
            $url .= "&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnno->CurrentValue ?? $this->mrnno->getSessionValue());
            $url .= "&" . GetForeignKeyUrl("fk_patient_id", $this->PatID->CurrentValue ?? $this->PatID->getSessionValue());
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
        $this->mrnno->setDbValue($row['mrnno']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->Gender->setDbValue($row['Gender']);
        $this->RoomID->setDbValue($row['RoomID']);
        $this->RoomNo->setDbValue($row['RoomNo']);
        $this->RoomType->setDbValue($row['RoomType']);
        $this->SharingRoom->setDbValue($row['SharingRoom']);
        $this->Amount->setDbValue($row['Amount']);
        $this->Startdatetime->setDbValue($row['Startdatetime']);
        $this->Enddatetime->setDbValue($row['Enddatetime']);
        $this->DaysHours->setDbValue($row['DaysHours']);
        $this->Days->setDbValue($row['Days']);
        $this->Hours->setDbValue($row['Hours']);
        $this->TotalAmount->setDbValue($row['TotalAmount']);
        $this->PatID->setDbValue($row['PatID']);
        $this->MobileNumber->setDbValue($row['MobileNumber']);
        $this->HospID->setDbValue($row['HospID']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
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

        // mrnno

        // PatientName

        // Gender

        // RoomID

        // RoomNo

        // RoomType

        // SharingRoom

        // Amount

        // Startdatetime

        // Enddatetime

        // DaysHours

        // Days

        // Hours

        // TotalAmount

        // PatID

        // MobileNumber

        // HospID

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // Reception
        $curVal = trim(strval($this->Reception->CurrentValue));
        if ($curVal != "") {
            $this->Reception->ViewValue = $this->Reception->lookupCacheOption($curVal);
            if ($this->Reception->ViewValue === null) { // Lookup from database
                $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                $sqlWrk = $this->Reception->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Reception->Lookup->renderViewRow($rswrk[0]);
                    $this->Reception->ViewValue = $this->Reception->displayValue($arwrk);
                } else {
                    $this->Reception->ViewValue = $this->Reception->CurrentValue;
                }
            }
        } else {
            $this->Reception->ViewValue = null;
        }
        $this->Reception->ViewCustomAttributes = "";

        // PatientId
        $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
        $this->PatientId->ViewValue = FormatNumber($this->PatientId->ViewValue, 0, -2, -2, -2);
        $this->PatientId->ViewCustomAttributes = "";

        // mrnno
        $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
        $this->mrnno->ViewCustomAttributes = "";

        // PatientName
        $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
        $this->PatientName->ViewCustomAttributes = "";

        // Gender
        $this->Gender->ViewValue = $this->Gender->CurrentValue;
        $this->Gender->ViewCustomAttributes = "";

        // RoomID
        $curVal = trim(strval($this->RoomID->CurrentValue));
        if ($curVal != "") {
            $this->RoomID->ViewValue = $this->RoomID->lookupCacheOption($curVal);
            if ($this->RoomID->ViewValue === null) { // Lookup from database
                $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                $sqlWrk = $this->RoomID->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->RoomID->Lookup->renderViewRow($rswrk[0]);
                    $this->RoomID->ViewValue = $this->RoomID->displayValue($arwrk);
                } else {
                    $this->RoomID->ViewValue = $this->RoomID->CurrentValue;
                }
            }
        } else {
            $this->RoomID->ViewValue = null;
        }
        $this->RoomID->ViewCustomAttributes = "";

        // RoomNo
        $this->RoomNo->ViewValue = $this->RoomNo->CurrentValue;
        $this->RoomNo->ViewCustomAttributes = "";

        // RoomType
        $this->RoomType->ViewValue = $this->RoomType->CurrentValue;
        $this->RoomType->ViewCustomAttributes = "";

        // SharingRoom
        $this->SharingRoom->ViewValue = $this->SharingRoom->CurrentValue;
        $this->SharingRoom->ViewCustomAttributes = "";

        // Amount
        $this->Amount->ViewValue = $this->Amount->CurrentValue;
        $this->Amount->ViewValue = FormatNumber($this->Amount->ViewValue, 2, -2, -2, -2);
        $this->Amount->ViewCustomAttributes = "";

        // Startdatetime
        $this->Startdatetime->ViewValue = $this->Startdatetime->CurrentValue;
        $this->Startdatetime->ViewValue = FormatDateTime($this->Startdatetime->ViewValue, 0);
        $this->Startdatetime->ViewCustomAttributes = "";

        // Enddatetime
        $this->Enddatetime->ViewValue = $this->Enddatetime->CurrentValue;
        $this->Enddatetime->ViewValue = FormatDateTime($this->Enddatetime->ViewValue, 0);
        $this->Enddatetime->ViewCustomAttributes = "";

        // DaysHours
        $this->DaysHours->ViewValue = $this->DaysHours->CurrentValue;
        $this->DaysHours->ViewCustomAttributes = "";

        // Days
        $this->Days->ViewValue = $this->Days->CurrentValue;
        $this->Days->ViewValue = FormatNumber($this->Days->ViewValue, 0, -2, -2, -2);
        $this->Days->ViewCustomAttributes = "";

        // Hours
        $this->Hours->ViewValue = $this->Hours->CurrentValue;
        $this->Hours->ViewValue = FormatNumber($this->Hours->ViewValue, 0, -2, -2, -2);
        $this->Hours->ViewCustomAttributes = "";

        // TotalAmount
        $this->TotalAmount->ViewValue = $this->TotalAmount->CurrentValue;
        $this->TotalAmount->ViewValue = FormatNumber($this->TotalAmount->ViewValue, 2, -2, -2, -2);
        $this->TotalAmount->ViewCustomAttributes = "";

        // PatID
        $this->PatID->ViewValue = $this->PatID->CurrentValue;
        $this->PatID->ViewCustomAttributes = "";

        // MobileNumber
        $this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
        $this->MobileNumber->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

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

        // mrnno
        $this->mrnno->LinkCustomAttributes = "";
        $this->mrnno->HrefValue = "";
        $this->mrnno->TooltipValue = "";

        // PatientName
        $this->PatientName->LinkCustomAttributes = "";
        $this->PatientName->HrefValue = "";
        $this->PatientName->TooltipValue = "";

        // Gender
        $this->Gender->LinkCustomAttributes = "";
        $this->Gender->HrefValue = "";
        $this->Gender->TooltipValue = "";

        // RoomID
        $this->RoomID->LinkCustomAttributes = "";
        $this->RoomID->HrefValue = "";
        $this->RoomID->TooltipValue = "";

        // RoomNo
        $this->RoomNo->LinkCustomAttributes = "";
        $this->RoomNo->HrefValue = "";
        $this->RoomNo->TooltipValue = "";

        // RoomType
        $this->RoomType->LinkCustomAttributes = "";
        $this->RoomType->HrefValue = "";
        $this->RoomType->TooltipValue = "";

        // SharingRoom
        $this->SharingRoom->LinkCustomAttributes = "";
        $this->SharingRoom->HrefValue = "";
        $this->SharingRoom->TooltipValue = "";

        // Amount
        $this->Amount->LinkCustomAttributes = "";
        $this->Amount->HrefValue = "";
        $this->Amount->TooltipValue = "";

        // Startdatetime
        $this->Startdatetime->LinkCustomAttributes = "";
        $this->Startdatetime->HrefValue = "";
        $this->Startdatetime->TooltipValue = "";

        // Enddatetime
        $this->Enddatetime->LinkCustomAttributes = "";
        $this->Enddatetime->HrefValue = "";
        $this->Enddatetime->TooltipValue = "";

        // DaysHours
        $this->DaysHours->LinkCustomAttributes = "";
        $this->DaysHours->HrefValue = "";
        $this->DaysHours->TooltipValue = "";

        // Days
        $this->Days->LinkCustomAttributes = "";
        $this->Days->HrefValue = "";
        $this->Days->TooltipValue = "";

        // Hours
        $this->Hours->LinkCustomAttributes = "";
        $this->Hours->HrefValue = "";
        $this->Hours->TooltipValue = "";

        // TotalAmount
        $this->TotalAmount->LinkCustomAttributes = "";
        $this->TotalAmount->HrefValue = "";
        $this->TotalAmount->TooltipValue = "";

        // PatID
        $this->PatID->LinkCustomAttributes = "";
        $this->PatID->HrefValue = "";
        $this->PatID->TooltipValue = "";

        // MobileNumber
        $this->MobileNumber->LinkCustomAttributes = "";
        $this->MobileNumber->HrefValue = "";
        $this->MobileNumber->TooltipValue = "";

        // HospID
        $this->HospID->LinkCustomAttributes = "";
        $this->HospID->HrefValue = "";
        $this->HospID->TooltipValue = "";

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
        $curVal = trim(strval($this->Reception->CurrentValue));
        if ($curVal != "") {
            $this->Reception->EditValue = $this->Reception->lookupCacheOption($curVal);
            if ($this->Reception->EditValue === null) { // Lookup from database
                $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                $sqlWrk = $this->Reception->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Reception->Lookup->renderViewRow($rswrk[0]);
                    $this->Reception->EditValue = $this->Reception->displayValue($arwrk);
                } else {
                    $this->Reception->EditValue = $this->Reception->CurrentValue;
                }
            }
        } else {
            $this->Reception->EditValue = null;
        }
        $this->Reception->ViewCustomAttributes = "";

        // PatientId
        $this->PatientId->EditAttrs["class"] = "form-control";
        $this->PatientId->EditCustomAttributes = "";
        $this->PatientId->EditValue = $this->PatientId->CurrentValue;
        $this->PatientId->EditValue = FormatNumber($this->PatientId->EditValue, 0, -2, -2, -2);
        $this->PatientId->ViewCustomAttributes = "";

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

        // Gender
        $this->Gender->EditAttrs["class"] = "form-control";
        $this->Gender->EditCustomAttributes = "";
        if (!$this->Gender->Raw) {
            $this->Gender->CurrentValue = HtmlDecode($this->Gender->CurrentValue);
        }
        $this->Gender->EditValue = $this->Gender->CurrentValue;
        $this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

        // RoomID
        $this->RoomID->EditAttrs["class"] = "form-control";
        $this->RoomID->EditCustomAttributes = "";
        $this->RoomID->PlaceHolder = RemoveHtml($this->RoomID->caption());

        // RoomNo
        $this->RoomNo->EditAttrs["class"] = "form-control";
        $this->RoomNo->EditCustomAttributes = "";
        if (!$this->RoomNo->Raw) {
            $this->RoomNo->CurrentValue = HtmlDecode($this->RoomNo->CurrentValue);
        }
        $this->RoomNo->EditValue = $this->RoomNo->CurrentValue;
        $this->RoomNo->PlaceHolder = RemoveHtml($this->RoomNo->caption());

        // RoomType
        $this->RoomType->EditAttrs["class"] = "form-control";
        $this->RoomType->EditCustomAttributes = "";
        if (!$this->RoomType->Raw) {
            $this->RoomType->CurrentValue = HtmlDecode($this->RoomType->CurrentValue);
        }
        $this->RoomType->EditValue = $this->RoomType->CurrentValue;
        $this->RoomType->PlaceHolder = RemoveHtml($this->RoomType->caption());

        // SharingRoom
        $this->SharingRoom->EditAttrs["class"] = "form-control";
        $this->SharingRoom->EditCustomAttributes = "";
        if (!$this->SharingRoom->Raw) {
            $this->SharingRoom->CurrentValue = HtmlDecode($this->SharingRoom->CurrentValue);
        }
        $this->SharingRoom->EditValue = $this->SharingRoom->CurrentValue;
        $this->SharingRoom->PlaceHolder = RemoveHtml($this->SharingRoom->caption());

        // Amount
        $this->Amount->EditAttrs["class"] = "form-control";
        $this->Amount->EditCustomAttributes = "";
        $this->Amount->EditValue = $this->Amount->CurrentValue;
        $this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());
        if (strval($this->Amount->EditValue) != "" && is_numeric($this->Amount->EditValue)) {
            $this->Amount->EditValue = FormatNumber($this->Amount->EditValue, -2, -2, -2, -2);
        }

        // Startdatetime
        $this->Startdatetime->EditAttrs["class"] = "form-control";
        $this->Startdatetime->EditCustomAttributes = "";
        $this->Startdatetime->EditValue = FormatDateTime($this->Startdatetime->CurrentValue, 8);
        $this->Startdatetime->PlaceHolder = RemoveHtml($this->Startdatetime->caption());

        // Enddatetime
        $this->Enddatetime->EditAttrs["class"] = "form-control";
        $this->Enddatetime->EditCustomAttributes = "";
        $this->Enddatetime->EditValue = FormatDateTime($this->Enddatetime->CurrentValue, 8);
        $this->Enddatetime->PlaceHolder = RemoveHtml($this->Enddatetime->caption());

        // DaysHours
        $this->DaysHours->EditAttrs["class"] = "form-control";
        $this->DaysHours->EditCustomAttributes = "";
        if (!$this->DaysHours->Raw) {
            $this->DaysHours->CurrentValue = HtmlDecode($this->DaysHours->CurrentValue);
        }
        $this->DaysHours->EditValue = $this->DaysHours->CurrentValue;
        $this->DaysHours->PlaceHolder = RemoveHtml($this->DaysHours->caption());

        // Days
        $this->Days->EditAttrs["class"] = "form-control";
        $this->Days->EditCustomAttributes = "";
        $this->Days->EditValue = $this->Days->CurrentValue;
        $this->Days->PlaceHolder = RemoveHtml($this->Days->caption());

        // Hours
        $this->Hours->EditAttrs["class"] = "form-control";
        $this->Hours->EditCustomAttributes = "";
        $this->Hours->EditValue = $this->Hours->CurrentValue;
        $this->Hours->PlaceHolder = RemoveHtml($this->Hours->caption());

        // TotalAmount
        $this->TotalAmount->EditAttrs["class"] = "form-control";
        $this->TotalAmount->EditCustomAttributes = "";
        $this->TotalAmount->EditValue = $this->TotalAmount->CurrentValue;
        $this->TotalAmount->PlaceHolder = RemoveHtml($this->TotalAmount->caption());
        if (strval($this->TotalAmount->EditValue) != "" && is_numeric($this->TotalAmount->EditValue)) {
            $this->TotalAmount->EditValue = FormatNumber($this->TotalAmount->EditValue, -2, -2, -2, -2);
        }

        // PatID
        $this->PatID->EditAttrs["class"] = "form-control";
        $this->PatID->EditCustomAttributes = "";
        if ($this->PatID->getSessionValue() != "") {
            $this->PatID->CurrentValue = GetForeignKeyValue($this->PatID->getSessionValue());
            $this->PatID->ViewValue = $this->PatID->CurrentValue;
            $this->PatID->ViewCustomAttributes = "";
        } else {
            if (!$this->PatID->Raw) {
                $this->PatID->CurrentValue = HtmlDecode($this->PatID->CurrentValue);
            }
            $this->PatID->EditValue = $this->PatID->CurrentValue;
            $this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());
        }

        // MobileNumber
        $this->MobileNumber->EditAttrs["class"] = "form-control";
        $this->MobileNumber->EditCustomAttributes = "";
        if (!$this->MobileNumber->Raw) {
            $this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
        }
        $this->MobileNumber->EditValue = $this->MobileNumber->CurrentValue;
        $this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

        // HospID

        // status
        $this->status->EditAttrs["class"] = "form-control";
        $this->status->EditCustomAttributes = "";
        $this->status->EditValue = $this->status->CurrentValue;
        $this->status->PlaceHolder = RemoveHtml($this->status->caption());

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

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
                    $doc->exportCaption($this->mrnno);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->Gender);
                    $doc->exportCaption($this->RoomID);
                    $doc->exportCaption($this->RoomNo);
                    $doc->exportCaption($this->RoomType);
                    $doc->exportCaption($this->SharingRoom);
                    $doc->exportCaption($this->Amount);
                    $doc->exportCaption($this->Startdatetime);
                    $doc->exportCaption($this->Enddatetime);
                    $doc->exportCaption($this->DaysHours);
                    $doc->exportCaption($this->Days);
                    $doc->exportCaption($this->Hours);
                    $doc->exportCaption($this->TotalAmount);
                    $doc->exportCaption($this->PatID);
                    $doc->exportCaption($this->MobileNumber);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->Reception);
                    $doc->exportCaption($this->PatientId);
                    $doc->exportCaption($this->mrnno);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->Gender);
                    $doc->exportCaption($this->RoomID);
                    $doc->exportCaption($this->RoomNo);
                    $doc->exportCaption($this->RoomType);
                    $doc->exportCaption($this->SharingRoom);
                    $doc->exportCaption($this->Amount);
                    $doc->exportCaption($this->Startdatetime);
                    $doc->exportCaption($this->Enddatetime);
                    $doc->exportCaption($this->DaysHours);
                    $doc->exportCaption($this->Days);
                    $doc->exportCaption($this->Hours);
                    $doc->exportCaption($this->TotalAmount);
                    $doc->exportCaption($this->PatID);
                    $doc->exportCaption($this->MobileNumber);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
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
                        $doc->exportField($this->mrnno);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->Gender);
                        $doc->exportField($this->RoomID);
                        $doc->exportField($this->RoomNo);
                        $doc->exportField($this->RoomType);
                        $doc->exportField($this->SharingRoom);
                        $doc->exportField($this->Amount);
                        $doc->exportField($this->Startdatetime);
                        $doc->exportField($this->Enddatetime);
                        $doc->exportField($this->DaysHours);
                        $doc->exportField($this->Days);
                        $doc->exportField($this->Hours);
                        $doc->exportField($this->TotalAmount);
                        $doc->exportField($this->PatID);
                        $doc->exportField($this->MobileNumber);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->status);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->Reception);
                        $doc->exportField($this->PatientId);
                        $doc->exportField($this->mrnno);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->Gender);
                        $doc->exportField($this->RoomID);
                        $doc->exportField($this->RoomNo);
                        $doc->exportField($this->RoomType);
                        $doc->exportField($this->SharingRoom);
                        $doc->exportField($this->Amount);
                        $doc->exportField($this->Startdatetime);
                        $doc->exportField($this->Enddatetime);
                        $doc->exportField($this->DaysHours);
                        $doc->exportField($this->Days);
                        $doc->exportField($this->Hours);
                        $doc->exportField($this->TotalAmount);
                        $doc->exportField($this->PatID);
                        $doc->exportField($this->MobileNumber);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->status);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
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
