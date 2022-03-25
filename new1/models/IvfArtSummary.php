<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for ivf_art_summary
 */
class IvfArtSummary extends DbTable
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
    public $IVFRegistrationID;
    public $ARTCycle;
    public $Spermorigin;
    public $InseminatinTechnique;
    public $IndicationforART;
    public $ICSIDetails;
    public $DateofICSI;
    public $Origin;
    public $Status;
    public $Method;
    public $pre_Concentration;
    public $pre_Motility;
    public $pre_Morphology;
    public $post_Concentration;
    public $post_Motility;
    public $post_Morphology;
    public $DateofET;
    public $NumberofEmbryostransferred;
    public $Reasonfornotranfer;
    public $Embryosunderobservation;
    public $EmbryosCryopreserved;
    public $EmbryoDevelopmentSummary;
    public $LegendCellStage;
    public $EmbryologistSignature;
    public $ConsultantsSignature;
    public $Name;
    public $M2;
    public $Mi2;
    public $ICSI;
    public $IVF;
    public $M1;
    public $GV;
    public $_Others;
    public $Normal2PN;
    public $Abnormalfertilisation1N;
    public $Abnormalfertilisation3N;
    public $NotFertilized;
    public $Degenerated;
    public $SpermDate;
    public $Code1;
    public $Day1;
    public $CellStage1;
    public $Grade1;
    public $State1;
    public $Code2;
    public $Day2;
    public $CellStage2;
    public $Grade2;
    public $State2;
    public $Code3;
    public $Day3;
    public $CellStage3;
    public $Grade3;
    public $State3;
    public $Code4;
    public $Day4;
    public $CellStage4;
    public $Grade4;
    public $State4;
    public $Code5;
    public $Day5;
    public $CellStage5;
    public $Grade5;
    public $State5;
    public $TidNo;
    public $RIDNo;
    public $Volume;
    public $Volume1;
    public $Volume2;
    public $Concentration2;
    public $Total;
    public $Total1;
    public $Total2;
    public $Progressive;
    public $Progressive1;
    public $Progressive2;
    public $NotProgressive;
    public $NotProgressive1;
    public $NotProgressive2;
    public $Motility2;
    public $Morphology2;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'ivf_art_summary';
        $this->TableName = 'ivf_art_summary';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`ivf_art_summary`";
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
        $this->id = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['id'] = &$this->id;

        // IVFRegistrationID
        $this->IVFRegistrationID = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_IVFRegistrationID', 'IVFRegistrationID', '`IVFRegistrationID`', '`IVFRegistrationID`', 3, 11, -1, false, '`IVFRegistrationID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IVFRegistrationID->Nullable = false; // NOT NULL field
        $this->IVFRegistrationID->Required = true; // Required field
        $this->IVFRegistrationID->Sortable = true; // Allow sort
        $this->IVFRegistrationID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['IVFRegistrationID'] = &$this->IVFRegistrationID;

        // ARTCycle
        $this->ARTCycle = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_ARTCycle', 'ARTCycle', '`ARTCycle`', '`ARTCycle`', 200, 45, -1, false, '`ARTCycle`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ARTCycle->Sortable = true; // Allow sort
        $this->Fields['ARTCycle'] = &$this->ARTCycle;

        // Spermorigin
        $this->Spermorigin = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Spermorigin', 'Spermorigin', '`Spermorigin`', '`Spermorigin`', 200, 45, -1, false, '`Spermorigin`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Spermorigin->Sortable = true; // Allow sort
        $this->Fields['Spermorigin'] = &$this->Spermorigin;

        // InseminatinTechnique
        $this->InseminatinTechnique = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_InseminatinTechnique', 'InseminatinTechnique', '`InseminatinTechnique`', '`InseminatinTechnique`', 200, 45, -1, false, '`InseminatinTechnique`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->InseminatinTechnique->Sortable = true; // Allow sort
        $this->Fields['InseminatinTechnique'] = &$this->InseminatinTechnique;

        // IndicationforART
        $this->IndicationforART = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_IndicationforART', 'IndicationforART', '`IndicationforART`', '`IndicationforART`', 200, 45, -1, false, '`IndicationforART`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IndicationforART->Sortable = true; // Allow sort
        $this->Fields['IndicationforART'] = &$this->IndicationforART;

        // ICSIDetails
        $this->ICSIDetails = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_ICSIDetails', 'ICSIDetails', '`ICSIDetails`', '`ICSIDetails`', 200, 45, -1, false, '`ICSIDetails`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ICSIDetails->Sortable = true; // Allow sort
        $this->Fields['ICSIDetails'] = &$this->ICSIDetails;

        // DateofICSI
        $this->DateofICSI = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_DateofICSI', 'DateofICSI', '`DateofICSI`', CastDateFieldForLike("`DateofICSI`", 0, "DB"), 135, 19, 0, false, '`DateofICSI`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DateofICSI->Sortable = true; // Allow sort
        $this->DateofICSI->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['DateofICSI'] = &$this->DateofICSI;

        // Origin
        $this->Origin = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Origin', 'Origin', '`Origin`', '`Origin`', 200, 45, -1, false, '`Origin`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Origin->Sortable = true; // Allow sort
        $this->Fields['Origin'] = &$this->Origin;

        // Status
        $this->Status = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Status', 'Status', '`Status`', '`Status`', 200, 45, -1, false, '`Status`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Status->Sortable = true; // Allow sort
        $this->Fields['Status'] = &$this->Status;

        // Method
        $this->Method = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Method', 'Method', '`Method`', '`Method`', 200, 45, -1, false, '`Method`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Method->Sortable = true; // Allow sort
        $this->Fields['Method'] = &$this->Method;

        // pre_Concentration
        $this->pre_Concentration = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_pre_Concentration', 'pre_Concentration', '`pre_Concentration`', '`pre_Concentration`', 200, 45, -1, false, '`pre_Concentration`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->pre_Concentration->Sortable = true; // Allow sort
        $this->Fields['pre_Concentration'] = &$this->pre_Concentration;

        // pre_Motility
        $this->pre_Motility = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_pre_Motility', 'pre_Motility', '`pre_Motility`', '`pre_Motility`', 200, 45, -1, false, '`pre_Motility`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->pre_Motility->Sortable = true; // Allow sort
        $this->Fields['pre_Motility'] = &$this->pre_Motility;

        // pre_Morphology
        $this->pre_Morphology = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_pre_Morphology', 'pre_Morphology', '`pre_Morphology`', '`pre_Morphology`', 200, 45, -1, false, '`pre_Morphology`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->pre_Morphology->Sortable = true; // Allow sort
        $this->Fields['pre_Morphology'] = &$this->pre_Morphology;

        // post_Concentration
        $this->post_Concentration = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_post_Concentration', 'post_Concentration', '`post_Concentration`', '`post_Concentration`', 200, 45, -1, false, '`post_Concentration`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->post_Concentration->Sortable = true; // Allow sort
        $this->Fields['post_Concentration'] = &$this->post_Concentration;

        // post_Motility
        $this->post_Motility = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_post_Motility', 'post_Motility', '`post_Motility`', '`post_Motility`', 200, 45, -1, false, '`post_Motility`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->post_Motility->Sortable = true; // Allow sort
        $this->Fields['post_Motility'] = &$this->post_Motility;

        // post_Morphology
        $this->post_Morphology = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_post_Morphology', 'post_Morphology', '`post_Morphology`', '`post_Morphology`', 200, 45, -1, false, '`post_Morphology`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->post_Morphology->Sortable = true; // Allow sort
        $this->Fields['post_Morphology'] = &$this->post_Morphology;

        // DateofET
        $this->DateofET = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_DateofET', 'DateofET', '`DateofET`', '`DateofET`', 200, 45, -1, false, '`DateofET`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DateofET->Sortable = true; // Allow sort
        $this->Fields['DateofET'] = &$this->DateofET;

        // NumberofEmbryostransferred
        $this->NumberofEmbryostransferred = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_NumberofEmbryostransferred', 'NumberofEmbryostransferred', '`NumberofEmbryostransferred`', '`NumberofEmbryostransferred`', 200, 45, -1, false, '`NumberofEmbryostransferred`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NumberofEmbryostransferred->Sortable = true; // Allow sort
        $this->Fields['NumberofEmbryostransferred'] = &$this->NumberofEmbryostransferred;

        // Reasonfornotranfer
        $this->Reasonfornotranfer = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Reasonfornotranfer', 'Reasonfornotranfer', '`Reasonfornotranfer`', '`Reasonfornotranfer`', 200, 45, -1, false, '`Reasonfornotranfer`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Reasonfornotranfer->Sortable = true; // Allow sort
        $this->Fields['Reasonfornotranfer'] = &$this->Reasonfornotranfer;

        // Embryosunderobservation
        $this->Embryosunderobservation = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Embryosunderobservation', 'Embryosunderobservation', '`Embryosunderobservation`', '`Embryosunderobservation`', 200, 45, -1, false, '`Embryosunderobservation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Embryosunderobservation->Sortable = true; // Allow sort
        $this->Fields['Embryosunderobservation'] = &$this->Embryosunderobservation;

        // EmbryosCryopreserved
        $this->EmbryosCryopreserved = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_EmbryosCryopreserved', 'EmbryosCryopreserved', '`EmbryosCryopreserved`', '`EmbryosCryopreserved`', 200, 45, -1, false, '`EmbryosCryopreserved`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EmbryosCryopreserved->Sortable = true; // Allow sort
        $this->Fields['EmbryosCryopreserved'] = &$this->EmbryosCryopreserved;

        // EmbryoDevelopmentSummary
        $this->EmbryoDevelopmentSummary = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_EmbryoDevelopmentSummary', 'EmbryoDevelopmentSummary', '`EmbryoDevelopmentSummary`', '`EmbryoDevelopmentSummary`', 200, 45, -1, false, '`EmbryoDevelopmentSummary`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EmbryoDevelopmentSummary->Sortable = true; // Allow sort
        $this->Fields['EmbryoDevelopmentSummary'] = &$this->EmbryoDevelopmentSummary;

        // LegendCellStage
        $this->LegendCellStage = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_LegendCellStage', 'LegendCellStage', '`LegendCellStage`', '`LegendCellStage`', 200, 45, -1, false, '`LegendCellStage`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->LegendCellStage->Sortable = true; // Allow sort
        $this->Fields['LegendCellStage'] = &$this->LegendCellStage;

        // EmbryologistSignature
        $this->EmbryologistSignature = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_EmbryologistSignature', 'EmbryologistSignature', '`EmbryologistSignature`', '`EmbryologistSignature`', 200, 45, -1, false, '`EmbryologistSignature`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EmbryologistSignature->Sortable = true; // Allow sort
        $this->Fields['EmbryologistSignature'] = &$this->EmbryologistSignature;

        // ConsultantsSignature
        $this->ConsultantsSignature = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_ConsultantsSignature', 'ConsultantsSignature', '`ConsultantsSignature`', '`ConsultantsSignature`', 200, 45, -1, false, '`ConsultantsSignature`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ConsultantsSignature->Sortable = true; // Allow sort
        $this->Fields['ConsultantsSignature'] = &$this->ConsultantsSignature;

        // Name
        $this->Name = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Name', 'Name', '`Name`', '`Name`', 200, 45, -1, false, '`Name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Name->Sortable = true; // Allow sort
        $this->Fields['Name'] = &$this->Name;

        // M2
        $this->M2 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_M2', 'M2', '`M2`', '`M2`', 200, 45, -1, false, '`M2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->M2->Sortable = true; // Allow sort
        $this->Fields['M2'] = &$this->M2;

        // Mi2
        $this->Mi2 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Mi2', 'Mi2', '`Mi2`', '`Mi2`', 200, 45, -1, false, '`Mi2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Mi2->Sortable = true; // Allow sort
        $this->Fields['Mi2'] = &$this->Mi2;

        // ICSI
        $this->ICSI = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_ICSI', 'ICSI', '`ICSI`', '`ICSI`', 200, 45, -1, false, '`ICSI`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ICSI->Sortable = true; // Allow sort
        $this->Fields['ICSI'] = &$this->ICSI;

        // IVF
        $this->IVF = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_IVF', 'IVF', '`IVF`', '`IVF`', 200, 45, -1, false, '`IVF`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IVF->Sortable = true; // Allow sort
        $this->Fields['IVF'] = &$this->IVF;

        // M1
        $this->M1 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_M1', 'M1', '`M1`', '`M1`', 200, 45, -1, false, '`M1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->M1->Sortable = true; // Allow sort
        $this->Fields['M1'] = &$this->M1;

        // GV
        $this->GV = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_GV', 'GV', '`GV`', '`GV`', 200, 45, -1, false, '`GV`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GV->Sortable = true; // Allow sort
        $this->Fields['GV'] = &$this->GV;

        // Others
        $this->_Others = new DbField('ivf_art_summary', 'ivf_art_summary', 'x__Others', 'Others', '`Others`', '`Others`', 200, 45, -1, false, '`Others`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->_Others->Sortable = true; // Allow sort
        $this->Fields['Others'] = &$this->_Others;

        // Normal2PN
        $this->Normal2PN = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Normal2PN', 'Normal2PN', '`Normal2PN`', '`Normal2PN`', 200, 45, -1, false, '`Normal2PN`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Normal2PN->Sortable = true; // Allow sort
        $this->Fields['Normal2PN'] = &$this->Normal2PN;

        // Abnormalfertilisation1N
        $this->Abnormalfertilisation1N = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Abnormalfertilisation1N', 'Abnormalfertilisation1N', '`Abnormalfertilisation1N`', '`Abnormalfertilisation1N`', 200, 45, -1, false, '`Abnormalfertilisation1N`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Abnormalfertilisation1N->Sortable = true; // Allow sort
        $this->Fields['Abnormalfertilisation1N'] = &$this->Abnormalfertilisation1N;

        // Abnormalfertilisation3N
        $this->Abnormalfertilisation3N = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Abnormalfertilisation3N', 'Abnormalfertilisation3N', '`Abnormalfertilisation3N`', '`Abnormalfertilisation3N`', 200, 45, -1, false, '`Abnormalfertilisation3N`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Abnormalfertilisation3N->Sortable = true; // Allow sort
        $this->Fields['Abnormalfertilisation3N'] = &$this->Abnormalfertilisation3N;

        // NotFertilized
        $this->NotFertilized = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_NotFertilized', 'NotFertilized', '`NotFertilized`', '`NotFertilized`', 200, 45, -1, false, '`NotFertilized`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NotFertilized->Sortable = true; // Allow sort
        $this->Fields['NotFertilized'] = &$this->NotFertilized;

        // Degenerated
        $this->Degenerated = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Degenerated', 'Degenerated', '`Degenerated`', '`Degenerated`', 200, 45, -1, false, '`Degenerated`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Degenerated->Sortable = true; // Allow sort
        $this->Fields['Degenerated'] = &$this->Degenerated;

        // SpermDate
        $this->SpermDate = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_SpermDate', 'SpermDate', '`SpermDate`', CastDateFieldForLike("`SpermDate`", 0, "DB"), 135, 19, 0, false, '`SpermDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SpermDate->Sortable = true; // Allow sort
        $this->SpermDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['SpermDate'] = &$this->SpermDate;

        // Code1
        $this->Code1 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Code1', 'Code1', '`Code1`', '`Code1`', 200, 45, -1, false, '`Code1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Code1->Sortable = true; // Allow sort
        $this->Fields['Code1'] = &$this->Code1;

        // Day1
        $this->Day1 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Day1', 'Day1', '`Day1`', '`Day1`', 200, 45, -1, false, '`Day1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day1->Sortable = true; // Allow sort
        $this->Fields['Day1'] = &$this->Day1;

        // CellStage1
        $this->CellStage1 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_CellStage1', 'CellStage1', '`CellStage1`', '`CellStage1`', 200, 45, -1, false, '`CellStage1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CellStage1->Sortable = true; // Allow sort
        $this->Fields['CellStage1'] = &$this->CellStage1;

        // Grade1
        $this->Grade1 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Grade1', 'Grade1', '`Grade1`', '`Grade1`', 200, 45, -1, false, '`Grade1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Grade1->Sortable = true; // Allow sort
        $this->Fields['Grade1'] = &$this->Grade1;

        // State1
        $this->State1 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_State1', 'State1', '`State1`', '`State1`', 200, 45, -1, false, '`State1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->State1->Sortable = true; // Allow sort
        $this->Fields['State1'] = &$this->State1;

        // Code2
        $this->Code2 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Code2', 'Code2', '`Code2`', '`Code2`', 200, 45, -1, false, '`Code2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Code2->Sortable = true; // Allow sort
        $this->Fields['Code2'] = &$this->Code2;

        // Day2
        $this->Day2 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Day2', 'Day2', '`Day2`', '`Day2`', 200, 45, -1, false, '`Day2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day2->Sortable = true; // Allow sort
        $this->Fields['Day2'] = &$this->Day2;

        // CellStage2
        $this->CellStage2 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_CellStage2', 'CellStage2', '`CellStage2`', '`CellStage2`', 200, 45, -1, false, '`CellStage2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CellStage2->Sortable = true; // Allow sort
        $this->Fields['CellStage2'] = &$this->CellStage2;

        // Grade2
        $this->Grade2 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Grade2', 'Grade2', '`Grade2`', '`Grade2`', 200, 45, -1, false, '`Grade2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Grade2->Sortable = true; // Allow sort
        $this->Fields['Grade2'] = &$this->Grade2;

        // State2
        $this->State2 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_State2', 'State2', '`State2`', '`State2`', 200, 45, -1, false, '`State2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->State2->Sortable = true; // Allow sort
        $this->Fields['State2'] = &$this->State2;

        // Code3
        $this->Code3 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Code3', 'Code3', '`Code3`', '`Code3`', 200, 45, -1, false, '`Code3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Code3->Sortable = true; // Allow sort
        $this->Fields['Code3'] = &$this->Code3;

        // Day3
        $this->Day3 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Day3', 'Day3', '`Day3`', '`Day3`', 200, 45, -1, false, '`Day3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day3->Sortable = true; // Allow sort
        $this->Fields['Day3'] = &$this->Day3;

        // CellStage3
        $this->CellStage3 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_CellStage3', 'CellStage3', '`CellStage3`', '`CellStage3`', 200, 45, -1, false, '`CellStage3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CellStage3->Sortable = true; // Allow sort
        $this->Fields['CellStage3'] = &$this->CellStage3;

        // Grade3
        $this->Grade3 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Grade3', 'Grade3', '`Grade3`', '`Grade3`', 200, 45, -1, false, '`Grade3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Grade3->Sortable = true; // Allow sort
        $this->Fields['Grade3'] = &$this->Grade3;

        // State3
        $this->State3 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_State3', 'State3', '`State3`', '`State3`', 200, 45, -1, false, '`State3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->State3->Sortable = true; // Allow sort
        $this->Fields['State3'] = &$this->State3;

        // Code4
        $this->Code4 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Code4', 'Code4', '`Code4`', '`Code4`', 200, 45, -1, false, '`Code4`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Code4->Sortable = true; // Allow sort
        $this->Fields['Code4'] = &$this->Code4;

        // Day4
        $this->Day4 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Day4', 'Day4', '`Day4`', '`Day4`', 200, 45, -1, false, '`Day4`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day4->Sortable = true; // Allow sort
        $this->Fields['Day4'] = &$this->Day4;

        // CellStage4
        $this->CellStage4 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_CellStage4', 'CellStage4', '`CellStage4`', '`CellStage4`', 200, 45, -1, false, '`CellStage4`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CellStage4->Sortable = true; // Allow sort
        $this->Fields['CellStage4'] = &$this->CellStage4;

        // Grade4
        $this->Grade4 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Grade4', 'Grade4', '`Grade4`', '`Grade4`', 200, 45, -1, false, '`Grade4`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Grade4->Sortable = true; // Allow sort
        $this->Fields['Grade4'] = &$this->Grade4;

        // State4
        $this->State4 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_State4', 'State4', '`State4`', '`State4`', 200, 45, -1, false, '`State4`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->State4->Sortable = true; // Allow sort
        $this->Fields['State4'] = &$this->State4;

        // Code5
        $this->Code5 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Code5', 'Code5', '`Code5`', '`Code5`', 200, 45, -1, false, '`Code5`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Code5->Sortable = true; // Allow sort
        $this->Fields['Code5'] = &$this->Code5;

        // Day5
        $this->Day5 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Day5', 'Day5', '`Day5`', '`Day5`', 200, 45, -1, false, '`Day5`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Day5->Sortable = true; // Allow sort
        $this->Fields['Day5'] = &$this->Day5;

        // CellStage5
        $this->CellStage5 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_CellStage5', 'CellStage5', '`CellStage5`', '`CellStage5`', 200, 45, -1, false, '`CellStage5`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CellStage5->Sortable = true; // Allow sort
        $this->Fields['CellStage5'] = &$this->CellStage5;

        // Grade5
        $this->Grade5 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Grade5', 'Grade5', '`Grade5`', '`Grade5`', 200, 45, -1, false, '`Grade5`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Grade5->Sortable = true; // Allow sort
        $this->Fields['Grade5'] = &$this->Grade5;

        // State5
        $this->State5 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_State5', 'State5', '`State5`', '`State5`', 200, 45, -1, false, '`State5`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->State5->Sortable = true; // Allow sort
        $this->Fields['State5'] = &$this->State5;

        // TidNo
        $this->TidNo = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_TidNo', 'TidNo', '`TidNo`', '`TidNo`', 3, 11, -1, false, '`TidNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TidNo->Sortable = true; // Allow sort
        $this->TidNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['TidNo'] = &$this->TidNo;

        // RIDNo
        $this->RIDNo = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_RIDNo', 'RIDNo', '`RIDNo`', '`RIDNo`', 3, 11, -1, false, '`RIDNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RIDNo->Sortable = true; // Allow sort
        $this->RIDNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['RIDNo'] = &$this->RIDNo;

        // Volume
        $this->Volume = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Volume', 'Volume', '`Volume`', '`Volume`', 200, 45, -1, false, '`Volume`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Volume->Sortable = true; // Allow sort
        $this->Fields['Volume'] = &$this->Volume;

        // Volume1
        $this->Volume1 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Volume1', 'Volume1', '`Volume1`', '`Volume1`', 200, 45, -1, false, '`Volume1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Volume1->Sortable = true; // Allow sort
        $this->Fields['Volume1'] = &$this->Volume1;

        // Volume2
        $this->Volume2 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Volume2', 'Volume2', '`Volume2`', '`Volume2`', 200, 45, -1, false, '`Volume2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Volume2->Sortable = true; // Allow sort
        $this->Fields['Volume2'] = &$this->Volume2;

        // Concentration2
        $this->Concentration2 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Concentration2', 'Concentration2', '`Concentration2`', '`Concentration2`', 200, 45, -1, false, '`Concentration2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Concentration2->Sortable = true; // Allow sort
        $this->Fields['Concentration2'] = &$this->Concentration2;

        // Total
        $this->Total = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Total', 'Total', '`Total`', '`Total`', 200, 45, -1, false, '`Total`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Total->Sortable = true; // Allow sort
        $this->Fields['Total'] = &$this->Total;

        // Total1
        $this->Total1 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Total1', 'Total1', '`Total1`', '`Total1`', 200, 45, -1, false, '`Total1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Total1->Sortable = true; // Allow sort
        $this->Fields['Total1'] = &$this->Total1;

        // Total2
        $this->Total2 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Total2', 'Total2', '`Total2`', '`Total2`', 200, 45, -1, false, '`Total2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Total2->Sortable = true; // Allow sort
        $this->Fields['Total2'] = &$this->Total2;

        // Progressive
        $this->Progressive = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Progressive', 'Progressive', '`Progressive`', '`Progressive`', 200, 45, -1, false, '`Progressive`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Progressive->Sortable = true; // Allow sort
        $this->Fields['Progressive'] = &$this->Progressive;

        // Progressive1
        $this->Progressive1 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Progressive1', 'Progressive1', '`Progressive1`', '`Progressive1`', 200, 45, -1, false, '`Progressive1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Progressive1->Sortable = true; // Allow sort
        $this->Fields['Progressive1'] = &$this->Progressive1;

        // Progressive2
        $this->Progressive2 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Progressive2', 'Progressive2', '`Progressive2`', '`Progressive2`', 200, 45, -1, false, '`Progressive2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Progressive2->Sortable = true; // Allow sort
        $this->Fields['Progressive2'] = &$this->Progressive2;

        // NotProgressive
        $this->NotProgressive = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_NotProgressive', 'NotProgressive', '`NotProgressive`', '`NotProgressive`', 200, 45, -1, false, '`NotProgressive`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NotProgressive->Sortable = true; // Allow sort
        $this->Fields['NotProgressive'] = &$this->NotProgressive;

        // NotProgressive1
        $this->NotProgressive1 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_NotProgressive1', 'NotProgressive1', '`NotProgressive1`', '`NotProgressive1`', 200, 45, -1, false, '`NotProgressive1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NotProgressive1->Sortable = true; // Allow sort
        $this->Fields['NotProgressive1'] = &$this->NotProgressive1;

        // NotProgressive2
        $this->NotProgressive2 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_NotProgressive2', 'NotProgressive2', '`NotProgressive2`', '`NotProgressive2`', 200, 45, -1, false, '`NotProgressive2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NotProgressive2->Sortable = true; // Allow sort
        $this->Fields['NotProgressive2'] = &$this->NotProgressive2;

        // Motility2
        $this->Motility2 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Motility2', 'Motility2', '`Motility2`', '`Motility2`', 200, 45, -1, false, '`Motility2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Motility2->Sortable = true; // Allow sort
        $this->Fields['Motility2'] = &$this->Motility2;

        // Morphology2
        $this->Morphology2 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Morphology2', 'Morphology2', '`Morphology2`', '`Morphology2`', 200, 45, -1, false, '`Morphology2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Morphology2->Sortable = true; // Allow sort
        $this->Fields['Morphology2'] = &$this->Morphology2;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`ivf_art_summary`";
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
        $this->IVFRegistrationID->DbValue = $row['IVFRegistrationID'];
        $this->ARTCycle->DbValue = $row['ARTCycle'];
        $this->Spermorigin->DbValue = $row['Spermorigin'];
        $this->InseminatinTechnique->DbValue = $row['InseminatinTechnique'];
        $this->IndicationforART->DbValue = $row['IndicationforART'];
        $this->ICSIDetails->DbValue = $row['ICSIDetails'];
        $this->DateofICSI->DbValue = $row['DateofICSI'];
        $this->Origin->DbValue = $row['Origin'];
        $this->Status->DbValue = $row['Status'];
        $this->Method->DbValue = $row['Method'];
        $this->pre_Concentration->DbValue = $row['pre_Concentration'];
        $this->pre_Motility->DbValue = $row['pre_Motility'];
        $this->pre_Morphology->DbValue = $row['pre_Morphology'];
        $this->post_Concentration->DbValue = $row['post_Concentration'];
        $this->post_Motility->DbValue = $row['post_Motility'];
        $this->post_Morphology->DbValue = $row['post_Morphology'];
        $this->DateofET->DbValue = $row['DateofET'];
        $this->NumberofEmbryostransferred->DbValue = $row['NumberofEmbryostransferred'];
        $this->Reasonfornotranfer->DbValue = $row['Reasonfornotranfer'];
        $this->Embryosunderobservation->DbValue = $row['Embryosunderobservation'];
        $this->EmbryosCryopreserved->DbValue = $row['EmbryosCryopreserved'];
        $this->EmbryoDevelopmentSummary->DbValue = $row['EmbryoDevelopmentSummary'];
        $this->LegendCellStage->DbValue = $row['LegendCellStage'];
        $this->EmbryologistSignature->DbValue = $row['EmbryologistSignature'];
        $this->ConsultantsSignature->DbValue = $row['ConsultantsSignature'];
        $this->Name->DbValue = $row['Name'];
        $this->M2->DbValue = $row['M2'];
        $this->Mi2->DbValue = $row['Mi2'];
        $this->ICSI->DbValue = $row['ICSI'];
        $this->IVF->DbValue = $row['IVF'];
        $this->M1->DbValue = $row['M1'];
        $this->GV->DbValue = $row['GV'];
        $this->_Others->DbValue = $row['Others'];
        $this->Normal2PN->DbValue = $row['Normal2PN'];
        $this->Abnormalfertilisation1N->DbValue = $row['Abnormalfertilisation1N'];
        $this->Abnormalfertilisation3N->DbValue = $row['Abnormalfertilisation3N'];
        $this->NotFertilized->DbValue = $row['NotFertilized'];
        $this->Degenerated->DbValue = $row['Degenerated'];
        $this->SpermDate->DbValue = $row['SpermDate'];
        $this->Code1->DbValue = $row['Code1'];
        $this->Day1->DbValue = $row['Day1'];
        $this->CellStage1->DbValue = $row['CellStage1'];
        $this->Grade1->DbValue = $row['Grade1'];
        $this->State1->DbValue = $row['State1'];
        $this->Code2->DbValue = $row['Code2'];
        $this->Day2->DbValue = $row['Day2'];
        $this->CellStage2->DbValue = $row['CellStage2'];
        $this->Grade2->DbValue = $row['Grade2'];
        $this->State2->DbValue = $row['State2'];
        $this->Code3->DbValue = $row['Code3'];
        $this->Day3->DbValue = $row['Day3'];
        $this->CellStage3->DbValue = $row['CellStage3'];
        $this->Grade3->DbValue = $row['Grade3'];
        $this->State3->DbValue = $row['State3'];
        $this->Code4->DbValue = $row['Code4'];
        $this->Day4->DbValue = $row['Day4'];
        $this->CellStage4->DbValue = $row['CellStage4'];
        $this->Grade4->DbValue = $row['Grade4'];
        $this->State4->DbValue = $row['State4'];
        $this->Code5->DbValue = $row['Code5'];
        $this->Day5->DbValue = $row['Day5'];
        $this->CellStage5->DbValue = $row['CellStage5'];
        $this->Grade5->DbValue = $row['Grade5'];
        $this->State5->DbValue = $row['State5'];
        $this->TidNo->DbValue = $row['TidNo'];
        $this->RIDNo->DbValue = $row['RIDNo'];
        $this->Volume->DbValue = $row['Volume'];
        $this->Volume1->DbValue = $row['Volume1'];
        $this->Volume2->DbValue = $row['Volume2'];
        $this->Concentration2->DbValue = $row['Concentration2'];
        $this->Total->DbValue = $row['Total'];
        $this->Total1->DbValue = $row['Total1'];
        $this->Total2->DbValue = $row['Total2'];
        $this->Progressive->DbValue = $row['Progressive'];
        $this->Progressive1->DbValue = $row['Progressive1'];
        $this->Progressive2->DbValue = $row['Progressive2'];
        $this->NotProgressive->DbValue = $row['NotProgressive'];
        $this->NotProgressive1->DbValue = $row['NotProgressive1'];
        $this->NotProgressive2->DbValue = $row['NotProgressive2'];
        $this->Motility2->DbValue = $row['Motility2'];
        $this->Morphology2->DbValue = $row['Morphology2'];
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
            return GetUrl("IvfArtSummaryList");
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
        if ($pageName == "IvfArtSummaryView") {
            return $Language->phrase("View");
        } elseif ($pageName == "IvfArtSummaryEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "IvfArtSummaryAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "IvfArtSummaryList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("IvfArtSummaryView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("IvfArtSummaryView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "IvfArtSummaryAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "IvfArtSummaryAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("IvfArtSummaryEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("IvfArtSummaryAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("IvfArtSummaryDelete", $this->getUrlParm());
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
        $this->IVFRegistrationID->setDbValue($row['IVFRegistrationID']);
        $this->ARTCycle->setDbValue($row['ARTCycle']);
        $this->Spermorigin->setDbValue($row['Spermorigin']);
        $this->InseminatinTechnique->setDbValue($row['InseminatinTechnique']);
        $this->IndicationforART->setDbValue($row['IndicationforART']);
        $this->ICSIDetails->setDbValue($row['ICSIDetails']);
        $this->DateofICSI->setDbValue($row['DateofICSI']);
        $this->Origin->setDbValue($row['Origin']);
        $this->Status->setDbValue($row['Status']);
        $this->Method->setDbValue($row['Method']);
        $this->pre_Concentration->setDbValue($row['pre_Concentration']);
        $this->pre_Motility->setDbValue($row['pre_Motility']);
        $this->pre_Morphology->setDbValue($row['pre_Morphology']);
        $this->post_Concentration->setDbValue($row['post_Concentration']);
        $this->post_Motility->setDbValue($row['post_Motility']);
        $this->post_Morphology->setDbValue($row['post_Morphology']);
        $this->DateofET->setDbValue($row['DateofET']);
        $this->NumberofEmbryostransferred->setDbValue($row['NumberofEmbryostransferred']);
        $this->Reasonfornotranfer->setDbValue($row['Reasonfornotranfer']);
        $this->Embryosunderobservation->setDbValue($row['Embryosunderobservation']);
        $this->EmbryosCryopreserved->setDbValue($row['EmbryosCryopreserved']);
        $this->EmbryoDevelopmentSummary->setDbValue($row['EmbryoDevelopmentSummary']);
        $this->LegendCellStage->setDbValue($row['LegendCellStage']);
        $this->EmbryologistSignature->setDbValue($row['EmbryologistSignature']);
        $this->ConsultantsSignature->setDbValue($row['ConsultantsSignature']);
        $this->Name->setDbValue($row['Name']);
        $this->M2->setDbValue($row['M2']);
        $this->Mi2->setDbValue($row['Mi2']);
        $this->ICSI->setDbValue($row['ICSI']);
        $this->IVF->setDbValue($row['IVF']);
        $this->M1->setDbValue($row['M1']);
        $this->GV->setDbValue($row['GV']);
        $this->_Others->setDbValue($row['Others']);
        $this->Normal2PN->setDbValue($row['Normal2PN']);
        $this->Abnormalfertilisation1N->setDbValue($row['Abnormalfertilisation1N']);
        $this->Abnormalfertilisation3N->setDbValue($row['Abnormalfertilisation3N']);
        $this->NotFertilized->setDbValue($row['NotFertilized']);
        $this->Degenerated->setDbValue($row['Degenerated']);
        $this->SpermDate->setDbValue($row['SpermDate']);
        $this->Code1->setDbValue($row['Code1']);
        $this->Day1->setDbValue($row['Day1']);
        $this->CellStage1->setDbValue($row['CellStage1']);
        $this->Grade1->setDbValue($row['Grade1']);
        $this->State1->setDbValue($row['State1']);
        $this->Code2->setDbValue($row['Code2']);
        $this->Day2->setDbValue($row['Day2']);
        $this->CellStage2->setDbValue($row['CellStage2']);
        $this->Grade2->setDbValue($row['Grade2']);
        $this->State2->setDbValue($row['State2']);
        $this->Code3->setDbValue($row['Code3']);
        $this->Day3->setDbValue($row['Day3']);
        $this->CellStage3->setDbValue($row['CellStage3']);
        $this->Grade3->setDbValue($row['Grade3']);
        $this->State3->setDbValue($row['State3']);
        $this->Code4->setDbValue($row['Code4']);
        $this->Day4->setDbValue($row['Day4']);
        $this->CellStage4->setDbValue($row['CellStage4']);
        $this->Grade4->setDbValue($row['Grade4']);
        $this->State4->setDbValue($row['State4']);
        $this->Code5->setDbValue($row['Code5']);
        $this->Day5->setDbValue($row['Day5']);
        $this->CellStage5->setDbValue($row['CellStage5']);
        $this->Grade5->setDbValue($row['Grade5']);
        $this->State5->setDbValue($row['State5']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->RIDNo->setDbValue($row['RIDNo']);
        $this->Volume->setDbValue($row['Volume']);
        $this->Volume1->setDbValue($row['Volume1']);
        $this->Volume2->setDbValue($row['Volume2']);
        $this->Concentration2->setDbValue($row['Concentration2']);
        $this->Total->setDbValue($row['Total']);
        $this->Total1->setDbValue($row['Total1']);
        $this->Total2->setDbValue($row['Total2']);
        $this->Progressive->setDbValue($row['Progressive']);
        $this->Progressive1->setDbValue($row['Progressive1']);
        $this->Progressive2->setDbValue($row['Progressive2']);
        $this->NotProgressive->setDbValue($row['NotProgressive']);
        $this->NotProgressive1->setDbValue($row['NotProgressive1']);
        $this->NotProgressive2->setDbValue($row['NotProgressive2']);
        $this->Motility2->setDbValue($row['Motility2']);
        $this->Morphology2->setDbValue($row['Morphology2']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // IVFRegistrationID

        // ARTCycle

        // Spermorigin

        // InseminatinTechnique

        // IndicationforART

        // ICSIDetails

        // DateofICSI

        // Origin

        // Status

        // Method

        // pre_Concentration

        // pre_Motility

        // pre_Morphology

        // post_Concentration

        // post_Motility

        // post_Morphology

        // DateofET

        // NumberofEmbryostransferred

        // Reasonfornotranfer

        // Embryosunderobservation

        // EmbryosCryopreserved

        // EmbryoDevelopmentSummary

        // LegendCellStage

        // EmbryologistSignature

        // ConsultantsSignature

        // Name

        // M2

        // Mi2

        // ICSI

        // IVF

        // M1

        // GV

        // Others

        // Normal2PN

        // Abnormalfertilisation1N

        // Abnormalfertilisation3N

        // NotFertilized

        // Degenerated

        // SpermDate

        // Code1

        // Day1

        // CellStage1

        // Grade1

        // State1

        // Code2

        // Day2

        // CellStage2

        // Grade2

        // State2

        // Code3

        // Day3

        // CellStage3

        // Grade3

        // State3

        // Code4

        // Day4

        // CellStage4

        // Grade4

        // State4

        // Code5

        // Day5

        // CellStage5

        // Grade5

        // State5

        // TidNo

        // RIDNo

        // Volume

        // Volume1

        // Volume2

        // Concentration2

        // Total

        // Total1

        // Total2

        // Progressive

        // Progressive1

        // Progressive2

        // NotProgressive

        // NotProgressive1

        // NotProgressive2

        // Motility2

        // Morphology2

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // IVFRegistrationID
        $this->IVFRegistrationID->ViewValue = $this->IVFRegistrationID->CurrentValue;
        $this->IVFRegistrationID->ViewValue = FormatNumber($this->IVFRegistrationID->ViewValue, 0, -2, -2, -2);
        $this->IVFRegistrationID->ViewCustomAttributes = "";

        // ARTCycle
        $this->ARTCycle->ViewValue = $this->ARTCycle->CurrentValue;
        $this->ARTCycle->ViewCustomAttributes = "";

        // Spermorigin
        $this->Spermorigin->ViewValue = $this->Spermorigin->CurrentValue;
        $this->Spermorigin->ViewCustomAttributes = "";

        // InseminatinTechnique
        $this->InseminatinTechnique->ViewValue = $this->InseminatinTechnique->CurrentValue;
        $this->InseminatinTechnique->ViewCustomAttributes = "";

        // IndicationforART
        $this->IndicationforART->ViewValue = $this->IndicationforART->CurrentValue;
        $this->IndicationforART->ViewCustomAttributes = "";

        // ICSIDetails
        $this->ICSIDetails->ViewValue = $this->ICSIDetails->CurrentValue;
        $this->ICSIDetails->ViewCustomAttributes = "";

        // DateofICSI
        $this->DateofICSI->ViewValue = $this->DateofICSI->CurrentValue;
        $this->DateofICSI->ViewValue = FormatDateTime($this->DateofICSI->ViewValue, 0);
        $this->DateofICSI->ViewCustomAttributes = "";

        // Origin
        $this->Origin->ViewValue = $this->Origin->CurrentValue;
        $this->Origin->ViewCustomAttributes = "";

        // Status
        $this->Status->ViewValue = $this->Status->CurrentValue;
        $this->Status->ViewCustomAttributes = "";

        // Method
        $this->Method->ViewValue = $this->Method->CurrentValue;
        $this->Method->ViewCustomAttributes = "";

        // pre_Concentration
        $this->pre_Concentration->ViewValue = $this->pre_Concentration->CurrentValue;
        $this->pre_Concentration->ViewCustomAttributes = "";

        // pre_Motility
        $this->pre_Motility->ViewValue = $this->pre_Motility->CurrentValue;
        $this->pre_Motility->ViewCustomAttributes = "";

        // pre_Morphology
        $this->pre_Morphology->ViewValue = $this->pre_Morphology->CurrentValue;
        $this->pre_Morphology->ViewCustomAttributes = "";

        // post_Concentration
        $this->post_Concentration->ViewValue = $this->post_Concentration->CurrentValue;
        $this->post_Concentration->ViewCustomAttributes = "";

        // post_Motility
        $this->post_Motility->ViewValue = $this->post_Motility->CurrentValue;
        $this->post_Motility->ViewCustomAttributes = "";

        // post_Morphology
        $this->post_Morphology->ViewValue = $this->post_Morphology->CurrentValue;
        $this->post_Morphology->ViewCustomAttributes = "";

        // DateofET
        $this->DateofET->ViewValue = $this->DateofET->CurrentValue;
        $this->DateofET->ViewCustomAttributes = "";

        // NumberofEmbryostransferred
        $this->NumberofEmbryostransferred->ViewValue = $this->NumberofEmbryostransferred->CurrentValue;
        $this->NumberofEmbryostransferred->ViewCustomAttributes = "";

        // Reasonfornotranfer
        $this->Reasonfornotranfer->ViewValue = $this->Reasonfornotranfer->CurrentValue;
        $this->Reasonfornotranfer->ViewCustomAttributes = "";

        // Embryosunderobservation
        $this->Embryosunderobservation->ViewValue = $this->Embryosunderobservation->CurrentValue;
        $this->Embryosunderobservation->ViewCustomAttributes = "";

        // EmbryosCryopreserved
        $this->EmbryosCryopreserved->ViewValue = $this->EmbryosCryopreserved->CurrentValue;
        $this->EmbryosCryopreserved->ViewCustomAttributes = "";

        // EmbryoDevelopmentSummary
        $this->EmbryoDevelopmentSummary->ViewValue = $this->EmbryoDevelopmentSummary->CurrentValue;
        $this->EmbryoDevelopmentSummary->ViewCustomAttributes = "";

        // LegendCellStage
        $this->LegendCellStage->ViewValue = $this->LegendCellStage->CurrentValue;
        $this->LegendCellStage->ViewCustomAttributes = "";

        // EmbryologistSignature
        $this->EmbryologistSignature->ViewValue = $this->EmbryologistSignature->CurrentValue;
        $this->EmbryologistSignature->ViewCustomAttributes = "";

        // ConsultantsSignature
        $this->ConsultantsSignature->ViewValue = $this->ConsultantsSignature->CurrentValue;
        $this->ConsultantsSignature->ViewCustomAttributes = "";

        // Name
        $this->Name->ViewValue = $this->Name->CurrentValue;
        $this->Name->ViewCustomAttributes = "";

        // M2
        $this->M2->ViewValue = $this->M2->CurrentValue;
        $this->M2->ViewCustomAttributes = "";

        // Mi2
        $this->Mi2->ViewValue = $this->Mi2->CurrentValue;
        $this->Mi2->ViewCustomAttributes = "";

        // ICSI
        $this->ICSI->ViewValue = $this->ICSI->CurrentValue;
        $this->ICSI->ViewCustomAttributes = "";

        // IVF
        $this->IVF->ViewValue = $this->IVF->CurrentValue;
        $this->IVF->ViewCustomAttributes = "";

        // M1
        $this->M1->ViewValue = $this->M1->CurrentValue;
        $this->M1->ViewCustomAttributes = "";

        // GV
        $this->GV->ViewValue = $this->GV->CurrentValue;
        $this->GV->ViewCustomAttributes = "";

        // Others
        $this->_Others->ViewValue = $this->_Others->CurrentValue;
        $this->_Others->ViewCustomAttributes = "";

        // Normal2PN
        $this->Normal2PN->ViewValue = $this->Normal2PN->CurrentValue;
        $this->Normal2PN->ViewCustomAttributes = "";

        // Abnormalfertilisation1N
        $this->Abnormalfertilisation1N->ViewValue = $this->Abnormalfertilisation1N->CurrentValue;
        $this->Abnormalfertilisation1N->ViewCustomAttributes = "";

        // Abnormalfertilisation3N
        $this->Abnormalfertilisation3N->ViewValue = $this->Abnormalfertilisation3N->CurrentValue;
        $this->Abnormalfertilisation3N->ViewCustomAttributes = "";

        // NotFertilized
        $this->NotFertilized->ViewValue = $this->NotFertilized->CurrentValue;
        $this->NotFertilized->ViewCustomAttributes = "";

        // Degenerated
        $this->Degenerated->ViewValue = $this->Degenerated->CurrentValue;
        $this->Degenerated->ViewCustomAttributes = "";

        // SpermDate
        $this->SpermDate->ViewValue = $this->SpermDate->CurrentValue;
        $this->SpermDate->ViewValue = FormatDateTime($this->SpermDate->ViewValue, 0);
        $this->SpermDate->ViewCustomAttributes = "";

        // Code1
        $this->Code1->ViewValue = $this->Code1->CurrentValue;
        $this->Code1->ViewCustomAttributes = "";

        // Day1
        $this->Day1->ViewValue = $this->Day1->CurrentValue;
        $this->Day1->ViewCustomAttributes = "";

        // CellStage1
        $this->CellStage1->ViewValue = $this->CellStage1->CurrentValue;
        $this->CellStage1->ViewCustomAttributes = "";

        // Grade1
        $this->Grade1->ViewValue = $this->Grade1->CurrentValue;
        $this->Grade1->ViewCustomAttributes = "";

        // State1
        $this->State1->ViewValue = $this->State1->CurrentValue;
        $this->State1->ViewCustomAttributes = "";

        // Code2
        $this->Code2->ViewValue = $this->Code2->CurrentValue;
        $this->Code2->ViewCustomAttributes = "";

        // Day2
        $this->Day2->ViewValue = $this->Day2->CurrentValue;
        $this->Day2->ViewCustomAttributes = "";

        // CellStage2
        $this->CellStage2->ViewValue = $this->CellStage2->CurrentValue;
        $this->CellStage2->ViewCustomAttributes = "";

        // Grade2
        $this->Grade2->ViewValue = $this->Grade2->CurrentValue;
        $this->Grade2->ViewCustomAttributes = "";

        // State2
        $this->State2->ViewValue = $this->State2->CurrentValue;
        $this->State2->ViewCustomAttributes = "";

        // Code3
        $this->Code3->ViewValue = $this->Code3->CurrentValue;
        $this->Code3->ViewCustomAttributes = "";

        // Day3
        $this->Day3->ViewValue = $this->Day3->CurrentValue;
        $this->Day3->ViewCustomAttributes = "";

        // CellStage3
        $this->CellStage3->ViewValue = $this->CellStage3->CurrentValue;
        $this->CellStage3->ViewCustomAttributes = "";

        // Grade3
        $this->Grade3->ViewValue = $this->Grade3->CurrentValue;
        $this->Grade3->ViewCustomAttributes = "";

        // State3
        $this->State3->ViewValue = $this->State3->CurrentValue;
        $this->State3->ViewCustomAttributes = "";

        // Code4
        $this->Code4->ViewValue = $this->Code4->CurrentValue;
        $this->Code4->ViewCustomAttributes = "";

        // Day4
        $this->Day4->ViewValue = $this->Day4->CurrentValue;
        $this->Day4->ViewCustomAttributes = "";

        // CellStage4
        $this->CellStage4->ViewValue = $this->CellStage4->CurrentValue;
        $this->CellStage4->ViewCustomAttributes = "";

        // Grade4
        $this->Grade4->ViewValue = $this->Grade4->CurrentValue;
        $this->Grade4->ViewCustomAttributes = "";

        // State4
        $this->State4->ViewValue = $this->State4->CurrentValue;
        $this->State4->ViewCustomAttributes = "";

        // Code5
        $this->Code5->ViewValue = $this->Code5->CurrentValue;
        $this->Code5->ViewCustomAttributes = "";

        // Day5
        $this->Day5->ViewValue = $this->Day5->CurrentValue;
        $this->Day5->ViewCustomAttributes = "";

        // CellStage5
        $this->CellStage5->ViewValue = $this->CellStage5->CurrentValue;
        $this->CellStage5->ViewCustomAttributes = "";

        // Grade5
        $this->Grade5->ViewValue = $this->Grade5->CurrentValue;
        $this->Grade5->ViewCustomAttributes = "";

        // State5
        $this->State5->ViewValue = $this->State5->CurrentValue;
        $this->State5->ViewCustomAttributes = "";

        // TidNo
        $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
        $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
        $this->TidNo->ViewCustomAttributes = "";

        // RIDNo
        $this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
        $this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
        $this->RIDNo->ViewCustomAttributes = "";

        // Volume
        $this->Volume->ViewValue = $this->Volume->CurrentValue;
        $this->Volume->ViewCustomAttributes = "";

        // Volume1
        $this->Volume1->ViewValue = $this->Volume1->CurrentValue;
        $this->Volume1->ViewCustomAttributes = "";

        // Volume2
        $this->Volume2->ViewValue = $this->Volume2->CurrentValue;
        $this->Volume2->ViewCustomAttributes = "";

        // Concentration2
        $this->Concentration2->ViewValue = $this->Concentration2->CurrentValue;
        $this->Concentration2->ViewCustomAttributes = "";

        // Total
        $this->Total->ViewValue = $this->Total->CurrentValue;
        $this->Total->ViewCustomAttributes = "";

        // Total1
        $this->Total1->ViewValue = $this->Total1->CurrentValue;
        $this->Total1->ViewCustomAttributes = "";

        // Total2
        $this->Total2->ViewValue = $this->Total2->CurrentValue;
        $this->Total2->ViewCustomAttributes = "";

        // Progressive
        $this->Progressive->ViewValue = $this->Progressive->CurrentValue;
        $this->Progressive->ViewCustomAttributes = "";

        // Progressive1
        $this->Progressive1->ViewValue = $this->Progressive1->CurrentValue;
        $this->Progressive1->ViewCustomAttributes = "";

        // Progressive2
        $this->Progressive2->ViewValue = $this->Progressive2->CurrentValue;
        $this->Progressive2->ViewCustomAttributes = "";

        // NotProgressive
        $this->NotProgressive->ViewValue = $this->NotProgressive->CurrentValue;
        $this->NotProgressive->ViewCustomAttributes = "";

        // NotProgressive1
        $this->NotProgressive1->ViewValue = $this->NotProgressive1->CurrentValue;
        $this->NotProgressive1->ViewCustomAttributes = "";

        // NotProgressive2
        $this->NotProgressive2->ViewValue = $this->NotProgressive2->CurrentValue;
        $this->NotProgressive2->ViewCustomAttributes = "";

        // Motility2
        $this->Motility2->ViewValue = $this->Motility2->CurrentValue;
        $this->Motility2->ViewCustomAttributes = "";

        // Morphology2
        $this->Morphology2->ViewValue = $this->Morphology2->CurrentValue;
        $this->Morphology2->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // IVFRegistrationID
        $this->IVFRegistrationID->LinkCustomAttributes = "";
        $this->IVFRegistrationID->HrefValue = "";
        $this->IVFRegistrationID->TooltipValue = "";

        // ARTCycle
        $this->ARTCycle->LinkCustomAttributes = "";
        $this->ARTCycle->HrefValue = "";
        $this->ARTCycle->TooltipValue = "";

        // Spermorigin
        $this->Spermorigin->LinkCustomAttributes = "";
        $this->Spermorigin->HrefValue = "";
        $this->Spermorigin->TooltipValue = "";

        // InseminatinTechnique
        $this->InseminatinTechnique->LinkCustomAttributes = "";
        $this->InseminatinTechnique->HrefValue = "";
        $this->InseminatinTechnique->TooltipValue = "";

        // IndicationforART
        $this->IndicationforART->LinkCustomAttributes = "";
        $this->IndicationforART->HrefValue = "";
        $this->IndicationforART->TooltipValue = "";

        // ICSIDetails
        $this->ICSIDetails->LinkCustomAttributes = "";
        $this->ICSIDetails->HrefValue = "";
        $this->ICSIDetails->TooltipValue = "";

        // DateofICSI
        $this->DateofICSI->LinkCustomAttributes = "";
        $this->DateofICSI->HrefValue = "";
        $this->DateofICSI->TooltipValue = "";

        // Origin
        $this->Origin->LinkCustomAttributes = "";
        $this->Origin->HrefValue = "";
        $this->Origin->TooltipValue = "";

        // Status
        $this->Status->LinkCustomAttributes = "";
        $this->Status->HrefValue = "";
        $this->Status->TooltipValue = "";

        // Method
        $this->Method->LinkCustomAttributes = "";
        $this->Method->HrefValue = "";
        $this->Method->TooltipValue = "";

        // pre_Concentration
        $this->pre_Concentration->LinkCustomAttributes = "";
        $this->pre_Concentration->HrefValue = "";
        $this->pre_Concentration->TooltipValue = "";

        // pre_Motility
        $this->pre_Motility->LinkCustomAttributes = "";
        $this->pre_Motility->HrefValue = "";
        $this->pre_Motility->TooltipValue = "";

        // pre_Morphology
        $this->pre_Morphology->LinkCustomAttributes = "";
        $this->pre_Morphology->HrefValue = "";
        $this->pre_Morphology->TooltipValue = "";

        // post_Concentration
        $this->post_Concentration->LinkCustomAttributes = "";
        $this->post_Concentration->HrefValue = "";
        $this->post_Concentration->TooltipValue = "";

        // post_Motility
        $this->post_Motility->LinkCustomAttributes = "";
        $this->post_Motility->HrefValue = "";
        $this->post_Motility->TooltipValue = "";

        // post_Morphology
        $this->post_Morphology->LinkCustomAttributes = "";
        $this->post_Morphology->HrefValue = "";
        $this->post_Morphology->TooltipValue = "";

        // DateofET
        $this->DateofET->LinkCustomAttributes = "";
        $this->DateofET->HrefValue = "";
        $this->DateofET->TooltipValue = "";

        // NumberofEmbryostransferred
        $this->NumberofEmbryostransferred->LinkCustomAttributes = "";
        $this->NumberofEmbryostransferred->HrefValue = "";
        $this->NumberofEmbryostransferred->TooltipValue = "";

        // Reasonfornotranfer
        $this->Reasonfornotranfer->LinkCustomAttributes = "";
        $this->Reasonfornotranfer->HrefValue = "";
        $this->Reasonfornotranfer->TooltipValue = "";

        // Embryosunderobservation
        $this->Embryosunderobservation->LinkCustomAttributes = "";
        $this->Embryosunderobservation->HrefValue = "";
        $this->Embryosunderobservation->TooltipValue = "";

        // EmbryosCryopreserved
        $this->EmbryosCryopreserved->LinkCustomAttributes = "";
        $this->EmbryosCryopreserved->HrefValue = "";
        $this->EmbryosCryopreserved->TooltipValue = "";

        // EmbryoDevelopmentSummary
        $this->EmbryoDevelopmentSummary->LinkCustomAttributes = "";
        $this->EmbryoDevelopmentSummary->HrefValue = "";
        $this->EmbryoDevelopmentSummary->TooltipValue = "";

        // LegendCellStage
        $this->LegendCellStage->LinkCustomAttributes = "";
        $this->LegendCellStage->HrefValue = "";
        $this->LegendCellStage->TooltipValue = "";

        // EmbryologistSignature
        $this->EmbryologistSignature->LinkCustomAttributes = "";
        $this->EmbryologistSignature->HrefValue = "";
        $this->EmbryologistSignature->TooltipValue = "";

        // ConsultantsSignature
        $this->ConsultantsSignature->LinkCustomAttributes = "";
        $this->ConsultantsSignature->HrefValue = "";
        $this->ConsultantsSignature->TooltipValue = "";

        // Name
        $this->Name->LinkCustomAttributes = "";
        $this->Name->HrefValue = "";
        $this->Name->TooltipValue = "";

        // M2
        $this->M2->LinkCustomAttributes = "";
        $this->M2->HrefValue = "";
        $this->M2->TooltipValue = "";

        // Mi2
        $this->Mi2->LinkCustomAttributes = "";
        $this->Mi2->HrefValue = "";
        $this->Mi2->TooltipValue = "";

        // ICSI
        $this->ICSI->LinkCustomAttributes = "";
        $this->ICSI->HrefValue = "";
        $this->ICSI->TooltipValue = "";

        // IVF
        $this->IVF->LinkCustomAttributes = "";
        $this->IVF->HrefValue = "";
        $this->IVF->TooltipValue = "";

        // M1
        $this->M1->LinkCustomAttributes = "";
        $this->M1->HrefValue = "";
        $this->M1->TooltipValue = "";

        // GV
        $this->GV->LinkCustomAttributes = "";
        $this->GV->HrefValue = "";
        $this->GV->TooltipValue = "";

        // Others
        $this->_Others->LinkCustomAttributes = "";
        $this->_Others->HrefValue = "";
        $this->_Others->TooltipValue = "";

        // Normal2PN
        $this->Normal2PN->LinkCustomAttributes = "";
        $this->Normal2PN->HrefValue = "";
        $this->Normal2PN->TooltipValue = "";

        // Abnormalfertilisation1N
        $this->Abnormalfertilisation1N->LinkCustomAttributes = "";
        $this->Abnormalfertilisation1N->HrefValue = "";
        $this->Abnormalfertilisation1N->TooltipValue = "";

        // Abnormalfertilisation3N
        $this->Abnormalfertilisation3N->LinkCustomAttributes = "";
        $this->Abnormalfertilisation3N->HrefValue = "";
        $this->Abnormalfertilisation3N->TooltipValue = "";

        // NotFertilized
        $this->NotFertilized->LinkCustomAttributes = "";
        $this->NotFertilized->HrefValue = "";
        $this->NotFertilized->TooltipValue = "";

        // Degenerated
        $this->Degenerated->LinkCustomAttributes = "";
        $this->Degenerated->HrefValue = "";
        $this->Degenerated->TooltipValue = "";

        // SpermDate
        $this->SpermDate->LinkCustomAttributes = "";
        $this->SpermDate->HrefValue = "";
        $this->SpermDate->TooltipValue = "";

        // Code1
        $this->Code1->LinkCustomAttributes = "";
        $this->Code1->HrefValue = "";
        $this->Code1->TooltipValue = "";

        // Day1
        $this->Day1->LinkCustomAttributes = "";
        $this->Day1->HrefValue = "";
        $this->Day1->TooltipValue = "";

        // CellStage1
        $this->CellStage1->LinkCustomAttributes = "";
        $this->CellStage1->HrefValue = "";
        $this->CellStage1->TooltipValue = "";

        // Grade1
        $this->Grade1->LinkCustomAttributes = "";
        $this->Grade1->HrefValue = "";
        $this->Grade1->TooltipValue = "";

        // State1
        $this->State1->LinkCustomAttributes = "";
        $this->State1->HrefValue = "";
        $this->State1->TooltipValue = "";

        // Code2
        $this->Code2->LinkCustomAttributes = "";
        $this->Code2->HrefValue = "";
        $this->Code2->TooltipValue = "";

        // Day2
        $this->Day2->LinkCustomAttributes = "";
        $this->Day2->HrefValue = "";
        $this->Day2->TooltipValue = "";

        // CellStage2
        $this->CellStage2->LinkCustomAttributes = "";
        $this->CellStage2->HrefValue = "";
        $this->CellStage2->TooltipValue = "";

        // Grade2
        $this->Grade2->LinkCustomAttributes = "";
        $this->Grade2->HrefValue = "";
        $this->Grade2->TooltipValue = "";

        // State2
        $this->State2->LinkCustomAttributes = "";
        $this->State2->HrefValue = "";
        $this->State2->TooltipValue = "";

        // Code3
        $this->Code3->LinkCustomAttributes = "";
        $this->Code3->HrefValue = "";
        $this->Code3->TooltipValue = "";

        // Day3
        $this->Day3->LinkCustomAttributes = "";
        $this->Day3->HrefValue = "";
        $this->Day3->TooltipValue = "";

        // CellStage3
        $this->CellStage3->LinkCustomAttributes = "";
        $this->CellStage3->HrefValue = "";
        $this->CellStage3->TooltipValue = "";

        // Grade3
        $this->Grade3->LinkCustomAttributes = "";
        $this->Grade3->HrefValue = "";
        $this->Grade3->TooltipValue = "";

        // State3
        $this->State3->LinkCustomAttributes = "";
        $this->State3->HrefValue = "";
        $this->State3->TooltipValue = "";

        // Code4
        $this->Code4->LinkCustomAttributes = "";
        $this->Code4->HrefValue = "";
        $this->Code4->TooltipValue = "";

        // Day4
        $this->Day4->LinkCustomAttributes = "";
        $this->Day4->HrefValue = "";
        $this->Day4->TooltipValue = "";

        // CellStage4
        $this->CellStage4->LinkCustomAttributes = "";
        $this->CellStage4->HrefValue = "";
        $this->CellStage4->TooltipValue = "";

        // Grade4
        $this->Grade4->LinkCustomAttributes = "";
        $this->Grade4->HrefValue = "";
        $this->Grade4->TooltipValue = "";

        // State4
        $this->State4->LinkCustomAttributes = "";
        $this->State4->HrefValue = "";
        $this->State4->TooltipValue = "";

        // Code5
        $this->Code5->LinkCustomAttributes = "";
        $this->Code5->HrefValue = "";
        $this->Code5->TooltipValue = "";

        // Day5
        $this->Day5->LinkCustomAttributes = "";
        $this->Day5->HrefValue = "";
        $this->Day5->TooltipValue = "";

        // CellStage5
        $this->CellStage5->LinkCustomAttributes = "";
        $this->CellStage5->HrefValue = "";
        $this->CellStage5->TooltipValue = "";

        // Grade5
        $this->Grade5->LinkCustomAttributes = "";
        $this->Grade5->HrefValue = "";
        $this->Grade5->TooltipValue = "";

        // State5
        $this->State5->LinkCustomAttributes = "";
        $this->State5->HrefValue = "";
        $this->State5->TooltipValue = "";

        // TidNo
        $this->TidNo->LinkCustomAttributes = "";
        $this->TidNo->HrefValue = "";
        $this->TidNo->TooltipValue = "";

        // RIDNo
        $this->RIDNo->LinkCustomAttributes = "";
        $this->RIDNo->HrefValue = "";
        $this->RIDNo->TooltipValue = "";

        // Volume
        $this->Volume->LinkCustomAttributes = "";
        $this->Volume->HrefValue = "";
        $this->Volume->TooltipValue = "";

        // Volume1
        $this->Volume1->LinkCustomAttributes = "";
        $this->Volume1->HrefValue = "";
        $this->Volume1->TooltipValue = "";

        // Volume2
        $this->Volume2->LinkCustomAttributes = "";
        $this->Volume2->HrefValue = "";
        $this->Volume2->TooltipValue = "";

        // Concentration2
        $this->Concentration2->LinkCustomAttributes = "";
        $this->Concentration2->HrefValue = "";
        $this->Concentration2->TooltipValue = "";

        // Total
        $this->Total->LinkCustomAttributes = "";
        $this->Total->HrefValue = "";
        $this->Total->TooltipValue = "";

        // Total1
        $this->Total1->LinkCustomAttributes = "";
        $this->Total1->HrefValue = "";
        $this->Total1->TooltipValue = "";

        // Total2
        $this->Total2->LinkCustomAttributes = "";
        $this->Total2->HrefValue = "";
        $this->Total2->TooltipValue = "";

        // Progressive
        $this->Progressive->LinkCustomAttributes = "";
        $this->Progressive->HrefValue = "";
        $this->Progressive->TooltipValue = "";

        // Progressive1
        $this->Progressive1->LinkCustomAttributes = "";
        $this->Progressive1->HrefValue = "";
        $this->Progressive1->TooltipValue = "";

        // Progressive2
        $this->Progressive2->LinkCustomAttributes = "";
        $this->Progressive2->HrefValue = "";
        $this->Progressive2->TooltipValue = "";

        // NotProgressive
        $this->NotProgressive->LinkCustomAttributes = "";
        $this->NotProgressive->HrefValue = "";
        $this->NotProgressive->TooltipValue = "";

        // NotProgressive1
        $this->NotProgressive1->LinkCustomAttributes = "";
        $this->NotProgressive1->HrefValue = "";
        $this->NotProgressive1->TooltipValue = "";

        // NotProgressive2
        $this->NotProgressive2->LinkCustomAttributes = "";
        $this->NotProgressive2->HrefValue = "";
        $this->NotProgressive2->TooltipValue = "";

        // Motility2
        $this->Motility2->LinkCustomAttributes = "";
        $this->Motility2->HrefValue = "";
        $this->Motility2->TooltipValue = "";

        // Morphology2
        $this->Morphology2->LinkCustomAttributes = "";
        $this->Morphology2->HrefValue = "";
        $this->Morphology2->TooltipValue = "";

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

        // IVFRegistrationID
        $this->IVFRegistrationID->EditAttrs["class"] = "form-control";
        $this->IVFRegistrationID->EditCustomAttributes = "";
        $this->IVFRegistrationID->EditValue = $this->IVFRegistrationID->CurrentValue;
        $this->IVFRegistrationID->PlaceHolder = RemoveHtml($this->IVFRegistrationID->caption());

        // ARTCycle
        $this->ARTCycle->EditAttrs["class"] = "form-control";
        $this->ARTCycle->EditCustomAttributes = "";
        if (!$this->ARTCycle->Raw) {
            $this->ARTCycle->CurrentValue = HtmlDecode($this->ARTCycle->CurrentValue);
        }
        $this->ARTCycle->EditValue = $this->ARTCycle->CurrentValue;
        $this->ARTCycle->PlaceHolder = RemoveHtml($this->ARTCycle->caption());

        // Spermorigin
        $this->Spermorigin->EditAttrs["class"] = "form-control";
        $this->Spermorigin->EditCustomAttributes = "";
        if (!$this->Spermorigin->Raw) {
            $this->Spermorigin->CurrentValue = HtmlDecode($this->Spermorigin->CurrentValue);
        }
        $this->Spermorigin->EditValue = $this->Spermorigin->CurrentValue;
        $this->Spermorigin->PlaceHolder = RemoveHtml($this->Spermorigin->caption());

        // InseminatinTechnique
        $this->InseminatinTechnique->EditAttrs["class"] = "form-control";
        $this->InseminatinTechnique->EditCustomAttributes = "";
        if (!$this->InseminatinTechnique->Raw) {
            $this->InseminatinTechnique->CurrentValue = HtmlDecode($this->InseminatinTechnique->CurrentValue);
        }
        $this->InseminatinTechnique->EditValue = $this->InseminatinTechnique->CurrentValue;
        $this->InseminatinTechnique->PlaceHolder = RemoveHtml($this->InseminatinTechnique->caption());

        // IndicationforART
        $this->IndicationforART->EditAttrs["class"] = "form-control";
        $this->IndicationforART->EditCustomAttributes = "";
        if (!$this->IndicationforART->Raw) {
            $this->IndicationforART->CurrentValue = HtmlDecode($this->IndicationforART->CurrentValue);
        }
        $this->IndicationforART->EditValue = $this->IndicationforART->CurrentValue;
        $this->IndicationforART->PlaceHolder = RemoveHtml($this->IndicationforART->caption());

        // ICSIDetails
        $this->ICSIDetails->EditAttrs["class"] = "form-control";
        $this->ICSIDetails->EditCustomAttributes = "";
        if (!$this->ICSIDetails->Raw) {
            $this->ICSIDetails->CurrentValue = HtmlDecode($this->ICSIDetails->CurrentValue);
        }
        $this->ICSIDetails->EditValue = $this->ICSIDetails->CurrentValue;
        $this->ICSIDetails->PlaceHolder = RemoveHtml($this->ICSIDetails->caption());

        // DateofICSI
        $this->DateofICSI->EditAttrs["class"] = "form-control";
        $this->DateofICSI->EditCustomAttributes = "";
        $this->DateofICSI->EditValue = FormatDateTime($this->DateofICSI->CurrentValue, 8);
        $this->DateofICSI->PlaceHolder = RemoveHtml($this->DateofICSI->caption());

        // Origin
        $this->Origin->EditAttrs["class"] = "form-control";
        $this->Origin->EditCustomAttributes = "";
        if (!$this->Origin->Raw) {
            $this->Origin->CurrentValue = HtmlDecode($this->Origin->CurrentValue);
        }
        $this->Origin->EditValue = $this->Origin->CurrentValue;
        $this->Origin->PlaceHolder = RemoveHtml($this->Origin->caption());

        // Status
        $this->Status->EditAttrs["class"] = "form-control";
        $this->Status->EditCustomAttributes = "";
        if (!$this->Status->Raw) {
            $this->Status->CurrentValue = HtmlDecode($this->Status->CurrentValue);
        }
        $this->Status->EditValue = $this->Status->CurrentValue;
        $this->Status->PlaceHolder = RemoveHtml($this->Status->caption());

        // Method
        $this->Method->EditAttrs["class"] = "form-control";
        $this->Method->EditCustomAttributes = "";
        if (!$this->Method->Raw) {
            $this->Method->CurrentValue = HtmlDecode($this->Method->CurrentValue);
        }
        $this->Method->EditValue = $this->Method->CurrentValue;
        $this->Method->PlaceHolder = RemoveHtml($this->Method->caption());

        // pre_Concentration
        $this->pre_Concentration->EditAttrs["class"] = "form-control";
        $this->pre_Concentration->EditCustomAttributes = "";
        if (!$this->pre_Concentration->Raw) {
            $this->pre_Concentration->CurrentValue = HtmlDecode($this->pre_Concentration->CurrentValue);
        }
        $this->pre_Concentration->EditValue = $this->pre_Concentration->CurrentValue;
        $this->pre_Concentration->PlaceHolder = RemoveHtml($this->pre_Concentration->caption());

        // pre_Motility
        $this->pre_Motility->EditAttrs["class"] = "form-control";
        $this->pre_Motility->EditCustomAttributes = "";
        if (!$this->pre_Motility->Raw) {
            $this->pre_Motility->CurrentValue = HtmlDecode($this->pre_Motility->CurrentValue);
        }
        $this->pre_Motility->EditValue = $this->pre_Motility->CurrentValue;
        $this->pre_Motility->PlaceHolder = RemoveHtml($this->pre_Motility->caption());

        // pre_Morphology
        $this->pre_Morphology->EditAttrs["class"] = "form-control";
        $this->pre_Morphology->EditCustomAttributes = "";
        if (!$this->pre_Morphology->Raw) {
            $this->pre_Morphology->CurrentValue = HtmlDecode($this->pre_Morphology->CurrentValue);
        }
        $this->pre_Morphology->EditValue = $this->pre_Morphology->CurrentValue;
        $this->pre_Morphology->PlaceHolder = RemoveHtml($this->pre_Morphology->caption());

        // post_Concentration
        $this->post_Concentration->EditAttrs["class"] = "form-control";
        $this->post_Concentration->EditCustomAttributes = "";
        if (!$this->post_Concentration->Raw) {
            $this->post_Concentration->CurrentValue = HtmlDecode($this->post_Concentration->CurrentValue);
        }
        $this->post_Concentration->EditValue = $this->post_Concentration->CurrentValue;
        $this->post_Concentration->PlaceHolder = RemoveHtml($this->post_Concentration->caption());

        // post_Motility
        $this->post_Motility->EditAttrs["class"] = "form-control";
        $this->post_Motility->EditCustomAttributes = "";
        if (!$this->post_Motility->Raw) {
            $this->post_Motility->CurrentValue = HtmlDecode($this->post_Motility->CurrentValue);
        }
        $this->post_Motility->EditValue = $this->post_Motility->CurrentValue;
        $this->post_Motility->PlaceHolder = RemoveHtml($this->post_Motility->caption());

        // post_Morphology
        $this->post_Morphology->EditAttrs["class"] = "form-control";
        $this->post_Morphology->EditCustomAttributes = "";
        if (!$this->post_Morphology->Raw) {
            $this->post_Morphology->CurrentValue = HtmlDecode($this->post_Morphology->CurrentValue);
        }
        $this->post_Morphology->EditValue = $this->post_Morphology->CurrentValue;
        $this->post_Morphology->PlaceHolder = RemoveHtml($this->post_Morphology->caption());

        // DateofET
        $this->DateofET->EditAttrs["class"] = "form-control";
        $this->DateofET->EditCustomAttributes = "";
        if (!$this->DateofET->Raw) {
            $this->DateofET->CurrentValue = HtmlDecode($this->DateofET->CurrentValue);
        }
        $this->DateofET->EditValue = $this->DateofET->CurrentValue;
        $this->DateofET->PlaceHolder = RemoveHtml($this->DateofET->caption());

        // NumberofEmbryostransferred
        $this->NumberofEmbryostransferred->EditAttrs["class"] = "form-control";
        $this->NumberofEmbryostransferred->EditCustomAttributes = "";
        if (!$this->NumberofEmbryostransferred->Raw) {
            $this->NumberofEmbryostransferred->CurrentValue = HtmlDecode($this->NumberofEmbryostransferred->CurrentValue);
        }
        $this->NumberofEmbryostransferred->EditValue = $this->NumberofEmbryostransferred->CurrentValue;
        $this->NumberofEmbryostransferred->PlaceHolder = RemoveHtml($this->NumberofEmbryostransferred->caption());

        // Reasonfornotranfer
        $this->Reasonfornotranfer->EditAttrs["class"] = "form-control";
        $this->Reasonfornotranfer->EditCustomAttributes = "";
        if (!$this->Reasonfornotranfer->Raw) {
            $this->Reasonfornotranfer->CurrentValue = HtmlDecode($this->Reasonfornotranfer->CurrentValue);
        }
        $this->Reasonfornotranfer->EditValue = $this->Reasonfornotranfer->CurrentValue;
        $this->Reasonfornotranfer->PlaceHolder = RemoveHtml($this->Reasonfornotranfer->caption());

        // Embryosunderobservation
        $this->Embryosunderobservation->EditAttrs["class"] = "form-control";
        $this->Embryosunderobservation->EditCustomAttributes = "";
        if (!$this->Embryosunderobservation->Raw) {
            $this->Embryosunderobservation->CurrentValue = HtmlDecode($this->Embryosunderobservation->CurrentValue);
        }
        $this->Embryosunderobservation->EditValue = $this->Embryosunderobservation->CurrentValue;
        $this->Embryosunderobservation->PlaceHolder = RemoveHtml($this->Embryosunderobservation->caption());

        // EmbryosCryopreserved
        $this->EmbryosCryopreserved->EditAttrs["class"] = "form-control";
        $this->EmbryosCryopreserved->EditCustomAttributes = "";
        if (!$this->EmbryosCryopreserved->Raw) {
            $this->EmbryosCryopreserved->CurrentValue = HtmlDecode($this->EmbryosCryopreserved->CurrentValue);
        }
        $this->EmbryosCryopreserved->EditValue = $this->EmbryosCryopreserved->CurrentValue;
        $this->EmbryosCryopreserved->PlaceHolder = RemoveHtml($this->EmbryosCryopreserved->caption());

        // EmbryoDevelopmentSummary
        $this->EmbryoDevelopmentSummary->EditAttrs["class"] = "form-control";
        $this->EmbryoDevelopmentSummary->EditCustomAttributes = "";
        if (!$this->EmbryoDevelopmentSummary->Raw) {
            $this->EmbryoDevelopmentSummary->CurrentValue = HtmlDecode($this->EmbryoDevelopmentSummary->CurrentValue);
        }
        $this->EmbryoDevelopmentSummary->EditValue = $this->EmbryoDevelopmentSummary->CurrentValue;
        $this->EmbryoDevelopmentSummary->PlaceHolder = RemoveHtml($this->EmbryoDevelopmentSummary->caption());

        // LegendCellStage
        $this->LegendCellStage->EditAttrs["class"] = "form-control";
        $this->LegendCellStage->EditCustomAttributes = "";
        if (!$this->LegendCellStage->Raw) {
            $this->LegendCellStage->CurrentValue = HtmlDecode($this->LegendCellStage->CurrentValue);
        }
        $this->LegendCellStage->EditValue = $this->LegendCellStage->CurrentValue;
        $this->LegendCellStage->PlaceHolder = RemoveHtml($this->LegendCellStage->caption());

        // EmbryologistSignature
        $this->EmbryologistSignature->EditAttrs["class"] = "form-control";
        $this->EmbryologistSignature->EditCustomAttributes = "";
        if (!$this->EmbryologistSignature->Raw) {
            $this->EmbryologistSignature->CurrentValue = HtmlDecode($this->EmbryologistSignature->CurrentValue);
        }
        $this->EmbryologistSignature->EditValue = $this->EmbryologistSignature->CurrentValue;
        $this->EmbryologistSignature->PlaceHolder = RemoveHtml($this->EmbryologistSignature->caption());

        // ConsultantsSignature
        $this->ConsultantsSignature->EditAttrs["class"] = "form-control";
        $this->ConsultantsSignature->EditCustomAttributes = "";
        if (!$this->ConsultantsSignature->Raw) {
            $this->ConsultantsSignature->CurrentValue = HtmlDecode($this->ConsultantsSignature->CurrentValue);
        }
        $this->ConsultantsSignature->EditValue = $this->ConsultantsSignature->CurrentValue;
        $this->ConsultantsSignature->PlaceHolder = RemoveHtml($this->ConsultantsSignature->caption());

        // Name
        $this->Name->EditAttrs["class"] = "form-control";
        $this->Name->EditCustomAttributes = "";
        if (!$this->Name->Raw) {
            $this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
        }
        $this->Name->EditValue = $this->Name->CurrentValue;
        $this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

        // M2
        $this->M2->EditAttrs["class"] = "form-control";
        $this->M2->EditCustomAttributes = "";
        if (!$this->M2->Raw) {
            $this->M2->CurrentValue = HtmlDecode($this->M2->CurrentValue);
        }
        $this->M2->EditValue = $this->M2->CurrentValue;
        $this->M2->PlaceHolder = RemoveHtml($this->M2->caption());

        // Mi2
        $this->Mi2->EditAttrs["class"] = "form-control";
        $this->Mi2->EditCustomAttributes = "";
        if (!$this->Mi2->Raw) {
            $this->Mi2->CurrentValue = HtmlDecode($this->Mi2->CurrentValue);
        }
        $this->Mi2->EditValue = $this->Mi2->CurrentValue;
        $this->Mi2->PlaceHolder = RemoveHtml($this->Mi2->caption());

        // ICSI
        $this->ICSI->EditAttrs["class"] = "form-control";
        $this->ICSI->EditCustomAttributes = "";
        if (!$this->ICSI->Raw) {
            $this->ICSI->CurrentValue = HtmlDecode($this->ICSI->CurrentValue);
        }
        $this->ICSI->EditValue = $this->ICSI->CurrentValue;
        $this->ICSI->PlaceHolder = RemoveHtml($this->ICSI->caption());

        // IVF
        $this->IVF->EditAttrs["class"] = "form-control";
        $this->IVF->EditCustomAttributes = "";
        if (!$this->IVF->Raw) {
            $this->IVF->CurrentValue = HtmlDecode($this->IVF->CurrentValue);
        }
        $this->IVF->EditValue = $this->IVF->CurrentValue;
        $this->IVF->PlaceHolder = RemoveHtml($this->IVF->caption());

        // M1
        $this->M1->EditAttrs["class"] = "form-control";
        $this->M1->EditCustomAttributes = "";
        if (!$this->M1->Raw) {
            $this->M1->CurrentValue = HtmlDecode($this->M1->CurrentValue);
        }
        $this->M1->EditValue = $this->M1->CurrentValue;
        $this->M1->PlaceHolder = RemoveHtml($this->M1->caption());

        // GV
        $this->GV->EditAttrs["class"] = "form-control";
        $this->GV->EditCustomAttributes = "";
        if (!$this->GV->Raw) {
            $this->GV->CurrentValue = HtmlDecode($this->GV->CurrentValue);
        }
        $this->GV->EditValue = $this->GV->CurrentValue;
        $this->GV->PlaceHolder = RemoveHtml($this->GV->caption());

        // Others
        $this->_Others->EditAttrs["class"] = "form-control";
        $this->_Others->EditCustomAttributes = "";
        if (!$this->_Others->Raw) {
            $this->_Others->CurrentValue = HtmlDecode($this->_Others->CurrentValue);
        }
        $this->_Others->EditValue = $this->_Others->CurrentValue;
        $this->_Others->PlaceHolder = RemoveHtml($this->_Others->caption());

        // Normal2PN
        $this->Normal2PN->EditAttrs["class"] = "form-control";
        $this->Normal2PN->EditCustomAttributes = "";
        if (!$this->Normal2PN->Raw) {
            $this->Normal2PN->CurrentValue = HtmlDecode($this->Normal2PN->CurrentValue);
        }
        $this->Normal2PN->EditValue = $this->Normal2PN->CurrentValue;
        $this->Normal2PN->PlaceHolder = RemoveHtml($this->Normal2PN->caption());

        // Abnormalfertilisation1N
        $this->Abnormalfertilisation1N->EditAttrs["class"] = "form-control";
        $this->Abnormalfertilisation1N->EditCustomAttributes = "";
        if (!$this->Abnormalfertilisation1N->Raw) {
            $this->Abnormalfertilisation1N->CurrentValue = HtmlDecode($this->Abnormalfertilisation1N->CurrentValue);
        }
        $this->Abnormalfertilisation1N->EditValue = $this->Abnormalfertilisation1N->CurrentValue;
        $this->Abnormalfertilisation1N->PlaceHolder = RemoveHtml($this->Abnormalfertilisation1N->caption());

        // Abnormalfertilisation3N
        $this->Abnormalfertilisation3N->EditAttrs["class"] = "form-control";
        $this->Abnormalfertilisation3N->EditCustomAttributes = "";
        if (!$this->Abnormalfertilisation3N->Raw) {
            $this->Abnormalfertilisation3N->CurrentValue = HtmlDecode($this->Abnormalfertilisation3N->CurrentValue);
        }
        $this->Abnormalfertilisation3N->EditValue = $this->Abnormalfertilisation3N->CurrentValue;
        $this->Abnormalfertilisation3N->PlaceHolder = RemoveHtml($this->Abnormalfertilisation3N->caption());

        // NotFertilized
        $this->NotFertilized->EditAttrs["class"] = "form-control";
        $this->NotFertilized->EditCustomAttributes = "";
        if (!$this->NotFertilized->Raw) {
            $this->NotFertilized->CurrentValue = HtmlDecode($this->NotFertilized->CurrentValue);
        }
        $this->NotFertilized->EditValue = $this->NotFertilized->CurrentValue;
        $this->NotFertilized->PlaceHolder = RemoveHtml($this->NotFertilized->caption());

        // Degenerated
        $this->Degenerated->EditAttrs["class"] = "form-control";
        $this->Degenerated->EditCustomAttributes = "";
        if (!$this->Degenerated->Raw) {
            $this->Degenerated->CurrentValue = HtmlDecode($this->Degenerated->CurrentValue);
        }
        $this->Degenerated->EditValue = $this->Degenerated->CurrentValue;
        $this->Degenerated->PlaceHolder = RemoveHtml($this->Degenerated->caption());

        // SpermDate
        $this->SpermDate->EditAttrs["class"] = "form-control";
        $this->SpermDate->EditCustomAttributes = "";
        $this->SpermDate->EditValue = FormatDateTime($this->SpermDate->CurrentValue, 8);
        $this->SpermDate->PlaceHolder = RemoveHtml($this->SpermDate->caption());

        // Code1
        $this->Code1->EditAttrs["class"] = "form-control";
        $this->Code1->EditCustomAttributes = "";
        if (!$this->Code1->Raw) {
            $this->Code1->CurrentValue = HtmlDecode($this->Code1->CurrentValue);
        }
        $this->Code1->EditValue = $this->Code1->CurrentValue;
        $this->Code1->PlaceHolder = RemoveHtml($this->Code1->caption());

        // Day1
        $this->Day1->EditAttrs["class"] = "form-control";
        $this->Day1->EditCustomAttributes = "";
        if (!$this->Day1->Raw) {
            $this->Day1->CurrentValue = HtmlDecode($this->Day1->CurrentValue);
        }
        $this->Day1->EditValue = $this->Day1->CurrentValue;
        $this->Day1->PlaceHolder = RemoveHtml($this->Day1->caption());

        // CellStage1
        $this->CellStage1->EditAttrs["class"] = "form-control";
        $this->CellStage1->EditCustomAttributes = "";
        if (!$this->CellStage1->Raw) {
            $this->CellStage1->CurrentValue = HtmlDecode($this->CellStage1->CurrentValue);
        }
        $this->CellStage1->EditValue = $this->CellStage1->CurrentValue;
        $this->CellStage1->PlaceHolder = RemoveHtml($this->CellStage1->caption());

        // Grade1
        $this->Grade1->EditAttrs["class"] = "form-control";
        $this->Grade1->EditCustomAttributes = "";
        if (!$this->Grade1->Raw) {
            $this->Grade1->CurrentValue = HtmlDecode($this->Grade1->CurrentValue);
        }
        $this->Grade1->EditValue = $this->Grade1->CurrentValue;
        $this->Grade1->PlaceHolder = RemoveHtml($this->Grade1->caption());

        // State1
        $this->State1->EditAttrs["class"] = "form-control";
        $this->State1->EditCustomAttributes = "";
        if (!$this->State1->Raw) {
            $this->State1->CurrentValue = HtmlDecode($this->State1->CurrentValue);
        }
        $this->State1->EditValue = $this->State1->CurrentValue;
        $this->State1->PlaceHolder = RemoveHtml($this->State1->caption());

        // Code2
        $this->Code2->EditAttrs["class"] = "form-control";
        $this->Code2->EditCustomAttributes = "";
        if (!$this->Code2->Raw) {
            $this->Code2->CurrentValue = HtmlDecode($this->Code2->CurrentValue);
        }
        $this->Code2->EditValue = $this->Code2->CurrentValue;
        $this->Code2->PlaceHolder = RemoveHtml($this->Code2->caption());

        // Day2
        $this->Day2->EditAttrs["class"] = "form-control";
        $this->Day2->EditCustomAttributes = "";
        if (!$this->Day2->Raw) {
            $this->Day2->CurrentValue = HtmlDecode($this->Day2->CurrentValue);
        }
        $this->Day2->EditValue = $this->Day2->CurrentValue;
        $this->Day2->PlaceHolder = RemoveHtml($this->Day2->caption());

        // CellStage2
        $this->CellStage2->EditAttrs["class"] = "form-control";
        $this->CellStage2->EditCustomAttributes = "";
        if (!$this->CellStage2->Raw) {
            $this->CellStage2->CurrentValue = HtmlDecode($this->CellStage2->CurrentValue);
        }
        $this->CellStage2->EditValue = $this->CellStage2->CurrentValue;
        $this->CellStage2->PlaceHolder = RemoveHtml($this->CellStage2->caption());

        // Grade2
        $this->Grade2->EditAttrs["class"] = "form-control";
        $this->Grade2->EditCustomAttributes = "";
        if (!$this->Grade2->Raw) {
            $this->Grade2->CurrentValue = HtmlDecode($this->Grade2->CurrentValue);
        }
        $this->Grade2->EditValue = $this->Grade2->CurrentValue;
        $this->Grade2->PlaceHolder = RemoveHtml($this->Grade2->caption());

        // State2
        $this->State2->EditAttrs["class"] = "form-control";
        $this->State2->EditCustomAttributes = "";
        if (!$this->State2->Raw) {
            $this->State2->CurrentValue = HtmlDecode($this->State2->CurrentValue);
        }
        $this->State2->EditValue = $this->State2->CurrentValue;
        $this->State2->PlaceHolder = RemoveHtml($this->State2->caption());

        // Code3
        $this->Code3->EditAttrs["class"] = "form-control";
        $this->Code3->EditCustomAttributes = "";
        if (!$this->Code3->Raw) {
            $this->Code3->CurrentValue = HtmlDecode($this->Code3->CurrentValue);
        }
        $this->Code3->EditValue = $this->Code3->CurrentValue;
        $this->Code3->PlaceHolder = RemoveHtml($this->Code3->caption());

        // Day3
        $this->Day3->EditAttrs["class"] = "form-control";
        $this->Day3->EditCustomAttributes = "";
        if (!$this->Day3->Raw) {
            $this->Day3->CurrentValue = HtmlDecode($this->Day3->CurrentValue);
        }
        $this->Day3->EditValue = $this->Day3->CurrentValue;
        $this->Day3->PlaceHolder = RemoveHtml($this->Day3->caption());

        // CellStage3
        $this->CellStage3->EditAttrs["class"] = "form-control";
        $this->CellStage3->EditCustomAttributes = "";
        if (!$this->CellStage3->Raw) {
            $this->CellStage3->CurrentValue = HtmlDecode($this->CellStage3->CurrentValue);
        }
        $this->CellStage3->EditValue = $this->CellStage3->CurrentValue;
        $this->CellStage3->PlaceHolder = RemoveHtml($this->CellStage3->caption());

        // Grade3
        $this->Grade3->EditAttrs["class"] = "form-control";
        $this->Grade3->EditCustomAttributes = "";
        if (!$this->Grade3->Raw) {
            $this->Grade3->CurrentValue = HtmlDecode($this->Grade3->CurrentValue);
        }
        $this->Grade3->EditValue = $this->Grade3->CurrentValue;
        $this->Grade3->PlaceHolder = RemoveHtml($this->Grade3->caption());

        // State3
        $this->State3->EditAttrs["class"] = "form-control";
        $this->State3->EditCustomAttributes = "";
        if (!$this->State3->Raw) {
            $this->State3->CurrentValue = HtmlDecode($this->State3->CurrentValue);
        }
        $this->State3->EditValue = $this->State3->CurrentValue;
        $this->State3->PlaceHolder = RemoveHtml($this->State3->caption());

        // Code4
        $this->Code4->EditAttrs["class"] = "form-control";
        $this->Code4->EditCustomAttributes = "";
        if (!$this->Code4->Raw) {
            $this->Code4->CurrentValue = HtmlDecode($this->Code4->CurrentValue);
        }
        $this->Code4->EditValue = $this->Code4->CurrentValue;
        $this->Code4->PlaceHolder = RemoveHtml($this->Code4->caption());

        // Day4
        $this->Day4->EditAttrs["class"] = "form-control";
        $this->Day4->EditCustomAttributes = "";
        if (!$this->Day4->Raw) {
            $this->Day4->CurrentValue = HtmlDecode($this->Day4->CurrentValue);
        }
        $this->Day4->EditValue = $this->Day4->CurrentValue;
        $this->Day4->PlaceHolder = RemoveHtml($this->Day4->caption());

        // CellStage4
        $this->CellStage4->EditAttrs["class"] = "form-control";
        $this->CellStage4->EditCustomAttributes = "";
        if (!$this->CellStage4->Raw) {
            $this->CellStage4->CurrentValue = HtmlDecode($this->CellStage4->CurrentValue);
        }
        $this->CellStage4->EditValue = $this->CellStage4->CurrentValue;
        $this->CellStage4->PlaceHolder = RemoveHtml($this->CellStage4->caption());

        // Grade4
        $this->Grade4->EditAttrs["class"] = "form-control";
        $this->Grade4->EditCustomAttributes = "";
        if (!$this->Grade4->Raw) {
            $this->Grade4->CurrentValue = HtmlDecode($this->Grade4->CurrentValue);
        }
        $this->Grade4->EditValue = $this->Grade4->CurrentValue;
        $this->Grade4->PlaceHolder = RemoveHtml($this->Grade4->caption());

        // State4
        $this->State4->EditAttrs["class"] = "form-control";
        $this->State4->EditCustomAttributes = "";
        if (!$this->State4->Raw) {
            $this->State4->CurrentValue = HtmlDecode($this->State4->CurrentValue);
        }
        $this->State4->EditValue = $this->State4->CurrentValue;
        $this->State4->PlaceHolder = RemoveHtml($this->State4->caption());

        // Code5
        $this->Code5->EditAttrs["class"] = "form-control";
        $this->Code5->EditCustomAttributes = "";
        if (!$this->Code5->Raw) {
            $this->Code5->CurrentValue = HtmlDecode($this->Code5->CurrentValue);
        }
        $this->Code5->EditValue = $this->Code5->CurrentValue;
        $this->Code5->PlaceHolder = RemoveHtml($this->Code5->caption());

        // Day5
        $this->Day5->EditAttrs["class"] = "form-control";
        $this->Day5->EditCustomAttributes = "";
        if (!$this->Day5->Raw) {
            $this->Day5->CurrentValue = HtmlDecode($this->Day5->CurrentValue);
        }
        $this->Day5->EditValue = $this->Day5->CurrentValue;
        $this->Day5->PlaceHolder = RemoveHtml($this->Day5->caption());

        // CellStage5
        $this->CellStage5->EditAttrs["class"] = "form-control";
        $this->CellStage5->EditCustomAttributes = "";
        if (!$this->CellStage5->Raw) {
            $this->CellStage5->CurrentValue = HtmlDecode($this->CellStage5->CurrentValue);
        }
        $this->CellStage5->EditValue = $this->CellStage5->CurrentValue;
        $this->CellStage5->PlaceHolder = RemoveHtml($this->CellStage5->caption());

        // Grade5
        $this->Grade5->EditAttrs["class"] = "form-control";
        $this->Grade5->EditCustomAttributes = "";
        if (!$this->Grade5->Raw) {
            $this->Grade5->CurrentValue = HtmlDecode($this->Grade5->CurrentValue);
        }
        $this->Grade5->EditValue = $this->Grade5->CurrentValue;
        $this->Grade5->PlaceHolder = RemoveHtml($this->Grade5->caption());

        // State5
        $this->State5->EditAttrs["class"] = "form-control";
        $this->State5->EditCustomAttributes = "";
        if (!$this->State5->Raw) {
            $this->State5->CurrentValue = HtmlDecode($this->State5->CurrentValue);
        }
        $this->State5->EditValue = $this->State5->CurrentValue;
        $this->State5->PlaceHolder = RemoveHtml($this->State5->caption());

        // TidNo
        $this->TidNo->EditAttrs["class"] = "form-control";
        $this->TidNo->EditCustomAttributes = "";
        $this->TidNo->EditValue = $this->TidNo->CurrentValue;
        $this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

        // RIDNo
        $this->RIDNo->EditAttrs["class"] = "form-control";
        $this->RIDNo->EditCustomAttributes = "";
        $this->RIDNo->EditValue = $this->RIDNo->CurrentValue;
        $this->RIDNo->PlaceHolder = RemoveHtml($this->RIDNo->caption());

        // Volume
        $this->Volume->EditAttrs["class"] = "form-control";
        $this->Volume->EditCustomAttributes = "";
        if (!$this->Volume->Raw) {
            $this->Volume->CurrentValue = HtmlDecode($this->Volume->CurrentValue);
        }
        $this->Volume->EditValue = $this->Volume->CurrentValue;
        $this->Volume->PlaceHolder = RemoveHtml($this->Volume->caption());

        // Volume1
        $this->Volume1->EditAttrs["class"] = "form-control";
        $this->Volume1->EditCustomAttributes = "";
        if (!$this->Volume1->Raw) {
            $this->Volume1->CurrentValue = HtmlDecode($this->Volume1->CurrentValue);
        }
        $this->Volume1->EditValue = $this->Volume1->CurrentValue;
        $this->Volume1->PlaceHolder = RemoveHtml($this->Volume1->caption());

        // Volume2
        $this->Volume2->EditAttrs["class"] = "form-control";
        $this->Volume2->EditCustomAttributes = "";
        if (!$this->Volume2->Raw) {
            $this->Volume2->CurrentValue = HtmlDecode($this->Volume2->CurrentValue);
        }
        $this->Volume2->EditValue = $this->Volume2->CurrentValue;
        $this->Volume2->PlaceHolder = RemoveHtml($this->Volume2->caption());

        // Concentration2
        $this->Concentration2->EditAttrs["class"] = "form-control";
        $this->Concentration2->EditCustomAttributes = "";
        if (!$this->Concentration2->Raw) {
            $this->Concentration2->CurrentValue = HtmlDecode($this->Concentration2->CurrentValue);
        }
        $this->Concentration2->EditValue = $this->Concentration2->CurrentValue;
        $this->Concentration2->PlaceHolder = RemoveHtml($this->Concentration2->caption());

        // Total
        $this->Total->EditAttrs["class"] = "form-control";
        $this->Total->EditCustomAttributes = "";
        if (!$this->Total->Raw) {
            $this->Total->CurrentValue = HtmlDecode($this->Total->CurrentValue);
        }
        $this->Total->EditValue = $this->Total->CurrentValue;
        $this->Total->PlaceHolder = RemoveHtml($this->Total->caption());

        // Total1
        $this->Total1->EditAttrs["class"] = "form-control";
        $this->Total1->EditCustomAttributes = "";
        if (!$this->Total1->Raw) {
            $this->Total1->CurrentValue = HtmlDecode($this->Total1->CurrentValue);
        }
        $this->Total1->EditValue = $this->Total1->CurrentValue;
        $this->Total1->PlaceHolder = RemoveHtml($this->Total1->caption());

        // Total2
        $this->Total2->EditAttrs["class"] = "form-control";
        $this->Total2->EditCustomAttributes = "";
        if (!$this->Total2->Raw) {
            $this->Total2->CurrentValue = HtmlDecode($this->Total2->CurrentValue);
        }
        $this->Total2->EditValue = $this->Total2->CurrentValue;
        $this->Total2->PlaceHolder = RemoveHtml($this->Total2->caption());

        // Progressive
        $this->Progressive->EditAttrs["class"] = "form-control";
        $this->Progressive->EditCustomAttributes = "";
        if (!$this->Progressive->Raw) {
            $this->Progressive->CurrentValue = HtmlDecode($this->Progressive->CurrentValue);
        }
        $this->Progressive->EditValue = $this->Progressive->CurrentValue;
        $this->Progressive->PlaceHolder = RemoveHtml($this->Progressive->caption());

        // Progressive1
        $this->Progressive1->EditAttrs["class"] = "form-control";
        $this->Progressive1->EditCustomAttributes = "";
        if (!$this->Progressive1->Raw) {
            $this->Progressive1->CurrentValue = HtmlDecode($this->Progressive1->CurrentValue);
        }
        $this->Progressive1->EditValue = $this->Progressive1->CurrentValue;
        $this->Progressive1->PlaceHolder = RemoveHtml($this->Progressive1->caption());

        // Progressive2
        $this->Progressive2->EditAttrs["class"] = "form-control";
        $this->Progressive2->EditCustomAttributes = "";
        if (!$this->Progressive2->Raw) {
            $this->Progressive2->CurrentValue = HtmlDecode($this->Progressive2->CurrentValue);
        }
        $this->Progressive2->EditValue = $this->Progressive2->CurrentValue;
        $this->Progressive2->PlaceHolder = RemoveHtml($this->Progressive2->caption());

        // NotProgressive
        $this->NotProgressive->EditAttrs["class"] = "form-control";
        $this->NotProgressive->EditCustomAttributes = "";
        if (!$this->NotProgressive->Raw) {
            $this->NotProgressive->CurrentValue = HtmlDecode($this->NotProgressive->CurrentValue);
        }
        $this->NotProgressive->EditValue = $this->NotProgressive->CurrentValue;
        $this->NotProgressive->PlaceHolder = RemoveHtml($this->NotProgressive->caption());

        // NotProgressive1
        $this->NotProgressive1->EditAttrs["class"] = "form-control";
        $this->NotProgressive1->EditCustomAttributes = "";
        if (!$this->NotProgressive1->Raw) {
            $this->NotProgressive1->CurrentValue = HtmlDecode($this->NotProgressive1->CurrentValue);
        }
        $this->NotProgressive1->EditValue = $this->NotProgressive1->CurrentValue;
        $this->NotProgressive1->PlaceHolder = RemoveHtml($this->NotProgressive1->caption());

        // NotProgressive2
        $this->NotProgressive2->EditAttrs["class"] = "form-control";
        $this->NotProgressive2->EditCustomAttributes = "";
        if (!$this->NotProgressive2->Raw) {
            $this->NotProgressive2->CurrentValue = HtmlDecode($this->NotProgressive2->CurrentValue);
        }
        $this->NotProgressive2->EditValue = $this->NotProgressive2->CurrentValue;
        $this->NotProgressive2->PlaceHolder = RemoveHtml($this->NotProgressive2->caption());

        // Motility2
        $this->Motility2->EditAttrs["class"] = "form-control";
        $this->Motility2->EditCustomAttributes = "";
        if (!$this->Motility2->Raw) {
            $this->Motility2->CurrentValue = HtmlDecode($this->Motility2->CurrentValue);
        }
        $this->Motility2->EditValue = $this->Motility2->CurrentValue;
        $this->Motility2->PlaceHolder = RemoveHtml($this->Motility2->caption());

        // Morphology2
        $this->Morphology2->EditAttrs["class"] = "form-control";
        $this->Morphology2->EditCustomAttributes = "";
        if (!$this->Morphology2->Raw) {
            $this->Morphology2->CurrentValue = HtmlDecode($this->Morphology2->CurrentValue);
        }
        $this->Morphology2->EditValue = $this->Morphology2->CurrentValue;
        $this->Morphology2->PlaceHolder = RemoveHtml($this->Morphology2->caption());

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
                    $doc->exportCaption($this->IVFRegistrationID);
                    $doc->exportCaption($this->ARTCycle);
                    $doc->exportCaption($this->Spermorigin);
                    $doc->exportCaption($this->InseminatinTechnique);
                    $doc->exportCaption($this->IndicationforART);
                    $doc->exportCaption($this->ICSIDetails);
                    $doc->exportCaption($this->DateofICSI);
                    $doc->exportCaption($this->Origin);
                    $doc->exportCaption($this->Status);
                    $doc->exportCaption($this->Method);
                    $doc->exportCaption($this->pre_Concentration);
                    $doc->exportCaption($this->pre_Motility);
                    $doc->exportCaption($this->pre_Morphology);
                    $doc->exportCaption($this->post_Concentration);
                    $doc->exportCaption($this->post_Motility);
                    $doc->exportCaption($this->post_Morphology);
                    $doc->exportCaption($this->DateofET);
                    $doc->exportCaption($this->NumberofEmbryostransferred);
                    $doc->exportCaption($this->Reasonfornotranfer);
                    $doc->exportCaption($this->Embryosunderobservation);
                    $doc->exportCaption($this->EmbryosCryopreserved);
                    $doc->exportCaption($this->EmbryoDevelopmentSummary);
                    $doc->exportCaption($this->LegendCellStage);
                    $doc->exportCaption($this->EmbryologistSignature);
                    $doc->exportCaption($this->ConsultantsSignature);
                    $doc->exportCaption($this->Name);
                    $doc->exportCaption($this->M2);
                    $doc->exportCaption($this->Mi2);
                    $doc->exportCaption($this->ICSI);
                    $doc->exportCaption($this->IVF);
                    $doc->exportCaption($this->M1);
                    $doc->exportCaption($this->GV);
                    $doc->exportCaption($this->_Others);
                    $doc->exportCaption($this->Normal2PN);
                    $doc->exportCaption($this->Abnormalfertilisation1N);
                    $doc->exportCaption($this->Abnormalfertilisation3N);
                    $doc->exportCaption($this->NotFertilized);
                    $doc->exportCaption($this->Degenerated);
                    $doc->exportCaption($this->SpermDate);
                    $doc->exportCaption($this->Code1);
                    $doc->exportCaption($this->Day1);
                    $doc->exportCaption($this->CellStage1);
                    $doc->exportCaption($this->Grade1);
                    $doc->exportCaption($this->State1);
                    $doc->exportCaption($this->Code2);
                    $doc->exportCaption($this->Day2);
                    $doc->exportCaption($this->CellStage2);
                    $doc->exportCaption($this->Grade2);
                    $doc->exportCaption($this->State2);
                    $doc->exportCaption($this->Code3);
                    $doc->exportCaption($this->Day3);
                    $doc->exportCaption($this->CellStage3);
                    $doc->exportCaption($this->Grade3);
                    $doc->exportCaption($this->State3);
                    $doc->exportCaption($this->Code4);
                    $doc->exportCaption($this->Day4);
                    $doc->exportCaption($this->CellStage4);
                    $doc->exportCaption($this->Grade4);
                    $doc->exportCaption($this->State4);
                    $doc->exportCaption($this->Code5);
                    $doc->exportCaption($this->Day5);
                    $doc->exportCaption($this->CellStage5);
                    $doc->exportCaption($this->Grade5);
                    $doc->exportCaption($this->State5);
                    $doc->exportCaption($this->TidNo);
                    $doc->exportCaption($this->RIDNo);
                    $doc->exportCaption($this->Volume);
                    $doc->exportCaption($this->Volume1);
                    $doc->exportCaption($this->Volume2);
                    $doc->exportCaption($this->Concentration2);
                    $doc->exportCaption($this->Total);
                    $doc->exportCaption($this->Total1);
                    $doc->exportCaption($this->Total2);
                    $doc->exportCaption($this->Progressive);
                    $doc->exportCaption($this->Progressive1);
                    $doc->exportCaption($this->Progressive2);
                    $doc->exportCaption($this->NotProgressive);
                    $doc->exportCaption($this->NotProgressive1);
                    $doc->exportCaption($this->NotProgressive2);
                    $doc->exportCaption($this->Motility2);
                    $doc->exportCaption($this->Morphology2);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->IVFRegistrationID);
                    $doc->exportCaption($this->ARTCycle);
                    $doc->exportCaption($this->Spermorigin);
                    $doc->exportCaption($this->InseminatinTechnique);
                    $doc->exportCaption($this->IndicationforART);
                    $doc->exportCaption($this->ICSIDetails);
                    $doc->exportCaption($this->DateofICSI);
                    $doc->exportCaption($this->Origin);
                    $doc->exportCaption($this->Status);
                    $doc->exportCaption($this->Method);
                    $doc->exportCaption($this->pre_Concentration);
                    $doc->exportCaption($this->pre_Motility);
                    $doc->exportCaption($this->pre_Morphology);
                    $doc->exportCaption($this->post_Concentration);
                    $doc->exportCaption($this->post_Motility);
                    $doc->exportCaption($this->post_Morphology);
                    $doc->exportCaption($this->DateofET);
                    $doc->exportCaption($this->NumberofEmbryostransferred);
                    $doc->exportCaption($this->Reasonfornotranfer);
                    $doc->exportCaption($this->Embryosunderobservation);
                    $doc->exportCaption($this->EmbryosCryopreserved);
                    $doc->exportCaption($this->EmbryoDevelopmentSummary);
                    $doc->exportCaption($this->LegendCellStage);
                    $doc->exportCaption($this->EmbryologistSignature);
                    $doc->exportCaption($this->ConsultantsSignature);
                    $doc->exportCaption($this->Name);
                    $doc->exportCaption($this->M2);
                    $doc->exportCaption($this->Mi2);
                    $doc->exportCaption($this->ICSI);
                    $doc->exportCaption($this->IVF);
                    $doc->exportCaption($this->M1);
                    $doc->exportCaption($this->GV);
                    $doc->exportCaption($this->_Others);
                    $doc->exportCaption($this->Normal2PN);
                    $doc->exportCaption($this->Abnormalfertilisation1N);
                    $doc->exportCaption($this->Abnormalfertilisation3N);
                    $doc->exportCaption($this->NotFertilized);
                    $doc->exportCaption($this->Degenerated);
                    $doc->exportCaption($this->SpermDate);
                    $doc->exportCaption($this->Code1);
                    $doc->exportCaption($this->Day1);
                    $doc->exportCaption($this->CellStage1);
                    $doc->exportCaption($this->Grade1);
                    $doc->exportCaption($this->State1);
                    $doc->exportCaption($this->Code2);
                    $doc->exportCaption($this->Day2);
                    $doc->exportCaption($this->CellStage2);
                    $doc->exportCaption($this->Grade2);
                    $doc->exportCaption($this->State2);
                    $doc->exportCaption($this->Code3);
                    $doc->exportCaption($this->Day3);
                    $doc->exportCaption($this->CellStage3);
                    $doc->exportCaption($this->Grade3);
                    $doc->exportCaption($this->State3);
                    $doc->exportCaption($this->Code4);
                    $doc->exportCaption($this->Day4);
                    $doc->exportCaption($this->CellStage4);
                    $doc->exportCaption($this->Grade4);
                    $doc->exportCaption($this->State4);
                    $doc->exportCaption($this->Code5);
                    $doc->exportCaption($this->Day5);
                    $doc->exportCaption($this->CellStage5);
                    $doc->exportCaption($this->Grade5);
                    $doc->exportCaption($this->State5);
                    $doc->exportCaption($this->TidNo);
                    $doc->exportCaption($this->RIDNo);
                    $doc->exportCaption($this->Volume);
                    $doc->exportCaption($this->Volume1);
                    $doc->exportCaption($this->Volume2);
                    $doc->exportCaption($this->Concentration2);
                    $doc->exportCaption($this->Total);
                    $doc->exportCaption($this->Total1);
                    $doc->exportCaption($this->Total2);
                    $doc->exportCaption($this->Progressive);
                    $doc->exportCaption($this->Progressive1);
                    $doc->exportCaption($this->Progressive2);
                    $doc->exportCaption($this->NotProgressive);
                    $doc->exportCaption($this->NotProgressive1);
                    $doc->exportCaption($this->NotProgressive2);
                    $doc->exportCaption($this->Motility2);
                    $doc->exportCaption($this->Morphology2);
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
                        $doc->exportField($this->IVFRegistrationID);
                        $doc->exportField($this->ARTCycle);
                        $doc->exportField($this->Spermorigin);
                        $doc->exportField($this->InseminatinTechnique);
                        $doc->exportField($this->IndicationforART);
                        $doc->exportField($this->ICSIDetails);
                        $doc->exportField($this->DateofICSI);
                        $doc->exportField($this->Origin);
                        $doc->exportField($this->Status);
                        $doc->exportField($this->Method);
                        $doc->exportField($this->pre_Concentration);
                        $doc->exportField($this->pre_Motility);
                        $doc->exportField($this->pre_Morphology);
                        $doc->exportField($this->post_Concentration);
                        $doc->exportField($this->post_Motility);
                        $doc->exportField($this->post_Morphology);
                        $doc->exportField($this->DateofET);
                        $doc->exportField($this->NumberofEmbryostransferred);
                        $doc->exportField($this->Reasonfornotranfer);
                        $doc->exportField($this->Embryosunderobservation);
                        $doc->exportField($this->EmbryosCryopreserved);
                        $doc->exportField($this->EmbryoDevelopmentSummary);
                        $doc->exportField($this->LegendCellStage);
                        $doc->exportField($this->EmbryologistSignature);
                        $doc->exportField($this->ConsultantsSignature);
                        $doc->exportField($this->Name);
                        $doc->exportField($this->M2);
                        $doc->exportField($this->Mi2);
                        $doc->exportField($this->ICSI);
                        $doc->exportField($this->IVF);
                        $doc->exportField($this->M1);
                        $doc->exportField($this->GV);
                        $doc->exportField($this->_Others);
                        $doc->exportField($this->Normal2PN);
                        $doc->exportField($this->Abnormalfertilisation1N);
                        $doc->exportField($this->Abnormalfertilisation3N);
                        $doc->exportField($this->NotFertilized);
                        $doc->exportField($this->Degenerated);
                        $doc->exportField($this->SpermDate);
                        $doc->exportField($this->Code1);
                        $doc->exportField($this->Day1);
                        $doc->exportField($this->CellStage1);
                        $doc->exportField($this->Grade1);
                        $doc->exportField($this->State1);
                        $doc->exportField($this->Code2);
                        $doc->exportField($this->Day2);
                        $doc->exportField($this->CellStage2);
                        $doc->exportField($this->Grade2);
                        $doc->exportField($this->State2);
                        $doc->exportField($this->Code3);
                        $doc->exportField($this->Day3);
                        $doc->exportField($this->CellStage3);
                        $doc->exportField($this->Grade3);
                        $doc->exportField($this->State3);
                        $doc->exportField($this->Code4);
                        $doc->exportField($this->Day4);
                        $doc->exportField($this->CellStage4);
                        $doc->exportField($this->Grade4);
                        $doc->exportField($this->State4);
                        $doc->exportField($this->Code5);
                        $doc->exportField($this->Day5);
                        $doc->exportField($this->CellStage5);
                        $doc->exportField($this->Grade5);
                        $doc->exportField($this->State5);
                        $doc->exportField($this->TidNo);
                        $doc->exportField($this->RIDNo);
                        $doc->exportField($this->Volume);
                        $doc->exportField($this->Volume1);
                        $doc->exportField($this->Volume2);
                        $doc->exportField($this->Concentration2);
                        $doc->exportField($this->Total);
                        $doc->exportField($this->Total1);
                        $doc->exportField($this->Total2);
                        $doc->exportField($this->Progressive);
                        $doc->exportField($this->Progressive1);
                        $doc->exportField($this->Progressive2);
                        $doc->exportField($this->NotProgressive);
                        $doc->exportField($this->NotProgressive1);
                        $doc->exportField($this->NotProgressive2);
                        $doc->exportField($this->Motility2);
                        $doc->exportField($this->Morphology2);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->IVFRegistrationID);
                        $doc->exportField($this->ARTCycle);
                        $doc->exportField($this->Spermorigin);
                        $doc->exportField($this->InseminatinTechnique);
                        $doc->exportField($this->IndicationforART);
                        $doc->exportField($this->ICSIDetails);
                        $doc->exportField($this->DateofICSI);
                        $doc->exportField($this->Origin);
                        $doc->exportField($this->Status);
                        $doc->exportField($this->Method);
                        $doc->exportField($this->pre_Concentration);
                        $doc->exportField($this->pre_Motility);
                        $doc->exportField($this->pre_Morphology);
                        $doc->exportField($this->post_Concentration);
                        $doc->exportField($this->post_Motility);
                        $doc->exportField($this->post_Morphology);
                        $doc->exportField($this->DateofET);
                        $doc->exportField($this->NumberofEmbryostransferred);
                        $doc->exportField($this->Reasonfornotranfer);
                        $doc->exportField($this->Embryosunderobservation);
                        $doc->exportField($this->EmbryosCryopreserved);
                        $doc->exportField($this->EmbryoDevelopmentSummary);
                        $doc->exportField($this->LegendCellStage);
                        $doc->exportField($this->EmbryologistSignature);
                        $doc->exportField($this->ConsultantsSignature);
                        $doc->exportField($this->Name);
                        $doc->exportField($this->M2);
                        $doc->exportField($this->Mi2);
                        $doc->exportField($this->ICSI);
                        $doc->exportField($this->IVF);
                        $doc->exportField($this->M1);
                        $doc->exportField($this->GV);
                        $doc->exportField($this->_Others);
                        $doc->exportField($this->Normal2PN);
                        $doc->exportField($this->Abnormalfertilisation1N);
                        $doc->exportField($this->Abnormalfertilisation3N);
                        $doc->exportField($this->NotFertilized);
                        $doc->exportField($this->Degenerated);
                        $doc->exportField($this->SpermDate);
                        $doc->exportField($this->Code1);
                        $doc->exportField($this->Day1);
                        $doc->exportField($this->CellStage1);
                        $doc->exportField($this->Grade1);
                        $doc->exportField($this->State1);
                        $doc->exportField($this->Code2);
                        $doc->exportField($this->Day2);
                        $doc->exportField($this->CellStage2);
                        $doc->exportField($this->Grade2);
                        $doc->exportField($this->State2);
                        $doc->exportField($this->Code3);
                        $doc->exportField($this->Day3);
                        $doc->exportField($this->CellStage3);
                        $doc->exportField($this->Grade3);
                        $doc->exportField($this->State3);
                        $doc->exportField($this->Code4);
                        $doc->exportField($this->Day4);
                        $doc->exportField($this->CellStage4);
                        $doc->exportField($this->Grade4);
                        $doc->exportField($this->State4);
                        $doc->exportField($this->Code5);
                        $doc->exportField($this->Day5);
                        $doc->exportField($this->CellStage5);
                        $doc->exportField($this->Grade5);
                        $doc->exportField($this->State5);
                        $doc->exportField($this->TidNo);
                        $doc->exportField($this->RIDNo);
                        $doc->exportField($this->Volume);
                        $doc->exportField($this->Volume1);
                        $doc->exportField($this->Volume2);
                        $doc->exportField($this->Concentration2);
                        $doc->exportField($this->Total);
                        $doc->exportField($this->Total1);
                        $doc->exportField($this->Total2);
                        $doc->exportField($this->Progressive);
                        $doc->exportField($this->Progressive1);
                        $doc->exportField($this->Progressive2);
                        $doc->exportField($this->NotProgressive);
                        $doc->exportField($this->NotProgressive1);
                        $doc->exportField($this->NotProgressive2);
                        $doc->exportField($this->Motility2);
                        $doc->exportField($this->Morphology2);
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
