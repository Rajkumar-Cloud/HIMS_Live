<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for ivf_ovum_pick_up_chart
 */
class IvfOvumPickUpChart extends DbTable
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
    public $Name;
    public $ARTCycle;
    public $Consultant;
    public $TotalDoseOfStimulation;
    public $Protocol;
    public $NumberOfDaysOfStimulation;
    public $TriggerDateTime;
    public $OPUDateTime;
    public $HoursAfterTrigger;
    public $SerumE2;
    public $SerumP4;
    public $FORT;
    public $ExperctedOocytes;
    public $NoOfOocytesRetrieved;
    public $OocytesRetreivalRate;
    public $Anesthesia;
    public $TrialCannulation;
    public $UCL;
    public $Angle;
    public $EMS;
    public $Cannulation;
    public $ProcedureT;
    public $NoOfOocytesRetrievedd;
    public $CourseInHospital;
    public $DischargeAdvise;
    public $FollowUpAdvise;
    public $PlanT;
    public $ReviewDate;
    public $ReviewDoctor;
    public $TidNo;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'ivf_ovum_pick_up_chart';
        $this->TableName = 'ivf_ovum_pick_up_chart';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`ivf_ovum_pick_up_chart`";
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
        $this->id = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['id'] = &$this->id;

        // RIDNo
        $this->RIDNo = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_RIDNo', 'RIDNo', '`RIDNo`', '`RIDNo`', 3, 11, -1, false, '`RIDNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RIDNo->Nullable = false; // NOT NULL field
        $this->RIDNo->Required = true; // Required field
        $this->RIDNo->Sortable = true; // Allow sort
        $this->RIDNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['RIDNo'] = &$this->RIDNo;

        // Name
        $this->Name = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_Name', 'Name', '`Name`', '`Name`', 200, 45, -1, false, '`Name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Name->Sortable = true; // Allow sort
        $this->Fields['Name'] = &$this->Name;

        // ARTCycle
        $this->ARTCycle = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_ARTCycle', 'ARTCycle', '`ARTCycle`', '`ARTCycle`', 200, 45, -1, false, '`ARTCycle`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ARTCycle->Sortable = true; // Allow sort
        $this->Fields['ARTCycle'] = &$this->ARTCycle;

        // Consultant
        $this->Consultant = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_Consultant', 'Consultant', '`Consultant`', '`Consultant`', 200, 45, -1, false, '`Consultant`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Consultant->Sortable = true; // Allow sort
        $this->Fields['Consultant'] = &$this->Consultant;

        // TotalDoseOfStimulation
        $this->TotalDoseOfStimulation = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_TotalDoseOfStimulation', 'TotalDoseOfStimulation', '`TotalDoseOfStimulation`', '`TotalDoseOfStimulation`', 200, 45, -1, false, '`TotalDoseOfStimulation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TotalDoseOfStimulation->Sortable = true; // Allow sort
        $this->Fields['TotalDoseOfStimulation'] = &$this->TotalDoseOfStimulation;

        // Protocol
        $this->Protocol = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_Protocol', 'Protocol', '`Protocol`', '`Protocol`', 200, 45, -1, false, '`Protocol`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Protocol->Sortable = true; // Allow sort
        $this->Fields['Protocol'] = &$this->Protocol;

        // NumberOfDaysOfStimulation
        $this->NumberOfDaysOfStimulation = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_NumberOfDaysOfStimulation', 'NumberOfDaysOfStimulation', '`NumberOfDaysOfStimulation`', '`NumberOfDaysOfStimulation`', 200, 45, -1, false, '`NumberOfDaysOfStimulation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NumberOfDaysOfStimulation->Sortable = true; // Allow sort
        $this->Fields['NumberOfDaysOfStimulation'] = &$this->NumberOfDaysOfStimulation;

        // TriggerDateTime
        $this->TriggerDateTime = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_TriggerDateTime', 'TriggerDateTime', '`TriggerDateTime`', CastDateFieldForLike("`TriggerDateTime`", 0, "DB"), 135, 19, 0, false, '`TriggerDateTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TriggerDateTime->Sortable = true; // Allow sort
        $this->TriggerDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['TriggerDateTime'] = &$this->TriggerDateTime;

        // OPUDateTime
        $this->OPUDateTime = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_OPUDateTime', 'OPUDateTime', '`OPUDateTime`', CastDateFieldForLike("`OPUDateTime`", 0, "DB"), 135, 19, 0, false, '`OPUDateTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OPUDateTime->Sortable = true; // Allow sort
        $this->OPUDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['OPUDateTime'] = &$this->OPUDateTime;

        // HoursAfterTrigger
        $this->HoursAfterTrigger = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_HoursAfterTrigger', 'HoursAfterTrigger', '`HoursAfterTrigger`', '`HoursAfterTrigger`', 200, 45, -1, false, '`HoursAfterTrigger`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HoursAfterTrigger->Sortable = true; // Allow sort
        $this->Fields['HoursAfterTrigger'] = &$this->HoursAfterTrigger;

        // SerumE2
        $this->SerumE2 = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_SerumE2', 'SerumE2', '`SerumE2`', '`SerumE2`', 200, 45, -1, false, '`SerumE2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SerumE2->Sortable = true; // Allow sort
        $this->Fields['SerumE2'] = &$this->SerumE2;

        // SerumP4
        $this->SerumP4 = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_SerumP4', 'SerumP4', '`SerumP4`', '`SerumP4`', 200, 45, -1, false, '`SerumP4`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SerumP4->Sortable = true; // Allow sort
        $this->Fields['SerumP4'] = &$this->SerumP4;

        // FORT
        $this->FORT = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_FORT', 'FORT', '`FORT`', '`FORT`', 200, 45, -1, false, '`FORT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FORT->Sortable = true; // Allow sort
        $this->Fields['FORT'] = &$this->FORT;

        // ExperctedOocytes
        $this->ExperctedOocytes = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_ExperctedOocytes', 'ExperctedOocytes', '`ExperctedOocytes`', '`ExperctedOocytes`', 200, 45, -1, false, '`ExperctedOocytes`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ExperctedOocytes->Sortable = true; // Allow sort
        $this->Fields['ExperctedOocytes'] = &$this->ExperctedOocytes;

        // NoOfOocytesRetrieved
        $this->NoOfOocytesRetrieved = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_NoOfOocytesRetrieved', 'NoOfOocytesRetrieved', '`NoOfOocytesRetrieved`', '`NoOfOocytesRetrieved`', 200, 45, -1, false, '`NoOfOocytesRetrieved`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NoOfOocytesRetrieved->Sortable = true; // Allow sort
        $this->Fields['NoOfOocytesRetrieved'] = &$this->NoOfOocytesRetrieved;

        // OocytesRetreivalRate
        $this->OocytesRetreivalRate = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_OocytesRetreivalRate', 'OocytesRetreivalRate', '`OocytesRetreivalRate`', '`OocytesRetreivalRate`', 200, 45, -1, false, '`OocytesRetreivalRate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OocytesRetreivalRate->Sortable = true; // Allow sort
        $this->Fields['OocytesRetreivalRate'] = &$this->OocytesRetreivalRate;

        // Anesthesia
        $this->Anesthesia = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_Anesthesia', 'Anesthesia', '`Anesthesia`', '`Anesthesia`', 200, 45, -1, false, '`Anesthesia`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Anesthesia->Sortable = true; // Allow sort
        $this->Fields['Anesthesia'] = &$this->Anesthesia;

        // TrialCannulation
        $this->TrialCannulation = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_TrialCannulation', 'TrialCannulation', '`TrialCannulation`', '`TrialCannulation`', 200, 45, -1, false, '`TrialCannulation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TrialCannulation->Sortable = true; // Allow sort
        $this->Fields['TrialCannulation'] = &$this->TrialCannulation;

        // UCL
        $this->UCL = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_UCL', 'UCL', '`UCL`', '`UCL`', 200, 45, -1, false, '`UCL`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->UCL->Sortable = true; // Allow sort
        $this->Fields['UCL'] = &$this->UCL;

        // Angle
        $this->Angle = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_Angle', 'Angle', '`Angle`', '`Angle`', 200, 45, -1, false, '`Angle`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Angle->Sortable = true; // Allow sort
        $this->Fields['Angle'] = &$this->Angle;

        // EMS
        $this->EMS = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_EMS', 'EMS', '`EMS`', '`EMS`', 200, 45, -1, false, '`EMS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EMS->Sortable = true; // Allow sort
        $this->Fields['EMS'] = &$this->EMS;

        // Cannulation
        $this->Cannulation = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_Cannulation', 'Cannulation', '`Cannulation`', '`Cannulation`', 200, 45, -1, false, '`Cannulation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Cannulation->Sortable = true; // Allow sort
        $this->Fields['Cannulation'] = &$this->Cannulation;

        // ProcedureT
        $this->ProcedureT = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_ProcedureT', 'ProcedureT', '`ProcedureT`', '`ProcedureT`', 201, 65535, -1, false, '`ProcedureT`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->ProcedureT->Sortable = true; // Allow sort
        $this->Fields['ProcedureT'] = &$this->ProcedureT;

        // NoOfOocytesRetrievedd
        $this->NoOfOocytesRetrievedd = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_NoOfOocytesRetrievedd', 'NoOfOocytesRetrievedd', '`NoOfOocytesRetrievedd`', '`NoOfOocytesRetrievedd`', 200, 45, -1, false, '`NoOfOocytesRetrievedd`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NoOfOocytesRetrievedd->Sortable = true; // Allow sort
        $this->Fields['NoOfOocytesRetrievedd'] = &$this->NoOfOocytesRetrievedd;

        // CourseInHospital
        $this->CourseInHospital = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_CourseInHospital', 'CourseInHospital', '`CourseInHospital`', '`CourseInHospital`', 201, 65535, -1, false, '`CourseInHospital`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->CourseInHospital->Sortable = true; // Allow sort
        $this->Fields['CourseInHospital'] = &$this->CourseInHospital;

        // DischargeAdvise
        $this->DischargeAdvise = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_DischargeAdvise', 'DischargeAdvise', '`DischargeAdvise`', '`DischargeAdvise`', 201, 65535, -1, false, '`DischargeAdvise`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->DischargeAdvise->Sortable = true; // Allow sort
        $this->Fields['DischargeAdvise'] = &$this->DischargeAdvise;

        // FollowUpAdvise
        $this->FollowUpAdvise = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_FollowUpAdvise', 'FollowUpAdvise', '`FollowUpAdvise`', '`FollowUpAdvise`', 201, 65535, -1, false, '`FollowUpAdvise`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->FollowUpAdvise->Sortable = true; // Allow sort
        $this->Fields['FollowUpAdvise'] = &$this->FollowUpAdvise;

        // PlanT
        $this->PlanT = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_PlanT', 'PlanT', '`PlanT`', '`PlanT`', 200, 45, -1, false, '`PlanT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PlanT->Sortable = true; // Allow sort
        $this->Fields['PlanT'] = &$this->PlanT;

        // ReviewDate
        $this->ReviewDate = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_ReviewDate', 'ReviewDate', '`ReviewDate`', CastDateFieldForLike("`ReviewDate`", 0, "DB"), 135, 19, 0, false, '`ReviewDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReviewDate->Sortable = true; // Allow sort
        $this->ReviewDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['ReviewDate'] = &$this->ReviewDate;

        // ReviewDoctor
        $this->ReviewDoctor = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_ReviewDoctor', 'ReviewDoctor', '`ReviewDoctor`', '`ReviewDoctor`', 200, 45, -1, false, '`ReviewDoctor`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReviewDoctor->Sortable = true; // Allow sort
        $this->Fields['ReviewDoctor'] = &$this->ReviewDoctor;

        // TidNo
        $this->TidNo = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_TidNo', 'TidNo', '`TidNo`', '`TidNo`', 3, 11, -1, false, '`TidNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TidNo->Sortable = true; // Allow sort
        $this->TidNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['TidNo'] = &$this->TidNo;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`ivf_ovum_pick_up_chart`";
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
        $this->Name->DbValue = $row['Name'];
        $this->ARTCycle->DbValue = $row['ARTCycle'];
        $this->Consultant->DbValue = $row['Consultant'];
        $this->TotalDoseOfStimulation->DbValue = $row['TotalDoseOfStimulation'];
        $this->Protocol->DbValue = $row['Protocol'];
        $this->NumberOfDaysOfStimulation->DbValue = $row['NumberOfDaysOfStimulation'];
        $this->TriggerDateTime->DbValue = $row['TriggerDateTime'];
        $this->OPUDateTime->DbValue = $row['OPUDateTime'];
        $this->HoursAfterTrigger->DbValue = $row['HoursAfterTrigger'];
        $this->SerumE2->DbValue = $row['SerumE2'];
        $this->SerumP4->DbValue = $row['SerumP4'];
        $this->FORT->DbValue = $row['FORT'];
        $this->ExperctedOocytes->DbValue = $row['ExperctedOocytes'];
        $this->NoOfOocytesRetrieved->DbValue = $row['NoOfOocytesRetrieved'];
        $this->OocytesRetreivalRate->DbValue = $row['OocytesRetreivalRate'];
        $this->Anesthesia->DbValue = $row['Anesthesia'];
        $this->TrialCannulation->DbValue = $row['TrialCannulation'];
        $this->UCL->DbValue = $row['UCL'];
        $this->Angle->DbValue = $row['Angle'];
        $this->EMS->DbValue = $row['EMS'];
        $this->Cannulation->DbValue = $row['Cannulation'];
        $this->ProcedureT->DbValue = $row['ProcedureT'];
        $this->NoOfOocytesRetrievedd->DbValue = $row['NoOfOocytesRetrievedd'];
        $this->CourseInHospital->DbValue = $row['CourseInHospital'];
        $this->DischargeAdvise->DbValue = $row['DischargeAdvise'];
        $this->FollowUpAdvise->DbValue = $row['FollowUpAdvise'];
        $this->PlanT->DbValue = $row['PlanT'];
        $this->ReviewDate->DbValue = $row['ReviewDate'];
        $this->ReviewDoctor->DbValue = $row['ReviewDoctor'];
        $this->TidNo->DbValue = $row['TidNo'];
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
            return GetUrl("IvfOvumPickUpChartList");
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
        if ($pageName == "IvfOvumPickUpChartView") {
            return $Language->phrase("View");
        } elseif ($pageName == "IvfOvumPickUpChartEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "IvfOvumPickUpChartAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "IvfOvumPickUpChartList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("IvfOvumPickUpChartView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("IvfOvumPickUpChartView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "IvfOvumPickUpChartAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "IvfOvumPickUpChartAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("IvfOvumPickUpChartEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("IvfOvumPickUpChartAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("IvfOvumPickUpChartDelete", $this->getUrlParm());
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
        $this->Name->setDbValue($row['Name']);
        $this->ARTCycle->setDbValue($row['ARTCycle']);
        $this->Consultant->setDbValue($row['Consultant']);
        $this->TotalDoseOfStimulation->setDbValue($row['TotalDoseOfStimulation']);
        $this->Protocol->setDbValue($row['Protocol']);
        $this->NumberOfDaysOfStimulation->setDbValue($row['NumberOfDaysOfStimulation']);
        $this->TriggerDateTime->setDbValue($row['TriggerDateTime']);
        $this->OPUDateTime->setDbValue($row['OPUDateTime']);
        $this->HoursAfterTrigger->setDbValue($row['HoursAfterTrigger']);
        $this->SerumE2->setDbValue($row['SerumE2']);
        $this->SerumP4->setDbValue($row['SerumP4']);
        $this->FORT->setDbValue($row['FORT']);
        $this->ExperctedOocytes->setDbValue($row['ExperctedOocytes']);
        $this->NoOfOocytesRetrieved->setDbValue($row['NoOfOocytesRetrieved']);
        $this->OocytesRetreivalRate->setDbValue($row['OocytesRetreivalRate']);
        $this->Anesthesia->setDbValue($row['Anesthesia']);
        $this->TrialCannulation->setDbValue($row['TrialCannulation']);
        $this->UCL->setDbValue($row['UCL']);
        $this->Angle->setDbValue($row['Angle']);
        $this->EMS->setDbValue($row['EMS']);
        $this->Cannulation->setDbValue($row['Cannulation']);
        $this->ProcedureT->setDbValue($row['ProcedureT']);
        $this->NoOfOocytesRetrievedd->setDbValue($row['NoOfOocytesRetrievedd']);
        $this->CourseInHospital->setDbValue($row['CourseInHospital']);
        $this->DischargeAdvise->setDbValue($row['DischargeAdvise']);
        $this->FollowUpAdvise->setDbValue($row['FollowUpAdvise']);
        $this->PlanT->setDbValue($row['PlanT']);
        $this->ReviewDate->setDbValue($row['ReviewDate']);
        $this->ReviewDoctor->setDbValue($row['ReviewDoctor']);
        $this->TidNo->setDbValue($row['TidNo']);
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

        // Name

        // ARTCycle

        // Consultant

        // TotalDoseOfStimulation

        // Protocol

        // NumberOfDaysOfStimulation

        // TriggerDateTime

        // OPUDateTime

        // HoursAfterTrigger

        // SerumE2

        // SerumP4

        // FORT

        // ExperctedOocytes

        // NoOfOocytesRetrieved

        // OocytesRetreivalRate

        // Anesthesia

        // TrialCannulation

        // UCL

        // Angle

        // EMS

        // Cannulation

        // ProcedureT

        // NoOfOocytesRetrievedd

        // CourseInHospital

        // DischargeAdvise

        // FollowUpAdvise

        // PlanT

        // ReviewDate

        // ReviewDoctor

        // TidNo

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // RIDNo
        $this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
        $this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
        $this->RIDNo->ViewCustomAttributes = "";

        // Name
        $this->Name->ViewValue = $this->Name->CurrentValue;
        $this->Name->ViewCustomAttributes = "";

        // ARTCycle
        $this->ARTCycle->ViewValue = $this->ARTCycle->CurrentValue;
        $this->ARTCycle->ViewCustomAttributes = "";

        // Consultant
        $this->Consultant->ViewValue = $this->Consultant->CurrentValue;
        $this->Consultant->ViewCustomAttributes = "";

        // TotalDoseOfStimulation
        $this->TotalDoseOfStimulation->ViewValue = $this->TotalDoseOfStimulation->CurrentValue;
        $this->TotalDoseOfStimulation->ViewCustomAttributes = "";

        // Protocol
        $this->Protocol->ViewValue = $this->Protocol->CurrentValue;
        $this->Protocol->ViewCustomAttributes = "";

        // NumberOfDaysOfStimulation
        $this->NumberOfDaysOfStimulation->ViewValue = $this->NumberOfDaysOfStimulation->CurrentValue;
        $this->NumberOfDaysOfStimulation->ViewCustomAttributes = "";

        // TriggerDateTime
        $this->TriggerDateTime->ViewValue = $this->TriggerDateTime->CurrentValue;
        $this->TriggerDateTime->ViewValue = FormatDateTime($this->TriggerDateTime->ViewValue, 0);
        $this->TriggerDateTime->ViewCustomAttributes = "";

        // OPUDateTime
        $this->OPUDateTime->ViewValue = $this->OPUDateTime->CurrentValue;
        $this->OPUDateTime->ViewValue = FormatDateTime($this->OPUDateTime->ViewValue, 0);
        $this->OPUDateTime->ViewCustomAttributes = "";

        // HoursAfterTrigger
        $this->HoursAfterTrigger->ViewValue = $this->HoursAfterTrigger->CurrentValue;
        $this->HoursAfterTrigger->ViewCustomAttributes = "";

        // SerumE2
        $this->SerumE2->ViewValue = $this->SerumE2->CurrentValue;
        $this->SerumE2->ViewCustomAttributes = "";

        // SerumP4
        $this->SerumP4->ViewValue = $this->SerumP4->CurrentValue;
        $this->SerumP4->ViewCustomAttributes = "";

        // FORT
        $this->FORT->ViewValue = $this->FORT->CurrentValue;
        $this->FORT->ViewCustomAttributes = "";

        // ExperctedOocytes
        $this->ExperctedOocytes->ViewValue = $this->ExperctedOocytes->CurrentValue;
        $this->ExperctedOocytes->ViewCustomAttributes = "";

        // NoOfOocytesRetrieved
        $this->NoOfOocytesRetrieved->ViewValue = $this->NoOfOocytesRetrieved->CurrentValue;
        $this->NoOfOocytesRetrieved->ViewCustomAttributes = "";

        // OocytesRetreivalRate
        $this->OocytesRetreivalRate->ViewValue = $this->OocytesRetreivalRate->CurrentValue;
        $this->OocytesRetreivalRate->ViewCustomAttributes = "";

        // Anesthesia
        $this->Anesthesia->ViewValue = $this->Anesthesia->CurrentValue;
        $this->Anesthesia->ViewCustomAttributes = "";

        // TrialCannulation
        $this->TrialCannulation->ViewValue = $this->TrialCannulation->CurrentValue;
        $this->TrialCannulation->ViewCustomAttributes = "";

        // UCL
        $this->UCL->ViewValue = $this->UCL->CurrentValue;
        $this->UCL->ViewCustomAttributes = "";

        // Angle
        $this->Angle->ViewValue = $this->Angle->CurrentValue;
        $this->Angle->ViewCustomAttributes = "";

        // EMS
        $this->EMS->ViewValue = $this->EMS->CurrentValue;
        $this->EMS->ViewCustomAttributes = "";

        // Cannulation
        $this->Cannulation->ViewValue = $this->Cannulation->CurrentValue;
        $this->Cannulation->ViewCustomAttributes = "";

        // ProcedureT
        $this->ProcedureT->ViewValue = $this->ProcedureT->CurrentValue;
        $this->ProcedureT->ViewCustomAttributes = "";

        // NoOfOocytesRetrievedd
        $this->NoOfOocytesRetrievedd->ViewValue = $this->NoOfOocytesRetrievedd->CurrentValue;
        $this->NoOfOocytesRetrievedd->ViewCustomAttributes = "";

        // CourseInHospital
        $this->CourseInHospital->ViewValue = $this->CourseInHospital->CurrentValue;
        $this->CourseInHospital->ViewCustomAttributes = "";

        // DischargeAdvise
        $this->DischargeAdvise->ViewValue = $this->DischargeAdvise->CurrentValue;
        $this->DischargeAdvise->ViewCustomAttributes = "";

        // FollowUpAdvise
        $this->FollowUpAdvise->ViewValue = $this->FollowUpAdvise->CurrentValue;
        $this->FollowUpAdvise->ViewCustomAttributes = "";

        // PlanT
        $this->PlanT->ViewValue = $this->PlanT->CurrentValue;
        $this->PlanT->ViewCustomAttributes = "";

        // ReviewDate
        $this->ReviewDate->ViewValue = $this->ReviewDate->CurrentValue;
        $this->ReviewDate->ViewValue = FormatDateTime($this->ReviewDate->ViewValue, 0);
        $this->ReviewDate->ViewCustomAttributes = "";

        // ReviewDoctor
        $this->ReviewDoctor->ViewValue = $this->ReviewDoctor->CurrentValue;
        $this->ReviewDoctor->ViewCustomAttributes = "";

        // TidNo
        $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
        $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
        $this->TidNo->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // RIDNo
        $this->RIDNo->LinkCustomAttributes = "";
        $this->RIDNo->HrefValue = "";
        $this->RIDNo->TooltipValue = "";

        // Name
        $this->Name->LinkCustomAttributes = "";
        $this->Name->HrefValue = "";
        $this->Name->TooltipValue = "";

        // ARTCycle
        $this->ARTCycle->LinkCustomAttributes = "";
        $this->ARTCycle->HrefValue = "";
        $this->ARTCycle->TooltipValue = "";

        // Consultant
        $this->Consultant->LinkCustomAttributes = "";
        $this->Consultant->HrefValue = "";
        $this->Consultant->TooltipValue = "";

        // TotalDoseOfStimulation
        $this->TotalDoseOfStimulation->LinkCustomAttributes = "";
        $this->TotalDoseOfStimulation->HrefValue = "";
        $this->TotalDoseOfStimulation->TooltipValue = "";

        // Protocol
        $this->Protocol->LinkCustomAttributes = "";
        $this->Protocol->HrefValue = "";
        $this->Protocol->TooltipValue = "";

        // NumberOfDaysOfStimulation
        $this->NumberOfDaysOfStimulation->LinkCustomAttributes = "";
        $this->NumberOfDaysOfStimulation->HrefValue = "";
        $this->NumberOfDaysOfStimulation->TooltipValue = "";

        // TriggerDateTime
        $this->TriggerDateTime->LinkCustomAttributes = "";
        $this->TriggerDateTime->HrefValue = "";
        $this->TriggerDateTime->TooltipValue = "";

        // OPUDateTime
        $this->OPUDateTime->LinkCustomAttributes = "";
        $this->OPUDateTime->HrefValue = "";
        $this->OPUDateTime->TooltipValue = "";

        // HoursAfterTrigger
        $this->HoursAfterTrigger->LinkCustomAttributes = "";
        $this->HoursAfterTrigger->HrefValue = "";
        $this->HoursAfterTrigger->TooltipValue = "";

        // SerumE2
        $this->SerumE2->LinkCustomAttributes = "";
        $this->SerumE2->HrefValue = "";
        $this->SerumE2->TooltipValue = "";

        // SerumP4
        $this->SerumP4->LinkCustomAttributes = "";
        $this->SerumP4->HrefValue = "";
        $this->SerumP4->TooltipValue = "";

        // FORT
        $this->FORT->LinkCustomAttributes = "";
        $this->FORT->HrefValue = "";
        $this->FORT->TooltipValue = "";

        // ExperctedOocytes
        $this->ExperctedOocytes->LinkCustomAttributes = "";
        $this->ExperctedOocytes->HrefValue = "";
        $this->ExperctedOocytes->TooltipValue = "";

        // NoOfOocytesRetrieved
        $this->NoOfOocytesRetrieved->LinkCustomAttributes = "";
        $this->NoOfOocytesRetrieved->HrefValue = "";
        $this->NoOfOocytesRetrieved->TooltipValue = "";

        // OocytesRetreivalRate
        $this->OocytesRetreivalRate->LinkCustomAttributes = "";
        $this->OocytesRetreivalRate->HrefValue = "";
        $this->OocytesRetreivalRate->TooltipValue = "";

        // Anesthesia
        $this->Anesthesia->LinkCustomAttributes = "";
        $this->Anesthesia->HrefValue = "";
        $this->Anesthesia->TooltipValue = "";

        // TrialCannulation
        $this->TrialCannulation->LinkCustomAttributes = "";
        $this->TrialCannulation->HrefValue = "";
        $this->TrialCannulation->TooltipValue = "";

        // UCL
        $this->UCL->LinkCustomAttributes = "";
        $this->UCL->HrefValue = "";
        $this->UCL->TooltipValue = "";

        // Angle
        $this->Angle->LinkCustomAttributes = "";
        $this->Angle->HrefValue = "";
        $this->Angle->TooltipValue = "";

        // EMS
        $this->EMS->LinkCustomAttributes = "";
        $this->EMS->HrefValue = "";
        $this->EMS->TooltipValue = "";

        // Cannulation
        $this->Cannulation->LinkCustomAttributes = "";
        $this->Cannulation->HrefValue = "";
        $this->Cannulation->TooltipValue = "";

        // ProcedureT
        $this->ProcedureT->LinkCustomAttributes = "";
        $this->ProcedureT->HrefValue = "";
        $this->ProcedureT->TooltipValue = "";

        // NoOfOocytesRetrievedd
        $this->NoOfOocytesRetrievedd->LinkCustomAttributes = "";
        $this->NoOfOocytesRetrievedd->HrefValue = "";
        $this->NoOfOocytesRetrievedd->TooltipValue = "";

        // CourseInHospital
        $this->CourseInHospital->LinkCustomAttributes = "";
        $this->CourseInHospital->HrefValue = "";
        $this->CourseInHospital->TooltipValue = "";

        // DischargeAdvise
        $this->DischargeAdvise->LinkCustomAttributes = "";
        $this->DischargeAdvise->HrefValue = "";
        $this->DischargeAdvise->TooltipValue = "";

        // FollowUpAdvise
        $this->FollowUpAdvise->LinkCustomAttributes = "";
        $this->FollowUpAdvise->HrefValue = "";
        $this->FollowUpAdvise->TooltipValue = "";

        // PlanT
        $this->PlanT->LinkCustomAttributes = "";
        $this->PlanT->HrefValue = "";
        $this->PlanT->TooltipValue = "";

        // ReviewDate
        $this->ReviewDate->LinkCustomAttributes = "";
        $this->ReviewDate->HrefValue = "";
        $this->ReviewDate->TooltipValue = "";

        // ReviewDoctor
        $this->ReviewDoctor->LinkCustomAttributes = "";
        $this->ReviewDoctor->HrefValue = "";
        $this->ReviewDoctor->TooltipValue = "";

        // TidNo
        $this->TidNo->LinkCustomAttributes = "";
        $this->TidNo->HrefValue = "";
        $this->TidNo->TooltipValue = "";

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

        // Name
        $this->Name->EditAttrs["class"] = "form-control";
        $this->Name->EditCustomAttributes = "";
        if (!$this->Name->Raw) {
            $this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
        }
        $this->Name->EditValue = $this->Name->CurrentValue;
        $this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

        // ARTCycle
        $this->ARTCycle->EditAttrs["class"] = "form-control";
        $this->ARTCycle->EditCustomAttributes = "";
        if (!$this->ARTCycle->Raw) {
            $this->ARTCycle->CurrentValue = HtmlDecode($this->ARTCycle->CurrentValue);
        }
        $this->ARTCycle->EditValue = $this->ARTCycle->CurrentValue;
        $this->ARTCycle->PlaceHolder = RemoveHtml($this->ARTCycle->caption());

        // Consultant
        $this->Consultant->EditAttrs["class"] = "form-control";
        $this->Consultant->EditCustomAttributes = "";
        if (!$this->Consultant->Raw) {
            $this->Consultant->CurrentValue = HtmlDecode($this->Consultant->CurrentValue);
        }
        $this->Consultant->EditValue = $this->Consultant->CurrentValue;
        $this->Consultant->PlaceHolder = RemoveHtml($this->Consultant->caption());

        // TotalDoseOfStimulation
        $this->TotalDoseOfStimulation->EditAttrs["class"] = "form-control";
        $this->TotalDoseOfStimulation->EditCustomAttributes = "";
        if (!$this->TotalDoseOfStimulation->Raw) {
            $this->TotalDoseOfStimulation->CurrentValue = HtmlDecode($this->TotalDoseOfStimulation->CurrentValue);
        }
        $this->TotalDoseOfStimulation->EditValue = $this->TotalDoseOfStimulation->CurrentValue;
        $this->TotalDoseOfStimulation->PlaceHolder = RemoveHtml($this->TotalDoseOfStimulation->caption());

        // Protocol
        $this->Protocol->EditAttrs["class"] = "form-control";
        $this->Protocol->EditCustomAttributes = "";
        if (!$this->Protocol->Raw) {
            $this->Protocol->CurrentValue = HtmlDecode($this->Protocol->CurrentValue);
        }
        $this->Protocol->EditValue = $this->Protocol->CurrentValue;
        $this->Protocol->PlaceHolder = RemoveHtml($this->Protocol->caption());

        // NumberOfDaysOfStimulation
        $this->NumberOfDaysOfStimulation->EditAttrs["class"] = "form-control";
        $this->NumberOfDaysOfStimulation->EditCustomAttributes = "";
        if (!$this->NumberOfDaysOfStimulation->Raw) {
            $this->NumberOfDaysOfStimulation->CurrentValue = HtmlDecode($this->NumberOfDaysOfStimulation->CurrentValue);
        }
        $this->NumberOfDaysOfStimulation->EditValue = $this->NumberOfDaysOfStimulation->CurrentValue;
        $this->NumberOfDaysOfStimulation->PlaceHolder = RemoveHtml($this->NumberOfDaysOfStimulation->caption());

        // TriggerDateTime
        $this->TriggerDateTime->EditAttrs["class"] = "form-control";
        $this->TriggerDateTime->EditCustomAttributes = "";
        $this->TriggerDateTime->EditValue = FormatDateTime($this->TriggerDateTime->CurrentValue, 8);
        $this->TriggerDateTime->PlaceHolder = RemoveHtml($this->TriggerDateTime->caption());

        // OPUDateTime
        $this->OPUDateTime->EditAttrs["class"] = "form-control";
        $this->OPUDateTime->EditCustomAttributes = "";
        $this->OPUDateTime->EditValue = FormatDateTime($this->OPUDateTime->CurrentValue, 8);
        $this->OPUDateTime->PlaceHolder = RemoveHtml($this->OPUDateTime->caption());

        // HoursAfterTrigger
        $this->HoursAfterTrigger->EditAttrs["class"] = "form-control";
        $this->HoursAfterTrigger->EditCustomAttributes = "";
        if (!$this->HoursAfterTrigger->Raw) {
            $this->HoursAfterTrigger->CurrentValue = HtmlDecode($this->HoursAfterTrigger->CurrentValue);
        }
        $this->HoursAfterTrigger->EditValue = $this->HoursAfterTrigger->CurrentValue;
        $this->HoursAfterTrigger->PlaceHolder = RemoveHtml($this->HoursAfterTrigger->caption());

        // SerumE2
        $this->SerumE2->EditAttrs["class"] = "form-control";
        $this->SerumE2->EditCustomAttributes = "";
        if (!$this->SerumE2->Raw) {
            $this->SerumE2->CurrentValue = HtmlDecode($this->SerumE2->CurrentValue);
        }
        $this->SerumE2->EditValue = $this->SerumE2->CurrentValue;
        $this->SerumE2->PlaceHolder = RemoveHtml($this->SerumE2->caption());

        // SerumP4
        $this->SerumP4->EditAttrs["class"] = "form-control";
        $this->SerumP4->EditCustomAttributes = "";
        if (!$this->SerumP4->Raw) {
            $this->SerumP4->CurrentValue = HtmlDecode($this->SerumP4->CurrentValue);
        }
        $this->SerumP4->EditValue = $this->SerumP4->CurrentValue;
        $this->SerumP4->PlaceHolder = RemoveHtml($this->SerumP4->caption());

        // FORT
        $this->FORT->EditAttrs["class"] = "form-control";
        $this->FORT->EditCustomAttributes = "";
        if (!$this->FORT->Raw) {
            $this->FORT->CurrentValue = HtmlDecode($this->FORT->CurrentValue);
        }
        $this->FORT->EditValue = $this->FORT->CurrentValue;
        $this->FORT->PlaceHolder = RemoveHtml($this->FORT->caption());

        // ExperctedOocytes
        $this->ExperctedOocytes->EditAttrs["class"] = "form-control";
        $this->ExperctedOocytes->EditCustomAttributes = "";
        if (!$this->ExperctedOocytes->Raw) {
            $this->ExperctedOocytes->CurrentValue = HtmlDecode($this->ExperctedOocytes->CurrentValue);
        }
        $this->ExperctedOocytes->EditValue = $this->ExperctedOocytes->CurrentValue;
        $this->ExperctedOocytes->PlaceHolder = RemoveHtml($this->ExperctedOocytes->caption());

        // NoOfOocytesRetrieved
        $this->NoOfOocytesRetrieved->EditAttrs["class"] = "form-control";
        $this->NoOfOocytesRetrieved->EditCustomAttributes = "";
        if (!$this->NoOfOocytesRetrieved->Raw) {
            $this->NoOfOocytesRetrieved->CurrentValue = HtmlDecode($this->NoOfOocytesRetrieved->CurrentValue);
        }
        $this->NoOfOocytesRetrieved->EditValue = $this->NoOfOocytesRetrieved->CurrentValue;
        $this->NoOfOocytesRetrieved->PlaceHolder = RemoveHtml($this->NoOfOocytesRetrieved->caption());

        // OocytesRetreivalRate
        $this->OocytesRetreivalRate->EditAttrs["class"] = "form-control";
        $this->OocytesRetreivalRate->EditCustomAttributes = "";
        if (!$this->OocytesRetreivalRate->Raw) {
            $this->OocytesRetreivalRate->CurrentValue = HtmlDecode($this->OocytesRetreivalRate->CurrentValue);
        }
        $this->OocytesRetreivalRate->EditValue = $this->OocytesRetreivalRate->CurrentValue;
        $this->OocytesRetreivalRate->PlaceHolder = RemoveHtml($this->OocytesRetreivalRate->caption());

        // Anesthesia
        $this->Anesthesia->EditAttrs["class"] = "form-control";
        $this->Anesthesia->EditCustomAttributes = "";
        if (!$this->Anesthesia->Raw) {
            $this->Anesthesia->CurrentValue = HtmlDecode($this->Anesthesia->CurrentValue);
        }
        $this->Anesthesia->EditValue = $this->Anesthesia->CurrentValue;
        $this->Anesthesia->PlaceHolder = RemoveHtml($this->Anesthesia->caption());

        // TrialCannulation
        $this->TrialCannulation->EditAttrs["class"] = "form-control";
        $this->TrialCannulation->EditCustomAttributes = "";
        if (!$this->TrialCannulation->Raw) {
            $this->TrialCannulation->CurrentValue = HtmlDecode($this->TrialCannulation->CurrentValue);
        }
        $this->TrialCannulation->EditValue = $this->TrialCannulation->CurrentValue;
        $this->TrialCannulation->PlaceHolder = RemoveHtml($this->TrialCannulation->caption());

        // UCL
        $this->UCL->EditAttrs["class"] = "form-control";
        $this->UCL->EditCustomAttributes = "";
        if (!$this->UCL->Raw) {
            $this->UCL->CurrentValue = HtmlDecode($this->UCL->CurrentValue);
        }
        $this->UCL->EditValue = $this->UCL->CurrentValue;
        $this->UCL->PlaceHolder = RemoveHtml($this->UCL->caption());

        // Angle
        $this->Angle->EditAttrs["class"] = "form-control";
        $this->Angle->EditCustomAttributes = "";
        if (!$this->Angle->Raw) {
            $this->Angle->CurrentValue = HtmlDecode($this->Angle->CurrentValue);
        }
        $this->Angle->EditValue = $this->Angle->CurrentValue;
        $this->Angle->PlaceHolder = RemoveHtml($this->Angle->caption());

        // EMS
        $this->EMS->EditAttrs["class"] = "form-control";
        $this->EMS->EditCustomAttributes = "";
        if (!$this->EMS->Raw) {
            $this->EMS->CurrentValue = HtmlDecode($this->EMS->CurrentValue);
        }
        $this->EMS->EditValue = $this->EMS->CurrentValue;
        $this->EMS->PlaceHolder = RemoveHtml($this->EMS->caption());

        // Cannulation
        $this->Cannulation->EditAttrs["class"] = "form-control";
        $this->Cannulation->EditCustomAttributes = "";
        if (!$this->Cannulation->Raw) {
            $this->Cannulation->CurrentValue = HtmlDecode($this->Cannulation->CurrentValue);
        }
        $this->Cannulation->EditValue = $this->Cannulation->CurrentValue;
        $this->Cannulation->PlaceHolder = RemoveHtml($this->Cannulation->caption());

        // ProcedureT
        $this->ProcedureT->EditAttrs["class"] = "form-control";
        $this->ProcedureT->EditCustomAttributes = "";
        $this->ProcedureT->EditValue = $this->ProcedureT->CurrentValue;
        $this->ProcedureT->PlaceHolder = RemoveHtml($this->ProcedureT->caption());

        // NoOfOocytesRetrievedd
        $this->NoOfOocytesRetrievedd->EditAttrs["class"] = "form-control";
        $this->NoOfOocytesRetrievedd->EditCustomAttributes = "";
        if (!$this->NoOfOocytesRetrievedd->Raw) {
            $this->NoOfOocytesRetrievedd->CurrentValue = HtmlDecode($this->NoOfOocytesRetrievedd->CurrentValue);
        }
        $this->NoOfOocytesRetrievedd->EditValue = $this->NoOfOocytesRetrievedd->CurrentValue;
        $this->NoOfOocytesRetrievedd->PlaceHolder = RemoveHtml($this->NoOfOocytesRetrievedd->caption());

        // CourseInHospital
        $this->CourseInHospital->EditAttrs["class"] = "form-control";
        $this->CourseInHospital->EditCustomAttributes = "";
        $this->CourseInHospital->EditValue = $this->CourseInHospital->CurrentValue;
        $this->CourseInHospital->PlaceHolder = RemoveHtml($this->CourseInHospital->caption());

        // DischargeAdvise
        $this->DischargeAdvise->EditAttrs["class"] = "form-control";
        $this->DischargeAdvise->EditCustomAttributes = "";
        $this->DischargeAdvise->EditValue = $this->DischargeAdvise->CurrentValue;
        $this->DischargeAdvise->PlaceHolder = RemoveHtml($this->DischargeAdvise->caption());

        // FollowUpAdvise
        $this->FollowUpAdvise->EditAttrs["class"] = "form-control";
        $this->FollowUpAdvise->EditCustomAttributes = "";
        $this->FollowUpAdvise->EditValue = $this->FollowUpAdvise->CurrentValue;
        $this->FollowUpAdvise->PlaceHolder = RemoveHtml($this->FollowUpAdvise->caption());

        // PlanT
        $this->PlanT->EditAttrs["class"] = "form-control";
        $this->PlanT->EditCustomAttributes = "";
        if (!$this->PlanT->Raw) {
            $this->PlanT->CurrentValue = HtmlDecode($this->PlanT->CurrentValue);
        }
        $this->PlanT->EditValue = $this->PlanT->CurrentValue;
        $this->PlanT->PlaceHolder = RemoveHtml($this->PlanT->caption());

        // ReviewDate
        $this->ReviewDate->EditAttrs["class"] = "form-control";
        $this->ReviewDate->EditCustomAttributes = "";
        $this->ReviewDate->EditValue = FormatDateTime($this->ReviewDate->CurrentValue, 8);
        $this->ReviewDate->PlaceHolder = RemoveHtml($this->ReviewDate->caption());

        // ReviewDoctor
        $this->ReviewDoctor->EditAttrs["class"] = "form-control";
        $this->ReviewDoctor->EditCustomAttributes = "";
        if (!$this->ReviewDoctor->Raw) {
            $this->ReviewDoctor->CurrentValue = HtmlDecode($this->ReviewDoctor->CurrentValue);
        }
        $this->ReviewDoctor->EditValue = $this->ReviewDoctor->CurrentValue;
        $this->ReviewDoctor->PlaceHolder = RemoveHtml($this->ReviewDoctor->caption());

        // TidNo
        $this->TidNo->EditAttrs["class"] = "form-control";
        $this->TidNo->EditCustomAttributes = "";
        $this->TidNo->EditValue = $this->TidNo->CurrentValue;
        $this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

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
                    $doc->exportCaption($this->Name);
                    $doc->exportCaption($this->ARTCycle);
                    $doc->exportCaption($this->Consultant);
                    $doc->exportCaption($this->TotalDoseOfStimulation);
                    $doc->exportCaption($this->Protocol);
                    $doc->exportCaption($this->NumberOfDaysOfStimulation);
                    $doc->exportCaption($this->TriggerDateTime);
                    $doc->exportCaption($this->OPUDateTime);
                    $doc->exportCaption($this->HoursAfterTrigger);
                    $doc->exportCaption($this->SerumE2);
                    $doc->exportCaption($this->SerumP4);
                    $doc->exportCaption($this->FORT);
                    $doc->exportCaption($this->ExperctedOocytes);
                    $doc->exportCaption($this->NoOfOocytesRetrieved);
                    $doc->exportCaption($this->OocytesRetreivalRate);
                    $doc->exportCaption($this->Anesthesia);
                    $doc->exportCaption($this->TrialCannulation);
                    $doc->exportCaption($this->UCL);
                    $doc->exportCaption($this->Angle);
                    $doc->exportCaption($this->EMS);
                    $doc->exportCaption($this->Cannulation);
                    $doc->exportCaption($this->ProcedureT);
                    $doc->exportCaption($this->NoOfOocytesRetrievedd);
                    $doc->exportCaption($this->CourseInHospital);
                    $doc->exportCaption($this->DischargeAdvise);
                    $doc->exportCaption($this->FollowUpAdvise);
                    $doc->exportCaption($this->PlanT);
                    $doc->exportCaption($this->ReviewDate);
                    $doc->exportCaption($this->ReviewDoctor);
                    $doc->exportCaption($this->TidNo);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->RIDNo);
                    $doc->exportCaption($this->Name);
                    $doc->exportCaption($this->ARTCycle);
                    $doc->exportCaption($this->Consultant);
                    $doc->exportCaption($this->TotalDoseOfStimulation);
                    $doc->exportCaption($this->Protocol);
                    $doc->exportCaption($this->NumberOfDaysOfStimulation);
                    $doc->exportCaption($this->TriggerDateTime);
                    $doc->exportCaption($this->OPUDateTime);
                    $doc->exportCaption($this->HoursAfterTrigger);
                    $doc->exportCaption($this->SerumE2);
                    $doc->exportCaption($this->SerumP4);
                    $doc->exportCaption($this->FORT);
                    $doc->exportCaption($this->ExperctedOocytes);
                    $doc->exportCaption($this->NoOfOocytesRetrieved);
                    $doc->exportCaption($this->OocytesRetreivalRate);
                    $doc->exportCaption($this->Anesthesia);
                    $doc->exportCaption($this->TrialCannulation);
                    $doc->exportCaption($this->UCL);
                    $doc->exportCaption($this->Angle);
                    $doc->exportCaption($this->EMS);
                    $doc->exportCaption($this->Cannulation);
                    $doc->exportCaption($this->NoOfOocytesRetrievedd);
                    $doc->exportCaption($this->PlanT);
                    $doc->exportCaption($this->ReviewDate);
                    $doc->exportCaption($this->ReviewDoctor);
                    $doc->exportCaption($this->TidNo);
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
                        $doc->exportField($this->Name);
                        $doc->exportField($this->ARTCycle);
                        $doc->exportField($this->Consultant);
                        $doc->exportField($this->TotalDoseOfStimulation);
                        $doc->exportField($this->Protocol);
                        $doc->exportField($this->NumberOfDaysOfStimulation);
                        $doc->exportField($this->TriggerDateTime);
                        $doc->exportField($this->OPUDateTime);
                        $doc->exportField($this->HoursAfterTrigger);
                        $doc->exportField($this->SerumE2);
                        $doc->exportField($this->SerumP4);
                        $doc->exportField($this->FORT);
                        $doc->exportField($this->ExperctedOocytes);
                        $doc->exportField($this->NoOfOocytesRetrieved);
                        $doc->exportField($this->OocytesRetreivalRate);
                        $doc->exportField($this->Anesthesia);
                        $doc->exportField($this->TrialCannulation);
                        $doc->exportField($this->UCL);
                        $doc->exportField($this->Angle);
                        $doc->exportField($this->EMS);
                        $doc->exportField($this->Cannulation);
                        $doc->exportField($this->ProcedureT);
                        $doc->exportField($this->NoOfOocytesRetrievedd);
                        $doc->exportField($this->CourseInHospital);
                        $doc->exportField($this->DischargeAdvise);
                        $doc->exportField($this->FollowUpAdvise);
                        $doc->exportField($this->PlanT);
                        $doc->exportField($this->ReviewDate);
                        $doc->exportField($this->ReviewDoctor);
                        $doc->exportField($this->TidNo);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->RIDNo);
                        $doc->exportField($this->Name);
                        $doc->exportField($this->ARTCycle);
                        $doc->exportField($this->Consultant);
                        $doc->exportField($this->TotalDoseOfStimulation);
                        $doc->exportField($this->Protocol);
                        $doc->exportField($this->NumberOfDaysOfStimulation);
                        $doc->exportField($this->TriggerDateTime);
                        $doc->exportField($this->OPUDateTime);
                        $doc->exportField($this->HoursAfterTrigger);
                        $doc->exportField($this->SerumE2);
                        $doc->exportField($this->SerumP4);
                        $doc->exportField($this->FORT);
                        $doc->exportField($this->ExperctedOocytes);
                        $doc->exportField($this->NoOfOocytesRetrieved);
                        $doc->exportField($this->OocytesRetreivalRate);
                        $doc->exportField($this->Anesthesia);
                        $doc->exportField($this->TrialCannulation);
                        $doc->exportField($this->UCL);
                        $doc->exportField($this->Angle);
                        $doc->exportField($this->EMS);
                        $doc->exportField($this->Cannulation);
                        $doc->exportField($this->NoOfOocytesRetrievedd);
                        $doc->exportField($this->PlanT);
                        $doc->exportField($this->ReviewDate);
                        $doc->exportField($this->ReviewDoctor);
                        $doc->exportField($this->TidNo);
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
