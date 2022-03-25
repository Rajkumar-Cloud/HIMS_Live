<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for lab_profile_master
 */
class LabProfileMaster extends DbTable
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
    public $ProfileCode;
    public $ProfileName;
    public $ProfileAmount;
    public $ProfileSpecialAmount;
    public $ProfileMasterInactive;
    public $ReagentAmt;
    public $LabAmt;
    public $RefAmt;
    public $MainDeptCD;
    public $Individual;
    public $ShortName;
    public $Note;
    public $PrevAmt;
    public $BillName;
    public $ActualAmt;
    public $NoHeading;
    public $EditDate;
    public $EditUser;
    public $HISCD;
    public $PriceList;
    public $IPAmt;
    public $IInsAmt;
    public $ManualCD;
    public $Free;
    public $IIpAmt;
    public $InsAmt;
    public $OutSource;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'lab_profile_master';
        $this->TableName = 'lab_profile_master';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`lab_profile_master`";
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
        $this->id = new DbField('lab_profile_master', 'lab_profile_master', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['id'] = &$this->id;

        // ProfileCode
        $this->ProfileCode = new DbField('lab_profile_master', 'lab_profile_master', 'x_ProfileCode', 'ProfileCode', '`ProfileCode`', '`ProfileCode`', 200, 6, -1, false, '`ProfileCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ProfileCode->Nullable = false; // NOT NULL field
        $this->ProfileCode->Required = true; // Required field
        $this->ProfileCode->Sortable = true; // Allow sort
        $this->Fields['ProfileCode'] = &$this->ProfileCode;

        // ProfileName
        $this->ProfileName = new DbField('lab_profile_master', 'lab_profile_master', 'x_ProfileName', 'ProfileName', '`ProfileName`', '`ProfileName`', 200, 50, -1, false, '`ProfileName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ProfileName->Nullable = false; // NOT NULL field
        $this->ProfileName->Required = true; // Required field
        $this->ProfileName->Sortable = true; // Allow sort
        $this->Fields['ProfileName'] = &$this->ProfileName;

        // ProfileAmount
        $this->ProfileAmount = new DbField('lab_profile_master', 'lab_profile_master', 'x_ProfileAmount', 'ProfileAmount', '`ProfileAmount`', '`ProfileAmount`', 131, 18, -1, false, '`ProfileAmount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ProfileAmount->Nullable = false; // NOT NULL field
        $this->ProfileAmount->Required = true; // Required field
        $this->ProfileAmount->Sortable = true; // Allow sort
        $this->ProfileAmount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->ProfileAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['ProfileAmount'] = &$this->ProfileAmount;

        // ProfileSpecialAmount
        $this->ProfileSpecialAmount = new DbField('lab_profile_master', 'lab_profile_master', 'x_ProfileSpecialAmount', 'ProfileSpecialAmount', '`ProfileSpecialAmount`', '`ProfileSpecialAmount`', 131, 18, -1, false, '`ProfileSpecialAmount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ProfileSpecialAmount->Nullable = false; // NOT NULL field
        $this->ProfileSpecialAmount->Required = true; // Required field
        $this->ProfileSpecialAmount->Sortable = true; // Allow sort
        $this->ProfileSpecialAmount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->ProfileSpecialAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['ProfileSpecialAmount'] = &$this->ProfileSpecialAmount;

        // ProfileMasterInactive
        $this->ProfileMasterInactive = new DbField('lab_profile_master', 'lab_profile_master', 'x_ProfileMasterInactive', 'ProfileMasterInactive', '`ProfileMasterInactive`', '`ProfileMasterInactive`', 200, 1, -1, false, '`ProfileMasterInactive`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ProfileMasterInactive->Nullable = false; // NOT NULL field
        $this->ProfileMasterInactive->Required = true; // Required field
        $this->ProfileMasterInactive->Sortable = true; // Allow sort
        $this->Fields['ProfileMasterInactive'] = &$this->ProfileMasterInactive;

        // ReagentAmt
        $this->ReagentAmt = new DbField('lab_profile_master', 'lab_profile_master', 'x_ReagentAmt', 'ReagentAmt', '`ReagentAmt`', '`ReagentAmt`', 131, 9, -1, false, '`ReagentAmt`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReagentAmt->Nullable = false; // NOT NULL field
        $this->ReagentAmt->Required = true; // Required field
        $this->ReagentAmt->Sortable = true; // Allow sort
        $this->ReagentAmt->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->ReagentAmt->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['ReagentAmt'] = &$this->ReagentAmt;

        // LabAmt
        $this->LabAmt = new DbField('lab_profile_master', 'lab_profile_master', 'x_LabAmt', 'LabAmt', '`LabAmt`', '`LabAmt`', 131, 9, -1, false, '`LabAmt`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->LabAmt->Nullable = false; // NOT NULL field
        $this->LabAmt->Required = true; // Required field
        $this->LabAmt->Sortable = true; // Allow sort
        $this->LabAmt->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->LabAmt->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['LabAmt'] = &$this->LabAmt;

        // RefAmt
        $this->RefAmt = new DbField('lab_profile_master', 'lab_profile_master', 'x_RefAmt', 'RefAmt', '`RefAmt`', '`RefAmt`', 131, 9, -1, false, '`RefAmt`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RefAmt->Nullable = false; // NOT NULL field
        $this->RefAmt->Required = true; // Required field
        $this->RefAmt->Sortable = true; // Allow sort
        $this->RefAmt->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->RefAmt->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['RefAmt'] = &$this->RefAmt;

        // MainDeptCD
        $this->MainDeptCD = new DbField('lab_profile_master', 'lab_profile_master', 'x_MainDeptCD', 'MainDeptCD', '`MainDeptCD`', '`MainDeptCD`', 200, 3, -1, false, '`MainDeptCD`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MainDeptCD->Nullable = false; // NOT NULL field
        $this->MainDeptCD->Required = true; // Required field
        $this->MainDeptCD->Sortable = true; // Allow sort
        $this->Fields['MainDeptCD'] = &$this->MainDeptCD;

        // Individual
        $this->Individual = new DbField('lab_profile_master', 'lab_profile_master', 'x_Individual', 'Individual', '`Individual`', '`Individual`', 200, 1, -1, false, '`Individual`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Individual->Nullable = false; // NOT NULL field
        $this->Individual->Required = true; // Required field
        $this->Individual->Sortable = true; // Allow sort
        $this->Fields['Individual'] = &$this->Individual;

        // ShortName
        $this->ShortName = new DbField('lab_profile_master', 'lab_profile_master', 'x_ShortName', 'ShortName', '`ShortName`', '`ShortName`', 200, 5, -1, false, '`ShortName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ShortName->Nullable = false; // NOT NULL field
        $this->ShortName->Required = true; // Required field
        $this->ShortName->Sortable = true; // Allow sort
        $this->Fields['ShortName'] = &$this->ShortName;

        // Note
        $this->Note = new DbField('lab_profile_master', 'lab_profile_master', 'x_Note', 'Note', '`Note`', '`Note`', 201, 500, -1, false, '`Note`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Note->Nullable = false; // NOT NULL field
        $this->Note->Required = true; // Required field
        $this->Note->Sortable = true; // Allow sort
        $this->Fields['Note'] = &$this->Note;

        // PrevAmt
        $this->PrevAmt = new DbField('lab_profile_master', 'lab_profile_master', 'x_PrevAmt', 'PrevAmt', '`PrevAmt`', '`PrevAmt`', 131, 9, -1, false, '`PrevAmt`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PrevAmt->Nullable = false; // NOT NULL field
        $this->PrevAmt->Required = true; // Required field
        $this->PrevAmt->Sortable = true; // Allow sort
        $this->PrevAmt->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PrevAmt->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['PrevAmt'] = &$this->PrevAmt;

        // BillName
        $this->BillName = new DbField('lab_profile_master', 'lab_profile_master', 'x_BillName', 'BillName', '`BillName`', '`BillName`', 200, 50, -1, false, '`BillName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BillName->Nullable = false; // NOT NULL field
        $this->BillName->Required = true; // Required field
        $this->BillName->Sortable = true; // Allow sort
        $this->Fields['BillName'] = &$this->BillName;

        // ActualAmt
        $this->ActualAmt = new DbField('lab_profile_master', 'lab_profile_master', 'x_ActualAmt', 'ActualAmt', '`ActualAmt`', '`ActualAmt`', 131, 9, -1, false, '`ActualAmt`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ActualAmt->Nullable = false; // NOT NULL field
        $this->ActualAmt->Required = true; // Required field
        $this->ActualAmt->Sortable = true; // Allow sort
        $this->ActualAmt->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->ActualAmt->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['ActualAmt'] = &$this->ActualAmt;

        // NoHeading
        $this->NoHeading = new DbField('lab_profile_master', 'lab_profile_master', 'x_NoHeading', 'NoHeading', '`NoHeading`', '`NoHeading`', 200, 1, -1, false, '`NoHeading`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NoHeading->Nullable = false; // NOT NULL field
        $this->NoHeading->Required = true; // Required field
        $this->NoHeading->Sortable = true; // Allow sort
        $this->Fields['NoHeading'] = &$this->NoHeading;

        // EditDate
        $this->EditDate = new DbField('lab_profile_master', 'lab_profile_master', 'x_EditDate', 'EditDate', '`EditDate`', CastDateFieldForLike("`EditDate`", 0, "DB"), 135, 23, 0, false, '`EditDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EditDate->Sortable = true; // Allow sort
        $this->EditDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['EditDate'] = &$this->EditDate;

        // EditUser
        $this->EditUser = new DbField('lab_profile_master', 'lab_profile_master', 'x_EditUser', 'EditUser', '`EditUser`', '`EditUser`', 200, 10, -1, false, '`EditUser`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EditUser->Nullable = false; // NOT NULL field
        $this->EditUser->Required = true; // Required field
        $this->EditUser->Sortable = true; // Allow sort
        $this->Fields['EditUser'] = &$this->EditUser;

        // HISCD
        $this->HISCD = new DbField('lab_profile_master', 'lab_profile_master', 'x_HISCD', 'HISCD', '`HISCD`', '`HISCD`', 200, 20, -1, false, '`HISCD`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HISCD->Nullable = false; // NOT NULL field
        $this->HISCD->Required = true; // Required field
        $this->HISCD->Sortable = true; // Allow sort
        $this->Fields['HISCD'] = &$this->HISCD;

        // PriceList
        $this->PriceList = new DbField('lab_profile_master', 'lab_profile_master', 'x_PriceList', 'PriceList', '`PriceList`', '`PriceList`', 200, 1, -1, false, '`PriceList`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PriceList->Nullable = false; // NOT NULL field
        $this->PriceList->Required = true; // Required field
        $this->PriceList->Sortable = true; // Allow sort
        $this->Fields['PriceList'] = &$this->PriceList;

        // IPAmt
        $this->IPAmt = new DbField('lab_profile_master', 'lab_profile_master', 'x_IPAmt', 'IPAmt', '`IPAmt`', '`IPAmt`', 131, 9, -1, false, '`IPAmt`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IPAmt->Nullable = false; // NOT NULL field
        $this->IPAmt->Required = true; // Required field
        $this->IPAmt->Sortable = true; // Allow sort
        $this->IPAmt->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->IPAmt->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['IPAmt'] = &$this->IPAmt;

        // IInsAmt
        $this->IInsAmt = new DbField('lab_profile_master', 'lab_profile_master', 'x_IInsAmt', 'IInsAmt', '`IInsAmt`', '`IInsAmt`', 131, 9, -1, false, '`IInsAmt`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IInsAmt->Nullable = false; // NOT NULL field
        $this->IInsAmt->Required = true; // Required field
        $this->IInsAmt->Sortable = true; // Allow sort
        $this->IInsAmt->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->IInsAmt->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['IInsAmt'] = &$this->IInsAmt;

        // ManualCD
        $this->ManualCD = new DbField('lab_profile_master', 'lab_profile_master', 'x_ManualCD', 'ManualCD', '`ManualCD`', '`ManualCD`', 200, 10, -1, false, '`ManualCD`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ManualCD->Nullable = false; // NOT NULL field
        $this->ManualCD->Required = true; // Required field
        $this->ManualCD->Sortable = true; // Allow sort
        $this->Fields['ManualCD'] = &$this->ManualCD;

        // Free
        $this->Free = new DbField('lab_profile_master', 'lab_profile_master', 'x_Free', 'Free', '`Free`', '`Free`', 200, 1, -1, false, '`Free`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Free->Nullable = false; // NOT NULL field
        $this->Free->Required = true; // Required field
        $this->Free->Sortable = true; // Allow sort
        $this->Fields['Free'] = &$this->Free;

        // IIpAmt
        $this->IIpAmt = new DbField('lab_profile_master', 'lab_profile_master', 'x_IIpAmt', 'IIpAmt', '`IIpAmt`', '`IIpAmt`', 131, 18, -1, false, '`IIpAmt`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IIpAmt->Nullable = false; // NOT NULL field
        $this->IIpAmt->Required = true; // Required field
        $this->IIpAmt->Sortable = true; // Allow sort
        $this->IIpAmt->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->IIpAmt->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['IIpAmt'] = &$this->IIpAmt;

        // InsAmt
        $this->InsAmt = new DbField('lab_profile_master', 'lab_profile_master', 'x_InsAmt', 'InsAmt', '`InsAmt`', '`InsAmt`', 131, 18, -1, false, '`InsAmt`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->InsAmt->Nullable = false; // NOT NULL field
        $this->InsAmt->Required = true; // Required field
        $this->InsAmt->Sortable = true; // Allow sort
        $this->InsAmt->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->InsAmt->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['InsAmt'] = &$this->InsAmt;

        // OutSource
        $this->OutSource = new DbField('lab_profile_master', 'lab_profile_master', 'x_OutSource', 'OutSource', '`OutSource`', '`OutSource`', 200, 1, -1, false, '`OutSource`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OutSource->Nullable = false; // NOT NULL field
        $this->OutSource->Required = true; // Required field
        $this->OutSource->Sortable = true; // Allow sort
        $this->Fields['OutSource'] = &$this->OutSource;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`lab_profile_master`";
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
        $this->ProfileCode->DbValue = $row['ProfileCode'];
        $this->ProfileName->DbValue = $row['ProfileName'];
        $this->ProfileAmount->DbValue = $row['ProfileAmount'];
        $this->ProfileSpecialAmount->DbValue = $row['ProfileSpecialAmount'];
        $this->ProfileMasterInactive->DbValue = $row['ProfileMasterInactive'];
        $this->ReagentAmt->DbValue = $row['ReagentAmt'];
        $this->LabAmt->DbValue = $row['LabAmt'];
        $this->RefAmt->DbValue = $row['RefAmt'];
        $this->MainDeptCD->DbValue = $row['MainDeptCD'];
        $this->Individual->DbValue = $row['Individual'];
        $this->ShortName->DbValue = $row['ShortName'];
        $this->Note->DbValue = $row['Note'];
        $this->PrevAmt->DbValue = $row['PrevAmt'];
        $this->BillName->DbValue = $row['BillName'];
        $this->ActualAmt->DbValue = $row['ActualAmt'];
        $this->NoHeading->DbValue = $row['NoHeading'];
        $this->EditDate->DbValue = $row['EditDate'];
        $this->EditUser->DbValue = $row['EditUser'];
        $this->HISCD->DbValue = $row['HISCD'];
        $this->PriceList->DbValue = $row['PriceList'];
        $this->IPAmt->DbValue = $row['IPAmt'];
        $this->IInsAmt->DbValue = $row['IInsAmt'];
        $this->ManualCD->DbValue = $row['ManualCD'];
        $this->Free->DbValue = $row['Free'];
        $this->IIpAmt->DbValue = $row['IIpAmt'];
        $this->InsAmt->DbValue = $row['InsAmt'];
        $this->OutSource->DbValue = $row['OutSource'];
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
            return GetUrl("LabProfileMasterList");
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
        if ($pageName == "LabProfileMasterView") {
            return $Language->phrase("View");
        } elseif ($pageName == "LabProfileMasterEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "LabProfileMasterAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "LabProfileMasterList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("LabProfileMasterView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("LabProfileMasterView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "LabProfileMasterAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "LabProfileMasterAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("LabProfileMasterEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("LabProfileMasterAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("LabProfileMasterDelete", $this->getUrlParm());
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
        $this->ProfileCode->setDbValue($row['ProfileCode']);
        $this->ProfileName->setDbValue($row['ProfileName']);
        $this->ProfileAmount->setDbValue($row['ProfileAmount']);
        $this->ProfileSpecialAmount->setDbValue($row['ProfileSpecialAmount']);
        $this->ProfileMasterInactive->setDbValue($row['ProfileMasterInactive']);
        $this->ReagentAmt->setDbValue($row['ReagentAmt']);
        $this->LabAmt->setDbValue($row['LabAmt']);
        $this->RefAmt->setDbValue($row['RefAmt']);
        $this->MainDeptCD->setDbValue($row['MainDeptCD']);
        $this->Individual->setDbValue($row['Individual']);
        $this->ShortName->setDbValue($row['ShortName']);
        $this->Note->setDbValue($row['Note']);
        $this->PrevAmt->setDbValue($row['PrevAmt']);
        $this->BillName->setDbValue($row['BillName']);
        $this->ActualAmt->setDbValue($row['ActualAmt']);
        $this->NoHeading->setDbValue($row['NoHeading']);
        $this->EditDate->setDbValue($row['EditDate']);
        $this->EditUser->setDbValue($row['EditUser']);
        $this->HISCD->setDbValue($row['HISCD']);
        $this->PriceList->setDbValue($row['PriceList']);
        $this->IPAmt->setDbValue($row['IPAmt']);
        $this->IInsAmt->setDbValue($row['IInsAmt']);
        $this->ManualCD->setDbValue($row['ManualCD']);
        $this->Free->setDbValue($row['Free']);
        $this->IIpAmt->setDbValue($row['IIpAmt']);
        $this->InsAmt->setDbValue($row['InsAmt']);
        $this->OutSource->setDbValue($row['OutSource']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // ProfileCode

        // ProfileName

        // ProfileAmount

        // ProfileSpecialAmount

        // ProfileMasterInactive

        // ReagentAmt

        // LabAmt

        // RefAmt

        // MainDeptCD

        // Individual

        // ShortName

        // Note

        // PrevAmt

        // BillName

        // ActualAmt

        // NoHeading

        // EditDate

        // EditUser

        // HISCD

        // PriceList

        // IPAmt

        // IInsAmt

        // ManualCD

        // Free

        // IIpAmt

        // InsAmt

        // OutSource

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // ProfileCode
        $this->ProfileCode->ViewValue = $this->ProfileCode->CurrentValue;
        $this->ProfileCode->ViewCustomAttributes = "";

        // ProfileName
        $this->ProfileName->ViewValue = $this->ProfileName->CurrentValue;
        $this->ProfileName->ViewCustomAttributes = "";

        // ProfileAmount
        $this->ProfileAmount->ViewValue = $this->ProfileAmount->CurrentValue;
        $this->ProfileAmount->ViewValue = FormatNumber($this->ProfileAmount->ViewValue, 2, -2, -2, -2);
        $this->ProfileAmount->ViewCustomAttributes = "";

        // ProfileSpecialAmount
        $this->ProfileSpecialAmount->ViewValue = $this->ProfileSpecialAmount->CurrentValue;
        $this->ProfileSpecialAmount->ViewValue = FormatNumber($this->ProfileSpecialAmount->ViewValue, 2, -2, -2, -2);
        $this->ProfileSpecialAmount->ViewCustomAttributes = "";

        // ProfileMasterInactive
        $this->ProfileMasterInactive->ViewValue = $this->ProfileMasterInactive->CurrentValue;
        $this->ProfileMasterInactive->ViewCustomAttributes = "";

        // ReagentAmt
        $this->ReagentAmt->ViewValue = $this->ReagentAmt->CurrentValue;
        $this->ReagentAmt->ViewValue = FormatNumber($this->ReagentAmt->ViewValue, 2, -2, -2, -2);
        $this->ReagentAmt->ViewCustomAttributes = "";

        // LabAmt
        $this->LabAmt->ViewValue = $this->LabAmt->CurrentValue;
        $this->LabAmt->ViewValue = FormatNumber($this->LabAmt->ViewValue, 2, -2, -2, -2);
        $this->LabAmt->ViewCustomAttributes = "";

        // RefAmt
        $this->RefAmt->ViewValue = $this->RefAmt->CurrentValue;
        $this->RefAmt->ViewValue = FormatNumber($this->RefAmt->ViewValue, 2, -2, -2, -2);
        $this->RefAmt->ViewCustomAttributes = "";

        // MainDeptCD
        $this->MainDeptCD->ViewValue = $this->MainDeptCD->CurrentValue;
        $this->MainDeptCD->ViewCustomAttributes = "";

        // Individual
        $this->Individual->ViewValue = $this->Individual->CurrentValue;
        $this->Individual->ViewCustomAttributes = "";

        // ShortName
        $this->ShortName->ViewValue = $this->ShortName->CurrentValue;
        $this->ShortName->ViewCustomAttributes = "";

        // Note
        $this->Note->ViewValue = $this->Note->CurrentValue;
        $this->Note->ViewCustomAttributes = "";

        // PrevAmt
        $this->PrevAmt->ViewValue = $this->PrevAmt->CurrentValue;
        $this->PrevAmt->ViewValue = FormatNumber($this->PrevAmt->ViewValue, 2, -2, -2, -2);
        $this->PrevAmt->ViewCustomAttributes = "";

        // BillName
        $this->BillName->ViewValue = $this->BillName->CurrentValue;
        $this->BillName->ViewCustomAttributes = "";

        // ActualAmt
        $this->ActualAmt->ViewValue = $this->ActualAmt->CurrentValue;
        $this->ActualAmt->ViewValue = FormatNumber($this->ActualAmt->ViewValue, 2, -2, -2, -2);
        $this->ActualAmt->ViewCustomAttributes = "";

        // NoHeading
        $this->NoHeading->ViewValue = $this->NoHeading->CurrentValue;
        $this->NoHeading->ViewCustomAttributes = "";

        // EditDate
        $this->EditDate->ViewValue = $this->EditDate->CurrentValue;
        $this->EditDate->ViewValue = FormatDateTime($this->EditDate->ViewValue, 0);
        $this->EditDate->ViewCustomAttributes = "";

        // EditUser
        $this->EditUser->ViewValue = $this->EditUser->CurrentValue;
        $this->EditUser->ViewCustomAttributes = "";

        // HISCD
        $this->HISCD->ViewValue = $this->HISCD->CurrentValue;
        $this->HISCD->ViewCustomAttributes = "";

        // PriceList
        $this->PriceList->ViewValue = $this->PriceList->CurrentValue;
        $this->PriceList->ViewCustomAttributes = "";

        // IPAmt
        $this->IPAmt->ViewValue = $this->IPAmt->CurrentValue;
        $this->IPAmt->ViewValue = FormatNumber($this->IPAmt->ViewValue, 2, -2, -2, -2);
        $this->IPAmt->ViewCustomAttributes = "";

        // IInsAmt
        $this->IInsAmt->ViewValue = $this->IInsAmt->CurrentValue;
        $this->IInsAmt->ViewValue = FormatNumber($this->IInsAmt->ViewValue, 2, -2, -2, -2);
        $this->IInsAmt->ViewCustomAttributes = "";

        // ManualCD
        $this->ManualCD->ViewValue = $this->ManualCD->CurrentValue;
        $this->ManualCD->ViewCustomAttributes = "";

        // Free
        $this->Free->ViewValue = $this->Free->CurrentValue;
        $this->Free->ViewCustomAttributes = "";

        // IIpAmt
        $this->IIpAmt->ViewValue = $this->IIpAmt->CurrentValue;
        $this->IIpAmt->ViewValue = FormatNumber($this->IIpAmt->ViewValue, 2, -2, -2, -2);
        $this->IIpAmt->ViewCustomAttributes = "";

        // InsAmt
        $this->InsAmt->ViewValue = $this->InsAmt->CurrentValue;
        $this->InsAmt->ViewValue = FormatNumber($this->InsAmt->ViewValue, 2, -2, -2, -2);
        $this->InsAmt->ViewCustomAttributes = "";

        // OutSource
        $this->OutSource->ViewValue = $this->OutSource->CurrentValue;
        $this->OutSource->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // ProfileCode
        $this->ProfileCode->LinkCustomAttributes = "";
        $this->ProfileCode->HrefValue = "";
        $this->ProfileCode->TooltipValue = "";

        // ProfileName
        $this->ProfileName->LinkCustomAttributes = "";
        $this->ProfileName->HrefValue = "";
        $this->ProfileName->TooltipValue = "";

        // ProfileAmount
        $this->ProfileAmount->LinkCustomAttributes = "";
        $this->ProfileAmount->HrefValue = "";
        $this->ProfileAmount->TooltipValue = "";

        // ProfileSpecialAmount
        $this->ProfileSpecialAmount->LinkCustomAttributes = "";
        $this->ProfileSpecialAmount->HrefValue = "";
        $this->ProfileSpecialAmount->TooltipValue = "";

        // ProfileMasterInactive
        $this->ProfileMasterInactive->LinkCustomAttributes = "";
        $this->ProfileMasterInactive->HrefValue = "";
        $this->ProfileMasterInactive->TooltipValue = "";

        // ReagentAmt
        $this->ReagentAmt->LinkCustomAttributes = "";
        $this->ReagentAmt->HrefValue = "";
        $this->ReagentAmt->TooltipValue = "";

        // LabAmt
        $this->LabAmt->LinkCustomAttributes = "";
        $this->LabAmt->HrefValue = "";
        $this->LabAmt->TooltipValue = "";

        // RefAmt
        $this->RefAmt->LinkCustomAttributes = "";
        $this->RefAmt->HrefValue = "";
        $this->RefAmt->TooltipValue = "";

        // MainDeptCD
        $this->MainDeptCD->LinkCustomAttributes = "";
        $this->MainDeptCD->HrefValue = "";
        $this->MainDeptCD->TooltipValue = "";

        // Individual
        $this->Individual->LinkCustomAttributes = "";
        $this->Individual->HrefValue = "";
        $this->Individual->TooltipValue = "";

        // ShortName
        $this->ShortName->LinkCustomAttributes = "";
        $this->ShortName->HrefValue = "";
        $this->ShortName->TooltipValue = "";

        // Note
        $this->Note->LinkCustomAttributes = "";
        $this->Note->HrefValue = "";
        $this->Note->TooltipValue = "";

        // PrevAmt
        $this->PrevAmt->LinkCustomAttributes = "";
        $this->PrevAmt->HrefValue = "";
        $this->PrevAmt->TooltipValue = "";

        // BillName
        $this->BillName->LinkCustomAttributes = "";
        $this->BillName->HrefValue = "";
        $this->BillName->TooltipValue = "";

        // ActualAmt
        $this->ActualAmt->LinkCustomAttributes = "";
        $this->ActualAmt->HrefValue = "";
        $this->ActualAmt->TooltipValue = "";

        // NoHeading
        $this->NoHeading->LinkCustomAttributes = "";
        $this->NoHeading->HrefValue = "";
        $this->NoHeading->TooltipValue = "";

        // EditDate
        $this->EditDate->LinkCustomAttributes = "";
        $this->EditDate->HrefValue = "";
        $this->EditDate->TooltipValue = "";

        // EditUser
        $this->EditUser->LinkCustomAttributes = "";
        $this->EditUser->HrefValue = "";
        $this->EditUser->TooltipValue = "";

        // HISCD
        $this->HISCD->LinkCustomAttributes = "";
        $this->HISCD->HrefValue = "";
        $this->HISCD->TooltipValue = "";

        // PriceList
        $this->PriceList->LinkCustomAttributes = "";
        $this->PriceList->HrefValue = "";
        $this->PriceList->TooltipValue = "";

        // IPAmt
        $this->IPAmt->LinkCustomAttributes = "";
        $this->IPAmt->HrefValue = "";
        $this->IPAmt->TooltipValue = "";

        // IInsAmt
        $this->IInsAmt->LinkCustomAttributes = "";
        $this->IInsAmt->HrefValue = "";
        $this->IInsAmt->TooltipValue = "";

        // ManualCD
        $this->ManualCD->LinkCustomAttributes = "";
        $this->ManualCD->HrefValue = "";
        $this->ManualCD->TooltipValue = "";

        // Free
        $this->Free->LinkCustomAttributes = "";
        $this->Free->HrefValue = "";
        $this->Free->TooltipValue = "";

        // IIpAmt
        $this->IIpAmt->LinkCustomAttributes = "";
        $this->IIpAmt->HrefValue = "";
        $this->IIpAmt->TooltipValue = "";

        // InsAmt
        $this->InsAmt->LinkCustomAttributes = "";
        $this->InsAmt->HrefValue = "";
        $this->InsAmt->TooltipValue = "";

        // OutSource
        $this->OutSource->LinkCustomAttributes = "";
        $this->OutSource->HrefValue = "";
        $this->OutSource->TooltipValue = "";

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

        // ProfileCode
        $this->ProfileCode->EditAttrs["class"] = "form-control";
        $this->ProfileCode->EditCustomAttributes = "";
        if (!$this->ProfileCode->Raw) {
            $this->ProfileCode->CurrentValue = HtmlDecode($this->ProfileCode->CurrentValue);
        }
        $this->ProfileCode->EditValue = $this->ProfileCode->CurrentValue;
        $this->ProfileCode->PlaceHolder = RemoveHtml($this->ProfileCode->caption());

        // ProfileName
        $this->ProfileName->EditAttrs["class"] = "form-control";
        $this->ProfileName->EditCustomAttributes = "";
        if (!$this->ProfileName->Raw) {
            $this->ProfileName->CurrentValue = HtmlDecode($this->ProfileName->CurrentValue);
        }
        $this->ProfileName->EditValue = $this->ProfileName->CurrentValue;
        $this->ProfileName->PlaceHolder = RemoveHtml($this->ProfileName->caption());

        // ProfileAmount
        $this->ProfileAmount->EditAttrs["class"] = "form-control";
        $this->ProfileAmount->EditCustomAttributes = "";
        $this->ProfileAmount->EditValue = $this->ProfileAmount->CurrentValue;
        $this->ProfileAmount->PlaceHolder = RemoveHtml($this->ProfileAmount->caption());
        if (strval($this->ProfileAmount->EditValue) != "" && is_numeric($this->ProfileAmount->EditValue)) {
            $this->ProfileAmount->EditValue = FormatNumber($this->ProfileAmount->EditValue, -2, -2, -2, -2);
        }

        // ProfileSpecialAmount
        $this->ProfileSpecialAmount->EditAttrs["class"] = "form-control";
        $this->ProfileSpecialAmount->EditCustomAttributes = "";
        $this->ProfileSpecialAmount->EditValue = $this->ProfileSpecialAmount->CurrentValue;
        $this->ProfileSpecialAmount->PlaceHolder = RemoveHtml($this->ProfileSpecialAmount->caption());
        if (strval($this->ProfileSpecialAmount->EditValue) != "" && is_numeric($this->ProfileSpecialAmount->EditValue)) {
            $this->ProfileSpecialAmount->EditValue = FormatNumber($this->ProfileSpecialAmount->EditValue, -2, -2, -2, -2);
        }

        // ProfileMasterInactive
        $this->ProfileMasterInactive->EditAttrs["class"] = "form-control";
        $this->ProfileMasterInactive->EditCustomAttributes = "";
        if (!$this->ProfileMasterInactive->Raw) {
            $this->ProfileMasterInactive->CurrentValue = HtmlDecode($this->ProfileMasterInactive->CurrentValue);
        }
        $this->ProfileMasterInactive->EditValue = $this->ProfileMasterInactive->CurrentValue;
        $this->ProfileMasterInactive->PlaceHolder = RemoveHtml($this->ProfileMasterInactive->caption());

        // ReagentAmt
        $this->ReagentAmt->EditAttrs["class"] = "form-control";
        $this->ReagentAmt->EditCustomAttributes = "";
        $this->ReagentAmt->EditValue = $this->ReagentAmt->CurrentValue;
        $this->ReagentAmt->PlaceHolder = RemoveHtml($this->ReagentAmt->caption());
        if (strval($this->ReagentAmt->EditValue) != "" && is_numeric($this->ReagentAmt->EditValue)) {
            $this->ReagentAmt->EditValue = FormatNumber($this->ReagentAmt->EditValue, -2, -2, -2, -2);
        }

        // LabAmt
        $this->LabAmt->EditAttrs["class"] = "form-control";
        $this->LabAmt->EditCustomAttributes = "";
        $this->LabAmt->EditValue = $this->LabAmt->CurrentValue;
        $this->LabAmt->PlaceHolder = RemoveHtml($this->LabAmt->caption());
        if (strval($this->LabAmt->EditValue) != "" && is_numeric($this->LabAmt->EditValue)) {
            $this->LabAmt->EditValue = FormatNumber($this->LabAmt->EditValue, -2, -2, -2, -2);
        }

        // RefAmt
        $this->RefAmt->EditAttrs["class"] = "form-control";
        $this->RefAmt->EditCustomAttributes = "";
        $this->RefAmt->EditValue = $this->RefAmt->CurrentValue;
        $this->RefAmt->PlaceHolder = RemoveHtml($this->RefAmt->caption());
        if (strval($this->RefAmt->EditValue) != "" && is_numeric($this->RefAmt->EditValue)) {
            $this->RefAmt->EditValue = FormatNumber($this->RefAmt->EditValue, -2, -2, -2, -2);
        }

        // MainDeptCD
        $this->MainDeptCD->EditAttrs["class"] = "form-control";
        $this->MainDeptCD->EditCustomAttributes = "";
        if (!$this->MainDeptCD->Raw) {
            $this->MainDeptCD->CurrentValue = HtmlDecode($this->MainDeptCD->CurrentValue);
        }
        $this->MainDeptCD->EditValue = $this->MainDeptCD->CurrentValue;
        $this->MainDeptCD->PlaceHolder = RemoveHtml($this->MainDeptCD->caption());

        // Individual
        $this->Individual->EditAttrs["class"] = "form-control";
        $this->Individual->EditCustomAttributes = "";
        if (!$this->Individual->Raw) {
            $this->Individual->CurrentValue = HtmlDecode($this->Individual->CurrentValue);
        }
        $this->Individual->EditValue = $this->Individual->CurrentValue;
        $this->Individual->PlaceHolder = RemoveHtml($this->Individual->caption());

        // ShortName
        $this->ShortName->EditAttrs["class"] = "form-control";
        $this->ShortName->EditCustomAttributes = "";
        if (!$this->ShortName->Raw) {
            $this->ShortName->CurrentValue = HtmlDecode($this->ShortName->CurrentValue);
        }
        $this->ShortName->EditValue = $this->ShortName->CurrentValue;
        $this->ShortName->PlaceHolder = RemoveHtml($this->ShortName->caption());

        // Note
        $this->Note->EditAttrs["class"] = "form-control";
        $this->Note->EditCustomAttributes = "";
        $this->Note->EditValue = $this->Note->CurrentValue;
        $this->Note->PlaceHolder = RemoveHtml($this->Note->caption());

        // PrevAmt
        $this->PrevAmt->EditAttrs["class"] = "form-control";
        $this->PrevAmt->EditCustomAttributes = "";
        $this->PrevAmt->EditValue = $this->PrevAmt->CurrentValue;
        $this->PrevAmt->PlaceHolder = RemoveHtml($this->PrevAmt->caption());
        if (strval($this->PrevAmt->EditValue) != "" && is_numeric($this->PrevAmt->EditValue)) {
            $this->PrevAmt->EditValue = FormatNumber($this->PrevAmt->EditValue, -2, -2, -2, -2);
        }

        // BillName
        $this->BillName->EditAttrs["class"] = "form-control";
        $this->BillName->EditCustomAttributes = "";
        if (!$this->BillName->Raw) {
            $this->BillName->CurrentValue = HtmlDecode($this->BillName->CurrentValue);
        }
        $this->BillName->EditValue = $this->BillName->CurrentValue;
        $this->BillName->PlaceHolder = RemoveHtml($this->BillName->caption());

        // ActualAmt
        $this->ActualAmt->EditAttrs["class"] = "form-control";
        $this->ActualAmt->EditCustomAttributes = "";
        $this->ActualAmt->EditValue = $this->ActualAmt->CurrentValue;
        $this->ActualAmt->PlaceHolder = RemoveHtml($this->ActualAmt->caption());
        if (strval($this->ActualAmt->EditValue) != "" && is_numeric($this->ActualAmt->EditValue)) {
            $this->ActualAmt->EditValue = FormatNumber($this->ActualAmt->EditValue, -2, -2, -2, -2);
        }

        // NoHeading
        $this->NoHeading->EditAttrs["class"] = "form-control";
        $this->NoHeading->EditCustomAttributes = "";
        if (!$this->NoHeading->Raw) {
            $this->NoHeading->CurrentValue = HtmlDecode($this->NoHeading->CurrentValue);
        }
        $this->NoHeading->EditValue = $this->NoHeading->CurrentValue;
        $this->NoHeading->PlaceHolder = RemoveHtml($this->NoHeading->caption());

        // EditDate
        $this->EditDate->EditAttrs["class"] = "form-control";
        $this->EditDate->EditCustomAttributes = "";
        $this->EditDate->EditValue = FormatDateTime($this->EditDate->CurrentValue, 8);
        $this->EditDate->PlaceHolder = RemoveHtml($this->EditDate->caption());

        // EditUser
        $this->EditUser->EditAttrs["class"] = "form-control";
        $this->EditUser->EditCustomAttributes = "";
        if (!$this->EditUser->Raw) {
            $this->EditUser->CurrentValue = HtmlDecode($this->EditUser->CurrentValue);
        }
        $this->EditUser->EditValue = $this->EditUser->CurrentValue;
        $this->EditUser->PlaceHolder = RemoveHtml($this->EditUser->caption());

        // HISCD
        $this->HISCD->EditAttrs["class"] = "form-control";
        $this->HISCD->EditCustomAttributes = "";
        if (!$this->HISCD->Raw) {
            $this->HISCD->CurrentValue = HtmlDecode($this->HISCD->CurrentValue);
        }
        $this->HISCD->EditValue = $this->HISCD->CurrentValue;
        $this->HISCD->PlaceHolder = RemoveHtml($this->HISCD->caption());

        // PriceList
        $this->PriceList->EditAttrs["class"] = "form-control";
        $this->PriceList->EditCustomAttributes = "";
        if (!$this->PriceList->Raw) {
            $this->PriceList->CurrentValue = HtmlDecode($this->PriceList->CurrentValue);
        }
        $this->PriceList->EditValue = $this->PriceList->CurrentValue;
        $this->PriceList->PlaceHolder = RemoveHtml($this->PriceList->caption());

        // IPAmt
        $this->IPAmt->EditAttrs["class"] = "form-control";
        $this->IPAmt->EditCustomAttributes = "";
        $this->IPAmt->EditValue = $this->IPAmt->CurrentValue;
        $this->IPAmt->PlaceHolder = RemoveHtml($this->IPAmt->caption());
        if (strval($this->IPAmt->EditValue) != "" && is_numeric($this->IPAmt->EditValue)) {
            $this->IPAmt->EditValue = FormatNumber($this->IPAmt->EditValue, -2, -2, -2, -2);
        }

        // IInsAmt
        $this->IInsAmt->EditAttrs["class"] = "form-control";
        $this->IInsAmt->EditCustomAttributes = "";
        $this->IInsAmt->EditValue = $this->IInsAmt->CurrentValue;
        $this->IInsAmt->PlaceHolder = RemoveHtml($this->IInsAmt->caption());
        if (strval($this->IInsAmt->EditValue) != "" && is_numeric($this->IInsAmt->EditValue)) {
            $this->IInsAmt->EditValue = FormatNumber($this->IInsAmt->EditValue, -2, -2, -2, -2);
        }

        // ManualCD
        $this->ManualCD->EditAttrs["class"] = "form-control";
        $this->ManualCD->EditCustomAttributes = "";
        if (!$this->ManualCD->Raw) {
            $this->ManualCD->CurrentValue = HtmlDecode($this->ManualCD->CurrentValue);
        }
        $this->ManualCD->EditValue = $this->ManualCD->CurrentValue;
        $this->ManualCD->PlaceHolder = RemoveHtml($this->ManualCD->caption());

        // Free
        $this->Free->EditAttrs["class"] = "form-control";
        $this->Free->EditCustomAttributes = "";
        if (!$this->Free->Raw) {
            $this->Free->CurrentValue = HtmlDecode($this->Free->CurrentValue);
        }
        $this->Free->EditValue = $this->Free->CurrentValue;
        $this->Free->PlaceHolder = RemoveHtml($this->Free->caption());

        // IIpAmt
        $this->IIpAmt->EditAttrs["class"] = "form-control";
        $this->IIpAmt->EditCustomAttributes = "";
        $this->IIpAmt->EditValue = $this->IIpAmt->CurrentValue;
        $this->IIpAmt->PlaceHolder = RemoveHtml($this->IIpAmt->caption());
        if (strval($this->IIpAmt->EditValue) != "" && is_numeric($this->IIpAmt->EditValue)) {
            $this->IIpAmt->EditValue = FormatNumber($this->IIpAmt->EditValue, -2, -2, -2, -2);
        }

        // InsAmt
        $this->InsAmt->EditAttrs["class"] = "form-control";
        $this->InsAmt->EditCustomAttributes = "";
        $this->InsAmt->EditValue = $this->InsAmt->CurrentValue;
        $this->InsAmt->PlaceHolder = RemoveHtml($this->InsAmt->caption());
        if (strval($this->InsAmt->EditValue) != "" && is_numeric($this->InsAmt->EditValue)) {
            $this->InsAmt->EditValue = FormatNumber($this->InsAmt->EditValue, -2, -2, -2, -2);
        }

        // OutSource
        $this->OutSource->EditAttrs["class"] = "form-control";
        $this->OutSource->EditCustomAttributes = "";
        if (!$this->OutSource->Raw) {
            $this->OutSource->CurrentValue = HtmlDecode($this->OutSource->CurrentValue);
        }
        $this->OutSource->EditValue = $this->OutSource->CurrentValue;
        $this->OutSource->PlaceHolder = RemoveHtml($this->OutSource->caption());

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
                    $doc->exportCaption($this->ProfileCode);
                    $doc->exportCaption($this->ProfileName);
                    $doc->exportCaption($this->ProfileAmount);
                    $doc->exportCaption($this->ProfileSpecialAmount);
                    $doc->exportCaption($this->ProfileMasterInactive);
                    $doc->exportCaption($this->ReagentAmt);
                    $doc->exportCaption($this->LabAmt);
                    $doc->exportCaption($this->RefAmt);
                    $doc->exportCaption($this->MainDeptCD);
                    $doc->exportCaption($this->Individual);
                    $doc->exportCaption($this->ShortName);
                    $doc->exportCaption($this->Note);
                    $doc->exportCaption($this->PrevAmt);
                    $doc->exportCaption($this->BillName);
                    $doc->exportCaption($this->ActualAmt);
                    $doc->exportCaption($this->NoHeading);
                    $doc->exportCaption($this->EditDate);
                    $doc->exportCaption($this->EditUser);
                    $doc->exportCaption($this->HISCD);
                    $doc->exportCaption($this->PriceList);
                    $doc->exportCaption($this->IPAmt);
                    $doc->exportCaption($this->IInsAmt);
                    $doc->exportCaption($this->ManualCD);
                    $doc->exportCaption($this->Free);
                    $doc->exportCaption($this->IIpAmt);
                    $doc->exportCaption($this->InsAmt);
                    $doc->exportCaption($this->OutSource);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->ProfileCode);
                    $doc->exportCaption($this->ProfileName);
                    $doc->exportCaption($this->ProfileAmount);
                    $doc->exportCaption($this->ProfileSpecialAmount);
                    $doc->exportCaption($this->ProfileMasterInactive);
                    $doc->exportCaption($this->ReagentAmt);
                    $doc->exportCaption($this->LabAmt);
                    $doc->exportCaption($this->RefAmt);
                    $doc->exportCaption($this->MainDeptCD);
                    $doc->exportCaption($this->Individual);
                    $doc->exportCaption($this->ShortName);
                    $doc->exportCaption($this->PrevAmt);
                    $doc->exportCaption($this->BillName);
                    $doc->exportCaption($this->ActualAmt);
                    $doc->exportCaption($this->NoHeading);
                    $doc->exportCaption($this->EditDate);
                    $doc->exportCaption($this->EditUser);
                    $doc->exportCaption($this->HISCD);
                    $doc->exportCaption($this->PriceList);
                    $doc->exportCaption($this->IPAmt);
                    $doc->exportCaption($this->IInsAmt);
                    $doc->exportCaption($this->ManualCD);
                    $doc->exportCaption($this->Free);
                    $doc->exportCaption($this->IIpAmt);
                    $doc->exportCaption($this->InsAmt);
                    $doc->exportCaption($this->OutSource);
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
                        $doc->exportField($this->ProfileCode);
                        $doc->exportField($this->ProfileName);
                        $doc->exportField($this->ProfileAmount);
                        $doc->exportField($this->ProfileSpecialAmount);
                        $doc->exportField($this->ProfileMasterInactive);
                        $doc->exportField($this->ReagentAmt);
                        $doc->exportField($this->LabAmt);
                        $doc->exportField($this->RefAmt);
                        $doc->exportField($this->MainDeptCD);
                        $doc->exportField($this->Individual);
                        $doc->exportField($this->ShortName);
                        $doc->exportField($this->Note);
                        $doc->exportField($this->PrevAmt);
                        $doc->exportField($this->BillName);
                        $doc->exportField($this->ActualAmt);
                        $doc->exportField($this->NoHeading);
                        $doc->exportField($this->EditDate);
                        $doc->exportField($this->EditUser);
                        $doc->exportField($this->HISCD);
                        $doc->exportField($this->PriceList);
                        $doc->exportField($this->IPAmt);
                        $doc->exportField($this->IInsAmt);
                        $doc->exportField($this->ManualCD);
                        $doc->exportField($this->Free);
                        $doc->exportField($this->IIpAmt);
                        $doc->exportField($this->InsAmt);
                        $doc->exportField($this->OutSource);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->ProfileCode);
                        $doc->exportField($this->ProfileName);
                        $doc->exportField($this->ProfileAmount);
                        $doc->exportField($this->ProfileSpecialAmount);
                        $doc->exportField($this->ProfileMasterInactive);
                        $doc->exportField($this->ReagentAmt);
                        $doc->exportField($this->LabAmt);
                        $doc->exportField($this->RefAmt);
                        $doc->exportField($this->MainDeptCD);
                        $doc->exportField($this->Individual);
                        $doc->exportField($this->ShortName);
                        $doc->exportField($this->PrevAmt);
                        $doc->exportField($this->BillName);
                        $doc->exportField($this->ActualAmt);
                        $doc->exportField($this->NoHeading);
                        $doc->exportField($this->EditDate);
                        $doc->exportField($this->EditUser);
                        $doc->exportField($this->HISCD);
                        $doc->exportField($this->PriceList);
                        $doc->exportField($this->IPAmt);
                        $doc->exportField($this->IInsAmt);
                        $doc->exportField($this->ManualCD);
                        $doc->exportField($this->Free);
                        $doc->exportField($this->IIpAmt);
                        $doc->exportField($this->InsAmt);
                        $doc->exportField($this->OutSource);
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
