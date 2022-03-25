<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for patient_an_registration
 */
class PatientAnRegistration extends DbTable
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
    public $pid;
    public $fid;
    public $G;
    public $P;
    public $L;
    public $A;
    public $E;
    public $M;
    public $LMP;
    public $EDO;
    public $MenstrualHistory;
    public $MaritalHistory;
    public $ObstetricHistory;
    public $PreviousHistoryofGDM;
    public $PreviousHistorofPIH;
    public $PreviousHistoryofIUGR;
    public $PreviousHistoryofOligohydramnios;
    public $PreviousHistoryofPreterm;
    public $G1;
    public $G2;
    public $G3;
    public $DeliveryNDLSCS1;
    public $DeliveryNDLSCS2;
    public $DeliveryNDLSCS3;
    public $BabySexweight1;
    public $BabySexweight2;
    public $BabySexweight3;
    public $PastMedicalHistory;
    public $PastSurgicalHistory;
    public $FamilyHistory;
    public $Viability;
    public $ViabilityDATE;
    public $ViabilityREPORT;
    public $Viability2;
    public $Viability2DATE;
    public $Viability2REPORT;
    public $NTscan;
    public $NTscanDATE;
    public $NTscanREPORT;
    public $EarlyTarget;
    public $EarlyTargetDATE;
    public $EarlyTargetREPORT;
    public $Anomaly;
    public $AnomalyDATE;
    public $AnomalyREPORT;
    public $Growth;
    public $GrowthDATE;
    public $GrowthREPORT;
    public $Growth1;
    public $Growth1DATE;
    public $Growth1REPORT;
    public $ANProfile;
    public $ANProfileDATE;
    public $ANProfileINHOUSE;
    public $ANProfileREPORT;
    public $DualMarker;
    public $DualMarkerDATE;
    public $DualMarkerINHOUSE;
    public $DualMarkerREPORT;
    public $Quadruple;
    public $QuadrupleDATE;
    public $QuadrupleINHOUSE;
    public $QuadrupleREPORT;
    public $A5month;
    public $A5monthDATE;
    public $A5monthINHOUSE;
    public $A5monthREPORT;
    public $A7month;
    public $A7monthDATE;
    public $A7monthINHOUSE;
    public $A7monthREPORT;
    public $A9month;
    public $A9monthDATE;
    public $A9monthINHOUSE;
    public $A9monthREPORT;
    public $INJ;
    public $INJDATE;
    public $INJINHOUSE;
    public $INJREPORT;
    public $Bleeding;
    public $Hypothyroidism;
    public $PICMENumber;
    public $Outcome;
    public $DateofAdmission;
    public $DateodProcedure;
    public $Miscarriage;
    public $ModeOfDelivery;
    public $ND;
    public $NDS;
    public $NDP;
    public $Vaccum;
    public $VaccumS;
    public $VaccumP;
    public $Forceps;
    public $ForcepsS;
    public $ForcepsP;
    public $Elective;
    public $ElectiveS;
    public $ElectiveP;
    public $Emergency;
    public $EmergencyS;
    public $EmergencyP;
    public $Maturity;
    public $Baby1;
    public $Baby2;
    public $sex1;
    public $sex2;
    public $weight1;
    public $weight2;
    public $NICU1;
    public $NICU2;
    public $Jaundice1;
    public $Jaundice2;
    public $Others1;
    public $Others2;
    public $SpillOverReasons;
    public $ANClosed;
    public $ANClosedDATE;
    public $PastMedicalHistoryOthers;
    public $PastSurgicalHistoryOthers;
    public $FamilyHistoryOthers;
    public $PresentPregnancyComplicationsOthers;
    public $ETdate;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'patient_an_registration';
        $this->TableName = 'patient_an_registration';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`patient_an_registration`";
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
        $this->id = new DbField('patient_an_registration', 'patient_an_registration', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // pid
        $this->pid = new DbField('patient_an_registration', 'patient_an_registration', 'x_pid', 'pid', '`pid`', '`pid`', 3, 11, -1, false, '`pid`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->pid->IsForeignKey = true; // Foreign key field
        $this->pid->Sortable = true; // Allow sort
        $this->pid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->pid->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->pid->Param, "CustomMsg");
        $this->Fields['pid'] = &$this->pid;

        // fid
        $this->fid = new DbField('patient_an_registration', 'patient_an_registration', 'x_fid', 'fid', '`fid`', '`fid`', 3, 11, -1, false, '`fid`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->fid->IsForeignKey = true; // Foreign key field
        $this->fid->Sortable = true; // Allow sort
        $this->fid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->fid->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->fid->Param, "CustomMsg");
        $this->Fields['fid'] = &$this->fid;

        // G
        $this->G = new DbField('patient_an_registration', 'patient_an_registration', 'x_G', 'G', '`G`', '`G`', 200, 45, -1, false, '`G`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->G->Sortable = true; // Allow sort
        $this->G->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->G->Param, "CustomMsg");
        $this->Fields['G'] = &$this->G;

        // P
        $this->P = new DbField('patient_an_registration', 'patient_an_registration', 'x_P', 'P', '`P`', '`P`', 200, 45, -1, false, '`P`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->P->Sortable = true; // Allow sort
        $this->P->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->P->Param, "CustomMsg");
        $this->Fields['P'] = &$this->P;

        // L
        $this->L = new DbField('patient_an_registration', 'patient_an_registration', 'x_L', 'L', '`L`', '`L`', 200, 45, -1, false, '`L`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->L->Sortable = true; // Allow sort
        $this->L->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->L->Param, "CustomMsg");
        $this->Fields['L'] = &$this->L;

        // A
        $this->A = new DbField('patient_an_registration', 'patient_an_registration', 'x_A', 'A', '`A`', '`A`', 200, 45, -1, false, '`A`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->A->Sortable = true; // Allow sort
        $this->A->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->A->Param, "CustomMsg");
        $this->Fields['A'] = &$this->A;

        // E
        $this->E = new DbField('patient_an_registration', 'patient_an_registration', 'x_E', 'E', '`E`', '`E`', 200, 45, -1, false, '`E`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->E->Sortable = true; // Allow sort
        $this->E->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->E->Param, "CustomMsg");
        $this->Fields['E'] = &$this->E;

        // M
        $this->M = new DbField('patient_an_registration', 'patient_an_registration', 'x_M', 'M', '`M`', '`M`', 200, 45, -1, false, '`M`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->M->Sortable = true; // Allow sort
        $this->M->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->M->Param, "CustomMsg");
        $this->Fields['M'] = &$this->M;

        // LMP
        $this->LMP = new DbField('patient_an_registration', 'patient_an_registration', 'x_LMP', 'LMP', '`LMP`', '`LMP`', 200, 45, 7, false, '`LMP`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->LMP->Sortable = true; // Allow sort
        $this->LMP->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->LMP->Param, "CustomMsg");
        $this->Fields['LMP'] = &$this->LMP;

        // EDO
        $this->EDO = new DbField('patient_an_registration', 'patient_an_registration', 'x_EDO', 'EDO', '`EDO`', '`EDO`', 200, 45, 7, false, '`EDO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EDO->Sortable = true; // Allow sort
        $this->EDO->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EDO->Param, "CustomMsg");
        $this->Fields['EDO'] = &$this->EDO;

        // MenstrualHistory
        $this->MenstrualHistory = new DbField('patient_an_registration', 'patient_an_registration', 'x_MenstrualHistory', 'MenstrualHistory', '`MenstrualHistory`', '`MenstrualHistory`', 200, 45, -1, false, '`MenstrualHistory`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->MenstrualHistory->Sortable = true; // Allow sort
        $this->MenstrualHistory->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->MenstrualHistory->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->MenstrualHistory->Lookup = new Lookup('MenstrualHistory', 'patient_an_registration', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->MenstrualHistory->OptionCount = 2;
        $this->MenstrualHistory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MenstrualHistory->Param, "CustomMsg");
        $this->Fields['MenstrualHistory'] = &$this->MenstrualHistory;

        // MaritalHistory
        $this->MaritalHistory = new DbField('patient_an_registration', 'patient_an_registration', 'x_MaritalHistory', 'MaritalHistory', '`MaritalHistory`', '`MaritalHistory`', 200, 45, -1, false, '`MaritalHistory`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MaritalHistory->Sortable = true; // Allow sort
        $this->MaritalHistory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MaritalHistory->Param, "CustomMsg");
        $this->Fields['MaritalHistory'] = &$this->MaritalHistory;

        // ObstetricHistory
        $this->ObstetricHistory = new DbField('patient_an_registration', 'patient_an_registration', 'x_ObstetricHistory', 'ObstetricHistory', '`ObstetricHistory`', '`ObstetricHistory`', 200, 45, -1, false, '`ObstetricHistory`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ObstetricHistory->Sortable = true; // Allow sort
        $this->ObstetricHistory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ObstetricHistory->Param, "CustomMsg");
        $this->Fields['ObstetricHistory'] = &$this->ObstetricHistory;

        // PreviousHistoryofGDM
        $this->PreviousHistoryofGDM = new DbField('patient_an_registration', 'patient_an_registration', 'x_PreviousHistoryofGDM', 'PreviousHistoryofGDM', '`PreviousHistoryofGDM`', '`PreviousHistoryofGDM`', 200, 45, -1, false, '`PreviousHistoryofGDM`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->PreviousHistoryofGDM->Sortable = true; // Allow sort
        $this->PreviousHistoryofGDM->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->PreviousHistoryofGDM->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->PreviousHistoryofGDM->Lookup = new Lookup('PreviousHistoryofGDM', 'patient_an_registration', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->PreviousHistoryofGDM->OptionCount = 2;
        $this->PreviousHistoryofGDM->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PreviousHistoryofGDM->Param, "CustomMsg");
        $this->Fields['PreviousHistoryofGDM'] = &$this->PreviousHistoryofGDM;

        // PreviousHistorofPIH
        $this->PreviousHistorofPIH = new DbField('patient_an_registration', 'patient_an_registration', 'x_PreviousHistorofPIH', 'PreviousHistorofPIH', '`PreviousHistorofPIH`', '`PreviousHistorofPIH`', 200, 45, -1, false, '`PreviousHistorofPIH`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->PreviousHistorofPIH->Sortable = true; // Allow sort
        $this->PreviousHistorofPIH->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->PreviousHistorofPIH->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->PreviousHistorofPIH->Lookup = new Lookup('PreviousHistorofPIH', 'patient_an_registration', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->PreviousHistorofPIH->OptionCount = 2;
        $this->PreviousHistorofPIH->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PreviousHistorofPIH->Param, "CustomMsg");
        $this->Fields['PreviousHistorofPIH'] = &$this->PreviousHistorofPIH;

        // PreviousHistoryofIUGR
        $this->PreviousHistoryofIUGR = new DbField('patient_an_registration', 'patient_an_registration', 'x_PreviousHistoryofIUGR', 'PreviousHistoryofIUGR', '`PreviousHistoryofIUGR`', '`PreviousHistoryofIUGR`', 200, 45, -1, false, '`PreviousHistoryofIUGR`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->PreviousHistoryofIUGR->Sortable = true; // Allow sort
        $this->PreviousHistoryofIUGR->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->PreviousHistoryofIUGR->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->PreviousHistoryofIUGR->Lookup = new Lookup('PreviousHistoryofIUGR', 'patient_an_registration', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->PreviousHistoryofIUGR->OptionCount = 2;
        $this->PreviousHistoryofIUGR->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PreviousHistoryofIUGR->Param, "CustomMsg");
        $this->Fields['PreviousHistoryofIUGR'] = &$this->PreviousHistoryofIUGR;

        // PreviousHistoryofOligohydramnios
        $this->PreviousHistoryofOligohydramnios = new DbField('patient_an_registration', 'patient_an_registration', 'x_PreviousHistoryofOligohydramnios', 'PreviousHistoryofOligohydramnios', '`PreviousHistoryofOligohydramnios`', '`PreviousHistoryofOligohydramnios`', 200, 45, -1, false, '`PreviousHistoryofOligohydramnios`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->PreviousHistoryofOligohydramnios->Sortable = true; // Allow sort
        $this->PreviousHistoryofOligohydramnios->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->PreviousHistoryofOligohydramnios->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->PreviousHistoryofOligohydramnios->Lookup = new Lookup('PreviousHistoryofOligohydramnios', 'patient_an_registration', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->PreviousHistoryofOligohydramnios->OptionCount = 2;
        $this->PreviousHistoryofOligohydramnios->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PreviousHistoryofOligohydramnios->Param, "CustomMsg");
        $this->Fields['PreviousHistoryofOligohydramnios'] = &$this->PreviousHistoryofOligohydramnios;

        // PreviousHistoryofPreterm
        $this->PreviousHistoryofPreterm = new DbField('patient_an_registration', 'patient_an_registration', 'x_PreviousHistoryofPreterm', 'PreviousHistoryofPreterm', '`PreviousHistoryofPreterm`', '`PreviousHistoryofPreterm`', 200, 45, -1, false, '`PreviousHistoryofPreterm`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->PreviousHistoryofPreterm->Sortable = true; // Allow sort
        $this->PreviousHistoryofPreterm->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->PreviousHistoryofPreterm->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->PreviousHistoryofPreterm->Lookup = new Lookup('PreviousHistoryofPreterm', 'patient_an_registration', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->PreviousHistoryofPreterm->OptionCount = 2;
        $this->PreviousHistoryofPreterm->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PreviousHistoryofPreterm->Param, "CustomMsg");
        $this->Fields['PreviousHistoryofPreterm'] = &$this->PreviousHistoryofPreterm;

        // G1
        $this->G1 = new DbField('patient_an_registration', 'patient_an_registration', 'x_G1', 'G1', '`G1`', '`G1`', 200, 45, -1, false, '`G1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->G1->Sortable = true; // Allow sort
        $this->G1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->G1->Param, "CustomMsg");
        $this->Fields['G1'] = &$this->G1;

        // G2
        $this->G2 = new DbField('patient_an_registration', 'patient_an_registration', 'x_G2', 'G2', '`G2`', '`G2`', 200, 45, -1, false, '`G2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->G2->Sortable = true; // Allow sort
        $this->G2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->G2->Param, "CustomMsg");
        $this->Fields['G2'] = &$this->G2;

        // G3
        $this->G3 = new DbField('patient_an_registration', 'patient_an_registration', 'x_G3', 'G3', '`G3`', '`G3`', 200, 45, -1, false, '`G3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->G3->Sortable = true; // Allow sort
        $this->G3->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->G3->Param, "CustomMsg");
        $this->Fields['G3'] = &$this->G3;

        // DeliveryNDLSCS1
        $this->DeliveryNDLSCS1 = new DbField('patient_an_registration', 'patient_an_registration', 'x_DeliveryNDLSCS1', 'DeliveryNDLSCS1', '`DeliveryNDLSCS1`', '`DeliveryNDLSCS1`', 200, 45, -1, false, '`DeliveryNDLSCS1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DeliveryNDLSCS1->Sortable = true; // Allow sort
        $this->DeliveryNDLSCS1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DeliveryNDLSCS1->Param, "CustomMsg");
        $this->Fields['DeliveryNDLSCS1'] = &$this->DeliveryNDLSCS1;

        // DeliveryNDLSCS2
        $this->DeliveryNDLSCS2 = new DbField('patient_an_registration', 'patient_an_registration', 'x_DeliveryNDLSCS2', 'DeliveryNDLSCS2', '`DeliveryNDLSCS2`', '`DeliveryNDLSCS2`', 200, 45, -1, false, '`DeliveryNDLSCS2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DeliveryNDLSCS2->Sortable = true; // Allow sort
        $this->DeliveryNDLSCS2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DeliveryNDLSCS2->Param, "CustomMsg");
        $this->Fields['DeliveryNDLSCS2'] = &$this->DeliveryNDLSCS2;

        // DeliveryNDLSCS3
        $this->DeliveryNDLSCS3 = new DbField('patient_an_registration', 'patient_an_registration', 'x_DeliveryNDLSCS3', 'DeliveryNDLSCS3', '`DeliveryNDLSCS3`', '`DeliveryNDLSCS3`', 200, 45, -1, false, '`DeliveryNDLSCS3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DeliveryNDLSCS3->Sortable = true; // Allow sort
        $this->DeliveryNDLSCS3->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DeliveryNDLSCS3->Param, "CustomMsg");
        $this->Fields['DeliveryNDLSCS3'] = &$this->DeliveryNDLSCS3;

        // BabySexweight1
        $this->BabySexweight1 = new DbField('patient_an_registration', 'patient_an_registration', 'x_BabySexweight1', 'BabySexweight1', '`BabySexweight1`', '`BabySexweight1`', 200, 45, -1, false, '`BabySexweight1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BabySexweight1->Sortable = true; // Allow sort
        $this->BabySexweight1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BabySexweight1->Param, "CustomMsg");
        $this->Fields['BabySexweight1'] = &$this->BabySexweight1;

        // BabySexweight2
        $this->BabySexweight2 = new DbField('patient_an_registration', 'patient_an_registration', 'x_BabySexweight2', 'BabySexweight2', '`BabySexweight2`', '`BabySexweight2`', 200, 45, -1, false, '`BabySexweight2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BabySexweight2->Sortable = true; // Allow sort
        $this->BabySexweight2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BabySexweight2->Param, "CustomMsg");
        $this->Fields['BabySexweight2'] = &$this->BabySexweight2;

        // BabySexweight3
        $this->BabySexweight3 = new DbField('patient_an_registration', 'patient_an_registration', 'x_BabySexweight3', 'BabySexweight3', '`BabySexweight3`', '`BabySexweight3`', 200, 45, -1, false, '`BabySexweight3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BabySexweight3->Sortable = true; // Allow sort
        $this->BabySexweight3->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BabySexweight3->Param, "CustomMsg");
        $this->Fields['BabySexweight3'] = &$this->BabySexweight3;

        // PastMedicalHistory
        $this->PastMedicalHistory = new DbField('patient_an_registration', 'patient_an_registration', 'x_PastMedicalHistory', 'PastMedicalHistory', '`PastMedicalHistory`', '`PastMedicalHistory`', 200, 45, -1, false, '`PastMedicalHistory`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->PastMedicalHistory->Sortable = true; // Allow sort
        $this->PastMedicalHistory->Lookup = new Lookup('PastMedicalHistory', 'patient_an_registration', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->PastMedicalHistory->OptionCount = 7;
        $this->PastMedicalHistory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PastMedicalHistory->Param, "CustomMsg");
        $this->Fields['PastMedicalHistory'] = &$this->PastMedicalHistory;

        // PastSurgicalHistory
        $this->PastSurgicalHistory = new DbField('patient_an_registration', 'patient_an_registration', 'x_PastSurgicalHistory', 'PastSurgicalHistory', '`PastSurgicalHistory`', '`PastSurgicalHistory`', 200, 45, -1, false, '`PastSurgicalHistory`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->PastSurgicalHistory->Sortable = true; // Allow sort
        $this->PastSurgicalHistory->Lookup = new Lookup('PastSurgicalHistory', 'patient_an_registration', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->PastSurgicalHistory->OptionCount = 2;
        $this->PastSurgicalHistory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PastSurgicalHistory->Param, "CustomMsg");
        $this->Fields['PastSurgicalHistory'] = &$this->PastSurgicalHistory;

        // FamilyHistory
        $this->FamilyHistory = new DbField('patient_an_registration', 'patient_an_registration', 'x_FamilyHistory', 'FamilyHistory', '`FamilyHistory`', '`FamilyHistory`', 200, 45, -1, false, '`FamilyHistory`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->FamilyHistory->Sortable = true; // Allow sort
        $this->FamilyHistory->Lookup = new Lookup('FamilyHistory', 'patient_an_registration', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->FamilyHistory->OptionCount = 5;
        $this->FamilyHistory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FamilyHistory->Param, "CustomMsg");
        $this->Fields['FamilyHistory'] = &$this->FamilyHistory;

        // Viability
        $this->Viability = new DbField('patient_an_registration', 'patient_an_registration', 'x_Viability', 'Viability', '`Viability`', '`Viability`', 200, 45, -1, false, '`Viability`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Viability->Sortable = true; // Allow sort
        $this->Viability->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Viability->Param, "CustomMsg");
        $this->Fields['Viability'] = &$this->Viability;

        // ViabilityDATE
        $this->ViabilityDATE = new DbField('patient_an_registration', 'patient_an_registration', 'x_ViabilityDATE', 'ViabilityDATE', '`ViabilityDATE`', '`ViabilityDATE`', 200, 45, 7, false, '`ViabilityDATE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ViabilityDATE->Sortable = true; // Allow sort
        $this->ViabilityDATE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ViabilityDATE->Param, "CustomMsg");
        $this->Fields['ViabilityDATE'] = &$this->ViabilityDATE;

        // ViabilityREPORT
        $this->ViabilityREPORT = new DbField('patient_an_registration', 'patient_an_registration', 'x_ViabilityREPORT', 'ViabilityREPORT', '`ViabilityREPORT`', '`ViabilityREPORT`', 201, 450, -1, false, '`ViabilityREPORT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ViabilityREPORT->Sortable = true; // Allow sort
        $this->ViabilityREPORT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ViabilityREPORT->Param, "CustomMsg");
        $this->Fields['ViabilityREPORT'] = &$this->ViabilityREPORT;

        // Viability2
        $this->Viability2 = new DbField('patient_an_registration', 'patient_an_registration', 'x_Viability2', 'Viability2', '`Viability2`', '`Viability2`', 200, 45, -1, false, '`Viability2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Viability2->Sortable = true; // Allow sort
        $this->Viability2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Viability2->Param, "CustomMsg");
        $this->Fields['Viability2'] = &$this->Viability2;

        // Viability2DATE
        $this->Viability2DATE = new DbField('patient_an_registration', 'patient_an_registration', 'x_Viability2DATE', 'Viability2DATE', '`Viability2DATE`', '`Viability2DATE`', 200, 45, 7, false, '`Viability2DATE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Viability2DATE->Sortable = true; // Allow sort
        $this->Viability2DATE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Viability2DATE->Param, "CustomMsg");
        $this->Fields['Viability2DATE'] = &$this->Viability2DATE;

        // Viability2REPORT
        $this->Viability2REPORT = new DbField('patient_an_registration', 'patient_an_registration', 'x_Viability2REPORT', 'Viability2REPORT', '`Viability2REPORT`', '`Viability2REPORT`', 201, 450, -1, false, '`Viability2REPORT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Viability2REPORT->Sortable = true; // Allow sort
        $this->Viability2REPORT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Viability2REPORT->Param, "CustomMsg");
        $this->Fields['Viability2REPORT'] = &$this->Viability2REPORT;

        // NTscan
        $this->NTscan = new DbField('patient_an_registration', 'patient_an_registration', 'x_NTscan', 'NTscan', '`NTscan`', '`NTscan`', 200, 45, -1, false, '`NTscan`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NTscan->Sortable = true; // Allow sort
        $this->NTscan->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->NTscan->Param, "CustomMsg");
        $this->Fields['NTscan'] = &$this->NTscan;

        // NTscanDATE
        $this->NTscanDATE = new DbField('patient_an_registration', 'patient_an_registration', 'x_NTscanDATE', 'NTscanDATE', '`NTscanDATE`', '`NTscanDATE`', 200, 45, 7, false, '`NTscanDATE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NTscanDATE->Sortable = true; // Allow sort
        $this->NTscanDATE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->NTscanDATE->Param, "CustomMsg");
        $this->Fields['NTscanDATE'] = &$this->NTscanDATE;

        // NTscanREPORT
        $this->NTscanREPORT = new DbField('patient_an_registration', 'patient_an_registration', 'x_NTscanREPORT', 'NTscanREPORT', '`NTscanREPORT`', '`NTscanREPORT`', 201, 450, -1, false, '`NTscanREPORT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NTscanREPORT->Sortable = true; // Allow sort
        $this->NTscanREPORT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->NTscanREPORT->Param, "CustomMsg");
        $this->Fields['NTscanREPORT'] = &$this->NTscanREPORT;

        // EarlyTarget
        $this->EarlyTarget = new DbField('patient_an_registration', 'patient_an_registration', 'x_EarlyTarget', 'EarlyTarget', '`EarlyTarget`', '`EarlyTarget`', 200, 45, -1, false, '`EarlyTarget`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EarlyTarget->Sortable = true; // Allow sort
        $this->EarlyTarget->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EarlyTarget->Param, "CustomMsg");
        $this->Fields['EarlyTarget'] = &$this->EarlyTarget;

        // EarlyTargetDATE
        $this->EarlyTargetDATE = new DbField('patient_an_registration', 'patient_an_registration', 'x_EarlyTargetDATE', 'EarlyTargetDATE', '`EarlyTargetDATE`', '`EarlyTargetDATE`', 200, 45, 7, false, '`EarlyTargetDATE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EarlyTargetDATE->Sortable = true; // Allow sort
        $this->EarlyTargetDATE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EarlyTargetDATE->Param, "CustomMsg");
        $this->Fields['EarlyTargetDATE'] = &$this->EarlyTargetDATE;

        // EarlyTargetREPORT
        $this->EarlyTargetREPORT = new DbField('patient_an_registration', 'patient_an_registration', 'x_EarlyTargetREPORT', 'EarlyTargetREPORT', '`EarlyTargetREPORT`', '`EarlyTargetREPORT`', 201, 450, -1, false, '`EarlyTargetREPORT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EarlyTargetREPORT->Sortable = true; // Allow sort
        $this->EarlyTargetREPORT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EarlyTargetREPORT->Param, "CustomMsg");
        $this->Fields['EarlyTargetREPORT'] = &$this->EarlyTargetREPORT;

        // Anomaly
        $this->Anomaly = new DbField('patient_an_registration', 'patient_an_registration', 'x_Anomaly', 'Anomaly', '`Anomaly`', '`Anomaly`', 200, 45, -1, false, '`Anomaly`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Anomaly->Sortable = true; // Allow sort
        $this->Anomaly->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Anomaly->Param, "CustomMsg");
        $this->Fields['Anomaly'] = &$this->Anomaly;

        // AnomalyDATE
        $this->AnomalyDATE = new DbField('patient_an_registration', 'patient_an_registration', 'x_AnomalyDATE', 'AnomalyDATE', '`AnomalyDATE`', '`AnomalyDATE`', 200, 45, 7, false, '`AnomalyDATE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AnomalyDATE->Sortable = true; // Allow sort
        $this->AnomalyDATE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AnomalyDATE->Param, "CustomMsg");
        $this->Fields['AnomalyDATE'] = &$this->AnomalyDATE;

        // AnomalyREPORT
        $this->AnomalyREPORT = new DbField('patient_an_registration', 'patient_an_registration', 'x_AnomalyREPORT', 'AnomalyREPORT', '`AnomalyREPORT`', '`AnomalyREPORT`', 201, 450, -1, false, '`AnomalyREPORT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AnomalyREPORT->Sortable = true; // Allow sort
        $this->AnomalyREPORT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AnomalyREPORT->Param, "CustomMsg");
        $this->Fields['AnomalyREPORT'] = &$this->AnomalyREPORT;

        // Growth
        $this->Growth = new DbField('patient_an_registration', 'patient_an_registration', 'x_Growth', 'Growth', '`Growth`', '`Growth`', 200, 45, -1, false, '`Growth`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Growth->Sortable = true; // Allow sort
        $this->Growth->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Growth->Param, "CustomMsg");
        $this->Fields['Growth'] = &$this->Growth;

        // GrowthDATE
        $this->GrowthDATE = new DbField('patient_an_registration', 'patient_an_registration', 'x_GrowthDATE', 'GrowthDATE', '`GrowthDATE`', '`GrowthDATE`', 200, 45, 7, false, '`GrowthDATE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GrowthDATE->Sortable = true; // Allow sort
        $this->GrowthDATE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GrowthDATE->Param, "CustomMsg");
        $this->Fields['GrowthDATE'] = &$this->GrowthDATE;

        // GrowthREPORT
        $this->GrowthREPORT = new DbField('patient_an_registration', 'patient_an_registration', 'x_GrowthREPORT', 'GrowthREPORT', '`GrowthREPORT`', '`GrowthREPORT`', 201, 450, -1, false, '`GrowthREPORT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GrowthREPORT->Sortable = true; // Allow sort
        $this->GrowthREPORT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GrowthREPORT->Param, "CustomMsg");
        $this->Fields['GrowthREPORT'] = &$this->GrowthREPORT;

        // Growth1
        $this->Growth1 = new DbField('patient_an_registration', 'patient_an_registration', 'x_Growth1', 'Growth1', '`Growth1`', '`Growth1`', 200, 45, -1, false, '`Growth1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Growth1->Sortable = true; // Allow sort
        $this->Growth1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Growth1->Param, "CustomMsg");
        $this->Fields['Growth1'] = &$this->Growth1;

        // Growth1DATE
        $this->Growth1DATE = new DbField('patient_an_registration', 'patient_an_registration', 'x_Growth1DATE', 'Growth1DATE', '`Growth1DATE`', '`Growth1DATE`', 200, 45, 7, false, '`Growth1DATE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Growth1DATE->Sortable = true; // Allow sort
        $this->Growth1DATE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Growth1DATE->Param, "CustomMsg");
        $this->Fields['Growth1DATE'] = &$this->Growth1DATE;

        // Growth1REPORT
        $this->Growth1REPORT = new DbField('patient_an_registration', 'patient_an_registration', 'x_Growth1REPORT', 'Growth1REPORT', '`Growth1REPORT`', '`Growth1REPORT`', 201, 450, -1, false, '`Growth1REPORT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Growth1REPORT->Sortable = true; // Allow sort
        $this->Growth1REPORT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Growth1REPORT->Param, "CustomMsg");
        $this->Fields['Growth1REPORT'] = &$this->Growth1REPORT;

        // ANProfile
        $this->ANProfile = new DbField('patient_an_registration', 'patient_an_registration', 'x_ANProfile', 'ANProfile', '`ANProfile`', '`ANProfile`', 200, 45, -1, false, '`ANProfile`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ANProfile->Sortable = true; // Allow sort
        $this->ANProfile->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ANProfile->Param, "CustomMsg");
        $this->Fields['ANProfile'] = &$this->ANProfile;

        // ANProfileDATE
        $this->ANProfileDATE = new DbField('patient_an_registration', 'patient_an_registration', 'x_ANProfileDATE', 'ANProfileDATE', '`ANProfileDATE`', '`ANProfileDATE`', 200, 45, 7, false, '`ANProfileDATE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ANProfileDATE->Sortable = true; // Allow sort
        $this->ANProfileDATE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ANProfileDATE->Param, "CustomMsg");
        $this->Fields['ANProfileDATE'] = &$this->ANProfileDATE;

        // ANProfileINHOUSE
        $this->ANProfileINHOUSE = new DbField('patient_an_registration', 'patient_an_registration', 'x_ANProfileINHOUSE', 'ANProfileINHOUSE', '`ANProfileINHOUSE`', '`ANProfileINHOUSE`', 200, 45, -1, false, '`ANProfileINHOUSE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ANProfileINHOUSE->Sortable = true; // Allow sort
        $this->ANProfileINHOUSE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ANProfileINHOUSE->Param, "CustomMsg");
        $this->Fields['ANProfileINHOUSE'] = &$this->ANProfileINHOUSE;

        // ANProfileREPORT
        $this->ANProfileREPORT = new DbField('patient_an_registration', 'patient_an_registration', 'x_ANProfileREPORT', 'ANProfileREPORT', '`ANProfileREPORT`', '`ANProfileREPORT`', 201, 450, -1, false, '`ANProfileREPORT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ANProfileREPORT->Sortable = true; // Allow sort
        $this->ANProfileREPORT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ANProfileREPORT->Param, "CustomMsg");
        $this->Fields['ANProfileREPORT'] = &$this->ANProfileREPORT;

        // DualMarker
        $this->DualMarker = new DbField('patient_an_registration', 'patient_an_registration', 'x_DualMarker', 'DualMarker', '`DualMarker`', '`DualMarker`', 200, 45, -1, false, '`DualMarker`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DualMarker->Sortable = true; // Allow sort
        $this->DualMarker->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DualMarker->Param, "CustomMsg");
        $this->Fields['DualMarker'] = &$this->DualMarker;

        // DualMarkerDATE
        $this->DualMarkerDATE = new DbField('patient_an_registration', 'patient_an_registration', 'x_DualMarkerDATE', 'DualMarkerDATE', '`DualMarkerDATE`', '`DualMarkerDATE`', 200, 45, 7, false, '`DualMarkerDATE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DualMarkerDATE->Sortable = true; // Allow sort
        $this->DualMarkerDATE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DualMarkerDATE->Param, "CustomMsg");
        $this->Fields['DualMarkerDATE'] = &$this->DualMarkerDATE;

        // DualMarkerINHOUSE
        $this->DualMarkerINHOUSE = new DbField('patient_an_registration', 'patient_an_registration', 'x_DualMarkerINHOUSE', 'DualMarkerINHOUSE', '`DualMarkerINHOUSE`', '`DualMarkerINHOUSE`', 200, 45, -1, false, '`DualMarkerINHOUSE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DualMarkerINHOUSE->Sortable = true; // Allow sort
        $this->DualMarkerINHOUSE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DualMarkerINHOUSE->Param, "CustomMsg");
        $this->Fields['DualMarkerINHOUSE'] = &$this->DualMarkerINHOUSE;

        // DualMarkerREPORT
        $this->DualMarkerREPORT = new DbField('patient_an_registration', 'patient_an_registration', 'x_DualMarkerREPORT', 'DualMarkerREPORT', '`DualMarkerREPORT`', '`DualMarkerREPORT`', 201, 450, -1, false, '`DualMarkerREPORT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DualMarkerREPORT->Sortable = true; // Allow sort
        $this->DualMarkerREPORT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DualMarkerREPORT->Param, "CustomMsg");
        $this->Fields['DualMarkerREPORT'] = &$this->DualMarkerREPORT;

        // Quadruple
        $this->Quadruple = new DbField('patient_an_registration', 'patient_an_registration', 'x_Quadruple', 'Quadruple', '`Quadruple`', '`Quadruple`', 200, 45, -1, false, '`Quadruple`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Quadruple->Sortable = true; // Allow sort
        $this->Quadruple->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Quadruple->Param, "CustomMsg");
        $this->Fields['Quadruple'] = &$this->Quadruple;

        // QuadrupleDATE
        $this->QuadrupleDATE = new DbField('patient_an_registration', 'patient_an_registration', 'x_QuadrupleDATE', 'QuadrupleDATE', '`QuadrupleDATE`', '`QuadrupleDATE`', 200, 45, 7, false, '`QuadrupleDATE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->QuadrupleDATE->Sortable = true; // Allow sort
        $this->QuadrupleDATE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->QuadrupleDATE->Param, "CustomMsg");
        $this->Fields['QuadrupleDATE'] = &$this->QuadrupleDATE;

        // QuadrupleINHOUSE
        $this->QuadrupleINHOUSE = new DbField('patient_an_registration', 'patient_an_registration', 'x_QuadrupleINHOUSE', 'QuadrupleINHOUSE', '`QuadrupleINHOUSE`', '`QuadrupleINHOUSE`', 200, 45, -1, false, '`QuadrupleINHOUSE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->QuadrupleINHOUSE->Sortable = true; // Allow sort
        $this->QuadrupleINHOUSE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->QuadrupleINHOUSE->Param, "CustomMsg");
        $this->Fields['QuadrupleINHOUSE'] = &$this->QuadrupleINHOUSE;

        // QuadrupleREPORT
        $this->QuadrupleREPORT = new DbField('patient_an_registration', 'patient_an_registration', 'x_QuadrupleREPORT', 'QuadrupleREPORT', '`QuadrupleREPORT`', '`QuadrupleREPORT`', 201, 450, -1, false, '`QuadrupleREPORT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->QuadrupleREPORT->Sortable = true; // Allow sort
        $this->QuadrupleREPORT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->QuadrupleREPORT->Param, "CustomMsg");
        $this->Fields['QuadrupleREPORT'] = &$this->QuadrupleREPORT;

        // A5month
        $this->A5month = new DbField('patient_an_registration', 'patient_an_registration', 'x_A5month', 'A5month', '`A5month`', '`A5month`', 200, 45, -1, false, '`A5month`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->A5month->Sortable = true; // Allow sort
        $this->A5month->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->A5month->Param, "CustomMsg");
        $this->Fields['A5month'] = &$this->A5month;

        // A5monthDATE
        $this->A5monthDATE = new DbField('patient_an_registration', 'patient_an_registration', 'x_A5monthDATE', 'A5monthDATE', '`A5monthDATE`', '`A5monthDATE`', 200, 45, 7, false, '`A5monthDATE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->A5monthDATE->Sortable = true; // Allow sort
        $this->A5monthDATE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->A5monthDATE->Param, "CustomMsg");
        $this->Fields['A5monthDATE'] = &$this->A5monthDATE;

        // A5monthINHOUSE
        $this->A5monthINHOUSE = new DbField('patient_an_registration', 'patient_an_registration', 'x_A5monthINHOUSE', 'A5monthINHOUSE', '`A5monthINHOUSE`', '`A5monthINHOUSE`', 200, 45, -1, false, '`A5monthINHOUSE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->A5monthINHOUSE->Sortable = true; // Allow sort
        $this->A5monthINHOUSE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->A5monthINHOUSE->Param, "CustomMsg");
        $this->Fields['A5monthINHOUSE'] = &$this->A5monthINHOUSE;

        // A5monthREPORT
        $this->A5monthREPORT = new DbField('patient_an_registration', 'patient_an_registration', 'x_A5monthREPORT', 'A5monthREPORT', '`A5monthREPORT`', '`A5monthREPORT`', 201, 450, -1, false, '`A5monthREPORT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->A5monthREPORT->Sortable = true; // Allow sort
        $this->A5monthREPORT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->A5monthREPORT->Param, "CustomMsg");
        $this->Fields['A5monthREPORT'] = &$this->A5monthREPORT;

        // A7month
        $this->A7month = new DbField('patient_an_registration', 'patient_an_registration', 'x_A7month', 'A7month', '`A7month`', '`A7month`', 200, 45, -1, false, '`A7month`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->A7month->Sortable = true; // Allow sort
        $this->A7month->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->A7month->Param, "CustomMsg");
        $this->Fields['A7month'] = &$this->A7month;

        // A7monthDATE
        $this->A7monthDATE = new DbField('patient_an_registration', 'patient_an_registration', 'x_A7monthDATE', 'A7monthDATE', '`A7monthDATE`', '`A7monthDATE`', 200, 45, 7, false, '`A7monthDATE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->A7monthDATE->Sortable = true; // Allow sort
        $this->A7monthDATE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->A7monthDATE->Param, "CustomMsg");
        $this->Fields['A7monthDATE'] = &$this->A7monthDATE;

        // A7monthINHOUSE
        $this->A7monthINHOUSE = new DbField('patient_an_registration', 'patient_an_registration', 'x_A7monthINHOUSE', 'A7monthINHOUSE', '`A7monthINHOUSE`', '`A7monthINHOUSE`', 200, 45, -1, false, '`A7monthINHOUSE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->A7monthINHOUSE->Sortable = true; // Allow sort
        $this->A7monthINHOUSE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->A7monthINHOUSE->Param, "CustomMsg");
        $this->Fields['A7monthINHOUSE'] = &$this->A7monthINHOUSE;

        // A7monthREPORT
        $this->A7monthREPORT = new DbField('patient_an_registration', 'patient_an_registration', 'x_A7monthREPORT', 'A7monthREPORT', '`A7monthREPORT`', '`A7monthREPORT`', 201, 450, -1, false, '`A7monthREPORT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->A7monthREPORT->Sortable = true; // Allow sort
        $this->A7monthREPORT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->A7monthREPORT->Param, "CustomMsg");
        $this->Fields['A7monthREPORT'] = &$this->A7monthREPORT;

        // A9month
        $this->A9month = new DbField('patient_an_registration', 'patient_an_registration', 'x_A9month', 'A9month', '`A9month`', '`A9month`', 200, 45, -1, false, '`A9month`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->A9month->Sortable = true; // Allow sort
        $this->A9month->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->A9month->Param, "CustomMsg");
        $this->Fields['A9month'] = &$this->A9month;

        // A9monthDATE
        $this->A9monthDATE = new DbField('patient_an_registration', 'patient_an_registration', 'x_A9monthDATE', 'A9monthDATE', '`A9monthDATE`', '`A9monthDATE`', 200, 45, 7, false, '`A9monthDATE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->A9monthDATE->Sortable = true; // Allow sort
        $this->A9monthDATE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->A9monthDATE->Param, "CustomMsg");
        $this->Fields['A9monthDATE'] = &$this->A9monthDATE;

        // A9monthINHOUSE
        $this->A9monthINHOUSE = new DbField('patient_an_registration', 'patient_an_registration', 'x_A9monthINHOUSE', 'A9monthINHOUSE', '`A9monthINHOUSE`', '`A9monthINHOUSE`', 200, 45, -1, false, '`A9monthINHOUSE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->A9monthINHOUSE->Sortable = true; // Allow sort
        $this->A9monthINHOUSE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->A9monthINHOUSE->Param, "CustomMsg");
        $this->Fields['A9monthINHOUSE'] = &$this->A9monthINHOUSE;

        // A9monthREPORT
        $this->A9monthREPORT = new DbField('patient_an_registration', 'patient_an_registration', 'x_A9monthREPORT', 'A9monthREPORT', '`A9monthREPORT`', '`A9monthREPORT`', 201, 450, -1, false, '`A9monthREPORT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->A9monthREPORT->Sortable = true; // Allow sort
        $this->A9monthREPORT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->A9monthREPORT->Param, "CustomMsg");
        $this->Fields['A9monthREPORT'] = &$this->A9monthREPORT;

        // INJ
        $this->INJ = new DbField('patient_an_registration', 'patient_an_registration', 'x_INJ', 'INJ', '`INJ`', '`INJ`', 200, 45, -1, false, '`INJ`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->INJ->Sortable = true; // Allow sort
        $this->INJ->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->INJ->Param, "CustomMsg");
        $this->Fields['INJ'] = &$this->INJ;

        // INJDATE
        $this->INJDATE = new DbField('patient_an_registration', 'patient_an_registration', 'x_INJDATE', 'INJDATE', '`INJDATE`', '`INJDATE`', 200, 45, 7, false, '`INJDATE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->INJDATE->Sortable = true; // Allow sort
        $this->INJDATE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->INJDATE->Param, "CustomMsg");
        $this->Fields['INJDATE'] = &$this->INJDATE;

        // INJINHOUSE
        $this->INJINHOUSE = new DbField('patient_an_registration', 'patient_an_registration', 'x_INJINHOUSE', 'INJINHOUSE', '`INJINHOUSE`', '`INJINHOUSE`', 200, 45, -1, false, '`INJINHOUSE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->INJINHOUSE->Sortable = true; // Allow sort
        $this->INJINHOUSE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->INJINHOUSE->Param, "CustomMsg");
        $this->Fields['INJINHOUSE'] = &$this->INJINHOUSE;

        // INJREPORT
        $this->INJREPORT = new DbField('patient_an_registration', 'patient_an_registration', 'x_INJREPORT', 'INJREPORT', '`INJREPORT`', '`INJREPORT`', 201, 450, -1, false, '`INJREPORT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->INJREPORT->Sortable = true; // Allow sort
        $this->INJREPORT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->INJREPORT->Param, "CustomMsg");
        $this->Fields['INJREPORT'] = &$this->INJREPORT;

        // Bleeding
        $this->Bleeding = new DbField('patient_an_registration', 'patient_an_registration', 'x_Bleeding', 'Bleeding', '`Bleeding`', '`Bleeding`', 200, 45, -1, false, '`Bleeding`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->Bleeding->Sortable = true; // Allow sort
        $this->Bleeding->Lookup = new Lookup('Bleeding', 'patient_an_registration', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Bleeding->OptionCount = 16;
        $this->Bleeding->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Bleeding->Param, "CustomMsg");
        $this->Fields['Bleeding'] = &$this->Bleeding;

        // Hypothyroidism
        $this->Hypothyroidism = new DbField('patient_an_registration', 'patient_an_registration', 'x_Hypothyroidism', 'Hypothyroidism', '`Hypothyroidism`', '`Hypothyroidism`', 200, 45, -1, false, '`Hypothyroidism`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Hypothyroidism->Sortable = true; // Allow sort
        $this->Hypothyroidism->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Hypothyroidism->Param, "CustomMsg");
        $this->Fields['Hypothyroidism'] = &$this->Hypothyroidism;

        // PICMENumber
        $this->PICMENumber = new DbField('patient_an_registration', 'patient_an_registration', 'x_PICMENumber', 'PICMENumber', '`PICMENumber`', '`PICMENumber`', 200, 45, -1, false, '`PICMENumber`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PICMENumber->Sortable = true; // Allow sort
        $this->PICMENumber->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PICMENumber->Param, "CustomMsg");
        $this->Fields['PICMENumber'] = &$this->PICMENumber;

        // Outcome
        $this->Outcome = new DbField('patient_an_registration', 'patient_an_registration', 'x_Outcome', 'Outcome', '`Outcome`', '`Outcome`', 200, 45, -1, false, '`Outcome`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Outcome->Sortable = true; // Allow sort
        $this->Outcome->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Outcome->Param, "CustomMsg");
        $this->Fields['Outcome'] = &$this->Outcome;

        // DateofAdmission
        $this->DateofAdmission = new DbField('patient_an_registration', 'patient_an_registration', 'x_DateofAdmission', 'DateofAdmission', '`DateofAdmission`', '`DateofAdmission`', 200, 45, 7, false, '`DateofAdmission`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DateofAdmission->Sortable = true; // Allow sort
        $this->DateofAdmission->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DateofAdmission->Param, "CustomMsg");
        $this->Fields['DateofAdmission'] = &$this->DateofAdmission;

        // DateodProcedure
        $this->DateodProcedure = new DbField('patient_an_registration', 'patient_an_registration', 'x_DateodProcedure', 'DateodProcedure', '`DateodProcedure`', '`DateodProcedure`', 200, 45, 7, false, '`DateodProcedure`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DateodProcedure->Sortable = true; // Allow sort
        $this->DateodProcedure->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DateodProcedure->Param, "CustomMsg");
        $this->Fields['DateodProcedure'] = &$this->DateodProcedure;

        // Miscarriage
        $this->Miscarriage = new DbField('patient_an_registration', 'patient_an_registration', 'x_Miscarriage', 'Miscarriage', '`Miscarriage`', '`Miscarriage`', 200, 45, -1, false, '`Miscarriage`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Miscarriage->Sortable = true; // Allow sort
        $this->Miscarriage->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Miscarriage->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Miscarriage->Lookup = new Lookup('Miscarriage', 'patient_an_registration', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Miscarriage->OptionCount = 8;
        $this->Miscarriage->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Miscarriage->Param, "CustomMsg");
        $this->Fields['Miscarriage'] = &$this->Miscarriage;

        // ModeOfDelivery
        $this->ModeOfDelivery = new DbField('patient_an_registration', 'patient_an_registration', 'x_ModeOfDelivery', 'ModeOfDelivery', '`ModeOfDelivery`', '`ModeOfDelivery`', 200, 45, -1, false, '`ModeOfDelivery`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->ModeOfDelivery->Sortable = true; // Allow sort
        $this->ModeOfDelivery->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->ModeOfDelivery->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->ModeOfDelivery->Lookup = new Lookup('ModeOfDelivery', 'patient_an_registration', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->ModeOfDelivery->OptionCount = 10;
        $this->ModeOfDelivery->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ModeOfDelivery->Param, "CustomMsg");
        $this->Fields['ModeOfDelivery'] = &$this->ModeOfDelivery;

        // ND
        $this->ND = new DbField('patient_an_registration', 'patient_an_registration', 'x_ND', 'ND', '`ND`', '`ND`', 200, 45, -1, false, '`ND`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ND->Sortable = true; // Allow sort
        $this->ND->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ND->Param, "CustomMsg");
        $this->Fields['ND'] = &$this->ND;

        // NDS
        $this->NDS = new DbField('patient_an_registration', 'patient_an_registration', 'x_NDS', 'NDS', '`NDS`', '`NDS`', 200, 45, -1, false, '`NDS`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->NDS->Sortable = true; // Allow sort
        $this->NDS->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->NDS->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->NDS->Lookup = new Lookup('NDS', 'patient_an_registration', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->NDS->OptionCount = 2;
        $this->NDS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->NDS->Param, "CustomMsg");
        $this->Fields['NDS'] = &$this->NDS;

        // NDP
        $this->NDP = new DbField('patient_an_registration', 'patient_an_registration', 'x_NDP', 'NDP', '`NDP`', '`NDP`', 200, 45, -1, false, '`NDP`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->NDP->Sortable = true; // Allow sort
        $this->NDP->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->NDP->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->NDP->Lookup = new Lookup('NDP', 'patient_an_registration', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->NDP->OptionCount = 2;
        $this->NDP->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->NDP->Param, "CustomMsg");
        $this->Fields['NDP'] = &$this->NDP;

        // Vaccum
        $this->Vaccum = new DbField('patient_an_registration', 'patient_an_registration', 'x_Vaccum', 'Vaccum', '`Vaccum`', '`Vaccum`', 200, 45, -1, false, '`Vaccum`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Vaccum->Sortable = true; // Allow sort
        $this->Vaccum->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Vaccum->Param, "CustomMsg");
        $this->Fields['Vaccum'] = &$this->Vaccum;

        // VaccumS
        $this->VaccumS = new DbField('patient_an_registration', 'patient_an_registration', 'x_VaccumS', 'VaccumS', '`VaccumS`', '`VaccumS`', 200, 45, -1, false, '`VaccumS`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->VaccumS->Sortable = true; // Allow sort
        $this->VaccumS->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->VaccumS->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->VaccumS->Lookup = new Lookup('VaccumS', 'patient_an_registration', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->VaccumS->OptionCount = 2;
        $this->VaccumS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->VaccumS->Param, "CustomMsg");
        $this->Fields['VaccumS'] = &$this->VaccumS;

        // VaccumP
        $this->VaccumP = new DbField('patient_an_registration', 'patient_an_registration', 'x_VaccumP', 'VaccumP', '`VaccumP`', '`VaccumP`', 200, 45, -1, false, '`VaccumP`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->VaccumP->Sortable = true; // Allow sort
        $this->VaccumP->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->VaccumP->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->VaccumP->Lookup = new Lookup('VaccumP', 'patient_an_registration', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->VaccumP->OptionCount = 2;
        $this->VaccumP->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->VaccumP->Param, "CustomMsg");
        $this->Fields['VaccumP'] = &$this->VaccumP;

        // Forceps
        $this->Forceps = new DbField('patient_an_registration', 'patient_an_registration', 'x_Forceps', 'Forceps', '`Forceps`', '`Forceps`', 200, 45, -1, false, '`Forceps`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Forceps->Sortable = true; // Allow sort
        $this->Forceps->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Forceps->Param, "CustomMsg");
        $this->Fields['Forceps'] = &$this->Forceps;

        // ForcepsS
        $this->ForcepsS = new DbField('patient_an_registration', 'patient_an_registration', 'x_ForcepsS', 'ForcepsS', '`ForcepsS`', '`ForcepsS`', 200, 45, -1, false, '`ForcepsS`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->ForcepsS->Sortable = true; // Allow sort
        $this->ForcepsS->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->ForcepsS->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->ForcepsS->Lookup = new Lookup('ForcepsS', 'patient_an_registration', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->ForcepsS->OptionCount = 2;
        $this->ForcepsS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ForcepsS->Param, "CustomMsg");
        $this->Fields['ForcepsS'] = &$this->ForcepsS;

        // ForcepsP
        $this->ForcepsP = new DbField('patient_an_registration', 'patient_an_registration', 'x_ForcepsP', 'ForcepsP', '`ForcepsP`', '`ForcepsP`', 200, 45, -1, false, '`ForcepsP`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->ForcepsP->Sortable = true; // Allow sort
        $this->ForcepsP->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->ForcepsP->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->ForcepsP->Lookup = new Lookup('ForcepsP', 'patient_an_registration', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->ForcepsP->OptionCount = 2;
        $this->ForcepsP->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ForcepsP->Param, "CustomMsg");
        $this->Fields['ForcepsP'] = &$this->ForcepsP;

        // Elective
        $this->Elective = new DbField('patient_an_registration', 'patient_an_registration', 'x_Elective', 'Elective', '`Elective`', '`Elective`', 200, 45, -1, false, '`Elective`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Elective->Sortable = true; // Allow sort
        $this->Elective->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Elective->Param, "CustomMsg");
        $this->Fields['Elective'] = &$this->Elective;

        // ElectiveS
        $this->ElectiveS = new DbField('patient_an_registration', 'patient_an_registration', 'x_ElectiveS', 'ElectiveS', '`ElectiveS`', '`ElectiveS`', 200, 45, -1, false, '`ElectiveS`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->ElectiveS->Sortable = true; // Allow sort
        $this->ElectiveS->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->ElectiveS->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->ElectiveS->Lookup = new Lookup('ElectiveS', 'patient_an_registration', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->ElectiveS->OptionCount = 2;
        $this->ElectiveS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ElectiveS->Param, "CustomMsg");
        $this->Fields['ElectiveS'] = &$this->ElectiveS;

        // ElectiveP
        $this->ElectiveP = new DbField('patient_an_registration', 'patient_an_registration', 'x_ElectiveP', 'ElectiveP', '`ElectiveP`', '`ElectiveP`', 200, 45, -1, false, '`ElectiveP`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->ElectiveP->Sortable = true; // Allow sort
        $this->ElectiveP->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->ElectiveP->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->ElectiveP->Lookup = new Lookup('ElectiveP', 'patient_an_registration', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->ElectiveP->OptionCount = 2;
        $this->ElectiveP->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ElectiveP->Param, "CustomMsg");
        $this->Fields['ElectiveP'] = &$this->ElectiveP;

        // Emergency
        $this->Emergency = new DbField('patient_an_registration', 'patient_an_registration', 'x_Emergency', 'Emergency', '`Emergency`', '`Emergency`', 200, 45, -1, false, '`Emergency`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Emergency->Sortable = true; // Allow sort
        $this->Emergency->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Emergency->Param, "CustomMsg");
        $this->Fields['Emergency'] = &$this->Emergency;

        // EmergencyS
        $this->EmergencyS = new DbField('patient_an_registration', 'patient_an_registration', 'x_EmergencyS', 'EmergencyS', '`EmergencyS`', '`EmergencyS`', 200, 45, -1, false, '`EmergencyS`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->EmergencyS->Sortable = true; // Allow sort
        $this->EmergencyS->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->EmergencyS->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->EmergencyS->Lookup = new Lookup('EmergencyS', 'patient_an_registration', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->EmergencyS->OptionCount = 2;
        $this->EmergencyS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EmergencyS->Param, "CustomMsg");
        $this->Fields['EmergencyS'] = &$this->EmergencyS;

        // EmergencyP
        $this->EmergencyP = new DbField('patient_an_registration', 'patient_an_registration', 'x_EmergencyP', 'EmergencyP', '`EmergencyP`', '`EmergencyP`', 200, 45, -1, false, '`EmergencyP`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->EmergencyP->Sortable = true; // Allow sort
        $this->EmergencyP->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->EmergencyP->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->EmergencyP->Lookup = new Lookup('EmergencyP', 'patient_an_registration', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->EmergencyP->OptionCount = 2;
        $this->EmergencyP->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EmergencyP->Param, "CustomMsg");
        $this->Fields['EmergencyP'] = &$this->EmergencyP;

        // Maturity
        $this->Maturity = new DbField('patient_an_registration', 'patient_an_registration', 'x_Maturity', 'Maturity', '`Maturity`', '`Maturity`', 200, 45, -1, false, '`Maturity`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Maturity->Sortable = true; // Allow sort
        $this->Maturity->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Maturity->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Maturity->Lookup = new Lookup('Maturity', 'patient_an_registration', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Maturity->OptionCount = 2;
        $this->Maturity->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Maturity->Param, "CustomMsg");
        $this->Fields['Maturity'] = &$this->Maturity;

        // Baby1
        $this->Baby1 = new DbField('patient_an_registration', 'patient_an_registration', 'x_Baby1', 'Baby1', '`Baby1`', '`Baby1`', 200, 45, -1, false, '`Baby1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Baby1->Sortable = true; // Allow sort
        $this->Baby1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Baby1->Param, "CustomMsg");
        $this->Fields['Baby1'] = &$this->Baby1;

        // Baby2
        $this->Baby2 = new DbField('patient_an_registration', 'patient_an_registration', 'x_Baby2', 'Baby2', '`Baby2`', '`Baby2`', 200, 45, -1, false, '`Baby2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Baby2->Sortable = true; // Allow sort
        $this->Baby2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Baby2->Param, "CustomMsg");
        $this->Fields['Baby2'] = &$this->Baby2;

        // sex1
        $this->sex1 = new DbField('patient_an_registration', 'patient_an_registration', 'x_sex1', 'sex1', '`sex1`', '`sex1`', 200, 45, -1, false, '`sex1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->sex1->Sortable = true; // Allow sort
        $this->sex1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->sex1->Param, "CustomMsg");
        $this->Fields['sex1'] = &$this->sex1;

        // sex2
        $this->sex2 = new DbField('patient_an_registration', 'patient_an_registration', 'x_sex2', 'sex2', '`sex2`', '`sex2`', 200, 45, -1, false, '`sex2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->sex2->Sortable = true; // Allow sort
        $this->sex2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->sex2->Param, "CustomMsg");
        $this->Fields['sex2'] = &$this->sex2;

        // weight1
        $this->weight1 = new DbField('patient_an_registration', 'patient_an_registration', 'x_weight1', 'weight1', '`weight1`', '`weight1`', 200, 45, -1, false, '`weight1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->weight1->Sortable = true; // Allow sort
        $this->weight1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->weight1->Param, "CustomMsg");
        $this->Fields['weight1'] = &$this->weight1;

        // weight2
        $this->weight2 = new DbField('patient_an_registration', 'patient_an_registration', 'x_weight2', 'weight2', '`weight2`', '`weight2`', 200, 45, -1, false, '`weight2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->weight2->Sortable = true; // Allow sort
        $this->weight2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->weight2->Param, "CustomMsg");
        $this->Fields['weight2'] = &$this->weight2;

        // NICU1
        $this->NICU1 = new DbField('patient_an_registration', 'patient_an_registration', 'x_NICU1', 'NICU1', '`NICU1`', '`NICU1`', 200, 45, -1, false, '`NICU1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NICU1->Sortable = true; // Allow sort
        $this->NICU1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->NICU1->Param, "CustomMsg");
        $this->Fields['NICU1'] = &$this->NICU1;

        // NICU2
        $this->NICU2 = new DbField('patient_an_registration', 'patient_an_registration', 'x_NICU2', 'NICU2', '`NICU2`', '`NICU2`', 200, 45, -1, false, '`NICU2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NICU2->Sortable = true; // Allow sort
        $this->NICU2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->NICU2->Param, "CustomMsg");
        $this->Fields['NICU2'] = &$this->NICU2;

        // Jaundice1
        $this->Jaundice1 = new DbField('patient_an_registration', 'patient_an_registration', 'x_Jaundice1', 'Jaundice1', '`Jaundice1`', '`Jaundice1`', 200, 45, -1, false, '`Jaundice1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Jaundice1->Sortable = true; // Allow sort
        $this->Jaundice1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Jaundice1->Param, "CustomMsg");
        $this->Fields['Jaundice1'] = &$this->Jaundice1;

        // Jaundice2
        $this->Jaundice2 = new DbField('patient_an_registration', 'patient_an_registration', 'x_Jaundice2', 'Jaundice2', '`Jaundice2`', '`Jaundice2`', 200, 45, -1, false, '`Jaundice2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Jaundice2->Sortable = true; // Allow sort
        $this->Jaundice2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Jaundice2->Param, "CustomMsg");
        $this->Fields['Jaundice2'] = &$this->Jaundice2;

        // Others1
        $this->Others1 = new DbField('patient_an_registration', 'patient_an_registration', 'x_Others1', 'Others1', '`Others1`', '`Others1`', 200, 45, -1, false, '`Others1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Others1->Sortable = true; // Allow sort
        $this->Others1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Others1->Param, "CustomMsg");
        $this->Fields['Others1'] = &$this->Others1;

        // Others2
        $this->Others2 = new DbField('patient_an_registration', 'patient_an_registration', 'x_Others2', 'Others2', '`Others2`', '`Others2`', 200, 45, -1, false, '`Others2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Others2->Sortable = true; // Allow sort
        $this->Others2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Others2->Param, "CustomMsg");
        $this->Fields['Others2'] = &$this->Others2;

        // SpillOverReasons
        $this->SpillOverReasons = new DbField('patient_an_registration', 'patient_an_registration', 'x_SpillOverReasons', 'SpillOverReasons', '`SpillOverReasons`', '`SpillOverReasons`', 200, 45, -1, false, '`SpillOverReasons`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->SpillOverReasons->Sortable = true; // Allow sort
        $this->SpillOverReasons->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->SpillOverReasons->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->SpillOverReasons->Lookup = new Lookup('SpillOverReasons', 'patient_an_registration', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->SpillOverReasons->OptionCount = 7;
        $this->SpillOverReasons->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SpillOverReasons->Param, "CustomMsg");
        $this->Fields['SpillOverReasons'] = &$this->SpillOverReasons;

        // ANClosed
        $this->ANClosed = new DbField('patient_an_registration', 'patient_an_registration', 'x_ANClosed', 'ANClosed', '`ANClosed`', '`ANClosed`', 200, 45, -1, false, '`ANClosed`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->ANClosed->Sortable = true; // Allow sort
        $this->ANClosed->Lookup = new Lookup('ANClosed', 'patient_an_registration', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->ANClosed->OptionCount = 1;
        $this->ANClosed->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ANClosed->Param, "CustomMsg");
        $this->Fields['ANClosed'] = &$this->ANClosed;

        // ANClosedDATE
        $this->ANClosedDATE = new DbField('patient_an_registration', 'patient_an_registration', 'x_ANClosedDATE', 'ANClosedDATE', '`ANClosedDATE`', '`ANClosedDATE`', 200, 45, 7, false, '`ANClosedDATE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ANClosedDATE->Sortable = true; // Allow sort
        $this->ANClosedDATE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ANClosedDATE->Param, "CustomMsg");
        $this->Fields['ANClosedDATE'] = &$this->ANClosedDATE;

        // PastMedicalHistoryOthers
        $this->PastMedicalHistoryOthers = new DbField('patient_an_registration', 'patient_an_registration', 'x_PastMedicalHistoryOthers', 'PastMedicalHistoryOthers', '`PastMedicalHistoryOthers`', '`PastMedicalHistoryOthers`', 200, 45, -1, false, '`PastMedicalHistoryOthers`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PastMedicalHistoryOthers->Sortable = true; // Allow sort
        $this->PastMedicalHistoryOthers->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PastMedicalHistoryOthers->Param, "CustomMsg");
        $this->Fields['PastMedicalHistoryOthers'] = &$this->PastMedicalHistoryOthers;

        // PastSurgicalHistoryOthers
        $this->PastSurgicalHistoryOthers = new DbField('patient_an_registration', 'patient_an_registration', 'x_PastSurgicalHistoryOthers', 'PastSurgicalHistoryOthers', '`PastSurgicalHistoryOthers`', '`PastSurgicalHistoryOthers`', 200, 45, -1, false, '`PastSurgicalHistoryOthers`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PastSurgicalHistoryOthers->Sortable = true; // Allow sort
        $this->PastSurgicalHistoryOthers->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PastSurgicalHistoryOthers->Param, "CustomMsg");
        $this->Fields['PastSurgicalHistoryOthers'] = &$this->PastSurgicalHistoryOthers;

        // FamilyHistoryOthers
        $this->FamilyHistoryOthers = new DbField('patient_an_registration', 'patient_an_registration', 'x_FamilyHistoryOthers', 'FamilyHistoryOthers', '`FamilyHistoryOthers`', '`FamilyHistoryOthers`', 200, 45, -1, false, '`FamilyHistoryOthers`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FamilyHistoryOthers->Sortable = true; // Allow sort
        $this->FamilyHistoryOthers->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FamilyHistoryOthers->Param, "CustomMsg");
        $this->Fields['FamilyHistoryOthers'] = &$this->FamilyHistoryOthers;

        // PresentPregnancyComplicationsOthers
        $this->PresentPregnancyComplicationsOthers = new DbField('patient_an_registration', 'patient_an_registration', 'x_PresentPregnancyComplicationsOthers', 'PresentPregnancyComplicationsOthers', '`PresentPregnancyComplicationsOthers`', '`PresentPregnancyComplicationsOthers`', 200, 45, -1, false, '`PresentPregnancyComplicationsOthers`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PresentPregnancyComplicationsOthers->Sortable = true; // Allow sort
        $this->PresentPregnancyComplicationsOthers->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PresentPregnancyComplicationsOthers->Param, "CustomMsg");
        $this->Fields['PresentPregnancyComplicationsOthers'] = &$this->PresentPregnancyComplicationsOthers;

        // ETdate
        $this->ETdate = new DbField('patient_an_registration', 'patient_an_registration', 'x_ETdate', 'ETdate', '`ETdate`', '`ETdate`', 200, 45, 0, false, '`ETdate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ETdate->Sortable = true; // Allow sort
        $this->ETdate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ETdate->Param, "CustomMsg");
        $this->Fields['ETdate'] = &$this->ETdate;
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
        if ($this->getCurrentMasterTable() == "patient_opd_follow_up") {
            if ($this->pid->getSessionValue() != "") {
                $masterFilter .= "" . GetForeignKeySql("`PatientId`", $this->pid->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
            if ($this->fid->getSessionValue() != "") {
                $masterFilter .= " AND " . GetForeignKeySql("`id`", $this->fid->getSessionValue(), DATATYPE_NUMBER, "DB");
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
        if ($this->getCurrentMasterTable() == "patient_opd_follow_up") {
            if ($this->pid->getSessionValue() != "") {
                $detailFilter .= "" . GetForeignKeySql("`pid`", $this->pid->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
            if ($this->fid->getSessionValue() != "") {
                $detailFilter .= " AND " . GetForeignKeySql("`fid`", $this->fid->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
        }
        return $detailFilter;
    }

    // Master filter
    public function sqlMasterFilter_patient_opd_follow_up()
    {
        return "`PatientId`=@PatientId@ AND `id`=@id@";
    }
    // Detail filter
    public function sqlDetailFilter_patient_opd_follow_up()
    {
        return "`pid`=@pid@ AND `fid`=@fid@";
    }

    // Table level SQL
    public function getSqlFrom() // From
    {
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`patient_an_registration`";
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
        $this->pid->DbValue = $row['pid'];
        $this->fid->DbValue = $row['fid'];
        $this->G->DbValue = $row['G'];
        $this->P->DbValue = $row['P'];
        $this->L->DbValue = $row['L'];
        $this->A->DbValue = $row['A'];
        $this->E->DbValue = $row['E'];
        $this->M->DbValue = $row['M'];
        $this->LMP->DbValue = $row['LMP'];
        $this->EDO->DbValue = $row['EDO'];
        $this->MenstrualHistory->DbValue = $row['MenstrualHistory'];
        $this->MaritalHistory->DbValue = $row['MaritalHistory'];
        $this->ObstetricHistory->DbValue = $row['ObstetricHistory'];
        $this->PreviousHistoryofGDM->DbValue = $row['PreviousHistoryofGDM'];
        $this->PreviousHistorofPIH->DbValue = $row['PreviousHistorofPIH'];
        $this->PreviousHistoryofIUGR->DbValue = $row['PreviousHistoryofIUGR'];
        $this->PreviousHistoryofOligohydramnios->DbValue = $row['PreviousHistoryofOligohydramnios'];
        $this->PreviousHistoryofPreterm->DbValue = $row['PreviousHistoryofPreterm'];
        $this->G1->DbValue = $row['G1'];
        $this->G2->DbValue = $row['G2'];
        $this->G3->DbValue = $row['G3'];
        $this->DeliveryNDLSCS1->DbValue = $row['DeliveryNDLSCS1'];
        $this->DeliveryNDLSCS2->DbValue = $row['DeliveryNDLSCS2'];
        $this->DeliveryNDLSCS3->DbValue = $row['DeliveryNDLSCS3'];
        $this->BabySexweight1->DbValue = $row['BabySexweight1'];
        $this->BabySexweight2->DbValue = $row['BabySexweight2'];
        $this->BabySexweight3->DbValue = $row['BabySexweight3'];
        $this->PastMedicalHistory->DbValue = $row['PastMedicalHistory'];
        $this->PastSurgicalHistory->DbValue = $row['PastSurgicalHistory'];
        $this->FamilyHistory->DbValue = $row['FamilyHistory'];
        $this->Viability->DbValue = $row['Viability'];
        $this->ViabilityDATE->DbValue = $row['ViabilityDATE'];
        $this->ViabilityREPORT->DbValue = $row['ViabilityREPORT'];
        $this->Viability2->DbValue = $row['Viability2'];
        $this->Viability2DATE->DbValue = $row['Viability2DATE'];
        $this->Viability2REPORT->DbValue = $row['Viability2REPORT'];
        $this->NTscan->DbValue = $row['NTscan'];
        $this->NTscanDATE->DbValue = $row['NTscanDATE'];
        $this->NTscanREPORT->DbValue = $row['NTscanREPORT'];
        $this->EarlyTarget->DbValue = $row['EarlyTarget'];
        $this->EarlyTargetDATE->DbValue = $row['EarlyTargetDATE'];
        $this->EarlyTargetREPORT->DbValue = $row['EarlyTargetREPORT'];
        $this->Anomaly->DbValue = $row['Anomaly'];
        $this->AnomalyDATE->DbValue = $row['AnomalyDATE'];
        $this->AnomalyREPORT->DbValue = $row['AnomalyREPORT'];
        $this->Growth->DbValue = $row['Growth'];
        $this->GrowthDATE->DbValue = $row['GrowthDATE'];
        $this->GrowthREPORT->DbValue = $row['GrowthREPORT'];
        $this->Growth1->DbValue = $row['Growth1'];
        $this->Growth1DATE->DbValue = $row['Growth1DATE'];
        $this->Growth1REPORT->DbValue = $row['Growth1REPORT'];
        $this->ANProfile->DbValue = $row['ANProfile'];
        $this->ANProfileDATE->DbValue = $row['ANProfileDATE'];
        $this->ANProfileINHOUSE->DbValue = $row['ANProfileINHOUSE'];
        $this->ANProfileREPORT->DbValue = $row['ANProfileREPORT'];
        $this->DualMarker->DbValue = $row['DualMarker'];
        $this->DualMarkerDATE->DbValue = $row['DualMarkerDATE'];
        $this->DualMarkerINHOUSE->DbValue = $row['DualMarkerINHOUSE'];
        $this->DualMarkerREPORT->DbValue = $row['DualMarkerREPORT'];
        $this->Quadruple->DbValue = $row['Quadruple'];
        $this->QuadrupleDATE->DbValue = $row['QuadrupleDATE'];
        $this->QuadrupleINHOUSE->DbValue = $row['QuadrupleINHOUSE'];
        $this->QuadrupleREPORT->DbValue = $row['QuadrupleREPORT'];
        $this->A5month->DbValue = $row['A5month'];
        $this->A5monthDATE->DbValue = $row['A5monthDATE'];
        $this->A5monthINHOUSE->DbValue = $row['A5monthINHOUSE'];
        $this->A5monthREPORT->DbValue = $row['A5monthREPORT'];
        $this->A7month->DbValue = $row['A7month'];
        $this->A7monthDATE->DbValue = $row['A7monthDATE'];
        $this->A7monthINHOUSE->DbValue = $row['A7monthINHOUSE'];
        $this->A7monthREPORT->DbValue = $row['A7monthREPORT'];
        $this->A9month->DbValue = $row['A9month'];
        $this->A9monthDATE->DbValue = $row['A9monthDATE'];
        $this->A9monthINHOUSE->DbValue = $row['A9monthINHOUSE'];
        $this->A9monthREPORT->DbValue = $row['A9monthREPORT'];
        $this->INJ->DbValue = $row['INJ'];
        $this->INJDATE->DbValue = $row['INJDATE'];
        $this->INJINHOUSE->DbValue = $row['INJINHOUSE'];
        $this->INJREPORT->DbValue = $row['INJREPORT'];
        $this->Bleeding->DbValue = $row['Bleeding'];
        $this->Hypothyroidism->DbValue = $row['Hypothyroidism'];
        $this->PICMENumber->DbValue = $row['PICMENumber'];
        $this->Outcome->DbValue = $row['Outcome'];
        $this->DateofAdmission->DbValue = $row['DateofAdmission'];
        $this->DateodProcedure->DbValue = $row['DateodProcedure'];
        $this->Miscarriage->DbValue = $row['Miscarriage'];
        $this->ModeOfDelivery->DbValue = $row['ModeOfDelivery'];
        $this->ND->DbValue = $row['ND'];
        $this->NDS->DbValue = $row['NDS'];
        $this->NDP->DbValue = $row['NDP'];
        $this->Vaccum->DbValue = $row['Vaccum'];
        $this->VaccumS->DbValue = $row['VaccumS'];
        $this->VaccumP->DbValue = $row['VaccumP'];
        $this->Forceps->DbValue = $row['Forceps'];
        $this->ForcepsS->DbValue = $row['ForcepsS'];
        $this->ForcepsP->DbValue = $row['ForcepsP'];
        $this->Elective->DbValue = $row['Elective'];
        $this->ElectiveS->DbValue = $row['ElectiveS'];
        $this->ElectiveP->DbValue = $row['ElectiveP'];
        $this->Emergency->DbValue = $row['Emergency'];
        $this->EmergencyS->DbValue = $row['EmergencyS'];
        $this->EmergencyP->DbValue = $row['EmergencyP'];
        $this->Maturity->DbValue = $row['Maturity'];
        $this->Baby1->DbValue = $row['Baby1'];
        $this->Baby2->DbValue = $row['Baby2'];
        $this->sex1->DbValue = $row['sex1'];
        $this->sex2->DbValue = $row['sex2'];
        $this->weight1->DbValue = $row['weight1'];
        $this->weight2->DbValue = $row['weight2'];
        $this->NICU1->DbValue = $row['NICU1'];
        $this->NICU2->DbValue = $row['NICU2'];
        $this->Jaundice1->DbValue = $row['Jaundice1'];
        $this->Jaundice2->DbValue = $row['Jaundice2'];
        $this->Others1->DbValue = $row['Others1'];
        $this->Others2->DbValue = $row['Others2'];
        $this->SpillOverReasons->DbValue = $row['SpillOverReasons'];
        $this->ANClosed->DbValue = $row['ANClosed'];
        $this->ANClosedDATE->DbValue = $row['ANClosedDATE'];
        $this->PastMedicalHistoryOthers->DbValue = $row['PastMedicalHistoryOthers'];
        $this->PastSurgicalHistoryOthers->DbValue = $row['PastSurgicalHistoryOthers'];
        $this->FamilyHistoryOthers->DbValue = $row['FamilyHistoryOthers'];
        $this->PresentPregnancyComplicationsOthers->DbValue = $row['PresentPregnancyComplicationsOthers'];
        $this->ETdate->DbValue = $row['ETdate'];
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
        return $_SESSION[$name] ?? GetUrl("PatientAnRegistrationList");
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
        if ($pageName == "PatientAnRegistrationView") {
            return $Language->phrase("View");
        } elseif ($pageName == "PatientAnRegistrationEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "PatientAnRegistrationAdd") {
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
                return "PatientAnRegistrationView";
            case Config("API_ADD_ACTION"):
                return "PatientAnRegistrationAdd";
            case Config("API_EDIT_ACTION"):
                return "PatientAnRegistrationEdit";
            case Config("API_DELETE_ACTION"):
                return "PatientAnRegistrationDelete";
            case Config("API_LIST_ACTION"):
                return "PatientAnRegistrationList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "PatientAnRegistrationList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("PatientAnRegistrationView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("PatientAnRegistrationView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "PatientAnRegistrationAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "PatientAnRegistrationAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("PatientAnRegistrationEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("PatientAnRegistrationAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("PatientAnRegistrationDelete", $this->getUrlParm());
    }

    // Add master url
    public function addMasterUrl($url)
    {
        if ($this->getCurrentMasterTable() == "patient_opd_follow_up" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
            $url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
            $url .= "&" . GetForeignKeyUrl("fk_PatientId", $this->pid->CurrentValue ?? $this->pid->getSessionValue());
            $url .= "&" . GetForeignKeyUrl("fk_id", $this->fid->CurrentValue ?? $this->fid->getSessionValue());
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
        $this->pid->setDbValue($row['pid']);
        $this->fid->setDbValue($row['fid']);
        $this->G->setDbValue($row['G']);
        $this->P->setDbValue($row['P']);
        $this->L->setDbValue($row['L']);
        $this->A->setDbValue($row['A']);
        $this->E->setDbValue($row['E']);
        $this->M->setDbValue($row['M']);
        $this->LMP->setDbValue($row['LMP']);
        $this->EDO->setDbValue($row['EDO']);
        $this->MenstrualHistory->setDbValue($row['MenstrualHistory']);
        $this->MaritalHistory->setDbValue($row['MaritalHistory']);
        $this->ObstetricHistory->setDbValue($row['ObstetricHistory']);
        $this->PreviousHistoryofGDM->setDbValue($row['PreviousHistoryofGDM']);
        $this->PreviousHistorofPIH->setDbValue($row['PreviousHistorofPIH']);
        $this->PreviousHistoryofIUGR->setDbValue($row['PreviousHistoryofIUGR']);
        $this->PreviousHistoryofOligohydramnios->setDbValue($row['PreviousHistoryofOligohydramnios']);
        $this->PreviousHistoryofPreterm->setDbValue($row['PreviousHistoryofPreterm']);
        $this->G1->setDbValue($row['G1']);
        $this->G2->setDbValue($row['G2']);
        $this->G3->setDbValue($row['G3']);
        $this->DeliveryNDLSCS1->setDbValue($row['DeliveryNDLSCS1']);
        $this->DeliveryNDLSCS2->setDbValue($row['DeliveryNDLSCS2']);
        $this->DeliveryNDLSCS3->setDbValue($row['DeliveryNDLSCS3']);
        $this->BabySexweight1->setDbValue($row['BabySexweight1']);
        $this->BabySexweight2->setDbValue($row['BabySexweight2']);
        $this->BabySexweight3->setDbValue($row['BabySexweight3']);
        $this->PastMedicalHistory->setDbValue($row['PastMedicalHistory']);
        $this->PastSurgicalHistory->setDbValue($row['PastSurgicalHistory']);
        $this->FamilyHistory->setDbValue($row['FamilyHistory']);
        $this->Viability->setDbValue($row['Viability']);
        $this->ViabilityDATE->setDbValue($row['ViabilityDATE']);
        $this->ViabilityREPORT->setDbValue($row['ViabilityREPORT']);
        $this->Viability2->setDbValue($row['Viability2']);
        $this->Viability2DATE->setDbValue($row['Viability2DATE']);
        $this->Viability2REPORT->setDbValue($row['Viability2REPORT']);
        $this->NTscan->setDbValue($row['NTscan']);
        $this->NTscanDATE->setDbValue($row['NTscanDATE']);
        $this->NTscanREPORT->setDbValue($row['NTscanREPORT']);
        $this->EarlyTarget->setDbValue($row['EarlyTarget']);
        $this->EarlyTargetDATE->setDbValue($row['EarlyTargetDATE']);
        $this->EarlyTargetREPORT->setDbValue($row['EarlyTargetREPORT']);
        $this->Anomaly->setDbValue($row['Anomaly']);
        $this->AnomalyDATE->setDbValue($row['AnomalyDATE']);
        $this->AnomalyREPORT->setDbValue($row['AnomalyREPORT']);
        $this->Growth->setDbValue($row['Growth']);
        $this->GrowthDATE->setDbValue($row['GrowthDATE']);
        $this->GrowthREPORT->setDbValue($row['GrowthREPORT']);
        $this->Growth1->setDbValue($row['Growth1']);
        $this->Growth1DATE->setDbValue($row['Growth1DATE']);
        $this->Growth1REPORT->setDbValue($row['Growth1REPORT']);
        $this->ANProfile->setDbValue($row['ANProfile']);
        $this->ANProfileDATE->setDbValue($row['ANProfileDATE']);
        $this->ANProfileINHOUSE->setDbValue($row['ANProfileINHOUSE']);
        $this->ANProfileREPORT->setDbValue($row['ANProfileREPORT']);
        $this->DualMarker->setDbValue($row['DualMarker']);
        $this->DualMarkerDATE->setDbValue($row['DualMarkerDATE']);
        $this->DualMarkerINHOUSE->setDbValue($row['DualMarkerINHOUSE']);
        $this->DualMarkerREPORT->setDbValue($row['DualMarkerREPORT']);
        $this->Quadruple->setDbValue($row['Quadruple']);
        $this->QuadrupleDATE->setDbValue($row['QuadrupleDATE']);
        $this->QuadrupleINHOUSE->setDbValue($row['QuadrupleINHOUSE']);
        $this->QuadrupleREPORT->setDbValue($row['QuadrupleREPORT']);
        $this->A5month->setDbValue($row['A5month']);
        $this->A5monthDATE->setDbValue($row['A5monthDATE']);
        $this->A5monthINHOUSE->setDbValue($row['A5monthINHOUSE']);
        $this->A5monthREPORT->setDbValue($row['A5monthREPORT']);
        $this->A7month->setDbValue($row['A7month']);
        $this->A7monthDATE->setDbValue($row['A7monthDATE']);
        $this->A7monthINHOUSE->setDbValue($row['A7monthINHOUSE']);
        $this->A7monthREPORT->setDbValue($row['A7monthREPORT']);
        $this->A9month->setDbValue($row['A9month']);
        $this->A9monthDATE->setDbValue($row['A9monthDATE']);
        $this->A9monthINHOUSE->setDbValue($row['A9monthINHOUSE']);
        $this->A9monthREPORT->setDbValue($row['A9monthREPORT']);
        $this->INJ->setDbValue($row['INJ']);
        $this->INJDATE->setDbValue($row['INJDATE']);
        $this->INJINHOUSE->setDbValue($row['INJINHOUSE']);
        $this->INJREPORT->setDbValue($row['INJREPORT']);
        $this->Bleeding->setDbValue($row['Bleeding']);
        $this->Hypothyroidism->setDbValue($row['Hypothyroidism']);
        $this->PICMENumber->setDbValue($row['PICMENumber']);
        $this->Outcome->setDbValue($row['Outcome']);
        $this->DateofAdmission->setDbValue($row['DateofAdmission']);
        $this->DateodProcedure->setDbValue($row['DateodProcedure']);
        $this->Miscarriage->setDbValue($row['Miscarriage']);
        $this->ModeOfDelivery->setDbValue($row['ModeOfDelivery']);
        $this->ND->setDbValue($row['ND']);
        $this->NDS->setDbValue($row['NDS']);
        $this->NDP->setDbValue($row['NDP']);
        $this->Vaccum->setDbValue($row['Vaccum']);
        $this->VaccumS->setDbValue($row['VaccumS']);
        $this->VaccumP->setDbValue($row['VaccumP']);
        $this->Forceps->setDbValue($row['Forceps']);
        $this->ForcepsS->setDbValue($row['ForcepsS']);
        $this->ForcepsP->setDbValue($row['ForcepsP']);
        $this->Elective->setDbValue($row['Elective']);
        $this->ElectiveS->setDbValue($row['ElectiveS']);
        $this->ElectiveP->setDbValue($row['ElectiveP']);
        $this->Emergency->setDbValue($row['Emergency']);
        $this->EmergencyS->setDbValue($row['EmergencyS']);
        $this->EmergencyP->setDbValue($row['EmergencyP']);
        $this->Maturity->setDbValue($row['Maturity']);
        $this->Baby1->setDbValue($row['Baby1']);
        $this->Baby2->setDbValue($row['Baby2']);
        $this->sex1->setDbValue($row['sex1']);
        $this->sex2->setDbValue($row['sex2']);
        $this->weight1->setDbValue($row['weight1']);
        $this->weight2->setDbValue($row['weight2']);
        $this->NICU1->setDbValue($row['NICU1']);
        $this->NICU2->setDbValue($row['NICU2']);
        $this->Jaundice1->setDbValue($row['Jaundice1']);
        $this->Jaundice2->setDbValue($row['Jaundice2']);
        $this->Others1->setDbValue($row['Others1']);
        $this->Others2->setDbValue($row['Others2']);
        $this->SpillOverReasons->setDbValue($row['SpillOverReasons']);
        $this->ANClosed->setDbValue($row['ANClosed']);
        $this->ANClosedDATE->setDbValue($row['ANClosedDATE']);
        $this->PastMedicalHistoryOthers->setDbValue($row['PastMedicalHistoryOthers']);
        $this->PastSurgicalHistoryOthers->setDbValue($row['PastSurgicalHistoryOthers']);
        $this->FamilyHistoryOthers->setDbValue($row['FamilyHistoryOthers']);
        $this->PresentPregnancyComplicationsOthers->setDbValue($row['PresentPregnancyComplicationsOthers']);
        $this->ETdate->setDbValue($row['ETdate']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // pid

        // fid

        // G

        // P

        // L

        // A

        // E

        // M

        // LMP

        // EDO

        // MenstrualHistory

        // MaritalHistory

        // ObstetricHistory

        // PreviousHistoryofGDM

        // PreviousHistorofPIH

        // PreviousHistoryofIUGR

        // PreviousHistoryofOligohydramnios

        // PreviousHistoryofPreterm

        // G1

        // G2

        // G3

        // DeliveryNDLSCS1

        // DeliveryNDLSCS2

        // DeliveryNDLSCS3

        // BabySexweight1

        // BabySexweight2

        // BabySexweight3

        // PastMedicalHistory

        // PastSurgicalHistory

        // FamilyHistory

        // Viability

        // ViabilityDATE

        // ViabilityREPORT

        // Viability2

        // Viability2DATE

        // Viability2REPORT

        // NTscan

        // NTscanDATE

        // NTscanREPORT

        // EarlyTarget

        // EarlyTargetDATE

        // EarlyTargetREPORT

        // Anomaly

        // AnomalyDATE

        // AnomalyREPORT

        // Growth

        // GrowthDATE

        // GrowthREPORT

        // Growth1

        // Growth1DATE

        // Growth1REPORT

        // ANProfile

        // ANProfileDATE

        // ANProfileINHOUSE

        // ANProfileREPORT

        // DualMarker

        // DualMarkerDATE

        // DualMarkerINHOUSE

        // DualMarkerREPORT

        // Quadruple

        // QuadrupleDATE

        // QuadrupleINHOUSE

        // QuadrupleREPORT

        // A5month

        // A5monthDATE

        // A5monthINHOUSE

        // A5monthREPORT

        // A7month

        // A7monthDATE

        // A7monthINHOUSE

        // A7monthREPORT

        // A9month

        // A9monthDATE

        // A9monthINHOUSE

        // A9monthREPORT

        // INJ

        // INJDATE

        // INJINHOUSE

        // INJREPORT

        // Bleeding

        // Hypothyroidism

        // PICMENumber

        // Outcome

        // DateofAdmission

        // DateodProcedure

        // Miscarriage

        // ModeOfDelivery

        // ND

        // NDS

        // NDP

        // Vaccum

        // VaccumS

        // VaccumP

        // Forceps

        // ForcepsS

        // ForcepsP

        // Elective

        // ElectiveS

        // ElectiveP

        // Emergency

        // EmergencyS

        // EmergencyP

        // Maturity

        // Baby1

        // Baby2

        // sex1

        // sex2

        // weight1

        // weight2

        // NICU1

        // NICU2

        // Jaundice1

        // Jaundice2

        // Others1

        // Others2

        // SpillOverReasons

        // ANClosed

        // ANClosedDATE

        // PastMedicalHistoryOthers

        // PastSurgicalHistoryOthers

        // FamilyHistoryOthers

        // PresentPregnancyComplicationsOthers

        // ETdate

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // pid
        $this->pid->ViewValue = $this->pid->CurrentValue;
        $this->pid->ViewValue = FormatNumber($this->pid->ViewValue, 0, -2, -2, -2);
        $this->pid->ViewCustomAttributes = "";

        // fid
        $this->fid->ViewValue = $this->fid->CurrentValue;
        $this->fid->ViewValue = FormatNumber($this->fid->ViewValue, 0, -2, -2, -2);
        $this->fid->ViewCustomAttributes = "";

        // G
        $this->G->ViewValue = $this->G->CurrentValue;
        $this->G->ViewCustomAttributes = "";

        // P
        $this->P->ViewValue = $this->P->CurrentValue;
        $this->P->ViewCustomAttributes = "";

        // L
        $this->L->ViewValue = $this->L->CurrentValue;
        $this->L->ViewCustomAttributes = "";

        // A
        $this->A->ViewValue = $this->A->CurrentValue;
        $this->A->ViewCustomAttributes = "";

        // E
        $this->E->ViewValue = $this->E->CurrentValue;
        $this->E->ViewCustomAttributes = "";

        // M
        $this->M->ViewValue = $this->M->CurrentValue;
        $this->M->ViewCustomAttributes = "";

        // LMP
        $this->LMP->ViewValue = $this->LMP->CurrentValue;
        $this->LMP->ViewCustomAttributes = "";

        // EDO
        $this->EDO->ViewValue = $this->EDO->CurrentValue;
        $this->EDO->ViewCustomAttributes = "";

        // MenstrualHistory
        if (strval($this->MenstrualHistory->CurrentValue) != "") {
            $this->MenstrualHistory->ViewValue = $this->MenstrualHistory->optionCaption($this->MenstrualHistory->CurrentValue);
        } else {
            $this->MenstrualHistory->ViewValue = null;
        }
        $this->MenstrualHistory->ViewCustomAttributes = "";

        // MaritalHistory
        $this->MaritalHistory->ViewValue = $this->MaritalHistory->CurrentValue;
        $this->MaritalHistory->ViewCustomAttributes = "";

        // ObstetricHistory
        $this->ObstetricHistory->ViewValue = $this->ObstetricHistory->CurrentValue;
        $this->ObstetricHistory->ViewCustomAttributes = "";

        // PreviousHistoryofGDM
        if (strval($this->PreviousHistoryofGDM->CurrentValue) != "") {
            $this->PreviousHistoryofGDM->ViewValue = $this->PreviousHistoryofGDM->optionCaption($this->PreviousHistoryofGDM->CurrentValue);
        } else {
            $this->PreviousHistoryofGDM->ViewValue = null;
        }
        $this->PreviousHistoryofGDM->ViewCustomAttributes = "";

        // PreviousHistorofPIH
        if (strval($this->PreviousHistorofPIH->CurrentValue) != "") {
            $this->PreviousHistorofPIH->ViewValue = $this->PreviousHistorofPIH->optionCaption($this->PreviousHistorofPIH->CurrentValue);
        } else {
            $this->PreviousHistorofPIH->ViewValue = null;
        }
        $this->PreviousHistorofPIH->ViewCustomAttributes = "";

        // PreviousHistoryofIUGR
        if (strval($this->PreviousHistoryofIUGR->CurrentValue) != "") {
            $this->PreviousHistoryofIUGR->ViewValue = $this->PreviousHistoryofIUGR->optionCaption($this->PreviousHistoryofIUGR->CurrentValue);
        } else {
            $this->PreviousHistoryofIUGR->ViewValue = null;
        }
        $this->PreviousHistoryofIUGR->ViewCustomAttributes = "";

        // PreviousHistoryofOligohydramnios
        if (strval($this->PreviousHistoryofOligohydramnios->CurrentValue) != "") {
            $this->PreviousHistoryofOligohydramnios->ViewValue = $this->PreviousHistoryofOligohydramnios->optionCaption($this->PreviousHistoryofOligohydramnios->CurrentValue);
        } else {
            $this->PreviousHistoryofOligohydramnios->ViewValue = null;
        }
        $this->PreviousHistoryofOligohydramnios->ViewCustomAttributes = "";

        // PreviousHistoryofPreterm
        if (strval($this->PreviousHistoryofPreterm->CurrentValue) != "") {
            $this->PreviousHistoryofPreterm->ViewValue = $this->PreviousHistoryofPreterm->optionCaption($this->PreviousHistoryofPreterm->CurrentValue);
        } else {
            $this->PreviousHistoryofPreterm->ViewValue = null;
        }
        $this->PreviousHistoryofPreterm->ViewCustomAttributes = "";

        // G1
        $this->G1->ViewValue = $this->G1->CurrentValue;
        $this->G1->ViewCustomAttributes = "";

        // G2
        $this->G2->ViewValue = $this->G2->CurrentValue;
        $this->G2->ViewCustomAttributes = "";

        // G3
        $this->G3->ViewValue = $this->G3->CurrentValue;
        $this->G3->ViewCustomAttributes = "";

        // DeliveryNDLSCS1
        $this->DeliveryNDLSCS1->ViewValue = $this->DeliveryNDLSCS1->CurrentValue;
        $this->DeliveryNDLSCS1->ViewCustomAttributes = "";

        // DeliveryNDLSCS2
        $this->DeliveryNDLSCS2->ViewValue = $this->DeliveryNDLSCS2->CurrentValue;
        $this->DeliveryNDLSCS2->ViewCustomAttributes = "";

        // DeliveryNDLSCS3
        $this->DeliveryNDLSCS3->ViewValue = $this->DeliveryNDLSCS3->CurrentValue;
        $this->DeliveryNDLSCS3->ViewCustomAttributes = "";

        // BabySexweight1
        $this->BabySexweight1->ViewValue = $this->BabySexweight1->CurrentValue;
        $this->BabySexweight1->ViewCustomAttributes = "";

        // BabySexweight2
        $this->BabySexweight2->ViewValue = $this->BabySexweight2->CurrentValue;
        $this->BabySexweight2->ViewCustomAttributes = "";

        // BabySexweight3
        $this->BabySexweight3->ViewValue = $this->BabySexweight3->CurrentValue;
        $this->BabySexweight3->ViewCustomAttributes = "";

        // PastMedicalHistory
        if (strval($this->PastMedicalHistory->CurrentValue) != "") {
            $this->PastMedicalHistory->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->PastMedicalHistory->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->PastMedicalHistory->ViewValue->add($this->PastMedicalHistory->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->PastMedicalHistory->ViewValue = null;
        }
        $this->PastMedicalHistory->ViewCustomAttributes = "";

        // PastSurgicalHistory
        if (strval($this->PastSurgicalHistory->CurrentValue) != "") {
            $this->PastSurgicalHistory->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->PastSurgicalHistory->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->PastSurgicalHistory->ViewValue->add($this->PastSurgicalHistory->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->PastSurgicalHistory->ViewValue = null;
        }
        $this->PastSurgicalHistory->ViewCustomAttributes = "";

        // FamilyHistory
        if (strval($this->FamilyHistory->CurrentValue) != "") {
            $this->FamilyHistory->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->FamilyHistory->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->FamilyHistory->ViewValue->add($this->FamilyHistory->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->FamilyHistory->ViewValue = null;
        }
        $this->FamilyHistory->ViewCustomAttributes = "";

        // Viability
        $this->Viability->ViewValue = $this->Viability->CurrentValue;
        $this->Viability->ViewCustomAttributes = "";

        // ViabilityDATE
        $this->ViabilityDATE->ViewValue = $this->ViabilityDATE->CurrentValue;
        $this->ViabilityDATE->ViewCustomAttributes = "";

        // ViabilityREPORT
        $this->ViabilityREPORT->ViewValue = $this->ViabilityREPORT->CurrentValue;
        $this->ViabilityREPORT->ViewCustomAttributes = "";

        // Viability2
        $this->Viability2->ViewValue = $this->Viability2->CurrentValue;
        $this->Viability2->ViewCustomAttributes = "";

        // Viability2DATE
        $this->Viability2DATE->ViewValue = $this->Viability2DATE->CurrentValue;
        $this->Viability2DATE->ViewCustomAttributes = "";

        // Viability2REPORT
        $this->Viability2REPORT->ViewValue = $this->Viability2REPORT->CurrentValue;
        $this->Viability2REPORT->ViewCustomAttributes = "";

        // NTscan
        $this->NTscan->ViewValue = $this->NTscan->CurrentValue;
        $this->NTscan->ViewCustomAttributes = "";

        // NTscanDATE
        $this->NTscanDATE->ViewValue = $this->NTscanDATE->CurrentValue;
        $this->NTscanDATE->ViewCustomAttributes = "";

        // NTscanREPORT
        $this->NTscanREPORT->ViewValue = $this->NTscanREPORT->CurrentValue;
        $this->NTscanREPORT->ViewCustomAttributes = "";

        // EarlyTarget
        $this->EarlyTarget->ViewValue = $this->EarlyTarget->CurrentValue;
        $this->EarlyTarget->ViewCustomAttributes = "";

        // EarlyTargetDATE
        $this->EarlyTargetDATE->ViewValue = $this->EarlyTargetDATE->CurrentValue;
        $this->EarlyTargetDATE->ViewCustomAttributes = "";

        // EarlyTargetREPORT
        $this->EarlyTargetREPORT->ViewValue = $this->EarlyTargetREPORT->CurrentValue;
        $this->EarlyTargetREPORT->ViewCustomAttributes = "";

        // Anomaly
        $this->Anomaly->ViewValue = $this->Anomaly->CurrentValue;
        $this->Anomaly->ViewCustomAttributes = "";

        // AnomalyDATE
        $this->AnomalyDATE->ViewValue = $this->AnomalyDATE->CurrentValue;
        $this->AnomalyDATE->ViewCustomAttributes = "";

        // AnomalyREPORT
        $this->AnomalyREPORT->ViewValue = $this->AnomalyREPORT->CurrentValue;
        $this->AnomalyREPORT->ViewCustomAttributes = "";

        // Growth
        $this->Growth->ViewValue = $this->Growth->CurrentValue;
        $this->Growth->ViewCustomAttributes = "";

        // GrowthDATE
        $this->GrowthDATE->ViewValue = $this->GrowthDATE->CurrentValue;
        $this->GrowthDATE->ViewCustomAttributes = "";

        // GrowthREPORT
        $this->GrowthREPORT->ViewValue = $this->GrowthREPORT->CurrentValue;
        $this->GrowthREPORT->ViewCustomAttributes = "";

        // Growth1
        $this->Growth1->ViewValue = $this->Growth1->CurrentValue;
        $this->Growth1->ViewCustomAttributes = "";

        // Growth1DATE
        $this->Growth1DATE->ViewValue = $this->Growth1DATE->CurrentValue;
        $this->Growth1DATE->ViewCustomAttributes = "";

        // Growth1REPORT
        $this->Growth1REPORT->ViewValue = $this->Growth1REPORT->CurrentValue;
        $this->Growth1REPORT->ViewCustomAttributes = "";

        // ANProfile
        $this->ANProfile->ViewValue = $this->ANProfile->CurrentValue;
        $this->ANProfile->ViewCustomAttributes = "";

        // ANProfileDATE
        $this->ANProfileDATE->ViewValue = $this->ANProfileDATE->CurrentValue;
        $this->ANProfileDATE->ViewCustomAttributes = "";

        // ANProfileINHOUSE
        $this->ANProfileINHOUSE->ViewValue = $this->ANProfileINHOUSE->CurrentValue;
        $this->ANProfileINHOUSE->ViewCustomAttributes = "";

        // ANProfileREPORT
        $this->ANProfileREPORT->ViewValue = $this->ANProfileREPORT->CurrentValue;
        $this->ANProfileREPORT->ViewCustomAttributes = "";

        // DualMarker
        $this->DualMarker->ViewValue = $this->DualMarker->CurrentValue;
        $this->DualMarker->ViewCustomAttributes = "";

        // DualMarkerDATE
        $this->DualMarkerDATE->ViewValue = $this->DualMarkerDATE->CurrentValue;
        $this->DualMarkerDATE->ViewCustomAttributes = "";

        // DualMarkerINHOUSE
        $this->DualMarkerINHOUSE->ViewValue = $this->DualMarkerINHOUSE->CurrentValue;
        $this->DualMarkerINHOUSE->ViewCustomAttributes = "";

        // DualMarkerREPORT
        $this->DualMarkerREPORT->ViewValue = $this->DualMarkerREPORT->CurrentValue;
        $this->DualMarkerREPORT->ViewCustomAttributes = "";

        // Quadruple
        $this->Quadruple->ViewValue = $this->Quadruple->CurrentValue;
        $this->Quadruple->ViewCustomAttributes = "";

        // QuadrupleDATE
        $this->QuadrupleDATE->ViewValue = $this->QuadrupleDATE->CurrentValue;
        $this->QuadrupleDATE->ViewCustomAttributes = "";

        // QuadrupleINHOUSE
        $this->QuadrupleINHOUSE->ViewValue = $this->QuadrupleINHOUSE->CurrentValue;
        $this->QuadrupleINHOUSE->ViewCustomAttributes = "";

        // QuadrupleREPORT
        $this->QuadrupleREPORT->ViewValue = $this->QuadrupleREPORT->CurrentValue;
        $this->QuadrupleREPORT->ViewCustomAttributes = "";

        // A5month
        $this->A5month->ViewValue = $this->A5month->CurrentValue;
        $this->A5month->ViewCustomAttributes = "";

        // A5monthDATE
        $this->A5monthDATE->ViewValue = $this->A5monthDATE->CurrentValue;
        $this->A5monthDATE->ViewCustomAttributes = "";

        // A5monthINHOUSE
        $this->A5monthINHOUSE->ViewValue = $this->A5monthINHOUSE->CurrentValue;
        $this->A5monthINHOUSE->ViewCustomAttributes = "";

        // A5monthREPORT
        $this->A5monthREPORT->ViewValue = $this->A5monthREPORT->CurrentValue;
        $this->A5monthREPORT->ViewCustomAttributes = "";

        // A7month
        $this->A7month->ViewValue = $this->A7month->CurrentValue;
        $this->A7month->ViewCustomAttributes = "";

        // A7monthDATE
        $this->A7monthDATE->ViewValue = $this->A7monthDATE->CurrentValue;
        $this->A7monthDATE->ViewCustomAttributes = "";

        // A7monthINHOUSE
        $this->A7monthINHOUSE->ViewValue = $this->A7monthINHOUSE->CurrentValue;
        $this->A7monthINHOUSE->ViewCustomAttributes = "";

        // A7monthREPORT
        $this->A7monthREPORT->ViewValue = $this->A7monthREPORT->CurrentValue;
        $this->A7monthREPORT->ViewCustomAttributes = "";

        // A9month
        $this->A9month->ViewValue = $this->A9month->CurrentValue;
        $this->A9month->ViewCustomAttributes = "";

        // A9monthDATE
        $this->A9monthDATE->ViewValue = $this->A9monthDATE->CurrentValue;
        $this->A9monthDATE->ViewCustomAttributes = "";

        // A9monthINHOUSE
        $this->A9monthINHOUSE->ViewValue = $this->A9monthINHOUSE->CurrentValue;
        $this->A9monthINHOUSE->ViewCustomAttributes = "";

        // A9monthREPORT
        $this->A9monthREPORT->ViewValue = $this->A9monthREPORT->CurrentValue;
        $this->A9monthREPORT->ViewCustomAttributes = "";

        // INJ
        $this->INJ->ViewValue = $this->INJ->CurrentValue;
        $this->INJ->ViewCustomAttributes = "";

        // INJDATE
        $this->INJDATE->ViewValue = $this->INJDATE->CurrentValue;
        $this->INJDATE->ViewCustomAttributes = "";

        // INJINHOUSE
        $this->INJINHOUSE->ViewValue = $this->INJINHOUSE->CurrentValue;
        $this->INJINHOUSE->ViewCustomAttributes = "";

        // INJREPORT
        $this->INJREPORT->ViewValue = $this->INJREPORT->CurrentValue;
        $this->INJREPORT->ViewCustomAttributes = "";

        // Bleeding
        if (strval($this->Bleeding->CurrentValue) != "") {
            $this->Bleeding->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->Bleeding->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->Bleeding->ViewValue->add($this->Bleeding->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->Bleeding->ViewValue = null;
        }
        $this->Bleeding->ViewCustomAttributes = "";

        // Hypothyroidism
        $this->Hypothyroidism->ViewValue = $this->Hypothyroidism->CurrentValue;
        $this->Hypothyroidism->ViewCustomAttributes = "";

        // PICMENumber
        $this->PICMENumber->ViewValue = $this->PICMENumber->CurrentValue;
        $this->PICMENumber->ViewCustomAttributes = "";

        // Outcome
        $this->Outcome->ViewValue = $this->Outcome->CurrentValue;
        $this->Outcome->ViewCustomAttributes = "";

        // DateofAdmission
        $this->DateofAdmission->ViewValue = $this->DateofAdmission->CurrentValue;
        $this->DateofAdmission->ViewCustomAttributes = "";

        // DateodProcedure
        $this->DateodProcedure->ViewValue = $this->DateodProcedure->CurrentValue;
        $this->DateodProcedure->ViewCustomAttributes = "";

        // Miscarriage
        if (strval($this->Miscarriage->CurrentValue) != "") {
            $this->Miscarriage->ViewValue = $this->Miscarriage->optionCaption($this->Miscarriage->CurrentValue);
        } else {
            $this->Miscarriage->ViewValue = null;
        }
        $this->Miscarriage->ViewCustomAttributes = "";

        // ModeOfDelivery
        if (strval($this->ModeOfDelivery->CurrentValue) != "") {
            $this->ModeOfDelivery->ViewValue = $this->ModeOfDelivery->optionCaption($this->ModeOfDelivery->CurrentValue);
        } else {
            $this->ModeOfDelivery->ViewValue = null;
        }
        $this->ModeOfDelivery->ViewCustomAttributes = "";

        // ND
        $this->ND->ViewValue = $this->ND->CurrentValue;
        $this->ND->ViewCustomAttributes = "";

        // NDS
        if (strval($this->NDS->CurrentValue) != "") {
            $this->NDS->ViewValue = $this->NDS->optionCaption($this->NDS->CurrentValue);
        } else {
            $this->NDS->ViewValue = null;
        }
        $this->NDS->ViewCustomAttributes = "";

        // NDP
        if (strval($this->NDP->CurrentValue) != "") {
            $this->NDP->ViewValue = $this->NDP->optionCaption($this->NDP->CurrentValue);
        } else {
            $this->NDP->ViewValue = null;
        }
        $this->NDP->ViewCustomAttributes = "";

        // Vaccum
        $this->Vaccum->ViewValue = $this->Vaccum->CurrentValue;
        $this->Vaccum->ViewCustomAttributes = "";

        // VaccumS
        if (strval($this->VaccumS->CurrentValue) != "") {
            $this->VaccumS->ViewValue = $this->VaccumS->optionCaption($this->VaccumS->CurrentValue);
        } else {
            $this->VaccumS->ViewValue = null;
        }
        $this->VaccumS->ViewCustomAttributes = "";

        // VaccumP
        if (strval($this->VaccumP->CurrentValue) != "") {
            $this->VaccumP->ViewValue = $this->VaccumP->optionCaption($this->VaccumP->CurrentValue);
        } else {
            $this->VaccumP->ViewValue = null;
        }
        $this->VaccumP->ViewCustomAttributes = "";

        // Forceps
        $this->Forceps->ViewValue = $this->Forceps->CurrentValue;
        $this->Forceps->ViewCustomAttributes = "";

        // ForcepsS
        if (strval($this->ForcepsS->CurrentValue) != "") {
            $this->ForcepsS->ViewValue = $this->ForcepsS->optionCaption($this->ForcepsS->CurrentValue);
        } else {
            $this->ForcepsS->ViewValue = null;
        }
        $this->ForcepsS->ViewCustomAttributes = "";

        // ForcepsP
        if (strval($this->ForcepsP->CurrentValue) != "") {
            $this->ForcepsP->ViewValue = $this->ForcepsP->optionCaption($this->ForcepsP->CurrentValue);
        } else {
            $this->ForcepsP->ViewValue = null;
        }
        $this->ForcepsP->ViewCustomAttributes = "";

        // Elective
        $this->Elective->ViewValue = $this->Elective->CurrentValue;
        $this->Elective->ViewCustomAttributes = "";

        // ElectiveS
        if (strval($this->ElectiveS->CurrentValue) != "") {
            $this->ElectiveS->ViewValue = $this->ElectiveS->optionCaption($this->ElectiveS->CurrentValue);
        } else {
            $this->ElectiveS->ViewValue = null;
        }
        $this->ElectiveS->ViewCustomAttributes = "";

        // ElectiveP
        if (strval($this->ElectiveP->CurrentValue) != "") {
            $this->ElectiveP->ViewValue = $this->ElectiveP->optionCaption($this->ElectiveP->CurrentValue);
        } else {
            $this->ElectiveP->ViewValue = null;
        }
        $this->ElectiveP->ViewCustomAttributes = "";

        // Emergency
        $this->Emergency->ViewValue = $this->Emergency->CurrentValue;
        $this->Emergency->ViewCustomAttributes = "";

        // EmergencyS
        if (strval($this->EmergencyS->CurrentValue) != "") {
            $this->EmergencyS->ViewValue = $this->EmergencyS->optionCaption($this->EmergencyS->CurrentValue);
        } else {
            $this->EmergencyS->ViewValue = null;
        }
        $this->EmergencyS->ViewCustomAttributes = "";

        // EmergencyP
        if (strval($this->EmergencyP->CurrentValue) != "") {
            $this->EmergencyP->ViewValue = $this->EmergencyP->optionCaption($this->EmergencyP->CurrentValue);
        } else {
            $this->EmergencyP->ViewValue = null;
        }
        $this->EmergencyP->ViewCustomAttributes = "";

        // Maturity
        if (strval($this->Maturity->CurrentValue) != "") {
            $this->Maturity->ViewValue = $this->Maturity->optionCaption($this->Maturity->CurrentValue);
        } else {
            $this->Maturity->ViewValue = null;
        }
        $this->Maturity->ViewCustomAttributes = "";

        // Baby1
        $this->Baby1->ViewValue = $this->Baby1->CurrentValue;
        $this->Baby1->ViewCustomAttributes = "";

        // Baby2
        $this->Baby2->ViewValue = $this->Baby2->CurrentValue;
        $this->Baby2->ViewCustomAttributes = "";

        // sex1
        $this->sex1->ViewValue = $this->sex1->CurrentValue;
        $this->sex1->ViewCustomAttributes = "";

        // sex2
        $this->sex2->ViewValue = $this->sex2->CurrentValue;
        $this->sex2->ViewCustomAttributes = "";

        // weight1
        $this->weight1->ViewValue = $this->weight1->CurrentValue;
        $this->weight1->ViewCustomAttributes = "";

        // weight2
        $this->weight2->ViewValue = $this->weight2->CurrentValue;
        $this->weight2->ViewCustomAttributes = "";

        // NICU1
        $this->NICU1->ViewValue = $this->NICU1->CurrentValue;
        $this->NICU1->ViewCustomAttributes = "";

        // NICU2
        $this->NICU2->ViewValue = $this->NICU2->CurrentValue;
        $this->NICU2->ViewCustomAttributes = "";

        // Jaundice1
        $this->Jaundice1->ViewValue = $this->Jaundice1->CurrentValue;
        $this->Jaundice1->ViewCustomAttributes = "";

        // Jaundice2
        $this->Jaundice2->ViewValue = $this->Jaundice2->CurrentValue;
        $this->Jaundice2->ViewCustomAttributes = "";

        // Others1
        $this->Others1->ViewValue = $this->Others1->CurrentValue;
        $this->Others1->ViewCustomAttributes = "";

        // Others2
        $this->Others2->ViewValue = $this->Others2->CurrentValue;
        $this->Others2->ViewCustomAttributes = "";

        // SpillOverReasons
        if (strval($this->SpillOverReasons->CurrentValue) != "") {
            $this->SpillOverReasons->ViewValue = $this->SpillOverReasons->optionCaption($this->SpillOverReasons->CurrentValue);
        } else {
            $this->SpillOverReasons->ViewValue = null;
        }
        $this->SpillOverReasons->ViewCustomAttributes = "";

        // ANClosed
        if (strval($this->ANClosed->CurrentValue) != "") {
            $this->ANClosed->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->ANClosed->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->ANClosed->ViewValue->add($this->ANClosed->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->ANClosed->ViewValue = null;
        }
        $this->ANClosed->ViewCustomAttributes = "";

        // ANClosedDATE
        $this->ANClosedDATE->ViewValue = $this->ANClosedDATE->CurrentValue;
        $this->ANClosedDATE->ViewCustomAttributes = "";

        // PastMedicalHistoryOthers
        $this->PastMedicalHistoryOthers->ViewValue = $this->PastMedicalHistoryOthers->CurrentValue;
        $this->PastMedicalHistoryOthers->ViewCustomAttributes = "";

        // PastSurgicalHistoryOthers
        $this->PastSurgicalHistoryOthers->ViewValue = $this->PastSurgicalHistoryOthers->CurrentValue;
        $this->PastSurgicalHistoryOthers->ViewCustomAttributes = "";

        // FamilyHistoryOthers
        $this->FamilyHistoryOthers->ViewValue = $this->FamilyHistoryOthers->CurrentValue;
        $this->FamilyHistoryOthers->ViewCustomAttributes = "";

        // PresentPregnancyComplicationsOthers
        $this->PresentPregnancyComplicationsOthers->ViewValue = $this->PresentPregnancyComplicationsOthers->CurrentValue;
        $this->PresentPregnancyComplicationsOthers->ViewCustomAttributes = "";

        // ETdate
        $this->ETdate->ViewValue = $this->ETdate->CurrentValue;
        $this->ETdate->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // pid
        $this->pid->LinkCustomAttributes = "";
        $this->pid->HrefValue = "";
        $this->pid->TooltipValue = "";

        // fid
        $this->fid->LinkCustomAttributes = "";
        $this->fid->HrefValue = "";
        $this->fid->TooltipValue = "";

        // G
        $this->G->LinkCustomAttributes = "";
        $this->G->HrefValue = "";
        $this->G->TooltipValue = "";

        // P
        $this->P->LinkCustomAttributes = "";
        $this->P->HrefValue = "";
        $this->P->TooltipValue = "";

        // L
        $this->L->LinkCustomAttributes = "";
        $this->L->HrefValue = "";
        $this->L->TooltipValue = "";

        // A
        $this->A->LinkCustomAttributes = "";
        $this->A->HrefValue = "";
        $this->A->TooltipValue = "";

        // E
        $this->E->LinkCustomAttributes = "";
        $this->E->HrefValue = "";
        $this->E->TooltipValue = "";

        // M
        $this->M->LinkCustomAttributes = "";
        $this->M->HrefValue = "";
        $this->M->TooltipValue = "";

        // LMP
        $this->LMP->LinkCustomAttributes = "";
        $this->LMP->HrefValue = "";
        $this->LMP->TooltipValue = "";

        // EDO
        $this->EDO->LinkCustomAttributes = "";
        $this->EDO->HrefValue = "";
        $this->EDO->TooltipValue = "";

        // MenstrualHistory
        $this->MenstrualHistory->LinkCustomAttributes = "";
        $this->MenstrualHistory->HrefValue = "";
        $this->MenstrualHistory->TooltipValue = "";

        // MaritalHistory
        $this->MaritalHistory->LinkCustomAttributes = "";
        $this->MaritalHistory->HrefValue = "";
        $this->MaritalHistory->TooltipValue = "";

        // ObstetricHistory
        $this->ObstetricHistory->LinkCustomAttributes = "";
        $this->ObstetricHistory->HrefValue = "";
        $this->ObstetricHistory->TooltipValue = "";

        // PreviousHistoryofGDM
        $this->PreviousHistoryofGDM->LinkCustomAttributes = "";
        $this->PreviousHistoryofGDM->HrefValue = "";
        $this->PreviousHistoryofGDM->TooltipValue = "";

        // PreviousHistorofPIH
        $this->PreviousHistorofPIH->LinkCustomAttributes = "";
        $this->PreviousHistorofPIH->HrefValue = "";
        $this->PreviousHistorofPIH->TooltipValue = "";

        // PreviousHistoryofIUGR
        $this->PreviousHistoryofIUGR->LinkCustomAttributes = "";
        $this->PreviousHistoryofIUGR->HrefValue = "";
        $this->PreviousHistoryofIUGR->TooltipValue = "";

        // PreviousHistoryofOligohydramnios
        $this->PreviousHistoryofOligohydramnios->LinkCustomAttributes = "";
        $this->PreviousHistoryofOligohydramnios->HrefValue = "";
        $this->PreviousHistoryofOligohydramnios->TooltipValue = "";

        // PreviousHistoryofPreterm
        $this->PreviousHistoryofPreterm->LinkCustomAttributes = "";
        $this->PreviousHistoryofPreterm->HrefValue = "";
        $this->PreviousHistoryofPreterm->TooltipValue = "";

        // G1
        $this->G1->LinkCustomAttributes = "";
        $this->G1->HrefValue = "";
        $this->G1->TooltipValue = "";

        // G2
        $this->G2->LinkCustomAttributes = "";
        $this->G2->HrefValue = "";
        $this->G2->TooltipValue = "";

        // G3
        $this->G3->LinkCustomAttributes = "";
        $this->G3->HrefValue = "";
        $this->G3->TooltipValue = "";

        // DeliveryNDLSCS1
        $this->DeliveryNDLSCS1->LinkCustomAttributes = "";
        $this->DeliveryNDLSCS1->HrefValue = "";
        $this->DeliveryNDLSCS1->TooltipValue = "";

        // DeliveryNDLSCS2
        $this->DeliveryNDLSCS2->LinkCustomAttributes = "";
        $this->DeliveryNDLSCS2->HrefValue = "";
        $this->DeliveryNDLSCS2->TooltipValue = "";

        // DeliveryNDLSCS3
        $this->DeliveryNDLSCS3->LinkCustomAttributes = "";
        $this->DeliveryNDLSCS3->HrefValue = "";
        $this->DeliveryNDLSCS3->TooltipValue = "";

        // BabySexweight1
        $this->BabySexweight1->LinkCustomAttributes = "";
        $this->BabySexweight1->HrefValue = "";
        $this->BabySexweight1->TooltipValue = "";

        // BabySexweight2
        $this->BabySexweight2->LinkCustomAttributes = "";
        $this->BabySexweight2->HrefValue = "";
        $this->BabySexweight2->TooltipValue = "";

        // BabySexweight3
        $this->BabySexweight3->LinkCustomAttributes = "";
        $this->BabySexweight3->HrefValue = "";
        $this->BabySexweight3->TooltipValue = "";

        // PastMedicalHistory
        $this->PastMedicalHistory->LinkCustomAttributes = "";
        $this->PastMedicalHistory->HrefValue = "";
        $this->PastMedicalHistory->TooltipValue = "";

        // PastSurgicalHistory
        $this->PastSurgicalHistory->LinkCustomAttributes = "";
        $this->PastSurgicalHistory->HrefValue = "";
        $this->PastSurgicalHistory->TooltipValue = "";

        // FamilyHistory
        $this->FamilyHistory->LinkCustomAttributes = "";
        $this->FamilyHistory->HrefValue = "";
        $this->FamilyHistory->TooltipValue = "";

        // Viability
        $this->Viability->LinkCustomAttributes = "";
        $this->Viability->HrefValue = "";
        $this->Viability->TooltipValue = "";

        // ViabilityDATE
        $this->ViabilityDATE->LinkCustomAttributes = "";
        $this->ViabilityDATE->HrefValue = "";
        $this->ViabilityDATE->TooltipValue = "";

        // ViabilityREPORT
        $this->ViabilityREPORT->LinkCustomAttributes = "";
        $this->ViabilityREPORT->HrefValue = "";
        $this->ViabilityREPORT->TooltipValue = "";

        // Viability2
        $this->Viability2->LinkCustomAttributes = "";
        $this->Viability2->HrefValue = "";
        $this->Viability2->TooltipValue = "";

        // Viability2DATE
        $this->Viability2DATE->LinkCustomAttributes = "";
        $this->Viability2DATE->HrefValue = "";
        $this->Viability2DATE->TooltipValue = "";

        // Viability2REPORT
        $this->Viability2REPORT->LinkCustomAttributes = "";
        $this->Viability2REPORT->HrefValue = "";
        $this->Viability2REPORT->TooltipValue = "";

        // NTscan
        $this->NTscan->LinkCustomAttributes = "";
        $this->NTscan->HrefValue = "";
        $this->NTscan->TooltipValue = "";

        // NTscanDATE
        $this->NTscanDATE->LinkCustomAttributes = "";
        $this->NTscanDATE->HrefValue = "";
        $this->NTscanDATE->TooltipValue = "";

        // NTscanREPORT
        $this->NTscanREPORT->LinkCustomAttributes = "";
        $this->NTscanREPORT->HrefValue = "";
        $this->NTscanREPORT->TooltipValue = "";

        // EarlyTarget
        $this->EarlyTarget->LinkCustomAttributes = "";
        $this->EarlyTarget->HrefValue = "";
        $this->EarlyTarget->TooltipValue = "";

        // EarlyTargetDATE
        $this->EarlyTargetDATE->LinkCustomAttributes = "";
        $this->EarlyTargetDATE->HrefValue = "";
        $this->EarlyTargetDATE->TooltipValue = "";

        // EarlyTargetREPORT
        $this->EarlyTargetREPORT->LinkCustomAttributes = "";
        $this->EarlyTargetREPORT->HrefValue = "";
        $this->EarlyTargetREPORT->TooltipValue = "";

        // Anomaly
        $this->Anomaly->LinkCustomAttributes = "";
        $this->Anomaly->HrefValue = "";
        $this->Anomaly->TooltipValue = "";

        // AnomalyDATE
        $this->AnomalyDATE->LinkCustomAttributes = "";
        $this->AnomalyDATE->HrefValue = "";
        $this->AnomalyDATE->TooltipValue = "";

        // AnomalyREPORT
        $this->AnomalyREPORT->LinkCustomAttributes = "";
        $this->AnomalyREPORT->HrefValue = "";
        $this->AnomalyREPORT->TooltipValue = "";

        // Growth
        $this->Growth->LinkCustomAttributes = "";
        $this->Growth->HrefValue = "";
        $this->Growth->TooltipValue = "";

        // GrowthDATE
        $this->GrowthDATE->LinkCustomAttributes = "";
        $this->GrowthDATE->HrefValue = "";
        $this->GrowthDATE->TooltipValue = "";

        // GrowthREPORT
        $this->GrowthREPORT->LinkCustomAttributes = "";
        $this->GrowthREPORT->HrefValue = "";
        $this->GrowthREPORT->TooltipValue = "";

        // Growth1
        $this->Growth1->LinkCustomAttributes = "";
        $this->Growth1->HrefValue = "";
        $this->Growth1->TooltipValue = "";

        // Growth1DATE
        $this->Growth1DATE->LinkCustomAttributes = "";
        $this->Growth1DATE->HrefValue = "";
        $this->Growth1DATE->TooltipValue = "";

        // Growth1REPORT
        $this->Growth1REPORT->LinkCustomAttributes = "";
        $this->Growth1REPORT->HrefValue = "";
        $this->Growth1REPORT->TooltipValue = "";

        // ANProfile
        $this->ANProfile->LinkCustomAttributes = "";
        $this->ANProfile->HrefValue = "";
        $this->ANProfile->TooltipValue = "";

        // ANProfileDATE
        $this->ANProfileDATE->LinkCustomAttributes = "";
        $this->ANProfileDATE->HrefValue = "";
        $this->ANProfileDATE->TooltipValue = "";

        // ANProfileINHOUSE
        $this->ANProfileINHOUSE->LinkCustomAttributes = "";
        $this->ANProfileINHOUSE->HrefValue = "";
        $this->ANProfileINHOUSE->TooltipValue = "";

        // ANProfileREPORT
        $this->ANProfileREPORT->LinkCustomAttributes = "";
        $this->ANProfileREPORT->HrefValue = "";
        $this->ANProfileREPORT->TooltipValue = "";

        // DualMarker
        $this->DualMarker->LinkCustomAttributes = "";
        $this->DualMarker->HrefValue = "";
        $this->DualMarker->TooltipValue = "";

        // DualMarkerDATE
        $this->DualMarkerDATE->LinkCustomAttributes = "";
        $this->DualMarkerDATE->HrefValue = "";
        $this->DualMarkerDATE->TooltipValue = "";

        // DualMarkerINHOUSE
        $this->DualMarkerINHOUSE->LinkCustomAttributes = "";
        $this->DualMarkerINHOUSE->HrefValue = "";
        $this->DualMarkerINHOUSE->TooltipValue = "";

        // DualMarkerREPORT
        $this->DualMarkerREPORT->LinkCustomAttributes = "";
        $this->DualMarkerREPORT->HrefValue = "";
        $this->DualMarkerREPORT->TooltipValue = "";

        // Quadruple
        $this->Quadruple->LinkCustomAttributes = "";
        $this->Quadruple->HrefValue = "";
        $this->Quadruple->TooltipValue = "";

        // QuadrupleDATE
        $this->QuadrupleDATE->LinkCustomAttributes = "";
        $this->QuadrupleDATE->HrefValue = "";
        $this->QuadrupleDATE->TooltipValue = "";

        // QuadrupleINHOUSE
        $this->QuadrupleINHOUSE->LinkCustomAttributes = "";
        $this->QuadrupleINHOUSE->HrefValue = "";
        $this->QuadrupleINHOUSE->TooltipValue = "";

        // QuadrupleREPORT
        $this->QuadrupleREPORT->LinkCustomAttributes = "";
        $this->QuadrupleREPORT->HrefValue = "";
        $this->QuadrupleREPORT->TooltipValue = "";

        // A5month
        $this->A5month->LinkCustomAttributes = "";
        $this->A5month->HrefValue = "";
        $this->A5month->TooltipValue = "";

        // A5monthDATE
        $this->A5monthDATE->LinkCustomAttributes = "";
        $this->A5monthDATE->HrefValue = "";
        $this->A5monthDATE->TooltipValue = "";

        // A5monthINHOUSE
        $this->A5monthINHOUSE->LinkCustomAttributes = "";
        $this->A5monthINHOUSE->HrefValue = "";
        $this->A5monthINHOUSE->TooltipValue = "";

        // A5monthREPORT
        $this->A5monthREPORT->LinkCustomAttributes = "";
        $this->A5monthREPORT->HrefValue = "";
        $this->A5monthREPORT->TooltipValue = "";

        // A7month
        $this->A7month->LinkCustomAttributes = "";
        $this->A7month->HrefValue = "";
        $this->A7month->TooltipValue = "";

        // A7monthDATE
        $this->A7monthDATE->LinkCustomAttributes = "";
        $this->A7monthDATE->HrefValue = "";
        $this->A7monthDATE->TooltipValue = "";

        // A7monthINHOUSE
        $this->A7monthINHOUSE->LinkCustomAttributes = "";
        $this->A7monthINHOUSE->HrefValue = "";
        $this->A7monthINHOUSE->TooltipValue = "";

        // A7monthREPORT
        $this->A7monthREPORT->LinkCustomAttributes = "";
        $this->A7monthREPORT->HrefValue = "";
        $this->A7monthREPORT->TooltipValue = "";

        // A9month
        $this->A9month->LinkCustomAttributes = "";
        $this->A9month->HrefValue = "";
        $this->A9month->TooltipValue = "";

        // A9monthDATE
        $this->A9monthDATE->LinkCustomAttributes = "";
        $this->A9monthDATE->HrefValue = "";
        $this->A9monthDATE->TooltipValue = "";

        // A9monthINHOUSE
        $this->A9monthINHOUSE->LinkCustomAttributes = "";
        $this->A9monthINHOUSE->HrefValue = "";
        $this->A9monthINHOUSE->TooltipValue = "";

        // A9monthREPORT
        $this->A9monthREPORT->LinkCustomAttributes = "";
        $this->A9monthREPORT->HrefValue = "";
        $this->A9monthREPORT->TooltipValue = "";

        // INJ
        $this->INJ->LinkCustomAttributes = "";
        $this->INJ->HrefValue = "";
        $this->INJ->TooltipValue = "";

        // INJDATE
        $this->INJDATE->LinkCustomAttributes = "";
        $this->INJDATE->HrefValue = "";
        $this->INJDATE->TooltipValue = "";

        // INJINHOUSE
        $this->INJINHOUSE->LinkCustomAttributes = "";
        $this->INJINHOUSE->HrefValue = "";
        $this->INJINHOUSE->TooltipValue = "";

        // INJREPORT
        $this->INJREPORT->LinkCustomAttributes = "";
        $this->INJREPORT->HrefValue = "";
        $this->INJREPORT->TooltipValue = "";

        // Bleeding
        $this->Bleeding->LinkCustomAttributes = "";
        $this->Bleeding->HrefValue = "";
        $this->Bleeding->TooltipValue = "";

        // Hypothyroidism
        $this->Hypothyroidism->LinkCustomAttributes = "";
        $this->Hypothyroidism->HrefValue = "";
        $this->Hypothyroidism->TooltipValue = "";

        // PICMENumber
        $this->PICMENumber->LinkCustomAttributes = "";
        $this->PICMENumber->HrefValue = "";
        $this->PICMENumber->TooltipValue = "";

        // Outcome
        $this->Outcome->LinkCustomAttributes = "";
        $this->Outcome->HrefValue = "";
        $this->Outcome->TooltipValue = "";

        // DateofAdmission
        $this->DateofAdmission->LinkCustomAttributes = "";
        $this->DateofAdmission->HrefValue = "";
        $this->DateofAdmission->TooltipValue = "";

        // DateodProcedure
        $this->DateodProcedure->LinkCustomAttributes = "";
        $this->DateodProcedure->HrefValue = "";
        $this->DateodProcedure->TooltipValue = "";

        // Miscarriage
        $this->Miscarriage->LinkCustomAttributes = "";
        $this->Miscarriage->HrefValue = "";
        $this->Miscarriage->TooltipValue = "";

        // ModeOfDelivery
        $this->ModeOfDelivery->LinkCustomAttributes = "";
        $this->ModeOfDelivery->HrefValue = "";
        $this->ModeOfDelivery->TooltipValue = "";

        // ND
        $this->ND->LinkCustomAttributes = "";
        $this->ND->HrefValue = "";
        $this->ND->TooltipValue = "";

        // NDS
        $this->NDS->LinkCustomAttributes = "";
        $this->NDS->HrefValue = "";
        $this->NDS->TooltipValue = "";

        // NDP
        $this->NDP->LinkCustomAttributes = "";
        $this->NDP->HrefValue = "";
        $this->NDP->TooltipValue = "";

        // Vaccum
        $this->Vaccum->LinkCustomAttributes = "";
        $this->Vaccum->HrefValue = "";
        $this->Vaccum->TooltipValue = "";

        // VaccumS
        $this->VaccumS->LinkCustomAttributes = "";
        $this->VaccumS->HrefValue = "";
        $this->VaccumS->TooltipValue = "";

        // VaccumP
        $this->VaccumP->LinkCustomAttributes = "";
        $this->VaccumP->HrefValue = "";
        $this->VaccumP->TooltipValue = "";

        // Forceps
        $this->Forceps->LinkCustomAttributes = "";
        $this->Forceps->HrefValue = "";
        $this->Forceps->TooltipValue = "";

        // ForcepsS
        $this->ForcepsS->LinkCustomAttributes = "";
        $this->ForcepsS->HrefValue = "";
        $this->ForcepsS->TooltipValue = "";

        // ForcepsP
        $this->ForcepsP->LinkCustomAttributes = "";
        $this->ForcepsP->HrefValue = "";
        $this->ForcepsP->TooltipValue = "";

        // Elective
        $this->Elective->LinkCustomAttributes = "";
        $this->Elective->HrefValue = "";
        $this->Elective->TooltipValue = "";

        // ElectiveS
        $this->ElectiveS->LinkCustomAttributes = "";
        $this->ElectiveS->HrefValue = "";
        $this->ElectiveS->TooltipValue = "";

        // ElectiveP
        $this->ElectiveP->LinkCustomAttributes = "";
        $this->ElectiveP->HrefValue = "";
        $this->ElectiveP->TooltipValue = "";

        // Emergency
        $this->Emergency->LinkCustomAttributes = "";
        $this->Emergency->HrefValue = "";
        $this->Emergency->TooltipValue = "";

        // EmergencyS
        $this->EmergencyS->LinkCustomAttributes = "";
        $this->EmergencyS->HrefValue = "";
        $this->EmergencyS->TooltipValue = "";

        // EmergencyP
        $this->EmergencyP->LinkCustomAttributes = "";
        $this->EmergencyP->HrefValue = "";
        $this->EmergencyP->TooltipValue = "";

        // Maturity
        $this->Maturity->LinkCustomAttributes = "";
        $this->Maturity->HrefValue = "";
        $this->Maturity->TooltipValue = "";

        // Baby1
        $this->Baby1->LinkCustomAttributes = "";
        $this->Baby1->HrefValue = "";
        $this->Baby1->TooltipValue = "";

        // Baby2
        $this->Baby2->LinkCustomAttributes = "";
        $this->Baby2->HrefValue = "";
        $this->Baby2->TooltipValue = "";

        // sex1
        $this->sex1->LinkCustomAttributes = "";
        $this->sex1->HrefValue = "";
        $this->sex1->TooltipValue = "";

        // sex2
        $this->sex2->LinkCustomAttributes = "";
        $this->sex2->HrefValue = "";
        $this->sex2->TooltipValue = "";

        // weight1
        $this->weight1->LinkCustomAttributes = "";
        $this->weight1->HrefValue = "";
        $this->weight1->TooltipValue = "";

        // weight2
        $this->weight2->LinkCustomAttributes = "";
        $this->weight2->HrefValue = "";
        $this->weight2->TooltipValue = "";

        // NICU1
        $this->NICU1->LinkCustomAttributes = "";
        $this->NICU1->HrefValue = "";
        $this->NICU1->TooltipValue = "";

        // NICU2
        $this->NICU2->LinkCustomAttributes = "";
        $this->NICU2->HrefValue = "";
        $this->NICU2->TooltipValue = "";

        // Jaundice1
        $this->Jaundice1->LinkCustomAttributes = "";
        $this->Jaundice1->HrefValue = "";
        $this->Jaundice1->TooltipValue = "";

        // Jaundice2
        $this->Jaundice2->LinkCustomAttributes = "";
        $this->Jaundice2->HrefValue = "";
        $this->Jaundice2->TooltipValue = "";

        // Others1
        $this->Others1->LinkCustomAttributes = "";
        $this->Others1->HrefValue = "";
        $this->Others1->TooltipValue = "";

        // Others2
        $this->Others2->LinkCustomAttributes = "";
        $this->Others2->HrefValue = "";
        $this->Others2->TooltipValue = "";

        // SpillOverReasons
        $this->SpillOverReasons->LinkCustomAttributes = "";
        $this->SpillOverReasons->HrefValue = "";
        $this->SpillOverReasons->TooltipValue = "";

        // ANClosed
        $this->ANClosed->LinkCustomAttributes = "";
        $this->ANClosed->HrefValue = "";
        $this->ANClosed->TooltipValue = "";

        // ANClosedDATE
        $this->ANClosedDATE->LinkCustomAttributes = "";
        $this->ANClosedDATE->HrefValue = "";
        $this->ANClosedDATE->TooltipValue = "";

        // PastMedicalHistoryOthers
        $this->PastMedicalHistoryOthers->LinkCustomAttributes = "";
        $this->PastMedicalHistoryOthers->HrefValue = "";
        $this->PastMedicalHistoryOthers->TooltipValue = "";

        // PastSurgicalHistoryOthers
        $this->PastSurgicalHistoryOthers->LinkCustomAttributes = "";
        $this->PastSurgicalHistoryOthers->HrefValue = "";
        $this->PastSurgicalHistoryOthers->TooltipValue = "";

        // FamilyHistoryOthers
        $this->FamilyHistoryOthers->LinkCustomAttributes = "";
        $this->FamilyHistoryOthers->HrefValue = "";
        $this->FamilyHistoryOthers->TooltipValue = "";

        // PresentPregnancyComplicationsOthers
        $this->PresentPregnancyComplicationsOthers->LinkCustomAttributes = "";
        $this->PresentPregnancyComplicationsOthers->HrefValue = "";
        $this->PresentPregnancyComplicationsOthers->TooltipValue = "";

        // ETdate
        $this->ETdate->LinkCustomAttributes = "";
        $this->ETdate->HrefValue = "";
        $this->ETdate->TooltipValue = "";

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

        // pid
        $this->pid->EditAttrs["class"] = "form-control";
        $this->pid->EditCustomAttributes = "";
        if ($this->pid->getSessionValue() != "") {
            $this->pid->CurrentValue = GetForeignKeyValue($this->pid->getSessionValue());
            $this->pid->ViewValue = $this->pid->CurrentValue;
            $this->pid->ViewValue = FormatNumber($this->pid->ViewValue, 0, -2, -2, -2);
            $this->pid->ViewCustomAttributes = "";
        } else {
            $this->pid->EditValue = $this->pid->CurrentValue;
            $this->pid->PlaceHolder = RemoveHtml($this->pid->caption());
        }

        // fid
        $this->fid->EditAttrs["class"] = "form-control";
        $this->fid->EditCustomAttributes = "";
        if ($this->fid->getSessionValue() != "") {
            $this->fid->CurrentValue = GetForeignKeyValue($this->fid->getSessionValue());
            $this->fid->ViewValue = $this->fid->CurrentValue;
            $this->fid->ViewValue = FormatNumber($this->fid->ViewValue, 0, -2, -2, -2);
            $this->fid->ViewCustomAttributes = "";
        } else {
            $this->fid->EditValue = $this->fid->CurrentValue;
            $this->fid->PlaceHolder = RemoveHtml($this->fid->caption());
        }

        // G
        $this->G->EditAttrs["class"] = "form-control";
        $this->G->EditCustomAttributes = "";
        if (!$this->G->Raw) {
            $this->G->CurrentValue = HtmlDecode($this->G->CurrentValue);
        }
        $this->G->EditValue = $this->G->CurrentValue;
        $this->G->PlaceHolder = RemoveHtml($this->G->caption());

        // P
        $this->P->EditAttrs["class"] = "form-control";
        $this->P->EditCustomAttributes = "";
        if (!$this->P->Raw) {
            $this->P->CurrentValue = HtmlDecode($this->P->CurrentValue);
        }
        $this->P->EditValue = $this->P->CurrentValue;
        $this->P->PlaceHolder = RemoveHtml($this->P->caption());

        // L
        $this->L->EditAttrs["class"] = "form-control";
        $this->L->EditCustomAttributes = "";
        if (!$this->L->Raw) {
            $this->L->CurrentValue = HtmlDecode($this->L->CurrentValue);
        }
        $this->L->EditValue = $this->L->CurrentValue;
        $this->L->PlaceHolder = RemoveHtml($this->L->caption());

        // A
        $this->A->EditAttrs["class"] = "form-control";
        $this->A->EditCustomAttributes = "";
        if (!$this->A->Raw) {
            $this->A->CurrentValue = HtmlDecode($this->A->CurrentValue);
        }
        $this->A->EditValue = $this->A->CurrentValue;
        $this->A->PlaceHolder = RemoveHtml($this->A->caption());

        // E
        $this->E->EditAttrs["class"] = "form-control";
        $this->E->EditCustomAttributes = "";
        if (!$this->E->Raw) {
            $this->E->CurrentValue = HtmlDecode($this->E->CurrentValue);
        }
        $this->E->EditValue = $this->E->CurrentValue;
        $this->E->PlaceHolder = RemoveHtml($this->E->caption());

        // M
        $this->M->EditAttrs["class"] = "form-control";
        $this->M->EditCustomAttributes = "";
        if (!$this->M->Raw) {
            $this->M->CurrentValue = HtmlDecode($this->M->CurrentValue);
        }
        $this->M->EditValue = $this->M->CurrentValue;
        $this->M->PlaceHolder = RemoveHtml($this->M->caption());

        // LMP
        $this->LMP->EditAttrs["class"] = "form-control";
        $this->LMP->EditCustomAttributes = "";
        if (!$this->LMP->Raw) {
            $this->LMP->CurrentValue = HtmlDecode($this->LMP->CurrentValue);
        }
        $this->LMP->EditValue = $this->LMP->CurrentValue;
        $this->LMP->PlaceHolder = RemoveHtml($this->LMP->caption());

        // EDO
        $this->EDO->EditAttrs["class"] = "form-control";
        $this->EDO->EditCustomAttributes = "";
        if (!$this->EDO->Raw) {
            $this->EDO->CurrentValue = HtmlDecode($this->EDO->CurrentValue);
        }
        $this->EDO->EditValue = $this->EDO->CurrentValue;
        $this->EDO->PlaceHolder = RemoveHtml($this->EDO->caption());

        // MenstrualHistory
        $this->MenstrualHistory->EditAttrs["class"] = "form-control";
        $this->MenstrualHistory->EditCustomAttributes = "";
        $this->MenstrualHistory->EditValue = $this->MenstrualHistory->options(true);
        $this->MenstrualHistory->PlaceHolder = RemoveHtml($this->MenstrualHistory->caption());

        // MaritalHistory
        $this->MaritalHistory->EditAttrs["class"] = "form-control";
        $this->MaritalHistory->EditCustomAttributes = "";
        if (!$this->MaritalHistory->Raw) {
            $this->MaritalHistory->CurrentValue = HtmlDecode($this->MaritalHistory->CurrentValue);
        }
        $this->MaritalHistory->EditValue = $this->MaritalHistory->CurrentValue;
        $this->MaritalHistory->PlaceHolder = RemoveHtml($this->MaritalHistory->caption());

        // ObstetricHistory
        $this->ObstetricHistory->EditAttrs["class"] = "form-control";
        $this->ObstetricHistory->EditCustomAttributes = "";
        if (!$this->ObstetricHistory->Raw) {
            $this->ObstetricHistory->CurrentValue = HtmlDecode($this->ObstetricHistory->CurrentValue);
        }
        $this->ObstetricHistory->EditValue = $this->ObstetricHistory->CurrentValue;
        $this->ObstetricHistory->PlaceHolder = RemoveHtml($this->ObstetricHistory->caption());

        // PreviousHistoryofGDM
        $this->PreviousHistoryofGDM->EditAttrs["class"] = "form-control";
        $this->PreviousHistoryofGDM->EditCustomAttributes = "";
        $this->PreviousHistoryofGDM->EditValue = $this->PreviousHistoryofGDM->options(true);
        $this->PreviousHistoryofGDM->PlaceHolder = RemoveHtml($this->PreviousHistoryofGDM->caption());

        // PreviousHistorofPIH
        $this->PreviousHistorofPIH->EditAttrs["class"] = "form-control";
        $this->PreviousHistorofPIH->EditCustomAttributes = "";
        $this->PreviousHistorofPIH->EditValue = $this->PreviousHistorofPIH->options(true);
        $this->PreviousHistorofPIH->PlaceHolder = RemoveHtml($this->PreviousHistorofPIH->caption());

        // PreviousHistoryofIUGR
        $this->PreviousHistoryofIUGR->EditAttrs["class"] = "form-control";
        $this->PreviousHistoryofIUGR->EditCustomAttributes = "";
        $this->PreviousHistoryofIUGR->EditValue = $this->PreviousHistoryofIUGR->options(true);
        $this->PreviousHistoryofIUGR->PlaceHolder = RemoveHtml($this->PreviousHistoryofIUGR->caption());

        // PreviousHistoryofOligohydramnios
        $this->PreviousHistoryofOligohydramnios->EditAttrs["class"] = "form-control";
        $this->PreviousHistoryofOligohydramnios->EditCustomAttributes = "";
        $this->PreviousHistoryofOligohydramnios->EditValue = $this->PreviousHistoryofOligohydramnios->options(true);
        $this->PreviousHistoryofOligohydramnios->PlaceHolder = RemoveHtml($this->PreviousHistoryofOligohydramnios->caption());

        // PreviousHistoryofPreterm
        $this->PreviousHistoryofPreterm->EditAttrs["class"] = "form-control";
        $this->PreviousHistoryofPreterm->EditCustomAttributes = "";
        $this->PreviousHistoryofPreterm->EditValue = $this->PreviousHistoryofPreterm->options(true);
        $this->PreviousHistoryofPreterm->PlaceHolder = RemoveHtml($this->PreviousHistoryofPreterm->caption());

        // G1
        $this->G1->EditAttrs["class"] = "form-control";
        $this->G1->EditCustomAttributes = "";
        if (!$this->G1->Raw) {
            $this->G1->CurrentValue = HtmlDecode($this->G1->CurrentValue);
        }
        $this->G1->EditValue = $this->G1->CurrentValue;
        $this->G1->PlaceHolder = RemoveHtml($this->G1->caption());

        // G2
        $this->G2->EditAttrs["class"] = "form-control";
        $this->G2->EditCustomAttributes = "";
        if (!$this->G2->Raw) {
            $this->G2->CurrentValue = HtmlDecode($this->G2->CurrentValue);
        }
        $this->G2->EditValue = $this->G2->CurrentValue;
        $this->G2->PlaceHolder = RemoveHtml($this->G2->caption());

        // G3
        $this->G3->EditAttrs["class"] = "form-control";
        $this->G3->EditCustomAttributes = "";
        if (!$this->G3->Raw) {
            $this->G3->CurrentValue = HtmlDecode($this->G3->CurrentValue);
        }
        $this->G3->EditValue = $this->G3->CurrentValue;
        $this->G3->PlaceHolder = RemoveHtml($this->G3->caption());

        // DeliveryNDLSCS1
        $this->DeliveryNDLSCS1->EditAttrs["class"] = "form-control";
        $this->DeliveryNDLSCS1->EditCustomAttributes = "";
        if (!$this->DeliveryNDLSCS1->Raw) {
            $this->DeliveryNDLSCS1->CurrentValue = HtmlDecode($this->DeliveryNDLSCS1->CurrentValue);
        }
        $this->DeliveryNDLSCS1->EditValue = $this->DeliveryNDLSCS1->CurrentValue;
        $this->DeliveryNDLSCS1->PlaceHolder = RemoveHtml($this->DeliveryNDLSCS1->caption());

        // DeliveryNDLSCS2
        $this->DeliveryNDLSCS2->EditAttrs["class"] = "form-control";
        $this->DeliveryNDLSCS2->EditCustomAttributes = "";
        if (!$this->DeliveryNDLSCS2->Raw) {
            $this->DeliveryNDLSCS2->CurrentValue = HtmlDecode($this->DeliveryNDLSCS2->CurrentValue);
        }
        $this->DeliveryNDLSCS2->EditValue = $this->DeliveryNDLSCS2->CurrentValue;
        $this->DeliveryNDLSCS2->PlaceHolder = RemoveHtml($this->DeliveryNDLSCS2->caption());

        // DeliveryNDLSCS3
        $this->DeliveryNDLSCS3->EditAttrs["class"] = "form-control";
        $this->DeliveryNDLSCS3->EditCustomAttributes = "";
        if (!$this->DeliveryNDLSCS3->Raw) {
            $this->DeliveryNDLSCS3->CurrentValue = HtmlDecode($this->DeliveryNDLSCS3->CurrentValue);
        }
        $this->DeliveryNDLSCS3->EditValue = $this->DeliveryNDLSCS3->CurrentValue;
        $this->DeliveryNDLSCS3->PlaceHolder = RemoveHtml($this->DeliveryNDLSCS3->caption());

        // BabySexweight1
        $this->BabySexweight1->EditAttrs["class"] = "form-control";
        $this->BabySexweight1->EditCustomAttributes = "";
        if (!$this->BabySexweight1->Raw) {
            $this->BabySexweight1->CurrentValue = HtmlDecode($this->BabySexweight1->CurrentValue);
        }
        $this->BabySexweight1->EditValue = $this->BabySexweight1->CurrentValue;
        $this->BabySexweight1->PlaceHolder = RemoveHtml($this->BabySexweight1->caption());

        // BabySexweight2
        $this->BabySexweight2->EditAttrs["class"] = "form-control";
        $this->BabySexweight2->EditCustomAttributes = "";
        if (!$this->BabySexweight2->Raw) {
            $this->BabySexweight2->CurrentValue = HtmlDecode($this->BabySexweight2->CurrentValue);
        }
        $this->BabySexweight2->EditValue = $this->BabySexweight2->CurrentValue;
        $this->BabySexweight2->PlaceHolder = RemoveHtml($this->BabySexweight2->caption());

        // BabySexweight3
        $this->BabySexweight3->EditAttrs["class"] = "form-control";
        $this->BabySexweight3->EditCustomAttributes = "";
        if (!$this->BabySexweight3->Raw) {
            $this->BabySexweight3->CurrentValue = HtmlDecode($this->BabySexweight3->CurrentValue);
        }
        $this->BabySexweight3->EditValue = $this->BabySexweight3->CurrentValue;
        $this->BabySexweight3->PlaceHolder = RemoveHtml($this->BabySexweight3->caption());

        // PastMedicalHistory
        $this->PastMedicalHistory->EditCustomAttributes = "";
        $this->PastMedicalHistory->EditValue = $this->PastMedicalHistory->options(false);
        $this->PastMedicalHistory->PlaceHolder = RemoveHtml($this->PastMedicalHistory->caption());

        // PastSurgicalHistory
        $this->PastSurgicalHistory->EditCustomAttributes = "";
        $this->PastSurgicalHistory->EditValue = $this->PastSurgicalHistory->options(false);
        $this->PastSurgicalHistory->PlaceHolder = RemoveHtml($this->PastSurgicalHistory->caption());

        // FamilyHistory
        $this->FamilyHistory->EditCustomAttributes = "";
        $this->FamilyHistory->EditValue = $this->FamilyHistory->options(false);
        $this->FamilyHistory->PlaceHolder = RemoveHtml($this->FamilyHistory->caption());

        // Viability
        $this->Viability->EditAttrs["class"] = "form-control";
        $this->Viability->EditCustomAttributes = "";
        if (!$this->Viability->Raw) {
            $this->Viability->CurrentValue = HtmlDecode($this->Viability->CurrentValue);
        }
        $this->Viability->EditValue = $this->Viability->CurrentValue;
        $this->Viability->PlaceHolder = RemoveHtml($this->Viability->caption());

        // ViabilityDATE
        $this->ViabilityDATE->EditAttrs["class"] = "form-control";
        $this->ViabilityDATE->EditCustomAttributes = "";
        if (!$this->ViabilityDATE->Raw) {
            $this->ViabilityDATE->CurrentValue = HtmlDecode($this->ViabilityDATE->CurrentValue);
        }
        $this->ViabilityDATE->EditValue = $this->ViabilityDATE->CurrentValue;
        $this->ViabilityDATE->PlaceHolder = RemoveHtml($this->ViabilityDATE->caption());

        // ViabilityREPORT
        $this->ViabilityREPORT->EditAttrs["class"] = "form-control";
        $this->ViabilityREPORT->EditCustomAttributes = "";
        if (!$this->ViabilityREPORT->Raw) {
            $this->ViabilityREPORT->CurrentValue = HtmlDecode($this->ViabilityREPORT->CurrentValue);
        }
        $this->ViabilityREPORT->EditValue = $this->ViabilityREPORT->CurrentValue;
        $this->ViabilityREPORT->PlaceHolder = RemoveHtml($this->ViabilityREPORT->caption());

        // Viability2
        $this->Viability2->EditAttrs["class"] = "form-control";
        $this->Viability2->EditCustomAttributes = "";
        if (!$this->Viability2->Raw) {
            $this->Viability2->CurrentValue = HtmlDecode($this->Viability2->CurrentValue);
        }
        $this->Viability2->EditValue = $this->Viability2->CurrentValue;
        $this->Viability2->PlaceHolder = RemoveHtml($this->Viability2->caption());

        // Viability2DATE
        $this->Viability2DATE->EditAttrs["class"] = "form-control";
        $this->Viability2DATE->EditCustomAttributes = "";
        if (!$this->Viability2DATE->Raw) {
            $this->Viability2DATE->CurrentValue = HtmlDecode($this->Viability2DATE->CurrentValue);
        }
        $this->Viability2DATE->EditValue = $this->Viability2DATE->CurrentValue;
        $this->Viability2DATE->PlaceHolder = RemoveHtml($this->Viability2DATE->caption());

        // Viability2REPORT
        $this->Viability2REPORT->EditAttrs["class"] = "form-control";
        $this->Viability2REPORT->EditCustomAttributes = "";
        if (!$this->Viability2REPORT->Raw) {
            $this->Viability2REPORT->CurrentValue = HtmlDecode($this->Viability2REPORT->CurrentValue);
        }
        $this->Viability2REPORT->EditValue = $this->Viability2REPORT->CurrentValue;
        $this->Viability2REPORT->PlaceHolder = RemoveHtml($this->Viability2REPORT->caption());

        // NTscan
        $this->NTscan->EditAttrs["class"] = "form-control";
        $this->NTscan->EditCustomAttributes = "";
        if (!$this->NTscan->Raw) {
            $this->NTscan->CurrentValue = HtmlDecode($this->NTscan->CurrentValue);
        }
        $this->NTscan->EditValue = $this->NTscan->CurrentValue;
        $this->NTscan->PlaceHolder = RemoveHtml($this->NTscan->caption());

        // NTscanDATE
        $this->NTscanDATE->EditAttrs["class"] = "form-control";
        $this->NTscanDATE->EditCustomAttributes = "";
        if (!$this->NTscanDATE->Raw) {
            $this->NTscanDATE->CurrentValue = HtmlDecode($this->NTscanDATE->CurrentValue);
        }
        $this->NTscanDATE->EditValue = $this->NTscanDATE->CurrentValue;
        $this->NTscanDATE->PlaceHolder = RemoveHtml($this->NTscanDATE->caption());

        // NTscanREPORT
        $this->NTscanREPORT->EditAttrs["class"] = "form-control";
        $this->NTscanREPORT->EditCustomAttributes = "";
        if (!$this->NTscanREPORT->Raw) {
            $this->NTscanREPORT->CurrentValue = HtmlDecode($this->NTscanREPORT->CurrentValue);
        }
        $this->NTscanREPORT->EditValue = $this->NTscanREPORT->CurrentValue;
        $this->NTscanREPORT->PlaceHolder = RemoveHtml($this->NTscanREPORT->caption());

        // EarlyTarget
        $this->EarlyTarget->EditAttrs["class"] = "form-control";
        $this->EarlyTarget->EditCustomAttributes = "";
        if (!$this->EarlyTarget->Raw) {
            $this->EarlyTarget->CurrentValue = HtmlDecode($this->EarlyTarget->CurrentValue);
        }
        $this->EarlyTarget->EditValue = $this->EarlyTarget->CurrentValue;
        $this->EarlyTarget->PlaceHolder = RemoveHtml($this->EarlyTarget->caption());

        // EarlyTargetDATE
        $this->EarlyTargetDATE->EditAttrs["class"] = "form-control";
        $this->EarlyTargetDATE->EditCustomAttributes = "";
        if (!$this->EarlyTargetDATE->Raw) {
            $this->EarlyTargetDATE->CurrentValue = HtmlDecode($this->EarlyTargetDATE->CurrentValue);
        }
        $this->EarlyTargetDATE->EditValue = $this->EarlyTargetDATE->CurrentValue;
        $this->EarlyTargetDATE->PlaceHolder = RemoveHtml($this->EarlyTargetDATE->caption());

        // EarlyTargetREPORT
        $this->EarlyTargetREPORT->EditAttrs["class"] = "form-control";
        $this->EarlyTargetREPORT->EditCustomAttributes = "";
        if (!$this->EarlyTargetREPORT->Raw) {
            $this->EarlyTargetREPORT->CurrentValue = HtmlDecode($this->EarlyTargetREPORT->CurrentValue);
        }
        $this->EarlyTargetREPORT->EditValue = $this->EarlyTargetREPORT->CurrentValue;
        $this->EarlyTargetREPORT->PlaceHolder = RemoveHtml($this->EarlyTargetREPORT->caption());

        // Anomaly
        $this->Anomaly->EditAttrs["class"] = "form-control";
        $this->Anomaly->EditCustomAttributes = "";
        if (!$this->Anomaly->Raw) {
            $this->Anomaly->CurrentValue = HtmlDecode($this->Anomaly->CurrentValue);
        }
        $this->Anomaly->EditValue = $this->Anomaly->CurrentValue;
        $this->Anomaly->PlaceHolder = RemoveHtml($this->Anomaly->caption());

        // AnomalyDATE
        $this->AnomalyDATE->EditAttrs["class"] = "form-control";
        $this->AnomalyDATE->EditCustomAttributes = "";
        if (!$this->AnomalyDATE->Raw) {
            $this->AnomalyDATE->CurrentValue = HtmlDecode($this->AnomalyDATE->CurrentValue);
        }
        $this->AnomalyDATE->EditValue = $this->AnomalyDATE->CurrentValue;
        $this->AnomalyDATE->PlaceHolder = RemoveHtml($this->AnomalyDATE->caption());

        // AnomalyREPORT
        $this->AnomalyREPORT->EditAttrs["class"] = "form-control";
        $this->AnomalyREPORT->EditCustomAttributes = "";
        if (!$this->AnomalyREPORT->Raw) {
            $this->AnomalyREPORT->CurrentValue = HtmlDecode($this->AnomalyREPORT->CurrentValue);
        }
        $this->AnomalyREPORT->EditValue = $this->AnomalyREPORT->CurrentValue;
        $this->AnomalyREPORT->PlaceHolder = RemoveHtml($this->AnomalyREPORT->caption());

        // Growth
        $this->Growth->EditAttrs["class"] = "form-control";
        $this->Growth->EditCustomAttributes = "";
        if (!$this->Growth->Raw) {
            $this->Growth->CurrentValue = HtmlDecode($this->Growth->CurrentValue);
        }
        $this->Growth->EditValue = $this->Growth->CurrentValue;
        $this->Growth->PlaceHolder = RemoveHtml($this->Growth->caption());

        // GrowthDATE
        $this->GrowthDATE->EditAttrs["class"] = "form-control";
        $this->GrowthDATE->EditCustomAttributes = "";
        if (!$this->GrowthDATE->Raw) {
            $this->GrowthDATE->CurrentValue = HtmlDecode($this->GrowthDATE->CurrentValue);
        }
        $this->GrowthDATE->EditValue = $this->GrowthDATE->CurrentValue;
        $this->GrowthDATE->PlaceHolder = RemoveHtml($this->GrowthDATE->caption());

        // GrowthREPORT
        $this->GrowthREPORT->EditAttrs["class"] = "form-control";
        $this->GrowthREPORT->EditCustomAttributes = "";
        if (!$this->GrowthREPORT->Raw) {
            $this->GrowthREPORT->CurrentValue = HtmlDecode($this->GrowthREPORT->CurrentValue);
        }
        $this->GrowthREPORT->EditValue = $this->GrowthREPORT->CurrentValue;
        $this->GrowthREPORT->PlaceHolder = RemoveHtml($this->GrowthREPORT->caption());

        // Growth1
        $this->Growth1->EditAttrs["class"] = "form-control";
        $this->Growth1->EditCustomAttributes = "";
        if (!$this->Growth1->Raw) {
            $this->Growth1->CurrentValue = HtmlDecode($this->Growth1->CurrentValue);
        }
        $this->Growth1->EditValue = $this->Growth1->CurrentValue;
        $this->Growth1->PlaceHolder = RemoveHtml($this->Growth1->caption());

        // Growth1DATE
        $this->Growth1DATE->EditAttrs["class"] = "form-control";
        $this->Growth1DATE->EditCustomAttributes = "";
        if (!$this->Growth1DATE->Raw) {
            $this->Growth1DATE->CurrentValue = HtmlDecode($this->Growth1DATE->CurrentValue);
        }
        $this->Growth1DATE->EditValue = $this->Growth1DATE->CurrentValue;
        $this->Growth1DATE->PlaceHolder = RemoveHtml($this->Growth1DATE->caption());

        // Growth1REPORT
        $this->Growth1REPORT->EditAttrs["class"] = "form-control";
        $this->Growth1REPORT->EditCustomAttributes = "";
        if (!$this->Growth1REPORT->Raw) {
            $this->Growth1REPORT->CurrentValue = HtmlDecode($this->Growth1REPORT->CurrentValue);
        }
        $this->Growth1REPORT->EditValue = $this->Growth1REPORT->CurrentValue;
        $this->Growth1REPORT->PlaceHolder = RemoveHtml($this->Growth1REPORT->caption());

        // ANProfile
        $this->ANProfile->EditAttrs["class"] = "form-control";
        $this->ANProfile->EditCustomAttributes = "";
        if (!$this->ANProfile->Raw) {
            $this->ANProfile->CurrentValue = HtmlDecode($this->ANProfile->CurrentValue);
        }
        $this->ANProfile->EditValue = $this->ANProfile->CurrentValue;
        $this->ANProfile->PlaceHolder = RemoveHtml($this->ANProfile->caption());

        // ANProfileDATE
        $this->ANProfileDATE->EditAttrs["class"] = "form-control";
        $this->ANProfileDATE->EditCustomAttributes = "";
        if (!$this->ANProfileDATE->Raw) {
            $this->ANProfileDATE->CurrentValue = HtmlDecode($this->ANProfileDATE->CurrentValue);
        }
        $this->ANProfileDATE->EditValue = $this->ANProfileDATE->CurrentValue;
        $this->ANProfileDATE->PlaceHolder = RemoveHtml($this->ANProfileDATE->caption());

        // ANProfileINHOUSE
        $this->ANProfileINHOUSE->EditAttrs["class"] = "form-control";
        $this->ANProfileINHOUSE->EditCustomAttributes = "";
        if (!$this->ANProfileINHOUSE->Raw) {
            $this->ANProfileINHOUSE->CurrentValue = HtmlDecode($this->ANProfileINHOUSE->CurrentValue);
        }
        $this->ANProfileINHOUSE->EditValue = $this->ANProfileINHOUSE->CurrentValue;
        $this->ANProfileINHOUSE->PlaceHolder = RemoveHtml($this->ANProfileINHOUSE->caption());

        // ANProfileREPORT
        $this->ANProfileREPORT->EditAttrs["class"] = "form-control";
        $this->ANProfileREPORT->EditCustomAttributes = "";
        if (!$this->ANProfileREPORT->Raw) {
            $this->ANProfileREPORT->CurrentValue = HtmlDecode($this->ANProfileREPORT->CurrentValue);
        }
        $this->ANProfileREPORT->EditValue = $this->ANProfileREPORT->CurrentValue;
        $this->ANProfileREPORT->PlaceHolder = RemoveHtml($this->ANProfileREPORT->caption());

        // DualMarker
        $this->DualMarker->EditAttrs["class"] = "form-control";
        $this->DualMarker->EditCustomAttributes = "";
        if (!$this->DualMarker->Raw) {
            $this->DualMarker->CurrentValue = HtmlDecode($this->DualMarker->CurrentValue);
        }
        $this->DualMarker->EditValue = $this->DualMarker->CurrentValue;
        $this->DualMarker->PlaceHolder = RemoveHtml($this->DualMarker->caption());

        // DualMarkerDATE
        $this->DualMarkerDATE->EditAttrs["class"] = "form-control";
        $this->DualMarkerDATE->EditCustomAttributes = "";
        if (!$this->DualMarkerDATE->Raw) {
            $this->DualMarkerDATE->CurrentValue = HtmlDecode($this->DualMarkerDATE->CurrentValue);
        }
        $this->DualMarkerDATE->EditValue = $this->DualMarkerDATE->CurrentValue;
        $this->DualMarkerDATE->PlaceHolder = RemoveHtml($this->DualMarkerDATE->caption());

        // DualMarkerINHOUSE
        $this->DualMarkerINHOUSE->EditAttrs["class"] = "form-control";
        $this->DualMarkerINHOUSE->EditCustomAttributes = "";
        if (!$this->DualMarkerINHOUSE->Raw) {
            $this->DualMarkerINHOUSE->CurrentValue = HtmlDecode($this->DualMarkerINHOUSE->CurrentValue);
        }
        $this->DualMarkerINHOUSE->EditValue = $this->DualMarkerINHOUSE->CurrentValue;
        $this->DualMarkerINHOUSE->PlaceHolder = RemoveHtml($this->DualMarkerINHOUSE->caption());

        // DualMarkerREPORT
        $this->DualMarkerREPORT->EditAttrs["class"] = "form-control";
        $this->DualMarkerREPORT->EditCustomAttributes = "";
        if (!$this->DualMarkerREPORT->Raw) {
            $this->DualMarkerREPORT->CurrentValue = HtmlDecode($this->DualMarkerREPORT->CurrentValue);
        }
        $this->DualMarkerREPORT->EditValue = $this->DualMarkerREPORT->CurrentValue;
        $this->DualMarkerREPORT->PlaceHolder = RemoveHtml($this->DualMarkerREPORT->caption());

        // Quadruple
        $this->Quadruple->EditAttrs["class"] = "form-control";
        $this->Quadruple->EditCustomAttributes = "";
        if (!$this->Quadruple->Raw) {
            $this->Quadruple->CurrentValue = HtmlDecode($this->Quadruple->CurrentValue);
        }
        $this->Quadruple->EditValue = $this->Quadruple->CurrentValue;
        $this->Quadruple->PlaceHolder = RemoveHtml($this->Quadruple->caption());

        // QuadrupleDATE
        $this->QuadrupleDATE->EditAttrs["class"] = "form-control";
        $this->QuadrupleDATE->EditCustomAttributes = "";
        if (!$this->QuadrupleDATE->Raw) {
            $this->QuadrupleDATE->CurrentValue = HtmlDecode($this->QuadrupleDATE->CurrentValue);
        }
        $this->QuadrupleDATE->EditValue = $this->QuadrupleDATE->CurrentValue;
        $this->QuadrupleDATE->PlaceHolder = RemoveHtml($this->QuadrupleDATE->caption());

        // QuadrupleINHOUSE
        $this->QuadrupleINHOUSE->EditAttrs["class"] = "form-control";
        $this->QuadrupleINHOUSE->EditCustomAttributes = "";
        if (!$this->QuadrupleINHOUSE->Raw) {
            $this->QuadrupleINHOUSE->CurrentValue = HtmlDecode($this->QuadrupleINHOUSE->CurrentValue);
        }
        $this->QuadrupleINHOUSE->EditValue = $this->QuadrupleINHOUSE->CurrentValue;
        $this->QuadrupleINHOUSE->PlaceHolder = RemoveHtml($this->QuadrupleINHOUSE->caption());

        // QuadrupleREPORT
        $this->QuadrupleREPORT->EditAttrs["class"] = "form-control";
        $this->QuadrupleREPORT->EditCustomAttributes = "";
        if (!$this->QuadrupleREPORT->Raw) {
            $this->QuadrupleREPORT->CurrentValue = HtmlDecode($this->QuadrupleREPORT->CurrentValue);
        }
        $this->QuadrupleREPORT->EditValue = $this->QuadrupleREPORT->CurrentValue;
        $this->QuadrupleREPORT->PlaceHolder = RemoveHtml($this->QuadrupleREPORT->caption());

        // A5month
        $this->A5month->EditAttrs["class"] = "form-control";
        $this->A5month->EditCustomAttributes = "";
        if (!$this->A5month->Raw) {
            $this->A5month->CurrentValue = HtmlDecode($this->A5month->CurrentValue);
        }
        $this->A5month->EditValue = $this->A5month->CurrentValue;
        $this->A5month->PlaceHolder = RemoveHtml($this->A5month->caption());

        // A5monthDATE
        $this->A5monthDATE->EditAttrs["class"] = "form-control";
        $this->A5monthDATE->EditCustomAttributes = "";
        if (!$this->A5monthDATE->Raw) {
            $this->A5monthDATE->CurrentValue = HtmlDecode($this->A5monthDATE->CurrentValue);
        }
        $this->A5monthDATE->EditValue = $this->A5monthDATE->CurrentValue;
        $this->A5monthDATE->PlaceHolder = RemoveHtml($this->A5monthDATE->caption());

        // A5monthINHOUSE
        $this->A5monthINHOUSE->EditAttrs["class"] = "form-control";
        $this->A5monthINHOUSE->EditCustomAttributes = "";
        if (!$this->A5monthINHOUSE->Raw) {
            $this->A5monthINHOUSE->CurrentValue = HtmlDecode($this->A5monthINHOUSE->CurrentValue);
        }
        $this->A5monthINHOUSE->EditValue = $this->A5monthINHOUSE->CurrentValue;
        $this->A5monthINHOUSE->PlaceHolder = RemoveHtml($this->A5monthINHOUSE->caption());

        // A5monthREPORT
        $this->A5monthREPORT->EditAttrs["class"] = "form-control";
        $this->A5monthREPORT->EditCustomAttributes = "";
        if (!$this->A5monthREPORT->Raw) {
            $this->A5monthREPORT->CurrentValue = HtmlDecode($this->A5monthREPORT->CurrentValue);
        }
        $this->A5monthREPORT->EditValue = $this->A5monthREPORT->CurrentValue;
        $this->A5monthREPORT->PlaceHolder = RemoveHtml($this->A5monthREPORT->caption());

        // A7month
        $this->A7month->EditAttrs["class"] = "form-control";
        $this->A7month->EditCustomAttributes = "";
        if (!$this->A7month->Raw) {
            $this->A7month->CurrentValue = HtmlDecode($this->A7month->CurrentValue);
        }
        $this->A7month->EditValue = $this->A7month->CurrentValue;
        $this->A7month->PlaceHolder = RemoveHtml($this->A7month->caption());

        // A7monthDATE
        $this->A7monthDATE->EditAttrs["class"] = "form-control";
        $this->A7monthDATE->EditCustomAttributes = "";
        if (!$this->A7monthDATE->Raw) {
            $this->A7monthDATE->CurrentValue = HtmlDecode($this->A7monthDATE->CurrentValue);
        }
        $this->A7monthDATE->EditValue = $this->A7monthDATE->CurrentValue;
        $this->A7monthDATE->PlaceHolder = RemoveHtml($this->A7monthDATE->caption());

        // A7monthINHOUSE
        $this->A7monthINHOUSE->EditAttrs["class"] = "form-control";
        $this->A7monthINHOUSE->EditCustomAttributes = "";
        if (!$this->A7monthINHOUSE->Raw) {
            $this->A7monthINHOUSE->CurrentValue = HtmlDecode($this->A7monthINHOUSE->CurrentValue);
        }
        $this->A7monthINHOUSE->EditValue = $this->A7monthINHOUSE->CurrentValue;
        $this->A7monthINHOUSE->PlaceHolder = RemoveHtml($this->A7monthINHOUSE->caption());

        // A7monthREPORT
        $this->A7monthREPORT->EditAttrs["class"] = "form-control";
        $this->A7monthREPORT->EditCustomAttributes = "";
        if (!$this->A7monthREPORT->Raw) {
            $this->A7monthREPORT->CurrentValue = HtmlDecode($this->A7monthREPORT->CurrentValue);
        }
        $this->A7monthREPORT->EditValue = $this->A7monthREPORT->CurrentValue;
        $this->A7monthREPORT->PlaceHolder = RemoveHtml($this->A7monthREPORT->caption());

        // A9month
        $this->A9month->EditAttrs["class"] = "form-control";
        $this->A9month->EditCustomAttributes = "";
        if (!$this->A9month->Raw) {
            $this->A9month->CurrentValue = HtmlDecode($this->A9month->CurrentValue);
        }
        $this->A9month->EditValue = $this->A9month->CurrentValue;
        $this->A9month->PlaceHolder = RemoveHtml($this->A9month->caption());

        // A9monthDATE
        $this->A9monthDATE->EditAttrs["class"] = "form-control";
        $this->A9monthDATE->EditCustomAttributes = "";
        if (!$this->A9monthDATE->Raw) {
            $this->A9monthDATE->CurrentValue = HtmlDecode($this->A9monthDATE->CurrentValue);
        }
        $this->A9monthDATE->EditValue = $this->A9monthDATE->CurrentValue;
        $this->A9monthDATE->PlaceHolder = RemoveHtml($this->A9monthDATE->caption());

        // A9monthINHOUSE
        $this->A9monthINHOUSE->EditAttrs["class"] = "form-control";
        $this->A9monthINHOUSE->EditCustomAttributes = "";
        if (!$this->A9monthINHOUSE->Raw) {
            $this->A9monthINHOUSE->CurrentValue = HtmlDecode($this->A9monthINHOUSE->CurrentValue);
        }
        $this->A9monthINHOUSE->EditValue = $this->A9monthINHOUSE->CurrentValue;
        $this->A9monthINHOUSE->PlaceHolder = RemoveHtml($this->A9monthINHOUSE->caption());

        // A9monthREPORT
        $this->A9monthREPORT->EditAttrs["class"] = "form-control";
        $this->A9monthREPORT->EditCustomAttributes = "";
        if (!$this->A9monthREPORT->Raw) {
            $this->A9monthREPORT->CurrentValue = HtmlDecode($this->A9monthREPORT->CurrentValue);
        }
        $this->A9monthREPORT->EditValue = $this->A9monthREPORT->CurrentValue;
        $this->A9monthREPORT->PlaceHolder = RemoveHtml($this->A9monthREPORT->caption());

        // INJ
        $this->INJ->EditAttrs["class"] = "form-control";
        $this->INJ->EditCustomAttributes = "";
        if (!$this->INJ->Raw) {
            $this->INJ->CurrentValue = HtmlDecode($this->INJ->CurrentValue);
        }
        $this->INJ->EditValue = $this->INJ->CurrentValue;
        $this->INJ->PlaceHolder = RemoveHtml($this->INJ->caption());

        // INJDATE
        $this->INJDATE->EditAttrs["class"] = "form-control";
        $this->INJDATE->EditCustomAttributes = "";
        if (!$this->INJDATE->Raw) {
            $this->INJDATE->CurrentValue = HtmlDecode($this->INJDATE->CurrentValue);
        }
        $this->INJDATE->EditValue = $this->INJDATE->CurrentValue;
        $this->INJDATE->PlaceHolder = RemoveHtml($this->INJDATE->caption());

        // INJINHOUSE
        $this->INJINHOUSE->EditAttrs["class"] = "form-control";
        $this->INJINHOUSE->EditCustomAttributes = "";
        if (!$this->INJINHOUSE->Raw) {
            $this->INJINHOUSE->CurrentValue = HtmlDecode($this->INJINHOUSE->CurrentValue);
        }
        $this->INJINHOUSE->EditValue = $this->INJINHOUSE->CurrentValue;
        $this->INJINHOUSE->PlaceHolder = RemoveHtml($this->INJINHOUSE->caption());

        // INJREPORT
        $this->INJREPORT->EditAttrs["class"] = "form-control";
        $this->INJREPORT->EditCustomAttributes = "";
        if (!$this->INJREPORT->Raw) {
            $this->INJREPORT->CurrentValue = HtmlDecode($this->INJREPORT->CurrentValue);
        }
        $this->INJREPORT->EditValue = $this->INJREPORT->CurrentValue;
        $this->INJREPORT->PlaceHolder = RemoveHtml($this->INJREPORT->caption());

        // Bleeding
        $this->Bleeding->EditCustomAttributes = "";
        $this->Bleeding->EditValue = $this->Bleeding->options(false);
        $this->Bleeding->PlaceHolder = RemoveHtml($this->Bleeding->caption());

        // Hypothyroidism
        $this->Hypothyroidism->EditAttrs["class"] = "form-control";
        $this->Hypothyroidism->EditCustomAttributes = "";
        if (!$this->Hypothyroidism->Raw) {
            $this->Hypothyroidism->CurrentValue = HtmlDecode($this->Hypothyroidism->CurrentValue);
        }
        $this->Hypothyroidism->EditValue = $this->Hypothyroidism->CurrentValue;
        $this->Hypothyroidism->PlaceHolder = RemoveHtml($this->Hypothyroidism->caption());

        // PICMENumber
        $this->PICMENumber->EditAttrs["class"] = "form-control";
        $this->PICMENumber->EditCustomAttributes = "";
        if (!$this->PICMENumber->Raw) {
            $this->PICMENumber->CurrentValue = HtmlDecode($this->PICMENumber->CurrentValue);
        }
        $this->PICMENumber->EditValue = $this->PICMENumber->CurrentValue;
        $this->PICMENumber->PlaceHolder = RemoveHtml($this->PICMENumber->caption());

        // Outcome
        $this->Outcome->EditAttrs["class"] = "form-control";
        $this->Outcome->EditCustomAttributes = "";
        if (!$this->Outcome->Raw) {
            $this->Outcome->CurrentValue = HtmlDecode($this->Outcome->CurrentValue);
        }
        $this->Outcome->EditValue = $this->Outcome->CurrentValue;
        $this->Outcome->PlaceHolder = RemoveHtml($this->Outcome->caption());

        // DateofAdmission
        $this->DateofAdmission->EditAttrs["class"] = "form-control";
        $this->DateofAdmission->EditCustomAttributes = "";
        if (!$this->DateofAdmission->Raw) {
            $this->DateofAdmission->CurrentValue = HtmlDecode($this->DateofAdmission->CurrentValue);
        }
        $this->DateofAdmission->EditValue = $this->DateofAdmission->CurrentValue;
        $this->DateofAdmission->PlaceHolder = RemoveHtml($this->DateofAdmission->caption());

        // DateodProcedure
        $this->DateodProcedure->EditAttrs["class"] = "form-control";
        $this->DateodProcedure->EditCustomAttributes = "";
        if (!$this->DateodProcedure->Raw) {
            $this->DateodProcedure->CurrentValue = HtmlDecode($this->DateodProcedure->CurrentValue);
        }
        $this->DateodProcedure->EditValue = $this->DateodProcedure->CurrentValue;
        $this->DateodProcedure->PlaceHolder = RemoveHtml($this->DateodProcedure->caption());

        // Miscarriage
        $this->Miscarriage->EditAttrs["class"] = "form-control";
        $this->Miscarriage->EditCustomAttributes = "";
        $this->Miscarriage->EditValue = $this->Miscarriage->options(true);
        $this->Miscarriage->PlaceHolder = RemoveHtml($this->Miscarriage->caption());

        // ModeOfDelivery
        $this->ModeOfDelivery->EditAttrs["class"] = "form-control";
        $this->ModeOfDelivery->EditCustomAttributes = "";
        $this->ModeOfDelivery->EditValue = $this->ModeOfDelivery->options(true);
        $this->ModeOfDelivery->PlaceHolder = RemoveHtml($this->ModeOfDelivery->caption());

        // ND
        $this->ND->EditAttrs["class"] = "form-control";
        $this->ND->EditCustomAttributes = "";
        if (!$this->ND->Raw) {
            $this->ND->CurrentValue = HtmlDecode($this->ND->CurrentValue);
        }
        $this->ND->EditValue = $this->ND->CurrentValue;
        $this->ND->PlaceHolder = RemoveHtml($this->ND->caption());

        // NDS
        $this->NDS->EditAttrs["class"] = "form-control";
        $this->NDS->EditCustomAttributes = "";
        $this->NDS->EditValue = $this->NDS->options(true);
        $this->NDS->PlaceHolder = RemoveHtml($this->NDS->caption());

        // NDP
        $this->NDP->EditAttrs["class"] = "form-control";
        $this->NDP->EditCustomAttributes = "";
        $this->NDP->EditValue = $this->NDP->options(true);
        $this->NDP->PlaceHolder = RemoveHtml($this->NDP->caption());

        // Vaccum
        $this->Vaccum->EditAttrs["class"] = "form-control";
        $this->Vaccum->EditCustomAttributes = "";
        if (!$this->Vaccum->Raw) {
            $this->Vaccum->CurrentValue = HtmlDecode($this->Vaccum->CurrentValue);
        }
        $this->Vaccum->EditValue = $this->Vaccum->CurrentValue;
        $this->Vaccum->PlaceHolder = RemoveHtml($this->Vaccum->caption());

        // VaccumS
        $this->VaccumS->EditAttrs["class"] = "form-control";
        $this->VaccumS->EditCustomAttributes = "";
        $this->VaccumS->EditValue = $this->VaccumS->options(true);
        $this->VaccumS->PlaceHolder = RemoveHtml($this->VaccumS->caption());

        // VaccumP
        $this->VaccumP->EditAttrs["class"] = "form-control";
        $this->VaccumP->EditCustomAttributes = "";
        $this->VaccumP->EditValue = $this->VaccumP->options(true);
        $this->VaccumP->PlaceHolder = RemoveHtml($this->VaccumP->caption());

        // Forceps
        $this->Forceps->EditAttrs["class"] = "form-control";
        $this->Forceps->EditCustomAttributes = "";
        if (!$this->Forceps->Raw) {
            $this->Forceps->CurrentValue = HtmlDecode($this->Forceps->CurrentValue);
        }
        $this->Forceps->EditValue = $this->Forceps->CurrentValue;
        $this->Forceps->PlaceHolder = RemoveHtml($this->Forceps->caption());

        // ForcepsS
        $this->ForcepsS->EditAttrs["class"] = "form-control";
        $this->ForcepsS->EditCustomAttributes = "";
        $this->ForcepsS->EditValue = $this->ForcepsS->options(true);
        $this->ForcepsS->PlaceHolder = RemoveHtml($this->ForcepsS->caption());

        // ForcepsP
        $this->ForcepsP->EditAttrs["class"] = "form-control";
        $this->ForcepsP->EditCustomAttributes = "";
        $this->ForcepsP->EditValue = $this->ForcepsP->options(true);
        $this->ForcepsP->PlaceHolder = RemoveHtml($this->ForcepsP->caption());

        // Elective
        $this->Elective->EditAttrs["class"] = "form-control";
        $this->Elective->EditCustomAttributes = "";
        if (!$this->Elective->Raw) {
            $this->Elective->CurrentValue = HtmlDecode($this->Elective->CurrentValue);
        }
        $this->Elective->EditValue = $this->Elective->CurrentValue;
        $this->Elective->PlaceHolder = RemoveHtml($this->Elective->caption());

        // ElectiveS
        $this->ElectiveS->EditAttrs["class"] = "form-control";
        $this->ElectiveS->EditCustomAttributes = "";
        $this->ElectiveS->EditValue = $this->ElectiveS->options(true);
        $this->ElectiveS->PlaceHolder = RemoveHtml($this->ElectiveS->caption());

        // ElectiveP
        $this->ElectiveP->EditAttrs["class"] = "form-control";
        $this->ElectiveP->EditCustomAttributes = "";
        $this->ElectiveP->EditValue = $this->ElectiveP->options(true);
        $this->ElectiveP->PlaceHolder = RemoveHtml($this->ElectiveP->caption());

        // Emergency
        $this->Emergency->EditAttrs["class"] = "form-control";
        $this->Emergency->EditCustomAttributes = "";
        if (!$this->Emergency->Raw) {
            $this->Emergency->CurrentValue = HtmlDecode($this->Emergency->CurrentValue);
        }
        $this->Emergency->EditValue = $this->Emergency->CurrentValue;
        $this->Emergency->PlaceHolder = RemoveHtml($this->Emergency->caption());

        // EmergencyS
        $this->EmergencyS->EditAttrs["class"] = "form-control";
        $this->EmergencyS->EditCustomAttributes = "";
        $this->EmergencyS->EditValue = $this->EmergencyS->options(true);
        $this->EmergencyS->PlaceHolder = RemoveHtml($this->EmergencyS->caption());

        // EmergencyP
        $this->EmergencyP->EditAttrs["class"] = "form-control";
        $this->EmergencyP->EditCustomAttributes = "";
        $this->EmergencyP->EditValue = $this->EmergencyP->options(true);
        $this->EmergencyP->PlaceHolder = RemoveHtml($this->EmergencyP->caption());

        // Maturity
        $this->Maturity->EditAttrs["class"] = "form-control";
        $this->Maturity->EditCustomAttributes = "";
        $this->Maturity->EditValue = $this->Maturity->options(true);
        $this->Maturity->PlaceHolder = RemoveHtml($this->Maturity->caption());

        // Baby1
        $this->Baby1->EditAttrs["class"] = "form-control";
        $this->Baby1->EditCustomAttributes = "";
        if (!$this->Baby1->Raw) {
            $this->Baby1->CurrentValue = HtmlDecode($this->Baby1->CurrentValue);
        }
        $this->Baby1->EditValue = $this->Baby1->CurrentValue;
        $this->Baby1->PlaceHolder = RemoveHtml($this->Baby1->caption());

        // Baby2
        $this->Baby2->EditAttrs["class"] = "form-control";
        $this->Baby2->EditCustomAttributes = "";
        if (!$this->Baby2->Raw) {
            $this->Baby2->CurrentValue = HtmlDecode($this->Baby2->CurrentValue);
        }
        $this->Baby2->EditValue = $this->Baby2->CurrentValue;
        $this->Baby2->PlaceHolder = RemoveHtml($this->Baby2->caption());

        // sex1
        $this->sex1->EditAttrs["class"] = "form-control";
        $this->sex1->EditCustomAttributes = "";
        if (!$this->sex1->Raw) {
            $this->sex1->CurrentValue = HtmlDecode($this->sex1->CurrentValue);
        }
        $this->sex1->EditValue = $this->sex1->CurrentValue;
        $this->sex1->PlaceHolder = RemoveHtml($this->sex1->caption());

        // sex2
        $this->sex2->EditAttrs["class"] = "form-control";
        $this->sex2->EditCustomAttributes = "";
        if (!$this->sex2->Raw) {
            $this->sex2->CurrentValue = HtmlDecode($this->sex2->CurrentValue);
        }
        $this->sex2->EditValue = $this->sex2->CurrentValue;
        $this->sex2->PlaceHolder = RemoveHtml($this->sex2->caption());

        // weight1
        $this->weight1->EditAttrs["class"] = "form-control";
        $this->weight1->EditCustomAttributes = "";
        if (!$this->weight1->Raw) {
            $this->weight1->CurrentValue = HtmlDecode($this->weight1->CurrentValue);
        }
        $this->weight1->EditValue = $this->weight1->CurrentValue;
        $this->weight1->PlaceHolder = RemoveHtml($this->weight1->caption());

        // weight2
        $this->weight2->EditAttrs["class"] = "form-control";
        $this->weight2->EditCustomAttributes = "";
        if (!$this->weight2->Raw) {
            $this->weight2->CurrentValue = HtmlDecode($this->weight2->CurrentValue);
        }
        $this->weight2->EditValue = $this->weight2->CurrentValue;
        $this->weight2->PlaceHolder = RemoveHtml($this->weight2->caption());

        // NICU1
        $this->NICU1->EditAttrs["class"] = "form-control";
        $this->NICU1->EditCustomAttributes = "";
        if (!$this->NICU1->Raw) {
            $this->NICU1->CurrentValue = HtmlDecode($this->NICU1->CurrentValue);
        }
        $this->NICU1->EditValue = $this->NICU1->CurrentValue;
        $this->NICU1->PlaceHolder = RemoveHtml($this->NICU1->caption());

        // NICU2
        $this->NICU2->EditAttrs["class"] = "form-control";
        $this->NICU2->EditCustomAttributes = "";
        if (!$this->NICU2->Raw) {
            $this->NICU2->CurrentValue = HtmlDecode($this->NICU2->CurrentValue);
        }
        $this->NICU2->EditValue = $this->NICU2->CurrentValue;
        $this->NICU2->PlaceHolder = RemoveHtml($this->NICU2->caption());

        // Jaundice1
        $this->Jaundice1->EditAttrs["class"] = "form-control";
        $this->Jaundice1->EditCustomAttributes = "";
        if (!$this->Jaundice1->Raw) {
            $this->Jaundice1->CurrentValue = HtmlDecode($this->Jaundice1->CurrentValue);
        }
        $this->Jaundice1->EditValue = $this->Jaundice1->CurrentValue;
        $this->Jaundice1->PlaceHolder = RemoveHtml($this->Jaundice1->caption());

        // Jaundice2
        $this->Jaundice2->EditAttrs["class"] = "form-control";
        $this->Jaundice2->EditCustomAttributes = "";
        if (!$this->Jaundice2->Raw) {
            $this->Jaundice2->CurrentValue = HtmlDecode($this->Jaundice2->CurrentValue);
        }
        $this->Jaundice2->EditValue = $this->Jaundice2->CurrentValue;
        $this->Jaundice2->PlaceHolder = RemoveHtml($this->Jaundice2->caption());

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

        // SpillOverReasons
        $this->SpillOverReasons->EditAttrs["class"] = "form-control";
        $this->SpillOverReasons->EditCustomAttributes = "";
        $this->SpillOverReasons->EditValue = $this->SpillOverReasons->options(true);
        $this->SpillOverReasons->PlaceHolder = RemoveHtml($this->SpillOverReasons->caption());

        // ANClosed
        $this->ANClosed->EditCustomAttributes = "";
        $this->ANClosed->EditValue = $this->ANClosed->options(false);
        $this->ANClosed->PlaceHolder = RemoveHtml($this->ANClosed->caption());

        // ANClosedDATE
        $this->ANClosedDATE->EditAttrs["class"] = "form-control";
        $this->ANClosedDATE->EditCustomAttributes = "";
        if (!$this->ANClosedDATE->Raw) {
            $this->ANClosedDATE->CurrentValue = HtmlDecode($this->ANClosedDATE->CurrentValue);
        }
        $this->ANClosedDATE->EditValue = $this->ANClosedDATE->CurrentValue;
        $this->ANClosedDATE->PlaceHolder = RemoveHtml($this->ANClosedDATE->caption());

        // PastMedicalHistoryOthers
        $this->PastMedicalHistoryOthers->EditAttrs["class"] = "form-control";
        $this->PastMedicalHistoryOthers->EditCustomAttributes = "";
        if (!$this->PastMedicalHistoryOthers->Raw) {
            $this->PastMedicalHistoryOthers->CurrentValue = HtmlDecode($this->PastMedicalHistoryOthers->CurrentValue);
        }
        $this->PastMedicalHistoryOthers->EditValue = $this->PastMedicalHistoryOthers->CurrentValue;
        $this->PastMedicalHistoryOthers->PlaceHolder = RemoveHtml($this->PastMedicalHistoryOthers->caption());

        // PastSurgicalHistoryOthers
        $this->PastSurgicalHistoryOthers->EditAttrs["class"] = "form-control";
        $this->PastSurgicalHistoryOthers->EditCustomAttributes = "";
        if (!$this->PastSurgicalHistoryOthers->Raw) {
            $this->PastSurgicalHistoryOthers->CurrentValue = HtmlDecode($this->PastSurgicalHistoryOthers->CurrentValue);
        }
        $this->PastSurgicalHistoryOthers->EditValue = $this->PastSurgicalHistoryOthers->CurrentValue;
        $this->PastSurgicalHistoryOthers->PlaceHolder = RemoveHtml($this->PastSurgicalHistoryOthers->caption());

        // FamilyHistoryOthers
        $this->FamilyHistoryOthers->EditAttrs["class"] = "form-control";
        $this->FamilyHistoryOthers->EditCustomAttributes = "";
        if (!$this->FamilyHistoryOthers->Raw) {
            $this->FamilyHistoryOthers->CurrentValue = HtmlDecode($this->FamilyHistoryOthers->CurrentValue);
        }
        $this->FamilyHistoryOthers->EditValue = $this->FamilyHistoryOthers->CurrentValue;
        $this->FamilyHistoryOthers->PlaceHolder = RemoveHtml($this->FamilyHistoryOthers->caption());

        // PresentPregnancyComplicationsOthers
        $this->PresentPregnancyComplicationsOthers->EditAttrs["class"] = "form-control";
        $this->PresentPregnancyComplicationsOthers->EditCustomAttributes = "";
        if (!$this->PresentPregnancyComplicationsOthers->Raw) {
            $this->PresentPregnancyComplicationsOthers->CurrentValue = HtmlDecode($this->PresentPregnancyComplicationsOthers->CurrentValue);
        }
        $this->PresentPregnancyComplicationsOthers->EditValue = $this->PresentPregnancyComplicationsOthers->CurrentValue;
        $this->PresentPregnancyComplicationsOthers->PlaceHolder = RemoveHtml($this->PresentPregnancyComplicationsOthers->caption());

        // ETdate
        $this->ETdate->EditAttrs["class"] = "form-control";
        $this->ETdate->EditCustomAttributes = "";
        if (!$this->ETdate->Raw) {
            $this->ETdate->CurrentValue = HtmlDecode($this->ETdate->CurrentValue);
        }
        $this->ETdate->EditValue = $this->ETdate->CurrentValue;
        $this->ETdate->PlaceHolder = RemoveHtml($this->ETdate->caption());

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
                    $doc->exportCaption($this->pid);
                    $doc->exportCaption($this->fid);
                    $doc->exportCaption($this->G);
                    $doc->exportCaption($this->P);
                    $doc->exportCaption($this->L);
                    $doc->exportCaption($this->A);
                    $doc->exportCaption($this->E);
                    $doc->exportCaption($this->M);
                    $doc->exportCaption($this->LMP);
                    $doc->exportCaption($this->EDO);
                    $doc->exportCaption($this->MenstrualHistory);
                    $doc->exportCaption($this->MaritalHistory);
                    $doc->exportCaption($this->ObstetricHistory);
                    $doc->exportCaption($this->PreviousHistoryofGDM);
                    $doc->exportCaption($this->PreviousHistorofPIH);
                    $doc->exportCaption($this->PreviousHistoryofIUGR);
                    $doc->exportCaption($this->PreviousHistoryofOligohydramnios);
                    $doc->exportCaption($this->PreviousHistoryofPreterm);
                    $doc->exportCaption($this->G1);
                    $doc->exportCaption($this->G2);
                    $doc->exportCaption($this->G3);
                    $doc->exportCaption($this->DeliveryNDLSCS1);
                    $doc->exportCaption($this->DeliveryNDLSCS2);
                    $doc->exportCaption($this->DeliveryNDLSCS3);
                    $doc->exportCaption($this->BabySexweight1);
                    $doc->exportCaption($this->BabySexweight2);
                    $doc->exportCaption($this->BabySexweight3);
                    $doc->exportCaption($this->PastMedicalHistory);
                    $doc->exportCaption($this->PastSurgicalHistory);
                    $doc->exportCaption($this->FamilyHistory);
                    $doc->exportCaption($this->Viability);
                    $doc->exportCaption($this->ViabilityDATE);
                    $doc->exportCaption($this->ViabilityREPORT);
                    $doc->exportCaption($this->Viability2);
                    $doc->exportCaption($this->Viability2DATE);
                    $doc->exportCaption($this->Viability2REPORT);
                    $doc->exportCaption($this->NTscan);
                    $doc->exportCaption($this->NTscanDATE);
                    $doc->exportCaption($this->NTscanREPORT);
                    $doc->exportCaption($this->EarlyTarget);
                    $doc->exportCaption($this->EarlyTargetDATE);
                    $doc->exportCaption($this->EarlyTargetREPORT);
                    $doc->exportCaption($this->Anomaly);
                    $doc->exportCaption($this->AnomalyDATE);
                    $doc->exportCaption($this->AnomalyREPORT);
                    $doc->exportCaption($this->Growth);
                    $doc->exportCaption($this->GrowthDATE);
                    $doc->exportCaption($this->GrowthREPORT);
                    $doc->exportCaption($this->Growth1);
                    $doc->exportCaption($this->Growth1DATE);
                    $doc->exportCaption($this->Growth1REPORT);
                    $doc->exportCaption($this->ANProfile);
                    $doc->exportCaption($this->ANProfileDATE);
                    $doc->exportCaption($this->ANProfileINHOUSE);
                    $doc->exportCaption($this->ANProfileREPORT);
                    $doc->exportCaption($this->DualMarker);
                    $doc->exportCaption($this->DualMarkerDATE);
                    $doc->exportCaption($this->DualMarkerINHOUSE);
                    $doc->exportCaption($this->DualMarkerREPORT);
                    $doc->exportCaption($this->Quadruple);
                    $doc->exportCaption($this->QuadrupleDATE);
                    $doc->exportCaption($this->QuadrupleINHOUSE);
                    $doc->exportCaption($this->QuadrupleREPORT);
                    $doc->exportCaption($this->A5month);
                    $doc->exportCaption($this->A5monthDATE);
                    $doc->exportCaption($this->A5monthINHOUSE);
                    $doc->exportCaption($this->A5monthREPORT);
                    $doc->exportCaption($this->A7month);
                    $doc->exportCaption($this->A7monthDATE);
                    $doc->exportCaption($this->A7monthINHOUSE);
                    $doc->exportCaption($this->A7monthREPORT);
                    $doc->exportCaption($this->A9month);
                    $doc->exportCaption($this->A9monthDATE);
                    $doc->exportCaption($this->A9monthINHOUSE);
                    $doc->exportCaption($this->A9monthREPORT);
                    $doc->exportCaption($this->INJ);
                    $doc->exportCaption($this->INJDATE);
                    $doc->exportCaption($this->INJINHOUSE);
                    $doc->exportCaption($this->INJREPORT);
                    $doc->exportCaption($this->Bleeding);
                    $doc->exportCaption($this->Hypothyroidism);
                    $doc->exportCaption($this->PICMENumber);
                    $doc->exportCaption($this->Outcome);
                    $doc->exportCaption($this->DateofAdmission);
                    $doc->exportCaption($this->DateodProcedure);
                    $doc->exportCaption($this->Miscarriage);
                    $doc->exportCaption($this->ModeOfDelivery);
                    $doc->exportCaption($this->ND);
                    $doc->exportCaption($this->NDS);
                    $doc->exportCaption($this->NDP);
                    $doc->exportCaption($this->Vaccum);
                    $doc->exportCaption($this->VaccumS);
                    $doc->exportCaption($this->VaccumP);
                    $doc->exportCaption($this->Forceps);
                    $doc->exportCaption($this->ForcepsS);
                    $doc->exportCaption($this->ForcepsP);
                    $doc->exportCaption($this->Elective);
                    $doc->exportCaption($this->ElectiveS);
                    $doc->exportCaption($this->ElectiveP);
                    $doc->exportCaption($this->Emergency);
                    $doc->exportCaption($this->EmergencyS);
                    $doc->exportCaption($this->EmergencyP);
                    $doc->exportCaption($this->Maturity);
                    $doc->exportCaption($this->Baby1);
                    $doc->exportCaption($this->Baby2);
                    $doc->exportCaption($this->sex1);
                    $doc->exportCaption($this->sex2);
                    $doc->exportCaption($this->weight1);
                    $doc->exportCaption($this->weight2);
                    $doc->exportCaption($this->NICU1);
                    $doc->exportCaption($this->NICU2);
                    $doc->exportCaption($this->Jaundice1);
                    $doc->exportCaption($this->Jaundice2);
                    $doc->exportCaption($this->Others1);
                    $doc->exportCaption($this->Others2);
                    $doc->exportCaption($this->SpillOverReasons);
                    $doc->exportCaption($this->ANClosed);
                    $doc->exportCaption($this->ANClosedDATE);
                    $doc->exportCaption($this->PastMedicalHistoryOthers);
                    $doc->exportCaption($this->PastSurgicalHistoryOthers);
                    $doc->exportCaption($this->FamilyHistoryOthers);
                    $doc->exportCaption($this->PresentPregnancyComplicationsOthers);
                    $doc->exportCaption($this->ETdate);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->pid);
                    $doc->exportCaption($this->fid);
                    $doc->exportCaption($this->G);
                    $doc->exportCaption($this->P);
                    $doc->exportCaption($this->L);
                    $doc->exportCaption($this->A);
                    $doc->exportCaption($this->E);
                    $doc->exportCaption($this->M);
                    $doc->exportCaption($this->LMP);
                    $doc->exportCaption($this->EDO);
                    $doc->exportCaption($this->MenstrualHistory);
                    $doc->exportCaption($this->MaritalHistory);
                    $doc->exportCaption($this->ObstetricHistory);
                    $doc->exportCaption($this->PreviousHistoryofGDM);
                    $doc->exportCaption($this->PreviousHistorofPIH);
                    $doc->exportCaption($this->PreviousHistoryofIUGR);
                    $doc->exportCaption($this->PreviousHistoryofOligohydramnios);
                    $doc->exportCaption($this->PreviousHistoryofPreterm);
                    $doc->exportCaption($this->G1);
                    $doc->exportCaption($this->G2);
                    $doc->exportCaption($this->G3);
                    $doc->exportCaption($this->DeliveryNDLSCS1);
                    $doc->exportCaption($this->DeliveryNDLSCS2);
                    $doc->exportCaption($this->DeliveryNDLSCS3);
                    $doc->exportCaption($this->BabySexweight1);
                    $doc->exportCaption($this->BabySexweight2);
                    $doc->exportCaption($this->BabySexweight3);
                    $doc->exportCaption($this->PastMedicalHistory);
                    $doc->exportCaption($this->PastSurgicalHistory);
                    $doc->exportCaption($this->FamilyHistory);
                    $doc->exportCaption($this->Viability);
                    $doc->exportCaption($this->ViabilityDATE);
                    $doc->exportCaption($this->ViabilityREPORT);
                    $doc->exportCaption($this->Viability2);
                    $doc->exportCaption($this->Viability2DATE);
                    $doc->exportCaption($this->Viability2REPORT);
                    $doc->exportCaption($this->NTscan);
                    $doc->exportCaption($this->NTscanDATE);
                    $doc->exportCaption($this->NTscanREPORT);
                    $doc->exportCaption($this->EarlyTarget);
                    $doc->exportCaption($this->EarlyTargetDATE);
                    $doc->exportCaption($this->EarlyTargetREPORT);
                    $doc->exportCaption($this->Anomaly);
                    $doc->exportCaption($this->AnomalyDATE);
                    $doc->exportCaption($this->AnomalyREPORT);
                    $doc->exportCaption($this->Growth);
                    $doc->exportCaption($this->GrowthDATE);
                    $doc->exportCaption($this->GrowthREPORT);
                    $doc->exportCaption($this->Growth1);
                    $doc->exportCaption($this->Growth1DATE);
                    $doc->exportCaption($this->Growth1REPORT);
                    $doc->exportCaption($this->ANProfile);
                    $doc->exportCaption($this->ANProfileDATE);
                    $doc->exportCaption($this->ANProfileINHOUSE);
                    $doc->exportCaption($this->ANProfileREPORT);
                    $doc->exportCaption($this->DualMarker);
                    $doc->exportCaption($this->DualMarkerDATE);
                    $doc->exportCaption($this->DualMarkerINHOUSE);
                    $doc->exportCaption($this->DualMarkerREPORT);
                    $doc->exportCaption($this->Quadruple);
                    $doc->exportCaption($this->QuadrupleDATE);
                    $doc->exportCaption($this->QuadrupleINHOUSE);
                    $doc->exportCaption($this->QuadrupleREPORT);
                    $doc->exportCaption($this->A5month);
                    $doc->exportCaption($this->A5monthDATE);
                    $doc->exportCaption($this->A5monthINHOUSE);
                    $doc->exportCaption($this->A5monthREPORT);
                    $doc->exportCaption($this->A7month);
                    $doc->exportCaption($this->A7monthDATE);
                    $doc->exportCaption($this->A7monthINHOUSE);
                    $doc->exportCaption($this->A7monthREPORT);
                    $doc->exportCaption($this->A9month);
                    $doc->exportCaption($this->A9monthDATE);
                    $doc->exportCaption($this->A9monthINHOUSE);
                    $doc->exportCaption($this->A9monthREPORT);
                    $doc->exportCaption($this->INJ);
                    $doc->exportCaption($this->INJDATE);
                    $doc->exportCaption($this->INJINHOUSE);
                    $doc->exportCaption($this->INJREPORT);
                    $doc->exportCaption($this->Bleeding);
                    $doc->exportCaption($this->Hypothyroidism);
                    $doc->exportCaption($this->PICMENumber);
                    $doc->exportCaption($this->Outcome);
                    $doc->exportCaption($this->DateofAdmission);
                    $doc->exportCaption($this->DateodProcedure);
                    $doc->exportCaption($this->Miscarriage);
                    $doc->exportCaption($this->ModeOfDelivery);
                    $doc->exportCaption($this->ND);
                    $doc->exportCaption($this->NDS);
                    $doc->exportCaption($this->NDP);
                    $doc->exportCaption($this->Vaccum);
                    $doc->exportCaption($this->VaccumS);
                    $doc->exportCaption($this->VaccumP);
                    $doc->exportCaption($this->Forceps);
                    $doc->exportCaption($this->ForcepsS);
                    $doc->exportCaption($this->ForcepsP);
                    $doc->exportCaption($this->Elective);
                    $doc->exportCaption($this->ElectiveS);
                    $doc->exportCaption($this->ElectiveP);
                    $doc->exportCaption($this->Emergency);
                    $doc->exportCaption($this->EmergencyS);
                    $doc->exportCaption($this->EmergencyP);
                    $doc->exportCaption($this->Maturity);
                    $doc->exportCaption($this->Baby1);
                    $doc->exportCaption($this->Baby2);
                    $doc->exportCaption($this->sex1);
                    $doc->exportCaption($this->sex2);
                    $doc->exportCaption($this->weight1);
                    $doc->exportCaption($this->weight2);
                    $doc->exportCaption($this->NICU1);
                    $doc->exportCaption($this->NICU2);
                    $doc->exportCaption($this->Jaundice1);
                    $doc->exportCaption($this->Jaundice2);
                    $doc->exportCaption($this->Others1);
                    $doc->exportCaption($this->Others2);
                    $doc->exportCaption($this->SpillOverReasons);
                    $doc->exportCaption($this->ANClosed);
                    $doc->exportCaption($this->ANClosedDATE);
                    $doc->exportCaption($this->PastMedicalHistoryOthers);
                    $doc->exportCaption($this->PastSurgicalHistoryOthers);
                    $doc->exportCaption($this->FamilyHistoryOthers);
                    $doc->exportCaption($this->PresentPregnancyComplicationsOthers);
                    $doc->exportCaption($this->ETdate);
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
                        $doc->exportField($this->pid);
                        $doc->exportField($this->fid);
                        $doc->exportField($this->G);
                        $doc->exportField($this->P);
                        $doc->exportField($this->L);
                        $doc->exportField($this->A);
                        $doc->exportField($this->E);
                        $doc->exportField($this->M);
                        $doc->exportField($this->LMP);
                        $doc->exportField($this->EDO);
                        $doc->exportField($this->MenstrualHistory);
                        $doc->exportField($this->MaritalHistory);
                        $doc->exportField($this->ObstetricHistory);
                        $doc->exportField($this->PreviousHistoryofGDM);
                        $doc->exportField($this->PreviousHistorofPIH);
                        $doc->exportField($this->PreviousHistoryofIUGR);
                        $doc->exportField($this->PreviousHistoryofOligohydramnios);
                        $doc->exportField($this->PreviousHistoryofPreterm);
                        $doc->exportField($this->G1);
                        $doc->exportField($this->G2);
                        $doc->exportField($this->G3);
                        $doc->exportField($this->DeliveryNDLSCS1);
                        $doc->exportField($this->DeliveryNDLSCS2);
                        $doc->exportField($this->DeliveryNDLSCS3);
                        $doc->exportField($this->BabySexweight1);
                        $doc->exportField($this->BabySexweight2);
                        $doc->exportField($this->BabySexweight3);
                        $doc->exportField($this->PastMedicalHistory);
                        $doc->exportField($this->PastSurgicalHistory);
                        $doc->exportField($this->FamilyHistory);
                        $doc->exportField($this->Viability);
                        $doc->exportField($this->ViabilityDATE);
                        $doc->exportField($this->ViabilityREPORT);
                        $doc->exportField($this->Viability2);
                        $doc->exportField($this->Viability2DATE);
                        $doc->exportField($this->Viability2REPORT);
                        $doc->exportField($this->NTscan);
                        $doc->exportField($this->NTscanDATE);
                        $doc->exportField($this->NTscanREPORT);
                        $doc->exportField($this->EarlyTarget);
                        $doc->exportField($this->EarlyTargetDATE);
                        $doc->exportField($this->EarlyTargetREPORT);
                        $doc->exportField($this->Anomaly);
                        $doc->exportField($this->AnomalyDATE);
                        $doc->exportField($this->AnomalyREPORT);
                        $doc->exportField($this->Growth);
                        $doc->exportField($this->GrowthDATE);
                        $doc->exportField($this->GrowthREPORT);
                        $doc->exportField($this->Growth1);
                        $doc->exportField($this->Growth1DATE);
                        $doc->exportField($this->Growth1REPORT);
                        $doc->exportField($this->ANProfile);
                        $doc->exportField($this->ANProfileDATE);
                        $doc->exportField($this->ANProfileINHOUSE);
                        $doc->exportField($this->ANProfileREPORT);
                        $doc->exportField($this->DualMarker);
                        $doc->exportField($this->DualMarkerDATE);
                        $doc->exportField($this->DualMarkerINHOUSE);
                        $doc->exportField($this->DualMarkerREPORT);
                        $doc->exportField($this->Quadruple);
                        $doc->exportField($this->QuadrupleDATE);
                        $doc->exportField($this->QuadrupleINHOUSE);
                        $doc->exportField($this->QuadrupleREPORT);
                        $doc->exportField($this->A5month);
                        $doc->exportField($this->A5monthDATE);
                        $doc->exportField($this->A5monthINHOUSE);
                        $doc->exportField($this->A5monthREPORT);
                        $doc->exportField($this->A7month);
                        $doc->exportField($this->A7monthDATE);
                        $doc->exportField($this->A7monthINHOUSE);
                        $doc->exportField($this->A7monthREPORT);
                        $doc->exportField($this->A9month);
                        $doc->exportField($this->A9monthDATE);
                        $doc->exportField($this->A9monthINHOUSE);
                        $doc->exportField($this->A9monthREPORT);
                        $doc->exportField($this->INJ);
                        $doc->exportField($this->INJDATE);
                        $doc->exportField($this->INJINHOUSE);
                        $doc->exportField($this->INJREPORT);
                        $doc->exportField($this->Bleeding);
                        $doc->exportField($this->Hypothyroidism);
                        $doc->exportField($this->PICMENumber);
                        $doc->exportField($this->Outcome);
                        $doc->exportField($this->DateofAdmission);
                        $doc->exportField($this->DateodProcedure);
                        $doc->exportField($this->Miscarriage);
                        $doc->exportField($this->ModeOfDelivery);
                        $doc->exportField($this->ND);
                        $doc->exportField($this->NDS);
                        $doc->exportField($this->NDP);
                        $doc->exportField($this->Vaccum);
                        $doc->exportField($this->VaccumS);
                        $doc->exportField($this->VaccumP);
                        $doc->exportField($this->Forceps);
                        $doc->exportField($this->ForcepsS);
                        $doc->exportField($this->ForcepsP);
                        $doc->exportField($this->Elective);
                        $doc->exportField($this->ElectiveS);
                        $doc->exportField($this->ElectiveP);
                        $doc->exportField($this->Emergency);
                        $doc->exportField($this->EmergencyS);
                        $doc->exportField($this->EmergencyP);
                        $doc->exportField($this->Maturity);
                        $doc->exportField($this->Baby1);
                        $doc->exportField($this->Baby2);
                        $doc->exportField($this->sex1);
                        $doc->exportField($this->sex2);
                        $doc->exportField($this->weight1);
                        $doc->exportField($this->weight2);
                        $doc->exportField($this->NICU1);
                        $doc->exportField($this->NICU2);
                        $doc->exportField($this->Jaundice1);
                        $doc->exportField($this->Jaundice2);
                        $doc->exportField($this->Others1);
                        $doc->exportField($this->Others2);
                        $doc->exportField($this->SpillOverReasons);
                        $doc->exportField($this->ANClosed);
                        $doc->exportField($this->ANClosedDATE);
                        $doc->exportField($this->PastMedicalHistoryOthers);
                        $doc->exportField($this->PastSurgicalHistoryOthers);
                        $doc->exportField($this->FamilyHistoryOthers);
                        $doc->exportField($this->PresentPregnancyComplicationsOthers);
                        $doc->exportField($this->ETdate);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->pid);
                        $doc->exportField($this->fid);
                        $doc->exportField($this->G);
                        $doc->exportField($this->P);
                        $doc->exportField($this->L);
                        $doc->exportField($this->A);
                        $doc->exportField($this->E);
                        $doc->exportField($this->M);
                        $doc->exportField($this->LMP);
                        $doc->exportField($this->EDO);
                        $doc->exportField($this->MenstrualHistory);
                        $doc->exportField($this->MaritalHistory);
                        $doc->exportField($this->ObstetricHistory);
                        $doc->exportField($this->PreviousHistoryofGDM);
                        $doc->exportField($this->PreviousHistorofPIH);
                        $doc->exportField($this->PreviousHistoryofIUGR);
                        $doc->exportField($this->PreviousHistoryofOligohydramnios);
                        $doc->exportField($this->PreviousHistoryofPreterm);
                        $doc->exportField($this->G1);
                        $doc->exportField($this->G2);
                        $doc->exportField($this->G3);
                        $doc->exportField($this->DeliveryNDLSCS1);
                        $doc->exportField($this->DeliveryNDLSCS2);
                        $doc->exportField($this->DeliveryNDLSCS3);
                        $doc->exportField($this->BabySexweight1);
                        $doc->exportField($this->BabySexweight2);
                        $doc->exportField($this->BabySexweight3);
                        $doc->exportField($this->PastMedicalHistory);
                        $doc->exportField($this->PastSurgicalHistory);
                        $doc->exportField($this->FamilyHistory);
                        $doc->exportField($this->Viability);
                        $doc->exportField($this->ViabilityDATE);
                        $doc->exportField($this->ViabilityREPORT);
                        $doc->exportField($this->Viability2);
                        $doc->exportField($this->Viability2DATE);
                        $doc->exportField($this->Viability2REPORT);
                        $doc->exportField($this->NTscan);
                        $doc->exportField($this->NTscanDATE);
                        $doc->exportField($this->NTscanREPORT);
                        $doc->exportField($this->EarlyTarget);
                        $doc->exportField($this->EarlyTargetDATE);
                        $doc->exportField($this->EarlyTargetREPORT);
                        $doc->exportField($this->Anomaly);
                        $doc->exportField($this->AnomalyDATE);
                        $doc->exportField($this->AnomalyREPORT);
                        $doc->exportField($this->Growth);
                        $doc->exportField($this->GrowthDATE);
                        $doc->exportField($this->GrowthREPORT);
                        $doc->exportField($this->Growth1);
                        $doc->exportField($this->Growth1DATE);
                        $doc->exportField($this->Growth1REPORT);
                        $doc->exportField($this->ANProfile);
                        $doc->exportField($this->ANProfileDATE);
                        $doc->exportField($this->ANProfileINHOUSE);
                        $doc->exportField($this->ANProfileREPORT);
                        $doc->exportField($this->DualMarker);
                        $doc->exportField($this->DualMarkerDATE);
                        $doc->exportField($this->DualMarkerINHOUSE);
                        $doc->exportField($this->DualMarkerREPORT);
                        $doc->exportField($this->Quadruple);
                        $doc->exportField($this->QuadrupleDATE);
                        $doc->exportField($this->QuadrupleINHOUSE);
                        $doc->exportField($this->QuadrupleREPORT);
                        $doc->exportField($this->A5month);
                        $doc->exportField($this->A5monthDATE);
                        $doc->exportField($this->A5monthINHOUSE);
                        $doc->exportField($this->A5monthREPORT);
                        $doc->exportField($this->A7month);
                        $doc->exportField($this->A7monthDATE);
                        $doc->exportField($this->A7monthINHOUSE);
                        $doc->exportField($this->A7monthREPORT);
                        $doc->exportField($this->A9month);
                        $doc->exportField($this->A9monthDATE);
                        $doc->exportField($this->A9monthINHOUSE);
                        $doc->exportField($this->A9monthREPORT);
                        $doc->exportField($this->INJ);
                        $doc->exportField($this->INJDATE);
                        $doc->exportField($this->INJINHOUSE);
                        $doc->exportField($this->INJREPORT);
                        $doc->exportField($this->Bleeding);
                        $doc->exportField($this->Hypothyroidism);
                        $doc->exportField($this->PICMENumber);
                        $doc->exportField($this->Outcome);
                        $doc->exportField($this->DateofAdmission);
                        $doc->exportField($this->DateodProcedure);
                        $doc->exportField($this->Miscarriage);
                        $doc->exportField($this->ModeOfDelivery);
                        $doc->exportField($this->ND);
                        $doc->exportField($this->NDS);
                        $doc->exportField($this->NDP);
                        $doc->exportField($this->Vaccum);
                        $doc->exportField($this->VaccumS);
                        $doc->exportField($this->VaccumP);
                        $doc->exportField($this->Forceps);
                        $doc->exportField($this->ForcepsS);
                        $doc->exportField($this->ForcepsP);
                        $doc->exportField($this->Elective);
                        $doc->exportField($this->ElectiveS);
                        $doc->exportField($this->ElectiveP);
                        $doc->exportField($this->Emergency);
                        $doc->exportField($this->EmergencyS);
                        $doc->exportField($this->EmergencyP);
                        $doc->exportField($this->Maturity);
                        $doc->exportField($this->Baby1);
                        $doc->exportField($this->Baby2);
                        $doc->exportField($this->sex1);
                        $doc->exportField($this->sex2);
                        $doc->exportField($this->weight1);
                        $doc->exportField($this->weight2);
                        $doc->exportField($this->NICU1);
                        $doc->exportField($this->NICU2);
                        $doc->exportField($this->Jaundice1);
                        $doc->exportField($this->Jaundice2);
                        $doc->exportField($this->Others1);
                        $doc->exportField($this->Others2);
                        $doc->exportField($this->SpillOverReasons);
                        $doc->exportField($this->ANClosed);
                        $doc->exportField($this->ANClosedDATE);
                        $doc->exportField($this->PastMedicalHistoryOthers);
                        $doc->exportField($this->PastSurgicalHistoryOthers);
                        $doc->exportField($this->FamilyHistoryOthers);
                        $doc->exportField($this->PresentPregnancyComplicationsOthers);
                        $doc->exportField($this->ETdate);
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
