<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for ivf_stimulation_chart
 */
class IvfStimulationChart extends DbTable
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
    public $FemaleFactor;
    public $MaleFactor;
    public $Protocol;
    public $SemenFrozen;
    public $A4ICSICycle;
    public $TotalICSICycle;
    public $TypeOfInfertility;
    public $Duration;
    public $LMP;
    public $RelevantHistory;
    public $IUICycles;
    public $AFC;
    public $AMH;
    public $FBMI;
    public $MBMI;
    public $OvarianVolumeRT;
    public $OvarianVolumeLT;
    public $DAYSOFSTIMULATION;
    public $DOSEOFGONADOTROPINS;
    public $INJTYPE;
    public $ANTAGONISTDAYS;
    public $ANTAGONISTSTARTDAY;
    public $GROWTHHORMONE;
    public $PRETREATMENT;
    public $SerumP4;
    public $FORT;
    public $MedicalFactors;
    public $SCDate;
    public $OvarianSurgery;
    public $PreProcedureOrder;
    public $TRIGGERR;
    public $TRIGGERDATE;
    public $ATHOMEorCLINIC;
    public $OPUDATE;
    public $ALLFREEZEINDICATION;
    public $ERA;
    public $PGTA;
    public $PGD;
    public $DATEOFET;
    public $ET;
    public $ESET;
    public $DOET;
    public $SEMENPREPARATION;
    public $REASONFORESET;
    public $Expectedoocytes;
    public $StChDate1;
    public $StChDate2;
    public $StChDate3;
    public $StChDate4;
    public $StChDate5;
    public $StChDate6;
    public $StChDate7;
    public $StChDate8;
    public $StChDate9;
    public $StChDate10;
    public $StChDate11;
    public $StChDate12;
    public $StChDate13;
    public $CycleDay1;
    public $CycleDay2;
    public $CycleDay3;
    public $CycleDay4;
    public $CycleDay5;
    public $CycleDay6;
    public $CycleDay7;
    public $CycleDay8;
    public $CycleDay9;
    public $CycleDay10;
    public $CycleDay11;
    public $CycleDay12;
    public $CycleDay13;
    public $StimulationDay1;
    public $StimulationDay2;
    public $StimulationDay3;
    public $StimulationDay4;
    public $StimulationDay5;
    public $StimulationDay6;
    public $StimulationDay7;
    public $StimulationDay8;
    public $StimulationDay9;
    public $StimulationDay10;
    public $StimulationDay11;
    public $StimulationDay12;
    public $StimulationDay13;
    public $Tablet1;
    public $Tablet2;
    public $Tablet3;
    public $Tablet4;
    public $Tablet5;
    public $Tablet6;
    public $Tablet7;
    public $Tablet8;
    public $Tablet9;
    public $Tablet10;
    public $Tablet11;
    public $Tablet12;
    public $Tablet13;
    public $RFSH1;
    public $RFSH2;
    public $RFSH3;
    public $RFSH4;
    public $RFSH5;
    public $RFSH6;
    public $RFSH7;
    public $RFSH8;
    public $RFSH9;
    public $RFSH10;
    public $RFSH11;
    public $RFSH12;
    public $RFSH13;
    public $HMG1;
    public $HMG2;
    public $HMG3;
    public $HMG4;
    public $HMG5;
    public $HMG6;
    public $HMG7;
    public $HMG8;
    public $HMG9;
    public $HMG10;
    public $HMG11;
    public $HMG12;
    public $HMG13;
    public $GnRH1;
    public $GnRH2;
    public $GnRH3;
    public $GnRH4;
    public $GnRH5;
    public $GnRH6;
    public $GnRH7;
    public $GnRH8;
    public $GnRH9;
    public $GnRH10;
    public $GnRH11;
    public $GnRH12;
    public $GnRH13;
    public $E21;
    public $E22;
    public $E23;
    public $E24;
    public $E25;
    public $E26;
    public $E27;
    public $E28;
    public $E29;
    public $E210;
    public $E211;
    public $E212;
    public $E213;
    public $P41;
    public $P42;
    public $P43;
    public $P44;
    public $P45;
    public $P46;
    public $P47;
    public $P48;
    public $P49;
    public $P410;
    public $P411;
    public $P412;
    public $P413;
    public $USGRt1;
    public $USGRt2;
    public $USGRt3;
    public $USGRt4;
    public $USGRt5;
    public $USGRt6;
    public $USGRt7;
    public $USGRt8;
    public $USGRt9;
    public $USGRt10;
    public $USGRt11;
    public $USGRt12;
    public $USGRt13;
    public $USGLt1;
    public $USGLt2;
    public $USGLt3;
    public $USGLt4;
    public $USGLt5;
    public $USGLt6;
    public $USGLt7;
    public $USGLt8;
    public $USGLt9;
    public $USGLt10;
    public $USGLt11;
    public $USGLt12;
    public $USGLt13;
    public $EM1;
    public $EM2;
    public $EM3;
    public $EM4;
    public $EM5;
    public $EM6;
    public $EM7;
    public $EM8;
    public $EM9;
    public $EM10;
    public $EM11;
    public $EM12;
    public $EM13;
    public $Others1;
    public $Others2;
    public $Others3;
    public $Others4;
    public $Others5;
    public $Others6;
    public $Others7;
    public $Others8;
    public $Others9;
    public $Others10;
    public $Others11;
    public $Others12;
    public $Others13;
    public $DR1;
    public $DR2;
    public $DR3;
    public $DR4;
    public $DR5;
    public $DR6;
    public $DR7;
    public $DR8;
    public $DR9;
    public $DR10;
    public $DR11;
    public $DR12;
    public $DR13;
    public $DOCTORRESPONSIBLE;
    public $TidNo;
    public $Convert;
    public $Consultant;
    public $InseminatinTechnique;
    public $IndicationForART;
    public $Hysteroscopy;
    public $EndometrialScratching;
    public $TrialCannulation;
    public $CYCLETYPE;
    public $HRTCYCLE;
    public $OralEstrogenDosage;
    public $VaginalEstrogen;
    public $GCSF;
    public $ActivatedPRP;
    public $UCLcm;
    public $DATOFEMBRYOTRANSFER;
    public $DAYOFEMBRYOTRANSFER;
    public $NOOFEMBRYOSTHAWED;
    public $NOOFEMBRYOSTRANSFERRED;
    public $DAYOFEMBRYOS;
    public $CRYOPRESERVEDEMBRYOS;
    public $ViaAdmin;
    public $ViaStartDateTime;
    public $ViaDose;
    public $AllFreeze;
    public $TreatmentCancel;
    public $Reason;
    public $ProgesteroneAdmin;
    public $ProgesteroneStart;
    public $ProgesteroneDose;
    public $Projectron;
    public $StChDate14;
    public $StChDate15;
    public $StChDate16;
    public $StChDate17;
    public $StChDate18;
    public $StChDate19;
    public $StChDate20;
    public $StChDate21;
    public $StChDate22;
    public $StChDate23;
    public $StChDate24;
    public $StChDate25;
    public $CycleDay14;
    public $CycleDay15;
    public $CycleDay16;
    public $CycleDay17;
    public $CycleDay18;
    public $CycleDay19;
    public $CycleDay20;
    public $CycleDay21;
    public $CycleDay22;
    public $CycleDay23;
    public $CycleDay24;
    public $CycleDay25;
    public $StimulationDay14;
    public $StimulationDay15;
    public $StimulationDay16;
    public $StimulationDay17;
    public $StimulationDay18;
    public $StimulationDay19;
    public $StimulationDay20;
    public $StimulationDay21;
    public $StimulationDay22;
    public $StimulationDay23;
    public $StimulationDay24;
    public $StimulationDay25;
    public $Tablet14;
    public $Tablet15;
    public $Tablet16;
    public $Tablet17;
    public $Tablet18;
    public $Tablet19;
    public $Tablet20;
    public $Tablet21;
    public $Tablet22;
    public $Tablet23;
    public $Tablet24;
    public $Tablet25;
    public $RFSH14;
    public $RFSH15;
    public $RFSH16;
    public $RFSH17;
    public $RFSH18;
    public $RFSH19;
    public $RFSH20;
    public $RFSH21;
    public $RFSH22;
    public $RFSH23;
    public $RFSH24;
    public $RFSH25;
    public $HMG14;
    public $HMG15;
    public $HMG16;
    public $HMG17;
    public $HMG18;
    public $HMG19;
    public $HMG20;
    public $HMG21;
    public $HMG22;
    public $HMG23;
    public $HMG24;
    public $HMG25;
    public $GnRH14;
    public $GnRH15;
    public $GnRH16;
    public $GnRH17;
    public $GnRH18;
    public $GnRH19;
    public $GnRH20;
    public $GnRH21;
    public $GnRH22;
    public $GnRH23;
    public $GnRH24;
    public $GnRH25;
    public $P414;
    public $P415;
    public $P416;
    public $P417;
    public $P418;
    public $P419;
    public $P420;
    public $P421;
    public $P422;
    public $P423;
    public $P424;
    public $P425;
    public $USGRt14;
    public $USGRt15;
    public $USGRt16;
    public $USGRt17;
    public $USGRt18;
    public $USGRt19;
    public $USGRt20;
    public $USGRt21;
    public $USGRt22;
    public $USGRt23;
    public $USGRt24;
    public $USGRt25;
    public $USGLt14;
    public $USGLt15;
    public $USGLt16;
    public $USGLt17;
    public $USGLt18;
    public $USGLt19;
    public $USGLt20;
    public $USGLt21;
    public $USGLt22;
    public $USGLt23;
    public $USGLt24;
    public $USGLt25;
    public $EM14;
    public $EM15;
    public $EM16;
    public $EM17;
    public $EM18;
    public $EM19;
    public $EM20;
    public $EM21;
    public $EM22;
    public $EM23;
    public $EM24;
    public $EM25;
    public $Others14;
    public $Others15;
    public $Others16;
    public $Others17;
    public $Others18;
    public $Others19;
    public $Others20;
    public $Others21;
    public $Others22;
    public $Others23;
    public $Others24;
    public $Others25;
    public $DR14;
    public $DR15;
    public $DR16;
    public $DR17;
    public $DR18;
    public $DR19;
    public $DR20;
    public $DR21;
    public $DR22;
    public $DR23;
    public $DR24;
    public $DR25;
    public $E214;
    public $E215;
    public $E216;
    public $E217;
    public $E218;
    public $E219;
    public $E220;
    public $E221;
    public $E222;
    public $E223;
    public $E224;
    public $E225;
    public $EEETTTDTE;
    public $bhcgdate;
    public $TUBAL_PATENCY;
    public $HSG;
    public $DHL;
    public $UTERINE_PROBLEMS;
    public $W_COMORBIDS;
    public $H_COMORBIDS;
    public $SEXUAL_DYSFUNCTION;
    public $TABLETS;
    public $FOLLICLE_STATUS;
    public $NUMBER_OF_IUI;
    public $PROCEDURE;
    public $LUTEAL_SUPPORT;
    public $SPECIFIC_MATERNAL_PROBLEMS;
    public $ONGOING_PREG;
    public $EDD_Date;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'ivf_stimulation_chart';
        $this->TableName = 'ivf_stimulation_chart';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`ivf_stimulation_chart`";
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
        $this->id = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // RIDNo
        $this->RIDNo = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_RIDNo', 'RIDNo', '`RIDNo`', '`RIDNo`', 3, 11, -1, false, '`RIDNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RIDNo->IsForeignKey = true; // Foreign key field
        $this->RIDNo->Sortable = true; // Allow sort
        $this->RIDNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->RIDNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RIDNo->Param, "CustomMsg");
        $this->Fields['RIDNo'] = &$this->RIDNo;

        // Name
        $this->Name = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Name', 'Name', '`Name`', '`Name`', 200, 45, -1, false, '`Name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Name->IsForeignKey = true; // Foreign key field
        $this->Name->Sortable = true; // Allow sort
        $this->Name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Name->Param, "CustomMsg");
        $this->Fields['Name'] = &$this->Name;

        // ARTCycle
        $this->ARTCycle = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_ARTCycle', 'ARTCycle', '`ARTCycle`', '`ARTCycle`', 200, 45, -1, false, '`ARTCycle`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->ARTCycle->Sortable = true; // Allow sort
        $this->ARTCycle->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->ARTCycle->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->ARTCycle->Lookup = new Lookup('ARTCycle', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->ARTCycle->OptionCount = 15;
        $this->ARTCycle->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ARTCycle->Param, "CustomMsg");
        $this->Fields['ARTCycle'] = &$this->ARTCycle;

        // FemaleFactor
        $this->FemaleFactor = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_FemaleFactor', 'FemaleFactor', '`FemaleFactor`', '`FemaleFactor`', 200, 45, -1, false, '`FemaleFactor`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->FemaleFactor->Sortable = true; // Allow sort
        $this->FemaleFactor->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->FemaleFactor->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->FemaleFactor->Lookup = new Lookup('FemaleFactor', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->FemaleFactor->OptionCount = 13;
        $this->FemaleFactor->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FemaleFactor->Param, "CustomMsg");
        $this->Fields['FemaleFactor'] = &$this->FemaleFactor;

        // MaleFactor
        $this->MaleFactor = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_MaleFactor', 'MaleFactor', '`MaleFactor`', '`MaleFactor`', 200, 45, -1, false, '`MaleFactor`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->MaleFactor->Sortable = true; // Allow sort
        $this->MaleFactor->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->MaleFactor->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->MaleFactor->Lookup = new Lookup('MaleFactor', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->MaleFactor->OptionCount = 9;
        $this->MaleFactor->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MaleFactor->Param, "CustomMsg");
        $this->Fields['MaleFactor'] = &$this->MaleFactor;

        // Protocol
        $this->Protocol = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Protocol', 'Protocol', '`Protocol`', '`Protocol`', 200, 45, -1, false, '`Protocol`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Protocol->Sortable = true; // Allow sort
        $this->Protocol->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Protocol->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Protocol->Lookup = new Lookup('Protocol', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Protocol->OptionCount = 2;
        $this->Protocol->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Protocol->Param, "CustomMsg");
        $this->Fields['Protocol'] = &$this->Protocol;

        // SemenFrozen
        $this->SemenFrozen = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_SemenFrozen', 'SemenFrozen', '`SemenFrozen`', '`SemenFrozen`', 200, 45, -1, false, '`SemenFrozen`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->SemenFrozen->Sortable = true; // Allow sort
        $this->SemenFrozen->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->SemenFrozen->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->SemenFrozen->Lookup = new Lookup('SemenFrozen', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->SemenFrozen->OptionCount = 2;
        $this->SemenFrozen->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SemenFrozen->Param, "CustomMsg");
        $this->Fields['SemenFrozen'] = &$this->SemenFrozen;

        // A4ICSICycle
        $this->A4ICSICycle = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_A4ICSICycle', 'A4ICSICycle', '`A4ICSICycle`', '`A4ICSICycle`', 200, 45, -1, false, '`A4ICSICycle`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->A4ICSICycle->Sortable = true; // Allow sort
        $this->A4ICSICycle->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->A4ICSICycle->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->A4ICSICycle->Lookup = new Lookup('A4ICSICycle', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->A4ICSICycle->OptionCount = 3;
        $this->A4ICSICycle->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->A4ICSICycle->Param, "CustomMsg");
        $this->Fields['A4ICSICycle'] = &$this->A4ICSICycle;

        // TotalICSICycle
        $this->TotalICSICycle = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_TotalICSICycle', 'TotalICSICycle', '`TotalICSICycle`', '`TotalICSICycle`', 200, 45, -1, false, '`TotalICSICycle`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->TotalICSICycle->Sortable = true; // Allow sort
        $this->TotalICSICycle->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->TotalICSICycle->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->TotalICSICycle->Lookup = new Lookup('TotalICSICycle', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->TotalICSICycle->OptionCount = 5;
        $this->TotalICSICycle->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TotalICSICycle->Param, "CustomMsg");
        $this->Fields['TotalICSICycle'] = &$this->TotalICSICycle;

        // TypeOfInfertility
        $this->TypeOfInfertility = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_TypeOfInfertility', 'TypeOfInfertility', '`TypeOfInfertility`', '`TypeOfInfertility`', 200, 45, -1, false, '`TypeOfInfertility`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->TypeOfInfertility->Sortable = true; // Allow sort
        $this->TypeOfInfertility->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->TypeOfInfertility->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->TypeOfInfertility->Lookup = new Lookup('TypeOfInfertility', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->TypeOfInfertility->OptionCount = 2;
        $this->TypeOfInfertility->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TypeOfInfertility->Param, "CustomMsg");
        $this->Fields['TypeOfInfertility'] = &$this->TypeOfInfertility;

        // Duration
        $this->Duration = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Duration', 'Duration', '`Duration`', '`Duration`', 200, 45, -1, false, '`Duration`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Duration->Sortable = true; // Allow sort
        $this->Duration->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Duration->Param, "CustomMsg");
        $this->Fields['Duration'] = &$this->Duration;

        // LMP
        $this->LMP = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_LMP', 'LMP', '`LMP`', CastDateFieldForLike("`LMP`", 7, "DB"), 135, 19, 7, false, '`LMP`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->LMP->Sortable = true; // Allow sort
        $this->LMP->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->LMP->Param, "CustomMsg");
        $this->Fields['LMP'] = &$this->LMP;

        // RelevantHistory
        $this->RelevantHistory = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_RelevantHistory', 'RelevantHistory', '`RelevantHistory`', '`RelevantHistory`', 200, 45, -1, false, '`RelevantHistory`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RelevantHistory->Sortable = true; // Allow sort
        $this->RelevantHistory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RelevantHistory->Param, "CustomMsg");
        $this->Fields['RelevantHistory'] = &$this->RelevantHistory;

        // IUICycles
        $this->IUICycles = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_IUICycles', 'IUICycles', '`IUICycles`', '`IUICycles`', 200, 45, -1, false, '`IUICycles`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IUICycles->Sortable = true; // Allow sort
        $this->IUICycles->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IUICycles->Param, "CustomMsg");
        $this->Fields['IUICycles'] = &$this->IUICycles;

        // AFC
        $this->AFC = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_AFC', 'AFC', '`AFC`', '`AFC`', 200, 45, -1, false, '`AFC`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AFC->Sortable = true; // Allow sort
        $this->AFC->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AFC->Param, "CustomMsg");
        $this->Fields['AFC'] = &$this->AFC;

        // AMH
        $this->AMH = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_AMH', 'AMH', '`AMH`', '`AMH`', 200, 45, -1, false, '`AMH`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AMH->Sortable = true; // Allow sort
        $this->AMH->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AMH->Param, "CustomMsg");
        $this->Fields['AMH'] = &$this->AMH;

        // FBMI
        $this->FBMI = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_FBMI', 'FBMI', '`FBMI`', '`FBMI`', 200, 45, -1, false, '`FBMI`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FBMI->Sortable = true; // Allow sort
        $this->FBMI->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FBMI->Param, "CustomMsg");
        $this->Fields['FBMI'] = &$this->FBMI;

        // MBMI
        $this->MBMI = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_MBMI', 'MBMI', '`MBMI`', '`MBMI`', 200, 45, -1, false, '`MBMI`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MBMI->Sortable = true; // Allow sort
        $this->MBMI->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MBMI->Param, "CustomMsg");
        $this->Fields['MBMI'] = &$this->MBMI;

        // OvarianVolumeRT
        $this->OvarianVolumeRT = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_OvarianVolumeRT', 'OvarianVolumeRT', '`OvarianVolumeRT`', '`OvarianVolumeRT`', 200, 45, -1, false, '`OvarianVolumeRT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OvarianVolumeRT->Sortable = true; // Allow sort
        $this->OvarianVolumeRT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OvarianVolumeRT->Param, "CustomMsg");
        $this->Fields['OvarianVolumeRT'] = &$this->OvarianVolumeRT;

        // OvarianVolumeLT
        $this->OvarianVolumeLT = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_OvarianVolumeLT', 'OvarianVolumeLT', '`OvarianVolumeLT`', '`OvarianVolumeLT`', 200, 45, -1, false, '`OvarianVolumeLT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OvarianVolumeLT->Sortable = true; // Allow sort
        $this->OvarianVolumeLT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OvarianVolumeLT->Param, "CustomMsg");
        $this->Fields['OvarianVolumeLT'] = &$this->OvarianVolumeLT;

        // DAYSOFSTIMULATION
        $this->DAYSOFSTIMULATION = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DAYSOFSTIMULATION', 'DAYSOFSTIMULATION', '`DAYSOFSTIMULATION`', '`DAYSOFSTIMULATION`', 200, 45, -1, false, '`DAYSOFSTIMULATION`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DAYSOFSTIMULATION->Sortable = true; // Allow sort
        $this->DAYSOFSTIMULATION->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DAYSOFSTIMULATION->Param, "CustomMsg");
        $this->Fields['DAYSOFSTIMULATION'] = &$this->DAYSOFSTIMULATION;

        // DOSEOFGONADOTROPINS
        $this->DOSEOFGONADOTROPINS = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DOSEOFGONADOTROPINS', 'DOSEOFGONADOTROPINS', '`DOSEOFGONADOTROPINS`', '`DOSEOFGONADOTROPINS`', 200, 45, -1, false, '`DOSEOFGONADOTROPINS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DOSEOFGONADOTROPINS->Sortable = true; // Allow sort
        $this->DOSEOFGONADOTROPINS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DOSEOFGONADOTROPINS->Param, "CustomMsg");
        $this->Fields['DOSEOFGONADOTROPINS'] = &$this->DOSEOFGONADOTROPINS;

        // INJTYPE
        $this->INJTYPE = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_INJTYPE', 'INJTYPE', '`INJTYPE`', '`INJTYPE`', 200, 45, -1, false, '`INJTYPE`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->INJTYPE->Sortable = true; // Allow sort
        $this->INJTYPE->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->INJTYPE->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->INJTYPE->Lookup = new Lookup('INJTYPE', 'ivf_stimulation_inj', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->INJTYPE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->INJTYPE->Param, "CustomMsg");
        $this->Fields['INJTYPE'] = &$this->INJTYPE;

        // ANTAGONISTDAYS
        $this->ANTAGONISTDAYS = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_ANTAGONISTDAYS', 'ANTAGONISTDAYS', '`ANTAGONISTDAYS`', '`ANTAGONISTDAYS`', 200, 45, -1, false, '`ANTAGONISTDAYS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ANTAGONISTDAYS->Sortable = true; // Allow sort
        $this->ANTAGONISTDAYS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ANTAGONISTDAYS->Param, "CustomMsg");
        $this->Fields['ANTAGONISTDAYS'] = &$this->ANTAGONISTDAYS;

        // ANTAGONISTSTARTDAY
        $this->ANTAGONISTSTARTDAY = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_ANTAGONISTSTARTDAY', 'ANTAGONISTSTARTDAY', '`ANTAGONISTSTARTDAY`', '`ANTAGONISTSTARTDAY`', 200, 45, -1, false, '`ANTAGONISTSTARTDAY`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->ANTAGONISTSTARTDAY->Sortable = true; // Allow sort
        $this->ANTAGONISTSTARTDAY->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->ANTAGONISTSTARTDAY->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->ANTAGONISTSTARTDAY->Lookup = new Lookup('ANTAGONISTSTARTDAY', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->ANTAGONISTSTARTDAY->OptionCount = 3;
        $this->ANTAGONISTSTARTDAY->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ANTAGONISTSTARTDAY->Param, "CustomMsg");
        $this->Fields['ANTAGONISTSTARTDAY'] = &$this->ANTAGONISTSTARTDAY;

        // GROWTHHORMONE
        $this->GROWTHHORMONE = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_GROWTHHORMONE', 'GROWTHHORMONE', '`GROWTHHORMONE`', '`GROWTHHORMONE`', 200, 45, -1, false, '`GROWTHHORMONE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GROWTHHORMONE->Sortable = true; // Allow sort
        $this->GROWTHHORMONE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GROWTHHORMONE->Param, "CustomMsg");
        $this->Fields['GROWTHHORMONE'] = &$this->GROWTHHORMONE;

        // PRETREATMENT
        $this->PRETREATMENT = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_PRETREATMENT', 'PRETREATMENT', '`PRETREATMENT`', '`PRETREATMENT`', 200, 45, -1, false, '`PRETREATMENT`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->PRETREATMENT->Sortable = true; // Allow sort
        $this->PRETREATMENT->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->PRETREATMENT->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->PRETREATMENT->Lookup = new Lookup('PRETREATMENT', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->PRETREATMENT->OptionCount = 7;
        $this->PRETREATMENT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PRETREATMENT->Param, "CustomMsg");
        $this->Fields['PRETREATMENT'] = &$this->PRETREATMENT;

        // SerumP4
        $this->SerumP4 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_SerumP4', 'SerumP4', '`SerumP4`', '`SerumP4`', 200, 45, -1, false, '`SerumP4`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SerumP4->Sortable = true; // Allow sort
        $this->SerumP4->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SerumP4->Param, "CustomMsg");
        $this->Fields['SerumP4'] = &$this->SerumP4;

        // FORT
        $this->FORT = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_FORT', 'FORT', '`FORT`', '`FORT`', 200, 45, -1, false, '`FORT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FORT->Sortable = true; // Allow sort
        $this->FORT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FORT->Param, "CustomMsg");
        $this->Fields['FORT'] = &$this->FORT;

        // MedicalFactors
        $this->MedicalFactors = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_MedicalFactors', 'MedicalFactors', '`MedicalFactors`', '`MedicalFactors`', 200, 45, -1, false, '`MedicalFactors`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->MedicalFactors->Sortable = true; // Allow sort
        $this->MedicalFactors->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->MedicalFactors->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->MedicalFactors->Lookup = new Lookup('MedicalFactors', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->MedicalFactors->OptionCount = 5;
        $this->MedicalFactors->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MedicalFactors->Param, "CustomMsg");
        $this->Fields['MedicalFactors'] = &$this->MedicalFactors;

        // SCDate
        $this->SCDate = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_SCDate', 'SCDate', '`SCDate`', CastDateFieldForLike("`SCDate`", 7, "DB"), 135, 19, 7, false, '`SCDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SCDate->Sortable = true; // Allow sort
        $this->SCDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SCDate->Param, "CustomMsg");
        $this->Fields['SCDate'] = &$this->SCDate;

        // OvarianSurgery
        $this->OvarianSurgery = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_OvarianSurgery', 'OvarianSurgery', '`OvarianSurgery`', '`OvarianSurgery`', 200, 45, -1, false, '`OvarianSurgery`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OvarianSurgery->Sortable = true; // Allow sort
        $this->OvarianSurgery->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OvarianSurgery->Param, "CustomMsg");
        $this->Fields['OvarianSurgery'] = &$this->OvarianSurgery;

        // PreProcedureOrder
        $this->PreProcedureOrder = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_PreProcedureOrder', 'PreProcedureOrder', '`PreProcedureOrder`', '`PreProcedureOrder`', 200, 45, -1, false, '`PreProcedureOrder`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PreProcedureOrder->Sortable = true; // Allow sort
        $this->PreProcedureOrder->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PreProcedureOrder->Param, "CustomMsg");
        $this->Fields['PreProcedureOrder'] = &$this->PreProcedureOrder;

        // TRIGGERR
        $this->TRIGGERR = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_TRIGGERR', 'TRIGGERR', '`TRIGGERR`', '`TRIGGERR`', 200, 200, -1, false, '`TRIGGERR`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->TRIGGERR->Sortable = true; // Allow sort
        $this->TRIGGERR->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->TRIGGERR->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->TRIGGERR->Lookup = new Lookup('TRIGGERR', 'ivf_stimulation_trigger', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->TRIGGERR->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TRIGGERR->Param, "CustomMsg");
        $this->Fields['TRIGGERR'] = &$this->TRIGGERR;

        // TRIGGERDATE
        $this->TRIGGERDATE = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_TRIGGERDATE', 'TRIGGERDATE', '`TRIGGERDATE`', CastDateFieldForLike("`TRIGGERDATE`", 11, "DB"), 135, 19, 11, false, '`TRIGGERDATE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TRIGGERDATE->Sortable = true; // Allow sort
        $this->TRIGGERDATE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TRIGGERDATE->Param, "CustomMsg");
        $this->Fields['TRIGGERDATE'] = &$this->TRIGGERDATE;

        // ATHOMEorCLINIC
        $this->ATHOMEorCLINIC = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_ATHOMEorCLINIC', 'ATHOMEorCLINIC', '`ATHOMEorCLINIC`', '`ATHOMEorCLINIC`', 200, 45, -1, false, '`ATHOMEorCLINIC`', false, false, false, 'FORMATTED TEXT', 'RADIO');
        $this->ATHOMEorCLINIC->Sortable = true; // Allow sort
        $this->ATHOMEorCLINIC->Lookup = new Lookup('ATHOMEorCLINIC', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->ATHOMEorCLINIC->OptionCount = 2;
        $this->ATHOMEorCLINIC->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ATHOMEorCLINIC->Param, "CustomMsg");
        $this->Fields['ATHOMEorCLINIC'] = &$this->ATHOMEorCLINIC;

        // OPUDATE
        $this->OPUDATE = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_OPUDATE', 'OPUDATE', '`OPUDATE`', CastDateFieldForLike("`OPUDATE`", 11, "DB"), 135, 19, 11, false, '`OPUDATE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OPUDATE->Sortable = true; // Allow sort
        $this->OPUDATE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OPUDATE->Param, "CustomMsg");
        $this->Fields['OPUDATE'] = &$this->OPUDATE;

        // ALLFREEZEINDICATION
        $this->ALLFREEZEINDICATION = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_ALLFREEZEINDICATION', 'ALLFREEZEINDICATION', '`ALLFREEZEINDICATION`', '`ALLFREEZEINDICATION`', 200, 45, -1, false, '`ALLFREEZEINDICATION`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->ALLFREEZEINDICATION->Sortable = true; // Allow sort
        $this->ALLFREEZEINDICATION->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->ALLFREEZEINDICATION->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->ALLFREEZEINDICATION->Lookup = new Lookup('ALLFREEZEINDICATION', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->ALLFREEZEINDICATION->OptionCount = 8;
        $this->ALLFREEZEINDICATION->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ALLFREEZEINDICATION->Param, "CustomMsg");
        $this->Fields['ALLFREEZEINDICATION'] = &$this->ALLFREEZEINDICATION;

        // ERA
        $this->ERA = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_ERA', 'ERA', '`ERA`', '`ERA`', 200, 45, -1, false, '`ERA`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->ERA->Sortable = true; // Allow sort
        $this->ERA->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->ERA->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->ERA->Lookup = new Lookup('ERA', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->ERA->OptionCount = 5;
        $this->ERA->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ERA->Param, "CustomMsg");
        $this->Fields['ERA'] = &$this->ERA;

        // PGTA
        $this->PGTA = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_PGTA', 'PGTA', '`PGTA`', '`PGTA`', 200, 45, -1, false, '`PGTA`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PGTA->Sortable = true; // Allow sort
        $this->PGTA->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PGTA->Param, "CustomMsg");
        $this->Fields['PGTA'] = &$this->PGTA;

        // PGD
        $this->PGD = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_PGD', 'PGD', '`PGD`', '`PGD`', 200, 45, -1, false, '`PGD`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PGD->Sortable = true; // Allow sort
        $this->PGD->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PGD->Param, "CustomMsg");
        $this->Fields['PGD'] = &$this->PGD;

        // DATEOFET
        $this->DATEOFET = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DATEOFET', 'DATEOFET', '`DATEOFET`', CastDateFieldForLike("`DATEOFET`", 11, "DB"), 135, 19, 11, false, '`DATEOFET`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DATEOFET->Sortable = true; // Allow sort
        $this->DATEOFET->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DATEOFET->Param, "CustomMsg");
        $this->Fields['DATEOFET'] = &$this->DATEOFET;

        // ET
        $this->ET = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_ET', 'ET', '`ET`', '`ET`', 200, 45, -1, false, '`ET`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->ET->Sortable = true; // Allow sort
        $this->ET->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->ET->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->ET->Lookup = new Lookup('ET', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->ET->OptionCount = 2;
        $this->ET->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ET->Param, "CustomMsg");
        $this->Fields['ET'] = &$this->ET;

        // ESET
        $this->ESET = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_ESET', 'ESET', '`ESET`', '`ESET`', 200, 45, -1, false, '`ESET`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ESET->Sortable = true; // Allow sort
        $this->ESET->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ESET->Param, "CustomMsg");
        $this->Fields['ESET'] = &$this->ESET;

        // DOET
        $this->DOET = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DOET', 'DOET', '`DOET`', '`DOET`', 200, 45, -1, false, '`DOET`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DOET->Sortable = true; // Allow sort
        $this->DOET->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DOET->Param, "CustomMsg");
        $this->Fields['DOET'] = &$this->DOET;

        // SEMENPREPARATION
        $this->SEMENPREPARATION = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_SEMENPREPARATION', 'SEMENPREPARATION', '`SEMENPREPARATION`', '`SEMENPREPARATION`', 200, 45, -1, false, '`SEMENPREPARATION`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->SEMENPREPARATION->Sortable = true; // Allow sort
        $this->SEMENPREPARATION->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->SEMENPREPARATION->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->SEMENPREPARATION->Lookup = new Lookup('SEMENPREPARATION', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->SEMENPREPARATION->OptionCount = 5;
        $this->SEMENPREPARATION->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SEMENPREPARATION->Param, "CustomMsg");
        $this->Fields['SEMENPREPARATION'] = &$this->SEMENPREPARATION;

        // REASONFORESET
        $this->REASONFORESET = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_REASONFORESET', 'REASONFORESET', '`REASONFORESET`', '`REASONFORESET`', 200, 45, -1, false, '`REASONFORESET`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->REASONFORESET->Sortable = true; // Allow sort
        $this->REASONFORESET->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->REASONFORESET->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->REASONFORESET->Lookup = new Lookup('REASONFORESET', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->REASONFORESET->OptionCount = 5;
        $this->REASONFORESET->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->REASONFORESET->Param, "CustomMsg");
        $this->Fields['REASONFORESET'] = &$this->REASONFORESET;

        // Expectedoocytes
        $this->Expectedoocytes = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Expectedoocytes', 'Expectedoocytes', '`Expectedoocytes`', '`Expectedoocytes`', 200, 45, -1, false, '`Expectedoocytes`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Expectedoocytes->Sortable = true; // Allow sort
        $this->Expectedoocytes->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Expectedoocytes->Param, "CustomMsg");
        $this->Fields['Expectedoocytes'] = &$this->Expectedoocytes;

        // StChDate1
        $this->StChDate1 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StChDate1', 'StChDate1', '`StChDate1`', CastDateFieldForLike("`StChDate1`", 7, "DB"), 135, 19, 7, false, '`StChDate1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StChDate1->Sortable = true; // Allow sort
        $this->StChDate1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StChDate1->Param, "CustomMsg");
        $this->Fields['StChDate1'] = &$this->StChDate1;

        // StChDate2
        $this->StChDate2 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StChDate2', 'StChDate2', '`StChDate2`', CastDateFieldForLike("`StChDate2`", 7, "DB"), 135, 19, 7, false, '`StChDate2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StChDate2->Sortable = true; // Allow sort
        $this->StChDate2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StChDate2->Param, "CustomMsg");
        $this->Fields['StChDate2'] = &$this->StChDate2;

        // StChDate3
        $this->StChDate3 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StChDate3', 'StChDate3', '`StChDate3`', CastDateFieldForLike("`StChDate3`", 7, "DB"), 135, 19, 7, false, '`StChDate3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StChDate3->Sortable = true; // Allow sort
        $this->StChDate3->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StChDate3->Param, "CustomMsg");
        $this->Fields['StChDate3'] = &$this->StChDate3;

        // StChDate4
        $this->StChDate4 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StChDate4', 'StChDate4', '`StChDate4`', CastDateFieldForLike("`StChDate4`", 7, "DB"), 135, 19, 7, false, '`StChDate4`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StChDate4->Sortable = true; // Allow sort
        $this->StChDate4->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StChDate4->Param, "CustomMsg");
        $this->Fields['StChDate4'] = &$this->StChDate4;

        // StChDate5
        $this->StChDate5 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StChDate5', 'StChDate5', '`StChDate5`', CastDateFieldForLike("`StChDate5`", 7, "DB"), 135, 19, 7, false, '`StChDate5`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StChDate5->Sortable = true; // Allow sort
        $this->StChDate5->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StChDate5->Param, "CustomMsg");
        $this->Fields['StChDate5'] = &$this->StChDate5;

        // StChDate6
        $this->StChDate6 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StChDate6', 'StChDate6', '`StChDate6`', CastDateFieldForLike("`StChDate6`", 7, "DB"), 135, 19, 7, false, '`StChDate6`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StChDate6->Sortable = true; // Allow sort
        $this->StChDate6->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StChDate6->Param, "CustomMsg");
        $this->Fields['StChDate6'] = &$this->StChDate6;

        // StChDate7
        $this->StChDate7 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StChDate7', 'StChDate7', '`StChDate7`', CastDateFieldForLike("`StChDate7`", 7, "DB"), 135, 19, 7, false, '`StChDate7`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StChDate7->Sortable = true; // Allow sort
        $this->StChDate7->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StChDate7->Param, "CustomMsg");
        $this->Fields['StChDate7'] = &$this->StChDate7;

        // StChDate8
        $this->StChDate8 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StChDate8', 'StChDate8', '`StChDate8`', CastDateFieldForLike("`StChDate8`", 7, "DB"), 135, 19, 7, false, '`StChDate8`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StChDate8->Sortable = true; // Allow sort
        $this->StChDate8->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StChDate8->Param, "CustomMsg");
        $this->Fields['StChDate8'] = &$this->StChDate8;

        // StChDate9
        $this->StChDate9 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StChDate9', 'StChDate9', '`StChDate9`', CastDateFieldForLike("`StChDate9`", 7, "DB"), 135, 19, 7, false, '`StChDate9`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StChDate9->Sortable = true; // Allow sort
        $this->StChDate9->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StChDate9->Param, "CustomMsg");
        $this->Fields['StChDate9'] = &$this->StChDate9;

        // StChDate10
        $this->StChDate10 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StChDate10', 'StChDate10', '`StChDate10`', CastDateFieldForLike("`StChDate10`", 7, "DB"), 135, 19, 7, false, '`StChDate10`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StChDate10->Sortable = true; // Allow sort
        $this->StChDate10->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StChDate10->Param, "CustomMsg");
        $this->Fields['StChDate10'] = &$this->StChDate10;

        // StChDate11
        $this->StChDate11 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StChDate11', 'StChDate11', '`StChDate11`', CastDateFieldForLike("`StChDate11`", 7, "DB"), 135, 19, 7, false, '`StChDate11`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StChDate11->Sortable = true; // Allow sort
        $this->StChDate11->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StChDate11->Param, "CustomMsg");
        $this->Fields['StChDate11'] = &$this->StChDate11;

        // StChDate12
        $this->StChDate12 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StChDate12', 'StChDate12', '`StChDate12`', CastDateFieldForLike("`StChDate12`", 7, "DB"), 135, 19, 7, false, '`StChDate12`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StChDate12->Sortable = true; // Allow sort
        $this->StChDate12->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StChDate12->Param, "CustomMsg");
        $this->Fields['StChDate12'] = &$this->StChDate12;

        // StChDate13
        $this->StChDate13 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StChDate13', 'StChDate13', '`StChDate13`', CastDateFieldForLike("`StChDate13`", 7, "DB"), 135, 19, 7, false, '`StChDate13`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StChDate13->Sortable = true; // Allow sort
        $this->StChDate13->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StChDate13->Param, "CustomMsg");
        $this->Fields['StChDate13'] = &$this->StChDate13;

        // CycleDay1
        $this->CycleDay1 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_CycleDay1', 'CycleDay1', '`CycleDay1`', '`CycleDay1`', 200, 45, -1, false, '`CycleDay1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CycleDay1->Sortable = true; // Allow sort
        $this->CycleDay1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CycleDay1->Param, "CustomMsg");
        $this->Fields['CycleDay1'] = &$this->CycleDay1;

        // CycleDay2
        $this->CycleDay2 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_CycleDay2', 'CycleDay2', '`CycleDay2`', '`CycleDay2`', 200, 45, -1, false, '`CycleDay2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CycleDay2->Sortable = true; // Allow sort
        $this->CycleDay2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CycleDay2->Param, "CustomMsg");
        $this->Fields['CycleDay2'] = &$this->CycleDay2;

        // CycleDay3
        $this->CycleDay3 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_CycleDay3', 'CycleDay3', '`CycleDay3`', '`CycleDay3`', 200, 45, -1, false, '`CycleDay3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CycleDay3->Sortable = true; // Allow sort
        $this->CycleDay3->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CycleDay3->Param, "CustomMsg");
        $this->Fields['CycleDay3'] = &$this->CycleDay3;

        // CycleDay4
        $this->CycleDay4 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_CycleDay4', 'CycleDay4', '`CycleDay4`', '`CycleDay4`', 200, 45, -1, false, '`CycleDay4`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CycleDay4->Sortable = true; // Allow sort
        $this->CycleDay4->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CycleDay4->Param, "CustomMsg");
        $this->Fields['CycleDay4'] = &$this->CycleDay4;

        // CycleDay5
        $this->CycleDay5 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_CycleDay5', 'CycleDay5', '`CycleDay5`', '`CycleDay5`', 200, 45, -1, false, '`CycleDay5`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CycleDay5->Sortable = true; // Allow sort
        $this->CycleDay5->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CycleDay5->Param, "CustomMsg");
        $this->Fields['CycleDay5'] = &$this->CycleDay5;

        // CycleDay6
        $this->CycleDay6 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_CycleDay6', 'CycleDay6', '`CycleDay6`', '`CycleDay6`', 200, 45, -1, false, '`CycleDay6`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CycleDay6->Sortable = true; // Allow sort
        $this->CycleDay6->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CycleDay6->Param, "CustomMsg");
        $this->Fields['CycleDay6'] = &$this->CycleDay6;

        // CycleDay7
        $this->CycleDay7 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_CycleDay7', 'CycleDay7', '`CycleDay7`', '`CycleDay7`', 200, 45, -1, false, '`CycleDay7`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CycleDay7->Sortable = true; // Allow sort
        $this->CycleDay7->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CycleDay7->Param, "CustomMsg");
        $this->Fields['CycleDay7'] = &$this->CycleDay7;

        // CycleDay8
        $this->CycleDay8 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_CycleDay8', 'CycleDay8', '`CycleDay8`', '`CycleDay8`', 200, 45, -1, false, '`CycleDay8`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CycleDay8->Sortable = true; // Allow sort
        $this->CycleDay8->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CycleDay8->Param, "CustomMsg");
        $this->Fields['CycleDay8'] = &$this->CycleDay8;

        // CycleDay9
        $this->CycleDay9 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_CycleDay9', 'CycleDay9', '`CycleDay9`', '`CycleDay9`', 200, 45, -1, false, '`CycleDay9`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CycleDay9->Sortable = true; // Allow sort
        $this->CycleDay9->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CycleDay9->Param, "CustomMsg");
        $this->Fields['CycleDay9'] = &$this->CycleDay9;

        // CycleDay10
        $this->CycleDay10 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_CycleDay10', 'CycleDay10', '`CycleDay10`', '`CycleDay10`', 200, 45, -1, false, '`CycleDay10`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CycleDay10->Sortable = true; // Allow sort
        $this->CycleDay10->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CycleDay10->Param, "CustomMsg");
        $this->Fields['CycleDay10'] = &$this->CycleDay10;

        // CycleDay11
        $this->CycleDay11 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_CycleDay11', 'CycleDay11', '`CycleDay11`', '`CycleDay11`', 200, 45, -1, false, '`CycleDay11`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CycleDay11->Sortable = true; // Allow sort
        $this->CycleDay11->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CycleDay11->Param, "CustomMsg");
        $this->Fields['CycleDay11'] = &$this->CycleDay11;

        // CycleDay12
        $this->CycleDay12 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_CycleDay12', 'CycleDay12', '`CycleDay12`', '`CycleDay12`', 200, 45, -1, false, '`CycleDay12`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CycleDay12->Sortable = true; // Allow sort
        $this->CycleDay12->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CycleDay12->Param, "CustomMsg");
        $this->Fields['CycleDay12'] = &$this->CycleDay12;

        // CycleDay13
        $this->CycleDay13 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_CycleDay13', 'CycleDay13', '`CycleDay13`', '`CycleDay13`', 200, 45, -1, false, '`CycleDay13`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CycleDay13->Sortable = true; // Allow sort
        $this->CycleDay13->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CycleDay13->Param, "CustomMsg");
        $this->Fields['CycleDay13'] = &$this->CycleDay13;

        // StimulationDay1
        $this->StimulationDay1 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StimulationDay1', 'StimulationDay1', '`StimulationDay1`', '`StimulationDay1`', 200, 45, -1, false, '`StimulationDay1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StimulationDay1->Sortable = true; // Allow sort
        $this->StimulationDay1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StimulationDay1->Param, "CustomMsg");
        $this->Fields['StimulationDay1'] = &$this->StimulationDay1;

        // StimulationDay2
        $this->StimulationDay2 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StimulationDay2', 'StimulationDay2', '`StimulationDay2`', '`StimulationDay2`', 200, 45, -1, false, '`StimulationDay2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StimulationDay2->Sortable = true; // Allow sort
        $this->StimulationDay2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StimulationDay2->Param, "CustomMsg");
        $this->Fields['StimulationDay2'] = &$this->StimulationDay2;

        // StimulationDay3
        $this->StimulationDay3 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StimulationDay3', 'StimulationDay3', '`StimulationDay3`', '`StimulationDay3`', 200, 45, -1, false, '`StimulationDay3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StimulationDay3->Sortable = true; // Allow sort
        $this->StimulationDay3->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StimulationDay3->Param, "CustomMsg");
        $this->Fields['StimulationDay3'] = &$this->StimulationDay3;

        // StimulationDay4
        $this->StimulationDay4 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StimulationDay4', 'StimulationDay4', '`StimulationDay4`', '`StimulationDay4`', 200, 45, -1, false, '`StimulationDay4`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StimulationDay4->Sortable = true; // Allow sort
        $this->StimulationDay4->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StimulationDay4->Param, "CustomMsg");
        $this->Fields['StimulationDay4'] = &$this->StimulationDay4;

        // StimulationDay5
        $this->StimulationDay5 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StimulationDay5', 'StimulationDay5', '`StimulationDay5`', '`StimulationDay5`', 200, 45, -1, false, '`StimulationDay5`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StimulationDay5->Sortable = true; // Allow sort
        $this->StimulationDay5->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StimulationDay5->Param, "CustomMsg");
        $this->Fields['StimulationDay5'] = &$this->StimulationDay5;

        // StimulationDay6
        $this->StimulationDay6 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StimulationDay6', 'StimulationDay6', '`StimulationDay6`', '`StimulationDay6`', 200, 45, -1, false, '`StimulationDay6`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StimulationDay6->Sortable = true; // Allow sort
        $this->StimulationDay6->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StimulationDay6->Param, "CustomMsg");
        $this->Fields['StimulationDay6'] = &$this->StimulationDay6;

        // StimulationDay7
        $this->StimulationDay7 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StimulationDay7', 'StimulationDay7', '`StimulationDay7`', '`StimulationDay7`', 200, 45, -1, false, '`StimulationDay7`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StimulationDay7->Sortable = true; // Allow sort
        $this->StimulationDay7->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StimulationDay7->Param, "CustomMsg");
        $this->Fields['StimulationDay7'] = &$this->StimulationDay7;

        // StimulationDay8
        $this->StimulationDay8 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StimulationDay8', 'StimulationDay8', '`StimulationDay8`', '`StimulationDay8`', 200, 45, -1, false, '`StimulationDay8`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StimulationDay8->Sortable = true; // Allow sort
        $this->StimulationDay8->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StimulationDay8->Param, "CustomMsg");
        $this->Fields['StimulationDay8'] = &$this->StimulationDay8;

        // StimulationDay9
        $this->StimulationDay9 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StimulationDay9', 'StimulationDay9', '`StimulationDay9`', '`StimulationDay9`', 200, 45, -1, false, '`StimulationDay9`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StimulationDay9->Sortable = true; // Allow sort
        $this->StimulationDay9->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StimulationDay9->Param, "CustomMsg");
        $this->Fields['StimulationDay9'] = &$this->StimulationDay9;

        // StimulationDay10
        $this->StimulationDay10 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StimulationDay10', 'StimulationDay10', '`StimulationDay10`', '`StimulationDay10`', 200, 45, -1, false, '`StimulationDay10`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StimulationDay10->Sortable = true; // Allow sort
        $this->StimulationDay10->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StimulationDay10->Param, "CustomMsg");
        $this->Fields['StimulationDay10'] = &$this->StimulationDay10;

        // StimulationDay11
        $this->StimulationDay11 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StimulationDay11', 'StimulationDay11', '`StimulationDay11`', '`StimulationDay11`', 200, 45, -1, false, '`StimulationDay11`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StimulationDay11->Sortable = true; // Allow sort
        $this->StimulationDay11->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StimulationDay11->Param, "CustomMsg");
        $this->Fields['StimulationDay11'] = &$this->StimulationDay11;

        // StimulationDay12
        $this->StimulationDay12 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StimulationDay12', 'StimulationDay12', '`StimulationDay12`', '`StimulationDay12`', 200, 45, -1, false, '`StimulationDay12`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StimulationDay12->Sortable = true; // Allow sort
        $this->StimulationDay12->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StimulationDay12->Param, "CustomMsg");
        $this->Fields['StimulationDay12'] = &$this->StimulationDay12;

        // StimulationDay13
        $this->StimulationDay13 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StimulationDay13', 'StimulationDay13', '`StimulationDay13`', '`StimulationDay13`', 200, 45, -1, false, '`StimulationDay13`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StimulationDay13->Sortable = true; // Allow sort
        $this->StimulationDay13->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StimulationDay13->Param, "CustomMsg");
        $this->Fields['StimulationDay13'] = &$this->StimulationDay13;

        // Tablet1
        $this->Tablet1 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Tablet1', 'Tablet1', '`Tablet1`', '`Tablet1`', 200, 45, -1, false, '`Tablet1`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Tablet1->Sortable = true; // Allow sort
        $this->Tablet1->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Tablet1->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Tablet1->Lookup = new Lookup('Tablet1', 'ivf_stimulation_tablet', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->Tablet1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Tablet1->Param, "CustomMsg");
        $this->Fields['Tablet1'] = &$this->Tablet1;

        // Tablet2
        $this->Tablet2 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Tablet2', 'Tablet2', '`Tablet2`', '`Tablet2`', 200, 45, -1, false, '`Tablet2`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Tablet2->Sortable = true; // Allow sort
        $this->Tablet2->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Tablet2->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Tablet2->Lookup = new Lookup('Tablet2', 'ivf_stimulation_tablet', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->Tablet2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Tablet2->Param, "CustomMsg");
        $this->Fields['Tablet2'] = &$this->Tablet2;

        // Tablet3
        $this->Tablet3 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Tablet3', 'Tablet3', '`Tablet3`', '`Tablet3`', 200, 45, -1, false, '`Tablet3`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Tablet3->Sortable = true; // Allow sort
        $this->Tablet3->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Tablet3->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Tablet3->Lookup = new Lookup('Tablet3', 'ivf_stimulation_tablet', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->Tablet3->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Tablet3->Param, "CustomMsg");
        $this->Fields['Tablet3'] = &$this->Tablet3;

        // Tablet4
        $this->Tablet4 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Tablet4', 'Tablet4', '`Tablet4`', '`Tablet4`', 200, 45, -1, false, '`Tablet4`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Tablet4->Sortable = true; // Allow sort
        $this->Tablet4->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Tablet4->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Tablet4->Lookup = new Lookup('Tablet4', 'ivf_stimulation_tablet', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->Tablet4->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Tablet4->Param, "CustomMsg");
        $this->Fields['Tablet4'] = &$this->Tablet4;

        // Tablet5
        $this->Tablet5 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Tablet5', 'Tablet5', '`Tablet5`', '`Tablet5`', 200, 45, -1, false, '`Tablet5`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Tablet5->Sortable = true; // Allow sort
        $this->Tablet5->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Tablet5->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Tablet5->Lookup = new Lookup('Tablet5', 'ivf_stimulation_tablet', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->Tablet5->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Tablet5->Param, "CustomMsg");
        $this->Fields['Tablet5'] = &$this->Tablet5;

        // Tablet6
        $this->Tablet6 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Tablet6', 'Tablet6', '`Tablet6`', '`Tablet6`', 200, 45, -1, false, '`Tablet6`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Tablet6->Sortable = true; // Allow sort
        $this->Tablet6->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Tablet6->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Tablet6->Lookup = new Lookup('Tablet6', 'ivf_stimulation_tablet', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->Tablet6->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Tablet6->Param, "CustomMsg");
        $this->Fields['Tablet6'] = &$this->Tablet6;

        // Tablet7
        $this->Tablet7 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Tablet7', 'Tablet7', '`Tablet7`', '`Tablet7`', 200, 45, -1, false, '`Tablet7`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Tablet7->Sortable = true; // Allow sort
        $this->Tablet7->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Tablet7->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Tablet7->Lookup = new Lookup('Tablet7', 'ivf_stimulation_tablet', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->Tablet7->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Tablet7->Param, "CustomMsg");
        $this->Fields['Tablet7'] = &$this->Tablet7;

        // Tablet8
        $this->Tablet8 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Tablet8', 'Tablet8', '`Tablet8`', '`Tablet8`', 200, 45, -1, false, '`Tablet8`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Tablet8->Sortable = true; // Allow sort
        $this->Tablet8->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Tablet8->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Tablet8->Lookup = new Lookup('Tablet8', 'ivf_stimulation_tablet', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->Tablet8->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Tablet8->Param, "CustomMsg");
        $this->Fields['Tablet8'] = &$this->Tablet8;

        // Tablet9
        $this->Tablet9 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Tablet9', 'Tablet9', '`Tablet9`', '`Tablet9`', 200, 45, -1, false, '`Tablet9`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Tablet9->Sortable = true; // Allow sort
        $this->Tablet9->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Tablet9->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Tablet9->Lookup = new Lookup('Tablet9', 'ivf_stimulation_tablet', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->Tablet9->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Tablet9->Param, "CustomMsg");
        $this->Fields['Tablet9'] = &$this->Tablet9;

        // Tablet10
        $this->Tablet10 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Tablet10', 'Tablet10', '`Tablet10`', '`Tablet10`', 200, 45, -1, false, '`Tablet10`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Tablet10->Sortable = true; // Allow sort
        $this->Tablet10->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Tablet10->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Tablet10->Lookup = new Lookup('Tablet10', 'ivf_stimulation_tablet', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->Tablet10->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Tablet10->Param, "CustomMsg");
        $this->Fields['Tablet10'] = &$this->Tablet10;

        // Tablet11
        $this->Tablet11 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Tablet11', 'Tablet11', '`Tablet11`', '`Tablet11`', 200, 45, -1, false, '`Tablet11`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Tablet11->Sortable = true; // Allow sort
        $this->Tablet11->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Tablet11->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Tablet11->Lookup = new Lookup('Tablet11', 'ivf_stimulation_tablet', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->Tablet11->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Tablet11->Param, "CustomMsg");
        $this->Fields['Tablet11'] = &$this->Tablet11;

        // Tablet12
        $this->Tablet12 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Tablet12', 'Tablet12', '`Tablet12`', '`Tablet12`', 200, 45, -1, false, '`Tablet12`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Tablet12->Sortable = true; // Allow sort
        $this->Tablet12->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Tablet12->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Tablet12->Lookup = new Lookup('Tablet12', 'ivf_stimulation_tablet', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->Tablet12->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Tablet12->Param, "CustomMsg");
        $this->Fields['Tablet12'] = &$this->Tablet12;

        // Tablet13
        $this->Tablet13 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Tablet13', 'Tablet13', '`Tablet13`', '`Tablet13`', 200, 45, -1, false, '`Tablet13`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Tablet13->Sortable = true; // Allow sort
        $this->Tablet13->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Tablet13->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Tablet13->Lookup = new Lookup('Tablet13', 'ivf_stimulation_tablet', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->Tablet13->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Tablet13->Param, "CustomMsg");
        $this->Fields['Tablet13'] = &$this->Tablet13;

        // RFSH1
        $this->RFSH1 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_RFSH1', 'RFSH1', '`RFSH1`', '`RFSH1`', 200, 45, -1, false, '`RFSH1`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->RFSH1->Sortable = true; // Allow sort
        $this->RFSH1->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->RFSH1->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->RFSH1->Lookup = new Lookup('RFSH1', 'ivf_stimulation_rfsh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->RFSH1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RFSH1->Param, "CustomMsg");
        $this->Fields['RFSH1'] = &$this->RFSH1;

        // RFSH2
        $this->RFSH2 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_RFSH2', 'RFSH2', '`RFSH2`', '`RFSH2`', 200, 45, -1, false, '`RFSH2`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->RFSH2->Sortable = true; // Allow sort
        $this->RFSH2->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->RFSH2->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->RFSH2->Lookup = new Lookup('RFSH2', 'ivf_stimulation_rfsh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->RFSH2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RFSH2->Param, "CustomMsg");
        $this->Fields['RFSH2'] = &$this->RFSH2;

        // RFSH3
        $this->RFSH3 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_RFSH3', 'RFSH3', '`RFSH3`', '`RFSH3`', 200, 45, -1, false, '`RFSH3`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->RFSH3->Sortable = true; // Allow sort
        $this->RFSH3->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->RFSH3->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->RFSH3->Lookup = new Lookup('RFSH3', 'ivf_stimulation_rfsh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->RFSH3->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RFSH3->Param, "CustomMsg");
        $this->Fields['RFSH3'] = &$this->RFSH3;

        // RFSH4
        $this->RFSH4 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_RFSH4', 'RFSH4', '`RFSH4`', '`RFSH4`', 200, 45, -1, false, '`RFSH4`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->RFSH4->Sortable = true; // Allow sort
        $this->RFSH4->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->RFSH4->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->RFSH4->Lookup = new Lookup('RFSH4', 'ivf_stimulation_rfsh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->RFSH4->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RFSH4->Param, "CustomMsg");
        $this->Fields['RFSH4'] = &$this->RFSH4;

        // RFSH5
        $this->RFSH5 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_RFSH5', 'RFSH5', '`RFSH5`', '`RFSH5`', 200, 45, -1, false, '`RFSH5`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->RFSH5->Sortable = true; // Allow sort
        $this->RFSH5->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->RFSH5->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->RFSH5->Lookup = new Lookup('RFSH5', 'ivf_stimulation_rfsh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->RFSH5->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RFSH5->Param, "CustomMsg");
        $this->Fields['RFSH5'] = &$this->RFSH5;

        // RFSH6
        $this->RFSH6 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_RFSH6', 'RFSH6', '`RFSH6`', '`RFSH6`', 200, 45, -1, false, '`RFSH6`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->RFSH6->Sortable = true; // Allow sort
        $this->RFSH6->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->RFSH6->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->RFSH6->Lookup = new Lookup('RFSH6', 'ivf_stimulation_rfsh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->RFSH6->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RFSH6->Param, "CustomMsg");
        $this->Fields['RFSH6'] = &$this->RFSH6;

        // RFSH7
        $this->RFSH7 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_RFSH7', 'RFSH7', '`RFSH7`', '`RFSH7`', 200, 45, -1, false, '`RFSH7`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->RFSH7->Sortable = true; // Allow sort
        $this->RFSH7->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->RFSH7->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->RFSH7->Lookup = new Lookup('RFSH7', 'ivf_stimulation_rfsh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->RFSH7->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RFSH7->Param, "CustomMsg");
        $this->Fields['RFSH7'] = &$this->RFSH7;

        // RFSH8
        $this->RFSH8 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_RFSH8', 'RFSH8', '`RFSH8`', '`RFSH8`', 200, 45, -1, false, '`RFSH8`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->RFSH8->Sortable = true; // Allow sort
        $this->RFSH8->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->RFSH8->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->RFSH8->Lookup = new Lookup('RFSH8', 'ivf_stimulation_rfsh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->RFSH8->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RFSH8->Param, "CustomMsg");
        $this->Fields['RFSH8'] = &$this->RFSH8;

        // RFSH9
        $this->RFSH9 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_RFSH9', 'RFSH9', '`RFSH9`', '`RFSH9`', 200, 45, -1, false, '`RFSH9`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->RFSH9->Sortable = true; // Allow sort
        $this->RFSH9->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->RFSH9->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->RFSH9->Lookup = new Lookup('RFSH9', 'ivf_stimulation_rfsh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->RFSH9->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RFSH9->Param, "CustomMsg");
        $this->Fields['RFSH9'] = &$this->RFSH9;

        // RFSH10
        $this->RFSH10 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_RFSH10', 'RFSH10', '`RFSH10`', '`RFSH10`', 200, 45, -1, false, '`RFSH10`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->RFSH10->Sortable = true; // Allow sort
        $this->RFSH10->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->RFSH10->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->RFSH10->Lookup = new Lookup('RFSH10', 'ivf_stimulation_rfsh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->RFSH10->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RFSH10->Param, "CustomMsg");
        $this->Fields['RFSH10'] = &$this->RFSH10;

        // RFSH11
        $this->RFSH11 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_RFSH11', 'RFSH11', '`RFSH11`', '`RFSH11`', 200, 45, -1, false, '`RFSH11`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->RFSH11->Sortable = true; // Allow sort
        $this->RFSH11->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->RFSH11->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->RFSH11->Lookup = new Lookup('RFSH11', 'ivf_stimulation_rfsh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->RFSH11->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RFSH11->Param, "CustomMsg");
        $this->Fields['RFSH11'] = &$this->RFSH11;

        // RFSH12
        $this->RFSH12 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_RFSH12', 'RFSH12', '`RFSH12`', '`RFSH12`', 200, 45, -1, false, '`RFSH12`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->RFSH12->Sortable = true; // Allow sort
        $this->RFSH12->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->RFSH12->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->RFSH12->Lookup = new Lookup('RFSH12', 'ivf_stimulation_rfsh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->RFSH12->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RFSH12->Param, "CustomMsg");
        $this->Fields['RFSH12'] = &$this->RFSH12;

        // RFSH13
        $this->RFSH13 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_RFSH13', 'RFSH13', '`RFSH13`', '`RFSH13`', 200, 45, -1, false, '`RFSH13`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->RFSH13->Sortable = true; // Allow sort
        $this->RFSH13->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->RFSH13->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->RFSH13->Lookup = new Lookup('RFSH13', 'ivf_stimulation_rfsh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->RFSH13->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RFSH13->Param, "CustomMsg");
        $this->Fields['RFSH13'] = &$this->RFSH13;

        // HMG1
        $this->HMG1 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_HMG1', 'HMG1', '`HMG1`', '`HMG1`', 200, 45, -1, false, '`HMG1`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->HMG1->Sortable = true; // Allow sort
        $this->HMG1->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->HMG1->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->HMG1->Lookup = new Lookup('HMG1', 'ivf_stimulation_hmg', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->HMG1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HMG1->Param, "CustomMsg");
        $this->Fields['HMG1'] = &$this->HMG1;

        // HMG2
        $this->HMG2 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_HMG2', 'HMG2', '`HMG2`', '`HMG2`', 200, 45, -1, false, '`HMG2`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->HMG2->Sortable = true; // Allow sort
        $this->HMG2->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->HMG2->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->HMG2->Lookup = new Lookup('HMG2', 'ivf_stimulation_hmg', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->HMG2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HMG2->Param, "CustomMsg");
        $this->Fields['HMG2'] = &$this->HMG2;

        // HMG3
        $this->HMG3 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_HMG3', 'HMG3', '`HMG3`', '`HMG3`', 200, 45, -1, false, '`HMG3`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->HMG3->Sortable = true; // Allow sort
        $this->HMG3->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->HMG3->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->HMG3->Lookup = new Lookup('HMG3', 'ivf_stimulation_hmg', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->HMG3->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HMG3->Param, "CustomMsg");
        $this->Fields['HMG3'] = &$this->HMG3;

        // HMG4
        $this->HMG4 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_HMG4', 'HMG4', '`HMG4`', '`HMG4`', 200, 45, -1, false, '`HMG4`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->HMG4->Sortable = true; // Allow sort
        $this->HMG4->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->HMG4->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->HMG4->Lookup = new Lookup('HMG4', 'ivf_stimulation_hmg', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->HMG4->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HMG4->Param, "CustomMsg");
        $this->Fields['HMG4'] = &$this->HMG4;

        // HMG5
        $this->HMG5 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_HMG5', 'HMG5', '`HMG5`', '`HMG5`', 200, 45, -1, false, '`HMG5`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->HMG5->Sortable = true; // Allow sort
        $this->HMG5->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->HMG5->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->HMG5->Lookup = new Lookup('HMG5', 'ivf_stimulation_hmg', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->HMG5->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HMG5->Param, "CustomMsg");
        $this->Fields['HMG5'] = &$this->HMG5;

        // HMG6
        $this->HMG6 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_HMG6', 'HMG6', '`HMG6`', '`HMG6`', 200, 45, -1, false, '`HMG6`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->HMG6->Sortable = true; // Allow sort
        $this->HMG6->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->HMG6->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->HMG6->Lookup = new Lookup('HMG6', 'ivf_stimulation_hmg', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->HMG6->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HMG6->Param, "CustomMsg");
        $this->Fields['HMG6'] = &$this->HMG6;

        // HMG7
        $this->HMG7 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_HMG7', 'HMG7', '`HMG7`', '`HMG7`', 200, 45, -1, false, '`HMG7`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->HMG7->Sortable = true; // Allow sort
        $this->HMG7->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->HMG7->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->HMG7->Lookup = new Lookup('HMG7', 'ivf_stimulation_hmg', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->HMG7->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HMG7->Param, "CustomMsg");
        $this->Fields['HMG7'] = &$this->HMG7;

        // HMG8
        $this->HMG8 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_HMG8', 'HMG8', '`HMG8`', '`HMG8`', 200, 45, -1, false, '`HMG8`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->HMG8->Sortable = true; // Allow sort
        $this->HMG8->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->HMG8->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->HMG8->Lookup = new Lookup('HMG8', 'ivf_stimulation_hmg', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->HMG8->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HMG8->Param, "CustomMsg");
        $this->Fields['HMG8'] = &$this->HMG8;

        // HMG9
        $this->HMG9 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_HMG9', 'HMG9', '`HMG9`', '`HMG9`', 200, 45, -1, false, '`HMG9`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->HMG9->Sortable = true; // Allow sort
        $this->HMG9->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->HMG9->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->HMG9->Lookup = new Lookup('HMG9', 'ivf_stimulation_hmg', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->HMG9->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HMG9->Param, "CustomMsg");
        $this->Fields['HMG9'] = &$this->HMG9;

        // HMG10
        $this->HMG10 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_HMG10', 'HMG10', '`HMG10`', '`HMG10`', 200, 45, -1, false, '`HMG10`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->HMG10->Sortable = true; // Allow sort
        $this->HMG10->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->HMG10->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->HMG10->Lookup = new Lookup('HMG10', 'ivf_stimulation_hmg', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->HMG10->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HMG10->Param, "CustomMsg");
        $this->Fields['HMG10'] = &$this->HMG10;

        // HMG11
        $this->HMG11 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_HMG11', 'HMG11', '`HMG11`', '`HMG11`', 200, 45, -1, false, '`HMG11`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->HMG11->Sortable = true; // Allow sort
        $this->HMG11->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->HMG11->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->HMG11->Lookup = new Lookup('HMG11', 'ivf_stimulation_hmg', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->HMG11->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HMG11->Param, "CustomMsg");
        $this->Fields['HMG11'] = &$this->HMG11;

        // HMG12
        $this->HMG12 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_HMG12', 'HMG12', '`HMG12`', '`HMG12`', 200, 45, -1, false, '`HMG12`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->HMG12->Sortable = true; // Allow sort
        $this->HMG12->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->HMG12->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->HMG12->Lookup = new Lookup('HMG12', 'ivf_stimulation_hmg', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->HMG12->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HMG12->Param, "CustomMsg");
        $this->Fields['HMG12'] = &$this->HMG12;

        // HMG13
        $this->HMG13 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_HMG13', 'HMG13', '`HMG13`', '`HMG13`', 200, 45, -1, false, '`HMG13`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->HMG13->Sortable = true; // Allow sort
        $this->HMG13->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->HMG13->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->HMG13->Lookup = new Lookup('HMG13', 'ivf_stimulation_hmg', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->HMG13->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HMG13->Param, "CustomMsg");
        $this->Fields['HMG13'] = &$this->HMG13;

        // GnRH1
        $this->GnRH1 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_GnRH1', 'GnRH1', '`GnRH1`', '`GnRH1`', 200, 45, -1, false, '`GnRH1`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->GnRH1->Sortable = true; // Allow sort
        $this->GnRH1->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->GnRH1->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->GnRH1->Lookup = new Lookup('GnRH1', 'ivf_stimulation_gnrh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->GnRH1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GnRH1->Param, "CustomMsg");
        $this->Fields['GnRH1'] = &$this->GnRH1;

        // GnRH2
        $this->GnRH2 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_GnRH2', 'GnRH2', '`GnRH2`', '`GnRH2`', 200, 45, -1, false, '`GnRH2`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->GnRH2->Sortable = true; // Allow sort
        $this->GnRH2->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->GnRH2->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->GnRH2->Lookup = new Lookup('GnRH2', 'ivf_stimulation_gnrh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->GnRH2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GnRH2->Param, "CustomMsg");
        $this->Fields['GnRH2'] = &$this->GnRH2;

        // GnRH3
        $this->GnRH3 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_GnRH3', 'GnRH3', '`GnRH3`', '`GnRH3`', 200, 45, -1, false, '`GnRH3`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->GnRH3->Sortable = true; // Allow sort
        $this->GnRH3->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->GnRH3->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->GnRH3->Lookup = new Lookup('GnRH3', 'ivf_stimulation_gnrh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->GnRH3->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GnRH3->Param, "CustomMsg");
        $this->Fields['GnRH3'] = &$this->GnRH3;

        // GnRH4
        $this->GnRH4 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_GnRH4', 'GnRH4', '`GnRH4`', '`GnRH4`', 200, 45, -1, false, '`GnRH4`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->GnRH4->Sortable = true; // Allow sort
        $this->GnRH4->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->GnRH4->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->GnRH4->Lookup = new Lookup('GnRH4', 'ivf_stimulation_gnrh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->GnRH4->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GnRH4->Param, "CustomMsg");
        $this->Fields['GnRH4'] = &$this->GnRH4;

        // GnRH5
        $this->GnRH5 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_GnRH5', 'GnRH5', '`GnRH5`', '`GnRH5`', 200, 45, -1, false, '`GnRH5`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->GnRH5->Sortable = true; // Allow sort
        $this->GnRH5->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->GnRH5->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->GnRH5->Lookup = new Lookup('GnRH5', 'ivf_stimulation_gnrh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->GnRH5->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GnRH5->Param, "CustomMsg");
        $this->Fields['GnRH5'] = &$this->GnRH5;

        // GnRH6
        $this->GnRH6 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_GnRH6', 'GnRH6', '`GnRH6`', '`GnRH6`', 200, 45, -1, false, '`GnRH6`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->GnRH6->Sortable = true; // Allow sort
        $this->GnRH6->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->GnRH6->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->GnRH6->Lookup = new Lookup('GnRH6', 'ivf_stimulation_gnrh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->GnRH6->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GnRH6->Param, "CustomMsg");
        $this->Fields['GnRH6'] = &$this->GnRH6;

        // GnRH7
        $this->GnRH7 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_GnRH7', 'GnRH7', '`GnRH7`', '`GnRH7`', 200, 45, -1, false, '`GnRH7`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->GnRH7->Sortable = true; // Allow sort
        $this->GnRH7->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->GnRH7->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->GnRH7->Lookup = new Lookup('GnRH7', 'ivf_stimulation_gnrh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->GnRH7->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GnRH7->Param, "CustomMsg");
        $this->Fields['GnRH7'] = &$this->GnRH7;

        // GnRH8
        $this->GnRH8 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_GnRH8', 'GnRH8', '`GnRH8`', '`GnRH8`', 200, 45, -1, false, '`GnRH8`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->GnRH8->Sortable = true; // Allow sort
        $this->GnRH8->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->GnRH8->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->GnRH8->Lookup = new Lookup('GnRH8', 'ivf_stimulation_gnrh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->GnRH8->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GnRH8->Param, "CustomMsg");
        $this->Fields['GnRH8'] = &$this->GnRH8;

        // GnRH9
        $this->GnRH9 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_GnRH9', 'GnRH9', '`GnRH9`', '`GnRH9`', 200, 45, -1, false, '`GnRH9`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->GnRH9->Sortable = true; // Allow sort
        $this->GnRH9->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->GnRH9->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->GnRH9->Lookup = new Lookup('GnRH9', 'ivf_stimulation_gnrh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->GnRH9->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GnRH9->Param, "CustomMsg");
        $this->Fields['GnRH9'] = &$this->GnRH9;

        // GnRH10
        $this->GnRH10 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_GnRH10', 'GnRH10', '`GnRH10`', '`GnRH10`', 200, 45, -1, false, '`GnRH10`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->GnRH10->Sortable = true; // Allow sort
        $this->GnRH10->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->GnRH10->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->GnRH10->Lookup = new Lookup('GnRH10', 'ivf_stimulation_gnrh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->GnRH10->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GnRH10->Param, "CustomMsg");
        $this->Fields['GnRH10'] = &$this->GnRH10;

        // GnRH11
        $this->GnRH11 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_GnRH11', 'GnRH11', '`GnRH11`', '`GnRH11`', 200, 45, -1, false, '`GnRH11`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->GnRH11->Sortable = true; // Allow sort
        $this->GnRH11->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->GnRH11->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->GnRH11->Lookup = new Lookup('GnRH11', 'ivf_stimulation_gnrh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->GnRH11->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GnRH11->Param, "CustomMsg");
        $this->Fields['GnRH11'] = &$this->GnRH11;

        // GnRH12
        $this->GnRH12 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_GnRH12', 'GnRH12', '`GnRH12`', '`GnRH12`', 200, 45, -1, false, '`GnRH12`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->GnRH12->Sortable = true; // Allow sort
        $this->GnRH12->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->GnRH12->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->GnRH12->Lookup = new Lookup('GnRH12', 'ivf_stimulation_gnrh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->GnRH12->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GnRH12->Param, "CustomMsg");
        $this->Fields['GnRH12'] = &$this->GnRH12;

        // GnRH13
        $this->GnRH13 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_GnRH13', 'GnRH13', '`GnRH13`', '`GnRH13`', 200, 45, -1, false, '`GnRH13`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->GnRH13->Sortable = true; // Allow sort
        $this->GnRH13->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->GnRH13->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->GnRH13->Lookup = new Lookup('GnRH13', 'ivf_stimulation_gnrh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->GnRH13->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GnRH13->Param, "CustomMsg");
        $this->Fields['GnRH13'] = &$this->GnRH13;

        // E21
        $this->E21 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_E21', 'E21', '`E21`', '`E21`', 200, 45, -1, false, '`E21`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->E21->Sortable = true; // Allow sort
        $this->E21->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->E21->Param, "CustomMsg");
        $this->Fields['E21'] = &$this->E21;

        // E22
        $this->E22 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_E22', 'E22', '`E22`', '`E22`', 200, 45, -1, false, '`E22`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->E22->Sortable = true; // Allow sort
        $this->E22->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->E22->Param, "CustomMsg");
        $this->Fields['E22'] = &$this->E22;

        // E23
        $this->E23 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_E23', 'E23', '`E23`', '`E23`', 200, 45, -1, false, '`E23`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->E23->Sortable = true; // Allow sort
        $this->E23->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->E23->Param, "CustomMsg");
        $this->Fields['E23'] = &$this->E23;

        // E24
        $this->E24 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_E24', 'E24', '`E24`', '`E24`', 200, 45, -1, false, '`E24`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->E24->Sortable = true; // Allow sort
        $this->E24->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->E24->Param, "CustomMsg");
        $this->Fields['E24'] = &$this->E24;

        // E25
        $this->E25 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_E25', 'E25', '`E25`', '`E25`', 200, 45, -1, false, '`E25`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->E25->Sortable = true; // Allow sort
        $this->E25->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->E25->Param, "CustomMsg");
        $this->Fields['E25'] = &$this->E25;

        // E26
        $this->E26 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_E26', 'E26', '`E26`', '`E26`', 200, 45, -1, false, '`E26`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->E26->Sortable = true; // Allow sort
        $this->E26->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->E26->Param, "CustomMsg");
        $this->Fields['E26'] = &$this->E26;

        // E27
        $this->E27 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_E27', 'E27', '`E27`', '`E27`', 200, 45, -1, false, '`E27`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->E27->Sortable = true; // Allow sort
        $this->E27->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->E27->Param, "CustomMsg");
        $this->Fields['E27'] = &$this->E27;

        // E28
        $this->E28 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_E28', 'E28', '`E28`', '`E28`', 200, 45, -1, false, '`E28`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->E28->Sortable = true; // Allow sort
        $this->E28->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->E28->Param, "CustomMsg");
        $this->Fields['E28'] = &$this->E28;

        // E29
        $this->E29 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_E29', 'E29', '`E29`', '`E29`', 200, 45, -1, false, '`E29`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->E29->Sortable = true; // Allow sort
        $this->E29->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->E29->Param, "CustomMsg");
        $this->Fields['E29'] = &$this->E29;

        // E210
        $this->E210 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_E210', 'E210', '`E210`', '`E210`', 200, 45, -1, false, '`E210`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->E210->Sortable = true; // Allow sort
        $this->E210->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->E210->Param, "CustomMsg");
        $this->Fields['E210'] = &$this->E210;

        // E211
        $this->E211 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_E211', 'E211', '`E211`', '`E211`', 200, 45, -1, false, '`E211`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->E211->Sortable = true; // Allow sort
        $this->E211->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->E211->Param, "CustomMsg");
        $this->Fields['E211'] = &$this->E211;

        // E212
        $this->E212 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_E212', 'E212', '`E212`', '`E212`', 200, 45, -1, false, '`E212`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->E212->Sortable = true; // Allow sort
        $this->E212->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->E212->Param, "CustomMsg");
        $this->Fields['E212'] = &$this->E212;

        // E213
        $this->E213 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_E213', 'E213', '`E213`', '`E213`', 200, 45, -1, false, '`E213`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->E213->Sortable = true; // Allow sort
        $this->E213->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->E213->Param, "CustomMsg");
        $this->Fields['E213'] = &$this->E213;

        // P41
        $this->P41 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_P41', 'P41', '`P41`', '`P41`', 200, 45, -1, false, '`P41`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->P41->Sortable = true; // Allow sort
        $this->P41->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->P41->Param, "CustomMsg");
        $this->Fields['P41'] = &$this->P41;

        // P42
        $this->P42 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_P42', 'P42', '`P42`', '`P42`', 200, 45, -1, false, '`P42`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->P42->Sortable = true; // Allow sort
        $this->P42->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->P42->Param, "CustomMsg");
        $this->Fields['P42'] = &$this->P42;

        // P43
        $this->P43 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_P43', 'P43', '`P43`', '`P43`', 200, 45, -1, false, '`P43`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->P43->Sortable = true; // Allow sort
        $this->P43->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->P43->Param, "CustomMsg");
        $this->Fields['P43'] = &$this->P43;

        // P44
        $this->P44 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_P44', 'P44', '`P44`', '`P44`', 200, 45, -1, false, '`P44`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->P44->Sortable = true; // Allow sort
        $this->P44->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->P44->Param, "CustomMsg");
        $this->Fields['P44'] = &$this->P44;

        // P45
        $this->P45 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_P45', 'P45', '`P45`', '`P45`', 200, 45, -1, false, '`P45`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->P45->Sortable = true; // Allow sort
        $this->P45->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->P45->Param, "CustomMsg");
        $this->Fields['P45'] = &$this->P45;

        // P46
        $this->P46 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_P46', 'P46', '`P46`', '`P46`', 200, 45, -1, false, '`P46`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->P46->Sortable = true; // Allow sort
        $this->P46->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->P46->Param, "CustomMsg");
        $this->Fields['P46'] = &$this->P46;

        // P47
        $this->P47 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_P47', 'P47', '`P47`', '`P47`', 200, 45, -1, false, '`P47`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->P47->Sortable = true; // Allow sort
        $this->P47->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->P47->Param, "CustomMsg");
        $this->Fields['P47'] = &$this->P47;

        // P48
        $this->P48 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_P48', 'P48', '`P48`', '`P48`', 200, 45, -1, false, '`P48`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->P48->Sortable = true; // Allow sort
        $this->P48->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->P48->Param, "CustomMsg");
        $this->Fields['P48'] = &$this->P48;

        // P49
        $this->P49 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_P49', 'P49', '`P49`', '`P49`', 200, 45, -1, false, '`P49`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->P49->Sortable = true; // Allow sort
        $this->P49->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->P49->Param, "CustomMsg");
        $this->Fields['P49'] = &$this->P49;

        // P410
        $this->P410 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_P410', 'P410', '`P410`', '`P410`', 200, 45, -1, false, '`P410`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->P410->Sortable = true; // Allow sort
        $this->P410->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->P410->Param, "CustomMsg");
        $this->Fields['P410'] = &$this->P410;

        // P411
        $this->P411 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_P411', 'P411', '`P411`', '`P411`', 200, 45, -1, false, '`P411`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->P411->Sortable = true; // Allow sort
        $this->P411->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->P411->Param, "CustomMsg");
        $this->Fields['P411'] = &$this->P411;

        // P412
        $this->P412 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_P412', 'P412', '`P412`', '`P412`', 200, 45, -1, false, '`P412`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->P412->Sortable = true; // Allow sort
        $this->P412->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->P412->Param, "CustomMsg");
        $this->Fields['P412'] = &$this->P412;

        // P413
        $this->P413 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_P413', 'P413', '`P413`', '`P413`', 200, 45, -1, false, '`P413`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->P413->Sortable = true; // Allow sort
        $this->P413->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->P413->Param, "CustomMsg");
        $this->Fields['P413'] = &$this->P413;

        // USGRt1
        $this->USGRt1 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGRt1', 'USGRt1', '`USGRt1`', '`USGRt1`', 200, 45, -1, false, '`USGRt1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGRt1->Sortable = true; // Allow sort
        $this->USGRt1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGRt1->Param, "CustomMsg");
        $this->Fields['USGRt1'] = &$this->USGRt1;

        // USGRt2
        $this->USGRt2 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGRt2', 'USGRt2', '`USGRt2`', '`USGRt2`', 200, 45, -1, false, '`USGRt2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGRt2->Sortable = true; // Allow sort
        $this->USGRt2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGRt2->Param, "CustomMsg");
        $this->Fields['USGRt2'] = &$this->USGRt2;

        // USGRt3
        $this->USGRt3 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGRt3', 'USGRt3', '`USGRt3`', '`USGRt3`', 200, 45, -1, false, '`USGRt3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGRt3->Sortable = true; // Allow sort
        $this->USGRt3->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGRt3->Param, "CustomMsg");
        $this->Fields['USGRt3'] = &$this->USGRt3;

        // USGRt4
        $this->USGRt4 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGRt4', 'USGRt4', '`USGRt4`', '`USGRt4`', 200, 45, -1, false, '`USGRt4`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGRt4->Sortable = true; // Allow sort
        $this->USGRt4->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGRt4->Param, "CustomMsg");
        $this->Fields['USGRt4'] = &$this->USGRt4;

        // USGRt5
        $this->USGRt5 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGRt5', 'USGRt5', '`USGRt5`', '`USGRt5`', 200, 45, -1, false, '`USGRt5`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGRt5->Sortable = true; // Allow sort
        $this->USGRt5->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGRt5->Param, "CustomMsg");
        $this->Fields['USGRt5'] = &$this->USGRt5;

        // USGRt6
        $this->USGRt6 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGRt6', 'USGRt6', '`USGRt6`', '`USGRt6`', 200, 45, -1, false, '`USGRt6`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGRt6->Sortable = true; // Allow sort
        $this->USGRt6->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGRt6->Param, "CustomMsg");
        $this->Fields['USGRt6'] = &$this->USGRt6;

        // USGRt7
        $this->USGRt7 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGRt7', 'USGRt7', '`USGRt7`', '`USGRt7`', 200, 45, -1, false, '`USGRt7`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGRt7->Sortable = true; // Allow sort
        $this->USGRt7->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGRt7->Param, "CustomMsg");
        $this->Fields['USGRt7'] = &$this->USGRt7;

        // USGRt8
        $this->USGRt8 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGRt8', 'USGRt8', '`USGRt8`', '`USGRt8`', 200, 45, -1, false, '`USGRt8`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGRt8->Sortable = true; // Allow sort
        $this->USGRt8->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGRt8->Param, "CustomMsg");
        $this->Fields['USGRt8'] = &$this->USGRt8;

        // USGRt9
        $this->USGRt9 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGRt9', 'USGRt9', '`USGRt9`', '`USGRt9`', 200, 45, -1, false, '`USGRt9`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGRt9->Sortable = true; // Allow sort
        $this->USGRt9->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGRt9->Param, "CustomMsg");
        $this->Fields['USGRt9'] = &$this->USGRt9;

        // USGRt10
        $this->USGRt10 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGRt10', 'USGRt10', '`USGRt10`', '`USGRt10`', 200, 45, -1, false, '`USGRt10`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGRt10->Sortable = true; // Allow sort
        $this->USGRt10->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGRt10->Param, "CustomMsg");
        $this->Fields['USGRt10'] = &$this->USGRt10;

        // USGRt11
        $this->USGRt11 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGRt11', 'USGRt11', '`USGRt11`', '`USGRt11`', 200, 45, -1, false, '`USGRt11`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGRt11->Sortable = true; // Allow sort
        $this->USGRt11->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGRt11->Param, "CustomMsg");
        $this->Fields['USGRt11'] = &$this->USGRt11;

        // USGRt12
        $this->USGRt12 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGRt12', 'USGRt12', '`USGRt12`', '`USGRt12`', 200, 45, -1, false, '`USGRt12`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGRt12->Sortable = true; // Allow sort
        $this->USGRt12->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGRt12->Param, "CustomMsg");
        $this->Fields['USGRt12'] = &$this->USGRt12;

        // USGRt13
        $this->USGRt13 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGRt13', 'USGRt13', '`USGRt13`', '`USGRt13`', 200, 45, -1, false, '`USGRt13`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGRt13->Sortable = true; // Allow sort
        $this->USGRt13->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGRt13->Param, "CustomMsg");
        $this->Fields['USGRt13'] = &$this->USGRt13;

        // USGLt1
        $this->USGLt1 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGLt1', 'USGLt1', '`USGLt1`', '`USGLt1`', 200, 45, -1, false, '`USGLt1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGLt1->Sortable = true; // Allow sort
        $this->USGLt1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGLt1->Param, "CustomMsg");
        $this->Fields['USGLt1'] = &$this->USGLt1;

        // USGLt2
        $this->USGLt2 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGLt2', 'USGLt2', '`USGLt2`', '`USGLt2`', 200, 45, -1, false, '`USGLt2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGLt2->Sortable = true; // Allow sort
        $this->USGLt2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGLt2->Param, "CustomMsg");
        $this->Fields['USGLt2'] = &$this->USGLt2;

        // USGLt3
        $this->USGLt3 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGLt3', 'USGLt3', '`USGLt3`', '`USGLt3`', 200, 45, -1, false, '`USGLt3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGLt3->Sortable = true; // Allow sort
        $this->USGLt3->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGLt3->Param, "CustomMsg");
        $this->Fields['USGLt3'] = &$this->USGLt3;

        // USGLt4
        $this->USGLt4 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGLt4', 'USGLt4', '`USGLt4`', '`USGLt4`', 200, 45, -1, false, '`USGLt4`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGLt4->Sortable = true; // Allow sort
        $this->USGLt4->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGLt4->Param, "CustomMsg");
        $this->Fields['USGLt4'] = &$this->USGLt4;

        // USGLt5
        $this->USGLt5 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGLt5', 'USGLt5', '`USGLt5`', '`USGLt5`', 200, 45, -1, false, '`USGLt5`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGLt5->Sortable = true; // Allow sort
        $this->USGLt5->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGLt5->Param, "CustomMsg");
        $this->Fields['USGLt5'] = &$this->USGLt5;

        // USGLt6
        $this->USGLt6 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGLt6', 'USGLt6', '`USGLt6`', '`USGLt6`', 200, 45, -1, false, '`USGLt6`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGLt6->Sortable = true; // Allow sort
        $this->USGLt6->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGLt6->Param, "CustomMsg");
        $this->Fields['USGLt6'] = &$this->USGLt6;

        // USGLt7
        $this->USGLt7 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGLt7', 'USGLt7', '`USGLt7`', '`USGLt7`', 200, 45, -1, false, '`USGLt7`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGLt7->Sortable = true; // Allow sort
        $this->USGLt7->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGLt7->Param, "CustomMsg");
        $this->Fields['USGLt7'] = &$this->USGLt7;

        // USGLt8
        $this->USGLt8 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGLt8', 'USGLt8', '`USGLt8`', '`USGLt8`', 200, 45, -1, false, '`USGLt8`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGLt8->Sortable = true; // Allow sort
        $this->USGLt8->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGLt8->Param, "CustomMsg");
        $this->Fields['USGLt8'] = &$this->USGLt8;

        // USGLt9
        $this->USGLt9 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGLt9', 'USGLt9', '`USGLt9`', '`USGLt9`', 200, 45, -1, false, '`USGLt9`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGLt9->Sortable = true; // Allow sort
        $this->USGLt9->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGLt9->Param, "CustomMsg");
        $this->Fields['USGLt9'] = &$this->USGLt9;

        // USGLt10
        $this->USGLt10 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGLt10', 'USGLt10', '`USGLt10`', '`USGLt10`', 200, 45, -1, false, '`USGLt10`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGLt10->Sortable = true; // Allow sort
        $this->USGLt10->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGLt10->Param, "CustomMsg");
        $this->Fields['USGLt10'] = &$this->USGLt10;

        // USGLt11
        $this->USGLt11 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGLt11', 'USGLt11', '`USGLt11`', '`USGLt11`', 200, 45, -1, false, '`USGLt11`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGLt11->Sortable = true; // Allow sort
        $this->USGLt11->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGLt11->Param, "CustomMsg");
        $this->Fields['USGLt11'] = &$this->USGLt11;

        // USGLt12
        $this->USGLt12 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGLt12', 'USGLt12', '`USGLt12`', '`USGLt12`', 200, 45, -1, false, '`USGLt12`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGLt12->Sortable = true; // Allow sort
        $this->USGLt12->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGLt12->Param, "CustomMsg");
        $this->Fields['USGLt12'] = &$this->USGLt12;

        // USGLt13
        $this->USGLt13 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGLt13', 'USGLt13', '`USGLt13`', '`USGLt13`', 200, 45, -1, false, '`USGLt13`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGLt13->Sortable = true; // Allow sort
        $this->USGLt13->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGLt13->Param, "CustomMsg");
        $this->Fields['USGLt13'] = &$this->USGLt13;

        // EM1
        $this->EM1 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_EM1', 'EM1', '`EM1`', '`EM1`', 200, 45, -1, false, '`EM1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EM1->Sortable = true; // Allow sort
        $this->EM1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EM1->Param, "CustomMsg");
        $this->Fields['EM1'] = &$this->EM1;

        // EM2
        $this->EM2 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_EM2', 'EM2', '`EM2`', '`EM2`', 200, 45, -1, false, '`EM2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EM2->Sortable = true; // Allow sort
        $this->EM2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EM2->Param, "CustomMsg");
        $this->Fields['EM2'] = &$this->EM2;

        // EM3
        $this->EM3 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_EM3', 'EM3', '`EM3`', '`EM3`', 200, 45, -1, false, '`EM3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EM3->Sortable = true; // Allow sort
        $this->EM3->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EM3->Param, "CustomMsg");
        $this->Fields['EM3'] = &$this->EM3;

        // EM4
        $this->EM4 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_EM4', 'EM4', '`EM4`', '`EM4`', 200, 45, -1, false, '`EM4`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EM4->Sortable = true; // Allow sort
        $this->EM4->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EM4->Param, "CustomMsg");
        $this->Fields['EM4'] = &$this->EM4;

        // EM5
        $this->EM5 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_EM5', 'EM5', '`EM5`', '`EM5`', 200, 45, -1, false, '`EM5`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EM5->Sortable = true; // Allow sort
        $this->EM5->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EM5->Param, "CustomMsg");
        $this->Fields['EM5'] = &$this->EM5;

        // EM6
        $this->EM6 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_EM6', 'EM6', '`EM6`', '`EM6`', 200, 45, -1, false, '`EM6`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EM6->Sortable = true; // Allow sort
        $this->EM6->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EM6->Param, "CustomMsg");
        $this->Fields['EM6'] = &$this->EM6;

        // EM7
        $this->EM7 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_EM7', 'EM7', '`EM7`', '`EM7`', 200, 45, -1, false, '`EM7`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EM7->Sortable = true; // Allow sort
        $this->EM7->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EM7->Param, "CustomMsg");
        $this->Fields['EM7'] = &$this->EM7;

        // EM8
        $this->EM8 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_EM8', 'EM8', '`EM8`', '`EM8`', 200, 45, -1, false, '`EM8`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EM8->Sortable = true; // Allow sort
        $this->EM8->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EM8->Param, "CustomMsg");
        $this->Fields['EM8'] = &$this->EM8;

        // EM9
        $this->EM9 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_EM9', 'EM9', '`EM9`', '`EM9`', 200, 45, -1, false, '`EM9`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EM9->Sortable = true; // Allow sort
        $this->EM9->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EM9->Param, "CustomMsg");
        $this->Fields['EM9'] = &$this->EM9;

        // EM10
        $this->EM10 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_EM10', 'EM10', '`EM10`', '`EM10`', 200, 45, -1, false, '`EM10`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EM10->Sortable = true; // Allow sort
        $this->EM10->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EM10->Param, "CustomMsg");
        $this->Fields['EM10'] = &$this->EM10;

        // EM11
        $this->EM11 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_EM11', 'EM11', '`EM11`', '`EM11`', 200, 45, -1, false, '`EM11`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EM11->Sortable = true; // Allow sort
        $this->EM11->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EM11->Param, "CustomMsg");
        $this->Fields['EM11'] = &$this->EM11;

        // EM12
        $this->EM12 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_EM12', 'EM12', '`EM12`', '`EM12`', 200, 45, -1, false, '`EM12`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EM12->Sortable = true; // Allow sort
        $this->EM12->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EM12->Param, "CustomMsg");
        $this->Fields['EM12'] = &$this->EM12;

        // EM13
        $this->EM13 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_EM13', 'EM13', '`EM13`', '`EM13`', 200, 45, -1, false, '`EM13`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EM13->Sortable = true; // Allow sort
        $this->EM13->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EM13->Param, "CustomMsg");
        $this->Fields['EM13'] = &$this->EM13;

        // Others1
        $this->Others1 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Others1', 'Others1', '`Others1`', '`Others1`', 200, 45, -1, false, '`Others1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Others1->Sortable = true; // Allow sort
        $this->Others1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Others1->Param, "CustomMsg");
        $this->Fields['Others1'] = &$this->Others1;

        // Others2
        $this->Others2 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Others2', 'Others2', '`Others2`', '`Others2`', 200, 45, -1, false, '`Others2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Others2->Sortable = true; // Allow sort
        $this->Others2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Others2->Param, "CustomMsg");
        $this->Fields['Others2'] = &$this->Others2;

        // Others3
        $this->Others3 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Others3', 'Others3', '`Others3`', '`Others3`', 200, 45, -1, false, '`Others3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Others3->Sortable = true; // Allow sort
        $this->Others3->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Others3->Param, "CustomMsg");
        $this->Fields['Others3'] = &$this->Others3;

        // Others4
        $this->Others4 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Others4', 'Others4', '`Others4`', '`Others4`', 200, 45, -1, false, '`Others4`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Others4->Sortable = true; // Allow sort
        $this->Others4->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Others4->Param, "CustomMsg");
        $this->Fields['Others4'] = &$this->Others4;

        // Others5
        $this->Others5 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Others5', 'Others5', '`Others5`', '`Others5`', 200, 45, -1, false, '`Others5`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Others5->Sortable = true; // Allow sort
        $this->Others5->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Others5->Param, "CustomMsg");
        $this->Fields['Others5'] = &$this->Others5;

        // Others6
        $this->Others6 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Others6', 'Others6', '`Others6`', '`Others6`', 200, 45, -1, false, '`Others6`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Others6->Sortable = true; // Allow sort
        $this->Others6->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Others6->Param, "CustomMsg");
        $this->Fields['Others6'] = &$this->Others6;

        // Others7
        $this->Others7 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Others7', 'Others7', '`Others7`', '`Others7`', 200, 45, -1, false, '`Others7`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Others7->Sortable = true; // Allow sort
        $this->Others7->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Others7->Param, "CustomMsg");
        $this->Fields['Others7'] = &$this->Others7;

        // Others8
        $this->Others8 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Others8', 'Others8', '`Others8`', '`Others8`', 200, 45, -1, false, '`Others8`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Others8->Sortable = true; // Allow sort
        $this->Others8->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Others8->Param, "CustomMsg");
        $this->Fields['Others8'] = &$this->Others8;

        // Others9
        $this->Others9 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Others9', 'Others9', '`Others9`', '`Others9`', 200, 45, -1, false, '`Others9`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Others9->Sortable = true; // Allow sort
        $this->Others9->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Others9->Param, "CustomMsg");
        $this->Fields['Others9'] = &$this->Others9;

        // Others10
        $this->Others10 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Others10', 'Others10', '`Others10`', '`Others10`', 200, 45, -1, false, '`Others10`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Others10->Sortable = true; // Allow sort
        $this->Others10->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Others10->Param, "CustomMsg");
        $this->Fields['Others10'] = &$this->Others10;

        // Others11
        $this->Others11 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Others11', 'Others11', '`Others11`', '`Others11`', 200, 45, -1, false, '`Others11`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Others11->Sortable = true; // Allow sort
        $this->Others11->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Others11->Param, "CustomMsg");
        $this->Fields['Others11'] = &$this->Others11;

        // Others12
        $this->Others12 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Others12', 'Others12', '`Others12`', '`Others12`', 200, 45, -1, false, '`Others12`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Others12->Sortable = true; // Allow sort
        $this->Others12->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Others12->Param, "CustomMsg");
        $this->Fields['Others12'] = &$this->Others12;

        // Others13
        $this->Others13 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Others13', 'Others13', '`Others13`', '`Others13`', 200, 45, -1, false, '`Others13`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Others13->Sortable = true; // Allow sort
        $this->Others13->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Others13->Param, "CustomMsg");
        $this->Fields['Others13'] = &$this->Others13;

        // DR1
        $this->DR1 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DR1', 'DR1', '`DR1`', '`DR1`', 200, 45, -1, false, '`DR1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DR1->Sortable = true; // Allow sort
        $this->DR1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DR1->Param, "CustomMsg");
        $this->Fields['DR1'] = &$this->DR1;

        // DR2
        $this->DR2 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DR2', 'DR2', '`DR2`', '`DR2`', 200, 45, -1, false, '`DR2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DR2->Sortable = true; // Allow sort
        $this->DR2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DR2->Param, "CustomMsg");
        $this->Fields['DR2'] = &$this->DR2;

        // DR3
        $this->DR3 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DR3', 'DR3', '`DR3`', '`DR3`', 200, 45, -1, false, '`DR3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DR3->Sortable = true; // Allow sort
        $this->DR3->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DR3->Param, "CustomMsg");
        $this->Fields['DR3'] = &$this->DR3;

        // DR4
        $this->DR4 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DR4', 'DR4', '`DR4`', '`DR4`', 200, 45, -1, false, '`DR4`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DR4->Sortable = true; // Allow sort
        $this->DR4->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DR4->Param, "CustomMsg");
        $this->Fields['DR4'] = &$this->DR4;

        // DR5
        $this->DR5 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DR5', 'DR5', '`DR5`', '`DR5`', 200, 45, -1, false, '`DR5`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DR5->Sortable = true; // Allow sort
        $this->DR5->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DR5->Param, "CustomMsg");
        $this->Fields['DR5'] = &$this->DR5;

        // DR6
        $this->DR6 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DR6', 'DR6', '`DR6`', '`DR6`', 200, 45, -1, false, '`DR6`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DR6->Sortable = true; // Allow sort
        $this->DR6->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DR6->Param, "CustomMsg");
        $this->Fields['DR6'] = &$this->DR6;

        // DR7
        $this->DR7 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DR7', 'DR7', '`DR7`', '`DR7`', 200, 45, -1, false, '`DR7`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DR7->Sortable = true; // Allow sort
        $this->DR7->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DR7->Param, "CustomMsg");
        $this->Fields['DR7'] = &$this->DR7;

        // DR8
        $this->DR8 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DR8', 'DR8', '`DR8`', '`DR8`', 200, 45, -1, false, '`DR8`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DR8->Sortable = true; // Allow sort
        $this->DR8->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DR8->Param, "CustomMsg");
        $this->Fields['DR8'] = &$this->DR8;

        // DR9
        $this->DR9 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DR9', 'DR9', '`DR9`', '`DR9`', 200, 45, -1, false, '`DR9`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DR9->Sortable = true; // Allow sort
        $this->DR9->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DR9->Param, "CustomMsg");
        $this->Fields['DR9'] = &$this->DR9;

        // DR10
        $this->DR10 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DR10', 'DR10', '`DR10`', '`DR10`', 200, 45, -1, false, '`DR10`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DR10->Sortable = true; // Allow sort
        $this->DR10->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DR10->Param, "CustomMsg");
        $this->Fields['DR10'] = &$this->DR10;

        // DR11
        $this->DR11 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DR11', 'DR11', '`DR11`', '`DR11`', 200, 45, -1, false, '`DR11`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DR11->Sortable = true; // Allow sort
        $this->DR11->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DR11->Param, "CustomMsg");
        $this->Fields['DR11'] = &$this->DR11;

        // DR12
        $this->DR12 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DR12', 'DR12', '`DR12`', '`DR12`', 200, 45, -1, false, '`DR12`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DR12->Sortable = true; // Allow sort
        $this->DR12->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DR12->Param, "CustomMsg");
        $this->Fields['DR12'] = &$this->DR12;

        // DR13
        $this->DR13 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DR13', 'DR13', '`DR13`', '`DR13`', 200, 45, -1, false, '`DR13`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DR13->Sortable = true; // Allow sort
        $this->DR13->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DR13->Param, "CustomMsg");
        $this->Fields['DR13'] = &$this->DR13;

        // DOCTORRESPONSIBLE
        $this->DOCTORRESPONSIBLE = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DOCTORRESPONSIBLE', 'DOCTORRESPONSIBLE', '`DOCTORRESPONSIBLE`', '`DOCTORRESPONSIBLE`', 201, 65535, -1, false, '`DOCTORRESPONSIBLE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DOCTORRESPONSIBLE->Sortable = true; // Allow sort
        $this->DOCTORRESPONSIBLE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DOCTORRESPONSIBLE->Param, "CustomMsg");
        $this->Fields['DOCTORRESPONSIBLE'] = &$this->DOCTORRESPONSIBLE;

        // TidNo
        $this->TidNo = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_TidNo', 'TidNo', '`TidNo`', '`TidNo`', 3, 11, -1, false, '`TidNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TidNo->IsForeignKey = true; // Foreign key field
        $this->TidNo->Sortable = true; // Allow sort
        $this->TidNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->TidNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TidNo->Param, "CustomMsg");
        $this->Fields['TidNo'] = &$this->TidNo;

        // Convert
        $this->Convert = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Convert', 'Convert', '`Convert`', '`Convert`', 200, 45, -1, false, '`Convert`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->Convert->Sortable = true; // Allow sort
        $this->Convert->Lookup = new Lookup('Convert', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Convert->OptionCount = 2;
        $this->Convert->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Convert->Param, "CustomMsg");
        $this->Fields['Convert'] = &$this->Convert;

        // Consultant
        $this->Consultant = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Consultant', 'Consultant', '`Consultant`', '`Consultant`', 200, 45, -1, false, '`Consultant`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Consultant->Sortable = true; // Allow sort
        $this->Consultant->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Consultant->Param, "CustomMsg");
        $this->Fields['Consultant'] = &$this->Consultant;

        // InseminatinTechnique
        $this->InseminatinTechnique = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_InseminatinTechnique', 'InseminatinTechnique', '`InseminatinTechnique`', '`InseminatinTechnique`', 200, 45, -1, false, '`InseminatinTechnique`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->InseminatinTechnique->Sortable = true; // Allow sort
        $this->InseminatinTechnique->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->InseminatinTechnique->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->InseminatinTechnique->Lookup = new Lookup('InseminatinTechnique', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->InseminatinTechnique->OptionCount = 2;
        $this->InseminatinTechnique->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->InseminatinTechnique->Param, "CustomMsg");
        $this->Fields['InseminatinTechnique'] = &$this->InseminatinTechnique;

        // IndicationForART
        $this->IndicationForART = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_IndicationForART', 'IndicationForART', '`IndicationForART`', '`IndicationForART`', 200, 45, -1, false, '`IndicationForART`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->IndicationForART->Sortable = true; // Allow sort
        $this->IndicationForART->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->IndicationForART->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->IndicationForART->Lookup = new Lookup('IndicationForART', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->IndicationForART->OptionCount = 3;
        $this->IndicationForART->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IndicationForART->Param, "CustomMsg");
        $this->Fields['IndicationForART'] = &$this->IndicationForART;

        // Hysteroscopy
        $this->Hysteroscopy = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Hysteroscopy', 'Hysteroscopy', '`Hysteroscopy`', '`Hysteroscopy`', 200, 45, -1, false, '`Hysteroscopy`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Hysteroscopy->Sortable = true; // Allow sort
        $this->Hysteroscopy->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Hysteroscopy->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Hysteroscopy->Lookup = new Lookup('Hysteroscopy', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Hysteroscopy->OptionCount = 2;
        $this->Hysteroscopy->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Hysteroscopy->Param, "CustomMsg");
        $this->Fields['Hysteroscopy'] = &$this->Hysteroscopy;

        // EndometrialScratching
        $this->EndometrialScratching = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_EndometrialScratching', 'EndometrialScratching', '`EndometrialScratching`', '`EndometrialScratching`', 200, 45, -1, false, '`EndometrialScratching`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->EndometrialScratching->Sortable = true; // Allow sort
        $this->EndometrialScratching->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->EndometrialScratching->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->EndometrialScratching->Lookup = new Lookup('EndometrialScratching', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->EndometrialScratching->OptionCount = 2;
        $this->EndometrialScratching->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EndometrialScratching->Param, "CustomMsg");
        $this->Fields['EndometrialScratching'] = &$this->EndometrialScratching;

        // TrialCannulation
        $this->TrialCannulation = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_TrialCannulation', 'TrialCannulation', '`TrialCannulation`', '`TrialCannulation`', 200, 45, -1, false, '`TrialCannulation`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->TrialCannulation->Sortable = true; // Allow sort
        $this->TrialCannulation->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->TrialCannulation->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->TrialCannulation->Lookup = new Lookup('TrialCannulation', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->TrialCannulation->OptionCount = 2;
        $this->TrialCannulation->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TrialCannulation->Param, "CustomMsg");
        $this->Fields['TrialCannulation'] = &$this->TrialCannulation;

        // CYCLETYPE
        $this->CYCLETYPE = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_CYCLETYPE', 'CYCLETYPE', '`CYCLETYPE`', '`CYCLETYPE`', 200, 45, -1, false, '`CYCLETYPE`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->CYCLETYPE->Sortable = true; // Allow sort
        $this->CYCLETYPE->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->CYCLETYPE->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->CYCLETYPE->Lookup = new Lookup('CYCLETYPE', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->CYCLETYPE->OptionCount = 3;
        $this->CYCLETYPE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CYCLETYPE->Param, "CustomMsg");
        $this->Fields['CYCLETYPE'] = &$this->CYCLETYPE;

        // HRTCYCLE
        $this->HRTCYCLE = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_HRTCYCLE', 'HRTCYCLE', '`HRTCYCLE`', '`HRTCYCLE`', 200, 45, -1, false, '`HRTCYCLE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HRTCYCLE->Sortable = true; // Allow sort
        $this->HRTCYCLE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HRTCYCLE->Param, "CustomMsg");
        $this->Fields['HRTCYCLE'] = &$this->HRTCYCLE;

        // OralEstrogenDosage
        $this->OralEstrogenDosage = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_OralEstrogenDosage', 'OralEstrogenDosage', '`OralEstrogenDosage`', '`OralEstrogenDosage`', 200, 45, -1, false, '`OralEstrogenDosage`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->OralEstrogenDosage->Sortable = true; // Allow sort
        $this->OralEstrogenDosage->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->OralEstrogenDosage->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->OralEstrogenDosage->Lookup = new Lookup('OralEstrogenDosage', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->OralEstrogenDosage->OptionCount = 5;
        $this->OralEstrogenDosage->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OralEstrogenDosage->Param, "CustomMsg");
        $this->Fields['OralEstrogenDosage'] = &$this->OralEstrogenDosage;

        // VaginalEstrogen
        $this->VaginalEstrogen = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_VaginalEstrogen', 'VaginalEstrogen', '`VaginalEstrogen`', '`VaginalEstrogen`', 200, 45, -1, false, '`VaginalEstrogen`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->VaginalEstrogen->Sortable = true; // Allow sort
        $this->VaginalEstrogen->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->VaginalEstrogen->Param, "CustomMsg");
        $this->Fields['VaginalEstrogen'] = &$this->VaginalEstrogen;

        // GCSF
        $this->GCSF = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_GCSF', 'GCSF', '`GCSF`', '`GCSF`', 200, 45, -1, false, '`GCSF`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->GCSF->Sortable = true; // Allow sort
        $this->GCSF->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->GCSF->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->GCSF->Lookup = new Lookup('GCSF', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->GCSF->OptionCount = 2;
        $this->GCSF->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GCSF->Param, "CustomMsg");
        $this->Fields['GCSF'] = &$this->GCSF;

        // ActivatedPRP
        $this->ActivatedPRP = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_ActivatedPRP', 'ActivatedPRP', '`ActivatedPRP`', '`ActivatedPRP`', 200, 45, -1, false, '`ActivatedPRP`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->ActivatedPRP->Sortable = true; // Allow sort
        $this->ActivatedPRP->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->ActivatedPRP->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->ActivatedPRP->Lookup = new Lookup('ActivatedPRP', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->ActivatedPRP->OptionCount = 2;
        $this->ActivatedPRP->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ActivatedPRP->Param, "CustomMsg");
        $this->Fields['ActivatedPRP'] = &$this->ActivatedPRP;

        // UCLcm
        $this->UCLcm = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_UCLcm', 'UCLcm', '`UCLcm`', '`UCLcm`', 200, 45, -1, false, '`UCLcm`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->UCLcm->Sortable = true; // Allow sort
        $this->UCLcm->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->UCLcm->Param, "CustomMsg");
        $this->Fields['UCLcm'] = &$this->UCLcm;

        // DATOFEMBRYOTRANSFER
        $this->DATOFEMBRYOTRANSFER = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DATOFEMBRYOTRANSFER', 'DATOFEMBRYOTRANSFER', '`DATOFEMBRYOTRANSFER`', CastDateFieldForLike("`DATOFEMBRYOTRANSFER`", 0, "DB"), 135, 19, -1, false, '`DATOFEMBRYOTRANSFER`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DATOFEMBRYOTRANSFER->Sortable = true; // Allow sort
        $this->DATOFEMBRYOTRANSFER->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DATOFEMBRYOTRANSFER->Param, "CustomMsg");
        $this->Fields['DATOFEMBRYOTRANSFER'] = &$this->DATOFEMBRYOTRANSFER;

        // DAYOFEMBRYOTRANSFER
        $this->DAYOFEMBRYOTRANSFER = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DAYOFEMBRYOTRANSFER', 'DAYOFEMBRYOTRANSFER', '`DAYOFEMBRYOTRANSFER`', '`DAYOFEMBRYOTRANSFER`', 200, 45, -1, false, '`DAYOFEMBRYOTRANSFER`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DAYOFEMBRYOTRANSFER->Sortable = true; // Allow sort
        $this->DAYOFEMBRYOTRANSFER->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DAYOFEMBRYOTRANSFER->Param, "CustomMsg");
        $this->Fields['DAYOFEMBRYOTRANSFER'] = &$this->DAYOFEMBRYOTRANSFER;

        // NOOFEMBRYOSTHAWED
        $this->NOOFEMBRYOSTHAWED = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_NOOFEMBRYOSTHAWED', 'NOOFEMBRYOSTHAWED', '`NOOFEMBRYOSTHAWED`', '`NOOFEMBRYOSTHAWED`', 200, 45, -1, false, '`NOOFEMBRYOSTHAWED`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NOOFEMBRYOSTHAWED->Sortable = true; // Allow sort
        $this->NOOFEMBRYOSTHAWED->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->NOOFEMBRYOSTHAWED->Param, "CustomMsg");
        $this->Fields['NOOFEMBRYOSTHAWED'] = &$this->NOOFEMBRYOSTHAWED;

        // NOOFEMBRYOSTRANSFERRED
        $this->NOOFEMBRYOSTRANSFERRED = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_NOOFEMBRYOSTRANSFERRED', 'NOOFEMBRYOSTRANSFERRED', '`NOOFEMBRYOSTRANSFERRED`', '`NOOFEMBRYOSTRANSFERRED`', 200, 45, -1, false, '`NOOFEMBRYOSTRANSFERRED`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NOOFEMBRYOSTRANSFERRED->Sortable = true; // Allow sort
        $this->NOOFEMBRYOSTRANSFERRED->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->NOOFEMBRYOSTRANSFERRED->Param, "CustomMsg");
        $this->Fields['NOOFEMBRYOSTRANSFERRED'] = &$this->NOOFEMBRYOSTRANSFERRED;

        // DAYOFEMBRYOS
        $this->DAYOFEMBRYOS = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DAYOFEMBRYOS', 'DAYOFEMBRYOS', '`DAYOFEMBRYOS`', '`DAYOFEMBRYOS`', 200, 45, -1, false, '`DAYOFEMBRYOS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DAYOFEMBRYOS->Sortable = true; // Allow sort
        $this->DAYOFEMBRYOS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DAYOFEMBRYOS->Param, "CustomMsg");
        $this->Fields['DAYOFEMBRYOS'] = &$this->DAYOFEMBRYOS;

        // CRYOPRESERVEDEMBRYOS
        $this->CRYOPRESERVEDEMBRYOS = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_CRYOPRESERVEDEMBRYOS', 'CRYOPRESERVEDEMBRYOS', '`CRYOPRESERVEDEMBRYOS`', '`CRYOPRESERVEDEMBRYOS`', 200, 45, -1, false, '`CRYOPRESERVEDEMBRYOS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CRYOPRESERVEDEMBRYOS->Sortable = true; // Allow sort
        $this->CRYOPRESERVEDEMBRYOS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CRYOPRESERVEDEMBRYOS->Param, "CustomMsg");
        $this->Fields['CRYOPRESERVEDEMBRYOS'] = &$this->CRYOPRESERVEDEMBRYOS;

        // ViaAdmin
        $this->ViaAdmin = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_ViaAdmin', 'ViaAdmin', '`ViaAdmin`', '`ViaAdmin`', 200, 45, -1, false, '`ViaAdmin`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ViaAdmin->Sortable = true; // Allow sort
        $this->ViaAdmin->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ViaAdmin->Param, "CustomMsg");
        $this->Fields['ViaAdmin'] = &$this->ViaAdmin;

        // ViaStartDateTime
        $this->ViaStartDateTime = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_ViaStartDateTime', 'ViaStartDateTime', '`ViaStartDateTime`', CastDateFieldForLike("`ViaStartDateTime`", 0, "DB"), 135, 19, 0, false, '`ViaStartDateTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ViaStartDateTime->Sortable = true; // Allow sort
        $this->ViaStartDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->ViaStartDateTime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ViaStartDateTime->Param, "CustomMsg");
        $this->Fields['ViaStartDateTime'] = &$this->ViaStartDateTime;

        // ViaDose
        $this->ViaDose = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_ViaDose', 'ViaDose', '`ViaDose`', '`ViaDose`', 200, 45, -1, false, '`ViaDose`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ViaDose->Sortable = true; // Allow sort
        $this->ViaDose->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ViaDose->Param, "CustomMsg");
        $this->Fields['ViaDose'] = &$this->ViaDose;

        // AllFreeze
        $this->AllFreeze = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_AllFreeze', 'AllFreeze', '`AllFreeze`', '`AllFreeze`', 200, 45, -1, false, '`AllFreeze`', false, false, false, 'FORMATTED TEXT', 'RADIO');
        $this->AllFreeze->Sortable = true; // Allow sort
        $this->AllFreeze->Lookup = new Lookup('AllFreeze', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->AllFreeze->OptionCount = 2;
        $this->AllFreeze->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AllFreeze->Param, "CustomMsg");
        $this->Fields['AllFreeze'] = &$this->AllFreeze;

        // TreatmentCancel
        $this->TreatmentCancel = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_TreatmentCancel', 'TreatmentCancel', '`TreatmentCancel`', '`TreatmentCancel`', 200, 45, -1, false, '`TreatmentCancel`', false, false, false, 'FORMATTED TEXT', 'RADIO');
        $this->TreatmentCancel->Sortable = true; // Allow sort
        $this->TreatmentCancel->Lookup = new Lookup('TreatmentCancel', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->TreatmentCancel->OptionCount = 2;
        $this->TreatmentCancel->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TreatmentCancel->Param, "CustomMsg");
        $this->Fields['TreatmentCancel'] = &$this->TreatmentCancel;

        // Reason
        $this->Reason = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Reason', 'Reason', '`Reason`', '`Reason`', 201, 450, -1, false, '`Reason`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Reason->Sortable = true; // Allow sort
        $this->Reason->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Reason->Param, "CustomMsg");
        $this->Fields['Reason'] = &$this->Reason;

        // ProgesteroneAdmin
        $this->ProgesteroneAdmin = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_ProgesteroneAdmin', 'ProgesteroneAdmin', '`ProgesteroneAdmin`', '`ProgesteroneAdmin`', 200, 45, -1, false, '`ProgesteroneAdmin`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ProgesteroneAdmin->Sortable = true; // Allow sort
        $this->ProgesteroneAdmin->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ProgesteroneAdmin->Param, "CustomMsg");
        $this->Fields['ProgesteroneAdmin'] = &$this->ProgesteroneAdmin;

        // ProgesteroneStart
        $this->ProgesteroneStart = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_ProgesteroneStart', 'ProgesteroneStart', '`ProgesteroneStart`', '`ProgesteroneStart`', 200, 45, 11, false, '`ProgesteroneStart`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ProgesteroneStart->Sortable = true; // Allow sort
        $this->ProgesteroneStart->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ProgesteroneStart->Param, "CustomMsg");
        $this->Fields['ProgesteroneStart'] = &$this->ProgesteroneStart;

        // ProgesteroneDose
        $this->ProgesteroneDose = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_ProgesteroneDose', 'ProgesteroneDose', '`ProgesteroneDose`', '`ProgesteroneDose`', 200, 45, -1, false, '`ProgesteroneDose`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ProgesteroneDose->Sortable = true; // Allow sort
        $this->ProgesteroneDose->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ProgesteroneDose->Param, "CustomMsg");
        $this->Fields['ProgesteroneDose'] = &$this->ProgesteroneDose;

        // Projectron
        $this->Projectron = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Projectron', 'Projectron', '\'\'', '\'\'', 201, 65530, -1, false, '\'\'', false, false, false, 'FORMATTED TEXT', 'RADIO');
        $this->Projectron->IsCustom = true; // Custom field
        $this->Projectron->Sortable = true; // Allow sort
        $this->Projectron->Lookup = new Lookup('Projectron', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Projectron->OptionCount = 2;
        $this->Projectron->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Projectron->Param, "CustomMsg");
        $this->Fields['Projectron'] = &$this->Projectron;

        // StChDate14
        $this->StChDate14 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StChDate14', 'StChDate14', '`StChDate14`', CastDateFieldForLike("`StChDate14`", 7, "DB"), 135, 19, 7, false, '`StChDate14`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StChDate14->Sortable = true; // Allow sort
        $this->StChDate14->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->StChDate14->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StChDate14->Param, "CustomMsg");
        $this->Fields['StChDate14'] = &$this->StChDate14;

        // StChDate15
        $this->StChDate15 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StChDate15', 'StChDate15', '`StChDate15`', CastDateFieldForLike("`StChDate15`", 7, "DB"), 135, 19, 7, false, '`StChDate15`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StChDate15->Sortable = true; // Allow sort
        $this->StChDate15->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->StChDate15->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StChDate15->Param, "CustomMsg");
        $this->Fields['StChDate15'] = &$this->StChDate15;

        // StChDate16
        $this->StChDate16 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StChDate16', 'StChDate16', '`StChDate16`', CastDateFieldForLike("`StChDate16`", 7, "DB"), 135, 19, 7, false, '`StChDate16`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StChDate16->Sortable = true; // Allow sort
        $this->StChDate16->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->StChDate16->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StChDate16->Param, "CustomMsg");
        $this->Fields['StChDate16'] = &$this->StChDate16;

        // StChDate17
        $this->StChDate17 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StChDate17', 'StChDate17', '`StChDate17`', CastDateFieldForLike("`StChDate17`", 7, "DB"), 135, 19, 7, false, '`StChDate17`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StChDate17->Sortable = true; // Allow sort
        $this->StChDate17->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->StChDate17->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StChDate17->Param, "CustomMsg");
        $this->Fields['StChDate17'] = &$this->StChDate17;

        // StChDate18
        $this->StChDate18 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StChDate18', 'StChDate18', '`StChDate18`', CastDateFieldForLike("`StChDate18`", 7, "DB"), 135, 19, 7, false, '`StChDate18`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StChDate18->Sortable = true; // Allow sort
        $this->StChDate18->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->StChDate18->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StChDate18->Param, "CustomMsg");
        $this->Fields['StChDate18'] = &$this->StChDate18;

        // StChDate19
        $this->StChDate19 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StChDate19', 'StChDate19', '`StChDate19`', CastDateFieldForLike("`StChDate19`", 7, "DB"), 135, 19, 7, false, '`StChDate19`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StChDate19->Sortable = true; // Allow sort
        $this->StChDate19->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->StChDate19->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StChDate19->Param, "CustomMsg");
        $this->Fields['StChDate19'] = &$this->StChDate19;

        // StChDate20
        $this->StChDate20 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StChDate20', 'StChDate20', '`StChDate20`', CastDateFieldForLike("`StChDate20`", 7, "DB"), 135, 19, 7, false, '`StChDate20`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StChDate20->Sortable = true; // Allow sort
        $this->StChDate20->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->StChDate20->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StChDate20->Param, "CustomMsg");
        $this->Fields['StChDate20'] = &$this->StChDate20;

        // StChDate21
        $this->StChDate21 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StChDate21', 'StChDate21', '`StChDate21`', CastDateFieldForLike("`StChDate21`", 7, "DB"), 135, 19, 7, false, '`StChDate21`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StChDate21->Sortable = true; // Allow sort
        $this->StChDate21->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->StChDate21->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StChDate21->Param, "CustomMsg");
        $this->Fields['StChDate21'] = &$this->StChDate21;

        // StChDate22
        $this->StChDate22 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StChDate22', 'StChDate22', '`StChDate22`', CastDateFieldForLike("`StChDate22`", 7, "DB"), 135, 19, 7, false, '`StChDate22`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StChDate22->Sortable = true; // Allow sort
        $this->StChDate22->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->StChDate22->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StChDate22->Param, "CustomMsg");
        $this->Fields['StChDate22'] = &$this->StChDate22;

        // StChDate23
        $this->StChDate23 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StChDate23', 'StChDate23', '`StChDate23`', CastDateFieldForLike("`StChDate23`", 7, "DB"), 135, 19, 7, false, '`StChDate23`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StChDate23->Sortable = true; // Allow sort
        $this->StChDate23->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->StChDate23->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StChDate23->Param, "CustomMsg");
        $this->Fields['StChDate23'] = &$this->StChDate23;

        // StChDate24
        $this->StChDate24 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StChDate24', 'StChDate24', '`StChDate24`', CastDateFieldForLike("`StChDate24`", 7, "DB"), 135, 19, 7, false, '`StChDate24`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StChDate24->Sortable = true; // Allow sort
        $this->StChDate24->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->StChDate24->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StChDate24->Param, "CustomMsg");
        $this->Fields['StChDate24'] = &$this->StChDate24;

        // StChDate25
        $this->StChDate25 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StChDate25', 'StChDate25', '`StChDate25`', CastDateFieldForLike("`StChDate25`", 7, "DB"), 135, 19, 7, false, '`StChDate25`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StChDate25->Sortable = true; // Allow sort
        $this->StChDate25->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->StChDate25->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StChDate25->Param, "CustomMsg");
        $this->Fields['StChDate25'] = &$this->StChDate25;

        // CycleDay14
        $this->CycleDay14 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_CycleDay14', 'CycleDay14', '`CycleDay14`', '`CycleDay14`', 200, 45, -1, false, '`CycleDay14`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CycleDay14->Sortable = true; // Allow sort
        $this->CycleDay14->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CycleDay14->Param, "CustomMsg");
        $this->Fields['CycleDay14'] = &$this->CycleDay14;

        // CycleDay15
        $this->CycleDay15 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_CycleDay15', 'CycleDay15', '`CycleDay15`', '`CycleDay15`', 200, 45, -1, false, '`CycleDay15`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CycleDay15->Sortable = true; // Allow sort
        $this->CycleDay15->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CycleDay15->Param, "CustomMsg");
        $this->Fields['CycleDay15'] = &$this->CycleDay15;

        // CycleDay16
        $this->CycleDay16 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_CycleDay16', 'CycleDay16', '`CycleDay16`', '`CycleDay16`', 200, 45, -1, false, '`CycleDay16`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CycleDay16->Sortable = true; // Allow sort
        $this->CycleDay16->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CycleDay16->Param, "CustomMsg");
        $this->Fields['CycleDay16'] = &$this->CycleDay16;

        // CycleDay17
        $this->CycleDay17 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_CycleDay17', 'CycleDay17', '`CycleDay17`', '`CycleDay17`', 200, 45, -1, false, '`CycleDay17`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CycleDay17->Sortable = true; // Allow sort
        $this->CycleDay17->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CycleDay17->Param, "CustomMsg");
        $this->Fields['CycleDay17'] = &$this->CycleDay17;

        // CycleDay18
        $this->CycleDay18 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_CycleDay18', 'CycleDay18', '`CycleDay18`', '`CycleDay18`', 200, 45, -1, false, '`CycleDay18`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CycleDay18->Sortable = true; // Allow sort
        $this->CycleDay18->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CycleDay18->Param, "CustomMsg");
        $this->Fields['CycleDay18'] = &$this->CycleDay18;

        // CycleDay19
        $this->CycleDay19 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_CycleDay19', 'CycleDay19', '`CycleDay19`', '`CycleDay19`', 200, 45, -1, false, '`CycleDay19`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CycleDay19->Sortable = true; // Allow sort
        $this->CycleDay19->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CycleDay19->Param, "CustomMsg");
        $this->Fields['CycleDay19'] = &$this->CycleDay19;

        // CycleDay20
        $this->CycleDay20 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_CycleDay20', 'CycleDay20', '`CycleDay20`', '`CycleDay20`', 200, 45, -1, false, '`CycleDay20`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CycleDay20->Sortable = true; // Allow sort
        $this->CycleDay20->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CycleDay20->Param, "CustomMsg");
        $this->Fields['CycleDay20'] = &$this->CycleDay20;

        // CycleDay21
        $this->CycleDay21 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_CycleDay21', 'CycleDay21', '`CycleDay21`', '`CycleDay21`', 200, 45, -1, false, '`CycleDay21`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CycleDay21->Sortable = true; // Allow sort
        $this->CycleDay21->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CycleDay21->Param, "CustomMsg");
        $this->Fields['CycleDay21'] = &$this->CycleDay21;

        // CycleDay22
        $this->CycleDay22 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_CycleDay22', 'CycleDay22', '`CycleDay22`', '`CycleDay22`', 200, 45, -1, false, '`CycleDay22`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CycleDay22->Sortable = true; // Allow sort
        $this->CycleDay22->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CycleDay22->Param, "CustomMsg");
        $this->Fields['CycleDay22'] = &$this->CycleDay22;

        // CycleDay23
        $this->CycleDay23 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_CycleDay23', 'CycleDay23', '`CycleDay23`', '`CycleDay23`', 200, 45, -1, false, '`CycleDay23`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CycleDay23->Sortable = true; // Allow sort
        $this->CycleDay23->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CycleDay23->Param, "CustomMsg");
        $this->Fields['CycleDay23'] = &$this->CycleDay23;

        // CycleDay24
        $this->CycleDay24 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_CycleDay24', 'CycleDay24', '`CycleDay24`', '`CycleDay24`', 200, 45, -1, false, '`CycleDay24`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CycleDay24->Sortable = true; // Allow sort
        $this->CycleDay24->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CycleDay24->Param, "CustomMsg");
        $this->Fields['CycleDay24'] = &$this->CycleDay24;

        // CycleDay25
        $this->CycleDay25 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_CycleDay25', 'CycleDay25', '`CycleDay25`', '`CycleDay25`', 200, 45, -1, false, '`CycleDay25`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CycleDay25->Sortable = true; // Allow sort
        $this->CycleDay25->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CycleDay25->Param, "CustomMsg");
        $this->Fields['CycleDay25'] = &$this->CycleDay25;

        // StimulationDay14
        $this->StimulationDay14 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StimulationDay14', 'StimulationDay14', '`StimulationDay14`', '`StimulationDay14`', 200, 45, -1, false, '`StimulationDay14`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StimulationDay14->Sortable = true; // Allow sort
        $this->StimulationDay14->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StimulationDay14->Param, "CustomMsg");
        $this->Fields['StimulationDay14'] = &$this->StimulationDay14;

        // StimulationDay15
        $this->StimulationDay15 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StimulationDay15', 'StimulationDay15', '`StimulationDay15`', '`StimulationDay15`', 200, 45, -1, false, '`StimulationDay15`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StimulationDay15->Sortable = true; // Allow sort
        $this->StimulationDay15->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StimulationDay15->Param, "CustomMsg");
        $this->Fields['StimulationDay15'] = &$this->StimulationDay15;

        // StimulationDay16
        $this->StimulationDay16 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StimulationDay16', 'StimulationDay16', '`StimulationDay16`', '`StimulationDay16`', 200, 45, -1, false, '`StimulationDay16`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StimulationDay16->Sortable = true; // Allow sort
        $this->StimulationDay16->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StimulationDay16->Param, "CustomMsg");
        $this->Fields['StimulationDay16'] = &$this->StimulationDay16;

        // StimulationDay17
        $this->StimulationDay17 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StimulationDay17', 'StimulationDay17', '`StimulationDay17`', '`StimulationDay17`', 200, 45, -1, false, '`StimulationDay17`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StimulationDay17->Sortable = true; // Allow sort
        $this->StimulationDay17->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StimulationDay17->Param, "CustomMsg");
        $this->Fields['StimulationDay17'] = &$this->StimulationDay17;

        // StimulationDay18
        $this->StimulationDay18 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StimulationDay18', 'StimulationDay18', '`StimulationDay18`', '`StimulationDay18`', 200, 45, -1, false, '`StimulationDay18`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StimulationDay18->Sortable = true; // Allow sort
        $this->StimulationDay18->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StimulationDay18->Param, "CustomMsg");
        $this->Fields['StimulationDay18'] = &$this->StimulationDay18;

        // StimulationDay19
        $this->StimulationDay19 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StimulationDay19', 'StimulationDay19', '`StimulationDay19`', '`StimulationDay19`', 200, 45, -1, false, '`StimulationDay19`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StimulationDay19->Sortable = true; // Allow sort
        $this->StimulationDay19->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StimulationDay19->Param, "CustomMsg");
        $this->Fields['StimulationDay19'] = &$this->StimulationDay19;

        // StimulationDay20
        $this->StimulationDay20 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StimulationDay20', 'StimulationDay20', '`StimulationDay20`', '`StimulationDay20`', 200, 45, -1, false, '`StimulationDay20`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StimulationDay20->Sortable = true; // Allow sort
        $this->StimulationDay20->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StimulationDay20->Param, "CustomMsg");
        $this->Fields['StimulationDay20'] = &$this->StimulationDay20;

        // StimulationDay21
        $this->StimulationDay21 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StimulationDay21', 'StimulationDay21', '`StimulationDay21`', '`StimulationDay21`', 200, 45, -1, false, '`StimulationDay21`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StimulationDay21->Sortable = true; // Allow sort
        $this->StimulationDay21->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StimulationDay21->Param, "CustomMsg");
        $this->Fields['StimulationDay21'] = &$this->StimulationDay21;

        // StimulationDay22
        $this->StimulationDay22 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StimulationDay22', 'StimulationDay22', '`StimulationDay22`', '`StimulationDay22`', 200, 45, -1, false, '`StimulationDay22`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StimulationDay22->Sortable = true; // Allow sort
        $this->StimulationDay22->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StimulationDay22->Param, "CustomMsg");
        $this->Fields['StimulationDay22'] = &$this->StimulationDay22;

        // StimulationDay23
        $this->StimulationDay23 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StimulationDay23', 'StimulationDay23', '`StimulationDay23`', '`StimulationDay23`', 200, 45, -1, false, '`StimulationDay23`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StimulationDay23->Sortable = true; // Allow sort
        $this->StimulationDay23->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StimulationDay23->Param, "CustomMsg");
        $this->Fields['StimulationDay23'] = &$this->StimulationDay23;

        // StimulationDay24
        $this->StimulationDay24 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StimulationDay24', 'StimulationDay24', '`StimulationDay24`', '`StimulationDay24`', 200, 45, -1, false, '`StimulationDay24`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StimulationDay24->Sortable = true; // Allow sort
        $this->StimulationDay24->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StimulationDay24->Param, "CustomMsg");
        $this->Fields['StimulationDay24'] = &$this->StimulationDay24;

        // StimulationDay25
        $this->StimulationDay25 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_StimulationDay25', 'StimulationDay25', '`StimulationDay25`', '`StimulationDay25`', 200, 45, -1, false, '`StimulationDay25`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StimulationDay25->Sortable = true; // Allow sort
        $this->StimulationDay25->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StimulationDay25->Param, "CustomMsg");
        $this->Fields['StimulationDay25'] = &$this->StimulationDay25;

        // Tablet14
        $this->Tablet14 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Tablet14', 'Tablet14', '`Tablet14`', '`Tablet14`', 200, 45, -1, false, '`Tablet14`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Tablet14->Sortable = true; // Allow sort
        $this->Tablet14->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Tablet14->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Tablet14->Lookup = new Lookup('Tablet14', 'ivf_stimulation_tablet', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->Tablet14->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Tablet14->Param, "CustomMsg");
        $this->Fields['Tablet14'] = &$this->Tablet14;

        // Tablet15
        $this->Tablet15 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Tablet15', 'Tablet15', '`Tablet15`', '`Tablet15`', 200, 45, -1, false, '`Tablet15`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Tablet15->Sortable = true; // Allow sort
        $this->Tablet15->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Tablet15->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Tablet15->Lookup = new Lookup('Tablet15', 'ivf_stimulation_tablet', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->Tablet15->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Tablet15->Param, "CustomMsg");
        $this->Fields['Tablet15'] = &$this->Tablet15;

        // Tablet16
        $this->Tablet16 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Tablet16', 'Tablet16', '`Tablet16`', '`Tablet16`', 200, 45, -1, false, '`Tablet16`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Tablet16->Sortable = true; // Allow sort
        $this->Tablet16->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Tablet16->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Tablet16->Lookup = new Lookup('Tablet16', 'ivf_stimulation_tablet', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->Tablet16->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Tablet16->Param, "CustomMsg");
        $this->Fields['Tablet16'] = &$this->Tablet16;

        // Tablet17
        $this->Tablet17 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Tablet17', 'Tablet17', '`Tablet17`', '`Tablet17`', 200, 45, -1, false, '`Tablet17`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Tablet17->Sortable = true; // Allow sort
        $this->Tablet17->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Tablet17->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Tablet17->Lookup = new Lookup('Tablet17', 'ivf_stimulation_tablet', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->Tablet17->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Tablet17->Param, "CustomMsg");
        $this->Fields['Tablet17'] = &$this->Tablet17;

        // Tablet18
        $this->Tablet18 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Tablet18', 'Tablet18', '`Tablet18`', '`Tablet18`', 200, 45, -1, false, '`Tablet18`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Tablet18->Sortable = true; // Allow sort
        $this->Tablet18->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Tablet18->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Tablet18->Lookup = new Lookup('Tablet18', 'ivf_stimulation_tablet', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->Tablet18->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Tablet18->Param, "CustomMsg");
        $this->Fields['Tablet18'] = &$this->Tablet18;

        // Tablet19
        $this->Tablet19 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Tablet19', 'Tablet19', '`Tablet19`', '`Tablet19`', 200, 45, -1, false, '`Tablet19`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Tablet19->Sortable = true; // Allow sort
        $this->Tablet19->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Tablet19->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Tablet19->Lookup = new Lookup('Tablet19', 'ivf_stimulation_tablet', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->Tablet19->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Tablet19->Param, "CustomMsg");
        $this->Fields['Tablet19'] = &$this->Tablet19;

        // Tablet20
        $this->Tablet20 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Tablet20', 'Tablet20', '`Tablet20`', '`Tablet20`', 200, 45, -1, false, '`Tablet20`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Tablet20->Sortable = true; // Allow sort
        $this->Tablet20->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Tablet20->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Tablet20->Lookup = new Lookup('Tablet20', 'ivf_stimulation_tablet', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->Tablet20->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Tablet20->Param, "CustomMsg");
        $this->Fields['Tablet20'] = &$this->Tablet20;

        // Tablet21
        $this->Tablet21 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Tablet21', 'Tablet21', '`Tablet21`', '`Tablet21`', 200, 45, -1, false, '`Tablet21`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Tablet21->Sortable = true; // Allow sort
        $this->Tablet21->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Tablet21->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Tablet21->Lookup = new Lookup('Tablet21', 'ivf_stimulation_tablet', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->Tablet21->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Tablet21->Param, "CustomMsg");
        $this->Fields['Tablet21'] = &$this->Tablet21;

        // Tablet22
        $this->Tablet22 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Tablet22', 'Tablet22', '`Tablet22`', '`Tablet22`', 200, 45, -1, false, '`Tablet22`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Tablet22->Sortable = true; // Allow sort
        $this->Tablet22->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Tablet22->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Tablet22->Lookup = new Lookup('Tablet22', 'ivf_stimulation_tablet', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->Tablet22->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Tablet22->Param, "CustomMsg");
        $this->Fields['Tablet22'] = &$this->Tablet22;

        // Tablet23
        $this->Tablet23 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Tablet23', 'Tablet23', '`Tablet23`', '`Tablet23`', 200, 45, -1, false, '`Tablet23`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Tablet23->Sortable = true; // Allow sort
        $this->Tablet23->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Tablet23->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Tablet23->Lookup = new Lookup('Tablet23', 'ivf_stimulation_tablet', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->Tablet23->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Tablet23->Param, "CustomMsg");
        $this->Fields['Tablet23'] = &$this->Tablet23;

        // Tablet24
        $this->Tablet24 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Tablet24', 'Tablet24', '`Tablet24`', '`Tablet24`', 200, 45, -1, false, '`Tablet24`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Tablet24->Sortable = true; // Allow sort
        $this->Tablet24->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Tablet24->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Tablet24->Lookup = new Lookup('Tablet24', 'ivf_stimulation_tablet', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->Tablet24->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Tablet24->Param, "CustomMsg");
        $this->Fields['Tablet24'] = &$this->Tablet24;

        // Tablet25
        $this->Tablet25 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Tablet25', 'Tablet25', '`Tablet25`', '`Tablet25`', 200, 45, -1, false, '`Tablet25`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Tablet25->Sortable = true; // Allow sort
        $this->Tablet25->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Tablet25->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Tablet25->Lookup = new Lookup('Tablet25', 'ivf_stimulation_tablet', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->Tablet25->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Tablet25->Param, "CustomMsg");
        $this->Fields['Tablet25'] = &$this->Tablet25;

        // RFSH14
        $this->RFSH14 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_RFSH14', 'RFSH14', '`RFSH14`', '`RFSH14`', 200, 45, -1, false, '`RFSH14`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->RFSH14->Sortable = true; // Allow sort
        $this->RFSH14->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->RFSH14->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->RFSH14->Lookup = new Lookup('RFSH14', 'ivf_stimulation_rfsh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->RFSH14->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RFSH14->Param, "CustomMsg");
        $this->Fields['RFSH14'] = &$this->RFSH14;

        // RFSH15
        $this->RFSH15 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_RFSH15', 'RFSH15', '`RFSH15`', '`RFSH15`', 200, 45, -1, false, '`RFSH15`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->RFSH15->Sortable = true; // Allow sort
        $this->RFSH15->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->RFSH15->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->RFSH15->Lookup = new Lookup('RFSH15', 'ivf_stimulation_rfsh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->RFSH15->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RFSH15->Param, "CustomMsg");
        $this->Fields['RFSH15'] = &$this->RFSH15;

        // RFSH16
        $this->RFSH16 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_RFSH16', 'RFSH16', '`RFSH16`', '`RFSH16`', 200, 45, -1, false, '`RFSH16`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->RFSH16->Sortable = true; // Allow sort
        $this->RFSH16->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->RFSH16->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->RFSH16->Lookup = new Lookup('RFSH16', 'ivf_stimulation_rfsh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->RFSH16->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RFSH16->Param, "CustomMsg");
        $this->Fields['RFSH16'] = &$this->RFSH16;

        // RFSH17
        $this->RFSH17 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_RFSH17', 'RFSH17', '`RFSH17`', '`RFSH17`', 200, 45, -1, false, '`RFSH17`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->RFSH17->Sortable = true; // Allow sort
        $this->RFSH17->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->RFSH17->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->RFSH17->Lookup = new Lookup('RFSH17', 'ivf_stimulation_rfsh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->RFSH17->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RFSH17->Param, "CustomMsg");
        $this->Fields['RFSH17'] = &$this->RFSH17;

        // RFSH18
        $this->RFSH18 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_RFSH18', 'RFSH18', '`RFSH18`', '`RFSH18`', 200, 45, -1, false, '`RFSH18`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->RFSH18->Sortable = true; // Allow sort
        $this->RFSH18->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->RFSH18->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->RFSH18->Lookup = new Lookup('RFSH18', 'ivf_stimulation_rfsh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->RFSH18->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RFSH18->Param, "CustomMsg");
        $this->Fields['RFSH18'] = &$this->RFSH18;

        // RFSH19
        $this->RFSH19 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_RFSH19', 'RFSH19', '`RFSH19`', '`RFSH19`', 200, 45, -1, false, '`RFSH19`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->RFSH19->Sortable = true; // Allow sort
        $this->RFSH19->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->RFSH19->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->RFSH19->Lookup = new Lookup('RFSH19', 'ivf_stimulation_rfsh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->RFSH19->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RFSH19->Param, "CustomMsg");
        $this->Fields['RFSH19'] = &$this->RFSH19;

        // RFSH20
        $this->RFSH20 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_RFSH20', 'RFSH20', '`RFSH20`', '`RFSH20`', 200, 45, -1, false, '`RFSH20`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->RFSH20->Sortable = true; // Allow sort
        $this->RFSH20->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->RFSH20->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->RFSH20->Lookup = new Lookup('RFSH20', 'ivf_stimulation_rfsh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->RFSH20->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RFSH20->Param, "CustomMsg");
        $this->Fields['RFSH20'] = &$this->RFSH20;

        // RFSH21
        $this->RFSH21 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_RFSH21', 'RFSH21', '`RFSH21`', '`RFSH21`', 200, 45, -1, false, '`RFSH21`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->RFSH21->Sortable = true; // Allow sort
        $this->RFSH21->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->RFSH21->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->RFSH21->Lookup = new Lookup('RFSH21', 'ivf_stimulation_rfsh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->RFSH21->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RFSH21->Param, "CustomMsg");
        $this->Fields['RFSH21'] = &$this->RFSH21;

        // RFSH22
        $this->RFSH22 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_RFSH22', 'RFSH22', '`RFSH22`', '`RFSH22`', 200, 45, -1, false, '`RFSH22`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->RFSH22->Sortable = true; // Allow sort
        $this->RFSH22->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->RFSH22->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->RFSH22->Lookup = new Lookup('RFSH22', 'ivf_stimulation_rfsh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->RFSH22->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RFSH22->Param, "CustomMsg");
        $this->Fields['RFSH22'] = &$this->RFSH22;

        // RFSH23
        $this->RFSH23 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_RFSH23', 'RFSH23', '`RFSH23`', '`RFSH23`', 200, 45, -1, false, '`RFSH23`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->RFSH23->Sortable = true; // Allow sort
        $this->RFSH23->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->RFSH23->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->RFSH23->Lookup = new Lookup('RFSH23', 'ivf_stimulation_rfsh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->RFSH23->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RFSH23->Param, "CustomMsg");
        $this->Fields['RFSH23'] = &$this->RFSH23;

        // RFSH24
        $this->RFSH24 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_RFSH24', 'RFSH24', '`RFSH24`', '`RFSH24`', 200, 45, -1, false, '`RFSH24`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->RFSH24->Sortable = true; // Allow sort
        $this->RFSH24->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->RFSH24->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->RFSH24->Lookup = new Lookup('RFSH24', 'ivf_stimulation_rfsh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->RFSH24->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RFSH24->Param, "CustomMsg");
        $this->Fields['RFSH24'] = &$this->RFSH24;

        // RFSH25
        $this->RFSH25 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_RFSH25', 'RFSH25', '`RFSH25`', '`RFSH25`', 200, 45, -1, false, '`RFSH25`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->RFSH25->Sortable = true; // Allow sort
        $this->RFSH25->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->RFSH25->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->RFSH25->Lookup = new Lookup('RFSH25', 'ivf_stimulation_rfsh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->RFSH25->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RFSH25->Param, "CustomMsg");
        $this->Fields['RFSH25'] = &$this->RFSH25;

        // HMG14
        $this->HMG14 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_HMG14', 'HMG14', '`HMG14`', '`HMG14`', 200, 45, -1, false, '`HMG14`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->HMG14->Sortable = true; // Allow sort
        $this->HMG14->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->HMG14->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->HMG14->Lookup = new Lookup('HMG14', 'ivf_stimulation_hmg', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->HMG14->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HMG14->Param, "CustomMsg");
        $this->Fields['HMG14'] = &$this->HMG14;

        // HMG15
        $this->HMG15 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_HMG15', 'HMG15', '`HMG15`', '`HMG15`', 200, 45, -1, false, '`HMG15`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->HMG15->Sortable = true; // Allow sort
        $this->HMG15->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->HMG15->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->HMG15->Lookup = new Lookup('HMG15', 'ivf_stimulation_hmg', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->HMG15->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HMG15->Param, "CustomMsg");
        $this->Fields['HMG15'] = &$this->HMG15;

        // HMG16
        $this->HMG16 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_HMG16', 'HMG16', '`HMG16`', '`HMG16`', 200, 45, -1, false, '`HMG16`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->HMG16->Sortable = true; // Allow sort
        $this->HMG16->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->HMG16->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->HMG16->Lookup = new Lookup('HMG16', 'ivf_stimulation_hmg', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->HMG16->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HMG16->Param, "CustomMsg");
        $this->Fields['HMG16'] = &$this->HMG16;

        // HMG17
        $this->HMG17 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_HMG17', 'HMG17', '`HMG17`', '`HMG17`', 200, 45, -1, false, '`HMG17`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->HMG17->Sortable = true; // Allow sort
        $this->HMG17->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->HMG17->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->HMG17->Lookup = new Lookup('HMG17', 'ivf_stimulation_hmg', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->HMG17->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HMG17->Param, "CustomMsg");
        $this->Fields['HMG17'] = &$this->HMG17;

        // HMG18
        $this->HMG18 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_HMG18', 'HMG18', '`HMG18`', '`HMG18`', 200, 45, -1, false, '`HMG18`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->HMG18->Sortable = true; // Allow sort
        $this->HMG18->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->HMG18->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->HMG18->Lookup = new Lookup('HMG18', 'ivf_stimulation_hmg', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->HMG18->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HMG18->Param, "CustomMsg");
        $this->Fields['HMG18'] = &$this->HMG18;

        // HMG19
        $this->HMG19 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_HMG19', 'HMG19', '`HMG19`', '`HMG19`', 200, 45, -1, false, '`HMG19`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->HMG19->Sortable = true; // Allow sort
        $this->HMG19->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->HMG19->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->HMG19->Lookup = new Lookup('HMG19', 'ivf_stimulation_hmg', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->HMG19->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HMG19->Param, "CustomMsg");
        $this->Fields['HMG19'] = &$this->HMG19;

        // HMG20
        $this->HMG20 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_HMG20', 'HMG20', '`HMG20`', '`HMG20`', 200, 45, -1, false, '`HMG20`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->HMG20->Sortable = true; // Allow sort
        $this->HMG20->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->HMG20->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->HMG20->Lookup = new Lookup('HMG20', 'ivf_stimulation_hmg', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->HMG20->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HMG20->Param, "CustomMsg");
        $this->Fields['HMG20'] = &$this->HMG20;

        // HMG21
        $this->HMG21 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_HMG21', 'HMG21', '`HMG21`', '`HMG21`', 200, 45, -1, false, '`HMG21`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->HMG21->Sortable = true; // Allow sort
        $this->HMG21->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->HMG21->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->HMG21->Lookup = new Lookup('HMG21', 'ivf_stimulation_hmg', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->HMG21->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HMG21->Param, "CustomMsg");
        $this->Fields['HMG21'] = &$this->HMG21;

        // HMG22
        $this->HMG22 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_HMG22', 'HMG22', '`HMG22`', '`HMG22`', 200, 45, -1, false, '`HMG22`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->HMG22->Sortable = true; // Allow sort
        $this->HMG22->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->HMG22->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->HMG22->Lookup = new Lookup('HMG22', 'ivf_stimulation_hmg', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->HMG22->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HMG22->Param, "CustomMsg");
        $this->Fields['HMG22'] = &$this->HMG22;

        // HMG23
        $this->HMG23 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_HMG23', 'HMG23', '`HMG23`', '`HMG23`', 200, 45, -1, false, '`HMG23`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->HMG23->Sortable = true; // Allow sort
        $this->HMG23->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->HMG23->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->HMG23->Lookup = new Lookup('HMG23', 'ivf_stimulation_hmg', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->HMG23->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HMG23->Param, "CustomMsg");
        $this->Fields['HMG23'] = &$this->HMG23;

        // HMG24
        $this->HMG24 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_HMG24', 'HMG24', '`HMG24`', '`HMG24`', 200, 45, -1, false, '`HMG24`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->HMG24->Sortable = true; // Allow sort
        $this->HMG24->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->HMG24->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->HMG24->Lookup = new Lookup('HMG24', 'ivf_stimulation_hmg', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->HMG24->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HMG24->Param, "CustomMsg");
        $this->Fields['HMG24'] = &$this->HMG24;

        // HMG25
        $this->HMG25 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_HMG25', 'HMG25', '`HMG25`', '`HMG25`', 200, 45, -1, false, '`HMG25`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->HMG25->Sortable = true; // Allow sort
        $this->HMG25->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->HMG25->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->HMG25->Lookup = new Lookup('HMG25', 'ivf_stimulation_hmg', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->HMG25->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HMG25->Param, "CustomMsg");
        $this->Fields['HMG25'] = &$this->HMG25;

        // GnRH14
        $this->GnRH14 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_GnRH14', 'GnRH14', '`GnRH14`', '`GnRH14`', 200, 45, -1, false, '`GnRH14`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->GnRH14->Sortable = true; // Allow sort
        $this->GnRH14->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->GnRH14->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->GnRH14->Lookup = new Lookup('GnRH14', 'ivf_stimulation_gnrh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->GnRH14->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GnRH14->Param, "CustomMsg");
        $this->Fields['GnRH14'] = &$this->GnRH14;

        // GnRH15
        $this->GnRH15 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_GnRH15', 'GnRH15', '`GnRH15`', '`GnRH15`', 200, 45, -1, false, '`GnRH15`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->GnRH15->Sortable = true; // Allow sort
        $this->GnRH15->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->GnRH15->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->GnRH15->Lookup = new Lookup('GnRH15', 'ivf_stimulation_gnrh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->GnRH15->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GnRH15->Param, "CustomMsg");
        $this->Fields['GnRH15'] = &$this->GnRH15;

        // GnRH16
        $this->GnRH16 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_GnRH16', 'GnRH16', '`GnRH16`', '`GnRH16`', 200, 45, -1, false, '`GnRH16`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->GnRH16->Sortable = true; // Allow sort
        $this->GnRH16->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->GnRH16->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->GnRH16->Lookup = new Lookup('GnRH16', 'ivf_stimulation_gnrh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->GnRH16->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GnRH16->Param, "CustomMsg");
        $this->Fields['GnRH16'] = &$this->GnRH16;

        // GnRH17
        $this->GnRH17 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_GnRH17', 'GnRH17', '`GnRH17`', '`GnRH17`', 200, 45, -1, false, '`GnRH17`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->GnRH17->Sortable = true; // Allow sort
        $this->GnRH17->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->GnRH17->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->GnRH17->Lookup = new Lookup('GnRH17', 'ivf_stimulation_gnrh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->GnRH17->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GnRH17->Param, "CustomMsg");
        $this->Fields['GnRH17'] = &$this->GnRH17;

        // GnRH18
        $this->GnRH18 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_GnRH18', 'GnRH18', '`GnRH18`', '`GnRH18`', 200, 45, -1, false, '`GnRH18`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->GnRH18->Sortable = true; // Allow sort
        $this->GnRH18->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->GnRH18->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->GnRH18->Lookup = new Lookup('GnRH18', 'ivf_stimulation_gnrh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->GnRH18->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GnRH18->Param, "CustomMsg");
        $this->Fields['GnRH18'] = &$this->GnRH18;

        // GnRH19
        $this->GnRH19 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_GnRH19', 'GnRH19', '`GnRH19`', '`GnRH19`', 200, 45, -1, false, '`GnRH19`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->GnRH19->Sortable = true; // Allow sort
        $this->GnRH19->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->GnRH19->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->GnRH19->Lookup = new Lookup('GnRH19', 'ivf_stimulation_gnrh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->GnRH19->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GnRH19->Param, "CustomMsg");
        $this->Fields['GnRH19'] = &$this->GnRH19;

        // GnRH20
        $this->GnRH20 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_GnRH20', 'GnRH20', '`GnRH20`', '`GnRH20`', 200, 45, -1, false, '`GnRH20`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->GnRH20->Sortable = true; // Allow sort
        $this->GnRH20->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->GnRH20->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->GnRH20->Lookup = new Lookup('GnRH20', 'ivf_stimulation_gnrh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->GnRH20->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GnRH20->Param, "CustomMsg");
        $this->Fields['GnRH20'] = &$this->GnRH20;

        // GnRH21
        $this->GnRH21 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_GnRH21', 'GnRH21', '`GnRH21`', '`GnRH21`', 200, 45, -1, false, '`GnRH21`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->GnRH21->Sortable = true; // Allow sort
        $this->GnRH21->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->GnRH21->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->GnRH21->Lookup = new Lookup('GnRH21', 'ivf_stimulation_gnrh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->GnRH21->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GnRH21->Param, "CustomMsg");
        $this->Fields['GnRH21'] = &$this->GnRH21;

        // GnRH22
        $this->GnRH22 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_GnRH22', 'GnRH22', '`GnRH22`', '`GnRH22`', 200, 45, -1, false, '`GnRH22`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->GnRH22->Sortable = true; // Allow sort
        $this->GnRH22->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->GnRH22->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->GnRH22->Lookup = new Lookup('GnRH22', 'ivf_stimulation_gnrh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->GnRH22->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GnRH22->Param, "CustomMsg");
        $this->Fields['GnRH22'] = &$this->GnRH22;

        // GnRH23
        $this->GnRH23 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_GnRH23', 'GnRH23', '`GnRH23`', '`GnRH23`', 200, 45, -1, false, '`GnRH23`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->GnRH23->Sortable = true; // Allow sort
        $this->GnRH23->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->GnRH23->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->GnRH23->Lookup = new Lookup('GnRH23', 'ivf_stimulation_gnrh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->GnRH23->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GnRH23->Param, "CustomMsg");
        $this->Fields['GnRH23'] = &$this->GnRH23;

        // GnRH24
        $this->GnRH24 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_GnRH24', 'GnRH24', '`GnRH24`', '`GnRH24`', 200, 45, -1, false, '`GnRH24`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->GnRH24->Sortable = true; // Allow sort
        $this->GnRH24->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->GnRH24->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->GnRH24->Lookup = new Lookup('GnRH24', 'ivf_stimulation_gnrh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->GnRH24->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GnRH24->Param, "CustomMsg");
        $this->Fields['GnRH24'] = &$this->GnRH24;

        // GnRH25
        $this->GnRH25 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_GnRH25', 'GnRH25', '`GnRH25`', '`GnRH25`', 200, 45, -1, false, '`GnRH25`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->GnRH25->Sortable = true; // Allow sort
        $this->GnRH25->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->GnRH25->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->GnRH25->Lookup = new Lookup('GnRH25', 'ivf_stimulation_gnrh', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->GnRH25->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GnRH25->Param, "CustomMsg");
        $this->Fields['GnRH25'] = &$this->GnRH25;

        // P414
        $this->P414 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_P414', 'P414', '`P414`', '`P414`', 200, 45, -1, false, '`P414`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->P414->Sortable = true; // Allow sort
        $this->P414->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->P414->Param, "CustomMsg");
        $this->Fields['P414'] = &$this->P414;

        // P415
        $this->P415 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_P415', 'P415', '`P415`', '`P415`', 200, 45, -1, false, '`P415`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->P415->Sortable = true; // Allow sort
        $this->P415->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->P415->Param, "CustomMsg");
        $this->Fields['P415'] = &$this->P415;

        // P416
        $this->P416 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_P416', 'P416', '`P416`', '`P416`', 200, 45, -1, false, '`P416`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->P416->Sortable = true; // Allow sort
        $this->P416->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->P416->Param, "CustomMsg");
        $this->Fields['P416'] = &$this->P416;

        // P417
        $this->P417 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_P417', 'P417', '`P417`', '`P417`', 200, 45, -1, false, '`P417`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->P417->Sortable = true; // Allow sort
        $this->P417->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->P417->Param, "CustomMsg");
        $this->Fields['P417'] = &$this->P417;

        // P418
        $this->P418 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_P418', 'P418', '`P418`', '`P418`', 200, 45, -1, false, '`P418`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->P418->Sortable = true; // Allow sort
        $this->P418->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->P418->Param, "CustomMsg");
        $this->Fields['P418'] = &$this->P418;

        // P419
        $this->P419 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_P419', 'P419', '`P419`', '`P419`', 200, 45, -1, false, '`P419`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->P419->Sortable = true; // Allow sort
        $this->P419->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->P419->Param, "CustomMsg");
        $this->Fields['P419'] = &$this->P419;

        // P420
        $this->P420 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_P420', 'P420', '`P420`', '`P420`', 200, 45, -1, false, '`P420`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->P420->Sortable = true; // Allow sort
        $this->P420->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->P420->Param, "CustomMsg");
        $this->Fields['P420'] = &$this->P420;

        // P421
        $this->P421 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_P421', 'P421', '`P421`', '`P421`', 200, 45, -1, false, '`P421`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->P421->Sortable = true; // Allow sort
        $this->P421->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->P421->Param, "CustomMsg");
        $this->Fields['P421'] = &$this->P421;

        // P422
        $this->P422 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_P422', 'P422', '`P422`', '`P422`', 200, 45, -1, false, '`P422`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->P422->Sortable = true; // Allow sort
        $this->P422->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->P422->Param, "CustomMsg");
        $this->Fields['P422'] = &$this->P422;

        // P423
        $this->P423 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_P423', 'P423', '`P423`', '`P423`', 200, 45, -1, false, '`P423`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->P423->Sortable = true; // Allow sort
        $this->P423->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->P423->Param, "CustomMsg");
        $this->Fields['P423'] = &$this->P423;

        // P424
        $this->P424 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_P424', 'P424', '`P424`', '`P424`', 200, 45, -1, false, '`P424`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->P424->Sortable = true; // Allow sort
        $this->P424->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->P424->Param, "CustomMsg");
        $this->Fields['P424'] = &$this->P424;

        // P425
        $this->P425 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_P425', 'P425', '`P425`', '`P425`', 200, 45, -1, false, '`P425`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->P425->Sortable = true; // Allow sort
        $this->P425->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->P425->Param, "CustomMsg");
        $this->Fields['P425'] = &$this->P425;

        // USGRt14
        $this->USGRt14 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGRt14', 'USGRt14', '`USGRt14`', '`USGRt14`', 200, 45, -1, false, '`USGRt14`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGRt14->Sortable = true; // Allow sort
        $this->USGRt14->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGRt14->Param, "CustomMsg");
        $this->Fields['USGRt14'] = &$this->USGRt14;

        // USGRt15
        $this->USGRt15 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGRt15', 'USGRt15', '`USGRt15`', '`USGRt15`', 200, 45, -1, false, '`USGRt15`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGRt15->Sortable = true; // Allow sort
        $this->USGRt15->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGRt15->Param, "CustomMsg");
        $this->Fields['USGRt15'] = &$this->USGRt15;

        // USGRt16
        $this->USGRt16 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGRt16', 'USGRt16', '`USGRt16`', '`USGRt16`', 200, 45, -1, false, '`USGRt16`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGRt16->Sortable = true; // Allow sort
        $this->USGRt16->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGRt16->Param, "CustomMsg");
        $this->Fields['USGRt16'] = &$this->USGRt16;

        // USGRt17
        $this->USGRt17 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGRt17', 'USGRt17', '`USGRt17`', '`USGRt17`', 200, 45, -1, false, '`USGRt17`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGRt17->Sortable = true; // Allow sort
        $this->USGRt17->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGRt17->Param, "CustomMsg");
        $this->Fields['USGRt17'] = &$this->USGRt17;

        // USGRt18
        $this->USGRt18 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGRt18', 'USGRt18', '`USGRt18`', '`USGRt18`', 200, 45, -1, false, '`USGRt18`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGRt18->Sortable = true; // Allow sort
        $this->USGRt18->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGRt18->Param, "CustomMsg");
        $this->Fields['USGRt18'] = &$this->USGRt18;

        // USGRt19
        $this->USGRt19 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGRt19', 'USGRt19', '`USGRt19`', '`USGRt19`', 200, 45, -1, false, '`USGRt19`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGRt19->Sortable = true; // Allow sort
        $this->USGRt19->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGRt19->Param, "CustomMsg");
        $this->Fields['USGRt19'] = &$this->USGRt19;

        // USGRt20
        $this->USGRt20 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGRt20', 'USGRt20', '`USGRt20`', '`USGRt20`', 200, 45, -1, false, '`USGRt20`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGRt20->Sortable = true; // Allow sort
        $this->USGRt20->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGRt20->Param, "CustomMsg");
        $this->Fields['USGRt20'] = &$this->USGRt20;

        // USGRt21
        $this->USGRt21 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGRt21', 'USGRt21', '`USGRt21`', '`USGRt21`', 200, 45, -1, false, '`USGRt21`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGRt21->Sortable = true; // Allow sort
        $this->USGRt21->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGRt21->Param, "CustomMsg");
        $this->Fields['USGRt21'] = &$this->USGRt21;

        // USGRt22
        $this->USGRt22 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGRt22', 'USGRt22', '`USGRt22`', '`USGRt22`', 200, 45, -1, false, '`USGRt22`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGRt22->Sortable = true; // Allow sort
        $this->USGRt22->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGRt22->Param, "CustomMsg");
        $this->Fields['USGRt22'] = &$this->USGRt22;

        // USGRt23
        $this->USGRt23 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGRt23', 'USGRt23', '`USGRt23`', '`USGRt23`', 200, 45, -1, false, '`USGRt23`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGRt23->Sortable = true; // Allow sort
        $this->USGRt23->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGRt23->Param, "CustomMsg");
        $this->Fields['USGRt23'] = &$this->USGRt23;

        // USGRt24
        $this->USGRt24 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGRt24', 'USGRt24', '`USGRt24`', '`USGRt24`', 200, 45, -1, false, '`USGRt24`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGRt24->Sortable = true; // Allow sort
        $this->USGRt24->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGRt24->Param, "CustomMsg");
        $this->Fields['USGRt24'] = &$this->USGRt24;

        // USGRt25
        $this->USGRt25 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGRt25', 'USGRt25', '`USGRt25`', '`USGRt25`', 200, 45, -1, false, '`USGRt25`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGRt25->Sortable = true; // Allow sort
        $this->USGRt25->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGRt25->Param, "CustomMsg");
        $this->Fields['USGRt25'] = &$this->USGRt25;

        // USGLt14
        $this->USGLt14 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGLt14', 'USGLt14', '`USGLt14`', '`USGLt14`', 200, 45, -1, false, '`USGLt14`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGLt14->Sortable = true; // Allow sort
        $this->USGLt14->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGLt14->Param, "CustomMsg");
        $this->Fields['USGLt14'] = &$this->USGLt14;

        // USGLt15
        $this->USGLt15 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGLt15', 'USGLt15', '`USGLt15`', '`USGLt15`', 200, 45, -1, false, '`USGLt15`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGLt15->Sortable = true; // Allow sort
        $this->USGLt15->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGLt15->Param, "CustomMsg");
        $this->Fields['USGLt15'] = &$this->USGLt15;

        // USGLt16
        $this->USGLt16 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGLt16', 'USGLt16', '`USGLt16`', '`USGLt16`', 200, 45, -1, false, '`USGLt16`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGLt16->Sortable = true; // Allow sort
        $this->USGLt16->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGLt16->Param, "CustomMsg");
        $this->Fields['USGLt16'] = &$this->USGLt16;

        // USGLt17
        $this->USGLt17 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGLt17', 'USGLt17', '`USGLt17`', '`USGLt17`', 200, 45, -1, false, '`USGLt17`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGLt17->Sortable = true; // Allow sort
        $this->USGLt17->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGLt17->Param, "CustomMsg");
        $this->Fields['USGLt17'] = &$this->USGLt17;

        // USGLt18
        $this->USGLt18 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGLt18', 'USGLt18', '`USGLt18`', '`USGLt18`', 200, 45, -1, false, '`USGLt18`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGLt18->Sortable = true; // Allow sort
        $this->USGLt18->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGLt18->Param, "CustomMsg");
        $this->Fields['USGLt18'] = &$this->USGLt18;

        // USGLt19
        $this->USGLt19 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGLt19', 'USGLt19', '`USGLt19`', '`USGLt19`', 200, 45, -1, false, '`USGLt19`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGLt19->Sortable = true; // Allow sort
        $this->USGLt19->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGLt19->Param, "CustomMsg");
        $this->Fields['USGLt19'] = &$this->USGLt19;

        // USGLt20
        $this->USGLt20 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGLt20', 'USGLt20', '`USGLt20`', '`USGLt20`', 200, 45, -1, false, '`USGLt20`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGLt20->Sortable = true; // Allow sort
        $this->USGLt20->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGLt20->Param, "CustomMsg");
        $this->Fields['USGLt20'] = &$this->USGLt20;

        // USGLt21
        $this->USGLt21 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGLt21', 'USGLt21', '`USGLt21`', '`USGLt21`', 200, 45, -1, false, '`USGLt21`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGLt21->Sortable = true; // Allow sort
        $this->USGLt21->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGLt21->Param, "CustomMsg");
        $this->Fields['USGLt21'] = &$this->USGLt21;

        // USGLt22
        $this->USGLt22 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGLt22', 'USGLt22', '`USGLt22`', '`USGLt22`', 200, 45, -1, false, '`USGLt22`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGLt22->Sortable = true; // Allow sort
        $this->USGLt22->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGLt22->Param, "CustomMsg");
        $this->Fields['USGLt22'] = &$this->USGLt22;

        // USGLt23
        $this->USGLt23 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGLt23', 'USGLt23', '`USGLt23`', '`USGLt23`', 200, 45, -1, false, '`USGLt23`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGLt23->Sortable = true; // Allow sort
        $this->USGLt23->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGLt23->Param, "CustomMsg");
        $this->Fields['USGLt23'] = &$this->USGLt23;

        // USGLt24
        $this->USGLt24 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGLt24', 'USGLt24', '`USGLt24`', '`USGLt24`', 200, 45, -1, false, '`USGLt24`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGLt24->Sortable = true; // Allow sort
        $this->USGLt24->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGLt24->Param, "CustomMsg");
        $this->Fields['USGLt24'] = &$this->USGLt24;

        // USGLt25
        $this->USGLt25 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_USGLt25', 'USGLt25', '`USGLt25`', '`USGLt25`', 200, 45, -1, false, '`USGLt25`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->USGLt25->Sortable = true; // Allow sort
        $this->USGLt25->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USGLt25->Param, "CustomMsg");
        $this->Fields['USGLt25'] = &$this->USGLt25;

        // EM14
        $this->EM14 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_EM14', 'EM14', '`EM14`', '`EM14`', 200, 45, -1, false, '`EM14`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EM14->Sortable = true; // Allow sort
        $this->EM14->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EM14->Param, "CustomMsg");
        $this->Fields['EM14'] = &$this->EM14;

        // EM15
        $this->EM15 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_EM15', 'EM15', '`EM15`', '`EM15`', 200, 45, -1, false, '`EM15`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EM15->Sortable = true; // Allow sort
        $this->EM15->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EM15->Param, "CustomMsg");
        $this->Fields['EM15'] = &$this->EM15;

        // EM16
        $this->EM16 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_EM16', 'EM16', '`EM16`', '`EM16`', 200, 45, -1, false, '`EM16`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EM16->Sortable = true; // Allow sort
        $this->EM16->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EM16->Param, "CustomMsg");
        $this->Fields['EM16'] = &$this->EM16;

        // EM17
        $this->EM17 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_EM17', 'EM17', '`EM17`', '`EM17`', 200, 45, -1, false, '`EM17`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EM17->Sortable = true; // Allow sort
        $this->EM17->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EM17->Param, "CustomMsg");
        $this->Fields['EM17'] = &$this->EM17;

        // EM18
        $this->EM18 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_EM18', 'EM18', '`EM18`', '`EM18`', 200, 45, -1, false, '`EM18`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EM18->Sortable = true; // Allow sort
        $this->EM18->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EM18->Param, "CustomMsg");
        $this->Fields['EM18'] = &$this->EM18;

        // EM19
        $this->EM19 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_EM19', 'EM19', '`EM19`', '`EM19`', 200, 45, -1, false, '`EM19`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EM19->Sortable = true; // Allow sort
        $this->EM19->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EM19->Param, "CustomMsg");
        $this->Fields['EM19'] = &$this->EM19;

        // EM20
        $this->EM20 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_EM20', 'EM20', '`EM20`', '`EM20`', 200, 45, -1, false, '`EM20`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EM20->Sortable = true; // Allow sort
        $this->EM20->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EM20->Param, "CustomMsg");
        $this->Fields['EM20'] = &$this->EM20;

        // EM21
        $this->EM21 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_EM21', 'EM21', '`EM21`', '`EM21`', 200, 45, -1, false, '`EM21`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EM21->Sortable = true; // Allow sort
        $this->EM21->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EM21->Param, "CustomMsg");
        $this->Fields['EM21'] = &$this->EM21;

        // EM22
        $this->EM22 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_EM22', 'EM22', '`EM22`', '`EM22`', 200, 45, -1, false, '`EM22`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EM22->Sortable = true; // Allow sort
        $this->EM22->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EM22->Param, "CustomMsg");
        $this->Fields['EM22'] = &$this->EM22;

        // EM23
        $this->EM23 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_EM23', 'EM23', '`EM23`', '`EM23`', 200, 45, -1, false, '`EM23`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EM23->Sortable = true; // Allow sort
        $this->EM23->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EM23->Param, "CustomMsg");
        $this->Fields['EM23'] = &$this->EM23;

        // EM24
        $this->EM24 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_EM24', 'EM24', '`EM24`', '`EM24`', 200, 45, -1, false, '`EM24`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EM24->Sortable = true; // Allow sort
        $this->EM24->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EM24->Param, "CustomMsg");
        $this->Fields['EM24'] = &$this->EM24;

        // EM25
        $this->EM25 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_EM25', 'EM25', '`EM25`', '`EM25`', 200, 45, -1, false, '`EM25`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EM25->Sortable = true; // Allow sort
        $this->EM25->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EM25->Param, "CustomMsg");
        $this->Fields['EM25'] = &$this->EM25;

        // Others14
        $this->Others14 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Others14', 'Others14', '`Others14`', '`Others14`', 200, 45, -1, false, '`Others14`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Others14->Sortable = true; // Allow sort
        $this->Others14->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Others14->Param, "CustomMsg");
        $this->Fields['Others14'] = &$this->Others14;

        // Others15
        $this->Others15 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Others15', 'Others15', '`Others15`', '`Others15`', 200, 45, -1, false, '`Others15`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Others15->Sortable = true; // Allow sort
        $this->Others15->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Others15->Param, "CustomMsg");
        $this->Fields['Others15'] = &$this->Others15;

        // Others16
        $this->Others16 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Others16', 'Others16', '`Others16`', '`Others16`', 200, 45, -1, false, '`Others16`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Others16->Sortable = true; // Allow sort
        $this->Others16->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Others16->Param, "CustomMsg");
        $this->Fields['Others16'] = &$this->Others16;

        // Others17
        $this->Others17 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Others17', 'Others17', '`Others17`', '`Others17`', 200, 45, -1, false, '`Others17`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Others17->Sortable = true; // Allow sort
        $this->Others17->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Others17->Param, "CustomMsg");
        $this->Fields['Others17'] = &$this->Others17;

        // Others18
        $this->Others18 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Others18', 'Others18', '`Others18`', '`Others18`', 200, 45, -1, false, '`Others18`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Others18->Sortable = true; // Allow sort
        $this->Others18->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Others18->Param, "CustomMsg");
        $this->Fields['Others18'] = &$this->Others18;

        // Others19
        $this->Others19 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Others19', 'Others19', '`Others19`', '`Others19`', 200, 45, -1, false, '`Others19`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Others19->Sortable = true; // Allow sort
        $this->Others19->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Others19->Param, "CustomMsg");
        $this->Fields['Others19'] = &$this->Others19;

        // Others20
        $this->Others20 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Others20', 'Others20', '`Others20`', '`Others20`', 200, 45, -1, false, '`Others20`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Others20->Sortable = true; // Allow sort
        $this->Others20->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Others20->Param, "CustomMsg");
        $this->Fields['Others20'] = &$this->Others20;

        // Others21
        $this->Others21 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Others21', 'Others21', '`Others21`', '`Others21`', 200, 45, -1, false, '`Others21`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Others21->Sortable = true; // Allow sort
        $this->Others21->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Others21->Param, "CustomMsg");
        $this->Fields['Others21'] = &$this->Others21;

        // Others22
        $this->Others22 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Others22', 'Others22', '`Others22`', '`Others22`', 200, 45, -1, false, '`Others22`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Others22->Sortable = true; // Allow sort
        $this->Others22->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Others22->Param, "CustomMsg");
        $this->Fields['Others22'] = &$this->Others22;

        // Others23
        $this->Others23 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Others23', 'Others23', '`Others23`', '`Others23`', 200, 45, -1, false, '`Others23`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Others23->Sortable = true; // Allow sort
        $this->Others23->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Others23->Param, "CustomMsg");
        $this->Fields['Others23'] = &$this->Others23;

        // Others24
        $this->Others24 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Others24', 'Others24', '`Others24`', '`Others24`', 200, 45, -1, false, '`Others24`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Others24->Sortable = true; // Allow sort
        $this->Others24->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Others24->Param, "CustomMsg");
        $this->Fields['Others24'] = &$this->Others24;

        // Others25
        $this->Others25 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_Others25', 'Others25', '`Others25`', '`Others25`', 200, 45, -1, false, '`Others25`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Others25->Sortable = true; // Allow sort
        $this->Others25->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Others25->Param, "CustomMsg");
        $this->Fields['Others25'] = &$this->Others25;

        // DR14
        $this->DR14 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DR14', 'DR14', '`DR14`', '`DR14`', 200, 45, -1, false, '`DR14`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DR14->Sortable = true; // Allow sort
        $this->DR14->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DR14->Param, "CustomMsg");
        $this->Fields['DR14'] = &$this->DR14;

        // DR15
        $this->DR15 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DR15', 'DR15', '`DR15`', '`DR15`', 200, 45, -1, false, '`DR15`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DR15->Sortable = true; // Allow sort
        $this->DR15->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DR15->Param, "CustomMsg");
        $this->Fields['DR15'] = &$this->DR15;

        // DR16
        $this->DR16 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DR16', 'DR16', '`DR16`', '`DR16`', 200, 45, -1, false, '`DR16`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DR16->Sortable = true; // Allow sort
        $this->DR16->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DR16->Param, "CustomMsg");
        $this->Fields['DR16'] = &$this->DR16;

        // DR17
        $this->DR17 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DR17', 'DR17', '`DR17`', '`DR17`', 200, 45, -1, false, '`DR17`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DR17->Sortable = true; // Allow sort
        $this->DR17->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DR17->Param, "CustomMsg");
        $this->Fields['DR17'] = &$this->DR17;

        // DR18
        $this->DR18 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DR18', 'DR18', '`DR18`', '`DR18`', 200, 45, -1, false, '`DR18`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DR18->Sortable = true; // Allow sort
        $this->DR18->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DR18->Param, "CustomMsg");
        $this->Fields['DR18'] = &$this->DR18;

        // DR19
        $this->DR19 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DR19', 'DR19', '`DR19`', '`DR19`', 200, 45, -1, false, '`DR19`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DR19->Sortable = true; // Allow sort
        $this->DR19->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DR19->Param, "CustomMsg");
        $this->Fields['DR19'] = &$this->DR19;

        // DR20
        $this->DR20 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DR20', 'DR20', '`DR20`', '`DR20`', 200, 45, -1, false, '`DR20`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DR20->Sortable = true; // Allow sort
        $this->DR20->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DR20->Param, "CustomMsg");
        $this->Fields['DR20'] = &$this->DR20;

        // DR21
        $this->DR21 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DR21', 'DR21', '`DR21`', '`DR21`', 200, 45, -1, false, '`DR21`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DR21->Sortable = true; // Allow sort
        $this->DR21->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DR21->Param, "CustomMsg");
        $this->Fields['DR21'] = &$this->DR21;

        // DR22
        $this->DR22 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DR22', 'DR22', '`DR22`', '`DR22`', 200, 45, -1, false, '`DR22`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DR22->Sortable = true; // Allow sort
        $this->DR22->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DR22->Param, "CustomMsg");
        $this->Fields['DR22'] = &$this->DR22;

        // DR23
        $this->DR23 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DR23', 'DR23', '`DR23`', '`DR23`', 200, 45, -1, false, '`DR23`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DR23->Sortable = true; // Allow sort
        $this->DR23->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DR23->Param, "CustomMsg");
        $this->Fields['DR23'] = &$this->DR23;

        // DR24
        $this->DR24 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DR24', 'DR24', '`DR24`', '`DR24`', 200, 45, -1, false, '`DR24`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DR24->Sortable = true; // Allow sort
        $this->DR24->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DR24->Param, "CustomMsg");
        $this->Fields['DR24'] = &$this->DR24;

        // DR25
        $this->DR25 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DR25', 'DR25', '`DR25`', '`DR25`', 200, 45, -1, false, '`DR25`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DR25->Sortable = true; // Allow sort
        $this->DR25->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DR25->Param, "CustomMsg");
        $this->Fields['DR25'] = &$this->DR25;

        // E214
        $this->E214 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_E214', 'E214', '`E214`', '`E214`', 200, 45, -1, false, '`E214`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->E214->Sortable = true; // Allow sort
        $this->E214->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->E214->Param, "CustomMsg");
        $this->Fields['E214'] = &$this->E214;

        // E215
        $this->E215 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_E215', 'E215', '`E215`', '`E215`', 200, 45, -1, false, '`E215`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->E215->Sortable = true; // Allow sort
        $this->E215->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->E215->Param, "CustomMsg");
        $this->Fields['E215'] = &$this->E215;

        // E216
        $this->E216 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_E216', 'E216', '`E216`', '`E216`', 200, 45, -1, false, '`E216`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->E216->Sortable = true; // Allow sort
        $this->E216->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->E216->Param, "CustomMsg");
        $this->Fields['E216'] = &$this->E216;

        // E217
        $this->E217 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_E217', 'E217', '`E217`', '`E217`', 200, 45, -1, false, '`E217`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->E217->Sortable = true; // Allow sort
        $this->E217->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->E217->Param, "CustomMsg");
        $this->Fields['E217'] = &$this->E217;

        // E218
        $this->E218 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_E218', 'E218', '`E218`', '`E218`', 200, 45, -1, false, '`E218`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->E218->Sortable = true; // Allow sort
        $this->E218->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->E218->Param, "CustomMsg");
        $this->Fields['E218'] = &$this->E218;

        // E219
        $this->E219 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_E219', 'E219', '`E219`', '`E219`', 200, 45, -1, false, '`E219`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->E219->Sortable = true; // Allow sort
        $this->E219->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->E219->Param, "CustomMsg");
        $this->Fields['E219'] = &$this->E219;

        // E220
        $this->E220 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_E220', 'E220', '`E220`', '`E220`', 200, 45, -1, false, '`E220`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->E220->Sortable = true; // Allow sort
        $this->E220->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->E220->Param, "CustomMsg");
        $this->Fields['E220'] = &$this->E220;

        // E221
        $this->E221 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_E221', 'E221', '`E221`', '`E221`', 200, 45, -1, false, '`E221`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->E221->Sortable = true; // Allow sort
        $this->E221->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->E221->Param, "CustomMsg");
        $this->Fields['E221'] = &$this->E221;

        // E222
        $this->E222 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_E222', 'E222', '`E222`', '`E222`', 200, 45, -1, false, '`E222`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->E222->Sortable = true; // Allow sort
        $this->E222->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->E222->Param, "CustomMsg");
        $this->Fields['E222'] = &$this->E222;

        // E223
        $this->E223 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_E223', 'E223', '`E223`', '`E223`', 200, 45, -1, false, '`E223`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->E223->Sortable = true; // Allow sort
        $this->E223->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->E223->Param, "CustomMsg");
        $this->Fields['E223'] = &$this->E223;

        // E224
        $this->E224 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_E224', 'E224', '`E224`', '`E224`', 200, 45, -1, false, '`E224`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->E224->Sortable = true; // Allow sort
        $this->E224->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->E224->Param, "CustomMsg");
        $this->Fields['E224'] = &$this->E224;

        // E225
        $this->E225 = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_E225', 'E225', '`E225`', '`E225`', 200, 45, -1, false, '`E225`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->E225->Sortable = true; // Allow sort
        $this->E225->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->E225->Param, "CustomMsg");
        $this->Fields['E225'] = &$this->E225;

        // EEETTTDTE
        $this->EEETTTDTE = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_EEETTTDTE', 'EEETTTDTE', '`EEETTTDTE`', CastDateFieldForLike("`EEETTTDTE`", 7, "DB"), 135, 19, 7, false, '`EEETTTDTE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EEETTTDTE->Sortable = true; // Allow sort
        $this->EEETTTDTE->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->EEETTTDTE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EEETTTDTE->Param, "CustomMsg");
        $this->Fields['EEETTTDTE'] = &$this->EEETTTDTE;

        // bhcgdate
        $this->bhcgdate = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_bhcgdate', 'bhcgdate', '`bhcgdate`', CastDateFieldForLike("`bhcgdate`", 7, "DB"), 135, 19, 7, false, '`bhcgdate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->bhcgdate->Sortable = true; // Allow sort
        $this->bhcgdate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->bhcgdate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->bhcgdate->Param, "CustomMsg");
        $this->Fields['bhcgdate'] = &$this->bhcgdate;

        // TUBAL_PATENCY
        $this->TUBAL_PATENCY = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_TUBAL_PATENCY', 'TUBAL_PATENCY', '`TUBAL_PATENCY`', '`TUBAL_PATENCY`', 200, 45, -1, false, '`TUBAL_PATENCY`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->TUBAL_PATENCY->Sortable = true; // Allow sort
        $this->TUBAL_PATENCY->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->TUBAL_PATENCY->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->TUBAL_PATENCY->Lookup = new Lookup('TUBAL_PATENCY', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->TUBAL_PATENCY->OptionCount = 4;
        $this->TUBAL_PATENCY->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TUBAL_PATENCY->Param, "CustomMsg");
        $this->Fields['TUBAL_PATENCY'] = &$this->TUBAL_PATENCY;

        // HSG
        $this->HSG = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_HSG', 'HSG', '`HSG`', '`HSG`', 200, 45, -1, false, '`HSG`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->HSG->Sortable = true; // Allow sort
        $this->HSG->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->HSG->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->HSG->Lookup = new Lookup('HSG', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->HSG->OptionCount = 2;
        $this->HSG->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HSG->Param, "CustomMsg");
        $this->Fields['HSG'] = &$this->HSG;

        // DHL
        $this->DHL = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_DHL', 'DHL', '`DHL`', '`DHL`', 200, 45, -1, false, '`DHL`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->DHL->Sortable = true; // Allow sort
        $this->DHL->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->DHL->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->DHL->Lookup = new Lookup('DHL', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->DHL->OptionCount = 2;
        $this->DHL->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DHL->Param, "CustomMsg");
        $this->Fields['DHL'] = &$this->DHL;

        // UTERINE_PROBLEMS
        $this->UTERINE_PROBLEMS = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_UTERINE_PROBLEMS', 'UTERINE_PROBLEMS', '`UTERINE_PROBLEMS`', '`UTERINE_PROBLEMS`', 200, 45, -1, false, '`UTERINE_PROBLEMS`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->UTERINE_PROBLEMS->Sortable = true; // Allow sort
        $this->UTERINE_PROBLEMS->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->UTERINE_PROBLEMS->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->UTERINE_PROBLEMS->Lookup = new Lookup('UTERINE_PROBLEMS', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->UTERINE_PROBLEMS->OptionCount = 6;
        $this->UTERINE_PROBLEMS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->UTERINE_PROBLEMS->Param, "CustomMsg");
        $this->Fields['UTERINE_PROBLEMS'] = &$this->UTERINE_PROBLEMS;

        // W_COMORBIDS
        $this->W_COMORBIDS = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_W_COMORBIDS', 'W_COMORBIDS', '`W_COMORBIDS`', '`W_COMORBIDS`', 200, 45, -1, false, '`W_COMORBIDS`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->W_COMORBIDS->Sortable = true; // Allow sort
        $this->W_COMORBIDS->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->W_COMORBIDS->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->W_COMORBIDS->Lookup = new Lookup('W_COMORBIDS', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->W_COMORBIDS->OptionCount = 6;
        $this->W_COMORBIDS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->W_COMORBIDS->Param, "CustomMsg");
        $this->Fields['W_COMORBIDS'] = &$this->W_COMORBIDS;

        // H_COMORBIDS
        $this->H_COMORBIDS = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_H_COMORBIDS', 'H_COMORBIDS', '`H_COMORBIDS`', '`H_COMORBIDS`', 200, 45, -1, false, '`H_COMORBIDS`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->H_COMORBIDS->Sortable = true; // Allow sort
        $this->H_COMORBIDS->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->H_COMORBIDS->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->H_COMORBIDS->Lookup = new Lookup('H_COMORBIDS', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->H_COMORBIDS->OptionCount = 5;
        $this->H_COMORBIDS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->H_COMORBIDS->Param, "CustomMsg");
        $this->Fields['H_COMORBIDS'] = &$this->H_COMORBIDS;

        // SEXUAL_DYSFUNCTION
        $this->SEXUAL_DYSFUNCTION = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_SEXUAL_DYSFUNCTION', 'SEXUAL_DYSFUNCTION', '`SEXUAL_DYSFUNCTION`', '`SEXUAL_DYSFUNCTION`', 200, 45, -1, false, '`SEXUAL_DYSFUNCTION`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->SEXUAL_DYSFUNCTION->Sortable = true; // Allow sort
        $this->SEXUAL_DYSFUNCTION->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->SEXUAL_DYSFUNCTION->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->SEXUAL_DYSFUNCTION->Lookup = new Lookup('SEXUAL_DYSFUNCTION', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->SEXUAL_DYSFUNCTION->OptionCount = 2;
        $this->SEXUAL_DYSFUNCTION->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SEXUAL_DYSFUNCTION->Param, "CustomMsg");
        $this->Fields['SEXUAL_DYSFUNCTION'] = &$this->SEXUAL_DYSFUNCTION;

        // TABLETS
        $this->TABLETS = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_TABLETS', 'TABLETS', '`TABLETS`', '`TABLETS`', 200, 45, -1, false, '`TABLETS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TABLETS->Sortable = true; // Allow sort
        $this->TABLETS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TABLETS->Param, "CustomMsg");
        $this->Fields['TABLETS'] = &$this->TABLETS;

        // FOLLICLE_STATUS
        $this->FOLLICLE_STATUS = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_FOLLICLE_STATUS', 'FOLLICLE_STATUS', '`FOLLICLE_STATUS`', '`FOLLICLE_STATUS`', 200, 45, -1, false, '`FOLLICLE_STATUS`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->FOLLICLE_STATUS->Sortable = true; // Allow sort
        $this->FOLLICLE_STATUS->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->FOLLICLE_STATUS->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->FOLLICLE_STATUS->Lookup = new Lookup('FOLLICLE_STATUS', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->FOLLICLE_STATUS->OptionCount = 2;
        $this->FOLLICLE_STATUS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FOLLICLE_STATUS->Param, "CustomMsg");
        $this->Fields['FOLLICLE_STATUS'] = &$this->FOLLICLE_STATUS;

        // NUMBER_OF_IUI
        $this->NUMBER_OF_IUI = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_NUMBER_OF_IUI', 'NUMBER_OF_IUI', '`NUMBER_OF_IUI`', '`NUMBER_OF_IUI`', 200, 45, -1, false, '`NUMBER_OF_IUI`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->NUMBER_OF_IUI->Sortable = true; // Allow sort
        $this->NUMBER_OF_IUI->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->NUMBER_OF_IUI->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->NUMBER_OF_IUI->Lookup = new Lookup('NUMBER_OF_IUI', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->NUMBER_OF_IUI->OptionCount = 2;
        $this->NUMBER_OF_IUI->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->NUMBER_OF_IUI->Param, "CustomMsg");
        $this->Fields['NUMBER_OF_IUI'] = &$this->NUMBER_OF_IUI;

        // PROCEDURE
        $this->PROCEDURE = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_PROCEDURE', 'PROCEDURE', '`PROCEDURE`', '`PROCEDURE`', 200, 45, -1, false, '`PROCEDURE`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->PROCEDURE->Sortable = true; // Allow sort
        $this->PROCEDURE->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->PROCEDURE->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->PROCEDURE->Lookup = new Lookup('PROCEDURE', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->PROCEDURE->OptionCount = 4;
        $this->PROCEDURE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PROCEDURE->Param, "CustomMsg");
        $this->Fields['PROCEDURE'] = &$this->PROCEDURE;

        // LUTEAL_SUPPORT
        $this->LUTEAL_SUPPORT = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_LUTEAL_SUPPORT', 'LUTEAL_SUPPORT', '`LUTEAL_SUPPORT`', '`LUTEAL_SUPPORT`', 200, 45, -1, false, '`LUTEAL_SUPPORT`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->LUTEAL_SUPPORT->Sortable = true; // Allow sort
        $this->LUTEAL_SUPPORT->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->LUTEAL_SUPPORT->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->LUTEAL_SUPPORT->Lookup = new Lookup('LUTEAL_SUPPORT', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->LUTEAL_SUPPORT->OptionCount = 3;
        $this->LUTEAL_SUPPORT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->LUTEAL_SUPPORT->Param, "CustomMsg");
        $this->Fields['LUTEAL_SUPPORT'] = &$this->LUTEAL_SUPPORT;

        // SPECIFIC_MATERNAL_PROBLEMS
        $this->SPECIFIC_MATERNAL_PROBLEMS = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_SPECIFIC_MATERNAL_PROBLEMS', 'SPECIFIC_MATERNAL_PROBLEMS', '`SPECIFIC_MATERNAL_PROBLEMS`', '`SPECIFIC_MATERNAL_PROBLEMS`', 200, 45, -1, false, '`SPECIFIC_MATERNAL_PROBLEMS`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->SPECIFIC_MATERNAL_PROBLEMS->Sortable = true; // Allow sort
        $this->SPECIFIC_MATERNAL_PROBLEMS->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->SPECIFIC_MATERNAL_PROBLEMS->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->SPECIFIC_MATERNAL_PROBLEMS->Lookup = new Lookup('SPECIFIC_MATERNAL_PROBLEMS', 'ivf_stimulation_chart', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->SPECIFIC_MATERNAL_PROBLEMS->OptionCount = 2;
        $this->SPECIFIC_MATERNAL_PROBLEMS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SPECIFIC_MATERNAL_PROBLEMS->Param, "CustomMsg");
        $this->Fields['SPECIFIC_MATERNAL_PROBLEMS'] = &$this->SPECIFIC_MATERNAL_PROBLEMS;

        // ONGOING_PREG
        $this->ONGOING_PREG = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_ONGOING_PREG', 'ONGOING_PREG', '`ONGOING_PREG`', '`ONGOING_PREG`', 200, 45, -1, false, '`ONGOING_PREG`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ONGOING_PREG->Sortable = true; // Allow sort
        $this->ONGOING_PREG->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ONGOING_PREG->Param, "CustomMsg");
        $this->Fields['ONGOING_PREG'] = &$this->ONGOING_PREG;

        // EDD_Date
        $this->EDD_Date = new DbField('ivf_stimulation_chart', 'ivf_stimulation_chart', 'x_EDD_Date', 'EDD_Date', '`EDD_Date`', CastDateFieldForLike("`EDD_Date`", 0, "DB"), 135, 19, 0, false, '`EDD_Date`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EDD_Date->Sortable = true; // Allow sort
        $this->EDD_Date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->EDD_Date->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EDD_Date->Param, "CustomMsg");
        $this->Fields['EDD_Date'] = &$this->EDD_Date;
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

    // Table level SQL
    public function getSqlFrom() // From
    {
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`ivf_stimulation_chart`";
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
        return $this->SqlSelect ?? $this->getQueryBuilder()->select("*, '' AS `Projectron`");
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
        $this->FemaleFactor->DbValue = $row['FemaleFactor'];
        $this->MaleFactor->DbValue = $row['MaleFactor'];
        $this->Protocol->DbValue = $row['Protocol'];
        $this->SemenFrozen->DbValue = $row['SemenFrozen'];
        $this->A4ICSICycle->DbValue = $row['A4ICSICycle'];
        $this->TotalICSICycle->DbValue = $row['TotalICSICycle'];
        $this->TypeOfInfertility->DbValue = $row['TypeOfInfertility'];
        $this->Duration->DbValue = $row['Duration'];
        $this->LMP->DbValue = $row['LMP'];
        $this->RelevantHistory->DbValue = $row['RelevantHistory'];
        $this->IUICycles->DbValue = $row['IUICycles'];
        $this->AFC->DbValue = $row['AFC'];
        $this->AMH->DbValue = $row['AMH'];
        $this->FBMI->DbValue = $row['FBMI'];
        $this->MBMI->DbValue = $row['MBMI'];
        $this->OvarianVolumeRT->DbValue = $row['OvarianVolumeRT'];
        $this->OvarianVolumeLT->DbValue = $row['OvarianVolumeLT'];
        $this->DAYSOFSTIMULATION->DbValue = $row['DAYSOFSTIMULATION'];
        $this->DOSEOFGONADOTROPINS->DbValue = $row['DOSEOFGONADOTROPINS'];
        $this->INJTYPE->DbValue = $row['INJTYPE'];
        $this->ANTAGONISTDAYS->DbValue = $row['ANTAGONISTDAYS'];
        $this->ANTAGONISTSTARTDAY->DbValue = $row['ANTAGONISTSTARTDAY'];
        $this->GROWTHHORMONE->DbValue = $row['GROWTHHORMONE'];
        $this->PRETREATMENT->DbValue = $row['PRETREATMENT'];
        $this->SerumP4->DbValue = $row['SerumP4'];
        $this->FORT->DbValue = $row['FORT'];
        $this->MedicalFactors->DbValue = $row['MedicalFactors'];
        $this->SCDate->DbValue = $row['SCDate'];
        $this->OvarianSurgery->DbValue = $row['OvarianSurgery'];
        $this->PreProcedureOrder->DbValue = $row['PreProcedureOrder'];
        $this->TRIGGERR->DbValue = $row['TRIGGERR'];
        $this->TRIGGERDATE->DbValue = $row['TRIGGERDATE'];
        $this->ATHOMEorCLINIC->DbValue = $row['ATHOMEorCLINIC'];
        $this->OPUDATE->DbValue = $row['OPUDATE'];
        $this->ALLFREEZEINDICATION->DbValue = $row['ALLFREEZEINDICATION'];
        $this->ERA->DbValue = $row['ERA'];
        $this->PGTA->DbValue = $row['PGTA'];
        $this->PGD->DbValue = $row['PGD'];
        $this->DATEOFET->DbValue = $row['DATEOFET'];
        $this->ET->DbValue = $row['ET'];
        $this->ESET->DbValue = $row['ESET'];
        $this->DOET->DbValue = $row['DOET'];
        $this->SEMENPREPARATION->DbValue = $row['SEMENPREPARATION'];
        $this->REASONFORESET->DbValue = $row['REASONFORESET'];
        $this->Expectedoocytes->DbValue = $row['Expectedoocytes'];
        $this->StChDate1->DbValue = $row['StChDate1'];
        $this->StChDate2->DbValue = $row['StChDate2'];
        $this->StChDate3->DbValue = $row['StChDate3'];
        $this->StChDate4->DbValue = $row['StChDate4'];
        $this->StChDate5->DbValue = $row['StChDate5'];
        $this->StChDate6->DbValue = $row['StChDate6'];
        $this->StChDate7->DbValue = $row['StChDate7'];
        $this->StChDate8->DbValue = $row['StChDate8'];
        $this->StChDate9->DbValue = $row['StChDate9'];
        $this->StChDate10->DbValue = $row['StChDate10'];
        $this->StChDate11->DbValue = $row['StChDate11'];
        $this->StChDate12->DbValue = $row['StChDate12'];
        $this->StChDate13->DbValue = $row['StChDate13'];
        $this->CycleDay1->DbValue = $row['CycleDay1'];
        $this->CycleDay2->DbValue = $row['CycleDay2'];
        $this->CycleDay3->DbValue = $row['CycleDay3'];
        $this->CycleDay4->DbValue = $row['CycleDay4'];
        $this->CycleDay5->DbValue = $row['CycleDay5'];
        $this->CycleDay6->DbValue = $row['CycleDay6'];
        $this->CycleDay7->DbValue = $row['CycleDay7'];
        $this->CycleDay8->DbValue = $row['CycleDay8'];
        $this->CycleDay9->DbValue = $row['CycleDay9'];
        $this->CycleDay10->DbValue = $row['CycleDay10'];
        $this->CycleDay11->DbValue = $row['CycleDay11'];
        $this->CycleDay12->DbValue = $row['CycleDay12'];
        $this->CycleDay13->DbValue = $row['CycleDay13'];
        $this->StimulationDay1->DbValue = $row['StimulationDay1'];
        $this->StimulationDay2->DbValue = $row['StimulationDay2'];
        $this->StimulationDay3->DbValue = $row['StimulationDay3'];
        $this->StimulationDay4->DbValue = $row['StimulationDay4'];
        $this->StimulationDay5->DbValue = $row['StimulationDay5'];
        $this->StimulationDay6->DbValue = $row['StimulationDay6'];
        $this->StimulationDay7->DbValue = $row['StimulationDay7'];
        $this->StimulationDay8->DbValue = $row['StimulationDay8'];
        $this->StimulationDay9->DbValue = $row['StimulationDay9'];
        $this->StimulationDay10->DbValue = $row['StimulationDay10'];
        $this->StimulationDay11->DbValue = $row['StimulationDay11'];
        $this->StimulationDay12->DbValue = $row['StimulationDay12'];
        $this->StimulationDay13->DbValue = $row['StimulationDay13'];
        $this->Tablet1->DbValue = $row['Tablet1'];
        $this->Tablet2->DbValue = $row['Tablet2'];
        $this->Tablet3->DbValue = $row['Tablet3'];
        $this->Tablet4->DbValue = $row['Tablet4'];
        $this->Tablet5->DbValue = $row['Tablet5'];
        $this->Tablet6->DbValue = $row['Tablet6'];
        $this->Tablet7->DbValue = $row['Tablet7'];
        $this->Tablet8->DbValue = $row['Tablet8'];
        $this->Tablet9->DbValue = $row['Tablet9'];
        $this->Tablet10->DbValue = $row['Tablet10'];
        $this->Tablet11->DbValue = $row['Tablet11'];
        $this->Tablet12->DbValue = $row['Tablet12'];
        $this->Tablet13->DbValue = $row['Tablet13'];
        $this->RFSH1->DbValue = $row['RFSH1'];
        $this->RFSH2->DbValue = $row['RFSH2'];
        $this->RFSH3->DbValue = $row['RFSH3'];
        $this->RFSH4->DbValue = $row['RFSH4'];
        $this->RFSH5->DbValue = $row['RFSH5'];
        $this->RFSH6->DbValue = $row['RFSH6'];
        $this->RFSH7->DbValue = $row['RFSH7'];
        $this->RFSH8->DbValue = $row['RFSH8'];
        $this->RFSH9->DbValue = $row['RFSH9'];
        $this->RFSH10->DbValue = $row['RFSH10'];
        $this->RFSH11->DbValue = $row['RFSH11'];
        $this->RFSH12->DbValue = $row['RFSH12'];
        $this->RFSH13->DbValue = $row['RFSH13'];
        $this->HMG1->DbValue = $row['HMG1'];
        $this->HMG2->DbValue = $row['HMG2'];
        $this->HMG3->DbValue = $row['HMG3'];
        $this->HMG4->DbValue = $row['HMG4'];
        $this->HMG5->DbValue = $row['HMG5'];
        $this->HMG6->DbValue = $row['HMG6'];
        $this->HMG7->DbValue = $row['HMG7'];
        $this->HMG8->DbValue = $row['HMG8'];
        $this->HMG9->DbValue = $row['HMG9'];
        $this->HMG10->DbValue = $row['HMG10'];
        $this->HMG11->DbValue = $row['HMG11'];
        $this->HMG12->DbValue = $row['HMG12'];
        $this->HMG13->DbValue = $row['HMG13'];
        $this->GnRH1->DbValue = $row['GnRH1'];
        $this->GnRH2->DbValue = $row['GnRH2'];
        $this->GnRH3->DbValue = $row['GnRH3'];
        $this->GnRH4->DbValue = $row['GnRH4'];
        $this->GnRH5->DbValue = $row['GnRH5'];
        $this->GnRH6->DbValue = $row['GnRH6'];
        $this->GnRH7->DbValue = $row['GnRH7'];
        $this->GnRH8->DbValue = $row['GnRH8'];
        $this->GnRH9->DbValue = $row['GnRH9'];
        $this->GnRH10->DbValue = $row['GnRH10'];
        $this->GnRH11->DbValue = $row['GnRH11'];
        $this->GnRH12->DbValue = $row['GnRH12'];
        $this->GnRH13->DbValue = $row['GnRH13'];
        $this->E21->DbValue = $row['E21'];
        $this->E22->DbValue = $row['E22'];
        $this->E23->DbValue = $row['E23'];
        $this->E24->DbValue = $row['E24'];
        $this->E25->DbValue = $row['E25'];
        $this->E26->DbValue = $row['E26'];
        $this->E27->DbValue = $row['E27'];
        $this->E28->DbValue = $row['E28'];
        $this->E29->DbValue = $row['E29'];
        $this->E210->DbValue = $row['E210'];
        $this->E211->DbValue = $row['E211'];
        $this->E212->DbValue = $row['E212'];
        $this->E213->DbValue = $row['E213'];
        $this->P41->DbValue = $row['P41'];
        $this->P42->DbValue = $row['P42'];
        $this->P43->DbValue = $row['P43'];
        $this->P44->DbValue = $row['P44'];
        $this->P45->DbValue = $row['P45'];
        $this->P46->DbValue = $row['P46'];
        $this->P47->DbValue = $row['P47'];
        $this->P48->DbValue = $row['P48'];
        $this->P49->DbValue = $row['P49'];
        $this->P410->DbValue = $row['P410'];
        $this->P411->DbValue = $row['P411'];
        $this->P412->DbValue = $row['P412'];
        $this->P413->DbValue = $row['P413'];
        $this->USGRt1->DbValue = $row['USGRt1'];
        $this->USGRt2->DbValue = $row['USGRt2'];
        $this->USGRt3->DbValue = $row['USGRt3'];
        $this->USGRt4->DbValue = $row['USGRt4'];
        $this->USGRt5->DbValue = $row['USGRt5'];
        $this->USGRt6->DbValue = $row['USGRt6'];
        $this->USGRt7->DbValue = $row['USGRt7'];
        $this->USGRt8->DbValue = $row['USGRt8'];
        $this->USGRt9->DbValue = $row['USGRt9'];
        $this->USGRt10->DbValue = $row['USGRt10'];
        $this->USGRt11->DbValue = $row['USGRt11'];
        $this->USGRt12->DbValue = $row['USGRt12'];
        $this->USGRt13->DbValue = $row['USGRt13'];
        $this->USGLt1->DbValue = $row['USGLt1'];
        $this->USGLt2->DbValue = $row['USGLt2'];
        $this->USGLt3->DbValue = $row['USGLt3'];
        $this->USGLt4->DbValue = $row['USGLt4'];
        $this->USGLt5->DbValue = $row['USGLt5'];
        $this->USGLt6->DbValue = $row['USGLt6'];
        $this->USGLt7->DbValue = $row['USGLt7'];
        $this->USGLt8->DbValue = $row['USGLt8'];
        $this->USGLt9->DbValue = $row['USGLt9'];
        $this->USGLt10->DbValue = $row['USGLt10'];
        $this->USGLt11->DbValue = $row['USGLt11'];
        $this->USGLt12->DbValue = $row['USGLt12'];
        $this->USGLt13->DbValue = $row['USGLt13'];
        $this->EM1->DbValue = $row['EM1'];
        $this->EM2->DbValue = $row['EM2'];
        $this->EM3->DbValue = $row['EM3'];
        $this->EM4->DbValue = $row['EM4'];
        $this->EM5->DbValue = $row['EM5'];
        $this->EM6->DbValue = $row['EM6'];
        $this->EM7->DbValue = $row['EM7'];
        $this->EM8->DbValue = $row['EM8'];
        $this->EM9->DbValue = $row['EM9'];
        $this->EM10->DbValue = $row['EM10'];
        $this->EM11->DbValue = $row['EM11'];
        $this->EM12->DbValue = $row['EM12'];
        $this->EM13->DbValue = $row['EM13'];
        $this->Others1->DbValue = $row['Others1'];
        $this->Others2->DbValue = $row['Others2'];
        $this->Others3->DbValue = $row['Others3'];
        $this->Others4->DbValue = $row['Others4'];
        $this->Others5->DbValue = $row['Others5'];
        $this->Others6->DbValue = $row['Others6'];
        $this->Others7->DbValue = $row['Others7'];
        $this->Others8->DbValue = $row['Others8'];
        $this->Others9->DbValue = $row['Others9'];
        $this->Others10->DbValue = $row['Others10'];
        $this->Others11->DbValue = $row['Others11'];
        $this->Others12->DbValue = $row['Others12'];
        $this->Others13->DbValue = $row['Others13'];
        $this->DR1->DbValue = $row['DR1'];
        $this->DR2->DbValue = $row['DR2'];
        $this->DR3->DbValue = $row['DR3'];
        $this->DR4->DbValue = $row['DR4'];
        $this->DR5->DbValue = $row['DR5'];
        $this->DR6->DbValue = $row['DR6'];
        $this->DR7->DbValue = $row['DR7'];
        $this->DR8->DbValue = $row['DR8'];
        $this->DR9->DbValue = $row['DR9'];
        $this->DR10->DbValue = $row['DR10'];
        $this->DR11->DbValue = $row['DR11'];
        $this->DR12->DbValue = $row['DR12'];
        $this->DR13->DbValue = $row['DR13'];
        $this->DOCTORRESPONSIBLE->DbValue = $row['DOCTORRESPONSIBLE'];
        $this->TidNo->DbValue = $row['TidNo'];
        $this->Convert->DbValue = $row['Convert'];
        $this->Consultant->DbValue = $row['Consultant'];
        $this->InseminatinTechnique->DbValue = $row['InseminatinTechnique'];
        $this->IndicationForART->DbValue = $row['IndicationForART'];
        $this->Hysteroscopy->DbValue = $row['Hysteroscopy'];
        $this->EndometrialScratching->DbValue = $row['EndometrialScratching'];
        $this->TrialCannulation->DbValue = $row['TrialCannulation'];
        $this->CYCLETYPE->DbValue = $row['CYCLETYPE'];
        $this->HRTCYCLE->DbValue = $row['HRTCYCLE'];
        $this->OralEstrogenDosage->DbValue = $row['OralEstrogenDosage'];
        $this->VaginalEstrogen->DbValue = $row['VaginalEstrogen'];
        $this->GCSF->DbValue = $row['GCSF'];
        $this->ActivatedPRP->DbValue = $row['ActivatedPRP'];
        $this->UCLcm->DbValue = $row['UCLcm'];
        $this->DATOFEMBRYOTRANSFER->DbValue = $row['DATOFEMBRYOTRANSFER'];
        $this->DAYOFEMBRYOTRANSFER->DbValue = $row['DAYOFEMBRYOTRANSFER'];
        $this->NOOFEMBRYOSTHAWED->DbValue = $row['NOOFEMBRYOSTHAWED'];
        $this->NOOFEMBRYOSTRANSFERRED->DbValue = $row['NOOFEMBRYOSTRANSFERRED'];
        $this->DAYOFEMBRYOS->DbValue = $row['DAYOFEMBRYOS'];
        $this->CRYOPRESERVEDEMBRYOS->DbValue = $row['CRYOPRESERVEDEMBRYOS'];
        $this->ViaAdmin->DbValue = $row['ViaAdmin'];
        $this->ViaStartDateTime->DbValue = $row['ViaStartDateTime'];
        $this->ViaDose->DbValue = $row['ViaDose'];
        $this->AllFreeze->DbValue = $row['AllFreeze'];
        $this->TreatmentCancel->DbValue = $row['TreatmentCancel'];
        $this->Reason->DbValue = $row['Reason'];
        $this->ProgesteroneAdmin->DbValue = $row['ProgesteroneAdmin'];
        $this->ProgesteroneStart->DbValue = $row['ProgesteroneStart'];
        $this->ProgesteroneDose->DbValue = $row['ProgesteroneDose'];
        $this->Projectron->DbValue = $row['Projectron'];
        $this->StChDate14->DbValue = $row['StChDate14'];
        $this->StChDate15->DbValue = $row['StChDate15'];
        $this->StChDate16->DbValue = $row['StChDate16'];
        $this->StChDate17->DbValue = $row['StChDate17'];
        $this->StChDate18->DbValue = $row['StChDate18'];
        $this->StChDate19->DbValue = $row['StChDate19'];
        $this->StChDate20->DbValue = $row['StChDate20'];
        $this->StChDate21->DbValue = $row['StChDate21'];
        $this->StChDate22->DbValue = $row['StChDate22'];
        $this->StChDate23->DbValue = $row['StChDate23'];
        $this->StChDate24->DbValue = $row['StChDate24'];
        $this->StChDate25->DbValue = $row['StChDate25'];
        $this->CycleDay14->DbValue = $row['CycleDay14'];
        $this->CycleDay15->DbValue = $row['CycleDay15'];
        $this->CycleDay16->DbValue = $row['CycleDay16'];
        $this->CycleDay17->DbValue = $row['CycleDay17'];
        $this->CycleDay18->DbValue = $row['CycleDay18'];
        $this->CycleDay19->DbValue = $row['CycleDay19'];
        $this->CycleDay20->DbValue = $row['CycleDay20'];
        $this->CycleDay21->DbValue = $row['CycleDay21'];
        $this->CycleDay22->DbValue = $row['CycleDay22'];
        $this->CycleDay23->DbValue = $row['CycleDay23'];
        $this->CycleDay24->DbValue = $row['CycleDay24'];
        $this->CycleDay25->DbValue = $row['CycleDay25'];
        $this->StimulationDay14->DbValue = $row['StimulationDay14'];
        $this->StimulationDay15->DbValue = $row['StimulationDay15'];
        $this->StimulationDay16->DbValue = $row['StimulationDay16'];
        $this->StimulationDay17->DbValue = $row['StimulationDay17'];
        $this->StimulationDay18->DbValue = $row['StimulationDay18'];
        $this->StimulationDay19->DbValue = $row['StimulationDay19'];
        $this->StimulationDay20->DbValue = $row['StimulationDay20'];
        $this->StimulationDay21->DbValue = $row['StimulationDay21'];
        $this->StimulationDay22->DbValue = $row['StimulationDay22'];
        $this->StimulationDay23->DbValue = $row['StimulationDay23'];
        $this->StimulationDay24->DbValue = $row['StimulationDay24'];
        $this->StimulationDay25->DbValue = $row['StimulationDay25'];
        $this->Tablet14->DbValue = $row['Tablet14'];
        $this->Tablet15->DbValue = $row['Tablet15'];
        $this->Tablet16->DbValue = $row['Tablet16'];
        $this->Tablet17->DbValue = $row['Tablet17'];
        $this->Tablet18->DbValue = $row['Tablet18'];
        $this->Tablet19->DbValue = $row['Tablet19'];
        $this->Tablet20->DbValue = $row['Tablet20'];
        $this->Tablet21->DbValue = $row['Tablet21'];
        $this->Tablet22->DbValue = $row['Tablet22'];
        $this->Tablet23->DbValue = $row['Tablet23'];
        $this->Tablet24->DbValue = $row['Tablet24'];
        $this->Tablet25->DbValue = $row['Tablet25'];
        $this->RFSH14->DbValue = $row['RFSH14'];
        $this->RFSH15->DbValue = $row['RFSH15'];
        $this->RFSH16->DbValue = $row['RFSH16'];
        $this->RFSH17->DbValue = $row['RFSH17'];
        $this->RFSH18->DbValue = $row['RFSH18'];
        $this->RFSH19->DbValue = $row['RFSH19'];
        $this->RFSH20->DbValue = $row['RFSH20'];
        $this->RFSH21->DbValue = $row['RFSH21'];
        $this->RFSH22->DbValue = $row['RFSH22'];
        $this->RFSH23->DbValue = $row['RFSH23'];
        $this->RFSH24->DbValue = $row['RFSH24'];
        $this->RFSH25->DbValue = $row['RFSH25'];
        $this->HMG14->DbValue = $row['HMG14'];
        $this->HMG15->DbValue = $row['HMG15'];
        $this->HMG16->DbValue = $row['HMG16'];
        $this->HMG17->DbValue = $row['HMG17'];
        $this->HMG18->DbValue = $row['HMG18'];
        $this->HMG19->DbValue = $row['HMG19'];
        $this->HMG20->DbValue = $row['HMG20'];
        $this->HMG21->DbValue = $row['HMG21'];
        $this->HMG22->DbValue = $row['HMG22'];
        $this->HMG23->DbValue = $row['HMG23'];
        $this->HMG24->DbValue = $row['HMG24'];
        $this->HMG25->DbValue = $row['HMG25'];
        $this->GnRH14->DbValue = $row['GnRH14'];
        $this->GnRH15->DbValue = $row['GnRH15'];
        $this->GnRH16->DbValue = $row['GnRH16'];
        $this->GnRH17->DbValue = $row['GnRH17'];
        $this->GnRH18->DbValue = $row['GnRH18'];
        $this->GnRH19->DbValue = $row['GnRH19'];
        $this->GnRH20->DbValue = $row['GnRH20'];
        $this->GnRH21->DbValue = $row['GnRH21'];
        $this->GnRH22->DbValue = $row['GnRH22'];
        $this->GnRH23->DbValue = $row['GnRH23'];
        $this->GnRH24->DbValue = $row['GnRH24'];
        $this->GnRH25->DbValue = $row['GnRH25'];
        $this->P414->DbValue = $row['P414'];
        $this->P415->DbValue = $row['P415'];
        $this->P416->DbValue = $row['P416'];
        $this->P417->DbValue = $row['P417'];
        $this->P418->DbValue = $row['P418'];
        $this->P419->DbValue = $row['P419'];
        $this->P420->DbValue = $row['P420'];
        $this->P421->DbValue = $row['P421'];
        $this->P422->DbValue = $row['P422'];
        $this->P423->DbValue = $row['P423'];
        $this->P424->DbValue = $row['P424'];
        $this->P425->DbValue = $row['P425'];
        $this->USGRt14->DbValue = $row['USGRt14'];
        $this->USGRt15->DbValue = $row['USGRt15'];
        $this->USGRt16->DbValue = $row['USGRt16'];
        $this->USGRt17->DbValue = $row['USGRt17'];
        $this->USGRt18->DbValue = $row['USGRt18'];
        $this->USGRt19->DbValue = $row['USGRt19'];
        $this->USGRt20->DbValue = $row['USGRt20'];
        $this->USGRt21->DbValue = $row['USGRt21'];
        $this->USGRt22->DbValue = $row['USGRt22'];
        $this->USGRt23->DbValue = $row['USGRt23'];
        $this->USGRt24->DbValue = $row['USGRt24'];
        $this->USGRt25->DbValue = $row['USGRt25'];
        $this->USGLt14->DbValue = $row['USGLt14'];
        $this->USGLt15->DbValue = $row['USGLt15'];
        $this->USGLt16->DbValue = $row['USGLt16'];
        $this->USGLt17->DbValue = $row['USGLt17'];
        $this->USGLt18->DbValue = $row['USGLt18'];
        $this->USGLt19->DbValue = $row['USGLt19'];
        $this->USGLt20->DbValue = $row['USGLt20'];
        $this->USGLt21->DbValue = $row['USGLt21'];
        $this->USGLt22->DbValue = $row['USGLt22'];
        $this->USGLt23->DbValue = $row['USGLt23'];
        $this->USGLt24->DbValue = $row['USGLt24'];
        $this->USGLt25->DbValue = $row['USGLt25'];
        $this->EM14->DbValue = $row['EM14'];
        $this->EM15->DbValue = $row['EM15'];
        $this->EM16->DbValue = $row['EM16'];
        $this->EM17->DbValue = $row['EM17'];
        $this->EM18->DbValue = $row['EM18'];
        $this->EM19->DbValue = $row['EM19'];
        $this->EM20->DbValue = $row['EM20'];
        $this->EM21->DbValue = $row['EM21'];
        $this->EM22->DbValue = $row['EM22'];
        $this->EM23->DbValue = $row['EM23'];
        $this->EM24->DbValue = $row['EM24'];
        $this->EM25->DbValue = $row['EM25'];
        $this->Others14->DbValue = $row['Others14'];
        $this->Others15->DbValue = $row['Others15'];
        $this->Others16->DbValue = $row['Others16'];
        $this->Others17->DbValue = $row['Others17'];
        $this->Others18->DbValue = $row['Others18'];
        $this->Others19->DbValue = $row['Others19'];
        $this->Others20->DbValue = $row['Others20'];
        $this->Others21->DbValue = $row['Others21'];
        $this->Others22->DbValue = $row['Others22'];
        $this->Others23->DbValue = $row['Others23'];
        $this->Others24->DbValue = $row['Others24'];
        $this->Others25->DbValue = $row['Others25'];
        $this->DR14->DbValue = $row['DR14'];
        $this->DR15->DbValue = $row['DR15'];
        $this->DR16->DbValue = $row['DR16'];
        $this->DR17->DbValue = $row['DR17'];
        $this->DR18->DbValue = $row['DR18'];
        $this->DR19->DbValue = $row['DR19'];
        $this->DR20->DbValue = $row['DR20'];
        $this->DR21->DbValue = $row['DR21'];
        $this->DR22->DbValue = $row['DR22'];
        $this->DR23->DbValue = $row['DR23'];
        $this->DR24->DbValue = $row['DR24'];
        $this->DR25->DbValue = $row['DR25'];
        $this->E214->DbValue = $row['E214'];
        $this->E215->DbValue = $row['E215'];
        $this->E216->DbValue = $row['E216'];
        $this->E217->DbValue = $row['E217'];
        $this->E218->DbValue = $row['E218'];
        $this->E219->DbValue = $row['E219'];
        $this->E220->DbValue = $row['E220'];
        $this->E221->DbValue = $row['E221'];
        $this->E222->DbValue = $row['E222'];
        $this->E223->DbValue = $row['E223'];
        $this->E224->DbValue = $row['E224'];
        $this->E225->DbValue = $row['E225'];
        $this->EEETTTDTE->DbValue = $row['EEETTTDTE'];
        $this->bhcgdate->DbValue = $row['bhcgdate'];
        $this->TUBAL_PATENCY->DbValue = $row['TUBAL_PATENCY'];
        $this->HSG->DbValue = $row['HSG'];
        $this->DHL->DbValue = $row['DHL'];
        $this->UTERINE_PROBLEMS->DbValue = $row['UTERINE_PROBLEMS'];
        $this->W_COMORBIDS->DbValue = $row['W_COMORBIDS'];
        $this->H_COMORBIDS->DbValue = $row['H_COMORBIDS'];
        $this->SEXUAL_DYSFUNCTION->DbValue = $row['SEXUAL_DYSFUNCTION'];
        $this->TABLETS->DbValue = $row['TABLETS'];
        $this->FOLLICLE_STATUS->DbValue = $row['FOLLICLE_STATUS'];
        $this->NUMBER_OF_IUI->DbValue = $row['NUMBER_OF_IUI'];
        $this->PROCEDURE->DbValue = $row['PROCEDURE'];
        $this->LUTEAL_SUPPORT->DbValue = $row['LUTEAL_SUPPORT'];
        $this->SPECIFIC_MATERNAL_PROBLEMS->DbValue = $row['SPECIFIC_MATERNAL_PROBLEMS'];
        $this->ONGOING_PREG->DbValue = $row['ONGOING_PREG'];
        $this->EDD_Date->DbValue = $row['EDD_Date'];
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
        return $_SESSION[$name] ?? GetUrl("IvfStimulationChartList");
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
        if ($pageName == "IvfStimulationChartView") {
            return $Language->phrase("View");
        } elseif ($pageName == "IvfStimulationChartEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "IvfStimulationChartAdd") {
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
                return "IvfStimulationChartView";
            case Config("API_ADD_ACTION"):
                return "IvfStimulationChartAdd";
            case Config("API_EDIT_ACTION"):
                return "IvfStimulationChartEdit";
            case Config("API_DELETE_ACTION"):
                return "IvfStimulationChartDelete";
            case Config("API_LIST_ACTION"):
                return "IvfStimulationChartList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "IvfStimulationChartList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("IvfStimulationChartView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("IvfStimulationChartView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "IvfStimulationChartAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "IvfStimulationChartAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("IvfStimulationChartEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("IvfStimulationChartAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("IvfStimulationChartDelete", $this->getUrlParm());
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
        $this->FemaleFactor->setDbValue($row['FemaleFactor']);
        $this->MaleFactor->setDbValue($row['MaleFactor']);
        $this->Protocol->setDbValue($row['Protocol']);
        $this->SemenFrozen->setDbValue($row['SemenFrozen']);
        $this->A4ICSICycle->setDbValue($row['A4ICSICycle']);
        $this->TotalICSICycle->setDbValue($row['TotalICSICycle']);
        $this->TypeOfInfertility->setDbValue($row['TypeOfInfertility']);
        $this->Duration->setDbValue($row['Duration']);
        $this->LMP->setDbValue($row['LMP']);
        $this->RelevantHistory->setDbValue($row['RelevantHistory']);
        $this->IUICycles->setDbValue($row['IUICycles']);
        $this->AFC->setDbValue($row['AFC']);
        $this->AMH->setDbValue($row['AMH']);
        $this->FBMI->setDbValue($row['FBMI']);
        $this->MBMI->setDbValue($row['MBMI']);
        $this->OvarianVolumeRT->setDbValue($row['OvarianVolumeRT']);
        $this->OvarianVolumeLT->setDbValue($row['OvarianVolumeLT']);
        $this->DAYSOFSTIMULATION->setDbValue($row['DAYSOFSTIMULATION']);
        $this->DOSEOFGONADOTROPINS->setDbValue($row['DOSEOFGONADOTROPINS']);
        $this->INJTYPE->setDbValue($row['INJTYPE']);
        $this->ANTAGONISTDAYS->setDbValue($row['ANTAGONISTDAYS']);
        $this->ANTAGONISTSTARTDAY->setDbValue($row['ANTAGONISTSTARTDAY']);
        $this->GROWTHHORMONE->setDbValue($row['GROWTHHORMONE']);
        $this->PRETREATMENT->setDbValue($row['PRETREATMENT']);
        $this->SerumP4->setDbValue($row['SerumP4']);
        $this->FORT->setDbValue($row['FORT']);
        $this->MedicalFactors->setDbValue($row['MedicalFactors']);
        $this->SCDate->setDbValue($row['SCDate']);
        $this->OvarianSurgery->setDbValue($row['OvarianSurgery']);
        $this->PreProcedureOrder->setDbValue($row['PreProcedureOrder']);
        $this->TRIGGERR->setDbValue($row['TRIGGERR']);
        $this->TRIGGERDATE->setDbValue($row['TRIGGERDATE']);
        $this->ATHOMEorCLINIC->setDbValue($row['ATHOMEorCLINIC']);
        $this->OPUDATE->setDbValue($row['OPUDATE']);
        $this->ALLFREEZEINDICATION->setDbValue($row['ALLFREEZEINDICATION']);
        $this->ERA->setDbValue($row['ERA']);
        $this->PGTA->setDbValue($row['PGTA']);
        $this->PGD->setDbValue($row['PGD']);
        $this->DATEOFET->setDbValue($row['DATEOFET']);
        $this->ET->setDbValue($row['ET']);
        $this->ESET->setDbValue($row['ESET']);
        $this->DOET->setDbValue($row['DOET']);
        $this->SEMENPREPARATION->setDbValue($row['SEMENPREPARATION']);
        $this->REASONFORESET->setDbValue($row['REASONFORESET']);
        $this->Expectedoocytes->setDbValue($row['Expectedoocytes']);
        $this->StChDate1->setDbValue($row['StChDate1']);
        $this->StChDate2->setDbValue($row['StChDate2']);
        $this->StChDate3->setDbValue($row['StChDate3']);
        $this->StChDate4->setDbValue($row['StChDate4']);
        $this->StChDate5->setDbValue($row['StChDate5']);
        $this->StChDate6->setDbValue($row['StChDate6']);
        $this->StChDate7->setDbValue($row['StChDate7']);
        $this->StChDate8->setDbValue($row['StChDate8']);
        $this->StChDate9->setDbValue($row['StChDate9']);
        $this->StChDate10->setDbValue($row['StChDate10']);
        $this->StChDate11->setDbValue($row['StChDate11']);
        $this->StChDate12->setDbValue($row['StChDate12']);
        $this->StChDate13->setDbValue($row['StChDate13']);
        $this->CycleDay1->setDbValue($row['CycleDay1']);
        $this->CycleDay2->setDbValue($row['CycleDay2']);
        $this->CycleDay3->setDbValue($row['CycleDay3']);
        $this->CycleDay4->setDbValue($row['CycleDay4']);
        $this->CycleDay5->setDbValue($row['CycleDay5']);
        $this->CycleDay6->setDbValue($row['CycleDay6']);
        $this->CycleDay7->setDbValue($row['CycleDay7']);
        $this->CycleDay8->setDbValue($row['CycleDay8']);
        $this->CycleDay9->setDbValue($row['CycleDay9']);
        $this->CycleDay10->setDbValue($row['CycleDay10']);
        $this->CycleDay11->setDbValue($row['CycleDay11']);
        $this->CycleDay12->setDbValue($row['CycleDay12']);
        $this->CycleDay13->setDbValue($row['CycleDay13']);
        $this->StimulationDay1->setDbValue($row['StimulationDay1']);
        $this->StimulationDay2->setDbValue($row['StimulationDay2']);
        $this->StimulationDay3->setDbValue($row['StimulationDay3']);
        $this->StimulationDay4->setDbValue($row['StimulationDay4']);
        $this->StimulationDay5->setDbValue($row['StimulationDay5']);
        $this->StimulationDay6->setDbValue($row['StimulationDay6']);
        $this->StimulationDay7->setDbValue($row['StimulationDay7']);
        $this->StimulationDay8->setDbValue($row['StimulationDay8']);
        $this->StimulationDay9->setDbValue($row['StimulationDay9']);
        $this->StimulationDay10->setDbValue($row['StimulationDay10']);
        $this->StimulationDay11->setDbValue($row['StimulationDay11']);
        $this->StimulationDay12->setDbValue($row['StimulationDay12']);
        $this->StimulationDay13->setDbValue($row['StimulationDay13']);
        $this->Tablet1->setDbValue($row['Tablet1']);
        $this->Tablet2->setDbValue($row['Tablet2']);
        $this->Tablet3->setDbValue($row['Tablet3']);
        $this->Tablet4->setDbValue($row['Tablet4']);
        $this->Tablet5->setDbValue($row['Tablet5']);
        $this->Tablet6->setDbValue($row['Tablet6']);
        $this->Tablet7->setDbValue($row['Tablet7']);
        $this->Tablet8->setDbValue($row['Tablet8']);
        $this->Tablet9->setDbValue($row['Tablet9']);
        $this->Tablet10->setDbValue($row['Tablet10']);
        $this->Tablet11->setDbValue($row['Tablet11']);
        $this->Tablet12->setDbValue($row['Tablet12']);
        $this->Tablet13->setDbValue($row['Tablet13']);
        $this->RFSH1->setDbValue($row['RFSH1']);
        $this->RFSH2->setDbValue($row['RFSH2']);
        $this->RFSH3->setDbValue($row['RFSH3']);
        $this->RFSH4->setDbValue($row['RFSH4']);
        $this->RFSH5->setDbValue($row['RFSH5']);
        $this->RFSH6->setDbValue($row['RFSH6']);
        $this->RFSH7->setDbValue($row['RFSH7']);
        $this->RFSH8->setDbValue($row['RFSH8']);
        $this->RFSH9->setDbValue($row['RFSH9']);
        $this->RFSH10->setDbValue($row['RFSH10']);
        $this->RFSH11->setDbValue($row['RFSH11']);
        $this->RFSH12->setDbValue($row['RFSH12']);
        $this->RFSH13->setDbValue($row['RFSH13']);
        $this->HMG1->setDbValue($row['HMG1']);
        $this->HMG2->setDbValue($row['HMG2']);
        $this->HMG3->setDbValue($row['HMG3']);
        $this->HMG4->setDbValue($row['HMG4']);
        $this->HMG5->setDbValue($row['HMG5']);
        $this->HMG6->setDbValue($row['HMG6']);
        $this->HMG7->setDbValue($row['HMG7']);
        $this->HMG8->setDbValue($row['HMG8']);
        $this->HMG9->setDbValue($row['HMG9']);
        $this->HMG10->setDbValue($row['HMG10']);
        $this->HMG11->setDbValue($row['HMG11']);
        $this->HMG12->setDbValue($row['HMG12']);
        $this->HMG13->setDbValue($row['HMG13']);
        $this->GnRH1->setDbValue($row['GnRH1']);
        $this->GnRH2->setDbValue($row['GnRH2']);
        $this->GnRH3->setDbValue($row['GnRH3']);
        $this->GnRH4->setDbValue($row['GnRH4']);
        $this->GnRH5->setDbValue($row['GnRH5']);
        $this->GnRH6->setDbValue($row['GnRH6']);
        $this->GnRH7->setDbValue($row['GnRH7']);
        $this->GnRH8->setDbValue($row['GnRH8']);
        $this->GnRH9->setDbValue($row['GnRH9']);
        $this->GnRH10->setDbValue($row['GnRH10']);
        $this->GnRH11->setDbValue($row['GnRH11']);
        $this->GnRH12->setDbValue($row['GnRH12']);
        $this->GnRH13->setDbValue($row['GnRH13']);
        $this->E21->setDbValue($row['E21']);
        $this->E22->setDbValue($row['E22']);
        $this->E23->setDbValue($row['E23']);
        $this->E24->setDbValue($row['E24']);
        $this->E25->setDbValue($row['E25']);
        $this->E26->setDbValue($row['E26']);
        $this->E27->setDbValue($row['E27']);
        $this->E28->setDbValue($row['E28']);
        $this->E29->setDbValue($row['E29']);
        $this->E210->setDbValue($row['E210']);
        $this->E211->setDbValue($row['E211']);
        $this->E212->setDbValue($row['E212']);
        $this->E213->setDbValue($row['E213']);
        $this->P41->setDbValue($row['P41']);
        $this->P42->setDbValue($row['P42']);
        $this->P43->setDbValue($row['P43']);
        $this->P44->setDbValue($row['P44']);
        $this->P45->setDbValue($row['P45']);
        $this->P46->setDbValue($row['P46']);
        $this->P47->setDbValue($row['P47']);
        $this->P48->setDbValue($row['P48']);
        $this->P49->setDbValue($row['P49']);
        $this->P410->setDbValue($row['P410']);
        $this->P411->setDbValue($row['P411']);
        $this->P412->setDbValue($row['P412']);
        $this->P413->setDbValue($row['P413']);
        $this->USGRt1->setDbValue($row['USGRt1']);
        $this->USGRt2->setDbValue($row['USGRt2']);
        $this->USGRt3->setDbValue($row['USGRt3']);
        $this->USGRt4->setDbValue($row['USGRt4']);
        $this->USGRt5->setDbValue($row['USGRt5']);
        $this->USGRt6->setDbValue($row['USGRt6']);
        $this->USGRt7->setDbValue($row['USGRt7']);
        $this->USGRt8->setDbValue($row['USGRt8']);
        $this->USGRt9->setDbValue($row['USGRt9']);
        $this->USGRt10->setDbValue($row['USGRt10']);
        $this->USGRt11->setDbValue($row['USGRt11']);
        $this->USGRt12->setDbValue($row['USGRt12']);
        $this->USGRt13->setDbValue($row['USGRt13']);
        $this->USGLt1->setDbValue($row['USGLt1']);
        $this->USGLt2->setDbValue($row['USGLt2']);
        $this->USGLt3->setDbValue($row['USGLt3']);
        $this->USGLt4->setDbValue($row['USGLt4']);
        $this->USGLt5->setDbValue($row['USGLt5']);
        $this->USGLt6->setDbValue($row['USGLt6']);
        $this->USGLt7->setDbValue($row['USGLt7']);
        $this->USGLt8->setDbValue($row['USGLt8']);
        $this->USGLt9->setDbValue($row['USGLt9']);
        $this->USGLt10->setDbValue($row['USGLt10']);
        $this->USGLt11->setDbValue($row['USGLt11']);
        $this->USGLt12->setDbValue($row['USGLt12']);
        $this->USGLt13->setDbValue($row['USGLt13']);
        $this->EM1->setDbValue($row['EM1']);
        $this->EM2->setDbValue($row['EM2']);
        $this->EM3->setDbValue($row['EM3']);
        $this->EM4->setDbValue($row['EM4']);
        $this->EM5->setDbValue($row['EM5']);
        $this->EM6->setDbValue($row['EM6']);
        $this->EM7->setDbValue($row['EM7']);
        $this->EM8->setDbValue($row['EM8']);
        $this->EM9->setDbValue($row['EM9']);
        $this->EM10->setDbValue($row['EM10']);
        $this->EM11->setDbValue($row['EM11']);
        $this->EM12->setDbValue($row['EM12']);
        $this->EM13->setDbValue($row['EM13']);
        $this->Others1->setDbValue($row['Others1']);
        $this->Others2->setDbValue($row['Others2']);
        $this->Others3->setDbValue($row['Others3']);
        $this->Others4->setDbValue($row['Others4']);
        $this->Others5->setDbValue($row['Others5']);
        $this->Others6->setDbValue($row['Others6']);
        $this->Others7->setDbValue($row['Others7']);
        $this->Others8->setDbValue($row['Others8']);
        $this->Others9->setDbValue($row['Others9']);
        $this->Others10->setDbValue($row['Others10']);
        $this->Others11->setDbValue($row['Others11']);
        $this->Others12->setDbValue($row['Others12']);
        $this->Others13->setDbValue($row['Others13']);
        $this->DR1->setDbValue($row['DR1']);
        $this->DR2->setDbValue($row['DR2']);
        $this->DR3->setDbValue($row['DR3']);
        $this->DR4->setDbValue($row['DR4']);
        $this->DR5->setDbValue($row['DR5']);
        $this->DR6->setDbValue($row['DR6']);
        $this->DR7->setDbValue($row['DR7']);
        $this->DR8->setDbValue($row['DR8']);
        $this->DR9->setDbValue($row['DR9']);
        $this->DR10->setDbValue($row['DR10']);
        $this->DR11->setDbValue($row['DR11']);
        $this->DR12->setDbValue($row['DR12']);
        $this->DR13->setDbValue($row['DR13']);
        $this->DOCTORRESPONSIBLE->setDbValue($row['DOCTORRESPONSIBLE']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->Convert->setDbValue($row['Convert']);
        $this->Consultant->setDbValue($row['Consultant']);
        $this->InseminatinTechnique->setDbValue($row['InseminatinTechnique']);
        $this->IndicationForART->setDbValue($row['IndicationForART']);
        $this->Hysteroscopy->setDbValue($row['Hysteroscopy']);
        $this->EndometrialScratching->setDbValue($row['EndometrialScratching']);
        $this->TrialCannulation->setDbValue($row['TrialCannulation']);
        $this->CYCLETYPE->setDbValue($row['CYCLETYPE']);
        $this->HRTCYCLE->setDbValue($row['HRTCYCLE']);
        $this->OralEstrogenDosage->setDbValue($row['OralEstrogenDosage']);
        $this->VaginalEstrogen->setDbValue($row['VaginalEstrogen']);
        $this->GCSF->setDbValue($row['GCSF']);
        $this->ActivatedPRP->setDbValue($row['ActivatedPRP']);
        $this->UCLcm->setDbValue($row['UCLcm']);
        $this->DATOFEMBRYOTRANSFER->setDbValue($row['DATOFEMBRYOTRANSFER']);
        $this->DAYOFEMBRYOTRANSFER->setDbValue($row['DAYOFEMBRYOTRANSFER']);
        $this->NOOFEMBRYOSTHAWED->setDbValue($row['NOOFEMBRYOSTHAWED']);
        $this->NOOFEMBRYOSTRANSFERRED->setDbValue($row['NOOFEMBRYOSTRANSFERRED']);
        $this->DAYOFEMBRYOS->setDbValue($row['DAYOFEMBRYOS']);
        $this->CRYOPRESERVEDEMBRYOS->setDbValue($row['CRYOPRESERVEDEMBRYOS']);
        $this->ViaAdmin->setDbValue($row['ViaAdmin']);
        $this->ViaStartDateTime->setDbValue($row['ViaStartDateTime']);
        $this->ViaDose->setDbValue($row['ViaDose']);
        $this->AllFreeze->setDbValue($row['AllFreeze']);
        $this->TreatmentCancel->setDbValue($row['TreatmentCancel']);
        $this->Reason->setDbValue($row['Reason']);
        $this->ProgesteroneAdmin->setDbValue($row['ProgesteroneAdmin']);
        $this->ProgesteroneStart->setDbValue($row['ProgesteroneStart']);
        $this->ProgesteroneDose->setDbValue($row['ProgesteroneDose']);
        $this->Projectron->setDbValue($row['Projectron']);
        $this->StChDate14->setDbValue($row['StChDate14']);
        $this->StChDate15->setDbValue($row['StChDate15']);
        $this->StChDate16->setDbValue($row['StChDate16']);
        $this->StChDate17->setDbValue($row['StChDate17']);
        $this->StChDate18->setDbValue($row['StChDate18']);
        $this->StChDate19->setDbValue($row['StChDate19']);
        $this->StChDate20->setDbValue($row['StChDate20']);
        $this->StChDate21->setDbValue($row['StChDate21']);
        $this->StChDate22->setDbValue($row['StChDate22']);
        $this->StChDate23->setDbValue($row['StChDate23']);
        $this->StChDate24->setDbValue($row['StChDate24']);
        $this->StChDate25->setDbValue($row['StChDate25']);
        $this->CycleDay14->setDbValue($row['CycleDay14']);
        $this->CycleDay15->setDbValue($row['CycleDay15']);
        $this->CycleDay16->setDbValue($row['CycleDay16']);
        $this->CycleDay17->setDbValue($row['CycleDay17']);
        $this->CycleDay18->setDbValue($row['CycleDay18']);
        $this->CycleDay19->setDbValue($row['CycleDay19']);
        $this->CycleDay20->setDbValue($row['CycleDay20']);
        $this->CycleDay21->setDbValue($row['CycleDay21']);
        $this->CycleDay22->setDbValue($row['CycleDay22']);
        $this->CycleDay23->setDbValue($row['CycleDay23']);
        $this->CycleDay24->setDbValue($row['CycleDay24']);
        $this->CycleDay25->setDbValue($row['CycleDay25']);
        $this->StimulationDay14->setDbValue($row['StimulationDay14']);
        $this->StimulationDay15->setDbValue($row['StimulationDay15']);
        $this->StimulationDay16->setDbValue($row['StimulationDay16']);
        $this->StimulationDay17->setDbValue($row['StimulationDay17']);
        $this->StimulationDay18->setDbValue($row['StimulationDay18']);
        $this->StimulationDay19->setDbValue($row['StimulationDay19']);
        $this->StimulationDay20->setDbValue($row['StimulationDay20']);
        $this->StimulationDay21->setDbValue($row['StimulationDay21']);
        $this->StimulationDay22->setDbValue($row['StimulationDay22']);
        $this->StimulationDay23->setDbValue($row['StimulationDay23']);
        $this->StimulationDay24->setDbValue($row['StimulationDay24']);
        $this->StimulationDay25->setDbValue($row['StimulationDay25']);
        $this->Tablet14->setDbValue($row['Tablet14']);
        $this->Tablet15->setDbValue($row['Tablet15']);
        $this->Tablet16->setDbValue($row['Tablet16']);
        $this->Tablet17->setDbValue($row['Tablet17']);
        $this->Tablet18->setDbValue($row['Tablet18']);
        $this->Tablet19->setDbValue($row['Tablet19']);
        $this->Tablet20->setDbValue($row['Tablet20']);
        $this->Tablet21->setDbValue($row['Tablet21']);
        $this->Tablet22->setDbValue($row['Tablet22']);
        $this->Tablet23->setDbValue($row['Tablet23']);
        $this->Tablet24->setDbValue($row['Tablet24']);
        $this->Tablet25->setDbValue($row['Tablet25']);
        $this->RFSH14->setDbValue($row['RFSH14']);
        $this->RFSH15->setDbValue($row['RFSH15']);
        $this->RFSH16->setDbValue($row['RFSH16']);
        $this->RFSH17->setDbValue($row['RFSH17']);
        $this->RFSH18->setDbValue($row['RFSH18']);
        $this->RFSH19->setDbValue($row['RFSH19']);
        $this->RFSH20->setDbValue($row['RFSH20']);
        $this->RFSH21->setDbValue($row['RFSH21']);
        $this->RFSH22->setDbValue($row['RFSH22']);
        $this->RFSH23->setDbValue($row['RFSH23']);
        $this->RFSH24->setDbValue($row['RFSH24']);
        $this->RFSH25->setDbValue($row['RFSH25']);
        $this->HMG14->setDbValue($row['HMG14']);
        $this->HMG15->setDbValue($row['HMG15']);
        $this->HMG16->setDbValue($row['HMG16']);
        $this->HMG17->setDbValue($row['HMG17']);
        $this->HMG18->setDbValue($row['HMG18']);
        $this->HMG19->setDbValue($row['HMG19']);
        $this->HMG20->setDbValue($row['HMG20']);
        $this->HMG21->setDbValue($row['HMG21']);
        $this->HMG22->setDbValue($row['HMG22']);
        $this->HMG23->setDbValue($row['HMG23']);
        $this->HMG24->setDbValue($row['HMG24']);
        $this->HMG25->setDbValue($row['HMG25']);
        $this->GnRH14->setDbValue($row['GnRH14']);
        $this->GnRH15->setDbValue($row['GnRH15']);
        $this->GnRH16->setDbValue($row['GnRH16']);
        $this->GnRH17->setDbValue($row['GnRH17']);
        $this->GnRH18->setDbValue($row['GnRH18']);
        $this->GnRH19->setDbValue($row['GnRH19']);
        $this->GnRH20->setDbValue($row['GnRH20']);
        $this->GnRH21->setDbValue($row['GnRH21']);
        $this->GnRH22->setDbValue($row['GnRH22']);
        $this->GnRH23->setDbValue($row['GnRH23']);
        $this->GnRH24->setDbValue($row['GnRH24']);
        $this->GnRH25->setDbValue($row['GnRH25']);
        $this->P414->setDbValue($row['P414']);
        $this->P415->setDbValue($row['P415']);
        $this->P416->setDbValue($row['P416']);
        $this->P417->setDbValue($row['P417']);
        $this->P418->setDbValue($row['P418']);
        $this->P419->setDbValue($row['P419']);
        $this->P420->setDbValue($row['P420']);
        $this->P421->setDbValue($row['P421']);
        $this->P422->setDbValue($row['P422']);
        $this->P423->setDbValue($row['P423']);
        $this->P424->setDbValue($row['P424']);
        $this->P425->setDbValue($row['P425']);
        $this->USGRt14->setDbValue($row['USGRt14']);
        $this->USGRt15->setDbValue($row['USGRt15']);
        $this->USGRt16->setDbValue($row['USGRt16']);
        $this->USGRt17->setDbValue($row['USGRt17']);
        $this->USGRt18->setDbValue($row['USGRt18']);
        $this->USGRt19->setDbValue($row['USGRt19']);
        $this->USGRt20->setDbValue($row['USGRt20']);
        $this->USGRt21->setDbValue($row['USGRt21']);
        $this->USGRt22->setDbValue($row['USGRt22']);
        $this->USGRt23->setDbValue($row['USGRt23']);
        $this->USGRt24->setDbValue($row['USGRt24']);
        $this->USGRt25->setDbValue($row['USGRt25']);
        $this->USGLt14->setDbValue($row['USGLt14']);
        $this->USGLt15->setDbValue($row['USGLt15']);
        $this->USGLt16->setDbValue($row['USGLt16']);
        $this->USGLt17->setDbValue($row['USGLt17']);
        $this->USGLt18->setDbValue($row['USGLt18']);
        $this->USGLt19->setDbValue($row['USGLt19']);
        $this->USGLt20->setDbValue($row['USGLt20']);
        $this->USGLt21->setDbValue($row['USGLt21']);
        $this->USGLt22->setDbValue($row['USGLt22']);
        $this->USGLt23->setDbValue($row['USGLt23']);
        $this->USGLt24->setDbValue($row['USGLt24']);
        $this->USGLt25->setDbValue($row['USGLt25']);
        $this->EM14->setDbValue($row['EM14']);
        $this->EM15->setDbValue($row['EM15']);
        $this->EM16->setDbValue($row['EM16']);
        $this->EM17->setDbValue($row['EM17']);
        $this->EM18->setDbValue($row['EM18']);
        $this->EM19->setDbValue($row['EM19']);
        $this->EM20->setDbValue($row['EM20']);
        $this->EM21->setDbValue($row['EM21']);
        $this->EM22->setDbValue($row['EM22']);
        $this->EM23->setDbValue($row['EM23']);
        $this->EM24->setDbValue($row['EM24']);
        $this->EM25->setDbValue($row['EM25']);
        $this->Others14->setDbValue($row['Others14']);
        $this->Others15->setDbValue($row['Others15']);
        $this->Others16->setDbValue($row['Others16']);
        $this->Others17->setDbValue($row['Others17']);
        $this->Others18->setDbValue($row['Others18']);
        $this->Others19->setDbValue($row['Others19']);
        $this->Others20->setDbValue($row['Others20']);
        $this->Others21->setDbValue($row['Others21']);
        $this->Others22->setDbValue($row['Others22']);
        $this->Others23->setDbValue($row['Others23']);
        $this->Others24->setDbValue($row['Others24']);
        $this->Others25->setDbValue($row['Others25']);
        $this->DR14->setDbValue($row['DR14']);
        $this->DR15->setDbValue($row['DR15']);
        $this->DR16->setDbValue($row['DR16']);
        $this->DR17->setDbValue($row['DR17']);
        $this->DR18->setDbValue($row['DR18']);
        $this->DR19->setDbValue($row['DR19']);
        $this->DR20->setDbValue($row['DR20']);
        $this->DR21->setDbValue($row['DR21']);
        $this->DR22->setDbValue($row['DR22']);
        $this->DR23->setDbValue($row['DR23']);
        $this->DR24->setDbValue($row['DR24']);
        $this->DR25->setDbValue($row['DR25']);
        $this->E214->setDbValue($row['E214']);
        $this->E215->setDbValue($row['E215']);
        $this->E216->setDbValue($row['E216']);
        $this->E217->setDbValue($row['E217']);
        $this->E218->setDbValue($row['E218']);
        $this->E219->setDbValue($row['E219']);
        $this->E220->setDbValue($row['E220']);
        $this->E221->setDbValue($row['E221']);
        $this->E222->setDbValue($row['E222']);
        $this->E223->setDbValue($row['E223']);
        $this->E224->setDbValue($row['E224']);
        $this->E225->setDbValue($row['E225']);
        $this->EEETTTDTE->setDbValue($row['EEETTTDTE']);
        $this->bhcgdate->setDbValue($row['bhcgdate']);
        $this->TUBAL_PATENCY->setDbValue($row['TUBAL_PATENCY']);
        $this->HSG->setDbValue($row['HSG']);
        $this->DHL->setDbValue($row['DHL']);
        $this->UTERINE_PROBLEMS->setDbValue($row['UTERINE_PROBLEMS']);
        $this->W_COMORBIDS->setDbValue($row['W_COMORBIDS']);
        $this->H_COMORBIDS->setDbValue($row['H_COMORBIDS']);
        $this->SEXUAL_DYSFUNCTION->setDbValue($row['SEXUAL_DYSFUNCTION']);
        $this->TABLETS->setDbValue($row['TABLETS']);
        $this->FOLLICLE_STATUS->setDbValue($row['FOLLICLE_STATUS']);
        $this->NUMBER_OF_IUI->setDbValue($row['NUMBER_OF_IUI']);
        $this->PROCEDURE->setDbValue($row['PROCEDURE']);
        $this->LUTEAL_SUPPORT->setDbValue($row['LUTEAL_SUPPORT']);
        $this->SPECIFIC_MATERNAL_PROBLEMS->setDbValue($row['SPECIFIC_MATERNAL_PROBLEMS']);
        $this->ONGOING_PREG->setDbValue($row['ONGOING_PREG']);
        $this->EDD_Date->setDbValue($row['EDD_Date']);
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

        // FemaleFactor

        // MaleFactor

        // Protocol

        // SemenFrozen

        // A4ICSICycle

        // TotalICSICycle

        // TypeOfInfertility

        // Duration

        // LMP

        // RelevantHistory

        // IUICycles

        // AFC

        // AMH

        // FBMI

        // MBMI

        // OvarianVolumeRT

        // OvarianVolumeLT

        // DAYSOFSTIMULATION

        // DOSEOFGONADOTROPINS

        // INJTYPE

        // ANTAGONISTDAYS

        // ANTAGONISTSTARTDAY

        // GROWTHHORMONE

        // PRETREATMENT

        // SerumP4

        // FORT

        // MedicalFactors

        // SCDate

        // OvarianSurgery

        // PreProcedureOrder

        // TRIGGERR

        // TRIGGERDATE

        // ATHOMEorCLINIC

        // OPUDATE

        // ALLFREEZEINDICATION

        // ERA

        // PGTA

        // PGD

        // DATEOFET

        // ET

        // ESET

        // DOET

        // SEMENPREPARATION

        // REASONFORESET

        // Expectedoocytes

        // StChDate1

        // StChDate2

        // StChDate3

        // StChDate4

        // StChDate5

        // StChDate6

        // StChDate7

        // StChDate8

        // StChDate9

        // StChDate10

        // StChDate11

        // StChDate12

        // StChDate13

        // CycleDay1

        // CycleDay2

        // CycleDay3

        // CycleDay4

        // CycleDay5

        // CycleDay6

        // CycleDay7

        // CycleDay8

        // CycleDay9

        // CycleDay10

        // CycleDay11

        // CycleDay12

        // CycleDay13

        // StimulationDay1

        // StimulationDay2

        // StimulationDay3

        // StimulationDay4

        // StimulationDay5

        // StimulationDay6

        // StimulationDay7

        // StimulationDay8

        // StimulationDay9

        // StimulationDay10

        // StimulationDay11

        // StimulationDay12

        // StimulationDay13

        // Tablet1

        // Tablet2

        // Tablet3

        // Tablet4

        // Tablet5

        // Tablet6

        // Tablet7

        // Tablet8

        // Tablet9

        // Tablet10

        // Tablet11

        // Tablet12

        // Tablet13

        // RFSH1

        // RFSH2

        // RFSH3

        // RFSH4

        // RFSH5

        // RFSH6

        // RFSH7

        // RFSH8

        // RFSH9

        // RFSH10

        // RFSH11

        // RFSH12

        // RFSH13

        // HMG1

        // HMG2

        // HMG3

        // HMG4

        // HMG5

        // HMG6

        // HMG7

        // HMG8

        // HMG9

        // HMG10

        // HMG11

        // HMG12

        // HMG13

        // GnRH1

        // GnRH2

        // GnRH3

        // GnRH4

        // GnRH5

        // GnRH6

        // GnRH7

        // GnRH8

        // GnRH9

        // GnRH10

        // GnRH11

        // GnRH12

        // GnRH13

        // E21

        // E22

        // E23

        // E24

        // E25

        // E26

        // E27

        // E28

        // E29

        // E210

        // E211

        // E212

        // E213

        // P41

        // P42

        // P43

        // P44

        // P45

        // P46

        // P47

        // P48

        // P49

        // P410

        // P411

        // P412

        // P413

        // USGRt1

        // USGRt2

        // USGRt3

        // USGRt4

        // USGRt5

        // USGRt6

        // USGRt7

        // USGRt8

        // USGRt9

        // USGRt10

        // USGRt11

        // USGRt12

        // USGRt13

        // USGLt1

        // USGLt2

        // USGLt3

        // USGLt4

        // USGLt5

        // USGLt6

        // USGLt7

        // USGLt8

        // USGLt9

        // USGLt10

        // USGLt11

        // USGLt12

        // USGLt13

        // EM1

        // EM2

        // EM3

        // EM4

        // EM5

        // EM6

        // EM7

        // EM8

        // EM9

        // EM10

        // EM11

        // EM12

        // EM13

        // Others1

        // Others2

        // Others3

        // Others4

        // Others5

        // Others6

        // Others7

        // Others8

        // Others9

        // Others10

        // Others11

        // Others12

        // Others13

        // DR1

        // DR2

        // DR3

        // DR4

        // DR5

        // DR6

        // DR7

        // DR8

        // DR9

        // DR10

        // DR11

        // DR12

        // DR13

        // DOCTORRESPONSIBLE

        // TidNo

        // Convert

        // Consultant

        // InseminatinTechnique

        // IndicationForART

        // Hysteroscopy

        // EndometrialScratching

        // TrialCannulation

        // CYCLETYPE

        // HRTCYCLE

        // OralEstrogenDosage

        // VaginalEstrogen

        // GCSF

        // ActivatedPRP

        // UCLcm

        // DATOFEMBRYOTRANSFER

        // DAYOFEMBRYOTRANSFER

        // NOOFEMBRYOSTHAWED

        // NOOFEMBRYOSTRANSFERRED

        // DAYOFEMBRYOS

        // CRYOPRESERVEDEMBRYOS

        // ViaAdmin

        // ViaStartDateTime

        // ViaDose

        // AllFreeze

        // TreatmentCancel

        // Reason

        // ProgesteroneAdmin

        // ProgesteroneStart

        // ProgesteroneDose

        // Projectron

        // StChDate14

        // StChDate15

        // StChDate16

        // StChDate17

        // StChDate18

        // StChDate19

        // StChDate20

        // StChDate21

        // StChDate22

        // StChDate23

        // StChDate24

        // StChDate25

        // CycleDay14

        // CycleDay15

        // CycleDay16

        // CycleDay17

        // CycleDay18

        // CycleDay19

        // CycleDay20

        // CycleDay21

        // CycleDay22

        // CycleDay23

        // CycleDay24

        // CycleDay25

        // StimulationDay14

        // StimulationDay15

        // StimulationDay16

        // StimulationDay17

        // StimulationDay18

        // StimulationDay19

        // StimulationDay20

        // StimulationDay21

        // StimulationDay22

        // StimulationDay23

        // StimulationDay24

        // StimulationDay25

        // Tablet14

        // Tablet15

        // Tablet16

        // Tablet17

        // Tablet18

        // Tablet19

        // Tablet20

        // Tablet21

        // Tablet22

        // Tablet23

        // Tablet24

        // Tablet25

        // RFSH14

        // RFSH15

        // RFSH16

        // RFSH17

        // RFSH18

        // RFSH19

        // RFSH20

        // RFSH21

        // RFSH22

        // RFSH23

        // RFSH24

        // RFSH25

        // HMG14

        // HMG15

        // HMG16

        // HMG17

        // HMG18

        // HMG19

        // HMG20

        // HMG21

        // HMG22

        // HMG23

        // HMG24

        // HMG25

        // GnRH14

        // GnRH15

        // GnRH16

        // GnRH17

        // GnRH18

        // GnRH19

        // GnRH20

        // GnRH21

        // GnRH22

        // GnRH23

        // GnRH24

        // GnRH25

        // P414

        // P415

        // P416

        // P417

        // P418

        // P419

        // P420

        // P421

        // P422

        // P423

        // P424

        // P425

        // USGRt14

        // USGRt15

        // USGRt16

        // USGRt17

        // USGRt18

        // USGRt19

        // USGRt20

        // USGRt21

        // USGRt22

        // USGRt23

        // USGRt24

        // USGRt25

        // USGLt14

        // USGLt15

        // USGLt16

        // USGLt17

        // USGLt18

        // USGLt19

        // USGLt20

        // USGLt21

        // USGLt22

        // USGLt23

        // USGLt24

        // USGLt25

        // EM14

        // EM15

        // EM16

        // EM17

        // EM18

        // EM19

        // EM20

        // EM21

        // EM22

        // EM23

        // EM24

        // EM25

        // Others14

        // Others15

        // Others16

        // Others17

        // Others18

        // Others19

        // Others20

        // Others21

        // Others22

        // Others23

        // Others24

        // Others25

        // DR14

        // DR15

        // DR16

        // DR17

        // DR18

        // DR19

        // DR20

        // DR21

        // DR22

        // DR23

        // DR24

        // DR25

        // E214

        // E215

        // E216

        // E217

        // E218

        // E219

        // E220

        // E221

        // E222

        // E223

        // E224

        // E225

        // EEETTTDTE

        // bhcgdate

        // TUBAL_PATENCY

        // HSG

        // DHL

        // UTERINE_PROBLEMS

        // W_COMORBIDS

        // H_COMORBIDS

        // SEXUAL_DYSFUNCTION

        // TABLETS

        // FOLLICLE_STATUS

        // NUMBER_OF_IUI

        // PROCEDURE

        // LUTEAL_SUPPORT

        // SPECIFIC_MATERNAL_PROBLEMS

        // ONGOING_PREG

        // EDD_Date

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
        if (strval($this->ARTCycle->CurrentValue) != "") {
            $this->ARTCycle->ViewValue = $this->ARTCycle->optionCaption($this->ARTCycle->CurrentValue);
        } else {
            $this->ARTCycle->ViewValue = null;
        }
        $this->ARTCycle->ViewCustomAttributes = "";

        // FemaleFactor
        if (strval($this->FemaleFactor->CurrentValue) != "") {
            $this->FemaleFactor->ViewValue = $this->FemaleFactor->optionCaption($this->FemaleFactor->CurrentValue);
        } else {
            $this->FemaleFactor->ViewValue = null;
        }
        $this->FemaleFactor->ViewCustomAttributes = "";

        // MaleFactor
        if (strval($this->MaleFactor->CurrentValue) != "") {
            $this->MaleFactor->ViewValue = $this->MaleFactor->optionCaption($this->MaleFactor->CurrentValue);
        } else {
            $this->MaleFactor->ViewValue = null;
        }
        $this->MaleFactor->ViewCustomAttributes = "";

        // Protocol
        if (strval($this->Protocol->CurrentValue) != "") {
            $this->Protocol->ViewValue = $this->Protocol->optionCaption($this->Protocol->CurrentValue);
        } else {
            $this->Protocol->ViewValue = null;
        }
        $this->Protocol->ViewCustomAttributes = "";

        // SemenFrozen
        if (strval($this->SemenFrozen->CurrentValue) != "") {
            $this->SemenFrozen->ViewValue = $this->SemenFrozen->optionCaption($this->SemenFrozen->CurrentValue);
        } else {
            $this->SemenFrozen->ViewValue = null;
        }
        $this->SemenFrozen->ViewCustomAttributes = "";

        // A4ICSICycle
        if (strval($this->A4ICSICycle->CurrentValue) != "") {
            $this->A4ICSICycle->ViewValue = $this->A4ICSICycle->optionCaption($this->A4ICSICycle->CurrentValue);
        } else {
            $this->A4ICSICycle->ViewValue = null;
        }
        $this->A4ICSICycle->ViewCustomAttributes = "";

        // TotalICSICycle
        if (strval($this->TotalICSICycle->CurrentValue) != "") {
            $this->TotalICSICycle->ViewValue = $this->TotalICSICycle->optionCaption($this->TotalICSICycle->CurrentValue);
        } else {
            $this->TotalICSICycle->ViewValue = null;
        }
        $this->TotalICSICycle->ViewCustomAttributes = "";

        // TypeOfInfertility
        if (strval($this->TypeOfInfertility->CurrentValue) != "") {
            $this->TypeOfInfertility->ViewValue = $this->TypeOfInfertility->optionCaption($this->TypeOfInfertility->CurrentValue);
        } else {
            $this->TypeOfInfertility->ViewValue = null;
        }
        $this->TypeOfInfertility->ViewCustomAttributes = "";

        // Duration
        $this->Duration->ViewValue = $this->Duration->CurrentValue;
        $this->Duration->ViewCustomAttributes = "";

        // LMP
        $this->LMP->ViewValue = $this->LMP->CurrentValue;
        $this->LMP->ViewValue = FormatDateTime($this->LMP->ViewValue, 7);
        $this->LMP->ViewCustomAttributes = "";

        // RelevantHistory
        $this->RelevantHistory->ViewValue = $this->RelevantHistory->CurrentValue;
        $this->RelevantHistory->ViewCustomAttributes = "";

        // IUICycles
        $this->IUICycles->ViewValue = $this->IUICycles->CurrentValue;
        $this->IUICycles->ViewCustomAttributes = "";

        // AFC
        $this->AFC->ViewValue = $this->AFC->CurrentValue;
        $this->AFC->ViewCustomAttributes = "";

        // AMH
        $this->AMH->ViewValue = $this->AMH->CurrentValue;
        $this->AMH->ViewCustomAttributes = "";

        // FBMI
        $this->FBMI->ViewValue = $this->FBMI->CurrentValue;
        $this->FBMI->ViewCustomAttributes = "";

        // MBMI
        $this->MBMI->ViewValue = $this->MBMI->CurrentValue;
        $this->MBMI->ViewCustomAttributes = "";

        // OvarianVolumeRT
        $this->OvarianVolumeRT->ViewValue = $this->OvarianVolumeRT->CurrentValue;
        $this->OvarianVolumeRT->ViewCustomAttributes = "";

        // OvarianVolumeLT
        $this->OvarianVolumeLT->ViewValue = $this->OvarianVolumeLT->CurrentValue;
        $this->OvarianVolumeLT->ViewCustomAttributes = "";

        // DAYSOFSTIMULATION
        $this->DAYSOFSTIMULATION->ViewValue = $this->DAYSOFSTIMULATION->CurrentValue;
        $this->DAYSOFSTIMULATION->ViewCustomAttributes = "";

        // DOSEOFGONADOTROPINS
        $this->DOSEOFGONADOTROPINS->ViewValue = $this->DOSEOFGONADOTROPINS->CurrentValue;
        $this->DOSEOFGONADOTROPINS->ViewCustomAttributes = "";

        // INJTYPE
        $curVal = trim(strval($this->INJTYPE->CurrentValue));
        if ($curVal != "") {
            $this->INJTYPE->ViewValue = $this->INJTYPE->lookupCacheOption($curVal);
            if ($this->INJTYPE->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->INJTYPE->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->INJTYPE->Lookup->renderViewRow($rswrk[0]);
                    $this->INJTYPE->ViewValue = $this->INJTYPE->displayValue($arwrk);
                } else {
                    $this->INJTYPE->ViewValue = $this->INJTYPE->CurrentValue;
                }
            }
        } else {
            $this->INJTYPE->ViewValue = null;
        }
        $this->INJTYPE->ViewCustomAttributes = "";

        // ANTAGONISTDAYS
        $this->ANTAGONISTDAYS->ViewValue = $this->ANTAGONISTDAYS->CurrentValue;
        $this->ANTAGONISTDAYS->ViewCustomAttributes = "";

        // ANTAGONISTSTARTDAY
        if (strval($this->ANTAGONISTSTARTDAY->CurrentValue) != "") {
            $this->ANTAGONISTSTARTDAY->ViewValue = $this->ANTAGONISTSTARTDAY->optionCaption($this->ANTAGONISTSTARTDAY->CurrentValue);
        } else {
            $this->ANTAGONISTSTARTDAY->ViewValue = null;
        }
        $this->ANTAGONISTSTARTDAY->ViewCustomAttributes = "";

        // GROWTHHORMONE
        $this->GROWTHHORMONE->ViewValue = $this->GROWTHHORMONE->CurrentValue;
        $this->GROWTHHORMONE->ViewCustomAttributes = "";

        // PRETREATMENT
        if (strval($this->PRETREATMENT->CurrentValue) != "") {
            $this->PRETREATMENT->ViewValue = $this->PRETREATMENT->optionCaption($this->PRETREATMENT->CurrentValue);
        } else {
            $this->PRETREATMENT->ViewValue = null;
        }
        $this->PRETREATMENT->ViewCustomAttributes = "";

        // SerumP4
        $this->SerumP4->ViewValue = $this->SerumP4->CurrentValue;
        $this->SerumP4->ViewCustomAttributes = "";

        // FORT
        $this->FORT->ViewValue = $this->FORT->CurrentValue;
        $this->FORT->ViewCustomAttributes = "";

        // MedicalFactors
        if (strval($this->MedicalFactors->CurrentValue) != "") {
            $this->MedicalFactors->ViewValue = $this->MedicalFactors->optionCaption($this->MedicalFactors->CurrentValue);
        } else {
            $this->MedicalFactors->ViewValue = null;
        }
        $this->MedicalFactors->ViewCustomAttributes = "";

        // SCDate
        $this->SCDate->ViewValue = $this->SCDate->CurrentValue;
        $this->SCDate->ViewValue = FormatDateTime($this->SCDate->ViewValue, 7);
        $this->SCDate->ViewCustomAttributes = "";

        // OvarianSurgery
        $this->OvarianSurgery->ViewValue = $this->OvarianSurgery->CurrentValue;
        $this->OvarianSurgery->ViewCustomAttributes = "";

        // PreProcedureOrder
        $this->PreProcedureOrder->ViewValue = $this->PreProcedureOrder->CurrentValue;
        $this->PreProcedureOrder->ViewCustomAttributes = "";

        // TRIGGERR
        $curVal = trim(strval($this->TRIGGERR->CurrentValue));
        if ($curVal != "") {
            $this->TRIGGERR->ViewValue = $this->TRIGGERR->lookupCacheOption($curVal);
            if ($this->TRIGGERR->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->TRIGGERR->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->TRIGGERR->Lookup->renderViewRow($rswrk[0]);
                    $this->TRIGGERR->ViewValue = $this->TRIGGERR->displayValue($arwrk);
                } else {
                    $this->TRIGGERR->ViewValue = $this->TRIGGERR->CurrentValue;
                }
            }
        } else {
            $this->TRIGGERR->ViewValue = null;
        }
        $this->TRIGGERR->ViewCustomAttributes = "";

        // TRIGGERDATE
        $this->TRIGGERDATE->ViewValue = $this->TRIGGERDATE->CurrentValue;
        $this->TRIGGERDATE->ViewValue = FormatDateTime($this->TRIGGERDATE->ViewValue, 11);
        $this->TRIGGERDATE->ViewCustomAttributes = "";

        // ATHOMEorCLINIC
        if (strval($this->ATHOMEorCLINIC->CurrentValue) != "") {
            $this->ATHOMEorCLINIC->ViewValue = $this->ATHOMEorCLINIC->optionCaption($this->ATHOMEorCLINIC->CurrentValue);
        } else {
            $this->ATHOMEorCLINIC->ViewValue = null;
        }
        $this->ATHOMEorCLINIC->ViewCustomAttributes = "";

        // OPUDATE
        $this->OPUDATE->ViewValue = $this->OPUDATE->CurrentValue;
        $this->OPUDATE->ViewValue = FormatDateTime($this->OPUDATE->ViewValue, 11);
        $this->OPUDATE->ViewCustomAttributes = "";

        // ALLFREEZEINDICATION
        if (strval($this->ALLFREEZEINDICATION->CurrentValue) != "") {
            $this->ALLFREEZEINDICATION->ViewValue = $this->ALLFREEZEINDICATION->optionCaption($this->ALLFREEZEINDICATION->CurrentValue);
        } else {
            $this->ALLFREEZEINDICATION->ViewValue = null;
        }
        $this->ALLFREEZEINDICATION->ViewCustomAttributes = "";

        // ERA
        if (strval($this->ERA->CurrentValue) != "") {
            $this->ERA->ViewValue = $this->ERA->optionCaption($this->ERA->CurrentValue);
        } else {
            $this->ERA->ViewValue = null;
        }
        $this->ERA->ViewCustomAttributes = "";

        // PGTA
        $this->PGTA->ViewValue = $this->PGTA->CurrentValue;
        $this->PGTA->ViewCustomAttributes = "";

        // PGD
        $this->PGD->ViewValue = $this->PGD->CurrentValue;
        $this->PGD->ViewCustomAttributes = "";

        // DATEOFET
        $this->DATEOFET->ViewValue = $this->DATEOFET->CurrentValue;
        $this->DATEOFET->ViewValue = FormatDateTime($this->DATEOFET->ViewValue, 11);
        $this->DATEOFET->ViewCustomAttributes = "";

        // ET
        if (strval($this->ET->CurrentValue) != "") {
            $this->ET->ViewValue = $this->ET->optionCaption($this->ET->CurrentValue);
        } else {
            $this->ET->ViewValue = null;
        }
        $this->ET->ViewCustomAttributes = "";

        // ESET
        $this->ESET->ViewValue = $this->ESET->CurrentValue;
        $this->ESET->ViewCustomAttributes = "";

        // DOET
        $this->DOET->ViewValue = $this->DOET->CurrentValue;
        $this->DOET->ViewCustomAttributes = "";

        // SEMENPREPARATION
        if (strval($this->SEMENPREPARATION->CurrentValue) != "") {
            $this->SEMENPREPARATION->ViewValue = $this->SEMENPREPARATION->optionCaption($this->SEMENPREPARATION->CurrentValue);
        } else {
            $this->SEMENPREPARATION->ViewValue = null;
        }
        $this->SEMENPREPARATION->ViewCustomAttributes = "";

        // REASONFORESET
        if (strval($this->REASONFORESET->CurrentValue) != "") {
            $this->REASONFORESET->ViewValue = $this->REASONFORESET->optionCaption($this->REASONFORESET->CurrentValue);
        } else {
            $this->REASONFORESET->ViewValue = null;
        }
        $this->REASONFORESET->ViewCustomAttributes = "";

        // Expectedoocytes
        $this->Expectedoocytes->ViewValue = $this->Expectedoocytes->CurrentValue;
        $this->Expectedoocytes->ViewCustomAttributes = "";

        // StChDate1
        $this->StChDate1->ViewValue = $this->StChDate1->CurrentValue;
        $this->StChDate1->ViewValue = FormatDateTime($this->StChDate1->ViewValue, 7);
        $this->StChDate1->ViewCustomAttributes = "";

        // StChDate2
        $this->StChDate2->ViewValue = $this->StChDate2->CurrentValue;
        $this->StChDate2->ViewValue = FormatDateTime($this->StChDate2->ViewValue, 7);
        $this->StChDate2->ViewCustomAttributes = "";

        // StChDate3
        $this->StChDate3->ViewValue = $this->StChDate3->CurrentValue;
        $this->StChDate3->ViewValue = FormatDateTime($this->StChDate3->ViewValue, 7);
        $this->StChDate3->ViewCustomAttributes = "";

        // StChDate4
        $this->StChDate4->ViewValue = $this->StChDate4->CurrentValue;
        $this->StChDate4->ViewValue = FormatDateTime($this->StChDate4->ViewValue, 7);
        $this->StChDate4->ViewCustomAttributes = "";

        // StChDate5
        $this->StChDate5->ViewValue = $this->StChDate5->CurrentValue;
        $this->StChDate5->ViewValue = FormatDateTime($this->StChDate5->ViewValue, 7);
        $this->StChDate5->ViewCustomAttributes = "";

        // StChDate6
        $this->StChDate6->ViewValue = $this->StChDate6->CurrentValue;
        $this->StChDate6->ViewValue = FormatDateTime($this->StChDate6->ViewValue, 7);
        $this->StChDate6->ViewCustomAttributes = "";

        // StChDate7
        $this->StChDate7->ViewValue = $this->StChDate7->CurrentValue;
        $this->StChDate7->ViewValue = FormatDateTime($this->StChDate7->ViewValue, 7);
        $this->StChDate7->ViewCustomAttributes = "";

        // StChDate8
        $this->StChDate8->ViewValue = $this->StChDate8->CurrentValue;
        $this->StChDate8->ViewValue = FormatDateTime($this->StChDate8->ViewValue, 7);
        $this->StChDate8->ViewCustomAttributes = "";

        // StChDate9
        $this->StChDate9->ViewValue = $this->StChDate9->CurrentValue;
        $this->StChDate9->ViewValue = FormatDateTime($this->StChDate9->ViewValue, 7);
        $this->StChDate9->ViewCustomAttributes = "";

        // StChDate10
        $this->StChDate10->ViewValue = $this->StChDate10->CurrentValue;
        $this->StChDate10->ViewValue = FormatDateTime($this->StChDate10->ViewValue, 7);
        $this->StChDate10->ViewCustomAttributes = "";

        // StChDate11
        $this->StChDate11->ViewValue = $this->StChDate11->CurrentValue;
        $this->StChDate11->ViewValue = FormatDateTime($this->StChDate11->ViewValue, 7);
        $this->StChDate11->ViewCustomAttributes = "";

        // StChDate12
        $this->StChDate12->ViewValue = $this->StChDate12->CurrentValue;
        $this->StChDate12->ViewValue = FormatDateTime($this->StChDate12->ViewValue, 7);
        $this->StChDate12->ViewCustomAttributes = "";

        // StChDate13
        $this->StChDate13->ViewValue = $this->StChDate13->CurrentValue;
        $this->StChDate13->ViewValue = FormatDateTime($this->StChDate13->ViewValue, 7);
        $this->StChDate13->ViewCustomAttributes = "";

        // CycleDay1
        $this->CycleDay1->ViewValue = $this->CycleDay1->CurrentValue;
        $this->CycleDay1->ViewCustomAttributes = "";

        // CycleDay2
        $this->CycleDay2->ViewValue = $this->CycleDay2->CurrentValue;
        $this->CycleDay2->ViewCustomAttributes = "";

        // CycleDay3
        $this->CycleDay3->ViewValue = $this->CycleDay3->CurrentValue;
        $this->CycleDay3->ViewCustomAttributes = "";

        // CycleDay4
        $this->CycleDay4->ViewValue = $this->CycleDay4->CurrentValue;
        $this->CycleDay4->ViewCustomAttributes = "";

        // CycleDay5
        $this->CycleDay5->ViewValue = $this->CycleDay5->CurrentValue;
        $this->CycleDay5->ViewCustomAttributes = "";

        // CycleDay6
        $this->CycleDay6->ViewValue = $this->CycleDay6->CurrentValue;
        $this->CycleDay6->ViewCustomAttributes = "";

        // CycleDay7
        $this->CycleDay7->ViewValue = $this->CycleDay7->CurrentValue;
        $this->CycleDay7->ViewCustomAttributes = "";

        // CycleDay8
        $this->CycleDay8->ViewValue = $this->CycleDay8->CurrentValue;
        $this->CycleDay8->ViewCustomAttributes = "";

        // CycleDay9
        $this->CycleDay9->ViewValue = $this->CycleDay9->CurrentValue;
        $this->CycleDay9->ViewCustomAttributes = "";

        // CycleDay10
        $this->CycleDay10->ViewValue = $this->CycleDay10->CurrentValue;
        $this->CycleDay10->ViewCustomAttributes = "";

        // CycleDay11
        $this->CycleDay11->ViewValue = $this->CycleDay11->CurrentValue;
        $this->CycleDay11->ViewCustomAttributes = "";

        // CycleDay12
        $this->CycleDay12->ViewValue = $this->CycleDay12->CurrentValue;
        $this->CycleDay12->ViewCustomAttributes = "";

        // CycleDay13
        $this->CycleDay13->ViewValue = $this->CycleDay13->CurrentValue;
        $this->CycleDay13->ViewCustomAttributes = "";

        // StimulationDay1
        $this->StimulationDay1->ViewValue = $this->StimulationDay1->CurrentValue;
        $this->StimulationDay1->ViewCustomAttributes = "";

        // StimulationDay2
        $this->StimulationDay2->ViewValue = $this->StimulationDay2->CurrentValue;
        $this->StimulationDay2->ViewCustomAttributes = "";

        // StimulationDay3
        $this->StimulationDay3->ViewValue = $this->StimulationDay3->CurrentValue;
        $this->StimulationDay3->ViewCustomAttributes = "";

        // StimulationDay4
        $this->StimulationDay4->ViewValue = $this->StimulationDay4->CurrentValue;
        $this->StimulationDay4->ViewCustomAttributes = "";

        // StimulationDay5
        $this->StimulationDay5->ViewValue = $this->StimulationDay5->CurrentValue;
        $this->StimulationDay5->ViewCustomAttributes = "";

        // StimulationDay6
        $this->StimulationDay6->ViewValue = $this->StimulationDay6->CurrentValue;
        $this->StimulationDay6->ViewCustomAttributes = "";

        // StimulationDay7
        $this->StimulationDay7->ViewValue = $this->StimulationDay7->CurrentValue;
        $this->StimulationDay7->ViewCustomAttributes = "";

        // StimulationDay8
        $this->StimulationDay8->ViewValue = $this->StimulationDay8->CurrentValue;
        $this->StimulationDay8->ViewCustomAttributes = "";

        // StimulationDay9
        $this->StimulationDay9->ViewValue = $this->StimulationDay9->CurrentValue;
        $this->StimulationDay9->ViewCustomAttributes = "";

        // StimulationDay10
        $this->StimulationDay10->ViewValue = $this->StimulationDay10->CurrentValue;
        $this->StimulationDay10->ViewCustomAttributes = "";

        // StimulationDay11
        $this->StimulationDay11->ViewValue = $this->StimulationDay11->CurrentValue;
        $this->StimulationDay11->ViewCustomAttributes = "";

        // StimulationDay12
        $this->StimulationDay12->ViewValue = $this->StimulationDay12->CurrentValue;
        $this->StimulationDay12->ViewCustomAttributes = "";

        // StimulationDay13
        $this->StimulationDay13->ViewValue = $this->StimulationDay13->CurrentValue;
        $this->StimulationDay13->ViewCustomAttributes = "";

        // Tablet1
        $curVal = trim(strval($this->Tablet1->CurrentValue));
        if ($curVal != "") {
            $this->Tablet1->ViewValue = $this->Tablet1->lookupCacheOption($curVal);
            if ($this->Tablet1->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Tablet1->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Tablet1->Lookup->renderViewRow($rswrk[0]);
                    $this->Tablet1->ViewValue = $this->Tablet1->displayValue($arwrk);
                } else {
                    $this->Tablet1->ViewValue = $this->Tablet1->CurrentValue;
                }
            }
        } else {
            $this->Tablet1->ViewValue = null;
        }
        $this->Tablet1->ViewCustomAttributes = "";

        // Tablet2
        $curVal = trim(strval($this->Tablet2->CurrentValue));
        if ($curVal != "") {
            $this->Tablet2->ViewValue = $this->Tablet2->lookupCacheOption($curVal);
            if ($this->Tablet2->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Tablet2->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Tablet2->Lookup->renderViewRow($rswrk[0]);
                    $this->Tablet2->ViewValue = $this->Tablet2->displayValue($arwrk);
                } else {
                    $this->Tablet2->ViewValue = $this->Tablet2->CurrentValue;
                }
            }
        } else {
            $this->Tablet2->ViewValue = null;
        }
        $this->Tablet2->ViewCustomAttributes = "";

        // Tablet3
        $curVal = trim(strval($this->Tablet3->CurrentValue));
        if ($curVal != "") {
            $this->Tablet3->ViewValue = $this->Tablet3->lookupCacheOption($curVal);
            if ($this->Tablet3->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Tablet3->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Tablet3->Lookup->renderViewRow($rswrk[0]);
                    $this->Tablet3->ViewValue = $this->Tablet3->displayValue($arwrk);
                } else {
                    $this->Tablet3->ViewValue = $this->Tablet3->CurrentValue;
                }
            }
        } else {
            $this->Tablet3->ViewValue = null;
        }
        $this->Tablet3->ViewCustomAttributes = "";

        // Tablet4
        $curVal = trim(strval($this->Tablet4->CurrentValue));
        if ($curVal != "") {
            $this->Tablet4->ViewValue = $this->Tablet4->lookupCacheOption($curVal);
            if ($this->Tablet4->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Tablet4->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Tablet4->Lookup->renderViewRow($rswrk[0]);
                    $this->Tablet4->ViewValue = $this->Tablet4->displayValue($arwrk);
                } else {
                    $this->Tablet4->ViewValue = $this->Tablet4->CurrentValue;
                }
            }
        } else {
            $this->Tablet4->ViewValue = null;
        }
        $this->Tablet4->ViewCustomAttributes = "";

        // Tablet5
        $curVal = trim(strval($this->Tablet5->CurrentValue));
        if ($curVal != "") {
            $this->Tablet5->ViewValue = $this->Tablet5->lookupCacheOption($curVal);
            if ($this->Tablet5->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Tablet5->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Tablet5->Lookup->renderViewRow($rswrk[0]);
                    $this->Tablet5->ViewValue = $this->Tablet5->displayValue($arwrk);
                } else {
                    $this->Tablet5->ViewValue = $this->Tablet5->CurrentValue;
                }
            }
        } else {
            $this->Tablet5->ViewValue = null;
        }
        $this->Tablet5->ViewCustomAttributes = "";

        // Tablet6
        $curVal = trim(strval($this->Tablet6->CurrentValue));
        if ($curVal != "") {
            $this->Tablet6->ViewValue = $this->Tablet6->lookupCacheOption($curVal);
            if ($this->Tablet6->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Tablet6->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Tablet6->Lookup->renderViewRow($rswrk[0]);
                    $this->Tablet6->ViewValue = $this->Tablet6->displayValue($arwrk);
                } else {
                    $this->Tablet6->ViewValue = $this->Tablet6->CurrentValue;
                }
            }
        } else {
            $this->Tablet6->ViewValue = null;
        }
        $this->Tablet6->ViewCustomAttributes = "";

        // Tablet7
        $curVal = trim(strval($this->Tablet7->CurrentValue));
        if ($curVal != "") {
            $this->Tablet7->ViewValue = $this->Tablet7->lookupCacheOption($curVal);
            if ($this->Tablet7->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Tablet7->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Tablet7->Lookup->renderViewRow($rswrk[0]);
                    $this->Tablet7->ViewValue = $this->Tablet7->displayValue($arwrk);
                } else {
                    $this->Tablet7->ViewValue = $this->Tablet7->CurrentValue;
                }
            }
        } else {
            $this->Tablet7->ViewValue = null;
        }
        $this->Tablet7->ViewCustomAttributes = "";

        // Tablet8
        $curVal = trim(strval($this->Tablet8->CurrentValue));
        if ($curVal != "") {
            $this->Tablet8->ViewValue = $this->Tablet8->lookupCacheOption($curVal);
            if ($this->Tablet8->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Tablet8->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Tablet8->Lookup->renderViewRow($rswrk[0]);
                    $this->Tablet8->ViewValue = $this->Tablet8->displayValue($arwrk);
                } else {
                    $this->Tablet8->ViewValue = $this->Tablet8->CurrentValue;
                }
            }
        } else {
            $this->Tablet8->ViewValue = null;
        }
        $this->Tablet8->ViewCustomAttributes = "";

        // Tablet9
        $curVal = trim(strval($this->Tablet9->CurrentValue));
        if ($curVal != "") {
            $this->Tablet9->ViewValue = $this->Tablet9->lookupCacheOption($curVal);
            if ($this->Tablet9->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Tablet9->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Tablet9->Lookup->renderViewRow($rswrk[0]);
                    $this->Tablet9->ViewValue = $this->Tablet9->displayValue($arwrk);
                } else {
                    $this->Tablet9->ViewValue = $this->Tablet9->CurrentValue;
                }
            }
        } else {
            $this->Tablet9->ViewValue = null;
        }
        $this->Tablet9->ViewCustomAttributes = "";

        // Tablet10
        $curVal = trim(strval($this->Tablet10->CurrentValue));
        if ($curVal != "") {
            $this->Tablet10->ViewValue = $this->Tablet10->lookupCacheOption($curVal);
            if ($this->Tablet10->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Tablet10->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Tablet10->Lookup->renderViewRow($rswrk[0]);
                    $this->Tablet10->ViewValue = $this->Tablet10->displayValue($arwrk);
                } else {
                    $this->Tablet10->ViewValue = $this->Tablet10->CurrentValue;
                }
            }
        } else {
            $this->Tablet10->ViewValue = null;
        }
        $this->Tablet10->ViewCustomAttributes = "";

        // Tablet11
        $curVal = trim(strval($this->Tablet11->CurrentValue));
        if ($curVal != "") {
            $this->Tablet11->ViewValue = $this->Tablet11->lookupCacheOption($curVal);
            if ($this->Tablet11->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Tablet11->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Tablet11->Lookup->renderViewRow($rswrk[0]);
                    $this->Tablet11->ViewValue = $this->Tablet11->displayValue($arwrk);
                } else {
                    $this->Tablet11->ViewValue = $this->Tablet11->CurrentValue;
                }
            }
        } else {
            $this->Tablet11->ViewValue = null;
        }
        $this->Tablet11->ViewCustomAttributes = "";

        // Tablet12
        $curVal = trim(strval($this->Tablet12->CurrentValue));
        if ($curVal != "") {
            $this->Tablet12->ViewValue = $this->Tablet12->lookupCacheOption($curVal);
            if ($this->Tablet12->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Tablet12->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Tablet12->Lookup->renderViewRow($rswrk[0]);
                    $this->Tablet12->ViewValue = $this->Tablet12->displayValue($arwrk);
                } else {
                    $this->Tablet12->ViewValue = $this->Tablet12->CurrentValue;
                }
            }
        } else {
            $this->Tablet12->ViewValue = null;
        }
        $this->Tablet12->ViewCustomAttributes = "";

        // Tablet13
        $curVal = trim(strval($this->Tablet13->CurrentValue));
        if ($curVal != "") {
            $this->Tablet13->ViewValue = $this->Tablet13->lookupCacheOption($curVal);
            if ($this->Tablet13->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Tablet13->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Tablet13->Lookup->renderViewRow($rswrk[0]);
                    $this->Tablet13->ViewValue = $this->Tablet13->displayValue($arwrk);
                } else {
                    $this->Tablet13->ViewValue = $this->Tablet13->CurrentValue;
                }
            }
        } else {
            $this->Tablet13->ViewValue = null;
        }
        $this->Tablet13->ViewCustomAttributes = "";

        // RFSH1
        $curVal = trim(strval($this->RFSH1->CurrentValue));
        if ($curVal != "") {
            $this->RFSH1->ViewValue = $this->RFSH1->lookupCacheOption($curVal);
            if ($this->RFSH1->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->RFSH1->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->RFSH1->Lookup->renderViewRow($rswrk[0]);
                    $this->RFSH1->ViewValue = $this->RFSH1->displayValue($arwrk);
                } else {
                    $this->RFSH1->ViewValue = $this->RFSH1->CurrentValue;
                }
            }
        } else {
            $this->RFSH1->ViewValue = null;
        }
        $this->RFSH1->ViewCustomAttributes = "";

        // RFSH2
        $curVal = trim(strval($this->RFSH2->CurrentValue));
        if ($curVal != "") {
            $this->RFSH2->ViewValue = $this->RFSH2->lookupCacheOption($curVal);
            if ($this->RFSH2->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->RFSH2->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->RFSH2->Lookup->renderViewRow($rswrk[0]);
                    $this->RFSH2->ViewValue = $this->RFSH2->displayValue($arwrk);
                } else {
                    $this->RFSH2->ViewValue = $this->RFSH2->CurrentValue;
                }
            }
        } else {
            $this->RFSH2->ViewValue = null;
        }
        $this->RFSH2->ViewCustomAttributes = "";

        // RFSH3
        $curVal = trim(strval($this->RFSH3->CurrentValue));
        if ($curVal != "") {
            $this->RFSH3->ViewValue = $this->RFSH3->lookupCacheOption($curVal);
            if ($this->RFSH3->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->RFSH3->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->RFSH3->Lookup->renderViewRow($rswrk[0]);
                    $this->RFSH3->ViewValue = $this->RFSH3->displayValue($arwrk);
                } else {
                    $this->RFSH3->ViewValue = $this->RFSH3->CurrentValue;
                }
            }
        } else {
            $this->RFSH3->ViewValue = null;
        }
        $this->RFSH3->ViewCustomAttributes = "";

        // RFSH4
        $curVal = trim(strval($this->RFSH4->CurrentValue));
        if ($curVal != "") {
            $this->RFSH4->ViewValue = $this->RFSH4->lookupCacheOption($curVal);
            if ($this->RFSH4->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->RFSH4->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->RFSH4->Lookup->renderViewRow($rswrk[0]);
                    $this->RFSH4->ViewValue = $this->RFSH4->displayValue($arwrk);
                } else {
                    $this->RFSH4->ViewValue = $this->RFSH4->CurrentValue;
                }
            }
        } else {
            $this->RFSH4->ViewValue = null;
        }
        $this->RFSH4->ViewCustomAttributes = "";

        // RFSH5
        $curVal = trim(strval($this->RFSH5->CurrentValue));
        if ($curVal != "") {
            $this->RFSH5->ViewValue = $this->RFSH5->lookupCacheOption($curVal);
            if ($this->RFSH5->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->RFSH5->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->RFSH5->Lookup->renderViewRow($rswrk[0]);
                    $this->RFSH5->ViewValue = $this->RFSH5->displayValue($arwrk);
                } else {
                    $this->RFSH5->ViewValue = $this->RFSH5->CurrentValue;
                }
            }
        } else {
            $this->RFSH5->ViewValue = null;
        }
        $this->RFSH5->ViewCustomAttributes = "";

        // RFSH6
        $curVal = trim(strval($this->RFSH6->CurrentValue));
        if ($curVal != "") {
            $this->RFSH6->ViewValue = $this->RFSH6->lookupCacheOption($curVal);
            if ($this->RFSH6->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->RFSH6->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->RFSH6->Lookup->renderViewRow($rswrk[0]);
                    $this->RFSH6->ViewValue = $this->RFSH6->displayValue($arwrk);
                } else {
                    $this->RFSH6->ViewValue = $this->RFSH6->CurrentValue;
                }
            }
        } else {
            $this->RFSH6->ViewValue = null;
        }
        $this->RFSH6->ViewCustomAttributes = "";

        // RFSH7
        $curVal = trim(strval($this->RFSH7->CurrentValue));
        if ($curVal != "") {
            $this->RFSH7->ViewValue = $this->RFSH7->lookupCacheOption($curVal);
            if ($this->RFSH7->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->RFSH7->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->RFSH7->Lookup->renderViewRow($rswrk[0]);
                    $this->RFSH7->ViewValue = $this->RFSH7->displayValue($arwrk);
                } else {
                    $this->RFSH7->ViewValue = $this->RFSH7->CurrentValue;
                }
            }
        } else {
            $this->RFSH7->ViewValue = null;
        }
        $this->RFSH7->ViewCustomAttributes = "";

        // RFSH8
        $curVal = trim(strval($this->RFSH8->CurrentValue));
        if ($curVal != "") {
            $this->RFSH8->ViewValue = $this->RFSH8->lookupCacheOption($curVal);
            if ($this->RFSH8->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->RFSH8->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->RFSH8->Lookup->renderViewRow($rswrk[0]);
                    $this->RFSH8->ViewValue = $this->RFSH8->displayValue($arwrk);
                } else {
                    $this->RFSH8->ViewValue = $this->RFSH8->CurrentValue;
                }
            }
        } else {
            $this->RFSH8->ViewValue = null;
        }
        $this->RFSH8->ViewCustomAttributes = "";

        // RFSH9
        $curVal = trim(strval($this->RFSH9->CurrentValue));
        if ($curVal != "") {
            $this->RFSH9->ViewValue = $this->RFSH9->lookupCacheOption($curVal);
            if ($this->RFSH9->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->RFSH9->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->RFSH9->Lookup->renderViewRow($rswrk[0]);
                    $this->RFSH9->ViewValue = $this->RFSH9->displayValue($arwrk);
                } else {
                    $this->RFSH9->ViewValue = $this->RFSH9->CurrentValue;
                }
            }
        } else {
            $this->RFSH9->ViewValue = null;
        }
        $this->RFSH9->ViewCustomAttributes = "";

        // RFSH10
        $curVal = trim(strval($this->RFSH10->CurrentValue));
        if ($curVal != "") {
            $this->RFSH10->ViewValue = $this->RFSH10->lookupCacheOption($curVal);
            if ($this->RFSH10->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->RFSH10->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->RFSH10->Lookup->renderViewRow($rswrk[0]);
                    $this->RFSH10->ViewValue = $this->RFSH10->displayValue($arwrk);
                } else {
                    $this->RFSH10->ViewValue = $this->RFSH10->CurrentValue;
                }
            }
        } else {
            $this->RFSH10->ViewValue = null;
        }
        $this->RFSH10->ViewCustomAttributes = "";

        // RFSH11
        $curVal = trim(strval($this->RFSH11->CurrentValue));
        if ($curVal != "") {
            $this->RFSH11->ViewValue = $this->RFSH11->lookupCacheOption($curVal);
            if ($this->RFSH11->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->RFSH11->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->RFSH11->Lookup->renderViewRow($rswrk[0]);
                    $this->RFSH11->ViewValue = $this->RFSH11->displayValue($arwrk);
                } else {
                    $this->RFSH11->ViewValue = $this->RFSH11->CurrentValue;
                }
            }
        } else {
            $this->RFSH11->ViewValue = null;
        }
        $this->RFSH11->ViewCustomAttributes = "";

        // RFSH12
        $curVal = trim(strval($this->RFSH12->CurrentValue));
        if ($curVal != "") {
            $this->RFSH12->ViewValue = $this->RFSH12->lookupCacheOption($curVal);
            if ($this->RFSH12->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->RFSH12->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->RFSH12->Lookup->renderViewRow($rswrk[0]);
                    $this->RFSH12->ViewValue = $this->RFSH12->displayValue($arwrk);
                } else {
                    $this->RFSH12->ViewValue = $this->RFSH12->CurrentValue;
                }
            }
        } else {
            $this->RFSH12->ViewValue = null;
        }
        $this->RFSH12->ViewCustomAttributes = "";

        // RFSH13
        $curVal = trim(strval($this->RFSH13->CurrentValue));
        if ($curVal != "") {
            $this->RFSH13->ViewValue = $this->RFSH13->lookupCacheOption($curVal);
            if ($this->RFSH13->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->RFSH13->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->RFSH13->Lookup->renderViewRow($rswrk[0]);
                    $this->RFSH13->ViewValue = $this->RFSH13->displayValue($arwrk);
                } else {
                    $this->RFSH13->ViewValue = $this->RFSH13->CurrentValue;
                }
            }
        } else {
            $this->RFSH13->ViewValue = null;
        }
        $this->RFSH13->ViewCustomAttributes = "";

        // HMG1
        $curVal = trim(strval($this->HMG1->CurrentValue));
        if ($curVal != "") {
            $this->HMG1->ViewValue = $this->HMG1->lookupCacheOption($curVal);
            if ($this->HMG1->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->HMG1->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->HMG1->Lookup->renderViewRow($rswrk[0]);
                    $this->HMG1->ViewValue = $this->HMG1->displayValue($arwrk);
                } else {
                    $this->HMG1->ViewValue = $this->HMG1->CurrentValue;
                }
            }
        } else {
            $this->HMG1->ViewValue = null;
        }
        $this->HMG1->ViewCustomAttributes = "";

        // HMG2
        $curVal = trim(strval($this->HMG2->CurrentValue));
        if ($curVal != "") {
            $this->HMG2->ViewValue = $this->HMG2->lookupCacheOption($curVal);
            if ($this->HMG2->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->HMG2->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->HMG2->Lookup->renderViewRow($rswrk[0]);
                    $this->HMG2->ViewValue = $this->HMG2->displayValue($arwrk);
                } else {
                    $this->HMG2->ViewValue = $this->HMG2->CurrentValue;
                }
            }
        } else {
            $this->HMG2->ViewValue = null;
        }
        $this->HMG2->ViewCustomAttributes = "";

        // HMG3
        $curVal = trim(strval($this->HMG3->CurrentValue));
        if ($curVal != "") {
            $this->HMG3->ViewValue = $this->HMG3->lookupCacheOption($curVal);
            if ($this->HMG3->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->HMG3->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->HMG3->Lookup->renderViewRow($rswrk[0]);
                    $this->HMG3->ViewValue = $this->HMG3->displayValue($arwrk);
                } else {
                    $this->HMG3->ViewValue = $this->HMG3->CurrentValue;
                }
            }
        } else {
            $this->HMG3->ViewValue = null;
        }
        $this->HMG3->ViewCustomAttributes = "";

        // HMG4
        $curVal = trim(strval($this->HMG4->CurrentValue));
        if ($curVal != "") {
            $this->HMG4->ViewValue = $this->HMG4->lookupCacheOption($curVal);
            if ($this->HMG4->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->HMG4->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->HMG4->Lookup->renderViewRow($rswrk[0]);
                    $this->HMG4->ViewValue = $this->HMG4->displayValue($arwrk);
                } else {
                    $this->HMG4->ViewValue = $this->HMG4->CurrentValue;
                }
            }
        } else {
            $this->HMG4->ViewValue = null;
        }
        $this->HMG4->ViewCustomAttributes = "";

        // HMG5
        $curVal = trim(strval($this->HMG5->CurrentValue));
        if ($curVal != "") {
            $this->HMG5->ViewValue = $this->HMG5->lookupCacheOption($curVal);
            if ($this->HMG5->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->HMG5->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->HMG5->Lookup->renderViewRow($rswrk[0]);
                    $this->HMG5->ViewValue = $this->HMG5->displayValue($arwrk);
                } else {
                    $this->HMG5->ViewValue = $this->HMG5->CurrentValue;
                }
            }
        } else {
            $this->HMG5->ViewValue = null;
        }
        $this->HMG5->ViewCustomAttributes = "";

        // HMG6
        $curVal = trim(strval($this->HMG6->CurrentValue));
        if ($curVal != "") {
            $this->HMG6->ViewValue = $this->HMG6->lookupCacheOption($curVal);
            if ($this->HMG6->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->HMG6->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->HMG6->Lookup->renderViewRow($rswrk[0]);
                    $this->HMG6->ViewValue = $this->HMG6->displayValue($arwrk);
                } else {
                    $this->HMG6->ViewValue = $this->HMG6->CurrentValue;
                }
            }
        } else {
            $this->HMG6->ViewValue = null;
        }
        $this->HMG6->ViewCustomAttributes = "";

        // HMG7
        $curVal = trim(strval($this->HMG7->CurrentValue));
        if ($curVal != "") {
            $this->HMG7->ViewValue = $this->HMG7->lookupCacheOption($curVal);
            if ($this->HMG7->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->HMG7->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->HMG7->Lookup->renderViewRow($rswrk[0]);
                    $this->HMG7->ViewValue = $this->HMG7->displayValue($arwrk);
                } else {
                    $this->HMG7->ViewValue = $this->HMG7->CurrentValue;
                }
            }
        } else {
            $this->HMG7->ViewValue = null;
        }
        $this->HMG7->ViewCustomAttributes = "";

        // HMG8
        $curVal = trim(strval($this->HMG8->CurrentValue));
        if ($curVal != "") {
            $this->HMG8->ViewValue = $this->HMG8->lookupCacheOption($curVal);
            if ($this->HMG8->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->HMG8->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->HMG8->Lookup->renderViewRow($rswrk[0]);
                    $this->HMG8->ViewValue = $this->HMG8->displayValue($arwrk);
                } else {
                    $this->HMG8->ViewValue = $this->HMG8->CurrentValue;
                }
            }
        } else {
            $this->HMG8->ViewValue = null;
        }
        $this->HMG8->ViewCustomAttributes = "";

        // HMG9
        $curVal = trim(strval($this->HMG9->CurrentValue));
        if ($curVal != "") {
            $this->HMG9->ViewValue = $this->HMG9->lookupCacheOption($curVal);
            if ($this->HMG9->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->HMG9->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->HMG9->Lookup->renderViewRow($rswrk[0]);
                    $this->HMG9->ViewValue = $this->HMG9->displayValue($arwrk);
                } else {
                    $this->HMG9->ViewValue = $this->HMG9->CurrentValue;
                }
            }
        } else {
            $this->HMG9->ViewValue = null;
        }
        $this->HMG9->ViewCustomAttributes = "";

        // HMG10
        $curVal = trim(strval($this->HMG10->CurrentValue));
        if ($curVal != "") {
            $this->HMG10->ViewValue = $this->HMG10->lookupCacheOption($curVal);
            if ($this->HMG10->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->HMG10->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->HMG10->Lookup->renderViewRow($rswrk[0]);
                    $this->HMG10->ViewValue = $this->HMG10->displayValue($arwrk);
                } else {
                    $this->HMG10->ViewValue = $this->HMG10->CurrentValue;
                }
            }
        } else {
            $this->HMG10->ViewValue = null;
        }
        $this->HMG10->ViewCustomAttributes = "";

        // HMG11
        $curVal = trim(strval($this->HMG11->CurrentValue));
        if ($curVal != "") {
            $this->HMG11->ViewValue = $this->HMG11->lookupCacheOption($curVal);
            if ($this->HMG11->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->HMG11->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->HMG11->Lookup->renderViewRow($rswrk[0]);
                    $this->HMG11->ViewValue = $this->HMG11->displayValue($arwrk);
                } else {
                    $this->HMG11->ViewValue = $this->HMG11->CurrentValue;
                }
            }
        } else {
            $this->HMG11->ViewValue = null;
        }
        $this->HMG11->ViewCustomAttributes = "";

        // HMG12
        $curVal = trim(strval($this->HMG12->CurrentValue));
        if ($curVal != "") {
            $this->HMG12->ViewValue = $this->HMG12->lookupCacheOption($curVal);
            if ($this->HMG12->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->HMG12->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->HMG12->Lookup->renderViewRow($rswrk[0]);
                    $this->HMG12->ViewValue = $this->HMG12->displayValue($arwrk);
                } else {
                    $this->HMG12->ViewValue = $this->HMG12->CurrentValue;
                }
            }
        } else {
            $this->HMG12->ViewValue = null;
        }
        $this->HMG12->ViewCustomAttributes = "";

        // HMG13
        $curVal = trim(strval($this->HMG13->CurrentValue));
        if ($curVal != "") {
            $this->HMG13->ViewValue = $this->HMG13->lookupCacheOption($curVal);
            if ($this->HMG13->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->HMG13->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->HMG13->Lookup->renderViewRow($rswrk[0]);
                    $this->HMG13->ViewValue = $this->HMG13->displayValue($arwrk);
                } else {
                    $this->HMG13->ViewValue = $this->HMG13->CurrentValue;
                }
            }
        } else {
            $this->HMG13->ViewValue = null;
        }
        $this->HMG13->ViewCustomAttributes = "";

        // GnRH1
        $curVal = trim(strval($this->GnRH1->CurrentValue));
        if ($curVal != "") {
            $this->GnRH1->ViewValue = $this->GnRH1->lookupCacheOption($curVal);
            if ($this->GnRH1->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->GnRH1->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->GnRH1->Lookup->renderViewRow($rswrk[0]);
                    $this->GnRH1->ViewValue = $this->GnRH1->displayValue($arwrk);
                } else {
                    $this->GnRH1->ViewValue = $this->GnRH1->CurrentValue;
                }
            }
        } else {
            $this->GnRH1->ViewValue = null;
        }
        $this->GnRH1->ViewCustomAttributes = "";

        // GnRH2
        $curVal = trim(strval($this->GnRH2->CurrentValue));
        if ($curVal != "") {
            $this->GnRH2->ViewValue = $this->GnRH2->lookupCacheOption($curVal);
            if ($this->GnRH2->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->GnRH2->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->GnRH2->Lookup->renderViewRow($rswrk[0]);
                    $this->GnRH2->ViewValue = $this->GnRH2->displayValue($arwrk);
                } else {
                    $this->GnRH2->ViewValue = $this->GnRH2->CurrentValue;
                }
            }
        } else {
            $this->GnRH2->ViewValue = null;
        }
        $this->GnRH2->ViewCustomAttributes = "";

        // GnRH3
        $curVal = trim(strval($this->GnRH3->CurrentValue));
        if ($curVal != "") {
            $this->GnRH3->ViewValue = $this->GnRH3->lookupCacheOption($curVal);
            if ($this->GnRH3->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->GnRH3->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->GnRH3->Lookup->renderViewRow($rswrk[0]);
                    $this->GnRH3->ViewValue = $this->GnRH3->displayValue($arwrk);
                } else {
                    $this->GnRH3->ViewValue = $this->GnRH3->CurrentValue;
                }
            }
        } else {
            $this->GnRH3->ViewValue = null;
        }
        $this->GnRH3->ViewCustomAttributes = "";

        // GnRH4
        $curVal = trim(strval($this->GnRH4->CurrentValue));
        if ($curVal != "") {
            $this->GnRH4->ViewValue = $this->GnRH4->lookupCacheOption($curVal);
            if ($this->GnRH4->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->GnRH4->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->GnRH4->Lookup->renderViewRow($rswrk[0]);
                    $this->GnRH4->ViewValue = $this->GnRH4->displayValue($arwrk);
                } else {
                    $this->GnRH4->ViewValue = $this->GnRH4->CurrentValue;
                }
            }
        } else {
            $this->GnRH4->ViewValue = null;
        }
        $this->GnRH4->ViewCustomAttributes = "";

        // GnRH5
        $curVal = trim(strval($this->GnRH5->CurrentValue));
        if ($curVal != "") {
            $this->GnRH5->ViewValue = $this->GnRH5->lookupCacheOption($curVal);
            if ($this->GnRH5->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->GnRH5->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->GnRH5->Lookup->renderViewRow($rswrk[0]);
                    $this->GnRH5->ViewValue = $this->GnRH5->displayValue($arwrk);
                } else {
                    $this->GnRH5->ViewValue = $this->GnRH5->CurrentValue;
                }
            }
        } else {
            $this->GnRH5->ViewValue = null;
        }
        $this->GnRH5->ViewCustomAttributes = "";

        // GnRH6
        $curVal = trim(strval($this->GnRH6->CurrentValue));
        if ($curVal != "") {
            $this->GnRH6->ViewValue = $this->GnRH6->lookupCacheOption($curVal);
            if ($this->GnRH6->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->GnRH6->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->GnRH6->Lookup->renderViewRow($rswrk[0]);
                    $this->GnRH6->ViewValue = $this->GnRH6->displayValue($arwrk);
                } else {
                    $this->GnRH6->ViewValue = $this->GnRH6->CurrentValue;
                }
            }
        } else {
            $this->GnRH6->ViewValue = null;
        }
        $this->GnRH6->ViewCustomAttributes = "";

        // GnRH7
        $curVal = trim(strval($this->GnRH7->CurrentValue));
        if ($curVal != "") {
            $this->GnRH7->ViewValue = $this->GnRH7->lookupCacheOption($curVal);
            if ($this->GnRH7->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->GnRH7->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->GnRH7->Lookup->renderViewRow($rswrk[0]);
                    $this->GnRH7->ViewValue = $this->GnRH7->displayValue($arwrk);
                } else {
                    $this->GnRH7->ViewValue = $this->GnRH7->CurrentValue;
                }
            }
        } else {
            $this->GnRH7->ViewValue = null;
        }
        $this->GnRH7->ViewCustomAttributes = "";

        // GnRH8
        $curVal = trim(strval($this->GnRH8->CurrentValue));
        if ($curVal != "") {
            $this->GnRH8->ViewValue = $this->GnRH8->lookupCacheOption($curVal);
            if ($this->GnRH8->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->GnRH8->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->GnRH8->Lookup->renderViewRow($rswrk[0]);
                    $this->GnRH8->ViewValue = $this->GnRH8->displayValue($arwrk);
                } else {
                    $this->GnRH8->ViewValue = $this->GnRH8->CurrentValue;
                }
            }
        } else {
            $this->GnRH8->ViewValue = null;
        }
        $this->GnRH8->ViewCustomAttributes = "";

        // GnRH9
        $curVal = trim(strval($this->GnRH9->CurrentValue));
        if ($curVal != "") {
            $this->GnRH9->ViewValue = $this->GnRH9->lookupCacheOption($curVal);
            if ($this->GnRH9->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->GnRH9->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->GnRH9->Lookup->renderViewRow($rswrk[0]);
                    $this->GnRH9->ViewValue = $this->GnRH9->displayValue($arwrk);
                } else {
                    $this->GnRH9->ViewValue = $this->GnRH9->CurrentValue;
                }
            }
        } else {
            $this->GnRH9->ViewValue = null;
        }
        $this->GnRH9->ViewCustomAttributes = "";

        // GnRH10
        $curVal = trim(strval($this->GnRH10->CurrentValue));
        if ($curVal != "") {
            $this->GnRH10->ViewValue = $this->GnRH10->lookupCacheOption($curVal);
            if ($this->GnRH10->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->GnRH10->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->GnRH10->Lookup->renderViewRow($rswrk[0]);
                    $this->GnRH10->ViewValue = $this->GnRH10->displayValue($arwrk);
                } else {
                    $this->GnRH10->ViewValue = $this->GnRH10->CurrentValue;
                }
            }
        } else {
            $this->GnRH10->ViewValue = null;
        }
        $this->GnRH10->ViewCustomAttributes = "";

        // GnRH11
        $curVal = trim(strval($this->GnRH11->CurrentValue));
        if ($curVal != "") {
            $this->GnRH11->ViewValue = $this->GnRH11->lookupCacheOption($curVal);
            if ($this->GnRH11->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->GnRH11->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->GnRH11->Lookup->renderViewRow($rswrk[0]);
                    $this->GnRH11->ViewValue = $this->GnRH11->displayValue($arwrk);
                } else {
                    $this->GnRH11->ViewValue = $this->GnRH11->CurrentValue;
                }
            }
        } else {
            $this->GnRH11->ViewValue = null;
        }
        $this->GnRH11->ViewCustomAttributes = "";

        // GnRH12
        $curVal = trim(strval($this->GnRH12->CurrentValue));
        if ($curVal != "") {
            $this->GnRH12->ViewValue = $this->GnRH12->lookupCacheOption($curVal);
            if ($this->GnRH12->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->GnRH12->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->GnRH12->Lookup->renderViewRow($rswrk[0]);
                    $this->GnRH12->ViewValue = $this->GnRH12->displayValue($arwrk);
                } else {
                    $this->GnRH12->ViewValue = $this->GnRH12->CurrentValue;
                }
            }
        } else {
            $this->GnRH12->ViewValue = null;
        }
        $this->GnRH12->ViewCustomAttributes = "";

        // GnRH13
        $curVal = trim(strval($this->GnRH13->CurrentValue));
        if ($curVal != "") {
            $this->GnRH13->ViewValue = $this->GnRH13->lookupCacheOption($curVal);
            if ($this->GnRH13->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->GnRH13->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->GnRH13->Lookup->renderViewRow($rswrk[0]);
                    $this->GnRH13->ViewValue = $this->GnRH13->displayValue($arwrk);
                } else {
                    $this->GnRH13->ViewValue = $this->GnRH13->CurrentValue;
                }
            }
        } else {
            $this->GnRH13->ViewValue = null;
        }
        $this->GnRH13->ViewCustomAttributes = "";

        // E21
        $this->E21->ViewValue = $this->E21->CurrentValue;
        $this->E21->ViewCustomAttributes = "";

        // E22
        $this->E22->ViewValue = $this->E22->CurrentValue;
        $this->E22->ViewCustomAttributes = "";

        // E23
        $this->E23->ViewValue = $this->E23->CurrentValue;
        $this->E23->ViewCustomAttributes = "";

        // E24
        $this->E24->ViewValue = $this->E24->CurrentValue;
        $this->E24->ViewCustomAttributes = "";

        // E25
        $this->E25->ViewValue = $this->E25->CurrentValue;
        $this->E25->ViewCustomAttributes = "";

        // E26
        $this->E26->ViewValue = $this->E26->CurrentValue;
        $this->E26->ViewCustomAttributes = "";

        // E27
        $this->E27->ViewValue = $this->E27->CurrentValue;
        $this->E27->ViewCustomAttributes = "";

        // E28
        $this->E28->ViewValue = $this->E28->CurrentValue;
        $this->E28->ViewCustomAttributes = "";

        // E29
        $this->E29->ViewValue = $this->E29->CurrentValue;
        $this->E29->ViewCustomAttributes = "";

        // E210
        $this->E210->ViewValue = $this->E210->CurrentValue;
        $this->E210->ViewCustomAttributes = "";

        // E211
        $this->E211->ViewValue = $this->E211->CurrentValue;
        $this->E211->ViewCustomAttributes = "";

        // E212
        $this->E212->ViewValue = $this->E212->CurrentValue;
        $this->E212->ViewCustomAttributes = "";

        // E213
        $this->E213->ViewValue = $this->E213->CurrentValue;
        $this->E213->ViewCustomAttributes = "";

        // P41
        $this->P41->ViewValue = $this->P41->CurrentValue;
        $this->P41->ViewCustomAttributes = "";

        // P42
        $this->P42->ViewValue = $this->P42->CurrentValue;
        $this->P42->ViewCustomAttributes = "";

        // P43
        $this->P43->ViewValue = $this->P43->CurrentValue;
        $this->P43->ViewCustomAttributes = "";

        // P44
        $this->P44->ViewValue = $this->P44->CurrentValue;
        $this->P44->ViewCustomAttributes = "";

        // P45
        $this->P45->ViewValue = $this->P45->CurrentValue;
        $this->P45->ViewCustomAttributes = "";

        // P46
        $this->P46->ViewValue = $this->P46->CurrentValue;
        $this->P46->ViewCustomAttributes = "";

        // P47
        $this->P47->ViewValue = $this->P47->CurrentValue;
        $this->P47->ViewCustomAttributes = "";

        // P48
        $this->P48->ViewValue = $this->P48->CurrentValue;
        $this->P48->ViewCustomAttributes = "";

        // P49
        $this->P49->ViewValue = $this->P49->CurrentValue;
        $this->P49->ViewCustomAttributes = "";

        // P410
        $this->P410->ViewValue = $this->P410->CurrentValue;
        $this->P410->ViewCustomAttributes = "";

        // P411
        $this->P411->ViewValue = $this->P411->CurrentValue;
        $this->P411->ViewCustomAttributes = "";

        // P412
        $this->P412->ViewValue = $this->P412->CurrentValue;
        $this->P412->ViewCustomAttributes = "";

        // P413
        $this->P413->ViewValue = $this->P413->CurrentValue;
        $this->P413->ViewCustomAttributes = "";

        // USGRt1
        $this->USGRt1->ViewValue = $this->USGRt1->CurrentValue;
        $this->USGRt1->ViewCustomAttributes = "";

        // USGRt2
        $this->USGRt2->ViewValue = $this->USGRt2->CurrentValue;
        $this->USGRt2->ViewCustomAttributes = "";

        // USGRt3
        $this->USGRt3->ViewValue = $this->USGRt3->CurrentValue;
        $this->USGRt3->ViewCustomAttributes = "";

        // USGRt4
        $this->USGRt4->ViewValue = $this->USGRt4->CurrentValue;
        $this->USGRt4->ViewCustomAttributes = "";

        // USGRt5
        $this->USGRt5->ViewValue = $this->USGRt5->CurrentValue;
        $this->USGRt5->ViewCustomAttributes = "";

        // USGRt6
        $this->USGRt6->ViewValue = $this->USGRt6->CurrentValue;
        $this->USGRt6->ViewCustomAttributes = "";

        // USGRt7
        $this->USGRt7->ViewValue = $this->USGRt7->CurrentValue;
        $this->USGRt7->ViewCustomAttributes = "";

        // USGRt8
        $this->USGRt8->ViewValue = $this->USGRt8->CurrentValue;
        $this->USGRt8->ViewCustomAttributes = "";

        // USGRt9
        $this->USGRt9->ViewValue = $this->USGRt9->CurrentValue;
        $this->USGRt9->ViewCustomAttributes = "";

        // USGRt10
        $this->USGRt10->ViewValue = $this->USGRt10->CurrentValue;
        $this->USGRt10->ViewCustomAttributes = "";

        // USGRt11
        $this->USGRt11->ViewValue = $this->USGRt11->CurrentValue;
        $this->USGRt11->ViewCustomAttributes = "";

        // USGRt12
        $this->USGRt12->ViewValue = $this->USGRt12->CurrentValue;
        $this->USGRt12->ViewCustomAttributes = "";

        // USGRt13
        $this->USGRt13->ViewValue = $this->USGRt13->CurrentValue;
        $this->USGRt13->ViewCustomAttributes = "";

        // USGLt1
        $this->USGLt1->ViewValue = $this->USGLt1->CurrentValue;
        $this->USGLt1->ViewCustomAttributes = "";

        // USGLt2
        $this->USGLt2->ViewValue = $this->USGLt2->CurrentValue;
        $this->USGLt2->ViewCustomAttributes = "";

        // USGLt3
        $this->USGLt3->ViewValue = $this->USGLt3->CurrentValue;
        $this->USGLt3->ViewCustomAttributes = "";

        // USGLt4
        $this->USGLt4->ViewValue = $this->USGLt4->CurrentValue;
        $this->USGLt4->ViewCustomAttributes = "";

        // USGLt5
        $this->USGLt5->ViewValue = $this->USGLt5->CurrentValue;
        $this->USGLt5->ViewCustomAttributes = "";

        // USGLt6
        $this->USGLt6->ViewValue = $this->USGLt6->CurrentValue;
        $this->USGLt6->ViewCustomAttributes = "";

        // USGLt7
        $this->USGLt7->ViewValue = $this->USGLt7->CurrentValue;
        $this->USGLt7->ViewCustomAttributes = "";

        // USGLt8
        $this->USGLt8->ViewValue = $this->USGLt8->CurrentValue;
        $this->USGLt8->ViewCustomAttributes = "";

        // USGLt9
        $this->USGLt9->ViewValue = $this->USGLt9->CurrentValue;
        $this->USGLt9->ViewCustomAttributes = "";

        // USGLt10
        $this->USGLt10->ViewValue = $this->USGLt10->CurrentValue;
        $this->USGLt10->ViewCustomAttributes = "";

        // USGLt11
        $this->USGLt11->ViewValue = $this->USGLt11->CurrentValue;
        $this->USGLt11->ViewCustomAttributes = "";

        // USGLt12
        $this->USGLt12->ViewValue = $this->USGLt12->CurrentValue;
        $this->USGLt12->ViewCustomAttributes = "";

        // USGLt13
        $this->USGLt13->ViewValue = $this->USGLt13->CurrentValue;
        $this->USGLt13->ViewCustomAttributes = "";

        // EM1
        $this->EM1->ViewValue = $this->EM1->CurrentValue;
        $this->EM1->ViewCustomAttributes = "";

        // EM2
        $this->EM2->ViewValue = $this->EM2->CurrentValue;
        $this->EM2->ViewCustomAttributes = "";

        // EM3
        $this->EM3->ViewValue = $this->EM3->CurrentValue;
        $this->EM3->ViewCustomAttributes = "";

        // EM4
        $this->EM4->ViewValue = $this->EM4->CurrentValue;
        $this->EM4->ViewCustomAttributes = "";

        // EM5
        $this->EM5->ViewValue = $this->EM5->CurrentValue;
        $this->EM5->ViewCustomAttributes = "";

        // EM6
        $this->EM6->ViewValue = $this->EM6->CurrentValue;
        $this->EM6->ViewCustomAttributes = "";

        // EM7
        $this->EM7->ViewValue = $this->EM7->CurrentValue;
        $this->EM7->ViewCustomAttributes = "";

        // EM8
        $this->EM8->ViewValue = $this->EM8->CurrentValue;
        $this->EM8->ViewCustomAttributes = "";

        // EM9
        $this->EM9->ViewValue = $this->EM9->CurrentValue;
        $this->EM9->ViewCustomAttributes = "";

        // EM10
        $this->EM10->ViewValue = $this->EM10->CurrentValue;
        $this->EM10->ViewCustomAttributes = "";

        // EM11
        $this->EM11->ViewValue = $this->EM11->CurrentValue;
        $this->EM11->ViewCustomAttributes = "";

        // EM12
        $this->EM12->ViewValue = $this->EM12->CurrentValue;
        $this->EM12->ViewCustomAttributes = "";

        // EM13
        $this->EM13->ViewValue = $this->EM13->CurrentValue;
        $this->EM13->ViewCustomAttributes = "";

        // Others1
        $this->Others1->ViewValue = $this->Others1->CurrentValue;
        $this->Others1->ViewCustomAttributes = "";

        // Others2
        $this->Others2->ViewValue = $this->Others2->CurrentValue;
        $this->Others2->ViewCustomAttributes = "";

        // Others3
        $this->Others3->ViewValue = $this->Others3->CurrentValue;
        $this->Others3->ViewCustomAttributes = "";

        // Others4
        $this->Others4->ViewValue = $this->Others4->CurrentValue;
        $this->Others4->ViewCustomAttributes = "";

        // Others5
        $this->Others5->ViewValue = $this->Others5->CurrentValue;
        $this->Others5->ViewCustomAttributes = "";

        // Others6
        $this->Others6->ViewValue = $this->Others6->CurrentValue;
        $this->Others6->ViewCustomAttributes = "";

        // Others7
        $this->Others7->ViewValue = $this->Others7->CurrentValue;
        $this->Others7->ViewCustomAttributes = "";

        // Others8
        $this->Others8->ViewValue = $this->Others8->CurrentValue;
        $this->Others8->ViewCustomAttributes = "";

        // Others9
        $this->Others9->ViewValue = $this->Others9->CurrentValue;
        $this->Others9->ViewCustomAttributes = "";

        // Others10
        $this->Others10->ViewValue = $this->Others10->CurrentValue;
        $this->Others10->ViewCustomAttributes = "";

        // Others11
        $this->Others11->ViewValue = $this->Others11->CurrentValue;
        $this->Others11->ViewCustomAttributes = "";

        // Others12
        $this->Others12->ViewValue = $this->Others12->CurrentValue;
        $this->Others12->ViewCustomAttributes = "";

        // Others13
        $this->Others13->ViewValue = $this->Others13->CurrentValue;
        $this->Others13->ViewCustomAttributes = "";

        // DR1
        $this->DR1->ViewValue = $this->DR1->CurrentValue;
        $this->DR1->ViewCustomAttributes = "";

        // DR2
        $this->DR2->ViewValue = $this->DR2->CurrentValue;
        $this->DR2->ViewCustomAttributes = "";

        // DR3
        $this->DR3->ViewValue = $this->DR3->CurrentValue;
        $this->DR3->ViewCustomAttributes = "";

        // DR4
        $this->DR4->ViewValue = $this->DR4->CurrentValue;
        $this->DR4->ViewCustomAttributes = "";

        // DR5
        $this->DR5->ViewValue = $this->DR5->CurrentValue;
        $this->DR5->ViewCustomAttributes = "";

        // DR6
        $this->DR6->ViewValue = $this->DR6->CurrentValue;
        $this->DR6->ViewCustomAttributes = "";

        // DR7
        $this->DR7->ViewValue = $this->DR7->CurrentValue;
        $this->DR7->ViewCustomAttributes = "";

        // DR8
        $this->DR8->ViewValue = $this->DR8->CurrentValue;
        $this->DR8->ViewCustomAttributes = "";

        // DR9
        $this->DR9->ViewValue = $this->DR9->CurrentValue;
        $this->DR9->ViewCustomAttributes = "";

        // DR10
        $this->DR10->ViewValue = $this->DR10->CurrentValue;
        $this->DR10->ViewCustomAttributes = "";

        // DR11
        $this->DR11->ViewValue = $this->DR11->CurrentValue;
        $this->DR11->ViewCustomAttributes = "";

        // DR12
        $this->DR12->ViewValue = $this->DR12->CurrentValue;
        $this->DR12->ViewCustomAttributes = "";

        // DR13
        $this->DR13->ViewValue = $this->DR13->CurrentValue;
        $this->DR13->ViewCustomAttributes = "";

        // DOCTORRESPONSIBLE
        $this->DOCTORRESPONSIBLE->ViewValue = $this->DOCTORRESPONSIBLE->CurrentValue;
        $this->DOCTORRESPONSIBLE->ViewCustomAttributes = "";

        // TidNo
        $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
        $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
        $this->TidNo->ViewCustomAttributes = "";

        // Convert
        if (strval($this->Convert->CurrentValue) != "") {
            $this->Convert->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->Convert->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->Convert->ViewValue->add($this->Convert->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->Convert->ViewValue = null;
        }
        $this->Convert->ViewCustomAttributes = "";

        // Consultant
        $this->Consultant->ViewValue = $this->Consultant->CurrentValue;
        $this->Consultant->ViewCustomAttributes = "";

        // InseminatinTechnique
        if (strval($this->InseminatinTechnique->CurrentValue) != "") {
            $this->InseminatinTechnique->ViewValue = $this->InseminatinTechnique->optionCaption($this->InseminatinTechnique->CurrentValue);
        } else {
            $this->InseminatinTechnique->ViewValue = null;
        }
        $this->InseminatinTechnique->ViewCustomAttributes = "";

        // IndicationForART
        if (strval($this->IndicationForART->CurrentValue) != "") {
            $this->IndicationForART->ViewValue = $this->IndicationForART->optionCaption($this->IndicationForART->CurrentValue);
        } else {
            $this->IndicationForART->ViewValue = null;
        }
        $this->IndicationForART->ViewCustomAttributes = "";

        // Hysteroscopy
        if (strval($this->Hysteroscopy->CurrentValue) != "") {
            $this->Hysteroscopy->ViewValue = $this->Hysteroscopy->optionCaption($this->Hysteroscopy->CurrentValue);
        } else {
            $this->Hysteroscopy->ViewValue = null;
        }
        $this->Hysteroscopy->ViewCustomAttributes = "";

        // EndometrialScratching
        if (strval($this->EndometrialScratching->CurrentValue) != "") {
            $this->EndometrialScratching->ViewValue = $this->EndometrialScratching->optionCaption($this->EndometrialScratching->CurrentValue);
        } else {
            $this->EndometrialScratching->ViewValue = null;
        }
        $this->EndometrialScratching->ViewCustomAttributes = "";

        // TrialCannulation
        if (strval($this->TrialCannulation->CurrentValue) != "") {
            $this->TrialCannulation->ViewValue = $this->TrialCannulation->optionCaption($this->TrialCannulation->CurrentValue);
        } else {
            $this->TrialCannulation->ViewValue = null;
        }
        $this->TrialCannulation->ViewCustomAttributes = "";

        // CYCLETYPE
        if (strval($this->CYCLETYPE->CurrentValue) != "") {
            $this->CYCLETYPE->ViewValue = $this->CYCLETYPE->optionCaption($this->CYCLETYPE->CurrentValue);
        } else {
            $this->CYCLETYPE->ViewValue = null;
        }
        $this->CYCLETYPE->ViewCustomAttributes = "";

        // HRTCYCLE
        $this->HRTCYCLE->ViewValue = $this->HRTCYCLE->CurrentValue;
        $this->HRTCYCLE->ViewCustomAttributes = "";

        // OralEstrogenDosage
        if (strval($this->OralEstrogenDosage->CurrentValue) != "") {
            $this->OralEstrogenDosage->ViewValue = $this->OralEstrogenDosage->optionCaption($this->OralEstrogenDosage->CurrentValue);
        } else {
            $this->OralEstrogenDosage->ViewValue = null;
        }
        $this->OralEstrogenDosage->ViewCustomAttributes = "";

        // VaginalEstrogen
        $this->VaginalEstrogen->ViewValue = $this->VaginalEstrogen->CurrentValue;
        $this->VaginalEstrogen->ViewCustomAttributes = "";

        // GCSF
        if (strval($this->GCSF->CurrentValue) != "") {
            $this->GCSF->ViewValue = $this->GCSF->optionCaption($this->GCSF->CurrentValue);
        } else {
            $this->GCSF->ViewValue = null;
        }
        $this->GCSF->ViewCustomAttributes = "";

        // ActivatedPRP
        if (strval($this->ActivatedPRP->CurrentValue) != "") {
            $this->ActivatedPRP->ViewValue = $this->ActivatedPRP->optionCaption($this->ActivatedPRP->CurrentValue);
        } else {
            $this->ActivatedPRP->ViewValue = null;
        }
        $this->ActivatedPRP->ViewCustomAttributes = "";

        // UCLcm
        $this->UCLcm->ViewValue = $this->UCLcm->CurrentValue;
        $this->UCLcm->ViewCustomAttributes = "";

        // DATOFEMBRYOTRANSFER
        $this->DATOFEMBRYOTRANSFER->ViewValue = $this->DATOFEMBRYOTRANSFER->CurrentValue;
        $this->DATOFEMBRYOTRANSFER->ViewCustomAttributes = "";

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

        // ViaAdmin
        $this->ViaAdmin->ViewValue = $this->ViaAdmin->CurrentValue;
        $this->ViaAdmin->ViewCustomAttributes = "";

        // ViaStartDateTime
        $this->ViaStartDateTime->ViewValue = $this->ViaStartDateTime->CurrentValue;
        $this->ViaStartDateTime->ViewValue = FormatDateTime($this->ViaStartDateTime->ViewValue, 0);
        $this->ViaStartDateTime->ViewCustomAttributes = "";

        // ViaDose
        $this->ViaDose->ViewValue = $this->ViaDose->CurrentValue;
        $this->ViaDose->ViewCustomAttributes = "";

        // AllFreeze
        if (strval($this->AllFreeze->CurrentValue) != "") {
            $this->AllFreeze->ViewValue = $this->AllFreeze->optionCaption($this->AllFreeze->CurrentValue);
        } else {
            $this->AllFreeze->ViewValue = null;
        }
        $this->AllFreeze->ViewCustomAttributes = "";

        // TreatmentCancel
        if (strval($this->TreatmentCancel->CurrentValue) != "") {
            $this->TreatmentCancel->ViewValue = $this->TreatmentCancel->optionCaption($this->TreatmentCancel->CurrentValue);
        } else {
            $this->TreatmentCancel->ViewValue = null;
        }
        $this->TreatmentCancel->ViewCustomAttributes = "";

        // Reason
        $this->Reason->ViewValue = $this->Reason->CurrentValue;
        $this->Reason->ViewCustomAttributes = "";

        // ProgesteroneAdmin
        $this->ProgesteroneAdmin->ViewValue = $this->ProgesteroneAdmin->CurrentValue;
        $this->ProgesteroneAdmin->ViewCustomAttributes = "";

        // ProgesteroneStart
        $this->ProgesteroneStart->ViewValue = $this->ProgesteroneStart->CurrentValue;
        $this->ProgesteroneStart->ViewCustomAttributes = "";

        // ProgesteroneDose
        $this->ProgesteroneDose->ViewValue = $this->ProgesteroneDose->CurrentValue;
        $this->ProgesteroneDose->ViewCustomAttributes = "";

        // Projectron
        if (strval($this->Projectron->CurrentValue) != "") {
            $this->Projectron->ViewValue = $this->Projectron->optionCaption($this->Projectron->CurrentValue);
        } else {
            $this->Projectron->ViewValue = null;
        }
        $this->Projectron->ViewCustomAttributes = "";

        // StChDate14
        $this->StChDate14->ViewValue = $this->StChDate14->CurrentValue;
        $this->StChDate14->ViewValue = FormatDateTime($this->StChDate14->ViewValue, 7);
        $this->StChDate14->ViewCustomAttributes = "";

        // StChDate15
        $this->StChDate15->ViewValue = $this->StChDate15->CurrentValue;
        $this->StChDate15->ViewValue = FormatDateTime($this->StChDate15->ViewValue, 7);
        $this->StChDate15->ViewCustomAttributes = "";

        // StChDate16
        $this->StChDate16->ViewValue = $this->StChDate16->CurrentValue;
        $this->StChDate16->ViewValue = FormatDateTime($this->StChDate16->ViewValue, 7);
        $this->StChDate16->ViewCustomAttributes = "";

        // StChDate17
        $this->StChDate17->ViewValue = $this->StChDate17->CurrentValue;
        $this->StChDate17->ViewValue = FormatDateTime($this->StChDate17->ViewValue, 7);
        $this->StChDate17->ViewCustomAttributes = "";

        // StChDate18
        $this->StChDate18->ViewValue = $this->StChDate18->CurrentValue;
        $this->StChDate18->ViewValue = FormatDateTime($this->StChDate18->ViewValue, 7);
        $this->StChDate18->ViewCustomAttributes = "";

        // StChDate19
        $this->StChDate19->ViewValue = $this->StChDate19->CurrentValue;
        $this->StChDate19->ViewValue = FormatDateTime($this->StChDate19->ViewValue, 7);
        $this->StChDate19->ViewCustomAttributes = "";

        // StChDate20
        $this->StChDate20->ViewValue = $this->StChDate20->CurrentValue;
        $this->StChDate20->ViewValue = FormatDateTime($this->StChDate20->ViewValue, 7);
        $this->StChDate20->ViewCustomAttributes = "";

        // StChDate21
        $this->StChDate21->ViewValue = $this->StChDate21->CurrentValue;
        $this->StChDate21->ViewValue = FormatDateTime($this->StChDate21->ViewValue, 7);
        $this->StChDate21->ViewCustomAttributes = "";

        // StChDate22
        $this->StChDate22->ViewValue = $this->StChDate22->CurrentValue;
        $this->StChDate22->ViewValue = FormatDateTime($this->StChDate22->ViewValue, 7);
        $this->StChDate22->ViewCustomAttributes = "";

        // StChDate23
        $this->StChDate23->ViewValue = $this->StChDate23->CurrentValue;
        $this->StChDate23->ViewValue = FormatDateTime($this->StChDate23->ViewValue, 7);
        $this->StChDate23->ViewCustomAttributes = "";

        // StChDate24
        $this->StChDate24->ViewValue = $this->StChDate24->CurrentValue;
        $this->StChDate24->ViewValue = FormatDateTime($this->StChDate24->ViewValue, 7);
        $this->StChDate24->ViewCustomAttributes = "";

        // StChDate25
        $this->StChDate25->ViewValue = $this->StChDate25->CurrentValue;
        $this->StChDate25->ViewValue = FormatDateTime($this->StChDate25->ViewValue, 7);
        $this->StChDate25->ViewCustomAttributes = "";

        // CycleDay14
        $this->CycleDay14->ViewValue = $this->CycleDay14->CurrentValue;
        $this->CycleDay14->ViewCustomAttributes = "";

        // CycleDay15
        $this->CycleDay15->ViewValue = $this->CycleDay15->CurrentValue;
        $this->CycleDay15->ViewCustomAttributes = "";

        // CycleDay16
        $this->CycleDay16->ViewValue = $this->CycleDay16->CurrentValue;
        $this->CycleDay16->ViewCustomAttributes = "";

        // CycleDay17
        $this->CycleDay17->ViewValue = $this->CycleDay17->CurrentValue;
        $this->CycleDay17->ViewCustomAttributes = "";

        // CycleDay18
        $this->CycleDay18->ViewValue = $this->CycleDay18->CurrentValue;
        $this->CycleDay18->ViewCustomAttributes = "";

        // CycleDay19
        $this->CycleDay19->ViewValue = $this->CycleDay19->CurrentValue;
        $this->CycleDay19->ViewCustomAttributes = "";

        // CycleDay20
        $this->CycleDay20->ViewValue = $this->CycleDay20->CurrentValue;
        $this->CycleDay20->ViewCustomAttributes = "";

        // CycleDay21
        $this->CycleDay21->ViewValue = $this->CycleDay21->CurrentValue;
        $this->CycleDay21->ViewCustomAttributes = "";

        // CycleDay22
        $this->CycleDay22->ViewValue = $this->CycleDay22->CurrentValue;
        $this->CycleDay22->ViewCustomAttributes = "";

        // CycleDay23
        $this->CycleDay23->ViewValue = $this->CycleDay23->CurrentValue;
        $this->CycleDay23->ViewCustomAttributes = "";

        // CycleDay24
        $this->CycleDay24->ViewValue = $this->CycleDay24->CurrentValue;
        $this->CycleDay24->ViewCustomAttributes = "";

        // CycleDay25
        $this->CycleDay25->ViewValue = $this->CycleDay25->CurrentValue;
        $this->CycleDay25->ViewCustomAttributes = "";

        // StimulationDay14
        $this->StimulationDay14->ViewValue = $this->StimulationDay14->CurrentValue;
        $this->StimulationDay14->ViewCustomAttributes = "";

        // StimulationDay15
        $this->StimulationDay15->ViewValue = $this->StimulationDay15->CurrentValue;
        $this->StimulationDay15->ViewCustomAttributes = "";

        // StimulationDay16
        $this->StimulationDay16->ViewValue = $this->StimulationDay16->CurrentValue;
        $this->StimulationDay16->ViewCustomAttributes = "";

        // StimulationDay17
        $this->StimulationDay17->ViewValue = $this->StimulationDay17->CurrentValue;
        $this->StimulationDay17->ViewCustomAttributes = "";

        // StimulationDay18
        $this->StimulationDay18->ViewValue = $this->StimulationDay18->CurrentValue;
        $this->StimulationDay18->ViewCustomAttributes = "";

        // StimulationDay19
        $this->StimulationDay19->ViewValue = $this->StimulationDay19->CurrentValue;
        $this->StimulationDay19->ViewCustomAttributes = "";

        // StimulationDay20
        $this->StimulationDay20->ViewValue = $this->StimulationDay20->CurrentValue;
        $this->StimulationDay20->ViewCustomAttributes = "";

        // StimulationDay21
        $this->StimulationDay21->ViewValue = $this->StimulationDay21->CurrentValue;
        $this->StimulationDay21->ViewCustomAttributes = "";

        // StimulationDay22
        $this->StimulationDay22->ViewValue = $this->StimulationDay22->CurrentValue;
        $this->StimulationDay22->ViewCustomAttributes = "";

        // StimulationDay23
        $this->StimulationDay23->ViewValue = $this->StimulationDay23->CurrentValue;
        $this->StimulationDay23->ViewCustomAttributes = "";

        // StimulationDay24
        $this->StimulationDay24->ViewValue = $this->StimulationDay24->CurrentValue;
        $this->StimulationDay24->ViewCustomAttributes = "";

        // StimulationDay25
        $this->StimulationDay25->ViewValue = $this->StimulationDay25->CurrentValue;
        $this->StimulationDay25->ViewCustomAttributes = "";

        // Tablet14
        $curVal = trim(strval($this->Tablet14->CurrentValue));
        if ($curVal != "") {
            $this->Tablet14->ViewValue = $this->Tablet14->lookupCacheOption($curVal);
            if ($this->Tablet14->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Tablet14->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Tablet14->Lookup->renderViewRow($rswrk[0]);
                    $this->Tablet14->ViewValue = $this->Tablet14->displayValue($arwrk);
                } else {
                    $this->Tablet14->ViewValue = $this->Tablet14->CurrentValue;
                }
            }
        } else {
            $this->Tablet14->ViewValue = null;
        }
        $this->Tablet14->ViewCustomAttributes = "";

        // Tablet15
        $curVal = trim(strval($this->Tablet15->CurrentValue));
        if ($curVal != "") {
            $this->Tablet15->ViewValue = $this->Tablet15->lookupCacheOption($curVal);
            if ($this->Tablet15->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Tablet15->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Tablet15->Lookup->renderViewRow($rswrk[0]);
                    $this->Tablet15->ViewValue = $this->Tablet15->displayValue($arwrk);
                } else {
                    $this->Tablet15->ViewValue = $this->Tablet15->CurrentValue;
                }
            }
        } else {
            $this->Tablet15->ViewValue = null;
        }
        $this->Tablet15->ViewCustomAttributes = "";

        // Tablet16
        $curVal = trim(strval($this->Tablet16->CurrentValue));
        if ($curVal != "") {
            $this->Tablet16->ViewValue = $this->Tablet16->lookupCacheOption($curVal);
            if ($this->Tablet16->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Tablet16->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Tablet16->Lookup->renderViewRow($rswrk[0]);
                    $this->Tablet16->ViewValue = $this->Tablet16->displayValue($arwrk);
                } else {
                    $this->Tablet16->ViewValue = $this->Tablet16->CurrentValue;
                }
            }
        } else {
            $this->Tablet16->ViewValue = null;
        }
        $this->Tablet16->ViewCustomAttributes = "";

        // Tablet17
        $curVal = trim(strval($this->Tablet17->CurrentValue));
        if ($curVal != "") {
            $this->Tablet17->ViewValue = $this->Tablet17->lookupCacheOption($curVal);
            if ($this->Tablet17->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Tablet17->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Tablet17->Lookup->renderViewRow($rswrk[0]);
                    $this->Tablet17->ViewValue = $this->Tablet17->displayValue($arwrk);
                } else {
                    $this->Tablet17->ViewValue = $this->Tablet17->CurrentValue;
                }
            }
        } else {
            $this->Tablet17->ViewValue = null;
        }
        $this->Tablet17->ViewCustomAttributes = "";

        // Tablet18
        $curVal = trim(strval($this->Tablet18->CurrentValue));
        if ($curVal != "") {
            $this->Tablet18->ViewValue = $this->Tablet18->lookupCacheOption($curVal);
            if ($this->Tablet18->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Tablet18->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Tablet18->Lookup->renderViewRow($rswrk[0]);
                    $this->Tablet18->ViewValue = $this->Tablet18->displayValue($arwrk);
                } else {
                    $this->Tablet18->ViewValue = $this->Tablet18->CurrentValue;
                }
            }
        } else {
            $this->Tablet18->ViewValue = null;
        }
        $this->Tablet18->ViewCustomAttributes = "";

        // Tablet19
        $curVal = trim(strval($this->Tablet19->CurrentValue));
        if ($curVal != "") {
            $this->Tablet19->ViewValue = $this->Tablet19->lookupCacheOption($curVal);
            if ($this->Tablet19->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Tablet19->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Tablet19->Lookup->renderViewRow($rswrk[0]);
                    $this->Tablet19->ViewValue = $this->Tablet19->displayValue($arwrk);
                } else {
                    $this->Tablet19->ViewValue = $this->Tablet19->CurrentValue;
                }
            }
        } else {
            $this->Tablet19->ViewValue = null;
        }
        $this->Tablet19->ViewCustomAttributes = "";

        // Tablet20
        $curVal = trim(strval($this->Tablet20->CurrentValue));
        if ($curVal != "") {
            $this->Tablet20->ViewValue = $this->Tablet20->lookupCacheOption($curVal);
            if ($this->Tablet20->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Tablet20->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Tablet20->Lookup->renderViewRow($rswrk[0]);
                    $this->Tablet20->ViewValue = $this->Tablet20->displayValue($arwrk);
                } else {
                    $this->Tablet20->ViewValue = $this->Tablet20->CurrentValue;
                }
            }
        } else {
            $this->Tablet20->ViewValue = null;
        }
        $this->Tablet20->ViewCustomAttributes = "";

        // Tablet21
        $curVal = trim(strval($this->Tablet21->CurrentValue));
        if ($curVal != "") {
            $this->Tablet21->ViewValue = $this->Tablet21->lookupCacheOption($curVal);
            if ($this->Tablet21->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Tablet21->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Tablet21->Lookup->renderViewRow($rswrk[0]);
                    $this->Tablet21->ViewValue = $this->Tablet21->displayValue($arwrk);
                } else {
                    $this->Tablet21->ViewValue = $this->Tablet21->CurrentValue;
                }
            }
        } else {
            $this->Tablet21->ViewValue = null;
        }
        $this->Tablet21->ViewCustomAttributes = "";

        // Tablet22
        $curVal = trim(strval($this->Tablet22->CurrentValue));
        if ($curVal != "") {
            $this->Tablet22->ViewValue = $this->Tablet22->lookupCacheOption($curVal);
            if ($this->Tablet22->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Tablet22->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Tablet22->Lookup->renderViewRow($rswrk[0]);
                    $this->Tablet22->ViewValue = $this->Tablet22->displayValue($arwrk);
                } else {
                    $this->Tablet22->ViewValue = $this->Tablet22->CurrentValue;
                }
            }
        } else {
            $this->Tablet22->ViewValue = null;
        }
        $this->Tablet22->ViewCustomAttributes = "";

        // Tablet23
        $curVal = trim(strval($this->Tablet23->CurrentValue));
        if ($curVal != "") {
            $this->Tablet23->ViewValue = $this->Tablet23->lookupCacheOption($curVal);
            if ($this->Tablet23->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Tablet23->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Tablet23->Lookup->renderViewRow($rswrk[0]);
                    $this->Tablet23->ViewValue = $this->Tablet23->displayValue($arwrk);
                } else {
                    $this->Tablet23->ViewValue = $this->Tablet23->CurrentValue;
                }
            }
        } else {
            $this->Tablet23->ViewValue = null;
        }
        $this->Tablet23->ViewCustomAttributes = "";

        // Tablet24
        $curVal = trim(strval($this->Tablet24->CurrentValue));
        if ($curVal != "") {
            $this->Tablet24->ViewValue = $this->Tablet24->lookupCacheOption($curVal);
            if ($this->Tablet24->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Tablet24->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Tablet24->Lookup->renderViewRow($rswrk[0]);
                    $this->Tablet24->ViewValue = $this->Tablet24->displayValue($arwrk);
                } else {
                    $this->Tablet24->ViewValue = $this->Tablet24->CurrentValue;
                }
            }
        } else {
            $this->Tablet24->ViewValue = null;
        }
        $this->Tablet24->ViewCustomAttributes = "";

        // Tablet25
        $curVal = trim(strval($this->Tablet25->CurrentValue));
        if ($curVal != "") {
            $this->Tablet25->ViewValue = $this->Tablet25->lookupCacheOption($curVal);
            if ($this->Tablet25->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Tablet25->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Tablet25->Lookup->renderViewRow($rswrk[0]);
                    $this->Tablet25->ViewValue = $this->Tablet25->displayValue($arwrk);
                } else {
                    $this->Tablet25->ViewValue = $this->Tablet25->CurrentValue;
                }
            }
        } else {
            $this->Tablet25->ViewValue = null;
        }
        $this->Tablet25->ViewCustomAttributes = "";

        // RFSH14
        $curVal = trim(strval($this->RFSH14->CurrentValue));
        if ($curVal != "") {
            $this->RFSH14->ViewValue = $this->RFSH14->lookupCacheOption($curVal);
            if ($this->RFSH14->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->RFSH14->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->RFSH14->Lookup->renderViewRow($rswrk[0]);
                    $this->RFSH14->ViewValue = $this->RFSH14->displayValue($arwrk);
                } else {
                    $this->RFSH14->ViewValue = $this->RFSH14->CurrentValue;
                }
            }
        } else {
            $this->RFSH14->ViewValue = null;
        }
        $this->RFSH14->ViewCustomAttributes = "";

        // RFSH15
        $curVal = trim(strval($this->RFSH15->CurrentValue));
        if ($curVal != "") {
            $this->RFSH15->ViewValue = $this->RFSH15->lookupCacheOption($curVal);
            if ($this->RFSH15->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->RFSH15->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->RFSH15->Lookup->renderViewRow($rswrk[0]);
                    $this->RFSH15->ViewValue = $this->RFSH15->displayValue($arwrk);
                } else {
                    $this->RFSH15->ViewValue = $this->RFSH15->CurrentValue;
                }
            }
        } else {
            $this->RFSH15->ViewValue = null;
        }
        $this->RFSH15->ViewCustomAttributes = "";

        // RFSH16
        $curVal = trim(strval($this->RFSH16->CurrentValue));
        if ($curVal != "") {
            $this->RFSH16->ViewValue = $this->RFSH16->lookupCacheOption($curVal);
            if ($this->RFSH16->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->RFSH16->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->RFSH16->Lookup->renderViewRow($rswrk[0]);
                    $this->RFSH16->ViewValue = $this->RFSH16->displayValue($arwrk);
                } else {
                    $this->RFSH16->ViewValue = $this->RFSH16->CurrentValue;
                }
            }
        } else {
            $this->RFSH16->ViewValue = null;
        }
        $this->RFSH16->ViewCustomAttributes = "";

        // RFSH17
        $curVal = trim(strval($this->RFSH17->CurrentValue));
        if ($curVal != "") {
            $this->RFSH17->ViewValue = $this->RFSH17->lookupCacheOption($curVal);
            if ($this->RFSH17->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->RFSH17->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->RFSH17->Lookup->renderViewRow($rswrk[0]);
                    $this->RFSH17->ViewValue = $this->RFSH17->displayValue($arwrk);
                } else {
                    $this->RFSH17->ViewValue = $this->RFSH17->CurrentValue;
                }
            }
        } else {
            $this->RFSH17->ViewValue = null;
        }
        $this->RFSH17->ViewCustomAttributes = "";

        // RFSH18
        $curVal = trim(strval($this->RFSH18->CurrentValue));
        if ($curVal != "") {
            $this->RFSH18->ViewValue = $this->RFSH18->lookupCacheOption($curVal);
            if ($this->RFSH18->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->RFSH18->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->RFSH18->Lookup->renderViewRow($rswrk[0]);
                    $this->RFSH18->ViewValue = $this->RFSH18->displayValue($arwrk);
                } else {
                    $this->RFSH18->ViewValue = $this->RFSH18->CurrentValue;
                }
            }
        } else {
            $this->RFSH18->ViewValue = null;
        }
        $this->RFSH18->ViewCustomAttributes = "";

        // RFSH19
        $curVal = trim(strval($this->RFSH19->CurrentValue));
        if ($curVal != "") {
            $this->RFSH19->ViewValue = $this->RFSH19->lookupCacheOption($curVal);
            if ($this->RFSH19->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->RFSH19->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->RFSH19->Lookup->renderViewRow($rswrk[0]);
                    $this->RFSH19->ViewValue = $this->RFSH19->displayValue($arwrk);
                } else {
                    $this->RFSH19->ViewValue = $this->RFSH19->CurrentValue;
                }
            }
        } else {
            $this->RFSH19->ViewValue = null;
        }
        $this->RFSH19->ViewCustomAttributes = "";

        // RFSH20
        $curVal = trim(strval($this->RFSH20->CurrentValue));
        if ($curVal != "") {
            $this->RFSH20->ViewValue = $this->RFSH20->lookupCacheOption($curVal);
            if ($this->RFSH20->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->RFSH20->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->RFSH20->Lookup->renderViewRow($rswrk[0]);
                    $this->RFSH20->ViewValue = $this->RFSH20->displayValue($arwrk);
                } else {
                    $this->RFSH20->ViewValue = $this->RFSH20->CurrentValue;
                }
            }
        } else {
            $this->RFSH20->ViewValue = null;
        }
        $this->RFSH20->ViewCustomAttributes = "";

        // RFSH21
        $curVal = trim(strval($this->RFSH21->CurrentValue));
        if ($curVal != "") {
            $this->RFSH21->ViewValue = $this->RFSH21->lookupCacheOption($curVal);
            if ($this->RFSH21->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->RFSH21->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->RFSH21->Lookup->renderViewRow($rswrk[0]);
                    $this->RFSH21->ViewValue = $this->RFSH21->displayValue($arwrk);
                } else {
                    $this->RFSH21->ViewValue = $this->RFSH21->CurrentValue;
                }
            }
        } else {
            $this->RFSH21->ViewValue = null;
        }
        $this->RFSH21->ViewCustomAttributes = "";

        // RFSH22
        $curVal = trim(strval($this->RFSH22->CurrentValue));
        if ($curVal != "") {
            $this->RFSH22->ViewValue = $this->RFSH22->lookupCacheOption($curVal);
            if ($this->RFSH22->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->RFSH22->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->RFSH22->Lookup->renderViewRow($rswrk[0]);
                    $this->RFSH22->ViewValue = $this->RFSH22->displayValue($arwrk);
                } else {
                    $this->RFSH22->ViewValue = $this->RFSH22->CurrentValue;
                }
            }
        } else {
            $this->RFSH22->ViewValue = null;
        }
        $this->RFSH22->ViewCustomAttributes = "";

        // RFSH23
        $curVal = trim(strval($this->RFSH23->CurrentValue));
        if ($curVal != "") {
            $this->RFSH23->ViewValue = $this->RFSH23->lookupCacheOption($curVal);
            if ($this->RFSH23->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->RFSH23->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->RFSH23->Lookup->renderViewRow($rswrk[0]);
                    $this->RFSH23->ViewValue = $this->RFSH23->displayValue($arwrk);
                } else {
                    $this->RFSH23->ViewValue = $this->RFSH23->CurrentValue;
                }
            }
        } else {
            $this->RFSH23->ViewValue = null;
        }
        $this->RFSH23->ViewCustomAttributes = "";

        // RFSH24
        $curVal = trim(strval($this->RFSH24->CurrentValue));
        if ($curVal != "") {
            $this->RFSH24->ViewValue = $this->RFSH24->lookupCacheOption($curVal);
            if ($this->RFSH24->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->RFSH24->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->RFSH24->Lookup->renderViewRow($rswrk[0]);
                    $this->RFSH24->ViewValue = $this->RFSH24->displayValue($arwrk);
                } else {
                    $this->RFSH24->ViewValue = $this->RFSH24->CurrentValue;
                }
            }
        } else {
            $this->RFSH24->ViewValue = null;
        }
        $this->RFSH24->ViewCustomAttributes = "";

        // RFSH25
        $curVal = trim(strval($this->RFSH25->CurrentValue));
        if ($curVal != "") {
            $this->RFSH25->ViewValue = $this->RFSH25->lookupCacheOption($curVal);
            if ($this->RFSH25->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->RFSH25->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->RFSH25->Lookup->renderViewRow($rswrk[0]);
                    $this->RFSH25->ViewValue = $this->RFSH25->displayValue($arwrk);
                } else {
                    $this->RFSH25->ViewValue = $this->RFSH25->CurrentValue;
                }
            }
        } else {
            $this->RFSH25->ViewValue = null;
        }
        $this->RFSH25->ViewCustomAttributes = "";

        // HMG14
        $curVal = trim(strval($this->HMG14->CurrentValue));
        if ($curVal != "") {
            $this->HMG14->ViewValue = $this->HMG14->lookupCacheOption($curVal);
            if ($this->HMG14->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->HMG14->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->HMG14->Lookup->renderViewRow($rswrk[0]);
                    $this->HMG14->ViewValue = $this->HMG14->displayValue($arwrk);
                } else {
                    $this->HMG14->ViewValue = $this->HMG14->CurrentValue;
                }
            }
        } else {
            $this->HMG14->ViewValue = null;
        }
        $this->HMG14->ViewCustomAttributes = "";

        // HMG15
        $curVal = trim(strval($this->HMG15->CurrentValue));
        if ($curVal != "") {
            $this->HMG15->ViewValue = $this->HMG15->lookupCacheOption($curVal);
            if ($this->HMG15->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->HMG15->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->HMG15->Lookup->renderViewRow($rswrk[0]);
                    $this->HMG15->ViewValue = $this->HMG15->displayValue($arwrk);
                } else {
                    $this->HMG15->ViewValue = $this->HMG15->CurrentValue;
                }
            }
        } else {
            $this->HMG15->ViewValue = null;
        }
        $this->HMG15->ViewCustomAttributes = "";

        // HMG16
        $curVal = trim(strval($this->HMG16->CurrentValue));
        if ($curVal != "") {
            $this->HMG16->ViewValue = $this->HMG16->lookupCacheOption($curVal);
            if ($this->HMG16->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->HMG16->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->HMG16->Lookup->renderViewRow($rswrk[0]);
                    $this->HMG16->ViewValue = $this->HMG16->displayValue($arwrk);
                } else {
                    $this->HMG16->ViewValue = $this->HMG16->CurrentValue;
                }
            }
        } else {
            $this->HMG16->ViewValue = null;
        }
        $this->HMG16->ViewCustomAttributes = "";

        // HMG17
        $curVal = trim(strval($this->HMG17->CurrentValue));
        if ($curVal != "") {
            $this->HMG17->ViewValue = $this->HMG17->lookupCacheOption($curVal);
            if ($this->HMG17->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->HMG17->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->HMG17->Lookup->renderViewRow($rswrk[0]);
                    $this->HMG17->ViewValue = $this->HMG17->displayValue($arwrk);
                } else {
                    $this->HMG17->ViewValue = $this->HMG17->CurrentValue;
                }
            }
        } else {
            $this->HMG17->ViewValue = null;
        }
        $this->HMG17->ViewCustomAttributes = "";

        // HMG18
        $curVal = trim(strval($this->HMG18->CurrentValue));
        if ($curVal != "") {
            $this->HMG18->ViewValue = $this->HMG18->lookupCacheOption($curVal);
            if ($this->HMG18->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->HMG18->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->HMG18->Lookup->renderViewRow($rswrk[0]);
                    $this->HMG18->ViewValue = $this->HMG18->displayValue($arwrk);
                } else {
                    $this->HMG18->ViewValue = $this->HMG18->CurrentValue;
                }
            }
        } else {
            $this->HMG18->ViewValue = null;
        }
        $this->HMG18->ViewCustomAttributes = "";

        // HMG19
        $curVal = trim(strval($this->HMG19->CurrentValue));
        if ($curVal != "") {
            $this->HMG19->ViewValue = $this->HMG19->lookupCacheOption($curVal);
            if ($this->HMG19->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->HMG19->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->HMG19->Lookup->renderViewRow($rswrk[0]);
                    $this->HMG19->ViewValue = $this->HMG19->displayValue($arwrk);
                } else {
                    $this->HMG19->ViewValue = $this->HMG19->CurrentValue;
                }
            }
        } else {
            $this->HMG19->ViewValue = null;
        }
        $this->HMG19->ViewCustomAttributes = "";

        // HMG20
        $curVal = trim(strval($this->HMG20->CurrentValue));
        if ($curVal != "") {
            $this->HMG20->ViewValue = $this->HMG20->lookupCacheOption($curVal);
            if ($this->HMG20->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->HMG20->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->HMG20->Lookup->renderViewRow($rswrk[0]);
                    $this->HMG20->ViewValue = $this->HMG20->displayValue($arwrk);
                } else {
                    $this->HMG20->ViewValue = $this->HMG20->CurrentValue;
                }
            }
        } else {
            $this->HMG20->ViewValue = null;
        }
        $this->HMG20->ViewCustomAttributes = "";

        // HMG21
        $curVal = trim(strval($this->HMG21->CurrentValue));
        if ($curVal != "") {
            $this->HMG21->ViewValue = $this->HMG21->lookupCacheOption($curVal);
            if ($this->HMG21->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->HMG21->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->HMG21->Lookup->renderViewRow($rswrk[0]);
                    $this->HMG21->ViewValue = $this->HMG21->displayValue($arwrk);
                } else {
                    $this->HMG21->ViewValue = $this->HMG21->CurrentValue;
                }
            }
        } else {
            $this->HMG21->ViewValue = null;
        }
        $this->HMG21->ViewCustomAttributes = "";

        // HMG22
        $curVal = trim(strval($this->HMG22->CurrentValue));
        if ($curVal != "") {
            $this->HMG22->ViewValue = $this->HMG22->lookupCacheOption($curVal);
            if ($this->HMG22->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->HMG22->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->HMG22->Lookup->renderViewRow($rswrk[0]);
                    $this->HMG22->ViewValue = $this->HMG22->displayValue($arwrk);
                } else {
                    $this->HMG22->ViewValue = $this->HMG22->CurrentValue;
                }
            }
        } else {
            $this->HMG22->ViewValue = null;
        }
        $this->HMG22->ViewCustomAttributes = "";

        // HMG23
        $curVal = trim(strval($this->HMG23->CurrentValue));
        if ($curVal != "") {
            $this->HMG23->ViewValue = $this->HMG23->lookupCacheOption($curVal);
            if ($this->HMG23->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->HMG23->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->HMG23->Lookup->renderViewRow($rswrk[0]);
                    $this->HMG23->ViewValue = $this->HMG23->displayValue($arwrk);
                } else {
                    $this->HMG23->ViewValue = $this->HMG23->CurrentValue;
                }
            }
        } else {
            $this->HMG23->ViewValue = null;
        }
        $this->HMG23->ViewCustomAttributes = "";

        // HMG24
        $curVal = trim(strval($this->HMG24->CurrentValue));
        if ($curVal != "") {
            $this->HMG24->ViewValue = $this->HMG24->lookupCacheOption($curVal);
            if ($this->HMG24->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->HMG24->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->HMG24->Lookup->renderViewRow($rswrk[0]);
                    $this->HMG24->ViewValue = $this->HMG24->displayValue($arwrk);
                } else {
                    $this->HMG24->ViewValue = $this->HMG24->CurrentValue;
                }
            }
        } else {
            $this->HMG24->ViewValue = null;
        }
        $this->HMG24->ViewCustomAttributes = "";

        // HMG25
        $curVal = trim(strval($this->HMG25->CurrentValue));
        if ($curVal != "") {
            $this->HMG25->ViewValue = $this->HMG25->lookupCacheOption($curVal);
            if ($this->HMG25->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->HMG25->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->HMG25->Lookup->renderViewRow($rswrk[0]);
                    $this->HMG25->ViewValue = $this->HMG25->displayValue($arwrk);
                } else {
                    $this->HMG25->ViewValue = $this->HMG25->CurrentValue;
                }
            }
        } else {
            $this->HMG25->ViewValue = null;
        }
        $this->HMG25->ViewCustomAttributes = "";

        // GnRH14
        $curVal = trim(strval($this->GnRH14->CurrentValue));
        if ($curVal != "") {
            $this->GnRH14->ViewValue = $this->GnRH14->lookupCacheOption($curVal);
            if ($this->GnRH14->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->GnRH14->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->GnRH14->Lookup->renderViewRow($rswrk[0]);
                    $this->GnRH14->ViewValue = $this->GnRH14->displayValue($arwrk);
                } else {
                    $this->GnRH14->ViewValue = $this->GnRH14->CurrentValue;
                }
            }
        } else {
            $this->GnRH14->ViewValue = null;
        }
        $this->GnRH14->ViewCustomAttributes = "";

        // GnRH15
        $curVal = trim(strval($this->GnRH15->CurrentValue));
        if ($curVal != "") {
            $this->GnRH15->ViewValue = $this->GnRH15->lookupCacheOption($curVal);
            if ($this->GnRH15->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->GnRH15->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->GnRH15->Lookup->renderViewRow($rswrk[0]);
                    $this->GnRH15->ViewValue = $this->GnRH15->displayValue($arwrk);
                } else {
                    $this->GnRH15->ViewValue = $this->GnRH15->CurrentValue;
                }
            }
        } else {
            $this->GnRH15->ViewValue = null;
        }
        $this->GnRH15->ViewCustomAttributes = "";

        // GnRH16
        $curVal = trim(strval($this->GnRH16->CurrentValue));
        if ($curVal != "") {
            $this->GnRH16->ViewValue = $this->GnRH16->lookupCacheOption($curVal);
            if ($this->GnRH16->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->GnRH16->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->GnRH16->Lookup->renderViewRow($rswrk[0]);
                    $this->GnRH16->ViewValue = $this->GnRH16->displayValue($arwrk);
                } else {
                    $this->GnRH16->ViewValue = $this->GnRH16->CurrentValue;
                }
            }
        } else {
            $this->GnRH16->ViewValue = null;
        }
        $this->GnRH16->ViewCustomAttributes = "";

        // GnRH17
        $curVal = trim(strval($this->GnRH17->CurrentValue));
        if ($curVal != "") {
            $this->GnRH17->ViewValue = $this->GnRH17->lookupCacheOption($curVal);
            if ($this->GnRH17->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->GnRH17->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->GnRH17->Lookup->renderViewRow($rswrk[0]);
                    $this->GnRH17->ViewValue = $this->GnRH17->displayValue($arwrk);
                } else {
                    $this->GnRH17->ViewValue = $this->GnRH17->CurrentValue;
                }
            }
        } else {
            $this->GnRH17->ViewValue = null;
        }
        $this->GnRH17->ViewCustomAttributes = "";

        // GnRH18
        $curVal = trim(strval($this->GnRH18->CurrentValue));
        if ($curVal != "") {
            $this->GnRH18->ViewValue = $this->GnRH18->lookupCacheOption($curVal);
            if ($this->GnRH18->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->GnRH18->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->GnRH18->Lookup->renderViewRow($rswrk[0]);
                    $this->GnRH18->ViewValue = $this->GnRH18->displayValue($arwrk);
                } else {
                    $this->GnRH18->ViewValue = $this->GnRH18->CurrentValue;
                }
            }
        } else {
            $this->GnRH18->ViewValue = null;
        }
        $this->GnRH18->ViewCustomAttributes = "";

        // GnRH19
        $curVal = trim(strval($this->GnRH19->CurrentValue));
        if ($curVal != "") {
            $this->GnRH19->ViewValue = $this->GnRH19->lookupCacheOption($curVal);
            if ($this->GnRH19->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->GnRH19->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->GnRH19->Lookup->renderViewRow($rswrk[0]);
                    $this->GnRH19->ViewValue = $this->GnRH19->displayValue($arwrk);
                } else {
                    $this->GnRH19->ViewValue = $this->GnRH19->CurrentValue;
                }
            }
        } else {
            $this->GnRH19->ViewValue = null;
        }
        $this->GnRH19->ViewCustomAttributes = "";

        // GnRH20
        $curVal = trim(strval($this->GnRH20->CurrentValue));
        if ($curVal != "") {
            $this->GnRH20->ViewValue = $this->GnRH20->lookupCacheOption($curVal);
            if ($this->GnRH20->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->GnRH20->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->GnRH20->Lookup->renderViewRow($rswrk[0]);
                    $this->GnRH20->ViewValue = $this->GnRH20->displayValue($arwrk);
                } else {
                    $this->GnRH20->ViewValue = $this->GnRH20->CurrentValue;
                }
            }
        } else {
            $this->GnRH20->ViewValue = null;
        }
        $this->GnRH20->ViewCustomAttributes = "";

        // GnRH21
        $curVal = trim(strval($this->GnRH21->CurrentValue));
        if ($curVal != "") {
            $this->GnRH21->ViewValue = $this->GnRH21->lookupCacheOption($curVal);
            if ($this->GnRH21->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->GnRH21->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->GnRH21->Lookup->renderViewRow($rswrk[0]);
                    $this->GnRH21->ViewValue = $this->GnRH21->displayValue($arwrk);
                } else {
                    $this->GnRH21->ViewValue = $this->GnRH21->CurrentValue;
                }
            }
        } else {
            $this->GnRH21->ViewValue = null;
        }
        $this->GnRH21->ViewCustomAttributes = "";

        // GnRH22
        $curVal = trim(strval($this->GnRH22->CurrentValue));
        if ($curVal != "") {
            $this->GnRH22->ViewValue = $this->GnRH22->lookupCacheOption($curVal);
            if ($this->GnRH22->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->GnRH22->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->GnRH22->Lookup->renderViewRow($rswrk[0]);
                    $this->GnRH22->ViewValue = $this->GnRH22->displayValue($arwrk);
                } else {
                    $this->GnRH22->ViewValue = $this->GnRH22->CurrentValue;
                }
            }
        } else {
            $this->GnRH22->ViewValue = null;
        }
        $this->GnRH22->ViewCustomAttributes = "";

        // GnRH23
        $curVal = trim(strval($this->GnRH23->CurrentValue));
        if ($curVal != "") {
            $this->GnRH23->ViewValue = $this->GnRH23->lookupCacheOption($curVal);
            if ($this->GnRH23->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->GnRH23->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->GnRH23->Lookup->renderViewRow($rswrk[0]);
                    $this->GnRH23->ViewValue = $this->GnRH23->displayValue($arwrk);
                } else {
                    $this->GnRH23->ViewValue = $this->GnRH23->CurrentValue;
                }
            }
        } else {
            $this->GnRH23->ViewValue = null;
        }
        $this->GnRH23->ViewCustomAttributes = "";

        // GnRH24
        $curVal = trim(strval($this->GnRH24->CurrentValue));
        if ($curVal != "") {
            $this->GnRH24->ViewValue = $this->GnRH24->lookupCacheOption($curVal);
            if ($this->GnRH24->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->GnRH24->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->GnRH24->Lookup->renderViewRow($rswrk[0]);
                    $this->GnRH24->ViewValue = $this->GnRH24->displayValue($arwrk);
                } else {
                    $this->GnRH24->ViewValue = $this->GnRH24->CurrentValue;
                }
            }
        } else {
            $this->GnRH24->ViewValue = null;
        }
        $this->GnRH24->ViewCustomAttributes = "";

        // GnRH25
        $curVal = trim(strval($this->GnRH25->CurrentValue));
        if ($curVal != "") {
            $this->GnRH25->ViewValue = $this->GnRH25->lookupCacheOption($curVal);
            if ($this->GnRH25->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->GnRH25->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->GnRH25->Lookup->renderViewRow($rswrk[0]);
                    $this->GnRH25->ViewValue = $this->GnRH25->displayValue($arwrk);
                } else {
                    $this->GnRH25->ViewValue = $this->GnRH25->CurrentValue;
                }
            }
        } else {
            $this->GnRH25->ViewValue = null;
        }
        $this->GnRH25->ViewCustomAttributes = "";

        // P414
        $this->P414->ViewValue = $this->P414->CurrentValue;
        $this->P414->ViewCustomAttributes = "";

        // P415
        $this->P415->ViewValue = $this->P415->CurrentValue;
        $this->P415->ViewCustomAttributes = "";

        // P416
        $this->P416->ViewValue = $this->P416->CurrentValue;
        $this->P416->ViewCustomAttributes = "";

        // P417
        $this->P417->ViewValue = $this->P417->CurrentValue;
        $this->P417->ViewCustomAttributes = "";

        // P418
        $this->P418->ViewValue = $this->P418->CurrentValue;
        $this->P418->ViewCustomAttributes = "";

        // P419
        $this->P419->ViewValue = $this->P419->CurrentValue;
        $this->P419->ViewCustomAttributes = "";

        // P420
        $this->P420->ViewValue = $this->P420->CurrentValue;
        $this->P420->ViewCustomAttributes = "";

        // P421
        $this->P421->ViewValue = $this->P421->CurrentValue;
        $this->P421->ViewCustomAttributes = "";

        // P422
        $this->P422->ViewValue = $this->P422->CurrentValue;
        $this->P422->ViewCustomAttributes = "";

        // P423
        $this->P423->ViewValue = $this->P423->CurrentValue;
        $this->P423->ViewCustomAttributes = "";

        // P424
        $this->P424->ViewValue = $this->P424->CurrentValue;
        $this->P424->ViewCustomAttributes = "";

        // P425
        $this->P425->ViewValue = $this->P425->CurrentValue;
        $this->P425->ViewCustomAttributes = "";

        // USGRt14
        $this->USGRt14->ViewValue = $this->USGRt14->CurrentValue;
        $this->USGRt14->ViewCustomAttributes = "";

        // USGRt15
        $this->USGRt15->ViewValue = $this->USGRt15->CurrentValue;
        $this->USGRt15->ViewCustomAttributes = "";

        // USGRt16
        $this->USGRt16->ViewValue = $this->USGRt16->CurrentValue;
        $this->USGRt16->ViewCustomAttributes = "";

        // USGRt17
        $this->USGRt17->ViewValue = $this->USGRt17->CurrentValue;
        $this->USGRt17->ViewCustomAttributes = "";

        // USGRt18
        $this->USGRt18->ViewValue = $this->USGRt18->CurrentValue;
        $this->USGRt18->ViewCustomAttributes = "";

        // USGRt19
        $this->USGRt19->ViewValue = $this->USGRt19->CurrentValue;
        $this->USGRt19->ViewCustomAttributes = "";

        // USGRt20
        $this->USGRt20->ViewValue = $this->USGRt20->CurrentValue;
        $this->USGRt20->ViewCustomAttributes = "";

        // USGRt21
        $this->USGRt21->ViewValue = $this->USGRt21->CurrentValue;
        $this->USGRt21->ViewCustomAttributes = "";

        // USGRt22
        $this->USGRt22->ViewValue = $this->USGRt22->CurrentValue;
        $this->USGRt22->ViewCustomAttributes = "";

        // USGRt23
        $this->USGRt23->ViewValue = $this->USGRt23->CurrentValue;
        $this->USGRt23->ViewCustomAttributes = "";

        // USGRt24
        $this->USGRt24->ViewValue = $this->USGRt24->CurrentValue;
        $this->USGRt24->ViewCustomAttributes = "";

        // USGRt25
        $this->USGRt25->ViewValue = $this->USGRt25->CurrentValue;
        $this->USGRt25->ViewCustomAttributes = "";

        // USGLt14
        $this->USGLt14->ViewValue = $this->USGLt14->CurrentValue;
        $this->USGLt14->ViewCustomAttributes = "";

        // USGLt15
        $this->USGLt15->ViewValue = $this->USGLt15->CurrentValue;
        $this->USGLt15->ViewCustomAttributes = "";

        // USGLt16
        $this->USGLt16->ViewValue = $this->USGLt16->CurrentValue;
        $this->USGLt16->ViewCustomAttributes = "";

        // USGLt17
        $this->USGLt17->ViewValue = $this->USGLt17->CurrentValue;
        $this->USGLt17->ViewCustomAttributes = "";

        // USGLt18
        $this->USGLt18->ViewValue = $this->USGLt18->CurrentValue;
        $this->USGLt18->ViewCustomAttributes = "";

        // USGLt19
        $this->USGLt19->ViewValue = $this->USGLt19->CurrentValue;
        $this->USGLt19->ViewCustomAttributes = "";

        // USGLt20
        $this->USGLt20->ViewValue = $this->USGLt20->CurrentValue;
        $this->USGLt20->ViewCustomAttributes = "";

        // USGLt21
        $this->USGLt21->ViewValue = $this->USGLt21->CurrentValue;
        $this->USGLt21->ViewCustomAttributes = "";

        // USGLt22
        $this->USGLt22->ViewValue = $this->USGLt22->CurrentValue;
        $this->USGLt22->ViewCustomAttributes = "";

        // USGLt23
        $this->USGLt23->ViewValue = $this->USGLt23->CurrentValue;
        $this->USGLt23->ViewCustomAttributes = "";

        // USGLt24
        $this->USGLt24->ViewValue = $this->USGLt24->CurrentValue;
        $this->USGLt24->ViewCustomAttributes = "";

        // USGLt25
        $this->USGLt25->ViewValue = $this->USGLt25->CurrentValue;
        $this->USGLt25->ViewCustomAttributes = "";

        // EM14
        $this->EM14->ViewValue = $this->EM14->CurrentValue;
        $this->EM14->ViewCustomAttributes = "";

        // EM15
        $this->EM15->ViewValue = $this->EM15->CurrentValue;
        $this->EM15->ViewCustomAttributes = "";

        // EM16
        $this->EM16->ViewValue = $this->EM16->CurrentValue;
        $this->EM16->ViewCustomAttributes = "";

        // EM17
        $this->EM17->ViewValue = $this->EM17->CurrentValue;
        $this->EM17->ViewCustomAttributes = "";

        // EM18
        $this->EM18->ViewValue = $this->EM18->CurrentValue;
        $this->EM18->ViewCustomAttributes = "";

        // EM19
        $this->EM19->ViewValue = $this->EM19->CurrentValue;
        $this->EM19->ViewCustomAttributes = "";

        // EM20
        $this->EM20->ViewValue = $this->EM20->CurrentValue;
        $this->EM20->ViewCustomAttributes = "";

        // EM21
        $this->EM21->ViewValue = $this->EM21->CurrentValue;
        $this->EM21->ViewCustomAttributes = "";

        // EM22
        $this->EM22->ViewValue = $this->EM22->CurrentValue;
        $this->EM22->ViewCustomAttributes = "";

        // EM23
        $this->EM23->ViewValue = $this->EM23->CurrentValue;
        $this->EM23->ViewCustomAttributes = "";

        // EM24
        $this->EM24->ViewValue = $this->EM24->CurrentValue;
        $this->EM24->ViewCustomAttributes = "";

        // EM25
        $this->EM25->ViewValue = $this->EM25->CurrentValue;
        $this->EM25->ViewCustomAttributes = "";

        // Others14
        $this->Others14->ViewValue = $this->Others14->CurrentValue;
        $this->Others14->ViewCustomAttributes = "";

        // Others15
        $this->Others15->ViewValue = $this->Others15->CurrentValue;
        $this->Others15->ViewCustomAttributes = "";

        // Others16
        $this->Others16->ViewValue = $this->Others16->CurrentValue;
        $this->Others16->ViewCustomAttributes = "";

        // Others17
        $this->Others17->ViewValue = $this->Others17->CurrentValue;
        $this->Others17->ViewCustomAttributes = "";

        // Others18
        $this->Others18->ViewValue = $this->Others18->CurrentValue;
        $this->Others18->ViewCustomAttributes = "";

        // Others19
        $this->Others19->ViewValue = $this->Others19->CurrentValue;
        $this->Others19->ViewCustomAttributes = "";

        // Others20
        $this->Others20->ViewValue = $this->Others20->CurrentValue;
        $this->Others20->ViewCustomAttributes = "";

        // Others21
        $this->Others21->ViewValue = $this->Others21->CurrentValue;
        $this->Others21->ViewCustomAttributes = "";

        // Others22
        $this->Others22->ViewValue = $this->Others22->CurrentValue;
        $this->Others22->ViewCustomAttributes = "";

        // Others23
        $this->Others23->ViewValue = $this->Others23->CurrentValue;
        $this->Others23->ViewCustomAttributes = "";

        // Others24
        $this->Others24->ViewValue = $this->Others24->CurrentValue;
        $this->Others24->ViewCustomAttributes = "";

        // Others25
        $this->Others25->ViewValue = $this->Others25->CurrentValue;
        $this->Others25->ViewCustomAttributes = "";

        // DR14
        $this->DR14->ViewValue = $this->DR14->CurrentValue;
        $this->DR14->ViewCustomAttributes = "";

        // DR15
        $this->DR15->ViewValue = $this->DR15->CurrentValue;
        $this->DR15->ViewCustomAttributes = "";

        // DR16
        $this->DR16->ViewValue = $this->DR16->CurrentValue;
        $this->DR16->ViewCustomAttributes = "";

        // DR17
        $this->DR17->ViewValue = $this->DR17->CurrentValue;
        $this->DR17->ViewCustomAttributes = "";

        // DR18
        $this->DR18->ViewValue = $this->DR18->CurrentValue;
        $this->DR18->ViewCustomAttributes = "";

        // DR19
        $this->DR19->ViewValue = $this->DR19->CurrentValue;
        $this->DR19->ViewCustomAttributes = "";

        // DR20
        $this->DR20->ViewValue = $this->DR20->CurrentValue;
        $this->DR20->ViewCustomAttributes = "";

        // DR21
        $this->DR21->ViewValue = $this->DR21->CurrentValue;
        $this->DR21->ViewCustomAttributes = "";

        // DR22
        $this->DR22->ViewValue = $this->DR22->CurrentValue;
        $this->DR22->ViewCustomAttributes = "";

        // DR23
        $this->DR23->ViewValue = $this->DR23->CurrentValue;
        $this->DR23->ViewCustomAttributes = "";

        // DR24
        $this->DR24->ViewValue = $this->DR24->CurrentValue;
        $this->DR24->ViewCustomAttributes = "";

        // DR25
        $this->DR25->ViewValue = $this->DR25->CurrentValue;
        $this->DR25->ViewCustomAttributes = "";

        // E214
        $this->E214->ViewValue = $this->E214->CurrentValue;
        $this->E214->ViewCustomAttributes = "";

        // E215
        $this->E215->ViewValue = $this->E215->CurrentValue;
        $this->E215->ViewCustomAttributes = "";

        // E216
        $this->E216->ViewValue = $this->E216->CurrentValue;
        $this->E216->ViewCustomAttributes = "";

        // E217
        $this->E217->ViewValue = $this->E217->CurrentValue;
        $this->E217->ViewCustomAttributes = "";

        // E218
        $this->E218->ViewValue = $this->E218->CurrentValue;
        $this->E218->ViewCustomAttributes = "";

        // E219
        $this->E219->ViewValue = $this->E219->CurrentValue;
        $this->E219->ViewCustomAttributes = "";

        // E220
        $this->E220->ViewValue = $this->E220->CurrentValue;
        $this->E220->ViewCustomAttributes = "";

        // E221
        $this->E221->ViewValue = $this->E221->CurrentValue;
        $this->E221->ViewCustomAttributes = "";

        // E222
        $this->E222->ViewValue = $this->E222->CurrentValue;
        $this->E222->ViewCustomAttributes = "";

        // E223
        $this->E223->ViewValue = $this->E223->CurrentValue;
        $this->E223->ViewCustomAttributes = "";

        // E224
        $this->E224->ViewValue = $this->E224->CurrentValue;
        $this->E224->ViewCustomAttributes = "";

        // E225
        $this->E225->ViewValue = $this->E225->CurrentValue;
        $this->E225->ViewCustomAttributes = "";

        // EEETTTDTE
        $this->EEETTTDTE->ViewValue = $this->EEETTTDTE->CurrentValue;
        $this->EEETTTDTE->ViewValue = FormatDateTime($this->EEETTTDTE->ViewValue, 7);
        $this->EEETTTDTE->ViewCustomAttributes = "";

        // bhcgdate
        $this->bhcgdate->ViewValue = $this->bhcgdate->CurrentValue;
        $this->bhcgdate->ViewValue = FormatDateTime($this->bhcgdate->ViewValue, 7);
        $this->bhcgdate->ViewCustomAttributes = "";

        // TUBAL_PATENCY
        if (strval($this->TUBAL_PATENCY->CurrentValue) != "") {
            $this->TUBAL_PATENCY->ViewValue = $this->TUBAL_PATENCY->optionCaption($this->TUBAL_PATENCY->CurrentValue);
        } else {
            $this->TUBAL_PATENCY->ViewValue = null;
        }
        $this->TUBAL_PATENCY->ViewCustomAttributes = "";

        // HSG
        if (strval($this->HSG->CurrentValue) != "") {
            $this->HSG->ViewValue = $this->HSG->optionCaption($this->HSG->CurrentValue);
        } else {
            $this->HSG->ViewValue = null;
        }
        $this->HSG->ViewCustomAttributes = "";

        // DHL
        if (strval($this->DHL->CurrentValue) != "") {
            $this->DHL->ViewValue = $this->DHL->optionCaption($this->DHL->CurrentValue);
        } else {
            $this->DHL->ViewValue = null;
        }
        $this->DHL->ViewCustomAttributes = "";

        // UTERINE_PROBLEMS
        if (strval($this->UTERINE_PROBLEMS->CurrentValue) != "") {
            $this->UTERINE_PROBLEMS->ViewValue = $this->UTERINE_PROBLEMS->optionCaption($this->UTERINE_PROBLEMS->CurrentValue);
        } else {
            $this->UTERINE_PROBLEMS->ViewValue = null;
        }
        $this->UTERINE_PROBLEMS->ViewCustomAttributes = "";

        // W_COMORBIDS
        if (strval($this->W_COMORBIDS->CurrentValue) != "") {
            $this->W_COMORBIDS->ViewValue = $this->W_COMORBIDS->optionCaption($this->W_COMORBIDS->CurrentValue);
        } else {
            $this->W_COMORBIDS->ViewValue = null;
        }
        $this->W_COMORBIDS->ViewCustomAttributes = "";

        // H_COMORBIDS
        if (strval($this->H_COMORBIDS->CurrentValue) != "") {
            $this->H_COMORBIDS->ViewValue = $this->H_COMORBIDS->optionCaption($this->H_COMORBIDS->CurrentValue);
        } else {
            $this->H_COMORBIDS->ViewValue = null;
        }
        $this->H_COMORBIDS->ViewCustomAttributes = "";

        // SEXUAL_DYSFUNCTION
        if (strval($this->SEXUAL_DYSFUNCTION->CurrentValue) != "") {
            $this->SEXUAL_DYSFUNCTION->ViewValue = $this->SEXUAL_DYSFUNCTION->optionCaption($this->SEXUAL_DYSFUNCTION->CurrentValue);
        } else {
            $this->SEXUAL_DYSFUNCTION->ViewValue = null;
        }
        $this->SEXUAL_DYSFUNCTION->ViewCustomAttributes = "";

        // TABLETS
        $this->TABLETS->ViewValue = $this->TABLETS->CurrentValue;
        $this->TABLETS->ViewCustomAttributes = "";

        // FOLLICLE_STATUS
        if (strval($this->FOLLICLE_STATUS->CurrentValue) != "") {
            $this->FOLLICLE_STATUS->ViewValue = $this->FOLLICLE_STATUS->optionCaption($this->FOLLICLE_STATUS->CurrentValue);
        } else {
            $this->FOLLICLE_STATUS->ViewValue = null;
        }
        $this->FOLLICLE_STATUS->ViewCustomAttributes = "";

        // NUMBER_OF_IUI
        if (strval($this->NUMBER_OF_IUI->CurrentValue) != "") {
            $this->NUMBER_OF_IUI->ViewValue = $this->NUMBER_OF_IUI->optionCaption($this->NUMBER_OF_IUI->CurrentValue);
        } else {
            $this->NUMBER_OF_IUI->ViewValue = null;
        }
        $this->NUMBER_OF_IUI->ViewCustomAttributes = "";

        // PROCEDURE
        if (strval($this->PROCEDURE->CurrentValue) != "") {
            $this->PROCEDURE->ViewValue = $this->PROCEDURE->optionCaption($this->PROCEDURE->CurrentValue);
        } else {
            $this->PROCEDURE->ViewValue = null;
        }
        $this->PROCEDURE->ViewCustomAttributes = "";

        // LUTEAL_SUPPORT
        if (strval($this->LUTEAL_SUPPORT->CurrentValue) != "") {
            $this->LUTEAL_SUPPORT->ViewValue = $this->LUTEAL_SUPPORT->optionCaption($this->LUTEAL_SUPPORT->CurrentValue);
        } else {
            $this->LUTEAL_SUPPORT->ViewValue = null;
        }
        $this->LUTEAL_SUPPORT->ViewCustomAttributes = "";

        // SPECIFIC_MATERNAL_PROBLEMS
        if (strval($this->SPECIFIC_MATERNAL_PROBLEMS->CurrentValue) != "") {
            $this->SPECIFIC_MATERNAL_PROBLEMS->ViewValue = $this->SPECIFIC_MATERNAL_PROBLEMS->optionCaption($this->SPECIFIC_MATERNAL_PROBLEMS->CurrentValue);
        } else {
            $this->SPECIFIC_MATERNAL_PROBLEMS->ViewValue = null;
        }
        $this->SPECIFIC_MATERNAL_PROBLEMS->ViewCustomAttributes = "";

        // ONGOING_PREG
        $this->ONGOING_PREG->ViewValue = $this->ONGOING_PREG->CurrentValue;
        $this->ONGOING_PREG->ViewCustomAttributes = "";

        // EDD_Date
        $this->EDD_Date->ViewValue = $this->EDD_Date->CurrentValue;
        $this->EDD_Date->ViewValue = FormatDateTime($this->EDD_Date->ViewValue, 0);
        $this->EDD_Date->ViewCustomAttributes = "";

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

        // FemaleFactor
        $this->FemaleFactor->LinkCustomAttributes = "";
        $this->FemaleFactor->HrefValue = "";
        $this->FemaleFactor->TooltipValue = "";

        // MaleFactor
        $this->MaleFactor->LinkCustomAttributes = "";
        $this->MaleFactor->HrefValue = "";
        $this->MaleFactor->TooltipValue = "";

        // Protocol
        $this->Protocol->LinkCustomAttributes = "";
        $this->Protocol->HrefValue = "";
        $this->Protocol->TooltipValue = "";

        // SemenFrozen
        $this->SemenFrozen->LinkCustomAttributes = "";
        $this->SemenFrozen->HrefValue = "";
        $this->SemenFrozen->TooltipValue = "";

        // A4ICSICycle
        $this->A4ICSICycle->LinkCustomAttributes = "";
        $this->A4ICSICycle->HrefValue = "";
        $this->A4ICSICycle->TooltipValue = "";

        // TotalICSICycle
        $this->TotalICSICycle->LinkCustomAttributes = "";
        $this->TotalICSICycle->HrefValue = "";
        $this->TotalICSICycle->TooltipValue = "";

        // TypeOfInfertility
        $this->TypeOfInfertility->LinkCustomAttributes = "";
        $this->TypeOfInfertility->HrefValue = "";
        $this->TypeOfInfertility->TooltipValue = "";

        // Duration
        $this->Duration->LinkCustomAttributes = "";
        $this->Duration->HrefValue = "";
        $this->Duration->TooltipValue = "";

        // LMP
        $this->LMP->LinkCustomAttributes = "";
        $this->LMP->HrefValue = "";
        $this->LMP->TooltipValue = "";

        // RelevantHistory
        $this->RelevantHistory->LinkCustomAttributes = "";
        $this->RelevantHistory->HrefValue = "";
        $this->RelevantHistory->TooltipValue = "";

        // IUICycles
        $this->IUICycles->LinkCustomAttributes = "";
        $this->IUICycles->HrefValue = "";
        $this->IUICycles->TooltipValue = "";

        // AFC
        $this->AFC->LinkCustomAttributes = "";
        $this->AFC->HrefValue = "";
        $this->AFC->TooltipValue = "";

        // AMH
        $this->AMH->LinkCustomAttributes = "";
        $this->AMH->HrefValue = "";
        $this->AMH->TooltipValue = "";

        // FBMI
        $this->FBMI->LinkCustomAttributes = "";
        $this->FBMI->HrefValue = "";
        $this->FBMI->TooltipValue = "";

        // MBMI
        $this->MBMI->LinkCustomAttributes = "";
        $this->MBMI->HrefValue = "";
        $this->MBMI->TooltipValue = "";

        // OvarianVolumeRT
        $this->OvarianVolumeRT->LinkCustomAttributes = "";
        $this->OvarianVolumeRT->HrefValue = "";
        $this->OvarianVolumeRT->TooltipValue = "";

        // OvarianVolumeLT
        $this->OvarianVolumeLT->LinkCustomAttributes = "";
        $this->OvarianVolumeLT->HrefValue = "";
        $this->OvarianVolumeLT->TooltipValue = "";

        // DAYSOFSTIMULATION
        $this->DAYSOFSTIMULATION->LinkCustomAttributes = "";
        $this->DAYSOFSTIMULATION->HrefValue = "";
        $this->DAYSOFSTIMULATION->TooltipValue = "";

        // DOSEOFGONADOTROPINS
        $this->DOSEOFGONADOTROPINS->LinkCustomAttributes = "";
        $this->DOSEOFGONADOTROPINS->HrefValue = "";
        $this->DOSEOFGONADOTROPINS->TooltipValue = "";

        // INJTYPE
        $this->INJTYPE->LinkCustomAttributes = "";
        $this->INJTYPE->HrefValue = "";
        $this->INJTYPE->TooltipValue = "";

        // ANTAGONISTDAYS
        $this->ANTAGONISTDAYS->LinkCustomAttributes = "";
        $this->ANTAGONISTDAYS->HrefValue = "";
        $this->ANTAGONISTDAYS->TooltipValue = "";

        // ANTAGONISTSTARTDAY
        $this->ANTAGONISTSTARTDAY->LinkCustomAttributes = "";
        $this->ANTAGONISTSTARTDAY->HrefValue = "";
        $this->ANTAGONISTSTARTDAY->TooltipValue = "";

        // GROWTHHORMONE
        $this->GROWTHHORMONE->LinkCustomAttributes = "";
        $this->GROWTHHORMONE->HrefValue = "";
        $this->GROWTHHORMONE->TooltipValue = "";

        // PRETREATMENT
        $this->PRETREATMENT->LinkCustomAttributes = "";
        $this->PRETREATMENT->HrefValue = "";
        $this->PRETREATMENT->TooltipValue = "";

        // SerumP4
        $this->SerumP4->LinkCustomAttributes = "";
        $this->SerumP4->HrefValue = "";
        $this->SerumP4->TooltipValue = "";

        // FORT
        $this->FORT->LinkCustomAttributes = "";
        $this->FORT->HrefValue = "";
        $this->FORT->TooltipValue = "";

        // MedicalFactors
        $this->MedicalFactors->LinkCustomAttributes = "";
        $this->MedicalFactors->HrefValue = "";
        $this->MedicalFactors->TooltipValue = "";

        // SCDate
        $this->SCDate->LinkCustomAttributes = "";
        $this->SCDate->HrefValue = "";
        $this->SCDate->TooltipValue = "";

        // OvarianSurgery
        $this->OvarianSurgery->LinkCustomAttributes = "";
        $this->OvarianSurgery->HrefValue = "";
        $this->OvarianSurgery->TooltipValue = "";

        // PreProcedureOrder
        $this->PreProcedureOrder->LinkCustomAttributes = "";
        $this->PreProcedureOrder->HrefValue = "";
        $this->PreProcedureOrder->TooltipValue = "";

        // TRIGGERR
        $this->TRIGGERR->LinkCustomAttributes = "";
        $this->TRIGGERR->HrefValue = "";
        $this->TRIGGERR->TooltipValue = "";

        // TRIGGERDATE
        $this->TRIGGERDATE->LinkCustomAttributes = "";
        $this->TRIGGERDATE->HrefValue = "";
        $this->TRIGGERDATE->TooltipValue = "";

        // ATHOMEorCLINIC
        $this->ATHOMEorCLINIC->LinkCustomAttributes = "";
        $this->ATHOMEorCLINIC->HrefValue = "";
        $this->ATHOMEorCLINIC->TooltipValue = "";

        // OPUDATE
        $this->OPUDATE->LinkCustomAttributes = "";
        $this->OPUDATE->HrefValue = "";
        $this->OPUDATE->TooltipValue = "";

        // ALLFREEZEINDICATION
        $this->ALLFREEZEINDICATION->LinkCustomAttributes = "";
        $this->ALLFREEZEINDICATION->HrefValue = "";
        $this->ALLFREEZEINDICATION->TooltipValue = "";

        // ERA
        $this->ERA->LinkCustomAttributes = "";
        $this->ERA->HrefValue = "";
        $this->ERA->TooltipValue = "";

        // PGTA
        $this->PGTA->LinkCustomAttributes = "";
        $this->PGTA->HrefValue = "";
        $this->PGTA->TooltipValue = "";

        // PGD
        $this->PGD->LinkCustomAttributes = "";
        $this->PGD->HrefValue = "";
        $this->PGD->TooltipValue = "";

        // DATEOFET
        $this->DATEOFET->LinkCustomAttributes = "";
        $this->DATEOFET->HrefValue = "";
        $this->DATEOFET->TooltipValue = "";

        // ET
        $this->ET->LinkCustomAttributes = "";
        $this->ET->HrefValue = "";
        $this->ET->TooltipValue = "";

        // ESET
        $this->ESET->LinkCustomAttributes = "";
        $this->ESET->HrefValue = "";
        $this->ESET->TooltipValue = "";

        // DOET
        $this->DOET->LinkCustomAttributes = "";
        $this->DOET->HrefValue = "";
        $this->DOET->TooltipValue = "";

        // SEMENPREPARATION
        $this->SEMENPREPARATION->LinkCustomAttributes = "";
        $this->SEMENPREPARATION->HrefValue = "";
        $this->SEMENPREPARATION->TooltipValue = "";

        // REASONFORESET
        $this->REASONFORESET->LinkCustomAttributes = "";
        $this->REASONFORESET->HrefValue = "";
        $this->REASONFORESET->TooltipValue = "";

        // Expectedoocytes
        $this->Expectedoocytes->LinkCustomAttributes = "";
        $this->Expectedoocytes->HrefValue = "";
        $this->Expectedoocytes->TooltipValue = "";

        // StChDate1
        $this->StChDate1->LinkCustomAttributes = "";
        $this->StChDate1->HrefValue = "";
        $this->StChDate1->TooltipValue = "";

        // StChDate2
        $this->StChDate2->LinkCustomAttributes = "";
        $this->StChDate2->HrefValue = "";
        $this->StChDate2->TooltipValue = "";

        // StChDate3
        $this->StChDate3->LinkCustomAttributes = "";
        $this->StChDate3->HrefValue = "";
        $this->StChDate3->TooltipValue = "";

        // StChDate4
        $this->StChDate4->LinkCustomAttributes = "";
        $this->StChDate4->HrefValue = "";
        $this->StChDate4->TooltipValue = "";

        // StChDate5
        $this->StChDate5->LinkCustomAttributes = "";
        $this->StChDate5->HrefValue = "";
        $this->StChDate5->TooltipValue = "";

        // StChDate6
        $this->StChDate6->LinkCustomAttributes = "";
        $this->StChDate6->HrefValue = "";
        $this->StChDate6->TooltipValue = "";

        // StChDate7
        $this->StChDate7->LinkCustomAttributes = "";
        $this->StChDate7->HrefValue = "";
        $this->StChDate7->TooltipValue = "";

        // StChDate8
        $this->StChDate8->LinkCustomAttributes = "";
        $this->StChDate8->HrefValue = "";
        $this->StChDate8->TooltipValue = "";

        // StChDate9
        $this->StChDate9->LinkCustomAttributes = "";
        $this->StChDate9->HrefValue = "";
        $this->StChDate9->TooltipValue = "";

        // StChDate10
        $this->StChDate10->LinkCustomAttributes = "";
        $this->StChDate10->HrefValue = "";
        $this->StChDate10->TooltipValue = "";

        // StChDate11
        $this->StChDate11->LinkCustomAttributes = "";
        $this->StChDate11->HrefValue = "";
        $this->StChDate11->TooltipValue = "";

        // StChDate12
        $this->StChDate12->LinkCustomAttributes = "";
        $this->StChDate12->HrefValue = "";
        $this->StChDate12->TooltipValue = "";

        // StChDate13
        $this->StChDate13->LinkCustomAttributes = "";
        $this->StChDate13->HrefValue = "";
        $this->StChDate13->TooltipValue = "";

        // CycleDay1
        $this->CycleDay1->LinkCustomAttributes = "";
        $this->CycleDay1->HrefValue = "";
        $this->CycleDay1->TooltipValue = "";

        // CycleDay2
        $this->CycleDay2->LinkCustomAttributes = "";
        $this->CycleDay2->HrefValue = "";
        $this->CycleDay2->TooltipValue = "";

        // CycleDay3
        $this->CycleDay3->LinkCustomAttributes = "";
        $this->CycleDay3->HrefValue = "";
        $this->CycleDay3->TooltipValue = "";

        // CycleDay4
        $this->CycleDay4->LinkCustomAttributes = "";
        $this->CycleDay4->HrefValue = "";
        $this->CycleDay4->TooltipValue = "";

        // CycleDay5
        $this->CycleDay5->LinkCustomAttributes = "";
        $this->CycleDay5->HrefValue = "";
        $this->CycleDay5->TooltipValue = "";

        // CycleDay6
        $this->CycleDay6->LinkCustomAttributes = "";
        $this->CycleDay6->HrefValue = "";
        $this->CycleDay6->TooltipValue = "";

        // CycleDay7
        $this->CycleDay7->LinkCustomAttributes = "";
        $this->CycleDay7->HrefValue = "";
        $this->CycleDay7->TooltipValue = "";

        // CycleDay8
        $this->CycleDay8->LinkCustomAttributes = "";
        $this->CycleDay8->HrefValue = "";
        $this->CycleDay8->TooltipValue = "";

        // CycleDay9
        $this->CycleDay9->LinkCustomAttributes = "";
        $this->CycleDay9->HrefValue = "";
        $this->CycleDay9->TooltipValue = "";

        // CycleDay10
        $this->CycleDay10->LinkCustomAttributes = "";
        $this->CycleDay10->HrefValue = "";
        $this->CycleDay10->TooltipValue = "";

        // CycleDay11
        $this->CycleDay11->LinkCustomAttributes = "";
        $this->CycleDay11->HrefValue = "";
        $this->CycleDay11->TooltipValue = "";

        // CycleDay12
        $this->CycleDay12->LinkCustomAttributes = "";
        $this->CycleDay12->HrefValue = "";
        $this->CycleDay12->TooltipValue = "";

        // CycleDay13
        $this->CycleDay13->LinkCustomAttributes = "";
        $this->CycleDay13->HrefValue = "";
        $this->CycleDay13->TooltipValue = "";

        // StimulationDay1
        $this->StimulationDay1->LinkCustomAttributes = "";
        $this->StimulationDay1->HrefValue = "";
        $this->StimulationDay1->TooltipValue = "";

        // StimulationDay2
        $this->StimulationDay2->LinkCustomAttributes = "";
        $this->StimulationDay2->HrefValue = "";
        $this->StimulationDay2->TooltipValue = "";

        // StimulationDay3
        $this->StimulationDay3->LinkCustomAttributes = "";
        $this->StimulationDay3->HrefValue = "";
        $this->StimulationDay3->TooltipValue = "";

        // StimulationDay4
        $this->StimulationDay4->LinkCustomAttributes = "";
        $this->StimulationDay4->HrefValue = "";
        $this->StimulationDay4->TooltipValue = "";

        // StimulationDay5
        $this->StimulationDay5->LinkCustomAttributes = "";
        $this->StimulationDay5->HrefValue = "";
        $this->StimulationDay5->TooltipValue = "";

        // StimulationDay6
        $this->StimulationDay6->LinkCustomAttributes = "";
        $this->StimulationDay6->HrefValue = "";
        $this->StimulationDay6->TooltipValue = "";

        // StimulationDay7
        $this->StimulationDay7->LinkCustomAttributes = "";
        $this->StimulationDay7->HrefValue = "";
        $this->StimulationDay7->TooltipValue = "";

        // StimulationDay8
        $this->StimulationDay8->LinkCustomAttributes = "";
        $this->StimulationDay8->HrefValue = "";
        $this->StimulationDay8->TooltipValue = "";

        // StimulationDay9
        $this->StimulationDay9->LinkCustomAttributes = "";
        $this->StimulationDay9->HrefValue = "";
        $this->StimulationDay9->TooltipValue = "";

        // StimulationDay10
        $this->StimulationDay10->LinkCustomAttributes = "";
        $this->StimulationDay10->HrefValue = "";
        $this->StimulationDay10->TooltipValue = "";

        // StimulationDay11
        $this->StimulationDay11->LinkCustomAttributes = "";
        $this->StimulationDay11->HrefValue = "";
        $this->StimulationDay11->TooltipValue = "";

        // StimulationDay12
        $this->StimulationDay12->LinkCustomAttributes = "";
        $this->StimulationDay12->HrefValue = "";
        $this->StimulationDay12->TooltipValue = "";

        // StimulationDay13
        $this->StimulationDay13->LinkCustomAttributes = "";
        $this->StimulationDay13->HrefValue = "";
        $this->StimulationDay13->TooltipValue = "";

        // Tablet1
        $this->Tablet1->LinkCustomAttributes = "";
        $this->Tablet1->HrefValue = "";
        $this->Tablet1->TooltipValue = "";

        // Tablet2
        $this->Tablet2->LinkCustomAttributes = "";
        $this->Tablet2->HrefValue = "";
        $this->Tablet2->TooltipValue = "";

        // Tablet3
        $this->Tablet3->LinkCustomAttributes = "";
        $this->Tablet3->HrefValue = "";
        $this->Tablet3->TooltipValue = "";

        // Tablet4
        $this->Tablet4->LinkCustomAttributes = "";
        $this->Tablet4->HrefValue = "";
        $this->Tablet4->TooltipValue = "";

        // Tablet5
        $this->Tablet5->LinkCustomAttributes = "";
        $this->Tablet5->HrefValue = "";
        $this->Tablet5->TooltipValue = "";

        // Tablet6
        $this->Tablet6->LinkCustomAttributes = "";
        $this->Tablet6->HrefValue = "";
        $this->Tablet6->TooltipValue = "";

        // Tablet7
        $this->Tablet7->LinkCustomAttributes = "";
        $this->Tablet7->HrefValue = "";
        $this->Tablet7->TooltipValue = "";

        // Tablet8
        $this->Tablet8->LinkCustomAttributes = "";
        $this->Tablet8->HrefValue = "";
        $this->Tablet8->TooltipValue = "";

        // Tablet9
        $this->Tablet9->LinkCustomAttributes = "";
        $this->Tablet9->HrefValue = "";
        $this->Tablet9->TooltipValue = "";

        // Tablet10
        $this->Tablet10->LinkCustomAttributes = "";
        $this->Tablet10->HrefValue = "";
        $this->Tablet10->TooltipValue = "";

        // Tablet11
        $this->Tablet11->LinkCustomAttributes = "";
        $this->Tablet11->HrefValue = "";
        $this->Tablet11->TooltipValue = "";

        // Tablet12
        $this->Tablet12->LinkCustomAttributes = "";
        $this->Tablet12->HrefValue = "";
        $this->Tablet12->TooltipValue = "";

        // Tablet13
        $this->Tablet13->LinkCustomAttributes = "";
        $this->Tablet13->HrefValue = "";
        $this->Tablet13->TooltipValue = "";

        // RFSH1
        $this->RFSH1->LinkCustomAttributes = "";
        $this->RFSH1->HrefValue = "";
        $this->RFSH1->TooltipValue = "";

        // RFSH2
        $this->RFSH2->LinkCustomAttributes = "";
        $this->RFSH2->HrefValue = "";
        $this->RFSH2->TooltipValue = "";

        // RFSH3
        $this->RFSH3->LinkCustomAttributes = "";
        $this->RFSH3->HrefValue = "";
        $this->RFSH3->TooltipValue = "";

        // RFSH4
        $this->RFSH4->LinkCustomAttributes = "";
        $this->RFSH4->HrefValue = "";
        $this->RFSH4->TooltipValue = "";

        // RFSH5
        $this->RFSH5->LinkCustomAttributes = "";
        $this->RFSH5->HrefValue = "";
        $this->RFSH5->TooltipValue = "";

        // RFSH6
        $this->RFSH6->LinkCustomAttributes = "";
        $this->RFSH6->HrefValue = "";
        $this->RFSH6->TooltipValue = "";

        // RFSH7
        $this->RFSH7->LinkCustomAttributes = "";
        $this->RFSH7->HrefValue = "";
        $this->RFSH7->TooltipValue = "";

        // RFSH8
        $this->RFSH8->LinkCustomAttributes = "";
        $this->RFSH8->HrefValue = "";
        $this->RFSH8->TooltipValue = "";

        // RFSH9
        $this->RFSH9->LinkCustomAttributes = "";
        $this->RFSH9->HrefValue = "";
        $this->RFSH9->TooltipValue = "";

        // RFSH10
        $this->RFSH10->LinkCustomAttributes = "";
        $this->RFSH10->HrefValue = "";
        $this->RFSH10->TooltipValue = "";

        // RFSH11
        $this->RFSH11->LinkCustomAttributes = "";
        $this->RFSH11->HrefValue = "";
        $this->RFSH11->TooltipValue = "";

        // RFSH12
        $this->RFSH12->LinkCustomAttributes = "";
        $this->RFSH12->HrefValue = "";
        $this->RFSH12->TooltipValue = "";

        // RFSH13
        $this->RFSH13->LinkCustomAttributes = "";
        $this->RFSH13->HrefValue = "";
        $this->RFSH13->TooltipValue = "";

        // HMG1
        $this->HMG1->LinkCustomAttributes = "";
        $this->HMG1->HrefValue = "";
        $this->HMG1->TooltipValue = "";

        // HMG2
        $this->HMG2->LinkCustomAttributes = "";
        $this->HMG2->HrefValue = "";
        $this->HMG2->TooltipValue = "";

        // HMG3
        $this->HMG3->LinkCustomAttributes = "";
        $this->HMG3->HrefValue = "";
        $this->HMG3->TooltipValue = "";

        // HMG4
        $this->HMG4->LinkCustomAttributes = "";
        $this->HMG4->HrefValue = "";
        $this->HMG4->TooltipValue = "";

        // HMG5
        $this->HMG5->LinkCustomAttributes = "";
        $this->HMG5->HrefValue = "";
        $this->HMG5->TooltipValue = "";

        // HMG6
        $this->HMG6->LinkCustomAttributes = "";
        $this->HMG6->HrefValue = "";
        $this->HMG6->TooltipValue = "";

        // HMG7
        $this->HMG7->LinkCustomAttributes = "";
        $this->HMG7->HrefValue = "";
        $this->HMG7->TooltipValue = "";

        // HMG8
        $this->HMG8->LinkCustomAttributes = "";
        $this->HMG8->HrefValue = "";
        $this->HMG8->TooltipValue = "";

        // HMG9
        $this->HMG9->LinkCustomAttributes = "";
        $this->HMG9->HrefValue = "";
        $this->HMG9->TooltipValue = "";

        // HMG10
        $this->HMG10->LinkCustomAttributes = "";
        $this->HMG10->HrefValue = "";
        $this->HMG10->TooltipValue = "";

        // HMG11
        $this->HMG11->LinkCustomAttributes = "";
        $this->HMG11->HrefValue = "";
        $this->HMG11->TooltipValue = "";

        // HMG12
        $this->HMG12->LinkCustomAttributes = "";
        $this->HMG12->HrefValue = "";
        $this->HMG12->TooltipValue = "";

        // HMG13
        $this->HMG13->LinkCustomAttributes = "";
        $this->HMG13->HrefValue = "";
        $this->HMG13->TooltipValue = "";

        // GnRH1
        $this->GnRH1->LinkCustomAttributes = "";
        $this->GnRH1->HrefValue = "";
        $this->GnRH1->TooltipValue = "";

        // GnRH2
        $this->GnRH2->LinkCustomAttributes = "";
        $this->GnRH2->HrefValue = "";
        $this->GnRH2->TooltipValue = "";

        // GnRH3
        $this->GnRH3->LinkCustomAttributes = "";
        $this->GnRH3->HrefValue = "";
        $this->GnRH3->TooltipValue = "";

        // GnRH4
        $this->GnRH4->LinkCustomAttributes = "";
        $this->GnRH4->HrefValue = "";
        $this->GnRH4->TooltipValue = "";

        // GnRH5
        $this->GnRH5->LinkCustomAttributes = "";
        $this->GnRH5->HrefValue = "";
        $this->GnRH5->TooltipValue = "";

        // GnRH6
        $this->GnRH6->LinkCustomAttributes = "";
        $this->GnRH6->HrefValue = "";
        $this->GnRH6->TooltipValue = "";

        // GnRH7
        $this->GnRH7->LinkCustomAttributes = "";
        $this->GnRH7->HrefValue = "";
        $this->GnRH7->TooltipValue = "";

        // GnRH8
        $this->GnRH8->LinkCustomAttributes = "";
        $this->GnRH8->HrefValue = "";
        $this->GnRH8->TooltipValue = "";

        // GnRH9
        $this->GnRH9->LinkCustomAttributes = "";
        $this->GnRH9->HrefValue = "";
        $this->GnRH9->TooltipValue = "";

        // GnRH10
        $this->GnRH10->LinkCustomAttributes = "";
        $this->GnRH10->HrefValue = "";
        $this->GnRH10->TooltipValue = "";

        // GnRH11
        $this->GnRH11->LinkCustomAttributes = "";
        $this->GnRH11->HrefValue = "";
        $this->GnRH11->TooltipValue = "";

        // GnRH12
        $this->GnRH12->LinkCustomAttributes = "";
        $this->GnRH12->HrefValue = "";
        $this->GnRH12->TooltipValue = "";

        // GnRH13
        $this->GnRH13->LinkCustomAttributes = "";
        $this->GnRH13->HrefValue = "";
        $this->GnRH13->TooltipValue = "";

        // E21
        $this->E21->LinkCustomAttributes = "";
        $this->E21->HrefValue = "";
        $this->E21->TooltipValue = "";

        // E22
        $this->E22->LinkCustomAttributes = "";
        $this->E22->HrefValue = "";
        $this->E22->TooltipValue = "";

        // E23
        $this->E23->LinkCustomAttributes = "";
        $this->E23->HrefValue = "";
        $this->E23->TooltipValue = "";

        // E24
        $this->E24->LinkCustomAttributes = "";
        $this->E24->HrefValue = "";
        $this->E24->TooltipValue = "";

        // E25
        $this->E25->LinkCustomAttributes = "";
        $this->E25->HrefValue = "";
        $this->E25->TooltipValue = "";

        // E26
        $this->E26->LinkCustomAttributes = "";
        $this->E26->HrefValue = "";
        $this->E26->TooltipValue = "";

        // E27
        $this->E27->LinkCustomAttributes = "";
        $this->E27->HrefValue = "";
        $this->E27->TooltipValue = "";

        // E28
        $this->E28->LinkCustomAttributes = "";
        $this->E28->HrefValue = "";
        $this->E28->TooltipValue = "";

        // E29
        $this->E29->LinkCustomAttributes = "";
        $this->E29->HrefValue = "";
        $this->E29->TooltipValue = "";

        // E210
        $this->E210->LinkCustomAttributes = "";
        $this->E210->HrefValue = "";
        $this->E210->TooltipValue = "";

        // E211
        $this->E211->LinkCustomAttributes = "";
        $this->E211->HrefValue = "";
        $this->E211->TooltipValue = "";

        // E212
        $this->E212->LinkCustomAttributes = "";
        $this->E212->HrefValue = "";
        $this->E212->TooltipValue = "";

        // E213
        $this->E213->LinkCustomAttributes = "";
        $this->E213->HrefValue = "";
        $this->E213->TooltipValue = "";

        // P41
        $this->P41->LinkCustomAttributes = "";
        $this->P41->HrefValue = "";
        $this->P41->TooltipValue = "";

        // P42
        $this->P42->LinkCustomAttributes = "";
        $this->P42->HrefValue = "";
        $this->P42->TooltipValue = "";

        // P43
        $this->P43->LinkCustomAttributes = "";
        $this->P43->HrefValue = "";
        $this->P43->TooltipValue = "";

        // P44
        $this->P44->LinkCustomAttributes = "";
        $this->P44->HrefValue = "";
        $this->P44->TooltipValue = "";

        // P45
        $this->P45->LinkCustomAttributes = "";
        $this->P45->HrefValue = "";
        $this->P45->TooltipValue = "";

        // P46
        $this->P46->LinkCustomAttributes = "";
        $this->P46->HrefValue = "";
        $this->P46->TooltipValue = "";

        // P47
        $this->P47->LinkCustomAttributes = "";
        $this->P47->HrefValue = "";
        $this->P47->TooltipValue = "";

        // P48
        $this->P48->LinkCustomAttributes = "";
        $this->P48->HrefValue = "";
        $this->P48->TooltipValue = "";

        // P49
        $this->P49->LinkCustomAttributes = "";
        $this->P49->HrefValue = "";
        $this->P49->TooltipValue = "";

        // P410
        $this->P410->LinkCustomAttributes = "";
        $this->P410->HrefValue = "";
        $this->P410->TooltipValue = "";

        // P411
        $this->P411->LinkCustomAttributes = "";
        $this->P411->HrefValue = "";
        $this->P411->TooltipValue = "";

        // P412
        $this->P412->LinkCustomAttributes = "";
        $this->P412->HrefValue = "";
        $this->P412->TooltipValue = "";

        // P413
        $this->P413->LinkCustomAttributes = "";
        $this->P413->HrefValue = "";
        $this->P413->TooltipValue = "";

        // USGRt1
        $this->USGRt1->LinkCustomAttributes = "";
        $this->USGRt1->HrefValue = "";
        $this->USGRt1->TooltipValue = "";

        // USGRt2
        $this->USGRt2->LinkCustomAttributes = "";
        $this->USGRt2->HrefValue = "";
        $this->USGRt2->TooltipValue = "";

        // USGRt3
        $this->USGRt3->LinkCustomAttributes = "";
        $this->USGRt3->HrefValue = "";
        $this->USGRt3->TooltipValue = "";

        // USGRt4
        $this->USGRt4->LinkCustomAttributes = "";
        $this->USGRt4->HrefValue = "";
        $this->USGRt4->TooltipValue = "";

        // USGRt5
        $this->USGRt5->LinkCustomAttributes = "";
        $this->USGRt5->HrefValue = "";
        $this->USGRt5->TooltipValue = "";

        // USGRt6
        $this->USGRt6->LinkCustomAttributes = "";
        $this->USGRt6->HrefValue = "";
        $this->USGRt6->TooltipValue = "";

        // USGRt7
        $this->USGRt7->LinkCustomAttributes = "";
        $this->USGRt7->HrefValue = "";
        $this->USGRt7->TooltipValue = "";

        // USGRt8
        $this->USGRt8->LinkCustomAttributes = "";
        $this->USGRt8->HrefValue = "";
        $this->USGRt8->TooltipValue = "";

        // USGRt9
        $this->USGRt9->LinkCustomAttributes = "";
        $this->USGRt9->HrefValue = "";
        $this->USGRt9->TooltipValue = "";

        // USGRt10
        $this->USGRt10->LinkCustomAttributes = "";
        $this->USGRt10->HrefValue = "";
        $this->USGRt10->TooltipValue = "";

        // USGRt11
        $this->USGRt11->LinkCustomAttributes = "";
        $this->USGRt11->HrefValue = "";
        $this->USGRt11->TooltipValue = "";

        // USGRt12
        $this->USGRt12->LinkCustomAttributes = "";
        $this->USGRt12->HrefValue = "";
        $this->USGRt12->TooltipValue = "";

        // USGRt13
        $this->USGRt13->LinkCustomAttributes = "";
        $this->USGRt13->HrefValue = "";
        $this->USGRt13->TooltipValue = "";

        // USGLt1
        $this->USGLt1->LinkCustomAttributes = "";
        $this->USGLt1->HrefValue = "";
        $this->USGLt1->TooltipValue = "";

        // USGLt2
        $this->USGLt2->LinkCustomAttributes = "";
        $this->USGLt2->HrefValue = "";
        $this->USGLt2->TooltipValue = "";

        // USGLt3
        $this->USGLt3->LinkCustomAttributes = "";
        $this->USGLt3->HrefValue = "";
        $this->USGLt3->TooltipValue = "";

        // USGLt4
        $this->USGLt4->LinkCustomAttributes = "";
        $this->USGLt4->HrefValue = "";
        $this->USGLt4->TooltipValue = "";

        // USGLt5
        $this->USGLt5->LinkCustomAttributes = "";
        $this->USGLt5->HrefValue = "";
        $this->USGLt5->TooltipValue = "";

        // USGLt6
        $this->USGLt6->LinkCustomAttributes = "";
        $this->USGLt6->HrefValue = "";
        $this->USGLt6->TooltipValue = "";

        // USGLt7
        $this->USGLt7->LinkCustomAttributes = "";
        $this->USGLt7->HrefValue = "";
        $this->USGLt7->TooltipValue = "";

        // USGLt8
        $this->USGLt8->LinkCustomAttributes = "";
        $this->USGLt8->HrefValue = "";
        $this->USGLt8->TooltipValue = "";

        // USGLt9
        $this->USGLt9->LinkCustomAttributes = "";
        $this->USGLt9->HrefValue = "";
        $this->USGLt9->TooltipValue = "";

        // USGLt10
        $this->USGLt10->LinkCustomAttributes = "";
        $this->USGLt10->HrefValue = "";
        $this->USGLt10->TooltipValue = "";

        // USGLt11
        $this->USGLt11->LinkCustomAttributes = "";
        $this->USGLt11->HrefValue = "";
        $this->USGLt11->TooltipValue = "";

        // USGLt12
        $this->USGLt12->LinkCustomAttributes = "";
        $this->USGLt12->HrefValue = "";
        $this->USGLt12->TooltipValue = "";

        // USGLt13
        $this->USGLt13->LinkCustomAttributes = "";
        $this->USGLt13->HrefValue = "";
        $this->USGLt13->TooltipValue = "";

        // EM1
        $this->EM1->LinkCustomAttributes = "";
        $this->EM1->HrefValue = "";
        $this->EM1->TooltipValue = "";

        // EM2
        $this->EM2->LinkCustomAttributes = "";
        $this->EM2->HrefValue = "";
        $this->EM2->TooltipValue = "";

        // EM3
        $this->EM3->LinkCustomAttributes = "";
        $this->EM3->HrefValue = "";
        $this->EM3->TooltipValue = "";

        // EM4
        $this->EM4->LinkCustomAttributes = "";
        $this->EM4->HrefValue = "";
        $this->EM4->TooltipValue = "";

        // EM5
        $this->EM5->LinkCustomAttributes = "";
        $this->EM5->HrefValue = "";
        $this->EM5->TooltipValue = "";

        // EM6
        $this->EM6->LinkCustomAttributes = "";
        $this->EM6->HrefValue = "";
        $this->EM6->TooltipValue = "";

        // EM7
        $this->EM7->LinkCustomAttributes = "";
        $this->EM7->HrefValue = "";
        $this->EM7->TooltipValue = "";

        // EM8
        $this->EM8->LinkCustomAttributes = "";
        $this->EM8->HrefValue = "";
        $this->EM8->TooltipValue = "";

        // EM9
        $this->EM9->LinkCustomAttributes = "";
        $this->EM9->HrefValue = "";
        $this->EM9->TooltipValue = "";

        // EM10
        $this->EM10->LinkCustomAttributes = "";
        $this->EM10->HrefValue = "";
        $this->EM10->TooltipValue = "";

        // EM11
        $this->EM11->LinkCustomAttributes = "";
        $this->EM11->HrefValue = "";
        $this->EM11->TooltipValue = "";

        // EM12
        $this->EM12->LinkCustomAttributes = "";
        $this->EM12->HrefValue = "";
        $this->EM12->TooltipValue = "";

        // EM13
        $this->EM13->LinkCustomAttributes = "";
        $this->EM13->HrefValue = "";
        $this->EM13->TooltipValue = "";

        // Others1
        $this->Others1->LinkCustomAttributes = "";
        $this->Others1->HrefValue = "";
        $this->Others1->TooltipValue = "";

        // Others2
        $this->Others2->LinkCustomAttributes = "";
        $this->Others2->HrefValue = "";
        $this->Others2->TooltipValue = "";

        // Others3
        $this->Others3->LinkCustomAttributes = "";
        $this->Others3->HrefValue = "";
        $this->Others3->TooltipValue = "";

        // Others4
        $this->Others4->LinkCustomAttributes = "";
        $this->Others4->HrefValue = "";
        $this->Others4->TooltipValue = "";

        // Others5
        $this->Others5->LinkCustomAttributes = "";
        $this->Others5->HrefValue = "";
        $this->Others5->TooltipValue = "";

        // Others6
        $this->Others6->LinkCustomAttributes = "";
        $this->Others6->HrefValue = "";
        $this->Others6->TooltipValue = "";

        // Others7
        $this->Others7->LinkCustomAttributes = "";
        $this->Others7->HrefValue = "";
        $this->Others7->TooltipValue = "";

        // Others8
        $this->Others8->LinkCustomAttributes = "";
        $this->Others8->HrefValue = "";
        $this->Others8->TooltipValue = "";

        // Others9
        $this->Others9->LinkCustomAttributes = "";
        $this->Others9->HrefValue = "";
        $this->Others9->TooltipValue = "";

        // Others10
        $this->Others10->LinkCustomAttributes = "";
        $this->Others10->HrefValue = "";
        $this->Others10->TooltipValue = "";

        // Others11
        $this->Others11->LinkCustomAttributes = "";
        $this->Others11->HrefValue = "";
        $this->Others11->TooltipValue = "";

        // Others12
        $this->Others12->LinkCustomAttributes = "";
        $this->Others12->HrefValue = "";
        $this->Others12->TooltipValue = "";

        // Others13
        $this->Others13->LinkCustomAttributes = "";
        $this->Others13->HrefValue = "";
        $this->Others13->TooltipValue = "";

        // DR1
        $this->DR1->LinkCustomAttributes = "";
        $this->DR1->HrefValue = "";
        $this->DR1->TooltipValue = "";

        // DR2
        $this->DR2->LinkCustomAttributes = "";
        $this->DR2->HrefValue = "";
        $this->DR2->TooltipValue = "";

        // DR3
        $this->DR3->LinkCustomAttributes = "";
        $this->DR3->HrefValue = "";
        $this->DR3->TooltipValue = "";

        // DR4
        $this->DR4->LinkCustomAttributes = "";
        $this->DR4->HrefValue = "";
        $this->DR4->TooltipValue = "";

        // DR5
        $this->DR5->LinkCustomAttributes = "";
        $this->DR5->HrefValue = "";
        $this->DR5->TooltipValue = "";

        // DR6
        $this->DR6->LinkCustomAttributes = "";
        $this->DR6->HrefValue = "";
        $this->DR6->TooltipValue = "";

        // DR7
        $this->DR7->LinkCustomAttributes = "";
        $this->DR7->HrefValue = "";
        $this->DR7->TooltipValue = "";

        // DR8
        $this->DR8->LinkCustomAttributes = "";
        $this->DR8->HrefValue = "";
        $this->DR8->TooltipValue = "";

        // DR9
        $this->DR9->LinkCustomAttributes = "";
        $this->DR9->HrefValue = "";
        $this->DR9->TooltipValue = "";

        // DR10
        $this->DR10->LinkCustomAttributes = "";
        $this->DR10->HrefValue = "";
        $this->DR10->TooltipValue = "";

        // DR11
        $this->DR11->LinkCustomAttributes = "";
        $this->DR11->HrefValue = "";
        $this->DR11->TooltipValue = "";

        // DR12
        $this->DR12->LinkCustomAttributes = "";
        $this->DR12->HrefValue = "";
        $this->DR12->TooltipValue = "";

        // DR13
        $this->DR13->LinkCustomAttributes = "";
        $this->DR13->HrefValue = "";
        $this->DR13->TooltipValue = "";

        // DOCTORRESPONSIBLE
        $this->DOCTORRESPONSIBLE->LinkCustomAttributes = "";
        $this->DOCTORRESPONSIBLE->HrefValue = "";
        $this->DOCTORRESPONSIBLE->TooltipValue = "";

        // TidNo
        $this->TidNo->LinkCustomAttributes = "";
        $this->TidNo->HrefValue = "";
        $this->TidNo->TooltipValue = "";

        // Convert
        $this->Convert->LinkCustomAttributes = "";
        $this->Convert->HrefValue = "";
        $this->Convert->TooltipValue = "";

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

        // UCLcm
        $this->UCLcm->LinkCustomAttributes = "";
        $this->UCLcm->HrefValue = "";
        $this->UCLcm->TooltipValue = "";

        // DATOFEMBRYOTRANSFER
        $this->DATOFEMBRYOTRANSFER->LinkCustomAttributes = "";
        $this->DATOFEMBRYOTRANSFER->HrefValue = "";
        $this->DATOFEMBRYOTRANSFER->TooltipValue = "";

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

        // ViaAdmin
        $this->ViaAdmin->LinkCustomAttributes = "";
        $this->ViaAdmin->HrefValue = "";
        $this->ViaAdmin->TooltipValue = "";

        // ViaStartDateTime
        $this->ViaStartDateTime->LinkCustomAttributes = "";
        $this->ViaStartDateTime->HrefValue = "";
        $this->ViaStartDateTime->TooltipValue = "";

        // ViaDose
        $this->ViaDose->LinkCustomAttributes = "";
        $this->ViaDose->HrefValue = "";
        $this->ViaDose->TooltipValue = "";

        // AllFreeze
        $this->AllFreeze->LinkCustomAttributes = "";
        $this->AllFreeze->HrefValue = "";
        $this->AllFreeze->TooltipValue = "";

        // TreatmentCancel
        $this->TreatmentCancel->LinkCustomAttributes = "";
        $this->TreatmentCancel->HrefValue = "";
        $this->TreatmentCancel->TooltipValue = "";

        // Reason
        $this->Reason->LinkCustomAttributes = "";
        $this->Reason->HrefValue = "";
        $this->Reason->TooltipValue = "";

        // ProgesteroneAdmin
        $this->ProgesteroneAdmin->LinkCustomAttributes = "";
        $this->ProgesteroneAdmin->HrefValue = "";
        $this->ProgesteroneAdmin->TooltipValue = "";

        // ProgesteroneStart
        $this->ProgesteroneStart->LinkCustomAttributes = "";
        $this->ProgesteroneStart->HrefValue = "";
        $this->ProgesteroneStart->TooltipValue = "";

        // ProgesteroneDose
        $this->ProgesteroneDose->LinkCustomAttributes = "";
        $this->ProgesteroneDose->HrefValue = "";
        $this->ProgesteroneDose->TooltipValue = "";

        // Projectron
        $this->Projectron->LinkCustomAttributes = "";
        $this->Projectron->HrefValue = "";
        $this->Projectron->TooltipValue = "";

        // StChDate14
        $this->StChDate14->LinkCustomAttributes = "";
        $this->StChDate14->HrefValue = "";
        $this->StChDate14->TooltipValue = "";

        // StChDate15
        $this->StChDate15->LinkCustomAttributes = "";
        $this->StChDate15->HrefValue = "";
        $this->StChDate15->TooltipValue = "";

        // StChDate16
        $this->StChDate16->LinkCustomAttributes = "";
        $this->StChDate16->HrefValue = "";
        $this->StChDate16->TooltipValue = "";

        // StChDate17
        $this->StChDate17->LinkCustomAttributes = "";
        $this->StChDate17->HrefValue = "";
        $this->StChDate17->TooltipValue = "";

        // StChDate18
        $this->StChDate18->LinkCustomAttributes = "";
        $this->StChDate18->HrefValue = "";
        $this->StChDate18->TooltipValue = "";

        // StChDate19
        $this->StChDate19->LinkCustomAttributes = "";
        $this->StChDate19->HrefValue = "";
        $this->StChDate19->TooltipValue = "";

        // StChDate20
        $this->StChDate20->LinkCustomAttributes = "";
        $this->StChDate20->HrefValue = "";
        $this->StChDate20->TooltipValue = "";

        // StChDate21
        $this->StChDate21->LinkCustomAttributes = "";
        $this->StChDate21->HrefValue = "";
        $this->StChDate21->TooltipValue = "";

        // StChDate22
        $this->StChDate22->LinkCustomAttributes = "";
        $this->StChDate22->HrefValue = "";
        $this->StChDate22->TooltipValue = "";

        // StChDate23
        $this->StChDate23->LinkCustomAttributes = "";
        $this->StChDate23->HrefValue = "";
        $this->StChDate23->TooltipValue = "";

        // StChDate24
        $this->StChDate24->LinkCustomAttributes = "";
        $this->StChDate24->HrefValue = "";
        $this->StChDate24->TooltipValue = "";

        // StChDate25
        $this->StChDate25->LinkCustomAttributes = "";
        $this->StChDate25->HrefValue = "";
        $this->StChDate25->TooltipValue = "";

        // CycleDay14
        $this->CycleDay14->LinkCustomAttributes = "";
        $this->CycleDay14->HrefValue = "";
        $this->CycleDay14->TooltipValue = "";

        // CycleDay15
        $this->CycleDay15->LinkCustomAttributes = "";
        $this->CycleDay15->HrefValue = "";
        $this->CycleDay15->TooltipValue = "";

        // CycleDay16
        $this->CycleDay16->LinkCustomAttributes = "";
        $this->CycleDay16->HrefValue = "";
        $this->CycleDay16->TooltipValue = "";

        // CycleDay17
        $this->CycleDay17->LinkCustomAttributes = "";
        $this->CycleDay17->HrefValue = "";
        $this->CycleDay17->TooltipValue = "";

        // CycleDay18
        $this->CycleDay18->LinkCustomAttributes = "";
        $this->CycleDay18->HrefValue = "";
        $this->CycleDay18->TooltipValue = "";

        // CycleDay19
        $this->CycleDay19->LinkCustomAttributes = "";
        $this->CycleDay19->HrefValue = "";
        $this->CycleDay19->TooltipValue = "";

        // CycleDay20
        $this->CycleDay20->LinkCustomAttributes = "";
        $this->CycleDay20->HrefValue = "";
        $this->CycleDay20->TooltipValue = "";

        // CycleDay21
        $this->CycleDay21->LinkCustomAttributes = "";
        $this->CycleDay21->HrefValue = "";
        $this->CycleDay21->TooltipValue = "";

        // CycleDay22
        $this->CycleDay22->LinkCustomAttributes = "";
        $this->CycleDay22->HrefValue = "";
        $this->CycleDay22->TooltipValue = "";

        // CycleDay23
        $this->CycleDay23->LinkCustomAttributes = "";
        $this->CycleDay23->HrefValue = "";
        $this->CycleDay23->TooltipValue = "";

        // CycleDay24
        $this->CycleDay24->LinkCustomAttributes = "";
        $this->CycleDay24->HrefValue = "";
        $this->CycleDay24->TooltipValue = "";

        // CycleDay25
        $this->CycleDay25->LinkCustomAttributes = "";
        $this->CycleDay25->HrefValue = "";
        $this->CycleDay25->TooltipValue = "";

        // StimulationDay14
        $this->StimulationDay14->LinkCustomAttributes = "";
        $this->StimulationDay14->HrefValue = "";
        $this->StimulationDay14->TooltipValue = "";

        // StimulationDay15
        $this->StimulationDay15->LinkCustomAttributes = "";
        $this->StimulationDay15->HrefValue = "";
        $this->StimulationDay15->TooltipValue = "";

        // StimulationDay16
        $this->StimulationDay16->LinkCustomAttributes = "";
        $this->StimulationDay16->HrefValue = "";
        $this->StimulationDay16->TooltipValue = "";

        // StimulationDay17
        $this->StimulationDay17->LinkCustomAttributes = "";
        $this->StimulationDay17->HrefValue = "";
        $this->StimulationDay17->TooltipValue = "";

        // StimulationDay18
        $this->StimulationDay18->LinkCustomAttributes = "";
        $this->StimulationDay18->HrefValue = "";
        $this->StimulationDay18->TooltipValue = "";

        // StimulationDay19
        $this->StimulationDay19->LinkCustomAttributes = "";
        $this->StimulationDay19->HrefValue = "";
        $this->StimulationDay19->TooltipValue = "";

        // StimulationDay20
        $this->StimulationDay20->LinkCustomAttributes = "";
        $this->StimulationDay20->HrefValue = "";
        $this->StimulationDay20->TooltipValue = "";

        // StimulationDay21
        $this->StimulationDay21->LinkCustomAttributes = "";
        $this->StimulationDay21->HrefValue = "";
        $this->StimulationDay21->TooltipValue = "";

        // StimulationDay22
        $this->StimulationDay22->LinkCustomAttributes = "";
        $this->StimulationDay22->HrefValue = "";
        $this->StimulationDay22->TooltipValue = "";

        // StimulationDay23
        $this->StimulationDay23->LinkCustomAttributes = "";
        $this->StimulationDay23->HrefValue = "";
        $this->StimulationDay23->TooltipValue = "";

        // StimulationDay24
        $this->StimulationDay24->LinkCustomAttributes = "";
        $this->StimulationDay24->HrefValue = "";
        $this->StimulationDay24->TooltipValue = "";

        // StimulationDay25
        $this->StimulationDay25->LinkCustomAttributes = "";
        $this->StimulationDay25->HrefValue = "";
        $this->StimulationDay25->TooltipValue = "";

        // Tablet14
        $this->Tablet14->LinkCustomAttributes = "";
        $this->Tablet14->HrefValue = "";
        $this->Tablet14->TooltipValue = "";

        // Tablet15
        $this->Tablet15->LinkCustomAttributes = "";
        $this->Tablet15->HrefValue = "";
        $this->Tablet15->TooltipValue = "";

        // Tablet16
        $this->Tablet16->LinkCustomAttributes = "";
        $this->Tablet16->HrefValue = "";
        $this->Tablet16->TooltipValue = "";

        // Tablet17
        $this->Tablet17->LinkCustomAttributes = "";
        $this->Tablet17->HrefValue = "";
        $this->Tablet17->TooltipValue = "";

        // Tablet18
        $this->Tablet18->LinkCustomAttributes = "";
        $this->Tablet18->HrefValue = "";
        $this->Tablet18->TooltipValue = "";

        // Tablet19
        $this->Tablet19->LinkCustomAttributes = "";
        $this->Tablet19->HrefValue = "";
        $this->Tablet19->TooltipValue = "";

        // Tablet20
        $this->Tablet20->LinkCustomAttributes = "";
        $this->Tablet20->HrefValue = "";
        $this->Tablet20->TooltipValue = "";

        // Tablet21
        $this->Tablet21->LinkCustomAttributes = "";
        $this->Tablet21->HrefValue = "";
        $this->Tablet21->TooltipValue = "";

        // Tablet22
        $this->Tablet22->LinkCustomAttributes = "";
        $this->Tablet22->HrefValue = "";
        $this->Tablet22->TooltipValue = "";

        // Tablet23
        $this->Tablet23->LinkCustomAttributes = "";
        $this->Tablet23->HrefValue = "";
        $this->Tablet23->TooltipValue = "";

        // Tablet24
        $this->Tablet24->LinkCustomAttributes = "";
        $this->Tablet24->HrefValue = "";
        $this->Tablet24->TooltipValue = "";

        // Tablet25
        $this->Tablet25->LinkCustomAttributes = "";
        $this->Tablet25->HrefValue = "";
        $this->Tablet25->TooltipValue = "";

        // RFSH14
        $this->RFSH14->LinkCustomAttributes = "";
        $this->RFSH14->HrefValue = "";
        $this->RFSH14->TooltipValue = "";

        // RFSH15
        $this->RFSH15->LinkCustomAttributes = "";
        $this->RFSH15->HrefValue = "";
        $this->RFSH15->TooltipValue = "";

        // RFSH16
        $this->RFSH16->LinkCustomAttributes = "";
        $this->RFSH16->HrefValue = "";
        $this->RFSH16->TooltipValue = "";

        // RFSH17
        $this->RFSH17->LinkCustomAttributes = "";
        $this->RFSH17->HrefValue = "";
        $this->RFSH17->TooltipValue = "";

        // RFSH18
        $this->RFSH18->LinkCustomAttributes = "";
        $this->RFSH18->HrefValue = "";
        $this->RFSH18->TooltipValue = "";

        // RFSH19
        $this->RFSH19->LinkCustomAttributes = "";
        $this->RFSH19->HrefValue = "";
        $this->RFSH19->TooltipValue = "";

        // RFSH20
        $this->RFSH20->LinkCustomAttributes = "";
        $this->RFSH20->HrefValue = "";
        $this->RFSH20->TooltipValue = "";

        // RFSH21
        $this->RFSH21->LinkCustomAttributes = "";
        $this->RFSH21->HrefValue = "";
        $this->RFSH21->TooltipValue = "";

        // RFSH22
        $this->RFSH22->LinkCustomAttributes = "";
        $this->RFSH22->HrefValue = "";
        $this->RFSH22->TooltipValue = "";

        // RFSH23
        $this->RFSH23->LinkCustomAttributes = "";
        $this->RFSH23->HrefValue = "";
        $this->RFSH23->TooltipValue = "";

        // RFSH24
        $this->RFSH24->LinkCustomAttributes = "";
        $this->RFSH24->HrefValue = "";
        $this->RFSH24->TooltipValue = "";

        // RFSH25
        $this->RFSH25->LinkCustomAttributes = "";
        $this->RFSH25->HrefValue = "";
        $this->RFSH25->TooltipValue = "";

        // HMG14
        $this->HMG14->LinkCustomAttributes = "";
        $this->HMG14->HrefValue = "";
        $this->HMG14->TooltipValue = "";

        // HMG15
        $this->HMG15->LinkCustomAttributes = "";
        $this->HMG15->HrefValue = "";
        $this->HMG15->TooltipValue = "";

        // HMG16
        $this->HMG16->LinkCustomAttributes = "";
        $this->HMG16->HrefValue = "";
        $this->HMG16->TooltipValue = "";

        // HMG17
        $this->HMG17->LinkCustomAttributes = "";
        $this->HMG17->HrefValue = "";
        $this->HMG17->TooltipValue = "";

        // HMG18
        $this->HMG18->LinkCustomAttributes = "";
        $this->HMG18->HrefValue = "";
        $this->HMG18->TooltipValue = "";

        // HMG19
        $this->HMG19->LinkCustomAttributes = "";
        $this->HMG19->HrefValue = "";
        $this->HMG19->TooltipValue = "";

        // HMG20
        $this->HMG20->LinkCustomAttributes = "";
        $this->HMG20->HrefValue = "";
        $this->HMG20->TooltipValue = "";

        // HMG21
        $this->HMG21->LinkCustomAttributes = "";
        $this->HMG21->HrefValue = "";
        $this->HMG21->TooltipValue = "";

        // HMG22
        $this->HMG22->LinkCustomAttributes = "";
        $this->HMG22->HrefValue = "";
        $this->HMG22->TooltipValue = "";

        // HMG23
        $this->HMG23->LinkCustomAttributes = "";
        $this->HMG23->HrefValue = "";
        $this->HMG23->TooltipValue = "";

        // HMG24
        $this->HMG24->LinkCustomAttributes = "";
        $this->HMG24->HrefValue = "";
        $this->HMG24->TooltipValue = "";

        // HMG25
        $this->HMG25->LinkCustomAttributes = "";
        $this->HMG25->HrefValue = "";
        $this->HMG25->TooltipValue = "";

        // GnRH14
        $this->GnRH14->LinkCustomAttributes = "";
        $this->GnRH14->HrefValue = "";
        $this->GnRH14->TooltipValue = "";

        // GnRH15
        $this->GnRH15->LinkCustomAttributes = "";
        $this->GnRH15->HrefValue = "";
        $this->GnRH15->TooltipValue = "";

        // GnRH16
        $this->GnRH16->LinkCustomAttributes = "";
        $this->GnRH16->HrefValue = "";
        $this->GnRH16->TooltipValue = "";

        // GnRH17
        $this->GnRH17->LinkCustomAttributes = "";
        $this->GnRH17->HrefValue = "";
        $this->GnRH17->TooltipValue = "";

        // GnRH18
        $this->GnRH18->LinkCustomAttributes = "";
        $this->GnRH18->HrefValue = "";
        $this->GnRH18->TooltipValue = "";

        // GnRH19
        $this->GnRH19->LinkCustomAttributes = "";
        $this->GnRH19->HrefValue = "";
        $this->GnRH19->TooltipValue = "";

        // GnRH20
        $this->GnRH20->LinkCustomAttributes = "";
        $this->GnRH20->HrefValue = "";
        $this->GnRH20->TooltipValue = "";

        // GnRH21
        $this->GnRH21->LinkCustomAttributes = "";
        $this->GnRH21->HrefValue = "";
        $this->GnRH21->TooltipValue = "";

        // GnRH22
        $this->GnRH22->LinkCustomAttributes = "";
        $this->GnRH22->HrefValue = "";
        $this->GnRH22->TooltipValue = "";

        // GnRH23
        $this->GnRH23->LinkCustomAttributes = "";
        $this->GnRH23->HrefValue = "";
        $this->GnRH23->TooltipValue = "";

        // GnRH24
        $this->GnRH24->LinkCustomAttributes = "";
        $this->GnRH24->HrefValue = "";
        $this->GnRH24->TooltipValue = "";

        // GnRH25
        $this->GnRH25->LinkCustomAttributes = "";
        $this->GnRH25->HrefValue = "";
        $this->GnRH25->TooltipValue = "";

        // P414
        $this->P414->LinkCustomAttributes = "";
        $this->P414->HrefValue = "";
        $this->P414->TooltipValue = "";

        // P415
        $this->P415->LinkCustomAttributes = "";
        $this->P415->HrefValue = "";
        $this->P415->TooltipValue = "";

        // P416
        $this->P416->LinkCustomAttributes = "";
        $this->P416->HrefValue = "";
        $this->P416->TooltipValue = "";

        // P417
        $this->P417->LinkCustomAttributes = "";
        $this->P417->HrefValue = "";
        $this->P417->TooltipValue = "";

        // P418
        $this->P418->LinkCustomAttributes = "";
        $this->P418->HrefValue = "";
        $this->P418->TooltipValue = "";

        // P419
        $this->P419->LinkCustomAttributes = "";
        $this->P419->HrefValue = "";
        $this->P419->TooltipValue = "";

        // P420
        $this->P420->LinkCustomAttributes = "";
        $this->P420->HrefValue = "";
        $this->P420->TooltipValue = "";

        // P421
        $this->P421->LinkCustomAttributes = "";
        $this->P421->HrefValue = "";
        $this->P421->TooltipValue = "";

        // P422
        $this->P422->LinkCustomAttributes = "";
        $this->P422->HrefValue = "";
        $this->P422->TooltipValue = "";

        // P423
        $this->P423->LinkCustomAttributes = "";
        $this->P423->HrefValue = "";
        $this->P423->TooltipValue = "";

        // P424
        $this->P424->LinkCustomAttributes = "";
        $this->P424->HrefValue = "";
        $this->P424->TooltipValue = "";

        // P425
        $this->P425->LinkCustomAttributes = "";
        $this->P425->HrefValue = "";
        $this->P425->TooltipValue = "";

        // USGRt14
        $this->USGRt14->LinkCustomAttributes = "";
        $this->USGRt14->HrefValue = "";
        $this->USGRt14->TooltipValue = "";

        // USGRt15
        $this->USGRt15->LinkCustomAttributes = "";
        $this->USGRt15->HrefValue = "";
        $this->USGRt15->TooltipValue = "";

        // USGRt16
        $this->USGRt16->LinkCustomAttributes = "";
        $this->USGRt16->HrefValue = "";
        $this->USGRt16->TooltipValue = "";

        // USGRt17
        $this->USGRt17->LinkCustomAttributes = "";
        $this->USGRt17->HrefValue = "";
        $this->USGRt17->TooltipValue = "";

        // USGRt18
        $this->USGRt18->LinkCustomAttributes = "";
        $this->USGRt18->HrefValue = "";
        $this->USGRt18->TooltipValue = "";

        // USGRt19
        $this->USGRt19->LinkCustomAttributes = "";
        $this->USGRt19->HrefValue = "";
        $this->USGRt19->TooltipValue = "";

        // USGRt20
        $this->USGRt20->LinkCustomAttributes = "";
        $this->USGRt20->HrefValue = "";
        $this->USGRt20->TooltipValue = "";

        // USGRt21
        $this->USGRt21->LinkCustomAttributes = "";
        $this->USGRt21->HrefValue = "";
        $this->USGRt21->TooltipValue = "";

        // USGRt22
        $this->USGRt22->LinkCustomAttributes = "";
        $this->USGRt22->HrefValue = "";
        $this->USGRt22->TooltipValue = "";

        // USGRt23
        $this->USGRt23->LinkCustomAttributes = "";
        $this->USGRt23->HrefValue = "";
        $this->USGRt23->TooltipValue = "";

        // USGRt24
        $this->USGRt24->LinkCustomAttributes = "";
        $this->USGRt24->HrefValue = "";
        $this->USGRt24->TooltipValue = "";

        // USGRt25
        $this->USGRt25->LinkCustomAttributes = "";
        $this->USGRt25->HrefValue = "";
        $this->USGRt25->TooltipValue = "";

        // USGLt14
        $this->USGLt14->LinkCustomAttributes = "";
        $this->USGLt14->HrefValue = "";
        $this->USGLt14->TooltipValue = "";

        // USGLt15
        $this->USGLt15->LinkCustomAttributes = "";
        $this->USGLt15->HrefValue = "";
        $this->USGLt15->TooltipValue = "";

        // USGLt16
        $this->USGLt16->LinkCustomAttributes = "";
        $this->USGLt16->HrefValue = "";
        $this->USGLt16->TooltipValue = "";

        // USGLt17
        $this->USGLt17->LinkCustomAttributes = "";
        $this->USGLt17->HrefValue = "";
        $this->USGLt17->TooltipValue = "";

        // USGLt18
        $this->USGLt18->LinkCustomAttributes = "";
        $this->USGLt18->HrefValue = "";
        $this->USGLt18->TooltipValue = "";

        // USGLt19
        $this->USGLt19->LinkCustomAttributes = "";
        $this->USGLt19->HrefValue = "";
        $this->USGLt19->TooltipValue = "";

        // USGLt20
        $this->USGLt20->LinkCustomAttributes = "";
        $this->USGLt20->HrefValue = "";
        $this->USGLt20->TooltipValue = "";

        // USGLt21
        $this->USGLt21->LinkCustomAttributes = "";
        $this->USGLt21->HrefValue = "";
        $this->USGLt21->TooltipValue = "";

        // USGLt22
        $this->USGLt22->LinkCustomAttributes = "";
        $this->USGLt22->HrefValue = "";
        $this->USGLt22->TooltipValue = "";

        // USGLt23
        $this->USGLt23->LinkCustomAttributes = "";
        $this->USGLt23->HrefValue = "";
        $this->USGLt23->TooltipValue = "";

        // USGLt24
        $this->USGLt24->LinkCustomAttributes = "";
        $this->USGLt24->HrefValue = "";
        $this->USGLt24->TooltipValue = "";

        // USGLt25
        $this->USGLt25->LinkCustomAttributes = "";
        $this->USGLt25->HrefValue = "";
        $this->USGLt25->TooltipValue = "";

        // EM14
        $this->EM14->LinkCustomAttributes = "";
        $this->EM14->HrefValue = "";
        $this->EM14->TooltipValue = "";

        // EM15
        $this->EM15->LinkCustomAttributes = "";
        $this->EM15->HrefValue = "";
        $this->EM15->TooltipValue = "";

        // EM16
        $this->EM16->LinkCustomAttributes = "";
        $this->EM16->HrefValue = "";
        $this->EM16->TooltipValue = "";

        // EM17
        $this->EM17->LinkCustomAttributes = "";
        $this->EM17->HrefValue = "";
        $this->EM17->TooltipValue = "";

        // EM18
        $this->EM18->LinkCustomAttributes = "";
        $this->EM18->HrefValue = "";
        $this->EM18->TooltipValue = "";

        // EM19
        $this->EM19->LinkCustomAttributes = "";
        $this->EM19->HrefValue = "";
        $this->EM19->TooltipValue = "";

        // EM20
        $this->EM20->LinkCustomAttributes = "";
        $this->EM20->HrefValue = "";
        $this->EM20->TooltipValue = "";

        // EM21
        $this->EM21->LinkCustomAttributes = "";
        $this->EM21->HrefValue = "";
        $this->EM21->TooltipValue = "";

        // EM22
        $this->EM22->LinkCustomAttributes = "";
        $this->EM22->HrefValue = "";
        $this->EM22->TooltipValue = "";

        // EM23
        $this->EM23->LinkCustomAttributes = "";
        $this->EM23->HrefValue = "";
        $this->EM23->TooltipValue = "";

        // EM24
        $this->EM24->LinkCustomAttributes = "";
        $this->EM24->HrefValue = "";
        $this->EM24->TooltipValue = "";

        // EM25
        $this->EM25->LinkCustomAttributes = "";
        $this->EM25->HrefValue = "";
        $this->EM25->TooltipValue = "";

        // Others14
        $this->Others14->LinkCustomAttributes = "";
        $this->Others14->HrefValue = "";
        $this->Others14->TooltipValue = "";

        // Others15
        $this->Others15->LinkCustomAttributes = "";
        $this->Others15->HrefValue = "";
        $this->Others15->TooltipValue = "";

        // Others16
        $this->Others16->LinkCustomAttributes = "";
        $this->Others16->HrefValue = "";
        $this->Others16->TooltipValue = "";

        // Others17
        $this->Others17->LinkCustomAttributes = "";
        $this->Others17->HrefValue = "";
        $this->Others17->TooltipValue = "";

        // Others18
        $this->Others18->LinkCustomAttributes = "";
        $this->Others18->HrefValue = "";
        $this->Others18->TooltipValue = "";

        // Others19
        $this->Others19->LinkCustomAttributes = "";
        $this->Others19->HrefValue = "";
        $this->Others19->TooltipValue = "";

        // Others20
        $this->Others20->LinkCustomAttributes = "";
        $this->Others20->HrefValue = "";
        $this->Others20->TooltipValue = "";

        // Others21
        $this->Others21->LinkCustomAttributes = "";
        $this->Others21->HrefValue = "";
        $this->Others21->TooltipValue = "";

        // Others22
        $this->Others22->LinkCustomAttributes = "";
        $this->Others22->HrefValue = "";
        $this->Others22->TooltipValue = "";

        // Others23
        $this->Others23->LinkCustomAttributes = "";
        $this->Others23->HrefValue = "";
        $this->Others23->TooltipValue = "";

        // Others24
        $this->Others24->LinkCustomAttributes = "";
        $this->Others24->HrefValue = "";
        $this->Others24->TooltipValue = "";

        // Others25
        $this->Others25->LinkCustomAttributes = "";
        $this->Others25->HrefValue = "";
        $this->Others25->TooltipValue = "";

        // DR14
        $this->DR14->LinkCustomAttributes = "";
        $this->DR14->HrefValue = "";
        $this->DR14->TooltipValue = "";

        // DR15
        $this->DR15->LinkCustomAttributes = "";
        $this->DR15->HrefValue = "";
        $this->DR15->TooltipValue = "";

        // DR16
        $this->DR16->LinkCustomAttributes = "";
        $this->DR16->HrefValue = "";
        $this->DR16->TooltipValue = "";

        // DR17
        $this->DR17->LinkCustomAttributes = "";
        $this->DR17->HrefValue = "";
        $this->DR17->TooltipValue = "";

        // DR18
        $this->DR18->LinkCustomAttributes = "";
        $this->DR18->HrefValue = "";
        $this->DR18->TooltipValue = "";

        // DR19
        $this->DR19->LinkCustomAttributes = "";
        $this->DR19->HrefValue = "";
        $this->DR19->TooltipValue = "";

        // DR20
        $this->DR20->LinkCustomAttributes = "";
        $this->DR20->HrefValue = "";
        $this->DR20->TooltipValue = "";

        // DR21
        $this->DR21->LinkCustomAttributes = "";
        $this->DR21->HrefValue = "";
        $this->DR21->TooltipValue = "";

        // DR22
        $this->DR22->LinkCustomAttributes = "";
        $this->DR22->HrefValue = "";
        $this->DR22->TooltipValue = "";

        // DR23
        $this->DR23->LinkCustomAttributes = "";
        $this->DR23->HrefValue = "";
        $this->DR23->TooltipValue = "";

        // DR24
        $this->DR24->LinkCustomAttributes = "";
        $this->DR24->HrefValue = "";
        $this->DR24->TooltipValue = "";

        // DR25
        $this->DR25->LinkCustomAttributes = "";
        $this->DR25->HrefValue = "";
        $this->DR25->TooltipValue = "";

        // E214
        $this->E214->LinkCustomAttributes = "";
        $this->E214->HrefValue = "";
        $this->E214->TooltipValue = "";

        // E215
        $this->E215->LinkCustomAttributes = "";
        $this->E215->HrefValue = "";
        $this->E215->TooltipValue = "";

        // E216
        $this->E216->LinkCustomAttributes = "";
        $this->E216->HrefValue = "";
        $this->E216->TooltipValue = "";

        // E217
        $this->E217->LinkCustomAttributes = "";
        $this->E217->HrefValue = "";
        $this->E217->TooltipValue = "";

        // E218
        $this->E218->LinkCustomAttributes = "";
        $this->E218->HrefValue = "";
        $this->E218->TooltipValue = "";

        // E219
        $this->E219->LinkCustomAttributes = "";
        $this->E219->HrefValue = "";
        $this->E219->TooltipValue = "";

        // E220
        $this->E220->LinkCustomAttributes = "";
        $this->E220->HrefValue = "";
        $this->E220->TooltipValue = "";

        // E221
        $this->E221->LinkCustomAttributes = "";
        $this->E221->HrefValue = "";
        $this->E221->TooltipValue = "";

        // E222
        $this->E222->LinkCustomAttributes = "";
        $this->E222->HrefValue = "";
        $this->E222->TooltipValue = "";

        // E223
        $this->E223->LinkCustomAttributes = "";
        $this->E223->HrefValue = "";
        $this->E223->TooltipValue = "";

        // E224
        $this->E224->LinkCustomAttributes = "";
        $this->E224->HrefValue = "";
        $this->E224->TooltipValue = "";

        // E225
        $this->E225->LinkCustomAttributes = "";
        $this->E225->HrefValue = "";
        $this->E225->TooltipValue = "";

        // EEETTTDTE
        $this->EEETTTDTE->LinkCustomAttributes = "";
        $this->EEETTTDTE->HrefValue = "";
        $this->EEETTTDTE->TooltipValue = "";

        // bhcgdate
        $this->bhcgdate->LinkCustomAttributes = "";
        $this->bhcgdate->HrefValue = "";
        $this->bhcgdate->TooltipValue = "";

        // TUBAL_PATENCY
        $this->TUBAL_PATENCY->LinkCustomAttributes = "";
        $this->TUBAL_PATENCY->HrefValue = "";
        $this->TUBAL_PATENCY->TooltipValue = "";

        // HSG
        $this->HSG->LinkCustomAttributes = "";
        $this->HSG->HrefValue = "";
        $this->HSG->TooltipValue = "";

        // DHL
        $this->DHL->LinkCustomAttributes = "";
        $this->DHL->HrefValue = "";
        $this->DHL->TooltipValue = "";

        // UTERINE_PROBLEMS
        $this->UTERINE_PROBLEMS->LinkCustomAttributes = "";
        $this->UTERINE_PROBLEMS->HrefValue = "";
        $this->UTERINE_PROBLEMS->TooltipValue = "";

        // W_COMORBIDS
        $this->W_COMORBIDS->LinkCustomAttributes = "";
        $this->W_COMORBIDS->HrefValue = "";
        $this->W_COMORBIDS->TooltipValue = "";

        // H_COMORBIDS
        $this->H_COMORBIDS->LinkCustomAttributes = "";
        $this->H_COMORBIDS->HrefValue = "";
        $this->H_COMORBIDS->TooltipValue = "";

        // SEXUAL_DYSFUNCTION
        $this->SEXUAL_DYSFUNCTION->LinkCustomAttributes = "";
        $this->SEXUAL_DYSFUNCTION->HrefValue = "";
        $this->SEXUAL_DYSFUNCTION->TooltipValue = "";

        // TABLETS
        $this->TABLETS->LinkCustomAttributes = "";
        $this->TABLETS->HrefValue = "";
        $this->TABLETS->TooltipValue = "";

        // FOLLICLE_STATUS
        $this->FOLLICLE_STATUS->LinkCustomAttributes = "";
        $this->FOLLICLE_STATUS->HrefValue = "";
        $this->FOLLICLE_STATUS->TooltipValue = "";

        // NUMBER_OF_IUI
        $this->NUMBER_OF_IUI->LinkCustomAttributes = "";
        $this->NUMBER_OF_IUI->HrefValue = "";
        $this->NUMBER_OF_IUI->TooltipValue = "";

        // PROCEDURE
        $this->PROCEDURE->LinkCustomAttributes = "";
        $this->PROCEDURE->HrefValue = "";
        $this->PROCEDURE->TooltipValue = "";

        // LUTEAL_SUPPORT
        $this->LUTEAL_SUPPORT->LinkCustomAttributes = "";
        $this->LUTEAL_SUPPORT->HrefValue = "";
        $this->LUTEAL_SUPPORT->TooltipValue = "";

        // SPECIFIC_MATERNAL_PROBLEMS
        $this->SPECIFIC_MATERNAL_PROBLEMS->LinkCustomAttributes = "";
        $this->SPECIFIC_MATERNAL_PROBLEMS->HrefValue = "";
        $this->SPECIFIC_MATERNAL_PROBLEMS->TooltipValue = "";

        // ONGOING_PREG
        $this->ONGOING_PREG->LinkCustomAttributes = "";
        $this->ONGOING_PREG->HrefValue = "";
        $this->ONGOING_PREG->TooltipValue = "";

        // EDD_Date
        $this->EDD_Date->LinkCustomAttributes = "";
        $this->EDD_Date->HrefValue = "";
        $this->EDD_Date->TooltipValue = "";

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
        if ($this->RIDNo->getSessionValue() != "") {
            $this->RIDNo->CurrentValue = GetForeignKeyValue($this->RIDNo->getSessionValue());
            $this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
            $this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
            $this->RIDNo->ViewCustomAttributes = "";
        } else {
            $this->RIDNo->EditValue = $this->RIDNo->CurrentValue;
            $this->RIDNo->PlaceHolder = RemoveHtml($this->RIDNo->caption());
        }

        // Name
        $this->Name->EditAttrs["class"] = "form-control";
        $this->Name->EditCustomAttributes = "";
        if ($this->Name->getSessionValue() != "") {
            $this->Name->CurrentValue = GetForeignKeyValue($this->Name->getSessionValue());
            $this->Name->ViewValue = $this->Name->CurrentValue;
            $this->Name->ViewCustomAttributes = "";
        } else {
            if (!$this->Name->Raw) {
                $this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
            }
            $this->Name->EditValue = $this->Name->CurrentValue;
            $this->Name->PlaceHolder = RemoveHtml($this->Name->caption());
        }

        // ARTCycle
        $this->ARTCycle->EditAttrs["class"] = "form-control";
        $this->ARTCycle->EditCustomAttributes = "";
        $this->ARTCycle->EditValue = $this->ARTCycle->options(true);
        $this->ARTCycle->PlaceHolder = RemoveHtml($this->ARTCycle->caption());

        // FemaleFactor
        $this->FemaleFactor->EditAttrs["class"] = "form-control";
        $this->FemaleFactor->EditCustomAttributes = "";
        $this->FemaleFactor->EditValue = $this->FemaleFactor->options(true);
        $this->FemaleFactor->PlaceHolder = RemoveHtml($this->FemaleFactor->caption());

        // MaleFactor
        $this->MaleFactor->EditAttrs["class"] = "form-control";
        $this->MaleFactor->EditCustomAttributes = "";
        $this->MaleFactor->EditValue = $this->MaleFactor->options(true);
        $this->MaleFactor->PlaceHolder = RemoveHtml($this->MaleFactor->caption());

        // Protocol
        $this->Protocol->EditAttrs["class"] = "form-control";
        $this->Protocol->EditCustomAttributes = "";
        $this->Protocol->EditValue = $this->Protocol->options(true);
        $this->Protocol->PlaceHolder = RemoveHtml($this->Protocol->caption());

        // SemenFrozen
        $this->SemenFrozen->EditAttrs["class"] = "form-control";
        $this->SemenFrozen->EditCustomAttributes = "";
        $this->SemenFrozen->EditValue = $this->SemenFrozen->options(true);
        $this->SemenFrozen->PlaceHolder = RemoveHtml($this->SemenFrozen->caption());

        // A4ICSICycle
        $this->A4ICSICycle->EditAttrs["class"] = "form-control";
        $this->A4ICSICycle->EditCustomAttributes = "";
        $this->A4ICSICycle->EditValue = $this->A4ICSICycle->options(true);
        $this->A4ICSICycle->PlaceHolder = RemoveHtml($this->A4ICSICycle->caption());

        // TotalICSICycle
        $this->TotalICSICycle->EditAttrs["class"] = "form-control";
        $this->TotalICSICycle->EditCustomAttributes = "";
        $this->TotalICSICycle->EditValue = $this->TotalICSICycle->options(true);
        $this->TotalICSICycle->PlaceHolder = RemoveHtml($this->TotalICSICycle->caption());

        // TypeOfInfertility
        $this->TypeOfInfertility->EditAttrs["class"] = "form-control";
        $this->TypeOfInfertility->EditCustomAttributes = "";
        $this->TypeOfInfertility->EditValue = $this->TypeOfInfertility->options(true);
        $this->TypeOfInfertility->PlaceHolder = RemoveHtml($this->TypeOfInfertility->caption());

        // Duration
        $this->Duration->EditAttrs["class"] = "form-control";
        $this->Duration->EditCustomAttributes = "";
        if (!$this->Duration->Raw) {
            $this->Duration->CurrentValue = HtmlDecode($this->Duration->CurrentValue);
        }
        $this->Duration->EditValue = $this->Duration->CurrentValue;
        $this->Duration->PlaceHolder = RemoveHtml($this->Duration->caption());

        // LMP
        $this->LMP->EditAttrs["class"] = "form-control";
        $this->LMP->EditCustomAttributes = "";
        $this->LMP->EditValue = FormatDateTime($this->LMP->CurrentValue, 7);
        $this->LMP->PlaceHolder = RemoveHtml($this->LMP->caption());

        // RelevantHistory
        $this->RelevantHistory->EditAttrs["class"] = "form-control";
        $this->RelevantHistory->EditCustomAttributes = "";
        if (!$this->RelevantHistory->Raw) {
            $this->RelevantHistory->CurrentValue = HtmlDecode($this->RelevantHistory->CurrentValue);
        }
        $this->RelevantHistory->EditValue = $this->RelevantHistory->CurrentValue;
        $this->RelevantHistory->PlaceHolder = RemoveHtml($this->RelevantHistory->caption());

        // IUICycles
        $this->IUICycles->EditAttrs["class"] = "form-control";
        $this->IUICycles->EditCustomAttributes = "";
        if (!$this->IUICycles->Raw) {
            $this->IUICycles->CurrentValue = HtmlDecode($this->IUICycles->CurrentValue);
        }
        $this->IUICycles->EditValue = $this->IUICycles->CurrentValue;
        $this->IUICycles->PlaceHolder = RemoveHtml($this->IUICycles->caption());

        // AFC
        $this->AFC->EditAttrs["class"] = "form-control";
        $this->AFC->EditCustomAttributes = "";
        if (!$this->AFC->Raw) {
            $this->AFC->CurrentValue = HtmlDecode($this->AFC->CurrentValue);
        }
        $this->AFC->EditValue = $this->AFC->CurrentValue;
        $this->AFC->PlaceHolder = RemoveHtml($this->AFC->caption());

        // AMH
        $this->AMH->EditAttrs["class"] = "form-control";
        $this->AMH->EditCustomAttributes = "";
        if (!$this->AMH->Raw) {
            $this->AMH->CurrentValue = HtmlDecode($this->AMH->CurrentValue);
        }
        $this->AMH->EditValue = $this->AMH->CurrentValue;
        $this->AMH->PlaceHolder = RemoveHtml($this->AMH->caption());

        // FBMI
        $this->FBMI->EditAttrs["class"] = "form-control";
        $this->FBMI->EditCustomAttributes = "";
        if (!$this->FBMI->Raw) {
            $this->FBMI->CurrentValue = HtmlDecode($this->FBMI->CurrentValue);
        }
        $this->FBMI->EditValue = $this->FBMI->CurrentValue;
        $this->FBMI->PlaceHolder = RemoveHtml($this->FBMI->caption());

        // MBMI
        $this->MBMI->EditAttrs["class"] = "form-control";
        $this->MBMI->EditCustomAttributes = "";
        if (!$this->MBMI->Raw) {
            $this->MBMI->CurrentValue = HtmlDecode($this->MBMI->CurrentValue);
        }
        $this->MBMI->EditValue = $this->MBMI->CurrentValue;
        $this->MBMI->PlaceHolder = RemoveHtml($this->MBMI->caption());

        // OvarianVolumeRT
        $this->OvarianVolumeRT->EditAttrs["class"] = "form-control";
        $this->OvarianVolumeRT->EditCustomAttributes = "";
        if (!$this->OvarianVolumeRT->Raw) {
            $this->OvarianVolumeRT->CurrentValue = HtmlDecode($this->OvarianVolumeRT->CurrentValue);
        }
        $this->OvarianVolumeRT->EditValue = $this->OvarianVolumeRT->CurrentValue;
        $this->OvarianVolumeRT->PlaceHolder = RemoveHtml($this->OvarianVolumeRT->caption());

        // OvarianVolumeLT
        $this->OvarianVolumeLT->EditAttrs["class"] = "form-control";
        $this->OvarianVolumeLT->EditCustomAttributes = "";
        if (!$this->OvarianVolumeLT->Raw) {
            $this->OvarianVolumeLT->CurrentValue = HtmlDecode($this->OvarianVolumeLT->CurrentValue);
        }
        $this->OvarianVolumeLT->EditValue = $this->OvarianVolumeLT->CurrentValue;
        $this->OvarianVolumeLT->PlaceHolder = RemoveHtml($this->OvarianVolumeLT->caption());

        // DAYSOFSTIMULATION
        $this->DAYSOFSTIMULATION->EditAttrs["class"] = "form-control";
        $this->DAYSOFSTIMULATION->EditCustomAttributes = "";
        if (!$this->DAYSOFSTIMULATION->Raw) {
            $this->DAYSOFSTIMULATION->CurrentValue = HtmlDecode($this->DAYSOFSTIMULATION->CurrentValue);
        }
        $this->DAYSOFSTIMULATION->EditValue = $this->DAYSOFSTIMULATION->CurrentValue;
        $this->DAYSOFSTIMULATION->PlaceHolder = RemoveHtml($this->DAYSOFSTIMULATION->caption());

        // DOSEOFGONADOTROPINS
        $this->DOSEOFGONADOTROPINS->EditAttrs["class"] = "form-control";
        $this->DOSEOFGONADOTROPINS->EditCustomAttributes = "";
        if (!$this->DOSEOFGONADOTROPINS->Raw) {
            $this->DOSEOFGONADOTROPINS->CurrentValue = HtmlDecode($this->DOSEOFGONADOTROPINS->CurrentValue);
        }
        $this->DOSEOFGONADOTROPINS->EditValue = $this->DOSEOFGONADOTROPINS->CurrentValue;
        $this->DOSEOFGONADOTROPINS->PlaceHolder = RemoveHtml($this->DOSEOFGONADOTROPINS->caption());

        // INJTYPE
        $this->INJTYPE->EditAttrs["class"] = "form-control";
        $this->INJTYPE->EditCustomAttributes = "";
        $this->INJTYPE->PlaceHolder = RemoveHtml($this->INJTYPE->caption());

        // ANTAGONISTDAYS
        $this->ANTAGONISTDAYS->EditAttrs["class"] = "form-control";
        $this->ANTAGONISTDAYS->EditCustomAttributes = "";
        if (!$this->ANTAGONISTDAYS->Raw) {
            $this->ANTAGONISTDAYS->CurrentValue = HtmlDecode($this->ANTAGONISTDAYS->CurrentValue);
        }
        $this->ANTAGONISTDAYS->EditValue = $this->ANTAGONISTDAYS->CurrentValue;
        $this->ANTAGONISTDAYS->PlaceHolder = RemoveHtml($this->ANTAGONISTDAYS->caption());

        // ANTAGONISTSTARTDAY
        $this->ANTAGONISTSTARTDAY->EditAttrs["class"] = "form-control";
        $this->ANTAGONISTSTARTDAY->EditCustomAttributes = "";
        $this->ANTAGONISTSTARTDAY->EditValue = $this->ANTAGONISTSTARTDAY->options(true);
        $this->ANTAGONISTSTARTDAY->PlaceHolder = RemoveHtml($this->ANTAGONISTSTARTDAY->caption());

        // GROWTHHORMONE
        $this->GROWTHHORMONE->EditAttrs["class"] = "form-control";
        $this->GROWTHHORMONE->EditCustomAttributes = "";
        if (!$this->GROWTHHORMONE->Raw) {
            $this->GROWTHHORMONE->CurrentValue = HtmlDecode($this->GROWTHHORMONE->CurrentValue);
        }
        $this->GROWTHHORMONE->EditValue = $this->GROWTHHORMONE->CurrentValue;
        $this->GROWTHHORMONE->PlaceHolder = RemoveHtml($this->GROWTHHORMONE->caption());

        // PRETREATMENT
        $this->PRETREATMENT->EditAttrs["class"] = "form-control";
        $this->PRETREATMENT->EditCustomAttributes = "";
        $this->PRETREATMENT->EditValue = $this->PRETREATMENT->options(true);
        $this->PRETREATMENT->PlaceHolder = RemoveHtml($this->PRETREATMENT->caption());

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

        // MedicalFactors
        $this->MedicalFactors->EditAttrs["class"] = "form-control";
        $this->MedicalFactors->EditCustomAttributes = "";
        $this->MedicalFactors->EditValue = $this->MedicalFactors->options(true);
        $this->MedicalFactors->PlaceHolder = RemoveHtml($this->MedicalFactors->caption());

        // SCDate
        $this->SCDate->EditAttrs["class"] = "form-control";
        $this->SCDate->EditCustomAttributes = "";
        $this->SCDate->EditValue = FormatDateTime($this->SCDate->CurrentValue, 7);
        $this->SCDate->PlaceHolder = RemoveHtml($this->SCDate->caption());

        // OvarianSurgery
        $this->OvarianSurgery->EditAttrs["class"] = "form-control";
        $this->OvarianSurgery->EditCustomAttributes = "";
        if (!$this->OvarianSurgery->Raw) {
            $this->OvarianSurgery->CurrentValue = HtmlDecode($this->OvarianSurgery->CurrentValue);
        }
        $this->OvarianSurgery->EditValue = $this->OvarianSurgery->CurrentValue;
        $this->OvarianSurgery->PlaceHolder = RemoveHtml($this->OvarianSurgery->caption());

        // PreProcedureOrder
        $this->PreProcedureOrder->EditAttrs["class"] = "form-control";
        $this->PreProcedureOrder->EditCustomAttributes = "";
        if (!$this->PreProcedureOrder->Raw) {
            $this->PreProcedureOrder->CurrentValue = HtmlDecode($this->PreProcedureOrder->CurrentValue);
        }
        $this->PreProcedureOrder->EditValue = $this->PreProcedureOrder->CurrentValue;
        $this->PreProcedureOrder->PlaceHolder = RemoveHtml($this->PreProcedureOrder->caption());

        // TRIGGERR
        $this->TRIGGERR->EditAttrs["class"] = "form-control";
        $this->TRIGGERR->EditCustomAttributes = "";
        $this->TRIGGERR->PlaceHolder = RemoveHtml($this->TRIGGERR->caption());

        // TRIGGERDATE
        $this->TRIGGERDATE->EditAttrs["class"] = "form-control";
        $this->TRIGGERDATE->EditCustomAttributes = "";
        $this->TRIGGERDATE->EditValue = FormatDateTime($this->TRIGGERDATE->CurrentValue, 11);
        $this->TRIGGERDATE->PlaceHolder = RemoveHtml($this->TRIGGERDATE->caption());

        // ATHOMEorCLINIC
        $this->ATHOMEorCLINIC->EditCustomAttributes = "";
        $this->ATHOMEorCLINIC->EditValue = $this->ATHOMEorCLINIC->options(false);
        $this->ATHOMEorCLINIC->PlaceHolder = RemoveHtml($this->ATHOMEorCLINIC->caption());

        // OPUDATE
        $this->OPUDATE->EditAttrs["class"] = "form-control";
        $this->OPUDATE->EditCustomAttributes = "";
        $this->OPUDATE->EditValue = FormatDateTime($this->OPUDATE->CurrentValue, 11);
        $this->OPUDATE->PlaceHolder = RemoveHtml($this->OPUDATE->caption());

        // ALLFREEZEINDICATION
        $this->ALLFREEZEINDICATION->EditAttrs["class"] = "form-control";
        $this->ALLFREEZEINDICATION->EditCustomAttributes = "";
        $this->ALLFREEZEINDICATION->EditValue = $this->ALLFREEZEINDICATION->options(true);
        $this->ALLFREEZEINDICATION->PlaceHolder = RemoveHtml($this->ALLFREEZEINDICATION->caption());

        // ERA
        $this->ERA->EditAttrs["class"] = "form-control";
        $this->ERA->EditCustomAttributes = "";
        $this->ERA->EditValue = $this->ERA->options(true);
        $this->ERA->PlaceHolder = RemoveHtml($this->ERA->caption());

        // PGTA
        $this->PGTA->EditAttrs["class"] = "form-control";
        $this->PGTA->EditCustomAttributes = "";
        if (!$this->PGTA->Raw) {
            $this->PGTA->CurrentValue = HtmlDecode($this->PGTA->CurrentValue);
        }
        $this->PGTA->EditValue = $this->PGTA->CurrentValue;
        $this->PGTA->PlaceHolder = RemoveHtml($this->PGTA->caption());

        // PGD
        $this->PGD->EditAttrs["class"] = "form-control";
        $this->PGD->EditCustomAttributes = "";
        if (!$this->PGD->Raw) {
            $this->PGD->CurrentValue = HtmlDecode($this->PGD->CurrentValue);
        }
        $this->PGD->EditValue = $this->PGD->CurrentValue;
        $this->PGD->PlaceHolder = RemoveHtml($this->PGD->caption());

        // DATEOFET
        $this->DATEOFET->EditAttrs["class"] = "form-control";
        $this->DATEOFET->EditCustomAttributes = "";
        $this->DATEOFET->EditValue = FormatDateTime($this->DATEOFET->CurrentValue, 11);
        $this->DATEOFET->PlaceHolder = RemoveHtml($this->DATEOFET->caption());

        // ET
        $this->ET->EditAttrs["class"] = "form-control";
        $this->ET->EditCustomAttributes = "";
        $this->ET->EditValue = $this->ET->options(true);
        $this->ET->PlaceHolder = RemoveHtml($this->ET->caption());

        // ESET
        $this->ESET->EditAttrs["class"] = "form-control";
        $this->ESET->EditCustomAttributes = "";
        if (!$this->ESET->Raw) {
            $this->ESET->CurrentValue = HtmlDecode($this->ESET->CurrentValue);
        }
        $this->ESET->EditValue = $this->ESET->CurrentValue;
        $this->ESET->PlaceHolder = RemoveHtml($this->ESET->caption());

        // DOET
        $this->DOET->EditAttrs["class"] = "form-control";
        $this->DOET->EditCustomAttributes = "";
        if (!$this->DOET->Raw) {
            $this->DOET->CurrentValue = HtmlDecode($this->DOET->CurrentValue);
        }
        $this->DOET->EditValue = $this->DOET->CurrentValue;
        $this->DOET->PlaceHolder = RemoveHtml($this->DOET->caption());

        // SEMENPREPARATION
        $this->SEMENPREPARATION->EditAttrs["class"] = "form-control";
        $this->SEMENPREPARATION->EditCustomAttributes = "";
        $this->SEMENPREPARATION->EditValue = $this->SEMENPREPARATION->options(true);
        $this->SEMENPREPARATION->PlaceHolder = RemoveHtml($this->SEMENPREPARATION->caption());

        // REASONFORESET
        $this->REASONFORESET->EditAttrs["class"] = "form-control";
        $this->REASONFORESET->EditCustomAttributes = "";
        $this->REASONFORESET->EditValue = $this->REASONFORESET->options(true);
        $this->REASONFORESET->PlaceHolder = RemoveHtml($this->REASONFORESET->caption());

        // Expectedoocytes
        $this->Expectedoocytes->EditAttrs["class"] = "form-control";
        $this->Expectedoocytes->EditCustomAttributes = "";
        if (!$this->Expectedoocytes->Raw) {
            $this->Expectedoocytes->CurrentValue = HtmlDecode($this->Expectedoocytes->CurrentValue);
        }
        $this->Expectedoocytes->EditValue = $this->Expectedoocytes->CurrentValue;
        $this->Expectedoocytes->PlaceHolder = RemoveHtml($this->Expectedoocytes->caption());

        // StChDate1
        $this->StChDate1->EditAttrs["class"] = "form-control";
        $this->StChDate1->EditCustomAttributes = "";
        $this->StChDate1->EditValue = FormatDateTime($this->StChDate1->CurrentValue, 7);
        $this->StChDate1->PlaceHolder = RemoveHtml($this->StChDate1->caption());

        // StChDate2
        $this->StChDate2->EditAttrs["class"] = "form-control";
        $this->StChDate2->EditCustomAttributes = "";
        $this->StChDate2->EditValue = FormatDateTime($this->StChDate2->CurrentValue, 7);
        $this->StChDate2->PlaceHolder = RemoveHtml($this->StChDate2->caption());

        // StChDate3
        $this->StChDate3->EditAttrs["class"] = "form-control";
        $this->StChDate3->EditCustomAttributes = "";
        $this->StChDate3->EditValue = FormatDateTime($this->StChDate3->CurrentValue, 7);
        $this->StChDate3->PlaceHolder = RemoveHtml($this->StChDate3->caption());

        // StChDate4
        $this->StChDate4->EditAttrs["class"] = "form-control";
        $this->StChDate4->EditCustomAttributes = "";
        $this->StChDate4->EditValue = FormatDateTime($this->StChDate4->CurrentValue, 7);
        $this->StChDate4->PlaceHolder = RemoveHtml($this->StChDate4->caption());

        // StChDate5
        $this->StChDate5->EditAttrs["class"] = "form-control";
        $this->StChDate5->EditCustomAttributes = "";
        $this->StChDate5->EditValue = FormatDateTime($this->StChDate5->CurrentValue, 7);
        $this->StChDate5->PlaceHolder = RemoveHtml($this->StChDate5->caption());

        // StChDate6
        $this->StChDate6->EditAttrs["class"] = "form-control";
        $this->StChDate6->EditCustomAttributes = "";
        $this->StChDate6->EditValue = FormatDateTime($this->StChDate6->CurrentValue, 7);
        $this->StChDate6->PlaceHolder = RemoveHtml($this->StChDate6->caption());

        // StChDate7
        $this->StChDate7->EditAttrs["class"] = "form-control";
        $this->StChDate7->EditCustomAttributes = "";
        $this->StChDate7->EditValue = FormatDateTime($this->StChDate7->CurrentValue, 7);
        $this->StChDate7->PlaceHolder = RemoveHtml($this->StChDate7->caption());

        // StChDate8
        $this->StChDate8->EditAttrs["class"] = "form-control";
        $this->StChDate8->EditCustomAttributes = "";
        $this->StChDate8->EditValue = FormatDateTime($this->StChDate8->CurrentValue, 7);
        $this->StChDate8->PlaceHolder = RemoveHtml($this->StChDate8->caption());

        // StChDate9
        $this->StChDate9->EditAttrs["class"] = "form-control";
        $this->StChDate9->EditCustomAttributes = "";
        $this->StChDate9->EditValue = FormatDateTime($this->StChDate9->CurrentValue, 7);
        $this->StChDate9->PlaceHolder = RemoveHtml($this->StChDate9->caption());

        // StChDate10
        $this->StChDate10->EditAttrs["class"] = "form-control";
        $this->StChDate10->EditCustomAttributes = "";
        $this->StChDate10->EditValue = FormatDateTime($this->StChDate10->CurrentValue, 7);
        $this->StChDate10->PlaceHolder = RemoveHtml($this->StChDate10->caption());

        // StChDate11
        $this->StChDate11->EditAttrs["class"] = "form-control";
        $this->StChDate11->EditCustomAttributes = "";
        $this->StChDate11->EditValue = FormatDateTime($this->StChDate11->CurrentValue, 7);
        $this->StChDate11->PlaceHolder = RemoveHtml($this->StChDate11->caption());

        // StChDate12
        $this->StChDate12->EditAttrs["class"] = "form-control";
        $this->StChDate12->EditCustomAttributes = "";
        $this->StChDate12->EditValue = FormatDateTime($this->StChDate12->CurrentValue, 7);
        $this->StChDate12->PlaceHolder = RemoveHtml($this->StChDate12->caption());

        // StChDate13
        $this->StChDate13->EditAttrs["class"] = "form-control";
        $this->StChDate13->EditCustomAttributes = "";
        $this->StChDate13->EditValue = FormatDateTime($this->StChDate13->CurrentValue, 7);
        $this->StChDate13->PlaceHolder = RemoveHtml($this->StChDate13->caption());

        // CycleDay1
        $this->CycleDay1->EditAttrs["class"] = "form-control";
        $this->CycleDay1->EditCustomAttributes = "";
        if (!$this->CycleDay1->Raw) {
            $this->CycleDay1->CurrentValue = HtmlDecode($this->CycleDay1->CurrentValue);
        }
        $this->CycleDay1->EditValue = $this->CycleDay1->CurrentValue;
        $this->CycleDay1->PlaceHolder = RemoveHtml($this->CycleDay1->caption());

        // CycleDay2
        $this->CycleDay2->EditAttrs["class"] = "form-control";
        $this->CycleDay2->EditCustomAttributes = "";
        if (!$this->CycleDay2->Raw) {
            $this->CycleDay2->CurrentValue = HtmlDecode($this->CycleDay2->CurrentValue);
        }
        $this->CycleDay2->EditValue = $this->CycleDay2->CurrentValue;
        $this->CycleDay2->PlaceHolder = RemoveHtml($this->CycleDay2->caption());

        // CycleDay3
        $this->CycleDay3->EditAttrs["class"] = "form-control";
        $this->CycleDay3->EditCustomAttributes = "";
        if (!$this->CycleDay3->Raw) {
            $this->CycleDay3->CurrentValue = HtmlDecode($this->CycleDay3->CurrentValue);
        }
        $this->CycleDay3->EditValue = $this->CycleDay3->CurrentValue;
        $this->CycleDay3->PlaceHolder = RemoveHtml($this->CycleDay3->caption());

        // CycleDay4
        $this->CycleDay4->EditAttrs["class"] = "form-control";
        $this->CycleDay4->EditCustomAttributes = "";
        if (!$this->CycleDay4->Raw) {
            $this->CycleDay4->CurrentValue = HtmlDecode($this->CycleDay4->CurrentValue);
        }
        $this->CycleDay4->EditValue = $this->CycleDay4->CurrentValue;
        $this->CycleDay4->PlaceHolder = RemoveHtml($this->CycleDay4->caption());

        // CycleDay5
        $this->CycleDay5->EditAttrs["class"] = "form-control";
        $this->CycleDay5->EditCustomAttributes = "";
        if (!$this->CycleDay5->Raw) {
            $this->CycleDay5->CurrentValue = HtmlDecode($this->CycleDay5->CurrentValue);
        }
        $this->CycleDay5->EditValue = $this->CycleDay5->CurrentValue;
        $this->CycleDay5->PlaceHolder = RemoveHtml($this->CycleDay5->caption());

        // CycleDay6
        $this->CycleDay6->EditAttrs["class"] = "form-control";
        $this->CycleDay6->EditCustomAttributes = "";
        if (!$this->CycleDay6->Raw) {
            $this->CycleDay6->CurrentValue = HtmlDecode($this->CycleDay6->CurrentValue);
        }
        $this->CycleDay6->EditValue = $this->CycleDay6->CurrentValue;
        $this->CycleDay6->PlaceHolder = RemoveHtml($this->CycleDay6->caption());

        // CycleDay7
        $this->CycleDay7->EditAttrs["class"] = "form-control";
        $this->CycleDay7->EditCustomAttributes = "";
        if (!$this->CycleDay7->Raw) {
            $this->CycleDay7->CurrentValue = HtmlDecode($this->CycleDay7->CurrentValue);
        }
        $this->CycleDay7->EditValue = $this->CycleDay7->CurrentValue;
        $this->CycleDay7->PlaceHolder = RemoveHtml($this->CycleDay7->caption());

        // CycleDay8
        $this->CycleDay8->EditAttrs["class"] = "form-control";
        $this->CycleDay8->EditCustomAttributes = "";
        if (!$this->CycleDay8->Raw) {
            $this->CycleDay8->CurrentValue = HtmlDecode($this->CycleDay8->CurrentValue);
        }
        $this->CycleDay8->EditValue = $this->CycleDay8->CurrentValue;
        $this->CycleDay8->PlaceHolder = RemoveHtml($this->CycleDay8->caption());

        // CycleDay9
        $this->CycleDay9->EditAttrs["class"] = "form-control";
        $this->CycleDay9->EditCustomAttributes = "";
        if (!$this->CycleDay9->Raw) {
            $this->CycleDay9->CurrentValue = HtmlDecode($this->CycleDay9->CurrentValue);
        }
        $this->CycleDay9->EditValue = $this->CycleDay9->CurrentValue;
        $this->CycleDay9->PlaceHolder = RemoveHtml($this->CycleDay9->caption());

        // CycleDay10
        $this->CycleDay10->EditAttrs["class"] = "form-control";
        $this->CycleDay10->EditCustomAttributes = "";
        if (!$this->CycleDay10->Raw) {
            $this->CycleDay10->CurrentValue = HtmlDecode($this->CycleDay10->CurrentValue);
        }
        $this->CycleDay10->EditValue = $this->CycleDay10->CurrentValue;
        $this->CycleDay10->PlaceHolder = RemoveHtml($this->CycleDay10->caption());

        // CycleDay11
        $this->CycleDay11->EditAttrs["class"] = "form-control";
        $this->CycleDay11->EditCustomAttributes = "";
        if (!$this->CycleDay11->Raw) {
            $this->CycleDay11->CurrentValue = HtmlDecode($this->CycleDay11->CurrentValue);
        }
        $this->CycleDay11->EditValue = $this->CycleDay11->CurrentValue;
        $this->CycleDay11->PlaceHolder = RemoveHtml($this->CycleDay11->caption());

        // CycleDay12
        $this->CycleDay12->EditAttrs["class"] = "form-control";
        $this->CycleDay12->EditCustomAttributes = "";
        if (!$this->CycleDay12->Raw) {
            $this->CycleDay12->CurrentValue = HtmlDecode($this->CycleDay12->CurrentValue);
        }
        $this->CycleDay12->EditValue = $this->CycleDay12->CurrentValue;
        $this->CycleDay12->PlaceHolder = RemoveHtml($this->CycleDay12->caption());

        // CycleDay13
        $this->CycleDay13->EditAttrs["class"] = "form-control";
        $this->CycleDay13->EditCustomAttributes = "";
        if (!$this->CycleDay13->Raw) {
            $this->CycleDay13->CurrentValue = HtmlDecode($this->CycleDay13->CurrentValue);
        }
        $this->CycleDay13->EditValue = $this->CycleDay13->CurrentValue;
        $this->CycleDay13->PlaceHolder = RemoveHtml($this->CycleDay13->caption());

        // StimulationDay1
        $this->StimulationDay1->EditAttrs["class"] = "form-control";
        $this->StimulationDay1->EditCustomAttributes = "";
        if (!$this->StimulationDay1->Raw) {
            $this->StimulationDay1->CurrentValue = HtmlDecode($this->StimulationDay1->CurrentValue);
        }
        $this->StimulationDay1->EditValue = $this->StimulationDay1->CurrentValue;
        $this->StimulationDay1->PlaceHolder = RemoveHtml($this->StimulationDay1->caption());

        // StimulationDay2
        $this->StimulationDay2->EditAttrs["class"] = "form-control";
        $this->StimulationDay2->EditCustomAttributes = "";
        if (!$this->StimulationDay2->Raw) {
            $this->StimulationDay2->CurrentValue = HtmlDecode($this->StimulationDay2->CurrentValue);
        }
        $this->StimulationDay2->EditValue = $this->StimulationDay2->CurrentValue;
        $this->StimulationDay2->PlaceHolder = RemoveHtml($this->StimulationDay2->caption());

        // StimulationDay3
        $this->StimulationDay3->EditAttrs["class"] = "form-control";
        $this->StimulationDay3->EditCustomAttributes = "";
        if (!$this->StimulationDay3->Raw) {
            $this->StimulationDay3->CurrentValue = HtmlDecode($this->StimulationDay3->CurrentValue);
        }
        $this->StimulationDay3->EditValue = $this->StimulationDay3->CurrentValue;
        $this->StimulationDay3->PlaceHolder = RemoveHtml($this->StimulationDay3->caption());

        // StimulationDay4
        $this->StimulationDay4->EditAttrs["class"] = "form-control";
        $this->StimulationDay4->EditCustomAttributes = "";
        if (!$this->StimulationDay4->Raw) {
            $this->StimulationDay4->CurrentValue = HtmlDecode($this->StimulationDay4->CurrentValue);
        }
        $this->StimulationDay4->EditValue = $this->StimulationDay4->CurrentValue;
        $this->StimulationDay4->PlaceHolder = RemoveHtml($this->StimulationDay4->caption());

        // StimulationDay5
        $this->StimulationDay5->EditAttrs["class"] = "form-control";
        $this->StimulationDay5->EditCustomAttributes = "";
        if (!$this->StimulationDay5->Raw) {
            $this->StimulationDay5->CurrentValue = HtmlDecode($this->StimulationDay5->CurrentValue);
        }
        $this->StimulationDay5->EditValue = $this->StimulationDay5->CurrentValue;
        $this->StimulationDay5->PlaceHolder = RemoveHtml($this->StimulationDay5->caption());

        // StimulationDay6
        $this->StimulationDay6->EditAttrs["class"] = "form-control";
        $this->StimulationDay6->EditCustomAttributes = "";
        if (!$this->StimulationDay6->Raw) {
            $this->StimulationDay6->CurrentValue = HtmlDecode($this->StimulationDay6->CurrentValue);
        }
        $this->StimulationDay6->EditValue = $this->StimulationDay6->CurrentValue;
        $this->StimulationDay6->PlaceHolder = RemoveHtml($this->StimulationDay6->caption());

        // StimulationDay7
        $this->StimulationDay7->EditAttrs["class"] = "form-control";
        $this->StimulationDay7->EditCustomAttributes = "";
        if (!$this->StimulationDay7->Raw) {
            $this->StimulationDay7->CurrentValue = HtmlDecode($this->StimulationDay7->CurrentValue);
        }
        $this->StimulationDay7->EditValue = $this->StimulationDay7->CurrentValue;
        $this->StimulationDay7->PlaceHolder = RemoveHtml($this->StimulationDay7->caption());

        // StimulationDay8
        $this->StimulationDay8->EditAttrs["class"] = "form-control";
        $this->StimulationDay8->EditCustomAttributes = "";
        if (!$this->StimulationDay8->Raw) {
            $this->StimulationDay8->CurrentValue = HtmlDecode($this->StimulationDay8->CurrentValue);
        }
        $this->StimulationDay8->EditValue = $this->StimulationDay8->CurrentValue;
        $this->StimulationDay8->PlaceHolder = RemoveHtml($this->StimulationDay8->caption());

        // StimulationDay9
        $this->StimulationDay9->EditAttrs["class"] = "form-control";
        $this->StimulationDay9->EditCustomAttributes = "";
        if (!$this->StimulationDay9->Raw) {
            $this->StimulationDay9->CurrentValue = HtmlDecode($this->StimulationDay9->CurrentValue);
        }
        $this->StimulationDay9->EditValue = $this->StimulationDay9->CurrentValue;
        $this->StimulationDay9->PlaceHolder = RemoveHtml($this->StimulationDay9->caption());

        // StimulationDay10
        $this->StimulationDay10->EditAttrs["class"] = "form-control";
        $this->StimulationDay10->EditCustomAttributes = "";
        if (!$this->StimulationDay10->Raw) {
            $this->StimulationDay10->CurrentValue = HtmlDecode($this->StimulationDay10->CurrentValue);
        }
        $this->StimulationDay10->EditValue = $this->StimulationDay10->CurrentValue;
        $this->StimulationDay10->PlaceHolder = RemoveHtml($this->StimulationDay10->caption());

        // StimulationDay11
        $this->StimulationDay11->EditAttrs["class"] = "form-control";
        $this->StimulationDay11->EditCustomAttributes = "";
        if (!$this->StimulationDay11->Raw) {
            $this->StimulationDay11->CurrentValue = HtmlDecode($this->StimulationDay11->CurrentValue);
        }
        $this->StimulationDay11->EditValue = $this->StimulationDay11->CurrentValue;
        $this->StimulationDay11->PlaceHolder = RemoveHtml($this->StimulationDay11->caption());

        // StimulationDay12
        $this->StimulationDay12->EditAttrs["class"] = "form-control";
        $this->StimulationDay12->EditCustomAttributes = "";
        if (!$this->StimulationDay12->Raw) {
            $this->StimulationDay12->CurrentValue = HtmlDecode($this->StimulationDay12->CurrentValue);
        }
        $this->StimulationDay12->EditValue = $this->StimulationDay12->CurrentValue;
        $this->StimulationDay12->PlaceHolder = RemoveHtml($this->StimulationDay12->caption());

        // StimulationDay13
        $this->StimulationDay13->EditAttrs["class"] = "form-control";
        $this->StimulationDay13->EditCustomAttributes = "";
        if (!$this->StimulationDay13->Raw) {
            $this->StimulationDay13->CurrentValue = HtmlDecode($this->StimulationDay13->CurrentValue);
        }
        $this->StimulationDay13->EditValue = $this->StimulationDay13->CurrentValue;
        $this->StimulationDay13->PlaceHolder = RemoveHtml($this->StimulationDay13->caption());

        // Tablet1
        $this->Tablet1->EditAttrs["class"] = "form-control";
        $this->Tablet1->EditCustomAttributes = "";
        $this->Tablet1->PlaceHolder = RemoveHtml($this->Tablet1->caption());

        // Tablet2
        $this->Tablet2->EditAttrs["class"] = "form-control";
        $this->Tablet2->EditCustomAttributes = "";
        $this->Tablet2->PlaceHolder = RemoveHtml($this->Tablet2->caption());

        // Tablet3
        $this->Tablet3->EditAttrs["class"] = "form-control";
        $this->Tablet3->EditCustomAttributes = "";
        $this->Tablet3->PlaceHolder = RemoveHtml($this->Tablet3->caption());

        // Tablet4
        $this->Tablet4->EditAttrs["class"] = "form-control";
        $this->Tablet4->EditCustomAttributes = "";
        $this->Tablet4->PlaceHolder = RemoveHtml($this->Tablet4->caption());

        // Tablet5
        $this->Tablet5->EditAttrs["class"] = "form-control";
        $this->Tablet5->EditCustomAttributes = "";
        $this->Tablet5->PlaceHolder = RemoveHtml($this->Tablet5->caption());

        // Tablet6
        $this->Tablet6->EditAttrs["class"] = "form-control";
        $this->Tablet6->EditCustomAttributes = "";
        $this->Tablet6->PlaceHolder = RemoveHtml($this->Tablet6->caption());

        // Tablet7
        $this->Tablet7->EditAttrs["class"] = "form-control";
        $this->Tablet7->EditCustomAttributes = "";
        $this->Tablet7->PlaceHolder = RemoveHtml($this->Tablet7->caption());

        // Tablet8
        $this->Tablet8->EditAttrs["class"] = "form-control";
        $this->Tablet8->EditCustomAttributes = "";
        $this->Tablet8->PlaceHolder = RemoveHtml($this->Tablet8->caption());

        // Tablet9
        $this->Tablet9->EditAttrs["class"] = "form-control";
        $this->Tablet9->EditCustomAttributes = "";
        $this->Tablet9->PlaceHolder = RemoveHtml($this->Tablet9->caption());

        // Tablet10
        $this->Tablet10->EditAttrs["class"] = "form-control";
        $this->Tablet10->EditCustomAttributes = "";
        $this->Tablet10->PlaceHolder = RemoveHtml($this->Tablet10->caption());

        // Tablet11
        $this->Tablet11->EditAttrs["class"] = "form-control";
        $this->Tablet11->EditCustomAttributes = "";
        $this->Tablet11->PlaceHolder = RemoveHtml($this->Tablet11->caption());

        // Tablet12
        $this->Tablet12->EditAttrs["class"] = "form-control";
        $this->Tablet12->EditCustomAttributes = "";
        $this->Tablet12->PlaceHolder = RemoveHtml($this->Tablet12->caption());

        // Tablet13
        $this->Tablet13->EditAttrs["class"] = "form-control";
        $this->Tablet13->EditCustomAttributes = "";
        $this->Tablet13->PlaceHolder = RemoveHtml($this->Tablet13->caption());

        // RFSH1
        $this->RFSH1->EditAttrs["class"] = "form-control";
        $this->RFSH1->EditCustomAttributes = "";
        $this->RFSH1->PlaceHolder = RemoveHtml($this->RFSH1->caption());

        // RFSH2
        $this->RFSH2->EditAttrs["class"] = "form-control";
        $this->RFSH2->EditCustomAttributes = "";
        $this->RFSH2->PlaceHolder = RemoveHtml($this->RFSH2->caption());

        // RFSH3
        $this->RFSH3->EditAttrs["class"] = "form-control";
        $this->RFSH3->EditCustomAttributes = "";
        $this->RFSH3->PlaceHolder = RemoveHtml($this->RFSH3->caption());

        // RFSH4
        $this->RFSH4->EditAttrs["class"] = "form-control";
        $this->RFSH4->EditCustomAttributes = "";
        $this->RFSH4->PlaceHolder = RemoveHtml($this->RFSH4->caption());

        // RFSH5
        $this->RFSH5->EditAttrs["class"] = "form-control";
        $this->RFSH5->EditCustomAttributes = "";
        $this->RFSH5->PlaceHolder = RemoveHtml($this->RFSH5->caption());

        // RFSH6
        $this->RFSH6->EditAttrs["class"] = "form-control";
        $this->RFSH6->EditCustomAttributes = "";
        $this->RFSH6->PlaceHolder = RemoveHtml($this->RFSH6->caption());

        // RFSH7
        $this->RFSH7->EditAttrs["class"] = "form-control";
        $this->RFSH7->EditCustomAttributes = "";
        $this->RFSH7->PlaceHolder = RemoveHtml($this->RFSH7->caption());

        // RFSH8
        $this->RFSH8->EditAttrs["class"] = "form-control";
        $this->RFSH8->EditCustomAttributes = "";
        $this->RFSH8->PlaceHolder = RemoveHtml($this->RFSH8->caption());

        // RFSH9
        $this->RFSH9->EditAttrs["class"] = "form-control";
        $this->RFSH9->EditCustomAttributes = "";
        $this->RFSH9->PlaceHolder = RemoveHtml($this->RFSH9->caption());

        // RFSH10
        $this->RFSH10->EditAttrs["class"] = "form-control";
        $this->RFSH10->EditCustomAttributes = "";
        $this->RFSH10->PlaceHolder = RemoveHtml($this->RFSH10->caption());

        // RFSH11
        $this->RFSH11->EditAttrs["class"] = "form-control";
        $this->RFSH11->EditCustomAttributes = "";
        $this->RFSH11->PlaceHolder = RemoveHtml($this->RFSH11->caption());

        // RFSH12
        $this->RFSH12->EditAttrs["class"] = "form-control";
        $this->RFSH12->EditCustomAttributes = "";
        $this->RFSH12->PlaceHolder = RemoveHtml($this->RFSH12->caption());

        // RFSH13
        $this->RFSH13->EditAttrs["class"] = "form-control";
        $this->RFSH13->EditCustomAttributes = "";
        $this->RFSH13->PlaceHolder = RemoveHtml($this->RFSH13->caption());

        // HMG1
        $this->HMG1->EditAttrs["class"] = "form-control";
        $this->HMG1->EditCustomAttributes = "";
        $this->HMG1->PlaceHolder = RemoveHtml($this->HMG1->caption());

        // HMG2
        $this->HMG2->EditAttrs["class"] = "form-control";
        $this->HMG2->EditCustomAttributes = "";
        $this->HMG2->PlaceHolder = RemoveHtml($this->HMG2->caption());

        // HMG3
        $this->HMG3->EditAttrs["class"] = "form-control";
        $this->HMG3->EditCustomAttributes = "";
        $this->HMG3->PlaceHolder = RemoveHtml($this->HMG3->caption());

        // HMG4
        $this->HMG4->EditAttrs["class"] = "form-control";
        $this->HMG4->EditCustomAttributes = "";
        $this->HMG4->PlaceHolder = RemoveHtml($this->HMG4->caption());

        // HMG5
        $this->HMG5->EditAttrs["class"] = "form-control";
        $this->HMG5->EditCustomAttributes = "";
        $this->HMG5->PlaceHolder = RemoveHtml($this->HMG5->caption());

        // HMG6
        $this->HMG6->EditAttrs["class"] = "form-control";
        $this->HMG6->EditCustomAttributes = "";
        $this->HMG6->PlaceHolder = RemoveHtml($this->HMG6->caption());

        // HMG7
        $this->HMG7->EditAttrs["class"] = "form-control";
        $this->HMG7->EditCustomAttributes = "";
        $this->HMG7->PlaceHolder = RemoveHtml($this->HMG7->caption());

        // HMG8
        $this->HMG8->EditAttrs["class"] = "form-control";
        $this->HMG8->EditCustomAttributes = "";
        $this->HMG8->PlaceHolder = RemoveHtml($this->HMG8->caption());

        // HMG9
        $this->HMG9->EditAttrs["class"] = "form-control";
        $this->HMG9->EditCustomAttributes = "";
        $this->HMG9->PlaceHolder = RemoveHtml($this->HMG9->caption());

        // HMG10
        $this->HMG10->EditAttrs["class"] = "form-control";
        $this->HMG10->EditCustomAttributes = "";
        $this->HMG10->PlaceHolder = RemoveHtml($this->HMG10->caption());

        // HMG11
        $this->HMG11->EditAttrs["class"] = "form-control";
        $this->HMG11->EditCustomAttributes = "";
        $this->HMG11->PlaceHolder = RemoveHtml($this->HMG11->caption());

        // HMG12
        $this->HMG12->EditAttrs["class"] = "form-control";
        $this->HMG12->EditCustomAttributes = "";
        $this->HMG12->PlaceHolder = RemoveHtml($this->HMG12->caption());

        // HMG13
        $this->HMG13->EditAttrs["class"] = "form-control";
        $this->HMG13->EditCustomAttributes = "";
        $this->HMG13->PlaceHolder = RemoveHtml($this->HMG13->caption());

        // GnRH1
        $this->GnRH1->EditAttrs["class"] = "form-control";
        $this->GnRH1->EditCustomAttributes = "";
        $this->GnRH1->PlaceHolder = RemoveHtml($this->GnRH1->caption());

        // GnRH2
        $this->GnRH2->EditAttrs["class"] = "form-control";
        $this->GnRH2->EditCustomAttributes = "";
        $this->GnRH2->PlaceHolder = RemoveHtml($this->GnRH2->caption());

        // GnRH3
        $this->GnRH3->EditAttrs["class"] = "form-control";
        $this->GnRH3->EditCustomAttributes = "";
        $this->GnRH3->PlaceHolder = RemoveHtml($this->GnRH3->caption());

        // GnRH4
        $this->GnRH4->EditAttrs["class"] = "form-control";
        $this->GnRH4->EditCustomAttributes = "";
        $this->GnRH4->PlaceHolder = RemoveHtml($this->GnRH4->caption());

        // GnRH5
        $this->GnRH5->EditAttrs["class"] = "form-control";
        $this->GnRH5->EditCustomAttributes = "";
        $this->GnRH5->PlaceHolder = RemoveHtml($this->GnRH5->caption());

        // GnRH6
        $this->GnRH6->EditAttrs["class"] = "form-control";
        $this->GnRH6->EditCustomAttributes = "";
        $this->GnRH6->PlaceHolder = RemoveHtml($this->GnRH6->caption());

        // GnRH7
        $this->GnRH7->EditAttrs["class"] = "form-control";
        $this->GnRH7->EditCustomAttributes = "";
        $this->GnRH7->PlaceHolder = RemoveHtml($this->GnRH7->caption());

        // GnRH8
        $this->GnRH8->EditAttrs["class"] = "form-control";
        $this->GnRH8->EditCustomAttributes = "";
        $this->GnRH8->PlaceHolder = RemoveHtml($this->GnRH8->caption());

        // GnRH9
        $this->GnRH9->EditAttrs["class"] = "form-control";
        $this->GnRH9->EditCustomAttributes = "";
        $this->GnRH9->PlaceHolder = RemoveHtml($this->GnRH9->caption());

        // GnRH10
        $this->GnRH10->EditAttrs["class"] = "form-control";
        $this->GnRH10->EditCustomAttributes = "";
        $this->GnRH10->PlaceHolder = RemoveHtml($this->GnRH10->caption());

        // GnRH11
        $this->GnRH11->EditAttrs["class"] = "form-control";
        $this->GnRH11->EditCustomAttributes = "";
        $this->GnRH11->PlaceHolder = RemoveHtml($this->GnRH11->caption());

        // GnRH12
        $this->GnRH12->EditAttrs["class"] = "form-control";
        $this->GnRH12->EditCustomAttributes = "";
        $this->GnRH12->PlaceHolder = RemoveHtml($this->GnRH12->caption());

        // GnRH13
        $this->GnRH13->EditAttrs["class"] = "form-control";
        $this->GnRH13->EditCustomAttributes = "";
        $this->GnRH13->PlaceHolder = RemoveHtml($this->GnRH13->caption());

        // E21
        $this->E21->EditAttrs["class"] = "form-control";
        $this->E21->EditCustomAttributes = "";
        if (!$this->E21->Raw) {
            $this->E21->CurrentValue = HtmlDecode($this->E21->CurrentValue);
        }
        $this->E21->EditValue = $this->E21->CurrentValue;
        $this->E21->PlaceHolder = RemoveHtml($this->E21->caption());

        // E22
        $this->E22->EditAttrs["class"] = "form-control";
        $this->E22->EditCustomAttributes = "";
        if (!$this->E22->Raw) {
            $this->E22->CurrentValue = HtmlDecode($this->E22->CurrentValue);
        }
        $this->E22->EditValue = $this->E22->CurrentValue;
        $this->E22->PlaceHolder = RemoveHtml($this->E22->caption());

        // E23
        $this->E23->EditAttrs["class"] = "form-control";
        $this->E23->EditCustomAttributes = "";
        if (!$this->E23->Raw) {
            $this->E23->CurrentValue = HtmlDecode($this->E23->CurrentValue);
        }
        $this->E23->EditValue = $this->E23->CurrentValue;
        $this->E23->PlaceHolder = RemoveHtml($this->E23->caption());

        // E24
        $this->E24->EditAttrs["class"] = "form-control";
        $this->E24->EditCustomAttributes = "";
        if (!$this->E24->Raw) {
            $this->E24->CurrentValue = HtmlDecode($this->E24->CurrentValue);
        }
        $this->E24->EditValue = $this->E24->CurrentValue;
        $this->E24->PlaceHolder = RemoveHtml($this->E24->caption());

        // E25
        $this->E25->EditAttrs["class"] = "form-control";
        $this->E25->EditCustomAttributes = "";
        if (!$this->E25->Raw) {
            $this->E25->CurrentValue = HtmlDecode($this->E25->CurrentValue);
        }
        $this->E25->EditValue = $this->E25->CurrentValue;
        $this->E25->PlaceHolder = RemoveHtml($this->E25->caption());

        // E26
        $this->E26->EditAttrs["class"] = "form-control";
        $this->E26->EditCustomAttributes = "";
        if (!$this->E26->Raw) {
            $this->E26->CurrentValue = HtmlDecode($this->E26->CurrentValue);
        }
        $this->E26->EditValue = $this->E26->CurrentValue;
        $this->E26->PlaceHolder = RemoveHtml($this->E26->caption());

        // E27
        $this->E27->EditAttrs["class"] = "form-control";
        $this->E27->EditCustomAttributes = "";
        if (!$this->E27->Raw) {
            $this->E27->CurrentValue = HtmlDecode($this->E27->CurrentValue);
        }
        $this->E27->EditValue = $this->E27->CurrentValue;
        $this->E27->PlaceHolder = RemoveHtml($this->E27->caption());

        // E28
        $this->E28->EditAttrs["class"] = "form-control";
        $this->E28->EditCustomAttributes = "";
        if (!$this->E28->Raw) {
            $this->E28->CurrentValue = HtmlDecode($this->E28->CurrentValue);
        }
        $this->E28->EditValue = $this->E28->CurrentValue;
        $this->E28->PlaceHolder = RemoveHtml($this->E28->caption());

        // E29
        $this->E29->EditAttrs["class"] = "form-control";
        $this->E29->EditCustomAttributes = "";
        if (!$this->E29->Raw) {
            $this->E29->CurrentValue = HtmlDecode($this->E29->CurrentValue);
        }
        $this->E29->EditValue = $this->E29->CurrentValue;
        $this->E29->PlaceHolder = RemoveHtml($this->E29->caption());

        // E210
        $this->E210->EditAttrs["class"] = "form-control";
        $this->E210->EditCustomAttributes = "";
        if (!$this->E210->Raw) {
            $this->E210->CurrentValue = HtmlDecode($this->E210->CurrentValue);
        }
        $this->E210->EditValue = $this->E210->CurrentValue;
        $this->E210->PlaceHolder = RemoveHtml($this->E210->caption());

        // E211
        $this->E211->EditAttrs["class"] = "form-control";
        $this->E211->EditCustomAttributes = "";
        if (!$this->E211->Raw) {
            $this->E211->CurrentValue = HtmlDecode($this->E211->CurrentValue);
        }
        $this->E211->EditValue = $this->E211->CurrentValue;
        $this->E211->PlaceHolder = RemoveHtml($this->E211->caption());

        // E212
        $this->E212->EditAttrs["class"] = "form-control";
        $this->E212->EditCustomAttributes = "";
        if (!$this->E212->Raw) {
            $this->E212->CurrentValue = HtmlDecode($this->E212->CurrentValue);
        }
        $this->E212->EditValue = $this->E212->CurrentValue;
        $this->E212->PlaceHolder = RemoveHtml($this->E212->caption());

        // E213
        $this->E213->EditAttrs["class"] = "form-control";
        $this->E213->EditCustomAttributes = "";
        if (!$this->E213->Raw) {
            $this->E213->CurrentValue = HtmlDecode($this->E213->CurrentValue);
        }
        $this->E213->EditValue = $this->E213->CurrentValue;
        $this->E213->PlaceHolder = RemoveHtml($this->E213->caption());

        // P41
        $this->P41->EditAttrs["class"] = "form-control";
        $this->P41->EditCustomAttributes = "";
        if (!$this->P41->Raw) {
            $this->P41->CurrentValue = HtmlDecode($this->P41->CurrentValue);
        }
        $this->P41->EditValue = $this->P41->CurrentValue;
        $this->P41->PlaceHolder = RemoveHtml($this->P41->caption());

        // P42
        $this->P42->EditAttrs["class"] = "form-control";
        $this->P42->EditCustomAttributes = "";
        if (!$this->P42->Raw) {
            $this->P42->CurrentValue = HtmlDecode($this->P42->CurrentValue);
        }
        $this->P42->EditValue = $this->P42->CurrentValue;
        $this->P42->PlaceHolder = RemoveHtml($this->P42->caption());

        // P43
        $this->P43->EditAttrs["class"] = "form-control";
        $this->P43->EditCustomAttributes = "";
        if (!$this->P43->Raw) {
            $this->P43->CurrentValue = HtmlDecode($this->P43->CurrentValue);
        }
        $this->P43->EditValue = $this->P43->CurrentValue;
        $this->P43->PlaceHolder = RemoveHtml($this->P43->caption());

        // P44
        $this->P44->EditAttrs["class"] = "form-control";
        $this->P44->EditCustomAttributes = "";
        if (!$this->P44->Raw) {
            $this->P44->CurrentValue = HtmlDecode($this->P44->CurrentValue);
        }
        $this->P44->EditValue = $this->P44->CurrentValue;
        $this->P44->PlaceHolder = RemoveHtml($this->P44->caption());

        // P45
        $this->P45->EditAttrs["class"] = "form-control";
        $this->P45->EditCustomAttributes = "";
        if (!$this->P45->Raw) {
            $this->P45->CurrentValue = HtmlDecode($this->P45->CurrentValue);
        }
        $this->P45->EditValue = $this->P45->CurrentValue;
        $this->P45->PlaceHolder = RemoveHtml($this->P45->caption());

        // P46
        $this->P46->EditAttrs["class"] = "form-control";
        $this->P46->EditCustomAttributes = "";
        if (!$this->P46->Raw) {
            $this->P46->CurrentValue = HtmlDecode($this->P46->CurrentValue);
        }
        $this->P46->EditValue = $this->P46->CurrentValue;
        $this->P46->PlaceHolder = RemoveHtml($this->P46->caption());

        // P47
        $this->P47->EditAttrs["class"] = "form-control";
        $this->P47->EditCustomAttributes = "";
        if (!$this->P47->Raw) {
            $this->P47->CurrentValue = HtmlDecode($this->P47->CurrentValue);
        }
        $this->P47->EditValue = $this->P47->CurrentValue;
        $this->P47->PlaceHolder = RemoveHtml($this->P47->caption());

        // P48
        $this->P48->EditAttrs["class"] = "form-control";
        $this->P48->EditCustomAttributes = "";
        if (!$this->P48->Raw) {
            $this->P48->CurrentValue = HtmlDecode($this->P48->CurrentValue);
        }
        $this->P48->EditValue = $this->P48->CurrentValue;
        $this->P48->PlaceHolder = RemoveHtml($this->P48->caption());

        // P49
        $this->P49->EditAttrs["class"] = "form-control";
        $this->P49->EditCustomAttributes = "";
        if (!$this->P49->Raw) {
            $this->P49->CurrentValue = HtmlDecode($this->P49->CurrentValue);
        }
        $this->P49->EditValue = $this->P49->CurrentValue;
        $this->P49->PlaceHolder = RemoveHtml($this->P49->caption());

        // P410
        $this->P410->EditAttrs["class"] = "form-control";
        $this->P410->EditCustomAttributes = "";
        if (!$this->P410->Raw) {
            $this->P410->CurrentValue = HtmlDecode($this->P410->CurrentValue);
        }
        $this->P410->EditValue = $this->P410->CurrentValue;
        $this->P410->PlaceHolder = RemoveHtml($this->P410->caption());

        // P411
        $this->P411->EditAttrs["class"] = "form-control";
        $this->P411->EditCustomAttributes = "";
        if (!$this->P411->Raw) {
            $this->P411->CurrentValue = HtmlDecode($this->P411->CurrentValue);
        }
        $this->P411->EditValue = $this->P411->CurrentValue;
        $this->P411->PlaceHolder = RemoveHtml($this->P411->caption());

        // P412
        $this->P412->EditAttrs["class"] = "form-control";
        $this->P412->EditCustomAttributes = "";
        if (!$this->P412->Raw) {
            $this->P412->CurrentValue = HtmlDecode($this->P412->CurrentValue);
        }
        $this->P412->EditValue = $this->P412->CurrentValue;
        $this->P412->PlaceHolder = RemoveHtml($this->P412->caption());

        // P413
        $this->P413->EditAttrs["class"] = "form-control";
        $this->P413->EditCustomAttributes = "";
        if (!$this->P413->Raw) {
            $this->P413->CurrentValue = HtmlDecode($this->P413->CurrentValue);
        }
        $this->P413->EditValue = $this->P413->CurrentValue;
        $this->P413->PlaceHolder = RemoveHtml($this->P413->caption());

        // USGRt1
        $this->USGRt1->EditAttrs["class"] = "form-control";
        $this->USGRt1->EditCustomAttributes = "";
        if (!$this->USGRt1->Raw) {
            $this->USGRt1->CurrentValue = HtmlDecode($this->USGRt1->CurrentValue);
        }
        $this->USGRt1->EditValue = $this->USGRt1->CurrentValue;
        $this->USGRt1->PlaceHolder = RemoveHtml($this->USGRt1->caption());

        // USGRt2
        $this->USGRt2->EditAttrs["class"] = "form-control";
        $this->USGRt2->EditCustomAttributes = "";
        if (!$this->USGRt2->Raw) {
            $this->USGRt2->CurrentValue = HtmlDecode($this->USGRt2->CurrentValue);
        }
        $this->USGRt2->EditValue = $this->USGRt2->CurrentValue;
        $this->USGRt2->PlaceHolder = RemoveHtml($this->USGRt2->caption());

        // USGRt3
        $this->USGRt3->EditAttrs["class"] = "form-control";
        $this->USGRt3->EditCustomAttributes = "";
        if (!$this->USGRt3->Raw) {
            $this->USGRt3->CurrentValue = HtmlDecode($this->USGRt3->CurrentValue);
        }
        $this->USGRt3->EditValue = $this->USGRt3->CurrentValue;
        $this->USGRt3->PlaceHolder = RemoveHtml($this->USGRt3->caption());

        // USGRt4
        $this->USGRt4->EditAttrs["class"] = "form-control";
        $this->USGRt4->EditCustomAttributes = "";
        if (!$this->USGRt4->Raw) {
            $this->USGRt4->CurrentValue = HtmlDecode($this->USGRt4->CurrentValue);
        }
        $this->USGRt4->EditValue = $this->USGRt4->CurrentValue;
        $this->USGRt4->PlaceHolder = RemoveHtml($this->USGRt4->caption());

        // USGRt5
        $this->USGRt5->EditAttrs["class"] = "form-control";
        $this->USGRt5->EditCustomAttributes = "";
        if (!$this->USGRt5->Raw) {
            $this->USGRt5->CurrentValue = HtmlDecode($this->USGRt5->CurrentValue);
        }
        $this->USGRt5->EditValue = $this->USGRt5->CurrentValue;
        $this->USGRt5->PlaceHolder = RemoveHtml($this->USGRt5->caption());

        // USGRt6
        $this->USGRt6->EditAttrs["class"] = "form-control";
        $this->USGRt6->EditCustomAttributes = "";
        if (!$this->USGRt6->Raw) {
            $this->USGRt6->CurrentValue = HtmlDecode($this->USGRt6->CurrentValue);
        }
        $this->USGRt6->EditValue = $this->USGRt6->CurrentValue;
        $this->USGRt6->PlaceHolder = RemoveHtml($this->USGRt6->caption());

        // USGRt7
        $this->USGRt7->EditAttrs["class"] = "form-control";
        $this->USGRt7->EditCustomAttributes = "";
        if (!$this->USGRt7->Raw) {
            $this->USGRt7->CurrentValue = HtmlDecode($this->USGRt7->CurrentValue);
        }
        $this->USGRt7->EditValue = $this->USGRt7->CurrentValue;
        $this->USGRt7->PlaceHolder = RemoveHtml($this->USGRt7->caption());

        // USGRt8
        $this->USGRt8->EditAttrs["class"] = "form-control";
        $this->USGRt8->EditCustomAttributes = "";
        if (!$this->USGRt8->Raw) {
            $this->USGRt8->CurrentValue = HtmlDecode($this->USGRt8->CurrentValue);
        }
        $this->USGRt8->EditValue = $this->USGRt8->CurrentValue;
        $this->USGRt8->PlaceHolder = RemoveHtml($this->USGRt8->caption());

        // USGRt9
        $this->USGRt9->EditAttrs["class"] = "form-control";
        $this->USGRt9->EditCustomAttributes = "";
        if (!$this->USGRt9->Raw) {
            $this->USGRt9->CurrentValue = HtmlDecode($this->USGRt9->CurrentValue);
        }
        $this->USGRt9->EditValue = $this->USGRt9->CurrentValue;
        $this->USGRt9->PlaceHolder = RemoveHtml($this->USGRt9->caption());

        // USGRt10
        $this->USGRt10->EditAttrs["class"] = "form-control";
        $this->USGRt10->EditCustomAttributes = "";
        if (!$this->USGRt10->Raw) {
            $this->USGRt10->CurrentValue = HtmlDecode($this->USGRt10->CurrentValue);
        }
        $this->USGRt10->EditValue = $this->USGRt10->CurrentValue;
        $this->USGRt10->PlaceHolder = RemoveHtml($this->USGRt10->caption());

        // USGRt11
        $this->USGRt11->EditAttrs["class"] = "form-control";
        $this->USGRt11->EditCustomAttributes = "";
        if (!$this->USGRt11->Raw) {
            $this->USGRt11->CurrentValue = HtmlDecode($this->USGRt11->CurrentValue);
        }
        $this->USGRt11->EditValue = $this->USGRt11->CurrentValue;
        $this->USGRt11->PlaceHolder = RemoveHtml($this->USGRt11->caption());

        // USGRt12
        $this->USGRt12->EditAttrs["class"] = "form-control";
        $this->USGRt12->EditCustomAttributes = "";
        if (!$this->USGRt12->Raw) {
            $this->USGRt12->CurrentValue = HtmlDecode($this->USGRt12->CurrentValue);
        }
        $this->USGRt12->EditValue = $this->USGRt12->CurrentValue;
        $this->USGRt12->PlaceHolder = RemoveHtml($this->USGRt12->caption());

        // USGRt13
        $this->USGRt13->EditAttrs["class"] = "form-control";
        $this->USGRt13->EditCustomAttributes = "";
        if (!$this->USGRt13->Raw) {
            $this->USGRt13->CurrentValue = HtmlDecode($this->USGRt13->CurrentValue);
        }
        $this->USGRt13->EditValue = $this->USGRt13->CurrentValue;
        $this->USGRt13->PlaceHolder = RemoveHtml($this->USGRt13->caption());

        // USGLt1
        $this->USGLt1->EditAttrs["class"] = "form-control";
        $this->USGLt1->EditCustomAttributes = "";
        if (!$this->USGLt1->Raw) {
            $this->USGLt1->CurrentValue = HtmlDecode($this->USGLt1->CurrentValue);
        }
        $this->USGLt1->EditValue = $this->USGLt1->CurrentValue;
        $this->USGLt1->PlaceHolder = RemoveHtml($this->USGLt1->caption());

        // USGLt2
        $this->USGLt2->EditAttrs["class"] = "form-control";
        $this->USGLt2->EditCustomAttributes = "";
        if (!$this->USGLt2->Raw) {
            $this->USGLt2->CurrentValue = HtmlDecode($this->USGLt2->CurrentValue);
        }
        $this->USGLt2->EditValue = $this->USGLt2->CurrentValue;
        $this->USGLt2->PlaceHolder = RemoveHtml($this->USGLt2->caption());

        // USGLt3
        $this->USGLt3->EditAttrs["class"] = "form-control";
        $this->USGLt3->EditCustomAttributes = "";
        if (!$this->USGLt3->Raw) {
            $this->USGLt3->CurrentValue = HtmlDecode($this->USGLt3->CurrentValue);
        }
        $this->USGLt3->EditValue = $this->USGLt3->CurrentValue;
        $this->USGLt3->PlaceHolder = RemoveHtml($this->USGLt3->caption());

        // USGLt4
        $this->USGLt4->EditAttrs["class"] = "form-control";
        $this->USGLt4->EditCustomAttributes = "";
        if (!$this->USGLt4->Raw) {
            $this->USGLt4->CurrentValue = HtmlDecode($this->USGLt4->CurrentValue);
        }
        $this->USGLt4->EditValue = $this->USGLt4->CurrentValue;
        $this->USGLt4->PlaceHolder = RemoveHtml($this->USGLt4->caption());

        // USGLt5
        $this->USGLt5->EditAttrs["class"] = "form-control";
        $this->USGLt5->EditCustomAttributes = "";
        if (!$this->USGLt5->Raw) {
            $this->USGLt5->CurrentValue = HtmlDecode($this->USGLt5->CurrentValue);
        }
        $this->USGLt5->EditValue = $this->USGLt5->CurrentValue;
        $this->USGLt5->PlaceHolder = RemoveHtml($this->USGLt5->caption());

        // USGLt6
        $this->USGLt6->EditAttrs["class"] = "form-control";
        $this->USGLt6->EditCustomAttributes = "";
        if (!$this->USGLt6->Raw) {
            $this->USGLt6->CurrentValue = HtmlDecode($this->USGLt6->CurrentValue);
        }
        $this->USGLt6->EditValue = $this->USGLt6->CurrentValue;
        $this->USGLt6->PlaceHolder = RemoveHtml($this->USGLt6->caption());

        // USGLt7
        $this->USGLt7->EditAttrs["class"] = "form-control";
        $this->USGLt7->EditCustomAttributes = "";
        if (!$this->USGLt7->Raw) {
            $this->USGLt7->CurrentValue = HtmlDecode($this->USGLt7->CurrentValue);
        }
        $this->USGLt7->EditValue = $this->USGLt7->CurrentValue;
        $this->USGLt7->PlaceHolder = RemoveHtml($this->USGLt7->caption());

        // USGLt8
        $this->USGLt8->EditAttrs["class"] = "form-control";
        $this->USGLt8->EditCustomAttributes = "";
        if (!$this->USGLt8->Raw) {
            $this->USGLt8->CurrentValue = HtmlDecode($this->USGLt8->CurrentValue);
        }
        $this->USGLt8->EditValue = $this->USGLt8->CurrentValue;
        $this->USGLt8->PlaceHolder = RemoveHtml($this->USGLt8->caption());

        // USGLt9
        $this->USGLt9->EditAttrs["class"] = "form-control";
        $this->USGLt9->EditCustomAttributes = "";
        if (!$this->USGLt9->Raw) {
            $this->USGLt9->CurrentValue = HtmlDecode($this->USGLt9->CurrentValue);
        }
        $this->USGLt9->EditValue = $this->USGLt9->CurrentValue;
        $this->USGLt9->PlaceHolder = RemoveHtml($this->USGLt9->caption());

        // USGLt10
        $this->USGLt10->EditAttrs["class"] = "form-control";
        $this->USGLt10->EditCustomAttributes = "";
        if (!$this->USGLt10->Raw) {
            $this->USGLt10->CurrentValue = HtmlDecode($this->USGLt10->CurrentValue);
        }
        $this->USGLt10->EditValue = $this->USGLt10->CurrentValue;
        $this->USGLt10->PlaceHolder = RemoveHtml($this->USGLt10->caption());

        // USGLt11
        $this->USGLt11->EditAttrs["class"] = "form-control";
        $this->USGLt11->EditCustomAttributes = "";
        if (!$this->USGLt11->Raw) {
            $this->USGLt11->CurrentValue = HtmlDecode($this->USGLt11->CurrentValue);
        }
        $this->USGLt11->EditValue = $this->USGLt11->CurrentValue;
        $this->USGLt11->PlaceHolder = RemoveHtml($this->USGLt11->caption());

        // USGLt12
        $this->USGLt12->EditAttrs["class"] = "form-control";
        $this->USGLt12->EditCustomAttributes = "";
        if (!$this->USGLt12->Raw) {
            $this->USGLt12->CurrentValue = HtmlDecode($this->USGLt12->CurrentValue);
        }
        $this->USGLt12->EditValue = $this->USGLt12->CurrentValue;
        $this->USGLt12->PlaceHolder = RemoveHtml($this->USGLt12->caption());

        // USGLt13
        $this->USGLt13->EditAttrs["class"] = "form-control";
        $this->USGLt13->EditCustomAttributes = "";
        if (!$this->USGLt13->Raw) {
            $this->USGLt13->CurrentValue = HtmlDecode($this->USGLt13->CurrentValue);
        }
        $this->USGLt13->EditValue = $this->USGLt13->CurrentValue;
        $this->USGLt13->PlaceHolder = RemoveHtml($this->USGLt13->caption());

        // EM1
        $this->EM1->EditAttrs["class"] = "form-control";
        $this->EM1->EditCustomAttributes = "";
        if (!$this->EM1->Raw) {
            $this->EM1->CurrentValue = HtmlDecode($this->EM1->CurrentValue);
        }
        $this->EM1->EditValue = $this->EM1->CurrentValue;
        $this->EM1->PlaceHolder = RemoveHtml($this->EM1->caption());

        // EM2
        $this->EM2->EditAttrs["class"] = "form-control";
        $this->EM2->EditCustomAttributes = "";
        if (!$this->EM2->Raw) {
            $this->EM2->CurrentValue = HtmlDecode($this->EM2->CurrentValue);
        }
        $this->EM2->EditValue = $this->EM2->CurrentValue;
        $this->EM2->PlaceHolder = RemoveHtml($this->EM2->caption());

        // EM3
        $this->EM3->EditAttrs["class"] = "form-control";
        $this->EM3->EditCustomAttributes = "";
        if (!$this->EM3->Raw) {
            $this->EM3->CurrentValue = HtmlDecode($this->EM3->CurrentValue);
        }
        $this->EM3->EditValue = $this->EM3->CurrentValue;
        $this->EM3->PlaceHolder = RemoveHtml($this->EM3->caption());

        // EM4
        $this->EM4->EditAttrs["class"] = "form-control";
        $this->EM4->EditCustomAttributes = "";
        if (!$this->EM4->Raw) {
            $this->EM4->CurrentValue = HtmlDecode($this->EM4->CurrentValue);
        }
        $this->EM4->EditValue = $this->EM4->CurrentValue;
        $this->EM4->PlaceHolder = RemoveHtml($this->EM4->caption());

        // EM5
        $this->EM5->EditAttrs["class"] = "form-control";
        $this->EM5->EditCustomAttributes = "";
        if (!$this->EM5->Raw) {
            $this->EM5->CurrentValue = HtmlDecode($this->EM5->CurrentValue);
        }
        $this->EM5->EditValue = $this->EM5->CurrentValue;
        $this->EM5->PlaceHolder = RemoveHtml($this->EM5->caption());

        // EM6
        $this->EM6->EditAttrs["class"] = "form-control";
        $this->EM6->EditCustomAttributes = "";
        if (!$this->EM6->Raw) {
            $this->EM6->CurrentValue = HtmlDecode($this->EM6->CurrentValue);
        }
        $this->EM6->EditValue = $this->EM6->CurrentValue;
        $this->EM6->PlaceHolder = RemoveHtml($this->EM6->caption());

        // EM7
        $this->EM7->EditAttrs["class"] = "form-control";
        $this->EM7->EditCustomAttributes = "";
        if (!$this->EM7->Raw) {
            $this->EM7->CurrentValue = HtmlDecode($this->EM7->CurrentValue);
        }
        $this->EM7->EditValue = $this->EM7->CurrentValue;
        $this->EM7->PlaceHolder = RemoveHtml($this->EM7->caption());

        // EM8
        $this->EM8->EditAttrs["class"] = "form-control";
        $this->EM8->EditCustomAttributes = "";
        if (!$this->EM8->Raw) {
            $this->EM8->CurrentValue = HtmlDecode($this->EM8->CurrentValue);
        }
        $this->EM8->EditValue = $this->EM8->CurrentValue;
        $this->EM8->PlaceHolder = RemoveHtml($this->EM8->caption());

        // EM9
        $this->EM9->EditAttrs["class"] = "form-control";
        $this->EM9->EditCustomAttributes = "";
        if (!$this->EM9->Raw) {
            $this->EM9->CurrentValue = HtmlDecode($this->EM9->CurrentValue);
        }
        $this->EM9->EditValue = $this->EM9->CurrentValue;
        $this->EM9->PlaceHolder = RemoveHtml($this->EM9->caption());

        // EM10
        $this->EM10->EditAttrs["class"] = "form-control";
        $this->EM10->EditCustomAttributes = "";
        if (!$this->EM10->Raw) {
            $this->EM10->CurrentValue = HtmlDecode($this->EM10->CurrentValue);
        }
        $this->EM10->EditValue = $this->EM10->CurrentValue;
        $this->EM10->PlaceHolder = RemoveHtml($this->EM10->caption());

        // EM11
        $this->EM11->EditAttrs["class"] = "form-control";
        $this->EM11->EditCustomAttributes = "";
        if (!$this->EM11->Raw) {
            $this->EM11->CurrentValue = HtmlDecode($this->EM11->CurrentValue);
        }
        $this->EM11->EditValue = $this->EM11->CurrentValue;
        $this->EM11->PlaceHolder = RemoveHtml($this->EM11->caption());

        // EM12
        $this->EM12->EditAttrs["class"] = "form-control";
        $this->EM12->EditCustomAttributes = "";
        if (!$this->EM12->Raw) {
            $this->EM12->CurrentValue = HtmlDecode($this->EM12->CurrentValue);
        }
        $this->EM12->EditValue = $this->EM12->CurrentValue;
        $this->EM12->PlaceHolder = RemoveHtml($this->EM12->caption());

        // EM13
        $this->EM13->EditAttrs["class"] = "form-control";
        $this->EM13->EditCustomAttributes = "";
        if (!$this->EM13->Raw) {
            $this->EM13->CurrentValue = HtmlDecode($this->EM13->CurrentValue);
        }
        $this->EM13->EditValue = $this->EM13->CurrentValue;
        $this->EM13->PlaceHolder = RemoveHtml($this->EM13->caption());

        // Others1
        $this->Others1->EditAttrs["class"] = "form-control";
        $this->Others1->EditCustomAttributes = "";
        if (!$this->Others1->Raw) {
            $this->Others1->CurrentValue = HtmlDecode($this->Others1->CurrentValue);
        }
        $this->Others1->EditValue = $this->Others1->CurrentValue;
        $this->Others1->PlaceHolder = RemoveHtml($this->Others1->caption());

        // Others2
        $this->Others2->EditAttrs["class"] = "form-control";
        $this->Others2->EditCustomAttributes = "";
        if (!$this->Others2->Raw) {
            $this->Others2->CurrentValue = HtmlDecode($this->Others2->CurrentValue);
        }
        $this->Others2->EditValue = $this->Others2->CurrentValue;
        $this->Others2->PlaceHolder = RemoveHtml($this->Others2->caption());

        // Others3
        $this->Others3->EditAttrs["class"] = "form-control";
        $this->Others3->EditCustomAttributes = "";
        if (!$this->Others3->Raw) {
            $this->Others3->CurrentValue = HtmlDecode($this->Others3->CurrentValue);
        }
        $this->Others3->EditValue = $this->Others3->CurrentValue;
        $this->Others3->PlaceHolder = RemoveHtml($this->Others3->caption());

        // Others4
        $this->Others4->EditAttrs["class"] = "form-control";
        $this->Others4->EditCustomAttributes = "";
        if (!$this->Others4->Raw) {
            $this->Others4->CurrentValue = HtmlDecode($this->Others4->CurrentValue);
        }
        $this->Others4->EditValue = $this->Others4->CurrentValue;
        $this->Others4->PlaceHolder = RemoveHtml($this->Others4->caption());

        // Others5
        $this->Others5->EditAttrs["class"] = "form-control";
        $this->Others5->EditCustomAttributes = "";
        if (!$this->Others5->Raw) {
            $this->Others5->CurrentValue = HtmlDecode($this->Others5->CurrentValue);
        }
        $this->Others5->EditValue = $this->Others5->CurrentValue;
        $this->Others5->PlaceHolder = RemoveHtml($this->Others5->caption());

        // Others6
        $this->Others6->EditAttrs["class"] = "form-control";
        $this->Others6->EditCustomAttributes = "";
        if (!$this->Others6->Raw) {
            $this->Others6->CurrentValue = HtmlDecode($this->Others6->CurrentValue);
        }
        $this->Others6->EditValue = $this->Others6->CurrentValue;
        $this->Others6->PlaceHolder = RemoveHtml($this->Others6->caption());

        // Others7
        $this->Others7->EditAttrs["class"] = "form-control";
        $this->Others7->EditCustomAttributes = "";
        if (!$this->Others7->Raw) {
            $this->Others7->CurrentValue = HtmlDecode($this->Others7->CurrentValue);
        }
        $this->Others7->EditValue = $this->Others7->CurrentValue;
        $this->Others7->PlaceHolder = RemoveHtml($this->Others7->caption());

        // Others8
        $this->Others8->EditAttrs["class"] = "form-control";
        $this->Others8->EditCustomAttributes = "";
        if (!$this->Others8->Raw) {
            $this->Others8->CurrentValue = HtmlDecode($this->Others8->CurrentValue);
        }
        $this->Others8->EditValue = $this->Others8->CurrentValue;
        $this->Others8->PlaceHolder = RemoveHtml($this->Others8->caption());

        // Others9
        $this->Others9->EditAttrs["class"] = "form-control";
        $this->Others9->EditCustomAttributes = "";
        if (!$this->Others9->Raw) {
            $this->Others9->CurrentValue = HtmlDecode($this->Others9->CurrentValue);
        }
        $this->Others9->EditValue = $this->Others9->CurrentValue;
        $this->Others9->PlaceHolder = RemoveHtml($this->Others9->caption());

        // Others10
        $this->Others10->EditAttrs["class"] = "form-control";
        $this->Others10->EditCustomAttributes = "";
        if (!$this->Others10->Raw) {
            $this->Others10->CurrentValue = HtmlDecode($this->Others10->CurrentValue);
        }
        $this->Others10->EditValue = $this->Others10->CurrentValue;
        $this->Others10->PlaceHolder = RemoveHtml($this->Others10->caption());

        // Others11
        $this->Others11->EditAttrs["class"] = "form-control";
        $this->Others11->EditCustomAttributes = "";
        if (!$this->Others11->Raw) {
            $this->Others11->CurrentValue = HtmlDecode($this->Others11->CurrentValue);
        }
        $this->Others11->EditValue = $this->Others11->CurrentValue;
        $this->Others11->PlaceHolder = RemoveHtml($this->Others11->caption());

        // Others12
        $this->Others12->EditAttrs["class"] = "form-control";
        $this->Others12->EditCustomAttributes = "";
        if (!$this->Others12->Raw) {
            $this->Others12->CurrentValue = HtmlDecode($this->Others12->CurrentValue);
        }
        $this->Others12->EditValue = $this->Others12->CurrentValue;
        $this->Others12->PlaceHolder = RemoveHtml($this->Others12->caption());

        // Others13
        $this->Others13->EditAttrs["class"] = "form-control";
        $this->Others13->EditCustomAttributes = "";
        if (!$this->Others13->Raw) {
            $this->Others13->CurrentValue = HtmlDecode($this->Others13->CurrentValue);
        }
        $this->Others13->EditValue = $this->Others13->CurrentValue;
        $this->Others13->PlaceHolder = RemoveHtml($this->Others13->caption());

        // DR1
        $this->DR1->EditAttrs["class"] = "form-control";
        $this->DR1->EditCustomAttributes = "";
        if (!$this->DR1->Raw) {
            $this->DR1->CurrentValue = HtmlDecode($this->DR1->CurrentValue);
        }
        $this->DR1->EditValue = $this->DR1->CurrentValue;
        $this->DR1->PlaceHolder = RemoveHtml($this->DR1->caption());

        // DR2
        $this->DR2->EditAttrs["class"] = "form-control";
        $this->DR2->EditCustomAttributes = "";
        if (!$this->DR2->Raw) {
            $this->DR2->CurrentValue = HtmlDecode($this->DR2->CurrentValue);
        }
        $this->DR2->EditValue = $this->DR2->CurrentValue;
        $this->DR2->PlaceHolder = RemoveHtml($this->DR2->caption());

        // DR3
        $this->DR3->EditAttrs["class"] = "form-control";
        $this->DR3->EditCustomAttributes = "";
        if (!$this->DR3->Raw) {
            $this->DR3->CurrentValue = HtmlDecode($this->DR3->CurrentValue);
        }
        $this->DR3->EditValue = $this->DR3->CurrentValue;
        $this->DR3->PlaceHolder = RemoveHtml($this->DR3->caption());

        // DR4
        $this->DR4->EditAttrs["class"] = "form-control";
        $this->DR4->EditCustomAttributes = "";
        if (!$this->DR4->Raw) {
            $this->DR4->CurrentValue = HtmlDecode($this->DR4->CurrentValue);
        }
        $this->DR4->EditValue = $this->DR4->CurrentValue;
        $this->DR4->PlaceHolder = RemoveHtml($this->DR4->caption());

        // DR5
        $this->DR5->EditAttrs["class"] = "form-control";
        $this->DR5->EditCustomAttributes = "";
        if (!$this->DR5->Raw) {
            $this->DR5->CurrentValue = HtmlDecode($this->DR5->CurrentValue);
        }
        $this->DR5->EditValue = $this->DR5->CurrentValue;
        $this->DR5->PlaceHolder = RemoveHtml($this->DR5->caption());

        // DR6
        $this->DR6->EditAttrs["class"] = "form-control";
        $this->DR6->EditCustomAttributes = "";
        if (!$this->DR6->Raw) {
            $this->DR6->CurrentValue = HtmlDecode($this->DR6->CurrentValue);
        }
        $this->DR6->EditValue = $this->DR6->CurrentValue;
        $this->DR6->PlaceHolder = RemoveHtml($this->DR6->caption());

        // DR7
        $this->DR7->EditAttrs["class"] = "form-control";
        $this->DR7->EditCustomAttributes = "";
        if (!$this->DR7->Raw) {
            $this->DR7->CurrentValue = HtmlDecode($this->DR7->CurrentValue);
        }
        $this->DR7->EditValue = $this->DR7->CurrentValue;
        $this->DR7->PlaceHolder = RemoveHtml($this->DR7->caption());

        // DR8
        $this->DR8->EditAttrs["class"] = "form-control";
        $this->DR8->EditCustomAttributes = "";
        if (!$this->DR8->Raw) {
            $this->DR8->CurrentValue = HtmlDecode($this->DR8->CurrentValue);
        }
        $this->DR8->EditValue = $this->DR8->CurrentValue;
        $this->DR8->PlaceHolder = RemoveHtml($this->DR8->caption());

        // DR9
        $this->DR9->EditAttrs["class"] = "form-control";
        $this->DR9->EditCustomAttributes = "";
        if (!$this->DR9->Raw) {
            $this->DR9->CurrentValue = HtmlDecode($this->DR9->CurrentValue);
        }
        $this->DR9->EditValue = $this->DR9->CurrentValue;
        $this->DR9->PlaceHolder = RemoveHtml($this->DR9->caption());

        // DR10
        $this->DR10->EditAttrs["class"] = "form-control";
        $this->DR10->EditCustomAttributes = "";
        if (!$this->DR10->Raw) {
            $this->DR10->CurrentValue = HtmlDecode($this->DR10->CurrentValue);
        }
        $this->DR10->EditValue = $this->DR10->CurrentValue;
        $this->DR10->PlaceHolder = RemoveHtml($this->DR10->caption());

        // DR11
        $this->DR11->EditAttrs["class"] = "form-control";
        $this->DR11->EditCustomAttributes = "";
        if (!$this->DR11->Raw) {
            $this->DR11->CurrentValue = HtmlDecode($this->DR11->CurrentValue);
        }
        $this->DR11->EditValue = $this->DR11->CurrentValue;
        $this->DR11->PlaceHolder = RemoveHtml($this->DR11->caption());

        // DR12
        $this->DR12->EditAttrs["class"] = "form-control";
        $this->DR12->EditCustomAttributes = "";
        if (!$this->DR12->Raw) {
            $this->DR12->CurrentValue = HtmlDecode($this->DR12->CurrentValue);
        }
        $this->DR12->EditValue = $this->DR12->CurrentValue;
        $this->DR12->PlaceHolder = RemoveHtml($this->DR12->caption());

        // DR13
        $this->DR13->EditAttrs["class"] = "form-control";
        $this->DR13->EditCustomAttributes = "";
        if (!$this->DR13->Raw) {
            $this->DR13->CurrentValue = HtmlDecode($this->DR13->CurrentValue);
        }
        $this->DR13->EditValue = $this->DR13->CurrentValue;
        $this->DR13->PlaceHolder = RemoveHtml($this->DR13->caption());

        // DOCTORRESPONSIBLE
        $this->DOCTORRESPONSIBLE->EditAttrs["class"] = "form-control";
        $this->DOCTORRESPONSIBLE->EditCustomAttributes = "";
        if (!$this->DOCTORRESPONSIBLE->Raw) {
            $this->DOCTORRESPONSIBLE->CurrentValue = HtmlDecode($this->DOCTORRESPONSIBLE->CurrentValue);
        }
        $this->DOCTORRESPONSIBLE->EditValue = $this->DOCTORRESPONSIBLE->CurrentValue;
        $this->DOCTORRESPONSIBLE->PlaceHolder = RemoveHtml($this->DOCTORRESPONSIBLE->caption());

        // TidNo
        $this->TidNo->EditAttrs["class"] = "form-control";
        $this->TidNo->EditCustomAttributes = "";
        if ($this->TidNo->getSessionValue() != "") {
            $this->TidNo->CurrentValue = GetForeignKeyValue($this->TidNo->getSessionValue());
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";
        } else {
            $this->TidNo->EditValue = $this->TidNo->CurrentValue;
            $this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());
        }

        // Convert
        $this->Convert->EditCustomAttributes = "";
        $this->Convert->EditValue = $this->Convert->options(false);
        $this->Convert->PlaceHolder = RemoveHtml($this->Convert->caption());

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
        $this->InseminatinTechnique->EditValue = $this->InseminatinTechnique->options(true);
        $this->InseminatinTechnique->PlaceHolder = RemoveHtml($this->InseminatinTechnique->caption());

        // IndicationForART
        $this->IndicationForART->EditAttrs["class"] = "form-control";
        $this->IndicationForART->EditCustomAttributes = "";
        $this->IndicationForART->EditValue = $this->IndicationForART->options(true);
        $this->IndicationForART->PlaceHolder = RemoveHtml($this->IndicationForART->caption());

        // Hysteroscopy
        $this->Hysteroscopy->EditAttrs["class"] = "form-control";
        $this->Hysteroscopy->EditCustomAttributes = "";
        $this->Hysteroscopy->EditValue = $this->Hysteroscopy->options(true);
        $this->Hysteroscopy->PlaceHolder = RemoveHtml($this->Hysteroscopy->caption());

        // EndometrialScratching
        $this->EndometrialScratching->EditAttrs["class"] = "form-control";
        $this->EndometrialScratching->EditCustomAttributes = "";
        $this->EndometrialScratching->EditValue = $this->EndometrialScratching->options(true);
        $this->EndometrialScratching->PlaceHolder = RemoveHtml($this->EndometrialScratching->caption());

        // TrialCannulation
        $this->TrialCannulation->EditAttrs["class"] = "form-control";
        $this->TrialCannulation->EditCustomAttributes = "";
        $this->TrialCannulation->EditValue = $this->TrialCannulation->options(true);
        $this->TrialCannulation->PlaceHolder = RemoveHtml($this->TrialCannulation->caption());

        // CYCLETYPE
        $this->CYCLETYPE->EditAttrs["class"] = "form-control";
        $this->CYCLETYPE->EditCustomAttributes = "";
        $this->CYCLETYPE->EditValue = $this->CYCLETYPE->options(true);
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
        $this->OralEstrogenDosage->EditValue = $this->OralEstrogenDosage->options(true);
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
        $this->GCSF->EditValue = $this->GCSF->options(true);
        $this->GCSF->PlaceHolder = RemoveHtml($this->GCSF->caption());

        // ActivatedPRP
        $this->ActivatedPRP->EditAttrs["class"] = "form-control";
        $this->ActivatedPRP->EditCustomAttributes = "";
        $this->ActivatedPRP->EditValue = $this->ActivatedPRP->options(true);
        $this->ActivatedPRP->PlaceHolder = RemoveHtml($this->ActivatedPRP->caption());

        // UCLcm
        $this->UCLcm->EditAttrs["class"] = "form-control";
        $this->UCLcm->EditCustomAttributes = "";
        if (!$this->UCLcm->Raw) {
            $this->UCLcm->CurrentValue = HtmlDecode($this->UCLcm->CurrentValue);
        }
        $this->UCLcm->EditValue = $this->UCLcm->CurrentValue;
        $this->UCLcm->PlaceHolder = RemoveHtml($this->UCLcm->caption());

        // DATOFEMBRYOTRANSFER
        $this->DATOFEMBRYOTRANSFER->EditAttrs["class"] = "form-control";
        $this->DATOFEMBRYOTRANSFER->EditCustomAttributes = "";
        $this->DATOFEMBRYOTRANSFER->EditValue = $this->DATOFEMBRYOTRANSFER->CurrentValue;
        $this->DATOFEMBRYOTRANSFER->PlaceHolder = RemoveHtml($this->DATOFEMBRYOTRANSFER->caption());

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

        // ViaAdmin
        $this->ViaAdmin->EditAttrs["class"] = "form-control";
        $this->ViaAdmin->EditCustomAttributes = "";
        if (!$this->ViaAdmin->Raw) {
            $this->ViaAdmin->CurrentValue = HtmlDecode($this->ViaAdmin->CurrentValue);
        }
        $this->ViaAdmin->EditValue = $this->ViaAdmin->CurrentValue;
        $this->ViaAdmin->PlaceHolder = RemoveHtml($this->ViaAdmin->caption());

        // ViaStartDateTime
        $this->ViaStartDateTime->EditAttrs["class"] = "form-control";
        $this->ViaStartDateTime->EditCustomAttributes = "";
        $this->ViaStartDateTime->EditValue = FormatDateTime($this->ViaStartDateTime->CurrentValue, 8);
        $this->ViaStartDateTime->PlaceHolder = RemoveHtml($this->ViaStartDateTime->caption());

        // ViaDose
        $this->ViaDose->EditAttrs["class"] = "form-control";
        $this->ViaDose->EditCustomAttributes = "";
        if (!$this->ViaDose->Raw) {
            $this->ViaDose->CurrentValue = HtmlDecode($this->ViaDose->CurrentValue);
        }
        $this->ViaDose->EditValue = $this->ViaDose->CurrentValue;
        $this->ViaDose->PlaceHolder = RemoveHtml($this->ViaDose->caption());

        // AllFreeze
        $this->AllFreeze->EditCustomAttributes = "";
        $this->AllFreeze->EditValue = $this->AllFreeze->options(false);
        $this->AllFreeze->PlaceHolder = RemoveHtml($this->AllFreeze->caption());

        // TreatmentCancel
        $this->TreatmentCancel->EditCustomAttributes = "";
        $this->TreatmentCancel->EditValue = $this->TreatmentCancel->options(false);
        $this->TreatmentCancel->PlaceHolder = RemoveHtml($this->TreatmentCancel->caption());

        // Reason
        $this->Reason->EditAttrs["class"] = "form-control";
        $this->Reason->EditCustomAttributes = "";
        $this->Reason->EditValue = $this->Reason->CurrentValue;
        $this->Reason->PlaceHolder = RemoveHtml($this->Reason->caption());

        // ProgesteroneAdmin
        $this->ProgesteroneAdmin->EditAttrs["class"] = "form-control";
        $this->ProgesteroneAdmin->EditCustomAttributes = "";
        if (!$this->ProgesteroneAdmin->Raw) {
            $this->ProgesteroneAdmin->CurrentValue = HtmlDecode($this->ProgesteroneAdmin->CurrentValue);
        }
        $this->ProgesteroneAdmin->EditValue = $this->ProgesteroneAdmin->CurrentValue;
        $this->ProgesteroneAdmin->PlaceHolder = RemoveHtml($this->ProgesteroneAdmin->caption());

        // ProgesteroneStart
        $this->ProgesteroneStart->EditAttrs["class"] = "form-control";
        $this->ProgesteroneStart->EditCustomAttributes = "";
        if (!$this->ProgesteroneStart->Raw) {
            $this->ProgesteroneStart->CurrentValue = HtmlDecode($this->ProgesteroneStart->CurrentValue);
        }
        $this->ProgesteroneStart->EditValue = $this->ProgesteroneStart->CurrentValue;
        $this->ProgesteroneStart->PlaceHolder = RemoveHtml($this->ProgesteroneStart->caption());

        // ProgesteroneDose
        $this->ProgesteroneDose->EditAttrs["class"] = "form-control";
        $this->ProgesteroneDose->EditCustomAttributes = "";
        if (!$this->ProgesteroneDose->Raw) {
            $this->ProgesteroneDose->CurrentValue = HtmlDecode($this->ProgesteroneDose->CurrentValue);
        }
        $this->ProgesteroneDose->EditValue = $this->ProgesteroneDose->CurrentValue;
        $this->ProgesteroneDose->PlaceHolder = RemoveHtml($this->ProgesteroneDose->caption());

        // Projectron
        $this->Projectron->EditCustomAttributes = "";
        $this->Projectron->EditValue = $this->Projectron->options(false);
        $this->Projectron->PlaceHolder = RemoveHtml($this->Projectron->caption());

        // StChDate14
        $this->StChDate14->EditAttrs["class"] = "form-control";
        $this->StChDate14->EditCustomAttributes = "";
        $this->StChDate14->EditValue = FormatDateTime($this->StChDate14->CurrentValue, 7);
        $this->StChDate14->PlaceHolder = RemoveHtml($this->StChDate14->caption());

        // StChDate15
        $this->StChDate15->EditAttrs["class"] = "form-control";
        $this->StChDate15->EditCustomAttributes = "";
        $this->StChDate15->EditValue = FormatDateTime($this->StChDate15->CurrentValue, 7);
        $this->StChDate15->PlaceHolder = RemoveHtml($this->StChDate15->caption());

        // StChDate16
        $this->StChDate16->EditAttrs["class"] = "form-control";
        $this->StChDate16->EditCustomAttributes = "";
        $this->StChDate16->EditValue = FormatDateTime($this->StChDate16->CurrentValue, 7);
        $this->StChDate16->PlaceHolder = RemoveHtml($this->StChDate16->caption());

        // StChDate17
        $this->StChDate17->EditAttrs["class"] = "form-control";
        $this->StChDate17->EditCustomAttributes = "";
        $this->StChDate17->EditValue = FormatDateTime($this->StChDate17->CurrentValue, 7);
        $this->StChDate17->PlaceHolder = RemoveHtml($this->StChDate17->caption());

        // StChDate18
        $this->StChDate18->EditAttrs["class"] = "form-control";
        $this->StChDate18->EditCustomAttributes = "";
        $this->StChDate18->EditValue = FormatDateTime($this->StChDate18->CurrentValue, 7);
        $this->StChDate18->PlaceHolder = RemoveHtml($this->StChDate18->caption());

        // StChDate19
        $this->StChDate19->EditAttrs["class"] = "form-control";
        $this->StChDate19->EditCustomAttributes = "";
        $this->StChDate19->EditValue = FormatDateTime($this->StChDate19->CurrentValue, 7);
        $this->StChDate19->PlaceHolder = RemoveHtml($this->StChDate19->caption());

        // StChDate20
        $this->StChDate20->EditAttrs["class"] = "form-control";
        $this->StChDate20->EditCustomAttributes = "";
        $this->StChDate20->EditValue = FormatDateTime($this->StChDate20->CurrentValue, 7);
        $this->StChDate20->PlaceHolder = RemoveHtml($this->StChDate20->caption());

        // StChDate21
        $this->StChDate21->EditAttrs["class"] = "form-control";
        $this->StChDate21->EditCustomAttributes = "";
        $this->StChDate21->EditValue = FormatDateTime($this->StChDate21->CurrentValue, 7);
        $this->StChDate21->PlaceHolder = RemoveHtml($this->StChDate21->caption());

        // StChDate22
        $this->StChDate22->EditAttrs["class"] = "form-control";
        $this->StChDate22->EditCustomAttributes = "";
        $this->StChDate22->EditValue = FormatDateTime($this->StChDate22->CurrentValue, 7);
        $this->StChDate22->PlaceHolder = RemoveHtml($this->StChDate22->caption());

        // StChDate23
        $this->StChDate23->EditAttrs["class"] = "form-control";
        $this->StChDate23->EditCustomAttributes = "";
        $this->StChDate23->EditValue = FormatDateTime($this->StChDate23->CurrentValue, 7);
        $this->StChDate23->PlaceHolder = RemoveHtml($this->StChDate23->caption());

        // StChDate24
        $this->StChDate24->EditAttrs["class"] = "form-control";
        $this->StChDate24->EditCustomAttributes = "";
        $this->StChDate24->EditValue = FormatDateTime($this->StChDate24->CurrentValue, 7);
        $this->StChDate24->PlaceHolder = RemoveHtml($this->StChDate24->caption());

        // StChDate25
        $this->StChDate25->EditAttrs["class"] = "form-control";
        $this->StChDate25->EditCustomAttributes = "";
        $this->StChDate25->EditValue = FormatDateTime($this->StChDate25->CurrentValue, 7);
        $this->StChDate25->PlaceHolder = RemoveHtml($this->StChDate25->caption());

        // CycleDay14
        $this->CycleDay14->EditAttrs["class"] = "form-control";
        $this->CycleDay14->EditCustomAttributes = "";
        if (!$this->CycleDay14->Raw) {
            $this->CycleDay14->CurrentValue = HtmlDecode($this->CycleDay14->CurrentValue);
        }
        $this->CycleDay14->EditValue = $this->CycleDay14->CurrentValue;
        $this->CycleDay14->PlaceHolder = RemoveHtml($this->CycleDay14->caption());

        // CycleDay15
        $this->CycleDay15->EditAttrs["class"] = "form-control";
        $this->CycleDay15->EditCustomAttributes = "";
        if (!$this->CycleDay15->Raw) {
            $this->CycleDay15->CurrentValue = HtmlDecode($this->CycleDay15->CurrentValue);
        }
        $this->CycleDay15->EditValue = $this->CycleDay15->CurrentValue;
        $this->CycleDay15->PlaceHolder = RemoveHtml($this->CycleDay15->caption());

        // CycleDay16
        $this->CycleDay16->EditAttrs["class"] = "form-control";
        $this->CycleDay16->EditCustomAttributes = "";
        if (!$this->CycleDay16->Raw) {
            $this->CycleDay16->CurrentValue = HtmlDecode($this->CycleDay16->CurrentValue);
        }
        $this->CycleDay16->EditValue = $this->CycleDay16->CurrentValue;
        $this->CycleDay16->PlaceHolder = RemoveHtml($this->CycleDay16->caption());

        // CycleDay17
        $this->CycleDay17->EditAttrs["class"] = "form-control";
        $this->CycleDay17->EditCustomAttributes = "";
        if (!$this->CycleDay17->Raw) {
            $this->CycleDay17->CurrentValue = HtmlDecode($this->CycleDay17->CurrentValue);
        }
        $this->CycleDay17->EditValue = $this->CycleDay17->CurrentValue;
        $this->CycleDay17->PlaceHolder = RemoveHtml($this->CycleDay17->caption());

        // CycleDay18
        $this->CycleDay18->EditAttrs["class"] = "form-control";
        $this->CycleDay18->EditCustomAttributes = "";
        if (!$this->CycleDay18->Raw) {
            $this->CycleDay18->CurrentValue = HtmlDecode($this->CycleDay18->CurrentValue);
        }
        $this->CycleDay18->EditValue = $this->CycleDay18->CurrentValue;
        $this->CycleDay18->PlaceHolder = RemoveHtml($this->CycleDay18->caption());

        // CycleDay19
        $this->CycleDay19->EditAttrs["class"] = "form-control";
        $this->CycleDay19->EditCustomAttributes = "";
        if (!$this->CycleDay19->Raw) {
            $this->CycleDay19->CurrentValue = HtmlDecode($this->CycleDay19->CurrentValue);
        }
        $this->CycleDay19->EditValue = $this->CycleDay19->CurrentValue;
        $this->CycleDay19->PlaceHolder = RemoveHtml($this->CycleDay19->caption());

        // CycleDay20
        $this->CycleDay20->EditAttrs["class"] = "form-control";
        $this->CycleDay20->EditCustomAttributes = "";
        if (!$this->CycleDay20->Raw) {
            $this->CycleDay20->CurrentValue = HtmlDecode($this->CycleDay20->CurrentValue);
        }
        $this->CycleDay20->EditValue = $this->CycleDay20->CurrentValue;
        $this->CycleDay20->PlaceHolder = RemoveHtml($this->CycleDay20->caption());

        // CycleDay21
        $this->CycleDay21->EditAttrs["class"] = "form-control";
        $this->CycleDay21->EditCustomAttributes = "";
        if (!$this->CycleDay21->Raw) {
            $this->CycleDay21->CurrentValue = HtmlDecode($this->CycleDay21->CurrentValue);
        }
        $this->CycleDay21->EditValue = $this->CycleDay21->CurrentValue;
        $this->CycleDay21->PlaceHolder = RemoveHtml($this->CycleDay21->caption());

        // CycleDay22
        $this->CycleDay22->EditAttrs["class"] = "form-control";
        $this->CycleDay22->EditCustomAttributes = "";
        if (!$this->CycleDay22->Raw) {
            $this->CycleDay22->CurrentValue = HtmlDecode($this->CycleDay22->CurrentValue);
        }
        $this->CycleDay22->EditValue = $this->CycleDay22->CurrentValue;
        $this->CycleDay22->PlaceHolder = RemoveHtml($this->CycleDay22->caption());

        // CycleDay23
        $this->CycleDay23->EditAttrs["class"] = "form-control";
        $this->CycleDay23->EditCustomAttributes = "";
        if (!$this->CycleDay23->Raw) {
            $this->CycleDay23->CurrentValue = HtmlDecode($this->CycleDay23->CurrentValue);
        }
        $this->CycleDay23->EditValue = $this->CycleDay23->CurrentValue;
        $this->CycleDay23->PlaceHolder = RemoveHtml($this->CycleDay23->caption());

        // CycleDay24
        $this->CycleDay24->EditAttrs["class"] = "form-control";
        $this->CycleDay24->EditCustomAttributes = "";
        if (!$this->CycleDay24->Raw) {
            $this->CycleDay24->CurrentValue = HtmlDecode($this->CycleDay24->CurrentValue);
        }
        $this->CycleDay24->EditValue = $this->CycleDay24->CurrentValue;
        $this->CycleDay24->PlaceHolder = RemoveHtml($this->CycleDay24->caption());

        // CycleDay25
        $this->CycleDay25->EditAttrs["class"] = "form-control";
        $this->CycleDay25->EditCustomAttributes = "";
        if (!$this->CycleDay25->Raw) {
            $this->CycleDay25->CurrentValue = HtmlDecode($this->CycleDay25->CurrentValue);
        }
        $this->CycleDay25->EditValue = $this->CycleDay25->CurrentValue;
        $this->CycleDay25->PlaceHolder = RemoveHtml($this->CycleDay25->caption());

        // StimulationDay14
        $this->StimulationDay14->EditAttrs["class"] = "form-control";
        $this->StimulationDay14->EditCustomAttributes = "";
        if (!$this->StimulationDay14->Raw) {
            $this->StimulationDay14->CurrentValue = HtmlDecode($this->StimulationDay14->CurrentValue);
        }
        $this->StimulationDay14->EditValue = $this->StimulationDay14->CurrentValue;
        $this->StimulationDay14->PlaceHolder = RemoveHtml($this->StimulationDay14->caption());

        // StimulationDay15
        $this->StimulationDay15->EditAttrs["class"] = "form-control";
        $this->StimulationDay15->EditCustomAttributes = "";
        if (!$this->StimulationDay15->Raw) {
            $this->StimulationDay15->CurrentValue = HtmlDecode($this->StimulationDay15->CurrentValue);
        }
        $this->StimulationDay15->EditValue = $this->StimulationDay15->CurrentValue;
        $this->StimulationDay15->PlaceHolder = RemoveHtml($this->StimulationDay15->caption());

        // StimulationDay16
        $this->StimulationDay16->EditAttrs["class"] = "form-control";
        $this->StimulationDay16->EditCustomAttributes = "";
        if (!$this->StimulationDay16->Raw) {
            $this->StimulationDay16->CurrentValue = HtmlDecode($this->StimulationDay16->CurrentValue);
        }
        $this->StimulationDay16->EditValue = $this->StimulationDay16->CurrentValue;
        $this->StimulationDay16->PlaceHolder = RemoveHtml($this->StimulationDay16->caption());

        // StimulationDay17
        $this->StimulationDay17->EditAttrs["class"] = "form-control";
        $this->StimulationDay17->EditCustomAttributes = "";
        if (!$this->StimulationDay17->Raw) {
            $this->StimulationDay17->CurrentValue = HtmlDecode($this->StimulationDay17->CurrentValue);
        }
        $this->StimulationDay17->EditValue = $this->StimulationDay17->CurrentValue;
        $this->StimulationDay17->PlaceHolder = RemoveHtml($this->StimulationDay17->caption());

        // StimulationDay18
        $this->StimulationDay18->EditAttrs["class"] = "form-control";
        $this->StimulationDay18->EditCustomAttributes = "";
        if (!$this->StimulationDay18->Raw) {
            $this->StimulationDay18->CurrentValue = HtmlDecode($this->StimulationDay18->CurrentValue);
        }
        $this->StimulationDay18->EditValue = $this->StimulationDay18->CurrentValue;
        $this->StimulationDay18->PlaceHolder = RemoveHtml($this->StimulationDay18->caption());

        // StimulationDay19
        $this->StimulationDay19->EditAttrs["class"] = "form-control";
        $this->StimulationDay19->EditCustomAttributes = "";
        if (!$this->StimulationDay19->Raw) {
            $this->StimulationDay19->CurrentValue = HtmlDecode($this->StimulationDay19->CurrentValue);
        }
        $this->StimulationDay19->EditValue = $this->StimulationDay19->CurrentValue;
        $this->StimulationDay19->PlaceHolder = RemoveHtml($this->StimulationDay19->caption());

        // StimulationDay20
        $this->StimulationDay20->EditAttrs["class"] = "form-control";
        $this->StimulationDay20->EditCustomAttributes = "";
        if (!$this->StimulationDay20->Raw) {
            $this->StimulationDay20->CurrentValue = HtmlDecode($this->StimulationDay20->CurrentValue);
        }
        $this->StimulationDay20->EditValue = $this->StimulationDay20->CurrentValue;
        $this->StimulationDay20->PlaceHolder = RemoveHtml($this->StimulationDay20->caption());

        // StimulationDay21
        $this->StimulationDay21->EditAttrs["class"] = "form-control";
        $this->StimulationDay21->EditCustomAttributes = "";
        if (!$this->StimulationDay21->Raw) {
            $this->StimulationDay21->CurrentValue = HtmlDecode($this->StimulationDay21->CurrentValue);
        }
        $this->StimulationDay21->EditValue = $this->StimulationDay21->CurrentValue;
        $this->StimulationDay21->PlaceHolder = RemoveHtml($this->StimulationDay21->caption());

        // StimulationDay22
        $this->StimulationDay22->EditAttrs["class"] = "form-control";
        $this->StimulationDay22->EditCustomAttributes = "";
        if (!$this->StimulationDay22->Raw) {
            $this->StimulationDay22->CurrentValue = HtmlDecode($this->StimulationDay22->CurrentValue);
        }
        $this->StimulationDay22->EditValue = $this->StimulationDay22->CurrentValue;
        $this->StimulationDay22->PlaceHolder = RemoveHtml($this->StimulationDay22->caption());

        // StimulationDay23
        $this->StimulationDay23->EditAttrs["class"] = "form-control";
        $this->StimulationDay23->EditCustomAttributes = "";
        if (!$this->StimulationDay23->Raw) {
            $this->StimulationDay23->CurrentValue = HtmlDecode($this->StimulationDay23->CurrentValue);
        }
        $this->StimulationDay23->EditValue = $this->StimulationDay23->CurrentValue;
        $this->StimulationDay23->PlaceHolder = RemoveHtml($this->StimulationDay23->caption());

        // StimulationDay24
        $this->StimulationDay24->EditAttrs["class"] = "form-control";
        $this->StimulationDay24->EditCustomAttributes = "";
        if (!$this->StimulationDay24->Raw) {
            $this->StimulationDay24->CurrentValue = HtmlDecode($this->StimulationDay24->CurrentValue);
        }
        $this->StimulationDay24->EditValue = $this->StimulationDay24->CurrentValue;
        $this->StimulationDay24->PlaceHolder = RemoveHtml($this->StimulationDay24->caption());

        // StimulationDay25
        $this->StimulationDay25->EditAttrs["class"] = "form-control";
        $this->StimulationDay25->EditCustomAttributes = "";
        if (!$this->StimulationDay25->Raw) {
            $this->StimulationDay25->CurrentValue = HtmlDecode($this->StimulationDay25->CurrentValue);
        }
        $this->StimulationDay25->EditValue = $this->StimulationDay25->CurrentValue;
        $this->StimulationDay25->PlaceHolder = RemoveHtml($this->StimulationDay25->caption());

        // Tablet14
        $this->Tablet14->EditAttrs["class"] = "form-control";
        $this->Tablet14->EditCustomAttributes = "";
        $this->Tablet14->PlaceHolder = RemoveHtml($this->Tablet14->caption());

        // Tablet15
        $this->Tablet15->EditAttrs["class"] = "form-control";
        $this->Tablet15->EditCustomAttributes = "";
        $this->Tablet15->PlaceHolder = RemoveHtml($this->Tablet15->caption());

        // Tablet16
        $this->Tablet16->EditAttrs["class"] = "form-control";
        $this->Tablet16->EditCustomAttributes = "";
        $this->Tablet16->PlaceHolder = RemoveHtml($this->Tablet16->caption());

        // Tablet17
        $this->Tablet17->EditAttrs["class"] = "form-control";
        $this->Tablet17->EditCustomAttributes = "";
        $this->Tablet17->PlaceHolder = RemoveHtml($this->Tablet17->caption());

        // Tablet18
        $this->Tablet18->EditAttrs["class"] = "form-control";
        $this->Tablet18->EditCustomAttributes = "";
        $this->Tablet18->PlaceHolder = RemoveHtml($this->Tablet18->caption());

        // Tablet19
        $this->Tablet19->EditAttrs["class"] = "form-control";
        $this->Tablet19->EditCustomAttributes = "";
        $this->Tablet19->PlaceHolder = RemoveHtml($this->Tablet19->caption());

        // Tablet20
        $this->Tablet20->EditAttrs["class"] = "form-control";
        $this->Tablet20->EditCustomAttributes = "";
        $this->Tablet20->PlaceHolder = RemoveHtml($this->Tablet20->caption());

        // Tablet21
        $this->Tablet21->EditAttrs["class"] = "form-control";
        $this->Tablet21->EditCustomAttributes = "";
        $this->Tablet21->PlaceHolder = RemoveHtml($this->Tablet21->caption());

        // Tablet22
        $this->Tablet22->EditAttrs["class"] = "form-control";
        $this->Tablet22->EditCustomAttributes = "";
        $this->Tablet22->PlaceHolder = RemoveHtml($this->Tablet22->caption());

        // Tablet23
        $this->Tablet23->EditAttrs["class"] = "form-control";
        $this->Tablet23->EditCustomAttributes = "";
        $this->Tablet23->PlaceHolder = RemoveHtml($this->Tablet23->caption());

        // Tablet24
        $this->Tablet24->EditAttrs["class"] = "form-control";
        $this->Tablet24->EditCustomAttributes = "";
        $this->Tablet24->PlaceHolder = RemoveHtml($this->Tablet24->caption());

        // Tablet25
        $this->Tablet25->EditAttrs["class"] = "form-control";
        $this->Tablet25->EditCustomAttributes = "";
        $this->Tablet25->PlaceHolder = RemoveHtml($this->Tablet25->caption());

        // RFSH14
        $this->RFSH14->EditAttrs["class"] = "form-control";
        $this->RFSH14->EditCustomAttributes = "";
        $this->RFSH14->PlaceHolder = RemoveHtml($this->RFSH14->caption());

        // RFSH15
        $this->RFSH15->EditAttrs["class"] = "form-control";
        $this->RFSH15->EditCustomAttributes = "";
        $this->RFSH15->PlaceHolder = RemoveHtml($this->RFSH15->caption());

        // RFSH16
        $this->RFSH16->EditAttrs["class"] = "form-control";
        $this->RFSH16->EditCustomAttributes = "";
        $this->RFSH16->PlaceHolder = RemoveHtml($this->RFSH16->caption());

        // RFSH17
        $this->RFSH17->EditAttrs["class"] = "form-control";
        $this->RFSH17->EditCustomAttributes = "";
        $this->RFSH17->PlaceHolder = RemoveHtml($this->RFSH17->caption());

        // RFSH18
        $this->RFSH18->EditAttrs["class"] = "form-control";
        $this->RFSH18->EditCustomAttributes = "";
        $this->RFSH18->PlaceHolder = RemoveHtml($this->RFSH18->caption());

        // RFSH19
        $this->RFSH19->EditAttrs["class"] = "form-control";
        $this->RFSH19->EditCustomAttributes = "";
        $this->RFSH19->PlaceHolder = RemoveHtml($this->RFSH19->caption());

        // RFSH20
        $this->RFSH20->EditAttrs["class"] = "form-control";
        $this->RFSH20->EditCustomAttributes = "";
        $this->RFSH20->PlaceHolder = RemoveHtml($this->RFSH20->caption());

        // RFSH21
        $this->RFSH21->EditAttrs["class"] = "form-control";
        $this->RFSH21->EditCustomAttributes = "";
        $this->RFSH21->PlaceHolder = RemoveHtml($this->RFSH21->caption());

        // RFSH22
        $this->RFSH22->EditAttrs["class"] = "form-control";
        $this->RFSH22->EditCustomAttributes = "";
        $this->RFSH22->PlaceHolder = RemoveHtml($this->RFSH22->caption());

        // RFSH23
        $this->RFSH23->EditAttrs["class"] = "form-control";
        $this->RFSH23->EditCustomAttributes = "";
        $this->RFSH23->PlaceHolder = RemoveHtml($this->RFSH23->caption());

        // RFSH24
        $this->RFSH24->EditAttrs["class"] = "form-control";
        $this->RFSH24->EditCustomAttributes = "";
        $this->RFSH24->PlaceHolder = RemoveHtml($this->RFSH24->caption());

        // RFSH25
        $this->RFSH25->EditAttrs["class"] = "form-control";
        $this->RFSH25->EditCustomAttributes = "";
        $this->RFSH25->PlaceHolder = RemoveHtml($this->RFSH25->caption());

        // HMG14
        $this->HMG14->EditAttrs["class"] = "form-control";
        $this->HMG14->EditCustomAttributes = "";
        $this->HMG14->PlaceHolder = RemoveHtml($this->HMG14->caption());

        // HMG15
        $this->HMG15->EditAttrs["class"] = "form-control";
        $this->HMG15->EditCustomAttributes = "";
        $this->HMG15->PlaceHolder = RemoveHtml($this->HMG15->caption());

        // HMG16
        $this->HMG16->EditAttrs["class"] = "form-control";
        $this->HMG16->EditCustomAttributes = "";
        $this->HMG16->PlaceHolder = RemoveHtml($this->HMG16->caption());

        // HMG17
        $this->HMG17->EditAttrs["class"] = "form-control";
        $this->HMG17->EditCustomAttributes = "";
        $this->HMG17->PlaceHolder = RemoveHtml($this->HMG17->caption());

        // HMG18
        $this->HMG18->EditAttrs["class"] = "form-control";
        $this->HMG18->EditCustomAttributes = "";
        $this->HMG18->PlaceHolder = RemoveHtml($this->HMG18->caption());

        // HMG19
        $this->HMG19->EditAttrs["class"] = "form-control";
        $this->HMG19->EditCustomAttributes = "";
        $this->HMG19->PlaceHolder = RemoveHtml($this->HMG19->caption());

        // HMG20
        $this->HMG20->EditAttrs["class"] = "form-control";
        $this->HMG20->EditCustomAttributes = "";
        $this->HMG20->PlaceHolder = RemoveHtml($this->HMG20->caption());

        // HMG21
        $this->HMG21->EditAttrs["class"] = "form-control";
        $this->HMG21->EditCustomAttributes = "";
        $this->HMG21->PlaceHolder = RemoveHtml($this->HMG21->caption());

        // HMG22
        $this->HMG22->EditAttrs["class"] = "form-control";
        $this->HMG22->EditCustomAttributes = "";
        $this->HMG22->PlaceHolder = RemoveHtml($this->HMG22->caption());

        // HMG23
        $this->HMG23->EditAttrs["class"] = "form-control";
        $this->HMG23->EditCustomAttributes = "";
        $this->HMG23->PlaceHolder = RemoveHtml($this->HMG23->caption());

        // HMG24
        $this->HMG24->EditAttrs["class"] = "form-control";
        $this->HMG24->EditCustomAttributes = "";
        $this->HMG24->PlaceHolder = RemoveHtml($this->HMG24->caption());

        // HMG25
        $this->HMG25->EditAttrs["class"] = "form-control";
        $this->HMG25->EditCustomAttributes = "";
        $this->HMG25->PlaceHolder = RemoveHtml($this->HMG25->caption());

        // GnRH14
        $this->GnRH14->EditAttrs["class"] = "form-control";
        $this->GnRH14->EditCustomAttributes = "";
        $this->GnRH14->PlaceHolder = RemoveHtml($this->GnRH14->caption());

        // GnRH15
        $this->GnRH15->EditAttrs["class"] = "form-control";
        $this->GnRH15->EditCustomAttributes = "";
        $this->GnRH15->PlaceHolder = RemoveHtml($this->GnRH15->caption());

        // GnRH16
        $this->GnRH16->EditAttrs["class"] = "form-control";
        $this->GnRH16->EditCustomAttributes = "";
        $this->GnRH16->PlaceHolder = RemoveHtml($this->GnRH16->caption());

        // GnRH17
        $this->GnRH17->EditAttrs["class"] = "form-control";
        $this->GnRH17->EditCustomAttributes = "";
        $this->GnRH17->PlaceHolder = RemoveHtml($this->GnRH17->caption());

        // GnRH18
        $this->GnRH18->EditAttrs["class"] = "form-control";
        $this->GnRH18->EditCustomAttributes = "";
        $this->GnRH18->PlaceHolder = RemoveHtml($this->GnRH18->caption());

        // GnRH19
        $this->GnRH19->EditAttrs["class"] = "form-control";
        $this->GnRH19->EditCustomAttributes = "";
        $this->GnRH19->PlaceHolder = RemoveHtml($this->GnRH19->caption());

        // GnRH20
        $this->GnRH20->EditAttrs["class"] = "form-control";
        $this->GnRH20->EditCustomAttributes = "";
        $this->GnRH20->PlaceHolder = RemoveHtml($this->GnRH20->caption());

        // GnRH21
        $this->GnRH21->EditAttrs["class"] = "form-control";
        $this->GnRH21->EditCustomAttributes = "";
        $this->GnRH21->PlaceHolder = RemoveHtml($this->GnRH21->caption());

        // GnRH22
        $this->GnRH22->EditAttrs["class"] = "form-control";
        $this->GnRH22->EditCustomAttributes = "";
        $this->GnRH22->PlaceHolder = RemoveHtml($this->GnRH22->caption());

        // GnRH23
        $this->GnRH23->EditAttrs["class"] = "form-control";
        $this->GnRH23->EditCustomAttributes = "";
        $this->GnRH23->PlaceHolder = RemoveHtml($this->GnRH23->caption());

        // GnRH24
        $this->GnRH24->EditAttrs["class"] = "form-control";
        $this->GnRH24->EditCustomAttributes = "";
        $this->GnRH24->PlaceHolder = RemoveHtml($this->GnRH24->caption());

        // GnRH25
        $this->GnRH25->EditAttrs["class"] = "form-control";
        $this->GnRH25->EditCustomAttributes = "";
        $this->GnRH25->PlaceHolder = RemoveHtml($this->GnRH25->caption());

        // P414
        $this->P414->EditAttrs["class"] = "form-control";
        $this->P414->EditCustomAttributes = "";
        if (!$this->P414->Raw) {
            $this->P414->CurrentValue = HtmlDecode($this->P414->CurrentValue);
        }
        $this->P414->EditValue = $this->P414->CurrentValue;
        $this->P414->PlaceHolder = RemoveHtml($this->P414->caption());

        // P415
        $this->P415->EditAttrs["class"] = "form-control";
        $this->P415->EditCustomAttributes = "";
        if (!$this->P415->Raw) {
            $this->P415->CurrentValue = HtmlDecode($this->P415->CurrentValue);
        }
        $this->P415->EditValue = $this->P415->CurrentValue;
        $this->P415->PlaceHolder = RemoveHtml($this->P415->caption());

        // P416
        $this->P416->EditAttrs["class"] = "form-control";
        $this->P416->EditCustomAttributes = "";
        if (!$this->P416->Raw) {
            $this->P416->CurrentValue = HtmlDecode($this->P416->CurrentValue);
        }
        $this->P416->EditValue = $this->P416->CurrentValue;
        $this->P416->PlaceHolder = RemoveHtml($this->P416->caption());

        // P417
        $this->P417->EditAttrs["class"] = "form-control";
        $this->P417->EditCustomAttributes = "";
        if (!$this->P417->Raw) {
            $this->P417->CurrentValue = HtmlDecode($this->P417->CurrentValue);
        }
        $this->P417->EditValue = $this->P417->CurrentValue;
        $this->P417->PlaceHolder = RemoveHtml($this->P417->caption());

        // P418
        $this->P418->EditAttrs["class"] = "form-control";
        $this->P418->EditCustomAttributes = "";
        if (!$this->P418->Raw) {
            $this->P418->CurrentValue = HtmlDecode($this->P418->CurrentValue);
        }
        $this->P418->EditValue = $this->P418->CurrentValue;
        $this->P418->PlaceHolder = RemoveHtml($this->P418->caption());

        // P419
        $this->P419->EditAttrs["class"] = "form-control";
        $this->P419->EditCustomAttributes = "";
        if (!$this->P419->Raw) {
            $this->P419->CurrentValue = HtmlDecode($this->P419->CurrentValue);
        }
        $this->P419->EditValue = $this->P419->CurrentValue;
        $this->P419->PlaceHolder = RemoveHtml($this->P419->caption());

        // P420
        $this->P420->EditAttrs["class"] = "form-control";
        $this->P420->EditCustomAttributes = "";
        if (!$this->P420->Raw) {
            $this->P420->CurrentValue = HtmlDecode($this->P420->CurrentValue);
        }
        $this->P420->EditValue = $this->P420->CurrentValue;
        $this->P420->PlaceHolder = RemoveHtml($this->P420->caption());

        // P421
        $this->P421->EditAttrs["class"] = "form-control";
        $this->P421->EditCustomAttributes = "";
        if (!$this->P421->Raw) {
            $this->P421->CurrentValue = HtmlDecode($this->P421->CurrentValue);
        }
        $this->P421->EditValue = $this->P421->CurrentValue;
        $this->P421->PlaceHolder = RemoveHtml($this->P421->caption());

        // P422
        $this->P422->EditAttrs["class"] = "form-control";
        $this->P422->EditCustomAttributes = "";
        if (!$this->P422->Raw) {
            $this->P422->CurrentValue = HtmlDecode($this->P422->CurrentValue);
        }
        $this->P422->EditValue = $this->P422->CurrentValue;
        $this->P422->PlaceHolder = RemoveHtml($this->P422->caption());

        // P423
        $this->P423->EditAttrs["class"] = "form-control";
        $this->P423->EditCustomAttributes = "";
        if (!$this->P423->Raw) {
            $this->P423->CurrentValue = HtmlDecode($this->P423->CurrentValue);
        }
        $this->P423->EditValue = $this->P423->CurrentValue;
        $this->P423->PlaceHolder = RemoveHtml($this->P423->caption());

        // P424
        $this->P424->EditAttrs["class"] = "form-control";
        $this->P424->EditCustomAttributes = "";
        if (!$this->P424->Raw) {
            $this->P424->CurrentValue = HtmlDecode($this->P424->CurrentValue);
        }
        $this->P424->EditValue = $this->P424->CurrentValue;
        $this->P424->PlaceHolder = RemoveHtml($this->P424->caption());

        // P425
        $this->P425->EditAttrs["class"] = "form-control";
        $this->P425->EditCustomAttributes = "";
        if (!$this->P425->Raw) {
            $this->P425->CurrentValue = HtmlDecode($this->P425->CurrentValue);
        }
        $this->P425->EditValue = $this->P425->CurrentValue;
        $this->P425->PlaceHolder = RemoveHtml($this->P425->caption());

        // USGRt14
        $this->USGRt14->EditAttrs["class"] = "form-control";
        $this->USGRt14->EditCustomAttributes = "";
        if (!$this->USGRt14->Raw) {
            $this->USGRt14->CurrentValue = HtmlDecode($this->USGRt14->CurrentValue);
        }
        $this->USGRt14->EditValue = $this->USGRt14->CurrentValue;
        $this->USGRt14->PlaceHolder = RemoveHtml($this->USGRt14->caption());

        // USGRt15
        $this->USGRt15->EditAttrs["class"] = "form-control";
        $this->USGRt15->EditCustomAttributes = "";
        if (!$this->USGRt15->Raw) {
            $this->USGRt15->CurrentValue = HtmlDecode($this->USGRt15->CurrentValue);
        }
        $this->USGRt15->EditValue = $this->USGRt15->CurrentValue;
        $this->USGRt15->PlaceHolder = RemoveHtml($this->USGRt15->caption());

        // USGRt16
        $this->USGRt16->EditAttrs["class"] = "form-control";
        $this->USGRt16->EditCustomAttributes = "";
        if (!$this->USGRt16->Raw) {
            $this->USGRt16->CurrentValue = HtmlDecode($this->USGRt16->CurrentValue);
        }
        $this->USGRt16->EditValue = $this->USGRt16->CurrentValue;
        $this->USGRt16->PlaceHolder = RemoveHtml($this->USGRt16->caption());

        // USGRt17
        $this->USGRt17->EditAttrs["class"] = "form-control";
        $this->USGRt17->EditCustomAttributes = "";
        if (!$this->USGRt17->Raw) {
            $this->USGRt17->CurrentValue = HtmlDecode($this->USGRt17->CurrentValue);
        }
        $this->USGRt17->EditValue = $this->USGRt17->CurrentValue;
        $this->USGRt17->PlaceHolder = RemoveHtml($this->USGRt17->caption());

        // USGRt18
        $this->USGRt18->EditAttrs["class"] = "form-control";
        $this->USGRt18->EditCustomAttributes = "";
        if (!$this->USGRt18->Raw) {
            $this->USGRt18->CurrentValue = HtmlDecode($this->USGRt18->CurrentValue);
        }
        $this->USGRt18->EditValue = $this->USGRt18->CurrentValue;
        $this->USGRt18->PlaceHolder = RemoveHtml($this->USGRt18->caption());

        // USGRt19
        $this->USGRt19->EditAttrs["class"] = "form-control";
        $this->USGRt19->EditCustomAttributes = "";
        if (!$this->USGRt19->Raw) {
            $this->USGRt19->CurrentValue = HtmlDecode($this->USGRt19->CurrentValue);
        }
        $this->USGRt19->EditValue = $this->USGRt19->CurrentValue;
        $this->USGRt19->PlaceHolder = RemoveHtml($this->USGRt19->caption());

        // USGRt20
        $this->USGRt20->EditAttrs["class"] = "form-control";
        $this->USGRt20->EditCustomAttributes = "";
        if (!$this->USGRt20->Raw) {
            $this->USGRt20->CurrentValue = HtmlDecode($this->USGRt20->CurrentValue);
        }
        $this->USGRt20->EditValue = $this->USGRt20->CurrentValue;
        $this->USGRt20->PlaceHolder = RemoveHtml($this->USGRt20->caption());

        // USGRt21
        $this->USGRt21->EditAttrs["class"] = "form-control";
        $this->USGRt21->EditCustomAttributes = "";
        if (!$this->USGRt21->Raw) {
            $this->USGRt21->CurrentValue = HtmlDecode($this->USGRt21->CurrentValue);
        }
        $this->USGRt21->EditValue = $this->USGRt21->CurrentValue;
        $this->USGRt21->PlaceHolder = RemoveHtml($this->USGRt21->caption());

        // USGRt22
        $this->USGRt22->EditAttrs["class"] = "form-control";
        $this->USGRt22->EditCustomAttributes = "";
        if (!$this->USGRt22->Raw) {
            $this->USGRt22->CurrentValue = HtmlDecode($this->USGRt22->CurrentValue);
        }
        $this->USGRt22->EditValue = $this->USGRt22->CurrentValue;
        $this->USGRt22->PlaceHolder = RemoveHtml($this->USGRt22->caption());

        // USGRt23
        $this->USGRt23->EditAttrs["class"] = "form-control";
        $this->USGRt23->EditCustomAttributes = "";
        if (!$this->USGRt23->Raw) {
            $this->USGRt23->CurrentValue = HtmlDecode($this->USGRt23->CurrentValue);
        }
        $this->USGRt23->EditValue = $this->USGRt23->CurrentValue;
        $this->USGRt23->PlaceHolder = RemoveHtml($this->USGRt23->caption());

        // USGRt24
        $this->USGRt24->EditAttrs["class"] = "form-control";
        $this->USGRt24->EditCustomAttributes = "";
        if (!$this->USGRt24->Raw) {
            $this->USGRt24->CurrentValue = HtmlDecode($this->USGRt24->CurrentValue);
        }
        $this->USGRt24->EditValue = $this->USGRt24->CurrentValue;
        $this->USGRt24->PlaceHolder = RemoveHtml($this->USGRt24->caption());

        // USGRt25
        $this->USGRt25->EditAttrs["class"] = "form-control";
        $this->USGRt25->EditCustomAttributes = "";
        if (!$this->USGRt25->Raw) {
            $this->USGRt25->CurrentValue = HtmlDecode($this->USGRt25->CurrentValue);
        }
        $this->USGRt25->EditValue = $this->USGRt25->CurrentValue;
        $this->USGRt25->PlaceHolder = RemoveHtml($this->USGRt25->caption());

        // USGLt14
        $this->USGLt14->EditAttrs["class"] = "form-control";
        $this->USGLt14->EditCustomAttributes = "";
        if (!$this->USGLt14->Raw) {
            $this->USGLt14->CurrentValue = HtmlDecode($this->USGLt14->CurrentValue);
        }
        $this->USGLt14->EditValue = $this->USGLt14->CurrentValue;
        $this->USGLt14->PlaceHolder = RemoveHtml($this->USGLt14->caption());

        // USGLt15
        $this->USGLt15->EditAttrs["class"] = "form-control";
        $this->USGLt15->EditCustomAttributes = "";
        if (!$this->USGLt15->Raw) {
            $this->USGLt15->CurrentValue = HtmlDecode($this->USGLt15->CurrentValue);
        }
        $this->USGLt15->EditValue = $this->USGLt15->CurrentValue;
        $this->USGLt15->PlaceHolder = RemoveHtml($this->USGLt15->caption());

        // USGLt16
        $this->USGLt16->EditAttrs["class"] = "form-control";
        $this->USGLt16->EditCustomAttributes = "";
        if (!$this->USGLt16->Raw) {
            $this->USGLt16->CurrentValue = HtmlDecode($this->USGLt16->CurrentValue);
        }
        $this->USGLt16->EditValue = $this->USGLt16->CurrentValue;
        $this->USGLt16->PlaceHolder = RemoveHtml($this->USGLt16->caption());

        // USGLt17
        $this->USGLt17->EditAttrs["class"] = "form-control";
        $this->USGLt17->EditCustomAttributes = "";
        if (!$this->USGLt17->Raw) {
            $this->USGLt17->CurrentValue = HtmlDecode($this->USGLt17->CurrentValue);
        }
        $this->USGLt17->EditValue = $this->USGLt17->CurrentValue;
        $this->USGLt17->PlaceHolder = RemoveHtml($this->USGLt17->caption());

        // USGLt18
        $this->USGLt18->EditAttrs["class"] = "form-control";
        $this->USGLt18->EditCustomAttributes = "";
        if (!$this->USGLt18->Raw) {
            $this->USGLt18->CurrentValue = HtmlDecode($this->USGLt18->CurrentValue);
        }
        $this->USGLt18->EditValue = $this->USGLt18->CurrentValue;
        $this->USGLt18->PlaceHolder = RemoveHtml($this->USGLt18->caption());

        // USGLt19
        $this->USGLt19->EditAttrs["class"] = "form-control";
        $this->USGLt19->EditCustomAttributes = "";
        if (!$this->USGLt19->Raw) {
            $this->USGLt19->CurrentValue = HtmlDecode($this->USGLt19->CurrentValue);
        }
        $this->USGLt19->EditValue = $this->USGLt19->CurrentValue;
        $this->USGLt19->PlaceHolder = RemoveHtml($this->USGLt19->caption());

        // USGLt20
        $this->USGLt20->EditAttrs["class"] = "form-control";
        $this->USGLt20->EditCustomAttributes = "";
        if (!$this->USGLt20->Raw) {
            $this->USGLt20->CurrentValue = HtmlDecode($this->USGLt20->CurrentValue);
        }
        $this->USGLt20->EditValue = $this->USGLt20->CurrentValue;
        $this->USGLt20->PlaceHolder = RemoveHtml($this->USGLt20->caption());

        // USGLt21
        $this->USGLt21->EditAttrs["class"] = "form-control";
        $this->USGLt21->EditCustomAttributes = "";
        if (!$this->USGLt21->Raw) {
            $this->USGLt21->CurrentValue = HtmlDecode($this->USGLt21->CurrentValue);
        }
        $this->USGLt21->EditValue = $this->USGLt21->CurrentValue;
        $this->USGLt21->PlaceHolder = RemoveHtml($this->USGLt21->caption());

        // USGLt22
        $this->USGLt22->EditAttrs["class"] = "form-control";
        $this->USGLt22->EditCustomAttributes = "";
        if (!$this->USGLt22->Raw) {
            $this->USGLt22->CurrentValue = HtmlDecode($this->USGLt22->CurrentValue);
        }
        $this->USGLt22->EditValue = $this->USGLt22->CurrentValue;
        $this->USGLt22->PlaceHolder = RemoveHtml($this->USGLt22->caption());

        // USGLt23
        $this->USGLt23->EditAttrs["class"] = "form-control";
        $this->USGLt23->EditCustomAttributes = "";
        if (!$this->USGLt23->Raw) {
            $this->USGLt23->CurrentValue = HtmlDecode($this->USGLt23->CurrentValue);
        }
        $this->USGLt23->EditValue = $this->USGLt23->CurrentValue;
        $this->USGLt23->PlaceHolder = RemoveHtml($this->USGLt23->caption());

        // USGLt24
        $this->USGLt24->EditAttrs["class"] = "form-control";
        $this->USGLt24->EditCustomAttributes = "";
        if (!$this->USGLt24->Raw) {
            $this->USGLt24->CurrentValue = HtmlDecode($this->USGLt24->CurrentValue);
        }
        $this->USGLt24->EditValue = $this->USGLt24->CurrentValue;
        $this->USGLt24->PlaceHolder = RemoveHtml($this->USGLt24->caption());

        // USGLt25
        $this->USGLt25->EditAttrs["class"] = "form-control";
        $this->USGLt25->EditCustomAttributes = "";
        if (!$this->USGLt25->Raw) {
            $this->USGLt25->CurrentValue = HtmlDecode($this->USGLt25->CurrentValue);
        }
        $this->USGLt25->EditValue = $this->USGLt25->CurrentValue;
        $this->USGLt25->PlaceHolder = RemoveHtml($this->USGLt25->caption());

        // EM14
        $this->EM14->EditAttrs["class"] = "form-control";
        $this->EM14->EditCustomAttributes = "";
        if (!$this->EM14->Raw) {
            $this->EM14->CurrentValue = HtmlDecode($this->EM14->CurrentValue);
        }
        $this->EM14->EditValue = $this->EM14->CurrentValue;
        $this->EM14->PlaceHolder = RemoveHtml($this->EM14->caption());

        // EM15
        $this->EM15->EditAttrs["class"] = "form-control";
        $this->EM15->EditCustomAttributes = "";
        if (!$this->EM15->Raw) {
            $this->EM15->CurrentValue = HtmlDecode($this->EM15->CurrentValue);
        }
        $this->EM15->EditValue = $this->EM15->CurrentValue;
        $this->EM15->PlaceHolder = RemoveHtml($this->EM15->caption());

        // EM16
        $this->EM16->EditAttrs["class"] = "form-control";
        $this->EM16->EditCustomAttributes = "";
        if (!$this->EM16->Raw) {
            $this->EM16->CurrentValue = HtmlDecode($this->EM16->CurrentValue);
        }
        $this->EM16->EditValue = $this->EM16->CurrentValue;
        $this->EM16->PlaceHolder = RemoveHtml($this->EM16->caption());

        // EM17
        $this->EM17->EditAttrs["class"] = "form-control";
        $this->EM17->EditCustomAttributes = "";
        if (!$this->EM17->Raw) {
            $this->EM17->CurrentValue = HtmlDecode($this->EM17->CurrentValue);
        }
        $this->EM17->EditValue = $this->EM17->CurrentValue;
        $this->EM17->PlaceHolder = RemoveHtml($this->EM17->caption());

        // EM18
        $this->EM18->EditAttrs["class"] = "form-control";
        $this->EM18->EditCustomAttributes = "";
        if (!$this->EM18->Raw) {
            $this->EM18->CurrentValue = HtmlDecode($this->EM18->CurrentValue);
        }
        $this->EM18->EditValue = $this->EM18->CurrentValue;
        $this->EM18->PlaceHolder = RemoveHtml($this->EM18->caption());

        // EM19
        $this->EM19->EditAttrs["class"] = "form-control";
        $this->EM19->EditCustomAttributes = "";
        if (!$this->EM19->Raw) {
            $this->EM19->CurrentValue = HtmlDecode($this->EM19->CurrentValue);
        }
        $this->EM19->EditValue = $this->EM19->CurrentValue;
        $this->EM19->PlaceHolder = RemoveHtml($this->EM19->caption());

        // EM20
        $this->EM20->EditAttrs["class"] = "form-control";
        $this->EM20->EditCustomAttributes = "";
        if (!$this->EM20->Raw) {
            $this->EM20->CurrentValue = HtmlDecode($this->EM20->CurrentValue);
        }
        $this->EM20->EditValue = $this->EM20->CurrentValue;
        $this->EM20->PlaceHolder = RemoveHtml($this->EM20->caption());

        // EM21
        $this->EM21->EditAttrs["class"] = "form-control";
        $this->EM21->EditCustomAttributes = "";
        if (!$this->EM21->Raw) {
            $this->EM21->CurrentValue = HtmlDecode($this->EM21->CurrentValue);
        }
        $this->EM21->EditValue = $this->EM21->CurrentValue;
        $this->EM21->PlaceHolder = RemoveHtml($this->EM21->caption());

        // EM22
        $this->EM22->EditAttrs["class"] = "form-control";
        $this->EM22->EditCustomAttributes = "";
        if (!$this->EM22->Raw) {
            $this->EM22->CurrentValue = HtmlDecode($this->EM22->CurrentValue);
        }
        $this->EM22->EditValue = $this->EM22->CurrentValue;
        $this->EM22->PlaceHolder = RemoveHtml($this->EM22->caption());

        // EM23
        $this->EM23->EditAttrs["class"] = "form-control";
        $this->EM23->EditCustomAttributes = "";
        if (!$this->EM23->Raw) {
            $this->EM23->CurrentValue = HtmlDecode($this->EM23->CurrentValue);
        }
        $this->EM23->EditValue = $this->EM23->CurrentValue;
        $this->EM23->PlaceHolder = RemoveHtml($this->EM23->caption());

        // EM24
        $this->EM24->EditAttrs["class"] = "form-control";
        $this->EM24->EditCustomAttributes = "";
        if (!$this->EM24->Raw) {
            $this->EM24->CurrentValue = HtmlDecode($this->EM24->CurrentValue);
        }
        $this->EM24->EditValue = $this->EM24->CurrentValue;
        $this->EM24->PlaceHolder = RemoveHtml($this->EM24->caption());

        // EM25
        $this->EM25->EditAttrs["class"] = "form-control";
        $this->EM25->EditCustomAttributes = "";
        if (!$this->EM25->Raw) {
            $this->EM25->CurrentValue = HtmlDecode($this->EM25->CurrentValue);
        }
        $this->EM25->EditValue = $this->EM25->CurrentValue;
        $this->EM25->PlaceHolder = RemoveHtml($this->EM25->caption());

        // Others14
        $this->Others14->EditAttrs["class"] = "form-control";
        $this->Others14->EditCustomAttributes = "";
        if (!$this->Others14->Raw) {
            $this->Others14->CurrentValue = HtmlDecode($this->Others14->CurrentValue);
        }
        $this->Others14->EditValue = $this->Others14->CurrentValue;
        $this->Others14->PlaceHolder = RemoveHtml($this->Others14->caption());

        // Others15
        $this->Others15->EditAttrs["class"] = "form-control";
        $this->Others15->EditCustomAttributes = "";
        if (!$this->Others15->Raw) {
            $this->Others15->CurrentValue = HtmlDecode($this->Others15->CurrentValue);
        }
        $this->Others15->EditValue = $this->Others15->CurrentValue;
        $this->Others15->PlaceHolder = RemoveHtml($this->Others15->caption());

        // Others16
        $this->Others16->EditAttrs["class"] = "form-control";
        $this->Others16->EditCustomAttributes = "";
        if (!$this->Others16->Raw) {
            $this->Others16->CurrentValue = HtmlDecode($this->Others16->CurrentValue);
        }
        $this->Others16->EditValue = $this->Others16->CurrentValue;
        $this->Others16->PlaceHolder = RemoveHtml($this->Others16->caption());

        // Others17
        $this->Others17->EditAttrs["class"] = "form-control";
        $this->Others17->EditCustomAttributes = "";
        if (!$this->Others17->Raw) {
            $this->Others17->CurrentValue = HtmlDecode($this->Others17->CurrentValue);
        }
        $this->Others17->EditValue = $this->Others17->CurrentValue;
        $this->Others17->PlaceHolder = RemoveHtml($this->Others17->caption());

        // Others18
        $this->Others18->EditAttrs["class"] = "form-control";
        $this->Others18->EditCustomAttributes = "";
        if (!$this->Others18->Raw) {
            $this->Others18->CurrentValue = HtmlDecode($this->Others18->CurrentValue);
        }
        $this->Others18->EditValue = $this->Others18->CurrentValue;
        $this->Others18->PlaceHolder = RemoveHtml($this->Others18->caption());

        // Others19
        $this->Others19->EditAttrs["class"] = "form-control";
        $this->Others19->EditCustomAttributes = "";
        if (!$this->Others19->Raw) {
            $this->Others19->CurrentValue = HtmlDecode($this->Others19->CurrentValue);
        }
        $this->Others19->EditValue = $this->Others19->CurrentValue;
        $this->Others19->PlaceHolder = RemoveHtml($this->Others19->caption());

        // Others20
        $this->Others20->EditAttrs["class"] = "form-control";
        $this->Others20->EditCustomAttributes = "";
        if (!$this->Others20->Raw) {
            $this->Others20->CurrentValue = HtmlDecode($this->Others20->CurrentValue);
        }
        $this->Others20->EditValue = $this->Others20->CurrentValue;
        $this->Others20->PlaceHolder = RemoveHtml($this->Others20->caption());

        // Others21
        $this->Others21->EditAttrs["class"] = "form-control";
        $this->Others21->EditCustomAttributes = "";
        if (!$this->Others21->Raw) {
            $this->Others21->CurrentValue = HtmlDecode($this->Others21->CurrentValue);
        }
        $this->Others21->EditValue = $this->Others21->CurrentValue;
        $this->Others21->PlaceHolder = RemoveHtml($this->Others21->caption());

        // Others22
        $this->Others22->EditAttrs["class"] = "form-control";
        $this->Others22->EditCustomAttributes = "";
        if (!$this->Others22->Raw) {
            $this->Others22->CurrentValue = HtmlDecode($this->Others22->CurrentValue);
        }
        $this->Others22->EditValue = $this->Others22->CurrentValue;
        $this->Others22->PlaceHolder = RemoveHtml($this->Others22->caption());

        // Others23
        $this->Others23->EditAttrs["class"] = "form-control";
        $this->Others23->EditCustomAttributes = "";
        if (!$this->Others23->Raw) {
            $this->Others23->CurrentValue = HtmlDecode($this->Others23->CurrentValue);
        }
        $this->Others23->EditValue = $this->Others23->CurrentValue;
        $this->Others23->PlaceHolder = RemoveHtml($this->Others23->caption());

        // Others24
        $this->Others24->EditAttrs["class"] = "form-control";
        $this->Others24->EditCustomAttributes = "";
        if (!$this->Others24->Raw) {
            $this->Others24->CurrentValue = HtmlDecode($this->Others24->CurrentValue);
        }
        $this->Others24->EditValue = $this->Others24->CurrentValue;
        $this->Others24->PlaceHolder = RemoveHtml($this->Others24->caption());

        // Others25
        $this->Others25->EditAttrs["class"] = "form-control";
        $this->Others25->EditCustomAttributes = "";
        if (!$this->Others25->Raw) {
            $this->Others25->CurrentValue = HtmlDecode($this->Others25->CurrentValue);
        }
        $this->Others25->EditValue = $this->Others25->CurrentValue;
        $this->Others25->PlaceHolder = RemoveHtml($this->Others25->caption());

        // DR14
        $this->DR14->EditAttrs["class"] = "form-control";
        $this->DR14->EditCustomAttributes = "";
        if (!$this->DR14->Raw) {
            $this->DR14->CurrentValue = HtmlDecode($this->DR14->CurrentValue);
        }
        $this->DR14->EditValue = $this->DR14->CurrentValue;
        $this->DR14->PlaceHolder = RemoveHtml($this->DR14->caption());

        // DR15
        $this->DR15->EditAttrs["class"] = "form-control";
        $this->DR15->EditCustomAttributes = "";
        if (!$this->DR15->Raw) {
            $this->DR15->CurrentValue = HtmlDecode($this->DR15->CurrentValue);
        }
        $this->DR15->EditValue = $this->DR15->CurrentValue;
        $this->DR15->PlaceHolder = RemoveHtml($this->DR15->caption());

        // DR16
        $this->DR16->EditAttrs["class"] = "form-control";
        $this->DR16->EditCustomAttributes = "";
        if (!$this->DR16->Raw) {
            $this->DR16->CurrentValue = HtmlDecode($this->DR16->CurrentValue);
        }
        $this->DR16->EditValue = $this->DR16->CurrentValue;
        $this->DR16->PlaceHolder = RemoveHtml($this->DR16->caption());

        // DR17
        $this->DR17->EditAttrs["class"] = "form-control";
        $this->DR17->EditCustomAttributes = "";
        if (!$this->DR17->Raw) {
            $this->DR17->CurrentValue = HtmlDecode($this->DR17->CurrentValue);
        }
        $this->DR17->EditValue = $this->DR17->CurrentValue;
        $this->DR17->PlaceHolder = RemoveHtml($this->DR17->caption());

        // DR18
        $this->DR18->EditAttrs["class"] = "form-control";
        $this->DR18->EditCustomAttributes = "";
        if (!$this->DR18->Raw) {
            $this->DR18->CurrentValue = HtmlDecode($this->DR18->CurrentValue);
        }
        $this->DR18->EditValue = $this->DR18->CurrentValue;
        $this->DR18->PlaceHolder = RemoveHtml($this->DR18->caption());

        // DR19
        $this->DR19->EditAttrs["class"] = "form-control";
        $this->DR19->EditCustomAttributes = "";
        if (!$this->DR19->Raw) {
            $this->DR19->CurrentValue = HtmlDecode($this->DR19->CurrentValue);
        }
        $this->DR19->EditValue = $this->DR19->CurrentValue;
        $this->DR19->PlaceHolder = RemoveHtml($this->DR19->caption());

        // DR20
        $this->DR20->EditAttrs["class"] = "form-control";
        $this->DR20->EditCustomAttributes = "";
        if (!$this->DR20->Raw) {
            $this->DR20->CurrentValue = HtmlDecode($this->DR20->CurrentValue);
        }
        $this->DR20->EditValue = $this->DR20->CurrentValue;
        $this->DR20->PlaceHolder = RemoveHtml($this->DR20->caption());

        // DR21
        $this->DR21->EditAttrs["class"] = "form-control";
        $this->DR21->EditCustomAttributes = "";
        if (!$this->DR21->Raw) {
            $this->DR21->CurrentValue = HtmlDecode($this->DR21->CurrentValue);
        }
        $this->DR21->EditValue = $this->DR21->CurrentValue;
        $this->DR21->PlaceHolder = RemoveHtml($this->DR21->caption());

        // DR22
        $this->DR22->EditAttrs["class"] = "form-control";
        $this->DR22->EditCustomAttributes = "";
        if (!$this->DR22->Raw) {
            $this->DR22->CurrentValue = HtmlDecode($this->DR22->CurrentValue);
        }
        $this->DR22->EditValue = $this->DR22->CurrentValue;
        $this->DR22->PlaceHolder = RemoveHtml($this->DR22->caption());

        // DR23
        $this->DR23->EditAttrs["class"] = "form-control";
        $this->DR23->EditCustomAttributes = "";
        if (!$this->DR23->Raw) {
            $this->DR23->CurrentValue = HtmlDecode($this->DR23->CurrentValue);
        }
        $this->DR23->EditValue = $this->DR23->CurrentValue;
        $this->DR23->PlaceHolder = RemoveHtml($this->DR23->caption());

        // DR24
        $this->DR24->EditAttrs["class"] = "form-control";
        $this->DR24->EditCustomAttributes = "";
        if (!$this->DR24->Raw) {
            $this->DR24->CurrentValue = HtmlDecode($this->DR24->CurrentValue);
        }
        $this->DR24->EditValue = $this->DR24->CurrentValue;
        $this->DR24->PlaceHolder = RemoveHtml($this->DR24->caption());

        // DR25
        $this->DR25->EditAttrs["class"] = "form-control";
        $this->DR25->EditCustomAttributes = "";
        if (!$this->DR25->Raw) {
            $this->DR25->CurrentValue = HtmlDecode($this->DR25->CurrentValue);
        }
        $this->DR25->EditValue = $this->DR25->CurrentValue;
        $this->DR25->PlaceHolder = RemoveHtml($this->DR25->caption());

        // E214
        $this->E214->EditAttrs["class"] = "form-control";
        $this->E214->EditCustomAttributes = "";
        if (!$this->E214->Raw) {
            $this->E214->CurrentValue = HtmlDecode($this->E214->CurrentValue);
        }
        $this->E214->EditValue = $this->E214->CurrentValue;
        $this->E214->PlaceHolder = RemoveHtml($this->E214->caption());

        // E215
        $this->E215->EditAttrs["class"] = "form-control";
        $this->E215->EditCustomAttributes = "";
        if (!$this->E215->Raw) {
            $this->E215->CurrentValue = HtmlDecode($this->E215->CurrentValue);
        }
        $this->E215->EditValue = $this->E215->CurrentValue;
        $this->E215->PlaceHolder = RemoveHtml($this->E215->caption());

        // E216
        $this->E216->EditAttrs["class"] = "form-control";
        $this->E216->EditCustomAttributes = "";
        if (!$this->E216->Raw) {
            $this->E216->CurrentValue = HtmlDecode($this->E216->CurrentValue);
        }
        $this->E216->EditValue = $this->E216->CurrentValue;
        $this->E216->PlaceHolder = RemoveHtml($this->E216->caption());

        // E217
        $this->E217->EditAttrs["class"] = "form-control";
        $this->E217->EditCustomAttributes = "";
        if (!$this->E217->Raw) {
            $this->E217->CurrentValue = HtmlDecode($this->E217->CurrentValue);
        }
        $this->E217->EditValue = $this->E217->CurrentValue;
        $this->E217->PlaceHolder = RemoveHtml($this->E217->caption());

        // E218
        $this->E218->EditAttrs["class"] = "form-control";
        $this->E218->EditCustomAttributes = "";
        if (!$this->E218->Raw) {
            $this->E218->CurrentValue = HtmlDecode($this->E218->CurrentValue);
        }
        $this->E218->EditValue = $this->E218->CurrentValue;
        $this->E218->PlaceHolder = RemoveHtml($this->E218->caption());

        // E219
        $this->E219->EditAttrs["class"] = "form-control";
        $this->E219->EditCustomAttributes = "";
        if (!$this->E219->Raw) {
            $this->E219->CurrentValue = HtmlDecode($this->E219->CurrentValue);
        }
        $this->E219->EditValue = $this->E219->CurrentValue;
        $this->E219->PlaceHolder = RemoveHtml($this->E219->caption());

        // E220
        $this->E220->EditAttrs["class"] = "form-control";
        $this->E220->EditCustomAttributes = "";
        if (!$this->E220->Raw) {
            $this->E220->CurrentValue = HtmlDecode($this->E220->CurrentValue);
        }
        $this->E220->EditValue = $this->E220->CurrentValue;
        $this->E220->PlaceHolder = RemoveHtml($this->E220->caption());

        // E221
        $this->E221->EditAttrs["class"] = "form-control";
        $this->E221->EditCustomAttributes = "";
        if (!$this->E221->Raw) {
            $this->E221->CurrentValue = HtmlDecode($this->E221->CurrentValue);
        }
        $this->E221->EditValue = $this->E221->CurrentValue;
        $this->E221->PlaceHolder = RemoveHtml($this->E221->caption());

        // E222
        $this->E222->EditAttrs["class"] = "form-control";
        $this->E222->EditCustomAttributes = "";
        if (!$this->E222->Raw) {
            $this->E222->CurrentValue = HtmlDecode($this->E222->CurrentValue);
        }
        $this->E222->EditValue = $this->E222->CurrentValue;
        $this->E222->PlaceHolder = RemoveHtml($this->E222->caption());

        // E223
        $this->E223->EditAttrs["class"] = "form-control";
        $this->E223->EditCustomAttributes = "";
        if (!$this->E223->Raw) {
            $this->E223->CurrentValue = HtmlDecode($this->E223->CurrentValue);
        }
        $this->E223->EditValue = $this->E223->CurrentValue;
        $this->E223->PlaceHolder = RemoveHtml($this->E223->caption());

        // E224
        $this->E224->EditAttrs["class"] = "form-control";
        $this->E224->EditCustomAttributes = "";
        if (!$this->E224->Raw) {
            $this->E224->CurrentValue = HtmlDecode($this->E224->CurrentValue);
        }
        $this->E224->EditValue = $this->E224->CurrentValue;
        $this->E224->PlaceHolder = RemoveHtml($this->E224->caption());

        // E225
        $this->E225->EditAttrs["class"] = "form-control";
        $this->E225->EditCustomAttributes = "";
        if (!$this->E225->Raw) {
            $this->E225->CurrentValue = HtmlDecode($this->E225->CurrentValue);
        }
        $this->E225->EditValue = $this->E225->CurrentValue;
        $this->E225->PlaceHolder = RemoveHtml($this->E225->caption());

        // EEETTTDTE
        $this->EEETTTDTE->EditAttrs["class"] = "form-control";
        $this->EEETTTDTE->EditCustomAttributes = "";
        $this->EEETTTDTE->EditValue = FormatDateTime($this->EEETTTDTE->CurrentValue, 7);
        $this->EEETTTDTE->PlaceHolder = RemoveHtml($this->EEETTTDTE->caption());

        // bhcgdate
        $this->bhcgdate->EditAttrs["class"] = "form-control";
        $this->bhcgdate->EditCustomAttributes = "";
        $this->bhcgdate->EditValue = FormatDateTime($this->bhcgdate->CurrentValue, 7);
        $this->bhcgdate->PlaceHolder = RemoveHtml($this->bhcgdate->caption());

        // TUBAL_PATENCY
        $this->TUBAL_PATENCY->EditAttrs["class"] = "form-control";
        $this->TUBAL_PATENCY->EditCustomAttributes = "";
        $this->TUBAL_PATENCY->EditValue = $this->TUBAL_PATENCY->options(true);
        $this->TUBAL_PATENCY->PlaceHolder = RemoveHtml($this->TUBAL_PATENCY->caption());

        // HSG
        $this->HSG->EditAttrs["class"] = "form-control";
        $this->HSG->EditCustomAttributes = "";
        $this->HSG->EditValue = $this->HSG->options(true);
        $this->HSG->PlaceHolder = RemoveHtml($this->HSG->caption());

        // DHL
        $this->DHL->EditAttrs["class"] = "form-control";
        $this->DHL->EditCustomAttributes = "";
        $this->DHL->EditValue = $this->DHL->options(true);
        $this->DHL->PlaceHolder = RemoveHtml($this->DHL->caption());

        // UTERINE_PROBLEMS
        $this->UTERINE_PROBLEMS->EditAttrs["class"] = "form-control";
        $this->UTERINE_PROBLEMS->EditCustomAttributes = "";
        $this->UTERINE_PROBLEMS->EditValue = $this->UTERINE_PROBLEMS->options(true);
        $this->UTERINE_PROBLEMS->PlaceHolder = RemoveHtml($this->UTERINE_PROBLEMS->caption());

        // W_COMORBIDS
        $this->W_COMORBIDS->EditAttrs["class"] = "form-control";
        $this->W_COMORBIDS->EditCustomAttributes = "";
        $this->W_COMORBIDS->EditValue = $this->W_COMORBIDS->options(true);
        $this->W_COMORBIDS->PlaceHolder = RemoveHtml($this->W_COMORBIDS->caption());

        // H_COMORBIDS
        $this->H_COMORBIDS->EditAttrs["class"] = "form-control";
        $this->H_COMORBIDS->EditCustomAttributes = "";
        $this->H_COMORBIDS->EditValue = $this->H_COMORBIDS->options(true);
        $this->H_COMORBIDS->PlaceHolder = RemoveHtml($this->H_COMORBIDS->caption());

        // SEXUAL_DYSFUNCTION
        $this->SEXUAL_DYSFUNCTION->EditAttrs["class"] = "form-control";
        $this->SEXUAL_DYSFUNCTION->EditCustomAttributes = "";
        $this->SEXUAL_DYSFUNCTION->EditValue = $this->SEXUAL_DYSFUNCTION->options(true);
        $this->SEXUAL_DYSFUNCTION->PlaceHolder = RemoveHtml($this->SEXUAL_DYSFUNCTION->caption());

        // TABLETS
        $this->TABLETS->EditAttrs["class"] = "form-control";
        $this->TABLETS->EditCustomAttributes = "";
        if (!$this->TABLETS->Raw) {
            $this->TABLETS->CurrentValue = HtmlDecode($this->TABLETS->CurrentValue);
        }
        $this->TABLETS->EditValue = $this->TABLETS->CurrentValue;
        $this->TABLETS->PlaceHolder = RemoveHtml($this->TABLETS->caption());

        // FOLLICLE_STATUS
        $this->FOLLICLE_STATUS->EditAttrs["class"] = "form-control";
        $this->FOLLICLE_STATUS->EditCustomAttributes = "";
        $this->FOLLICLE_STATUS->EditValue = $this->FOLLICLE_STATUS->options(true);
        $this->FOLLICLE_STATUS->PlaceHolder = RemoveHtml($this->FOLLICLE_STATUS->caption());

        // NUMBER_OF_IUI
        $this->NUMBER_OF_IUI->EditAttrs["class"] = "form-control";
        $this->NUMBER_OF_IUI->EditCustomAttributes = "";
        $this->NUMBER_OF_IUI->EditValue = $this->NUMBER_OF_IUI->options(true);
        $this->NUMBER_OF_IUI->PlaceHolder = RemoveHtml($this->NUMBER_OF_IUI->caption());

        // PROCEDURE
        $this->PROCEDURE->EditAttrs["class"] = "form-control";
        $this->PROCEDURE->EditCustomAttributes = "";
        $this->PROCEDURE->EditValue = $this->PROCEDURE->options(true);
        $this->PROCEDURE->PlaceHolder = RemoveHtml($this->PROCEDURE->caption());

        // LUTEAL_SUPPORT
        $this->LUTEAL_SUPPORT->EditAttrs["class"] = "form-control";
        $this->LUTEAL_SUPPORT->EditCustomAttributes = "";
        $this->LUTEAL_SUPPORT->EditValue = $this->LUTEAL_SUPPORT->options(true);
        $this->LUTEAL_SUPPORT->PlaceHolder = RemoveHtml($this->LUTEAL_SUPPORT->caption());

        // SPECIFIC_MATERNAL_PROBLEMS
        $this->SPECIFIC_MATERNAL_PROBLEMS->EditAttrs["class"] = "form-control";
        $this->SPECIFIC_MATERNAL_PROBLEMS->EditCustomAttributes = "";
        $this->SPECIFIC_MATERNAL_PROBLEMS->EditValue = $this->SPECIFIC_MATERNAL_PROBLEMS->options(true);
        $this->SPECIFIC_MATERNAL_PROBLEMS->PlaceHolder = RemoveHtml($this->SPECIFIC_MATERNAL_PROBLEMS->caption());

        // ONGOING_PREG
        $this->ONGOING_PREG->EditAttrs["class"] = "form-control";
        $this->ONGOING_PREG->EditCustomAttributes = "";
        if (!$this->ONGOING_PREG->Raw) {
            $this->ONGOING_PREG->CurrentValue = HtmlDecode($this->ONGOING_PREG->CurrentValue);
        }
        $this->ONGOING_PREG->EditValue = $this->ONGOING_PREG->CurrentValue;
        $this->ONGOING_PREG->PlaceHolder = RemoveHtml($this->ONGOING_PREG->caption());

        // EDD_Date
        $this->EDD_Date->EditAttrs["class"] = "form-control";
        $this->EDD_Date->EditCustomAttributes = "";
        $this->EDD_Date->EditValue = FormatDateTime($this->EDD_Date->CurrentValue, 8);
        $this->EDD_Date->PlaceHolder = RemoveHtml($this->EDD_Date->caption());

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
                    $doc->exportCaption($this->FemaleFactor);
                    $doc->exportCaption($this->MaleFactor);
                    $doc->exportCaption($this->Protocol);
                    $doc->exportCaption($this->SemenFrozen);
                    $doc->exportCaption($this->A4ICSICycle);
                    $doc->exportCaption($this->TotalICSICycle);
                    $doc->exportCaption($this->TypeOfInfertility);
                    $doc->exportCaption($this->Duration);
                    $doc->exportCaption($this->LMP);
                    $doc->exportCaption($this->RelevantHistory);
                    $doc->exportCaption($this->IUICycles);
                    $doc->exportCaption($this->AFC);
                    $doc->exportCaption($this->AMH);
                    $doc->exportCaption($this->FBMI);
                    $doc->exportCaption($this->MBMI);
                    $doc->exportCaption($this->OvarianVolumeRT);
                    $doc->exportCaption($this->OvarianVolumeLT);
                    $doc->exportCaption($this->DAYSOFSTIMULATION);
                    $doc->exportCaption($this->DOSEOFGONADOTROPINS);
                    $doc->exportCaption($this->INJTYPE);
                    $doc->exportCaption($this->ANTAGONISTDAYS);
                    $doc->exportCaption($this->ANTAGONISTSTARTDAY);
                    $doc->exportCaption($this->GROWTHHORMONE);
                    $doc->exportCaption($this->PRETREATMENT);
                    $doc->exportCaption($this->SerumP4);
                    $doc->exportCaption($this->FORT);
                    $doc->exportCaption($this->MedicalFactors);
                    $doc->exportCaption($this->SCDate);
                    $doc->exportCaption($this->OvarianSurgery);
                    $doc->exportCaption($this->PreProcedureOrder);
                    $doc->exportCaption($this->TRIGGERR);
                    $doc->exportCaption($this->TRIGGERDATE);
                    $doc->exportCaption($this->ATHOMEorCLINIC);
                    $doc->exportCaption($this->OPUDATE);
                    $doc->exportCaption($this->ALLFREEZEINDICATION);
                    $doc->exportCaption($this->ERA);
                    $doc->exportCaption($this->PGTA);
                    $doc->exportCaption($this->PGD);
                    $doc->exportCaption($this->DATEOFET);
                    $doc->exportCaption($this->ET);
                    $doc->exportCaption($this->ESET);
                    $doc->exportCaption($this->DOET);
                    $doc->exportCaption($this->SEMENPREPARATION);
                    $doc->exportCaption($this->REASONFORESET);
                    $doc->exportCaption($this->Expectedoocytes);
                    $doc->exportCaption($this->StChDate1);
                    $doc->exportCaption($this->StChDate2);
                    $doc->exportCaption($this->StChDate3);
                    $doc->exportCaption($this->StChDate4);
                    $doc->exportCaption($this->StChDate5);
                    $doc->exportCaption($this->StChDate6);
                    $doc->exportCaption($this->StChDate7);
                    $doc->exportCaption($this->StChDate8);
                    $doc->exportCaption($this->StChDate9);
                    $doc->exportCaption($this->StChDate10);
                    $doc->exportCaption($this->StChDate11);
                    $doc->exportCaption($this->StChDate12);
                    $doc->exportCaption($this->StChDate13);
                    $doc->exportCaption($this->CycleDay1);
                    $doc->exportCaption($this->CycleDay2);
                    $doc->exportCaption($this->CycleDay3);
                    $doc->exportCaption($this->CycleDay4);
                    $doc->exportCaption($this->CycleDay5);
                    $doc->exportCaption($this->CycleDay6);
                    $doc->exportCaption($this->CycleDay7);
                    $doc->exportCaption($this->CycleDay8);
                    $doc->exportCaption($this->CycleDay9);
                    $doc->exportCaption($this->CycleDay10);
                    $doc->exportCaption($this->CycleDay11);
                    $doc->exportCaption($this->CycleDay12);
                    $doc->exportCaption($this->CycleDay13);
                    $doc->exportCaption($this->StimulationDay1);
                    $doc->exportCaption($this->StimulationDay2);
                    $doc->exportCaption($this->StimulationDay3);
                    $doc->exportCaption($this->StimulationDay4);
                    $doc->exportCaption($this->StimulationDay5);
                    $doc->exportCaption($this->StimulationDay6);
                    $doc->exportCaption($this->StimulationDay7);
                    $doc->exportCaption($this->StimulationDay8);
                    $doc->exportCaption($this->StimulationDay9);
                    $doc->exportCaption($this->StimulationDay10);
                    $doc->exportCaption($this->StimulationDay11);
                    $doc->exportCaption($this->StimulationDay12);
                    $doc->exportCaption($this->StimulationDay13);
                    $doc->exportCaption($this->Tablet1);
                    $doc->exportCaption($this->Tablet2);
                    $doc->exportCaption($this->Tablet3);
                    $doc->exportCaption($this->Tablet4);
                    $doc->exportCaption($this->Tablet5);
                    $doc->exportCaption($this->Tablet6);
                    $doc->exportCaption($this->Tablet7);
                    $doc->exportCaption($this->Tablet8);
                    $doc->exportCaption($this->Tablet9);
                    $doc->exportCaption($this->Tablet10);
                    $doc->exportCaption($this->Tablet11);
                    $doc->exportCaption($this->Tablet12);
                    $doc->exportCaption($this->Tablet13);
                    $doc->exportCaption($this->RFSH1);
                    $doc->exportCaption($this->RFSH2);
                    $doc->exportCaption($this->RFSH3);
                    $doc->exportCaption($this->RFSH4);
                    $doc->exportCaption($this->RFSH5);
                    $doc->exportCaption($this->RFSH6);
                    $doc->exportCaption($this->RFSH7);
                    $doc->exportCaption($this->RFSH8);
                    $doc->exportCaption($this->RFSH9);
                    $doc->exportCaption($this->RFSH10);
                    $doc->exportCaption($this->RFSH11);
                    $doc->exportCaption($this->RFSH12);
                    $doc->exportCaption($this->RFSH13);
                    $doc->exportCaption($this->HMG1);
                    $doc->exportCaption($this->HMG2);
                    $doc->exportCaption($this->HMG3);
                    $doc->exportCaption($this->HMG4);
                    $doc->exportCaption($this->HMG5);
                    $doc->exportCaption($this->HMG6);
                    $doc->exportCaption($this->HMG7);
                    $doc->exportCaption($this->HMG8);
                    $doc->exportCaption($this->HMG9);
                    $doc->exportCaption($this->HMG10);
                    $doc->exportCaption($this->HMG11);
                    $doc->exportCaption($this->HMG12);
                    $doc->exportCaption($this->HMG13);
                    $doc->exportCaption($this->GnRH1);
                    $doc->exportCaption($this->GnRH2);
                    $doc->exportCaption($this->GnRH3);
                    $doc->exportCaption($this->GnRH4);
                    $doc->exportCaption($this->GnRH5);
                    $doc->exportCaption($this->GnRH6);
                    $doc->exportCaption($this->GnRH7);
                    $doc->exportCaption($this->GnRH8);
                    $doc->exportCaption($this->GnRH9);
                    $doc->exportCaption($this->GnRH10);
                    $doc->exportCaption($this->GnRH11);
                    $doc->exportCaption($this->GnRH12);
                    $doc->exportCaption($this->GnRH13);
                    $doc->exportCaption($this->E21);
                    $doc->exportCaption($this->E22);
                    $doc->exportCaption($this->E23);
                    $doc->exportCaption($this->E24);
                    $doc->exportCaption($this->E25);
                    $doc->exportCaption($this->E26);
                    $doc->exportCaption($this->E27);
                    $doc->exportCaption($this->E28);
                    $doc->exportCaption($this->E29);
                    $doc->exportCaption($this->E210);
                    $doc->exportCaption($this->E211);
                    $doc->exportCaption($this->E212);
                    $doc->exportCaption($this->E213);
                    $doc->exportCaption($this->P41);
                    $doc->exportCaption($this->P42);
                    $doc->exportCaption($this->P43);
                    $doc->exportCaption($this->P44);
                    $doc->exportCaption($this->P45);
                    $doc->exportCaption($this->P46);
                    $doc->exportCaption($this->P47);
                    $doc->exportCaption($this->P48);
                    $doc->exportCaption($this->P49);
                    $doc->exportCaption($this->P410);
                    $doc->exportCaption($this->P411);
                    $doc->exportCaption($this->P412);
                    $doc->exportCaption($this->P413);
                    $doc->exportCaption($this->USGRt1);
                    $doc->exportCaption($this->USGRt2);
                    $doc->exportCaption($this->USGRt3);
                    $doc->exportCaption($this->USGRt4);
                    $doc->exportCaption($this->USGRt5);
                    $doc->exportCaption($this->USGRt6);
                    $doc->exportCaption($this->USGRt7);
                    $doc->exportCaption($this->USGRt8);
                    $doc->exportCaption($this->USGRt9);
                    $doc->exportCaption($this->USGRt10);
                    $doc->exportCaption($this->USGRt11);
                    $doc->exportCaption($this->USGRt12);
                    $doc->exportCaption($this->USGRt13);
                    $doc->exportCaption($this->USGLt1);
                    $doc->exportCaption($this->USGLt2);
                    $doc->exportCaption($this->USGLt3);
                    $doc->exportCaption($this->USGLt4);
                    $doc->exportCaption($this->USGLt5);
                    $doc->exportCaption($this->USGLt6);
                    $doc->exportCaption($this->USGLt7);
                    $doc->exportCaption($this->USGLt8);
                    $doc->exportCaption($this->USGLt9);
                    $doc->exportCaption($this->USGLt10);
                    $doc->exportCaption($this->USGLt11);
                    $doc->exportCaption($this->USGLt12);
                    $doc->exportCaption($this->USGLt13);
                    $doc->exportCaption($this->EM1);
                    $doc->exportCaption($this->EM2);
                    $doc->exportCaption($this->EM3);
                    $doc->exportCaption($this->EM4);
                    $doc->exportCaption($this->EM5);
                    $doc->exportCaption($this->EM6);
                    $doc->exportCaption($this->EM7);
                    $doc->exportCaption($this->EM8);
                    $doc->exportCaption($this->EM9);
                    $doc->exportCaption($this->EM10);
                    $doc->exportCaption($this->EM11);
                    $doc->exportCaption($this->EM12);
                    $doc->exportCaption($this->EM13);
                    $doc->exportCaption($this->Others1);
                    $doc->exportCaption($this->Others2);
                    $doc->exportCaption($this->Others3);
                    $doc->exportCaption($this->Others4);
                    $doc->exportCaption($this->Others5);
                    $doc->exportCaption($this->Others6);
                    $doc->exportCaption($this->Others7);
                    $doc->exportCaption($this->Others8);
                    $doc->exportCaption($this->Others9);
                    $doc->exportCaption($this->Others10);
                    $doc->exportCaption($this->Others11);
                    $doc->exportCaption($this->Others12);
                    $doc->exportCaption($this->Others13);
                    $doc->exportCaption($this->DR1);
                    $doc->exportCaption($this->DR2);
                    $doc->exportCaption($this->DR3);
                    $doc->exportCaption($this->DR4);
                    $doc->exportCaption($this->DR5);
                    $doc->exportCaption($this->DR6);
                    $doc->exportCaption($this->DR7);
                    $doc->exportCaption($this->DR8);
                    $doc->exportCaption($this->DR9);
                    $doc->exportCaption($this->DR10);
                    $doc->exportCaption($this->DR11);
                    $doc->exportCaption($this->DR12);
                    $doc->exportCaption($this->DR13);
                    $doc->exportCaption($this->DOCTORRESPONSIBLE);
                    $doc->exportCaption($this->TidNo);
                    $doc->exportCaption($this->Convert);
                    $doc->exportCaption($this->Consultant);
                    $doc->exportCaption($this->InseminatinTechnique);
                    $doc->exportCaption($this->IndicationForART);
                    $doc->exportCaption($this->Hysteroscopy);
                    $doc->exportCaption($this->EndometrialScratching);
                    $doc->exportCaption($this->TrialCannulation);
                    $doc->exportCaption($this->CYCLETYPE);
                    $doc->exportCaption($this->HRTCYCLE);
                    $doc->exportCaption($this->OralEstrogenDosage);
                    $doc->exportCaption($this->VaginalEstrogen);
                    $doc->exportCaption($this->GCSF);
                    $doc->exportCaption($this->ActivatedPRP);
                    $doc->exportCaption($this->UCLcm);
                    $doc->exportCaption($this->DATOFEMBRYOTRANSFER);
                    $doc->exportCaption($this->DAYOFEMBRYOTRANSFER);
                    $doc->exportCaption($this->NOOFEMBRYOSTHAWED);
                    $doc->exportCaption($this->NOOFEMBRYOSTRANSFERRED);
                    $doc->exportCaption($this->DAYOFEMBRYOS);
                    $doc->exportCaption($this->CRYOPRESERVEDEMBRYOS);
                    $doc->exportCaption($this->ViaAdmin);
                    $doc->exportCaption($this->ViaStartDateTime);
                    $doc->exportCaption($this->ViaDose);
                    $doc->exportCaption($this->AllFreeze);
                    $doc->exportCaption($this->TreatmentCancel);
                    $doc->exportCaption($this->Reason);
                    $doc->exportCaption($this->ProgesteroneAdmin);
                    $doc->exportCaption($this->ProgesteroneStart);
                    $doc->exportCaption($this->ProgesteroneDose);
                    $doc->exportCaption($this->Projectron);
                    $doc->exportCaption($this->StChDate14);
                    $doc->exportCaption($this->StChDate15);
                    $doc->exportCaption($this->StChDate16);
                    $doc->exportCaption($this->StChDate17);
                    $doc->exportCaption($this->StChDate18);
                    $doc->exportCaption($this->StChDate19);
                    $doc->exportCaption($this->StChDate20);
                    $doc->exportCaption($this->StChDate21);
                    $doc->exportCaption($this->StChDate22);
                    $doc->exportCaption($this->StChDate23);
                    $doc->exportCaption($this->StChDate24);
                    $doc->exportCaption($this->StChDate25);
                    $doc->exportCaption($this->CycleDay14);
                    $doc->exportCaption($this->CycleDay15);
                    $doc->exportCaption($this->CycleDay16);
                    $doc->exportCaption($this->CycleDay17);
                    $doc->exportCaption($this->CycleDay18);
                    $doc->exportCaption($this->CycleDay19);
                    $doc->exportCaption($this->CycleDay20);
                    $doc->exportCaption($this->CycleDay21);
                    $doc->exportCaption($this->CycleDay22);
                    $doc->exportCaption($this->CycleDay23);
                    $doc->exportCaption($this->CycleDay24);
                    $doc->exportCaption($this->CycleDay25);
                    $doc->exportCaption($this->StimulationDay14);
                    $doc->exportCaption($this->StimulationDay15);
                    $doc->exportCaption($this->StimulationDay16);
                    $doc->exportCaption($this->StimulationDay17);
                    $doc->exportCaption($this->StimulationDay18);
                    $doc->exportCaption($this->StimulationDay19);
                    $doc->exportCaption($this->StimulationDay20);
                    $doc->exportCaption($this->StimulationDay21);
                    $doc->exportCaption($this->StimulationDay22);
                    $doc->exportCaption($this->StimulationDay23);
                    $doc->exportCaption($this->StimulationDay24);
                    $doc->exportCaption($this->StimulationDay25);
                    $doc->exportCaption($this->Tablet14);
                    $doc->exportCaption($this->Tablet15);
                    $doc->exportCaption($this->Tablet16);
                    $doc->exportCaption($this->Tablet17);
                    $doc->exportCaption($this->Tablet18);
                    $doc->exportCaption($this->Tablet19);
                    $doc->exportCaption($this->Tablet20);
                    $doc->exportCaption($this->Tablet21);
                    $doc->exportCaption($this->Tablet22);
                    $doc->exportCaption($this->Tablet23);
                    $doc->exportCaption($this->Tablet24);
                    $doc->exportCaption($this->Tablet25);
                    $doc->exportCaption($this->RFSH14);
                    $doc->exportCaption($this->RFSH15);
                    $doc->exportCaption($this->RFSH16);
                    $doc->exportCaption($this->RFSH17);
                    $doc->exportCaption($this->RFSH18);
                    $doc->exportCaption($this->RFSH19);
                    $doc->exportCaption($this->RFSH20);
                    $doc->exportCaption($this->RFSH21);
                    $doc->exportCaption($this->RFSH22);
                    $doc->exportCaption($this->RFSH23);
                    $doc->exportCaption($this->RFSH24);
                    $doc->exportCaption($this->RFSH25);
                    $doc->exportCaption($this->HMG14);
                    $doc->exportCaption($this->HMG15);
                    $doc->exportCaption($this->HMG16);
                    $doc->exportCaption($this->HMG17);
                    $doc->exportCaption($this->HMG18);
                    $doc->exportCaption($this->HMG19);
                    $doc->exportCaption($this->HMG20);
                    $doc->exportCaption($this->HMG21);
                    $doc->exportCaption($this->HMG22);
                    $doc->exportCaption($this->HMG23);
                    $doc->exportCaption($this->HMG24);
                    $doc->exportCaption($this->HMG25);
                    $doc->exportCaption($this->GnRH14);
                    $doc->exportCaption($this->GnRH15);
                    $doc->exportCaption($this->GnRH16);
                    $doc->exportCaption($this->GnRH17);
                    $doc->exportCaption($this->GnRH18);
                    $doc->exportCaption($this->GnRH19);
                    $doc->exportCaption($this->GnRH20);
                    $doc->exportCaption($this->GnRH21);
                    $doc->exportCaption($this->GnRH22);
                    $doc->exportCaption($this->GnRH23);
                    $doc->exportCaption($this->GnRH24);
                    $doc->exportCaption($this->GnRH25);
                    $doc->exportCaption($this->P414);
                    $doc->exportCaption($this->P415);
                    $doc->exportCaption($this->P416);
                    $doc->exportCaption($this->P417);
                    $doc->exportCaption($this->P418);
                    $doc->exportCaption($this->P419);
                    $doc->exportCaption($this->P420);
                    $doc->exportCaption($this->P421);
                    $doc->exportCaption($this->P422);
                    $doc->exportCaption($this->P423);
                    $doc->exportCaption($this->P424);
                    $doc->exportCaption($this->P425);
                    $doc->exportCaption($this->USGRt14);
                    $doc->exportCaption($this->USGRt15);
                    $doc->exportCaption($this->USGRt16);
                    $doc->exportCaption($this->USGRt17);
                    $doc->exportCaption($this->USGRt18);
                    $doc->exportCaption($this->USGRt19);
                    $doc->exportCaption($this->USGRt20);
                    $doc->exportCaption($this->USGRt21);
                    $doc->exportCaption($this->USGRt22);
                    $doc->exportCaption($this->USGRt23);
                    $doc->exportCaption($this->USGRt24);
                    $doc->exportCaption($this->USGRt25);
                    $doc->exportCaption($this->USGLt14);
                    $doc->exportCaption($this->USGLt15);
                    $doc->exportCaption($this->USGLt16);
                    $doc->exportCaption($this->USGLt17);
                    $doc->exportCaption($this->USGLt18);
                    $doc->exportCaption($this->USGLt19);
                    $doc->exportCaption($this->USGLt20);
                    $doc->exportCaption($this->USGLt21);
                    $doc->exportCaption($this->USGLt22);
                    $doc->exportCaption($this->USGLt23);
                    $doc->exportCaption($this->USGLt24);
                    $doc->exportCaption($this->USGLt25);
                    $doc->exportCaption($this->EM14);
                    $doc->exportCaption($this->EM15);
                    $doc->exportCaption($this->EM16);
                    $doc->exportCaption($this->EM17);
                    $doc->exportCaption($this->EM18);
                    $doc->exportCaption($this->EM19);
                    $doc->exportCaption($this->EM20);
                    $doc->exportCaption($this->EM21);
                    $doc->exportCaption($this->EM22);
                    $doc->exportCaption($this->EM23);
                    $doc->exportCaption($this->EM24);
                    $doc->exportCaption($this->EM25);
                    $doc->exportCaption($this->Others14);
                    $doc->exportCaption($this->Others15);
                    $doc->exportCaption($this->Others16);
                    $doc->exportCaption($this->Others17);
                    $doc->exportCaption($this->Others18);
                    $doc->exportCaption($this->Others19);
                    $doc->exportCaption($this->Others20);
                    $doc->exportCaption($this->Others21);
                    $doc->exportCaption($this->Others22);
                    $doc->exportCaption($this->Others23);
                    $doc->exportCaption($this->Others24);
                    $doc->exportCaption($this->Others25);
                    $doc->exportCaption($this->DR14);
                    $doc->exportCaption($this->DR15);
                    $doc->exportCaption($this->DR16);
                    $doc->exportCaption($this->DR17);
                    $doc->exportCaption($this->DR18);
                    $doc->exportCaption($this->DR19);
                    $doc->exportCaption($this->DR20);
                    $doc->exportCaption($this->DR21);
                    $doc->exportCaption($this->DR22);
                    $doc->exportCaption($this->DR23);
                    $doc->exportCaption($this->DR24);
                    $doc->exportCaption($this->DR25);
                    $doc->exportCaption($this->E214);
                    $doc->exportCaption($this->E215);
                    $doc->exportCaption($this->E216);
                    $doc->exportCaption($this->E217);
                    $doc->exportCaption($this->E218);
                    $doc->exportCaption($this->E219);
                    $doc->exportCaption($this->E220);
                    $doc->exportCaption($this->E221);
                    $doc->exportCaption($this->E222);
                    $doc->exportCaption($this->E223);
                    $doc->exportCaption($this->E224);
                    $doc->exportCaption($this->E225);
                    $doc->exportCaption($this->EEETTTDTE);
                    $doc->exportCaption($this->bhcgdate);
                    $doc->exportCaption($this->TUBAL_PATENCY);
                    $doc->exportCaption($this->HSG);
                    $doc->exportCaption($this->DHL);
                    $doc->exportCaption($this->UTERINE_PROBLEMS);
                    $doc->exportCaption($this->W_COMORBIDS);
                    $doc->exportCaption($this->H_COMORBIDS);
                    $doc->exportCaption($this->SEXUAL_DYSFUNCTION);
                    $doc->exportCaption($this->TABLETS);
                    $doc->exportCaption($this->FOLLICLE_STATUS);
                    $doc->exportCaption($this->NUMBER_OF_IUI);
                    $doc->exportCaption($this->PROCEDURE);
                    $doc->exportCaption($this->LUTEAL_SUPPORT);
                    $doc->exportCaption($this->SPECIFIC_MATERNAL_PROBLEMS);
                    $doc->exportCaption($this->ONGOING_PREG);
                    $doc->exportCaption($this->EDD_Date);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->RIDNo);
                    $doc->exportCaption($this->Name);
                    $doc->exportCaption($this->ARTCycle);
                    $doc->exportCaption($this->FemaleFactor);
                    $doc->exportCaption($this->MaleFactor);
                    $doc->exportCaption($this->Protocol);
                    $doc->exportCaption($this->SemenFrozen);
                    $doc->exportCaption($this->A4ICSICycle);
                    $doc->exportCaption($this->TotalICSICycle);
                    $doc->exportCaption($this->TypeOfInfertility);
                    $doc->exportCaption($this->Duration);
                    $doc->exportCaption($this->LMP);
                    $doc->exportCaption($this->RelevantHistory);
                    $doc->exportCaption($this->IUICycles);
                    $doc->exportCaption($this->AFC);
                    $doc->exportCaption($this->AMH);
                    $doc->exportCaption($this->FBMI);
                    $doc->exportCaption($this->MBMI);
                    $doc->exportCaption($this->OvarianVolumeRT);
                    $doc->exportCaption($this->OvarianVolumeLT);
                    $doc->exportCaption($this->DAYSOFSTIMULATION);
                    $doc->exportCaption($this->DOSEOFGONADOTROPINS);
                    $doc->exportCaption($this->INJTYPE);
                    $doc->exportCaption($this->ANTAGONISTDAYS);
                    $doc->exportCaption($this->ANTAGONISTSTARTDAY);
                    $doc->exportCaption($this->GROWTHHORMONE);
                    $doc->exportCaption($this->PRETREATMENT);
                    $doc->exportCaption($this->SerumP4);
                    $doc->exportCaption($this->FORT);
                    $doc->exportCaption($this->MedicalFactors);
                    $doc->exportCaption($this->SCDate);
                    $doc->exportCaption($this->OvarianSurgery);
                    $doc->exportCaption($this->PreProcedureOrder);
                    $doc->exportCaption($this->TRIGGERR);
                    $doc->exportCaption($this->TRIGGERDATE);
                    $doc->exportCaption($this->ATHOMEorCLINIC);
                    $doc->exportCaption($this->OPUDATE);
                    $doc->exportCaption($this->ALLFREEZEINDICATION);
                    $doc->exportCaption($this->ERA);
                    $doc->exportCaption($this->PGTA);
                    $doc->exportCaption($this->PGD);
                    $doc->exportCaption($this->DATEOFET);
                    $doc->exportCaption($this->ET);
                    $doc->exportCaption($this->ESET);
                    $doc->exportCaption($this->DOET);
                    $doc->exportCaption($this->SEMENPREPARATION);
                    $doc->exportCaption($this->REASONFORESET);
                    $doc->exportCaption($this->Expectedoocytes);
                    $doc->exportCaption($this->StChDate1);
                    $doc->exportCaption($this->StChDate2);
                    $doc->exportCaption($this->StChDate3);
                    $doc->exportCaption($this->StChDate4);
                    $doc->exportCaption($this->StChDate5);
                    $doc->exportCaption($this->StChDate6);
                    $doc->exportCaption($this->StChDate7);
                    $doc->exportCaption($this->StChDate8);
                    $doc->exportCaption($this->StChDate9);
                    $doc->exportCaption($this->StChDate10);
                    $doc->exportCaption($this->StChDate11);
                    $doc->exportCaption($this->StChDate12);
                    $doc->exportCaption($this->StChDate13);
                    $doc->exportCaption($this->CycleDay1);
                    $doc->exportCaption($this->CycleDay2);
                    $doc->exportCaption($this->CycleDay3);
                    $doc->exportCaption($this->CycleDay4);
                    $doc->exportCaption($this->CycleDay5);
                    $doc->exportCaption($this->CycleDay6);
                    $doc->exportCaption($this->CycleDay7);
                    $doc->exportCaption($this->CycleDay8);
                    $doc->exportCaption($this->CycleDay9);
                    $doc->exportCaption($this->CycleDay10);
                    $doc->exportCaption($this->CycleDay11);
                    $doc->exportCaption($this->CycleDay12);
                    $doc->exportCaption($this->CycleDay13);
                    $doc->exportCaption($this->StimulationDay1);
                    $doc->exportCaption($this->StimulationDay2);
                    $doc->exportCaption($this->StimulationDay3);
                    $doc->exportCaption($this->StimulationDay4);
                    $doc->exportCaption($this->StimulationDay5);
                    $doc->exportCaption($this->StimulationDay6);
                    $doc->exportCaption($this->StimulationDay7);
                    $doc->exportCaption($this->StimulationDay8);
                    $doc->exportCaption($this->StimulationDay9);
                    $doc->exportCaption($this->StimulationDay10);
                    $doc->exportCaption($this->StimulationDay11);
                    $doc->exportCaption($this->StimulationDay12);
                    $doc->exportCaption($this->StimulationDay13);
                    $doc->exportCaption($this->Tablet1);
                    $doc->exportCaption($this->Tablet2);
                    $doc->exportCaption($this->Tablet3);
                    $doc->exportCaption($this->Tablet4);
                    $doc->exportCaption($this->Tablet5);
                    $doc->exportCaption($this->Tablet6);
                    $doc->exportCaption($this->Tablet7);
                    $doc->exportCaption($this->Tablet8);
                    $doc->exportCaption($this->Tablet9);
                    $doc->exportCaption($this->Tablet10);
                    $doc->exportCaption($this->Tablet11);
                    $doc->exportCaption($this->Tablet12);
                    $doc->exportCaption($this->Tablet13);
                    $doc->exportCaption($this->RFSH1);
                    $doc->exportCaption($this->RFSH2);
                    $doc->exportCaption($this->RFSH3);
                    $doc->exportCaption($this->RFSH4);
                    $doc->exportCaption($this->RFSH5);
                    $doc->exportCaption($this->RFSH6);
                    $doc->exportCaption($this->RFSH7);
                    $doc->exportCaption($this->RFSH8);
                    $doc->exportCaption($this->RFSH9);
                    $doc->exportCaption($this->RFSH10);
                    $doc->exportCaption($this->RFSH11);
                    $doc->exportCaption($this->RFSH12);
                    $doc->exportCaption($this->RFSH13);
                    $doc->exportCaption($this->HMG1);
                    $doc->exportCaption($this->HMG2);
                    $doc->exportCaption($this->HMG3);
                    $doc->exportCaption($this->HMG4);
                    $doc->exportCaption($this->HMG5);
                    $doc->exportCaption($this->HMG6);
                    $doc->exportCaption($this->HMG7);
                    $doc->exportCaption($this->HMG8);
                    $doc->exportCaption($this->HMG9);
                    $doc->exportCaption($this->HMG10);
                    $doc->exportCaption($this->HMG11);
                    $doc->exportCaption($this->HMG12);
                    $doc->exportCaption($this->HMG13);
                    $doc->exportCaption($this->GnRH1);
                    $doc->exportCaption($this->GnRH2);
                    $doc->exportCaption($this->GnRH3);
                    $doc->exportCaption($this->GnRH4);
                    $doc->exportCaption($this->GnRH5);
                    $doc->exportCaption($this->GnRH6);
                    $doc->exportCaption($this->GnRH7);
                    $doc->exportCaption($this->GnRH8);
                    $doc->exportCaption($this->GnRH9);
                    $doc->exportCaption($this->GnRH10);
                    $doc->exportCaption($this->GnRH11);
                    $doc->exportCaption($this->GnRH12);
                    $doc->exportCaption($this->GnRH13);
                    $doc->exportCaption($this->E21);
                    $doc->exportCaption($this->E22);
                    $doc->exportCaption($this->E23);
                    $doc->exportCaption($this->E24);
                    $doc->exportCaption($this->E25);
                    $doc->exportCaption($this->E26);
                    $doc->exportCaption($this->E27);
                    $doc->exportCaption($this->E28);
                    $doc->exportCaption($this->E29);
                    $doc->exportCaption($this->E210);
                    $doc->exportCaption($this->E211);
                    $doc->exportCaption($this->E212);
                    $doc->exportCaption($this->E213);
                    $doc->exportCaption($this->P41);
                    $doc->exportCaption($this->P42);
                    $doc->exportCaption($this->P43);
                    $doc->exportCaption($this->P44);
                    $doc->exportCaption($this->P45);
                    $doc->exportCaption($this->P46);
                    $doc->exportCaption($this->P47);
                    $doc->exportCaption($this->P48);
                    $doc->exportCaption($this->P49);
                    $doc->exportCaption($this->P410);
                    $doc->exportCaption($this->P411);
                    $doc->exportCaption($this->P412);
                    $doc->exportCaption($this->P413);
                    $doc->exportCaption($this->USGRt1);
                    $doc->exportCaption($this->USGRt2);
                    $doc->exportCaption($this->USGRt3);
                    $doc->exportCaption($this->USGRt4);
                    $doc->exportCaption($this->USGRt5);
                    $doc->exportCaption($this->USGRt6);
                    $doc->exportCaption($this->USGRt7);
                    $doc->exportCaption($this->USGRt8);
                    $doc->exportCaption($this->USGRt9);
                    $doc->exportCaption($this->USGRt10);
                    $doc->exportCaption($this->USGRt11);
                    $doc->exportCaption($this->USGRt12);
                    $doc->exportCaption($this->USGRt13);
                    $doc->exportCaption($this->USGLt1);
                    $doc->exportCaption($this->USGLt2);
                    $doc->exportCaption($this->USGLt3);
                    $doc->exportCaption($this->USGLt4);
                    $doc->exportCaption($this->USGLt5);
                    $doc->exportCaption($this->USGLt6);
                    $doc->exportCaption($this->USGLt7);
                    $doc->exportCaption($this->USGLt8);
                    $doc->exportCaption($this->USGLt9);
                    $doc->exportCaption($this->USGLt10);
                    $doc->exportCaption($this->USGLt11);
                    $doc->exportCaption($this->USGLt12);
                    $doc->exportCaption($this->USGLt13);
                    $doc->exportCaption($this->EM1);
                    $doc->exportCaption($this->EM2);
                    $doc->exportCaption($this->EM3);
                    $doc->exportCaption($this->EM4);
                    $doc->exportCaption($this->EM5);
                    $doc->exportCaption($this->EM6);
                    $doc->exportCaption($this->EM7);
                    $doc->exportCaption($this->EM8);
                    $doc->exportCaption($this->EM9);
                    $doc->exportCaption($this->EM10);
                    $doc->exportCaption($this->EM11);
                    $doc->exportCaption($this->EM12);
                    $doc->exportCaption($this->EM13);
                    $doc->exportCaption($this->Others1);
                    $doc->exportCaption($this->Others2);
                    $doc->exportCaption($this->Others3);
                    $doc->exportCaption($this->Others4);
                    $doc->exportCaption($this->Others5);
                    $doc->exportCaption($this->Others6);
                    $doc->exportCaption($this->Others7);
                    $doc->exportCaption($this->Others8);
                    $doc->exportCaption($this->Others9);
                    $doc->exportCaption($this->Others10);
                    $doc->exportCaption($this->Others11);
                    $doc->exportCaption($this->Others12);
                    $doc->exportCaption($this->Others13);
                    $doc->exportCaption($this->DR1);
                    $doc->exportCaption($this->DR2);
                    $doc->exportCaption($this->DR3);
                    $doc->exportCaption($this->DR4);
                    $doc->exportCaption($this->DR5);
                    $doc->exportCaption($this->DR6);
                    $doc->exportCaption($this->DR7);
                    $doc->exportCaption($this->DR8);
                    $doc->exportCaption($this->DR9);
                    $doc->exportCaption($this->DR10);
                    $doc->exportCaption($this->DR11);
                    $doc->exportCaption($this->DR12);
                    $doc->exportCaption($this->DR13);
                    $doc->exportCaption($this->TidNo);
                    $doc->exportCaption($this->Convert);
                    $doc->exportCaption($this->Consultant);
                    $doc->exportCaption($this->InseminatinTechnique);
                    $doc->exportCaption($this->IndicationForART);
                    $doc->exportCaption($this->Hysteroscopy);
                    $doc->exportCaption($this->EndometrialScratching);
                    $doc->exportCaption($this->TrialCannulation);
                    $doc->exportCaption($this->CYCLETYPE);
                    $doc->exportCaption($this->HRTCYCLE);
                    $doc->exportCaption($this->OralEstrogenDosage);
                    $doc->exportCaption($this->VaginalEstrogen);
                    $doc->exportCaption($this->GCSF);
                    $doc->exportCaption($this->ActivatedPRP);
                    $doc->exportCaption($this->UCLcm);
                    $doc->exportCaption($this->DATOFEMBRYOTRANSFER);
                    $doc->exportCaption($this->DAYOFEMBRYOTRANSFER);
                    $doc->exportCaption($this->NOOFEMBRYOSTHAWED);
                    $doc->exportCaption($this->NOOFEMBRYOSTRANSFERRED);
                    $doc->exportCaption($this->DAYOFEMBRYOS);
                    $doc->exportCaption($this->CRYOPRESERVEDEMBRYOS);
                    $doc->exportCaption($this->ViaAdmin);
                    $doc->exportCaption($this->ViaStartDateTime);
                    $doc->exportCaption($this->ViaDose);
                    $doc->exportCaption($this->AllFreeze);
                    $doc->exportCaption($this->TreatmentCancel);
                    $doc->exportCaption($this->ProgesteroneAdmin);
                    $doc->exportCaption($this->ProgesteroneStart);
                    $doc->exportCaption($this->ProgesteroneDose);
                    $doc->exportCaption($this->StChDate14);
                    $doc->exportCaption($this->StChDate15);
                    $doc->exportCaption($this->StChDate16);
                    $doc->exportCaption($this->StChDate17);
                    $doc->exportCaption($this->StChDate18);
                    $doc->exportCaption($this->StChDate19);
                    $doc->exportCaption($this->StChDate20);
                    $doc->exportCaption($this->StChDate21);
                    $doc->exportCaption($this->StChDate22);
                    $doc->exportCaption($this->StChDate23);
                    $doc->exportCaption($this->StChDate24);
                    $doc->exportCaption($this->StChDate25);
                    $doc->exportCaption($this->CycleDay14);
                    $doc->exportCaption($this->CycleDay15);
                    $doc->exportCaption($this->CycleDay16);
                    $doc->exportCaption($this->CycleDay17);
                    $doc->exportCaption($this->CycleDay18);
                    $doc->exportCaption($this->CycleDay19);
                    $doc->exportCaption($this->CycleDay20);
                    $doc->exportCaption($this->CycleDay21);
                    $doc->exportCaption($this->CycleDay22);
                    $doc->exportCaption($this->CycleDay23);
                    $doc->exportCaption($this->CycleDay24);
                    $doc->exportCaption($this->CycleDay25);
                    $doc->exportCaption($this->StimulationDay14);
                    $doc->exportCaption($this->StimulationDay15);
                    $doc->exportCaption($this->StimulationDay16);
                    $doc->exportCaption($this->StimulationDay17);
                    $doc->exportCaption($this->StimulationDay18);
                    $doc->exportCaption($this->StimulationDay19);
                    $doc->exportCaption($this->StimulationDay20);
                    $doc->exportCaption($this->StimulationDay21);
                    $doc->exportCaption($this->StimulationDay22);
                    $doc->exportCaption($this->StimulationDay23);
                    $doc->exportCaption($this->StimulationDay24);
                    $doc->exportCaption($this->StimulationDay25);
                    $doc->exportCaption($this->Tablet14);
                    $doc->exportCaption($this->Tablet15);
                    $doc->exportCaption($this->Tablet16);
                    $doc->exportCaption($this->Tablet17);
                    $doc->exportCaption($this->Tablet18);
                    $doc->exportCaption($this->Tablet19);
                    $doc->exportCaption($this->Tablet20);
                    $doc->exportCaption($this->Tablet21);
                    $doc->exportCaption($this->Tablet22);
                    $doc->exportCaption($this->Tablet23);
                    $doc->exportCaption($this->Tablet24);
                    $doc->exportCaption($this->Tablet25);
                    $doc->exportCaption($this->RFSH14);
                    $doc->exportCaption($this->RFSH15);
                    $doc->exportCaption($this->RFSH16);
                    $doc->exportCaption($this->RFSH17);
                    $doc->exportCaption($this->RFSH18);
                    $doc->exportCaption($this->RFSH19);
                    $doc->exportCaption($this->RFSH20);
                    $doc->exportCaption($this->RFSH21);
                    $doc->exportCaption($this->RFSH22);
                    $doc->exportCaption($this->RFSH23);
                    $doc->exportCaption($this->RFSH24);
                    $doc->exportCaption($this->RFSH25);
                    $doc->exportCaption($this->HMG14);
                    $doc->exportCaption($this->HMG15);
                    $doc->exportCaption($this->HMG16);
                    $doc->exportCaption($this->HMG17);
                    $doc->exportCaption($this->HMG18);
                    $doc->exportCaption($this->HMG19);
                    $doc->exportCaption($this->HMG20);
                    $doc->exportCaption($this->HMG21);
                    $doc->exportCaption($this->HMG22);
                    $doc->exportCaption($this->HMG23);
                    $doc->exportCaption($this->HMG24);
                    $doc->exportCaption($this->HMG25);
                    $doc->exportCaption($this->GnRH14);
                    $doc->exportCaption($this->GnRH15);
                    $doc->exportCaption($this->GnRH16);
                    $doc->exportCaption($this->GnRH17);
                    $doc->exportCaption($this->GnRH18);
                    $doc->exportCaption($this->GnRH19);
                    $doc->exportCaption($this->GnRH20);
                    $doc->exportCaption($this->GnRH21);
                    $doc->exportCaption($this->GnRH22);
                    $doc->exportCaption($this->GnRH23);
                    $doc->exportCaption($this->GnRH24);
                    $doc->exportCaption($this->GnRH25);
                    $doc->exportCaption($this->P414);
                    $doc->exportCaption($this->P415);
                    $doc->exportCaption($this->P416);
                    $doc->exportCaption($this->P417);
                    $doc->exportCaption($this->P418);
                    $doc->exportCaption($this->P419);
                    $doc->exportCaption($this->P420);
                    $doc->exportCaption($this->P421);
                    $doc->exportCaption($this->P422);
                    $doc->exportCaption($this->P423);
                    $doc->exportCaption($this->P424);
                    $doc->exportCaption($this->P425);
                    $doc->exportCaption($this->USGRt14);
                    $doc->exportCaption($this->USGRt15);
                    $doc->exportCaption($this->USGRt16);
                    $doc->exportCaption($this->USGRt17);
                    $doc->exportCaption($this->USGRt18);
                    $doc->exportCaption($this->USGRt19);
                    $doc->exportCaption($this->USGRt20);
                    $doc->exportCaption($this->USGRt21);
                    $doc->exportCaption($this->USGRt22);
                    $doc->exportCaption($this->USGRt23);
                    $doc->exportCaption($this->USGRt24);
                    $doc->exportCaption($this->USGRt25);
                    $doc->exportCaption($this->USGLt14);
                    $doc->exportCaption($this->USGLt15);
                    $doc->exportCaption($this->USGLt16);
                    $doc->exportCaption($this->USGLt17);
                    $doc->exportCaption($this->USGLt18);
                    $doc->exportCaption($this->USGLt19);
                    $doc->exportCaption($this->USGLt20);
                    $doc->exportCaption($this->USGLt21);
                    $doc->exportCaption($this->USGLt22);
                    $doc->exportCaption($this->USGLt23);
                    $doc->exportCaption($this->USGLt24);
                    $doc->exportCaption($this->USGLt25);
                    $doc->exportCaption($this->EM14);
                    $doc->exportCaption($this->EM15);
                    $doc->exportCaption($this->EM16);
                    $doc->exportCaption($this->EM17);
                    $doc->exportCaption($this->EM18);
                    $doc->exportCaption($this->EM19);
                    $doc->exportCaption($this->EM20);
                    $doc->exportCaption($this->EM21);
                    $doc->exportCaption($this->EM22);
                    $doc->exportCaption($this->EM23);
                    $doc->exportCaption($this->EM24);
                    $doc->exportCaption($this->EM25);
                    $doc->exportCaption($this->Others14);
                    $doc->exportCaption($this->Others15);
                    $doc->exportCaption($this->Others16);
                    $doc->exportCaption($this->Others17);
                    $doc->exportCaption($this->Others18);
                    $doc->exportCaption($this->Others19);
                    $doc->exportCaption($this->Others20);
                    $doc->exportCaption($this->Others21);
                    $doc->exportCaption($this->Others22);
                    $doc->exportCaption($this->Others23);
                    $doc->exportCaption($this->Others24);
                    $doc->exportCaption($this->Others25);
                    $doc->exportCaption($this->DR14);
                    $doc->exportCaption($this->DR15);
                    $doc->exportCaption($this->DR16);
                    $doc->exportCaption($this->DR17);
                    $doc->exportCaption($this->DR18);
                    $doc->exportCaption($this->DR19);
                    $doc->exportCaption($this->DR20);
                    $doc->exportCaption($this->DR21);
                    $doc->exportCaption($this->DR22);
                    $doc->exportCaption($this->DR23);
                    $doc->exportCaption($this->DR24);
                    $doc->exportCaption($this->DR25);
                    $doc->exportCaption($this->E214);
                    $doc->exportCaption($this->E215);
                    $doc->exportCaption($this->E216);
                    $doc->exportCaption($this->E217);
                    $doc->exportCaption($this->E218);
                    $doc->exportCaption($this->E219);
                    $doc->exportCaption($this->E220);
                    $doc->exportCaption($this->E221);
                    $doc->exportCaption($this->E222);
                    $doc->exportCaption($this->E223);
                    $doc->exportCaption($this->E224);
                    $doc->exportCaption($this->E225);
                    $doc->exportCaption($this->EEETTTDTE);
                    $doc->exportCaption($this->bhcgdate);
                    $doc->exportCaption($this->TUBAL_PATENCY);
                    $doc->exportCaption($this->HSG);
                    $doc->exportCaption($this->DHL);
                    $doc->exportCaption($this->UTERINE_PROBLEMS);
                    $doc->exportCaption($this->W_COMORBIDS);
                    $doc->exportCaption($this->H_COMORBIDS);
                    $doc->exportCaption($this->SEXUAL_DYSFUNCTION);
                    $doc->exportCaption($this->TABLETS);
                    $doc->exportCaption($this->FOLLICLE_STATUS);
                    $doc->exportCaption($this->NUMBER_OF_IUI);
                    $doc->exportCaption($this->PROCEDURE);
                    $doc->exportCaption($this->LUTEAL_SUPPORT);
                    $doc->exportCaption($this->SPECIFIC_MATERNAL_PROBLEMS);
                    $doc->exportCaption($this->ONGOING_PREG);
                    $doc->exportCaption($this->EDD_Date);
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
                        $doc->exportField($this->FemaleFactor);
                        $doc->exportField($this->MaleFactor);
                        $doc->exportField($this->Protocol);
                        $doc->exportField($this->SemenFrozen);
                        $doc->exportField($this->A4ICSICycle);
                        $doc->exportField($this->TotalICSICycle);
                        $doc->exportField($this->TypeOfInfertility);
                        $doc->exportField($this->Duration);
                        $doc->exportField($this->LMP);
                        $doc->exportField($this->RelevantHistory);
                        $doc->exportField($this->IUICycles);
                        $doc->exportField($this->AFC);
                        $doc->exportField($this->AMH);
                        $doc->exportField($this->FBMI);
                        $doc->exportField($this->MBMI);
                        $doc->exportField($this->OvarianVolumeRT);
                        $doc->exportField($this->OvarianVolumeLT);
                        $doc->exportField($this->DAYSOFSTIMULATION);
                        $doc->exportField($this->DOSEOFGONADOTROPINS);
                        $doc->exportField($this->INJTYPE);
                        $doc->exportField($this->ANTAGONISTDAYS);
                        $doc->exportField($this->ANTAGONISTSTARTDAY);
                        $doc->exportField($this->GROWTHHORMONE);
                        $doc->exportField($this->PRETREATMENT);
                        $doc->exportField($this->SerumP4);
                        $doc->exportField($this->FORT);
                        $doc->exportField($this->MedicalFactors);
                        $doc->exportField($this->SCDate);
                        $doc->exportField($this->OvarianSurgery);
                        $doc->exportField($this->PreProcedureOrder);
                        $doc->exportField($this->TRIGGERR);
                        $doc->exportField($this->TRIGGERDATE);
                        $doc->exportField($this->ATHOMEorCLINIC);
                        $doc->exportField($this->OPUDATE);
                        $doc->exportField($this->ALLFREEZEINDICATION);
                        $doc->exportField($this->ERA);
                        $doc->exportField($this->PGTA);
                        $doc->exportField($this->PGD);
                        $doc->exportField($this->DATEOFET);
                        $doc->exportField($this->ET);
                        $doc->exportField($this->ESET);
                        $doc->exportField($this->DOET);
                        $doc->exportField($this->SEMENPREPARATION);
                        $doc->exportField($this->REASONFORESET);
                        $doc->exportField($this->Expectedoocytes);
                        $doc->exportField($this->StChDate1);
                        $doc->exportField($this->StChDate2);
                        $doc->exportField($this->StChDate3);
                        $doc->exportField($this->StChDate4);
                        $doc->exportField($this->StChDate5);
                        $doc->exportField($this->StChDate6);
                        $doc->exportField($this->StChDate7);
                        $doc->exportField($this->StChDate8);
                        $doc->exportField($this->StChDate9);
                        $doc->exportField($this->StChDate10);
                        $doc->exportField($this->StChDate11);
                        $doc->exportField($this->StChDate12);
                        $doc->exportField($this->StChDate13);
                        $doc->exportField($this->CycleDay1);
                        $doc->exportField($this->CycleDay2);
                        $doc->exportField($this->CycleDay3);
                        $doc->exportField($this->CycleDay4);
                        $doc->exportField($this->CycleDay5);
                        $doc->exportField($this->CycleDay6);
                        $doc->exportField($this->CycleDay7);
                        $doc->exportField($this->CycleDay8);
                        $doc->exportField($this->CycleDay9);
                        $doc->exportField($this->CycleDay10);
                        $doc->exportField($this->CycleDay11);
                        $doc->exportField($this->CycleDay12);
                        $doc->exportField($this->CycleDay13);
                        $doc->exportField($this->StimulationDay1);
                        $doc->exportField($this->StimulationDay2);
                        $doc->exportField($this->StimulationDay3);
                        $doc->exportField($this->StimulationDay4);
                        $doc->exportField($this->StimulationDay5);
                        $doc->exportField($this->StimulationDay6);
                        $doc->exportField($this->StimulationDay7);
                        $doc->exportField($this->StimulationDay8);
                        $doc->exportField($this->StimulationDay9);
                        $doc->exportField($this->StimulationDay10);
                        $doc->exportField($this->StimulationDay11);
                        $doc->exportField($this->StimulationDay12);
                        $doc->exportField($this->StimulationDay13);
                        $doc->exportField($this->Tablet1);
                        $doc->exportField($this->Tablet2);
                        $doc->exportField($this->Tablet3);
                        $doc->exportField($this->Tablet4);
                        $doc->exportField($this->Tablet5);
                        $doc->exportField($this->Tablet6);
                        $doc->exportField($this->Tablet7);
                        $doc->exportField($this->Tablet8);
                        $doc->exportField($this->Tablet9);
                        $doc->exportField($this->Tablet10);
                        $doc->exportField($this->Tablet11);
                        $doc->exportField($this->Tablet12);
                        $doc->exportField($this->Tablet13);
                        $doc->exportField($this->RFSH1);
                        $doc->exportField($this->RFSH2);
                        $doc->exportField($this->RFSH3);
                        $doc->exportField($this->RFSH4);
                        $doc->exportField($this->RFSH5);
                        $doc->exportField($this->RFSH6);
                        $doc->exportField($this->RFSH7);
                        $doc->exportField($this->RFSH8);
                        $doc->exportField($this->RFSH9);
                        $doc->exportField($this->RFSH10);
                        $doc->exportField($this->RFSH11);
                        $doc->exportField($this->RFSH12);
                        $doc->exportField($this->RFSH13);
                        $doc->exportField($this->HMG1);
                        $doc->exportField($this->HMG2);
                        $doc->exportField($this->HMG3);
                        $doc->exportField($this->HMG4);
                        $doc->exportField($this->HMG5);
                        $doc->exportField($this->HMG6);
                        $doc->exportField($this->HMG7);
                        $doc->exportField($this->HMG8);
                        $doc->exportField($this->HMG9);
                        $doc->exportField($this->HMG10);
                        $doc->exportField($this->HMG11);
                        $doc->exportField($this->HMG12);
                        $doc->exportField($this->HMG13);
                        $doc->exportField($this->GnRH1);
                        $doc->exportField($this->GnRH2);
                        $doc->exportField($this->GnRH3);
                        $doc->exportField($this->GnRH4);
                        $doc->exportField($this->GnRH5);
                        $doc->exportField($this->GnRH6);
                        $doc->exportField($this->GnRH7);
                        $doc->exportField($this->GnRH8);
                        $doc->exportField($this->GnRH9);
                        $doc->exportField($this->GnRH10);
                        $doc->exportField($this->GnRH11);
                        $doc->exportField($this->GnRH12);
                        $doc->exportField($this->GnRH13);
                        $doc->exportField($this->E21);
                        $doc->exportField($this->E22);
                        $doc->exportField($this->E23);
                        $doc->exportField($this->E24);
                        $doc->exportField($this->E25);
                        $doc->exportField($this->E26);
                        $doc->exportField($this->E27);
                        $doc->exportField($this->E28);
                        $doc->exportField($this->E29);
                        $doc->exportField($this->E210);
                        $doc->exportField($this->E211);
                        $doc->exportField($this->E212);
                        $doc->exportField($this->E213);
                        $doc->exportField($this->P41);
                        $doc->exportField($this->P42);
                        $doc->exportField($this->P43);
                        $doc->exportField($this->P44);
                        $doc->exportField($this->P45);
                        $doc->exportField($this->P46);
                        $doc->exportField($this->P47);
                        $doc->exportField($this->P48);
                        $doc->exportField($this->P49);
                        $doc->exportField($this->P410);
                        $doc->exportField($this->P411);
                        $doc->exportField($this->P412);
                        $doc->exportField($this->P413);
                        $doc->exportField($this->USGRt1);
                        $doc->exportField($this->USGRt2);
                        $doc->exportField($this->USGRt3);
                        $doc->exportField($this->USGRt4);
                        $doc->exportField($this->USGRt5);
                        $doc->exportField($this->USGRt6);
                        $doc->exportField($this->USGRt7);
                        $doc->exportField($this->USGRt8);
                        $doc->exportField($this->USGRt9);
                        $doc->exportField($this->USGRt10);
                        $doc->exportField($this->USGRt11);
                        $doc->exportField($this->USGRt12);
                        $doc->exportField($this->USGRt13);
                        $doc->exportField($this->USGLt1);
                        $doc->exportField($this->USGLt2);
                        $doc->exportField($this->USGLt3);
                        $doc->exportField($this->USGLt4);
                        $doc->exportField($this->USGLt5);
                        $doc->exportField($this->USGLt6);
                        $doc->exportField($this->USGLt7);
                        $doc->exportField($this->USGLt8);
                        $doc->exportField($this->USGLt9);
                        $doc->exportField($this->USGLt10);
                        $doc->exportField($this->USGLt11);
                        $doc->exportField($this->USGLt12);
                        $doc->exportField($this->USGLt13);
                        $doc->exportField($this->EM1);
                        $doc->exportField($this->EM2);
                        $doc->exportField($this->EM3);
                        $doc->exportField($this->EM4);
                        $doc->exportField($this->EM5);
                        $doc->exportField($this->EM6);
                        $doc->exportField($this->EM7);
                        $doc->exportField($this->EM8);
                        $doc->exportField($this->EM9);
                        $doc->exportField($this->EM10);
                        $doc->exportField($this->EM11);
                        $doc->exportField($this->EM12);
                        $doc->exportField($this->EM13);
                        $doc->exportField($this->Others1);
                        $doc->exportField($this->Others2);
                        $doc->exportField($this->Others3);
                        $doc->exportField($this->Others4);
                        $doc->exportField($this->Others5);
                        $doc->exportField($this->Others6);
                        $doc->exportField($this->Others7);
                        $doc->exportField($this->Others8);
                        $doc->exportField($this->Others9);
                        $doc->exportField($this->Others10);
                        $doc->exportField($this->Others11);
                        $doc->exportField($this->Others12);
                        $doc->exportField($this->Others13);
                        $doc->exportField($this->DR1);
                        $doc->exportField($this->DR2);
                        $doc->exportField($this->DR3);
                        $doc->exportField($this->DR4);
                        $doc->exportField($this->DR5);
                        $doc->exportField($this->DR6);
                        $doc->exportField($this->DR7);
                        $doc->exportField($this->DR8);
                        $doc->exportField($this->DR9);
                        $doc->exportField($this->DR10);
                        $doc->exportField($this->DR11);
                        $doc->exportField($this->DR12);
                        $doc->exportField($this->DR13);
                        $doc->exportField($this->DOCTORRESPONSIBLE);
                        $doc->exportField($this->TidNo);
                        $doc->exportField($this->Convert);
                        $doc->exportField($this->Consultant);
                        $doc->exportField($this->InseminatinTechnique);
                        $doc->exportField($this->IndicationForART);
                        $doc->exportField($this->Hysteroscopy);
                        $doc->exportField($this->EndometrialScratching);
                        $doc->exportField($this->TrialCannulation);
                        $doc->exportField($this->CYCLETYPE);
                        $doc->exportField($this->HRTCYCLE);
                        $doc->exportField($this->OralEstrogenDosage);
                        $doc->exportField($this->VaginalEstrogen);
                        $doc->exportField($this->GCSF);
                        $doc->exportField($this->ActivatedPRP);
                        $doc->exportField($this->UCLcm);
                        $doc->exportField($this->DATOFEMBRYOTRANSFER);
                        $doc->exportField($this->DAYOFEMBRYOTRANSFER);
                        $doc->exportField($this->NOOFEMBRYOSTHAWED);
                        $doc->exportField($this->NOOFEMBRYOSTRANSFERRED);
                        $doc->exportField($this->DAYOFEMBRYOS);
                        $doc->exportField($this->CRYOPRESERVEDEMBRYOS);
                        $doc->exportField($this->ViaAdmin);
                        $doc->exportField($this->ViaStartDateTime);
                        $doc->exportField($this->ViaDose);
                        $doc->exportField($this->AllFreeze);
                        $doc->exportField($this->TreatmentCancel);
                        $doc->exportField($this->Reason);
                        $doc->exportField($this->ProgesteroneAdmin);
                        $doc->exportField($this->ProgesteroneStart);
                        $doc->exportField($this->ProgesteroneDose);
                        $doc->exportField($this->Projectron);
                        $doc->exportField($this->StChDate14);
                        $doc->exportField($this->StChDate15);
                        $doc->exportField($this->StChDate16);
                        $doc->exportField($this->StChDate17);
                        $doc->exportField($this->StChDate18);
                        $doc->exportField($this->StChDate19);
                        $doc->exportField($this->StChDate20);
                        $doc->exportField($this->StChDate21);
                        $doc->exportField($this->StChDate22);
                        $doc->exportField($this->StChDate23);
                        $doc->exportField($this->StChDate24);
                        $doc->exportField($this->StChDate25);
                        $doc->exportField($this->CycleDay14);
                        $doc->exportField($this->CycleDay15);
                        $doc->exportField($this->CycleDay16);
                        $doc->exportField($this->CycleDay17);
                        $doc->exportField($this->CycleDay18);
                        $doc->exportField($this->CycleDay19);
                        $doc->exportField($this->CycleDay20);
                        $doc->exportField($this->CycleDay21);
                        $doc->exportField($this->CycleDay22);
                        $doc->exportField($this->CycleDay23);
                        $doc->exportField($this->CycleDay24);
                        $doc->exportField($this->CycleDay25);
                        $doc->exportField($this->StimulationDay14);
                        $doc->exportField($this->StimulationDay15);
                        $doc->exportField($this->StimulationDay16);
                        $doc->exportField($this->StimulationDay17);
                        $doc->exportField($this->StimulationDay18);
                        $doc->exportField($this->StimulationDay19);
                        $doc->exportField($this->StimulationDay20);
                        $doc->exportField($this->StimulationDay21);
                        $doc->exportField($this->StimulationDay22);
                        $doc->exportField($this->StimulationDay23);
                        $doc->exportField($this->StimulationDay24);
                        $doc->exportField($this->StimulationDay25);
                        $doc->exportField($this->Tablet14);
                        $doc->exportField($this->Tablet15);
                        $doc->exportField($this->Tablet16);
                        $doc->exportField($this->Tablet17);
                        $doc->exportField($this->Tablet18);
                        $doc->exportField($this->Tablet19);
                        $doc->exportField($this->Tablet20);
                        $doc->exportField($this->Tablet21);
                        $doc->exportField($this->Tablet22);
                        $doc->exportField($this->Tablet23);
                        $doc->exportField($this->Tablet24);
                        $doc->exportField($this->Tablet25);
                        $doc->exportField($this->RFSH14);
                        $doc->exportField($this->RFSH15);
                        $doc->exportField($this->RFSH16);
                        $doc->exportField($this->RFSH17);
                        $doc->exportField($this->RFSH18);
                        $doc->exportField($this->RFSH19);
                        $doc->exportField($this->RFSH20);
                        $doc->exportField($this->RFSH21);
                        $doc->exportField($this->RFSH22);
                        $doc->exportField($this->RFSH23);
                        $doc->exportField($this->RFSH24);
                        $doc->exportField($this->RFSH25);
                        $doc->exportField($this->HMG14);
                        $doc->exportField($this->HMG15);
                        $doc->exportField($this->HMG16);
                        $doc->exportField($this->HMG17);
                        $doc->exportField($this->HMG18);
                        $doc->exportField($this->HMG19);
                        $doc->exportField($this->HMG20);
                        $doc->exportField($this->HMG21);
                        $doc->exportField($this->HMG22);
                        $doc->exportField($this->HMG23);
                        $doc->exportField($this->HMG24);
                        $doc->exportField($this->HMG25);
                        $doc->exportField($this->GnRH14);
                        $doc->exportField($this->GnRH15);
                        $doc->exportField($this->GnRH16);
                        $doc->exportField($this->GnRH17);
                        $doc->exportField($this->GnRH18);
                        $doc->exportField($this->GnRH19);
                        $doc->exportField($this->GnRH20);
                        $doc->exportField($this->GnRH21);
                        $doc->exportField($this->GnRH22);
                        $doc->exportField($this->GnRH23);
                        $doc->exportField($this->GnRH24);
                        $doc->exportField($this->GnRH25);
                        $doc->exportField($this->P414);
                        $doc->exportField($this->P415);
                        $doc->exportField($this->P416);
                        $doc->exportField($this->P417);
                        $doc->exportField($this->P418);
                        $doc->exportField($this->P419);
                        $doc->exportField($this->P420);
                        $doc->exportField($this->P421);
                        $doc->exportField($this->P422);
                        $doc->exportField($this->P423);
                        $doc->exportField($this->P424);
                        $doc->exportField($this->P425);
                        $doc->exportField($this->USGRt14);
                        $doc->exportField($this->USGRt15);
                        $doc->exportField($this->USGRt16);
                        $doc->exportField($this->USGRt17);
                        $doc->exportField($this->USGRt18);
                        $doc->exportField($this->USGRt19);
                        $doc->exportField($this->USGRt20);
                        $doc->exportField($this->USGRt21);
                        $doc->exportField($this->USGRt22);
                        $doc->exportField($this->USGRt23);
                        $doc->exportField($this->USGRt24);
                        $doc->exportField($this->USGRt25);
                        $doc->exportField($this->USGLt14);
                        $doc->exportField($this->USGLt15);
                        $doc->exportField($this->USGLt16);
                        $doc->exportField($this->USGLt17);
                        $doc->exportField($this->USGLt18);
                        $doc->exportField($this->USGLt19);
                        $doc->exportField($this->USGLt20);
                        $doc->exportField($this->USGLt21);
                        $doc->exportField($this->USGLt22);
                        $doc->exportField($this->USGLt23);
                        $doc->exportField($this->USGLt24);
                        $doc->exportField($this->USGLt25);
                        $doc->exportField($this->EM14);
                        $doc->exportField($this->EM15);
                        $doc->exportField($this->EM16);
                        $doc->exportField($this->EM17);
                        $doc->exportField($this->EM18);
                        $doc->exportField($this->EM19);
                        $doc->exportField($this->EM20);
                        $doc->exportField($this->EM21);
                        $doc->exportField($this->EM22);
                        $doc->exportField($this->EM23);
                        $doc->exportField($this->EM24);
                        $doc->exportField($this->EM25);
                        $doc->exportField($this->Others14);
                        $doc->exportField($this->Others15);
                        $doc->exportField($this->Others16);
                        $doc->exportField($this->Others17);
                        $doc->exportField($this->Others18);
                        $doc->exportField($this->Others19);
                        $doc->exportField($this->Others20);
                        $doc->exportField($this->Others21);
                        $doc->exportField($this->Others22);
                        $doc->exportField($this->Others23);
                        $doc->exportField($this->Others24);
                        $doc->exportField($this->Others25);
                        $doc->exportField($this->DR14);
                        $doc->exportField($this->DR15);
                        $doc->exportField($this->DR16);
                        $doc->exportField($this->DR17);
                        $doc->exportField($this->DR18);
                        $doc->exportField($this->DR19);
                        $doc->exportField($this->DR20);
                        $doc->exportField($this->DR21);
                        $doc->exportField($this->DR22);
                        $doc->exportField($this->DR23);
                        $doc->exportField($this->DR24);
                        $doc->exportField($this->DR25);
                        $doc->exportField($this->E214);
                        $doc->exportField($this->E215);
                        $doc->exportField($this->E216);
                        $doc->exportField($this->E217);
                        $doc->exportField($this->E218);
                        $doc->exportField($this->E219);
                        $doc->exportField($this->E220);
                        $doc->exportField($this->E221);
                        $doc->exportField($this->E222);
                        $doc->exportField($this->E223);
                        $doc->exportField($this->E224);
                        $doc->exportField($this->E225);
                        $doc->exportField($this->EEETTTDTE);
                        $doc->exportField($this->bhcgdate);
                        $doc->exportField($this->TUBAL_PATENCY);
                        $doc->exportField($this->HSG);
                        $doc->exportField($this->DHL);
                        $doc->exportField($this->UTERINE_PROBLEMS);
                        $doc->exportField($this->W_COMORBIDS);
                        $doc->exportField($this->H_COMORBIDS);
                        $doc->exportField($this->SEXUAL_DYSFUNCTION);
                        $doc->exportField($this->TABLETS);
                        $doc->exportField($this->FOLLICLE_STATUS);
                        $doc->exportField($this->NUMBER_OF_IUI);
                        $doc->exportField($this->PROCEDURE);
                        $doc->exportField($this->LUTEAL_SUPPORT);
                        $doc->exportField($this->SPECIFIC_MATERNAL_PROBLEMS);
                        $doc->exportField($this->ONGOING_PREG);
                        $doc->exportField($this->EDD_Date);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->RIDNo);
                        $doc->exportField($this->Name);
                        $doc->exportField($this->ARTCycle);
                        $doc->exportField($this->FemaleFactor);
                        $doc->exportField($this->MaleFactor);
                        $doc->exportField($this->Protocol);
                        $doc->exportField($this->SemenFrozen);
                        $doc->exportField($this->A4ICSICycle);
                        $doc->exportField($this->TotalICSICycle);
                        $doc->exportField($this->TypeOfInfertility);
                        $doc->exportField($this->Duration);
                        $doc->exportField($this->LMP);
                        $doc->exportField($this->RelevantHistory);
                        $doc->exportField($this->IUICycles);
                        $doc->exportField($this->AFC);
                        $doc->exportField($this->AMH);
                        $doc->exportField($this->FBMI);
                        $doc->exportField($this->MBMI);
                        $doc->exportField($this->OvarianVolumeRT);
                        $doc->exportField($this->OvarianVolumeLT);
                        $doc->exportField($this->DAYSOFSTIMULATION);
                        $doc->exportField($this->DOSEOFGONADOTROPINS);
                        $doc->exportField($this->INJTYPE);
                        $doc->exportField($this->ANTAGONISTDAYS);
                        $doc->exportField($this->ANTAGONISTSTARTDAY);
                        $doc->exportField($this->GROWTHHORMONE);
                        $doc->exportField($this->PRETREATMENT);
                        $doc->exportField($this->SerumP4);
                        $doc->exportField($this->FORT);
                        $doc->exportField($this->MedicalFactors);
                        $doc->exportField($this->SCDate);
                        $doc->exportField($this->OvarianSurgery);
                        $doc->exportField($this->PreProcedureOrder);
                        $doc->exportField($this->TRIGGERR);
                        $doc->exportField($this->TRIGGERDATE);
                        $doc->exportField($this->ATHOMEorCLINIC);
                        $doc->exportField($this->OPUDATE);
                        $doc->exportField($this->ALLFREEZEINDICATION);
                        $doc->exportField($this->ERA);
                        $doc->exportField($this->PGTA);
                        $doc->exportField($this->PGD);
                        $doc->exportField($this->DATEOFET);
                        $doc->exportField($this->ET);
                        $doc->exportField($this->ESET);
                        $doc->exportField($this->DOET);
                        $doc->exportField($this->SEMENPREPARATION);
                        $doc->exportField($this->REASONFORESET);
                        $doc->exportField($this->Expectedoocytes);
                        $doc->exportField($this->StChDate1);
                        $doc->exportField($this->StChDate2);
                        $doc->exportField($this->StChDate3);
                        $doc->exportField($this->StChDate4);
                        $doc->exportField($this->StChDate5);
                        $doc->exportField($this->StChDate6);
                        $doc->exportField($this->StChDate7);
                        $doc->exportField($this->StChDate8);
                        $doc->exportField($this->StChDate9);
                        $doc->exportField($this->StChDate10);
                        $doc->exportField($this->StChDate11);
                        $doc->exportField($this->StChDate12);
                        $doc->exportField($this->StChDate13);
                        $doc->exportField($this->CycleDay1);
                        $doc->exportField($this->CycleDay2);
                        $doc->exportField($this->CycleDay3);
                        $doc->exportField($this->CycleDay4);
                        $doc->exportField($this->CycleDay5);
                        $doc->exportField($this->CycleDay6);
                        $doc->exportField($this->CycleDay7);
                        $doc->exportField($this->CycleDay8);
                        $doc->exportField($this->CycleDay9);
                        $doc->exportField($this->CycleDay10);
                        $doc->exportField($this->CycleDay11);
                        $doc->exportField($this->CycleDay12);
                        $doc->exportField($this->CycleDay13);
                        $doc->exportField($this->StimulationDay1);
                        $doc->exportField($this->StimulationDay2);
                        $doc->exportField($this->StimulationDay3);
                        $doc->exportField($this->StimulationDay4);
                        $doc->exportField($this->StimulationDay5);
                        $doc->exportField($this->StimulationDay6);
                        $doc->exportField($this->StimulationDay7);
                        $doc->exportField($this->StimulationDay8);
                        $doc->exportField($this->StimulationDay9);
                        $doc->exportField($this->StimulationDay10);
                        $doc->exportField($this->StimulationDay11);
                        $doc->exportField($this->StimulationDay12);
                        $doc->exportField($this->StimulationDay13);
                        $doc->exportField($this->Tablet1);
                        $doc->exportField($this->Tablet2);
                        $doc->exportField($this->Tablet3);
                        $doc->exportField($this->Tablet4);
                        $doc->exportField($this->Tablet5);
                        $doc->exportField($this->Tablet6);
                        $doc->exportField($this->Tablet7);
                        $doc->exportField($this->Tablet8);
                        $doc->exportField($this->Tablet9);
                        $doc->exportField($this->Tablet10);
                        $doc->exportField($this->Tablet11);
                        $doc->exportField($this->Tablet12);
                        $doc->exportField($this->Tablet13);
                        $doc->exportField($this->RFSH1);
                        $doc->exportField($this->RFSH2);
                        $doc->exportField($this->RFSH3);
                        $doc->exportField($this->RFSH4);
                        $doc->exportField($this->RFSH5);
                        $doc->exportField($this->RFSH6);
                        $doc->exportField($this->RFSH7);
                        $doc->exportField($this->RFSH8);
                        $doc->exportField($this->RFSH9);
                        $doc->exportField($this->RFSH10);
                        $doc->exportField($this->RFSH11);
                        $doc->exportField($this->RFSH12);
                        $doc->exportField($this->RFSH13);
                        $doc->exportField($this->HMG1);
                        $doc->exportField($this->HMG2);
                        $doc->exportField($this->HMG3);
                        $doc->exportField($this->HMG4);
                        $doc->exportField($this->HMG5);
                        $doc->exportField($this->HMG6);
                        $doc->exportField($this->HMG7);
                        $doc->exportField($this->HMG8);
                        $doc->exportField($this->HMG9);
                        $doc->exportField($this->HMG10);
                        $doc->exportField($this->HMG11);
                        $doc->exportField($this->HMG12);
                        $doc->exportField($this->HMG13);
                        $doc->exportField($this->GnRH1);
                        $doc->exportField($this->GnRH2);
                        $doc->exportField($this->GnRH3);
                        $doc->exportField($this->GnRH4);
                        $doc->exportField($this->GnRH5);
                        $doc->exportField($this->GnRH6);
                        $doc->exportField($this->GnRH7);
                        $doc->exportField($this->GnRH8);
                        $doc->exportField($this->GnRH9);
                        $doc->exportField($this->GnRH10);
                        $doc->exportField($this->GnRH11);
                        $doc->exportField($this->GnRH12);
                        $doc->exportField($this->GnRH13);
                        $doc->exportField($this->E21);
                        $doc->exportField($this->E22);
                        $doc->exportField($this->E23);
                        $doc->exportField($this->E24);
                        $doc->exportField($this->E25);
                        $doc->exportField($this->E26);
                        $doc->exportField($this->E27);
                        $doc->exportField($this->E28);
                        $doc->exportField($this->E29);
                        $doc->exportField($this->E210);
                        $doc->exportField($this->E211);
                        $doc->exportField($this->E212);
                        $doc->exportField($this->E213);
                        $doc->exportField($this->P41);
                        $doc->exportField($this->P42);
                        $doc->exportField($this->P43);
                        $doc->exportField($this->P44);
                        $doc->exportField($this->P45);
                        $doc->exportField($this->P46);
                        $doc->exportField($this->P47);
                        $doc->exportField($this->P48);
                        $doc->exportField($this->P49);
                        $doc->exportField($this->P410);
                        $doc->exportField($this->P411);
                        $doc->exportField($this->P412);
                        $doc->exportField($this->P413);
                        $doc->exportField($this->USGRt1);
                        $doc->exportField($this->USGRt2);
                        $doc->exportField($this->USGRt3);
                        $doc->exportField($this->USGRt4);
                        $doc->exportField($this->USGRt5);
                        $doc->exportField($this->USGRt6);
                        $doc->exportField($this->USGRt7);
                        $doc->exportField($this->USGRt8);
                        $doc->exportField($this->USGRt9);
                        $doc->exportField($this->USGRt10);
                        $doc->exportField($this->USGRt11);
                        $doc->exportField($this->USGRt12);
                        $doc->exportField($this->USGRt13);
                        $doc->exportField($this->USGLt1);
                        $doc->exportField($this->USGLt2);
                        $doc->exportField($this->USGLt3);
                        $doc->exportField($this->USGLt4);
                        $doc->exportField($this->USGLt5);
                        $doc->exportField($this->USGLt6);
                        $doc->exportField($this->USGLt7);
                        $doc->exportField($this->USGLt8);
                        $doc->exportField($this->USGLt9);
                        $doc->exportField($this->USGLt10);
                        $doc->exportField($this->USGLt11);
                        $doc->exportField($this->USGLt12);
                        $doc->exportField($this->USGLt13);
                        $doc->exportField($this->EM1);
                        $doc->exportField($this->EM2);
                        $doc->exportField($this->EM3);
                        $doc->exportField($this->EM4);
                        $doc->exportField($this->EM5);
                        $doc->exportField($this->EM6);
                        $doc->exportField($this->EM7);
                        $doc->exportField($this->EM8);
                        $doc->exportField($this->EM9);
                        $doc->exportField($this->EM10);
                        $doc->exportField($this->EM11);
                        $doc->exportField($this->EM12);
                        $doc->exportField($this->EM13);
                        $doc->exportField($this->Others1);
                        $doc->exportField($this->Others2);
                        $doc->exportField($this->Others3);
                        $doc->exportField($this->Others4);
                        $doc->exportField($this->Others5);
                        $doc->exportField($this->Others6);
                        $doc->exportField($this->Others7);
                        $doc->exportField($this->Others8);
                        $doc->exportField($this->Others9);
                        $doc->exportField($this->Others10);
                        $doc->exportField($this->Others11);
                        $doc->exportField($this->Others12);
                        $doc->exportField($this->Others13);
                        $doc->exportField($this->DR1);
                        $doc->exportField($this->DR2);
                        $doc->exportField($this->DR3);
                        $doc->exportField($this->DR4);
                        $doc->exportField($this->DR5);
                        $doc->exportField($this->DR6);
                        $doc->exportField($this->DR7);
                        $doc->exportField($this->DR8);
                        $doc->exportField($this->DR9);
                        $doc->exportField($this->DR10);
                        $doc->exportField($this->DR11);
                        $doc->exportField($this->DR12);
                        $doc->exportField($this->DR13);
                        $doc->exportField($this->TidNo);
                        $doc->exportField($this->Convert);
                        $doc->exportField($this->Consultant);
                        $doc->exportField($this->InseminatinTechnique);
                        $doc->exportField($this->IndicationForART);
                        $doc->exportField($this->Hysteroscopy);
                        $doc->exportField($this->EndometrialScratching);
                        $doc->exportField($this->TrialCannulation);
                        $doc->exportField($this->CYCLETYPE);
                        $doc->exportField($this->HRTCYCLE);
                        $doc->exportField($this->OralEstrogenDosage);
                        $doc->exportField($this->VaginalEstrogen);
                        $doc->exportField($this->GCSF);
                        $doc->exportField($this->ActivatedPRP);
                        $doc->exportField($this->UCLcm);
                        $doc->exportField($this->DATOFEMBRYOTRANSFER);
                        $doc->exportField($this->DAYOFEMBRYOTRANSFER);
                        $doc->exportField($this->NOOFEMBRYOSTHAWED);
                        $doc->exportField($this->NOOFEMBRYOSTRANSFERRED);
                        $doc->exportField($this->DAYOFEMBRYOS);
                        $doc->exportField($this->CRYOPRESERVEDEMBRYOS);
                        $doc->exportField($this->ViaAdmin);
                        $doc->exportField($this->ViaStartDateTime);
                        $doc->exportField($this->ViaDose);
                        $doc->exportField($this->AllFreeze);
                        $doc->exportField($this->TreatmentCancel);
                        $doc->exportField($this->ProgesteroneAdmin);
                        $doc->exportField($this->ProgesteroneStart);
                        $doc->exportField($this->ProgesteroneDose);
                        $doc->exportField($this->StChDate14);
                        $doc->exportField($this->StChDate15);
                        $doc->exportField($this->StChDate16);
                        $doc->exportField($this->StChDate17);
                        $doc->exportField($this->StChDate18);
                        $doc->exportField($this->StChDate19);
                        $doc->exportField($this->StChDate20);
                        $doc->exportField($this->StChDate21);
                        $doc->exportField($this->StChDate22);
                        $doc->exportField($this->StChDate23);
                        $doc->exportField($this->StChDate24);
                        $doc->exportField($this->StChDate25);
                        $doc->exportField($this->CycleDay14);
                        $doc->exportField($this->CycleDay15);
                        $doc->exportField($this->CycleDay16);
                        $doc->exportField($this->CycleDay17);
                        $doc->exportField($this->CycleDay18);
                        $doc->exportField($this->CycleDay19);
                        $doc->exportField($this->CycleDay20);
                        $doc->exportField($this->CycleDay21);
                        $doc->exportField($this->CycleDay22);
                        $doc->exportField($this->CycleDay23);
                        $doc->exportField($this->CycleDay24);
                        $doc->exportField($this->CycleDay25);
                        $doc->exportField($this->StimulationDay14);
                        $doc->exportField($this->StimulationDay15);
                        $doc->exportField($this->StimulationDay16);
                        $doc->exportField($this->StimulationDay17);
                        $doc->exportField($this->StimulationDay18);
                        $doc->exportField($this->StimulationDay19);
                        $doc->exportField($this->StimulationDay20);
                        $doc->exportField($this->StimulationDay21);
                        $doc->exportField($this->StimulationDay22);
                        $doc->exportField($this->StimulationDay23);
                        $doc->exportField($this->StimulationDay24);
                        $doc->exportField($this->StimulationDay25);
                        $doc->exportField($this->Tablet14);
                        $doc->exportField($this->Tablet15);
                        $doc->exportField($this->Tablet16);
                        $doc->exportField($this->Tablet17);
                        $doc->exportField($this->Tablet18);
                        $doc->exportField($this->Tablet19);
                        $doc->exportField($this->Tablet20);
                        $doc->exportField($this->Tablet21);
                        $doc->exportField($this->Tablet22);
                        $doc->exportField($this->Tablet23);
                        $doc->exportField($this->Tablet24);
                        $doc->exportField($this->Tablet25);
                        $doc->exportField($this->RFSH14);
                        $doc->exportField($this->RFSH15);
                        $doc->exportField($this->RFSH16);
                        $doc->exportField($this->RFSH17);
                        $doc->exportField($this->RFSH18);
                        $doc->exportField($this->RFSH19);
                        $doc->exportField($this->RFSH20);
                        $doc->exportField($this->RFSH21);
                        $doc->exportField($this->RFSH22);
                        $doc->exportField($this->RFSH23);
                        $doc->exportField($this->RFSH24);
                        $doc->exportField($this->RFSH25);
                        $doc->exportField($this->HMG14);
                        $doc->exportField($this->HMG15);
                        $doc->exportField($this->HMG16);
                        $doc->exportField($this->HMG17);
                        $doc->exportField($this->HMG18);
                        $doc->exportField($this->HMG19);
                        $doc->exportField($this->HMG20);
                        $doc->exportField($this->HMG21);
                        $doc->exportField($this->HMG22);
                        $doc->exportField($this->HMG23);
                        $doc->exportField($this->HMG24);
                        $doc->exportField($this->HMG25);
                        $doc->exportField($this->GnRH14);
                        $doc->exportField($this->GnRH15);
                        $doc->exportField($this->GnRH16);
                        $doc->exportField($this->GnRH17);
                        $doc->exportField($this->GnRH18);
                        $doc->exportField($this->GnRH19);
                        $doc->exportField($this->GnRH20);
                        $doc->exportField($this->GnRH21);
                        $doc->exportField($this->GnRH22);
                        $doc->exportField($this->GnRH23);
                        $doc->exportField($this->GnRH24);
                        $doc->exportField($this->GnRH25);
                        $doc->exportField($this->P414);
                        $doc->exportField($this->P415);
                        $doc->exportField($this->P416);
                        $doc->exportField($this->P417);
                        $doc->exportField($this->P418);
                        $doc->exportField($this->P419);
                        $doc->exportField($this->P420);
                        $doc->exportField($this->P421);
                        $doc->exportField($this->P422);
                        $doc->exportField($this->P423);
                        $doc->exportField($this->P424);
                        $doc->exportField($this->P425);
                        $doc->exportField($this->USGRt14);
                        $doc->exportField($this->USGRt15);
                        $doc->exportField($this->USGRt16);
                        $doc->exportField($this->USGRt17);
                        $doc->exportField($this->USGRt18);
                        $doc->exportField($this->USGRt19);
                        $doc->exportField($this->USGRt20);
                        $doc->exportField($this->USGRt21);
                        $doc->exportField($this->USGRt22);
                        $doc->exportField($this->USGRt23);
                        $doc->exportField($this->USGRt24);
                        $doc->exportField($this->USGRt25);
                        $doc->exportField($this->USGLt14);
                        $doc->exportField($this->USGLt15);
                        $doc->exportField($this->USGLt16);
                        $doc->exportField($this->USGLt17);
                        $doc->exportField($this->USGLt18);
                        $doc->exportField($this->USGLt19);
                        $doc->exportField($this->USGLt20);
                        $doc->exportField($this->USGLt21);
                        $doc->exportField($this->USGLt22);
                        $doc->exportField($this->USGLt23);
                        $doc->exportField($this->USGLt24);
                        $doc->exportField($this->USGLt25);
                        $doc->exportField($this->EM14);
                        $doc->exportField($this->EM15);
                        $doc->exportField($this->EM16);
                        $doc->exportField($this->EM17);
                        $doc->exportField($this->EM18);
                        $doc->exportField($this->EM19);
                        $doc->exportField($this->EM20);
                        $doc->exportField($this->EM21);
                        $doc->exportField($this->EM22);
                        $doc->exportField($this->EM23);
                        $doc->exportField($this->EM24);
                        $doc->exportField($this->EM25);
                        $doc->exportField($this->Others14);
                        $doc->exportField($this->Others15);
                        $doc->exportField($this->Others16);
                        $doc->exportField($this->Others17);
                        $doc->exportField($this->Others18);
                        $doc->exportField($this->Others19);
                        $doc->exportField($this->Others20);
                        $doc->exportField($this->Others21);
                        $doc->exportField($this->Others22);
                        $doc->exportField($this->Others23);
                        $doc->exportField($this->Others24);
                        $doc->exportField($this->Others25);
                        $doc->exportField($this->DR14);
                        $doc->exportField($this->DR15);
                        $doc->exportField($this->DR16);
                        $doc->exportField($this->DR17);
                        $doc->exportField($this->DR18);
                        $doc->exportField($this->DR19);
                        $doc->exportField($this->DR20);
                        $doc->exportField($this->DR21);
                        $doc->exportField($this->DR22);
                        $doc->exportField($this->DR23);
                        $doc->exportField($this->DR24);
                        $doc->exportField($this->DR25);
                        $doc->exportField($this->E214);
                        $doc->exportField($this->E215);
                        $doc->exportField($this->E216);
                        $doc->exportField($this->E217);
                        $doc->exportField($this->E218);
                        $doc->exportField($this->E219);
                        $doc->exportField($this->E220);
                        $doc->exportField($this->E221);
                        $doc->exportField($this->E222);
                        $doc->exportField($this->E223);
                        $doc->exportField($this->E224);
                        $doc->exportField($this->E225);
                        $doc->exportField($this->EEETTTDTE);
                        $doc->exportField($this->bhcgdate);
                        $doc->exportField($this->TUBAL_PATENCY);
                        $doc->exportField($this->HSG);
                        $doc->exportField($this->DHL);
                        $doc->exportField($this->UTERINE_PROBLEMS);
                        $doc->exportField($this->W_COMORBIDS);
                        $doc->exportField($this->H_COMORBIDS);
                        $doc->exportField($this->SEXUAL_DYSFUNCTION);
                        $doc->exportField($this->TABLETS);
                        $doc->exportField($this->FOLLICLE_STATUS);
                        $doc->exportField($this->NUMBER_OF_IUI);
                        $doc->exportField($this->PROCEDURE);
                        $doc->exportField($this->LUTEAL_SUPPORT);
                        $doc->exportField($this->SPECIFIC_MATERNAL_PROBLEMS);
                        $doc->exportField($this->ONGOING_PREG);
                        $doc->exportField($this->EDD_Date);
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
    public function rowInserted($rsold, &$rsnew) {
    	//echo "Row Inserted"
    		$TidNo = $rsnew["TidNo"];
    	$AllFreeze = $rsnew["AllFreeze"];	
    	$TreatmentCancel = $rsnew["TreatmentCancel"];
    	$SCDate = $rsnew["SCDate"];
    	$dbhelper = &DbHelper();
    	if($AllFreeze == 'Yes')
    	{
    		$sql = "UPDATE `ganeshkumar_bjhims`.`ivf_treatment_plan` SET `treatment_status`='All Freeze' WHERE `id`='".$TidNo."';";
    		$results = $dbhelper->ExecuteRows($sql);
    	}
    	if($TreatmentCancel == 'Yes')
    	{
    		$sql = "UPDATE `ganeshkumar_bjhims`.`ivf_treatment_plan` SET `treatment_status`='Treatment Cancel' WHERE `id`='".$TidNo."';";
    		$results = $dbhelper->ExecuteRows($sql);
    	}
    	if($SCDate != '')
    	{
    		$sql = "UPDATE `ganeshkumar_bjhims`.`ivf_treatment_plan` SET `TreatmentStartDate`='".$SCDate."' WHERE `id`='".$TidNo."';";
    		$results = $dbhelper->ExecuteRows($sql);
    	}
    }

    // Row Updating event
    public function rowUpdating($rsold, &$rsnew)
    {
        // Enter your code here
        // To cancel, set return value to false
        return true;
    }

    // Row Updated event
    public function rowUpdated($rsold, &$rsnew) {
    	//echo "Row Updated";
    			$TidNo = $rsold["TidNo"];
    	$AllFreeze = $rsnew["AllFreeze"];	
    	$TreatmentCancel = $rsnew["TreatmentCancel"];
    	$SCDate = $rsnew["SCDate"];
    	$dbhelper = &DbHelper();
    	if($AllFreeze == 'Yes')
    	{
    		$sql = "UPDATE `ganeshkumar_bjhims`.`ivf_treatment_plan` SET `treatment_status`='All Freeze' WHERE `id`='".$TidNo."';";
    		$results = $dbhelper->ExecuteRows($sql);
    	}
    	if($TreatmentCancel == 'Yes')
    	{
    		$sql = "UPDATE `ganeshkumar_bjhims`.`ivf_treatment_plan` SET `treatment_status`='Treatment Cancel' WHERE `id`='".$TidNo."';";
    		$results = $dbhelper->ExecuteRows($sql);
    	}
    	if($SCDate != '')
    	{
    		$sql = "UPDATE `ganeshkumar_bjhims`.`ivf_treatment_plan` SET `TreatmentStartDate`='".$SCDate."' WHERE `id`='".$TidNo."';";
    		$results = $dbhelper->ExecuteRows($sql);
    	}
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
