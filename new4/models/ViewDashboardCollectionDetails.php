<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_dashboard_collection_details
 */
class ViewDashboardCollectionDetails extends DbTable
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
    public $createddate;
    public $_UserName;
    public $BillNumber;
    public $PatientID;
    public $PatientName;
    public $Mobile;
    public $voucher_type;
    public $Details;
    public $ModeofPayment;
    public $Amount;
    public $AnyDues;
    public $createdby;
    public $createddatetime;
    public $modifiedby;
    public $modifieddatetime;
    public $BillType;
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
        $this->TableVar = 'view_dashboard_collection_details';
        $this->TableName = 'view_dashboard_collection_details';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_dashboard_collection_details`";
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
        $this->id = new DbField('view_dashboard_collection_details', 'view_dashboard_collection_details', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->id->Nullable = false; // NOT NULL field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // createddate
        $this->createddate = new DbField('view_dashboard_collection_details', 'view_dashboard_collection_details', 'x_createddate', 'createddate', '`createddate`', CastDateFieldForLike("`createddate`", 0, "DB"), 133, 10, 0, false, '`createddate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddate->IsForeignKey = true; // Foreign key field
        $this->createddate->Sortable = true; // Allow sort
        $this->createddate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->createddate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createddate->Param, "CustomMsg");
        $this->Fields['createddate'] = &$this->createddate;

        // UserName
        $this->_UserName = new DbField('view_dashboard_collection_details', 'view_dashboard_collection_details', 'x__UserName', 'UserName', '`UserName`', '`UserName`', 200, 45, -1, false, '`UserName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->_UserName->IsForeignKey = true; // Foreign key field
        $this->_UserName->Sortable = true; // Allow sort
        $this->_UserName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->_UserName->Param, "CustomMsg");
        $this->Fields['UserName'] = &$this->_UserName;

        // BillNumber
        $this->BillNumber = new DbField('view_dashboard_collection_details', 'view_dashboard_collection_details', 'x_BillNumber', 'BillNumber', '`BillNumber`', '`BillNumber`', 200, 45, -1, false, '`BillNumber`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BillNumber->Sortable = true; // Allow sort
        $this->BillNumber->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BillNumber->Param, "CustomMsg");
        $this->Fields['BillNumber'] = &$this->BillNumber;

        // PatientID
        $this->PatientID = new DbField('view_dashboard_collection_details', 'view_dashboard_collection_details', 'x_PatientID', 'PatientID', '`PatientID`', '`PatientID`', 200, 45, -1, false, '`PatientID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientID->Sortable = true; // Allow sort
        $this->PatientID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientID->Param, "CustomMsg");
        $this->Fields['PatientID'] = &$this->PatientID;

        // PatientName
        $this->PatientName = new DbField('view_dashboard_collection_details', 'view_dashboard_collection_details', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, false, '`PatientName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientName->Sortable = true; // Allow sort
        $this->PatientName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientName->Param, "CustomMsg");
        $this->Fields['PatientName'] = &$this->PatientName;

        // Mobile
        $this->Mobile = new DbField('view_dashboard_collection_details', 'view_dashboard_collection_details', 'x_Mobile', 'Mobile', '`Mobile`', '`Mobile`', 200, 45, -1, false, '`Mobile`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Mobile->Sortable = true; // Allow sort
        $this->Mobile->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Mobile->Param, "CustomMsg");
        $this->Fields['Mobile'] = &$this->Mobile;

        // voucher_type
        $this->voucher_type = new DbField('view_dashboard_collection_details', 'view_dashboard_collection_details', 'x_voucher_type', 'voucher_type', '`voucher_type`', '`voucher_type`', 200, 45, -1, false, '`voucher_type`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->voucher_type->Sortable = true; // Allow sort
        $this->voucher_type->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->voucher_type->Param, "CustomMsg");
        $this->Fields['voucher_type'] = &$this->voucher_type;

        // Details
        $this->Details = new DbField('view_dashboard_collection_details', 'view_dashboard_collection_details', 'x_Details', 'Details', '`Details`', '`Details`', 200, 45, -1, false, '`Details`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Details->Sortable = true; // Allow sort
        $this->Details->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Details->Param, "CustomMsg");
        $this->Fields['Details'] = &$this->Details;

        // ModeofPayment
        $this->ModeofPayment = new DbField('view_dashboard_collection_details', 'view_dashboard_collection_details', 'x_ModeofPayment', 'ModeofPayment', '`ModeofPayment`', '`ModeofPayment`', 200, 45, -1, false, '`ModeofPayment`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ModeofPayment->IsForeignKey = true; // Foreign key field
        $this->ModeofPayment->Sortable = true; // Allow sort
        $this->ModeofPayment->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ModeofPayment->Param, "CustomMsg");
        $this->Fields['ModeofPayment'] = &$this->ModeofPayment;

        // Amount
        $this->Amount = new DbField('view_dashboard_collection_details', 'view_dashboard_collection_details', 'x_Amount', 'Amount', '`Amount`', '`Amount`', 131, 12, -1, false, '`Amount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Amount->Sortable = true; // Allow sort
        $this->Amount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Amount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Amount->Param, "CustomMsg");
        $this->Fields['Amount'] = &$this->Amount;

        // AnyDues
        $this->AnyDues = new DbField('view_dashboard_collection_details', 'view_dashboard_collection_details', 'x_AnyDues', 'AnyDues', '`AnyDues`', '`AnyDues`', 200, 45, -1, false, '`AnyDues`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AnyDues->Sortable = true; // Allow sort
        $this->AnyDues->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AnyDues->Param, "CustomMsg");
        $this->Fields['AnyDues'] = &$this->AnyDues;

        // createdby
        $this->createdby = new DbField('view_dashboard_collection_details', 'view_dashboard_collection_details', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 200, 45, -1, false, '`createdby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdby->Sortable = true; // Allow sort
        $this->createdby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createdby->Param, "CustomMsg");
        $this->Fields['createdby'] = &$this->createdby;

        // createddatetime
        $this->createddatetime = new DbField('view_dashboard_collection_details', 'view_dashboard_collection_details', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, false, '`createddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddatetime->Sortable = true; // Allow sort
        $this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->createddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createddatetime->Param, "CustomMsg");
        $this->Fields['createddatetime'] = &$this->createddatetime;

        // modifiedby
        $this->modifiedby = new DbField('view_dashboard_collection_details', 'view_dashboard_collection_details', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 200, 45, -1, false, '`modifiedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifiedby->Sortable = true; // Allow sort
        $this->modifiedby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifiedby->Param, "CustomMsg");
        $this->Fields['modifiedby'] = &$this->modifiedby;

        // modifieddatetime
        $this->modifieddatetime = new DbField('view_dashboard_collection_details', 'view_dashboard_collection_details', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, false, '`modifieddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifieddatetime->Sortable = true; // Allow sort
        $this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->modifieddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifieddatetime->Param, "CustomMsg");
        $this->Fields['modifieddatetime'] = &$this->modifieddatetime;

        // BillType
        $this->BillType = new DbField('view_dashboard_collection_details', 'view_dashboard_collection_details', 'x_BillType', 'BillType', '`BillType`', '`BillType`', 200, 8, -1, false, '`BillType`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BillType->Nullable = false; // NOT NULL field
        $this->BillType->Required = true; // Required field
        $this->BillType->Sortable = true; // Allow sort
        $this->BillType->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BillType->Param, "CustomMsg");
        $this->Fields['BillType'] = &$this->BillType;

        // HospID
        $this->HospID = new DbField('view_dashboard_collection_details', 'view_dashboard_collection_details', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->IsForeignKey = true; // Foreign key field
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->Lookup = new Lookup('HospID', 'hospital', false, 'id', ["hospital","","",""], [], [], [], [], [], [], '', '');
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
        if ($this->getCurrentMasterTable() == "view_dashboard_summary_modeofpayment_details") {
            if ($this->_UserName->getSessionValue() != "") {
                $masterFilter .= "" . GetForeignKeySql("`UserName`", $this->_UserName->getSessionValue(), DATATYPE_STRING, "DB");
            } else {
                return "";
            }
            if ($this->createddate->getSessionValue() != "") {
                $masterFilter .= " AND " . GetForeignKeySql("`createddate`", $this->createddate->getSessionValue(), DATATYPE_DATE, "DB");
            } else {
                return "";
            }
            if ($this->ModeofPayment->getSessionValue() != "") {
                $masterFilter .= " AND " . GetForeignKeySql("`ModeofPayment`", $this->ModeofPayment->getSessionValue(), DATATYPE_STRING, "DB");
            } else {
                return "";
            }
            if ($this->HospID->getSessionValue() != "") {
                $masterFilter .= " AND " . GetForeignKeySql("`HospID`", $this->HospID->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
        }
        if ($this->getCurrentMasterTable() == "view_dashboard_summary_payment_mode") {
            if ($this->createddate->getSessionValue() != "") {
                $masterFilter .= "" . GetForeignKeySql("`createddate`", $this->createddate->getSessionValue(), DATATYPE_DATE, "DB");
            } else {
                return "";
            }
            if ($this->HospID->getSessionValue() != "") {
                $masterFilter .= " AND " . GetForeignKeySql("`HospID`", $this->HospID->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
            if ($this->_UserName->getSessionValue() != "") {
                $masterFilter .= " AND " . GetForeignKeySql("`UserName`", $this->_UserName->getSessionValue(), DATATYPE_STRING, "DB");
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
        if ($this->getCurrentMasterTable() == "view_dashboard_summary_modeofpayment_details") {
            if ($this->_UserName->getSessionValue() != "") {
                $detailFilter .= "" . GetForeignKeySql("`UserName`", $this->_UserName->getSessionValue(), DATATYPE_STRING, "DB");
            } else {
                return "";
            }
            if ($this->createddate->getSessionValue() != "") {
                $detailFilter .= " AND " . GetForeignKeySql("`createddate`", $this->createddate->getSessionValue(), DATATYPE_DATE, "DB");
            } else {
                return "";
            }
            if ($this->ModeofPayment->getSessionValue() != "") {
                $detailFilter .= " AND " . GetForeignKeySql("`ModeofPayment`", $this->ModeofPayment->getSessionValue(), DATATYPE_STRING, "DB");
            } else {
                return "";
            }
            if ($this->HospID->getSessionValue() != "") {
                $detailFilter .= " AND " . GetForeignKeySql("`HospID`", $this->HospID->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
        }
        if ($this->getCurrentMasterTable() == "view_dashboard_summary_payment_mode") {
            if ($this->createddate->getSessionValue() != "") {
                $detailFilter .= "" . GetForeignKeySql("`createddate`", $this->createddate->getSessionValue(), DATATYPE_DATE, "DB");
            } else {
                return "";
            }
            if ($this->HospID->getSessionValue() != "") {
                $detailFilter .= " AND " . GetForeignKeySql("`HospID`", $this->HospID->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
            if ($this->_UserName->getSessionValue() != "") {
                $detailFilter .= " AND " . GetForeignKeySql("`UserName`", $this->_UserName->getSessionValue(), DATATYPE_STRING, "DB");
            } else {
                return "";
            }
        }
        return $detailFilter;
    }

    // Master filter
    public function sqlMasterFilter_view_dashboard_summary_modeofpayment_details()
    {
        return "`UserName`='@_UserName@' AND `createddate`='@createddate@' AND `ModeofPayment`='@ModeofPayment@' AND `HospID`=@HospID@";
    }
    // Detail filter
    public function sqlDetailFilter_view_dashboard_summary_modeofpayment_details()
    {
        return "`UserName`='@_UserName@' AND `createddate`='@createddate@' AND `ModeofPayment`='@ModeofPayment@' AND `HospID`=@HospID@";
    }

    // Master filter
    public function sqlMasterFilter_view_dashboard_summary_payment_mode()
    {
        return "`createddate`='@createddate@' AND `HospID`=@HospID@ AND `UserName`='@_UserName@'";
    }
    // Detail filter
    public function sqlDetailFilter_view_dashboard_summary_payment_mode()
    {
        return "`createddate`='@createddate@' AND `HospID`=@HospID@ AND `UserName`='@_UserName@'";
    }

    // Table level SQL
    public function getSqlFrom() // From
    {
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_dashboard_collection_details`";
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
        $this->createddate->DbValue = $row['createddate'];
        $this->_UserName->DbValue = $row['UserName'];
        $this->BillNumber->DbValue = $row['BillNumber'];
        $this->PatientID->DbValue = $row['PatientID'];
        $this->PatientName->DbValue = $row['PatientName'];
        $this->Mobile->DbValue = $row['Mobile'];
        $this->voucher_type->DbValue = $row['voucher_type'];
        $this->Details->DbValue = $row['Details'];
        $this->ModeofPayment->DbValue = $row['ModeofPayment'];
        $this->Amount->DbValue = $row['Amount'];
        $this->AnyDues->DbValue = $row['AnyDues'];
        $this->createdby->DbValue = $row['createdby'];
        $this->createddatetime->DbValue = $row['createddatetime'];
        $this->modifiedby->DbValue = $row['modifiedby'];
        $this->modifieddatetime->DbValue = $row['modifieddatetime'];
        $this->BillType->DbValue = $row['BillType'];
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
        return $_SESSION[$name] ?? GetUrl("ViewDashboardCollectionDetailsList");
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
        if ($pageName == "ViewDashboardCollectionDetailsView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewDashboardCollectionDetailsEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewDashboardCollectionDetailsAdd") {
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
                return "ViewDashboardCollectionDetailsView";
            case Config("API_ADD_ACTION"):
                return "ViewDashboardCollectionDetailsAdd";
            case Config("API_EDIT_ACTION"):
                return "ViewDashboardCollectionDetailsEdit";
            case Config("API_DELETE_ACTION"):
                return "ViewDashboardCollectionDetailsDelete";
            case Config("API_LIST_ACTION"):
                return "ViewDashboardCollectionDetailsList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewDashboardCollectionDetailsList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewDashboardCollectionDetailsView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewDashboardCollectionDetailsView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewDashboardCollectionDetailsAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewDashboardCollectionDetailsAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewDashboardCollectionDetailsEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewDashboardCollectionDetailsAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewDashboardCollectionDetailsDelete", $this->getUrlParm());
    }

    // Add master url
    public function addMasterUrl($url)
    {
        if ($this->getCurrentMasterTable() == "view_dashboard_summary_modeofpayment_details" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
            $url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
            $url .= "&" . GetForeignKeyUrl("fk__UserName", $this->_UserName->CurrentValue ?? $this->_UserName->getSessionValue());
            $url .= "&" . GetForeignKeyUrl("fk_createddate", $this->createddate->CurrentValue ?? $this->createddate->getSessionValue(), 0);
            $url .= "&" . GetForeignKeyUrl("fk_ModeofPayment", $this->ModeofPayment->CurrentValue ?? $this->ModeofPayment->getSessionValue());
            $url .= "&" . GetForeignKeyUrl("fk_HospID", $this->HospID->CurrentValue ?? $this->HospID->getSessionValue());
        }
        if ($this->getCurrentMasterTable() == "view_dashboard_summary_payment_mode" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
            $url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
            $url .= "&" . GetForeignKeyUrl("fk_createddate", $this->createddate->CurrentValue ?? $this->createddate->getSessionValue(), 0);
            $url .= "&" . GetForeignKeyUrl("fk_HospID", $this->HospID->CurrentValue ?? $this->HospID->getSessionValue());
            $url .= "&" . GetForeignKeyUrl("fk__UserName", $this->_UserName->CurrentValue ?? $this->_UserName->getSessionValue());
        }
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
        $this->createddate->setDbValue($row['createddate']);
        $this->_UserName->setDbValue($row['UserName']);
        $this->BillNumber->setDbValue($row['BillNumber']);
        $this->PatientID->setDbValue($row['PatientID']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->Mobile->setDbValue($row['Mobile']);
        $this->voucher_type->setDbValue($row['voucher_type']);
        $this->Details->setDbValue($row['Details']);
        $this->ModeofPayment->setDbValue($row['ModeofPayment']);
        $this->Amount->setDbValue($row['Amount']);
        $this->AnyDues->setDbValue($row['AnyDues']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->BillType->setDbValue($row['BillType']);
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

        // createddate

        // UserName

        // BillNumber

        // PatientID

        // PatientName

        // Mobile

        // voucher_type

        // Details

        // ModeofPayment

        // Amount

        // AnyDues

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // BillType

        // HospID

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewValue = FormatNumber($this->id->ViewValue, 0, -2, -2, -2);
        $this->id->ViewCustomAttributes = "";

        // createddate
        $this->createddate->ViewValue = $this->createddate->CurrentValue;
        $this->createddate->ViewValue = FormatDateTime($this->createddate->ViewValue, 0);
        $this->createddate->ViewCustomAttributes = "";

        // UserName
        $this->_UserName->ViewValue = $this->_UserName->CurrentValue;
        $this->_UserName->ViewCustomAttributes = "";

        // BillNumber
        $this->BillNumber->ViewValue = $this->BillNumber->CurrentValue;
        $this->BillNumber->ViewCustomAttributes = "";

        // PatientID
        $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
        $this->PatientID->ViewCustomAttributes = "";

        // PatientName
        $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
        $this->PatientName->ViewCustomAttributes = "";

        // Mobile
        $this->Mobile->ViewValue = $this->Mobile->CurrentValue;
        $this->Mobile->ViewCustomAttributes = "";

        // voucher_type
        $this->voucher_type->ViewValue = $this->voucher_type->CurrentValue;
        $this->voucher_type->ViewCustomAttributes = "";

        // Details
        $this->Details->ViewValue = $this->Details->CurrentValue;
        $this->Details->ViewCustomAttributes = "";

        // ModeofPayment
        $this->ModeofPayment->ViewValue = $this->ModeofPayment->CurrentValue;
        $this->ModeofPayment->ViewCustomAttributes = "";

        // Amount
        $this->Amount->ViewValue = $this->Amount->CurrentValue;
        $this->Amount->ViewValue = FormatNumber($this->Amount->ViewValue, 2, -2, -2, -2);
        $this->Amount->ViewCustomAttributes = "";

        // AnyDues
        $this->AnyDues->ViewValue = $this->AnyDues->CurrentValue;
        $this->AnyDues->ViewCustomAttributes = "";

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

        // BillType
        $this->BillType->ViewValue = $this->BillType->CurrentValue;
        $this->BillType->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $curVal = trim(strval($this->HospID->CurrentValue));
        if ($curVal != "") {
            $this->HospID->ViewValue = $this->HospID->lookupCacheOption($curVal);
            if ($this->HospID->ViewValue === null) { // Lookup from database
                $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                $sqlWrk = $this->HospID->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->HospID->Lookup->renderViewRow($rswrk[0]);
                    $this->HospID->ViewValue = $this->HospID->displayValue($arwrk);
                } else {
                    $this->HospID->ViewValue = $this->HospID->CurrentValue;
                }
            }
        } else {
            $this->HospID->ViewValue = null;
        }
        $this->HospID->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // createddate
        $this->createddate->LinkCustomAttributes = "";
        $this->createddate->HrefValue = "";
        $this->createddate->TooltipValue = "";

        // UserName
        $this->_UserName->LinkCustomAttributes = "";
        $this->_UserName->HrefValue = "";
        $this->_UserName->TooltipValue = "";

        // BillNumber
        $this->BillNumber->LinkCustomAttributes = "";
        $this->BillNumber->HrefValue = "";
        $this->BillNumber->TooltipValue = "";

        // PatientID
        $this->PatientID->LinkCustomAttributes = "";
        $this->PatientID->HrefValue = "";
        $this->PatientID->TooltipValue = "";

        // PatientName
        $this->PatientName->LinkCustomAttributes = "";
        $this->PatientName->HrefValue = "";
        $this->PatientName->TooltipValue = "";

        // Mobile
        $this->Mobile->LinkCustomAttributes = "";
        $this->Mobile->HrefValue = "";
        $this->Mobile->TooltipValue = "";

        // voucher_type
        $this->voucher_type->LinkCustomAttributes = "";
        $this->voucher_type->HrefValue = "";
        $this->voucher_type->TooltipValue = "";

        // Details
        $this->Details->LinkCustomAttributes = "";
        $this->Details->HrefValue = "";
        $this->Details->TooltipValue = "";

        // ModeofPayment
        $this->ModeofPayment->LinkCustomAttributes = "";
        $this->ModeofPayment->HrefValue = "";
        $this->ModeofPayment->TooltipValue = "";

        // Amount
        $this->Amount->LinkCustomAttributes = "";
        $this->Amount->HrefValue = "";
        $this->Amount->TooltipValue = "";

        // AnyDues
        $this->AnyDues->LinkCustomAttributes = "";
        $this->AnyDues->HrefValue = "";
        $this->AnyDues->TooltipValue = "";

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

        // BillType
        $this->BillType->LinkCustomAttributes = "";
        $this->BillType->HrefValue = "";
        $this->BillType->TooltipValue = "";

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
        $this->id->PlaceHolder = RemoveHtml($this->id->caption());

        // createddate
        $this->createddate->EditAttrs["class"] = "form-control";
        $this->createddate->EditCustomAttributes = "";
        if ($this->createddate->getSessionValue() != "") {
            $this->createddate->CurrentValue = GetForeignKeyValue($this->createddate->getSessionValue());
            $this->createddate->ViewValue = $this->createddate->CurrentValue;
            $this->createddate->ViewValue = FormatDateTime($this->createddate->ViewValue, 0);
            $this->createddate->ViewCustomAttributes = "";
        } else {
            $this->createddate->EditValue = FormatDateTime($this->createddate->CurrentValue, 8);
            $this->createddate->PlaceHolder = RemoveHtml($this->createddate->caption());
        }

        // UserName
        $this->_UserName->EditAttrs["class"] = "form-control";
        $this->_UserName->EditCustomAttributes = "";
        if ($this->_UserName->getSessionValue() != "") {
            $this->_UserName->CurrentValue = GetForeignKeyValue($this->_UserName->getSessionValue());
            $this->_UserName->ViewValue = $this->_UserName->CurrentValue;
            $this->_UserName->ViewCustomAttributes = "";
        } else {
            if (!$this->_UserName->Raw) {
                $this->_UserName->CurrentValue = HtmlDecode($this->_UserName->CurrentValue);
            }
            $this->_UserName->EditValue = $this->_UserName->CurrentValue;
            $this->_UserName->PlaceHolder = RemoveHtml($this->_UserName->caption());
        }

        // BillNumber
        $this->BillNumber->EditAttrs["class"] = "form-control";
        $this->BillNumber->EditCustomAttributes = "";
        if (!$this->BillNumber->Raw) {
            $this->BillNumber->CurrentValue = HtmlDecode($this->BillNumber->CurrentValue);
        }
        $this->BillNumber->EditValue = $this->BillNumber->CurrentValue;
        $this->BillNumber->PlaceHolder = RemoveHtml($this->BillNumber->caption());

        // PatientID
        $this->PatientID->EditAttrs["class"] = "form-control";
        $this->PatientID->EditCustomAttributes = "";
        if (!$this->PatientID->Raw) {
            $this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
        }
        $this->PatientID->EditValue = $this->PatientID->CurrentValue;
        $this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

        // PatientName
        $this->PatientName->EditAttrs["class"] = "form-control";
        $this->PatientName->EditCustomAttributes = "";
        if (!$this->PatientName->Raw) {
            $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
        }
        $this->PatientName->EditValue = $this->PatientName->CurrentValue;
        $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

        // Mobile
        $this->Mobile->EditAttrs["class"] = "form-control";
        $this->Mobile->EditCustomAttributes = "";
        if (!$this->Mobile->Raw) {
            $this->Mobile->CurrentValue = HtmlDecode($this->Mobile->CurrentValue);
        }
        $this->Mobile->EditValue = $this->Mobile->CurrentValue;
        $this->Mobile->PlaceHolder = RemoveHtml($this->Mobile->caption());

        // voucher_type
        $this->voucher_type->EditAttrs["class"] = "form-control";
        $this->voucher_type->EditCustomAttributes = "";
        if (!$this->voucher_type->Raw) {
            $this->voucher_type->CurrentValue = HtmlDecode($this->voucher_type->CurrentValue);
        }
        $this->voucher_type->EditValue = $this->voucher_type->CurrentValue;
        $this->voucher_type->PlaceHolder = RemoveHtml($this->voucher_type->caption());

        // Details
        $this->Details->EditAttrs["class"] = "form-control";
        $this->Details->EditCustomAttributes = "";
        if (!$this->Details->Raw) {
            $this->Details->CurrentValue = HtmlDecode($this->Details->CurrentValue);
        }
        $this->Details->EditValue = $this->Details->CurrentValue;
        $this->Details->PlaceHolder = RemoveHtml($this->Details->caption());

        // ModeofPayment
        $this->ModeofPayment->EditAttrs["class"] = "form-control";
        $this->ModeofPayment->EditCustomAttributes = "";
        if ($this->ModeofPayment->getSessionValue() != "") {
            $this->ModeofPayment->CurrentValue = GetForeignKeyValue($this->ModeofPayment->getSessionValue());
            $this->ModeofPayment->ViewValue = $this->ModeofPayment->CurrentValue;
            $this->ModeofPayment->ViewCustomAttributes = "";
        } else {
            if (!$this->ModeofPayment->Raw) {
                $this->ModeofPayment->CurrentValue = HtmlDecode($this->ModeofPayment->CurrentValue);
            }
            $this->ModeofPayment->EditValue = $this->ModeofPayment->CurrentValue;
            $this->ModeofPayment->PlaceHolder = RemoveHtml($this->ModeofPayment->caption());
        }

        // Amount
        $this->Amount->EditAttrs["class"] = "form-control";
        $this->Amount->EditCustomAttributes = "";
        $this->Amount->EditValue = $this->Amount->CurrentValue;
        $this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());
        if (strval($this->Amount->EditValue) != "" && is_numeric($this->Amount->EditValue)) {
            $this->Amount->EditValue = FormatNumber($this->Amount->EditValue, -2, -2, -2, -2);
        }

        // AnyDues
        $this->AnyDues->EditAttrs["class"] = "form-control";
        $this->AnyDues->EditCustomAttributes = "";
        if (!$this->AnyDues->Raw) {
            $this->AnyDues->CurrentValue = HtmlDecode($this->AnyDues->CurrentValue);
        }
        $this->AnyDues->EditValue = $this->AnyDues->CurrentValue;
        $this->AnyDues->PlaceHolder = RemoveHtml($this->AnyDues->caption());

        // createdby
        $this->createdby->EditAttrs["class"] = "form-control";
        $this->createdby->EditCustomAttributes = "";
        if (!$this->createdby->Raw) {
            $this->createdby->CurrentValue = HtmlDecode($this->createdby->CurrentValue);
        }
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
        if (!$this->modifiedby->Raw) {
            $this->modifiedby->CurrentValue = HtmlDecode($this->modifiedby->CurrentValue);
        }
        $this->modifiedby->EditValue = $this->modifiedby->CurrentValue;
        $this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

        // modifieddatetime
        $this->modifieddatetime->EditAttrs["class"] = "form-control";
        $this->modifieddatetime->EditCustomAttributes = "";
        $this->modifieddatetime->EditValue = FormatDateTime($this->modifieddatetime->CurrentValue, 8);
        $this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

        // BillType
        $this->BillType->EditAttrs["class"] = "form-control";
        $this->BillType->EditCustomAttributes = "";
        if (!$this->BillType->Raw) {
            $this->BillType->CurrentValue = HtmlDecode($this->BillType->CurrentValue);
        }
        $this->BillType->EditValue = $this->BillType->CurrentValue;
        $this->BillType->PlaceHolder = RemoveHtml($this->BillType->caption());

        // HospID
        $this->HospID->EditAttrs["class"] = "form-control";
        $this->HospID->EditCustomAttributes = "";
        if ($this->HospID->getSessionValue() != "") {
            $this->HospID->CurrentValue = GetForeignKeyValue($this->HospID->getSessionValue());
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $curVal = trim(strval($this->HospID->CurrentValue));
            if ($curVal != "") {
                $this->HospID->ViewValue = $this->HospID->lookupCacheOption($curVal);
                if ($this->HospID->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->HospID->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->HospID->Lookup->renderViewRow($rswrk[0]);
                        $this->HospID->ViewValue = $this->HospID->displayValue($arwrk);
                    } else {
                        $this->HospID->ViewValue = $this->HospID->CurrentValue;
                    }
                }
            } else {
                $this->HospID->ViewValue = null;
            }
            $this->HospID->ViewCustomAttributes = "";
        } else {
            $this->HospID->EditValue = $this->HospID->CurrentValue;
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());
        }

        // Call Row Rendered event
        $this->rowRendered();
    }

    // Aggregate list row values
    public function aggregateListRowValues()
    {
            if (is_numeric($this->Amount->CurrentValue)) {
                $this->Amount->Total += $this->Amount->CurrentValue; // Accumulate total
            }
    }

    // Aggregate list row (for rendering)
    public function aggregateListRow()
    {
            $this->Amount->CurrentValue = $this->Amount->Total;
            $this->Amount->ViewValue = $this->Amount->CurrentValue;
            $this->Amount->ViewValue = FormatNumber($this->Amount->ViewValue, 2, -2, -2, -2);
            $this->Amount->ViewCustomAttributes = "";
            $this->Amount->HrefValue = ""; // Clear href value

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
                    $doc->exportCaption($this->createddate);
                    $doc->exportCaption($this->_UserName);
                    $doc->exportCaption($this->BillNumber);
                    $doc->exportCaption($this->PatientID);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->Mobile);
                    $doc->exportCaption($this->voucher_type);
                    $doc->exportCaption($this->Details);
                    $doc->exportCaption($this->ModeofPayment);
                    $doc->exportCaption($this->Amount);
                    $doc->exportCaption($this->AnyDues);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->BillType);
                    $doc->exportCaption($this->HospID);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->createddate);
                    $doc->exportCaption($this->_UserName);
                    $doc->exportCaption($this->BillNumber);
                    $doc->exportCaption($this->PatientID);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->Mobile);
                    $doc->exportCaption($this->voucher_type);
                    $doc->exportCaption($this->Details);
                    $doc->exportCaption($this->ModeofPayment);
                    $doc->exportCaption($this->Amount);
                    $doc->exportCaption($this->AnyDues);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->BillType);
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
                $this->aggregateListRowValues(); // Aggregate row values

                // Render row
                $this->RowType = ROWTYPE_VIEW; // Render view
                $this->resetAttributes();
                $this->renderListRow();
                if (!$doc->ExportCustom) {
                    $doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
                    if ($exportPageType == "view") {
                        $doc->exportField($this->id);
                        $doc->exportField($this->createddate);
                        $doc->exportField($this->_UserName);
                        $doc->exportField($this->BillNumber);
                        $doc->exportField($this->PatientID);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->Mobile);
                        $doc->exportField($this->voucher_type);
                        $doc->exportField($this->Details);
                        $doc->exportField($this->ModeofPayment);
                        $doc->exportField($this->Amount);
                        $doc->exportField($this->AnyDues);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->BillType);
                        $doc->exportField($this->HospID);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->createddate);
                        $doc->exportField($this->_UserName);
                        $doc->exportField($this->BillNumber);
                        $doc->exportField($this->PatientID);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->Mobile);
                        $doc->exportField($this->voucher_type);
                        $doc->exportField($this->Details);
                        $doc->exportField($this->ModeofPayment);
                        $doc->exportField($this->Amount);
                        $doc->exportField($this->AnyDues);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->BillType);
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

        // Export aggregates (horizontal format only)
        if ($doc->Horizontal) {
            $this->RowType = ROWTYPE_AGGREGATE;
            $this->resetAttributes();
            $this->aggregateListRow();
            if (!$doc->ExportCustom) {
                $doc->beginExportRow(-1);
                $doc->exportAggregate($this->id, '');
                $doc->exportAggregate($this->createddate, '');
                $doc->exportAggregate($this->_UserName, '');
                $doc->exportAggregate($this->BillNumber, '');
                $doc->exportAggregate($this->PatientID, '');
                $doc->exportAggregate($this->PatientName, '');
                $doc->exportAggregate($this->Mobile, '');
                $doc->exportAggregate($this->voucher_type, '');
                $doc->exportAggregate($this->Details, '');
                $doc->exportAggregate($this->ModeofPayment, '');
                $doc->exportAggregate($this->Amount, 'TOTAL');
                $doc->exportAggregate($this->AnyDues, '');
                $doc->exportAggregate($this->createdby, '');
                $doc->exportAggregate($this->createddatetime, '');
                $doc->exportAggregate($this->modifiedby, '');
                $doc->exportAggregate($this->modifieddatetime, '');
                $doc->exportAggregate($this->BillType, '');
                $doc->exportAggregate($this->HospID, '');
                $doc->endExportRow();
            }
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
