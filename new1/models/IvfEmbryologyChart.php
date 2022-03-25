<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for ivf_embryology_chart
 */
class IvfEmbryologyChart extends DbTable
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
    public $SpermOrigin;
    public $InseminatinTechnique;
    public $IndicationForART;
    public $Day0OocyteStage;
    public $Day0PolarBodyPosition;
    public $Day0Breakage;
    public $Day1PN;
    public $Day1PB;
    public $Day1Pronucleus;
    public $Day1Nucleolus;
    public $Day1Halo;
    public $Day1Sperm;
    public $Day2CellNo;
    public $Day2Frag;
    public $Day2Symmetry;
    public $Day2Cryoptop;
    public $Day3CellNo;
    public $Day3Frag;
    public $Day3Symmetry;
    public $Day3Grade;
    public $Day3Vacoules;
    public $Day3ZP;
    public $Day3Cryoptop;
    public $Day4CellNo;
    public $Day4Frag;
    public $Day4Symmetry;
    public $Day4Grade;
    public $Day4Cryoptop;
    public $Day5CellNo;
    public $Day5ICM;
    public $Day5TE;
    public $Day5Observation;
    public $Day5Collapsed;
    public $Day5Vacoulles;
    public $Day5Grade;
    public $Day5Cryoptop;
    public $Day6CellNo;
    public $Day6ICM;
    public $Day6TE;
    public $Day6Observation;
    public $Day6Collapsed;
    public $Day6Vacoulles;
    public $Day6Grade;
    public $Day6Cryoptop;
    public $EndingDay;
    public $EndingCellStage;
    public $EndingGrade;
    public $EndingState;
    public $Day0sino;
    public $Day0Attempts;
    public $Day0SPZMorpho;
    public $Day0SPZLocation;
    public $Day2Grade;
    public $Day3Sino;
    public $Day3End;
    public $Day4SiNo;
    public $TidNo;
    public $Day0SpOrgin;
    public $DidNO;
    public $ICSiIVFDateTime;
    public $PrimaryEmbrologist;
    public $SecondaryEmbrologist;
    public $Incubator;
    public $location;
    public $Remarks;
    public $OocyteNo;
    public $Stage;
    public $vitrificationDate;
    public $vitriPrimaryEmbryologist;
    public $vitriSecondaryEmbryologist;
    public $vitriEmbryoNo;
    public $vitriFertilisationDate;
    public $vitriDay;
    public $vitriGrade;
    public $vitriIncubator;
    public $vitriTank;
    public $vitriCanister;
    public $vitriGobiet;
    public $vitriViscotube;
    public $vitriCryolockNo;
    public $vitriCryolockColour;
    public $vitriStage;
    public $thawDate;
    public $thawPrimaryEmbryologist;
    public $thawSecondaryEmbryologist;
    public $thawET;
    public $thawReFrozen;
    public $thawAbserve;
    public $thawDiscard;
    public $ETCatheter;
    public $ETDifficulty;
    public $ETEasy;
    public $ETComments;
    public $ETDoctor;
    public $ETEmbryologist;
    public $Day2End;
    public $Day2SiNo;
    public $EndSiNo;
    public $Day4End;
    public $ETDate;
    public $Day1End;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'ivf_embryology_chart';
        $this->TableName = 'ivf_embryology_chart';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`ivf_embryology_chart`";
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
        $this->id = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['id'] = &$this->id;

        // RIDNo
        $this->RIDNo = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_RIDNo', 'RIDNo', '`RIDNo`', '`RIDNo`', 3, 11, -1, false, '`RIDNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RIDNo->Nullable = false; // NOT NULL field
        $this->RIDNo->Required = true; // Required field
        $this->RIDNo->Sortable = true; // Allow sort
        $this->RIDNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['RIDNo'] = &$this->RIDNo;

        // Name
        $this->Name = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Name', 'Name', '`Name`', '`Name`', 200, 45, -1, false, '`Name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Name->Sortable = true; // Allow sort
        $this->Fields['Name'] = &$this->Name;

        // ARTCycle
        $this->ARTCycle = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_ARTCycle', 'ARTCycle', '`ARTCycle`', '`ARTCycle`', 200, 45, -1, false, '`ARTCycle`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ARTCycle->Sortable = true; // Allow sort
        $this->Fields['ARTCycle'] = &$this->ARTCycle;

        // SpermOrigin
        $this->SpermOrigin = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_SpermOrigin', 'SpermOrigin', '`SpermOrigin`', '`SpermOrigin`', 200, 45, -1, false, '`SpermOrigin`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SpermOrigin->Sortable = true; // Allow sort
        $this->Fields['SpermOrigin'] = &$this->SpermOrigin;

        // InseminatinTechnique
        $this->InseminatinTechnique = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_InseminatinTechnique', 'InseminatinTechnique', '`InseminatinTechnique`', '`InseminatinTechnique`', 200, 45, -1, false, '`InseminatinTechnique`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->InseminatinTechnique->Sortable = true; // Allow sort
        $this->Fields['InseminatinTechnique'] = &$this->InseminatinTechnique;

        // IndicationForART
        $this->IndicationForART = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_IndicationForART', 'IndicationForART', '`IndicationForART`', '`IndicationForART`', 200, 45, -1, false, '`IndicationForART`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IndicationForART->Sortable = true; // Allow sort
        $this->Fields['IndicationForART'] = &$this->IndicationForART;

        // Day0OocyteStage
        $this->Day0OocyteStage = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day0OocyteStage', 'Day0OocyteStage', '`Day0OocyteStage`', '`Day0OocyteStage`', 200, 45, -1, false, '`Day0OocyteStage`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day0OocyteStage->Sortable = true; // Allow sort
        $this->Fields['Day0OocyteStage'] = &$this->Day0OocyteStage;

        // Day0PolarBodyPosition
        $this->Day0PolarBodyPosition = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day0PolarBodyPosition', 'Day0PolarBodyPosition', '`Day0PolarBodyPosition`', '`Day0PolarBodyPosition`', 200, 45, -1, false, '`Day0PolarBodyPosition`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day0PolarBodyPosition->Sortable = true; // Allow sort
        $this->Fields['Day0PolarBodyPosition'] = &$this->Day0PolarBodyPosition;

        // Day0Breakage
        $this->Day0Breakage = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day0Breakage', 'Day0Breakage', '`Day0Breakage`', '`Day0Breakage`', 200, 45, -1, false, '`Day0Breakage`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day0Breakage->Sortable = true; // Allow sort
        $this->Fields['Day0Breakage'] = &$this->Day0Breakage;

        // Day1PN
        $this->Day1PN = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day1PN', 'Day1PN', '`Day1PN`', '`Day1PN`', 200, 45, -1, false, '`Day1PN`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day1PN->Sortable = true; // Allow sort
        $this->Fields['Day1PN'] = &$this->Day1PN;

        // Day1PB
        $this->Day1PB = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day1PB', 'Day1PB', '`Day1PB`', '`Day1PB`', 200, 45, -1, false, '`Day1PB`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day1PB->Sortable = true; // Allow sort
        $this->Fields['Day1PB'] = &$this->Day1PB;

        // Day1Pronucleus
        $this->Day1Pronucleus = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day1Pronucleus', 'Day1Pronucleus', '`Day1Pronucleus`', '`Day1Pronucleus`', 200, 45, -1, false, '`Day1Pronucleus`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day1Pronucleus->Sortable = true; // Allow sort
        $this->Fields['Day1Pronucleus'] = &$this->Day1Pronucleus;

        // Day1Nucleolus
        $this->Day1Nucleolus = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day1Nucleolus', 'Day1Nucleolus', '`Day1Nucleolus`', '`Day1Nucleolus`', 200, 45, -1, false, '`Day1Nucleolus`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day1Nucleolus->Sortable = true; // Allow sort
        $this->Fields['Day1Nucleolus'] = &$this->Day1Nucleolus;

        // Day1Halo
        $this->Day1Halo = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day1Halo', 'Day1Halo', '`Day1Halo`', '`Day1Halo`', 200, 45, -1, false, '`Day1Halo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day1Halo->Sortable = true; // Allow sort
        $this->Fields['Day1Halo'] = &$this->Day1Halo;

        // Day1Sperm
        $this->Day1Sperm = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day1Sperm', 'Day1Sperm', '`Day1Sperm`', '`Day1Sperm`', 200, 45, -1, false, '`Day1Sperm`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day1Sperm->Sortable = true; // Allow sort
        $this->Fields['Day1Sperm'] = &$this->Day1Sperm;

        // Day2CellNo
        $this->Day2CellNo = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day2CellNo', 'Day2CellNo', '`Day2CellNo`', '`Day2CellNo`', 200, 45, -1, false, '`Day2CellNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day2CellNo->Sortable = true; // Allow sort
        $this->Fields['Day2CellNo'] = &$this->Day2CellNo;

        // Day2Frag
        $this->Day2Frag = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day2Frag', 'Day2Frag', '`Day2Frag`', '`Day2Frag`', 200, 45, -1, false, '`Day2Frag`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day2Frag->Sortable = true; // Allow sort
        $this->Fields['Day2Frag'] = &$this->Day2Frag;

        // Day2Symmetry
        $this->Day2Symmetry = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day2Symmetry', 'Day2Symmetry', '`Day2Symmetry`', '`Day2Symmetry`', 200, 45, -1, false, '`Day2Symmetry`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day2Symmetry->Sortable = true; // Allow sort
        $this->Fields['Day2Symmetry'] = &$this->Day2Symmetry;

        // Day2Cryoptop
        $this->Day2Cryoptop = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day2Cryoptop', 'Day2Cryoptop', '`Day2Cryoptop`', '`Day2Cryoptop`', 200, 45, -1, false, '`Day2Cryoptop`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day2Cryoptop->Sortable = true; // Allow sort
        $this->Fields['Day2Cryoptop'] = &$this->Day2Cryoptop;

        // Day3CellNo
        $this->Day3CellNo = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day3CellNo', 'Day3CellNo', '`Day3CellNo`', '`Day3CellNo`', 200, 45, -1, false, '`Day3CellNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day3CellNo->Sortable = true; // Allow sort
        $this->Fields['Day3CellNo'] = &$this->Day3CellNo;

        // Day3Frag
        $this->Day3Frag = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day3Frag', 'Day3Frag', '`Day3Frag`', '`Day3Frag`', 200, 45, -1, false, '`Day3Frag`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day3Frag->Sortable = true; // Allow sort
        $this->Fields['Day3Frag'] = &$this->Day3Frag;

        // Day3Symmetry
        $this->Day3Symmetry = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day3Symmetry', 'Day3Symmetry', '`Day3Symmetry`', '`Day3Symmetry`', 200, 45, -1, false, '`Day3Symmetry`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day3Symmetry->Sortable = true; // Allow sort
        $this->Fields['Day3Symmetry'] = &$this->Day3Symmetry;

        // Day3Grade
        $this->Day3Grade = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day3Grade', 'Day3Grade', '`Day3Grade`', '`Day3Grade`', 200, 45, -1, false, '`Day3Grade`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day3Grade->Sortable = true; // Allow sort
        $this->Fields['Day3Grade'] = &$this->Day3Grade;

        // Day3Vacoules
        $this->Day3Vacoules = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day3Vacoules', 'Day3Vacoules', '`Day3Vacoules`', '`Day3Vacoules`', 200, 45, -1, false, '`Day3Vacoules`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day3Vacoules->Sortable = true; // Allow sort
        $this->Fields['Day3Vacoules'] = &$this->Day3Vacoules;

        // Day3ZP
        $this->Day3ZP = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day3ZP', 'Day3ZP', '`Day3ZP`', '`Day3ZP`', 200, 45, -1, false, '`Day3ZP`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day3ZP->Sortable = true; // Allow sort
        $this->Fields['Day3ZP'] = &$this->Day3ZP;

        // Day3Cryoptop
        $this->Day3Cryoptop = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day3Cryoptop', 'Day3Cryoptop', '`Day3Cryoptop`', '`Day3Cryoptop`', 200, 45, -1, false, '`Day3Cryoptop`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day3Cryoptop->Sortable = true; // Allow sort
        $this->Fields['Day3Cryoptop'] = &$this->Day3Cryoptop;

        // Day4CellNo
        $this->Day4CellNo = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day4CellNo', 'Day4CellNo', '`Day4CellNo`', '`Day4CellNo`', 200, 45, -1, false, '`Day4CellNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day4CellNo->Sortable = true; // Allow sort
        $this->Fields['Day4CellNo'] = &$this->Day4CellNo;

        // Day4Frag
        $this->Day4Frag = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day4Frag', 'Day4Frag', '`Day4Frag`', '`Day4Frag`', 200, 45, -1, false, '`Day4Frag`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day4Frag->Sortable = true; // Allow sort
        $this->Fields['Day4Frag'] = &$this->Day4Frag;

        // Day4Symmetry
        $this->Day4Symmetry = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day4Symmetry', 'Day4Symmetry', '`Day4Symmetry`', '`Day4Symmetry`', 200, 45, -1, false, '`Day4Symmetry`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day4Symmetry->Sortable = true; // Allow sort
        $this->Fields['Day4Symmetry'] = &$this->Day4Symmetry;

        // Day4Grade
        $this->Day4Grade = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day4Grade', 'Day4Grade', '`Day4Grade`', '`Day4Grade`', 200, 45, -1, false, '`Day4Grade`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day4Grade->Sortable = true; // Allow sort
        $this->Fields['Day4Grade'] = &$this->Day4Grade;

        // Day4Cryoptop
        $this->Day4Cryoptop = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day4Cryoptop', 'Day4Cryoptop', '`Day4Cryoptop`', '`Day4Cryoptop`', 200, 45, -1, false, '`Day4Cryoptop`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day4Cryoptop->Sortable = true; // Allow sort
        $this->Fields['Day4Cryoptop'] = &$this->Day4Cryoptop;

        // Day5CellNo
        $this->Day5CellNo = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day5CellNo', 'Day5CellNo', '`Day5CellNo`', '`Day5CellNo`', 200, 45, -1, false, '`Day5CellNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day5CellNo->Sortable = true; // Allow sort
        $this->Fields['Day5CellNo'] = &$this->Day5CellNo;

        // Day5ICM
        $this->Day5ICM = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day5ICM', 'Day5ICM', '`Day5ICM`', '`Day5ICM`', 200, 45, -1, false, '`Day5ICM`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day5ICM->Sortable = true; // Allow sort
        $this->Fields['Day5ICM'] = &$this->Day5ICM;

        // Day5TE
        $this->Day5TE = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day5TE', 'Day5TE', '`Day5TE`', '`Day5TE`', 200, 45, -1, false, '`Day5TE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day5TE->Sortable = true; // Allow sort
        $this->Fields['Day5TE'] = &$this->Day5TE;

        // Day5Observation
        $this->Day5Observation = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day5Observation', 'Day5Observation', '`Day5Observation`', '`Day5Observation`', 200, 45, -1, false, '`Day5Observation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day5Observation->Sortable = true; // Allow sort
        $this->Fields['Day5Observation'] = &$this->Day5Observation;

        // Day5Collapsed
        $this->Day5Collapsed = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day5Collapsed', 'Day5Collapsed', '`Day5Collapsed`', '`Day5Collapsed`', 200, 45, -1, false, '`Day5Collapsed`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day5Collapsed->Sortable = true; // Allow sort
        $this->Fields['Day5Collapsed'] = &$this->Day5Collapsed;

        // Day5Vacoulles
        $this->Day5Vacoulles = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day5Vacoulles', 'Day5Vacoulles', '`Day5Vacoulles`', '`Day5Vacoulles`', 200, 45, -1, false, '`Day5Vacoulles`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day5Vacoulles->Sortable = true; // Allow sort
        $this->Fields['Day5Vacoulles'] = &$this->Day5Vacoulles;

        // Day5Grade
        $this->Day5Grade = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day5Grade', 'Day5Grade', '`Day5Grade`', '`Day5Grade`', 200, 45, -1, false, '`Day5Grade`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day5Grade->Sortable = true; // Allow sort
        $this->Fields['Day5Grade'] = &$this->Day5Grade;

        // Day5Cryoptop
        $this->Day5Cryoptop = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day5Cryoptop', 'Day5Cryoptop', '`Day5Cryoptop`', '`Day5Cryoptop`', 200, 45, -1, false, '`Day5Cryoptop`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day5Cryoptop->Sortable = true; // Allow sort
        $this->Fields['Day5Cryoptop'] = &$this->Day5Cryoptop;

        // Day6CellNo
        $this->Day6CellNo = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day6CellNo', 'Day6CellNo', '`Day6CellNo`', '`Day6CellNo`', 200, 45, -1, false, '`Day6CellNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day6CellNo->Sortable = true; // Allow sort
        $this->Fields['Day6CellNo'] = &$this->Day6CellNo;

        // Day6ICM
        $this->Day6ICM = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day6ICM', 'Day6ICM', '`Day6ICM`', '`Day6ICM`', 200, 45, -1, false, '`Day6ICM`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day6ICM->Sortable = true; // Allow sort
        $this->Fields['Day6ICM'] = &$this->Day6ICM;

        // Day6TE
        $this->Day6TE = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day6TE', 'Day6TE', '`Day6TE`', '`Day6TE`', 200, 45, -1, false, '`Day6TE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day6TE->Sortable = true; // Allow sort
        $this->Fields['Day6TE'] = &$this->Day6TE;

        // Day6Observation
        $this->Day6Observation = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day6Observation', 'Day6Observation', '`Day6Observation`', '`Day6Observation`', 200, 45, -1, false, '`Day6Observation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day6Observation->Sortable = true; // Allow sort
        $this->Fields['Day6Observation'] = &$this->Day6Observation;

        // Day6Collapsed
        $this->Day6Collapsed = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day6Collapsed', 'Day6Collapsed', '`Day6Collapsed`', '`Day6Collapsed`', 200, 45, -1, false, '`Day6Collapsed`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day6Collapsed->Sortable = true; // Allow sort
        $this->Fields['Day6Collapsed'] = &$this->Day6Collapsed;

        // Day6Vacoulles
        $this->Day6Vacoulles = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day6Vacoulles', 'Day6Vacoulles', '`Day6Vacoulles`', '`Day6Vacoulles`', 200, 45, -1, false, '`Day6Vacoulles`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day6Vacoulles->Sortable = true; // Allow sort
        $this->Fields['Day6Vacoulles'] = &$this->Day6Vacoulles;

        // Day6Grade
        $this->Day6Grade = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day6Grade', 'Day6Grade', '`Day6Grade`', '`Day6Grade`', 200, 45, -1, false, '`Day6Grade`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day6Grade->Sortable = true; // Allow sort
        $this->Fields['Day6Grade'] = &$this->Day6Grade;

        // Day6Cryoptop
        $this->Day6Cryoptop = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day6Cryoptop', 'Day6Cryoptop', '`Day6Cryoptop`', '`Day6Cryoptop`', 200, 45, -1, false, '`Day6Cryoptop`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day6Cryoptop->Sortable = true; // Allow sort
        $this->Fields['Day6Cryoptop'] = &$this->Day6Cryoptop;

        // EndingDay
        $this->EndingDay = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_EndingDay', 'EndingDay', '`EndingDay`', '`EndingDay`', 200, 45, -1, false, '`EndingDay`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EndingDay->Sortable = true; // Allow sort
        $this->Fields['EndingDay'] = &$this->EndingDay;

        // EndingCellStage
        $this->EndingCellStage = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_EndingCellStage', 'EndingCellStage', '`EndingCellStage`', '`EndingCellStage`', 200, 45, -1, false, '`EndingCellStage`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EndingCellStage->Sortable = true; // Allow sort
        $this->Fields['EndingCellStage'] = &$this->EndingCellStage;

        // EndingGrade
        $this->EndingGrade = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_EndingGrade', 'EndingGrade', '`EndingGrade`', '`EndingGrade`', 200, 45, -1, false, '`EndingGrade`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EndingGrade->Sortable = true; // Allow sort
        $this->Fields['EndingGrade'] = &$this->EndingGrade;

        // EndingState
        $this->EndingState = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_EndingState', 'EndingState', '`EndingState`', '`EndingState`', 200, 45, -1, false, '`EndingState`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EndingState->Sortable = true; // Allow sort
        $this->Fields['EndingState'] = &$this->EndingState;

        // Day0sino
        $this->Day0sino = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day0sino', 'Day0sino', '`Day0sino`', '`Day0sino`', 200, 45, -1, false, '`Day0sino`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day0sino->Sortable = true; // Allow sort
        $this->Fields['Day0sino'] = &$this->Day0sino;

        // Day0Attempts
        $this->Day0Attempts = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day0Attempts', 'Day0Attempts', '`Day0Attempts`', '`Day0Attempts`', 200, 45, -1, false, '`Day0Attempts`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day0Attempts->Sortable = true; // Allow sort
        $this->Fields['Day0Attempts'] = &$this->Day0Attempts;

        // Day0SPZMorpho
        $this->Day0SPZMorpho = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day0SPZMorpho', 'Day0SPZMorpho', '`Day0SPZMorpho`', '`Day0SPZMorpho`', 200, 45, -1, false, '`Day0SPZMorpho`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day0SPZMorpho->Sortable = true; // Allow sort
        $this->Fields['Day0SPZMorpho'] = &$this->Day0SPZMorpho;

        // Day0SPZLocation
        $this->Day0SPZLocation = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day0SPZLocation', 'Day0SPZLocation', '`Day0SPZLocation`', '`Day0SPZLocation`', 200, 45, -1, false, '`Day0SPZLocation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day0SPZLocation->Sortable = true; // Allow sort
        $this->Fields['Day0SPZLocation'] = &$this->Day0SPZLocation;

        // Day2Grade
        $this->Day2Grade = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day2Grade', 'Day2Grade', '`Day2Grade`', '`Day2Grade`', 200, 45, -1, false, '`Day2Grade`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day2Grade->Sortable = true; // Allow sort
        $this->Fields['Day2Grade'] = &$this->Day2Grade;

        // Day3Sino
        $this->Day3Sino = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day3Sino', 'Day3Sino', '`Day3Sino`', '`Day3Sino`', 200, 45, -1, false, '`Day3Sino`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day3Sino->Sortable = true; // Allow sort
        $this->Fields['Day3Sino'] = &$this->Day3Sino;

        // Day3End
        $this->Day3End = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day3End', 'Day3End', '`Day3End`', '`Day3End`', 200, 45, -1, false, '`Day3End`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day3End->Sortable = true; // Allow sort
        $this->Fields['Day3End'] = &$this->Day3End;

        // Day4SiNo
        $this->Day4SiNo = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day4SiNo', 'Day4SiNo', '`Day4SiNo`', '`Day4SiNo`', 200, 45, -1, false, '`Day4SiNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day4SiNo->Sortable = true; // Allow sort
        $this->Fields['Day4SiNo'] = &$this->Day4SiNo;

        // TidNo
        $this->TidNo = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_TidNo', 'TidNo', '`TidNo`', '`TidNo`', 3, 11, -1, false, '`TidNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TidNo->Sortable = true; // Allow sort
        $this->TidNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['TidNo'] = &$this->TidNo;

        // Day0SpOrgin
        $this->Day0SpOrgin = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day0SpOrgin', 'Day0SpOrgin', '`Day0SpOrgin`', '`Day0SpOrgin`', 200, 45, -1, false, '`Day0SpOrgin`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day0SpOrgin->Sortable = true; // Allow sort
        $this->Fields['Day0SpOrgin'] = &$this->Day0SpOrgin;

        // DidNO
        $this->DidNO = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_DidNO', 'DidNO', '`DidNO`', '`DidNO`', 200, 45, -1, false, '`DidNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DidNO->Sortable = true; // Allow sort
        $this->Fields['DidNO'] = &$this->DidNO;

        // ICSiIVFDateTime
        $this->ICSiIVFDateTime = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_ICSiIVFDateTime', 'ICSiIVFDateTime', '`ICSiIVFDateTime`', CastDateFieldForLike("`ICSiIVFDateTime`", 0, "DB"), 135, 19, 0, false, '`ICSiIVFDateTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ICSiIVFDateTime->Sortable = true; // Allow sort
        $this->ICSiIVFDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['ICSiIVFDateTime'] = &$this->ICSiIVFDateTime;

        // PrimaryEmbrologist
        $this->PrimaryEmbrologist = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_PrimaryEmbrologist', 'PrimaryEmbrologist', '`PrimaryEmbrologist`', '`PrimaryEmbrologist`', 200, 45, -1, false, '`PrimaryEmbrologist`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PrimaryEmbrologist->Sortable = true; // Allow sort
        $this->Fields['PrimaryEmbrologist'] = &$this->PrimaryEmbrologist;

        // SecondaryEmbrologist
        $this->SecondaryEmbrologist = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_SecondaryEmbrologist', 'SecondaryEmbrologist', '`SecondaryEmbrologist`', '`SecondaryEmbrologist`', 200, 45, -1, false, '`SecondaryEmbrologist`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SecondaryEmbrologist->Sortable = true; // Allow sort
        $this->Fields['SecondaryEmbrologist'] = &$this->SecondaryEmbrologist;

        // Incubator
        $this->Incubator = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Incubator', 'Incubator', '`Incubator`', '`Incubator`', 200, 45, -1, false, '`Incubator`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Incubator->Sortable = true; // Allow sort
        $this->Fields['Incubator'] = &$this->Incubator;

        // location
        $this->location = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_location', 'location', '`location`', '`location`', 200, 45, -1, false, '`location`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->location->Sortable = true; // Allow sort
        $this->Fields['location'] = &$this->location;

        // Remarks
        $this->Remarks = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Remarks', 'Remarks', '`Remarks`', '`Remarks`', 200, 45, -1, false, '`Remarks`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Remarks->Sortable = true; // Allow sort
        $this->Fields['Remarks'] = &$this->Remarks;

        // OocyteNo
        $this->OocyteNo = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_OocyteNo', 'OocyteNo', '`OocyteNo`', '`OocyteNo`', 200, 45, -1, false, '`OocyteNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OocyteNo->Sortable = true; // Allow sort
        $this->Fields['OocyteNo'] = &$this->OocyteNo;

        // Stage
        $this->Stage = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Stage', 'Stage', '`Stage`', '`Stage`', 200, 45, -1, false, '`Stage`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Stage->Sortable = true; // Allow sort
        $this->Fields['Stage'] = &$this->Stage;

        // vitrificationDate
        $this->vitrificationDate = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_vitrificationDate', 'vitrificationDate', '`vitrificationDate`', CastDateFieldForLike("`vitrificationDate`", 0, "DB"), 135, 19, 0, false, '`vitrificationDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->vitrificationDate->Sortable = true; // Allow sort
        $this->vitrificationDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['vitrificationDate'] = &$this->vitrificationDate;

        // vitriPrimaryEmbryologist
        $this->vitriPrimaryEmbryologist = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_vitriPrimaryEmbryologist', 'vitriPrimaryEmbryologist', '`vitriPrimaryEmbryologist`', '`vitriPrimaryEmbryologist`', 200, 45, -1, false, '`vitriPrimaryEmbryologist`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->vitriPrimaryEmbryologist->Sortable = true; // Allow sort
        $this->Fields['vitriPrimaryEmbryologist'] = &$this->vitriPrimaryEmbryologist;

        // vitriSecondaryEmbryologist
        $this->vitriSecondaryEmbryologist = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_vitriSecondaryEmbryologist', 'vitriSecondaryEmbryologist', '`vitriSecondaryEmbryologist`', '`vitriSecondaryEmbryologist`', 200, 45, -1, false, '`vitriSecondaryEmbryologist`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->vitriSecondaryEmbryologist->Sortable = true; // Allow sort
        $this->Fields['vitriSecondaryEmbryologist'] = &$this->vitriSecondaryEmbryologist;

        // vitriEmbryoNo
        $this->vitriEmbryoNo = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_vitriEmbryoNo', 'vitriEmbryoNo', '`vitriEmbryoNo`', '`vitriEmbryoNo`', 200, 45, -1, false, '`vitriEmbryoNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->vitriEmbryoNo->Sortable = true; // Allow sort
        $this->Fields['vitriEmbryoNo'] = &$this->vitriEmbryoNo;

        // vitriFertilisationDate
        $this->vitriFertilisationDate = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_vitriFertilisationDate', 'vitriFertilisationDate', '`vitriFertilisationDate`', CastDateFieldForLike("`vitriFertilisationDate`", 0, "DB"), 135, 19, 0, false, '`vitriFertilisationDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->vitriFertilisationDate->Sortable = true; // Allow sort
        $this->vitriFertilisationDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['vitriFertilisationDate'] = &$this->vitriFertilisationDate;

        // vitriDay
        $this->vitriDay = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_vitriDay', 'vitriDay', '`vitriDay`', '`vitriDay`', 200, 45, -1, false, '`vitriDay`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->vitriDay->Sortable = true; // Allow sort
        $this->Fields['vitriDay'] = &$this->vitriDay;

        // vitriGrade
        $this->vitriGrade = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_vitriGrade', 'vitriGrade', '`vitriGrade`', '`vitriGrade`', 200, 45, -1, false, '`vitriGrade`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->vitriGrade->Sortable = true; // Allow sort
        $this->Fields['vitriGrade'] = &$this->vitriGrade;

        // vitriIncubator
        $this->vitriIncubator = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_vitriIncubator', 'vitriIncubator', '`vitriIncubator`', '`vitriIncubator`', 200, 45, -1, false, '`vitriIncubator`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->vitriIncubator->Sortable = true; // Allow sort
        $this->Fields['vitriIncubator'] = &$this->vitriIncubator;

        // vitriTank
        $this->vitriTank = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_vitriTank', 'vitriTank', '`vitriTank`', '`vitriTank`', 200, 45, -1, false, '`vitriTank`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->vitriTank->Sortable = true; // Allow sort
        $this->Fields['vitriTank'] = &$this->vitriTank;

        // vitriCanister
        $this->vitriCanister = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_vitriCanister', 'vitriCanister', '`vitriCanister`', '`vitriCanister`', 200, 45, -1, false, '`vitriCanister`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->vitriCanister->Sortable = true; // Allow sort
        $this->Fields['vitriCanister'] = &$this->vitriCanister;

        // vitriGobiet
        $this->vitriGobiet = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_vitriGobiet', 'vitriGobiet', '`vitriGobiet`', '`vitriGobiet`', 200, 45, -1, false, '`vitriGobiet`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->vitriGobiet->Sortable = true; // Allow sort
        $this->Fields['vitriGobiet'] = &$this->vitriGobiet;

        // vitriViscotube
        $this->vitriViscotube = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_vitriViscotube', 'vitriViscotube', '`vitriViscotube`', '`vitriViscotube`', 200, 45, -1, false, '`vitriViscotube`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->vitriViscotube->Sortable = true; // Allow sort
        $this->Fields['vitriViscotube'] = &$this->vitriViscotube;

        // vitriCryolockNo
        $this->vitriCryolockNo = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_vitriCryolockNo', 'vitriCryolockNo', '`vitriCryolockNo`', '`vitriCryolockNo`', 200, 45, -1, false, '`vitriCryolockNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->vitriCryolockNo->Sortable = true; // Allow sort
        $this->Fields['vitriCryolockNo'] = &$this->vitriCryolockNo;

        // vitriCryolockColour
        $this->vitriCryolockColour = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_vitriCryolockColour', 'vitriCryolockColour', '`vitriCryolockColour`', '`vitriCryolockColour`', 200, 45, -1, false, '`vitriCryolockColour`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->vitriCryolockColour->Sortable = true; // Allow sort
        $this->Fields['vitriCryolockColour'] = &$this->vitriCryolockColour;

        // vitriStage
        $this->vitriStage = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_vitriStage', 'vitriStage', '`vitriStage`', '`vitriStage`', 200, 45, -1, false, '`vitriStage`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->vitriStage->Sortable = true; // Allow sort
        $this->Fields['vitriStage'] = &$this->vitriStage;

        // thawDate
        $this->thawDate = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_thawDate', 'thawDate', '`thawDate`', CastDateFieldForLike("`thawDate`", 0, "DB"), 135, 19, 0, false, '`thawDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->thawDate->Sortable = true; // Allow sort
        $this->thawDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['thawDate'] = &$this->thawDate;

        // thawPrimaryEmbryologist
        $this->thawPrimaryEmbryologist = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_thawPrimaryEmbryologist', 'thawPrimaryEmbryologist', '`thawPrimaryEmbryologist`', '`thawPrimaryEmbryologist`', 200, 45, -1, false, '`thawPrimaryEmbryologist`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->thawPrimaryEmbryologist->Sortable = true; // Allow sort
        $this->Fields['thawPrimaryEmbryologist'] = &$this->thawPrimaryEmbryologist;

        // thawSecondaryEmbryologist
        $this->thawSecondaryEmbryologist = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_thawSecondaryEmbryologist', 'thawSecondaryEmbryologist', '`thawSecondaryEmbryologist`', '`thawSecondaryEmbryologist`', 200, 45, -1, false, '`thawSecondaryEmbryologist`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->thawSecondaryEmbryologist->Sortable = true; // Allow sort
        $this->Fields['thawSecondaryEmbryologist'] = &$this->thawSecondaryEmbryologist;

        // thawET
        $this->thawET = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_thawET', 'thawET', '`thawET`', '`thawET`', 200, 45, -1, false, '`thawET`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->thawET->Sortable = true; // Allow sort
        $this->Fields['thawET'] = &$this->thawET;

        // thawReFrozen
        $this->thawReFrozen = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_thawReFrozen', 'thawReFrozen', '`thawReFrozen`', '`thawReFrozen`', 200, 45, -1, false, '`thawReFrozen`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->thawReFrozen->Sortable = true; // Allow sort
        $this->Fields['thawReFrozen'] = &$this->thawReFrozen;

        // thawAbserve
        $this->thawAbserve = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_thawAbserve', 'thawAbserve', '`thawAbserve`', '`thawAbserve`', 200, 45, -1, false, '`thawAbserve`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->thawAbserve->Sortable = true; // Allow sort
        $this->Fields['thawAbserve'] = &$this->thawAbserve;

        // thawDiscard
        $this->thawDiscard = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_thawDiscard', 'thawDiscard', '`thawDiscard`', '`thawDiscard`', 200, 45, -1, false, '`thawDiscard`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->thawDiscard->Sortable = true; // Allow sort
        $this->Fields['thawDiscard'] = &$this->thawDiscard;

        // ETCatheter
        $this->ETCatheter = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_ETCatheter', 'ETCatheter', '`ETCatheter`', '`ETCatheter`', 200, 45, -1, false, '`ETCatheter`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ETCatheter->Sortable = true; // Allow sort
        $this->Fields['ETCatheter'] = &$this->ETCatheter;

        // ETDifficulty
        $this->ETDifficulty = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_ETDifficulty', 'ETDifficulty', '`ETDifficulty`', '`ETDifficulty`', 200, 45, -1, false, '`ETDifficulty`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ETDifficulty->Sortable = true; // Allow sort
        $this->Fields['ETDifficulty'] = &$this->ETDifficulty;

        // ETEasy
        $this->ETEasy = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_ETEasy', 'ETEasy', '`ETEasy`', '`ETEasy`', 200, 45, -1, false, '`ETEasy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ETEasy->Sortable = true; // Allow sort
        $this->Fields['ETEasy'] = &$this->ETEasy;

        // ETComments
        $this->ETComments = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_ETComments', 'ETComments', '`ETComments`', '`ETComments`', 200, 45, -1, false, '`ETComments`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ETComments->Sortable = true; // Allow sort
        $this->Fields['ETComments'] = &$this->ETComments;

        // ETDoctor
        $this->ETDoctor = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_ETDoctor', 'ETDoctor', '`ETDoctor`', '`ETDoctor`', 200, 45, -1, false, '`ETDoctor`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ETDoctor->Sortable = true; // Allow sort
        $this->Fields['ETDoctor'] = &$this->ETDoctor;

        // ETEmbryologist
        $this->ETEmbryologist = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_ETEmbryologist', 'ETEmbryologist', '`ETEmbryologist`', '`ETEmbryologist`', 200, 45, -1, false, '`ETEmbryologist`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ETEmbryologist->Sortable = true; // Allow sort
        $this->Fields['ETEmbryologist'] = &$this->ETEmbryologist;

        // Day2End
        $this->Day2End = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day2End', 'Day2End', '`Day2End`', '`Day2End`', 200, 45, -1, false, '`Day2End`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day2End->Sortable = true; // Allow sort
        $this->Fields['Day2End'] = &$this->Day2End;

        // Day2SiNo
        $this->Day2SiNo = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day2SiNo', 'Day2SiNo', '`Day2SiNo`', '`Day2SiNo`', 200, 45, -1, false, '`Day2SiNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day2SiNo->Sortable = true; // Allow sort
        $this->Fields['Day2SiNo'] = &$this->Day2SiNo;

        // EndSiNo
        $this->EndSiNo = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_EndSiNo', 'EndSiNo', '`EndSiNo`', '`EndSiNo`', 200, 45, -1, false, '`EndSiNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EndSiNo->Sortable = true; // Allow sort
        $this->Fields['EndSiNo'] = &$this->EndSiNo;

        // Day4End
        $this->Day4End = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day4End', 'Day4End', '`Day4End`', '`Day4End`', 200, 45, -1, false, '`Day4End`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day4End->Sortable = true; // Allow sort
        $this->Fields['Day4End'] = &$this->Day4End;

        // ETDate
        $this->ETDate = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_ETDate', 'ETDate', '`ETDate`', CastDateFieldForLike("`ETDate`", 0, "DB"), 135, 19, 0, false, '`ETDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ETDate->Sortable = true; // Allow sort
        $this->ETDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['ETDate'] = &$this->ETDate;

        // Day1End
        $this->Day1End = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day1End', 'Day1End', '`Day1End`', '`Day1End`', 200, 45, -1, false, '`Day1End`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day1End->Sortable = true; // Allow sort
        $this->Fields['Day1End'] = &$this->Day1End;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`ivf_embryology_chart`";
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
        $this->SpermOrigin->DbValue = $row['SpermOrigin'];
        $this->InseminatinTechnique->DbValue = $row['InseminatinTechnique'];
        $this->IndicationForART->DbValue = $row['IndicationForART'];
        $this->Day0OocyteStage->DbValue = $row['Day0OocyteStage'];
        $this->Day0PolarBodyPosition->DbValue = $row['Day0PolarBodyPosition'];
        $this->Day0Breakage->DbValue = $row['Day0Breakage'];
        $this->Day1PN->DbValue = $row['Day1PN'];
        $this->Day1PB->DbValue = $row['Day1PB'];
        $this->Day1Pronucleus->DbValue = $row['Day1Pronucleus'];
        $this->Day1Nucleolus->DbValue = $row['Day1Nucleolus'];
        $this->Day1Halo->DbValue = $row['Day1Halo'];
        $this->Day1Sperm->DbValue = $row['Day1Sperm'];
        $this->Day2CellNo->DbValue = $row['Day2CellNo'];
        $this->Day2Frag->DbValue = $row['Day2Frag'];
        $this->Day2Symmetry->DbValue = $row['Day2Symmetry'];
        $this->Day2Cryoptop->DbValue = $row['Day2Cryoptop'];
        $this->Day3CellNo->DbValue = $row['Day3CellNo'];
        $this->Day3Frag->DbValue = $row['Day3Frag'];
        $this->Day3Symmetry->DbValue = $row['Day3Symmetry'];
        $this->Day3Grade->DbValue = $row['Day3Grade'];
        $this->Day3Vacoules->DbValue = $row['Day3Vacoules'];
        $this->Day3ZP->DbValue = $row['Day3ZP'];
        $this->Day3Cryoptop->DbValue = $row['Day3Cryoptop'];
        $this->Day4CellNo->DbValue = $row['Day4CellNo'];
        $this->Day4Frag->DbValue = $row['Day4Frag'];
        $this->Day4Symmetry->DbValue = $row['Day4Symmetry'];
        $this->Day4Grade->DbValue = $row['Day4Grade'];
        $this->Day4Cryoptop->DbValue = $row['Day4Cryoptop'];
        $this->Day5CellNo->DbValue = $row['Day5CellNo'];
        $this->Day5ICM->DbValue = $row['Day5ICM'];
        $this->Day5TE->DbValue = $row['Day5TE'];
        $this->Day5Observation->DbValue = $row['Day5Observation'];
        $this->Day5Collapsed->DbValue = $row['Day5Collapsed'];
        $this->Day5Vacoulles->DbValue = $row['Day5Vacoulles'];
        $this->Day5Grade->DbValue = $row['Day5Grade'];
        $this->Day5Cryoptop->DbValue = $row['Day5Cryoptop'];
        $this->Day6CellNo->DbValue = $row['Day6CellNo'];
        $this->Day6ICM->DbValue = $row['Day6ICM'];
        $this->Day6TE->DbValue = $row['Day6TE'];
        $this->Day6Observation->DbValue = $row['Day6Observation'];
        $this->Day6Collapsed->DbValue = $row['Day6Collapsed'];
        $this->Day6Vacoulles->DbValue = $row['Day6Vacoulles'];
        $this->Day6Grade->DbValue = $row['Day6Grade'];
        $this->Day6Cryoptop->DbValue = $row['Day6Cryoptop'];
        $this->EndingDay->DbValue = $row['EndingDay'];
        $this->EndingCellStage->DbValue = $row['EndingCellStage'];
        $this->EndingGrade->DbValue = $row['EndingGrade'];
        $this->EndingState->DbValue = $row['EndingState'];
        $this->Day0sino->DbValue = $row['Day0sino'];
        $this->Day0Attempts->DbValue = $row['Day0Attempts'];
        $this->Day0SPZMorpho->DbValue = $row['Day0SPZMorpho'];
        $this->Day0SPZLocation->DbValue = $row['Day0SPZLocation'];
        $this->Day2Grade->DbValue = $row['Day2Grade'];
        $this->Day3Sino->DbValue = $row['Day3Sino'];
        $this->Day3End->DbValue = $row['Day3End'];
        $this->Day4SiNo->DbValue = $row['Day4SiNo'];
        $this->TidNo->DbValue = $row['TidNo'];
        $this->Day0SpOrgin->DbValue = $row['Day0SpOrgin'];
        $this->DidNO->DbValue = $row['DidNO'];
        $this->ICSiIVFDateTime->DbValue = $row['ICSiIVFDateTime'];
        $this->PrimaryEmbrologist->DbValue = $row['PrimaryEmbrologist'];
        $this->SecondaryEmbrologist->DbValue = $row['SecondaryEmbrologist'];
        $this->Incubator->DbValue = $row['Incubator'];
        $this->location->DbValue = $row['location'];
        $this->Remarks->DbValue = $row['Remarks'];
        $this->OocyteNo->DbValue = $row['OocyteNo'];
        $this->Stage->DbValue = $row['Stage'];
        $this->vitrificationDate->DbValue = $row['vitrificationDate'];
        $this->vitriPrimaryEmbryologist->DbValue = $row['vitriPrimaryEmbryologist'];
        $this->vitriSecondaryEmbryologist->DbValue = $row['vitriSecondaryEmbryologist'];
        $this->vitriEmbryoNo->DbValue = $row['vitriEmbryoNo'];
        $this->vitriFertilisationDate->DbValue = $row['vitriFertilisationDate'];
        $this->vitriDay->DbValue = $row['vitriDay'];
        $this->vitriGrade->DbValue = $row['vitriGrade'];
        $this->vitriIncubator->DbValue = $row['vitriIncubator'];
        $this->vitriTank->DbValue = $row['vitriTank'];
        $this->vitriCanister->DbValue = $row['vitriCanister'];
        $this->vitriGobiet->DbValue = $row['vitriGobiet'];
        $this->vitriViscotube->DbValue = $row['vitriViscotube'];
        $this->vitriCryolockNo->DbValue = $row['vitriCryolockNo'];
        $this->vitriCryolockColour->DbValue = $row['vitriCryolockColour'];
        $this->vitriStage->DbValue = $row['vitriStage'];
        $this->thawDate->DbValue = $row['thawDate'];
        $this->thawPrimaryEmbryologist->DbValue = $row['thawPrimaryEmbryologist'];
        $this->thawSecondaryEmbryologist->DbValue = $row['thawSecondaryEmbryologist'];
        $this->thawET->DbValue = $row['thawET'];
        $this->thawReFrozen->DbValue = $row['thawReFrozen'];
        $this->thawAbserve->DbValue = $row['thawAbserve'];
        $this->thawDiscard->DbValue = $row['thawDiscard'];
        $this->ETCatheter->DbValue = $row['ETCatheter'];
        $this->ETDifficulty->DbValue = $row['ETDifficulty'];
        $this->ETEasy->DbValue = $row['ETEasy'];
        $this->ETComments->DbValue = $row['ETComments'];
        $this->ETDoctor->DbValue = $row['ETDoctor'];
        $this->ETEmbryologist->DbValue = $row['ETEmbryologist'];
        $this->Day2End->DbValue = $row['Day2End'];
        $this->Day2SiNo->DbValue = $row['Day2SiNo'];
        $this->EndSiNo->DbValue = $row['EndSiNo'];
        $this->Day4End->DbValue = $row['Day4End'];
        $this->ETDate->DbValue = $row['ETDate'];
        $this->Day1End->DbValue = $row['Day1End'];
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
            return GetUrl("IvfEmbryologyChartList");
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
        if ($pageName == "IvfEmbryologyChartView") {
            return $Language->phrase("View");
        } elseif ($pageName == "IvfEmbryologyChartEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "IvfEmbryologyChartAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "IvfEmbryologyChartList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("IvfEmbryologyChartView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("IvfEmbryologyChartView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "IvfEmbryologyChartAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "IvfEmbryologyChartAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("IvfEmbryologyChartEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("IvfEmbryologyChartAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("IvfEmbryologyChartDelete", $this->getUrlParm());
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
        $this->SpermOrigin->setDbValue($row['SpermOrigin']);
        $this->InseminatinTechnique->setDbValue($row['InseminatinTechnique']);
        $this->IndicationForART->setDbValue($row['IndicationForART']);
        $this->Day0OocyteStage->setDbValue($row['Day0OocyteStage']);
        $this->Day0PolarBodyPosition->setDbValue($row['Day0PolarBodyPosition']);
        $this->Day0Breakage->setDbValue($row['Day0Breakage']);
        $this->Day1PN->setDbValue($row['Day1PN']);
        $this->Day1PB->setDbValue($row['Day1PB']);
        $this->Day1Pronucleus->setDbValue($row['Day1Pronucleus']);
        $this->Day1Nucleolus->setDbValue($row['Day1Nucleolus']);
        $this->Day1Halo->setDbValue($row['Day1Halo']);
        $this->Day1Sperm->setDbValue($row['Day1Sperm']);
        $this->Day2CellNo->setDbValue($row['Day2CellNo']);
        $this->Day2Frag->setDbValue($row['Day2Frag']);
        $this->Day2Symmetry->setDbValue($row['Day2Symmetry']);
        $this->Day2Cryoptop->setDbValue($row['Day2Cryoptop']);
        $this->Day3CellNo->setDbValue($row['Day3CellNo']);
        $this->Day3Frag->setDbValue($row['Day3Frag']);
        $this->Day3Symmetry->setDbValue($row['Day3Symmetry']);
        $this->Day3Grade->setDbValue($row['Day3Grade']);
        $this->Day3Vacoules->setDbValue($row['Day3Vacoules']);
        $this->Day3ZP->setDbValue($row['Day3ZP']);
        $this->Day3Cryoptop->setDbValue($row['Day3Cryoptop']);
        $this->Day4CellNo->setDbValue($row['Day4CellNo']);
        $this->Day4Frag->setDbValue($row['Day4Frag']);
        $this->Day4Symmetry->setDbValue($row['Day4Symmetry']);
        $this->Day4Grade->setDbValue($row['Day4Grade']);
        $this->Day4Cryoptop->setDbValue($row['Day4Cryoptop']);
        $this->Day5CellNo->setDbValue($row['Day5CellNo']);
        $this->Day5ICM->setDbValue($row['Day5ICM']);
        $this->Day5TE->setDbValue($row['Day5TE']);
        $this->Day5Observation->setDbValue($row['Day5Observation']);
        $this->Day5Collapsed->setDbValue($row['Day5Collapsed']);
        $this->Day5Vacoulles->setDbValue($row['Day5Vacoulles']);
        $this->Day5Grade->setDbValue($row['Day5Grade']);
        $this->Day5Cryoptop->setDbValue($row['Day5Cryoptop']);
        $this->Day6CellNo->setDbValue($row['Day6CellNo']);
        $this->Day6ICM->setDbValue($row['Day6ICM']);
        $this->Day6TE->setDbValue($row['Day6TE']);
        $this->Day6Observation->setDbValue($row['Day6Observation']);
        $this->Day6Collapsed->setDbValue($row['Day6Collapsed']);
        $this->Day6Vacoulles->setDbValue($row['Day6Vacoulles']);
        $this->Day6Grade->setDbValue($row['Day6Grade']);
        $this->Day6Cryoptop->setDbValue($row['Day6Cryoptop']);
        $this->EndingDay->setDbValue($row['EndingDay']);
        $this->EndingCellStage->setDbValue($row['EndingCellStage']);
        $this->EndingGrade->setDbValue($row['EndingGrade']);
        $this->EndingState->setDbValue($row['EndingState']);
        $this->Day0sino->setDbValue($row['Day0sino']);
        $this->Day0Attempts->setDbValue($row['Day0Attempts']);
        $this->Day0SPZMorpho->setDbValue($row['Day0SPZMorpho']);
        $this->Day0SPZLocation->setDbValue($row['Day0SPZLocation']);
        $this->Day2Grade->setDbValue($row['Day2Grade']);
        $this->Day3Sino->setDbValue($row['Day3Sino']);
        $this->Day3End->setDbValue($row['Day3End']);
        $this->Day4SiNo->setDbValue($row['Day4SiNo']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->Day0SpOrgin->setDbValue($row['Day0SpOrgin']);
        $this->DidNO->setDbValue($row['DidNO']);
        $this->ICSiIVFDateTime->setDbValue($row['ICSiIVFDateTime']);
        $this->PrimaryEmbrologist->setDbValue($row['PrimaryEmbrologist']);
        $this->SecondaryEmbrologist->setDbValue($row['SecondaryEmbrologist']);
        $this->Incubator->setDbValue($row['Incubator']);
        $this->location->setDbValue($row['location']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->OocyteNo->setDbValue($row['OocyteNo']);
        $this->Stage->setDbValue($row['Stage']);
        $this->vitrificationDate->setDbValue($row['vitrificationDate']);
        $this->vitriPrimaryEmbryologist->setDbValue($row['vitriPrimaryEmbryologist']);
        $this->vitriSecondaryEmbryologist->setDbValue($row['vitriSecondaryEmbryologist']);
        $this->vitriEmbryoNo->setDbValue($row['vitriEmbryoNo']);
        $this->vitriFertilisationDate->setDbValue($row['vitriFertilisationDate']);
        $this->vitriDay->setDbValue($row['vitriDay']);
        $this->vitriGrade->setDbValue($row['vitriGrade']);
        $this->vitriIncubator->setDbValue($row['vitriIncubator']);
        $this->vitriTank->setDbValue($row['vitriTank']);
        $this->vitriCanister->setDbValue($row['vitriCanister']);
        $this->vitriGobiet->setDbValue($row['vitriGobiet']);
        $this->vitriViscotube->setDbValue($row['vitriViscotube']);
        $this->vitriCryolockNo->setDbValue($row['vitriCryolockNo']);
        $this->vitriCryolockColour->setDbValue($row['vitriCryolockColour']);
        $this->vitriStage->setDbValue($row['vitriStage']);
        $this->thawDate->setDbValue($row['thawDate']);
        $this->thawPrimaryEmbryologist->setDbValue($row['thawPrimaryEmbryologist']);
        $this->thawSecondaryEmbryologist->setDbValue($row['thawSecondaryEmbryologist']);
        $this->thawET->setDbValue($row['thawET']);
        $this->thawReFrozen->setDbValue($row['thawReFrozen']);
        $this->thawAbserve->setDbValue($row['thawAbserve']);
        $this->thawDiscard->setDbValue($row['thawDiscard']);
        $this->ETCatheter->setDbValue($row['ETCatheter']);
        $this->ETDifficulty->setDbValue($row['ETDifficulty']);
        $this->ETEasy->setDbValue($row['ETEasy']);
        $this->ETComments->setDbValue($row['ETComments']);
        $this->ETDoctor->setDbValue($row['ETDoctor']);
        $this->ETEmbryologist->setDbValue($row['ETEmbryologist']);
        $this->Day2End->setDbValue($row['Day2End']);
        $this->Day2SiNo->setDbValue($row['Day2SiNo']);
        $this->EndSiNo->setDbValue($row['EndSiNo']);
        $this->Day4End->setDbValue($row['Day4End']);
        $this->ETDate->setDbValue($row['ETDate']);
        $this->Day1End->setDbValue($row['Day1End']);
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

        // SpermOrigin

        // InseminatinTechnique

        // IndicationForART

        // Day0OocyteStage

        // Day0PolarBodyPosition

        // Day0Breakage

        // Day1PN

        // Day1PB

        // Day1Pronucleus

        // Day1Nucleolus

        // Day1Halo

        // Day1Sperm

        // Day2CellNo

        // Day2Frag

        // Day2Symmetry

        // Day2Cryoptop

        // Day3CellNo

        // Day3Frag

        // Day3Symmetry

        // Day3Grade

        // Day3Vacoules

        // Day3ZP

        // Day3Cryoptop

        // Day4CellNo

        // Day4Frag

        // Day4Symmetry

        // Day4Grade

        // Day4Cryoptop

        // Day5CellNo

        // Day5ICM

        // Day5TE

        // Day5Observation

        // Day5Collapsed

        // Day5Vacoulles

        // Day5Grade

        // Day5Cryoptop

        // Day6CellNo

        // Day6ICM

        // Day6TE

        // Day6Observation

        // Day6Collapsed

        // Day6Vacoulles

        // Day6Grade

        // Day6Cryoptop

        // EndingDay

        // EndingCellStage

        // EndingGrade

        // EndingState

        // Day0sino

        // Day0Attempts

        // Day0SPZMorpho

        // Day0SPZLocation

        // Day2Grade

        // Day3Sino

        // Day3End

        // Day4SiNo

        // TidNo

        // Day0SpOrgin

        // DidNO

        // ICSiIVFDateTime

        // PrimaryEmbrologist

        // SecondaryEmbrologist

        // Incubator

        // location

        // Remarks

        // OocyteNo

        // Stage

        // vitrificationDate

        // vitriPrimaryEmbryologist

        // vitriSecondaryEmbryologist

        // vitriEmbryoNo

        // vitriFertilisationDate

        // vitriDay

        // vitriGrade

        // vitriIncubator

        // vitriTank

        // vitriCanister

        // vitriGobiet

        // vitriViscotube

        // vitriCryolockNo

        // vitriCryolockColour

        // vitriStage

        // thawDate

        // thawPrimaryEmbryologist

        // thawSecondaryEmbryologist

        // thawET

        // thawReFrozen

        // thawAbserve

        // thawDiscard

        // ETCatheter

        // ETDifficulty

        // ETEasy

        // ETComments

        // ETDoctor

        // ETEmbryologist

        // Day2End

        // Day2SiNo

        // EndSiNo

        // Day4End

        // ETDate

        // Day1End

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

        // SpermOrigin
        $this->SpermOrigin->ViewValue = $this->SpermOrigin->CurrentValue;
        $this->SpermOrigin->ViewCustomAttributes = "";

        // InseminatinTechnique
        $this->InseminatinTechnique->ViewValue = $this->InseminatinTechnique->CurrentValue;
        $this->InseminatinTechnique->ViewCustomAttributes = "";

        // IndicationForART
        $this->IndicationForART->ViewValue = $this->IndicationForART->CurrentValue;
        $this->IndicationForART->ViewCustomAttributes = "";

        // Day0OocyteStage
        $this->Day0OocyteStage->ViewValue = $this->Day0OocyteStage->CurrentValue;
        $this->Day0OocyteStage->ViewCustomAttributes = "";

        // Day0PolarBodyPosition
        $this->Day0PolarBodyPosition->ViewValue = $this->Day0PolarBodyPosition->CurrentValue;
        $this->Day0PolarBodyPosition->ViewCustomAttributes = "";

        // Day0Breakage
        $this->Day0Breakage->ViewValue = $this->Day0Breakage->CurrentValue;
        $this->Day0Breakage->ViewCustomAttributes = "";

        // Day1PN
        $this->Day1PN->ViewValue = $this->Day1PN->CurrentValue;
        $this->Day1PN->ViewCustomAttributes = "";

        // Day1PB
        $this->Day1PB->ViewValue = $this->Day1PB->CurrentValue;
        $this->Day1PB->ViewCustomAttributes = "";

        // Day1Pronucleus
        $this->Day1Pronucleus->ViewValue = $this->Day1Pronucleus->CurrentValue;
        $this->Day1Pronucleus->ViewCustomAttributes = "";

        // Day1Nucleolus
        $this->Day1Nucleolus->ViewValue = $this->Day1Nucleolus->CurrentValue;
        $this->Day1Nucleolus->ViewCustomAttributes = "";

        // Day1Halo
        $this->Day1Halo->ViewValue = $this->Day1Halo->CurrentValue;
        $this->Day1Halo->ViewCustomAttributes = "";

        // Day1Sperm
        $this->Day1Sperm->ViewValue = $this->Day1Sperm->CurrentValue;
        $this->Day1Sperm->ViewCustomAttributes = "";

        // Day2CellNo
        $this->Day2CellNo->ViewValue = $this->Day2CellNo->CurrentValue;
        $this->Day2CellNo->ViewCustomAttributes = "";

        // Day2Frag
        $this->Day2Frag->ViewValue = $this->Day2Frag->CurrentValue;
        $this->Day2Frag->ViewCustomAttributes = "";

        // Day2Symmetry
        $this->Day2Symmetry->ViewValue = $this->Day2Symmetry->CurrentValue;
        $this->Day2Symmetry->ViewCustomAttributes = "";

        // Day2Cryoptop
        $this->Day2Cryoptop->ViewValue = $this->Day2Cryoptop->CurrentValue;
        $this->Day2Cryoptop->ViewCustomAttributes = "";

        // Day3CellNo
        $this->Day3CellNo->ViewValue = $this->Day3CellNo->CurrentValue;
        $this->Day3CellNo->ViewCustomAttributes = "";

        // Day3Frag
        $this->Day3Frag->ViewValue = $this->Day3Frag->CurrentValue;
        $this->Day3Frag->ViewCustomAttributes = "";

        // Day3Symmetry
        $this->Day3Symmetry->ViewValue = $this->Day3Symmetry->CurrentValue;
        $this->Day3Symmetry->ViewCustomAttributes = "";

        // Day3Grade
        $this->Day3Grade->ViewValue = $this->Day3Grade->CurrentValue;
        $this->Day3Grade->ViewCustomAttributes = "";

        // Day3Vacoules
        $this->Day3Vacoules->ViewValue = $this->Day3Vacoules->CurrentValue;
        $this->Day3Vacoules->ViewCustomAttributes = "";

        // Day3ZP
        $this->Day3ZP->ViewValue = $this->Day3ZP->CurrentValue;
        $this->Day3ZP->ViewCustomAttributes = "";

        // Day3Cryoptop
        $this->Day3Cryoptop->ViewValue = $this->Day3Cryoptop->CurrentValue;
        $this->Day3Cryoptop->ViewCustomAttributes = "";

        // Day4CellNo
        $this->Day4CellNo->ViewValue = $this->Day4CellNo->CurrentValue;
        $this->Day4CellNo->ViewCustomAttributes = "";

        // Day4Frag
        $this->Day4Frag->ViewValue = $this->Day4Frag->CurrentValue;
        $this->Day4Frag->ViewCustomAttributes = "";

        // Day4Symmetry
        $this->Day4Symmetry->ViewValue = $this->Day4Symmetry->CurrentValue;
        $this->Day4Symmetry->ViewCustomAttributes = "";

        // Day4Grade
        $this->Day4Grade->ViewValue = $this->Day4Grade->CurrentValue;
        $this->Day4Grade->ViewCustomAttributes = "";

        // Day4Cryoptop
        $this->Day4Cryoptop->ViewValue = $this->Day4Cryoptop->CurrentValue;
        $this->Day4Cryoptop->ViewCustomAttributes = "";

        // Day5CellNo
        $this->Day5CellNo->ViewValue = $this->Day5CellNo->CurrentValue;
        $this->Day5CellNo->ViewCustomAttributes = "";

        // Day5ICM
        $this->Day5ICM->ViewValue = $this->Day5ICM->CurrentValue;
        $this->Day5ICM->ViewCustomAttributes = "";

        // Day5TE
        $this->Day5TE->ViewValue = $this->Day5TE->CurrentValue;
        $this->Day5TE->ViewCustomAttributes = "";

        // Day5Observation
        $this->Day5Observation->ViewValue = $this->Day5Observation->CurrentValue;
        $this->Day5Observation->ViewCustomAttributes = "";

        // Day5Collapsed
        $this->Day5Collapsed->ViewValue = $this->Day5Collapsed->CurrentValue;
        $this->Day5Collapsed->ViewCustomAttributes = "";

        // Day5Vacoulles
        $this->Day5Vacoulles->ViewValue = $this->Day5Vacoulles->CurrentValue;
        $this->Day5Vacoulles->ViewCustomAttributes = "";

        // Day5Grade
        $this->Day5Grade->ViewValue = $this->Day5Grade->CurrentValue;
        $this->Day5Grade->ViewCustomAttributes = "";

        // Day5Cryoptop
        $this->Day5Cryoptop->ViewValue = $this->Day5Cryoptop->CurrentValue;
        $this->Day5Cryoptop->ViewCustomAttributes = "";

        // Day6CellNo
        $this->Day6CellNo->ViewValue = $this->Day6CellNo->CurrentValue;
        $this->Day6CellNo->ViewCustomAttributes = "";

        // Day6ICM
        $this->Day6ICM->ViewValue = $this->Day6ICM->CurrentValue;
        $this->Day6ICM->ViewCustomAttributes = "";

        // Day6TE
        $this->Day6TE->ViewValue = $this->Day6TE->CurrentValue;
        $this->Day6TE->ViewCustomAttributes = "";

        // Day6Observation
        $this->Day6Observation->ViewValue = $this->Day6Observation->CurrentValue;
        $this->Day6Observation->ViewCustomAttributes = "";

        // Day6Collapsed
        $this->Day6Collapsed->ViewValue = $this->Day6Collapsed->CurrentValue;
        $this->Day6Collapsed->ViewCustomAttributes = "";

        // Day6Vacoulles
        $this->Day6Vacoulles->ViewValue = $this->Day6Vacoulles->CurrentValue;
        $this->Day6Vacoulles->ViewCustomAttributes = "";

        // Day6Grade
        $this->Day6Grade->ViewValue = $this->Day6Grade->CurrentValue;
        $this->Day6Grade->ViewCustomAttributes = "";

        // Day6Cryoptop
        $this->Day6Cryoptop->ViewValue = $this->Day6Cryoptop->CurrentValue;
        $this->Day6Cryoptop->ViewCustomAttributes = "";

        // EndingDay
        $this->EndingDay->ViewValue = $this->EndingDay->CurrentValue;
        $this->EndingDay->ViewCustomAttributes = "";

        // EndingCellStage
        $this->EndingCellStage->ViewValue = $this->EndingCellStage->CurrentValue;
        $this->EndingCellStage->ViewCustomAttributes = "";

        // EndingGrade
        $this->EndingGrade->ViewValue = $this->EndingGrade->CurrentValue;
        $this->EndingGrade->ViewCustomAttributes = "";

        // EndingState
        $this->EndingState->ViewValue = $this->EndingState->CurrentValue;
        $this->EndingState->ViewCustomAttributes = "";

        // Day0sino
        $this->Day0sino->ViewValue = $this->Day0sino->CurrentValue;
        $this->Day0sino->ViewCustomAttributes = "";

        // Day0Attempts
        $this->Day0Attempts->ViewValue = $this->Day0Attempts->CurrentValue;
        $this->Day0Attempts->ViewCustomAttributes = "";

        // Day0SPZMorpho
        $this->Day0SPZMorpho->ViewValue = $this->Day0SPZMorpho->CurrentValue;
        $this->Day0SPZMorpho->ViewCustomAttributes = "";

        // Day0SPZLocation
        $this->Day0SPZLocation->ViewValue = $this->Day0SPZLocation->CurrentValue;
        $this->Day0SPZLocation->ViewCustomAttributes = "";

        // Day2Grade
        $this->Day2Grade->ViewValue = $this->Day2Grade->CurrentValue;
        $this->Day2Grade->ViewCustomAttributes = "";

        // Day3Sino
        $this->Day3Sino->ViewValue = $this->Day3Sino->CurrentValue;
        $this->Day3Sino->ViewCustomAttributes = "";

        // Day3End
        $this->Day3End->ViewValue = $this->Day3End->CurrentValue;
        $this->Day3End->ViewCustomAttributes = "";

        // Day4SiNo
        $this->Day4SiNo->ViewValue = $this->Day4SiNo->CurrentValue;
        $this->Day4SiNo->ViewCustomAttributes = "";

        // TidNo
        $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
        $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
        $this->TidNo->ViewCustomAttributes = "";

        // Day0SpOrgin
        $this->Day0SpOrgin->ViewValue = $this->Day0SpOrgin->CurrentValue;
        $this->Day0SpOrgin->ViewCustomAttributes = "";

        // DidNO
        $this->DidNO->ViewValue = $this->DidNO->CurrentValue;
        $this->DidNO->ViewCustomAttributes = "";

        // ICSiIVFDateTime
        $this->ICSiIVFDateTime->ViewValue = $this->ICSiIVFDateTime->CurrentValue;
        $this->ICSiIVFDateTime->ViewValue = FormatDateTime($this->ICSiIVFDateTime->ViewValue, 0);
        $this->ICSiIVFDateTime->ViewCustomAttributes = "";

        // PrimaryEmbrologist
        $this->PrimaryEmbrologist->ViewValue = $this->PrimaryEmbrologist->CurrentValue;
        $this->PrimaryEmbrologist->ViewCustomAttributes = "";

        // SecondaryEmbrologist
        $this->SecondaryEmbrologist->ViewValue = $this->SecondaryEmbrologist->CurrentValue;
        $this->SecondaryEmbrologist->ViewCustomAttributes = "";

        // Incubator
        $this->Incubator->ViewValue = $this->Incubator->CurrentValue;
        $this->Incubator->ViewCustomAttributes = "";

        // location
        $this->location->ViewValue = $this->location->CurrentValue;
        $this->location->ViewCustomAttributes = "";

        // Remarks
        $this->Remarks->ViewValue = $this->Remarks->CurrentValue;
        $this->Remarks->ViewCustomAttributes = "";

        // OocyteNo
        $this->OocyteNo->ViewValue = $this->OocyteNo->CurrentValue;
        $this->OocyteNo->ViewCustomAttributes = "";

        // Stage
        $this->Stage->ViewValue = $this->Stage->CurrentValue;
        $this->Stage->ViewCustomAttributes = "";

        // vitrificationDate
        $this->vitrificationDate->ViewValue = $this->vitrificationDate->CurrentValue;
        $this->vitrificationDate->ViewValue = FormatDateTime($this->vitrificationDate->ViewValue, 0);
        $this->vitrificationDate->ViewCustomAttributes = "";

        // vitriPrimaryEmbryologist
        $this->vitriPrimaryEmbryologist->ViewValue = $this->vitriPrimaryEmbryologist->CurrentValue;
        $this->vitriPrimaryEmbryologist->ViewCustomAttributes = "";

        // vitriSecondaryEmbryologist
        $this->vitriSecondaryEmbryologist->ViewValue = $this->vitriSecondaryEmbryologist->CurrentValue;
        $this->vitriSecondaryEmbryologist->ViewCustomAttributes = "";

        // vitriEmbryoNo
        $this->vitriEmbryoNo->ViewValue = $this->vitriEmbryoNo->CurrentValue;
        $this->vitriEmbryoNo->ViewCustomAttributes = "";

        // vitriFertilisationDate
        $this->vitriFertilisationDate->ViewValue = $this->vitriFertilisationDate->CurrentValue;
        $this->vitriFertilisationDate->ViewValue = FormatDateTime($this->vitriFertilisationDate->ViewValue, 0);
        $this->vitriFertilisationDate->ViewCustomAttributes = "";

        // vitriDay
        $this->vitriDay->ViewValue = $this->vitriDay->CurrentValue;
        $this->vitriDay->ViewCustomAttributes = "";

        // vitriGrade
        $this->vitriGrade->ViewValue = $this->vitriGrade->CurrentValue;
        $this->vitriGrade->ViewCustomAttributes = "";

        // vitriIncubator
        $this->vitriIncubator->ViewValue = $this->vitriIncubator->CurrentValue;
        $this->vitriIncubator->ViewCustomAttributes = "";

        // vitriTank
        $this->vitriTank->ViewValue = $this->vitriTank->CurrentValue;
        $this->vitriTank->ViewCustomAttributes = "";

        // vitriCanister
        $this->vitriCanister->ViewValue = $this->vitriCanister->CurrentValue;
        $this->vitriCanister->ViewCustomAttributes = "";

        // vitriGobiet
        $this->vitriGobiet->ViewValue = $this->vitriGobiet->CurrentValue;
        $this->vitriGobiet->ViewCustomAttributes = "";

        // vitriViscotube
        $this->vitriViscotube->ViewValue = $this->vitriViscotube->CurrentValue;
        $this->vitriViscotube->ViewCustomAttributes = "";

        // vitriCryolockNo
        $this->vitriCryolockNo->ViewValue = $this->vitriCryolockNo->CurrentValue;
        $this->vitriCryolockNo->ViewCustomAttributes = "";

        // vitriCryolockColour
        $this->vitriCryolockColour->ViewValue = $this->vitriCryolockColour->CurrentValue;
        $this->vitriCryolockColour->ViewCustomAttributes = "";

        // vitriStage
        $this->vitriStage->ViewValue = $this->vitriStage->CurrentValue;
        $this->vitriStage->ViewCustomAttributes = "";

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

        // ETCatheter
        $this->ETCatheter->ViewValue = $this->ETCatheter->CurrentValue;
        $this->ETCatheter->ViewCustomAttributes = "";

        // ETDifficulty
        $this->ETDifficulty->ViewValue = $this->ETDifficulty->CurrentValue;
        $this->ETDifficulty->ViewCustomAttributes = "";

        // ETEasy
        $this->ETEasy->ViewValue = $this->ETEasy->CurrentValue;
        $this->ETEasy->ViewCustomAttributes = "";

        // ETComments
        $this->ETComments->ViewValue = $this->ETComments->CurrentValue;
        $this->ETComments->ViewCustomAttributes = "";

        // ETDoctor
        $this->ETDoctor->ViewValue = $this->ETDoctor->CurrentValue;
        $this->ETDoctor->ViewCustomAttributes = "";

        // ETEmbryologist
        $this->ETEmbryologist->ViewValue = $this->ETEmbryologist->CurrentValue;
        $this->ETEmbryologist->ViewCustomAttributes = "";

        // Day2End
        $this->Day2End->ViewValue = $this->Day2End->CurrentValue;
        $this->Day2End->ViewCustomAttributes = "";

        // Day2SiNo
        $this->Day2SiNo->ViewValue = $this->Day2SiNo->CurrentValue;
        $this->Day2SiNo->ViewCustomAttributes = "";

        // EndSiNo
        $this->EndSiNo->ViewValue = $this->EndSiNo->CurrentValue;
        $this->EndSiNo->ViewCustomAttributes = "";

        // Day4End
        $this->Day4End->ViewValue = $this->Day4End->CurrentValue;
        $this->Day4End->ViewCustomAttributes = "";

        // ETDate
        $this->ETDate->ViewValue = $this->ETDate->CurrentValue;
        $this->ETDate->ViewValue = FormatDateTime($this->ETDate->ViewValue, 0);
        $this->ETDate->ViewCustomAttributes = "";

        // Day1End
        $this->Day1End->ViewValue = $this->Day1End->CurrentValue;
        $this->Day1End->ViewCustomAttributes = "";

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

        // SpermOrigin
        $this->SpermOrigin->LinkCustomAttributes = "";
        $this->SpermOrigin->HrefValue = "";
        $this->SpermOrigin->TooltipValue = "";

        // InseminatinTechnique
        $this->InseminatinTechnique->LinkCustomAttributes = "";
        $this->InseminatinTechnique->HrefValue = "";
        $this->InseminatinTechnique->TooltipValue = "";

        // IndicationForART
        $this->IndicationForART->LinkCustomAttributes = "";
        $this->IndicationForART->HrefValue = "";
        $this->IndicationForART->TooltipValue = "";

        // Day0OocyteStage
        $this->Day0OocyteStage->LinkCustomAttributes = "";
        $this->Day0OocyteStage->HrefValue = "";
        $this->Day0OocyteStage->TooltipValue = "";

        // Day0PolarBodyPosition
        $this->Day0PolarBodyPosition->LinkCustomAttributes = "";
        $this->Day0PolarBodyPosition->HrefValue = "";
        $this->Day0PolarBodyPosition->TooltipValue = "";

        // Day0Breakage
        $this->Day0Breakage->LinkCustomAttributes = "";
        $this->Day0Breakage->HrefValue = "";
        $this->Day0Breakage->TooltipValue = "";

        // Day1PN
        $this->Day1PN->LinkCustomAttributes = "";
        $this->Day1PN->HrefValue = "";
        $this->Day1PN->TooltipValue = "";

        // Day1PB
        $this->Day1PB->LinkCustomAttributes = "";
        $this->Day1PB->HrefValue = "";
        $this->Day1PB->TooltipValue = "";

        // Day1Pronucleus
        $this->Day1Pronucleus->LinkCustomAttributes = "";
        $this->Day1Pronucleus->HrefValue = "";
        $this->Day1Pronucleus->TooltipValue = "";

        // Day1Nucleolus
        $this->Day1Nucleolus->LinkCustomAttributes = "";
        $this->Day1Nucleolus->HrefValue = "";
        $this->Day1Nucleolus->TooltipValue = "";

        // Day1Halo
        $this->Day1Halo->LinkCustomAttributes = "";
        $this->Day1Halo->HrefValue = "";
        $this->Day1Halo->TooltipValue = "";

        // Day1Sperm
        $this->Day1Sperm->LinkCustomAttributes = "";
        $this->Day1Sperm->HrefValue = "";
        $this->Day1Sperm->TooltipValue = "";

        // Day2CellNo
        $this->Day2CellNo->LinkCustomAttributes = "";
        $this->Day2CellNo->HrefValue = "";
        $this->Day2CellNo->TooltipValue = "";

        // Day2Frag
        $this->Day2Frag->LinkCustomAttributes = "";
        $this->Day2Frag->HrefValue = "";
        $this->Day2Frag->TooltipValue = "";

        // Day2Symmetry
        $this->Day2Symmetry->LinkCustomAttributes = "";
        $this->Day2Symmetry->HrefValue = "";
        $this->Day2Symmetry->TooltipValue = "";

        // Day2Cryoptop
        $this->Day2Cryoptop->LinkCustomAttributes = "";
        $this->Day2Cryoptop->HrefValue = "";
        $this->Day2Cryoptop->TooltipValue = "";

        // Day3CellNo
        $this->Day3CellNo->LinkCustomAttributes = "";
        $this->Day3CellNo->HrefValue = "";
        $this->Day3CellNo->TooltipValue = "";

        // Day3Frag
        $this->Day3Frag->LinkCustomAttributes = "";
        $this->Day3Frag->HrefValue = "";
        $this->Day3Frag->TooltipValue = "";

        // Day3Symmetry
        $this->Day3Symmetry->LinkCustomAttributes = "";
        $this->Day3Symmetry->HrefValue = "";
        $this->Day3Symmetry->TooltipValue = "";

        // Day3Grade
        $this->Day3Grade->LinkCustomAttributes = "";
        $this->Day3Grade->HrefValue = "";
        $this->Day3Grade->TooltipValue = "";

        // Day3Vacoules
        $this->Day3Vacoules->LinkCustomAttributes = "";
        $this->Day3Vacoules->HrefValue = "";
        $this->Day3Vacoules->TooltipValue = "";

        // Day3ZP
        $this->Day3ZP->LinkCustomAttributes = "";
        $this->Day3ZP->HrefValue = "";
        $this->Day3ZP->TooltipValue = "";

        // Day3Cryoptop
        $this->Day3Cryoptop->LinkCustomAttributes = "";
        $this->Day3Cryoptop->HrefValue = "";
        $this->Day3Cryoptop->TooltipValue = "";

        // Day4CellNo
        $this->Day4CellNo->LinkCustomAttributes = "";
        $this->Day4CellNo->HrefValue = "";
        $this->Day4CellNo->TooltipValue = "";

        // Day4Frag
        $this->Day4Frag->LinkCustomAttributes = "";
        $this->Day4Frag->HrefValue = "";
        $this->Day4Frag->TooltipValue = "";

        // Day4Symmetry
        $this->Day4Symmetry->LinkCustomAttributes = "";
        $this->Day4Symmetry->HrefValue = "";
        $this->Day4Symmetry->TooltipValue = "";

        // Day4Grade
        $this->Day4Grade->LinkCustomAttributes = "";
        $this->Day4Grade->HrefValue = "";
        $this->Day4Grade->TooltipValue = "";

        // Day4Cryoptop
        $this->Day4Cryoptop->LinkCustomAttributes = "";
        $this->Day4Cryoptop->HrefValue = "";
        $this->Day4Cryoptop->TooltipValue = "";

        // Day5CellNo
        $this->Day5CellNo->LinkCustomAttributes = "";
        $this->Day5CellNo->HrefValue = "";
        $this->Day5CellNo->TooltipValue = "";

        // Day5ICM
        $this->Day5ICM->LinkCustomAttributes = "";
        $this->Day5ICM->HrefValue = "";
        $this->Day5ICM->TooltipValue = "";

        // Day5TE
        $this->Day5TE->LinkCustomAttributes = "";
        $this->Day5TE->HrefValue = "";
        $this->Day5TE->TooltipValue = "";

        // Day5Observation
        $this->Day5Observation->LinkCustomAttributes = "";
        $this->Day5Observation->HrefValue = "";
        $this->Day5Observation->TooltipValue = "";

        // Day5Collapsed
        $this->Day5Collapsed->LinkCustomAttributes = "";
        $this->Day5Collapsed->HrefValue = "";
        $this->Day5Collapsed->TooltipValue = "";

        // Day5Vacoulles
        $this->Day5Vacoulles->LinkCustomAttributes = "";
        $this->Day5Vacoulles->HrefValue = "";
        $this->Day5Vacoulles->TooltipValue = "";

        // Day5Grade
        $this->Day5Grade->LinkCustomAttributes = "";
        $this->Day5Grade->HrefValue = "";
        $this->Day5Grade->TooltipValue = "";

        // Day5Cryoptop
        $this->Day5Cryoptop->LinkCustomAttributes = "";
        $this->Day5Cryoptop->HrefValue = "";
        $this->Day5Cryoptop->TooltipValue = "";

        // Day6CellNo
        $this->Day6CellNo->LinkCustomAttributes = "";
        $this->Day6CellNo->HrefValue = "";
        $this->Day6CellNo->TooltipValue = "";

        // Day6ICM
        $this->Day6ICM->LinkCustomAttributes = "";
        $this->Day6ICM->HrefValue = "";
        $this->Day6ICM->TooltipValue = "";

        // Day6TE
        $this->Day6TE->LinkCustomAttributes = "";
        $this->Day6TE->HrefValue = "";
        $this->Day6TE->TooltipValue = "";

        // Day6Observation
        $this->Day6Observation->LinkCustomAttributes = "";
        $this->Day6Observation->HrefValue = "";
        $this->Day6Observation->TooltipValue = "";

        // Day6Collapsed
        $this->Day6Collapsed->LinkCustomAttributes = "";
        $this->Day6Collapsed->HrefValue = "";
        $this->Day6Collapsed->TooltipValue = "";

        // Day6Vacoulles
        $this->Day6Vacoulles->LinkCustomAttributes = "";
        $this->Day6Vacoulles->HrefValue = "";
        $this->Day6Vacoulles->TooltipValue = "";

        // Day6Grade
        $this->Day6Grade->LinkCustomAttributes = "";
        $this->Day6Grade->HrefValue = "";
        $this->Day6Grade->TooltipValue = "";

        // Day6Cryoptop
        $this->Day6Cryoptop->LinkCustomAttributes = "";
        $this->Day6Cryoptop->HrefValue = "";
        $this->Day6Cryoptop->TooltipValue = "";

        // EndingDay
        $this->EndingDay->LinkCustomAttributes = "";
        $this->EndingDay->HrefValue = "";
        $this->EndingDay->TooltipValue = "";

        // EndingCellStage
        $this->EndingCellStage->LinkCustomAttributes = "";
        $this->EndingCellStage->HrefValue = "";
        $this->EndingCellStage->TooltipValue = "";

        // EndingGrade
        $this->EndingGrade->LinkCustomAttributes = "";
        $this->EndingGrade->HrefValue = "";
        $this->EndingGrade->TooltipValue = "";

        // EndingState
        $this->EndingState->LinkCustomAttributes = "";
        $this->EndingState->HrefValue = "";
        $this->EndingState->TooltipValue = "";

        // Day0sino
        $this->Day0sino->LinkCustomAttributes = "";
        $this->Day0sino->HrefValue = "";
        $this->Day0sino->TooltipValue = "";

        // Day0Attempts
        $this->Day0Attempts->LinkCustomAttributes = "";
        $this->Day0Attempts->HrefValue = "";
        $this->Day0Attempts->TooltipValue = "";

        // Day0SPZMorpho
        $this->Day0SPZMorpho->LinkCustomAttributes = "";
        $this->Day0SPZMorpho->HrefValue = "";
        $this->Day0SPZMorpho->TooltipValue = "";

        // Day0SPZLocation
        $this->Day0SPZLocation->LinkCustomAttributes = "";
        $this->Day0SPZLocation->HrefValue = "";
        $this->Day0SPZLocation->TooltipValue = "";

        // Day2Grade
        $this->Day2Grade->LinkCustomAttributes = "";
        $this->Day2Grade->HrefValue = "";
        $this->Day2Grade->TooltipValue = "";

        // Day3Sino
        $this->Day3Sino->LinkCustomAttributes = "";
        $this->Day3Sino->HrefValue = "";
        $this->Day3Sino->TooltipValue = "";

        // Day3End
        $this->Day3End->LinkCustomAttributes = "";
        $this->Day3End->HrefValue = "";
        $this->Day3End->TooltipValue = "";

        // Day4SiNo
        $this->Day4SiNo->LinkCustomAttributes = "";
        $this->Day4SiNo->HrefValue = "";
        $this->Day4SiNo->TooltipValue = "";

        // TidNo
        $this->TidNo->LinkCustomAttributes = "";
        $this->TidNo->HrefValue = "";
        $this->TidNo->TooltipValue = "";

        // Day0SpOrgin
        $this->Day0SpOrgin->LinkCustomAttributes = "";
        $this->Day0SpOrgin->HrefValue = "";
        $this->Day0SpOrgin->TooltipValue = "";

        // DidNO
        $this->DidNO->LinkCustomAttributes = "";
        $this->DidNO->HrefValue = "";
        $this->DidNO->TooltipValue = "";

        // ICSiIVFDateTime
        $this->ICSiIVFDateTime->LinkCustomAttributes = "";
        $this->ICSiIVFDateTime->HrefValue = "";
        $this->ICSiIVFDateTime->TooltipValue = "";

        // PrimaryEmbrologist
        $this->PrimaryEmbrologist->LinkCustomAttributes = "";
        $this->PrimaryEmbrologist->HrefValue = "";
        $this->PrimaryEmbrologist->TooltipValue = "";

        // SecondaryEmbrologist
        $this->SecondaryEmbrologist->LinkCustomAttributes = "";
        $this->SecondaryEmbrologist->HrefValue = "";
        $this->SecondaryEmbrologist->TooltipValue = "";

        // Incubator
        $this->Incubator->LinkCustomAttributes = "";
        $this->Incubator->HrefValue = "";
        $this->Incubator->TooltipValue = "";

        // location
        $this->location->LinkCustomAttributes = "";
        $this->location->HrefValue = "";
        $this->location->TooltipValue = "";

        // Remarks
        $this->Remarks->LinkCustomAttributes = "";
        $this->Remarks->HrefValue = "";
        $this->Remarks->TooltipValue = "";

        // OocyteNo
        $this->OocyteNo->LinkCustomAttributes = "";
        $this->OocyteNo->HrefValue = "";
        $this->OocyteNo->TooltipValue = "";

        // Stage
        $this->Stage->LinkCustomAttributes = "";
        $this->Stage->HrefValue = "";
        $this->Stage->TooltipValue = "";

        // vitrificationDate
        $this->vitrificationDate->LinkCustomAttributes = "";
        $this->vitrificationDate->HrefValue = "";
        $this->vitrificationDate->TooltipValue = "";

        // vitriPrimaryEmbryologist
        $this->vitriPrimaryEmbryologist->LinkCustomAttributes = "";
        $this->vitriPrimaryEmbryologist->HrefValue = "";
        $this->vitriPrimaryEmbryologist->TooltipValue = "";

        // vitriSecondaryEmbryologist
        $this->vitriSecondaryEmbryologist->LinkCustomAttributes = "";
        $this->vitriSecondaryEmbryologist->HrefValue = "";
        $this->vitriSecondaryEmbryologist->TooltipValue = "";

        // vitriEmbryoNo
        $this->vitriEmbryoNo->LinkCustomAttributes = "";
        $this->vitriEmbryoNo->HrefValue = "";
        $this->vitriEmbryoNo->TooltipValue = "";

        // vitriFertilisationDate
        $this->vitriFertilisationDate->LinkCustomAttributes = "";
        $this->vitriFertilisationDate->HrefValue = "";
        $this->vitriFertilisationDate->TooltipValue = "";

        // vitriDay
        $this->vitriDay->LinkCustomAttributes = "";
        $this->vitriDay->HrefValue = "";
        $this->vitriDay->TooltipValue = "";

        // vitriGrade
        $this->vitriGrade->LinkCustomAttributes = "";
        $this->vitriGrade->HrefValue = "";
        $this->vitriGrade->TooltipValue = "";

        // vitriIncubator
        $this->vitriIncubator->LinkCustomAttributes = "";
        $this->vitriIncubator->HrefValue = "";
        $this->vitriIncubator->TooltipValue = "";

        // vitriTank
        $this->vitriTank->LinkCustomAttributes = "";
        $this->vitriTank->HrefValue = "";
        $this->vitriTank->TooltipValue = "";

        // vitriCanister
        $this->vitriCanister->LinkCustomAttributes = "";
        $this->vitriCanister->HrefValue = "";
        $this->vitriCanister->TooltipValue = "";

        // vitriGobiet
        $this->vitriGobiet->LinkCustomAttributes = "";
        $this->vitriGobiet->HrefValue = "";
        $this->vitriGobiet->TooltipValue = "";

        // vitriViscotube
        $this->vitriViscotube->LinkCustomAttributes = "";
        $this->vitriViscotube->HrefValue = "";
        $this->vitriViscotube->TooltipValue = "";

        // vitriCryolockNo
        $this->vitriCryolockNo->LinkCustomAttributes = "";
        $this->vitriCryolockNo->HrefValue = "";
        $this->vitriCryolockNo->TooltipValue = "";

        // vitriCryolockColour
        $this->vitriCryolockColour->LinkCustomAttributes = "";
        $this->vitriCryolockColour->HrefValue = "";
        $this->vitriCryolockColour->TooltipValue = "";

        // vitriStage
        $this->vitriStage->LinkCustomAttributes = "";
        $this->vitriStage->HrefValue = "";
        $this->vitriStage->TooltipValue = "";

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

        // ETCatheter
        $this->ETCatheter->LinkCustomAttributes = "";
        $this->ETCatheter->HrefValue = "";
        $this->ETCatheter->TooltipValue = "";

        // ETDifficulty
        $this->ETDifficulty->LinkCustomAttributes = "";
        $this->ETDifficulty->HrefValue = "";
        $this->ETDifficulty->TooltipValue = "";

        // ETEasy
        $this->ETEasy->LinkCustomAttributes = "";
        $this->ETEasy->HrefValue = "";
        $this->ETEasy->TooltipValue = "";

        // ETComments
        $this->ETComments->LinkCustomAttributes = "";
        $this->ETComments->HrefValue = "";
        $this->ETComments->TooltipValue = "";

        // ETDoctor
        $this->ETDoctor->LinkCustomAttributes = "";
        $this->ETDoctor->HrefValue = "";
        $this->ETDoctor->TooltipValue = "";

        // ETEmbryologist
        $this->ETEmbryologist->LinkCustomAttributes = "";
        $this->ETEmbryologist->HrefValue = "";
        $this->ETEmbryologist->TooltipValue = "";

        // Day2End
        $this->Day2End->LinkCustomAttributes = "";
        $this->Day2End->HrefValue = "";
        $this->Day2End->TooltipValue = "";

        // Day2SiNo
        $this->Day2SiNo->LinkCustomAttributes = "";
        $this->Day2SiNo->HrefValue = "";
        $this->Day2SiNo->TooltipValue = "";

        // EndSiNo
        $this->EndSiNo->LinkCustomAttributes = "";
        $this->EndSiNo->HrefValue = "";
        $this->EndSiNo->TooltipValue = "";

        // Day4End
        $this->Day4End->LinkCustomAttributes = "";
        $this->Day4End->HrefValue = "";
        $this->Day4End->TooltipValue = "";

        // ETDate
        $this->ETDate->LinkCustomAttributes = "";
        $this->ETDate->HrefValue = "";
        $this->ETDate->TooltipValue = "";

        // Day1End
        $this->Day1End->LinkCustomAttributes = "";
        $this->Day1End->HrefValue = "";
        $this->Day1End->TooltipValue = "";

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

        // SpermOrigin
        $this->SpermOrigin->EditAttrs["class"] = "form-control";
        $this->SpermOrigin->EditCustomAttributes = "";
        if (!$this->SpermOrigin->Raw) {
            $this->SpermOrigin->CurrentValue = HtmlDecode($this->SpermOrigin->CurrentValue);
        }
        $this->SpermOrigin->EditValue = $this->SpermOrigin->CurrentValue;
        $this->SpermOrigin->PlaceHolder = RemoveHtml($this->SpermOrigin->caption());

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

        // Day0OocyteStage
        $this->Day0OocyteStage->EditAttrs["class"] = "form-control";
        $this->Day0OocyteStage->EditCustomAttributes = "";
        if (!$this->Day0OocyteStage->Raw) {
            $this->Day0OocyteStage->CurrentValue = HtmlDecode($this->Day0OocyteStage->CurrentValue);
        }
        $this->Day0OocyteStage->EditValue = $this->Day0OocyteStage->CurrentValue;
        $this->Day0OocyteStage->PlaceHolder = RemoveHtml($this->Day0OocyteStage->caption());

        // Day0PolarBodyPosition
        $this->Day0PolarBodyPosition->EditAttrs["class"] = "form-control";
        $this->Day0PolarBodyPosition->EditCustomAttributes = "";
        if (!$this->Day0PolarBodyPosition->Raw) {
            $this->Day0PolarBodyPosition->CurrentValue = HtmlDecode($this->Day0PolarBodyPosition->CurrentValue);
        }
        $this->Day0PolarBodyPosition->EditValue = $this->Day0PolarBodyPosition->CurrentValue;
        $this->Day0PolarBodyPosition->PlaceHolder = RemoveHtml($this->Day0PolarBodyPosition->caption());

        // Day0Breakage
        $this->Day0Breakage->EditAttrs["class"] = "form-control";
        $this->Day0Breakage->EditCustomAttributes = "";
        if (!$this->Day0Breakage->Raw) {
            $this->Day0Breakage->CurrentValue = HtmlDecode($this->Day0Breakage->CurrentValue);
        }
        $this->Day0Breakage->EditValue = $this->Day0Breakage->CurrentValue;
        $this->Day0Breakage->PlaceHolder = RemoveHtml($this->Day0Breakage->caption());

        // Day1PN
        $this->Day1PN->EditAttrs["class"] = "form-control";
        $this->Day1PN->EditCustomAttributes = "";
        if (!$this->Day1PN->Raw) {
            $this->Day1PN->CurrentValue = HtmlDecode($this->Day1PN->CurrentValue);
        }
        $this->Day1PN->EditValue = $this->Day1PN->CurrentValue;
        $this->Day1PN->PlaceHolder = RemoveHtml($this->Day1PN->caption());

        // Day1PB
        $this->Day1PB->EditAttrs["class"] = "form-control";
        $this->Day1PB->EditCustomAttributes = "";
        if (!$this->Day1PB->Raw) {
            $this->Day1PB->CurrentValue = HtmlDecode($this->Day1PB->CurrentValue);
        }
        $this->Day1PB->EditValue = $this->Day1PB->CurrentValue;
        $this->Day1PB->PlaceHolder = RemoveHtml($this->Day1PB->caption());

        // Day1Pronucleus
        $this->Day1Pronucleus->EditAttrs["class"] = "form-control";
        $this->Day1Pronucleus->EditCustomAttributes = "";
        if (!$this->Day1Pronucleus->Raw) {
            $this->Day1Pronucleus->CurrentValue = HtmlDecode($this->Day1Pronucleus->CurrentValue);
        }
        $this->Day1Pronucleus->EditValue = $this->Day1Pronucleus->CurrentValue;
        $this->Day1Pronucleus->PlaceHolder = RemoveHtml($this->Day1Pronucleus->caption());

        // Day1Nucleolus
        $this->Day1Nucleolus->EditAttrs["class"] = "form-control";
        $this->Day1Nucleolus->EditCustomAttributes = "";
        if (!$this->Day1Nucleolus->Raw) {
            $this->Day1Nucleolus->CurrentValue = HtmlDecode($this->Day1Nucleolus->CurrentValue);
        }
        $this->Day1Nucleolus->EditValue = $this->Day1Nucleolus->CurrentValue;
        $this->Day1Nucleolus->PlaceHolder = RemoveHtml($this->Day1Nucleolus->caption());

        // Day1Halo
        $this->Day1Halo->EditAttrs["class"] = "form-control";
        $this->Day1Halo->EditCustomAttributes = "";
        if (!$this->Day1Halo->Raw) {
            $this->Day1Halo->CurrentValue = HtmlDecode($this->Day1Halo->CurrentValue);
        }
        $this->Day1Halo->EditValue = $this->Day1Halo->CurrentValue;
        $this->Day1Halo->PlaceHolder = RemoveHtml($this->Day1Halo->caption());

        // Day1Sperm
        $this->Day1Sperm->EditAttrs["class"] = "form-control";
        $this->Day1Sperm->EditCustomAttributes = "";
        if (!$this->Day1Sperm->Raw) {
            $this->Day1Sperm->CurrentValue = HtmlDecode($this->Day1Sperm->CurrentValue);
        }
        $this->Day1Sperm->EditValue = $this->Day1Sperm->CurrentValue;
        $this->Day1Sperm->PlaceHolder = RemoveHtml($this->Day1Sperm->caption());

        // Day2CellNo
        $this->Day2CellNo->EditAttrs["class"] = "form-control";
        $this->Day2CellNo->EditCustomAttributes = "";
        if (!$this->Day2CellNo->Raw) {
            $this->Day2CellNo->CurrentValue = HtmlDecode($this->Day2CellNo->CurrentValue);
        }
        $this->Day2CellNo->EditValue = $this->Day2CellNo->CurrentValue;
        $this->Day2CellNo->PlaceHolder = RemoveHtml($this->Day2CellNo->caption());

        // Day2Frag
        $this->Day2Frag->EditAttrs["class"] = "form-control";
        $this->Day2Frag->EditCustomAttributes = "";
        if (!$this->Day2Frag->Raw) {
            $this->Day2Frag->CurrentValue = HtmlDecode($this->Day2Frag->CurrentValue);
        }
        $this->Day2Frag->EditValue = $this->Day2Frag->CurrentValue;
        $this->Day2Frag->PlaceHolder = RemoveHtml($this->Day2Frag->caption());

        // Day2Symmetry
        $this->Day2Symmetry->EditAttrs["class"] = "form-control";
        $this->Day2Symmetry->EditCustomAttributes = "";
        if (!$this->Day2Symmetry->Raw) {
            $this->Day2Symmetry->CurrentValue = HtmlDecode($this->Day2Symmetry->CurrentValue);
        }
        $this->Day2Symmetry->EditValue = $this->Day2Symmetry->CurrentValue;
        $this->Day2Symmetry->PlaceHolder = RemoveHtml($this->Day2Symmetry->caption());

        // Day2Cryoptop
        $this->Day2Cryoptop->EditAttrs["class"] = "form-control";
        $this->Day2Cryoptop->EditCustomAttributes = "";
        if (!$this->Day2Cryoptop->Raw) {
            $this->Day2Cryoptop->CurrentValue = HtmlDecode($this->Day2Cryoptop->CurrentValue);
        }
        $this->Day2Cryoptop->EditValue = $this->Day2Cryoptop->CurrentValue;
        $this->Day2Cryoptop->PlaceHolder = RemoveHtml($this->Day2Cryoptop->caption());

        // Day3CellNo
        $this->Day3CellNo->EditAttrs["class"] = "form-control";
        $this->Day3CellNo->EditCustomAttributes = "";
        if (!$this->Day3CellNo->Raw) {
            $this->Day3CellNo->CurrentValue = HtmlDecode($this->Day3CellNo->CurrentValue);
        }
        $this->Day3CellNo->EditValue = $this->Day3CellNo->CurrentValue;
        $this->Day3CellNo->PlaceHolder = RemoveHtml($this->Day3CellNo->caption());

        // Day3Frag
        $this->Day3Frag->EditAttrs["class"] = "form-control";
        $this->Day3Frag->EditCustomAttributes = "";
        if (!$this->Day3Frag->Raw) {
            $this->Day3Frag->CurrentValue = HtmlDecode($this->Day3Frag->CurrentValue);
        }
        $this->Day3Frag->EditValue = $this->Day3Frag->CurrentValue;
        $this->Day3Frag->PlaceHolder = RemoveHtml($this->Day3Frag->caption());

        // Day3Symmetry
        $this->Day3Symmetry->EditAttrs["class"] = "form-control";
        $this->Day3Symmetry->EditCustomAttributes = "";
        if (!$this->Day3Symmetry->Raw) {
            $this->Day3Symmetry->CurrentValue = HtmlDecode($this->Day3Symmetry->CurrentValue);
        }
        $this->Day3Symmetry->EditValue = $this->Day3Symmetry->CurrentValue;
        $this->Day3Symmetry->PlaceHolder = RemoveHtml($this->Day3Symmetry->caption());

        // Day3Grade
        $this->Day3Grade->EditAttrs["class"] = "form-control";
        $this->Day3Grade->EditCustomAttributes = "";
        if (!$this->Day3Grade->Raw) {
            $this->Day3Grade->CurrentValue = HtmlDecode($this->Day3Grade->CurrentValue);
        }
        $this->Day3Grade->EditValue = $this->Day3Grade->CurrentValue;
        $this->Day3Grade->PlaceHolder = RemoveHtml($this->Day3Grade->caption());

        // Day3Vacoules
        $this->Day3Vacoules->EditAttrs["class"] = "form-control";
        $this->Day3Vacoules->EditCustomAttributes = "";
        if (!$this->Day3Vacoules->Raw) {
            $this->Day3Vacoules->CurrentValue = HtmlDecode($this->Day3Vacoules->CurrentValue);
        }
        $this->Day3Vacoules->EditValue = $this->Day3Vacoules->CurrentValue;
        $this->Day3Vacoules->PlaceHolder = RemoveHtml($this->Day3Vacoules->caption());

        // Day3ZP
        $this->Day3ZP->EditAttrs["class"] = "form-control";
        $this->Day3ZP->EditCustomAttributes = "";
        if (!$this->Day3ZP->Raw) {
            $this->Day3ZP->CurrentValue = HtmlDecode($this->Day3ZP->CurrentValue);
        }
        $this->Day3ZP->EditValue = $this->Day3ZP->CurrentValue;
        $this->Day3ZP->PlaceHolder = RemoveHtml($this->Day3ZP->caption());

        // Day3Cryoptop
        $this->Day3Cryoptop->EditAttrs["class"] = "form-control";
        $this->Day3Cryoptop->EditCustomAttributes = "";
        if (!$this->Day3Cryoptop->Raw) {
            $this->Day3Cryoptop->CurrentValue = HtmlDecode($this->Day3Cryoptop->CurrentValue);
        }
        $this->Day3Cryoptop->EditValue = $this->Day3Cryoptop->CurrentValue;
        $this->Day3Cryoptop->PlaceHolder = RemoveHtml($this->Day3Cryoptop->caption());

        // Day4CellNo
        $this->Day4CellNo->EditAttrs["class"] = "form-control";
        $this->Day4CellNo->EditCustomAttributes = "";
        if (!$this->Day4CellNo->Raw) {
            $this->Day4CellNo->CurrentValue = HtmlDecode($this->Day4CellNo->CurrentValue);
        }
        $this->Day4CellNo->EditValue = $this->Day4CellNo->CurrentValue;
        $this->Day4CellNo->PlaceHolder = RemoveHtml($this->Day4CellNo->caption());

        // Day4Frag
        $this->Day4Frag->EditAttrs["class"] = "form-control";
        $this->Day4Frag->EditCustomAttributes = "";
        if (!$this->Day4Frag->Raw) {
            $this->Day4Frag->CurrentValue = HtmlDecode($this->Day4Frag->CurrentValue);
        }
        $this->Day4Frag->EditValue = $this->Day4Frag->CurrentValue;
        $this->Day4Frag->PlaceHolder = RemoveHtml($this->Day4Frag->caption());

        // Day4Symmetry
        $this->Day4Symmetry->EditAttrs["class"] = "form-control";
        $this->Day4Symmetry->EditCustomAttributes = "";
        if (!$this->Day4Symmetry->Raw) {
            $this->Day4Symmetry->CurrentValue = HtmlDecode($this->Day4Symmetry->CurrentValue);
        }
        $this->Day4Symmetry->EditValue = $this->Day4Symmetry->CurrentValue;
        $this->Day4Symmetry->PlaceHolder = RemoveHtml($this->Day4Symmetry->caption());

        // Day4Grade
        $this->Day4Grade->EditAttrs["class"] = "form-control";
        $this->Day4Grade->EditCustomAttributes = "";
        if (!$this->Day4Grade->Raw) {
            $this->Day4Grade->CurrentValue = HtmlDecode($this->Day4Grade->CurrentValue);
        }
        $this->Day4Grade->EditValue = $this->Day4Grade->CurrentValue;
        $this->Day4Grade->PlaceHolder = RemoveHtml($this->Day4Grade->caption());

        // Day4Cryoptop
        $this->Day4Cryoptop->EditAttrs["class"] = "form-control";
        $this->Day4Cryoptop->EditCustomAttributes = "";
        if (!$this->Day4Cryoptop->Raw) {
            $this->Day4Cryoptop->CurrentValue = HtmlDecode($this->Day4Cryoptop->CurrentValue);
        }
        $this->Day4Cryoptop->EditValue = $this->Day4Cryoptop->CurrentValue;
        $this->Day4Cryoptop->PlaceHolder = RemoveHtml($this->Day4Cryoptop->caption());

        // Day5CellNo
        $this->Day5CellNo->EditAttrs["class"] = "form-control";
        $this->Day5CellNo->EditCustomAttributes = "";
        if (!$this->Day5CellNo->Raw) {
            $this->Day5CellNo->CurrentValue = HtmlDecode($this->Day5CellNo->CurrentValue);
        }
        $this->Day5CellNo->EditValue = $this->Day5CellNo->CurrentValue;
        $this->Day5CellNo->PlaceHolder = RemoveHtml($this->Day5CellNo->caption());

        // Day5ICM
        $this->Day5ICM->EditAttrs["class"] = "form-control";
        $this->Day5ICM->EditCustomAttributes = "";
        if (!$this->Day5ICM->Raw) {
            $this->Day5ICM->CurrentValue = HtmlDecode($this->Day5ICM->CurrentValue);
        }
        $this->Day5ICM->EditValue = $this->Day5ICM->CurrentValue;
        $this->Day5ICM->PlaceHolder = RemoveHtml($this->Day5ICM->caption());

        // Day5TE
        $this->Day5TE->EditAttrs["class"] = "form-control";
        $this->Day5TE->EditCustomAttributes = "";
        if (!$this->Day5TE->Raw) {
            $this->Day5TE->CurrentValue = HtmlDecode($this->Day5TE->CurrentValue);
        }
        $this->Day5TE->EditValue = $this->Day5TE->CurrentValue;
        $this->Day5TE->PlaceHolder = RemoveHtml($this->Day5TE->caption());

        // Day5Observation
        $this->Day5Observation->EditAttrs["class"] = "form-control";
        $this->Day5Observation->EditCustomAttributes = "";
        if (!$this->Day5Observation->Raw) {
            $this->Day5Observation->CurrentValue = HtmlDecode($this->Day5Observation->CurrentValue);
        }
        $this->Day5Observation->EditValue = $this->Day5Observation->CurrentValue;
        $this->Day5Observation->PlaceHolder = RemoveHtml($this->Day5Observation->caption());

        // Day5Collapsed
        $this->Day5Collapsed->EditAttrs["class"] = "form-control";
        $this->Day5Collapsed->EditCustomAttributes = "";
        if (!$this->Day5Collapsed->Raw) {
            $this->Day5Collapsed->CurrentValue = HtmlDecode($this->Day5Collapsed->CurrentValue);
        }
        $this->Day5Collapsed->EditValue = $this->Day5Collapsed->CurrentValue;
        $this->Day5Collapsed->PlaceHolder = RemoveHtml($this->Day5Collapsed->caption());

        // Day5Vacoulles
        $this->Day5Vacoulles->EditAttrs["class"] = "form-control";
        $this->Day5Vacoulles->EditCustomAttributes = "";
        if (!$this->Day5Vacoulles->Raw) {
            $this->Day5Vacoulles->CurrentValue = HtmlDecode($this->Day5Vacoulles->CurrentValue);
        }
        $this->Day5Vacoulles->EditValue = $this->Day5Vacoulles->CurrentValue;
        $this->Day5Vacoulles->PlaceHolder = RemoveHtml($this->Day5Vacoulles->caption());

        // Day5Grade
        $this->Day5Grade->EditAttrs["class"] = "form-control";
        $this->Day5Grade->EditCustomAttributes = "";
        if (!$this->Day5Grade->Raw) {
            $this->Day5Grade->CurrentValue = HtmlDecode($this->Day5Grade->CurrentValue);
        }
        $this->Day5Grade->EditValue = $this->Day5Grade->CurrentValue;
        $this->Day5Grade->PlaceHolder = RemoveHtml($this->Day5Grade->caption());

        // Day5Cryoptop
        $this->Day5Cryoptop->EditAttrs["class"] = "form-control";
        $this->Day5Cryoptop->EditCustomAttributes = "";
        if (!$this->Day5Cryoptop->Raw) {
            $this->Day5Cryoptop->CurrentValue = HtmlDecode($this->Day5Cryoptop->CurrentValue);
        }
        $this->Day5Cryoptop->EditValue = $this->Day5Cryoptop->CurrentValue;
        $this->Day5Cryoptop->PlaceHolder = RemoveHtml($this->Day5Cryoptop->caption());

        // Day6CellNo
        $this->Day6CellNo->EditAttrs["class"] = "form-control";
        $this->Day6CellNo->EditCustomAttributes = "";
        if (!$this->Day6CellNo->Raw) {
            $this->Day6CellNo->CurrentValue = HtmlDecode($this->Day6CellNo->CurrentValue);
        }
        $this->Day6CellNo->EditValue = $this->Day6CellNo->CurrentValue;
        $this->Day6CellNo->PlaceHolder = RemoveHtml($this->Day6CellNo->caption());

        // Day6ICM
        $this->Day6ICM->EditAttrs["class"] = "form-control";
        $this->Day6ICM->EditCustomAttributes = "";
        if (!$this->Day6ICM->Raw) {
            $this->Day6ICM->CurrentValue = HtmlDecode($this->Day6ICM->CurrentValue);
        }
        $this->Day6ICM->EditValue = $this->Day6ICM->CurrentValue;
        $this->Day6ICM->PlaceHolder = RemoveHtml($this->Day6ICM->caption());

        // Day6TE
        $this->Day6TE->EditAttrs["class"] = "form-control";
        $this->Day6TE->EditCustomAttributes = "";
        if (!$this->Day6TE->Raw) {
            $this->Day6TE->CurrentValue = HtmlDecode($this->Day6TE->CurrentValue);
        }
        $this->Day6TE->EditValue = $this->Day6TE->CurrentValue;
        $this->Day6TE->PlaceHolder = RemoveHtml($this->Day6TE->caption());

        // Day6Observation
        $this->Day6Observation->EditAttrs["class"] = "form-control";
        $this->Day6Observation->EditCustomAttributes = "";
        if (!$this->Day6Observation->Raw) {
            $this->Day6Observation->CurrentValue = HtmlDecode($this->Day6Observation->CurrentValue);
        }
        $this->Day6Observation->EditValue = $this->Day6Observation->CurrentValue;
        $this->Day6Observation->PlaceHolder = RemoveHtml($this->Day6Observation->caption());

        // Day6Collapsed
        $this->Day6Collapsed->EditAttrs["class"] = "form-control";
        $this->Day6Collapsed->EditCustomAttributes = "";
        if (!$this->Day6Collapsed->Raw) {
            $this->Day6Collapsed->CurrentValue = HtmlDecode($this->Day6Collapsed->CurrentValue);
        }
        $this->Day6Collapsed->EditValue = $this->Day6Collapsed->CurrentValue;
        $this->Day6Collapsed->PlaceHolder = RemoveHtml($this->Day6Collapsed->caption());

        // Day6Vacoulles
        $this->Day6Vacoulles->EditAttrs["class"] = "form-control";
        $this->Day6Vacoulles->EditCustomAttributes = "";
        if (!$this->Day6Vacoulles->Raw) {
            $this->Day6Vacoulles->CurrentValue = HtmlDecode($this->Day6Vacoulles->CurrentValue);
        }
        $this->Day6Vacoulles->EditValue = $this->Day6Vacoulles->CurrentValue;
        $this->Day6Vacoulles->PlaceHolder = RemoveHtml($this->Day6Vacoulles->caption());

        // Day6Grade
        $this->Day6Grade->EditAttrs["class"] = "form-control";
        $this->Day6Grade->EditCustomAttributes = "";
        if (!$this->Day6Grade->Raw) {
            $this->Day6Grade->CurrentValue = HtmlDecode($this->Day6Grade->CurrentValue);
        }
        $this->Day6Grade->EditValue = $this->Day6Grade->CurrentValue;
        $this->Day6Grade->PlaceHolder = RemoveHtml($this->Day6Grade->caption());

        // Day6Cryoptop
        $this->Day6Cryoptop->EditAttrs["class"] = "form-control";
        $this->Day6Cryoptop->EditCustomAttributes = "";
        if (!$this->Day6Cryoptop->Raw) {
            $this->Day6Cryoptop->CurrentValue = HtmlDecode($this->Day6Cryoptop->CurrentValue);
        }
        $this->Day6Cryoptop->EditValue = $this->Day6Cryoptop->CurrentValue;
        $this->Day6Cryoptop->PlaceHolder = RemoveHtml($this->Day6Cryoptop->caption());

        // EndingDay
        $this->EndingDay->EditAttrs["class"] = "form-control";
        $this->EndingDay->EditCustomAttributes = "";
        if (!$this->EndingDay->Raw) {
            $this->EndingDay->CurrentValue = HtmlDecode($this->EndingDay->CurrentValue);
        }
        $this->EndingDay->EditValue = $this->EndingDay->CurrentValue;
        $this->EndingDay->PlaceHolder = RemoveHtml($this->EndingDay->caption());

        // EndingCellStage
        $this->EndingCellStage->EditAttrs["class"] = "form-control";
        $this->EndingCellStage->EditCustomAttributes = "";
        if (!$this->EndingCellStage->Raw) {
            $this->EndingCellStage->CurrentValue = HtmlDecode($this->EndingCellStage->CurrentValue);
        }
        $this->EndingCellStage->EditValue = $this->EndingCellStage->CurrentValue;
        $this->EndingCellStage->PlaceHolder = RemoveHtml($this->EndingCellStage->caption());

        // EndingGrade
        $this->EndingGrade->EditAttrs["class"] = "form-control";
        $this->EndingGrade->EditCustomAttributes = "";
        if (!$this->EndingGrade->Raw) {
            $this->EndingGrade->CurrentValue = HtmlDecode($this->EndingGrade->CurrentValue);
        }
        $this->EndingGrade->EditValue = $this->EndingGrade->CurrentValue;
        $this->EndingGrade->PlaceHolder = RemoveHtml($this->EndingGrade->caption());

        // EndingState
        $this->EndingState->EditAttrs["class"] = "form-control";
        $this->EndingState->EditCustomAttributes = "";
        if (!$this->EndingState->Raw) {
            $this->EndingState->CurrentValue = HtmlDecode($this->EndingState->CurrentValue);
        }
        $this->EndingState->EditValue = $this->EndingState->CurrentValue;
        $this->EndingState->PlaceHolder = RemoveHtml($this->EndingState->caption());

        // Day0sino
        $this->Day0sino->EditAttrs["class"] = "form-control";
        $this->Day0sino->EditCustomAttributes = "";
        if (!$this->Day0sino->Raw) {
            $this->Day0sino->CurrentValue = HtmlDecode($this->Day0sino->CurrentValue);
        }
        $this->Day0sino->EditValue = $this->Day0sino->CurrentValue;
        $this->Day0sino->PlaceHolder = RemoveHtml($this->Day0sino->caption());

        // Day0Attempts
        $this->Day0Attempts->EditAttrs["class"] = "form-control";
        $this->Day0Attempts->EditCustomAttributes = "";
        if (!$this->Day0Attempts->Raw) {
            $this->Day0Attempts->CurrentValue = HtmlDecode($this->Day0Attempts->CurrentValue);
        }
        $this->Day0Attempts->EditValue = $this->Day0Attempts->CurrentValue;
        $this->Day0Attempts->PlaceHolder = RemoveHtml($this->Day0Attempts->caption());

        // Day0SPZMorpho
        $this->Day0SPZMorpho->EditAttrs["class"] = "form-control";
        $this->Day0SPZMorpho->EditCustomAttributes = "";
        if (!$this->Day0SPZMorpho->Raw) {
            $this->Day0SPZMorpho->CurrentValue = HtmlDecode($this->Day0SPZMorpho->CurrentValue);
        }
        $this->Day0SPZMorpho->EditValue = $this->Day0SPZMorpho->CurrentValue;
        $this->Day0SPZMorpho->PlaceHolder = RemoveHtml($this->Day0SPZMorpho->caption());

        // Day0SPZLocation
        $this->Day0SPZLocation->EditAttrs["class"] = "form-control";
        $this->Day0SPZLocation->EditCustomAttributes = "";
        if (!$this->Day0SPZLocation->Raw) {
            $this->Day0SPZLocation->CurrentValue = HtmlDecode($this->Day0SPZLocation->CurrentValue);
        }
        $this->Day0SPZLocation->EditValue = $this->Day0SPZLocation->CurrentValue;
        $this->Day0SPZLocation->PlaceHolder = RemoveHtml($this->Day0SPZLocation->caption());

        // Day2Grade
        $this->Day2Grade->EditAttrs["class"] = "form-control";
        $this->Day2Grade->EditCustomAttributes = "";
        if (!$this->Day2Grade->Raw) {
            $this->Day2Grade->CurrentValue = HtmlDecode($this->Day2Grade->CurrentValue);
        }
        $this->Day2Grade->EditValue = $this->Day2Grade->CurrentValue;
        $this->Day2Grade->PlaceHolder = RemoveHtml($this->Day2Grade->caption());

        // Day3Sino
        $this->Day3Sino->EditAttrs["class"] = "form-control";
        $this->Day3Sino->EditCustomAttributes = "";
        if (!$this->Day3Sino->Raw) {
            $this->Day3Sino->CurrentValue = HtmlDecode($this->Day3Sino->CurrentValue);
        }
        $this->Day3Sino->EditValue = $this->Day3Sino->CurrentValue;
        $this->Day3Sino->PlaceHolder = RemoveHtml($this->Day3Sino->caption());

        // Day3End
        $this->Day3End->EditAttrs["class"] = "form-control";
        $this->Day3End->EditCustomAttributes = "";
        if (!$this->Day3End->Raw) {
            $this->Day3End->CurrentValue = HtmlDecode($this->Day3End->CurrentValue);
        }
        $this->Day3End->EditValue = $this->Day3End->CurrentValue;
        $this->Day3End->PlaceHolder = RemoveHtml($this->Day3End->caption());

        // Day4SiNo
        $this->Day4SiNo->EditAttrs["class"] = "form-control";
        $this->Day4SiNo->EditCustomAttributes = "";
        if (!$this->Day4SiNo->Raw) {
            $this->Day4SiNo->CurrentValue = HtmlDecode($this->Day4SiNo->CurrentValue);
        }
        $this->Day4SiNo->EditValue = $this->Day4SiNo->CurrentValue;
        $this->Day4SiNo->PlaceHolder = RemoveHtml($this->Day4SiNo->caption());

        // TidNo
        $this->TidNo->EditAttrs["class"] = "form-control";
        $this->TidNo->EditCustomAttributes = "";
        $this->TidNo->EditValue = $this->TidNo->CurrentValue;
        $this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

        // Day0SpOrgin
        $this->Day0SpOrgin->EditAttrs["class"] = "form-control";
        $this->Day0SpOrgin->EditCustomAttributes = "";
        if (!$this->Day0SpOrgin->Raw) {
            $this->Day0SpOrgin->CurrentValue = HtmlDecode($this->Day0SpOrgin->CurrentValue);
        }
        $this->Day0SpOrgin->EditValue = $this->Day0SpOrgin->CurrentValue;
        $this->Day0SpOrgin->PlaceHolder = RemoveHtml($this->Day0SpOrgin->caption());

        // DidNO
        $this->DidNO->EditAttrs["class"] = "form-control";
        $this->DidNO->EditCustomAttributes = "";
        if (!$this->DidNO->Raw) {
            $this->DidNO->CurrentValue = HtmlDecode($this->DidNO->CurrentValue);
        }
        $this->DidNO->EditValue = $this->DidNO->CurrentValue;
        $this->DidNO->PlaceHolder = RemoveHtml($this->DidNO->caption());

        // ICSiIVFDateTime
        $this->ICSiIVFDateTime->EditAttrs["class"] = "form-control";
        $this->ICSiIVFDateTime->EditCustomAttributes = "";
        $this->ICSiIVFDateTime->EditValue = FormatDateTime($this->ICSiIVFDateTime->CurrentValue, 8);
        $this->ICSiIVFDateTime->PlaceHolder = RemoveHtml($this->ICSiIVFDateTime->caption());

        // PrimaryEmbrologist
        $this->PrimaryEmbrologist->EditAttrs["class"] = "form-control";
        $this->PrimaryEmbrologist->EditCustomAttributes = "";
        if (!$this->PrimaryEmbrologist->Raw) {
            $this->PrimaryEmbrologist->CurrentValue = HtmlDecode($this->PrimaryEmbrologist->CurrentValue);
        }
        $this->PrimaryEmbrologist->EditValue = $this->PrimaryEmbrologist->CurrentValue;
        $this->PrimaryEmbrologist->PlaceHolder = RemoveHtml($this->PrimaryEmbrologist->caption());

        // SecondaryEmbrologist
        $this->SecondaryEmbrologist->EditAttrs["class"] = "form-control";
        $this->SecondaryEmbrologist->EditCustomAttributes = "";
        if (!$this->SecondaryEmbrologist->Raw) {
            $this->SecondaryEmbrologist->CurrentValue = HtmlDecode($this->SecondaryEmbrologist->CurrentValue);
        }
        $this->SecondaryEmbrologist->EditValue = $this->SecondaryEmbrologist->CurrentValue;
        $this->SecondaryEmbrologist->PlaceHolder = RemoveHtml($this->SecondaryEmbrologist->caption());

        // Incubator
        $this->Incubator->EditAttrs["class"] = "form-control";
        $this->Incubator->EditCustomAttributes = "";
        if (!$this->Incubator->Raw) {
            $this->Incubator->CurrentValue = HtmlDecode($this->Incubator->CurrentValue);
        }
        $this->Incubator->EditValue = $this->Incubator->CurrentValue;
        $this->Incubator->PlaceHolder = RemoveHtml($this->Incubator->caption());

        // location
        $this->location->EditAttrs["class"] = "form-control";
        $this->location->EditCustomAttributes = "";
        if (!$this->location->Raw) {
            $this->location->CurrentValue = HtmlDecode($this->location->CurrentValue);
        }
        $this->location->EditValue = $this->location->CurrentValue;
        $this->location->PlaceHolder = RemoveHtml($this->location->caption());

        // Remarks
        $this->Remarks->EditAttrs["class"] = "form-control";
        $this->Remarks->EditCustomAttributes = "";
        if (!$this->Remarks->Raw) {
            $this->Remarks->CurrentValue = HtmlDecode($this->Remarks->CurrentValue);
        }
        $this->Remarks->EditValue = $this->Remarks->CurrentValue;
        $this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

        // OocyteNo
        $this->OocyteNo->EditAttrs["class"] = "form-control";
        $this->OocyteNo->EditCustomAttributes = "";
        if (!$this->OocyteNo->Raw) {
            $this->OocyteNo->CurrentValue = HtmlDecode($this->OocyteNo->CurrentValue);
        }
        $this->OocyteNo->EditValue = $this->OocyteNo->CurrentValue;
        $this->OocyteNo->PlaceHolder = RemoveHtml($this->OocyteNo->caption());

        // Stage
        $this->Stage->EditAttrs["class"] = "form-control";
        $this->Stage->EditCustomAttributes = "";
        if (!$this->Stage->Raw) {
            $this->Stage->CurrentValue = HtmlDecode($this->Stage->CurrentValue);
        }
        $this->Stage->EditValue = $this->Stage->CurrentValue;
        $this->Stage->PlaceHolder = RemoveHtml($this->Stage->caption());

        // vitrificationDate
        $this->vitrificationDate->EditAttrs["class"] = "form-control";
        $this->vitrificationDate->EditCustomAttributes = "";
        $this->vitrificationDate->EditValue = FormatDateTime($this->vitrificationDate->CurrentValue, 8);
        $this->vitrificationDate->PlaceHolder = RemoveHtml($this->vitrificationDate->caption());

        // vitriPrimaryEmbryologist
        $this->vitriPrimaryEmbryologist->EditAttrs["class"] = "form-control";
        $this->vitriPrimaryEmbryologist->EditCustomAttributes = "";
        if (!$this->vitriPrimaryEmbryologist->Raw) {
            $this->vitriPrimaryEmbryologist->CurrentValue = HtmlDecode($this->vitriPrimaryEmbryologist->CurrentValue);
        }
        $this->vitriPrimaryEmbryologist->EditValue = $this->vitriPrimaryEmbryologist->CurrentValue;
        $this->vitriPrimaryEmbryologist->PlaceHolder = RemoveHtml($this->vitriPrimaryEmbryologist->caption());

        // vitriSecondaryEmbryologist
        $this->vitriSecondaryEmbryologist->EditAttrs["class"] = "form-control";
        $this->vitriSecondaryEmbryologist->EditCustomAttributes = "";
        if (!$this->vitriSecondaryEmbryologist->Raw) {
            $this->vitriSecondaryEmbryologist->CurrentValue = HtmlDecode($this->vitriSecondaryEmbryologist->CurrentValue);
        }
        $this->vitriSecondaryEmbryologist->EditValue = $this->vitriSecondaryEmbryologist->CurrentValue;
        $this->vitriSecondaryEmbryologist->PlaceHolder = RemoveHtml($this->vitriSecondaryEmbryologist->caption());

        // vitriEmbryoNo
        $this->vitriEmbryoNo->EditAttrs["class"] = "form-control";
        $this->vitriEmbryoNo->EditCustomAttributes = "";
        if (!$this->vitriEmbryoNo->Raw) {
            $this->vitriEmbryoNo->CurrentValue = HtmlDecode($this->vitriEmbryoNo->CurrentValue);
        }
        $this->vitriEmbryoNo->EditValue = $this->vitriEmbryoNo->CurrentValue;
        $this->vitriEmbryoNo->PlaceHolder = RemoveHtml($this->vitriEmbryoNo->caption());

        // vitriFertilisationDate
        $this->vitriFertilisationDate->EditAttrs["class"] = "form-control";
        $this->vitriFertilisationDate->EditCustomAttributes = "";
        $this->vitriFertilisationDate->EditValue = FormatDateTime($this->vitriFertilisationDate->CurrentValue, 8);
        $this->vitriFertilisationDate->PlaceHolder = RemoveHtml($this->vitriFertilisationDate->caption());

        // vitriDay
        $this->vitriDay->EditAttrs["class"] = "form-control";
        $this->vitriDay->EditCustomAttributes = "";
        if (!$this->vitriDay->Raw) {
            $this->vitriDay->CurrentValue = HtmlDecode($this->vitriDay->CurrentValue);
        }
        $this->vitriDay->EditValue = $this->vitriDay->CurrentValue;
        $this->vitriDay->PlaceHolder = RemoveHtml($this->vitriDay->caption());

        // vitriGrade
        $this->vitriGrade->EditAttrs["class"] = "form-control";
        $this->vitriGrade->EditCustomAttributes = "";
        if (!$this->vitriGrade->Raw) {
            $this->vitriGrade->CurrentValue = HtmlDecode($this->vitriGrade->CurrentValue);
        }
        $this->vitriGrade->EditValue = $this->vitriGrade->CurrentValue;
        $this->vitriGrade->PlaceHolder = RemoveHtml($this->vitriGrade->caption());

        // vitriIncubator
        $this->vitriIncubator->EditAttrs["class"] = "form-control";
        $this->vitriIncubator->EditCustomAttributes = "";
        if (!$this->vitriIncubator->Raw) {
            $this->vitriIncubator->CurrentValue = HtmlDecode($this->vitriIncubator->CurrentValue);
        }
        $this->vitriIncubator->EditValue = $this->vitriIncubator->CurrentValue;
        $this->vitriIncubator->PlaceHolder = RemoveHtml($this->vitriIncubator->caption());

        // vitriTank
        $this->vitriTank->EditAttrs["class"] = "form-control";
        $this->vitriTank->EditCustomAttributes = "";
        if (!$this->vitriTank->Raw) {
            $this->vitriTank->CurrentValue = HtmlDecode($this->vitriTank->CurrentValue);
        }
        $this->vitriTank->EditValue = $this->vitriTank->CurrentValue;
        $this->vitriTank->PlaceHolder = RemoveHtml($this->vitriTank->caption());

        // vitriCanister
        $this->vitriCanister->EditAttrs["class"] = "form-control";
        $this->vitriCanister->EditCustomAttributes = "";
        if (!$this->vitriCanister->Raw) {
            $this->vitriCanister->CurrentValue = HtmlDecode($this->vitriCanister->CurrentValue);
        }
        $this->vitriCanister->EditValue = $this->vitriCanister->CurrentValue;
        $this->vitriCanister->PlaceHolder = RemoveHtml($this->vitriCanister->caption());

        // vitriGobiet
        $this->vitriGobiet->EditAttrs["class"] = "form-control";
        $this->vitriGobiet->EditCustomAttributes = "";
        if (!$this->vitriGobiet->Raw) {
            $this->vitriGobiet->CurrentValue = HtmlDecode($this->vitriGobiet->CurrentValue);
        }
        $this->vitriGobiet->EditValue = $this->vitriGobiet->CurrentValue;
        $this->vitriGobiet->PlaceHolder = RemoveHtml($this->vitriGobiet->caption());

        // vitriViscotube
        $this->vitriViscotube->EditAttrs["class"] = "form-control";
        $this->vitriViscotube->EditCustomAttributes = "";
        if (!$this->vitriViscotube->Raw) {
            $this->vitriViscotube->CurrentValue = HtmlDecode($this->vitriViscotube->CurrentValue);
        }
        $this->vitriViscotube->EditValue = $this->vitriViscotube->CurrentValue;
        $this->vitriViscotube->PlaceHolder = RemoveHtml($this->vitriViscotube->caption());

        // vitriCryolockNo
        $this->vitriCryolockNo->EditAttrs["class"] = "form-control";
        $this->vitriCryolockNo->EditCustomAttributes = "";
        if (!$this->vitriCryolockNo->Raw) {
            $this->vitriCryolockNo->CurrentValue = HtmlDecode($this->vitriCryolockNo->CurrentValue);
        }
        $this->vitriCryolockNo->EditValue = $this->vitriCryolockNo->CurrentValue;
        $this->vitriCryolockNo->PlaceHolder = RemoveHtml($this->vitriCryolockNo->caption());

        // vitriCryolockColour
        $this->vitriCryolockColour->EditAttrs["class"] = "form-control";
        $this->vitriCryolockColour->EditCustomAttributes = "";
        if (!$this->vitriCryolockColour->Raw) {
            $this->vitriCryolockColour->CurrentValue = HtmlDecode($this->vitriCryolockColour->CurrentValue);
        }
        $this->vitriCryolockColour->EditValue = $this->vitriCryolockColour->CurrentValue;
        $this->vitriCryolockColour->PlaceHolder = RemoveHtml($this->vitriCryolockColour->caption());

        // vitriStage
        $this->vitriStage->EditAttrs["class"] = "form-control";
        $this->vitriStage->EditCustomAttributes = "";
        if (!$this->vitriStage->Raw) {
            $this->vitriStage->CurrentValue = HtmlDecode($this->vitriStage->CurrentValue);
        }
        $this->vitriStage->EditValue = $this->vitriStage->CurrentValue;
        $this->vitriStage->PlaceHolder = RemoveHtml($this->vitriStage->caption());

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

        // ETCatheter
        $this->ETCatheter->EditAttrs["class"] = "form-control";
        $this->ETCatheter->EditCustomAttributes = "";
        if (!$this->ETCatheter->Raw) {
            $this->ETCatheter->CurrentValue = HtmlDecode($this->ETCatheter->CurrentValue);
        }
        $this->ETCatheter->EditValue = $this->ETCatheter->CurrentValue;
        $this->ETCatheter->PlaceHolder = RemoveHtml($this->ETCatheter->caption());

        // ETDifficulty
        $this->ETDifficulty->EditAttrs["class"] = "form-control";
        $this->ETDifficulty->EditCustomAttributes = "";
        if (!$this->ETDifficulty->Raw) {
            $this->ETDifficulty->CurrentValue = HtmlDecode($this->ETDifficulty->CurrentValue);
        }
        $this->ETDifficulty->EditValue = $this->ETDifficulty->CurrentValue;
        $this->ETDifficulty->PlaceHolder = RemoveHtml($this->ETDifficulty->caption());

        // ETEasy
        $this->ETEasy->EditAttrs["class"] = "form-control";
        $this->ETEasy->EditCustomAttributes = "";
        if (!$this->ETEasy->Raw) {
            $this->ETEasy->CurrentValue = HtmlDecode($this->ETEasy->CurrentValue);
        }
        $this->ETEasy->EditValue = $this->ETEasy->CurrentValue;
        $this->ETEasy->PlaceHolder = RemoveHtml($this->ETEasy->caption());

        // ETComments
        $this->ETComments->EditAttrs["class"] = "form-control";
        $this->ETComments->EditCustomAttributes = "";
        if (!$this->ETComments->Raw) {
            $this->ETComments->CurrentValue = HtmlDecode($this->ETComments->CurrentValue);
        }
        $this->ETComments->EditValue = $this->ETComments->CurrentValue;
        $this->ETComments->PlaceHolder = RemoveHtml($this->ETComments->caption());

        // ETDoctor
        $this->ETDoctor->EditAttrs["class"] = "form-control";
        $this->ETDoctor->EditCustomAttributes = "";
        if (!$this->ETDoctor->Raw) {
            $this->ETDoctor->CurrentValue = HtmlDecode($this->ETDoctor->CurrentValue);
        }
        $this->ETDoctor->EditValue = $this->ETDoctor->CurrentValue;
        $this->ETDoctor->PlaceHolder = RemoveHtml($this->ETDoctor->caption());

        // ETEmbryologist
        $this->ETEmbryologist->EditAttrs["class"] = "form-control";
        $this->ETEmbryologist->EditCustomAttributes = "";
        if (!$this->ETEmbryologist->Raw) {
            $this->ETEmbryologist->CurrentValue = HtmlDecode($this->ETEmbryologist->CurrentValue);
        }
        $this->ETEmbryologist->EditValue = $this->ETEmbryologist->CurrentValue;
        $this->ETEmbryologist->PlaceHolder = RemoveHtml($this->ETEmbryologist->caption());

        // Day2End
        $this->Day2End->EditAttrs["class"] = "form-control";
        $this->Day2End->EditCustomAttributes = "";
        if (!$this->Day2End->Raw) {
            $this->Day2End->CurrentValue = HtmlDecode($this->Day2End->CurrentValue);
        }
        $this->Day2End->EditValue = $this->Day2End->CurrentValue;
        $this->Day2End->PlaceHolder = RemoveHtml($this->Day2End->caption());

        // Day2SiNo
        $this->Day2SiNo->EditAttrs["class"] = "form-control";
        $this->Day2SiNo->EditCustomAttributes = "";
        if (!$this->Day2SiNo->Raw) {
            $this->Day2SiNo->CurrentValue = HtmlDecode($this->Day2SiNo->CurrentValue);
        }
        $this->Day2SiNo->EditValue = $this->Day2SiNo->CurrentValue;
        $this->Day2SiNo->PlaceHolder = RemoveHtml($this->Day2SiNo->caption());

        // EndSiNo
        $this->EndSiNo->EditAttrs["class"] = "form-control";
        $this->EndSiNo->EditCustomAttributes = "";
        if (!$this->EndSiNo->Raw) {
            $this->EndSiNo->CurrentValue = HtmlDecode($this->EndSiNo->CurrentValue);
        }
        $this->EndSiNo->EditValue = $this->EndSiNo->CurrentValue;
        $this->EndSiNo->PlaceHolder = RemoveHtml($this->EndSiNo->caption());

        // Day4End
        $this->Day4End->EditAttrs["class"] = "form-control";
        $this->Day4End->EditCustomAttributes = "";
        if (!$this->Day4End->Raw) {
            $this->Day4End->CurrentValue = HtmlDecode($this->Day4End->CurrentValue);
        }
        $this->Day4End->EditValue = $this->Day4End->CurrentValue;
        $this->Day4End->PlaceHolder = RemoveHtml($this->Day4End->caption());

        // ETDate
        $this->ETDate->EditAttrs["class"] = "form-control";
        $this->ETDate->EditCustomAttributes = "";
        $this->ETDate->EditValue = FormatDateTime($this->ETDate->CurrentValue, 8);
        $this->ETDate->PlaceHolder = RemoveHtml($this->ETDate->caption());

        // Day1End
        $this->Day1End->EditAttrs["class"] = "form-control";
        $this->Day1End->EditCustomAttributes = "";
        if (!$this->Day1End->Raw) {
            $this->Day1End->CurrentValue = HtmlDecode($this->Day1End->CurrentValue);
        }
        $this->Day1End->EditValue = $this->Day1End->CurrentValue;
        $this->Day1End->PlaceHolder = RemoveHtml($this->Day1End->caption());

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
                    $doc->exportCaption($this->SpermOrigin);
                    $doc->exportCaption($this->InseminatinTechnique);
                    $doc->exportCaption($this->IndicationForART);
                    $doc->exportCaption($this->Day0OocyteStage);
                    $doc->exportCaption($this->Day0PolarBodyPosition);
                    $doc->exportCaption($this->Day0Breakage);
                    $doc->exportCaption($this->Day1PN);
                    $doc->exportCaption($this->Day1PB);
                    $doc->exportCaption($this->Day1Pronucleus);
                    $doc->exportCaption($this->Day1Nucleolus);
                    $doc->exportCaption($this->Day1Halo);
                    $doc->exportCaption($this->Day1Sperm);
                    $doc->exportCaption($this->Day2CellNo);
                    $doc->exportCaption($this->Day2Frag);
                    $doc->exportCaption($this->Day2Symmetry);
                    $doc->exportCaption($this->Day2Cryoptop);
                    $doc->exportCaption($this->Day3CellNo);
                    $doc->exportCaption($this->Day3Frag);
                    $doc->exportCaption($this->Day3Symmetry);
                    $doc->exportCaption($this->Day3Grade);
                    $doc->exportCaption($this->Day3Vacoules);
                    $doc->exportCaption($this->Day3ZP);
                    $doc->exportCaption($this->Day3Cryoptop);
                    $doc->exportCaption($this->Day4CellNo);
                    $doc->exportCaption($this->Day4Frag);
                    $doc->exportCaption($this->Day4Symmetry);
                    $doc->exportCaption($this->Day4Grade);
                    $doc->exportCaption($this->Day4Cryoptop);
                    $doc->exportCaption($this->Day5CellNo);
                    $doc->exportCaption($this->Day5ICM);
                    $doc->exportCaption($this->Day5TE);
                    $doc->exportCaption($this->Day5Observation);
                    $doc->exportCaption($this->Day5Collapsed);
                    $doc->exportCaption($this->Day5Vacoulles);
                    $doc->exportCaption($this->Day5Grade);
                    $doc->exportCaption($this->Day5Cryoptop);
                    $doc->exportCaption($this->Day6CellNo);
                    $doc->exportCaption($this->Day6ICM);
                    $doc->exportCaption($this->Day6TE);
                    $doc->exportCaption($this->Day6Observation);
                    $doc->exportCaption($this->Day6Collapsed);
                    $doc->exportCaption($this->Day6Vacoulles);
                    $doc->exportCaption($this->Day6Grade);
                    $doc->exportCaption($this->Day6Cryoptop);
                    $doc->exportCaption($this->EndingDay);
                    $doc->exportCaption($this->EndingCellStage);
                    $doc->exportCaption($this->EndingGrade);
                    $doc->exportCaption($this->EndingState);
                    $doc->exportCaption($this->Day0sino);
                    $doc->exportCaption($this->Day0Attempts);
                    $doc->exportCaption($this->Day0SPZMorpho);
                    $doc->exportCaption($this->Day0SPZLocation);
                    $doc->exportCaption($this->Day2Grade);
                    $doc->exportCaption($this->Day3Sino);
                    $doc->exportCaption($this->Day3End);
                    $doc->exportCaption($this->Day4SiNo);
                    $doc->exportCaption($this->TidNo);
                    $doc->exportCaption($this->Day0SpOrgin);
                    $doc->exportCaption($this->DidNO);
                    $doc->exportCaption($this->ICSiIVFDateTime);
                    $doc->exportCaption($this->PrimaryEmbrologist);
                    $doc->exportCaption($this->SecondaryEmbrologist);
                    $doc->exportCaption($this->Incubator);
                    $doc->exportCaption($this->location);
                    $doc->exportCaption($this->Remarks);
                    $doc->exportCaption($this->OocyteNo);
                    $doc->exportCaption($this->Stage);
                    $doc->exportCaption($this->vitrificationDate);
                    $doc->exportCaption($this->vitriPrimaryEmbryologist);
                    $doc->exportCaption($this->vitriSecondaryEmbryologist);
                    $doc->exportCaption($this->vitriEmbryoNo);
                    $doc->exportCaption($this->vitriFertilisationDate);
                    $doc->exportCaption($this->vitriDay);
                    $doc->exportCaption($this->vitriGrade);
                    $doc->exportCaption($this->vitriIncubator);
                    $doc->exportCaption($this->vitriTank);
                    $doc->exportCaption($this->vitriCanister);
                    $doc->exportCaption($this->vitriGobiet);
                    $doc->exportCaption($this->vitriViscotube);
                    $doc->exportCaption($this->vitriCryolockNo);
                    $doc->exportCaption($this->vitriCryolockColour);
                    $doc->exportCaption($this->vitriStage);
                    $doc->exportCaption($this->thawDate);
                    $doc->exportCaption($this->thawPrimaryEmbryologist);
                    $doc->exportCaption($this->thawSecondaryEmbryologist);
                    $doc->exportCaption($this->thawET);
                    $doc->exportCaption($this->thawReFrozen);
                    $doc->exportCaption($this->thawAbserve);
                    $doc->exportCaption($this->thawDiscard);
                    $doc->exportCaption($this->ETCatheter);
                    $doc->exportCaption($this->ETDifficulty);
                    $doc->exportCaption($this->ETEasy);
                    $doc->exportCaption($this->ETComments);
                    $doc->exportCaption($this->ETDoctor);
                    $doc->exportCaption($this->ETEmbryologist);
                    $doc->exportCaption($this->Day2End);
                    $doc->exportCaption($this->Day2SiNo);
                    $doc->exportCaption($this->EndSiNo);
                    $doc->exportCaption($this->Day4End);
                    $doc->exportCaption($this->ETDate);
                    $doc->exportCaption($this->Day1End);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->RIDNo);
                    $doc->exportCaption($this->Name);
                    $doc->exportCaption($this->ARTCycle);
                    $doc->exportCaption($this->SpermOrigin);
                    $doc->exportCaption($this->InseminatinTechnique);
                    $doc->exportCaption($this->IndicationForART);
                    $doc->exportCaption($this->Day0OocyteStage);
                    $doc->exportCaption($this->Day0PolarBodyPosition);
                    $doc->exportCaption($this->Day0Breakage);
                    $doc->exportCaption($this->Day1PN);
                    $doc->exportCaption($this->Day1PB);
                    $doc->exportCaption($this->Day1Pronucleus);
                    $doc->exportCaption($this->Day1Nucleolus);
                    $doc->exportCaption($this->Day1Halo);
                    $doc->exportCaption($this->Day1Sperm);
                    $doc->exportCaption($this->Day2CellNo);
                    $doc->exportCaption($this->Day2Frag);
                    $doc->exportCaption($this->Day2Symmetry);
                    $doc->exportCaption($this->Day2Cryoptop);
                    $doc->exportCaption($this->Day3CellNo);
                    $doc->exportCaption($this->Day3Frag);
                    $doc->exportCaption($this->Day3Symmetry);
                    $doc->exportCaption($this->Day3Grade);
                    $doc->exportCaption($this->Day3Vacoules);
                    $doc->exportCaption($this->Day3ZP);
                    $doc->exportCaption($this->Day3Cryoptop);
                    $doc->exportCaption($this->Day4CellNo);
                    $doc->exportCaption($this->Day4Frag);
                    $doc->exportCaption($this->Day4Symmetry);
                    $doc->exportCaption($this->Day4Grade);
                    $doc->exportCaption($this->Day4Cryoptop);
                    $doc->exportCaption($this->Day5CellNo);
                    $doc->exportCaption($this->Day5ICM);
                    $doc->exportCaption($this->Day5TE);
                    $doc->exportCaption($this->Day5Observation);
                    $doc->exportCaption($this->Day5Collapsed);
                    $doc->exportCaption($this->Day5Vacoulles);
                    $doc->exportCaption($this->Day5Grade);
                    $doc->exportCaption($this->Day5Cryoptop);
                    $doc->exportCaption($this->Day6CellNo);
                    $doc->exportCaption($this->Day6ICM);
                    $doc->exportCaption($this->Day6TE);
                    $doc->exportCaption($this->Day6Observation);
                    $doc->exportCaption($this->Day6Collapsed);
                    $doc->exportCaption($this->Day6Vacoulles);
                    $doc->exportCaption($this->Day6Grade);
                    $doc->exportCaption($this->Day6Cryoptop);
                    $doc->exportCaption($this->EndingDay);
                    $doc->exportCaption($this->EndingCellStage);
                    $doc->exportCaption($this->EndingGrade);
                    $doc->exportCaption($this->EndingState);
                    $doc->exportCaption($this->Day0sino);
                    $doc->exportCaption($this->Day0Attempts);
                    $doc->exportCaption($this->Day0SPZMorpho);
                    $doc->exportCaption($this->Day0SPZLocation);
                    $doc->exportCaption($this->Day2Grade);
                    $doc->exportCaption($this->Day3Sino);
                    $doc->exportCaption($this->Day3End);
                    $doc->exportCaption($this->Day4SiNo);
                    $doc->exportCaption($this->TidNo);
                    $doc->exportCaption($this->Day0SpOrgin);
                    $doc->exportCaption($this->DidNO);
                    $doc->exportCaption($this->ICSiIVFDateTime);
                    $doc->exportCaption($this->PrimaryEmbrologist);
                    $doc->exportCaption($this->SecondaryEmbrologist);
                    $doc->exportCaption($this->Incubator);
                    $doc->exportCaption($this->location);
                    $doc->exportCaption($this->Remarks);
                    $doc->exportCaption($this->OocyteNo);
                    $doc->exportCaption($this->Stage);
                    $doc->exportCaption($this->vitrificationDate);
                    $doc->exportCaption($this->vitriPrimaryEmbryologist);
                    $doc->exportCaption($this->vitriSecondaryEmbryologist);
                    $doc->exportCaption($this->vitriEmbryoNo);
                    $doc->exportCaption($this->vitriFertilisationDate);
                    $doc->exportCaption($this->vitriDay);
                    $doc->exportCaption($this->vitriGrade);
                    $doc->exportCaption($this->vitriIncubator);
                    $doc->exportCaption($this->vitriTank);
                    $doc->exportCaption($this->vitriCanister);
                    $doc->exportCaption($this->vitriGobiet);
                    $doc->exportCaption($this->vitriViscotube);
                    $doc->exportCaption($this->vitriCryolockNo);
                    $doc->exportCaption($this->vitriCryolockColour);
                    $doc->exportCaption($this->vitriStage);
                    $doc->exportCaption($this->thawDate);
                    $doc->exportCaption($this->thawPrimaryEmbryologist);
                    $doc->exportCaption($this->thawSecondaryEmbryologist);
                    $doc->exportCaption($this->thawET);
                    $doc->exportCaption($this->thawReFrozen);
                    $doc->exportCaption($this->thawAbserve);
                    $doc->exportCaption($this->thawDiscard);
                    $doc->exportCaption($this->ETCatheter);
                    $doc->exportCaption($this->ETDifficulty);
                    $doc->exportCaption($this->ETEasy);
                    $doc->exportCaption($this->ETComments);
                    $doc->exportCaption($this->ETDoctor);
                    $doc->exportCaption($this->ETEmbryologist);
                    $doc->exportCaption($this->Day2End);
                    $doc->exportCaption($this->Day2SiNo);
                    $doc->exportCaption($this->EndSiNo);
                    $doc->exportCaption($this->Day4End);
                    $doc->exportCaption($this->ETDate);
                    $doc->exportCaption($this->Day1End);
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
                        $doc->exportField($this->SpermOrigin);
                        $doc->exportField($this->InseminatinTechnique);
                        $doc->exportField($this->IndicationForART);
                        $doc->exportField($this->Day0OocyteStage);
                        $doc->exportField($this->Day0PolarBodyPosition);
                        $doc->exportField($this->Day0Breakage);
                        $doc->exportField($this->Day1PN);
                        $doc->exportField($this->Day1PB);
                        $doc->exportField($this->Day1Pronucleus);
                        $doc->exportField($this->Day1Nucleolus);
                        $doc->exportField($this->Day1Halo);
                        $doc->exportField($this->Day1Sperm);
                        $doc->exportField($this->Day2CellNo);
                        $doc->exportField($this->Day2Frag);
                        $doc->exportField($this->Day2Symmetry);
                        $doc->exportField($this->Day2Cryoptop);
                        $doc->exportField($this->Day3CellNo);
                        $doc->exportField($this->Day3Frag);
                        $doc->exportField($this->Day3Symmetry);
                        $doc->exportField($this->Day3Grade);
                        $doc->exportField($this->Day3Vacoules);
                        $doc->exportField($this->Day3ZP);
                        $doc->exportField($this->Day3Cryoptop);
                        $doc->exportField($this->Day4CellNo);
                        $doc->exportField($this->Day4Frag);
                        $doc->exportField($this->Day4Symmetry);
                        $doc->exportField($this->Day4Grade);
                        $doc->exportField($this->Day4Cryoptop);
                        $doc->exportField($this->Day5CellNo);
                        $doc->exportField($this->Day5ICM);
                        $doc->exportField($this->Day5TE);
                        $doc->exportField($this->Day5Observation);
                        $doc->exportField($this->Day5Collapsed);
                        $doc->exportField($this->Day5Vacoulles);
                        $doc->exportField($this->Day5Grade);
                        $doc->exportField($this->Day5Cryoptop);
                        $doc->exportField($this->Day6CellNo);
                        $doc->exportField($this->Day6ICM);
                        $doc->exportField($this->Day6TE);
                        $doc->exportField($this->Day6Observation);
                        $doc->exportField($this->Day6Collapsed);
                        $doc->exportField($this->Day6Vacoulles);
                        $doc->exportField($this->Day6Grade);
                        $doc->exportField($this->Day6Cryoptop);
                        $doc->exportField($this->EndingDay);
                        $doc->exportField($this->EndingCellStage);
                        $doc->exportField($this->EndingGrade);
                        $doc->exportField($this->EndingState);
                        $doc->exportField($this->Day0sino);
                        $doc->exportField($this->Day0Attempts);
                        $doc->exportField($this->Day0SPZMorpho);
                        $doc->exportField($this->Day0SPZLocation);
                        $doc->exportField($this->Day2Grade);
                        $doc->exportField($this->Day3Sino);
                        $doc->exportField($this->Day3End);
                        $doc->exportField($this->Day4SiNo);
                        $doc->exportField($this->TidNo);
                        $doc->exportField($this->Day0SpOrgin);
                        $doc->exportField($this->DidNO);
                        $doc->exportField($this->ICSiIVFDateTime);
                        $doc->exportField($this->PrimaryEmbrologist);
                        $doc->exportField($this->SecondaryEmbrologist);
                        $doc->exportField($this->Incubator);
                        $doc->exportField($this->location);
                        $doc->exportField($this->Remarks);
                        $doc->exportField($this->OocyteNo);
                        $doc->exportField($this->Stage);
                        $doc->exportField($this->vitrificationDate);
                        $doc->exportField($this->vitriPrimaryEmbryologist);
                        $doc->exportField($this->vitriSecondaryEmbryologist);
                        $doc->exportField($this->vitriEmbryoNo);
                        $doc->exportField($this->vitriFertilisationDate);
                        $doc->exportField($this->vitriDay);
                        $doc->exportField($this->vitriGrade);
                        $doc->exportField($this->vitriIncubator);
                        $doc->exportField($this->vitriTank);
                        $doc->exportField($this->vitriCanister);
                        $doc->exportField($this->vitriGobiet);
                        $doc->exportField($this->vitriViscotube);
                        $doc->exportField($this->vitriCryolockNo);
                        $doc->exportField($this->vitriCryolockColour);
                        $doc->exportField($this->vitriStage);
                        $doc->exportField($this->thawDate);
                        $doc->exportField($this->thawPrimaryEmbryologist);
                        $doc->exportField($this->thawSecondaryEmbryologist);
                        $doc->exportField($this->thawET);
                        $doc->exportField($this->thawReFrozen);
                        $doc->exportField($this->thawAbserve);
                        $doc->exportField($this->thawDiscard);
                        $doc->exportField($this->ETCatheter);
                        $doc->exportField($this->ETDifficulty);
                        $doc->exportField($this->ETEasy);
                        $doc->exportField($this->ETComments);
                        $doc->exportField($this->ETDoctor);
                        $doc->exportField($this->ETEmbryologist);
                        $doc->exportField($this->Day2End);
                        $doc->exportField($this->Day2SiNo);
                        $doc->exportField($this->EndSiNo);
                        $doc->exportField($this->Day4End);
                        $doc->exportField($this->ETDate);
                        $doc->exportField($this->Day1End);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->RIDNo);
                        $doc->exportField($this->Name);
                        $doc->exportField($this->ARTCycle);
                        $doc->exportField($this->SpermOrigin);
                        $doc->exportField($this->InseminatinTechnique);
                        $doc->exportField($this->IndicationForART);
                        $doc->exportField($this->Day0OocyteStage);
                        $doc->exportField($this->Day0PolarBodyPosition);
                        $doc->exportField($this->Day0Breakage);
                        $doc->exportField($this->Day1PN);
                        $doc->exportField($this->Day1PB);
                        $doc->exportField($this->Day1Pronucleus);
                        $doc->exportField($this->Day1Nucleolus);
                        $doc->exportField($this->Day1Halo);
                        $doc->exportField($this->Day1Sperm);
                        $doc->exportField($this->Day2CellNo);
                        $doc->exportField($this->Day2Frag);
                        $doc->exportField($this->Day2Symmetry);
                        $doc->exportField($this->Day2Cryoptop);
                        $doc->exportField($this->Day3CellNo);
                        $doc->exportField($this->Day3Frag);
                        $doc->exportField($this->Day3Symmetry);
                        $doc->exportField($this->Day3Grade);
                        $doc->exportField($this->Day3Vacoules);
                        $doc->exportField($this->Day3ZP);
                        $doc->exportField($this->Day3Cryoptop);
                        $doc->exportField($this->Day4CellNo);
                        $doc->exportField($this->Day4Frag);
                        $doc->exportField($this->Day4Symmetry);
                        $doc->exportField($this->Day4Grade);
                        $doc->exportField($this->Day4Cryoptop);
                        $doc->exportField($this->Day5CellNo);
                        $doc->exportField($this->Day5ICM);
                        $doc->exportField($this->Day5TE);
                        $doc->exportField($this->Day5Observation);
                        $doc->exportField($this->Day5Collapsed);
                        $doc->exportField($this->Day5Vacoulles);
                        $doc->exportField($this->Day5Grade);
                        $doc->exportField($this->Day5Cryoptop);
                        $doc->exportField($this->Day6CellNo);
                        $doc->exportField($this->Day6ICM);
                        $doc->exportField($this->Day6TE);
                        $doc->exportField($this->Day6Observation);
                        $doc->exportField($this->Day6Collapsed);
                        $doc->exportField($this->Day6Vacoulles);
                        $doc->exportField($this->Day6Grade);
                        $doc->exportField($this->Day6Cryoptop);
                        $doc->exportField($this->EndingDay);
                        $doc->exportField($this->EndingCellStage);
                        $doc->exportField($this->EndingGrade);
                        $doc->exportField($this->EndingState);
                        $doc->exportField($this->Day0sino);
                        $doc->exportField($this->Day0Attempts);
                        $doc->exportField($this->Day0SPZMorpho);
                        $doc->exportField($this->Day0SPZLocation);
                        $doc->exportField($this->Day2Grade);
                        $doc->exportField($this->Day3Sino);
                        $doc->exportField($this->Day3End);
                        $doc->exportField($this->Day4SiNo);
                        $doc->exportField($this->TidNo);
                        $doc->exportField($this->Day0SpOrgin);
                        $doc->exportField($this->DidNO);
                        $doc->exportField($this->ICSiIVFDateTime);
                        $doc->exportField($this->PrimaryEmbrologist);
                        $doc->exportField($this->SecondaryEmbrologist);
                        $doc->exportField($this->Incubator);
                        $doc->exportField($this->location);
                        $doc->exportField($this->Remarks);
                        $doc->exportField($this->OocyteNo);
                        $doc->exportField($this->Stage);
                        $doc->exportField($this->vitrificationDate);
                        $doc->exportField($this->vitriPrimaryEmbryologist);
                        $doc->exportField($this->vitriSecondaryEmbryologist);
                        $doc->exportField($this->vitriEmbryoNo);
                        $doc->exportField($this->vitriFertilisationDate);
                        $doc->exportField($this->vitriDay);
                        $doc->exportField($this->vitriGrade);
                        $doc->exportField($this->vitriIncubator);
                        $doc->exportField($this->vitriTank);
                        $doc->exportField($this->vitriCanister);
                        $doc->exportField($this->vitriGobiet);
                        $doc->exportField($this->vitriViscotube);
                        $doc->exportField($this->vitriCryolockNo);
                        $doc->exportField($this->vitriCryolockColour);
                        $doc->exportField($this->vitriStage);
                        $doc->exportField($this->thawDate);
                        $doc->exportField($this->thawPrimaryEmbryologist);
                        $doc->exportField($this->thawSecondaryEmbryologist);
                        $doc->exportField($this->thawET);
                        $doc->exportField($this->thawReFrozen);
                        $doc->exportField($this->thawAbserve);
                        $doc->exportField($this->thawDiscard);
                        $doc->exportField($this->ETCatheter);
                        $doc->exportField($this->ETDifficulty);
                        $doc->exportField($this->ETEasy);
                        $doc->exportField($this->ETComments);
                        $doc->exportField($this->ETDoctor);
                        $doc->exportField($this->ETEmbryologist);
                        $doc->exportField($this->Day2End);
                        $doc->exportField($this->Day2SiNo);
                        $doc->exportField($this->EndSiNo);
                        $doc->exportField($this->Day4End);
                        $doc->exportField($this->ETDate);
                        $doc->exportField($this->Day1End);
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
