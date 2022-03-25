<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for ivf_vitrification
 */
class IvfVitrification extends DbTable
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
    public $RIDNo;
    public $PatientName;
    public $TiDNo;
    public $vitrificationDate;
    public $PrimaryEmbryologist;
    public $SecondaryEmbryologist;
    public $EmbryoNo;
    public $FertilisationDate;
    public $Day;
    public $Grade;
    public $Incubator;
    public $Tank;
    public $Canister;
    public $Gobiet;
    public $CryolockNo;
    public $CryolockColour;
    public $Stage;
    public $thawDate;
    public $thawPrimaryEmbryologist;
    public $thawSecondaryEmbryologist;
    public $thawET;
    public $thawReFrozen;
    public $thawAbserve;
    public $thawDiscard;
    public $Catheter;
    public $Difficulty;
    public $Easy;
    public $Comments;
    public $Doctor;
    public $Embryologist;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'ivf_vitrification';
        $this->TableName = 'ivf_vitrification';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`ivf_vitrification`";
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
        $this->id = new DbField('ivf_vitrification', 'ivf_vitrification', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['id'] = &$this->id;

        // RIDNo
        $this->RIDNo = new DbField('ivf_vitrification', 'ivf_vitrification', 'x_RIDNo', 'RIDNo', '`RIDNo`', '`RIDNo`', 3, 11, -1, false, '`RIDNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RIDNo->Nullable = false; // NOT NULL field
        $this->RIDNo->Required = true; // Required field
        $this->RIDNo->Sortable = true; // Allow sort
        $this->RIDNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['RIDNo'] = &$this->RIDNo;

        // PatientName
        $this->PatientName = new DbField('ivf_vitrification', 'ivf_vitrification', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, false, '`PatientName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientName->Sortable = true; // Allow sort
        $this->Fields['PatientName'] = &$this->PatientName;

        // TiDNo
        $this->TiDNo = new DbField('ivf_vitrification', 'ivf_vitrification', 'x_TiDNo', 'TiDNo', '`TiDNo`', '`TiDNo`', 3, 11, -1, false, '`TiDNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TiDNo->Nullable = false; // NOT NULL field
        $this->TiDNo->Required = true; // Required field
        $this->TiDNo->Sortable = true; // Allow sort
        $this->TiDNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['TiDNo'] = &$this->TiDNo;

        // vitrificationDate
        $this->vitrificationDate = new DbField('ivf_vitrification', 'ivf_vitrification', 'x_vitrificationDate', 'vitrificationDate', '`vitrificationDate`', CastDateFieldForLike("`vitrificationDate`", 0, "DB"), 135, 19, 0, false, '`vitrificationDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->vitrificationDate->Sortable = true; // Allow sort
        $this->vitrificationDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['vitrificationDate'] = &$this->vitrificationDate;

        // PrimaryEmbryologist
        $this->PrimaryEmbryologist = new DbField('ivf_vitrification', 'ivf_vitrification', 'x_PrimaryEmbryologist', 'PrimaryEmbryologist', '`PrimaryEmbryologist`', '`PrimaryEmbryologist`', 200, 45, -1, false, '`PrimaryEmbryologist`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PrimaryEmbryologist->Sortable = true; // Allow sort
        $this->Fields['PrimaryEmbryologist'] = &$this->PrimaryEmbryologist;

        // SecondaryEmbryologist
        $this->SecondaryEmbryologist = new DbField('ivf_vitrification', 'ivf_vitrification', 'x_SecondaryEmbryologist', 'SecondaryEmbryologist', '`SecondaryEmbryologist`', '`SecondaryEmbryologist`', 200, 45, -1, false, '`SecondaryEmbryologist`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SecondaryEmbryologist->Sortable = true; // Allow sort
        $this->Fields['SecondaryEmbryologist'] = &$this->SecondaryEmbryologist;

        // EmbryoNo
        $this->EmbryoNo = new DbField('ivf_vitrification', 'ivf_vitrification', 'x_EmbryoNo', 'EmbryoNo', '`EmbryoNo`', '`EmbryoNo`', 200, 45, -1, false, '`EmbryoNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EmbryoNo->Sortable = true; // Allow sort
        $this->Fields['EmbryoNo'] = &$this->EmbryoNo;

        // FertilisationDate
        $this->FertilisationDate = new DbField('ivf_vitrification', 'ivf_vitrification', 'x_FertilisationDate', 'FertilisationDate', '`FertilisationDate`', CastDateFieldForLike("`FertilisationDate`", 0, "DB"), 135, 19, 0, false, '`FertilisationDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FertilisationDate->Sortable = true; // Allow sort
        $this->FertilisationDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['FertilisationDate'] = &$this->FertilisationDate;

        // Day
        $this->Day = new DbField('ivf_vitrification', 'ivf_vitrification', 'x_Day', 'Day', '`Day`', '`Day`', 200, 45, -1, false, '`Day`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day->Sortable = true; // Allow sort
        $this->Fields['Day'] = &$this->Day;

        // Grade
        $this->Grade = new DbField('ivf_vitrification', 'ivf_vitrification', 'x_Grade', 'Grade', '`Grade`', '`Grade`', 200, 45, -1, false, '`Grade`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Grade->Sortable = true; // Allow sort
        $this->Fields['Grade'] = &$this->Grade;

        // Incubator
        $this->Incubator = new DbField('ivf_vitrification', 'ivf_vitrification', 'x_Incubator', 'Incubator', '`Incubator`', '`Incubator`', 200, 45, -1, false, '`Incubator`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Incubator->Sortable = true; // Allow sort
        $this->Fields['Incubator'] = &$this->Incubator;

        // Tank
        $this->Tank = new DbField('ivf_vitrification', 'ivf_vitrification', 'x_Tank', 'Tank', '`Tank`', '`Tank`', 200, 45, -1, false, '`Tank`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Tank->Sortable = true; // Allow sort
        $this->Fields['Tank'] = &$this->Tank;

        // Canister
        $this->Canister = new DbField('ivf_vitrification', 'ivf_vitrification', 'x_Canister', 'Canister', '`Canister`', '`Canister`', 200, 45, -1, false, '`Canister`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Canister->Sortable = true; // Allow sort
        $this->Fields['Canister'] = &$this->Canister;

        // Gobiet
        $this->Gobiet = new DbField('ivf_vitrification', 'ivf_vitrification', 'x_Gobiet', 'Gobiet', '`Gobiet`', '`Gobiet`', 200, 45, -1, false, '`Gobiet`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Gobiet->Sortable = true; // Allow sort
        $this->Fields['Gobiet'] = &$this->Gobiet;

        // CryolockNo
        $this->CryolockNo = new DbField('ivf_vitrification', 'ivf_vitrification', 'x_CryolockNo', 'CryolockNo', '`CryolockNo`', '`CryolockNo`', 200, 45, -1, false, '`CryolockNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CryolockNo->Sortable = true; // Allow sort
        $this->Fields['CryolockNo'] = &$this->CryolockNo;

        // CryolockColour
        $this->CryolockColour = new DbField('ivf_vitrification', 'ivf_vitrification', 'x_CryolockColour', 'CryolockColour', '`CryolockColour`', '`CryolockColour`', 200, 45, -1, false, '`CryolockColour`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CryolockColour->Sortable = true; // Allow sort
        $this->Fields['CryolockColour'] = &$this->CryolockColour;

        // Stage
        $this->Stage = new DbField('ivf_vitrification', 'ivf_vitrification', 'x_Stage', 'Stage', '`Stage`', '`Stage`', 200, 45, -1, false, '`Stage`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Stage->Sortable = true; // Allow sort
        $this->Fields['Stage'] = &$this->Stage;

        // thawDate
        $this->thawDate = new DbField('ivf_vitrification', 'ivf_vitrification', 'x_thawDate', 'thawDate', '`thawDate`', CastDateFieldForLike("`thawDate`", 0, "DB"), 135, 19, 0, false, '`thawDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->thawDate->Sortable = true; // Allow sort
        $this->thawDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['thawDate'] = &$this->thawDate;

        // thawPrimaryEmbryologist
        $this->thawPrimaryEmbryologist = new DbField('ivf_vitrification', 'ivf_vitrification', 'x_thawPrimaryEmbryologist', 'thawPrimaryEmbryologist', '`thawPrimaryEmbryologist`', '`thawPrimaryEmbryologist`', 200, 45, -1, false, '`thawPrimaryEmbryologist`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->thawPrimaryEmbryologist->Sortable = true; // Allow sort
        $this->Fields['thawPrimaryEmbryologist'] = &$this->thawPrimaryEmbryologist;

        // thawSecondaryEmbryologist
        $this->thawSecondaryEmbryologist = new DbField('ivf_vitrification', 'ivf_vitrification', 'x_thawSecondaryEmbryologist', 'thawSecondaryEmbryologist', '`thawSecondaryEmbryologist`', '`thawSecondaryEmbryologist`', 200, 45, -1, false, '`thawSecondaryEmbryologist`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->thawSecondaryEmbryologist->Sortable = true; // Allow sort
        $this->Fields['thawSecondaryEmbryologist'] = &$this->thawSecondaryEmbryologist;

        // thawET
        $this->thawET = new DbField('ivf_vitrification', 'ivf_vitrification', 'x_thawET', 'thawET', '`thawET`', '`thawET`', 200, 45, -1, false, '`thawET`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->thawET->Sortable = true; // Allow sort
        $this->Fields['thawET'] = &$this->thawET;

        // thawReFrozen
        $this->thawReFrozen = new DbField('ivf_vitrification', 'ivf_vitrification', 'x_thawReFrozen', 'thawReFrozen', '`thawReFrozen`', '`thawReFrozen`', 200, 45, -1, false, '`thawReFrozen`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->thawReFrozen->Sortable = true; // Allow sort
        $this->Fields['thawReFrozen'] = &$this->thawReFrozen;

        // thawAbserve
        $this->thawAbserve = new DbField('ivf_vitrification', 'ivf_vitrification', 'x_thawAbserve', 'thawAbserve', '`thawAbserve`', '`thawAbserve`', 200, 45, -1, false, '`thawAbserve`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->thawAbserve->Sortable = true; // Allow sort
        $this->Fields['thawAbserve'] = &$this->thawAbserve;

        // thawDiscard
        $this->thawDiscard = new DbField('ivf_vitrification', 'ivf_vitrification', 'x_thawDiscard', 'thawDiscard', '`thawDiscard`', '`thawDiscard`', 200, 45, -1, false, '`thawDiscard`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->thawDiscard->Sortable = true; // Allow sort
        $this->Fields['thawDiscard'] = &$this->thawDiscard;

        // Catheter
        $this->Catheter = new DbField('ivf_vitrification', 'ivf_vitrification', 'x_Catheter', 'Catheter', '`Catheter`', '`Catheter`', 200, 45, -1, false, '`Catheter`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Catheter->Sortable = true; // Allow sort
        $this->Fields['Catheter'] = &$this->Catheter;

        // Difficulty
        $this->Difficulty = new DbField('ivf_vitrification', 'ivf_vitrification', 'x_Difficulty', 'Difficulty', '`Difficulty`', '`Difficulty`', 200, 45, -1, false, '`Difficulty`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Difficulty->Sortable = true; // Allow sort
        $this->Fields['Difficulty'] = &$this->Difficulty;

        // Easy
        $this->Easy = new DbField('ivf_vitrification', 'ivf_vitrification', 'x_Easy', 'Easy', '`Easy`', '`Easy`', 200, 220, -1, false, '`Easy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Easy->Sortable = true; // Allow sort
        $this->Fields['Easy'] = &$this->Easy;

        // Comments
        $this->Comments = new DbField('ivf_vitrification', 'ivf_vitrification', 'x_Comments', 'Comments', '`Comments`', '`Comments`', 200, 45, -1, false, '`Comments`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Comments->Sortable = true; // Allow sort
        $this->Fields['Comments'] = &$this->Comments;

        // Doctor
        $this->Doctor = new DbField('ivf_vitrification', 'ivf_vitrification', 'x_Doctor', 'Doctor', '`Doctor`', '`Doctor`', 200, 45, -1, false, '`Doctor`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Doctor->Sortable = true; // Allow sort
        $this->Fields['Doctor'] = &$this->Doctor;

        // Embryologist
        $this->Embryologist = new DbField('ivf_vitrification', 'ivf_vitrification', 'x_Embryologist', 'Embryologist', '`Embryologist`', '`Embryologist`', 200, 45, -1, false, '`Embryologist`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Embryologist->Sortable = true; // Allow sort
        $this->Fields['Embryologist'] = &$this->Embryologist;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`ivf_vitrification`";
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
        $this->RIDNo->DbValue = $row['RIDNo'];
        $this->PatientName->DbValue = $row['PatientName'];
        $this->TiDNo->DbValue = $row['TiDNo'];
        $this->vitrificationDate->DbValue = $row['vitrificationDate'];
        $this->PrimaryEmbryologist->DbValue = $row['PrimaryEmbryologist'];
        $this->SecondaryEmbryologist->DbValue = $row['SecondaryEmbryologist'];
        $this->EmbryoNo->DbValue = $row['EmbryoNo'];
        $this->FertilisationDate->DbValue = $row['FertilisationDate'];
        $this->Day->DbValue = $row['Day'];
        $this->Grade->DbValue = $row['Grade'];
        $this->Incubator->DbValue = $row['Incubator'];
        $this->Tank->DbValue = $row['Tank'];
        $this->Canister->DbValue = $row['Canister'];
        $this->Gobiet->DbValue = $row['Gobiet'];
        $this->CryolockNo->DbValue = $row['CryolockNo'];
        $this->CryolockColour->DbValue = $row['CryolockColour'];
        $this->Stage->DbValue = $row['Stage'];
        $this->thawDate->DbValue = $row['thawDate'];
        $this->thawPrimaryEmbryologist->DbValue = $row['thawPrimaryEmbryologist'];
        $this->thawSecondaryEmbryologist->DbValue = $row['thawSecondaryEmbryologist'];
        $this->thawET->DbValue = $row['thawET'];
        $this->thawReFrozen->DbValue = $row['thawReFrozen'];
        $this->thawAbserve->DbValue = $row['thawAbserve'];
        $this->thawDiscard->DbValue = $row['thawDiscard'];
        $this->Catheter->DbValue = $row['Catheter'];
        $this->Difficulty->DbValue = $row['Difficulty'];
        $this->Easy->DbValue = $row['Easy'];
        $this->Comments->DbValue = $row['Comments'];
        $this->Doctor->DbValue = $row['Doctor'];
        $this->Embryologist->DbValue = $row['Embryologist'];
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
            return GetUrl("IvfVitrificationList");
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
        if ($pageName == "IvfVitrificationView") {
            return $Language->phrase("View");
        } elseif ($pageName == "IvfVitrificationEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "IvfVitrificationAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "IvfVitrificationList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("IvfVitrificationView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("IvfVitrificationView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "IvfVitrificationAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "IvfVitrificationAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("IvfVitrificationEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("IvfVitrificationAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("IvfVitrificationDelete", $this->getUrlParm());
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
        $this->RIDNo->setDbValue($row['RIDNo']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->TiDNo->setDbValue($row['TiDNo']);
        $this->vitrificationDate->setDbValue($row['vitrificationDate']);
        $this->PrimaryEmbryologist->setDbValue($row['PrimaryEmbryologist']);
        $this->SecondaryEmbryologist->setDbValue($row['SecondaryEmbryologist']);
        $this->EmbryoNo->setDbValue($row['EmbryoNo']);
        $this->FertilisationDate->setDbValue($row['FertilisationDate']);
        $this->Day->setDbValue($row['Day']);
        $this->Grade->setDbValue($row['Grade']);
        $this->Incubator->setDbValue($row['Incubator']);
        $this->Tank->setDbValue($row['Tank']);
        $this->Canister->setDbValue($row['Canister']);
        $this->Gobiet->setDbValue($row['Gobiet']);
        $this->CryolockNo->setDbValue($row['CryolockNo']);
        $this->CryolockColour->setDbValue($row['CryolockColour']);
        $this->Stage->setDbValue($row['Stage']);
        $this->thawDate->setDbValue($row['thawDate']);
        $this->thawPrimaryEmbryologist->setDbValue($row['thawPrimaryEmbryologist']);
        $this->thawSecondaryEmbryologist->setDbValue($row['thawSecondaryEmbryologist']);
        $this->thawET->setDbValue($row['thawET']);
        $this->thawReFrozen->setDbValue($row['thawReFrozen']);
        $this->thawAbserve->setDbValue($row['thawAbserve']);
        $this->thawDiscard->setDbValue($row['thawDiscard']);
        $this->Catheter->setDbValue($row['Catheter']);
        $this->Difficulty->setDbValue($row['Difficulty']);
        $this->Easy->setDbValue($row['Easy']);
        $this->Comments->setDbValue($row['Comments']);
        $this->Doctor->setDbValue($row['Doctor']);
        $this->Embryologist->setDbValue($row['Embryologist']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // RIDNo

        // PatientName

        // TiDNo

        // vitrificationDate

        // PrimaryEmbryologist

        // SecondaryEmbryologist

        // EmbryoNo

        // FertilisationDate

        // Day

        // Grade

        // Incubator

        // Tank

        // Canister

        // Gobiet

        // CryolockNo

        // CryolockColour

        // Stage

        // thawDate

        // thawPrimaryEmbryologist

        // thawSecondaryEmbryologist

        // thawET

        // thawReFrozen

        // thawAbserve

        // thawDiscard

        // Catheter

        // Difficulty

        // Easy

        // Comments

        // Doctor

        // Embryologist

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // RIDNo
        $this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
        $this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
        $this->RIDNo->ViewCustomAttributes = "";

        // PatientName
        $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
        $this->PatientName->ViewCustomAttributes = "";

        // TiDNo
        $this->TiDNo->ViewValue = $this->TiDNo->CurrentValue;
        $this->TiDNo->ViewValue = FormatNumber($this->TiDNo->ViewValue, 0, -2, -2, -2);
        $this->TiDNo->ViewCustomAttributes = "";

        // vitrificationDate
        $this->vitrificationDate->ViewValue = $this->vitrificationDate->CurrentValue;
        $this->vitrificationDate->ViewValue = FormatDateTime($this->vitrificationDate->ViewValue, 0);
        $this->vitrificationDate->ViewCustomAttributes = "";

        // PrimaryEmbryologist
        $this->PrimaryEmbryologist->ViewValue = $this->PrimaryEmbryologist->CurrentValue;
        $this->PrimaryEmbryologist->ViewCustomAttributes = "";

        // SecondaryEmbryologist
        $this->SecondaryEmbryologist->ViewValue = $this->SecondaryEmbryologist->CurrentValue;
        $this->SecondaryEmbryologist->ViewCustomAttributes = "";

        // EmbryoNo
        $this->EmbryoNo->ViewValue = $this->EmbryoNo->CurrentValue;
        $this->EmbryoNo->ViewCustomAttributes = "";

        // FertilisationDate
        $this->FertilisationDate->ViewValue = $this->FertilisationDate->CurrentValue;
        $this->FertilisationDate->ViewValue = FormatDateTime($this->FertilisationDate->ViewValue, 0);
        $this->FertilisationDate->ViewCustomAttributes = "";

        // Day
        $this->Day->ViewValue = $this->Day->CurrentValue;
        $this->Day->ViewCustomAttributes = "";

        // Grade
        $this->Grade->ViewValue = $this->Grade->CurrentValue;
        $this->Grade->ViewCustomAttributes = "";

        // Incubator
        $this->Incubator->ViewValue = $this->Incubator->CurrentValue;
        $this->Incubator->ViewCustomAttributes = "";

        // Tank
        $this->Tank->ViewValue = $this->Tank->CurrentValue;
        $this->Tank->ViewCustomAttributes = "";

        // Canister
        $this->Canister->ViewValue = $this->Canister->CurrentValue;
        $this->Canister->ViewCustomAttributes = "";

        // Gobiet
        $this->Gobiet->ViewValue = $this->Gobiet->CurrentValue;
        $this->Gobiet->ViewCustomAttributes = "";

        // CryolockNo
        $this->CryolockNo->ViewValue = $this->CryolockNo->CurrentValue;
        $this->CryolockNo->ViewCustomAttributes = "";

        // CryolockColour
        $this->CryolockColour->ViewValue = $this->CryolockColour->CurrentValue;
        $this->CryolockColour->ViewCustomAttributes = "";

        // Stage
        $this->Stage->ViewValue = $this->Stage->CurrentValue;
        $this->Stage->ViewCustomAttributes = "";

        // thawDate
        $this->thawDate->ViewValue = $this->thawDate->CurrentValue;
        $this->thawDate->ViewValue = FormatDateTime($this->thawDate->ViewValue, 0);
        $this->thawDate->ViewCustomAttributes = "";

        // thawPrimaryEmbryologist
        $this->thawPrimaryEmbryologist->ViewValue = $this->thawPrimaryEmbryologist->CurrentValue;
        $this->thawPrimaryEmbryologist->ViewCustomAttributes = "";

        // thawSecondaryEmbryologist
        $this->thawSecondaryEmbryologist->ViewValue = $this->thawSecondaryEmbryologist->CurrentValue;
        $this->thawSecondaryEmbryologist->ViewCustomAttributes = "";

        // thawET
        $this->thawET->ViewValue = $this->thawET->CurrentValue;
        $this->thawET->ViewCustomAttributes = "";

        // thawReFrozen
        $this->thawReFrozen->ViewValue = $this->thawReFrozen->CurrentValue;
        $this->thawReFrozen->ViewCustomAttributes = "";

        // thawAbserve
        $this->thawAbserve->ViewValue = $this->thawAbserve->CurrentValue;
        $this->thawAbserve->ViewCustomAttributes = "";

        // thawDiscard
        $this->thawDiscard->ViewValue = $this->thawDiscard->CurrentValue;
        $this->thawDiscard->ViewCustomAttributes = "";

        // Catheter
        $this->Catheter->ViewValue = $this->Catheter->CurrentValue;
        $this->Catheter->ViewCustomAttributes = "";

        // Difficulty
        $this->Difficulty->ViewValue = $this->Difficulty->CurrentValue;
        $this->Difficulty->ViewCustomAttributes = "";

        // Easy
        $this->Easy->ViewValue = $this->Easy->CurrentValue;
        $this->Easy->ViewCustomAttributes = "";

        // Comments
        $this->Comments->ViewValue = $this->Comments->CurrentValue;
        $this->Comments->ViewCustomAttributes = "";

        // Doctor
        $this->Doctor->ViewValue = $this->Doctor->CurrentValue;
        $this->Doctor->ViewCustomAttributes = "";

        // Embryologist
        $this->Embryologist->ViewValue = $this->Embryologist->CurrentValue;
        $this->Embryologist->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // RIDNo
        $this->RIDNo->LinkCustomAttributes = "";
        $this->RIDNo->HrefValue = "";
        $this->RIDNo->TooltipValue = "";

        // PatientName
        $this->PatientName->LinkCustomAttributes = "";
        $this->PatientName->HrefValue = "";
        $this->PatientName->TooltipValue = "";

        // TiDNo
        $this->TiDNo->LinkCustomAttributes = "";
        $this->TiDNo->HrefValue = "";
        $this->TiDNo->TooltipValue = "";

        // vitrificationDate
        $this->vitrificationDate->LinkCustomAttributes = "";
        $this->vitrificationDate->HrefValue = "";
        $this->vitrificationDate->TooltipValue = "";

        // PrimaryEmbryologist
        $this->PrimaryEmbryologist->LinkCustomAttributes = "";
        $this->PrimaryEmbryologist->HrefValue = "";
        $this->PrimaryEmbryologist->TooltipValue = "";

        // SecondaryEmbryologist
        $this->SecondaryEmbryologist->LinkCustomAttributes = "";
        $this->SecondaryEmbryologist->HrefValue = "";
        $this->SecondaryEmbryologist->TooltipValue = "";

        // EmbryoNo
        $this->EmbryoNo->LinkCustomAttributes = "";
        $this->EmbryoNo->HrefValue = "";
        $this->EmbryoNo->TooltipValue = "";

        // FertilisationDate
        $this->FertilisationDate->LinkCustomAttributes = "";
        $this->FertilisationDate->HrefValue = "";
        $this->FertilisationDate->TooltipValue = "";

        // Day
        $this->Day->LinkCustomAttributes = "";
        $this->Day->HrefValue = "";
        $this->Day->TooltipValue = "";

        // Grade
        $this->Grade->LinkCustomAttributes = "";
        $this->Grade->HrefValue = "";
        $this->Grade->TooltipValue = "";

        // Incubator
        $this->Incubator->LinkCustomAttributes = "";
        $this->Incubator->HrefValue = "";
        $this->Incubator->TooltipValue = "";

        // Tank
        $this->Tank->LinkCustomAttributes = "";
        $this->Tank->HrefValue = "";
        $this->Tank->TooltipValue = "";

        // Canister
        $this->Canister->LinkCustomAttributes = "";
        $this->Canister->HrefValue = "";
        $this->Canister->TooltipValue = "";

        // Gobiet
        $this->Gobiet->LinkCustomAttributes = "";
        $this->Gobiet->HrefValue = "";
        $this->Gobiet->TooltipValue = "";

        // CryolockNo
        $this->CryolockNo->LinkCustomAttributes = "";
        $this->CryolockNo->HrefValue = "";
        $this->CryolockNo->TooltipValue = "";

        // CryolockColour
        $this->CryolockColour->LinkCustomAttributes = "";
        $this->CryolockColour->HrefValue = "";
        $this->CryolockColour->TooltipValue = "";

        // Stage
        $this->Stage->LinkCustomAttributes = "";
        $this->Stage->HrefValue = "";
        $this->Stage->TooltipValue = "";

        // thawDate
        $this->thawDate->LinkCustomAttributes = "";
        $this->thawDate->HrefValue = "";
        $this->thawDate->TooltipValue = "";

        // thawPrimaryEmbryologist
        $this->thawPrimaryEmbryologist->LinkCustomAttributes = "";
        $this->thawPrimaryEmbryologist->HrefValue = "";
        $this->thawPrimaryEmbryologist->TooltipValue = "";

        // thawSecondaryEmbryologist
        $this->thawSecondaryEmbryologist->LinkCustomAttributes = "";
        $this->thawSecondaryEmbryologist->HrefValue = "";
        $this->thawSecondaryEmbryologist->TooltipValue = "";

        // thawET
        $this->thawET->LinkCustomAttributes = "";
        $this->thawET->HrefValue = "";
        $this->thawET->TooltipValue = "";

        // thawReFrozen
        $this->thawReFrozen->LinkCustomAttributes = "";
        $this->thawReFrozen->HrefValue = "";
        $this->thawReFrozen->TooltipValue = "";

        // thawAbserve
        $this->thawAbserve->LinkCustomAttributes = "";
        $this->thawAbserve->HrefValue = "";
        $this->thawAbserve->TooltipValue = "";

        // thawDiscard
        $this->thawDiscard->LinkCustomAttributes = "";
        $this->thawDiscard->HrefValue = "";
        $this->thawDiscard->TooltipValue = "";

        // Catheter
        $this->Catheter->LinkCustomAttributes = "";
        $this->Catheter->HrefValue = "";
        $this->Catheter->TooltipValue = "";

        // Difficulty
        $this->Difficulty->LinkCustomAttributes = "";
        $this->Difficulty->HrefValue = "";
        $this->Difficulty->TooltipValue = "";

        // Easy
        $this->Easy->LinkCustomAttributes = "";
        $this->Easy->HrefValue = "";
        $this->Easy->TooltipValue = "";

        // Comments
        $this->Comments->LinkCustomAttributes = "";
        $this->Comments->HrefValue = "";
        $this->Comments->TooltipValue = "";

        // Doctor
        $this->Doctor->LinkCustomAttributes = "";
        $this->Doctor->HrefValue = "";
        $this->Doctor->TooltipValue = "";

        // Embryologist
        $this->Embryologist->LinkCustomAttributes = "";
        $this->Embryologist->HrefValue = "";
        $this->Embryologist->TooltipValue = "";

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

        // RIDNo
        $this->RIDNo->EditAttrs["class"] = "form-control";
        $this->RIDNo->EditCustomAttributes = "";
        $this->RIDNo->EditValue = $this->RIDNo->CurrentValue;
        $this->RIDNo->PlaceHolder = RemoveHtml($this->RIDNo->caption());

        // PatientName
        $this->PatientName->EditAttrs["class"] = "form-control";
        $this->PatientName->EditCustomAttributes = "";
        if (!$this->PatientName->Raw) {
            $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
        }
        $this->PatientName->EditValue = $this->PatientName->CurrentValue;
        $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

        // TiDNo
        $this->TiDNo->EditAttrs["class"] = "form-control";
        $this->TiDNo->EditCustomAttributes = "";
        $this->TiDNo->EditValue = $this->TiDNo->CurrentValue;
        $this->TiDNo->PlaceHolder = RemoveHtml($this->TiDNo->caption());

        // vitrificationDate
        $this->vitrificationDate->EditAttrs["class"] = "form-control";
        $this->vitrificationDate->EditCustomAttributes = "";
        $this->vitrificationDate->EditValue = FormatDateTime($this->vitrificationDate->CurrentValue, 8);
        $this->vitrificationDate->PlaceHolder = RemoveHtml($this->vitrificationDate->caption());

        // PrimaryEmbryologist
        $this->PrimaryEmbryologist->EditAttrs["class"] = "form-control";
        $this->PrimaryEmbryologist->EditCustomAttributes = "";
        if (!$this->PrimaryEmbryologist->Raw) {
            $this->PrimaryEmbryologist->CurrentValue = HtmlDecode($this->PrimaryEmbryologist->CurrentValue);
        }
        $this->PrimaryEmbryologist->EditValue = $this->PrimaryEmbryologist->CurrentValue;
        $this->PrimaryEmbryologist->PlaceHolder = RemoveHtml($this->PrimaryEmbryologist->caption());

        // SecondaryEmbryologist
        $this->SecondaryEmbryologist->EditAttrs["class"] = "form-control";
        $this->SecondaryEmbryologist->EditCustomAttributes = "";
        if (!$this->SecondaryEmbryologist->Raw) {
            $this->SecondaryEmbryologist->CurrentValue = HtmlDecode($this->SecondaryEmbryologist->CurrentValue);
        }
        $this->SecondaryEmbryologist->EditValue = $this->SecondaryEmbryologist->CurrentValue;
        $this->SecondaryEmbryologist->PlaceHolder = RemoveHtml($this->SecondaryEmbryologist->caption());

        // EmbryoNo
        $this->EmbryoNo->EditAttrs["class"] = "form-control";
        $this->EmbryoNo->EditCustomAttributes = "";
        if (!$this->EmbryoNo->Raw) {
            $this->EmbryoNo->CurrentValue = HtmlDecode($this->EmbryoNo->CurrentValue);
        }
        $this->EmbryoNo->EditValue = $this->EmbryoNo->CurrentValue;
        $this->EmbryoNo->PlaceHolder = RemoveHtml($this->EmbryoNo->caption());

        // FertilisationDate
        $this->FertilisationDate->EditAttrs["class"] = "form-control";
        $this->FertilisationDate->EditCustomAttributes = "";
        $this->FertilisationDate->EditValue = FormatDateTime($this->FertilisationDate->CurrentValue, 8);
        $this->FertilisationDate->PlaceHolder = RemoveHtml($this->FertilisationDate->caption());

        // Day
        $this->Day->EditAttrs["class"] = "form-control";
        $this->Day->EditCustomAttributes = "";
        if (!$this->Day->Raw) {
            $this->Day->CurrentValue = HtmlDecode($this->Day->CurrentValue);
        }
        $this->Day->EditValue = $this->Day->CurrentValue;
        $this->Day->PlaceHolder = RemoveHtml($this->Day->caption());

        // Grade
        $this->Grade->EditAttrs["class"] = "form-control";
        $this->Grade->EditCustomAttributes = "";
        if (!$this->Grade->Raw) {
            $this->Grade->CurrentValue = HtmlDecode($this->Grade->CurrentValue);
        }
        $this->Grade->EditValue = $this->Grade->CurrentValue;
        $this->Grade->PlaceHolder = RemoveHtml($this->Grade->caption());

        // Incubator
        $this->Incubator->EditAttrs["class"] = "form-control";
        $this->Incubator->EditCustomAttributes = "";
        if (!$this->Incubator->Raw) {
            $this->Incubator->CurrentValue = HtmlDecode($this->Incubator->CurrentValue);
        }
        $this->Incubator->EditValue = $this->Incubator->CurrentValue;
        $this->Incubator->PlaceHolder = RemoveHtml($this->Incubator->caption());

        // Tank
        $this->Tank->EditAttrs["class"] = "form-control";
        $this->Tank->EditCustomAttributes = "";
        if (!$this->Tank->Raw) {
            $this->Tank->CurrentValue = HtmlDecode($this->Tank->CurrentValue);
        }
        $this->Tank->EditValue = $this->Tank->CurrentValue;
        $this->Tank->PlaceHolder = RemoveHtml($this->Tank->caption());

        // Canister
        $this->Canister->EditAttrs["class"] = "form-control";
        $this->Canister->EditCustomAttributes = "";
        if (!$this->Canister->Raw) {
            $this->Canister->CurrentValue = HtmlDecode($this->Canister->CurrentValue);
        }
        $this->Canister->EditValue = $this->Canister->CurrentValue;
        $this->Canister->PlaceHolder = RemoveHtml($this->Canister->caption());

        // Gobiet
        $this->Gobiet->EditAttrs["class"] = "form-control";
        $this->Gobiet->EditCustomAttributes = "";
        if (!$this->Gobiet->Raw) {
            $this->Gobiet->CurrentValue = HtmlDecode($this->Gobiet->CurrentValue);
        }
        $this->Gobiet->EditValue = $this->Gobiet->CurrentValue;
        $this->Gobiet->PlaceHolder = RemoveHtml($this->Gobiet->caption());

        // CryolockNo
        $this->CryolockNo->EditAttrs["class"] = "form-control";
        $this->CryolockNo->EditCustomAttributes = "";
        if (!$this->CryolockNo->Raw) {
            $this->CryolockNo->CurrentValue = HtmlDecode($this->CryolockNo->CurrentValue);
        }
        $this->CryolockNo->EditValue = $this->CryolockNo->CurrentValue;
        $this->CryolockNo->PlaceHolder = RemoveHtml($this->CryolockNo->caption());

        // CryolockColour
        $this->CryolockColour->EditAttrs["class"] = "form-control";
        $this->CryolockColour->EditCustomAttributes = "";
        if (!$this->CryolockColour->Raw) {
            $this->CryolockColour->CurrentValue = HtmlDecode($this->CryolockColour->CurrentValue);
        }
        $this->CryolockColour->EditValue = $this->CryolockColour->CurrentValue;
        $this->CryolockColour->PlaceHolder = RemoveHtml($this->CryolockColour->caption());

        // Stage
        $this->Stage->EditAttrs["class"] = "form-control";
        $this->Stage->EditCustomAttributes = "";
        if (!$this->Stage->Raw) {
            $this->Stage->CurrentValue = HtmlDecode($this->Stage->CurrentValue);
        }
        $this->Stage->EditValue = $this->Stage->CurrentValue;
        $this->Stage->PlaceHolder = RemoveHtml($this->Stage->caption());

        // thawDate
        $this->thawDate->EditAttrs["class"] = "form-control";
        $this->thawDate->EditCustomAttributes = "";
        $this->thawDate->EditValue = FormatDateTime($this->thawDate->CurrentValue, 8);
        $this->thawDate->PlaceHolder = RemoveHtml($this->thawDate->caption());

        // thawPrimaryEmbryologist
        $this->thawPrimaryEmbryologist->EditAttrs["class"] = "form-control";
        $this->thawPrimaryEmbryologist->EditCustomAttributes = "";
        if (!$this->thawPrimaryEmbryologist->Raw) {
            $this->thawPrimaryEmbryologist->CurrentValue = HtmlDecode($this->thawPrimaryEmbryologist->CurrentValue);
        }
        $this->thawPrimaryEmbryologist->EditValue = $this->thawPrimaryEmbryologist->CurrentValue;
        $this->thawPrimaryEmbryologist->PlaceHolder = RemoveHtml($this->thawPrimaryEmbryologist->caption());

        // thawSecondaryEmbryologist
        $this->thawSecondaryEmbryologist->EditAttrs["class"] = "form-control";
        $this->thawSecondaryEmbryologist->EditCustomAttributes = "";
        if (!$this->thawSecondaryEmbryologist->Raw) {
            $this->thawSecondaryEmbryologist->CurrentValue = HtmlDecode($this->thawSecondaryEmbryologist->CurrentValue);
        }
        $this->thawSecondaryEmbryologist->EditValue = $this->thawSecondaryEmbryologist->CurrentValue;
        $this->thawSecondaryEmbryologist->PlaceHolder = RemoveHtml($this->thawSecondaryEmbryologist->caption());

        // thawET
        $this->thawET->EditAttrs["class"] = "form-control";
        $this->thawET->EditCustomAttributes = "";
        if (!$this->thawET->Raw) {
            $this->thawET->CurrentValue = HtmlDecode($this->thawET->CurrentValue);
        }
        $this->thawET->EditValue = $this->thawET->CurrentValue;
        $this->thawET->PlaceHolder = RemoveHtml($this->thawET->caption());

        // thawReFrozen
        $this->thawReFrozen->EditAttrs["class"] = "form-control";
        $this->thawReFrozen->EditCustomAttributes = "";
        if (!$this->thawReFrozen->Raw) {
            $this->thawReFrozen->CurrentValue = HtmlDecode($this->thawReFrozen->CurrentValue);
        }
        $this->thawReFrozen->EditValue = $this->thawReFrozen->CurrentValue;
        $this->thawReFrozen->PlaceHolder = RemoveHtml($this->thawReFrozen->caption());

        // thawAbserve
        $this->thawAbserve->EditAttrs["class"] = "form-control";
        $this->thawAbserve->EditCustomAttributes = "";
        if (!$this->thawAbserve->Raw) {
            $this->thawAbserve->CurrentValue = HtmlDecode($this->thawAbserve->CurrentValue);
        }
        $this->thawAbserve->EditValue = $this->thawAbserve->CurrentValue;
        $this->thawAbserve->PlaceHolder = RemoveHtml($this->thawAbserve->caption());

        // thawDiscard
        $this->thawDiscard->EditAttrs["class"] = "form-control";
        $this->thawDiscard->EditCustomAttributes = "";
        if (!$this->thawDiscard->Raw) {
            $this->thawDiscard->CurrentValue = HtmlDecode($this->thawDiscard->CurrentValue);
        }
        $this->thawDiscard->EditValue = $this->thawDiscard->CurrentValue;
        $this->thawDiscard->PlaceHolder = RemoveHtml($this->thawDiscard->caption());

        // Catheter
        $this->Catheter->EditAttrs["class"] = "form-control";
        $this->Catheter->EditCustomAttributes = "";
        if (!$this->Catheter->Raw) {
            $this->Catheter->CurrentValue = HtmlDecode($this->Catheter->CurrentValue);
        }
        $this->Catheter->EditValue = $this->Catheter->CurrentValue;
        $this->Catheter->PlaceHolder = RemoveHtml($this->Catheter->caption());

        // Difficulty
        $this->Difficulty->EditAttrs["class"] = "form-control";
        $this->Difficulty->EditCustomAttributes = "";
        if (!$this->Difficulty->Raw) {
            $this->Difficulty->CurrentValue = HtmlDecode($this->Difficulty->CurrentValue);
        }
        $this->Difficulty->EditValue = $this->Difficulty->CurrentValue;
        $this->Difficulty->PlaceHolder = RemoveHtml($this->Difficulty->caption());

        // Easy
        $this->Easy->EditAttrs["class"] = "form-control";
        $this->Easy->EditCustomAttributes = "";
        if (!$this->Easy->Raw) {
            $this->Easy->CurrentValue = HtmlDecode($this->Easy->CurrentValue);
        }
        $this->Easy->EditValue = $this->Easy->CurrentValue;
        $this->Easy->PlaceHolder = RemoveHtml($this->Easy->caption());

        // Comments
        $this->Comments->EditAttrs["class"] = "form-control";
        $this->Comments->EditCustomAttributes = "";
        if (!$this->Comments->Raw) {
            $this->Comments->CurrentValue = HtmlDecode($this->Comments->CurrentValue);
        }
        $this->Comments->EditValue = $this->Comments->CurrentValue;
        $this->Comments->PlaceHolder = RemoveHtml($this->Comments->caption());

        // Doctor
        $this->Doctor->EditAttrs["class"] = "form-control";
        $this->Doctor->EditCustomAttributes = "";
        if (!$this->Doctor->Raw) {
            $this->Doctor->CurrentValue = HtmlDecode($this->Doctor->CurrentValue);
        }
        $this->Doctor->EditValue = $this->Doctor->CurrentValue;
        $this->Doctor->PlaceHolder = RemoveHtml($this->Doctor->caption());

        // Embryologist
        $this->Embryologist->EditAttrs["class"] = "form-control";
        $this->Embryologist->EditCustomAttributes = "";
        if (!$this->Embryologist->Raw) {
            $this->Embryologist->CurrentValue = HtmlDecode($this->Embryologist->CurrentValue);
        }
        $this->Embryologist->EditValue = $this->Embryologist->CurrentValue;
        $this->Embryologist->PlaceHolder = RemoveHtml($this->Embryologist->caption());

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
                    $doc->exportCaption($this->RIDNo);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->TiDNo);
                    $doc->exportCaption($this->vitrificationDate);
                    $doc->exportCaption($this->PrimaryEmbryologist);
                    $doc->exportCaption($this->SecondaryEmbryologist);
                    $doc->exportCaption($this->EmbryoNo);
                    $doc->exportCaption($this->FertilisationDate);
                    $doc->exportCaption($this->Day);
                    $doc->exportCaption($this->Grade);
                    $doc->exportCaption($this->Incubator);
                    $doc->exportCaption($this->Tank);
                    $doc->exportCaption($this->Canister);
                    $doc->exportCaption($this->Gobiet);
                    $doc->exportCaption($this->CryolockNo);
                    $doc->exportCaption($this->CryolockColour);
                    $doc->exportCaption($this->Stage);
                    $doc->exportCaption($this->thawDate);
                    $doc->exportCaption($this->thawPrimaryEmbryologist);
                    $doc->exportCaption($this->thawSecondaryEmbryologist);
                    $doc->exportCaption($this->thawET);
                    $doc->exportCaption($this->thawReFrozen);
                    $doc->exportCaption($this->thawAbserve);
                    $doc->exportCaption($this->thawDiscard);
                    $doc->exportCaption($this->Catheter);
                    $doc->exportCaption($this->Difficulty);
                    $doc->exportCaption($this->Easy);
                    $doc->exportCaption($this->Comments);
                    $doc->exportCaption($this->Doctor);
                    $doc->exportCaption($this->Embryologist);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->RIDNo);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->TiDNo);
                    $doc->exportCaption($this->vitrificationDate);
                    $doc->exportCaption($this->PrimaryEmbryologist);
                    $doc->exportCaption($this->SecondaryEmbryologist);
                    $doc->exportCaption($this->EmbryoNo);
                    $doc->exportCaption($this->FertilisationDate);
                    $doc->exportCaption($this->Day);
                    $doc->exportCaption($this->Grade);
                    $doc->exportCaption($this->Incubator);
                    $doc->exportCaption($this->Tank);
                    $doc->exportCaption($this->Canister);
                    $doc->exportCaption($this->Gobiet);
                    $doc->exportCaption($this->CryolockNo);
                    $doc->exportCaption($this->CryolockColour);
                    $doc->exportCaption($this->Stage);
                    $doc->exportCaption($this->thawDate);
                    $doc->exportCaption($this->thawPrimaryEmbryologist);
                    $doc->exportCaption($this->thawSecondaryEmbryologist);
                    $doc->exportCaption($this->thawET);
                    $doc->exportCaption($this->thawReFrozen);
                    $doc->exportCaption($this->thawAbserve);
                    $doc->exportCaption($this->thawDiscard);
                    $doc->exportCaption($this->Catheter);
                    $doc->exportCaption($this->Difficulty);
                    $doc->exportCaption($this->Easy);
                    $doc->exportCaption($this->Comments);
                    $doc->exportCaption($this->Doctor);
                    $doc->exportCaption($this->Embryologist);
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
                        $doc->exportField($this->RIDNo);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->TiDNo);
                        $doc->exportField($this->vitrificationDate);
                        $doc->exportField($this->PrimaryEmbryologist);
                        $doc->exportField($this->SecondaryEmbryologist);
                        $doc->exportField($this->EmbryoNo);
                        $doc->exportField($this->FertilisationDate);
                        $doc->exportField($this->Day);
                        $doc->exportField($this->Grade);
                        $doc->exportField($this->Incubator);
                        $doc->exportField($this->Tank);
                        $doc->exportField($this->Canister);
                        $doc->exportField($this->Gobiet);
                        $doc->exportField($this->CryolockNo);
                        $doc->exportField($this->CryolockColour);
                        $doc->exportField($this->Stage);
                        $doc->exportField($this->thawDate);
                        $doc->exportField($this->thawPrimaryEmbryologist);
                        $doc->exportField($this->thawSecondaryEmbryologist);
                        $doc->exportField($this->thawET);
                        $doc->exportField($this->thawReFrozen);
                        $doc->exportField($this->thawAbserve);
                        $doc->exportField($this->thawDiscard);
                        $doc->exportField($this->Catheter);
                        $doc->exportField($this->Difficulty);
                        $doc->exportField($this->Easy);
                        $doc->exportField($this->Comments);
                        $doc->exportField($this->Doctor);
                        $doc->exportField($this->Embryologist);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->RIDNo);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->TiDNo);
                        $doc->exportField($this->vitrificationDate);
                        $doc->exportField($this->PrimaryEmbryologist);
                        $doc->exportField($this->SecondaryEmbryologist);
                        $doc->exportField($this->EmbryoNo);
                        $doc->exportField($this->FertilisationDate);
                        $doc->exportField($this->Day);
                        $doc->exportField($this->Grade);
                        $doc->exportField($this->Incubator);
                        $doc->exportField($this->Tank);
                        $doc->exportField($this->Canister);
                        $doc->exportField($this->Gobiet);
                        $doc->exportField($this->CryolockNo);
                        $doc->exportField($this->CryolockColour);
                        $doc->exportField($this->Stage);
                        $doc->exportField($this->thawDate);
                        $doc->exportField($this->thawPrimaryEmbryologist);
                        $doc->exportField($this->thawSecondaryEmbryologist);
                        $doc->exportField($this->thawET);
                        $doc->exportField($this->thawReFrozen);
                        $doc->exportField($this->thawAbserve);
                        $doc->exportField($this->thawDiscard);
                        $doc->exportField($this->Catheter);
                        $doc->exportField($this->Difficulty);
                        $doc->exportField($this->Easy);
                        $doc->exportField($this->Comments);
                        $doc->exportField($this->Doctor);
                        $doc->exportField($this->Embryologist);
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
