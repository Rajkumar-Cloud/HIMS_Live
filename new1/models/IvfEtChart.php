<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for ivf_et_chart
 */
class IvfEtChart extends DbTable
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
    public $InseminatinTechnique;
    public $IndicationForART;
    public $PreTreatment;
    public $Hysteroscopy;
    public $EndometrialScratching;
    public $TrialCannulation;
    public $CYCLETYPE;
    public $HRTCYCLE;
    public $OralEstrogenDosage;
    public $VaginalEstrogen;
    public $GCSF;
    public $ActivatedPRP;
    public $ERA;
    public $UCLcm;
    public $DATEOFSTART;
    public $DATEOFEMBRYOTRANSFER;
    public $DAYOFEMBRYOTRANSFER;
    public $NOOFEMBRYOSTHAWED;
    public $NOOFEMBRYOSTRANSFERRED;
    public $DAYOFEMBRYOS;
    public $CRYOPRESERVEDEMBRYOS;
    public $Code1;
    public $Code2;
    public $CellStage1;
    public $CellStage2;
    public $Grade1;
    public $Grade2;
    public $ProcedureRecord;
    public $Medicationsadvised;
    public $PostProcedureInstructions;
    public $PregnancyTestingWithSerumBetaHcG;
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
        $this->TableVar = 'ivf_et_chart';
        $this->TableName = 'ivf_et_chart';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`ivf_et_chart`";
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
        $this->id = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['id'] = &$this->id;

        // RIDNo
        $this->RIDNo = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_RIDNo', 'RIDNo', '`RIDNo`', '`RIDNo`', 3, 11, -1, false, '`RIDNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RIDNo->Nullable = false; // NOT NULL field
        $this->RIDNo->Required = true; // Required field
        $this->RIDNo->Sortable = true; // Allow sort
        $this->RIDNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['RIDNo'] = &$this->RIDNo;

        // Name
        $this->Name = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_Name', 'Name', '`Name`', '`Name`', 200, 45, -1, false, '`Name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Name->Sortable = true; // Allow sort
        $this->Fields['Name'] = &$this->Name;

        // ARTCycle
        $this->ARTCycle = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_ARTCycle', 'ARTCycle', '`ARTCycle`', '`ARTCycle`', 200, 45, -1, false, '`ARTCycle`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ARTCycle->Sortable = true; // Allow sort
        $this->Fields['ARTCycle'] = &$this->ARTCycle;

        // Consultant
        $this->Consultant = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_Consultant', 'Consultant', '`Consultant`', '`Consultant`', 200, 45, -1, false, '`Consultant`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Consultant->Sortable = true; // Allow sort
        $this->Fields['Consultant'] = &$this->Consultant;

        // InseminatinTechnique
        $this->InseminatinTechnique = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_InseminatinTechnique', 'InseminatinTechnique', '`InseminatinTechnique`', '`InseminatinTechnique`', 200, 45, -1, false, '`InseminatinTechnique`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->InseminatinTechnique->Sortable = true; // Allow sort
        $this->Fields['InseminatinTechnique'] = &$this->InseminatinTechnique;

        // IndicationForART
        $this->IndicationForART = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_IndicationForART', 'IndicationForART', '`IndicationForART`', '`IndicationForART`', 200, 45, -1, false, '`IndicationForART`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IndicationForART->Sortable = true; // Allow sort
        $this->Fields['IndicationForART'] = &$this->IndicationForART;

        // PreTreatment
        $this->PreTreatment = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_PreTreatment', 'PreTreatment', '`PreTreatment`', '`PreTreatment`', 200, 45, -1, false, '`PreTreatment`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PreTreatment->Sortable = true; // Allow sort
        $this->Fields['PreTreatment'] = &$this->PreTreatment;

        // Hysteroscopy
        $this->Hysteroscopy = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_Hysteroscopy', 'Hysteroscopy', '`Hysteroscopy`', '`Hysteroscopy`', 200, 45, -1, false, '`Hysteroscopy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Hysteroscopy->Sortable = true; // Allow sort
        $this->Fields['Hysteroscopy'] = &$this->Hysteroscopy;

        // EndometrialScratching
        $this->EndometrialScratching = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_EndometrialScratching', 'EndometrialScratching', '`EndometrialScratching`', '`EndometrialScratching`', 200, 45, -1, false, '`EndometrialScratching`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EndometrialScratching->Sortable = true; // Allow sort
        $this->Fields['EndometrialScratching'] = &$this->EndometrialScratching;

        // TrialCannulation
        $this->TrialCannulation = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_TrialCannulation', 'TrialCannulation', '`TrialCannulation`', '`TrialCannulation`', 200, 45, -1, false, '`TrialCannulation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TrialCannulation->Sortable = true; // Allow sort
        $this->Fields['TrialCannulation'] = &$this->TrialCannulation;

        // CYCLETYPE
        $this->CYCLETYPE = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_CYCLETYPE', 'CYCLETYPE', '`CYCLETYPE`', '`CYCLETYPE`', 200, 45, -1, false, '`CYCLETYPE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CYCLETYPE->Sortable = true; // Allow sort
        $this->Fields['CYCLETYPE'] = &$this->CYCLETYPE;

        // HRTCYCLE
        $this->HRTCYCLE = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_HRTCYCLE', 'HRTCYCLE', '`HRTCYCLE`', '`HRTCYCLE`', 200, 45, -1, false, '`HRTCYCLE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HRTCYCLE->Sortable = true; // Allow sort
        $this->Fields['HRTCYCLE'] = &$this->HRTCYCLE;

        // OralEstrogenDosage
        $this->OralEstrogenDosage = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_OralEstrogenDosage', 'OralEstrogenDosage', '`OralEstrogenDosage`', '`OralEstrogenDosage`', 200, 45, -1, false, '`OralEstrogenDosage`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OralEstrogenDosage->Sortable = true; // Allow sort
        $this->Fields['OralEstrogenDosage'] = &$this->OralEstrogenDosage;

        // VaginalEstrogen
        $this->VaginalEstrogen = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_VaginalEstrogen', 'VaginalEstrogen', '`VaginalEstrogen`', '`VaginalEstrogen`', 200, 45, -1, false, '`VaginalEstrogen`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->VaginalEstrogen->Sortable = true; // Allow sort
        $this->Fields['VaginalEstrogen'] = &$this->VaginalEstrogen;

        // GCSF
        $this->GCSF = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_GCSF', 'GCSF', '`GCSF`', '`GCSF`', 200, 45, -1, false, '`GCSF`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GCSF->Sortable = true; // Allow sort
        $this->Fields['GCSF'] = &$this->GCSF;

        // ActivatedPRP
        $this->ActivatedPRP = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_ActivatedPRP', 'ActivatedPRP', '`ActivatedPRP`', '`ActivatedPRP`', 200, 45, -1, false, '`ActivatedPRP`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ActivatedPRP->Sortable = true; // Allow sort
        $this->Fields['ActivatedPRP'] = &$this->ActivatedPRP;

        // ERA
        $this->ERA = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_ERA', 'ERA', '`ERA`', '`ERA`', 200, 45, -1, false, '`ERA`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ERA->Sortable = true; // Allow sort
        $this->Fields['ERA'] = &$this->ERA;

        // UCLcm
        $this->UCLcm = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_UCLcm', 'UCLcm', '`UCLcm`', '`UCLcm`', 200, 45, -1, false, '`UCLcm`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->UCLcm->Sortable = true; // Allow sort
        $this->Fields['UCLcm'] = &$this->UCLcm;

        // DATEOFSTART
        $this->DATEOFSTART = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_DATEOFSTART', 'DATEOFSTART', '`DATEOFSTART`', CastDateFieldForLike("`DATEOFSTART`", 0, "DB"), 135, 19, 0, false, '`DATEOFSTART`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DATEOFSTART->Sortable = true; // Allow sort
        $this->DATEOFSTART->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['DATEOFSTART'] = &$this->DATEOFSTART;

        // DATEOFEMBRYOTRANSFER
        $this->DATEOFEMBRYOTRANSFER = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_DATEOFEMBRYOTRANSFER', 'DATEOFEMBRYOTRANSFER', '`DATEOFEMBRYOTRANSFER`', CastDateFieldForLike("`DATEOFEMBRYOTRANSFER`", 0, "DB"), 135, 19, 0, false, '`DATEOFEMBRYOTRANSFER`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DATEOFEMBRYOTRANSFER->Sortable = true; // Allow sort
        $this->DATEOFEMBRYOTRANSFER->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['DATEOFEMBRYOTRANSFER'] = &$this->DATEOFEMBRYOTRANSFER;

        // DAYOFEMBRYOTRANSFER
        $this->DAYOFEMBRYOTRANSFER = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_DAYOFEMBRYOTRANSFER', 'DAYOFEMBRYOTRANSFER', '`DAYOFEMBRYOTRANSFER`', '`DAYOFEMBRYOTRANSFER`', 200, 45, -1, false, '`DAYOFEMBRYOTRANSFER`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DAYOFEMBRYOTRANSFER->Sortable = true; // Allow sort
        $this->Fields['DAYOFEMBRYOTRANSFER'] = &$this->DAYOFEMBRYOTRANSFER;

        // NOOFEMBRYOSTHAWED
        $this->NOOFEMBRYOSTHAWED = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_NOOFEMBRYOSTHAWED', 'NOOFEMBRYOSTHAWED', '`NOOFEMBRYOSTHAWED`', '`NOOFEMBRYOSTHAWED`', 200, 45, -1, false, '`NOOFEMBRYOSTHAWED`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NOOFEMBRYOSTHAWED->Sortable = true; // Allow sort
        $this->Fields['NOOFEMBRYOSTHAWED'] = &$this->NOOFEMBRYOSTHAWED;

        // NOOFEMBRYOSTRANSFERRED
        $this->NOOFEMBRYOSTRANSFERRED = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_NOOFEMBRYOSTRANSFERRED', 'NOOFEMBRYOSTRANSFERRED', '`NOOFEMBRYOSTRANSFERRED`', '`NOOFEMBRYOSTRANSFERRED`', 200, 45, -1, false, '`NOOFEMBRYOSTRANSFERRED`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NOOFEMBRYOSTRANSFERRED->Sortable = true; // Allow sort
        $this->Fields['NOOFEMBRYOSTRANSFERRED'] = &$this->NOOFEMBRYOSTRANSFERRED;

        // DAYOFEMBRYOS
        $this->DAYOFEMBRYOS = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_DAYOFEMBRYOS', 'DAYOFEMBRYOS', '`DAYOFEMBRYOS`', '`DAYOFEMBRYOS`', 200, 45, -1, false, '`DAYOFEMBRYOS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DAYOFEMBRYOS->Sortable = true; // Allow sort
        $this->Fields['DAYOFEMBRYOS'] = &$this->DAYOFEMBRYOS;

        // CRYOPRESERVEDEMBRYOS
        $this->CRYOPRESERVEDEMBRYOS = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_CRYOPRESERVEDEMBRYOS', 'CRYOPRESERVEDEMBRYOS', '`CRYOPRESERVEDEMBRYOS`', '`CRYOPRESERVEDEMBRYOS`', 200, 45, -1, false, '`CRYOPRESERVEDEMBRYOS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CRYOPRESERVEDEMBRYOS->Sortable = true; // Allow sort
        $this->Fields['CRYOPRESERVEDEMBRYOS'] = &$this->CRYOPRESERVEDEMBRYOS;

        // Code1
        $this->Code1 = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_Code1', 'Code1', '`Code1`', '`Code1`', 200, 45, -1, false, '`Code1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Code1->Sortable = true; // Allow sort
        $this->Fields['Code1'] = &$this->Code1;

        // Code2
        $this->Code2 = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_Code2', 'Code2', '`Code2`', '`Code2`', 200, 45, -1, false, '`Code2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Code2->Sortable = true; // Allow sort
        $this->Fields['Code2'] = &$this->Code2;

        // CellStage1
        $this->CellStage1 = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_CellStage1', 'CellStage1', '`CellStage1`', '`CellStage1`', 200, 45, -1, false, '`CellStage1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CellStage1->Sortable = true; // Allow sort
        $this->Fields['CellStage1'] = &$this->CellStage1;

        // CellStage2
        $this->CellStage2 = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_CellStage2', 'CellStage2', '`CellStage2`', '`CellStage2`', 200, 45, -1, false, '`CellStage2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CellStage2->Sortable = true; // Allow sort
        $this->Fields['CellStage2'] = &$this->CellStage2;

        // Grade1
        $this->Grade1 = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_Grade1', 'Grade1', '`Grade1`', '`Grade1`', 200, 45, -1, false, '`Grade1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Grade1->Sortable = true; // Allow sort
        $this->Fields['Grade1'] = &$this->Grade1;

        // Grade2
        $this->Grade2 = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_Grade2', 'Grade2', '`Grade2`', '`Grade2`', 200, 45, -1, false, '`Grade2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Grade2->Sortable = true; // Allow sort
        $this->Fields['Grade2'] = &$this->Grade2;

        // ProcedureRecord
        $this->ProcedureRecord = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_ProcedureRecord', 'ProcedureRecord', '`ProcedureRecord`', '`ProcedureRecord`', 201, 65535, -1, false, '`ProcedureRecord`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->ProcedureRecord->Sortable = true; // Allow sort
        $this->Fields['ProcedureRecord'] = &$this->ProcedureRecord;

        // Medicationsadvised
        $this->Medicationsadvised = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_Medicationsadvised', 'Medicationsadvised', '`Medicationsadvised`', '`Medicationsadvised`', 201, 65535, -1, false, '`Medicationsadvised`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Medicationsadvised->Sortable = true; // Allow sort
        $this->Fields['Medicationsadvised'] = &$this->Medicationsadvised;

        // PostProcedureInstructions
        $this->PostProcedureInstructions = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_PostProcedureInstructions', 'PostProcedureInstructions', '`PostProcedureInstructions`', '`PostProcedureInstructions`', 201, 65535, -1, false, '`PostProcedureInstructions`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->PostProcedureInstructions->Sortable = true; // Allow sort
        $this->Fields['PostProcedureInstructions'] = &$this->PostProcedureInstructions;

        // PregnancyTestingWithSerumBetaHcG
        $this->PregnancyTestingWithSerumBetaHcG = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_PregnancyTestingWithSerumBetaHcG', 'PregnancyTestingWithSerumBetaHcG', '`PregnancyTestingWithSerumBetaHcG`', '`PregnancyTestingWithSerumBetaHcG`', 200, 45, -1, false, '`PregnancyTestingWithSerumBetaHcG`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PregnancyTestingWithSerumBetaHcG->Sortable = true; // Allow sort
        $this->Fields['PregnancyTestingWithSerumBetaHcG'] = &$this->PregnancyTestingWithSerumBetaHcG;

        // ReviewDate
        $this->ReviewDate = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_ReviewDate', 'ReviewDate', '`ReviewDate`', CastDateFieldForLike("`ReviewDate`", 0, "DB"), 135, 19, 0, false, '`ReviewDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReviewDate->Sortable = true; // Allow sort
        $this->ReviewDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['ReviewDate'] = &$this->ReviewDate;

        // ReviewDoctor
        $this->ReviewDoctor = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_ReviewDoctor', 'ReviewDoctor', '`ReviewDoctor`', '`ReviewDoctor`', 200, 45, -1, false, '`ReviewDoctor`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReviewDoctor->Sortable = true; // Allow sort
        $this->Fields['ReviewDoctor'] = &$this->ReviewDoctor;

        // TidNo
        $this->TidNo = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_TidNo', 'TidNo', '`TidNo`', '`TidNo`', 3, 11, -1, false, '`TidNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`ivf_et_chart`";
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
        $this->InseminatinTechnique->DbValue = $row['InseminatinTechnique'];
        $this->IndicationForART->DbValue = $row['IndicationForART'];
        $this->PreTreatment->DbValue = $row['PreTreatment'];
        $this->Hysteroscopy->DbValue = $row['Hysteroscopy'];
        $this->EndometrialScratching->DbValue = $row['EndometrialScratching'];
        $this->TrialCannulation->DbValue = $row['TrialCannulation'];
        $this->CYCLETYPE->DbValue = $row['CYCLETYPE'];
        $this->HRTCYCLE->DbValue = $row['HRTCYCLE'];
        $this->OralEstrogenDosage->DbValue = $row['OralEstrogenDosage'];
        $this->VaginalEstrogen->DbValue = $row['VaginalEstrogen'];
        $this->GCSF->DbValue = $row['GCSF'];
        $this->ActivatedPRP->DbValue = $row['ActivatedPRP'];
        $this->ERA->DbValue = $row['ERA'];
        $this->UCLcm->DbValue = $row['UCLcm'];
        $this->DATEOFSTART->DbValue = $row['DATEOFSTART'];
        $this->DATEOFEMBRYOTRANSFER->DbValue = $row['DATEOFEMBRYOTRANSFER'];
        $this->DAYOFEMBRYOTRANSFER->DbValue = $row['DAYOFEMBRYOTRANSFER'];
        $this->NOOFEMBRYOSTHAWED->DbValue = $row['NOOFEMBRYOSTHAWED'];
        $this->NOOFEMBRYOSTRANSFERRED->DbValue = $row['NOOFEMBRYOSTRANSFERRED'];
        $this->DAYOFEMBRYOS->DbValue = $row['DAYOFEMBRYOS'];
        $this->CRYOPRESERVEDEMBRYOS->DbValue = $row['CRYOPRESERVEDEMBRYOS'];
        $this->Code1->DbValue = $row['Code1'];
        $this->Code2->DbValue = $row['Code2'];
        $this->CellStage1->DbValue = $row['CellStage1'];
        $this->CellStage2->DbValue = $row['CellStage2'];
        $this->Grade1->DbValue = $row['Grade1'];
        $this->Grade2->DbValue = $row['Grade2'];
        $this->ProcedureRecord->DbValue = $row['ProcedureRecord'];
        $this->Medicationsadvised->DbValue = $row['Medicationsadvised'];
        $this->PostProcedureInstructions->DbValue = $row['PostProcedureInstructions'];
        $this->PregnancyTestingWithSerumBetaHcG->DbValue = $row['PregnancyTestingWithSerumBetaHcG'];
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
            return GetUrl("IvfEtChartList");
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
        if ($pageName == "IvfEtChartView") {
            return $Language->phrase("View");
        } elseif ($pageName == "IvfEtChartEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "IvfEtChartAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "IvfEtChartList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("IvfEtChartView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("IvfEtChartView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "IvfEtChartAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "IvfEtChartAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("IvfEtChartEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("IvfEtChartAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("IvfEtChartDelete", $this->getUrlParm());
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
        $this->InseminatinTechnique->setDbValue($row['InseminatinTechnique']);
        $this->IndicationForART->setDbValue($row['IndicationForART']);
        $this->PreTreatment->setDbValue($row['PreTreatment']);
        $this->Hysteroscopy->setDbValue($row['Hysteroscopy']);
        $this->EndometrialScratching->setDbValue($row['EndometrialScratching']);
        $this->TrialCannulation->setDbValue($row['TrialCannulation']);
        $this->CYCLETYPE->setDbValue($row['CYCLETYPE']);
        $this->HRTCYCLE->setDbValue($row['HRTCYCLE']);
        $this->OralEstrogenDosage->setDbValue($row['OralEstrogenDosage']);
        $this->VaginalEstrogen->setDbValue($row['VaginalEstrogen']);
        $this->GCSF->setDbValue($row['GCSF']);
        $this->ActivatedPRP->setDbValue($row['ActivatedPRP']);
        $this->ERA->setDbValue($row['ERA']);
        $this->UCLcm->setDbValue($row['UCLcm']);
        $this->DATEOFSTART->setDbValue($row['DATEOFSTART']);
        $this->DATEOFEMBRYOTRANSFER->setDbValue($row['DATEOFEMBRYOTRANSFER']);
        $this->DAYOFEMBRYOTRANSFER->setDbValue($row['DAYOFEMBRYOTRANSFER']);
        $this->NOOFEMBRYOSTHAWED->setDbValue($row['NOOFEMBRYOSTHAWED']);
        $this->NOOFEMBRYOSTRANSFERRED->setDbValue($row['NOOFEMBRYOSTRANSFERRED']);
        $this->DAYOFEMBRYOS->setDbValue($row['DAYOFEMBRYOS']);
        $this->CRYOPRESERVEDEMBRYOS->setDbValue($row['CRYOPRESERVEDEMBRYOS']);
        $this->Code1->setDbValue($row['Code1']);
        $this->Code2->setDbValue($row['Code2']);
        $this->CellStage1->setDbValue($row['CellStage1']);
        $this->CellStage2->setDbValue($row['CellStage2']);
        $this->Grade1->setDbValue($row['Grade1']);
        $this->Grade2->setDbValue($row['Grade2']);
        $this->ProcedureRecord->setDbValue($row['ProcedureRecord']);
        $this->Medicationsadvised->setDbValue($row['Medicationsadvised']);
        $this->PostProcedureInstructions->setDbValue($row['PostProcedureInstructions']);
        $this->PregnancyTestingWithSerumBetaHcG->setDbValue($row['PregnancyTestingWithSerumBetaHcG']);
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

        // InseminatinTechnique

        // IndicationForART

        // PreTreatment

        // Hysteroscopy

        // EndometrialScratching

        // TrialCannulation

        // CYCLETYPE

        // HRTCYCLE

        // OralEstrogenDosage

        // VaginalEstrogen

        // GCSF

        // ActivatedPRP

        // ERA

        // UCLcm

        // DATEOFSTART

        // DATEOFEMBRYOTRANSFER

        // DAYOFEMBRYOTRANSFER

        // NOOFEMBRYOSTHAWED

        // NOOFEMBRYOSTRANSFERRED

        // DAYOFEMBRYOS

        // CRYOPRESERVEDEMBRYOS

        // Code1

        // Code2

        // CellStage1

        // CellStage2

        // Grade1

        // Grade2

        // ProcedureRecord

        // Medicationsadvised

        // PostProcedureInstructions

        // PregnancyTestingWithSerumBetaHcG

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

        // InseminatinTechnique
        $this->InseminatinTechnique->ViewValue = $this->InseminatinTechnique->CurrentValue;
        $this->InseminatinTechnique->ViewCustomAttributes = "";

        // IndicationForART
        $this->IndicationForART->ViewValue = $this->IndicationForART->CurrentValue;
        $this->IndicationForART->ViewCustomAttributes = "";

        // PreTreatment
        $this->PreTreatment->ViewValue = $this->PreTreatment->CurrentValue;
        $this->PreTreatment->ViewCustomAttributes = "";

        // Hysteroscopy
        $this->Hysteroscopy->ViewValue = $this->Hysteroscopy->CurrentValue;
        $this->Hysteroscopy->ViewCustomAttributes = "";

        // EndometrialScratching
        $this->EndometrialScratching->ViewValue = $this->EndometrialScratching->CurrentValue;
        $this->EndometrialScratching->ViewCustomAttributes = "";

        // TrialCannulation
        $this->TrialCannulation->ViewValue = $this->TrialCannulation->CurrentValue;
        $this->TrialCannulation->ViewCustomAttributes = "";

        // CYCLETYPE
        $this->CYCLETYPE->ViewValue = $this->CYCLETYPE->CurrentValue;
        $this->CYCLETYPE->ViewCustomAttributes = "";

        // HRTCYCLE
        $this->HRTCYCLE->ViewValue = $this->HRTCYCLE->CurrentValue;
        $this->HRTCYCLE->ViewCustomAttributes = "";

        // OralEstrogenDosage
        $this->OralEstrogenDosage->ViewValue = $this->OralEstrogenDosage->CurrentValue;
        $this->OralEstrogenDosage->ViewCustomAttributes = "";

        // VaginalEstrogen
        $this->VaginalEstrogen->ViewValue = $this->VaginalEstrogen->CurrentValue;
        $this->VaginalEstrogen->ViewCustomAttributes = "";

        // GCSF
        $this->GCSF->ViewValue = $this->GCSF->CurrentValue;
        $this->GCSF->ViewCustomAttributes = "";

        // ActivatedPRP
        $this->ActivatedPRP->ViewValue = $this->ActivatedPRP->CurrentValue;
        $this->ActivatedPRP->ViewCustomAttributes = "";

        // ERA
        $this->ERA->ViewValue = $this->ERA->CurrentValue;
        $this->ERA->ViewCustomAttributes = "";

        // UCLcm
        $this->UCLcm->ViewValue = $this->UCLcm->CurrentValue;
        $this->UCLcm->ViewCustomAttributes = "";

        // DATEOFSTART
        $this->DATEOFSTART->ViewValue = $this->DATEOFSTART->CurrentValue;
        $this->DATEOFSTART->ViewValue = FormatDateTime($this->DATEOFSTART->ViewValue, 0);
        $this->DATEOFSTART->ViewCustomAttributes = "";

        // DATEOFEMBRYOTRANSFER
        $this->DATEOFEMBRYOTRANSFER->ViewValue = $this->DATEOFEMBRYOTRANSFER->CurrentValue;
        $this->DATEOFEMBRYOTRANSFER->ViewValue = FormatDateTime($this->DATEOFEMBRYOTRANSFER->ViewValue, 0);
        $this->DATEOFEMBRYOTRANSFER->ViewCustomAttributes = "";

        // DAYOFEMBRYOTRANSFER
        $this->DAYOFEMBRYOTRANSFER->ViewValue = $this->DAYOFEMBRYOTRANSFER->CurrentValue;
        $this->DAYOFEMBRYOTRANSFER->ViewCustomAttributes = "";

        // NOOFEMBRYOSTHAWED
        $this->NOOFEMBRYOSTHAWED->ViewValue = $this->NOOFEMBRYOSTHAWED->CurrentValue;
        $this->NOOFEMBRYOSTHAWED->ViewCustomAttributes = "";

        // NOOFEMBRYOSTRANSFERRED
        $this->NOOFEMBRYOSTRANSFERRED->ViewValue = $this->NOOFEMBRYOSTRANSFERRED->CurrentValue;
        $this->NOOFEMBRYOSTRANSFERRED->ViewCustomAttributes = "";

        // DAYOFEMBRYOS
        $this->DAYOFEMBRYOS->ViewValue = $this->DAYOFEMBRYOS->CurrentValue;
        $this->DAYOFEMBRYOS->ViewCustomAttributes = "";

        // CRYOPRESERVEDEMBRYOS
        $this->CRYOPRESERVEDEMBRYOS->ViewValue = $this->CRYOPRESERVEDEMBRYOS->CurrentValue;
        $this->CRYOPRESERVEDEMBRYOS->ViewCustomAttributes = "";

        // Code1
        $this->Code1->ViewValue = $this->Code1->CurrentValue;
        $this->Code1->ViewCustomAttributes = "";

        // Code2
        $this->Code2->ViewValue = $this->Code2->CurrentValue;
        $this->Code2->ViewCustomAttributes = "";

        // CellStage1
        $this->CellStage1->ViewValue = $this->CellStage1->CurrentValue;
        $this->CellStage1->ViewCustomAttributes = "";

        // CellStage2
        $this->CellStage2->ViewValue = $this->CellStage2->CurrentValue;
        $this->CellStage2->ViewCustomAttributes = "";

        // Grade1
        $this->Grade1->ViewValue = $this->Grade1->CurrentValue;
        $this->Grade1->ViewCustomAttributes = "";

        // Grade2
        $this->Grade2->ViewValue = $this->Grade2->CurrentValue;
        $this->Grade2->ViewCustomAttributes = "";

        // ProcedureRecord
        $this->ProcedureRecord->ViewValue = $this->ProcedureRecord->CurrentValue;
        $this->ProcedureRecord->ViewCustomAttributes = "";

        // Medicationsadvised
        $this->Medicationsadvised->ViewValue = $this->Medicationsadvised->CurrentValue;
        $this->Medicationsadvised->ViewCustomAttributes = "";

        // PostProcedureInstructions
        $this->PostProcedureInstructions->ViewValue = $this->PostProcedureInstructions->CurrentValue;
        $this->PostProcedureInstructions->ViewCustomAttributes = "";

        // PregnancyTestingWithSerumBetaHcG
        $this->PregnancyTestingWithSerumBetaHcG->ViewValue = $this->PregnancyTestingWithSerumBetaHcG->CurrentValue;
        $this->PregnancyTestingWithSerumBetaHcG->ViewCustomAttributes = "";

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

        // InseminatinTechnique
        $this->InseminatinTechnique->LinkCustomAttributes = "";
        $this->InseminatinTechnique->HrefValue = "";
        $this->InseminatinTechnique->TooltipValue = "";

        // IndicationForART
        $this->IndicationForART->LinkCustomAttributes = "";
        $this->IndicationForART->HrefValue = "";
        $this->IndicationForART->TooltipValue = "";

        // PreTreatment
        $this->PreTreatment->LinkCustomAttributes = "";
        $this->PreTreatment->HrefValue = "";
        $this->PreTreatment->TooltipValue = "";

        // Hysteroscopy
        $this->Hysteroscopy->LinkCustomAttributes = "";
        $this->Hysteroscopy->HrefValue = "";
        $this->Hysteroscopy->TooltipValue = "";

        // EndometrialScratching
        $this->EndometrialScratching->LinkCustomAttributes = "";
        $this->EndometrialScratching->HrefValue = "";
        $this->EndometrialScratching->TooltipValue = "";

        // TrialCannulation
        $this->TrialCannulation->LinkCustomAttributes = "";
        $this->TrialCannulation->HrefValue = "";
        $this->TrialCannulation->TooltipValue = "";

        // CYCLETYPE
        $this->CYCLETYPE->LinkCustomAttributes = "";
        $this->CYCLETYPE->HrefValue = "";
        $this->CYCLETYPE->TooltipValue = "";

        // HRTCYCLE
        $this->HRTCYCLE->LinkCustomAttributes = "";
        $this->HRTCYCLE->HrefValue = "";
        $this->HRTCYCLE->TooltipValue = "";

        // OralEstrogenDosage
        $this->OralEstrogenDosage->LinkCustomAttributes = "";
        $this->OralEstrogenDosage->HrefValue = "";
        $this->OralEstrogenDosage->TooltipValue = "";

        // VaginalEstrogen
        $this->VaginalEstrogen->LinkCustomAttributes = "";
        $this->VaginalEstrogen->HrefValue = "";
        $this->VaginalEstrogen->TooltipValue = "";

        // GCSF
        $this->GCSF->LinkCustomAttributes = "";
        $this->GCSF->HrefValue = "";
        $this->GCSF->TooltipValue = "";

        // ActivatedPRP
        $this->ActivatedPRP->LinkCustomAttributes = "";
        $this->ActivatedPRP->HrefValue = "";
        $this->ActivatedPRP->TooltipValue = "";

        // ERA
        $this->ERA->LinkCustomAttributes = "";
        $this->ERA->HrefValue = "";
        $this->ERA->TooltipValue = "";

        // UCLcm
        $this->UCLcm->LinkCustomAttributes = "";
        $this->UCLcm->HrefValue = "";
        $this->UCLcm->TooltipValue = "";

        // DATEOFSTART
        $this->DATEOFSTART->LinkCustomAttributes = "";
        $this->DATEOFSTART->HrefValue = "";
        $this->DATEOFSTART->TooltipValue = "";

        // DATEOFEMBRYOTRANSFER
        $this->DATEOFEMBRYOTRANSFER->LinkCustomAttributes = "";
        $this->DATEOFEMBRYOTRANSFER->HrefValue = "";
        $this->DATEOFEMBRYOTRANSFER->TooltipValue = "";

        // DAYOFEMBRYOTRANSFER
        $this->DAYOFEMBRYOTRANSFER->LinkCustomAttributes = "";
        $this->DAYOFEMBRYOTRANSFER->HrefValue = "";
        $this->DAYOFEMBRYOTRANSFER->TooltipValue = "";

        // NOOFEMBRYOSTHAWED
        $this->NOOFEMBRYOSTHAWED->LinkCustomAttributes = "";
        $this->NOOFEMBRYOSTHAWED->HrefValue = "";
        $this->NOOFEMBRYOSTHAWED->TooltipValue = "";

        // NOOFEMBRYOSTRANSFERRED
        $this->NOOFEMBRYOSTRANSFERRED->LinkCustomAttributes = "";
        $this->NOOFEMBRYOSTRANSFERRED->HrefValue = "";
        $this->NOOFEMBRYOSTRANSFERRED->TooltipValue = "";

        // DAYOFEMBRYOS
        $this->DAYOFEMBRYOS->LinkCustomAttributes = "";
        $this->DAYOFEMBRYOS->HrefValue = "";
        $this->DAYOFEMBRYOS->TooltipValue = "";

        // CRYOPRESERVEDEMBRYOS
        $this->CRYOPRESERVEDEMBRYOS->LinkCustomAttributes = "";
        $this->CRYOPRESERVEDEMBRYOS->HrefValue = "";
        $this->CRYOPRESERVEDEMBRYOS->TooltipValue = "";

        // Code1
        $this->Code1->LinkCustomAttributes = "";
        $this->Code1->HrefValue = "";
        $this->Code1->TooltipValue = "";

        // Code2
        $this->Code2->LinkCustomAttributes = "";
        $this->Code2->HrefValue = "";
        $this->Code2->TooltipValue = "";

        // CellStage1
        $this->CellStage1->LinkCustomAttributes = "";
        $this->CellStage1->HrefValue = "";
        $this->CellStage1->TooltipValue = "";

        // CellStage2
        $this->CellStage2->LinkCustomAttributes = "";
        $this->CellStage2->HrefValue = "";
        $this->CellStage2->TooltipValue = "";

        // Grade1
        $this->Grade1->LinkCustomAttributes = "";
        $this->Grade1->HrefValue = "";
        $this->Grade1->TooltipValue = "";

        // Grade2
        $this->Grade2->LinkCustomAttributes = "";
        $this->Grade2->HrefValue = "";
        $this->Grade2->TooltipValue = "";

        // ProcedureRecord
        $this->ProcedureRecord->LinkCustomAttributes = "";
        $this->ProcedureRecord->HrefValue = "";
        $this->ProcedureRecord->TooltipValue = "";

        // Medicationsadvised
        $this->Medicationsadvised->LinkCustomAttributes = "";
        $this->Medicationsadvised->HrefValue = "";
        $this->Medicationsadvised->TooltipValue = "";

        // PostProcedureInstructions
        $this->PostProcedureInstructions->LinkCustomAttributes = "";
        $this->PostProcedureInstructions->HrefValue = "";
        $this->PostProcedureInstructions->TooltipValue = "";

        // PregnancyTestingWithSerumBetaHcG
        $this->PregnancyTestingWithSerumBetaHcG->LinkCustomAttributes = "";
        $this->PregnancyTestingWithSerumBetaHcG->HrefValue = "";
        $this->PregnancyTestingWithSerumBetaHcG->TooltipValue = "";

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

        // InseminatinTechnique
        $this->InseminatinTechnique->EditAttrs["class"] = "form-control";
        $this->InseminatinTechnique->EditCustomAttributes = "";
        if (!$this->InseminatinTechnique->Raw) {
            $this->InseminatinTechnique->CurrentValue = HtmlDecode($this->InseminatinTechnique->CurrentValue);
        }
        $this->InseminatinTechnique->EditValue = $this->InseminatinTechnique->CurrentValue;
        $this->InseminatinTechnique->PlaceHolder = RemoveHtml($this->InseminatinTechnique->caption());

        // IndicationForART
        $this->IndicationForART->EditAttrs["class"] = "form-control";
        $this->IndicationForART->EditCustomAttributes = "";
        if (!$this->IndicationForART->Raw) {
            $this->IndicationForART->CurrentValue = HtmlDecode($this->IndicationForART->CurrentValue);
        }
        $this->IndicationForART->EditValue = $this->IndicationForART->CurrentValue;
        $this->IndicationForART->PlaceHolder = RemoveHtml($this->IndicationForART->caption());

        // PreTreatment
        $this->PreTreatment->EditAttrs["class"] = "form-control";
        $this->PreTreatment->EditCustomAttributes = "";
        if (!$this->PreTreatment->Raw) {
            $this->PreTreatment->CurrentValue = HtmlDecode($this->PreTreatment->CurrentValue);
        }
        $this->PreTreatment->EditValue = $this->PreTreatment->CurrentValue;
        $this->PreTreatment->PlaceHolder = RemoveHtml($this->PreTreatment->caption());

        // Hysteroscopy
        $this->Hysteroscopy->EditAttrs["class"] = "form-control";
        $this->Hysteroscopy->EditCustomAttributes = "";
        if (!$this->Hysteroscopy->Raw) {
            $this->Hysteroscopy->CurrentValue = HtmlDecode($this->Hysteroscopy->CurrentValue);
        }
        $this->Hysteroscopy->EditValue = $this->Hysteroscopy->CurrentValue;
        $this->Hysteroscopy->PlaceHolder = RemoveHtml($this->Hysteroscopy->caption());

        // EndometrialScratching
        $this->EndometrialScratching->EditAttrs["class"] = "form-control";
        $this->EndometrialScratching->EditCustomAttributes = "";
        if (!$this->EndometrialScratching->Raw) {
            $this->EndometrialScratching->CurrentValue = HtmlDecode($this->EndometrialScratching->CurrentValue);
        }
        $this->EndometrialScratching->EditValue = $this->EndometrialScratching->CurrentValue;
        $this->EndometrialScratching->PlaceHolder = RemoveHtml($this->EndometrialScratching->caption());

        // TrialCannulation
        $this->TrialCannulation->EditAttrs["class"] = "form-control";
        $this->TrialCannulation->EditCustomAttributes = "";
        if (!$this->TrialCannulation->Raw) {
            $this->TrialCannulation->CurrentValue = HtmlDecode($this->TrialCannulation->CurrentValue);
        }
        $this->TrialCannulation->EditValue = $this->TrialCannulation->CurrentValue;
        $this->TrialCannulation->PlaceHolder = RemoveHtml($this->TrialCannulation->caption());

        // CYCLETYPE
        $this->CYCLETYPE->EditAttrs["class"] = "form-control";
        $this->CYCLETYPE->EditCustomAttributes = "";
        if (!$this->CYCLETYPE->Raw) {
            $this->CYCLETYPE->CurrentValue = HtmlDecode($this->CYCLETYPE->CurrentValue);
        }
        $this->CYCLETYPE->EditValue = $this->CYCLETYPE->CurrentValue;
        $this->CYCLETYPE->PlaceHolder = RemoveHtml($this->CYCLETYPE->caption());

        // HRTCYCLE
        $this->HRTCYCLE->EditAttrs["class"] = "form-control";
        $this->HRTCYCLE->EditCustomAttributes = "";
        if (!$this->HRTCYCLE->Raw) {
            $this->HRTCYCLE->CurrentValue = HtmlDecode($this->HRTCYCLE->CurrentValue);
        }
        $this->HRTCYCLE->EditValue = $this->HRTCYCLE->CurrentValue;
        $this->HRTCYCLE->PlaceHolder = RemoveHtml($this->HRTCYCLE->caption());

        // OralEstrogenDosage
        $this->OralEstrogenDosage->EditAttrs["class"] = "form-control";
        $this->OralEstrogenDosage->EditCustomAttributes = "";
        if (!$this->OralEstrogenDosage->Raw) {
            $this->OralEstrogenDosage->CurrentValue = HtmlDecode($this->OralEstrogenDosage->CurrentValue);
        }
        $this->OralEstrogenDosage->EditValue = $this->OralEstrogenDosage->CurrentValue;
        $this->OralEstrogenDosage->PlaceHolder = RemoveHtml($this->OralEstrogenDosage->caption());

        // VaginalEstrogen
        $this->VaginalEstrogen->EditAttrs["class"] = "form-control";
        $this->VaginalEstrogen->EditCustomAttributes = "";
        if (!$this->VaginalEstrogen->Raw) {
            $this->VaginalEstrogen->CurrentValue = HtmlDecode($this->VaginalEstrogen->CurrentValue);
        }
        $this->VaginalEstrogen->EditValue = $this->VaginalEstrogen->CurrentValue;
        $this->VaginalEstrogen->PlaceHolder = RemoveHtml($this->VaginalEstrogen->caption());

        // GCSF
        $this->GCSF->EditAttrs["class"] = "form-control";
        $this->GCSF->EditCustomAttributes = "";
        if (!$this->GCSF->Raw) {
            $this->GCSF->CurrentValue = HtmlDecode($this->GCSF->CurrentValue);
        }
        $this->GCSF->EditValue = $this->GCSF->CurrentValue;
        $this->GCSF->PlaceHolder = RemoveHtml($this->GCSF->caption());

        // ActivatedPRP
        $this->ActivatedPRP->EditAttrs["class"] = "form-control";
        $this->ActivatedPRP->EditCustomAttributes = "";
        if (!$this->ActivatedPRP->Raw) {
            $this->ActivatedPRP->CurrentValue = HtmlDecode($this->ActivatedPRP->CurrentValue);
        }
        $this->ActivatedPRP->EditValue = $this->ActivatedPRP->CurrentValue;
        $this->ActivatedPRP->PlaceHolder = RemoveHtml($this->ActivatedPRP->caption());

        // ERA
        $this->ERA->EditAttrs["class"] = "form-control";
        $this->ERA->EditCustomAttributes = "";
        if (!$this->ERA->Raw) {
            $this->ERA->CurrentValue = HtmlDecode($this->ERA->CurrentValue);
        }
        $this->ERA->EditValue = $this->ERA->CurrentValue;
        $this->ERA->PlaceHolder = RemoveHtml($this->ERA->caption());

        // UCLcm
        $this->UCLcm->EditAttrs["class"] = "form-control";
        $this->UCLcm->EditCustomAttributes = "";
        if (!$this->UCLcm->Raw) {
            $this->UCLcm->CurrentValue = HtmlDecode($this->UCLcm->CurrentValue);
        }
        $this->UCLcm->EditValue = $this->UCLcm->CurrentValue;
        $this->UCLcm->PlaceHolder = RemoveHtml($this->UCLcm->caption());

        // DATEOFSTART
        $this->DATEOFSTART->EditAttrs["class"] = "form-control";
        $this->DATEOFSTART->EditCustomAttributes = "";
        $this->DATEOFSTART->EditValue = FormatDateTime($this->DATEOFSTART->CurrentValue, 8);
        $this->DATEOFSTART->PlaceHolder = RemoveHtml($this->DATEOFSTART->caption());

        // DATEOFEMBRYOTRANSFER
        $this->DATEOFEMBRYOTRANSFER->EditAttrs["class"] = "form-control";
        $this->DATEOFEMBRYOTRANSFER->EditCustomAttributes = "";
        $this->DATEOFEMBRYOTRANSFER->EditValue = FormatDateTime($this->DATEOFEMBRYOTRANSFER->CurrentValue, 8);
        $this->DATEOFEMBRYOTRANSFER->PlaceHolder = RemoveHtml($this->DATEOFEMBRYOTRANSFER->caption());

        // DAYOFEMBRYOTRANSFER
        $this->DAYOFEMBRYOTRANSFER->EditAttrs["class"] = "form-control";
        $this->DAYOFEMBRYOTRANSFER->EditCustomAttributes = "";
        if (!$this->DAYOFEMBRYOTRANSFER->Raw) {
            $this->DAYOFEMBRYOTRANSFER->CurrentValue = HtmlDecode($this->DAYOFEMBRYOTRANSFER->CurrentValue);
        }
        $this->DAYOFEMBRYOTRANSFER->EditValue = $this->DAYOFEMBRYOTRANSFER->CurrentValue;
        $this->DAYOFEMBRYOTRANSFER->PlaceHolder = RemoveHtml($this->DAYOFEMBRYOTRANSFER->caption());

        // NOOFEMBRYOSTHAWED
        $this->NOOFEMBRYOSTHAWED->EditAttrs["class"] = "form-control";
        $this->NOOFEMBRYOSTHAWED->EditCustomAttributes = "";
        if (!$this->NOOFEMBRYOSTHAWED->Raw) {
            $this->NOOFEMBRYOSTHAWED->CurrentValue = HtmlDecode($this->NOOFEMBRYOSTHAWED->CurrentValue);
        }
        $this->NOOFEMBRYOSTHAWED->EditValue = $this->NOOFEMBRYOSTHAWED->CurrentValue;
        $this->NOOFEMBRYOSTHAWED->PlaceHolder = RemoveHtml($this->NOOFEMBRYOSTHAWED->caption());

        // NOOFEMBRYOSTRANSFERRED
        $this->NOOFEMBRYOSTRANSFERRED->EditAttrs["class"] = "form-control";
        $this->NOOFEMBRYOSTRANSFERRED->EditCustomAttributes = "";
        if (!$this->NOOFEMBRYOSTRANSFERRED->Raw) {
            $this->NOOFEMBRYOSTRANSFERRED->CurrentValue = HtmlDecode($this->NOOFEMBRYOSTRANSFERRED->CurrentValue);
        }
        $this->NOOFEMBRYOSTRANSFERRED->EditValue = $this->NOOFEMBRYOSTRANSFERRED->CurrentValue;
        $this->NOOFEMBRYOSTRANSFERRED->PlaceHolder = RemoveHtml($this->NOOFEMBRYOSTRANSFERRED->caption());

        // DAYOFEMBRYOS
        $this->DAYOFEMBRYOS->EditAttrs["class"] = "form-control";
        $this->DAYOFEMBRYOS->EditCustomAttributes = "";
        if (!$this->DAYOFEMBRYOS->Raw) {
            $this->DAYOFEMBRYOS->CurrentValue = HtmlDecode($this->DAYOFEMBRYOS->CurrentValue);
        }
        $this->DAYOFEMBRYOS->EditValue = $this->DAYOFEMBRYOS->CurrentValue;
        $this->DAYOFEMBRYOS->PlaceHolder = RemoveHtml($this->DAYOFEMBRYOS->caption());

        // CRYOPRESERVEDEMBRYOS
        $this->CRYOPRESERVEDEMBRYOS->EditAttrs["class"] = "form-control";
        $this->CRYOPRESERVEDEMBRYOS->EditCustomAttributes = "";
        if (!$this->CRYOPRESERVEDEMBRYOS->Raw) {
            $this->CRYOPRESERVEDEMBRYOS->CurrentValue = HtmlDecode($this->CRYOPRESERVEDEMBRYOS->CurrentValue);
        }
        $this->CRYOPRESERVEDEMBRYOS->EditValue = $this->CRYOPRESERVEDEMBRYOS->CurrentValue;
        $this->CRYOPRESERVEDEMBRYOS->PlaceHolder = RemoveHtml($this->CRYOPRESERVEDEMBRYOS->caption());

        // Code1
        $this->Code1->EditAttrs["class"] = "form-control";
        $this->Code1->EditCustomAttributes = "";
        if (!$this->Code1->Raw) {
            $this->Code1->CurrentValue = HtmlDecode($this->Code1->CurrentValue);
        }
        $this->Code1->EditValue = $this->Code1->CurrentValue;
        $this->Code1->PlaceHolder = RemoveHtml($this->Code1->caption());

        // Code2
        $this->Code2->EditAttrs["class"] = "form-control";
        $this->Code2->EditCustomAttributes = "";
        if (!$this->Code2->Raw) {
            $this->Code2->CurrentValue = HtmlDecode($this->Code2->CurrentValue);
        }
        $this->Code2->EditValue = $this->Code2->CurrentValue;
        $this->Code2->PlaceHolder = RemoveHtml($this->Code2->caption());

        // CellStage1
        $this->CellStage1->EditAttrs["class"] = "form-control";
        $this->CellStage1->EditCustomAttributes = "";
        if (!$this->CellStage1->Raw) {
            $this->CellStage1->CurrentValue = HtmlDecode($this->CellStage1->CurrentValue);
        }
        $this->CellStage1->EditValue = $this->CellStage1->CurrentValue;
        $this->CellStage1->PlaceHolder = RemoveHtml($this->CellStage1->caption());

        // CellStage2
        $this->CellStage2->EditAttrs["class"] = "form-control";
        $this->CellStage2->EditCustomAttributes = "";
        if (!$this->CellStage2->Raw) {
            $this->CellStage2->CurrentValue = HtmlDecode($this->CellStage2->CurrentValue);
        }
        $this->CellStage2->EditValue = $this->CellStage2->CurrentValue;
        $this->CellStage2->PlaceHolder = RemoveHtml($this->CellStage2->caption());

        // Grade1
        $this->Grade1->EditAttrs["class"] = "form-control";
        $this->Grade1->EditCustomAttributes = "";
        if (!$this->Grade1->Raw) {
            $this->Grade1->CurrentValue = HtmlDecode($this->Grade1->CurrentValue);
        }
        $this->Grade1->EditValue = $this->Grade1->CurrentValue;
        $this->Grade1->PlaceHolder = RemoveHtml($this->Grade1->caption());

        // Grade2
        $this->Grade2->EditAttrs["class"] = "form-control";
        $this->Grade2->EditCustomAttributes = "";
        if (!$this->Grade2->Raw) {
            $this->Grade2->CurrentValue = HtmlDecode($this->Grade2->CurrentValue);
        }
        $this->Grade2->EditValue = $this->Grade2->CurrentValue;
        $this->Grade2->PlaceHolder = RemoveHtml($this->Grade2->caption());

        // ProcedureRecord
        $this->ProcedureRecord->EditAttrs["class"] = "form-control";
        $this->ProcedureRecord->EditCustomAttributes = "";
        $this->ProcedureRecord->EditValue = $this->ProcedureRecord->CurrentValue;
        $this->ProcedureRecord->PlaceHolder = RemoveHtml($this->ProcedureRecord->caption());

        // Medicationsadvised
        $this->Medicationsadvised->EditAttrs["class"] = "form-control";
        $this->Medicationsadvised->EditCustomAttributes = "";
        $this->Medicationsadvised->EditValue = $this->Medicationsadvised->CurrentValue;
        $this->Medicationsadvised->PlaceHolder = RemoveHtml($this->Medicationsadvised->caption());

        // PostProcedureInstructions
        $this->PostProcedureInstructions->EditAttrs["class"] = "form-control";
        $this->PostProcedureInstructions->EditCustomAttributes = "";
        $this->PostProcedureInstructions->EditValue = $this->PostProcedureInstructions->CurrentValue;
        $this->PostProcedureInstructions->PlaceHolder = RemoveHtml($this->PostProcedureInstructions->caption());

        // PregnancyTestingWithSerumBetaHcG
        $this->PregnancyTestingWithSerumBetaHcG->EditAttrs["class"] = "form-control";
        $this->PregnancyTestingWithSerumBetaHcG->EditCustomAttributes = "";
        if (!$this->PregnancyTestingWithSerumBetaHcG->Raw) {
            $this->PregnancyTestingWithSerumBetaHcG->CurrentValue = HtmlDecode($this->PregnancyTestingWithSerumBetaHcG->CurrentValue);
        }
        $this->PregnancyTestingWithSerumBetaHcG->EditValue = $this->PregnancyTestingWithSerumBetaHcG->CurrentValue;
        $this->PregnancyTestingWithSerumBetaHcG->PlaceHolder = RemoveHtml($this->PregnancyTestingWithSerumBetaHcG->caption());

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
                    $doc->exportCaption($this->InseminatinTechnique);
                    $doc->exportCaption($this->IndicationForART);
                    $doc->exportCaption($this->PreTreatment);
                    $doc->exportCaption($this->Hysteroscopy);
                    $doc->exportCaption($this->EndometrialScratching);
                    $doc->exportCaption($this->TrialCannulation);
                    $doc->exportCaption($this->CYCLETYPE);
                    $doc->exportCaption($this->HRTCYCLE);
                    $doc->exportCaption($this->OralEstrogenDosage);
                    $doc->exportCaption($this->VaginalEstrogen);
                    $doc->exportCaption($this->GCSF);
                    $doc->exportCaption($this->ActivatedPRP);
                    $doc->exportCaption($this->ERA);
                    $doc->exportCaption($this->UCLcm);
                    $doc->exportCaption($this->DATEOFSTART);
                    $doc->exportCaption($this->DATEOFEMBRYOTRANSFER);
                    $doc->exportCaption($this->DAYOFEMBRYOTRANSFER);
                    $doc->exportCaption($this->NOOFEMBRYOSTHAWED);
                    $doc->exportCaption($this->NOOFEMBRYOSTRANSFERRED);
                    $doc->exportCaption($this->DAYOFEMBRYOS);
                    $doc->exportCaption($this->CRYOPRESERVEDEMBRYOS);
                    $doc->exportCaption($this->Code1);
                    $doc->exportCaption($this->Code2);
                    $doc->exportCaption($this->CellStage1);
                    $doc->exportCaption($this->CellStage2);
                    $doc->exportCaption($this->Grade1);
                    $doc->exportCaption($this->Grade2);
                    $doc->exportCaption($this->ProcedureRecord);
                    $doc->exportCaption($this->Medicationsadvised);
                    $doc->exportCaption($this->PostProcedureInstructions);
                    $doc->exportCaption($this->PregnancyTestingWithSerumBetaHcG);
                    $doc->exportCaption($this->ReviewDate);
                    $doc->exportCaption($this->ReviewDoctor);
                    $doc->exportCaption($this->TidNo);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->RIDNo);
                    $doc->exportCaption($this->Name);
                    $doc->exportCaption($this->ARTCycle);
                    $doc->exportCaption($this->Consultant);
                    $doc->exportCaption($this->InseminatinTechnique);
                    $doc->exportCaption($this->IndicationForART);
                    $doc->exportCaption($this->PreTreatment);
                    $doc->exportCaption($this->Hysteroscopy);
                    $doc->exportCaption($this->EndometrialScratching);
                    $doc->exportCaption($this->TrialCannulation);
                    $doc->exportCaption($this->CYCLETYPE);
                    $doc->exportCaption($this->HRTCYCLE);
                    $doc->exportCaption($this->OralEstrogenDosage);
                    $doc->exportCaption($this->VaginalEstrogen);
                    $doc->exportCaption($this->GCSF);
                    $doc->exportCaption($this->ActivatedPRP);
                    $doc->exportCaption($this->ERA);
                    $doc->exportCaption($this->UCLcm);
                    $doc->exportCaption($this->DATEOFSTART);
                    $doc->exportCaption($this->DATEOFEMBRYOTRANSFER);
                    $doc->exportCaption($this->DAYOFEMBRYOTRANSFER);
                    $doc->exportCaption($this->NOOFEMBRYOSTHAWED);
                    $doc->exportCaption($this->NOOFEMBRYOSTRANSFERRED);
                    $doc->exportCaption($this->DAYOFEMBRYOS);
                    $doc->exportCaption($this->CRYOPRESERVEDEMBRYOS);
                    $doc->exportCaption($this->Code1);
                    $doc->exportCaption($this->Code2);
                    $doc->exportCaption($this->CellStage1);
                    $doc->exportCaption($this->CellStage2);
                    $doc->exportCaption($this->Grade1);
                    $doc->exportCaption($this->Grade2);
                    $doc->exportCaption($this->PregnancyTestingWithSerumBetaHcG);
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
                        $doc->exportField($this->InseminatinTechnique);
                        $doc->exportField($this->IndicationForART);
                        $doc->exportField($this->PreTreatment);
                        $doc->exportField($this->Hysteroscopy);
                        $doc->exportField($this->EndometrialScratching);
                        $doc->exportField($this->TrialCannulation);
                        $doc->exportField($this->CYCLETYPE);
                        $doc->exportField($this->HRTCYCLE);
                        $doc->exportField($this->OralEstrogenDosage);
                        $doc->exportField($this->VaginalEstrogen);
                        $doc->exportField($this->GCSF);
                        $doc->exportField($this->ActivatedPRP);
                        $doc->exportField($this->ERA);
                        $doc->exportField($this->UCLcm);
                        $doc->exportField($this->DATEOFSTART);
                        $doc->exportField($this->DATEOFEMBRYOTRANSFER);
                        $doc->exportField($this->DAYOFEMBRYOTRANSFER);
                        $doc->exportField($this->NOOFEMBRYOSTHAWED);
                        $doc->exportField($this->NOOFEMBRYOSTRANSFERRED);
                        $doc->exportField($this->DAYOFEMBRYOS);
                        $doc->exportField($this->CRYOPRESERVEDEMBRYOS);
                        $doc->exportField($this->Code1);
                        $doc->exportField($this->Code2);
                        $doc->exportField($this->CellStage1);
                        $doc->exportField($this->CellStage2);
                        $doc->exportField($this->Grade1);
                        $doc->exportField($this->Grade2);
                        $doc->exportField($this->ProcedureRecord);
                        $doc->exportField($this->Medicationsadvised);
                        $doc->exportField($this->PostProcedureInstructions);
                        $doc->exportField($this->PregnancyTestingWithSerumBetaHcG);
                        $doc->exportField($this->ReviewDate);
                        $doc->exportField($this->ReviewDoctor);
                        $doc->exportField($this->TidNo);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->RIDNo);
                        $doc->exportField($this->Name);
                        $doc->exportField($this->ARTCycle);
                        $doc->exportField($this->Consultant);
                        $doc->exportField($this->InseminatinTechnique);
                        $doc->exportField($this->IndicationForART);
                        $doc->exportField($this->PreTreatment);
                        $doc->exportField($this->Hysteroscopy);
                        $doc->exportField($this->EndometrialScratching);
                        $doc->exportField($this->TrialCannulation);
                        $doc->exportField($this->CYCLETYPE);
                        $doc->exportField($this->HRTCYCLE);
                        $doc->exportField($this->OralEstrogenDosage);
                        $doc->exportField($this->VaginalEstrogen);
                        $doc->exportField($this->GCSF);
                        $doc->exportField($this->ActivatedPRP);
                        $doc->exportField($this->ERA);
                        $doc->exportField($this->UCLcm);
                        $doc->exportField($this->DATEOFSTART);
                        $doc->exportField($this->DATEOFEMBRYOTRANSFER);
                        $doc->exportField($this->DAYOFEMBRYOTRANSFER);
                        $doc->exportField($this->NOOFEMBRYOSTHAWED);
                        $doc->exportField($this->NOOFEMBRYOSTRANSFERRED);
                        $doc->exportField($this->DAYOFEMBRYOS);
                        $doc->exportField($this->CRYOPRESERVEDEMBRYOS);
                        $doc->exportField($this->Code1);
                        $doc->exportField($this->Code2);
                        $doc->exportField($this->CellStage1);
                        $doc->exportField($this->CellStage2);
                        $doc->exportField($this->Grade1);
                        $doc->exportField($this->Grade2);
                        $doc->exportField($this->PregnancyTestingWithSerumBetaHcG);
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
