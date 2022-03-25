<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_template_for_opu
 */
class ViewTemplateForOpu extends DbTable
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
    public $RIDNO;
    public $Treatment;
    public $Origin;
    public $MaleIndications;
    public $FemaleIndications;
    public $PatientName;
    public $PatientID;
    public $PartnerName;
    public $PartnerID;
    public $A4ICSICycle;
    public $TotalICSICycle;
    public $TypeOfInfertility;
    public $RelevantHistory;
    public $IUICycles;
    public $AMH;
    public $FBMI;
    public $ANTAGONISTSTARTDAY;
    public $OvarianSurgery;
    public $OPUDATE;
    public $RFSH1;
    public $RFSH2;
    public $RFSH3;
    public $E21;
    public $Hysteroscopy;
    public $HospID;
    public $Fweight;
    public $AntiTPO;
    public $AntiTG;
    public $PatientAge;
    public $PartnerAge;
    public $CYCLES;
    public $MF;
    public $CauseOfINFERTILITY;
    public $SIS;
    public $Scratching;
    public $Cannulation;
    public $MEPRATE;
    public $ROVARY;
    public $RAFC;
    public $LOVARY;
    public $LAFC;
    public $LH1;
    public $E2;
    public $StemCellInstallation;
    public $DHEAS;
    public $Mtorr;
    public $AMH1;
    public $LH;
    public $BMIMALE;
    public $MaleMedicalConditions;
    public $MaleExamination;
    public $SpermConcentration;
    public $SpermMotilityPNP;
    public $SpermMorphology;
    public $SpermRetrival;
    public $MTestosterone;
    public $DFI;
    public $PreRX;
    public $CC100;
    public $RFSH1A;
    public $HMG1;
    public $RLH;
    public $HMG_HP;
    public $day_of_HMG;
    public $Reason_for_HMG;
    public $RLH_day;
    public $DAYSOFSTIMULATION;
    public $AnychangeinbetweenDoseaddedday;
    public $dayofAnta;
    public $RFSHTD;
    public $RFSHHMGTD;
    public $RFSHRLHTD;
    public $HMGTD;
    public $LHTD;
    public $D1LH;
    public $D1E2;
    public $TriggerdayE2;
    public $TriggerdayP4;
    public $TriggerdayLH;
    public $VITD;
    public $TRIGGERR;
    public $BHCGBEFORERETRIEVAL;
    public $LH12HRS;
    public $P412HRS;
    public $ETonhCGday;
    public $ETdoppler;
    public $VIFIVFI;
    public $Endometrialabnormality;
    public $AFCONS1;
    public $TIMEOFOPUFROMTRIGGER;
    public $SPERMTYPE;
    public $EXPECTEDONTRIGGERDAY;
    public $OOCYTESRETRIEVED;
    public $TIMEOFDENUDATION;
    public $MII;
    public $MI;
    public $GV;
    public $ICSITIMEFORMOPU;
    public $FERT2PN;
    public $DEG;
    public $D3GRADEA;
    public $D3GRADEB;
    public $D3GRADEC;
    public $D3GRADED;
    public $USABLEONDAY3ET;
    public $USABLEONday3FREEZING;
    public $D5GARDEA;
    public $D5GRADEB;
    public $D5GRADEC;
    public $D5GRADED;
    public $USABLEOND5ET;
    public $USABLEOND5FREEZING;
    public $D6GRADEA;
    public $D6GRADEB;
    public $D6GRADEC;
    public $D6GRADED;
    public $D6USABLEEMBRYOET;
    public $D6USABLEFREEZING;
    public $TOTALBLAST;
    public $PGS;
    public $REMARKS;
    public $PUDB;
    public $ICSIDB;
    public $VITDB;
    public $ETDB;
    public $LABCOMMENTS;
    public $ReasonfornoFRESHtransfer;
    public $NoofembryostransferredDay35ABC;
    public $EMBRYOSPENDING;
    public $DAYOFTRANSFER;
    public $HDsperm;
    public $Comments;
    public $scprogesterone;
    public $Naturalmicronised400mgbdduphaston10mgbd;
    public $CRINONE;
    public $progynova;
    public $Heparin;
    public $cabergolin;
    public $Antagonist;
    public $OHSS;
    public $Complications;
    public $LPbleeding;
    public $hCG;
    public $Implantationrate;
    public $Ectopic;
    public $Typeofpreg;
    public $ANC;
    public $anomalies;
    public $babywt;
    public $GAatdelivery;
    public $Pregnancyoutcome;
    public $_1stFET;
    public $AFTERHYSTEROSCOPY;
    public $AFTERERA;
    public $ERA;
    public $HRT;
    public $XGRASTPRP;
    public $EMBRYODETAILSDAY35ABC;
    public $LMWH40MG;
    public $hCG2;
    public $Implantationrate1;
    public $Ectopic1;
    public $TypeofpregA;
    public $ANC1;
    public $anomalies2;
    public $babywt2;
    public $GAatdelivery1;
    public $Pregnancyoutcome1;
    public $_2NDFET;
    public $AFTERHYSTEROSCOPY1;
    public $AFTERERA1;
    public $ERA1;
    public $HRT1;
    public $XGRASTPRP1;
    public $NUMBEROFEMBRYOS;
    public $EMBRYODETAILSDAY356ABC;
    public $INTRALIPIDANDBARGLOBIN;
    public $LMWH40MG1;
    public $hCG1;
    public $Implantationrate2;
    public $Ectopic2;
    public $Typeofpreg2;
    public $ANCA;
    public $anomalies1;
    public $babywt1;
    public $GAatdelivery2;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'view_template_for_opu';
        $this->TableName = 'view_template_for_opu';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_template_for_opu`";
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
        $this->id = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // RIDNO
        $this->RIDNO = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_RIDNO', 'RIDNO', '`RIDNO`', '`RIDNO`', 3, 11, -1, false, '`RIDNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RIDNO->Sortable = true; // Allow sort
        $this->RIDNO->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->RIDNO->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RIDNO->Param, "CustomMsg");
        $this->Fields['RIDNO'] = &$this->RIDNO;

        // Treatment
        $this->Treatment = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Treatment', 'Treatment', '`Treatment`', '`Treatment`', 200, 45, -1, false, '`Treatment`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Treatment->Sortable = true; // Allow sort
        $this->Treatment->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Treatment->Param, "CustomMsg");
        $this->Fields['Treatment'] = &$this->Treatment;

        // Origin
        $this->Origin = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Origin', 'Origin', '`Origin`', '`Origin`', 200, 45, -1, false, '`Origin`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Origin->Sortable = true; // Allow sort
        $this->Origin->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Origin->Param, "CustomMsg");
        $this->Fields['Origin'] = &$this->Origin;

        // MaleIndications
        $this->MaleIndications = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_MaleIndications', 'MaleIndications', '`MaleIndications`', '`MaleIndications`', 200, 45, -1, false, '`MaleIndications`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MaleIndications->Sortable = true; // Allow sort
        $this->MaleIndications->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MaleIndications->Param, "CustomMsg");
        $this->Fields['MaleIndications'] = &$this->MaleIndications;

        // FemaleIndications
        $this->FemaleIndications = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_FemaleIndications', 'FemaleIndications', '`FemaleIndications`', '`FemaleIndications`', 200, 45, -1, false, '`FemaleIndications`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FemaleIndications->Sortable = true; // Allow sort
        $this->FemaleIndications->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FemaleIndications->Param, "CustomMsg");
        $this->Fields['FemaleIndications'] = &$this->FemaleIndications;

        // PatientName
        $this->PatientName = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, false, '`PatientName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientName->Sortable = true; // Allow sort
        $this->PatientName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientName->Param, "CustomMsg");
        $this->Fields['PatientName'] = &$this->PatientName;

        // PatientID
        $this->PatientID = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_PatientID', 'PatientID', '`PatientID`', '`PatientID`', 200, 45, -1, false, '`PatientID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientID->Sortable = true; // Allow sort
        $this->PatientID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientID->Param, "CustomMsg");
        $this->Fields['PatientID'] = &$this->PatientID;

        // PartnerName
        $this->PartnerName = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_PartnerName', 'PartnerName', '`PartnerName`', '`PartnerName`', 200, 45, -1, false, '`PartnerName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PartnerName->Sortable = true; // Allow sort
        $this->PartnerName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PartnerName->Param, "CustomMsg");
        $this->Fields['PartnerName'] = &$this->PartnerName;

        // PartnerID
        $this->PartnerID = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_PartnerID', 'PartnerID', '`PartnerID`', '`PartnerID`', 200, 45, -1, false, '`PartnerID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PartnerID->Sortable = true; // Allow sort
        $this->PartnerID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PartnerID->Param, "CustomMsg");
        $this->Fields['PartnerID'] = &$this->PartnerID;

        // A4ICSICycle
        $this->A4ICSICycle = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_A4ICSICycle', 'A4ICSICycle', '`A4ICSICycle`', '`A4ICSICycle`', 200, 45, -1, false, '`A4ICSICycle`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->A4ICSICycle->Sortable = true; // Allow sort
        $this->A4ICSICycle->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->A4ICSICycle->Param, "CustomMsg");
        $this->Fields['A4ICSICycle'] = &$this->A4ICSICycle;

        // TotalICSICycle
        $this->TotalICSICycle = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_TotalICSICycle', 'TotalICSICycle', '`TotalICSICycle`', '`TotalICSICycle`', 200, 45, -1, false, '`TotalICSICycle`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TotalICSICycle->Sortable = true; // Allow sort
        $this->TotalICSICycle->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TotalICSICycle->Param, "CustomMsg");
        $this->Fields['TotalICSICycle'] = &$this->TotalICSICycle;

        // TypeOfInfertility
        $this->TypeOfInfertility = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_TypeOfInfertility', 'TypeOfInfertility', '`TypeOfInfertility`', '`TypeOfInfertility`', 200, 45, -1, false, '`TypeOfInfertility`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TypeOfInfertility->Sortable = true; // Allow sort
        $this->TypeOfInfertility->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TypeOfInfertility->Param, "CustomMsg");
        $this->Fields['TypeOfInfertility'] = &$this->TypeOfInfertility;

        // RelevantHistory
        $this->RelevantHistory = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_RelevantHistory', 'RelevantHistory', '`RelevantHistory`', '`RelevantHistory`', 200, 45, -1, false, '`RelevantHistory`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RelevantHistory->Sortable = true; // Allow sort
        $this->RelevantHistory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RelevantHistory->Param, "CustomMsg");
        $this->Fields['RelevantHistory'] = &$this->RelevantHistory;

        // IUICycles
        $this->IUICycles = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_IUICycles', 'IUICycles', '`IUICycles`', '`IUICycles`', 200, 45, -1, false, '`IUICycles`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IUICycles->Sortable = true; // Allow sort
        $this->IUICycles->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IUICycles->Param, "CustomMsg");
        $this->Fields['IUICycles'] = &$this->IUICycles;

        // AMH
        $this->AMH = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_AMH', 'AMH', '`AMH`', '`AMH`', 200, 45, -1, false, '`AMH`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AMH->Sortable = true; // Allow sort
        $this->AMH->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AMH->Param, "CustomMsg");
        $this->Fields['AMH'] = &$this->AMH;

        // FBMI
        $this->FBMI = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_FBMI', 'FBMI', '`FBMI`', '`FBMI`', 200, 45, -1, false, '`FBMI`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FBMI->Sortable = true; // Allow sort
        $this->FBMI->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FBMI->Param, "CustomMsg");
        $this->Fields['FBMI'] = &$this->FBMI;

        // ANTAGONISTSTARTDAY
        $this->ANTAGONISTSTARTDAY = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_ANTAGONISTSTARTDAY', 'ANTAGONISTSTARTDAY', '`ANTAGONISTSTARTDAY`', '`ANTAGONISTSTARTDAY`', 200, 45, -1, false, '`ANTAGONISTSTARTDAY`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ANTAGONISTSTARTDAY->Sortable = true; // Allow sort
        $this->ANTAGONISTSTARTDAY->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ANTAGONISTSTARTDAY->Param, "CustomMsg");
        $this->Fields['ANTAGONISTSTARTDAY'] = &$this->ANTAGONISTSTARTDAY;

        // OvarianSurgery
        $this->OvarianSurgery = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_OvarianSurgery', 'OvarianSurgery', '`OvarianSurgery`', '`OvarianSurgery`', 200, 45, -1, false, '`OvarianSurgery`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OvarianSurgery->Sortable = true; // Allow sort
        $this->OvarianSurgery->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OvarianSurgery->Param, "CustomMsg");
        $this->Fields['OvarianSurgery'] = &$this->OvarianSurgery;

        // OPUDATE
        $this->OPUDATE = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_OPUDATE', 'OPUDATE', '`OPUDATE`', CastDateFieldForLike("`OPUDATE`", 0, "DB"), 135, 19, 0, false, '`OPUDATE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OPUDATE->Sortable = true; // Allow sort
        $this->OPUDATE->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->OPUDATE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OPUDATE->Param, "CustomMsg");
        $this->Fields['OPUDATE'] = &$this->OPUDATE;

        // RFSH1
        $this->RFSH1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_RFSH1', 'RFSH1', '`RFSH1`', '`RFSH1`', 200, 45, -1, false, '`RFSH1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RFSH1->Sortable = true; // Allow sort
        $this->RFSH1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RFSH1->Param, "CustomMsg");
        $this->Fields['RFSH1'] = &$this->RFSH1;

        // RFSH2
        $this->RFSH2 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_RFSH2', 'RFSH2', '`RFSH2`', '`RFSH2`', 200, 45, -1, false, '`RFSH2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RFSH2->Sortable = true; // Allow sort
        $this->RFSH2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RFSH2->Param, "CustomMsg");
        $this->Fields['RFSH2'] = &$this->RFSH2;

        // RFSH3
        $this->RFSH3 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_RFSH3', 'RFSH3', '`RFSH3`', '`RFSH3`', 200, 45, -1, false, '`RFSH3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RFSH3->Sortable = true; // Allow sort
        $this->RFSH3->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RFSH3->Param, "CustomMsg");
        $this->Fields['RFSH3'] = &$this->RFSH3;

        // E21
        $this->E21 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_E21', 'E21', '`E21`', '`E21`', 200, 45, -1, false, '`E21`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->E21->Sortable = true; // Allow sort
        $this->E21->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->E21->Param, "CustomMsg");
        $this->Fields['E21'] = &$this->E21;

        // Hysteroscopy
        $this->Hysteroscopy = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Hysteroscopy', 'Hysteroscopy', '`Hysteroscopy`', '`Hysteroscopy`', 200, 45, -1, false, '`Hysteroscopy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Hysteroscopy->Sortable = true; // Allow sort
        $this->Hysteroscopy->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Hysteroscopy->Param, "CustomMsg");
        $this->Fields['Hysteroscopy'] = &$this->Hysteroscopy;

        // HospID
        $this->HospID = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->HospID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospID->Param, "CustomMsg");
        $this->Fields['HospID'] = &$this->HospID;

        // Fweight
        $this->Fweight = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Fweight', 'Fweight', '`Fweight`', '`Fweight`', 200, 45, -1, false, '`Fweight`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Fweight->Sortable = true; // Allow sort
        $this->Fweight->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Fweight->Param, "CustomMsg");
        $this->Fields['Fweight'] = &$this->Fweight;

        // AntiTPO
        $this->AntiTPO = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_AntiTPO', 'AntiTPO', '`AntiTPO`', '`AntiTPO`', 200, 45, -1, false, '`AntiTPO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AntiTPO->Sortable = true; // Allow sort
        $this->AntiTPO->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AntiTPO->Param, "CustomMsg");
        $this->Fields['AntiTPO'] = &$this->AntiTPO;

        // AntiTG
        $this->AntiTG = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_AntiTG', 'AntiTG', '`AntiTG`', '`AntiTG`', 200, 45, -1, false, '`AntiTG`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AntiTG->Sortable = true; // Allow sort
        $this->AntiTG->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AntiTG->Param, "CustomMsg");
        $this->Fields['AntiTG'] = &$this->AntiTG;

        // PatientAge
        $this->PatientAge = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_PatientAge', 'PatientAge', '`PatientAge`', '`PatientAge`', 200, 45, -1, false, '`PatientAge`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientAge->Sortable = true; // Allow sort
        $this->PatientAge->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientAge->Param, "CustomMsg");
        $this->Fields['PatientAge'] = &$this->PatientAge;

        // PartnerAge
        $this->PartnerAge = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_PartnerAge', 'PartnerAge', '`PartnerAge`', '`PartnerAge`', 200, 45, -1, false, '`PartnerAge`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PartnerAge->Sortable = true; // Allow sort
        $this->PartnerAge->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PartnerAge->Param, "CustomMsg");
        $this->Fields['PartnerAge'] = &$this->PartnerAge;

        // CYCLES
        $this->CYCLES = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_CYCLES', 'CYCLES', '`CYCLES`', '`CYCLES`', 201, 65530, -1, false, '`CYCLES`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->CYCLES->Nullable = false; // NOT NULL field
        $this->CYCLES->Required = true; // Required field
        $this->CYCLES->Sortable = true; // Allow sort
        $this->CYCLES->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CYCLES->Param, "CustomMsg");
        $this->Fields['CYCLES'] = &$this->CYCLES;

        // MF
        $this->MF = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_MF', 'MF', '`MF`', '`MF`', 201, 65530, -1, false, '`MF`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->MF->Nullable = false; // NOT NULL field
        $this->MF->Required = true; // Required field
        $this->MF->Sortable = true; // Allow sort
        $this->MF->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MF->Param, "CustomMsg");
        $this->Fields['MF'] = &$this->MF;

        // CauseOfINFERTILITY
        $this->CauseOfINFERTILITY = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_CauseOfINFERTILITY', 'CauseOfINFERTILITY', '`CauseOfINFERTILITY`', '`CauseOfINFERTILITY`', 201, 65530, -1, false, '`CauseOfINFERTILITY`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->CauseOfINFERTILITY->Nullable = false; // NOT NULL field
        $this->CauseOfINFERTILITY->Required = true; // Required field
        $this->CauseOfINFERTILITY->Sortable = true; // Allow sort
        $this->CauseOfINFERTILITY->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CauseOfINFERTILITY->Param, "CustomMsg");
        $this->Fields['CauseOfINFERTILITY'] = &$this->CauseOfINFERTILITY;

        // SIS
        $this->SIS = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_SIS', 'SIS', '`SIS`', '`SIS`', 201, 65530, -1, false, '`SIS`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->SIS->Nullable = false; // NOT NULL field
        $this->SIS->Required = true; // Required field
        $this->SIS->Sortable = true; // Allow sort
        $this->SIS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SIS->Param, "CustomMsg");
        $this->Fields['SIS'] = &$this->SIS;

        // Scratching
        $this->Scratching = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Scratching', 'Scratching', '`Scratching`', '`Scratching`', 201, 65530, -1, false, '`Scratching`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Scratching->Nullable = false; // NOT NULL field
        $this->Scratching->Required = true; // Required field
        $this->Scratching->Sortable = true; // Allow sort
        $this->Scratching->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Scratching->Param, "CustomMsg");
        $this->Fields['Scratching'] = &$this->Scratching;

        // Cannulation
        $this->Cannulation = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Cannulation', 'Cannulation', '`Cannulation`', '`Cannulation`', 201, 65530, -1, false, '`Cannulation`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Cannulation->Nullable = false; // NOT NULL field
        $this->Cannulation->Required = true; // Required field
        $this->Cannulation->Sortable = true; // Allow sort
        $this->Cannulation->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Cannulation->Param, "CustomMsg");
        $this->Fields['Cannulation'] = &$this->Cannulation;

        // MEPRATE
        $this->MEPRATE = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_MEPRATE', 'MEPRATE', '`MEPRATE`', '`MEPRATE`', 201, 65530, -1, false, '`MEPRATE`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->MEPRATE->Nullable = false; // NOT NULL field
        $this->MEPRATE->Required = true; // Required field
        $this->MEPRATE->Sortable = true; // Allow sort
        $this->MEPRATE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MEPRATE->Param, "CustomMsg");
        $this->Fields['MEPRATE'] = &$this->MEPRATE;

        // R.OVARY
        $this->ROVARY = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_ROVARY', 'R.OVARY', '`R.OVARY`', '`R.OVARY`', 200, 45, -1, false, '`R.OVARY`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ROVARY->Sortable = true; // Allow sort
        $this->ROVARY->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ROVARY->Param, "CustomMsg");
        $this->Fields['R.OVARY'] = &$this->ROVARY;

        // R.AFC
        $this->RAFC = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_RAFC', 'R.AFC', '`R.AFC`', '`R.AFC`', 200, 45, -1, false, '`R.AFC`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RAFC->Sortable = true; // Allow sort
        $this->RAFC->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RAFC->Param, "CustomMsg");
        $this->Fields['R.AFC'] = &$this->RAFC;

        // L.OVARY
        $this->LOVARY = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_LOVARY', 'L.OVARY', '`L.OVARY`', '`L.OVARY`', 200, 45, -1, false, '`L.OVARY`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->LOVARY->Sortable = true; // Allow sort
        $this->LOVARY->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->LOVARY->Param, "CustomMsg");
        $this->Fields['L.OVARY'] = &$this->LOVARY;

        // L.AFC
        $this->LAFC = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_LAFC', 'L.AFC', '`L.AFC`', '`L.AFC`', 200, 45, -1, false, '`L.AFC`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->LAFC->Sortable = true; // Allow sort
        $this->LAFC->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->LAFC->Param, "CustomMsg");
        $this->Fields['L.AFC'] = &$this->LAFC;

        // LH1
        $this->LH1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_LH1', 'LH1', '`LH1`', '`LH1`', 201, 65530, -1, false, '`LH1`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->LH1->Nullable = false; // NOT NULL field
        $this->LH1->Required = true; // Required field
        $this->LH1->Sortable = true; // Allow sort
        $this->LH1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->LH1->Param, "CustomMsg");
        $this->Fields['LH1'] = &$this->LH1;

        // E2
        $this->E2 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_E2', 'E2', '`E2`', '`E2`', 200, 45, -1, false, '`E2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->E2->Sortable = true; // Allow sort
        $this->E2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->E2->Param, "CustomMsg");
        $this->Fields['E2'] = &$this->E2;

        // StemCellInstallation
        $this->StemCellInstallation = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_StemCellInstallation', 'StemCellInstallation', '`StemCellInstallation`', '`StemCellInstallation`', 201, 65530, -1, false, '`StemCellInstallation`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->StemCellInstallation->Nullable = false; // NOT NULL field
        $this->StemCellInstallation->Required = true; // Required field
        $this->StemCellInstallation->Sortable = true; // Allow sort
        $this->StemCellInstallation->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->StemCellInstallation->Param, "CustomMsg");
        $this->Fields['StemCellInstallation'] = &$this->StemCellInstallation;

        // DHEAS
        $this->DHEAS = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_DHEAS', 'DHEAS', '`DHEAS`', '`DHEAS`', 201, 65530, -1, false, '`DHEAS`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->DHEAS->Nullable = false; // NOT NULL field
        $this->DHEAS->Required = true; // Required field
        $this->DHEAS->Sortable = true; // Allow sort
        $this->DHEAS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DHEAS->Param, "CustomMsg");
        $this->Fields['DHEAS'] = &$this->DHEAS;

        // Mtorr
        $this->Mtorr = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Mtorr', 'Mtorr', '`Mtorr`', '`Mtorr`', 201, 65530, -1, false, '`Mtorr`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Mtorr->Nullable = false; // NOT NULL field
        $this->Mtorr->Required = true; // Required field
        $this->Mtorr->Sortable = true; // Allow sort
        $this->Mtorr->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Mtorr->Param, "CustomMsg");
        $this->Fields['Mtorr'] = &$this->Mtorr;

        // AMH1
        $this->AMH1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_AMH1', 'AMH1', '`AMH1`', '`AMH1`', 200, 45, -1, false, '`AMH1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AMH1->Sortable = true; // Allow sort
        $this->AMH1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AMH1->Param, "CustomMsg");
        $this->Fields['AMH1'] = &$this->AMH1;

        // LH
        $this->LH = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_LH', 'LH', '`LH`', '`LH`', 201, 65530, -1, false, '`LH`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->LH->Nullable = false; // NOT NULL field
        $this->LH->Required = true; // Required field
        $this->LH->Sortable = true; // Allow sort
        $this->LH->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->LH->Param, "CustomMsg");
        $this->Fields['LH'] = &$this->LH;

        // BMI(MALE)
        $this->BMIMALE = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_BMIMALE', 'BMI(MALE)', '`BMI(MALE)`', '`BMI(MALE)`', 200, 45, -1, false, '`BMI(MALE)`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BMIMALE->Sortable = true; // Allow sort
        $this->BMIMALE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BMIMALE->Param, "CustomMsg");
        $this->Fields['BMI(MALE)'] = &$this->BMIMALE;

        // MaleMedicalConditions
        $this->MaleMedicalConditions = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_MaleMedicalConditions', 'MaleMedicalConditions', '`MaleMedicalConditions`', '`MaleMedicalConditions`', 200, 45, -1, false, '`MaleMedicalConditions`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MaleMedicalConditions->Sortable = true; // Allow sort
        $this->MaleMedicalConditions->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MaleMedicalConditions->Param, "CustomMsg");
        $this->Fields['MaleMedicalConditions'] = &$this->MaleMedicalConditions;

        // MaleExamination
        $this->MaleExamination = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_MaleExamination', 'MaleExamination', '`MaleExamination`', '`MaleExamination`', 201, 65530, -1, false, '`MaleExamination`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->MaleExamination->Nullable = false; // NOT NULL field
        $this->MaleExamination->Required = true; // Required field
        $this->MaleExamination->Sortable = true; // Allow sort
        $this->MaleExamination->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MaleExamination->Param, "CustomMsg");
        $this->Fields['MaleExamination'] = &$this->MaleExamination;

        // SpermConcentration
        $this->SpermConcentration = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_SpermConcentration', 'SpermConcentration', '`SpermConcentration`', '`SpermConcentration`', 201, 65530, -1, false, '`SpermConcentration`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->SpermConcentration->Nullable = false; // NOT NULL field
        $this->SpermConcentration->Required = true; // Required field
        $this->SpermConcentration->Sortable = true; // Allow sort
        $this->SpermConcentration->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SpermConcentration->Param, "CustomMsg");
        $this->Fields['SpermConcentration'] = &$this->SpermConcentration;

        // SpermMotility(P&NP)
        $this->SpermMotilityPNP = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_SpermMotilityPNP', 'SpermMotility(P&NP)', '`SpermMotility(P&NP)`', '`SpermMotility(P&NP)`', 201, 65530, -1, false, '`SpermMotility(P&NP)`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->SpermMotilityPNP->Nullable = false; // NOT NULL field
        $this->SpermMotilityPNP->Required = true; // Required field
        $this->SpermMotilityPNP->Sortable = true; // Allow sort
        $this->SpermMotilityPNP->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SpermMotilityPNP->Param, "CustomMsg");
        $this->Fields['SpermMotility(P&NP)'] = &$this->SpermMotilityPNP;

        // SpermMorphology
        $this->SpermMorphology = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_SpermMorphology', 'SpermMorphology', '`SpermMorphology`', '`SpermMorphology`', 201, 65530, -1, false, '`SpermMorphology`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->SpermMorphology->Nullable = false; // NOT NULL field
        $this->SpermMorphology->Required = true; // Required field
        $this->SpermMorphology->Sortable = true; // Allow sort
        $this->SpermMorphology->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SpermMorphology->Param, "CustomMsg");
        $this->Fields['SpermMorphology'] = &$this->SpermMorphology;

        // SpermRetrival
        $this->SpermRetrival = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_SpermRetrival', 'SpermRetrival', '`SpermRetrival`', '`SpermRetrival`', 201, 65530, -1, false, '`SpermRetrival`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->SpermRetrival->Nullable = false; // NOT NULL field
        $this->SpermRetrival->Required = true; // Required field
        $this->SpermRetrival->Sortable = true; // Allow sort
        $this->SpermRetrival->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SpermRetrival->Param, "CustomMsg");
        $this->Fields['SpermRetrival'] = &$this->SpermRetrival;

        // M.Testosterone
        $this->MTestosterone = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_MTestosterone', 'M.Testosterone', '`M.Testosterone`', '`M.Testosterone`', 201, 65530, -1, false, '`M.Testosterone`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->MTestosterone->Nullable = false; // NOT NULL field
        $this->MTestosterone->Required = true; // Required field
        $this->MTestosterone->Sortable = true; // Allow sort
        $this->MTestosterone->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MTestosterone->Param, "CustomMsg");
        $this->Fields['M.Testosterone'] = &$this->MTestosterone;

        // DFI
        $this->DFI = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_DFI', 'DFI', '`DFI`', '`DFI`', 201, 65530, -1, false, '`DFI`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->DFI->Nullable = false; // NOT NULL field
        $this->DFI->Required = true; // Required field
        $this->DFI->Sortable = true; // Allow sort
        $this->DFI->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DFI->Param, "CustomMsg");
        $this->Fields['DFI'] = &$this->DFI;

        // PreRX
        $this->PreRX = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_PreRX', 'PreRX', '`PreRX`', '`PreRX`', 201, 65530, -1, false, '`PreRX`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->PreRX->Nullable = false; // NOT NULL field
        $this->PreRX->Required = true; // Required field
        $this->PreRX->Sortable = true; // Allow sort
        $this->PreRX->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PreRX->Param, "CustomMsg");
        $this->Fields['PreRX'] = &$this->PreRX;

        // CC 100
        $this->CC100 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_CC100', 'CC 100', '`CC 100`', '`CC 100`', 200, 45, -1, false, '`CC 100`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CC100->Sortable = true; // Allow sort
        $this->CC100->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CC100->Param, "CustomMsg");
        $this->Fields['CC 100'] = &$this->CC100;

        // RFSH1A
        $this->RFSH1A = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_RFSH1A', 'RFSH1A', '`RFSH1A`', '`RFSH1A`', 200, 45, -1, false, '`RFSH1A`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RFSH1A->Sortable = true; // Allow sort
        $this->RFSH1A->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RFSH1A->Param, "CustomMsg");
        $this->Fields['RFSH1A'] = &$this->RFSH1A;

        // HMG1
        $this->HMG1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_HMG1', 'HMG1', '`HMG1`', '`HMG1`', 200, 45, -1, false, '`HMG1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HMG1->Sortable = true; // Allow sort
        $this->HMG1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HMG1->Param, "CustomMsg");
        $this->Fields['HMG1'] = &$this->HMG1;

        // RLH
        $this->RLH = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_RLH', 'RLH', '`RLH`', '`RLH`', 201, 65530, -1, false, '`RLH`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->RLH->Nullable = false; // NOT NULL field
        $this->RLH->Required = true; // Required field
        $this->RLH->Sortable = true; // Allow sort
        $this->RLH->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RLH->Param, "CustomMsg");
        $this->Fields['RLH'] = &$this->RLH;

        // HMG_HP
        $this->HMG_HP = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_HMG_HP', 'HMG_HP', '`HMG_HP`', '`HMG_HP`', 201, 65530, -1, false, '`HMG_HP`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->HMG_HP->Nullable = false; // NOT NULL field
        $this->HMG_HP->Required = true; // Required field
        $this->HMG_HP->Sortable = true; // Allow sort
        $this->HMG_HP->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HMG_HP->Param, "CustomMsg");
        $this->Fields['HMG_HP'] = &$this->HMG_HP;

        // day_of_HMG
        $this->day_of_HMG = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_day_of_HMG', 'day_of_HMG', '`day_of_HMG`', '`day_of_HMG`', 201, 65530, -1, false, '`day_of_HMG`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->day_of_HMG->Nullable = false; // NOT NULL field
        $this->day_of_HMG->Required = true; // Required field
        $this->day_of_HMG->Sortable = true; // Allow sort
        $this->day_of_HMG->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->day_of_HMG->Param, "CustomMsg");
        $this->Fields['day_of_HMG'] = &$this->day_of_HMG;

        // Reason_for_HMG
        $this->Reason_for_HMG = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Reason_for_HMG', 'Reason_for_HMG', '`Reason_for_HMG`', '`Reason_for_HMG`', 201, 65530, -1, false, '`Reason_for_HMG`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Reason_for_HMG->Nullable = false; // NOT NULL field
        $this->Reason_for_HMG->Required = true; // Required field
        $this->Reason_for_HMG->Sortable = true; // Allow sort
        $this->Reason_for_HMG->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Reason_for_HMG->Param, "CustomMsg");
        $this->Fields['Reason_for_HMG'] = &$this->Reason_for_HMG;

        // RLH_day
        $this->RLH_day = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_RLH_day', 'RLH_day', '`RLH_day`', '`RLH_day`', 201, 65530, -1, false, '`RLH_day`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->RLH_day->Nullable = false; // NOT NULL field
        $this->RLH_day->Required = true; // Required field
        $this->RLH_day->Sortable = true; // Allow sort
        $this->RLH_day->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RLH_day->Param, "CustomMsg");
        $this->Fields['RLH_day'] = &$this->RLH_day;

        // DAYSOFSTIMULATION
        $this->DAYSOFSTIMULATION = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_DAYSOFSTIMULATION', 'DAYSOFSTIMULATION', '`DAYSOFSTIMULATION`', '`DAYSOFSTIMULATION`', 200, 45, -1, false, '`DAYSOFSTIMULATION`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DAYSOFSTIMULATION->Sortable = true; // Allow sort
        $this->DAYSOFSTIMULATION->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DAYSOFSTIMULATION->Param, "CustomMsg");
        $this->Fields['DAYSOFSTIMULATION'] = &$this->DAYSOFSTIMULATION;

        // Any change inbetween ( Dose added , day)
        $this->AnychangeinbetweenDoseaddedday = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_AnychangeinbetweenDoseaddedday', 'Any change inbetween ( Dose added , day)', '`Any change inbetween ( Dose added , day)`', '`Any change inbetween ( Dose added , day)`', 201, 65530, -1, false, '`Any change inbetween ( Dose added , day)`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->AnychangeinbetweenDoseaddedday->Nullable = false; // NOT NULL field
        $this->AnychangeinbetweenDoseaddedday->Required = true; // Required field
        $this->AnychangeinbetweenDoseaddedday->Sortable = true; // Allow sort
        $this->AnychangeinbetweenDoseaddedday->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AnychangeinbetweenDoseaddedday->Param, "CustomMsg");
        $this->Fields['Any change inbetween ( Dose added , day)'] = &$this->AnychangeinbetweenDoseaddedday;

        // day of Anta
        $this->dayofAnta = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_dayofAnta', 'day of Anta', '`day of Anta`', '`day of Anta`', 201, 65530, -1, false, '`day of Anta`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->dayofAnta->Nullable = false; // NOT NULL field
        $this->dayofAnta->Required = true; // Required field
        $this->dayofAnta->Sortable = true; // Allow sort
        $this->dayofAnta->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->dayofAnta->Param, "CustomMsg");
        $this->Fields['day of Anta'] = &$this->dayofAnta;

        // R FSH TD
        $this->RFSHTD = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_RFSHTD', 'R FSH TD', '`R FSH TD`', '`R FSH TD`', 201, 65530, -1, false, '`R FSH TD`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->RFSHTD->Nullable = false; // NOT NULL field
        $this->RFSHTD->Required = true; // Required field
        $this->RFSHTD->Sortable = true; // Allow sort
        $this->RFSHTD->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RFSHTD->Param, "CustomMsg");
        $this->Fields['R FSH TD'] = &$this->RFSHTD;

        // R FSH + HMG TD
        $this->RFSHHMGTD = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_RFSHHMGTD', 'R FSH + HMG TD', '`R FSH + HMG TD`', '`R FSH + HMG TD`', 201, 65530, -1, false, '`R FSH + HMG TD`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->RFSHHMGTD->Nullable = false; // NOT NULL field
        $this->RFSHHMGTD->Required = true; // Required field
        $this->RFSHHMGTD->Sortable = true; // Allow sort
        $this->RFSHHMGTD->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RFSHHMGTD->Param, "CustomMsg");
        $this->Fields['R FSH + HMG TD'] = &$this->RFSHHMGTD;

        // R FSH + R LH TD
        $this->RFSHRLHTD = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_RFSHRLHTD', 'R FSH + R LH TD', '`R FSH + R LH TD`', '`R FSH + R LH TD`', 201, 65530, -1, false, '`R FSH + R LH TD`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->RFSHRLHTD->Nullable = false; // NOT NULL field
        $this->RFSHRLHTD->Required = true; // Required field
        $this->RFSHRLHTD->Sortable = true; // Allow sort
        $this->RFSHRLHTD->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RFSHRLHTD->Param, "CustomMsg");
        $this->Fields['R FSH + R LH TD'] = &$this->RFSHRLHTD;

        // HMG TD
        $this->HMGTD = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_HMGTD', 'HMG TD', '`HMG TD`', '`HMG TD`', 201, 65530, -1, false, '`HMG TD`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->HMGTD->Nullable = false; // NOT NULL field
        $this->HMGTD->Required = true; // Required field
        $this->HMGTD->Sortable = true; // Allow sort
        $this->HMGTD->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HMGTD->Param, "CustomMsg");
        $this->Fields['HMG TD'] = &$this->HMGTD;

        // LH TD
        $this->LHTD = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_LHTD', 'LH TD', '`LH TD`', '`LH TD`', 201, 65530, -1, false, '`LH TD`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->LHTD->Nullable = false; // NOT NULL field
        $this->LHTD->Required = true; // Required field
        $this->LHTD->Sortable = true; // Allow sort
        $this->LHTD->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->LHTD->Param, "CustomMsg");
        $this->Fields['LH TD'] = &$this->LHTD;

        // D1 LH
        $this->D1LH = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_D1LH', 'D1 LH', '`D1 LH`', '`D1 LH`', 201, 65530, -1, false, '`D1 LH`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->D1LH->Nullable = false; // NOT NULL field
        $this->D1LH->Required = true; // Required field
        $this->D1LH->Sortable = true; // Allow sort
        $this->D1LH->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->D1LH->Param, "CustomMsg");
        $this->Fields['D1 LH'] = &$this->D1LH;

        // D1 E2
        $this->D1E2 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_D1E2', 'D1 E2', '`D1 E2`', '`D1 E2`', 201, 65530, -1, false, '`D1 E2`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->D1E2->Nullable = false; // NOT NULL field
        $this->D1E2->Required = true; // Required field
        $this->D1E2->Sortable = true; // Allow sort
        $this->D1E2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->D1E2->Param, "CustomMsg");
        $this->Fields['D1 E2'] = &$this->D1E2;

        // Trigger day E2
        $this->TriggerdayE2 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_TriggerdayE2', 'Trigger day E2', '`Trigger day E2`', '`Trigger day E2`', 201, 65530, -1, false, '`Trigger day E2`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->TriggerdayE2->Nullable = false; // NOT NULL field
        $this->TriggerdayE2->Required = true; // Required field
        $this->TriggerdayE2->Sortable = true; // Allow sort
        $this->TriggerdayE2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TriggerdayE2->Param, "CustomMsg");
        $this->Fields['Trigger day E2'] = &$this->TriggerdayE2;

        // Trigger day P4
        $this->TriggerdayP4 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_TriggerdayP4', 'Trigger day P4', '`Trigger day P4`', '`Trigger day P4`', 201, 65530, -1, false, '`Trigger day P4`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->TriggerdayP4->Nullable = false; // NOT NULL field
        $this->TriggerdayP4->Required = true; // Required field
        $this->TriggerdayP4->Sortable = true; // Allow sort
        $this->TriggerdayP4->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TriggerdayP4->Param, "CustomMsg");
        $this->Fields['Trigger day P4'] = &$this->TriggerdayP4;

        // Trigger day LH
        $this->TriggerdayLH = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_TriggerdayLH', 'Trigger day LH', '`Trigger day LH`', '`Trigger day LH`', 201, 65530, -1, false, '`Trigger day LH`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->TriggerdayLH->Nullable = false; // NOT NULL field
        $this->TriggerdayLH->Required = true; // Required field
        $this->TriggerdayLH->Sortable = true; // Allow sort
        $this->TriggerdayLH->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TriggerdayLH->Param, "CustomMsg");
        $this->Fields['Trigger day LH'] = &$this->TriggerdayLH;

        // VIT-D
        $this->VITD = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_VITD', 'VIT-D', '`VIT-D`', '`VIT-D`', 201, 65530, -1, false, '`VIT-D`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->VITD->Nullable = false; // NOT NULL field
        $this->VITD->Required = true; // Required field
        $this->VITD->Sortable = true; // Allow sort
        $this->VITD->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->VITD->Param, "CustomMsg");
        $this->Fields['VIT-D'] = &$this->VITD;

        // TRIGGERR
        $this->TRIGGERR = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_TRIGGERR', 'TRIGGERR', '`TRIGGERR`', '`TRIGGERR`', 200, 200, -1, false, '`TRIGGERR`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TRIGGERR->Sortable = true; // Allow sort
        $this->TRIGGERR->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TRIGGERR->Param, "CustomMsg");
        $this->Fields['TRIGGERR'] = &$this->TRIGGERR;

        // BHCG BEFORE RETRIEVAL
        $this->BHCGBEFORERETRIEVAL = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_BHCGBEFORERETRIEVAL', 'BHCG BEFORE RETRIEVAL', '`BHCG BEFORE RETRIEVAL`', '`BHCG BEFORE RETRIEVAL`', 201, 65530, -1, false, '`BHCG BEFORE RETRIEVAL`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->BHCGBEFORERETRIEVAL->Nullable = false; // NOT NULL field
        $this->BHCGBEFORERETRIEVAL->Required = true; // Required field
        $this->BHCGBEFORERETRIEVAL->Sortable = true; // Allow sort
        $this->BHCGBEFORERETRIEVAL->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BHCGBEFORERETRIEVAL->Param, "CustomMsg");
        $this->Fields['BHCG BEFORE RETRIEVAL'] = &$this->BHCGBEFORERETRIEVAL;

        // LH -12 HRS
        $this->LH12HRS = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_LH12HRS', 'LH -12 HRS', '`LH -12 HRS`', '`LH -12 HRS`', 201, 65530, -1, false, '`LH -12 HRS`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->LH12HRS->Nullable = false; // NOT NULL field
        $this->LH12HRS->Required = true; // Required field
        $this->LH12HRS->Sortable = true; // Allow sort
        $this->LH12HRS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->LH12HRS->Param, "CustomMsg");
        $this->Fields['LH -12 HRS'] = &$this->LH12HRS;

        // P4 -12 HRS
        $this->P412HRS = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_P412HRS', 'P4 -12 HRS', '`P4 -12 HRS`', '`P4 -12 HRS`', 201, 65530, -1, false, '`P4 -12 HRS`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->P412HRS->Nullable = false; // NOT NULL field
        $this->P412HRS->Required = true; // Required field
        $this->P412HRS->Sortable = true; // Allow sort
        $this->P412HRS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->P412HRS->Param, "CustomMsg");
        $this->Fields['P4 -12 HRS'] = &$this->P412HRS;

        // ET on hCG day
        $this->ETonhCGday = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_ETonhCGday', 'ET on hCG day', '`ET on hCG day`', '`ET on hCG day`', 201, 65530, -1, false, '`ET on hCG day`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->ETonhCGday->Nullable = false; // NOT NULL field
        $this->ETonhCGday->Required = true; // Required field
        $this->ETonhCGday->Sortable = true; // Allow sort
        $this->ETonhCGday->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ETonhCGday->Param, "CustomMsg");
        $this->Fields['ET on hCG day'] = &$this->ETonhCGday;

        // ET doppler
        $this->ETdoppler = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_ETdoppler', 'ET doppler', '`ET doppler`', '`ET doppler`', 201, 65530, -1, false, '`ET doppler`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->ETdoppler->Nullable = false; // NOT NULL field
        $this->ETdoppler->Required = true; // Required field
        $this->ETdoppler->Sortable = true; // Allow sort
        $this->ETdoppler->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ETdoppler->Param, "CustomMsg");
        $this->Fields['ET doppler'] = &$this->ETdoppler;

        // VI/FI/VFI
        $this->VIFIVFI = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_VIFIVFI', 'VI/FI/VFI', '`VI/FI/VFI`', '`VI/FI/VFI`', 201, 65530, -1, false, '`VI/FI/VFI`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->VIFIVFI->Nullable = false; // NOT NULL field
        $this->VIFIVFI->Required = true; // Required field
        $this->VIFIVFI->Sortable = true; // Allow sort
        $this->VIFIVFI->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->VIFIVFI->Param, "CustomMsg");
        $this->Fields['VI/FI/VFI'] = &$this->VIFIVFI;

        // Endometrial abnormality
        $this->Endometrialabnormality = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Endometrialabnormality', 'Endometrial abnormality', '`Endometrial abnormality`', '`Endometrial abnormality`', 201, 65530, -1, false, '`Endometrial abnormality`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Endometrialabnormality->Nullable = false; // NOT NULL field
        $this->Endometrialabnormality->Required = true; // Required field
        $this->Endometrialabnormality->Sortable = true; // Allow sort
        $this->Endometrialabnormality->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Endometrialabnormality->Param, "CustomMsg");
        $this->Fields['Endometrial abnormality'] = &$this->Endometrialabnormality;

        // AFC ON S1
        $this->AFCONS1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_AFCONS1', 'AFC ON S1', '`AFC ON S1`', '`AFC ON S1`', 201, 65530, -1, false, '`AFC ON S1`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->AFCONS1->Nullable = false; // NOT NULL field
        $this->AFCONS1->Required = true; // Required field
        $this->AFCONS1->Sortable = true; // Allow sort
        $this->AFCONS1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AFCONS1->Param, "CustomMsg");
        $this->Fields['AFC ON S1'] = &$this->AFCONS1;

        // TIME OF OPU FROM TRIGGER
        $this->TIMEOFOPUFROMTRIGGER = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_TIMEOFOPUFROMTRIGGER', 'TIME OF OPU FROM TRIGGER', '`TIME OF OPU FROM TRIGGER`', '`TIME OF OPU FROM TRIGGER`', 201, 65530, -1, false, '`TIME OF OPU FROM TRIGGER`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->TIMEOFOPUFROMTRIGGER->Nullable = false; // NOT NULL field
        $this->TIMEOFOPUFROMTRIGGER->Required = true; // Required field
        $this->TIMEOFOPUFROMTRIGGER->Sortable = true; // Allow sort
        $this->TIMEOFOPUFROMTRIGGER->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TIMEOFOPUFROMTRIGGER->Param, "CustomMsg");
        $this->Fields['TIME OF OPU FROM TRIGGER'] = &$this->TIMEOFOPUFROMTRIGGER;

        // SPERM TYPE
        $this->SPERMTYPE = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_SPERMTYPE', 'SPERM TYPE', '`SPERM TYPE`', '`SPERM TYPE`', 201, 65530, -1, false, '`SPERM TYPE`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->SPERMTYPE->Nullable = false; // NOT NULL field
        $this->SPERMTYPE->Required = true; // Required field
        $this->SPERMTYPE->Sortable = true; // Allow sort
        $this->SPERMTYPE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SPERMTYPE->Param, "CustomMsg");
        $this->Fields['SPERM TYPE'] = &$this->SPERMTYPE;

        // EXPECTED ON TRIGGER DAY
        $this->EXPECTEDONTRIGGERDAY = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_EXPECTEDONTRIGGERDAY', 'EXPECTED ON TRIGGER DAY', '`EXPECTED ON TRIGGER DAY`', '`EXPECTED ON TRIGGER DAY`', 201, 65530, -1, false, '`EXPECTED ON TRIGGER DAY`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->EXPECTEDONTRIGGERDAY->Nullable = false; // NOT NULL field
        $this->EXPECTEDONTRIGGERDAY->Required = true; // Required field
        $this->EXPECTEDONTRIGGERDAY->Sortable = true; // Allow sort
        $this->EXPECTEDONTRIGGERDAY->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EXPECTEDONTRIGGERDAY->Param, "CustomMsg");
        $this->Fields['EXPECTED ON TRIGGER DAY'] = &$this->EXPECTEDONTRIGGERDAY;

        // OOCYTES RETRIEVED
        $this->OOCYTESRETRIEVED = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_OOCYTESRETRIEVED', 'OOCYTES RETRIEVED', '`OOCYTES RETRIEVED`', '`OOCYTES RETRIEVED`', 201, 65530, -1, false, '`OOCYTES RETRIEVED`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->OOCYTESRETRIEVED->Nullable = false; // NOT NULL field
        $this->OOCYTESRETRIEVED->Required = true; // Required field
        $this->OOCYTESRETRIEVED->Sortable = true; // Allow sort
        $this->OOCYTESRETRIEVED->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OOCYTESRETRIEVED->Param, "CustomMsg");
        $this->Fields['OOCYTES RETRIEVED'] = &$this->OOCYTESRETRIEVED;

        // TIME OF DENUDATION
        $this->TIMEOFDENUDATION = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_TIMEOFDENUDATION', 'TIME OF DENUDATION', '`TIME OF DENUDATION`', '`TIME OF DENUDATION`', 201, 65530, -1, false, '`TIME OF DENUDATION`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->TIMEOFDENUDATION->Nullable = false; // NOT NULL field
        $this->TIMEOFDENUDATION->Required = true; // Required field
        $this->TIMEOFDENUDATION->Sortable = true; // Allow sort
        $this->TIMEOFDENUDATION->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TIMEOFDENUDATION->Param, "CustomMsg");
        $this->Fields['TIME OF DENUDATION'] = &$this->TIMEOFDENUDATION;

        // M-II
        $this->MII = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_MII', 'M-II', '`M-II`', '`M-II`', 201, 65530, -1, false, '`M-II`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->MII->Nullable = false; // NOT NULL field
        $this->MII->Required = true; // Required field
        $this->MII->Sortable = true; // Allow sort
        $this->MII->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MII->Param, "CustomMsg");
        $this->Fields['M-II'] = &$this->MII;

        // MI
        $this->MI = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_MI', 'MI', '`MI`', '`MI`', 201, 65530, -1, false, '`MI`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->MI->Nullable = false; // NOT NULL field
        $this->MI->Required = true; // Required field
        $this->MI->Sortable = true; // Allow sort
        $this->MI->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MI->Param, "CustomMsg");
        $this->Fields['MI'] = &$this->MI;

        // GV
        $this->GV = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_GV', 'GV', '`GV`', '`GV`', 201, 65530, -1, false, '`GV`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->GV->Nullable = false; // NOT NULL field
        $this->GV->Required = true; // Required field
        $this->GV->Sortable = true; // Allow sort
        $this->GV->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GV->Param, "CustomMsg");
        $this->Fields['GV'] = &$this->GV;

        // ICSI TIME FORM OPU
        $this->ICSITIMEFORMOPU = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_ICSITIMEFORMOPU', 'ICSI TIME FORM OPU', '`ICSI TIME FORM OPU`', '`ICSI TIME FORM OPU`', 201, 65530, -1, false, '`ICSI TIME FORM OPU`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->ICSITIMEFORMOPU->Nullable = false; // NOT NULL field
        $this->ICSITIMEFORMOPU->Required = true; // Required field
        $this->ICSITIMEFORMOPU->Sortable = true; // Allow sort
        $this->ICSITIMEFORMOPU->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ICSITIMEFORMOPU->Param, "CustomMsg");
        $this->Fields['ICSI TIME FORM OPU'] = &$this->ICSITIMEFORMOPU;

        // FERT ( 2 PN )
        $this->FERT2PN = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_FERT2PN', 'FERT ( 2 PN )', '`FERT ( 2 PN )`', '`FERT ( 2 PN )`', 201, 65530, -1, false, '`FERT ( 2 PN )`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->FERT2PN->Nullable = false; // NOT NULL field
        $this->FERT2PN->Required = true; // Required field
        $this->FERT2PN->Sortable = true; // Allow sort
        $this->FERT2PN->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FERT2PN->Param, "CustomMsg");
        $this->Fields['FERT ( 2 PN )'] = &$this->FERT2PN;

        // DEG
        $this->DEG = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_DEG', 'DEG', '`DEG`', '`DEG`', 201, 65530, -1, false, '`DEG`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->DEG->Nullable = false; // NOT NULL field
        $this->DEG->Required = true; // Required field
        $this->DEG->Sortable = true; // Allow sort
        $this->DEG->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DEG->Param, "CustomMsg");
        $this->Fields['DEG'] = &$this->DEG;

        // D3 GRADE A
        $this->D3GRADEA = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_D3GRADEA', 'D3 GRADE A', '`D3 GRADE A`', '`D3 GRADE A`', 201, 65530, -1, false, '`D3 GRADE A`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->D3GRADEA->Nullable = false; // NOT NULL field
        $this->D3GRADEA->Required = true; // Required field
        $this->D3GRADEA->Sortable = true; // Allow sort
        $this->D3GRADEA->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->D3GRADEA->Param, "CustomMsg");
        $this->Fields['D3 GRADE A'] = &$this->D3GRADEA;

        // D3 GRADE B
        $this->D3GRADEB = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_D3GRADEB', 'D3 GRADE B', '`D3 GRADE B`', '`D3 GRADE B`', 201, 65530, -1, false, '`D3 GRADE B`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->D3GRADEB->Nullable = false; // NOT NULL field
        $this->D3GRADEB->Required = true; // Required field
        $this->D3GRADEB->Sortable = true; // Allow sort
        $this->D3GRADEB->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->D3GRADEB->Param, "CustomMsg");
        $this->Fields['D3 GRADE B'] = &$this->D3GRADEB;

        // D3 GRADE C
        $this->D3GRADEC = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_D3GRADEC', 'D3 GRADE C', '`D3 GRADE C`', '`D3 GRADE C`', 201, 65530, -1, false, '`D3 GRADE C`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->D3GRADEC->Nullable = false; // NOT NULL field
        $this->D3GRADEC->Required = true; // Required field
        $this->D3GRADEC->Sortable = true; // Allow sort
        $this->D3GRADEC->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->D3GRADEC->Param, "CustomMsg");
        $this->Fields['D3 GRADE C'] = &$this->D3GRADEC;

        // D3 GRADE D
        $this->D3GRADED = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_D3GRADED', 'D3 GRADE D', '`D3 GRADE D`', '`D3 GRADE D`', 201, 65530, -1, false, '`D3 GRADE D`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->D3GRADED->Nullable = false; // NOT NULL field
        $this->D3GRADED->Required = true; // Required field
        $this->D3GRADED->Sortable = true; // Allow sort
        $this->D3GRADED->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->D3GRADED->Param, "CustomMsg");
        $this->Fields['D3 GRADE D'] = &$this->D3GRADED;

        // USABLE ON DAY 3 ET
        $this->USABLEONDAY3ET = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_USABLEONDAY3ET', 'USABLE ON DAY 3 ET', '`USABLE ON DAY 3 ET`', '`USABLE ON DAY 3 ET`', 201, 65530, -1, false, '`USABLE ON DAY 3 ET`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->USABLEONDAY3ET->Nullable = false; // NOT NULL field
        $this->USABLEONDAY3ET->Required = true; // Required field
        $this->USABLEONDAY3ET->Sortable = true; // Allow sort
        $this->USABLEONDAY3ET->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USABLEONDAY3ET->Param, "CustomMsg");
        $this->Fields['USABLE ON DAY 3 ET'] = &$this->USABLEONDAY3ET;

        // USABLE ON day 3 FREEZING
        $this->USABLEONday3FREEZING = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_USABLEONday3FREEZING', 'USABLE ON day 3 FREEZING', '`USABLE ON day 3 FREEZING`', '`USABLE ON day 3 FREEZING`', 201, 65530, -1, false, '`USABLE ON day 3 FREEZING`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->USABLEONday3FREEZING->Nullable = false; // NOT NULL field
        $this->USABLEONday3FREEZING->Required = true; // Required field
        $this->USABLEONday3FREEZING->Sortable = true; // Allow sort
        $this->USABLEONday3FREEZING->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USABLEONday3FREEZING->Param, "CustomMsg");
        $this->Fields['USABLE ON day 3 FREEZING'] = &$this->USABLEONday3FREEZING;

        // D5 GARDE A
        $this->D5GARDEA = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_D5GARDEA', 'D5 GARDE A', '`D5 GARDE A`', '`D5 GARDE A`', 201, 65530, -1, false, '`D5 GARDE A`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->D5GARDEA->Nullable = false; // NOT NULL field
        $this->D5GARDEA->Required = true; // Required field
        $this->D5GARDEA->Sortable = true; // Allow sort
        $this->D5GARDEA->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->D5GARDEA->Param, "CustomMsg");
        $this->Fields['D5 GARDE A'] = &$this->D5GARDEA;

        // D5 GRADE B
        $this->D5GRADEB = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_D5GRADEB', 'D5 GRADE B', '`D5 GRADE B`', '`D5 GRADE B`', 201, 65530, -1, false, '`D5 GRADE B`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->D5GRADEB->Nullable = false; // NOT NULL field
        $this->D5GRADEB->Required = true; // Required field
        $this->D5GRADEB->Sortable = true; // Allow sort
        $this->D5GRADEB->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->D5GRADEB->Param, "CustomMsg");
        $this->Fields['D5 GRADE B'] = &$this->D5GRADEB;

        // D5 GRADE C
        $this->D5GRADEC = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_D5GRADEC', 'D5 GRADE C', '`D5 GRADE C`', '`D5 GRADE C`', 201, 65530, -1, false, '`D5 GRADE C`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->D5GRADEC->Nullable = false; // NOT NULL field
        $this->D5GRADEC->Required = true; // Required field
        $this->D5GRADEC->Sortable = true; // Allow sort
        $this->D5GRADEC->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->D5GRADEC->Param, "CustomMsg");
        $this->Fields['D5 GRADE C'] = &$this->D5GRADEC;

        // D5 GRADE D
        $this->D5GRADED = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_D5GRADED', 'D5 GRADE D', '`D5 GRADE D`', '`D5 GRADE D`', 201, 65530, -1, false, '`D5 GRADE D`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->D5GRADED->Nullable = false; // NOT NULL field
        $this->D5GRADED->Required = true; // Required field
        $this->D5GRADED->Sortable = true; // Allow sort
        $this->D5GRADED->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->D5GRADED->Param, "CustomMsg");
        $this->Fields['D5 GRADE D'] = &$this->D5GRADED;

        // USABLE ON D5 ET
        $this->USABLEOND5ET = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_USABLEOND5ET', 'USABLE ON D5 ET', '`USABLE ON D5 ET`', '`USABLE ON D5 ET`', 201, 65530, -1, false, '`USABLE ON D5 ET`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->USABLEOND5ET->Nullable = false; // NOT NULL field
        $this->USABLEOND5ET->Required = true; // Required field
        $this->USABLEOND5ET->Sortable = true; // Allow sort
        $this->USABLEOND5ET->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USABLEOND5ET->Param, "CustomMsg");
        $this->Fields['USABLE ON D5 ET'] = &$this->USABLEOND5ET;

        // USABLE ON D5 FREEZING
        $this->USABLEOND5FREEZING = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_USABLEOND5FREEZING', 'USABLE ON D5 FREEZING', '`USABLE ON D5 FREEZING`', '`USABLE ON D5 FREEZING`', 201, 65530, -1, false, '`USABLE ON D5 FREEZING`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->USABLEOND5FREEZING->Nullable = false; // NOT NULL field
        $this->USABLEOND5FREEZING->Required = true; // Required field
        $this->USABLEOND5FREEZING->Sortable = true; // Allow sort
        $this->USABLEOND5FREEZING->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->USABLEOND5FREEZING->Param, "CustomMsg");
        $this->Fields['USABLE ON D5 FREEZING'] = &$this->USABLEOND5FREEZING;

        // D6 GRADE A
        $this->D6GRADEA = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_D6GRADEA', 'D6 GRADE A', '`D6 GRADE A`', '`D6 GRADE A`', 201, 65530, -1, false, '`D6 GRADE A`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->D6GRADEA->Nullable = false; // NOT NULL field
        $this->D6GRADEA->Required = true; // Required field
        $this->D6GRADEA->Sortable = true; // Allow sort
        $this->D6GRADEA->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->D6GRADEA->Param, "CustomMsg");
        $this->Fields['D6 GRADE A'] = &$this->D6GRADEA;

        // D6 GRADE B
        $this->D6GRADEB = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_D6GRADEB', 'D6 GRADE B', '`D6 GRADE B`', '`D6 GRADE B`', 201, 65530, -1, false, '`D6 GRADE B`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->D6GRADEB->Nullable = false; // NOT NULL field
        $this->D6GRADEB->Required = true; // Required field
        $this->D6GRADEB->Sortable = true; // Allow sort
        $this->D6GRADEB->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->D6GRADEB->Param, "CustomMsg");
        $this->Fields['D6 GRADE B'] = &$this->D6GRADEB;

        // D6 GRADE C
        $this->D6GRADEC = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_D6GRADEC', 'D6 GRADE C', '`D6 GRADE C`', '`D6 GRADE C`', 201, 65530, -1, false, '`D6 GRADE C`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->D6GRADEC->Nullable = false; // NOT NULL field
        $this->D6GRADEC->Required = true; // Required field
        $this->D6GRADEC->Sortable = true; // Allow sort
        $this->D6GRADEC->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->D6GRADEC->Param, "CustomMsg");
        $this->Fields['D6 GRADE C'] = &$this->D6GRADEC;

        // D6 GRADE D
        $this->D6GRADED = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_D6GRADED', 'D6 GRADE D', '`D6 GRADE D`', '`D6 GRADE D`', 201, 65530, -1, false, '`D6 GRADE D`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->D6GRADED->Nullable = false; // NOT NULL field
        $this->D6GRADED->Required = true; // Required field
        $this->D6GRADED->Sortable = true; // Allow sort
        $this->D6GRADED->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->D6GRADED->Param, "CustomMsg");
        $this->Fields['D6 GRADE D'] = &$this->D6GRADED;

        // D6 USABLE EMBRYO ET
        $this->D6USABLEEMBRYOET = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_D6USABLEEMBRYOET', 'D6 USABLE EMBRYO ET', '`D6 USABLE EMBRYO ET`', '`D6 USABLE EMBRYO ET`', 201, 65530, -1, false, '`D6 USABLE EMBRYO ET`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->D6USABLEEMBRYOET->Nullable = false; // NOT NULL field
        $this->D6USABLEEMBRYOET->Required = true; // Required field
        $this->D6USABLEEMBRYOET->Sortable = true; // Allow sort
        $this->D6USABLEEMBRYOET->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->D6USABLEEMBRYOET->Param, "CustomMsg");
        $this->Fields['D6 USABLE EMBRYO ET'] = &$this->D6USABLEEMBRYOET;

        // D6 USABLE FREEZING
        $this->D6USABLEFREEZING = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_D6USABLEFREEZING', 'D6 USABLE FREEZING', '`D6 USABLE FREEZING`', '`D6 USABLE FREEZING`', 201, 65530, -1, false, '`D6 USABLE FREEZING`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->D6USABLEFREEZING->Nullable = false; // NOT NULL field
        $this->D6USABLEFREEZING->Required = true; // Required field
        $this->D6USABLEFREEZING->Sortable = true; // Allow sort
        $this->D6USABLEFREEZING->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->D6USABLEFREEZING->Param, "CustomMsg");
        $this->Fields['D6 USABLE FREEZING'] = &$this->D6USABLEFREEZING;

        // TOTAL BLAST
        $this->TOTALBLAST = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_TOTALBLAST', 'TOTAL BLAST', '`TOTAL BLAST`', '`TOTAL BLAST`', 201, 65530, -1, false, '`TOTAL BLAST`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->TOTALBLAST->Nullable = false; // NOT NULL field
        $this->TOTALBLAST->Required = true; // Required field
        $this->TOTALBLAST->Sortable = true; // Allow sort
        $this->TOTALBLAST->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TOTALBLAST->Param, "CustomMsg");
        $this->Fields['TOTAL BLAST'] = &$this->TOTALBLAST;

        // PGS
        $this->PGS = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_PGS', 'PGS', '`PGS`', '`PGS`', 201, 65530, -1, false, '`PGS`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->PGS->Nullable = false; // NOT NULL field
        $this->PGS->Required = true; // Required field
        $this->PGS->Sortable = true; // Allow sort
        $this->PGS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PGS->Param, "CustomMsg");
        $this->Fields['PGS'] = &$this->PGS;

        // REMARKS
        $this->REMARKS = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_REMARKS', 'REMARKS', '`REMARKS`', '`REMARKS`', 201, 65530, -1, false, '`REMARKS`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->REMARKS->Nullable = false; // NOT NULL field
        $this->REMARKS->Required = true; // Required field
        $this->REMARKS->Sortable = true; // Allow sort
        $this->REMARKS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->REMARKS->Param, "CustomMsg");
        $this->Fields['REMARKS'] = &$this->REMARKS;

        // PU - D/B
        $this->PUDB = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_PUDB', 'PU - D/B', '`PU - D/B`', '`PU - D/B`', 201, 65530, -1, false, '`PU - D/B`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->PUDB->Nullable = false; // NOT NULL field
        $this->PUDB->Required = true; // Required field
        $this->PUDB->Sortable = true; // Allow sort
        $this->PUDB->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PUDB->Param, "CustomMsg");
        $this->Fields['PU - D/B'] = &$this->PUDB;

        // ICSI D/B
        $this->ICSIDB = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_ICSIDB', 'ICSI D/B', '`ICSI D/B`', '`ICSI D/B`', 201, 65530, -1, false, '`ICSI D/B`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->ICSIDB->Nullable = false; // NOT NULL field
        $this->ICSIDB->Required = true; // Required field
        $this->ICSIDB->Sortable = true; // Allow sort
        $this->ICSIDB->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ICSIDB->Param, "CustomMsg");
        $this->Fields['ICSI D/B'] = &$this->ICSIDB;

        // VIT D/B
        $this->VITDB = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_VITDB', 'VIT D/B', '`VIT D/B`', '`VIT D/B`', 201, 65530, -1, false, '`VIT D/B`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->VITDB->Nullable = false; // NOT NULL field
        $this->VITDB->Required = true; // Required field
        $this->VITDB->Sortable = true; // Allow sort
        $this->VITDB->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->VITDB->Param, "CustomMsg");
        $this->Fields['VIT D/B'] = &$this->VITDB;

        // ET D/B
        $this->ETDB = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_ETDB', 'ET D/B', '`ET D/B`', '`ET D/B`', 201, 65530, -1, false, '`ET D/B`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->ETDB->Nullable = false; // NOT NULL field
        $this->ETDB->Required = true; // Required field
        $this->ETDB->Sortable = true; // Allow sort
        $this->ETDB->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ETDB->Param, "CustomMsg");
        $this->Fields['ET D/B'] = &$this->ETDB;

        // LAB COMMENTS
        $this->LABCOMMENTS = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_LABCOMMENTS', 'LAB COMMENTS', '`LAB COMMENTS`', '`LAB COMMENTS`', 201, 65530, -1, false, '`LAB COMMENTS`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->LABCOMMENTS->Nullable = false; // NOT NULL field
        $this->LABCOMMENTS->Required = true; // Required field
        $this->LABCOMMENTS->Sortable = true; // Allow sort
        $this->LABCOMMENTS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->LABCOMMENTS->Param, "CustomMsg");
        $this->Fields['LAB COMMENTS'] = &$this->LABCOMMENTS;

        // Reason for no FRESH transfer
        $this->ReasonfornoFRESHtransfer = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_ReasonfornoFRESHtransfer', 'Reason for no FRESH transfer', '`Reason for no FRESH transfer`', '`Reason for no FRESH transfer`', 201, 65530, -1, false, '`Reason for no FRESH transfer`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->ReasonfornoFRESHtransfer->Nullable = false; // NOT NULL field
        $this->ReasonfornoFRESHtransfer->Required = true; // Required field
        $this->ReasonfornoFRESHtransfer->Sortable = true; // Allow sort
        $this->ReasonfornoFRESHtransfer->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ReasonfornoFRESHtransfer->Param, "CustomMsg");
        $this->Fields['Reason for no FRESH transfer'] = &$this->ReasonfornoFRESHtransfer;

        // No of embryos transferred Day 3/5, A,B,C
        $this->NoofembryostransferredDay35ABC = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_NoofembryostransferredDay35ABC', 'No of embryos transferred Day 3/5, A,B,C', '`No of embryos transferred Day 3/5, A,B,C`', '`No of embryos transferred Day 3/5, A,B,C`', 201, 65530, -1, false, '`No of embryos transferred Day 3/5, A,B,C`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->NoofembryostransferredDay35ABC->Nullable = false; // NOT NULL field
        $this->NoofembryostransferredDay35ABC->Required = true; // Required field
        $this->NoofembryostransferredDay35ABC->Sortable = true; // Allow sort
        $this->NoofembryostransferredDay35ABC->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->NoofembryostransferredDay35ABC->Param, "CustomMsg");
        $this->Fields['No of embryos transferred Day 3/5, A,B,C'] = &$this->NoofembryostransferredDay35ABC;

        // EMBRYOS PENDING
        $this->EMBRYOSPENDING = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_EMBRYOSPENDING', 'EMBRYOS PENDING', '`EMBRYOS PENDING`', '`EMBRYOS PENDING`', 201, 65530, -1, false, '`EMBRYOS PENDING`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->EMBRYOSPENDING->Nullable = false; // NOT NULL field
        $this->EMBRYOSPENDING->Required = true; // Required field
        $this->EMBRYOSPENDING->Sortable = true; // Allow sort
        $this->EMBRYOSPENDING->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EMBRYOSPENDING->Param, "CustomMsg");
        $this->Fields['EMBRYOS PENDING'] = &$this->EMBRYOSPENDING;

        // DAY OF TRANSFER
        $this->DAYOFTRANSFER = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_DAYOFTRANSFER', 'DAY OF TRANSFER', '`DAY OF TRANSFER`', '`DAY OF TRANSFER`', 201, 65530, -1, false, '`DAY OF TRANSFER`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->DAYOFTRANSFER->Nullable = false; // NOT NULL field
        $this->DAYOFTRANSFER->Required = true; // Required field
        $this->DAYOFTRANSFER->Sortable = true; // Allow sort
        $this->DAYOFTRANSFER->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DAYOFTRANSFER->Param, "CustomMsg");
        $this->Fields['DAY OF TRANSFER'] = &$this->DAYOFTRANSFER;

        // H/D sperm
        $this->HDsperm = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_HDsperm', 'H/D sperm', '`H/D sperm`', '`H/D sperm`', 201, 65530, -1, false, '`H/D sperm`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->HDsperm->Nullable = false; // NOT NULL field
        $this->HDsperm->Required = true; // Required field
        $this->HDsperm->Sortable = true; // Allow sort
        $this->HDsperm->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HDsperm->Param, "CustomMsg");
        $this->Fields['H/D sperm'] = &$this->HDsperm;

        // Comments
        $this->Comments = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Comments', 'Comments', '`Comments`', '`Comments`', 201, 65530, -1, false, '`Comments`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Comments->Nullable = false; // NOT NULL field
        $this->Comments->Required = true; // Required field
        $this->Comments->Sortable = true; // Allow sort
        $this->Comments->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Comments->Param, "CustomMsg");
        $this->Fields['Comments'] = &$this->Comments;

        // sc progesterone
        $this->scprogesterone = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_scprogesterone', 'sc progesterone', '`sc progesterone`', '`sc progesterone`', 201, 65530, -1, false, '`sc progesterone`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->scprogesterone->Nullable = false; // NOT NULL field
        $this->scprogesterone->Required = true; // Required field
        $this->scprogesterone->Sortable = true; // Allow sort
        $this->scprogesterone->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->scprogesterone->Param, "CustomMsg");
        $this->Fields['sc progesterone'] = &$this->scprogesterone;

        // Natural micronised 400mg bd + duphaston 10mg bd
        $this->Naturalmicronised400mgbdduphaston10mgbd = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Naturalmicronised400mgbdduphaston10mgbd', 'Natural micronised 400mg bd + duphaston 10mg bd', '`Natural micronised 400mg bd + duphaston 10mg bd`', '`Natural micronised 400mg bd + duphaston 10mg bd`', 201, 65530, -1, false, '`Natural micronised 400mg bd + duphaston 10mg bd`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Naturalmicronised400mgbdduphaston10mgbd->Nullable = false; // NOT NULL field
        $this->Naturalmicronised400mgbdduphaston10mgbd->Required = true; // Required field
        $this->Naturalmicronised400mgbdduphaston10mgbd->Sortable = true; // Allow sort
        $this->Naturalmicronised400mgbdduphaston10mgbd->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Naturalmicronised400mgbdduphaston10mgbd->Param, "CustomMsg");
        $this->Fields['Natural micronised 400mg bd + duphaston 10mg bd'] = &$this->Naturalmicronised400mgbdduphaston10mgbd;

        // CRINONE
        $this->CRINONE = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_CRINONE', 'CRINONE', '`CRINONE`', '`CRINONE`', 201, 65530, -1, false, '`CRINONE`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->CRINONE->Nullable = false; // NOT NULL field
        $this->CRINONE->Required = true; // Required field
        $this->CRINONE->Sortable = true; // Allow sort
        $this->CRINONE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CRINONE->Param, "CustomMsg");
        $this->Fields['CRINONE'] = &$this->CRINONE;

        // progynova
        $this->progynova = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_progynova', 'progynova', '`progynova`', '`progynova`', 201, 65530, -1, false, '`progynova`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->progynova->Nullable = false; // NOT NULL field
        $this->progynova->Required = true; // Required field
        $this->progynova->Sortable = true; // Allow sort
        $this->progynova->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->progynova->Param, "CustomMsg");
        $this->Fields['progynova'] = &$this->progynova;

        // Heparin
        $this->Heparin = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Heparin', 'Heparin', '`Heparin`', '`Heparin`', 201, 65530, -1, false, '`Heparin`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Heparin->Nullable = false; // NOT NULL field
        $this->Heparin->Required = true; // Required field
        $this->Heparin->Sortable = true; // Allow sort
        $this->Heparin->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Heparin->Param, "CustomMsg");
        $this->Fields['Heparin'] = &$this->Heparin;

        // cabergolin
        $this->cabergolin = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_cabergolin', 'cabergolin', '`cabergolin`', '`cabergolin`', 201, 65530, -1, false, '`cabergolin`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->cabergolin->Nullable = false; // NOT NULL field
        $this->cabergolin->Required = true; // Required field
        $this->cabergolin->Sortable = true; // Allow sort
        $this->cabergolin->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->cabergolin->Param, "CustomMsg");
        $this->Fields['cabergolin'] = &$this->cabergolin;

        // Antagonist
        $this->Antagonist = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Antagonist', 'Antagonist', '`Antagonist`', '`Antagonist`', 201, 65530, -1, false, '`Antagonist`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Antagonist->Nullable = false; // NOT NULL field
        $this->Antagonist->Required = true; // Required field
        $this->Antagonist->Sortable = true; // Allow sort
        $this->Antagonist->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Antagonist->Param, "CustomMsg");
        $this->Fields['Antagonist'] = &$this->Antagonist;

        // OHSS
        $this->OHSS = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_OHSS', 'OHSS', '`OHSS`', '`OHSS`', 201, 65530, -1, false, '`OHSS`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->OHSS->Nullable = false; // NOT NULL field
        $this->OHSS->Required = true; // Required field
        $this->OHSS->Sortable = true; // Allow sort
        $this->OHSS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OHSS->Param, "CustomMsg");
        $this->Fields['OHSS'] = &$this->OHSS;

        // Complications
        $this->Complications = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Complications', 'Complications', '`Complications`', '`Complications`', 201, 65530, -1, false, '`Complications`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Complications->Nullable = false; // NOT NULL field
        $this->Complications->Required = true; // Required field
        $this->Complications->Sortable = true; // Allow sort
        $this->Complications->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Complications->Param, "CustomMsg");
        $this->Fields['Complications'] = &$this->Complications;

        // LP bleeding
        $this->LPbleeding = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_LPbleeding', 'LP bleeding', '`LP bleeding`', '`LP bleeding`', 201, 65530, -1, false, '`LP bleeding`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->LPbleeding->Nullable = false; // NOT NULL field
        $this->LPbleeding->Required = true; // Required field
        $this->LPbleeding->Sortable = true; // Allow sort
        $this->LPbleeding->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->LPbleeding->Param, "CustomMsg");
        $this->Fields['LP bleeding'] = &$this->LPbleeding;

        // ß-hCG
        $this->hCG = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_hCG', 'ß-hCG', '`ß-hCG`', '`ß-hCG`', 201, 65530, -1, false, '`ß-hCG`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->hCG->Nullable = false; // NOT NULL field
        $this->hCG->Required = true; // Required field
        $this->hCG->Sortable = true; // Allow sort
        $this->hCG->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->hCG->Param, "CustomMsg");
        $this->Fields['ß-hCG'] = &$this->hCG;

        // Implantation rate
        $this->Implantationrate = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Implantationrate', 'Implantation rate', '`Implantation rate`', '`Implantation rate`', 201, 65530, -1, false, '`Implantation rate`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Implantationrate->Nullable = false; // NOT NULL field
        $this->Implantationrate->Required = true; // Required field
        $this->Implantationrate->Sortable = true; // Allow sort
        $this->Implantationrate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Implantationrate->Param, "CustomMsg");
        $this->Fields['Implantation rate'] = &$this->Implantationrate;

        // Ectopic
        $this->Ectopic = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Ectopic', 'Ectopic', '`Ectopic`', '`Ectopic`', 201, 65530, -1, false, '`Ectopic`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Ectopic->Nullable = false; // NOT NULL field
        $this->Ectopic->Required = true; // Required field
        $this->Ectopic->Sortable = true; // Allow sort
        $this->Ectopic->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Ectopic->Param, "CustomMsg");
        $this->Fields['Ectopic'] = &$this->Ectopic;

        // Type of preg
        $this->Typeofpreg = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Typeofpreg', 'Type of preg', '`Type of preg`', '`Type of preg`', 201, 65530, -1, false, '`Type of preg`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Typeofpreg->Nullable = false; // NOT NULL field
        $this->Typeofpreg->Required = true; // Required field
        $this->Typeofpreg->Sortable = true; // Allow sort
        $this->Typeofpreg->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Typeofpreg->Param, "CustomMsg");
        $this->Fields['Type of preg'] = &$this->Typeofpreg;

        // ANC
        $this->ANC = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_ANC', 'ANC', '`ANC`', '`ANC`', 201, 65530, -1, false, '`ANC`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->ANC->Nullable = false; // NOT NULL field
        $this->ANC->Required = true; // Required field
        $this->ANC->Sortable = true; // Allow sort
        $this->ANC->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ANC->Param, "CustomMsg");
        $this->Fields['ANC'] = &$this->ANC;

        // anomalies
        $this->anomalies = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_anomalies', 'anomalies', '`anomalies`', '`anomalies`', 201, 65530, -1, false, '`anomalies`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->anomalies->Nullable = false; // NOT NULL field
        $this->anomalies->Required = true; // Required field
        $this->anomalies->Sortable = true; // Allow sort
        $this->anomalies->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->anomalies->Param, "CustomMsg");
        $this->Fields['anomalies'] = &$this->anomalies;

        // baby wt
        $this->babywt = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_babywt', 'baby wt', '`baby wt`', '`baby wt`', 201, 65530, -1, false, '`baby wt`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->babywt->Nullable = false; // NOT NULL field
        $this->babywt->Required = true; // Required field
        $this->babywt->Sortable = true; // Allow sort
        $this->babywt->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->babywt->Param, "CustomMsg");
        $this->Fields['baby wt'] = &$this->babywt;

        // GA at delivery
        $this->GAatdelivery = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_GAatdelivery', 'GA at delivery', '`GA at delivery`', '`GA at delivery`', 201, 65530, -1, false, '`GA at delivery`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->GAatdelivery->Nullable = false; // NOT NULL field
        $this->GAatdelivery->Required = true; // Required field
        $this->GAatdelivery->Sortable = true; // Allow sort
        $this->GAatdelivery->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GAatdelivery->Param, "CustomMsg");
        $this->Fields['GA at delivery'] = &$this->GAatdelivery;

        // Pregnancy outcome
        $this->Pregnancyoutcome = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Pregnancyoutcome', 'Pregnancy outcome', '`Pregnancy outcome`', '`Pregnancy outcome`', 201, 65530, -1, false, '`Pregnancy outcome`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Pregnancyoutcome->Nullable = false; // NOT NULL field
        $this->Pregnancyoutcome->Required = true; // Required field
        $this->Pregnancyoutcome->Sortable = true; // Allow sort
        $this->Pregnancyoutcome->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Pregnancyoutcome->Param, "CustomMsg");
        $this->Fields['Pregnancy outcome'] = &$this->Pregnancyoutcome;

        // 1st FET
        $this->_1stFET = new DbField('view_template_for_opu', 'view_template_for_opu', 'x__1stFET', '1st FET', '`1st FET`', '`1st FET`', 201, 65530, -1, false, '`1st FET`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->_1stFET->Nullable = false; // NOT NULL field
        $this->_1stFET->Required = true; // Required field
        $this->_1stFET->Sortable = true; // Allow sort
        $this->_1stFET->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->_1stFET->Param, "CustomMsg");
        $this->Fields['1st FET'] = &$this->_1stFET;

        // AFTER HYSTEROSCOPY
        $this->AFTERHYSTEROSCOPY = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_AFTERHYSTEROSCOPY', 'AFTER HYSTEROSCOPY', '`AFTER HYSTEROSCOPY`', '`AFTER HYSTEROSCOPY`', 201, 65530, -1, false, '`AFTER HYSTEROSCOPY`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->AFTERHYSTEROSCOPY->Nullable = false; // NOT NULL field
        $this->AFTERHYSTEROSCOPY->Required = true; // Required field
        $this->AFTERHYSTEROSCOPY->Sortable = true; // Allow sort
        $this->AFTERHYSTEROSCOPY->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AFTERHYSTEROSCOPY->Param, "CustomMsg");
        $this->Fields['AFTER HYSTEROSCOPY'] = &$this->AFTERHYSTEROSCOPY;

        // AFTER ERA
        $this->AFTERERA = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_AFTERERA', 'AFTER ERA', '`AFTER ERA`', '`AFTER ERA`', 201, 65530, -1, false, '`AFTER ERA`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->AFTERERA->Nullable = false; // NOT NULL field
        $this->AFTERERA->Required = true; // Required field
        $this->AFTERERA->Sortable = true; // Allow sort
        $this->AFTERERA->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AFTERERA->Param, "CustomMsg");
        $this->Fields['AFTER ERA'] = &$this->AFTERERA;

        // ERA
        $this->ERA = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_ERA', 'ERA', '`ERA`', '`ERA`', 201, 65530, -1, false, '`ERA`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->ERA->Nullable = false; // NOT NULL field
        $this->ERA->Required = true; // Required field
        $this->ERA->Sortable = true; // Allow sort
        $this->ERA->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ERA->Param, "CustomMsg");
        $this->Fields['ERA'] = &$this->ERA;

        // HRT
        $this->HRT = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_HRT', 'HRT', '`HRT`', '`HRT`', 201, 65530, -1, false, '`HRT`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->HRT->Nullable = false; // NOT NULL field
        $this->HRT->Required = true; // Required field
        $this->HRT->Sortable = true; // Allow sort
        $this->HRT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HRT->Param, "CustomMsg");
        $this->Fields['HRT'] = &$this->HRT;

        // XGRAST/PRP
        $this->XGRASTPRP = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_XGRASTPRP', 'XGRAST/PRP', '`XGRAST/PRP`', '`XGRAST/PRP`', 201, 65530, -1, false, '`XGRAST/PRP`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->XGRASTPRP->Nullable = false; // NOT NULL field
        $this->XGRASTPRP->Required = true; // Required field
        $this->XGRASTPRP->Sortable = true; // Allow sort
        $this->XGRASTPRP->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->XGRASTPRP->Param, "CustomMsg");
        $this->Fields['XGRAST/PRP'] = &$this->XGRASTPRP;

        // EMBRYO DETAILS DAY 3/ 5, A, B, C
        $this->EMBRYODETAILSDAY35ABC = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_EMBRYODETAILSDAY35ABC', 'EMBRYO DETAILS DAY 3/ 5, A, B, C', '`EMBRYO DETAILS DAY 3/ 5, A, B, C`', '`EMBRYO DETAILS DAY 3/ 5, A, B, C`', 201, 65530, -1, false, '`EMBRYO DETAILS DAY 3/ 5, A, B, C`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->EMBRYODETAILSDAY35ABC->Nullable = false; // NOT NULL field
        $this->EMBRYODETAILSDAY35ABC->Required = true; // Required field
        $this->EMBRYODETAILSDAY35ABC->Sortable = true; // Allow sort
        $this->EMBRYODETAILSDAY35ABC->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EMBRYODETAILSDAY35ABC->Param, "CustomMsg");
        $this->Fields['EMBRYO DETAILS DAY 3/ 5, A, B, C'] = &$this->EMBRYODETAILSDAY35ABC;

        // LMWH 40MG
        $this->LMWH40MG = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_LMWH40MG', 'LMWH 40MG', '`LMWH 40MG`', '`LMWH 40MG`', 201, 65530, -1, false, '`LMWH 40MG`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->LMWH40MG->Nullable = false; // NOT NULL field
        $this->LMWH40MG->Required = true; // Required field
        $this->LMWH40MG->Sortable = true; // Allow sort
        $this->LMWH40MG->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->LMWH40MG->Param, "CustomMsg");
        $this->Fields['LMWH 40MG'] = &$this->LMWH40MG;

        // ß-hCG2
        $this->hCG2 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_hCG2', 'ß-hCG2', '`ß-hCG2`', '`ß-hCG2`', 201, 65530, -1, false, '`ß-hCG2`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->hCG2->Nullable = false; // NOT NULL field
        $this->hCG2->Required = true; // Required field
        $this->hCG2->Sortable = true; // Allow sort
        $this->hCG2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->hCG2->Param, "CustomMsg");
        $this->Fields['ß-hCG2'] = &$this->hCG2;

        // Implantation rate1
        $this->Implantationrate1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Implantationrate1', 'Implantation rate1', '`Implantation rate1`', '`Implantation rate1`', 201, 65530, -1, false, '`Implantation rate1`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Implantationrate1->Nullable = false; // NOT NULL field
        $this->Implantationrate1->Required = true; // Required field
        $this->Implantationrate1->Sortable = true; // Allow sort
        $this->Implantationrate1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Implantationrate1->Param, "CustomMsg");
        $this->Fields['Implantation rate1'] = &$this->Implantationrate1;

        // Ectopic1
        $this->Ectopic1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Ectopic1', 'Ectopic1', '`Ectopic1`', '`Ectopic1`', 201, 65530, -1, false, '`Ectopic1`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Ectopic1->Nullable = false; // NOT NULL field
        $this->Ectopic1->Required = true; // Required field
        $this->Ectopic1->Sortable = true; // Allow sort
        $this->Ectopic1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Ectopic1->Param, "CustomMsg");
        $this->Fields['Ectopic1'] = &$this->Ectopic1;

        // Type of pregA
        $this->TypeofpregA = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_TypeofpregA', 'Type of pregA', '`Type of pregA`', '`Type of pregA`', 201, 65530, -1, false, '`Type of pregA`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->TypeofpregA->Nullable = false; // NOT NULL field
        $this->TypeofpregA->Required = true; // Required field
        $this->TypeofpregA->Sortable = true; // Allow sort
        $this->TypeofpregA->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TypeofpregA->Param, "CustomMsg");
        $this->Fields['Type of pregA'] = &$this->TypeofpregA;

        // ANC1
        $this->ANC1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_ANC1', 'ANC1', '`ANC1`', '`ANC1`', 201, 65530, -1, false, '`ANC1`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->ANC1->Nullable = false; // NOT NULL field
        $this->ANC1->Required = true; // Required field
        $this->ANC1->Sortable = true; // Allow sort
        $this->ANC1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ANC1->Param, "CustomMsg");
        $this->Fields['ANC1'] = &$this->ANC1;

        // anomalies2
        $this->anomalies2 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_anomalies2', 'anomalies2', '`anomalies2`', '`anomalies2`', 201, 65530, -1, false, '`anomalies2`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->anomalies2->Nullable = false; // NOT NULL field
        $this->anomalies2->Required = true; // Required field
        $this->anomalies2->Sortable = true; // Allow sort
        $this->anomalies2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->anomalies2->Param, "CustomMsg");
        $this->Fields['anomalies2'] = &$this->anomalies2;

        // baby wt2
        $this->babywt2 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_babywt2', 'baby wt2', '`baby wt2`', '`baby wt2`', 201, 65530, -1, false, '`baby wt2`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->babywt2->Nullable = false; // NOT NULL field
        $this->babywt2->Required = true; // Required field
        $this->babywt2->Sortable = true; // Allow sort
        $this->babywt2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->babywt2->Param, "CustomMsg");
        $this->Fields['baby wt2'] = &$this->babywt2;

        // GA at delivery1
        $this->GAatdelivery1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_GAatdelivery1', 'GA at delivery1', '`GA at delivery1`', '`GA at delivery1`', 201, 65530, -1, false, '`GA at delivery1`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->GAatdelivery1->Nullable = false; // NOT NULL field
        $this->GAatdelivery1->Required = true; // Required field
        $this->GAatdelivery1->Sortable = true; // Allow sort
        $this->GAatdelivery1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GAatdelivery1->Param, "CustomMsg");
        $this->Fields['GA at delivery1'] = &$this->GAatdelivery1;

        // Pregnancy outcome1
        $this->Pregnancyoutcome1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Pregnancyoutcome1', 'Pregnancy outcome1', '`Pregnancy outcome1`', '`Pregnancy outcome1`', 201, 65530, -1, false, '`Pregnancy outcome1`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Pregnancyoutcome1->Nullable = false; // NOT NULL field
        $this->Pregnancyoutcome1->Required = true; // Required field
        $this->Pregnancyoutcome1->Sortable = true; // Allow sort
        $this->Pregnancyoutcome1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Pregnancyoutcome1->Param, "CustomMsg");
        $this->Fields['Pregnancy outcome1'] = &$this->Pregnancyoutcome1;

        // 2ND FET
        $this->_2NDFET = new DbField('view_template_for_opu', 'view_template_for_opu', 'x__2NDFET', '2ND FET', '`2ND FET`', '`2ND FET`', 201, 65530, -1, false, '`2ND FET`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->_2NDFET->Nullable = false; // NOT NULL field
        $this->_2NDFET->Required = true; // Required field
        $this->_2NDFET->Sortable = true; // Allow sort
        $this->_2NDFET->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->_2NDFET->Param, "CustomMsg");
        $this->Fields['2ND FET'] = &$this->_2NDFET;

        // AFTER HYSTEROSCOPY1
        $this->AFTERHYSTEROSCOPY1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_AFTERHYSTEROSCOPY1', 'AFTER HYSTEROSCOPY1', '`AFTER HYSTEROSCOPY1`', '`AFTER HYSTEROSCOPY1`', 201, 65530, -1, false, '`AFTER HYSTEROSCOPY1`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->AFTERHYSTEROSCOPY1->Nullable = false; // NOT NULL field
        $this->AFTERHYSTEROSCOPY1->Required = true; // Required field
        $this->AFTERHYSTEROSCOPY1->Sortable = true; // Allow sort
        $this->AFTERHYSTEROSCOPY1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AFTERHYSTEROSCOPY1->Param, "CustomMsg");
        $this->Fields['AFTER HYSTEROSCOPY1'] = &$this->AFTERHYSTEROSCOPY1;

        // AFTER ERA1
        $this->AFTERERA1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_AFTERERA1', 'AFTER ERA1', '`AFTER ERA1`', '`AFTER ERA1`', 201, 65530, -1, false, '`AFTER ERA1`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->AFTERERA1->Nullable = false; // NOT NULL field
        $this->AFTERERA1->Required = true; // Required field
        $this->AFTERERA1->Sortable = true; // Allow sort
        $this->AFTERERA1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AFTERERA1->Param, "CustomMsg");
        $this->Fields['AFTER ERA1'] = &$this->AFTERERA1;

        // ERA1
        $this->ERA1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_ERA1', 'ERA1', '`ERA1`', '`ERA1`', 201, 65530, -1, false, '`ERA1`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->ERA1->Nullable = false; // NOT NULL field
        $this->ERA1->Required = true; // Required field
        $this->ERA1->Sortable = true; // Allow sort
        $this->ERA1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ERA1->Param, "CustomMsg");
        $this->Fields['ERA1'] = &$this->ERA1;

        // HRT1
        $this->HRT1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_HRT1', 'HRT1', '`HRT1`', '`HRT1`', 201, 65530, -1, false, '`HRT1`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->HRT1->Nullable = false; // NOT NULL field
        $this->HRT1->Required = true; // Required field
        $this->HRT1->Sortable = true; // Allow sort
        $this->HRT1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HRT1->Param, "CustomMsg");
        $this->Fields['HRT1'] = &$this->HRT1;

        // XGRAST/PRP1
        $this->XGRASTPRP1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_XGRASTPRP1', 'XGRAST/PRP1', '`XGRAST/PRP1`', '`XGRAST/PRP1`', 201, 65530, -1, false, '`XGRAST/PRP1`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->XGRASTPRP1->Nullable = false; // NOT NULL field
        $this->XGRASTPRP1->Required = true; // Required field
        $this->XGRASTPRP1->Sortable = true; // Allow sort
        $this->XGRASTPRP1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->XGRASTPRP1->Param, "CustomMsg");
        $this->Fields['XGRAST/PRP1'] = &$this->XGRASTPRP1;

        // NUMBER OF EMBRYOS
        $this->NUMBEROFEMBRYOS = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_NUMBEROFEMBRYOS', 'NUMBER OF EMBRYOS', '`NUMBER OF EMBRYOS`', '`NUMBER OF EMBRYOS`', 201, 65530, -1, false, '`NUMBER OF EMBRYOS`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->NUMBEROFEMBRYOS->Nullable = false; // NOT NULL field
        $this->NUMBEROFEMBRYOS->Required = true; // Required field
        $this->NUMBEROFEMBRYOS->Sortable = true; // Allow sort
        $this->NUMBEROFEMBRYOS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->NUMBEROFEMBRYOS->Param, "CustomMsg");
        $this->Fields['NUMBER OF EMBRYOS'] = &$this->NUMBEROFEMBRYOS;

        // EMBRYO DETAILS DAY 3/ 5,/6 A, B, C
        $this->EMBRYODETAILSDAY356ABC = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_EMBRYODETAILSDAY356ABC', 'EMBRYO DETAILS DAY 3/ 5,/6 A, B, C', '`EMBRYO DETAILS DAY 3/ 5,/6 A, B, C`', '`EMBRYO DETAILS DAY 3/ 5,/6 A, B, C`', 201, 65530, -1, false, '`EMBRYO DETAILS DAY 3/ 5,/6 A, B, C`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->EMBRYODETAILSDAY356ABC->Nullable = false; // NOT NULL field
        $this->EMBRYODETAILSDAY356ABC->Required = true; // Required field
        $this->EMBRYODETAILSDAY356ABC->Sortable = true; // Allow sort
        $this->EMBRYODETAILSDAY356ABC->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EMBRYODETAILSDAY356ABC->Param, "CustomMsg");
        $this->Fields['EMBRYO DETAILS DAY 3/ 5,/6 A, B, C'] = &$this->EMBRYODETAILSDAY356ABC;

        // INTRALIPID AND BARGLOBIN
        $this->INTRALIPIDANDBARGLOBIN = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_INTRALIPIDANDBARGLOBIN', 'INTRALIPID AND BARGLOBIN', '`INTRALIPID AND BARGLOBIN`', '`INTRALIPID AND BARGLOBIN`', 201, 65530, -1, false, '`INTRALIPID AND BARGLOBIN`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->INTRALIPIDANDBARGLOBIN->Nullable = false; // NOT NULL field
        $this->INTRALIPIDANDBARGLOBIN->Required = true; // Required field
        $this->INTRALIPIDANDBARGLOBIN->Sortable = true; // Allow sort
        $this->INTRALIPIDANDBARGLOBIN->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->INTRALIPIDANDBARGLOBIN->Param, "CustomMsg");
        $this->Fields['INTRALIPID AND BARGLOBIN'] = &$this->INTRALIPIDANDBARGLOBIN;

        // LMWH 40MG1
        $this->LMWH40MG1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_LMWH40MG1', 'LMWH 40MG1', '`LMWH 40MG1`', '`LMWH 40MG1`', 201, 65530, -1, false, '`LMWH 40MG1`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->LMWH40MG1->Nullable = false; // NOT NULL field
        $this->LMWH40MG1->Required = true; // Required field
        $this->LMWH40MG1->Sortable = true; // Allow sort
        $this->LMWH40MG1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->LMWH40MG1->Param, "CustomMsg");
        $this->Fields['LMWH 40MG1'] = &$this->LMWH40MG1;

        // ß-hCG1
        $this->hCG1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_hCG1', 'ß-hCG1', '`ß-hCG1`', '`ß-hCG1`', 201, 65530, -1, false, '`ß-hCG1`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->hCG1->Nullable = false; // NOT NULL field
        $this->hCG1->Required = true; // Required field
        $this->hCG1->Sortable = true; // Allow sort
        $this->hCG1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->hCG1->Param, "CustomMsg");
        $this->Fields['ß-hCG1'] = &$this->hCG1;

        // Implantation rate2
        $this->Implantationrate2 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Implantationrate2', 'Implantation rate2', '`Implantation rate2`', '`Implantation rate2`', 201, 65530, -1, false, '`Implantation rate2`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Implantationrate2->Nullable = false; // NOT NULL field
        $this->Implantationrate2->Required = true; // Required field
        $this->Implantationrate2->Sortable = true; // Allow sort
        $this->Implantationrate2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Implantationrate2->Param, "CustomMsg");
        $this->Fields['Implantation rate2'] = &$this->Implantationrate2;

        // Ectopic2
        $this->Ectopic2 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Ectopic2', 'Ectopic2', '`Ectopic2`', '`Ectopic2`', 201, 65530, -1, false, '`Ectopic2`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Ectopic2->Nullable = false; // NOT NULL field
        $this->Ectopic2->Required = true; // Required field
        $this->Ectopic2->Sortable = true; // Allow sort
        $this->Ectopic2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Ectopic2->Param, "CustomMsg");
        $this->Fields['Ectopic2'] = &$this->Ectopic2;

        // Type of preg2
        $this->Typeofpreg2 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Typeofpreg2', 'Type of preg2', '`Type of preg2`', '`Type of preg2`', 201, 65530, -1, false, '`Type of preg2`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Typeofpreg2->Nullable = false; // NOT NULL field
        $this->Typeofpreg2->Required = true; // Required field
        $this->Typeofpreg2->Sortable = true; // Allow sort
        $this->Typeofpreg2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Typeofpreg2->Param, "CustomMsg");
        $this->Fields['Type of preg2'] = &$this->Typeofpreg2;

        // ANCA
        $this->ANCA = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_ANCA', 'ANCA', '`ANCA`', '`ANCA`', 201, 65530, -1, false, '`ANCA`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->ANCA->Nullable = false; // NOT NULL field
        $this->ANCA->Required = true; // Required field
        $this->ANCA->Sortable = true; // Allow sort
        $this->ANCA->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ANCA->Param, "CustomMsg");
        $this->Fields['ANCA'] = &$this->ANCA;

        // anomalies1
        $this->anomalies1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_anomalies1', 'anomalies1', '`anomalies1`', '`anomalies1`', 201, 65530, -1, false, '`anomalies1`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->anomalies1->Nullable = false; // NOT NULL field
        $this->anomalies1->Required = true; // Required field
        $this->anomalies1->Sortable = true; // Allow sort
        $this->anomalies1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->anomalies1->Param, "CustomMsg");
        $this->Fields['anomalies1'] = &$this->anomalies1;

        // baby wt1
        $this->babywt1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_babywt1', 'baby wt1', '`baby wt1`', '`baby wt1`', 201, 65530, -1, false, '`baby wt1`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->babywt1->Nullable = false; // NOT NULL field
        $this->babywt1->Required = true; // Required field
        $this->babywt1->Sortable = true; // Allow sort
        $this->babywt1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->babywt1->Param, "CustomMsg");
        $this->Fields['baby wt1'] = &$this->babywt1;

        // GA at delivery2
        $this->GAatdelivery2 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_GAatdelivery2', 'GA at delivery2', '`GA at delivery2`', '`GA at delivery2`', 201, 65530, -1, false, '`GA at delivery2`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->GAatdelivery2->Nullable = false; // NOT NULL field
        $this->GAatdelivery2->Required = true; // Required field
        $this->GAatdelivery2->Sortable = true; // Allow sort
        $this->GAatdelivery2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GAatdelivery2->Param, "CustomMsg");
        $this->Fields['GA at delivery2'] = &$this->GAatdelivery2;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_template_for_opu`";
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
        $this->RIDNO->DbValue = $row['RIDNO'];
        $this->Treatment->DbValue = $row['Treatment'];
        $this->Origin->DbValue = $row['Origin'];
        $this->MaleIndications->DbValue = $row['MaleIndications'];
        $this->FemaleIndications->DbValue = $row['FemaleIndications'];
        $this->PatientName->DbValue = $row['PatientName'];
        $this->PatientID->DbValue = $row['PatientID'];
        $this->PartnerName->DbValue = $row['PartnerName'];
        $this->PartnerID->DbValue = $row['PartnerID'];
        $this->A4ICSICycle->DbValue = $row['A4ICSICycle'];
        $this->TotalICSICycle->DbValue = $row['TotalICSICycle'];
        $this->TypeOfInfertility->DbValue = $row['TypeOfInfertility'];
        $this->RelevantHistory->DbValue = $row['RelevantHistory'];
        $this->IUICycles->DbValue = $row['IUICycles'];
        $this->AMH->DbValue = $row['AMH'];
        $this->FBMI->DbValue = $row['FBMI'];
        $this->ANTAGONISTSTARTDAY->DbValue = $row['ANTAGONISTSTARTDAY'];
        $this->OvarianSurgery->DbValue = $row['OvarianSurgery'];
        $this->OPUDATE->DbValue = $row['OPUDATE'];
        $this->RFSH1->DbValue = $row['RFSH1'];
        $this->RFSH2->DbValue = $row['RFSH2'];
        $this->RFSH3->DbValue = $row['RFSH3'];
        $this->E21->DbValue = $row['E21'];
        $this->Hysteroscopy->DbValue = $row['Hysteroscopy'];
        $this->HospID->DbValue = $row['HospID'];
        $this->Fweight->DbValue = $row['Fweight'];
        $this->AntiTPO->DbValue = $row['AntiTPO'];
        $this->AntiTG->DbValue = $row['AntiTG'];
        $this->PatientAge->DbValue = $row['PatientAge'];
        $this->PartnerAge->DbValue = $row['PartnerAge'];
        $this->CYCLES->DbValue = $row['CYCLES'];
        $this->MF->DbValue = $row['MF'];
        $this->CauseOfINFERTILITY->DbValue = $row['CauseOfINFERTILITY'];
        $this->SIS->DbValue = $row['SIS'];
        $this->Scratching->DbValue = $row['Scratching'];
        $this->Cannulation->DbValue = $row['Cannulation'];
        $this->MEPRATE->DbValue = $row['MEPRATE'];
        $this->ROVARY->DbValue = $row['R.OVARY'];
        $this->RAFC->DbValue = $row['R.AFC'];
        $this->LOVARY->DbValue = $row['L.OVARY'];
        $this->LAFC->DbValue = $row['L.AFC'];
        $this->LH1->DbValue = $row['LH1'];
        $this->E2->DbValue = $row['E2'];
        $this->StemCellInstallation->DbValue = $row['StemCellInstallation'];
        $this->DHEAS->DbValue = $row['DHEAS'];
        $this->Mtorr->DbValue = $row['Mtorr'];
        $this->AMH1->DbValue = $row['AMH1'];
        $this->LH->DbValue = $row['LH'];
        $this->BMIMALE->DbValue = $row['BMI(MALE)'];
        $this->MaleMedicalConditions->DbValue = $row['MaleMedicalConditions'];
        $this->MaleExamination->DbValue = $row['MaleExamination'];
        $this->SpermConcentration->DbValue = $row['SpermConcentration'];
        $this->SpermMotilityPNP->DbValue = $row['SpermMotility(P&NP)'];
        $this->SpermMorphology->DbValue = $row['SpermMorphology'];
        $this->SpermRetrival->DbValue = $row['SpermRetrival'];
        $this->MTestosterone->DbValue = $row['M.Testosterone'];
        $this->DFI->DbValue = $row['DFI'];
        $this->PreRX->DbValue = $row['PreRX'];
        $this->CC100->DbValue = $row['CC 100'];
        $this->RFSH1A->DbValue = $row['RFSH1A'];
        $this->HMG1->DbValue = $row['HMG1'];
        $this->RLH->DbValue = $row['RLH'];
        $this->HMG_HP->DbValue = $row['HMG_HP'];
        $this->day_of_HMG->DbValue = $row['day_of_HMG'];
        $this->Reason_for_HMG->DbValue = $row['Reason_for_HMG'];
        $this->RLH_day->DbValue = $row['RLH_day'];
        $this->DAYSOFSTIMULATION->DbValue = $row['DAYSOFSTIMULATION'];
        $this->AnychangeinbetweenDoseaddedday->DbValue = $row['Any change inbetween ( Dose added , day)'];
        $this->dayofAnta->DbValue = $row['day of Anta'];
        $this->RFSHTD->DbValue = $row['R FSH TD'];
        $this->RFSHHMGTD->DbValue = $row['R FSH + HMG TD'];
        $this->RFSHRLHTD->DbValue = $row['R FSH + R LH TD'];
        $this->HMGTD->DbValue = $row['HMG TD'];
        $this->LHTD->DbValue = $row['LH TD'];
        $this->D1LH->DbValue = $row['D1 LH'];
        $this->D1E2->DbValue = $row['D1 E2'];
        $this->TriggerdayE2->DbValue = $row['Trigger day E2'];
        $this->TriggerdayP4->DbValue = $row['Trigger day P4'];
        $this->TriggerdayLH->DbValue = $row['Trigger day LH'];
        $this->VITD->DbValue = $row['VIT-D'];
        $this->TRIGGERR->DbValue = $row['TRIGGERR'];
        $this->BHCGBEFORERETRIEVAL->DbValue = $row['BHCG BEFORE RETRIEVAL'];
        $this->LH12HRS->DbValue = $row['LH -12 HRS'];
        $this->P412HRS->DbValue = $row['P4 -12 HRS'];
        $this->ETonhCGday->DbValue = $row['ET on hCG day'];
        $this->ETdoppler->DbValue = $row['ET doppler'];
        $this->VIFIVFI->DbValue = $row['VI/FI/VFI'];
        $this->Endometrialabnormality->DbValue = $row['Endometrial abnormality'];
        $this->AFCONS1->DbValue = $row['AFC ON S1'];
        $this->TIMEOFOPUFROMTRIGGER->DbValue = $row['TIME OF OPU FROM TRIGGER'];
        $this->SPERMTYPE->DbValue = $row['SPERM TYPE'];
        $this->EXPECTEDONTRIGGERDAY->DbValue = $row['EXPECTED ON TRIGGER DAY'];
        $this->OOCYTESRETRIEVED->DbValue = $row['OOCYTES RETRIEVED'];
        $this->TIMEOFDENUDATION->DbValue = $row['TIME OF DENUDATION'];
        $this->MII->DbValue = $row['M-II'];
        $this->MI->DbValue = $row['MI'];
        $this->GV->DbValue = $row['GV'];
        $this->ICSITIMEFORMOPU->DbValue = $row['ICSI TIME FORM OPU'];
        $this->FERT2PN->DbValue = $row['FERT ( 2 PN )'];
        $this->DEG->DbValue = $row['DEG'];
        $this->D3GRADEA->DbValue = $row['D3 GRADE A'];
        $this->D3GRADEB->DbValue = $row['D3 GRADE B'];
        $this->D3GRADEC->DbValue = $row['D3 GRADE C'];
        $this->D3GRADED->DbValue = $row['D3 GRADE D'];
        $this->USABLEONDAY3ET->DbValue = $row['USABLE ON DAY 3 ET'];
        $this->USABLEONday3FREEZING->DbValue = $row['USABLE ON day 3 FREEZING'];
        $this->D5GARDEA->DbValue = $row['D5 GARDE A'];
        $this->D5GRADEB->DbValue = $row['D5 GRADE B'];
        $this->D5GRADEC->DbValue = $row['D5 GRADE C'];
        $this->D5GRADED->DbValue = $row['D5 GRADE D'];
        $this->USABLEOND5ET->DbValue = $row['USABLE ON D5 ET'];
        $this->USABLEOND5FREEZING->DbValue = $row['USABLE ON D5 FREEZING'];
        $this->D6GRADEA->DbValue = $row['D6 GRADE A'];
        $this->D6GRADEB->DbValue = $row['D6 GRADE B'];
        $this->D6GRADEC->DbValue = $row['D6 GRADE C'];
        $this->D6GRADED->DbValue = $row['D6 GRADE D'];
        $this->D6USABLEEMBRYOET->DbValue = $row['D6 USABLE EMBRYO ET'];
        $this->D6USABLEFREEZING->DbValue = $row['D6 USABLE FREEZING'];
        $this->TOTALBLAST->DbValue = $row['TOTAL BLAST'];
        $this->PGS->DbValue = $row['PGS'];
        $this->REMARKS->DbValue = $row['REMARKS'];
        $this->PUDB->DbValue = $row['PU - D/B'];
        $this->ICSIDB->DbValue = $row['ICSI D/B'];
        $this->VITDB->DbValue = $row['VIT D/B'];
        $this->ETDB->DbValue = $row['ET D/B'];
        $this->LABCOMMENTS->DbValue = $row['LAB COMMENTS'];
        $this->ReasonfornoFRESHtransfer->DbValue = $row['Reason for no FRESH transfer'];
        $this->NoofembryostransferredDay35ABC->DbValue = $row['No of embryos transferred Day 3/5, A,B,C'];
        $this->EMBRYOSPENDING->DbValue = $row['EMBRYOS PENDING'];
        $this->DAYOFTRANSFER->DbValue = $row['DAY OF TRANSFER'];
        $this->HDsperm->DbValue = $row['H/D sperm'];
        $this->Comments->DbValue = $row['Comments'];
        $this->scprogesterone->DbValue = $row['sc progesterone'];
        $this->Naturalmicronised400mgbdduphaston10mgbd->DbValue = $row['Natural micronised 400mg bd + duphaston 10mg bd'];
        $this->CRINONE->DbValue = $row['CRINONE'];
        $this->progynova->DbValue = $row['progynova'];
        $this->Heparin->DbValue = $row['Heparin'];
        $this->cabergolin->DbValue = $row['cabergolin'];
        $this->Antagonist->DbValue = $row['Antagonist'];
        $this->OHSS->DbValue = $row['OHSS'];
        $this->Complications->DbValue = $row['Complications'];
        $this->LPbleeding->DbValue = $row['LP bleeding'];
        $this->hCG->DbValue = $row['ß-hCG'];
        $this->Implantationrate->DbValue = $row['Implantation rate'];
        $this->Ectopic->DbValue = $row['Ectopic'];
        $this->Typeofpreg->DbValue = $row['Type of preg'];
        $this->ANC->DbValue = $row['ANC'];
        $this->anomalies->DbValue = $row['anomalies'];
        $this->babywt->DbValue = $row['baby wt'];
        $this->GAatdelivery->DbValue = $row['GA at delivery'];
        $this->Pregnancyoutcome->DbValue = $row['Pregnancy outcome'];
        $this->_1stFET->DbValue = $row['1st FET'];
        $this->AFTERHYSTEROSCOPY->DbValue = $row['AFTER HYSTEROSCOPY'];
        $this->AFTERERA->DbValue = $row['AFTER ERA'];
        $this->ERA->DbValue = $row['ERA'];
        $this->HRT->DbValue = $row['HRT'];
        $this->XGRASTPRP->DbValue = $row['XGRAST/PRP'];
        $this->EMBRYODETAILSDAY35ABC->DbValue = $row['EMBRYO DETAILS DAY 3/ 5, A, B, C'];
        $this->LMWH40MG->DbValue = $row['LMWH 40MG'];
        $this->hCG2->DbValue = $row['ß-hCG2'];
        $this->Implantationrate1->DbValue = $row['Implantation rate1'];
        $this->Ectopic1->DbValue = $row['Ectopic1'];
        $this->TypeofpregA->DbValue = $row['Type of pregA'];
        $this->ANC1->DbValue = $row['ANC1'];
        $this->anomalies2->DbValue = $row['anomalies2'];
        $this->babywt2->DbValue = $row['baby wt2'];
        $this->GAatdelivery1->DbValue = $row['GA at delivery1'];
        $this->Pregnancyoutcome1->DbValue = $row['Pregnancy outcome1'];
        $this->_2NDFET->DbValue = $row['2ND FET'];
        $this->AFTERHYSTEROSCOPY1->DbValue = $row['AFTER HYSTEROSCOPY1'];
        $this->AFTERERA1->DbValue = $row['AFTER ERA1'];
        $this->ERA1->DbValue = $row['ERA1'];
        $this->HRT1->DbValue = $row['HRT1'];
        $this->XGRASTPRP1->DbValue = $row['XGRAST/PRP1'];
        $this->NUMBEROFEMBRYOS->DbValue = $row['NUMBER OF EMBRYOS'];
        $this->EMBRYODETAILSDAY356ABC->DbValue = $row['EMBRYO DETAILS DAY 3/ 5,/6 A, B, C'];
        $this->INTRALIPIDANDBARGLOBIN->DbValue = $row['INTRALIPID AND BARGLOBIN'];
        $this->LMWH40MG1->DbValue = $row['LMWH 40MG1'];
        $this->hCG1->DbValue = $row['ß-hCG1'];
        $this->Implantationrate2->DbValue = $row['Implantation rate2'];
        $this->Ectopic2->DbValue = $row['Ectopic2'];
        $this->Typeofpreg2->DbValue = $row['Type of preg2'];
        $this->ANCA->DbValue = $row['ANCA'];
        $this->anomalies1->DbValue = $row['anomalies1'];
        $this->babywt1->DbValue = $row['baby wt1'];
        $this->GAatdelivery2->DbValue = $row['GA at delivery2'];
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
        return $_SESSION[$name] ?? GetUrl("ViewTemplateForOpuList");
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
        if ($pageName == "ViewTemplateForOpuView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewTemplateForOpuEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewTemplateForOpuAdd") {
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
                return "ViewTemplateForOpuView";
            case Config("API_ADD_ACTION"):
                return "ViewTemplateForOpuAdd";
            case Config("API_EDIT_ACTION"):
                return "ViewTemplateForOpuEdit";
            case Config("API_DELETE_ACTION"):
                return "ViewTemplateForOpuDelete";
            case Config("API_LIST_ACTION"):
                return "ViewTemplateForOpuList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewTemplateForOpuList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewTemplateForOpuView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewTemplateForOpuView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewTemplateForOpuAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewTemplateForOpuAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewTemplateForOpuEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewTemplateForOpuAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewTemplateForOpuDelete", $this->getUrlParm());
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
        $this->RIDNO->setDbValue($row['RIDNO']);
        $this->Treatment->setDbValue($row['Treatment']);
        $this->Origin->setDbValue($row['Origin']);
        $this->MaleIndications->setDbValue($row['MaleIndications']);
        $this->FemaleIndications->setDbValue($row['FemaleIndications']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->PatientID->setDbValue($row['PatientID']);
        $this->PartnerName->setDbValue($row['PartnerName']);
        $this->PartnerID->setDbValue($row['PartnerID']);
        $this->A4ICSICycle->setDbValue($row['A4ICSICycle']);
        $this->TotalICSICycle->setDbValue($row['TotalICSICycle']);
        $this->TypeOfInfertility->setDbValue($row['TypeOfInfertility']);
        $this->RelevantHistory->setDbValue($row['RelevantHistory']);
        $this->IUICycles->setDbValue($row['IUICycles']);
        $this->AMH->setDbValue($row['AMH']);
        $this->FBMI->setDbValue($row['FBMI']);
        $this->ANTAGONISTSTARTDAY->setDbValue($row['ANTAGONISTSTARTDAY']);
        $this->OvarianSurgery->setDbValue($row['OvarianSurgery']);
        $this->OPUDATE->setDbValue($row['OPUDATE']);
        $this->RFSH1->setDbValue($row['RFSH1']);
        $this->RFSH2->setDbValue($row['RFSH2']);
        $this->RFSH3->setDbValue($row['RFSH3']);
        $this->E21->setDbValue($row['E21']);
        $this->Hysteroscopy->setDbValue($row['Hysteroscopy']);
        $this->HospID->setDbValue($row['HospID']);
        $this->Fweight->setDbValue($row['Fweight']);
        $this->AntiTPO->setDbValue($row['AntiTPO']);
        $this->AntiTG->setDbValue($row['AntiTG']);
        $this->PatientAge->setDbValue($row['PatientAge']);
        $this->PartnerAge->setDbValue($row['PartnerAge']);
        $this->CYCLES->setDbValue($row['CYCLES']);
        $this->MF->setDbValue($row['MF']);
        $this->CauseOfINFERTILITY->setDbValue($row['CauseOfINFERTILITY']);
        $this->SIS->setDbValue($row['SIS']);
        $this->Scratching->setDbValue($row['Scratching']);
        $this->Cannulation->setDbValue($row['Cannulation']);
        $this->MEPRATE->setDbValue($row['MEPRATE']);
        $this->ROVARY->setDbValue($row['R.OVARY']);
        $this->RAFC->setDbValue($row['R.AFC']);
        $this->LOVARY->setDbValue($row['L.OVARY']);
        $this->LAFC->setDbValue($row['L.AFC']);
        $this->LH1->setDbValue($row['LH1']);
        $this->E2->setDbValue($row['E2']);
        $this->StemCellInstallation->setDbValue($row['StemCellInstallation']);
        $this->DHEAS->setDbValue($row['DHEAS']);
        $this->Mtorr->setDbValue($row['Mtorr']);
        $this->AMH1->setDbValue($row['AMH1']);
        $this->LH->setDbValue($row['LH']);
        $this->BMIMALE->setDbValue($row['BMI(MALE)']);
        $this->MaleMedicalConditions->setDbValue($row['MaleMedicalConditions']);
        $this->MaleExamination->setDbValue($row['MaleExamination']);
        $this->SpermConcentration->setDbValue($row['SpermConcentration']);
        $this->SpermMotilityPNP->setDbValue($row['SpermMotility(P&NP)']);
        $this->SpermMorphology->setDbValue($row['SpermMorphology']);
        $this->SpermRetrival->setDbValue($row['SpermRetrival']);
        $this->MTestosterone->setDbValue($row['M.Testosterone']);
        $this->DFI->setDbValue($row['DFI']);
        $this->PreRX->setDbValue($row['PreRX']);
        $this->CC100->setDbValue($row['CC 100']);
        $this->RFSH1A->setDbValue($row['RFSH1A']);
        $this->HMG1->setDbValue($row['HMG1']);
        $this->RLH->setDbValue($row['RLH']);
        $this->HMG_HP->setDbValue($row['HMG_HP']);
        $this->day_of_HMG->setDbValue($row['day_of_HMG']);
        $this->Reason_for_HMG->setDbValue($row['Reason_for_HMG']);
        $this->RLH_day->setDbValue($row['RLH_day']);
        $this->DAYSOFSTIMULATION->setDbValue($row['DAYSOFSTIMULATION']);
        $this->AnychangeinbetweenDoseaddedday->setDbValue($row['Any change inbetween ( Dose added , day)']);
        $this->dayofAnta->setDbValue($row['day of Anta']);
        $this->RFSHTD->setDbValue($row['R FSH TD']);
        $this->RFSHHMGTD->setDbValue($row['R FSH + HMG TD']);
        $this->RFSHRLHTD->setDbValue($row['R FSH + R LH TD']);
        $this->HMGTD->setDbValue($row['HMG TD']);
        $this->LHTD->setDbValue($row['LH TD']);
        $this->D1LH->setDbValue($row['D1 LH']);
        $this->D1E2->setDbValue($row['D1 E2']);
        $this->TriggerdayE2->setDbValue($row['Trigger day E2']);
        $this->TriggerdayP4->setDbValue($row['Trigger day P4']);
        $this->TriggerdayLH->setDbValue($row['Trigger day LH']);
        $this->VITD->setDbValue($row['VIT-D']);
        $this->TRIGGERR->setDbValue($row['TRIGGERR']);
        $this->BHCGBEFORERETRIEVAL->setDbValue($row['BHCG BEFORE RETRIEVAL']);
        $this->LH12HRS->setDbValue($row['LH -12 HRS']);
        $this->P412HRS->setDbValue($row['P4 -12 HRS']);
        $this->ETonhCGday->setDbValue($row['ET on hCG day']);
        $this->ETdoppler->setDbValue($row['ET doppler']);
        $this->VIFIVFI->setDbValue($row['VI/FI/VFI']);
        $this->Endometrialabnormality->setDbValue($row['Endometrial abnormality']);
        $this->AFCONS1->setDbValue($row['AFC ON S1']);
        $this->TIMEOFOPUFROMTRIGGER->setDbValue($row['TIME OF OPU FROM TRIGGER']);
        $this->SPERMTYPE->setDbValue($row['SPERM TYPE']);
        $this->EXPECTEDONTRIGGERDAY->setDbValue($row['EXPECTED ON TRIGGER DAY']);
        $this->OOCYTESRETRIEVED->setDbValue($row['OOCYTES RETRIEVED']);
        $this->TIMEOFDENUDATION->setDbValue($row['TIME OF DENUDATION']);
        $this->MII->setDbValue($row['M-II']);
        $this->MI->setDbValue($row['MI']);
        $this->GV->setDbValue($row['GV']);
        $this->ICSITIMEFORMOPU->setDbValue($row['ICSI TIME FORM OPU']);
        $this->FERT2PN->setDbValue($row['FERT ( 2 PN )']);
        $this->DEG->setDbValue($row['DEG']);
        $this->D3GRADEA->setDbValue($row['D3 GRADE A']);
        $this->D3GRADEB->setDbValue($row['D3 GRADE B']);
        $this->D3GRADEC->setDbValue($row['D3 GRADE C']);
        $this->D3GRADED->setDbValue($row['D3 GRADE D']);
        $this->USABLEONDAY3ET->setDbValue($row['USABLE ON DAY 3 ET']);
        $this->USABLEONday3FREEZING->setDbValue($row['USABLE ON day 3 FREEZING']);
        $this->D5GARDEA->setDbValue($row['D5 GARDE A']);
        $this->D5GRADEB->setDbValue($row['D5 GRADE B']);
        $this->D5GRADEC->setDbValue($row['D5 GRADE C']);
        $this->D5GRADED->setDbValue($row['D5 GRADE D']);
        $this->USABLEOND5ET->setDbValue($row['USABLE ON D5 ET']);
        $this->USABLEOND5FREEZING->setDbValue($row['USABLE ON D5 FREEZING']);
        $this->D6GRADEA->setDbValue($row['D6 GRADE A']);
        $this->D6GRADEB->setDbValue($row['D6 GRADE B']);
        $this->D6GRADEC->setDbValue($row['D6 GRADE C']);
        $this->D6GRADED->setDbValue($row['D6 GRADE D']);
        $this->D6USABLEEMBRYOET->setDbValue($row['D6 USABLE EMBRYO ET']);
        $this->D6USABLEFREEZING->setDbValue($row['D6 USABLE FREEZING']);
        $this->TOTALBLAST->setDbValue($row['TOTAL BLAST']);
        $this->PGS->setDbValue($row['PGS']);
        $this->REMARKS->setDbValue($row['REMARKS']);
        $this->PUDB->setDbValue($row['PU - D/B']);
        $this->ICSIDB->setDbValue($row['ICSI D/B']);
        $this->VITDB->setDbValue($row['VIT D/B']);
        $this->ETDB->setDbValue($row['ET D/B']);
        $this->LABCOMMENTS->setDbValue($row['LAB COMMENTS']);
        $this->ReasonfornoFRESHtransfer->setDbValue($row['Reason for no FRESH transfer']);
        $this->NoofembryostransferredDay35ABC->setDbValue($row['No of embryos transferred Day 3/5, A,B,C']);
        $this->EMBRYOSPENDING->setDbValue($row['EMBRYOS PENDING']);
        $this->DAYOFTRANSFER->setDbValue($row['DAY OF TRANSFER']);
        $this->HDsperm->setDbValue($row['H/D sperm']);
        $this->Comments->setDbValue($row['Comments']);
        $this->scprogesterone->setDbValue($row['sc progesterone']);
        $this->Naturalmicronised400mgbdduphaston10mgbd->setDbValue($row['Natural micronised 400mg bd + duphaston 10mg bd']);
        $this->CRINONE->setDbValue($row['CRINONE']);
        $this->progynova->setDbValue($row['progynova']);
        $this->Heparin->setDbValue($row['Heparin']);
        $this->cabergolin->setDbValue($row['cabergolin']);
        $this->Antagonist->setDbValue($row['Antagonist']);
        $this->OHSS->setDbValue($row['OHSS']);
        $this->Complications->setDbValue($row['Complications']);
        $this->LPbleeding->setDbValue($row['LP bleeding']);
        $this->hCG->setDbValue($row['ß-hCG']);
        $this->Implantationrate->setDbValue($row['Implantation rate']);
        $this->Ectopic->setDbValue($row['Ectopic']);
        $this->Typeofpreg->setDbValue($row['Type of preg']);
        $this->ANC->setDbValue($row['ANC']);
        $this->anomalies->setDbValue($row['anomalies']);
        $this->babywt->setDbValue($row['baby wt']);
        $this->GAatdelivery->setDbValue($row['GA at delivery']);
        $this->Pregnancyoutcome->setDbValue($row['Pregnancy outcome']);
        $this->_1stFET->setDbValue($row['1st FET']);
        $this->AFTERHYSTEROSCOPY->setDbValue($row['AFTER HYSTEROSCOPY']);
        $this->AFTERERA->setDbValue($row['AFTER ERA']);
        $this->ERA->setDbValue($row['ERA']);
        $this->HRT->setDbValue($row['HRT']);
        $this->XGRASTPRP->setDbValue($row['XGRAST/PRP']);
        $this->EMBRYODETAILSDAY35ABC->setDbValue($row['EMBRYO DETAILS DAY 3/ 5, A, B, C']);
        $this->LMWH40MG->setDbValue($row['LMWH 40MG']);
        $this->hCG2->setDbValue($row['ß-hCG2']);
        $this->Implantationrate1->setDbValue($row['Implantation rate1']);
        $this->Ectopic1->setDbValue($row['Ectopic1']);
        $this->TypeofpregA->setDbValue($row['Type of pregA']);
        $this->ANC1->setDbValue($row['ANC1']);
        $this->anomalies2->setDbValue($row['anomalies2']);
        $this->babywt2->setDbValue($row['baby wt2']);
        $this->GAatdelivery1->setDbValue($row['GA at delivery1']);
        $this->Pregnancyoutcome1->setDbValue($row['Pregnancy outcome1']);
        $this->_2NDFET->setDbValue($row['2ND FET']);
        $this->AFTERHYSTEROSCOPY1->setDbValue($row['AFTER HYSTEROSCOPY1']);
        $this->AFTERERA1->setDbValue($row['AFTER ERA1']);
        $this->ERA1->setDbValue($row['ERA1']);
        $this->HRT1->setDbValue($row['HRT1']);
        $this->XGRASTPRP1->setDbValue($row['XGRAST/PRP1']);
        $this->NUMBEROFEMBRYOS->setDbValue($row['NUMBER OF EMBRYOS']);
        $this->EMBRYODETAILSDAY356ABC->setDbValue($row['EMBRYO DETAILS DAY 3/ 5,/6 A, B, C']);
        $this->INTRALIPIDANDBARGLOBIN->setDbValue($row['INTRALIPID AND BARGLOBIN']);
        $this->LMWH40MG1->setDbValue($row['LMWH 40MG1']);
        $this->hCG1->setDbValue($row['ß-hCG1']);
        $this->Implantationrate2->setDbValue($row['Implantation rate2']);
        $this->Ectopic2->setDbValue($row['Ectopic2']);
        $this->Typeofpreg2->setDbValue($row['Type of preg2']);
        $this->ANCA->setDbValue($row['ANCA']);
        $this->anomalies1->setDbValue($row['anomalies1']);
        $this->babywt1->setDbValue($row['baby wt1']);
        $this->GAatdelivery2->setDbValue($row['GA at delivery2']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // RIDNO

        // Treatment

        // Origin

        // MaleIndications

        // FemaleIndications

        // PatientName

        // PatientID

        // PartnerName

        // PartnerID

        // A4ICSICycle

        // TotalICSICycle

        // TypeOfInfertility

        // RelevantHistory

        // IUICycles

        // AMH

        // FBMI

        // ANTAGONISTSTARTDAY

        // OvarianSurgery

        // OPUDATE

        // RFSH1

        // RFSH2

        // RFSH3

        // E21

        // Hysteroscopy

        // HospID

        // Fweight

        // AntiTPO

        // AntiTG

        // PatientAge

        // PartnerAge

        // CYCLES

        // MF

        // CauseOfINFERTILITY

        // SIS

        // Scratching

        // Cannulation

        // MEPRATE

        // R.OVARY

        // R.AFC

        // L.OVARY

        // L.AFC

        // LH1

        // E2

        // StemCellInstallation

        // DHEAS

        // Mtorr

        // AMH1

        // LH

        // BMI(MALE)

        // MaleMedicalConditions

        // MaleExamination

        // SpermConcentration

        // SpermMotility(P&NP)

        // SpermMorphology

        // SpermRetrival

        // M.Testosterone

        // DFI

        // PreRX

        // CC 100

        // RFSH1A

        // HMG1

        // RLH

        // HMG_HP

        // day_of_HMG

        // Reason_for_HMG

        // RLH_day

        // DAYSOFSTIMULATION

        // Any change inbetween ( Dose added , day)

        // day of Anta

        // R FSH TD

        // R FSH + HMG TD

        // R FSH + R LH TD

        // HMG TD

        // LH TD

        // D1 LH

        // D1 E2

        // Trigger day E2

        // Trigger day P4

        // Trigger day LH

        // VIT-D

        // TRIGGERR

        // BHCG BEFORE RETRIEVAL

        // LH -12 HRS

        // P4 -12 HRS

        // ET on hCG day

        // ET doppler

        // VI/FI/VFI

        // Endometrial abnormality

        // AFC ON S1

        // TIME OF OPU FROM TRIGGER

        // SPERM TYPE

        // EXPECTED ON TRIGGER DAY

        // OOCYTES RETRIEVED

        // TIME OF DENUDATION

        // M-II

        // MI

        // GV

        // ICSI TIME FORM OPU

        // FERT ( 2 PN )

        // DEG

        // D3 GRADE A

        // D3 GRADE B

        // D3 GRADE C

        // D3 GRADE D

        // USABLE ON DAY 3 ET

        // USABLE ON day 3 FREEZING

        // D5 GARDE A

        // D5 GRADE B

        // D5 GRADE C

        // D5 GRADE D

        // USABLE ON D5 ET

        // USABLE ON D5 FREEZING

        // D6 GRADE A

        // D6 GRADE B

        // D6 GRADE C

        // D6 GRADE D

        // D6 USABLE EMBRYO ET

        // D6 USABLE FREEZING

        // TOTAL BLAST

        // PGS

        // REMARKS

        // PU - D/B

        // ICSI D/B

        // VIT D/B

        // ET D/B

        // LAB COMMENTS

        // Reason for no FRESH transfer

        // No of embryos transferred Day 3/5, A,B,C

        // EMBRYOS PENDING

        // DAY OF TRANSFER

        // H/D sperm

        // Comments

        // sc progesterone

        // Natural micronised 400mg bd + duphaston 10mg bd

        // CRINONE

        // progynova

        // Heparin

        // cabergolin

        // Antagonist

        // OHSS

        // Complications

        // LP bleeding

        // ß-hCG

        // Implantation rate

        // Ectopic

        // Type of preg

        // ANC

        // anomalies

        // baby wt

        // GA at delivery

        // Pregnancy outcome

        // 1st FET

        // AFTER HYSTEROSCOPY

        // AFTER ERA

        // ERA

        // HRT

        // XGRAST/PRP

        // EMBRYO DETAILS DAY 3/ 5, A, B, C

        // LMWH 40MG

        // ß-hCG2

        // Implantation rate1

        // Ectopic1

        // Type of pregA

        // ANC1

        // anomalies2

        // baby wt2

        // GA at delivery1

        // Pregnancy outcome1

        // 2ND FET

        // AFTER HYSTEROSCOPY1

        // AFTER ERA1

        // ERA1

        // HRT1

        // XGRAST/PRP1

        // NUMBER OF EMBRYOS

        // EMBRYO DETAILS DAY 3/ 5,/6 A, B, C

        // INTRALIPID AND BARGLOBIN

        // LMWH 40MG1

        // ß-hCG1

        // Implantation rate2

        // Ectopic2

        // Type of preg2

        // ANCA

        // anomalies1

        // baby wt1

        // GA at delivery2

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // RIDNO
        $this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
        $this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
        $this->RIDNO->ViewCustomAttributes = "";

        // Treatment
        $this->Treatment->ViewValue = $this->Treatment->CurrentValue;
        $this->Treatment->ViewCustomAttributes = "";

        // Origin
        $this->Origin->ViewValue = $this->Origin->CurrentValue;
        $this->Origin->ViewCustomAttributes = "";

        // MaleIndications
        $this->MaleIndications->ViewValue = $this->MaleIndications->CurrentValue;
        $this->MaleIndications->ViewCustomAttributes = "";

        // FemaleIndications
        $this->FemaleIndications->ViewValue = $this->FemaleIndications->CurrentValue;
        $this->FemaleIndications->ViewCustomAttributes = "";

        // PatientName
        $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
        $this->PatientName->ViewCustomAttributes = "";

        // PatientID
        $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
        $this->PatientID->ViewCustomAttributes = "";

        // PartnerName
        $this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
        $this->PartnerName->ViewCustomAttributes = "";

        // PartnerID
        $this->PartnerID->ViewValue = $this->PartnerID->CurrentValue;
        $this->PartnerID->ViewCustomAttributes = "";

        // A4ICSICycle
        $this->A4ICSICycle->ViewValue = $this->A4ICSICycle->CurrentValue;
        $this->A4ICSICycle->ViewCustomAttributes = "";

        // TotalICSICycle
        $this->TotalICSICycle->ViewValue = $this->TotalICSICycle->CurrentValue;
        $this->TotalICSICycle->ViewCustomAttributes = "";

        // TypeOfInfertility
        $this->TypeOfInfertility->ViewValue = $this->TypeOfInfertility->CurrentValue;
        $this->TypeOfInfertility->ViewCustomAttributes = "";

        // RelevantHistory
        $this->RelevantHistory->ViewValue = $this->RelevantHistory->CurrentValue;
        $this->RelevantHistory->ViewCustomAttributes = "";

        // IUICycles
        $this->IUICycles->ViewValue = $this->IUICycles->CurrentValue;
        $this->IUICycles->ViewCustomAttributes = "";

        // AMH
        $this->AMH->ViewValue = $this->AMH->CurrentValue;
        $this->AMH->ViewCustomAttributes = "";

        // FBMI
        $this->FBMI->ViewValue = $this->FBMI->CurrentValue;
        $this->FBMI->ViewCustomAttributes = "";

        // ANTAGONISTSTARTDAY
        $this->ANTAGONISTSTARTDAY->ViewValue = $this->ANTAGONISTSTARTDAY->CurrentValue;
        $this->ANTAGONISTSTARTDAY->ViewCustomAttributes = "";

        // OvarianSurgery
        $this->OvarianSurgery->ViewValue = $this->OvarianSurgery->CurrentValue;
        $this->OvarianSurgery->ViewCustomAttributes = "";

        // OPUDATE
        $this->OPUDATE->ViewValue = $this->OPUDATE->CurrentValue;
        $this->OPUDATE->ViewValue = FormatDateTime($this->OPUDATE->ViewValue, 0);
        $this->OPUDATE->ViewCustomAttributes = "";

        // RFSH1
        $this->RFSH1->ViewValue = $this->RFSH1->CurrentValue;
        $this->RFSH1->ViewCustomAttributes = "";

        // RFSH2
        $this->RFSH2->ViewValue = $this->RFSH2->CurrentValue;
        $this->RFSH2->ViewCustomAttributes = "";

        // RFSH3
        $this->RFSH3->ViewValue = $this->RFSH3->CurrentValue;
        $this->RFSH3->ViewCustomAttributes = "";

        // E21
        $this->E21->ViewValue = $this->E21->CurrentValue;
        $this->E21->ViewCustomAttributes = "";

        // Hysteroscopy
        $this->Hysteroscopy->ViewValue = $this->Hysteroscopy->CurrentValue;
        $this->Hysteroscopy->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

        // Fweight
        $this->Fweight->ViewValue = $this->Fweight->CurrentValue;
        $this->Fweight->ViewCustomAttributes = "";

        // AntiTPO
        $this->AntiTPO->ViewValue = $this->AntiTPO->CurrentValue;
        $this->AntiTPO->ViewCustomAttributes = "";

        // AntiTG
        $this->AntiTG->ViewValue = $this->AntiTG->CurrentValue;
        $this->AntiTG->ViewCustomAttributes = "";

        // PatientAge
        $this->PatientAge->ViewValue = $this->PatientAge->CurrentValue;
        $this->PatientAge->ViewCustomAttributes = "";

        // PartnerAge
        $this->PartnerAge->ViewValue = $this->PartnerAge->CurrentValue;
        $this->PartnerAge->ViewCustomAttributes = "";

        // CYCLES
        $this->CYCLES->ViewValue = $this->CYCLES->CurrentValue;
        $this->CYCLES->ViewCustomAttributes = "";

        // MF
        $this->MF->ViewValue = $this->MF->CurrentValue;
        $this->MF->ViewCustomAttributes = "";

        // CauseOfINFERTILITY
        $this->CauseOfINFERTILITY->ViewValue = $this->CauseOfINFERTILITY->CurrentValue;
        $this->CauseOfINFERTILITY->ViewCustomAttributes = "";

        // SIS
        $this->SIS->ViewValue = $this->SIS->CurrentValue;
        $this->SIS->ViewCustomAttributes = "";

        // Scratching
        $this->Scratching->ViewValue = $this->Scratching->CurrentValue;
        $this->Scratching->ViewCustomAttributes = "";

        // Cannulation
        $this->Cannulation->ViewValue = $this->Cannulation->CurrentValue;
        $this->Cannulation->ViewCustomAttributes = "";

        // MEPRATE
        $this->MEPRATE->ViewValue = $this->MEPRATE->CurrentValue;
        $this->MEPRATE->ViewCustomAttributes = "";

        // R.OVARY
        $this->ROVARY->ViewValue = $this->ROVARY->CurrentValue;
        $this->ROVARY->ViewCustomAttributes = "";

        // R.AFC
        $this->RAFC->ViewValue = $this->RAFC->CurrentValue;
        $this->RAFC->ViewCustomAttributes = "";

        // L.OVARY
        $this->LOVARY->ViewValue = $this->LOVARY->CurrentValue;
        $this->LOVARY->ViewCustomAttributes = "";

        // L.AFC
        $this->LAFC->ViewValue = $this->LAFC->CurrentValue;
        $this->LAFC->ViewCustomAttributes = "";

        // LH1
        $this->LH1->ViewValue = $this->LH1->CurrentValue;
        $this->LH1->ViewCustomAttributes = "";

        // E2
        $this->E2->ViewValue = $this->E2->CurrentValue;
        $this->E2->ViewCustomAttributes = "";

        // StemCellInstallation
        $this->StemCellInstallation->ViewValue = $this->StemCellInstallation->CurrentValue;
        $this->StemCellInstallation->ViewCustomAttributes = "";

        // DHEAS
        $this->DHEAS->ViewValue = $this->DHEAS->CurrentValue;
        $this->DHEAS->ViewCustomAttributes = "";

        // Mtorr
        $this->Mtorr->ViewValue = $this->Mtorr->CurrentValue;
        $this->Mtorr->ViewCustomAttributes = "";

        // AMH1
        $this->AMH1->ViewValue = $this->AMH1->CurrentValue;
        $this->AMH1->ViewCustomAttributes = "";

        // LH
        $this->LH->ViewValue = $this->LH->CurrentValue;
        $this->LH->ViewCustomAttributes = "";

        // BMI(MALE)
        $this->BMIMALE->ViewValue = $this->BMIMALE->CurrentValue;
        $this->BMIMALE->ViewCustomAttributes = "";

        // MaleMedicalConditions
        $this->MaleMedicalConditions->ViewValue = $this->MaleMedicalConditions->CurrentValue;
        $this->MaleMedicalConditions->ViewCustomAttributes = "";

        // MaleExamination
        $this->MaleExamination->ViewValue = $this->MaleExamination->CurrentValue;
        $this->MaleExamination->ViewCustomAttributes = "";

        // SpermConcentration
        $this->SpermConcentration->ViewValue = $this->SpermConcentration->CurrentValue;
        $this->SpermConcentration->ViewCustomAttributes = "";

        // SpermMotility(P&NP)
        $this->SpermMotilityPNP->ViewValue = $this->SpermMotilityPNP->CurrentValue;
        $this->SpermMotilityPNP->ViewCustomAttributes = "";

        // SpermMorphology
        $this->SpermMorphology->ViewValue = $this->SpermMorphology->CurrentValue;
        $this->SpermMorphology->ViewCustomAttributes = "";

        // SpermRetrival
        $this->SpermRetrival->ViewValue = $this->SpermRetrival->CurrentValue;
        $this->SpermRetrival->ViewCustomAttributes = "";

        // M.Testosterone
        $this->MTestosterone->ViewValue = $this->MTestosterone->CurrentValue;
        $this->MTestosterone->ViewCustomAttributes = "";

        // DFI
        $this->DFI->ViewValue = $this->DFI->CurrentValue;
        $this->DFI->ViewCustomAttributes = "";

        // PreRX
        $this->PreRX->ViewValue = $this->PreRX->CurrentValue;
        $this->PreRX->ViewCustomAttributes = "";

        // CC 100
        $this->CC100->ViewValue = $this->CC100->CurrentValue;
        $this->CC100->ViewCustomAttributes = "";

        // RFSH1A
        $this->RFSH1A->ViewValue = $this->RFSH1A->CurrentValue;
        $this->RFSH1A->ViewCustomAttributes = "";

        // HMG1
        $this->HMG1->ViewValue = $this->HMG1->CurrentValue;
        $this->HMG1->ViewCustomAttributes = "";

        // RLH
        $this->RLH->ViewValue = $this->RLH->CurrentValue;
        $this->RLH->ViewCustomAttributes = "";

        // HMG_HP
        $this->HMG_HP->ViewValue = $this->HMG_HP->CurrentValue;
        $this->HMG_HP->ViewCustomAttributes = "";

        // day_of_HMG
        $this->day_of_HMG->ViewValue = $this->day_of_HMG->CurrentValue;
        $this->day_of_HMG->ViewCustomAttributes = "";

        // Reason_for_HMG
        $this->Reason_for_HMG->ViewValue = $this->Reason_for_HMG->CurrentValue;
        $this->Reason_for_HMG->ViewCustomAttributes = "";

        // RLH_day
        $this->RLH_day->ViewValue = $this->RLH_day->CurrentValue;
        $this->RLH_day->ViewCustomAttributes = "";

        // DAYSOFSTIMULATION
        $this->DAYSOFSTIMULATION->ViewValue = $this->DAYSOFSTIMULATION->CurrentValue;
        $this->DAYSOFSTIMULATION->ViewCustomAttributes = "";

        // Any change inbetween ( Dose added , day)
        $this->AnychangeinbetweenDoseaddedday->ViewValue = $this->AnychangeinbetweenDoseaddedday->CurrentValue;
        $this->AnychangeinbetweenDoseaddedday->ViewCustomAttributes = "";

        // day of Anta
        $this->dayofAnta->ViewValue = $this->dayofAnta->CurrentValue;
        $this->dayofAnta->ViewCustomAttributes = "";

        // R FSH TD
        $this->RFSHTD->ViewValue = $this->RFSHTD->CurrentValue;
        $this->RFSHTD->ViewCustomAttributes = "";

        // R FSH + HMG TD
        $this->RFSHHMGTD->ViewValue = $this->RFSHHMGTD->CurrentValue;
        $this->RFSHHMGTD->ViewCustomAttributes = "";

        // R FSH + R LH TD
        $this->RFSHRLHTD->ViewValue = $this->RFSHRLHTD->CurrentValue;
        $this->RFSHRLHTD->ViewCustomAttributes = "";

        // HMG TD
        $this->HMGTD->ViewValue = $this->HMGTD->CurrentValue;
        $this->HMGTD->ViewCustomAttributes = "";

        // LH TD
        $this->LHTD->ViewValue = $this->LHTD->CurrentValue;
        $this->LHTD->ViewCustomAttributes = "";

        // D1 LH
        $this->D1LH->ViewValue = $this->D1LH->CurrentValue;
        $this->D1LH->ViewCustomAttributes = "";

        // D1 E2
        $this->D1E2->ViewValue = $this->D1E2->CurrentValue;
        $this->D1E2->ViewCustomAttributes = "";

        // Trigger day E2
        $this->TriggerdayE2->ViewValue = $this->TriggerdayE2->CurrentValue;
        $this->TriggerdayE2->ViewCustomAttributes = "";

        // Trigger day P4
        $this->TriggerdayP4->ViewValue = $this->TriggerdayP4->CurrentValue;
        $this->TriggerdayP4->ViewCustomAttributes = "";

        // Trigger day LH
        $this->TriggerdayLH->ViewValue = $this->TriggerdayLH->CurrentValue;
        $this->TriggerdayLH->ViewCustomAttributes = "";

        // VIT-D
        $this->VITD->ViewValue = $this->VITD->CurrentValue;
        $this->VITD->ViewCustomAttributes = "";

        // TRIGGERR
        $this->TRIGGERR->ViewValue = $this->TRIGGERR->CurrentValue;
        $this->TRIGGERR->ViewCustomAttributes = "";

        // BHCG BEFORE RETRIEVAL
        $this->BHCGBEFORERETRIEVAL->ViewValue = $this->BHCGBEFORERETRIEVAL->CurrentValue;
        $this->BHCGBEFORERETRIEVAL->ViewCustomAttributes = "";

        // LH -12 HRS
        $this->LH12HRS->ViewValue = $this->LH12HRS->CurrentValue;
        $this->LH12HRS->ViewCustomAttributes = "";

        // P4 -12 HRS
        $this->P412HRS->ViewValue = $this->P412HRS->CurrentValue;
        $this->P412HRS->ViewCustomAttributes = "";

        // ET on hCG day
        $this->ETonhCGday->ViewValue = $this->ETonhCGday->CurrentValue;
        $this->ETonhCGday->ViewCustomAttributes = "";

        // ET doppler
        $this->ETdoppler->ViewValue = $this->ETdoppler->CurrentValue;
        $this->ETdoppler->ViewCustomAttributes = "";

        // VI/FI/VFI
        $this->VIFIVFI->ViewValue = $this->VIFIVFI->CurrentValue;
        $this->VIFIVFI->ViewCustomAttributes = "";

        // Endometrial abnormality
        $this->Endometrialabnormality->ViewValue = $this->Endometrialabnormality->CurrentValue;
        $this->Endometrialabnormality->ViewCustomAttributes = "";

        // AFC ON S1
        $this->AFCONS1->ViewValue = $this->AFCONS1->CurrentValue;
        $this->AFCONS1->ViewCustomAttributes = "";

        // TIME OF OPU FROM TRIGGER
        $this->TIMEOFOPUFROMTRIGGER->ViewValue = $this->TIMEOFOPUFROMTRIGGER->CurrentValue;
        $this->TIMEOFOPUFROMTRIGGER->ViewCustomAttributes = "";

        // SPERM TYPE
        $this->SPERMTYPE->ViewValue = $this->SPERMTYPE->CurrentValue;
        $this->SPERMTYPE->ViewCustomAttributes = "";

        // EXPECTED ON TRIGGER DAY
        $this->EXPECTEDONTRIGGERDAY->ViewValue = $this->EXPECTEDONTRIGGERDAY->CurrentValue;
        $this->EXPECTEDONTRIGGERDAY->ViewCustomAttributes = "";

        // OOCYTES RETRIEVED
        $this->OOCYTESRETRIEVED->ViewValue = $this->OOCYTESRETRIEVED->CurrentValue;
        $this->OOCYTESRETRIEVED->ViewCustomAttributes = "";

        // TIME OF DENUDATION
        $this->TIMEOFDENUDATION->ViewValue = $this->TIMEOFDENUDATION->CurrentValue;
        $this->TIMEOFDENUDATION->ViewCustomAttributes = "";

        // M-II
        $this->MII->ViewValue = $this->MII->CurrentValue;
        $this->MII->ViewCustomAttributes = "";

        // MI
        $this->MI->ViewValue = $this->MI->CurrentValue;
        $this->MI->ViewCustomAttributes = "";

        // GV
        $this->GV->ViewValue = $this->GV->CurrentValue;
        $this->GV->ViewCustomAttributes = "";

        // ICSI TIME FORM OPU
        $this->ICSITIMEFORMOPU->ViewValue = $this->ICSITIMEFORMOPU->CurrentValue;
        $this->ICSITIMEFORMOPU->ViewCustomAttributes = "";

        // FERT ( 2 PN )
        $this->FERT2PN->ViewValue = $this->FERT2PN->CurrentValue;
        $this->FERT2PN->ViewCustomAttributes = "";

        // DEG
        $this->DEG->ViewValue = $this->DEG->CurrentValue;
        $this->DEG->ViewCustomAttributes = "";

        // D3 GRADE A
        $this->D3GRADEA->ViewValue = $this->D3GRADEA->CurrentValue;
        $this->D3GRADEA->ViewCustomAttributes = "";

        // D3 GRADE B
        $this->D3GRADEB->ViewValue = $this->D3GRADEB->CurrentValue;
        $this->D3GRADEB->ViewCustomAttributes = "";

        // D3 GRADE C
        $this->D3GRADEC->ViewValue = $this->D3GRADEC->CurrentValue;
        $this->D3GRADEC->ViewCustomAttributes = "";

        // D3 GRADE D
        $this->D3GRADED->ViewValue = $this->D3GRADED->CurrentValue;
        $this->D3GRADED->ViewCustomAttributes = "";

        // USABLE ON DAY 3 ET
        $this->USABLEONDAY3ET->ViewValue = $this->USABLEONDAY3ET->CurrentValue;
        $this->USABLEONDAY3ET->ViewCustomAttributes = "";

        // USABLE ON day 3 FREEZING
        $this->USABLEONday3FREEZING->ViewValue = $this->USABLEONday3FREEZING->CurrentValue;
        $this->USABLEONday3FREEZING->ViewCustomAttributes = "";

        // D5 GARDE A
        $this->D5GARDEA->ViewValue = $this->D5GARDEA->CurrentValue;
        $this->D5GARDEA->ViewCustomAttributes = "";

        // D5 GRADE B
        $this->D5GRADEB->ViewValue = $this->D5GRADEB->CurrentValue;
        $this->D5GRADEB->ViewCustomAttributes = "";

        // D5 GRADE C
        $this->D5GRADEC->ViewValue = $this->D5GRADEC->CurrentValue;
        $this->D5GRADEC->ViewCustomAttributes = "";

        // D5 GRADE D
        $this->D5GRADED->ViewValue = $this->D5GRADED->CurrentValue;
        $this->D5GRADED->ViewCustomAttributes = "";

        // USABLE ON D5 ET
        $this->USABLEOND5ET->ViewValue = $this->USABLEOND5ET->CurrentValue;
        $this->USABLEOND5ET->ViewCustomAttributes = "";

        // USABLE ON D5 FREEZING
        $this->USABLEOND5FREEZING->ViewValue = $this->USABLEOND5FREEZING->CurrentValue;
        $this->USABLEOND5FREEZING->ViewCustomAttributes = "";

        // D6 GRADE A
        $this->D6GRADEA->ViewValue = $this->D6GRADEA->CurrentValue;
        $this->D6GRADEA->ViewCustomAttributes = "";

        // D6 GRADE B
        $this->D6GRADEB->ViewValue = $this->D6GRADEB->CurrentValue;
        $this->D6GRADEB->ViewCustomAttributes = "";

        // D6 GRADE C
        $this->D6GRADEC->ViewValue = $this->D6GRADEC->CurrentValue;
        $this->D6GRADEC->ViewCustomAttributes = "";

        // D6 GRADE D
        $this->D6GRADED->ViewValue = $this->D6GRADED->CurrentValue;
        $this->D6GRADED->ViewCustomAttributes = "";

        // D6 USABLE EMBRYO ET
        $this->D6USABLEEMBRYOET->ViewValue = $this->D6USABLEEMBRYOET->CurrentValue;
        $this->D6USABLEEMBRYOET->ViewCustomAttributes = "";

        // D6 USABLE FREEZING
        $this->D6USABLEFREEZING->ViewValue = $this->D6USABLEFREEZING->CurrentValue;
        $this->D6USABLEFREEZING->ViewCustomAttributes = "";

        // TOTAL BLAST
        $this->TOTALBLAST->ViewValue = $this->TOTALBLAST->CurrentValue;
        $this->TOTALBLAST->ViewCustomAttributes = "";

        // PGS
        $this->PGS->ViewValue = $this->PGS->CurrentValue;
        $this->PGS->ViewCustomAttributes = "";

        // REMARKS
        $this->REMARKS->ViewValue = $this->REMARKS->CurrentValue;
        $this->REMARKS->ViewCustomAttributes = "";

        // PU - D/B
        $this->PUDB->ViewValue = $this->PUDB->CurrentValue;
        $this->PUDB->ViewCustomAttributes = "";

        // ICSI D/B
        $this->ICSIDB->ViewValue = $this->ICSIDB->CurrentValue;
        $this->ICSIDB->ViewCustomAttributes = "";

        // VIT D/B
        $this->VITDB->ViewValue = $this->VITDB->CurrentValue;
        $this->VITDB->ViewCustomAttributes = "";

        // ET D/B
        $this->ETDB->ViewValue = $this->ETDB->CurrentValue;
        $this->ETDB->ViewCustomAttributes = "";

        // LAB COMMENTS
        $this->LABCOMMENTS->ViewValue = $this->LABCOMMENTS->CurrentValue;
        $this->LABCOMMENTS->ViewCustomAttributes = "";

        // Reason for no FRESH transfer
        $this->ReasonfornoFRESHtransfer->ViewValue = $this->ReasonfornoFRESHtransfer->CurrentValue;
        $this->ReasonfornoFRESHtransfer->ViewCustomAttributes = "";

        // No of embryos transferred Day 3/5, A,B,C
        $this->NoofembryostransferredDay35ABC->ViewValue = $this->NoofembryostransferredDay35ABC->CurrentValue;
        $this->NoofembryostransferredDay35ABC->ViewCustomAttributes = "";

        // EMBRYOS PENDING
        $this->EMBRYOSPENDING->ViewValue = $this->EMBRYOSPENDING->CurrentValue;
        $this->EMBRYOSPENDING->ViewCustomAttributes = "";

        // DAY OF TRANSFER
        $this->DAYOFTRANSFER->ViewValue = $this->DAYOFTRANSFER->CurrentValue;
        $this->DAYOFTRANSFER->ViewCustomAttributes = "";

        // H/D sperm
        $this->HDsperm->ViewValue = $this->HDsperm->CurrentValue;
        $this->HDsperm->ViewCustomAttributes = "";

        // Comments
        $this->Comments->ViewValue = $this->Comments->CurrentValue;
        $this->Comments->ViewCustomAttributes = "";

        // sc progesterone
        $this->scprogesterone->ViewValue = $this->scprogesterone->CurrentValue;
        $this->scprogesterone->ViewCustomAttributes = "";

        // Natural micronised 400mg bd + duphaston 10mg bd
        $this->Naturalmicronised400mgbdduphaston10mgbd->ViewValue = $this->Naturalmicronised400mgbdduphaston10mgbd->CurrentValue;
        $this->Naturalmicronised400mgbdduphaston10mgbd->ViewCustomAttributes = "";

        // CRINONE
        $this->CRINONE->ViewValue = $this->CRINONE->CurrentValue;
        $this->CRINONE->ViewCustomAttributes = "";

        // progynova
        $this->progynova->ViewValue = $this->progynova->CurrentValue;
        $this->progynova->ViewCustomAttributes = "";

        // Heparin
        $this->Heparin->ViewValue = $this->Heparin->CurrentValue;
        $this->Heparin->ViewCustomAttributes = "";

        // cabergolin
        $this->cabergolin->ViewValue = $this->cabergolin->CurrentValue;
        $this->cabergolin->ViewCustomAttributes = "";

        // Antagonist
        $this->Antagonist->ViewValue = $this->Antagonist->CurrentValue;
        $this->Antagonist->ViewCustomAttributes = "";

        // OHSS
        $this->OHSS->ViewValue = $this->OHSS->CurrentValue;
        $this->OHSS->ViewCustomAttributes = "";

        // Complications
        $this->Complications->ViewValue = $this->Complications->CurrentValue;
        $this->Complications->ViewCustomAttributes = "";

        // LP bleeding
        $this->LPbleeding->ViewValue = $this->LPbleeding->CurrentValue;
        $this->LPbleeding->ViewCustomAttributes = "";

        // ß-hCG
        $this->hCG->ViewValue = $this->hCG->CurrentValue;
        $this->hCG->ViewCustomAttributes = "";

        // Implantation rate
        $this->Implantationrate->ViewValue = $this->Implantationrate->CurrentValue;
        $this->Implantationrate->ViewCustomAttributes = "";

        // Ectopic
        $this->Ectopic->ViewValue = $this->Ectopic->CurrentValue;
        $this->Ectopic->ViewCustomAttributes = "";

        // Type of preg
        $this->Typeofpreg->ViewValue = $this->Typeofpreg->CurrentValue;
        $this->Typeofpreg->ViewCustomAttributes = "";

        // ANC
        $this->ANC->ViewValue = $this->ANC->CurrentValue;
        $this->ANC->ViewCustomAttributes = "";

        // anomalies
        $this->anomalies->ViewValue = $this->anomalies->CurrentValue;
        $this->anomalies->ViewCustomAttributes = "";

        // baby wt
        $this->babywt->ViewValue = $this->babywt->CurrentValue;
        $this->babywt->ViewCustomAttributes = "";

        // GA at delivery
        $this->GAatdelivery->ViewValue = $this->GAatdelivery->CurrentValue;
        $this->GAatdelivery->ViewCustomAttributes = "";

        // Pregnancy outcome
        $this->Pregnancyoutcome->ViewValue = $this->Pregnancyoutcome->CurrentValue;
        $this->Pregnancyoutcome->ViewCustomAttributes = "";

        // 1st FET
        $this->_1stFET->ViewValue = $this->_1stFET->CurrentValue;
        $this->_1stFET->ViewCustomAttributes = "";

        // AFTER HYSTEROSCOPY
        $this->AFTERHYSTEROSCOPY->ViewValue = $this->AFTERHYSTEROSCOPY->CurrentValue;
        $this->AFTERHYSTEROSCOPY->ViewCustomAttributes = "";

        // AFTER ERA
        $this->AFTERERA->ViewValue = $this->AFTERERA->CurrentValue;
        $this->AFTERERA->ViewCustomAttributes = "";

        // ERA
        $this->ERA->ViewValue = $this->ERA->CurrentValue;
        $this->ERA->ViewCustomAttributes = "";

        // HRT
        $this->HRT->ViewValue = $this->HRT->CurrentValue;
        $this->HRT->ViewCustomAttributes = "";

        // XGRAST/PRP
        $this->XGRASTPRP->ViewValue = $this->XGRASTPRP->CurrentValue;
        $this->XGRASTPRP->ViewCustomAttributes = "";

        // EMBRYO DETAILS DAY 3/ 5, A, B, C
        $this->EMBRYODETAILSDAY35ABC->ViewValue = $this->EMBRYODETAILSDAY35ABC->CurrentValue;
        $this->EMBRYODETAILSDAY35ABC->ViewCustomAttributes = "";

        // LMWH 40MG
        $this->LMWH40MG->ViewValue = $this->LMWH40MG->CurrentValue;
        $this->LMWH40MG->ViewCustomAttributes = "";

        // ß-hCG2
        $this->hCG2->ViewValue = $this->hCG2->CurrentValue;
        $this->hCG2->ViewCustomAttributes = "";

        // Implantation rate1
        $this->Implantationrate1->ViewValue = $this->Implantationrate1->CurrentValue;
        $this->Implantationrate1->ViewCustomAttributes = "";

        // Ectopic1
        $this->Ectopic1->ViewValue = $this->Ectopic1->CurrentValue;
        $this->Ectopic1->ViewCustomAttributes = "";

        // Type of pregA
        $this->TypeofpregA->ViewValue = $this->TypeofpregA->CurrentValue;
        $this->TypeofpregA->ViewCustomAttributes = "";

        // ANC1
        $this->ANC1->ViewValue = $this->ANC1->CurrentValue;
        $this->ANC1->ViewCustomAttributes = "";

        // anomalies2
        $this->anomalies2->ViewValue = $this->anomalies2->CurrentValue;
        $this->anomalies2->ViewCustomAttributes = "";

        // baby wt2
        $this->babywt2->ViewValue = $this->babywt2->CurrentValue;
        $this->babywt2->ViewCustomAttributes = "";

        // GA at delivery1
        $this->GAatdelivery1->ViewValue = $this->GAatdelivery1->CurrentValue;
        $this->GAatdelivery1->ViewCustomAttributes = "";

        // Pregnancy outcome1
        $this->Pregnancyoutcome1->ViewValue = $this->Pregnancyoutcome1->CurrentValue;
        $this->Pregnancyoutcome1->ViewCustomAttributes = "";

        // 2ND FET
        $this->_2NDFET->ViewValue = $this->_2NDFET->CurrentValue;
        $this->_2NDFET->ViewCustomAttributes = "";

        // AFTER HYSTEROSCOPY1
        $this->AFTERHYSTEROSCOPY1->ViewValue = $this->AFTERHYSTEROSCOPY1->CurrentValue;
        $this->AFTERHYSTEROSCOPY1->ViewCustomAttributes = "";

        // AFTER ERA1
        $this->AFTERERA1->ViewValue = $this->AFTERERA1->CurrentValue;
        $this->AFTERERA1->ViewCustomAttributes = "";

        // ERA1
        $this->ERA1->ViewValue = $this->ERA1->CurrentValue;
        $this->ERA1->ViewCustomAttributes = "";

        // HRT1
        $this->HRT1->ViewValue = $this->HRT1->CurrentValue;
        $this->HRT1->ViewCustomAttributes = "";

        // XGRAST/PRP1
        $this->XGRASTPRP1->ViewValue = $this->XGRASTPRP1->CurrentValue;
        $this->XGRASTPRP1->ViewCustomAttributes = "";

        // NUMBER OF EMBRYOS
        $this->NUMBEROFEMBRYOS->ViewValue = $this->NUMBEROFEMBRYOS->CurrentValue;
        $this->NUMBEROFEMBRYOS->ViewCustomAttributes = "";

        // EMBRYO DETAILS DAY 3/ 5,/6 A, B, C
        $this->EMBRYODETAILSDAY356ABC->ViewValue = $this->EMBRYODETAILSDAY356ABC->CurrentValue;
        $this->EMBRYODETAILSDAY356ABC->ViewCustomAttributes = "";

        // INTRALIPID AND BARGLOBIN
        $this->INTRALIPIDANDBARGLOBIN->ViewValue = $this->INTRALIPIDANDBARGLOBIN->CurrentValue;
        $this->INTRALIPIDANDBARGLOBIN->ViewCustomAttributes = "";

        // LMWH 40MG1
        $this->LMWH40MG1->ViewValue = $this->LMWH40MG1->CurrentValue;
        $this->LMWH40MG1->ViewCustomAttributes = "";

        // ß-hCG1
        $this->hCG1->ViewValue = $this->hCG1->CurrentValue;
        $this->hCG1->ViewCustomAttributes = "";

        // Implantation rate2
        $this->Implantationrate2->ViewValue = $this->Implantationrate2->CurrentValue;
        $this->Implantationrate2->ViewCustomAttributes = "";

        // Ectopic2
        $this->Ectopic2->ViewValue = $this->Ectopic2->CurrentValue;
        $this->Ectopic2->ViewCustomAttributes = "";

        // Type of preg2
        $this->Typeofpreg2->ViewValue = $this->Typeofpreg2->CurrentValue;
        $this->Typeofpreg2->ViewCustomAttributes = "";

        // ANCA
        $this->ANCA->ViewValue = $this->ANCA->CurrentValue;
        $this->ANCA->ViewCustomAttributes = "";

        // anomalies1
        $this->anomalies1->ViewValue = $this->anomalies1->CurrentValue;
        $this->anomalies1->ViewCustomAttributes = "";

        // baby wt1
        $this->babywt1->ViewValue = $this->babywt1->CurrentValue;
        $this->babywt1->ViewCustomAttributes = "";

        // GA at delivery2
        $this->GAatdelivery2->ViewValue = $this->GAatdelivery2->CurrentValue;
        $this->GAatdelivery2->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // RIDNO
        $this->RIDNO->LinkCustomAttributes = "";
        $this->RIDNO->HrefValue = "";
        $this->RIDNO->TooltipValue = "";

        // Treatment
        $this->Treatment->LinkCustomAttributes = "";
        $this->Treatment->HrefValue = "";
        $this->Treatment->TooltipValue = "";

        // Origin
        $this->Origin->LinkCustomAttributes = "";
        $this->Origin->HrefValue = "";
        $this->Origin->TooltipValue = "";

        // MaleIndications
        $this->MaleIndications->LinkCustomAttributes = "";
        $this->MaleIndications->HrefValue = "";
        $this->MaleIndications->TooltipValue = "";

        // FemaleIndications
        $this->FemaleIndications->LinkCustomAttributes = "";
        $this->FemaleIndications->HrefValue = "";
        $this->FemaleIndications->TooltipValue = "";

        // PatientName
        $this->PatientName->LinkCustomAttributes = "";
        $this->PatientName->HrefValue = "";
        $this->PatientName->TooltipValue = "";

        // PatientID
        $this->PatientID->LinkCustomAttributes = "";
        $this->PatientID->HrefValue = "";
        $this->PatientID->TooltipValue = "";

        // PartnerName
        $this->PartnerName->LinkCustomAttributes = "";
        $this->PartnerName->HrefValue = "";
        $this->PartnerName->TooltipValue = "";

        // PartnerID
        $this->PartnerID->LinkCustomAttributes = "";
        $this->PartnerID->HrefValue = "";
        $this->PartnerID->TooltipValue = "";

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

        // RelevantHistory
        $this->RelevantHistory->LinkCustomAttributes = "";
        $this->RelevantHistory->HrefValue = "";
        $this->RelevantHistory->TooltipValue = "";

        // IUICycles
        $this->IUICycles->LinkCustomAttributes = "";
        $this->IUICycles->HrefValue = "";
        $this->IUICycles->TooltipValue = "";

        // AMH
        $this->AMH->LinkCustomAttributes = "";
        $this->AMH->HrefValue = "";
        $this->AMH->TooltipValue = "";

        // FBMI
        $this->FBMI->LinkCustomAttributes = "";
        $this->FBMI->HrefValue = "";
        $this->FBMI->TooltipValue = "";

        // ANTAGONISTSTARTDAY
        $this->ANTAGONISTSTARTDAY->LinkCustomAttributes = "";
        $this->ANTAGONISTSTARTDAY->HrefValue = "";
        $this->ANTAGONISTSTARTDAY->TooltipValue = "";

        // OvarianSurgery
        $this->OvarianSurgery->LinkCustomAttributes = "";
        $this->OvarianSurgery->HrefValue = "";
        $this->OvarianSurgery->TooltipValue = "";

        // OPUDATE
        $this->OPUDATE->LinkCustomAttributes = "";
        $this->OPUDATE->HrefValue = "";
        $this->OPUDATE->TooltipValue = "";

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

        // E21
        $this->E21->LinkCustomAttributes = "";
        $this->E21->HrefValue = "";
        $this->E21->TooltipValue = "";

        // Hysteroscopy
        $this->Hysteroscopy->LinkCustomAttributes = "";
        $this->Hysteroscopy->HrefValue = "";
        $this->Hysteroscopy->TooltipValue = "";

        // HospID
        $this->HospID->LinkCustomAttributes = "";
        $this->HospID->HrefValue = "";
        $this->HospID->TooltipValue = "";

        // Fweight
        $this->Fweight->LinkCustomAttributes = "";
        $this->Fweight->HrefValue = "";
        $this->Fweight->TooltipValue = "";

        // AntiTPO
        $this->AntiTPO->LinkCustomAttributes = "";
        $this->AntiTPO->HrefValue = "";
        $this->AntiTPO->TooltipValue = "";

        // AntiTG
        $this->AntiTG->LinkCustomAttributes = "";
        $this->AntiTG->HrefValue = "";
        $this->AntiTG->TooltipValue = "";

        // PatientAge
        $this->PatientAge->LinkCustomAttributes = "";
        $this->PatientAge->HrefValue = "";
        $this->PatientAge->TooltipValue = "";

        // PartnerAge
        $this->PartnerAge->LinkCustomAttributes = "";
        $this->PartnerAge->HrefValue = "";
        $this->PartnerAge->TooltipValue = "";

        // CYCLES
        $this->CYCLES->LinkCustomAttributes = "";
        $this->CYCLES->HrefValue = "";
        $this->CYCLES->TooltipValue = "";

        // MF
        $this->MF->LinkCustomAttributes = "";
        $this->MF->HrefValue = "";
        $this->MF->TooltipValue = "";

        // CauseOfINFERTILITY
        $this->CauseOfINFERTILITY->LinkCustomAttributes = "";
        $this->CauseOfINFERTILITY->HrefValue = "";
        $this->CauseOfINFERTILITY->TooltipValue = "";

        // SIS
        $this->SIS->LinkCustomAttributes = "";
        $this->SIS->HrefValue = "";
        $this->SIS->TooltipValue = "";

        // Scratching
        $this->Scratching->LinkCustomAttributes = "";
        $this->Scratching->HrefValue = "";
        $this->Scratching->TooltipValue = "";

        // Cannulation
        $this->Cannulation->LinkCustomAttributes = "";
        $this->Cannulation->HrefValue = "";
        $this->Cannulation->TooltipValue = "";

        // MEPRATE
        $this->MEPRATE->LinkCustomAttributes = "";
        $this->MEPRATE->HrefValue = "";
        $this->MEPRATE->TooltipValue = "";

        // R.OVARY
        $this->ROVARY->LinkCustomAttributes = "";
        $this->ROVARY->HrefValue = "";
        $this->ROVARY->TooltipValue = "";

        // R.AFC
        $this->RAFC->LinkCustomAttributes = "";
        $this->RAFC->HrefValue = "";
        $this->RAFC->TooltipValue = "";

        // L.OVARY
        $this->LOVARY->LinkCustomAttributes = "";
        $this->LOVARY->HrefValue = "";
        $this->LOVARY->TooltipValue = "";

        // L.AFC
        $this->LAFC->LinkCustomAttributes = "";
        $this->LAFC->HrefValue = "";
        $this->LAFC->TooltipValue = "";

        // LH1
        $this->LH1->LinkCustomAttributes = "";
        $this->LH1->HrefValue = "";
        $this->LH1->TooltipValue = "";

        // E2
        $this->E2->LinkCustomAttributes = "";
        $this->E2->HrefValue = "";
        $this->E2->TooltipValue = "";

        // StemCellInstallation
        $this->StemCellInstallation->LinkCustomAttributes = "";
        $this->StemCellInstallation->HrefValue = "";
        $this->StemCellInstallation->TooltipValue = "";

        // DHEAS
        $this->DHEAS->LinkCustomAttributes = "";
        $this->DHEAS->HrefValue = "";
        $this->DHEAS->TooltipValue = "";

        // Mtorr
        $this->Mtorr->LinkCustomAttributes = "";
        $this->Mtorr->HrefValue = "";
        $this->Mtorr->TooltipValue = "";

        // AMH1
        $this->AMH1->LinkCustomAttributes = "";
        $this->AMH1->HrefValue = "";
        $this->AMH1->TooltipValue = "";

        // LH
        $this->LH->LinkCustomAttributes = "";
        $this->LH->HrefValue = "";
        $this->LH->TooltipValue = "";

        // BMI(MALE)
        $this->BMIMALE->LinkCustomAttributes = "";
        $this->BMIMALE->HrefValue = "";
        $this->BMIMALE->TooltipValue = "";

        // MaleMedicalConditions
        $this->MaleMedicalConditions->LinkCustomAttributes = "";
        $this->MaleMedicalConditions->HrefValue = "";
        $this->MaleMedicalConditions->TooltipValue = "";

        // MaleExamination
        $this->MaleExamination->LinkCustomAttributes = "";
        $this->MaleExamination->HrefValue = "";
        $this->MaleExamination->TooltipValue = "";

        // SpermConcentration
        $this->SpermConcentration->LinkCustomAttributes = "";
        $this->SpermConcentration->HrefValue = "";
        $this->SpermConcentration->TooltipValue = "";

        // SpermMotility(P&NP)
        $this->SpermMotilityPNP->LinkCustomAttributes = "";
        $this->SpermMotilityPNP->HrefValue = "";
        $this->SpermMotilityPNP->TooltipValue = "";

        // SpermMorphology
        $this->SpermMorphology->LinkCustomAttributes = "";
        $this->SpermMorphology->HrefValue = "";
        $this->SpermMorphology->TooltipValue = "";

        // SpermRetrival
        $this->SpermRetrival->LinkCustomAttributes = "";
        $this->SpermRetrival->HrefValue = "";
        $this->SpermRetrival->TooltipValue = "";

        // M.Testosterone
        $this->MTestosterone->LinkCustomAttributes = "";
        $this->MTestosterone->HrefValue = "";
        $this->MTestosterone->TooltipValue = "";

        // DFI
        $this->DFI->LinkCustomAttributes = "";
        $this->DFI->HrefValue = "";
        $this->DFI->TooltipValue = "";

        // PreRX
        $this->PreRX->LinkCustomAttributes = "";
        $this->PreRX->HrefValue = "";
        $this->PreRX->TooltipValue = "";

        // CC 100
        $this->CC100->LinkCustomAttributes = "";
        $this->CC100->HrefValue = "";
        $this->CC100->TooltipValue = "";

        // RFSH1A
        $this->RFSH1A->LinkCustomAttributes = "";
        $this->RFSH1A->HrefValue = "";
        $this->RFSH1A->TooltipValue = "";

        // HMG1
        $this->HMG1->LinkCustomAttributes = "";
        $this->HMG1->HrefValue = "";
        $this->HMG1->TooltipValue = "";

        // RLH
        $this->RLH->LinkCustomAttributes = "";
        $this->RLH->HrefValue = "";
        $this->RLH->TooltipValue = "";

        // HMG_HP
        $this->HMG_HP->LinkCustomAttributes = "";
        $this->HMG_HP->HrefValue = "";
        $this->HMG_HP->TooltipValue = "";

        // day_of_HMG
        $this->day_of_HMG->LinkCustomAttributes = "";
        $this->day_of_HMG->HrefValue = "";
        $this->day_of_HMG->TooltipValue = "";

        // Reason_for_HMG
        $this->Reason_for_HMG->LinkCustomAttributes = "";
        $this->Reason_for_HMG->HrefValue = "";
        $this->Reason_for_HMG->TooltipValue = "";

        // RLH_day
        $this->RLH_day->LinkCustomAttributes = "";
        $this->RLH_day->HrefValue = "";
        $this->RLH_day->TooltipValue = "";

        // DAYSOFSTIMULATION
        $this->DAYSOFSTIMULATION->LinkCustomAttributes = "";
        $this->DAYSOFSTIMULATION->HrefValue = "";
        $this->DAYSOFSTIMULATION->TooltipValue = "";

        // Any change inbetween ( Dose added , day)
        $this->AnychangeinbetweenDoseaddedday->LinkCustomAttributes = "";
        $this->AnychangeinbetweenDoseaddedday->HrefValue = "";
        $this->AnychangeinbetweenDoseaddedday->TooltipValue = "";

        // day of Anta
        $this->dayofAnta->LinkCustomAttributes = "";
        $this->dayofAnta->HrefValue = "";
        $this->dayofAnta->TooltipValue = "";

        // R FSH TD
        $this->RFSHTD->LinkCustomAttributes = "";
        $this->RFSHTD->HrefValue = "";
        $this->RFSHTD->TooltipValue = "";

        // R FSH + HMG TD
        $this->RFSHHMGTD->LinkCustomAttributes = "";
        $this->RFSHHMGTD->HrefValue = "";
        $this->RFSHHMGTD->TooltipValue = "";

        // R FSH + R LH TD
        $this->RFSHRLHTD->LinkCustomAttributes = "";
        $this->RFSHRLHTD->HrefValue = "";
        $this->RFSHRLHTD->TooltipValue = "";

        // HMG TD
        $this->HMGTD->LinkCustomAttributes = "";
        $this->HMGTD->HrefValue = "";
        $this->HMGTD->TooltipValue = "";

        // LH TD
        $this->LHTD->LinkCustomAttributes = "";
        $this->LHTD->HrefValue = "";
        $this->LHTD->TooltipValue = "";

        // D1 LH
        $this->D1LH->LinkCustomAttributes = "";
        $this->D1LH->HrefValue = "";
        $this->D1LH->TooltipValue = "";

        // D1 E2
        $this->D1E2->LinkCustomAttributes = "";
        $this->D1E2->HrefValue = "";
        $this->D1E2->TooltipValue = "";

        // Trigger day E2
        $this->TriggerdayE2->LinkCustomAttributes = "";
        $this->TriggerdayE2->HrefValue = "";
        $this->TriggerdayE2->TooltipValue = "";

        // Trigger day P4
        $this->TriggerdayP4->LinkCustomAttributes = "";
        $this->TriggerdayP4->HrefValue = "";
        $this->TriggerdayP4->TooltipValue = "";

        // Trigger day LH
        $this->TriggerdayLH->LinkCustomAttributes = "";
        $this->TriggerdayLH->HrefValue = "";
        $this->TriggerdayLH->TooltipValue = "";

        // VIT-D
        $this->VITD->LinkCustomAttributes = "";
        $this->VITD->HrefValue = "";
        $this->VITD->TooltipValue = "";

        // TRIGGERR
        $this->TRIGGERR->LinkCustomAttributes = "";
        $this->TRIGGERR->HrefValue = "";
        $this->TRIGGERR->TooltipValue = "";

        // BHCG BEFORE RETRIEVAL
        $this->BHCGBEFORERETRIEVAL->LinkCustomAttributes = "";
        $this->BHCGBEFORERETRIEVAL->HrefValue = "";
        $this->BHCGBEFORERETRIEVAL->TooltipValue = "";

        // LH -12 HRS
        $this->LH12HRS->LinkCustomAttributes = "";
        $this->LH12HRS->HrefValue = "";
        $this->LH12HRS->TooltipValue = "";

        // P4 -12 HRS
        $this->P412HRS->LinkCustomAttributes = "";
        $this->P412HRS->HrefValue = "";
        $this->P412HRS->TooltipValue = "";

        // ET on hCG day
        $this->ETonhCGday->LinkCustomAttributes = "";
        $this->ETonhCGday->HrefValue = "";
        $this->ETonhCGday->TooltipValue = "";

        // ET doppler
        $this->ETdoppler->LinkCustomAttributes = "";
        $this->ETdoppler->HrefValue = "";
        $this->ETdoppler->TooltipValue = "";

        // VI/FI/VFI
        $this->VIFIVFI->LinkCustomAttributes = "";
        $this->VIFIVFI->HrefValue = "";
        $this->VIFIVFI->TooltipValue = "";

        // Endometrial abnormality
        $this->Endometrialabnormality->LinkCustomAttributes = "";
        $this->Endometrialabnormality->HrefValue = "";
        $this->Endometrialabnormality->TooltipValue = "";

        // AFC ON S1
        $this->AFCONS1->LinkCustomAttributes = "";
        $this->AFCONS1->HrefValue = "";
        $this->AFCONS1->TooltipValue = "";

        // TIME OF OPU FROM TRIGGER
        $this->TIMEOFOPUFROMTRIGGER->LinkCustomAttributes = "";
        $this->TIMEOFOPUFROMTRIGGER->HrefValue = "";
        $this->TIMEOFOPUFROMTRIGGER->TooltipValue = "";

        // SPERM TYPE
        $this->SPERMTYPE->LinkCustomAttributes = "";
        $this->SPERMTYPE->HrefValue = "";
        $this->SPERMTYPE->TooltipValue = "";

        // EXPECTED ON TRIGGER DAY
        $this->EXPECTEDONTRIGGERDAY->LinkCustomAttributes = "";
        $this->EXPECTEDONTRIGGERDAY->HrefValue = "";
        $this->EXPECTEDONTRIGGERDAY->TooltipValue = "";

        // OOCYTES RETRIEVED
        $this->OOCYTESRETRIEVED->LinkCustomAttributes = "";
        $this->OOCYTESRETRIEVED->HrefValue = "";
        $this->OOCYTESRETRIEVED->TooltipValue = "";

        // TIME OF DENUDATION
        $this->TIMEOFDENUDATION->LinkCustomAttributes = "";
        $this->TIMEOFDENUDATION->HrefValue = "";
        $this->TIMEOFDENUDATION->TooltipValue = "";

        // M-II
        $this->MII->LinkCustomAttributes = "";
        $this->MII->HrefValue = "";
        $this->MII->TooltipValue = "";

        // MI
        $this->MI->LinkCustomAttributes = "";
        $this->MI->HrefValue = "";
        $this->MI->TooltipValue = "";

        // GV
        $this->GV->LinkCustomAttributes = "";
        $this->GV->HrefValue = "";
        $this->GV->TooltipValue = "";

        // ICSI TIME FORM OPU
        $this->ICSITIMEFORMOPU->LinkCustomAttributes = "";
        $this->ICSITIMEFORMOPU->HrefValue = "";
        $this->ICSITIMEFORMOPU->TooltipValue = "";

        // FERT ( 2 PN )
        $this->FERT2PN->LinkCustomAttributes = "";
        $this->FERT2PN->HrefValue = "";
        $this->FERT2PN->TooltipValue = "";

        // DEG
        $this->DEG->LinkCustomAttributes = "";
        $this->DEG->HrefValue = "";
        $this->DEG->TooltipValue = "";

        // D3 GRADE A
        $this->D3GRADEA->LinkCustomAttributes = "";
        $this->D3GRADEA->HrefValue = "";
        $this->D3GRADEA->TooltipValue = "";

        // D3 GRADE B
        $this->D3GRADEB->LinkCustomAttributes = "";
        $this->D3GRADEB->HrefValue = "";
        $this->D3GRADEB->TooltipValue = "";

        // D3 GRADE C
        $this->D3GRADEC->LinkCustomAttributes = "";
        $this->D3GRADEC->HrefValue = "";
        $this->D3GRADEC->TooltipValue = "";

        // D3 GRADE D
        $this->D3GRADED->LinkCustomAttributes = "";
        $this->D3GRADED->HrefValue = "";
        $this->D3GRADED->TooltipValue = "";

        // USABLE ON DAY 3 ET
        $this->USABLEONDAY3ET->LinkCustomAttributes = "";
        $this->USABLEONDAY3ET->HrefValue = "";
        $this->USABLEONDAY3ET->TooltipValue = "";

        // USABLE ON day 3 FREEZING
        $this->USABLEONday3FREEZING->LinkCustomAttributes = "";
        $this->USABLEONday3FREEZING->HrefValue = "";
        $this->USABLEONday3FREEZING->TooltipValue = "";

        // D5 GARDE A
        $this->D5GARDEA->LinkCustomAttributes = "";
        $this->D5GARDEA->HrefValue = "";
        $this->D5GARDEA->TooltipValue = "";

        // D5 GRADE B
        $this->D5GRADEB->LinkCustomAttributes = "";
        $this->D5GRADEB->HrefValue = "";
        $this->D5GRADEB->TooltipValue = "";

        // D5 GRADE C
        $this->D5GRADEC->LinkCustomAttributes = "";
        $this->D5GRADEC->HrefValue = "";
        $this->D5GRADEC->TooltipValue = "";

        // D5 GRADE D
        $this->D5GRADED->LinkCustomAttributes = "";
        $this->D5GRADED->HrefValue = "";
        $this->D5GRADED->TooltipValue = "";

        // USABLE ON D5 ET
        $this->USABLEOND5ET->LinkCustomAttributes = "";
        $this->USABLEOND5ET->HrefValue = "";
        $this->USABLEOND5ET->TooltipValue = "";

        // USABLE ON D5 FREEZING
        $this->USABLEOND5FREEZING->LinkCustomAttributes = "";
        $this->USABLEOND5FREEZING->HrefValue = "";
        $this->USABLEOND5FREEZING->TooltipValue = "";

        // D6 GRADE A
        $this->D6GRADEA->LinkCustomAttributes = "";
        $this->D6GRADEA->HrefValue = "";
        $this->D6GRADEA->TooltipValue = "";

        // D6 GRADE B
        $this->D6GRADEB->LinkCustomAttributes = "";
        $this->D6GRADEB->HrefValue = "";
        $this->D6GRADEB->TooltipValue = "";

        // D6 GRADE C
        $this->D6GRADEC->LinkCustomAttributes = "";
        $this->D6GRADEC->HrefValue = "";
        $this->D6GRADEC->TooltipValue = "";

        // D6 GRADE D
        $this->D6GRADED->LinkCustomAttributes = "";
        $this->D6GRADED->HrefValue = "";
        $this->D6GRADED->TooltipValue = "";

        // D6 USABLE EMBRYO ET
        $this->D6USABLEEMBRYOET->LinkCustomAttributes = "";
        $this->D6USABLEEMBRYOET->HrefValue = "";
        $this->D6USABLEEMBRYOET->TooltipValue = "";

        // D6 USABLE FREEZING
        $this->D6USABLEFREEZING->LinkCustomAttributes = "";
        $this->D6USABLEFREEZING->HrefValue = "";
        $this->D6USABLEFREEZING->TooltipValue = "";

        // TOTAL BLAST
        $this->TOTALBLAST->LinkCustomAttributes = "";
        $this->TOTALBLAST->HrefValue = "";
        $this->TOTALBLAST->TooltipValue = "";

        // PGS
        $this->PGS->LinkCustomAttributes = "";
        $this->PGS->HrefValue = "";
        $this->PGS->TooltipValue = "";

        // REMARKS
        $this->REMARKS->LinkCustomAttributes = "";
        $this->REMARKS->HrefValue = "";
        $this->REMARKS->TooltipValue = "";

        // PU - D/B
        $this->PUDB->LinkCustomAttributes = "";
        $this->PUDB->HrefValue = "";
        $this->PUDB->TooltipValue = "";

        // ICSI D/B
        $this->ICSIDB->LinkCustomAttributes = "";
        $this->ICSIDB->HrefValue = "";
        $this->ICSIDB->TooltipValue = "";

        // VIT D/B
        $this->VITDB->LinkCustomAttributes = "";
        $this->VITDB->HrefValue = "";
        $this->VITDB->TooltipValue = "";

        // ET D/B
        $this->ETDB->LinkCustomAttributes = "";
        $this->ETDB->HrefValue = "";
        $this->ETDB->TooltipValue = "";

        // LAB COMMENTS
        $this->LABCOMMENTS->LinkCustomAttributes = "";
        $this->LABCOMMENTS->HrefValue = "";
        $this->LABCOMMENTS->TooltipValue = "";

        // Reason for no FRESH transfer
        $this->ReasonfornoFRESHtransfer->LinkCustomAttributes = "";
        $this->ReasonfornoFRESHtransfer->HrefValue = "";
        $this->ReasonfornoFRESHtransfer->TooltipValue = "";

        // No of embryos transferred Day 3/5, A,B,C
        $this->NoofembryostransferredDay35ABC->LinkCustomAttributes = "";
        $this->NoofembryostransferredDay35ABC->HrefValue = "";
        $this->NoofembryostransferredDay35ABC->TooltipValue = "";

        // EMBRYOS PENDING
        $this->EMBRYOSPENDING->LinkCustomAttributes = "";
        $this->EMBRYOSPENDING->HrefValue = "";
        $this->EMBRYOSPENDING->TooltipValue = "";

        // DAY OF TRANSFER
        $this->DAYOFTRANSFER->LinkCustomAttributes = "";
        $this->DAYOFTRANSFER->HrefValue = "";
        $this->DAYOFTRANSFER->TooltipValue = "";

        // H/D sperm
        $this->HDsperm->LinkCustomAttributes = "";
        $this->HDsperm->HrefValue = "";
        $this->HDsperm->TooltipValue = "";

        // Comments
        $this->Comments->LinkCustomAttributes = "";
        $this->Comments->HrefValue = "";
        $this->Comments->TooltipValue = "";

        // sc progesterone
        $this->scprogesterone->LinkCustomAttributes = "";
        $this->scprogesterone->HrefValue = "";
        $this->scprogesterone->TooltipValue = "";

        // Natural micronised 400mg bd + duphaston 10mg bd
        $this->Naturalmicronised400mgbdduphaston10mgbd->LinkCustomAttributes = "";
        $this->Naturalmicronised400mgbdduphaston10mgbd->HrefValue = "";
        $this->Naturalmicronised400mgbdduphaston10mgbd->TooltipValue = "";

        // CRINONE
        $this->CRINONE->LinkCustomAttributes = "";
        $this->CRINONE->HrefValue = "";
        $this->CRINONE->TooltipValue = "";

        // progynova
        $this->progynova->LinkCustomAttributes = "";
        $this->progynova->HrefValue = "";
        $this->progynova->TooltipValue = "";

        // Heparin
        $this->Heparin->LinkCustomAttributes = "";
        $this->Heparin->HrefValue = "";
        $this->Heparin->TooltipValue = "";

        // cabergolin
        $this->cabergolin->LinkCustomAttributes = "";
        $this->cabergolin->HrefValue = "";
        $this->cabergolin->TooltipValue = "";

        // Antagonist
        $this->Antagonist->LinkCustomAttributes = "";
        $this->Antagonist->HrefValue = "";
        $this->Antagonist->TooltipValue = "";

        // OHSS
        $this->OHSS->LinkCustomAttributes = "";
        $this->OHSS->HrefValue = "";
        $this->OHSS->TooltipValue = "";

        // Complications
        $this->Complications->LinkCustomAttributes = "";
        $this->Complications->HrefValue = "";
        $this->Complications->TooltipValue = "";

        // LP bleeding
        $this->LPbleeding->LinkCustomAttributes = "";
        $this->LPbleeding->HrefValue = "";
        $this->LPbleeding->TooltipValue = "";

        // ß-hCG
        $this->hCG->LinkCustomAttributes = "";
        $this->hCG->HrefValue = "";
        $this->hCG->TooltipValue = "";

        // Implantation rate
        $this->Implantationrate->LinkCustomAttributes = "";
        $this->Implantationrate->HrefValue = "";
        $this->Implantationrate->TooltipValue = "";

        // Ectopic
        $this->Ectopic->LinkCustomAttributes = "";
        $this->Ectopic->HrefValue = "";
        $this->Ectopic->TooltipValue = "";

        // Type of preg
        $this->Typeofpreg->LinkCustomAttributes = "";
        $this->Typeofpreg->HrefValue = "";
        $this->Typeofpreg->TooltipValue = "";

        // ANC
        $this->ANC->LinkCustomAttributes = "";
        $this->ANC->HrefValue = "";
        $this->ANC->TooltipValue = "";

        // anomalies
        $this->anomalies->LinkCustomAttributes = "";
        $this->anomalies->HrefValue = "";
        $this->anomalies->TooltipValue = "";

        // baby wt
        $this->babywt->LinkCustomAttributes = "";
        $this->babywt->HrefValue = "";
        $this->babywt->TooltipValue = "";

        // GA at delivery
        $this->GAatdelivery->LinkCustomAttributes = "";
        $this->GAatdelivery->HrefValue = "";
        $this->GAatdelivery->TooltipValue = "";

        // Pregnancy outcome
        $this->Pregnancyoutcome->LinkCustomAttributes = "";
        $this->Pregnancyoutcome->HrefValue = "";
        $this->Pregnancyoutcome->TooltipValue = "";

        // 1st FET
        $this->_1stFET->LinkCustomAttributes = "";
        $this->_1stFET->HrefValue = "";
        $this->_1stFET->TooltipValue = "";

        // AFTER HYSTEROSCOPY
        $this->AFTERHYSTEROSCOPY->LinkCustomAttributes = "";
        $this->AFTERHYSTEROSCOPY->HrefValue = "";
        $this->AFTERHYSTEROSCOPY->TooltipValue = "";

        // AFTER ERA
        $this->AFTERERA->LinkCustomAttributes = "";
        $this->AFTERERA->HrefValue = "";
        $this->AFTERERA->TooltipValue = "";

        // ERA
        $this->ERA->LinkCustomAttributes = "";
        $this->ERA->HrefValue = "";
        $this->ERA->TooltipValue = "";

        // HRT
        $this->HRT->LinkCustomAttributes = "";
        $this->HRT->HrefValue = "";
        $this->HRT->TooltipValue = "";

        // XGRAST/PRP
        $this->XGRASTPRP->LinkCustomAttributes = "";
        $this->XGRASTPRP->HrefValue = "";
        $this->XGRASTPRP->TooltipValue = "";

        // EMBRYO DETAILS DAY 3/ 5, A, B, C
        $this->EMBRYODETAILSDAY35ABC->LinkCustomAttributes = "";
        $this->EMBRYODETAILSDAY35ABC->HrefValue = "";
        $this->EMBRYODETAILSDAY35ABC->TooltipValue = "";

        // LMWH 40MG
        $this->LMWH40MG->LinkCustomAttributes = "";
        $this->LMWH40MG->HrefValue = "";
        $this->LMWH40MG->TooltipValue = "";

        // ß-hCG2
        $this->hCG2->LinkCustomAttributes = "";
        $this->hCG2->HrefValue = "";
        $this->hCG2->TooltipValue = "";

        // Implantation rate1
        $this->Implantationrate1->LinkCustomAttributes = "";
        $this->Implantationrate1->HrefValue = "";
        $this->Implantationrate1->TooltipValue = "";

        // Ectopic1
        $this->Ectopic1->LinkCustomAttributes = "";
        $this->Ectopic1->HrefValue = "";
        $this->Ectopic1->TooltipValue = "";

        // Type of pregA
        $this->TypeofpregA->LinkCustomAttributes = "";
        $this->TypeofpregA->HrefValue = "";
        $this->TypeofpregA->TooltipValue = "";

        // ANC1
        $this->ANC1->LinkCustomAttributes = "";
        $this->ANC1->HrefValue = "";
        $this->ANC1->TooltipValue = "";

        // anomalies2
        $this->anomalies2->LinkCustomAttributes = "";
        $this->anomalies2->HrefValue = "";
        $this->anomalies2->TooltipValue = "";

        // baby wt2
        $this->babywt2->LinkCustomAttributes = "";
        $this->babywt2->HrefValue = "";
        $this->babywt2->TooltipValue = "";

        // GA at delivery1
        $this->GAatdelivery1->LinkCustomAttributes = "";
        $this->GAatdelivery1->HrefValue = "";
        $this->GAatdelivery1->TooltipValue = "";

        // Pregnancy outcome1
        $this->Pregnancyoutcome1->LinkCustomAttributes = "";
        $this->Pregnancyoutcome1->HrefValue = "";
        $this->Pregnancyoutcome1->TooltipValue = "";

        // 2ND FET
        $this->_2NDFET->LinkCustomAttributes = "";
        $this->_2NDFET->HrefValue = "";
        $this->_2NDFET->TooltipValue = "";

        // AFTER HYSTEROSCOPY1
        $this->AFTERHYSTEROSCOPY1->LinkCustomAttributes = "";
        $this->AFTERHYSTEROSCOPY1->HrefValue = "";
        $this->AFTERHYSTEROSCOPY1->TooltipValue = "";

        // AFTER ERA1
        $this->AFTERERA1->LinkCustomAttributes = "";
        $this->AFTERERA1->HrefValue = "";
        $this->AFTERERA1->TooltipValue = "";

        // ERA1
        $this->ERA1->LinkCustomAttributes = "";
        $this->ERA1->HrefValue = "";
        $this->ERA1->TooltipValue = "";

        // HRT1
        $this->HRT1->LinkCustomAttributes = "";
        $this->HRT1->HrefValue = "";
        $this->HRT1->TooltipValue = "";

        // XGRAST/PRP1
        $this->XGRASTPRP1->LinkCustomAttributes = "";
        $this->XGRASTPRP1->HrefValue = "";
        $this->XGRASTPRP1->TooltipValue = "";

        // NUMBER OF EMBRYOS
        $this->NUMBEROFEMBRYOS->LinkCustomAttributes = "";
        $this->NUMBEROFEMBRYOS->HrefValue = "";
        $this->NUMBEROFEMBRYOS->TooltipValue = "";

        // EMBRYO DETAILS DAY 3/ 5,/6 A, B, C
        $this->EMBRYODETAILSDAY356ABC->LinkCustomAttributes = "";
        $this->EMBRYODETAILSDAY356ABC->HrefValue = "";
        $this->EMBRYODETAILSDAY356ABC->TooltipValue = "";

        // INTRALIPID AND BARGLOBIN
        $this->INTRALIPIDANDBARGLOBIN->LinkCustomAttributes = "";
        $this->INTRALIPIDANDBARGLOBIN->HrefValue = "";
        $this->INTRALIPIDANDBARGLOBIN->TooltipValue = "";

        // LMWH 40MG1
        $this->LMWH40MG1->LinkCustomAttributes = "";
        $this->LMWH40MG1->HrefValue = "";
        $this->LMWH40MG1->TooltipValue = "";

        // ß-hCG1
        $this->hCG1->LinkCustomAttributes = "";
        $this->hCG1->HrefValue = "";
        $this->hCG1->TooltipValue = "";

        // Implantation rate2
        $this->Implantationrate2->LinkCustomAttributes = "";
        $this->Implantationrate2->HrefValue = "";
        $this->Implantationrate2->TooltipValue = "";

        // Ectopic2
        $this->Ectopic2->LinkCustomAttributes = "";
        $this->Ectopic2->HrefValue = "";
        $this->Ectopic2->TooltipValue = "";

        // Type of preg2
        $this->Typeofpreg2->LinkCustomAttributes = "";
        $this->Typeofpreg2->HrefValue = "";
        $this->Typeofpreg2->TooltipValue = "";

        // ANCA
        $this->ANCA->LinkCustomAttributes = "";
        $this->ANCA->HrefValue = "";
        $this->ANCA->TooltipValue = "";

        // anomalies1
        $this->anomalies1->LinkCustomAttributes = "";
        $this->anomalies1->HrefValue = "";
        $this->anomalies1->TooltipValue = "";

        // baby wt1
        $this->babywt1->LinkCustomAttributes = "";
        $this->babywt1->HrefValue = "";
        $this->babywt1->TooltipValue = "";

        // GA at delivery2
        $this->GAatdelivery2->LinkCustomAttributes = "";
        $this->GAatdelivery2->HrefValue = "";
        $this->GAatdelivery2->TooltipValue = "";

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

        // RIDNO
        $this->RIDNO->EditAttrs["class"] = "form-control";
        $this->RIDNO->EditCustomAttributes = "";
        $this->RIDNO->EditValue = $this->RIDNO->CurrentValue;
        $this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());

        // Treatment
        $this->Treatment->EditAttrs["class"] = "form-control";
        $this->Treatment->EditCustomAttributes = "";
        if (!$this->Treatment->Raw) {
            $this->Treatment->CurrentValue = HtmlDecode($this->Treatment->CurrentValue);
        }
        $this->Treatment->EditValue = $this->Treatment->CurrentValue;
        $this->Treatment->PlaceHolder = RemoveHtml($this->Treatment->caption());

        // Origin
        $this->Origin->EditAttrs["class"] = "form-control";
        $this->Origin->EditCustomAttributes = "";
        if (!$this->Origin->Raw) {
            $this->Origin->CurrentValue = HtmlDecode($this->Origin->CurrentValue);
        }
        $this->Origin->EditValue = $this->Origin->CurrentValue;
        $this->Origin->PlaceHolder = RemoveHtml($this->Origin->caption());

        // MaleIndications
        $this->MaleIndications->EditAttrs["class"] = "form-control";
        $this->MaleIndications->EditCustomAttributes = "";
        if (!$this->MaleIndications->Raw) {
            $this->MaleIndications->CurrentValue = HtmlDecode($this->MaleIndications->CurrentValue);
        }
        $this->MaleIndications->EditValue = $this->MaleIndications->CurrentValue;
        $this->MaleIndications->PlaceHolder = RemoveHtml($this->MaleIndications->caption());

        // FemaleIndications
        $this->FemaleIndications->EditAttrs["class"] = "form-control";
        $this->FemaleIndications->EditCustomAttributes = "";
        if (!$this->FemaleIndications->Raw) {
            $this->FemaleIndications->CurrentValue = HtmlDecode($this->FemaleIndications->CurrentValue);
        }
        $this->FemaleIndications->EditValue = $this->FemaleIndications->CurrentValue;
        $this->FemaleIndications->PlaceHolder = RemoveHtml($this->FemaleIndications->caption());

        // PatientName
        $this->PatientName->EditAttrs["class"] = "form-control";
        $this->PatientName->EditCustomAttributes = "";
        if (!$this->PatientName->Raw) {
            $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
        }
        $this->PatientName->EditValue = $this->PatientName->CurrentValue;
        $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

        // PatientID
        $this->PatientID->EditAttrs["class"] = "form-control";
        $this->PatientID->EditCustomAttributes = "";
        if (!$this->PatientID->Raw) {
            $this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
        }
        $this->PatientID->EditValue = $this->PatientID->CurrentValue;
        $this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

        // PartnerName
        $this->PartnerName->EditAttrs["class"] = "form-control";
        $this->PartnerName->EditCustomAttributes = "";
        if (!$this->PartnerName->Raw) {
            $this->PartnerName->CurrentValue = HtmlDecode($this->PartnerName->CurrentValue);
        }
        $this->PartnerName->EditValue = $this->PartnerName->CurrentValue;
        $this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

        // PartnerID
        $this->PartnerID->EditAttrs["class"] = "form-control";
        $this->PartnerID->EditCustomAttributes = "";
        if (!$this->PartnerID->Raw) {
            $this->PartnerID->CurrentValue = HtmlDecode($this->PartnerID->CurrentValue);
        }
        $this->PartnerID->EditValue = $this->PartnerID->CurrentValue;
        $this->PartnerID->PlaceHolder = RemoveHtml($this->PartnerID->caption());

        // A4ICSICycle
        $this->A4ICSICycle->EditAttrs["class"] = "form-control";
        $this->A4ICSICycle->EditCustomAttributes = "";
        if (!$this->A4ICSICycle->Raw) {
            $this->A4ICSICycle->CurrentValue = HtmlDecode($this->A4ICSICycle->CurrentValue);
        }
        $this->A4ICSICycle->EditValue = $this->A4ICSICycle->CurrentValue;
        $this->A4ICSICycle->PlaceHolder = RemoveHtml($this->A4ICSICycle->caption());

        // TotalICSICycle
        $this->TotalICSICycle->EditAttrs["class"] = "form-control";
        $this->TotalICSICycle->EditCustomAttributes = "";
        if (!$this->TotalICSICycle->Raw) {
            $this->TotalICSICycle->CurrentValue = HtmlDecode($this->TotalICSICycle->CurrentValue);
        }
        $this->TotalICSICycle->EditValue = $this->TotalICSICycle->CurrentValue;
        $this->TotalICSICycle->PlaceHolder = RemoveHtml($this->TotalICSICycle->caption());

        // TypeOfInfertility
        $this->TypeOfInfertility->EditAttrs["class"] = "form-control";
        $this->TypeOfInfertility->EditCustomAttributes = "";
        if (!$this->TypeOfInfertility->Raw) {
            $this->TypeOfInfertility->CurrentValue = HtmlDecode($this->TypeOfInfertility->CurrentValue);
        }
        $this->TypeOfInfertility->EditValue = $this->TypeOfInfertility->CurrentValue;
        $this->TypeOfInfertility->PlaceHolder = RemoveHtml($this->TypeOfInfertility->caption());

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

        // ANTAGONISTSTARTDAY
        $this->ANTAGONISTSTARTDAY->EditAttrs["class"] = "form-control";
        $this->ANTAGONISTSTARTDAY->EditCustomAttributes = "";
        if (!$this->ANTAGONISTSTARTDAY->Raw) {
            $this->ANTAGONISTSTARTDAY->CurrentValue = HtmlDecode($this->ANTAGONISTSTARTDAY->CurrentValue);
        }
        $this->ANTAGONISTSTARTDAY->EditValue = $this->ANTAGONISTSTARTDAY->CurrentValue;
        $this->ANTAGONISTSTARTDAY->PlaceHolder = RemoveHtml($this->ANTAGONISTSTARTDAY->caption());

        // OvarianSurgery
        $this->OvarianSurgery->EditAttrs["class"] = "form-control";
        $this->OvarianSurgery->EditCustomAttributes = "";
        if (!$this->OvarianSurgery->Raw) {
            $this->OvarianSurgery->CurrentValue = HtmlDecode($this->OvarianSurgery->CurrentValue);
        }
        $this->OvarianSurgery->EditValue = $this->OvarianSurgery->CurrentValue;
        $this->OvarianSurgery->PlaceHolder = RemoveHtml($this->OvarianSurgery->caption());

        // OPUDATE
        $this->OPUDATE->EditAttrs["class"] = "form-control";
        $this->OPUDATE->EditCustomAttributes = "";
        $this->OPUDATE->EditValue = FormatDateTime($this->OPUDATE->CurrentValue, 8);
        $this->OPUDATE->PlaceHolder = RemoveHtml($this->OPUDATE->caption());

        // RFSH1
        $this->RFSH1->EditAttrs["class"] = "form-control";
        $this->RFSH1->EditCustomAttributes = "";
        if (!$this->RFSH1->Raw) {
            $this->RFSH1->CurrentValue = HtmlDecode($this->RFSH1->CurrentValue);
        }
        $this->RFSH1->EditValue = $this->RFSH1->CurrentValue;
        $this->RFSH1->PlaceHolder = RemoveHtml($this->RFSH1->caption());

        // RFSH2
        $this->RFSH2->EditAttrs["class"] = "form-control";
        $this->RFSH2->EditCustomAttributes = "";
        if (!$this->RFSH2->Raw) {
            $this->RFSH2->CurrentValue = HtmlDecode($this->RFSH2->CurrentValue);
        }
        $this->RFSH2->EditValue = $this->RFSH2->CurrentValue;
        $this->RFSH2->PlaceHolder = RemoveHtml($this->RFSH2->caption());

        // RFSH3
        $this->RFSH3->EditAttrs["class"] = "form-control";
        $this->RFSH3->EditCustomAttributes = "";
        if (!$this->RFSH3->Raw) {
            $this->RFSH3->CurrentValue = HtmlDecode($this->RFSH3->CurrentValue);
        }
        $this->RFSH3->EditValue = $this->RFSH3->CurrentValue;
        $this->RFSH3->PlaceHolder = RemoveHtml($this->RFSH3->caption());

        // E21
        $this->E21->EditAttrs["class"] = "form-control";
        $this->E21->EditCustomAttributes = "";
        if (!$this->E21->Raw) {
            $this->E21->CurrentValue = HtmlDecode($this->E21->CurrentValue);
        }
        $this->E21->EditValue = $this->E21->CurrentValue;
        $this->E21->PlaceHolder = RemoveHtml($this->E21->caption());

        // Hysteroscopy
        $this->Hysteroscopy->EditAttrs["class"] = "form-control";
        $this->Hysteroscopy->EditCustomAttributes = "";
        if (!$this->Hysteroscopy->Raw) {
            $this->Hysteroscopy->CurrentValue = HtmlDecode($this->Hysteroscopy->CurrentValue);
        }
        $this->Hysteroscopy->EditValue = $this->Hysteroscopy->CurrentValue;
        $this->Hysteroscopy->PlaceHolder = RemoveHtml($this->Hysteroscopy->caption());

        // HospID
        $this->HospID->EditAttrs["class"] = "form-control";
        $this->HospID->EditCustomAttributes = "";
        $this->HospID->EditValue = $this->HospID->CurrentValue;
        $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

        // Fweight
        $this->Fweight->EditAttrs["class"] = "form-control";
        $this->Fweight->EditCustomAttributes = "";
        if (!$this->Fweight->Raw) {
            $this->Fweight->CurrentValue = HtmlDecode($this->Fweight->CurrentValue);
        }
        $this->Fweight->EditValue = $this->Fweight->CurrentValue;
        $this->Fweight->PlaceHolder = RemoveHtml($this->Fweight->caption());

        // AntiTPO
        $this->AntiTPO->EditAttrs["class"] = "form-control";
        $this->AntiTPO->EditCustomAttributes = "";
        if (!$this->AntiTPO->Raw) {
            $this->AntiTPO->CurrentValue = HtmlDecode($this->AntiTPO->CurrentValue);
        }
        $this->AntiTPO->EditValue = $this->AntiTPO->CurrentValue;
        $this->AntiTPO->PlaceHolder = RemoveHtml($this->AntiTPO->caption());

        // AntiTG
        $this->AntiTG->EditAttrs["class"] = "form-control";
        $this->AntiTG->EditCustomAttributes = "";
        if (!$this->AntiTG->Raw) {
            $this->AntiTG->CurrentValue = HtmlDecode($this->AntiTG->CurrentValue);
        }
        $this->AntiTG->EditValue = $this->AntiTG->CurrentValue;
        $this->AntiTG->PlaceHolder = RemoveHtml($this->AntiTG->caption());

        // PatientAge
        $this->PatientAge->EditAttrs["class"] = "form-control";
        $this->PatientAge->EditCustomAttributes = "";
        if (!$this->PatientAge->Raw) {
            $this->PatientAge->CurrentValue = HtmlDecode($this->PatientAge->CurrentValue);
        }
        $this->PatientAge->EditValue = $this->PatientAge->CurrentValue;
        $this->PatientAge->PlaceHolder = RemoveHtml($this->PatientAge->caption());

        // PartnerAge
        $this->PartnerAge->EditAttrs["class"] = "form-control";
        $this->PartnerAge->EditCustomAttributes = "";
        if (!$this->PartnerAge->Raw) {
            $this->PartnerAge->CurrentValue = HtmlDecode($this->PartnerAge->CurrentValue);
        }
        $this->PartnerAge->EditValue = $this->PartnerAge->CurrentValue;
        $this->PartnerAge->PlaceHolder = RemoveHtml($this->PartnerAge->caption());

        // CYCLES
        $this->CYCLES->EditAttrs["class"] = "form-control";
        $this->CYCLES->EditCustomAttributes = "";
        $this->CYCLES->EditValue = $this->CYCLES->CurrentValue;
        $this->CYCLES->PlaceHolder = RemoveHtml($this->CYCLES->caption());

        // MF
        $this->MF->EditAttrs["class"] = "form-control";
        $this->MF->EditCustomAttributes = "";
        $this->MF->EditValue = $this->MF->CurrentValue;
        $this->MF->PlaceHolder = RemoveHtml($this->MF->caption());

        // CauseOfINFERTILITY
        $this->CauseOfINFERTILITY->EditAttrs["class"] = "form-control";
        $this->CauseOfINFERTILITY->EditCustomAttributes = "";
        $this->CauseOfINFERTILITY->EditValue = $this->CauseOfINFERTILITY->CurrentValue;
        $this->CauseOfINFERTILITY->PlaceHolder = RemoveHtml($this->CauseOfINFERTILITY->caption());

        // SIS
        $this->SIS->EditAttrs["class"] = "form-control";
        $this->SIS->EditCustomAttributes = "";
        $this->SIS->EditValue = $this->SIS->CurrentValue;
        $this->SIS->PlaceHolder = RemoveHtml($this->SIS->caption());

        // Scratching
        $this->Scratching->EditAttrs["class"] = "form-control";
        $this->Scratching->EditCustomAttributes = "";
        $this->Scratching->EditValue = $this->Scratching->CurrentValue;
        $this->Scratching->PlaceHolder = RemoveHtml($this->Scratching->caption());

        // Cannulation
        $this->Cannulation->EditAttrs["class"] = "form-control";
        $this->Cannulation->EditCustomAttributes = "";
        $this->Cannulation->EditValue = $this->Cannulation->CurrentValue;
        $this->Cannulation->PlaceHolder = RemoveHtml($this->Cannulation->caption());

        // MEPRATE
        $this->MEPRATE->EditAttrs["class"] = "form-control";
        $this->MEPRATE->EditCustomAttributes = "";
        $this->MEPRATE->EditValue = $this->MEPRATE->CurrentValue;
        $this->MEPRATE->PlaceHolder = RemoveHtml($this->MEPRATE->caption());

        // R.OVARY
        $this->ROVARY->EditAttrs["class"] = "form-control";
        $this->ROVARY->EditCustomAttributes = "";
        if (!$this->ROVARY->Raw) {
            $this->ROVARY->CurrentValue = HtmlDecode($this->ROVARY->CurrentValue);
        }
        $this->ROVARY->EditValue = $this->ROVARY->CurrentValue;
        $this->ROVARY->PlaceHolder = RemoveHtml($this->ROVARY->caption());

        // R.AFC
        $this->RAFC->EditAttrs["class"] = "form-control";
        $this->RAFC->EditCustomAttributes = "";
        if (!$this->RAFC->Raw) {
            $this->RAFC->CurrentValue = HtmlDecode($this->RAFC->CurrentValue);
        }
        $this->RAFC->EditValue = $this->RAFC->CurrentValue;
        $this->RAFC->PlaceHolder = RemoveHtml($this->RAFC->caption());

        // L.OVARY
        $this->LOVARY->EditAttrs["class"] = "form-control";
        $this->LOVARY->EditCustomAttributes = "";
        if (!$this->LOVARY->Raw) {
            $this->LOVARY->CurrentValue = HtmlDecode($this->LOVARY->CurrentValue);
        }
        $this->LOVARY->EditValue = $this->LOVARY->CurrentValue;
        $this->LOVARY->PlaceHolder = RemoveHtml($this->LOVARY->caption());

        // L.AFC
        $this->LAFC->EditAttrs["class"] = "form-control";
        $this->LAFC->EditCustomAttributes = "";
        if (!$this->LAFC->Raw) {
            $this->LAFC->CurrentValue = HtmlDecode($this->LAFC->CurrentValue);
        }
        $this->LAFC->EditValue = $this->LAFC->CurrentValue;
        $this->LAFC->PlaceHolder = RemoveHtml($this->LAFC->caption());

        // LH1
        $this->LH1->EditAttrs["class"] = "form-control";
        $this->LH1->EditCustomAttributes = "";
        $this->LH1->EditValue = $this->LH1->CurrentValue;
        $this->LH1->PlaceHolder = RemoveHtml($this->LH1->caption());

        // E2
        $this->E2->EditAttrs["class"] = "form-control";
        $this->E2->EditCustomAttributes = "";
        if (!$this->E2->Raw) {
            $this->E2->CurrentValue = HtmlDecode($this->E2->CurrentValue);
        }
        $this->E2->EditValue = $this->E2->CurrentValue;
        $this->E2->PlaceHolder = RemoveHtml($this->E2->caption());

        // StemCellInstallation
        $this->StemCellInstallation->EditAttrs["class"] = "form-control";
        $this->StemCellInstallation->EditCustomAttributes = "";
        $this->StemCellInstallation->EditValue = $this->StemCellInstallation->CurrentValue;
        $this->StemCellInstallation->PlaceHolder = RemoveHtml($this->StemCellInstallation->caption());

        // DHEAS
        $this->DHEAS->EditAttrs["class"] = "form-control";
        $this->DHEAS->EditCustomAttributes = "";
        $this->DHEAS->EditValue = $this->DHEAS->CurrentValue;
        $this->DHEAS->PlaceHolder = RemoveHtml($this->DHEAS->caption());

        // Mtorr
        $this->Mtorr->EditAttrs["class"] = "form-control";
        $this->Mtorr->EditCustomAttributes = "";
        $this->Mtorr->EditValue = $this->Mtorr->CurrentValue;
        $this->Mtorr->PlaceHolder = RemoveHtml($this->Mtorr->caption());

        // AMH1
        $this->AMH1->EditAttrs["class"] = "form-control";
        $this->AMH1->EditCustomAttributes = "";
        if (!$this->AMH1->Raw) {
            $this->AMH1->CurrentValue = HtmlDecode($this->AMH1->CurrentValue);
        }
        $this->AMH1->EditValue = $this->AMH1->CurrentValue;
        $this->AMH1->PlaceHolder = RemoveHtml($this->AMH1->caption());

        // LH
        $this->LH->EditAttrs["class"] = "form-control";
        $this->LH->EditCustomAttributes = "";
        $this->LH->EditValue = $this->LH->CurrentValue;
        $this->LH->PlaceHolder = RemoveHtml($this->LH->caption());

        // BMI(MALE)
        $this->BMIMALE->EditAttrs["class"] = "form-control";
        $this->BMIMALE->EditCustomAttributes = "";
        if (!$this->BMIMALE->Raw) {
            $this->BMIMALE->CurrentValue = HtmlDecode($this->BMIMALE->CurrentValue);
        }
        $this->BMIMALE->EditValue = $this->BMIMALE->CurrentValue;
        $this->BMIMALE->PlaceHolder = RemoveHtml($this->BMIMALE->caption());

        // MaleMedicalConditions
        $this->MaleMedicalConditions->EditAttrs["class"] = "form-control";
        $this->MaleMedicalConditions->EditCustomAttributes = "";
        if (!$this->MaleMedicalConditions->Raw) {
            $this->MaleMedicalConditions->CurrentValue = HtmlDecode($this->MaleMedicalConditions->CurrentValue);
        }
        $this->MaleMedicalConditions->EditValue = $this->MaleMedicalConditions->CurrentValue;
        $this->MaleMedicalConditions->PlaceHolder = RemoveHtml($this->MaleMedicalConditions->caption());

        // MaleExamination
        $this->MaleExamination->EditAttrs["class"] = "form-control";
        $this->MaleExamination->EditCustomAttributes = "";
        $this->MaleExamination->EditValue = $this->MaleExamination->CurrentValue;
        $this->MaleExamination->PlaceHolder = RemoveHtml($this->MaleExamination->caption());

        // SpermConcentration
        $this->SpermConcentration->EditAttrs["class"] = "form-control";
        $this->SpermConcentration->EditCustomAttributes = "";
        $this->SpermConcentration->EditValue = $this->SpermConcentration->CurrentValue;
        $this->SpermConcentration->PlaceHolder = RemoveHtml($this->SpermConcentration->caption());

        // SpermMotility(P&NP)
        $this->SpermMotilityPNP->EditAttrs["class"] = "form-control";
        $this->SpermMotilityPNP->EditCustomAttributes = "";
        $this->SpermMotilityPNP->EditValue = $this->SpermMotilityPNP->CurrentValue;
        $this->SpermMotilityPNP->PlaceHolder = RemoveHtml($this->SpermMotilityPNP->caption());

        // SpermMorphology
        $this->SpermMorphology->EditAttrs["class"] = "form-control";
        $this->SpermMorphology->EditCustomAttributes = "";
        $this->SpermMorphology->EditValue = $this->SpermMorphology->CurrentValue;
        $this->SpermMorphology->PlaceHolder = RemoveHtml($this->SpermMorphology->caption());

        // SpermRetrival
        $this->SpermRetrival->EditAttrs["class"] = "form-control";
        $this->SpermRetrival->EditCustomAttributes = "";
        $this->SpermRetrival->EditValue = $this->SpermRetrival->CurrentValue;
        $this->SpermRetrival->PlaceHolder = RemoveHtml($this->SpermRetrival->caption());

        // M.Testosterone
        $this->MTestosterone->EditAttrs["class"] = "form-control";
        $this->MTestosterone->EditCustomAttributes = "";
        $this->MTestosterone->EditValue = $this->MTestosterone->CurrentValue;
        $this->MTestosterone->PlaceHolder = RemoveHtml($this->MTestosterone->caption());

        // DFI
        $this->DFI->EditAttrs["class"] = "form-control";
        $this->DFI->EditCustomAttributes = "";
        $this->DFI->EditValue = $this->DFI->CurrentValue;
        $this->DFI->PlaceHolder = RemoveHtml($this->DFI->caption());

        // PreRX
        $this->PreRX->EditAttrs["class"] = "form-control";
        $this->PreRX->EditCustomAttributes = "";
        $this->PreRX->EditValue = $this->PreRX->CurrentValue;
        $this->PreRX->PlaceHolder = RemoveHtml($this->PreRX->caption());

        // CC 100
        $this->CC100->EditAttrs["class"] = "form-control";
        $this->CC100->EditCustomAttributes = "";
        if (!$this->CC100->Raw) {
            $this->CC100->CurrentValue = HtmlDecode($this->CC100->CurrentValue);
        }
        $this->CC100->EditValue = $this->CC100->CurrentValue;
        $this->CC100->PlaceHolder = RemoveHtml($this->CC100->caption());

        // RFSH1A
        $this->RFSH1A->EditAttrs["class"] = "form-control";
        $this->RFSH1A->EditCustomAttributes = "";
        if (!$this->RFSH1A->Raw) {
            $this->RFSH1A->CurrentValue = HtmlDecode($this->RFSH1A->CurrentValue);
        }
        $this->RFSH1A->EditValue = $this->RFSH1A->CurrentValue;
        $this->RFSH1A->PlaceHolder = RemoveHtml($this->RFSH1A->caption());

        // HMG1
        $this->HMG1->EditAttrs["class"] = "form-control";
        $this->HMG1->EditCustomAttributes = "";
        if (!$this->HMG1->Raw) {
            $this->HMG1->CurrentValue = HtmlDecode($this->HMG1->CurrentValue);
        }
        $this->HMG1->EditValue = $this->HMG1->CurrentValue;
        $this->HMG1->PlaceHolder = RemoveHtml($this->HMG1->caption());

        // RLH
        $this->RLH->EditAttrs["class"] = "form-control";
        $this->RLH->EditCustomAttributes = "";
        $this->RLH->EditValue = $this->RLH->CurrentValue;
        $this->RLH->PlaceHolder = RemoveHtml($this->RLH->caption());

        // HMG_HP
        $this->HMG_HP->EditAttrs["class"] = "form-control";
        $this->HMG_HP->EditCustomAttributes = "";
        $this->HMG_HP->EditValue = $this->HMG_HP->CurrentValue;
        $this->HMG_HP->PlaceHolder = RemoveHtml($this->HMG_HP->caption());

        // day_of_HMG
        $this->day_of_HMG->EditAttrs["class"] = "form-control";
        $this->day_of_HMG->EditCustomAttributes = "";
        $this->day_of_HMG->EditValue = $this->day_of_HMG->CurrentValue;
        $this->day_of_HMG->PlaceHolder = RemoveHtml($this->day_of_HMG->caption());

        // Reason_for_HMG
        $this->Reason_for_HMG->EditAttrs["class"] = "form-control";
        $this->Reason_for_HMG->EditCustomAttributes = "";
        $this->Reason_for_HMG->EditValue = $this->Reason_for_HMG->CurrentValue;
        $this->Reason_for_HMG->PlaceHolder = RemoveHtml($this->Reason_for_HMG->caption());

        // RLH_day
        $this->RLH_day->EditAttrs["class"] = "form-control";
        $this->RLH_day->EditCustomAttributes = "";
        $this->RLH_day->EditValue = $this->RLH_day->CurrentValue;
        $this->RLH_day->PlaceHolder = RemoveHtml($this->RLH_day->caption());

        // DAYSOFSTIMULATION
        $this->DAYSOFSTIMULATION->EditAttrs["class"] = "form-control";
        $this->DAYSOFSTIMULATION->EditCustomAttributes = "";
        if (!$this->DAYSOFSTIMULATION->Raw) {
            $this->DAYSOFSTIMULATION->CurrentValue = HtmlDecode($this->DAYSOFSTIMULATION->CurrentValue);
        }
        $this->DAYSOFSTIMULATION->EditValue = $this->DAYSOFSTIMULATION->CurrentValue;
        $this->DAYSOFSTIMULATION->PlaceHolder = RemoveHtml($this->DAYSOFSTIMULATION->caption());

        // Any change inbetween ( Dose added , day)
        $this->AnychangeinbetweenDoseaddedday->EditAttrs["class"] = "form-control";
        $this->AnychangeinbetweenDoseaddedday->EditCustomAttributes = "";
        $this->AnychangeinbetweenDoseaddedday->EditValue = $this->AnychangeinbetweenDoseaddedday->CurrentValue;
        $this->AnychangeinbetweenDoseaddedday->PlaceHolder = RemoveHtml($this->AnychangeinbetweenDoseaddedday->caption());

        // day of Anta
        $this->dayofAnta->EditAttrs["class"] = "form-control";
        $this->dayofAnta->EditCustomAttributes = "";
        $this->dayofAnta->EditValue = $this->dayofAnta->CurrentValue;
        $this->dayofAnta->PlaceHolder = RemoveHtml($this->dayofAnta->caption());

        // R FSH TD
        $this->RFSHTD->EditAttrs["class"] = "form-control";
        $this->RFSHTD->EditCustomAttributes = "";
        $this->RFSHTD->EditValue = $this->RFSHTD->CurrentValue;
        $this->RFSHTD->PlaceHolder = RemoveHtml($this->RFSHTD->caption());

        // R FSH + HMG TD
        $this->RFSHHMGTD->EditAttrs["class"] = "form-control";
        $this->RFSHHMGTD->EditCustomAttributes = "";
        $this->RFSHHMGTD->EditValue = $this->RFSHHMGTD->CurrentValue;
        $this->RFSHHMGTD->PlaceHolder = RemoveHtml($this->RFSHHMGTD->caption());

        // R FSH + R LH TD
        $this->RFSHRLHTD->EditAttrs["class"] = "form-control";
        $this->RFSHRLHTD->EditCustomAttributes = "";
        $this->RFSHRLHTD->EditValue = $this->RFSHRLHTD->CurrentValue;
        $this->RFSHRLHTD->PlaceHolder = RemoveHtml($this->RFSHRLHTD->caption());

        // HMG TD
        $this->HMGTD->EditAttrs["class"] = "form-control";
        $this->HMGTD->EditCustomAttributes = "";
        $this->HMGTD->EditValue = $this->HMGTD->CurrentValue;
        $this->HMGTD->PlaceHolder = RemoveHtml($this->HMGTD->caption());

        // LH TD
        $this->LHTD->EditAttrs["class"] = "form-control";
        $this->LHTD->EditCustomAttributes = "";
        $this->LHTD->EditValue = $this->LHTD->CurrentValue;
        $this->LHTD->PlaceHolder = RemoveHtml($this->LHTD->caption());

        // D1 LH
        $this->D1LH->EditAttrs["class"] = "form-control";
        $this->D1LH->EditCustomAttributes = "";
        $this->D1LH->EditValue = $this->D1LH->CurrentValue;
        $this->D1LH->PlaceHolder = RemoveHtml($this->D1LH->caption());

        // D1 E2
        $this->D1E2->EditAttrs["class"] = "form-control";
        $this->D1E2->EditCustomAttributes = "";
        $this->D1E2->EditValue = $this->D1E2->CurrentValue;
        $this->D1E2->PlaceHolder = RemoveHtml($this->D1E2->caption());

        // Trigger day E2
        $this->TriggerdayE2->EditAttrs["class"] = "form-control";
        $this->TriggerdayE2->EditCustomAttributes = "";
        $this->TriggerdayE2->EditValue = $this->TriggerdayE2->CurrentValue;
        $this->TriggerdayE2->PlaceHolder = RemoveHtml($this->TriggerdayE2->caption());

        // Trigger day P4
        $this->TriggerdayP4->EditAttrs["class"] = "form-control";
        $this->TriggerdayP4->EditCustomAttributes = "";
        $this->TriggerdayP4->EditValue = $this->TriggerdayP4->CurrentValue;
        $this->TriggerdayP4->PlaceHolder = RemoveHtml($this->TriggerdayP4->caption());

        // Trigger day LH
        $this->TriggerdayLH->EditAttrs["class"] = "form-control";
        $this->TriggerdayLH->EditCustomAttributes = "";
        $this->TriggerdayLH->EditValue = $this->TriggerdayLH->CurrentValue;
        $this->TriggerdayLH->PlaceHolder = RemoveHtml($this->TriggerdayLH->caption());

        // VIT-D
        $this->VITD->EditAttrs["class"] = "form-control";
        $this->VITD->EditCustomAttributes = "";
        $this->VITD->EditValue = $this->VITD->CurrentValue;
        $this->VITD->PlaceHolder = RemoveHtml($this->VITD->caption());

        // TRIGGERR
        $this->TRIGGERR->EditAttrs["class"] = "form-control";
        $this->TRIGGERR->EditCustomAttributes = "";
        if (!$this->TRIGGERR->Raw) {
            $this->TRIGGERR->CurrentValue = HtmlDecode($this->TRIGGERR->CurrentValue);
        }
        $this->TRIGGERR->EditValue = $this->TRIGGERR->CurrentValue;
        $this->TRIGGERR->PlaceHolder = RemoveHtml($this->TRIGGERR->caption());

        // BHCG BEFORE RETRIEVAL
        $this->BHCGBEFORERETRIEVAL->EditAttrs["class"] = "form-control";
        $this->BHCGBEFORERETRIEVAL->EditCustomAttributes = "";
        $this->BHCGBEFORERETRIEVAL->EditValue = $this->BHCGBEFORERETRIEVAL->CurrentValue;
        $this->BHCGBEFORERETRIEVAL->PlaceHolder = RemoveHtml($this->BHCGBEFORERETRIEVAL->caption());

        // LH -12 HRS
        $this->LH12HRS->EditAttrs["class"] = "form-control";
        $this->LH12HRS->EditCustomAttributes = "";
        $this->LH12HRS->EditValue = $this->LH12HRS->CurrentValue;
        $this->LH12HRS->PlaceHolder = RemoveHtml($this->LH12HRS->caption());

        // P4 -12 HRS
        $this->P412HRS->EditAttrs["class"] = "form-control";
        $this->P412HRS->EditCustomAttributes = "";
        $this->P412HRS->EditValue = $this->P412HRS->CurrentValue;
        $this->P412HRS->PlaceHolder = RemoveHtml($this->P412HRS->caption());

        // ET on hCG day
        $this->ETonhCGday->EditAttrs["class"] = "form-control";
        $this->ETonhCGday->EditCustomAttributes = "";
        $this->ETonhCGday->EditValue = $this->ETonhCGday->CurrentValue;
        $this->ETonhCGday->PlaceHolder = RemoveHtml($this->ETonhCGday->caption());

        // ET doppler
        $this->ETdoppler->EditAttrs["class"] = "form-control";
        $this->ETdoppler->EditCustomAttributes = "";
        $this->ETdoppler->EditValue = $this->ETdoppler->CurrentValue;
        $this->ETdoppler->PlaceHolder = RemoveHtml($this->ETdoppler->caption());

        // VI/FI/VFI
        $this->VIFIVFI->EditAttrs["class"] = "form-control";
        $this->VIFIVFI->EditCustomAttributes = "";
        $this->VIFIVFI->EditValue = $this->VIFIVFI->CurrentValue;
        $this->VIFIVFI->PlaceHolder = RemoveHtml($this->VIFIVFI->caption());

        // Endometrial abnormality
        $this->Endometrialabnormality->EditAttrs["class"] = "form-control";
        $this->Endometrialabnormality->EditCustomAttributes = "";
        $this->Endometrialabnormality->EditValue = $this->Endometrialabnormality->CurrentValue;
        $this->Endometrialabnormality->PlaceHolder = RemoveHtml($this->Endometrialabnormality->caption());

        // AFC ON S1
        $this->AFCONS1->EditAttrs["class"] = "form-control";
        $this->AFCONS1->EditCustomAttributes = "";
        $this->AFCONS1->EditValue = $this->AFCONS1->CurrentValue;
        $this->AFCONS1->PlaceHolder = RemoveHtml($this->AFCONS1->caption());

        // TIME OF OPU FROM TRIGGER
        $this->TIMEOFOPUFROMTRIGGER->EditAttrs["class"] = "form-control";
        $this->TIMEOFOPUFROMTRIGGER->EditCustomAttributes = "";
        $this->TIMEOFOPUFROMTRIGGER->EditValue = $this->TIMEOFOPUFROMTRIGGER->CurrentValue;
        $this->TIMEOFOPUFROMTRIGGER->PlaceHolder = RemoveHtml($this->TIMEOFOPUFROMTRIGGER->caption());

        // SPERM TYPE
        $this->SPERMTYPE->EditAttrs["class"] = "form-control";
        $this->SPERMTYPE->EditCustomAttributes = "";
        $this->SPERMTYPE->EditValue = $this->SPERMTYPE->CurrentValue;
        $this->SPERMTYPE->PlaceHolder = RemoveHtml($this->SPERMTYPE->caption());

        // EXPECTED ON TRIGGER DAY
        $this->EXPECTEDONTRIGGERDAY->EditAttrs["class"] = "form-control";
        $this->EXPECTEDONTRIGGERDAY->EditCustomAttributes = "";
        $this->EXPECTEDONTRIGGERDAY->EditValue = $this->EXPECTEDONTRIGGERDAY->CurrentValue;
        $this->EXPECTEDONTRIGGERDAY->PlaceHolder = RemoveHtml($this->EXPECTEDONTRIGGERDAY->caption());

        // OOCYTES RETRIEVED
        $this->OOCYTESRETRIEVED->EditAttrs["class"] = "form-control";
        $this->OOCYTESRETRIEVED->EditCustomAttributes = "";
        $this->OOCYTESRETRIEVED->EditValue = $this->OOCYTESRETRIEVED->CurrentValue;
        $this->OOCYTESRETRIEVED->PlaceHolder = RemoveHtml($this->OOCYTESRETRIEVED->caption());

        // TIME OF DENUDATION
        $this->TIMEOFDENUDATION->EditAttrs["class"] = "form-control";
        $this->TIMEOFDENUDATION->EditCustomAttributes = "";
        $this->TIMEOFDENUDATION->EditValue = $this->TIMEOFDENUDATION->CurrentValue;
        $this->TIMEOFDENUDATION->PlaceHolder = RemoveHtml($this->TIMEOFDENUDATION->caption());

        // M-II
        $this->MII->EditAttrs["class"] = "form-control";
        $this->MII->EditCustomAttributes = "";
        $this->MII->EditValue = $this->MII->CurrentValue;
        $this->MII->PlaceHolder = RemoveHtml($this->MII->caption());

        // MI
        $this->MI->EditAttrs["class"] = "form-control";
        $this->MI->EditCustomAttributes = "";
        $this->MI->EditValue = $this->MI->CurrentValue;
        $this->MI->PlaceHolder = RemoveHtml($this->MI->caption());

        // GV
        $this->GV->EditAttrs["class"] = "form-control";
        $this->GV->EditCustomAttributes = "";
        $this->GV->EditValue = $this->GV->CurrentValue;
        $this->GV->PlaceHolder = RemoveHtml($this->GV->caption());

        // ICSI TIME FORM OPU
        $this->ICSITIMEFORMOPU->EditAttrs["class"] = "form-control";
        $this->ICSITIMEFORMOPU->EditCustomAttributes = "";
        $this->ICSITIMEFORMOPU->EditValue = $this->ICSITIMEFORMOPU->CurrentValue;
        $this->ICSITIMEFORMOPU->PlaceHolder = RemoveHtml($this->ICSITIMEFORMOPU->caption());

        // FERT ( 2 PN )
        $this->FERT2PN->EditAttrs["class"] = "form-control";
        $this->FERT2PN->EditCustomAttributes = "";
        $this->FERT2PN->EditValue = $this->FERT2PN->CurrentValue;
        $this->FERT2PN->PlaceHolder = RemoveHtml($this->FERT2PN->caption());

        // DEG
        $this->DEG->EditAttrs["class"] = "form-control";
        $this->DEG->EditCustomAttributes = "";
        $this->DEG->EditValue = $this->DEG->CurrentValue;
        $this->DEG->PlaceHolder = RemoveHtml($this->DEG->caption());

        // D3 GRADE A
        $this->D3GRADEA->EditAttrs["class"] = "form-control";
        $this->D3GRADEA->EditCustomAttributes = "";
        $this->D3GRADEA->EditValue = $this->D3GRADEA->CurrentValue;
        $this->D3GRADEA->PlaceHolder = RemoveHtml($this->D3GRADEA->caption());

        // D3 GRADE B
        $this->D3GRADEB->EditAttrs["class"] = "form-control";
        $this->D3GRADEB->EditCustomAttributes = "";
        $this->D3GRADEB->EditValue = $this->D3GRADEB->CurrentValue;
        $this->D3GRADEB->PlaceHolder = RemoveHtml($this->D3GRADEB->caption());

        // D3 GRADE C
        $this->D3GRADEC->EditAttrs["class"] = "form-control";
        $this->D3GRADEC->EditCustomAttributes = "";
        $this->D3GRADEC->EditValue = $this->D3GRADEC->CurrentValue;
        $this->D3GRADEC->PlaceHolder = RemoveHtml($this->D3GRADEC->caption());

        // D3 GRADE D
        $this->D3GRADED->EditAttrs["class"] = "form-control";
        $this->D3GRADED->EditCustomAttributes = "";
        $this->D3GRADED->EditValue = $this->D3GRADED->CurrentValue;
        $this->D3GRADED->PlaceHolder = RemoveHtml($this->D3GRADED->caption());

        // USABLE ON DAY 3 ET
        $this->USABLEONDAY3ET->EditAttrs["class"] = "form-control";
        $this->USABLEONDAY3ET->EditCustomAttributes = "";
        $this->USABLEONDAY3ET->EditValue = $this->USABLEONDAY3ET->CurrentValue;
        $this->USABLEONDAY3ET->PlaceHolder = RemoveHtml($this->USABLEONDAY3ET->caption());

        // USABLE ON day 3 FREEZING
        $this->USABLEONday3FREEZING->EditAttrs["class"] = "form-control";
        $this->USABLEONday3FREEZING->EditCustomAttributes = "";
        $this->USABLEONday3FREEZING->EditValue = $this->USABLEONday3FREEZING->CurrentValue;
        $this->USABLEONday3FREEZING->PlaceHolder = RemoveHtml($this->USABLEONday3FREEZING->caption());

        // D5 GARDE A
        $this->D5GARDEA->EditAttrs["class"] = "form-control";
        $this->D5GARDEA->EditCustomAttributes = "";
        $this->D5GARDEA->EditValue = $this->D5GARDEA->CurrentValue;
        $this->D5GARDEA->PlaceHolder = RemoveHtml($this->D5GARDEA->caption());

        // D5 GRADE B
        $this->D5GRADEB->EditAttrs["class"] = "form-control";
        $this->D5GRADEB->EditCustomAttributes = "";
        $this->D5GRADEB->EditValue = $this->D5GRADEB->CurrentValue;
        $this->D5GRADEB->PlaceHolder = RemoveHtml($this->D5GRADEB->caption());

        // D5 GRADE C
        $this->D5GRADEC->EditAttrs["class"] = "form-control";
        $this->D5GRADEC->EditCustomAttributes = "";
        $this->D5GRADEC->EditValue = $this->D5GRADEC->CurrentValue;
        $this->D5GRADEC->PlaceHolder = RemoveHtml($this->D5GRADEC->caption());

        // D5 GRADE D
        $this->D5GRADED->EditAttrs["class"] = "form-control";
        $this->D5GRADED->EditCustomAttributes = "";
        $this->D5GRADED->EditValue = $this->D5GRADED->CurrentValue;
        $this->D5GRADED->PlaceHolder = RemoveHtml($this->D5GRADED->caption());

        // USABLE ON D5 ET
        $this->USABLEOND5ET->EditAttrs["class"] = "form-control";
        $this->USABLEOND5ET->EditCustomAttributes = "";
        $this->USABLEOND5ET->EditValue = $this->USABLEOND5ET->CurrentValue;
        $this->USABLEOND5ET->PlaceHolder = RemoveHtml($this->USABLEOND5ET->caption());

        // USABLE ON D5 FREEZING
        $this->USABLEOND5FREEZING->EditAttrs["class"] = "form-control";
        $this->USABLEOND5FREEZING->EditCustomAttributes = "";
        $this->USABLEOND5FREEZING->EditValue = $this->USABLEOND5FREEZING->CurrentValue;
        $this->USABLEOND5FREEZING->PlaceHolder = RemoveHtml($this->USABLEOND5FREEZING->caption());

        // D6 GRADE A
        $this->D6GRADEA->EditAttrs["class"] = "form-control";
        $this->D6GRADEA->EditCustomAttributes = "";
        $this->D6GRADEA->EditValue = $this->D6GRADEA->CurrentValue;
        $this->D6GRADEA->PlaceHolder = RemoveHtml($this->D6GRADEA->caption());

        // D6 GRADE B
        $this->D6GRADEB->EditAttrs["class"] = "form-control";
        $this->D6GRADEB->EditCustomAttributes = "";
        $this->D6GRADEB->EditValue = $this->D6GRADEB->CurrentValue;
        $this->D6GRADEB->PlaceHolder = RemoveHtml($this->D6GRADEB->caption());

        // D6 GRADE C
        $this->D6GRADEC->EditAttrs["class"] = "form-control";
        $this->D6GRADEC->EditCustomAttributes = "";
        $this->D6GRADEC->EditValue = $this->D6GRADEC->CurrentValue;
        $this->D6GRADEC->PlaceHolder = RemoveHtml($this->D6GRADEC->caption());

        // D6 GRADE D
        $this->D6GRADED->EditAttrs["class"] = "form-control";
        $this->D6GRADED->EditCustomAttributes = "";
        $this->D6GRADED->EditValue = $this->D6GRADED->CurrentValue;
        $this->D6GRADED->PlaceHolder = RemoveHtml($this->D6GRADED->caption());

        // D6 USABLE EMBRYO ET
        $this->D6USABLEEMBRYOET->EditAttrs["class"] = "form-control";
        $this->D6USABLEEMBRYOET->EditCustomAttributes = "";
        $this->D6USABLEEMBRYOET->EditValue = $this->D6USABLEEMBRYOET->CurrentValue;
        $this->D6USABLEEMBRYOET->PlaceHolder = RemoveHtml($this->D6USABLEEMBRYOET->caption());

        // D6 USABLE FREEZING
        $this->D6USABLEFREEZING->EditAttrs["class"] = "form-control";
        $this->D6USABLEFREEZING->EditCustomAttributes = "";
        $this->D6USABLEFREEZING->EditValue = $this->D6USABLEFREEZING->CurrentValue;
        $this->D6USABLEFREEZING->PlaceHolder = RemoveHtml($this->D6USABLEFREEZING->caption());

        // TOTAL BLAST
        $this->TOTALBLAST->EditAttrs["class"] = "form-control";
        $this->TOTALBLAST->EditCustomAttributes = "";
        $this->TOTALBLAST->EditValue = $this->TOTALBLAST->CurrentValue;
        $this->TOTALBLAST->PlaceHolder = RemoveHtml($this->TOTALBLAST->caption());

        // PGS
        $this->PGS->EditAttrs["class"] = "form-control";
        $this->PGS->EditCustomAttributes = "";
        $this->PGS->EditValue = $this->PGS->CurrentValue;
        $this->PGS->PlaceHolder = RemoveHtml($this->PGS->caption());

        // REMARKS
        $this->REMARKS->EditAttrs["class"] = "form-control";
        $this->REMARKS->EditCustomAttributes = "";
        $this->REMARKS->EditValue = $this->REMARKS->CurrentValue;
        $this->REMARKS->PlaceHolder = RemoveHtml($this->REMARKS->caption());

        // PU - D/B
        $this->PUDB->EditAttrs["class"] = "form-control";
        $this->PUDB->EditCustomAttributes = "";
        $this->PUDB->EditValue = $this->PUDB->CurrentValue;
        $this->PUDB->PlaceHolder = RemoveHtml($this->PUDB->caption());

        // ICSI D/B
        $this->ICSIDB->EditAttrs["class"] = "form-control";
        $this->ICSIDB->EditCustomAttributes = "";
        $this->ICSIDB->EditValue = $this->ICSIDB->CurrentValue;
        $this->ICSIDB->PlaceHolder = RemoveHtml($this->ICSIDB->caption());

        // VIT D/B
        $this->VITDB->EditAttrs["class"] = "form-control";
        $this->VITDB->EditCustomAttributes = "";
        $this->VITDB->EditValue = $this->VITDB->CurrentValue;
        $this->VITDB->PlaceHolder = RemoveHtml($this->VITDB->caption());

        // ET D/B
        $this->ETDB->EditAttrs["class"] = "form-control";
        $this->ETDB->EditCustomAttributes = "";
        $this->ETDB->EditValue = $this->ETDB->CurrentValue;
        $this->ETDB->PlaceHolder = RemoveHtml($this->ETDB->caption());

        // LAB COMMENTS
        $this->LABCOMMENTS->EditAttrs["class"] = "form-control";
        $this->LABCOMMENTS->EditCustomAttributes = "";
        $this->LABCOMMENTS->EditValue = $this->LABCOMMENTS->CurrentValue;
        $this->LABCOMMENTS->PlaceHolder = RemoveHtml($this->LABCOMMENTS->caption());

        // Reason for no FRESH transfer
        $this->ReasonfornoFRESHtransfer->EditAttrs["class"] = "form-control";
        $this->ReasonfornoFRESHtransfer->EditCustomAttributes = "";
        $this->ReasonfornoFRESHtransfer->EditValue = $this->ReasonfornoFRESHtransfer->CurrentValue;
        $this->ReasonfornoFRESHtransfer->PlaceHolder = RemoveHtml($this->ReasonfornoFRESHtransfer->caption());

        // No of embryos transferred Day 3/5, A,B,C
        $this->NoofembryostransferredDay35ABC->EditAttrs["class"] = "form-control";
        $this->NoofembryostransferredDay35ABC->EditCustomAttributes = "";
        $this->NoofembryostransferredDay35ABC->EditValue = $this->NoofembryostransferredDay35ABC->CurrentValue;
        $this->NoofembryostransferredDay35ABC->PlaceHolder = RemoveHtml($this->NoofembryostransferredDay35ABC->caption());

        // EMBRYOS PENDING
        $this->EMBRYOSPENDING->EditAttrs["class"] = "form-control";
        $this->EMBRYOSPENDING->EditCustomAttributes = "";
        $this->EMBRYOSPENDING->EditValue = $this->EMBRYOSPENDING->CurrentValue;
        $this->EMBRYOSPENDING->PlaceHolder = RemoveHtml($this->EMBRYOSPENDING->caption());

        // DAY OF TRANSFER
        $this->DAYOFTRANSFER->EditAttrs["class"] = "form-control";
        $this->DAYOFTRANSFER->EditCustomAttributes = "";
        $this->DAYOFTRANSFER->EditValue = $this->DAYOFTRANSFER->CurrentValue;
        $this->DAYOFTRANSFER->PlaceHolder = RemoveHtml($this->DAYOFTRANSFER->caption());

        // H/D sperm
        $this->HDsperm->EditAttrs["class"] = "form-control";
        $this->HDsperm->EditCustomAttributes = "";
        $this->HDsperm->EditValue = $this->HDsperm->CurrentValue;
        $this->HDsperm->PlaceHolder = RemoveHtml($this->HDsperm->caption());

        // Comments
        $this->Comments->EditAttrs["class"] = "form-control";
        $this->Comments->EditCustomAttributes = "";
        $this->Comments->EditValue = $this->Comments->CurrentValue;
        $this->Comments->PlaceHolder = RemoveHtml($this->Comments->caption());

        // sc progesterone
        $this->scprogesterone->EditAttrs["class"] = "form-control";
        $this->scprogesterone->EditCustomAttributes = "";
        $this->scprogesterone->EditValue = $this->scprogesterone->CurrentValue;
        $this->scprogesterone->PlaceHolder = RemoveHtml($this->scprogesterone->caption());

        // Natural micronised 400mg bd + duphaston 10mg bd
        $this->Naturalmicronised400mgbdduphaston10mgbd->EditAttrs["class"] = "form-control";
        $this->Naturalmicronised400mgbdduphaston10mgbd->EditCustomAttributes = "";
        $this->Naturalmicronised400mgbdduphaston10mgbd->EditValue = $this->Naturalmicronised400mgbdduphaston10mgbd->CurrentValue;
        $this->Naturalmicronised400mgbdduphaston10mgbd->PlaceHolder = RemoveHtml($this->Naturalmicronised400mgbdduphaston10mgbd->caption());

        // CRINONE
        $this->CRINONE->EditAttrs["class"] = "form-control";
        $this->CRINONE->EditCustomAttributes = "";
        $this->CRINONE->EditValue = $this->CRINONE->CurrentValue;
        $this->CRINONE->PlaceHolder = RemoveHtml($this->CRINONE->caption());

        // progynova
        $this->progynova->EditAttrs["class"] = "form-control";
        $this->progynova->EditCustomAttributes = "";
        $this->progynova->EditValue = $this->progynova->CurrentValue;
        $this->progynova->PlaceHolder = RemoveHtml($this->progynova->caption());

        // Heparin
        $this->Heparin->EditAttrs["class"] = "form-control";
        $this->Heparin->EditCustomAttributes = "";
        $this->Heparin->EditValue = $this->Heparin->CurrentValue;
        $this->Heparin->PlaceHolder = RemoveHtml($this->Heparin->caption());

        // cabergolin
        $this->cabergolin->EditAttrs["class"] = "form-control";
        $this->cabergolin->EditCustomAttributes = "";
        $this->cabergolin->EditValue = $this->cabergolin->CurrentValue;
        $this->cabergolin->PlaceHolder = RemoveHtml($this->cabergolin->caption());

        // Antagonist
        $this->Antagonist->EditAttrs["class"] = "form-control";
        $this->Antagonist->EditCustomAttributes = "";
        $this->Antagonist->EditValue = $this->Antagonist->CurrentValue;
        $this->Antagonist->PlaceHolder = RemoveHtml($this->Antagonist->caption());

        // OHSS
        $this->OHSS->EditAttrs["class"] = "form-control";
        $this->OHSS->EditCustomAttributes = "";
        $this->OHSS->EditValue = $this->OHSS->CurrentValue;
        $this->OHSS->PlaceHolder = RemoveHtml($this->OHSS->caption());

        // Complications
        $this->Complications->EditAttrs["class"] = "form-control";
        $this->Complications->EditCustomAttributes = "";
        $this->Complications->EditValue = $this->Complications->CurrentValue;
        $this->Complications->PlaceHolder = RemoveHtml($this->Complications->caption());

        // LP bleeding
        $this->LPbleeding->EditAttrs["class"] = "form-control";
        $this->LPbleeding->EditCustomAttributes = "";
        $this->LPbleeding->EditValue = $this->LPbleeding->CurrentValue;
        $this->LPbleeding->PlaceHolder = RemoveHtml($this->LPbleeding->caption());

        // ß-hCG
        $this->hCG->EditAttrs["class"] = "form-control";
        $this->hCG->EditCustomAttributes = "";
        $this->hCG->EditValue = $this->hCG->CurrentValue;
        $this->hCG->PlaceHolder = RemoveHtml($this->hCG->caption());

        // Implantation rate
        $this->Implantationrate->EditAttrs["class"] = "form-control";
        $this->Implantationrate->EditCustomAttributes = "";
        $this->Implantationrate->EditValue = $this->Implantationrate->CurrentValue;
        $this->Implantationrate->PlaceHolder = RemoveHtml($this->Implantationrate->caption());

        // Ectopic
        $this->Ectopic->EditAttrs["class"] = "form-control";
        $this->Ectopic->EditCustomAttributes = "";
        $this->Ectopic->EditValue = $this->Ectopic->CurrentValue;
        $this->Ectopic->PlaceHolder = RemoveHtml($this->Ectopic->caption());

        // Type of preg
        $this->Typeofpreg->EditAttrs["class"] = "form-control";
        $this->Typeofpreg->EditCustomAttributes = "";
        $this->Typeofpreg->EditValue = $this->Typeofpreg->CurrentValue;
        $this->Typeofpreg->PlaceHolder = RemoveHtml($this->Typeofpreg->caption());

        // ANC
        $this->ANC->EditAttrs["class"] = "form-control";
        $this->ANC->EditCustomAttributes = "";
        $this->ANC->EditValue = $this->ANC->CurrentValue;
        $this->ANC->PlaceHolder = RemoveHtml($this->ANC->caption());

        // anomalies
        $this->anomalies->EditAttrs["class"] = "form-control";
        $this->anomalies->EditCustomAttributes = "";
        $this->anomalies->EditValue = $this->anomalies->CurrentValue;
        $this->anomalies->PlaceHolder = RemoveHtml($this->anomalies->caption());

        // baby wt
        $this->babywt->EditAttrs["class"] = "form-control";
        $this->babywt->EditCustomAttributes = "";
        $this->babywt->EditValue = $this->babywt->CurrentValue;
        $this->babywt->PlaceHolder = RemoveHtml($this->babywt->caption());

        // GA at delivery
        $this->GAatdelivery->EditAttrs["class"] = "form-control";
        $this->GAatdelivery->EditCustomAttributes = "";
        $this->GAatdelivery->EditValue = $this->GAatdelivery->CurrentValue;
        $this->GAatdelivery->PlaceHolder = RemoveHtml($this->GAatdelivery->caption());

        // Pregnancy outcome
        $this->Pregnancyoutcome->EditAttrs["class"] = "form-control";
        $this->Pregnancyoutcome->EditCustomAttributes = "";
        $this->Pregnancyoutcome->EditValue = $this->Pregnancyoutcome->CurrentValue;
        $this->Pregnancyoutcome->PlaceHolder = RemoveHtml($this->Pregnancyoutcome->caption());

        // 1st FET
        $this->_1stFET->EditAttrs["class"] = "form-control";
        $this->_1stFET->EditCustomAttributes = "";
        $this->_1stFET->EditValue = $this->_1stFET->CurrentValue;
        $this->_1stFET->PlaceHolder = RemoveHtml($this->_1stFET->caption());

        // AFTER HYSTEROSCOPY
        $this->AFTERHYSTEROSCOPY->EditAttrs["class"] = "form-control";
        $this->AFTERHYSTEROSCOPY->EditCustomAttributes = "";
        $this->AFTERHYSTEROSCOPY->EditValue = $this->AFTERHYSTEROSCOPY->CurrentValue;
        $this->AFTERHYSTEROSCOPY->PlaceHolder = RemoveHtml($this->AFTERHYSTEROSCOPY->caption());

        // AFTER ERA
        $this->AFTERERA->EditAttrs["class"] = "form-control";
        $this->AFTERERA->EditCustomAttributes = "";
        $this->AFTERERA->EditValue = $this->AFTERERA->CurrentValue;
        $this->AFTERERA->PlaceHolder = RemoveHtml($this->AFTERERA->caption());

        // ERA
        $this->ERA->EditAttrs["class"] = "form-control";
        $this->ERA->EditCustomAttributes = "";
        $this->ERA->EditValue = $this->ERA->CurrentValue;
        $this->ERA->PlaceHolder = RemoveHtml($this->ERA->caption());

        // HRT
        $this->HRT->EditAttrs["class"] = "form-control";
        $this->HRT->EditCustomAttributes = "";
        $this->HRT->EditValue = $this->HRT->CurrentValue;
        $this->HRT->PlaceHolder = RemoveHtml($this->HRT->caption());

        // XGRAST/PRP
        $this->XGRASTPRP->EditAttrs["class"] = "form-control";
        $this->XGRASTPRP->EditCustomAttributes = "";
        $this->XGRASTPRP->EditValue = $this->XGRASTPRP->CurrentValue;
        $this->XGRASTPRP->PlaceHolder = RemoveHtml($this->XGRASTPRP->caption());

        // EMBRYO DETAILS DAY 3/ 5, A, B, C
        $this->EMBRYODETAILSDAY35ABC->EditAttrs["class"] = "form-control";
        $this->EMBRYODETAILSDAY35ABC->EditCustomAttributes = "";
        $this->EMBRYODETAILSDAY35ABC->EditValue = $this->EMBRYODETAILSDAY35ABC->CurrentValue;
        $this->EMBRYODETAILSDAY35ABC->PlaceHolder = RemoveHtml($this->EMBRYODETAILSDAY35ABC->caption());

        // LMWH 40MG
        $this->LMWH40MG->EditAttrs["class"] = "form-control";
        $this->LMWH40MG->EditCustomAttributes = "";
        $this->LMWH40MG->EditValue = $this->LMWH40MG->CurrentValue;
        $this->LMWH40MG->PlaceHolder = RemoveHtml($this->LMWH40MG->caption());

        // ß-hCG2
        $this->hCG2->EditAttrs["class"] = "form-control";
        $this->hCG2->EditCustomAttributes = "";
        $this->hCG2->EditValue = $this->hCG2->CurrentValue;
        $this->hCG2->PlaceHolder = RemoveHtml($this->hCG2->caption());

        // Implantation rate1
        $this->Implantationrate1->EditAttrs["class"] = "form-control";
        $this->Implantationrate1->EditCustomAttributes = "";
        $this->Implantationrate1->EditValue = $this->Implantationrate1->CurrentValue;
        $this->Implantationrate1->PlaceHolder = RemoveHtml($this->Implantationrate1->caption());

        // Ectopic1
        $this->Ectopic1->EditAttrs["class"] = "form-control";
        $this->Ectopic1->EditCustomAttributes = "";
        $this->Ectopic1->EditValue = $this->Ectopic1->CurrentValue;
        $this->Ectopic1->PlaceHolder = RemoveHtml($this->Ectopic1->caption());

        // Type of pregA
        $this->TypeofpregA->EditAttrs["class"] = "form-control";
        $this->TypeofpregA->EditCustomAttributes = "";
        $this->TypeofpregA->EditValue = $this->TypeofpregA->CurrentValue;
        $this->TypeofpregA->PlaceHolder = RemoveHtml($this->TypeofpregA->caption());

        // ANC1
        $this->ANC1->EditAttrs["class"] = "form-control";
        $this->ANC1->EditCustomAttributes = "";
        $this->ANC1->EditValue = $this->ANC1->CurrentValue;
        $this->ANC1->PlaceHolder = RemoveHtml($this->ANC1->caption());

        // anomalies2
        $this->anomalies2->EditAttrs["class"] = "form-control";
        $this->anomalies2->EditCustomAttributes = "";
        $this->anomalies2->EditValue = $this->anomalies2->CurrentValue;
        $this->anomalies2->PlaceHolder = RemoveHtml($this->anomalies2->caption());

        // baby wt2
        $this->babywt2->EditAttrs["class"] = "form-control";
        $this->babywt2->EditCustomAttributes = "";
        $this->babywt2->EditValue = $this->babywt2->CurrentValue;
        $this->babywt2->PlaceHolder = RemoveHtml($this->babywt2->caption());

        // GA at delivery1
        $this->GAatdelivery1->EditAttrs["class"] = "form-control";
        $this->GAatdelivery1->EditCustomAttributes = "";
        $this->GAatdelivery1->EditValue = $this->GAatdelivery1->CurrentValue;
        $this->GAatdelivery1->PlaceHolder = RemoveHtml($this->GAatdelivery1->caption());

        // Pregnancy outcome1
        $this->Pregnancyoutcome1->EditAttrs["class"] = "form-control";
        $this->Pregnancyoutcome1->EditCustomAttributes = "";
        $this->Pregnancyoutcome1->EditValue = $this->Pregnancyoutcome1->CurrentValue;
        $this->Pregnancyoutcome1->PlaceHolder = RemoveHtml($this->Pregnancyoutcome1->caption());

        // 2ND FET
        $this->_2NDFET->EditAttrs["class"] = "form-control";
        $this->_2NDFET->EditCustomAttributes = "";
        $this->_2NDFET->EditValue = $this->_2NDFET->CurrentValue;
        $this->_2NDFET->PlaceHolder = RemoveHtml($this->_2NDFET->caption());

        // AFTER HYSTEROSCOPY1
        $this->AFTERHYSTEROSCOPY1->EditAttrs["class"] = "form-control";
        $this->AFTERHYSTEROSCOPY1->EditCustomAttributes = "";
        $this->AFTERHYSTEROSCOPY1->EditValue = $this->AFTERHYSTEROSCOPY1->CurrentValue;
        $this->AFTERHYSTEROSCOPY1->PlaceHolder = RemoveHtml($this->AFTERHYSTEROSCOPY1->caption());

        // AFTER ERA1
        $this->AFTERERA1->EditAttrs["class"] = "form-control";
        $this->AFTERERA1->EditCustomAttributes = "";
        $this->AFTERERA1->EditValue = $this->AFTERERA1->CurrentValue;
        $this->AFTERERA1->PlaceHolder = RemoveHtml($this->AFTERERA1->caption());

        // ERA1
        $this->ERA1->EditAttrs["class"] = "form-control";
        $this->ERA1->EditCustomAttributes = "";
        $this->ERA1->EditValue = $this->ERA1->CurrentValue;
        $this->ERA1->PlaceHolder = RemoveHtml($this->ERA1->caption());

        // HRT1
        $this->HRT1->EditAttrs["class"] = "form-control";
        $this->HRT1->EditCustomAttributes = "";
        $this->HRT1->EditValue = $this->HRT1->CurrentValue;
        $this->HRT1->PlaceHolder = RemoveHtml($this->HRT1->caption());

        // XGRAST/PRP1
        $this->XGRASTPRP1->EditAttrs["class"] = "form-control";
        $this->XGRASTPRP1->EditCustomAttributes = "";
        $this->XGRASTPRP1->EditValue = $this->XGRASTPRP1->CurrentValue;
        $this->XGRASTPRP1->PlaceHolder = RemoveHtml($this->XGRASTPRP1->caption());

        // NUMBER OF EMBRYOS
        $this->NUMBEROFEMBRYOS->EditAttrs["class"] = "form-control";
        $this->NUMBEROFEMBRYOS->EditCustomAttributes = "";
        $this->NUMBEROFEMBRYOS->EditValue = $this->NUMBEROFEMBRYOS->CurrentValue;
        $this->NUMBEROFEMBRYOS->PlaceHolder = RemoveHtml($this->NUMBEROFEMBRYOS->caption());

        // EMBRYO DETAILS DAY 3/ 5,/6 A, B, C
        $this->EMBRYODETAILSDAY356ABC->EditAttrs["class"] = "form-control";
        $this->EMBRYODETAILSDAY356ABC->EditCustomAttributes = "";
        $this->EMBRYODETAILSDAY356ABC->EditValue = $this->EMBRYODETAILSDAY356ABC->CurrentValue;
        $this->EMBRYODETAILSDAY356ABC->PlaceHolder = RemoveHtml($this->EMBRYODETAILSDAY356ABC->caption());

        // INTRALIPID AND BARGLOBIN
        $this->INTRALIPIDANDBARGLOBIN->EditAttrs["class"] = "form-control";
        $this->INTRALIPIDANDBARGLOBIN->EditCustomAttributes = "";
        $this->INTRALIPIDANDBARGLOBIN->EditValue = $this->INTRALIPIDANDBARGLOBIN->CurrentValue;
        $this->INTRALIPIDANDBARGLOBIN->PlaceHolder = RemoveHtml($this->INTRALIPIDANDBARGLOBIN->caption());

        // LMWH 40MG1
        $this->LMWH40MG1->EditAttrs["class"] = "form-control";
        $this->LMWH40MG1->EditCustomAttributes = "";
        $this->LMWH40MG1->EditValue = $this->LMWH40MG1->CurrentValue;
        $this->LMWH40MG1->PlaceHolder = RemoveHtml($this->LMWH40MG1->caption());

        // ß-hCG1
        $this->hCG1->EditAttrs["class"] = "form-control";
        $this->hCG1->EditCustomAttributes = "";
        $this->hCG1->EditValue = $this->hCG1->CurrentValue;
        $this->hCG1->PlaceHolder = RemoveHtml($this->hCG1->caption());

        // Implantation rate2
        $this->Implantationrate2->EditAttrs["class"] = "form-control";
        $this->Implantationrate2->EditCustomAttributes = "";
        $this->Implantationrate2->EditValue = $this->Implantationrate2->CurrentValue;
        $this->Implantationrate2->PlaceHolder = RemoveHtml($this->Implantationrate2->caption());

        // Ectopic2
        $this->Ectopic2->EditAttrs["class"] = "form-control";
        $this->Ectopic2->EditCustomAttributes = "";
        $this->Ectopic2->EditValue = $this->Ectopic2->CurrentValue;
        $this->Ectopic2->PlaceHolder = RemoveHtml($this->Ectopic2->caption());

        // Type of preg2
        $this->Typeofpreg2->EditAttrs["class"] = "form-control";
        $this->Typeofpreg2->EditCustomAttributes = "";
        $this->Typeofpreg2->EditValue = $this->Typeofpreg2->CurrentValue;
        $this->Typeofpreg2->PlaceHolder = RemoveHtml($this->Typeofpreg2->caption());

        // ANCA
        $this->ANCA->EditAttrs["class"] = "form-control";
        $this->ANCA->EditCustomAttributes = "";
        $this->ANCA->EditValue = $this->ANCA->CurrentValue;
        $this->ANCA->PlaceHolder = RemoveHtml($this->ANCA->caption());

        // anomalies1
        $this->anomalies1->EditAttrs["class"] = "form-control";
        $this->anomalies1->EditCustomAttributes = "";
        $this->anomalies1->EditValue = $this->anomalies1->CurrentValue;
        $this->anomalies1->PlaceHolder = RemoveHtml($this->anomalies1->caption());

        // baby wt1
        $this->babywt1->EditAttrs["class"] = "form-control";
        $this->babywt1->EditCustomAttributes = "";
        $this->babywt1->EditValue = $this->babywt1->CurrentValue;
        $this->babywt1->PlaceHolder = RemoveHtml($this->babywt1->caption());

        // GA at delivery2
        $this->GAatdelivery2->EditAttrs["class"] = "form-control";
        $this->GAatdelivery2->EditCustomAttributes = "";
        $this->GAatdelivery2->EditValue = $this->GAatdelivery2->CurrentValue;
        $this->GAatdelivery2->PlaceHolder = RemoveHtml($this->GAatdelivery2->caption());

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
                    $doc->exportCaption($this->RIDNO);
                    $doc->exportCaption($this->Treatment);
                    $doc->exportCaption($this->Origin);
                    $doc->exportCaption($this->MaleIndications);
                    $doc->exportCaption($this->FemaleIndications);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->PatientID);
                    $doc->exportCaption($this->PartnerName);
                    $doc->exportCaption($this->PartnerID);
                    $doc->exportCaption($this->A4ICSICycle);
                    $doc->exportCaption($this->TotalICSICycle);
                    $doc->exportCaption($this->TypeOfInfertility);
                    $doc->exportCaption($this->RelevantHistory);
                    $doc->exportCaption($this->IUICycles);
                    $doc->exportCaption($this->AMH);
                    $doc->exportCaption($this->FBMI);
                    $doc->exportCaption($this->ANTAGONISTSTARTDAY);
                    $doc->exportCaption($this->OvarianSurgery);
                    $doc->exportCaption($this->OPUDATE);
                    $doc->exportCaption($this->RFSH1);
                    $doc->exportCaption($this->RFSH2);
                    $doc->exportCaption($this->RFSH3);
                    $doc->exportCaption($this->E21);
                    $doc->exportCaption($this->Hysteroscopy);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->Fweight);
                    $doc->exportCaption($this->AntiTPO);
                    $doc->exportCaption($this->AntiTG);
                    $doc->exportCaption($this->PatientAge);
                    $doc->exportCaption($this->PartnerAge);
                    $doc->exportCaption($this->CYCLES);
                    $doc->exportCaption($this->MF);
                    $doc->exportCaption($this->CauseOfINFERTILITY);
                    $doc->exportCaption($this->SIS);
                    $doc->exportCaption($this->Scratching);
                    $doc->exportCaption($this->Cannulation);
                    $doc->exportCaption($this->MEPRATE);
                    $doc->exportCaption($this->ROVARY);
                    $doc->exportCaption($this->RAFC);
                    $doc->exportCaption($this->LOVARY);
                    $doc->exportCaption($this->LAFC);
                    $doc->exportCaption($this->LH1);
                    $doc->exportCaption($this->E2);
                    $doc->exportCaption($this->StemCellInstallation);
                    $doc->exportCaption($this->DHEAS);
                    $doc->exportCaption($this->Mtorr);
                    $doc->exportCaption($this->AMH1);
                    $doc->exportCaption($this->LH);
                    $doc->exportCaption($this->BMIMALE);
                    $doc->exportCaption($this->MaleMedicalConditions);
                    $doc->exportCaption($this->MaleExamination);
                    $doc->exportCaption($this->SpermConcentration);
                    $doc->exportCaption($this->SpermMotilityPNP);
                    $doc->exportCaption($this->SpermMorphology);
                    $doc->exportCaption($this->SpermRetrival);
                    $doc->exportCaption($this->MTestosterone);
                    $doc->exportCaption($this->DFI);
                    $doc->exportCaption($this->PreRX);
                    $doc->exportCaption($this->CC100);
                    $doc->exportCaption($this->RFSH1A);
                    $doc->exportCaption($this->HMG1);
                    $doc->exportCaption($this->RLH);
                    $doc->exportCaption($this->HMG_HP);
                    $doc->exportCaption($this->day_of_HMG);
                    $doc->exportCaption($this->Reason_for_HMG);
                    $doc->exportCaption($this->RLH_day);
                    $doc->exportCaption($this->DAYSOFSTIMULATION);
                    $doc->exportCaption($this->AnychangeinbetweenDoseaddedday);
                    $doc->exportCaption($this->dayofAnta);
                    $doc->exportCaption($this->RFSHTD);
                    $doc->exportCaption($this->RFSHHMGTD);
                    $doc->exportCaption($this->RFSHRLHTD);
                    $doc->exportCaption($this->HMGTD);
                    $doc->exportCaption($this->LHTD);
                    $doc->exportCaption($this->D1LH);
                    $doc->exportCaption($this->D1E2);
                    $doc->exportCaption($this->TriggerdayE2);
                    $doc->exportCaption($this->TriggerdayP4);
                    $doc->exportCaption($this->TriggerdayLH);
                    $doc->exportCaption($this->VITD);
                    $doc->exportCaption($this->TRIGGERR);
                    $doc->exportCaption($this->BHCGBEFORERETRIEVAL);
                    $doc->exportCaption($this->LH12HRS);
                    $doc->exportCaption($this->P412HRS);
                    $doc->exportCaption($this->ETonhCGday);
                    $doc->exportCaption($this->ETdoppler);
                    $doc->exportCaption($this->VIFIVFI);
                    $doc->exportCaption($this->Endometrialabnormality);
                    $doc->exportCaption($this->AFCONS1);
                    $doc->exportCaption($this->TIMEOFOPUFROMTRIGGER);
                    $doc->exportCaption($this->SPERMTYPE);
                    $doc->exportCaption($this->EXPECTEDONTRIGGERDAY);
                    $doc->exportCaption($this->OOCYTESRETRIEVED);
                    $doc->exportCaption($this->TIMEOFDENUDATION);
                    $doc->exportCaption($this->MII);
                    $doc->exportCaption($this->MI);
                    $doc->exportCaption($this->GV);
                    $doc->exportCaption($this->ICSITIMEFORMOPU);
                    $doc->exportCaption($this->FERT2PN);
                    $doc->exportCaption($this->DEG);
                    $doc->exportCaption($this->D3GRADEA);
                    $doc->exportCaption($this->D3GRADEB);
                    $doc->exportCaption($this->D3GRADEC);
                    $doc->exportCaption($this->D3GRADED);
                    $doc->exportCaption($this->USABLEONDAY3ET);
                    $doc->exportCaption($this->USABLEONday3FREEZING);
                    $doc->exportCaption($this->D5GARDEA);
                    $doc->exportCaption($this->D5GRADEB);
                    $doc->exportCaption($this->D5GRADEC);
                    $doc->exportCaption($this->D5GRADED);
                    $doc->exportCaption($this->USABLEOND5ET);
                    $doc->exportCaption($this->USABLEOND5FREEZING);
                    $doc->exportCaption($this->D6GRADEA);
                    $doc->exportCaption($this->D6GRADEB);
                    $doc->exportCaption($this->D6GRADEC);
                    $doc->exportCaption($this->D6GRADED);
                    $doc->exportCaption($this->D6USABLEEMBRYOET);
                    $doc->exportCaption($this->D6USABLEFREEZING);
                    $doc->exportCaption($this->TOTALBLAST);
                    $doc->exportCaption($this->PGS);
                    $doc->exportCaption($this->REMARKS);
                    $doc->exportCaption($this->PUDB);
                    $doc->exportCaption($this->ICSIDB);
                    $doc->exportCaption($this->VITDB);
                    $doc->exportCaption($this->ETDB);
                    $doc->exportCaption($this->LABCOMMENTS);
                    $doc->exportCaption($this->ReasonfornoFRESHtransfer);
                    $doc->exportCaption($this->NoofembryostransferredDay35ABC);
                    $doc->exportCaption($this->EMBRYOSPENDING);
                    $doc->exportCaption($this->DAYOFTRANSFER);
                    $doc->exportCaption($this->HDsperm);
                    $doc->exportCaption($this->Comments);
                    $doc->exportCaption($this->scprogesterone);
                    $doc->exportCaption($this->Naturalmicronised400mgbdduphaston10mgbd);
                    $doc->exportCaption($this->CRINONE);
                    $doc->exportCaption($this->progynova);
                    $doc->exportCaption($this->Heparin);
                    $doc->exportCaption($this->cabergolin);
                    $doc->exportCaption($this->Antagonist);
                    $doc->exportCaption($this->OHSS);
                    $doc->exportCaption($this->Complications);
                    $doc->exportCaption($this->LPbleeding);
                    $doc->exportCaption($this->hCG);
                    $doc->exportCaption($this->Implantationrate);
                    $doc->exportCaption($this->Ectopic);
                    $doc->exportCaption($this->Typeofpreg);
                    $doc->exportCaption($this->ANC);
                    $doc->exportCaption($this->anomalies);
                    $doc->exportCaption($this->babywt);
                    $doc->exportCaption($this->GAatdelivery);
                    $doc->exportCaption($this->Pregnancyoutcome);
                    $doc->exportCaption($this->_1stFET);
                    $doc->exportCaption($this->AFTERHYSTEROSCOPY);
                    $doc->exportCaption($this->AFTERERA);
                    $doc->exportCaption($this->ERA);
                    $doc->exportCaption($this->HRT);
                    $doc->exportCaption($this->XGRASTPRP);
                    $doc->exportCaption($this->EMBRYODETAILSDAY35ABC);
                    $doc->exportCaption($this->LMWH40MG);
                    $doc->exportCaption($this->hCG2);
                    $doc->exportCaption($this->Implantationrate1);
                    $doc->exportCaption($this->Ectopic1);
                    $doc->exportCaption($this->TypeofpregA);
                    $doc->exportCaption($this->ANC1);
                    $doc->exportCaption($this->anomalies2);
                    $doc->exportCaption($this->babywt2);
                    $doc->exportCaption($this->GAatdelivery1);
                    $doc->exportCaption($this->Pregnancyoutcome1);
                    $doc->exportCaption($this->_2NDFET);
                    $doc->exportCaption($this->AFTERHYSTEROSCOPY1);
                    $doc->exportCaption($this->AFTERERA1);
                    $doc->exportCaption($this->ERA1);
                    $doc->exportCaption($this->HRT1);
                    $doc->exportCaption($this->XGRASTPRP1);
                    $doc->exportCaption($this->NUMBEROFEMBRYOS);
                    $doc->exportCaption($this->EMBRYODETAILSDAY356ABC);
                    $doc->exportCaption($this->INTRALIPIDANDBARGLOBIN);
                    $doc->exportCaption($this->LMWH40MG1);
                    $doc->exportCaption($this->hCG1);
                    $doc->exportCaption($this->Implantationrate2);
                    $doc->exportCaption($this->Ectopic2);
                    $doc->exportCaption($this->Typeofpreg2);
                    $doc->exportCaption($this->ANCA);
                    $doc->exportCaption($this->anomalies1);
                    $doc->exportCaption($this->babywt1);
                    $doc->exportCaption($this->GAatdelivery2);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->RIDNO);
                    $doc->exportCaption($this->Treatment);
                    $doc->exportCaption($this->Origin);
                    $doc->exportCaption($this->MaleIndications);
                    $doc->exportCaption($this->FemaleIndications);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->PatientID);
                    $doc->exportCaption($this->PartnerName);
                    $doc->exportCaption($this->PartnerID);
                    $doc->exportCaption($this->A4ICSICycle);
                    $doc->exportCaption($this->TotalICSICycle);
                    $doc->exportCaption($this->TypeOfInfertility);
                    $doc->exportCaption($this->RelevantHistory);
                    $doc->exportCaption($this->IUICycles);
                    $doc->exportCaption($this->AMH);
                    $doc->exportCaption($this->FBMI);
                    $doc->exportCaption($this->ANTAGONISTSTARTDAY);
                    $doc->exportCaption($this->OvarianSurgery);
                    $doc->exportCaption($this->OPUDATE);
                    $doc->exportCaption($this->RFSH1);
                    $doc->exportCaption($this->RFSH2);
                    $doc->exportCaption($this->RFSH3);
                    $doc->exportCaption($this->E21);
                    $doc->exportCaption($this->Hysteroscopy);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->Fweight);
                    $doc->exportCaption($this->AntiTPO);
                    $doc->exportCaption($this->AntiTG);
                    $doc->exportCaption($this->PatientAge);
                    $doc->exportCaption($this->PartnerAge);
                    $doc->exportCaption($this->ROVARY);
                    $doc->exportCaption($this->RAFC);
                    $doc->exportCaption($this->LOVARY);
                    $doc->exportCaption($this->LAFC);
                    $doc->exportCaption($this->E2);
                    $doc->exportCaption($this->AMH1);
                    $doc->exportCaption($this->BMIMALE);
                    $doc->exportCaption($this->MaleMedicalConditions);
                    $doc->exportCaption($this->CC100);
                    $doc->exportCaption($this->RFSH1A);
                    $doc->exportCaption($this->HMG1);
                    $doc->exportCaption($this->DAYSOFSTIMULATION);
                    $doc->exportCaption($this->TRIGGERR);
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
                        $doc->exportField($this->RIDNO);
                        $doc->exportField($this->Treatment);
                        $doc->exportField($this->Origin);
                        $doc->exportField($this->MaleIndications);
                        $doc->exportField($this->FemaleIndications);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->PatientID);
                        $doc->exportField($this->PartnerName);
                        $doc->exportField($this->PartnerID);
                        $doc->exportField($this->A4ICSICycle);
                        $doc->exportField($this->TotalICSICycle);
                        $doc->exportField($this->TypeOfInfertility);
                        $doc->exportField($this->RelevantHistory);
                        $doc->exportField($this->IUICycles);
                        $doc->exportField($this->AMH);
                        $doc->exportField($this->FBMI);
                        $doc->exportField($this->ANTAGONISTSTARTDAY);
                        $doc->exportField($this->OvarianSurgery);
                        $doc->exportField($this->OPUDATE);
                        $doc->exportField($this->RFSH1);
                        $doc->exportField($this->RFSH2);
                        $doc->exportField($this->RFSH3);
                        $doc->exportField($this->E21);
                        $doc->exportField($this->Hysteroscopy);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->Fweight);
                        $doc->exportField($this->AntiTPO);
                        $doc->exportField($this->AntiTG);
                        $doc->exportField($this->PatientAge);
                        $doc->exportField($this->PartnerAge);
                        $doc->exportField($this->CYCLES);
                        $doc->exportField($this->MF);
                        $doc->exportField($this->CauseOfINFERTILITY);
                        $doc->exportField($this->SIS);
                        $doc->exportField($this->Scratching);
                        $doc->exportField($this->Cannulation);
                        $doc->exportField($this->MEPRATE);
                        $doc->exportField($this->ROVARY);
                        $doc->exportField($this->RAFC);
                        $doc->exportField($this->LOVARY);
                        $doc->exportField($this->LAFC);
                        $doc->exportField($this->LH1);
                        $doc->exportField($this->E2);
                        $doc->exportField($this->StemCellInstallation);
                        $doc->exportField($this->DHEAS);
                        $doc->exportField($this->Mtorr);
                        $doc->exportField($this->AMH1);
                        $doc->exportField($this->LH);
                        $doc->exportField($this->BMIMALE);
                        $doc->exportField($this->MaleMedicalConditions);
                        $doc->exportField($this->MaleExamination);
                        $doc->exportField($this->SpermConcentration);
                        $doc->exportField($this->SpermMotilityPNP);
                        $doc->exportField($this->SpermMorphology);
                        $doc->exportField($this->SpermRetrival);
                        $doc->exportField($this->MTestosterone);
                        $doc->exportField($this->DFI);
                        $doc->exportField($this->PreRX);
                        $doc->exportField($this->CC100);
                        $doc->exportField($this->RFSH1A);
                        $doc->exportField($this->HMG1);
                        $doc->exportField($this->RLH);
                        $doc->exportField($this->HMG_HP);
                        $doc->exportField($this->day_of_HMG);
                        $doc->exportField($this->Reason_for_HMG);
                        $doc->exportField($this->RLH_day);
                        $doc->exportField($this->DAYSOFSTIMULATION);
                        $doc->exportField($this->AnychangeinbetweenDoseaddedday);
                        $doc->exportField($this->dayofAnta);
                        $doc->exportField($this->RFSHTD);
                        $doc->exportField($this->RFSHHMGTD);
                        $doc->exportField($this->RFSHRLHTD);
                        $doc->exportField($this->HMGTD);
                        $doc->exportField($this->LHTD);
                        $doc->exportField($this->D1LH);
                        $doc->exportField($this->D1E2);
                        $doc->exportField($this->TriggerdayE2);
                        $doc->exportField($this->TriggerdayP4);
                        $doc->exportField($this->TriggerdayLH);
                        $doc->exportField($this->VITD);
                        $doc->exportField($this->TRIGGERR);
                        $doc->exportField($this->BHCGBEFORERETRIEVAL);
                        $doc->exportField($this->LH12HRS);
                        $doc->exportField($this->P412HRS);
                        $doc->exportField($this->ETonhCGday);
                        $doc->exportField($this->ETdoppler);
                        $doc->exportField($this->VIFIVFI);
                        $doc->exportField($this->Endometrialabnormality);
                        $doc->exportField($this->AFCONS1);
                        $doc->exportField($this->TIMEOFOPUFROMTRIGGER);
                        $doc->exportField($this->SPERMTYPE);
                        $doc->exportField($this->EXPECTEDONTRIGGERDAY);
                        $doc->exportField($this->OOCYTESRETRIEVED);
                        $doc->exportField($this->TIMEOFDENUDATION);
                        $doc->exportField($this->MII);
                        $doc->exportField($this->MI);
                        $doc->exportField($this->GV);
                        $doc->exportField($this->ICSITIMEFORMOPU);
                        $doc->exportField($this->FERT2PN);
                        $doc->exportField($this->DEG);
                        $doc->exportField($this->D3GRADEA);
                        $doc->exportField($this->D3GRADEB);
                        $doc->exportField($this->D3GRADEC);
                        $doc->exportField($this->D3GRADED);
                        $doc->exportField($this->USABLEONDAY3ET);
                        $doc->exportField($this->USABLEONday3FREEZING);
                        $doc->exportField($this->D5GARDEA);
                        $doc->exportField($this->D5GRADEB);
                        $doc->exportField($this->D5GRADEC);
                        $doc->exportField($this->D5GRADED);
                        $doc->exportField($this->USABLEOND5ET);
                        $doc->exportField($this->USABLEOND5FREEZING);
                        $doc->exportField($this->D6GRADEA);
                        $doc->exportField($this->D6GRADEB);
                        $doc->exportField($this->D6GRADEC);
                        $doc->exportField($this->D6GRADED);
                        $doc->exportField($this->D6USABLEEMBRYOET);
                        $doc->exportField($this->D6USABLEFREEZING);
                        $doc->exportField($this->TOTALBLAST);
                        $doc->exportField($this->PGS);
                        $doc->exportField($this->REMARKS);
                        $doc->exportField($this->PUDB);
                        $doc->exportField($this->ICSIDB);
                        $doc->exportField($this->VITDB);
                        $doc->exportField($this->ETDB);
                        $doc->exportField($this->LABCOMMENTS);
                        $doc->exportField($this->ReasonfornoFRESHtransfer);
                        $doc->exportField($this->NoofembryostransferredDay35ABC);
                        $doc->exportField($this->EMBRYOSPENDING);
                        $doc->exportField($this->DAYOFTRANSFER);
                        $doc->exportField($this->HDsperm);
                        $doc->exportField($this->Comments);
                        $doc->exportField($this->scprogesterone);
                        $doc->exportField($this->Naturalmicronised400mgbdduphaston10mgbd);
                        $doc->exportField($this->CRINONE);
                        $doc->exportField($this->progynova);
                        $doc->exportField($this->Heparin);
                        $doc->exportField($this->cabergolin);
                        $doc->exportField($this->Antagonist);
                        $doc->exportField($this->OHSS);
                        $doc->exportField($this->Complications);
                        $doc->exportField($this->LPbleeding);
                        $doc->exportField($this->hCG);
                        $doc->exportField($this->Implantationrate);
                        $doc->exportField($this->Ectopic);
                        $doc->exportField($this->Typeofpreg);
                        $doc->exportField($this->ANC);
                        $doc->exportField($this->anomalies);
                        $doc->exportField($this->babywt);
                        $doc->exportField($this->GAatdelivery);
                        $doc->exportField($this->Pregnancyoutcome);
                        $doc->exportField($this->_1stFET);
                        $doc->exportField($this->AFTERHYSTEROSCOPY);
                        $doc->exportField($this->AFTERERA);
                        $doc->exportField($this->ERA);
                        $doc->exportField($this->HRT);
                        $doc->exportField($this->XGRASTPRP);
                        $doc->exportField($this->EMBRYODETAILSDAY35ABC);
                        $doc->exportField($this->LMWH40MG);
                        $doc->exportField($this->hCG2);
                        $doc->exportField($this->Implantationrate1);
                        $doc->exportField($this->Ectopic1);
                        $doc->exportField($this->TypeofpregA);
                        $doc->exportField($this->ANC1);
                        $doc->exportField($this->anomalies2);
                        $doc->exportField($this->babywt2);
                        $doc->exportField($this->GAatdelivery1);
                        $doc->exportField($this->Pregnancyoutcome1);
                        $doc->exportField($this->_2NDFET);
                        $doc->exportField($this->AFTERHYSTEROSCOPY1);
                        $doc->exportField($this->AFTERERA1);
                        $doc->exportField($this->ERA1);
                        $doc->exportField($this->HRT1);
                        $doc->exportField($this->XGRASTPRP1);
                        $doc->exportField($this->NUMBEROFEMBRYOS);
                        $doc->exportField($this->EMBRYODETAILSDAY356ABC);
                        $doc->exportField($this->INTRALIPIDANDBARGLOBIN);
                        $doc->exportField($this->LMWH40MG1);
                        $doc->exportField($this->hCG1);
                        $doc->exportField($this->Implantationrate2);
                        $doc->exportField($this->Ectopic2);
                        $doc->exportField($this->Typeofpreg2);
                        $doc->exportField($this->ANCA);
                        $doc->exportField($this->anomalies1);
                        $doc->exportField($this->babywt1);
                        $doc->exportField($this->GAatdelivery2);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->RIDNO);
                        $doc->exportField($this->Treatment);
                        $doc->exportField($this->Origin);
                        $doc->exportField($this->MaleIndications);
                        $doc->exportField($this->FemaleIndications);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->PatientID);
                        $doc->exportField($this->PartnerName);
                        $doc->exportField($this->PartnerID);
                        $doc->exportField($this->A4ICSICycle);
                        $doc->exportField($this->TotalICSICycle);
                        $doc->exportField($this->TypeOfInfertility);
                        $doc->exportField($this->RelevantHistory);
                        $doc->exportField($this->IUICycles);
                        $doc->exportField($this->AMH);
                        $doc->exportField($this->FBMI);
                        $doc->exportField($this->ANTAGONISTSTARTDAY);
                        $doc->exportField($this->OvarianSurgery);
                        $doc->exportField($this->OPUDATE);
                        $doc->exportField($this->RFSH1);
                        $doc->exportField($this->RFSH2);
                        $doc->exportField($this->RFSH3);
                        $doc->exportField($this->E21);
                        $doc->exportField($this->Hysteroscopy);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->Fweight);
                        $doc->exportField($this->AntiTPO);
                        $doc->exportField($this->AntiTG);
                        $doc->exportField($this->PatientAge);
                        $doc->exportField($this->PartnerAge);
                        $doc->exportField($this->ROVARY);
                        $doc->exportField($this->RAFC);
                        $doc->exportField($this->LOVARY);
                        $doc->exportField($this->LAFC);
                        $doc->exportField($this->E2);
                        $doc->exportField($this->AMH1);
                        $doc->exportField($this->BMIMALE);
                        $doc->exportField($this->MaleMedicalConditions);
                        $doc->exportField($this->CC100);
                        $doc->exportField($this->RFSH1A);
                        $doc->exportField($this->HMG1);
                        $doc->exportField($this->DAYSOFSTIMULATION);
                        $doc->exportField($this->TRIGGERR);
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
