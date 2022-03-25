<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_lab_resultreleasedd
 */
class ViewLabResultreleasedd extends DbTable
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
    public $PatID;
    public $PatientName;
    public $Age;
    public $Gender;
    public $sid;
    public $ItemCode;
    public $DEptCd;
    public $Resulted;
    public $Services;
    public $LabReport;
    public $Pic1;
    public $Pic2;
    public $TestUnit;
    public $RefValue;
    public $Order;
    public $Repeated;
    public $Vid;
    public $invoiceId;
    public $DrID;
    public $DrCODE;
    public $DrName;
    public $Department;
    public $createddatetime;
    public $status;
    public $TestType;
    public $ResultDate;
    public $ResultedBy;
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
        $this->TableVar = 'view_lab_resultreleasedd';
        $this->TableName = 'view_lab_resultreleasedd';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_lab_resultreleasedd`";
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
        $this->id = new DbField('view_lab_resultreleasedd', 'view_lab_resultreleasedd', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // PatID
        $this->PatID = new DbField('view_lab_resultreleasedd', 'view_lab_resultreleasedd', 'x_PatID', 'PatID', '`PatID`', '`PatID`', 3, 11, -1, false, '`PatID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatID->Sortable = true; // Allow sort
        $this->PatID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->PatID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatID->Param, "CustomMsg");
        $this->Fields['PatID'] = &$this->PatID;

        // PatientName
        $this->PatientName = new DbField('view_lab_resultreleasedd', 'view_lab_resultreleasedd', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, false, '`PatientName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientName->Sortable = true; // Allow sort
        $this->PatientName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientName->Param, "CustomMsg");
        $this->Fields['PatientName'] = &$this->PatientName;

        // Age
        $this->Age = new DbField('view_lab_resultreleasedd', 'view_lab_resultreleasedd', 'x_Age', 'Age', '`Age`', '`Age`', 200, 45, -1, false, '`Age`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Age->Sortable = true; // Allow sort
        $this->Age->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Age->Param, "CustomMsg");
        $this->Fields['Age'] = &$this->Age;

        // Gender
        $this->Gender = new DbField('view_lab_resultreleasedd', 'view_lab_resultreleasedd', 'x_Gender', 'Gender', '`Gender`', '`Gender`', 200, 45, -1, false, '`Gender`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Gender->Sortable = true; // Allow sort
        $this->Gender->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Gender->Param, "CustomMsg");
        $this->Fields['Gender'] = &$this->Gender;

        // sid
        $this->sid = new DbField('view_lab_resultreleasedd', 'view_lab_resultreleasedd', 'x_sid', 'sid', '`sid`', '`sid`', 3, 11, -1, false, '`sid`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->sid->Sortable = true; // Allow sort
        $this->sid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->sid->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->sid->Param, "CustomMsg");
        $this->Fields['sid'] = &$this->sid;

        // ItemCode
        $this->ItemCode = new DbField('view_lab_resultreleasedd', 'view_lab_resultreleasedd', 'x_ItemCode', 'ItemCode', '`ItemCode`', '`ItemCode`', 200, 45, -1, false, '`ItemCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ItemCode->Sortable = true; // Allow sort
        $this->ItemCode->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ItemCode->Param, "CustomMsg");
        $this->Fields['ItemCode'] = &$this->ItemCode;

        // DEptCd
        $this->DEptCd = new DbField('view_lab_resultreleasedd', 'view_lab_resultreleasedd', 'x_DEptCd', 'DEptCd', '`DEptCd`', '`DEptCd`', 200, 45, -1, false, '`DEptCd`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DEptCd->Sortable = true; // Allow sort
        $this->DEptCd->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DEptCd->Param, "CustomMsg");
        $this->Fields['DEptCd'] = &$this->DEptCd;

        // Resulted
        $this->Resulted = new DbField('view_lab_resultreleasedd', 'view_lab_resultreleasedd', 'x_Resulted', 'Resulted', '`Resulted`', '`Resulted`', 200, 45, -1, false, '`Resulted`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->Resulted->Sortable = true; // Allow sort
        $this->Resulted->Lookup = new Lookup('Resulted', 'view_lab_resultreleasedd', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Resulted->OptionCount = 1;
        $this->Resulted->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Resulted->Param, "CustomMsg");
        $this->Fields['Resulted'] = &$this->Resulted;

        // Services
        $this->Services = new DbField('view_lab_resultreleasedd', 'view_lab_resultreleasedd', 'x_Services', 'Services', '`Services`', '`Services`', 200, 50, -1, false, '`Services`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Services->Nullable = false; // NOT NULL field
        $this->Services->Required = true; // Required field
        $this->Services->Sortable = true; // Allow sort
        $this->Services->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Services->Param, "CustomMsg");
        $this->Fields['Services'] = &$this->Services;

        // LabReport
        $this->LabReport = new DbField('view_lab_resultreleasedd', 'view_lab_resultreleasedd', 'x_LabReport', 'LabReport', '`LabReport`', '`LabReport`', 201, 65535, -1, false, '`LabReport`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->LabReport->Sortable = true; // Allow sort
        $this->LabReport->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->LabReport->Param, "CustomMsg");
        $this->Fields['LabReport'] = &$this->LabReport;

        // Pic1
        $this->Pic1 = new DbField('view_lab_resultreleasedd', 'view_lab_resultreleasedd', 'x_Pic1', 'Pic1', '`Pic1`', '`Pic1`', 200, 45, -1, true, '`Pic1`', false, false, false, 'FORMATTED TEXT', 'FILE');
        $this->Pic1->Sortable = true; // Allow sort
        $this->Pic1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Pic1->Param, "CustomMsg");
        $this->Fields['Pic1'] = &$this->Pic1;

        // Pic2
        $this->Pic2 = new DbField('view_lab_resultreleasedd', 'view_lab_resultreleasedd', 'x_Pic2', 'Pic2', '`Pic2`', '`Pic2`', 200, 45, -1, true, '`Pic2`', false, false, false, 'FORMATTED TEXT', 'FILE');
        $this->Pic2->Sortable = true; // Allow sort
        $this->Pic2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Pic2->Param, "CustomMsg");
        $this->Fields['Pic2'] = &$this->Pic2;

        // TestUnit
        $this->TestUnit = new DbField('view_lab_resultreleasedd', 'view_lab_resultreleasedd', 'x_TestUnit', 'TestUnit', '`TestUnit`', '`TestUnit`', 200, 45, -1, false, '`TestUnit`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TestUnit->Sortable = true; // Allow sort
        $this->TestUnit->Lookup = new Lookup('TestUnit', 'lab_unit_mast', false, 'Code', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->TestUnit->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TestUnit->Param, "CustomMsg");
        $this->Fields['TestUnit'] = &$this->TestUnit;

        // RefValue
        $this->RefValue = new DbField('view_lab_resultreleasedd', 'view_lab_resultreleasedd', 'x_RefValue', 'RefValue', '`RefValue`', '`RefValue`', 201, 65535, -1, false, '`RefValue`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->RefValue->Sortable = true; // Allow sort
        $this->RefValue->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RefValue->Param, "CustomMsg");
        $this->Fields['RefValue'] = &$this->RefValue;

        // Order
        $this->Order = new DbField('view_lab_resultreleasedd', 'view_lab_resultreleasedd', 'x_Order', 'Order', '`Order`', '`Order`', 131, 10, -1, false, '`Order`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Order->Sortable = true; // Allow sort
        $this->Order->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Order->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Order->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Order->Param, "CustomMsg");
        $this->Fields['Order'] = &$this->Order;

        // Repeated
        $this->Repeated = new DbField('view_lab_resultreleasedd', 'view_lab_resultreleasedd', 'x_Repeated', 'Repeated', '`Repeated`', '`Repeated`', 200, 45, -1, false, '`Repeated`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->Repeated->Sortable = true; // Allow sort
        $this->Repeated->Lookup = new Lookup('Repeated', 'view_lab_resultreleasedd', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Repeated->OptionCount = 1;
        $this->Repeated->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Repeated->Param, "CustomMsg");
        $this->Fields['Repeated'] = &$this->Repeated;

        // Vid
        $this->Vid = new DbField('view_lab_resultreleasedd', 'view_lab_resultreleasedd', 'x_Vid', 'Vid', '`Vid`', '`Vid`', 3, 11, -1, false, '`Vid`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Vid->IsForeignKey = true; // Foreign key field
        $this->Vid->Sortable = true; // Allow sort
        $this->Vid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Vid->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Vid->Param, "CustomMsg");
        $this->Fields['Vid'] = &$this->Vid;

        // invoiceId
        $this->invoiceId = new DbField('view_lab_resultreleasedd', 'view_lab_resultreleasedd', 'x_invoiceId', 'invoiceId', '`invoiceId`', '`invoiceId`', 3, 11, -1, false, '`invoiceId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->invoiceId->Sortable = true; // Allow sort
        $this->invoiceId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->invoiceId->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->invoiceId->Param, "CustomMsg");
        $this->Fields['invoiceId'] = &$this->invoiceId;

        // DrID
        $this->DrID = new DbField('view_lab_resultreleasedd', 'view_lab_resultreleasedd', 'x_DrID', 'DrID', '`DrID`', '`DrID`', 3, 11, -1, false, '`DrID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DrID->Sortable = true; // Allow sort
        $this->DrID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->DrID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DrID->Param, "CustomMsg");
        $this->Fields['DrID'] = &$this->DrID;

        // DrCODE
        $this->DrCODE = new DbField('view_lab_resultreleasedd', 'view_lab_resultreleasedd', 'x_DrCODE', 'DrCODE', '`DrCODE`', '`DrCODE`', 200, 45, -1, false, '`DrCODE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DrCODE->Sortable = true; // Allow sort
        $this->DrCODE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DrCODE->Param, "CustomMsg");
        $this->Fields['DrCODE'] = &$this->DrCODE;

        // DrName
        $this->DrName = new DbField('view_lab_resultreleasedd', 'view_lab_resultreleasedd', 'x_DrName', 'DrName', '`DrName`', '`DrName`', 200, 45, -1, false, '`DrName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DrName->Sortable = true; // Allow sort
        $this->DrName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DrName->Param, "CustomMsg");
        $this->Fields['DrName'] = &$this->DrName;

        // Department
        $this->Department = new DbField('view_lab_resultreleasedd', 'view_lab_resultreleasedd', 'x_Department', 'Department', '`Department`', '`Department`', 200, 45, -1, false, '`Department`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Department->Sortable = true; // Allow sort
        $this->Department->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Department->Param, "CustomMsg");
        $this->Fields['Department'] = &$this->Department;

        // createddatetime
        $this->createddatetime = new DbField('view_lab_resultreleasedd', 'view_lab_resultreleasedd', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, false, '`createddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddatetime->Sortable = true; // Allow sort
        $this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->createddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createddatetime->Param, "CustomMsg");
        $this->Fields['createddatetime'] = &$this->createddatetime;

        // status
        $this->status = new DbField('view_lab_resultreleasedd', 'view_lab_resultreleasedd', 'x_status', 'status', '`status`', '`status`', 3, 11, -1, false, '`status`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->status->Sortable = true; // Allow sort
        $this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->status->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->status->Param, "CustomMsg");
        $this->Fields['status'] = &$this->status;

        // TestType
        $this->TestType = new DbField('view_lab_resultreleasedd', 'view_lab_resultreleasedd', 'x_TestType', 'TestType', '`TestType`', '`TestType`', 200, 45, -1, false, '`TestType`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TestType->Sortable = true; // Allow sort
        $this->TestType->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TestType->Param, "CustomMsg");
        $this->Fields['TestType'] = &$this->TestType;

        // ResultDate
        $this->ResultDate = new DbField('view_lab_resultreleasedd', 'view_lab_resultreleasedd', 'x_ResultDate', 'ResultDate', '`ResultDate`', CastDateFieldForLike("`ResultDate`", 0, "DB"), 135, 19, 0, false, '`ResultDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ResultDate->Sortable = true; // Allow sort
        $this->ResultDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->ResultDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ResultDate->Param, "CustomMsg");
        $this->Fields['ResultDate'] = &$this->ResultDate;

        // ResultedBy
        $this->ResultedBy = new DbField('view_lab_resultreleasedd', 'view_lab_resultreleasedd', 'x_ResultedBy', 'ResultedBy', '`ResultedBy`', '`ResultedBy`', 200, 45, -1, false, '`ResultedBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ResultedBy->Sortable = true; // Allow sort
        $this->ResultedBy->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ResultedBy->Param, "CustomMsg");
        $this->Fields['ResultedBy'] = &$this->ResultedBy;

        // HospID
        $this->HospID = new DbField('view_lab_resultreleasedd', 'view_lab_resultreleasedd', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
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
        if ($this->getCurrentMasterTable() == "view_lab_servicess") {
            if ($this->Vid->getSessionValue() != "") {
                $masterFilter .= "" . GetForeignKeySql("`id`", $this->Vid->getSessionValue(), DATATYPE_NUMBER, "DB");
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
        if ($this->getCurrentMasterTable() == "view_lab_servicess") {
            if ($this->Vid->getSessionValue() != "") {
                $detailFilter .= "" . GetForeignKeySql("`Vid`", $this->Vid->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
        }
        return $detailFilter;
    }

    // Master filter
    public function sqlMasterFilter_view_lab_servicess()
    {
        return "`id`=@id@";
    }
    // Detail filter
    public function sqlDetailFilter_view_lab_servicess()
    {
        return "`Vid`=@Vid@";
    }

    // Table level SQL
    public function getSqlFrom() // From
    {
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_lab_resultreleasedd`";
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
        $this->PatID->DbValue = $row['PatID'];
        $this->PatientName->DbValue = $row['PatientName'];
        $this->Age->DbValue = $row['Age'];
        $this->Gender->DbValue = $row['Gender'];
        $this->sid->DbValue = $row['sid'];
        $this->ItemCode->DbValue = $row['ItemCode'];
        $this->DEptCd->DbValue = $row['DEptCd'];
        $this->Resulted->DbValue = $row['Resulted'];
        $this->Services->DbValue = $row['Services'];
        $this->LabReport->DbValue = $row['LabReport'];
        $this->Pic1->Upload->DbValue = $row['Pic1'];
        $this->Pic2->Upload->DbValue = $row['Pic2'];
        $this->TestUnit->DbValue = $row['TestUnit'];
        $this->RefValue->DbValue = $row['RefValue'];
        $this->Order->DbValue = $row['Order'];
        $this->Repeated->DbValue = $row['Repeated'];
        $this->Vid->DbValue = $row['Vid'];
        $this->invoiceId->DbValue = $row['invoiceId'];
        $this->DrID->DbValue = $row['DrID'];
        $this->DrCODE->DbValue = $row['DrCODE'];
        $this->DrName->DbValue = $row['DrName'];
        $this->Department->DbValue = $row['Department'];
        $this->createddatetime->DbValue = $row['createddatetime'];
        $this->status->DbValue = $row['status'];
        $this->TestType->DbValue = $row['TestType'];
        $this->ResultDate->DbValue = $row['ResultDate'];
        $this->ResultedBy->DbValue = $row['ResultedBy'];
        $this->HospID->DbValue = $row['HospID'];
    }

    // Delete uploaded files
    public function deleteUploadedFiles($row)
    {
        $this->loadDbValues($row);
        $oldFiles = EmptyValue($row['Pic1']) ? [] : [$row['Pic1']];
        foreach ($oldFiles as $oldFile) {
            if (file_exists($this->Pic1->oldPhysicalUploadPath() . $oldFile)) {
                @unlink($this->Pic1->oldPhysicalUploadPath() . $oldFile);
            }
        }
        $oldFiles = EmptyValue($row['Pic2']) ? [] : [$row['Pic2']];
        foreach ($oldFiles as $oldFile) {
            if (file_exists($this->Pic2->oldPhysicalUploadPath() . $oldFile)) {
                @unlink($this->Pic2->oldPhysicalUploadPath() . $oldFile);
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
        return $_SESSION[$name] ?? GetUrl("ViewLabResultreleaseddList");
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
        if ($pageName == "ViewLabResultreleaseddView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewLabResultreleaseddEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewLabResultreleaseddAdd") {
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
                return "ViewLabResultreleaseddView";
            case Config("API_ADD_ACTION"):
                return "ViewLabResultreleaseddAdd";
            case Config("API_EDIT_ACTION"):
                return "ViewLabResultreleaseddEdit";
            case Config("API_DELETE_ACTION"):
                return "ViewLabResultreleaseddDelete";
            case Config("API_LIST_ACTION"):
                return "ViewLabResultreleaseddList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewLabResultreleaseddList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewLabResultreleaseddView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewLabResultreleaseddView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewLabResultreleaseddAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewLabResultreleaseddAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewLabResultreleaseddEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewLabResultreleaseddAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewLabResultreleaseddDelete", $this->getUrlParm());
    }

    // Add master url
    public function addMasterUrl($url)
    {
        if ($this->getCurrentMasterTable() == "view_lab_servicess" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
            $url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
            $url .= "&" . GetForeignKeyUrl("fk_id", $this->Vid->CurrentValue ?? $this->Vid->getSessionValue());
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
        $this->PatID->setDbValue($row['PatID']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->Age->setDbValue($row['Age']);
        $this->Gender->setDbValue($row['Gender']);
        $this->sid->setDbValue($row['sid']);
        $this->ItemCode->setDbValue($row['ItemCode']);
        $this->DEptCd->setDbValue($row['DEptCd']);
        $this->Resulted->setDbValue($row['Resulted']);
        $this->Services->setDbValue($row['Services']);
        $this->LabReport->setDbValue($row['LabReport']);
        $this->Pic1->Upload->DbValue = $row['Pic1'];
        $this->Pic1->setDbValue($this->Pic1->Upload->DbValue);
        $this->Pic2->Upload->DbValue = $row['Pic2'];
        $this->Pic2->setDbValue($this->Pic2->Upload->DbValue);
        $this->TestUnit->setDbValue($row['TestUnit']);
        $this->RefValue->setDbValue($row['RefValue']);
        $this->Order->setDbValue($row['Order']);
        $this->Repeated->setDbValue($row['Repeated']);
        $this->Vid->setDbValue($row['Vid']);
        $this->invoiceId->setDbValue($row['invoiceId']);
        $this->DrID->setDbValue($row['DrID']);
        $this->DrCODE->setDbValue($row['DrCODE']);
        $this->DrName->setDbValue($row['DrName']);
        $this->Department->setDbValue($row['Department']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->status->setDbValue($row['status']);
        $this->TestType->setDbValue($row['TestType']);
        $this->ResultDate->setDbValue($row['ResultDate']);
        $this->ResultedBy->setDbValue($row['ResultedBy']);
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

        // PatID

        // PatientName

        // Age

        // Gender

        // sid

        // ItemCode

        // DEptCd

        // Resulted

        // Services

        // LabReport

        // Pic1

        // Pic2

        // TestUnit

        // RefValue

        // Order

        // Repeated

        // Vid

        // invoiceId

        // DrID

        // DrCODE

        // DrName

        // Department

        // createddatetime

        // status

        // TestType

        // ResultDate

        // ResultedBy

        // HospID

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // PatID
        $this->PatID->ViewValue = $this->PatID->CurrentValue;
        $this->PatID->ViewValue = FormatNumber($this->PatID->ViewValue, 0, -2, -2, -2);
        $this->PatID->ViewCustomAttributes = "";

        // PatientName
        $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
        $this->PatientName->ViewCustomAttributes = "";

        // Age
        $this->Age->ViewValue = $this->Age->CurrentValue;
        $this->Age->ViewCustomAttributes = "";

        // Gender
        $this->Gender->ViewValue = $this->Gender->CurrentValue;
        $this->Gender->ViewCustomAttributes = "";

        // sid
        $this->sid->ViewValue = $this->sid->CurrentValue;
        $this->sid->ViewValue = FormatNumber($this->sid->ViewValue, 0, -2, -2, -2);
        $this->sid->ViewCustomAttributes = "";

        // ItemCode
        $this->ItemCode->ViewValue = $this->ItemCode->CurrentValue;
        $this->ItemCode->ViewCustomAttributes = "";

        // DEptCd
        $this->DEptCd->ViewValue = $this->DEptCd->CurrentValue;
        $this->DEptCd->ViewCustomAttributes = "";

        // Resulted
        if (strval($this->Resulted->CurrentValue) != "") {
            $this->Resulted->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->Resulted->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->Resulted->ViewValue->add($this->Resulted->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->Resulted->ViewValue = null;
        }
        $this->Resulted->ViewCustomAttributes = "";

        // Services
        $this->Services->ViewValue = $this->Services->CurrentValue;
        $this->Services->ViewCustomAttributes = "";

        // LabReport
        $this->LabReport->ViewValue = $this->LabReport->CurrentValue;
        $this->LabReport->ViewCustomAttributes = "";

        // Pic1
        if (!EmptyValue($this->Pic1->Upload->DbValue)) {
            $this->Pic1->ViewValue = $this->Pic1->Upload->DbValue;
        } else {
            $this->Pic1->ViewValue = "";
        }
        $this->Pic1->ViewCustomAttributes = "";

        // Pic2
        if (!EmptyValue($this->Pic2->Upload->DbValue)) {
            $this->Pic2->ViewValue = $this->Pic2->Upload->DbValue;
        } else {
            $this->Pic2->ViewValue = "";
        }
        $this->Pic2->ViewCustomAttributes = "";

        // TestUnit
        $this->TestUnit->ViewValue = $this->TestUnit->CurrentValue;
        $curVal = trim(strval($this->TestUnit->CurrentValue));
        if ($curVal != "") {
            $this->TestUnit->ViewValue = $this->TestUnit->lookupCacheOption($curVal);
            if ($this->TestUnit->ViewValue === null) { // Lookup from database
                $filterWrk = "`Code`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->TestUnit->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->TestUnit->Lookup->renderViewRow($rswrk[0]);
                    $this->TestUnit->ViewValue = $this->TestUnit->displayValue($arwrk);
                } else {
                    $this->TestUnit->ViewValue = $this->TestUnit->CurrentValue;
                }
            }
        } else {
            $this->TestUnit->ViewValue = null;
        }
        $this->TestUnit->ViewCustomAttributes = "";

        // RefValue
        $this->RefValue->ViewValue = $this->RefValue->CurrentValue;
        $this->RefValue->ViewCustomAttributes = "";

        // Order
        $this->Order->ViewValue = $this->Order->CurrentValue;
        $this->Order->ViewValue = FormatNumber($this->Order->ViewValue, 2, -2, -2, -2);
        $this->Order->ViewCustomAttributes = "";

        // Repeated
        if (strval($this->Repeated->CurrentValue) != "") {
            $this->Repeated->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->Repeated->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->Repeated->ViewValue->add($this->Repeated->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->Repeated->ViewValue = null;
        }
        $this->Repeated->ViewCustomAttributes = "";

        // Vid
        $this->Vid->ViewValue = $this->Vid->CurrentValue;
        $this->Vid->ViewValue = FormatNumber($this->Vid->ViewValue, 0, -2, -2, -2);
        $this->Vid->ViewCustomAttributes = "";

        // invoiceId
        $this->invoiceId->ViewValue = $this->invoiceId->CurrentValue;
        $this->invoiceId->ViewValue = FormatNumber($this->invoiceId->ViewValue, 0, -2, -2, -2);
        $this->invoiceId->ViewCustomAttributes = "";

        // DrID
        $this->DrID->ViewValue = $this->DrID->CurrentValue;
        $this->DrID->ViewValue = FormatNumber($this->DrID->ViewValue, 0, -2, -2, -2);
        $this->DrID->ViewCustomAttributes = "";

        // DrCODE
        $this->DrCODE->ViewValue = $this->DrCODE->CurrentValue;
        $this->DrCODE->ViewCustomAttributes = "";

        // DrName
        $this->DrName->ViewValue = $this->DrName->CurrentValue;
        $this->DrName->ViewCustomAttributes = "";

        // Department
        $this->Department->ViewValue = $this->Department->CurrentValue;
        $this->Department->ViewCustomAttributes = "";

        // createddatetime
        $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
        $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
        $this->createddatetime->ViewCustomAttributes = "";

        // status
        $this->status->ViewValue = $this->status->CurrentValue;
        $this->status->ViewValue = FormatNumber($this->status->ViewValue, 0, -2, -2, -2);
        $this->status->ViewCustomAttributes = "";

        // TestType
        $this->TestType->ViewValue = $this->TestType->CurrentValue;
        $this->TestType->ViewCustomAttributes = "";

        // ResultDate
        $this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
        $this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 0);
        $this->ResultDate->ViewCustomAttributes = "";

        // ResultedBy
        $this->ResultedBy->ViewValue = $this->ResultedBy->CurrentValue;
        $this->ResultedBy->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // PatID
        $this->PatID->LinkCustomAttributes = "";
        $this->PatID->HrefValue = "";
        $this->PatID->TooltipValue = "";

        // PatientName
        $this->PatientName->LinkCustomAttributes = "";
        $this->PatientName->HrefValue = "";
        $this->PatientName->TooltipValue = "";

        // Age
        $this->Age->LinkCustomAttributes = "";
        $this->Age->HrefValue = "";
        $this->Age->TooltipValue = "";

        // Gender
        $this->Gender->LinkCustomAttributes = "";
        $this->Gender->HrefValue = "";
        $this->Gender->TooltipValue = "";

        // sid
        $this->sid->LinkCustomAttributes = "";
        $this->sid->HrefValue = "";
        $this->sid->TooltipValue = "";

        // ItemCode
        $this->ItemCode->LinkCustomAttributes = "";
        $this->ItemCode->HrefValue = "";
        $this->ItemCode->TooltipValue = "";

        // DEptCd
        $this->DEptCd->LinkCustomAttributes = "";
        $this->DEptCd->HrefValue = "";
        $this->DEptCd->TooltipValue = "";

        // Resulted
        $this->Resulted->LinkCustomAttributes = "";
        $this->Resulted->HrefValue = "";
        $this->Resulted->TooltipValue = "";

        // Services
        $this->Services->LinkCustomAttributes = "";
        $this->Services->HrefValue = "";
        $this->Services->TooltipValue = "";

        // LabReport
        $this->LabReport->LinkCustomAttributes = "";
        $this->LabReport->HrefValue = "";
        $this->LabReport->TooltipValue = "";

        // Pic1
        $this->Pic1->LinkCustomAttributes = "";
        $this->Pic1->HrefValue = "";
        $this->Pic1->ExportHrefValue = $this->Pic1->UploadPath . $this->Pic1->Upload->DbValue;
        $this->Pic1->TooltipValue = "";

        // Pic2
        $this->Pic2->LinkCustomAttributes = "";
        $this->Pic2->HrefValue = "";
        $this->Pic2->ExportHrefValue = $this->Pic2->UploadPath . $this->Pic2->Upload->DbValue;
        $this->Pic2->TooltipValue = "";

        // TestUnit
        $this->TestUnit->LinkCustomAttributes = "";
        $this->TestUnit->HrefValue = "";
        $this->TestUnit->TooltipValue = "";

        // RefValue
        $this->RefValue->LinkCustomAttributes = "";
        $this->RefValue->HrefValue = "";
        $this->RefValue->TooltipValue = "";

        // Order
        $this->Order->LinkCustomAttributes = "";
        $this->Order->HrefValue = "";
        $this->Order->TooltipValue = "";

        // Repeated
        $this->Repeated->LinkCustomAttributes = "";
        $this->Repeated->HrefValue = "";
        $this->Repeated->TooltipValue = "";

        // Vid
        $this->Vid->LinkCustomAttributes = "";
        $this->Vid->HrefValue = "";
        $this->Vid->TooltipValue = "";

        // invoiceId
        $this->invoiceId->LinkCustomAttributes = "";
        $this->invoiceId->HrefValue = "";
        $this->invoiceId->TooltipValue = "";

        // DrID
        $this->DrID->LinkCustomAttributes = "";
        $this->DrID->HrefValue = "";
        $this->DrID->TooltipValue = "";

        // DrCODE
        $this->DrCODE->LinkCustomAttributes = "";
        $this->DrCODE->HrefValue = "";
        $this->DrCODE->TooltipValue = "";

        // DrName
        $this->DrName->LinkCustomAttributes = "";
        $this->DrName->HrefValue = "";
        $this->DrName->TooltipValue = "";

        // Department
        $this->Department->LinkCustomAttributes = "";
        $this->Department->HrefValue = "";
        $this->Department->TooltipValue = "";

        // createddatetime
        $this->createddatetime->LinkCustomAttributes = "";
        $this->createddatetime->HrefValue = "";
        $this->createddatetime->TooltipValue = "";

        // status
        $this->status->LinkCustomAttributes = "";
        $this->status->HrefValue = "";
        $this->status->TooltipValue = "";

        // TestType
        $this->TestType->LinkCustomAttributes = "";
        $this->TestType->HrefValue = "";
        $this->TestType->TooltipValue = "";

        // ResultDate
        $this->ResultDate->LinkCustomAttributes = "";
        $this->ResultDate->HrefValue = "";
        $this->ResultDate->TooltipValue = "";

        // ResultedBy
        $this->ResultedBy->LinkCustomAttributes = "";
        $this->ResultedBy->HrefValue = "";
        $this->ResultedBy->TooltipValue = "";

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

        // PatID
        $this->PatID->EditAttrs["class"] = "form-control";
        $this->PatID->EditCustomAttributes = "";
        $this->PatID->EditValue = $this->PatID->CurrentValue;
        $this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

        // PatientName
        $this->PatientName->EditAttrs["class"] = "form-control";
        $this->PatientName->EditCustomAttributes = "";
        if (!$this->PatientName->Raw) {
            $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
        }
        $this->PatientName->EditValue = $this->PatientName->CurrentValue;
        $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

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

        // sid
        $this->sid->EditAttrs["class"] = "form-control";
        $this->sid->EditCustomAttributes = "";
        $this->sid->EditValue = $this->sid->CurrentValue;
        $this->sid->PlaceHolder = RemoveHtml($this->sid->caption());

        // ItemCode
        $this->ItemCode->EditAttrs["class"] = "form-control";
        $this->ItemCode->EditCustomAttributes = "";
        if (!$this->ItemCode->Raw) {
            $this->ItemCode->CurrentValue = HtmlDecode($this->ItemCode->CurrentValue);
        }
        $this->ItemCode->EditValue = $this->ItemCode->CurrentValue;
        $this->ItemCode->PlaceHolder = RemoveHtml($this->ItemCode->caption());

        // DEptCd
        $this->DEptCd->EditAttrs["class"] = "form-control";
        $this->DEptCd->EditCustomAttributes = "";
        if (!$this->DEptCd->Raw) {
            $this->DEptCd->CurrentValue = HtmlDecode($this->DEptCd->CurrentValue);
        }
        $this->DEptCd->EditValue = $this->DEptCd->CurrentValue;
        $this->DEptCd->PlaceHolder = RemoveHtml($this->DEptCd->caption());

        // Resulted
        $this->Resulted->EditCustomAttributes = "";
        $this->Resulted->EditValue = $this->Resulted->options(false);
        $this->Resulted->PlaceHolder = RemoveHtml($this->Resulted->caption());

        // Services
        $this->Services->EditAttrs["class"] = "form-control";
        $this->Services->EditCustomAttributes = "";
        if (!$this->Services->Raw) {
            $this->Services->CurrentValue = HtmlDecode($this->Services->CurrentValue);
        }
        $this->Services->EditValue = $this->Services->CurrentValue;
        $this->Services->PlaceHolder = RemoveHtml($this->Services->caption());

        // LabReport
        $this->LabReport->EditAttrs["class"] = "form-control";
        $this->LabReport->EditCustomAttributes = "";
        $this->LabReport->EditValue = $this->LabReport->CurrentValue;
        $this->LabReport->PlaceHolder = RemoveHtml($this->LabReport->caption());

        // Pic1
        $this->Pic1->EditAttrs["class"] = "form-control";
        $this->Pic1->EditCustomAttributes = "";
        if (!EmptyValue($this->Pic1->Upload->DbValue)) {
            $this->Pic1->EditValue = $this->Pic1->Upload->DbValue;
        } else {
            $this->Pic1->EditValue = "";
        }
        if (!EmptyValue($this->Pic1->CurrentValue)) {
            $this->Pic1->Upload->FileName = $this->Pic1->CurrentValue;
        }

        // Pic2
        $this->Pic2->EditAttrs["class"] = "form-control";
        $this->Pic2->EditCustomAttributes = "";
        if (!EmptyValue($this->Pic2->Upload->DbValue)) {
            $this->Pic2->EditValue = $this->Pic2->Upload->DbValue;
        } else {
            $this->Pic2->EditValue = "";
        }
        if (!EmptyValue($this->Pic2->CurrentValue)) {
            $this->Pic2->Upload->FileName = $this->Pic2->CurrentValue;
        }

        // TestUnit
        $this->TestUnit->EditAttrs["class"] = "form-control";
        $this->TestUnit->EditCustomAttributes = "";
        if (!$this->TestUnit->Raw) {
            $this->TestUnit->CurrentValue = HtmlDecode($this->TestUnit->CurrentValue);
        }
        $this->TestUnit->EditValue = $this->TestUnit->CurrentValue;
        $this->TestUnit->PlaceHolder = RemoveHtml($this->TestUnit->caption());

        // RefValue
        $this->RefValue->EditAttrs["class"] = "form-control";
        $this->RefValue->EditCustomAttributes = "";
        $this->RefValue->EditValue = $this->RefValue->CurrentValue;
        $this->RefValue->PlaceHolder = RemoveHtml($this->RefValue->caption());

        // Order
        $this->Order->EditAttrs["class"] = "form-control";
        $this->Order->EditCustomAttributes = "";
        $this->Order->EditValue = $this->Order->CurrentValue;
        $this->Order->PlaceHolder = RemoveHtml($this->Order->caption());
        if (strval($this->Order->EditValue) != "" && is_numeric($this->Order->EditValue)) {
            $this->Order->EditValue = FormatNumber($this->Order->EditValue, -2, -2, -2, -2);
        }

        // Repeated
        $this->Repeated->EditCustomAttributes = "";
        $this->Repeated->EditValue = $this->Repeated->options(false);
        $this->Repeated->PlaceHolder = RemoveHtml($this->Repeated->caption());

        // Vid
        $this->Vid->EditAttrs["class"] = "form-control";
        $this->Vid->EditCustomAttributes = "";
        if ($this->Vid->getSessionValue() != "") {
            $this->Vid->CurrentValue = GetForeignKeyValue($this->Vid->getSessionValue());
            $this->Vid->ViewValue = $this->Vid->CurrentValue;
            $this->Vid->ViewValue = FormatNumber($this->Vid->ViewValue, 0, -2, -2, -2);
            $this->Vid->ViewCustomAttributes = "";
        } else {
            $this->Vid->EditValue = $this->Vid->CurrentValue;
            $this->Vid->PlaceHolder = RemoveHtml($this->Vid->caption());
        }

        // invoiceId
        $this->invoiceId->EditAttrs["class"] = "form-control";
        $this->invoiceId->EditCustomAttributes = "";
        $this->invoiceId->EditValue = $this->invoiceId->CurrentValue;
        $this->invoiceId->PlaceHolder = RemoveHtml($this->invoiceId->caption());

        // DrID
        $this->DrID->EditAttrs["class"] = "form-control";
        $this->DrID->EditCustomAttributes = "";
        $this->DrID->EditValue = $this->DrID->CurrentValue;
        $this->DrID->PlaceHolder = RemoveHtml($this->DrID->caption());

        // DrCODE
        $this->DrCODE->EditAttrs["class"] = "form-control";
        $this->DrCODE->EditCustomAttributes = "";
        if (!$this->DrCODE->Raw) {
            $this->DrCODE->CurrentValue = HtmlDecode($this->DrCODE->CurrentValue);
        }
        $this->DrCODE->EditValue = $this->DrCODE->CurrentValue;
        $this->DrCODE->PlaceHolder = RemoveHtml($this->DrCODE->caption());

        // DrName
        $this->DrName->EditAttrs["class"] = "form-control";
        $this->DrName->EditCustomAttributes = "";
        if (!$this->DrName->Raw) {
            $this->DrName->CurrentValue = HtmlDecode($this->DrName->CurrentValue);
        }
        $this->DrName->EditValue = $this->DrName->CurrentValue;
        $this->DrName->PlaceHolder = RemoveHtml($this->DrName->caption());

        // Department
        $this->Department->EditAttrs["class"] = "form-control";
        $this->Department->EditCustomAttributes = "";
        if (!$this->Department->Raw) {
            $this->Department->CurrentValue = HtmlDecode($this->Department->CurrentValue);
        }
        $this->Department->EditValue = $this->Department->CurrentValue;
        $this->Department->PlaceHolder = RemoveHtml($this->Department->caption());

        // createddatetime
        $this->createddatetime->EditAttrs["class"] = "form-control";
        $this->createddatetime->EditCustomAttributes = "";
        $this->createddatetime->EditValue = FormatDateTime($this->createddatetime->CurrentValue, 8);
        $this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

        // status
        $this->status->EditAttrs["class"] = "form-control";
        $this->status->EditCustomAttributes = "";
        $this->status->EditValue = $this->status->CurrentValue;
        $this->status->PlaceHolder = RemoveHtml($this->status->caption());

        // TestType
        $this->TestType->EditAttrs["class"] = "form-control";
        $this->TestType->EditCustomAttributes = "";
        if (!$this->TestType->Raw) {
            $this->TestType->CurrentValue = HtmlDecode($this->TestType->CurrentValue);
        }
        $this->TestType->EditValue = $this->TestType->CurrentValue;
        $this->TestType->PlaceHolder = RemoveHtml($this->TestType->caption());

        // ResultDate

        // ResultedBy

        // HospID
        $this->HospID->EditAttrs["class"] = "form-control";
        $this->HospID->EditCustomAttributes = "";
        $this->HospID->EditValue = $this->HospID->CurrentValue;
        $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

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
                    $doc->exportCaption($this->PatID);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->Age);
                    $doc->exportCaption($this->Gender);
                    $doc->exportCaption($this->sid);
                    $doc->exportCaption($this->ItemCode);
                    $doc->exportCaption($this->DEptCd);
                    $doc->exportCaption($this->Resulted);
                    $doc->exportCaption($this->Services);
                    $doc->exportCaption($this->LabReport);
                    $doc->exportCaption($this->Pic1);
                    $doc->exportCaption($this->Pic2);
                    $doc->exportCaption($this->TestUnit);
                    $doc->exportCaption($this->RefValue);
                    $doc->exportCaption($this->Order);
                    $doc->exportCaption($this->Repeated);
                    $doc->exportCaption($this->Vid);
                    $doc->exportCaption($this->invoiceId);
                    $doc->exportCaption($this->DrID);
                    $doc->exportCaption($this->DrCODE);
                    $doc->exportCaption($this->DrName);
                    $doc->exportCaption($this->Department);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->TestType);
                    $doc->exportCaption($this->ResultDate);
                    $doc->exportCaption($this->ResultedBy);
                    $doc->exportCaption($this->HospID);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->PatID);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->Age);
                    $doc->exportCaption($this->Gender);
                    $doc->exportCaption($this->sid);
                    $doc->exportCaption($this->ItemCode);
                    $doc->exportCaption($this->DEptCd);
                    $doc->exportCaption($this->Resulted);
                    $doc->exportCaption($this->Services);
                    $doc->exportCaption($this->LabReport);
                    $doc->exportCaption($this->Pic1);
                    $doc->exportCaption($this->Pic2);
                    $doc->exportCaption($this->TestUnit);
                    $doc->exportCaption($this->RefValue);
                    $doc->exportCaption($this->Order);
                    $doc->exportCaption($this->Repeated);
                    $doc->exportCaption($this->Vid);
                    $doc->exportCaption($this->invoiceId);
                    $doc->exportCaption($this->DrID);
                    $doc->exportCaption($this->DrCODE);
                    $doc->exportCaption($this->DrName);
                    $doc->exportCaption($this->Department);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->TestType);
                    $doc->exportCaption($this->ResultDate);
                    $doc->exportCaption($this->ResultedBy);
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
                        $doc->exportField($this->PatID);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->Age);
                        $doc->exportField($this->Gender);
                        $doc->exportField($this->sid);
                        $doc->exportField($this->ItemCode);
                        $doc->exportField($this->DEptCd);
                        $doc->exportField($this->Resulted);
                        $doc->exportField($this->Services);
                        $doc->exportField($this->LabReport);
                        $doc->exportField($this->Pic1);
                        $doc->exportField($this->Pic2);
                        $doc->exportField($this->TestUnit);
                        $doc->exportField($this->RefValue);
                        $doc->exportField($this->Order);
                        $doc->exportField($this->Repeated);
                        $doc->exportField($this->Vid);
                        $doc->exportField($this->invoiceId);
                        $doc->exportField($this->DrID);
                        $doc->exportField($this->DrCODE);
                        $doc->exportField($this->DrName);
                        $doc->exportField($this->Department);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->status);
                        $doc->exportField($this->TestType);
                        $doc->exportField($this->ResultDate);
                        $doc->exportField($this->ResultedBy);
                        $doc->exportField($this->HospID);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->PatID);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->Age);
                        $doc->exportField($this->Gender);
                        $doc->exportField($this->sid);
                        $doc->exportField($this->ItemCode);
                        $doc->exportField($this->DEptCd);
                        $doc->exportField($this->Resulted);
                        $doc->exportField($this->Services);
                        $doc->exportField($this->LabReport);
                        $doc->exportField($this->Pic1);
                        $doc->exportField($this->Pic2);
                        $doc->exportField($this->TestUnit);
                        $doc->exportField($this->RefValue);
                        $doc->exportField($this->Order);
                        $doc->exportField($this->Repeated);
                        $doc->exportField($this->Vid);
                        $doc->exportField($this->invoiceId);
                        $doc->exportField($this->DrID);
                        $doc->exportField($this->DrCODE);
                        $doc->exportField($this->DrName);
                        $doc->exportField($this->Department);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->status);
                        $doc->exportField($this->TestType);
                        $doc->exportField($this->ResultDate);
                        $doc->exportField($this->ResultedBy);
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
        $width = ($width > 0) ? $width : Config("THUMBNAIL_DEFAULT_WIDTH");
        $height = ($height > 0) ? $height : Config("THUMBNAIL_DEFAULT_HEIGHT");

        // Set up field name / file name field / file type field
        $fldName = "";
        $fileNameFld = "";
        $fileTypeFld = "";
        if ($fldparm == 'Pic1') {
            $fldName = "Pic1";
            $fileNameFld = "Pic1";
        } elseif ($fldparm == 'Pic2') {
            $fldName = "Pic2";
            $fileNameFld = "Pic2";
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
