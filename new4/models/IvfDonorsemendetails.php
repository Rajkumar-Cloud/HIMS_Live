<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for ivf_donorsemendetails
 */
class IvfDonorsemendetails extends DbTable
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
    public $RIDNo;
    public $TidNo;
    public $Agency;
    public $ReceivedOn;
    public $ReceivedBy;
    public $DonorNo;
    public $BatchNo;
    public $BloodGroup;
    public $Height;
    public $SkinColor;
    public $EyeColor;
    public $HairColor;
    public $NoOfVials;
    public $Tank;
    public $Canister;
    public $Remarks;
    public $patientid;
    public $coupleid;
    public $Usedstatus;
    public $status;
    public $createdby;
    public $createddatetime;
    public $modifiedby;
    public $modifieddatetime;
    public $Lagency;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'ivf_donorsemendetails';
        $this->TableName = 'ivf_donorsemendetails';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`ivf_donorsemendetails`";
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
        $this->id = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = false; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // RIDNo
        $this->RIDNo = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_RIDNo', 'RIDNo', '`RIDNo`', '`RIDNo`', 3, 11, -1, false, '`RIDNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RIDNo->Sortable = false; // Allow sort
        $this->RIDNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->RIDNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RIDNo->Param, "CustomMsg");
        $this->Fields['RIDNo'] = &$this->RIDNo;

        // TidNo
        $this->TidNo = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_TidNo', 'TidNo', '`TidNo`', '`TidNo`', 3, 11, -1, false, '`TidNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TidNo->Sortable = false; // Allow sort
        $this->TidNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->TidNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TidNo->Param, "CustomMsg");
        $this->Fields['TidNo'] = &$this->TidNo;

        // Agency
        $this->Agency = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_Agency', 'Agency', '`Agency`', '`Agency`', 200, 50, -1, false, '`Agency`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Agency->Sortable = false; // Allow sort
        $this->Agency->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Agency->Param, "CustomMsg");
        $this->Fields['Agency'] = &$this->Agency;

        // ReceivedOn
        $this->ReceivedOn = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_ReceivedOn', 'ReceivedOn', '`ReceivedOn`', CastDateFieldForLike("`ReceivedOn`", 0, "DB"), 135, 19, 0, false, '`ReceivedOn`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReceivedOn->Sortable = false; // Allow sort
        $this->ReceivedOn->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->ReceivedOn->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ReceivedOn->Param, "CustomMsg");
        $this->Fields['ReceivedOn'] = &$this->ReceivedOn;

        // ReceivedBy
        $this->ReceivedBy = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_ReceivedBy', 'ReceivedBy', '`ReceivedBy`', '`ReceivedBy`', 200, 50, -1, false, '`ReceivedBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReceivedBy->Sortable = false; // Allow sort
        $this->ReceivedBy->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ReceivedBy->Param, "CustomMsg");
        $this->Fields['ReceivedBy'] = &$this->ReceivedBy;

        // DonorNo
        $this->DonorNo = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_DonorNo', 'DonorNo', '`DonorNo`', '`DonorNo`', 200, 45, -1, false, '`DonorNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DonorNo->Sortable = true; // Allow sort
        $this->DonorNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DonorNo->Param, "CustomMsg");
        $this->Fields['DonorNo'] = &$this->DonorNo;

        // BatchNo
        $this->BatchNo = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_BatchNo', 'BatchNo', '`BatchNo`', '`BatchNo`', 200, 50, -1, false, '`BatchNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BatchNo->Sortable = true; // Allow sort
        $this->BatchNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BatchNo->Param, "CustomMsg");
        $this->Fields['BatchNo'] = &$this->BatchNo;

        // BloodGroup
        $this->BloodGroup = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_BloodGroup', 'BloodGroup', '`BloodGroup`', '`BloodGroup`', 200, 50, -1, false, '`BloodGroup`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->BloodGroup->Sortable = true; // Allow sort
        $this->BloodGroup->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->BloodGroup->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->BloodGroup->Lookup = new Lookup('BloodGroup', 'mas_bloodgroup', false, 'BloodGroup', ["BloodGroup","","",""], [], [], [], [], [], [], '', '');
        $this->BloodGroup->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BloodGroup->Param, "CustomMsg");
        $this->Fields['BloodGroup'] = &$this->BloodGroup;

        // Height
        $this->Height = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_Height', 'Height', '`Height`', '`Height`', 200, 50, -1, false, '`Height`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Height->Sortable = true; // Allow sort
        $this->Height->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Height->Param, "CustomMsg");
        $this->Fields['Height'] = &$this->Height;

        // SkinColor
        $this->SkinColor = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_SkinColor', 'SkinColor', '`SkinColor`', '`SkinColor`', 200, 50, -1, false, '`SkinColor`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->SkinColor->Sortable = true; // Allow sort
        $this->SkinColor->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->SkinColor->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->SkinColor->Lookup = new Lookup('SkinColor', 'ivf_donorsemendetails', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->SkinColor->OptionCount = 3;
        $this->SkinColor->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SkinColor->Param, "CustomMsg");
        $this->Fields['SkinColor'] = &$this->SkinColor;

        // EyeColor
        $this->EyeColor = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_EyeColor', 'EyeColor', '`EyeColor`', '`EyeColor`', 200, 50, -1, false, '`EyeColor`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->EyeColor->Sortable = true; // Allow sort
        $this->EyeColor->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->EyeColor->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->EyeColor->Lookup = new Lookup('EyeColor', 'ivf_donorsemendetails', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->EyeColor->OptionCount = 6;
        $this->EyeColor->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EyeColor->Param, "CustomMsg");
        $this->Fields['EyeColor'] = &$this->EyeColor;

        // HairColor
        $this->HairColor = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_HairColor', 'HairColor', '`HairColor`', '`HairColor`', 200, 50, -1, false, '`HairColor`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->HairColor->Sortable = true; // Allow sort
        $this->HairColor->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->HairColor->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->HairColor->Lookup = new Lookup('HairColor', 'ivf_donorsemendetails', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->HairColor->OptionCount = 3;
        $this->HairColor->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HairColor->Param, "CustomMsg");
        $this->Fields['HairColor'] = &$this->HairColor;

        // NoOfVials
        $this->NoOfVials = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_NoOfVials', 'NoOfVials', '`NoOfVials`', '`NoOfVials`', 200, 50, -1, false, '`NoOfVials`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NoOfVials->Sortable = true; // Allow sort
        $this->NoOfVials->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->NoOfVials->Param, "CustomMsg");
        $this->Fields['NoOfVials'] = &$this->NoOfVials;

        // Tank
        $this->Tank = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_Tank', 'Tank', '`Tank`', '`Tank`', 200, 50, -1, false, '`Tank`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Tank->Sortable = true; // Allow sort
        $this->Tank->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Tank->Param, "CustomMsg");
        $this->Fields['Tank'] = &$this->Tank;

        // Canister
        $this->Canister = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_Canister', 'Canister', '`Canister`', '`Canister`', 200, 50, -1, false, '`Canister`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Canister->Sortable = true; // Allow sort
        $this->Canister->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Canister->Param, "CustomMsg");
        $this->Fields['Canister'] = &$this->Canister;

        // Remarks
        $this->Remarks = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_Remarks', 'Remarks', '`Remarks`', '`Remarks`', 200, 50, -1, false, '`Remarks`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Remarks->Sortable = true; // Allow sort
        $this->Remarks->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Remarks->Param, "CustomMsg");
        $this->Fields['Remarks'] = &$this->Remarks;

        // patientid
        $this->patientid = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_patientid', 'patientid', '`patientid`', '`patientid`', 3, 11, -1, false, '`patientid`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->patientid->Sortable = false; // Allow sort
        $this->patientid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->patientid->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->patientid->Param, "CustomMsg");
        $this->Fields['patientid'] = &$this->patientid;

        // coupleid
        $this->coupleid = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_coupleid', 'coupleid', '`coupleid`', '`coupleid`', 3, 11, -1, false, '`coupleid`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->coupleid->Sortable = false; // Allow sort
        $this->coupleid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->coupleid->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->coupleid->Param, "CustomMsg");
        $this->Fields['coupleid'] = &$this->coupleid;

        // Usedstatus
        $this->Usedstatus = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_Usedstatus', 'Usedstatus', '`Usedstatus`', '`Usedstatus`', 3, 11, -1, false, '`Usedstatus`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Usedstatus->Sortable = false; // Allow sort
        $this->Usedstatus->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Usedstatus->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Usedstatus->Param, "CustomMsg");
        $this->Fields['Usedstatus'] = &$this->Usedstatus;

        // status
        $this->status = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_status', 'status', '`status`', '`status`', 3, 11, -1, false, '`status`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->status->Sortable = false; // Allow sort
        $this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->status->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->status->Param, "CustomMsg");
        $this->Fields['status'] = &$this->status;

        // createdby
        $this->createdby = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, 11, -1, false, '`createdby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdby->Sortable = false; // Allow sort
        $this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->createdby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createdby->Param, "CustomMsg");
        $this->Fields['createdby'] = &$this->createdby;

        // createddatetime
        $this->createddatetime = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, false, '`createddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddatetime->Sortable = false; // Allow sort
        $this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->createddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createddatetime->Param, "CustomMsg");
        $this->Fields['createddatetime'] = &$this->createddatetime;

        // modifiedby
        $this->modifiedby = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, 11, -1, false, '`modifiedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifiedby->Sortable = false; // Allow sort
        $this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->modifiedby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifiedby->Param, "CustomMsg");
        $this->Fields['modifiedby'] = &$this->modifiedby;

        // modifieddatetime
        $this->modifieddatetime = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, false, '`modifieddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifieddatetime->Sortable = false; // Allow sort
        $this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->modifieddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifieddatetime->Param, "CustomMsg");
        $this->Fields['modifieddatetime'] = &$this->modifieddatetime;

        // Lagency
        $this->Lagency = new DbField('ivf_donorsemendetails', 'ivf_donorsemendetails', 'x_Lagency', 'Lagency', '\'\'', '\'\'', 201, 65530, -1, false, '\'\'', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Lagency->IsCustom = true; // Custom field
        $this->Lagency->Sortable = true; // Allow sort
        $this->Lagency->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Lagency->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Lagency->Lookup = new Lookup('Lagency', 'ivf_agency', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->Lagency->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Lagency->Param, "CustomMsg");
        $this->Fields['Lagency'] = &$this->Lagency;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`ivf_donorsemendetails`";
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
        return $this->SqlSelect ?? $this->getQueryBuilder()->select("*, '' AS `Lagency`");
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
        $this->RIDNo->DbValue = $row['RIDNo'];
        $this->TidNo->DbValue = $row['TidNo'];
        $this->Agency->DbValue = $row['Agency'];
        $this->ReceivedOn->DbValue = $row['ReceivedOn'];
        $this->ReceivedBy->DbValue = $row['ReceivedBy'];
        $this->DonorNo->DbValue = $row['DonorNo'];
        $this->BatchNo->DbValue = $row['BatchNo'];
        $this->BloodGroup->DbValue = $row['BloodGroup'];
        $this->Height->DbValue = $row['Height'];
        $this->SkinColor->DbValue = $row['SkinColor'];
        $this->EyeColor->DbValue = $row['EyeColor'];
        $this->HairColor->DbValue = $row['HairColor'];
        $this->NoOfVials->DbValue = $row['NoOfVials'];
        $this->Tank->DbValue = $row['Tank'];
        $this->Canister->DbValue = $row['Canister'];
        $this->Remarks->DbValue = $row['Remarks'];
        $this->patientid->DbValue = $row['patientid'];
        $this->coupleid->DbValue = $row['coupleid'];
        $this->Usedstatus->DbValue = $row['Usedstatus'];
        $this->status->DbValue = $row['status'];
        $this->createdby->DbValue = $row['createdby'];
        $this->createddatetime->DbValue = $row['createddatetime'];
        $this->modifiedby->DbValue = $row['modifiedby'];
        $this->modifieddatetime->DbValue = $row['modifieddatetime'];
        $this->Lagency->DbValue = $row['Lagency'];
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
        return $_SESSION[$name] ?? GetUrl("IvfDonorsemendetailsList");
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
        if ($pageName == "IvfDonorsemendetailsView") {
            return $Language->phrase("View");
        } elseif ($pageName == "IvfDonorsemendetailsEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "IvfDonorsemendetailsAdd") {
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
                return "IvfDonorsemendetailsView";
            case Config("API_ADD_ACTION"):
                return "IvfDonorsemendetailsAdd";
            case Config("API_EDIT_ACTION"):
                return "IvfDonorsemendetailsEdit";
            case Config("API_DELETE_ACTION"):
                return "IvfDonorsemendetailsDelete";
            case Config("API_LIST_ACTION"):
                return "IvfDonorsemendetailsList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "IvfDonorsemendetailsList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("IvfDonorsemendetailsView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("IvfDonorsemendetailsView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "IvfDonorsemendetailsAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "IvfDonorsemendetailsAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("IvfDonorsemendetailsEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("IvfDonorsemendetailsAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("IvfDonorsemendetailsDelete", $this->getUrlParm());
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
        $this->TidNo->setDbValue($row['TidNo']);
        $this->Agency->setDbValue($row['Agency']);
        $this->ReceivedOn->setDbValue($row['ReceivedOn']);
        $this->ReceivedBy->setDbValue($row['ReceivedBy']);
        $this->DonorNo->setDbValue($row['DonorNo']);
        $this->BatchNo->setDbValue($row['BatchNo']);
        $this->BloodGroup->setDbValue($row['BloodGroup']);
        $this->Height->setDbValue($row['Height']);
        $this->SkinColor->setDbValue($row['SkinColor']);
        $this->EyeColor->setDbValue($row['EyeColor']);
        $this->HairColor->setDbValue($row['HairColor']);
        $this->NoOfVials->setDbValue($row['NoOfVials']);
        $this->Tank->setDbValue($row['Tank']);
        $this->Canister->setDbValue($row['Canister']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->patientid->setDbValue($row['patientid']);
        $this->coupleid->setDbValue($row['coupleid']);
        $this->Usedstatus->setDbValue($row['Usedstatus']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->Lagency->setDbValue($row['Lagency']);
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

        // TidNo

        // Agency

        // ReceivedOn

        // ReceivedBy

        // DonorNo

        // BatchNo

        // BloodGroup

        // Height

        // SkinColor

        // EyeColor

        // HairColor

        // NoOfVials

        // Tank

        // Canister

        // Remarks

        // patientid

        // coupleid

        // Usedstatus

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // Lagency

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // RIDNo
        $this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
        $this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
        $this->RIDNo->ViewCustomAttributes = "";

        // TidNo
        $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
        $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
        $this->TidNo->ViewCustomAttributes = "";

        // Agency
        $this->Agency->ViewValue = $this->Agency->CurrentValue;
        $this->Agency->ViewCustomAttributes = "";

        // ReceivedOn
        $this->ReceivedOn->ViewValue = $this->ReceivedOn->CurrentValue;
        $this->ReceivedOn->ViewValue = FormatDateTime($this->ReceivedOn->ViewValue, 0);
        $this->ReceivedOn->ViewCustomAttributes = "";

        // ReceivedBy
        $this->ReceivedBy->ViewValue = $this->ReceivedBy->CurrentValue;
        $this->ReceivedBy->ViewCustomAttributes = "";

        // DonorNo
        $this->DonorNo->ViewValue = $this->DonorNo->CurrentValue;
        $this->DonorNo->ViewCustomAttributes = "";

        // BatchNo
        $this->BatchNo->ViewValue = $this->BatchNo->CurrentValue;
        $this->BatchNo->ViewCustomAttributes = "";

        // BloodGroup
        $curVal = trim(strval($this->BloodGroup->CurrentValue));
        if ($curVal != "") {
            $this->BloodGroup->ViewValue = $this->BloodGroup->lookupCacheOption($curVal);
            if ($this->BloodGroup->ViewValue === null) { // Lookup from database
                $filterWrk = "`BloodGroup`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->BloodGroup->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->BloodGroup->Lookup->renderViewRow($rswrk[0]);
                    $this->BloodGroup->ViewValue = $this->BloodGroup->displayValue($arwrk);
                } else {
                    $this->BloodGroup->ViewValue = $this->BloodGroup->CurrentValue;
                }
            }
        } else {
            $this->BloodGroup->ViewValue = null;
        }
        $this->BloodGroup->ViewCustomAttributes = "";

        // Height
        $this->Height->ViewValue = $this->Height->CurrentValue;
        $this->Height->ViewCustomAttributes = "";

        // SkinColor
        if (strval($this->SkinColor->CurrentValue) != "") {
            $this->SkinColor->ViewValue = $this->SkinColor->optionCaption($this->SkinColor->CurrentValue);
        } else {
            $this->SkinColor->ViewValue = null;
        }
        $this->SkinColor->ViewCustomAttributes = "";

        // EyeColor
        if (strval($this->EyeColor->CurrentValue) != "") {
            $this->EyeColor->ViewValue = $this->EyeColor->optionCaption($this->EyeColor->CurrentValue);
        } else {
            $this->EyeColor->ViewValue = null;
        }
        $this->EyeColor->ViewCustomAttributes = "";

        // HairColor
        if (strval($this->HairColor->CurrentValue) != "") {
            $this->HairColor->ViewValue = $this->HairColor->optionCaption($this->HairColor->CurrentValue);
        } else {
            $this->HairColor->ViewValue = null;
        }
        $this->HairColor->ViewCustomAttributes = "";

        // NoOfVials
        $this->NoOfVials->ViewValue = $this->NoOfVials->CurrentValue;
        $this->NoOfVials->ViewCustomAttributes = "";

        // Tank
        $this->Tank->ViewValue = $this->Tank->CurrentValue;
        $this->Tank->ViewCustomAttributes = "";

        // Canister
        $this->Canister->ViewValue = $this->Canister->CurrentValue;
        $this->Canister->ViewCustomAttributes = "";

        // Remarks
        $this->Remarks->ViewValue = $this->Remarks->CurrentValue;
        $this->Remarks->ViewCustomAttributes = "";

        // patientid
        $this->patientid->ViewValue = $this->patientid->CurrentValue;
        $this->patientid->ViewValue = FormatNumber($this->patientid->ViewValue, 0, -2, -2, -2);
        $this->patientid->ViewCustomAttributes = "";

        // coupleid
        $this->coupleid->ViewValue = $this->coupleid->CurrentValue;
        $this->coupleid->ViewValue = FormatNumber($this->coupleid->ViewValue, 0, -2, -2, -2);
        $this->coupleid->ViewCustomAttributes = "";

        // Usedstatus
        $this->Usedstatus->ViewValue = $this->Usedstatus->CurrentValue;
        $this->Usedstatus->ViewValue = FormatNumber($this->Usedstatus->ViewValue, 0, -2, -2, -2);
        $this->Usedstatus->ViewCustomAttributes = "";

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

        // Lagency
        $curVal = trim(strval($this->Lagency->CurrentValue));
        if ($curVal != "") {
            $this->Lagency->ViewValue = $this->Lagency->lookupCacheOption($curVal);
            if ($this->Lagency->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Lagency->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Lagency->Lookup->renderViewRow($rswrk[0]);
                    $this->Lagency->ViewValue = $this->Lagency->displayValue($arwrk);
                } else {
                    $this->Lagency->ViewValue = $this->Lagency->CurrentValue;
                }
            }
        } else {
            $this->Lagency->ViewValue = null;
        }
        $this->Lagency->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // RIDNo
        $this->RIDNo->LinkCustomAttributes = "";
        $this->RIDNo->HrefValue = "";
        $this->RIDNo->TooltipValue = "";

        // TidNo
        $this->TidNo->LinkCustomAttributes = "";
        $this->TidNo->HrefValue = "";
        $this->TidNo->TooltipValue = "";

        // Agency
        $this->Agency->LinkCustomAttributes = "";
        $this->Agency->HrefValue = "";
        $this->Agency->TooltipValue = "";

        // ReceivedOn
        $this->ReceivedOn->LinkCustomAttributes = "";
        $this->ReceivedOn->HrefValue = "";
        $this->ReceivedOn->TooltipValue = "";

        // ReceivedBy
        $this->ReceivedBy->LinkCustomAttributes = "";
        $this->ReceivedBy->HrefValue = "";
        $this->ReceivedBy->TooltipValue = "";

        // DonorNo
        $this->DonorNo->LinkCustomAttributes = "";
        $this->DonorNo->HrefValue = "";
        $this->DonorNo->TooltipValue = "";

        // BatchNo
        $this->BatchNo->LinkCustomAttributes = "";
        $this->BatchNo->HrefValue = "";
        $this->BatchNo->TooltipValue = "";

        // BloodGroup
        $this->BloodGroup->LinkCustomAttributes = "";
        $this->BloodGroup->HrefValue = "";
        $this->BloodGroup->TooltipValue = "";

        // Height
        $this->Height->LinkCustomAttributes = "";
        $this->Height->HrefValue = "";
        $this->Height->TooltipValue = "";

        // SkinColor
        $this->SkinColor->LinkCustomAttributes = "";
        $this->SkinColor->HrefValue = "";
        $this->SkinColor->TooltipValue = "";

        // EyeColor
        $this->EyeColor->LinkCustomAttributes = "";
        $this->EyeColor->HrefValue = "";
        $this->EyeColor->TooltipValue = "";

        // HairColor
        $this->HairColor->LinkCustomAttributes = "";
        $this->HairColor->HrefValue = "";
        $this->HairColor->TooltipValue = "";

        // NoOfVials
        $this->NoOfVials->LinkCustomAttributes = "";
        $this->NoOfVials->HrefValue = "";
        $this->NoOfVials->TooltipValue = "";

        // Tank
        $this->Tank->LinkCustomAttributes = "";
        $this->Tank->HrefValue = "";
        $this->Tank->TooltipValue = "";

        // Canister
        $this->Canister->LinkCustomAttributes = "";
        $this->Canister->HrefValue = "";
        $this->Canister->TooltipValue = "";

        // Remarks
        $this->Remarks->LinkCustomAttributes = "";
        $this->Remarks->HrefValue = "";
        $this->Remarks->TooltipValue = "";

        // patientid
        $this->patientid->LinkCustomAttributes = "";
        $this->patientid->HrefValue = "";
        $this->patientid->TooltipValue = "";

        // coupleid
        $this->coupleid->LinkCustomAttributes = "";
        $this->coupleid->HrefValue = "";
        $this->coupleid->TooltipValue = "";

        // Usedstatus
        $this->Usedstatus->LinkCustomAttributes = "";
        $this->Usedstatus->HrefValue = "";
        $this->Usedstatus->TooltipValue = "";

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

        // Lagency
        $this->Lagency->LinkCustomAttributes = "";
        $this->Lagency->HrefValue = "";
        $this->Lagency->TooltipValue = "";

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

        // TidNo
        $this->TidNo->EditAttrs["class"] = "form-control";
        $this->TidNo->EditCustomAttributes = "";
        $this->TidNo->EditValue = $this->TidNo->CurrentValue;
        $this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

        // Agency
        $this->Agency->EditAttrs["class"] = "form-control";
        $this->Agency->EditCustomAttributes = "";
        if (!$this->Agency->Raw) {
            $this->Agency->CurrentValue = HtmlDecode($this->Agency->CurrentValue);
        }
        $this->Agency->EditValue = $this->Agency->CurrentValue;
        $this->Agency->PlaceHolder = RemoveHtml($this->Agency->caption());

        // ReceivedOn
        $this->ReceivedOn->EditAttrs["class"] = "form-control";
        $this->ReceivedOn->EditCustomAttributes = "";
        $this->ReceivedOn->EditValue = FormatDateTime($this->ReceivedOn->CurrentValue, 8);
        $this->ReceivedOn->PlaceHolder = RemoveHtml($this->ReceivedOn->caption());

        // ReceivedBy
        $this->ReceivedBy->EditAttrs["class"] = "form-control";
        $this->ReceivedBy->EditCustomAttributes = "";
        if (!$this->ReceivedBy->Raw) {
            $this->ReceivedBy->CurrentValue = HtmlDecode($this->ReceivedBy->CurrentValue);
        }
        $this->ReceivedBy->EditValue = $this->ReceivedBy->CurrentValue;
        $this->ReceivedBy->PlaceHolder = RemoveHtml($this->ReceivedBy->caption());

        // DonorNo
        $this->DonorNo->EditAttrs["class"] = "form-control";
        $this->DonorNo->EditCustomAttributes = "";
        if (!$this->DonorNo->Raw) {
            $this->DonorNo->CurrentValue = HtmlDecode($this->DonorNo->CurrentValue);
        }
        $this->DonorNo->EditValue = $this->DonorNo->CurrentValue;
        $this->DonorNo->PlaceHolder = RemoveHtml($this->DonorNo->caption());

        // BatchNo
        $this->BatchNo->EditAttrs["class"] = "form-control";
        $this->BatchNo->EditCustomAttributes = "";
        if (!$this->BatchNo->Raw) {
            $this->BatchNo->CurrentValue = HtmlDecode($this->BatchNo->CurrentValue);
        }
        $this->BatchNo->EditValue = $this->BatchNo->CurrentValue;
        $this->BatchNo->PlaceHolder = RemoveHtml($this->BatchNo->caption());

        // BloodGroup
        $this->BloodGroup->EditAttrs["class"] = "form-control";
        $this->BloodGroup->EditCustomAttributes = "";
        $this->BloodGroup->PlaceHolder = RemoveHtml($this->BloodGroup->caption());

        // Height
        $this->Height->EditAttrs["class"] = "form-control";
        $this->Height->EditCustomAttributes = "";
        if (!$this->Height->Raw) {
            $this->Height->CurrentValue = HtmlDecode($this->Height->CurrentValue);
        }
        $this->Height->EditValue = $this->Height->CurrentValue;
        $this->Height->PlaceHolder = RemoveHtml($this->Height->caption());

        // SkinColor
        $this->SkinColor->EditAttrs["class"] = "form-control";
        $this->SkinColor->EditCustomAttributes = "";
        $this->SkinColor->EditValue = $this->SkinColor->options(true);
        $this->SkinColor->PlaceHolder = RemoveHtml($this->SkinColor->caption());

        // EyeColor
        $this->EyeColor->EditAttrs["class"] = "form-control";
        $this->EyeColor->EditCustomAttributes = "";
        $this->EyeColor->EditValue = $this->EyeColor->options(true);
        $this->EyeColor->PlaceHolder = RemoveHtml($this->EyeColor->caption());

        // HairColor
        $this->HairColor->EditAttrs["class"] = "form-control";
        $this->HairColor->EditCustomAttributes = "";
        $this->HairColor->EditValue = $this->HairColor->options(true);
        $this->HairColor->PlaceHolder = RemoveHtml($this->HairColor->caption());

        // NoOfVials
        $this->NoOfVials->EditAttrs["class"] = "form-control";
        $this->NoOfVials->EditCustomAttributes = "";
        if (!$this->NoOfVials->Raw) {
            $this->NoOfVials->CurrentValue = HtmlDecode($this->NoOfVials->CurrentValue);
        }
        $this->NoOfVials->EditValue = $this->NoOfVials->CurrentValue;
        $this->NoOfVials->PlaceHolder = RemoveHtml($this->NoOfVials->caption());

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

        // Remarks
        $this->Remarks->EditAttrs["class"] = "form-control";
        $this->Remarks->EditCustomAttributes = "";
        if (!$this->Remarks->Raw) {
            $this->Remarks->CurrentValue = HtmlDecode($this->Remarks->CurrentValue);
        }
        $this->Remarks->EditValue = $this->Remarks->CurrentValue;
        $this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

        // patientid
        $this->patientid->EditAttrs["class"] = "form-control";
        $this->patientid->EditCustomAttributes = "";
        $this->patientid->EditValue = $this->patientid->CurrentValue;
        $this->patientid->PlaceHolder = RemoveHtml($this->patientid->caption());

        // coupleid
        $this->coupleid->EditAttrs["class"] = "form-control";
        $this->coupleid->EditCustomAttributes = "";
        $this->coupleid->EditValue = $this->coupleid->CurrentValue;
        $this->coupleid->PlaceHolder = RemoveHtml($this->coupleid->caption());

        // Usedstatus
        $this->Usedstatus->EditAttrs["class"] = "form-control";
        $this->Usedstatus->EditCustomAttributes = "";
        $this->Usedstatus->EditValue = $this->Usedstatus->CurrentValue;
        $this->Usedstatus->PlaceHolder = RemoveHtml($this->Usedstatus->caption());

        // status
        $this->status->EditAttrs["class"] = "form-control";
        $this->status->EditCustomAttributes = "";
        $this->status->EditValue = $this->status->CurrentValue;
        $this->status->PlaceHolder = RemoveHtml($this->status->caption());

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // Lagency
        $this->Lagency->EditAttrs["class"] = "form-control";
        $this->Lagency->EditCustomAttributes = "";
        $this->Lagency->PlaceHolder = RemoveHtml($this->Lagency->caption());

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
                    $doc->exportCaption($this->TidNo);
                    $doc->exportCaption($this->Agency);
                    $doc->exportCaption($this->ReceivedOn);
                    $doc->exportCaption($this->ReceivedBy);
                    $doc->exportCaption($this->DonorNo);
                    $doc->exportCaption($this->BatchNo);
                    $doc->exportCaption($this->BloodGroup);
                    $doc->exportCaption($this->Height);
                    $doc->exportCaption($this->SkinColor);
                    $doc->exportCaption($this->EyeColor);
                    $doc->exportCaption($this->HairColor);
                    $doc->exportCaption($this->NoOfVials);
                    $doc->exportCaption($this->Tank);
                    $doc->exportCaption($this->Canister);
                    $doc->exportCaption($this->Remarks);
                    $doc->exportCaption($this->patientid);
                    $doc->exportCaption($this->coupleid);
                    $doc->exportCaption($this->Usedstatus);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->Lagency);
                } else {
                    $doc->exportCaption($this->DonorNo);
                    $doc->exportCaption($this->BatchNo);
                    $doc->exportCaption($this->BloodGroup);
                    $doc->exportCaption($this->Height);
                    $doc->exportCaption($this->SkinColor);
                    $doc->exportCaption($this->EyeColor);
                    $doc->exportCaption($this->HairColor);
                    $doc->exportCaption($this->NoOfVials);
                    $doc->exportCaption($this->Tank);
                    $doc->exportCaption($this->Canister);
                    $doc->exportCaption($this->Remarks);
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
                        $doc->exportField($this->TidNo);
                        $doc->exportField($this->Agency);
                        $doc->exportField($this->ReceivedOn);
                        $doc->exportField($this->ReceivedBy);
                        $doc->exportField($this->DonorNo);
                        $doc->exportField($this->BatchNo);
                        $doc->exportField($this->BloodGroup);
                        $doc->exportField($this->Height);
                        $doc->exportField($this->SkinColor);
                        $doc->exportField($this->EyeColor);
                        $doc->exportField($this->HairColor);
                        $doc->exportField($this->NoOfVials);
                        $doc->exportField($this->Tank);
                        $doc->exportField($this->Canister);
                        $doc->exportField($this->Remarks);
                        $doc->exportField($this->patientid);
                        $doc->exportField($this->coupleid);
                        $doc->exportField($this->Usedstatus);
                        $doc->exportField($this->status);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->Lagency);
                    } else {
                        $doc->exportField($this->DonorNo);
                        $doc->exportField($this->BatchNo);
                        $doc->exportField($this->BloodGroup);
                        $doc->exportField($this->Height);
                        $doc->exportField($this->SkinColor);
                        $doc->exportField($this->EyeColor);
                        $doc->exportField($this->HairColor);
                        $doc->exportField($this->NoOfVials);
                        $doc->exportField($this->Tank);
                        $doc->exportField($this->Canister);
                        $doc->exportField($this->Remarks);
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
