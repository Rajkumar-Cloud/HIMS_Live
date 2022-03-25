<?php

namespace PHPMaker2021\HIMS;

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
    public $Day0sino;
    public $Day0OocyteStage;
    public $Day0PolarBodyPosition;
    public $Day0Breakage;
    public $Day0Attempts;
    public $Day0SPZMorpho;
    public $Day0SPZLocation;
    public $Day0SpOrgin;
    public $Day5Cryoptop;
    public $Day1Sperm;
    public $Day1PN;
    public $Day1PB;
    public $Day1Pronucleus;
    public $Day1Nucleolus;
    public $Day1Halo;
    public $Day2SiNo;
    public $Day2CellNo;
    public $Day2Frag;
    public $Day2Symmetry;
    public $Day2Cryoptop;
    public $Day2Grade;
    public $Day2End;
    public $Day3Sino;
    public $Day3CellNo;
    public $Day3Frag;
    public $Day3Symmetry;
    public $Day3ZP;
    public $Day3Vacoules;
    public $Day3Grade;
    public $Day3Cryoptop;
    public $Day3End;
    public $Day4SiNo;
    public $Day4CellNo;
    public $Day4Frag;
    public $Day4Symmetry;
    public $Day4Grade;
    public $Day4Cryoptop;
    public $Day4End;
    public $Day5CellNo;
    public $Day5ICM;
    public $Day5TE;
    public $Day5Observation;
    public $Day5Collapsed;
    public $Day5Vacoulles;
    public $Day5Grade;
    public $Day6CellNo;
    public $Day6ICM;
    public $Day6TE;
    public $Day6Observation;
    public $Day6Collapsed;
    public $Day6Vacoulles;
    public $Day6Grade;
    public $Day6Cryoptop;
    public $EndSiNo;
    public $EndingDay;
    public $EndingCellStage;
    public $EndingGrade;
    public $EndingState;
    public $TidNo;
    public $DidNO;
    public $ICSiIVFDateTime;
    public $PrimaryEmbrologist;
    public $SecondaryEmbrologist;
    public $Incubator;
    public $location;
    public $OocyteNo;
    public $Stage;
    public $Remarks;
    public $vitrificationDate;
    public $vitriPrimaryEmbryologist;
    public $vitriSecondaryEmbryologist;
    public $vitriEmbryoNo;
    public $thawReFrozen;
    public $vitriFertilisationDate;
    public $vitriDay;
    public $vitriStage;
    public $vitriGrade;
    public $vitriIncubator;
    public $vitriTank;
    public $vitriCanister;
    public $vitriGobiet;
    public $vitriViscotube;
    public $vitriCryolockNo;
    public $vitriCryolockColour;
    public $thawDate;
    public $thawPrimaryEmbryologist;
    public $thawSecondaryEmbryologist;
    public $thawET;
    public $thawAbserve;
    public $thawDiscard;
    public $ETCatheter;
    public $ETDifficulty;
    public $ETEasy;
    public $ETComments;
    public $ETDoctor;
    public $ETEmbryologist;
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
        $this->DetailEdit = true; // Allow detail edit
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
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // RIDNo
        $this->RIDNo = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_RIDNo', 'RIDNo', '`RIDNo`', '`RIDNo`', 3, 11, -1, false, '`RIDNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RIDNo->IsForeignKey = true; // Foreign key field
        $this->RIDNo->Nullable = false; // NOT NULL field
        $this->RIDNo->Required = true; // Required field
        $this->RIDNo->Sortable = true; // Allow sort
        $this->RIDNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->RIDNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RIDNo->Param, "CustomMsg");
        $this->Fields['RIDNo'] = &$this->RIDNo;

        // Name
        $this->Name = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Name', 'Name', '`Name`', '`Name`', 200, 45, -1, false, '`Name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Name->IsForeignKey = true; // Foreign key field
        $this->Name->Sortable = true; // Allow sort
        $this->Name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Name->Param, "CustomMsg");
        $this->Fields['Name'] = &$this->Name;

        // ARTCycle
        $this->ARTCycle = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_ARTCycle', 'ARTCycle', '`ARTCycle`', '`ARTCycle`', 200, 45, -1, false, '`ARTCycle`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ARTCycle->Sortable = true; // Allow sort
        $this->ARTCycle->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ARTCycle->Param, "CustomMsg");
        $this->Fields['ARTCycle'] = &$this->ARTCycle;

        // SpermOrigin
        $this->SpermOrigin = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_SpermOrigin', 'SpermOrigin', '`SpermOrigin`', '`SpermOrigin`', 200, 45, -1, false, '`SpermOrigin`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SpermOrigin->Sortable = true; // Allow sort
        $this->SpermOrigin->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SpermOrigin->Param, "CustomMsg");
        $this->Fields['SpermOrigin'] = &$this->SpermOrigin;

        // InseminatinTechnique
        $this->InseminatinTechnique = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_InseminatinTechnique', 'InseminatinTechnique', '`InseminatinTechnique`', '`InseminatinTechnique`', 200, 45, -1, false, '`InseminatinTechnique`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->InseminatinTechnique->Sortable = true; // Allow sort
        $this->InseminatinTechnique->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->InseminatinTechnique->Param, "CustomMsg");
        $this->Fields['InseminatinTechnique'] = &$this->InseminatinTechnique;

        // IndicationForART
        $this->IndicationForART = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_IndicationForART', 'IndicationForART', '`IndicationForART`', '`IndicationForART`', 200, 45, -1, false, '`IndicationForART`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IndicationForART->Sortable = true; // Allow sort
        $this->IndicationForART->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IndicationForART->Param, "CustomMsg");
        $this->Fields['IndicationForART'] = &$this->IndicationForART;

        // Day0sino
        $this->Day0sino = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day0sino', 'Day0sino', '`Day0sino`', '`Day0sino`', 200, 45, -1, false, '`Day0sino`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day0sino->Sortable = true; // Allow sort
        $this->Day0sino->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day0sino->Param, "CustomMsg");
        $this->Fields['Day0sino'] = &$this->Day0sino;

        // Day0OocyteStage
        $this->Day0OocyteStage = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day0OocyteStage', 'Day0OocyteStage', '`Day0OocyteStage`', '`Day0OocyteStage`', 200, 45, -1, false, '`Day0OocyteStage`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day0OocyteStage->Sortable = true; // Allow sort
        $this->Day0OocyteStage->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day0OocyteStage->Param, "CustomMsg");
        $this->Fields['Day0OocyteStage'] = &$this->Day0OocyteStage;

        // Day0PolarBodyPosition
        $this->Day0PolarBodyPosition = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day0PolarBodyPosition', 'Day0PolarBodyPosition', '`Day0PolarBodyPosition`', '`Day0PolarBodyPosition`', 200, 45, -1, false, '`Day0PolarBodyPosition`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day0PolarBodyPosition->Sortable = true; // Allow sort
        $this->Day0PolarBodyPosition->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day0PolarBodyPosition->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day0PolarBodyPosition->Lookup = new Lookup('Day0PolarBodyPosition', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day0PolarBodyPosition->OptionCount = 3;
        $this->Day0PolarBodyPosition->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day0PolarBodyPosition->Param, "CustomMsg");
        $this->Fields['Day0PolarBodyPosition'] = &$this->Day0PolarBodyPosition;

        // Day0Breakage
        $this->Day0Breakage = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day0Breakage', 'Day0Breakage', '`Day0Breakage`', '`Day0Breakage`', 200, 45, -1, false, '`Day0Breakage`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day0Breakage->Sortable = true; // Allow sort
        $this->Day0Breakage->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day0Breakage->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day0Breakage->Lookup = new Lookup('Day0Breakage', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day0Breakage->OptionCount = 4;
        $this->Day0Breakage->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day0Breakage->Param, "CustomMsg");
        $this->Fields['Day0Breakage'] = &$this->Day0Breakage;

        // Day0Attempts
        $this->Day0Attempts = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day0Attempts', 'Day0Attempts', '`Day0Attempts`', '`Day0Attempts`', 200, 45, -1, false, '`Day0Attempts`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day0Attempts->Sortable = true; // Allow sort
        $this->Day0Attempts->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day0Attempts->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day0Attempts->Lookup = new Lookup('Day0Attempts', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day0Attempts->OptionCount = 2;
        $this->Day0Attempts->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day0Attempts->Param, "CustomMsg");
        $this->Fields['Day0Attempts'] = &$this->Day0Attempts;

        // Day0SPZMorpho
        $this->Day0SPZMorpho = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day0SPZMorpho', 'Day0SPZMorpho', '`Day0SPZMorpho`', '`Day0SPZMorpho`', 200, 45, -1, false, '`Day0SPZMorpho`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day0SPZMorpho->Sortable = true; // Allow sort
        $this->Day0SPZMorpho->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day0SPZMorpho->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day0SPZMorpho->Lookup = new Lookup('Day0SPZMorpho', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day0SPZMorpho->OptionCount = 3;
        $this->Day0SPZMorpho->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day0SPZMorpho->Param, "CustomMsg");
        $this->Fields['Day0SPZMorpho'] = &$this->Day0SPZMorpho;

        // Day0SPZLocation
        $this->Day0SPZLocation = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day0SPZLocation', 'Day0SPZLocation', '`Day0SPZLocation`', '`Day0SPZLocation`', 200, 45, -1, false, '`Day0SPZLocation`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day0SPZLocation->Sortable = true; // Allow sort
        $this->Day0SPZLocation->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day0SPZLocation->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day0SPZLocation->Lookup = new Lookup('Day0SPZLocation', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day0SPZLocation->OptionCount = 4;
        $this->Day0SPZLocation->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day0SPZLocation->Param, "CustomMsg");
        $this->Fields['Day0SPZLocation'] = &$this->Day0SPZLocation;

        // Day0SpOrgin
        $this->Day0SpOrgin = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day0SpOrgin', 'Day0SpOrgin', '`Day0SpOrgin`', '`Day0SpOrgin`', 200, 45, -1, false, '`Day0SpOrgin`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day0SpOrgin->Sortable = true; // Allow sort
        $this->Day0SpOrgin->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day0SpOrgin->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day0SpOrgin->Lookup = new Lookup('Day0SpOrgin', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day0SpOrgin->OptionCount = 2;
        $this->Day0SpOrgin->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day0SpOrgin->Param, "CustomMsg");
        $this->Fields['Day0SpOrgin'] = &$this->Day0SpOrgin;

        // Day5Cryoptop
        $this->Day5Cryoptop = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day5Cryoptop', 'Day5Cryoptop', '`Day5Cryoptop`', '`Day5Cryoptop`', 200, 45, -1, false, '`Day5Cryoptop`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day5Cryoptop->Sortable = true; // Allow sort
        $this->Day5Cryoptop->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day5Cryoptop->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day5Cryoptop->Lookup = new Lookup('Day5Cryoptop', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day5Cryoptop->OptionCount = 2;
        $this->Day5Cryoptop->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day5Cryoptop->Param, "CustomMsg");
        $this->Fields['Day5Cryoptop'] = &$this->Day5Cryoptop;

        // Day1Sperm
        $this->Day1Sperm = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day1Sperm', 'Day1Sperm', '`Day1Sperm`', '`Day1Sperm`', 200, 45, -1, false, '`Day1Sperm`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day1Sperm->Sortable = true; // Allow sort
        $this->Day1Sperm->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day1Sperm->Param, "CustomMsg");
        $this->Fields['Day1Sperm'] = &$this->Day1Sperm;

        // Day1PN
        $this->Day1PN = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day1PN', 'Day1PN', '`Day1PN`', '`Day1PN`', 200, 45, -1, false, '`Day1PN`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day1PN->Sortable = true; // Allow sort
        $this->Day1PN->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day1PN->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day1PN->Lookup = new Lookup('Day1PN', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day1PN->OptionCount = 6;
        $this->Day1PN->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day1PN->Param, "CustomMsg");
        $this->Fields['Day1PN'] = &$this->Day1PN;

        // Day1PB
        $this->Day1PB = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day1PB', 'Day1PB', '`Day1PB`', '`Day1PB`', 200, 45, -1, false, '`Day1PB`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day1PB->Sortable = true; // Allow sort
        $this->Day1PB->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day1PB->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day1PB->Lookup = new Lookup('Day1PB', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day1PB->OptionCount = 2;
        $this->Day1PB->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day1PB->Param, "CustomMsg");
        $this->Fields['Day1PB'] = &$this->Day1PB;

        // Day1Pronucleus
        $this->Day1Pronucleus = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day1Pronucleus', 'Day1Pronucleus', '`Day1Pronucleus`', '`Day1Pronucleus`', 200, 45, -1, false, '`Day1Pronucleus`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day1Pronucleus->Sortable = true; // Allow sort
        $this->Day1Pronucleus->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day1Pronucleus->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day1Pronucleus->Lookup = new Lookup('Day1Pronucleus', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day1Pronucleus->OptionCount = 4;
        $this->Day1Pronucleus->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day1Pronucleus->Param, "CustomMsg");
        $this->Fields['Day1Pronucleus'] = &$this->Day1Pronucleus;

        // Day1Nucleolus
        $this->Day1Nucleolus = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day1Nucleolus', 'Day1Nucleolus', '`Day1Nucleolus`', '`Day1Nucleolus`', 200, 45, -1, false, '`Day1Nucleolus`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day1Nucleolus->Sortable = true; // Allow sort
        $this->Day1Nucleolus->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day1Nucleolus->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day1Nucleolus->Lookup = new Lookup('Day1Nucleolus', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day1Nucleolus->OptionCount = 4;
        $this->Day1Nucleolus->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day1Nucleolus->Param, "CustomMsg");
        $this->Fields['Day1Nucleolus'] = &$this->Day1Nucleolus;

        // Day1Halo
        $this->Day1Halo = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day1Halo', 'Day1Halo', '`Day1Halo`', '`Day1Halo`', 200, 45, -1, false, '`Day1Halo`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day1Halo->Sortable = true; // Allow sort
        $this->Day1Halo->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day1Halo->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day1Halo->Lookup = new Lookup('Day1Halo', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day1Halo->OptionCount = 2;
        $this->Day1Halo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day1Halo->Param, "CustomMsg");
        $this->Fields['Day1Halo'] = &$this->Day1Halo;

        // Day2SiNo
        $this->Day2SiNo = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day2SiNo', 'Day2SiNo', '`Day2SiNo`', '`Day2SiNo`', 200, 45, -1, false, '`Day2SiNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day2SiNo->Sortable = true; // Allow sort
        $this->Day2SiNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day2SiNo->Param, "CustomMsg");
        $this->Fields['Day2SiNo'] = &$this->Day2SiNo;

        // Day2CellNo
        $this->Day2CellNo = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day2CellNo', 'Day2CellNo', '`Day2CellNo`', '`Day2CellNo`', 200, 45, -1, false, '`Day2CellNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day2CellNo->Sortable = true; // Allow sort
        $this->Day2CellNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day2CellNo->Param, "CustomMsg");
        $this->Fields['Day2CellNo'] = &$this->Day2CellNo;

        // Day2Frag
        $this->Day2Frag = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day2Frag', 'Day2Frag', '`Day2Frag`', '`Day2Frag`', 200, 45, -1, false, '`Day2Frag`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day2Frag->Sortable = true; // Allow sort
        $this->Day2Frag->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day2Frag->Param, "CustomMsg");
        $this->Fields['Day2Frag'] = &$this->Day2Frag;

        // Day2Symmetry
        $this->Day2Symmetry = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day2Symmetry', 'Day2Symmetry', '`Day2Symmetry`', '`Day2Symmetry`', 200, 45, -1, false, '`Day2Symmetry`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day2Symmetry->Sortable = true; // Allow sort
        $this->Day2Symmetry->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day2Symmetry->Param, "CustomMsg");
        $this->Fields['Day2Symmetry'] = &$this->Day2Symmetry;

        // Day2Cryoptop
        $this->Day2Cryoptop = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day2Cryoptop', 'Day2Cryoptop', '`Day2Cryoptop`', '`Day2Cryoptop`', 200, 45, -1, false, '`Day2Cryoptop`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day2Cryoptop->Sortable = true; // Allow sort
        $this->Day2Cryoptop->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day2Cryoptop->Param, "CustomMsg");
        $this->Fields['Day2Cryoptop'] = &$this->Day2Cryoptop;

        // Day2Grade
        $this->Day2Grade = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day2Grade', 'Day2Grade', '`Day2Grade`', '`Day2Grade`', 200, 45, -1, false, '`Day2Grade`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day2Grade->Sortable = true; // Allow sort
        $this->Day2Grade->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day2Grade->Param, "CustomMsg");
        $this->Fields['Day2Grade'] = &$this->Day2Grade;

        // Day2End
        $this->Day2End = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day2End', 'Day2End', '`Day2End`', '`Day2End`', 200, 45, -1, false, '`Day2End`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day2End->Sortable = true; // Allow sort
        $this->Day2End->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day2End->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day2End->Lookup = new Lookup('Day2End', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day2End->OptionCount = 5;
        $this->Day2End->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day2End->Param, "CustomMsg");
        $this->Fields['Day2End'] = &$this->Day2End;

        // Day3Sino
        $this->Day3Sino = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day3Sino', 'Day3Sino', '`Day3Sino`', '`Day3Sino`', 200, 45, -1, false, '`Day3Sino`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day3Sino->Sortable = true; // Allow sort
        $this->Day3Sino->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day3Sino->Param, "CustomMsg");
        $this->Fields['Day3Sino'] = &$this->Day3Sino;

        // Day3CellNo
        $this->Day3CellNo = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day3CellNo', 'Day3CellNo', '`Day3CellNo`', '`Day3CellNo`', 200, 45, -1, false, '`Day3CellNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day3CellNo->Sortable = true; // Allow sort
        $this->Day3CellNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day3CellNo->Param, "CustomMsg");
        $this->Fields['Day3CellNo'] = &$this->Day3CellNo;

        // Day3Frag
        $this->Day3Frag = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day3Frag', 'Day3Frag', '`Day3Frag`', '`Day3Frag`', 200, 45, -1, false, '`Day3Frag`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day3Frag->Sortable = true; // Allow sort
        $this->Day3Frag->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day3Frag->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day3Frag->Lookup = new Lookup('Day3Frag', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day3Frag->OptionCount = 4;
        $this->Day3Frag->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day3Frag->Param, "CustomMsg");
        $this->Fields['Day3Frag'] = &$this->Day3Frag;

        // Day3Symmetry
        $this->Day3Symmetry = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day3Symmetry', 'Day3Symmetry', '`Day3Symmetry`', '`Day3Symmetry`', 200, 45, -1, false, '`Day3Symmetry`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day3Symmetry->Sortable = true; // Allow sort
        $this->Day3Symmetry->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day3Symmetry->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day3Symmetry->Lookup = new Lookup('Day3Symmetry', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day3Symmetry->OptionCount = 4;
        $this->Day3Symmetry->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day3Symmetry->Param, "CustomMsg");
        $this->Fields['Day3Symmetry'] = &$this->Day3Symmetry;

        // Day3ZP
        $this->Day3ZP = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day3ZP', 'Day3ZP', '`Day3ZP`', '`Day3ZP`', 200, 45, -1, false, '`Day3ZP`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day3ZP->Sortable = true; // Allow sort
        $this->Day3ZP->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day3ZP->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day3ZP->Lookup = new Lookup('Day3ZP', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day3ZP->OptionCount = 4;
        $this->Day3ZP->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day3ZP->Param, "CustomMsg");
        $this->Fields['Day3ZP'] = &$this->Day3ZP;

        // Day3Vacoules
        $this->Day3Vacoules = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day3Vacoules', 'Day3Vacoules', '`Day3Vacoules`', '`Day3Vacoules`', 200, 45, -1, false, '`Day3Vacoules`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day3Vacoules->Sortable = true; // Allow sort
        $this->Day3Vacoules->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day3Vacoules->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day3Vacoules->Lookup = new Lookup('Day3Vacoules', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day3Vacoules->OptionCount = 4;
        $this->Day3Vacoules->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day3Vacoules->Param, "CustomMsg");
        $this->Fields['Day3Vacoules'] = &$this->Day3Vacoules;

        // Day3Grade
        $this->Day3Grade = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day3Grade', 'Day3Grade', '`Day3Grade`', '`Day3Grade`', 200, 45, -1, false, '`Day3Grade`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day3Grade->Sortable = true; // Allow sort
        $this->Day3Grade->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day3Grade->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day3Grade->Lookup = new Lookup('Day3Grade', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day3Grade->OptionCount = 4;
        $this->Day3Grade->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day3Grade->Param, "CustomMsg");
        $this->Fields['Day3Grade'] = &$this->Day3Grade;

        // Day3Cryoptop
        $this->Day3Cryoptop = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day3Cryoptop', 'Day3Cryoptop', '`Day3Cryoptop`', '`Day3Cryoptop`', 200, 45, -1, false, '`Day3Cryoptop`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day3Cryoptop->Sortable = true; // Allow sort
        $this->Day3Cryoptop->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day3Cryoptop->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day3Cryoptop->Lookup = new Lookup('Day3Cryoptop', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day3Cryoptop->OptionCount = 2;
        $this->Day3Cryoptop->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day3Cryoptop->Param, "CustomMsg");
        $this->Fields['Day3Cryoptop'] = &$this->Day3Cryoptop;

        // Day3End
        $this->Day3End = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day3End', 'Day3End', '`Day3End`', '`Day3End`', 200, 45, -1, false, '`Day3End`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day3End->Sortable = true; // Allow sort
        $this->Day3End->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day3End->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day3End->Lookup = new Lookup('Day3End', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day3End->OptionCount = 5;
        $this->Day3End->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day3End->Param, "CustomMsg");
        $this->Fields['Day3End'] = &$this->Day3End;

        // Day4SiNo
        $this->Day4SiNo = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day4SiNo', 'Day4SiNo', '`Day4SiNo`', '`Day4SiNo`', 200, 45, -1, false, '`Day4SiNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day4SiNo->Sortable = true; // Allow sort
        $this->Day4SiNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day4SiNo->Param, "CustomMsg");
        $this->Fields['Day4SiNo'] = &$this->Day4SiNo;

        // Day4CellNo
        $this->Day4CellNo = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day4CellNo', 'Day4CellNo', '`Day4CellNo`', '`Day4CellNo`', 200, 45, -1, false, '`Day4CellNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day4CellNo->Sortable = true; // Allow sort
        $this->Day4CellNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day4CellNo->Param, "CustomMsg");
        $this->Fields['Day4CellNo'] = &$this->Day4CellNo;

        // Day4Frag
        $this->Day4Frag = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day4Frag', 'Day4Frag', '`Day4Frag`', '`Day4Frag`', 200, 45, -1, false, '`Day4Frag`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day4Frag->Sortable = true; // Allow sort
        $this->Day4Frag->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day4Frag->Param, "CustomMsg");
        $this->Fields['Day4Frag'] = &$this->Day4Frag;

        // Day4Symmetry
        $this->Day4Symmetry = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day4Symmetry', 'Day4Symmetry', '`Day4Symmetry`', '`Day4Symmetry`', 200, 45, -1, false, '`Day4Symmetry`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day4Symmetry->Sortable = true; // Allow sort
        $this->Day4Symmetry->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day4Symmetry->Param, "CustomMsg");
        $this->Fields['Day4Symmetry'] = &$this->Day4Symmetry;

        // Day4Grade
        $this->Day4Grade = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day4Grade', 'Day4Grade', '`Day4Grade`', '`Day4Grade`', 200, 45, -1, false, '`Day4Grade`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day4Grade->Sortable = true; // Allow sort
        $this->Day4Grade->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day4Grade->Param, "CustomMsg");
        $this->Fields['Day4Grade'] = &$this->Day4Grade;

        // Day4Cryoptop
        $this->Day4Cryoptop = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day4Cryoptop', 'Day4Cryoptop', '`Day4Cryoptop`', '`Day4Cryoptop`', 200, 45, -1, false, '`Day4Cryoptop`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day4Cryoptop->Sortable = true; // Allow sort
        $this->Day4Cryoptop->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day4Cryoptop->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day4Cryoptop->Lookup = new Lookup('Day4Cryoptop', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day4Cryoptop->OptionCount = 4;
        $this->Day4Cryoptop->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day4Cryoptop->Param, "CustomMsg");
        $this->Fields['Day4Cryoptop'] = &$this->Day4Cryoptop;

        // Day4End
        $this->Day4End = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day4End', 'Day4End', '`Day4End`', '`Day4End`', 200, 45, -1, false, '`Day4End`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day4End->Sortable = true; // Allow sort
        $this->Day4End->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day4End->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day4End->Lookup = new Lookup('Day4End', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day4End->OptionCount = 5;
        $this->Day4End->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day4End->Param, "CustomMsg");
        $this->Fields['Day4End'] = &$this->Day4End;

        // Day5CellNo
        $this->Day5CellNo = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day5CellNo', 'Day5CellNo', '`Day5CellNo`', '`Day5CellNo`', 200, 45, -1, false, '`Day5CellNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day5CellNo->Sortable = true; // Allow sort
        $this->Day5CellNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day5CellNo->Param, "CustomMsg");
        $this->Fields['Day5CellNo'] = &$this->Day5CellNo;

        // Day5ICM
        $this->Day5ICM = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day5ICM', 'Day5ICM', '`Day5ICM`', '`Day5ICM`', 200, 45, -1, false, '`Day5ICM`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day5ICM->Sortable = true; // Allow sort
        $this->Day5ICM->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day5ICM->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day5ICM->Lookup = new Lookup('Day5ICM', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day5ICM->OptionCount = 9;
        $this->Day5ICM->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day5ICM->Param, "CustomMsg");
        $this->Fields['Day5ICM'] = &$this->Day5ICM;

        // Day5TE
        $this->Day5TE = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day5TE', 'Day5TE', '`Day5TE`', '`Day5TE`', 200, 45, -1, false, '`Day5TE`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day5TE->Sortable = true; // Allow sort
        $this->Day5TE->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day5TE->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day5TE->Lookup = new Lookup('Day5TE', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day5TE->OptionCount = 4;
        $this->Day5TE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day5TE->Param, "CustomMsg");
        $this->Fields['Day5TE'] = &$this->Day5TE;

        // Day5Observation
        $this->Day5Observation = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day5Observation', 'Day5Observation', '`Day5Observation`', '`Day5Observation`', 200, 45, -1, false, '`Day5Observation`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day5Observation->Sortable = true; // Allow sort
        $this->Day5Observation->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day5Observation->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day5Observation->Lookup = new Lookup('Day5Observation', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day5Observation->OptionCount = 4;
        $this->Day5Observation->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day5Observation->Param, "CustomMsg");
        $this->Fields['Day5Observation'] = &$this->Day5Observation;

        // Day5Collapsed
        $this->Day5Collapsed = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day5Collapsed', 'Day5Collapsed', '`Day5Collapsed`', '`Day5Collapsed`', 200, 45, -1, false, '`Day5Collapsed`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day5Collapsed->Sortable = true; // Allow sort
        $this->Day5Collapsed->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day5Collapsed->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day5Collapsed->Lookup = new Lookup('Day5Collapsed', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day5Collapsed->OptionCount = 4;
        $this->Day5Collapsed->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day5Collapsed->Param, "CustomMsg");
        $this->Fields['Day5Collapsed'] = &$this->Day5Collapsed;

        // Day5Vacoulles
        $this->Day5Vacoulles = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day5Vacoulles', 'Day5Vacoulles', '`Day5Vacoulles`', '`Day5Vacoulles`', 200, 45, -1, false, '`Day5Vacoulles`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day5Vacoulles->Sortable = true; // Allow sort
        $this->Day5Vacoulles->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day5Vacoulles->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day5Vacoulles->Lookup = new Lookup('Day5Vacoulles', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day5Vacoulles->OptionCount = 2;
        $this->Day5Vacoulles->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day5Vacoulles->Param, "CustomMsg");
        $this->Fields['Day5Vacoulles'] = &$this->Day5Vacoulles;

        // Day5Grade
        $this->Day5Grade = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day5Grade', 'Day5Grade', '`Day5Grade`', '`Day5Grade`', 200, 45, -1, false, '`Day5Grade`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day5Grade->Sortable = true; // Allow sort
        $this->Day5Grade->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day5Grade->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day5Grade->Lookup = new Lookup('Day5Grade', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day5Grade->OptionCount = 5;
        $this->Day5Grade->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day5Grade->Param, "CustomMsg");
        $this->Fields['Day5Grade'] = &$this->Day5Grade;

        // Day6CellNo
        $this->Day6CellNo = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day6CellNo', 'Day6CellNo', '`Day6CellNo`', '`Day6CellNo`', 200, 45, -1, false, '`Day6CellNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day6CellNo->Sortable = true; // Allow sort
        $this->Day6CellNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day6CellNo->Param, "CustomMsg");
        $this->Fields['Day6CellNo'] = &$this->Day6CellNo;

        // Day6ICM
        $this->Day6ICM = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day6ICM', 'Day6ICM', '`Day6ICM`', '`Day6ICM`', 200, 45, -1, false, '`Day6ICM`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day6ICM->Sortable = true; // Allow sort
        $this->Day6ICM->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day6ICM->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day6ICM->Lookup = new Lookup('Day6ICM', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day6ICM->OptionCount = 8;
        $this->Day6ICM->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day6ICM->Param, "CustomMsg");
        $this->Fields['Day6ICM'] = &$this->Day6ICM;

        // Day6TE
        $this->Day6TE = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day6TE', 'Day6TE', '`Day6TE`', '`Day6TE`', 200, 45, -1, false, '`Day6TE`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day6TE->Sortable = true; // Allow sort
        $this->Day6TE->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day6TE->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day6TE->Lookup = new Lookup('Day6TE', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day6TE->OptionCount = 4;
        $this->Day6TE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day6TE->Param, "CustomMsg");
        $this->Fields['Day6TE'] = &$this->Day6TE;

        // Day6Observation
        $this->Day6Observation = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day6Observation', 'Day6Observation', '`Day6Observation`', '`Day6Observation`', 200, 45, -1, false, '`Day6Observation`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day6Observation->Sortable = true; // Allow sort
        $this->Day6Observation->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day6Observation->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day6Observation->Lookup = new Lookup('Day6Observation', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day6Observation->OptionCount = 4;
        $this->Day6Observation->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day6Observation->Param, "CustomMsg");
        $this->Fields['Day6Observation'] = &$this->Day6Observation;

        // Day6Collapsed
        $this->Day6Collapsed = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day6Collapsed', 'Day6Collapsed', '`Day6Collapsed`', '`Day6Collapsed`', 200, 45, -1, false, '`Day6Collapsed`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day6Collapsed->Sortable = true; // Allow sort
        $this->Day6Collapsed->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day6Collapsed->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day6Collapsed->Lookup = new Lookup('Day6Collapsed', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day6Collapsed->OptionCount = 4;
        $this->Day6Collapsed->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day6Collapsed->Param, "CustomMsg");
        $this->Fields['Day6Collapsed'] = &$this->Day6Collapsed;

        // Day6Vacoulles
        $this->Day6Vacoulles = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day6Vacoulles', 'Day6Vacoulles', '`Day6Vacoulles`', '`Day6Vacoulles`', 200, 45, -1, false, '`Day6Vacoulles`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day6Vacoulles->Sortable = true; // Allow sort
        $this->Day6Vacoulles->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day6Vacoulles->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day6Vacoulles->Lookup = new Lookup('Day6Vacoulles', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day6Vacoulles->OptionCount = 2;
        $this->Day6Vacoulles->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day6Vacoulles->Param, "CustomMsg");
        $this->Fields['Day6Vacoulles'] = &$this->Day6Vacoulles;

        // Day6Grade
        $this->Day6Grade = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day6Grade', 'Day6Grade', '`Day6Grade`', '`Day6Grade`', 200, 45, -1, false, '`Day6Grade`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day6Grade->Sortable = true; // Allow sort
        $this->Day6Grade->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day6Grade->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day6Grade->Lookup = new Lookup('Day6Grade', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day6Grade->OptionCount = 4;
        $this->Day6Grade->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day6Grade->Param, "CustomMsg");
        $this->Fields['Day6Grade'] = &$this->Day6Grade;

        // Day6Cryoptop
        $this->Day6Cryoptop = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day6Cryoptop', 'Day6Cryoptop', '`Day6Cryoptop`', '`Day6Cryoptop`', 200, 45, -1, false, '`Day6Cryoptop`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day6Cryoptop->Sortable = true; // Allow sort
        $this->Day6Cryoptop->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day6Cryoptop->Param, "CustomMsg");
        $this->Fields['Day6Cryoptop'] = &$this->Day6Cryoptop;

        // EndSiNo
        $this->EndSiNo = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_EndSiNo', 'EndSiNo', '`EndSiNo`', '`EndSiNo`', 200, 45, -1, false, '`EndSiNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EndSiNo->Sortable = true; // Allow sort
        $this->EndSiNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EndSiNo->Param, "CustomMsg");
        $this->Fields['EndSiNo'] = &$this->EndSiNo;

        // EndingDay
        $this->EndingDay = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_EndingDay', 'EndingDay', '`EndingDay`', '`EndingDay`', 200, 45, -1, false, '`EndingDay`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->EndingDay->Sortable = true; // Allow sort
        $this->EndingDay->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->EndingDay->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->EndingDay->Lookup = new Lookup('EndingDay', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->EndingDay->OptionCount = 6;
        $this->EndingDay->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EndingDay->Param, "CustomMsg");
        $this->Fields['EndingDay'] = &$this->EndingDay;

        // EndingCellStage
        $this->EndingCellStage = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_EndingCellStage', 'EndingCellStage', '`EndingCellStage`', '`EndingCellStage`', 200, 45, -1, false, '`EndingCellStage`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EndingCellStage->Sortable = true; // Allow sort
        $this->EndingCellStage->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EndingCellStage->Param, "CustomMsg");
        $this->Fields['EndingCellStage'] = &$this->EndingCellStage;

        // EndingGrade
        $this->EndingGrade = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_EndingGrade', 'EndingGrade', '`EndingGrade`', '`EndingGrade`', 200, 45, -1, false, '`EndingGrade`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->EndingGrade->Sortable = true; // Allow sort
        $this->EndingGrade->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->EndingGrade->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->EndingGrade->Lookup = new Lookup('EndingGrade', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->EndingGrade->OptionCount = 5;
        $this->EndingGrade->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EndingGrade->Param, "CustomMsg");
        $this->Fields['EndingGrade'] = &$this->EndingGrade;

        // EndingState
        $this->EndingState = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_EndingState', 'EndingState', '`EndingState`', '`EndingState`', 200, 45, -1, false, '`EndingState`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->EndingState->Sortable = true; // Allow sort
        $this->EndingState->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->EndingState->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->EndingState->Lookup = new Lookup('EndingState', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->EndingState->OptionCount = 2;
        $this->EndingState->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EndingState->Param, "CustomMsg");
        $this->Fields['EndingState'] = &$this->EndingState;

        // TidNo
        $this->TidNo = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_TidNo', 'TidNo', '`TidNo`', '`TidNo`', 3, 11, -1, false, '`TidNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TidNo->IsForeignKey = true; // Foreign key field
        $this->TidNo->Sortable = true; // Allow sort
        $this->TidNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->TidNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TidNo->Param, "CustomMsg");
        $this->Fields['TidNo'] = &$this->TidNo;

        // DidNO
        $this->DidNO = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_DidNO', 'DidNO', '`DidNO`', '`DidNO`', 200, 45, -1, false, '`DidNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DidNO->IsForeignKey = true; // Foreign key field
        $this->DidNO->Sortable = true; // Allow sort
        $this->DidNO->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DidNO->Param, "CustomMsg");
        $this->Fields['DidNO'] = &$this->DidNO;

        // ICSiIVFDateTime
        $this->ICSiIVFDateTime = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_ICSiIVFDateTime', 'ICSiIVFDateTime', '`ICSiIVFDateTime`', CastDateFieldForLike("`ICSiIVFDateTime`", 0, "DB"), 135, 19, 0, false, '`ICSiIVFDateTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ICSiIVFDateTime->Sortable = true; // Allow sort
        $this->ICSiIVFDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->ICSiIVFDateTime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ICSiIVFDateTime->Param, "CustomMsg");
        $this->Fields['ICSiIVFDateTime'] = &$this->ICSiIVFDateTime;

        // PrimaryEmbrologist
        $this->PrimaryEmbrologist = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_PrimaryEmbrologist', 'PrimaryEmbrologist', '`PrimaryEmbrologist`', '`PrimaryEmbrologist`', 200, 45, -1, false, '`PrimaryEmbrologist`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PrimaryEmbrologist->Sortable = true; // Allow sort
        $this->PrimaryEmbrologist->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PrimaryEmbrologist->Param, "CustomMsg");
        $this->Fields['PrimaryEmbrologist'] = &$this->PrimaryEmbrologist;

        // SecondaryEmbrologist
        $this->SecondaryEmbrologist = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_SecondaryEmbrologist', 'SecondaryEmbrologist', '`SecondaryEmbrologist`', '`SecondaryEmbrologist`', 200, 45, -1, false, '`SecondaryEmbrologist`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SecondaryEmbrologist->Sortable = true; // Allow sort
        $this->SecondaryEmbrologist->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SecondaryEmbrologist->Param, "CustomMsg");
        $this->Fields['SecondaryEmbrologist'] = &$this->SecondaryEmbrologist;

        // Incubator
        $this->Incubator = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Incubator', 'Incubator', '`Incubator`', '`Incubator`', 200, 45, -1, false, '`Incubator`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Incubator->Sortable = true; // Allow sort
        $this->Incubator->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Incubator->Param, "CustomMsg");
        $this->Fields['Incubator'] = &$this->Incubator;

        // location
        $this->location = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_location', 'location', '`location`', '`location`', 200, 45, -1, false, '`location`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->location->Sortable = true; // Allow sort
        $this->location->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->location->Param, "CustomMsg");
        $this->Fields['location'] = &$this->location;

        // OocyteNo
        $this->OocyteNo = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_OocyteNo', 'OocyteNo', '`OocyteNo`', '`OocyteNo`', 200, 45, -1, false, '`OocyteNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OocyteNo->Sortable = true; // Allow sort
        $this->OocyteNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OocyteNo->Param, "CustomMsg");
        $this->Fields['OocyteNo'] = &$this->OocyteNo;

        // Stage
        $this->Stage = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Stage', 'Stage', '`Stage`', '`Stage`', 200, 45, -1, false, '`Stage`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Stage->Sortable = true; // Allow sort
        $this->Stage->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Stage->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Stage->Lookup = new Lookup('Stage', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Stage->OptionCount = 4;
        $this->Stage->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Stage->Param, "CustomMsg");
        $this->Fields['Stage'] = &$this->Stage;

        // Remarks
        $this->Remarks = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Remarks', 'Remarks', '`Remarks`', '`Remarks`', 200, 45, -1, false, '`Remarks`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Remarks->Sortable = true; // Allow sort
        $this->Remarks->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Remarks->Param, "CustomMsg");
        $this->Fields['Remarks'] = &$this->Remarks;

        // vitrificationDate
        $this->vitrificationDate = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_vitrificationDate', 'vitrificationDate', '`vitrificationDate`', CastDateFieldForLike("`vitrificationDate`", 0, "DB"), 135, 19, 0, false, '`vitrificationDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->vitrificationDate->Sortable = true; // Allow sort
        $this->vitrificationDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->vitrificationDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->vitrificationDate->Param, "CustomMsg");
        $this->Fields['vitrificationDate'] = &$this->vitrificationDate;

        // vitriPrimaryEmbryologist
        $this->vitriPrimaryEmbryologist = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_vitriPrimaryEmbryologist', 'vitriPrimaryEmbryologist', '`vitriPrimaryEmbryologist`', '`vitriPrimaryEmbryologist`', 200, 45, -1, false, '`vitriPrimaryEmbryologist`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->vitriPrimaryEmbryologist->Sortable = true; // Allow sort
        $this->vitriPrimaryEmbryologist->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->vitriPrimaryEmbryologist->Param, "CustomMsg");
        $this->Fields['vitriPrimaryEmbryologist'] = &$this->vitriPrimaryEmbryologist;

        // vitriSecondaryEmbryologist
        $this->vitriSecondaryEmbryologist = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_vitriSecondaryEmbryologist', 'vitriSecondaryEmbryologist', '`vitriSecondaryEmbryologist`', '`vitriSecondaryEmbryologist`', 200, 45, -1, false, '`vitriSecondaryEmbryologist`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->vitriSecondaryEmbryologist->Sortable = true; // Allow sort
        $this->vitriSecondaryEmbryologist->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->vitriSecondaryEmbryologist->Param, "CustomMsg");
        $this->Fields['vitriSecondaryEmbryologist'] = &$this->vitriSecondaryEmbryologist;

        // vitriEmbryoNo
        $this->vitriEmbryoNo = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_vitriEmbryoNo', 'vitriEmbryoNo', '`vitriEmbryoNo`', '`vitriEmbryoNo`', 200, 45, -1, false, '`vitriEmbryoNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->vitriEmbryoNo->Sortable = true; // Allow sort
        $this->vitriEmbryoNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->vitriEmbryoNo->Param, "CustomMsg");
        $this->Fields['vitriEmbryoNo'] = &$this->vitriEmbryoNo;

        // thawReFrozen
        $this->thawReFrozen = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_thawReFrozen', 'thawReFrozen', '`thawReFrozen`', '`thawReFrozen`', 200, 45, -1, false, '`thawReFrozen`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->thawReFrozen->Sortable = true; // Allow sort
        $this->thawReFrozen->Lookup = new Lookup('thawReFrozen', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->thawReFrozen->OptionCount = 1;
        $this->thawReFrozen->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->thawReFrozen->Param, "CustomMsg");
        $this->Fields['thawReFrozen'] = &$this->thawReFrozen;

        // vitriFertilisationDate
        $this->vitriFertilisationDate = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_vitriFertilisationDate', 'vitriFertilisationDate', '`vitriFertilisationDate`', CastDateFieldForLike("`vitriFertilisationDate`", 0, "DB"), 135, 19, 0, false, '`vitriFertilisationDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->vitriFertilisationDate->Sortable = true; // Allow sort
        $this->vitriFertilisationDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->vitriFertilisationDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->vitriFertilisationDate->Param, "CustomMsg");
        $this->Fields['vitriFertilisationDate'] = &$this->vitriFertilisationDate;

        // vitriDay
        $this->vitriDay = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_vitriDay', 'vitriDay', '`vitriDay`', '`vitriDay`', 200, 45, -1, false, '`vitriDay`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->vitriDay->Sortable = true; // Allow sort
        $this->vitriDay->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->vitriDay->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->vitriDay->Lookup = new Lookup('vitriDay', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->vitriDay->OptionCount = 7;
        $this->vitriDay->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->vitriDay->Param, "CustomMsg");
        $this->Fields['vitriDay'] = &$this->vitriDay;

        // vitriStage
        $this->vitriStage = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_vitriStage', 'vitriStage', '`vitriStage`', '`vitriStage`', 200, 45, -1, false, '`vitriStage`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->vitriStage->Sortable = true; // Allow sort
        $this->vitriStage->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->vitriStage->Param, "CustomMsg");
        $this->Fields['vitriStage'] = &$this->vitriStage;

        // vitriGrade
        $this->vitriGrade = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_vitriGrade', 'vitriGrade', '`vitriGrade`', '`vitriGrade`', 200, 45, -1, false, '`vitriGrade`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->vitriGrade->Sortable = true; // Allow sort
        $this->vitriGrade->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->vitriGrade->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->vitriGrade->Lookup = new Lookup('vitriGrade', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->vitriGrade->OptionCount = 4;
        $this->vitriGrade->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->vitriGrade->Param, "CustomMsg");
        $this->Fields['vitriGrade'] = &$this->vitriGrade;

        // vitriIncubator
        $this->vitriIncubator = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_vitriIncubator', 'vitriIncubator', '`vitriIncubator`', '`vitriIncubator`', 200, 45, -1, false, '`vitriIncubator`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->vitriIncubator->Sortable = true; // Allow sort
        $this->vitriIncubator->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->vitriIncubator->Param, "CustomMsg");
        $this->Fields['vitriIncubator'] = &$this->vitriIncubator;

        // vitriTank
        $this->vitriTank = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_vitriTank', 'vitriTank', '`vitriTank`', '`vitriTank`', 200, 45, -1, false, '`vitriTank`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->vitriTank->Sortable = true; // Allow sort
        $this->vitriTank->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->vitriTank->Param, "CustomMsg");
        $this->Fields['vitriTank'] = &$this->vitriTank;

        // vitriCanister
        $this->vitriCanister = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_vitriCanister', 'vitriCanister', '`vitriCanister`', '`vitriCanister`', 200, 45, -1, false, '`vitriCanister`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->vitriCanister->Sortable = true; // Allow sort
        $this->vitriCanister->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->vitriCanister->Param, "CustomMsg");
        $this->Fields['vitriCanister'] = &$this->vitriCanister;

        // vitriGobiet
        $this->vitriGobiet = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_vitriGobiet', 'vitriGobiet', '`vitriGobiet`', '`vitriGobiet`', 200, 45, -1, false, '`vitriGobiet`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->vitriGobiet->Sortable = true; // Allow sort
        $this->vitriGobiet->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->vitriGobiet->Param, "CustomMsg");
        $this->Fields['vitriGobiet'] = &$this->vitriGobiet;

        // vitriViscotube
        $this->vitriViscotube = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_vitriViscotube', 'vitriViscotube', '`vitriViscotube`', '`vitriViscotube`', 200, 45, -1, false, '`vitriViscotube`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->vitriViscotube->Sortable = true; // Allow sort
        $this->vitriViscotube->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->vitriViscotube->Param, "CustomMsg");
        $this->Fields['vitriViscotube'] = &$this->vitriViscotube;

        // vitriCryolockNo
        $this->vitriCryolockNo = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_vitriCryolockNo', 'vitriCryolockNo', '`vitriCryolockNo`', '`vitriCryolockNo`', 200, 45, -1, false, '`vitriCryolockNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->vitriCryolockNo->Sortable = true; // Allow sort
        $this->vitriCryolockNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->vitriCryolockNo->Param, "CustomMsg");
        $this->Fields['vitriCryolockNo'] = &$this->vitriCryolockNo;

        // vitriCryolockColour
        $this->vitriCryolockColour = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_vitriCryolockColour', 'vitriCryolockColour', '`vitriCryolockColour`', '`vitriCryolockColour`', 200, 45, -1, false, '`vitriCryolockColour`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->vitriCryolockColour->Sortable = true; // Allow sort
        $this->vitriCryolockColour->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->vitriCryolockColour->Param, "CustomMsg");
        $this->Fields['vitriCryolockColour'] = &$this->vitriCryolockColour;

        // thawDate
        $this->thawDate = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_thawDate', 'thawDate', '`thawDate`', CastDateFieldForLike("`thawDate`", 0, "DB"), 135, 19, 0, false, '`thawDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->thawDate->Sortable = true; // Allow sort
        $this->thawDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->thawDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->thawDate->Param, "CustomMsg");
        $this->Fields['thawDate'] = &$this->thawDate;

        // thawPrimaryEmbryologist
        $this->thawPrimaryEmbryologist = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_thawPrimaryEmbryologist', 'thawPrimaryEmbryologist', '`thawPrimaryEmbryologist`', '`thawPrimaryEmbryologist`', 200, 45, -1, false, '`thawPrimaryEmbryologist`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->thawPrimaryEmbryologist->Sortable = true; // Allow sort
        $this->thawPrimaryEmbryologist->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->thawPrimaryEmbryologist->Param, "CustomMsg");
        $this->Fields['thawPrimaryEmbryologist'] = &$this->thawPrimaryEmbryologist;

        // thawSecondaryEmbryologist
        $this->thawSecondaryEmbryologist = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_thawSecondaryEmbryologist', 'thawSecondaryEmbryologist', '`thawSecondaryEmbryologist`', '`thawSecondaryEmbryologist`', 200, 45, -1, false, '`thawSecondaryEmbryologist`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->thawSecondaryEmbryologist->Sortable = true; // Allow sort
        $this->thawSecondaryEmbryologist->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->thawSecondaryEmbryologist->Param, "CustomMsg");
        $this->Fields['thawSecondaryEmbryologist'] = &$this->thawSecondaryEmbryologist;

        // thawET
        $this->thawET = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_thawET', 'thawET', '`thawET`', '`thawET`', 200, 45, -1, false, '`thawET`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->thawET->Sortable = true; // Allow sort
        $this->thawET->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->thawET->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->thawET->Lookup = new Lookup('thawET', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->thawET->OptionCount = 4;
        $this->thawET->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->thawET->Param, "CustomMsg");
        $this->Fields['thawET'] = &$this->thawET;

        // thawAbserve
        $this->thawAbserve = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_thawAbserve', 'thawAbserve', '`thawAbserve`', '`thawAbserve`', 200, 45, -1, false, '`thawAbserve`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->thawAbserve->Sortable = true; // Allow sort
        $this->thawAbserve->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->thawAbserve->Param, "CustomMsg");
        $this->Fields['thawAbserve'] = &$this->thawAbserve;

        // thawDiscard
        $this->thawDiscard = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_thawDiscard', 'thawDiscard', '`thawDiscard`', '`thawDiscard`', 200, 45, -1, false, '`thawDiscard`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->thawDiscard->Sortable = true; // Allow sort
        $this->thawDiscard->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->thawDiscard->Param, "CustomMsg");
        $this->Fields['thawDiscard'] = &$this->thawDiscard;

        // ETCatheter
        $this->ETCatheter = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_ETCatheter', 'ETCatheter', '`ETCatheter`', '`ETCatheter`', 200, 45, -1, false, '`ETCatheter`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ETCatheter->Sortable = true; // Allow sort
        $this->ETCatheter->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ETCatheter->Param, "CustomMsg");
        $this->Fields['ETCatheter'] = &$this->ETCatheter;

        // ETDifficulty
        $this->ETDifficulty = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_ETDifficulty', 'ETDifficulty', '`ETDifficulty`', '`ETDifficulty`', 200, 45, -1, false, '`ETDifficulty`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->ETDifficulty->Sortable = true; // Allow sort
        $this->ETDifficulty->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->ETDifficulty->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->ETDifficulty->Lookup = new Lookup('ETDifficulty', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->ETDifficulty->OptionCount = 3;
        $this->ETDifficulty->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ETDifficulty->Param, "CustomMsg");
        $this->Fields['ETDifficulty'] = &$this->ETDifficulty;

        // ETEasy
        $this->ETEasy = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_ETEasy', 'ETEasy', '`ETEasy`', '`ETEasy`', 200, 45, -1, false, '`ETEasy`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->ETEasy->Sortable = true; // Allow sort
        $this->ETEasy->Lookup = new Lookup('ETEasy', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->ETEasy->OptionCount = 5;
        $this->ETEasy->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ETEasy->Param, "CustomMsg");
        $this->Fields['ETEasy'] = &$this->ETEasy;

        // ETComments
        $this->ETComments = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_ETComments', 'ETComments', '`ETComments`', '`ETComments`', 200, 45, -1, false, '`ETComments`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ETComments->Sortable = true; // Allow sort
        $this->ETComments->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ETComments->Param, "CustomMsg");
        $this->Fields['ETComments'] = &$this->ETComments;

        // ETDoctor
        $this->ETDoctor = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_ETDoctor', 'ETDoctor', '`ETDoctor`', '`ETDoctor`', 200, 45, -1, false, '`ETDoctor`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ETDoctor->Sortable = true; // Allow sort
        $this->ETDoctor->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ETDoctor->Param, "CustomMsg");
        $this->Fields['ETDoctor'] = &$this->ETDoctor;

        // ETEmbryologist
        $this->ETEmbryologist = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_ETEmbryologist', 'ETEmbryologist', '`ETEmbryologist`', '`ETEmbryologist`', 200, 45, -1, false, '`ETEmbryologist`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ETEmbryologist->Sortable = true; // Allow sort
        $this->ETEmbryologist->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ETEmbryologist->Param, "CustomMsg");
        $this->Fields['ETEmbryologist'] = &$this->ETEmbryologist;

        // ETDate
        $this->ETDate = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_ETDate', 'ETDate', '`ETDate`', CastDateFieldForLike("`ETDate`", 0, "DB"), 135, 19, 0, false, '`ETDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ETDate->Sortable = true; // Allow sort
        $this->ETDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->ETDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ETDate->Param, "CustomMsg");
        $this->Fields['ETDate'] = &$this->ETDate;

        // Day1End
        $this->Day1End = new DbField('ivf_embryology_chart', 'ivf_embryology_chart', 'x_Day1End', 'Day1End', '`Day1End`', '`Day1End`', 200, 45, -1, false, '`Day1End`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Day1End->Sortable = true; // Allow sort
        $this->Day1End->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Day1End->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Day1End->Lookup = new Lookup('Day1End', 'ivf_embryology_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Day1End->OptionCount = 2;
        $this->Day1End->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Day1End->Param, "CustomMsg");
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
        if ($this->getCurrentMasterTable() == "ivf_treatment_plan") {
            if ($this->RIDNo->getSessionValue() != "") {
                $masterFilter .= "" . GetForeignKeySql("`RIDNO`", $this->RIDNo->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
            if ($this->Name->getSessionValue() != "") {
                $masterFilter .= " AND " . GetForeignKeySql("`Name`", $this->Name->getSessionValue(), DATATYPE_STRING, "DB");
            } else {
                return "";
            }
            if ($this->TidNo->getSessionValue() != "") {
                $masterFilter .= " AND " . GetForeignKeySql("`id`", $this->TidNo->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
        }
        if ($this->getCurrentMasterTable() == "ivf_oocytedenudation") {
            if ($this->DidNO->getSessionValue() != "") {
                $masterFilter .= "" . GetForeignKeySql("`id`", $this->DidNO->getSessionValue(), DATATYPE_NUMBER, "DB");
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
        if ($this->getCurrentMasterTable() == "ivf_treatment_plan") {
            if ($this->RIDNo->getSessionValue() != "") {
                $detailFilter .= "" . GetForeignKeySql("`RIDNo`", $this->RIDNo->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
            if ($this->Name->getSessionValue() != "") {
                $detailFilter .= " AND " . GetForeignKeySql("`Name`", $this->Name->getSessionValue(), DATATYPE_STRING, "DB");
            } else {
                return "";
            }
            if ($this->TidNo->getSessionValue() != "") {
                $detailFilter .= " AND " . GetForeignKeySql("`TidNo`", $this->TidNo->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
        }
        if ($this->getCurrentMasterTable() == "ivf_oocytedenudation") {
            if ($this->DidNO->getSessionValue() != "") {
                $detailFilter .= "" . GetForeignKeySql("`DidNO`", $this->DidNO->getSessionValue(), DATATYPE_STRING, "DB");
            } else {
                return "";
            }
        }
        return $detailFilter;
    }

    // Master filter
    public function sqlMasterFilter_ivf_treatment_plan()
    {
        return "`RIDNO`=@RIDNO@ AND `Name`='@Name@' AND `id`=@id@";
    }
    // Detail filter
    public function sqlDetailFilter_ivf_treatment_plan()
    {
        return "`RIDNo`=@RIDNo@ AND `Name`='@Name@' AND `TidNo`=@TidNo@";
    }

    // Master filter
    public function sqlMasterFilter_ivf_oocytedenudation()
    {
        return "`id`=@id@";
    }
    // Detail filter
    public function sqlDetailFilter_ivf_oocytedenudation()
    {
        return "`DidNO`='@DidNO@'";
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
        $this->Name->DbValue = $row['Name'];
        $this->ARTCycle->DbValue = $row['ARTCycle'];
        $this->SpermOrigin->DbValue = $row['SpermOrigin'];
        $this->InseminatinTechnique->DbValue = $row['InseminatinTechnique'];
        $this->IndicationForART->DbValue = $row['IndicationForART'];
        $this->Day0sino->DbValue = $row['Day0sino'];
        $this->Day0OocyteStage->DbValue = $row['Day0OocyteStage'];
        $this->Day0PolarBodyPosition->DbValue = $row['Day0PolarBodyPosition'];
        $this->Day0Breakage->DbValue = $row['Day0Breakage'];
        $this->Day0Attempts->DbValue = $row['Day0Attempts'];
        $this->Day0SPZMorpho->DbValue = $row['Day0SPZMorpho'];
        $this->Day0SPZLocation->DbValue = $row['Day0SPZLocation'];
        $this->Day0SpOrgin->DbValue = $row['Day0SpOrgin'];
        $this->Day5Cryoptop->DbValue = $row['Day5Cryoptop'];
        $this->Day1Sperm->DbValue = $row['Day1Sperm'];
        $this->Day1PN->DbValue = $row['Day1PN'];
        $this->Day1PB->DbValue = $row['Day1PB'];
        $this->Day1Pronucleus->DbValue = $row['Day1Pronucleus'];
        $this->Day1Nucleolus->DbValue = $row['Day1Nucleolus'];
        $this->Day1Halo->DbValue = $row['Day1Halo'];
        $this->Day2SiNo->DbValue = $row['Day2SiNo'];
        $this->Day2CellNo->DbValue = $row['Day2CellNo'];
        $this->Day2Frag->DbValue = $row['Day2Frag'];
        $this->Day2Symmetry->DbValue = $row['Day2Symmetry'];
        $this->Day2Cryoptop->DbValue = $row['Day2Cryoptop'];
        $this->Day2Grade->DbValue = $row['Day2Grade'];
        $this->Day2End->DbValue = $row['Day2End'];
        $this->Day3Sino->DbValue = $row['Day3Sino'];
        $this->Day3CellNo->DbValue = $row['Day3CellNo'];
        $this->Day3Frag->DbValue = $row['Day3Frag'];
        $this->Day3Symmetry->DbValue = $row['Day3Symmetry'];
        $this->Day3ZP->DbValue = $row['Day3ZP'];
        $this->Day3Vacoules->DbValue = $row['Day3Vacoules'];
        $this->Day3Grade->DbValue = $row['Day3Grade'];
        $this->Day3Cryoptop->DbValue = $row['Day3Cryoptop'];
        $this->Day3End->DbValue = $row['Day3End'];
        $this->Day4SiNo->DbValue = $row['Day4SiNo'];
        $this->Day4CellNo->DbValue = $row['Day4CellNo'];
        $this->Day4Frag->DbValue = $row['Day4Frag'];
        $this->Day4Symmetry->DbValue = $row['Day4Symmetry'];
        $this->Day4Grade->DbValue = $row['Day4Grade'];
        $this->Day4Cryoptop->DbValue = $row['Day4Cryoptop'];
        $this->Day4End->DbValue = $row['Day4End'];
        $this->Day5CellNo->DbValue = $row['Day5CellNo'];
        $this->Day5ICM->DbValue = $row['Day5ICM'];
        $this->Day5TE->DbValue = $row['Day5TE'];
        $this->Day5Observation->DbValue = $row['Day5Observation'];
        $this->Day5Collapsed->DbValue = $row['Day5Collapsed'];
        $this->Day5Vacoulles->DbValue = $row['Day5Vacoulles'];
        $this->Day5Grade->DbValue = $row['Day5Grade'];
        $this->Day6CellNo->DbValue = $row['Day6CellNo'];
        $this->Day6ICM->DbValue = $row['Day6ICM'];
        $this->Day6TE->DbValue = $row['Day6TE'];
        $this->Day6Observation->DbValue = $row['Day6Observation'];
        $this->Day6Collapsed->DbValue = $row['Day6Collapsed'];
        $this->Day6Vacoulles->DbValue = $row['Day6Vacoulles'];
        $this->Day6Grade->DbValue = $row['Day6Grade'];
        $this->Day6Cryoptop->DbValue = $row['Day6Cryoptop'];
        $this->EndSiNo->DbValue = $row['EndSiNo'];
        $this->EndingDay->DbValue = $row['EndingDay'];
        $this->EndingCellStage->DbValue = $row['EndingCellStage'];
        $this->EndingGrade->DbValue = $row['EndingGrade'];
        $this->EndingState->DbValue = $row['EndingState'];
        $this->TidNo->DbValue = $row['TidNo'];
        $this->DidNO->DbValue = $row['DidNO'];
        $this->ICSiIVFDateTime->DbValue = $row['ICSiIVFDateTime'];
        $this->PrimaryEmbrologist->DbValue = $row['PrimaryEmbrologist'];
        $this->SecondaryEmbrologist->DbValue = $row['SecondaryEmbrologist'];
        $this->Incubator->DbValue = $row['Incubator'];
        $this->location->DbValue = $row['location'];
        $this->OocyteNo->DbValue = $row['OocyteNo'];
        $this->Stage->DbValue = $row['Stage'];
        $this->Remarks->DbValue = $row['Remarks'];
        $this->vitrificationDate->DbValue = $row['vitrificationDate'];
        $this->vitriPrimaryEmbryologist->DbValue = $row['vitriPrimaryEmbryologist'];
        $this->vitriSecondaryEmbryologist->DbValue = $row['vitriSecondaryEmbryologist'];
        $this->vitriEmbryoNo->DbValue = $row['vitriEmbryoNo'];
        $this->thawReFrozen->DbValue = $row['thawReFrozen'];
        $this->vitriFertilisationDate->DbValue = $row['vitriFertilisationDate'];
        $this->vitriDay->DbValue = $row['vitriDay'];
        $this->vitriStage->DbValue = $row['vitriStage'];
        $this->vitriGrade->DbValue = $row['vitriGrade'];
        $this->vitriIncubator->DbValue = $row['vitriIncubator'];
        $this->vitriTank->DbValue = $row['vitriTank'];
        $this->vitriCanister->DbValue = $row['vitriCanister'];
        $this->vitriGobiet->DbValue = $row['vitriGobiet'];
        $this->vitriViscotube->DbValue = $row['vitriViscotube'];
        $this->vitriCryolockNo->DbValue = $row['vitriCryolockNo'];
        $this->vitriCryolockColour->DbValue = $row['vitriCryolockColour'];
        $this->thawDate->DbValue = $row['thawDate'];
        $this->thawPrimaryEmbryologist->DbValue = $row['thawPrimaryEmbryologist'];
        $this->thawSecondaryEmbryologist->DbValue = $row['thawSecondaryEmbryologist'];
        $this->thawET->DbValue = $row['thawET'];
        $this->thawAbserve->DbValue = $row['thawAbserve'];
        $this->thawDiscard->DbValue = $row['thawDiscard'];
        $this->ETCatheter->DbValue = $row['ETCatheter'];
        $this->ETDifficulty->DbValue = $row['ETDifficulty'];
        $this->ETEasy->DbValue = $row['ETEasy'];
        $this->ETComments->DbValue = $row['ETComments'];
        $this->ETDoctor->DbValue = $row['ETDoctor'];
        $this->ETEmbryologist->DbValue = $row['ETEmbryologist'];
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
        return $_SESSION[$name] ?? GetUrl("IvfEmbryologyChartList");
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

    // API page name
    public function getApiPageName($action)
    {
        switch (strtolower($action)) {
            case Config("API_VIEW_ACTION"):
                return "IvfEmbryologyChartView";
            case Config("API_ADD_ACTION"):
                return "IvfEmbryologyChartAdd";
            case Config("API_EDIT_ACTION"):
                return "IvfEmbryologyChartEdit";
            case Config("API_DELETE_ACTION"):
                return "IvfEmbryologyChartDelete";
            case Config("API_LIST_ACTION"):
                return "IvfEmbryologyChartList";
            default:
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
        if ($this->getCurrentMasterTable() == "ivf_treatment_plan" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
            $url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
            $url .= "&" . GetForeignKeyUrl("fk_RIDNO", $this->RIDNo->CurrentValue ?? $this->RIDNo->getSessionValue());
            $url .= "&" . GetForeignKeyUrl("fk_Name", $this->Name->CurrentValue ?? $this->Name->getSessionValue());
            $url .= "&" . GetForeignKeyUrl("fk_id", $this->TidNo->CurrentValue ?? $this->TidNo->getSessionValue());
        }
        if ($this->getCurrentMasterTable() == "ivf_oocytedenudation" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
            $url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
            $url .= "&" . GetForeignKeyUrl("fk_id", $this->DidNO->CurrentValue ?? $this->DidNO->getSessionValue());
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
        $this->RIDNo->setDbValue($row['RIDNo']);
        $this->Name->setDbValue($row['Name']);
        $this->ARTCycle->setDbValue($row['ARTCycle']);
        $this->SpermOrigin->setDbValue($row['SpermOrigin']);
        $this->InseminatinTechnique->setDbValue($row['InseminatinTechnique']);
        $this->IndicationForART->setDbValue($row['IndicationForART']);
        $this->Day0sino->setDbValue($row['Day0sino']);
        $this->Day0OocyteStage->setDbValue($row['Day0OocyteStage']);
        $this->Day0PolarBodyPosition->setDbValue($row['Day0PolarBodyPosition']);
        $this->Day0Breakage->setDbValue($row['Day0Breakage']);
        $this->Day0Attempts->setDbValue($row['Day0Attempts']);
        $this->Day0SPZMorpho->setDbValue($row['Day0SPZMorpho']);
        $this->Day0SPZLocation->setDbValue($row['Day0SPZLocation']);
        $this->Day0SpOrgin->setDbValue($row['Day0SpOrgin']);
        $this->Day5Cryoptop->setDbValue($row['Day5Cryoptop']);
        $this->Day1Sperm->setDbValue($row['Day1Sperm']);
        $this->Day1PN->setDbValue($row['Day1PN']);
        $this->Day1PB->setDbValue($row['Day1PB']);
        $this->Day1Pronucleus->setDbValue($row['Day1Pronucleus']);
        $this->Day1Nucleolus->setDbValue($row['Day1Nucleolus']);
        $this->Day1Halo->setDbValue($row['Day1Halo']);
        $this->Day2SiNo->setDbValue($row['Day2SiNo']);
        $this->Day2CellNo->setDbValue($row['Day2CellNo']);
        $this->Day2Frag->setDbValue($row['Day2Frag']);
        $this->Day2Symmetry->setDbValue($row['Day2Symmetry']);
        $this->Day2Cryoptop->setDbValue($row['Day2Cryoptop']);
        $this->Day2Grade->setDbValue($row['Day2Grade']);
        $this->Day2End->setDbValue($row['Day2End']);
        $this->Day3Sino->setDbValue($row['Day3Sino']);
        $this->Day3CellNo->setDbValue($row['Day3CellNo']);
        $this->Day3Frag->setDbValue($row['Day3Frag']);
        $this->Day3Symmetry->setDbValue($row['Day3Symmetry']);
        $this->Day3ZP->setDbValue($row['Day3ZP']);
        $this->Day3Vacoules->setDbValue($row['Day3Vacoules']);
        $this->Day3Grade->setDbValue($row['Day3Grade']);
        $this->Day3Cryoptop->setDbValue($row['Day3Cryoptop']);
        $this->Day3End->setDbValue($row['Day3End']);
        $this->Day4SiNo->setDbValue($row['Day4SiNo']);
        $this->Day4CellNo->setDbValue($row['Day4CellNo']);
        $this->Day4Frag->setDbValue($row['Day4Frag']);
        $this->Day4Symmetry->setDbValue($row['Day4Symmetry']);
        $this->Day4Grade->setDbValue($row['Day4Grade']);
        $this->Day4Cryoptop->setDbValue($row['Day4Cryoptop']);
        $this->Day4End->setDbValue($row['Day4End']);
        $this->Day5CellNo->setDbValue($row['Day5CellNo']);
        $this->Day5ICM->setDbValue($row['Day5ICM']);
        $this->Day5TE->setDbValue($row['Day5TE']);
        $this->Day5Observation->setDbValue($row['Day5Observation']);
        $this->Day5Collapsed->setDbValue($row['Day5Collapsed']);
        $this->Day5Vacoulles->setDbValue($row['Day5Vacoulles']);
        $this->Day5Grade->setDbValue($row['Day5Grade']);
        $this->Day6CellNo->setDbValue($row['Day6CellNo']);
        $this->Day6ICM->setDbValue($row['Day6ICM']);
        $this->Day6TE->setDbValue($row['Day6TE']);
        $this->Day6Observation->setDbValue($row['Day6Observation']);
        $this->Day6Collapsed->setDbValue($row['Day6Collapsed']);
        $this->Day6Vacoulles->setDbValue($row['Day6Vacoulles']);
        $this->Day6Grade->setDbValue($row['Day6Grade']);
        $this->Day6Cryoptop->setDbValue($row['Day6Cryoptop']);
        $this->EndSiNo->setDbValue($row['EndSiNo']);
        $this->EndingDay->setDbValue($row['EndingDay']);
        $this->EndingCellStage->setDbValue($row['EndingCellStage']);
        $this->EndingGrade->setDbValue($row['EndingGrade']);
        $this->EndingState->setDbValue($row['EndingState']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->DidNO->setDbValue($row['DidNO']);
        $this->ICSiIVFDateTime->setDbValue($row['ICSiIVFDateTime']);
        $this->PrimaryEmbrologist->setDbValue($row['PrimaryEmbrologist']);
        $this->SecondaryEmbrologist->setDbValue($row['SecondaryEmbrologist']);
        $this->Incubator->setDbValue($row['Incubator']);
        $this->location->setDbValue($row['location']);
        $this->OocyteNo->setDbValue($row['OocyteNo']);
        $this->Stage->setDbValue($row['Stage']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->vitrificationDate->setDbValue($row['vitrificationDate']);
        $this->vitriPrimaryEmbryologist->setDbValue($row['vitriPrimaryEmbryologist']);
        $this->vitriSecondaryEmbryologist->setDbValue($row['vitriSecondaryEmbryologist']);
        $this->vitriEmbryoNo->setDbValue($row['vitriEmbryoNo']);
        $this->thawReFrozen->setDbValue($row['thawReFrozen']);
        $this->vitriFertilisationDate->setDbValue($row['vitriFertilisationDate']);
        $this->vitriDay->setDbValue($row['vitriDay']);
        $this->vitriStage->setDbValue($row['vitriStage']);
        $this->vitriGrade->setDbValue($row['vitriGrade']);
        $this->vitriIncubator->setDbValue($row['vitriIncubator']);
        $this->vitriTank->setDbValue($row['vitriTank']);
        $this->vitriCanister->setDbValue($row['vitriCanister']);
        $this->vitriGobiet->setDbValue($row['vitriGobiet']);
        $this->vitriViscotube->setDbValue($row['vitriViscotube']);
        $this->vitriCryolockNo->setDbValue($row['vitriCryolockNo']);
        $this->vitriCryolockColour->setDbValue($row['vitriCryolockColour']);
        $this->thawDate->setDbValue($row['thawDate']);
        $this->thawPrimaryEmbryologist->setDbValue($row['thawPrimaryEmbryologist']);
        $this->thawSecondaryEmbryologist->setDbValue($row['thawSecondaryEmbryologist']);
        $this->thawET->setDbValue($row['thawET']);
        $this->thawAbserve->setDbValue($row['thawAbserve']);
        $this->thawDiscard->setDbValue($row['thawDiscard']);
        $this->ETCatheter->setDbValue($row['ETCatheter']);
        $this->ETDifficulty->setDbValue($row['ETDifficulty']);
        $this->ETEasy->setDbValue($row['ETEasy']);
        $this->ETComments->setDbValue($row['ETComments']);
        $this->ETDoctor->setDbValue($row['ETDoctor']);
        $this->ETEmbryologist->setDbValue($row['ETEmbryologist']);
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

        // Day0sino

        // Day0OocyteStage

        // Day0PolarBodyPosition

        // Day0Breakage

        // Day0Attempts

        // Day0SPZMorpho

        // Day0SPZLocation

        // Day0SpOrgin

        // Day5Cryoptop

        // Day1Sperm

        // Day1PN

        // Day1PB

        // Day1Pronucleus

        // Day1Nucleolus

        // Day1Halo

        // Day2SiNo

        // Day2CellNo

        // Day2Frag

        // Day2Symmetry

        // Day2Cryoptop

        // Day2Grade

        // Day2End

        // Day3Sino

        // Day3CellNo

        // Day3Frag

        // Day3Symmetry

        // Day3ZP

        // Day3Vacoules

        // Day3Grade

        // Day3Cryoptop

        // Day3End

        // Day4SiNo

        // Day4CellNo

        // Day4Frag

        // Day4Symmetry

        // Day4Grade

        // Day4Cryoptop

        // Day4End

        // Day5CellNo

        // Day5ICM

        // Day5TE

        // Day5Observation

        // Day5Collapsed

        // Day5Vacoulles

        // Day5Grade

        // Day6CellNo

        // Day6ICM

        // Day6TE

        // Day6Observation

        // Day6Collapsed

        // Day6Vacoulles

        // Day6Grade

        // Day6Cryoptop

        // EndSiNo

        // EndingDay

        // EndingCellStage

        // EndingGrade

        // EndingState

        // TidNo

        // DidNO

        // ICSiIVFDateTime

        // PrimaryEmbrologist

        // SecondaryEmbrologist

        // Incubator

        // location

        // OocyteNo

        // Stage

        // Remarks

        // vitrificationDate

        // vitriPrimaryEmbryologist

        // vitriSecondaryEmbryologist

        // vitriEmbryoNo

        // thawReFrozen

        // vitriFertilisationDate

        // vitriDay

        // vitriStage

        // vitriGrade

        // vitriIncubator

        // vitriTank

        // vitriCanister

        // vitriGobiet

        // vitriViscotube

        // vitriCryolockNo

        // vitriCryolockColour

        // thawDate

        // thawPrimaryEmbryologist

        // thawSecondaryEmbryologist

        // thawET

        // thawAbserve

        // thawDiscard

        // ETCatheter

        // ETDifficulty

        // ETEasy

        // ETComments

        // ETDoctor

        // ETEmbryologist

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

        // Day0sino
        $this->Day0sino->ViewValue = $this->Day0sino->CurrentValue;
        $this->Day0sino->ViewCustomAttributes = "";

        // Day0OocyteStage
        $this->Day0OocyteStage->ViewValue = $this->Day0OocyteStage->CurrentValue;
        $this->Day0OocyteStage->ViewCustomAttributes = "";

        // Day0PolarBodyPosition
        if (strval($this->Day0PolarBodyPosition->CurrentValue) != "") {
            $this->Day0PolarBodyPosition->ViewValue = $this->Day0PolarBodyPosition->optionCaption($this->Day0PolarBodyPosition->CurrentValue);
        } else {
            $this->Day0PolarBodyPosition->ViewValue = null;
        }
        $this->Day0PolarBodyPosition->ViewCustomAttributes = "";

        // Day0Breakage
        if (strval($this->Day0Breakage->CurrentValue) != "") {
            $this->Day0Breakage->ViewValue = $this->Day0Breakage->optionCaption($this->Day0Breakage->CurrentValue);
        } else {
            $this->Day0Breakage->ViewValue = null;
        }
        $this->Day0Breakage->ViewCustomAttributes = "";

        // Day0Attempts
        if (strval($this->Day0Attempts->CurrentValue) != "") {
            $this->Day0Attempts->ViewValue = $this->Day0Attempts->optionCaption($this->Day0Attempts->CurrentValue);
        } else {
            $this->Day0Attempts->ViewValue = null;
        }
        $this->Day0Attempts->ViewCustomAttributes = "";

        // Day0SPZMorpho
        if (strval($this->Day0SPZMorpho->CurrentValue) != "") {
            $this->Day0SPZMorpho->ViewValue = $this->Day0SPZMorpho->optionCaption($this->Day0SPZMorpho->CurrentValue);
        } else {
            $this->Day0SPZMorpho->ViewValue = null;
        }
        $this->Day0SPZMorpho->ViewCustomAttributes = "";

        // Day0SPZLocation
        if (strval($this->Day0SPZLocation->CurrentValue) != "") {
            $this->Day0SPZLocation->ViewValue = $this->Day0SPZLocation->optionCaption($this->Day0SPZLocation->CurrentValue);
        } else {
            $this->Day0SPZLocation->ViewValue = null;
        }
        $this->Day0SPZLocation->ViewCustomAttributes = "";

        // Day0SpOrgin
        if (strval($this->Day0SpOrgin->CurrentValue) != "") {
            $this->Day0SpOrgin->ViewValue = $this->Day0SpOrgin->optionCaption($this->Day0SpOrgin->CurrentValue);
        } else {
            $this->Day0SpOrgin->ViewValue = null;
        }
        $this->Day0SpOrgin->ViewCustomAttributes = "";

        // Day5Cryoptop
        if (strval($this->Day5Cryoptop->CurrentValue) != "") {
            $this->Day5Cryoptop->ViewValue = $this->Day5Cryoptop->optionCaption($this->Day5Cryoptop->CurrentValue);
        } else {
            $this->Day5Cryoptop->ViewValue = null;
        }
        $this->Day5Cryoptop->ViewCustomAttributes = "";

        // Day1Sperm
        $this->Day1Sperm->ViewValue = $this->Day1Sperm->CurrentValue;
        $this->Day1Sperm->ViewCustomAttributes = "";

        // Day1PN
        if (strval($this->Day1PN->CurrentValue) != "") {
            $this->Day1PN->ViewValue = $this->Day1PN->optionCaption($this->Day1PN->CurrentValue);
        } else {
            $this->Day1PN->ViewValue = null;
        }
        $this->Day1PN->ViewCustomAttributes = "";

        // Day1PB
        if (strval($this->Day1PB->CurrentValue) != "") {
            $this->Day1PB->ViewValue = $this->Day1PB->optionCaption($this->Day1PB->CurrentValue);
        } else {
            $this->Day1PB->ViewValue = null;
        }
        $this->Day1PB->ViewCustomAttributes = "";

        // Day1Pronucleus
        if (strval($this->Day1Pronucleus->CurrentValue) != "") {
            $this->Day1Pronucleus->ViewValue = $this->Day1Pronucleus->optionCaption($this->Day1Pronucleus->CurrentValue);
        } else {
            $this->Day1Pronucleus->ViewValue = null;
        }
        $this->Day1Pronucleus->ViewCustomAttributes = "";

        // Day1Nucleolus
        if (strval($this->Day1Nucleolus->CurrentValue) != "") {
            $this->Day1Nucleolus->ViewValue = $this->Day1Nucleolus->optionCaption($this->Day1Nucleolus->CurrentValue);
        } else {
            $this->Day1Nucleolus->ViewValue = null;
        }
        $this->Day1Nucleolus->ViewCustomAttributes = "";

        // Day1Halo
        if (strval($this->Day1Halo->CurrentValue) != "") {
            $this->Day1Halo->ViewValue = $this->Day1Halo->optionCaption($this->Day1Halo->CurrentValue);
        } else {
            $this->Day1Halo->ViewValue = null;
        }
        $this->Day1Halo->ViewCustomAttributes = "";

        // Day2SiNo
        $this->Day2SiNo->ViewValue = $this->Day2SiNo->CurrentValue;
        $this->Day2SiNo->ViewCustomAttributes = "";

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

        // Day2Grade
        $this->Day2Grade->ViewValue = $this->Day2Grade->CurrentValue;
        $this->Day2Grade->ViewCustomAttributes = "";

        // Day2End
        if (strval($this->Day2End->CurrentValue) != "") {
            $this->Day2End->ViewValue = $this->Day2End->optionCaption($this->Day2End->CurrentValue);
        } else {
            $this->Day2End->ViewValue = null;
        }
        $this->Day2End->ViewCustomAttributes = "";

        // Day3Sino
        $this->Day3Sino->ViewValue = $this->Day3Sino->CurrentValue;
        $this->Day3Sino->ViewCustomAttributes = "";

        // Day3CellNo
        $this->Day3CellNo->ViewValue = $this->Day3CellNo->CurrentValue;
        $this->Day3CellNo->ViewCustomAttributes = "";

        // Day3Frag
        if (strval($this->Day3Frag->CurrentValue) != "") {
            $this->Day3Frag->ViewValue = $this->Day3Frag->optionCaption($this->Day3Frag->CurrentValue);
        } else {
            $this->Day3Frag->ViewValue = null;
        }
        $this->Day3Frag->ViewCustomAttributes = "";

        // Day3Symmetry
        if (strval($this->Day3Symmetry->CurrentValue) != "") {
            $this->Day3Symmetry->ViewValue = $this->Day3Symmetry->optionCaption($this->Day3Symmetry->CurrentValue);
        } else {
            $this->Day3Symmetry->ViewValue = null;
        }
        $this->Day3Symmetry->ViewCustomAttributes = "";

        // Day3ZP
        if (strval($this->Day3ZP->CurrentValue) != "") {
            $this->Day3ZP->ViewValue = $this->Day3ZP->optionCaption($this->Day3ZP->CurrentValue);
        } else {
            $this->Day3ZP->ViewValue = null;
        }
        $this->Day3ZP->ViewCustomAttributes = "";

        // Day3Vacoules
        if (strval($this->Day3Vacoules->CurrentValue) != "") {
            $this->Day3Vacoules->ViewValue = $this->Day3Vacoules->optionCaption($this->Day3Vacoules->CurrentValue);
        } else {
            $this->Day3Vacoules->ViewValue = null;
        }
        $this->Day3Vacoules->ViewCustomAttributes = "";

        // Day3Grade
        if (strval($this->Day3Grade->CurrentValue) != "") {
            $this->Day3Grade->ViewValue = $this->Day3Grade->optionCaption($this->Day3Grade->CurrentValue);
        } else {
            $this->Day3Grade->ViewValue = null;
        }
        $this->Day3Grade->ViewCustomAttributes = "";

        // Day3Cryoptop
        if (strval($this->Day3Cryoptop->CurrentValue) != "") {
            $this->Day3Cryoptop->ViewValue = $this->Day3Cryoptop->optionCaption($this->Day3Cryoptop->CurrentValue);
        } else {
            $this->Day3Cryoptop->ViewValue = null;
        }
        $this->Day3Cryoptop->ViewCustomAttributes = "";

        // Day3End
        if (strval($this->Day3End->CurrentValue) != "") {
            $this->Day3End->ViewValue = $this->Day3End->optionCaption($this->Day3End->CurrentValue);
        } else {
            $this->Day3End->ViewValue = null;
        }
        $this->Day3End->ViewCustomAttributes = "";

        // Day4SiNo
        $this->Day4SiNo->ViewValue = $this->Day4SiNo->CurrentValue;
        $this->Day4SiNo->ViewCustomAttributes = "";

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
        if (strval($this->Day4Cryoptop->CurrentValue) != "") {
            $this->Day4Cryoptop->ViewValue = $this->Day4Cryoptop->optionCaption($this->Day4Cryoptop->CurrentValue);
        } else {
            $this->Day4Cryoptop->ViewValue = null;
        }
        $this->Day4Cryoptop->ViewCustomAttributes = "";

        // Day4End
        if (strval($this->Day4End->CurrentValue) != "") {
            $this->Day4End->ViewValue = $this->Day4End->optionCaption($this->Day4End->CurrentValue);
        } else {
            $this->Day4End->ViewValue = null;
        }
        $this->Day4End->ViewCustomAttributes = "";

        // Day5CellNo
        $this->Day5CellNo->ViewValue = $this->Day5CellNo->CurrentValue;
        $this->Day5CellNo->ViewCustomAttributes = "";

        // Day5ICM
        if (strval($this->Day5ICM->CurrentValue) != "") {
            $this->Day5ICM->ViewValue = $this->Day5ICM->optionCaption($this->Day5ICM->CurrentValue);
        } else {
            $this->Day5ICM->ViewValue = null;
        }
        $this->Day5ICM->ViewCustomAttributes = "";

        // Day5TE
        if (strval($this->Day5TE->CurrentValue) != "") {
            $this->Day5TE->ViewValue = $this->Day5TE->optionCaption($this->Day5TE->CurrentValue);
        } else {
            $this->Day5TE->ViewValue = null;
        }
        $this->Day5TE->ViewCustomAttributes = "";

        // Day5Observation
        if (strval($this->Day5Observation->CurrentValue) != "") {
            $this->Day5Observation->ViewValue = $this->Day5Observation->optionCaption($this->Day5Observation->CurrentValue);
        } else {
            $this->Day5Observation->ViewValue = null;
        }
        $this->Day5Observation->ViewCustomAttributes = "";

        // Day5Collapsed
        if (strval($this->Day5Collapsed->CurrentValue) != "") {
            $this->Day5Collapsed->ViewValue = $this->Day5Collapsed->optionCaption($this->Day5Collapsed->CurrentValue);
        } else {
            $this->Day5Collapsed->ViewValue = null;
        }
        $this->Day5Collapsed->ViewCustomAttributes = "";

        // Day5Vacoulles
        if (strval($this->Day5Vacoulles->CurrentValue) != "") {
            $this->Day5Vacoulles->ViewValue = $this->Day5Vacoulles->optionCaption($this->Day5Vacoulles->CurrentValue);
        } else {
            $this->Day5Vacoulles->ViewValue = null;
        }
        $this->Day5Vacoulles->ViewCustomAttributes = "";

        // Day5Grade
        if (strval($this->Day5Grade->CurrentValue) != "") {
            $this->Day5Grade->ViewValue = $this->Day5Grade->optionCaption($this->Day5Grade->CurrentValue);
        } else {
            $this->Day5Grade->ViewValue = null;
        }
        $this->Day5Grade->ViewCustomAttributes = "";

        // Day6CellNo
        $this->Day6CellNo->ViewValue = $this->Day6CellNo->CurrentValue;
        $this->Day6CellNo->ViewCustomAttributes = "";

        // Day6ICM
        if (strval($this->Day6ICM->CurrentValue) != "") {
            $this->Day6ICM->ViewValue = $this->Day6ICM->optionCaption($this->Day6ICM->CurrentValue);
        } else {
            $this->Day6ICM->ViewValue = null;
        }
        $this->Day6ICM->ViewCustomAttributes = "";

        // Day6TE
        if (strval($this->Day6TE->CurrentValue) != "") {
            $this->Day6TE->ViewValue = $this->Day6TE->optionCaption($this->Day6TE->CurrentValue);
        } else {
            $this->Day6TE->ViewValue = null;
        }
        $this->Day6TE->ViewCustomAttributes = "";

        // Day6Observation
        if (strval($this->Day6Observation->CurrentValue) != "") {
            $this->Day6Observation->ViewValue = $this->Day6Observation->optionCaption($this->Day6Observation->CurrentValue);
        } else {
            $this->Day6Observation->ViewValue = null;
        }
        $this->Day6Observation->ViewCustomAttributes = "";

        // Day6Collapsed
        if (strval($this->Day6Collapsed->CurrentValue) != "") {
            $this->Day6Collapsed->ViewValue = $this->Day6Collapsed->optionCaption($this->Day6Collapsed->CurrentValue);
        } else {
            $this->Day6Collapsed->ViewValue = null;
        }
        $this->Day6Collapsed->ViewCustomAttributes = "";

        // Day6Vacoulles
        if (strval($this->Day6Vacoulles->CurrentValue) != "") {
            $this->Day6Vacoulles->ViewValue = $this->Day6Vacoulles->optionCaption($this->Day6Vacoulles->CurrentValue);
        } else {
            $this->Day6Vacoulles->ViewValue = null;
        }
        $this->Day6Vacoulles->ViewCustomAttributes = "";

        // Day6Grade
        if (strval($this->Day6Grade->CurrentValue) != "") {
            $this->Day6Grade->ViewValue = $this->Day6Grade->optionCaption($this->Day6Grade->CurrentValue);
        } else {
            $this->Day6Grade->ViewValue = null;
        }
        $this->Day6Grade->ViewCustomAttributes = "";

        // Day6Cryoptop
        $this->Day6Cryoptop->ViewValue = $this->Day6Cryoptop->CurrentValue;
        $this->Day6Cryoptop->ViewCustomAttributes = "";

        // EndSiNo
        $this->EndSiNo->ViewValue = $this->EndSiNo->CurrentValue;
        $this->EndSiNo->ViewCustomAttributes = "";

        // EndingDay
        if (strval($this->EndingDay->CurrentValue) != "") {
            $this->EndingDay->ViewValue = $this->EndingDay->optionCaption($this->EndingDay->CurrentValue);
        } else {
            $this->EndingDay->ViewValue = null;
        }
        $this->EndingDay->ViewCustomAttributes = "";

        // EndingCellStage
        $this->EndingCellStage->ViewValue = $this->EndingCellStage->CurrentValue;
        $this->EndingCellStage->ViewCustomAttributes = "";

        // EndingGrade
        if (strval($this->EndingGrade->CurrentValue) != "") {
            $this->EndingGrade->ViewValue = $this->EndingGrade->optionCaption($this->EndingGrade->CurrentValue);
        } else {
            $this->EndingGrade->ViewValue = null;
        }
        $this->EndingGrade->ViewCustomAttributes = "";

        // EndingState
        if (strval($this->EndingState->CurrentValue) != "") {
            $this->EndingState->ViewValue = $this->EndingState->optionCaption($this->EndingState->CurrentValue);
        } else {
            $this->EndingState->ViewValue = null;
        }
        $this->EndingState->ViewCustomAttributes = "";

        // TidNo
        $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
        $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
        $this->TidNo->ViewCustomAttributes = "";

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

        // OocyteNo
        $this->OocyteNo->ViewValue = $this->OocyteNo->CurrentValue;
        $this->OocyteNo->ViewCustomAttributes = "";

        // Stage
        if (strval($this->Stage->CurrentValue) != "") {
            $this->Stage->ViewValue = $this->Stage->optionCaption($this->Stage->CurrentValue);
        } else {
            $this->Stage->ViewValue = null;
        }
        $this->Stage->ViewCustomAttributes = "";

        // Remarks
        $this->Remarks->ViewValue = $this->Remarks->CurrentValue;
        $this->Remarks->ViewCustomAttributes = "";

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

        // thawReFrozen
        if (strval($this->thawReFrozen->CurrentValue) != "") {
            $this->thawReFrozen->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->thawReFrozen->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->thawReFrozen->ViewValue->add($this->thawReFrozen->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->thawReFrozen->ViewValue = null;
        }
        $this->thawReFrozen->ViewCustomAttributes = "";

        // vitriFertilisationDate
        $this->vitriFertilisationDate->ViewValue = $this->vitriFertilisationDate->CurrentValue;
        $this->vitriFertilisationDate->ViewValue = FormatDateTime($this->vitriFertilisationDate->ViewValue, 0);
        $this->vitriFertilisationDate->ViewCustomAttributes = "";

        // vitriDay
        if (strval($this->vitriDay->CurrentValue) != "") {
            $this->vitriDay->ViewValue = $this->vitriDay->optionCaption($this->vitriDay->CurrentValue);
        } else {
            $this->vitriDay->ViewValue = null;
        }
        $this->vitriDay->ViewCustomAttributes = "";

        // vitriStage
        $this->vitriStage->ViewValue = $this->vitriStage->CurrentValue;
        $this->vitriStage->ViewCustomAttributes = "";

        // vitriGrade
        if (strval($this->vitriGrade->CurrentValue) != "") {
            $this->vitriGrade->ViewValue = $this->vitriGrade->optionCaption($this->vitriGrade->CurrentValue);
        } else {
            $this->vitriGrade->ViewValue = null;
        }
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
        if (strval($this->thawET->CurrentValue) != "") {
            $this->thawET->ViewValue = $this->thawET->optionCaption($this->thawET->CurrentValue);
        } else {
            $this->thawET->ViewValue = null;
        }
        $this->thawET->ViewCustomAttributes = "";

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
        if (strval($this->ETDifficulty->CurrentValue) != "") {
            $this->ETDifficulty->ViewValue = $this->ETDifficulty->optionCaption($this->ETDifficulty->CurrentValue);
        } else {
            $this->ETDifficulty->ViewValue = null;
        }
        $this->ETDifficulty->ViewCustomAttributes = "";

        // ETEasy
        if (strval($this->ETEasy->CurrentValue) != "") {
            $this->ETEasy->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->ETEasy->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->ETEasy->ViewValue->add($this->ETEasy->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->ETEasy->ViewValue = null;
        }
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

        // ETDate
        $this->ETDate->ViewValue = $this->ETDate->CurrentValue;
        $this->ETDate->ViewValue = FormatDateTime($this->ETDate->ViewValue, 0);
        $this->ETDate->ViewCustomAttributes = "";

        // Day1End
        if (strval($this->Day1End->CurrentValue) != "") {
            $this->Day1End->ViewValue = $this->Day1End->optionCaption($this->Day1End->CurrentValue);
        } else {
            $this->Day1End->ViewValue = null;
        }
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

        // Day0sino
        $this->Day0sino->LinkCustomAttributes = "";
        $this->Day0sino->HrefValue = "";
        $this->Day0sino->TooltipValue = "";

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

        // Day0SpOrgin
        $this->Day0SpOrgin->LinkCustomAttributes = "";
        $this->Day0SpOrgin->HrefValue = "";
        $this->Day0SpOrgin->TooltipValue = "";

        // Day5Cryoptop
        $this->Day5Cryoptop->LinkCustomAttributes = "";
        $this->Day5Cryoptop->HrefValue = "";
        $this->Day5Cryoptop->TooltipValue = "";

        // Day1Sperm
        $this->Day1Sperm->LinkCustomAttributes = "";
        $this->Day1Sperm->HrefValue = "";
        $this->Day1Sperm->TooltipValue = "";

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

        // Day2SiNo
        $this->Day2SiNo->LinkCustomAttributes = "";
        $this->Day2SiNo->HrefValue = "";
        $this->Day2SiNo->TooltipValue = "";

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

        // Day2Grade
        $this->Day2Grade->LinkCustomAttributes = "";
        $this->Day2Grade->HrefValue = "";
        $this->Day2Grade->TooltipValue = "";

        // Day2End
        $this->Day2End->LinkCustomAttributes = "";
        $this->Day2End->HrefValue = "";
        $this->Day2End->TooltipValue = "";

        // Day3Sino
        $this->Day3Sino->LinkCustomAttributes = "";
        $this->Day3Sino->HrefValue = "";
        $this->Day3Sino->TooltipValue = "";

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

        // Day3ZP
        $this->Day3ZP->LinkCustomAttributes = "";
        $this->Day3ZP->HrefValue = "";
        $this->Day3ZP->TooltipValue = "";

        // Day3Vacoules
        $this->Day3Vacoules->LinkCustomAttributes = "";
        $this->Day3Vacoules->HrefValue = "";
        $this->Day3Vacoules->TooltipValue = "";

        // Day3Grade
        $this->Day3Grade->LinkCustomAttributes = "";
        $this->Day3Grade->HrefValue = "";
        $this->Day3Grade->TooltipValue = "";

        // Day3Cryoptop
        $this->Day3Cryoptop->LinkCustomAttributes = "";
        $this->Day3Cryoptop->HrefValue = "";
        $this->Day3Cryoptop->TooltipValue = "";

        // Day3End
        $this->Day3End->LinkCustomAttributes = "";
        $this->Day3End->HrefValue = "";
        $this->Day3End->TooltipValue = "";

        // Day4SiNo
        $this->Day4SiNo->LinkCustomAttributes = "";
        $this->Day4SiNo->HrefValue = "";
        $this->Day4SiNo->TooltipValue = "";

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

        // Day4End
        $this->Day4End->LinkCustomAttributes = "";
        $this->Day4End->HrefValue = "";
        $this->Day4End->TooltipValue = "";

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

        // EndSiNo
        $this->EndSiNo->LinkCustomAttributes = "";
        $this->EndSiNo->HrefValue = "";
        $this->EndSiNo->TooltipValue = "";

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

        // TidNo
        $this->TidNo->LinkCustomAttributes = "";
        $this->TidNo->HrefValue = "";
        $this->TidNo->TooltipValue = "";

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

        // OocyteNo
        $this->OocyteNo->LinkCustomAttributes = "";
        $this->OocyteNo->HrefValue = "";
        $this->OocyteNo->TooltipValue = "";

        // Stage
        $this->Stage->LinkCustomAttributes = "";
        $this->Stage->HrefValue = "";
        $this->Stage->TooltipValue = "";

        // Remarks
        $this->Remarks->LinkCustomAttributes = "";
        $this->Remarks->HrefValue = "";
        $this->Remarks->TooltipValue = "";

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

        // thawReFrozen
        $this->thawReFrozen->LinkCustomAttributes = "";
        $this->thawReFrozen->HrefValue = "";
        $this->thawReFrozen->TooltipValue = "";

        // vitriFertilisationDate
        $this->vitriFertilisationDate->LinkCustomAttributes = "";
        $this->vitriFertilisationDate->HrefValue = "";
        $this->vitriFertilisationDate->TooltipValue = "";

        // vitriDay
        $this->vitriDay->LinkCustomAttributes = "";
        $this->vitriDay->HrefValue = "";
        $this->vitriDay->TooltipValue = "";

        // vitriStage
        $this->vitriStage->LinkCustomAttributes = "";
        $this->vitriStage->HrefValue = "";
        $this->vitriStage->TooltipValue = "";

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
        $this->RIDNo->EditValue = FormatNumber($this->RIDNo->EditValue, 0, -2, -2, -2);
        $this->RIDNo->ViewCustomAttributes = "";

        // Name
        $this->Name->EditAttrs["class"] = "form-control";
        $this->Name->EditCustomAttributes = "";
        $this->Name->EditValue = $this->Name->CurrentValue;
        $this->Name->ViewCustomAttributes = "";

        // ARTCycle
        $this->ARTCycle->EditAttrs["class"] = "form-control";
        $this->ARTCycle->EditCustomAttributes = "";
        $this->ARTCycle->EditValue = $this->ARTCycle->CurrentValue;
        $this->ARTCycle->ViewCustomAttributes = "";

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

        // Day0sino
        $this->Day0sino->EditAttrs["class"] = "form-control";
        $this->Day0sino->EditCustomAttributes = "";
        if (!$this->Day0sino->Raw) {
            $this->Day0sino->CurrentValue = HtmlDecode($this->Day0sino->CurrentValue);
        }
        $this->Day0sino->EditValue = $this->Day0sino->CurrentValue;
        $this->Day0sino->PlaceHolder = RemoveHtml($this->Day0sino->caption());

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
        $this->Day0PolarBodyPosition->EditValue = $this->Day0PolarBodyPosition->options(true);
        $this->Day0PolarBodyPosition->PlaceHolder = RemoveHtml($this->Day0PolarBodyPosition->caption());

        // Day0Breakage
        $this->Day0Breakage->EditAttrs["class"] = "form-control";
        $this->Day0Breakage->EditCustomAttributes = "";
        $this->Day0Breakage->EditValue = $this->Day0Breakage->options(true);
        $this->Day0Breakage->PlaceHolder = RemoveHtml($this->Day0Breakage->caption());

        // Day0Attempts
        $this->Day0Attempts->EditAttrs["class"] = "form-control";
        $this->Day0Attempts->EditCustomAttributes = "";
        $this->Day0Attempts->EditValue = $this->Day0Attempts->options(true);
        $this->Day0Attempts->PlaceHolder = RemoveHtml($this->Day0Attempts->caption());

        // Day0SPZMorpho
        $this->Day0SPZMorpho->EditAttrs["class"] = "form-control";
        $this->Day0SPZMorpho->EditCustomAttributes = "";
        $this->Day0SPZMorpho->EditValue = $this->Day0SPZMorpho->options(true);
        $this->Day0SPZMorpho->PlaceHolder = RemoveHtml($this->Day0SPZMorpho->caption());

        // Day0SPZLocation
        $this->Day0SPZLocation->EditAttrs["class"] = "form-control";
        $this->Day0SPZLocation->EditCustomAttributes = "";
        $this->Day0SPZLocation->EditValue = $this->Day0SPZLocation->options(true);
        $this->Day0SPZLocation->PlaceHolder = RemoveHtml($this->Day0SPZLocation->caption());

        // Day0SpOrgin
        $this->Day0SpOrgin->EditAttrs["class"] = "form-control";
        $this->Day0SpOrgin->EditCustomAttributes = "";
        $this->Day0SpOrgin->EditValue = $this->Day0SpOrgin->options(true);
        $this->Day0SpOrgin->PlaceHolder = RemoveHtml($this->Day0SpOrgin->caption());

        // Day5Cryoptop
        $this->Day5Cryoptop->EditAttrs["class"] = "form-control";
        $this->Day5Cryoptop->EditCustomAttributes = "";
        $this->Day5Cryoptop->EditValue = $this->Day5Cryoptop->options(true);
        $this->Day5Cryoptop->PlaceHolder = RemoveHtml($this->Day5Cryoptop->caption());

        // Day1Sperm
        $this->Day1Sperm->EditAttrs["class"] = "form-control";
        $this->Day1Sperm->EditCustomAttributes = "";
        if (!$this->Day1Sperm->Raw) {
            $this->Day1Sperm->CurrentValue = HtmlDecode($this->Day1Sperm->CurrentValue);
        }
        $this->Day1Sperm->EditValue = $this->Day1Sperm->CurrentValue;
        $this->Day1Sperm->PlaceHolder = RemoveHtml($this->Day1Sperm->caption());

        // Day1PN
        $this->Day1PN->EditAttrs["class"] = "form-control";
        $this->Day1PN->EditCustomAttributes = "";
        $this->Day1PN->EditValue = $this->Day1PN->options(true);
        $this->Day1PN->PlaceHolder = RemoveHtml($this->Day1PN->caption());

        // Day1PB
        $this->Day1PB->EditAttrs["class"] = "form-control";
        $this->Day1PB->EditCustomAttributes = "";
        $this->Day1PB->EditValue = $this->Day1PB->options(true);
        $this->Day1PB->PlaceHolder = RemoveHtml($this->Day1PB->caption());

        // Day1Pronucleus
        $this->Day1Pronucleus->EditAttrs["class"] = "form-control";
        $this->Day1Pronucleus->EditCustomAttributes = "";
        $this->Day1Pronucleus->EditValue = $this->Day1Pronucleus->options(true);
        $this->Day1Pronucleus->PlaceHolder = RemoveHtml($this->Day1Pronucleus->caption());

        // Day1Nucleolus
        $this->Day1Nucleolus->EditAttrs["class"] = "form-control";
        $this->Day1Nucleolus->EditCustomAttributes = "";
        $this->Day1Nucleolus->EditValue = $this->Day1Nucleolus->options(true);
        $this->Day1Nucleolus->PlaceHolder = RemoveHtml($this->Day1Nucleolus->caption());

        // Day1Halo
        $this->Day1Halo->EditAttrs["class"] = "form-control";
        $this->Day1Halo->EditCustomAttributes = "";
        $this->Day1Halo->EditValue = $this->Day1Halo->options(true);
        $this->Day1Halo->PlaceHolder = RemoveHtml($this->Day1Halo->caption());

        // Day2SiNo
        $this->Day2SiNo->EditAttrs["class"] = "form-control";
        $this->Day2SiNo->EditCustomAttributes = "";
        if (!$this->Day2SiNo->Raw) {
            $this->Day2SiNo->CurrentValue = HtmlDecode($this->Day2SiNo->CurrentValue);
        }
        $this->Day2SiNo->EditValue = $this->Day2SiNo->CurrentValue;
        $this->Day2SiNo->PlaceHolder = RemoveHtml($this->Day2SiNo->caption());

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

        // Day2Grade
        $this->Day2Grade->EditAttrs["class"] = "form-control";
        $this->Day2Grade->EditCustomAttributes = "";
        if (!$this->Day2Grade->Raw) {
            $this->Day2Grade->CurrentValue = HtmlDecode($this->Day2Grade->CurrentValue);
        }
        $this->Day2Grade->EditValue = $this->Day2Grade->CurrentValue;
        $this->Day2Grade->PlaceHolder = RemoveHtml($this->Day2Grade->caption());

        // Day2End
        $this->Day2End->EditAttrs["class"] = "form-control";
        $this->Day2End->EditCustomAttributes = "";
        $this->Day2End->EditValue = $this->Day2End->options(true);
        $this->Day2End->PlaceHolder = RemoveHtml($this->Day2End->caption());

        // Day3Sino
        $this->Day3Sino->EditAttrs["class"] = "form-control";
        $this->Day3Sino->EditCustomAttributes = "";
        if (!$this->Day3Sino->Raw) {
            $this->Day3Sino->CurrentValue = HtmlDecode($this->Day3Sino->CurrentValue);
        }
        $this->Day3Sino->EditValue = $this->Day3Sino->CurrentValue;
        $this->Day3Sino->PlaceHolder = RemoveHtml($this->Day3Sino->caption());

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
        $this->Day3Frag->EditValue = $this->Day3Frag->options(true);
        $this->Day3Frag->PlaceHolder = RemoveHtml($this->Day3Frag->caption());

        // Day3Symmetry
        $this->Day3Symmetry->EditAttrs["class"] = "form-control";
        $this->Day3Symmetry->EditCustomAttributes = "";
        $this->Day3Symmetry->EditValue = $this->Day3Symmetry->options(true);
        $this->Day3Symmetry->PlaceHolder = RemoveHtml($this->Day3Symmetry->caption());

        // Day3ZP
        $this->Day3ZP->EditAttrs["class"] = "form-control";
        $this->Day3ZP->EditCustomAttributes = "";
        $this->Day3ZP->EditValue = $this->Day3ZP->options(true);
        $this->Day3ZP->PlaceHolder = RemoveHtml($this->Day3ZP->caption());

        // Day3Vacoules
        $this->Day3Vacoules->EditAttrs["class"] = "form-control";
        $this->Day3Vacoules->EditCustomAttributes = "";
        $this->Day3Vacoules->EditValue = $this->Day3Vacoules->options(true);
        $this->Day3Vacoules->PlaceHolder = RemoveHtml($this->Day3Vacoules->caption());

        // Day3Grade
        $this->Day3Grade->EditAttrs["class"] = "form-control";
        $this->Day3Grade->EditCustomAttributes = "";
        $this->Day3Grade->EditValue = $this->Day3Grade->options(true);
        $this->Day3Grade->PlaceHolder = RemoveHtml($this->Day3Grade->caption());

        // Day3Cryoptop
        $this->Day3Cryoptop->EditAttrs["class"] = "form-control";
        $this->Day3Cryoptop->EditCustomAttributes = "";
        $this->Day3Cryoptop->EditValue = $this->Day3Cryoptop->options(true);
        $this->Day3Cryoptop->PlaceHolder = RemoveHtml($this->Day3Cryoptop->caption());

        // Day3End
        $this->Day3End->EditAttrs["class"] = "form-control";
        $this->Day3End->EditCustomAttributes = "";
        $this->Day3End->EditValue = $this->Day3End->options(true);
        $this->Day3End->PlaceHolder = RemoveHtml($this->Day3End->caption());

        // Day4SiNo
        $this->Day4SiNo->EditAttrs["class"] = "form-control";
        $this->Day4SiNo->EditCustomAttributes = "";
        if (!$this->Day4SiNo->Raw) {
            $this->Day4SiNo->CurrentValue = HtmlDecode($this->Day4SiNo->CurrentValue);
        }
        $this->Day4SiNo->EditValue = $this->Day4SiNo->CurrentValue;
        $this->Day4SiNo->PlaceHolder = RemoveHtml($this->Day4SiNo->caption());

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
        $this->Day4Cryoptop->EditValue = $this->Day4Cryoptop->options(true);
        $this->Day4Cryoptop->PlaceHolder = RemoveHtml($this->Day4Cryoptop->caption());

        // Day4End
        $this->Day4End->EditAttrs["class"] = "form-control";
        $this->Day4End->EditCustomAttributes = "";
        $this->Day4End->EditValue = $this->Day4End->options(true);
        $this->Day4End->PlaceHolder = RemoveHtml($this->Day4End->caption());

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
        $this->Day5ICM->EditValue = $this->Day5ICM->options(true);
        $this->Day5ICM->PlaceHolder = RemoveHtml($this->Day5ICM->caption());

        // Day5TE
        $this->Day5TE->EditAttrs["class"] = "form-control";
        $this->Day5TE->EditCustomAttributes = "";
        $this->Day5TE->EditValue = $this->Day5TE->options(true);
        $this->Day5TE->PlaceHolder = RemoveHtml($this->Day5TE->caption());

        // Day5Observation
        $this->Day5Observation->EditAttrs["class"] = "form-control";
        $this->Day5Observation->EditCustomAttributes = "";
        $this->Day5Observation->EditValue = $this->Day5Observation->options(true);
        $this->Day5Observation->PlaceHolder = RemoveHtml($this->Day5Observation->caption());

        // Day5Collapsed
        $this->Day5Collapsed->EditAttrs["class"] = "form-control";
        $this->Day5Collapsed->EditCustomAttributes = "";
        $this->Day5Collapsed->EditValue = $this->Day5Collapsed->options(true);
        $this->Day5Collapsed->PlaceHolder = RemoveHtml($this->Day5Collapsed->caption());

        // Day5Vacoulles
        $this->Day5Vacoulles->EditAttrs["class"] = "form-control";
        $this->Day5Vacoulles->EditCustomAttributes = "";
        $this->Day5Vacoulles->EditValue = $this->Day5Vacoulles->options(true);
        $this->Day5Vacoulles->PlaceHolder = RemoveHtml($this->Day5Vacoulles->caption());

        // Day5Grade
        $this->Day5Grade->EditAttrs["class"] = "form-control";
        $this->Day5Grade->EditCustomAttributes = "";
        $this->Day5Grade->EditValue = $this->Day5Grade->options(true);
        $this->Day5Grade->PlaceHolder = RemoveHtml($this->Day5Grade->caption());

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
        $this->Day6ICM->EditValue = $this->Day6ICM->options(true);
        $this->Day6ICM->PlaceHolder = RemoveHtml($this->Day6ICM->caption());

        // Day6TE
        $this->Day6TE->EditAttrs["class"] = "form-control";
        $this->Day6TE->EditCustomAttributes = "";
        $this->Day6TE->EditValue = $this->Day6TE->options(true);
        $this->Day6TE->PlaceHolder = RemoveHtml($this->Day6TE->caption());

        // Day6Observation
        $this->Day6Observation->EditAttrs["class"] = "form-control";
        $this->Day6Observation->EditCustomAttributes = "";
        $this->Day6Observation->EditValue = $this->Day6Observation->options(true);
        $this->Day6Observation->PlaceHolder = RemoveHtml($this->Day6Observation->caption());

        // Day6Collapsed
        $this->Day6Collapsed->EditAttrs["class"] = "form-control";
        $this->Day6Collapsed->EditCustomAttributes = "";
        $this->Day6Collapsed->EditValue = $this->Day6Collapsed->options(true);
        $this->Day6Collapsed->PlaceHolder = RemoveHtml($this->Day6Collapsed->caption());

        // Day6Vacoulles
        $this->Day6Vacoulles->EditAttrs["class"] = "form-control";
        $this->Day6Vacoulles->EditCustomAttributes = "";
        $this->Day6Vacoulles->EditValue = $this->Day6Vacoulles->options(true);
        $this->Day6Vacoulles->PlaceHolder = RemoveHtml($this->Day6Vacoulles->caption());

        // Day6Grade
        $this->Day6Grade->EditAttrs["class"] = "form-control";
        $this->Day6Grade->EditCustomAttributes = "";
        $this->Day6Grade->EditValue = $this->Day6Grade->options(true);
        $this->Day6Grade->PlaceHolder = RemoveHtml($this->Day6Grade->caption());

        // Day6Cryoptop
        $this->Day6Cryoptop->EditAttrs["class"] = "form-control";
        $this->Day6Cryoptop->EditCustomAttributes = "";
        if (!$this->Day6Cryoptop->Raw) {
            $this->Day6Cryoptop->CurrentValue = HtmlDecode($this->Day6Cryoptop->CurrentValue);
        }
        $this->Day6Cryoptop->EditValue = $this->Day6Cryoptop->CurrentValue;
        $this->Day6Cryoptop->PlaceHolder = RemoveHtml($this->Day6Cryoptop->caption());

        // EndSiNo
        $this->EndSiNo->EditAttrs["class"] = "form-control";
        $this->EndSiNo->EditCustomAttributes = "";
        if (!$this->EndSiNo->Raw) {
            $this->EndSiNo->CurrentValue = HtmlDecode($this->EndSiNo->CurrentValue);
        }
        $this->EndSiNo->EditValue = $this->EndSiNo->CurrentValue;
        $this->EndSiNo->PlaceHolder = RemoveHtml($this->EndSiNo->caption());

        // EndingDay
        $this->EndingDay->EditAttrs["class"] = "form-control";
        $this->EndingDay->EditCustomAttributes = "";
        $this->EndingDay->EditValue = $this->EndingDay->options(true);
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
        $this->EndingGrade->EditValue = $this->EndingGrade->options(true);
        $this->EndingGrade->PlaceHolder = RemoveHtml($this->EndingGrade->caption());

        // EndingState
        $this->EndingState->EditAttrs["class"] = "form-control";
        $this->EndingState->EditCustomAttributes = "";
        $this->EndingState->EditValue = $this->EndingState->options(true);
        $this->EndingState->PlaceHolder = RemoveHtml($this->EndingState->caption());

        // TidNo
        $this->TidNo->EditAttrs["class"] = "form-control";
        $this->TidNo->EditCustomAttributes = "";
        $this->TidNo->EditValue = $this->TidNo->CurrentValue;
        $this->TidNo->EditValue = FormatNumber($this->TidNo->EditValue, 0, -2, -2, -2);
        $this->TidNo->ViewCustomAttributes = "";

        // DidNO
        $this->DidNO->EditAttrs["class"] = "form-control";
        $this->DidNO->EditCustomAttributes = "";
        $this->DidNO->EditValue = $this->DidNO->CurrentValue;
        $this->DidNO->ViewCustomAttributes = "";

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
        $this->Stage->EditValue = $this->Stage->options(true);
        $this->Stage->PlaceHolder = RemoveHtml($this->Stage->caption());

        // Remarks
        $this->Remarks->EditAttrs["class"] = "form-control";
        $this->Remarks->EditCustomAttributes = "";
        if (!$this->Remarks->Raw) {
            $this->Remarks->CurrentValue = HtmlDecode($this->Remarks->CurrentValue);
        }
        $this->Remarks->EditValue = $this->Remarks->CurrentValue;
        $this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

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

        // thawReFrozen
        $this->thawReFrozen->EditCustomAttributes = "";
        $this->thawReFrozen->EditValue = $this->thawReFrozen->options(false);
        $this->thawReFrozen->PlaceHolder = RemoveHtml($this->thawReFrozen->caption());

        // vitriFertilisationDate
        $this->vitriFertilisationDate->EditAttrs["class"] = "form-control";
        $this->vitriFertilisationDate->EditCustomAttributes = "";
        $this->vitriFertilisationDate->EditValue = FormatDateTime($this->vitriFertilisationDate->CurrentValue, 8);
        $this->vitriFertilisationDate->PlaceHolder = RemoveHtml($this->vitriFertilisationDate->caption());

        // vitriDay
        $this->vitriDay->EditAttrs["class"] = "form-control";
        $this->vitriDay->EditCustomAttributes = "";
        $this->vitriDay->EditValue = $this->vitriDay->options(true);
        $this->vitriDay->PlaceHolder = RemoveHtml($this->vitriDay->caption());

        // vitriStage
        $this->vitriStage->EditAttrs["class"] = "form-control";
        $this->vitriStage->EditCustomAttributes = "";
        if (!$this->vitriStage->Raw) {
            $this->vitriStage->CurrentValue = HtmlDecode($this->vitriStage->CurrentValue);
        }
        $this->vitriStage->EditValue = $this->vitriStage->CurrentValue;
        $this->vitriStage->PlaceHolder = RemoveHtml($this->vitriStage->caption());

        // vitriGrade
        $this->vitriGrade->EditAttrs["class"] = "form-control";
        $this->vitriGrade->EditCustomAttributes = "";
        $this->vitriGrade->EditValue = $this->vitriGrade->options(true);
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
        $this->thawET->EditValue = $this->thawET->options(true);
        $this->thawET->PlaceHolder = RemoveHtml($this->thawET->caption());

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
        $this->ETDifficulty->EditValue = $this->ETDifficulty->options(true);
        $this->ETDifficulty->PlaceHolder = RemoveHtml($this->ETDifficulty->caption());

        // ETEasy
        $this->ETEasy->EditCustomAttributes = "";
        $this->ETEasy->EditValue = $this->ETEasy->options(false);
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

        // ETDate
        $this->ETDate->EditAttrs["class"] = "form-control";
        $this->ETDate->EditCustomAttributes = "";
        $this->ETDate->EditValue = FormatDateTime($this->ETDate->CurrentValue, 8);
        $this->ETDate->PlaceHolder = RemoveHtml($this->ETDate->caption());

        // Day1End
        $this->Day1End->EditAttrs["class"] = "form-control";
        $this->Day1End->EditCustomAttributes = "";
        $this->Day1End->EditValue = $this->Day1End->options(true);
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
                    $doc->exportCaption($this->Day0sino);
                    $doc->exportCaption($this->Day0OocyteStage);
                    $doc->exportCaption($this->Day0PolarBodyPosition);
                    $doc->exportCaption($this->Day0Breakage);
                    $doc->exportCaption($this->Day0Attempts);
                    $doc->exportCaption($this->Day0SPZMorpho);
                    $doc->exportCaption($this->Day0SPZLocation);
                    $doc->exportCaption($this->Day0SpOrgin);
                    $doc->exportCaption($this->Day5Cryoptop);
                    $doc->exportCaption($this->Day1Sperm);
                    $doc->exportCaption($this->Day1PN);
                    $doc->exportCaption($this->Day1PB);
                    $doc->exportCaption($this->Day1Pronucleus);
                    $doc->exportCaption($this->Day1Nucleolus);
                    $doc->exportCaption($this->Day1Halo);
                    $doc->exportCaption($this->Day2SiNo);
                    $doc->exportCaption($this->Day2CellNo);
                    $doc->exportCaption($this->Day2Frag);
                    $doc->exportCaption($this->Day2Symmetry);
                    $doc->exportCaption($this->Day2Cryoptop);
                    $doc->exportCaption($this->Day2Grade);
                    $doc->exportCaption($this->Day2End);
                    $doc->exportCaption($this->Day3Sino);
                    $doc->exportCaption($this->Day3CellNo);
                    $doc->exportCaption($this->Day3Frag);
                    $doc->exportCaption($this->Day3Symmetry);
                    $doc->exportCaption($this->Day3ZP);
                    $doc->exportCaption($this->Day3Vacoules);
                    $doc->exportCaption($this->Day3Grade);
                    $doc->exportCaption($this->Day3Cryoptop);
                    $doc->exportCaption($this->Day3End);
                    $doc->exportCaption($this->Day4SiNo);
                    $doc->exportCaption($this->Day4CellNo);
                    $doc->exportCaption($this->Day4Frag);
                    $doc->exportCaption($this->Day4Symmetry);
                    $doc->exportCaption($this->Day4Grade);
                    $doc->exportCaption($this->Day4Cryoptop);
                    $doc->exportCaption($this->Day4End);
                    $doc->exportCaption($this->Day5CellNo);
                    $doc->exportCaption($this->Day5ICM);
                    $doc->exportCaption($this->Day5TE);
                    $doc->exportCaption($this->Day5Observation);
                    $doc->exportCaption($this->Day5Collapsed);
                    $doc->exportCaption($this->Day5Vacoulles);
                    $doc->exportCaption($this->Day5Grade);
                    $doc->exportCaption($this->Day6CellNo);
                    $doc->exportCaption($this->Day6ICM);
                    $doc->exportCaption($this->Day6TE);
                    $doc->exportCaption($this->Day6Observation);
                    $doc->exportCaption($this->Day6Collapsed);
                    $doc->exportCaption($this->Day6Vacoulles);
                    $doc->exportCaption($this->Day6Grade);
                    $doc->exportCaption($this->Day6Cryoptop);
                    $doc->exportCaption($this->EndSiNo);
                    $doc->exportCaption($this->EndingDay);
                    $doc->exportCaption($this->EndingCellStage);
                    $doc->exportCaption($this->EndingGrade);
                    $doc->exportCaption($this->EndingState);
                    $doc->exportCaption($this->TidNo);
                    $doc->exportCaption($this->DidNO);
                    $doc->exportCaption($this->ICSiIVFDateTime);
                    $doc->exportCaption($this->PrimaryEmbrologist);
                    $doc->exportCaption($this->SecondaryEmbrologist);
                    $doc->exportCaption($this->Incubator);
                    $doc->exportCaption($this->location);
                    $doc->exportCaption($this->OocyteNo);
                    $doc->exportCaption($this->Stage);
                    $doc->exportCaption($this->Remarks);
                    $doc->exportCaption($this->vitrificationDate);
                    $doc->exportCaption($this->vitriPrimaryEmbryologist);
                    $doc->exportCaption($this->vitriSecondaryEmbryologist);
                    $doc->exportCaption($this->vitriEmbryoNo);
                    $doc->exportCaption($this->thawReFrozen);
                    $doc->exportCaption($this->vitriFertilisationDate);
                    $doc->exportCaption($this->vitriDay);
                    $doc->exportCaption($this->vitriStage);
                    $doc->exportCaption($this->vitriGrade);
                    $doc->exportCaption($this->vitriIncubator);
                    $doc->exportCaption($this->vitriTank);
                    $doc->exportCaption($this->vitriCanister);
                    $doc->exportCaption($this->vitriGobiet);
                    $doc->exportCaption($this->vitriViscotube);
                    $doc->exportCaption($this->vitriCryolockNo);
                    $doc->exportCaption($this->vitriCryolockColour);
                    $doc->exportCaption($this->thawDate);
                    $doc->exportCaption($this->thawPrimaryEmbryologist);
                    $doc->exportCaption($this->thawSecondaryEmbryologist);
                    $doc->exportCaption($this->thawET);
                    $doc->exportCaption($this->thawAbserve);
                    $doc->exportCaption($this->thawDiscard);
                    $doc->exportCaption($this->ETCatheter);
                    $doc->exportCaption($this->ETDifficulty);
                    $doc->exportCaption($this->ETEasy);
                    $doc->exportCaption($this->ETComments);
                    $doc->exportCaption($this->ETDoctor);
                    $doc->exportCaption($this->ETEmbryologist);
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
                    $doc->exportCaption($this->Day0sino);
                    $doc->exportCaption($this->Day0OocyteStage);
                    $doc->exportCaption($this->Day0PolarBodyPosition);
                    $doc->exportCaption($this->Day0Breakage);
                    $doc->exportCaption($this->Day0Attempts);
                    $doc->exportCaption($this->Day0SPZMorpho);
                    $doc->exportCaption($this->Day0SPZLocation);
                    $doc->exportCaption($this->Day0SpOrgin);
                    $doc->exportCaption($this->Day5Cryoptop);
                    $doc->exportCaption($this->Day1Sperm);
                    $doc->exportCaption($this->Day1PN);
                    $doc->exportCaption($this->Day1PB);
                    $doc->exportCaption($this->Day1Pronucleus);
                    $doc->exportCaption($this->Day1Nucleolus);
                    $doc->exportCaption($this->Day1Halo);
                    $doc->exportCaption($this->Day2SiNo);
                    $doc->exportCaption($this->Day2CellNo);
                    $doc->exportCaption($this->Day2Frag);
                    $doc->exportCaption($this->Day2Symmetry);
                    $doc->exportCaption($this->Day2Cryoptop);
                    $doc->exportCaption($this->Day2Grade);
                    $doc->exportCaption($this->Day2End);
                    $doc->exportCaption($this->Day3Sino);
                    $doc->exportCaption($this->Day3CellNo);
                    $doc->exportCaption($this->Day3Frag);
                    $doc->exportCaption($this->Day3Symmetry);
                    $doc->exportCaption($this->Day3ZP);
                    $doc->exportCaption($this->Day3Vacoules);
                    $doc->exportCaption($this->Day3Grade);
                    $doc->exportCaption($this->Day3Cryoptop);
                    $doc->exportCaption($this->Day3End);
                    $doc->exportCaption($this->Day4SiNo);
                    $doc->exportCaption($this->Day4CellNo);
                    $doc->exportCaption($this->Day4Frag);
                    $doc->exportCaption($this->Day4Symmetry);
                    $doc->exportCaption($this->Day4Grade);
                    $doc->exportCaption($this->Day4Cryoptop);
                    $doc->exportCaption($this->Day4End);
                    $doc->exportCaption($this->Day5CellNo);
                    $doc->exportCaption($this->Day5ICM);
                    $doc->exportCaption($this->Day5TE);
                    $doc->exportCaption($this->Day5Observation);
                    $doc->exportCaption($this->Day5Collapsed);
                    $doc->exportCaption($this->Day5Vacoulles);
                    $doc->exportCaption($this->Day5Grade);
                    $doc->exportCaption($this->Day6CellNo);
                    $doc->exportCaption($this->Day6ICM);
                    $doc->exportCaption($this->Day6TE);
                    $doc->exportCaption($this->Day6Observation);
                    $doc->exportCaption($this->Day6Collapsed);
                    $doc->exportCaption($this->Day6Vacoulles);
                    $doc->exportCaption($this->Day6Grade);
                    $doc->exportCaption($this->Day6Cryoptop);
                    $doc->exportCaption($this->EndSiNo);
                    $doc->exportCaption($this->EndingDay);
                    $doc->exportCaption($this->EndingCellStage);
                    $doc->exportCaption($this->EndingGrade);
                    $doc->exportCaption($this->EndingState);
                    $doc->exportCaption($this->TidNo);
                    $doc->exportCaption($this->DidNO);
                    $doc->exportCaption($this->ICSiIVFDateTime);
                    $doc->exportCaption($this->PrimaryEmbrologist);
                    $doc->exportCaption($this->SecondaryEmbrologist);
                    $doc->exportCaption($this->Incubator);
                    $doc->exportCaption($this->location);
                    $doc->exportCaption($this->OocyteNo);
                    $doc->exportCaption($this->Stage);
                    $doc->exportCaption($this->Remarks);
                    $doc->exportCaption($this->vitrificationDate);
                    $doc->exportCaption($this->vitriPrimaryEmbryologist);
                    $doc->exportCaption($this->vitriSecondaryEmbryologist);
                    $doc->exportCaption($this->vitriEmbryoNo);
                    $doc->exportCaption($this->thawReFrozen);
                    $doc->exportCaption($this->vitriFertilisationDate);
                    $doc->exportCaption($this->vitriDay);
                    $doc->exportCaption($this->vitriStage);
                    $doc->exportCaption($this->vitriGrade);
                    $doc->exportCaption($this->vitriIncubator);
                    $doc->exportCaption($this->vitriTank);
                    $doc->exportCaption($this->vitriCanister);
                    $doc->exportCaption($this->vitriGobiet);
                    $doc->exportCaption($this->vitriViscotube);
                    $doc->exportCaption($this->vitriCryolockNo);
                    $doc->exportCaption($this->vitriCryolockColour);
                    $doc->exportCaption($this->thawDate);
                    $doc->exportCaption($this->thawPrimaryEmbryologist);
                    $doc->exportCaption($this->thawSecondaryEmbryologist);
                    $doc->exportCaption($this->thawET);
                    $doc->exportCaption($this->thawAbserve);
                    $doc->exportCaption($this->thawDiscard);
                    $doc->exportCaption($this->ETCatheter);
                    $doc->exportCaption($this->ETDifficulty);
                    $doc->exportCaption($this->ETEasy);
                    $doc->exportCaption($this->ETComments);
                    $doc->exportCaption($this->ETDoctor);
                    $doc->exportCaption($this->ETEmbryologist);
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
                        $doc->exportField($this->Day0sino);
                        $doc->exportField($this->Day0OocyteStage);
                        $doc->exportField($this->Day0PolarBodyPosition);
                        $doc->exportField($this->Day0Breakage);
                        $doc->exportField($this->Day0Attempts);
                        $doc->exportField($this->Day0SPZMorpho);
                        $doc->exportField($this->Day0SPZLocation);
                        $doc->exportField($this->Day0SpOrgin);
                        $doc->exportField($this->Day5Cryoptop);
                        $doc->exportField($this->Day1Sperm);
                        $doc->exportField($this->Day1PN);
                        $doc->exportField($this->Day1PB);
                        $doc->exportField($this->Day1Pronucleus);
                        $doc->exportField($this->Day1Nucleolus);
                        $doc->exportField($this->Day1Halo);
                        $doc->exportField($this->Day2SiNo);
                        $doc->exportField($this->Day2CellNo);
                        $doc->exportField($this->Day2Frag);
                        $doc->exportField($this->Day2Symmetry);
                        $doc->exportField($this->Day2Cryoptop);
                        $doc->exportField($this->Day2Grade);
                        $doc->exportField($this->Day2End);
                        $doc->exportField($this->Day3Sino);
                        $doc->exportField($this->Day3CellNo);
                        $doc->exportField($this->Day3Frag);
                        $doc->exportField($this->Day3Symmetry);
                        $doc->exportField($this->Day3ZP);
                        $doc->exportField($this->Day3Vacoules);
                        $doc->exportField($this->Day3Grade);
                        $doc->exportField($this->Day3Cryoptop);
                        $doc->exportField($this->Day3End);
                        $doc->exportField($this->Day4SiNo);
                        $doc->exportField($this->Day4CellNo);
                        $doc->exportField($this->Day4Frag);
                        $doc->exportField($this->Day4Symmetry);
                        $doc->exportField($this->Day4Grade);
                        $doc->exportField($this->Day4Cryoptop);
                        $doc->exportField($this->Day4End);
                        $doc->exportField($this->Day5CellNo);
                        $doc->exportField($this->Day5ICM);
                        $doc->exportField($this->Day5TE);
                        $doc->exportField($this->Day5Observation);
                        $doc->exportField($this->Day5Collapsed);
                        $doc->exportField($this->Day5Vacoulles);
                        $doc->exportField($this->Day5Grade);
                        $doc->exportField($this->Day6CellNo);
                        $doc->exportField($this->Day6ICM);
                        $doc->exportField($this->Day6TE);
                        $doc->exportField($this->Day6Observation);
                        $doc->exportField($this->Day6Collapsed);
                        $doc->exportField($this->Day6Vacoulles);
                        $doc->exportField($this->Day6Grade);
                        $doc->exportField($this->Day6Cryoptop);
                        $doc->exportField($this->EndSiNo);
                        $doc->exportField($this->EndingDay);
                        $doc->exportField($this->EndingCellStage);
                        $doc->exportField($this->EndingGrade);
                        $doc->exportField($this->EndingState);
                        $doc->exportField($this->TidNo);
                        $doc->exportField($this->DidNO);
                        $doc->exportField($this->ICSiIVFDateTime);
                        $doc->exportField($this->PrimaryEmbrologist);
                        $doc->exportField($this->SecondaryEmbrologist);
                        $doc->exportField($this->Incubator);
                        $doc->exportField($this->location);
                        $doc->exportField($this->OocyteNo);
                        $doc->exportField($this->Stage);
                        $doc->exportField($this->Remarks);
                        $doc->exportField($this->vitrificationDate);
                        $doc->exportField($this->vitriPrimaryEmbryologist);
                        $doc->exportField($this->vitriSecondaryEmbryologist);
                        $doc->exportField($this->vitriEmbryoNo);
                        $doc->exportField($this->thawReFrozen);
                        $doc->exportField($this->vitriFertilisationDate);
                        $doc->exportField($this->vitriDay);
                        $doc->exportField($this->vitriStage);
                        $doc->exportField($this->vitriGrade);
                        $doc->exportField($this->vitriIncubator);
                        $doc->exportField($this->vitriTank);
                        $doc->exportField($this->vitriCanister);
                        $doc->exportField($this->vitriGobiet);
                        $doc->exportField($this->vitriViscotube);
                        $doc->exportField($this->vitriCryolockNo);
                        $doc->exportField($this->vitriCryolockColour);
                        $doc->exportField($this->thawDate);
                        $doc->exportField($this->thawPrimaryEmbryologist);
                        $doc->exportField($this->thawSecondaryEmbryologist);
                        $doc->exportField($this->thawET);
                        $doc->exportField($this->thawAbserve);
                        $doc->exportField($this->thawDiscard);
                        $doc->exportField($this->ETCatheter);
                        $doc->exportField($this->ETDifficulty);
                        $doc->exportField($this->ETEasy);
                        $doc->exportField($this->ETComments);
                        $doc->exportField($this->ETDoctor);
                        $doc->exportField($this->ETEmbryologist);
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
                        $doc->exportField($this->Day0sino);
                        $doc->exportField($this->Day0OocyteStage);
                        $doc->exportField($this->Day0PolarBodyPosition);
                        $doc->exportField($this->Day0Breakage);
                        $doc->exportField($this->Day0Attempts);
                        $doc->exportField($this->Day0SPZMorpho);
                        $doc->exportField($this->Day0SPZLocation);
                        $doc->exportField($this->Day0SpOrgin);
                        $doc->exportField($this->Day5Cryoptop);
                        $doc->exportField($this->Day1Sperm);
                        $doc->exportField($this->Day1PN);
                        $doc->exportField($this->Day1PB);
                        $doc->exportField($this->Day1Pronucleus);
                        $doc->exportField($this->Day1Nucleolus);
                        $doc->exportField($this->Day1Halo);
                        $doc->exportField($this->Day2SiNo);
                        $doc->exportField($this->Day2CellNo);
                        $doc->exportField($this->Day2Frag);
                        $doc->exportField($this->Day2Symmetry);
                        $doc->exportField($this->Day2Cryoptop);
                        $doc->exportField($this->Day2Grade);
                        $doc->exportField($this->Day2End);
                        $doc->exportField($this->Day3Sino);
                        $doc->exportField($this->Day3CellNo);
                        $doc->exportField($this->Day3Frag);
                        $doc->exportField($this->Day3Symmetry);
                        $doc->exportField($this->Day3ZP);
                        $doc->exportField($this->Day3Vacoules);
                        $doc->exportField($this->Day3Grade);
                        $doc->exportField($this->Day3Cryoptop);
                        $doc->exportField($this->Day3End);
                        $doc->exportField($this->Day4SiNo);
                        $doc->exportField($this->Day4CellNo);
                        $doc->exportField($this->Day4Frag);
                        $doc->exportField($this->Day4Symmetry);
                        $doc->exportField($this->Day4Grade);
                        $doc->exportField($this->Day4Cryoptop);
                        $doc->exportField($this->Day4End);
                        $doc->exportField($this->Day5CellNo);
                        $doc->exportField($this->Day5ICM);
                        $doc->exportField($this->Day5TE);
                        $doc->exportField($this->Day5Observation);
                        $doc->exportField($this->Day5Collapsed);
                        $doc->exportField($this->Day5Vacoulles);
                        $doc->exportField($this->Day5Grade);
                        $doc->exportField($this->Day6CellNo);
                        $doc->exportField($this->Day6ICM);
                        $doc->exportField($this->Day6TE);
                        $doc->exportField($this->Day6Observation);
                        $doc->exportField($this->Day6Collapsed);
                        $doc->exportField($this->Day6Vacoulles);
                        $doc->exportField($this->Day6Grade);
                        $doc->exportField($this->Day6Cryoptop);
                        $doc->exportField($this->EndSiNo);
                        $doc->exportField($this->EndingDay);
                        $doc->exportField($this->EndingCellStage);
                        $doc->exportField($this->EndingGrade);
                        $doc->exportField($this->EndingState);
                        $doc->exportField($this->TidNo);
                        $doc->exportField($this->DidNO);
                        $doc->exportField($this->ICSiIVFDateTime);
                        $doc->exportField($this->PrimaryEmbrologist);
                        $doc->exportField($this->SecondaryEmbrologist);
                        $doc->exportField($this->Incubator);
                        $doc->exportField($this->location);
                        $doc->exportField($this->OocyteNo);
                        $doc->exportField($this->Stage);
                        $doc->exportField($this->Remarks);
                        $doc->exportField($this->vitrificationDate);
                        $doc->exportField($this->vitriPrimaryEmbryologist);
                        $doc->exportField($this->vitriSecondaryEmbryologist);
                        $doc->exportField($this->vitriEmbryoNo);
                        $doc->exportField($this->thawReFrozen);
                        $doc->exportField($this->vitriFertilisationDate);
                        $doc->exportField($this->vitriDay);
                        $doc->exportField($this->vitriStage);
                        $doc->exportField($this->vitriGrade);
                        $doc->exportField($this->vitriIncubator);
                        $doc->exportField($this->vitriTank);
                        $doc->exportField($this->vitriCanister);
                        $doc->exportField($this->vitriGobiet);
                        $doc->exportField($this->vitriViscotube);
                        $doc->exportField($this->vitriCryolockNo);
                        $doc->exportField($this->vitriCryolockColour);
                        $doc->exportField($this->thawDate);
                        $doc->exportField($this->thawPrimaryEmbryologist);
                        $doc->exportField($this->thawSecondaryEmbryologist);
                        $doc->exportField($this->thawET);
                        $doc->exportField($this->thawAbserve);
                        $doc->exportField($this->thawDiscard);
                        $doc->exportField($this->ETCatheter);
                        $doc->exportField($this->ETDifficulty);
                        $doc->exportField($this->ETEasy);
                        $doc->exportField($this->ETComments);
                        $doc->exportField($this->ETDoctor);
                        $doc->exportField($this->ETEmbryologist);
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
    public function recordsetSelecting(&$filter) {
    	// Enter your code here
    		$treatment =	$_GET["treatment"];
    				AddFilter($filter, "TidNo='".$treatment."'");
    						if($_GET["page"] == 'page0')
    						{
    							AddFilter($filter, "Day0OocyteStage in ('MII','MI') ");
    						}
    						if($_GET["page"] == 'page1')
    						{
    							AddFilter($filter, "Day0OocyteStage in ('MII','MI') ");
    							AddFilter($filter, "Day5Cryoptop is null or Day5Cryoptop='ICSI'");
    						}
    						if($_GET["page"] == 'page2')
    						{
    							AddFilter($filter, "Day0OocyteStage in ('MII','MI') ");
    							AddFilter($filter, "Day5Cryoptop is null or Day5Cryoptop='ICSI'");

    						//	AddFilter($filter, "Day1PN not in ('1','MULTI-NU' , 'DEG') ");
    							AddFilter($filter, "Day1End is null or Day1End='Observe'");
    						}
    						if($_GET["page"] == 'page3')
    						{
    							AddFilter($filter, "Day0OocyteStage in ('MII','MI') ");
    							AddFilter($filter, "Day5Cryoptop is null or Day5Cryoptop='ICSI'");
    							AddFilter($filter, "Day1End is null or Day1End='Observe'");
    							AddFilter($filter, "Day2End is null or Day2End='Observe'");
    						}
    						if($_GET["page"] == 'page4')
    						{
    							AddFilter($filter, "Day0OocyteStage in ('MII','MI') ");
    							AddFilter($filter, "Day5Cryoptop is null or Day5Cryoptop='ICSI'");
    								AddFilter($filter, "Day1End is null or Day1End='Observe'");
    								AddFilter($filter, "Day2End is null or Day2End='Observe'");
    							AddFilter($filter, "Day3End is null or Day3End='Observe'");
    						}
    						if($_GET["page"] == 'page5')
    						{
    							AddFilter($filter, "Day0OocyteStage in ('MII','MI') ");
    							AddFilter($filter, "Day5Cryoptop is null or Day5Cryoptop='ICSI'");
    								AddFilter($filter, "Day1End is null or Day1End='Observe'");
    								AddFilter($filter, "Day2End is null or Day2End='Observe'");
    							AddFilter($filter, "Day3End is null or Day3End='Observe'");
    						}
    						if($_GET["page"] == 'page6')
    						{
    							AddFilter($filter, "Day0OocyteStage in ('MII','MI') ");
    							AddFilter($filter, "Day5Cryoptop is null or Day5Cryoptop='ICSI'");
    								AddFilter($filter, "Day1End is null or Day1End='Observe'");
    								AddFilter($filter, "Day2End is null or Day2End='Observe'");
    							AddFilter($filter, "Day3End is null or Day3End='Observe'");
    							AddFilter($filter, "Day5Grade is null or Day5Grade='Observe'");
    						}
    						if($_GET["page"] == 'pageEnd')
    						{
    							AddFilter($filter, "Day0OocyteStage in ('MII','MI') ");
    							AddFilter($filter, "EndingState in ('Frozen','Transferred') ");
    						}
    						if($_GET["page"] == 'pageAll')
    						{
    							AddFilter($filter, "Day0OocyteStage in ('MII','MI') ");
    						}
    						if($_GET["page"] == 'Vitrification')
    						{
    							AddFilter($filter, "EndingState = 'Frozen' ");
    						}
    						if($_GET["page"] == 'Thawing')
    						{
    							AddFilter($filter, "EndingState = 'Frozen' ");
    						}
    						if($_GET["page"] == 'EmbryoTransfer')
    						{
    						//	AddFilter($filter, "EndingState = 'Frozen' ");
    						AddFilter($filter, "EndingState = 'Transferred' ");
    						}
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
    public function rowSelected(&$rs) {
    	//echo "Row Selected";
    			if($rs["Day1Sperm"]=="")
    		{
    			$rs["Day1Sperm"] = $rs["Day0sino"];
    		}
    		if($rs["Day2SiNo"]=="")
    		{
    			$rs["Day2SiNo"] = $rs["Day0sino"];
    		}
    		if($rs["Day3Sino"]=="")
    		{
    			$rs["Day3Sino"] = $rs["Day0sino"];
    		 }
    		if($rs["Day4SiNo"]=="")
    		{
    			$rs["Day4SiNo"] = $rs["Day0sino"];
    		}
    		if($rs["Day5CellNo"]=="")
    		{
    			$rs["Day5CellNo"] = $rs["Day0sino"];
    		}
    		if($rs["Day6CellNo"]=="")
    		{
    			$rs["Day6CellNo"] = $rs["Day0sino"];
    		}
    		if($rs["EndSiNo"]=="")
    		{
    			$rs["EndSiNo"] = $rs["Day0sino"];
    		}
    		if($_GET["page"] == 'Vitrification')
    		{
    			if($rs["vitriEmbryoNo"]=="")
    			{
    				$rs["vitriEmbryoNo"] = $rs["Day0sino"];
    			}
    			if($rs["vitriDay"]=="")
    			{
    				$rs["vitriDay"] = $rs["EndingDay"];
    			}
    			if($rs["vitriGrade"]=="")
    			{
    				$rs["vitriGrade"] = $rs["EndingGrade"];
    			}
    			if($rs["vitriStage"]=="")
    			{
    				$rs["vitriStage"] = $rs["EndingCellStage"];
    			}

    			//$rs["vitriEmbryoNo"] = $rs["Day0sino"];
    			//$rs["vitriDay"] = $rs["EndingDay"];
    			//$rs["Day6CellNo"] = $rs["EndingCellStage"];
    			//$rs["vitriGrade"] = $rs["EndingGrade"];
    			//$rs["vitriStage"] = $rs["EndingState"];
    		}
    			if($_GET["page"] == 'Thawing')
    		{
    			if($rs["vitriEmbryoNo"]=="")
    			{
    				$rs["vitriEmbryoNo"] = $rs["Day0sino"];
    			}
    			if($rs["vitriDay"]=="")
    			{
    				$rs["vitriDay"] = $rs["EndingDay"];
    			}
    			if($rs["vitriGrade"]=="")
    			{
    				$rs["vitriGrade"] = $rs["EndingGrade"];
    			}
    			if($rs["vitriStage"]=="")
    			{
    				$rs["vitriStage"] = $rs["EndingCellStage"];
    			}

    			//$rs["vitriEmbryoNo"] = $rs["Day0sino"];
    			//$rs["vitriDay"] = $rs["EndingDay"];
    			//$rs["Day6CellNo"] = $rs["EndingCellStage"];
    			//$rs["vitriGrade"] = $rs["EndingGrade"];
    			//$rs["vitriStage"] = $rs["EndingState"];
    		}
    		if($_GET["page"] == 'EmbryoTransfer')
    		{
    			if($rs["thawDiscard"]=="")
    			{
    				$rs["thawDiscard"] = $rs["Day0sino"];
    			}
    		}
    			 $_SESSION["fnameIncubator"] = $rs["Incubator"];
    			 $_SESSION["fnameLocation"] = $rs["location"];
    			 $_SESSION["fnameRemarks"]  = $rs["Remarks"];
    			 $_SESSION["meetingtime"]  = $rs["ICSiIVFDateTime"];
    			 $_SESSION["fnamePrimary"]   = $rs["PrimaryEmbrologist"];
    			 $_SESSION["fnameSecondary"]  = $rs["SecondaryEmbrologist"];
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
    public function rowUpdating($rsold, &$rsnew) {
    	// Enter your code here
    	// To cancel, set return value to FALSE

    	//	$rsnew["Incubator"] = $_POST["fnameIncubator"];
    		$rsnew["location"] = $_POST["fnameLocation"];
    		$rsnew["Incubator"] = $_POST["fnameIncubator"];
    		//$rsnew["Remarks"] = $_POST["ivffnameRemarks"];
    		if($_POST["meetingtime"]!= '')
    		{
    			$rsnew["ICSiIVFDateTime"] = $_POST["meetingtime"];
    		}
    		$rsnew["PrimaryEmbrologist"] = $_POST["fnamePrimary"];
    		$rsnew["SecondaryEmbrologist"] = $_POST["fnameSecondary"];
    		if($_POST["ivffnamePrimary"]!= '')
    		{
    			$rsnew["vitriPrimaryEmbryologist"] = $_POST["ivffnamePrimary"];
    		}
    		if($_POST["ivffnameSecondary"]!= '')
    		{
    			$rsnew["vitriSecondaryEmbryologist"] = $_POST["ivffnameSecondary"];
    		}
    		if($_POST["ivfmeetingtime"]!= '')
    		{
    			$rsnew["vitrificationDate"] = $_POST["ivfmeetingtime"];
    		}
    		if($_POST["ivfFertilisationDate"]!= '')
    		{
    			$rsnew["vitriFertilisationDate"] = $_POST["ivfFertilisationDate"];
    		}
    		if($_POST["ThawFertilisationDate"]!= '')
    		{
    			$rsnew["thawDate"] = $_POST["ThawFertilisationDate"];
    		}
    		if($_POST["ThawfnamePrimary"]!= '')
    		{
    			$rsnew["thawPrimaryEmbryologist"] = $_POST["ThawfnamePrimary"];
    		}
    		if($_POST["ThawfnameSecondary"]!= '')
    		{
    			$rsnew["thawSecondaryEmbryologist"] = $_POST["ThawfnameSecondary"];
    		}
    		if($_POST["ETfnameDoctor"]!= '')
    		{
    			$rsnew["ETDoctor"] = $_POST["ETfnameDoctor"];
    		}
    		if($_POST["ETfnameSecondary"]!= '')
    		{
    			$rsnew["ETEmbryologist"] = $_POST["ETfnameSecondary"];
    		}
    		if($_POST["EETTDate"]!= '')
    		{
    			$rsnew["ETDate"] = $_POST["EETTDate"];
    		}
    		if($_POST["ETComments"]!= '')
    		{
    			$rsnew["ETComments"] = $_POST["ETComments"];
    		}
    			if($rsnew["Day5Cryoptop"] == 'Frozen')
    			{
    				$rsnew["EndingDay"] = "Day 0";
    				$rsnew["EndingCellStage"] = $rsnew["Day0OocyteStage"];
    				$rsnew["EndingGrade"] = "";
    				$rsnew["EndingState"] = "Frozen";
    			}
    			if($rsnew["Day2End"] == 'FZ')
    			{
    				$rsnew["EndingDay"] = "Day 2";
    				$rsnew["EndingCellStage"] = $rsnew["Day2CellNo"];
    				$rsnew["EndingGrade"] =     $rsnew["Day2Grade"] ;
    				$rsnew["EndingState"] = "Frozen";
    			}
    			if($rsnew["Day2End"] == 'ET')
    			{
    				$rsnew["EndingDay"] = "Day 2";
    					$rsnew["EndingCellStage"] = $rsnew["Day2CellNo"];
    				$rsnew["EndingGrade"] = $rsnew["Day2Grade"] ;
    				$rsnew["EndingState"] = "Transferred";
    			}
    			if($rsnew["Day3End"] == 'FZ')
    			{
    				$rsnew["EndingDay"] = "Day 3";
    				$rsnew["EndingCellStage"] = $rsnew["Day3CellNo"];
    				$rsnew["EndingGrade"] =     $rsnew["Day3Grade"] ;
    				$rsnew["EndingState"] = "Frozen";
    			}
    			if($rsnew["Day3End"] == 'ET')
    			{
    				$rsnew["EndingDay"] = "Day 3";
    					$rsnew["EndingCellStage"] = $rsnew["Day3CellNo"];
    				$rsnew["EndingGrade"] = $rsnew["Day3Grade"] ;
    				$rsnew["EndingState"] = "Transferred";
    			}
    			if($rsnew["Day4End"] == 'FZ')
    			{
    				$rsnew["EndingDay"] = "Day 4";
    				$rsnew["EndingCellStage"] = $rsnew["Day4CellNo"];
    				$rsnew["EndingGrade"] =     $rsnew["Day4Cryoptop"] ;
    				$rsnew["EndingState"] = "Frozen";
    			}
    			if($rsnew["Day4End"] == 'ET')
    			{
    				$rsnew["EndingDay"] = "Day 4";
    					$rsnew["EndingCellStage"] = $rsnew["Day4CellNo"];
    				$rsnew["EndingGrade"] = $rsnew["Day4Cryoptop"] ;
    				$rsnew["EndingState"] = "Transferred";
    			}
    			if($rsnew["Day5Grade"] == 'FZ')
    			{
    				$rsnew["EndingDay"] = "Day 5";
    				$rsnew["EndingCellStage"] =  $rsnew["Day5ICM"] ;
    				$rsnew["EndingGrade"] =     $rsnew["Day5Collapsed"] ;
    				$rsnew["EndingState"] = "Frozen";
    			}
    			if($rsnew["Day5Grade"] == 'ET')
    			{
    				$rsnew["EndingDay"] = "Day 5";
    				$rsnew["EndingCellStage"] =  $rsnew["Day5ICM"] ;
    				$rsnew["EndingGrade"] = $rsnew["Day5Collapsed"] ;
    				$rsnew["EndingState"] = "Transferred";
    			}
    			if($rsnew["Day6Grade"] == 'FZ')
    			{
    				$rsnew["EndingDay"] = "Day 6";
    				$rsnew["EndingCellStage"] =  $rsnew["Day6ICM"] ;
    				$rsnew["EndingGrade"] =     $rsnew["Day6Collapsed"] ;
    				$rsnew["EndingState"] = "Frozen";
    			}
    			if($rsnew["Day6Grade"] == 'ET')
    			{
    				$rsnew["EndingDay"] = "Day 6";
    				$rsnew["EndingCellStage"] =  $rsnew["Day6ICM"] ;
    				$rsnew["EndingGrade"] = $rsnew["Day6Collapsed"] ;
    				$rsnew["EndingState"] = "Transferred";
    			}
    	return TRUE;
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
    public function gridUpdating($rsold) {
    	// Enter your code here
    	// To reject grid update, set return value to FALSE
    if($_POST["page"] == '')
    {
    $this->id->Visible = FALSE;
    $this->RIDNo->Visible = FALSE;
    $this->Name->Visible = FALSE;
    $this->ARTCycle->Visible = FALSE;
    $this->SpermOrigin->Visible = FALSE;
    $this->InseminatinTechnique->Visible = FALSE;
    $this->IndicationForART->Visible = FALSE;
     $this->Day6Cryoptop->Visible = FALSE;
    $this->TidNo->Visible = FALSE;
    $this->DidNO->Visible = FALSE;
    $this->ICSiIVFDateTime->Visible = FALSE;
    $this->PrimaryEmbrologist->Visible = FALSE;
    $this->SecondaryEmbrologist->Visible = FALSE;
    $this->Incubator->Visible = FALSE;
    $this->location->Visible = FALSE;
    $this->Day0sino->Visible = FALSE;
    $this->Day0OocyteStage->Visible = FALSE;
    $this->Day0PolarBodyPosition->Visible = FALSE;
    $this->Day0Breakage->Visible = FALSE;
    $this->Day0Attempts->Visible = FALSE;
    $this->Day0SPZMorpho->Visible = FALSE;
    $this->Day0SPZLocation->Visible = FALSE;
    $this->Day0SpOrgin->Visible = FALSE;
    $this->Day5Cryoptop->Visible = FALSE;
    		$this->Day1PN->Visible = FALSE;
    		$this->Day1PB->Visible = FALSE;
    		$this->Day1Pronucleus->Visible = FALSE;
    		$this->Day1Nucleolus->Visible = FALSE;
    		$this->Day1Halo->Visible = FALSE;
    		$this->Day1Sperm->Visible = FALSE;
    	$this->Day1End->Visible = FALSE;
    	$this->Day2SiNo->Visible = FALSE;
    		$this->Day2CellNo->Visible = FALSE;
    		$this->Day2Frag->Visible = FALSE;
    		$this->Day2Symmetry->Visible = FALSE;
    		$this->Day2Cryoptop->Visible = FALSE;
    		$this->Day2Grade->Visible = FALSE;
    $this->Day2End->Visible = FALSE;
    		$this->Day3Sino->Visible = FALSE;		
    		$this->Day3CellNo->Visible = FALSE;
    		$this->Day3Frag->Visible = FALSE;
    		$this->Day3Symmetry->Visible = FALSE;
    		$this->Day3Grade->Visible = FALSE;
    		$this->Day3Vacoules->Visible = FALSE;
    		$this->Day3ZP->Visible = FALSE;		
    		$this->Day3Cryoptop->Visible = FALSE;
    		$this->Day3End->Visible = FALSE;
    		$this->Day4SiNo->Visible = FALSE;
    		$this->Day4CellNo->Visible = FALSE;
    		$this->Day4Frag->Visible = FALSE;
    		$this->Day4Symmetry->Visible = FALSE;
    		$this->Day4Grade->Visible = FALSE;
    		$this->Day4Cryoptop->Visible = FALSE;
    		$this->Day5CellNo->Visible = FALSE;
    		$this->Day5ICM->Visible = FALSE;
    		$this->Day5TE->Visible = FALSE;
    		$this->Day5Observation->Visible = FALSE;
    		$this->Day5Collapsed->Visible = FALSE;
    		$this->Day5Vacoulles->Visible = FALSE;
    		$this->Day5Grade->Visible = FALSE;
    		$this->Day6CellNo->Visible = FALSE;
    		$this->Day6ICM->Visible = FALSE;
    		$this->Day6TE->Visible = FALSE;
    		$this->Day6Observation->Visible = FALSE;
    		$this->Day6Collapsed->Visible = FALSE;		
    		$this->Day6Vacoulles->Visible = FALSE;
    		$this->Day6Grade->Visible = FALSE;
    		$this->EndingDay->Visible = FALSE;
    		$this->EndingCellStage->Visible = FALSE;
    		$this->EndingGrade->Visible = FALSE;
    		$this->EndingState->Visible = FALSE;

    		//===================================
    		$this->vitrificationDate->Visible = FALSE;
    		$this->vitriPrimaryEmbryologist->Visible = FALSE;
    		$this->vitriSecondaryEmbryologist->Visible = FALSE;
    		$this->vitriEmbryoNo->Visible = FALSE;
    		$this->vitriFertilisationDate->Visible = FALSE;
    		$this->vitriDay->Visible = FALSE;
    		$this->vitriGrade->Visible = FALSE;
    		$this->vitriIncubator->Visible = FALSE;
    		$this->vitriTank->Visible = FALSE;
    		$this->vitriCanister->Visible = FALSE;
    		$this->vitriGobiet->Visible = FALSE;
    		$this->vitriCryolockNo->Visible = FALSE;
    		$this->vitriCryolockColour->Visible = FALSE;
    		$this->vitriStage->Visible = FALSE;
    		$this->thawDate->Visible = FALSE;
    		$this->thawPrimaryEmbryologist->Visible = FALSE;
    		$this->thawSecondaryEmbryologist->Visible = FALSE;
    		$this->thawET->Visible = FALSE;
    		$this->thawReFrozen->Visible = FALSE;
    		$this->thawAbserve->Visible = FALSE;
    		$this->thawDiscard->Visible = FALSE;
    		$this->ETCatheter->Visible = FALSE;
    		$this->ETDifficulty->Visible = FALSE;
    		$this->ETEasy->Visible = FALSE;
    		$this->ETComments->Visible = FALSE;
    		$this->ETDoctor->Visible = FALSE;
    		$this->ETEmbryologist->Visible = FALSE;
    	$this->ETDate->Visible = FALSE;
    				$this->EndSiNo->Visible = FALSE;
    		$this->Day4End->Visible = FALSE;

    		//=====================================
    }else{
    $this->id->Visible = FALSE;
    $this->RIDNo->Visible = FALSE;
    $this->Name->Visible = FALSE;
    $this->ARTCycle->Visible = FALSE;
    $this->SpermOrigin->Visible = FALSE;
    $this->InseminatinTechnique->Visible = FALSE;
    $this->IndicationForART->Visible = FALSE;
     $this->Day6Cryoptop->Visible = FALSE;
    $this->TidNo->Visible = FALSE;
    $this->DidNO->Visible = FALSE;
    $this->ICSiIVFDateTime->Visible = FALSE;
    $this->PrimaryEmbrologist->Visible = FALSE;
    $this->SecondaryEmbrologist->Visible = FALSE;
    $this->Incubator->Visible = FALSE;
    $this->location->Visible = FALSE;
    $this->Day0sino->Visible = FALSE;
    $this->Day0OocyteStage->Visible = FALSE;
    $this->Day0PolarBodyPosition->Visible = FALSE;
    $this->Day0Breakage->Visible = FALSE;
    $this->Day0Attempts->Visible = FALSE;
    $this->Day0SPZMorpho->Visible = FALSE;
    $this->Day0SPZLocation->Visible = FALSE;
    $this->Day0SpOrgin->Visible = FALSE;
    $this->Day5Cryoptop->Visible = FALSE;
    		$this->Day1PN->Visible = FALSE;
    		$this->Day1PB->Visible = FALSE;
    		$this->Day1Pronucleus->Visible = FALSE;
    		$this->Day1Nucleolus->Visible = FALSE;
    		$this->Day1Halo->Visible = FALSE;
    		$this->Day1Sperm->Visible = FALSE;
    		$this->Day1End->Visible = FALSE;					
    	$this->Day2SiNo->Visible = FALSE;
    		$this->Day2CellNo->Visible = FALSE;
    		$this->Day2Frag->Visible = FALSE;
    		$this->Day2Symmetry->Visible = FALSE;
    		$this->Day2Cryoptop->Visible = FALSE;
    		$this->Day2Grade->Visible = FALSE;
    $this->Day2End->Visible = FALSE;
    		$this->Day3Sino->Visible = FALSE;		
    		$this->Day3CellNo->Visible = FALSE;
    		$this->Day3Frag->Visible = FALSE;
    		$this->Day3Symmetry->Visible = FALSE;
    		$this->Day3Grade->Visible = FALSE;
    		$this->Day3Vacoules->Visible = FALSE;
    		$this->Day3ZP->Visible = FALSE;		
    		$this->Day3Cryoptop->Visible = FALSE;
    		$this->Day3End->Visible = FALSE;
    		$this->Day4SiNo->Visible = FALSE;
    		$this->Day4CellNo->Visible = FALSE;
    		$this->Day4Frag->Visible = FALSE;
    		$this->Day4Symmetry->Visible = FALSE;
    		$this->Day4Grade->Visible = FALSE;
    		$this->Day4Cryoptop->Visible = FALSE;
    		$this->Day5CellNo->Visible = FALSE;
    		$this->Day5ICM->Visible = FALSE;
    		$this->Day5TE->Visible = FALSE;
    		$this->Day5Observation->Visible = FALSE;
    		$this->Day5Collapsed->Visible = FALSE;
    		$this->Day5Vacoulles->Visible = FALSE;
    		$this->Day5Grade->Visible = FALSE;
    		$this->Day6CellNo->Visible = FALSE;
    		$this->Day6ICM->Visible = FALSE;
    		$this->Day6TE->Visible = FALSE;
    		$this->Day6Observation->Visible = FALSE;
    		$this->Day6Collapsed->Visible = FALSE;		
    		$this->Day6Vacoulles->Visible = FALSE;
    		$this->Day6Grade->Visible = FALSE;
    		$this->EndingDay->Visible = FALSE;
    		$this->EndingCellStage->Visible = FALSE;
    		$this->EndingGrade->Visible = FALSE;
    		$this->EndingState->Visible = FALSE;

    		//===================================
    		$this->vitrificationDate->Visible = FALSE;
    		$this->vitriPrimaryEmbryologist->Visible = FALSE;
    		$this->vitriSecondaryEmbryologist->Visible = FALSE;
    		$this->vitriEmbryoNo->Visible = FALSE;
    		$this->vitriFertilisationDate->Visible = FALSE;
    		$this->vitriDay->Visible = FALSE;
    		$this->vitriGrade->Visible = FALSE;
    		$this->vitriIncubator->Visible = FALSE;
    		$this->vitriTank->Visible = FALSE;
    		$this->vitriCanister->Visible = FALSE;
    		$this->vitriGobiet->Visible = FALSE;
    		$this->vitriCryolockNo->Visible = FALSE;
    		$this->vitriCryolockColour->Visible = FALSE;
    		$this->vitriStage->Visible = FALSE;
    		$this->thawDate->Visible = FALSE;
    		$this->thawPrimaryEmbryologist->Visible = FALSE;
    		$this->thawSecondaryEmbryologist->Visible = FALSE;
    		$this->thawET->Visible = FALSE;
    		$this->thawReFrozen->Visible = FALSE;
    		$this->thawAbserve->Visible = FALSE;
    		$this->thawDiscard->Visible = FALSE;
    		$this->ETCatheter->Visible = FALSE;
    		$this->ETDifficulty->Visible = FALSE;
    		$this->ETEasy->Visible = FALSE;
    		$this->ETComments->Visible = FALSE;
    		$this->ETDoctor->Visible = FALSE;
    		$this->ETEmbryologist->Visible = FALSE;
    	$this->ETDate->Visible = FALSE;
    				$this->EndSiNo->Visible = FALSE;
    		$this->Day4End->Visible = FALSE;

    		//=====================================
    }
    			if($_POST["page"] == 'page0')
    			{
    				$this->Day0sino->Visible = TRUE;
    				$this->Day0OocyteStage->Visible = TRUE;
    				$this->Day0PolarBodyPosition->Visible = TRUE;
    				$this->Day0Breakage->Visible = TRUE;
    				$this->Day0Attempts->Visible = TRUE;
    				$this->Day0SPZMorpho->Visible = TRUE;
    				$this->Day0SPZLocation->Visible = TRUE;
    				$this->Day0SpOrgin->Visible = TRUE;
    				$this->Day5Cryoptop->Visible = TRUE;
    				$this->Remarks->Visible = FALSE;
    				$this->OocyteNo->Visible = FALSE;
    				$this->Stage->Visible = FALSE;
    			}
    			if($_POST["page"] == 'page1')
    			{
    				$this->Day1PN->Visible = TRUE;
    				$this->Day1PB->Visible = TRUE;
    				$this->Day1Pronucleus->Visible = TRUE;
    				$this->Day1Nucleolus->Visible = TRUE;
    				$this->Day1Halo->Visible = TRUE;
    				$this->Day1Sperm->Visible = TRUE;
    	$this->Day1End->Visible = TRUE;
    				$this->Remarks->Visible = FALSE;
    				$this->OocyteNo->Visible = FALSE;
    				$this->Stage->Visible = FALSE;
    			}
    			if($_POST["page"] == 'page2')
    			{
    			$this->Day2SiNo->Visible = TRUE;
    				$this->Day2CellNo->Visible = TRUE;
    				$this->Day2Frag->Visible = TRUE;
    				$this->Day2Symmetry->Visible = TRUE;
    				$this->Day2Cryoptop->Visible = TRUE;
    				$this->Day2Grade->Visible = TRUE;
    $this->Day2End->Visible = TRUE;
    				$this->Remarks->Visible = FALSE;
    				$this->OocyteNo->Visible = FALSE;
    				$this->Stage->Visible = FALSE;
    			}
    			if($_POST["page"] == 'page3')
    			{
    				$this->Day3Sino->Visible = TRUE;
    				$this->Day3CellNo->Visible = TRUE;
    				$this->Day3Frag->Visible = TRUE;
    				$this->Day3Symmetry->Visible = TRUE;
    				$this->Day3Grade->Visible = TRUE;
    				$this->Day3Vacoules->Visible = TRUE;
    				$this->Day3ZP->Visible = TRUE;
    				$this->Day3Cryoptop->Visible = TRUE;
    				$this->Day3End->Visible = TRUE;
    				$this->Remarks->Visible = FALSE;
    				$this->OocyteNo->Visible = FALSE;
    				$this->Stage->Visible = FALSE;
    			}
    			if($_POST["page"] == 'page4')
    			{
    				$this->Day4SiNo->Visible = TRUE;
    				$this->Day4CellNo->Visible = TRUE;
    				$this->Day4Frag->Visible = TRUE;
    				$this->Day4Symmetry->Visible = TRUE;
    				$this->Day4Grade->Visible = TRUE;
    				$this->Day4Cryoptop->Visible = TRUE;
    $this->Day4End->Visible = TRUE;
    				$this->Remarks->Visible = FALSE;
    				$this->OocyteNo->Visible = FALSE;
    				$this->Stage->Visible = FALSE;
    			}
    			if($_POST["page"] == 'page5')
    			{
    				$this->Day5CellNo->Visible = TRUE;
    				$this->Day5ICM->Visible = TRUE;
    				$this->Day5TE->Visible = TRUE;
    				$this->Day5Observation->Visible = TRUE;
    				$this->Day5Collapsed->Visible = TRUE;
    				$this->Day5Vacoulles->Visible = TRUE;
    				$this->Day5Grade->Visible = TRUE;
    				$this->Remarks->Visible = FALSE;
    				$this->OocyteNo->Visible = FALSE;
    				$this->Stage->Visible = FALSE;
    			}
    			if($_POST["page"] == 'page6')
    			{
    				$this->Day6CellNo->Visible = TRUE;
    				$this->Day6ICM->Visible = TRUE;
    				$this->Day6TE->Visible = TRUE;
    				$this->Day6Observation->Visible = TRUE;
    				$this->Day6Collapsed->Visible = TRUE;
    				$this->Day6Vacoulles->Visible = TRUE;
    				$this->Day6Grade->Visible = TRUE;
    				$this->Remarks->Visible = FALSE;
    				$this->OocyteNo->Visible = FALSE;
    				$this->Stage->Visible = FALSE;
    			}
    			if($_POST["page"] == 'pageEnd')
    			{
    				$this->EndSiNo->Visible = TRUE;
    				$this->EndingDay->Visible = TRUE;
    				$this->EndingCellStage->Visible = TRUE;
    				$this->EndingGrade->Visible = TRUE;
    				$this->EndingState->Visible = TRUE;
    				$this->Remarks->Visible = FALSE;
    				$this->OocyteNo->Visible = FALSE;
    				$this->Stage->Visible = FALSE;
    			}
    			if($_POST["page"] == 'pageAll')
    			{
    				$this->Day0sino->Visible = TRUE;
    				$this->Day0OocyteStage->Visible = TRUE;
    				$this->Day0PolarBodyPosition->Visible = TRUE;
    				$this->Day0Breakage->Visible = TRUE;
    				$this->Day0Attempts->Visible = TRUE;
    				$this->Day0SPZMorpho->Visible = TRUE;
    				$this->Day0SPZLocation->Visible = TRUE;
    				$this->Day0SpOrgin->Visible = TRUE;
    				$this->Day5Cryoptop->Visible = TRUE;
    				$this->Day1PN->Visible = TRUE;
    				$this->Day1PB->Visible = TRUE;
    				$this->Day1Pronucleus->Visible = TRUE;
    				$this->Day1Nucleolus->Visible = TRUE;
    				$this->Day1Halo->Visible = TRUE;
    				$this->Day1Sperm->Visible = TRUE;
    				$this->Day1End->Visible = TRUE;
    				$this->Day2CellNo->Visible = TRUE;
    				$this->Day2Frag->Visible = TRUE;
    				$this->Day2Symmetry->Visible = TRUE;
    				$this->Day2Cryoptop->Visible = TRUE;
    				$this->Day2Grade->Visible = TRUE;
    				$this->Day3Sino->Visible = TRUE;
    				$this->Day3CellNo->Visible = TRUE;
    				$this->Day3Frag->Visible = TRUE;
    				$this->Day3Symmetry->Visible = TRUE;
    				$this->Day3Grade->Visible = TRUE;
    				$this->Day3Vacoules->Visible = TRUE;
    				$this->Day3ZP->Visible = TRUE;
    				$this->Day3Cryoptop->Visible = TRUE;
    				$this->Day3End->Visible = TRUE;
    				$this->Day4SiNo->Visible = TRUE;
    				$this->Day4CellNo->Visible = TRUE;
    				$this->Day4Frag->Visible = TRUE;
    				$this->Day4Symmetry->Visible = TRUE;
    				$this->Day4Grade->Visible = TRUE;
    				$this->Day4Cryoptop->Visible = TRUE;
    				$this->Day5CellNo->Visible = TRUE;
    				$this->Day5ICM->Visible = TRUE;
    				$this->Day5TE->Visible = TRUE;
    				$this->Day5Observation->Visible = TRUE;
    				$this->Day5Collapsed->Visible = TRUE;
    				$this->Day5Vacoulles->Visible = TRUE;
    				$this->Day5Grade->Visible = TRUE;
    				$this->Day6CellNo->Visible = TRUE;
    				$this->Day6ICM->Visible = TRUE;
    				$this->Day6TE->Visible = TRUE;
    				$this->Day6Observation->Visible = TRUE;
    				$this->Day6Collapsed->Visible = TRUE;
    				$this->Day6Vacoulles->Visible = TRUE;
    				$this->Day6Grade->Visible = TRUE;
    				$this->Remarks->Visible = FALSE;
    				$this->OocyteNo->Visible = FALSE;
    				$this->Stage->Visible = FALSE;
    			}
    		if($_POST["page"] == 'Vitrification')
    		{
    			$this->vitrificationDate->Visible = TRUE;
    			$this->vitriPrimaryEmbryologist->Visible = TRUE;
    			$this->vitriSecondaryEmbryologist->Visible = TRUE;
    			$this->vitriFertilisationDate->Visible = TRUE;
    			$this->vitriEmbryoNo->Visible = TRUE;
    			$this->vitriDay->Visible = TRUE;
    			$this->vitriGrade->Visible = TRUE;
    			$this->vitriIncubator->Visible = TRUE;
    			$this->vitriTank->Visible = TRUE;
    			$this->vitriCanister->Visible = TRUE;
    			$this->vitriGobiet->Visible = TRUE;
    			$this->vitriCryolockNo->Visible = TRUE;
    			$this->vitriCryolockColour->Visible = TRUE;
    			$this->vitriStage->Visible = TRUE;
    				$this->Remarks->Visible = FALSE;
    				$this->OocyteNo->Visible = FALSE;
    				$this->Stage->Visible = FALSE;
    		}
    		if($_POST["page"] == 'Thawing')
    		{
    			$this->vitriEmbryoNo->Visible = TRUE;
    			$this->vitriDay->Visible = TRUE;
    			$this->vitriGrade->Visible = TRUE;
    			$this->vitriIncubator->Visible = TRUE;
    			$this->vitriTank->Visible = TRUE;
    			$this->vitriCanister->Visible = TRUE;
    			$this->vitriGobiet->Visible = TRUE;
    			$this->vitriCryolockNo->Visible = TRUE;
    			$this->vitriCryolockColour->Visible = TRUE;
    			$this->vitriStage->Visible = TRUE;
    			$this->thawDate->Visible = TRUE;
    			$this->thawPrimaryEmbryologist->Visible = TRUE;
    			$this->thawSecondaryEmbryologist->Visible = TRUE;
    			$this->thawET->Visible = TRUE;
    			$this->thawReFrozen->Visible = FALSE;
    			$this->thawAbserve->Visible = FALSE;
    			$this->thawDiscard->Visible = FALSE;
    				$this->Remarks->Visible = FALSE;
    				$this->OocyteNo->Visible = FALSE;
    				$this->Stage->Visible = FALSE;
    		}
    		if($_POST["page"] == 'EmbryoTransfer')
    		{
    		$this->thawDiscard->Visible = TRUE;
    			$this->ETCatheter->Visible = TRUE;
    			$this->ETDifficulty->Visible = TRUE;
    			$this->ETEasy->Visible = TRUE;
    			$this->ETComments->Visible = TRUE;
    			$this->ETDoctor->Visible = TRUE;
    			$this->ETEmbryologist->Visible = TRUE;
    				$this->ETDate->Visible = TRUE;
    				$this->Remarks->Visible = FALSE;
    				$this->OocyteNo->Visible = FALSE;
    				$this->Stage->Visible = FALSE;
    		}
    	return TRUE;
    }

    // Grid Updated event
    public function gridUpdated($rsold, $rsnew) {
    header("location:javascript://history.go(-1)");
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
